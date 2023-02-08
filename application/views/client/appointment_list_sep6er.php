<!doctype html>
<html ng-app="myApp" ng-app lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Schedule Management - Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"    />
    <meta name="msapplication-tap-highlight" content="no">
	<script src="<?php echo base_url() ?>assets/sweet-alert/sweetalert.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/sweet-alert/sweetalert.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
    <link href="<?php echo base_url()?>my_assets/main.css" rel="stylesheet">
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
                         
				<?php include("sidebar.php");?>
             <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="tabs-animation">
                        <div class="row" ng-controller="customersCrtl">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                     <div class="row">
									<div class="col-85" style="width:80%;">
                                    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
									   <li class="nav-item">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									   </li>
									   <li class="nav-item active">
											<a role="tab" class="nav-link active show" href="#tab-content-0" id="tab-1" data-toggle="tab" aria-selected="true">
												<span>Appointments List </span>
											</a>
										</li>
										<li class="nav-item">
											<a role="tab" class="nav-link show" href="#tab-content-1" id="tab-0" data-toggle="tab" aria-selected="false">
												<span>Cancelled Appointments List </span>
											</a>
										</li>
										<li class="nav-item">
											<a role="tab" class="nav-link show" href="#tab-content-2" id="tab-0" data-toggle="tab" aria-selected="false">
												<span>Appointment Requests</span>
											</a>
										</li>
										
									</ul></div>
									<?Php $create = explode(",",$this->session->userdata('create'));
										if(in_array("5",$create) || $this->session->userdata('user_login')== false){
									?>
									<div class="col" style="float:right;"></br><div style="float:right;" ><a class="btn btn-shadow btn-warning" href="<?php echo base_url().'client/schedule/appointment' ?>" ><strong>Add New Appointment</strong></a>
														&nbsp;&nbsp;&nbsp;</div>
									</div>
										<?php } ?>
									</div> 
									<div class="tab-content">
									<div class="tab-pane tabs-animation fade active show in" id="tab-content-0" role="tabpanel">
                                    <div class="row mob" ng-controller="customersCrtl">
											<div class="col-md-12">
												<div class="main-card mb-3">
													<div class="col-md-12" >
													<div class="table-responsive">
														<table class="table table-striped table-bordered">
														 <tr>
																 
																<th class="text-center">Date
																<br>Patient Name<br>
																 Time</th>
																<th class="text-center">Visit Status <br>
																Bill Status <br>
																Consultant Name</th>
																<th class="text-center">Action</th>
														</tr>
														<tbody>
														<tr><td colspan="3"> <input style="width:100%;" type="text" ng-model="search" ng-change="filter()" placeholder="Search All Fields" class="form-control" /> </td>
														</tr>
															<tr ng-show="filteredItems > 0" ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit" id="data.appointment_id">
																 
																<td class="text-center"><i class="fa fa-business-time"></i>&nbsp;&nbsp;{{data.appointment_from}}</td>
																
																<br>
																<?Php $edit = explode(",",$this->session->userdata('edit'));
																	if(in_array("1",$edit) || $this->session->userdata('user_login')== false){
																?>
																<a href="<?php echo base_url().'client/patient/view/' ?>{{data.patient_id}}"><img src="<?php echo base_url().'img/pngwing.png' ?>" style="width:30px; height:30px;" ></img>{{data.title}}</a>
																	<?Php } else { ?><img src="<?php echo base_url().'img/pngwing.png' ?>" style="width:30px; height:30px;" ></img>{{data.title}}
																	<?php } ?>
																
																<br>{{data.start.split(' ')[1].split(':')[0]}}:{{data.start.split(' ')[1].split(':')[1]}} To {{data.end.split(' ')[1].split(':')[0]}}:{{data.end.split(' ')[1].split(':')[1]}} &nbsp;<div ng-if="data.bill_id != '0' && data.order_id.split('/')[1] != '1'" class="badge badge-pill badge-warning" data-toggle="tooltip" data-placement="top" title="Appointment No : {{data.order_id.split('/')[0]}} of total {{data.order_id.split('/')[1]}} Appointments">{{data.order_id}}</div></td>
																
                                                                                                                                <td style="display:none">{{data.start}}</td>
																
                                                                <td class="text-center"><span ng-if="data.visit == '0'">
																  <div class="badge badge-pill badge-danger">Not Visited</div>
																</span> <br>
																<span  ng-if="data.visit != '0'">
																	<div class="badge badge-pill badge-success">Visited</div>
																</span><br>
																<span ng-if="data.bill_id == 0">
																		<a href="<?php echo base_url().'client/invoice/add/Pt/'; ?>{{data.patient_id}}/{{data.appointment_id}}" ><div class="badge badge-pill badge-primary">Make Bill</div></a>
																</span><br>
																<span ng-if="data.bill_id != 0">
																	<div ng-if="data.bill_status == 1"><div class="badge badge-pill badge-alternate">Paid</div></div>
																	<a href="<?php echo base_url().'client/invoice/invoice_status_update/'; ?>{{data.bill_id}}/{{data.patient_id}}" ><div ng-if="data.bill_status != 1"><div class="badge badge-pill badge-secondary">Make Payment</div></div></a>
																 </span>
																{{data.staff_name}} {{data.staff_lname}}</td>
																<td class="text-center">    
																<a  ng-if="data.encounter_type == '2'" target="_blank" href="<?php echo base_url().'client/telehealthroom/join/' ?>{{data.appointment_id}}/{{data.patient_id}}/{{data.chat_room}}"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-alternate" data-toggle="tooltip" data-placement="top" title="Video Calling"><i class="fa fa-video"> </i></button></a>  
																<?Php $edit = explode(",",$this->session->userdata('edit'));
																	if(in_array("5",$edit) || $this->session->userdata('user_login')== false){
																?>
																<a href="<?php echo base_url().'client/schedule/reschedule1/' ?>{{data.appointment_id}}"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Reschedule"><i class="fa fa-pencil-square-o"> </i></button></a>
																<?php } ?>
																<!--<button ng-if="data.visit == '0'" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success" data-toggle="tooltip" ng-click="visit(data.appointment_id,data.title)" data-placement="top" title="Change Visit Status"><i class="fa fa-check"></i></button> -->
																<span ng-if="data.item_id != '0'">
																<button ng-if="data.visit == '0'" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success" data-toggle="tooltip" ng-click="visit(data.appointment_id,data.title)" data-placement="top" title="Change Visit Status"><i class="fa fa-check"></i></button>
																</span>
																<span ng-if="data.item_id == '0'">
																<a ng-if="data.visit == '0'" 
																href="<?php echo base_url().'client/reports/report_session/' ?>{{data.patient_id}}/{{data.staff_id}}"
																class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success" data-toggle="tooltip"  data-placement="top" title="Change Visit Status"><i class="fa fa-check"></i></a>
																</span>	 
																<?Php $delete = explode(",",$this->session->userdata('delete'));
																	if(in_array("5",$delete) || $this->session->userdata('user_login')== false){
																?>
																<button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete" ng-click="delete(data.appointment_id,data.title)"><i class="fa fa-trash-alt"> </i></button>
																	<?php } ?> 
																<button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="Whatsapp Reminder" ng-click="send(data.start,data.mobile_no,data.staff_name)"><img style="width:23px; height:23px;" src="<?php echo base_url().'img/whatsapp Logo.png' ?>" > </img></button>
																<a ng-if="data.link != ''" href="{{data.link}}" target="_blank" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="Google Meet"><img style="width:23px; height:23px;" src="<?php echo base_url().'img/googleMeet.png' ?>" > </img></a>		
																</td>
															 </tr>
															  <tr ng-if="filteredItems < 10">
															 <td colspan="11"><center><h6> No More Records </h6></center></td>
															 </tr>
														</tbody>
														</table>
														
													
													<div class="col-md-12" ng-show="filteredItems > 0">    
														<div pagination="" max-size="maxSize" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
													</div>
													</div>
													</div>
												  </div>
											</div>
										</div>
                                    
                                    
									   <div class="row mob_none" ng-controller="customersCrtl">
											<div class="col-md-12">
												<div class="main-card mb-3">
													<div class="col-md-12" >
													<div class="table-responsive">
														<table class="table table-striped table-bordered">
														 <tr>
																 
																<th class="text-center">Date</th>
																<th class="text-center">Patient Name</th>
																<th class="text-center">Time</th>
																<th class="text-center">Visit Status</th>
																<th class="text-center">Bill Status</th>
																<th class="text-center">Consultant Name</th>
																<th class="text-center">Action</th>
														</tr>
														<tbody>
														<tr><td colspan="8"> <input style="width:100%;" type="text" ng-model="search" ng-change="filter()" placeholder="Search All Fields" class="form-control" /> </td>
														</tr>
															<tr ng-show="filteredItems > 0" ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit" id="data.appointment_id">
																 
																<td style="width:120px;" class="text-center"><i class="fa fa-business-time"></i>&nbsp;&nbsp;{{data.appointment_from}}</td>
																
																<td class="text-center">
																<?Php $edit = explode(",",$this->session->userdata('edit'));
																	if(in_array("1",$edit) || $this->session->userdata('user_login')== false){
																?>
																<a href="<?php echo base_url().'client/patient/view/' ?>{{data.patient_id}}"><img src="<?php echo base_url().'img/pngwing.png' ?>" style="width:30px; height:30px;" ></img>{{data.title}}</a>
																	<?Php } else { ?><img src="<?php echo base_url().'img/pngwing.png' ?>" style="width:30px; height:30px;" ></img>{{data.title}}
																	<?php } ?>
																</td>
																<td class="text-center">{{data.start.split(' ')[1].split(':')[0]}}:{{data.start.split(' ')[1].split(':')[1]}} To {{data.end.split(' ')[1].split(':')[0]}}:{{data.end.split(' ')[1].split(':')[1]}} &nbsp;<div ng-if="data.bill_id != '0' && data.order_id.split('/')[1] != '1'" class="badge badge-pill badge-warning" data-toggle="tooltip" data-placement="top" title="Appointment No : {{data.order_id.split('/')[0]}} of total {{data.order_id.split('/')[1]}} Appointments">{{data.order_id}}</div></td>
																
                                                                                                                                <td style="display:none">{{data.start}}</td>
																<td class="text-center" ng-if="data.visit == '0'">
																  <div class="badge badge-pill badge-danger">Not Visited</div>
																</td>
																<td class="text-center" ng-if="data.visit != '0'">
																	<div class="badge badge-pill badge-success">Visited</div>
																</td>
																<td class="text-center" ng-if="data.bill_id == 0">
																		<a href="<?php echo base_url().'client/invoice/add/Pt/'; ?>{{data.patient_id}}/{{data.appointment_id}}" ><div class="badge badge-pill badge-primary">Make Bill</div></a>
																</td>
																<td class="text-center" ng-if="data.bill_id != 0">
																	<div ng-if="data.bill_status == 1"><div class="badge badge-pill badge-alternate">Paid</div></div>
																	<a href="<?php echo base_url().'client/invoice/invoice_status_update/'; ?>{{data.bill_id}}/{{data.patient_id}}" ><div ng-if="data.bill_status != 1"><div class="badge badge-pill badge-secondary">Make Payment</div></div></a>
																</td>
																<td class="text-center">{{data.staff_name}} {{data.staff_lname}}</td>
																<td class="text-center">    
																<a  ng-if="data.encounter_type == '2'" target="_blank" href="<?php echo base_url().'client/telehealthroom/join/' ?>{{data.appointment_id}}/{{data.patient_id}}/{{data.chat_room}}"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-alternate" data-toggle="tooltip" data-placement="top" title="Video Calling"><i class="fa fa-video"> </i></button></a>  
																<?Php $edit = explode(",",$this->session->userdata('edit'));
																	if(in_array("5",$edit) || $this->session->userdata('user_login')== false){
																?>
																<a href="<?php echo base_url().'client/schedule/reschedule1/' ?>{{data.appointment_id}}"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Reschedule"><i class="fa fa-pencil-square-o"> </i></button></a>
																<?php } ?>
																<!--<button ng-if="data.visit == '0'" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success" data-toggle="tooltip" ng-click="visit(data.appointment_id,data.title)" data-placement="top" title="Change Visit Status"><i class="fa fa-check"></i></button> -->
																<span ng-if="data.item_id != '0'">
																<button ng-if="data.visit == '0'" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success" data-toggle="tooltip" ng-click="visit(data.appointment_id,data.title)" data-placement="top" title="Change Visit Status"><i class="fa fa-check"></i></button>
																</span>
																<span ng-if="data.item_id == '0'">
																<a ng-if="data.visit == '0'" 
																href="<?php echo base_url().'client/reports/report_session/' ?>{{data.patient_id}}/{{data.staff_id}}"
																class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success" data-toggle="tooltip"  data-placement="top" title="Change Visit Status"><i class="fa fa-check"></i></a>
																</span>	 
																<?Php $delete = explode(",",$this->session->userdata('delete'));
																	if(in_array("5",$delete) || $this->session->userdata('user_login')== false){
																?>
																<button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete" ng-click="delete(data.appointment_id,data.title)"><i class="fa fa-trash-alt"> </i></button>
																	<?php } ?> 
																<button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="Whatsapp Reminder" ng-click="send(data.start,data.mobile_no,data.staff_name)"><img style="width:23px; height:23px;" src="<?php echo base_url().'img/whatsapp Logo.png' ?>" > </img></button>
																<a ng-if="data.link != ''" href="{{data.link}}" target="_blank" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="Google Meet"><img style="width:23px; height:23px;" src="<?php echo base_url().'img/googleMeet.png' ?>" > </img></a>		
																</td>
															 </tr>
															  <tr ng-if="filteredItems < 10">
															 <td colspan="11"><center><h6> No More Records </h6></center></td>
															 </tr>
														</tbody>
														</table>
														
													
													<div class="col-md-12" ng-show="filteredItems > 0">    
														<div pagination="" max-size="maxSize" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
													</div>
													</div>
													</div>
												  </div>
											</div>
										</div>
									</div>
									<div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
									<div class="row" ng-controller="customersCrtl1">
									<div class="col-md-12">
										<div class="main-card mb-3">
										   <div class="col-md-12" >
											<div class="table-responsive">
												<table class="table table-striped table-bordered">
												 <tr>
														 <th class="text-center">Date </th>
														<th class="text-center">Patient Name</th>
														<th class="text-center">Time</th>
														<th class="text-center">Bill Status</th>
														<th class="text-center">Consultant Name</th>
														<th class="text-center">Action</th>
												</tr>
												<tbody>
												<tr><td colspan="8"> <input style="width:100%;" type="text" ng-model="search" ng-change="filter1()" placeholder="Search All Fields" class="form-control" /> </td>
												</tr>
													<tr ng-show="filteredItems > 0" ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
														 
														<td style="width:120px;" class="text-center"><i class="fa fa-business-time"></i>&nbsp;&nbsp;{{data.appointment_from}}</td>
														<td class="text-center">
														<?Php $edit = explode(",",$this->session->userdata('edit'));
																	if(in_array("1",$edit) || $this->session->userdata('user_login')== false){
																?>
														<a href="<?php echo base_url().'client/patient/view/' ?>{{data.patient_id}}"><img src="<?php echo base_url().'img/pngwing.png' ?>" style="width:30px; height:30px;" ></img>{{data.title}}</a>
																	<?php } else { ?><img src="<?php echo base_url().'img/pngwing.png' ?>" style="width:30px; height:30px;" ></img>{{data.title}}<?php } ?>
														</td><td class="text-center">{{data.start.split(' ')[1].split(':')[0]}}:{{data.start.split(' ')[1].split(':')[1]}} To {{data.end.split(' ')[1].split(':')[0]}}:{{data.end.split(' ')[1].split(':')[1]}} &nbsp;<div ng-if="data.bill_id != '0'" class="badge badge-pill badge-warning" data-toggle="tooltip" data-placement="top" title="Appointment No : {{data.order_id.split('/')[0]}} of total {{data.order_id.split('/')[1]}} Appointments">{{data.order_id}}</div></p></td>
														</td>
														<td class="text-center" ng-if="data.bill_id == 0">
																<a href="<?php echo base_url().'client/invoice/add/Pt/'; ?>{{data.patient_id}}/{{data.appointment_id}}" ><div class="badge badge-pill badge-primary">Make Bill</div></a>
														</td>
														<td class="text-center" ng-if="data.bill_id != 0">
															<div ng-if="data.bill_status == 1"><div class="badge badge-pill badge-alternate">Paid</div></div>
															<a href="<?php echo base_url().'client/invoice/invoice_status_update/'; ?>{{data.bill_id}}/{{data.patient_id}}" ><div ng-if="data.bill_status != 1"><div class="badge badge-pill badge-secondary">Make Payment</div></div></a>
														</td>
														<td class="text-center">{{data.staff_name}} {{data.staff_lname}}</td>
														<td class="text-center">
														<?Php $edit = explode(",",$this->session->userdata('edit'));
																	if(in_array("5",$edit) || $this->session->userdata('user_login')== false){
																?>
														<a href="<?php echo base_url().'client/schedule/reschedule1/' ?>{{data.appointment_id}}"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Reschedule"><i class="fa fa-pencil-square-o"> </i></button></a>
																	<?Php } $delete = explode(",",$this->session->userdata('delete'));
																	if(in_array("5",$delete) || $this->session->userdata('user_login')== false){
																?>
														<button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete1" data-toggle="tooltip" data-placement="top" title="Delete" ng-click="delete1(data.appointment_id,data.title)"><i class="fa fa-trash-alt"> </i></button>
																	<?php } ?></td>
													 </tr>
													 <tr ng-if="filteredItems < 10">
													 <td colspan="11"><center><h6>No More Records</h6></center></td>
													 </tr>
												</tbody>
												</table>
												</div>
											</div>
														<div class="col-md-12" ng-show="filteredItems > 0">    
															<div pagination="" max-size="maxSize" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
														</div>
													  </div>
												</div>
											</div>	
										   </div>
										   <div class="tab-pane tabs-animation fade show" id="tab-content-2" role="tabpanel">
									   <div class="row" ng-controller="customersCrtl2">  
											<div class="col-md-12">
												<div class="main-card mb-3">
													<div class="col-md-12" >
													<div class="table-responsive">
														<table class="table table-striped table-bordered">
														 <tr>
																 
																<th class="text-center">Date</th>
																<th class="text-center">Patient Name</th>
																<th class="text-center">Time</th>
																<th class="text-center">Action</th>
														</tr>
														<tbody>
														<tr><td colspan="8"> <input style="width:100%;" type="text" ng-model="search" ng-change="filter()" placeholder="Search All Fields" class="form-control" /> </td>
														</tr>
															<tr ng-show="filteredItems > 0" ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit" id="data.appointment_id">
																 
																<td style="width:120px;" class="text-center"><i class="fa fa-business-time"></i>&nbsp;&nbsp;{{data.appointment_from}}</td>
																
																<td class="text-center">
																<?Php $edit = explode(",",$this->session->userdata('edit'));
																	if(in_array("1",$edit) || $this->session->userdata('user_login')== false){
																?>
																<a href="<?php echo base_url().'client/patient/view/' ?>{{data.patient_id}}"><img src="<?php echo base_url().'img/pngwing.png' ?>" style="width:30px; height:30px;" ></img>{{data.title}}</a>
																<?Php } else {  ?><img src="<?php echo base_url().'img/pngwing.png' ?>" style="width:30px; height:30px;" ></img> {{data.title}}
																<?php } ?></td>
																<td class="text-center">{{data.start.split(' ')[1].split(':')[0]}}:{{data.start.split(' ')[1].split(':')[1]}} To {{data.end.split(' ')[1].split(':')[0]}}:{{data.end.split(' ')[1].split(':')[1]}} &nbsp;<div ng-if="data.bill_id != '0' && data.order_id.split('/')[1] != '1'" class="badge badge-pill badge-warning" data-toggle="tooltip" data-placement="top" title="Appointment No : {{data.order_id.split('/')[0]}} of total {{data.order_id.split('/')[1]}} Appointments">{{data.order_id}}</div></p></td>
																</td>
																<td class="text-center">  
																<?Php $edit = explode(",",$this->session->userdata('edit'));
																	if(in_array("5",$edit) || $this->session->userdata('user_login')== false){
																?>
																<a href="<?php echo base_url().'client/schedule/reschedule1/' ?>{{data.appointment_id}}"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Reschedule"><i class="fa fa-pencil-square-o"> </i></button></a>
																	<?php } ?><button ng-if="data.visit == '0'" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success" data-toggle="tooltip" ng-click="confirm(data.appointment_id)" data-placement="top" title="Confirm Appointment"><i class="fa fa-check"></i></button>  
																</td>  
															 </tr>
															  <tr ng-if="filteredItems < 10">
															 <td colspan="11"><center><h6> No More Records </h6></center></td>
															 </tr>
														</tbody> 
														</table>
														
													
													<div class="col-md-12" ng-show="filteredItems > 0">    
														<div pagination="" max-size="maxSize" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
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
                         </div>
                      </div>
                    </div>
