<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Settings - Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
    <meta name="description" content="Easily create beautiful form multi step wizards!">
       <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

<link href="<?php echo base_url()?>asset_list/main.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url()?>asset/css/summernote.css">
<link rel="stylesheet" href="<?php echo base_url()?>asset/css/summernote-bs3.css">
 <script src="<?php echo base_url() ?>assets/sweet-alert/sweetalert.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/sweet-alert/sweetalert.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
<style>
.note-editor { border: 0; }
.note-editor .note-editable { overflow: auto; background-color: white; }
.note-editor .note-toolbar { border-bottom: 0; background-color: #f2f2f2; -webkit-border-radius: 4px 4px 0 0; -moz-border-radius: 4px 4px 0 0; -ms-border-radius: 4px 4px 0 0; -o-border-radius: 4px 4px 0 0; border-radius: 4px 4px 0 0; }
.note-editor .note-statusbar { background-color: #f2f2f2; -webkit-border-radius: 0 0 4px 4px; -moz-border-radius: 0 0 4px 4px; -ms-border-radius: 0 0 4px 4px; -o-border-radius: 0 0 4px 4px; border-radius: 0 0 4px 4px; }
.note-editor .note-statusbar .note-resizebar { border-top: 1px solid transparent; }

.transparent-editor .note-editor .note-editable { background-color:rgba(192,192,192,0.3); }
.transparent-editor .note-editor .note-toolbar { background-color:rgba(192,192,192,0.3); }
.transparent-editor .note-editor .note-toolbar button { background-color: white; color: #717171; }
.transparent-editor .note-editor .note-toolbar button:hover { background-color: rgba(255, 255, 255, 0.95); color: #717171; }
.transparent-editor .note-editor .note-toolbar button:hover .caret { border-top-color: #717171; }
.transparent-editor .note-editor .note-toolbar .dropdown-menu { color: #717171; }
.transparent-editor .note-editor .note-statusbar { background-color: rgba(0, 0, 0, 0.5); }
.transparent-editor .note-editor .caret { border-top-color: #717171; }

label, .td{
	font-weight:bold;
	color:#3f6ad8;

}
.break_time{
	font-weight:bold;
	color:#000000;
}

.parsley-error-list{
	color:red;
	list-style-type:none;
}
</style>

<style>
.pagination {
  display: inline-block;
}

.pagination li {
  color: black;
  float: left;
  text-decoration: none;
}
</style>
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    <?php include("sidebar.php");?>   
	<div class="app-main__outer">
                <div class="app-main__inner">
                                
					<div class="tab-content">
                       <div class="tab-pane tabs-animation fade show active" id="tab-content-2" role="tabpanel">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
								   <div id="smartwizard3" class="forms-wizard-vertical">
                                        <ul class="forms-wizard">
                                            <li>
                                                <a href="#step-1">
                                                    <em>1</em><span>My Profile</span>
                                                </a>
                                            </li>
                                            <li class="nav-item done">
                                                <a href="#step-2">
                                                    <em>2</em><span>Calendar</span>
                                                </a>
                                            </li>
											<li class="nav-item done">
                                                <a href="#step-3">
                                                    <em>3</em><span>Branding</span>
                                                </a>
                                            </li>
											<li class="nav-item done">
                                                <a href="#step-10">
                                                    <em>4</em><span>Integrate with Google</span>
                                                </a>
                                            </li>
											<li class="nav-item done">
                                                <a href="#step-4">
                                                    <em>5</em><span>Invoice</span>
                                                </a>
                                            </li>
											<li class="nav-item done">
                                                <a href="#step-5">
                                                    <em>6</em><span>Master List </span>
                                                </a>
                                            </li>
											<li class="nav-item done">
                                                <a href="#step-6">
                                                    <em>7</em><span>SMS</span>
                                                </a>
                                            </li>
											<li class="nav-item done">
                                                <a href="#step-7">
                                                    <em>8</em><span> Case Reports </span>
                                                </a>
                                            </li>
											<li class="nav-item done">
                                                <a href="#step-8">
                                                    <em>9</em><span>Consent Form</span>
                                                </a>
                                            </li>
											<li class="nav-item done">
                                                <a href="#step-9">
                                                    <em>10</em><span>Products</span>
                                                </a>
                                            </li>
                                             
                                        </ul>
                                        <div class="form-wizard-content">
										   <div id="step-1">
										   <form class="change_profile" action="<?php echo base_url().'client/settings/change_profile' ?>" method="post"  role="form" parsley-validate enctype="multipart/form-data">
                                    
                                                <div class="card-body">
                                                    <div class="position-relative form-group"><label for="first_name">Full Name *</label>
													 <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $profile['first_name']?>">
                                                    </div>
                                                    <div class="position-relative form-group"><label for="last_name">Last Name</label>
													  <input type="text" class=" form-control" name="last_name" id="last_name" value="<?php echo $profile['last_name']?>">
                                                    </div>
                                                    
                                                     <div class="position-relative form-group"><label for="degree">Degree</label>
													  <input type="text" class=" form-control" name="degree" id="degree" value="<?php echo $profile['degree']?>">
                                                    </div>
                                                     <div class="position-relative form-group"><label for="speciality">Speciality</label>
													  <input type="text" class=" form-control" name="speciality" id="speciality" value="<?php echo $profile['speciality']?>">
                                                    </div>
                                                     <div class="position-relative form-group"><label for="experience">Experience</label>
													  <input type="text" class=" form-control" name="experience" id="experience" value="<?php echo $profile['experience']?>">
                                                    </div>
                                                    
													<div class="position-relative form-group"><label for="branch_name">Branch Name</label>
													  <input type="text" class=" form-control" name="branch_name" id="branch_name" value="<?php echo $profile['branch_name']?>">
                                                    </div>
													<div class="position-relative form-group"><label for="clinic_name">Clinic Name</label>
													  <input type="text" class=" form-control" name="clinic_name" id="clinic_name" value="<?php echo $profile['clinic_name']?>">
                                                    </div>
													<div class="position-relative form-group"><label for="email"> Email </label>
													  <input type="text" class=" form-control" id="email" name="email" value="<?php echo $profile['email']?>" readonly>
                                                    </div>
													<div class="position-relative form-group"><label for="mobile"> Mobile no. </label>
													  <input type="text" class=" form-control" name="mobile" id="mobile" value="<?php echo $profile['mobile']?>">
                                                    </div>
													<div class="position-relative form-group"><label for="phone"> Phone no. </label>
													  <input type="text" class=" form-control" name="phone" id="phone" value="<?php echo $profile['phone']?>">
                                                    </div>
													<div class="position-relative form-group"><label for="bank_details"> Bank Details </label>
													    <textarea class="form-control" id="bank_details" name="bank_details" value="" rows="3"  autocomplete="off"><?php echo $profile['bank_details']?></textarea>
                                                    </div>
													<div class="position-relative form-group"><label for="photo">Photo</label>
													    <input name="profile_photo" id="profile_photo"  type="file"  class="form-control" accept="image/*">
                                                    </div>
                                                    <div class="position-relative form-group"><label for="photo">Clinic Photo 1</label>
													    <input name="clinic_photo" id="clinic_photo"  type="file"  class="form-control" accept="image/*">
                                                    </div>
                                                     <div class="position-relative form-group"><label for="photo">Clinic Photo 2</label>
													    <input name="clinic_photo1" id="clinic_photo1"  type="file"  class="form-control" accept="image/*">
                                                    </div>
                                                     <div class="position-relative form-group"><label for="photo">Clinic Photo 3</label>
													    <input name="clinic_photo2" id="clinic_photo2"  type="file"  class="form-control" accept="image/*">
                                                    </div>
                                                     <div class="position-relative form-group"><label for="photo">Clinic Photo 4</label>
													    <input name="clinic_photo3" id="clinic_photo3"  type="file"  class="form-control" accept="image/*">
                                                    </div>
													(When your patient makes online payment via Physio Plus Tech, we will send weekly payouts on Every Friday to this given Bank account.)</br>
													 <div class="clearfix">
													  
													 
													 
													 </br>
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary" id="save">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
                                               </div>
												</div>
												</form>
                                            </div>
											<div id="step-2">
                                                <div id="accordion" class="accordion-wrapper mb-3">
                                                    <div class="card">
                                                      <div class="card-body">
													<form class="schedule_setting" action="<?php echo base_url().'client/settings/schedule_setting' ?>" method="post"  role="form" parsley-validate>
                                    
                                                      <div class="position-relative form-group"><label for="first_name">Schedule slot *</label>
													  <select class="form-control" name="sch_slot" id="sch_slot">
															<option value="5" <?php if ($settings['sch_slot'] == '5') echo 'selected="selected"' ?> >5 mins</option>
															<option value="15" <?php if ($settings['sch_slot'] == '15') echo 'selected="selected"' ?>>15 mins</option>
															<option value="30" <?php if ($settings['sch_slot'] == '30') echo 'selected="selected"' ?>>30 mins</option>
															<option value="45" <?php if ($settings['sch_slot'] == '45') echo 'selected="selected"' ?>>45 mins</option>
															<option value="60" <?php if ($settings['sch_slot'] == '60') echo 'selected="selected"' ?>>60 mins</option>
                          							  </select>
                                                    </div>
                                                    <div class="position-relative form-group"><label for="last_name">Schedule Times *</label>
													   <select class="form-control" name="sch_time" id="sch_time">
															 <option value="1" <?php if ($settings['sch_time'] == '1') echo 'selected="selected"' ?>>1</option>
															 <option value="3" <?php if ($settings['sch_time'] == '3') echo 'selected="selected"' ?>>3</option>
															 <option value="5" <?php if ($settings['sch_time'] == '5') echo 'selected="selected"' ?>>5</option>
                          							  </select>
                                                    </div>
													<h5 class="card-title" style="text-transform:capitalize;">Display Appointments of *</h5>
													<div class="position-relative form-group"><label for="branch_name">Days After Current Date</label>
													        <select class="form-control" name="sch_day1" id="sch_day1">
																<option value="">Please Select</option>                           
															   <option value="1" <?php if ($settings['days_display_after'] == '1') echo 'selected="selected"' ?> >1 Day</option>
																<option value="2" <?php if ($settings['days_display_after'] == '2') echo 'selected="selected"' ?>>2 Days</option>
																<option value="3" <?php if ($settings['days_display_after'] == '3') echo 'selected="selected"' ?>>3 Days</option>
																<option value="4" <?php if ($settings['days_display_after'] == '4') echo 'selected="selected"' ?>>4 Days</option>
															   <option value="5" <?php if ($settings['days_display_after'] == '5') echo 'selected="selected"' ?>>5 Days</option>
															   <option value="6" <?php if ($settings['days_display_after'] == '6') echo 'selected="selected"' ?>>6 Days</option>
															   <option value="7" <?php if ($settings['days_display_after'] == '7') echo 'selected="selected"' ?>>7 Days</option>
															   <option value="8" <?php if ($settings['days_display_after'] == '8') echo 'selected="selected"' ?>>8 Days</option>
															   <option value="9" <?php if ($settings['days_display_after'] == '9') echo 'selected="selected"' ?>>9 Days</option>
															   <option value="10" <?php if ($settings['days_display_after'] == '10') echo 'selected="selected"' ?>>10 Days</option>
																<option value="11" <?php if ($settings['days_display_after'] == '11') echo 'selected="selected"' ?>>11 Days</option>
																<option value="12" <?php if ($settings['days_display_after'] == '12') echo 'selected="selected"' ?>>12 Days</option>
																<option value="13" <?php if ($settings['days_display_after'] == '13') echo 'selected="selected"' ?>>13 Days</option>
																<option value="14" <?php if ($settings['days_display_after'] == '14') echo 'selected="selected"' ?>>14 Days</option>
																<option value="15" <?php if ($settings['days_display_after'] == '15') echo 'selected="selected"' ?>>15 Days</option>
																<option value="16" <?php if ($settings['days_display_after'] == '16') echo 'selected="selected"' ?>>16 Days</option>
																<option value="17" <?php if ($settings['days_display_after'] == '17') echo 'selected="selected"' ?>>17 Days</option>
																<option value="18" <?php if ($settings['days_display_after'] == '18') echo 'selected="selected"' ?>>18 Days</option>
																<option value="19" <?php if ($settings['days_display_after'] == '19') echo 'selected="selected"' ?>>19 Days</option>
																<option value="20" <?php if ($settings['days_display_after'] == '20') echo 'selected="selected"' ?>>20 Days</option>
																<option value="21" <?php if ($settings['days_display_after'] == '21') echo 'selected="selected"' ?>>21 Days</option>
																<option value="22" <?php if ($settings['days_display_after'] == '22') echo 'selected="selected"' ?> >22 Days</option>
																<option value="23" <?php if ($settings['days_display_after'] == '23') echo 'selected="selected"' ?>>23 Days</option>
																<option value="24" <?php if ($settings['days_display_after'] == '24') echo 'selected="selected"' ?>>24 Days</option>
															   <option value="25" <?php if ($settings['days_display_after'] == '25') echo 'selected="selected"' ?>>25 Days</option>
															   <option value="26" <?php if ($settings['days_display_after'] == '26') echo 'selected="selected"' ?>>26 Days</option>
															   <option value="27" <?php if ($settings['days_display_after'] == '27') echo 'selected="selected"' ?>>27 Days</option>
															   <option value="28" <?php if ($settings['days_display_after'] == '28') echo 'selected="selected"' ?>>28 Days</option>
															   <option value="29" <?php if ($settings['days_display_after'] == '29') echo 'selected="selected"' ?>>29 Days</option>
															   <option value="30" <?php if ($settings['days_display_after'] == '30') echo 'selected="selected"' ?>>30 Days</option>
																<option value="31" <?php if ($settings['days_display_after'] == '31') echo 'selected="selected"' ?>>31 Days</option>			  
															  </select>
                                                    </div>
													<div class="position-relative form-group"><label for="clinic_name">Days Before Current Date</label>
													  <select class="chosen-select chosen-transparent form-control" name="sch_day" id="sch_day">
													<option value="">Please Select</option>                           
												   <option value="1" <?php if ($settings['days_display'] == '1') echo 'selected="selected"' ?> >1 Day</option>
													<option value="2" <?php if ($settings['days_display'] == '2') echo 'selected="selected"' ?>>2 Days</option>
													<option value="3" <?php if ($settings['days_display'] == '3') echo 'selected="selected"' ?>>3 Days</option>
													<option value="4" <?php if ($settings['days_display'] == '4') echo 'selected="selected"' ?>>4 Days</option>
												   <option value="5" <?php if ($settings['days_display'] == '5') echo 'selected="selected"' ?>>5 Days</option>
												   <option value="6" <?php if ($settings['days_display'] == '6') echo 'selected="selected"' ?>>6 Days</option>
												   <option value="7" <?php if ($settings['days_display'] == '7') echo 'selected="selected"' ?>>7 Days</option>
												   <option value="8" <?php if ($settings['days_display'] == '8') echo 'selected="selected"' ?>>8 Days</option>
												   <option value="9" <?php if ($settings['days_display'] == '9') echo 'selected="selected"' ?>>9 Days</option>
												   <option value="10" <?php if ($settings['days_display'] == '10') echo 'selected="selected"' ?>>10 Days</option>
													<option value="11" <?php if ($settings['days_display'] == '11') echo 'selected="selected"' ?>>11 Days</option>
													<option value="12" <?php if ($settings['days_display'] == '12') echo 'selected="selected"' ?>>12 Days</option>
													<option value="13" <?php if ($settings['days_display'] == '13') echo 'selected="selected"' ?>>13 Days</option>
													<option value="14" <?php if ($settings['days_display'] == '14') echo 'selected="selected"' ?>>14 Days</option>
													<option value="15" <?php if ($settings['days_display'] == '15') echo 'selected="selected"' ?>>15 Days</option>
													<option value="16" <?php if ($settings['days_display'] == '16') echo 'selected="selected"' ?>>16 Days</option>
													<option value="17" <?php if ($settings['days_display'] == '17') echo 'selected="selected"' ?>>17 Days</option>
													<option value="18" <?php if ($settings['days_display'] == '18') echo 'selected="selected"' ?>>18 Days</option>
													<option value="19" <?php if ($settings['days_display'] == '19') echo 'selected="selected"' ?>>19 Days</option>
													<option value="20" <?php if ($settings['days_display'] == '20') echo 'selected="selected"' ?>>20 Days</option>
													<option value="21" <?php if ($settings['days_display'] == '21') echo 'selected="selected"' ?>>21 Days</option>
													<option value="22" <?php if ($settings['days_display'] == '22') echo 'selected="selected"' ?> >22 Days</option>
													<option value="23" <?php if ($settings['days_display'] == '23') echo 'selected="selected"' ?>>23 Days</option>
													<option value="24" <?php if ($settings['days_display'] == '24') echo 'selected="selected"' ?>>24 Days</option>
												   <option value="25" <?php if ($settings['days_display'] == '25') echo 'selected="selected"' ?>>25 Days</option>
												   <option value="26" <?php if ($settings['days_display'] == '26') echo 'selected="selected"' ?>>26 Days</option>
												   <option value="27" <?php if ($settings['days_display'] == '27') echo 'selected="selected"' ?>>27 Days</option>
												   <option value="28" <?php if ($settings['days_display'] == '28') echo 'selected="selected"' ?>>28 Days</option>
												   <option value="29" <?php if ($settings['days_display'] == '29') echo 'selected="selected"' ?>>29 Days</option>
												   <option value="30" <?php if ($settings['days_display'] == '30') echo 'selected="selected"' ?>>30 Days</option>
													<option value="31" <?php if ($settings['days_display'] == '31') echo 'selected="selected"' ?>>31 Days</option>			  
												  </select>
                                                    </div>
													<div class="position-relative form-group"><label for="email"> Appointments View * </label>
													  <select name="sch_view" id="sch_view" class="form-control">
														<option value="month" <?php if ($settings['display_view'] == 'month') echo 'selected="selected"' ?> >Month View</option>
														<option value="agendaWeek" <?php if ($settings['display_view'] == 'agendaWeek') echo 'selected="selected"' ?>>Week View</option>
														<option value="agendaDay" <?php if ($settings['display_view'] == 'agendaDay') echo 'selected="selected"' ?>>Day View</option>
                            	                        </select>
                                                    </div>
													
													<div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary" id="save">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
                                               </div>
											   
											   </form>
                                                                                                        <?php /* if($this->session->userdata('client_id')==1637){
                                                                                                          $this->db->select('googleCalendar')->from('tbl_client')->where('client_id = "'. $this->session->userdata('client_id').'"');
								                                          $results=$this->db->get();
                                                                                                          $cal = $results->row()->googleCalendar;
                                                                                                           if($cal==0){
                                                                                                          ?>
                                                                                                        <h5 style="display:none;"><?php echo $this->session->userdata('googleCalendar'); ?></h5>
													<a class="controls" align="left" href="<?php echo base_url().'client/settings/integrateCalendar' ?>" >
													<button class="mb-2 mr-2 btn btn-pill btn-primary">Integrate with Google Calendar</button>
                                                                                                       	</a>
                                                                                                         <?php }  else {  ?>
                                                                                                              <h5 style="display:none;"><?php echo $this->session->userdata('googleCalendar'); ?></h5>
                                                                                                              <a class="controls" align="left" href="#step-2" >
													      <button class="mb-2 mr-2 btn btn-pill btn-primary">Integrated with Google Calendar</button>
                                                                                                              </a>
                                                                                                        <?php } ?><!-- else statement-->
                                                                                                        <?php } */ ?>

													<h5 style="margin-top:10px;" class="card-title" style="text-transform:capitalize;">Plugin Appointment Settings</h5>
													<div class="controls" align="right">
													  <button class="mb-2 mr-2 btn btn-pill btn-info" id="edit_set">Edit</button>
													  </div>
													<div class="alert alert-success fade show" role="alert" style="text-align:center;">Appointment Plugin URL : <a href="<?php echo base_url().'plugin/dashboard/index/'.$this->session->userdata('client_id'); ?>" target="_blank" style="font-weight:bold;"><?php echo base_url().'plugin/dashboard/index/'.$this->session->userdata('client_id'); ?></a> </div>
						                              <p style="text-align:center;">Appointment Settings : <?php if($settings['apt_settings'] == 'free') { echo 'Free Appointments'; } else { echo 'Choose Appointment Type'; } ?></p>
													  
                                                        <div class="set">
													   <form class="form-horizontal" action="<?php echo base_url().'client/settings/settings1' ?>" method="post" role="form" parsley-validate id="basicvalidations">
													   <div class="position-relative row form-group">
													<label for="reason" class="col-sm-4 col-form-label">Appointment Settings *</label>
													<div class="col-sm-8">
													<select style="width:500px;" class="select-control form-control appoint" name="appointment" id="appoint" parsley-trigger="change" parsley-required="true">
													<option selected="true" disabled="disabled">Please Select</option>    
													<option value="free">Free Appointment</option>
								                    </select>
													</div>
													</div>
													<div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary" id="save">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
                                               </div>
											   </form>
													</div>													  
													  
													   <div class="controls" align="right">
													  <button class="mb-2 mr-2 btn btn-pill btn-alternate" id="add_break">Add Break Time</button>
													  </div>
													  
													  
													 <div class="table-responsive">
													 <form class="sch_settings_edit" action="<?php echo base_url().'client/settings/sch_settings_edit' ?>" method="post"  role="form" parsley-validate>
                                    
                                                   <table class="table table-striped table-bordered" id="InvoiceTable">
													<thead>
													<tr>
														<th>Day</th>
														<th>Set Timings(Forenoon)</th>
														<th>Set Timings(Afternoon)</th>
													 </tr>
													</thead>
                                                  <tbody id="itemsBody">
                                                    <tr>
                                                   <td class="td">Monday</td>
                                                  <td id="selectbox2">
												 <select class="form-control" id="monday_fn_from" name="monday_fn_from" parsley-trigger="change" parsley-required="true" parsley-error-container="#selectbox">
									<option value="1" <?php if ($sch_settings_inf['monday_fn_from'] == '1') echo 'selected="selected"' ?> >1 am</option>
									<option value="2" <?php if ($sch_settings_inf['monday_fn_from'] == '2') echo 'selected="selected"' ?>>2 am</option>
									<option value="3" <?php if ($sch_settings_inf['monday_fn_from'] == '3') echo 'selected="selected"' ?>>3 am</option>
									<option value="4" <?php if ($sch_settings_inf['monday_fn_from'] == '4') echo 'selected="selected"' ?>>4 am</option>
									<option value="5" <?php if ($sch_settings_inf['monday_fn_from'] == '5') echo 'selected="selected"' ?>>5 am</option>
									<option value="6" <?php if ($sch_settings_inf['monday_fn_from'] == '6') echo 'selected="selected"' ?>>6 am</option>
									<option value="7" <?php if ($sch_settings_inf['monday_fn_from'] == '7') echo 'selected="selected"' ?>>7 am</option>
									<option value="8" <?php if ($sch_settings_inf['monday_fn_from'] == '8') echo 'selected="selected"' ?> >8 am</option>
									<option value="9" <?php if ($sch_settings_inf['monday_fn_from'] == '9') echo 'selected="selected"' ?>>9 am</option>
									<option value="10"<?php if ($sch_settings_inf['monday_fn_from'] == '10') echo 'selected="selected"' ?>>10 am</option>
									<option value="11" <?php if ($sch_settings_inf['monday_fn_from'] == '11') echo 'selected="selected"' ?>>11 am</option>
									<option value="12" <?php if ($sch_settings_inf['monday_fn_from'] == '12') echo 'selected="selected"' ?>>12 am</option>
							</select>
												</td>
												<td>
												<select class="form-control" id="monday_an_to" name="monday_an_to" parsley-trigger="change" parsley-required="true" parsley-error-container="#selectbox">
									<option value="1" <?php if ($sch_settings_inf['monday_an_to'] == '1') echo 'selected="selected"' ?> >1 pm</option>
									<option value="2" <?php if ($sch_settings_inf['monday_an_to'] == '2') echo 'selected="selected"' ?>>2 pm</option>
									<option value="3" <?php if ($sch_settings_inf['monday_an_to'] == '3') echo 'selected="selected"' ?>>3 pm</option>
									<option value="4" <?php if ($sch_settings_inf['monday_an_to'] == '4') echo 'selected="selected"' ?>>4 pm</option>
									<option value="5" <?php if ($sch_settings_inf['monday_an_to'] == '5') echo 'selected="selected"' ?>>5 pm</option>
									<option value="6" <?php if ($sch_settings_inf['monday_an_to'] == '6') echo 'selected="selected"' ?>>6 pm</option>
									<option value="7" <?php if ($sch_settings_inf['monday_an_to'] == '7') echo 'selected="selected"' ?>>7 pm</option>
									<option value="8" <?php if ($sch_settings_inf['monday_an_to'] == '8') echo 'selected="selected"' ?> >8 pm</option>
									<option value="9" <?php if ($sch_settings_inf['monday_an_to'] == '9') echo 'selected="selected"' ?>>9 pm</option>
									<option value="10"<?php if ($sch_settings_inf['monday_an_to'] == '10') echo 'selected="selected"' ?>>10 pm</option>
									<option value="11" <?php if ($sch_settings_inf['monday_an_to'] == '11') echo 'selected="selected"' ?>>11 pm</option>
									<option value="12" <?php if ($sch_settings_inf['monday_an_to'] == '12') echo 'selected="selected"' ?>>12 pm</option>
							</select>
												</td>
											  
                                            </tr>
											
											
											<tr id="break1">
                                                   <td class="break_time">Break Time</td>
                                                  <td>
												 <select class="form-control" id="monday_break_from" name="monday_break_from">
									<option value="">Please Select </option>
									<option value="1:00 am" <?php if ($sch_settings_inf['monday_break_from'] == '1:00 am') echo 'selected="selected"' ?> >1 am</option>
									<option value="2:00 am" <?php if ($sch_settings_inf['monday_break_from'] == '2:00 am') echo 'selected="selected"' ?>>2 am</option>
									<option value="3:00 am" <?php if ($sch_settings_inf['monday_break_from'] == '3:00 am') echo 'selected="selected"' ?>>3 am</option>
									<option value="4:00 am" <?php if ($sch_settings_inf['monday_break_from'] == '4:00 am') echo 'selected="selected"' ?>>4 am</option>
									<option value="5:00 am" <?php if ($sch_settings_inf['monday_break_from'] == '5:00 am') echo 'selected="selected"' ?>>5 am</option>
									<option value="6:00 am" <?php if ($sch_settings_inf['monday_break_from'] == '6:00 am') echo 'selected="selected"' ?>>6 am</option>
									<option value="7:00 am" <?php if ($sch_settings_inf['monday_break_from'] == '7:00 am') echo 'selected="selected"' ?>>7 am</option>
									<option value="8:00 am" <?php if ($sch_settings_inf['monday_break_from'] == '8:00 am') echo 'selected="selected"' ?> >8 am</option>
									<option value="9:00 am" <?php if ($sch_settings_inf['monday_break_from'] == '9:00 am') echo 'selected="selected"' ?>>9 am</option>
									<option value="10:00 am"<?php if ($sch_settings_inf['monday_break_from'] == '10:00 am') echo 'selected="selected"' ?>>10 am</option>
									<option value="11:00 am" <?php if ($sch_settings_inf['monday_break_from'] == '11:00 am') echo 'selected="selected"' ?>>11 am</option>
									<option value="12:00 am" <?php if ($sch_settings_inf['monday_break_from'] == '12:00 am') echo 'selected="selected"' ?>>12 am</option>
									<option value="1:00 pm" <?php if ($sch_settings_inf['monday_break_from'] == '1:00 pm') echo 'selected="selected"' ?> >1 pm</option>
									<option value="2:00 pm" <?php if ($sch_settings_inf['monday_break_from'] == '2:00 pm') echo 'selected="selected"' ?>>2 pm</option>
									<option value="3:00 pm" <?php if ($sch_settings_inf['monday_break_from'] == '3:00 pm') echo 'selected="selected"' ?>>3 pm</option>
									<option value="4:00 pm" <?php if ($sch_settings_inf['monday_break_from'] == '4:00 pm') echo 'selected="selected"' ?>>4 pm</option>
									<option value="5:00 pm" <?php if ($sch_settings_inf['monday_break_from'] == '5:00 pm') echo 'selected="selected"' ?>>5 pm</option>
									<option value="6:00 pm" <?php if ($sch_settings_inf['monday_break_from'] == '6:00 pm') echo 'selected="selected"' ?>>6 pm</option>
									<option value="7:00 pm" <?php if ($sch_settings_inf['monday_break_from'] == '7:00 pm') echo 'selected="selected"' ?>>7 pm</option>
									<option value="8:00 pm" <?php if ($sch_settings_inf['monday_break_from'] == '8:00 pm') echo 'selected="selected"' ?> >8 pm</option>
									<option value="9:00 pm" <?php if ($sch_settings_inf['monday_break_from'] == '9:00 pm') echo 'selected="selected"' ?>>9 pm</option>
									<option value="10:00 pm"<?php if ($sch_settings_inf['monday_break_from'] == '10:00 pm') echo 'selected="selected"' ?>>10 pm</option>
									<option value="11:00 pm" <?php if ($sch_settings_inf['monday_break_from'] == '11:00 pm') echo 'selected="selected"' ?>>11 pm</option>
									<option value="12:00 pm" <?php if ($sch_settings_inf['monday_break_from'] == '12:00 pm') echo 'selected="selected"' ?>>12 pm</option>
						
							</select>
												</td>
												<td>
												<select class="form-control" id="monday_break_to" name="monday_break_to" >
									 <option value="">Please Select</option>
									<option value="1:00 am" <?php if ($sch_settings_inf['monday_break_to'] == '1:00 am') echo 'selected="selected"' ?> >1 am</option>
									<option value="2:00 am" <?php if ($sch_settings_inf['monday_break_to'] == '2:00 am') echo 'selected="selected"' ?>>2 am</option>
									<option value="3:00 am" <?php if ($sch_settings_inf['monday_break_to'] == '3:00 am') echo 'selected="selected"' ?>>3 am</option>
									<option value="4:00 am" <?php if ($sch_settings_inf['monday_break_to'] == '4:00 am') echo 'selected="selected"' ?>>4 am</option>
									<option value="5:00 am" <?php if ($sch_settings_inf['monday_break_to'] == '5:00 am') echo 'selected="selected"' ?>>5 am</option>
									<option value="6:00 am" <?php if ($sch_settings_inf['monday_break_to'] == '6:00 am') echo 'selected="selected"' ?>>6 am</option>
									<option value="7:00 am" <?php if ($sch_settings_inf['monday_break_to'] == '7:00 am') echo 'selected="selected"' ?>>7 am</option>
									<option value="8:00 am" <?php if ($sch_settings_inf['monday_break_to'] == '8:00 am') echo 'selected="selected"' ?> >8 am</option>
									<option value="9:00 am" <?php if ($sch_settings_inf['monday_break_to'] == '9:00 am') echo 'selected="selected"' ?>>9 am</option>
									<option value="10:00 am"<?php if ($sch_settings_inf['monday_break_to'] == '10:00 am') echo 'selected="selected"' ?>>10 am</option>
									<option value="11:00 am" <?php if ($sch_settings_inf['monday_break_to'] == '11:00 am') echo 'selected="selected"' ?>>11 am</option>
									<option value="12:00 am" <?php if ($sch_settings_inf['monday_break_to'] == '12:00 am') echo 'selected="selected"' ?>>12 am</option>
									<option value="1:00 pm" <?php if ($sch_settings_inf['monday_break_to'] == '1:00 pm') echo 'selected="selected"' ?> >1 pm</option>
									<option value="2:00 pm" <?php if ($sch_settings_inf['monday_break_to'] == '2:00 pm') echo 'selected="selected"' ?>>2 pm</option>
									<option value="3:00 pm" <?php if ($sch_settings_inf['monday_break_to'] == '3:00 pm') echo 'selected="selected"' ?>>3 pm</option>
									<option value="4:00 pm" <?php if ($sch_settings_inf['monday_break_to'] == '4:00 pm') echo 'selected="selected"' ?>>4 pm</option>
									<option value="5:00 pm" <?php if ($sch_settings_inf['monday_break_to'] == '5:00 pm') echo 'selected="selected"' ?>>5 pm</option>
									<option value="6:00 pm" <?php if ($sch_settings_inf['monday_break_to'] == '6:00 pm') echo 'selected="selected"' ?>>6 pm</option>
									<option value="7:00 pm" <?php if ($sch_settings_inf['monday_break_to'] == '7:00 pm') echo 'selected="selected"' ?>>7 pm</option>
									<option value="8:00 pm" <?php if ($sch_settings_inf['monday_break_to'] == '8:00 pm') echo 'selected="selected"' ?> >8 pm</option>
									<option value="9:00 pm" <?php if ($sch_settings_inf['monday_break_to'] == '9:00 pm') echo 'selected="selected"' ?>>9 pm</option>
									<option value="10:00 pm"<?php if ($sch_settings_inf['monday_break_to'] == '10:00 pm') echo 'selected="selected"' ?>>10 pm</option>
									<option value="11:00 pm" <?php if ($sch_settings_inf['monday_break_to'] == '11:00 pm') echo 'selected="selected"' ?>>11 pm</option>
									<option value="12:00 pm" <?php if ($sch_settings_inf['monday_break_to'] == '12:00 pm') echo 'selected="selected"' ?>>12 pm</option>
								</select>
												</td>
											  
                                            </tr>
											
											
											<tr>
                                                <td class="td">Tuesday</td>
                                                 
                                                <td id="selectbox2">
												 <select class="form-control" id="tuesday_fn_from" name="tuesday_fn_from" parsley-trigger="change" parsley-required="true" parsley-error-container="#selectbox">
									<option value="1" <?php if ($sch_settings_inf['tuesday_fn_from'] == '1') echo 'selected="selected"' ?> >1 am</option>
									<option value="2" <?php if ($sch_settings_inf['tuesday_fn_from'] == '2') echo 'selected="selected"' ?>>2 am</option>
									<option value="3" <?php if ($sch_settings_inf['tuesday_fn_from'] == '3') echo 'selected="selected"' ?>>3 am</option>
									<option value="4" <?php if ($sch_settings_inf['tuesday_fn_from'] == '4') echo 'selected="selected"' ?>>4 am</option>
									<option value="5" <?php if ($sch_settings_inf['tuesday_fn_from'] == '5') echo 'selected="selected"' ?>>5 am</option>
									<option value="6" <?php if ($sch_settings_inf['tuesday_fn_from'] == '6') echo 'selected="selected"' ?>>6 am</option>
									<option value="7" <?php if ($sch_settings_inf['tuesday_fn_from'] == '7') echo 'selected="selected"' ?>>7 am</option>
									<option value="8" <?php if ($sch_settings_inf['tuesday_fn_from'] == '8') echo 'selected="selected"' ?> >8 am</option>
									<option value="9" <?php if ($sch_settings_inf['tuesday_fn_from'] == '9') echo 'selected="selected"' ?>>9 am</option>
									<option value="10"<?php if ($sch_settings_inf['tuesday_fn_from'] == '10') echo 'selected="selected"' ?>>10 am</option>
									<option value="11" <?php if ($sch_settings_inf['tuesday_fn_from'] == '11') echo 'selected="selected"' ?>>11 am</option>
									<option value="12" <?php if ($sch_settings_inf['tuesday_fn_from'] == '12') echo 'selected="selected"' ?>>12 am</option>
							</select>
												</td>
												<td>
												<select class="form-control" id="tuesday_an_to" name="tuesday_an_to" parsley-trigger="change" parsley-required="true" parsley-error-container="#selectbox">
									<option value="1" <?php if ($sch_settings_inf['tuesday_an_to'] == '1') echo 'selected="selected"' ?> >1 pm</option>
									<option value="2" <?php if ($sch_settings_inf['tuesday_an_to'] == '2') echo 'selected="selected"' ?>>2 pm</option>
									<option value="3" <?php if ($sch_settings_inf['tuesday_an_to'] == '3') echo 'selected="selected"' ?>>3 pm</option>
									<option value="4" <?php if ($sch_settings_inf['tuesday_an_to'] == '4') echo 'selected="selected"' ?>>4 pm</option>
									<option value="5" <?php if ($sch_settings_inf['tuesday_an_to'] == '5') echo 'selected="selected"' ?>>5 pm</option>
									<option value="6" <?php if ($sch_settings_inf['tuesday_an_to'] == '6') echo 'selected="selected"' ?>>6 pm</option>
									<option value="7" <?php if ($sch_settings_inf['tuesday_an_to'] == '7') echo 'selected="selected"' ?>>7 pm</option>
									<option value="8" <?php if ($sch_settings_inf['tuesday_an_to'] == '8') echo 'selected="selected"' ?> >8 pm</option>
									<option value="9" <?php if ($sch_settings_inf['tuesday_an_to'] == '9') echo 'selected="selected"' ?>>9 pm</option>
									<option value="10"<?php if ($sch_settings_inf['tuesday_an_to'] == '10') echo 'selected="selected"' ?>>10 pm</option>
									<option value="11" <?php if ($sch_settings_inf['tuesday_an_to'] == '11') echo 'selected="selected"' ?>>11 pm</option>
									<option value="12" <?php if ($sch_settings_inf['tuesday_an_to'] == '12') echo 'selected="selected"' ?>>12 pm</option>
							</select>
												</td>
											  
                                            </tr>
											
											
											<tr id="break2">
                                                   <td class="break_time">Break Time</td>
                                                  <td >
												 <select class="form-control" id="tuesday_break_from" name="tuesday_break_from">
									 <option value="">Please Select</option>
									<option value="1:00 am" <?php if ($sch_settings_inf['tuesday_break_from'] == '1:00 am') echo 'selected="selected"' ?> >1 am</option>
									<option value="2:00 am" <?php if ($sch_settings_inf['tuesday_break_from'] == '2:00 am') echo 'selected="selected"' ?>>2 am</option>
									<option value="3:00 am" <?php if ($sch_settings_inf['tuesday_break_from'] == '3:00 am') echo 'selected="selected"' ?>>3 am</option>
									<option value="4:00 am" <?php if ($sch_settings_inf['tuesday_break_from'] == '4:00 am') echo 'selected="selected"' ?>>4 am</option>
									<option value="5:00 am" <?php if ($sch_settings_inf['tuesday_break_from'] == '5:00 am') echo 'selected="selected"' ?>>5 am</option>
									<option value="6:00 am" <?php if ($sch_settings_inf['tuesday_break_from'] == '6:00 am') echo 'selected="selected"' ?>>6 am</option>
									<option value="7:00 am" <?php if ($sch_settings_inf['tuesday_break_from'] == '7:00 am') echo 'selected="selected"' ?>>7 am</option>
									<option value="8:00 am" <?php if ($sch_settings_inf['tuesday_break_from'] == '8:00 am') echo 'selected="selected"' ?> >8 am</option>
									<option value="9:00 am" <?php if ($sch_settings_inf['tuesday_break_from'] == '9:00 am') echo 'selected="selected"' ?>>9 am</option>
									<option value="10:00 am"<?php if ($sch_settings_inf['tuesday_break_from'] == '10:00 am') echo 'selected="selected"' ?>>10 am</option>
									<option value="11:00 am" <?php if ($sch_settings_inf['tuesday_break_from'] == '11:00 am') echo 'selected="selected"' ?>>11 am</option>
									<option value="12:00 am" <?php if ($sch_settings_inf['tuesday_break_from'] == '12:00 am') echo 'selected="selected"' ?>>12 am</option>
									<option value="1:00 pm" <?php if ($sch_settings_inf['tuesday_break_from'] == '1:00 pm') echo 'selected="selected"' ?> >1 pm</option>
									<option value="2:00 pm" <?php if ($sch_settings_inf['tuesday_break_from'] == '2:00 pm') echo 'selected="selected"' ?>>2 pm</option>
									<option value="3:00 pm" <?php if ($sch_settings_inf['tuesday_break_from'] == '3:00 pm') echo 'selected="selected"' ?>>3 pm</option>
									<option value="4:00 pm" <?php if ($sch_settings_inf['tuesday_break_from'] == '4:00 pm') echo 'selected="selected"' ?>>4 pm</option>
									<option value="5:00 pm" <?php if ($sch_settings_inf['tuesday_break_from'] == '5:00 pm') echo 'selected="selected"' ?>>5 pm</option>
									<option value="6:00 pm" <?php if ($sch_settings_inf['tuesday_break_from'] == '6:00 pm') echo 'selected="selected"' ?>>6 pm</option>
									<option value="7:00 pm" <?php if ($sch_settings_inf['tuesday_break_from'] == '7:00 pm') echo 'selected="selected"' ?>>7 pm</option>
									<option value="8:00 pm" <?php if ($sch_settings_inf['tuesday_break_from'] == '8:00 pm') echo 'selected="selected"' ?> >8 pm</option>
									<option value="9:00 pm" <?php if ($sch_settings_inf['tuesday_break_from'] == '9:00 pm') echo 'selected="selected"' ?>>9 pm</option>
									<option value="10:00 pm"<?php if ($sch_settings_inf['tuesday_break_from'] == '10:00 pm') echo 'selected="selected"' ?>>10 pm</option>
									<option value="11:00 pm" <?php if ($sch_settings_inf['tuesday_break_from'] == '11:00 pm') echo 'selected="selected"' ?>>11 pm</option>
									<option value="12:00 pm" <?php if ($sch_settings_inf['tuesday_break_from'] == '12:00 pm') echo 'selected="selected"' ?>>12 pm</option>
							
							</select>
												</td>
												<td>
												<select class="form-control" id="tuesday_break_to" name="tuesday_break_to" >
                                                <option value="">Please Select</option>
									<option value="1:00 am" <?php if ($sch_settings_inf['tuesday_break_to'] == '1:00 am') echo 'selected="selected"' ?> >1 am</option>
									<option value="2:00 am" <?php if ($sch_settings_inf['tuesday_break_to'] == '2:00 am') echo 'selected="selected"' ?>>2 am</option>
									<option value="3:00 am" <?php if ($sch_settings_inf['tuesday_break_to'] == '3:00 am') echo 'selected="selected"' ?>>3 am</option>
									<option value="4:00 am" <?php if ($sch_settings_inf['tuesday_break_to'] == '4:00 am') echo 'selected="selected"' ?>>4 am</option>
									<option value="5:00 am" <?php if ($sch_settings_inf['tuesday_break_to'] == '5:00 am') echo 'selected="selected"' ?>>5 am</option>
									<option value="6:00 am" <?php if ($sch_settings_inf['tuesday_break_to'] == '6:00 am') echo 'selected="selected"' ?>>6 am</option>
									<option value="7:00 am" <?php if ($sch_settings_inf['tuesday_break_to'] == '7:00 am') echo 'selected="selected"' ?>>7 am</option>
									<option value="8:00 am" <?php if ($sch_settings_inf['tuesday_break_to'] == '8:00 am') echo 'selected="selected"' ?> >8 am</option>
									<option value="9:00 am" <?php if ($sch_settings_inf['tuesday_break_to'] == '9:00 am') echo 'selected="selected"' ?>>9 am</option>
									<option value="10:00 am"<?php if ($sch_settings_inf['tuesday_break_to'] == '10:00 am') echo 'selected="selected"' ?>>10 am</option>
									<option value="11:00 am" <?php if ($sch_settings_inf['tuesday_break_to'] == '11:00 am') echo 'selected="selected"' ?>>11 am</option>
									<option value="12:00 am" <?php if ($sch_settings_inf['tuesday_break_to'] == '12:00 am') echo 'selected="selected"' ?>>12 am</option>
									<option value="1:00 pm" <?php if ($sch_settings_inf['tuesday_break_to'] == '1:00 pm') echo 'selected="selected"' ?> >1 pm</option>
									<option value="2:00 pm" <?php if ($sch_settings_inf['tuesday_break_to'] == '2:00 pm') echo 'selected="selected"' ?>>2 pm</option>
									<option value="3:00 pm" <?php if ($sch_settings_inf['tuesday_break_to'] == '3:00 pm') echo 'selected="selected"' ?>>3 pm</option>
									<option value="4:00 pm" <?php if ($sch_settings_inf['tuesday_break_to'] == '4:00 pm') echo 'selected="selected"' ?>>4 pm</option>
									<option value="5:00 pm" <?php if ($sch_settings_inf['tuesday_break_to'] == '5:00 pm') echo 'selected="selected"' ?>>5 pm</option>
									<option value="6:00 pm" <?php if ($sch_settings_inf['tuesday_break_to'] == '6:00 pm') echo 'selected="selected"' ?>>6 pm</option>
									<option value="7:00 pm" <?php if ($sch_settings_inf['tuesday_break_to'] == '7:00 pm') echo 'selected="selected"' ?>>7 pm</option>
									<option value="8:00 pm" <?php if ($sch_settings_inf['tuesday_break_to'] == '8:00 pm') echo 'selected="selected"' ?> >8 pm</option>
									<option value="9:00 pm" <?php if ($sch_settings_inf['tuesday_break_to'] == '9:00 pm') echo 'selected="selected"' ?>>9 pm</option>
									<option value="10:00 pm"<?php if ($sch_settings_inf['tuesday_break_to'] == '10:00 pm') echo 'selected="selected"' ?>>10 pm</option>
									<option value="11:00 pm" <?php if ($sch_settings_inf['tuesday_break_to'] == '11:00 pm') echo 'selected="selected"' ?>>11 pm</option>
									<option value="12:00 pm" <?php if ($sch_settings_inf['tuesday_break_to'] == '12:00 pm') echo 'selected="selected"' ?>>12 pm</option>
																  
									  </select>
												</td>
											  
                                            </tr>
											
											<tr>
                                                <td class="td">Wednesday</td>
                                                 
                                                <td id="selectbox2">
												 <select class="form-control" id="wednesday_fn_from" name="wednesday_fn_from" parsley-trigger="change" parsley-required="true" parsley-error-container="#selectbox">
									<option value="1" <?php if ($sch_settings_inf['wednesday_fn_from'] == '1') echo 'selected="selected"' ?> >1 am</option>
									<option value="2" <?php if ($sch_settings_inf['wednesday_fn_from'] == '2') echo 'selected="selected"' ?>>2 am</option>
									<option value="3" <?php if ($sch_settings_inf['wednesday_fn_from'] == '3') echo 'selected="selected"' ?>>3 am</option>
									<option value="4" <?php if ($sch_settings_inf['wednesday_fn_from'] == '4') echo 'selected="selected"' ?>>4 am</option>
									<option value="5" <?php if ($sch_settings_inf['wednesday_fn_from'] == '5') echo 'selected="selected"' ?>>5 am</option>
									<option value="6" <?php if ($sch_settings_inf['wednesday_fn_from'] == '6') echo 'selected="selected"' ?>>6 am</option>
									<option value="7" <?php if ($sch_settings_inf['wednesday_fn_from'] == '7') echo 'selected="selected"' ?>>7 am</option>
									<option value="8" <?php if ($sch_settings_inf['wednesday_fn_from'] == '8') echo 'selected="selected"' ?> >8 am</option>
									<option value="9" <?php if ($sch_settings_inf['wednesday_fn_from'] == '9') echo 'selected="selected"' ?>>9 am</option>
									<option value="10"<?php if ($sch_settings_inf['wednesday_fn_from'] == '10') echo 'selected="selected"' ?>>10 am</option>
									<option value="11" <?php if ($sch_settings_inf['wednesday_fn_from'] == '11') echo 'selected="selected"' ?>>11 am</option>
									<option value="12" <?php if ($sch_settings_inf['wednesday_fn_from'] == '12') echo 'selected="selected"' ?>>12 am</option>
							</select>
												</td>
												<td>
												<select class="form-control" id="wednesday_an_to" name="wednesday_an_to" >
									<option value="1" <?php if ($sch_settings_inf['wednesday_an_to'] == '1') echo 'selected="selected"' ?> >1 pm</option>
									<option value="2" <?php if ($sch_settings_inf['wednesday_an_to'] == '2') echo 'selected="selected"' ?>>2 pm</option>
									<option value="3" <?php if ($sch_settings_inf['wednesday_an_to'] == '3') echo 'selected="selected"' ?>>3 pm</option>
									<option value="4" <?php if ($sch_settings_inf['wednesday_an_to'] == '4') echo 'selected="selected"' ?>>4 pm</option>
									<option value="5" <?php if ($sch_settings_inf['wednesday_an_to'] == '5') echo 'selected="selected"' ?>>5 pm</option>
									<option value="6" <?php if ($sch_settings_inf['wednesday_an_to'] == '6') echo 'selected="selected"' ?>>6 pm</option>
									<option value="7" <?php if ($sch_settings_inf['wednesday_an_to'] == '7') echo 'selected="selected"' ?>>7 pm</option>
									<option value="8" <?php if ($sch_settings_inf['wednesday_an_to'] == '8') echo 'selected="selected"' ?> >8 pm</option>
									<option value="9" <?php if ($sch_settings_inf['wednesday_an_to'] == '9') echo 'selected="selected"' ?>>9 pm</option>
									<option value="10"<?php if ($sch_settings_inf['wednesday_an_to'] == '10') echo 'selected="selected"' ?>>10 pm</option>
									<option value="11" <?php if ($sch_settings_inf['wednesday_an_to'] == '11') echo 'selected="selected"' ?>>11 pm</option>
									<option value="12" <?php if ($sch_settings_inf['wednesday_an_to'] == '12') echo 'selected="selected"' ?>>12 pm</option>
							</select>
												</td>
											  
                                            </tr>
											
											
											<tr id="break3">
                                                   <td class="break_time">Break Time</td>
                                                  <td >
												 <select class="form-control" id="wednesday_break_from" name="wednesday_break_from">
									<option value="">Please Select</option>
									<option value="1:00 am" <?php if ($sch_settings_inf['wednesday_break_from'] == '1:00 am') echo 'selected="selected"' ?> >1 am</option>
									<option value="2:00 am" <?php if ($sch_settings_inf['wednesday_break_from'] == '2:00 am') echo 'selected="selected"' ?>>2 am</option>
									<option value="3:00 am" <?php if ($sch_settings_inf['wednesday_break_from'] == '3:00 am') echo 'selected="selected"' ?>>3 am</option>
									<option value="4:00 am" <?php if ($sch_settings_inf['wednesday_break_from'] == '4:00 am') echo 'selected="selected"' ?>>4 am</option>
									<option value="5:00 am" <?php if ($sch_settings_inf['wednesday_break_from'] == '5:00 am') echo 'selected="selected"' ?>>5 am</option>
									<option value="6:00 am" <?php if ($sch_settings_inf['wednesday_break_from'] == '6:00 am') echo 'selected="selected"' ?>>6 am</option>
									<option value="7:00 am" <?php if ($sch_settings_inf['wednesday_break_from'] == '7:00 am') echo 'selected="selected"' ?>>7 am</option>
									<option value="8:00 am" <?php if ($sch_settings_inf['wednesday_break_from'] == '8:00 am') echo 'selected="selected"' ?> >8 am</option>
									<option value="9:00 am" <?php if ($sch_settings_inf['wednesday_break_from'] == '9:00 am') echo 'selected="selected"' ?>>9 am</option>
									<option value="10:00 am"<?php if ($sch_settings_inf['wednesday_break_from'] == '10:00 am') echo 'selected="selected"' ?>>10 am</option>
									<option value="11:00 am" <?php if ($sch_settings_inf['wednesday_break_from'] == '11:00 am') echo 'selected="selected"' ?>>11 am</option>
									<option value="12:00 am" <?php if ($sch_settings_inf['wednesday_break_from'] == '12:00 am') echo 'selected="selected"' ?>>12 am</option>
									<option value="1:00 pm" <?php if ($sch_settings_inf['wednesday_break_from'] == '1:00 pm') echo 'selected="selected"' ?> >1 pm</option>
									<option value="2:00 pm" <?php if ($sch_settings_inf['wednesday_break_from'] == '2:00 pm') echo 'selected="selected"' ?>>2 pm</option>
									<option value="3:00 pm" <?php if ($sch_settings_inf['wednesday_break_from'] == '3:00 pm') echo 'selected="selected"' ?>>3 pm</option>
									<option value="4:00 pm" <?php if ($sch_settings_inf['wednesday_break_from'] == '4:00 pm') echo 'selected="selected"' ?>>4 pm</option>
									<option value="5:00 pm" <?php if ($sch_settings_inf['wednesday_break_from'] == '5:00 pm') echo 'selected="selected"' ?>>5 pm</option>
									<option value="6:00 pm" <?php if ($sch_settings_inf['wednesday_break_from'] == '6:00 pm') echo 'selected="selected"' ?>>6 pm</option>
									<option value="7:00 pm" <?php if ($sch_settings_inf['wednesday_break_from'] == '7:00 pm') echo 'selected="selected"' ?>>7 pm</option>
									<option value="8:00 pm" <?php if ($sch_settings_inf['wednesday_break_from'] == '8:00 pm') echo 'selected="selected"' ?> >8 pm</option>
									<option value="9:00 pm" <?php if ($sch_settings_inf['wednesday_break_from'] == '9:00 pm') echo 'selected="selected"' ?>>9 pm</option>
									<option value="10:00 pm"<?php if ($sch_settings_inf['wednesday_break_from'] == '10:00 pm') echo 'selected="selected"' ?>>10 pm</option>
									<option value="11:00 pm" <?php if ($sch_settings_inf['wednesday_break_from'] == '11:00 pm') echo 'selected="selected"' ?>>11 pm</option>
									<option value="12:00 pm" <?php if ($sch_settings_inf['wednesday_break_from'] == '12:00 pm') echo 'selected="selected"' ?>>12 pm</option>
						
							</select>
												</td>
												<td>
												<select class="form-control" id="wednesday_break_to" name="wednesday_break_to" >
									<option value="">Please Select</option>
									<option value="1:00 am" <?php if ($sch_settings_inf['wednesday_break_to'] == '1:00 am') echo 'selected="selected"' ?> >1 am</option>
									<option value="2:00 am" <?php if ($sch_settings_inf['wednesday_break_to'] == '2:00 am') echo 'selected="selected"' ?>>2 am</option>
									<option value="3:00 am" <?php if ($sch_settings_inf['wednesday_break_to'] == '3:00 am') echo 'selected="selected"' ?>>3 am</option>
									<option value="4:00 am" <?php if ($sch_settings_inf['wednesday_break_to'] == '4:00 am') echo 'selected="selected"' ?>>4 am</option>
									<option value="5:00 am" <?php if ($sch_settings_inf['wednesday_break_to'] == '5:00 am') echo 'selected="selected"' ?>>5 am</option>
									<option value="6:00 am" <?php if ($sch_settings_inf['wednesday_break_to'] == '6:00 am') echo 'selected="selected"' ?>>6 am</option>
									<option value="7:00 am" <?php if ($sch_settings_inf['wednesday_break_to'] == '7:00 am') echo 'selected="selected"' ?>>7 am</option>
									<option value="8:00 am" <?php if ($sch_settings_inf['wednesday_break_to'] == '8:00 am') echo 'selected="selected"' ?> >8 am</option>
									<option value="9:00 am" <?php if ($sch_settings_inf['wednesday_break_to'] == '9:00 am') echo 'selected="selected"' ?>>9 am</option>
									<option value="10:00 am"<?php if ($sch_settings_inf['wednesday_break_to'] == '10:00 am') echo 'selected="selected"' ?>>10 am</option>
									<option value="11:00 am" <?php if ($sch_settings_inf['wednesday_break_to'] == '11:00 am') echo 'selected="selected"' ?>>11 am</option>
									<option value="12:00 am" <?php if ($sch_settings_inf['wednesday_break_to'] == '12:00 am') echo 'selected="selected"' ?>>12 am</option>
									<option value="1:00 pm" <?php if ($sch_settings_inf['wednesday_break_to'] == '1:00 pm') echo 'selected="selected"' ?> >1 pm</option>
									<option value="2:00 pm" <?php if ($sch_settings_inf['wednesday_break_to'] == '2:00 pm') echo 'selected="selected"' ?>>2 pm</option>
									<option value="3:00 pm" <?php if ($sch_settings_inf['wednesday_break_to'] == '3:00 pm') echo 'selected="selected"' ?>>3 pm</option>
									<option value="4:00 pm" <?php if ($sch_settings_inf['wednesday_break_to'] == '4:00 pm') echo 'selected="selected"' ?>>4 pm</option>
									<option value="5:00 pm" <?php if ($sch_settings_inf['wednesday_break_to'] == '5:00 pm') echo 'selected="selected"' ?>>5 pm</option>
									<option value="6:00 pm" <?php if ($sch_settings_inf['wednesday_break_to'] == '6:00 pm') echo 'selected="selected"' ?>>6 pm</option>
									<option value="7:00 pm" <?php if ($sch_settings_inf['wednesday_break_to'] == '7:00 pm') echo 'selected="selected"' ?>>7 pm</option>
									<option value="8:00 pm" <?php if ($sch_settings_inf['wednesday_break_to'] == '8:00 pm') echo 'selected="selected"' ?> >8 pm</option>
									<option value="9:00 pm" <?php if ($sch_settings_inf['wednesday_break_to'] == '9:00 pm') echo 'selected="selected"' ?>>9 pm</option>
									<option value="10:00 pm"<?php if ($sch_settings_inf['wednesday_break_to'] == '10:00 pm') echo 'selected="selected"' ?>>10 pm</option>
									<option value="11:00 pm" <?php if ($sch_settings_inf['wednesday_break_to'] == '11:00 pm') echo 'selected="selected"' ?>>11 pm</option>
									<option value="12:00 pm" <?php if ($sch_settings_inf['wednesday_break_to'] == '12:00 pm') echo 'selected="selected"' ?>>12 pm</option>
							
									  </select>
												</td>
											  
                                            </tr>
											<tr>
                                                <td class="td">Thursday</td>
                                                 
                                                <td id="selectbox2">
												 <select class="form-control" id="thursday_fn_from" name="thursday_fn_from" >
									<option value="1" <?php if ($sch_settings_inf['thursday_fn_from'] == '1') echo 'selected="selected"' ?> >1 am</option>
									<option value="2" <?php if ($sch_settings_inf['thursday_fn_from'] == '2') echo 'selected="selected"' ?>>2 am</option>
									<option value="3" <?php if ($sch_settings_inf['thursday_fn_from'] == '3') echo 'selected="selected"' ?>>3 am</option>
									<option value="4" <?php if ($sch_settings_inf['thursday_fn_from'] == '4') echo 'selected="selected"' ?>>4 am</option>
									<option value="5" <?php if ($sch_settings_inf['thursday_fn_from'] == '5') echo 'selected="selected"' ?>>5 am</option>
									<option value="6" <?php if ($sch_settings_inf['thursday_fn_from'] == '6') echo 'selected="selected"' ?>>6 am</option>
									<option value="7" <?php if ($sch_settings_inf['thursday_fn_from'] == '7') echo 'selected="selected"' ?>>7 am</option>
									<option value="8" <?php if ($sch_settings_inf['thursday_fn_from'] == '8') echo 'selected="selected"' ?> >8 am</option>
									<option value="9" <?php if ($sch_settings_inf['thursday_fn_from'] == '9') echo 'selected="selected"' ?>>9 am</option>
									<option value="10"<?php if ($sch_settings_inf['thursday_fn_from'] == '10') echo 'selected="selected"' ?>>10 am</option>
									<option value="11" <?php if ($sch_settings_inf['thursday_fn_from'] == '11') echo 'selected="selected"' ?>>11 am</option>
									<option value="12" <?php if ($sch_settings_inf['thursday_fn_from'] == '12') echo 'selected="selected"' ?>>12 am</option>
							</select>
												</td>
												<td>
												<select class="form-control" id="thursday_an_to" name="thursday_an_to" parsley-trigger="change" parsley-required="true" parsley-error-container="#selectbox">
									<option value="1" <?php if ($sch_settings_inf['thursday_an_to'] == '1') echo 'selected="selected"' ?> >1 pm</option>
									<option value="2" <?php if ($sch_settings_inf['thursday_an_to'] == '2') echo 'selected="selected"' ?>>2 pm</option>
									<option value="3" <?php if ($sch_settings_inf['thursday_an_to'] == '3') echo 'selected="selected"' ?>>3 pm</option>
									<option value="4" <?php if ($sch_settings_inf['thursday_an_to'] == '4') echo 'selected="selected"' ?>>4 pm</option>
									<option value="5" <?php if ($sch_settings_inf['thursday_an_to'] == '5') echo 'selected="selected"' ?>>5 pm</option>
									<option value="6" <?php if ($sch_settings_inf['thursday_an_to'] == '6') echo 'selected="selected"' ?>>6 pm</option>
									<option value="7" <?php if ($sch_settings_inf['thursday_an_to'] == '7') echo 'selected="selected"' ?>>7 pm</option>
									<option value="8" <?php if ($sch_settings_inf['thursday_an_to'] == '8') echo 'selected="selected"' ?> >8 pm</option>
									<option value="9" <?php if ($sch_settings_inf['thursday_an_to'] == '9') echo 'selected="selected"' ?>>9 pm</option>
									<option value="10"<?php if ($sch_settings_inf['thursday_an_to'] == '10') echo 'selected="selected"' ?>>10 pm</option>
									<option value="11" <?php if ($sch_settings_inf['thursday_an_to'] == '11') echo 'selected="selected"' ?>>11 pm</option>
									<option value="12" <?php if ($sch_settings_inf['thursday_an_to'] == '12') echo 'selected="selected"' ?>>12 pm</option>
							</select>
												</td>
											  
                                            </tr>
											
											<tr id="break4">
                                                   <td class="break_time">Break Time</td>
                                                  <td >
												 <select class="form-control" id="thursday_break_from" name="thursday_break_from">
										<option value="">Please Select</option>
									<option value="1:00 am" <?php if ($sch_settings_inf['thursday_break_from'] == '1:00 am') echo 'selected="selected"' ?> >1 am</option>
									<option value="2:00 am" <?php if ($sch_settings_inf['thursday_break_from'] == '2:00 am') echo 'selected="selected"' ?>>2 am</option>
									<option value="3:00 am" <?php if ($sch_settings_inf['thursday_break_from'] == '3:00 am') echo 'selected="selected"' ?>>3 am</option>
									<option value="4:00 am" <?php if ($sch_settings_inf['thursday_break_from'] == '4:00 am') echo 'selected="selected"' ?>>4 am</option>
									<option value="5:00 am" <?php if ($sch_settings_inf['thursday_break_from'] == '5:00 am') echo 'selected="selected"' ?>>5 am</option>
									<option value="6:00 am" <?php if ($sch_settings_inf['thursday_break_from'] == '6:00 am') echo 'selected="selected"' ?>>6 am</option>
									<option value="7:00 am" <?php if ($sch_settings_inf['thursday_break_from'] == '7:00 am') echo 'selected="selected"' ?>>7 am</option>
									<option value="8:00 am" <?php if ($sch_settings_inf['thursday_break_from'] == '8:00 am') echo 'selected="selected"' ?> >8 am</option>
									<option value="9:00 am" <?php if ($sch_settings_inf['thursday_break_from'] == '9:00 am') echo 'selected="selected"' ?>>9 am</option>
									<option value="10:00 am"<?php if ($sch_settings_inf['thursday_break_from'] == '10:00 am') echo 'selected="selected"' ?>>10 am</option>
									<option value="11:00 am" <?php if ($sch_settings_inf['thursday_break_from'] == '11:00 am') echo 'selected="selected"' ?>>11 am</option>
									<option value="12:00 am" <?php if ($sch_settings_inf['thursday_break_from'] == '12:00 am') echo 'selected="selected"' ?>>12 am</option>
									<option value="1:00 pm" <?php if ($sch_settings_inf['thursday_break_from'] == '1:00 pm') echo 'selected="selected"' ?> >1 pm</option>
									<option value="2:00 pm" <?php if ($sch_settings_inf['thursday_break_from'] == '2:00 pm') echo 'selected="selected"' ?>>2 pm</option>
									<option value="3:00 pm" <?php if ($sch_settings_inf['thursday_break_from'] == '3:00 pm') echo 'selected="selected"' ?>>3 pm</option>
									<option value="4:00 pm" <?php if ($sch_settings_inf['thursday_break_from'] == '4:00 pm') echo 'selected="selected"' ?>>4 pm</option>
									<option value="5:00 pm" <?php if ($sch_settings_inf['thursday_break_from'] == '5:00 pm') echo 'selected="selected"' ?>>5 pm</option>
									<option value="6:00 pm" <?php if ($sch_settings_inf['thursday_break_from'] == '6:00 pm') echo 'selected="selected"' ?>>6 pm</option>
									<option value="7:00 pm" <?php if ($sch_settings_inf['thursday_break_from'] == '7:00 pm') echo 'selected="selected"' ?>>7 pm</option>
									<option value="8:00 pm" <?php if ($sch_settings_inf['thursday_break_from'] == '8:00 pm') echo 'selected="selected"' ?> >8 pm</option>
									<option value="9:00 pm" <?php if ($sch_settings_inf['thursday_break_from'] == '9:00 pm') echo 'selected="selected"' ?>>9 pm</option>
									<option value="10:00 pm"<?php if ($sch_settings_inf['thursday_break_from'] == '10:00 pm') echo 'selected="selected"' ?>>10 pm</option>
									<option value="11:00 pm" <?php if ($sch_settings_inf['thursday_break_from'] == '11:00 pm') echo 'selected="selected"' ?>>11 pm</option>
									<option value="12:00 pm" <?php if ($sch_settings_inf['thursday_break_from'] == '12:00 pm') echo 'selected="selected"' ?>>12 pm</option>
							
							</select>
												</td>
												<td>
												<select class="form-control" id="thursday_break_to" name="thursday_break_to" >
									<option value="">Please Select</option>
									<option value="1:00 am" <?php if ($sch_settings_inf['thursday_break_to'] == '1:00 am') echo 'selected="selected"' ?> >1 am</option>
									<option value="2:00 am" <?php if ($sch_settings_inf['thursday_break_to'] == '2:00 am') echo 'selected="selected"' ?>>2 am</option>
									<option value="3:00 am" <?php if ($sch_settings_inf['thursday_break_to'] == '3:00 am') echo 'selected="selected"' ?>>3 am</option>
									<option value="4:00 am" <?php if ($sch_settings_inf['thursday_break_to'] == '4:00 am') echo 'selected="selected"' ?>>4 am</option>
									<option value="5:00 am" <?php if ($sch_settings_inf['thursday_break_to'] == '5:00 am') echo 'selected="selected"' ?>>5 am</option>
									<option value="6:00 am" <?php if ($sch_settings_inf['thursday_break_to'] == '6:00 am') echo 'selected="selected"' ?>>6 am</option>
									<option value="7:00 am" <?php if ($sch_settings_inf['thursday_break_to'] == '7:00 am') echo 'selected="selected"' ?>>7 am</option>
									<option value="8:00 am" <?php if ($sch_settings_inf['thursday_break_to'] == '8:00 am') echo 'selected="selected"' ?> >8 am</option>
									<option value="9:00 am" <?php if ($sch_settings_inf['thursday_break_to'] == '9:00 am') echo 'selected="selected"' ?>>9 am</option>
									<option value="10:00 am"<?php if ($sch_settings_inf['thursday_break_to'] == '10:00 am') echo 'selected="selected"' ?>>10 am</option>
									<option value="11:00 am" <?php if ($sch_settings_inf['thursday_break_to'] == '11:00 am') echo 'selected="selected"' ?>>11 am</option>
									<option value="12:00 am" <?php if ($sch_settings_inf['thursday_break_to'] == '12:00 am') echo 'selected="selected"' ?>>12 am</option>
									<option value="1:00 pm" <?php if ($sch_settings_inf['thursday_break_to'] == '1:00 pm') echo 'selected="selected"' ?> >1 pm</option>
									<option value="2:00 pm" <?php if ($sch_settings_inf['thursday_break_to'] == '2:00 pm') echo 'selected="selected"' ?>>2 pm</option>
									<option value="3:00 pm" <?php if ($sch_settings_inf['thursday_break_to'] == '3:00 pm') echo 'selected="selected"' ?>>3 pm</option>
									<option value="4:00 pm" <?php if ($sch_settings_inf['thursday_break_to'] == '4:00 pm') echo 'selected="selected"' ?>>4 pm</option>
									<option value="5:00 pm" <?php if ($sch_settings_inf['thursday_break_to'] == '5:00 pm') echo 'selected="selected"' ?>>5 pm</option>
									<option value="6:00 pm" <?php if ($sch_settings_inf['thursday_break_to'] == '6:00 pm') echo 'selected="selected"' ?>>6 pm</option>
									<option value="7:00 pm" <?php if ($sch_settings_inf['thursday_break_to'] == '7:00 pm') echo 'selected="selected"' ?>>7 pm</option>
									<option value="8:00 pm" <?php if ($sch_settings_inf['thursday_break_to'] == '8:00 pm') echo 'selected="selected"' ?> >8 pm</option>
									<option value="9:00 pm" <?php if ($sch_settings_inf['thursday_break_to'] == '9:00 pm') echo 'selected="selected"' ?>>9 pm</option>
									<option value="10:00 pm"<?php if ($sch_settings_inf['thursday_break_to'] == '10:00 pm') echo 'selected="selected"' ?>>10 pm</option>
									<option value="11:00 pm" <?php if ($sch_settings_inf['thursday_break_to'] == '11:00 pm') echo 'selected="selected"' ?>>11 pm</option>
									<option value="12:00 pm" <?php if ($sch_settings_inf['thursday_break_to'] == '12:00 pm') echo 'selected="selected"' ?>>12 pm</option>
							
									  </select>
												</td>
											  
                                            </tr>
											
											
											<tr>
                                                <td class="td">Friday</td>
                                                 
                                                <td id="selectbox2">
												 <select class="form-control" id="friday_fn_from" name="friday_fn_from" parsley-trigger="change" parsley-required="true" parsley-error-container="#selectbox">
									<option value="1" <?php if ($sch_settings_inf['friday_fn_from'] == '1') echo 'selected="selected"' ?> >1 am</option>
									<option value="2" <?php if ($sch_settings_inf['friday_fn_from'] == '2') echo 'selected="selected"' ?>>2 am</option>
									<option value="3" <?php if ($sch_settings_inf['friday_fn_from'] == '3') echo 'selected="selected"' ?>>3 am</option>
									<option value="4" <?php if ($sch_settings_inf['friday_fn_from'] == '4') echo 'selected="selected"' ?>>4 am</option>
									<option value="5" <?php if ($sch_settings_inf['friday_fn_from'] == '5') echo 'selected="selected"' ?>>5 am</option>
									<option value="6" <?php if ($sch_settings_inf['friday_fn_from'] == '6') echo 'selected="selected"' ?>>6 am</option>
									<option value="7" <?php if ($sch_settings_inf['friday_fn_from'] == '7') echo 'selected="selected"' ?>>7 am</option>
									<option value="8" <?php if ($sch_settings_inf['friday_fn_from'] == '8') echo 'selected="selected"' ?> >8 am</option>
									<option value="9" <?php if ($sch_settings_inf['friday_fn_from'] == '9') echo 'selected="selected"' ?>>9 am</option>
									<option value="10"<?php if ($sch_settings_inf['friday_fn_from'] == '10') echo 'selected="selected"' ?>>10 am</option>
									<option value="11" <?php if ($sch_settings_inf['friday_fn_from'] == '11') echo 'selected="selected"' ?>>11 am</option>
									<option value="12" <?php if ($sch_settings_inf['friday_fn_from'] == '12') echo 'selected="selected"' ?>>12 am</option>
							</select>
												</td>
												<td>
												<select class="form-control" id="friday_an_to" name="friday_an_to" parsley-trigger="change" parsley-required="true" parsley-error-container="#selectbox">
									<option value="1" <?php if ($sch_settings_inf['friday_an_to'] == '1') echo 'selected="selected"' ?> >1 pm</option>
									<option value="2" <?php if ($sch_settings_inf['friday_an_to'] == '2') echo 'selected="selected"' ?>>2 pm</option>
									<option value="3" <?php if ($sch_settings_inf['friday_an_to'] == '3') echo 'selected="selected"' ?>>3 pm</option>
									<option value="4" <?php if ($sch_settings_inf['friday_an_to'] == '4') echo 'selected="selected"' ?>>4 pm</option>
									<option value="5" <?php if ($sch_settings_inf['friday_an_to'] == '5') echo 'selected="selected"' ?>>5 pm</option>
									<option value="6" <?php if ($sch_settings_inf['friday_an_to'] == '6') echo 'selected="selected"' ?>>6 pm</option>
									<option value="7" <?php if ($sch_settings_inf['friday_an_to'] == '7') echo 'selected="selected"' ?>>7 pm</option>
									<option value="8" <?php if ($sch_settings_inf['friday_an_to'] == '8') echo 'selected="selected"' ?> >8 pm</option>
									<option value="9" <?php if ($sch_settings_inf['friday_an_to'] == '9') echo 'selected="selected"' ?>>9 pm</option>
									<option value="10"<?php if ($sch_settings_inf['friday_an_to'] == '10') echo 'selected="selected"' ?>>10 pm</option>
									<option value="11" <?php if ($sch_settings_inf['friday_an_to'] == '11') echo 'selected="selected"' ?>>11 pm</option>
									<option value="12" <?php if ($sch_settings_inf['friday_an_to'] == '12') echo 'selected="selected"' ?>>12 pm</option>
							</select>
												</td>
											  
                                            </tr>
											
											
											<tr id="break5">
                                                   <td class="break_time">Break Time</td>
                                                  <td >
												 <select class="form-control" id="friday_break_from" name="friday_break_from">
												<option value="">Please Select</option>
									<option value="1:00 am" <?php if ($sch_settings_inf['friday_break_from'] == '1:00 am') echo 'selected="selected"' ?> >1 am</option>
									<option value="2:00 am" <?php if ($sch_settings_inf['friday_break_from'] == '2:00 am') echo 'selected="selected"' ?>>2 am</option>
									<option value="3:00 am" <?php if ($sch_settings_inf['friday_break_from'] == '3:00 am') echo 'selected="selected"' ?>>3 am</option>
									<option value="4:00 am" <?php if ($sch_settings_inf['friday_break_from'] == '4:00 am') echo 'selected="selected"' ?>>4 am</option>
									<option value="5:00 am" <?php if ($sch_settings_inf['friday_break_from'] == '5:00 am') echo 'selected="selected"' ?>>5 am</option>
									<option value="6:00 am" <?php if ($sch_settings_inf['friday_break_from'] == '6:00 am') echo 'selected="selected"' ?>>6 am</option>
									<option value="7:00 am" <?php if ($sch_settings_inf['friday_break_from'] == '7:00 am') echo 'selected="selected"' ?>>7 am</option>
									<option value="8:00 am" <?php if ($sch_settings_inf['friday_break_from'] == '8:00 am') echo 'selected="selected"' ?> >8 am</option>
									<option value="9:00 am" <?php if ($sch_settings_inf['friday_break_from'] == '9:00 am') echo 'selected="selected"' ?>>9 am</option>
									<option value="10:00 am"<?php if ($sch_settings_inf['friday_break_from'] == '10:00 am') echo 'selected="selected"' ?>>10 am</option>
									<option value="11:00 am" <?php if ($sch_settings_inf['friday_break_from'] == '11:00 am') echo 'selected="selected"' ?>>11 am</option>
									<option value="12:00 am" <?php if ($sch_settings_inf['friday_break_from'] == '12:00 am') echo 'selected="selected"' ?>>12 am</option>
									<option value="1:00 pm" <?php if ($sch_settings_inf['friday_break_from'] == '1:00 pm') echo 'selected="selected"' ?> >1 pm</option>
									<option value="2:00 pm" <?php if ($sch_settings_inf['friday_break_from'] == '2:00 pm') echo 'selected="selected"' ?>>2 pm</option>
									<option value="3:00 pm" <?php if ($sch_settings_inf['friday_break_from'] == '3:00 pm') echo 'selected="selected"' ?>>3 pm</option>
									<option value="4:00 pm" <?php if ($sch_settings_inf['friday_break_from'] == '4:00 pm') echo 'selected="selected"' ?>>4 pm</option>
									<option value="5:00 pm" <?php if ($sch_settings_inf['friday_break_from'] == '5:00 pm') echo 'selected="selected"' ?>>5 pm</option>
									<option value="6:00 pm" <?php if ($sch_settings_inf['friday_break_from'] == '6:00 pm') echo 'selected="selected"' ?>>6 pm</option>
									<option value="7:00 pm" <?php if ($sch_settings_inf['friday_break_from'] == '7:00 pm') echo 'selected="selected"' ?>>7 pm</option>
									<option value="8:00 pm" <?php if ($sch_settings_inf['friday_break_from'] == '8:00 pm') echo 'selected="selected"' ?> >8 pm</option>
									<option value="9:00 pm" <?php if ($sch_settings_inf['friday_break_from'] == '9:00 pm') echo 'selected="selected"' ?>>9 pm</option>
									<option value="10:00 pm"<?php if ($sch_settings_inf['friday_break_from'] == '10:00 pm') echo 'selected="selected"' ?>>10 pm</option>
									<option value="11:00 pm" <?php if ($sch_settings_inf['friday_break_from'] == '11:00 pm') echo 'selected="selected"' ?>>11 pm</option>
									<option value="12:00 pm" <?php if ($sch_settings_inf['friday_break_from'] == '12:00 pm') echo 'selected="selected"' ?>>12 pm</option>
							
							</select>
												</td>
												<td>
												<select class="form-control" id="friday_break_to" name="friday_break_to" >
                                            <option value="">Please Select</option>
									<option value="1:00 am" <?php if ($sch_settings_inf['friday_break_to'] == '1:00 am') echo 'selected="selected"' ?> >1 am</option>
									<option value="2:00 am" <?php if ($sch_settings_inf['friday_break_to'] == '2:00 am') echo 'selected="selected"' ?>>2 am</option>
									<option value="3:00 am" <?php if ($sch_settings_inf['friday_break_to'] == '3:00 am') echo 'selected="selected"' ?>>3 am</option>
									<option value="4:00 am" <?php if ($sch_settings_inf['friday_break_to'] == '4:00 am') echo 'selected="selected"' ?>>4 am</option>
									<option value="5:00 am" <?php if ($sch_settings_inf['friday_break_to'] == '5:00 am') echo 'selected="selected"' ?>>5 am</option>
									<option value="6:00 am" <?php if ($sch_settings_inf['friday_break_to'] == '6:00 am') echo 'selected="selected"' ?>>6 am</option>
									<option value="7:00 am" <?php if ($sch_settings_inf['friday_break_to'] == '7:00 am') echo 'selected="selected"' ?>>7 am</option>
									<option value="8:00 am" <?php if ($sch_settings_inf['friday_break_to'] == '8:00 am') echo 'selected="selected"' ?> >8 am</option>
									<option value="9:00 am" <?php if ($sch_settings_inf['friday_break_to'] == '9:00 am') echo 'selected="selected"' ?>>9 am</option>
									<option value="10:00 am"<?php if ($sch_settings_inf['friday_break_to'] == '10:00 am') echo 'selected="selected"' ?>>10 am</option>
									<option value="11:00 am" <?php if ($sch_settings_inf['friday_break_to'] == '11:00 am') echo 'selected="selected"' ?>>11 am</option>
									<option value="12:00 am" <?php if ($sch_settings_inf['friday_break_to'] == '12:00 am') echo 'selected="selected"' ?>>12 am</option>
									<option value="1:00 pm" <?php if ($sch_settings_inf['friday_break_to'] == '1:00 pm') echo 'selected="selected"' ?> >1 pm</option>
									<option value="2:00 pm" <?php if ($sch_settings_inf['friday_break_to'] == '2:00 pm') echo 'selected="selected"' ?>>2 pm</option>
									<option value="3:00 pm" <?php if ($sch_settings_inf['friday_break_to'] == '3:00 pm') echo 'selected="selected"' ?>>3 pm</option>
									<option value="4:00 pm" <?php if ($sch_settings_inf['friday_break_to'] == '4:00 pm') echo 'selected="selected"' ?>>4 pm</option>
									<option value="5:00 pm" <?php if ($sch_settings_inf['friday_break_to'] == '5:00 pm') echo 'selected="selected"' ?>>5 pm</option>
									<option value="6:00 pm" <?php if ($sch_settings_inf['friday_break_to'] == '6:00 pm') echo 'selected="selected"' ?>>6 pm</option>
									<option value="7:00 pm" <?php if ($sch_settings_inf['friday_break_to'] == '7:00 pm') echo 'selected="selected"' ?>>7 pm</option>
									<option value="8:00 pm" <?php if ($sch_settings_inf['friday_break_to'] == '8:00 pm') echo 'selected="selected"' ?> >8 pm</option>
									<option value="9:00 pm" <?php if ($sch_settings_inf['friday_break_to'] == '9:00 pm') echo 'selected="selected"' ?>>9 pm</option>
									<option value="10:00 pm"<?php if ($sch_settings_inf['friday_break_to'] == '10:00 pm') echo 'selected="selected"' ?>>10 pm</option>
									<option value="11:00 pm" <?php if ($sch_settings_inf['friday_break_to'] == '11:00 pm') echo 'selected="selected"' ?>>11 pm</option>
									<option value="12:00 pm" <?php if ($sch_settings_inf['friday_break_to'] == '12:00 pm') echo 'selected="selected"' ?>>12 pm</option>
										  
									  </select>
												</td>
											  
                                            </tr>
											
											<tr>
                                                <td class="td">Saturday</td>
                                                 
                                                <td >
												 <select class="form-control" id="saturday_fn_from" name="saturday_fn_from" >
									<option value="1" <?php if ($sch_settings_inf['saturday_fn_from'] == '1') echo 'selected="selected"' ?> >1 am</option>
									<option value="2" <?php if ($sch_settings_inf['saturday_fn_from'] == '2') echo 'selected="selected"' ?>>2 am</option>
									<option value="3" <?php if ($sch_settings_inf['saturday_fn_from'] == '3') echo 'selected="selected"' ?>>3 am</option>
									<option value="4" <?php if ($sch_settings_inf['saturday_fn_from'] == '4') echo 'selected="selected"' ?>>4 am</option>
									<option value="5" <?php if ($sch_settings_inf['saturday_fn_from'] == '5') echo 'selected="selected"' ?>>5 am</option>
									<option value="6" <?php if ($sch_settings_inf['saturday_fn_from'] == '6') echo 'selected="selected"' ?>>6 am</option>
									<option value="7" <?php if ($sch_settings_inf['saturday_fn_from'] == '7') echo 'selected="selected"' ?>>7 am</option>
									<option value="8" <?php if ($sch_settings_inf['saturday_fn_from'] == '8') echo 'selected="selected"' ?> >8 am</option>
									<option value="9" <?php if ($sch_settings_inf['saturday_fn_from'] == '9') echo 'selected="selected"' ?>>9 am</option>
									<option value="10"<?php if ($sch_settings_inf['saturday_fn_from'] == '10') echo 'selected="selected"' ?>>10 am</option>
									<option value="11" <?php if ($sch_settings_inf['saturday_fn_from'] == '11') echo 'selected="selected"' ?>>11 am</option>
									<option value="12" <?php if ($sch_settings_inf['saturday_fn_from'] == '12') echo 'selected="selected"' ?>>12 am</option>
							</select>
												</td>
												<td>
												<select class="form-control" id="saturday_an_to" name="saturday_an_to" >
									<option value="1" <?php if ($sch_settings_inf['saturday_an_to'] == '1') echo 'selected="selected"' ?> >1 pm</option>
									<option value="2" <?php if ($sch_settings_inf['saturday_an_to'] == '2') echo 'selected="selected"' ?>>2 pm</option>
									<option value="3" <?php if ($sch_settings_inf['saturday_an_to'] == '3') echo 'selected="selected"' ?>>3 pm</option>
									<option value="4" <?php if ($sch_settings_inf['saturday_an_to'] == '4') echo 'selected="selected"' ?>>4 pm</option>
									<option value="5" <?php if ($sch_settings_inf['saturday_an_to'] == '5') echo 'selected="selected"' ?>>5 pm</option>
									<option value="6" <?php if ($sch_settings_inf['saturday_an_to'] == '6') echo 'selected="selected"' ?>>6 pm</option>
									<option value="7" <?php if ($sch_settings_inf['saturday_an_to'] == '7') echo 'selected="selected"' ?>>7 pm</option>
									<option value="8" <?php if ($sch_settings_inf['saturday_an_to'] == '8') echo 'selected="selected"' ?> >8 pm</option>
									<option value="9" <?php if ($sch_settings_inf['saturday_an_to'] == '9') echo 'selected="selected"' ?>>9 pm</option>
									<option value="10"<?php if ($sch_settings_inf['saturday_an_to'] == '10') echo 'selected="selected"' ?>>10 pm</option>
									<option value="11" <?php if ($sch_settings_inf['saturday_an_to'] == '11') echo 'selected="selected"' ?>>11 pm</option>
									<option value="12" <?php if ($sch_settings_inf['saturday_an_to'] == '12') echo 'selected="selected"' ?>>12 pm</option>
							</select>
												</td>
											  
                                            </tr>
											
											<tr id="break6">
                                                   <td class="break_time">Break Time</td>
                                                  <td>
												 <select class="form-control" id="saturday_break_from" name="saturday_break_from">
									 <option value="">Please Select</option>
									<option value="1:00 am" <?php if ($sch_settings_inf['saturday_break_from'] == '1:00 am') echo 'selected="selected"' ?> >1 am</option>
									<option value="2:00 am" <?php if ($sch_settings_inf['saturday_break_from'] == '2:00 am') echo 'selected="selected"' ?>>2 am</option>
									<option value="3:00 am" <?php if ($sch_settings_inf['saturday_break_from'] == '3:00 am') echo 'selected="selected"' ?>>3 am</option>
									<option value="4:00 am" <?php if ($sch_settings_inf['saturday_break_from'] == '4:00 am') echo 'selected="selected"' ?>>4 am</option>
									<option value="5:00 am" <?php if ($sch_settings_inf['saturday_break_from'] == '5:00 am') echo 'selected="selected"' ?>>5 am</option>
									<option value="6:00 am" <?php if ($sch_settings_inf['saturday_break_from'] == '6:00 am') echo 'selected="selected"' ?>>6 am</option>
									<option value="7:00 am" <?php if ($sch_settings_inf['saturday_break_from'] == '7:00 am') echo 'selected="selected"' ?>>7 am</option>
									<option value="8:00 am" <?php if ($sch_settings_inf['saturday_break_from'] == '8:00 am') echo 'selected="selected"' ?> >8 am</option>
									<option value="9:00 am" <?php if ($sch_settings_inf['saturday_break_from'] == '9:00 am') echo 'selected="selected"' ?>>9 am</option>
									<option value="10:00 am"<?php if ($sch_settings_inf['saturday_break_from'] == '10:00 am') echo 'selected="selected"' ?>>10 am</option>
									<option value="11:00 am" <?php if ($sch_settings_inf['saturday_break_from'] == '11:00 am') echo 'selected="selected"' ?>>11 am</option>
									<option value="12:00 am" <?php if ($sch_settings_inf['saturday_break_from'] == '12:00 am') echo 'selected="selected"' ?>>12 am</option>
									<option value="1:00 pm" <?php if ($sch_settings_inf['saturday_break_from'] == '1:00 pm') echo 'selected="selected"' ?> >1 pm</option>
									<option value="2:00 pm" <?php if ($sch_settings_inf['saturday_break_from'] == '2:00 pm') echo 'selected="selected"' ?>>2 pm</option>
									<option value="3:00 pm" <?php if ($sch_settings_inf['saturday_break_from'] == '3:00 pm') echo 'selected="selected"' ?>>3 pm</option>
									<option value="4:00 pm" <?php if ($sch_settings_inf['saturday_break_from'] == '4:00 pm') echo 'selected="selected"' ?>>4 pm</option>
									<option value="5:00 pm" <?php if ($sch_settings_inf['saturday_break_from'] == '5:00 pm') echo 'selected="selected"' ?>>5 pm</option>
									<option value="6:00 pm" <?php if ($sch_settings_inf['saturday_break_from'] == '6:00 pm') echo 'selected="selected"' ?>>6 pm</option>
									<option value="7:00 pm" <?php if ($sch_settings_inf['saturday_break_from'] == '7:00 pm') echo 'selected="selected"' ?>>7 pm</option>
									<option value="8:00 pm" <?php if ($sch_settings_inf['saturday_break_from'] == '8:00 pm') echo 'selected="selected"' ?> >8 pm</option>
									<option value="9:00 pm" <?php if ($sch_settings_inf['saturday_break_from'] == '9:00 pm') echo 'selected="selected"' ?>>9 pm</option>
									<option value="10:00 pm"<?php if ($sch_settings_inf['saturday_break_from'] == '10:00 pm') echo 'selected="selected"' ?>>10 pm</option>
									<option value="11:00 pm" <?php if ($sch_settings_inf['saturday_break_from'] == '11:00 pm') echo 'selected="selected"' ?>>11 pm</option>
									<option value="12:00 pm" <?php if ($sch_settings_inf['saturday_break_from'] == '12:00 pm') echo 'selected="selected"' ?>>12 pm</option>
							
							</select>
												</td>
												<td>
												<select class="form-control" id="saturday_break_to" name="saturday_break_to" >
                                       <option value="">Please Select</option>
									<option value="1:00 am" <?php if ($sch_settings_inf['tuesday_break_to'] == '1:00 am') echo 'selected="selected"' ?> >1 am</option>
									<option value="2:00 am" <?php if ($sch_settings_inf['tuesday_break_to'] == '2:00 am') echo 'selected="selected"' ?>>2 am</option>
									<option value="3:00 am" <?php if ($sch_settings_inf['tuesday_break_to'] == '3:00 am') echo 'selected="selected"' ?>>3 am</option>
									<option value="4:00 am" <?php if ($sch_settings_inf['tuesday_break_to'] == '4:00 am') echo 'selected="selected"' ?>>4 am</option>
									<option value="5:00 am" <?php if ($sch_settings_inf['tuesday_break_to'] == '5:00 am') echo 'selected="selected"' ?>>5 am</option>
									<option value="6:00 am" <?php if ($sch_settings_inf['tuesday_break_to'] == '6:00 am') echo 'selected="selected"' ?>>6 am</option>
									<option value="7:00 am" <?php if ($sch_settings_inf['tuesday_break_to'] == '7:00 am') echo 'selected="selected"' ?>>7 am</option>
									<option value="8:00 am" <?php if ($sch_settings_inf['tuesday_break_to'] == '8:00 am') echo 'selected="selected"' ?> >8 am</option>
									<option value="9:00 am" <?php if ($sch_settings_inf['tuesday_break_to'] == '9:00 am') echo 'selected="selected"' ?>>9 am</option>
									<option value="10:00 am"<?php if ($sch_settings_inf['tuesday_break_to'] == '10:00 am') echo 'selected="selected"' ?>>10 am</option>
									<option value="11:00 am" <?php if ($sch_settings_inf['tuesday_break_to'] == '11:00 am') echo 'selected="selected"' ?>>11 am</option>
									<option value="12:00 am" <?php if ($sch_settings_inf['tuesday_break_to'] == '12:00 am') echo 'selected="selected"' ?>>12 am</option>
									<option value="1:00 pm" <?php if ($sch_settings_inf['tuesday_break_to'] == '1:00 pm') echo 'selected="selected"' ?> >1 pm</option>
									<option value="2:00 pm" <?php if ($sch_settings_inf['tuesday_break_to'] == '2:00 pm') echo 'selected="selected"' ?>>2 pm</option>
									<option value="3:00 pm" <?php if ($sch_settings_inf['tuesday_break_to'] == '3:00 pm') echo 'selected="selected"' ?>>3 pm</option>
									<option value="4:00 pm" <?php if ($sch_settings_inf['tuesday_break_to'] == '4:00 pm') echo 'selected="selected"' ?>>4 pm</option>
									<option value="5:00 pm" <?php if ($sch_settings_inf['tuesday_break_to'] == '5:00 pm') echo 'selected="selected"' ?>>5 pm</option>
									<option value="6:00 pm" <?php if ($sch_settings_inf['tuesday_break_to'] == '6:00 pm') echo 'selected="selected"' ?>>6 pm</option>
									<option value="7:00 pm" <?php if ($sch_settings_inf['tuesday_break_to'] == '7:00 pm') echo 'selected="selected"' ?>>7 pm</option>
									<option value="8:00 pm" <?php if ($sch_settings_inf['tuesday_break_to'] == '8:00 pm') echo 'selected="selected"' ?> >8 pm</option>
									<option value="9:00 pm" <?php if ($sch_settings_inf['tuesday_break_to'] == '9:00 pm') echo 'selected="selected"' ?>>9 pm</option>
									<option value="10:00 pm"<?php if ($sch_settings_inf['tuesday_break_to'] == '10:00 pm') echo 'selected="selected"' ?>>10 pm</option>
									<option value="11:00 pm" <?php if ($sch_settings_inf['tuesday_break_to'] == '11:00 pm') echo 'selected="selected"' ?>>11 pm</option>
									<option value="12:00 pm" <?php if ($sch_settings_inf['tuesday_break_to'] == '12:00 pm') echo 'selected="selected"' ?>>12 pm</option>
																  
									  </select>
												</td>
											  
	  
									  </select>
												</td>
											  
                                            </tr>
											
											<tr>
                                                <td class="td">Sunday</td>
                                                 
                                                <td id="selectbox2">
												 <select class="form-control" id="sunday_fn_from" name="sunday_fn_from" >
									<option value="1" <?php if ($sch_settings_inf['sunday_fn_from'] == '1') echo 'selected="selected"' ?> >1 am</option>
									<option value="2" <?php if ($sch_settings_inf['sunday_fn_from'] == '2') echo 'selected="selected"' ?>>2 am</option>
									<option value="3" <?php if ($sch_settings_inf['sunday_fn_from'] == '3') echo 'selected="selected"' ?>>3 am</option>
									<option value="4" <?php if ($sch_settings_inf['sunday_fn_from'] == '4') echo 'selected="selected"' ?>>4 am</option>
									<option value="5" <?php if ($sch_settings_inf['sunday_fn_from'] == '5') echo 'selected="selected"' ?>>5 am</option>
									<option value="6" <?php if ($sch_settings_inf['sunday_fn_from'] == '6') echo 'selected="selected"' ?>>6 am</option>
									<option value="7" <?php if ($sch_settings_inf['sunday_fn_from'] == '7') echo 'selected="selected"' ?>>7 am</option>
									<option value="8" <?php if ($sch_settings_inf['sunday_fn_from'] == '8') echo 'selected="selected"' ?> >8 am</option>
									<option value="9" <?php if ($sch_settings_inf['sunday_fn_from'] == '9') echo 'selected="selected"' ?>>9 am</option>
									<option value="10"<?php if ($sch_settings_inf['sunday_fn_from'] == '10') echo 'selected="selected"' ?>>10 am</option>
									<option value="11" <?php if ($sch_settings_inf['sunday_fn_from'] == '11') echo 'selected="selected"' ?>>11 am</option>
									<option value="12" <?php if ($sch_settings_inf['sunday_fn_from'] == '12') echo 'selected="selected"' ?>>12 am</option>
							</select>
												</td>
												<td>
												<select class="form-control" id=" " name="sunday_an_to" parsley-trigger="change" >
									<option value="1" <?php if ($sch_settings_inf['sunday_an_to'] == '1') echo 'selected="selected"' ?> >1 pm</option>
									<option value="2" <?php if ($sch_settings_inf['sunday_an_to'] == '2') echo 'selected="selected"' ?>>2 pm</option>
									<option value="3" <?php if ($sch_settings_inf['sunday_an_to'] == '3') echo 'selected="selected"' ?>>3 pm</option>
									<option value="4" <?php if ($sch_settings_inf['sunday_an_to'] == '4') echo 'selected="selected"' ?>>4 pm</option>
									<option value="5" <?php if ($sch_settings_inf['sunday_an_to'] == '5') echo 'selected="selected"' ?>>5 pm</option>
									<option value="6" <?php if ($sch_settings_inf['sunday_an_to'] == '6') echo 'selected="selected"' ?>>6 pm</option>
									<option value="7" <?php if ($sch_settings_inf['sunday_an_to'] == '7') echo 'selected="selected"' ?>>7 pm</option>
									<option value="8" <?php if ($sch_settings_inf['sunday_an_to'] == '8') echo 'selected="selected"' ?> >8 pm</option>
									<option value="9" <?php if ($sch_settings_inf['sunday_an_to'] == '9') echo 'selected="selected"' ?>>9 pm</option>
									<option value="10"<?php if ($sch_settings_inf['sunday_an_to'] == '10') echo 'selected="selected"' ?>>10 pm</option>
									<option value="11" <?php if ($sch_settings_inf['sunday_an_to'] == '11') echo 'selected="selected"' ?>>11 pm</option>
									<option value="12" <?php if ($sch_settings_inf['sunday_an_to'] == '12') echo 'selected="selected"' ?>>12 pm</option>
							</select>
												</td>
											  
                                            </tr>
											
											<tr id="break7">
                                                   <td class="break_time">Break Time</td>
                                                  <td>
												 <select class="form-control" id="sunday_break_from" name="sunday_break_from">
									<option value="">Please Select</option>
									<option value="1:00 am" <?php if ($sch_settings_inf['sunday_break_from'] == '1:00 am') echo 'selected="selected"' ?> >1 am</option>
									<option value="2:00 am" <?php if ($sch_settings_inf['sunday_break_from'] == '2:00 am') echo 'selected="selected"' ?>>2 am</option>
									<option value="3:00 am" <?php if ($sch_settings_inf['sunday_break_from'] == '3:00 am') echo 'selected="selected"' ?>>3 am</option>
									<option value="4:00 am" <?php if ($sch_settings_inf['sunday_break_from'] == '4:00 am') echo 'selected="selected"' ?>>4 am</option>
									<option value="5:00 am" <?php if ($sch_settings_inf['sunday_break_from'] == '5:00 am') echo 'selected="selected"' ?>>5 am</option>
									<option value="6:00 am" <?php if ($sch_settings_inf['sunday_break_from'] == '6:00 am') echo 'selected="selected"' ?>>6 am</option>
									<option value="7:00 am" <?php if ($sch_settings_inf['sunday_break_from'] == '7:00 am') echo 'selected="selected"' ?>>7 am</option>
									<option value="8:00 am" <?php if ($sch_settings_inf['sunday_break_from'] == '8:00 am') echo 'selected="selected"' ?> >8 am</option>
									<option value="9:00 am" <?php if ($sch_settings_inf['sunday_break_from'] == '9:00 am') echo 'selected="selected"' ?>>9 am</option>
									<option value="10:00 am"<?php if ($sch_settings_inf['sunday_break_from'] == '10:00 am') echo 'selected="selected"' ?>>10 am</option>
									<option value="11:00 am" <?php if ($sch_settings_inf['sunday_break_from'] == '11:00 am') echo 'selected="selected"' ?>>11 am</option>
									<option value="12:00 am" <?php if ($sch_settings_inf['sunday_break_from'] == '12:00 am') echo 'selected="selected"' ?>>12 am</option>
									<option value="1:00 pm" <?php if ($sch_settings_inf['sunday_break_from'] == '1:00 pm') echo 'selected="selected"' ?> >1 pm</option>
									<option value="2:00 pm" <?php if ($sch_settings_inf['sunday_break_from'] == '2:00 pm') echo 'selected="selected"' ?>>2 pm</option>
									<option value="3:00 pm" <?php if ($sch_settings_inf['sunday_break_from'] == '3:00 pm') echo 'selected="selected"' ?>>3 pm</option>
									<option value="4:00 pm" <?php if ($sch_settings_inf['sunday_break_from'] == '4:00 pm') echo 'selected="selected"' ?>>4 pm</option>
									<option value="5:00 pm" <?php if ($sch_settings_inf['sunday_break_from'] == '5:00 pm') echo 'selected="selected"' ?>>5 pm</option>
									<option value="6:00 pm" <?php if ($sch_settings_inf['sunday_break_from'] == '6:00 pm') echo 'selected="selected"' ?>>6 pm</option>
									<option value="7:00 pm" <?php if ($sch_settings_inf['sunday_break_from'] == '7:00 pm') echo 'selected="selected"' ?>>7 pm</option>
									<option value="8:00 pm" <?php if ($sch_settings_inf['sunday_break_from'] == '8:00 pm') echo 'selected="selected"' ?> >8 pm</option>
									<option value="9:00 pm" <?php if ($sch_settings_inf['sunday_break_from'] == '9:00 pm') echo 'selected="selected"' ?>>9 pm</option>
									<option value="10:00 pm"<?php if ($sch_settings_inf['sunday_break_from'] == '10:00 pm') echo 'selected="selected"' ?>>10 pm</option>
									<option value="11:00 pm" <?php if ($sch_settings_inf['sunday_break_from'] == '11:00 pm') echo 'selected="selected"' ?>>11 pm</option>
									<option value="12:00 pm" <?php if ($sch_settings_inf['sunday_break_from'] == '12:00 pm') echo 'selected="selected"' ?>>12 pm</option>
							
							</select>
												</td>
												<td>
												<select class="form-control" id="sunday_break_to" name="sunday_break_to" >
                                                <option value="">Please Select</option>
									<option value="1:00 am" <?php if ($sch_settings_inf['sunday_break_to'] == '1:00 am') echo 'selected="selected"' ?> >1 am</option>
									<option value="2:00 am" <?php if ($sch_settings_inf['sunday_break_to'] == '2:00 am') echo 'selected="selected"' ?>>2 am</option>
									<option value="3:00 am" <?php if ($sch_settings_inf['sunday_break_to'] == '3:00 am') echo 'selected="selected"' ?>>3 am</option>
									<option value="4:00 am" <?php if ($sch_settings_inf['sunday_break_to'] == '4:00 am') echo 'selected="selected"' ?>>4 am</option>
									<option value="5:00 am" <?php if ($sch_settings_inf['sunday_break_to'] == '5:00 am') echo 'selected="selected"' ?>>5 am</option>
									<option value="6:00 am" <?php if ($sch_settings_inf['sunday_break_to'] == '6:00 am') echo 'selected="selected"' ?>>6 am</option>
									<option value="7:00 am" <?php if ($sch_settings_inf['sunday_break_to'] == '7:00 am') echo 'selected="selected"' ?>>7 am</option>
									<option value="8:00 am" <?php if ($sch_settings_inf['sunday_break_to'] == '8:00 am') echo 'selected="selected"' ?> >8 am</option>
									<option value="9:00 am" <?php if ($sch_settings_inf['sunday_break_to'] == '9:00 am') echo 'selected="selected"' ?>>9 am</option>
									<option value="10:00 am"<?php if ($sch_settings_inf['sunday_break_to'] == '10:00 am') echo 'selected="selected"' ?>>10 am</option>
									<option value="11:00 am" <?php if ($sch_settings_inf['sunday_break_to'] == '11:00 am') echo 'selected="selected"' ?>>11 am</option>
									<option value="12:00 am" <?php if ($sch_settings_inf['sunday_break_to'] == '12:00 am') echo 'selected="selected"' ?>>12 am</option>
									<option value="1:00 pm" <?php if ($sch_settings_inf['sunday_break_to'] == '1:00 pm') echo 'selected="selected"' ?> >1 pm</option>
									<option value="2:00 pm" <?php if ($sch_settings_inf['sunday_break_to'] == '2:00 pm') echo 'selected="selected"' ?>>2 pm</option>
									<option value="3:00 pm" <?php if ($sch_settings_inf['sunday_break_to'] == '3:00 pm') echo 'selected="selected"' ?>>3 pm</option>
									<option value="4:00 pm" <?php if ($sch_settings_inf['sunday_break_to'] == '4:00 pm') echo 'selected="selected"' ?>>4 pm</option>
									<option value="5:00 pm" <?php if ($sch_settings_inf['sunday_break_to'] == '5:00 pm') echo 'selected="selected"' ?>>5 pm</option>
									<option value="6:00 pm" <?php if ($sch_settings_inf['sunday_break_to'] == '6:00 pm') echo 'selected="selected"' ?>>6 pm</option>
									<option value="7:00 pm" <?php if ($sch_settings_inf['sunday_break_to'] == '7:00 pm') echo 'selected="selected"' ?>>7 pm</option>
									<option value="8:00 pm" <?php if ($sch_settings_inf['sunday_break_to'] == '8:00 pm') echo 'selected="selected"' ?> >8 pm</option>
									<option value="9:00 pm" <?php if ($sch_settings_inf['sunday_break_to'] == '9:00 pm') echo 'selected="selected"' ?>>9 pm</option>
									<option value="10:00 pm"<?php if ($sch_settings_inf['sunday_break_to'] == '10:00 pm') echo 'selected="selected"' ?>>10 pm</option>
									<option value="11:00 pm" <?php if ($sch_settings_inf['sunday_break_to'] == '11:00 pm') echo 'selected="selected"' ?>>11 pm</option>
									<option value="12:00 pm" <?php if ($sch_settings_inf['sunday_break_to'] == '12:00 pm') echo 'selected="selected"' ?>>12 pm</option>
							  
									  </select>
												</td>
											  
                                            </tr>
                                            
                                            </tbody>
                                        </table>
										<div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary" id="save">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
                                               </div>
										</form>
 
                                                  </div>
												  </div>
                                                </div>
												<div id="accordion" class="accordion-wrapper mb-3">
												
												</div>
												</div>
                                            </div>
											<div id="step-3">
                                                <div id="accordion" class="accordion-wrapper mb-3">
                                                    <div class="card">
                                                      <div class="card-body">
													  <h5 class="card-title" style="text-transform:capitalize;">Logo</h5>
													   <form class="addlogo" action="<?php echo base_url().'client/settings/add_logo' ?>" method="post"  role="form" parsley-validate>
                                    
													   <div class="position-relative row form-group">
													<label for="logo_upload" class="col-sm-4 col-form-label">Logo</label>
													<div class="col-sm-8">
														<img src="<?php echo base_url().'uploads/logo/'.$profile['logo']; ?>" width="100px;" height="80px;">
													<input name="logo_upload" id="logo_upload" type="file" class="form-control-file">
													 <input type="hidden" name="upload_img" id="upload_img" />
														<div style="display:none" id="dvloader"><p>Uploding Please Wait...</p><img src="<?php echo base_url().'img/loader.gif'; ?>" /></div>
													</div>
													</div>
													
													
													<div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary" id="save">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												<!--<?php if($profile['logo'] != ''){ ?>
						                        <a href="<?php echo base_url().'client/settings/logo_delete/'.$profile['client_id']; ?>" class="mb-2 mr-2 btn btn-pill btn-warning">Remove</a>
						                      <?php } ?>-->
												</center>
                                               </div>
											   </form>
													   <h5 class="card-title" style="text-transform:capitalize;">Address Settings</h5>
													   <form class="change_profile_address" action="<?php echo base_url().'client/settings/change_profile_address' ?>" method="post"  role="form" parsley-validate>
                                    
													   <div class="position-relative row form-group">
													<label for="address" class="col-sm-4 col-form-label">Address</label>
													<div class="col-sm-8">
													<input name="address" id="address" type="text" class="form-control" value="<?php echo $profile['address']; ?>"></div>
													</div>
													
													<div class="position-relative row form-group">
													<label for="city" class="col-sm-4 col-form-label">City</label>
													<div class="col-sm-8">
													<input name="city" id="city" type="text" class="form-control" value="<?php echo $profile['city']; ?>"></div>
													</div>
													
													<div class="position-relative row form-group">
													<label for="state" class="col-sm-4 col-form-label">State</label>
													<div class="col-sm-8">
													<input name="state" id="state" type="text" class="form-control" value="<?php echo $profile['state']; ?>"></div>
													</div>
													
													<div class="position-relative row form-group">
													<label for="zipcode" class="col-sm-4 col-form-label">Zip or Pincode</label>
													<div class="col-sm-8">
													<input name="zipcode" id="zipcode" type="text" class="form-control" value="<?php echo $profile['zipcode']; ?>"></div>
													</div>
													
													<div class="position-relative row form-group">
													<label for="mail" class="col-sm-4 col-form-label">Contact Email Id</label>
													<div class="col-sm-8">
													<input name="mail" id="mail" type="text" class="form-control" value="<?php echo $profile['contact_mail']; ?>" ></div>
													</div>
													
													
													<div class="position-relative row form-group">
													<label for="Website" class="col-sm-4 col-form-label">Website Address</label>
													<div class="col-sm-8">
													<input name="Website" id="Website" type="text" class="form-control" value="<?php echo $profile['website']; ?>"></div>
													</div>
													
													<!--<div class="position-relative row form-group">
													<label for="map" class="col-sm-4 col-form-label">Map Location</label>
													<div class="col-sm-8">
													<input name="map" id="map" type="text" class="form-control" value="<?php /* echo $profile['map']; */ ?>"></div>
													</div>
                    
                                                                                                        <div class="position-relative row form-group">
													<label for="review" class="col-sm-4 col-form-label">Google Review Link</label>
													<div class="col-sm-8">
													<input name="review" id="review" type="text" class="form-control" value="<?php /* echo $profile['googleRevew_link']; */ ?>"></div>
													</div>-->

													<div class="position-relative row form-group">
													<label for="mail" class="col-sm-4 col-form-label">Country</label>
													<div class="col-sm-8">
													<select class="multiselect-dropdown form-control country" name="country"  id="country" style="width:100%;">
													                                        <optgroup label="Please Select Referral source">
                                         <option value="1|INR" <?php if ($profile['country'] == '1') echo 'selected="selected"' ?>>India</option>
								<option value="2|AFN" <?php if ($profile['country'] == '2') echo 'selected="selected"' ?>>Afghanistan</option>
								<option value="3|ALL" <?php if ($profile['country'] == '3') echo 'selected="selected"' ?>>Albania</option>
								<option value="4|DZD" <?php if ($profile['country'] == '4') echo 'selected="selected"' ?>>Algeria</option>
								<option value="5|USD" <?php if ($profile['country'] == '5') echo 'selected="selected"' ?>>American Samoa</option>
								<option value="6|EUR" <?php if ($profile['country'] == '6') echo 'selected="selected"' ?>>Andorra</option>
								<option value="7|AOA" <?php if ($profile['country'] == '7') echo 'selected="selected"' ?>>Angola</option>
								<option value="8|XCD" <?php if ($profile['country'] == '8') echo 'selected="selected"' ?>>Anguilla</option>
								<option value="9|XCD" <?php if ($profile['country'] == '9') echo 'selected="selected"' ?>>Antigua &amp; Barbuda</option>
								<option value="10|ARS" <?php if ($profile['country'] == '10') echo 'selected="selected"' ?>>Argentina</option>
								<option value="11|AMD" <?php if ($profile['country'] == '11') echo 'selected="selected"' ?>>Armenia</option>
								<option value="12|AWG" <?php if ($profile['country'] == '12') echo 'selected="selected"' ?>>Aruba</option>
								<option value="13|AUD" <?php if ($profile['country'] == '13') echo 'selected="selected"' ?>>Australia</option>
								<option value="14|EUR" <?php if ($profile['country'] == '14') echo 'selected="selected"' ?>>Austria</option>
								<option value="15|AZN" <?php if ($profile['country'] == '15') echo 'selected="selected"' ?>>Azerbaijan</option>
								<option value="16|BSD" <?php if ($profile['country'] == '16') echo 'selected="selected"' ?>>Bahamas</option>
								<option value="17|BHD" <?php if ($profile['country'] == '17') echo 'selected="selected"' ?>>Bahrain</option>
								<option value="18|BDT" <?php if ($profile['country'] == '18') echo 'selected="selected"' ?>>Bangladesh</option>
								<option value="19|BBD" <?php if ($profile['country'] == '19') echo 'selected="selected"' ?>>Barbados</option>
								<option value="20|BYR" <?php if ($profile['country'] == '20') echo 'selected="selected"' ?>>Belarus</option>
								<option value="21|EUR" <?php if ($profile['country'] == '21') echo 'selected="selected"' ?>>Belgium</option>
								<option value="22|BZD"<?php if ($profile['country'] == '22') echo 'selected="selected"' ?>>Belize</option>
								<option value="23|XOF" <?php if ($profile['country'] == '23') echo 'selected="selected"' ?>>Benin</option>
								<option value="24|BMD" <?php if ($profile['country'] == '24') echo 'selected="selected"' ?>>Bermuda</option>
								<option value="25|BTN" <?php if ($profile['country'] == '25') echo 'selected="selected"' ?>>Bhutan</option>
								<option value="26|BOB" <?php if ($profile['country'] == '26') echo 'selected="selected"' ?>>Bolivia</option>
								<option value="27|USD" <?php if ($profile['country'] == '27') echo 'selected="selected"' ?>>Bonaire</option>
								<option value="28|BAM" <?php if ($profile['country'] == '28') echo 'selected="selected"' ?>>Bosnia &amp; Herzegovina</option>
								<option value="29|BWP" <?php if ($profile['country'] == '29') echo 'selected="selected"' ?>>Botswana</option>
								<option value="30|BRL" <?php if ($profile['country'] == '30') echo 'selected="selected"' ?>>Brazil</option>
								<option value="31|USD" <?php if ($profile['country'] == '31') echo 'selected="selected"' ?>>British Indian Ocean Ter</option>
								<option value="32|BND" <?php if ($profile['country'] == '32') echo 'selected="selected"' ?>>Brunei</option>
								<option value="33|BGN" <?php if ($profile['country'] == '33') echo 'selected="selected"' ?>>Bulgaria</option>
								<option value="34|XOF" <?php if ($profile['country'] == '34') echo 'selected="selected"' ?>>Burkina Faso</option>
								<option value="35|BIF" <?php if ($profile['country'] == '35') echo 'selected="selected"' ?>>Burundi</option>
								<option value="36|KHR" <?php if ($profile['country'] == '36') echo 'selected="selected"' ?>>Cambodia</option>
								<option value="37|XAF" <?php if ($profile['country'] == '37') echo 'selected="selected"' ?>>Cameroon</option>
								<option value="38|CAD" <?php if ($profile['country'] == '38') echo 'selected="selected"' ?>>Canada</option>
								<option value="39|EUR" <?php if ($profile['country'] == '39') echo 'selected="selected"' ?>>Canary Islands</option>
								<option value="40|CVE" <?php if ($profile['country'] == '40') echo 'selected="selected"' ?>>Cape Verde</option>
								<option value="41|KYD" <?php if ($profile['country'] == '41') echo 'selected="selected"' ?>>Cayman Islands</option>
								<option value="42|XAF" <?php if ($profile['country'] == '42') echo 'selected="selected"' ?>>Central African Republic</option>
								<option value="43|XAF" <?php if ($profile['country'] == '43') echo 'selected="selected"' ?>>Chad</option>
								<option value="44|GIP" <?php if ($profile['country'] == '44') echo 'selected="selected"' ?>>Channel Islands</option>
								<option value="45|CLP" <?php if ($profile['country'] == '45') echo 'selected="selected"' ?>>Chile</option>
								<option value="46|CNY" <?php if ($profile['country'] == '46') echo 'selected="selected"' ?>>China</option>
								<option value="47|AUD" <?php if ($profile['country'] == '47') echo 'selected="selected"' ?>>Christmas Island</option>
								<option value="48|AUD" <?php if ($profile['country'] == '48') echo 'selected="selected"' ?>>Cocos Island</option>
								<option value="49|COP" <?php if ($profile['country'] == '49') echo 'selected="selected"' ?>>Colombia</option>
								<option value="50|KMF" <?php if ($profile['country'] == '50') echo 'selected="selected"' ?>>Comoros</option>
								<option value="51|XAF" <?php if ($profile['country'] == '51') echo 'selected="selected"' ?>>Congo</option>
								<option value="52|NZD" <?php if ($profile['country'] == '52') echo 'selected="selected"' ?>>Cook Islands</option>
								<option value="53|CRC" <?php if ($profile['country'] == '53') echo 'selected="selected"' ?>>Costa Rica</option>
								<option value="54|CFA" <?php if ($profile['country'] == '54') echo 'selected="selected"' ?>>Cote D'Ivoire</option>
								<option value="55|HRK" <?php if ($profile['country'] == '55') echo 'selected="selected"' ?>>Croatia</option>
								<option value="56|CUP" <?php if ($profile['country'] == '56') echo 'selected="selected"' ?>>Cuba</option>
								<option value="57|ANG" <?php if ($profile['country'] == '57') echo 'selected="selected"' ?>>Curacao</option>
								<option value="58|EUR" <?php if ($profile['country'] == '58') echo 'selected="selected"' ?>>Cyprus</option>
								<option value="59|CZK" <?php if ($profile['country'] == '59') echo 'selected="selected"' ?>>Czech Republic</option>
								<option value="60|DKK" <?php if ($profile['country'] == '60') echo 'selected="selected"' ?>>Denmark</option>
								<option value="61|DJF" <?php if ($profile['country'] == '61') echo 'selected="selected"' ?>>Djibouti</option>
								<option value="62|XCD" <?php if ($profile['country'] == '62') echo 'selected="selected"' ?>>Dominica</option>
								<option value="63|DOP" <?php if ($profile['country'] == '63') echo 'selected="selected"' ?>>Dominican Republic</option>
								<option value="64|USD" <?php if ($profile['country'] == '64') echo 'selected="selected"' ?>>East Timor</option>
								<option value="65|ECS" <?php if ($profile['country'] == '65') echo 'selected="selected"' ?>>Ecuador</option>
								<option value="66|EGP" <?php if ($profile['country'] == '66') echo 'selected="selected"' ?>>Egypt</option>
								<option value="67|SVC" <?php if ($profile['country'] == '67') echo 'selected="selected"' ?>>El Salvador</option>
								<option value="68|XAF" <?php if ($profile['country'] == '68') echo 'selected="selected"' ?>>Equatorial Guinea</option>
								<option value="69|ERN" <?php if ($profile['country'] == '69') echo 'selected="selected"' ?>>Eritrea</option>
								<option value="70|EUR" <?php if ($profile['country'] == '70') echo 'selected="selected"' ?>>Estonia</option>
								<option value="71|ETB" <?php if ($profile['country'] == '71') echo 'selected="selected"' ?>>Ethiopia</option>
								<option value="72|FKP" <?php if ($profile['country'] == '72') echo 'selected="selected"' ?>>Falkland Islands</option>
								<option value="73|DKK" <?php if ($profile['country'] == '73') echo 'selected="selected"' ?>>Faroe Islands</option>
								<option value="74|FJD" <?php if ($profile['country'] == '74') echo 'selected="selected"' ?>>Fiji</option>
								<option value="75|EUR" <?php if ($profile['country'] == '75') echo 'selected="selected"' ?>>Finland</option>
								<option value="76|EUR" <?php if ($profile['country'] == '76') echo 'selected="selected"' ?> >France</option>
								<option value="77|EUR" <?php if ($profile['country'] == '77') echo 'selected="selected"' ?>>French Guiana</option>
								<option value="78|CFP franc" <?php if ($profile['country'] == '78') echo 'selected="selected"' ?>>French Polynesia</option>
								<option value="79|EUR" <?php if ($profile['country'] == '79') echo 'selected="selected"' ?>>French Southern Ter</option>
								<option value="80|XAF" <?php if ($profile['country'] == '80') echo 'selected="selected"' ?>>Gabon</option>
								<option value="81|GMD" <?php if ($profile['country'] == '81') echo 'selected="selected"' ?>>Gambia</option>
								<option value="82|GEL" <?php if ($profile['country'] == '82') echo 'selected="selected"' ?>>Georgia</option>
								<option value="83|EUR" <?php if ($profile['country'] == '83') echo 'selected="selected"' ?>>Germany</option>
								<option value="84|GHS" <?php if ($profile['country'] == '84') echo 'selected="selected"' ?>>Ghana</option>
								<option value="85|GIP" <?php if ($profile['country'] == '85') echo 'selected="selected"' ?>>Gibraltar</option>
								<option value="86|GBP" <?php if ($profile['country'] == '86') echo 'selected="selected"' ?>>Great Britain</option>
								<option value="87|EUR" <?php if ($profile['country'] == '87') echo 'selected="selected"' ?>>Greece</option>
								<option value="88|DKK" <?php if ($profile['country'] == '88') echo 'selected="selected"' ?>>Greenland</option>
								<option value="89|XCD" <?php if ($profile['country'] == '89') echo 'selected="selected"' ?>>Grenada</option>
								<option value="90|EUR" <?php if ($profile['country'] == '90') echo 'selected="selected"' ?>>Guadeloupe</option>
								<option value="91|USD" <?php if ($profile['country'] == '91') echo 'selected="selected"' ?>>Guam</option>
								<option value="92|QTQ" <?php if ($profile['country'] == '92') echo 'selected="selected"' ?>>Guatemala</option>
								<option value="93|GNF" <?php if ($profile['country'] == '93') echo 'selected="selected"' ?>>Guinea</option>
								<option value="94|GYD" <?php if ($profile['country'] == '94') echo 'selected="selected"' ?>>Guyana</option>
								<option value="95|HTG" <?php if ($profile['country'] == '95') echo 'selected="selected"' ?>>Haiti</option>
								<option value="96|USD" <?php if ($profile['country'] == '96') echo 'selected="selected"' ?>>Hawaii</option>
								<option value="97|HNL" <?php if ($profile['country'] == '97') echo 'selected="selected"' ?>>Honduras</option>
								<option value="98|HKD" <?php if ($profile['country'] == '98') echo 'selected="selected"' ?>>Hong Kong</option>
								<option value="99|HUF" <?php if ($profile['country'] == '99') echo 'selected="selected"' ?>>Hungary</option>
								<option value="100|ISK" <?php if ($profile['country'] == '100') echo 'selected="selected"' ?>>Iceland</option>
								<option value="101|IDR" <?php if ($profile['country'] == '101') echo 'selected="selected"' ?>>Indonesia</option>
								<option value="102|IRR" <?php if ($profile['country'] == '102') echo 'selected="selected"' ?>>Iran</option>
								<option value="103|IQD" <?php if ($profile['country'] == '103') echo 'selected="selected"' ?>>Iraq</option>
								<option value="104|EUR" <?php if ($profile['country'] == '104') echo 'selected="selected"' ?>>Ireland</option>
								<option value="105|GBP" <?php if ($profile['country'] == '105') echo 'selected="selected"' ?>>Isle of Man</option>
								<option value="106|ILS" <?php if ($profile['country'] == '106') echo 'selected="selected"' ?>>Israel</option>
								<option value="107|EUR" <?php if ($profile['country'] == '107') echo 'selected="selected"' ?>>Italy</option>
								<option value="108|JMD" <?php if ($profile['country'] == '108') echo 'selected="selected"' ?>>Jamaica</option>
								<option value="109|JPY" <?php if ($profile['country'] == '109') echo 'selected="selected"' ?>>Japan</option>
								<option value="110|JOD" <?php if ($profile['country'] == '110') echo 'selected="selected"' ?>>Jordan</option>
								<option value="111|KZT" <?php if ($profile['country'] == '111') echo 'selected="selected"' ?>>Kazakhstan</option>
								<option value="112|KES" <?php if ($profile['country'] == '112') echo 'selected="selected"' ?>>Kenya</option>
								<option value="113|AUD" <?php if ($profile['country'] == '113') echo 'selected="selected"' ?>>Kiribati</option>
								<option value="114|KPW" <?php if ($profile['country'] == '114') echo 'selected="selected"' ?>>Korea North</option>
								<option value="115|KRW" <?php if ($profile['country'] == '115') echo 'selected="selected"' ?>>Korea South</option>
								<option value="116|KWD" <?php if ($profile['country'] == '116') echo 'selected="selected"' ?>>Kuwait</option>
								<option value="117|KGS" <?php if ($profile['country'] == '117') echo 'selected="selected"' ?>>Kyrgyzstan</option>
								<option value="118|LAK" <?php if ($profile['country'] == '118') echo 'selected="selected"' ?>>Laos</option>
								<option value="119|LVL" <?php if ($profile['country'] == '119') echo 'selected="selected"' ?>>Latvia</option>
								<option value="120|LBP" <?php if ($profile['country'] == '120') echo 'selected="selected"' ?>>Lebanon</option>
								<option value="121|LSL" <?php if ($profile['country'] == '121') echo 'selected="selected"' ?>>Lesotho</option>
								<option value="122|LRD" <?php if ($profile['country'] == '122') echo 'selected="selected"' ?>>Liberia</option>
								<option value="123|LYD" <?php if ($profile['country'] == '123') echo 'selected="selected"' ?>>Libya</option>
								<option value="124|CHF" <?php if ($profile['country'] == '124') echo 'selected="selected"' ?>>Liechtenstein</option>
								<option value="125|LTL" <?php if ($profile['country'] == '125') echo 'selected="selected"' ?>>Lithuania</option>
								<option value="126|EUR" <?php if ($profile['country'] == '126') echo 'selected="selected"' ?>>Luxembourg</option>
								<option value="127|MOP"<?php if ($profile['country'] == '127') echo 'selected="selected"' ?>>Macau</option>
								<option value="128|MKD" <?php if ($profile['country'] == '128') echo 'selected="selected"' ?>>Macedonia</option>
								<option value="129|MGF" <?php if ($profile['country'] == '129') echo 'selected="selected"' ?>>Madagascar</option>
								<option value="130|MYR" <?php if ($profile['country'] == '130') echo 'selected="selected"' ?>>Malaysia</option>
								<option value="131|MWK" <?php if ($profile['country'] == '131') echo 'selected="selected"' ?>>Malawi</option>
								<option value="132|MVR" <?php if ($profile['country'] == '132') echo 'selected="selected"' ?>>Maldives</option>
								<option value="133|XOF" <?php if ($profile['country'] == '133') echo 'selected="selected"' ?>>Mali</option>
								<option value="134|EUR" <?php if ($profile['country'] == '134') echo 'selected="selected"' ?>>Malta</option>
								<option value="135|USD" <?php if ($profile['country'] == '135') echo 'selected="selected"' ?>>Marshall Islands</option>
								<option value="136|EUR" <?php if ($profile['country'] == '136') echo 'selected="selected"' ?>>Martinique</option>
								<option value="137|MRO" <?php if ($profile['country'] == '137') echo 'selected="selected"' ?>>Mauritania</option>
								<option value="138|MUR" <?php if ($profile['country'] == '138') echo 'selected="selected"' ?>>Mauritius</option>
								<option value="139|EUR" <?php if ($profile['country'] == '139') echo 'selected="selected"' ?>>Mayotte</option>
								<option value="140|MXN" <?php if ($profile['country'] == '140') echo 'selected="selected"' ?>>Mexico</option>
								<option value="141|EUR" <?php if ($profile['country'] == '141') echo 'selected="selected"' ?>>Midway Islands</option>
								<option value="142|MDL" <?php if ($profile['country'] == '142') echo 'selected="selected"' ?>>Moldova</option>
								<option value="143|EUR" <?php if ($profile['country'] == '143') echo 'selected="selected"' ?>>Monaco</option>
								<option value="144|MNT" <?php if ($profile['country'] == '144') echo 'selected="selected"' ?>>Mongolia</option>
								<option value="145|XCD" <?php if ($profile['country'] == '145') echo 'selected="selected"' ?>>Montserrat</option>
								<option value="146|MAD" <?php if ($profile['country'] == '146') echo 'selected="selected"' ?>>Morocco</option>
								<option value="147|MZN" <?php if ($profile['country'] == '147') echo 'selected="selected"' ?>>Mozambique</option>
								<option value="148|MMK" <?php if ($profile['country'] == '148') echo 'selected="selected"' ?>>Myanmar</option>
								<option value="149|NAD" <?php if ($profile['country'] == '149') echo 'selected="selected"' ?>>Nambia</option>
								<option value="150|AUD" <?php if ($profile['country'] == '150') echo 'selected="selected"' ?>>Nauru</option>
								<option value="151|NPR" <?php if ($profile['country'] == '151') echo 'selected="selected"' ?>>Nepal</option>
								<option value="152|ANG" <?php if ($profile['country'] == '152') echo 'selected="selected"' ?>>Netherland Antilles</option>
								<option value="153|EUR" <?php if ($profile['country'] == '153') echo 'selected="selected"' ?>>Netherlands (Holland, Europe)</option>
								<option value="154|XCD" <?php if ($profile['country'] == '154') echo 'selected="selected"' ?>>Nevis</option>
								<option value="155|XPF" <?php if ($profile['country'] == '155') echo 'selected="selected"' ?>>New Caledonia</option>
								<option value="156|NZD" <?php if ($profile['country'] == '156') echo 'selected="selected"' ?>>New Zealand</option>
								<option value="157|NIO" <?php if ($profile['country'] == '157') echo 'selected="selected"' ?>>Nicaragua</option>
								<option value="158|XOF" <?php if ($profile['country'] == '158') echo 'selected="selected"' ?>>Niger</option>
								<option value="159|NGN" <?php if ($profile['country'] == '159') echo 'selected="selected"' ?>>Nigeria</option>
								<option value="160|NZD" <?php if ($profile['country'] == '160') echo 'selected="selected"' ?>>Niue</option>
								<option value="161|AUD" <?php if ($profile['country'] == '161') echo 'selected="selected"' ?>>Norfolk Island</option>
								<option value="162|NOK" <?php if ($profile['country'] == '162') echo 'selected="selected"' ?>>Norway</option>
								<option value="163|OMR" <?php if ($profile['country'] == '163') echo 'selected="selected"' ?>>Oman</option>
								<option value="164|PKR" <?php if ($profile['country'] == '164') echo 'selected="selected"' ?>>Pakistan</option>
							    <option value="165|USD" <?php if ($profile['country'] == '165') echo 'selected="selected"' ?>>Palau Island</option>
								<option value="166|Egyptian pound" <?php if ($profile['country'] == '166') echo 'selected="selected"' ?>>Palestine</option>
								<option value="167|PAB" <?php if ($profile['country'] == '167') echo 'selected="selected"' ?>>Panama</option>
								<option value="168|PGK" <?php if ($profile['country'] == '168') echo 'selected="selected"' ?>>Papua New Guinea</option>
								<option value="169|PYG" <?php if ($profile['country'] == '169') echo 'selected="selected"' ?>>Paraguay</option>
								<option value="170|PEN" <?php if ($profile['country'] == '170') echo 'selected="selected"' ?>>Peru</option>
								<option value="171|PHP" <?php if ($profile['country'] == '171') echo 'selected="selected"' ?>>Philippines</option>
								<option value="172|NZD" <?php if ($profile['country'] == '172') echo 'selected="selected"' ?>>Pitcairn Island</option>
								<option value="173|PLN" <?php if ($profile['country'] == '173') echo 'selected="selected"' ?>>Poland</option>
								<option value="174|EUR" <?php if ($profile['country'] == '174') echo 'selected="selected"' ?>>Portugal</option>
								<option value="175|USD" <?php if ($profile['country'] == '175') echo 'selected="selected"' ?>>Puerto Rico</option>
								<option value="176|QAR" <?php if ($profile['country'] == '176') echo 'selected="selected"' ?>>Qatar</option>
								<option value="177|EUR" <?php if ($profile['country'] == '177') echo 'selected="selected"' ?>>Republic of Montenegro</option>
								<option value="178|RSD" <?php if ($profile['country'] == '178') echo 'selected="selected"' ?>>Republic of Serbia</option>
								<option value="179|EUR" <?php if ($profile['country'] == '179') echo 'selected="selected"' ?>>Reunion</option>
								<option value="180|RON" <?php if ($profile['country'] == '180') echo 'selected="selected"' ?>>Romania</option>
								<option value="181|RUB" <?php if ($profile['country'] == '181') echo 'selected="selected"' ?>>Russia</option>
								<option value="182|RWF" <?php if ($profile['country'] == '182') echo 'selected="selected"' ?>>Rwanda</option>
								<option value="183|EUR" <?php if ($profile['country'] == '183') echo 'selected="selected"' ?>>St Barthelemy</option>
								<option value="184|EUX" <?php if ($profile['country'] == '184') echo 'selected="selected"' ?>>St Eustatius</option>
								<option value="185|SHP" <?php if ($profile['country'] == '185') echo 'selected="selected"' ?>>St Helena</option>
								<option value="186|XCD" <?php if ($profile['country'] == '186') echo 'selected="selected"' ?>>St Kitts-Nevis</option>
								<option value="187|XCD" <?php if ($profile['country'] == '187') echo 'selected="selected"' ?>>St Lucia</option>
								<option value="188|ANG" <?php if ($profile['country'] == '188') echo 'selected="selected"' ?>>St Maarten</option>
								<option value="189|EUR" <?php if ($profile['country'] == '189') echo 'selected="selected"' ?>>St Pierre &amp; Miquelon</option>
								<option value="190|XCD" <?php if ($profile['country'] == '190') echo 'selected="selected"' ?>>St Vincent &amp; Grenadines</option>
								<option value="191|USD" <?php if ($profile['country'] == '191') echo 'selected="selected"' ?>>Saipan</option>
								<option value="192|WST" <?php if ($profile['country'] == '192') echo 'selected="selected"' ?>>Samoa</option>
								<option value="193|USD" <?php if ($profile['country'] == '193') echo 'selected="selected"' ?>>Samoa American</option>
								<option value="194|EUR" <?php if ($profile['country'] == '194') echo 'selected="selected"' ?>>San Marino</option>
								<option value="195|STD" <?php if ($profile['country'] == '195') echo 'selected="selected"' ?>>Sao Tome &amp; Principe</option>
								<option value="196|SAR" <?php if ($profile['country'] == '196') echo 'selected="selected"' ?>>Saudi Arabia</option>
								<option value="197|XOF" <?php if ($profile['country'] == '197') echo 'selected="selected"' ?>>Senegal</option>
								<option value="198|SCR" <?php if ($profile['country'] == '198') echo 'selected="selected"' ?>>Seychelles</option>
								<option value="199|SLL" <?php if ($profile['country'] == '199') echo 'selected="selected"' ?>>Sierra Leone</option>
								<option value="200|SGD" <?php if ($profile['country'] == '200') echo 'selected="selected"' ?>>Singapore</option>
								<option value="201|EUR" <?php if ($profile['country'] == '201') echo 'selected="selected"' ?>>Slovakia</option>
								<option value="202|EUR" <?php if ($profile['country'] == '202') echo 'selected="selected"' ?>>Slovenia</option>
								<option value="203|SBD" <?php if ($profile['country'] == '203') echo 'selected="selected"' ?>>Solomon Islands</option>
								<option value="204|SOS" <?php if ($profile['country'] == '204') echo 'selected="selected"' ?>>Somalia</option>
								<option value="205|ZAR" <?php if ($profile['country'] == '205') echo 'selected="selected"' ?>>South Africa</option>
								<option value="206|EUR" <?php if ($profile['country'] == '206') echo 'selected="selected"' ?>>Spain</option>
								<option value="207|LKR" <?php if ($profile['country'] == '207') echo 'selected="selected"' ?>>Sri Lanka</option>
								<option value="208|SDG" <?php if ($profile['country'] == '208') echo 'selected="selected"' ?>>Sudan</option>
								<option value="209|SRD" <?php if ($profile['country'] == '209') echo 'selected="selected"' ?>>Suriname</option>
								<option value="210|SZL" <?php if ($profile['country'] == '210') echo 'selected="selected"' ?>>Swaziland</option>
								<option value="211|SEK" <?php if ($profile['country'] == '211') echo 'selected="selected"' ?>>Sweden</option>
								<option value="212|CHF" <?php if ($profile['country'] == '212') echo 'selected="selected"' ?>>Switzerland</option>
								<option value="213|SYP" <?php if ($profile['country'] == '213') echo 'selected="selected"' ?>>Syria</option>
								<option value="214|CFP franc" <?php if ($profile['country'] == '214') echo 'selected="selected"' ?>>Tahiti</option>
								<option value="215|TWD" <?php if ($profile['country'] == '215') echo 'selected="selected"' ?>>Taiwan</option>
								<option value="216|TJS" <?php if ($profile['country'] == '216') echo 'selected="selected"' ?>>Tajikistan</option>
								<option value="217|TZS" <?php if ($profile['country'] == '217') echo 'selected="selected"' ?>>Tanzania</option>
								<option value="218|THB" <?php if ($profile['country'] == '218') echo 'selected="selected"' ?>>Thailand</option>
								<option value="219|XOF" <?php if ($profile['country'] == '219') echo 'selected="selected"' ?>>Togo</option>
								<option value="220|NZD" <?php if ($profile['country'] == '220') echo 'selected="selected"' ?>>Tokelau</option>
								<option value="221|TOP" <?php if ($profile['country'] == '221') echo 'selected="selected"' ?>>Tonga</option>
								<option value="222|TTD" <?php if ($profile['country'] == '222') echo 'selected="selected"' ?>>Trinidad &amp; Tobago</option>
								<option value="223|TND" <?php if ($profile['country'] == '223') echo 'selected="selected"' ?>>Tunisia</option>
								<option value="224|TRY" <?php if ($profile['country'] == '224') echo 'selected="selected"' ?>>Turkey</option>
								<option value="225|TMT" <?php if ($profile['country'] == '225') echo 'selected="selected"' ?>>Turkmenistan</option>
								<option value="226|USD" <?php if ($profile['country'] == '226') echo 'selected="selected"' ?>>Turks &amp; Caicos Is</option>
								<option value="227|AUD" <?php if ($profile['country'] == '227') echo 'selected="selected"' ?>>Tuvalu</option>
								<option value="228|UGX" <?php if ($profile['country'] == '228') echo 'selected="selected"' ?>>Uganda</option>
								<option value="229|UAH" <?php if ($profile['country'] == '229') echo 'selected="selected"' ?>>Ukraine</option>
								<option value="230|AED" <?php if ($profile['country'] == '230') echo 'selected="selected"' ?>>United Arab Emirates</option>
								<option value="231|GBP" <?php if ($profile['country'] == '231') echo 'selected="selected"' ?>>United Kingdom</option>
								<option value="232|USD" <?php if ($profile['country'] == '232') echo 'selected="selected"' ?>>United States of America</option>
								<option value="233|UYU" <?php if ($profile['country'] == '233') echo 'selected="selected"' ?>>Uruguay</option>
								<option value="234|UZS" <?php if ($profile['country'] == '234') echo 'selected="selected"' ?>>Uzbekistan</option>
								<option value="235|VUV" <?php if ($profile['country'] == '235') echo 'selected="selected"' ?>>Vanuatu</option>
								<option value="236|EUR" <?php if ($profile['country'] == '236') echo 'selected="selected"' ?>>Vatican City State</option>
								<option value="237|VEF" <?php if ($profile['country'] == '237') echo 'selected="selected"' ?>>Venezuela</option>
								<option value="238|VND" <?php if ($profile['country'] == '238') echo 'selected="selected"' ?>>Vietnam</option>
								<option  value="239|USD" <?php if ($profile['country'] == '239') echo 'selected="selected"' ?>>Virgin Islands (Brit)</option>
								<option value="240|USD" <?php if ($profile['country'] == '240') echo 'selected="selected"' ?>>Virgin Islands (USA)</option>
								<option  value="241|XPF" <?php if ($profile['country'] == '241') echo 'selected="selected"' ?>>Wake Island</option>
								<option  value="242|MAD" <?php if ($profile['country'] == '242') echo 'selected="selected"' ?>>Wallis &amp; Futana Is</option>
								<option value="243|YER" <?php if ($profile['country'] == '243') echo 'selected="selected"' ?>>Yemen</option>
								<option value="244|ZRN" <?php if ($profile['country'] == '244') echo 'selected="selected"' ?>>Zaire</option>
								<option  value="245|ZMW" <?php if ($profile['country'] == '245') echo 'selected="selected"' ?>>Zambia</option>
								<option  value="246|ZWD" <?php if ($profile['country'] == '246') echo 'selected="selected"' ?>>Zimbabwe</option>							
                                        </optgroup>
											</select>
													</div>
													</div>
													
													
												 
													
													<h5 class="card-title" style="text-transform:capitalize;">Remove Branding</h5>
													 
													 <div class="custom-checkbox custom-control"><input type="checkbox" id="removebranding" <?php echo ($profile['removebranding']==1 ? 'checked' : '');?> value="1" name="remove_branding" class="custom-control-input"><label class="custom-control-label" for="removebranding"> 
                                                         Remove Branding</label></div>
														 </br>
														 <h5 class="card-title" style="text-transform:capitalize;">Social Share settings</h5>
														 
														 <div class="position-relative row form-group">
														<label for="facebook" class="col-sm-4 col-form-label">* FB URL</label>
														 <div class="col-sm-8">
														 <input name="facebook" id="facebook" type="text" class="form-control" value="<?php echo $profile['facebook'] ?>"></div>
														  </div>
														  <div class="position-relative row form-group">
														<label for="twitter" class="col-sm-4 col-form-label">* Twitter URL</label>
														 <div class="col-sm-8">
														 <input name="twitter" id="twitter" type="text" class="form-control" value="<?php echo $profile['twitter'] ?>"></div>
														  </div>
														  <div class="position-relative row form-group">
														<label for="youtube" class="col-sm-4 col-form-label">* Youtube URL</label>
														 <div class="col-sm-8">
														 <input name="youtube" id="youtube" type="text" class="form-control" value="<?php echo $profile['youtube'] ?>"></div>
														  </div>
							  
							                   <div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary" id="save">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
                                               </div>
											   
													 </form>
													 
													 
															
												</div>  
                                                    </div>
                                                </div>
                                            </div>
											<div id="step-4">
                                                <div id="accordion" class="accordion-wrapper mb-3">
                                                    <div class="card">
                                                       <div class="card-body">
													   <h5 class="card-title" style="text-transform:capitalize;">Invoice Settings</h5>
													   <form class="notes_det" action="<?php echo base_url().'client/settings/notes_det' ?>" method="post"  role="form" parsley-validate>
                                    
													   <div class="position-relative row form-group">
													<label for="Website" class="col-sm-4 col-form-label">Terms and Conditions</label>
													<div class="col-sm-8">
													<textarea class="form-control" id="notes" name="notes" value="" rows="3"  autocomplete="off"><?php echo $profile['notes']?></textarea>
													</div>
													</div>
													
													
													<div class="position-relative row form-group">
													<label for="Website" class="col-sm-4 col-form-label">Notes</label>
													<div class="col-sm-8">
													<input name="note" id="note" type="text" class="form-control" value="<?php echo $profile['note']?>"></div>
													</div>
													
													<div class="position-relative row form-group">
													<label for="footer" class="col-sm-4 col-form-label">Footer</label>
													<div class="col-sm-8">
													<input name="footer" id="footer" type="text" class="form-control" value="<?php echo $profile['footer']?>"></div>
													</div>
													
													<div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary" id="save">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
                                               </div>
											   </form>
                                                    
													<h5 class="card-title" style="text-transform:capitalize;">General Settings</h5>
													<form class="settings_invoice" action="<?php echo base_url().'client/settings/settings_invoice' ?>" method="post"  role="form" parsley-validate>
                                    
													<div class="position-relative row form-group">
													<label for="discount" class="col-sm-4 col-form-label">Discount(%)</label>
													<div class="col-sm-8">
													<input name="discount" id="discount" type="text" class="form-control"  value="<?php echo $settings['discount'] ?>"></div>
													</div>
													
													<div class="position-relative row form-group">
													<label for="tax" class="col-sm-4 col-form-label"> Tax(%)</label>
													<div class="col-sm-8">
													<input name="tax" id="tax" type="text" class="form-control" value="<?php echo $settings['tax'] ?>"></div>
													</div>
													 <div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary" id="save">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
                                               </div>
											   </form>
													 
												</div>
                                                    </div>
                                                </div>
                                            </div>
											<!--<div id="step-4">
                                                <div id="accordion" class="accordion-wrapper mb-3">
                                                    <div class="card">
                                                       
                                                    </div>
                                                </div>
                                            </div>-->
											<div id="step-5">
                                                <div id="accordion" class="accordion-wrapper mb-3">
                                                    <div class="card">
													<div class="row">
                                                        <div class="col-lg-12">
                                             <div class="main-card mb-3 card">
                                                <div class="card-body">
                                                <h5 class="card-title" style="text-transform:capitalize;">Master List
                                                </h5>
                                               <!--<button class="mb-2 mr-2 btn btn-info">Treatment Item
                                                </button>
                                             <button class="mb-2 mr-2 btn btn-danger">Expense Item
                                             </button>
                                             <button class="mb-2 mr-2 btn btn-alternate">Provisional Diagnosis
                                             </button>-->
											 
											 
											 <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
											<li class="nav-item">
												<a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
													<span>Treatment Item</span>
												</a>
											</li>
											<li class="nav-item">
												<a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
													<span>Expense Item</span>
												</a>
											</li>
											<li class="nav-item">
												<a role="tab" class="nav-link" id="tab-3" data-toggle="tab" href="#tab-content-3">
													<span>Provisional Diagnosis</span>
												</a>
											</li>
                         
                    </ul>
					
					<div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
						
						<font color="#8B0000"><?php //if($this->session->flashdata('message')): echo '<div class="alert alert-danger fade show" style="padding:.5em;">'.$this->session->flashdata('message').'</div>'; endif; ?>
						</font>
			
						<form class="add_item" action="<?php echo base_url().'client/settings/add_item' ?>" method="post"  role="form" parsley-validate>
                                    
						<div class="position-relative row form-group">
													<label for="item_name" class="col-sm-4 col-form-label">Item name</label>
													<div class="col-sm-8">
													<input name="item_name" id="item_name" type="text" class="form-control" placeholder="Enter Item name" parsley-required="true" ></div>
													</div>
													
													<div class="position-relative row form-group">
													<label for="Website" class="col-sm-4 col-form-label">Description</label>
													<div class="col-sm-8">
													<textarea class="form-control" id="item_desc" name="item_desc" value="" rows="3"  autocomplete="off" placeholder="Enter Description"></textarea></div>
													</div>
													
													<div class="position-relative row form-group">
													<label for="item_price" class="col-sm-4 col-form-label">Item Price</label>
													<div class="col-sm-8">
													<input name="item_price" id="item_price" type="text" class="form-control" placeholder="Enter Item Price" parsley-required="true" parsley-type="number"></div>
													</div>
													
													
													<div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary" id="save">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
                                               </div>
											   </form>
											   
											   <div class="table-responsive">
									
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Name</th>
												<th class="text-center">Description</th>
												<th class="text-center">Price</th>
												<th class="text-center">Action</th>
                                                 
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php if($item != false) { ?>
											<?php foreach ($item as $row)  {  ?>
                                            <tr id="<?php echo $row['item_id']; ?>">
											 <td class="text-center"><?php echo $row['item_name'] ?></td>
												<td class="text-center text-muted"><?php echo $row['item_desc']; ?> </td>
                                                <td class="text-center"><?php echo $row['item_price']; ?></td>
											    
                                                <td class="text-center">
												
												<a href="<?php echo base_url().'client/settings/edit_item/'.$row['item_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary"><i class="fa fa-edit"></i></button></a>
												<a href="<?php echo '#'.$row['item_id']; ?>" class="item_del"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete"><i class="fa fa-trash-alt"> </i></button></a>
												
 
                                                </td>
                                            </tr>
                                             <?php } ?>
											 <?php } else { echo '<tr><td class="text-center"  colspan="4">No More Records</td></tr>'; }  ?>
                                    
                                            </tbody>
                                        </table></br>
										  <nav class="pagination-rounded" aria-label="Page navigation example" style="text-align:center;">
                                    <ul class="pagination" >
									  <?php foreach ($links as $link) { ?>
										<li>
											<?php echo $link; ?>
										</li>
										<?php } ?>
                                     </ul>
								  </nav>
						</div>
											   
						
						</div>
						
						
						<div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
						
						<font color="#8B0000"><?php //if($this->session->flashdata('message')): echo '<div class="alert alert-danger fade show" style="padding:.5em;">'.$this->session->flashdata('message').'</div>'; endif; ?>
             </font>
			
						<form class="add_expense_item" action="<?php echo base_url().'client/settings/add_expense_item' ?>" method="post"  role="form" parsley-validate>
                                    
						<div class="position-relative row form-group">
													<label for="item_name" class="col-sm-4 col-form-label">Item name</label>
													<div class="col-sm-8">
													<input name="item_name" id="item_name" type="text" class="form-control" placeholder="Enter Item name" parsley-required="true" ></div>
													</div>
													
													<div class="position-relative row form-group">
													<label for="item_desc" class="col-sm-4 col-form-label">Description</label>
													<div class="col-sm-8">
													<textarea class="form-control" id="item_desc" name="item_desc" value="" rows="3"  autocomplete="off" placeholder="Enter Description"></textarea></div>
													</div>
													
													<div class="position-relative row form-group">
													<label for="item_price" class="col-sm-4 col-form-label">Item Price</label>
													<div class="col-sm-8">
													<input name="item_price" id="item_price" type="text" class="form-control" placeholder="Enter Item Price" parsley-required="true" parsley-type="number"></div>
													</div>
													
													
													<div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary" id="save">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
                                               </div>
											   </form>
											   
											   <div class="table-responsive">
									     
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Name</th>
												<th class="text-center">Description</th>
												<th class="text-center">Price</th>
												<th class="text-center">Action</th>
                                                 
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php if($expense_item != '') {  ?>
											<?php foreach ($expense_item as $row)  { ?>
                                            <tr id="<?php echo $row['item_id']; ?>">
											 <td class="text-center"><?php echo $row['item_name'] ?></td>
												<td class="text-center text-muted"><?php echo $row['item_desc']; ?> </td>
                                                <td class="text-center"><?php echo $row['item_price']; ?></td>
											    
                                                <td class="text-center">
												
												<a href="<?php echo base_url().'client/settings/edit_expenseitem/'.$row['item_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary"><i class="fa fa-edit"></i></button></a>
												<a href="<?php echo '#'.$row['item_id']; ?>" class="expense_del"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete"><i class="fa fa-trash-alt"> </i></button></a>
												
 
                                                </td>
                                            </tr>
                                             <?php } ?>
											 <?php } else { echo '<tr><td class="text-center"  colspan="4">No More Records</td></tr>'; }  ?>
                                    
                                            </tbody>
                                        </table>
										  <nav class="pagination-rounded" aria-label="Page navigation example" style="text-align:center;">
                                    <ul class="pagination" >
									  <?php foreach ($links2 as $link) { ?>
										<li>
											<?php echo $link; ?>
										</li>
										<?php } ?>
                                     </ul>
								  </nav>
						 </div>
											   
						
						</div>
						
						
						<div class="tab-pane tabs-animation fade" id="tab-content-3" role="tabpanel">
						
						<font color="#8B0000"><?php //if($this->session->flashdata('message')): echo '<div class="alert alert-danger fade show" style="padding:.5em;">'.$this->session->flashdata('message').'</div>'; endif; ?>
             </font>
			 
						<form class="add_prov_diagnosis" action="<?php echo base_url().'client/settings/add_prov_diagnosis' ?>" method="post"  role="form" parsley-validate>
                                    
						<div class="position-relative row form-group">
													<label for="pd_list_name" class="col-sm-4 col-form-label">Diagnosis name</label>
													<div class="col-sm-8">
													<input name="pd_list_name" id="pd_list_name" type="text" class="form-control" placeholder="Enter Diagnosis name" parsley-required="true" ></div>
													</div>
													 
													<div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary" id="save">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
                                               </div>
											   </form>
											   
											   <div class="table-responsive">
									    <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Date</th>
												<th class="text-center">Name</th>
												<th class="text-center">Action</th>
                                                 
                                            </tr>
                                            </thead>
                                            <tbody>
											 <?php if($diag_det != '') { ?>
                                            <?php  foreach ($diag_det as $row)  { ?>
                                            <tr id="<?php echo $row['pd_list_id']; ?>">
											 <td class="text-center"><?php echo date('d-m-Y',strtotime($row['created_date'])); ?></td>
												<td class="text-center text-muted"><?php echo $row['pd_list_name'] ?></td>
                                                 <td class="text-center">
												
												<a href="<?php echo base_url().'client/settings/edit_prov_diag/'.$row['pd_list_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary"><i class="fa fa-edit"></i></button></a>
												<a href="<?php echo '#'.$row['pd_list_id']; ?>" class="del_diag"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete"><i class="fa fa-trash-alt"> </i></button></a>
												
 
                                                </td>
                                            </tr>
                                             <?php } ?>
											 <?php } else { echo '<tr><td class="text-center"  colspan="4">No More Records</td></tr>'; }  ?>
                                    
                                            </tbody>
                                        </table>
										 <nav class="pagination-rounded" aria-label="Page navigation example" style="text-align:center;">
                                    <ul class="pagination" >
									  <?php foreach ($links1 as $link) { ?>
										<li>
											<?php echo $link; ?>
										</li>
										<?php } ?>
                                     </ul>
								  </nav>
						
                                    </div>
											   
						
						</div>
						
						</div>
					
					
                                             </div>
                                    </div>
                                </div>
								</div></div>
                                                </div>
                                            </div>
											
											<div id="step-6">
                                                <div id="accordion" class="accordion-wrapper mb-3">
                                                    <div class="card">
													<form class="change_sms" action="<?php echo base_url().'client/settings/change_sms' ?>" method="post"  role="form" parsley-validate>
                                    
                                                       <div class="card-body">
													   <h5 class="card-title" style="text-transform:capitalize;">SMS Notification</h5>
													   <div class="position-relative row form-group">
														<label for="daily_sms_notify" class="col-sm-4 col-form-label">Daily Notification for Consultants</label>
											  
													 <div class="col-sm-8">
													 <div class="position-relative form-check">
													 <div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
															<label <?php if($profile['daily_sms_notify'] == '1') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																<input type="radio" name="daily_sms_notify" value="1" id="option111" autocomplete="off"  <?php echo ($profile['daily_sms_notify']== 1 ? 'checked' : '');?>> Yes
															   
															</label>
															<label <?php if($profile['daily_sms_notify'] == '0') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																<input type="radio" name="daily_sms_notify" value="0" id="option122" autocomplete="off" <?php echo ($profile['daily_sms_notify']== 0 ? 'checked' : '');?>> No
																
															</label>
															
														</div>
													 </div>
													 </div>
											       </div>
											  
											  
											   
											  
											  <div class="position-relative row form-group">
											<label for="daily_sms_notify1" class="col-sm-4 col-form-label">Daily Notification for Patients</label>
											  <div class="col-sm-8">
											 <div class="position-relative form-check">
											 <div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label <?php if($profile['sms_notify'] == '1') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
                                                        <input type="radio" name="daily_sms_notify1" value="1" id="option111" autocomplete="off"  <?php echo ($profile['sms_notify']== 1 ? 'checked' : '');?>> Yes
                                                       
                                                    </label>
                                                    <label <?php if($profile['sms_notify'] == '0') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
                                                        <input type="radio" name="daily_sms_notify1" value="0" id="option122" autocomplete="off" <?php echo ($profile['sms_notify']== 0 ? 'checked' : '');?>> No
                                                        
                                                    </label>
                                                    
                                                </div>
											 </div>
											 </div>
											  </div>
											  <div class="position-relative row form-group">
											<label for="welcome_sms_notify" class="col-sm-4 col-form-label">SMS Notification for Patients (Welcome to Clinic)</label>
											 <div class="col-sm-8">
											 <div class="position-relative form-check">
											 <div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label <?php if($profile['welcome_sms_notify'] == '1') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
                                                        <input type="radio" name="welcome_sms_notify" value="1" id="option111" autocomplete="off"  <?php echo ($profile['welcome_sms_notify']== 1 ? 'checked' : '');?>> Yes
                                                       
                                                    </label>
                                                    <label <?php if($profile['welcome_sms_notify'] == '0') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
                                                        <input type="radio" name="welcome_sms_notify" value="0" id="option122" autocomplete="off" <?php echo ($profile['welcome_sms_notify']== 0 ? 'checked' : '');?>> No
                                                        
                                                    </label>
                                                    
                                                </div>
											 </div>
											 </div>
											  </div>
                                                     
												</div> 
												<div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary" id="save">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
                                               </div>
											   </form>
											   
                                               <div class="card-body">      
											<h5 class="card-title" style="text-transform:capitalize;">Announce Holiday</h5>											   
											<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
									          <li class="nav-item active">
											<a role="tab" class="nav-link Invoice active show" href="#sms1" id="tab-1" data-toggle="tab" aria-selected="true">
												<span>To All Patients with Appointment</span>
											</a>
										</li>
										<li class="nav-item">
											<a role="tab" class="nav-link Expense show" href="#sms2" id="tab-0" data-toggle="tab" aria-selected="false">
												<span>To Specific Patients only</span>
											</a>
										</li>
										<li class="nav-item">
											<a role="tab" class="nav-link show" href="#sms3" id="tab-0" data-toggle="tab" aria-selected="false">
												<span>Announcement Opening to Specific Patients</span>
											</a>
										</li>
										</ul>
										</div>
										<div class="tab-content">
									<div class="tab-pane tabs-animation fade active show in" id="sms1" role="tabpanel">
									   <div class="card-body">
													  
													   <form class="announce_holiday" action="<?php echo base_url().'client/settings/announce_holiday' ?>" method="post"  role="form" parsley-validate>
                                    
													   <div class="position-relative row form-group">
													<label for="appoint_date" class="col-sm-4 col-form-label">Leave Date</label>
													<div class="col-sm-8">
													 <input name="appoint_date" id="appoint_date" type="text" class="form-control datepicker" data-toggle="datepicker" parsley-trigger="change" parsley-required="true">
													</div>
													</div>
													
													
													<div class="position-relative row form-group">
													<label for="reason" class="col-sm-4 col-form-label">Reason</label>
													<div class="col-sm-8">
													<textarea rows="3" class="form-control autosize-input form-rounded" style="height: 77px;" id="reason" name="reason" placeholder="" autocomplete="off"></textarea>
													</div>
													</div>
													
													 
													
													
													<div class="position-relative row form-group">
													<label for="discount" class="col-sm-4 col-form-label">Notify to Patient</label>
													<div class="col-sm-8">
													<table><tr><td>
													<div class="custom-checkbox custom-control"><input type="checkbox" id="sms_now" name="NotifySmsPatient" value="1" class="custom-control-input" ><label class="custom-control-label" for="sms_now">
                                                           </label>Sms Now</div></td>
														   <td><div class="custom-checkbox custom-control"><input type="checkbox" id="sms_now1" name="NotifySmsPatientm" value="1" class="custom-control-input" ><label class="custom-control-label" for="sms_now1">
                                                           </label>24 hrs before</div>
												  </td>
												  <td><div class="custom-checkbox custom-control"><input type="checkbox" id="sms_now2" name="NotifySmsPatientsm" value="1" class="custom-control-input" ><label class="custom-control-label" for="sms_now2">
                                                           </label>Sms on the day of Appointment</div>
												  </td>
												  </tr></table> 
													</div>
													</div>
													
													 
													 
                                                 <div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary" id="save">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
                                               </div>
                                                   </form>  
													 
												</div>
									</div>
									<div class="tab-pane tabs-animation fade" id="sms2" role="tabpanel">
									  <div class="card-body">
													    
													   <form class="announce_holiday1" action="<?php echo base_url().'client/settings/announce_holiday1' ?>" method="post"  role="form" parsley-validate>
                                    
													   <div class="position-relative row form-group">
													<label for="appoint_date" class="col-sm-4 col-form-label">Leave Date</label>
													<div class="col-sm-8">
													 <input name="appoint_date" id="appoint_date" type="text" class="form-control datepicker" data-toggle="datepicker" parsley-trigger="change" parsley-required="true">
													</div>
													</div>
													
													
													<div class="position-relative row form-group">
													<label for="reason" class="col-sm-4 col-form-label">Patient Name</label>
													<div class="col-sm-8">
													<select style="width:100%;"  multiple="" class="select-control form-control" name="patients[]" placeholder="Choose from Exisiting Patient Name" data-select2-id="4" tabindex="-1" aria-hidden="true">
													<option value="">Please Select</option>
													<?php
														if ($patient_name!=false) {
															foreach ($patient_name as $patient_names) {
																$last_name = ($patient_names['last_name'] == '') ? '' : ucfirst($patient_names['last_name']);
																$age = ($patient_names['age'] == '0') ? '' : '('.$patient_names['age'].')';
																echo '<option value="'.$patient_names['patient_id'].'">'.$patient_names['first_name'].' '.$last_name.'   ('.$patient_names['patient_code'].')  '.$age.'</option>';
															}
														}
													?>
								                </select>
													</div>
													</div>
													
													 
													<div class="position-relative row form-group">
													<label for="reason" class="col-sm-4 col-form-label">Reason</label>
													<div class="col-sm-8">
													<textarea rows="3" class="form-control autosize-input form-rounded" style="height: 77px;" id="reason" name="reason" placeholder="" autocomplete="off"></textarea>
													</div>
													</div>
													
													<div class="position-relative row form-group">
													<label for="discount" class="col-sm-4 col-form-label">Notify to Patient</label>
													<div class="col-sm-8">
													<table><tr><td>
													<div class="custom-checkbox custom-control"><input type="checkbox" id="pat_sms_now" name="NotifySmsPatient" value="1" class="custom-control-input" ><label class="custom-control-label" for="pat_sms_now">
                                                           </label>Sms Now</div></td>
														   <td><div class="custom-checkbox custom-control"><input type="checkbox" id="pat_sms_now1" name="NotifySmsPatientm" value="1" class="custom-control-input" ><label class="custom-control-label" for="pat_sms_now1">
                                                           </label>24 hrs before</div>
												  </td>
												  <td><div class="custom-checkbox custom-control"><input type="checkbox" id="pat_sms_now2" name="NotifySmsPatientsm" value="1" class="custom-control-input" ><label class="custom-control-label" for="pat_sms_now2">
                                                           </label>Sms on the day of Appointment</div>
												  </td>
												  </tr></table> 
													</div>
													</div>
													
													 
													 
                                                 <div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary" id="save">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
                                               </div>
                                                   </form>  
													 
												</div>
									</div>
									<div class="tab-pane tabs-animation fade active  in" id="sms3" role="tabpanel">
									   <div class="card-body">
													  
													   <form class="clinic_open_add" action="<?php echo base_url().'client/settings/clinic_open_add' ?>" method="post"  role="form" parsley-validate>
                                    
													   <div class="position-relative row form-group">
													<label for="appoint_date" class="col-sm-4 col-form-label">Opening Date</label>
													<div class="col-sm-8">
													 <input name="appoint_date" id="appoint_date" type="text" class="form-control datepicker" data-toggle="datepicker" parsley-trigger="change" parsley-required="true">
													</div>
													</div>
													
													<div class="position-relative row form-group">
													<label for="reason" class="col-sm-4 col-form-label">Patient Name</label>
													<div class="col-sm-8">
													<select style="width:100%;"  multiple="" class="select-control form-control" name="patients[]" placeholder="Choose from Exisiting Patient Name" data-select2-id="4" tabindex="-1" aria-hidden="true">
													<option value="">Please Select</option>
													<?php
														if ($patient_name!=false) {
															foreach ($patient_name as $patient_names) {
																$last_name = ($patient_names['last_name'] == '') ? '' : ucfirst($patient_names['last_name']);
																$age = ($patient_names['age'] == '0') ? '' : '('.$patient_names['age'].')';
																echo '<option value="'.$patient_names['patient_id'].'">'.$patient_names['first_name'].' '.$last_name.'   ('.$patient_names['patient_code'].')  '.$age.'</option>';
															}
														}
													?>
								                </select>
													</div>
													</div>
													<?php
												   $this->db->select('clinic_name')->from('tbl_client');
												   $this->db->where('client_id',$this->session->userdata('client_id'));
												   $query = $this->db->get();
												   $clinic_name = $query->row()->clinic_name;
													?>
													
													<div class="position-relative row form-group">
													<label for="reason" class="col-sm-4 col-form-label">Message</label>
													<div class="col-sm-8">
													<textarea rows="3" class="form-control autosize-input form-rounded" style="height: 77px;" id="reason" name="reason" placeholder="" autocomplete="off" readonly><?php echo $clinic_name.'  '.'is reopening our services to the public after this COVID-19 disaster';?></textarea>
													</div>
													</div>
													
													 
													
													
													<div class="position-relative row form-group">
													<label for="discount" class="col-sm-4 col-form-label">Notify to Patient</label>
													<div class="col-sm-8">
													<table><tr><td>
													<div class="custom-checkbox custom-control"><input type="checkbox" id="sms_noww" name="NotifySmsPatient" value="1" class="custom-control-input" ><label class="custom-control-label" for="sms_noww">
                                                           </label>Sms Now</div></td>
													 
												  </tr></table> 
													</div>
													</div>
													
													 
													 
                                                 <div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary" id="save">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
                                               </div>
                                                   </form>  
													 
												</div>
									</div>
									
									</div>
										</div>
                                                </div>
                                            </div>
											
											
											<div id="step-7">
                                                <div id="accordion" class="accordion-wrapper mb-3">
                                                  <div class="card">
												  <div class="card-body">
												  <h5 class="card-title" style="text-transform:capitalize;">Select below for Case Report Print out</h5>
												    <form class="report_form" action="<?php echo base_url().'client/settings/report_form' ?>" method="post"  role="form" parsley-validate>
                                    
													<div class="table-responsive">
									                 <table class="table table-striped table-bordered">
													  <thead>
                                                  <tr>
                                                <th class="text-center">Assessments</th>
                                                <th class="text-center">Option</th>
												 
                                            </tr>
                                            </thead>
											<tbody>
											<tr>
											<td class="text-center">Subjective</td>
											<td class="text-center"><div class="custom-checkbox custom-control"><input type="checkbox" id="case_notes" name="case_notes" value="1" class="custom-control-input" <?php echo ($report['case_notes']==1 ? 'checked' : '');?>><label class="custom-control-label" for="case_notes">
                                                           </label></div></td>
											</tr>
											<tr>
											<td class="text-center">Objective</td>
											<td class="text-center"><div class="custom-checkbox custom-control"><input type="checkbox" id="prog_notes" name="prog_notes" value="1" class="custom-control-input" <?php echo ($report['prog_notes']==1 ? 'checked' : '');?>><label class="custom-control-label" for="prog_notes">
                                                           </label></div></td>
											</tr>
											<tr>
											<td class="text-center">Assessment</td>
											<td class="text-center"><div class="custom-checkbox custom-control"><input type="checkbox" id="remarks" name="remarks" value="1" class="custom-control-input" <?php echo ($report['remarks']==1 ? 'checked' : '');?>><label class="custom-control-label" for="remarks">
                                                           </label></div></td>
											</tr>
											<tr>
											<td class="text-center">Plan</td>
											<td class="text-center"><div class="custom-checkbox custom-control"><input type="checkbox" id="plan" name="plan" value="1" class="custom-control-input" <?php echo ($report['plan']==1 ? 'checked' : '');?>><label class="custom-control-label" for="plan">
                                                           </label></div></td>
											</tr>
											<tr>
											<td class="text-center">History</td>
											<td class="text-center"><div class="custom-checkbox custom-control"><input type="checkbox" id="history" name="history" value="1" class="custom-control-input" <?php echo ($report['history']==1 ? 'checked' : '');?>><label class="custom-control-label" for="history">
                                                           </label></div></td>
											</tr>
											<tr>
											<td class="text-center">Chief Complaints</td>
											<td class="text-center"><div class="custom-checkbox custom-control"><input type="checkbox" id="chief_complain" name="chief_complain" value="1" class="custom-control-input" <?php echo ($report['chief_complain']==1 ? 'checked' : '');?>><label class="custom-control-label" for="chief_complain">
                                                           </label></div></td>
											</tr>
											<tr>
											<td class="text-center">Pain</td>
											<td class="text-center"><div class="custom-checkbox custom-control"><input type="checkbox" id="pain" name="pain" value="1" class="custom-control-input" <?php echo ($report['pain']==1 ? 'checked' : '');?>><label class="custom-control-label" for="pain">
                                                           </label></div></td>
											</tr>
											<tr>
											<td class="text-center"> Body Chart</td>
											<td class="text-center"><div class="custom-checkbox custom-control"><input type="checkbox" id="body_chart" name="body_chart" value="1" class="custom-control-input"  <?php echo ($report['body_chart']==1 ? 'checked' : '');?>><label class="custom-control-label" for="body_chart">
                                                           </label></div></td>
											</tr>
											<tr>
											<td class="text-center">Examination</td>
											<td class="text-center"><div class="custom-checkbox custom-control"><input type="checkbox" id="examination" name="examination" value="1" class="custom-control-input" <?php echo ($report['examination']==1 ? 'checked' : '');?>><label class="custom-control-label" for="examination">
                                                           </label></div></td>
											</tr>
											<tr>
											<td class="text-center">Motor Examination</td>
											<td class="text-center"><div class="custom-checkbox custom-control"><input type="checkbox" id="motor_exam" name="motor_exam" value="1" class="custom-control-input" <?php echo ($report['motor_exam']==1 ? 'checked' : '');?>><label class="custom-control-label" for="motor_exam">
                                                           </label></div></td>
											</tr>
											<tr>
											<td class="text-center">Sensory Examination</td>
											<td class="text-center"><div class="custom-checkbox custom-control"><input type="checkbox" id="sensory_exam" name="sensory_exam" value="1" class="custom-control-input" <?php echo ($report['sensory_exam']==1 ? 'checked' : '');?>><label class="custom-control-label" for="sensory_exam">
                                                           </label></div></td>
											</tr>
											<tr>
											<td class="text-center">Pediatric Examination</td>
											<td class="text-center"><div class="custom-checkbox custom-control"><input type="checkbox" id="pediatric_exam" name="pediatric_exam" value="1" class="custom-control-input" <?php echo ($report['pediatric_exam']==1 ? 'checked' : '');?>><label class="custom-control-label" for="pediatric_exam">
                                                           </label></div></td>
											</tr>
											<tr>
											<td class="text-center">Neuro Examination</td>
											<td class="text-center"><div class="custom-checkbox custom-control"><input type="checkbox" id="neuro_exam" name="neuro_exam" value="1" class="custom-control-input"  <?php echo ($report['neuro_exam']==1 ? 'checked' : '');?>><label class="custom-control-label" for="neuro_exam">
                                                           </label></div></td>
											</tr>
											<tr>
											<td class="text-center">Investigation</td>
											<td class="text-center"><div class="custom-checkbox custom-control"><input type="checkbox" id="investigation" name="investigation" value="1" class="custom-control-input" <?php echo ($report['investigation']==1 ? 'checked' : '');?>><label class="custom-control-label" for="investigation">
                                                           </label></div></td>
											</tr>
											<tr>
											<td class="text-center">Provisional Diagnosis</td>
											<td class="text-center"><div class="custom-checkbox custom-control"><input type="checkbox" id="provisional" name="provisional" value="1" class="custom-control-input" <?php echo ($report['provisional']==1 ? 'checked' : '');?> ><label class="custom-control-label" for="provisional">
                                                           </label></div></td>
											</tr>
											<tr>
											<td class="text-center">Medical Diagnosis</td>
											<td class="text-center"><div class="custom-checkbox custom-control"><input type="checkbox" id="diagnosis" name="diagnosis" value="1" class="custom-control-input" <?php echo ($report['diagnosis']==1 ? 'checked' : '');?>><label class="custom-control-label" for="diagnosis">
                                                           </label></div></td>
											</tr>
											<tr>
											<td class="text-center">Goals</td>
											<td class="text-center"><div class="custom-checkbox custom-control"><input type="checkbox" id="goal" name="goal" value="1" class="custom-control-input" <?php echo ($report['goal']==1 ? 'checked' : '');?>><label class="custom-control-label" for="goal">
                                                           </label></div></td>
											</tr>
											<tr>
											<td class="text-center"> Treatement Protocols</td>
											<td class="text-center"><div class="custom-checkbox custom-control"><input type="checkbox" id="treatment" name="treatment" value="1" class="custom-control-input" <?php echo ($report['treatment']==1 ? 'checked' : '');?>><label class="custom-control-label" for="treatment">
                                                           </label></div></td>
											</tr>
											<tr>
											<td class="text-center"> Treatment Encounter</td>
											<td class="text-center"><div class="custom-checkbox custom-control"><input type="checkbox" id="encounter" name="encounter" value="1" class="custom-control-input" <?php echo ($report['encounter']==1 ? 'checked' : '');?>><label class="custom-control-label" for="encounter">
                                                           </label></div></td>
											</tr>
											<tr>
											<td class="text-center"> Exercise Prescription</td>
											<td class="text-center"><div class="custom-checkbox custom-control"><input type="checkbox" id="exercise" name="exercise" value="1" class="custom-control-input" <?php echo ($report['exercise']==1 ? 'checked' : '');?>><label class="custom-control-label" for="exercise">
                                                           </label></div></td>
											</tr>
											
											</tbody>
													 </table>
													 
													 <div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary" id="save">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
                                               </div>
											   </form>
													 </div>
													 </div>
                                                  </div>
                                                </div>
                                            </div>
											<div id="step-8">
                                                <div id="accordion" class="accordion-wrapper mb-3">
                                                    <div class="card">
                                                       <div class="card-body">
													  <h5 class="card-title" style="text-transform:capitalize;">Consent Form</h5>
                                                     <form class="consent_formlist" action="<?php echo base_url().'client/settings/consent_formlist' ?>" method="post"  role="form" parsley-validate>
                                    
													<div class="form-group transparent-editor">
													<label class="col-sm-4 control-label">Patient Form :</label>
													<div class="col-sm-8">
													  <textarea class="form-control" id="input06" name="consent_form">
													   <?php if($profile['consent_form']!=''){ ?>
													  <?php echo $profile['consent_form']?>
													  <?php } else { ?>
													  <?php echo '1.There is no guarantee of any treatment given in clinic.</br>2. Fees Paid in advance is non-refundable and non-transferable.</br> 3. The Patient and Relative should take care of their belongings.</br> 4. The clinic management is not responsible for any loss.'?>
													  <?php } ?>
													  </textarea>
													</div>
												  </div>
												  
													</div>
													
													<div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary" id="save">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
                                               </div>
											   </form>
                                                    </div>
                                                </div>
                                            </div>
											 
											<div id="step-9">
											
											
											<div id="accordion" class="accordion-wrapper mb-3">
                                                    <div class="card">
                                                       <div class="card-body">
													   <h5 class="card-title" style="text-transform:capitalize;">Add Product</h5>
													   <form class="product_add" action="<?php echo base_url().'client/settings/product_add' ?>" method="post"  role="form" parsley-validate>
                                    
													   <div class="position-relative row form-group">
													<label for="item_name" class="col-sm-4 col-form-label">Item Name</label>
													<div class="col-sm-8">
													 <input name="item_name" id="item_name" type="text" class="form-control" placeholder="Enter Item Name" parsley-trigger="change" parsley-required="true">
													</div>
													</div>
													
													
													<div class="position-relative row form-group">
													<label for="item_code" class="col-sm-4 col-form-label">Item Code</label>
													<div class="col-sm-8">
													<input name="item_code" id="item_code" type="text" class="form-control" placeholder="Enter Item Code"></div>
													</div>
													
													<div class="position-relative row form-group">
													<label for="stack_items" class="col-sm-4 col-form-label">No Of Items</label>
													<div class="col-sm-8">
													<input name="stack_items" id="stack_items" type="text" class="form-control" placeholder="Enter No Of Items"></div>
													</div>
													
													<div class="position-relative row form-group">
													<label for="amount" class="col-sm-4 col-form-label">Amount</label>
													<div class="col-sm-8">
													<input name="amount" id="amount" type="text" class="form-control" placeholder="Enter Amount"></div>
													</div>
													
													
													<div class="position-relative row form-group">
													<label for="discount" class="col-sm-4 col-form-label">Discount</label>
													<div class="col-sm-8">
													<input name="discount" id="discount" type="text" class="form-control" placeholder="Enter Discount"></div>
													</div>
													
													<div class="position-relative row form-group">
													<label for="total" class="col-sm-4 col-form-label">Total</label>
													<div class="col-sm-8">
													<input name="total" id="total" type="text" class="form-control" placeholder="Enter Total"></div>
													</div>
													
													 
                                                 <div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary" id="save">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
                                               </div>
                                                   </form>  
													 
												</div>
												<div class="card-header">Products List
                                         
                                    </div>
									 <div class="card-body">
                                    <div class="table-responsive">
									<?php if($query_item != false) { ?>
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="text-center">S.No</th>
												 
												<th class="text-center">Item</th>
												 
												<th class="text-center">Item Code</th>
												<th class="text-center"># of Items </th>
												 <th class="text-center">Amount </th>
												 <th class="text-center">Discount </th>
												 <th class="text-center">Total </th>
												<th class="text-center">Action</th>
                                                 
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php $i=1;  foreach($query_item as $row) { ?>
                                            <tr id="<?php echo $row['product_id']; ?>">
											 <td class="text-center"><?php echo $i; ?></td>
												<td class="text-center text-muted"><?php echo $row['item_name']; ?> </td>
                                                <td class="text-center"><?php echo $row['item_code']; ?></td>
											   <td class="text-center"> <?php echo $row['stack_items']; ?></td>
											   <td class="text-center"> <?php echo $row['amount']; ?></td>
											   <td class="text-center"> <?php echo $row['discount']; ?></td>
											   <td class="text-center"> <?php echo $row['total']; ?></td>
                                                <td class="text-center">
												
												<a href="<?php echo base_url().'client/settings/product_edit/'.$row['product_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary"><i class="fa fa-edit"></i></button></a>
												<a href="<?php echo '#'.$row['product_id']; ?>" class="delete_product"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete"><i class="fa fa-trash-alt"> </i></button></a>
												
 
                                                </td>
                                            </tr>
                                             <?php $i++; } ?>
                                            </tbody>
                                        </table>
										 <nav class="pagination-rounded" aria-label="Page navigation example" style="text-align:center;">
                                    <ul class="pagination" >
									  <?php foreach ($links3 as $link) { ?>
										<li>
											<?php echo $link; ?>
										</li>
										<?php } ?>
                                     </ul>
								  </nav>
						<?php } else { echo '</br><center><h5 class="card-title" style="text-transform:capitalize;">No Records Found</h5></center>'; }  ?>
                                    </div>
									</div>
                                                    </div>
                                                </div>
												
											</div>
											<div id="step-10">
												<div id="accordion" class="accordion-wrapper mb-3">
												<div class="card">
                                                      <div class="card-body">
													  
													  <h5 class="card-title" style="text-transform:capitalize;">Google Settings</h5>
														<form class="gsetting" action="<?php echo base_url();?>client/settings/google_details" method="POST" role="form" parsley-validate>
													<div class="position-relative row form-group">	
														<label for="map" class="col-sm-4 col-form-label"></label>
														<div class="col-sm-8"></div>
													</div>
													
													
														<div class="position-relative row form-group">
													<label for="map" class="col-sm-4 col-form-label">Map Location</label>
													<div class="col-sm-8">
													<input name="map" id="map" type="text" class="form-control" value="<?php echo $profile['map'];?>"></div>
													</div>
                    
                                                                                                        <div class="position-relative row form-group">
													<label for="review" class="col-sm-4 col-form-label">Google Review Link</label>
													<div class="col-sm-8">
													<input name="review" id="review" type="text" class="form-control" value="<?=($profile['googleRevew_link'])? $profile['googleRevew_link'] : ""; ?>"></div>
													</div>
												
												
												<div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary" id="save">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
                                               </div>
											   </form>
												<?php  /* if($this->session->userdata('client_id')==1637){ */ 
                                                                                                          $this->db->select('googleCalendar')->from('tbl_client')->where('client_id = "'. $this->session->userdata('client_id').'"');
								                                          $results=$this->db->get();
                                                                                                          $cal = $results->row()->googleCalendar;
                                                                                                           if($cal==0){
                                                                                                          ?>
                                                                                                        <h5 style="display:none;"><?php echo $this->session->userdata('googleCalendar'); ?></h5>
													<a class="controls" align="left" href="<?php echo base_url().'client/settings/integrateCalendar' ?>" >
													<button class="mb-2 mr-2 btn btn-pill btn-primary">Integrate with Google Calendar</button>
                                                                                                       	</a>
                                                                                                         <?php }  else {  ?>
                                                                                                              <h5 style="display:none;"><?php echo $this->session->userdata('googleCalendar'); ?></h5>
                                                                                                              <a class="controls" align="left" href="#step-2" >
													      <button class="mb-2 mr-2 btn btn-pill btn-primary">Integrated with Google Calendar</button>
                                                                                                              </a>
                                                                                                        <?php } ?><!-- else statement-->
                                                                                                        <?php  /* }  */ ?>
													 </div>
												</div>	 
												</div>
											</div>
											 
											
                                        </div>
                                    </div>
									
                                    <div class="divider"></div>
                                    <div class="clearfix">
                                       <!-- <button type="button" id="reset-btn22" class="btn-shadow float-left btn btn-link">Reset</button>-->
                                        <!--<button type="button" id="next-btn22" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Next</button>
                                        <button type="button" id="prev-btn22" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">Previous</button>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   </div>
    </div>
</div>

	<div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Setting Details Has Been Added Successfully</div></div></div>
    <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Setting Details Has Not Been Added Successfully</div></div></div>
	
	
	
 

<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<!--<script src="<?php echo base_url()?>asset/js/summernote.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
 <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
var myDate = new Date();
			var prettyDate =(myDate.getDate()) + '/' + (myDate.getMonth()+1) + '/' +
			myDate.getFullYear();
		$(".datepicker").val(prettyDate);
		
  $('.select-control').select2();
  
$('#input06').summernote({
        toolbar: [
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['height', ['height']],
          
        ],
        height: 137
      });
	  
	  
  $(document).ready(function() {
  $('.change_profile').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		 if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var form = $('form')[0];
		 var data = new FormData(form);
			var button = $('#save');
		 button.prop('disabled',true);
		 $('.btn-primary').hide();
		$.ajax({
            type: 'post',
            url: formURL,
			processData: false, 
			contentType: false,
            data:data,
			//data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				$('#toast-container').show();
				setTimeout(function(){ 
				window.location.reload();
				}, 1000);
				 
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$('#toast-container1').delay(5000).fadeOut(400);
				setTimeout(function(){ 
			    window.location.reload();
				}, 1000); 
			}
      }); 
		}
		else{
			
		}
		
});

  $('.gsetting').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		 if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var form = $('form')[0];
		 var data = new FormData(form);
			var button = $('#save');
		 button.prop('disabled',true);
		 $('.btn-primary').hide();
		$.ajax({
            type: 'post',
            url: formURL,
			//processData: false, 
			//contentType: false,
            //data:data,
			data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				$('#toast-container').show();
				setTimeout(function(){ 
				window.location.reload();
				}, 1000);
				 
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$('#toast-container1').delay(5000).fadeOut(400);
				setTimeout(function(){ 
			    window.location.reload();
				}, 1000); 
			}
      }); 
		}
		else{
			
		}
		
});
$('.schedule_setting').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		 if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var form = $('form')[0];
		 var data = new FormData(form);
			var button = $('#save');
		 button.prop('disabled',true);
		 $('.btn-primary').hide();
		$.ajax({
            type: 'post',
            url: formURL,
			//processData: false, 
			//contentType: false,
            //data:data,
			data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				$('#toast-container').show();
				setTimeout(function(){ 
				window.location.reload();
				}, 1000);
				 
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$('#toast-container1').delay(5000).fadeOut(400);
				setTimeout(function(){ 
			    window.location.reload();
				}, 1000); 
			}
      }); 
		}
		else{
			
		}
		
});

