<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Revenue By Practitioners - Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
     
    <meta name="msapplication-tap-highlight" content="no">
	<link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
<link href="<?php echo base_url()?>asset_list/main.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/morris.css">
	 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/vendor/rickshaw/css/rickshaw.min.css">
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.peity.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/vendor/colorbox/jquery.colorbox-min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/moment.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/daterangepicker.js"></script>
   	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/amcharts.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/serial.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pie.js"></script>
	
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
                                                    <a href="<?php echo base_url().'client/reports/practitioners' ?>" >PRACTITIONERS</a>
                                                </li>
                                                <li class="active breadcrumb-item" aria-current="page">
                                                    REVENUE BY PRACTITIONERS
                                                </li>
                                            </ol>
                                        </nav>
                                    </div><div class="card-header"> Revenue By Practitioners
                                    </div>
									
									 <div class="card-body">
                                    <div class="table-responsive">
									     <table class="table table-striped " style="">
                                               <tr>
											    <td>   <input type="text" style="width: " autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="From" id="from1" data-toggle="datepicker"/>
                                                </td>
												<td>   <input type="text" style="width: " autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="To" id="to1" data-toggle="datepicker"/>
                                                </td>
												<td><button class="btn btn-pill btn-success" id="dateFilter1" > Go</button>
                                                
												</td>
												</tr>
										 </table>
									  <?php  if($result1 != false){ ?>
									<div class="card-body"><h5 class="card-title" style="text-transform:capitalize;">Summary Of revenue by practitioner (<?php if($this->uri->segment('4') == 'date') { echo 'Date : '.$this->uri->segment('5').' to '.$this->uri->segment('6'); } else { echo date('d-m-Y', strtotime('-30 days')).' To '.date('d-m-Y'); } ?>)</h5>
									</div>
									<div class="col-md-12 text-center">
                                   <span id="sparkline03"></span>
                                   </div></br>
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                               <th class="text-center">S.No</th>
												<th class="text-center">Staff Name</th>
												<th class="text-center">Amount(INR)</th>
												<th class="text-center">Discounts</th>
												<th class="text-center">Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php $i = 1; $amt = 0; foreach($result1 as $row) { ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i; $i++; ?></td>
						                        <td class="text-center"><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
						                       <td class="text-center"><?php echo $row['tot']; ?></td>
											   <td class="text-center"><?php echo $row['discount']; ?></td>
											   <td class="text-center"><?php echo $row['total']; ?></td>
                                            </tr>
											
											<?php $amt  += $row['total']; } ?>
						 
						                    <tr>
											<td></td>
											<td></td>
											<td></td>
											<td class="text-center"><strong>Total</strong></td><td class="text-center"><strong><?php echo $amt; ?></strong></td></tr>
						
                                             <?php } ?>
                                            </tbody>
                                        </table></br></br>
									  <table class="table table-striped" style="">
                                                <tr>
											    <td>   <input type="text" style="width: " autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="From" id="from" data-toggle="datepicker" value="<?php if(isset($dateFilter)) echo $from_date; ?>"/>
                                                </td>
												<td>   <input type="text" style="width: " autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="To" id="to" data-toggle="datepicker" value="<?php if(isset($dateFilter)) echo $to_date; ?>"/>
                                                </td>
												 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
												<td>
												<select style="width:250px;" class="searchType" name="staff_id" id="staff_id">
													<?php
													if ($id != false) {
															 echo '<option value="'.$id.' selected">'.$name.'</option>';
													}
													if ($staff != false) {
														foreach ($staff as $name1) {
															 echo '<option value="'.$name1['staff_id'].'">'.$name1['first_name'].' '.$name1['last_name'].'</option>';
													   
														}
													}
												?>
										        </select>
												</td>
												<td><button class="btn btn-pill btn-success" id="dateFilter" > Go</button>
                                                </td>
											</tr>
										</table>
                                        </br>
									<div class="row" style="width:100%;">
										<div class="col" >
										<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
										   <li class="nav-item active">
											<a role="tab" class="nav-link bill active show" href="#tab-content-0" id="tab-1" data-toggle="tab" aria-selected="true">
												<span>Paid Invoice</span>
											</a>
										</li>
										<li class="nav-item">
											<a role="tab" class="nav-link dr show" href="#tab-content-1" id="tab-0" data-toggle="tab" aria-selected="false">
												<span>Total Created Invoice</span>
											</a>
										</li>
									</ul></div>
									<div class="col bill_print" style="float:right;"></br><div style="float:right;" >
									<?php if($this->uri->segment(4) != ''){ ?>										
									<a class="btn btn-shadow btn-alternate" href="<?php echo base_url().'client/staff/print_paidchart/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7); ?>" target="_blank"><strong>Print</strong></a>
									<?php } else { ?>
									<a class="btn btn-shadow btn-alternate" href="<?php echo base_url().'client/staff/print_paidchart/'; ?>" target="_blank"><strong>Print</strong></a>
									<?php } ?>
									</div>
									</div>
									<div class="col dr_print" style="display:none; float:right;"></br><div style="float:right;" >
									<?php if($this->uri->segment(4) != ''){ ?>										
									<a class="btn btn-shadow btn-alternate" href="<?php echo base_url().'client/staff/print_invchart/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7); ?>" target="_blank"><strong>Print</strong></a>
									<?php } else { ?>
									<a class="btn btn-shadow btn-alternate" href="<?php echo base_url().'client/staff/print_invchart/'; ?>" target="_blank"><strong>Print</strong></a>
									<?php } ?>					</div>  
									</div>
									</div> 
									<div class="tab-content">
									<div class="tab-pane tabs-animation fade active show in" id="tab-content-0" role="tabpanel">
									
									<div class="col-sm-12 col-md-12 col-lg-12">
									    <div class="mb-3">
										 <div class="card-header-tab card-header">
										<?php if($this->uri->segment(4) == 'both')	{ ?>  
										   <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><?php echo $name.' Revenue chart ('.date('d-m-Y', strtotime($this->uri->segment(5))) .' and '.date('d-m-Y', strtotime($this->uri->segment(6))) .' )'; ?></div>
										 <?php } else { ?>
											<div class="card-header-title font-size-lg text-capitalize font-weight-normal"><?php echo $name.' Revenue chart ('.date('d-m-Y', strtotime('-30 days')) .' and '.date('d-m-Y').' )'; ?></div>
										 <?php } ?>
										</div>
										<div class="pt-0 card-body">
											<div id="line-area-example" style="width: 100%; height: 250px;"></div>
											<p><center><span class="spin" style="color:black;"></span></center></p>
										</div>
										</div>
									</div>
									<div class="card-body">
									<?php if($this->uri->segment(4) == 'both')	{ ?>  
								     <h5 class="card-title" style="text-transform:capitalize;"><?php echo $name.' Revenue Report ('.date('d-m-Y', strtotime($this->uri->segment(5))) .' and '.date('d-m-Y', strtotime($this->uri->segment(6))) .' )'; ?></h5>
                                    <?php } else { ?>
								     <h5 class="card-title" style="text-transform:capitalize;"><?php echo $name.' Revenue Report ('.date('d-m-Y', strtotime('-30 days')) .' and '.date('d-m-Y').' )'; ?></h5>
                                    <?php } ?>
									
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                               <th class="text-center">S.No</th>
												<th class="text-center">Date</th>
												<th class="text-center">Bill No</th>
												<th class="text-center">Patient Name</th>
												<th class="text-center">Paid Amount (INR)</th>
											</tr>
                                            </thead>
                                            <tbody>
											<?php  $a = 0; if($re_list != false){ ?>
									       <?php $i = 1; foreach($re_list as $row) { ?>
                                              <tr>
                                               <td class="text-center"><?php echo $i; $i++; ?></td>
						                       <td class="text-center"><?php echo $row['treatment_date']; ?></td>
						                       <td class="text-center"><?php echo $row['bill_no']; ?></td>
						                       <td class="text-center"><?php echo $row['first_name'].$row['last_name']; ?></td>
						                       <td class="text-center"><?php echo $row['paid_amt']; ?></td>
						                      </tr>
                                             <?php $a += $row['paid_amt']; } ?>
											 <tr><td class="text-center" colspan="4"><strong>Total (S$)</strong></td><td class="text-center"><strong><?php echo $a; ?></strong></td></tr>
					  
					                       <?php } else { echo '<tr><td class="text-center"  colspan="6">No More Records</td></tr>'; }  ?>
                                            
                                            </tbody>
                                        </table>
							     	</br>
									</div>
									</div>
									<div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
									<?php if($this->uri->segment(4) == 'both')	{ ?>  
								     <h5 class="card-title" style="text-transform:capitalize;"><?php echo $name.' Revenue Report ('.date('d-m-Y', strtotime($this->uri->segment(5))) .' and '.date('d-m-Y', strtotime($this->uri->segment(6))) .' )'; ?></h5>
                                    <?php } else { ?>
								     <h5 class="card-title" style="text-transform:capitalize;"><?php echo $name.' Revenue Report ('.date('d-m-Y', strtotime('-30 days')) .' and '.date('d-m-Y').' )'; ?></h5>
                                    <?php } ?>
									
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                               <th class="text-center">S.No</th>
												<th class="text-center">Date</th>
												<th class="text-center">Bill No</th>
												<th class="text-center">Patient Name</th>
												<th class="text-center">Paid Amount (INR)</th>
											</tr>
                                            </thead>
                                            <tbody>
											<?php $b = 0;  if($tr_list != false){ ?>
									       <?php $i = 1; foreach($tr_list as $row) { ?>
                                            <tr>
                                               <td class="text-center"><?php echo $i; $i++; ?></td>
						                       <td class="text-center"><?php echo $row['treatment_date']; ?></td>
						                       <td class="text-center"><?php echo $row['bill_no']; ?></td>
						                       <td class="text-center"><?php echo $row['first_name'].$row['last_name']; ?></td>
						                       <td class="text-center"><?php echo $row['net_amt']; ?></td>
						                      </tr>
                                             <?php $b += $row['net_amt']; } ?>
											<tr><td class="text-center" colspan="4"><strong>Total (S$)</strong></td><td class="text-center"><strong><?php echo $b; ?></strong></td></tr>
					  
					  
					                       <?php } else { echo '<tr><td class="text-center"  colspan="6">No More Records</td></tr>'; }  ?>
                                            
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
 
 
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> 		
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.sparkline.min.js"></script>	
<script src="<?php echo base_url(); ?>assets/js/morris.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/js/vendor/rickshaw/raphael-min.js"></script> 
    <script src="<?php echo base_url(); ?>assets/js/vendor/rickshaw/d3.v2.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/rickshaw/rickshaw.min.js"></script>

