<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
     
    <meta name="msapplication-tap-highlight" content="no">
 <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
<link href="<?php echo base_url()?>asset_list/main.css" rel="stylesheet">

<style>
.username { 
    text-transform: lowercase;
}
 
::-webkit-input-placeholder { /* WebKit browsers */
    text-transform: none;
}
:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
    text-transform: none;
}
::-moz-placeholder { /* Mozilla Firefox 19+ */
    text-transform: none;
}
:-ms-input-placeholder { /* Internet Explorer 10+ */
    text-transform: none;
}
 
</style>
</head>
<body>

<div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100 bg-plum-plate bg-animation">
                <div class="d-flex h-100 justify-content-center align-items-center">
                    <div class="mx-auto app-login-box col-md-8">
                        <a href="<?php echo base_url()?>"><center><img src="<?php echo base_url()?>frontend_assets/img/Physio+Logo_New.png"></img></center></a>
                         </br><center><div style="color:white; font-size:20px; font-style: italic; float:center;"><strong>Welcome!!! Together let's make documentation awesome !!!</strong></div>
                         </center>
						
						<div class="modal-dialog w-100 mx-auto">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="h5 modal-title text-center">
                                       <h4 class="mt-2">
                                           <span style="font-style: italic;" class="text-primary"><strong>Admin Login</strong></span>
                                        </h4>
                                    </div>
									<div style="width:100%;" class="alert alert-info fade show" id="add_treatment">  
							Want to Switch back to the Old Version  <a target="_blank" href="http://app.physioplustech.in/client/dashboard/login" style="color:red;"> Click Here </a>							
						</div>  
						
									<font color="#8B0000"><?php if($this->session->flashdata('client_login_error')) echo '<div class="alert alert-danger fade show" style="padding:.5em;">' .$this->session->flashdata('client_login_error').'</div>'; ?>
            </font>
                                    <form class="" method="post" action="<?php echo base_url().'registration/user_login' ?>" parsley-validate>
                                       
										 <div class="form-group row">
                               <div class="col-sm-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                               <i class="fa fa-user" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <input class="form-control input-mask-trigger username" type="text" placeholder="Email Id" name="username" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-type="email"  autocomplete="off">
        
                                    </div>
                                     
                                </div>
                            </div><?php echo form_error('username'); ?>
							
							<div class="form-group row">
                               <div class="col-sm-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                               <i class="fa fa-lock" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <input class="form-control input-mask-trigger" type="password" placeholder="Password" name="password" parsley-trigger="change" parsley-required="true" autocomplete="off">
									<div class="input-group-append">
                                                    <button class="btn btn-outline-primary datepicker-trigger-btn hide-show" type="button">Show</button>
                                                </div>
                                    </div>
                                     
                                </div>
                            </div><?php echo form_error('password'); ?>
                                        
                                    <div class="divider"></div>
                                     <h6 class="mb-0">No account? <a href="<?php echo base_url().'sign_up' ?>" class="text-primary">Sign up now</a></h6>
                                </div>
                                <div class="modal-footer clearfix">
                                    <div class="float-left"><a href="<?php echo base_url().'client/dashboard/forget_password' ?>" class="btn-lg btn btn-link">Forgot password</a></div>
                                    <div class="float-right">
                                        <button class="btn btn-primary btn-lg">Login</button>
                                    </div>
									</form>
                                </div>
                            </div>
                        </div>
                        <div class="text-center text-white opacity-8 mt-3">Copyright © Physio Plus Tech 2013 - 2020</div>
                    </div>
                </div>
            </div>
        </div>
</div>

<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script></body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
<script>
  $(document).ready(function() {
	  $('.hide-show').show();
      $('.hide-show').addClass('show');
  
	  $('.hide-show').click(function(){
		if( $(this).hasClass('show') ) {
		  $(this).text('Hide').css('color', 'black');
		  $('input[name="password"]').attr('type','text');
		  $(this).removeClass('show');
		} else {
		   $(this).text('Show').css('color', 'black');
		   $('input[name="password"]').attr('type','password');
		   $(this).addClass('show');
		}
	  });
	  
  });
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
  
</html>
