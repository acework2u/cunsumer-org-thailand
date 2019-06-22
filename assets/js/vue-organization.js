var base_url = window.location.origin;
window.onload = function () {
    var orz = new Vue({
        el: '#register-form',
        data(){
            return {
                zipcode:"",
                orz_group:[],
                timer:0,
                msgSuccess:"",
                alsuccess:false,
                alError:false,
                checkRule:false,
                // orz_selected:"",
                orz_group_label:"ประเภทมูลนิธิ",
                orz_info:{
                    cus_email:"",
                    cus_password:"",
                    title:"",
                    group:"",
                    categories:""

                }
            }
        },created: function () {
            // this.timer = setInterval(this.getOrzgroup, 2000)
            this.getOrzgroup();
        },
        mounted() {
            this.$nextTick(() => { // ES6 arrow function
                // this.$refs.input_name.focus()
            })
        },
        methods:{
            onSave(){
                let api = base_url+"/api/v1/orz-register"

                this.$nextTick(() => { // ES6 arrow function
                    // this.$refs.input_name.focus()

                    let zipcode = this.$refs.zipcode.value
                    let district = this.$refs.district.value
                    let amphoe = this.$refs.amphoe.value
                    let province = this.$refs.province.value

                    this.orz_info.district = district
                    this.orz_info.amphoe = amphoe
                    this.orz_info.province = province
                    this.orz_info.stage_code = zipcode


                    let dataInfo = this.orz_info
                    var fromData = this.toFormData(dataInfo)

                    console.log(dataInfo);

                    axios.post(api,fromData).then((res)=>{
                        console.log(res.data)
                    })
                })

            },
            delay(callback, ms) {
                var timer = 0;
                return function() {
                    var context = this, args = arguments;
                    clearTimeout(timer);
                    timer = setTimeout(function () {
                        callback.apply(context, args);
                    }, ms || 0);
                };
            },
            checkUserEmail(){
                let api = base_url+"/api/v1/check-register"
                let dataInfo = {'cus_email':this.orz_info.cus_email,'cus_password':this.orz_info.cus_password}
                var fromData = this.toFormData(dataInfo)
                if (this.timer) {
                    clearTimeout(this.timer);
                    this.timer = null;
                }
                this.timer = setTimeout(() => {
                    this.alError = false
                    this.alsuccess = false
                    axios.post(api,fromData).then((res)=>{
                        console.log(res.data)
                        this.alsuccess = res.data.status
                        this.msgSuccess = res.data.message
                        this.alError = false
                        this.alsuccess = false
                        if(res.data.status===true){
                            this.alsuccess = false
                            this.alError = false
                        }else{
                            this.alsuccess = false
                            this.alError = true
                        }


                    })

                    // console.log(fromData)
                }, 3000);
                this.alError = false
                this.alsuccess = false

            },
            getOrzgroup(){
                axios.get(base_url+'/api/v1/orz-group').then((res)=>{
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
            clickRuleAccept(){

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
            comAcceptRule(){
                return this.checkRule;
            }

        }
    });
    var userlogin = new Vue({
        el:"#userlogin",
        data(){
            return{
                errors:false,
                textMessage:"",
                isLogin:false,
                orz_login:{
                    user_name:"",
                    password:""
                }
            }
        },
        methods:{
            toFormData: function (obj) {
                var form_data = new FormData();
                for (var key in obj) {
                    form_data.append(key, obj[key]);
                }
                return form_data;
            },
            userLogin(){
                let api = base_url+"/api/v1/user/logon"

                if(this.orz_login.user_name===""){
                    $('#user_name').focus();
                }
                let dataInfo = this.orz_login
                var fromData = this.toFormData(dataInfo)

                axios.post(api,fromData).then((res)=>{
                        console.log(res.data)
                    if(res.data.error){
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
            msgLoginStatus(){
                return this.textMessage;
            }
        }

    });

    var orzlast = new Vue({
        el:"#corporate-networ",
        data(){
            return {
                orz_last_info:{}
            }
        },created: function () {

            this.timer = setInterval(this.getOrzLast, 2000)

        },
        mounted() {
            this.$nextTick(() => { // ES6 arrow function
               this.getOrzLast();
            })
        },
        methods:{
            getOrzLast(){
                let API = base_url+"/api/v1/orz-reg-last"

                axios.get(API).then((res)=>{
                    this.orz_last_info = res.data

                    // console.info(this.orz_last_info)
                })
            }

        },
        computed: {

        }
    });


    /***** JQUERY *****/

    $(document).ready(function(){

        $("#login-tap").click(function(){
            $('.register-tap > span').removeClass('active');
            $('span',this).addClass('active');
            $('#login-form').removeClass('d-none');
            $('#register-form').addClass('d-none');
        });

        $("#register-tap").click(function(){
            $('.register-tap > span').removeClass('active');
            $('span',this).addClass('active');
            $('#login-form').addClass('d-none');
            $('#register-form').removeClass('d-none');
        });

        $('#register-step-2').click(function(){
            $('#step-1').addClass('d-none');
            $('#step-2').removeClass('d-none');
        });

        $('#register-step-3').click(function(){
            $('#step-2').addClass('d-none');
            $('#step-3').removeClass('d-none');
        });
        $('#accept-rule').click(function () {
            $('#step-3').addClass('d-none');
            $('#step-1').addClass('d-none');
        });

        $('.edit-btn').click(function(){
            $('#step-1').removeClass('d-none');
            $('#step-3').addClass('d-none');
        });

        $('.save-btn').click(function(){
            $('#step-3').addClass('d-none');
            $('#step-1').addClass('d-none');
            $('#step-4').removeClass('d-none');
            $('html, body').animate({
                scrollTop: $("#register").offset().top
            }, 1000);
        });

        $('.location-container').hover(function(){
            $('.location-btn',this).show();
        }, function(){
            $('.location-btn',this).hide();
        });

        $('#join-register').click(function() {
            $('#join-form').addClass('d-none');
            $('#join-done').removeClass('d-none');
        });

        $('.more-btn').click(function() {
            $('#all').addClass('d-none');
            $('#chart').removeClass('d-none');
        });

        $('.lang').click(function() {
            $('.lang').removeClass('active');
            $(this).addClass('active');
        });

        $('.nav-tap').click(function() {
            $('.nav-tap > span').removeClass('active');
            $('span',this).addClass('active');
        });

        $('#home').click(function() {
            $(window).scrollTop(0);
        });

        $('#about').click(function (){
            $('html, body').animate({
                scrollTop: $("#topic").offset().top
            }, 1000)
        });

        $('#reg').click(function (){
            $('html, body').animate({
                scrollTop: $("#register").offset().top
            }, 1000)
        });

    });
    $.Thailand({
        database: './jquery.Thailand.js/database/db.json',

        $district: $('#demo1 [name="district"]'),
        $amphoe: $('#demo1 [name="amphoe"]'),
        $province: $('#demo1 [name="province"]'),
        $zipcode: $('#demo1 [name="zipcode"]'),

        onDataFill: function(data){
            console.info('Data Filled', data);
            // $('#demo1 [name="district"]').val(data.district);
            // $('#demo1 [name="amphoe"]').val(data.amphoe);
            // $('#demo1 [name="province"]').val(data.province);
            // $('#demo1 [name="zipcode"]').val(data.zipcode);
        },

        onLoad: function(){
            console.info('Autocomplete is ready!');
            $('#loader, .demo').toggle();
        }
    });
    // watch on change
    $('#demo1 [name="district"]').change(function(){
        // console.log('ตำบล', this.value);
    });
    $('#demo1 [name="amphoe"]').change(function(){
        // console.log('อำเภอ', this.value);
    });
    $('#demo1 [name="province"]').change(function(){
        // console.log('จังหวัด', this.value);
    });
    $('#demo1 [name="zipcode"]').change(function(){
        // console.log('รหัสไปรษณีย์', this.value);

    });
}

