<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Referral Analytics - Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
	<link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
    <meta name="msapplication-tap-highlight" content="no">
   <link href="<?php echo base_url()?>my_assets/main.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/daterangepicker-bs3.css" />
	<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.peity.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.colorbox-min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/moment.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/daterangepicker.js"></script>
   	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/amcharts.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/serial.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pie.js"></script>
   
	 <style>
div
{
    text-align:center;
}
img
{
    vertical-align:middle;
}
</style>
</head>
   
 <body>

      <div class="app-container app-theme-black body-tabs-shadow fixed-header fixed-sidebar">
    		<?php include("sidebar.php");?>
            <div class="app-main__outer">
                <div class="app-main__inner">
                     
			 
		<div class="col-md-12">
		<div class="page-title-subheading opacity-10">
                                        <nav class="" aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item">
                                                    <a href="<?php echo base_url().'client/dashboard/home' ?>">
                                                        <i aria-hidden="true" class="fa fa-home"></i>
                                                    </a>
                                                </li>
												<li class="breadcrumb-item">
                                                       REPORTS
                                                </li>
                                                <li class="breadcrumb-item">
                                                    <a href="<?php echo base_url().'client/reports/marketing' ?>" >MARKETING REPORTS</a>
                                                </li>
                                                <li class="active breadcrumb-item" aria-current="page">
                                                    REFERRAL ANALYTICS
                                                </li>
                                            </ol>
                                        </nav>
                                    </div>
		 </div>
		</br>
		 <div class="row">
		  <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
			  <i class="fa fa-calendar"></i>
			  <span></span> <b class="caret"></b>
		  </div>
		  <input type="hidden" class="span11" id="date_filter" name="date_filter" autocomplete="off" />
		  <input type="hidden" class="span11" id="dateString" name="dateString" autocomplete="off" />
		  <input type="hidden" class="span11" id="countString" name="countString" autocomplete="off" />
		  </div><div class="container-fluid">
		  <div class="quick-actions_homepage"></div>
					<div class="row">
                       <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="mb-12 card">
                                <div class="card-header-tab card-header">
								<div class="card-body"><h5 class="card-title" style="text-transform:capitalize;float:left;">REFERRAL ANALYTICS</h5>
									</div>
                                </div>
                                <div class="pt-0 card-body">
                                    <div id="refdiv" style="width: 100%; height:362px;"></div>
								</div>
                            </div>
                        </div>
					</div></br></br>
					<div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-12 card">
                                    <div class="card-header"> Referral Reports                                     
                                    </div>
									<div class="card-body">
									 <div class="table-responsive">
										<table class="table table-striped " style="">
                                            <tr>
											    <td>   <input type="text" style="width: " autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="From" id="from" data-toggle="datepicker"/>
                                                </td>
												<td>   <input type="text" style="width: " autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="To" id="to" data-toggle="datepicker"/>
                                                </td>
												<td><button class="btn btn-pill btn-success" id="search" > Go</button>
                                                </td>
											</tr>
										</table>
									</br>
								     <?php  if($referals != false) { 
										  $CI =& get_instance();
										  $CI->load->model(array('common_model'));
										  foreach($referals as $row) { ?>
										  <?php if($row['referal_type_id'] == 1 ) {  ?>
										  <h5 class="card-title" style="float:left; text-transform:capitalize;"> Doctor  : <?php echo '('.date('d-m-Y',strtotime($from)).' - '.date('d-m-Y',strtotime($to)).')'; ?>  </h5> </br> </br>							
										  <div id="accordion<?php echo 'Doctor'.$row['referal_id']; ?>" class="accordion-wrapper mb-3">
											<div class="card">
												<div id="headingOne" class="card-header">
													<button type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="false" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block collapsed">
														<h5 class="m-0 p-0"><?php echo $row['referal_name']; ?> <?php echo '#'.$row['patient']; ?></h5>
													</button>
													<?php if($this->uri->segment(4)=="date"){ ?>
													<a style="style:float:right;text-transform:capitalize;" target="_blank" href="<?php echo base_url().'client/reports/print_referal/date/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$row['referal_id']; ?>" style="float: right;text-transform:capitalize;" class="btn btn-shadow btn-shadow btn-alternate"> Print</a>
													<?php } else{ ?>
													<?Php $from =  date('d-m-Y', strtotime('-30 days'));
                                                          $to = date('d-m-Y'); 													
													?>
													<a style="style:float:right;text-transform:capitalize;" target="_blank" href="<?php echo base_url().'client/reports/print_referal/date/'.$from.'/'.$to.'/'.$row['referal_id']; ?>" style="float: right;text-transform:capitalize;" class="btn btn-shadow btn-shadow btn-alternate"> Print</a>
													<?php } ?>
										  </div>
                                         <div data-parent="#accordion<?php echo 'Doctor'.$row['referal_id']; ?>" id="collapseOne1" aria-labelledby="headingOne" class="collapse" style="">
                                           <div class="card-body">
											<div class="col-md-12" >
													<div class="table-responsive">
														<table class="table table-striped table-bordered">
														 <thead>
														 <tr>
															   <th class="text-center">Name</th>
																<th class="text-center">Mobile</th>
																<th class="text-center">Provisional Diagnosis</th>
																<th class="text-center">Amount</th>
																
														</tr> </thead>
														<tbody>
														<?php  if($patients != false){
														$total = 0;	
														$refer = $row['referal_id'];
															foreach($patients as $row1){
																$CI =& get_instance();
																$CI->load->model(array('common_model'));
																$diag = $CI->common_model->get_provisional($row1['patient_id']);
																$amount = $CI->common_model->get_invoiceamount($row1['patient_id'],$from,$to);
																//$session = $CI->common_model->get_invoicesession($row['patient_id'],$from,$to);
																
																if($row1['referal_id'] == $refer){
																$total += $amount;
														?>
														<tr>
															
															<td class="text-center"><a href="<?php echo base_url().'client/patient/view/'.$row1['patient_id'] ?>" ><?php echo $row1['first_name'].'  '.$row1['last_name']; ?></a></td>
															<td class="text-center"><?php echo $row1['mobile_no']; ?></td>
															<td class="text-center"><?php echo $diag['prov_diagnosis']; ?></td>
															<td class="text-center"><?php echo $amount; ?></td>
														</tr>
														<?php } }?>
														<tr><td colspan="3" class="text-right"><b>Total</b></td><td><?=$total?></td></tr>
														<?php } else { echo '<tr><td colspan="5">No More Records</td></tr>'; }  ?>
														
														</tbody>
														</table>
													</div>
												</div>
                                            </div>
                                        </div>
                                    </div>
                                 </div></br>
								 <?php } ?>
								  <?php if($row['referal_type_id'] == 2 ) {  ?>
										  <h5 class="card-title" style="float:left; text-transform:capitalize;"> Website  : <?php echo '('.date('d-m-Y',strtotime($from)).' - '.date('d-m-Y',strtotime($to)).')'; ?>  </h5> </br> </br>							
										  <div id="accordion<?php echo $row['referal_id']; ?>" class="accordion-wrapper mb-3">
											<div class="card">
												<div id="headingOne" class="card-header">
													<button type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="false" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block collapsed">
														<h5 class="m-0 p-0"><?php echo $row['website_name']; ?> <?php echo '#'.$row['patient']; ?></h5>
													</button>
													<?php if($this->uri->segment(4)=="date"){ ?>
													<a style="style:float:right;text-transform:capitalize;" target="_blank" href="<?php echo base_url().'client/reports/print_referal/date/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$row['referal_id']; ?>" style="float: right;" class="btn btn-shadow btn-shadow btn-alternate"> Print</a>
													<?php } else{ ?>
													<?Php $from =  date('d-m-Y', strtotime('-30 days'));
                                                          $to = date('d-m-Y'); 													
													?>
													<a style="style:float:right;text-transform:capitalize;" target="_blank" href="<?php echo base_url().'client/reports/print_referal/date/'.$from.'/'.$to.'/'.$row['referal_id']; ?>" style="float: right;" class="btn btn-shadow btn-shadow btn-alternate"> Print</a>
													<?php } ?>
												
										 </div>
                                         <div data-parent="#accordion<?php echo $row['referal_id']; ?>" id="collapseOne1" aria-labelledby="headingOne" class="collapse" style="">
                                            <div class="card-body">
											<div class="col-md-12" >
													<div class="table-responsive">
														<table class="table table-striped table-bordered">
														<thead> <tr>
																 
																 
																<th class="text-center">Name</th>
																<th class="text-center">Mobile</th>
																<th class="text-center">Provisional Diagnosis</th>
																<th class="text-center">Amount</th>
																
														</tr></thead>
														<tbody>
														<?php  if($patients != false){
														$refer = $row['referal_id'];
															foreach($patients as $row1){
																$CI =& get_instance();
																$CI->load->model(array('common_model'));
																$diag = $CI->common_model->get_provisional($row1['patient_id']);
																$amount = $CI->common_model->get_invoiceamount($row1['patient_id'],$from,$to);
																//$session = $CI->common_model->get_invoicesession($row['patient_id'],$from,$to);
																
																if($row1['referal_id'] == $refer){
														?>
														<tr>
															
															<td class="text-center"><a href="<?php echo base_url().'client/patient/view/'.$row1['patient_id'] ?>" ><?php echo $row1['first_name'].'  '.$row1['last_name']; ?></a></td>
															<td class="text-center"><?php echo $row1['mobile_no']; ?></td>
															<td class="text-center"><?php echo $diag['prov_diagnosis']; ?></td>
															<td class="text-center"><?php echo $amount; ?></td>
														</tr>
														<?php } } } else { echo '<tr><td colspan="5">No More Records</td></tr>'; }  ?>
														</tbody>
														</table>
													</div>
												</div>
                                            </div>
                                        </div>
                                    </div>
                                 </div></br><?php } ?>
								 <?php if($row['referal_type_id'] == 3 ) {  ?>
										  <h5 class="card-title" style="float:left; text-transform:capitalize;"> Advertisement  : <?php echo '('.date('d-m-Y',strtotime($from)).' - '.date('d-m-Y',strtotime($to)).')'; ?>  </h5> </br> </br>							
										  <div id="accordion<?php echo $row['referal_id']; ?>" class="accordion-wrapper mb-3">
											<div class="card">
												<div id="headingOne" class="card-header">
													<button type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="false" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block collapsed">
														<h5 class="m-0 p-0"><?php echo $row['adv_name']; ?> <?php echo '#'.$row['patient']; ?></h5>
													</button>
													<?php if($this->uri->segment(4)=="date"){ ?>
													<a style="style:float:right;text-transform:capitalize;" target="_blank" href="<?php echo base_url().'client/reports/print_referal/date/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$row['referal_id']; ?>" style="float: right;" class="btn btn-shadow btn-shadow btn-alternate"> Print</a>
													<?php } else{ ?>
													<?Php $from =  date('d-m-Y', strtotime('-30 days'));
                                                          $to = date('d-m-Y'); 													
													?>
													<a style="style:float:right;text-transform:capitalize;" target="_blank" href="<?php echo base_url().'client/reports/print_referal/date/'.$from.'/'.$to.'/'.$row['referal_id']; ?>" style="float: right;" class="btn btn-shadow btn-shadow btn-alternate"> Print</a>
													<?php } ?>
										 </div>
                                         <div data-parent="#accordion<?php echo $row['referal_id']; ?>" id="collapseOne1" aria-labelledby="headingOne" class="collapse" style="">
                                            <div class="card-body">
											<div class="col-md-12" >
													<div class="table-responsive">
														<table class="table table-striped table-bordered">
														<thead> <tr>
																<th class="text-center">Name</th>
																<th class="text-center">Mobile</th>
																<th class="text-center">Provisional Diagnosis</th>
																<th class="text-center">Amount</th>
																
														</tr></thead>
														<tbody>
														<?php  if($patients != false){
														$refer = $row['referal_id'];
															foreach($patients as $row1){
																$CI =& get_instance();
																$CI->load->model(array('common_model'));
																$diag = $CI->common_model->get_provisional($row1['patient_id']);
																$amount = $CI->common_model->get_invoiceamount($row1['patient_id'],$from,$to);
																//$session = $CI->common_model->get_invoicesession($row['patient_id'],$from,$to);
																
																if($row1['referal_id'] == $refer){
														?>
														<tr>
															
															<td class="text-center"><a href="<?php echo base_url().'client/patient/view/'.$row1['patient_id'] ?>" ><?php echo $row1['first_name'].'  '.$row1['last_name']; ?></a></td>
															<td class="text-center"><?php echo $row1['mobile_no']; ?></td>
															<td class="text-center"><?php echo $diag['prov_diagnosis']; ?></td>
															<td class="text-center"><?php echo $amount; ?></td>
														</tr>
														<?php } } } else { echo '<tr><td colspan="5">No More Records</td></tr>'; }  ?>
														</tbody>
														</table>
													</div>
												</div>
                                            </div>
                                        </div>
                                    </div>
                                 </div></br><?php } ?>
								 <?php if($row['referal_type_id'] == 4 ) {  ?>
										  <h5 class="card-title" style="float:left; text-transform:capitalize;"> Others  : <?php echo '('.date('d-m-Y',strtotime($from)).' - '.date('d-m-Y',strtotime($to)).')'; ?>  </h5> </br> </br>							
										  <div id="accordion<?php echo $row['referal_id']; ?>" class="accordion-wrapper mb-3">
											<div class="card">
												<div id="headingOne" class="card-header">
													<button type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="false" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block collapsed">
														<h5 class="m-0 p-0"><?php echo $row['referal_oth_name']; ?> <?php echo '#'.$row['patient']; ?></h5>
													</button>
												<?php if($this->uri->segment(4)=="date"){ ?>
													<a style="style:float:right;text-transform:capitalize;" target="_blank" href="<?php echo base_url().'client/reports/print_referal/date/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$row['referal_id']; ?>" style="float: right;" class="btn btn-shadow btn-shadow btn-alternate"> Print</a>
													<?php } else{ ?>
													<?Php $from =  date('d-m-Y', strtotime('-30 days'));
                                                          $to = date('d-m-Y'); 													
													?>
													<a style="style:float:right;text-transform:capitalize;" target="_blank" href="<?php echo base_url().'client/reports/print_referal/date/'.$from.'/'.$to.'/'.$row['referal_id']; ?>" style="float: right;" class="btn btn-shadow btn-shadow btn-alternate"> Print</a>
													<?php } ?>
										 </div>
                                         <div data-parent="#accordion<?php echo $row['referal_id']; ?>" id="collapseOne1" aria-labelledby="headingOne" class="collapse" style="">
                                            <div class="card-body">
											<div class="col-md-12" >
													<div class="table-responsive">
														<table class="table table-striped table-bordered">
														 <thead><tr>
																<th class="text-center">Name</th>
																<th class="text-center">Mobile</th>
																<th class="text-center">Provisional Diagnosis</th>
																<th class="text-center">Amount</th>
																
														</tr></thead>
														<tbody>
														<?php  if($patients != false){
														$refer = $row['referal_id'];
															foreach($patients as $row1){
																$CI =& get_instance();
																$CI->load->model(array('common_model'));
																$diag = $CI->common_model->get_provisional($row1['patient_id']);
																$amount = $CI->common_model->get_invoiceamount($row1['patient_id'],$from,$to);
																//$session = $CI->common_model->get_invoicesession($row['patient_id'],$from,$to);
																
																if($row1['referal_id'] == $refer){
														?>
														<tr>
															
															<td class="text-center"><a href="<?php echo base_url().'client/patient/view/'.$row1['patient_id'] ?>" ><?php echo $row1['first_name'].'  '.$row1['last_name']; ?></a></td>
															<td class="text-center"><?php echo $row1['mobile_no']; ?></td>
															<td class="text-center"><?php echo $diag['prov_diagnosis']; ?></td>
															<td class="text-center"><?php echo $amount; ?></td>
														</tr>
														<?php } } } else { echo '<tr><td colspan="5">No More Records</td></tr>'; }  ?>
														</tbody>
														</table>
													</div>
												</div>
                                            </div>
                                        </div>
                                    </div>
                                 </div></br><?php } ?>
								  <?php if($row['referal_type_id'] == 5 ) {  ?>
										  <h5 class="card-title" style="float:left; text-transform:capitalize;"> Patient  : <?php echo '('.date('d-m-Y',strtotime($from)).' - '.date('d-m-Y',strtotime($to)).')'; ?>  </h5> </br> </br>							
										  <div id="accordion<?php echo $row['referal_id']; ?>" class="accordion-wrapper mb-3">
											<div class="card">
												<div id="headingOne" class="card-header">
													<button type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="false" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block collapsed">
														<h5 class="m-0 p-0"><?php echo $row['referal_name']; ?> <?php echo '#'.$row['patient']; ?></h5>
													</button>
												<?php if($this->uri->segment(4)=="date"){ ?>
													<a style="style:float:right;text-transform:capitalize;" target="_blank" href="<?php echo base_url().'client/reports/print_referal/date/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$row['referal_id']; ?>" style="float: right;" class="btn btn-shadow btn-shadow btn-alternate"> Print</a>
													<?php } else{ ?>
													<?Php $from =  date('d-m-Y', strtotime('-30 days'));
                                                          $to = date('d-m-Y'); 													
													?>
													<a style="style:float:right;text-transform:capitalize;" target="_blank" href="<?php echo base_url().'client/reports/print_referal/date/'.$from.'/'.$to.'/'.$row['referal_id']; ?>" style="float: right;" class="btn btn-shadow btn-shadow btn-alternate"> Print</a>
													<?php } ?>
										 </div>
                                         <div data-parent="#accordion<?php echo $row['referal_id']; ?>" id="collapseOne1" aria-labelledby="headingOne" class="collapse" style="">
                                            <div class="card-body">
											<div class="col-md-12" >
													<div class="table-responsive">
														<table class="table table-striped table-bordered">
														 <thead><tr>
																<th class="text-center">Name</th>
																<th class="text-center">Mobile</th>
																<th class="text-center">Provisional Diagnosis</th>
																<th class="text-center">Amount</th>
														</tr></thead>
														<tbody>
														<?php  if($patients != false){
														$refer = $row['referal_id'];
															foreach($patients as $row1){
																$CI =& get_instance();
																$CI->load->model(array('common_model'));
																$diag = $CI->common_model->get_provisional($row1['patient_id']);
																$amount = $CI->common_model->get_invoiceamount($row1['patient_id'],$from,$to);
																//$session = $CI->common_model->get_invoicesession($row['patient_id'],$from,$to);
																
																if($row1['referal_id'] == $refer){
														?>
														<tr>
															
															<td class="text-center"><a href="<?php echo base_url().'client/patient/view/'.$row1['patient_id'] ?>" ><?php echo $row1['first_name'].'  '.$row1['last_name']; ?></a></td>
															<td class="text-center"><?php echo $row1['mobile_no']; ?></td>
															<td class="text-center"><?php echo $diag['prov_diagnosis']; ?></td>
															<td class="text-center"><?php echo $amount; ?></td>
														</tr>
														<?php } } } else { echo '<tr><td colspan="5">No More Records</td></tr>'; }  ?>
														</tbody>
														</table>
													</div>
												</div>
                                            </div>
                                        </div>
                                    </div>
                                 </div></br><?php } ?>
								 <?php if($row['referal_type_id'] == 6 ) {  ?>
										  <h5 class="card-title" style="float:left; text-transform:capitalize;"> Insurance  : <?php echo '('.date('d-m-Y',strtotime($from)).' - '.date('d-m-Y',strtotime($to)).')'; ?>  </h5> </br> </br>							
										  <div id="accordion<?php echo $row['referal_id']; ?>" class="accordion-wrapper mb-3">
											<div class="card">
												<div id="headingOne" class="card-header">
													<button type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="false" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block collapsed">
														<h5 class="m-0 p-0"><?php echo $row['referal_name']; ?> <?php echo '#'.$row['patient']; ?></h5>
													</button>
												<?php if($this->uri->segment(4)=="date"){ ?>
													<a style="style:float:right;text-transform:capitalize;" target="_blank" href="<?php echo base_url().'client/reports/print_referal/date/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$row['referal_id']; ?>" style="float: right;" class="btn btn-shadow btn-shadow btn-alternate"> Print</a>
													<?php } else{ ?>
													<?Php $from =  date('d-m-Y', strtotime('-30 days'));
                                                          $to = date('d-m-Y'); 													
													?>
													<a style="style:float:right;text-transform:capitalize;" target="_blank" href="<?php echo base_url().'client/reports/print_referal/date/'.$from.'/'.$to.'/'.$row['referal_id']; ?>" style="float: right;" class="btn btn-shadow btn-shadow btn-alternate"> Print</a>
													<?php } ?>
										 </div>
                                         <div data-parent="#accordion<?php echo $row['referal_id']; ?>" id="collapseOne1" aria-labelledby="headingOne" class="collapse" style="">
                                            <a target="_blank" href="<?php echo base_url().'client/reports/print_referal/date/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$row['referal_id']; ?>" style="float: right;" class="btn btn-shadow btn-shadow btn-alternate"><i class="fa fa-print"></i> Print</a>
											<div class="card-body">
											<div class="col-md-12" >
													<div class="table-responsive">
														<table class="table table-striped table-bordered">
														 <thead><tr>
																<th class="text-center">Name</th>
																<th class="text-center">Mobile</th>
																<th class="text-center">Provisional Diagnosis</th>
																<th class="text-center">Amount</th>
														</tr></thead>
														<tbody>
														<?php  if($patients != false){
														$refer = $row['referal_id'];
															foreach($patients as $row1){
																$CI =& get_instance();
																$CI->load->model(array('common_model'));
																$diag = $CI->common_model->get_provisional($row1['patient_id']);
																$amount = $CI->common_model->get_invoiceamount($row1['patient_id'],$from,$to);
																//$session = $CI->common_model->get_invoicesession($row['patient_id'],$from,$to);
																
																if($row1['referal_id'] == $refer){
														?>
														<tr>
															 
															<td class="text-center"><a href="<?php echo base_url().'client/patient/view/'.$row1['patient_id'] ?>" ><?php echo $row1['first_name'].'  '.$row1['last_name']; ?></a></td>
															<td class="text-center"><?php echo $row1['mobile_no']; ?></td>
															<td class="text-center"><?php echo $diag['prov_diagnosis']; ?></td>
															<td class="text-center"><?php echo $amount; ?></td>
														</tr>
														<?php } } } else { echo '<tr><td colspan="5">No More Records</td></tr>'; }  ?>
														</tbody>
														</table>
													</div>
												</div>
                                            </div>
                                        </div>
                                    </div>
                                 </div></br><?php } ?>
								  <?php  } }  ?>
							
                                    </br>
									</div>
									</div>									 
								</div>									 
							</div>									 
					</div>	
			 </div>
	</div>
	</div>
	</div>
	 <script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script></body>
	<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.sparkline.min.js"></script>
	 <script>
	AmCharts.loadJSON = function(url) {
	  if (window.XMLHttpRequest) {
		var request = new XMLHttpRequest();
	  } else {
		var request = new ActiveXObject('Microsoft.XMLHTTP');
	  }
	  request.open('GET', url, false);
	  request.send();
	return eval(request.responseText);
	};
	
