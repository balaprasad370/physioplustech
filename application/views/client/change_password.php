<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Change Password - Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
     
	<meta name="msapplication-tap-highlight" content="no">
	 
	<link href="<?php echo base_url()?>asset_list/main.css" rel="stylesheet">
	 <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
	<style>
.parsley-error-list{
	color:red;
	list-style-type:none;
}
label, th, .td{
	font-weight:bold;
	color:#3f6ad8;
}
</style>
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    
				<?php include("sidebar.php");?>
            <div class="app-main__outer">
                <div class="app-main__inner">
                               
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title"> Change Password
								</h5>
                                    <form class="" action="<?php echo base_url().'client/dashboard/change_password' ?>" method="post"  role="form" parsley-validate id="signupForm">
                                         <input type="hidden" class="form-control" id="old" value="<?php echo $pwd; ?>"  name="old" rows="4">
										<div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="old_password" class="">Old Password *</label>
												 <input name="old_password" placeholder="Enter Old Password" type="password" class="form-control" parsley-trigger="change" parsley-equalto="#old" parsley-required="true" autocomplete="off">
												</div>
                                            </div>
											 
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="new_password" class="">New Password *</label>
												 <input name="new_password" id="new_password" placeholder="Enter New Password" type="password" class="form-control" autocomplete="off"  parsley-required="true" ></div>
												</div>
                                            </div>
                                        
										   <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="confirm_password" class="">Confirm Password *</label>
												 <input name="confirm_password" placeholder="Enter Confirm Password" type="password" class="form-control" parsley-trigger="change" parsley-required="true" parsley-equalto="#new_password">
												</div>
                                            </div>
											 </div>
										 
										
										  <div class="divider"></div>
                                            <div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary" id="save">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
                                            </div>
										
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                   </div>
				   </div>   
				   </div>  
				   
    <div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Password Has Been Updated Successfully</div></div></div>
    <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Password Has not Been Updated Successfully</div></div></div>

	
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script></body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
 
<script>
  
$(document).ready(function() {
  $('form').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var button = $('#save');
		$.ajax({
            type: 'post',
            url: formURL,
            data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				button.prop('disabled', true);
				$('#toast-container').show();
				setTimeout(function(){ 
				$('.md-close btn btn-default').click();
				window.location.reload();
				}, 1000);
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$('#toast-container1').delay(5000).fadeOut(400);
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
