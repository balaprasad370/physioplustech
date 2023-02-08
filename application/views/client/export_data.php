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
     <style>
         .tabs-lg-alternate.card-header>.nav .nav-item .widget-number.mob {
         display: none;
         }
         .tabs-lg-alternate.card-header>.nav .nav-item .widget-number.one {
         display: block;
         }
         a.btn-icon.btn-icon-only.btn-shadow.btn-dashed.btn.btn-outline-secondary {
         text-overflow: ellipsis;
         overflow-x: hidden;
         overflow-y: hidden;
         width: 100%;
         }
         a.btn-icon.btn-icon-only.btn-shadow.btn-dashed.btn.btn-outline-secondary {
         width: 100%;
         }
         button.btn-icon.btn-icon-only.btn-shadow.btn-dashed.btn.btn-outline-secondary {
         width: 100%;
         }
         button.btn-icon.btn-icon-only.btn-shadow.btn-dashed.btn.btn-outline-secondary img {
         width: 100% !important;
         }
         i.fas.fa-coins.fa-2x {
         font-size: 1.5em !important;
         }
         .add_new_patient {
         display: none;
         }
         @media (max-width: 768px) {
         .tabs-lg-alternate.card-header>.nav {
         display: block;
         }
         .br-1 {
         padding: 0 1em;
         }
         .arrow {
         text-align: right !important;
         color: #3f6ad8;
         font-size: 1.5em;
         }
         .add_new_patient {
         display: block;
         text-align: left !important;
         padding: 8px !important;
         box-shadow: 1px 4px 11px 1px #f3f2f2;
         margin-bottom: 8px;
         border: 1px solid rgb(238 238 238 / 70%);
         border-radius: 6px;
         }
         .tabs-lg-alternate.card-header>.nav .nav-link {
         display: flex;
         flex-direction: row;
         justify-content: space-between;
         }
         .tabs-lg-alternate.card-header>.nav .nav-item .widget-number.mob {
         display: block;
         }
         .tabs-lg-alternate.card-header>.nav .nav-item .widget-number.one {
         display: none;
         }
         .col-md-6.col-sm-6.col-xs-6.pull-right {
         margin: 0 !important;
         }
         .tab-pane.active.show .card-header {
         height: auto;
         display: block;
         padding: .75rem 0;
         text-align: center;
         margin-bottom: 8px !important;
         border: none !important;
         }
         .table-responsive.add_patient {
         display: none;
         }
         }
         img
         {
         vertical-align: middle;
         }
         #tab-content-1 .widget-number
         {
         font-size: large;
         }
         .mob_none {
         display: block;
         }
         .mob {
         display: none;
         }
         @media (max-width: 768px) {
            .mob_none {
               display: none;
            }
            .mob {
               display: block;
            }
            .add_new_patient {
               display: block;
               text-align: left !important;
               padding: 8px !important;
               box-shadow: 1px 4px 11px 1px #f3f2f2;
               margin-bottom: 8px;
               border: 1px solid rgb(238 238 238 / 70%);
               border-radius: 6px;
               margin: 1em 6px;
            }
            .table-bordered th, .table-bordered td {
               border: 1px solid #e9ecef;
               padding: 4px;
            }
         }
      </style>
	</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
                          
				<?php include("sidebar.php");?>
                 <div class="app-main__outer">
                <div class="app-main__inner">
                                
                    <div class="tabs-animation">
                         <div class="row mob">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header"> Data Export
                                       
                                    </div>
									 <div class="card-body"><div class="col-md-12" >
                                    <div class="table-responsive">
									  <table class="table table-striped" style="">
                                              <tr>
											    <td >   <input type="text" style=" " autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="From" id="from" data-toggle="datepicker"/>
                                                 <br>   <input type="text" style=" " autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="To" id="to" data-toggle="datepicker"/>
                                                </td>
												</tr>
												<tr><td>
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
												&nbsp;
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
                        
                        <div class="row mob_none">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header"> Data Export
                                       
                                    </div>
									 <div class="card-body"><div class="col-md-12" >
                                    <div class="table-responsive">
									  <table class="table table-striped" style="">
                                              <tr>
											    <td>   <input type="text" style="width: " autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="From" id="from1" data-toggle="datepicker"/>
                                                </td>
												<td>   <input type="text" style="width: " autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="To" id="to1" data-toggle="datepicker"/>
                                                </td>
												
												<td>
											    <select class="search_type" style="width:220px;" name="search_type" id="search_type1">
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
                                                <button class="btn btn-pill btn-info" id="ExportMe1"><i class="fa fa-download"></i></button>
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
		
		$('#ExportMe').on('click',function() {
			
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
		
		$('#ExportMe1').on('click',function() {
			
			var search = $('#search_type1').val();
			if(search != null){
				var from = $('#from1').val();
				var v1 = from.replace("/", "-");
				var v2 = v1.replace("/", "-");
				var to = $('#to1').val();
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
<script type="text/javascript">/* 
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5eceda798ee2956d73a53d09/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})(); */
</script>
<!--End of Tawk.to Script-->
</body>
</html>
