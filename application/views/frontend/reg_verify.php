<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Physio Plus Tech</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.gritter.css" />
    <link href="<?php echo base_url() ?>patient/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>patient/css/bootstrap-reset.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>patient/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>patient/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>patient/css/style-responsive.css" rel="stylesheet" />

   <style>
   .alert-success{color:#3c763d;background-color:#dff0d8;border-color:#d6e9c6;font-size:16px;}.alert-success hr{border-top-color:#c9e2b3}
   .alert{padding:15px;margin-bottom:20px;border:1px solid transparent;border-radius:4px}.alert h4{margin-top:0;color:inherit}
   </style>
</head>

  <body class="login-body">

    <div class="container">
      <form class="form-signin" action="<?php echo base_url().'registration/success' ?>" method="post">
	  
	  
        <h2 class="form-signin-heading"> Mobile Number Verification</h2>
        
		<div class="login-wrap">
            <p style="color:black;">To Strengthen the security, we have added Mobile and Email Verification.</p>
		    <input type="text" class="form-control" placeholder="Enter Code from your Mobile" name="v_code" id="v_code" />
		    <input type="hidden" class="form-control" value="<?php echo $v_code; ?>" name="code" id="code" />
		    <input type="hidden" class="form-control" value="<?php echo $c_id; ?>" name="c_id" id="c_id" />
		    <div class="alert alert-danger verify" style="display:none;">
				<strong>verification code has been wrong.</strong>
			</div>
  
		    <button type="submit" id="quick_add" disabled class="btn btn-lg btn-login btn-block" style="color:#fff;">SUBMIT</button>   

			
        </div>
	</form>
          <!-- Modal -->
         
          <!-- modal -->
      
    </div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url() ?>patient/js/jquery.js"></script>
    <script src="<?php echo base_url() ?>patient/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.gritter.min.js"></script>
	<script>
	$(document).ready(function() {
  $('form').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var button = $('#save');
		 button.prop('disabled',true);
		$.ajax({
            type: 'post',
            url: formURL,
            data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				
				$.gritter.add({title:	'Success',text:	'Mobile Number has been verified successfully'});
				setTimeout(function(){ 
				$('.md-close btn btn-default').click();
				window.location.href="<?php echo base_url().'registration/registration_success/'?>"
				}, 1000);
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$.gritter.add({title:	'Success',text:	'You are not Registered successfully'});
				
			}
      }); 
		}
		else{
			
		}
		
});  
}); 
	$(document).ready(function() {
		var val= $('#code').val();
		$('#v_code').change(function() {
			var val1= $('#v_code').val();
			if(val == val1){
				$('.verify').hide();
				 var button = $('#quick_add');
				 button.prop('disabled', false);
			} else {
				$('.verify').show();
			}
		});
			
	});
	</script>
  </body>
</html>