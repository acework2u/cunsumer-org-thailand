var baseUrl = window.location.origin;
Vue.use(CKEditor)


Vue.filter('formatBaht', (value) => {
    if (value) {

        let string = numeral(value).format('0,0.00')

        return string
    }
});

var lastdonate = new Vue({
    el: "#lastdonate",

    data() {
        return {
            title: "Last Donate",
            donationInfo: [],
            donorTopInfo:[],
            donorInfo:{},
            orzInformation:{},
            orz_group:[],
            editor: ClassicEditor,
            editorData: '<p>Content of the editor.</p>',
            editorConfig: {
                // The configuration of the editor.
            }

        }
    },
    created() {
        this.getDonationlist()
        this.getTopDonate()
        this.getOrzInfo()
        this.getOrzgroup();
    },
    mounted() {
        this.$nextTick(() => {
            this.getDonationlist()
            this.getTopDonate()
            this.getOrzInfo()
            this.getOrzgroup();
        })
    },
    computed: {
        filterDonationList() {
            return this.donationInfo
        },
        filterDonorTop(){
            return this.donorTopInfo
        },
        filDonateTotal() {
            let total = 0
            return this.donationInfo.reduce((total, value) => {
                return total + Number(value.amount)
            }, 0)
        },
        totalSuccess() {
            let total = 0
            return this.donationInfo.reduce((total, value) => {

                if (value.payment_status == "00" || value.payment_status == "000") {
                    total = total + Number(value.amount)
                }
                return total
            }, 0)
        },
        totalPending() {
            let total = 0
            return this.donationInfo.reduce((total, value) => {
                if (value.payment_status == "001") {
                    total = total + Number(value.amount)
                }
                return total
            }, 0)
        },
        totalCancle() {
            let total = 0
            return this.donationInfo.reduce((total, value) => {
                if (value.payment_status !== "001" && value.payment_status !== "000" && value.payment_status !== "00") {
                    total = total + Number(value.amount)
                }
                return total
            }, 0)
        },
    },
    methods: {
        getDonationlist() {
            let baseApi = baseUrl + "/api-01/report/donation-list";

            axios.get(baseApi+"?limit=10").then((res) => {
                this.donationInfo = res.data.donationlist
            }).catch((err) => {
            })
        },
        getTopDonate(){
            let baseApi = baseUrl + "/api-v01/donate-top10";
            axios.get(baseApi+"?limit=10").then((res) => {
                this.donorTopInfo = res.data
            }).catch((err) => {
            })

        },
        donorClicked(item){
            let baseApi = baseUrl + "/admin/reports/donor-info";
            let donor_aid = item.donor_id

            // console.log(item)

            axios.get(baseApi+"?donor_aid="+donor_aid).then((res)=>{
                this.donorInfo = res.data

                // console.log(this.donorInfo)
            }).catch()


        },
        getOrzInfo(){
            let baseApi = baseUrl + "/api/v1/orz/backend/orz-information";
            axios.get(baseApi).then((res)=>{
                this.orzInformation = res.data
            })
        },
        getOrzgroup(){
            axios.get(baseUrl+'/api/v1/orz-group').then((res)=>{
                console.log(res.data)
                this.orz_group = res.data
            })
        }
    }

});
