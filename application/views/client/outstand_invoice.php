<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Outstanding Invoices - Physio Plus Tech</title>
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
                                                    OUTSTANDING INVOICES
                                                </li>
                                            </ol>
                                        </nav>
                                    </div>
									<div class="card-header"> Outstanding Invoices
                                       
                                    </div>
									 <div class="card-body">
										<div class="col-85" style="width:80%;">
											<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
											  <li class="nav-item">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
											  <li class="nav-item active">
													<a role="tab" class="nav-link Invoice active show" href="#tab-content-0" id="tab-0" data-toggle="tab" aria-selected="true">
														<span>Outstanding Invoice</span>
													</a>
												</li>
												<li class="nav-item">
													<a role="tab" class="nav-link Expense show" href="#tab-content-1" id="tab-0" data-toggle="tab" aria-selected="false">
														<span>Sum up Outstanding</span>
													</a>
												</li>
												
												<li class="nav-item last-child" style="float:right;"></li>
											</ul>
										</div>
                                    <div class="tab-content">
									
										 <table class="table table-striped" style="">
	                                             
	                                                <tr>

												<td>
												<select style="width:250px;" class="therapist" name="therapist" id="therapist">
													<?php if($staff != false){ ?>
													<option selected="true" value="<?php echo $staff_id; ?>" disabled="disabled"><?php echo $staff; ?></option>
													<?php } else { ?>
													<option selected="true" disabled="disabled">Please Select Staff Name</option>
													<?php }  foreach($info as $row) { ?>
														<option value="<?php echo $row['staff_id'] ?>"><?php echo $row['first_name'].' '.$row['last_name'] ?></option>
													<?php } ?>
											  </select>
													</td>
													
												    <td>   <input type="text" style="width:250px;" autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="From" id="from" data-toggle="datepicker"/>
	                                                </td>
													<td>   <input type="text" style="width:250px" autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="To" id="to" data-toggle="datepicker"/>
	                                                </td>
													<td><button class="btn btn-pill btn-success" id="dateFilter" > Go</button>
													 &nbsp;&nbsp;<button class="btn btn-info btn-pill" id="export"><i class="fa fa-download"></i></button>
													</td>
													
													 
													</tr>
												  
	                                        </table>
										<div class="tab-pane tabs-animation fade active show in" id="tab-content-0" role="tabpanel">
											<div class="table-responsive">
											  
											  
												<div class="card-body"><h5 class="card-title" style="text-transform:capitalize;">Outstanding Invoice (<?php if($this->uri->segment('5') != '') { echo 'Date : '.$this->uri->segment('5').' to '.$this->uri->segment('6'); } else { echo date('d-m-Y', strtotime('-30 days')).' To '.date('d-m-Y'); } ?>)</h5>
											</div>
											<table class="table table-striped table-bordered">
													<thead>
													<tr>
													   <th class="text-center">S.No</th>
														<th class="text-center">Date</th>
														<th class="text-center">Patient Name</th>
														<th class="text-center">Staff Name</th>
														<th class="text-center">Total Amount (INR)</th>
														<th class="text-center">Paid Amount (INR)</th>
														<th class="text-center">Due Amount (INR)</th>
														 
													</tr>
													</thead>
													<tbody>
													<?php  if($result != false){ ?>
													<?php $c=1; 
													$amt=0;
													$amt1=0;
													$amt2=0;
													?>
														<?php foreach($result as $row)
														{ ?>
															<?php $this->db->select('*')->from('tbl_staff_info')->where('staff_id',$row['staff_id']);
															$query=$this->db->get();
															if($query->result_array() != false){
															$first_name1=$query->row()->first_name;
															$last_name1=$query->row()->last_name;
															} else {
																$first_name1='Not';
																$last_name1= 'Mentioned';
															}
															
															?>
													<tr>
													   <td class="text-center"><?php echo $c;?></td>
													   <td class="text-center"><?php echo $row['treatment_date'] ?></td>
													   <td class="text-center"><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
													   <td class="text-center"><?php echo $first_name1.' '.$last_name1 ?></td>
													   <td class="text-center"><?php echo $row['net_amt'] ?></td>
													   <td class="text-center"><?php echo $row['paid_amt'] ?></td>
													   <td class="text-center"><?php echo ($row['net_amt'] - $row['paid_amt']); ?></td>
													   
														</tr>
												 <?php  $c=$c+1; $amt += $row['net_amt']; ?>
												 <?php   $amt1 += $row['paid_amt']; ?>
												 <?php  $amt2 += $row['net_amt']-$row['paid_amt']; ?>
												<?php } ?>
													<tr>
													<td class="text-center"></td>
													<td class="text-center"></td>
													<td class="text-center"></td>
													 
													<td class="text-center"> Total (INR)</td>
													<td class="text-center"> <strong><?php echo $amt; ?></strong> </td>
													<td class="text-center"> <strong><?php echo $amt1; ?></strong> </td>
													<td class="text-center"> <strong><?php echo $amt2; ?></strong> </td>
													</tr>
												<?php } ?>
												</tbody></table>
												 
												</br>
											</div>
										</div>
										
										<div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
											<div class="table-responsive">
										  
										   <!--<table class="table table-striped" style="">
	                                             
	                                                <tr>

												<td>
												<select style="width:250px;" class="therapist" name="therapist" id="therapist">
													<?php if($staff != false){ ?>
													<option selected="true" value="<?php echo $staff_id; ?>" disabled="disabled"><?php echo $staff; ?></option>
													<?php } else { ?>
													<option selected="true" disabled="disabled">Please Select Staff Name</option>
													<?php }  foreach($info as $row) { ?>
														<option value="<?php echo $row['staff_id'] ?>"><?php echo $row['first_name'].' '.$row['last_name'] ?></option>
													<?php } ?>
											  </select>
													</td>
													
												    <td>   <input type="text" style="width:250px;" autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="From" id="from" data-toggle="datepicker"/>
	                                                </td>
													<td>   <input type="text" style="width:250px" autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="To" id="to" data-toggle="datepicker"/>
	                                                </td>
													<td><button class="btn btn-pill btn-success" id="dateFilter" > Go</button>
													 &nbsp;&nbsp;<button class="btn btn-info btn-pill" id="export"><i class="fa fa-download"></i></button>
													</td>
													
													 
													</tr>
												  
	                                        </table>-->
											<div class="card-body"><h5 class="card-title" style="text-transform:capitalize;">Outstanding Invoice (<?php if($this->uri->segment('5') != '') { echo 'Date : '.$this->uri->segment('5').' to '.$this->uri->segment('6'); } else { echo date('d-m-Y', strtotime('-30 days')).' To '.date('d-m-Y'); } ?>)</h5>
										</div>
										<table class="table table-striped table-bordered">
												<thead>
												<tr>
												   <th class="text-center">S.No</th>
													<th class="text-center">Date</th>
													<th class="text-center">Patient Name</th>
													<th class="text-center">Staff Name</th>
													<th class="text-center">Total Amount (INR)</th>
													<th class="text-center">Paid Amount (INR)</th>
													<th class="text-center">Due Amount (INR)</th>
													 
												</tr>
												</thead>
												<tbody>
												<?php  if($sumresult != false){ ?>
												<?php $c=1; 
												$amt=0;
												$amt1=0;
												$amt2=0;
												?>
													<?php foreach($sumresult as $row)
													{ ?>
														<?php $this->db->select('*')->from('tbl_staff_info')->where('staff_id',$row['staff_id']);
														$query=$this->db->get();
														if($query->result_array() != false){
														$first_name1=$query->row()->first_name;
														$last_name1=$query->row()->last_name;
														} else {
															$first_name1='Not';
															$last_name1= 'Mentioned';
														}
														
														?>
												<tr>
												   <td class="text-center"><?php echo $c;?></td>
												   <td class="text-center"><?php echo $row['treatment_date'] ?></td>
												   <td class="text-center"><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
												   <td class="text-center"><?php echo $first_name1.' '.$last_name1 ?></td>
												   <td class="text-center"><?php echo $row['net_amt'] ?></td>
												   <td class="text-center"><?php echo $row['paid_amt'] ?></td>
												   <td class="text-center"><?php echo ($row['net_amt'] - $row['paid_amt']); ?></td>
												   
													</tr>
											 <?php  $c=$c+1; $amt += $row['net_amt']; ?>
											 <?php   $amt1 += $row['paid_amt']; ?>
											 <?php  $amt2 += $row['net_amt']-$row['paid_amt']; ?>
											<?php } ?>
												<tr>
												<td class="text-center"></td>
												<td class="text-center"></td>
												<td class="text-center"></td>
												 
												<td class="text-center"> Total (INR)</td>
												<td class="text-center"> <strong><?php echo $amt; ?></strong> </td>
												<td class="text-center"> <strong><?php echo $amt1; ?></strong> </td>
												<td class="text-center"> <strong><?php echo $amt2; ?></strong> </td>
												</tr>
											<?php } ?>
											</tbody></table>
											 
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
		var  
		therapist=$('#therapist').val();
		if(from == '' || to == '') {
			alert('Please select start date or end date.', 'Date Filter error');
		} else {
			window.location = '<?php echo base_url(); ?>client/reports/outstand/search/'+ start_date + '/' + to_date + '/' + therapist;
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
				window.location = '<?php echo base_url(); ?>client/staff/export_staffpro/date/' + ty+'/'+type+'/'+val;
			}
		}
		else {
			 alert('Please select start date or end date.', 'Date Filter error');
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
