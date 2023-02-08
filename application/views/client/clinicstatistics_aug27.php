<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Language" content="en">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Dashboard - Physio Plus Tech</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
	/>
	<meta name="msapplication-tap-highlight" content="no">
	<link href="<?php echo base_url()?>my_assets/main.css" rel="stylesheet">
	<link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/daterangepicker-bs3.css" />
	<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.peity.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.colorbox-min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/moment.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/daterangepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/amcharts.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/serial.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pie.js"></script>
	<script src="<?php echo base_url() ?>assets/sweet-alert/sweetalert.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/sweet-alert/sweetalert.css">
	<link rel="stylesheet" href="https://simeydotme.github.io/jQuery-ui-Slider-Pips/dist/css/jqueryui.min.css">
	<link rel="stylesheet" href="https://rawgit.com/simeydotme/jQuery-ui-Slider-Pips/master/dist/jquery-ui-slider-pips.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/nps_score.css">
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
			.table-responsive {
				display: none;
			}
		}
		img
		{
			vertical-align:middle;
		}

		#tab-content-1 .widget-number
		{
			font-size:large;
		}

	</style>
</head>

<body>

	<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
		<?php include("sidebar.php");?>
		<div class="app-main__outer">
			<div class="app-main__inner">
				<div class='col-md-12'>
					<div class="row">
						
						<div class="col-md-5 col-sm-6 col-xs-12">
							<?php if(isset($npscore) && $npscore > 0){?>
								<a href="<?=base_url()?>client/dashboard/staff_nps" target="_blank" style='cursor: pointer;'>
									<div class="info-box">
										<!-- Apply any bg-* class to to the icon to color it -->
										<span class="info-box-icon bg-aqua"><b>Patient Satisfaction Score</b></span>
										<div class="info-box-content">
											<!--<span class="info-box-text">NPS Score</span>-->
											<!--<span class="info-box-number">93,139</span>-->
											<div class="pl-5 pr-1">
												
												<div id="pips-slider"></div>
												
											</div>
											
											
										</div>
										<!-- /.info-box-content -->
									</div>
								</a>
							<?php } ?>
						</div>
						
					<!--<div class="col-md-2 col-sm-6 col-xs-12 pull-right" ></div>
					<div class="col-md-5 col-sm-6 col-xs-12 pull-right" style=''>
						<button class="btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-secondary" style="margin-left: 26%;"><a href="<?php echo base_url().'client/settings/index#step-10' ?>"><strong><img src="<?php echo base_url().'images/google_integrate_button.png'?>" style="width:200px; height:37px;"></img></strong></a></button>
						<div class="col-md-3  pull-right">
						<a href="<?php echo base_url().'client/dashboard/invite_earn' ?>"><strong><img src="<?php echo base_url().'assets/Invite & Earn.png'?>" style="width:45px; height:36px;"></img></strong></a>
						</div>
					</div>-->
					<div class="col-md-6 col-sm-6 col-xs-6 " style=''>
						<div class="row">
							<div class="col-md-5 col-sm-6 col-xs-6 mb-2">	
								<button class="btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-secondary"><a href="<?php echo base_url().'client/settings/index#step-10' ?>"><strong><img src="<?php echo base_url().'images/google_integrate_button.png'?>" style="width:200px; height:40px;"></img></strong></a></button>
							</div>
								<div class="col-md-6 col-sm-6 col-xs-6 pull-right" style="margin-left: 31px;">
									<a href="<?php echo base_url().'client/dashboard/invite_earn' ?>"class='btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-secondary' style="height:54px;">
										<!--<img src="<?php echo base_url().'assets/Invite & Earn.png'?>" style="width:45px; height:36px;"></img><a href="<?php echo base_url().'client/dashboard/invite_earn' ?>">--><i class="fas fa-coins fa-2x" style='color:blueviolet;line-height:43px'>&nbsp;&nbsp;Invite & Earn</i>
									</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-85" style="width:80%;">					 
							<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
								
								<li class="nav-item">
									<a class="nav-link print_tab active" href="#tab-content-1" id="tab-1" data-toggle="tab" aria-selected="true" >
										<span>Todays List</span>
										<span style="display:none;"><?php echo $this->session->userdata('token'); ?></span>

									</a>
								</li>
								
								<?php if($admin != false &&  !$this->session->userdata('staff_id')){  ?>
									<li class="nav-item">
										<a class="nav-link clinic_tab" href="#tab-content-0" id="tab-1" data-toggle="tab" aria-selected="true" >
											<span>Super Admin Dashboard</span>
										</a>
									</li>  
								<?php } ?>
								<?php if($this->app_access->check_user_privileges('Clinic Statistics') ){ ?>
									<li class="nav-item">
										<a  class="nav-link" href="<?php echo base_url()?>client/dashboard/home1">
											<span>Clinic Statistics</span>
										</a>
									</li>
								<?php } ?>
							</ul>
						</div>
					<!--<div class="print col" id="print" style="margin-left: -90px;margin-top:11px;margin-top: -25px;"><div style="float:right;" ><button class="btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-secondary"><a href="<?php echo base_url().'client/settings/index#step-10' ?>"><strong><img src="<?php echo base_url().'images/google_integrate_button.png'?>" style="width:200px; height:37px;"></img></strong></a></button></div>
					 </div>
					 <div class="print col" id="print"></br><div style="float:right;margin-top: -25px;" ><a href="<?php echo base_url().'client/dashboard/invite_earn' ?>"><strong><img src="<?php echo base_url().'assets/Invite & Earn.png'?>" style="width:45px; height:36px;"></img></strong></a>&nbsp;&nbsp;&nbsp;</div></div><div class="print col" id="print" style="float:right;display:none;"></br><div style="float:right;" ><a class="btn btn-shadow btn-alternate" href="<?php echo base_url().'client/clinical_summary/report_print' ?>" target="_blank"><strong>Print</strong></a>&nbsp;&nbsp;&nbsp;</div></div>-->
												</div>		
												<div class="tab-content">
													<div class="tab-pane tabs-animation fade show" id="tab-content-0" role="tabpanel">
														<h4 style="color:black;" >Main Branch</h4>
														<div class="row">
															<div class="col-lg-12">
																<div class="main-card mb-3">
																	<div class="row">
																		<div class="col-sm-12 col-md-6 col-xl-3">
																			<div class="card mb-3 widget-chart">
																				<div class="widget-chart-content">
																					<img src="<?php echo base_url().'iconsforreportsection/schedule.png'; ?>" width="45px;" height="50px;">
																					<div class="widget-numbers">
																						<span><?php echo $today_schedule; ?></span>
																					</div>
																					<div class="widget-subheading fsize-1 pt-2 opacity-10 text-success font-weight-bold">Today's Appointments</div>
																				</div>
																				
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-6 col-xl-3">
																			<div class="card mb-3 widget-chart">
																				<div class="widget-chart-content">
																					<img src="<?php echo base_url().'iconsforreportsection/patients.png'; ?>" width="45px;" height="50px;">
																					<div class="widget-numbers">
																						<span><?php echo $t4;?></span>
																					</div>
																					<div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">Today's Patients</div>
																					
																				</div>
																				
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-6 col-xl-3">
																			<div class="card mb-3 widget-chart">
																				<div class="widget-chart-content">
																					<img src="<?php echo base_url().'iconsforreportsection/Income flat icon.png'; ?>" width="45px;" height="50px;">
																					<div class="widget-numbers"><span><?php echo 'Rs '.number_format($T_incomeAmt+$adv); ?></span></div>
																					<div class="widget-subheading fsize-1 pt-2 opacity-10 text-danger font-weight-bold">
																						Today's Income
																					</div>
																					
																				</div>
																				
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-12 col-xl-3">
																			<div class="card mb-3 widget-chart">
																				<div class="widget-chart-content">
																					<img src="<?php echo base_url().'iconsforreportsection/Expense Flat icon.png' ?>" width="45px;" height="50px;">
																					<div class="widget-numbers"><span><?php echo 'Rs '.number_format($T_expenseAmt); ?></span></div>
																					<div class="widget-subheading fsize-1 pt-2 opacity-10 text-info font-weight-bold">Today's  Expense</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<?php if($admin != false){ foreach($admin as $row){ ?>
															<h4 style="color:black;" ><?php echo $row['branch_name'];
															$this->db->where('status','0');
															$this->db->select('count(appointment_id) as totalcount')->from('tbl_appointments')->where('client_id', $row['client_id']);
															$this->db->where('appointment_from',date('Y-m-d'));
															$query = $this->db->get();
															$c = $query->row()->totalcount;
															
															$this->db->distinct();
															$this->db->where('client_id',$row['client_id']);
															$this->db->where('appoint_date',date('Y-m-d'));
															$this->db->select('count(patient_id) as totalcount')->from('tbl_patient_info');
															$this->db->group_by('patient_id');
															$query1=$this->db->get();
															if($query1->result_array() != false){
																$c1 = $query1->row()->totalcount;
															} else { $c1 =0;
															}
															$this->db->where('client_id',$row['client_id']);
															$this->db->where('sn_date',date('Y-m-d'));
															$this->db->select('count(patient_id) as totalcount1')->from('tbl_session_det');
															$this->db->group_by('patient_id');
															$query11=$this->db->get();
															if($query11->result_array() != false){
																$c2 = $query11->row()->totalcount1;
															} else { $c2 =0;
															}
															
															$this->db->where('client_id',$row['client_id']);
															$this->db->where('appoint_date',date('Y-m-d'));
															$this->db->where('home_visit',2);
															$this->db->select('count(patient_id) as totalcount2')->from('tbl_patient_info');
															$this->db->group_by('patient_id');
															$query111=$this->db->get();
															if($query111->result_array() != false){
																$c3 = $query111->row()->totalcount2;
															} else { $c3 =0;
															}
															
															$this->db->distinct();
															$this->db->where('client_id',$row['client_id']);
															$this->db->where('treatment_date',date('Y-m-d'));
															$this->db->select('count(patient_id) as totalcount3')->from('tbl_patient_treatment_techniques');
															$this->db->group_by('patient_id');
															$query121=$this->db->get();
															if($query121->result_array() != false){
																$c4 = $query121->row()->totalcount3;
															} else { $c4 =0;
															}
															$apt = $c1 + $c2 + $c3 + $c4;
															
															$this->db->select('SUM(paid_amt) AS pamount')->from('tbl_invoice_header')->where('client_id', $row['client_id']);
															$this->db->where('cheque_date',date('Y-m-d'));
															$query = $this->db->get();
															$T_incomeAmt1 = $query->row()->pamount;
															
															$this->db->where('ai.client_id',$row['client_id']);
															$this->db->where('ai.advance_date',date('Y-m-d'));
															$this->db->select('SUM(ai.advance_amount) as advance_amount')->from('tbl_patient_advance ai');
															$this->db->join('tbl_patient_info pi','pi.patient_id=ai.patient_id');
															$query = $this->db->get();
															if($query->result_array() != false){
																$adv1= $query->row()->advance_amount;
															} else {
																$adv1= 0;
															}
															
															$this->db->where('client_id',$row['client_id']);
															$this->db->select('SUM(total_amt) AS amount')->from('tbl_expanse')->where('client_id', $this->session->userdata('client_id'));
															$this->db->where('bill_date',date('Y-m-d'));
															$query = $this->db->get();
															$T_expenseAmt1 = $query->row()->amount;
															
															
															?></h4>
															<div class="row">
																<div class="col-lg-12">
																	<div class="main-card mb-3">
																		<div class="row">
																			<div class="col-sm-12 col-md-6 col-xl-3">
																				<div class="card mb-3 widget-chart">
																					<div class="widget-chart-content">
																						<img src="<?php echo base_url().'iconsforreportsection/schedule.png'; ?>" width="45px;" height="50px;">
																						<div class="widget-numbers">
																							<span><?php echo $c; ?></span>
																						</div>
																						<div class="widget-subheading fsize-1 pt-2 opacity-10 text-success font-weight-bold">Today's Appointments</div>
																					</div>
																					
																				</div>
																			</div>
																			<div class="col-sm-12 col-md-6 col-xl-3">
																				<div class="card mb-3 widget-chart">
																					<div class="widget-chart-content">
																						<img src="<?php echo base_url().'iconsforreportsection/patients.png'; ?>" width="45px;" height="50px;">
																						<div class="widget-numbers">
																							<span><?php echo $apt;?></span>
																						</div>
																						<div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">Today's Patients</div>
																						
																					</div>
																					
																				</div>
																			</div>
																			<div class="col-sm-12 col-md-6 col-xl-3">
																				<div class="card mb-3 widget-chart">
																					<div class="widget-chart-content">
																						<img src="<?php echo base_url().'iconsforreportsection/Income flat icon.png'; ?>" width="45px;" height="50px;">
																						<div class="widget-numbers"><span><?php echo 'Rs '.number_format($T_incomeAmt1+$adv1); ?></span></div>
																						<div class="widget-subheading fsize-1 pt-2 opacity-10 text-danger font-weight-bold">
																							Today's Income
																						</div>
																						
																					</div>
																					
																				</div>
																			</div>
																			<div class="col-sm-12 col-md-12 col-xl-3">
																				<div class="card mb-3 widget-chart">
																					<div class="widget-chart-content">
																						<img src="<?php echo base_url().'iconsforreportsection/Expense Flat icon.png' ?>" width="45px;" height="50px;">
																						<div class="widget-numbers"><span><?php echo 'Rs '.number_format($T_expenseAmt1); ?></span></div>
																						<div class="widget-subheading fsize-1 pt-2 opacity-10 text-info font-weight-bold">Today's  Expense</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														<?php } } ?>
													</div>
													<div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
														<div class="row">
															<div class="col-lg-12">
																<div class="main-card mb-3 card">
																	<div class="tabs-lg-alternate card-header">
																		<ul class="nav nav-justified">
																			<li class="nav-item">
																				<a href="#tab-minimal-2" data-toggle="tab" class="nav-link active minimal-tab-btn-2">
																					<img src="<?php echo base_url().'iconsforreportsection/schedule.png'; ?>" width="45px;" height="50px;">
																					<div class="widget-number one">
																						<span><?php echo $today_schedule.' '.'Appointments'; ?></span>
																					</div>
																					<div class="tab-subheading">Appointments Booked</div>
																					<div class="widget-number mob">
																						<span><?php echo $today_schedule ?></span>
																					</div>
																				</a>
																			</li>
																			<li class="nav-item">
																				<a href="#tab-minimal-1" data-toggle="tab" class="nav-link  minimal-tab-btn-1">
																					<img src="<?php echo base_url().'iconsforreportsection/patients.png'; ?>" width="45px;" height="50px;">
																					<div class="widget-number one"><span><?php echo $t4.''.$t1.' Patients';?></span></div>
																					<div class="tab-subheading">
																						Today's Patients 
																					</div>
																					<div class="widget-number mob"><span><?php echo $t4.' '.$t1?></span></div>
																				</a>
																			</li>
																			<li class="nav-item">
																				<a href="#tab-minimal-3" data-toggle="tab" class="nav-link minimal-tab-btn-3">
																					<img src="<?php echo base_url().'iconsforreportsection/Income flat icon.png'; ?>" width="45px;" height="50px;">
																					<div class="widget-number one">
																						<!--<span>Income(<img src="<?php echo base_url().'icon/income1.png'; ?>" width="20px;" height="25px;"><?php echo ') : '.number_format($T_incomeAmt+$adv); ?></span>-->
																						<span>Income(<img src="<?php echo base_url().'icon/income1.png'; ?>" width="20px;" height="25px;"><?php echo ') : '.number_format($T_incomeAmt); ?>+<?php echo number_format($adv);?></span>
																					</div>
																					<div class="tab-subheading">Today's Income</div>
																					<div class="widget-number mob">
																						<!--<span>Income(<img src="<?php echo base_url().'icon/income1.png'; ?>" width="20px;" height="25px;"><?php echo ') : '.number_format($T_incomeAmt+$adv); ?></span>-->
																						<span><img src="<?php echo base_url().'icon/income1.png'; ?>" width="20px;" height="25px;"><?php echo ' '.number_format($T_incomeAmt); ?>+<?php echo number_format($adv);?></span>
																					</div>
																				</a>
																			</li>
																			<li class="nav-item">
																				<a href="#tab-minimal-4" data-toggle="tab" class="nav-link minimal-tab-btn-4">
																					<img src="<?php echo base_url().'iconsforreportsection/Expense Flat icon.png' ?>" width="45px;" height="50px;">
																					<div class="widget-number one">
																						<span>Expense(<img src="<?php echo base_url().'icon/expense1.png'; ?>" width="19px;" height="25px;"><?php echo ') : '.number_format($T_expenseAmt); ?></span>
																					</div>
																					<div class="tab-subheading">
																						Today's  Expense
																					</div>
																					<div class="widget-number mob">
																						<span><img src="<?php echo base_url().'icon/expense1.png'; ?>" width="19px;" height="25px;"><?php echo ' '.number_format($T_expenseAmt); ?></span>
																					</div>
																				</a>
																			</li>
																			
																		</ul>
																	</div>
																	<div class="tab-content">
																		<div class="tab-pane fade" id="tab-minimal-1">
																			<div class="card-body">
																				<div class="card-header">
																					<?php $this->db->where('client_id',$this->session->userdata('client_id'));
																					$this->db->where('appoint_date',date('Y-m-d'));
																					$this->db->where('home_visit',1);
																					$this->db->select('patient_id')->from('tbl_patient_info');
																					$query=$this->db->get(); 
																					$n1 = $query->num_rows(); ?>
																					<div class="card-title" style="text-transform:capitalize;float:left;">Today's New OP Patient List ( <?php echo $n1; ?> )</div>
																					<div class="btn-actions-pane-right">
																						<div ><a style="color:black;" class="btn btn-shadow btn-warning ml-2" href="<?php echo base_url().'client/patient/index' ?>"  ><strong>Add New Patient</strong></a>
																						</div>
																					</div>
																				</div>
																				<div class="table-responsive">
																					
																					<table class="table table-striped table-bordered">
																						<thead>
																							
																							<tr>
																								<th class="text-center">Patient Name</th>
																								<th class="text-center">Mobile No</th>
																								<th class="text-center">Email</th>
																								<th class="text-center">Address</th>
																								
																							</tr>
																						</thead>
																						<tbody>
																							
																							<tr>
																								<?php if($tot_list != false){ ?>
																									<?php foreach ($tot_list as $row) {
																										$CI =& get_instance();
																										$CI->load->model(array('registration_model'));
																										$summary = $CI->registration_model->get_summary($row['patient_id']);
																										$history = $CI->registration_model->get_history($row['patient_id']);
																										$complaints = $CI->registration_model->get_complaints($row['patient_id']);
																										$treatments = $CI->registration_model->get_treatment($row['patient_id']);
																										$next_visit = $CI->registration_model->get_visit($row['patient_id']);
																										$pay = $CI->registration_model->get_pay($row['patient_id']);
																										
																										if($summary['age'] == '' || $summary['age'] == '0'){ $age = 'Age'; }else { $age = $summary['age'];}
																										if($history['medical'] == ''){ $medical = '..........'; }else { $medical = $history['medical'];}
																										if($complaints['chief_complaints_dtl'] == ''){ $chief_complaints_dtl = '..........'; }else { $chief_complaints_dtl = $complaints['chief_complaints_dtl']; }
																										if($treatments['item_name'] == ''){ $treatment = '..........'; }else { $treatment = $treatments['item_name']; }
																										
																										$v = '<b>Summary</b> : '.$age.'/'.$summary['gender'];												
																										$v1 = '<b>History </b>: '.$medical;
																										$v2 = '<b>Complaints</b> : '.$chief_complaints_dtl;												
																										$v3 = '<b>Treatment </b>: '.$treatment;												
																										$v4 = '<b>Next Visit </b>: '.$next_visit;												
																										$v5 = '<b>Payment </b>: Rs : '.$pay;
																										
																										?>
																										<!--<td class="text-center"><a href="<?php echo base_url().'client/patient/view/'.$row['patient_id'] ?>"><?php echo $row['first_name'].'  '.$row['last_name']; ?></a></td>-->
																										<td class="text-center"><a data-toggle="tooltip" data-placement="left" data-html="true" title="<?php echo $v.'</br></br>'.$v1.'</br></br>'.$v2.'</br></br>'.$v3.'</br></br>'.$v4.'</br></br>'.$v5; ?>" href="<?php echo base_url().'client/patient/view/'.$row['patient_id'] ?>"> <img src="<?php echo base_url().'img/pngwing.png' ?>" style="width:30px; height:30px;" ></img> <?php echo $row['first_name'].'  '.$row['last_name']; ?></a></td>
																										<td class="text-center"><a href="<?php echo 'https://api.whatsapp.com/send?l=en&phone=91'.$row['mobile_no']; ?>" target="_blank"><img src="<?php echo base_url().'img/whatsapp Logo.png' ?>" style="width:18px; height:18px;" ></img> <?php echo $row['mobile_no']; ?></a></td>
																										<td class="text-center"><?php echo $row['email']; ?></td>
																										<td class="text-center"><?php echo $row['address_line1']; ?></td>
																									</tr>
																								<?php } } ?>
																								<tr><td colspan="5"><center> No More Records </center></td></tr>
																							</tbody>
																						</table>
																						
																						<?php $this->db->where('client_id',$this->session->userdata('client_id'));
																						$this->db->where('appoint_date',date('Y-m-d'));
																						$this->db->where('home_visit',2);
																						$this->db->select('patient_id')->from('tbl_patient_info');
																						$query=$this->db->get(); 
																						$n2 = $query->num_rows(); ?>
																						<div class="card-title" style="text-transform:capitalize;float:left;">&nbsp;&nbsp;&nbsp;&nbsp;Today's New Home Patient List ( <?php echo $n2; ?> )</div>
																						
																						<table class="table table-striped table-bordered">
																							<thead>
																								
																								<tr>
																									<th class="text-center">Patient Name</th>
																									<th class="text-center">Mobile No</th>
																									<th class="text-center">Email</th>
																									<th class="text-center">Address</th>
																									
																								</tr>
																							</thead>
																							<tbody>
																								
																								<tr>
																									<?php if($tot_list_home != false){ ?>
																										<?php foreach ($tot_list_home as $row) {
																											$CI =& get_instance();
																											$CI->load->model(array('registration_model'));
																											$summary = $CI->registration_model->get_summary($invoice_records['patient_id']);
																											$history = $CI->registration_model->get_history($invoice_records['patient_id']);
																											$complaints = $CI->registration_model->get_complaints($invoice_records['patient_id']);
																											$treatments = $CI->registration_model->get_treatment($invoice_records['patient_id']);
																											$next_visit = $CI->registration_model->get_visit($invoice_records['patient_id']);
																											$pay = $CI->registration_model->get_pay($invoice_records['patient_id']);
																											
																											if($summary['age'] == '' || $summary['age'] == '0'){ $age = 'Age'; }else { $age = $summary['age'];}
																											if($history['medical'] == ''){ $medical = '..........'; }else { $medical = $history['medical'];}
																											if($complaints['chief_complaints_dtl'] == ''){ $chief_complaints_dtl = '..........'; }else { $chief_complaints_dtl = $complaints['chief_complaints_dtl']; }
																											if($treatments['item_name'] == ''){ $treatment = '..........'; }else { $treatment = $treatments['item_name']; }
																											
																											$v = '<b>Summary</b> : '.$age.'/'.$summary['gender'];												
																											$v1 = '<b>History </b>: '.$medical;
																											$v2 = '<b>Complaints</b> : '.$chief_complaints_dtl;												
																											$v3 = '<b>Treatment </b>: '.$treatment;												
																											$v4 = '<b>Next Visit </b>: '.$next_visit;												
																											$v5 = '<b>Payment </b>: Rs : '.$pay;	
																											
																											?>
																											<!--<td class="text-center"><a href="<?php echo base_url().'client/patient/view/'.$row['patient_id'] ?>"><?php echo $row['first_name'].'  '.$row['last_name']; ?></a></td>-->
																											<td class="text-center"><a data-toggle="tooltip" data-placement="left" data-html="true" title="<?php echo $v.'</br></br>'.$v1.'</br></br>'.$v2.'</br></br>'.$v3.'</br></br>'.$v4.'</br></br>'.$v5; ?>" href="<?php echo base_url().'client/patient/view/'.$row['patient_id'] ?>" data-toggle="tooltip" data-placement="top" title="Delete"> <img src="<?php echo base_url().'img/pngwing.png' ?>" style="width:30px; height:30px;" ></img> <?php echo $row['first_name'].'  '.$row['last_name']; ?></a></td>
																											<td class="text-center"><a href="<?php echo 'https://api.whatsapp.com/send?l=en&phone=91'.$row['mobile_no']; ?>" target="_blank"><img src="<?php echo base_url().'img/whatsapp Logo.png' ?>" style="width:18px; height:18px;" ></img> <?php echo $row['mobile_no']; ?></a></td>
																											<td class="text-center"><?php echo $row['email']; ?></td>
																											<td class="text-center"><?php echo $row['address_line1']; ?></td>
																										</tr>
																									<?php } } ?>
																									<tr><td colspan="5"><center> No More Records </center></td></tr>
																								</tbody>
																							</table>
																							<?php $this->db->select('*');
																							$this->db->from("tbl_patient_treatment_techniques");
																							$this->db->where('client_id',$this->session->userdata('client_id'));
																							$this->db->where('treatment_date',date('Y-m-d'));
																							$this->db->group_by('patient_id');
																							$query3 = $this->db->get();
																							$n3 = $query3->num_rows(); ?>  
																							<div class="card-title" style="text-transform:capitalize;float:left;">&nbsp;&nbsp;&nbsp;&nbsp;Treatment Protocols Wise ( <?php echo $n3; ?> )</div>
																							
																							<table class="table table-striped table-bordered">
																								<thead>
																									<tr>
																										<th class="text-center">Patient Name</th>
																										<th class="text-center">Date</th>
																										<th class="text-center">Treatment Name</th>
																										<th class="text-center">Consultant</th>
																										<th class="text-center">Session</th>
																										<th class="text-center">Action</th>
																										
																									</tr>
																								</thead>
																								<tbody>
																									<?Php if($result != false) {
																										foreach($result as $row){ 
																											
																											$CI =& get_instance();
																											$CI->load->model(array('registration_model'));
																											$summary = $CI->registration_model->get_summary($row['patient_id']);
																											$history = $CI->registration_model->get_history($row['patient_id']);
																											$complaints = $CI->registration_model->get_complaints($row['patient_id']);
																											$treatments = $CI->registration_model->get_treatment($row['patient_id']);
																											$next_visit = $CI->registration_model->get_visit($row['patient_id']);
																											$pay = $CI->registration_model->get_pay($row['patient_id']);
																											
																											if($summary['age'] == '' || $summary['age'] == '0'){ $age = 'Age'; }else { $age = $summary['age'];}
																											if($history['medical'] == ''){ $medical = '..........'; }else { $medical = $history['medical'];}
																											if($complaints['chief_complaints_dtl'] == ''){ $chief_complaints_dtl = '..........'; }else { $chief_complaints_dtl = $complaints['chief_complaints_dtl']; }
																											if($treatments['item_name'] == ''){ $treatment = '..........'; }else { $treatment = $treatments['item_name']; }
																											
																											$v = '<b>Summary</b> : '.$age.'/'.$summary['gender'];												
																											$v1 = '<b>History </b>: '.$medical;
																											$v2 = '<b>Complaints</b> : '.$chief_complaints_dtl;												
																											$v3 = '<b>Treatment </b>: '.$treatment;												
																											$v4 = '<b>Next Visit </b>: '.$next_visit;												
																											$v5 = '<b>Payment </b>: Rs : '.$pay;
																											
																											$this->db->where('sn_date',$row['treatment_date']);
																											$this->db->where('patient_id',$row['patient_id']);
																											$this->db->select('sn_id')->from('tbl_session_det');
																											$res = $this->db->get();
																											if($res->result_array() != false) {  } else {
																												?>												
																												<tr>
																													
																													<!--<td class="text-center"><a href="<?php echo base_url().'client/patient/view/'.$row['patient_id'] ?>"><?php echo $row['first_name'].' '.$row['last_name']; ?></a></td>-->
																													
																													<td class="text-center"><a data-toggle="tooltip" data-placement="left" data-html="true" title="<?php echo $v.'</br></br>'.$v1.'</br></br>'.$v2.'</br></br>'.$v3.'</br></br>'.$v4.'</br></br>'.$v5; ?>" href="<?php echo base_url().'client/patient/view/'.$row['patient_id'] ?>"><img src="<?php echo base_url().'img/pngwing.png' ?>" style="width:30px; height:30px;" ></img> <?php echo $row['first_name'].' '.$row['last_name']; ?></a></td> 
																													<td class="text-center"><?php echo $row['treatment_date']; ?></td>
																													
																													<td class="text-center"><?php echo $row['treatment_date']; ?></td>
																													<td class="text-center"><?php echo $row['item_name'];?></td>
																													<?php  $this->db->select('*')->from('tbl_staff_info');
																													$this->db->where('staff_id',$row['staff_id']);
																													$query=$this->db->get();
																													$name = $query->row()->first_name; ?>
																													<td class="text-center"><?php echo $name;?></td>
																													<td class="text-center"><?php echo $row['treatment_quantity'];?></td>
																													<td class="text-center">
																														<a href="<?php echo base_url().'client/invoice/add/Pt/'.$row['patient_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Invoice"><i class="fa fa-file"></i></button></a>
																														<a href="<?php echo base_url().'client/renewal/print_reports/'.$this->session->userdata('client_id').'/'.$row['patient_id']; ?>" target="_blank"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-alternate" data-toggle="tooltip" data-placement="top" title="Reports"><i class="fa fa-print"></i></button></a>
																														<a class="edit" href="<?php echo base_url().'client/reports/report_session/'.$row['patient_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="Daily Register"><i class="fa fa-check"></i></button></a>
																														
																													</td>
																												</tr>
																											<?php } } } ?>
																											
																											<tr><td colspan="7"><center> No More Records </center></td></tr>
																										</tbody>
																									</table>
																									<?php $this->db->select('*');
																									$this->db->from("tbl_session_det");
																									$this->db->where('client_id',$this->session->userdata('client_id'));
																									$this->db->where('sn_date',date('Y-m-d'));
																									$this->db->group_by('patient_id');
																									$query4 = $this->db->get(); 
																									$n4 = $query4->num_rows(); ?>										
																									<div class="card-title" style="text-transform:capitalize;float:left;">&nbsp;&nbsp;&nbsp;&nbsp;Today's Daily Register List ( <?php echo $n4; ?> )</div>
																									
																									<table class="table table-striped table-bordered">
																										<thead>
																											
																											<tr>
																												<th class="text-center">Patient Name</th>
																												<th class="text-center">Staff Name</th>
																												<th class="text-center">Treatment</th>
																												<th class="text-center">Session</th>
																												<th class="text-center">Comments</th> 
																											</tr>
																										</thead>
																										<tbody>
																											
																											<tr>
																												<?php if($session != false){ ?>
																													<?php foreach ($session as $row) {
																														
																														$CI =& get_instance();
																														$CI->load->model(array('registration_model'));
																														$summary = $CI->registration_model->get_summary($row['patient_id']);
																														$history = $CI->registration_model->get_history($row['patient_id']);
																														$complaints = $CI->registration_model->get_complaints($row['patient_id']);
																														$treatments = $CI->registration_model->get_treatment($row['patient_id']);
																														$next_visit = $CI->registration_model->get_visit($row['patient_id']);
																														$pay = $CI->registration_model->get_pay($row['patient_id']);
																														
																														if($summary['age'] == '' || $summary['age'] == '0'){ $age = 'Age'; }else { $age = $summary['age'];}
																														if($history['medical'] == ''){ $medical = '..........'; }else { $medical = $history['medical'];}
																														if($complaints['chief_complaints_dtl'] == ''){ $chief_complaints_dtl = '..........'; }else { $chief_complaints_dtl = $complaints['chief_complaints_dtl']; }
																														if($treatments['item_name'] == ''){ $treatment = '..........'; }else { $treatment = $treatments['item_name']; }
																														
																														$v = '<b>Summary</b> : '.$age.'/'.$summary['gender'];												
																														$v1 = '<b>History </b>: '.$medical;
																														$v2 = '<b>Complaints</b> : '.$chief_complaints_dtl;												
																														$v3 = '<b>Treatment </b>: '.$treatment;												
																														$v4 = '<b>Next Visit </b>: '.$next_visit;												
																														$v5 = '<b>Payment </b>: Rs : '.$pay;											
																														
																														$this->db->select('first_name,last_name')->from('tbl_staff_info');
																														$this->db->where('staff_id',$row['staff_id']);
																														$res = $this->db->get();
																														if($res->result_array() != false){
																															if($res->row()->last_name != ''){
																																$name =  $res->row()->first_name.' '.$res->row()->last_name;
																															} else {
																																$name =  $res->row()->first_name;
																															}  
																														} else {
																															$name ='Not Mentioned';													
																														}?>
																														<!--<td class="text-center"><a href="<?php echo base_url().'client/patient/view/'.$row['patient_id'] ?>"><?php echo $row['fpatient_name'].'  '.$row['lpatient_name']; ?></a></td>-->
																														<td class="text-center"><a data-toggle="tooltip" data-placement="left" data-html="true" title="<?php echo $v.'</br></br>'.$v1.'</br></br>'.$v2.'</br></br>'.$v3.'</br></br>'.$v4.'</br></br>'.$v5; ?>" href="<?php echo base_url().'client/patient/view/'.$row['patient_id'] ?>"><img src="<?php echo base_url().'img/pngwing.png' ?>" style="width:30px; height:30px;" ></img> <?php echo $row['fpatient_name'].'  '.$row['lpatient_name']; ?></a></td>
																														<td class="text-center"> <?php echo $name; ?></td>
																														<td class="text-center"><?php echo $row['item_name']; ?></td>
																														<td class="text-center"><?php echo $row['Session_count']; ?></td>
																														<td class="text-center"><?php echo $row['Comment_sess']; ?></td>
																													</tr>
																												<?php } } ?>
																												<tr><td colspan="5"><center> No More Records </center></td></tr>
																											</tbody>
																										</table>
																									</div>
																								</div>
																							</div>
																							<div class="tab-pane fade active show" id="tab-minimal-2">
																								<div class="card-body">
																									<div class="card-header">
																										<div class="row">
																											<div class="col-sm-6 col-6">
																												<div class="card-title" style="text-transform:capitalize;float:left;">Today's Appointments</div>
																											</div>
																											<div class="col-sm-6 col-6">
																												<div class="btn-actions-pane-right">
																													<div ><a style="color:black;" href="<?php echo base_url().'client/schedule/appointment' ?>" class="btn btn-shadow btn-warning"><strong>Add New Appointment</strong></a>
																													</div>
																												</div>
																											</div>
																										</div>
																									</div>
																									
																									<div class="add_new_patient">
																										<div class="" style="text-align: left !important;">
																											<div class="br-1">
																												<div class="row">
																													<div class="col-6 p-1">
																														<small>Patient Name</small>
																													<?php echo base_url().'client/patient/view/'.$row['patient_id'] ?>"><?php echo $row['first_name'].' '.$row['last_name']; ?>
																														<div> <?php echo $row['first_name'];?></div>
																													</div>
																													<div class="col-6 p-1 arrow">
																													<a href="<?=base_url()?>application\views\client\view_patient.php" class="fa fa-angle-left" aria-hidden="true"></a>
																													</div>
																												</div>
																												<div class="row">
																													<div class="col-5 p-1">
																														<small>Consultant Name</small>
																														<?php  $this->db->select('*')->from('tbl_staff_info');
																													$this->db->where('staff_id',$row['staff_id']);
																													$query=$this->db->get();
																													$name = $query->row()->first_name; ?>
																														<div><strong><?php echo $name;?></strong></div>
																													</div>
																													<div class="col-4 p-1">
																														<small>Time</small>
																														<div></div>
																													</div>
																													<div class="col-3 p-1" style="text-align: right !important;">
																														<small>Visit Status</small>
																														<br>

																														<div class="badge badge-pill badge-danger"></div>

																													</div>
																												</div>
																											</div>
																										</div>
																									</div>

																									<div class="table-responsive">
																										<table class="table table-striped table-bordered">
																											<thead>
																												<tr>
																													<th class="text-center"> Patient Name </th> 
																													<th class="text-center"> Time </th>
																													<th class="text-center"> Visit Status </th>
																													<th class="text-center"> Bill Status </th>
																													<th class="text-center"> Treatment Name </th>
																													<th class="text-center"> Consultant Name </th>
																													<th class="text-center"> Action </th>
																												</tr>
																											</thead>
																											<tbody>
																												<?Php if($result1 != false) {
																													foreach($result1 as $row){ 
																														$CI =& get_instance();
																														$CI->load->model(array('registration_model'));
																														$summary = $CI->registration_model->get_summary($row['patient_id']);
																														$history = $CI->registration_model->get_history($row['patient_id']);
																														$complaints = $CI->registration_model->get_complaints($row['patient_id']);
																														$treatments = $CI->registration_model->get_treatment($row['patient_id']);
																														$next_visit = $CI->registration_model->get_visit($row['patient_id']);
																														$pay = $CI->registration_model->get_pay($row['patient_id']);
																														
																														if($summary['age'] == '' || $summary['age'] == '0'){ $age = 'Age'; }else { $age = $summary['age'];}
																														if($history['medical'] == ''){ $medical = '..........'; }else { $medical = $history['medical'];}
																														if($complaints['chief_complaints_dtl'] == ''){ $chief_complaints_dtl = '..........'; }else { $chief_complaints_dtl = $complaints['chief_complaints_dtl']; }
																														if($treatments['item_name'] == ''){ $treatment = '..........'; }else { $treatment = $treatments['item_name']; }
																														
																														$v = '<b>Summary</b> : '.$age.'/'.$summary['gender'];												
																														$v1 = '<b>History </b>: '.$medical;
																														$v2 = '<b>Complaints</b> : '.$chief_complaints_dtl;												
																														$v3 = '<b>Treatment </b>: '.$treatment;												
																														$v4 = '<b>Next Visit </b>: '.$next_visit;												
																														$v5 = '<b>Payment </b>: Rs : '.$pay;
																														
																														$this->db->where('bill_id',$row['bill_id']);
																														$this->db->select('bill_status')->from('tbl_invoice_header');
																														$res = $this->db->get();
																														if($res->result_array() != false){
																															if($res->row()->bill_status != '1'){
																																$url = base_url().'client/invoice/invoice_status_update/'.$row['bill_id'].'/'.$row['patient_id'].'/'.$row['appointment_id'];
																																$val = '<div class="badge badge-pill badge-secondary">Make Payment</div>';  
																															} else {
																																$url = '';
																																$val = '<div class="badge badge-pill badge-alternate">Paid</div>';
																															}
																														}  else {
														//$url = base_url().'client/invoice/add/Pt/'.$row['patient_id'].'/'.$row['appointment_id'];
																															if($row['item_id'] != '' && $row['item_id'] != '0'){
																																$url ='#'.$row['appointment_id'];
																																$val = '<div class="badge badge-pill badge-primary make_bill" id="make_bill">Make Bill</div></a>';
																															}else{
																																$url = base_url().'client/invoice/add/Pt/'.$row['patient_id'].'/'.$row['appointment_id'];
																																$val = '<div class="badge badge-pill badge-primary new_make_bill" id="new_make_bill">Make Bill</div></a>';
																															}
																														}
																														
																														?>												
																														<tr>
																															<!--<td class="text-center"><a href="<?php echo base_url().'client/patient/view/'.$row['patient_id'] ?>" ><?php echo $row['pname'].' '.$row['pl_name']; ?></a></p></td>-->
																															<td class="text-center"><a data-toggle="tooltip" data-placement="left" data-html="true" title="<?php echo $v.'</br></br>'.$v1.'</br></br>'.$v2.'</br></br>'.$v3.'</br></br>'.$v4.'</br></br>'.$v5; ?>"href="<?php echo base_url().'client/patient/view/'.$row['patient_id'] ?>" ><img src="<?php echo base_url().'img/pngwing.png' ?>" style="width:30px; height:30px;" ></img><?php echo $row['pname'].' '.$row['pl_name']; ?></a></p></td>
																															<td class="text-center"><?php echo date('H:i',strtotime($row['start'])).' - '.date('H:i',strtotime($row['end'])); ?>&nbsp;&nbsp;&nbsp;</div></td>
																															<td class="text-center"><?php if($row['visit'] != '1'){ ?>
																																<div class="badge badge-pill badge-danger">Not Visited</div>
																																<?php } else { ?><div class="badge badge-pill badge-success">Visited</div>
																																<?php } ?></td>
																																<td class="text-center"><a href="<?php echo $url ?>"><?php echo $val; ?></a></td>
																																<td class="text-center"><?php  if($row['item_id'] != '' && $row['item_id'] != '0'){
																																	$this->db->select()->from('tbl_item');
																																	$this->db->where('item_id',$row['item_id']);  
																																	$res = $this->db->get();  
																																	if($res->result_array() != false) {
																																		$item = $res->row()->item_name; echo $item; } else { echo 'Not Mentioned'; } } else { echo 'Not Mentioned'; }  ?>
																																	</td>
																																	<td class="text-center"><?php echo $row['sname'].' '.$row['sl_name']; ?></td>
																																	<td class="text-center">
																																		<?php if($row['encounter_type'] == '2'){ ?>
																																			<a target="_blank" href="<?php echo base_url().'client/telehealthroom/join/'.$row['appointment_id'].'/'.$row['patient_id'].'/'.$row['chat_room'] ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-alternate" data-toggle="tooltip" data-placement="top" title="Video Calling"><i class="fa fa-video"> </i></button></a>
																																		<?php } ?>			
																																		<a href="<?php echo base_url().'client/schedule/reschedule1/'.$row['appointment_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Reschedule"><i class="fa fa-edit"> </i></button></a>
												<?php /* if($row['visit'] != '1'){ ?>
												  <a class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success daily_reg" data-toggle="tooltip" data-placement="top" title="Change Visit Status" href="<?php echo '#'.$row['appointment_id'].'#'.$row['pname'].' '.$row['pl_name']; ?>"><i class="fa fa-check"></i></a>
												<?php } */ ?>
												<?php if($row['visit'] != '1'){ 
													if($row['item_id']!=0){
														?>
														<a class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success daily_reg" data-toggle="tooltip" data-placement="top" title="Change Visit Status" href="<?php echo '#'.$row['appointment_id'].'#'.$row['pname'].' '.$row['pl_name']; ?>"><i class="fa fa-check"></i></a>
													<?php }else{ ?>
														<a class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="Change Visit Status" href="<?php echo base_url().'client/reports/report_session/'.$row['patient_id'].'/'.$row['staff_id'];?>"><i class="fa fa-check"></i></a>
													<?php }}?>
													<?php if($row['link']!=''){?>
														<a  href="<?=$row['link'];?>" target="_blank" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="Google Meet"><img style="width:23px; height:23px;" src="<?php echo base_url().'img/googleMeet.png' ?>" > </img></a>
													<?php } ?>
												</td>
											</tr>
										<?php } } ?>
										<tr><td colspan="8"><center> No More Records </center></td></tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="tab-minimal-3">
						<div class="card-body">
							<div class="table-responsive">
								<div class="card-header">
									<div class="card-title" style="text-transform:capitalize;float:left;">Income List</div>
									<div class="btn-actions-pane-right">
										<div><a style="color:black;" href="<?php echo base_url().'client/invoice/add' ?>" class="btn btn-shadow btn-warning ml-2"><strong>Add New Invoice</strong></a>
										</div>
									</div>
								</div>
								<table class="table table-striped table-bordered">
									<thead>
										<tr>
											<th class="text-center">Date</th>
											<th class="text-center">Bill no.</th>
											<th class="text-center">Patient name</th>
											<th class="text-center">Bill amount (INR)</th>
											<th class="text-center">Paid amount (INR)</th>
											<th class="text-center">Due amount (INR)</th>
											<th class="text-center">Payment mode</th>
											<th class="text-center">Status</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$val = 0;
										$val1 = 0;
										$val2 = 0;  
										if($invoice_record != false){
											foreach ($invoice_record as $invoice_records) {
												
												$CI =& get_instance();
												$CI->load->model(array('registration_model'));
												$summary = $CI->registration_model->get_summary($invoice_records['patient_id']);
												$history = $CI->registration_model->get_history($invoice_records['patient_id']);
												$complaints = $CI->registration_model->get_complaints($invoice_records['patient_id']);
												$treatments = $CI->registration_model->get_treatment($invoice_records['patient_id']);
												$next_visit = $CI->registration_model->get_visit($invoice_records['patient_id']);
												$pay = $CI->registration_model->get_pay($invoice_records['patient_id']);
												
												if($summary['age'] == '' || $summary['age'] == '0'){ $age = 'Age'; }else { $age = $summary['age'];}
												if($history['medical'] == ''){ $medical = '..........'; }else { $medical = $history['medical'];}
												if($complaints['chief_complaints_dtl'] == ''){ $chief_complaints_dtl = '..........'; }else { $chief_complaints_dtl = $complaints['chief_complaints_dtl']; }
												if($treatments['item_name'] == ''){ $treatment = '..........'; }else { $treatment = $treatments['item_name']; }
												
												$v = '<b>Summary</b> : '.$age.'/'.$summary['gender'];												
												$v1 = '<b>History </b>: '.$medical;
												$v2 = '<b>Complaints</b> : '.$chief_complaints_dtl;												
												$v3 = '<b>Treatment </b>: '.$treatment;												
												$v4 = '<b>Next Visit </b>: '.$next_visit;												
												$v5 = '<b>Payment </b>: Rs : '.$pay;
												
												$net_amt = $invoice_records['net_amt'];
												$paid_amt = $invoice_records['paid_amt'];
												$balance_amt = $net_amt - $paid_amt;
												$current_date = strtotime(date('Y-m-d'));
												$url = base_url().'client/invoice/invoice_status_update/'.$invoice_records['bill_id'].'/'.$invoice_records['patient_id'];
												
												?>
												<tr id="<?php echo $invoice_records['bill_id'] ?>">
													<td class="text-center"><?php echo $invoice_records['treatment_date']; ?></td>
													<td class="text-center text-muted"> 
														<div class="badge badge-pill badge-info"><?php echo $invoice_records['bill_no']; ?></div>
													</td>
													<!--<td class="text-center"><a href="<?php echo base_url().'client/patient/view/'.$invoice_records['patient_id'] ?>"><?php echo $invoice_records['first_name'];?></a></td>-->
													<td class="text-center"><a data-toggle="tooltip" data-placement="left" data-html="true" title="<?php echo $v.'</br></br>'.$v1.'</br></br>'.$v2.'</br></br>'.$v3.'</br></br>'.$v4.'</br></br>'.$v5; ?>" href="<?php echo base_url().'client/patient/view/'.$invoice_records['patient_id'] ?>"><img src="<?php echo base_url().'img/pngwing.png' ?>" style="width:30px; height:30px;" ></img><?php echo $invoice_records['first_name'];?></a></td>
													<td class="text-center"><?php echo number_format($invoice_records['net_amt'],2,'.',''); ?></td>
													<td class="text-center"><?php echo number_format($invoice_records['paid_amt'],2,'.','') ; ?></td>
													<td class="text-center"><?php 
													if($net_amt == $paid_amt) echo ''; else echo number_format($balance_amt,2,'.',''); 
													if($invoice_records['bill_status'] == 0){ echo '</br>&nbsp;&nbsp;&nbsp;&nbsp;<a class="badge badge-pill badge-alternate" href="'.$url.'"><i class="fa fa-plus"></i> Add payment</a>'; } ?>
												</td>
												<td class="text-center"><?php echo $invoice_records['payment_mode']; ?></td>
												<td class="text-center"><?php if($invoice_records['bill_status'] == 0){
													if(strtotime($invoice_records['due_date']) > $current_date)
														echo '<div class="badge badge-pill badge-danger" style="padding:.5em;">Pending</div>';
													else
														echo '<div class="badge badge-pill badge-danger" style="padding:.5em;">Overdue</div>';
												} 
												else { 
													echo '<div class="badge badge-pill badge-primary" style="padding:.5em;">Paid</div>';
												} ?></td>
												<td class="text-center">
													<a href="<?php echo base_url().'client/invoice/invoice_view_print/'.$invoice_records['bill_id']; ?>" target="_blank"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-alternate" data-toggle="tooltip" data-placement="top" title="Print"><i class="fa fa-print"></i></button></a>
													<?php if($invoice_records['bill_status'] == 0){ ?>
														<a class="edit" href="<?php echo base_url().'client/invoice/edit/'.$invoice_records['bill_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
													<?php } ?>
													<a href="<?php echo base_url().'client/invoice/invoiceSendPatientEmail/'.$invoice_records['bill_id'].'/'.$invoice_records['client_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="Email"><i class="fa fa-share"></i></button></a>
												</td>
											</tr>
											<?php
											$val += $invoice_records['net_amt'];
											$val1 += $invoice_records['paid_amt'];
											$val2 += $balance_amt;
											?>
										<?php } ?>
										
										<tr><td></td><td></td><td><strong>Total :</strong></td>
											<td><strong><?php echo number_format($val,2,'.',''); ?></strong></td><td><strong><?php echo number_format($val1,2,'.',''); ?></strong></td><td><strong><?php echo number_format($val2,2,'.',''); ?></strong></td><td></td><td></td><td></td></tr>
											<?php } else { ?><td colspan="9"><center>No More Records</center></td> <?php } ?></tbody>
										</table>
										<?php  if($todays_advance != false){ ?>
											<div class="card-header">
												<div class="card-title" style="text-transform:capitalize;float:left;">Advance List</div>
												<div class="btn-actions-pane-right">
												</div>
											</div>
											<table class="table table-striped table-bordered">
												<thead>
													<tr>
														<th class="text-center">S.No</th>
														<th class="text-center">Patient Name</th>
														<th class="text-center">Payment Mode</th>
														<th class="text-center">Advance Amount<?php echo '('.$clientDetails['currency'].')' ;?></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$val = 0;
													$i=1;
													
													foreach ($todays_advance as $todays_advances) {
														?>
														<tr>
															<td><?php echo $i;  ?></td>
															<td><a href= "<?php echo base_url().'client/patient/view/'.$todays_advances['patient_id'] ?>" ><?php echo $todays_advances['first_name'].' '.$todays_advances['last_name']; ?></a></td>
															<td><?php echo $todays_advances['payment_mode']; ?></td>
															<td><?php echo $todays_advances['advance_amount']; ?></td>
														</tr>
														<?php
														$val += $todays_advances['advance_amount'];
														$i = $i+1;
														?>
													<?php }
													?>
													<tr><td></td><td></td><td><strong>Total :</strong></td>
														<td><strong><?php echo number_format($val,2,'.',''); ?></strong></td></tr>
													</tbody>
													</table><?php } ?>
												</div>
											</div>
										</div>
										<div class="tab-pane fade" id="tab-minimal-4">
											<div class="card-body">
												<div class="card-header">
													<div class="card-title" style="text-transform:capitalize;float:left;">Expense List</div>
													<div class="btn-actions-pane-right">
														<div ><a style="color:black;" href="<?php echo base_url().'client/bill/expanse' ?>" class="btn btn-shadow btn-warning ml-2"><strong>Add New Expense</strong></a>
														</div>
													</div>
												</div>
												<div class="table-responsive">
													<table  class="table table-striped table-bordered" id="basicDataTable">
														<thead>
															<tr>
																<th>Bill No.</th>
																<th>Date</th>
																<th>Vendor</th>
																<th>Subtotal</th>
																<th>Tax</th>
																<th>Total Amount</th>
															</tr>
														</thead>
														<tbody>
															<?php if($expanse != false){
																foreach ($expanse as $row) {
																	?>
																	<tr>
																		<td><a href="<?php echo base_url().'client/bill/expanse_edit/'.$row['bill_no'] ?>" ><span class="badge badge-greensea" style="padding:.5em;"><?php echo 'EXP-'.$row['bill_no']; ?></span></a></td>
																		<td><?php echo $row['bill_date']; ?></td>
																		<td><?php echo $row['ventor']; ?></td>
																		<td><?php echo number_format($row['amount'],2,'.',''); ?></td>
																		<td><?php echo $row['tax_perc']; ?></td>
																		<td><?php echo number_format($row['total_amt'],2,'.',''); ?></td>
																	</tr>
																	
																	<?php
																}  } ?>
																<tr><td colspan="6" ><center>No More Records Found</center></td></tr>
															</tbody>
														</table>
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
		<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.sparkline.min.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
		<script type="text/javascript" src="https://rawgit.com/simeydotme/jQuery-ui-Slider-Pips/master/src/js/jquery-ui-slider-pips.js"></script>
		<script>
			
			$('#date_filter').trigger('change');
	/*  <?php if($clientDetails['account_type'] == 1) { ?>
		$.gritter.add({title:	'Activate Search Physio Account',text:	'Go to settings to join the national online directory for physiotherapistd and enjoy the premium listing for free'});
		<?php } ?> */
		$('.daily_reg').click(function() {
			var appointment_id = $(this).attr('href').split('#')[1];  
			var name = $(this).attr('href').split('#')[2];  
			var utl= '<?php echo base_url().'client/schedule/add_visit' ?>';
			swal({
				title: "Are you sure?",
				text: name + " has Been Arrived",
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
					data : {p_id:appointment_id},
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
						if(data.status == 'success') {
							swal("Success!", name + " status has been changed!", "success");
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
		});
		
		$('.make_bill').click(function() {  
			
			var utl= '<?php echo base_url().'client/dashboard/make_bill' ?>';
			swal({
				title: "Are you sure?",
				text: " Do you want to make a bill for this patient?",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: 'btn-info',
				confirmButtonText: 'Yes',
				closeOnConfirm: false,
			},
			function(){
				var appointment_id = window.location.hash.substr(1);
				$.ajax({
					type: 'post',
					url: utl,
					data : {p_id:appointment_id},
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
						if(data.status == 'success') {
							swal("Success!", "Your bill has been made", "success");
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
		});
		
		$('.print_tab').click(function(){
			$('#print').show();
		});
		$('.clinic_tab').click(function(){
			$('#print').hide();
		});
		$(function() {
			$("#pips-slider")
			
			.slider({
				
				range: true,
				min: 0,
				max: 10,
				values: [0,<?=$npscore;?>],
				step: 2,
				disabled: true
				
			})
			
			.slider("pips", {
				
				first: "label",
				last: "label",
				rest: "label",
				step: 1,
				labels: false,
				prefix: "",
				suffix: ""
				
			})
			
			.slider("float", {
				
				handle: false,
				pips: false,
				labels: false,
				prefix: "",
				suffix: ""
				
			});

			
			$('.ui-slider-handle:first').hide();
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
	