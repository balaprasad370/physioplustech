<!DOCTYPE html>
	
<html lang="en">
    
<head>
        <title>Physioplus Tech - Admin Login</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/physio_login.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/physio_helper.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>font-awesome/css/font-awesome.css" />
		<link  rel='stylesheet'href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,800' type='text/css'>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.gritter.css" />
		<style>
		.parsley-error-list{
	color:red;
}
</style>
    </head>
    <body>
        <div id="loginbox">  
            
            <form  name="OwnerLoginForm" class="form-vertical" action="<?php echo base_url()?>subadmin/login/user_login" method="post"  role="form"  parsley-validate>
				<div class="control-group normal_text"> <h3><img style="margin-right:90px" src="<?php echo base_url(); ?>img/logo.png" alt="Physioplus tech logo" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lb"><i class="icon-user"></i></span><input type="text" name="username" placeholder="Username" autocomplete="off" value="" parsley-required="true"/>
                        	 
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="password" placeholder="Password" parsley-required="true"/>
                        	 
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-right"><button type="submit" class="btn btn-success login" > Login</button></span>
                </div>
            </form>
            
        </div>
        
        <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>  
        <script src="<?php echo base_url(); ?>js/jquery.validate.js"></script>
		<script src="<?php echo base_url(); ?>js/physio_validation.js"></script> 
		<script src="<?php echo base_url();?>assets/js/vendor/parsley/parsley.min.js"></script>
		<script src="<?php echo base_url(); ?>js/jquery.gritter.min.js"></script> 
		<script>
		$(document).ready(function() {
  $('form').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var button = $('.login');
		 button.prop('disabled',true);
		$.ajax({
            type: 'post',
				url: $(this).attr('action'),
				data:$(this).serialize(),
				dataType: 'json',
            success:function(data, textStatus, jqXHR,form) 
			{
				if(data.status == 'Success'){
				$.gritter.add({title:	'Success',text:	'Login Successfully!'});
				setTimeout(function(){ 
				$('.md-close btn btn-default').click();
				window.location.href="<?php echo base_url().'subadmin/dashboard/client_list/'?>"
				}, 1000);
				}
				else{
					$.gritter.add({title:	'Failure',text:	'Usename or password is incorrect!!'});
				setTimeout(function(){ 
				$('.md-close btn btn-default').click();
				window.location.reload();
				}, 1000);
				}
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$.gritter.add({title:	'Failure',text:	'Usename or password is incorrect!'});
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
