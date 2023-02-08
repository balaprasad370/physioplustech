<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
     
    <meta name="msapplication-tap-highlight" content="no">
	<link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
<link href="<?php echo base_url()?>asset_list/main.css" rel="stylesheet">
 
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
                          
				<?php include("sidebar.php");?>
                 <div class="app-main__outer">
                <div class="app-main__inner">
                                
                    <div class="tabs-animation">
                         
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header"> Referral Reports
                                       
                                    </div>
                                    <div class="table-responsive">
									  
									   <table class="align-middle mb-0 table table-border table-striped table-hover" style="">
                                             
                                                <tr>
											    <td>   <input type="text" style="width: " autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="From" id="from" data-toggle="datepicker"/>
                                                </td>
												<td>   <input type="text" style="width: " autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="To" id="to" data-toggle="datepicker"/>
                                                </td>
												<td><button class="btn-pill btn btn-success" id="dateFilter" > Go</button>
                                                 &nbsp;&nbsp;<a class="btn btn-pill btn-alternate" href="<?php echo base_url().'client/reports/print_daily_payments/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6); ?>" target="_blank">Print</a>
												</td>
												 
												</tr>
											  
                                        </table>
                                        </br>
									 
                                    </div>
									
									<?Php if($referals != false) { ?>
									<?Php 
										$CI =& get_instance();
										$CI->load->model(array('common_model'));
										foreach($referals as $row) { ?>
										<?php if($row['referal_type_id'] == 1 ) {  ?>
									 <div id="accordion" class="accordion-wrapper mb-3">
                                    <div class="card">
                                        <div id="headingOne" class="card-header">
										 
                                            <button type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
                                                <h5 class="m-0 p-0"><?php echo $row['referal_name']; ?> <div class="mb-2 mr-2 badge badge-primary"><?php echo $row['patient']; ?></div></h5>
                                            </button>
                                        </div>
                                        <div data-parent="#accordion" id="collapseOne1" aria-labelledby="headingOne" class="collapse">
                                            <div class="card-body">
											
											<?php  if($patients != false){  ?>
											<a target="_blank" href="<?php echo base_url().'client/reports/print_referal/date/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$row['referal_id']; ?>" style="float: right;" ><button class="mb-2 mr-2 btn-pill btn btn-alternate">Print
                                            </button></a>
											<div class="table-responsive">
                                        <table class="align-middle mb-0 table table-border table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Name</th>
												 
												<th class="text-center">Mobile No</th>
												 
												<th class="text-center">Provisional Diagnosis</th>
												<th class="text-center">Amount</th>
												 
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php
										$refer = $row['referal_id'];
										foreach($patients as $row){
										$CI =& get_instance();
										$CI->load->model(array('common_model'));
										$diag = $CI->common_model->get_provisional($row['patient_id']);
										$amount = $CI->common_model->get_invoiceamount($row['patient_id'],$from,$to);
								        if($row['referal_id'] == $refer){ ?>
											<tr>  <td class="text-center"><?php echo $row['first_name'].'  '.$row['last_name']; ?></td>
											  <td class="text-center"><?php echo $row['mobile_no']; ?></td>
											 <td class="text-center"><?php echo $diag['prov_diagnosis']; ?></td>
											  <td class="text-center"><?php echo $amount; ?></td>
											  <td class="text-center"></td>
											</tr>
											<?php } } ?>
											</tbody>
											</table>
											
											
											</div>
                                            </div>
											<?php } ?>
                                        </div>
                                    </div>
									<?php }  else if($row['referal_type_id'] == 2 ) { ?>
									
									
									 
                                    <div class="card">
                                        <div id="headingTwo" class="b-radius-0 card-header">
                                            <button type="button" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="false" aria-controls="collapseTwo" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0"><?php echo $row['website_name']; ?>
											
											<div class="mb-2 mr-2 badge badge-primary"><?php echo $row['patient']; ?></div>
											</h5></button>
                                        </div>
                                        <div data-parent="#accordion" id="collapseOne2" class="collapse">
                                            <div class="card-body">
											<?php  if($patients != false){  ?>
											<a target="_blank" href="<?php echo base_url().'client/reports/print_referal/date/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$row['referal_id']; ?>" style="float: right;" ><button class="mb-2 mr-2 btn-pill btn btn-alternate">Print
                                            </button></a>
											
											<div class="table-responsive">
                                        <table class="align-middle mb-0 table table-border table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Name</th>
												 
												<th class="text-center">Mobile No</th>
												 
												<th class="text-center">Provisional Diagnosis</th>
												<th class="text-center">Amount</th>
												 
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php
											$refer = $row['referal_id'];
											foreach($patients as $row){
                                            $CI =& get_instance();
											$CI->load->model(array('common_model'));
											$diag = $CI->common_model->get_provisional($row['patient_id']);
											$amount = $CI->common_model->get_invoiceamount($row['patient_id'],$from,$to);
											if($row['referal_id'] == $refer){
											?>
											<tr>  <td class="text-center"><?php echo $row['first_name'].'  '.$row['last_name']; ?></td>
											  <td class="text-center"><?php echo $row['mobile_no']; ?></td>
											 <td class="text-center"><?php echo $diag['prov_diagnosis']; ?></td>
											  <td class="text-center"><?php echo $amount; ?></td>
											  <td class="text-center"></td>
											</tr>
											<?php } } ?>
											</tbody>
											</table>
											
											
											</div>
											
                                            </div>
                                        </div>
                                    </div>
									<?php } }  else if($row['referal_type_id'] == 3 ) {  ?>
                                    <div class="card">
                                        <div id="headingThree" class="card-header">
                                            <button type="button" data-toggle="collapse" data-target="#collapseOne3" aria-expanded="false" aria-controls="collapseThree" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0"><?php echo $row['adv_name']; ?><div class="mb-2 mr-2 badge badge-primary"><?php echo $row['patient']; ?></div></h5></button>
                                        </div>
                                        <div data-parent="#accordion" id="collapseOne3" class="collapse">
                                            <div class="card-body"><?php  if($patients != false){  ?>
											<a target="_blank" href="<?php echo base_url().'client/reports/print_referal/date/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$row['referal_id']; ?>" style="float: right;" ><button class="mb-2 mr-2 btn-pill btn btn-alternate">Print
                                            </button></a>
											
											<div class="table-responsive">
                                        <table class="align-middle mb-0 table table-border table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Name</th>
												 
												<th class="text-center">Mobile No</th>
												 
												<th class="text-center">Provisional Diagnosis</th>
												<th class="text-center">Amount</th>
												 
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php
											$refer = $row['referal_id'];
											foreach($patients as $row){
											$CI =& get_instance();
											$CI->load->model(array('common_model'));
											$diag = $CI->common_model->get_provisional($row['patient_id']);
											$amount = $CI->common_model->get_invoiceamount($row['patient_id'],$from,$to);
											if($row['referal_id'] == $refer){
											?>
											<tr>  <td class="text-center"><?php echo $row['first_name'].'  '.$row['last_name']; ?></td>
											  <td class="text-center"><?php echo $row['mobile_no']; ?></td>
											 <td class="text-center"><?php echo $diag['prov_diagnosis']; ?></td>
											  <td class="text-center"><?php echo $amount; ?></td>
											  <td class="text-center"></td>
											</tr>
											<?php } } ?>
											</tbody>
											</table>
											
											
											</div>
                                            </div>
                                        </div>
                                    </div>
									 <?php } } else if($row['referal_type_id'] == 4 ) { ?>
									
									
									<div class="card">
                                        <div id="headingThree" class="card-header">
                                            <button type="button" data-toggle="collapse" data-target="#collapseOne4" aria-expanded="false" aria-controls="collapseThree" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0"><?php echo $row['referal_oth_name']; ?><div class="mb-2 mr-2 badge badge-primary"><?php echo $row['patient']; ?></div></h5></button>
                                        </div>
                                        <div data-parent="#accordion" id="collapseOne4" class="collapse">
                                            <div class="card-body"><?php  if($patients != false){  ?>
											<a target="_blank" href="<?php echo base_url().'client/reports/print_referal/date/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$row['referal_id']; ?>" style="float: right;" ><button class="mb-2 mr-2 btn-pill btn btn-alternate">Print
                                            </button></a>
											
											<div class="table-responsive">
                                        <table class="align-middle mb-0 table table-border table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Name</th>
												 
												<th class="text-center">Mobile No</th>
												 
												<th class="text-center">Provisional Diagnosis</th>
												<th class="text-center">Amount</th>
												 
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php
											$refer = $row['referal_id'];
											foreach($patients as $row){
											$CI =& get_instance();
											$CI->load->model(array('common_model'));
											$diag = $CI->common_model->get_provisional($row['patient_id']);
											$amount = $CI->common_model->get_invoiceamount($row['patient_id'],$from,$to);
											if($row['referal_id'] == $refer){
											?>
											<tr>  <td class="text-center"><?php echo $row['first_name'].'  '.$row['last_name']; ?></td>
											  <td class="text-center"><?php echo $row['mobile_no']; ?></td>
											 <td class="text-center"><?php echo $diag['prov_diagnosis']; ?></td>
											  <td class="text-center"><?php echo $amount; ?></td>
											  <td class="text-center"></td>
											</tr>
											<?php } } ?>
											</tbody>
											</table>
											
											
											</div>
                                            </div>
                                        </div>
                                    </div>
									<?php } } else if($row['referal_type_id'] == 5 ) { ?>
									
									
									<div class="card">
                                        <div id="headingThree" class="card-header">
                                            <button type="button" data-toggle="collapse" data-target="#collapseOne5" aria-expanded="false" aria-controls="collapseThree" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0"><?php echo $row['referal_name']; ?><div class="mb-2 mr-2 badge badge-primary"><?php echo $row['patient']; ?></div></h5></button>
                                        </div>
                                        <div data-parent="#accordion" id="collapseOne5" class="collapse">
                                            <div class="card-body"><?php  if($patients != false){  ?>
											<a target="_blank" href="<?php echo base_url().'client/reports/print_referal/date/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$row['referal_id']; ?>" style="float: right;" ><button class="mb-2 mr-2 btn-pill btn btn-alternate">Print
                                            </button></a>
											
											<div class="table-responsive">
                                        <table class="align-middle mb-0 table table-border table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Name</th>
												 
												<th class="text-center">Mobile No</th>
												 
												<th class="text-center">Provisional Diagnosis</th>
												<th class="text-center">Amount</th>
												 
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php
											$refer = $row['referal_id'];
											foreach($patients as $row){
											$CI =& get_instance();
											$CI->load->model(array('common_model'));
											$diag = $CI->common_model->get_provisional($row['patient_id']);
											$amount = $CI->common_model->get_invoiceamount($row['patient_id'],$from,$to);
											if($row['referal_id'] == $refer){
											?>
											<tr>  <td class="text-center"><?php echo $row['first_name'].'  '.$row['last_name']; ?></td>
											  <td class="text-center"><?php echo $row['mobile_no']; ?></td>
											 <td class="text-center"><?php echo $diag['prov_diagnosis']; ?></td>
											  <td class="text-center"><?php echo $amount; ?></td>
											  <td class="text-center"></td>
											</tr>
											<?php } } ?>
											</tbody>
											</table>
											
											
											</div>
                                            </div>
                                        </div>
                                    </div>
									
									<?php } } else {  ?>
									
									
									
									
									
									<div class="card">
                                        <div id="headingThree" class="card-header">
                                            <button type="button" data-toggle="collapse" data-target="#collapseOne6" aria-expanded="false" aria-controls="collapseThree" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0"><?php echo $row['referal_name']; ?><div class="mb-2 mr-2 badge badge-primary"><?php echo $row['patient']; ?></div></h5></button>
                                        </div>
                                        <div data-parent="#accordion" id="collapseOne6" class="collapse">
                                            <div class="card-body"><?php  if($patients != false){  ?>
											<a target="_blank" href="<?php echo base_url().'client/reports/print_referal/date/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$row['referal_id']; ?>" style="float: right;" ><button class="mb-2 mr-2 btn-pill btn btn-alternate">Print
                                            </button></a>
											
											<div class="table-responsive">
                                        <table class="align-middle mb-0 table table-border table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Name</th>
												 
												<th class="text-center">Mobile No</th>
												 
												<th class="text-center">Provisional Diagnosis</th>
												<th class="text-center">Amount</th>
												 
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php
											$refer = $row['referal_id'];
											foreach($patients as $row){
											$CI =& get_instance();
											$CI->load->model(array('common_model'));
											$diag = $CI->common_model->get_provisional($row['patient_id']);
											$amount = $CI->common_model->get_invoiceamount($row['patient_id'],$from,$to);
											if($row['referal_id'] == $refer){
											?>
											<tr>  <td class="text-center"><?php echo $row['first_name'].'  '.$row['last_name']; ?></td>
											  <td class="text-center"><?php echo $row['mobile_no']; ?></td>
											 <td class="text-center"><?php echo $diag['prov_diagnosis']; ?></td>
											  <td class="text-center"><?php echo $amount; ?></td>
											  <td class="text-center"></td>
											</tr>
											<?php } } ?>
											</tbody>
											</table>
											
											
											</div>
                                            </div>
                                        </div>
                                    </div>
									
									<?php } } ?>
									
									
									<?php } ?>
									
									<?php }   else { echo '</br><center><h5 class="card-title" style="text-transform:capitalize;">No Records Found</h5></center>'; } ?>
                                </div>
                                    
									 
									 
                                </div>
                            </div>
                        </div>
						
									
                         
                         
                    </div>
                </div>
                    </div>
    </div>
 
 
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script>
		
<script>
 
	
	$('#dateFilter').click(function(e){
		e.preventDefault();
		var	
		from = $('#from').val();
		to = $('#to').val();
		var date_app=$('#from').val();
		var date = date_app.split('/'); 
		var start_date=date[0]+'-'+date[1]+'-'+date[2];
		var date_app1=$('#to').val();
		var date1 = date_app1.split('/'); 
		var to_date=date1[0]+'-'+date1[1]+'-'+date1[2];
		
		if(from == '' || to == '') {
			alert('Please select start date or end date.', 'Date Filter error');
		} else {
			window.location = '<?php echo base_url(); ?>client/reports/referal_reports/date/'+ start_date + '/' + to_date ;
		}
	});
	
	 
	
	var myDate = new Date();
		var prettyDate =(myDate.getDate()) + '/' + (myDate.getMonth()+1) + '/' +
		myDate.getFullYear();
		$(".datepicker").val(prettyDate);
		 
		  
	  
	   
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
