<?php
session_start();
$_SESSION = array();

include("captcha-design/simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();

?>
<footer class="footer_wrapper">
		<div class="row footer-part">
			<div class="large-12 columns">
				<div class="row">
					<div class="large-3 columns">
						<h4 class="footer-title">About Us</h4>
						<div class="divdott"></div>
						
						<div class="footer_part_content">
							<p>Physio Plus Tech delivers cloud-based services for EMR in Physiotherapy, practice management and Digital Exercise prescription. We will keep innovating everyday and we will update the software with the technologies and facilities which are yet to be adopted contemporarily.</p>
						</div>
					</div>
					<div class="large-3 columns">
						<h4 class="footer-title">Latest Posts</h4>
						<div class="divdott"></div>
						<div class="footer_part_content">
							<ul class="latest-posts">
								<li><a href="https://www.facebook.com/physiosoftware/photos/a.231966010277532.1073741826.228395210634612/556752831132180/?type=1&theater"><font color="black">Now Prescribe exercise to your patients in just simple three steps try it for free</font></a>
									<div class="divline"><span></span></div>
								</li>
								<li><a href="https://www.facebook.com/physiosoftware/photos/a.266155720191894.1073741828.228395210634612/489281371212660/?type=1&theater"><font color="black">Exercise Prescription</font></a>
									<div class="divline"><span></span></div>
								</li>
								<li><a href="http://physioplustech.com/blog/?p=121"><font color="black">Being the No. 1 means providing the best service out there, so we have opted to host in the most secured cloud hosting in the world, Amazon.</font></a>
									<div class="divline"><span></span></div>
								</li>
							</ul>
						</div>
					</div>
					

					<div class="large-3 columns">
						<h4 class="footer-title">Contact info</h4>
						<div class="divdott"></div>
						<div class="footer_part_content">
							
							<ul class="about-info">
								<li><i class="icon-home"></i><span>Gnanagiri Road, Palaniandavarpuram Colony, Sivakasi, Tamil Nadu 626123</span></li>
								<li><i class="icon-phone"></i><span>09894604603, 07871382030</span></li>
								<li><i class="icon-envelope"></i><a href="mailto:contact@physioplusnetwork.com">contact@physioplusnetwork.com</a></li>
							</ul>
							<ul class="social-icons">
							<li><a href="https://www.linkedin.com/uas/login" target="_blank"><i class="icon-linkedin-sign"></i></a></li>
							<li><a href="https://twitter.com/?lang=en" target="_blank"><i class="icon-twitter"></i></a></li>
							<li><a href="https://www.facebook.com/physiosoftware?_rdr" target="_blank"><i class="icon-facebook"></i></a></li>
						</ul>
						</div>
					</div>
						
					<div class="large-3 columns"> 
						<h4 class="footer-title">Quick Contact</h4>
						<div class="divdott"></div>
						<form method="POST" action="<?php echo base_url()."pages/contact_us" ?>" id="footer-contact-form">
						<?php
						if($this->session->flashdata('message')): echo '<div class="success">'.$this->session->flashdata('message').'</div>'; endif;
						?>
						 <div class="footer_part_content">
								<div class="row">
									<div class="large-6 columns">
										<input type="text" placeholder="Name"  name="name" value="<?php echo set_value('name') ?>" id="name"/>
											<?php //echo form_error('name'); ?>
											<div id="invalid-name" class="error_msg"></div>
									</div>
									
									<div class="large-6 columns">
										<input type="text" placeholder="E-mail" name="email" value="<?php echo set_value('email') ?>" id="email"/>
											<?php //echo form_error('name'); ?>
											<div id="invalid-email" class="error_msg"></div>
									</div>
									
									<div class="large-6 columns">
										<input type="text" placeholder="phone" name="phone" style="width:150px;" value="<?php echo set_value('phone') ?>" id="phone"/>
											<?php //echo form_error('phone'); ?>
											<div id="invalid-phone" class="error_msg"></div>
									</div>
									
									<div class="large-12 columns">
										<textarea cols="10" rows="15"  name="message" placeholder="Message" value="<?php echo set_value('message') ?>" id="message"></textarea>
											<?php //echo form_error('name'); ?>
											<div id="invalid-message" class="error_msg"></div>
									</div>
									
									  <?php
										echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code" id="image">';

										?>
										<?php
										$var = $_SESSION['captcha'];
  
								//echo $var['code'];
								?> <input type="hidden" name="captcha" value="<?php echo $var['code']; ?>" id="txt1"/>
								<div class="large-12 columns">
										<input name="txt2" id="txt2" placeholder="Enter above Captcha *"   type="text" >
											
									</div>  <div id="invalid-txt2"></div>
									<label class="test" id="lblerror" style="color:red">Captcha Do not Match</label>
									<div class="large-12 columns text-right">
										<input type="submit" class="button" value="Send" name="send" id="save"/>
									</div>	
								</div>
							</div>
						</form>
					</div> 
				</div>
			</div>
		</div>
		<div class="privacy footer_bottom">
			<div class="footer-part">
				<div class="row">
					<div class="large-10 columns copyright">
						<h1><p>&copy; 2013 <a href="http://physioplustech.com"><b>Physio Plus Tech</b></a> All Rights Reserved.
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<tr><td>
						<a href="<?php echo base_url(); ?>frontend/index">
						<u>Home</u></a></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<td>
						<a href="<?php echo base_url(); ?>frontend/features"><u>Features</u></a></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<!--<td><a href="<?php echo base_url(); ?>pages/faq"><u>FAQ</u></a></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
						<!--<td><a href="<?php echo base_url(); ?>frontend/pricing"><u>Pricing</u></a></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
					<td><a href="<?php echo base_url(); ?>frontend/about"><u>About Us</u></a></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<td><a href="<?php echo base_url(); ?>frontend/privacy"><u>Privacy</u></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<td><a href="<?php echo base_url(); ?>frontend/terms"><u>Terms</u></td>&nbsp;&nbsp;</tr>
					</p></h1>
					</div>
					<div class="large-2 columns">
						<div id="back-to-top"><a href="#top"></a></div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	 <script type="text/javascript"> var _cus3=_cus3||[]; _cus3['customer3Sixty.domain']='physioplustech.c360dev.in'; _cus3['customer3Sixty.token']='d68786e2f43437225c2264a330680854';var _cus=document.createElement('script'); _cus.async = true;_cus.src = 'https://app.customer360.co/widgets/chat/js/cusWidget.min.js';_cus.type='text/javascript';(document.getElementsByTagName('head')[0] || document.documentElement).appendChild (_cus);</script>  
	
	<script src="<?php echo base_url()?>js/js/jquery.min.js"></script>
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
     return true;
  }
  else
  {
    
	$("#lblerror").show();
	$('#save').prop('disabled', true);
    return false;
  }
});
</script>