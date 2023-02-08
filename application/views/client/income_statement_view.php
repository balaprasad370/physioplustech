<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Income Statement - Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
     
    <meta name="msapplication-tap-highlight" content="no">
	<link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
<link href="<?php echo base_url()?>asset_list/main.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
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
                                                    <a href="<?php echo base_url().'client/reports/bill_amt' ?>" >FINANCIAL REPORTS</a>
                                                </li>
                                                <li class="active breadcrumb-item" aria-current="page">
                                                    INCOME STATEMENT
                                                </li>
                                            </ol>
                                        </nav>
                                    </div>
									<div class="card-header"> Income Statement
                                       
                                    </div>
									 
									 <div class="card-body">
                                    <div class="table-responsive">
									  
									   <table class="table table-striped" style="">
                                             
                                                <tr>
											    <td>   <input type="text" style="width: " autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="From" id="from" data-toggle="datepicker"/>
                                                </td>
												<td>   <input type="text" style="width: " autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="To" id="to" data-toggle="datepicker"/>
                                                </td>
												<td><button class="btn btn-pill btn-success" id="search_date" > Go</button>
                                                 &nbsp;&nbsp;<button class="btn btn-pill btn-info" id="ExportMe"><i class="fa fa-download"></i></button>
												</td>
												<td>
											<select class="search_type" name="search_type" id="search_type" style="width:200px;">
												<option selected="true" disabled="disabled">Please Select</option>
													<option value="1" >Patient name</option>
													<!--<option value="2" >Provisional diagnosis</option>-->
											        <option value="3" >Mobile no</option>
										  </select>
												</td>
												
												<td><div class="patient_name"> <select id="patient_name" style="width:200px;" name="patient_name">
							 <option selected="true" disabled="disabled">Please Select Patient Name</option>
							  <?php
								if ($patient_name!=false) {
                                    foreach ($patient_name as $patient_names) {
										$last_name = ($patient_names['last_name'] == '') ? '' : ucfirst($patient_names['last_name']);
										$age = ($patient_names['age'] == '0') ? '' : '('.$patient_names['age'].')';
                                        echo '<option value="'.$patient_names['patient_id'].'">'.$patient_names['first_name'].' '.$last_name.'   ('.$patient_names['patient_code'].')  '.$age.'</option>';
                                    }
                                }
                            ?>
						</select></div>
						<div class="provDiag"><select class="prov_diagnosis" name="prov_diagnosis" style="width:200px;" id="prov_diagnosis">
							<option selected="true" disabled="disabled">Please Select</option>
							<?php
								if ($provDiagList != false) {
									foreach ($provDiagList as $provDiagLists) {
										if($provDiagLists['pd_list_name'] == $keyword){
											echo '<option value="'.$provDiagLists['pd_list_name'].'" selected>'.$provDiagLists['pd_list_name'].'</option>';
										}else{
											echo '<option value="'.$provDiagLists['pd_list_name'].'">'.$provDiagLists['pd_list_name'].'</option>';
										}
									}
								}
							?></select></div><div class="mobile_no">
						<select id="mobile_no" name="mobile_no" style="width:200px;" >
							 <option selected="true" disabled="disabled">Please Select Mobile No</option>
							  <?php
								if ($patient_name!=false) {
                                    foreach ($patient_name as $patient_names) {
										echo '<option value="'.$patient_names['patient_id'].'">'.$patient_names['mobile_no'].'</option>';
                                    }
                                }
                            ?>
						</select></div> 
						</td>
												 
												</tr>
											  
                                        </table>
                                        </br>
									<?php if($this->uri->segment(4) =='p_name' ){ ?>
									   <a class="mb-2 mr-2 btn-pill btn" target="_blank" href="<?php echo base_url().'client/reports/email_income/p_name/'.$this->uri->segment(5); ?>" style="color:white;background-color:#16aaff;float:right;">Email
                                            </a>
										 <a class="mb-2 mr-2 btn-pill btn"  target="_blank" href="<?php echo base_url().'client/reports/print_income/p_name/'.$this->uri->segment(5); ?>" style="color:white;background-color:#794c8a;float:right;">Print
                                            </a>
                                           
                                             
										<?php } ?>
										<div class="card-body"><h5 class="card-title" style="text-transform:capitalize;">Income Statement Report  (<?php if($this->uri->segment('4') != 'p_name') { echo 'Date : '.$this->uri->segment('5').' to '.$this->uri->segment('6'); } else if($this->uri->segment('4') == 'p_name') { } else {  echo date('d-m-Y', strtotime('-30 days')).' To '.date('d-m-Y'); }  ?>)</h5>
									</div>
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                               <!--<th class="text-center">Patient Id</th>-->
												<th class="text-center">Name</th>
												<th class="text-center">Date</th>
												<th class="text-center">Bill No.</th>
												<th class="text-center">Payment mode</th>
												<th class="text-center">Amount<?php echo '('.$clientDetails['currency'].')' ;?></th>
												
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php  if($invoices != false){ ?>
									
											<?php $billAmountTotal = 0; $paidAmountTotal = 0; $pendingAmountTotal = 0; $advanceAmountTotal =0;
					  	                    foreach($invoices as $invoice){
						                     ?>
                                            <tr>
                                                <!--<td class="text-center"><div class="badge badge-pill badge-success"><?php echo $invoice['patient_code']; ?></div></td>-->
						                        <td class="text-center"><?php echo $invoice['first_name'].'  '.$invoice['last_name']; ?></td>
						                       <td class="text-center"><?php echo $invoice['payment_date']; ?></td>
											   <td class="text-center"><?php echo $invoice['bill_no'].''.substr($invoice['bill_id'],-7); ?></td>
											   <td class="text-center"><?php echo $invoice['payment_mode']; ?></td>
											   <td class="text-center"><?php echo number_format($invoice['paid_amt'],2,'.',''); ?></td>
                                            </tr>
                                             <?php
												//$billAmountTotal += $invoice['net_amt'];
												$paidAmountTotal += $invoice['paid_amt'];
											//	$pendingAmountTotal += $invoice['net_amt'] - $invoice['paid_amt'];
												
												}  ?>
						<tr>
						 
						<td></td>
						<td></td>
						<td></td>
						<td class="text-center">
							<strong>Total<?php echo '('.$clientDetails['currency'].')' ;?> : </strong>
						</td>
						<!--<td class="text-center">
							<strong><?php echo number_format($billAmountTotal,2,'.',''); ?></strong>
						</td>-->
						<td class="text-center">
							<strong><?php echo number_format($paidAmountTotal,2,'.',''); ?></strong>
						</td>
						<!--<td class="text-center">
						
							<strong><?php echo number_format($pendingAmountTotal,2,'.',''); ?></strong>
						</td>-->
						</tr>
                        
					  
					   <?php } else { echo '<tr><td class="text-center"  colspan="8">No More Records</td></tr>'; }  ?>
                                            </tbody>
                                        </table>
							 
							</br>
							
							<?php  $advanceAmountTotal = 0; if($advances != false){ ?>
									<div class="card-body"><h5 class="card-title" style="text-transform:capitalize;">Advance Amount (<?php if($this->uri->segment('5') != '') { echo 'Date : '.$this->uri->segment('5').' to '.$this->uri->segment('6'); } else { echo date('d-m-Y', strtotime('-30 days')).' To '.date('d-m-Y'); } ?>)</h5>
									</div>
                                        <table class="table table-striped table-bordered">
                                            
                                            <tbody>
											<?Php foreach($advances as $row){ ?>
						<tr>
						 
						<td class="text-center"><?php echo $row['first_name'].'  '.$row['last_name']; ?></td>
						<td class="text-center"><?php echo $row['advance_date']; ?></td>
						<td colspan="3">Advance Amount</font></td>
						<td>&nbsp;</td>
						<td class="text-center"><?php echo  $row['advance_amount']?> </td>
						<td>&nbsp;</td>
						</tr>
						<?php $advanceAmountTotal += $row['advance_amount']; }  ?>
						
						<tr>
						<td class="text-center">&nbsp;</td>
						<td class="text-center">&nbsp;</td>
						<td class="text-center">&nbsp;</td>
						<td class="text-center">&nbsp;</td>
						 
						<td class="text-center">
							<strong>Total<?php echo '('.$clientDetails['currency'].')' ;?> : </strong>
						</td>
						<td class="text-center">
							<strong></strong>
						</td>
						<td class="text-center">
							<strong><?php echo number_format($advanceAmountTotal,2,'.',''); ?></strong>
						</td>
						<td>
							<strong></strong>
						</td>
						</tr>
                                            </tbody>
                                        </table>
									  <?php } ?>
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
 
 
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> 		
<script>
$('select').select2();

