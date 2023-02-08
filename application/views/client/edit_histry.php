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
                                <div class="card-body"><h5 class="card-title"> History
								</h5>
                                    <form class="" action="<?php echo base_url().'client/patient/add_history' ?>" method="post"  role="form" parsley-validate id="signupForm">
                                         <input type="hidden" name="his_id" value="<?php echo $his_id ?>"  />
						                 <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $patient_id ?>"  />
										<div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="his_date" class="">Date</label>
												 <input name="his_date" value="<?php echo date('d-m-Y',strtotime($history['his_date'])); ?>" type="text" class="form-control datepicker" data-toggle="datepicker" parsley-trigger="change" parsley-required="true" autocomplete="off"></div>
												</div>
											 
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="medical" class="">Medical History</label>
												<textarea rows="3" class="form-control autosize-input form-rounded" id="medical" name="medical" ><?php echo $history['medical'] ?></textarea>
												 </div>
												</div>
                                            </div>
											
											
											<div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="surgical" class="">Surgical History</label>
												<textarea rows="3" class="form-control autosize-input form-rounded" id="surgical" name="surgical" ><?php echo $history['surgical'] ?></textarea>
												 </div>
												</div>
											 
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="his_other_disease" class="">Other History</label>
												<textarea rows="3" class="form-control autosize-input form-rounded" id="his_other_disease" name="his_other_disease" ><?php echo $history['his_other_disease'] ?></textarea>
												 </div>
												</div>
                                            </div>
											
											<div class="row">
																<div class="col-md-4">
																 <div class="position-relative form-group"><label for="bill_no" class="">Diabetes</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($history['diabetes'] == 'yes') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="diabetes" value="yes" name="diabetes"   <?php echo ($history['diabetes']=='yes')?'checked':'' ?>> 
																	   Yes
																	</label>
																	<label <?php if($history['diabetes'] == 'no') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="diabetes1" value="no" name="diabetes" <?php echo ($history['diabetes']=='no')?'checked':'' ?>> 
																		No
																	</label>
																	</div></div> 
															   </div>
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">BP</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($history['blood_pressure'] == 'yes') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="blood_pressure" value="yes" name="blood_pressure" <?php echo ($history['blood_pressure']=='yes')?'checked':'' ?> > 
																	   Yes
																	</label>
																	<label <?php if($history['blood_pressure'] == 'no') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="blood_pressure1" value="no" name="blood_pressure" <?php echo ($history['blood_pressure']=='no')?'checked':'' ?>> 
																		No
																	</label>
																	</div> </div> 
																</div>
																<div class="col-md-4">
																	<div class="position-relative form-group"><label for="bill_no" class="">Smoking</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($history['smoking'] == 'yes') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="smoking" value="yes" name="smoking"  <?php echo ($history['smoking']=='yes')?'checked':'' ?>> 
																	   Yes
																	</label>
																	<label <?php if($history['smoking'] == 'no') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="smoking1" value="no" name="smoking"  <?php echo ($history['smoking']=='no')?'checked':'' ?>> 
																		No
																	</label></div>
																	</div> 
																</div>															
															 </div></br>
															 
															 <div class="row">
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">Drinking</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($history['drinking'] == 'yes') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="drinking" value="yes" name="drinking" <?php echo ($history['drinking']=='yes')?'checked':'' ?> > 
																	   Yes
																	</label>
																	<label <?php if($history['drinking'] == 'no') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="drinking1" value="no" name="drinking" <?php echo ($history['drinking']=='no')?'checked':'' ?>> 
																		No
																	</label>
																	</div> </div>
																</div>
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">Fever and Chill</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($history['Fever'] == 'yes') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="Fever" value="yes" name="Fever"  <?php echo ($history['Fever']=='yes')?'checked':'' ?>  > 
																	   Yes
																	</label>
																	<label <?php if($history['Fever'] == 'no') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="Fever1" value="no" name="Fever" <?php echo ($history['Fever']=='no')?'checked':'' ?>> 
																		No
																	</label>
																	</div> </div> 
																</div>
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">Heart Disease</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($history['Heart'] == 'yes') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="Heart" value="yes" name="Heart"  <?php echo ($history['Heart']=='yes')?'checked':'' ?>> 
																	   Yes
																	</label>
																	<label <?php if($history['Heart'] == 'no') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="Heart1" value="no" name="Heart" <?php echo ($history['Heart']=='no')?'checked':'' ?>> 
																		No
																	</label>
																	</div> </div> 
																</div>
															</div></br>
															 <div class="row">
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">Bleeding Disorder</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($history['Disorder'] == 'yes') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="Disorder" value="yes" name="Disorder"  <?php echo ($history['Disorder']=='yes')?'checked':'' ?>> 
																	   Yes
																	</label>
																	<label <?php if($history['Disorder'] == 'no') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="Disorder1" value="no" name="Disorder" <?php echo ($history['Disorder']=='no')?'checked':'' ?>> 
																		No
																	</label>
																	</div></div> 
															    </div>
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">Recent Infection</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($history['Infection'] == 'yes') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="Infection" value="yes" name="Infection"  <?php echo ($history['Infection']=='yes')?'checked':'' ?>> 
																	   Yes
																	</label>
																	<label <?php if($history['Infection'] == 'no') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="Infection1" value="no" name="Infection" <?php echo ($history['Infection']=='no')?'checked':'' ?> > 
																		No
																	</label>
																	</div> </div> 
																</div>
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">Pregnancy</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($history['Pregnancy'] == 'yes') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="Pregnancy" value="yes" name="Pregnancy" <?php echo ($history['Pregnancy']=='yes')?'checked':'' ?> > 
																	   Yes
																	</label>
																	<label <?php if($history['Pregnancy'] == 'no') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="Pregnancy1" value="no" name="Pregnancy" <?php echo ($history['Pregnancy']=='no')?'checked':'' ?>> 
																		No
																	</label>
																	</div> </div> 
																</div>															
															 </div></br>
															 <div class="row">
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">HTN</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($history['HTN'] == 'yes') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="HTN" value="yes" name="HTN"  <?php echo ($history['HTN']=='yes')?'checked':'' ?>> 
																	   Yes
																	</label>
																	<label <?php if($history['HTN'] == 'no') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="HTN1" value="no" name="HTN" <?php echo ($history['HTN']=='no')?'checked':'' ?>> 
																		No
																	</label>
																	</div> </div>
															   </div>
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">TB</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($history['TB'] == 'yes') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="TB" value="yes" name="TB"  <?php echo ($history['TB']=='yes')?'checked':'' ?> > 
																	   Yes
																	</label>
																	<label <?php if($history['TB'] == 'no') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="TB1" value="no" name="TB" <?php echo ($history['TB']=='no')?'checked':'' ?>> 
																		No
																	</label>
																	</div> </div> 
																</div>
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">Cancer</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($history['Cancer'] == 'yes') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="Cancer" value="yes" name="Cancer"  <?php echo ($history['Cancer']=='yes')?'checked':'' ?> > 
																	   Yes
																	</label>
																	<label <?php if($history['Cancer'] == 'no') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="Cancer1" value="no" name="Cancer" <?php echo ($history['Cancer']=='no')?'checked':'' ?>> 
																		No
																	</label>
																	</div> </div> 
																</div>															
															 </div></br>
															  <div class="row">
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">HIV/AIDS</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($history['AIDS'] == 'yes') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="AIDS" value="yes" name="AIDS"  <?php echo ($history['AIDS']=='yes')?'checked':'' ?>> 
																	   Yes
																	</label>
																	<label <?php if($history['AIDS'] == 'no') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="AIDS1" value="no" name="AIDS" <?php echo ($history['AIDS']=='no')?'checked':'' ?>> 
																		No
																	</label>
																	</div> </div>
															   </div>
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">Past Surgery</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($history['Surgery'] == 'yes') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="Surgery" value="yes" name="Surgery"  <?php echo ($history['Surgery']=='yes')?'checked':'' ?>> 
																	   Yes
																	</label>
																	<label <?php if($history['Surgery'] == 'no') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="Surgery1" value="no" name="Surgery" <?php echo ($history['Surgery']=='no')?'checked':'' ?>> 
																		No
																	</label>
																	</div> </div> 
																</div>
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">Allergies</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($history['Allergies'] == 'yes') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="Allergies" value="yes" name="Allergies" <?php echo ($history['Allergies']=='yes')?'checked':'' ?>> 
																	   Yes
																	</label>
																	<label <?php if($history['Allergies'] == 'no') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="Allergies1" value="no" name="Allergies" <?php echo ($history['Allergies']=='no')?'checked':'' ?>> 
																		No
																	</label>
																	</div> </div> 
																</div>															
															 </div></br>
															  <div class="row">
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">Osteoporotic</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($history['Osteoporotic'] == 'yes') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="Osteoporotic" value="yes" name="Osteoporotic" <?php echo ($history['Osteoporotic']=='yes')?'checked':'' ?> > 
																	   Yes
																	</label>
																	<label <?php if($history['Osteoporotic'] == 'no') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="Osteoporotic1" value="no" name="Osteoporotic" <?php echo ($history['Osteoporotic']=='no')?'checked':'' ?>> 
																		No
																	</label>
																	</div> </div>
															   </div>
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">Depression</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($history['Depression'] == 'yes') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="Depression" value="yes" name="Depression"  <?php echo ($history['Depression']=='yes')?'checked':'' ?>> 
																	   Yes
																	</label>
																	<label <?php if($history['Depression'] == 'no') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="Depression1" value="no" name="Depression" <?php echo ($history['Depression']=='no')?'checked':'' ?>> 
																		No
																	</label>
																	</div> </div> 
																</div>
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">Hepatitis</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($history['Hepatitis'] == 'yes') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="Hepatitis" value="yes" name="Hepatitis" <?php echo ($history['Hepatitis']=='yes')?'checked':'' ?> > 
																	   Yes
																	</label>
																	<label <?php if($history['Hepatitis'] == 'no') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="Hepatitis1" value="no" name="Hepatitis" <?php echo ($history['Hepatitis']=='no')?'checked':'' ?>> 
																		No
																	</label>
																	</div> </div> 
																</div>															
															 </div></br>
															 <div class="row">
																<div class="col-md-4">
																  <div class="position-relative form-group"><label for="bill_no" class=""> Any Implants </label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($history['Implants'] == 'yes') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="Implants" value="yes" name="Implants" <?php echo ($history['Implants']=='yes')?'checked':'' ?> > 
																	   Yes
																	</label>
																	<label <?php if($history['Implants'] == 'no') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="Implants1" value="no" name="Implants" <?php echo ($history['Implants']=='no')?'checked':'' ?>> 
																		No
																	</label>
																	</div> </div>
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
	 <div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>History Record Has Been Updated Successfully</div></div></div>
    <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>History Record Has not Been Updated Successfully</div></div></div>

	
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
