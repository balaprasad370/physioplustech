<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="msapplication-tap-highlight" content="no">
	<link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
	<link href="<?php echo base_url()?>asset_list/main.css" rel="stylesheet">
	
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
                                <div class="card-body"><h5 class="card-title">Case Report - Email
								</h5>
								<?php if($patients != false){
                  			foreach($patients as $row) { ?>
					
                                    <form class="" action="<?php echo base_url().'client/reports/report_patientsend_email' ?>" method="post"  role="form" parsley-validate id="signupForm">
                                         
										  <input type="hidden" class="form-control" name="patient_id" id="patient_id" value="<?php echo $this->uri->segment(5);?>" autocomplete="off">
						                  <input type="hidden" class="form-control" name="client_id" id="client_id" value="<?php echo $this->session->userdata('client_id');?>" autocomplete="off">
                      
										<div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="Patient" class="">Patient Name</label>
												 <input name="Patient" type="text" class="form-control" value="<?php echo $row['first_name']; ?>" readonly></div>
												</div>
											 
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="patientEmail" class="">Email</label>
												<?php if($row['email']!=''){ ?>
												 <input name="email_id" type="text" class="form-control" value="<?php echo $row['email'];?>" readonly>
												<?php }else{ ?>
												 <input name="email_id"  type="text" class="form-control" value="No email found for this Patient" readonly>
												 </div>
												 <?php } ?>
												</div>
                                            </div>
											<div class="divider"></div>
											
											<div class="clearfix">
                                                <center>
                                                <?php if($row['email']!=''){ ?>
												<button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary submit" id="save" style="text-align:center;">Submit</button>
												<?php } else { ?>
												 <button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger" disabled>Submit</button><?php }  ?>
												</center>
                                            </div>
											 
										
                                    </form>
									<?php } } ?>
                                </div>
                            </div>
                        </div>
                    </div>
						</div>
						   </div>
						   </div>   
						   </div>  
				   
    <div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Email sent Successfully</div></div></div>
    <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Email Not sent Successfully</div></div></div>

	
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
		 button.prop('disabled',true);
		$.ajax({
            type: 'post',
            url: formURL,
            data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				$('#toast-container').show();
				setTimeout(function(){ 
				window.location.href="<?php echo base_url().'client/invoice/views'?>"
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
</html>
