<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>สภาองค์กรผู้บริโภค</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>" >
    <link href="<?php echo base_url('assets/css/font-awesome.min.css');?>" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="<?php echo base_url('assets/css/stylesheet.css'); ?>" rel="stylesheet" media="screen" />

    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">

    <link href="<?php echo base_url('assets/js/swiper/css/swiper.css')?>" rel="stylesheet" media="screen" />
    <script type="text/javascript" src="<?php echo base_url('assets/js/swiper/js/swiper.jquery.js')?>"></script>

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


<!--     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.20/css/uikit.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.20/css/uikit.css"> -->
    <link rel="stylesheet" href="./jquery.Thailand.js/dist/jquery.Thailand.min.css">




</head>
<body>
    <header>
        <div class="header d-none d-sm-block">
            <div class="container container-lg">
                <div class="row m-auto">
                    <div class="col-sm-3 bg-light-blue text-right py-3">
                        <img src="<?php echo base_url('assets/image/logo.png');?>" class="img-responsive">
                    </div>
                    <div class="col-sm-9 bg-blue py-3">
                        <div class="h-50">
                            <div class="lang-container text-right px-2 pointer">
                                <!-- Js line 52 -->
                                <span class="active lang">TH</span>
                                <span>|</span>
                                <span class="lang">ENG</span>
                                <!-- End -->
                            </div>
                        </div>
                        <div class="row m-auto h-50">
                            <div class="col-sm px-0 nav-tap text-white text-center pointer" id="home">
                                <span class="px-2 pb-2 active">หน้าหลัก</span>
                            </div>
                            <div class="col-sm px-0 nav-tap text-white text-center pointer" id="about">
                                <span class="px-2 pb-2">รู้จักเรา</span>
                            </div>
                            <div class="col-sm px-0 nav-tap text-white text-center pointer">
                                <span class="px-2 pb-2">ผลงาน</span>
                            </div>
                            <div class="col-sm-4 px-0 nav-tap text-white text-center pointer" id="reg">
                                <span class="pb-2">ลงทะเบียน/เข้าสู่ระบบ</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-xs d-block d-sm-none container p-0">
            <div class="row m-auto h-100">
                <div class="col-4 p-0 nav-left open">
                    <i class="fa fa-navicon px-3"></i>
                </div>
                <div class="col-4 p-0 d-flex">
                    <img src="<?php echo base_url('assets/image/logo.png');?>" class="header-img">
                </div>
                <div class="col-4 p-0 nav-right">
                    <div class="lang-container text-right pointer px-3">
                        <!-- Js line 52 -->
                        <span class="active lang-xs">TH</span>
                        <span class="lang-xs">ENG</span>
                        <!-- End -->
                    </div>
                </div>
            </div>
            <div class="w-100 p-absolute nav-list">
                <ul class="pl-3 my-3">
                    <li class="nav-text d-block home py-1">หน้าแรก</li>
                    <li class="nav-text d-block about py-1">รู้จักเรา</li>
                    <li class="nav-text d-block py-1">ผลงาน</li>
                    <li class="nav-text d-block reg py-1">ผลงาน</li>
                </ul>
            </div>
        </div>
    </header>
    <img src="<?php echo base_url('assets/image/banner.png');?>" class="w-100">
    <div id="topic" class="topic">
        <div class="container container-lg text-left py-5 py-4-sm">
            <h1 class="topic-header pt-5 pt-0-sm pb-4 pb-2-sm text-center">เราคือใคร</h1>
            <p class="topic-paragraph px-3 px-4-sm">“สภาองค์กรผู้บริโภค”  เกิดขึ้น โดยมีแนวคิดริเริ่มจากการผลักดันให้เกิด<br>
                “องค์การอิสระเพื่อการคุ้มครองผู้บริโภค” ถือกำเนิดและก่อร่างสร้างตัวขึ้นในรัฐธรรมนูญปี 2540 และระบุชัดเจนมากขึ้นในรัฐธรรมนูญปี 2550 และได้มีการจัดทำร่างกฎหมายเหลือเพียงการพิจารณาของสส. หลังจากขั้นตอนผ่านกรรมาธิการร่วม เกิดการยุบสภาและรัฐประหาร ต่อมาเมื่อมีรัฐธรรรมนูญปี 2560 มาตรา 46 ได้บัญญัติรับรองการคุ้มครองสิทธิผู้บริโภคไว้และกำหนดให้องค์กรผู้บริโภครวมตัวกันจัดตั้งองค์กรที่มีความเป็นอิสระเพื่อให้เกิดพลังในการคุ้มครองและพิทักษ์สิทธิของผู้บริโภค หลักเกณฑ์และวิธีการจัดตั้ง อำนาจในการเป็นตัวแทนผู้บริโภคให้มีการออกกฎหมาย โดยได้รับการสนับสนุนด้านการเงินจากรัฐ
                โดยคณะรัฐมนตรีได้มอบหมายให้สำนักงานคณะกรรมการคุ้มครองผู้บริโภค หรือ สคบ. เป็นเจ้าภาพในการจัดทำร่างกฎหมายตามมาตรา46 ดังกล่าว มีการยกร่างกฎหมายและจัดเวทีรับฟังความคิดเห็นจากองค์กรผู้บริโภคในภูมิภาคต่างๆ และถูกส่งต่อไปพิจารณาในคณะกรรมการกฤษฎีกาคณะพิเศษ ถูกปรับแก้ไขหลักการกฎหมาย เป็นร่างกฎหมายการจัดตั้งสภาองค์กรของผู้บริโภค ส่งกลับให้คณะรัฐมนตรีเห็นชอบ และวันที่ 15 กุมภาพันธ์ 2562 สภานิติบัญญัติได้มีมติเห็นชอบผ่านร่างพระราชบัญญัติการจัดตั้งสภาองค์กรของผู้บริโภค ซึ่งทำให้องค์กรผู้บริโภคสามารถรวมตัวกันเพื่อจัดตั้งเป็นสภาองค์กรของผู้บริโภค เป็นนิติบุคคลที่มีวัตถุประสงค์คุ้มครองผู้บริโภคในทุกด้าน มีอำนาจเป็นตัวแทนของผู้บริโภค มีความเป็นอิสระจากหน่วยงานรัฐ และพรรคการเมือง โดยรัฐสนับสนุนด้านการเงิน
            </p>
            <h1 class="topic-header pt-5 pt-4-sm pb-4 pb-2-sm text-center">บทบาท หน้าที่</h1>
            <p class="topic-paragraph px-3 px-4-sm pb-5">สภาองค์กรของผู้บริโภค มีอำนาจเป็นตัวแทนของผู้บริโภค และมีบทบาทสำคัญในการส่งเสริมการรวมตัวขององค์กรผู้บริโภคให้มีพลังในการคุ้มครองและพิทักษ์สิทธิของผู้บริโภคมากขึ้น จึงเห็นความสำคัญในการมี “ฐานข้อมูลองค์กรผู้บริโภค นักวิชาการและแกนนำคนทำงานคุ้มครองผู้บริโภคร่วมกัน” เพื่อให้เป็นแหล่งข้อมูลที่ทุกคนสามารถใช้ประโยชน์ในการประสานทำงานกับทั้งภาครัฐและเอกชนในการคุ้มครองผู้บริโภค และสภาองค์กรของผู้บริโภค ยังมีบทบาทสำคัญอีกหลายประการ ได้แก่ <br>
                1. เป็นตัวแทนของผู้บริโภค ให้ความคุ้มครองและพิทักษ์สิทธิของผู้บริโภค รวมตลอดทั้งเสนอแนะนโยบายเกี่ยวกับการคุ้มครองผู้บริโภคต่อคณะรัฐมนตรีหรือหน่วยงานของรัฐและเอกชนที่เกี่ยวข้อง <br>
                2. ส่งเสริม สนับสนุนและดำเนินการ ตรวจสอบ ติดตาม เฝ้าระวังสถานการณ์ปัญหาสินค้าและบริการ แจ้งหรือโฆษณาข่าวสารหรือเตือนภัยเกี่ยวกับสินค้าหรือบริการที่อาจกระทบต่อสิทธิของผู้บริโภค <br>
                3. รายงานการกระทำหรือละเลยการกระทำอันมีผลกระทบต่อสิทธิของผู้บริโภคไปยังหน่วยงานของรัฐหรือหน่วยงานอื่นที่รับผิดชอบและเผยแพร่ให้ประชาชนทราบ<br>
                4. สนับสนุนการศึกษาและการวิจัยเพื่อประโยชน์ในการดำเนินงานคุ้มครองและพิทักษ์สิทธิของผู้บริโภค<br>
                5. ดำเนินคดีเกี่ยวกับการละเมิดสิทธิของผู้บริโภคหรือให้ความช่วยเหลือในการดำเนินคดีในกรณีที่ผู้บริโภคหรือองค์กรของผู้บริโภคถูกฟ้องคดีจากการใช้สิทธิในฐานะผู้บริโภคหรือใช้สิทธิแทนผู้บริโภค แล้วแต่กรณี และมีอำนาจประนีประนอมยอมความ
            </p>
        </div>
    </div>
    <div id="connection" class="connection">
        <div class="container container-lg">
            <div class="row m-auto pt-2">
                <div class="col-sm mt-5 mb-4-sm">
                    <div class="connection-container w-100 text-center p-relative">
                        <img src="<?php echo base_url('assets/image/network.jpg');?>" class="p-absolute">
                        <div class="d-flex p-relative connection-container-text p-absolute w-100">
                            <p>เครือข่ายองค์กรผู้บริโภค</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm mt-5 mb-4-sm">
                    <div class="connection-container w-100 text-center p-relative">
                        <img src="<?php echo base_url('assets/image/training.jpg'); ?>" class="p-absolute">
                        <div class="d-flex p-relative connection-container-text p-absolute w-100">
                            <p>ภาคีเครือข่าย<br>(กพย., คคส., และอื่นๆ)</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm mt-5 mb-4-sm">
                    <div class="connection-container w-100 text-center p-relative">
                        <img src="<?php echo base_url('assets/image/meeting.jpg');?>" class="p-absolute">
                        <div class="d-flex connection-container-text p-absolute w-100">
                            <p>นักวิชาการ และ ผู้เชี่ยวชาญ <br>ด้านต่างๆ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="corporate-networ" class="bg-yellow">
        <div class="container text-center p-relative">
            <h1 class="corporate-networ-header pt-4 pb-2">องค์กรที่ลงทะเบียนล่าสุด</h1>

            <div class="d-flex flex-row">
                <div class="p-2"><img  :src="orz_last_info.logo" class="pb-4" style="max-height: 120px;"></div>
                <div class="p-2"><h3 class="corporate-networ-h3">{{orz_last_info.title}}</h3></div>
            </div>
            <span class="p-absolute corporate-networ-more" data-toggle="modal" data-target="#orz-last-modal" >เพิ่มเติม <i class="fa fa-caret-right"></i></span>
        </div>


        <div class="modal" id="orz-last-modal">
            <div class="modal-dialog register-modal">
                <div class="modal-content register-modal-container w-100 px-3 py-2 p-relative">
                <div class="d-flex flex-row bd-highlight mb-3">
