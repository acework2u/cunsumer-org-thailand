<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo $this->lang->line('dashboard');?>
                <small>(Management)</small>
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
            <div class="row hidden">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3 v-if="filDonateTotal !==0">{{filDonateTotal | formatBaht}}</h3>
                            <h3 v-else>{{filDonateTotal}}</h3>

                            <p>New Donates</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
<!--                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3 v-if="totalSuccess !==0">{{totalSuccess | formatBaht}}</h3>
                            <h3 v-else>{{totalSuccess}}</h3>

                            <p>Success</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
<!--                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3 v-if="totalPending !==0">{{totalPending | formatBaht}}</h3>
                            <h3 v-else>{{totalPending}}</h3>

                            <p>Pending</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
<!--                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3 v-if="totalCancle !==0">{{totalCancle | formatBaht}}</h3>
                            <h3 v-else>{{totalCancle}}</h3>

                            <p>Cancel</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
<!--                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="hidden nav-tabs-custom">
                        <!-- Tabs within a box -->
                        <ul class="nav nav-tabs pull-right">
                            <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                            <li class="hidden"><a href="#sales-chart" data-toggle="tab">Donut</a></li>
                            <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
                        </ul>
                        <div class="tab-content no-padding">
                            <!-- Morris chart - Sales -->
                            <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
                            <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                        </div>
                    </div>
                    <!-- /.nav-tabs-custom -->


                    <!-- TABLE: LATEST ORDERS -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Organization Information</h3>


                            <div class="box-tools pull-right">
                                <span class="text-yellow"> Status :{{orzInformation.status_title}} </span>
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                            </div>
                            <form class="hidden">
                                <div class="form-group">
                                    <label for="organizedTitle1">Organization Name</label>
                                    <input type="text" class="form-control" id="organizedTitle1" aria-describedby="organizedHelp" placeholder="ชื่อมูลนิธิ">
                                    <small id="organizedHelp" class="form-text text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                            <form class="form-horizontal"  autocomplete="off">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="orzLogo" class="col-sm-2 control-label">โลโก้</label>
                                        <div class="col-sm-5"><img v-if="orzInformation.logo && orzInformation.logo.length > 0" style="max-width: 250px;max-height: 110px;" :src="orzLogo" ></div>
                                        <div class="col-sm-5">
                                            <input type="file" id="file" ref="file" accept="image/*"
                                                   v-on:change="handleFileUpload()"/>
                                            <img v-bind:src="imagePreview" v-show="showPreview"/>
                                            <br>
                                            <progress max="100" :value.prop="uploadPercentage"></progress>
                                            <br>
                                            <button class="btn btn-success" v-on:click="submitFile()">Upload</button>


<!--                                            <input type="file" class="form-control" id="orzLogo" placeholder="">-->
                                            <input type="hidden" name="orz_aid" :value="orzInformation.aid" >
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="orzTitle1" class="col-sm-2 control-label">ชื่อมูลนิธิ</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="orzTitle1" placeholder="" v-model="orzInformation.title">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="orzmileStone" class="col-sm-2 control-label">วัตถุประสงค์</label>
                                        <div class="col-sm-10">
<!--                                            <textarea :value.prop="orzInformation.objective" class="form-control" rows="3" placeholder="Enter ..."></textarea>-->
                                            <ckeditor :editor="editor" v-model="orzInformation.objective" :config="editorConfig"></ckeditor>


                                        </div>
                                    </div>
                                    <!-- select -->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">กลุ่มมูลนิธิ</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" @change="onChange($event)" v-model="orzInformation.orz_group_id">
                                                <option v-for="item in orz_group" :value="item.aid">{{item.title_th}}</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="mainContact1" class="col-sm-2 control-label">ผู้ประสานงานหลัก</label>
                                        <div class="col-sm-5">
                                            <input v-model="orzInformation.contact_name" type="text" class="form-control" id="mainContact1" placeholder="Name">
                                        </div>
                                        <div class="col-sm-5">
                                            <input v-model="orzInformation.contact_lastname" type="text" class="form-control" id="mainLastContact1" placeholder="Lastname">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="emailContact1" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                            <input v-model="orzInformation.email" type="email" class="form-control" id="emailContact1" placeholder="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="websiteContact1" class="col-sm-2 control-label">Website</label>
                                        <div class="col-sm-10">
                                            <input v-model="orzInformation.website" type="text" class="form-control" id="websiteContact1" placeholder="http://www.youwebsite.com">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="telContact1" class="col-sm-2 control-label">เบอร์ติดต่อองค์กร</label>
                                        <div class="col-sm-10">
                                            <input v-model="orzInformation.orz_tel" type="text" class="form-control" id="telContact1" placeholder="02 123 456">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="telContact1" class="col-sm-2 control-label">รายชื่อคณะกรรมการ</label>
                                        <div class="col-sm-10">
