<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Financial Reports - Physio Plus Tech</title>
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
                                    <div class="card-header">Financial Reports (Transactions)
                                    </div>
									<div class="card-body">
                                      <div class="main-card mb-4">
                                    <div class="grid-menu grid-menu-4col">
                                        <div class="no-gutters row">
										<?php  if($this->app_access->check_user_privileges('Payment summary')){ ?>
											<div class="col-sm-3">
                                              <a href="<?php echo base_url().'client/reports/income_charts' ?>">  <div class="widget-chart widget-chart-hover">
                                                   <img style="width:140px; height:140px;" src="<?php echo base_url().'iconsforreportsection/Practice revenue1.png' ?>" ></img>
                                                   <div class="widget-subheading"></br>Practice Revenue</div>    
                                                </div></a>
                                            </div>
										<?php } ?>
											<div class="col-sm-3">
                                                <a href="<?php echo base_url().'client/reports/income_statement' ?>"> <div class="widget-chart widget-chart-hover">
                                                   <img style="width:140px; height:140px;" src="<?php echo base_url().'iconsforreportsection/Income Statement - rupee.png' ?>" ></img>
                                                   <div class="widget-subheading"></br>Income Statement</div>    
                                                </div></a>
                                            </div>
											<div class="col-sm-3">
                                                <a href="<?php echo base_url().'client/reports/income_treatmentwise' ?>"> <div class="widget-chart widget-chart-hover">
                                                   <img style="width:140px; height:140px;" src="<?php echo base_url().'iconsforreportsection/Income Treatmentwise Rupee.png' ?>" ></img>
                                                   <div class="widget-subheading"></br>Income Statement (Treatment Wise)</div>    
                                                </div></a>
                                            </div>
											<div class="col-sm-3">
                                                <a href="<?php echo base_url().'client/reports/balance' ?>"> <div class="widget-chart widget-chart-hover">
                                                   <img style="width:140px; height:140px;" src="<?php echo base_url().'iconsforreportsection/Balance Sheet Rupee.png' ?>" ></img>
                                                   <div class="widget-subheading"></br>Balance Sheet</div>    
                                                </div></a>
                                            </div>
											<?php if($this->app_access->check_user_privileges('Daily payments')){ ?>
											<div class="col-sm-3" >
                                                <a href="<?php echo base_url().'client/reports/daily_payments' ?>"> <div class="widget-chart widget-chart-hover">
                                                   <img style="width:120px; height:120px;" src="<?php echo base_url().'iconsforreportsection/Payment Type.png' ?>" ></img>
                                                   <div class="widget-subheading"></br>Payments Type</div>    
                                                </div></a>
                                            </div>
											<?php } if($this->app_access->check_user_privileges('Outstanding invoices')){ ?>
                                            <div class="col-sm-3">
                                              <a href="<?php echo base_url().'client/reports/outstand' ?>">  <div class="widget-chart widget-chart-hover">
                                                   <img style="width:140px; height:140px;" src="<?php echo base_url().'iconsforreportsection/Outstanding Invoices.png' ?>" ></img>
                                                   <div class="widget-subheading"></br>Outstanding Invoices</div>    
                                                </div></a>
                                            </div>
											<?php } ?>
                                            <div class="col-sm-3">
                                               <a href="<?php echo base_url().'client/reports/expansereport' ?>">  <div class="widget-chart widget-chart-hover">
                                                   <img style="width:140px; height:140px;" src="<?php echo base_url().'iconsforreportsection/Expense report.png' ?>" ></img>
                                                   <div class="widget-subheading"></br>Expense Report</div>    
                                                </div></a>
                                            </div>
                                            <div class="col-sm-3">
                                               <a href="<?php echo base_url().'client/reports/advance' ?>">  <div class="widget-chart widget-chart-hover">
                                                   <img style="width:140px; height:140px;" src="<?php echo base_url().'iconsforreportsection/Advance Report.png' ?>" ></img>
                                                   <div class="widget-subheading"></br>Advance Report</div>    
                                                </div></a>
                                            </div>
											
											<div class="col-sm-3" ></div>
											<div class="col-sm-3" ></div>
											<div class="col-sm-3" ></div>
											<div class="col-sm-3" ></div>
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
</div>
 
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> 		
<script>
$('select').select2();
$('.mode').hide();
		$('.status').hide();
		$('.mode').change(function(){
			var value=$('#mode').val();
			window.location="<?php echo base_url() ?>client/reports/bill_amt/PaymentMode/"+value;
		});
		$('.pay_sta').change(function(){
			var value=$('#pay_sta').val();
			window.location="<?php echo base_url() ?>client/reports/bill_amt/searchby/status/"+value;
		});
		
		$('#searchType').change(function(){
			var value=$('#searchType').val();
			if(value == 'PaymentMode'){ 
			  $('.mode').show();
			  $('.status').hide();
			}
			else {
				$('.status').show();
				$('.mode').hide();
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

