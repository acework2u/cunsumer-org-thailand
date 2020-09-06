<style>
    .VueTables__limit {
        display: none;
    }

    .VuePagination {
        text-align: center;
    }

    .vue-title {
        text-align: center;
        margin-bottom: 10px;
    }

    .vue-pagination-ad {
        text-align: center;
    }

    .glyphicon.glyphicon-eye-open {
        width: 16px;
        display: block;
        margin: 0 auto;
    }

    th:nth-child(3) {
        text-align: center;
    }

    .VueTables__child-row-toggler {
        width: 16px;
        height: 16px;
        line-height: 16px;
        display: block;
        margin: auto;
        text-align: center;
    }

    .VueTables__child-row-toggler--closed::before {
        content: "+";
    }

    .VueTables__child-row-toggler--open::before {
        content: "-";
    }
</style>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="appreport">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $this->lang->line('volunteer');?>
            <small>Dashboard</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">{{title}}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="hidden row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Monthly Recap Report</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
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
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i></button>
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
                                    <span class="description-percentage text-green"><i
                                            class="fa fa-caret-up"></i> 17%</span>
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
                                    <span class="description-percentage text-green"><i
                                            class="fa fa-caret-up"></i> 20%</span>
                                    <h5 class="description-header">$24,813.53</h5>
                                    <span class="description-text">TOTAL PROFIT</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 col-xs-6">
                                <div class="description-block">
                                    <span class="description-percentage text-red"><i
                                            class="fa fa-caret-down"></i> 18%</span>
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

        <div class="row">
            <div class="form-group col-xs-12 col-sm-6 col-md-8">
                <div class="hidden col-xs-3">
                    <span>Start Date</span>
                    <vue-datepicker-local v-model="startTime" format="DD-MM-YYYY" :local="local"></vue-datepicker-local>
                </div>
                <div class="hidden col-xs-3">
                    <span>End Date</span>
                    <vue-datepicker-local v-model="endTime" format="DD-MM-YYYY" :local="local"></vue-datepicker-local>

                </div>
                <div class="col-xs-12 col-sm-6 col-md-8">
                    <vue-datepicker-local v-model="range" range-separator=" to " :local="local" show-buttons
                                          format="DD-MM-YYYY"></vue-datepicker-local>
                    <button class="btn btn-group-sm btn-info" @click="getDonationlist">Confirm</button>
                </div>

            </div>
            <div class="col-xs-6 col-md-4 text-right mx-auto">

                <!--                <button class="btn btn-success">Export xls</button>-->
                <!--                <a class="btn btn-success" href="--><?php //echo base_url('admin/reports/exportxls'); ?><!--">Export .xls</a>-->
                <a class="btn btn-success" :href="exportExcel">Export .xls</a>

            </div>


        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-header">
                        <h3 class="box-title"><?php echo $this->lang->line('volunteer_list');?></h3>
                        <div class="box-tools">
                            <div>

                            </div>
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="hidden form-control pull-right"
                                       placeholder="Search">

                                <div class="hidden input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                                <select class="form-control" @change="$refs.table.setLimit($event.target.value)">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="300">300</option>
                                    <option value="400">400</option>
                                    <option value="500">500</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <v-client-table ref="table" :columns="columns" :data="filterVolunteerList" :options="options">

                                                        <a  href="#" class="click-donate" @click="clickVolunteer(props.row)" data-toggle="modal" data-target="#volunteer-info" slot="action" slot-scope="props"><i class="fa fa-address-card"></i></a>
                                                        <a  href="#" class="click-donate " @click="clickVolunteer(props.row)" data-toggle="modal" data-target="#volunteer-del" slot="action_delete" slot-scope="props"><i style="color:red" class="fa fa-trash"></i></a>
<!--                                                        <span class="float-right" slot="amount"-->
<!--                                                              slot-scope="props">{{props.row.amount | formatBaht}}</span>-->
<!--                                                        <a :href="invoice(props.row.aid)" target="_blank" class="" slot="inv_number"-->
<!--                                                           slot-scope="props">{{props.row.inv_number}}</a>-->
<!--                                                        <button data-toggle="modal" data-target="#send-invoice" v-if="checkStatusInvoice(props.row.status)" :ref="'email_inv_'+props.row.aid" @click="sendInvoiceEmail(props.row.aid)" class="btn" slot-scope="props" slot="action_email"> Send <i class="fa fa-envelope"> </i></button>-->

                        </v-client-table>

                    </div>