<!--                                            <textarea :value ="orzInformation.board_of_directors" class="form-control" rows="3" placeholder="Enter ..."></textarea>-->
                                            <ckeditor :editor="editor" v-model="orzInformation.board_of_directors" :config="editorConfig"></ckeditor>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="orzmileStone" class="col-sm-2 control-label">ผลงานย้อนหลังในรอบ 10 ปี</label>
                                        <div class="col-sm-10">
<!--                                            <textarea :value.prop ="orzInformation.portfolio" class="form-control" rows="3" placeholder="Enter ..."></textarea>-->
                                            <ckeditor :editor="editor" v-model="orzInformation.portfolio" :config="editorConfig"></ckeditor>

                                        </div>
                                    </div>


                                    <div class="form-group hidden">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Remember me
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <div class=" pull-left col-sm-offset-6">
                                        <span v-if="savingStatus" style="color: green; font-size: large">{{textSuccess}}</span>
                                    </div>
                                    <button type="submit" class="btn btn-default hidden">Cancel</button>
                                    <button @click="saveOrzInfo" type="button" class="btn btn-info pull-right">Save</button>
                                </div>
                                <!-- /.box-footer -->
                            </form>





                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <a href="javascript:void(0)" class="hidden btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
                            <a href="<?php echo site_url('admin/reports')?>" class="btn btn-sm btn-default btn-flat pull-right hidden">View All Orders</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->

                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">
                    <!-- DONOR LIST -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">อาสาสมัคร</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <ul v-if="volunteers.length >0" class="products-list product-list-in-box">
                                <li  v-for="items,index in filterVolunteers" class="item">
                                    <div class="">
                                        <a href="#" @click="volunteerClickInfo(items)" data-toggle="modal" data-target="#myDonor" class="product-title">{{items.name}} {{items.lastname}}
                                            <span class="label label-success pull-right"></span></a>

                                    </div>
                                </li>

                            </ul>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