$('.addlogo').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		 if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var form = $('form')[0];
		 var data = new FormData(form);
			var button = $('#save');
		 button.prop('disabled',true);
		 $('.btn-primary').hide();
		$.ajax({
            type: 'post',
            url: formURL,
			//processData: false, 
			//contentType: false,
            //data:data,
			data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				$('#toast-container').show();
				setTimeout(function(){ 
				window.location.reload();
				}, 1000);
				 
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$('#toast-container1').delay(5000).fadeOut(400);
				setTimeout(function(){ 
			    window.location.reload();
				}, 1000); 
			}
      }); 
		}
		else{
			
		}
		
});
$('.change_profile_address').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		 if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var form = $('form')[0];
		 var data = new FormData(form);
			var button = $('#save');
		 button.prop('disabled',true);
		 $('.btn-primary').hide();
		$.ajax({
            type: 'post',
            url: formURL,
			//processData: false, 
			//contentType: false,
            //data:data,
			data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				$('#toast-container').show();
				setTimeout(function(){ 
				window.location.reload();
				}, 1000);
				 
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$('#toast-container1').delay(5000).fadeOut(400);
				setTimeout(function(){ 
			    window.location.reload();
				}, 1000); 
			}
      }); 
		}
		else{
			
		}
		
});
$('.sch_settings_edit').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		 if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var form = $('form')[0];
		 var data = new FormData(form);
			var button = $('#save');
		 button.prop('disabled',true);
		 $('.btn-primary').hide();
		$.ajax({
            type: 'post',
            url: formURL,
			//processData: false, 
			//contentType: false,
            //data:data,
			data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				$('#toast-container').show();
				setTimeout(function(){ 
				window.location.reload();
				}, 1000);
				 
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$('#toast-container1').delay(5000).fadeOut(400);
				setTimeout(function(){ 
			    window.location.reload();
				}, 1000); 
			}
      }); 
		}
		else{
			
		}
		
});
$('.report_form').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		 if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var form = $('form')[0];
		 var data = new FormData(form);
			var button = $('#save');
		 button.prop('disabled',true);
		 $('.btn-primary').hide();
		$.ajax({
            type: 'post',
            url: formURL,
			//processData: false, 
			//contentType: false,
            //data:data,
			data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				$('#toast-container').show();
				setTimeout(function(){ 
				window.location.reload();
				}, 1000);
				 
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$('#toast-container1').delay(5000).fadeOut(400);
				setTimeout(function(){ 
			    window.location.reload();
				}, 1000); 
			}
      }); 
		}
		else{
			
		}
		
});
$('.notes_det').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		 if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var form = $('form')[0];
		 var data = new FormData(form);
			var button = $('#save');
		 button.prop('disabled',true);
		 $('.btn-primary').hide();
		$.ajax({
            type: 'post',
            url: formURL,
			//processData: false, 
			//contentType: false,
            //data:data,
			data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				$('#toast-container').show();
				setTimeout(function(){ 
				window.location.reload();
				}, 1000);
				 
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$('#toast-container1').delay(5000).fadeOut(400);
				setTimeout(function(){ 
			    window.location.reload();
				}, 1000); 
			}
      }); 
		}
		else{
			
		}
		
});
$('.form-horizontal').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		 if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var form = $('form')[0];
		 var data = new FormData(form);
			var button = $('#save');
		 button.prop('disabled',true);
		 $('.btn-primary').hide();
		$.ajax({
            type: 'post',
            url: formURL,
			//processData: false, 
			//contentType: false,
            //data:data,
			data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				$('#toast-container').show();
				setTimeout(function(){ 
				window.location.reload();
				}, 1000);
				 
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$('#toast-container1').delay(5000).fadeOut(400);
				setTimeout(function(){ 
			    window.location.reload();
				}, 1000); 
			}
      }); 
		}
		else{
			
		}
		
});
$('.settings_invoice').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		 if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var form = $('form')[0];
		 var data = new FormData(form);
			var button = $('#save');
		 button.prop('disabled',true);
		 $('.btn-primary').hide();
		$.ajax({
            type: 'post',
            url: formURL,
			//processData: false, 
			//contentType: false,
            //data:data,
			data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				$('#toast-container').show();
				setTimeout(function(){ 
				window.location.reload();
				}, 1000);
				 
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$('#toast-container1').delay(5000).fadeOut(400);
				setTimeout(function(){ 
			    window.location.reload();
				}, 1000); 
			}
      }); 
		}
		else{
			
		}
		
});

