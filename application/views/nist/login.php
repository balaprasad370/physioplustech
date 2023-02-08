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
                        <a href="<?php echo base_url()?>"><center><img src="<?php echo base_url().'assets/images/logo new.png' ?>" style="width:162px; height:auto;"></img></center></a>
                          
						<div class="modal-dialog w-100 mx-auto">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="h5 modal-title text-center">
                                       <h4 class="mt-2">
                                           <span style="font-style: italic;" class="text-primary"><strong> Honorary researcher login</strong></span>
                                        </h4>
                                    </div>
									 
                                    <form class="" method="post" action="<?php echo base_url().'nist/dashboard/user_login' ?>" parsley-validate>
                                       
										 <div class="form-group row">
                               <div class="col-sm-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                               <i class="fa fa-user" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <input class="form-control input-mask-trigger username" type="text" placeholder="Email Id" name="email" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-type="email"  autocomplete="off">
        
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
                                    
                                </div>
                                <div class="modal-footer clearfix">
                                    
                                    <div class="float-right">
                                        <button class="btn btn-primary btn-lg save">Login</button>
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

 <div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Login Successfully</div></div></div>
    <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Login not Been Added Successfully</div></div></div>

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
			dataType: 'json',
            success:function(data, textStatus, jqXHR,form) 
			{
				if(data.status == 'Success'){
				$('#toast-container').show();
				setTimeout(function(){ 
				window.location.href="<?php echo base_url().'nist/dashboard/home/'?>"
				}, 1000);
				 } else {
				$('#toast-container1').delay(5000).fadeOut(400); 
				setTimeout(function(){ 
			    window.location.reload();
				}, 1000); 
              }
			  },
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$('#toast-container1').delay(5000).fadeOut(400);
				setTimeout(function(){ 
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
  
</html>
