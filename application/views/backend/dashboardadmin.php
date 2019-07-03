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
                        <h3 v-if="totalCancle !==0">{{totalCancle | formatBaht}}</h3>
                        <h3 v-else>{{totalCancle}}</h3>

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
<!--                                <th>Reason</th>-->
                            </tr>
                            <tr v-for="item,index in filterOrganizationList">
                                <td>{{item.aid}}</td>
                                <td>{{item.title}}</td>
                                <td>{{item.province}}</td>
                                <td>{{item.created_date | ThaiDate}}</td>
                                <td><span>{{item.status | orzStatus}}</span></td>
<!--                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>-->
                            </tr>
                        </table>
                    </div>
                </div>
            </section>
            <section class="col-lg-5 connectedSortable"></section>
        </div>
        <!-- End Main row -->


    </section>



</div>
<script src="../node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
<script src="../node_modules/@ckeditor/ckeditor5-vue/dist/ckeditor.js"></script>
<script src="<?php echo base_url('assets/js/backend/main.js')?>"></script>
