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
                                <div class="card-body"><h5 class="card-title"> Edit Goals
								</h5>
                                    <form class="" action="<?php echo base_url().'client/patient/add_goals' ?>" method="post"  role="form" parsley-validate id="signupForm">
                                         <input type="hidden" name="goal_id" value="<?php echo $goal_id ?>"  />
						                 <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $patient_id ?>"  />
										 <div class="row">
															<div class="col-md-4">
															 <div class="input-group">
															<div class="position-relative form-group"><label for="bill_no" class="">Date</label>
																<input type="text" style="width:250px;" class="form-control datepicker" Placeholder="Date" name="goal_date" id="goal_date" value="<?php echo date('d-m-Y',strtotime($goals['goal_date']))?>" data-toggle="datepicker">
															</div>	
															</div>	
															</div>	
														</div>	
														<div class="row">
														   <div class="col-md-4">	
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class="">Short Term Goals 1</label>
																<textarea style="width:250px;"  placeholder="Short term goals" type="text" name="short_term_goals1" id="short_term_goals1" class="form-control"><?php echo $goals['short_term_goals1'] ?></textarea>
															</div>											
															</div>											
														 </div>
														 <div class="col-md-4">	
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class="">Short Term Goals 2</label>
																	<textarea style="width:250px;"  placeholder="Short term goals" type="text" name="short_term_goals2" id="short_term_goals2" class="form-control"><?php echo $goals['short_term_goals2'] ?></textarea>
															</div>											
															</div>											
														 </div>
														 <div class="col-md-4">	
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class="">Short Term Goals 3</label>
																	<textarea style="width:250px;"  placeholder="Short term goals" type="text" name="short_term_goals3" id="short_term_goals3" class="form-control"><?php echo $goals['short_term_goals3'] ?></textarea>
															</div>											
															</div>											
														 </div>
														</div></br>
														<div class="row">
															<div class="col-md-4">	
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class="">Long Term Goals 1</label>
																	<textarea style="width:250px;"  placeholder="Long term goals" type="text" name="long_term_goals1" id="long_term_goals1" class="form-control"><?php echo $goals['long_term_goals1'] ?></textarea>
															</div>											
															</div>											
															</div>
															<div class="col-md-4">	
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class="">Long Term Goals2</label>
																<textarea style="width:250px;"  placeholder="Long term goals" type="text" name="long_term_goals2" id="long_term_goals2" class="form-control"><?php echo $goals['long_term_goals2'] ?></textarea>
															</div>											
															</div>											
															</div>
															<div class="col-md-4">	
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class="">Long Term Goals3</label>
																	<textarea style="width:250px;"  placeholder="Long term goals" type="text" name="long_term_goals3" id="long_term_goals3" class="form-control"><?php echo $goals['long_term_goals3'] ?></textarea>
															</div>											
															</div>											
															</div>
														</div></br>
                                         
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
	 <div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Goals Record Has Been Updated Successfully</div></div></div>
    <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Goals Record Has not Been Updated Successfully</div></div></div>

	
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