$('.add_expense_item').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		 if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var form = $('form')[0];
		 var data = new FormData(form);
			var button = $('#save');
		 button.prop('disabled',true);
		 $('.btn-primary').hide();
		$.ajax({
            type: 'post',
            url: formURL,
			//processData: false, 
			//contentType: false,
            //data:data,
			data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				$('#toast-container').show();
				setTimeout(function(){ 
				window.location.reload();
				}, 1000);
				 
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$('#toast-container1').delay(5000).fadeOut(400);
				setTimeout(function(){ 
			    window.location.reload();
				}, 1000); 
			}
      }); 
		}
		else{
			
		}
		
});
$('.add_prov_diagnosis').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		 if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var form = $('form')[0];
		 var data = new FormData(form);
			var button = $('#save');
		 button.prop('disabled',true);
		 $('.btn-primary').hide();
		$.ajax({
            type: 'post',
            url: formURL,
			//processData: false, 
			//contentType: false,
            //data:data,
			data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				$('#toast-container').show();
				setTimeout(function(){ 
				window.location.reload();
				}, 1000);
				 
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$('#toast-container1').delay(5000).fadeOut(400);
				setTimeout(function(){ 
			    window.location.reload();
				}, 1000); 
			}
      }); 
		}
		else{
			
		}
		
});
$('.change_sms').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		 if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var form = $('form')[0];
		 var data = new FormData(form);
			var button = $('#save');
		 button.prop('disabled',true);
		 $('.btn-primary').hide();
		$.ajax({
            type: 'post',
            url: formURL,
			//processData: false, 
			//contentType: false,
            //data:data,
			data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				$('#toast-container').show();
				setTimeout(function(){ 
				window.location.reload();
				}, 1000);
				 
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$('#toast-container1').delay(5000).fadeOut(400);
				setTimeout(function(){ 
			    window.location.reload();
				}, 1000); 
			}
      }); 
		}
		else{
			
		}
		
});
$('.announce_holiday').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		 if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var form = $('form')[0];
		 var data = new FormData(form);
			var button = $('#save');
		 button.prop('disabled',true);
		 $('.btn-primary').hide();
		$.ajax({
            type: 'post',
            url: formURL,
			//processData: false, 
			//contentType: false,
            //data:data,
			data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				$('#toast-container').show();
				setTimeout(function(){ 
				window.location.reload();
				}, 1000);
				 
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$('#toast-container1').delay(5000).fadeOut(400);
				setTimeout(function(){ 
			    window.location.reload();
				}, 1000); 
			}
      }); 
		}
		else{
			
		}
		
});
$('.announce_holiday1').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		 if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var form = $('form')[0];
		 var data = new FormData(form);
			var button = $('#save');
		 button.prop('disabled',true);
		 $('.btn-primary').hide();
		$.ajax({
            type: 'post',
            url: formURL,
			//processData: false, 
			//contentType: false,
            //data:data,
			data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				$('#toast-container').show();
				setTimeout(function(){ 
				window.location.reload();
				}, 1000);
				 
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$('#toast-container1').delay(5000).fadeOut(400);
				setTimeout(function(){ 
			    window.location.reload();
				}, 1000); 
			}
      }); 
		}
		else{
			
		}
		
});
$('.clinic_open_add').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		 if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var form = $('form')[0];
		 var data = new FormData(form);
			var button = $('#save');
		 button.prop('disabled',true);
		 $('.btn-primary').hide();
		$.ajax({
            type: 'post',
            url: formURL,
			//processData: false, 
			//contentType: false,
            //data:data,
			data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				$('#toast-container').show();
				setTimeout(function(){ 
				window.location.reload();
				}, 1000);
				 
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$('#toast-container1').delay(5000).fadeOut(400);
				setTimeout(function(){ 
			    window.location.reload();
				}, 1000); 
			}
      }); 
		}
		else{
			
		}
		
});
$('.consent_formlist').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		 if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var form = $('form')[0];
		 var data = new FormData(form);
			var button = $('#save');
		 button.prop('disabled',true);
		 $('.btn-primary').hide();
		$.ajax({
            type: 'post',
            url: formURL,
			//processData: false, 
			//contentType: false,
            //data:data,
			data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				$('#toast-container').show();
				setTimeout(function(){ 
				window.location.reload();
				}, 1000);
				 
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$('#toast-container1').delay(5000).fadeOut(400);
				setTimeout(function(){ 
			    window.location.reload();
				}, 1000); 
			}
      }); 
		}
		else{
			
		}
		
});
$('.product_add').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		 if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var form = $('form')[0];
		 var data = new FormData(form);
			var button = $('#save');
		 button.prop('disabled',true);
		 $('.btn-primary').hide();
		$.ajax({
            type: 'post',
            url: formURL,
			//processData: false, 
			//contentType: false,
            //data:data,
			data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				$('#toast-container').show();
				setTimeout(function(){ 
				window.location.reload();
				}, 1000);
				 
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$('#toast-container1').delay(5000).fadeOut(400);
				setTimeout(function(){ 
			    window.location.reload();
				}, 1000); 
			}
      }); 
		}
		else{
			
		}
		
});
$('.add_item').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		 if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var form = $('form')[0];
		 var data = new FormData(form);
			var button = $('#save');
		 button.prop('disabled',true);
		 $('.btn-primary').hide();
		$.ajax({
            type: 'post',
            url: formURL,
			//processData: false, 
			//contentType: false,
            //data:data,
			data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				$('#toast-container').show();
				setTimeout(function(){ 
				window.location.reload();
				}, 1000);
				 
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$('#toast-container1').delay(5000).fadeOut(400);
				setTimeout(function(){ 
			    window.location.reload();
				}, 1000); 
			}
      }); 
		}
		else{
			
		}
		
});  
});  

