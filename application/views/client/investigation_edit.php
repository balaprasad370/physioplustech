<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo $patient['first_name']?> - Physio Plus Tech</title>
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
                                <div class="card-body"><h5 class="card-title"> Investigation Edit
								</h5>
                                    <form class="" action="<?php echo base_url().'client/patient/add_investigations' ?>" method="post"  role="form" parsley-validate id="signupForm">
                                         <input type="hidden" name="inves_id" value="<?php echo $inves_id ?>"  />
						                 <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $patient_id ?>"  />
										<div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="inves_date" class="">Date</label>
												 <input name="inves_date" value="<?php echo date('d-m-Y',strtotime($investigation['inves_date'])); ?>" type="text" class="form-control datepicker" data-toggle="datepicker" parsley-trigger="change" parsley-required="true" autocomplete="off"></div>
												</div>
											 
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="report_type" class="">Report Type</label>
												 <input name="report_type" value="<?php echo $investigation['report_type'] ?>" type="text" class="form-control">
												 </div>
												</div>
                                            </div>
											
											
											<div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="file_upload" class="">Documents</label>
																		<a href="<?php echo base_url().'uploads/inves/'.$investigation['document'] ?>"><img src="<?php echo base_url().'uploads/inves/'.$investigation['document'] ?>" width="80px;"  height="80px;"></a>

												</br><input type='file' id='file_upload' style="width:300px;" name='file_upload'>
																	<input type="hidden" name="scan_hidden" id="upload_img" value="<?php echo $investigation['document'] ?>" />	
																	<div style="display:none" id="dvloader"><p>Uploding Please Wait...</p>
																	<img src="<?php echo base_url().'img/loader.gif'; ?>" /></div>
												 </div>
												</div>
											 
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="descr" class="">Description</label>
												<textarea rows="3" class="form-control autosize-input form-rounded" id="descr" name="descr" ><?php echo $investigation['description'] ?></textarea>
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
	 <div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Investigation Has Been Updated Successfully</div></div></div>
    <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Investigation Has not Been Updated Successfully</div></div></div>
 
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
		 var id = $('#patient_id').val();
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
				window.location = '<?php echo base_url().'client/patient/view/' ?>'+id;
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

$('#dvloader').hide();
		$(document).on('change', '#file_upload', function(e){
				var data = new FormData();
				data.append('file', $('#file_upload').prop('files')[0]);
				$('#dvloader').show();
				$.ajax({
					url : '<?php echo base_url().'client/patient/file_upload' ?>',            
					processData: false, 
					contentType: false, 
					data : data,
					type: "POST",
					dataType : 'json',  
					
					success:function(data, textStatus, jqXHR,form) 
					{
						if(data.status == 'success'){
							$('#dvloader').hide();
							$('#upload_img').val(data.file_name);
							$('#toast-container').show();
										setTimeout(function(){ 
							$('#toast-container').hide();
							}, 1000);
								
						} else {
							$('#toast-container1').delay(5000).fadeOut(400);
							//alert("Logo Has Not Been Added Successfully!");
								
						}
						
					},
					
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