<script type="text/javascript" src="<?php echo base_url()?>my_assets/assets/scripts/main.js"></script></body>
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
    $http.get('<?php echo base_url().'client/schedule/getappointment'; ?>').success(function(data){
        $scope.list = data;
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 10; //max no of items to display in a page
        $scope.maxSize = 10;
		$scope.filteredItems = $scope.list.length; //Initially for no filter  
        $scope.totalItems = $scope.list.length;
    });
    $scope.setPage = function(pageNo) {
        $scope.currentPage = pageNo;
    };
    $scope.filter = function() {
        $timeout(function() { 
            $scope.filteredItems = $scope.filtered.length;
        }, 10);
    };
	$scope.send = function($start,$mobile,$staff_name) {
		var clinic = '<?php echo $this->session->userdata('clinic_name'); ?>';
                if(clinic.includes("&"))
                 {
                 var clinic_name=clinic.replaceAll("&","and");
                 }
                else
                {
                 var clinic_name=clinic;
                 }
                var mobile = '<?php echo $this->session->userdata('mobile'); ?>';
                var clinic_map = '<?php echo $this->session->userdata('map'); ?>';
                var rose= '<?php echo json_decode('"\uE155"');?>';
                var plus= '<?php echo json_decode('"\u002B"');?>';
		var map=clinic_map.replaceAll("+","%2B");
               // window.alert(clinic_map);

                $dateval=$start.split(" ");
                var d = new Date($dateval[0]);
                var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                var date=d.toLocaleDateString("en-US", options);
		var startdate=date+" "+$dateval[1];

               var msg="";
                if(clinic_map=="")
               {
               msg='https://web.whatsapp.com/send?phone=91'+$mobile+'&text=Your Physiotherapy appointment on '+startdate+' IST has been scheduled successfully .Please call us on '+mobile+' to give us 24 hours notice to reschedule or cancel the appointment.'+'%0a'+rose+' Regards '+clinic_name;
               //window.alert(msg);

               }
               else
               {
               msg='https://web.whatsapp.com/send?phone=91'+$mobile+'&text=Your Physiotherapy appointment on '+startdate+' IST has been scheduled successfully .Please call us on '+mobile+' to give us 24 hours notice to reschedule or cancel the appointment.'+'%0a'+'Visit us: '+map+'%0a'+rose+' Regards '+clinic_name;
		//window.alert(msg);

               }
                window.open(msg,'_blank');
		//window.open('https://web.whatsapp.com/send?phone=91'+$mobile+'&text=Your Physiotherapy appointment at '+ clinic +' on '+$start+' IST has been successfully scheduled.     Please call us on '+mobile+' to give us 24 hours notice to reschedule or cancel the appointment.', '_blank');
		  
	};
	$scope.visit = function($appointment_id,$title) {
		var utl= '<?php echo base_url().'client/schedule/add_visit' ?>';
		swal({
          title: "Are you sure?",
          text: $title + " has Been Arrived",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-info',
          confirmButtonText: 'Yes',
          closeOnConfirm: false,
        },
        function(){
			$.ajax({
				type: 'post',
				url: utl,
				data : {p_id:$appointment_id},
				dataType: 'json', 
				success:function(data, textStatus, jqXHR,form) 
				{ 
					if(data.status == 'success') {
					  swal("Success!", $title+" status has been changed!", "success");
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
	$scope.delete = function($appointment_id,$title) {
		var utl= '<?php echo base_url().'client/schedule/delete_appointment' ?>';
		swal({
          title: "Are you sure?",
          text: "You will be able to delete this "+ $title +" Appointment!",
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
				data : {p_id:$appointment_id},
				dataType: 'json', 
				success:function(data, textStatus, jqXHR,form) 
				{
					if(data.status == 'success') {
					  swal("Deleted!", $title+" Records has been deleted!", "success");
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
app.controller('customersCrtl1', function ($scope, $http, $timeout) {
    $http.get('<?php echo base_url().'client/schedule/getcancelappointments'; ?>').success(function(data){
        $scope.list = data;  
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 10; //max no of items to display in a page
        $scope.maxSize = 10;
		$scope.filteredItems = $scope.list.length; //Initially for no filter  
        $scope.totalItems = $scope.list.length;
		
    });
    $scope.setPage = function(pageNo) {
         
		$scope.currentPage = pageNo;
    };
    $scope.filter1 = function() {
        $timeout(function() { 
            $scope.filteredItems = $scope.filtered.length;
        }, 10);
    };
	$scope.delete1 = function($appointment_id,$title) {
		var utl= '<?php echo base_url().'client/schedule/del_appointment' ?>';
		swal({
          title: "Are you sure?",
          text: "You will be able to delete this "+ $title +" Appointment",
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
				data : {p_id:$appointment_id},
				dataType: 'json', 
				success:function(data, textStatus, jqXHR,form) 
				{
					if(data.status == 'success') {
					  swal("Deleted!",$title+ " Records has been deleted!", "success");
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
    $http.get('<?php echo base_url().'client/schedule/getrequestappointment'; ?>').success(function(data){
        $scope.list = data;  
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 10; //max no of items to display in a page
        $scope.maxSize = 10;
		$scope.filteredItems = $scope.list.length; //Initially for no filter  
        $scope.totalItems = $scope.list.length;
	
    });
    $scope.setPage = function(pageNo) {
        $scope.currentPage = pageNo;
    };
    $scope.filter1 = function() {
        $timeout(function() { 
            $scope.filteredItems = $scope.filtered.length;
        }, 10);
    };
	$scope.confirm = function($appointment_id,$title) {
		 window.location = '<?php echo base_url().'client/schedule/approve1/exist/' ?>'+$appointment_id;
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
