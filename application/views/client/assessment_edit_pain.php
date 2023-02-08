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
                                <div class="card-body"><h5 class="card-title"> Pain Details
								</h5>
                                    <form class="" action="<?php echo base_url().'client/patient/add_pain' ?>" method="post"  role="form" parsley-validate id="signupForm">
                                         <input type="hidden" name="pain_id" value="<?php echo $pain_id ?>"  />
						                 <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $patient_id ?>"  />
										<div class="row">
														<div class="col-md-4">
															 <div class="input-group">
															<div class="position-relative form-group"><label for="bill_no" class="">  Date </label>
																<input type="text" style="width:250px;" class="form-control datepicker" Placeholder="Date" name="pain_date" id="pain_date"  value="<?php echo date('d-m-Y',strtotime($pain['pain_date'])); ?>" autocomplete="off" data-toggle="datepicker">
															</div>	
															</div>	
													    </div>
														<div class="col-md-4">
														<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">  Pain Site </label>
																<input style="width:250px;" placeholder="Pain site" type="text" name="pain_site" id="pain_site"  class="form-control" value="<?php echo $pain['pain_site'] ?>">
														</div> 
														</div>												   
														</div>
														<div class="col-md-4">
														 <div class="pb-10">
															<div class="position-relative form-group"><label for="bill_no" class=""> Severity of pain </label>
																<div class="br-wrapper br-theme-1to10">
																<select id="bars-1to10" name="severity_of_pain" style="width:100%; background-color:#3f6ad8; display: none;">
																<option value="-- no rating selected --"></option>
																	<option value="1" <?php if ($pain['severity_of_pain'] == '1') echo 'selected="selected"' ?>>1 - Mild Pain</option>
																	<option value="2" <?php if ($pain['severity_of_pain'] == '2') echo 'selected="selected"' ?>>2 - Mild Pain</option>
																	<option value="3" <?php if ($pain['severity_of_pain'] == '3') echo 'selected="selected"' ?>>3 - Moderate Pain</option>
																	<option value="4" <?php if ($pain['severity_of_pain'] == '4') echo 'selected="selected"' ?>>4 - Moderate Pain</option>
																	<option value="5" <?php if ($pain['severity_of_pain'] == '5') echo 'selected="selected"' ?>>5 - Severe Pain</option>
																	<option value="6" <?php if ($pain['severity_of_pain'] == '6') echo 'selected="selected"' ?>>6 - Severe Pain</option>
																	<option value="7" <?php if ($pain['severity_of_pain'] == '7') echo 'selected="selected"' ?>>7 - Very Severe Pain</option>
																	<option value="8" <?php if ($pain['severity_of_pain'] == '8') echo 'selected="selected"' ?>>8 - Very Severe Pain</option>
																	<option value="9" <?php if ($pain['severity_of_pain'] == '9') echo 'selected="selected"' ?>>9 - Worst Pain</option>
																	<option value="10" <?php if ($pain['severity_of_pain'] == '10') echo 'selected="selected"' ?>>10 - Worst Pain</option>
																</select></div>
															</div>
														</div>
														</div>		
													 </div></br>
													 <div class="row">
														<div class="col-md-4">  
														<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">  Pain Nature </label>
																<input placeholder="Pain nature" type="text" name="pain_nature" value="<?php echo $pain['pain_nature']; ?>" style="width:250px;" id="pain_nature"  class="form-control">
														</div> 
														</div> 
														</div>
														<div class="col-md-4">
														<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class=""> Pain Onset </label>
																<input placeholder="Pain onset" type="text" name="pain_onset" value="<?php echo $pain['pain_onset']; ?>" style="width:250px;" id="pain_onset"  class="form-control">
														</div> 
														</div>												   
														</div>
														<div class="col-md-4">
														<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">  Pain Duration </label>
																<input placeholder="Pain duration" type="text" name="pain_duration"  value="<?php echo $pain['pain_duration']; ?>" style="width:250px;" id="pain_duration"  class="form-control">
														</div> 
														</div> 
														</div>
													   </div></br>
													   <div class="row">
														<div class="col-md-4">
														<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">  Side Or Location </label>
																<input placeholder="Side or location" type="text" name="side_or_location" value="<?php echo $pain['side_or_location']; ?>" style="width:250px;" id="side_or_location"  class="form-control">
														</div> 
														</div> 
														</div>
														<div class="col-md-4">
														<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">  Trigger Point</label>
																<input placeholder="Trigger point" type="text" name="trigger_point" style="width:250px;" id="trigger_point" class="form-control" value="<?php echo $pain['trigger_point'] ?>">
														</div> 
														</div> 
														</div>
														<div class="col-md-4">
														<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">  ADL Affected </label>
																<input style="width:250px;" placeholder="ADL Affected" type="text" name="adl_affect" id="adl_affect"   class="form-control" value="<?php echo $pain['adl_affect'] ?>">
														</div> 
														</div> 
														</div>
													 </div></br>
													 <div class="row">
														<div class="col-md-8">
															<div class="position-relative form-group"><label for="bill_no" class="">  Diurnal variations &nbsp;&nbsp;</label>
																<div class="badge badge-pill badge-warning"><?php echo $pain['diurnal_variations'];?></div>
																</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($pain['diurnal_variations'] == 'Morning') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="checkbox" name="diurnal_variations[]" id="diurnal_variations" value="Morning"  <?php echo ($pain['diurnal_variations']=='Morning')?'checked':'' ?>> 
																	    Morning
																	</label>
																	<label <?php if($pain['diurnal_variations'] == 'Afternoon') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="checkbox" name="diurnal_variations[]" id="diurnal_variations1" value="Afternoon"  <?php echo ($pain['diurnal_variations']=='Afternoon')?'checked':'' ?>> 
																		Afternoon
																	</label>
																	<label <?php if($pain['diurnal_variations'] == 'Evening') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="checkbox" name="diurnal_variations[]" id="diurnal_variations2" value="Evening"  <?php echo ($pain['diurnal_variations']=='Evening')?'checked':'' ?>> 
																	    Evening
																	</label>
																	<label <?php if($pain['diurnal_variations'] == 'Night') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="checkbox" name="diurnal_variations[]" id="diurnal_variations3" value="Night" <?php echo ($pain['diurnal_variations']=='Night')?'checked':'' ?>> 
																		Night
																	</label>
																	<label <?php if($pain['diurnal_variations'] == 'No Specific pattern') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="checkbox" name="diurnal_variations[]" id="diurnal_variations4" value="No Specific pattern" <?php echo ($pain['diurnal_variations']=='No Specific pattern')?'checked':'No Specific pattern' ?>> 
																		No Specific Pattern
																	</label>
																	</div> </div>
															
														</div>
														<div class="col-md-4">
														<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">  Aggravating factors </label>
																<input style="width:250px;" placeholder="Aggravating factors" type="text" name="aggravating_factors" id="aggravating_factors"   class="form-control" value="<?php echo $pain['aggravating_factors']; ?>">
														</div> 
														</div> 
														</div>
													</div></br>
													 <div class="row">
														
														<div class="col-md-4">
														<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">  Relieving factors </label>
																<input style="width:250px;" placeholder="Relieving factors" type="text" name="releaving_factors" id="releaving_factors"   class="form-control" value="<?php echo $pain['releaving_factors']; ?>">
														</div> 
														</div> 
														</div>												   
													 </div></br></br>
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
	 <div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Pain Record Has Been Updated Successfully</div></div></div>
    <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Pain Record Has not Been Updated Successfully</div></div></div>

	
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
