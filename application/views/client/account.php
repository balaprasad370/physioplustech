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
	 <script src="<?php echo base_url() ?>assets/sweet-alert/sweetalert.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/sweet-alert/sweetalert.css"> 
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
                                    <div class="card-header">Account Details
                                        <div class="btn-actions-pane-right">
                                            <button class="mb-2 mr-2 btn-pill btn btn-success" style="color:white;"><a href="<?php echo base_url() ?>client/account/order_history" style="color:white;"><i class="fa fa-history media-object" ></i>&nbsp;Order History</a></button> 
                                        </div>
                                    </div>
                                    <div class="table-responsive">
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
										 <!--<td class="text-center"><a  class="mb-2 mr-2 btn-pill btn btn-primary" href="<?php echo base_url(); ?>client/renewal/addlocation" style="color:white;"><i class="fa fa-shopping-cart media-object" ></i>&nbsp;Upgrade</a> </td>  -->
										 <!--<td class="text-center"> </td>-->
                                                                                 <td class="text-center"><button onclick="sweetAlert('To Upgrade Location', 'Contact:Dr.Deepshikha   Mobile:7010479262', 'success');"  class="mb-2 mr-2 btn-pill btn btn-primary"  style="color:white;"><i class="fa fa-shopping-cart media-object" ></i>&nbsp;Upgrade</button> </td>
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