<!--                            <a href="javascript:void(0)" class="uppercase">View All Products</a>-->
                        </div>
                        <!-- /.box-footer -->
                    </div>

                    <!-- /.box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Address & Location</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form class="form-horizontal"  autocomplete="off" >
                            <div class="form-group">
                                <label for="orzmileStone" class="col-sm-2 control-label">ที่อยู่</label>
                                <div class="col-sm-10">
                                    <textarea v-model="orzInformation.address" :value.prop="orzInformation.address" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                </div>
                            </div>

                            <div id="demo1" >
                                <div class="form-group">
                                    <label for="districtLabel" class="col-sm-2 control-label">ตำบล / แขวง</label>
                                    <div class="col-sm-4"><input ref="district" :value="orzInformation.district" name="district" class="uk-input form-control" type="text"> </div>
                                    <label for="amphoe" class="col-sm-2 control-label">อำเภอ</label>
                                    <div class="col-sm-4"><input ref="amphoe" :value="orzInformation.amphoe" name="amphoe" class="uk-input form-control" type="text" id="amphoe"> </div>

                                </div>
                                <div class="form-group">
                                    <label for="province" class="col-sm-2 control-label">จังหวัด</label>
                                    <div class="col-sm-4"><input ref="province" :value="orzInformation.province" name="province" class="uk-input form-control" type="text"> </div>
                                    <label for="zipcode" class="col-sm-2 control-label">รหัสไปรษณีย์</label>
                                    <div class="col-sm-4">
                                        <input class="form-control hidden" value="">
                                        <input ref="zipcode"  name="zipcode" class="uk-input form-control" type="text" :value="orzInformation.stage_code">

                                    </div>
                                </div>
                            </div>
                            </form>
                            <div class="form-group">
                                <h4>Google Place location</h4>
                                <label for="province" class="col-sm-2 control-label">Latitude</label>
                                <div class="col-sm-4"><input name="latitude" class="form-control" v-model="orzInformation.latitude"></div>
                                <label for="province" class="col-sm-2 control-label">Longitude</label>
                                <div class="col-sm-4"><input name="latitude" class="form-control" v-model="orzInformation.longitude"></div>

                                <gmap-autocomplete :value="description" placeholder="This is a placeholder text" class="form-control"
                                                   @place_changed="setPlace" :select-first-on-enter="true" >
                                </gmap-autocomplete>
                                <button class="btn btn-success" @click="addMarker2">Add New Marker</button>
                                <button class="btn btn-info" @click="clearMarker">Clear Marker</button>
                            </div>
                            <div>
                                <gmap-map
                                        :center="center"
                                        :zoom="zoom"
                                        style="width:100%;  height: 600px;"
                                >
                                    <gmap-marker
                                            :key="index"
                                            v-for="(m, index) in fillMarkers"
                                            :position="m.position"
                                            @click="center=m.position" :draggable="true" @dragend="showLocation"
                                    ></gmap-marker>
                                    <!--
                                    <gmap-marker ref="myLocation" v-for="(item, key) in fillCoordinates" :key="key" :position="getPosition(item)" :clickable="true" :draggable="true" @dragend="showLocation" @click="toggleInfo(item, key)" />
                                    -->

                                </gmap-map>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <!--                            <a href="javascript:void(0)" class="uppercase">View All Products</a>-->
                        </div>
                        <!-- /.box-footer -->
                    </div>






            </div>


                    <!-- /.box -->
            <div id="myDonor" class="modal fade" role="dialog">
                <div class="modal-dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">ข้อมูลอาสาสมัคร</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal">
                                   <div class="box-header">
                                       <div class="box-tools pull-right"><span>สถานะ : </span><span>{{volunteer.volunteer_jpoin_status}}</span></div>
                                   </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="donorName" class="col-sm-3 control-label">ชื่อ - นามสกุล</label>
                                            <div class="col-sm-9">
                                                <span class="form-control"> {{volunteer.name}} {{volunteer.lastname}} </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="donor_email" class="col-sm-3 control-label">Email</label>
                                            <div class="col-sm-9">
                                                <span class="form-control"> {{volunteer.email}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="donor_email" class="col-sm-3 control-label">เบอร์โทร</label>
                                            <div class="col-sm-9">
                                                <span class="form-control"> {{volunteer.tel}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="donor_email" class="col-sm-3 control-label">ที่อยู่</label>
                                            <div class="col-sm-9">
                                                <span class="form-control"> {{volunteer.address}},{{volunteer.district}} {{volunteer.amphoe}} {{volunteer.province}} {{volunteer.zipcode}}.</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="donor_email" class="col-sm-3 control-label">สถานะ</label>
                                            <div class="col-sm-9">
                                                <select class="form-control">
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>


                                    </div>

                                </form>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                            </div>

                        </div>
                    </div>

                </div>


                <!-- /.box -->
            </div>


                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->

            <div class="hidden row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Monthly Recap Report</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-wrench"></i></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="text-center">
                                        <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                                    </p>

                                    <div class="chart">
                                        <!-- Sales Chart Canvas -->
                                        <canvas id="salesChart" style="height: 180px;"></canvas>
                                    </div>
                                    <!-- /.chart-responsive -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-4">
                                    <p class="text-center">
                                        <strong>Goal Completion</strong>
                                    </p>

                                    <div class="progress-group">
                                        <span class="progress-text">Add Products to Cart</span>
                                        <span class="progress-number"><b>160</b>/200</span>

                                        <div class="progress sm">
                                            <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->
                                    <div class="progress-group">
                                        <span class="progress-text">Complete Purchase</span>
                                        <span class="progress-number"><b>310</b>/400</span>

                                        <div class="progress sm">
                                            <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->
                                    <div class="progress-group">
                                        <span class="progress-text">Visit Premium Page</span>
                                        <span class="progress-number"><b>480</b>/800</span>

                                        <div class="progress sm">
                                            <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->
                                    <div class="progress-group">
                                        <span class="progress-text">Send Inquiries</span>
                                        <span class="progress-number"><b>250</b>/500</span>

                                        <div class="progress sm">
                                            <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- ./box-body -->
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-3 col-xs-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                                        <h5 class="description-header">$35,210.43</h5>
                                        <span class="description-text">TOTAL REVENUE</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-3 col-xs-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                                        <h5 class="description-header">$10,390.90</h5>
                                        <span class="description-text">TOTAL COST</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-3 col-xs-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                                        <h5 class="description-header">$24,813.53</h5>
                                        <span class="description-text">TOTAL PROFIT</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-3 col-xs-6">
                                    <div class="description-block">
                                        <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                                        <h5 class="description-header">1200</h5>
                                        <span class="description-text">GOAL COMPLETIONS</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>



        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<script src="../node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
<script src="../node_modules/@ckeditor/ckeditor5-vue/dist/ckeditor.js"></script>
<script src="<?php echo base_url('assets/js/vue-google-maps.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/backend/main.js')?>"></script>








