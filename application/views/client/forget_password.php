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
     <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
    <meta name="msapplication-tap-highlight" content="no">
<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/jquery.jgrowl.min.css">
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
                    <div class="mx-auto app-login-box col-md-6">
                      <a href="<?php echo base_url()?>"><center><img src="<?php echo base_url().'assets/images/logo new.png' ?>" style="width:162px; height:auto;"></img></center></a>
                        <div class="modal-dialog w-100">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="h5 modal-title">Password Recovery<h6 class="mt-1 mb-0 opacity-8"><span>Enter your username below. We'll email you the password immediately.</span></h6></div>
                                </div>
                                <div class="modal-body">
                                    <div>
									<font color="#ffff66">
										<?php if($this->session->flashdata('password_recover_sucess')) echo '<div class="alert alert-success fade show" style="padding:.5em;">'.$this->session->flashdata('password_recover_sucess').'</div>'; ?>
										</font><font color="#8B0000">
										<?php if($this->session->flashdata('password_recover_failure')) echo '<div class="alert alert-danger fade show" style="padding:.5em;">'.$this->session->flashdata('password_recover_failure').'</div>'; ?>
										</font>
                                        <form class=""  method="post" action="<?php echo base_url().'client/dashboard/forget_password' ?>">
                                            
											<div class="form-group row">
                               <div class="col-sm-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                               <i class="fa fa-user" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <input class="form-control input-mask-trigger username" type="email" placeholder="Email here..." name="username">
        
                                    </div>
                                     
                                </div>
                            </div><?php echo form_error('username'); ?>
							 
                                       
                                    </div>
									<div class="float-right">
                                        <button class="btn btn-primary btn-lg">Submit</button>
                                    </div>
                                     </div>
                                
								<div class="divider"></div>
                                   
								 </form>
								<p style="text-align:center;">If you don't get an email from us within a few minutes,<br/> please check your spam filter.</p>
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
