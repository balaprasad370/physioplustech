<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Order History - Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="msapplication-tap-highlight" content="no">
	<link href="<?php echo base_url()?>asset_list/main.css" rel="stylesheet">
	<link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
	 
 <style>
 table td{
	 font-size:16px;
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
                                    <div class="card-header">Order Details
                                        <div class="btn-actions-pane-right">
                                           <!--<button class="mb-2 mr-2 btn-pill btn btn-success" onclick="window.location.href = 'http://localhost/physioplus_tech/client/account/index';" style="color:white;"><i class="fa fa-history media-object" ></i>&nbsp;Order History</button> -->
                                        </div>
                                    </div>
									
									<?php 
										if($orderHistory != false){
											
													foreach ($orderHistory as $order) {
														
												
									?>
                                    <div class="table-responsive">
									<div style="width:80%;border:1px solid #ddd;margin-top:20px;margin-left:2px;margin-bottom:20px;">
									<table style="width:100%;">
									<thead style="background-color:#ddd;">
									<th style="padding-left:20px" colspan=5>
									<div id="order_placed" style="width:20%;float:left;">
									<div>ORDER PLACED</div>
									<div> <?php echo $order['created_date']; ?></div>
									</div>
									
									<div id="amt" style="width:20%;float:left;">
									<div>PAID AMT</div>
									<div> Rs.<?php echo $order['tot_pay_amount']; ?></div>
									</div>
									
									<!--<th colspan=2 style="text-align:right"> -->
									<div id="order_details" style="float:right;">
									<div>ORDER #<?php echo $order['order_id']; ?></div>
									<div><a href="<?php echo base_url().'client/account/order_details/'.$order['order_id'];?>">Order Details</a></div>
									</div>
									
									</th>
									</thead>
									<tbody>
									
									<tr>
									<td style="padding-left:20px;width:50%;">
									<div>Order Description: <?php echo $order['order_description']; ?></div>
									</tr>
									<tr style="border:1px solid #ddd;">
									<td style="padding-left:20px;;width:50%;">
									<div>Plan:<?php if ($order['plan_type']==0){echo 'Free Plan';}else if($order['plan_type']==1){echo 'Professional Plan';}else if($order['plan_type']==2){echo 'Monetary Plan';} else if($order['plan_type']==3){echo 'Enterprise Plan';}else{echo 'Ultimate Prescriber Plan';}?></div> 
									</td>
									<?php 
									if($order['order_description']=="Plan Upgrade")
									{
									?>
								    <td style="width=10%;border:1px solid #ddd;">
									<div>Users:<?php echo $order['num_users']; ?></div>
									</td>
									<td style="width=15%;border:1px solid #ddd;">
									<div>Location:<?php echo $order['num_location']; ?></div>
									</td>
									<td style="width=15%;border:1px solid #ddd;">
									<div>SMS:<?php if($order['sms']==102){echo '200';} else if($order['sms']==188){echo '400';} else if($order['sms']==430){echo '1000';} else if($order['sms']==780){echo '2000';} else if($order['sms']==1750){echo '5000';}else if($order['sms']==3100){echo '10000';} ?></div>
									</td>
									
									<?php
									}
									else{
										
										if($order['order_description']=="New User Upgrade")
										{
									?>
									<td style="width=20%;border:1px solid #ddd;">
									<div>Users:<?php echo $order['num_users']; ?></div>
									</td>
									<td style="width=15%;border:1px solid #ddd;">
									<div>New Users:<?php echo $order['users']; ?></div>
									</td>
									<?php 
									} else  if($order['order_description']=="New Location Upgrade"){
									?>
									
									<td style="width=20%;border:1px solid #ddd;">
									<div>Location:<?php echo $order['num_location']; ?></div>
									</td>
									<td style="width=15%;border:1px solid #ddd;">
									<div>New Location:<?php echo $order['location']; ?></div>
									</td>
									
									
									<?php 
									} else  if($order['order_description']=="SMS Upgrade"){
										$persms=0;
									?>
									<td style="width=20%;border:1px solid #ddd;">
									<div>SMS:<?php if($order['sms']==102){$persms=0.51; echo '200';} else if($order['sms']==188){$persms=0.47; echo '400';} else if($order['sms']==430){$persms=0.43; echo '1000';} else if($order['sms']==780){$persms=0.39; echo '2000';} else if($order['sms']==1750){$persms=0.35; echo '5000';}else if($order['sms']==3100){$persms=0.31; echo '10000';} ?></div>
									</td>
									<td style="width=15%;border:1px solid #ddd;">
									<div>Rate/SMS:<?php echo $persms; ?></div>
									</td>
									<?php 
									} 
									?>
									
									<!--plan -else closing-->
									<?php 
									}
									?>
									
									<td style="width=15%;">
									<div>Duration:<?php echo $order['duration']; ?></div>
									</td>
									</tr>
									
									</tbody>
									</table>
									</div>
										<?php } } ?>
									<!--
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
										
                                            <thead>
                                            <tr>
											 
											
											 
											 <td class="text-center">Plan Name </td>
											 <td class="text-center"height="57"><div class="badge badge-pill badge-warning"><?php if ($this->session->userdata('plan')==0){echo 'Free Plan';}else if($this->session->userdata('plan')==1){echo 'Professional Plan';}else if($this->session->userdata('plan')==2){echo 'Monetary Plan';} else if($this->session->userdata('plan')==3){echo 'Enterprise Plan';}else{echo 'Ultimate Prescriber Plan';}?></div> </td>
											 <td class="text-center"><a  class="mb-2 mr-2 btn-pill btn btn-primary" href="<?php echo base_url() ?>client/renewal/changeplan2" style="color:white;"><i class="fa fa-shopping-cart media-object" ></i>&nbsp;Upgrade</a> </td>
											
											 
											 </tr>
											 <tr>
											 <td height="57" class="text-center">No Of Users </td>
											 <td class="text-center">
											    <?php if($account_info['num_users'] == 0){
														echo $account_info['num_users'];
													  }else{
														echo $account_info['num_users'];
													  }
													?> </td>
										 <td class="text-center"> <a  class="mb-2 mr-2 btn-pill btn btn-primary"  href="<?php echo base_url(); ?>client/renewal/adduser" style="color:white;"><i class="fa fa-shopping-cart media-object" ></i>&nbsp;Upgrade</a></td>
										 </tr>
										 <tr>
										 <td class="text-center">No Of Locations </td>
										 <td height="57" class="text-center"><?php 
												if($account_info['num_location'] == 0){
												  echo $account_info['num_location'];
												}else{
													echo $account_info['num_location'];
												}
										?> </td>
										 <td class="text-center"><a  class="mb-2 mr-2 btn-pill btn btn-primary" href="<?php echo base_url(); ?>client/renewal/addlocation" style="color:white;"><i class="fa fa-shopping-cart media-object" ></i>&nbsp;Upgrade</a> </td>
										 </tr> 
										 <tr>
										 <td height="57" class="text-center">Transactional Sms Usage </td>
										 <td height="57" class="text-center"><?php echo $profile['sms_count'].'/'.$profile['total_sms_limit'];?> </td>
										 <td class="text-center"><a  class="mb-2 mr-2 btn-pill btn btn-primary" href="<?php echo base_url(); ?>client/renewal/addsms" style="color:white;"><i class="fa fa-shopping-cart media-object" ></i>&nbsp;Upgrade</a> </td>
										 </tr>
										 <tr>
										 <td height="57" class="text-center">Joined On</td>
										 <td class="text-center"><?php echo date('d-M-Y',strtotime($account_info['create_date']));?></td>
										 <td class="text-center"> </td>
										 </tr> 
										  <tr>
										 <td height="57" class="text-center">Expiry Date</td>
										 <td class="text-center"><?php echo date('d-M-Y',strtotime($account_info['expire_date']));?></td>
										 <td class="text-center"> </td>
										 </tr>
										  <tr>
										 <td height="57" class="text-center">Validity</td>
										 <td class="text-center"><?php echo $this->session->userdata('duration').' '.'Days';?></td>
										 <td class="text-center"> </td>
										 </tr>
                                        </tbody>
										
                                        </table>
										 -->
						 
						 
						 
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
 
<script>
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