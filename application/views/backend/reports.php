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
            Organization
            <small>Report</small>
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
                    <button class="btn btn-group-sm" @click="getDonationlist">Confirm</button>
                </div>

                <div>
<!--                                       <p>Start {{fillterStartDated}}</p>-->
<!--                                       <p>End {{fillterEndDated}}</p>-->
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
                        <h3 class="box-title">Organization List</h3>
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
                        <v-client-table ref="table" :columns="columns" :data="filterDonationList" :options="options">
<!--                            <a data-toggle="modal" @click="donationEdit(props.row)" data-target="#myModal" slot="action"-->
<!--                               slot-scope="props" target="_blank" :href="props.row.action"-->
<!--                               class="glyphicon fa fa-edit"></a>-->

                            <a class="btn" @click="donorClicked(props.row)" data-toggle="modal" data-target="#myDonor" slot="first_name" slot-scope="props">{{props.row.first_name}}</a>
                            <span class="float-right" slot="amount"
                                  slot-scope="props">{{props.row.amount | formatBaht}}</span>
                            <a :href="invoice(props.row.aid)" target="_blank" class="" slot="inv_number"
                               slot-scope="props">{{props.row.inv_number}}</a>
                            <button data-toggle="modal" data-target="#send-invoice" v-if="checkStatusInvoice(props.row.status)" :ref="'email_inv_'+props.row.aid" @click="sendInvoiceEmail(props.row.aid)" class="btn" slot-scope="props" slot="action_email"> Send <i class="fa fa-envelope"> </i></button>

                        </v-client-table>

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
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Donation Update</h4>
                                    <span v-if="!errorStatus" class="alert-success">{{successMsg}}</span>
                                   <span v-if="errorStatus" class="alert-warning">{{successMsg}}</span>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal">
                                        <div class="box-body">

                                            <div class="form-group">
                                                <label for="donorName" class="col-sm-2 control-label">Donor</label>

                                                <div class="col-sm-10">
                                                    <input type="text" readonly class="form-control" id="donorName"
                                                           :value="userClicked.first_name">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="trnsferRef" class="col-sm-2 control-label">Transfer
                                                    Ref.no</label>

                                                <div class="col-xs-4">
                                                    <input type="text" class="form-control" id="transferRef" v-model="userClicked.tranRef">
                                                </div>
                                                <div v-if="userClicked.payment_channel !=001" class="col-xs-4">
                                                    <vue-datepicker-local v-model="emptyTime" clearable format="YYYY-MM-DD HH:mm:ss" :local="local" show-buttons @confirm="covertDatetime"></vue-datepicker-local>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inv-number" class="col-sm-2 control-label">Index</label>
                                                <div class="col-xs-4 ">
                                                    <input type="text" readonly class="form-control" id="inv-number"
                                                           :value="userClicked.inv_number">
                                                </div>

                                            </div>

                                            <div v-if="userClicked.payment_channel !=001" class="form-group">
                                                <label for="bank-name" class="col-sm-2 control-label">Bank</label>
                                                <div class="col-sm-6">
                                                    <select id="bank-name" class="form-control" v-model="userClicked.bankName">
                                                        <option v-for="item,index in bankList" :value="item.agent_code">{{item.description_thai}} {{item.booking_no}}</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div v-if="userClicked.payment_channel !=001" class="form-group">
                                                <label for="donate-amount" class="col-sm-2 control-label">Amount</label>
                                                <div class="col-sm-6">
                                                    <input id="donate-amount" type="number" class="form-control" v-model="userClicked.amount">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="donorName" class="col-sm-2 control-label">Payment
                                                    Status</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" v-model="userClicked.payment_status">
                                                        <option v-for="item,index in filterPyamentStatus"
                                                                :value="item.code">{{item.title}}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>


                                        </div>

                                    </form>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" @click="donationUpdate()">Save changes</button>
                                </div>

                            </div>
                        </div>

                    </div>


                    <!-- /.box -->
                </div>

                <div id="myDonor" class="modal fade" role="dialog">
                    <div class="modal-dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Donor Information</h4>
                                    <span v-if="!errorStatus" class="alert-success">{{successMsg}}</span>
                                    <span v-if="errorStatus" class="alert-warning">{{successMsg}}</span>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal">
                                        <div class="box-body">

                                            <div class="form-group">
                                                <label for="donorName" class="col-sm-2 control-label">Full Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" readonly class="form-control" id="donorName"
                                                           :value="donorInfo.first_name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="donor_tax" class="col-sm-2 control-label">TaxID.</label>
                                                <div class="col-sm-10">
                                                    <input type="text" readonly class="form-control" id="donor_tax"
                                                           :value="donorInfo.tax_code">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="donor_email" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="text" readonly class="form-control" id="donor_email"
                                                           :value="donorInfo.email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="donor_tel" class="col-sm-2 control-label">Tel.</label>
                                                <div class="col-sm-10">
                                                    <input type="text" readonly class="form-control" id="donor_tel"
                                                           :value="donorInfo.tel">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="donor_tel" class="col-sm-2 control-label">Address.</label>
                                                <div class="col-sm-10">
                                                    <textarea v-text="donorInfo.address" class="form-control" style="width: 452px;height: 77px" readonly></textarea>
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






                <div id="send-invoice" class="modal fade" role="dialog">
                    <div class="modal-dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-content">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                <div class="modal-body">
                                    <span v-if="statusWait"><i class="fa fa-spin fa-refresh"></i> Sending Invoice email to Donor...</span>
                                    <span v-if="!statusWait" class="alert-success">{{successMsg}}</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="<?php echo base_url('assets/js/backend/reports.js') ?>"></script>
<script>

</script>

