<!DOCTYPE html>
<html lang="en">
<?php 
$pri=$this->session->userdata('privilege');
?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Physio Plus Tech</title>

     
    <link href="<?php echo base_url() ?>patient/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>patient/css/bootstrap-reset.css" rel="stylesheet">
     
    <link href="<?php echo base_url() ?>patient/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
     
    <link href="<?php echo base_url() ?>patient/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>patient/css/style-responsive.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>patient/css/table-responsive.css" rel="stylesheet" />
     
  </head>
  <body>
  <section id="container" class="">
       
		 <?php $this->load->view('patient/menu'); ?>
       
      <section id="main-content">
          <section class="wrapper">
            
              <div class="row">
                  <aside class="profile-nav col-lg-3">
                      <section class="panel">
					   
                          <div class="user-heading round">
						  </br></br></br>
                              <a href="#">
                                  <img src="<?php echo base_url() ?>patient/img/male.png" alt="">
                              </a>
                              <h1><?php echo $this->session->userdata('first_name').$this->session->userdata('last_name') ?></h1>
                              <p>Patient Code : <?php echo $this->session->userdata('patient_code') ?></p>
                             </br></br></br></br></br></br></br>
                          </div>

                          <ul class="nav nav-pills nav-stacked">
                             <!-- <li class="active"><a href="profile.html"> <i class="fa fa-user"></i> Profile</a></li>
                              <li><a href="#"> <i class="fa fa-print"></i> Print</a></li>
                              <li><a href="profile-edit.html"> <i class="fa fa-edit"></i> Edit profile</a></li>-->
                          </ul>

                      </section>
                  </aside>
                  <aside class="profile-info col-lg-9">
                      <section class="panel">
                          <div class="bio-graph-heading">
                             Hi <font color="red"><?php echo $this->session->userdata('first_name').$this->session->userdata('last_name'); ?></font> This is your Profile Information
                          </div>
                          <div class="panel-body bio-graph-info">
                              <h1>Basic Information</h1>
                              <div class="row">
                                  <div class="bio-row">
                                      <p><span>First Name </span>: <?php echo $this->session->userdata('first_name') ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Occupation</span>: <?php echo $this->session->userdata('occupation') ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Last Name </span>: <?php echo $this->session->userdata('last_name') ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Address 1 </span>: <?php echo $this->session->userdata('address_line1') ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Gender </span>: <?php echo $this->session->userdata('gender') ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Address 2 </span>: <?php echo $this->session->userdata('address_line2') ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Height </span>: <?php echo $this->session->userdata('height') ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>City </span>: <?php echo $this->session->userdata('city') ?></p>
                                  </div>
								  <div class="bio-row">
                                      <p><span>Wight </span>: <?php echo $this->session->userdata('wight') ?></p>
                                  </div>
								  <div class="bio-row">
                                      <p><span>Pincode </span>: <?php echo $this->session->userdata('pincode') ?></p>
                                  </div>
								  <div class="bio-row">
                                      <p><span>BMI </span>: <?php echo $this->session->userdata('bmi') ?></p>
                                  </div>
								   <div class="bio-row">
                                      <p><span>Mobile </span>: <?php echo $this->session->userdata('mobile_no') ?></p>
                                  </div>
								  <div class="bio-row">
                                      <p><span>Birthday </span>: <?php echo $this->session->userdata('dob') ?></p>
                                  </div>
								  <div class="bio-row">
                                      <p><span>Email </span>: <?php echo $this->session->userdata('email') ?></p>
                                  </div>
                              </div>
                          </div>
                      </section>
                  </aside>
				  
              </div>
			<?php
		if(strpos($pri,'1'))
		{ ?>
			 <div class="row">
                  <div class="col-lg-12">
					<section class="panel">
                          <header class="panel-heading tab-bg-dark-navy-blue ">
                              <ul class="nav nav-tabs">
                                  <li class="active">
                                      <a data-toggle="tab" href="#case">case Notes</a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#progress">Progress Notes</a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#remark">Remark</a>
                                  </li>
                              </ul>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                                  <div id="case" class="tab-pane active">
									<?php if($case_notes != false) {?>
                                       <div class="row">
									  <div class="col-lg-12">
										  <section class="panel">
											  <header class="panel-heading">
												  Case Notes
											  </header>
											  <div class="panel-body">
												  <section id="flip-scroll">
													  <table class="table table-bordered table-striped table-condensed cf">
														  <thead class="cf">
														  <tr>
															  <th>Date</th>
															  <th>Case Notes</th>
														  </tr>
														  </thead>
														  <tbody>
														  <?php 
															foreach($case_notes as $case){
														  ?>
														  <tr>
															  <td><?php echo $case['cn_date']?></td>
															  <td><?php echo $case['case_notes']?></td>
														  </tr>
															<?php } ?>
														  </tbody>
													  </table>
												  </section>
											  </div>
										  </section>
									  </div>
									</div>
									<?php }else{
										echo 'No Case Notes';
									}	
									?>
									
                                  </div>
                                  <div id="progress" class="tab-pane">
										<?php if($progress_notes != false) {?>
                                       <div class="row">
									  <div class="col-lg-12">
										  <section class="panel">
											  <header class="panel-heading">
												  Progress Notes
											  </header>
											  <div class="panel-body">
												  <section id="flip-scroll">
													  <table class="table table-bordered table-striped table-condensed cf">
														  <thead class="cf">
														  <tr>
															  <th>Date</th>
															  <th>Progress Notes</th>
														  </tr>
														  </thead>
														  <tbody>
														  <?php 
															foreach($progress_notes as $progress){
														  ?>
														  <tr>
															  <td><?php echo $progress['pn_date']?></td>
															  <td><?php echo $progress['prog_notes']?></td>
														  </tr>
															<?php } ?>
														  </tbody>
													  </table>
												  </section>
											  </div>
										  </section>
									  </div>
									</div>
									<?php }else{
										echo 'No Progress Notes';
									}	
									?>
								  </div>
                                  <div id="remark" class="tab-pane">
										<?php if($remark != false) {?>
                                       <div class="row">
									  <div class="col-lg-12">
										  <section class="panel">
											  <header class="panel-heading">
												  Progress Notes
											  </header>
											  <div class="panel-body">
												  <section id="flip-scroll">
													  <table class="table table-bordered table-striped table-condensed cf">
														  <thead class="cf">
														  <tr>
															  <th>Date</th>
															  <th>Progress Notes</th>
														  </tr>
														  </thead>
														  <tbody>
														  <?php 
															foreach($remark as $remarks){
														  ?>
														  <tr>
															  <td><?php echo date('d-m-Y',strtotime($remarks['remark_date']))?></td>
															  <td><?php echo $remarks['remarks']?></td>
														  </tr>
															<?php } ?>
														  </tbody>
													  </table>
												  </section>
											  </div>
										  </section>
									  </div>
									</div>
									<?php }else{
										echo 'No Remarks';
									}	
									?>
									
								  </div>
                              </div>
                          </div>
                      </section>
                  </div>
              </div>
			  <div class="row">
                  <div class="col-lg-12">
					<section class="panel">
                          <header class="panel-heading tab-bg-dark-navy-blue ">
                              <ul class="nav nav-tabs">
                                  <li class="active">
                                      <a data-toggle="tab" href="#History">History</a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#chief">Chief complaints</a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#pain">Pain</a>
                                  </li>
								  <li class="">
                                      <a data-toggle="tab" href="#exam">Examination</a>
                                  </li>
								  <li class="">
                                      <a data-toggle="tab" href="#motor">Motor examination</a>
                                  </li>
								  <li class="">
                                      <a data-toggle="tab" href="#sensory">sensory examination </a>
                                  </li>
                              </ul>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                                  <div id="History" class="tab-pane active">
									<?php if($history != false) {?>
                                       <div class="row">
									  <div class="col-lg-12">
										  <section class="panel">
											  <header class="panel-heading">
												  History
											  </header>
											  <div class="panel-body">
												  <section id="flip-scroll">
													  <table class="table table-bordered table-striped table-condensed cf">
														  <thead class="cf">
														  <tr>
															  <th>Date</th>
															  <th>History</th>
															  <th>Diabetes</th>
															  <th>BP</th>
															  <th>Medicine used</th>
															  <th>Surgery</th>
															  <th>Smoking</th>
															  <th>Drinking</th>
															  <th>Hereditary</th>
														  </tr>
														  </thead>
														  <tbody>
														  <?php 
															foreach($history as $historys){
														  ?>
														  <tr>
															  <td><?php echo $historys['his_date']?></td>
															  <td><?php echo $historys['his_other_disease']?></td>
															  <td><?php echo $historys['diabetes']?></td>
															  <td><?php echo $historys['blood_pressure']?></td>
															  <td><?php echo $historys['medicine_used_prev']?></td>
															  <td><?php echo $historys['surgery_dtl']?></td>
															  <td><?php echo $historys['smoking']?></td>
															  <td><?php echo $historys['drinking']?></td>
															  <td><?php echo $historys['hereditary_disease']?></td>
														  </tr>
															<?php } ?>
														  </tbody>
													  </table>
												  </section>
											  </div>
										  </section>
									  </div>
									</div>
									<?php }else{
										echo 'No History';
									}	
									?>
									
                                  </div>
                                  <div id="chief" class="tab-pane">
										<?php if($chiefcom != false) {?>
                                       <div class="row">
									  <div class="col-lg-12">
										  <section class="panel">
											  <header class="panel-heading">
												  Chief Complaints
											  </header>
											  <div class="panel-body">
												  <section id="flip-scroll">
													  <table class="table table-bordered table-striped table-condensed cf">
														  <thead class="cf">
														  <tr>
															  <th>Date</th>
															  <th>Complaints</th>
															  <th>How long</th>
															  <th>Problem before</th>
															  <th>Treatments</th>
														  </tr>
														  </thead>
														  <tbody>
														  <?php 
															foreach($chiefcom as $chief){
														  ?>
														  <tr>
															  <td><?php echo $chief['cc_date']?></td>
															  <td><?php echo $chief['chief_complaints_dtl']?></td>
															  <td><?php echo $chief['how_long_you_had_this_prob']?></td>
															  <td><?php echo $chief['had_this_problem_before']?></td>
															  <td><?php echo $chief['what_treatment_you_had']?></td>
														  </tr>
															<?php } ?>
														  </tbody>
													  </table>
												  </section>
											  </div>
										  </section>
									  </div>
									</div>
									<?php }else{
										echo 'No Chief Complaints';
									}	
									?>
								  </div>
                                  <div id="pain" class="tab-pane">
										<?php if($pain != false) {?>
                                       <div class="row">
									  <div class="col-lg-12">
										  <section class="panel">
											  <header class="panel-heading">
												  Pain
											  </header>
											  <div class="panel-body">
												  <section id="flip-scroll">
													  <table class="table table-bordered table-striped table-condensed cf">
														  <thead class="cf">
														  <tr>
															  <th>Date</th>
															  <th>site</th>
															  <th>Severity</th>
															  <th>nature</th>
															  <th>onset</th>
															  <th>duration</th>
															  <th>Side</th>
															  <th>Diurnal</th>
															  <th>Trigger</th>
															  <th>Aggravating</th>
															  <th>Relieving</th>
														  </tr>
														  </thead>
														  <tbody>
														  <?php 
															foreach($pain as $pains){
														  ?>
														  <tr>
															  <td><?php echo $pains['pain_date']?></td>
															  <td><?php echo $pains['severity_of_pain']?></td>
															  <td><?php echo $pains['pain_site']?></td>
															  <td><?php echo $pains['pain_nature']?></td>
															  <td><?php echo $pains['pain_onset']?></td>
															  <td><?php echo $pains['pain_duration']?></td>
															  <td><?php echo $pains['side_or_location']?></td>
															  <td><?php echo $pains['diurnal_variations']?></td>
															  <td><?php echo $pains['trigger_point']?></td>
															  <td><?php echo $pains['aggravating_factors']?></td>
															  <td><?php echo $pains['releaving_factors']?></td>
														  </tr>
															<?php } ?>
														  </tbody>
													  </table>
												  </section>
											  </div>
										  </section>
									  </div>
									</div>
									<?php }else{
										echo 'No Pain Found';
									}	
									?>
								  </div>
								  <div id="exam" class="tab-pane">
										<?php if($exam != false) {?>
                                       <div class="row">
									  <div class="col-lg-12">
										  <section class="panel">
											  <header class="panel-heading">
												  Exam
											  </header>
											  <div class="panel-body">
												  <section id="flip-scroll">
													  <table class="table table-bordered table-striped table-condensed cf">
														  <thead class="cf">
														  <tr>
															  <th>Date</th>
															  <th>BP sys/dial</th>
															  <th>Temperature</th>
															  <th>Heart rate</th>
															  <th>Respiratory rate</th>
															  <th>Built</th>
															  <th>Posture</th>
															  <th>Gait</th>
														  </tr>
														  </thead>
														  <tbody>
														  <?php 
															foreach($exam as $exams){
														  ?>
														  <tr>
															  <td><?php echo $exams['examn_date']?></td>
															  <td><?php echo $exams['bp_systolic_diastolic']?></td>
															  <td><?php echo $exams['temperature']?></td>
															  <td><?php echo $exams['heart_rate']?></td>
															  <td><?php echo $exams['respiratory_rate']?></td>
															  <td><?php echo $exams['built_of_patient']?></td>
															  <td><?php echo $exams['posture']?></td>
															  <td><?php echo $exams['gait']?></td>
														  </tr>
															<?php } ?>
														  </tbody>
													  </table>
												  </section>
											  </div>
										  </section>
									  </div>
									</div>
									<?php }else{
										echo 'No Exams Found';
									}	
									?>
									
								  </div>
								  <div id="motor" class="tab-pane">
										<?php if($motor != false) {?>
                                       <div class="row">
									  <div class="col-lg-12">
										  <section class="panel">
											  <header class="panel-heading">
												  Motor Examination
											  </header>
											  <div class="panel-body">
												  <section id="flip-scroll">
													  <table class="table table-bordered table-striped table-condensed cf">
														  <thead class="cf">
														  <tr>
															  <th>Date</th>
															  <th>View</th>
														  </tr>
														  </thead>
														  <tbody>
														  <?php 
															foreach($motor as $motors){
														  ?>
														  <tr>
															  <td><?php echo $motors['mexamn_date']?></td>
															  <td>
																<!--<a class="iframePopup" data-width="520" data-height="740" href="<?php echo base_url().'client1/iframe/edit_assessment_mexam_view/'.$this->session->userdata('patient_id').'/'.$motors['mexamn_id']; ?>"><i class="fa fa-eye"></i></a>-->
																						  
																 </td>
														  </tr>
															<?php } ?>
														  </tbody>
													  </table>
												  </section>
											  </div>
										  </section>
									  </div>
									</div>
									<?php }else{
										echo 'No Motor Exam';
									}	
									?>
									
								  </div>
								  <div id="sensory" class="tab-pane">
										<?php if($sexam != false) {?>
                                       <div class="row">
									  <div class="col-lg-12">
										  <section class="panel">
											  <header class="panel-heading">
												 Sensory Examination
											  </header>
											  <div class="panel-body">
												  <section id="flip-scroll">
													  <table class="table table-bordered table-striped table-condensed cf">
														  <thead class="cf">
														  <tr>
															  <th>Date</th>
															  <th>View</th>
														  </tr>
														  </thead>
														  <tbody>
														  <?php 
															foreach($sexam as $sexams){
														  ?>
														  <tr>
															  <td><?php echo $sexams['sexamn_date']?></td>
															  <td><button class="btn btn-success btn-xs"><i class="fa fa-eye"></i></button></td>
														  </tr>
															<?php } ?>
														  </tbody>
													  </table>
												  </section>
											  </div>
										  </section>
									  </div>
									</div>
									<?php }else{
										echo 'No Sensory Exam';
									}	
									?>
									
								  </div>
                              </div>
                          </div>
                      </section>
                  </div>
              </div>
			  <div class="row">
                  <div class="col-lg-12">
					<section class="panel">
                          <header class="panel-heading tab-bg-dark-navy-blue ">
                              <ul class="nav nav-tabs">
                                  <li class="active">
                                      <a data-toggle="tab" href="#Inves">Investigation</a>
                                  </li>
                              </ul>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                                  <div id="Inves" class="tab-pane active">
									<?php if($investigation != false) {?>
                                       <div class="row">
									  <div class="col-lg-12">
										  <section class="panel">
											  <header class="panel-heading">
												  Investigation
											  </header>
											  <div class="panel-body">
												  <section id="flip-scroll">
													  <table class="table table-bordered table-striped table-condensed cf">
														  <thead class="cf">
														  <tr>
															  <th>Date</th>
															  <th>Report Type</th>
															  <th>Documents</th>
															  <th>Description</th>
														  </tr>
														  </thead>
														  <tbody>
														  <?php 
																	$icons=array(
																		'jpg' => 'image-file.png',
																		'jpeg' => 'image-file.png',
																		'png' => 'image-file.png', 
																		'gif' => 'image-file.png', 
																		'doc' => 'doc-file.png', 
																		'docx' => 'docx-file.png', 
																		'xls' => 'excel-file.png', 
																		'xlsx' => 'excel-file.png', 
																		'pdf' => 'pdf-file.png',
																		'JPG' => 'image-file.png',
																		'JPEG' => 'image-file.png',
																		'PNG' => 'image-file.png', 
																		'GIF' => 'image-file.png', 
																		'DOC' => 'doc-file.png', 
																		'DOCX' => 'docx-file.png', 
																		'XLS' => 'excel-file.png', 
																		'XLSX' => 'excel-file.png', 
																		'PDF' => 'pdf-file.png'
																	);
															foreach($investigation as $investigations){
																$scan=explode(".",$investigations['document']);
																$scan_filetype = end($scan);
														  ?>
														  <tr>
															  <td><?php echo $investigations['inves_date']?></td>
															  <td><?php echo $investigations['report_type']?></td>
															  <td><a target="_blank" href="<?php echo base_url().'uploads/patient/investigation/'.$investigations['document']; ?>"><img width="32" src="<?php if($investigations['document']!='') echo base_url().'img/'.$icons[$scan_filetype]; ?>"></a></td>
															  <td><?php echo $investigations['description']?></td>
														  </tr>
															<?php } ?>
														  </tbody>
													  </table>
												  </section>
											  </div>
										  </section>
									  </div>
									</div>
									<?php }else{
										echo 'No Investigation';
									}	
									?>
                                  </div>
                              </div>
                          </div>
                      </section>
                  </div>
              </div>
		<?php }if(strpos($pri,'2')){
			?>
			   <div class="row">
                  <div class="col-lg-12">
					<section class="panel">
                          <header class="panel-heading tab-bg-dark-navy-blue ">
                              <ul class="nav nav-tabs">
                                  <li class="active">
                                      <a data-toggle="tab" href="#provisional">Provisional Diagnosis</a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#goals">Goals</a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#treatment">Treatment</a>
                                  </li>
                              </ul>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                                  <div id="provisional" class="tab-pane active">
									<?php if($provisional != false) {?>
                                       <div class="row">
									  <div class="col-lg-12">
										  <section class="panel">
											  <header class="panel-heading">
												  Provisional Diagnosis
											  </header>
											  <div class="panel-body">
												  <section id="flip-scroll">
													  <table class="table table-bordered table-striped table-condensed cf">
														  <thead class="cf">
														  <tr>
															  <th>Date</th>
															  <th>Provisional Diagnosis</th>
														  </tr>
														  </thead>
														  <tbody>
														  <?php 
															foreach($provisional as $provisionals){
														  ?>
														  <tr>
															  <td><?php echo $provisionals['pd_date']?></td>
															  <td><?php echo $provisionals['prov_diagnosis']?></td>
														  </tr>
															<?php } ?>
														  </tbody>
													  </table>
												  </section>
											  </div>
										  </section>
									  </div>
									</div>
									<?php }else{
										echo 'No Provisional Diagnosis';
									}	
									?>
									
                                  </div>
                                  <div id="goals" class="tab-pane">
										<?php if($goal != false) {?>
                                       <div class="row">
									  <div class="col-lg-12">
										  <section class="panel">
											  <header class="panel-heading">
												  Progress Notes
											  </header>
											  <div class="panel-body">
												  <section id="flip-scroll">
													  <table class="table table-bordered table-striped table-condensed cf">
														  <thead class="cf">
														  <tr>
															  <th>Date</th>
															  <th>Short term goals 1</th>
															  <th>Short term goals 2</th>
															  <th>Short term goals 3</th>
															  <th>Long term goals 1</th>
															  <th>Long term goals 2</th>
															  <th>Long term goals 3</th>
														  </tr>
														  </thead>
														  <tbody>
														  <?php 
															foreach($goal as $goals){
														  ?>
														  <tr>
															  <td><?php echo $goals['goal_date']?></td>
															  <td><?php echo $goals['short_term_goals1']?></td>
															  <td><?php echo $goals['short_term_goals2']?></td>
															  <td><?php echo $goals['short_term_goals3']?></td>
															  <td><?php echo $goals['long_term_goals1']?></td>
															  <td><?php echo $goals['long_term_goals2']?></td>
															  <td><?php echo $goals['long_term_goals3']?></td>
														  </tr>
															<?php } ?>
														  </tbody>
													  </table>
												  </section>
											  </div>
										  </section>
									  </div>
									</div>
									<?php }else{
										echo 'No Goal';
									}	
									?>
								  </div>

                                  <div id="treatment" class="tab-pane">
										<?php if($treatment != false) {?>
                                       <div class="row">
									  <div class="col-lg-12">
										  <section class="panel">
											  <header class="panel-heading">
												  Treatment Protocols
											  </header>
											  <div class="panel-body">
												  <section id="flip-scroll">
													  <table class="table table-bordered table-striped table-condensed cf">
														  <thead class="cf">
														  <tr>
															  <th>Date</th>
															  <th>Treatment</th>
															  <th>Quantity</th>
															  <th>Price</th>
															  <th>Consultant</th>
															  <th>Status</th>
														  </tr>
														  </thead>
														  <tbody>
														  <?php 
															foreach($treatment as $treatments){
														  ?>
														  <tr>
															  <td><?php echo $treatments['treatment_date']?></td>
															  <td><?php echo $treatments['itemName']?></td>
															  <td><?php echo $treatments['treatmentQuantity']?></td>
															  <td><?php echo $treatments['treatmentPrice']?></td>
															  <td><?php echo $treatments['staffName']?></td>
															  <td>
																<?php 
																	if($treatments['bill_status'] == 0) {
																		echo '<span class="label label-danger">Due</span>';
																	}else{
																		echo '<span class="label label-success">Paid</span>';
																	}
																?>
															  </td>
														  </tr>
															<?php } ?>
														  </tbody>
													  </table>
												  </section>
											  </div>
										  </section>
									  </div>
									</div>
									<?php }else{
										echo 'No Remarks';
									}	
									?>
									
								  </div>
                              </div>
                          </div>
                      </section>
                  </div>
		</div><?php } ?>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
               2015 &copy; Patient Portal Physio Plus Tech.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url() ?>patient/js/jquery.js"></script>
    <script src="<?php echo base_url() ?>patient/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url() ?>patient/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url() ?>patient/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url() ?>patient/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>patient/assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="<?php echo base_url() ?>patient/js/respond.min.js" ></script>

    <!--common script for all pages-->
    <script src="<?php echo base_url() ?>patient/js/common-scripts.js"></script>

  <script>

      //knob
      $(".knob").knob();

  </script>


  </body>
</html>