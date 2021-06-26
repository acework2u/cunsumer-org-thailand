var base_url = window.location.origin;
Vue.filter('wrapText', function (text) {
    let longText = text;
    var str = "";
    if(longText.length > 80){
        let a = text.substring(0,80);
         str = a+"...";
    }else{
        str = longText
    }



    return str.trim()
});

    Vue.use(VueGoogleMaps, {
        load: {
            // key: 'AIzaSyBl8RuJrQ_ua1xcCiVCGSi_vGmnvrWrZZc',
            key: 'AIzaSyBO0MLSEr7KK02AdUEbGjTH1c_HwTvNHo8',
            libraries: "places",
            region: 'TH',
        },
    });
    Vue.use(VeeValidate); // good to go.

    var orz = new Vue({
        el: '#register-form',
        data() {
            return {
                zipcode: "",
                orz_group: [],
                timer: 0,
                msgSuccess: "",
                alsuccess: false,
                alError: false,
                checkRule: false,
                // orz_selected:"",
                orz_group_label: "ประเภทมูลนิธิ",
                orz_info: {
                    cus_email: "",
                    cus_password: "",
                    title: "",
                    group: "",
                    categories: ""

                }
            }
        }, created: function () {
            // this.timer = setInterval(this.getOrzgroup, 2000)
            this.getOrzgroup();
        },
        mounted() {
            this.$nextTick(() => { // ES6 arrow function
                // this.$refs.input_name.focus()

            })
        },
        methods: {
            onSave() {
                let api = base_url + "/api/v1/orz-register"

                this.$nextTick(() => { // ES6 arrow function
                    // this.$refs.input_name.focus()

                    // let zipcode = this.$refs.zipcode.value
                    // let district = this.$refs.district.value
                    // let amphoe = this.$refs.amphoe.value
                    // let province = this.$refs.province.value

                    // this.orz_info.district = district
                    // this.orz_info.amphoe = amphoe
                    // this.orz_info.province = province
                    // this.orz_info.stage_code = zipcode
                    // this.orz_info.zip_code = zipcode


                    let dataInfo = this.orz_info
                    var fromData = this.toFormData(dataInfo)

                    console.log(dataInfo);

                    axios.post(api, fromData).then((res) => {
                        console.log(res.data)
                    })
                })

            },
            delay(callback, ms) {
                var timer = 0;
                return function () {
                    var context = this, args = arguments;
                    clearTimeout(timer);
                    timer = setTimeout(function () {
                        callback.apply(context, args);
                    }, ms || 0);
                };
            },
            checkUserEmail() {
                let api = base_url + "/api/v1/check-register"
                let dataInfo = {'cus_email': this.orz_info.cus_email, 'cus_password': this.orz_info.cus_password}
                var fromData = this.toFormData(dataInfo)
                if (this.timer) {
                    clearTimeout(this.timer);
                    this.timer = null;
                }
                this.timer = setTimeout(() => {
                    this.alError = false
                    this.alsuccess = false
                    axios.post(api, fromData).then((res) => {
                        // console.log(res.data)
                        this.alsuccess = res.data.status
                        this.msgSuccess = res.data.message
                        this.alError = false
                        this.alsuccess = false
                        if (res.data.status === true) {
                            this.alsuccess = false
                            this.alError = false
                        } else {
                            this.alsuccess = false
                            this.alError = true
                        }


                    })

                    // console.log(fromData)
                }, 3000);
                this.alError = false
                this.alsuccess = false

            },
            getOrzgroup() {
                axios.get(base_url + '/api/v1/orz-group').then((res) => {
                    console.log(res.data)
                    this.orz_group = res.data
                })
            },
            toFormData: function (obj) {
                var form_data = new FormData();
                for (var key in obj) {
                    form_data.append(key, obj[key]);
                }
                return form_data;
            },
            clickRuleAccept() {

                this.checkRule = !this.checkRule

                console.log(this.checkRule)
            }
        },
        computed: {
            classObject: function () {
                return {
                    active: this.alsuccess && !this.alError,
                    'alert text-danger': this.alError === 'true'
                }
            },
            comAcceptRule() {
                return this.checkRule;
            }

        }
    });
    var userlogin = new Vue({
        el: "#userlogin",
        data() {
            return {
                errors: false,
                textMessage: "",
                isLogin: false,
                orz_login: {
                    user_name: "",
                    password: ""
                }
            }
        },
        methods: {
            toFormData: function (obj) {
                var form_data = new FormData();
                for (var key in obj) {
                    form_data.append(key, obj[key]);
                }
                return form_data;
            },
            userLogin() {
                let api = base_url + "/api/v1/user/logon"

                if (this.orz_login.user_name === "") {
                    $('#user_name').focus();
                }
                let dataInfo = this.orz_login
                var fromData = this.toFormData(dataInfo)

                axios.post(api, fromData).then((res) => {
                    console.log(res.data)
                    if (res.data.error) {
                        this.errors = res.data.error

                    }
                    this.isLogin = res.data.isLogin
                    this.textMessage = res.data.msg
                })
            }


        },
        computed: {
            classObject: function () {
                return {
                    active: this.alsuccess && !this.alError,
                    'alert text-danger': this.alError === 'true'
                }
            },
            msgLoginStatus() {
                return this.textMessage;
            }
        }

    });
    var orzlast = new Vue({
        el: "#corporate-networ",
        data() {
            return {
                orz_last_info: {}
            }
        }, created: function () {

            this.timer = setInterval(this.getOrzLast, 2000)

        },
        mounted() {
            this.$nextTick(() => { // ES6 arrow function
                this.getOrzLast();
            })
        },
        methods: {
            getOrzLast() {
                let API = base_url + "/api/v1/orz-reg-last"

                axios.get(API).then((res) => {
                    this.orz_last_info = res.data

                    // console.info(this.orz_last_info)
                })
            }

        },
        computed: {}
    });
    var search = new Vue({
        el: "#search",
        data() {
            return {
                zones: "",
                zone: 0,
                provinces: "",
                province: 0,
                orz_list: [],
                orz_info: {},
                ggmap: {},
                center: {lat: 15.8700, lng: 100.9925},
                startLocation: {
                    lat: '',
                    lng: '',
                    zoom: 5
                },
                ggOptions: {
                    zoom: 5
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
        }, methods: {
            getZone() {
                let ZoneAPI = base_url + "/api/v1/zone-list"
                axios.get(ZoneAPI).then((res) => {
                    this.zones = res.data

                    this.province = 0
                    this.provinces = ""
                })

            },
            getProvinces() {
                let Provincy = base_url + "/api/v1/province-in-zone";
                axios.get(Provincy + "?zone_code=" + this.zone).then((res) => {
                    this.provinces = res.data
                    this.province = 0
                    //
                    // this.province =0
                    // this.provinces = ""
                })

            },
            initSearchOrz() {
                let orzApi = base_url + "/api/v1/orz-search";
                axios.get(orzApi).then((res) => {
                    this.orz_list = res.data.orz_info
                })
            },
            searchOrz() {
                let orzApi = base_url + "/api/v1/orz-search";
                let province_code = this.province
                let zone_code = this.zone

                console.log("zone code:" + this.zone + "province_code =" + this.province);

                if (this.zone === 0 || this.province === 0) {
                    this.thailandLocation()
                } else {
                    this.curentPostion()
                }

                axios.get(orzApi + "?province_code=" + province_code).then((res) => {
                    this.orz_list = res.data.orz_info
                    // coordinates
                    this.coordinates = res.data.coordinates
                   // console.log(this.orz_list)
                })
                // console.log(orzApi)


            },
            getPosition: function (marker) {
                return {
                    lat: parseFloat(marker.lat),
                    lng: parseFloat(marker.lng)
                }
            },
            toggleInfo: function (marker, key) {
                this.infoPosition = this.getPosition(marker);
                // this.infoContent = marker.full_name;
                this.infoContent = this.getInfoWindowContent(marker.full_desc);


                if (this.infoCurrentKey == key) {
                    this.infoOpened = !this.infoOpened;
                } else {
                    this.infoOpened = true;
                    this.infoCurrentKey = key;
                }
            }, getInfoWindowContent: function (marker) {
                return (`<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">${marker.title}</h5>
    <p class="card-text">${marker.address} ต.${marker.district} อ.${marker.amphoe} จ.${marker.province} ${marker.stage_code}.</p>
    <p class="card-text">เบอร์โทร. ${marker.contact_tel}</p>
    <a href="https://www.google.com/maps/search/?api=1&query=${marker.latitude},${marker.longitude}" class="btn btn-primary">Go Directions</a>
  </div>
</div>`);
            },
            geolocate() {

                if (this.zone === 0 || this.province === 0) {
                    this.thailandLocation()
                }


                // console.log("zone code:" + this.zone + "province_code =" + this.province);
                // this.startLocation.lat = 13.5980152 //13.7248936
                // this.startLocation.lng = 100.5641048 //100.4930264
                // this.ggOptions.zoom =11
            },
            async curentPostion() {

                let api = base_url + "/api/v1/get-geo-location"
                let provin_code = this.province

                let promiseA = this.province
                let promiseB = axios.get(api + "?province_code=" + promiseA)

                let resultA = await promiseA
                let resultB = await promiseB
                // console.log(resultA)
                console.log(resultB.data.message)

                if (resultB.data.error) {

                } else {
                    this.updateCenter(resultB.data.message)
                }


            },
            thailandLocation() {
                this.startLocation.lat = Number(13.0110712) //13.7248936
                this.startLocation.lng = Number(96.9949203) //100.4930264
                this.startLocation.zoom = Number(6)
            },
            updateCenter(center) {
                this.startLocation = {
                    lat: Number(center.lat),
                    lng: Number(center.lng),
                    zoom: Number(center.zoom)
                }
            },
            to(promise) {
                return promise.then((data) => {
                    return {
                        error: null,
                        result: data
                    }
                }).catch((err) => {
                    return {
                        error: err
                    }
                })
            },
            userClick(item) {
                // console.info(item)
                this.startLocation.lat = Number(item.latitude)
                this.startLocation.lng = Number(item.longitude)
                this.startLocation.zoom = 14
            },
            userOrzInfoClick(item) {
                this.orz_info = item
                console.log(this.orz_info)
            }


        },
        created: function () {
            this.getZone()
            this.initSearchOrz()
        },
        mounted() {
            this.$nextTick(() => { // ES6 arrow function
                this.geolocate()
                this.searchOrz()
            })
        },

        computed: {
            filterOrzList() {
                return this.orz_list;
            }
        }
    });
    var valunteer = new Vue({
        el: "#join-modal",
        data() {
            return {
                volunteer_info: {organization: 0, province: 0,gender:1},
                provinces: "",
                province: 0,
                organizations: "",
                organization: 0,
                is_loading: false,
                res_message: "Sending..."
            }
        },
        methods: {
            getProvinces() {
                let Province = base_url + "/api/v1/provinces";
                this.province = 0
                axios.get(Province).then((res) => {
                    this.provinces = res.data

                    this.organization = 0
                    this.organizations = ""

                })

            },
            getOrganizations() {
                let orzApi = base_url + "/api/v1/orz-search";
                let province_code = this.province
                console.log("province code:" + this.province)

                this.$nextTick(() => { // ES6 arrow function
                    axios.get(orzApi + "?province_code=" + province_code).then((res) => {
                        this.organizations = res.data.orz_info
                        this.organization = 0
                        if (res.data.orz_info <= 0) {
                            console.log(this.$refs)
                            this.$refs.no_orz.innerText = "**ไม่มีรายการมูลนิธิฯ**"
                        } else {
                            this.$refs.no_orz.innerText = "**เลือกรายการมูลนิธิฯ**"
                        }


                    })
                })
            },
            changeOrz() {
                console.info(this.organization)
            },
            valunteerRegister() {
                let volunApi = base_url + "/api/v1/volunteer-register"

                // console.log(this.volunteer_info)
                //
                // return;
                this.$nextTick(() => {
                    // this.volunteer_info.province = this.province
                    // this.volunteer_info.organization = this.organization
                    // this.volunteer_info.district2 = this.$refs.volun_district.value
                    // this.volunteer_info.amphoe2 = this.$refs.volun_amphoe.value
                    // this.volunteer_info.province2 = this.$refs.volun_province.value
                    // this.volunteer_info.zipcode2 = this.$refs.volun_zipcode.value

                    this.volunteer_info.province = this.province
                    this.volunteer_info.organization = this.organization
                    this.volunteer_info.district2 = this.$refs.valunteer_district.value
                    this.volunteer_info.amphoe2 = this.$refs.valunteer_amphoe.value
                    this.volunteer_info.province2 = this.$refs.valunteer_province.value
                    this.volunteer_info.zipcode2 = this.$refs.valunteer_zipcode.value

                    let dataInfo = this.volunteer_info
                    let fromData = this.toFormData(dataInfo)

                    const dict = {
                        custom: {
                            valunteer_name: {
                                required: 'Your name is empty'
                            },
                            valunteer_lastname: {
                                required: () => 'Your lastname is empty'
                            }
                        }
                    };

                    this.$validator.localize('en', dict);


                    this.$validator.validate().then(valid => {
                        if (!valid) {
                            // do stuff if not valid.
                        } else {

                            this.is_loading = true
                            axios.post(volunApi, fromData).then((res) => {
                                this.res_message = "Thanks for your submission!"

                                console.log(res.data)

                            })

                            setTimeout(() => {
                                this.is_loading = false
                            }, 3000)
                        }
                    });


                })

            },
            toFormData: function (obj) {
                var form_data = new FormData();
                for (var key in obj) {
                    form_data.append(key, obj[key]);
                }
                return form_data;
            }

        }, created: function () {
            this.getProvinces()
        }

    });
    var orzthailand = new Vue({
        el: "#orzInThailand",
        data() {
            return {
                orz_info:{},
                txt_ok:"ok",
                orz_in_zone:[]
            }
        },
        mounted() {
            this.$nextTick(() => { // ES6 arrow function
                this.getOrzPercentInfo();
            })
        },
        computed: {
            computedWidth: function () {
                return this.width;
            },
            orzInZone(){
                return this.orz_in_zone
            }
        },
        methods:{
            getOrzPercentInfo(){
                let API = base_url+"/api/v01/orz-total-register";

                axios.get(API).then((res)=>{
                    this.orz_info = res.data
                    this.orz_in_zone = res.data.orz_in_zone
                })

                console.info(this.orz_info)

            },
            changeWidth: function (event) {

                this.width='100%';
            }
        }
    });


    /***** JQUERY *****/

        $(document).ready(function () {
            $('input').attr('autocomplete', 'off');
            $('input').val("");

            $("#login-tap").click(function () {
                $('.register-tap > span').removeClass('active');
                $('span', this).addClass('active');
                $('#login-form').removeClass('d-none');
                $('#register-form').addClass('d-none');
            });

            $("#register-tap").click(function () {
                $('.register-tap > span').removeClass('active');
                $('span', this).addClass('active');
                $('#login-form').addClass('d-none');
                $('#register-form').removeClass('d-none');
            });

            $('#register-step-2').click(function () {
                $('#step-1').addClass('d-none');
                $('#step-2').removeClass('d-none');
            });

            $('#register-nextstep-3').click(function () {

                var title =  $('#orz-1-title').val()
                var contact_name = $('#orz-1-contact_name').val()
                var contact_lname = $('#orz-1-contact_lname').val()
                if(title==""){
                    $('#orz-1-title').focus()
                    return
                }
                if(contact_name==""){
                    $('#orz-1-contact_name').focus()
                    return
                }
                if(contact_lname==""){
                    $('#orz-1-contact_lname').focus()
                    return
                }



                $('#step-2').addClass('d-none');
                $('#step-3').removeClass('d-none');
            });
            $('#accept-rule').click(function () {
                $('#step-3').addClass('d-none');
                $('#step-1').addClass('d-none');
            });

            $('.edit-btn').click(function () {
                $('#step-1').removeClass('d-none');
                $('#step-3').addClass('d-none');
            });

            $('.save-btn').click(function () {
                $('#step-3').addClass('d-none');
                $('#step-1').addClass('d-none');
                $('#step-4').removeClass('d-none');
                $('html, body').animate({
                    scrollTop: $("#register").offset().top
                }, 1000);
            });

            $('.location-container').hover(function () {
                $('.location-btn', this).show();
            }, function () {
                $('.location-btn', this).hide();
            });

            $('#join-register').click(function () {
                // $('#join-form').addClass('d-none');
                // $('#join-done').removeClass('d-none');
                // if($('#join-modal [name="valunteer_name"]').length <=0){
                //     $('#join-modal [name="valunteer_name"]').focus()
                // }
                let v_name = $('#valunteer_name').val()
                let v_lastname = $('#valunteer_lastname').val()
                if (v_name === "" || v_name.length <= 0) {
                    $('#valunteer_name').focus()
                }
                if (v_lastname === "" || v_lastname.length <= 0) {
                    $('#valunteer_lastname').focus()
                }


            });

            $('.more-btn').click(function () {
                $('#all').addClass('d-none');
                $('#chart').removeClass('d-none');
            });

            $('.lang').click(function () {
                $('.lang').removeClass('active');
                $(this).addClass('active');
            });

            $('.nav-tap').click(function () {
                $('.nav-tap > span').removeClass('active');
                $('span', this).addClass('active');
            });

            $('#home').click(function () {
                $(window).scrollTop(0);
            });

            $('#about').click(function () {
                $('html, body').animate({
                    scrollTop: $("#topic").offset().top
                }, 1000)
            });
            // $('.who-our-about').click(()=>{
            //     $('html, body').animate({
            //         scrollTop: $("#topic").offset().top
            //     }, 1000)
            // });

            $('#about-footer').click(function () {
                $('html, body').animate({
                    scrollTop: $("#topic").offset().top
                }, 1000)
            });

            $('#register-footer').click(function () {
                $('html, body').animate({
                    scrollTop: $("#register").offset().top
                }, 1000)
            });
            $('#reg').click(function () {
                $('html, body').animate({
                    scrollTop: $("#register").offset().top
                }, 1000)
            });
            $("#login-footer").click(function () {
                $('html, body').animate({
                    scrollTop: $("#login-tap").offset().top

                }, 1000)
                $('.register-tap > span').removeClass('active');
                $('span', this).addClass('active');
                $('#login-form').removeClass('d-none');
                $('#register-form').addClass('d-none');
            });

            $('#find-location-footer').click(function () {
                $('html, body').animate({
                    scrollTop: $("#search").offset().top
                }, 1000)
            });
            $('#what-we-do-footer').click(function () {
                $('html, body').animate({
                    scrollTop: $("#what-we-do-content").offset().top
                }, 1000)
            });


        });

window.onload = function () {
        $.Thailand({
            database: base_url+'/assets/jquerythailand/database/db.json',

            $district_1: $('#add-register-1 [name="district"]'),
            $amphoe_1: $('#add-register-1 [name="amphoe"]'),
            $province_1: $('#add-register-1[name="province"]'),
            $zipcode_1: $('#add-register-1 [name="zipcode"]'),

            $district: $('#join-modal [name="district"]'),
            $amphoe: $('#join-modal [name="amphoe"]'),
            $province: $('#join-modal [name="province"]'),
            $zipcode: $('#join-modal [name="zipcode"]'),

            onDataFill: function (data) {
                console.info('Data Filled', data);
            },

            onLoad: function () {
                console.info('Autocomplete is ready!');
                $('#loader, .demo').toggle();
            }
        });
        // watch on change
        // $('#demo1 [name="district"]').change(function () {
        //     console.log('ตำบล', this.value);
        // });
        // $('#demo1 [name="amphoe"]').change(function () {
        //     console.log('อำเภอ', this.value);
        // });
        // $('#demo1 [name="province"]').change(function () {
        //     console.log('จังหวัด', this.value);
        // });
        // $('#demo1 [name="zipcode"]').change(function () {
        //     console.log('รหัสไปรษณีย์', this.value);
        //
        // });

    }
