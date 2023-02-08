<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Summary Of Practice Revenue Overtime - Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
     
    <meta name="msapplication-tap-highlight" content="no">
	<link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
<link href="<?php echo base_url()?>asset_list/main.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/morris.css">
	 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/vendor/rickshaw/css/rickshaw.min.css">
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script> 
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
                                                       Business Review
                                                </li>
                                                <li class="breadcrumb-item">
                                                    <a href="<?php echo base_url().'client/reports/bill_amt' ?>" >FINANCIAL REPORTS</a>
                                                </li>
                                                <li class="active breadcrumb-item" aria-current="page">
                                                    SUMMARY OF PRACTICE REVENUE OVERTIME
                                                </li>
                                            </ol>
                                        </nav>
                                    </div>
                                    <div class="card-header"> Summary Of Practice Revenue Overtime
                                    <div class="btn-actions-pane-right">
										<div >&nbsp;&nbsp;<?php if($this->uri->segment(4) == 'date'){ ?>
												 <a class="btn btn-shadow btn-alternate" href="<?php echo base_url().'client/reports/print_incomechart/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7); ?>" target="_blank">Print</a>
												 <?php } else { ?>
												  <a class="btn btn-shadow btn-alternate" href="<?php echo base_url().'client/reports/print_incomechart/date/'.date('Y-m-d', strtotime('-30 days')).'/'.date('Y-m-d'); ?>" target="_blank">Print</a>
												 <?php } ?>
										</div>
										</div>   
                                    </div>
									 <div class="card-body">
                                    <div class="table-responsive">
									  
									   <table class="table table-striped " style="">
                                             
                                                <tr>
											    <td>   <input type="text" style="width: " autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="From" id="from" data-toggle="datepicker"/>
                                                </td>
												<td>   <input type="text" style="width: " autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="To" id="to" data-toggle="datepicker"/>
                                                </td>
												<td><button class="btn btn-pill btn-success" id="dateFilter" > Go</button>
                                                
												</td>
												 
												</tr>
											  
                                        </table>
                               <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="mb-3 card">
                                <div class="card-header-tab card-header">
                                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><strong>Practice Revenue Chart</strong>  </div>
                                </div>
                                <div class="pt-0 card-body">
                                    <div id="line-area-example" style="width: 100%; height:362px;"></div>
									<h4><center><span class="spin" style="color:black;"></span></center></h4>
								</div>
                            </div>
                        </div>
                                        </br>
									<?php  if($result != false){ ?>
									<div class="card-body"><h5 class="card-title" style="text-transform:capitalize;">Summary Of Practice Revenue Overtime (<?php if($this->uri->segment('5') != '') { echo 'Date : '.$this->uri->segment('5').' to '.$this->uri->segment('6'); } else { echo date('d-m-Y', strtotime('-30 days')).' To '.date('d-m-Y'); } ?>)</h5>
									</div>
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                               <th class="text-center">S.No</th>
												<th class="text-center">Date</th>
												<th class="text-center">Amount(INR)</th>
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php $i = 1; $a = 0; foreach($result as $row) { ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i; $i++; ?></td>
						                        <td class="text-center"><?php echo $row['date']; ?></td>
						                       <td class="text-center"><?php echo $row['total']; ?></td>
                                            </tr>
											
											<?php $a += $row['total']; } ?>
						                    <tr>
											<td></td>
											<td class="text-center"><strong>Total</strong></td><td class="text-center"><strong><?php echo $a; ?></strong></td></tr>
						
                                             <?php } ?>
                                            </tbody>
                                        </table>
							 
							</br>
									<?php  if($result1 != false){ ?>
									<div class="card-body"><h5 class="card-title" style="text-transform:capitalize;">Summary Of revenue by practitioner (<?php if($this->uri->segment('5') != '') { echo 'Date : '.$this->uri->segment('5').' to '.$this->uri->segment('6'); } else { echo date('d-m-Y', strtotime('-30 days')).' To '.date('d-m-Y'); } ?>)</h5>
									</div>
									<div class="col-md-12 text-center">
                                   <span id="sparkline03"></span>
                                   </div>
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
											<td class="text-center"><strong>Total</strong></td><td class="text-center"><strong><?php echo $a; ?></strong></td></tr>
						
                                             <?php } ?>
                                            </tbody>
                                        </table>
							 
							</br>
							
								<?php  if($result2 != false){ ?>
									<div class="card-body"><h5 class="card-title" style="text-transform:capitalize;">Summary Of revenue by item type (<?php if($this->uri->segment('5') != '') { echo 'Date : '.$this->uri->segment('5').' to '.$this->uri->segment('6'); } else { echo date('d-m-Y', strtotime('-30 days')).' To '.date('d-m-Y'); } ?>)</h5>
									<div class="col-md-12 text-center">
                                   <span id="sparkline04"></span>
                                   </div>
									</div>
                                        <table class="table table-striped table-bordered">  
                                            <thead>
                                            <tr>
                                               <th class="text-center">S.No</th>
												<th class="text-center">Item Name</th>
												<th class="text-center">Amount(INR)</th>
												 
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php $i = 1; $amt = 0;
												$data=[];
											 foreach($result2 as $row) {
										   $this->db->where('item_id',$row['item_id']);
										   $this->db->select('item_name')->from('tbl_item');
										   $res = $this->db->get();
										   if($res->result_array() != false){
										   $item_name = $res->row()->item_name;
										   } else {
											   $item = $row['item_id'];
											   $val = explode('/',$item);
											   if($val[0] == 'PR'){
												   $this->db->where('product_id',$val[1]);
												   $this->db->select('item_name')->from('tbl_product_info');
												   $q = $this->db->get();
												   $item_name = $q->row()->item_name;
											   }
											   
										   }?>
										   <?php $data[]=$item_name;?>
										   <tr>
                                                <td class="text-center"><?php echo $i; $i++; ?></td>
						                        <td class="text-center"><?php echo $item_name; ?></td>
						                       <td class="text-center"><?php echo $row['total']; ?></td>
											    
                                            </tr>
											
											<?php $amt  += $row['total']; } ?>
						                    <tr>
											 <td></td>
											<td class="text-center"><strong>Total</strong></td><td class="text-center"><strong><?php echo $amt; ?></strong></td></tr>
						
                                             <?php } ?>
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
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.sparkline.min.js"></script>	
<script src="<?php echo base_url(); ?>assets/js/morris.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/js/vendor/rickshaw/raphael-min.js"></script> 
    <script src="<?php echo base_url(); ?>assets/js/vendor/rickshaw/d3.v2.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/rickshaw/rickshaw.min.js"></script>

