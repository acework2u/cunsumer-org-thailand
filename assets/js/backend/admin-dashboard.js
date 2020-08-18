
    var baseUrl = window.location.origin;


    var date = new Date(), y = date.getFullYear(), m = date.getMonth();
    var firstDay = new Date(y, 0, 1);
    var lastDay = new Date(y, m + 1, 0);



    Vue.use(CKEditor)
    Vue.use(VueTables.ClientTable);

    Vue.use(VueGoogleMaps, {
        load: {
            key: 'AIzaSyBO0MLSEr7KK02AdUEbGjTH1c_HwTvNHo8',
            libraries: "places,geometry",
            region: 'TH',
            language:'th',

        },
    });

    Vue.component('pagination', Pagination);
    Vue.filter('formatBaht', (value) => {
        if (value) {
            let string = numeral(value).format('0,0.00');

            return string
        }
    });
    Vue.filter('ThaiDate', (value) => {
        if (value) {

            let string = moment(value).format('DD/MM/YYYY H:mm:ss')

            return string
        }
    });
    Vue.filter('orzStatus', (value) => {
        if (value) {
            let string = ""
            switch (value) {
                case "1":
                    string = "รอตรวจสอบ"
                    break;
                case "2":
                    string = "ดำเนินการตรวจสอบ"
                    break;
                case "3":
                    string = "ไม่อนุมัตื"
                    break;
                case "4":
                    string = "อนุมัติ"
                    break;
                case "5":
                    string = "ยกเลิกหรือเลิกดำเนินงาน"
                    break;
                default:
                    string: "รอตรวจสอบ"
                    break;
            }

            return string


        }
    });

    var lastdonate = new Vue({
        el: "#lastdonate",
        data() {
            return {
                title: "Organization List",
                useFilter:false,
                donationInfo: [],
                donorTopInfo: [],
                donorInfo: {},
                orzInformation: {logo: ""},
                orz_group: [],
                editor: ClassicEditor,
                editorData: '<p>Content of the editor.</p>',
                editorConfig: {
                    image: {
                        toolbar: [ 'imageTextAlternative' ]
                    }



                    // The configuration of the editor.
                    // toolbar: {
                    //     items: [
                    //         'heading',
                    //         '|',
                    //         'alignment',                                                 // <--- ADDED
                    //         'bold',
                    //         'italic',
                    //         'link',
                    //         'bulletedList',
                    //         'numberedList',
                    //         'imageUpload',
                    //         'blockQuote',
                    //         'undo',
                    //         'redo'
                    //     ]
                    // },
                    // image: {
                    //     toolbar: [
                    //         'imageStyle:full',
                    //         'imageStyle:side',
                    //         '|',
                    //         'imageTextAlternative'
                    //     ]
                    // },
                    // // This value must be kept in sync with the language defined in webpack.config.js.
                    // language: 'en'

                },
                file: '',
                uploadPercentage: 0,
                showPreview: false,
                imagePreview: '',
                orz_logo: false,
                orz_all: [],
                orz_total: 0,
                orz_user_select: {},
                volunteers: [],
                volunteer: {},
                textSuccess: "Sending...",
                savingStatus: false,
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
                },

                columns: ['created_date', 'title', 'contact_name', 'email', 'contact_tel', 'province', 'status', 'updated_date', 'action', 'action_1', 'action_2', 'action_3', 'action_4'],
                options: {
                    headings: {
                        created_date: 'วันลงทะเบียน',
                        title: 'องค์กร',
                        email:"อีเมล",
                        contact_name: 'ผู้ติดต่อองค์กร',
                        contact_tel:"เบอร์โทร",
                        orz_register_date: 'วันที่ลงทะเบียน',
                        orz_status: 'สถานะ',
                        approved_by: 'อนุมัติโดย',
                        approved_date: 'วันที่อนุมัติ',
                        status: 'สถานะ',
                        orz_in_province: 'จังหวัด',
                        province: 'จังหวัด',
                        orz_in_zone: 'In Zone',
                        orz_volunteer: 'Volunteer',
                        updated_date: "อัพเดทล่าสุด",
                        action: "",
                        action_1: "",
                        action_2: "",
                        action_3: "",
                        action_4: "",


                    },
                    pagination: {chunk: 10},
                    sortable: ['created_date', 'title','province','status'],
                    filterable: ['created_date', 'title','province','status'],
                    perPage: 10,
                    perPageValues: [10, 25, 50, 100, 500, 1000],

                },
                ggmap:{},
                center : {lat: 15.8700, lng: 100.9925},
                markers: [],
                places: [],
                zoom:6,
                description:"",
                latLng: {},
                currentPlace: null,
                startLocation: {
                    lat: '',
                    lng: '',
                    zoom:5
                },
                ggOptions:{
                    zoom:5
                },
                coordinates: [],
                infoPosition: null,
                infoContent: null,
                infoOpened: false,
                infoCurrentKey: null,
                infoOptions: {
                    pixelOffset: {
                        width: 0,
                        height: -35
                    }
                }


            }
        },
        created() {
            // this.getDonationlist()
            // this.getTopDonate()
            // this.getOrzInfo()
            // this.getOrzgroup()
            // this.getOrganizationList()
            // this.getVolunteers()
            // this.getOrzlist()
        },
        mounted() {
            this.$nextTick(() => {
                this.getDonationlist()
                this.getTopDonate()
                this.getOrzInfo()
                this.getOrzgroup();
                this.getOrganizationList()
                this.getVolunteers()
                this.getOrzlist()
                this.thailandLocation()
                this.geolocate()
                this.getCoordinates();

                /*
                this.$refs.mymap.$mapPromise.then((map) => {
                    map.panTo({lat: this.center.lat, lng: this.center.lng})
                })
                */



            })
        },
        computed: {
            filterVolunteers() {
                return this.volunteers
            },
            filOrzLogo() {

                let img_logo = "assets/image/no-logo-2.png"
                if (!this.orz_user_select.logo) {
                    img_logo = "assets/image/no-logo-2.png"
                } else {
                    img_logo = this.orz_user_select.logo
                }
                return baseUrl + "/" + img_logo
            },
            filOrzLogoAdmin() {

                let img_logo = "assets/image/no-logo-2.png"
                if (!this.orzInformation.logo) {
                    img_logo = "assets/image/no-logo-2.png"
                } else {
                    img_logo = this.orzInformation.logo
                }
                return baseUrl + "/" + img_logo
            },
            filterOrzTotal() {
                return this.orz_total = this.orz_all.length
            },
            filterOrzVerified() {
                let orz_v = this.orz_all.filter((orz) => {
                    return orz.status === "4"
                })
                return orz_v.length
            },
            filerOrzWaite() {
                let orz_w = this.orz_all.filter((orz) => {
                    return orz.status === "1"
                })
                return orz_w.length
            },
            filterOrzCancel() {
                let orz_c = this.orz_all.filter((orz) => {
                    return orz.status === "5" || orz.status === "3"
                })
                return orz_c.length
            },
            filterOrganizationList() {
                return this.orz_all
            },
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
            },
            fillterStartDated() {

                if(this.useFilter){
                    this.startDated = ""
                }else{
                    this.startDated = moment(this.range[0]).format('YYYY-MM-DD H:mm:ss')
                }

                // return moment(this.range[0]).format('YYYY-MM-DD H:mm:ss')
                // this.endTime = this.range[1]

                return this.startDated =""
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
            fillCoordinates(){
                return this.coordinates
            }


        },
        methods: {
            userClickClear(){
                this.orz_user_select = {}
                this.orzInformation = {}
                this.$refs.file.value = ''
                this.markers=[]
                this.coordinates=[]
                this.latLng = ""

            },
            filterClear(){

            },
            orzUserClick(item) {

                this.userClickClear()
                this.orz_user_select = item
                this.orzInformation = item
                console.log("Demo")
                console.log(item)


                this.coordinates = [{
                    lat: this.orzInformation.latitude,
                    lng: this.orzInformation.longitude,
                    full_name: this.orzInformation.title,
                    full_desc: this.orzInformation
                }]



            },
            getCoordinates(){
                let item = this.orzInformation
                this.coordinates=[]
                coordinates = [{
                    lat:this.orzInformation.latitude,
                    lng:this.orzInformation.longitude,
                    full_name:this.orzInformation
                }]
            },
            approvedOrz(item) {
                // console.info(item)

                let orz_id = item.aid
                let orz_status = 4
                let baseAPi = baseUrl + "/api/v1/orz/backend/orz-update-status?status=" + orz_status + "&id=" + orz_id
                console.log(baseAPi)
                axios.get(baseAPi).then((res) => {
                    if (res.error) {

                    } else {
                        this.getOrganizationList();
                        // console.log(res.data)
                    }
                })
            },
            cancledOrz(item) {
                // console.info(item)
                let orz_id = item.aid
                let orz_status = 3
                let baseAPi = baseUrl + "/api/v1/orz/backend/orz-update-status?status=" + orz_status + "&id=" + orz_id
                console.log(baseAPi)
                axios.get(baseAPi).then((res) => {
                    if (res.error) {

                    } else {
                        this.getOrganizationList();
                        // console.log(res.data)
                    }
                })
            },
            getOrganizationList() {
                let orzApi = baseUrl + ("/api/v1/orz/backend/orz-all");
                axios.get(orzApi).then((res) => {
                    this.orz_all = res.data
                    // this.orz_all = []
                    // console.info(this.orz_all)
                }).catch((err) => {
                })
            },
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
            volunteerClickInfo(item) {
                this.volunteer = item
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
            getVolunteers() {
                setTimeout(() => {

                    let orz_id = this.orzInformation.aid;
                    // console.log(this.orzInformation);
                    if (orz_id) {
                        let API = baseUrl + "/api/v1/orz/backend/volunteer?orz_id=" + orz_id;

                        console.log(API)
                        axios.get(API).then((res) => {
                            this.volunteers = res.data
                            // console.log(res.data)
                        })
                    }
                }, 2000)
            },
            orzinVolunteer(item){
                this.volunteers = []
                console.log(item)
                let orz_id = item.aid
                let API = baseUrl + "/api/v1/orz/backend/volunteer?orz_id=" + orz_id;
                axios.get(API).then((res) => {
                    this.volunteers = res.data
                    console.log(res.data)
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
                let full_img = "";
                /*
                  Add the form data we need to submit
                */
                formData.append('file', this.file);
                formData.append('aid', this.orzInformation.aid);
                // this.orzInformation.logo = this.file.name
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
                    // console.log(response.data.full_img);
                    // console.info("Upload logo Successful")
                    full_img = response.data.full_img
                    lastdonate.orzInformation.logo =  full_img;
                })
                    .catch(function () {
                        // console.log('FAILURE!!');
                    });

                // this.orzInformation.logo =  full_img;



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

                    this.savingStatus = true;
                    axios.post(ApiUrl, fromData).then((res) => {
                        this.textSuccess = res.data.message
                        setTimeout(() => {
                            this.savingStatus = false
                            this.textSuccess = ""
                        }, 3000)
                        // console.info(res.data)
                    });


                })

                // console.log(this.orzInformation);
            },
            saveOrzInfobyAdmin() {
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

                    this.savingStatus = true;
                    axios.post(ApiUrl, fromData).then((res) => {
                        this.textSuccess = res.data.message
                        setTimeout(() => {
                            this.savingStatus = false
                            this.textSuccess = ""
                        }, 3000)
                        // console.info(res.data)
                    });
                    this.getOrganizationList()
                    this.userClickClear()


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
            },
            getOrzlist() {
                // let baseApi = baseUrl + "/api-01/report/donation-list";
                let baseApi = baseUrl + "/api-01/report/organization-list";
                let stDate = moment(this.range[0]).format('YYYY-MM-DD H:mm:ss')
                let endDate = moment(this.range[1]).format('YYYY-MM-DD H:mm:ss')

                let baseApi2 = baseApi + "?startDate=" + stDate + "&endDate=" + endDate

                axios.get(baseApi + "?startDate=" + stDate + "&endDate=" + endDate).then((res) => {
                    // this.donationInfo = res.data.data
                    // console.log(res.data.data)
                }).catch((err) => {
                    // console.log(err)
                })

                // console.log(this.donationInfo)
                // console.log(baseApi2)


            },
            //Google Map
            thailandLocation(){
                this.startLocation.lat = Number(13.0110712) //13.7248936
                this.startLocation.lng = Number(96.9949203) //100.4930264
                this.startLocation.zoom =Number(6)
            },
            getPosition: function(marker) {
                return {
                    lat: parseFloat(marker.lat),
                    lng: parseFloat(marker.lng)
                }
            },
            updateCenter(center) {
                // this.center = {
                //     lat: center.lat(),
                //     lng: center.lng()
                // }

                this.startLocation = {
                    lat: Number(center.lat),
                    lng: Number(center.lng),
                    zoom:Number(center.zoom)
                }

                console.info(this.$refs.mymap)
                console.info(this.$refs.myLocation)
            },
            toggleInfo: function(marker, key) {
                this.infoPosition = this.getPosition(marker);
                // this.infoContent = marker.full_name;
                this.infoContent = this.getInfoWindowContent(marker.full_desc);
                // this.infoContent = marker;




                if (this.infoCurrentKey == key) {
                    this.infoOpened = !this.infoOpened;
                } else {
                    this.infoOpened = true;
                    this.infoCurrentKey = key;
                }
            },
            getInfoWindowContent: function (marker) {
                return (`<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">${marker.title}</h5>
    <p class="card-text">${marker.address} ${marker.stage_code}</p>
    <a href="https://www.google.com/maps/search/?api=1&query=${marker.latitude},${marker.longitude}" class="btn btn-primary">Go somewhere</a>
  </div>
</div>`);
            },

            showLocation: function(evt){
                console.log(evt.latLng.toString());

               let currenLatlng = evt.latLng.toString();
               currenLatlng = currenLatlng.replace("(","");
               currenLatlng = currenLatlng.replace(")","");
               let markerLatlang = currenLatlng.split(',');
              let marker_lat =   markerLatlang[0]
              let marker_lng =   markerLatlang[1]
              this.orzInformation.latitude = parseFloat(marker_lat)
              this.orzInformation.latitude2 =  markerLatlang
              this.orzInformation.longitude =  parseFloat(marker_lng)

                console.log("lat = "+marker_lat+" Lng = "+marker_lng);
               console.log(this.orzInformation)



            },
            addMarker() {

                let full_descript = this.getInfoWindowContent(this.orzInformation)
                if (this.currentPlace) {
                    const marker = {
                        lat: this.startLocation.lat,
                        lng: this.startLocation.lng
                    };


                    if(!Array.isArray(this.markers) || !this.markers.length ){
                        this.markers.push({ position: marker });
                    }
                    this.places.push(this.currentPlace);
                    this.center = marker;
                    this.currentPlace = null;
                }else{

                    let ad_lat = this.$refs.mymap.center.lat
                    let ad_lng = this.$refs.mymap.center.lng

                    this.orzInformation.latitude = ad_lat
                    this.orzInformation.longitude = ad_lng


                    const marker = {
                        // full_name:this.orzInformation.title,
                        lat: this.orzInformation.latitude,
                        lng: this.orzInformation.longitude,
                        full_desc: this.orzInformation,
                        full_name: this.orzInformation.title
                    };
                    // this.coordinates.push({ position: marker });
                    this.coordinates.push(marker);
                    this.places.push(this.currentPlace);
                    this.center = marker;
                    this.currentPlace = null;
                }

                console.info(this.coordinates)

                // console.info("lat = "+this.currentPlace.geometry.location.lat()+"lng = "+this.currentPlace.geometry.location.lng())
            },
            addMarker2(){
                if (this.currentPlace) {
                    const marker = {
                        lat: this.currentPlace.geometry.location.lat(),
                        lng: this.currentPlace.geometry.location.lng()
                    };

                    this.orzInformation.latitude = this.currentPlace.geometry.location.lat()
                    this.orzInformation.longitude = this.currentPlace.geometry.location.lng()

                    this.markers.push({ position: marker });


                    this.places.push(this.currentPlace);
                    this.center = marker;
                    this.currentPlace = null;
                    this.zoom =5
                }
            },
            clearMarker(){
                this.coordinates = []
                this.markers = []
            },
            geolocate: function() {
                navigator.geolocation.getCurrentPosition(position => {
                    this.center = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                });
                // this.thailandLocation()

            },
            updateRouteLatLng(){
                console.info(this.$refs.mymap)
                this.currentPlace.lat = this.$refs.mymap.center.lat
                this.currentPlace.lng = this.$refs.mymap.center.lng

            },
            setPlace(place) {

                this.currentPlace = place;
                console.log(place)

               if(place){
                   this.latLng = {
                       lat: place.geometry.location.lat(),
                       lng: place.geometry.location.lng(),
                   };
               }


            },
            setDescription(description) {
                this.description = description;
            },
            updatePlace(what) {
                this.place = {
                    lat: what.geometry.location.lat(),
                    lng: what.geometry.location.lng()
                };
            },
            async curentPostion(){

                let api = baseUrl+"/api/v1/get-geo-location"
                let provin_code = this.orzInformation.province_code

                let promiseA = provin_code
                let promiseB = axios.get(api+"?province_code="+promiseA)

                let resultA = await promiseA
                let resultB = await promiseB
                // console.log(api+"?province_code="+promiseA)
                // console.log(this.orzInformation)

                if(resultB.data.error){

                }else{
                    this.updateCenter(resultB.data.message)
                    // console.info(resultB.data.message)
                }
            }

        }

    });





