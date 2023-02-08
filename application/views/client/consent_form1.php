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
}
label, th, .td{
	font-weight:bold;
	color:#3f6ad8;
}
</style>
<style>
/* #signature {
    min-width:auto !important;
    min-height: auto !important;
  } */
  
#signature {
  width:auto;
  box-shadow: 0 0 5px 1px #ddd inset;
  border:dashed 2px #53777A;
  border: dashed 1px #53777A;
  margin:0;
  text-align:bottom;
  min-height:180px;
  min-width:200px;
  transition:.2s;
}
#signature_capture {
  width:100%; 
  height:1em; 

}
.jSignature{
	min-height:250px;
    min-width:250px;
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
                                <div class="card-body"><h5 class="card-title">  Add Guardian Signature
								</h5>
                                    <form class="" action="<?php echo base_url().'client/patient/guard_formadd' ?>" method="post"  role="form" parsley-validate id="signupForm">
                                         <p style="text-align:center;">Use your mouse cursor or the tip of your finger to sign below</p>
										<input type="hidden" id="patient_id" value="<?php echo $this->uri->segment(4); ?>" name="patient_id" />
										 
                                        <div id="signature"></div>
										  <div class="divider"></div>
                                            <div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary" id="save">Submit</button>
												<a class="mb-2 mr-2 btn btn-pill btn-info" id="skip" style="color:white;">Skip</a>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger" id="reset">Reset</button>
												</center>
                                            </div>
											
											 <p>
										<label for="signature_capture"></label>
										<textarea id="signature_capture" name="contractdata1"></textarea>
									  </p>
										 </form>
									
	  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                   </div>
				   </div>   
				   </div>  
				   
    <div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Consent form Has Been Added Successfully</div></div></div>
    <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Consent form Has not Been Added Successfully</div></div></div>

	
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script></body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
<script src='https://cdn.rawgit.com/willowsystems/jSignature/master/libs/jSignature.min.js'></script>
<script>
 $(document).ready(function() {
  $('form').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var id = '<?php echo $this->uri->segment(4); ?>';
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
				window.location="<?php echo base_url().'client/patient/view/' ?>" + id;
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

// Uses jSignature for signature imput: https://willowsystems.github.io/jSignature/
$('#signature_capture').hide();
$('#signature').jSignature();
var $sigdiv = $('#signature');
var datapair = $sigdiv.jSignature('getData', 'svgbase64');

$('#signature').bind('change', function(e) {
  var data = $('#signature').jSignature('getData');
  $("#signature_capture").val(data);
  
  //$("#help").slideDown(300);
});

$('#reset').click(function(e){
  $('#signature').jSignature('clear');
  $("#signature_capture").val('');
  //$("#help").slideUp(300);
  e.preventDefault();
});

$("#skip").click(function(){
	 var id = '<?php echo $this->uri->segment(4); ?>';
	 window.location="<?php echo base_url().'client/patient/view/' ?>" + id;
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
