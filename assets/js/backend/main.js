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
            donorTopInfo: [],
            donorInfo: {},
            orzInformation: {logo: ""},
            orz_group: [],
            editor: ClassicEditor,
            editorData: '<p>Content of the editor.</p>',
            editorConfig: {
                // The configuration of the editor.
            },
            file: '',
            uploadPercentage: 0,
            showPreview: false,
            imagePreview: '',
            orz_logo: false

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
        filterDonorTop() {
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
        orzLogo() {
            let logo = baseUrl + "/" + this.orzInformation.logo
            if (this.orzInformation.logo === "") {
                this.orz_logo = false
            } else {
                this.orz_logo = true
            }

            return logo
        },
        chekIsLogo() {
            return this.orz_logo;
        },
        checkInputFileEmpty() {

            if (this.file && this.file.length > 0) {
                return false;
            } else {
                return true;
            }
        }


    },
    methods: {
        getDonationlist() {
            let baseApi = baseUrl + "/api-01/report/donation-list";

            axios.get(baseApi + "?limit=10").then((res) => {
                this.donationInfo = res.data.donationlist
            }).catch((err) => {
            })
        },
        getTopDonate() {
            let baseApi = baseUrl + "/api-v01/donate-top10";
            axios.get(baseApi + "?limit=10").then((res) => {
                this.donorTopInfo = res.data
            }).catch((err) => {
            })

        },
        donorClicked(item) {
            let baseApi = baseUrl + "/admin/reports/donor-info";
            let donor_aid = item.donor_id

            // console.log(item)

            axios.get(baseApi + "?donor_aid=" + donor_aid).then((res) => {
                this.donorInfo = res.data

                // console.log(this.donorInfo)
            }).catch()


        },
        getOrzInfo() {
            let baseApi = baseUrl + "/api/v1/orz/backend/orz-information";
            axios.get(baseApi).then((res) => {
                this.orzInformation = res.data
            })
        },
        getOrzgroup() {
            axios.get(baseUrl + '/api/v1/orz-group').then((res) => {
                console.log(res.data)
                this.orz_group = res.data
            })
        },
        handleFileUpload() {
            /*
              Set the local file variable to what the user has selected.
            */

            this.file = this.$refs.file.files[0];

            /*
              Initialize a File Reader object
            */
            let reader = new FileReader();

            /*
              Add an event listener to the reader that when the file
              has been loaded, we flag the show preview as true and set the
              image to be what was read from the reader.
            */
            reader.addEventListener("load", function () {
                this.showPreview = true;
                this.imagePreview = reader.result;
            }.bind(this), false);

            /*
              Check to see if the file is not empty.
            */
            if (this.file) {
                /*
                  Ensure the file is an image file.
                */
                if (/\.(jpe?g|png|gif)$/i.test(this.file.name)) {
                    /*
                      Fire the readAsDataURL method which will read the file in and
                      upon completion fire a 'load' event which we will listen to and
                      display the image in the preview.
                    */
                    reader.readAsDataURL(this.file);
                }
            }
        }, onUploadProgress() {
            this.uploadPercentage = parseInt(Math.round((progressEvent.loaded * 100) / progressEvent.total));
        },
        submitFile() {
            /*
              Initialize the form data
            */
            let formData = new FormData();

            /*
              Add the form data we need to submit
            */
            formData.append('file', this.file);
            formData.append('aid', this.orzInformation.aid);

            /*
              Make the request to the POST /single-file URL
            */

            // // console.log(formData);
            axios.post(baseUrl + '/uploadfile',
                formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    },
                    onUploadProgress: function (progressEvent) {
                        this.uploadPercentage = parseInt(Math.round((progressEvent.loaded * 100) / progressEvent.total));
                    }.bind(this)

                }
            ).then(function (response) {

                // console.log(response);


            })
                .catch(function () {
                    // // console.log('FAILURE!!');
                });
        },
        saveOrzInfo() {
            let ApiUrl = baseUrl + "/api/v1/orz-update"
            this.$nextTick(() => {
                let zipcode = this.$refs.zipcode.value
                let district = this.$refs.district.value
                let amphoe = this.$refs.amphoe.value
                let province = this.$refs.province.value

                this.orzInformation.district = district
                this.orzInformation.amphoe = amphoe
                this.orzInformation.province = province
                this.orzInformation.zipcode = zipcode

                let dataInfo = this.orzInformation
                var fromData = this.toFormData(dataInfo)


                console.log(dataInfo);


                axios.post(ApiUrl, fromData).then((res) => {
                    console.log(res.data)
                })


            })


            // console.log(this.orzInformation);
        },
        toFormData: function (obj) {
            var form_data = new FormData();
            for (var key in obj) {
                form_data.append(key, obj[key]);
            }
            return form_data;
        },
        onChange(event) {
            // console.log(event.target.value)
            this.orzInformation.orz_group_id = event.target.value
        },
        zipOnChange(event) {
            // console.log(event.target.value)
            this.orzInformation.stage_code = event.target.value
        }

    }

});

// window.$ = require('jquery');
// $('#demo1 [name="zipcode"]').change(function(){
//     console.log('รหัสไปรษณีย์', this.value);
//     zipCodeval.inputVal = this.value;
// });
