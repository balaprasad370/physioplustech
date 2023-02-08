<!DOCTYPE html>
<html>
<head>
	<title>Physio Plus Tech</title>
	<link rel="icon" type="image/ico" href="<?php echo base_url() ?>assets/images/favicon.ico" /> 
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/responsiveform.css">
	<link rel="stylesheet" media="screen and (max-width: 1200px) and (min-width: 601px)" href="<?php echo base_url(); ?>css/responsiveform1.css" />
	<link rel="stylesheet" media="screen and (max-width: 600px) and (min-width: 351px)" href="<?php echo base_url(); ?>css/responsiveform2.css" />
	<link rel="stylesheet" media="screen and (max-width: 350px)" href="<?php echo base_url(); ?>css/responsiveform3.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/validationEngine.jquery.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/jgrowl/css/jquery.jgrowl.min.css">
</head>
<body>
<br><br>
<div align="center">Welcome Back! </div>
<?php if($this->session->flashdata('client_login_error')) echo '<br><br>'.$this->session->flashdata('client_login_error'); ?>
<br><br>
<div id="envelope">
<form id="setpassword" class="formular" method="post" action="<?php echo base_url().'patient/patient/psetpassword' ?>" role="form" parsley-validate>
	<label>Email</label>
	<input type="text" class="validate[required] text-input" name="email" id="email" placeholder="email" readonly value="<?php echo $email; ?>">	
	<label>Password</label>
	<input type="password" class="text-input" name="password" id="password" placeholder="Password" parsley-trigger="change" parsley-required="true" parsley-minlength="6" parsley-type="alphanum" parsley-validation-minlength="1" >	
	<label>Confirm password</label>
	<input type="password" class="text-input" name="password2" id="password2" placeholder="Conform Password" parsley-trigger="change" parsley-required="true" parsley-minlength="6" parsley-type="alphanum" parsley-validation-minlength="1" parsley-equalto="#password">
	<input class="submit" type="submit" value="Set Password" id="submit">		
</form>
</div>
<script src="<?php echo base_url() ?>js/jquery.min.js"></script> 
<script src="<?php echo base_url() ?>js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url() ?>js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php  echo base_url();  ?>assets/js/vendor/jgrowl/jquery.jgrowl.min.js"></script>
<script src="<?php echo base_url();?>assets/js/vendor/parsley/parsley.min.js"></script>
<script>
		jQuery(document).ready(function(){
			jQuery("#setpassword").validationEngine();
		});
		
		$(document).ready(function() {
  $('form').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 $('#submit').hide();
		$.ajax({
            type: 'post',
            url: formURL,
            data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				
				$.jGrowl("Password Set Successfully");
				setTimeout(function(){ 
				$('.md-close btn btn-default').click();
				window.location.href="<?php echo base_url().'patient/patient/success/'?>"
				}, 1000);
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$.jGrowl("Password Set Successfully");
				setTimeout(function(){ 
				$('.md-close btn btn-default').click();
				window.location.reload();
				}, 1000);
			}
      }); 
		}
		else{
			
		}
		
});  
}); 
</script>
</body>
</html>