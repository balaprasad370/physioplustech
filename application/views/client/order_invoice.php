<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/select2.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/physio_style.css" />

<link rel="stylesheet" href="<?php echo base_url(); ?>font-awesome/css/font-awesome.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>



</head>
<body style="background:none; margin: 0;">

<!--Header-part-->

<div>

<div class="container-fluid">

<table>
<tr>
<td width=""><img src="<?php echo base_url().'frontend_assets/img/Physio+Logo_New.png';?>" style="" ></td>
<td width="581"><center><p><h3><font color="#6699FF">PhysioPlusTech</font></h3></p>
<div style="margin-top:15px;"><h6><font color="#6699FF">Order Invoice</font></h6></div>  
</center></td>

<!--<td width="211"><h6><font color="#FF3333">Patient Name : <?php echo $name ?></font></h6></td>-->
</tr>
</table>
    <hr>
    <div class="row-fluid" style="margin-bottom: 15px;">
		<div id="billing_address" width="300" style="margin-top:20px;float:right">
		<div style="text-align:right;font-weight:bold;">Billing Address:</div>
		<div style="text-align:right;font-size:small"><?php echo $profile['first_name'],' '. $profile['last_name'];?></div>
		<div style="text-align:right;font-size:small">PhysioPlusTech</div>
		<div style="text-align:right;font-size:small">1/7C, 2nd Street Kaliappa Nagar,Sivakasi 626123, India</div>
		</div>
        <div id="order_details" width="1000">
		<div id="order_id" style="font-size:small">
		<b>Order Number: </b>#<?php echo $order_details['order_id'];?>
		</div>
		<div id="order_date" style="margin-bottom:30px;font-size:small">
		<b>Order Date: </b><?php echo $order_details['created_date'];?>
		</div>
		<table id="order_amt" style="border:1px solid #ddd;border-collapse:collapse;"  width="1000">
		<tr>
		<th style="font-size:15px;border:1px solid #ddd;">Sl.No</th>
		<th style="font-size:15px;border:1px solid #ddd;">Description</th>
		<th style="font-size:15px;border:1px solid #ddd;">Unit Price</th>
		<th style="font-size:15px;border:1px solid #ddd;">Qty</th>
		<th style="font-size:15px;border:1px solid #ddd;">Duration</th>
		<th style="font-size:15px;border:1px solid #ddd;">Net Amount</th>
		
		</tr>
		<?php 
        $amt=0;	
        $dur=1;
		$i=1;
		$useramt=0;
		$locamt=0;
		
		if ($order_details['duration']==90){$dur=3; }else if($order_details['duration']==180){$dur=6; } else if($order_details['duration']==365){$dur=12; }	
		if($order_details['order_description']=="Plan Upgrade")
			{
		?>
		<tr style="padding:10px;"> 
		<td style="font-size:15px;border-right:1px solid #ddd;margin-bottom:30px;"><?php echo $i;?></td>
		<td style="font-size:15px;border-right:1px solid #ddd;"> <?php if ($this->session->userdata('plan')==0){$amt=0; echo 'Free Plan';}else if($this->session->userdata('plan')==1){$amt=300.00; echo 'Professional Plan';}else if($this->session->userdata('plan')==2){$amt=500.00; echo 'Monetary Plan';} else if($this->session->userdata('plan')==3){$amt=600.00; echo 'Enterprise Plan';}else{$amt=1000.00; echo 'Ultimate Prescriber Plan';}?> | Users: 1 | Location: 1</td>
		<td style="font-size:15px;border-right:1px solid #ddd;"><?php echo $amt;?></td>
		<td style="font-size:15px;border-right:1px solid #ddd;">1</td>
		<td style="font-size:15px;border-right:1px solid #ddd;"><?php echo $dur;?></td>
		<td style="font-size:15px;border-right:1px solid #ddd;"><?php echo $amt*$dur; ?> </td>
		<!--<td><?php echo $order_details['tax']; ?> </td>
		<td><?php echo $order_details['discount']; ?> </td>
		<td><?php echo $order_details['tot_pay_amount'];  $i++;?> </td>-->
		</tr>
		<?php
		if($order_details['num_users']>1)
		{
			$user=100;
			$useramt=($order_details['num_users']-1)*$dur*$user;
		?>
		<tr>
		<td style="font-size:15px;border-right:1px solid #ddd;"> <?php echo $i;?></td>
		<td style="font-size:15px;border-right:1px solid #ddd;"> Users</td>
		<td style="font-size:15px;border-right:1px solid #ddd;"> <?php echo $user;?> </td>
		<td style="font-size:15px;border-right:1px solid #ddd;"> <?php echo $order_details['num_users']-1;?></td>
		<td style="font-size:15px;border-right:1px solid #ddd;"><?php echo $dur;?></td>
		<td style="font-size:15px;border-right:1px solid #ddd;"><?php echo $useramt; $i++; ?> </td>
		</tr>
		<?php  } ?><!-- num_users -->
		
		<?php
		if($order_details['num_location']>1)
		{
			$loc=7000;
			$locamt=($order_details['num_location']-1)*$loc;
		?>
		<tr>
		<td style="font-size:15px;border-right:1px solid #ddd;"> <?php echo $i;?></td>
		<td style="font-size:15px;border-right:1px solid #ddd;"> Location</td>
		<td style="font-size:15px;border-right:1px solid #ddd;"> <?php echo $loc;?> </td>
		<td style="font-size:15px;border-right:1px solid #ddd;"> <?php echo $order_details['num_location']-1;?></td>
		<td style="font-size:15px;border-right:1px solid #ddd;"><?php echo $dur;?></td>
		<td style="font-size:15px;border-right:1px solid #ddd;"><?php echo $locamt; $i++; ?> </td>
		</tr>
		<?php  } ?><!-- num_location -->
		
		<?php
		if($order_details['sms']>0)
		{
			$persms=0;
			$sms=0;
			$smsamt=$order_details['sms'];
			if($order_details['sms']==102){$persms=0.51; $sms=200;} else if($order_details['sms']==188){$persms=0.47; $sms=400;} else if($order_details['sms']==430){$persms=0.43;$sms=1000;} else if($order_details['sms']==780){$persms=0.39;$sms=2000;} else if($order_details['sms']==1750){$persms=0.35;$sms=5000;}else if($order_details['sms']==3100){$persms=0.31; $sms=10000;} 
		?>
		<tr>
		<td style="font-size:15px;border-right:1px solid #ddd;"> <?php echo $i;?></td>
		<td style="font-size:15px;border-right:1px solid #ddd;"> SMS</td>
		<td style="font-size:15px;border-right:1px solid #ddd;"> <?php echo $persms;?> </td>
		<td style="font-size:15px;border-right:1px solid #ddd;"> <?php echo $sms;?></td>
		<td style="font-size:15px;border-right:1px solid #ddd;"><?php echo $dur;?></td>
		<td style="font-size:15px;border-right:1px solid #ddd;"><?php echo $smsamt; $i++; ?> </td>
		</tr>
		<?php  } ?><!-- sms -->
		
		<?php  } ?><!-- if order plan upgrade -->
		
		<?php
		if($order_details['order_description']=="New User Upgrade")
			{
		    $user=100;
			$useramt=$order_details['users']*$dur*$user;
		?>
		<tr>
		<td style="font-size:15px;border-right:1px solid #ddd;"> <?php echo $i;?></td>
		<td style="font-size:15px;border-right:1px solid #ddd;"> Users</td>
		<td style="font-size:15px;border-right:1px solid #ddd;"> <?php echo $user;?> </td>
		<td style="font-size:15px;border-right:1px solid #ddd;"> <?php echo $order_details['users'];?></td>
		<td style="font-size:15px;border-right:1px solid #ddd;"><?php echo $dur;?></td>
		<td style="font-size:15px;border-right:1px solid #ddd;"><?php echo $useramt; $i++; ?> </td>
		</tr>
		<?php  } ?><!-- if user upgrade -->
		<?php
		if($order_details['order_description']=="New Location Upgrade")
			{
			$loc=7000;
			$locamt=($order_details['location'])*$loc;
		?>	
		<tr>
		<td style="font-size:15px;border-right:1px solid #ddd;"> <?php echo $i;?></td>
		<td style="font-size:15px;border-right:1px solid #ddd;"> Location</td>
		<td style="font-size:15px;border-right:1px solid #ddd;"> <?php echo $loc;?> </td>
		<td style="font-size:15px;border-right:1px solid #ddd;"> <?php echo $order_details['location'];?></td>
		<td style="font-size:15px;border-right:1px solid #ddd;"><?php echo $dur;?></td>
		<td style="font-size:15px;border-right:1px solid #ddd;"><?php echo $locamt; $i++; ?> </td>
		</tr>
		<?php  } ?><!-- if Location upgrade   $amt*$dur+$useramt+$locamt+$smsamt  -->
		<?php
		if($order_details['order_description']=="SMS Upgrade")
									{
                                       $persms=0;
			                           $sms=0;
			                           $smsamt=$order_details['sms'];
			                           if($order_details['sms']==102){$persms=0.51; $sms=200;} else if($order_details['sms']==188){$persms=0.47; $sms=400;} else if($order_details['sms']==430){$persms=0.43;$sms=1000;} else if($order_details['sms']==780){$persms=0.39;$sms=2000;} else if($order_details['sms']==1750){$persms=0.35;$sms=5000;}else if($order_details['sms']==3100){$persms=0.31; $sms=10000;} 
									
		?>
		<tr>
		<td style="font-size:15px;border-right:1px solid #ddd;"> <?php echo $i;?></td>
		<td style="font-size:15px;border-right:1px solid #ddd;"> SMS</td>
		<td style="font-size:15px;border-right:1px solid #ddd;"> <?php echo $persms;?> </td>
		<td style="font-size:15px;border-right:1px solid #ddd;"> <?php echo $sms;?></td>
		<td style="font-size:15px;border-right:1px solid #ddd;"><?php echo $dur;?></td>
		<td style="font-size:15px;border-right:1px solid #ddd;"><?php echo $smsamt; $i++; ?> </td>
		</tr>
		<?php  } ?><!-- if sms upgrade -->
		<tr style="border-top:1px solid #ddd;">
		<td colspan=5 style="font-size:15px;border-top:1px solid #ddd"><b>TOTAL:</b></td>
		<td style="font-size:15px;border-top:1px solid #ddd"> <?php echo $order_details['pay_amount'];?></td>
		</tr>
		</table>
		<div width="300" style="float:right;margin-top:10px;">
		<table id="tot_amt" style="border:1px solid #ddd;border-collapse:collapse;float:right;"  width="300">
		<tr>
		<td style="font-size:20px;border-right:1px solid #ddd;">Sub Total</td>
		<td style="font-size:15px;border-right:1px solid #ddd;"> <?php echo $order_details['pay_amount'];?> </td>
		</tr>
		<!--
		<?php
		if($order_details['tax']=="NULL" || $order_details['tax']=="")
		{
		}
		else{
			?>
		<tr>
		<td style="font-size:20px;border-right:1px solid #ddd;">Online Charges</td>
		<td style="font-size:15px;border-right:1px solid #ddd;"> <?php echo $order_details['tax'];?> % </td>
		</tr>
		<?php  } ?>-->
		
		<?php
		if($order_details['discount']=="NULL" || $order_details['discount']=="")
		{
		}
		else{
			?>
		<tr>
		<td style="font-size:20px;border-right:1px solid #ddd;">Discount</td>
		<td style="font-size:15px;border-right:1px solid #ddd;"> <?php echo $order_details['discount'];?> % </td>
		</tr>
		<tr>
		<td style="font-size:20px;border-right:1px solid #ddd;">Discount Amount</td>
		<td style="font-size:15px;border-right:1px solid #ddd;"> <?php echo (($order_details['pay_amount']*$order_details['discount'])/100);?> </td>
		</tr>
		<?php  } ?>
		<tr>
		<td style="font-size:20px;border-right:1px solid #ddd;">Total Amount</td>
		<td style="font-size:15px;border-right:1px solid #ddd;"> <?php echo $order_details['tot_pay_amount'];?> </td>
		</tr>
		</table>
		</div> <!-- sub total div -->
		<div style="font-size:15px;margin:0,auto;">
		
		</div>
		
		</div>
		
</div>
</div>
</div>


<!--end-main-container-part-->

<!--Footer-part-->

<!--end-Footer-part-->
<script src="<?php echo base_url(); ?>js/excanvas.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery-ui-1.10.2.custom.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.gritter.min.js"></script> 
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.uniform.js"></script> 
<script src="<?php echo base_url(); ?>js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.peity.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.colorbox-min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.form.js"></script> 
<script src="<?php echo base_url(); ?>js/physio_helper.js"></script>
<script src="<?php echo base_url(); ?>js/physio_controller.js"></script>

</body>
</html>