<!--                    volunteer-info -->
                    <div class="modal fade bs-example-modal-lg" id="volunteer-info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('volunteer_info');?></h4>
                                </div>
                                <div class="modal-body">


                                    <div class="box box-primary">
                                        <div class="box-header with-border">
                                            <h3 class="box-title"></h3>
                                            <!--
                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                            </div>

                                            -->

                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <form class="form-horizontal"  autocomplete="off" >

                                                <div class="form-group">
                                                           <label class="col-sm-2 control-label">วันที่ลงทะเบียน </label>
                                                    <div class="col-sm-10"><span style="font-weight: bold">{{volunteerDetail.register_datetime}}</span></div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">สถานะ</label>
                                                    <div class="col-sm-10">
                                                    <input type="radio" id="one" value="1" v-model="volunteerDetail.status" ><label for="one">รอตรวจสอบ</label>
                                                    <input type="radio" id="two" value="4" v-model="volunteerDetail.status" ><label for="two">อนุมัติ</label>
                                                    <input type="radio" id="three" value="3" v-model="volunteerDetail.status" ><label for="three">ไม่อนุมัติ</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                      <label for="orzmileStone" class="col-sm-2 control-label">ชื่อ</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control uk-input" type="text" v-model="volunteerDetail.name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                     <label  class="col-sm-2 control-label"><?php echo $this->lang->line('last_name');?></label>
                                                    <div class="col-sm-10">
                                                    <input class="form-control uk-input" type="text" v-model="volunteerDetail.lastname">
                                                    </div>
                                                </div>



                                                <div class="form-group">
                                                    <label for="orzmileStone" class="col-sm-2 control-label">ที่อยู่</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control " rows="3" v-model="volunteerDetail.address"></textarea>
                                                    </div>
                                                </div>

                                                <div id="demo1" >
                                                    <div class="form-group">
                                                        <label for="districtLabel" class="col-sm-2 control-label">ตำบล / แขวง</label>
                                                        <div class="col-sm-4"><input ref="district"  name="district" class="uk-input form-control" type="text" v-model="volunteerDetail.district"> </div>
                                                        <label for="amphoe" class="col-sm-2 control-label">อำเภอ</label>
                                                        <div class="col-sm-4"><input ref="amphoe" name="amphoe" class="uk-input form-control" type="text" id="amphoe" v-model="volunteerDetail.amphoe"> </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="province" class="col-sm-2 control-label">จังหวัด</label>
                                                        <div class="col-sm-4"><input ref="province"  name="province" class="uk-input form-control" type="text" v-model="volunteerDetail.province"> </div>
                                                        <label for="zipcode" class="col-sm-2 control-label">รหัสไปรษณีย์</label>
                                                        <div class="col-sm-4">
                                                            <input class="form-control hidden" value="">
                                                            <input ref="zipcode"  name="zipcode" class="uk-input form-control" type="text" v-model="volunteerDetail.zipcode" >

                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer text-center">
                                            <span style="font-size: medium" v-if ="successMsg !==''" class="label label-pill label-success">{{successMsg}}</span>
<!--                                            <span v-else>{{errorStatus}} {{successMsg}}</span>-->
                                        </div>
                                        <!-- /.box-footer -->
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('close')?></button>
                                    <button type="button" class="btn btn-primary" @click="saveVolunteer"><?php echo $this->lang->line('save')?></button>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="modal fade" id="volunteer-del" tabindex="-1" role="dialog" aria-labelledby="VolunteerDeleteConfirm" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="VolunteerDeleteConfirm">ยืนยันการลบข้อมูล</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                  <span v-if="successMsg ==''" >ต้องการลบข้อมูลนี้หรือไม่!!</span>
                                  <span style="font-size: medium;color: green" v-else>{{successMsg}}</span>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                    <button type="button" class="btn btn-danger" @click="delVolunteer">ลบ</button>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="hidden pagination pagination-sm no-margin pull-right">
                            <li><a href="#">&laquo;</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">&raquo;</a></li>
                        </ul>


                    </div>
                </div>


            </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="<?php echo base_url('assets/js/backend/volunteer_dashboard.js') ?>"></script>
<script>

</script>