$('#search_date').click(function(e){
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
			window.location = '<?php echo base_url(); ?>client/reports/income_statement/date/'+ start_date + '/' + to_date ;
		}
	});
	

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
	
	
	
	/* var myDate = new Date();
	var prettyDate =(myDate.getDate()) + '/' + (myDate.getMonth()+1) + '/' +
	myDate.getFullYear();
	$(".datepicker").val(prettyDate); */
	
	$('#mobile_no').change(function() {
			var value=$('#mobile_no').val();
			if(value == ''){
				alert('Please Select');
			} else{
				window.location = '<?php echo base_url().'client/reports/income_statement/mobile/' ?>'+ value;
			}
		});
		$('#patient_name').change(function() {
			var value=$('#patient_name').val();
			if(value == ''){
				alert('Please Select');
			} else {
				
				window.location = '<?php echo base_url().'client/reports/income_statement/p_name/' ?>'+ value;
			}
		});
		
		$('#prov_diagnosis').change(function() {
			var value=$('#prov_diagnosis').val();
			if(value == ''){
				alert('Please Select');
			} else{
				window.location = '<?php echo base_url().'client/reports/income_statement/diagnosis/' ?>'+ value;
			}
		}); 
		
		$(document).ready(function() {
	   $('.patient_name').fadeOut();
		$('.mobile_no').hide();
		$('.consultant').hide();
		$('.provDiag').hide();
		$('.search_type').change(function() {
			var val=$('#search_type').val();
			if(val == '1'){
				$('.patient_name').show();
				$('.mobile_no').hide();
				$('.consultant').hide();
				$('.provDiag').hide();
			} else if(val == '2') {
				$('.provDiag').show();
				$('.mobile_no').hide();
				$('.consultant').hide();
				$('.patient_name').hide();
			
			} else if(val == '3') {
				$('.mobile_no').show();
				$('.patient_name').hide();
				$('.consultant').hide();
				$('.provDiag').hide();
			} else  {
				$('.consultant').show();
				$('.patient_name').hide();
				$('.mobile_no').hide();
				$('.provDiag').hide();
			} 
		});
   });
   
   $('#ExportMe').click(function(e){
		e.preventDefault();
		var	
		from = '<?php echo $this->uri->segment(5); ?>';
		var to = '<?php echo $this->uri->segment(6); ?>';
		if(from == '' || to == '') {
			jAlert('Please select start date or end date.', 'Date Filter error');
		} else {
			window.location = '<?php echo base_url(); ?>client/reports/export_incomestmt/date/' + encodeURIComponent(from.replace(/\//g, '-')) + '/' + encodeURIComponent(to.replace(/\//g, '-'));
		}
			
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
