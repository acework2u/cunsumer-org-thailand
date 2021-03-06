var baseUrl = window.location.origin;

var date = new Date(), y = date.getFullYear(), m = date.getMonth();
var firstDay = new Date(y, 0, 1);
var lastDay = new Date(y, m + 1, 0);


Vue.use(VueTables.ClientTable);
Vue.component('pagination', Pagination);

Vue.filter('formatBaht', (value) => {
    if (value) {

        let string = numeral(value).format('0,0.00')

        return string
    }
});
Vue.filter('ThaiDate', (value) => {
    if (value) {

        let string = moment(value).format('DD-MM-YYYY H:mm:ss')

        return string
    }
});

var appreport = new Vue({
    el: "#appreport",
    data() {
        return {
            volunteerInfo: [],
            donorInfo: [],
            successMsg: "",
            statusWait: false,
            errorStatus: false,
            bankList: [],
            paymentCode: [],
            userClicked: {},
            title: "Volunteer Report",
            columns: ['index','register_datetime_thai', 'fullname', 'tel', 'email', 'join_status', 'orz_name', 'orz_province'],
            options: {
                headings: {
                    index: 'ลำดับ',
                    register_datetime_thai: 'วันที่ลงทะเบียน',
                    fullname: "ชื่อ",
                    tel: 'เบอร์โทร',
                    email:'อีเมล',
                    join_status:'สถานะ',
                    orz_name:'องค์กร',
                    orz_province:'จังหวัด',



    },
        pagination: {
            chunk: 10
        }
    ,
        sortable: [ 'index','fullname', 'tel', 'email','orz_name', 'orz_province'],
            filterable
    :
        ['fullname', 'tel', 'email','orz_name', 'orz_province'],
            perPage
    :
        10,
            perPageValues
    :
        [10, 25, 50, 100, 500, 1000],

    },


        time: new Date(),
            startTime
    :
        firstDay,
            endTime
    :
        lastDay,
            range
    :
        [firstDay, lastDay],
            startDated
    :
        "",
            endDated
    :
        "",
            emptyTime
    :
        '',
            tranferDateTime
    :
        '',
            emptyRange
    :
        [],
            currentTime
    :
        null,
            local
    :
        {
            dow: 0, // Sunday is the first day of the week
                hourTip
        :
            'Select Hour', // tip of select hour
                minuteTip
        :
            'Select Minute', // tip of select minute
                secondTip
        :
            'Select Second', // tip of select second
                yearSuffix
        :
            '', // suffix of head year
                monthsHead
        :
            'January_February_March_April_May_June_July_August_September_October_November_December'.split('_'), // months of head
                months
        :
            'Jan_Feb_Mar_Apr_May_Jun_Jul_Aug_Sep_Oct_Nov_Dec'.split('_'), // months of panel
                weeks
        :
            'Su_Mo_Tu_We_Th_Fr_Sa'.split('_'),// weeks,
                cancelTip
        :
            'cancel',
                submitTip
        :
            'confirm'
        }
    }
    }, created() {
        this.getDonationlist()
        this.getBankList()
        this.getPaymentCode()
    },
    mounted() {
        this.$nextTick(() => {
            this.getDonationlist()
            this.getBankList()
            this.getPaymentCode()

        })
    },
    computed: {
        filterVolunteerList() {
            return this.volunteerInfo
        },
        filDonateTotal() {
            let total = 0
            return this.volunteerInfo.reduce((total, value) => {
                return total + Number(value.amount)
            }, 0)
        },
        totalSuccess() {
            let total = 0
            return this.volunteerInfo.reduce((total, value) => {

                if (value.payment_status == "00" || value.payment_status == "000") {
                    total = total + Number(value.amount)
                }
                return total
            }, 0)
        },
        totalPending() {
            let total = 0
            return this.volunteerInfo.reduce((total, value) => {
                if (value.payment_status == "001") {
                    total = total + Number(value.amount)
                }
                return total
            }, 0)
        },
        totalCancle() {
            let total = 0
            return this.volunteerInfo.reduce((total, value) => {
                if (value.payment_status !== "001" && value.payment_status !== "000" && value.payment_status !== "00") {
                    total = total + Number(value.amount)
                }
                return total
            }, 0)
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
        filterPyamentStatus() {
            return this.paymentCode.filter((paycode) => {
                if (this.userClicked.payment_channel === "01" || this.userClicked.payment_channel === "001") {
                    if (paycode.use_type === "2") {
                        return paycode
                    }
                } else {
                    if (paycode.use_type === "1") {
                        return paycode
                    }

                }


            })
        },
        filterPaymentS() {
            let payStatus = this.userClicked

            if (payStatus.payment_status === "00" || payStatus.payment_status == "000") {
                return true
            } else {
                return false;
            }

        },
        exportExcel() {
            let start_date = this.range[0]
            let end_date = this.range[1]

            start_date = moment(start_date).format('YYYY-MM-DD H:mm:ss')
            end_date = moment(end_date).format('YYYY-MM-DD H:mm:ss')

            // let apiUrls = baseUrl + "/admin/reports/exportxls?startDate=" + start_date + "&endDate=" + end_date
            let apiUrls = baseUrl + "/admin/report/volunteer_exportxls?startDate=" + start_date + "&endDate=" + end_date

            return apiUrls
        },
        fillDonorInfo() {
            return this.donorInfo
        }

    },
    methods: {
        getDonationlist() {
            // let baseApi = baseUrl + "/api-01/report/donation-list";
            let baseApi = baseUrl + "/admin/report/volunteer_json";
            let startDate = moment(this.range[0]).format('YYYY-MM-DD')
            let endDate = moment(this.range[1]).format('YYYY-MM-DD')

            let baseApi2 = baseApi + "?startDate=" + startDate + "&endDate=" + endDate

            console.log(baseApi2);

            axios.get(baseApi2).then((res) => {
                this.volunteerInfo = res.data
                // console.log(res.data)
            }).catch((err) => {
                // console.log(err)
            })

            console.log(this.volunteerInfo)
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
        sendInvoiceEmail(donationId) {
            let baseApi = baseUrl + "/admin/reports/send-invoice";

            this.statusWait = true
            axios.post(baseApi + "?donation_id=" + donationId).then((res) => {
                console.log(res)
                this.statusWait = false
                this.successMsg = res.data.message

            }).catch((err) => {
                console.log(err)
            })

        },
        nameInv(item) {
            return "email_inv_" + item
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

                if (res.data.error) {
                    this.errorStatus = true
                } else {
                    this.errorStatus = false
                }
                this.successMsg = res.data.message;

                this.getDonationlist()

            }).catch((err) => {

            })
            appreport.getDonationlist()

            setTimeout(() => {
                this.errorStatus = false;
                this.successMsg = ""
            }, 1000);


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
            if (itemStatus === "00" || itemStatus === "000" || itemStatus === "Successful") {
                return true
            } else {
                return false
            }
        },
        donorClicked(item) {
            let baseApi = baseUrl + "/admin/reports/donor-info";
            let donor_aid = item.doner_aid

            // console.log(donor_aid)

            axios.get(baseApi + "?donor_aid=" + donor_aid).then((res) => {
                this.donorInfo = res.data

                // console.log(this.donorInfo)
            }).catch()


        }


    }
});