<script>
$('select').select2();
$(document).ready(function() {
	$('.bill').click(function() {
		$('.bill_print').show();
		$('.dr_print').hide();
	});
	$('.dr').click(function() {
		$('.bill_print').hide();
		$('.dr_print').show();
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
		var id = $('#staff_id').val();
		if(start_date != '' && to_date != '' && id != '') {
				window.location = '<?php echo base_url(); ?>client/staff/staffpro1/both/'+ start_date + '/' + to_date + '/' +id;
			} else {
					alert('Please select start date, end date and Staff Name.', 'Error');
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
	$("#from1").val(from);
	$("#to1").val(to);
	
	if( value == 'both'){
	var	 from1 = '<?php echo date('d/m/Y', strtotime($this->uri->segment(5))); ?>';
	var to1 = '<?php echo date('d/m/Y', strtotime($this->uri->segment(6))); ?>';
	} else {
		var	 from1 = '<?Php echo date('d/m/Y', strtotime('-30 days')); ?>';
		var to1 = '<?Php echo date('d/m/Y'); ?>';
	}
	$("#from").val(from1);
	$("#to").val(to1);
	
	   
  
  $(function(){
	    $('#dateFilter1').click(function(e){
		e.preventDefault();
		var	
		from = $('#from1').val();
		to = $('#to1').val();
		var date_app=$('#from1').val();
		var date = date_app.split('/'); 
		var start_date=date[0]+'-'+date[1]+'-'+date[2];
		var date_app1=$('#to1').val();
		var date1 = date_app1.split('/'); 
		var to_date=date1[0]+'-'+date1[1]+'-'+date1[2];
		id = '';
		if(start_date == '' && to_date == '' && id != '') {
			window.location = '<?php echo base_url(); ?>client/staff/staffpro1/staff/'+ id ;
		}
		if(start_date != '' && to_date != '' && id != '') {
				window.location = '<?php echo base_url(); ?>client/staff/staffpro1/both/'+ start_date + '/' + to_date + '/' +id;
			} if(start_date != '' && to_date != '' && id == '') {
				window.location = '<?php echo base_url(); ?>client/staff/staffpro1/date/'+ start_date + '/' + to_date ;
			}
		else {
			alert('Please select start date or end date.', 'Date Filter error');
		}
	});
	  
	  
	    var val1 = <?php echo json_encode($result4); ?>;
		if(val1 != false){
		 $('#sparkline03').sparkline(val1, {
			type: 'pie',
			width: 'auto',
			height: '250px',
			sliceColors: ['#22beef','#a2d200','#ffc100','#ff4a43']
         }); 
		}
		 var val = <?php echo json_encode($result); ?>;
		if(val != false){
			 Morris.Area({
				element: 'line-area-example',
				data: val,
				xkey: 'date',
				ykeys: ['total'],
				labels: ['Total'],
				lineColors:['#0AA1CB'],
				lineWidth:'0',
				grid: false,
				fillOpacity:'0.5'
			 });
			 $('#line-area-example').show();
			 $('.spin').hide();
		 } else {
			 $('#line-area-example').hide();
			 $('.spin').html("<table class='table table-striped table-bordered'><thead><tr>Chart</tr></thead><tbody><tr><td class='text-center'  colspan='3'>No More Records</td></tr></tbody></table>");
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
