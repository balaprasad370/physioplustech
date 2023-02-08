<?php
session_start();
$_SESSION = array();

include("captcha-design/simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();

?>

<!DOCTYPE HTML>
<html>
<head>

<!-- Define Charset -->
<meta charset="utf-8"/>

<!-- Responsive Metatag -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

<!-- Page Title -->
<title> Physio Plus Tech </title>
<?php echo $this->load->view('includes_view'); ?>

<script type="text/javascript" > 

</script>
<style type="text/css">
<!--
.style2 {
	font-size: 150%;
	color: #000000;
}
.style7 {font-weight: bold; }
.style13 {font-size: 90%; }
.style29 {color: #000000; font-size: 90%; }
.styleP {color: #0099DC; font-size: 90%; }
.styleD {color: #1C9ECC; font-size: 90%; }
.style32 {color: #CC3300}
.style33 {color: #CC3300; font-weight: bold; }
.style34 {
	font-size: 90%;
	font-weight: bold;
	color: #1C9ECC;
}
.style38 {font-size: 85%; color: #CC6600; }
.style42 {font-size: 85%; color: #333333; }
.style43 {font-size: 85%; color: #000000; }
.style43 {font-size: 85%; color: #000000; }
.styleE {font-size: 90%; color: #000000; }
-->
</style>
</head>
<body>
<?php include_once("analyticstracking.php")?>
<!-- Main Wrapper -->
<div class="main-wrapper">

<!-- Pattern-->
<div class="pattern"> 
<?php echo $this->load->view('header_view'); ?>

</div>
<!-- END Pattern -->


<!-- Wrapper Section -->
<div class="wrapper">
	<div class="home" style="margin-top:10px; margin-bottom:10px">
		<a href="#" class="style42">
		
		</a>
	</div>

<!-- Title Banner Section -->
<img src="<?php echo base_url(); ?>images/title_contact.png">

<!-- Contact Function Section -->
<table width="100%">
<tr>
<td>
<table width="100%">
<tr>
<td style="float:left; margin-left:15px;">
<h3 align="left" class="style7 style32">Address</h3>
	<h4 align="left" class="style80">Physio Plus Tech</h4>
	<p align="left" class="style29">180, Gnanagiri Road, Palaniyandavarpuram Colony,</p>
	<p align="left" class="style29">Sivakasi east, Virudhunagar,</p>
  <p align="left" class="style29">Sivakasi-626189,</p>
	<p align="left" class="style29">Tamilnadu, India.</p>
	<p align="left" class="style29">Ph: 04562 222603,</p>
	<p align="left" class="style29">Cell: +91 98946 04603</p>
	<p align="left" class="style29">      +91 78713 82030</p>
	<a href="mailto:contact@physioplusnetwork.com" class="mail">
	<p align="left" class="styleP">Mail: contact@physioplusnetwork.com</p>
	</a>
</td>
<td style="float:right; margin-right:15px;">
<img src="<?php echo base_url(); ?>images/contact img.png">
</td>
</tr>
</table>
</td>
</tr>
</table>
<table width="100%">
<tr>
<td>
<table width="100%">
<tr>
<form action="<?php echo base_url()."pages/contact_us" ?>" method="post" name="ContactUs" id="footer-contact-form" class="admin_form">
<?php
if($this->session->flashdata('message')): echo '<div class="success">'.$this->session->flashdata('message').'</div>'; endif;
						?>
<td style="float:left; margin-left:15px;">
	<h3 align="left" class="style7 style32">Contact Us</h3>
	<p align="left" class="style13">Feel free to send us a message.</p>
		<table>
			<tr>
				<td>
					<input type="text" id="name" placeholder="Your Name" name="name" value="<?php echo set_value('name') ?>" style="width:260px; height:25px;" required />
					
				</td>
			</tr><div id="invalid-name" class="error_msg"></div>
			<tr>
				<td>
					<input type="text" id="email" placeholder="Your Email" name="email" value="<?php echo set_value('email') ?>" style="width:260px; height:25px;" required  />
					
				</td>
			</tr><div id="invalid-email" class="error_msg"></div>
			<tr>
				<td>
					<input type="text" id="phone" placeholder="Your Number" name="phone" value="<?php echo set_value('phone') ?>" style="width:260px; height:25px;" required />
					
				</td>
			</tr><div id="invalid-phone" class="error_msg"></div>
			<tr>
				<td>
					<textarea id="message" placeholder="Your Message" name="message" value="<?php echo set_value('message') ?>" rows="5" cols="20" style="width:250px;" required></textarea>
					
				</td>
			</tr><div id="invalid-message" class="error_msg"></div>
			<tr>
				<td>
					<?php
										echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code" id="image">';

										?>
										<?php
										$var = $_SESSION['captcha'];
  
								//echo $var['code'];
								?> 
								<input type="hidden" name="captcha" value="<?php echo $var['code']; ?>" id="txt1"/>
								<div class="large-12 columns">
										<input name="txt2" id="txt2" placeholder="Enter above Captcha *"   type="text" >
											
									</div>  <div id="invalid-txt2"></div>
									<label class="test" id="lblerror" style="color:red">Captcha Do not Match</label>
				</td>
			</tr>
			
			<tr>
				<td>
					<input type="submit" class="submit" value="Submit" id="save" style="margin-top:10px;"/>
				</td>
			</tr>
		</table>
</td>
</form>
<td style="float:right; margin-right:15px;">
<h3 align="left" class="style7 style32">Our Location</h3>
<iframe width="450" height="400" style="frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
src="https://maps.google.co.in/maps?q=Physio+Plus+Sivakasi,+Sivakasi,+Tamil+Nadu&amp;hl=en&amp;sll=9.45702,77.797322&amp;sspn=0.047497,0.084028&amp;oq=physio+plus&amp;hq=Physio+Plus+Sivakasi,&amp;hnear=Sivakasi,+Virudhunagar,+Tamil+Nadu&amp;t=m&amp;ie=UTF8&amp;ll=9.456814,77.800125&amp;spn=0.023748,0.042014&amp;z=14&amp;iwloc=A&amp;cid=17475005918195933318&amp;output=embed">
</iframe>
<br>
<small>
<a href="https://maps.google.co.in/maps?q=Physio+Plus+Sivakasi,+Sivakasi,+Tamil+Nadu&amp;hl=en&amp;sll=9.45702,77.797322&amp;sspn=0.047497,0.084028&amp;oq=physio+plus&amp;hq=Physio+Plus+Sivakasi,&amp;hnear=Sivakasi,+Virudhunagar,+Tamil+Nadu&amp;t=m&amp;ie=UTF8&amp;ll=9.456814,77.800125&amp;spn=0.023748,0.042014&amp;z=14&amp;iwloc=A&amp;cid=17475005918195933318&amp;source=embed"
style="color:#0000FF;text-align:left;">View Larger Map</a></small>
</td>
</tr>
</table>
</td>
</tr>
</table>
<!--<h3 align="left" class="style7 style32" style="margin-left:50px">Contact Us</h3>
	<p align="left" class="style13" style="margin-left:50px; text-align:justify">IFeel free to send us a message.</p>
		<table style="margin-left:15px">
			<tr>
				<td>
					<input type="text" id="name" placeholder="Your Name" name="name" style="width:260px; height:25px; margin-left:50px"/>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" id="email" placeholder="Your Email" name="email" style="width:260px; height:25px; margin-left:50px"/>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" id="number" placeholder="Your Number" name="number" style="width:260px; height:25px; margin-left:50px"/>
				</td>
			</tr>
			<tr>
				<td>
					<textarea id="message" placeholder="Your Message" name="message" rows="5" cols="20" style="width:250px; margin-left:50px"></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" class="submit" value="Submit" id="send" style="margin-top:10px; margin-left:50px"/>
				</td>
			</tr>
		</table>-->
<!--
<table width="100%">
		<td width="40%" style="vertical-align:top">
			<ul>
				<img src="<?php echo base_url(); ?>images/plain doc.png" style="margin-top:20px">
				<h3 align="left" class="style7 style32" style="margin-top:-780px; margin-left:50px">Address</h3>
				<h4 align="left" class="style80" style="margin-left:50px">Physio Plus Tech</h4>
					<p align="left" class="style29" style="margin-left:50px">180, Gnanagiri Road, Palaniyandavar Colony,</p>
					<p align="left" class="style29" style="margin-left:50px">Sivakasi - 626 123.</p>
					<p align="left" class="style29" style="margin-left:50px">Tamilnadu, India.</p>
					<p align="left" class="style29" style="margin-left:50px">Ph: 04562 222603,</p>
					<p align="left" class="style29" style="margin-left:50px">Cell: +91 98946 04603</p>
					<a href="mailto:sivakasi@physioplusnetwork.com" class="mail">
					<p align="left" class="styleP" style="margin-left:50px">Mail: sivakasi@physioplusnetwork.com</p>
					</a>
			</ul>
<br>
			<ul>
				<h3 align="left" class="style7 style32" style="margin-left:50px">Contact Us</h3>
					<p align="left" class="style13" style="margin-left:50px; text-align:justify">IFeel free to send us a message.</p>
					<table style="margin-left:15px">
						<tr>
							<td>
								<input type="text" id="name" placeholder="Your Name" name="name" style="width:260px; height:25px; margin-left:50px"/>
							</td>
						</tr>
						<tr>
							<td>
								<input type="text" id="email" placeholder="Your Email" name="email" style="width:260px; height:25px; margin-left:50px"/>
							</td>
						</tr>
						<tr>
							<td>
								<input type="text" id="number" placeholder="Your Number" name="number" style="width:260px; height:25px; margin-left:50px"/>
							</td>
						</tr>
						<tr>
							<td>
								<textarea id="message" placeholder="Your Message" name="message" rows="5" cols="20" style="width:250px; margin-left:50px"></textarea>
							</td>
						</tr>
						<tr>
							<td>
								<input type="submit" class="submit" value="Submit" id="send" style="margin-top:10px; margin-left:50px"/>
							</td>
						</tr>
					</table>
				</ul>
		</td>
		<td width="60%">
			<ul>
				<img src="<?php echo base_url(); ?>images/contact img.png">
			</ul>
			<ul>
				<h3 align="left" class="style7 style32" style="margin-left:20px; margin-top:-20px">Our Location</h3>
					<iframe width="450" height="400" style="margin-left:20px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
					src="https://maps.google.co.in/maps?q=Physio+Plus+Sivakasi,+Sivakasi,+Tamil+Nadu&amp;hl=en&amp;sll=9.45702,77.797322&amp;sspn=0.047497,0.084028&amp;oq=physio+plus&amp;hq=Physio+Plus+Sivakasi,&amp;hnear=Sivakasi,+Virudhunagar,+Tamil+Nadu&amp;t=m&amp;ie=UTF8&amp;ll=9.456814,77.800125&amp;spn=0.023748,0.042014&amp;z=14&amp;iwloc=A&amp;cid=17475005918195933318&amp;output=embed">
					</iframe>
					<br>
					<small>
					<a href="https://maps.google.co.in/maps?q=Physio+Plus+Sivakasi,+Sivakasi,+Tamil+Nadu&amp;hl=en&amp;sll=9.45702,77.797322&amp;sspn=0.047497,0.084028&amp;oq=physio+plus&amp;hq=Physio+Plus+Sivakasi,&amp;hnear=Sivakasi,+Virudhunagar,+Tamil+Nadu&amp;t=m&amp;ie=UTF8&amp;ll=9.456814,77.800125&amp;spn=0.023748,0.042014&amp;z=14&amp;iwloc=A&amp;cid=17475005918195933318&amp;source=embed"
					style="color:#0000FF;text-align:left; margin-left:20px">View Larger Map</a></small>
			</ul>
		</td>
	</table>
<!-- END Contact Function Section
-->
<br>



 
</div>
<!-- END Wrapper Section -->
<?php echo $this->load->view('footer_view'); ?>

</div>
<!-- END Main Wrapper -->

</div>


	<script>
	$(document).ready(function() {
		(function($){	    
 jQuery.validator.setDefaults({		
 errorPlacement: function(error, element) {				
 error.appendTo('#invalid-' + element.attr('id'));		
 }		});	     $("#footer-contact-form").validate({		    
 rules: {				
 name: {					   
 required: true,					
 minlength : 3,				
 },					
 email:{ 					   
 required: true,				
 email: true,				
 },					
 phone: { 					  
 required : true,					 
 number:true,						 
 minlength : 10,				     
 maxlength : 11					
 },					
 message : "required",				
 txt2 :"required",
 },				
 messages: {				
 name: {					 
 required:"Please Enter your name",		
 minlength: "Please Enter a valid name",		
 },					
 email:{ 					 
 required: "Please Enter your email",				
 minlength: "Please Enter a valid email address",			
 },					
 phone: { 					 
 required: "Please Enter your phone number",		
 minlength: "Please Enter your valid phone number",			
 maxlength: "Please Enter your valid phone number"			
 },					
 message : "Please Enter Your Message",
 txt2 :"Please Enter Your Captacha",
}
 });	
 })($);
 
	});
 </script>
 <script>
 $("#lblerror").hide();
$("#txt2").blur(function () {
  var _txt1 = $('#txt1').val();
  var _txt2 = $('#txt2').val();
  
  if (_txt1 == _txt2)
  {
     //alert('Matching!');
	 $("#lblerror").hide();
	 $('#save').prop('disabled', false);
     return true;
  }
  else
  {
   //alert('Not matching!');
	$("#lblerror").show();
	$('#save').prop('disabled', true);
    return false;
  }
});
</script>
</body>
</html>