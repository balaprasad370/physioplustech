<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Physio Plus Tech</title>
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
<link href="<?php echo base_url(); ?>nist_css/rateit.css" rel="stylesheet" type="text/css">
<style>
.forms-wizard li{
	font-size:0.7rem;
} 
.parsley-error-list{
	color:red;
	list-style-type:none;
}
.rating, label, th, .td{
	font-weight:bold;
	color:#3f6ad8;
}
.forms-wizard li .nav-link{
color: #000000;
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
                                        <ul class="forms-wizard" style="width: 20em;min-width: 20em;">
                                            <li>
                                                <a href="#step-1">
                                                    <em>1</em><span>Patient identification error</span>
                                                </a>
                                            </li>
                                            <li class="nav-item done">
                                                <a href="#step-2">
                                                    <em>2</em><span>Mode error</span>
                                                </a>
                                            </li>
											<li class="nav-item done">
                                                <a href="#step-3">
                                                    <em>3</em><span>Data accuracy error</span>
                                                </a>
                                            </li>
											<li class="nav-item done">
                                                <a href="#step-4">
                                                    <em>4</em><span>Data availability error</span>
                                                </a>
                                            </li>
											<li class="nav-item done">
                                                <a href="#step-5">
                                                    <em>5</em><span>Interpretation error</span>
                                                </a>
                                            </li>
											<li class="nav-item done">
                                                <a href="#step-6">
                                                    <em>6</em><span>Recall error</span>
                                                </a>
                                            </li>
											<li class="nav-item done">
                                                <a href="#step-7">
                                                    <em>7</em><span>Feedback error</span>
                                                </a>
                                            </li>
											<li class="nav-item done">
                                                <a href="#step-8">
                                                    <em>8</em><span>Data integrity error</span>
                                                </a>
                                            </li>
											<li class="nav-item done">
                                                <a href="#step-9">
                                                    <em>9</em><span>Visibility of System status</span>
                                                </a>
                                            </li>
											<li class="nav-item done">
                                                <a href="#step-10">
                                                    <em>10</em><span>Match between System & the Real World</span>
                                                </a>
                                            </li>
											<li class="nav-item done">
                                                <a href="#step-11">
                                                    <em>11</em><span>User Control & Freedom</span>
                                                </a>
                                            </li>
											<li class="nav-item done">
                                                <a href="#step-12">
                                                    <em>12</em><span>Consistency & Standards</span>
                                                </a>
                                            </li>
											<li class="nav-item done">
                                                <a href="#step-13">
                                                    <em>13</em><span>Help Users Recognize</span>
                                                </a>
                                            </li>
											<li class="nav-item done">
                                                <a href="#step-14">
                                                    <em>14</em><span>Error Prevention</span>
                                                </a>
                                            </li>
											<li class="nav-item done">
                                                <a href="#step-15">
                                                    <em>15</em><span>Recognition Rather Than Recall</span>
                                                </a>
                                            </li>
											<li class="nav-item done">
                                                <a href="#step-16">
                                                    <em>16</em><span>Flexibility & Minimalist Design</span>
                                                </a>
                                            </li>
											<li class="nav-item done">
                                                <a href="#step-17">
                                                    <em>17</em><span>Aesthetic & Minimalist Design</span>
                                                </a>
                                            </li>
											<li class="nav-item done">
                                                <a href="#step-18">
                                                    <em>18</em><span>Help & Documentation</span>
                                                </a>
                                            </li>
                                            <li class="nav-item done">
                                                <a href="#step-19">
                                                    <em>19</em><span>Pleasurable & Respectful Interaction with the User</span>
                                                </a>
                                            </li>
                                             <li class="nav-item done">
                                                <a href="#step-20">
                                                    <em>20</em><span>Privacy</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="form-wizard-content" style="width:80%;">
										   <div id="step-1">
										   <form class="" action="<?php echo base_url().'nist/dashboard/patient_comment' ?>" method="post"  role="form" parsley-validate>
                                    
                                                <div class="card-body">
                                                  <div class="card-title">1A.Patient identification error</div>  
												  <p>Actions are performed for one patient or documented in one patient’s record that were intended for another patient.</p>
                                          <div class="table-responsive">
										  <table class="table table-striped table-bordered" id="InvoiceTable" style="text-align:center;">
                                             <thead>
														  <tr>
															<th>#</th>
															<th>Review Checklist</th>
															<th>Severity Rating</th>
															<th>Comments</th>
														  </tr>
														</thead>
                                            <tbody id="itemsBody">
                                            <tr>
                                  <td class="td">1A.1</td>
                                  <td>Does every display have a title or header with two patient identifiers?</td>
                                  <td style="width:20%">
							   <div class="feed1"> <select id="fb1" name='srate1' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb1"></div>
							<span id="fb1text" class="rating"></span></td>
							<td style="width:20%"><input name="a1_comment" id="a1_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
					 </tr>
                          
                          <tr>
                                  <td class="td">1A.2</td>
                                  <td>When a second patient’s record is open on the same workstation from the same user login at the same time, is an alert to the increased risk of wrong patient errors (with the ability to override an automatic close to the first record) provided to the user?</td>
                                  <td>
							   <div class="feed1"> <select id="fb2" name='srate2' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb2"></div>
							<span id="fb2text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="a2_comment" id="a2_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
                              
							 
							<tr><td class="td">1A.3</td>
                                  <td>When a second user opens a patient chart, are protections in place to protect data integrity for simultaneous data entry? If a lockout feature is employed (so only one user can change data at one time), can users view which user is locking out other users at that time?</td>
                                  <td>
							   <div class="feed1"> <select id="fb3" name='srate3' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb3"></div>
							<span id="fb3text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="a3_comment" id="a3_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							 
							 
							<tr><td class="td">1A.4</td>
                                  <td>When an integrated application (e.g., imaging) is opened from within the EHR, does the display have a title or header with an accurate unique patient identifier (i.e., displaying the previous patient’s identifier information is avoided when there is a broken link or inability to access the correct information)?</td>
                                  <td>
							   <div class="feed1"> <select id="fb4" name='srate4' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb4"></div>
							<span id="fb4text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="a4_comment" id="a4_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							 
							<tr><td class="td">1A.5</td>
                                  <td>When an integrated application (e.g., imaging) opened from within the EHR remains open, and a new patient record is opened, does the patient identifier and associated data update accurately?</td>
                                  <td>
							   <div class="feed1"> <select id="fb5" name='srate5' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb5"></div>
							<span id="fb5text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="a5_comment" id="a5_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">1A.6</td>
                                  <td>If an action will cause data to be destructively overwritten with another patient’s data, is the user alerted?</td>
                                  <td>
							   <div class="feed1"> <select id="fb6" name='srate6' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb6"></div>
							<span id="fb6text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="a6_comment" id="a6_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							
							<tr><td class="td">1A.7</td>
                                  <td>If there are other patient records with highly similar identities (e.g., Jr., multiple birth patient, same first and last name) that increase the risk of wrong patient errors or having two files for the same patient (e.g., due to data entry errors at registration, name changes, variations in names such as Jr.) where critical information is not included in both files, are the similar patients highlighted for the user just prior to final

selection of the record?</td>
                                  <td>
							   <div class="feed1"> <select id="fb7" name='srate7' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb7"></div>
							<span id="fb7text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="a7_comment" id="a7_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							
							<tr><td class="td">1A.8</td>
                                  <td>If multiple records for a patient are being merged, are users provided clear information about what the impacts of the pending merge will be to the merged patient data (e.g., permanently overwritten data for one patient)? Is there a way to “undo” the potentially destructive operation immediately following? Is there a way to trace back what a record was previously labeled as following a merge?</td>
                                  <td>
							   <div class="feed1"> <select id="fb8" name='srate8' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb8"></div>
							<span id="fb8text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="a8_comment" id="a8_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							<tr><td class="td">1A.9</td>
                                  <td>If information is copied from the record of one patient and pasted into another, is feedback provided to anyone viewing the record what specific information was pasted from the record of a different patient (e.g., by having a subtle background color around copied text) in order to aid detection of erroneous data entry?</td>
                                  <td>
							   <div class="feed1"> <select id="fb9" name='srate9' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb9"></div>
							<span id="fb9text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="a9_comment" id="a9_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							 
							 
                                            
                                            </tbody>
                                        </table>
										  </div>
													 <div class="clearfix"></br>
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
													<form class="" action="<?php echo base_url().'nist/dashboard/mode_comment' ?>" method="post"  role="form" parsley-validate>
                                    
                                               
                                                  <div class="card-title">1B. Mode error</div>  
												  <p>Actions are performed in one mode that were intended for another mode.</p>
                                          <div class="table-responsive">
										  <table class="table table-striped table-bordered" id="InvoiceTable" style="text-align:center;">
                                             <thead>
														  <tr>
															<th>#</th>
															<th>Review Checklist</th>
															<th>Severity Rating</th>
															<th>Comments</th>
														  </tr>
														</thead>
                                            <tbody id="itemsBody">
                                            <tr>
                                  <td class="td">1B.1</td>
                                  <td>When an unusual mode choice is selected, is the user alerted?</td>
                                  <td style="width:20%">
							   <div class="feed1"> <select id="fb10" name='srate10' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb10"></div>
							<span id="fb10text" class="rating"></span></td>
							<td style="width:20%"><input name="b1_comment" id="b1_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
					 </tr>
                          
                          <tr>
                                  <td class="td">1B.2</td>
                                  <td>When a medication dose mode is selected, is clear feedback given about the units associated with the mode (e.g., mcg/kg/min or mcg/min)?</td>
                                  <td>
							   <div class="feed1"> <select id="fb11" name='srate11' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb11"></div>
							<span id="fb11text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="b2_comment" id="b2_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
                              
							 
							<tr><td class="td">1B.3</td>
                                  <td>When an unusually high or low dose is selected, is the user provided with a warning and a usual range?</td>
                                  <td>
							   <div class="feed1"> <select id="fb12" name='srate12' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb12"></div>
							<span id="fb12text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="b3_comment" id="b3_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							 
							 
							<tr><td class="td">1B.4</td>
                                  <td>Are dose range warnings appropriate for patient populations (e.g., pediatric patients with low weights)?</td>
                                  <td>
							   <div class="feed1"> <select id="fb13" name='srate13' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb13"></div>
							<span id="fb13text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="b4_comment" id="b4_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							 
							<tr><td class="td">1B.5</td>
                                  <td>Is the display designed to reduce the risk of selecting the wrong mode based on parallax issues (e.g., sufficient spacing, offsetting row coloring, clear grouping of what is on the same row)?</td>
                                  <td>
							   <div class="feed1"> <select id="fb14" name='srate14' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb14"></div>
							<span id="fb14text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="b5_comment" id="b5_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">1B.6</td>
                                  <td>Is the same default mode used consistently throughout the interface (e.g., direct dose vs. weight dose, same units, same measurement system)?</td>
                                  <td>
							   <div class="feed1"> <select id="fb15" name='srate15' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb15"></div>
							<span id="fb15text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="b6_comment" id="b6_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							
							<tr><td class="td">1B.7</td>
                                  <td>Are test actions separated from production actions (e.g., test accounts used rather than test modes on patient records for patients currently being treated for testing new functionality)?</td>
                                  <td>
							   <div class="feed1"> <select id="fb16" name='srate16' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb16"></div>
							<span id="fb16text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="b7_comment" id="b7_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							
							<tr><td class="td">1B.8</td>
                                  <td>Are special modes (e.g., view only, demonstration, training) clearly displayed?</td>
                                  <td>
							   <div class="feed1"> <select id="fb17" name='srate17' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb17"></div>
							<span id="fb17text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="b8_comment" id="b8_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							 
                                            </tbody>
                                        </table>
										  </div>
													 <div class="clearfix"></br>
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
											<div id="step-3">
                                                <div id="accordion" class="accordion-wrapper mb-3">
                                                    <div class="card">
                                                      <div class="card-body">
													 <form class="" action="<?php echo base_url().'nist/dashboard/accuracy_comment' ?>" method="post"  role="form" parsley-validate>
                                    
                                               
                                                  <div class="card-title">1C. Data accuracy error</div>   
												  <p>Displayed data are not accurate.</p>
                                          <div class="table-responsive">
										  <table class="table table-striped table-bordered" id="InvoiceTable" style="text-align:center;">
                                             <thead>
														  <tr>
															<th>#</th>
															<th>Review Checklist</th>
															<th>Severity Rating</th>
															<th>Comments</th>
														  </tr>
														</thead>
                                            <tbody id="itemsBody">
                                            <tr>
                                  <td class="td">1C.1</td>
                                  <td>Is information not truncated on the display (e.g., medication names and doses in pick list menu displays are accurate and complete and distinguishable from other items in the pick list)?</td>
                                  <td style="width:20%">
							   <div class="feed1"> <select id="fb18" name='srate18' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb18"></div>
							<span id="fb18text" class="rating"></span></td>
							<td style="width:20%"><input name="c1_comment" id="c1_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
					 </tr>
                          
                          <tr>
                                  <td class="td">1C.2</td>
                                  <td>Does accurate information automatically display (e.g., without requiring an active refresh command by the user)?</td>
                                  <td>
							   <div class="feed1"> <select id="fb19" name='srate19' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb19"></div>
							<span id="fb19text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="c2_comment" id="c2_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
                              
							 
							<tr><td class="td">1C.3</td>
                                  <td>Can inaccurate information be easily changed (e.g., allergies)?</td>
                                  <td>
							   <div class="feed1"> <select id="fb20" name='srate20' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb20"></div>
							<span id="fb20text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="c3_comment" id="c3_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							 
							 
							<tr><td class="td">1C.4</td>
                                  <td>When a medication is renewed and then the dose is changed before signing, is the correct information displayed?</td>
                                  <td>
							   <div class="feed1"> <select id="fb21" name='srate21' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb21"></div>
							<span id="fb21text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="c4_comment" id="c4_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							 
							<tr><td class="td">1C.5</td>
                                  <td>Do changes in status (e.g., STAT to NOW) display accurately?</td>
                                  <td>
							   <div class="feed1"> <select id="fb22" name='srate22' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb22"></div>
							<span id="fb22text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="c5_comment" id="c5_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">1C.6</td>
                                  <td>If a medication schedule is changed, does the quantity correctly update?</td>
                                  <td>
							   <div class="feed1"> <select id="fb23" name='srate23' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb23"></div>
							<span id="fb23text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="c6_comment" id="c6_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							
							<tr><td class="td">1C.7</td>
                                  <td>If a medication order is discontinued, is the information updated on all displays about the change?</td>
                                  <td>
							   <div class="feed1"> <select id="fb24" name='srate24' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb24"></div>
							<span id="fb24text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="c7_comment" id="c7_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							
							<tr><td class="td">1C.8</td>
                                  <td>Is truncation of numbers such that the numeric value entered is different than the one saved avoided (e.g., user types in 10000 and 100 is saved in the field since it is limited to 3 characters)?</td>
                                  <td>
							   <div class="feed1"> <select id="fb25" name='srate25' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb25"></div>
							<span id="fb25text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="c8_comment" id="c8_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">1C.9</td>
                                  <td>If the precision of an entered value is adjusted by the system, is this adjustment appropriate, and if so, is it shown to the user before the information is saved? Are precision modifications for special populations (e.g., morphine units for pediatric patients) taken into account?</td>
                                  <td>
							   <div class="feed1"> <select id="fb26" name='srate26' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb26"></div>
							<span id="fb26text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="c9_comment" id="c9_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">1C.10</td>
                                  <td>Is automatic removal of outdated orders without alerting the user and allowing an override avoided?</td>
                                  <td>
							   <div class="feed1"> <select id="fb27" name='srate27' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb27"></div>
							<span id="fb27text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="c10_comment" id="c10_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">1C.11</td>
                                  <td>Are dates checked to ensure that they are reasonable values for the situation, and if not, is the user alerted (e.g., entering the patient’s birthdate for the current date would be reasonable for labor and delivery, but not for most clinical settings)?</td>
                                  <td>
							   <div class="feed1"> <select id="fb28" name='srate28' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb28"></div>
							<span id="fb28text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="c11_comment" id="c11_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							 
                                            </tbody>
                                        </table>
										  </div>
													 <div class="clearfix"></br>
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
													   	<form class="" action="<?php echo base_url().'nist/dashboard/availability_comment' ?>" method="post"  role="form" parsley-validate>
                                    
                                               
                                                  <div class="card-title">1D. Data availability error</div>  
												  <p>Decisions are based on incomplete information because related information requires additional navigation, access to another provider’s note, taking actions to update the status, or is not updated within a reasonable time.</p>
                                          <div class="table-responsive">
										  <table class="table table-striped table-bordered" id="InvoiceTable" style="text-align:center;">
                                             <thead>
														  <tr>
															<th>#</th>
															<th>Review Checklist</th>
															<th>Severity Rating</th>
															<th>Comments</th>
														  </tr>
														</thead>
                                            <tbody id="itemsBody">
                                            <tr>
                                  <td class="td">1D.1</td>
                                  <td>Is all the information needed to understand regular doses, complex doses, and non-standard doses easily accessible and is it easy for the user to see without additional navigation (e.g., additional clicks) any additional information? (e.g., do not use comment fields that have to be clicked on individually to read information about what the dosage should be on that day, such as ”Taper Dose 80 mg day 1 and 2, 60 mg day 3 and 4, 40 mg day 5 and 6, 20 mg day 7 and 8”)</td>
                                  <td style="width:20%">
							   <div class="feed1"> <select id="d1" name='d1_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#d1"></div>
							<span id="d1text" class="rating"></span></td>
							<td style="width:20%"><input name="d1_comment" id="d1_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
					 </tr>
                          
                          <tr>
                                  <td class="td">1D.2</td>
                                  <td>Are complex doses displayed in ways that users can easily understand what is intended on a particular day without additional navigation beyond what is required for regular dose schedules?</td>
                                  <td>
							   <div class="feed1"> <select id="d2" name='d2_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#d2"></div>
							<span id="d2text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="d2_comment" id="d2_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
                              
							 
							<tr><td class="td">1D.3</td>
                                  <td>Are the contents of unsigned notes clearly identified as being notes in progress, and accessible to designated users (e.g., avoid hiding unsigned notes from all but the user who initiated them)?</td>
                                  <td>
							   <div class="feed1"> <select id="d3" name='d3_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#d3"></div>
							<span id="d3text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="d3_comment" id="d3_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							 
							 
							<tr><td class="td">1D.4</td>
                                  <td>Is information accurately updated in one place efficiently and accurately updated in other areas or in integrated software systems (e.g., avoid having a discharge summary display an outdated medication dose)?</td>
                                  <td>
							   <div class="feed1"> <select id="d4" name='d4_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#d4"></div>
							<span id="d4text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="d4_comment" id="d4_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							 
							 
							 
                                            </tbody>
                                        </table>
										  </div>
													 <div class="clearfix"></br>
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
											 
											<div id="step-5">
                                                <div id="accordion" class="accordion-wrapper mb-3">
                                                    <div class="card">
													 <div class="card-body">
													<form class="" action="<?php echo base_url().'nist/dashboard/inter_comment' ?>" method="post"  role="form" parsley-validate>
                                    
                                               
                                                  <div class="card-title">1E. Interpretation error</div>  
												  <p>Differences in measurement systems, conventions and terms contribute to erroneous assumptions about the meaning of information.</p>
                                          <div class="table-responsive">
										  <table class="table table-striped table-bordered" id="InvoiceTable" style="text-align:center;">
                                             <thead>
														  <tr>
															<th>#</th>
															<th>Review Checklist</th>
															<th>Severity Rating</th>
															<th>Comments</th>
														  </tr>
														</thead>
                                            <tbody id="itemsBody">
                                            <tr>
                                  <td class="td">1E.1</td>
                                  <td>Is the same measurement system used consistently?</td>
                                  <td style="width:20%">
							   <div class="feed1"> <select id="e1" name='e1_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#e1"></div>
							<span id="e1text" class="rating"></span></td>
							<td style="width:20%"><input name="e1_comment" id="e1_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
					 </tr>
                          
                          <tr>
                                  <td class="td">1E.2</td>
                                  <td>Are the same measurement units used consistently?</td>
                                  <td>
							   <div class="feed1"> <select id="e2" name='e2_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#e2"></div>
							<span id="e2text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="e2_comment" id="e2_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
                              
							 
							<tr><td class="td">1E.3</td>
                                  <td>Are accepted domain conventions used consistently (e.g., axes of a pediatric growth chart)?</td>
                                  <td>
							   <div class="feed1"> <select id="e3" name='e3_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#e3"></div>
							<span id="e3text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="e3_comment" id="e3_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							 
							 
							<tr><td class="td">1E.4</td>
                                  <td>Does the system provide support for generic or brand names of medications to be used and displayed consistently?</td>
                                  <td>
							   <div class="feed1"> <select id="e4" name='e4_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#e4"></div>
							<span id="e4text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="e4_comment" id="e4_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							
							
							<tr><td class="td">1E.5</td>
                                  <td>Does the system provide support for organizations to use standardized terminology which is organized consistently (e.g., a clinical reminder building template with a consistent structure like What/When/Who is provided for organizations to optionally employ)?</td>
                                  <td>
							   <div class="feed1"> <select id="e5" name='e5_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#e5"></div>
							<span id="e5text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="e5_comment" id="e5_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">1E.6</td>
                                  <td>Are negative structures avoided (e.g., “Do you not want to quit?”)?</td>
                                  <td>
							   <div class="feed1"> <select id="e6" name='e6_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#e6"></div>
							<span id="e6text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="e6_comment" id="e6_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							 <tr><td class="td">1E.7</td>
                                  <td>Are areas of the interface that are intended for use by only certain categories of users displayed only for those users and either not displayed or displayed as grayed out/unavailable for other users?</td>
                                  <td>
							   <div class="feed1"> <select id="e7" name='e7_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#e7"></div>
							<span id="e7text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="e7_comment" id="e7_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							 
							 
                                            </tbody>
                                        </table>
										  </div>
													 <div class="clearfix"></br>
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
											
											<div id="step-6">
                                                <div id="accordion" class="accordion-wrapper mb-3">
                                                    <div class="card">
													 <div class="card-body">
													<form class="" action="<?php echo base_url().'nist/dashboard/recall_comment' ?>" method="post"  role="form" parsley-validate>
                                    
                                               
                                                  <div class="card-title">1F. Recall error</div>  
												  <p>Decisions are based on incorrect assumptions because appropriate actions require users to remember information rather than recognize it.</p>
                                          <div class="table-responsive">
										  <table class="table table-striped table-bordered" id="InvoiceTable" style="text-align:center;">
                                             <thead>
														  <tr>
															<th>#</th>
															<th>Review Checklist</th>
															<th>Severity Rating</th>
															<th>Comments</th>
														  </tr>
														</thead>
                                            <tbody id="itemsBody">
                                            <tr>
                                  <td class="td">1F.1</td>
                                  <td>Does the interface enable recognition of information, rather than requiring users to remember information (e.g., one-time medication orders linked with a scheduled order should not require providers to remember the dose and type it in)?</td>
                                  <td style="width:20%">
							   <div class="feed1"> <select id="f1" name='f1_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#f1"></div>
							<span id="f1text" class="rating"></span></td>
							<td style="width:20%"><input name="f1_comment" id="f1_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
					 </tr>
                          
                          <tr>
                                  <td class="td">1F.2</td>
                                  <td>Are frequently used and/or evidence-based options clearly distinguished from other options?</td>
                                  <td>
							   <div class="feed1"> <select id="f2" name='f2_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#f2"></div>
							<span id="f2text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="f2_comment" id="f2_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
                              
							 
							<tr><td class="td">1F.3</td>
                                  <td>Is auto-fill avoided where there is more than one auto-fill option that closely matches in order to reduce the risk of picking the wrong medication?</td>
                                  <td>
							   <div class="feed1"> <select id="f3" name='f3_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#f3"></div>
							<span id="f3text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="f3_comment" id="f3_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							 
							 
							<tr><td class="td">1F.4</td>
                                  <td>Is identical information from another part of the system automatically filled in to avoid errors in redundant data entry?</td>
                                  <td>
							   <div class="feed1"> <select id="f4" name='f4_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#f4"></div>
							<span id="f4text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="f4_comment" id="f4_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							 
							
							
							<tr><td class="td">1F.5</td>
                                  <td>Are STAT medications easy to recognize from summary displays?</td>
                                  <td>
							   <div class="feed1"> <select id="f5" name='f5_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#f5"></div>
							<span id="f5text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="f5_comment" id="f5_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">1F.6</td>
                                  <td>When creating a new patient record, are predictable errors from workarounds that are based on manipulating existing records that could result in the destruction of patient data prohibited and/or users alerted to the risks?</td>
                                  <td>
							   <div class="feed1"> <select id="f6" name='f6_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#f6"></div>
							<span id="f6text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="f6_comment" id="f6_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							  
							 
                                            </tbody>
                                        </table>
										  </div>
													 <div class="clearfix"></br>
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
											
											
											<div id="step-7">
                                                <div id="accordion" class="accordion-wrapper mb-3">
                                                  <div class="card">
												   <div class="card-body">
													<form class="" action="<?php echo base_url().'nist/dashboard/feedback_comment' ?>" method="post"  role="form" parsley-validate>
                                    
                                               
                                                  <div class="card-title">1G. Feedback error</div>  
												  <p>Decisions are based on insufficient information because lack of system feedback about automated actions makes it difficult to identify when the actions are not appropriate for the context.</p>
                                          <div class="table-responsive">
										  <table class="table table-striped table-bordered" id="InvoiceTable" style="text-align:center;">
                                             <thead>
														  <tr>
															<th>#</th>
															<th>Review Checklist</th>
															<th>Severity Rating</th>
															<th>Comments</th>
														  </tr>
														</thead>
                                            <tbody id="itemsBody">
                                            <tr>
                                  <td class="td">1G.1</td>
                                  <td>Are user-entered fields (e.g., medication types, doses, and routes, test and procedure orders, diagnoses, dates, etc.) changed by the system and, if so, is normalization of field values appropriate, and does the user have the opportunity to see the changes before the information is saved (e.g., do not automatically change partial tablets to full tablets without alerting the user)?</td>
                                  <td style="width:20%">
							   <div class="feed1"> <select id="g1" name='g1_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#g1"></div>
							<span id="g1text" class="rating"></span></td>
							<td style="width:20%"><input name="g1_comment" id="g1_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
					 </tr>
                          
                          <tr>
                                  <td class="td">1G.2</td>
                                  <td>Are changes to displays easy to detect and track?</td>
                                  <td>
							   <div class="feed1"> <select id="g2" name='g2_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#g2"></div>
							<span id="g2text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="g2_comment" id="g2_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
                              
							 
							<tr><td class="td">1G.3</td>
                                  <td>Are automated merges of patient record data (e.g., automated algorithms that identify and merge multiple similar records based upon similar field entries) minimized? If used, are they done with sufficient feedback, active confirmation from the user, and the ability to track what actions were taken?</td>
                                  <td>
							   <div class="feed1"> <select id="g3" name='g3_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#g3"></div>
							<span id="g3text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="g3_comment" id="g3_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							  
							 
                                            </tbody>
                                        </table>
										  </div>
													 <div class="clearfix"></br>
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
                                             
											<div id="step-8">
                                                <div id="accordion" class="accordion-wrapper mb-3">
                                                    <div class="card">
                                                        <div class="card-body">
													<form class="" action="<?php echo base_url().'nist/dashboard/integrity_comment' ?>" method="post"  role="form" parsley-validate>
                                    
                                               
                                                  <div class="card-title">1H. Data integrity error</div>  
												  <p>Decisions are based on stored data that are corrupted or deleted.</p>
                                          <div class="table-responsive">
										  <table class="table table-striped table-bordered" id="InvoiceTable" style="text-align:center;">
                                             <thead>
														  <tr>
															<th>#</th>
															<th>Review Checklist</th>
															<th>Severity Rating</th>
															<th>Comments</th>
														  </tr>
														</thead>
                                            <tbody id="itemsBody">
                                            <tr>
                                  <td class="td">1H.1</td>
                                  <td>Do view-only software modes avoid changing stored data?</td>
                                  <td style="width:20%">
							   <div class="feed1"> <select id="h1" name='h1_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#h1"></div>
							<span id="h1text" class="rating"></span></td>
							<td style="width:20%"><input name="h1_comment" id="h1_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
					 </tr>
                          
                          <tr>
                                  <td class="td">1H.2</td>
                                  <td>Is it possible to know who is blocking access to a data element or record when multiple users are accessing the same record simultaneously?</td>
                                  <td>
							   <div class="feed1"> <select id="h2" name='h2_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#h2"></div>
							<span id="h2text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="h2_comment" id="h2_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
                              
							 
							<tr><td class="td">1H.3</td>
                                  <td>Are predictable scenarios where corrupted backup data would permanently destroy patients’ records, and possibly all data for the entire organization, protected against through design measures and alerts?</td>
                                  <td>
							   <div class="feed1"> <select id="h3" name='h3_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#h3"></div>
							<span id="h3text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="h3_comment" id="h3_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">1H.4</td>
                                  <td>Can activities performed during down times be easily entered into the record?</td>
                                  <td>
							   <div class="feed1"> <select id="h4" name='h4_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#h4"></div>
							<span id="h4text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="h4_comment" id="h4_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">1H.5</td>
                                  <td>Can critical information (e.g., important pathology reports, images, or information about ineffective HIV anti-retroviral medications) be proactively tagged to avoid deletion during purges (due to policies implemented to reduce storage overhead)?</td>
                                  <td>
							   <div class="feed1"> <select id="h5" name='h5_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#h5"></div>
							<span id="h5text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="h5_comment" id="h5_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">1H.6</td>
                                  <td>Can inappropriate clinical reminders and alerts be easily removed (e.g., clicking a “does not apply” option that is always last on the interface)?</td>
                                  <td>
							   <div class="feed1"> <select id="h6" name='h6_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#h6"></div>
							<span id="h6text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="h6_comment" id="h6_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">1H.7</td>
                                  <td>When a system goes down unexpectedly and is restarted, do modifications for special populations avoid getting defaulted to standard settings (e.g., are alert settings for standard doses for pediatric patients maintained after the system is restarted, rather than defaulted to alert settings for adult populations)?</td>
                                  <td>
							   <div class="feed1"> <select id="h7" name='h7_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#h7"></div>
							<span id="h7text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="h7_comment" id="h7_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							  
							 
                                            </tbody> 
                                        </table>
										  </div>
													 <div class="clearfix"></br>
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
											<div id="step-9">
											
											
											<div id="accordion" class="accordion-wrapper mb-3">
                                                    <div class="card">
                                                       <div class="card-body">
                                               <form class="" action="<?php echo base_url().'nist/dashboard/visible_comment' ?>" method="post"  role="form" parsley-validate>
                                    
                                               
                                                  <div class="card-title">2. Visibility of System Status</div>  
												  <p>The system should always keep the user informed about what is going on, through appropriate feedback within reasonable time.</p>
                                          <div class="table-responsive">
										  <table class="table table-striped table-bordered" id="InvoiceTable" style="text-align:center;">
                                             <thead>
														  <tr>
															<th>#</th>
															<th>Review Checklist</th>
															<th>Severity Rating</th>
															<th>Comments</th>
														  </tr>
														</thead>
                                            <tbody id="itemsBody">
                                            <tr>
                                  <td class="td">2.1</td>
                                  <td>Does every display begin with a title or header that describes screen contents?</td>
                                  <td style="width:20%">
							   <div class="feed1"> <select id="i1" name='i1_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#i1"></div>
							<span id="itext" class="rating"></span></td>
							<td style="width:20%"><input name="i1_comment" id="i1_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
					 </tr>
                          
                          <tr>
                                  <td class="td">2.2</td>
                                  <td>Is there a consistent icon design scheme and stylistic treatment across the system?</td>
                                  <td>
							   <div class="feed1"> <select id="i2" name='i2_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#i2"></div>
							<span id="i2text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="i2_comment" id="i2_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
                              
							 
							<tr><td class="td">2.3</td>
                                  <td>In multipage data entry screens, is each page labeled to show its relation to others?</td>
                                  <td>
							   <div class="feed1"> <select id="i3" name='i3_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#i3"></div>
							<span id="i3text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="i3_comment" id="i3_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">2.4</td>
                                  <td>If pop-up windows are used to display error messages, do they allow the user to see the field in error?</td>
                                  <td>
							   <div class="feed1"> <select id="i4" name='i4_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#i4"></div>
							<span id="i4text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="i4_comment" id="i4_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">2.5</td>
                                  <td>Is there some form of system feedback for every operator action?</td>
                                  <td>
							   <div class="feed1"> <select id="i5" name='i5_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#i5"></div>
							<span id="i5text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="i5_comment" id="i5_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">2.6</td>
                                  <td>After the user completes an action (or group of actions), does the feedback indicate that the next group of actions can be started?</td>
                                  <td>
							   <div class="feed1"> <select id="i6" name='i6_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#i6"></div>
							<span id="i6text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="i6_comment" id="i6_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">2.7</td>
                                  <td>Is there visual feedback in menus or dialog boxes about which choices are selectable?</td>
                                  <td>
							   <div class="feed1"> <select id="i7" name='i7_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#i7"></div>
							<span id="i7text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="i7_comment" id="i7_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							<tr><td class="td">2.8</td>
                                  <td>Is there visual feedback in menus or dialog boxes about which choice the cursor is on now?</td>
                                  <td>
							   <div class="feed1"> <select id="i8" name='i8_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#i8"></div>
							<span id="i8text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="i8_comment" id="i8_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							<tr><td class="td">2.9</td>
                                  <td>If multiple options can be selected in a menu or dialog box, is there visual feedback about which options are already selected?</td>
                                  <td>
							   <div class="feed1"> <select id="i9" name='i9_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#i9"></div>
							<span id="i9text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="i9_comment" id="i9_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">2.10</td>
                                  <td>Is there visual feedback when objects are selected or moved?</td>
                                  <td>
							   <div class="feed1"> <select id="i10" name='i10_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#i10"></div>
							<span id="i10text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="i10_comment" id="i10_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							<tr><td class="td">2.11</td>
                                  <td>Is the current status of an icon clearly indicated?</td>
                                  <td>
							   <div class="feed1"> <select id="i11" name='i11_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#i11"></div>
							<span id="i11text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="i11_comment" id="i11_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							<tr><td class="td">2.12</td>
                                  <td>Do Graphic User Interface (GUI) menus make obvious which item has been selected?</td>
                                  <td>
							   <div class="feed1"> <select id="i12" name='i12_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#i12"></div>
							<span id="i12text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="i12_comment" id="i12_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">2.13</td>
                                  <td>Do GUI menus make obvious whether deselection is possible?</td>
                                  <td>
							   <div class="feed1"> <select id="i13" name='i13_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#i13"></div>
							<span id="i13text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="i13_comment" id="i13_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">2.14</td>
                                  <td>If users must navigate between multiple screens, does the system use context labels, menu maps, and place markers as navigational aids?</td>
                                  <td>
							   <div class="feed1"> <select id="i14" name='i14_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#i14"></div>
							<span id="i14text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="i14_comment" id="i14_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							  
							 
                                            </tbody> 
                                        </table>
										  </div>
													 <div class="clearfix"></br>
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
											 
											<div id="step-10">
											
											
											<div id="accordion" class="accordion-wrapper mb-3">
                                                    <div class="card">
                                                       <div class="card-body">
                                               <form class="" action="<?php echo base_url().'nist/dashboard/form10' ?>" method="post"  role="form" parsley-validate>
                                    
                                               
                                                  <div class="card-title">3. Match between System and the Real World</div>  
												  <p>The system should follow the user’s language, with words, phrases and concepts familiar to the user, rather than system-oriented terms. Follow real-world conventions, making information appear in a natural and logical order.</p>
                                          <div class="table-responsive">
										  <table class="table table-striped table-bordered" id="InvoiceTable" style="text-align:center;">
                                             <thead>
														  <tr>
															<th>#</th>
															<th>Review Checklist</th>
															<th>Severity Rating</th>
															<th>Comments</th>
														  </tr>
														</thead>
                                            <tbody id="itemsBody">
                                            <tr>
                                  <td class="td">3.1</td>
                                  <td>Are menu choices ordered in the most logical way, given the user, the item names, and the task variables?</td>
                                  <td style="width:20%">
							   <div class="feed1"> <select id="j1" name='j1_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#j1"></div>
							<span id="j1text" class="rating"></span></td>
							<td style="width:20%"><input name="j1_comment" id="j1_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
					 </tr>
                          
                          <tr>
                                  <td class="td">3.2</td>
                                  <td>Do related items appear on the same display?</td>
                                  <td>
							   <div class="feed1"> <select id="j2" name='j2_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#j2"></div>
							<span id="j2text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="j2_comment" id="j2_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
                              
							 
							<tr><td class="td">3.3</td>
                                  <td>Do the selected colors correspond to common expectations about color codes?</td>
                                  <td>
							   <div class="feed1"> <select id="j3" name='j3_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#j3"></div>
							<span id="j3text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="j3_comment" id="j3_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">3.4</td>
                                  <td>When prompts imply a necessary action, are the words in the message consistent with that action?</td>
                                  <td>
							   <div class="feed1"> <select id="j4" name='j4_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#j4"></div>
							<span id="j4text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="j4_comment" id="j4_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">3.5</td>
                                  <td>Do keystroke references in prompts match actual key names?</td>
                                  <td>
							   <div class="feed1"> <select id="j5" name='j5_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#j5"></div>
							<span id="j5text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="j5_comment" id="j5_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">3.6</td>
                                  <td>On data entry screens, are tasks described in terminology familiar to users?</td>
                                  <td>
							   <div class="feed1"> <select id="j6" name='j6_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#j6"></div>
							<span id="j6text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="j6_comment" id="j6_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">3.7</td>
                                  <td>Are field-level prompts provided for data entry screens?</td>
                                  <td>
							   <div class="feed1"> <select id="j7" name='j7_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#j7"></div>
							<span id="j7text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="j7_comment" id="j7_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							<tr><td class="td">3.8</td>
                                  <td>For question and answer interfaces, are questions stated in clear, simple language?</td>
                                  <td>
							   <div class="feed1"> <select id="j8" name='j8_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#j8"></div>
							<span id="j8text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="j8_comment" id="j8_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							<tr><td class="td">3.9</td>
                                  <td>Does the system automatically enter leading or trailing spaces to align decimal points?</td>
                                  <td>
							   <div class="feed1"> <select id="j9" name='j9_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#j9"></div>
							<span id="j9text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="j9_comment" id="j9_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">3.10</td>
                                  <td>Does the system automatically enter commas in numeric values greater than 9999?</td>
                                  <td>
							   <div class="feed1"> <select id="j10" name='j10_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#j10"></div>
							<span id="j10text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="j10_comment" id="j10_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							<tr><td class="td">3.11</td>
                                  <td>Do GUI menus offer activation: that is, make obvious how to say “now do it"?</td>
                                  <td>
							   <div class="feed1"> <select id="j11" name='j11_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#j11"></div>
							<span id="j11text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="j11_comment" id="j11_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							 
                                            </tbody> 
                                        </table>
										  </div>
													 <div class="clearfix"></br>
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
											
											
											
											<div id="step-11">
											
											
											<div id="accordion" class="accordion-wrapper mb-3">
                                                    <div class="card">
                                                       <div class="card-body">
                                               <form class="" action="<?php echo base_url().'nist/dashboard/form11' ?>" method="post"  role="form" parsley-validate>
                                    
                                               
                                                  <div class="card-title">4. User Control and Freedom</div>  
												  <p>Users should be free to select and sequence tasks (when appropriate), rather than having the system do this for them. Users often choose system functions by mistake and will need a clearly marked “emergency exit” to leave the unwanted state without having to go through an extended dialogue. Users should make their own decisions (with clear information) regarding the costs of exiting current work. The system should support undo and redo.</p>
                                          <div class="table-responsive">
										  <table class="table table-striped table-bordered" id="InvoiceTable" style="text-align:center;">
                                             <thead>
														  <tr>
															<th>#</th>
															<th>Review Checklist</th>
															<th>Severity Rating</th>
															<th>Comments</th>
														  </tr>
														</thead>
                                            <tbody id="itemsBody">
                                            <tr>
                                  <td class="td">4.1</td>
                                  <td>In systems that use overlapping windows, is it easy for users to rearrange windows on the screen?</td>
                                  <td style="width:20%">
							   <div class="feed1"> <select id="k1" name='k1_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#k1"></div>
							<span id="k1text" class="rating"></span></td>
							<td style="width:20%"><input name="k1_comment" id="k1_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
					 </tr>
                          
                          <tr>
                                  <td class="td">4.2</td>
                                  <td>In systems that use overlapping windows, is it easy for users to switch between windows?</td>
                                  <td>
							   <div class="feed1"> <select id="k2" name='k2_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#k2"></div>
							<span id="k2text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="k2_comment" id="k2_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
                              
							 
							<tr><td class="td">4.3</td>
                                  <td>Are users prompted to confirm commands that have drastic, destructive consequences?</td>
                                  <td>
							   <div class="feed1"> <select id="k3" name='k3_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#k3"></div>
							<span id="k3text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="k3_comment" id="k3_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">4.4</td>
                                  <td>Is there an "undo" function at the level of a single action, a data entry, and a complete group of actions?</td>
                                  <td>
							   <div class="feed1"> <select id="k4" name='k4_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#k4"></div>
							<span id="k4text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="k4_comment" id="k4_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">4.5</td>
                                  <td>Can users cancel out of operations in progress?</td>
                                  <td>
							   <div class="feed1"> <select id="k5" name='k5_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#k5"></div>
							<span id="k5text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="k5_comment" id="k5_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">4.6</td>
                                  <td>If users can reduce data entry time by copying and pasting existing data, is there a way to track what was copied and what was modified in order to make it easier to detect erroneously copied information (e.g., light background color behind copied text)?</td>
                                  <td>
							   <div class="feed1"> <select id="k6" name='k6_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#k6"></div>
							<span id="k6text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="k6_comment" id="k6_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">4.7</td>
                                  <td>If menu lists are long (more than seven items), can users select an item either by moving the cursor or by typing a mnemonic code?</td>
                                  <td>
							   <div class="feed1"> <select id="k7" name='k7_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#k7"></div>
							<span id="k7text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="k7_comment" id="k7_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							<tr><td class="td">4.8</td>
                                  <td>If the system uses a pointing device, do users have the option of either clicking on menu items or using a keyboard shortcut?</td>
                                  <td>
							   <div class="feed1"> <select id="k8" name='k8_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#k8"></div>
							<span id="k8text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="k8_comment" id="k8_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							<tr><td class="td">4.9</td>
                                  <td>Are menus broad (many items on a menu) rather than deep (many menu levels)?</td>
                                  <td>
							   <div class="feed1"> <select id="k9" name='k9_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#k9"></div>
							<span id="k9text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="k9_comment" id="k9_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">4.10</td>
                                  <td>If the system has multipage data entry screens, can users move backward and forward among the pages in the set?</td>
                                  <td>
							   <div class="feed1"> <select id="k10" name='k10_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#k10"></div>
							<span id="k10text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="k10_comment" id="k10_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							<tr><td class="td">4.11</td>
                                  <td>If the system uses a question and answer interface, can users go back to previous questions or skip forward to later questions?</td>
                                  <td>
							   <div class="feed1"> <select id="k11" name='k11_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#k11"></div>
							<span id="k11text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="k11_comment" id="k11_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							<tr><td class="td">4.12</td>
                                  <td>If users can set their own system, session, file and screen defaults, are there protections against predictable use errors for likely defaults?</td>
                                  <td>
							   <div class="feed1"> <select id="k12" name='k12_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#k12"></div>
							<span id="k12text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="k12_comment" id="k12_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							 
                                            </tbody> 
                                        </table>
										  </div>
													 <div class="clearfix"></br>
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
											
											<div id="step-12">
											
											
											<div id="accordion" class="accordion-wrapper mb-3">
                                                    <div class="card">
                                                       <div class="card-body">
                                               <form class="" action="<?php echo base_url().'nist/dashboard/form12' ?>" method="post"  role="form" parsley-validate>
                                    
                                               
                                                  <div class="card-title">5. Consistency and Standards</div>  
												  <p>Users should not have to wonder whether different words, situations or actions mean the same thing. Follow platform conventions.</p>
                                          <div class="table-responsive">
										  <table class="table table-striped table-bordered" id="InvoiceTable" style="text-align:center;">
                                             <thead>
														  <tr>
															<th>#</th>
															<th>Review Checklist</th>
															<th>Severity Rating</th>
															<th>Comments</th>
														  </tr>
														</thead>
                                            <tbody id="itemsBody">
                                            <tr>
                                  <td class="td">5.1</td>
                                  <td>Has a heavy use of all uppercase letters on a screen been avoided?</td>
                                  <td style="width:20%">
							   <div class="feed1"> <select id="l1" name='l1_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#l1"></div>
							<span id="l1text" class="rating"></span></td>
							<td style="width:20%"><input name="l1_comment" id="l1_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
					 </tr>
                          
                          <tr>
                                  <td class="td">5.2</td>
                                  <td>Do abbreviations not include punctuation?</td>
                                  <td>
							   <div class="feed1"> <select id="l2" name='l2_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#l2"></div>
							<span id="l2text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="l2_comment" id="l2_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
                              
							 
							<tr><td class="td">5.3</td>
                                  <td>Are integers right-justified and real numbers decimal-aligned?</td>
                                  <td>
							   <div class="feed1"> <select id="l3" name='l3_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#l3"></div>
							<span id="l3text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="l3_comment" id="l3_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">5.4</td>
                                  <td>Are icons easy to interpret and is there a redundant way to interpret them (e.g., labels, mouseover labels)?</td>
                                  <td>
							   <div class="feed1"> <select id="l4" name='l4_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#l4"></div>
							<span id="l4text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="l4_comment" id="l4_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">5.5</td>
                                  <td>Are there no more than twelve to twenty icon types?</td>
                                  <td>
							   <div class="feed1"> <select id="l5" name='l5_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#l5"></div>
							<span id="l5text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="l5_comment" id="l5_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">5.6</td>
                                  <td>Are there salient visual cues to identify the active window?</td>
                                  <td>
							   <div class="feed1"> <select id="l6" name='l6_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#l6"></div>
							<span id="l6text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="l6_comment" id="l6_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">5.7</td>
                                  <td>Does the menu structure match the task structure?</td>
                                  <td>
							   <div class="feed1"> <select id="l7" name='l7_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#l7"></div>
							<span id="l7text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="l7_comment" id="l7_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							<tr><td class="td">5.8</td>
                                  <td>If "exit" (or its equivalent, such as “quit” or “close”) is a menu choice, does it always appear at the bottom of the list?</td>
                                  <td>
							   <div class="feed1"> <select id="l8" name='l8_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#l8"></div>
							<span id="l8text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="l8_comment" id="l8_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							<tr><td class="td">5.9</td>
                                  <td>Are menu titles either centered or left-justified?</td>
                                  <td>
							   <div class="feed1"> <select id="l9" name='l9_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#l9"></div>
							<span id="l9text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="l9_comment" id="l9_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">5.10</td>
                                  <td>Are field labels consistent from one data entry screen to another?</td>
                                  <td>
							   <div class="feed1"> <select id="l10" name='l10_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#l10"></div>
							<span id="l10text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="l10_comment" id="l10_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							<tr><td class="td">5.11</td>
                                  <td>Are high-value, high-chroma colors used to attract attention?</td>
                                  <td>
							   <div class="feed1"> <select id="l11" name='l11_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#l11"></div>
							<span id="l11text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="l11_comment" id="l11_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							 
							
							 
                                            </tbody> 
                                        </table>
										  </div>
													 <div class="clearfix"></br>
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
											
											<div id="step-13">
											
											
											<div id="accordion" class="accordion-wrapper mb-3">
                                                    <div class="card">
                                                       <div class="card-body">
                                               <form class="" action="<?php echo base_url().'nist/dashboard/form13' ?>" method="post"  role="form" parsley-validate>
                                    
                                               
                                                  <div class="card-title">6. Help Users Recognize, Diagnose and Recover From Errors</div>  
												  <p>Error messages should be expressed in plain language (NO CODES).</p>
                                          <div class="table-responsive">
										  <table class="table table-striped table-bordered" id="InvoiceTable" style="text-align:center;">
                                             <thead>
														  <tr>
															<th>#</th>
															<th>Review Checklist</th>
															<th>Severity Rating</th>
															<th>Comments</th>
														  </tr>
														</thead>
                                            <tbody id="itemsBody">
                                            <tr>
                                  <td class="td">6.1</td>
                                  <td>Are prompts brief and unambiguous?</td>
                                  <td style="width:20%">
							   <div class="feed1"> <select id="m1" name='m1_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#m1"></div>
							<span id="m1text" class="rating"></span></td>
							<td style="width:20%"><input name="m1_comment" id="m1_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
					 </tr>
                          
                          <tr>
                                  <td class="td">6.2</td>
                                  <td>Are error messages grammatically correct?</td>
                                  <td>
							   <div class="feed1"> <select id="m2" name='m2_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#m2"></div>
							<span id="m2text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="m2_comment" id="m2_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
                              
							 
							<tr><td class="td">6.3</td>
                                  <td>Do error messages avoid the use of exclamation points?</td>
                                  <td>
							   <div class="feed1"> <select id="m3" name='m3_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#m3"></div>
							<span id="m3text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="m3_comment" id="m3_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">6.4</td>
                                  <td>Do error messages avoid the use of violent or hostile words?</td>
                                  <td>
							   <div class="feed1"> <select id="m4" name='m4_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#m4"></div>
							<span id="m4text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="m4_comment" id="m4_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">6.5</td>
                                  <td>Do all error messages in the system use consistent grammatical style, form, terminology and abbreviations?</td>
                                  <td>
							   <div class="feed1"> <select id="m5" name='m5_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#m5"></div>
							<span id="m5text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="m5_comment" id="m5_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">6.6</td>
                                  <td>Do messages place users in control of the system?</td>
                                  <td>
							   <div class="feed1"> <select id="m6" name='m6_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#m6"></div>
							<span id="m6text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="m6_comment" id="m6_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">6.7</td>
                                  <td>Do error messages inform the user of the error's severity?</td>
                                  <td>
							   <div class="feed1"> <select id="m7" name='m7_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#m7"></div>
							<span id="m7text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="m7_comment" id="m7_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							<tr><td class="td">6.8</td>
                                  <td>Do error messages suggest the cause of problem?</td>
                                  <td>
							   <div class="feed1"> <select id="m8" name='m8_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#m8"></div>
							<span id="m8text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="m8_comment" id="m8_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							<tr><td class="td">6.9</td>
                                  <td>Do error messages provide sufficiently detailed information that makes it easy to do the intended behavior?</td>
                                  <td>
							   <div class="feed1"> <select id="m9" name='m9_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#m9"></div>
							<span id="m9text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="m9_comment" id="m9_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">6.10</td>
                                  <td>Do error messages indicate what action the user needs to take to correct the error?</td>
                                  <td>
							   <div class="feed1"> <select id="m10" name='m10_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#m10"></div>
							<span id="m10text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="m10_comment" id="m10_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							 
                                            </tbody> 
                                        </table>
										  </div>
													 <div class="clearfix"></br>
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
											
											
											
											<div id="step-14">
											
											
											<div id="accordion" class="accordion-wrapper mb-3">
                                                    <div class="card">
                                                       <div class="card-body">
                                               <form class="" action="<?php echo base_url().'nist/dashboard/form14' ?>" method="post"  role="form" parsley-validate>
                                    
                                               
                                                  <div class="card-title">7. Error Prevention</div>  
												  <p>Even better than good error messages is a careful design that prevents a problem from occurring in the first place.</p>
                                          <div class="table-responsive">
										  <table class="table table-striped table-bordered" id="InvoiceTable" style="text-align:center;">
                                             <thead>
														  <tr>
															<th>#</th>
															<th>Review Checklist</th>
															<th>Severity Rating</th>
															<th>Comments</th>
														  </tr>
														</thead>
                                            <tbody id="itemsBody">
                                            <tr>
                                  <td class="td">7.1</td>
                                  <td>Is the menu choice name on a higher-level menu used as the menu title of the lower-level menu?</td>
                                  <td style="width:20%">
							   <div class="feed1"> <select id="n1" name='n1_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#n1"></div>
							<span id="n1text" class="rating"></span></td>
							<td style="width:20%"><input name="n1_comment" id="n1_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
					 </tr>
                          
                          <tr>
                                  <td class="td">7.2</td>
                                  <td>Has the use of qualifier keys (e.g., shift, control, command, alt) been minimized?</td>
                                  <td>
							   <div class="feed1"> <select id="n2" name='n2_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#n2"></div>
							<span id="n2text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="n2_comment" id="n2_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
                              
							 
							<tr><td class="td">7.3</td>
                                  <td>If the system uses qualifier keys, are they used consistently throughout the system?</td>
                                  <td>
							   <div class="feed1"> <select id="n3" name='n3_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#n3"></div>
							<span id="n3text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="n3_comment" id="n3_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">7.4</td>
                                  <td>Does the system prevent users from making errors whenever possible?</td>
                                  <td>
							   <div class="feed1"> <select id="n4" name='n4_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#n4"></div>
							<span id="n4text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="n4_comment" id="n4_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">7.5</td>
                                  <td>Does the system warn users if they are about to make a potentially serious error?</td>
                                  <td>
							   <div class="feed1"> <select id="n5" name='n5_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#n5"></div>
							<span id="n5text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="n5_comment" id="n5_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">7.6</td>
                                  <td>Do data entry screens and dialog boxes indicate the number of character spaces available in a field?</td>
                                  <td>
							   <div class="feed1"> <select id="n6" name='n6_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#n6"></div>
							<span id="n6text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="n6_comment" id="n6_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">7.7</td>
                                  <td>Do fields in data entry screens and dialog boxes contain default values when appropriate?</td>
                                  <td>
							   <div class="feed1"> <select id="n7" name='n7_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#n7"></div>
							<span id="n7text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="n7_comment" id="n7_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
 
							 
                                            </tbody> 
                                        </table>
										  </div>
													 <div class="clearfix"></br>
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
											
											
											
											<div id="step-15">
											
											
											<div id="accordion" class="accordion-wrapper mb-3">
                                                    <div class="card">
                                                       <div class="card-body">
                                               <form class="" action="<?php echo base_url().'nist/dashboard/form15' ?>" method="post"  role="form" parsley-validate>
                                    
                                               
                                                  <div class="card-title">8. Recognition Rather Than Recall</div>  
												  <p>Make objects, actions and options visible. The user should not have to remember information from one part of the dialogue to another. Instructions for use of the system should be visible or easily retrievable whenever appropriate.</p>
                                          <div class="table-responsive">
										  <table class="table table-striped table-bordered" id="InvoiceTable" style="text-align:center;">
                                             <thead>
														  <tr>
															<th>#</th>
															<th>Review Checklist</th>
															<th>Severity Rating</th>
															<th>Comments</th>
														  </tr>
														</thead>
                                            <tbody id="itemsBody">
                                            <tr>
                                  <td class="td">8.1</td>
                                  <td>Does the data display start in the upper-left corner of the screen?</td>
                                  <td style="width:20%">
							   <div class="feed1"> <select id="o1" name='o1_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#o1"></div>
							<span id="o1text" class="rating"></span></td>
							<td style="width:20%"><input name="o1_comment" id="o1_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
					 </tr>
                          
                          <tr>
                                  <td class="td">8.2</td>
                                  <td>Are all data that a user needs on display at each step in a transaction sequence?</td>
                                  <td>
							   <div class="feed1"> <select id="o2" name='o2_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#o2"></div>
							<span id="o2text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="o2_comment" id="o2_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
                              
							 
							<tr><td class="td">8.3</td>
                                  <td>Have prompts been formatted using white space, justification and visual cues for easy scanning?</td>
                                  <td>
							   <div class="feed1"> <select id="o3" name='o3_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#o3"></div>
							<span id="o3text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="o3_comment" id="o3_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">8.4</td>
                                  <td>Have zones been separated by spaces, lines, color, letters, bold titles, rules lines, or shaded areas?</td>
                                  <td>
							   <div class="feed1"> <select id="o4" name='o4_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#o4"></div>
							<span id="o4text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="o4_comment" id="o4_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">8.5</td>
                                  <td>Are field labels close to fields, but separated by at least one space?</td>
                                  <td>
							   <div class="feed1"> <select id="o5" name='o5_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#o5"></div>
							<span id="o5text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="o5_comment" id="o5_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">8.6</td>
                                  <td>Are optional data entry fields clearly marked?</td>
                                  <td>
							   <div class="feed1"> <select id="o6" name='o6_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#o6"></div>
							<span id="o6text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="o6_comment" id="o6_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">8.7</td>
                                  <td>Are meaningful groups clearly demarcated (e.g., borders used)?</td>
                                  <td>
							   <div class="feed1"> <select id="o7" name='o7_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#o7"></div>
							<span id="o7text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="o7_comment" id="o7_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">8.8</td>
                                  <td>Is color coding consistent throughout the system?</td>
                                  <td>
							   <div class="feed1"> <select id="o8" name='o8_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#o8"></div>
							<span id="o8text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="o8_comment" id="o8_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">8.9</td>
                                  <td>Is color used in conjunction with another redundant cue?</td>
                                  <td>
							   <div class="feed1"> <select id="o9" name='o9_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#o9"></div>
							<span id="o9text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="o9_comment" id="o9_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">8.10</td>
                                  <td>Is the first word of each menu choice the most important?</td>
                                  <td>
							   <div class="feed1"> <select id="o10" name='o10_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#o10"></div>
							<span id="o10text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="o10_comment" id="o10_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							<tr><td class="td">8.11</td>
                                  <td>Are inactive menu items grayed or omitted?</td>
                                  <td>
							   <div class="feed1"> <select id="o11" name='o11_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#o11"></div>
							<span id="o11text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="o11_comment" id="o11_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							<tr><td class="td">8.12</td>
                                  <td>Are there menu selection defaults?</td>
                                  <td>
							   <div class="feed1"> <select id="o12" name='o12_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#o12"></div>
							<span id="o12text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="o12_comment" id="o12_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							<tr><td class="td">8.13</td>
                                  <td>Do data entry screens and dialog boxes indicate when fields are optional?</td>
                                  <td>
							   <div class="feed1"> <select id="o13" name='o13_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#o13"></div>
							<span id="o13text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="o13_comment" id="o13_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							<tr><td class="td">8.14</td>
                                  <td>On data entry screens and dialog boxes, are dependent fields displayed only when necessary?</td>
                                  <td>
							   <div class="feed1"> <select id="o14" name='o14_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#o14"></div>
							<span id="o14text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="o14_comment" id="o14_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
 
							 
                                            </tbody> 
                                        </table>
										  </div>
													 <div class="clearfix"></br>
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
											
											
											
											
											<div id="step-16">
											
											
											<div id="accordion" class="accordion-wrapper mb-3">
                                                    <div class="card">
                                                       <div class="card-body">
                                               <form class="" action="<?php echo base_url().'nist/dashboard/form16' ?>" method="post"  role="form" parsley-validate>
                                    
                                               
                                                  <div class="card-title">9. Flexibility and Minimalist Design</div>  
												  <p>Accelerators-unseen by the novice user-may often speed up the interaction for the expert user such that the system can cater to both inexperienced and experienced users. Allow users to tailor frequent actions. Provide alternative means of access and operation for users who differ from the “average” user (e.g., physical or cognitive ability, culture, language, etc.)</p>
                                          <div class="table-responsive">
										  <table class="table table-striped table-bordered" id="InvoiceTable" style="text-align:center;">
                                             <thead>
														  <tr>
															<th>#</th>
															<th>Review Checklist</th>
															<th>Severity Rating</th>
															<th>Comments</th>
														  </tr>
														</thead>
                                            <tbody id="itemsBody">
                                            <tr>
                                  <td class="td">9.1</td>
                                  <td>If the system supports both novice and expert users, are multiple levels of error message detail available?</td>
                                  <td style="width:20%">
							   <div class="feed1"> <select id="p1" name='p1_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#p1"></div>
							<span id="p1text" class="rating"></span></td>
							<td style="width:20%"><input name="p1_comment"  type="text"  value="" class="form-control" autocomplete="off"></td>
					 </tr>
                          
                          <tr>
                                  <td class="td">9.2</td>
                                  <td>Does the system allow novice users to enter the simplest, most common form of each command, and allow expert users to add parameters?</td>
                                  <td>
							   <div class="feed1"> <select id="p2" name='p2_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#p2"></div>
							<span id="p2text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="p2_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
                              
							 
							<tr><td class="td">9.3</td>
                                  <td>Does the system provide function keys for high-frequency commands?</td>
                                  <td>
							   <div class="feed1"> <select id="p3" name='p3_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#p3"></div>
							<span id="p3text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="p3_comment" id="p3_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">9.4</td>
                                  <td>For data entry screens with many fields or in which source documents may be incomplete, can users save a partially filled screen?</td>
                                  <td>
							   <div class="feed1"> <select id="p4" name='p4_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#p4"></div>
							<span id="p4text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="p4_comment"  type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">9.5</td>
                                  <td>If menu lists are short (seven items or fewer), can users select an item by moving the cursor?</td>
                                  <td>
							   <div class="feed1"> <select id="p5" name='p5_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#p5"></div>
							<span id="p5text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="p5_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">9.6</td>
                                  <td>If the system uses a pointing device, do users have the option of either clicking on fields or using a keyboard shortcut?</td>
                                  <td>
							   <div class="feed1"> <select id="p6" name='p6_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#p6"></div>
							<span id="p6text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="p6_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">9.7</td>
                                  <td>Does the system offer "find next" and "find previous" shortcuts for database searches?</td>
                                  <td>
							   <div class="feed1"> <select id="p7" name='p7_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#p7"></div>
							<span id="p7text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="p7_comment"  type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">9.8</td>
                                  <td>In dialog boxes, do users have the option of either clicking directly on a dialog box option or using a keyboard shortcut?</td>
                                  <td>
							   <div class="feed1"> <select id="p8" name='p8_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#p8"></div>
							<span id="p8text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="p8_comment"  type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">9.9</td>
                                  <td>Can expert users bypass nested dialog boxes with either type-ahead, user-defined macros, or keyboard shortcuts?</td>
                                  <td>
							   <div class="feed1"> <select id="p9" name='p9_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#p9"></div>
							<span id="p9text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="p9_comment"  type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							 
                                            </tbody> 
                                        </table>
										  </div>
													 <div class="clearfix"></br>
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
											
											<div id="step-17">
											
											
											<div id="accordion" class="accordion-wrapper mb-3">
                                                    <div class="card">
                                                       <div class="card-body">
                                               <form class="" action="<?php echo base_url().'nist/dashboard/form17' ?>" method="post"  role="form" parsley-validate>
                                    
                                               
                                                  <div class="card-title">10. Aesthetic and Minimalist Design</div>  
												  <p>Dialogues should not contain information that is irrelevant or rarely needed. Every extra unit of information in a dialogue competes with the relevant units of information and diminishes their relative visibility.</p>
                                          <div class="table-responsive">
										  <table class="table table-striped table-bordered" id="InvoiceTable" style="text-align:center;">
                                             <thead>
														  <tr>
															<th>#</th>
															<th>Review Checklist</th>
															<th>Severity Rating</th>
															<th>Comments</th>
														  </tr>
														</thead>
                                            <tbody id="itemsBody">
                                            <tr>
                                  <td class="td">10.1</td>
                                  <td>Is only (and all) information essential to decision making displayed on the screen?</td>
                                  <td style="width:20%">
							   <div class="feed1"> <select id="q1" name='q1_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#q1"></div>
							<span id="q1text" class="rating"></span></td>
							<td style="width:20%"><input name="q1_comment"  type="text"  value="" class="form-control" autocomplete="off"></td>
					 </tr>
                          
                          <tr>
                                  <td class="td">10.2</td>
                                  <td>Are all icons in a set visually and conceptually distinct?</td>
                                  <td>
							   <div class="feed1"> <select id="q2" name='q2_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#q2"></div>
							<span id="q2text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="q2_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
                              
							 
							<tr><td class="td">10.3</td>
                                  <td>Have large objects, bold lines and simple areas been used to distinguish icons?</td>
                                  <td>
							   <div class="feed1"> <select id="q3" name='q3_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#q3"></div>
							<span id="q3text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="q3_comment" id="q3_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">10.4</td>
                                  <td>Does each icon stand out from its background?</td>
                                  <td>
							   <div class="feed1"> <select id="q4" name='q4_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#q4"></div>
							<span id="q4text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="q4_comment"  type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">10.5</td>
                                  <td>If the system uses a standard GUI where menu sequence has already been specified, do menus adhere to the specification whenever possible?</td>
                                  <td>
							   <div class="feed1"> <select id="q5" name='q5_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#q5"></div>
							<span id="q5text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="q5_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">10.6</td>
                                  <td>Are meaningful groups of items separated (e.g., by white space)?</td>
                                  <td>
							   <div class="feed1"> <select id="q6" name='q6_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#q6"></div>
							<span id="q6text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="q6_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">10.7</td>
                                  <td>Does each data entry screen have a short, simple, clear, distinctive title?</td>
                                  <td>
							   <div class="feed1"> <select id="q7" name='q7_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#q7"></div>
							<span id="q7text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="q7_comment"  type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">10.8</td>
                                  <td>Are field labels brief, familiar and descriptive?</td>
                                  <td>
							   <div class="feed1"> <select id="q8" name='q8_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#q8"></div>
							<span id="q8text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="q8_comment"  type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">10.9</td>
                                  <td>Are prompts expressed in the affirmative, and do they use the active voice?</td>
                                  <td>
							   <div class="feed1"> <select id="q9" name='q9_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#q9"></div>
							<span id="q9text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="q9_comment"  type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							<tr><td class="td">10.10</td>
                                  <td>Is each lower-level menu choice associated with only one higher-level menu?</td>
                                  <td>
							   <div class="feed1"> <select id="q10" name='q10_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#q10"></div>
							<span id="q10text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="q10_comment"  type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							<tr><td class="td">10.11</td>
                                  <td>Are menu titles brief, yet long enough to communicate?</td>
                                  <td>
							   <div class="feed1"> <select id="q11" name='q11_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#q11"></div>
							<span id="q11text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="q11_comment"  type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							<tr><td class="td">10.12</td>
                                  <td>Are there pop-up or pull-down menus within data entry fields that have many, but well-defined, entry options?</td>
                                  <td>
							   <div class="feed1"> <select id="q12" name='q12_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#q12"></div>
							<span id="q12text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="q12_comment"  type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							 
                                            </tbody> 
                                        </table>
										  </div>
													 <div class="clearfix"></br>
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
											
											
												<div id="step-18">
											
											
											<div id="accordion" class="accordion-wrapper mb-3">
                                                    <div class="card">
                                                       <div class="card-body">
                                               <form class="" action="<?php echo base_url().'nist/dashboard/form18' ?>" method="post"  role="form" parsley-validate>
                                    
                                               
                                                  <div class="card-title">11. Help and Documentation</div>  
												  <p>Even though it is better if the system can be used without documentation, it may be necessary to provide help and documentation. Any such information should be easy to search, focused on the user’s task, list concrete steps to be carried out, and not be too large.</p>
                                          <div class="table-responsive">
										  <table class="table table-striped table-bordered" id="InvoiceTable" style="text-align:center;">
                                             <thead>
														  <tr>
															<th>#</th>
															<th>Review Checklist</th>
															<th>Severity Rating</th>
															<th>Comments</th>
														  </tr>
														</thead>
                                            <tbody id="itemsBody">
                                            <tr>
                                  <td class="td">11.1</td>
                                  <td>If menu choices are ambiguous, does the system provide additional explanatory information when an item is selected?</td>
                                  <td style="width:20%">
							   <div class="feed1"> <select id="r1" name='r1_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#r1"></div>
							<span id="r1text" class="rating"></span></td>
							<td style="width:20%"><input name="r1_comment"  type="text"  value="" class="form-control" autocomplete="off"></td>
					 </tr>
                          
                          <tr>
                                  <td class="td">11.2</td>
                                  <td>Are data entry screens and dialog boxes supported by navigation and completion instructions?</td>
                                  <td>
							   <div class="feed1"> <select id="r2" name='r2_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#r2"></div>
							<span id="r2text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="r2_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
                              
							 
							<tr><td class="td">11.3</td>
                                  <td>Are there memory aids for commands, either through on-line quick reference or prompting?</td>
                                  <td>
							   <div class="feed1"> <select id="r3" name='r3_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#r3"></div>
							<span id="r3text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="r3_comment"  type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">11.4</td>
                                  <td>Is the help function visible (e.g., by a key labeled HELP or a special menu)?</td>
                                  <td>
							   <div class="feed1"> <select id="r4" name='r4_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#r4"></div>
							<span id="r4text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="r4_comment"  type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">11.5</td>
                                  <td>Is the help system interface (navigation, presentation and conversation) consistent with the navigation, presentation and conversation interfaces of the application it supports?</td>
                                  <td>
							   <div class="feed1"> <select id="r5" name='r5_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#r5"></div>
							<span id="r5text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="r5_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">11.6</td>
                                  <td>Navigation: Is information easy to find?</td>
                                  <td>
							   <div class="feed1"> <select id="r6" name='r6_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#r6"></div>
							<span id="r6text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="r6_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">11.7</td>
                                  <td>Presentation: Is the visual layout well designed?</td>
                                  <td>
							   <div class="feed1"> <select id="r7" name='r7_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#r7"></div>
							<span id="r7text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="r7_comment"  type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">11.8</td>
                                  <td>Conversation: Is the information accurate, complete and understandable?</td>
                                  <td>
							   <div class="feed1"> <select id="r8" name='r8_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#r8"></div>
							<span id="r8text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="r8_comment"  type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">11.9</td>
                                  <td>Is there context-sensitive help?</td>
                                  <td>
							   <div class="feed1"> <select id="r9" name='r9_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#r9"></div>
							<span id="r9text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="r9_comment"  type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							<tr><td class="td">11.10</td>
                                  <td>Is it easy to access and return from the help system?</td>
                                  <td>
							   <div class="feed1"> <select id="r10" name='r10_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#r10"></div>
							<span id="r10text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="r10_comment"  type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							<tr><td class="td">11.11</td>
                                  <td>Can users resume work where they left off after accessing help?</td>
                                  <td>
							   <div class="feed1"> <select id="r11" name='r11_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#r11"></div>
							<span id="r11text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="r11_comment"  type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							 
							 
                                            </tbody> 
                                        </table>
										  </div>
													 <div class="clearfix"></br>
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
											
											
											<div id="step-19">
											
											
											<div id="accordion" class="accordion-wrapper mb-3">
                                                    <div class="card">
                                                       <div class="card-body">
                                               <form class="" action="<?php echo base_url().'nist/dashboard/form19' ?>" method="post"  role="form" parsley-validate>
                                    
                                               
                                                  <div class="card-title">12. Pleasurable and Respectful Interaction with the User</div>  
												  <p>The user’s interactions with the system should enhance the quality of her or his work-life. The user should be treated with respect. The design should be aesthetically pleasing- with artistic as well as functional value.</p>
                                          <div class="table-responsive">
										  <table class="table table-striped table-bordered" id="InvoiceTable" style="text-align:center;">
                                             <thead>
														  <tr>
															<th>#</th>
															<th>Review Checklist</th>
															<th>Severity Rating</th>
															<th>Comments</th>
														  </tr>
														</thead>
                                            <tbody id="itemsBody">
                                            <tr>
                                  <td class="td">12.1</td>
                                  <td>Is each individual icon a harmonious member of a family of icons?</td>
                                  <td style="width:20%">
							   <div class="feed1"> <select id="s1" name='s1_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#s1"></div>
							<span id="s1text" class="rating"></span></td>
							<td style="width:20%"><input name="s1_comment"  type="text"  value="" class="form-control" autocomplete="off"></td>
					 </tr>
                          
                          <tr>
                                  <td class="td">12.2</td>
                                  <td>Has excessive detail in icon design been avoided?</td>
                                  <td>
							   <div class="feed1"> <select id="s2" name='s2_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#s2"></div>
							<span id="s2text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="s2_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
                              
							 
							<tr><td class="td">12.3</td>
                                  <td>Have flashing text and icons been avoided?</td>
                                  <td>
							   <div class="feed1"> <select id="s3" name='s3_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#s3"></div>
							<span id="s3text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="s3_comment"  type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">12.4</td>
                                  <td>Has color been used with discretion?</td>
                                  <td>
							   <div class="feed1"> <select id="s4" name='s4_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#s4"></div>
							<span id="s4text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="s4_comment"  type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">12.5</td>
                                  <td>Has color been used specifically to draw attention, communicate organization, indicate status changes, and establish relationships?</td>
                                  <td>
							   <div class="feed1"> <select id="s5" name='s5_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#s5"></div>
							<span id="s5text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="s5_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">12.6</td>
                                  <td>Are typing requirements minimal for question and answer interfaces?</td>
                                  <td>
							   <div class="feed1"> <select id="s6" name='s6_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#s6"></div>
							<span id="s6text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="s6_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							
							<tr><td class="td">12.7</td>
                                  <td>If the system supports multiple input devices, has hand and eye movement between input devices been minimized?</td>
                                  <td>
							   <div class="feed1"> <select id="s7" name='s7_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#s7"></div>
							<span id="s7text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="s7_comment"  type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
							 
							 
							 
                                            </tbody> 
                                        </table>
										  </div>
													 <div class="clearfix"></br>
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
											
											
											
											<div id="step-20">
											
											
											<div id="accordion" class="accordion-wrapper mb-3">
                                                    <div class="card">
                                                       <div class="card-body">
                                               <form class="" action="<?php echo base_url().'nist/dashboard/form20' ?>" method="post"  role="form" parsley-validate>
                                    
                                               
                                                  <div class="card-title">13. Privacy</div>  
												  <p>The system should help the user to protect personal or private information belonging to the user or his/her patients.</p>
                                          <div class="table-responsive">
										  <table class="table table-striped table-bordered" id="InvoiceTable" style="text-align:center;">
                                             <thead>
														  <tr>
															<th>#</th>
															<th>Review Checklist</th>
															<th>Severity Rating</th>
															<th>Comments</th>
														  </tr>
														</thead>
                                            <tbody id="itemsBody">
                                            <tr>
                                  <td class="td">13.1</td>
                                  <td>Are protected areas inaccessible under normal circumstances?</td>
                                  <td style="width:20%">
							   <div class="feed1"> <select id="t1" name='t1_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#t1"></div>
							<span id="t1text" class="rating"></span></td>
							<td style="width:20%"><input name="t1_comment"  type="text"  value="" class="form-control" autocomplete="off"></td>
					 </tr>
                          
                          <tr>
                                  <td class="td">13.2</td>
                                  <td>Can protected or confidential areas be accessed when necessary by following relevant security protocols (e.g., password protection)?</td>
                                  <td>
							   <div class="feed1"> <select id="t2" name='t2_name' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" ></option>
								<option value="1" >No Issue / Not applicable</option>
								<option value="2" >Minor</option>
								<option value="3" >Moderate</option>
								<option value="4" >Major</option>
								<option value="5" >Catastrophic</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#t2"></div>
							<span id="t2text" class="rating"></span>
							</td>
							<td style="width:20%"><input name="t2_comment" type="text"  value="" class="form-control" autocomplete="off"></td>
							</tr>
                              
							 
							                </tbody> 
                                        </table>
										  </div>
													 <div class="clearfix"></br>
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

	<div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Feedback Details Has Been Added Successfully</div></div></div>
    <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Feedback Details Has Not Been Added Successfully</div></div></div>
	
	
	
 

<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url()?>asset/js/summernote.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>nist_css/jquery.rateit.js" ></script>
<script>
 
	  
  $(document).ready(function() {
  $('form').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var button = $('#save');
		 button.prop('disabled',true);
		 $('.btn-primary').hide();
		$.ajax({
            type: 'post',
            url: formURL,
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



	 $("#backing2b").bind('rated', function (event, value) { $('#value5').text('You\'ve rated it: ' + value); });
    $("#backing2b").bind('reset', function () { $('#value5').text('Rating reset'); });
    $("#backing2b").bind('over', function (event, value) { $('#hover5').text('Hovering over: ' + value); });
	  
	  
	  $('.feed1').hide();
	
	$("#fb1").change( function () {
		$('#fb1text').html($('#fb1 :selected').text());
		$( "#totalschore" ).click();
	});
    $("#fb2").change( function () {
		$('#fb2text').html($('#fb2 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb3").change( function () {
		$('#fb3text').html($('#fb3 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb4").change( function () {
		$('#fb4text').html($('#fb4 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb5").change( function () {
		$('#fb5text').html($('#fb5 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb6").change( function () {
		$('#fb6text').html($('#fb6 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb7").change( function () {
		$('#fb7text').html($('#fb7 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb8").change( function () {
		$('#fb8text').html($('#fb8 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb9").change( function () {
		$('#fb9text').html($('#fb9 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb10").change( function () {
		$('#fb10text').html($('#fb10 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb11").change( function () {
		$('#fb11text').html($('#fb11 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb12").change( function () {
		$('#fb12text').html($('#fb12 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb13").change( function () {
		$('#fb13text').html($('#fb13 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb14").change( function () {
		$('#fb14text').html($('#fb14 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb15").change( function () {
		$('#fb15text').html($('#fb15 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb16").change( function () {
		$('#fb16text').html($('#fb16 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb17").change( function () {
		$('#fb17text').html($('#fb17 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb18").change( function () {
		$('#fb18text').html($('#fb18 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb19").change( function () {
		$('#fb19text').html($('#fb19 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb20").change( function () {
		$('#fb20text').html($('#fb20 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb21").change( function () {
		$('#fb21text').html($('#fb21 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb22").change( function () {
		$('#fb22text').html($('#fb22 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb23").change( function () {
		$('#fb23text').html($('#fb23 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb24").change( function () {
		$('#fb24text').html($('#fb24 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb25").change( function () {
		$('#fb25text').html($('#fb25 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb26").change( function () {
		$('#fb26text').html($('#fb26 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb27").change( function () {
		$('#fb27text').html($('#fb27 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb28").change( function () {
		$('#fb28text').html($('#fb28 :selected').text());
		$( "#totalschore" ).click();
	});
	
	
	$("#d1").change( function () {
		$('#d1text').html($('#d1 :selected').text());
		$( "#totalschore" ).click();
	});
	
	$("#d2").change( function () {
		$('#d2text').html($('#d2 :selected').text());
		$( "#totalschore" ).click();
	});
	
	
	$("#d3").change( function () {
		$('#d3text').html($('#d3 :selected').text());
		$( "#totalschore" ).click();
	});
	
	
	$("#d4").change( function () {
		$('#d4text').html($('#d4 :selected').text());
		$( "#totalschore" ).click();
	});
	
	
	$("#e1").change( function () {
		$('#e1text').html($('#e1 :selected').text());
		$( "#totalschore" ).click();
	});
	
	$("#e2").change( function () {
		$('#e2text').html($('#e2 :selected').text());
		$( "#totalschore" ).click();
	});
	
	
	$("#e3").change( function () {
		$('#e3text').html($('#e3 :selected').text());
		$( "#totalschore" ).click();
	});
	
	
	$("#e4").change( function () {
		$('#e4text').html($('#e4 :selected').text());
		$( "#totalschore" ).click();
	});
	
	$("#e5").change( function () {
		$('#e5text').html($('#e5 :selected').text());
		$( "#totalschore" ).click();
	});
	
	$("#e6").change( function () {
		$('#e6text').html($('#e6 :selected').text());
		$( "#totalschore" ).click();
	});
	
	$("#e7").change( function () {
		$('#e7text').html($('#e7 :selected').text());
		$( "#totalschore" ).click();
	});
	
	$("#f1").change( function () {
		$('#f1text').html($('#f1 :selected').text());
		$( "#totalschore" ).click();
	});
	
	$("#f2").change( function () {
		$('#f2text').html($('#f2 :selected').text());
		$( "#totalschore" ).click();
	});
	
	
	$("#f3").change( function () {
		$('#f3text').html($('#f3 :selected').text());
		$( "#totalschore" ).click();
	});
	
	
	$("#f4").change( function () {
		$('#f4text').html($('#f4 :selected').text());
		$( "#totalschore" ).click();
	});
	
	
	$("#f5").change( function () {
		$('#f5text').html($('#f5 :selected').text());
		$( "#totalschore" ).click();
	});
	
	
	$("#f6").change( function () {
		$('#f6text').html($('#f6 :selected').text());
		$( "#totalschore" ).click();
	});
	
	$("#g1").change( function () {
		$('#g1text').html($('#g1 :selected').text());
		$( "#totalschore" ).click();
	});
	
	
	$("#g2").change( function () {
		$('#g2text').html($('#g2 :selected').text());
		$( "#totalschore" ).click();
	});
	
	
	$("#g3").change( function () {
		$('#g3text').html($('#g3 :selected').text());
		$( "#totalschore" ).click();
	});
	
	$("#h1").change( function () {
		$('#h1text').html($('#h1 :selected').text());
		$( "#totalschore" ).click();
	});

		$("#h2").change( function () {
		$('#h2text').html($('#h2 :selected').text());
		$( "#totalschore" ).click();
	});
	
	$("#h3").change( function () {
		$('#h3text').html($('#h3 :selected').text());
		$( "#totalschore" ).click();
	});
	
	$("#h4").change( function () {
		$('#h4text').html($('#h4 :selected').text());
		$( "#totalschore" ).click();
	});
	
	$("#h5").change( function () {
		$('#h5text').html($('#h5 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#h6").change( function () {
		$('#h6text').html($('#h6 :selected').text());
		$( "#totalschore" ).click();
	});
	
	$("#h7").change( function () {
		$('#h7text').html($('#h7 :selected').text());
		$( "#totalschore" ).click();
	});
	
	$("#i1").change( function () {
		$('#i1text').html($('#i1 :selected').text());
		$( "#totalschore" ).click();
	});
	
	$("#i2").change( function () {
		$('#i2text').html($('#i2 :selected').text());
		$( "#totalschore" ).click();
	});
	
	$("#i3").change( function () {
		$('#i3text').html($('#i3 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#i4").change( function () {
		$('#i4text').html($('#i4 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#i5").change( function () {
		$('#i5text').html($('#i5 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#i6").change( function () {
		$('#i6text').html($('#i6 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#i7").change( function () {
		$('#i7text').html($('#i7 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#i8").change( function () {
		$('#i8text').html($('#i8 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#i9").change( function () {
		$('#i9text').html($('#i9 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#i10").change( function () {
		$('#i10text').html($('#i10 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#i11").change( function () {
		$('#i11text').html($('#i11 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#i12").change( function () {
		$('#i12text').html($('#i12 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#i13").change( function () {
		$('#i13text').html($('#i13 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#i14").change( function () {
		$('#i14text').html($('#i14 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#j1").change( function () {
		$('#j1text').html($('#j1 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#j2").change( function () {
		$('#j2text').html($('#j2 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#j3").change( function () {
		$('#j3text').html($('#j3 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#j4").change( function () {
		$('#j4text').html($('#j4 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#j5").change( function () {
		$('#j5text').html($('#j5 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#j6").change( function () {
		$('#j6text').html($('#j6 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#j7").change( function () {
		$('#j7text').html($('#j7 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#j8").change( function () {
		$('#j8text').html($('#j8 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#j9").change( function () {
		$('#j9text').html($('#j9 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#j10").change( function () {
		$('#j10text').html($('#j10 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#j11").change( function () {
		$('#j11text').html($('#j11 :selected').text());
		$( "#totalschore" ).click();
	});
	
	$("#k1").change( function () {
		$('#k1text').html($('#k1 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#k2").change( function () {
		$('#k2text').html($('#k2 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#k3").change( function () {
		$('#k3text').html($('#k3 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#k4").change( function () {
		$('#k4text').html($('#k4 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#k5").change( function () {
		$('#k5text').html($('#k5 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#k6").change( function () {
		$('#k6text').html($('#k6 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#k7").change( function () {
		$('#k7text').html($('#k7 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#k8").change( function () {
		$('#k8text').html($('#k8 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#k9").change( function () {
		$('#k9text').html($('#k9 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#k10").change( function () {
		$('#k10text').html($('#k10 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#k11").change( function () {
		$('#k11text').html($('#k11 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#k12").change( function () {
		$('#k12text').html($('#k12 :selected').text());
		$( "#totalschore" ).click();
	});
	
	$("#l1").change( function () {
		$('#l1text').html($('#l1 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#l2").change( function () {
		$('#l2text').html($('#l2 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#l3").change( function () {
		$('#l3text').html($('#l3 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#l4").change( function () {
		$('#l4text').html($('#l4 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#l5").change( function () {
		$('#l5text').html($('#l5 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#l6").change( function () {
		$('#l6text').html($('#l6 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#l7").change( function () {
		$('#l7text').html($('#l7 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#l8").change( function () {
		$('#l8text').html($('#l8 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#l9").change( function () {
		$('#l9text').html($('#l9 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#l10").change( function () {
		$('#l10text').html($('#l10 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#l11").change( function () {
		$('#l11text').html($('#l11 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#m1").change( function () {
		$('#m1text').html($('#m1 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#m2").change( function () {
		$('#m2text').html($('#m2 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#m3").change( function () {
		$('#m3text').html($('#m3 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#m4").change( function () {
		$('#m4text').html($('#m4 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#m5").change( function () {
		$('#m5text').html($('#m5 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#m6").change( function () {
		$('#m6text').html($('#m6 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#m7").change( function () {
		$('#m7text').html($('#m7 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#m8").change( function () {
		$('#m8text').html($('#m8 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#m9").change( function () {
		$('#m9text').html($('#m9 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#m10").change( function () {
		$('#m10text').html($('#m10 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#n1").change( function () {
		$('#n1text').html($('#n1 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#n2").change( function () {
		$('#n2text').html($('#n2 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#n3").change( function () {
		$('#n3text').html($('#n3 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#n4").change( function () {
		$('#n4text').html($('#n4 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#n5").change( function () {
		$('#n5text').html($('#n5 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#n6").change( function () {
		$('#n6text').html($('#n6 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#n7").change( function () {
		$('#n7text').html($('#n7 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#o1").change( function () {
		$('#o1text').html($('#o1 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#o2").change( function () {
		$('#o2text').html($('#o2 :selected').text());
		$( "#totalschore" ).click();
	});
	
	$("#o3").change( function () {
		$('#o3text').html($('#o3 :selected').text());
		$( "#totalschore" ).click();
	});
	
	$("#o4").change( function () {
		$('#o4text').html($('#o4 :selected').text());
		$( "#totalschore" ).click();
	});
	
	$("#o5").change( function () {
		$('#o5text').html($('#o5 :selected').text());
		$( "#totalschore" ).click();
	});
	
	$("#o6").change( function () {
		$('#o6text').html($('#o6 :selected').text());
		$( "#totalschore" ).click();
	});
	
	$("#o7").change( function () {
		$('#o7text').html($('#o7 :selected').text());
		$( "#totalschore" ).click();
	});
	
	$("#o8").change( function () {
		$('#o8text').html($('#o8 :selected').text());
		$( "#totalschore" ).click();
	});
	
	$("#o9").change( function () {
		$('#o9text').html($('#o9 :selected').text());
		$( "#totalschore" ).click();
	});
	
	$("#o10").change( function () {
		$('#o10text').html($('#o10 :selected').text());
		$( "#totalschore" ).click();
	});
	
	$("#o11").change( function () {
		$('#o11text').html($('#o11 :selected').text());
		$( "#totalschore" ).click();
	});
	
	$("#o12").change( function () {
		$('#o12text').html($('#o12 :selected').text());
		$( "#totalschore" ).click();
	});
	
	$("#o13").change( function () {
		$('#o13text').html($('#o13 :selected').text());
		$( "#totalschore" ).click();
	});
	
	$("#o14").change( function () {
		$('#o14text').html($('#o14 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#p1").change( function () {
		$('#p1text').html($('#p1 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#p2").change( function () {
		$('#p2text').html($('#p2 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#p3").change( function () {
		$('#p3text').html($('#p3 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#p4").change( function () {
		$('#p4text').html($('#p4 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#p5").change( function () {
		$('#p5text').html($('#p5 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#p6").change( function () {
		$('#p6text').html($('#p6 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#p7").change( function () {
		$('#p7text').html($('#p7 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#p8").change( function () {
		$('#p8text').html($('#p8 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#p9").change( function () {
		$('#p9text').html($('#p9 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#q1").change( function () {
		$('#q1text').html($('#q1 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#q2").change( function () {
		$('#q2text').html($('#q2 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#q3").change( function () {
		$('#q3text').html($('#q3 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#q4").change( function () {
		$('#q4text').html($('#q4 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#q5").change( function () {
		$('#q5text').html($('#q5 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#q6").change( function () {
		$('#q6text').html($('#q6 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#q7").change( function () {
		$('#q7text').html($('#q7 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#q8").change( function () {
		$('#q8text').html($('#q8 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#q9").change( function () {
		$('#q9text').html($('#q9 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#q10").change( function () {
		$('#q10text').html($('#q10 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#q11").change( function () {
		$('#q11text').html($('#q11 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#q12").change( function () {
		$('#q12text').html($('#q12 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#r1").change( function () {
		$('#r1text').html($('#r1 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#r2").change( function () {
		$('#r2text').html($('#r2 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#r3").change( function () {
		$('#r3text').html($('#r3 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#r4").change( function () {
		$('#r4text').html($('#r4 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#r5").change( function () {
		$('#r5text').html($('#r5 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#r6").change( function () {
		$('#r6text').html($('#r6 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#r7").change( function () {
		$('#r7text').html($('#r7 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#r8").change( function () {
		$('#r8text').html($('#r8 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#r9").change( function () {
		$('#r9text').html($('#r9 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#r10").change( function () {
		$('#r10text').html($('#r10 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#r11").change( function () {
		$('#r11text').html($('#r11 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#s1").change( function () {
		$('#s1text').html($('#s1 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#s2").change( function () {
		$('#s2text').html($('#s2 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#s3").change( function () {
		$('#s3text').html($('#s3 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#s4").change( function () {
		$('#s4text').html($('#s4 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#s5").change( function () {
		$('#s5text').html($('#s5 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#s6").change( function () {
		$('#s6text').html($('#s6 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#s7").change( function () {
		$('#s7text').html($('#s7 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#t1").change( function () {
		$('#t1text').html($('#t1 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#t2").change( function () {
		$('#t2text').html($('#t2 :selected').text());
		$( "#totalschore" ).click();
	});
	
	
	
	
	
	
	
	
	
	 
	
   $('#getschore').click(function(){
		var total = 0;
		$('#feedbacktable [name="srate[]"]').each(function(){
			total += ($(this).val() == '') ? 0 :  parseInt( $(this).val() );
		});
		total = total/24;
		//$('#totalrate').append('<div class="rateit" data-rateit-value="2" data-rateit-ispreset="true" data-rateit-readonly="true"></div>');
		//$('#totalrate').append('<div class="rateit" data-rateit-value="'+total+'" data-rateit-ispreset="true" data-rateit-readonly="true"></div>');
		//alert('<div class="rateit" data-rateit-value="2" data-rateit-ispreset="true" data-rateit-readonly="true"></div>');
	});
	
</script>
</body>
</html>
