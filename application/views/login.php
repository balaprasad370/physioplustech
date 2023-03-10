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

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>patient/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>patient/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url() ?>patient/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>patient/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>patient/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body">
<?php if($this->session->flashdata('client_login_error')) echo $this->session->flashdata('client_login_error'); ?>
    <div class="container">
      <form class="form-signin" action="<?php echo base_url().'patient/patient/plogin' ?>" method="post">
        <h2 class="form-signin-heading">Login</h2>
        <div class="login-wrap">
            <input type="text" name="username" class="form-control" placeholder="User Name" autofocus>
			 <font color="red"><?php echo form_error('username'); ?></font>
            <input type="password" name="password" class="form-control" placeholder="Password">
			<font color="red"><?php echo form_error('password'); ?></font>
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal" > Forgot Password?</a>

                </span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>    
		
        </div>
	</form>
          <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
					<form name="eventform" id="eventform" action="<?php echo base_url().'patient/patient/forgetpassword' ?>" method="POST">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Forgot Password ?</h4>
                      </div>
                      <div class="modal-body">
                          <p>Enter your e-mail address below to reset your password.</p>
                          <input type="text" name="email" id="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
						  <br>
							<div class="alert alert-success alert-block fade in" id="message">
							  <button data-dismiss="alert" class="close close-sm" type="button">
								  <i class="fa fa-times"></i>
							  </button>
							  <h4>
								  <i class="fa fa-ok-sign"></i>
								  Success!
							  </h4>
							  <p>An email is sent to your mail id. Please check your email.</p>
                            </div>
                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-success" type="submit">Submit</button>
                      </div>
					</form>
                  </div>
              </div>
          </div>
          <!-- modal -->
      
    </div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url() ?>patient/js/jquery.js"></script>
    <script src="<?php echo base_url() ?>patient/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#message').hide();
			$("#eventform").submit(function(e){
				var postData = $(this).serializeArray();
				var formURL = $(this).attr("action");
				$.ajax(
				{
					url : formURL,
					type: "POST",
					data : postData,
					success:function(data, textStatus, jqXHR,form) 
					{
						var objJSON = JSON.parse(data);
						if(objJSON.status == 'failure'){
							alert('Invalid Email');
						}else{
							if ( $( "#message" ).is( ":hidden" ) ) {
								$( "#message" ).show( "slow" );
							} else {
								$( "#message" ).slideUp();
							}
						}
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						alert('Error');
					}
				});
				e.preventDefault(); //STOP default action
			});
		});
	</script>
  </body>
</html>