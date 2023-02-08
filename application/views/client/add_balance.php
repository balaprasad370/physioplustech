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
                        <a href="<?php echo base_url()?>"><center><img src="<?php echo base_url()?>frontend_assets/img/New Purple 243x68px beta.png"></img></center></a>
                         </br>						
						<div class="modal-dialog w-100 mx-auto">
                            <div class="modal-content">
                               <div class="modal-body">
                                    <div class="h5 modal-title text-center">
                                        <h4 class="mt-2">
                                            <center><img style="width:220px; height:172px; border: dotted 1px #6f42c1;"  src="<?php echo base_url() ?>img/demo/Group%202101@2x.png"></img></center>
										</h4><div><span  class="text-primary"><h2><strong>Add Balance</strong></span></h2></div>
									</div>
                                    <form action="<?php echo base_url().'razorpay/pay.php' ?>" method="POST">
                                        <div class="form-row">
                                            <div class="col-md-12">
                                               </br> <div class="position-relative form-group">
											   <input name="amount" id="amount" placeholder="" type="text" class="form-control"></div>
											   <input name="name" id="name" value="<?php echo $this->session->userdata('firstname'); ?>" placeholder="" type="hidden" class="form-control">
											   <input name="email" id="email" placeholder="" value="<?php echo $this->session->userdata('username'); ?>" type="hidden" class="form-control">
											   <input name="mobile" id="mobile" placeholder="" value="<?php echo $this->session->userdata('mobile'); ?>" type="hidden" class="form-control">
											  </div> <div class="col-md-12">
											 <center>
											<button class="btn btn-primary btn-lg">Submit</button>
											</center></div>
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
