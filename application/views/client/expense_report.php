<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Expense Report - Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="msapplication-tap-highlight" content="no">
	<link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
	<link href="<?php echo base_url()?>asset_list/main.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<style>
.pagination {
  display: inline-block;
}
.pagination li {
  color: black;
  float: left;
  text-decoration: none;
}
</style>
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
                                                    EXPENSE REPORT
                                                </li>
                                            </ol>
                                        </nav>
                                    </div>
									<div class="card-header">Expense Report
                                        <div class="btn-actions-pane-right">
                                            </div>
                                    </div>
									<div class="col-md-12">
                                    <div class="table-responsive">
									    <table class="table table-striped">
                                              <tr>
											    <td>   <input type="text" style="width: " autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="From" id="from" data-toggle="datepicker"/>
                                                </td>
												<td>   <input type="text" style="width: " autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="To" id="to" data-toggle="datepicker"/>
                                                </td>
												<td><button class="btn btn-success btn-pill" id="dateFilter" > Go</button>&nbsp;&nbsp; 
												<button class="btn btn-info btn-pill" id="ExportMe" ><i class="fa fa-download"></i> </button></td>
												 </tr>
											  
                                        </table>
                                         <div class="card-body"><h5 class="card-title" style="text-transform:capitalize;">Expense Report (<?php if($this->uri->segment('5') != '') { echo 'Date : '.$this->uri->segment('5').' to '.$this->uri->segment('6'); } else { echo date('d-m-Y', strtotime('-30 days')).' To '.date('d-m-Y'); } ?>)</h5>
									</div>
									<?php  if($expanse != false){ ?>
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                               <th class="text-center">Bill No.</th>
												<th class="text-center">Vendor</th>
												<th class="text-center">Date</th>
												<th class="text-center">Total Amount (INR)</th>
												 
                                            </tr>
                                            </thead>
                                            <tbody>
                                       <?php $totalamt = 0; 
										foreach ($expanse as $row) {
										?>
                                            <tr id="">
                                                <td class="text-center">
												 <a href="<?php echo base_url().'client/bill/expanse_edit/'.$row['bill_no'] ?>" >
												<div class="badge badge-pill badge-info"><?php echo $row['bill_no']; ?></div>
												 </a>
												</td>
                                                <td class="text-center">
                                                 <?php echo $row['ventor']; ?>
                                                </td>
                                                <td class="text-center"><?php echo date('d-m-Y',strtotime($row['bill_date'])); ?></td>
                                                 <td class="text-center"><?php echo number_format($row['total_amt'],2,'.',''); ?></td>
												 
                                            </tr>
                                            <?php $totalamt += $row['total_amt'];
						} ?>
						<tr><td class="text-center">&nbsp;</td><td>&nbsp;</td>
						<td class="text-center"> Total :</td>
						<td class="text-center"> <strong><?php echo number_format($totalamt,2,'.',''); ?></strong></td>
						</tr>
                                            </tbody>
                                        </table>
										
										<nav class="pagination-rounded" aria-label="Page navigation example" style="text-align:center;">
                                    <ul class="pagination" >
									  <?php foreach ($links as $link) { ?>
										<li>
											<?php echo $link; ?>
										</li>
										<?php } ?>
                                     </ul>
								  </nav>
								  
										 
						<?php } else { echo '<center>No Records Found</center>'; }  ?>
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
 
 
  <div style="display:none;" class="swal2-container swal2-center swal2-fade swal2-shown delete1" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progresssteps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"><span class="swal2-x-mark"><span class="swal2-x-mark-line-left"></span><span class="swal2-x-mark-line-right"></span></span></div><div class="swal2-icon swal2-question" style="display: none;"><span class="swal2-icon-text">?</span></div><div class="swal2-icon swal2-warning" style="display: none;"><span class="swal2-icon-text">!</span></div><div class="swal2-icon swal2-info" style="display: none;"><span class="swal2-icon-text">i</span></div><div class="swal2-icon swal2-success" style="display: none;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Are you sure you want to delete this Expense?</h2><button type="button" class="swal2-close" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" style="display: block;">Do you want to continue</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message" style="display: none;"></div></div><div class="swal2-actions" style="display: flex;"><button type="button" id="confirm" class="swal2-confirm swal2-styled confirm" aria-label="" style="border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);">Proceed</button><button type="button"  class="swal2-cancel swal2-styled cancel1" aria-label="">Cancel</button></div><div class="swal2-footer" style="display: none;"></div></div></div>
 <div style="display:none;" class="swal2-container swal2-center swal2-fade swal2-shown delete2" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progresssteps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"><span class="swal2-x-mark"><span class="swal2-x-mark-line-left"></span><span class="swal2-x-mark-line-right"></span></span></div><div class="swal2-icon swal2-question" style="display: none;"><span class="swal2-icon-text">?</span></div><div class="swal2-icon swal2-warning" style="display: none;"><span class="swal2-icon-text">!</span></div><div class="swal2-icon swal2-info" style="display: none;"><span class="swal2-icon-text">i</span></div><div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" style="display: block;">Deleted Successfully!</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message" style="display: none;"></div></div><div class="swal2-actions" style="display: flex;"><button type="button" class="swal2-confirm swal2-styled cancel2" aria-label="" style="border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);">Cool</button><button type="button" class="swal2-cancel swal2-styled" style="display: none;" aria-label="">Cancel</button></div><div class="swal2-footer" style="display: none;"></div></div></div></div>

 
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> 		
<script>
$('select').select2();

$(document).ready(function() {
	
	$('.cancel1').click(function() {
		$('.delete1').hide();
	});
	$('.cancel2').click(function() {
		$('.delete2').hide();
	});
	$('.delete').click(function() {
		$('.delete1').show();
	});
	
	$('.confirm').click(function() {
		var bill_no = $(location).attr('href').split('#')[1];
		var utl= '<?php echo base_url().'client/bill/delete' ?>';
		$.ajax({
				type: 'post',
				url: utl,
				data : {p_id:bill_no},
				dataType: 'json', 
				success:function(data, textStatus, jqXHR,form) 
				{
					if(data.status == 'success') {
					$('.delete1').hide();
					$('.delete2').show();
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
			jAlert('Please select start date or end date.', 'Date Filter error');
		} else {
			window.location = '<?php echo base_url(); ?>client/reports/expansereport/date/'+ start_date + '/' + to_date ;
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
