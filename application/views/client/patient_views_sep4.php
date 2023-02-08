<!doctype html>
<html ng-app="myApp" ng-app lang="en">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta http-equiv="Content-Language" content="en">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <title>Patient List - Physio Plus Tech</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"    />
      <meta name="msapplication-tap-highlight" content="no">
      <script src="<?php echo base_url() ?>assets/sweet-alert/sweetalert.js"></script>
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/sweet-alert/sweetalert.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
      <link href="<?php echo base_url()?>my_assets/main.css" rel="stylesheet">
      <style>
         .tabs-lg-alternate.card-header>.nav .nav-item .widget-number.mob {
         display: none;
         }
         .tabs-lg-alternate.card-header>.nav .nav-item .widget-number.one {
         display: block;
         }
         a.btn-icon.btn-icon-only.btn-shadow.btn-dashed.btn.btn-outline-secondary {
         text-overflow: ellipsis;
         overflow-x: hidden;
         overflow-y: hidden;
         width: 100%;
         }
         a.btn-icon.btn-icon-only.btn-shadow.btn-dashed.btn.btn-outline-secondary {
         width: 100%;
         }
         button.btn-icon.btn-icon-only.btn-shadow.btn-dashed.btn.btn-outline-secondary {
         width: 100%;
         }
         button.btn-icon.btn-icon-only.btn-shadow.btn-dashed.btn.btn-outline-secondary img {
         width: 100% !important;
         }
         i.fas.fa-coins.fa-2x {
         font-size: 1.5em !important;
         }
         .add_new_patient {
         display: none;
         }
         @media (max-width: 768px) {
         .tabs-lg-alternate.card-header>.nav {
         display: block;
         }
         .br-1 {
         padding: 0 1em;
         }
         .arrow {
         text-align: right !important;
         color: #3f6ad8;
         font-size: 1.5em;
         }
         .add_new_patient {
         display: block;
         text-align: left !important;
         padding: 8px !important;
         box-shadow: 1px 4px 11px 1px #f3f2f2;
         margin-bottom: 8px;
         border: 1px solid rgb(238 238 238 / 70%);
         border-radius: 6px;
         }
         .tabs-lg-alternate.card-header>.nav .nav-link {
         display: flex;
         flex-direction: row;
         justify-content: space-between;
         }
         .tabs-lg-alternate.card-header>.nav .nav-item .widget-number.mob {
         display: block;
         }
         .tabs-lg-alternate.card-header>.nav .nav-item .widget-number.one {
         display: none;
         }
         .col-md-6.col-sm-6.col-xs-6.pull-right {
         margin: 0 !important;
         }
         .tab-pane.active.show .card-header {
         height: auto;
         display: block;
         padding: .75rem 0;
         text-align: center;
         margin-bottom: 8px !important;
         border: none !important;
         }
         .table-responsive.add_patient {
         display: none;
         }
         }
         img
         {
         vertical-align: middle;
         }
         #tab-content-1 .widget-number
         {
         font-size: large;
         }
         .mob_none {
         display: block;
         }
         .mob {
         display: none;
         }
         @media (max-width: 768px) {
            .mob_none {
               display: none;
            }
            .mob {
               display: block;
            }
            .add_new_patient {
               display: block;
               text-align: left !important;
               padding: 8px !important;
               box-shadow: 1px 4px 11px 1px #f3f2f2;
               margin-bottom: 8px;
               border: 1px solid rgb(238 238 238 / 70%);
               border-radius: 6px;
               margin: 1em 6px;
            }
            .table-bordered th, .table-bordered td {
               border: 1px solid #e9ecef;
               padding: 4px;
            }
         }
      </style>
   <body>
      <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
      <?php include("sidebar.php");?>
      <div class="app-main__outer">
         <div class="app-main__inner">
            <div class="tabs-animation">
               <div class="row" >
                  <div class="col-md-12">
                     <div class="main-card mb-3 card">
                        <div class="row">
                           <div class="col-85" style="width:80%;">
                              <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                                 <li class="nav-item">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                 </li>
                                 <li class="nav-item active">
                                    <a role="tab" class="nav-link active show" href="#tab-content-1" id="tab-1" data-toggle="tab" aria-selected="true">
                                    <span>OP Patients List</span>
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a role="tab" class="nav-link show" href="#tab-content-0" id="tab-0" data-toggle="tab" aria-selected="false">
                                    <span>Home Patients  </span>
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a role="tab" class="nav-link show" href="#tab-content-2" id="tab-0" data-toggle="tab" aria-selected="false">
                                    <span>List of Patient Requests </span>
                                    </a>
                                 </li>
                              </ul>
                           </div>
                           <?Php $create = explode(",",$this->session->userdata('create'));
                              if(in_array("1",$create) || $this->session->userdata('user_login')== false){
                              ?>
                           <div class="col" style="float:right;">
                              </br>
                              <div style="float:right;" ><a class="btn btn-shadow btn-warning" href="<?php echo base_url().'client/patient/index' ?>" ><strong>Add New Patient</strong></a>&nbsp;&nbsp;&nbsp;</div>
                           </div>
                           <?php } ?>
                        </div>
                        <div class="tab-content">
                           <div class="tab-pane tabs-animation fade" id="tab-content-2" role="tabpanel">
                              <div class="row mob_none" >
                                 <div class="col-md-12">
                                    <div class="main-card mb-3" ng-controller="customersCrtl2">
                                       <div class="col-md-12" >
                                          <div class="table-responsive">
                                             <table class="table table-striped table-bordered">
                                                <thead>
                                                   <tr>
                                                      <th class="text-center">Image</th>
                                                      <th class="text-center">Date</th>
                                                      <th class="text-center">Patient Id</th>
                                                      <th class="text-center">Name</th>
                                                      <th class="text-center">Mobile No</th>
                                                      <th class="text-center">Email</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                   <tr>
                                                      <td colspan="9"> <input style="width:100%;" type="text" ng-model="search" ng-change="filter1()" placeholder="Search All Fields" class="form-control" /> </td>
                                                   </tr>
                                                   <tr ng-show="filteredItems > 0" ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit" id="data.patient_id">
                                                      <!--<td class="text-center" ng-if="data.gender == 'male' || data.gender == 'Male'">
                                                         <img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/boy.png" alt="">
                                                         </td>
                                                         <td class="text-center" ng-if="data.gender != 'male' && data.gender != 'Male'">
                                                         <img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/girl.png" alt="">
                                                         </td>-->
                                                      <td class="text-center" ng-if="data.gender == 'male' || data.gender == 'Male'">
                                                         <!--<img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/boy.png" alt="">-->
                                                         <span ng-if="data.photo">
                                                         <img width="40" class="" src="<?php echo base_url() ?>uploads/patient/{{data.photo}}">
                                                         </span>
                                                         <span ng-if="data.photo == ''">
                                                         <img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/boy.png" alt="" >
                                                         </span>
                                                      </td>
                                                      <td class="text-center" ng-if="data.gender != 'male' && data.gender != 'Male'">
                                                         <!--<img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/girl.png" alt="">-->
                                                         <span ng-if="data.photo">
                                                         <img width="40" class="rounded-circle" src="<?php echo base_url() ?>uploads/patient/{{data.photo}}">
                                                         </span>
                                                         <span ng-if="data.photo == ''">
                                                         <img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/girl.png" alt="" >
                                                         </span>
                                                      </t font-size: 12px;d>
                                                      <td class="text-center">{{data.appoint_date}}</td>
                                                      <td class="text-center text-muted">
                                                         <div class="badge badge-pill badge-info">{{data.patient_code}}</div>
                                                         </a>
                                                      </td>
                                                      <td class="text-center">
                                                         <?Php $edit = explode(",",$this->session->userdata('edit'));
                                                            if(in_array("1",$edit) || $this->session->userdata('user_login')== false){
                                                            ?>
                                                         <a href="<?php echo base_url().'client/patient/view/' ?>{{data.patient_id}}"><img src="<?php echo base_url().'img/pngwing.png' ?>" style="width:30px; height:30px;" ></img> {{data.first_name}}  {{data.last_name}}</a>
                                                         <?php } else { ?>
                                                         <a><img src="<?php echo base_url().'img/pngwing.png' ?>" style="width:30px; height:30px;" ></img> {{data.first_name}}  {{data.last_name}}</a>
                                                         <?php } ?>
                                                      </td>
                                                      <td class="text-center"><a href="https://api.whatsapp.com/send?l=en&phone=91{{data.mobile_no}}" target="_blank"><img src="<?php echo base_url().'img/whatsapp Logo.png' ?>" style="width:18px; height:18px;" ></img> {{data.mobile_no}}</a></td>
                                                      <td class="text-center">{{data.email}}</td>
                                                      <td class="text-center">
                                                         <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" ng-click="confirm2(data.patient_id,data.first_name)" data-toggle="tooltip" data-placement="top" title="Confirm"><i class="fa fa-edit"></i></button>
                                                         <?Php $delete = explode(",",$this->session->userdata('delete'));
                                                            if(in_array("1",$delete) || $this->session->userdata('user_login')== false){
                                                            ?>
                                                         <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete2" data-toggle="tooltip" data-placement="top" title="Delete" ng-click="delete2(data.patient_id,data.first_name)"><i class="fa fa-trash-alt"> </i></button>
                                                         <?Php } ?>
                                                      </td>
                                                   </tr>
                                                   <tr ng-show="filteredItems < 10">
                                                      <td colspan="11">
                                                         <center>
                                                            <h6> No More Records </h6>
                                                         </center>
                                                      </td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </div>
                                       </div>
                                       <div class="table-responsive">
                                          <div class="col-md-12" ng-show="filteredItems > 0">
                                             <div pagination="" max-size="maxSize" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row mob" >
                                 <div class="col-md-12">
                                    <div class="main-card mb-3" ng-controller="customersCrtl2">
                                       <div class="col-md-12" >
                                          <div class="" style="font-size: 13px;">
                                             <table class="table table-striped table-bordered">
                                                <thead>
                                                   <tr>
                                                      <th class="text-center">Image<br>Name<br>Patient Id</th>
                                                      <th class="text-center">Date<br>Mobile No<br>Email</th>
                                                      <!-- <th class="text-center">Email</th> -->
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                   <tr>
                                                      <td colspan="2"> <input style="width:100%;" type="text" ng-model="search" ng-change="filter1()" placeholder="Search All Fields" class="form-control" /> </td>
                                                   </tr>
                                                   <tr ng-show="filteredItems > 0" ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit" id="data.patient_id">
                                                      <td class="text-center" ng-if="data.gender == 'male' || data.gender == 'Male'">
                                                         <!--<img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/boy.png" alt="">-->
                                                         <span ng-if="data.photo">
                                                         <img width="40" class="" src="<?php echo base_url() ?>uploads/patient/{{data.photo}}">
                                                         </span>
                                                         <span ng-if="data.photo == ''">
                                                         <img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/boy.png" alt="" >
                                                         </span>
                                                         <br>
                                                         <?Php $edit = explode(",",$this->session->userdata('edit'));
                                                            if(in_array("1",$edit) || $this->session->userdata('user_login')== false){
                                                            ?>
                                                         <a href="<?php echo base_url().'client/patient/view/' ?>{{data.patient_id}}"> {{data.first_name}}  {{data.last_name}}</a>
                                                         <?php } else { ?>
                                                         <a> {{data.first_name}}  {{data.last_name}}</a>
                                                         <?php } ?>
                                                         <br>
                                                         <div class="badge badge-pill badge-info">{{data.patient_code}}</div>
                                                      </td>
                                                      <td class="text-center" ng-if="data.gender != 'male' && data.gender != 'Male'">
                                                         <!--<img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/girl.png" alt="">-->
                                                         <span ng-if="data.photo">
                                                         <img width="40" class="rounded-circle" src="<?php echo base_url() ?>uploads/patient/{{data.photo}}">
                                                         </span>
                                                         <span ng-if="data.photo == ''">
                                                         <img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/girl.png" alt="" >
                                                         </span>
                                                         <br>
                                                         <?Php $edit = explode(",",$this->session->userdata('edit'));
                                                            if(in_array("1",$edit) || $this->session->userdata('user_login')== false){
                                                            ?>
                                                         <a href="<?php echo base_url().'client/patient/view/' ?>{{data.patient_id}}"> {{data.first_name}}  {{data.last_name}}</a>
                                                         <?php } else { ?>
                                                         <a> {{data.first_name}}  {{data.last_name}}</a>
                                                         <?php } ?>
                                                         <br>
                                                         <div class="badge badge-pill badge-info">{{data.patient_code}}</div>
                                                      </td>

                                                      <td class="text-center text-muted">
                                                         {{data.appoint_date}}
                                                         <br>
                                                         <a href="https://api.whatsapp.com/send?l=en&phone=91{{data.mobile_no}}" target="_blank"><img src="<?php echo base_url().'img/whatsapp Logo.png' ?>" style="width:18px; height:18px;" ></img> {{data.mobile_no}}</a>
                                                         <br><span style="white-space: normal; max-width: 150px; overflow: hidden; text-overflow: ellipsis; display: inline-block;">{{data.email}}</span>
                                                      </td>

                                                      <td class="text-center">
                                                         <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" ng-click="confirm2(data.patient_id,data.first_name)" data-toggle="tooltip" data-placement="top" title="Confirm"><i class="fa fa-edit"></i></button>
                                                         <?Php $delete = explode(",",$this->session->userdata('delete'));
                                                            if(in_array("1",$delete) || $this->session->userdata('user_login')== false){
                                                            ?>
                                                         <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete2" data-toggle="tooltip" data-placement="top" title="Delete" ng-click="delete2(data.patient_id,data.first_name)"><i class="fa fa-trash-alt"> </i></button>
                                                         <?Php } ?>
                                                      </td>
                                                   </tr>
                                                   <tr ng-show="filteredItems < 10">
                                                      <td colspan="11">
                                                         <center>
                                                            <h6> No More Records </h6>
                                                         </center>
                                                      </td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </div>
                                       </div>
                                       <div class="table-responsive">
                                          <div class="col-md-12" ng-show="filteredItems > 0">
                                             <div pagination="" max-size="maxSize" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>

                           <div class="tab-pane tabs-animation fade" id="tab-content-0" role="tabpanel">
                              <div class="row mob" >
                                 <div class="col-md-12">
                                    <div class="main-card mb-3" ng-controller="customersCrtl2">
                                       <div class="col-md-12" >
                                          <div class="" style="font-size: 13px;">
                                             <table class="table table-striped table-bordered">
                                                <thead>
                                                   <tr>
                                                      <th class="text-center">Image<br>Name<br>Patient Id</th>
                                                      <th class="text-center">Date<br>Mobile No<br>Email</th>
                                                      <!-- <th class="text-center">Email</th> -->
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                   <tr>
                                                      <td colspan="2"> <input style="width:100%;" type="text" ng-model="search" ng-change="filter1()" placeholder="Search All Fields" class="form-control" /> </td>
                                                   </tr>
                                                   <tr ng-show="filteredItems > 0" ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit" id="data.patient_id">
                                                      <td class="text-center" ng-if="data.gender == 'male' || data.gender == 'Male'">
                                                         <!--<img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/boy.png" alt="">-->
                                                         <span ng-if="data.photo">
                                                         <img width="40" class="" src="<?php echo base_url() ?>uploads/patient/{{data.photo}}">
                                                         </span>
                                                         <span ng-if="data.photo == ''">
                                                         <img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/boy.png" alt="" >
                                                         </span>
                                                         <br>
                                                         <?Php $edit = explode(",",$this->session->userdata('edit'));
                                                            if(in_array("1",$edit) || $this->session->userdata('user_login')== false){
                                                            ?>
                                                         <a href="<?php echo base_url().'client/patient/view/' ?>{{data.patient_id}}"> {{data.first_name}}  {{data.last_name}}</a>
                                                         <?php } else { ?>
                                                         <a> {{data.first_name}}  {{data.last_name}}</a>
                                                         <?php } ?>
                                                         <br>
                                                         <div class="badge badge-pill badge-info">{{data.patient_code}}</div>
                                                      </td>
                                                      <td class="text-center" ng-if="data.gender != 'male' && data.gender != 'Male'">
                                                         <!--<img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/girl.png" alt="">-->
                                                         <span ng-if="data.photo">
                                                         <img width="40" class="rounded-circle" src="<?php echo base_url() ?>uploads/patient/{{data.photo}}">
                                                         </span>
                                                         <span ng-if="data.photo == ''">
                                                         <img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/girl.png" alt="" >
                                                         </span>
                                                         <br>
                                                         <?Php $edit = explode(",",$this->session->userdata('edit'));
                                                            if(in_array("1",$edit) || $this->session->userdata('user_login')== false){
                                                            ?>
                                                         <a href="<?php echo base_url().'client/patient/view/' ?>{{data.patient_id}}"> {{data.first_name}}  {{data.last_name}}</a>
                                                         <?php } else { ?>
                                                         <a> {{data.first_name}}  {{data.last_name}}</a>
                                                         <?php } ?>
                                                         <br>
                                                         <div class="badge badge-pill badge-info">{{data.patient_code}}</div>
                                                      </td>

                                                      <td class="text-center text-muted">
                                                         {{data.appoint_date}}
                                                         <br>
                                                         <a href="https://api.whatsapp.com/send?l=en&phone=91{{data.mobile_no}}" target="_blank"><img src="<?php echo base_url().'img/whatsapp Logo.png' ?>" style="width:18px; height:18px;" ></img> {{data.mobile_no}}</a>
                                                         <br><span style="white-space: normal; max-width: 150px; overflow: hidden; text-overflow: ellipsis; display: inline-block;">{{data.email}}</span>
                                                      </td>

                                                      <td class="text-center">
                                                         <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" ng-click="confirm2(data.patient_id,data.first_name)" data-toggle="tooltip" data-placement="top" title="Confirm"><i class="fa fa-edit"></i></button>
                                                         <?Php $delete = explode(",",$this->session->userdata('delete'));
                                                            if(in_array("1",$delete) || $this->session->userdata('user_login')== false){
                                                            ?>
                                                         <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete2" data-toggle="tooltip" data-placement="top" title="Delete" ng-click="delete2(data.patient_id,data.first_name)"><i class="fa fa-trash-alt"> </i></button>
                                                         <?Php } ?>
                                                      </td>
                                                   </tr>
                                                   <tr ng-show="filteredItems < 10">
                                                      <td colspan="11">
                                                         <center>
                                                            <h6> No More Records </h6>
                                                         </center>
                                                      </td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </div>
                                       </div>
                                       <div class="table-responsive">
                                          <div class="col-md-12" ng-show="filteredItems > 0">
                                             <div pagination="" max-size="maxSize" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row mob_none" ng-controller="customersCrtl1">
                                 <div class="col-md-12">
                                    <div class="main-card mb-3">
                                       <div class="col-md-12" >
                                          <div class="table-responsive">
                                             <table class="table table-striped table-bordered">
                                                <thead>
                                                   <tr>
                                                      <th class="text-center">Image</th>
                                                      <th class="text-center">Date</th>
                                                      <th class="text-center">Patient Id</th>
                                                      <th class="text-center">Name</th>
                                                      <th class="text-center">Mobile No</th>
                                                      <th class="text-center">Email</th>
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                   <tr>
                                                      <td colspan="9"> <input style="width:100%;" type="text" ng-model="search" ng-change="filter1()" placeholder="Search All Fields" class="form-control" /> </td>
                                                   </tr>
                                                   <tr ng-show="filteredItems > 0" ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit" id="data.patient_id">
                                                      <!--<td class="text-center" ng-if="data.gender == 'male' || data.gender == 'Male'">
                                                         <img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/boy.png" alt="">
                                                         </td>
                                                         <td class="text-center" ng-if="data.gender != 'male' && data.gender != 'Male'">
                                                         <img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/girl.png" alt="">
                                                         </td>-->
                                                      <td class="text-center" ng-if="data.gender == 'male' || data.gender == 'Male'">
                                                         <!--<img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/boy.png" alt="">-->
                                                         <span ng-if="data.photo">
                                                         <img width="40" class="" src="<?php echo base_url() ?>uploads/patient/{{data.photo}}">
                                                         </span>
                                                         <span ng-if="data.photo == ''">
                                                         <img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/boy.png" alt="" >
                                                         </span>
                                                      </td>
                                                      <td class="text-center" ng-if="data.gender != 'male' && data.gender != 'Male'">
                                                         <!--<img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/girl.png" alt="">-->
                                                         <span ng-if="data.photo">
                                                         <img width="40" class="rounded-circle" src="<?php echo base_url() ?>uploads/patient/{{data.photo}}">
                                                         </span>
                                                         <span ng-if="data.photo == ''">
                                                         <img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/girl.png" alt="" >
                                                         </span>
                                                      </t font-size: 12px;d>
                                                      <td class="text-center">{{data.appoint_date}}</td>
                                                      <td class="text-center text-muted">
                                                         <div class="badge badge-pill badge-info">{{data.patient_code}}</div>
                                                         </a>
                                                      </td>
                                                      <td class="text-center">
                                                         <?Php $edit = explode(",",$this->session->userdata('edit'));
                                                            if(in_array("1",$edit) || $this->session->userdata('user_login')== false){
                                                            ?>
                                                         <a href="<?php echo base_url().'client/patient/view/' ?>{{data.patient_id}}"><img src="<?php echo base_url().'img/pngwing.png' ?>" style="width:30px; height:30px;" ></img> {{data.first_name}}  {{data.last_name}}</a>
                                                         <?php } else { ?>
                                                         <a><img src="<?php echo base_url().'img/pngwing.png' ?>" style="width:30px; height:30px;" ></img> {{data.first_name}}  {{data.last_name}}</a>
                                                         <?php } ?>
                                                      </td>
                                                      <td class="text-center"><a href="https://api.whatsapp.com/send?l=en&phone=91{{data.mobile_no}}" target="_blank"><img src="<?php echo base_url().'img/whatsapp Logo.png' ?>" style="width:18px; height:18px;" ></img> {{data.mobile_no}}</a></td>
                                                      <td class="text-center">{{data.email}}</td>
                                                      <td class="text-center">
                                                         <a href="<?php echo base_url().'client/invoice/add/Pt/'; ?>{{data.patient_id}}"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Invoice"><i class="fa fa-file"></i></button></a>
                                                         <a href="<?php echo base_url().'client/renewal/print_reports/'.$this->session->userdata('client_id').'/'; ?>{{data.patient_id}}" target="_blank"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-alternate" data-toggle="tooltip" data-placement="top" title="Reports"><i class="fa fa-print"></i></button></a>
                                                         <a class="edit" href="<?php echo base_url().'client/reports/report_session/'; ?>{{data.patient_id}}"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Daily Register"><i class="fa fa-edit"></i></button></a>
                                                         <?Php $delete = explode(",",$this->session->userdata('delete'));
                                                            if(in_array("1",$delete) || $this->session->userdata('user_login')== false){
                                                            ?>
                                                         <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete" ng-click="delete1(data.patient_id,data.first_name)"><i class="fa fa-trash-alt"> </i></button>
                                                         <?Php } ?>
                                                      </td>
                                                   </tr>
                                                   <tr ng-show="filteredItems < 10">
                                                      <td colspan="11">
                                                         <center>
                                                            <h6> No More Records </h6>
                                                         </center>
                                                      </td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </div>
                                       </div>
                                       <div class="table-responsive">
                                          <div class="col-md-12" ng-show="filteredItems > 0">
                                             <div pagination="" max-size="maxSize" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane tabs-animation fade active show in" id="tab-content-1" role="tabpanel">
                              <div class="row mob" >
                                 <div class="col-md-12">
                                    <div class="main-card mb-3" ng-controller="customersCrtl2">
                                       <div class="col-md-12" >
                                          <div class="" style="font-size: 13px;">
                                             <table class="table table-striped table-bordered">
                                                <thead>
                                                   <tr>
                                                      <th class="text-center">Image<br>Name<br>Patient Id</th>
                                                      <th class="text-center">Date<br>Mobile No<br>Email</th>
                                                      <!-- <th class="text-center">Email</th> -->
                                                      <th class="text-center">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                   <tr>
                                                      <td colspan="2"> <input style="width:100%;" type="text" ng-model="search" ng-change="filter1()" placeholder="Search All Fields" class="form-control" /> </td>
                                                   </tr>
                                                   <tr ng-show="filteredItems > 0" ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit" id="data.patient_id">
                                                      <td class="text-center" ng-if="data.gender == 'male' || data.gender == 'Male'">
                                                         <!--<img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/boy.png" alt="">-->
                                                         <span ng-if="data.photo">
                                                         <img width="40" class="" src="<?php echo base_url() ?>uploads/patient/{{data.photo}}">
                                                         </span>
                                                         <span ng-if="data.photo == ''">
                                                         <img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/boy.png" alt="" >
                                                         </span>
                                                         <br>
                                                         <?Php $edit = explode(",",$this->session->userdata('edit'));
                                                            if(in_array("1",$edit) || $this->session->userdata('user_login')== false){
                                                            ?>
                                                         <a href="<?php echo base_url().'client/patient/view/' ?>{{data.patient_id}}"> {{data.first_name}}  {{data.last_name}}</a>
                                                         <?php } else { ?>
                                                         <a> {{data.first_name}}  {{data.last_name}}</a>
                                                         <?php } ?>
                                                         <br>
                                                         <div class="badge badge-pill badge-info">{{data.patient_code}}</div>
                                                      </td>
                                                      <td class="text-center" ng-if="data.gender != 'male' && data.gender != 'Male'">
                                                         <!--<img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/girl.png" alt="">-->
                                                         <span ng-if="data.photo">
                                                         <img width="40" class="rounded-circle" src="<?php echo base_url() ?>uploads/patient/{{data.photo}}">
                                                         </span>
                                                         <span ng-if="data.photo == ''">
                                                         <img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/girl.png" alt="" >
                                                         </span>
                                                         <br>
                                                         <?Php $edit = explode(",",$this->session->userdata('edit'));
                                                            if(in_array("1",$edit) || $this->session->userdata('user_login')== false){
                                                            ?>
                                                         <a href="<?php echo base_url().'client/patient/view/' ?>{{data.patient_id}}"> {{data.first_name}}  {{data.last_name}}</a>
                                                         <?php } else { ?>
                                                         <a> {{data.first_name}}  {{data.last_name}}</a>
                                                         <?php } ?>
                                                         <br>
                                                         <div class="badge badge-pill badge-info">{{data.patient_code}}</div>
                                                      </td>

                                                      <td class="text-center text-muted">
                                                         {{data.appoint_date}}
                                                         <br>
                                                         <a href="https://api.whatsapp.com/send?l=en&phone=91{{data.mobile_no}}" target="_blank"><img src="<?php echo base_url().'img/whatsapp Logo.png' ?>" style="width:18px; height:18px;" ></img> {{data.mobile_no}}</a>
                                                         <br><span style="white-space: normal; max-width: 150px; overflow: hidden; text-overflow: ellipsis; display: inline-block;">{{data.email}}</span>
                                                      </td>

                                                      <td class="text-center">
                                                         <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" ng-click="confirm2(data.patient_id,data.first_name)" data-toggle="tooltip" data-placement="top" title="Confirm"><i class="fa fa-edit"></i></button>
                                                         <?Php $delete = explode(",",$this->session->userdata('delete'));
                                                            if(in_array("1",$delete) || $this->session->userdata('user_login')== false){
                                                            ?>
                                                         <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete2" data-toggle="tooltip" data-placement="top" title="Delete" ng-click="delete2(data.patient_id,data.first_name)"><i class="fa fa-trash-alt"> </i></button>
                                                         <?Php } ?>
                                                      </td>
                                                   </tr>
                                                   <tr ng-show="filteredItems < 10">
                                                      <td colspan="11">
                                                         <center>
                                                            <h6> No More Records </h6>
                                                         </center>
                                                      </td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </div>
                                       </div>
                                       <div class="table-responsive">
                                          <div class="col-md-12" ng-show="filteredItems > 0">
                                             <div pagination="" max-size="maxSize" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row mob_none">
                                 <div class="col-md-12" ng-controller="customersCrtl">
                                    <div class="table-responsive">
                                       <table class="table table-striped table-bordered">
                                          <thead>
                                             <tr>
                                                <th class="text-center">Image</th>
                                                <th class="text-center">Date</th>
                                                <th class="text-center">Patient Id</th>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Mobile No</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Action</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                <td colspan="9"> <input style="width:100%;" type="text" ng-model="search" ng-change="filter()" placeholder="Search All Fields" class="form-control" /> </td>
                                             </tr>
                                             <tr ng-show="filteredItems > 0" ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit" id="data.patient_id">
                                                <!--<td class="text-center" ng-if="data.gender == 'male' || data.gender == 'Male'">
                                                   <img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/boy.png" alt="">
                                                   </td>
                                                   <td class="text-center" ng-if="data.gender != 'male' && data.gender != 'Male'">
                                                   <img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/girl.png" alt="">
                                                   </td>-->
                                                <td class="text-center" ng-if="data.gender == 'male' || data.gender == 'Male'">
                                                   <!--<img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/boy.png" alt="">-->
                                                   <span ng-if="data.photo">
                                                   <img width="40" class="" src="<?php echo base_url() ?>uploads/patient/{{data.photo}}">
                                                   </span>
                                                   <span ng-if="data.photo == ''">
                                                   <img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/boy.png" alt="" >
                                                   </span>
                                                </td>
                                                <td class="text-center" ng-if="data.gender != 'male' && data.gender != 'Male'">
                                                   <!--<img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/girl.png" alt="">-->
                                                   <span ng-if="data.photo">
                                                   <img width="40" class="rounded-circle" src="<?php echo base_url() ?>uploads/patient/{{data.photo}}">
                                                   </span>
                                                   <span ng-if="data.photo == ''">
                                                   <img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/girl.png" alt="" >
                                                   </span>
                                                </t font-size: 12px;d>
                                                <td class="text-center">{{data.appoint_date}}</td>
                                                <td class="text-center text-muted">
                                                   <div class="badge badge-pill badge-info">{{data.patient_code}}</div>
                                                   </a>
                                                </td>
                                                <td class="text-center">
                                                   <?Php $edit = explode(",",$this->session->userdata('edit'));
                                                      if(in_array("1",$edit) || $this->session->userdata('user_login')== false){
                                                      ?><a href="<?php echo base_url().'client/patient/view/' ?>{{data.patient_id}}"><img src="<?php echo base_url().'img/pngwing.png' ?>" style="width:30px; height:30px;" ></img> {{data.first_name}}  {{data.last_name}}</a>
                                                   <?php } else { ?><img src="<?php echo base_url().'img/pngwing.png' ?>" style="width:30px; height:30px;" ></img>  {{data.first_name}}  {{data.last_name}}
                                                   <?php } ?>
                                                </td>
                                                <td class="text-center"><a href="https://api.whatsapp.com/send?l=en&phone=91{{data.mobile_no}}" target="_blank"><img src="<?php echo base_url().'img/whatsapp Logo.png' ?>" style="width:18px; height:18px;" ></img> {{data.mobile_no}}</a></td>
                                                <td class="text-center">{{data.email}}</td>
                                                <td class="text-center">
                                                   <a href="<?php echo base_url().'client/invoice/add/Pt/'; ?>{{data.patient_id}}"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Invoice"><i class="fa fa-file"></i></button></a>
                                                   <a href="<?php echo base_url().'client/renewal/print_reports/'.$this->session->userdata('client_id').'/'; ?>{{data.patient_id}}" target="_blank"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-alternate" data-toggle="tooltip" data-placement="top" title="Reports"><i class="fa fa-print"></i></button></a>
                                                   <a class="edit" href="<?php echo base_url().'client/reports/report_session/'; ?>{{data.patient_id}}"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Daily Register"><i class="fa fa-edit"></i></button></a>
                                                   <?Php $delete = explode(",",$this->session->userdata('delete'));
                                                      if(in_array("1",$delete) || $this->session->userdata('user_login')== false){
                                                      ?>    
                                                   <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete" ng-click="delete(data.patient_id,data.first_name)"><i class="fa fa-trash-alt"> </i></button>
                                                   <?php } ?>
                                                </td>
                                             </tr>
                                             <tr ng-show="filteredItems < 10">
                                                <td colspan="11">
                                                   <center>
                                                      <h6> No More Records </h6>
                                                   </center>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                    <div class="col-md-12" ng-show="filteredItems > 0">
                                       <div pagination="" page="currentPage" max-size="maxSize" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
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
      </div>
      <script type="text/javascript" src="<?php echo base_url()?>my_assets/assets/scripts/main.js"></script>
   </body>
   <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/moment.js'></script>
   <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
   <script src="https://select2.github.io/select2-bootstrap-theme/js/bootstrap.min.js"></script>
   <script src="https://select2.github.io/select2-bootstrap-theme/js/anchor.min.js"></script>
   <script src="<?php echo base_url() ?>assets/search-js/angular.min.js"></script>
   <script src="<?php echo base_url() ?>assets/search-js/ui-bootstrap-tpls-0.10.0.min.js"></script>
   <script>
      var app = angular.module('myApp', ['ui.bootstrap']);
      
      app.filter('startFrom', function() {
          return function(input, start) {
              if(input) {
                  start = +start; //parse to int
                  return input.slice(start);
              }
              return [];
          }
      });
      app.controller('customersCrtl', function ($scope, $http, $timeout) {
          $http.get('<?php echo base_url().'client/patient/getpatient'; ?>').success(function(data){
              $scope.list = data;
              $scope.currentPage = 1; //current page
              $scope.entryLimit = 5; //max no of items to display in a page
              $scope.maxSize = 5;
            $scope.filteredItems = $scope.list.length; //Initially for no filter  
              $scope.totalItems = $scope.list.length;
          });
          $scope.setPage = function(pageNo) {
              $scope.currentPage = pageNo;
          };
          $scope.filter = function() {
              $timeout(function() { 
                  $scope.filteredItems = $scope.filtered.length;
              }, 5);
          };
         $scope.delete = function($patient_id,$first_name) {
            var utl= '<?php echo base_url().'client/patient/delete' ?>';
            swal({
                title: "Are you sure?",
                text: "You will be able to delete this "+$first_name+" Record!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn-danger',
                confirmButtonText: 'Yes, delete it!',
                closeOnConfirm: false,
              },
              function(){
               $.ajax({
                  type: 'post',
                  url: utl,
                  data : {p_id:$patient_id},
                  dataType: 'json', 
                  success:function(data, textStatus, jqXHR,form) 
                  {
                     if(data.status == 'success') {
                       swal("Deleted!", $first_name +" Records has been deleted!", "success");
                     }
                     setTimeout(function(){ 
                           window.location.reload();
                     }, 1000);
                  },
                  error: function(jqXHR, textStatus, errorThrown) 
                  {
                     setTimeout(function(){ 
                           window.location.reload();
                     }, 1000);
                  }
                 });  
              });   
         };
          $scope.sort_by = function(predicate) {  
              $scope.predicate = predicate;
              $scope.reverse = !$scope.reverse;
          };
      });
      app.controller('customersCrtl2', function ($scope, $http, $timeout) {
          $http.get('<?php echo base_url().'client/patient/getreqpatient'; ?>').success(function(data){
              $scope.list = data;
              $scope.currentPage = 1; //current page
              $scope.entryLimit = 5; //max no of items to display in a page
              $scope.maxSize = 5;
            $scope.filteredItems = $scope.list.length; //Initially for no filter  
              $scope.totalItems = $scope.list.length;
            
          });
          $scope.setPage = function(pageNo) {
              $scope.currentPage = pageNo;
          };
          $scope.filter = function() {
              $timeout(function() { 
                  $scope.filteredItems = $scope.filtered.length;
              }, 5);
          };
         $scope.delete2 = function($patient_id,$first_name) {
            var utl= '<?php echo base_url().'client/patient/delete' ?>';
            swal({
                title: "Are you sure?",
                text: "You will be able to delete this "+$first_name+" Record!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn-danger',
                confirmButtonText: 'Yes, delete it!',
                closeOnConfirm: false,
              },
              function(){
               $.ajax({
                  type: 'post',
                  url: utl,
                  data : {p_id:$patient_id},
                  dataType: 'json', 
                  success:function(data, textStatus, jqXHR,form) 
                  {
                     if(data.status == 'success') {
                       swal("Deleted!", $first_name +" Records has been deleted!", "success");
                     }
                     setTimeout(function(){ 
                           window.location.reload();
                     }, 1000);
                  },
                  error: function(jqXHR, textStatus, errorThrown) 
                  {
                     setTimeout(function(){ 
                           window.location.reload();
                     }, 1000);
                  }
                 });  
              });   
         };
         $scope.confirm2 = function($patient_id,$first_name) {
            var utl= '<?php echo base_url().'client/patient/req_confirm' ?>';
            swal({
                title: "Are you sure?",
                text: $first_name +" will be added to a patient list",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn-warning',
                confirmButtonText: 'Yes, confirm it!',
                closeOnConfirm: false,
              },
              function(){
               $.ajax({
                  type: 'post',
                  url: utl,
                  data : {p_id:$patient_id},
                  dataType: 'json', 
                  success:function(data, textStatus, jqXHR,form) 
                  {
                     if(data.status == 'success') {
                       swal("Confirmed!", $first_name +" Records has been deleted!", "success");
                     }
                     setTimeout(function(){ 
                           window.location.reload();
                     }, 1000);
                  },
                  error: function(jqXHR, textStatus, errorThrown) 
                  {
                     setTimeout(function(){ 
                        // window.location.reload();
                     }, 1000);
                  }
                 });  
              });   
         };
          $scope.sort_by = function(predicate) {  
              $scope.predicate = predicate;
              $scope.reverse = !$scope.reverse;
          };
      });
      app.controller('customersCrtl1', function ($scope, $http, $timeout) {
          $http.get('<?php echo base_url().'client/patient/gethomepatient'; ?>').success(function(data){
              $scope.list = data;
              $scope.currentPage = 1; //current page
              $scope.entryLimit = 5; //max no of items to display in a page
              $scope.maxSize = 5;  
            $scope.filteredItems = $scope.list.length; //Initially for no filter  
              $scope.totalItems = $scope.list.length;
            
          });
          $scope.setPage = function(pageNo) {
              $scope.currentPage = pageNo;
          };
          $scope.filter1 = function() {
              $timeout(function() { 
                  $scope.filteredItems = $scope.filtered.length;
              }, 5);
          };
         $scope.delete1 = function($patient_id,$first_name) {
            var utl= '<?php echo base_url().'client/patient/delete' ?>';
            swal({
                title: "Are you sure?",
                text: "You will be able to delete this "+$first_name+" Record!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn-danger',
                confirmButtonText: 'Yes, delete it!',
                closeOnConfirm: false,
              },
              function(){
               $.ajax({
                  type: 'post',
                  url: utl,
                  data : {p_id:$patient_id},
                  dataType: 'json', 
                  success:function(data, textStatus, jqXHR,form) 
                  {
                     if(data.status == 'success') {
                       swal("Deleted!", $first_name + " Records has been deleted!", "success");
                     }
                     setTimeout(function(){ 
                           window.location.reload();
                     }, 1000);
                  },
                  error: function(jqXHR, textStatus, errorThrown) 
                  {
                     setTimeout(function(){ 
                           window.location.reload();
                     }, 1000);
                  }
                 });  
              });   
         };
          $scope.sort_by = function(predicate) {  
              $scope.predicate = predicate;
              $scope.reverse = !$scope.reverse;
          };
      });
   </script>
   <!--Start of Tawk.to Script-->
   <script type="text/javascript">
      var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
      (function(){
      var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
      s1.async=true;
      s1.src='https://embed.tawk.to/5eceda798ee2956d73a53d09/default';
      s1.charset='UTF-8';
      s1.setAttribute('crossorigin','*');
      s0.parentNode.insertBefore(s1,s0);
      })();
   </script>
   <!--End of Tawk.to Script-->
   </body>
</html>