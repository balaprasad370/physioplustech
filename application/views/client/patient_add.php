<!doctype html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Add New Patient - Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
    
 
    <meta name="msapplication-tap-highlight" content="no">
 <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
<link href="<?php echo base_url()?>asset_list/main.css" rel="stylesheet">
 
<style>
.parsley-error-list{
	color:red;
	list-style-type:none;
}
label, th, .td{
	font-weight:bold;
	color:#3f6ad8;
}
.custom-control-label{
	color:#000000;
	font-weight:400;
}
</style>
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
 
				<?php include("sidebar.php");?>
           <div class="app-main__outer">
                <div class="app-main__inner">
                                
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Patient Details</h5>
                                    <form class=""method="post" action="<?php echo base_url().'client/patient/patient_add' ?>" parsley-validate role="form" id="basicvalidations">
                                        <div class="form-row">
                                             
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="first_name" class="">First Name *</label>
												<input name="first_name" id="first_name" placeholder="" type="text"  value="" class="form-control" parsley-required="true" autocomplete="off"></div>
                                            </div>
											
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="last_name" class="">Last Name </label>
												<input name="last_name" id="last_name" placeholder="" type="text" class="form-control" autocomplete="off"></div>
                                            </div>
                                        </div>
										<div class="form-row">
                                            
											
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="appoint_date" class="">Date *</label>
												<input name="appoint_date" id="appoint_date" placeholder="" type="text" class="form-control datepicker" data-toggle="datepicker" parsley-trigger="change" parsley-required="true"></div>
                                            </div>
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="category" class="">Patient Type *</label>
												</br>
												<div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-shadow btn-outline-primary active">
                                                        <input type="radio" name="category" id="category" value="1" checked> 
                                                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; OP Patient&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </label>
                                                    <label class="btn btn-shadow btn-outline-primary">
                                                        <input type="radio" name="category" id="category1" value="2"> 
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Home Patient&nbsp;&nbsp;&nbsp;
                                                    </label>
								             </div>
											 
												</div>
                                            </div>
                                           
                                        </div>
										<div class="form-row">
										
										<div class="col-md-6">
										<label for="due_date" class="" style="text-align:center;">Gender *</label></br>
										<div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-shadow btn-outline-primary">
                                                        <input type="radio" name="gender" id="gender" value="male"  parsley-trigger="change" parsley-required="true"> 
                                                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Male &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </label>
                                                    <label class="btn btn-shadow btn-outline-primary">
                                                        <input type="radio" name="gender" id="gender1" value="female" parsley-trigger="change" parsley-required="true"> 
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Female &nbsp;&nbsp;&nbsp;
                                                    </label>
													<label class="btn btn-shadow btn-outline-primary">
                                                        <input type="radio" name="gender" id="gender1" value="other" parsley-trigger="change" parsley-required="true"> 
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Other &nbsp;&nbsp;&nbsp;
                                                    </label>
								             </div>
											 
											 </div>
                                             <div class="col-md-6">
                                                  <div class="position-relative form-group"><label for="mobile_no" class="">Mobile *</label>
												<input name="mobile_no" id="mobile_no" placeholder="" type="text" class="form-control mobile_no" parsley-trigger="change" parsley-required="true" parsley-type="number"  maxlength="10" autocomplete="off">
												</div>
												<div class="alert alert-danger fade show mobile" style="padding:.5em;"> Mobile Number already Exist</div> 
												
                                            </div>
                                             
                                        </div>
										
										<div class="form-row">
                                             
											 
											 <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="email" class="">Email</label>
												<input name="email" id="email" placeholder="" type="text"  value="" class="form-control" autocomplete="off">
												</div>
                                            </div>
											
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="ref_no" class="">Clinic Reference Number</label>
												<input name="ref_no" id="ref_no" type="text" class="form-control" autocomplete="off"></div>
                                            </div>
											
											  </div>
										
										<div class="form-row">
                                             
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="dob" class="">DOB</label>
												<input name="dob" id="dob" type="text" class="form-control datepicker" data-toggle="datepicker-year" autocomplete="off"></div>
                                            </div>
											
											 <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="age" class="">Age</label>
												<input name="age" id="age" placeholder="" type="text" class="form-control age" ></div>
                                            </div>
                                        </div>
										
										 <div id="enter_detail1">
										
										<div class="form-row">
                                             
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="dominance" class="">Dominance (R/L)</label>
												<input name="dominance" id="dominance" type="text" class="form-control" autocomplete="off"></div>
                                            </div>
											
											 <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="marital_status" class=""> Marital status</label></br>
												
												<!--<div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">-->
                                                    <label class="btn btn-shadow btn-outline-primary">
                                                        <input type="radio" name="marital_status" id="marital_status" value="single"  > 
                                                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Single &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </label>
                                                    <label class="btn btn-shadow btn-outline-primary">
                                                        <input type="radio" name="marital_status" id="marital_status1" value="Married" > 
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Married &nbsp;&nbsp;&nbsp;
                                                    </label>
								             <!--</div>-->
                                            </div>
                                        </div>
										
										
										</div>
										
										 
										 <div class="form-row">
                                            <div class="col-md-6" id="selectbox">
                                                <div class="position-relative form-group"><label for="referal_type_id" class="">Referral Source</label>
												 <select class="form-control referal_type_id" name="referal_type_id"  id="referal_type_id">
											<option value="">Please Select Referral source</option>
											<?php
											if ($referal_type != false) {
											foreach ($referal_type as $referal_types) {
											echo '<option value="'.$referal_types['referal_type_id'].'">'.$referal_types['referal_type_name'].'</option>';
											}
										}
									?>											
									</select>
												</div>
                                            </div>
											 
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="referal_id" class="">Name</label>
												 <select class="form-control referal_id" name="referal_id"  id="referal_id">
											<option></option>						
											</select>
											<a id="add_ref" class="mb-2 mr-2 btn btn-info btn-pill add_ref" style="color:white;">Add New Referral
                                             </a>
												</div>
                                            </div>
                                        </div>
                                       
									   
									   <div class="form-row add_Doctor alert alert-info">
                                             <div class="col-md-6">
                                                 <div class="position-relative form-group"><label for="doc_referal_name">Referral Name</label> 
												  <input name="doc_referal_name" id="doc_referal_name" type="text" class="form-control" placeholder="Enter Referral Name">
												</div>
												
                                             </div>
											 
											  <div class="col-md-6">
                                                 <div class="position-relative form-group"><label for="doc_special">Specialist</label> 
												  <select class="form-control" name="doc_special" id="doc_special" >
                                                     <option> </option>
										    <?php if ($specialists != false) { foreach ($specialists as $specialist) {
											echo '<option value="'.$specialist['specialist_id'].'">'.$specialist['specialist_name'].'</option>'; } }?>
								           </select>
										   <a id="special" class="mb-2 mr-2 btn btn-info btn-pill special" style="color:white;">Add New Specialist
                                             </a>
												</div>
												
                                             </div>
											 
											  
											 
											 
											 <div class="col-md-6">
                                                 <div class="position-relative form-group"><label for="mobile">Mobile</label> 
												  <input name="mobile" id="mobile" type="text" class="form-control" placeholder="Enter Mobile" autocomplete="off">
												</div>
												
                                             </div>
											 
											  <div class="col-md-6">
                                                 <div class="position-relative form-group"><label for="doc_email">Email</label> 
												  <input name="doc_email" id="doc_email" type="text" class="form-control" placeholder="Enter Email" autocomplete="off">
												</div>
												<div class="form-group">
												<a id="save_doc" class="mb-2 mr-2 btn-pill btn btn-primary save_doc" style="color:white;">Submit</button></a>
												<a id="cancel_doc" class="mb-2 mr-2 btn-pill btn btn-danger" style="color:white;">Cancel</button></a>
												</div>
                                             </div>
											 </div>
											 
											 
											 <div class="form-row add_special alert alert-info">
                                            <div class="col-md-6">
                                                 <div class="position-relative form-group"><label for="specialist">Specialist</label> 
												  <input name="specialist" id="specialist" type="text" class="form-control" placeholder="Enter Specialist Name">
												</div>
												 <div class="form-group">
												<a id="save_special" class="mb-2 mr-2 btn-pill btn btn-primary save_special" style="color:white;">Submit</button></a>
												<a id="cancel_special" class="mb-2 mr-2 btn-pill btn btn-danger" style="color:white;">Cancel</button></a>
												</div>
                                            </div>
											 </div>
											 
											 
									   
									    <div class="form-row add_Insurance alert alert-info">
                                             <div class="col-md-6">
                                                 <div class="position-relative form-group"><label for="referal_name">Referral Name</label> 
												  <input name="referal_name" id="referal_name" type="text" class="form-control" placeholder="Enter Referral Name">
												</div>
												
                                             </div>
											 
											  <div class="col-md-6">
                                                 <div class="position-relative form-group"><label for="mobile">Mobile</label> 
												  <input name="mobile" id="mobile" type="text" class="form-control" placeholder="Enter Mobile Number">
												</div>
												      
                                             </div>
											 
											  <div class="col-md-6">
                                                 <div class="position-relative form-group"><label for="email">Email</label> 
												  <input name="ins_email" id="ins_email" type="text" class="form-control" placeholder="Enter Email">
												</div>
												<div class="form-group">
												<a id="save_ins" class="mb-2 mr-2 btn-pill btn btn-primary save_ins" style="color:white;">Submit</button></a>
												<a id="cancel_ins" class="mb-2 mr-2 btn-pill btn btn-danger" style="color:white;">Cancel</button></a>
												</div>
                                             </div>
											 </div>
									   
									   <div class="form-row add_Website alert alert-info">
                                            <div class="col-md-6">
                                                 <div class="position-relative form-group"><label for="website_name">Website Name</label> 
												  <input name="website_name" id="website_name" type="text" class="form-control" placeholder="Enter Website Name">
												</div>
												 <div class="form-group">
												<a id="save_web" class="mb-2 mr-2 btn-pill btn btn-primary save_web" style="color:white;">Submit</button></a>
												<a id="cancel_web" class="mb-2 mr-2 btn-pill btn btn-danger" style="color:white;">Cancel</button></a>
												</div>
                                            </div>
											 </div>
											 
											 
											  <div class="form-row add_Adv alert alert-info">
                                            <div class="col-md-6">
                                                 <div class="position-relative form-group"><label for="adv_name">Advertisement Name</label> 
												  <input name="adv_name" id="adv_name" type="text" class="form-control" placeholder="Enter Advertisement Name">
												</div>
												 
                                            </div>
											<div class="col-md-6">
                                                 <div class="position-relative form-group"><label for="adv_location">Description</label> 
												 <textarea rows="3" class="form-control autosize-input form-rounded"   id="adv_location" name="adv_location" ></textarea>
												</div>
												 
                                            </div>
											<div class="form-group">
												<a id="save_adv" class="mb-2 mr-2 btn-pill btn btn-primary save_adv" style="color:white;">Submit</button></a>
												<a id="cancel_adv" class="mb-2 mr-2 btn-pill btn btn-danger" style="color:white;">Cancel</button></a>
												</div>
											 </div>
											 
											 
											 <div class="form-row add_Other alert alert-info">
                                            <div class="col-md-6">
                                                 <div class="position-relative form-group"><label for="other_name">Other's Name</label> 
												  <input name="other_name" id="other_name" type="text" class="form-control" placeholder="Enter Other's Name">
												</div>
												 <div class="form-group">
												<a id="save_other" class="mb-2 mr-2 btn-pill btn btn-primary save_other" style="color:white;">Submit</button></a>
												<a id="cancel_other" class="mb-2 mr-2 btn-pill btn btn-danger" style="color:white;">Cancel</button></a>
												</div>
                                            </div>
											 </div>
											 
											 
											 <div class="form-row add_Patient alert alert-info">
                                             <div class="col-md-6">
                                                 <div class="position-relative form-group"><label for="other_name">Patient Name</label> 
												  <input name="patient_name" id="patient_name" type="text" class="form-control" placeholder="Enter Patient Name">
												</div>
												<div class="form-group">
												<a id="save_pat" class="mb-2 mr-2 btn-pill btn btn-primary save_pat" style="color:white;">Submit</button></a>
												<a id="cancel_pat" class="mb-2 mr-2 btn-pill btn btn-danger" style="color:white;">Cancel</button></a>
												</div>
                                             </div>
											 </div>
									   
										<!-- <div class="form-row">
                                            <div class="col-md-6" id="selectbox">
                                                <div class="position-relative form-group"><label for="concess_group_id" class="">Referral Source</label>
												 <select class="form-control" name="concess_group_id"  id="concession">
											<option value="">Please Select Concession Group</option>
									<?php
									if ($concessGroup != false) {
									foreach ($concessGroup as $concessGroups) {
										echo '<option value="'.$concessGroups['concess_group_id'].'">'.$concessGroups['concess_group_name'].'</option>';
									}
								}
								?></select>
												</div>
                                            </div>
											 
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="height" class="">Height (in cm)</label> 
												  <input name="height" id="height" type="text" class="form-control">
												</div>
                                            </div>
                                        </div>-->
										
										
										<div class="form-row">
                                            <div class="col-md-6" id="selectbox">
                                                 <div class="position-relative form-group"><label for="height" class="">Height (in cm)</label> 
												  <input name="height" id="height" type="text" class="form-control" autocomplete="off">
												</div>
                                            </div>
											 
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="weight" class="">Weight (in kg)</label>
												  <input name="weight" id="weight" type="text" onchange="calculateBmi()" class="form-control" autocomplete="off">
												</div>
                                            </div>
                                        </div>
										
										<div class="form-row">
                                            
											 
                                            <div class="col-md-6">
                                                 <div class="position-relative form-group"><label for="bmi" class="">BMI</label>
												  <input name="bmi" id="bmi" type="text"  class="form-control">
												  <div id="thin" style="display:none" class="alert alert-info"> That you are too thin. </div>
						                          <div id="healthy" style="display:none" class="alert alert-success"> That you are healthy. </div>
						                          <div id="overwt" style="display:none" class="alert alert-danger"> That you have overweight. </div>
												</div>
                                            </div>
											
											 <div class="col-md-6 consan_mrge">
                                                <div class="position-relative form-group"><label for="consan_marriage" class="">Consanguineous Marriage</label></br>
												 <div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-shadow btn-outline-primary">
                                                        <input type="radio" name="consan_marriage" id="consan_marriage" value="Yes"  > 
                                                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </label>
                                                    <label class="btn btn-shadow btn-outline-primary">
                                                        <input type="radio" name="consan_marriage" id="consan_marriage1" value="No" > 
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No &nbsp;&nbsp;&nbsp;
                                                    </label>
								             </div>

												</div>
                                            </div>
											
                                        </div>
										
										
										<div class="form-row">
                                             
											 
                                           
											
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="food_habits" class="">Food habits</label></br>
												 <div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-shadow btn-outline-primary">
                                                        <input type="radio" name="food_habits" id="food_habits" value="vegetarian"  > 
                                                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; VEG &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </label>
                                                    <label class="btn btn-shadow btn-outline-primary">
                                                        <input type="radio" name="food_habits" id="food_habits1" value="non-vegetarian" > 
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Non-VEG &nbsp;&nbsp;&nbsp;
                                                    </label>
													
													<label class="btn btn-shadow btn-outline-primary">
                                                        <input type="radio" name="food_habits" id="food_habits2" value="eggetarian" > 
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Eggetarian &nbsp;&nbsp;&nbsp;
                                                    </label>
								             </div>
												</div>
                                            </div>
											
											<div class="col-md-6" id="selectbox">
                                                <div class="position-relative form-group"><label for="aadhar_id" class="">ID Number</label>
												  <input name="aadhar_id" id="aadhar_id" type="text" class="form-control">
												</div>
                                            </div>
											
											
                                        </div>
										
										
										<div class="form-row">
                                            
											 
                                            <div class="col-md-6">
                                                 <div class="position-relative form-group"><label for="occupation" class="">Occupation and Description</label>
												   
												  <textarea rows="3" class="form-control autosize-input form-rounded"   id="occupation" name="occupation" autocomplete="off"></textarea>
												</div>
                                            </div>
											
											 <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="address_line1" class="">Address 1</label>
												  <textarea rows="3" class="form-control autosize-input form-rounded"   id="address_line1" name="address_line1" autocomplete="off"></textarea>
												</div>
                                            </div>
                                        </div>
										
										
										
										
										<div class="form-row">
                                           
											 
                                            <div class="col-md-6">
                                                 <div class="position-relative form-group"><label for="city" class="">City</label>
												  <input name="city" id="city" type="text"  class="form-control" autocomplete="off">
												</div>
                                            </div>
											
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="address_line2" class="">Address 2</label>
												 <textarea rows="3" class="form-control autosize-input form-rounded"   id="address_line2" name="address_line2" autocomplete="off"></textarea>
												   
												</div>
                                            </div>
                                        </div>
										
										
										<div class="form-row">
                                            
											 
                                            <div class="col-md-6">
                                                 <div class="position-relative form-group"><label for="pincode" class="">Pincode</label>
												  <input name="pincode" id="pincode" type="text"  class="form-control" autocomplete="off">
												</div>
                                            </div>
											
											<div class="col-md-6" id="selectbox">
                                                <div class="position-relative form-group"><label for="phone_no" class="">Phone</label>
												   <input name="phone_no" id="phone_no" type="text"  class="form-control" parsley-type="number" autocomplete="off">
												</div>
                                            </div>
                                        </div>
										
										
										
										<div class="form-row">
                                            
											 
                                            <div class="col-md-6">
                                                 <div class="position-relative form-group"><label for="contact_person_name" class="">Contact Person</label>
												  <input name="contact_person_name" id="contact_person_name" type="text"  class="form-control" autocomplete="off">
												</div>
                                            </div>
											
											<div class="col-md-6" id="selectbox">
                                                <div class="position-relative form-group"><label for="contact_person_mobile" class="">Contact Person Number</label>
												   <input name="contact_person_mobile" id="contact_person_mobile" type="text"  class="form-control" autocomplete="off"> 
												</div>
                                            </div>
                                        </div>
										
										 
									
										<div class="divider"></div>
                                            <div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn-pill btn btn-primary submit" id="submit">Submit	</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
                                            </div>
											
										</div>
										<div class="divider"></div>
                                            <div class="clearfix quick">
                                                <center>
                                                 <button type="submit" class="mb-2 mr-2 btn-pill btn btn-primary" id="quick_add"> <?php echo $this->session->userdata("whatsapp"); ?> Quick Add</button>
												OR &nbsp;&nbsp;<a class="mb-2 mr-2 btn btn-pill btn-info" id="detail" style="color:white;">Enter Detailed Info</a>
												
												</center>
                                            </div>
                                    </form>
                                </div>
                            </div>
                             
                        </div>
                         
                    </div>
                </div>
       </div>    
	    </div>    
		 </div>   

