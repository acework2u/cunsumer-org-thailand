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
<div class="content-wrapper" id="approvedlog">
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
                    <button class="btn btn-info" @click="getDonationlist">Filter</button>
                </div>


            </div>
            <div class="col-xs-6 col-md-4 text-right mx-auto">
                <a class="btn btn-success" :href="exportExcel">Export .xls</a>

            </div>


        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-header">
                        <h3 class="box-title">Organization Approved List</h3>
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
                            <a data-toggle="modal" @click="donationEdit(props.row)" data-target="#myModal" slot="action"
                               slot-scope="props" target="_blank" :href="props.row.action"
                               class="glyphicon fa fa-edit"></a>

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

            </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="<?php echo base_url('assets/js/backend/logs.js') ?>"></script>
<script>

</script>

