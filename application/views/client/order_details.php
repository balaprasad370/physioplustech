<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>My Account - Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="msapplication-tap-highlight" content="no">
	<link href="<?php echo base_url()?>asset_list/main.css" rel="stylesheet">
	<link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
	 
 <style>
 table td{
	 font-size:16px;
 }
 table thead th{
	 padding:5px;
 }
 table tbody tr td{
	 padding:5px;
 }
 #order_amt{
	 margin-right:20px;
	 margin-top:20px;
	 
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
                                    <div class="card-header">
									
									Order Details
									<!--
									<div id="order" style="width:100%">
									<div id="order_date"> Ordered On <?php echo $order_details['created_date'];?></div>
									<div id="order_id">Order# <?php echo $order_details['order_id'];?> </div>
									</div>-->
                                        <div class="btn-actions-pane-right">
                                           <a href="<?php echo base_url().'client/account/order_invoice/'.$order_details['order_id'];?>"><i class="fa fa-receipt media-object" ></i>&nbsp;Invoice</a>
                                        </div>
                                    </div>
									
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
											<tr>
											<td height="57" class="text-center">Order Description</td>
											 <td class="text-center"><?php echo $order_details['order_description'];?></td>
											</tr>
                                            <tr>
											 <td class="text-center">Plan Name </td>
											 <td class="text-center"height="57"><div class="badge badge-pill badge-warning"><?php if ($this->session->userdata('plan')==0){echo 'Free Plan';}else if($this->session->userdata('plan')==1){echo 'Professional Plan';}else if($this->session->userdata('plan')==2){echo 'Monetary Plan';} else if($this->session->userdata('plan')==3){echo 'Enterprise Plan';}else{echo 'Ultimate Prescriber Plan';}?></div> </td>
											 <!--<td class="text-center"><a  class="mb-2 mr-2 btn-pill btn btn-primary" href="<?php echo base_url() ?>client/renewal/changeplan2" style="color:white;"><i class="fa fa-shopping-cart media-object" ></i>&nbsp;Upgrade</a> </td>-->
											 </tr>
											 
										   <?php if($order_details['order_description']=="Plan Upgrade" || $order_details['order_description']=="New User Upgrade" )
										 {
											 ?>
											 <tr>
											 <td height="57" class="text-center">No Of Users </td>
											 <td class="text-center">
											    <?php if($order_details['num_users'] == 0){
														echo $order_details['num_users'];
													  }else{
														echo $order_details['num_users'];
													  }
													?> </td>
										 <!--<td class="text-center"> <a  class="mb-2 mr-2 btn-pill btn btn-primary"  href="<?php echo base_url(); ?>client/renewal/adduser" style="color:white;"><i class="fa fa-shopping-cart media-object" ></i>&nbsp;Upgrade</a></td>-->
										 </tr>
										  <?php } ?>
										  
										 <?php if($order_details['order_description']=="New User Upgrade" )
										 {
											 ?>
											 											 <tr>
											 <td height="57" class="text-center">New Users </td>
											 <td class="text-center">
											    <?php if($order_details['users'] == 0){
														echo $order_details['users'];
													  }else{
														echo $order_details['users'];
													  }
													?> </td>
										 <!--<td class="text-center"> <a  class="mb-2 mr-2 btn-pill btn btn-primary"  href="<?php echo base_url(); ?>client/renewal/adduser" style="color:white;"><i class="fa fa-shopping-cart media-object" ></i>&nbsp;Upgrade</a></td>-->
										 </tr>
										 
										 <?php } ?>
										 
										 
										  <?php if($order_details['order_description']=="Plan Upgrade" || $order_details['order_description']=="New Location Upgrade" )
										 {
											 ?>
										 <tr>
										 <td class="text-center">No Of Locations </td>
										 <td height="57" class="text-center"><?php 
												if($order_details['num_location'] == 0){
												  echo $order_details['num_location'];
												}else{
													echo $order_details['num_location'];
												}
										?> </td>
										 <!--<td class="text-center"><a  class="mb-2 mr-2 btn-pill btn btn-primary" href="<?php echo base_url(); ?>client/renewal/addlocation" style="color:white;"><i class="fa fa-shopping-cart media-object" ></i>&nbsp;Upgrade</a> </td>-->
										 </tr> 
										 <?php } ?>
										 
										 <?php if($order_details['order_description']=="New Location Upgrade" )
										 {
											 ?>
										 <tr>
										 <td class="text-center">New Locations </td>
										 <td height="57" class="text-center"><?php 
												if($order_details['location'] == 0){
												  echo $order_details['location'];
												}else{
													echo $order_details['location'];
												}
										?> </td>
										 <!--<td class="text-center"><a  class="mb-2 mr-2 btn-pill btn btn-primary" href="<?php echo base_url(); ?>client/renewal/addlocation" style="color:white;"><i class="fa fa-shopping-cart media-object" ></i>&nbsp;Upgrade</a> </td>-->
										 </tr> 
										 <?php } ?>
										 
										 
										 
										 
										 <?php
										 
										 if($order_details['order_description']=="Plan Upgrade" || $order_details['order_description']=="SMS Upgrade")
										 {
											 ?>
                                          <tr>
										 <td height="57" class="text-center">SMS</td>
										 <!--
										 <td class="text-center"><?php echo $order_details['sms'];?></td>-->
										 <td class="text-center"><?php if($order_details['sms']==102){ echo '200';} else if($order_details['sms']==188){echo '400';} else if($order_details['sms']==430){ echo '1000';} else if($order_details['sms']==780){echo '2000';} else if($order_details['sms']==1750){echo '5000';}else if($order_details['sms']==3100){echo '10000';} ?></td>
										 <td class="text-center"> </td>
										 </tr> 


										 <tr>
										 <td height="57" class="text-center">Upgraded On</td>
										 <td class="text-center"><?php echo date('d-M-Y',strtotime($order_details['created_date']));?></td>
										 <td class="text-center"> </td>
										 </tr> 
										  <tr>
										 <td height="57" class="text-center">Expiry Date</td>
										 <td class="text-center"><?php echo date('d-M-Y',strtotime($order_details['expire_date']));?></td>
										 <td class="text-center"> </td>
										 </tr>
										 <?php 
										 }
										 ?>
										  <tr>
										 <td height="57" class="text-center">Duration</td>
										 <td class="text-center"><?php echo $order_details['duration'].' '.'Days';?></td>
										 <td class="text-center"> </td>
										 </tr>
                                        </tbody>
                                        </table>
										
								    
										 
						 
                                    </div>
									
									<table id="order_amt" style="width:80%;margin-left:25px;">
									<thead style="background-color:#ddd;">
									<?php  
								    if($order_details['order_description']=="Plan Upgrade")
										 {
											 ?>
									<th>TotalAmount</th>
									<!--<th>Tax</th>-->
									<?php
									if($order_details['discount']!="NULL")
									{
									?>
									<th>Discount</th>
									<th>Discount Description</th>
									<?php }} ?>
									
									<!-- User add table-->
									
									<?php  
								    if($order_details['order_description']=="New User Upgrade" || $order_details['order_description']=="New Location Upgrade")
										 {
											if($order_details['order_description']=="New User Upgrade")
											{
											
											 ?>
											<th>Users</th>
											<?php
										 }
										 else{
									     ?>
										    
											<th>Locations</th>
											<?php
											if($order_details['discount']!="NULL")
									             {
									              ?>
												 <th>TotalAmount</th>
									            <th>Discount</th>
									
									<?php } ?><!-- Discount -->
										<?php
										 }
									?>
											
											<th>Duration</th>
											
									<?php
										 }
									?>
									
									<!-- SMS upgrade-->
									<?php  
								    if($order_details['order_description']=="SMS Upgrade")
									{
									?>
									<th>SMS Count</th>
									<th>Rate/SMS</th>
									<th>SMS Amount</th>
									<th>Duration</th>
									<?php
										 }
									?>
									
									
									
									<th>Amount Paid</th>
									</thead>
									<tbody>
									<tr>
									<?php  
								    if($order_details['order_description']=="Plan Upgrade")
										 {
											 ?>
									<td><?php echo $order_details['pay_amount'];?></td>
									
									<!--<td><?php echo $order_details['tax'];?></td>-->
									<td><?php echo $order_details['discount'];?></td>
									<td><?php echo $order_details['discount_description'];?></td>
									<?php } else { 

                                           if($order_details['order_description']=="New User Upgrade")
											{
										?>
									<td><?php echo $order_details['users'];?></td>
									
									<?php } else if($order_details['order_description']=="New Location Upgrade"){ ?>  
									<td><?php echo $order_details['location'];?></td>
									
									<?php
											if($order_details['discount']!="NULL")
									             {
									              ?>
									<td><?php echo $order_details['pay_amount'];?></td>
									<td><?php echo $order_details['discount'];?></td>
									
									<?php } ?><!-- Discount -->
									<?php }  // New Location
									//sms
									 else //if($order_details['order_description']=="SMS Upgrade")
									{
                                       $persms=0;
			                           $sms=0;
			                           $smsamt=$order_details['sms'];
			                           if($order_details['sms']==102){$persms=0.51; $sms=200;} else if($order_details['sms']==188){$persms=0.47; $sms=400;} else if($order_details['sms']==430){$persms=0.43;$sms=1000;} else if($order_details['sms']==780){$persms=0.39;$sms=2000;} else if($order_details['sms']==1750){$persms=0.35;$sms=5000;}else if($order_details['sms']==3100){$persms=0.31; $sms=10000;} 
									?>
										<td><?php echo $sms;?></td>
										<td><?php echo $persms;?></td>
										<td><?php echo $smsamt;?></td>
									<?php } ?> <!-- Sms-->
									<td><?php echo $order_details['duration'];?></td>
									<?php } ?>
									
									
									
									<td><?php echo $order_details['tot_pay_amount'];?></td>
									</tr>
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