<div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Patient Has Been Added Successfully</div></div></div>
    <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Patient Has Not Been Added Successfully</div></div></div>

 		 
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script>
<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
 <?php
 $this->db->select('clinic_name,logo,facebook,twitter,instagarm,whatsapp')->from('tbl_client')->where('client_id',$this->session->userdata('client_id'));
					$res = $this->db->get();
					$whatsapp = $res->row()->whatsapp;
					$clinic_name = $res->row()->clinic_name;
					$facebook = $res->row()->facebook;
					$twitter = $res->row()->twitter;
					$instagarm = $res->row()->instagarm;
 ?>
<script>
function calculateBmi() {
	var weight = Number(document.getElementById('weight').value).toFixed(2);
	var height = Number(document.getElementById('height').value).toFixed(2);
	if(weight > 0 && height > 0){	
	var finalBmi = Number(weight/(height/100*height/100)).toFixed(2);
	document.getElementById('bmi').value = finalBmi
	if(finalBmi < 18.5){
		document.getElementById('thin').style.display='block';
		document.getElementById('healthy').style.display='none';
		document.getElementById('overwt').style.display='none';
	}
	if(finalBmi > 18.5 && finalBmi < 25){
		document.getElementById('healthy').style.display='block';
		document.getElementById('thin').style.display='none';
		document.getElementById('overwt').style.display='none';
	}
	if(finalBmi > 25){
		document.getElementById('overwt').style.display='block';
		document.getElementById('thin').style.display='none';
		document.getElementById('healthy').style.display='none';
	}
	}
    } 
	
	$('#dob').click(function(){
	 setTimeout(function(){ 
	var today = new Date();
	var dd = Number(today.getDate());
	var mm = Number(today.getMonth()+1);
	var yyyy = Number(today.getFullYear()); 
	var myBD = $('#dob').val();
	var myBDM = Number(myBD.split("/")[0])
	var myBDD = Number(myBD.split("/")[1])
	var myBDY = Number(myBD.split("/")[2])
	var age = yyyy - myBDY;
	$('.age').val(age);
	}, 10000);
	});
	
	$('.add_cg').hide();
		$('#add_concession').click(function() { 
			$('.add_cg').show();
		});
		
	$('#cancel').click(function() { 
			$('.add_cg').hide();
		});
		
		$('#enter_detail').hide();
		$('#enter_detail1').hide();
		$('#detail').click(function() {
			$('#enter_detail').show();
			$('#enter_detail1').show();
			$('.quick').hide();
		});
		
		var myDate = new Date();
		var prettyDate =(myDate.getDate()) + '/' + (myDate.getMonth()+1) + '/' + myDate.getFullYear();
		$("#appoint_date").val(prettyDate);
		
			  $('form').on('submit', function (event) {
			$(".mobile_no").trigger('keyup');
			 event.preventDefault();
			 var $form = $(this);
			 var val = $('input[name=category]:checked', '#basicvalidations').val();
			 var value= $('.mobile_val').val();
			 if ( $(this).parsley().isValid() && value != '' && value != '1' ) {
			 var  formID = $(this).attr("id");
			 var  formURL = $(this).attr("action");
			 var button = $('#quick_add');
			 var button1 = $('#submit');
			 button.prop('disabled', true);
			 button1.prop('disabled', true);
					
			$.ajax({
				type: 'post',
				url: $(this).attr('action'),
				data:$(this).serialize(),
				success:function(data, textStatus, jqXHR,form) 
				{
					if(val == '1'){
					$('#toast-container').show();
					if($("#mobile_no").val()!='')
					{
						 var p_mobile = $("#mobile_no").val();
						 var clinic = '<?=$this->session->userdata("clinic_name");?>';
						 var whatsapp = '<?=$whatsapp?>';
						 var p_name = $("#first_name").val()+' '+$("#last_name").val();
						 var facebook = '<?=$facebook?>';
						 var  twitter= '<?=$twitter?>';
						 var  instagarm= '<?=$instagarm?>';
						var smiley= '<?php echo json_decode('"\uE414"');?>';
						if(whatsapp==1){
						var msg1='https://web.whatsapp.com/send?phone=91'+p_mobile+'&text=Dear '+p_name+','+'%0a'+'We are pleased to welcome you to the '+clinic+'%0a'+'%0a'+'Providing you the best physiotherapy treatment along with counseling to keep you functional and to relieve your symptoms is our top priority.'+'%0a'+'We look forward to a continued relationship with you.'+'%0a'+'You can stay connected with us and get health tips through, '+'%0a'+''+facebook+'%0a'+twitter+'%0a'+instagarm+'%0a'+'Thank you'+smiley;
						//alert(msg1);
						window.open(msg1, '_blank');
						}
						else if(whatsapp==2){
						if (confirm('Are you sure you want to send Whatsapp Notification?')) {
						var msg1='https://web.whatsapp.com/send?phone=91'+p_mobile+'&text=Dear '+p_name+','+'%0a'+'We are pleased to welcome you to the '+clinic+'%0a'+'%0a'+'Providing you the best physiotherapy treatment along with counseling to keep you functional and to relieve your symptoms is our top priority.'+'%0a'+'We look forward to a continued relationship with you.'+'%0a'+'You can stay connected with us and get health tips through, '+'%0a'+''+facebook+'%0a'+twitter+'%0a'+instagarm+'%0a'+'Thank you'+smiley;
						//alert(msg1);
						window.open(msg1, '_blank');
						} else {
						}
						}			
						else{
							
						}
						 
					}
					setTimeout(function(){ 
						window.location="<?php echo base_url().'client/patient/patient_view' ?>";
					}, 1000);
					} else {
						$('#toast-container').show();
						setTimeout(function(){ 
							window.location="<?php echo base_url().'client/patient/patient_view' ?>";
						}, 1000);
					}  
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
	
	$('.mobile').hide();
		$('#mobile_no').on('keyup',function() {
			var mobile = $('.mobile_no').val();
			$('.mobile').hide();
			if(mobile == '') { 
				$('.mobile').hide();
			  } else {
				$.ajax({
						url : '<?php echo base_url().'client/patient/mobile_check/' ?>'+mobile,
						type: "POST",
						dataType: 'json', 
						success:function(data, textStatus, jqXHR,form) 
						{
							if(data.status == 'success'){
								$('.mobile').hide();
							} else {  
								var val = ' and Patient Name is' + ' <a href="<?php echo base_url().'client/patient/view/' ?>' +  data.message.patient_id + '">'+'<font color="black" >'+ data.message.name+'</font></a>';
								$('.mobile').append(val);
								$('.mobile').show();
								$('.mobile_no').val("");
							}
						},
						error: function(jqXHR, textStatus, errorThrown) 
						{
							
						}
				});
			} 
		});
		
		$('#save').click(function(){
			var url= '<?php echo base_url().'client/patient/add_concess_group' ?>';
			var g_name = $('#concess_group_name').val();
			var tax_perc = $('#tax_perc').val();
			var discount_perc = $('#discount_perc').val();
			var provD = g_name + '/' + tax_perc + '/' + discount_perc; 
			if (g_name != ""){
				var provDiag = "provDiag=" + provD;
				$.ajax({
					type: "POST",
					dataType: 'json',
					data : provDiag,
					url: url,
					success: function(data) {
						if(data.status == 'failure'){
							
						} else if(data.status == 'success') {
							$(".add_cg").hide();
							  var newOption = $('<option value = ' + g_name + ' selected>' + g_name + '</option>');
							  $('#concession').append(newOption);
							  $('#concession').trigger("chosen:updated");
						}
					}, 
					complete: function(){
							
					},
					error: function(e){ // alert error if ajax fails
						alert(e.responseText);
					} 
				 }); //end AJAX
				 }
				 else{
					alert('Please Enter the concession group name & Discount.', 'Provisional diagnosis error');
				 }	
		});
		
		$('.referal_type_id').change(function() {
			var url= '<?php echo base_url().'client/referal/referal_details' ?>';
			var id = $('#referal_type_id').val();
			if (id != ""){
				$.ajax({
					type: "POST",
					dataType: 'json',
					data : {ref_id:id},
					url: url,
					success: function(data) {
						if(data.status == 'failure'){
							
						} else if(data.status == 'success') {
							
							if(id == '1' || id == '6'){
							 $('#referal_id').empty();
							 for(var i = 0;i < data.referalData.length; i++){
							  var newOption = $('<option value = ' + data.referalData[i].referal_id + '>' + data.referalData[i].referal_name + '</option>');
							  $('#referal_id').append(newOption);
							  $('#referal_id').trigger("chosen:updated");
							} 
						  }
						  if(id == '2'){
							 $('#referal_id').empty();
							 for(var i = 0;i < data.referalData.length; i++){
							  var newOption = $('<option value = ' + data.referalData[i].referal_id + '>' + data.referalData[i].website_name + '</option>');
							  $('#referal_id').append(newOption);
							  $('#referal_id').trigger("chosen:updated");
							} 
						  }
						  if(id == '3'){
							 $('#referal_id').empty();
							 for(var i = 0;i < data.referalData.length; i++){
							  var newOption = $('<option value = ' + data.referalData[i].referal_id + '>' + data.referalData[i].adv_name + '</option>');
							  $('#referal_id').append(newOption);
							  $('#referal_id').trigger("chosen:updated");
							} 
						  }
						  if(id == '4'){
							 $('#referal_id').empty();
							 for(var i = 0;i < data.referalData.length; i++){
							  var newOption = $('<option value = ' + data.referalData[i].referal_id + '>' + data.referalData[i].referal_oth_name + '</option>');
							  $('#referal_id').append(newOption);
							  $('#referal_id').trigger("chosen:updated");
							} 
						  }
						   if(id == '5'){
							 $('#referal_id').empty();
							 for(var i = 0;i < data.referalData.length; i++){
							  var newOption = $('<option value = ' + data.referalData[i].patient_id + '>' + data.referalData[i].first_name + ' '+ data.referalData[i].last_name + '</option>');
							  $('#referal_id').append(newOption);
							  $('#referal_id').trigger("chosen:updated");
							} 
						  }
						}
					}, 
					complete: function(){
							
					},
					error: function(e){ // alert error if ajax fails
						alert(e.responseText);
					} 
				 }); //end AJAX
				 }
				 else{
					
				 }
		});
		
		$('.add_Insurance').hide();
		$('.add_Adv').hide();
		$('.add_Doctor').hide();
		$('.add_Website').hide();
		$('.add_Other').hide();
		$('.add_Patient').hide();
		
		
		$('.add_ref').click(function() {
			var id = $('#referal_type_id').val();
			if(id == '6'){
				$('.add_Insurance').show();
			} else if(id == '1') {
				$('.add_Doctor').show();
			} else if(id == '2'){
				$('.add_Website').show();				
			}  else if(id == '3'){
				$('.add_Adv').show();				
			}  else if(id == '4'){
				$('.add_Other').show();				
			} else if(id == '5') {
				$('.add_Patient').show();				
			} else {
				alert('Please select Referal Source');
			}
		});
		
		$('#cancel_web').click(function() { 
			$(".add_Website").hide();
		});
		
		$('.save_web').click(function(){
			var url= '<?php echo base_url().'client/patient/add_ref_Web' ?>';
			var web_name = $('#website_name').val();
			var provD = web_name; 
			if (web_name != ""){
				var provDiag = "provDiag=" + provD;
				$.ajax({
					type: "POST",
					dataType: 'json',
					data : provDiag,
					url: url,
					success: function(data) {
						if(data.status == 'failure'){
							
						} else if(data.status == 'success') {
							$(".add_Website").hide();
							  var newOption = $('<option value = ' + data.WebData.referal_id + ' selected>' + web_name + '</option>');
							  $('#referal_id').append(newOption);
							  $('#referal_id').trigger("chosen:updated");
						}
					}, 
					complete: function(){
							
					},
					error: function(e){ // alert error if ajax fails
						alert(e.responseText);
					} 
				 }); //end AJAX
				 }
				 else{
					alert('Please enter the website name.', 'Provisional diagnosis error');
				 }	
		});
		
		$('.save_other').click(function(){
			var url= '<?php echo base_url().'client/patient/add_ref_Other' ?>';
			var other_name = $('#other_name').val();
			var provD = other_name; 
			if (provD != ""){
				var provDiag = "provDiag=" + provD;
				$.ajax({
					type: "POST",
					dataType: 'json',
					data : provDiag,
					url: url,
					success: function(data) {
						if(data.status == 'failure'){
							
						} else if(data.status == 'success') {
							$(".add_Other").hide();
							  var newOption = $('<option value = ' + data.OtherData.referal_id + ' selected>' + other_name + '</option>');
							  $('#referal_id').append(newOption);
							  $('#referal_id').trigger("chosen:updated");
						}
					}, 
					complete: function(){
							
					},
					error: function(e){ // alert error if ajax fails
						alert(e.responseText);
					} 
				 }); //end AJAX
				 }
				 else{
					alert('Please enter the Other\'s name.', 'Provisional diagnosis error');
				 }	
		});
		
		$('#cancel_other').click(function(){
			$(".add_Other").hide();
		});
		
		$('.save_pat').click(function(){
			var url= '<?php echo base_url().'client/patient/add_ref_Pat' ?>';
			var pat_name = $('#patient_name').val();
			var provD = pat_name;
			if (provD != ""){
				var provDiag = "provDiag=" + provD;
				$.ajax({
					type: "POST",
					dataType: 'json',
					data : provDiag,
					url: url,
					success: function(data) {
						if(data.status == 'failure'){
							
						} else if(data.status == 'success') {
							$(".add_Patient").hide();
							  var newOption = $('<option value = ' + data.PatientData.referal_id + ' selected>' + pat_name + '</option>');
							  $('#referal_id').append(newOption);
							  $('#referal_id').trigger("chosen:updated");
						}
					}, 
					complete: function(){
							
					},
					error: function(e){ // alert error if ajax fails
						alert(e.responseText);
					} 
				 }); //end AJAX
				 }
				 else{
					alert('Please enter the patient name.', 'Provisional diagnosis error');
				 }	
		});
		
		$('#cancel_pat').click(function() {
			$(".add_Patient").hide();
		});
		
		
		$('.save_ins').click(function(){
			var url= '<?php echo base_url().'client/patient/add_ref_Insurance' ?>';
			var referal_name = $('#referal_name').val();
			var email = $('#ins_email').val();
			var mobile = $('#mobile').val();
			var provD = referal_name + '/' + email + '/' + mobile; 
			if (referal_name != ""){
				var provDiag = "provDiag=" + provD;
				$.ajax({
					type: "POST",
					dataType: 'json',
					data : provDiag,
					url: url,
					success: function(data) {
						if(data.status == 'failure'){
							
						} else if(data.status == 'success') {
							$(".add_Insurance").hide();
							
							  var newOption = $('<option value = ' + data.InsuranceData.referal_id + ' selected>' + referal_name + '</option>');
							  $('#referal_id').append(newOption);
							  $('#referal_id').trigger("chosen:updated");
						}
					}, 
					complete: function(){
							
					},
					error: function(e){ // alert error if ajax fails
						alert(e.responseText);
					} 
				 }); //end AJAX
				 }
				 else{
					alert('Please enter the referral details.', 'Provisional diagnosis error');
				 }	
		});  
		$('#cancel_ins').click(function() {
			$(".add_Insurance").hide();
		});
		
		
		$('.save_adv').click(function(){
			var url= '<?php echo base_url().'client/patient/add_ref_Adv' ?>';
			var adv_name = $('#adv_name').val();
			var adv_loc = $('#adv_loc').val();
			var provD = adv_name +'/'+adv_loc; 
			if (adv_name != ""){
				var provDiag = "provDiag=" + provD;
				$.ajax({
					type: "POST",
					dataType: 'json',
					data : provDiag,
					url: url,
					success: function(data) {
						if(data.status == 'failure'){
							
						} else if(data.status == 'success') {
							$(".add_Adv").hide();
							  var newOption = $('<option value = ' + data.AdvData.referal_id + ' selected>' + adv_name + '</option>');
							  $('#referal_id').append(newOption);
							  $('#referal_id').trigger("chosen:updated");
						}
					}, 
					complete: function(){
							
					},
					error: function(e){ // alert error if ajax fails
						alert(e.responseText);
					} 
				 }); //end AJAX
				 }
				 else{
					alert('Please enter the Advertisement Details.', 'Provisional diagnosis error');
				 }	
		});
		
		$('#cancel_adv').click(function() { 
			$(".add_Adv").hide();
	 });
	 
	 
	 $('.save_doc').click(function(){
			var url= '<?php echo base_url().'client/patient/add_ref_Doctor' ?>';
			var referal_name = $('#doc_referal_name').val();
			var email = $('#doc_email').val();
			var special = $('#doc_special').val();
			var mobile = $('#doc_mobile').val();
			var provD = referal_name + '/' + email + '/' + mobile +'/'+ special; 
			if (referal_name != ""){
				var provDiag = "provDiag=" + provD;
				$.ajax({
					type: "POST",
					dataType: 'json',
					data : provDiag,
					url: url,
					success: function(data) {
						if(data.status == 'failure'){
							
						} else if(data.status == 'success') {
							$(".add_Doctor").hide();
							  var newOption = $('<option value = ' + data.DoctorData.referal_id + ' selected>' + referal_name + '</option>');
							  $('#referal_id').append(newOption);
							  $('#referal_id').trigger("chosen:updated");
						}
					}, 
					complete: function(){
							
					},
					error: function(e){ // alert error if ajax fails
						alert(e.responseText);
					} 
				 }); //end AJAX
				 }
				 else{
					alert('Please enter the Doctor Details.', 'Provisional diagnosis error');
				 }	
		});
		
		$('#cancel_doc').click(function() {
			$(".add_Doctor").hide();
		});
		
		
		$('.add_special').hide();
		$('.special').click(function() {
			$('.add_special').show();
		});
		$('#cancel_special').click(function() {
			$('.add_special').hide();
		});
		$(".save_special").click(function(e){
		var url= '<?php echo base_url().'client/referal/add_specialist' ?>';
			var special = $('#specialist').val();
			if (special != ""){
				$.ajax({
					type: "POST",
					dataType: 'json',
					data : {s_name:special},
					url: url,
					success: function(data) {
						if(data.status == 'failure'){
							
						} else if(data.status == 'success') {
							$(".add_special").hide();
							  var newOption = $('<option value = ' + data.specialData.specialist_id + ' selected>' + data.specialData.specialist_name + '</option>');
							  $('#doc_special').append(newOption);
							  $('#doc_special').trigger("chosen:updated");
						}
					}, 
					complete: function(){
							
					},
					error: function(e){ // alert error if ajax fails
						alert(e.responseText);
					} 
				 }); //end AJAX
				 }
				 else {
					alert('Please enter the Specialist name.', 'Provisional diagnosis error');
				 }	
		});
		
		$(document).ready(function(){
	 $(".consan_mrge").hide();
	 $("input[type='radio']").change(function(){
            var radioValue = $("input[name='marital_status']:checked").val();
            if(radioValue == 'Married'){
               $(".consan_mrge").show();
            }
			else
			{
				$(".consan_mrge").hide();
			}
        });
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