<script>
$('select').select2();

$(function(){
		 var val = <?php echo json_encode($result); ?>;
		if(val != false){
			 Morris.Area({
				element: 'line-area-example',
				data: val,
				xkey: 'date',
				ykeys: ['total'],
				labels: ['Total'],
				lineColors:['#a2d200'],
				lineWidth:'0',
				grid: false,
				fillOpacity:'0.5'
			 });
			 $('#line-area-example').show();
			 $('.spin').hide();
		 } else {
			 $('#line-area-example').hide();
			 $('.spin').text('No records Found');
		 }
		var val1 = <?php echo json_encode($result4); ?>;
		var datan = <?php echo json_encode($result5); ?>;
		//console.log(datan);	
			var stuff = {};
			for (let i = 0; i < datan.length; i++) {

			stuff[i] = datan[i];
			}
			//console.log(stuff);
		if(val1 != false){
		 $('#sparkline03').sparkline(val1, {
			type: 'pie',
			width: 'auto',
			height: '250px',
				tooltipFormat: '{{offset:offset}} ({{percent.1}}%)',
				tooltipValueLookups: {
				'offset': stuff
				},
			sliceColors: ['#22beef','#a2d200','#ffc100','#ff4a43']
         }); 
		}
		var val2 = <?php echo json_encode($result3); ?>;
		var val3 = <?php echo json_encode($data); ?>;
		//console.log(val2);
		//console.log(val3);
		var item = {};
			for (let i = 0; i < val3.length; i++) {
			item[i] = val3[i];
			}
		if(val2 != false){
		 $('#sparkline04').sparkline(val2, {
			type: 'pie',
			width: 'auto',
			height: '250px',
			tooltipFormat: '{{offset:offset}} ({{percent.1}}%)',
				tooltipValueLookups: {
				'offset': item
				},
			sliceColors: ['#22beef','#a2d200','#ffc100','#ff4a43']
         }); 
		}
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
		id = '';
		if(start_date == '' && to_date == '' && id != '') {
			window.location = '<?php echo base_url(); ?>client/reports/income_charts/staff/'+ id ;
		}
		if(start_date != '' && to_date != '' && id != '') {
				window.location = '<?php echo base_url(); ?>client/reports/income_charts/both/'+ start_date + '/' + to_date + '/' +id;
			} if(start_date != '' && to_date != '' && id == '') {
				window.location = '<?php echo base_url(); ?>client/reports/income_charts/date/'+ start_date + '/' + to_date ;
			}
		else {
			alert('Please select start date or end date.', 'Date Filter error');
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
