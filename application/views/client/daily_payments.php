<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Payments List - Physio Plus Tech</title>
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
                                                    PAYMENTS LIST
                                                </li>
                                            </ol>
                                        </nav>
                                    </div>
									<div class="card-header"> Payments List
                                      <div class="btn-actions-pane-right">
										<div >&nbsp;&nbsp; &nbsp;&nbsp;<?php if($this->uri->segment(4) == 'date'){ ?>
												 <a class="btn btn-shadow btn-alternate" href="<?php echo base_url().'client/reports/print_daily_payments/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6); ?>" target="_blank">Print</a>
												 <?php } else { ?>
												  <a class="btn btn-shadow btn-alternate" href="<?php echo base_url().'client/reports/print_daily_payments/date/'.date('Y-m-d', strtotime('-30 days')).'/'.date('Y-m-d'); ?>" target="_blank">Print</a>
												<?php } ?>
										</div>
										</div>  
                                    </div>
									<div class="card-body">
                                    <div class="table-responsive">
									  
									   <table class="table table-striped" style="">
                                             
                                                <tr>
											    <td>   <input type="text" style="width: " autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="From" id="from" data-toggle="datepicker"/>
                                                </td>
												<td>   <input type="text" style="width: " autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="To" id="to" data-toggle="datepicker"/>
                                                </td>
												<td><button class="btn-pill btn btn-success" id="dateFilter" > Go</button>
                                                
												</td>
												 
												</tr>
											  
                                        </table>
                                        </br>
									<div class="card-body"><h5 class="card-title" style="text-transform:capitalize;">Summary of Payments by Type (<?php if($this->uri->segment('5') != '') { echo 'Date : '.$this->uri->segment('5').' to '.$this->uri->segment('6'); } else { echo date('d-m-Y', strtotime('-30 days')).' To '.date('d-m-Y'); } ?>)</h5>
									</div>
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                               <th class="text-center">S.No</th>
												<th class="text-center">Payment mode</th>
												<th class="text-center">Amount(INR)</th>
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php  if($invoice_record != false){ ?>
									
											<?php $val = 1; foreach ($invoice_record as $invoice_records) { ?>
                                            <tr>
                                                <td class="text-center"><?php echo $val; $val = $val + 1; ?></td>
						                        <td class="text-center"><?php echo $invoice_records['payment_mode']; ?></td>
						                       <td class="text-center"><?php echo $invoice_records['paid']; ?></td>
                                            </tr>
                                             <?php } ?>
											 <?php } else { echo '<tr><td class="text-center"  colspan="3">No More Records</td></tr>'; }  ?>
                                            </tbody>
                                        </table>
							 
							</br>
									<div class="card-body"><h5 class="card-title" style="text-transform:capitalize;">Invoice List (<?php if($this->uri->segment('5') != '') { echo 'Date : '.$this->uri->segment('5').' to '.$this->uri->segment('6'); } else { echo date('d-m-Y', strtotime('-30 days')).' To '.date('d-m-Y'); } ?>)</h5>
									</div>
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                               <th class="text-center">S.No</th>
												<th class="text-center">Date</th>
												<th class="text-center">Bill Id</th>
												<!--<th class="text-center">Patient Id</th>-->
												<th class="text-center">Patient name</th>
												<th class="text-center">Source</th>
												<th class="text-center">Total amount<?php echo '('.$clientDetails['currency'].')' ;?></th>
							
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php  if($invoices != false){ ?>
									
											<?php $val = 1; foreach ($invoices as $records) { ?>
                                            <tr>
                                               <td class="text-center"><?php echo $val; $val = $val + 1; ?></td>
												<td class="text-center"><?php echo $records['cheque_date']; ?></td>
												<td class="text-center"><div class="badge badge-pill badge-info"><?php echo $records['bill_no']; ?></div></td>
												<!--<td class="text-center"><div class="badge badge-pill badge-success"><?php echo $records['patient_code']; ?></div></td>-->
												<td class="text-center"><?php echo $records['first_name'].' '.$records['last_name'];?></td>
												<td class="text-center"><?php echo $records['payment_mode'].' : Rs : '.$records['paid_amt']; ?></td>
												<td class="text-center"><?php echo $records['paid_amt']; ?></td>
						                        </tr>
                                             <?php } ?>
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
$(document).ready(function() {
		
		$('.delete').on("click", function () {
		         var concess_group_id = $(this).attr('href').split('#')[1];
					swal({
                        title: "Are you sure?",
                        text: "you want to delete this concession group?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes",
                        cancelButtonText: "No",
                        closeOnConfirm: false,
                        closeOnCancel: false},
                        function (isConfirm) {
                            if (isConfirm) {
								$.ajax({
											url : '<?php echo base_url().'client/concessgroup/delete' ?>',
											type: "POST",
											data : {p_id:concess_group_id},
											dataType: 'json', 
											success:function(data, textStatus, jqXHR,form) 
											{
												swal("Deleted!", "concessgroup record has been deleted successfully.", "success");
												setTimeout(function(){ 
													window.location.reload();
												}, 1000);
											},
											error: function(jqXHR, textStatus, errorThrown) 
											{
												swal("Failure!", "concessgroup record not has been deleted successfully", "Failure");
												setTimeout(function(){ 
													window.location.reload();
												}, 1000);
											}
									});
                            } else {
                                swal("Cancelled", "Delete Option Cancelled", "error");
                            }
                        });
                });
	
	});
	
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
			window.location = '<?php echo base_url(); ?>client/reports/daily_payments/date/'+ start_date + '/' + to_date ;
		}
	});
	
	$('#ExportMe').click(function(e){
		e.preventDefault();
		var value = '<?php echo $this->uri->segment(4); ?>'; 
		if( value == 'date'){
		var	 from = '<?php echo $this->uri->segment(5); ?>';
		var to = '<?php echo $this->uri->segment(6); ?>';
		
		if(from == '' || to == '')
		{
			jAlert('Please select start date or end date.', 'Date Filter error');
		} 
		else
		{
			window.location = '<?php echo base_url(); ?>client/reports/export_expense/date/' + encodeURIComponent(from.replace(/\//g, '-')) + '/' + encodeURIComponent(to.replace(/\//g, '-'));
		}
			
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
		 
		 
		 $('.datepicker').datetimepicker({
           dateFormat: 'D-M-YYYY' 
	  });
	  
	  $('#ExportMe').click(function(e){
		e.preventDefault();
		var value = '<?php echo $this->uri->segment(4); ?>'; 
		if( value == 'date'){
		var	 from = '<?php echo $this->uri->segment(5); ?>';
		var to = '<?php echo $this->uri->segment(6); ?>';
		
		if(from == '' || to == '')
		{
			jAlert('Please select start date or end date.', 'Date Filter error');
		} 
		else
		{
			window.location = '<?php echo base_url(); ?>client/reports/export_expense/date/' + encodeURIComponent(from.replace(/\//g, '-')) + '/' + encodeURIComponent(to.replace(/\//g, '-'));
		}
			
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
