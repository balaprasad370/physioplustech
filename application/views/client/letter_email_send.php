<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Letter Email - Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="msapplication-tap-highlight" content="no">
	<link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
	<link href="<?php echo base_url()?>asset_list/main.css" rel="stylesheet">
	
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
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
                                <div class="card-body"><h5 class="card-title"> Certificate - Share</h5>
								<?php foreach($result as $row) { $hold=$row['letter_id']; ?>
                                 <?php } ?>	
                                    <form class="" action="<?php echo base_url().'client/letter/certificateSendEmail'?>" method="post"  role="form" parsley-validate id="signupForm">
                                        <div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="letter" class="">Enter Recipient Email ID</label>
												  <input name="email" id="email" type="text"  class="form-control" placeholder="Enter Recipient Email ID" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-type="email" parsley-validation-minlength="1" autocomplete="off">
												</div>
                                            </div>
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="letter" class="">Enter Recipient Mobile No</label>
												  <input name="mobile" id="mobile" type="text"  class="form-control" placeholder="Enter Recipient Mobile No"  parsley-required="true"  autocomplete="off" >
												</div>
                                            </div>
                                        </div>
										<input type="hidden" class="form-control" name="user" id="user" value="<?php echo $hold;?>">
										<div class="divider"></div>
                                            <div class="clearfix">
                                                <center>
                                                <button class="mb-2 mr-2 btn btn-pill btn-success share" id="share">Whatsapp</button>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary submit" id="save">Submit</button>
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
				   
    <div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Email sent is successfully</div></div></div>
    <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Email is not Sent Successfully</div></div></div>

	
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> 		
<script>
  $(document).ready(function() {
	  $('.share').click(function(){  
		  var mobile = $('#mobile').val();
		  var client = '<?php echo $this->session->userdata('client_id'); ?>';
		  var letter_id = $('#user').val();
		  var clinic = '<?php echo $this->session->userdata('clinic_name'); ?>';
		  var url = '<?php echo base_url().'pages/letter_print/' ?>'+client+'/'+letter_id;
		  window.open('https://web.whatsapp.com/send?phone=91'+mobile+'&text='+ clinic +' has sent you an Medical Certificate, kindly click the below link to access the Certificate.'+url, '_blank');
		
	  });
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
				$('#toast-container').show();
				setTimeout(function(){ 
				window.location.href="<?php echo base_url().'client/letter/letter_view/'?>"
				}, 1000);
				 
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
</body>
</html>