<!--                    <img src="--><?php //echo base_url('assets/image/register-modal.png');?><!--" class="w-auto py-2">-->
<!--                    <h1>{{orz_last_info.title}}</h1>-->
                    <div class="p-2 bd-highlight "><img  :src="orz_last_info.logo" style="max-height: 134px"></div>
                    <div class="p-2 bd-highlight">{{orz_last_info.title}}</h3><p style="font-size: small">{{orz_last_info.address}} ตำบล/แขวง {{orz_last_info.district}} อำเภอ {{orz_last_info.amphoe}} จังหวัด {{orz_last_info.province}} {{orz_last_info.stage_code}}</p></div>
                    <!--
                    <div class="" style="width: 534px;height: 125px; background-color: #0b3e6f">
                        <div class="left"></div><div class="right text-white"><h3></div>
                    </div>
                    -->
                </div>
                <div class="row m-auto">
                    <div class="col-sm">
                        <p class="mb-1">วัตถุประสงค์</p>
                        <ol class="modal-ol" v-html="orz_last_info.objective">

                            </ol>
                            <p class="mb-1">ผู้ประสานงานหลัก : <span class="modal-span">{{orz_last_info.contact_name}} {{orz_last_info.contact_lastname}}</span></p>
                            <p class="mb-1">E-mail : <span class="modal-span">{{orz_last_info.email}}</span></p>
                            <p class="mb-1">Website : <span class="modal-span">{{orz_last_info.website}}/</span></p>
                            <p>เบอร์ติดต่อองค์กร : <span class="modal-span">{{orz_last_info.orz_tel}}</span></p>
                            <p class="mb-1">รายชื่อคณะกรรมการ</p>
                            <ol class="modal-ol pb-5" v-html="orz_last_info.board_of_directors">
                            </ol>
                        </div>
                        <div class="col-sm">
                            <p class="mb-1">ผลงานย้อนหลังในรอบ 10 ปี</p>
                            <ol class="modal-ol" v-html="orz_last_info.portfolio">

                            </ol>

                        </div>
                    </div>
                    <div class="modal-btn-container p-absolute">
                        <!-- Js line 26 - 34 -->

                        <!-- End -->
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div id="register" class="register p-relative">
        <div class="container container-lg">
            <div class="form-header p-absolute text-right d-none d-sm-block">
                <h1>ลงทะเบียนสมาชิกองค์การผู้บริโภค</h1>
                <p class="text-white">ร่วมสานพลัง เพื่อพิทักษ์สิธิผู้บริโภค</p>
            </div>
            <div class="form-header text-center d-block d-sm-none">
                <h1 class="mb-0 pt-4">ลงทะเบียนสมาชิกองค์การผู้บริโภค</h1>
                <p class="text-white">ร่วมสานพลัง เพื่อพิทักษ์สิธิผู้บริโภค</p>
            </div>
            <div class="row m-auto">
                <div class="col-sm p-0"></div>
                <div class="col-sm p-0">
                    <div class="register-container w-100 p-absolute">
                        <div class="row m-auto text-center">
                            <div class="col-1 p-0"></div>
                            <!-- Js line 2 - 14 -->
                            <div class="col p-0 register-tap pointer" id="login-tap">
                                <span class="px-3 pb-2">เข้าสู่ระบบ</span>
                            </div>
                            <div class="col p-0 register-tap pointer" id="register-tap">
                                <span class="px-3 pb-2 active">ลงทะเบียน</span>
                            </div>
                            <!-- End -->
                            <div class="col-1 p-0"></div>
                        </div>
                    </div>
                    <div class="d-none" id="login-form">
                        <div class="form-container w-100 p-4 p-absolute" id="userlogin">
                            <div class="d-flex w-100 pb-4">
                                <span v-if="msgLoginStatus !='' ">{{msgLoginStatus}}</span>
                            </div>
                            <input v-if="!isLogin" id=user_name" type="text" name="user_name" placeholder="อีเมล" class="w-100 mb-3 form-input" v-model="orz_login.user_name">
                            <input v-if="!isLogin" type="password" name="password" placeholder="ป้อนรหัสผ่าน" class="w-100 mb-4 form-input" v-model="orz_login.password">
                            <div class="d-flex w-100">
                                <label class="label-container" v-if="!isLogin">จดจำรหัส
                                    <input type="checkbox" name="remember" value="remember" v-if="!isLogin">
                                    <span class="checkmark" v-if="!isLogin"></span>
                                </label>
                            </div>
                            <div class="d-flex w-100 mt-4 pb-4">
                                <button v-if="!isLogin" class="form-btn text-white py-2 px-4" @click="userLogin">เข้าสู่ระบบ</button>
                                <a href="<?php echo base_url('admin');?>">
                                    <button v-if="isLogin" class="form-btn text-white py-2 px-4" @click="userLogin" >เข้าระบบจัดการข้อมูล</button>
                                </a>
                            </div>
                        </div>
                        <div class="login-container-shadow p-absolute"></div>
                    </div>
                    <div class="" id="register-form">
                        <div id="step-1">
                            <div class="form-container p-4 p-absolute" id="demo1">

                                <input autocomplete="off"  type="text" id="cus-email" name="account-email" placeholder="Email" class="w-100 mb-2 form-input form-control" @keyup="checkUserEmail" v-model="orz_info.cus_email">
                                <div v-if="alError===true" :class="classObject" role="alert">
                                    ** {{msgSuccess}}
                                </div>
                                <input autocomplete="off" type="password" name="account-password" placeholder="Password*" class="w-100 mb-2 form-input" v-model="orz_info.cus_password">
                                <label for="exampleFormControlSelect1">{{orz_group_label}}</label>
                                <div class="d-flex w-100 pb-4">
                                    <select class="form-control" id="orzgroupSelect" v-model="orz_info.group">
                                        <option value="" selected="selected" hidden="hidden">Choose here</option>
                                        <option v-for="item in orz_group" :value="item.aid">{{item.title_th}}</option>
                                    </select>
                                </div>
                                <div class="d-flex w-100">
                                    <label class="label-container">นิติบุคคล
                                        <input type="radio" name="type" value="1" checked="checked" v-model="orz_info.categories">
                                        <span class="checkmark-o"></span>
                                    </label>
                                    <label class="label-container">บุคคลธรรมดา
                                        <input type="radio" name="type" value="2" v-model="orz_info.categories">
                                        <span class="checkmark-o"></span>
                                    </label>
                                    <label class="label-container">อื่นๆ
                                        <input type="radio" name="type" value="3" v-model="orz_info.categories">
                                        <span class="checkmark-o"></span>
                                    </label>
                                </div>
                                <input type="text" name="foundation" placeholder="มูลนิธิ*" class="w-100 mb-2 form-input" v-model="orz_info.title">

                                <label class="pt-2">ชื่อผู้ติดต่อ</label>
                                <div class="row m-auto pb-2 pb-0-sm">
                                    <div class="col-5 p-0">
                                        <input readonly onfocus="if (this.hasAttribute('readonly')) { this.removeAttribute('readonly'); this.blur(); this.focus();  }" type="text" name="name" placeholder="ชื่อ*" class="w-100 mb-2 form-input" v-model="orz_info.contact_name">
                                    </div>
                                    <div class="col-7 pl-2 pr-0">
                                        <input readonly onfocus="if (this.hasAttribute('readonly')) { this.removeAttribute('readonly'); this.blur(); this.focus();  }" type="text" name="lastname" placeholder="นามสกุล*" class="w-100 mb-2 form-input" v-model="orz_info.contact_lastname">
                                    </div>
                                </div>
                                <input readonly onfocus="if (this.hasAttribute('readonly')) { this.removeAttribute('readonly'); this.blur(); this.focus();  }" type="text" name="tel" class="w-100 mb-2 form-input" placeholder="เบอร์ติดต่อ*" v-model="orz_info.tel">
                                <input readonly onfocus="if (this.hasAttribute('readonly')) { this.removeAttribute('readonly'); this.blur(); this.focus();  }" type="text" name="register-email" class="w-100 mb-2 form-input" placeholder="เบอร์มือถือ*" v-model="orz_info.mobile_no">



                                <input type="text" name="address" placeholder="ที่อยู่*" class="w-100 mb-2 form-input" v-model="orz_info.address">
                                <div class="row m-auto pb-2">
                                    <div class="col-sm-6 p-0">
                                        <label class="control-label">ตำบล / แขวง *</label>
                                        <input readonly onfocus="if (this.hasAttribute('readonly')) { this.removeAttribute('readonly'); this.blur(); this.focus();  }" ref="district" id="district-1" v-model="orz_info.district" name="district" class="uk-input  form-input w-100" type="text">

                                    </div>
                                    <div class="col-sm-6 pl-2 pr-0 pl-0-sm">
                                        <label class="control-label">อำเภอ *</label>
                                        <input readonly onfocus="if (this.hasAttribute('readonly')) { this.removeAttribute('readonly'); this.blur(); this.focus();  }" ref="amphoe" v-model="orz_info.amphoe" name="amphoe" class="uk-input  form-input w-100" type="text" id="amphoe-1">

                                    </div>
                                </div>
                                <div class="row m-auto pb-2">
                                    <div class="col-sm-6 p-0">
                                        <label class="control-label">จังหวัด *</label>
                                        <input readonly onfocus="if (this.hasAttribute('readonly')) { this.removeAttribute('readonly'); this.blur(); this.focus();  }"  ref="province" id="province-1" v-model="orz_info.province" name="province" class="uk-input  form-input w-100" type="text">
                                    </div>
                                    <div class="col-sm-6 pl-2 pr-0 pl-0-sm">
                                        <label class="control-label">รหัสไปรษณีย์ *</label>
                                        <input readonly onfocus="if (this.hasAttribute('readonly')) { this.removeAttribute('readonly'); this.blur(); this.focus();  }" ref="zipcode" id="zipcode-1"  name="zipcode" class="uk-input w-100 form-input" type="text" v-model="orz_info.zipcode">
                                    </div>
                                </div>
                                <div id="googleMap" style="width:100%;height:200px;"></div>


                                <div class="d-flex w-100 mt-4 pb-4">
                                    <!-- Js line 16 -->
                                    <button class="form-btn text-white py-2 px-4" id="register-step-3">หน้าต่อไป</button>
                                    <!-- End -->
                                </div>


                            </div>
                            <div class="register-container-shadow p-absolute"></div>
                        </div>
                        <div id="step-2" class="d-none">
                            <div class="form-container p-4 p-absolute">
                                <label>วัตถุประสงค์</label>
                                <textarea rows="5" class="w-100 mb-2 form-input" name="objective"></textarea>
                                <label>ผู้ประสานงานหลัก</label>
                                <div class="row m-auto pb-2">
                                    <div class="col-sm-5 p-0">
                                        <input type="text" name="coordinator-name" placeholder="ชื่อ*" class="w-100 mb-2 form-input">
                                    </div>
                                    <div class="col-sm-7 pl-2 pr-0">
                                        <input type="text" name="coordinator-lastname" placeholder="นามสกุล*" class="w-100 mb-2 form-input">
                                    </div>
                                </div>
                                <input type="text" name="coordinator-tel" placeholder="เบอร์ติดต่อ*" class="w-100 mb-2 form-input">
                                <input type="text" name="coordinator-email" placeholder="Email*" class="w-100 mb-2 form-input">
                                <label>รายชื่อคณะกรรมการ</label>
                                <input type="text" name="judge-name" placeholder="ชื่อ-นาสกุล*" class="w-100 mb-2 form-input">
                                <div class="d-flex w-100 py-2">
                                    <button class="add-btn py-2 px-4"><i class="fa fa-plus-circle"></i> เพิ่ม</button>
                                </div>
                                <label>ผลงานย้อนหลังในรอบ 10 ปี</label>
                                <textarea rows="5" class="w-100 mb-2 form-input" name="past-performance"></textarea>
                                <label>รายชื่ออาสาสมัคร</label>
                                <input type="text" name="volunteers-name" placeholder="ชื่อ-นาสกุล*" class="w-100 mb-2 form-input">
                                <div class="d-flex w-100 py-2">
                                    <button class="add-btn py-2 px-4"><i class="fa fa-plus-circle"></i> เพิ่ม</button>
                                </div>
                                <div class="d-flex w-100 mt-5 pb-4">
                                    <!-- Js line 21 -->
                                    <button class="form-btn text-white py-2 px-4" id="register-step-3">หน้าต่อไป</button>
                                    <!-- End -->
                                </div>
                            </div>
                            <div class="register-container-shadow-back p-absolute"></div>
                        </div>
                        <div id="step-3" class="d-none">
                            <div class="form-container p-4 p-absolute">
                                <h1 class="condition-header text-center py-3">ข้อตกลงและเงื่อนไข</h1>
                                <div class="row m-auto">
                                    <div class="col-sm p-3 condition-container w-100">
                                        <p>ข้อตกลงและเงื่อนไขการลงทะเบียนขอรับชื่อผู้ใช้งานและรหัสผ่าน (Username & Password)<br>
                                            ข้อตกลงและเงื่อนไขนี้ใช้บังคับระหว่าง คณะกรรมการองค์การอิสระเพื่อการคุ้มครองผู้บริโภคภาคประชาชนซึ่งต่อไปนี้จะเรียกว่า “ผู้ให้บริการ” กับผู้สมัครขอลงทะเบียนรับชื่อผู้ใช้งานและรหัสผ่าน (Username & Password) เพื่อใช้บริการระบบลงทะเบียนองค์กรผู้บริโภคหรืออาสาสมัครคุ้มครองผู้บริโภคทางอิเล็กทรอนิกส์ (e‐Registration) ซึ่งต่อไปนี้จะเรียกว่า “ผู้ใช้บริการ” โดยผู้ใช้บริการตกลงยินยอมผูกพันยินยอมผูกพันและปฏิบัติตาม ข้อตกลงและเงื่อนไข ดังต่อไปนี้<br>
                                            1. ข้อตกลงและเงื่อนไขนี้ใช้บังคับระหว่าง กรมพัฒนาธุรกิจการค้า กระทรวงพาณิชย์ ซึ่งต่อไปนี้จะเรียกว่า “ผู้ให้บริการ” กับผู้สมัครขอรับชื่อผู้ใช้และรหัสผ่าน (Username & Password) เพื่อใช้บริการระบบ) เพื่อใช้บริการระบบลงทะเบียนองค์กรผู้บริโภคหรืออาสาสมัครคุ้มครองผู้บริโภคทางอิเล็กทรอนิกส์ ซึ่งต่อไปนี้จะเรียกว่า “ผู้ใช้บริการ” <br>
                                            2. การสมัครขอรับชื่อผู้ใช้และรหัสผ่าน (Username & Password) เพื่อใช้บริการระบบลงทะเบียนองค์กรผู้บริโภคหรืออาสาสมัครคุ้มครองผู้บริโภคทางอิเล็กทรอนิกส์ ไม่ต้องเสียค่าใช้จ่ายใด ๆ ทั้งสิ้น <br>
                                            3. ผู้ใช้บริการ จะต้องกรอกหรือระบุข้อมูลรายละเอียดต่าง ๆ ตามความเป็นจริงให้ครบถ้วน ทั้งนี้เพื่อประโยชน์แก่ตัวผู้ใช้บริการ และผู้ให้บริการ หากตรวจพบว่าข้อมูลของผู้ใช้บริการไม่เป็นความจริง ผู้ให้บริการอาจระงับหรือยกเลิกสิทธิ์การใช้งานของผู้ใช้บริการได้โดยไม่ต้องแจ้งให้ทราบล่วงหน้า และผู้ใช้บริการจะต้องรับผิดชอบในความเสียหายที่เกิดขึ้นจากการกรอกข้อมูลอันเป็นเท็จดังกล่าว <br>
                                            4. ผู้ใช้บริการ ตกลงยินยอมให้ ผู้ให้บริการ ตรวจสอบความถูกต้องและเปิดเผยข้อมูลตามที่ได้ระบุไว้ในการสมัครขอรับ ชื่อผู้ใช้และรหัสผ่าน (Username & Password) นี้ เพื่อใช้ประโยชน์ของผู้ให้บริการ และในกรณีที่ผู้ให้บริการตรวจสอบพบว่าข้อมูลที่ผู้ใช้บริการระบุไว้ไม่ชัดเจนหรือเป็นเท็จ ผู้ให้บริการมีสิทธิที่จะปฏิเสธการรับลงทะเบียนหรือยกเลิกชื่อผู้ใช้และรหัสผ่านของผู้ใช้บริการได้ โดยไม่ต้องแจ้งให้ผู้ใช้บริการทราบ <br>
                                            5. ผู้ใช้บริการต้องไม่นำชื่อผู้ใช้และรหัสผ่าน (Username & Password) ไปใช้ในทางที่ขัดต่อกฎหมาย และความสงบ เรียบร้อย หรือศีลธรรมอันดีของประชาชน <br>
                                            7. ผู้ใช้บริการตกลงและเข้าใจดีว่า การใช้ชื่อผู้ใช้ (Username) เพื่อสร้างลายมือชื่ออิเล็กทรอนิกส์ จะต้องใช้คู่กับรหัสผ่าน (Password) ซึ่งผู้ใช้บริการเป็นผู้กำหนดขึ้นด้วยตนเอง และใช้ร่วมกับรหัสลับแบบใช้ครั้งเดียว (One Time Password : OTP) ในกรณีที่ผู้ใช้บริการไม่สามารถจำรหัสผ่านที่ตนกำหนดได้ <br>ผู้ใช้บริการจะต้องทำการตั้งรหัสผ่านใหม่ผ่านทางหน้าจอระบบจดทะเบียนนิติบุคคลทางอิเล็กทรอนิกส์ (e-Registration) โดยคลิกปุ่ม “เข้าสู่ระบบ” และคลิกเลือก “ลืมรหัสผ่าน”
                                            8. ในกรณีที่เหตุอันควรสงสัยว่ารหัสผ่าน (Password) ของผู้ใช้บริการ ล่วงรู้ไปถึงบุคคลอื่นซึ่งไม่มีหน้าที่เกี่ยวข้อง ผู้ใช้บริการมีหน้าที่ต้องทำการตั้งรหัสผ่านใหม่ โดยทันทีผ่านทางหน้าจอระบบลงทะเบียน (e-Registration) ทั้งนี้ หากมีผู้อื่นนำรหัสผ่าน (Password) ไปใช้และก่อให้เกิดผลเสียหายหรือค่าใช้จ่าย ผู้ใช้บริการต้องรับผิดชอบการกระทำดังกล่าวด้วย<br>
                                            9. ผู้ใช้บริการตกลงและยอมรับว่าผู้ให้บริการมีสิทธิที่จะแก้ไข เปลี่ยนแปลง หรือยกเลิกข้อตกลงและเงื่อนไขการสมัครขอรับชื่อผู้ใช้และรหัสผ่าน (Username & Password) นี้ได้ ตามที่ผู้ให้บริการได้พิจารณาแล้วเห็นสมควร เพื่อประโยชน์ในการพัฒนาหรือปรับปรุงการให้บริการ หรือเพื่อปฏิบัติการให้เป็นไปตามบทบัญญัติของกฎหมายที่เกี่ยวข้องทั้งที่ใช้บังคับอยู่ และที่จะออกมาใช้บังคับในอนาคต หรือในกรณีที่ผู้ให้บริการเห็นสมควรที่จะแก้ไข เปลี่ยนแปลง หรือยกเลิกข้อตกลงและเงื่อนไข ในข้อตกลงฉบับนี้ ทั้งนี้ผู้ให้บริการจะแจ้งให้ผู้ใช้บริการทราบล่วงหน้าทาง e-mail, SMS หรือโดยวิธีการทางอิเล็กทรอนิกส์อื่นใด ที่ผู้ให้บริการกำหนด ล่วงหน้าไม่น้อยกว่า 30 วันก่อนวันที่การแก้ไข เปลี่ยนแปลง หรือยกเลิกข้อตกลงและเงื่อนไขจะมีผลบังคับใช้ <br>
                                            10. ผู้ใช้บริการต้องเก็บรักษาชื่อผู้ใช้และรหัสผ่าน (Username & Password) ที่ได้รับไว้เป็นความลับ และผู้ใช้บริการตกลงและยอมรับว่าในกรณีที่มีการใช้ชื่อผู้ใช้และรหัสผ่าน (Username & Password) เพื่อสร้างลายมือชื่ออิเล็กทรอนิกส์ และบันทึกข้อมูลอิเล็กทรอนิกส์ที่ใช้ในการติดต่อสื่อสารบนเครือข่ายคอมพิวเตอร์ เพื่อก่อให้เกิดนิติสัมพันธ์ระหว่างบุคคล ผู้ใช้บริการตกลงและยินยอมให้ถือเสมือนว่าลายมือชื่ออิเล็กทรอนิกส์ที่บันทึกลงบนข้อมูลอิเล็กทรอนิกส์มีความผูกพันตามกฎหมายเสมือนเป็นการลงลายมือชื่อของผู้ใช้บริการในเอกสารการจดทะเบียนและยินยอมผูกพันตามเนื้อหาหรือข้อมูลนั้นทุกประการ ทั้งนี้ โดยรวมถึงกรณีที่มีการสร้างหรือนำลายมือชื่ออิเล็กทรอนิกส์ไปใช้ผิดวัตถุประสงค์ของผู้ใช้บริการ หรือใช้โดยผิดข้อตกลง หรือเงื่อนไขการใช้ชื่อผู้ใช้และรหัสผ่าน (Username & Password) และการใช้นั้นได้ก่อให้เกิดความเสียหายต่อบุคคลหนึ่งบุคคลใด ผู้ใช้บริการจะเป็นผู้รับผิดชอบต่อความเสียหายที่เกิดขึ้นทุกประการด้วยตนเอง <br>
                                            11. ผู้ใช้บริการต้องปฏิบัติตามข้อตกลงและเงื่อนไขการสมัครและการใช้บริการของผู้ให้บริการโดยเคร่งครัดเพื่อความปลอดภัย ในข้อมูลส่วนบุคคลของผู้ใช้บริการ ในกรณีที่ข้อมูลดังกล่าวถูกโจรกรรม สูญหาย หรือเสียหายอันเนื่องจากเหตุสุดวิสัยหรือไม่ว่ากรณีใด ๆ ก็ตาม ผู้ให้บริการมีสิทธิปฏิเสธและไม่ต้องรับผิดชอบในความเสียหายที่เกิดขึ้นจากเหตุต่าง ๆ ดังกล่าวได้ <br>
                                            12. ผู้ใดแอบอ้างหรือกระทำการใด ๆ อันเป็นการละเมิดสิทธิส่วนบุคคลโดยใช้ข้อมูลของผู้อื่นมาแอบอ้างในการสมัครขอรับชื่อผู้ใช้และรหัสผ่าน (Username & Password) ถือเป็นความผิดและต้องได้รับโทษตามที่กฎหมายกำหนดไว้ <br>
                                            13. ผู้ให้บริการอาจส่งข้อมูลหรือแจ้งข่าวประชาสัมพันธ์ผ่านช่องทางต่าง ๆ เช่น e-mail, SMS หรือช่องทางอื่นใดที่จะ มีขึ้นในอนาคต ให้แก่ผู้ใช้บริการได้ตามที่ผู้ให้บริการเห็นสมควร ทั้งนี้ผู้ให้บริการมีระบบการตรวจจับ Virus ก่อนส่งข่าวสารใด ๆ ให้แก่ผู้ใช้บริการทุกครั้ง ดังนั้น หากเครื่องคอมพิวเตอร์ของผู้ใช้บริการเกิดความผิดปกติอันเนื่องมาจากการติด Virus หรือ Spam mail ผู้ใช้บริการไม่สามารถเรียกร้องให้ผู้ให้บริการรับผิดชอบใด ๆ ได้ทั้งสิ้น <br>
                                            14. ผู้ให้บริการมีสิทธิระงับหรือยกเลิกการให้บริการกับผู้ใช้บริการได้ทันที ถ้าปรากฏว่าผู้ใช้บริการปฏิบัติผิดข้อตกลง และเงื่อนไขนี้แม้เพียงข้อใดข้อหนึ่ง
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex w-100 mt-4">
                                    <label class="label-container label-condition">ยืนยอมเงื่อนไข
                                        <input @click="clickRuleAccept" type="checkbox" name="remember" value="remember">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="d-flex w-100 mt-2 pb-4">
                                    <button id="accept-rule" class="form-btn text-white py-2 px-4 d-none" data-toggle="modal" data-target="#register-modal">หน้าต่อไป</button>
                                    <!--                                <button v-if="comAcceptRule" id="accept-rule" class="form-btn text-white py-2 px-4">ยืนยันลงทะเบียน</button>-->
                                    <button   class="save-btn form-btn text-white py-2 px-4" data-dismiss="modal" @click="onSave">ยืนยันลงทะเบียน</button>
                                    <!--                                <button class="save-btn text-white mx-2" data-dismiss="modal" @click="onSave">บันทึก</button>-->

                                </div>
                            </div>
                            <div class="register-container-shadow-back p-absolute"></div>
                        </div>
                        <div id="step-4" class="d-none">
                            <div class="form-container p-4 p-absolute step-4">
                                <div class="h-10 d-flex">
                                    <img src="<?php echo base_url('assets/image/done.png');?>">

                                </div>
                                <div class="h-40 d-flex">
                                    <span class="mt-3">เมื่อลงทะเบียนแล้วกรุณาเข้าระบบ เพื่อทำการเพิ่มข้อมูลเพื่อนุมัติต่อไป</span>

                                </div>


                            </div>
                            <div class="step-4-shadow-back p-absolute"></div>
                        </div>
                        <div class="modal" id="register-modal">
                            <div class="modal-dialog register-modal">
                                <div class="modal-content register-modal-container w-100 px-3 py-2 p-relative">
                                    <div class="d-flex">
                                        <img src="<?php echo base_url('assets/image/register-modal.png');?>" class="w-auto py-2">
                                    </div>
                                    <div class="row m-auto">
                                        <div class="col-sm">
                                            <p class="mb-1">วัตถุประสงค์</p>
                                            <ol class="modal-ol">
                                                <li>ส่งเสริมด้านการศึกษา และช่วยเหลือกิจกรรมเกี่ยวกับการศึกษา แก่นักเรียนที่ยากจนและนักเรียนดีทั่วไป</li>
                                                <li>ส่งเสริมการศึกษา ค้นคว้าวิจัยงานหนังสือพิมพ์</li>
                                                <li>ร่วมมือกับองค์กรการกุศลอื่นๆ เพื่อสาธารณประโยชน์</li>
                                                <li>ไม่ดำเนินการเกี่ยวข้องกับการเมือง ไม่ว่าประการใดๆ</li>
                                            </ol>
                                            <p class="mb-1">ผู้ประสานงานหลัก : <span class="modal-span">คุณกำพล วัชรพล</span></p>
                                            <p class="mb-1">E-mail : <span class="modal-span">Vichen@thairath.co.th </span></p>
                                            <p class="mb-1">Website : <span class="modal-span">http://www.thairath-found.or.th/</span></p>
                                            <p>เบอร์ติดต่อองค์กร : <span class="modal-span">02 127 1064</span></p>
                                            <p class="mb-1">รายชื่อคณะกรรมการ</p>
                                            <ol class="modal-ol pb-5 pb-0-sm">
                                                <li>คุณหญิงประณีตศิลป์ วัชรพล (ประธานกรรมการ)</li>
                                                <li>นางยิ่งลักษณ์ วัชรพล (รองประธานกรรมการและเหรัญญิก)</li>
                                                <li>นายวิเชน โพชนุกูล (กรรมการและเลขาธิการ)</li>
                                                <li>นายมานิจ สุขสมจิตร (กรรมการ)</li>
                                                <li>นายเลิศ อัศเวศน์ (กรรมการ)</li>
                                                <li>นายสมชาย กรุสวนสมบัติ (กรรมการ)</li>
                                                <li>นายไพโรจน์ โล่ห์สุนทร (กรรมการ)</li>
                                                <li>นายสราวุธ วัชรพล (กรรมการ)</li>
                                                <li>นายสมปอง พรทวีวัฒน์ (กรรมการ)</li>
                                                <li>นายธงชัย ณ นคร (กรรมการ)</li>
                                                <li>นายดำฤทธิ์ วิริยะกุล (กรรมการ)</li>
                                                <li>นายวัชร วัชรพล (กรรมการ)</li>
                                                <li>นางฐิติวรรณ ไสวแสนยากร (กรรมการ)</li>
                                                <li>นางสาวจิตสุภา วัชรพล (กรรมการ)</li>
                                                <li>นางสาวสิริพร โคตระวีระ (กรรมการ)</li>
                                            </ol>
                                        </div>
                                        <div class="col-sm">
                                            <p class="mb-1">ผลงานย้อนหลังในรอบ 10 ปี</p>
                                            <ol class="modal-ol">
                                                <li>ส่งเสริมด้านการศึกษา และช่วยเหลือกิจกรรมเกี่ยวกับการศึกษาแก่นักเรียนที่ยากจนและนักเรียนดีทั่วไป</li>
                                                <li>ส่งเสริมการศึกษา ค้นคว้าวิจัยงานหนังสือพิมพ</li>
                                                <li>ร่วมมือกับองค์กรการกุศลอื่นๆ เพื่อสาธารณประโยชน์</li>
                                                <li>ไม่ดำเนินการเกี่ยวข้องกับการเมือง ไม่ว่าประการใดๆ</li>
                                            </ol>
                                            <p class="mb-1">ผลงานย้อนหลังในรอบ 10 ปี</p>
                                            <ol class="modal-ol">
                                                <li>กำพล วัชรพล</li>
                                            </ol>
                                        </div>
                                    </div>
                                    <div class="modal-btn-container d-flex d-sm-none my-4">
                                        <!-- Js line 26 - 34 -->
                                        <button class="edit-btn text-white mx-2" data-dismiss="modal">แก้ไข</button>
                                        <button class="save-btn text-white mx-2" data-dismiss="modal" @click="onSave">บันทึก</button>
                                        <!-- End -->
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="member" class="member p-relative">
        <div class="row m-0 h-100">
            <div class="col-sm-5 d-flex member-header">
                <div class="text-right d-none d-sm-block">
                    <h1>ลงทะเบียนสมาชิกองค์การผู้บริโภค</h1>
                    <p class="text-white">ร่วมสานพลัง เพื่อพิทักษ์สิธิผู้บริโภค</p>
                </div>
                <div class="text-center d-block d-sm-none">
                    <h1>ลงทะเบียนสมาชิกองค์การผู้บริโภค</h1>
                    <p class="text-white">ร่วมสานพลัง เพื่อพิทักษ์สิธิผู้บริโภค</p>
                </div>
            </div>
            <div class="col-sm-7 pr-5 pr-0-sm pl-0">
                <div class="row m-auto d-flex h-100">
                    <div class="col-sm p-0">
                        <div class="nationwide text-center" id="all">
                            <h1 class="mb-0">70%</h1>
                            <p class="text-white">ทั่วประเทศ</p>
                            <!-- Js line 47 -->
                            <button class="more-btn px-3 py-1">ดูทั้งหมด <i class="fa fa-caret-right"></i></button>
                            <!-- End -->
                        </div>
                        <div class="nationwide w-75 text-left m-auto d-none" id="chart">
                            <p class="nationwide-label text-white mb-1">กรุงเทพฯและปริมณฑล <span class="float-right">70%</span></p>
                            <div class="w-100 chart-bg">
                                <div class="percentage bangkok"></div>
                            </div>
                            <p class="nationwide-label text-white mt-3 mb-1">ภาคกลาง <span class="float-right">70%</span></p>
                            <div class="w-100 chart-bg">
                                <div class="percentage central"></div>
                            </div>
                            <p class="nationwide-label text-white mt-3 mb-1">ภาคเหนือ <span class="float-right">70%</span></p>
                            <div class="w-100 chart-bg">
                                <div class="percentage north"></div>
                            </div>
                            <p class="nationwide-label text-white mt-3 mb-1">ภาคตะวันตก <span class="float-right">70%</span></p>
                            <div class="w-100 chart-bg">
                                <div class="percentage west"></div>
                            </div>
                            <p class="nationwide-label text-white mt-3 mb-1">ภาคตะวันออก <span class="float-right">70%</span></p>
                            <div class="w-100 chart-bg">
                                <div class="percentage east"></div>
                            </div>
                            <p class="nationwide-label text-white mt-3 mb-1">ภาคตะวันออกเฉียงเหนือ <span class="float-right">70%</span></p>
                            <div class="w-100 chart-bg">
                                <div class="percentage north-east"></div>
                            </div>
                            <p class="nationwide-label text-white mt-3 mb-1">ภาคใต้ <span class="float-right">70%</span></p>
                            <div class="w-100 chart-bg">
                                <div class="percentage southern"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="search" class="search text-center">
        <h1 class="mt-5 mb-0">ค้นหาสภาองค์กรผู้บริโภคทั่วประเทศ</h1>
        <div class="container container-lg py-5 py-4-sm">
            <div class="row m-auto">
                <div class="col-sm my-4-sm">
                    <select class="py-1 search-select text-white" name="sr_zone" v-model="zone" @change="getProvinces()">
                        <option value="0">เลือกภูมิภาค</option>
                        <option v-for="data in zones" :value="data.code">{{data.title_th}}</option>
                    </select>
                </div>
                <div class="col-sm my-4-sm">
                    <select class="py-1 search-select text-white" name="sr_provinces" v-model="province">
                        <option value="0">เลือกจังหวัด</option>
                        <option v-for="data in provinces" :value="data.code">{{data.name_in_thai}}</option>
                    </select>
                </div>
                <div class="col-sm my-4-sm">
                    <button @click="searchOrz()" class="search-btn py-1"><i class="fa fa-search" aria-hidden="true" ></i> ค้นหา</button>
                </div>
            </div>
        </div>
        <div class="row m-auto">
            <div class="col-xl-8 col-lg-7 p-0">
                <div id="googleMap-22" class="w-100 h-100">
                    <gmap-map ref="mymap" :center="startLocation" :zoom="14" style="width: 100%; height: 600px">

                        <gmap-info-window :options="infoOptions" :position="infoPosition" :opened="infoOpened" @closeclick="infoOpened=false">
                            {{infoContent}}
                        </gmap-info-window>

                        <gmap-marker v-for="(item, key) in coordinates" :key="key" :position="getPosition(item)" :clickable="true" @click="toggleInfo(item, key)" />

                    </gmap-map>

                </div>
            </div>
            <div class="col-xl-4 col-lg-5 p-0">
                <div class="location-lg d-none d-lg-block">
                    <!-- Js line 36 -->
                    <div class="location-container p-relative d-none">
                        <div class="row m-auto h-100">
                            <div class="col-4 p-0 h-100 bg-white">
                                <img src="<?php echo base_url('assets/image/location/img-1.png');?>" class="w-100 h-100">
                            </div>
                            <div class="col-8 pl-2 pr-0 text-left d-flex location-container-bg">
                                <div class="px-2">
                                    <p class="mb-2 w-50"><b>มูลนิธิสร้างรอยยิ้ม <br> Operation Smile Thailand</b></p>
                                    <p class="mb-0 mt-0">12/2 Soi Methinivete, Sukhumvit Soi 24, Klongton, แขวง คลองเตย เขต คลองเตย กรุงเทพมหานคร 10110</p>
                                    <button class="location-btn p-absolute text-white" data-toggle="modal" data-target="#search-modal">เส้นทาง <img src="<?php echo base_url('assets/image/turn-right.png');?>"></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="location-container " v-for="item , index in filterOrzList">
                        <div class="row m-auto h-100">
                            <div class="col-4 p-0 h-100 bg-white">
                                <img :src="item.logo" class="w-100 h-100" style="max-width: 80%;float: left">
                            </div>
                            <div class="col-8 pl-2 pr-0 text-left d-flex location-container-bg">
                                <div class="px-2">
                                    <p class="mb-2 w-50"><b>{{item.title}}</b></p>
                                    <p class="mb-0 mt-0">{{item.address}} {{item.district}} {{item.amphoe}} {{item.province}} {{item.stage_code}}</p>
                                    <button class="location-btn p-absolute text-white" data-toggle="modal" data-target="#search-modal">เส้นทาง <img src="<?php echo base_url('assets/image/turn-right.png');?>"></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- End -->
                </div>
                <div class="location-sm d-block d-lg-none">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide location-container p-relative">
                                <div class="row m-auto h-100">
                                    <div class="col-4 p-0 h-100 bg-white">
                                        <img src="<?php echo base_url('assets/image/location/img-1.png');?>" class="w-100 h-100">
                                    </div>
                                    <div class="col-8 pl-2 pr-0 text-left d-flex location-container-bg">
                                        <div class="px-2">
                                            <p class="mb-2 w-50"><b>มูลนิธิสร้างรอยยิ้ม <br> Operation Smile Thailand</b></p>
                                            <p class="mb-0 mt-0">12/2 Soi Methinivete, Sukhumvit Soi 24, Klongton, แขวง คลองเตย เขต คลองเตย กรุงเทพมหานคร 10110</p>
                                            <button class="location-btn p-absolute text-white" data-toggle="modal" data-target="#search-modal">เส้นทาง <img src="<?php echo base_url('assets/image/turn-right.png');?>"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide location-container">
                                <div class="row m-auto h-100">
                                    <div class="col-4 p-0 h-100 bg-white">
                                        <img src="<?php echo base_url('assets/image/location/img-2.png');?>" class="w-100 h-100">
                                    </div>
                                    <div class="col-8 pl-2 pr-0 text-left d-flex location-container-bg">
                                        <div class="px-2">
                                            <p class="mb-2 w-50"><b>มูลนิธิรามาธิบดี</b></p>
                                            <p class="mb-0 mt-0">270 อาคาร จอดรถมูลนิธิรามาธิบดี ถนน พระราม6 แขวง ทุ่งพญาไท เขต ราชเทวี กรุงเทพมหานคร 10400</p>
                                            <button class="location-btn p-absolute text-white" data-toggle="modal" data-target="#search-modal">เส้นทาง <img src="<?php echo base_url('assets/image/turn-right.png');?>"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide location-container">
                                <div class="row m-auto h-100">
                                    <div class="col-4 p-0 h-100 bg-white">
                                        <img src="<?php echo base_url('assets/image/location/img-3.png');?>" class="w-100 h-100">
                                    </div>
                                    <div class="col-8 pl-2 pr-0 text-left d-flex location-container-bg">
                                        <div class="px-2">
                                            <p class="mb-2 w-50"><b>มูลนิธิส่งเสริมอาชีพคนตาบอด</b></p>
                                            <p class="mb-0 mt-0">2218/86 ถนนจันทน์เก่า ช่องนนทรี ยานนาวา กรุงเทพฯ 10120</p>
                                            <button class="location-btn p-absolute text-white" data-toggle="modal" data-target="#search-modal">เส้นทาง <img src="<?php echo base_url('assets/image/turn-right.png');?>"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide location-container">
                                <div class="row m-auto h-100">
                                    <div class="col-4 p-0 h-100 bg-white">
                                        <img src="<?php echo base_url('assets/image/location/img-4.png');?>" class="w-100 h-100">
                                    </div>
                                    <div class="col-8 pl-2 pr-0 text-left d-flex location-container-bg">
                                        <div class="px-2">
                                            <p class="mb-2 w-50"><b>มูลนิธิการศึกษาเพื่อพัฒนาทักษะชีวิต</b></p>
                                            <p class="mb-0 mt-0">65 ถนน นราธิวาสราชนครินทร์ ซอย18 กท กรุงเทพมหานคร 10120</p>
                                            <button class="location-btn p-absolute text-white" data-toggle="modal" data-target="#search-modal">เส้นทาง <img src="<?php echo base_url('assets/image/turn-right.png');?>"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide location-container">
                                <div class="row m-auto h-100">
                                    <div class="col-4 p-0 h-100 bg-white">
                                        <img src="<?php echo base_url('assets/image/location/img-5.png');?>" class="w-100 h-100">
                                    </div>
                                    <div class="col-8 pl-2 pr-0 text-left d-flex location-container-bg">
                                        <div class="px-2">
                                            <p class="mb-2 w-50"><b>มูลนิธิทิสโก้ เพื่อการกุศล</b></p>
                                            <p class="mb-0 mt-0">อาคาร Tisco Tower ชั้น 5 ถนน สาทรเหนือ  แขวง สีลม เขต บางรัก กร</p>
                                            <button class="location-btn p-absolute text-white" data-toggle="modal" data-target="#search-modal">เส้นทาง <img src="<?php echo base_url('assets/image/turn-right.png');?>"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide location-container">
                                <div class="row m-auto h-100">
                                    <div class="col-4 p-0 h-100 bg-white">
                                        <img src="<?php echo base_url('assets/image/location/img-6.png');?>" class="w-100 h-100">
                                    </div>
                                    <div class="col-8 pl-2 pr-0 text-left d-flex location-container-bg">
                                        <div class="px-2">
                                            <p class="mb-2 w-50"><b>มูลนิธิกระจกเงา</b></p>
                                            <p class="mb-0 mt-0">191 ซอย วิภาวดีรังสิต 62 แยก 4-7 แขวง ตลาดบางเขน เขต หลักสี่ กรุงเทพมหานคร 10210</p>
                                            <button class="location-btn p-absolute text-white" data-toggle="modal" data-target="#search-modal">เส้นทาง <img src="<?php echo base_url('assets/image/turn-right.png');?>"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="search-modal">
        <div class="modal-dialog register-modal">
            <div class="modal-content register-modal-container w-100 px-3 py-2 p-relative">
                <div class="d-flex">
                    <img src="<?php echo base_url('assets/image/register-modal.png');?>" class="w-auto py-2">
                </div>
                <div class="row m-auto">
                    <div class="col-sm">
                        <p class="mb-1">วัตถุประสงค์</p>
                        <ol class="modal-ol">
                            <li>ส่งเสริมด้านการศึกษา และช่วยเหลือกิจกรรมเกี่ยวกับการศึกษา แก่นักเรียนที่ยากจนและนักเรียนดีทั่วไป</li>
                            <li>ส่งเสริมการศึกษา ค้นคว้าวิจัยงานหนังสือพิมพ์</li>
                            <li>ร่วมมือกับองค์กรการกุศลอื่นๆ เพื่อสาธารณประโยชน์</li>
                            <li>ไม่ดำเนินการเกี่ยวข้องกับการเมือง ไม่ว่าประการใดๆ</li>
                        </ol>
                        <p class="mb-1">ผู้ประสานงานหลัก : <span class="modal-span">คุณกำพล วัชรพล</span></p>
                        <p class="mb-1">E-mail : <span class="modal-span">Vichen@thairath.co.th </span></p>
                        <p class="mb-1">Website : <span class="modal-span">http://www.thairath-found.or.th/</span></p>
                        <p>เบอร์ติดต่อองค์กร : <span class="modal-span">02 127 1064</span></p>
                        <p class="mb-1">รายชื่อคณะกรรมการ</p>
                        <ol class="modal-ol pb-5 pb-0-sm">
                            <li>คุณหญิงประณีตศิลป์ วัชรพล (ประธานกรรมการ)</li>
                            <li>นางยิ่งลักษณ์ วัชรพล (รองประธานกรรมการและเหรัญญิก)</li>
                            <li>นายวิเชน โพชนุกูล (กรรมการและเลขาธิการ)</li>
                            <li>นายมานิจ สุขสมจิตร (กรรมการ)</li>
                            <li>นายเลิศ อัศเวศน์ (กรรมการ)</li>
                            <li>นายสมชาย กรุสวนสมบัติ (กรรมการ)</li>
                            <li>นายไพโรจน์ โล่ห์สุนทร (กรรมการ)</li>
                            <li>นายสราวุธ วัชรพล (กรรมการ)</li>
                            <li>นายสมปอง พรทวีวัฒน์ (กรรมการ)</li>
                            <li>นายธงชัย ณ นคร (กรรมการ)</li>
                            <li>นายดำฤทธิ์ วิริยะกุล (กรรมการ)</li>
                            <li>นายวัชร วัชรพล (กรรมการ)</li>
                            <li>นางฐิติวรรณ ไสวแสนยากร (กรรมการ)</li>
                            <li>นางสาวจิตสุภา วัชรพล (กรรมการ)</li>
                            <li>นางสาวสิริพร โคตระวีระ (กรรมการ)</li>
                        </ol>
                    </div>
                    <div class="col-sm">
                        <p class="mb-1">ผลงานย้อนหลังในรอบ 10 ปี</p>
                        <ol class="modal-ol">
                            <li>ส่งเสริมด้านการศึกษา และช่วยเหลือกิจกรรมเกี่ยวกับการศึกษาแก่นักเรียนที่ยากจนและนักเรียนดีทั่วไป</li>
                            <li>ส่งเสริมการศึกษา ค้นคว้าวิจัยงานหนังสือพิมพ</li>
                            <li>ร่วมมือกับองค์กรการกุศลอื่นๆ เพื่อสาธารณประโยชน์</li>
                            <li>ไม่ดำเนินการเกี่ยวข้องกับการเมือง ไม่ว่าประการใดๆ</li>
                        </ol>
                        <p class="mb-1">ผลงานย้อนหลังในรอบ 10 ปี</p>
                        <ol class="modal-ol">
                            <li>กำพล วัชรพล</li>
                        </ol>
                    </div>
                </div>
                <span class="close modal-close p-absolute pointer" data-dismiss="modal">&times;</span>
            </div>
        </div>
    </div>
    <div id="volunteer" class="volunteer p-relative">
        <div class="row m-0">
            <div class="col-xl-7 col-lg-6 d-none d-lg-block">
                <div class="col-xl-8 offset-xl-4 col-lg-11 offset-lg-1 justify-content-center pb-4">
                    <h1 class="mt-4 pt-4">อาสาสมัครเพื่อผู้บริโภค</h1>
                    <p class="pb-4">“หนึ่งพลังผู้บริโภครุ่นใหม่  สร้างแรงบันดาลใจ เปลี่ยนแปลงสังคม”  ทุกคนเป็นผู้บริโภคตั้งแต่เกิดจนตาย ชีวิตของเราย่อมต้องซื้อ ใช้ เลือกสินค้าบริการต่างๆ และหากเกิดความเสียหายก็ต้องการสิ่งชดเชยที่เป็นธรรม ทุกวันนี้มีคนถูกหลอก ถูกโกงจากการซื้อขายสินค้าหรือบริการต่างๆ อยู่ตลอดเวลา งานอาสาสมัครผู้บริโภค นอกจากจะทำให้เรารู้จักสิทธิผู้บริโภค เพื่อปกป้องตนเอง ยังสามารถช่วยเหลือ คุ้มครองสิทธิคนอื่นได้  ปัจจุบัน องค์กรผู้บริโภคยังต้องการอาสาสมัครมาช่วยงานคุ้มครองสิทธิอยู่ไม่น้อย ทั้งการช่วยรับเรื่องร้องเรียน เผยแพร่ข้อมูล หรือทำสื่อประชาสัมพันธ์ความรู้ รวมทั้งกิจกรรมรณรงค์ต่างๆ ที่เกี่ยวกับการคุ้มครองสิทธิของผู้บริโภค“เจอนมหมดอายุ  ต้องทำยังไง”  “ถูกเก็บค่าโทรศัพท์เกินจริง จะใช้สิทธิอย่างไร”  “ซื้อไอโฟน ได้ก้อนหิน ใครต้องรับผิดชอบ”   “เป็นหนี้บัตรเครดิต ต้องจัดการอย่างไร” “ค่ารักษาพยาบาลแพง ใครต้องดูแล”เรื่องเหล่านี้ ท่านสามารถเรียนรู้ได้ผ่านการทำงานอาสาสมัครเพื่อผู้บริโภค นอกจากใช้ปกป้องตนเองได้แล้ว ยังสามารถแนะนำช่วยเหลือผู้อื่นได้ด้วย มาร่วมกันคุ้มครองสิทธิผู้บริโภค  ยิ่งผู้บริโภครู้สิทธิมาก การถูกเอาเปรียบจะยิ่งลดลง หนึ่งพลังของท่านช่วยให้สังคมเปลี่ยนแปลงได้
                    </p>
                    <button class="join-btn py-1 px-5" data-toggle="modal" data-target="#join-modal">เข้าร่วม</button>
                </div>
            </div>
            <div class="col-xl-5 col-lg-6 p-0 p-relative">
                <img src="<?php echo base_url('assets/image/volunteer.png');?>" class="w-100 volunteer-img">
                <h1 class="volunteer-header-sm w-100 m-auto text-center d-lg-none p-absolute">อาสาสมัครเพื่อผู้บริโภค</h1>
            </div>
            <div class="d-block d-lg-none px-5 px-4-sm">
                <p class="pb-4 pt-5 pt-4-sm">“หนึ่งพลังผู้บริโภครุ่นใหม่  สร้างแรงบันดาลใจ เปลี่ยนแปลงสังคม”  ทุกคนเป็นผู้บริโภคตั้งแต่เกิดจนตาย ชีวิตของเราย่อมต้องซื้อ ใช้ เลือกสินค้าบริการต่างๆ และหากเกิดความเสียหายก็ต้องการสิ่งชดเชยที่เป็นธรรม ทุกวันนี้มีคนถูกหลอก ถูกโกงจากการซื้อขายสินค้าหรือบริการต่างๆ อยู่ตลอดเวลา งานอาสาสมัครผู้บริโภค นอกจากจะทำให้เรารู้จักสิทธิผู้บริโภค เพื่อปกป้องตนเอง ยังสามารถช่วยเหลือ คุ้มครองสิทธิคนอื่นได้  ปัจจุบัน องค์กรผู้บริโภคยังต้องการอาสาสมัครมาช่วยงานคุ้มครองสิทธิอยู่ไม่น้อย ทั้งการช่วยรับเรื่องร้องเรียน เผยแพร่ข้อมูล หรือทำสื่อประชาสัมพันธ์ความรู้ รวมทั้งกิจกรรมรณรงค์ต่างๆ ที่เกี่ยวกับการคุ้มครองสิทธิของผู้บริโภค“เจอนมหมดอายุ  ต้องทำยังไง”  “ถูกเก็บค่าโทรศัพท์เกินจริง จะใช้สิทธิอย่างไร”  “ซื้อไอโฟน ได้ก้อนหิน ใครต้องรับผิดชอบ”   “เป็นหนี้บัตรเครดิต ต้องจัดการอย่างไร” “ค่ารักษาพยาบาลแพง ใครต้องดูแล”เรื่องเหล่านี้ ท่านสามารถเรียนรู้ได้ผ่านการทำงานอาสาสมัครเพื่อผู้บริโภค นอกจากใช้ปกป้องตนเองได้แล้ว ยังสามารถแนะนำช่วยเหลือผู้อื่นได้ด้วย มาร่วมกันคุ้มครองสิทธิผู้บริโภค  ยิ่งผู้บริโภครู้สิทธิมาก การถูกเอาเปรียบจะยิ่งลดลง หนึ่งพลังของท่านช่วยให้สังคมเปลี่ยนแปลงได้
                </p>
                <div class="d-flex pb-5">
                    <button class="join-btn px-5 py-2-sm" data-toggle="modal" data-target="#join-modal">เข้าร่วม</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="join-modal">
        <div class="modal-dialog join-modal pt-4">
            <div class="modal-content register-modal-container w-100 px-5 px-0-sm py-4 p-relative mt-5" id="join-form">
                <span class="join-tap text-white p-absolute">ลงทะเบียนอาสาสมัคร</span>
                <div class="px-5 px-4-sm">
                    <label>เลือกหน่วยงาน/องค์กร ที่ต้องการสมัคร</label>
                    <div class="row m-auto">
                        <div class="col pl-0 pr-1">
                            <select class="form-input w-100" name="valunteer_province" v-model="province" @change="getOrganizations()">
                                <option value="0">จังหวัด*</option>
                                <option v-for="data in provinces" :value="data.code">{{data.name_in_thai}}</option>

                            </select>
                        </div>
                        <div class="col pr-0 pl-1">
                            <select class="form-input w-100" name="foundation-list" v-model="organization" >
                                <option value="0" ref="no_orz">รายการมูลนิธิฯ*</option>
                                <option v-for="data in organizations" :value="data.aid">{{data.title}}</option>
                            </select>
                        </div>
                        <div class="col-12 p-0">
                            <hr class="join-hr">
                        </div>
                        <div class="col-12 p-0">
                            <div class="row m-auto">
                                <div class="col p-0">
                                    <label class="label-container">นาย
                                        <input type="radio" name="prefix" value="1" checked="checked">
                                        <span class="checkmark-o"></span>
                                    </label>
                                </div>
                                <div class="col p-0">
                                    <label class="label-container">นาง
                                        <input type="radio" name="prefix" value="2">
                                        <span class="checkmark-o"></span>
                                    </label>
                                </div>
                                <div class="col p-0">
                                    <label class="label-container">นางสาว
                                        <input type="radio" name="prefix" value="3">
                                        <span class="checkmark-o"></span>
                                    </label>
                                </div>
                                <div class="col-auto p-0">
                                    <label class="label-container">ไม่ประสงค์ระบุเพศ
                                        <input type="radio" name="prefix" value="4">
                                        <span class="checkmark-o"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-5 pl-0 pr-1">
                            <input type="text" name="valunteer_name" id="valunteer_name" placeholder="ชื่อ*" class="w-100 mb-2 form-input" v-model="valunteer_info.name">
                        </div>
                        <div class="col-7 pl-1 pr-0">
                            <input type="text" name="valunteer_lastname" id="valunteer_lastname" placeholder="นามสกุล*" class="w-100 mb-2 form-input" v-model="valunteer_info.lastname">
                        </div>
                        <div class="col-10 pl-0 pr-1">
                            <input type="text" name="tel" placeholder="เบอร์ติดต่อ*" id="valunteer_tel" class="w-100 mb-2 form-input">
                        </div>
                        <div class="col-10 pl-0 pr-1">
                            <input type="text" name="email" placeholder="Email*" id="valunteer_email" class="w-100 mb-2 form-input">
                        </div>

                        <div class="col-12 p-0">
                            <input type="text" name="valunteer_address" placeholder="ที่อยู่*" id="valunteer_address" class="w-100 mb-2 form-input" v-model="valunteer_info.address">
                        </div>
                        <div class="col-5 pl-0 pr-1 pb-2">
                            <input type="text" name="district" id="valunteer_district" v-model="valunteer_info.district" class="w-100 mb-2 form-control form-input" placeholder="ตำบล/แขวง">
