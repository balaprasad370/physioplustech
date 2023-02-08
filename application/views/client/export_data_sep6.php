<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
	 <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta http-equiv="Content-Language" content="en">
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
     <title>Data Export - Physio Plus Tech</title>
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"    />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	 <meta name="msapplication-tap-highlight" content="no">
     <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
	 <link href="<?php echo base_url()?>my_assets/main.css" rel="stylesheet"></head>
     <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/mdp.css">
	 <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/prettify.css">
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
                                    <div class="card-header"> Data Export
                                       
                                    </div>
									 <div class="card-body"><div class="col-md-12" >
                                    <div class="table-responsive">
									  <table class="table table-striped" style="">
                                              <tr>
											    <td>   <input type="text" style="width: " autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="From" id="from" data-toggle="datepicker"/>
                                                </td>
												<td>   <input type="text" style="width: " autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="To" id="to" data-toggle="datepicker"/>
                                                </td>
												
												<td>
											    <select class="search_type" style="width:220px;" name="search_type" id="search_type">
												    <option selected="true" disabled="disabled">Please Select</option>
													<option value="1" >Patient Details</option>
													<option value="2" >Home patient Details</option>
													<option value="3" >Appointment Details</option>
											        <option value="4" >Cancel Appointment Details</option>
											        <option value="5" >Invoice Details</option>
											        <option value="6" >Expense Details</option>
											        <option value="7" >Advance Details</option>
										        </select>
												</td>
												<td>
                                                <button class="btn btn-pill btn-info" id="ExportMe"><i class="fa fa-download"></i></button>
												</td>
												</tr>
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
 
 
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/prettify.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/lang-css.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-1.11.1.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui-1.11.1.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui.multidatespicker.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>my_assets/assets/scripts/main.js"></script></body>
		<script src="<?php echo base_url();?>assets/parsley/parsley.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
		<script>
    $('select').select2();
    $(document).ready(function() {
		 
		var myDate = new Date();
		var prettyDate =(myDate.getDate()) + '/' + (myDate.getMonth()+1) + '/' + myDate.getFullYear();
		$(".datepicker").val(prettyDate);
		
		$('#ExportMe').click(function() {
			var search = $('#search_type').val();
			if(search != null){
				var from = $('#from').val();
				var v1 = from.replace("/", "-");
				var v2 = v1.replace("/", "-");
				var to = $('#to').val();
				var v1 = to.replace("/", "-");
				var v2 = v1.replace("/", "-");
				if(search == 1){
						window.location = '<?php echo base_url(); ?>client/reports/export_patient/date/' + encodeURIComponent(from.replace(/\//g, '-')) + '/' + encodeURIComponent(to.replace(/\//g, '-'));
				} else if(search == 2){
						window.location = '<?php echo base_url(); ?>client/reports/export_homepatient/date/' + encodeURIComponent(from.replace(/\//g, '-')) + '/' + encodeURIComponent(to.replace(/\//g, '-'));
				} else if(search == 3){
						window.location = '<?php echo base_url(); ?>client/reports/export_appointment/date/' + encodeURIComponent(from.replace(/\//g, '-')) + '/' + encodeURIComponent(to.replace(/\//g, '-'));
				} else if(search == 4){
						window.location = '<?php echo base_url(); ?>client/reports/export_cancelappointment/date/' + encodeURIComponent(from.replace(/\//g, '-')) + '/' + encodeURIComponent(to.replace(/\//g, '-'));
				} else if(search == 5){
						window.location = '<?php echo base_url(); ?>client/reports/export_invoice/date/' + encodeURIComponent(from.replace(/\//g, '-')) + '/' + encodeURIComponent(to.replace(/\//g, '-'));
				} else if(search == 6){
						window.location = '<?php echo base_url(); ?>client/reports/export_expense/date/' + encodeURIComponent(from.replace(/\//g, '-')) + '/' + encodeURIComponent(to.replace(/\//g, '-'));
				}else if(search == 7){
						window.location = '<?php echo base_url(); ?>client/reports/export_advance/date/' + encodeURIComponent(from.replace(/\//g, '-')) + '/' + encodeURIComponent(to.replace(/\//g, '-'));
				} else {
				alert('Invalid Search');
			  }
				
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
