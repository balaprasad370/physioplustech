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
                                <div class="card-body"><h5 class="card-title"> Examination 
								</h5>
                                    <form class="" action="<?php echo base_url().'client/patient/add_examination' ?>" method="post"  role="form" parsley-validate id="signupForm">
                                         <input type="hidden" name="examn_id" value="<?php echo $examn_id ?>"  />
						                 <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $patient_id ?>"  />
													<div class="row">
															<div class="col-md-4">
															 <div class="input-group">
															<div class="position-relative form-group"><label for="examn_date" class=""> Date </label>
																<input style="width:250px;" type="text" class="form-control datepicker" Placeholder="Date" name="examn_date" id="examn_date" autocomplete="off" data-toggle="datepicker" value="<?php echo date('d-m-Y',strtotime($examn['examn_date'])); ?>" >
															</div>	
															</div>	
															</div>	
															<div class="col-md-4">	
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class="">  Blood pressure </label>
																	<input style="width:250px;" placeholder="Blood pressure" type="text" name="bp_systolic_diastolic" id="bp_systolic_diastolic" class="form-control" value="<?php echo $examn['bp_systolic_diastolic'] ?>">
															  </div><span style="color:#c5c5c5">Systolic/Dialtolic</span>
															</div>
															</div>
															<div class="col-md-4">	
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class="">  Temperature </label>
																<input style="width:250px;" placeholder="Temperature" type="text" name="temperature" id="temperature" class="form-control" value="<?php echo $examn['temperature'] ?>">
															</div>											
															</div>											
															</div>
														</div></br>
														<div class="row">
															<div class="col-md-4">	
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class=""> Heart rate </label>
																	<input style="width:250px;" placeholder="Heart rate" type="text" name="heart_rate" id="heart_rate" class="form-control" value="<?php echo $examn['heart_rate'] ?>" >
															</div>											
															</div>											
															</div>											
														<div class="col-md-4">	
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class="">  Respiratory rate </label>
																<input placeholder="Respiratory rate" type="text" name="respiratory_rate" id="respiratory_rate" class="form-control"  value="<?php echo $examn['respiratory_rate']; ?>">
															</div>											
															</div>											
															</div>
															<div class="col-md-4">	
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class=""> Gait </label>
																<input style="width:250px;" placeholder="Gait" type="text" name="gait" id="gait" class="form-control" value="<?php echo $examn['gait']; ?>">
															</div>											
															</div>											
															</div>											
														</div></br></br>
														<div class="row">
															<div class="col-md-4">	
															<div class="position-relative form-group"><label for="bill_no" class="">  Built of the patient </label>
																</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($examn['built_of_patient'] == 'Ectomorph') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="Ectomorph" value="Ectomorph" name="built_of_patient" <?php echo ($examn['built_of_patient']=='Ectomorph')?'checked':'' ?> > 
																	   Ectomorph
																	</label>
																	<label <?php if($examn['built_of_patient'] == 'Mesomorph') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="Mesomorph" value="Mesomorph" name="built_of_patient" <?php echo ($examn['built_of_patient']=='Mesomorph')?'checked':'' ?>> 
																	    Mesomorph
																	</label>
																	<label <?php if($examn['built_of_patient'] == 'Endomorph') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="Endomorph" value="Endomorph" name="built_of_patient" <?php echo ($examn['built_of_patient']=='Endomorph')?'checked':'' ?>> 
																	    Endomorph
																	</label>
																	</div> </div>										
															</div>	
															<div class="col-md-4">	
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class="">  Posture </label>
																<textarea style="width:250px;" placeholder="Posture" type="text" name="posture" id="posture" class="form-control"><?php echo $examn['posture']; ?></textarea>
															</div>											
															</div>											
															</div>	
															<div class="col-md-4">	
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class="">  Scar type </label>
																<textarea style="width:250px;" placeholder="Scar type" type="text" name="scartype" id="scartype" class="form-control"><?php echo $examn['scar']; ?></textarea>
															</div>											
															</div>											
															</div>
														</div></br>
														<div class="row">
														    <div class="col-md-4">	
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class="">  Description </label>
																<textarea style="width:250px;" placeholder="Description" type="text" name="Description" id="Description" class="form-control"><?php echo $examn['desc']; ?></textarea>
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
	 <div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Record Has Been Updated Successfully</div></div></div>
    <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Record Has not Been Updated Successfully</div></div></div>

	
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