$(document).on('change', '#logo_upload', function(e){
				var data = new FormData();
				data.append('logo', $('#logo_upload').prop('files')[0]);
				$('#dvloader').show();
				$.ajax(
				{
					url : '<?php echo base_url().'client/dashboard/logo_upload' ?>',            
					processData: false, 
					contentType: false, 
					data : data,
					type: "POST",
					dataType : 'json',  
					
					success:function(data, textStatus, jqXHR,form) 
					{
						if(data.status == 'success'){
							$('#toast-container').show();
							$('#upload_img').val(data.file_name);
							 
								$('#dvloader').hide();
						} else {
							 
								$('#toast-container1').delay(5000).fadeOut(400);
						}
						
					},
					
				});
		
			});
			
				$('#break1').hide();
		$('#break2').hide();
		$('#break3').hide();
		$('#break4').hide();
		$('#break5').hide();
		$('#break6').hide();
		$('#break7').hide();
		
		$('#add_break').click(function() {
			$('#break1').show();
			$('#break2').show();
			$('#break3').show();
			$('#break4').show();
			$('#break5').show();
			$('#break6').show();
			$('#break7').show();
	});
	
	
	$(document).ready(function() {
		
	 	$('.delete_product').on('click', function () {
			 var product_id = $(this).attr('href').split('#')[1];
			 url ='<?php echo base_url().'client/settings/delete_product/' ?>'+ product_id; 
			 swal({
			  title: "Confirmation",
			  text: "Are you sure you want to Delete this Products?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					data : {p_id:product_id},
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
					//alert(data.status); 
						if(data.status == 'success') { 
						  swal("Success!", "Your records has been Deleted!", "success");
						}
						 $('#'+product_id).remove(); 
							
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						  swal("Failure!", "Your records has not been Deleted!", "success");
						// window.location.reload(); 
					}
				  });
			}); 
	});

		$('.del_diag').on('click', function () {
			 var pd_list_id = $(this).attr('href').split('#')[1];
			 url ='<?php echo base_url().'client/settings/del_diag/' ?>'+ pd_list_id; 
			 swal({
			  title: "Confirmation",
			  text: "Are you sure you want to Delete this List?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					data : {p_id:pd_list_id},
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
					 if(data.status == 'success') { 
						  swal("Success!", "Your records has been Deleted!", "success");
						}
						 $('#'+pd_list_id).remove(); 
							
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						  swal("Failure!", "Your records has not been Deleted!", "success");
						 
					}
				  });
			}); 
	});
	
	
	$('.expense_del').on('click', function () {
			 var item_id = $(this).attr('href').split('#')[1];
			 url ='<?php echo base_url().'client/settings/expenseitem_delete/' ?>'+ item_id; 
			 swal({
			  title: "Confirmation",
			  text: "Are you sure you want to Delete this Expense?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					data : {p_id:item_id},
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
					 if(data.status == 'success') { 
						  swal("Success!", "Your records has been Deleted!", "success");
						}
						 $('#'+item_id).remove(); 
							
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						  swal("Failure!", "Your records has not been Deleted!", "success");
						 
					}
				  });
			}); 
	});
	
	
	$('.item_del').on('click', function () {
			 var item_id = $(this).attr('href').split('#')[1];
			 url ='<?php echo base_url().'client/settings/item_delete/' ?>'+ item_id; 
			 swal({
			  title: "Confirmation",
			  text: "Are you sure you want to Delete this Item?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					data : {p_id:item_id},
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
					 if(data.status == 'success') { 
						  swal("Success!", "Your records has been Deleted!", "success");
						}
						 $('#'+item_id).remove(); 
							
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						  swal("Failure!", "Your records has not been Deleted!", "success");
						 
					}
				  });
			}); 
	});
	
	
});


$('.set').hide();
	 $('#edit_set').click(function() {
		  $('.set').show();
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
