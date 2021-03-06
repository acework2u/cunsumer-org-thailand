var baseUrl = window.location.origin;

var date = new Date(), y = date.getFullYear(), m = date.getMonth();
var firstDay = new Date(y, 0, 1);
var lastDay = new Date(y, m + 1, 0);

Vue.use(VueTables.ClientTable);
Vue.component('pagination', Pagination);
Vue.use(VueLoading);
Vue.component('loading', VueLoading)

var appusers = new Vue({
    el: "#appusers",
    data() {
        return {
            donationInfo: [],
            donorInfo:[],
            successMsg:"",
            statusWait:false,
            errorStatus:false,
            actionStatus:false,
            textError:"",
            bankList: [],
            paymentCode: [],
            // userInfo:{group:4,user_status:1,user_access:10},
            userInfo:{},
            usersGroup:[],
            userAccess:[],
            user_status:[],
            userClicked: {},
            email: '',
            reg: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/,
            title: "Approved Logs",
            columns: ['index', 'name', 'last_name', 'status_title','role_name','email','updated_date','action','delete'],
            options: {
                headings: {
                    index: "ลำดับ",
                    name: 'ชื่อ',
                    last_name: 'นามสกุล',
                    role_name:"ประเภทสมาชิก",
                    status_title: 'สถานะ',
                    created_date:'วันที่สมัคร',
                    updated_date: 'อัพเดทล่าสุด',
                },
                pagination: {chunk: 10},
                sortable: ['index','id', 'name', 'last_name', 'status_title','role_name','email','updated_date'],
                filterable: ['name', 'last_name', 'status_title','role_name','email'],
                perPage: 10,
                perPageValues: [10, 25, 50, 100, 500, 1000],
            },
            time: new Date(),
            startTime: firstDay,
            endTime: lastDay,
            range: [firstDay, lastDay],
            startDated: "",
            endDated: "",
            emptyTime: '',
            tranferDateTime: '',
            emptyRange: [],
            currentTime: null,
            local: {
                dow: 0, // Sunday is the first day of the week
                hourTip: 'Select Hour', // tip of select hour
                minuteTip: 'Select Minute', // tip of select minute
                secondTip: 'Select Second', // tip of select second
                yearSuffix: '', // suffix of head year
                monthsHead: 'January_February_March_April_May_June_July_August_September_October_November_December'.split('_'), // months of head
                months: 'Jan_Feb_Mar_Apr_May_Jun_Jul_Aug_Sep_Oct_Nov_Dec'.split('_'), // months of panel
                weeks: 'Su_Mo_Tu_We_Th_Fr_Sa'.split('_'),// weeks,
                cancelTip: 'cancel',
                submitTip: 'confirm'
            }
        }
    }, created() {
        this.getUserlist()
        this.getUserRule()
        this.userStatus()

    },
    mounted() {
        this.$nextTick(() => {
            this.getUserlist()
            this.getUserRule()
            this.permissionGroup()
            this.userStatus()


        })
    },
    computed: {
        filterDonationList() {
            return this.donationInfo
        },
        filterUserGroup(){
            return this.usersGroup.filter((item)=>{
                // return item.id > 2 && item.id <5
                return item.id
            })
        },
        filterUserAccess(){
            return this.userAccess
        },
        fillterStartDated() {
            this.startDated = moment(this.range[0]).format('YYYY-MM-DD H:mm:ss')
            return moment(this.range[0]).format('YYYY-MM-DD H:mm:ss')
            // this.endTime = this.range[1]
        },
        fillterEndDated() {

            this.endDated = moment(this.range[1]).format('YYYY-MM-DD H:mm:ss')
            return moment(this.range[1]).format('YYYY-MM-DD H:mm:ss')
            // this.endTime = this.range[1]
        },
        exportExcel() {
            let start_date = this.range[0]
            let end_date = this.range[1]

            start_date = moment(start_date).format('YYYY-MM-DD H:mm:ss')
            end_date = moment(end_date).format('YYYY-MM-DD H:mm:ss')

            // let apiUrls = baseUrl + "/admin/reports/exportxls?startDate=" + start_date + "&endDate=" + end_date
            let apiUrls = baseUrl + "/admin/reports/approved-logs-exportxls?startDate=" + start_date + "&endDate=" + end_date

            return apiUrls
        },
        errorAction(){
            return this.errorStatus;
        }

    },
    methods: {
        isEmailValid: function() {
            return (this.userInfo.email == "")? "" : (this.reg.test(this.userInfo.email)) ? 'has-success' : 'has-error';
        },
        getUserlist() {
            let baseApi = baseUrl + "/api-v01/user/user-list";
            let stDate = moment(this.range[0]).format('YYYY-MM-DD H:mm:ss')
            let endDate = moment(this.range[1]).format('YYYY-MM-DD H:mm:ss')

            let baseApi2 = baseApi + "?startDate=" + stDate + "&endDate=" + endDate+"&type="+"json"

            axios.get(baseApi + "?startDate=" + stDate + "&endDate=" + endDate+"&type=json").then((res) => {
                this.donationInfo = res.data
                console.log(res.data)
            }).catch((err) => {
                // console.log(err)
            })
        },
        newUser(){
            this.errorStatus = false
        },
        permissionGroup(){

            let api = baseUrl+"/api-v01/user/access-list"


            if(typeof this.userInfo.group === 'undefined'){
                this.userInfo.group = 3
            }

            if(typeof this.userInfo.user_role_id === 'undefined'){
                this.userInfo.user_role_id = 3
            }

            console.info(this.userInfo.group)
            this.userAccess = []

            let user_role_id = this.userInfo.group

            let uaccApi =api+"?user_role_id="+user_role_id

            axios.get(uaccApi).then((res)=>{
                this.userAccess = res.data





            })

            this.$refs.useraccess.focus();
            console.log(this.userInfo);



            // axios.get().then((res)=>{
            //     this.userAccess = res.data
            // })

            /*
            if(typeof this.userInfo.group === 'undefined'){

            }else{
                console.info(this.userInfo.group)
                let user_group_id = this.userInfo.group




                let api = baseUrl+"/"
                this.userAccess = []
                axios.get(api+"?group_id="+user_group_id).then((res)=>{
                    this.userAccess = res.data
                })
            }

            */


            },
        updateUserGroup(){
            // console.info(this.userInfo.group)


            if(!typeof this.userInfo.group === 'undefined'){

            }
            let user_group_id = this.userClicked.customer_group_id
            let user_role_id = this.userClicked.user_role_id
            let api = baseUrl+"/api-v01/user/access-list"
            this.userAccess = []
            axios.get(api+"?group_id="+user_group_id+"&user_role_id="+user_role_id).then((res)=>{
                this.userAccess = res.data

            })


        },
        saveUserInfo(){
            // console.log(this.userInfo);
            let adminApi = baseUrl+"/api-v01/user/admin-register"

            let dataInfo = this.userInfo
            // console.info(dataInfo)
           if(typeof this.userInfo.user_access === 'undefined'){
               this.$refs.user_access.focus();
           }
            var fromData = this.toFormData(dataInfo)
            axios.post(adminApi,fromData).then((res)=>{
                    console.log(res.data)
                if(res.data.error){
                    this.errorStatus = res.data.error
                    this.textError   = res.data.message
                    this.successMsg   = "การลงข้อมูลผิดพลาด"
                }else{
                    this.errorStatus = res.data.status
                    this.successMsg = res.data.message
                    this.textError = res.data.message
                }




            })

            this.getUserlist()

        },
        updateUserInfo(){
            let updateAdminApi = baseUrl+"/api-v01/user/admin-update"
            let dataInfo = this.userClicked
            var fromData = this.toFormData(dataInfo)

            let loader = this.$loading.show({
                // Optional parameters
                color: '#3224d4',
                loader: 'spinner',
                width: 64,
                height: 64,
                backgroundColor: '#ffffff',
                opacity: 0.5,
                zIndex: 999,
                container: this.fullPage ? null : this.$refs.formContainer,
                canCancel: true,
                onCancel: this.onCancel,
            });

            axios.post(updateAdminApi,fromData).then((res)=>{
                // console.info(res.data)
                this.successMsg = ""

                if(res.data.error){
                    this.errorStatus = res.data.error
                    this.successMsg = res.data.message
                }else{
                    this.errorStatus = res.data.error
                    this.successMsg = res.data.message

                }

                setTimeout(()=>{
                    this.successMsg = "";
                },500)

            })

            setTimeout(() => {
                loader.hide()
                this.getUserlist()
            },1000)



        },
        userStatus(){
            let baseApi = baseUrl+"/api-v01/user/status-list"
            axios.get(baseApi).then((res)=>{
                    this.user_status = res.data
            })

        },
        getBankList() {
            let baseApi = baseUrl + "/api-v01/banklist";
            axios.get(baseApi).then((res) => {
                this.bankList = res.data
            }).catch((err) => {
            })
        },
        getPaymentCode() {
            let baseApi = baseUrl + "/api-v01/payment-status-code";
            axios.get(baseApi).then((res) => {
                this.paymentCode = res.data
            }).catch((err) => {
            })
        },
        getUserRule() {
            let baseApi = baseUrl + "/api-v01/user/rule-list";
            axios.get(baseApi).then((res) => {
               this.usersGroup = res.data
            }).catch((err) => {
            })
        },
        confirmDate: function () {

            let start_date = this.range[0]
            let end_date = this.range[1]

            start_date = moment(start_date).format('YYYY-MM-DD H:mm:ss')
            end_date = moment(end_date).format('YYYY-MM-DD H:mm:ss')

            this.startTime = start_date
            this.endTime = start_date


        },
        invoice(donationId) {
            return baseUrl + "/admin/reports/get-invoice/" + donationId
        },
        sendInvoiceEmail(donationId){
            let baseApi = baseUrl + "/admin/reports/send-invoice";

            this.statusWait = true
            axios.post(baseApi+"?donation_id="+donationId).then((res)=>{
                console.log(res)
                this.statusWait = false
                this.successMsg = res.data.message

            }).catch((err)=>{
                console.log(err)
            })

        },
        nameInv(item){
            return "email_inv_"+item
        },
        donationUpdate() {
            let baseApi = baseUrl + "/admin/reports/update-donation";
            if (this.emptyTime) {
                this.userClicked.transfer_date = this.date2server(this.emptyTime);
            }

            let dataInfo = this.userClicked
            var fromData = this.toFormData(dataInfo)

            axios.post(baseApi, fromData).then((res) => {
                // console.log(res.data);

                if(res.data.error){
                    this.errorStatus =true
                }else{
                    this.errorStatus = false
                }
                this.successMsg = res.data.message;

                this.getUserlist()

            }).catch((err) => {

            })
            appreport.getUserlist()

            setTimeout(()=>{
                this.errorStatus = false;
                this.successMsg=""
            },1000);


        },
        userEdit(itemClick) {
            this.userClicked = ""
            this.userClicked = itemClick
            console.log(this.userClicked)
            // this.permissionGroup();
            console.info(this.userAccess);

        },
        toFormData: function (obj) {
            var form_data = new FormData();
            for (var key in obj) {
                form_data.append(key, obj[key]);
            }
            return form_data;
        },
        moment: function (date) {
            return moment(date);
        },
        date: function (date) {
            return moment(date).format('MMMM Do YYYY, h:mm:ss a');
        },
        date2server(date1) {
            return moment(date1).format('YYYY-MM-DD H:mm:ss')
        },
        checkStatusInvoice(itemStatus) {
            if (itemStatus === "00" || itemStatus==="000" || itemStatus==="Successful") {
                return true
            }else{
                return false
            }
        },
        donorClicked(item){
            let baseApi = baseUrl + "/admin/reports/donor-info";
            let donor_aid = item.doner_aid

            // console.log(donor_aid)

            axios.get(baseApi+"?donor_aid="+donor_aid).then((res)=>{
                this.donorInfo = res.data

                // console.log(this.donorInfo)
            }).catch()


        },
        userDelete(){
            console.log(this.userClicked);
            let delUserAPI = baseUrl+"/api-v01/user/admin-delete";

            axios.get(delUserAPI+"?uid="+this.userClicked.id).then((res)=>{
                console.log(res.data)

                if(res.data.error){

                }else{
                    this.getUserlist();
                }


            })

        },
        clickUser(item){
            this.userClicked = ""
            this.userClicked = item
            console.log(this.userClicked);
        },
        clickClearUser(){
            this.userClicked = ""
            console.log(this.userClicked);
        }


    }
});
