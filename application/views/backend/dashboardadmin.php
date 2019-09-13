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
            <b-alert show variant="primary">Primary Alert <?php echo getUserRoleId() ?></b-alert>
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
            <section class="col-lg-12">
                <div class="box box-info">
                    <div class="box-header">
                        <div class="col-xs-12 col-sm-6 col-md-8">
                            <h3 class="box-title">Organization List1</h3>
                        </div>

                        <vue-datepicker-local v-model="range" range-separator=" to " :local="local" show-buttons
                                              format="DD-MM-YYYY"></vue-datepicker-local>
                        <button class="btn btn-info">Filter</button>

                    </div>
                    <div class="box-body table-responsive no-paddingv connectedSortable">
                        <v-client-table class="table table-hover" ref="table" :columns="columns" :data="filterOrganizationList"
                                        :options="options">
                            <a data-toggle="modal" @click="orzUserClick(props.row)" data-target="#editModal" slot="action"
                                                                    slot-scope="props" target="_blank" :href="props.row.action"
                                                                    class="glyphicon fa fa-edit"></a>
                            <a data-toggle="modal" @click="orzUserClick(props.row)" data-target="#viewModal" slot="action_1"
                               slot-scope="props" target="_blank" :href="props.row.action_1"
                               class="glyphicon fa fa-trash-o"></a>

                            <a data-toggle="modal" data-target="#viewModal" @click="orzUserClick(props.row)"  slot="action_2"
                               slot-scope="props" target="_blank" :href="props.row.action_2"
                               class="glyphicon fa fa-vcard-o"></a>

                            <button slot-scope="props" slot="action_3" @click="approvedOrz(props.row)" class="btn-sm btn-success">อนุมัติ</button>
                            <button slot-scope="props" slot="action_4" @click="cancledOrz(props.row)" class="btn-sm btn-danger">ไม่อนุมัติ</button>
                            <span slot="status" slot-scope="props" >{{props.row.status | orzStatus}}</span>

                        </v-client-table>


                    </div>

                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="exampleModalLabel">Update : Organization Information</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                    <div class="form-group">
                                        <label for="orzLogo" class="col-sm-2 control-label">โลโก้</label>
                                        <div class="col-sm-5"><img :src="filOrzLogoAdmin" style="max-height: 134px;max-width: 80%" ></div>

                                        <div class="col-sm-5 right">
                                            <input type="file" id="file" ref="file" accept="image/*"
                                                   v-on:change="handleFileUpload()"/>
                                            <img style="max-width: 50%" v-bind:src="imagePreview" v-show="showPreview"/>
                                            <br>
                                            <progress max="100" :value.prop="uploadPercentage"></progress>
                                            <br>
                                            <button class="btn btn-success" v-on:click="submitFile()">Upload</button>


                                            <!--                                            <input type="file" class="form-control" id="orzLogo" placeholder="">-->
                                            <input type="hidden" name="orz_aid" :value="orzInformation.aid" >
                                        </div>

                                    </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="recipient-name" class="control-label">ชื่อ องค์กร /มูลนิธิ:</label>
                                            <input type="text" class="form-control" id="recipient-name" v-model="orz_user_select.title">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">กลุ่มมูลนิธิ</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" @change="onChange($event)" v-model="orzInformation.orz_group_id">
                                                <option v-for="item in orz_group" :value="item.aid">{{item.title_th}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="orzmileStone" class="control-label">วัตถุประสงค์</label>
                                        <div class="col-sm-12">
                                            <!--                                            <textarea :value.prop="orzInformation.objective" class="form-control" rows="3" placeholder="Enter ..."></textarea>-->
                                            <ckeditor :editor="editor" v-model="orzInformation.objective" :config="editorConfig"></ckeditor>


                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="telContact1" class="control-label">รายชื่อคณะกรรมการ</label>
                                        <div class="col-sm-12">
                                            <!--                                            <textarea :value ="orzInformation.board_of_directors" class="form-control" rows="3" placeholder="Enter ..."></textarea>-->
                                            <ckeditor :editor="editor" v-model="orzInformation.board_of_directors" :config="editorConfig"></ckeditor>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="orzmileStone" class="control-label">ผลงานย้อนหลังในรอบ 10 ปี</label>
                                        <div class="col-sm-12">
                                            <!--                                            <textarea :value.prop ="orzInformation.portfolio" class="form-control" rows="3" placeholder="Enter ..."></textarea>-->
                                            <ckeditor :editor="editor" v-model="orzInformation.portfolio" :config="editorConfig"></ckeditor>
<!--                                            <vue-ckeditor type="classic" v-model="orzInformation.portfolio" :upload-adapter="UploadAdapter"></vue-ckeditor><br /><br />-->
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




                                    <div class="form-group" id="demo1">
                                        <legend>Address Details</legend>


                                        <label class="col-sm-1 control-label" for="textinput">ที่อยู่</label>
                                        <div class="col-sm-11">
                                            <input type="text" placeholder="Address Line 1" class="form-control" v-model="orz_user_select.address">
                                        </div>
                                        <label class="col-sm-1 control-label" for="textinput">ตำบล</label>
                                        <div class="col-sm-11">
                                            <input ref="district" :value="orz_user_select.district" name="district" class="uk-input form-control" type="text">
                                        </div>
                                        <label class="col-sm-1 control-label" for="textinput">อำเภอ</label>
                                        <div class="col-sm-11">
                                            <input ref="amphoe" :value="orz_user_select.amphoe" name="amphoe" class="uk-input form-control" type="text" id="amphoe">
                                        </div>
                                        <label class="col-sm-1 control-label" for="textinput">จังหวด</label>
                                        <div class="col-sm-11">
                                            <input ref="province" :value="orz_user_select.province" name="province" class="uk-input form-control" type="text">
                                        </div>
                                        <label class="col-sm-1 control-label" for="textinput">รหัสไปรษณีย์</label>
                                        <div class="col-sm-11">
                                            <input ref="zipcode"  name="zipcode" class="uk-input form-control" type="text" :value="orz_user_select.stage_code" readonly>
                                        </div>
                                    </div>
                                   <div class="form-group">
                                       <legend>Google Place location</legend>

                                           <gmap-autocomplete :value="description" placeholder="This is a placeholder text" class="form-control"
                                                              @place_changed="setPlace" :select-first-on-enter="true" >
                                           </gmap-autocomplete>

                                       <label  class="col-sm-12">{{latLng.lat}},{{latLng.lng}}</label>


                                           <button class="btn btn-success hidden" @click="addMarker">Add</button>
                                           <button class="btn btn-success" @click="addMarker2">Add New Marker</button>




                                       <button class="btn btn-info" @click="clearMarker">Clear Marker</button>
                                       <button class="btn btn-info hidden" @click="curentPostion">Update Place</button>

                                       <!--
                                       <gmap-map ref="mymap" :center="startLocation" :zoom="startLocation.zoom" :options='{disableDefaultUI: true, zoomControl: true, autobindAllEvents: true}' style="width: 100%; height: 600px">


                                           <gmap-info-window :options="infoOptions" :position="infoPosition" :opened="infoOpened" @closeclick="infoOpened=false" @center_changed="updateRouteLatLng">
                                            <div v-html="infoContent"></div>
                                           </gmap-info-window>


                                           <gmap-marker ref="myLocation" v-for="(item, key) in fillCoordinates" :key="key" :position="getPosition(item)" :clickable="true" :draggable="true" @dragend="showLocation" @click="toggleInfo(item, key)" />


                                       </gmap-map>

                                       -->
                                        <!--
                                       <gmap-map ref="mymap" :center="center" :zoom="zoom" :options='{disableDefaultUI: true, zoomControl: true, autobindAllEvents: true}' style="width: 100%; height: 600px">


                                           <gmap-info-window :options="infoOptions" :position="infoPosition" :opened="infoOpened" @closeclick="infoOpened=false" @center_changed="updateRouteLatLng">
                                               <div v-html="infoContent"></div>
                                           </gmap-info-window>


                                           <gmap-marker ref="myLocation" v-for="(item, key) in fillCoordinates" :key="key" :position="getPosition(item)" :clickable="true" :draggable="true" @dragend="showLocation" @click="toggleInfo(item, key)" />


                                       </gmap-map>
                                        -->
                                       <gmap-map
                                               :center="center"
                                               :zoom="zoom"
                                               style="width:100%;  height: 600px;"
                                       >
                                           <gmap-marker
                                                   :key="index"
                                                   v-for="(m, index) in markers"
                                                   :position="m.position"
                                                   @click="center=m.position" :draggable="true" @dragend="showLocation"
                                           ></gmap-marker>

                                           <gmap-marker ref="myLocation" v-for="(item, key) in fillCoordinates" :key="key" :position="getPosition(item)" :clickable="true" :draggable="true" @dragend="showLocation" @click="toggleInfo(item, key)" />
                                       </gmap-map>

                                   </div>




                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal" @click="userClickClear">Close</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" @click="saveOrzInfobyAdmin">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="exampleModalLabel">Organization Profile</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-2"><img :src="filOrzLogo" style="max-height: 134px"></div>
                                        <div class="col-md-10"><h4>{{orz_user_select.title}}</h4>
                                        <address> {{orz_user_select.address}} ตำบล/แขวง {{orz_user_select.district}} อำเภอ
                                            {{orz_user_select.amphoe}} จังหวัด {{orz_user_select.province}}
                                            {{orz_user_select.stage_code}} </address>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">วัตถุประสงค์</div>
                                        <div class="col-md-10">
                                            <ol class="modal-ol" v-html="orz_user_select.objective"> </ol>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">ผู้ประสานงานหลัก</div>
                                        <div class="col-md-10">
                                            <p class="mb-1"><span class="modal-span">{{orz_user_select.contact_name}} {{orz_user_select.contact_lastname}}</span></p>
                                            <p class="mb-1">E-mail : <span class="modal-span">{{orz_user_select.email}}</span></p>
                                            <p class="mb-1">Website : <span class="modal-span">{{orz_user_select.website}}/</span></p>
                                            <p>เบอร์ติดต่อองค์กร : <span class="modal-span">{{orz_user_select.orz_tel}}</span></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">รายชื่อคณะกรรมการ</div>
                                        <div class="col-md-10">
                                            <ol class="modal-ol pb-5" v-html="orz_user_select.board_of_directors"></ol>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2">ผลงานย้อนหลังในรอบ 10 ปี</div>
                                        <div class="col-md-10">
                                            <ol class="modal-ol" v-html="orz_user_select.portfolio">

                                            </ol>
                                        </div>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </section>
            <section class="hidden col-lg-12 connectedSortable">
                <div class="box box-info">
                    <div class="box-header"><h3 class="box-title">Organization List</h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right"
                                       placeholder="Search">

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
                                <td @click="orzUserClick(item)" data-toggle="modal" data-target="#orz-select-modal">
                                    {{index+1}}
                                </td>
                                <td @click="orzUserClick(item)" data-toggle="modal" data-target="#orz-select-modal">
                                    {{item.title}}
                                </td>
                                <td @click="orzUserClick(item)" data-toggle="modal" data-target="#orz-select-modal">
                                    {{item.province}}
                                </td>
                                <td @click="orzUserClick(item)" data-toggle="modal" data-target="#orz-select-modal">
                                    {{item.created_date | ThaiDate}}
                                </td>
                                <td @click="orzUserClick(item)" data-toggle="modal" data-target="#orz-select-modal">
                                    <span>{{item.status | orzStatus}}</span></td>
                                <td>
                                    <button @click="approvedOrz(item)" class="btn-sm btn-success">อนุมัติ</button>
                                    <button @click="cancledOrz(item)" class="btn-sm btn-danger">ไม่อนุมัติ</button>
                                </td>
                                <!--                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>-->
                            </tr>
                        </table>
                    </div>
                </div>
            </section>
            <section class="col-lg-5 connectedSortable"></section>
        </div>
        <!-- End Main row -->
        <div class="modal fade" tabindex="-1" id="orz-select-modal" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg register-modal" role="document">
                <div class="modal-content register-modal-container w-100 px-3 py-2 p-relative">
                    <div class="d-flex flex-row bd-highlight mb-3">
                        <div class="p-2 bd-highlight "><img :src="filOrzLogo" style="max-height: 134px"></div>
                        <div class="p-2 bd-highlight">{{orz_user_select.title}}</h3><p style="font-size: small">
                                {{orz_user_select.address}} ตำบล/แขวง {{orz_user_select.district}} อำเภอ
                                {{orz_user_select.amphoe}} จังหวัด {{orz_user_select.province}}
                                {{orz_user_select.stage_code}}</p></div>

                    </div>
                    <div class="row m-auto">
                        <div class="col-sm">
                            <p class="mb-1">วัตถุประสงค์</p>
                            <ol class="modal-ol" v-html="orz_user_select.objective">
                            </ol>
                            <p class="mb-1">ผู้ประสานงานหลัก : <span class="modal-span">{{orz_user_select.contact_name}} {{orz_user_select.contact_lastname}}</span>
                            </p>
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
<!--<script src="--><?php //echo base_url('assets/js/backend/main.js') ?><!--"></script>-->
<script src="<?php echo base_url('assets/js/vue-google-maps.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/backend/admin-dashboard.js') ?>"></script>

