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
                                <div class="card-body"><h5 class="card-title"> Sensor Examinations
								</h5>
                                    <form class="" action="<?php echo base_url().'client/patient/add_sexamination' ?>" method="post"  role="form" parsley-validate id="signupForm">
                                         <input type="hidden" name="sexamn_id" value="<?php echo $sexamn_id ?>"  />
						                 <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $patient_id ?>"  />
										 
										  <div class="row">
															<div class="col-md-6">
															 <div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">  Date </label>
																<input type="text" class="form-control datepicker" Placeholder="Date" name="sexamn_date" id="sexamn_date" autocomplete="off" data-toggle="datepicker" value="<?php echo date('d-m-Y',strtotime($sexamn['sexamn_date'])); ?>">
															    </div>	
															</div>	
															</div>
													  </div></br>
													  <table class="table table-datatable table-custom" id="drillDownDataTable">
														<thead>
														  <tr>
															<th width="5%;">Nerve root</th>
															<th width="25%;">Dermatome</th>
															<th width="35%;">Myotome</th>
															<th width="35%;">Reflexes</th>
														 </tr>
														</thead>
														<tbody>
														<tr><td class="text-center" >C2</td>
														<td class="text-center" ><h5> Occipital protuberance 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['c2_occipital_protuberance'] == 'Intact') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c2_occipital_protuberance" value="Intact" name="c2_occipital_protuberance"  <?php echo ($sexamn['c2_occipital_protuberance']=='Intact')?'checked':'' ?>> 
																	   Intact
																	</label>
																	<label <?php if($sexamn['c2_occipital_protuberance'] == 'Impaired') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c2_occipital_protuberance1" value="Impaired" name="c2_occipital_protuberance" <?php echo ($sexamn['c2_occipital_protuberance']=='Impaired')?'checked':'' ?>> 
																	   Impaired
																	</label>
																	</div> </h5>
														  </td>
														  <td class="text-center" >
														      <h5> Neck muscles 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['c2_neck_flexion_extension'] == 'Normal') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c2_neck_flexion_extension" value="Normal" name="c2_neck_flexion_extension"  <?php echo ($sexamn['c2_neck_flexion_extension']=='Normal')?'checked':'' ?> > 
																	   Normal
																	</label>
																	<label <?php if($sexamn['c2_neck_flexion_extension'] == 'Weak') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c2_neck_flexion_extension1" value="Weak" name="c2_neck_flexion_extension" <?php echo ($sexamn['c2_neck_flexion_extension']=='Weak')?'checked':'' ?>  > 
																	   Weak
																	</label>
																	</div> </h5>
															</td>
														  <td class="text-center" >
														  </td>
														</tr>
														<tr><td class="text-center" >C3</td>
														<td class="text-center" >
														<h5> Supraclavicular fossa 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['c3_supraclavicular_fossa'] == 'Intact') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c3_supraclavicular_fossa" value="Intact" name="c3_supraclavicular_fossa"  <?php echo ($sexamn['c3_supraclavicular_fossa']=='Intact')?'checked':'' ?> > 
																	   Intact
																	</label>
																	<label <?php if($sexamn['c3_supraclavicular_fossa'] == 'Impaired') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c3_supraclavicular_fossa1" value="Impaired" name="c3_supraclavicular_fossa" <?php echo ($sexamn['c3_supraclavicular_fossa']=='Impaired')?'checked':'' ?>> 
																	   Impaired
																	</label>
																	</div> </h5>
														    <td class="text-center" >
															    <h5> Neck lateral flexionlar joint 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['c3_neck_lateral_flexionlar_joint'] == 'Normal') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c3_neck_lateral_flexionlar_joint" value="Normal" name="c3_neck_lateral_flexionlar_joint" <?php echo ($sexamn['c3_neck_lateral_flexionlar_joint']=='Normal')?'checked':'' ?> > 
																	   Normal
																	</label>
																	<label <?php if($sexamn['c3_neck_lateral_flexionlar_joint'] == 'Weak') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c3_neck_lateral_flexionlar_joint1" value="Weak" name="c3_neck_lateral_flexionlar_joint" <?php echo ($sexamn['c3_neck_lateral_flexionlar_joint']=='Weak')?'checked':'' ?>> 
																	   Weak
																	</label>
																	</div> </h5>
															</td>
														  <td class="text-center" >
														  </td>
														</tr>
														<tr><td class="text-center" >C4</td>
														<td class="text-center" >
																<h5> Acromioclavicular joint 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['c4_acromioclavicular_joint'] == 'Intact') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c4_acromioclavicular_joint" value="Intact" name="c4_acromioclavicular_joint"  <?php echo ($sexamn['c4_acromioclavicular_joint']=='Intact')?'checked':'' ?>> 
																	   Intact
																	</label>
																	<label <?php if($sexamn['c4_acromioclavicular_joint'] == 'Impaired') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c4_acromioclavicular_joint1" value="Impaired" name="c4_acromioclavicular_joint" <?php echo ($sexamn['c4_acromioclavicular_joint']=='Impaired')?'checked':'' ?>> 
																	   Impaired
																	</label>
																	</div> </h5>
															</td>
														  <td class="text-center" >
														        <h5> Shoulder Elevation 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['c4_shoulder_elevation'] == 'Normal') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c4_shoulder_elevation" value="Normal" name="c4_shoulder_elevation"  <?php echo ($sexamn['c4_shoulder_elevation']=='Normal')?'checked':'' ?>> 
																	   Normal
																	</label>
																	<label <?php if($sexamn['c4_shoulder_elevation'] == 'Weak') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c4_shoulder_elevation1" value="Weak" name="c4_shoulder_elevation" <?php echo ($sexamn['c4_shoulder_elevation']=='Weak')?'checked':'' ?>> 
																	   Weak
																	</label>
																	</div> </h5>
														  </td>
														  <td class="text-center" >
														  </td>
														</tr>
														<tr><td class="text-center" >C5</td>
														<td class="text-center" >
														      <h5> Antecubital Fossa 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['c5_antecubital_fossa'] == 'Intact') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c5_antecubital_fossa" value="Intact" name="c5_antecubital_fossa"  <?php echo ($sexamn['c5_antecubital_fossa']=='Intact')?'checked':'' ?>> 
																	   Intact
																	</label>
																	<label <?php if($sexamn['c5_antecubital_fossa'] == 'Impaired') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c5_antecubital_fossa1" value="Impaired" name="c5_antecubital_fossa" <?php echo ($sexamn['c5_antecubital_fossa']=='Impaired')?'checked':'' ?>> 
																	   Impaired
																	</label>
																	</div> </h5>
														  </td>
														  <td class="text-center" >
														       <h5> Shoulder Abduction 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['c5_shoulder_abduction'] == 'Normal') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c5_shoulder_abduction" value="Normal" name="c5_shoulder_abduction" <?php echo ($sexamn['c5_shoulder_abduction']=='Normal')?'checked':'' ?> > 
																	   Normal
																	</label>
																	<label <?php if($sexamn['c5_shoulder_abduction'] == 'Weak') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c5_shoulder_abduction1" value="Weak" name="c5_shoulder_abduction" <?php echo ($sexamn['c5_shoulder_abduction']=='Weak')?'checked':'' ?>> 
																	   Weak
																	</label>
																	</div> </h5>
															</td>
														   <td class="text-center" >
														       <h5> Biceps, Brachioradialis 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['c5_biceps_brachioradialis'] == 'Absent') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c5_biceps_brachioradialis" value="Absent" name="c5_biceps_brachioradialis" <?php echo ($sexamn['c5_biceps_brachioradialis']=='Absent')?'checked':'' ?> > 
																	  Absent
																	</label>
																	<label <?php if($sexamn['c5_biceps_brachioradialis'] == 'Normal') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c5_biceps_brachioradialis1" value="Normal" name="c5_biceps_brachioradialis" <?php echo ($sexamn['c5_biceps_brachioradialis']=='Normal')?'checked':'' ?>> 
																	   Normal
																	</label>
																	<label <?php if($sexamn['c5_biceps_brachioradialis'] == 'Weak') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c5_biceps_brachioradialis2" value="Weak" name="c5_biceps_brachioradialis" <?php echo ($sexamn['c5_biceps_brachioradialis']=='Weak')?'checked':'' ?> > 
																	   Weak
																	</label>
																	<label <?php if($sexamn['c5_biceps_brachioradialis'] == 'Exaggerated') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c5_biceps_brachioradialis3" value="Exaggerated" name="c5_biceps_brachioradialis" <?php echo ($sexamn['c5_biceps_brachioradialis']=='Exaggerated')?'checked':'' ?>> 
																	   Exaggerated
																	</label>
																	</div> </h5>
															</td>
														</tr>
														<tr><td class="text-center" >C6</td>
														<td class="text-center" >
														     <h5> Thumb 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['c6_thumb'] == 'Intact') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c6_thumb" value="Intact" name="c6_thumb"   <?php echo ($sexamn['c6_thumb']=='Intact')?'checked':'' ?>> 
																	   Intact
																	</label>
																	<label <?php if($sexamn['c6_thumb'] == 'Impaired') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c6_thumb2" value="Impaired" name="c6_thumb" <?php echo ($sexamn['c6_thumb']=='Impaired')?'checked':'' ?>> 
																	    Impaired
																	</label>
																</div> </h5>
															
														  </td>
														  <td class="text-center" >
														        <h5> Biceps, Supinator, Wrist extensors 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['c6_biceps_wristextensors'] == 'Normal') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c6_biceps_wristextensors" value="Normal" name="c6_biceps_wristextensors" <?php echo ($sexamn['c6_biceps_wristextensors']=='Normal')?'checked':'' ?> > 
																	   Normal
																	</label>
																	<label <?php if($sexamn['c6_biceps_wristextensors'] == 'Weak') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c6_biceps_wristextensors1" value="Weak" name="c6_biceps_wristextensors" <?php echo ($sexamn['c6_biceps_wristextensors']=='Weak')?'checked':'' ?>> 
																	    Weak 
																	</label>
																</div> </h5>
															</td>
														 <td class="text-center" >
														        <h5> Biceps, Brachioradialis 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['c6_biceps_brachioradialis'] == 'Absent') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c6_biceps_brachioradialis" value="Absent" name="c6_biceps_brachioradialis" <?php echo ($sexamn['c6_biceps_brachioradialis']=='Absent')?'checked':'' ?> > 
																	    Absent
																	</label>
																	<label <?php if($sexamn['c6_biceps_brachioradialis'] == 'Normal') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c6_biceps_brachioradialis1" value="Normal" name="c6_biceps_brachioradialis" <?php echo ($sexamn['c6_biceps_brachioradialis']=='Normal')?'checked':'' ?>> 
																	   Normal
																	</label>
																	<label <?php if($sexamn['c6_biceps_brachioradialis'] == 'Weak') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c6_biceps_brachioradialis2" value="Weak" name="c6_biceps_brachioradialis" <?php echo ($sexamn['c6_biceps_brachioradialis']=='Weak')?'checked':'' ?>> 
																	  Weak
																	</label>
																	<label <?php if($sexamn['c6_biceps_brachioradialis'] == 'Exaggerated') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c6_biceps_brachioradialis3" value="Exaggerated" name="c6_biceps_brachioradialis" <?php echo ($sexamn['c6_biceps_brachioradialis']=='Exaggerated')?'checked':'' ?>> 
																	   Exaggerated
																	</label>
																</div> </h5>
															
														  </td>
														</tr>
														<tr><td class="text-center" >C7</td>
														<td class="text-center" >
														    <h5> Middle finger 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['c7_middle_finger'] == 'Intact') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c7_middle_finger" value="Intact" name="c7_middle_finger" <?php echo ($sexamn['c7_middle_finger']=='Intact')?'checked':'' ?> > 
																	    Intact
																	</label>
																	<label <?php if($sexamn['c7_middle_finger'] == 'Impaired') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c7_middle_finger1" value="Impaired" name="c7_middle_finger" <?php echo ($sexamn['c7_middle_finger']=='Impaired')?'checked':'' ?>> 
																	   Impaired
																	</label>
																	
																</div> </h5>
															</td>
														  <td class="text-center" >
														   <h5> Wrist flexors, Triceps 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['c7_wristflexors_triceps'] == 'Normal') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c7_wristflexors_triceps" value="Normal" name="c7_wristflexors_triceps"  <?php echo ($sexamn['c7_wristflexors_triceps']=='Normal')?'checked':'' ?>> 
																	    Normal
																	</label>
																	<label <?php if($sexamn['c7_wristflexors_triceps'] == 'Weak') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c7_wristflexors_triceps1" value="Weak" name="c7_wristflexors_triceps" <?php echo ($sexamn['c7_wristflexors_triceps']=='Weak')?'checked':'' ?>> 
																	   Weak
																	</label>
																	
																</div> </h5>
															</td>
														    <td class="text-center" >
														        <h5> Triceps 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['c7_triceps'] == 'Absent') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c7_triceps" value="Absent" name="c7_triceps" <?php echo ($sexamn['c7_triceps']=='Absent')?'checked':'' ?> > 
																	    Absent
																	</label>
																	<label <?php if($sexamn['c7_triceps'] == 'Normal') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c7_triceps1" value="Normal" name="c7_triceps" <?php echo ($sexamn['c7_triceps']=='Normal')?'checked':'' ?>> 
																	   Normal
																	</label>
																	<label <?php if($sexamn['c7_triceps'] == 'Weak') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c7_triceps2" value="Weak" name="c7_triceps" <?php echo ($sexamn['c7_triceps']=='Weak')?'checked':'' ?>> 
																	   Weak
																	</label>
																	<label <?php if($sexamn['c7_triceps'] == 'Exaggerated') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c7_triceps3" value="Exaggerated" name="c7_triceps" <?php echo ($sexamn['c7_triceps']=='Exaggerated')?'checked':'' ?>> 
																	   Exaggerated
																	</label>
																</div> </h5>
															</td>
														</tr>
														<tr><td class="text-center" >C8</td>
														<td class="text-center" >
																<h5> Little Finger 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['c8_little_finger'] == 'Intact') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c8_little_finger" value="Intact" name="c8_little_finger" <?php echo ($sexamn['c8_little_finger']=='Intact')?'checked':'' ?> > 
																	    Intact
																	</label>
																	<label <?php if($sexamn['c8_little_finger'] == 'Impaired') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c8_little_finger1" value="Impaired" name="c8_little_finger" <?php echo ($sexamn['c8_little_finger']=='Impaired')?'checked':'' ?> > 
																	   Impaired
																	</label>
																</div> </h5>
															</td>
														  <td class="text-center" >
														    <h5> Thumb extensors & adductors, ulnar deviators 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['c8_thumb_extensor_adductors'] == 'Normal') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c8_thumb_extensor_adductors" value="Normal" name="c8_thumb_extensor_adductors" <?php echo ($sexamn['c8_thumb_extensor_adductors']=='Normal')?'checked':'' ?> > 
																	    Normal
																	</label>
																	<label <?php if($sexamn['c8_thumb_extensor_adductors'] == 'Weak') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c8_thumb_extensor_adductors1" value="Weak" name="c8_thumb_extensor_adductors" <?php echo ($sexamn['c8_thumb_extensor_adductors']=='Weak')?'checked':'' ?> > 
																	   Weak
																	</label>
																</div> </h5>
															</td>
														 <td class="text-center" >
														      <h5> Triceps 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['c8_triceps'] == 'Absent') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c8_triceps" value="Absent" name="c8_triceps" <?php echo ($sexamn['c8_triceps']=='Absent')?'checked':'' ?> > 
																	    Absent
																	</label>
																	<label <?php if($sexamn['c8_triceps'] == 'Normal') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c8_triceps1" value="Normal" name="c8_triceps" <?php echo ($sexamn['c8_triceps']=='Normal')?'checked':'' ?>> 
																	   Normal
																	</label>
																	<label <?php if($sexamn['c8_triceps'] == 'Weak') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c8_triceps2" value="Weak" name="c8_triceps" <?php echo ($sexamn['c8_triceps']=='Weak')?'checked':'' ?> > 
																	    Weak
																	</label>
																	<label <?php if($sexamn['c8_triceps'] == 'Exaggerated') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="c8_triceps3" value="Exaggerated" name="c8_triceps" <?php echo ($sexamn['c8_triceps']=='Exaggerated')?'checked':'' ?>> 
																	   Exaggerated
																	</label>
																</div> </h5>
															</td>
														</tr>
														<tr><td class="text-center" >T1</td>
														<td class="text-center" >
																<h5> Medial side antecubital fossa 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['t1_medialside_antecubital'] == 'Intact') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="t1_medialside_antecubital" value="Intact" name="t1_medialside_antecubital" <?php echo ($sexamn['t1_medialside_antecubital']=='Intact')?'checked':'' ?>> 
																	    Intact
																	</label>
																	<label <?php if($sexamn['t1_medialside_antecubital'] == 'Impaired') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="t1_medialside_antecubital1" value="Impaired" name="t1_medialside_antecubital" <?php echo ($sexamn['t1_medialside_antecubital']=='Impaired')?'checked':'' ?>> 
																	   Impaired
																	</label>
																</div> </h5>
														   </td>
														  <td class="text-center" ></td>
														 <td class="text-center" ></td>
														</tr>
														<tr><td class="text-center" >T2</td>
														<td class="text-center" >
														     <h5> Apex of axilla 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['t2_apexof_axilla'] == 'Intact') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="t2_apexof_axilla" value="Intact" name="t2_apexof_axilla" <?php echo ($sexamn['t2_apexof_axilla']=='Intact')?'checked':'' ?> > 
																	    Intact
																	</label>
																	<label <?php if($sexamn['t2_apexof_axilla'] == 'Impaired') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="t2_apexof_axilla1" value="Impaired" name="t2_apexof_axilla"  <?php echo ($sexamn['t2_apexof_axilla']=='Impaired')?'checked':'' ?>> 
																	   Impaired
																	</label>
																</div> </h5>
															</td>
														  <td class="text-center" ></td>
														 <td class="text-center" ></td>
														</tr>
														<tr><td class="text-center" >T4</td>
														<td class="text-center" >
															<h5> Nipples 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['t4_nipples'] == 'Intact') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="t4_nipples" value="Intact" name="t4_nipples"  <?php echo ($sexamn['t4_nipples']=='Intact')?'checked':'' ?>> 
																	    Intact
																	</label>
																	<label <?php if($sexamn['t4_nipples'] == 'Impaired') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="t4_nipples1" value="Impaired" name="t4_nipples" <?php echo ($sexamn['t4_nipples']=='Impaired')?'checked':'' ?>> 
																	   Impaired
																	</label>
																</div> </h5>
															</td>
														  <td class="text-center" ></td>
														 <td class="text-center" ></td>
														</tr>
														<tr><td class="text-center" >T6</td>
														<td class="text-center" >
														    <h5> Xiphisternum 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['t6_xiphisternum'] == 'Intact') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="t6_xiphisternum" value="Intact" name="t6_xiphisternum" <?php echo ($sexamn['t6_xiphisternum']=='Intact')?'checked':'' ?> > 
																	    Intact
																	</label>
																	<label <?php if($sexamn['t6_xiphisternum'] == 'Impaired') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="t6_xiphisternum1" value="Impaired" name="t6_xiphisternum" <?php echo ($sexamn['t6_xiphisternum']=='Impaired')?'checked':'' ?>> 
																	   Impaired
																	</label>
																</div> </h5>
															</td>
														  <td class="text-center" ></td>
														 <td class="text-center" ></td>
														</tr>
														<tr><td class="text-center" >T10</td>
														<td class="text-center" >
														   <h5> Umbilicus 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['t10_umbilicus'] == 'Intact') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="t10_umbilicus" value="Intact" name="t10_umbilicus" <?php echo ($sexamn['t10_umbilicus']=='Intact')?'checked':'' ?> > 
																	    Intact
																	</label>
																	<label <?php if($sexamn['t10_umbilicus'] == 'Impaired') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="t10_umbilicus1" value="Impaired" name="t10_umbilicus" <?php echo ($sexamn['t10_umbilicus']=='Impaired')?'checked':'' ?>> 
																	   Impaired
																	</label>
																</div> </h5>
															</td>
														  <td class="text-center" ></td>
														 <td class="text-center" ></td>
														</tr>
														<tr><td class="text-center" >T12</td>
														<td class="text-center" >
														      <h5> Midpoint of the inguinal ligament 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['t12_midpoint_ofthe_inguinal_ligament'] == 'Intact') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="t12_midpoint_ofthe_inguinal_ligament" value="Intact" name="t12_midpoint_ofthe_inguinal_ligament" <?php echo ($sexamn['t12_midpoint_ofthe_inguinal_ligament']=='Intact')?'checked':'' ?> > 
																	    Intact
																	</label>
																	<label <?php if($sexamn['t12_midpoint_ofthe_inguinal_ligament'] == 'Impaired') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="t12_midpoint_ofthe_inguinal_ligament1" value="Impaired" name="t12_midpoint_ofthe_inguinal_ligament"  <?php echo ($sexamn['t12_midpoint_ofthe_inguinal_ligament']=='Impaired')?'checked':'' ?> > 
																	   Impaired
																	</label>
																</div> </h5>
															</td>
														  <td class="text-center" ></td>
														 <td class="text-center" ></td>
														</tr>
														<tr><td class="text-center" >L2</td>
														<td class="text-center" >
														     <h5> Mid-anterior thigh 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['l2_midanterior_thigh'] == 'Intact') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="l2_midanterior_thigh" value="Intact" name="l2_midanterior_thigh" <?php echo ($sexamn['l2_midanterior_thigh']=='Intact')?'checked':'' ?> > 
																	    Intact
																	</label>
																	<label <?php if($sexamn['l2_midanterior_thigh'] == 'Impaired') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="l2_midanterior_thigh1" value="Impaired" name="l2_midanterior_thigh" <?php echo ($sexamn['l2_midanterior_thigh']=='Impaired')?'checked':'' ?>> 
																	   Impaired
																	</label>
																</div> </h5>
															</td>
														  <td class="text-center" >
														        <h5> Hip flexion 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['l2_hip_flexion'] == 'Normal') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="l2_hip_flexion" value="Normal" name="l2_hip_flexion" <?php echo ($sexamn['l2_hip_flexion']=='Normal')?'checked':'' ?> > 
																	    Normal
																	</label>
																	<label <?php if($sexamn['l2_hip_flexion'] == 'Weak') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="l2_hip_flexion1" value="Weak" name="l2_hip_flexion" <?php echo ($sexamn['l2_hip_flexion']=='Weak')?'checked':'' ?>> 
																	   Weak
																	</label>
																</div> </h5>
															</td>
														 <td class="text-center" >
														       <h5> Patellar (L2,L4) 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['l2_patellar'] == 'Absent') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="patellar" value="Absent" name="patellar" <?php echo ($sexamn['l2_patellar']=='Absent')?'checked':'' ?> > 
																	    Absent
																	</label>
																	<label <?php if($sexamn['l2_patellar'] == 'Normal') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="patellar1" value="Normal" name="patellar" <?php echo ($sexamn['l2_patellar']=='Normal')?'checked':'' ?>> 
																	   Normal
																	</label>
																	<label <?php if($sexamn['l2_patellar'] == 'Weak') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="patellar2" value="Weak" name="patellar" <?php echo ($sexamn['l2_patellar']=='Weak')?'checked':'' ?> > 
																	    Weak
																	</label>
																	<label <?php if($sexamn['l2_patellar'] == 'Exaggerated') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="patellar3" value="Exaggerated" name="patellar" <?php echo ($sexamn['l2_patellar']=='Exaggerated')?'checked':'' ?>> 
																	   Exaggerated
																	</label>
																</div> </h5>
														 </td>
														</tr>
														<tr><td class="text-center" >L3</td>
														<td class="text-center" >
															<h5> Medial epicondyle of the femur 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['l3_medial_epicondyle_ofthe_femur'] == 'Intact') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="l3_medial_epicondyle_ofthe_femur" value="Intact" name="l3_medial_epicondyle_ofthe_femur"  <?php echo ($sexamn['l3_medial_epicondyle_ofthe_femur']=='Intact')?'checked':'' ?>> 
																	    Intact
																	</label>
																	<label <?php if($sexamn['l3_medial_epicondyle_ofthe_femur'] == 'Impaired') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="l3_medial_epicondyle_ofthe_femur1" value="Impaired" name="l3_medial_epicondyle_ofthe_femur" <?php echo ($sexamn['l3_medial_epicondyle_ofthe_femur']=='Impaired')?'checked':'' ?>> 
																	   Impaired
																	</label>
																</div> </h5>
															</td>
														  <td class="text-center" >
														  <h5> Knee extension
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['l3_knee_extension'] == 'Normal') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="l3_knee_extension" value="Normal" name="l3_knee_extension" <?php echo ($sexamn['l3_knee_extension']=='Normal')?'checked':'' ?> > 
																	    Normal
																	</label>
																	<label <?php if($sexamn['l3_knee_extension'] == 'Weak') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="l3_knee_extension1" value="Weak" name="l3_knee_extension" <?php echo ($sexamn['l3_knee_extension']=='Weak')?'checked':'' ?>  > 
																	   Weak
																	</label>
																</div> </h5>
															</td>
														 <td class="text-center" ><h5>Pain with SLR
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['l3_pain_with_slr'] == 'Absent') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="l3_pain_with_slr" value="Absent" name="l3_pain_with_slr" <?php echo ($sexamn['l3_pain_with_slr']=='Absent')?'checked':'' ?> > 
																	    Absent
																	</label>
																	<label <?php if($sexamn['l3_pain_with_slr'] == 'Normal') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="l3_pain_with_slr1" value="Normal" name="l3_pain_with_slr" <?php echo ($sexamn['l3_pain_with_slr']=='Normal')?'checked':'' ?>> 
																	   Normal
																	</label>
																	<label <?php if($sexamn['l3_pain_with_slr'] == 'Weak') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="l3_pain_with_slr2" value="Weak" name="l3_pain_with_slr" <?php echo ($sexamn['l3_pain_with_slr']=='Weak')?'checked':'' ?>> 
																	   Weak
																	</label>
																	<label <?php if($sexamn['l3_pain_with_slr'] == 'Exaggerated') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="l3_pain_with_slr3" value="Exaggerated" name="l3_pain_with_slr" <?php echo ($sexamn['l3_pain_with_slr']=='Exaggerated')?'checked':'' ?>> 
																	   Exaggerated
																	</label>
																</div> </h5>
															</td>
														</tr>
														<tr><td class="text-center" >L4</td>
														<td class="text-center" >
																<h5> Medial malleolus
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['l4_medial_malleolus'] == 'Normal') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="l4_medial_malleolus" value="Normal" name="l4_medial_malleolus" <?php echo ($sexamn['l4_medial_malleolus']=='Normal')?'checked':'' ?> > 
																	    Normal
																	</label>
																	<label <?php if($sexamn['l4_medial_malleolus'] == 'Weak') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="l4_medial_malleolus1" value="Weak" name="l4_medial_malleolus" <?php echo ($sexamn['l4_medial_malleolus']=='Weak')?'checked':'' ?>> 
																	   Weak
																	</label>
																</div> </h5>
														  </td>
														  <td class="text-center" >
														      <h5> Ankle dorsi flexion
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['l4_ankle_dorsi_flexion'] == 'Normal') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="l4_ankle_dorsi_flexion" value="Normal" name="l4_ankle_dorsi_flexion" <?php echo ($sexamn['l4_ankle_dorsi_flexion']=='Normal')?'checked':'' ?> > 
																	    Normal
																	</label>
																	<label <?php if($sexamn['l4_ankle_dorsi_flexion'] == 'Weak') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="l4_ankle_dorsi_flexion1" value="Weak" name="l4_ankle_dorsi_flexion" <?php echo ($sexamn['l4_ankle_dorsi_flexion']=='Weak')?'checked':'' ?>> 
																	   Weak
																	</label>
																</div> </h5>
															</td>
														 <td class="text-center" >
														 </td>
														</tr>
														<tr><td class="text-center" >L5</td>
														<td class="text-center" ><h5> Dorsum of foot @ 3rd MTP
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['l5_dorsumof_root'] == 'Intact') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="l5_dorsumof_root" value="Intact" name="l5_dorsumof_root"  <?php echo ($sexamn['l5_dorsumof_root']=='Intact')?'checked':'' ?>> 
																	    Intact
																	</label>
																	<label <?php if($sexamn['l5_dorsumof_root'] == 'Impaired') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="l5_dorsumof_root1" value="Impaired" name="l5_dorsumof_root" <?php echo ($sexamn['l5_dorsumof_root']=='Impaired')?'checked':'' ?>> 
																	   Impaired
																	</label>
																</div> </h5>
															</td>
														  <td class="text-center" ><h5> Extensor Hallucis, peroneals, Glut. med, DF's, hamstring & calf
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['l5_great_toe_extension'] == 'Normal') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="l5_great_toe_extension" value="Normal" name="l5_great_toe_extension"  <?php echo ($sexamn['l5_great_toe_extension']=='Normal')?'checked':'' ?>> 
																	    Normal
																	</label>
																	<label <?php if($sexamn['l5_great_toe_extension'] == 'Weak') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="l5_great_toe_extension1" value="Weak" name="l5_great_toe_extension" <?php echo ($sexamn['l5_great_toe_extension']=='Weak')?'checked':'' ?> > 
																	   Weak
																	</label>
																</div> </h5>
														  </td>
														 <td class="text-center" >
														 </td>
														</tr>
														<tr><td class="text-center" >S1</td>
														<td class="text-center" ><h5> Lateral heel
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['s1_lateral_heel'] == 'Intact') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="s1_lateral_heel1" value="Intact" name="s1_lateral_heel" <?php echo ($sexamn['s1_lateral_heel']=='Intact')?'checked':'' ?> > 
																	    Intact
																	</label>
																	<label <?php if($sexamn['s1_lateral_heel'] == 'Impaired') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="s1_lateral_heel11" value="Impaired" name="s1_lateral_heel" <?php echo ($sexamn['s1_lateral_heel']=='Impaired')?'checked':'' ?> > 
																	   Impaired
																	</label>
																</div> </h5>
														   </td>
														  <td class="text-center" ><h5> Ankle plantar flexion
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['s1_ankle_plantar_flexion'] == 'Normal') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="s1_ankle_plantar_flexion" value="Normal" name="s1_ankle_plantar_flexion" <?php echo ($sexamn['s1_ankle_plantar_flexion']=='Normal')?'checked':'' ?> > 
																	    Normal
																	</label>
																	<label <?php if($sexamn['s1_ankle_plantar_flexion'] == 'Weak') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="s1_ankle_plantar_flexion1" value="Weak" name="s1_ankle_plantar_flexion" <?php echo ($sexamn['s1_ankle_plantar_flexion']=='Weak')?'checked':'' ?>> 
																	   Weak
																	</label>
																</div> </h5>
															</td>
														 <td class="text-center" ><h5> Limited SLR, Achilles reflex
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['s1_limitedslr_achillesreflex'] == 'Absent') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="s1_limitedslr_achillesreflex" value="Absent" name="s1_limitedslr_achillesreflex" <?php echo ($sexamn['s1_limitedslr_achillesreflex']=='Absent')?'checked':'' ?> > 
																	    Absent
																	</label>
																	<label <?php if($sexamn['s1_limitedslr_achillesreflex'] == 'Normal') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="s1_limitedslr_achillesreflex1" value="Normal" name="s1_limitedslr_achillesreflex" <?php echo ($sexamn['s1_limitedslr_achillesreflex']=='Normal')?'checked':'' ?> > 
																	   Normal
																	</label>
																	<label <?php if($sexamn['s1_limitedslr_achillesreflex'] == 'Weak') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="s1_limitedslr_achillesreflex2" value="Weak" name="s1_limitedslr_achillesreflex" <?php echo ($sexamn['s1_limitedslr_achillesreflex']=='Weak')?'checked':'' ?> > 
																	    Weak
																	</label>
																	<label <?php if($sexamn['s1_limitedslr_achillesreflex'] == 'Exaggerated') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="s1_limitedslr_achillesreflex3" value="Exaggerated" name="s1_limitedslr_achillesreflex" <?php echo ($sexamn['s1_limitedslr_achillesreflex']=='Exaggerated')?'checked':'' ?>> 
																	   Exaggerated
																	</label>
																</div> </h5>
															</td>
														</tr>
														<tr><td class="text-center" >S2</td>
														<td class="text-center" ><h5> Popliteal fossa
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['s2_popliteal_fossa'] == 'Intact') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="s2_popliteal_fossa" value="Intact" name="s2_popliteal_fossa" <?php echo ($sexamn['s2_popliteal_fossa']=='Intact')?'checked':'' ?> > 
																	    Intact
																	</label>
																	<label <?php if($sexamn['s2_popliteal_fossa'] == 'Impaired') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="s2_popliteal_fossa1" value="Impaired" name="s2_popliteal_fossa" <?php echo ($sexamn['s2_popliteal_fossa']=='Impaired')?'checked':'' ?>  > 
																	   Impaired
																	</label>
																</div> </h5>
															</td>
														  <td class="text-center" ><h5> Knee flexion
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['s2_knee_flexion'] == 'Normal') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="s2_knee_flexion" value="Normal" name="s2_knee_flexion" <?php echo ($sexamn['s2_knee_flexion']=='Normal')?'checked':'' ?> > 
																	    Normal
																	</label>
																	<label <?php if($sexamn['s2_knee_flexion'] == 'Weak') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="s2_knee_flexion1" value="Weak" name="s2_knee_flexion" <?php echo ($sexamn['s2_knee_flexion']=='Weak')?'checked':'' ?>> 
																	   Weak
																	</label>
																</div> </h5>
															</td>
														 <td class="text-center" ><h5> Limited SLR, Achilles reflex
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['s2_limitedslr_achillesreflex'] == 'Absent') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="s2_limitedslr_achillesreflex" value="Absent" name="s2_limitedslr_achillesreflex" <?php echo ($sexamn['s2_limitedslr_achillesreflex']=='Absent')?'checked':'' ?> > 
																	   Absent
																	</label>
																	<label <?php if($sexamn['s2_limitedslr_achillesreflex'] == 'Normal') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="s2_limitedslr_achillesreflex1" value="Normal" name="s2_limitedslr_achillesreflex" <?php echo ($sexamn['s2_limitedslr_achillesreflex']=='Normal')?'checked':'' ?>> 
																	   Normal
																	</label>
																	<label <?php if($sexamn['s2_limitedslr_achillesreflex'] == 'Weak') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="s2_limitedslr_achillesreflex2" value="Weak" name="s2_limitedslr_achillesreflex" <?php echo ($sexamn['s2_limitedslr_achillesreflex']=='Weak')?'checked':'' ?>> 
																	   Weak
																	</label>
																	<label <?php if($sexamn['s2_limitedslr_achillesreflex'] == 'Exaggerated') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="s2_limitedslr_achillesreflex3" value="Exaggerated" name="s2_limitedslr_achillesreflex" <?php echo ($sexamn['s2_limitedslr_achillesreflex']=='Exaggerated')?'checked':'' ?>> 
																	   Exaggerated
																	</label>
																</div> </h5>
															</td>
														 </tr>
														 <tr><td class="text-center" >S5</td>
														<td class="text-center" ><h5> Perianal
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['s5_perianal'] == 'Intact') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="s5_perianal" value="Intact" name="s5_perianal" <?php echo ($sexamn['s5_perianal']=='Intact')?'checked':'' ?> > 
																	    Intact
																	</label>
																	<label <?php if($sexamn['s5_perianal'] == 'Impaired') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="s5_perianal1" value="Impaired" name="s5_perianal" <?php echo ($sexamn['s5_perianal']=='Impaired')?'checked':'' ?> > 
																	   Impaired
																	</label>
																</div> </h5>
															</td>
														  <input type="hidden" name="patient_id" value="<?php echo $this->uri->segment(4); ?>" id="patient_id"/>
														   <td class="text-center" ><h5> Bladder, Rectum
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label <?php if($sexamn['s5_bladder_rectum'] == 'Normal') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="s5_bladder_rectum" value="Normal" name="s5_bladder_rectum"  <?php echo ($sexamn['s5_bladder_rectum']=='Normal')?'checked':'' ?> > 
																	    Normal
																	</label>
																	<label <?php if($sexamn['s5_bladder_rectum'] == 'Weak') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="s5_bladder_rectum1" value="Weak" name="s5_bladder_rectum" <?php echo ($sexamn['s5_bladder_rectum']=='Weak')?'checked':'' ?>> 
																	   Weak
																	</label>
																</div> </h5>
															</td>
														 <td class="text-center" >
														 </td>
														</tr>
														</tbody>
													  </table>
													  
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