</script>
<script>
$("ul#demo_menu2").sidebar({
            position:"right",
            callback:{
                item : {
                    enter : function(){
                        $(this).find("h6").animate({color:"red"}, 250);
                    },
                    leave : function(){
                        $(this).find("h6").animate({color:"black"}, 250);
                    }
                }
            }
        });
</script>
<script>

$(document).ready(function(e) {
	$('#topTooltip, #rightTooltip, #bottomTooltip, #leftTooltip').tooltip();
	 $('.card.hover').hover(function(){
        $(this).addClass('flip');
      },function(){
        $(this).removeClass('flip');
      });
	var chart;
	var legend;
	$('#reportrange').daterangepicker(
	{
		startDate: moment().subtract('days', 59),
		endDate: moment(),
		minDate: '01/01/2012',
		maxDate: '12/31/2020',
		//dateLimit: { days: 60 },
		showDropdowns: true,
		showWeekNumbers: true,
		timePicker: false,
		timePickerIncrement: 1,
		timePicker12Hour: true,
		ranges: {
		   'Today': [moment(), moment()],
		   'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
		   'Last 7 Days': [moment().subtract('days', 6), moment()],
		   'Last 30 Days': [moment().subtract('days', 29), moment()],
		   'This Month': [moment().startOf('month'), moment().endOf('month')],
		   'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
	},
	opens: 'left',
	buttonClasses: ['btn btn-default'],
	applyClass: 'btn-small btn-primary',
	cancelClass: 'btn-small',
	format: 'MM/DD/YYYY',
	separator: ' to ',
	locale: {
		applyLabel: 'Submit',
		fromLabel: 'From',
		toLabel: 'To',
		customRangeLabel: 'Custom Range',
		daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
		monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
		firstDay: 1
	}
	},
	function(start, end) {
	  console.log("Callback has been called!");
	  $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
	  
		  var
		  dateFilterValue = $('#reportrange span').html();
		  
		  dateFilterArr = dateFilterValue.split("-");
		  
			var i;
			dateFilterArr1 = [];
			for (i = 0; i < dateFilterArr.length; ++i) {
				dateFilterArr1.push(moment(dateFilterArr[i],'MMMM D, YYYY').format('YYYY-MM-DD'));
			}
			var dateFilter = dateFilterArr1.join("and");
			
			$('#date_filter').val(dateFilter);
			var chartData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/patientchart/'+dateFilter);
			var pieData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/provdiagchart/'+dateFilter);
			var incomeData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/incomechart/'+dateFilter);
			var SessionData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/sessionChart/'+dateFilter);
			var medicalData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/medidiagchart/'+dateFilter);
			var AptData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/aptdiagchart/'+dateFilter);
			var refData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/refdiagchart/'+dateFilter);
			var expenseData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/expensereport/'+dateFilter);
			
			barChart(chartData);
			expenseChart(expenseData);
			pieChart(pieData);
			incomeChart(incomeData);
			medicalChart(medicalData);
			appointChart(AptData);
			referalChart(refData);
			sessChart(SessionData);
			$('#fromToDate span').text('');
			$.ajax({
				type: "POST",
				dataType: 'json',
				url: base_url + 'client/dashboard/incomereport/' + dateFilter, //The url where the server req would we made.
				beforeSend: function(){
					//$('#patient_id').parent().css('background', 'url("<?php echo base_url(); ?>img/spinner.gif") no-repeat 96% center');
				},
				success: function(data) { 
					$('#incomeInfo').html(data.incomeHtml);
					$('#fromToDate span').append(data.fromToDate);
				}, 
				complete: function(){
					
				},
				error: function(e){ // alert error if ajax fails
					alert(e.responseText);
				} 
			 }); //end AJAX
			
	 }
	);
	  
	  $('#reportrange span').html(moment().subtract('days', 59).format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
	  
	  var
	  dateFilterValue = $('#reportrange span').html();
	  
	  dateFilterArr = dateFilterValue.split("-");
	  
		var i;
		dateFilterArr1 = [];
		for (i = 0; i < dateFilterArr.length; ++i) {
			dateFilterArr1.push(moment(dateFilterArr[i],'MMMM D, YYYY').format('YYYY-MM-DD'));
		}
		var dateFilter = dateFilterArr1.join("and");
		$('#date_filter').val(dateFilter);
	  var chartData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/patientchart/'+dateFilter);
	function barChart(chartData){
		chart = new AmCharts.AmSerialChart();
		chart.dataProvider = chartData;
		chart.categoryField = "category";
		chart.startDuration = 1;
		var categoryAxis = chart.categoryAxis;
		categoryAxis.labelRotation = 90;
		categoryAxis.gridPosition = "start";
		categoryAxis.equalSpacing = true;
		var graph = new AmCharts.AmGraph();
		graph.valueField = "value1";
		graph.balloonText = "[[category]]: <b>[[value]]</b>";
		graph.type = "column";
		graph.lineAlpha = 0;
		graph.fillAlphas = 0.8;
		graph.colorField = "#00CC00";
		chart.addGraph(graph);
		var chartCursor = new AmCharts.ChartCursor();
		chartCursor.cursorAlpha = 0;
		chartCursor.zoomable = false;
		chartCursor.categoryBalloonEnabled = false;
		chart.addChartCursor(chartCursor);
		chart.write("chartdiv");
	}
	var SessionData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/sessionChart/'+dateFilter);
	function sessChart(SessionData){
		chart = new AmCharts.AmSerialChart();
		chart.dataProvider = SessionData;
		chart.categoryField = "category";
		chart.startDuration = 1;
		var categoryAxis = chart.categoryAxis;
		categoryAxis.labelRotation = 90;
		categoryAxis.gridPosition = "start";
		categoryAxis.equalSpacing = true;
		var graph = new AmCharts.AmGraph();
		graph.valueField = "value1";
		graph.balloonText = "[[category]]: <b>[[value]]</b>";
		graph.type = "column";
		graph.lineAlpha = 0;
		graph.fillAlphas = 0.8;
		graph.colorField = "#00CC00";
		chart.addGraph(graph);
		var chartCursor = new AmCharts.ChartCursor();
		chartCursor.cursorAlpha = 0;
		chartCursor.zoomable = false;
		chartCursor.categoryBalloonEnabled = false;
		chart.addChartCursor(chartCursor);

		chart.write("stackchart");
	}
	
	var pieData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/provdiagchart/'+dateFilter);
	function pieChart(pieData){
			// PIE CHART
			chart = new AmCharts.AmPieChart();
			chart.dataProvider = pieData;
			chart.titleField = "provdiag";
			chart.valueField = "count1";
			
			// LEGEND
			legend = new AmCharts.AmLegend();
			legend.align = "center";
			legend.markerType = "circle";
			chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[count1]]</b> ([[percents]]%)</span>";
			chart.addLegend(legend);
			chart.write("piediv");
		
		
	}  
	var refData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/refdiagchart/'+dateFilter);
	function referalChart(refData){
			// PIE CHART
			chart = new AmCharts.AmPieChart();
			chart.dataProvider = refData;
			chart.titleField = "Referal";
			chart.valueField = "count";
			
			// LEGEND
			legend = new AmCharts.AmLegend();
			legend.align = "center";
			legend.markerType = "circle";
			chart.balloonText = "[[Referal]]<br><span style='font-size:14px'><b>[[count]]</b> ([[percents]]%)</span>";
			chart.addLegend(legend);
			chart.write("refdiv");
		
		
	}
	
	var AptData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/aptdiagchart/'+dateFilter);
	function appointChart(AptData){
			// PIE CHART
			chart = new AmCharts.AmPieChart();
			chart.dataProvider = AptData;
			chart.titleField = "Time";
			chart.valueField = "count";
			
			// LEGEND
			legend = new AmCharts.AmLegend();
			legend.align = "center";
			legend.markerType = "circle";
			chart.balloonText = "[[Time]]<br><span style='font-size:14px'><b>[[count]]</b> ([[percents]]%)</span>";
			chart.addLegend(legend);
			chart.write("aptdiv");
		
		
	}
	
	var medicalData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/medidiagchart/'+dateFilter);
	function medicalChart(medicalData){
			// PIE CHART
			chart = new AmCharts.AmPieChart();
			chart.dataProvider = medicalData;
			chart.titleField = "provdiag";
			chart.valueField = "count1";
			
			// LEGEND
			legend = new AmCharts.AmLegend();
			legend.align = "center";
			legend.markerType = "circle";
			chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[count1]]</b> ([[percents]]%)</span>";
			chart.addLegend(legend);
			chart.write("medidiv");
		
		
	}
	
	var incomeData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/incomechart/'+dateFilter);
	function incomeChart(incomeData){
	
		chart = new AmCharts.AmSerialChart();
		chart.dataProvider = incomeData;
		chart.categoryField = "month";
		chart.startDuration = 1;

		// AXES
		// category
		var categoryAxis = chart.categoryAxis;
		categoryAxis.labelRotation = 90;
		categoryAxis.gridPosition = "start";
		categoryAxis.equalSpacing = true;
		var graph = new AmCharts.AmGraph();
		graph.valueField = "total";
		graph.balloonText = "[[category]]: <b>[[value]]</b>";
		graph.type = "column";
		graph.lineAlpha = 0;
		graph.fillAlphas = 0.8;
		chart.addGraph(graph);
		var chartCursor = new AmCharts.ChartCursor();
		chartCursor.cursorAlpha = 0;
		chartCursor.zoomable = false;
		chartCursor.categoryBalloonEnabled = false;
		chart.addChartCursor(chartCursor);
		chart.write("incomediv");
	}
	var expenseData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/expensereport/'+dateFilter);
	function expenseChart(expenseData){
	
		chart = new AmCharts.AmSerialChart();
		chart.dataProvider = expenseData;
		chart.categoryField = "month";
		chart.startDuration = 1;

		var categoryAxis = chart.categoryAxis;
		categoryAxis.labelRotation = 90;
		categoryAxis.gridPosition = "start";
		categoryAxis.equalSpacing = true;
		var graph = new AmCharts.AmGraph();
		graph.valueField = "total";
		graph.balloonText = "[[category]]: <b>[[value]]</b>";
		graph.type = "column";
		graph.lineAlpha = 0;
		graph.fillAlphas = 0.8;
		chart.addGraph(graph);
		var chartCursor = new AmCharts.ChartCursor();
		chartCursor.cursorAlpha = 0;
		chartCursor.zoomable = false;
		chartCursor.categoryBalloonEnabled = false;
		chart.addChartCursor(chartCursor);
		chart.write("expensediv");
	}
	function incomeReport()
	{
		$.ajax({
				type: "POST",
				dataType: 'json',
				
				url: '<?php echo base_url().'client/dashboard/incomereport/' ?>'+ dateFilter, 
				beforeSend: function(){
					//$('#patient_id').parent().css('background', 'url("<?php echo base_url(); ?>img/spinner.gif") no-repeat 96% center');
				},
				success: function(data) {
					$('#incomeInfo').html(data.incomeHtml);
					$('#fromToDate span').append(data.fromToDate);
				}, 
				complete: function(){
					//$('#patient_id').parent().css('background', 'none');	
				},
				error: function(e){ // alert error if ajax fails
					alert(e.responseText);
				} 
			 }); //end AJAX
	}
	
	$(document).on('change', '#date_filter', function(){
		referalChart(refData);
	});
	  
	$('#date_filter').trigger('change');
	var value = '<?php echo $this->uri->segment(4); ?>'; 
	if( value == 'date'){
	var	 from = '<?php echo date('d/m/Y', strtotime($this->uri->segment(5))); ?>';
	var to = '<?php echo date('d/m/Y', strtotime($this->uri->segment(6))); ?>';
	} else {
		var	 from = '<?Php echo date('d/m/Y', strtotime('-30 days')); ?>';
		var to = '<?Php echo date('d/m/Y'); ?>';
	}
	$("#from").val(from);
	$("#to").val(to);
	$('#search').click(function() {
			var from = $('#from').val();
			var to = $('#to').val();
			var date_app=$('#from').val();
			var date = date_app.split('/'); 
			var start_date=date[0]+'-'+date[1]+'-'+date[2];
			var date_app1=$('#to').val();
			var date1 = date_app1.split('/'); 
			var to_date=date1[0]+'-'+date1[1]+'-'+date1[2];
			if(from !='' && to != '' ){
				window.location = '<?php echo base_url().'client/reports/referal_src/date/' ?>'+ start_date + '/' + to_date;
			} else {
				alert('Invalid Search');
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
      