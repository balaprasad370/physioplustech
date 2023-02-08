<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Income (Treatment wise) - Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
      <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
    <meta name="msapplication-tap-highlight" content="no">
	
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
                                                    INCOME (TREATMENT WISE)
                                                </li>
                                            </ol>
                                        </nav>
                                    </div>
                                    <div class="card-header"> Income (Treatment Wise)
                                       
                                    </div>
									 <div class="card-body">
                                    <div class="table-responsive">
									  
									   <table class="table table-striped" style="">
                                             
                                                <tr>

											<td>
											<select style="width:250px;" class="item_name" name="item_name" id="item_name">
												<?php if($item != false) { ?>
												<option selected="true" disabled="disabled" value="<?php echo $item_id; ?>"><?php echo $item; ?></option>
												<?php } else { ?>
												<option selected="true" disabled="disabled">Please Select Treatment Item</option>
												<?php }
												if ($itemList != false) {
												foreach ($itemList as $itemLists) {
												echo '<option value="'.$itemLists['item_id'].'">'.$itemLists['item_name'].'</option>';
												}
											}
										?>
										  </select>
												</td>
												
											    <td>   <input type="text" style="width:250px;" autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="From" id="from" data-toggle="datepicker"/>
                                                </td>
												<td>   <input type="text" style="width:250px;" autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="To" id="to" data-toggle="datepicker"/>
                                                </td>
												<td><button class="btn btn-pill btn-success" id="dateFilter" > Go</button>
                                                 &nbsp;&nbsp;<button class="btn btn-pill btn-info" id="export"><i class="fa fa-download"></i></button>
												</td>
												
												 
												</tr>
											  
                                        </table>
                                       
										<div class="card-body"><h5 class="card-title" style="text-transform:capitalize;">Treatment Income Wise (<?php if($this->uri->segment('5') != '') { echo 'Date : '.$this->uri->segment('5').' to '.$this->uri->segment('6'); } else { echo date('d-m-Y', strtotime('-30 days')).' To '.date('d-m-Y'); } ?>)</h5>
									</div>
									
									 <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                              <!-- <th class="text-center">Patient Id</th>-->
												<th class="text-center">Name</th>
												<th class="text-center">Date</th>
												<th class="text-center">Bill No.</th>
												<th class="text-center">Treatment</th>
												<th class="text-center">Payment mode(INR)</th>
												<th class="text-center">Bill amount(INR)</th>
												 
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php  if($invoices != false){ ?>
									 
                                       
											<?php $billAmountTotal = 0;
													foreach ($invoices as $row) {
						                     ?>
                                            <tr>
                                                <!--<td class="text-center"><div class="badge badge-pill badge-success"><?php echo $row['patient_code']; ?></div></td>-->
						                        <td class="text-center"><?php echo $row['first_name'].'  '.$row['last_name']; ?></td>
						                       <td class="text-center"><?php echo $row['treatment_date']; ?></td>
											   <td class="text-center"><?php echo $row['bill_no']; ?></td>
											   <td class="text-center"><?php echo $row['item_name']; ?></td>
											   <td class="text-center"><?php echo $row['payment_mode']; ?></td>
											   <td class="text-center"><?php echo number_format($row['item_amount'],2,'.',''); ?></td>
											    </tr>
                                            <?php
						$billAmountTotal += $row['item_amount'];
						}  ?>
						<tr>
						 
						<td class="text-center"></td>
						<td class="text-center"></td>
						<td class="text-center"></td>
						<td class="text-center"></td>
						<td class="text-center"> Total <?php echo '('.$clientDetails['currency'].')' ;?>  </td>
						<td class="text-center"> <strong><?php echo number_format($billAmountTotal,2,'.',''); ?></strong> </td>
						</tr>
					  
					    <?php } else { echo '<tr><td class="text-center"  colspan="6">No More Records</td></tr>'; }  ?>
                                            
                                            </tbody>
                                        </table>
							 
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
		var therapist=$('#item_name').val();
		if(from == '' || to == '') {
			alert('Please select start date or end date.', 'Date Filter error');
		} else {
			window.location = '<?php echo base_url(); ?>client/reports/income_treatmentwise/search/'+ start_date + '/' + to_date + '/' + therapist;
		}
	});
	
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
   
   $('#export').click(function(e){
		e.preventDefault();
		var value = '<?php echo $this->uri->segment(4); ?>'; 
		if( value == 'search'){
			var	 ty = '<?php echo $this->uri->segment(5); ?>';
			var type = '<?php echo $this->uri->segment(6); ?>';
			var val = '<?php echo $this->uri->segment(7); ?>';
			if(from == '' || to == '')
			{
				alert('Please select start date or end date.', 'Date Filter error');
			} 
			else
			{
				window.location = '<?php echo base_url(); ?>client/reports/export_treatmentwise/date/' + ty+'/'+type+'/'+val;
			}
		}
		else {
			 alert('Please select start date or end date.', 'Date Filter error');
		}
			
	});
	
	var value = '<?php echo $this->uri->segment(4); ?>'; 
	if( value == 'search'){
	var	 from = '<?php echo date('d/m/Y', strtotime($this->uri->segment(5))); ?>';
	var to = '<?php echo date('d/m/Y', strtotime($this->uri->segment(6))); ?>';
	} else {
		var	 from = '<?Php echo date('d/m/Y', strtotime('-30 days')); ?>';
		var to = '<?Php echo date('d/m/Y'); ?>';
	}
	$("#from").val(from);
	$("#to").val(to);
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