<!--                            <select class="form-input w-100" name="district" v-model="valunteer_info.district">-->
<!--                                <option value="">อำเภอ*</option>-->
<!--                            </select>-->
                        </div>
                        <div class="col-5 pl-1 pr-0 pb-2">
                            <input type="text" name="amphoe" id="valunteer_amphoe" placeholder="อำเภอ" class="w-100 mb-2 form-input" v-model="valunteer_info.amphoe" readonly>
<!--                            <input type="text" name="amphoe" v-model="valunteer_info.amphoe" class="w-100 mb-2 form-control form-input" placeholder="อำเภอ" readonly>-->
<!--                            <select class="form-input w-100" name="province" v-model="valunteer_info.amphoe">-->
<!--                                <option value="">จังหวัด*</option>-->
<!--                            </select>-->
                        </div>
                        <div class="col-5 pl-0 pr-1">
                            <input type="text" name="province" id="valunteer_province" placeholder="จังหวัด" class="w-100 mb-2 form-input" v-model="valunteer_info.province" readonly>
                        </div>
                        <div class="col-5 pl-0 pr-1">
                            <input type="text" name="zipcode" id="valunteer_zipcode" placeholder="รหัสไปรษณีย์*" class="w-100 mb-2 form-input" v-model="valunteer_info.zipcode" readonly>
                        </div>

                    </div>
                    <div class="mt-4 row m-auto">
                        <div class="col p-0 mt-2 d-flex">
                            <!-- Js line 42 -->
                            <button class="my-4 join-btn join-btn-modal text-white px-4 py-2" id="join-register" @click="valunteerRegister">ลงทะเบียน</button>
                            <!-- End -->
                        </div>
                        <div class="col p-0 mt-2 d-flex">
                            <button class="my-4 join-btn join-btn-modal text-white px-4 py-2" data-dismiss="modal">ยกเลิก</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-content join-modal-container p-relative mt-5 d-none" id="join-done">
                <div class="d-flex h-100">
                    <img src="<?php echo base_url('assets/image/done.png');?>">
                </div>
                <span class="close modal-close p-absolute pointer" data-dismiss="modal">&times;</span>
            </div>
        </div>
    </div>
    <footer class="pb-5 pb-4-sm">
        <div class="container container-lg pt-5 pt-4-sm">
            <div class="row m-auto pt-5 pt-4-sm pb-4">
                <div class="col p-0">
                    <p class="footer-header mb-4 mb-2-sm">OUR ABOUT</p>
                    <p class="footer-link mb-2">เราคือใคร</p>
                    <p class="footer-link mb-2">เราทำอะไร</p>
                </div>
                <div class="col p-0">
                    <p class="footer-header mb-4 mb-2-sm">OUR SERVICER</p>
                    <p class="footer-link mb-2">Register</p>
                    <p class="footer-link mb-2">Ower Login</p>
                    <p class="footer-link mb-2">Find Location</p>
                </div>
                <div class="col-auto col-sm p-0">
                    <p class="footer-header mb-4 mb-2-sm">ADDRESS</p>
                    <p class="footer-link mb-2">อาคารศูนย์เรียนรู้สุขภาวะ เลขที่ 99/8 ซอยงามดูพลี แขวงทุ่งมหาเมฆ เขตสาทร กรุงเทพฯ 10120</p>
                    <p class="footer-link mb-2">โทรศัพท์ 02-343-1500 / โทรสาร 02-343-1551</p>
                </div>
            </div>
            <p class="footer-header">CONTACT US</p>
            <div class="row mx-0">
                <div class="col-6 col-sm-12 p-0 mb-3">
                    <div class="row mx-0">
                        <div class="d-flex col col-sm-auto p-0 mb-3-sm">
                            <img src="<?php echo base_url('assets/image/footer/facebook.png');?>">
                        </div>
                        <div class="d-flex col col-sm p-0 mb-3-sm">
                            <img src="<?php echo base_url('assets/image/footer/ocbp.png');?>" class="px-2">
                        </div>
                        <div class="d-flex col col-sm p-0 mb-3-sm">
                            <img src="<?php echo base_url('assets/image/footer/accot.png');?>" class="px-2">
                        </div>
                        <div class="d-flex col col-sm p-0 mb-3-sm">
                            <img src="<?php echo base_url('assets/image/footer/safethaibus.png')?>" class="px-2">
                        </div>
                        <div class="d-flex col col-sm p-0 mb-3-sm">
                           <img src="<?php echo base_url('assets/image/footer/inside.png')?>" class="px-2">
                       </div>
                       <div class="d-flex col col-sm p-0 mb-3-sm">
                           <img src="<?php echo base_url('assets/image/footer/seacc.png')?>">
                       </div>
                   </div>
                </div>
                <div class="col-6 col-sm-12 p-0">
                    <div class="row mx-0">
                        <div class="d-flex col col-sm-auto p-0 mb-3-sm">
                            <img src="<?php echo base_url('assets/image/footer/thaihealth.png')?>">
                        </div>
                        <div class="d-flex col p-0 mb-3-sm">
                            <img src="<?php echo base_url('assets/image/footer/chaladsue.png')?>" class="px-2">
                        </div>
                        <div class="d-flex col p-0 mb-3-sm">
                            <img src="<?php echo base_url('assets/image/footer/consumer.png')?>" class="px-2">
                        </div>
                        <div class="d-flex col p-0 mb-3-sm">
                            <img src="<?php echo base_url('assets/image/footer/ex-letter.png')?>" class="px-2">
                        </div>
                        <div class="d-flex col p-0 mb-3-sm">
                            <img src="<?php echo base_url('assets/image/footer/kidney_friend_club.png')?>" class="px-2">
                        </div>
                        <div class="d-flex col p-0">
                            <img src="<?php echo base_url('assets/image/footer/supermarket.png')?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="mx-5 mx-4-sm mt-5 mt-4-sm">
        <div class="container container-lg pt-4 pb-5">
            <div class="row m-0">
                <div class="col-12 col-sm-auto d-flex">
                    <img src="assets/image/logo.png" class="copyright-img">
                </div>
                <div class="col-12 col-sm-auto d-flex">
                    <span class="copyright-text px-3">Copyright ©Consumers International 2019 Website Privacy Policy</span>
                </div>
            </div>
        </div>
    </footer>
    <script>
        function myMap() {
            var mapProp= {
                center:new google.maps.LatLng(13.763681,100.539663),
                zoom:5,
            };
            var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
        }

        function myMap_2() {
            var mapProp= {
                center:new google.maps.LatLng(13.763681,100.539663),
                zoom:5,
            };
            var map = new google.maps.Map(document.getElementById("googleMap-2"),mapProp);
        }
    </script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            /*autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },*/
            loop: true
        });
    </script>

<script src="<?php echo base_url('assets/js/vue.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/axios.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/vue-google-maps.js'); ?>"></script>

<script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/popper.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/organization.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/vue-organization.js'); ?>"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.20/js/uikit.min.js"></script>
    <!-- dependencies for zip mode -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.Thailand.js/dependencies/zip.js/zip.js')?>"></script>
    <!-- / dependencies for zip mode -->

    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.Thailand.js/dependencies/JQL.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.Thailand.js/dependencies/typeahead.bundle.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.Thailand.js/dist/jquery.Thailand.min.js')?>"></script>
<!--    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBO0MLSEr7KK02AdUEbGjTH1c_HwTvNHo8&callback=myMap_2&libraries=places"></script>-->
<!--    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBO0MLSEr7KK02AdUEbGjTH1c_HwTvNHo8&libraries=places"></script>-->

</body>
</html>
