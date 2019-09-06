var baseUrl = window.location.origin;

var date = new Date(), y = date.getFullYear(), m = date.getMonth();
var firstDay = new Date(y, m, 1);
var lastDay = new Date(y, m + 1, 0);

Vue.use(VueTables.ClientTable);
Vue.component('pagination', Pagination);
var approvedlog = new Vue({
    el: "#approvedlog",
    data() {
        return {
            donationInfo: [],
            donorInfo:[],
            successMsg:"",
            statusWait:false,
            errorStatus:false,
            bankList: [],
            paymentCode: [],
            userClicked: {},
            title: "Approved Logs",
            columns: ['index', 'orz_title', 'orz_action', 'full_name', 'updated_date'],
            options: {
                headings: {
                    index: 'Index',
                    orz_title: 'Organization Name',
                    orz_action: 'In Action',
                    full_name: 'Approved by',
                    updated_date: 'Updated Date',
                },
                pagination: {chunk: 10},
                sortable: ['index', 'orz_name'],
                filterable: ['index', 'orz_name'],
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
        this.getDonationlist()

    },
    mounted() {
        this.$nextTick(() => {
            this.getDonationlist()


        })
    },
    computed: {
        filterDonationList() {
            return this.donationInfo
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
        }

    },
    methods: {
        getDonationlist() {
            // let baseApi = baseUrl + "/api-01/report/donation-list";
            let baseApi = baseUrl + "/api/v1/approved-logs";
            let stDate = moment(this.range[0]).format('YYYY-MM-DD H:mm:ss')
            let endDate = moment(this.range[1]).format('YYYY-MM-DD H:mm:ss')

            let baseApi2 = baseApi + "?startDate=" + stDate + "&endDate=" + endDate+"&type="+"json"

            axios.get(baseApi + "?startDate=" + stDate + "&endDate=" + endDate+"&type=json").then((res) => {
                this.donationInfo = res.data
                // console.log(res.data.last_query)
            }).catch((err) => {
                // console.log(err)
            })

            console.log(this.donationInfo)
            // console.log(baseApi2)


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
        confirmDate: function () {
            // console.log(this.startTime);
            // console.log(this.endTime);


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

                this.getDonationlist()

            }).catch((err) => {

            })
            appreport.getDonationlist()

            setTimeout(()=>{
                this.errorStatus = false;
                this.successMsg=""
            },1000);


        },
        donationEdit(itemClick) {
            this.userClicked = itemClick
            // console.log(this.userClicked)
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
            // let date2 =  moment(date1).utcOffset(7)
            // return moment.utc(date2).format('YYYY.MM.DD H:mm:ss')
            return moment(date1).format('YYYY-MM-DD H:mm:ss')
        },
        covertDatetime() {
            // if(!this.emptyTime){
            //
            // }

            // console.log(this.emptyTime)
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


        }


    }
});
