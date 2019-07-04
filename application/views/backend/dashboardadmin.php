<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
        <div>
            <b-alert show variant="primary">Primary Alert <?php echo getUserRoleId()?></b-alert>
        </div>
    </section>
    <!-- Main content -->
    <section class="content" id="lastdonate">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3 v-if="filterOrzTotal !==0">{{filterOrzTotal}}</h3>
                        <h3 v-else>{{filterOrzTotal}}</h3>

                        <p>All Organization</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-stalker"></i>
                    </div>
                    <!--                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3 v-if="filterOrzVerified !==0">{{filterOrzVerified}}</h3>
                        <h3 v-else>{{filterOrzVerified}}</h3>

                        <p>Organization verified</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-people"></i>
                    </div>
                    <!--                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3 v-if="filerOrzWaite !==0">{{filerOrzWaite}}</h3>
                        <h3 v-else>{{filerOrzWaite}}</h3>

                        <p>Organization Pending</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <!--                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3 v-if="filterOrzCancel !==0">{{filterOrzCancel}}</h3>
                        <h3 v-else>{{filterOrzCancel}}</h3>

                        <p>Organization Cancel</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-people-outline"></i>
                    </div>
                    <!--                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
                </div>
            </div>
        </div>

        <!-- Main row -->
        <div class="row">
            <section class="col-lg-7 connectedSortable">
                <div class="box box-info">
                    <div class="box-header"><h3 class="box-title">Organization List</h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อองค์กร</th>
                                <th>จังหวัด</th>
                                <th>วันที่ลงทะเบียน</th>
                                <th>สถานะ</th>
                                <th>Action</th>
<!--                                <th>Reason</th>-->
                            </tr>
                            <tr v-for="item,index in filterOrganizationList" style=" cursor: pointer;">
                                <td @click="orzUserClick(item)" data-toggle="modal" data-target="#orz-select-modal">{{index+1}}</td>
                                <td @click="orzUserClick(item)" data-toggle="modal" data-target="#orz-select-modal">{{item.title}}</td>
                                <td @click="orzUserClick(item)" data-toggle="modal" data-target="#orz-select-modal">{{item.province}}</td>
                                <td @click="orzUserClick(item)" data-toggle="modal" data-target="#orz-select-modal">{{item.created_date | ThaiDate}}</td>
                                <td @click="orzUserClick(item)" data-toggle="modal" data-target="#orz-select-modal"><span>{{item.status | orzStatus}}</span></td>
                                <td><button @click="approvedOrz(item)" class="btn-sm btn-success">อนุมัติ</button> <button @click="cancledOrz(item)" class="btn-sm btn-danger">ไม่อนุมัติ</button></td>
<!--                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>-->
                            </tr>
                        </table>
                    </div>
                </div>
            </section>
            <section class="col-lg-5 connectedSortable"></section>
        </div>
        <!-- End Main row -->
        <div class="modal" id="orz-select-modal">
            <div class="modal-dialog register-modal">
                <div class="modal-content register-modal-container w-100 px-3 py-2 p-relative">
                    <div class="d-flex flex-row bd-highlight mb-3">
                        <div class="p-2 bd-highlight "><img  :src="filOrzLogo" style="max-height: 134px"></div>
                        <div class="p-2 bd-highlight">{{orz_user_select.title}}</h3><p style="font-size: small">{{orz_user_select.address}} ตำบล/แขวง {{orz_user_select.district}} อำเภอ {{orz_user_select.amphoe}} จังหวัด {{orz_user_select.province}} {{orz_user_select.stage_code}}</p></div>
                        <!--
                        <div class="" style="width: 534px;height: 125px; background-color: #0b3e6f">
                            <div class="left"></div><div class="right text-white"><h3></div>
                        </div>
                        -->
                    </div>
                    <div class="row m-auto">
                        <div class="col-sm">
                            <p class="mb-1">วัตถุประสงค์</p>
                            <ol class="modal-ol" v-html="orz_user_select.objective">

                            </ol>
                            <p class="mb-1">ผู้ประสานงานหลัก : <span class="modal-span">{{orz_user_select.contact_name}} {{orz_user_select.contact_lastname}}</span></p>
                            <p class="mb-1">E-mail : <span class="modal-span">{{orz_user_select.email}}</span></p>
                            <p class="mb-1">Website : <span class="modal-span">{{orz_user_select.website}}/</span></p>
                            <p>เบอร์ติดต่อองค์กร : <span class="modal-span">{{orz_user_select.orz_tel}}</span></p>
                            <p class="mb-1">รายชื่อคณะกรรมการ</p>
                            <ol class="modal-ol pb-5" v-html="orz_user_select.board_of_directors">
                            </ol>
                        </div>
                        <div class="col-sm">
                            <p class="mb-1">ผลงานย้อนหลังในรอบ 10 ปี</p>
                            <ol class="modal-ol" v-html="orz_user_select.portfolio">

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

    </section>



</div>
<script src="../node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
<script src="../node_modules/@ckeditor/ckeditor5-vue/dist/ckeditor.js"></script>
<script src="<?php echo base_url('assets/js/backend/main.js')?>"></script>
