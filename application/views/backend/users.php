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
<div class="content-wrapper" id="appusers">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Users
            <small>Management</small>
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
                    <button class="btn btn-group-sm" @click="getDonationlist">Confirm</button>
                </div>

            </div>
            <div class="col-xs-6 col-md-4 text-right mx-auto">
                <a class="btn btn-info" data-toggle="modal" data-target="#new-user">New User</a>
                <a class="btn btn-success" :href="exportExcel">Export .xls</a>
            </div>


            <div id="new-user" class="modal fade" role="dialog">
                <div class="modal-dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">New User</h4>
                                <span v-if="!errorStatus" class="alert-success">{{successMsg}}</span>
                                <span v-if="errorStatus" class="alert-warning">{{successMsg}}</span>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="email" class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" v-model="userInfo.email" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="donorName" class="col-sm-2 control-label">Password</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" v-model="userInfo.password" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="donorName" class="col-sm-2 control-label">Name</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" v-model="userInfo.first_name">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="donorName" class="col-sm-2 control-label">Lastname</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" v-model="userInfo.last_name">
                                            </div>
                                        </div>


                                        <div  class="radio">
                                            <label for="user-group" class="col-sm-2 control-label"><b>Group</b></label>
                                            <div class="col-sm-10">
                                                <label class="margin-r-5"  v-for="item,index in filterUserGroup"><input dirname="user-group" type="radio" name="s" :value="item.id" v-model="userInfo.group" @change="permissionGroup">{{item.name}}</label>

                                            </div>

                                        </div>

                                        <div  class="form-group">
                                            <label for="bank-name" class="col-sm-2 control-label">Access</label>
                                            <div class="col-sm-6">
                                                <select ref="user_access" class="form-control" v-model="userInfo.user_access" >
                                                    <option v-for="item,index in userAccess" :value="item.code">{{item.title}}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="trnsferRef" class="col-sm-2 control-label">Status</label>
                                            <div class="col-xs-5">
                                                <select class="form-control" v-model="userInfo.user_status">
                                                    <option v-for="item,index in user_status" :value="item.aid">{{item.status_title}}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">

                                        </div>

                                    </div>

                                </form>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal" @click="saveUserInfo()">Save</button>
                            </div>

                        </div>
                    </div>

                </div>


                <!-- /.box -->
            </div>

        </div>
        <!-- End row-->

        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-header">
                        <h3 class="box-title">User List</h3>
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
                            <a  data-toggle="modal" @click="donationEdit(props.row)" data-target="#myModal" slot="action"
                               slot-scope="props" target="_blank" :href="props.row.action"
                               class="glyphicon fa fa-edit"></a>
                            <a  data-toggle="modal" @click="clickUser(props.row)" data-target="#userDeleteModal" slot="delete"
                                slot-scope="props" target="_blank" :href="props.row.delete"
                                class="glyphicon fa fa-trash"></a>





                        </v-client-table>

                    </div>

                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Update User</h4>
<!--                                        <span v-if="!errorStatus" class="alert-success">{{successMsg}}</span>-->
<!--                                        <span v-if="errorStatus" class="alert-warning">{{successMsg}}</span>-->
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="email" class="col-sm-2 control-label">Email</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" v-model="userClicked.email" >
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="donorName" class="col-sm-2 control-label">Password</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" v-model="userInfo.password" >
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="donorName" class="col-sm-2 control-label">Name</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" v-model="userClicked.name">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="donorName" class="col-sm-2 control-label">Lastname</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" v-model="userClicked.last_name">
                                                    </div>
                                                </div>


                                                <div  class="radio">
                                                    <label for="user-group" class="col-sm-2 control-label"><b>Group</b></label>
                                                    <div class="col-sm-10">
                                                        <label class="margin-r-5"  v-for="item,index in filterUserGroup"><input dirname="user-group" type="radio" name="s" :value="item.id" v-model="userClicked.user_role_id" @change="updateUserGroup">{{item.name}}</label>

                                                    </div>

                                                </div>

                                                <div  class="form-group">
                                                    <label for="bank-name" class="col-sm-2 control-label">Access</label>
                                                    <div class="col-sm-6">
                                                        <select ref="user_access" class="form-control" v-model="userClicked.customer_group_id" >
                                                            <option v-for="item,index in userAccess" :value="item.code">{{item.title}}</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="trnsferRef" class="col-sm-2 control-label">Status</label>
                                                    <div class="col-xs-5">
                                                        <select class="form-control" v-model="userClicked.status_id">
                                                            <option v-for="item,index in user_status" :value="item.aid">{{item.status_title}}</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
<!--                                                    <div class=".col-md-6 .col-md-offset-3" v-if="errorStatus">{{this.successMsg}}</div>-->
<!--                                                    <div class=".col-md-6 .col-md-offset-3" v-else><h4 class="font-weight-bold">{{this.successMsg}}</h4></div>-->
                                                        <div class="" v-if="successMsg !=='' ">{{successMsg}}</div>
                                                </div>

                                            </div>

                                        </form>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal" @click.preven="updateUserInfo()">Save</button>
                                    </div>

                                </div>
                            </div>

                        </div>


                        <!-- /.box -->
                    </div>
                    <div id="userDeleteModal" class="modal fade" role="dialog">
                        <div class="modal-dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Delete User</h4>
                                        <span v-if="!errorStatus" class="alert-success">{{successMsg}}</span>
                                        <span v-if="errorStatus" class="alert-warning">{{successMsg}}</span>
                                    </div>
                                    <div class="modal-body">
                                            <label>Do you want delete user name </label>
                                        <p>{{userClicked.name}} {{userClicked.last_name}}</p>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal" @click="clickClearUser">Close</button>
                                        <button type="button" class="btn btn-primary" @click="userDelete()">Delete</button>
                                    </div>

                                </div>
                            </div>

                        </div>


                        <!-- /.box -->
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
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="<?php echo base_url('assets/js/backend/users.js') ?>"></script>
<script>

</script>

