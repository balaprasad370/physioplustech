<!doctype html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel='shortcut icon' href='https://physioplustech.asia/images/favicon.ico' type='image/x-icon' />
 
	<link href="https://fonts.googleapis.com/css?family=Roboto&amp;display=swap" rel="stylesheet">
     
    <link rel="stylesheet" href="<?php echo base_url()?>frontend_assets/assets/css/bootstrap.min.css">
     
	<link rel="stylesheet" href="<?php echo base_url()?>frontend_assets/assets/css/all.min.css">
	 
	<link rel="stylesheet" href="<?php echo base_url()?>frontend_assets/assets/css/animate.css">
	 
	<link rel="stylesheet" href="<?php echo base_url()?>frontend_assets/assets/css/lightcase.css">
	 
	<link rel="stylesheet" href="<?php echo base_url()?>frontend_assets/assets/css/swiper.min.css">
	 
	 <link rel="stylesheet" href="<?php echo base_url()?>frontend_assets/assets/css/style.css">

	<title>Physio Plus Tech</title>
	<style>
	.error_msg{
		color:red;
	}
	
	.alert{padding:15px;margin-bottom:20px;border:1px solid transparent;border-radius:4px}


.alert-success{color:#3c763d;background-color:#dff0d8;border-color:#d6e9c6}.alert-success hr{border-top-color:#c9e2b3}
	</style>
	
  </head>
  <body data-spy="scroll" class="overflow-auto">
	 
	 <?php include("header.php");?>
	 <div class="page-header style-1">
		<div class="banner-position">
			<div class="container">
				<div class="banner-content">
					<h3>Contact Us</h3>
					 
				</div>
			</div>
		</div>
	</div>
	 <br />
	 <div class="contact-location">
		<div class="container">
			<!--<div class="row">
				<div class="col-lg-12 col-12">
					<div class="location-map">
						<div id="map">
						
						<iframe width="100%" height="600" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=22%20Sin%20Ming%20Lane%2C%20%2307-88%20MidView%20City%2C%20573969%20Singapore+()&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/draw-radius-circle-map/">Create radius map</a></iframe><br />
		 			</div>
					</div>
				</div>
				 
			</div>-->
			</br>
			<div class="row">
			<div class="col-lg-6 col-12">
					<div class="location-map">
					  <div id="map"><iframe width="100%" height="600" id="gmap_canvas" src="https://maps.google.com/maps?q=1%2F7C%2C%202nd%20street%20kaliappa%20nagar%2C%20sivakasi%20-%20626123&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://fmovies2.org"></a></div>
						
					</div>
				</div>
			<div class="col-lg-6 col-12">
					<div class="contact-form">
					<?php
session_start();
$_SESSION = array();

include("captcha-design/simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();

?>
						<form action="<?php echo base_url()."frontend/contact_add" ?>" method="POST" id="footer-contact-form" class="comment-form">
						<?php if($this->session->flashdata('Message')): echo '<div class="alert alert-success"><strong>Thanks for being awesome !!! </strong>   We have received your message and would like to thank you for writing to us. we will reply by email as soon as possible.</div>'; endif; ?>
<?php if($this->session->flashdata('Error')): echo '<div class="alert alert-danger alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>'.$this->session->flashdata('Error').'</div>'; endif; ?>
							<input type="text" name="name" id="name" class="" placeholder="Name *" style="width:100%">
							<div id="invalid-name" class="error_msg"></div>
							
							<input type="email" name="email" id="email" class="" placeholder="Email *" style="width:100%">
							<div id="invalid-email" class="error_msg"></div>
							
							<input type="text" name="phone"  id="phone" class="" placeholder="Phone *" style="width:100%">
							<div id="invalid-phone" class="error_msg"></div>
							
							<textarea name="message" id="message" cols="30" rows="5" placeholder="Message *"></textarea>
							<div id="invalid-message" class="error_msg"></div>
							
							<?php
										echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code" id="image" style="padding-top:20px">';

										?>
										<?php
										$var = $_SESSION['captcha'];
  
								//echo $var['code'];
								?> <input type="hidden" name="captcha" value="<?php echo $var['code']; ?>" id="txt1"/>
								</br>
								<input name="txt2" id="txt2" placeholder="Enter above Captcha *"   type="text" style="width:100%;">
								 <div id="invalid-txt2"></div>
									<label class="test" id="lblerror" style="color:red">Captcha Do not Match</label>
							<button type="submit" class="contact-btn" value="Send" name="send" id="save">
								<span>Send</span>
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	 
	<?php include("footer.php");?>
	 
	<div class="scroll-top">
		<div class="scrollToTop active">
			<span>
				<i class="fas fa-arrow-up"></i>
			</span>
		</div>
	</div>
	<script src="<?php echo base_url()?>frontend_assets/assets/js/jquery.js"></script>
	<script src="<?php echo base_url()?>frontend_assets/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>frontend_assets/assets/js/fontawesome.min.js"></script>
	<script src="<?php echo base_url()?>frontend_assets/assets/js/jquery.waypoints.min.js"></script>
	<script src="<?php echo base_url()?>frontend_assets/assets/js/imagesloaded.pkgd.min.js"></script>
	<script src="<?php echo base_url()?>frontend_assets/assets/js/jquery.counterup.min.js"></script>
	<script src="<?php echo base_url()?>frontend_assets/assets/js/count-down.js"></script>
	<script src="<?php echo base_url()?>frontend_assets/assets/js/isotope-min.js"></script>
	<script src="<?php echo base_url()?>frontend_assets/assets/js/lightcase.js"></script>
	<script src="<?php echo base_url()?>frontend_assets/assets/js/swiper.min.js"></script>
	<script src="<?php echo base_url()?>frontend_assets/assets/js/theia-sticky-sidebar.js"></script>
	<script src="<?php echo base_url()?>frontend_assets/assets/js/wow.min.js"></script>
	<script src="<?php echo base_url()?>frontend_assets/assets/js/active.js"></script>
    <script src="<?php echo base_url()?>js/js/jquery.validate.min.js"></script>
	<script>
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
 
 
 </script>
 <script>
 $("#lblerror").hide();
$("#txt2").blur(function () {
  var _txt1 = $('#txt1').val();
  var _txt2 = $('#txt2').val();
  
  if (_txt1 == _txt2)
  {
     
	 $("#lblerror").hide();
	 $('#save').prop('disabled', false);
	 $('#save').show();
     return true;
  }
  else
  {
    
	$("#lblerror").show();
	//$('#save').prop('disabled', true);
	$('#save').hide();
    return false;
  }
});
</script>
  </body>


</html>