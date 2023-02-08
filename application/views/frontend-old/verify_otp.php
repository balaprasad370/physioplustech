<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/jgrowl/css/jquery.jgrowl.min.css">
  
 
<meta charset="utf-8"/>
<style type= "text/css">
.footer {
    position: absolute;
    left: 0;
    bottom: 0;
    height: 100px;
    width: 100%;
    overflow: hidden;
}
 
 </style>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

 
<title> Physio Plus Tech </title>
<?php echo $this->load->view('includes_view'); ?>

<script type="text/javascript" > 
 
$(document).ready(function() {
$(".styles-open").click(function(){
$(".styles, .styles-open").animate({ "left":"-220px" }, 1000); $(".styles-closed").animate({ "left":"0" }, 1000);
return false;
});
$(".styles-closed a").click(function(){
$(".styles-closed").animate({ "left":"-220px" },1000);
$(".styles").animate({ "left":"0" }, 1000);
$(".styles-open").animate({ "left":"220" }, 1000);
return false;
});
}); 

</script>
<style type="text/css">

</style>
</head>
<body>
<?php // include_once("analyticstracking.php")?>
 
<div class="main-wrapper">

 
<div class="pattern"> 
<div class="main-wrapper">

 
<div class="top-bg"> 
 
<div class="pattern"> 

 <div class="header">
	<div class="wrapper">
	<div class="logo" style="width: auto;"> 
	<a href="<?php echo base_url(); ?>pages/home">
    <img src="<?php echo base_url(); ?>images/logo_new.png" style="height:76px;">
    </a>
    </div>
    	
<ul id="lognav">
	
			
			<!--<li><a href="<?php echo base_url ();?>patient/patient/login">Patient Login</a></li>-->

</ul>
	</div>
</div> 

 
 
</div>
 

</div>

</div>

<div class="wrapper">
<div class="home" style="margin-top:10px; margin-bottom:10px">
		</br></br><a href="<?php echo base_url(); ?>" class="style42">
		<img src="<?php echo base_url(); ?>images/Untitled-1.jpg" align="left" style="padding-right:5px">
		<font color="blue">Home</font></a>
	</div>
<table width="100%">
<tr>
<td >
<table width="100%">
<tr>
<?php if($appoint_id == "") { ?>
<div class="danger" style="margin-right:15px;color: #D8000C;background-color: #FFD2D2;text-align: center;
    margin-top: 6%;">Something went wrong!!! Try once again with your OTP link!!  </div>
    <style type ="text/css">
    #otppage{
    	display:none;
    }
    </style>

 <?php } ?>

  <?php if ($error_msg != "" && $appoint_id != "") { ?>
<div class="danger" style="margin-right:15px;color: #D8000C;background-color: #FFD2D2;text-align: center;
    margin-top: 6%;">Wrong OTP!! <a href="<?php echo base_url().'pages/otp_verification/'.$appoint_id ?>">Click here</a> to try again!!! </div>
 <?php } else{ ?>
<form action="<?php echo base_url().'chatroom/join' ?>" method="post" name="ContactUs" id="ContactUs" class="admin_form">
<?php
if($this->session->flashdata('message')): echo '<div class="success">'.$this->session->flashdata('message').'</div>'; endif;
if($this->session->flashdata('warning')): echo '<div class="danger">'.$this->session->flashdata('warning').'</div>'; endif;

?>


<td id="otppage" style=" margin-right:15px;">
		<h3 align="left" class="style7 style32">OTP verification</h3>
		<table>
			<tr>
				<td>
					<h5>Enter OTP</h5>
                     <input type="hidden" name="upload_img" id="upload_img"  style="width:100%;"/>
				</td>
			</tr>
			<tr>
				<td>
					 <input type="hidden" name="appoint_id" id="appoint_id" value="<?php echo $appoint_id; ?>" />
					<input type="text" id="otp" placeholder="Your OTP" name="otp" value="<?php echo set_value('otp') ?>" style="width:350px; height:25px;"/>
					<?php echo form_error('otp'); ?>
				</td>
			</tr>
			<tr></tr>
			<tr>
				<td>
					<input type="submit" class="submit" value="Submit" style="margin-top:10px;"/>
				</td>
			</tr>
		</table>

</td>
</tr>

</table>
</td>
</tr>
</table>
</form>

<br>
<?php } ?>


 
</div>
 
<?php echo $this->load->view('footer_view'); ?>

</div>

</div>
 <script src="<?php  echo base_url();  ?>assets/js/vendor/jgrowl/jquery.jgrowl.min.js"></script>
 <script type="text/javascript" src="<?php  echo base_url();  ?>assets/js/jquery.min.js"></script>

</body>
</html>