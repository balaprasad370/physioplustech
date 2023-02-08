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
								 <form class="" action="<?php echo base_url().'client/patient/add_mexamination' ?>" method="post"  role="form" parsley-validate id="signupForm">
								 <input type="hidden"  name="patient_id" id="patient_id" value="<?php echo $this->uri->segment(4); ?>" > 
					             <input type="hidden"  name="mexamn_id" id="mexamn_id" value="<?php echo $this->uri->segment(5); ?>" >  
								<div class="row">
															<div class="col-md-4">
															 <div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class="">  Date </label>
																<input type="text" class="form-control datepicker" Placeholder="Date" name="mexamn_date" id="mexamn_date" autocomplete="off" data-toggle="datepicker">
															 </div>	
															 </div>	
															</div>	
														</div></br>
													 <?php
					$CI =& get_instance();
					$CI->load->model('patient_model');
					
				?>	
                                               <div class="">
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div id="accordion" class="accordion-wrapper mb-3">
                                    <div class="card">
                                        <div id="headingOne" class="card-header">
                                            <button type="button" data-toggle="collapse" data-target="#head" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
                                                <h5 class="m-0 p-0">Head, Neck and Truck</h5>
                                            </button>
                                        </div>
                                        <div data-parent="#accordion" id="head" aria-labelledby="headingOne" class="collapse">
                                            <div class="card-body">
											
											<div class="table-responsive">
																 <table  class="table table-datatable table-custom" id="advancedDataTable">
																		<tr>
																			<td style="width:30%">
																				<div>
																					<h4  style="color:#3f6ad8; margin-left:125px">Left</h4>
																				</div>
																			</td>
																			<td style="width:40%">
																				<div>
																					<h4 style="color:#3f6ad8; margin-left:140px">Parameters</h4>
																				</div>
																			</td>
																			<td style="width:30%">
																				<div>
																					<h4 style="color:#3f6ad8; margin-left:110px">Right</h4>
																				</div>
																			</td>
																		</tr>
																		<tr>
																			<td style="width:30%">
																				<div>
																					<span class="badge badge-primary" >Tone</span>
																					<span class="badge badge-primary" style="margin-left:60px">Power</span>
																					<span class="badge badge-primary" style="margin-left:30px">ROM</span>
																				</div>
																			</td>
																			<td style="width:40%">
																				<div>
																					<span class="badge badge-primary" >Movement</span>
																					<span class="badge badge-primary" style="margin-left:60px">Muscles</span>
																					<span class="badge badge-primary" style="margin-left:60px">Nerve root</span>
																				</div>
																			</td>
																			<td style="width:30%">
																				<div>
																					<span class="badge badge-primary" >ROM</span>
																					<span class="badge badge-primary" style="margin-left:32px">Power</span>
																					<span class="badge badge-primary" style="margin-left:29px">Tone</span>
																					
																				</div>
																			</td>
																		</tr>
																		<?php
															$headneck_row='';
															foreach($headneck as $headnecks){
																$headneck_row = $CI->patient_model->editMexamnHeadneck($headnecks['headneck_muscle_id'],$mexamn_id);
														?>
																		<tr>
																			<td style="width:30%">
																				<div>
																					<span >
																						<input type="hidden" class="span11" name="headneck_muscle_id[]" id="headneck_muscle_id[]" value="<?php echo $headnecks['headneck_muscle_id']; ?>" autocomplete="off">
																						<select class="select-control" name="left_headneck_tone[]" id="left_headneck_tone[]" placeholder="select" style="width:90px">
																						<option></option>
																						<option value="Normal" <?php if ($headneck_row['left_headneck_tone'] == 'Normal') echo 'selected="selected"' ?>>Normal</option>
																						<option value="Flaccid" <?php if ($headneck_row['left_headneck_tone'] == 'Flaccid') echo 'selected="selected"' ?>>Flaccid</option>
																						<option value="Spastic" <?php if ($headneck_row['left_headneck_tone'] == 'Spastic') echo 'selected="selected"' ?>>Spastic</option>
																						<option value="Regid" <?php if ($headneck_row['left_headneck_tone'] == 'Regid') echo 'selected="selected"' ?>>Regid</option>
																					</select></span>
																					<?php if($headnecks['headneck_muscle_id'] != 1) { ?>
																					<span style="margin-left:15px;">
																						<select class="select-control" name="left_headneck_power[]" id="left_headneck_power[]" placeholder="--" style="width:65px">
																						<option></option>
																						<option value="5" <?php if ($headneck_row['left_headneck_power'] == '5') echo 'selected="selected"' ?>>5</option>
																						<option value="5-" <?php if ($headneck_row['left_headneck_power'] == '5-') echo 'selected="selected"' ?>>5-</option>
																						<option value="4+" <?php if ($headneck_row['left_headneck_power'] == '4+') echo 'selected="selected"' ?>>4+</option>
																						<option value="4" <?php if ($headneck_row['left_headneck_power'] == '4') echo 'selected="selected"' ?>>4</option>
																						<option value="4-" <?php if ($headneck_row['left_headneck_power'] == '4-') echo 'selected="selected"' ?>>4-</option>
																						<option value="3+" <?php if ($headneck_row['left_headneck_power'] == '3+') echo 'selected="selected"' ?>>3+</option>
																						<option value="3" <?php if ($headneck_row['left_headneck_power'] == '3') echo 'selected="selected"' ?>>3</option>
																						<option value="3-" <?php if ($headneck_row['left_headneck_power'] == '3-') echo 'selected="selected"' ?>>3-</option>
																						<option value="2+" <?php if ($headneck_row['left_headneck_power'] == '2+') echo 'selected="selected"' ?>>2+</option>
																						<option value="2" <?php if ($headneck_row['left_headneck_power'] == '2') echo 'selected="selected"' ?>>2</option>
																						<option value="2-" <?php if ($headneck_row['left_headneck_power'] == '2-') echo 'selected="selected"' ?>>2-</option>
																						<option value="1" <?php if ($headneck_row['left_headneck_power'] == '1') echo 'selected="selected"' ?>>1</option>
																						<option value="0" <?php if ($headneck_row['left_headneck_power'] == '0') echo 'selected="selected"' ?>>0</option>
																					</select></span>
																					<span >
																						<input type="text"  name="left_headneck_rom[]" id="left_headneck_rom[]" placeholder="Degree" style="width:50px;margin-left:20px"  value="" autocomplete="off"/>
																						</span><?php }else if($headnecks['headneck_muscle_id'] == 1) { ?>
																							<span style="margin-left:15px;display:none">
																							<select class="select-control" name="left_headneck_power[]" id="left_headneck_power[]" placeholder="--" style="width:65px">
																							<option></option>
																							<option value="5" <?php if ($headneck_row['left_headneck_power'] == '5') echo 'selected="selected"' ?>>5</option>
																							<option value="5-" <?php if ($headneck_row['left_headneck_power'] == '5-') echo 'selected="selected"' ?>>5-</option>
																							<option value="4+" <?php if ($headneck_row['left_headneck_power'] == '4+') echo 'selected="selected"' ?>>4+</option>
																							<option value="4" <?php if ($headneck_row['left_headneck_power'] == '4') echo 'selected="selected"' ?>>4</option>
																							<option value="4-" <?php if ($headneck_row['left_headneck_power'] == '4-') echo 'selected="selected"' ?>>4-</option>
																							<option value="3+" <?php if ($headneck_row['left_headneck_power'] == '3+') echo 'selected="selected"' ?>>3+</option>
																							<option value="3" <?php if ($headneck_row['left_headneck_power'] == '3') echo 'selected="selected"' ?>>3</option>
																							<option value="3-" <?php if ($headneck_row['left_headneck_power'] == '3-') echo 'selected="selected"' ?>>3-</option>
																							<option value="2+" <?php if ($headneck_row['left_headneck_power'] == '2+') echo 'selected="selected"' ?>>2+</option>
																							<option value="2" <?php if ($headneck_row['left_headneck_power'] == '2') echo 'selected="selected"' ?>>2</option>
																							<option value="2-" <?php if ($headneck_row['left_headneck_power'] == '2-') echo 'selected="selected"' ?>>2-</option>
																							<option value="1" <?php if ($headneck_row['left_headneck_power'] == '1') echo 'selected="selected"' ?>>1</option>
																							<option value="0" <?php if ($headneck_row['left_headneck_power'] == '0') echo 'selected="selected"' ?>>0</option>
																						</select></span>
																						<span >
																							<input type="hidden"  name="left_headneck_rom[]" id="left_headneck_rom[]" placeholder="Degree" style="width:50px;margin-left:20px"  value="" autocomplete="off"/>
																						</span>
																					<?php } ?>
																				</div>
																			</td>
																			<td style="width:40%">
																				<div>
																					<span style="width:70px" class="badge badge-info"><?php echo $headnecks['movement']; ?></span>
																					<?php if($headnecks['headneck_muscle_id']!=1){ ?>
																					<span style="width:92px;margin-left:55px" class="badge badge-secondary"><?php echo $headnecks['muscles']; ?></span>
																					<span style="width:60px;margin-left:38px" class="badge badge-warning"><?php echo $headnecks['nerve_root']; ?></span>
																					<?php } else { ?>
																					<span style="width:92px;margin-left:130px" class="badge badge-secondary"><?php echo $headnecks['muscles']; ?></span>
																					<span style="width:60px;margin-left:38px" class="badge badge-warning"><?php echo $headnecks['nerve_root']; ?></span>
																					<?php } ?>
																				</div>
																			</td>
																			<td style="width:30%">
																				<div>
																					<?php if($headnecks['headneck_muscle_id'] != 1) { ?>
																					<span >
																						<input type="text"  name="right_headneck_rom[]" id="right_headneck_rom[]" placeholder="Degree" style="width:50px" autocomplete="off"/>
																					</span>
																					<span style="margin-left:15px;">
																						<select class="select-control" name="right_headneck_power[]" id="right_headneck_power[]" placeholder="--" style="width:65px;margin-left:15px">
																						<option></option>
																						<option value="5"<?php if ($headneck_row['right_headneck_power'] == '5') echo 'selected="selected"' ?> >5</option>
																						<option value="5-"<?php if ($headneck_row['right_headneck_power'] == '5-') echo 'selected="selected"' ?>>5-</option>
																						<option value="4+"<?php if ($headneck_row['right_headneck_power'] == '4+') echo 'selected="selected"' ?>>4+</option>
																						<option value="4" <?php if ($headneck_row['right_headneck_power'] == '4') echo 'selected="selected"' ?>>4</option>
																						<option value="4-" <?php if ($headneck_row['right_headneck_power'] == '4-') echo 'selected="selected"' ?>>4-</option>
																						<option value="3+" <?php if ($headneck_row['right_headneck_power'] == '3+') echo 'selected="selected"' ?>>3+</option>
																						<option value="3" <?php if ($headneck_row['right_headneck_power'] == '3') echo 'selected="selected"' ?>>3</option>
																						<option value="3-" <?php if ($headneck_row['right_headneck_power'] == '3-') echo 'selected="selected"' ?>>3-</option>
																						<option value="2+" <?php if ($headneck_row['right_headneck_power'] == '2+') echo 'selected="selected"' ?>>2+</option>
																						<option value="2" <?php if ($headneck_row['right_headneck_power'] == '2') echo 'selected="selected"' ?>>2</option>
																						<option value="2-" <?php if ($headneck_row['right_headneck_power'] == '2-') echo 'selected="selected"' ?>>2-</option>
																						<option value="1" <?php if ($headneck_row['right_headneck_power'] == '1') echo 'selected="selected"' ?>>1</option>
																						<option value="0" <?php if ($headneck_row['right_headneck_power'] == '0') echo 'selected="selected"' ?>>0</option>
																					</select></span><?php }else if($headnecks['headneck_muscle_id'] == 1){ ?>
																						<span >
																						<input type="hidden"  name="right_headneck_rom[]" id="right_headneck_rom[]" placeholder="Degree" style="width:50px" autocomplete="off"/>
																					</span>
																					<span style="margin-left:15px;display:none">
																						<select class="select-control" name="right_headneck_power[]" id="right_headneck_power[]" placeholder="--" style="width:65px;margin-left:15px">
																						<option></option>
																						<option value="5" <?php if ($headneck_row['right_headneck_power'] == '5') echo 'selected="selected"' ?>>5</option>
																						<option value="5-" <?php if ($headneck_row['right_headneck_power'] == '5-') echo 'selected="selected"' ?>>5-</option>
																						<option value="4+" <?php if ($headneck_row['right_headneck_power'] == '4+') echo 'selected="selected"' ?>>4+</option>
																						<option value="4" <?php if ($headneck_row['right_headneck_power'] == '4') echo 'selected="selected"' ?>>4</option>
																						<option value="4-" <?php if ($headneck_row['right_headneck_power'] == '4-') echo 'selected="selected"' ?>>4-</option>
																						<option value="3+" <?php if ($headneck_row['right_headneck_power'] == '3+') echo 'selected="selected"' ?>>3+</option>
																						<option value="3" <?php if ($headneck_row['right_headneck_power'] == '3') echo 'selected="selected"' ?>>3</option>
																						<option value="3-" <?php if ($headneck_row['right_headneck_power'] == '3-') echo 'selected="selected"' ?>>3-</option>
																						<option value="2+" <?php if ($headneck_row['right_headneck_power'] == '2+') echo 'selected="selected"' ?>>2+</option>
																						<option value="2" <?php if ($headneck_row['right_headneck_power'] == '2') echo 'selected="selected"' ?>>2</option>
																						<option value="2-" <?php if ($headneck_row['right_headneck_power'] == '2-') echo 'selected="selected"' ?>>2-</option>
																						<option value="1" <?php if ($headneck_row['right_headneck_power'] == '1') echo 'selected="selected"' ?>>1</option>
																						<option value="0" <?php if ($headneck_row['right_headneck_power'] == '0') echo 'selected="selected"' ?>>0</option>
																					</select></span>
																					<?php } ?>
																					<?php if($headnecks['headneck_muscle_id']!=1) { ?>
																					<span style="margin-left:20px">
																						<select class="select-control" name="right_headneck_tone[]" id="right_headneck_tone[]" placeholder="Select" style="width:90px;">
																						<option></option>
																						<option value="Normal" <?php if ($headneck_row['right_headneck_tone'] == 'Normal') echo 'selected="selected"' ?>>Normal</option>
																						<option value="Flaccid" <?php if ($headneck_row['right_headneck_tone'] == 'Flaccid') echo 'selected="selected"' ?>>Flaccid</option>
																						<option value="Spastic" <?php if ($headneck_row['right_headneck_tone'] == 'Spastic') echo 'selected="selected"' ?>>Spastic</option>
																						<option value="Regid" <?php if ($headneck_row['right_headneck_tone'] == 'Regid') echo 'selected="selected"' ?>>Regid</option>
																					</select></span><?php }else{  ?>
																					<span style="margin-left:158px">
																						<select class="select-control" name="right_headneck_tone[]" id="right_headneck_tone[]" placeholder="Select" style="width:90px;">
																						<option></option>
																						<option value="Normal" <?php if ($headneck_row['right_headneck_tone'] == 'Normal') echo 'selected="selected"' ?>>Normal</option>
																						<option value="Flaccid" <?php if ($headneck_row['right_headneck_tone'] == 'Flaccid') echo 'selected="selected"' ?>>Flaccid</option>
																						<option value="Spastic" <?php if ($headneck_row['right_headneck_tone'] == 'Spastic') echo 'selected="selected"' ?>>Spastic</option>
																						<option value="Regid" <?php if ($headneck_row['right_headneck_tone'] == 'Regid') echo 'selected="selected"' ?>>Regid</option>
																					</select></span>
																					<?php } ?>
																				</div>
																			</td>
																		</tr>
																		<?php
																			}
																		?>
																	</table>
																  </div>
																  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div id="headingTwo" class="b-radius-0 card-header">
                                            <button type="button" data-toggle="collapse" data-target="#spine" aria-expanded="false" aria-controls="collapseTwo" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0">Combined movement Assesment of spine</h5></button>
                                        </div>
                                        <div data-parent="#accordion" id="spine" class="collapse">
                                            <div class="card-body"> 																<div class="table-responsive">
																	<label></label>
																	<?php
							if($combine != false) {
							foreach($combine as $row){
							?>
																	<table  class="table table-datatable table-custom" id="advancedDataTable">
																	<tr><td class="text-center" >Cervical spine</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="cervical" value="<?php echo $row['cervical'] ?>"> </td></tr>
																	<tr><td class="text-center" >Thoracic Spine</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="thoracic" value="<?php echo $row['thoracic'] ?>" > </td></tr>
																	<tr><td class="text-center" >Lumbar Spine</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="lumbar" value="<?php echo $row['lumbar'] ?>"> </td></tr>
																		<Input type="hidden" value="<?php echo $row['mexamn_id'] ?>" name="combine1">
																	
																	</table>
																	<?php } } else { ?>
																	
																	<table  class="table table-datatable table-custom" id="advancedDataTable">
																	<tr><td class="text-center" >Cervical spine</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="cervical"> </td></tr>
																	<tr><td class="text-center" >Thoracic Spine</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="thoracic"> </td></tr>
																	<tr><td class="text-center" >Lumbar Spine</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="lumbar" > </td></tr>
																		 
																	</table>
																	<?php } ?>
																	</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div id="headingThree" class="card-header">
                                            <button type="button" data-toggle="collapse" data-target="#Cervical" aria-expanded="false" aria-controls="collapseThree" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0">Cervical Spine</h5></button>
                                        </div>
                                        <div data-parent="#accordion" id="Cervical" class="collapse">
                                            <div class="card-body"><div class="table-responsive">
																		<?php
														if($cervical != false) {
														foreach($cervical as $row){
															
														?>
																<table  class="table table-datatable table-custom" id="advancedDataTable">
																<tr><td class="text-center" >Flexion</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="flexion1" value="<?php echo $row['flexion1']; ?>"> </td></tr>
																<tr><td class="text-center" >Extension</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Extension1" value="<?php echo $row['flexion1']; ?>" > </td></tr>
																</table>
																</div>
																<div class="table-responsive">
																<table  class="table table-datatable table-custom" id="advancedDataTable">
																<tr><td class="text-center" ><h6 style="color:#3f6ad8;">Side Flexion</h6></td><td class="text-center" >Left</td><td class="text-center" ><input  type="text" class="form-control" name="SideFlexion_left1" value="<?php echo $row['SideFlexion_left1']; ?>"> </td><td class="text-center" >Right</td><td class="text-center" ><input type="text" class="form-control" name="SideFlexion_right1" value="<?php echo $row['SideFlexion_right1']; ?>"> </td></tr>
																<tr><td class="text-center" ><h6 style="color:#3f6ad8;">Rotation</h6></td><td class="text-center" >Left</td><td class="text-center" ><input type="text" class="form-control" name="Rotation_left1" value="<?php echo $row['Rotation_left1']; ?>"> </td><td class="text-center" >Right</td><td class="text-center" ><input type="text" class="form-control" name="Rotation_right1" value="<?php echo $row['Rotation_right1']; ?>"> </td></tr>
																<input type="hidden" name="cervial" value="<?php echo $row['cervial_id']; ?>">
																</table>
																<?php } } else { ?>
																<table  class="table table-datatable table-custom" id="advancedDataTable">
																<tr><td class="text-center" >Flexion</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="flexion1"> </td></tr>
																<tr><td class="text-center" >Extension</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Extension1"> </td></tr>
																
																<tr><td class="text-center" ><h6 style="color:#3f6ad8;">Side Flexion</h6></td><td class="text-center" >Left</td><td class="text-center" ><input  type="text" class="form-control" name="SideFlexion_left1" > </td><td class="text-center" >Right</td><td class="text-center" ><input type="text" class="form-control" name="SideFlexion_right1"> </td></tr>
																<tr><td class="text-center" ><h6 style="color:#3f6ad8;">Rotation</h6></td><td class="text-center" >Left</td><td class="text-center" ><input type="text" class="form-control" name="Rotation_left1" > </td><td class="text-center" >Right</td><td class="text-center" ><input type="text" class="form-control" name="Rotation_right1" > </td></tr>
																
																</table>
																<?php } ?>
																</div>
                                            </div>
                                        </div>
                                    </div>
									
									
                                    <div class="card">
                                        <div id="headingThree" class="card-header">
                                            <button type="button" data-toggle="collapse" data-target="#Thoraccic" aria-expanded="false" aria-controls="collapseThree" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0">Thoraccic Spine</h5></button>
                                        </div>
                                        <div data-parent="#accordion" id="Thoraccic" class="collapse">
                                            <div class="card-body"><div class="table-responsive">
																<label></label>
																<table  class="table table-datatable table-custom" id="advancedDataTable">
																	<?php
																if($thoraccic != false) {
																foreach($thoraccic as $row){
																	
															   ?>
																	<tr><td class="text-center" >Flexion</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="flexion2" value="<?php echo $row['flexion2']; ?>"> </td></tr>
																	<tr><td class="text-center" >Extension</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Extension2" value="<?php echo $row['Extension2']; ?>"> </td></tr>
																</table>
																</div>
																 <div class="table-responsive">
																<table  class="table table-datatable table-custom" id="advancedDataTable">
																<tr><td class="text-center" ><h6 style="color:#3f6ad8;">Side Flexion</h6></td><td class="text-center" >Left</td><td class="text-center" ><input type="text" class="form-control" name="SideFlexion_left2" value="<?php echo $row['SideFlexion_left2']; ?>"> </td><td class="text-center" >Right</td><td class="text-center" ><input type="text" class="form-control" name="SideFlexion_right2" value="<?php echo $row['SideFlexion_right2']; ?>"> </td></tr>
																<tr><td class="text-center" ><h6 style="color:#3f6ad8;">Rotation</h6></td><td class="text-center" >Left</td><td class="text-center" ><input type="text" class="form-control" name="Rotation_left2" value="<?php echo $row['rotation_left2']; ?>"> </td><td class="text-center" >Right</td><td class="text-center" ><input type="text" class="form-control" name="Rotation_right2" value="<?php echo $row['rotation_right2']; ?>"> </td></tr>
																</table>
																<input type="hidden" name="thoraccic" value="<?php echo $row['thoraccic_id']; ?>">
																<?php } } else { ?>
																
																<table  class="table table-datatable table-custom" id="advancedDataTable">
																<tr><td class="text-center" >Flexion</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="flexion2" > </td></tr>
																	<tr><td class="text-center" >Extension</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Extension2"> </td></tr>
																
																<tr><td class="text-center" ><h6 style="color:#3f6ad8;">Side Flexion</h6></td><td class="text-center" >Left</td><td class="text-center" ><input type="text" class="form-control" name="SideFlexion_left2" > </td><td class="text-center" >Right</td><td class="text-center" ><input type="text" class="form-control" name="SideFlexion_right2" > </td></tr>
																<tr><td class="text-center" ><h6 style="color:#3f6ad8;">Rotation</h6></td><td class="text-center" >Left</td><td class="text-center" ><input type="text" class="form-control" name="Rotation_left2" > </td><td class="text-center" >Right</td><td class="text-center" ><input type="text" class="form-control" name="Rotation_right2" > </td></tr>
																</table>
																<?php } ?>
																</div>
                                            </div>
                                        </div>
                                    </div>
									
									
                                    <div class="card">
                                        <div id="headingThree" class="card-header">
                                            <button type="button" data-toggle="collapse" data-target="#lumber" aria-expanded="false" aria-controls="collapseThree" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0">Lumber Spine</h5></button>
                                        </div>
                                        <div data-parent="#accordion" id="lumber" class="collapse">
                                            <div class="card-body"> 
											
											<div class="table-responsive">
																<table  class="table table-datatable table-custom" id="advancedDataTable">
																<?php
															if($lumber != false) {
															foreach($lumber as $row){
															?>	
																	<tr><td class="text-center" >Flexion</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="flexion3" value="<?php echo $row['flexion3']; ?>"> </td></tr>
																	<tr><td class="text-center" >Extension</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Extension3" value="<?php echo $row['Extension3']; ?>"> </td></tr>
																</table>
															    </div>
																  
																  <div class="table-responsive">
																	<table  class="table table-datatable table-custom" id="advancedDataTable">
																	<tr><td class="text-center" ><h6 style="color:#3f6ad8;">Side Flexion</h6></td><td class="text-center" >Left</td><td class="text-center" ><input type="text" class="form-control" name="SideFlexion_left3" value="<?php echo $row['SideFlexion_left3']; ?>"> </td><td class="text-center" >Right</td><td class="text-center" ><input type="text" class="form-control" name="SideFlexion_right3" value="<?php echo $row['SideFlexion_right3']; ?>"> </td></tr>
																	<tr><td class="text-center" ><h6 style="color:#3f6ad8;">Rotation</h6></td><td class="text-center" >Left</td><td class="text-center" ><input type="text" class="form-control" name="rotation_left3" value="<?php echo $row['rotation_left3']; ?>"> </td><td class="text-center" >Right</td><td class="text-center" ><input type="text" class="form-control" name="rotation_right3" value="<?php echo $row['rotation_right3']; ?>"> </td></tr>
																	<input type="hidden" name="lumber" value="<?php echo $row['lumber_id']; ?>">
								                                      <?php } } else { ?>
																	  <tr><td class="text-center" >Flexion</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="flexion3" > </td></tr>
																	<tr><td class="text-center" >Extension</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Extension3" > </td>
																	<tr><td class="text-center" ><h6 style="color:#3f6ad8;">Side Flexion</h6></td><td class="text-center" >Left</td><td class="text-center" ><input type="text" class="form-control" name="SideFlexion_left3"> </td><td class="text-center" >Right</td><td class="text-center" ><input type="text" class="form-control" name="SideFlexion_right3" > </td></tr>
																	<tr><td class="text-center" ><h6 style="color:#3f6ad8;">Rotation</h6></td><td class="text-center" >Left</td><td class="text-center" ><input type="text" class="form-control" name="rotation_left3" > </td><td class="text-center" >Right</td><td class="text-center" ><input type="text" class="form-control" name="rotation_right3" > </td></tr>
																	<?php } ?>
																	</table>
																	
																	 </div>
                                            </div>
                                        </div>
                                    </div>
									
									
									
                                    <div class="card">
                                        <div id="headingThree" class="card-header">
                                            <button type="button" data-toggle="collapse" data-target="#Hip" aria-expanded="false" aria-controls="collapseThree" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0">Hip</h5></button>
                                        </div>
                                        <div data-parent="#accordion" id="Hip" class="collapse">
                                            <div class="card-body"> 
											
											<div class="table-responsive">
																	<table  class="table table-datatable table-custom" id="advancedDataTable">
																	<tr>
																	<td style="width:30%">
																	<div>
																	<h4  style="color:#3f6ad8; margin-left:125px">Left</h4>
																	</div>
																	</td>
																	<td style="width:40%">
																	<div>
																	<h4  style="color:#3f6ad8; margin-left:140px">Parameters</h4>
																	</div>
																	</td>
																	<td style="width:40%">
																	<div>
																	<h4  style="color:#3f6ad8; margin-left:110px">Right</h4>
																	</div>
																	</td>
																	</tr>
																	<tr>
																	<td style="width:30%">
																	<div>
																	<span class="badge badge-primary" >Tone</span>
																	<span class="badge badge-primary" style="margin-left:60px">Power</span>
																	<span class="badge badge-primary" style="margin-left:30px">ROM</span>
																	</div>
																	</td>
																	<td style="width:40%">
																	<div>
																	<span class="badge badge-primary" >Movement</span>
																	<span class="badge badge-primary" style="margin-left:60px">Muscles</span>
																	<span class="badge badge-primary" style="margin-left:60px">Nerve root</span>
																	</div>
																	</td>
																	<td style="width:30%">
																	<div>
																	<span class="badge badge-primary" >ROM</span>
																	<span class="badge badge-primary" style="margin-left:32px">Power</span>
																	<span class="badge badge-primary" style="margin-left:29px">Tone</span>
																	</div>
																	</td>
																	</tr>
																	<?php
																	$hip_row = '';
																	foreach($hip as $hips){
																	$hip_row = $CI->patient_model->editMexamnHip($hips['hip_muscle_id'],$mexamn_id);
																	?>
																	<tr>
																	<td style="width:30%">
																	<div>
																		<span >
																		<select class="select-control" name="left_hip_tone[]" id="left_hip_tone[]" placeholder="Select" style="width:90px">
																			<option></option>
																			<option value="Normal" <?php if ($hip_row['left_hip_tone'] == 'Normal') echo 'selected="selected"' ?>>Normal</option>
																			<option value="Flaccid" <?php if ($hip_row['left_hip_tone'] == 'Flaccid') echo 'selected="selected"' ?>>Flaccid</option>
																			<option value="Spastic" <?php if ($hip_row['left_hip_tone'] == 'Spastic') echo 'selected="selected"' ?>>Spastic</option>
																			<option value="Regid" <?php if ($hip_row['left_hip_tone'] == 'Regid') echo 'selected="selected"' ?>>Regid</option>
																		</select></span>
																	<span style="margin-left:15px;">
																		<select class="select-control" name="left_hip_power[]" id="left_hip_power[]" placeholder="--" style="width:65px">
																			<option></option>
																			<option value="5" <?php if ($hip_row['left_hip_power'] == '5') echo 'selected="selected"' ?>>5</option>
																			<option value="5-" <?php if ($hip_row['left_hip_power'] == '5-') echo 'selected="selected"' ?>>5-</option>
																			<option value="4+" <?php if ($hip_row['left_hip_power'] == '4+') echo 'selected="selected"' ?>>4+</option>
																			<option value="4" <?php if ($hip_row['left_hip_power'] == '4') echo 'selected="selected"' ?>>4</option>
																			<option value="4-" <?php if ($hip_row['left_hip_power'] == '4-') echo 'selected="selected"' ?>>4-</option>
																			<option value="3+" <?php if ($hip_row['left_hip_power'] == '3+') echo 'selected="selected"' ?>>3+</option>
																			<option value="3" <?php if ($hip_row['left_hip_power'] == '3') echo 'selected="selected"' ?>>3</option>
																			<option value="3-" <?php if ($hip_row['left_hip_power'] == '3-') echo 'selected="selected"' ?>>3-</option>
																			<option value="2+" <?php if ($hip_row['left_hip_power'] == '2+') echo 'selected="selected"' ?>>2+</option>
																			<option value="2" <?php if ($hip_row['left_hip_power'] == '2') echo 'selected="selected"' ?>>2</option>
																			<option value="2-" <?php if ($hip_row['left_hip_power'] == '2-') echo 'selected="selected"' ?>>2-</option>
																			<option value="1" <?php if ($hip_row['left_hip_power'] == '1') echo 'selected="selected"' ?>>1</option>
																			<option value="0" <?php if ($hip_row['left_hip_power'] == '0') echo 'selected="selected"' ?>>0</option>
																	</select></span>
																	<span >
																	<input type="text"  value="<?php echo $hip_row['left_hip_rom']; ?>" name="left_hip_rom[]" id="left_hip_rom[]" placeholder="Degree" style="width:50px;margin-left:20px" autocomplete="off"/>
																	<input type="hidden" class="span11" name="hip_muscle_id[]" id="hip_muscle_id[]" value="<?php echo $hips['hip_muscle_id']; ?>" autocomplete="off">
																	</span>
																	</div>
																	</td>
																	<td style="width:40%">
																	<div>
																	<span style="width:70px" class="badge badge-info"><?php echo $hips['movement']; ?></span>
																		<span style="width:78px;margin-left:55px" class="badge badge-secondary"><?php echo $hips['muscles']; ?></span>
																		<span style="width:60px;margin-left:50px" class="badge badge-warning"><?php echo $hips['nerve_root']; ?></span>
																	</div>
																	</td>
																	<td style="width:40%">
																			<div>
																			<span >
																			<input type="text"  name="right_hip_rom[]" id="right_hip_rom[]" placeholder="Degree" style="width:50px" autocomplete="off" value="<?php echo $hip_row['right_hip_rom']; ?>"/>
																		</span>
																		<span style="margin-left:15px;">
																			<select class="select-control" name="right_hip_power[]" id="right_hip_power[]" placeholder="--" style="width:65px;margin-left:15px">
																				<option></option>
																				<option value="5" <?php if ($hip_row['right_hip_power'] == '5') echo 'selected="selected"' ?>>5</option>
																				<option value="5-" <?php if ($hip_row['right_hip_power'] == '5-') echo 'selected="selected"' ?>>5-</option>
																				<option value="4+" <?php if ($hip_row['right_hip_power'] == '4+') echo 'selected="selected"' ?>>4+</option>
																				<option value="4" <?php if ($hip_row['right_hip_power'] == '4') echo 'selected="selected"' ?>>4</option>
																				<option value="4-" <?php if ($hip_row['right_hip_power'] == '4-') echo 'selected="selected"' ?>>4-</option>
																				<option value="3+" <?php if ($hip_row['right_hip_power'] == '3+') echo 'selected="selected"' ?>>3+</option>
																				<option value="3" <?php if ($hip_row['right_hip_power'] == '3') echo 'selected="selected"' ?>>3</option>
																				<option value="3-" <?php if ($hip_row['right_hip_power'] == '3-') echo 'selected="selected"' ?>>3-</option>
																				<option value="2+" <?php if ($hip_row['right_hip_power'] == '2+') echo 'selected="selected"' ?>>2+</option>
																				<option value="2" <?php if ($hip_row['right_hip_power'] == '2') echo 'selected="selected"' ?>>2</option>
																				<option value="2-" <?php if ($hip_row['right_hip_power'] == '2-') echo 'selected="selected"' ?>>2-</option>
																				<option value="1" <?php if ($hip_row['right_hip_power'] == '1') echo 'selected="selected"' ?>>1</option>
																				<option value="0" <?php if ($hip_row['right_hip_power'] == '0') echo 'selected="selected"' ?>>0</option>
																			</select></span>
																			<span style="margin-left:20px">
																			<select class="select-control" name="right_hip_tone[]" id="right_hip_tone[]" placeholder="Select" style="width:90px;">
																					<option></option>
																					<option value="Normal"  <?php if ($hip_row['right_hip_tone'] == 'Normal') echo 'selected="selected"' ?>>Normal</option>
																					<option value="Flaccid" <?php if ($hip_row['right_hip_tone'] == 'Flaccid') echo 'selected="selected"' ?>>Flaccid</option>
																					<option value="Spastic" <?php if ($hip_row['right_hip_tone'] == 'Spastic') echo 'selected="selected"' ?>>Spastic</option>
																					<option value="Regid"  <?php if ($hip_row['right_hip_tone'] == 'Regid') echo 'selected="selected"' ?>>Regid</option>
																			</select></span>
																			</div>
																			</td>
																			</tr>
																			<?php
																				}
																			?>
																	</table>
																</div>
                                            </div>
                                        </div>
                                    </div>
									
									
									<div class="card">
                                        <div id="headingThree" class="card-header">
                                            <button type="button" data-toggle="collapse" data-target="#Knee" aria-expanded="false" aria-controls="collapseThree" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0">Knee</h5></button>
                                        </div>
                                        <div data-parent="#accordion" id="Knee" class="collapse">
                                            <div class="card-body"> 
											
											  <div class="table-responsive">
																			  <label></label>
																				<table  class="table table-datatable table-custom" id="advancedDataTable">
																				<tr>
																					<td style="width:30%">
																							<div>
																								<h4  style="color:#3f6ad8; margin-left:125px">Left</h4>
																							</div>
																						</td>
																						<td style="width:40%">
																							<div>
																								<h4  style="color:#3f6ad8; margin-left:140px">Parameters</h4>
																							</div>
																						</td>
																						<td style="width:30%">
																							<div>
																								<h4  style="color:#3f6ad8; margin-left:110px">Right</h4>
																							</div>
																						</td>
																				</tr>
																				<tr>
																					<td style="width:30%">
																						<div>
																							<span class="badge badge-primary" >Tone</span>
																							<span class="badge badge-primary" style="margin-left:60px">Power</span>
																							<span class="badge badge-primary" style="margin-left:30px">ROM</span>
																						</div>
																					</td>
																					<td style="width:40%">
																						<div>
																							<span class="badge badge-primary" >Movement</span>
																							<span class="badge badge-primary" style="margin-left:60px">Muscles</span>
																							<span class="badge badge-primary" style="margin-left:60px">Nerve root</span>
																						</div>
																					</td>
																					<td style="width:30%">
																						<div>
																							<span class="badge badge-primary" >ROM</span>
																							<span class="badge badge-primary" style="margin-left:32px">Power</span>
																							<span class="badge badge-primary" style="margin-left:29px">Tone</span>
																							
																						</div>
																					</td>
																				</tr>
																				<?php
																			$knee_row = '';
																			foreach($knee as $knees){
																				$knee_row = $CI->patient_model->editMexamnKnee($knees['knee_muscle_id'],$mexamn_id);
																				?>
																				<tr>
																					<td style="width:30%">
																						<div>
																							<span >
																								<select class="select-control" name="left_knee_tone[]" id="left_knee_tone[]" placeholder="Select" style="width:90px">
																								<option></option>
																								<option value="Normal" <?php if ($knee_row['left_knee_tone'] == 'Normal') echo 'selected="selected"' ?>>Normal</option>
																								<option value="Flaccid" <?php if ($knee_row['left_knee_tone'] == 'Flaccid') echo 'selected="selected"' ?>>Flaccid</option>
																								<option value="Spastic" <?php if ($knee_row['left_knee_tone'] == 'Spastic') echo 'selected="selected"' ?>>Spastic</option>
																								<option value="Regid" <?php if ($knee_row['left_knee_tone'] == 'Regid') echo 'selected="selected"' ?>>Regid</option>
																							</select></span>
																							<span style="margin-left:15px;">
																								<select class="select-control" name="left_knee_power[]" id="left_knee_power[]" placeholder="--" style="width:65px">
																								<option></option>
																								<option value="5" <?php if ($knee_row['left_knee_power'] == '5') echo 'selected="selected"' ?>>5</option>
																								<option value="5-" <?php if ($knee_row['left_knee_power'] == '5-') echo 'selected="selected"' ?>>5-</option>
																								<option value="4+" <?php if ($knee_row['left_knee_power'] == '4+') echo 'selected="selected"' ?>>4+</option>
																								<option value="4" <?php if ($knee_row['left_knee_power'] == '4') echo 'selected="selected"' ?>>4</option>
																								<option value="4-" <?php if ($knee_row['left_knee_power'] == '4-') echo 'selected="selected"' ?>>4-</option>
																								<option value="3+" <?php if ($knee_row['left_knee_power'] == '3+') echo 'selected="selected"' ?>>3+</option>
																								<option value="3" <?php if ($knee_row['left_knee_power'] == '3') echo 'selected="selected"' ?>>3</option>
																								<option value="3-" <?php if ($knee_row['left_knee_power'] == '3-') echo 'selected="selected"' ?>>3-</option>
																								<option value="2+" <?php if ($knee_row['left_knee_power'] == '2+') echo 'selected="selected"' ?>>2+</option>
																								<option value="2" <?php if ($knee_row['left_knee_power'] == '2') echo 'selected="selected"' ?>>2</option>
																								<option value="2-" <?php if ($knee_row['left_knee_power'] == '2-') echo 'selected="selected"' ?>>2-</option>
																								<option value="1" <?php if ($knee_row['left_knee_power'] == '1') echo 'selected="selected"' ?>>1</option>
																								<option value="0" <?php if ($knee_row['left_knee_power'] == '0') echo 'selected="selected"' ?> >0</option>
																							</select></span>
																							<span >
																								<input type="text"  name="left_knee_rom[]" id="left_knee_rom[]" placeholder="Degree" style="width:50px;margin-left:20px" autocomplete="off" value="<?php echo $knee_row['left_knee_rom']; ?>"/>
																								<input type="hidden" class="span11" name="knee_muscle_id[]" id="knee_muscle_id[]" value="<?php echo $knees['knee_muscle_id']; ?>" autocomplete="off">
																							</span>
																						</div>
																					</td>
																					<td style="width:40%">
																						<div>
																							<span style="width:70px" class="badge badge-info"><?php echo $knees['movement']; ?></span>
																							<span style="width:92px;margin-left:55px" class="badge badge-secondary"><?php echo $knees['muscles']; ?></span>
																							<span style="width:60px;margin-left:38px" class="badge badge-warning"><?php echo $knees['nerve_root']; ?></span>
																						</div>
																					</td>
																					<td style="width:30%">
																						<div>
																							<span >
																								<input type="text"  name="right_knee_rom[]" id="right_knee_rom[]" placeholder="Degree" style="width:50px" autocomplete="off"/>
																							</span>
																							<span style="margin-left:15px;">
																								<select class="select-control" name="right_knee_power[]" id="right_knee_power[]" placeholder="--" style="width:65px;margin-left:15px">
																								<option></option>
																								<option value="5" <?php if ($knee_row['right_knee_power'] == '5') echo 'selected="selected"' ?>>5</option>
																								<option value="5-" <?php if ($knee_row['right_knee_power'] == '5-') echo 'selected="selected"' ?>>5-</option>
																								<option value="4+" <?php if ($knee_row['right_knee_power'] == '4+') echo 'selected="selected"' ?>>4+</option>
																								<option value="4" <?php if ($knee_row['right_knee_power'] == '4') echo 'selected="selected"' ?>>4</option>
																								<option value="4-" <?php if ($knee_row['right_knee_power'] == '4-') echo 'selected="selected"' ?>>4-</option>
																								<option value="3+"  <?php if ($knee_row['right_knee_power'] == '3+') echo 'selected="selected"' ?>>3+</option>
																								<option value="3" <?php if ($knee_row['right_knee_power'] == '3') echo 'selected="selected"' ?>>3</option>
																								<option value="3-" <?php if ($knee_row['right_knee_power'] == '3-') echo 'selected="selected"' ?>>3-</option>
																								<option value="2+" <?php if ($knee_row['right_knee_power'] == '2+') echo 'selected="selected"' ?>>2+</option>
																								<option value="2" <?php if ($knee_row['right_knee_power'] == '2') echo 'selected="selected"' ?>>2</option>
																								<option value="2-" <?php if ($knee_row['right_knee_power'] == '2-') echo 'selected="selected"' ?>>2-</option>
																								<option value="1" <?php if ($knee_row['right_knee_power'] == '1') echo 'selected="selected"' ?>>1</option>
																								<option value="0" <?php if ($knee_row['right_knee_power'] == '0') echo 'selected="selected"' ?>>0</option>
																							</select></span>
																							<span style="margin-left:20px">
																								<select class="select-control" name="right_knee_tone[]" id="right_knee_tone[]" placeholder="Select" style="width:90px;">
																								<option></option>
																								<option value="Normal" <?php if ($knee_row['right_knee_tone'] == 'Normal') echo 'selected="selected"' ?> >Normal</option>
																								<option value="Flaccid" <?php if ($knee_row['right_knee_tone'] == 'Flaccid') echo 'selected="selected"' ?>>Flaccid</option>
																								<option value="Spastic" <?php if ($knee_row['right_knee_tone'] == 'Spastic') echo 'selected="selected"' ?>>Spastic</option>
																								<option value="Regid" <?php if ($knee_row['right_knee_tone'] == 'Regid') echo 'selected="selected"' ?>>Regid</option>
																							</select></span>
																						</div>
																					</td>
																				</tr>
																				<?php
																					}
																	?></tr></table>
																  </div>
                                            </div>
                                        </div>
                                    </div>
									
									
									<div class="card">
                                        <div id="headingThree" class="card-header">
                                            <button type="button" data-toggle="collapse" data-target="#Ankle" aria-expanded="false" aria-controls="collapseThree" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0">Ankle</h5></button>
                                        </div>
                                        <div data-parent="#accordion" id="Ankle" class="collapse">
                                            <div class="card-body"> 
											 <div class="table-responsive">
																  <label></label>
																	<table  class="table table-datatable table-custom" id="advancedDataTable">
																	<tr>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:125px">Left</h4>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:140px">Parameters</h4>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:110px">Right</h4>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >Tone</span>
																				<span class="badge badge-primary" style="margin-left:60px">Power</span>
																				<span class="badge badge-primary" style="margin-left:30px">ROM</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span class="badge badge-primary" >Movement</span>
																				<span class="badge badge-primary" style="margin-left:60px">Muscles</span>
																				<span class="badge badge-primary" style="margin-left:60px">Nerve root</span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >ROM</span>
																				<span class="badge badge-primary" style="margin-left:32px">Power</span>
																				<span class="badge badge-primary" style="margin-left:29px">Tone</span>
																				
																			</div>
																		</td>
																	</tr>
																	<?php
																	$ankle_row = '';
																	foreach($ankle as $ankles){
																	$ankle_row = $CI->patient_model->editMexamnAnkle($ankles['ankle_muscle_id'],$mexamn_id);
																	?>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span >
																					<select class="select-control" name="left_ankle_tone[]" id="left_ankle_tone[]" placeholder="Select" style="width:90px">
																					<option></option>
																					<option value="Normal" <?php if ($ankle_row['left_ankle_tone'] == 'Normal') echo 'selected="selected"' ?>>Normal</option>
																					<option value="Flaccid" <?php if ($ankle_row['left_ankle_tone'] == 'Flaccid') echo 'selected="selected"' ?>>Flaccid</option>
																					<option value="Spastic" <?php if ($ankle_row['left_ankle_tone'] == 'Spastic') echo 'selected="selected"' ?>>Spastic</option>
																					<option value="Regid" <?php if ($ankle_row['left_ankle_tone'] == 'Regid') echo 'selected="selected"' ?>>Regid</option>
																				</select></span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="left_ankle_power[]" id="left_ankle_power[]" placeholder="--" style="width:65px">
																					<option></option>
																					<option value="5" <?php if ($ankle_row['right_headneck_power'] == '5') echo 'selected="selected"' ?>>5</option>
																					<option value="5-" <?php if ($ankle_row['left_ankle_power'] == '5-') echo 'selected="selected"' ?>>5-</option>
																					<option value="4+" <?php if ($ankle_row['left_ankle_power'] == '4+') echo 'selected="selected"' ?>>4+</option>
																					<option value="4" <?php if ($ankle_row['left_ankle_power'] == '4') echo 'selected="selected"' ?>>4</option>
																					<option value="4-" <?php if ($ankle_row['left_ankle_power'] == '4-') echo 'selected="selected"' ?>>4-</option>
																					<option value="3+" <?php if ($ankle_row['left_ankle_power'] == '3+') echo 'selected="selected"' ?>>3+</option>
																					<option value="3" <?php if ($ankle_row['left_ankle_power'] == '3') echo 'selected="selected"' ?>>3</option>
																					<option value="3-" <?php if ($ankle_row['left_ankle_power'] == '3-') echo 'selected="selected"' ?>>3-</option>
																					<option value="2+" <?php if ($ankle_row['left_ankle_power'] == '2+') echo 'selected="selected"' ?>>2+</option>
																					<option value="2" <?php if ($ankle_row['left_ankle_power'] == '2') echo 'selected="selected"' ?>>2</option>
																					<option value="2-" <?php if ($ankle_row['left_ankle_power'] == '2-') echo 'selected="selected"' ?>>2-</option>
																					<option value="1" <?php if ($ankle_row['left_ankle_power'] == '1') echo 'selected="selected"' ?>>1</option>
																					<option value="0" <?php if ($ankle_row['left_ankle_power'] == '0') echo 'selected="selected"' ?>>0</option>
																				</select></span>
																				<span >
																					<input type="text"  name="left_ankle_rom[]" id="left_ankle_rom[]" placeholder="Degree" style="width:50px;margin-left:20px" autocomplete="off" value="<?php echo $ankle_row['left_ankle_rom']; ?>"/>
																					<input type="hidden" class="span11" name="ankle_muscle_id[]" id="ankle_muscle_id[]" value="<?php echo $ankles['ankle_muscle_id']; ?>" autocomplete="off">
																				</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span style="width:70px" class="badge badge-info"><?php echo $ankles['movement']; ?></span>
																				<span style="width:120px;margin-left:25px" class="badge badge-secondary"><?php echo $ankles['muscles']; ?></span>
																				<span style="width:65px;margin-left:38px" class="badge badge-warning"><?php echo $ankles['nerve_root']; ?></span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span >
																					<input type="text"  name="right_ankle_rom[]" id="right_ankle_rom[]" placeholder="Degree" style="width:50px" autocomplete="off"/>
																				</span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="right_ankle_power[]" id="right_ankle_power[]" placeholder="--" style="width:65px;margin-left:15px">
																					<option></option>
																					<option value="5" <?php if ($ankle_row['right_headneck_power'] == '5') echo 'selected="selected"' ?>>5</option>
																					<option value="5-" <?php if ($ankle_row['right_ankle_power'] == '5-') echo 'selected="selected"' ?>>5-</option>
																					<option value="4+"  <?php if ($ankle_row['right_ankle_power'] == '4+') echo 'selected="selected"' ?>>4+</option>
																					<option value="4" <?php if ($ankle_row['right_ankle_power'] == '4') echo 'selected="selected"' ?>>4</option>
																					<option value="4-" <?php if ($ankle_row['right_ankle_power'] == '4-') echo 'selected="selected"' ?>>4-</option>
																					<option value="3+" <?php if ($ankle_row['right_ankle_power'] == '3+') echo 'selected="selected"' ?>>3+</option>
																					<option value="3" <?php if ($ankle_row['right_ankle_power'] == '3') echo 'selected="selected"' ?>>3</option>
																					<option value="3-" <?php if ($ankle_row['right_ankle_power'] == '3-') echo 'selected="selected"' ?>>3-</option>
																					<option value="2+" <?php if ($ankle_row['right_ankle_power'] == '2+') echo 'selected="selected"' ?>>2+</option>
																					<option value="2" <?php if ($ankle_row['right_ankle_power'] == '2') echo 'selected="selected"' ?>>2</option>
																					<option value="2-" <?php if ($ankle_row['right_ankle_power'] == '2-') echo 'selected="selected"' ?>>2-</option>
																					<option value="1" <?php if ($ankle_row['right_ankle_power'] == '1') echo 'selected="selected"' ?>>1</option>
																					<option value="0" <?php if ($ankle_row['right_ankle_power'] == '0') echo 'selected="selected"' ?>>0</option>
																				</select></span>
																				<span style="margin-left:20px">
																					<select class="select-control" name="right_ankle_tone[]" id="right_ankle_tone[]" placeholder="Select" style="width:90px;">
																					<option></option>
																					<option value="Normal" <?php if ($ankle_row['right_ankle_tone'] == 'Normal') echo 'selected="selected"' ?>>Normal</option>
																					<option value="Flaccid" <?php if ($ankle_row['right_ankle_tone'] == 'Flaccid') echo 'selected="selected"' ?>>Flaccid</option>
																					<option value="Spastic" <?php if ($ankle_row['right_ankle_tone'] == 'Spastic') echo 'selected="selected"' ?>>Spastic</option>
																					<option value="Regid" <?php if ($ankle_row['right_ankle_tone'] == 'Regid') echo 'selected="selected"' ?>>Regid</option>
																				</select></span>
																			</div>
																		</td>
																	</tr>
																	<?php
																		}
																	?>
																	</table>
																  </div>
																 
                                            </div>
                                        </div>
                                    </div>
									
									
									<div class="card">
                                        <div id="headingThree" class="card-header">
                                            <button type="button" data-toggle="collapse" data-target="#Toes" aria-expanded="false" aria-controls="collapseThree" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0">Toes</h5></button>
                                        </div>
                                        <div data-parent="#accordion" id="Toes" class="collapse">
                                            <div class="card-body"> 
											
											 <div class="table-responsive">
															  <label></label>
																<table  class="table table-datatable table-custom" id="advancedDataTable">
																<tr>
																	<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:125px">Left</h4>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:140px">Parameters</h4>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:110px">Right</h4>
																			</div>
																		</td>
																</tr>
																<tr>
																	<td style="width:30%">
																		<div>
																			<span class="badge badge-primary" >Tone</span>
																			<span class="badge badge-primary" style="margin-left:60px">Power</span>
																			<span class="badge badge-primary" style="margin-left:30px">ROM</span>
																		</div>
																	</td>
																	<td style="width:40%">
																		<div>
																			<span class="badge badge-primary" >Movement</span>
																			<span class="badge badge-primary" style="margin-left:60px">Muscles</span>
																			<span class="badge badge-primary" style="margin-left:60px">Nerve root</span>
																		</div>
																	</td>
																	<td style="width:30%">
																		<div>
																			<span class="badge badge-primary" >ROM</span>
																			<span class="badge badge-primary" style="margin-left:32px">Power</span>
																			<span class="badge badge-primary" style="margin-left:29px">Tone</span>
																			
																		</div>
																	</td>
																</tr>
																<?php
																$toes_row = '';
																foreach($toes as $toes1){
																$toes_row = $CI->patient_model->editMexamnToes($toes1['toes_muscle_id'],$mexamn_id);
																?>
																<tr>
																	<td style="width:30%">
																		<div>
																			<span >
																				<select class="select-control" name="left_toes_tone[]" id="left_toes_tone[]" placeholder="Select" style="width:90px">
																				<option></option>
																				<option value="Normal" <?php if ($toes_row['left_toes_tone'] == 'Normal') echo 'selected="selected"' ?> >Normal</option>
																				<option value="Flaccid" <?php if ($toes_row['left_toes_tone'] == 'Flaccid') echo 'selected="selected"' ?>>Flaccid</option>
																				<option value="Spastic" <?php if ($toes_row['left_toes_tone'] == 'Spastic') echo 'selected="selected"' ?>>Spastic</option>
																				<option value="Regid" <?php if ($toes_row['left_toes_tone'] == 'Regid') echo 'selected="selected"' ?>>Regid</option>
																			</select></span>
																			<span style="margin-left:15px;">
																				<select class="select-control" name="left_toes_power[]" id="left_toes_power[]" placeholder="--" style="width:65px">
																				<option></option>
																				<option value="5" <?php if ($toes_row['right_headneck_power'] == '5') echo 'selected="selected"' ?>>5</option>
																				<option value="5-" <?php if ($toes_row['left_toes_power'] == '5-') echo 'selected="selected"' ?>>5-</option>
																				<option value="4+" <?php if ($toes_row['left_toes_power'] == '4+') echo 'selected="selected"' ?>>4+</option>
																				<option value="4" <?php if ($toes_row['left_toes_power'] == '4') echo 'selected="selected"' ?>>4</option>
																				<option value="4-" <?php if ($toes_row['left_toes_power'] == '4-') echo 'selected="selected"' ?>>4-</option>
																				<option value="3+" <?php if ($toes_row['left_toes_power'] == '3+') echo 'selected="selected"' ?>>3+</option>
																				<option value="3" <?php if ($toes_row['left_toes_power'] == '3') echo 'selected="selected"' ?>>3</option>
																				<option value="3-" <?php if ($toes_row['left_toes_power'] == '3-') echo 'selected="selected"' ?>>3-</option>
																				<option value="2+" <?php if ($toes_row['left_toes_power'] == '2+') echo 'selected="selected"' ?>>2+</option>
																				<option value="2" <?php if ($toes_row['left_toes_power'] == '2') echo 'selected="selected"' ?>>2</option>
																				<option value="2-" <?php if ($toes_row['left_toes_power'] == '2-') echo 'selected="selected"' ?>>2-</option>
																				<option value="1" <?php if ($toes_row['left_toes_power'] == '1') echo 'selected="selected"' ?>>1</option>
																				<option value="0" <?php if ($toes_row['left_toes_power'] == '0') echo 'selected="selected"' ?>>0</option>
																			</select></span>
																			<span >
																				<input type="text"  name="left_toes_rom[]" id="left_toes_rom[]" placeholder="Degree" style="width:50px;margin-left:20px" autocomplete="off" value="<?php echo $toes_row['left_toes_rom']; ?>"/>
																				<input type="hidden" class="span11" name="toes_muscle_id[]" id="toes_muscle_id[]" value="<?php echo $toes1['toes_muscle_id']; ?>" autocomplete="off">
																			</span>
																		</div>
																	</td>
																	<td style="width:40%">
																		<div>
																			<span style="width:70px" class="badge badge-info"><?php echo $toes1['movement']; ?></span>
																			<span style="width:147px;margin-left:12px" class="badge badge-secondary"><?php echo $toes1['muscles']; ?></span>
																			<span style="width:60px;margin-left:26px" class="badge badge-warning"><?php echo $toes1['nerve_root']; ?></span>
																		</div>
																	</td>
																	<td style="width:30%">
																		<div>
																			<span >
																				<input type="text"  name="right_toes_rom[]" value="<?php echo $toes_row['right_toes_rom']; ?>" id="right_toes_rom[]" placeholder="Degree" style="width:50px" autocomplete="off"/>
																			</span>
																			<span style="margin-left:15px;">
																				<select class="select-control" name="right_toes_power[]" id="right_toes_power[]" placeholder="--" style="width:65px;margin-left:15px">
																				<option></option>
																				<option value="5" <?php if ($toes_row['right_headneck_power'] == '5') echo 'selected="selected"' ?>>5</option>
																				<option value="5-" <?php if ($toes_row['right_toes_power'] == '5-') echo 'selected="selected"' ?>>5-</option>
																				<option value="4+" <?php if ($toes_row['right_toes_power'] == '4+') echo 'selected="selected"' ?>>4+</option>
																				<option value="4" <?php if ($toes_row['right_toes_power'] == '4') echo 'selected="selected"' ?>>4</option>
																				<option value="4-" <?php if ($toes_row['right_toes_power'] == '4-') echo 'selected="selected"' ?>>4-</option>
																				<option value="3+"  <?php if ($toes_row['right_toes_power'] == '3+') echo 'selected="selected"' ?>>3+</option>
																				<option value="3" <?php if ($toes_row['right_toes_power'] == '3') echo 'selected="selected"' ?>>3</option>
																				<option value="3-" <?php if ($toes_row['right_toes_power'] == '3-') echo 'selected="selected"' ?>>3-</option>
																				<option value="2+" <?php if ($toes_row['right_toes_power'] == '2+') echo 'selected="selected"' ?>>2+</option>
																				<option value="2" <?php if ($toes_row['right_toes_power'] == '2') echo 'selected="selected"' ?>>2</option>
																				<option value="2-" <?php if ($toes_row['right_toes_power'] == '2-') echo 'selected="selected"' ?>>2-</option>
																				<option value="1" <?php if ($toes_row['right_toes_power'] == '1') echo 'selected="selected"' ?>>1</option>
																				<option value="0" <?php if ($toes_row['right_toes_power'] == '0') echo 'selected="selected"' ?>>0</option>
																			</select></span>
																			<span style="margin-left:20px">
																				<select class="select-control" name="right_toes_tone[]" id="right_toes_tone[]" placeholder="Select" style="width:90px;">
																				<option></option>
																				<option value="Normal" <?php if ($toes_row['left_headneck_tone'] == 'Normal') echo 'selected="selected"' ?>>Normal</option>
																				<option value="Flaccid" <?php if ($toes_row['left_headneck_tone'] == 'Flaccid') echo 'selected="selected"' ?>>Flaccid</option>
																				<option value="Spastic" <?php if ($toes_row['left_headneck_tone'] == 'Spastic') echo 'selected="selected"' ?>>Spastic</option>
																				<option value="Regid" <?php if ($toes_row['left_headneck_tone'] == 'Regid') echo 'selected="selected"' ?>>Regid</option>
																			</select></span>
																		</div>
																	</td>
																</tr>
																<?php
																	}
																?>
																</table>
															  </div>
																   
                                            </div>
                                        </div>
                                    </div>
									
									
									<div class="card">
                                        <div id="headingThree" class="card-header">
                                            <button type="button" data-toggle="collapse" data-target="#Hallux" aria-expanded="false" aria-controls="collapseThree" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0">Hallux</h5></button>
                                        </div>
                                        <div data-parent="#accordion" id="Hallux" class="collapse">
                                            <div class="card-body"> 
											 <div class="table-responsive">
															  <label></label>
																<table  class="table table-datatable table-custom" id="advancedDataTable">
																<tr>
																	<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:125px">Left</h4>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:140px">Parameters</h4>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:110px">Right</h4>
																			</div>
																		</td>
																</tr>
																<tr>
																	<td style="width:30%">
																		<div>
																			<span class="badge badge-primary" >Tone</span>
																			<span class="badge badge-primary" style="margin-left:60px">Power</span>
																			<span class="badge badge-primary" style="margin-left:30px">ROM</span>
																		</div>
																	</td>
																	<td style="width:40%">
																		<div>
																			<span class="badge badge-primary" >Movement</span>
																			<span class="badge badge-primary" style="margin-left:60px">Muscles</span>
																			<span class="badge badge-primary" style="margin-left:60px">Nerve root</span>
																		</div>
																	</td>
																	<td style="width:30%">
																		<div>
																			<span class="badge badge-primary" >ROM</span>
																			<span class="badge badge-primary" style="margin-left:32px">Power</span>
																			<span class="badge badge-primary" style="margin-left:29px">Tone</span>
																			
																		</div>
																	</td>
																</tr>
																<?php
																	foreach($hallux as $halluxs){
																	$hallux_row = $CI->patient_model->editMexamnHallux($halluxs['hallux_muscle_id'],$mexamn_id);
																?>
																<tr>
																	<td style="width:30%">
																		<div>
																			<span >
																				<select class="select-control" name="left_hallux_tone[]" id="left_hallux_tone[]" placeholder="Select" style="width:90px">
																				<option></option>
																				<option value="Normal" <?php if ($hallux_row['left_hallux_tone'] == 'Normal') echo 'selected="selected"' ?>>Normal</option>
																				<option value="Flaccid" <?php if ($hallux_row['left_hallux_tone'] == 'Flaccid') echo 'selected="selected"' ?>>Flaccid</option>
																				<option value="Spastic" <?php if ($hallux_row['left_hallux_tone'] == 'Spastic') echo 'selected="selected"' ?>>Spastic</option>
																				<option value="Regid" <?php if ($hallux_row['left_hallux_tone'] == 'Regid') echo 'selected="selected"' ?>>Regid</option>
																			</select></span>
																			<span style="margin-left:15px;">
																				<select class="select-control" name="left_hallux_power[]" id="left_hallux_power[]" placeholder="--" style="width:65px">
																				<option></option>
																				<option value="5" <?php if ($hallux_row['right_headneck_power'] == '5') echo 'selected="selected"' ?> >5</option>
																				<option value="5-" <?php if ($hallux_row['left_hallux_power'] == '5-') echo 'selected="selected"' ?>>5-</option>
																				<option value="4+" <?php if ($hallux_row['left_hallux_power'] == '4+') echo 'selected="selected"' ?>>4+</option>
																				<option value="4" <?php if ($hallux_row['left_hallux_power'] == '4') echo 'selected="selected"' ?>>4</option>
																				<option value="4-" <?php if ($hallux_row['left_hallux_power'] == '4-') echo 'selected="selected"' ?>>4-</option>
																				<option value="3+" <?php if ($hallux_row['left_hallux_power'] == '3+') echo 'selected="selected"' ?>>3+</option>
																				<option value="3" <?php if ($hallux_row['left_hallux_power'] == '3') echo 'selected="selected"' ?>>3</option>
																				<option value="3-" <?php if ($hallux_row['left_hallux_power'] == '3-') echo 'selected="selected"' ?>>3-</option>
																				<option value="2+" <?php if ($hallux_row['left_hallux_power'] == '2+') echo 'selected="selected"' ?>>2+</option>
																				<option value="2" <?php if ($hallux_row['left_hallux_power'] == '2') echo 'selected="selected"' ?>>2</option>
																				<option value="2-" <?php if ($hallux_row['left_hallux_power'] == '2-') echo 'selected="selected"' ?>>2-</option>
																				<option value="1" <?php if ($hallux_row['left_hallux_power'] == '1') echo 'selected="selected"' ?>>1</option>
																				<option value="0" <?php if ($hallux_row['left_hallux_power'] == '0') echo 'selected="selected"' ?>>0</option>
																			</select></span>
																			<span >
																				<input type="text"  name="left_hallux_rom[]" id="left_hallux_rom[]" placeholder="Degree" style="width:50px;margin-left:20px" autocomplete="off" value="<?php echo $hallux_row['left_hallux_rom']; ?>" />
																				<input type="hidden" class="span11" name="hallux_muscle_id[]" id="hallux_muscle_id[]"  value="<?php echo $halluxs['hallux_muscle_id']; ?>" autocomplete="off">
																			</span>
																		</div>
																	</td>
																	<td style="width:40%">
																		<div>
																			<span style="width:70px" class="badge badge-info"><?php echo $halluxs['movement']; ?></span>
																			<span style="width:78px;margin-left:55px" class="badge badge-secondary"><?php echo $halluxs['muscles']; ?></span>
																			<span style="width:60px;margin-left:53px" class="badge badge-warning"><?php echo $halluxs['nerve_root']; ?></span>
																		</div>
																	</td>
																	<td style="width:30%">
																		<div>
																			<span >
																				<input type="text"  name="right_hallux_rom[]" id="right_hallux_rom[]" placeholder="Degree" style="width:50px" autocomplete="off"/>
																			</span>
																			<span style="margin-left:15px;">
																				<select class="select-control" name="right_hallux_power[]" value="<?php echo $hallux_row['right_hallux_rom']; ?>" id="right_hallux_power[]" placeholder="--" style="width:65px;margin-left:15px">
																				<option></option>
																				 <option value="5-" <?php if ($hallux_row['right_hallux_power'] == '5-') echo 'selected="selected"' ?>>5-</option>
																				<option value="4+" <?php if ($hallux_row['right_hallux_power'] == '4+') echo 'selected="selected"' ?>>4+</option>
																				<option value="4" <?php if ($hallux_row['right_hallux_power'] == '4') echo 'selected="selected"' ?>>4</option>
																				<option value="4-" <?php if ($hallux_row['right_hallux_power'] == '4-') echo 'selected="selected"' ?>>4-</option>
																				<option value="3+" <?php if ($hallux_row['right_hallux_power'] == '3+') echo 'selected="selected"' ?>>3+</option>
																				<option value="3" <?php if ($hallux_row['right_hallux_power'] == '3') echo 'selected="selected"' ?>>3</option>
																				<option value="3-" <?php if ($hallux_row['right_hallux_power'] == '3-') echo 'selected="selected"' ?>>3-</option>
																				<option value="2+" <?php if ($hallux_row['right_hallux_power'] == '2+') echo 'selected="selected"' ?>>2+</option>
																				<option value="2" <?php if ($hallux_row['right_hallux_power'] == '2') echo 'selected="selected"' ?>>2</option>
																				<option value="2-" <?php if ($hallux_row['right_hallux_power'] == '2-') echo 'selected="selected"' ?>>2-</option>
																				<option value="1" <?php if ($hallux_row['right_hallux_power'] == '1') echo 'selected="selected"' ?>>1</option>
																				<option value="0" <?php if ($hallux_row['right_hallux_power'] == '0') echo 'selected="selected"' ?>>0</option>
																			</select></span>
																			<span style="margin-left:20px">
																				<select class="select-control" name="right_hallux_tone[]" id="right_hallux_tone[]" placeholder="Select" style="width:90px;">
																				<option></option>
																				<option value="Normal" <?php if ($hallux_row['right_hallux_tone'] == 'Normal') echo 'selected="selected"' ?>>Normal</option>
																				<option value="Flaccid" <?php if ($hallux_row['right_hallux_tone'] == 'Flaccid') echo 'selected="selected"' ?>>Flaccid</option>
																				<option value="Spastic" <?php if ($hallux_row['right_hallux_tone'] == 'Spastic') echo 'selected="selected"' ?>>Spastic</option>
																				<option value="Regid" <?php if ($hallux_row['right_hallux_tone'] == 'Regid') echo 'selected="selected"' ?>>Regid</option>
																			</select></span>
																		</div>
																	</td>
																</tr>
																<?php
																	}
																?>
																</table>
															  </div>
                                            </div>
                                        </div>
                                    </div>
									
									
									<div class="card">
                                        <div id="headingThree" class="card-header">
                                            <button type="button" data-toggle="collapse" data-target="#Scapula" aria-expanded="false" aria-controls="collapseThree" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0">Scapula</h5></button>
                                        </div>
                                        <div data-parent="#accordion" id="Scapula" class="collapse">
                                            <div class="card-body"> 
											 		<div class="table-responsive">
																  <label></label>
																	<table  class="table table-datatable table-custom" id="advancedDataTable">
																	<tr>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:125px">Left</h4>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:140px">Parameters</h4>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:110px">Right</h4>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >Tone</span>
																				<span class="badge badge-primary" style="margin-left:60px">Power</span>
																				<span class="badge badge-primary" style="margin-left:30px">ROM</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span class="badge badge-primary" >Movement</span>
																				<span class="badge badge-primary" style="margin-left:60px">Muscles</span>
																				<span class="badge badge-primary" style="margin-left:60px">Nerve root</span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >ROM</span>
																				<span class="badge badge-primary" style="margin-left:32px">Power</span>
																				<span class="badge badge-primary" style="margin-left:29px">Tone</span>
																				
																			</div>
																		</td>
																	</tr>
																	<?php
																	$scapula_row = '';
																	foreach($scapula as $scapulas){
																	$scapula_row = $CI->patient_model->editMexamnScapula($scapulas['scapula_muscle_id'],$mexamn_id);
													?>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span >
																					<select class="select-control" name="left_scapula_tone[]" id="left_scapula_tone[]" placeholder="Select" style="width:90px">
																					<option></option>
																					<option value="Normal" <?php if ($scapula_row['left_scapula_tone'] == 'Normal') echo 'selected="selected"' ?>>Normal</option>
																					<option value="Flaccid" <?php if ($scapula_row['left_scapula_tone'] == 'Flaccid') echo 'selected="selected"' ?>>Flaccid</option>
																					<option value="Spastic" <?php if ($scapula_row['left_scapula_tone'] == 'Spastic') echo 'selected="selected"' ?>>Spastic</option>
																					<option value="Regid" <?php if ($scapula_row['left_scapula_tone'] == 'Regid') echo 'selected="selected"' ?>>Regid</option>
																				</select></span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="left_scapula_power[]" id="left_scapula_power[]" placeholder="--" style="width:65px">
																					<option></option>
																					<option value="5" <?php if ($scapula_row['left_scapula_power'] == '5') echo 'selected="selected"' ?>>5</option>
																					<option value="5-" <?php if ($scapula_row['left_scapula_power'] == '5-') echo 'selected="selected"' ?>>5-</option>
																					<option value="4+"  <?php if ($scapula_row['left_scapula_power'] == '4+') echo 'selected="selected"' ?>>4+</option>
																					<option value="4" <?php if ($scapula_row['left_scapula_power'] == '4') echo 'selected="selected"' ?>>4</option>
																					<option value="4-" <?php if ($scapula_row['left_scapula_power'] == '4-') echo 'selected="selected"' ?>>4-</option>
																					<option value="3+"  <?php if ($scapula_row['left_scapula_power'] == '3+') echo 'selected="selected"' ?>>3+</option>
																					<option value="3"  <?php if ($scapula_row['left_scapula_power'] == '3') echo 'selected="selected"' ?>>3</option>
																					<option value="3-" <?php if ($scapula_row['left_scapula_power'] == '3-') echo 'selected="selected"' ?>>3-</option>
																					<option value="2+" <?php if ($scapula_row['left_scapula_power'] == '2+') echo 'selected="selected"' ?>>2+</option>
																					<option value="2" <?php if ($scapula_row['left_scapula_power'] == '2') echo 'selected="selected"' ?>>2</option>
																					<option value="2-" <?php if ($scapula_row['left_scapula_power'] == '2-') echo 'selected="selected"' ?>>2-</option>
																					<option value="1" <?php if ($scapula_row['left_scapula_power'] == '1') echo 'selected="selected"' ?>>1</option>
																					<option value="0" <?php if ($scapula_row['left_scapula_power'] == '0') echo 'selected="selected"' ?>>0</option>
																				</select></span>
																				<span >
																					<input type="text"  name="left_scapula_rom[]" id="left_scapula_rom[]" placeholder="Degree" value="<?php echo $scapula_row['left_scapula_rom']; ?>" style="width:50px;margin-left:20px" autocomplete="off"/>
																					<input type="hidden" class="span11" name="scapula_muscle_id[]" id="scapula_muscle_id[]"  value="<?php echo $scapulas['scapula_muscle_id']; ?>" autocomplete="off">
																				</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span style="width:70px" class="badge badge-info"><?php echo $scapulas['movement']; ?></span>
																				<span style="width:78px;margin-left:55px" class="badge badge-secondary"><?php echo $scapulas['muscles']; ?></span>
																				<span style="width:45px;margin-left:53px" class="badge badge-warning"><?php echo $scapulas['nerve_root']; ?></span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span >
																					<input type="text"  name="right_scapula_rom[]" value="<?php echo $scapula_row['right_scapula_rom']; ?>" id="right_scapula_rom[]" placeholder="Degree" style="width:50px" autocomplete="off"/>
																				</span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="right_scapula_power[]" id="right_scapula_power[]" placeholder="--" style="width:65px;margin-left:15px">
																					<option></option>
																					<option value="5" <?php if ($scapula_row['right_scapula_power'] == '5') echo 'selected="selected"' ?>>5</option>
																					<option value="5-" <?php if ($scapula_row['right_scapula_power'] == '5-') echo 'selected="selected"' ?>>5-</option>
																					<option value="4+" <?php if ($scapula_row['right_scapula_power'] == '4+') echo 'selected="selected"' ?>>4+</option>
																					<option value="4" <?php if ($scapula_row['right_scapula_power'] == '4') echo 'selected="selected"' ?>>4</option>
																					<option value="4-" <?php if ($scapula_row['right_scapula_power'] == '4-') echo 'selected="selected"' ?>>4-</option>
																					<option value="3+" <?php if ($scapula_row['right_scapula_power'] == '3+') echo 'selected="selected"' ?>>3+</option>
																					<option value="3" <?php if ($scapula_row['right_scapula_power'] == '3') echo 'selected="selected"' ?>>3</option>
																					<option value="3-" <?php if ($scapula_row['right_scapula_power'] == '3-') echo 'selected="selected"' ?>>3-</option>
																					<option value="2+" <?php if ($scapula_row['right_scapula_power'] == '2+') echo 'selected="selected"' ?>>2+</option>
																					<option value="2" <?php if ($scapula_row['right_scapula_power'] == '2') echo 'selected="selected"' ?>>2</option>
																					<option value="2-" <?php if ($scapula_row['right_scapula_power'] == '2-') echo 'selected="selected"' ?>>2-</option>
																					<option value="1"  <?php if ($scapula_row['right_scapula_power'] == '1') echo 'selected="selected"' ?>>1</option>
																					<option value="0" <?php if ($scapula_row['right_scapula_power'] == '0') echo 'selected="selected"' ?>>0</option>
																				</select></span>
																				<span style="margin-left:20px">
																					<select class="select-control" name="right_scapula_tone[]" id="right_scapula_tone[]" placeholder="Select" style="width:90px;">
																					<option></option>
																					<option value="Normal" <?php if ($scapula_row['right_scapula_tone'] == 'Normal') echo 'selected="selected"' ?>>Normal</option>
																					<option value="Flaccid" <?php if ($scapula_row['right_scapula_tone'] == 'Flaccid') echo 'selected="selected"' ?>>Flaccid</option>
																					<option value="Spastic" <?php if ($scapula_row['right_scapula_tone'] == 'Spastic') echo 'selected="selected"' ?>>Spastic</option>
																					<option value="Regid" <?php if ($scapula_row['right_scapula_tone'] == 'Regid') echo 'selected="selected"' ?>>Regid</option>
																				</select></span>
																			</div>
																		</td>
																	</tr>
																	<?php
																		}
																	?>
																	</table>
																  </div>
                                            </div>
                                        </div>
                                    </div>
									
									<div class="card">
                                        <div id="headingThree" class="card-header">
                                            <button type="button" data-toggle="collapse" data-target="#shoulder" aria-expanded="false" aria-controls="collapseThree" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0">Shoulder</h5></button>
                                        </div>
                                        <div data-parent="#accordion" id="shoulder" class="collapse">
                                            <div class="card-body"> 
											<div class="table-responsive">
																  <label></label>
																	<table  class="table table-datatable table-custom" id="advancedDataTable">
																	<tr>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:125px">Left</h4>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:140px">Parameters</h4>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:110px">Right</h4>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >Tone</span>
																				<span class="badge badge-primary" style="margin-left:60px">Power</span>
																				<span class="badge badge-primary" style="margin-left:30px">ROM</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span class="badge badge-primary" >Movement</span>
																				<span class="badge badge-primary" style="margin-left:60px">Muscles</span>
																				<span class="badge badge-primary" style="margin-left:60px">Nerve root</span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >ROM</span>
																				<span class="badge badge-primary" style="margin-left:32px">Power</span>
																				<span class="badge badge-primary" style="margin-left:29px">Tone</span>
																				
																			</div>
																		</td>
																	</tr>
																	<?php
																$shoulder_row = '';
																foreach($shoulder as $shoulders){
																$shoulder_row = $CI->patient_model->editMexamnShoulder($shoulders['shoulder_muscle_id'],$mexamn_id);
													?>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span >
																					<select class="select-control" name="left_shoulder_tone[]" id="left_shoulder_tone[]" placeholder="Select" style="width:90px">
																					<option></option>
																					<option value="Normal" <?php if ($shoulder_row['left_shoulder_tone'] == 'Normal') echo 'selected="selected"' ?>>Normal</option>
																					<option value="Flaccid" <?php if ($shoulder_row['left_shoulder_tone'] == 'Flaccid') echo 'selected="selected"' ?>>Flaccid</option>
																					<option value="Spastic" <?php if ($shoulder_row['left_shoulder_tone'] == 'Spastic') echo 'selected="selected"' ?>>Spastic</option>
																					<option value="Regid" <?php if ($shoulder_row['left_shoulder_tone'] == 'Regid') echo 'selected="selected"' ?>>Regid</option>
																				</select></span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="left_shoulder_power[]" id="left_shoulder_power[]" placeholder="--" style="width:65px">
																					<option></option>
																					<option value="5" <?php if ($shoulder_row['left_shoulder_power'] == '5') echo 'selected="selected"' ?>>5</option>
																					<option value="5-" <?php if ($shoulder_row['left_shoulder_power'] == '5-') echo 'selected="selected"' ?>>5-</option>
																					<option value="4+" <?php if ($shoulder_row['left_shoulder_power'] == '4+') echo 'selected="selected"' ?>>4+</option>
																					<option value="4" <?php if ($shoulder_row['left_shoulder_power'] == '4') echo 'selected="selected"' ?>>4</option>
																					<option value="4-" <?php if ($shoulder_row['left_shoulder_power'] == '4-') echo 'selected="selected"' ?>>4-</option>
																					<option value="3+" <?php if ($shoulder_row['left_shoulder_power'] == '3+') echo 'selected="selected"' ?>>3+</option>
																					<option value="3" <?php if ($shoulder_row['left_shoulder_power'] == '3') echo 'selected="selected"' ?>>3</option>
																					<option value="3-" <?php if ($shoulder_row['left_shoulder_power'] == '3-') echo 'selected="selected"' ?>>3-</option>
																					<option value="2+" <?php if ($shoulder_row['left_shoulder_power'] == '2+') echo 'selected="selected"' ?>>2+</option>
																					<option value="2" <?php if ($shoulder_row['left_shoulder_power'] == '2') echo 'selected="selected"' ?>>2</option>
																					<option value="2-" <?php if ($shoulder_row['left_shoulder_power'] == '2-') echo 'selected="selected"' ?>>2-</option>
																					<option value="1" <?php if ($shoulder_row['left_shoulder_power'] == '1') echo 'selected="selected"' ?>>1</option>
																					<option value="0" <?php if ($shoulder_row['left_shoulder_power'] == '0') echo 'selected="selected"' ?>>0</option>
																				</select></span>
																				<span >
																					<input type="text"  value="<?php echo $shoulder_row['left_shoulder_rom']; ?>" name="left_shoulder_rom[]" id="left_shoulder_rom[]" placeholder="Degree" style="width:50px;margin-left:20px" autocomplete="off"/>
																					<input type="hidden" class="span11" name="shoulder_muscle_id[]" id="shoulder_muscle_id[]" value="<?php echo $shoulders['shoulder_muscle_id']; ?>" autocomplete="off">
																				</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span style="width:100px" class="badge badge-info"><?php echo $shoulders['movement']; ?></span>
																				<span style="width:110px;margin-left:30px" class="badge badge-secondary"><?php echo $shoulders['muscles']; ?></span>
																				<span style="width:60px;margin-left:23px" class="badge badge-warning"><?php echo $shoulders['nerve_root']; ?></span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span >
																					<input type="text"   value="<?php echo $shoulder_row['right_shoulder_rom']; ?>" name="right_shoulder_rom[]" id="right_shoulder_rom[]" placeholder="Degree" style="width:50px" autocomplete="off"/>
																				</span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="right_shoulder_power[]" id="right_shoulder_power[]" placeholder="--" style="width:65px;margin-left:15px">
																					<option></option>
																					<option value="5" <?php if ($shoulder_row['right_shoulder_power'] == '5') echo 'selected="selected"' ?>>5</option>
																					<option value="5-" <?php if ($shoulder_row['right_shoulder_power'] == '5-') echo 'selected="selected"' ?>>5-</option>
																					<option value="4+" <?php if ($shoulder_row['right_shoulder_power'] == '4+') echo 'selected="selected"' ?>>4+</option>
																					<option value="4" <?php if ($shoulder_row['right_shoulder_power'] == '4') echo 'selected="selected"' ?>>4</option>
																					<option value="4-" <?php if ($shoulder_row['right_shoulder_power'] == '4-') echo 'selected="selected"' ?>>4-</option>
																					<option value="3+" <?php if ($shoulder_row['right_shoulder_power'] == '3+') echo 'selected="selected"' ?>>3+</option>
																					<option value="3" <?php if ($shoulder_row['right_shoulder_power'] == '3') echo 'selected="selected"' ?>>3</option>
																					<option value="3-" <?php if ($shoulder_row['right_shoulder_power'] == '3-') echo 'selected="selected"' ?>>3-</option>
																					<option value="2+" <?php if ($shoulder_row['right_shoulder_power'] == '2+') echo 'selected="selected"' ?>>2+</option>
																					<option value="2" <?php if ($shoulder_row['right_shoulder_power'] == '2') echo 'selected="selected"' ?>>2</option>
																					<option value="2-" <?php if ($shoulder_row['right_shoulder_power'] == '2-') echo 'selected="selected"' ?>>2-</option>
																					<option value="1" <?php if ($shoulder_row['right_shoulder_power'] == '1') echo 'selected="selected"' ?>>1</option>
																					<option value="0" <?php if ($shoulder_row['right_shoulder_power'] == '0') echo 'selected="selected"' ?>>0</option>
																				</select></span>
																				<span style="margin-left:20px">
																					<select class="select-control" name="right_shoulder_tone[]" id="right_shoulder_tone[]" placeholder="Select" style="width:90px;">
																					<option></option>
																					<option value="Normal" <?php if ($shoulder_row['right_shoulder_tone'] == 'Normal') echo 'selected="selected"' ?> >Normal</option>
																					<option value="Flaccid" <?php if ($shoulder_row['right_shoulder_tone'] == 'Flaccid') echo 'selected="selected"' ?>>Flaccid</option>
																					<option value="Spastic" <?php if ($shoulder_row['right_shoulder_tone'] == 'Spastic') echo 'selected="selected"' ?>>Spastic</option>
																					<option value="Regid" <?php if ($shoulder_row['right_shoulder_tone'] == 'Regid') echo 'selected="selected"' ?>>Regid</option>
																				</select></span>
																			</div>
																		</td>
																	</tr>
																	<?php
																		}
																	?>
																	</table>
																  </div>
																 
                                            </div>
                                        </div>
                                    </div>
									
									
									<div class="card">
                                        <div id="headingThree" class="card-header">
                                            <button type="button" data-toggle="collapse" data-target="#elbow" aria-expanded="false" aria-controls="collapseThree" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0">Elbow</h5></button>
                                        </div>
                                        <div data-parent="#accordion" id="elbow" class="collapse">
                                            <div class="card-body"> 
                                              <div class="table-responsive">
																  <label></label>
																	<table  class="table table-datatable table-custom" id="advancedDataTable">
																	<tr>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:125px">Left</h4>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:140px">Parameters</h4>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:110px">Right</h4>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >Tone</span>
																				<span class="badge badge-primary" style="margin-left:60px">Power</span>
																				<span class="badge badge-primary" style="margin-left:30px">ROM</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span class="badge badge-primary" >Movement</span>
																				<span class="badge badge-primary" style="margin-left:60px">Muscles</span>
																				<span class="badge badge-primary" style="margin-left:60px">Nerve root</span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >ROM</span>
																				<span class="badge badge-primary" style="margin-left:32px">Power</span>
																				<span class="badge badge-primary" style="margin-left:29px">Tone</span>
																				
																			</div>
																		</td>
																	</tr>
																	<?php
																$elbow_row = '';
																foreach($elbow as $elbows){
																	$elbow_row = $CI->patient_model->editMexamnElbow($elbows['elbow_muscle_id'],$mexamn_id);
													?>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span >
																					<select class="select-control" name="left_elbow_tone[]" id="left_elbow_tone[]" placeholder="Select" style="width:90px">
																					<option></option>
																					<option value="Normal" <?php if ($elbow_row['left_elbow_tone'] == 'Normal') echo 'selected="selected"' ?>>Normal</option>
																					<option value="Flaccid"  <?php if ($elbow_row['left_elbow_tone'] == 'Flaccid') echo 'selected="selected"' ?>>Flaccid</option>
																					<option value="Spastic" <?php if ($elbow_row['left_elbow_tone'] == 'Spastic') echo 'selected="selected"' ?>>Spastic</option>
																					<option value="Regid" <?php if ($elbow_row['left_elbow_tone'] == 'Regid') echo 'selected="selected"' ?>>Regid</option>
																				</select></span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="left_elbow_power[]" id="left_elbow_power[]" placeholder="--" style="width:65px">
																					<option></option>
																					<option value="5" <?php if ($elbow_row['left_elbow_power'] == '5') echo 'selected="selected"' ?>>5</option>
																					<option value="5-" <?php if ($elbow_row['left_elbow_power'] == '5-') echo 'selected="selected"' ?>>5-</option>
																					<option value="4+" <?php if ($elbow_row['left_elbow_power'] == '4+') echo 'selected="selected"' ?>>4+</option>
																					<option value="4" <?php if ($elbow_row['left_elbow_power'] == '4') echo 'selected="selected"' ?>>4</option>
																					<option value="4-" <?php if ($elbow_row['left_elbow_power'] == '4-') echo 'selected="selected"' ?>>4-</option>
																					<option value="3+" <?php if ($elbow_row['left_elbow_power'] == '3+') echo 'selected="selected"' ?>>3+</option>
																					<option value="3" <?php if ($elbow_row['left_elbow_power'] == '3') echo 'selected="selected"' ?>>3</option>
																					<option value="3-" <?php if ($elbow_row['left_elbow_power'] == '3-') echo 'selected="selected"' ?>>3-</option>
																					<option value="2+"  <?php if ($elbow_row['left_elbow_power'] == '2+') echo 'selected="selected"' ?>>2+</option>
																					<option value="2" <?php if ($elbow_row['left_elbow_power'] == '2') echo 'selected="selected"' ?>>2</option>
																					<option value="2-" <?php if ($elbow_row['left_elbow_power'] == '2-') echo 'selected="selected"' ?>>2-</option>
																					<option value="1" <?php if ($elbow_row['left_elbow_power'] == '1') echo 'selected="selected"' ?>>1</option>
																					<option value="0" <?php if ($elbow_row['left_elbow_power'] == '0') echo 'selected="selected"' ?>>0</option>
																				</select></span>
																				<span >
																					<input type="text"  name="left_elbow_rom[]" id="left_elbow_rom[]" value="<?php echo $elbow_row['left_elbow_rom']; ?>" placeholder="Degree" style="width:50px;margin-left:20px" autocomplete="off"/>
																					<input type="hidden" class="span11" name="elbow_muscle_id[]" id="elbow_muscle_id[]" value="<?php echo $elbows['elbow_muscle_id']; ?>" autocomplete="off">
																				</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span style="width:70px" class="badge badge-info"><?php echo $elbows['movement']; ?></span>
																				<span style="width:78px;margin-left:55px" class="badge badge-secondary"><?php echo $elbows['muscles']; ?></span>
																				<span style="width:60px;margin-left:58px" class="badge badge-warning"><?php echo $elbows['nerve_root']; ?></span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span >
																					<input type="text"  name="right_elbow_rom[]" value="<?php echo $elbow_row['right_elbow_rom']; ?>" id="right_elbow_rom[]" placeholder="Degree" style="width:50px" autocomplete="off"/>
																				</span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="right_elbow_power[]" id="right_elbow_power[]" placeholder="--" style="width:65px;margin-left:15px">
																					<option></option>
																					<option value="5" <?php if ($elbow_row['right_elbow_power'] == '5') echo 'selected="selected"' ?>>5</option>
																					<option value="5-" <?php if ($elbow_row['right_elbow_power'] == '5-') echo 'selected="selected"' ?>>5-</option>
																					<option value="4+" <?php if ($elbow_row['right_elbow_power'] == '4+') echo 'selected="selected"' ?>>4+</option>
																					<option value="4" <?php if ($elbow_row['right_elbow_power'] == '4') echo 'selected="selected"' ?>>4</option>
																					<option value="4-" <?php if ($elbow_row['right_elbow_power'] == '4-') echo 'selected="selected"' ?>>4-</option>
																					<option value="3+" <?php if ($elbow_row['right_elbow_power'] == '3+') echo 'selected="selected"' ?>>3+</option>
																					<option value="3" <?php if ($elbow_row['right_elbow_power'] == '3') echo 'selected="selected"' ?>>3</option>
																					<option value="3-" <?php if ($elbow_row['right_elbow_power'] == '3-') echo 'selected="selected"' ?>>3-</option>
																					<option value="2+" <?php if ($elbow_row['right_elbow_power'] == '2+') echo 'selected="selected"' ?>>2+</option>
																					<option value="2" <?php if ($elbow_row['right_elbow_power'] == '2') echo 'selected="selected"' ?>>2</option>
																					<option value="2-" <?php if ($elbow_row['right_elbow_power'] == '2-') echo 'selected="selected"' ?>>2-</option>
																					<option value="1" <?php if ($elbow_row['right_elbow_power'] == '1') echo 'selected="selected"' ?>>1</option>
																					<option value="0" <?php if ($elbow_row['right_elbow_power'] == '0') echo 'selected="selected"' ?> >0</option>
																				</select></span>
																				<span style="margin-left:20px">
																					<select class="select-control" name="right_elbow_tone[]" id="right_elbow_tone[]" placeholder="Select" style="width:90px;">
																					<option></option>
																					<option value="Normal" <?php if ($elbow_row['right_elbow_tone'] == 'Normal') echo 'selected="selected"' ?>>Normal</option>
																					<option value="Flaccid" <?php if ($elbow_row['right_elbow_tone'] == 'Flaccid') echo 'selected="selected"' ?>>Flaccid</option>
																					<option value="Spastic" <?php if ($elbow_row['right_elbow_tone'] == 'Spastic') echo 'selected="selected"' ?>>Spastic</option>
																					<option value="Regid" <?php if ($elbow_row['right_elbow_tone'] == 'Regid') echo 'selected="selected"' ?>>Regid</option>
																				</select></span>
																			</div>
																		</td>
																	</tr>
																	<?php
																		}
																	?>
																	</table>
																  </div>
                                            </div>
                                        </div>
                                    </div>
									
									<div class="card">
                                        <div id="headingThree" class="card-header">
                                            <button type="button" data-toggle="collapse" data-target="#fore" aria-expanded="false" aria-controls="collapseThree" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0">Fore Arm</h5></button>
                                        </div>
                                        <div data-parent="#accordion" id="fore" class="collapse">
                                            <div class="card-body"> 
											 <div class="table-responsive">
																  <label></label>
																	<table  class="table table-datatable table-custom" id="advancedDataTable">
																	<tr>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:125px">Left</h4>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:140px">Parameters</h4>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:110px">Right</h4>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >Tone</span>
																				<span class="badge badge-primary" style="margin-left:60px">Power</span>
																				<span class="badge badge-primary" style="margin-left:30px">ROM</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span class="badge badge-primary" >Movement</span>
																				<span class="badge badge-primary" style="margin-left:60px">Muscles</span>
																				<span class="badge badge-primary" style="margin-left:60px">Nerve root</span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >ROM</span>
																				<span class="badge badge-primary" style="margin-left:32px">Power</span>
																				<span class="badge badge-primary" style="margin-left:29px">Tone</span>
																				
																			</div>
																		</td>
																	</tr>
																	<?php
																$forearm_row = '';
																foreach($forearm as $forearms){
																	$forearm_row = $CI->patient_model->editMexamnForearm($forearms['forearm_muscle_id'],$mexamn_id);
															?>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span >
																					<select class="select-control" name="left_forearm_tone[]" id="left_forearm_tone[]" placeholder="Select" style="width:90px">
																					<option></option>
																					<option value="Normal" <?php if ($forearm_row['left_forearm_tone'] == 'Normal') echo 'selected="selected"' ?> >Normal</option>
																					<option value="Flaccid" <?php if ($forearm_row['left_forearm_tone'] == 'Flaccid') echo 'selected="selected"' ?>>Flaccid</option>
																					<option value="Spastic" <?php if ($forearm_row['left_forearm_tone'] == 'Spastic') echo 'selected="selected"' ?>>Spastic</option>
																					<option value="Regid" <?php if ($forearm_row['left_forearm_tone'] == 'Regid') echo 'selected="selected"' ?>>Regid</option>
																				</select></span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="left_forearm_power[]" id="left_forearm_power[]" placeholder="--" style="width:65px">
																					<option></option>
																					<option value="5" <?php if ($elbow_row['left_forearm_power'] == '5') echo 'selected="selected"' ?>>5</option>
																					<option value="5-" <?php if ($forearm_row['left_forearm_power'] == '5-') echo 'selected="selected"' ?>>5-</option>
																					<option value="4+" <?php if ($forearm_row['left_forearm_power'] == '4+') echo 'selected="selected"' ?>>4+</option>
																					<option value="4" <?php if ($forearm_row['left_forearm_power'] == '4') echo 'selected="selected"' ?>>4</option>
																					<option value="4-" <?php if ($forearm_row['left_forearm_power'] == '4-') echo 'selected="selected"' ?>>4-</option>
																					<option value="3+" <?php if ($forearm_row['left_forearm_power'] == '3+') echo 'selected="selected"' ?>>3+</option>
																					<option value="3" <?php if ($forearm_row['left_forearm_power'] == '3') echo 'selected="selected"' ?>>3</option>
																					<option value="3-" <?php if ($forearm_row['left_forearm_power'] == '3-') echo 'selected="selected"' ?>>3-</option>
																					<option value="2+" <?php if ($forearm_row['left_forearm_power'] == '2+') echo 'selected="selected"' ?>>2+</option>
																					<option value="2" <?php if ($forearm_row['left_forearm_power'] == '2') echo 'selected="selected"' ?>>2</option>
																					<option value="2-" <?php if ($forearm_row['left_forearm_power'] == '2-') echo 'selected="selected"' ?>>2-</option>
																					<option value="1" <?php if ($forearm_row['left_forearm_power'] == '1') echo 'selected="selected"' ?>>1</option>
																					<option value="0" <?php if ($forearm_row['left_forearm_power'] == '0') echo 'selected="selected"' ?>>0</option>
																				</select></span>
																				<span >
																					<input type="text"  name="left_forearm_rom[]" value="<?php echo $forearm_row['left_forearm_rom']; ?>" id="left_forearm_rom[]" placeholder="Degree" style="width:50px;margin-left:20px" autocomplete="off"/>
																					<input type="hidden" class="span11" name="forearm_muscle_id[]" id="forearm_muscle_id[]" value="<?php echo $forearms['forearm_muscle_id']; ?>" autocomplete="off">
																				</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span style="width:70px" class="badge badge-info"><?php echo $forearms['movement']; ?></span>
																				<span style="width:78px;margin-left:55px" class="badge badge-secondary"><?php echo $forearms['muscles']; ?></span>
																				<span style="width:60px;margin-left:58px" class="badge badge-warning"><?php echo $forearms['nerve_root']; ?></span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span >
																					<input type="text"  name="right_forearm_rom[]" value="<?php echo $forearm_row['right_forearm_rom']; ?>" id="right_forearm_rom[]" placeholder="Degree" style="width:50px" autocomplete="off"/>
																				</span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="right_forearm_power[]" id="right_forearm_power[]" placeholder="--" style="width:65px;margin-left:15px">
																					<option></option>
																					<option value="5" <?php if ($elbow_row['right_forearm_power'] == '5') echo 'selected="selected"' ?>>5</option>
																					<option value="5-" <?php if ($forearm_row['right_forearm_power'] == '5-') echo 'selected="selected"' ?>>5-</option>
																					<option value="4+" <?php if ($forearm_row['right_forearm_power'] == '4+') echo 'selected="selected"' ?>>4+</option>
																					<option value="4" <?php if ($forearm_row['right_forearm_power'] == '4') echo 'selected="selected"' ?>>4</option>
																					<option value="4-" <?php if ($forearm_row['right_forearm_power'] == '4-') echo 'selected="selected"' ?>>4-</option>
																					<option value="3+" <?php if ($forearm_row['right_forearm_power'] == '3+') echo 'selected="selected"' ?>>3+</option>
																					<option value="3" <?php if ($forearm_row['right_forearm_power'] == '3') echo 'selected="selected"' ?>>3</option>
																					<option value="3-" <?php if ($forearm_row['right_forearm_power'] == '3-') echo 'selected="selected"' ?>>3-</option>
																					<option value="2+" <?php if ($forearm_row['right_forearm_power'] == '2+') echo 'selected="selected"' ?>>2+</option>
																					<option value="2" <?php if ($forearm_row['right_forearm_power'] == '2') echo 'selected="selected"' ?>>2</option>
																					<option value="2-" <?php if ($forearm_row['right_forearm_power'] == '2-') echo 'selected="selected"' ?>>2-</option>
																					<option value="1" <?php if ($forearm_row['right_forearm_power'] == '1') echo 'selected="selected"' ?>>1</option>
																					<option value="0" <?php if ($forearm_row['right_forearm_power'] == '0') echo 'selected="selected"' ?>>0</option>
																				</select></span>
																				<span style="margin-left:20px">
																					<select class="select-control" name="right_forearm_tone[]" id="right_forearm_tone[]" placeholder="Select" style="width:90px;">
																					<option></option>
																					<option value="Normal" <?php if ($forearm_row['right_forearm_tone'] == 'Normal') echo 'selected="selected"' ?> >Normal</option>
																					<option value="Flaccid" <?php if ($forearm_row['right_forearm_tone'] == 'Flaccid') echo 'selected="selected"' ?>>Flaccid</option>
																					<option value="Spastic" <?php if ($forearm_row['right_forearm_tone'] == 'Spastic') echo 'selected="selected"' ?>>Spastic</option>
																					<option value="Regid" <?php if ($forearm_row['right_forearm_tone'] == 'Regid') echo 'selected="selected"' ?>>Regid</option>
																				</select></span>
																			</div>
																		</td>
																	</tr>
																	<?php
																		}
																	?>
																	</table>
																  </div>		  
																   
                                            </div>
                                        </div>
                                    </div>
									
									
									<div class="card">
                                        <div id="headingThree" class="card-header">
                                            <button type="button" data-toggle="collapse" data-target="#wrist" aria-expanded="false" aria-controls="collapseThree" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0">Wrist</h5></button>
                                        </div>
                                        <div data-parent="#accordion" id="wrist" class="collapse">
                                            <div class="card-body"> 
											
											 	<div class="table-responsive">
																  <label></label>
																	<table  class="table table-datatable table-custom" id="advancedDataTable">
																	<tr>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:125px">Left</h4>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:140px">Parameters</h4>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:110px">Right</h4>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >Tone</span>
																				<span class="badge badge-primary" style="margin-left:60px">Power</span>
																				<span class="badge badge-primary" style="margin-left:30px">ROM</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span class="badge badge-primary" >Movement</span>
																				<span class="badge badge-primary" style="margin-left:60px">Muscles</span>
																				<span class="badge badge-primary" style="margin-left:60px">Nerve root</span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >ROM</span>
																				<span class="badge badge-primary" style="margin-left:32px">Power</span>
																				<span class="badge badge-primary" style="margin-left:29px">Tone</span>
																				
																			</div>
																		</td>
																	</tr>
																	<?php
															$wrist_row = '';
															foreach($wrist as $wrists){
																$wrist_row = $CI->patient_model->editMexamnWrist($wrists['wrist_muscle_id'],$mexamn_id);
													?>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span >
																					<select class="select-control" name="left_wrist_tone[]" id="left_wrist_tone[]" placeholder="Select" style="width:90px">
																					<option></option>
																					<option value="Normal" <?php if ($wrist_row['left_wrist_tone'] == 'Normal') echo 'selected="selected"' ?>>Normal</option>
																					<option value="Flaccid" <?php if ($wrist_row['left_wrist_tone'] == 'Flaccid') echo 'selected="selected"' ?>>Flaccid</option>
																					<option value="Spastic" <?php if ($wrist_row['left_wrist_tone'] == 'Spastic') echo 'selected="selected"' ?>>Spastic</option>
																					<option value="Regid" <?php if ($wrist_row['left_wrist_tone'] == 'Regid') echo 'selected="selected"' ?>>Regid</option>
																				</select></span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="left_wrist_power[]" id="left_wrist_power[]" placeholder="--" style="width:65px">
																					<option></option>
																					<option value="5" <?php if ($wrist_row['left_wrist_power'] == '5') echo 'selected="selected"' ?>>5</option>
																					<option value="5-" <?php if ($wrist_row['left_wrist_power'] == '5-') echo 'selected="selected"' ?>>5-</option>
																					<option value="4+"  <?php if ($wrist_row['left_wrist_power'] == '4+') echo 'selected="selected"' ?>>4+</option>
																					<option value="4" <?php if ($wrist_row['left_wrist_power'] == '4') echo 'selected="selected"' ?>>4</option>
																					<option value="4-"  <?php if ($wrist_row['left_wrist_power'] == '4-') echo 'selected="selected"' ?>>4-</option>
																					<option value="3+" <?php if ($wrist_row['left_wrist_power'] == '3+') echo 'selected="selected"' ?>>3+</option>
																					<option value="3" <?php if ($wrist_row['left_wrist_power'] == '3') echo 'selected="selected"' ?>>3</option>
																					<option value="3-" <?php if ($wrist_row['left_wrist_power'] == '3-') echo 'selected="selected"' ?>>3-</option>
																					<option value="2+" <?php if ($wrist_row['left_wrist_power'] == '2+') echo 'selected="selected"' ?>>2+</option>
																					<option value="2" <?php if ($wrist_row['left_wrist_power'] == '2') echo 'selected="selected"' ?>>2</option>
																					<option value="2-" <?php if ($wrist_row['left_wrist_power'] == '2-') echo 'selected="selected"' ?>>2-</option>
																					<option value="1" <?php if ($wrist_row['left_wrist_power'] == '1') echo 'selected="selected"' ?>>1</option>
																					<option value="0" <?php if ($wrist_row['left_wrist_power'] == '0') echo 'selected="selected"' ?>>0</option>
																				</select></span>
																				<span >
																					<input type="text"  name="left_wrist_rom[]" value="<?php echo $wrist_row['left_wrist_rom']; ?>" id="left_wrist_rom[]" placeholder="Degree" style="width:50px;margin-left:20px" autocomplete="off"/>
																					<input type="hidden" class="span11" name="wrist_muscle_id[]" id="wrist_muscle_id[]" value="<?php echo $wrists['wrist_muscle_id']; ?>" autocomplete="off">
																				</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span style="width:70px" class="badge badge-info"><?php echo $wrists['movement']; ?></span>
																				<span style="width:117px;margin-left:55px" class="badge badge-secondary"><?php echo $wrists['muscles']; ?></span>
																				<span style="width:60px;margin-left:21px" class="badge badge-warning"><?php echo $wrists['nerve_root']; ?></span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span >
																					<input type="text"  name="right_wrist_rom[]" id="right_wrist_rom[]" placeholder="Degree" style="width:50px" autocomplete="off"/>
																				</span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="right_wrist_power[]" id="right_wrist_power[]" placeholder="--" style="width:65px;margin-left:15px">
																					<option></option>
																					<option value="5" <?php if ($wrist_row['right_wrist_power'] == '5') echo 'selected="selected"' ?>>5</option>
																					<option value="5-" <?php if ($wrist_row['right_wrist_power'] == '5-') echo 'selected="selected"' ?>>5-</option>
																					<option value="4+"  <?php if ($wrist_row['right_wrist_power'] == '4+') echo 'selected="selected"' ?>>4+</option>
																					<option value="4" <?php if ($wrist_row['right_wrist_power'] == '4') echo 'selected="selected"' ?>>4</option>
																					<option value="4-" <?php if ($wrist_row['right_wrist_power'] == '4-') echo 'selected="selected"' ?>>4-</option>
																					<option value="3+" <?php if ($wrist_row['right_wrist_power'] == '3+') echo 'selected="selected"' ?>>3+</option>
																					<option value="3" <?php if ($wrist_row['right_wrist_power'] == '3') echo 'selected="selected"' ?>>>3</option>
																					<option value="3-" <?php if ($wrist_row['right_wrist_power'] == '3-') echo 'selected="selected"' ?>>3-</option>
																					<option value="2+"  <?php if ($wrist_row['right_wrist_power'] == '2+') echo 'selected="selected"' ?>>2+</option>
																					<option value="2" <?php if ($wrist_row['right_wrist_power'] == '2') echo 'selected="selected"' ?>>2</option>
																					<option value="2-" <?php if ($wrist_row['right_wrist_power'] == '2-') echo 'selected="selected"' ?>>2-</option>
																					<option value="1" <?php if ($wrist_row['right_wrist_power'] == '1') echo 'selected="selected"' ?>>1</option>
																					<option value="0" <?php if ($wrist_row['right_wrist_power'] == '0') echo 'selected="selected"' ?>>0</option>
																				</select></span>
																				<span style="margin-left:20px">
																					<select class="select-control" name="right_wrist_tone[]" id="right_wrist_tone[]" placeholder="Select" style="width:90px;">
																					<option></option>
																					<option value="Normal" <?php if ($wrist_row['right_wrist_tone'] == 'Normal') echo 'selected="selected"' ?>>Normal</option>
																					<option value="Flaccid" <?php if ($wrist_row['right_wrist_tone'] == 'Flaccid') echo 'selected="selected"' ?>>Flaccid</option>
																					<option value="Spastic" <?php if ($wrist_row['right_wrist_tone'] == 'Spastic') echo 'selected="selected"' ?>>Spastic</option>
																					<option value="Regid" <?php if ($wrist_row['right_wrist_tone'] == 'Regid') echo 'selected="selected"' ?>>Regid</option>
																				</select></span>
																			</div>
																		</td>
																	</tr>
																	<?php
																		}
																	?>
																	</table>
																  </div>
                                            </div>
                                        </div>
                                    </div>
									
									
									<div class="card">
                                        <div id="headingThree" class="card-header">
                                            <button type="button" data-toggle="collapse" data-target="#finger" aria-expanded="false" aria-controls="collapseThree" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0">Fingers</h5></button>
                                        </div>
                                        <div data-parent="#accordion" id="finger" class="collapse">
                                            <div class="card-body"> 
											 	<div class="table-responsive">
																  <label></label>
																	<table  class="table table-datatable table-custom" id="advancedDataTable">
																	<tr>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:125px">Left</h4>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:140px">Parameters</h4>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:110px">Right</h4>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >Tone</span>
																				<span class="badge badge-primary" style="margin-left:60px">Power</span>
																				<span class="badge badge-primary" style="margin-left:30px">ROM</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span class="badge badge-primary" >Movement</span>
																				<span class="badge badge-primary" style="margin-left:60px">Muscles</span>
																				<span class="badge badge-primary" style="margin-left:60px">Nerve root</span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >ROM</span>
																				<span class="badge badge-primary" style="margin-left:32px">Power</span>
																				<span class="badge badge-primary" style="margin-left:29px">Tone</span>
																				
																			</div>
																		</td>
																	</tr>
																	<?php
														$fingers_row = '';
														foreach($fingers as $fingers1){
															$fingers_row = $CI->patient_model->editMexamnFingers($fingers1['fingers_muscle_id'],$mexamn_id);
													?>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span >
																					<select class="select-control" name="left_fingers_tone[]" id="left_fingers_tone[]" placeholder="Select" style="width:90px">
																					<option></option>
																					<option value="Normal" <?php if ($fingers_row['left_forearm_tone'] == 'Normal') echo 'selected="selected"' ?>>Normal</option>
																					<option value="Flaccid" <?php if ($fingers_row['left_forearm_tone'] == 'Flaccid') echo 'selected="selected"' ?>>Flaccid</option>
																					<option value="Spastic" <?php if ($fingers_row['left_forearm_tone'] == 'Spastic') echo 'selected="selected"' ?>>Spastic</option>
																					<option value="Regid" <?php if ($fingers_row['left_forearm_tone'] == 'Regid') echo 'selected="selected"' ?>>Regid</option>
																				</select></span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="left_fingers_power[]" id="left_fingers_power[]" placeholder="--" style="width:65px">
																					<option></option>
																					<option value="5" <?php if ($fingers_row['left_fingers_power'] == '5') echo 'selected="selected"' ?>>5</option>
																					<option value="5-" <?php if ($fingers_row['left_fingers_power'] == '5-') echo 'selected="selected"' ?>>5-</option>
																					<option value="4+" <?php if ($fingers_row['left_fingers_power'] == '4+') echo 'selected="selected"' ?>>4+</option>
																					<option value="4" <?php if ($fingers_row['left_fingers_power'] == '4') echo 'selected="selected"' ?>>4</option>
																					<option value="4-" <?php if ($fingers_row['left_fingers_power'] == '4-') echo 'selected="selected"' ?>>4-</option>
																					<option value="3+" <?php if ($fingers_row['left_fingers_power'] == '3+') echo 'selected="selected"' ?>>3+</option>
																					<option value="3" <?php if ($fingers_row['left_fingers_power'] == '3') echo 'selected="selected"' ?>>3</option>
																					<option value="3-" <?php if ($fingers_row['left_fingers_power'] == '3-') echo 'selected="selected"' ?>>3-</option>
																					<option value="2+" <?php if ($fingers_row['left_fingers_power'] == '2+') echo 'selected="selected"' ?>>2+</option>
																					<option value="2" <?php if ($fingers_row['left_fingers_power'] == '2') echo 'selected="selected"' ?>>2</option>
																					<option value="2-" <?php if ($fingers_row['left_fingers_power'] == '2-') echo 'selected="selected"' ?>>2-</option>
																					<option value="1" <?php if ($fingers_row['left_fingers_power'] == '1') echo 'selected="selected"' ?>>1</option>
																					<option value="0" <?php if ($fingers_row['left_fingers_power'] == '0') echo 'selected="selected"' ?> >0</option>
																				</select></span>
																				<span >
																					<input type="text" name="left_fingers_rom[]" value="<?php echo $fingers_row['left_fingers_rom']; ?>"  id="left_fingers_rom[]" placeholder="Degree" style="width:50px;margin-left:20px" autocomplete="off"/>
																					<input type="hidden" class="span11" name="fingers_muscle_id[]" id="fingers_muscle_id[]" value="<?php echo $fingers1['fingers_muscle_id']; ?>" autocomplete="off">
																				</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span style="width:70px" class="badge badge-info"><?php echo $fingers1['movement']; ?></span>
																				<span style="width:78px;margin-left:55px" class="badge badge-secondary"><?php echo $fingers1['muscles']; ?></span>
																				<span style="width:60px;margin-left:51px" class="badge badge-warning"><?php echo $fingers1['nerve_root']; ?></span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span >
																					<input type="text" name="right_fingers_rom[]" value="<?php echo $fingers_row['right_fingers_rom']; ?>" id="right_fingers_rom[]" placeholder="Degree" style="width:50px" autocomplete="off"/>
																				</span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="right_fingers_power[]" id="right_fingers_power[]" placeholder="--" style="width:65px;margin-left:15px">
																					<option></option>
																					<option value="5" <?php if ($fingers_row['right_fingers_power'] == '5') echo 'selected="selected"' ?>>5</option>
																					<option value="5-" <?php if ($fingers_row['right_fingers_power'] == '5-') echo 'selected="selected"' ?>>5-</option>
																					<option value="4+" <?php if ($fingers_row['right_fingers_power'] == '4+') echo 'selected="selected"' ?>>4+</option>
																					<option value="4" <?php if ($fingers_row['right_fingers_power'] == '4') echo 'selected="selected"' ?>>4</option>
																					<option value="4-" <?php if ($fingers_row['right_fingers_power'] == '4-') echo 'selected="selected"' ?>>4-</option>
																					<option value="3+" <?php if ($fingers_row['right_fingers_power'] == '3+') echo 'selected="selected"' ?>>3+</option>
																					<option value="3"  <?php if ($fingers_row['right_fingers_power'] == '3') echo 'selected="selected"' ?>>3</option>
																					<option value="3-" <?php if ($fingers_row['right_fingers_power'] == '3-') echo 'selected="selected"' ?>>3-</option>
																					<option value="2+"  <?php if ($fingers_row['right_fingers_power'] == '2+') echo 'selected="selected"' ?>>2+</option>
																					<option value="2" <?php if ($fingers_row['right_fingers_power'] == '2') echo 'selected="selected"' ?>>2</option>
																					<option value="2-"  <?php if ($fingers_row['right_fingers_power'] == '2-') echo 'selected="selected"' ?>>2-</option>
																					<option value="1" <?php if ($fingers_row['right_fingers_power'] == '1') echo 'selected="selected"' ?>>1</option>
																					<option value="0" <?php if ($fingers_row['right_fingers_power'] == '0') echo 'selected="selected"' ?> >0</option>
																				</select></span>
																				<span style="margin-left:20px">
																					<select class="select-control" name="right_fingers_tone[]" id="right_fingers_tone[]" placeholder="Select" style="width:90px;">
																					<option></option>
																					<option value="Normal" <?php if ($fingers_row['right_fingers_tone'] == 'Normal') echo 'selected="selected"' ?> >Normal</option>
																					<option value="Flaccid" <?php if ($fingers_row['right_fingers_tone'] == 'Flaccid') echo 'selected="selected"' ?>>Flaccid</option>
																					<option value="Spastic" <?php if ($fingers_row['right_fingers_tone'] == 'Spastic') echo 'selected="selected"' ?>>Spastic</option>
																					<option value="Regid" <?php if ($fingers_row['right_fingers_tone'] == 'Regid') echo 'selected="selected"' ?>>Regid</option>
																				</select></span>
																			</div>
																		</td>
																	</tr>
																	<?php
																		}
																	?>
																	</table>
																  </div>
                                            </div>
                                        </div>
                                    </div>
									
									
									<div class="card">
                                        <div id="headingThree" class="card-header">
                                            <button type="button" data-toggle="collapse" data-target="#thumb" aria-expanded="false" aria-controls="collapseThree" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0">Thumb</h5></button>
                                        </div>
                                        <div data-parent="#accordion" id="thumb" class="collapse">
                                            <div class="card-body"> 
											 <div class="table-responsive">
																  <label></label>
																	<table  class="table table-datatable table-custom" id="advancedDataTable">
																	<tr>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:125px">Left</h4>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:140px">Parameters</h4>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:110px">Right</h4>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >Tone</span>
																				<span class="badge badge-primary" style="margin-left:60px">Power</span>
																				<span class="badge badge-primary" style="margin-left:30px">ROM</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span class="badge badge-primary" >Movement</span>
																				<span class="badge badge-primary" style="margin-left:60px">Muscles</span>
																				<span class="badge badge-primary" style="margin-left:60px">Nerve root</span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >ROM</span>
																				<span class="badge badge-primary" style="margin-left:32px">Power</span>
																				<span class="badge badge-primary" style="margin-left:29px">Tone</span>
																				
																			</div>
																		</td>
																	</tr>
																	<?php
																$thumb_row = '';
																foreach($thumb as $thumbs){
																$thumb_row = $CI->patient_model->editMexamnThumb($thumbs['thumb_muscle_id'],$mexamn_id);
															?>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span >
																					<select class="select-control" name="left_thumb_tone[]" id="left_thumb_tone[]" placeholder="Select" style="width:90px">
																					<option></option>
																					<option value="Normal"  <?php if ($thumb_row['left_thumb_tone'] == 'Normal') echo 'selected="selected"' ?> >Normal</option>
																					<option value="Flaccid" <?php if ($thumb_row['left_thumb_tone'] == 'Flaccid') echo 'selected="selected"' ?>>Flaccid</option>
																					<option value="Spastic" <?php if ($thumb_row['left_thumb_tone'] == 'Spastic') echo 'selected="selected"' ?>>Spastic</option>
																					<option value="Regid" <?php if ($thumb_row['left_thumb_tone'] == 'Regid') echo 'selected="selected"' ?>>Regid</option>
																				</select></span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="left_thumb_power[]" id="left_thumb_power[]" placeholder="--" style="width:65px">
																					<option></option>
																					<option value="5" <?php if ($thumb_row['left_thumb_power'] == '5') echo 'selected="selected"' ?> >5</option>
																					<option value="5-" <?php if ($thumb_row['left_thumb_power'] == '5-') echo 'selected="selected"' ?>>5-</option>
																					<option value="4+" <?php if ($thumb_row['left_thumb_power'] == '4+') echo 'selected="selected"' ?>>4+</option>
																					<option value="4" <?php if ($thumb_row['left_thumb_power'] == '4') echo 'selected="selected"' ?>>4</option>
																					<option value="4-" <?php if ($thumb_row['left_thumb_power'] == '4-') echo 'selected="selected"' ?>>4-</option>
																					<option value="3+" <?php if ($thumb_row['left_thumb_power'] == '3+') echo 'selected="selected"' ?>>3+</option>
																					<option value="3" <?php if ($thumb_row['left_thumb_power'] == '3') echo 'selected="selected"' ?>>3</option>
																					<option value="3-" <?php if ($thumb_row['left_thumb_power'] == '3-') echo 'selected="selected"' ?>>3-</option>
																					<option value="2+" <?php if ($thumb_row['left_thumb_power'] == '2+') echo 'selected="selected"' ?>>2+</option>
																					<option value="2" <?php if ($thumb_row['left_thumb_power'] == '2') echo 'selected="selected"' ?>>2</option>
																					<option value="2-" <?php if ($thumb_row['left_thumb_power'] == '2-') echo 'selected="selected"' ?>>2-</option>
																					<option value="1" <?php if ($thumb_row['left_thumb_power'] == '1') echo 'selected="selected"' ?>>1</option>
																					<option value="0" <?php if ($thumb_row['left_thumb_power'] == '0') echo 'selected="selected"' ?>>0</option>
																				</select></span>
																				<span >
																					<input type="text"  value="<?php echo $thumb_row['left_thumb_rom']; ?>" name="left_thumb_rom[]" id="left_thumb_rom[]" placeholder="Degree" style="width:50px;margin-left:20px" autocomplete="off"/>
																					<input type="hidden" class="span11" name="thumb_muscle_id[]" id="thumb_muscle_id[]" value="<?php echo $thumbs['thumb_muscle_id']; ?>" autocomplete="off">
																				</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span style="width:70px" class="badge badge-info"><?php echo $thumbs['movement']; ?></span>
																				<span style="width:78px;margin-left:55px" class="badge badge-secondary"><?php echo $thumbs['muscles']; ?></span>
																				<span style="width:60px;margin-left:55px" class="badge badge-warning"><?php echo $thumbs['nerve_root']; ?></span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span >
																					<input type="text" value="<?php echo $thumb_row['right_thumb_rom']; ?>"  name="right_thumb_rom[]" id="right_thumb_rom[]" placeholder="Degree" style="width:50px" autocomplete="off"/>
																				</span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="right_thumb_power[]" id="right_thumb_power[]" placeholder="--" style="width:65px;margin-left:15px">
																					<option></option>
																					<option value="5" <?php if ($thumb_row['right_thumb_power'] == '5') echo 'selected="selected"' ?>>5</option>
																					<option value="5-" <?php if ($thumb_row['right_thumb_power'] == '5-') echo 'selected="selected"' ?>>5-</option>
																					<option value="4+" <?php if ($thumb_row['right_thumb_power'] == '4+') echo 'selected="selected"' ?>>4+</option>
																					<option value="4" <?php if ($thumb_row['right_thumb_power'] == '4') echo 'selected="selected"' ?>>4</option>
																					<option value="4-" <?php if ($thumb_row['right_thumb_power'] == '4-') echo 'selected="selected"' ?>>4-</option>
																					<option value="3+" <?php if ($thumb_row['right_thumb_power'] == '3+') echo 'selected="selected"' ?>>3+</option>
																					<option value="3" <?php if ($thumb_row['right_thumb_power'] == '3') echo 'selected="selected"' ?>>3</option>
																					<option value="3-" <?php if ($thumb_row['right_thumb_power'] == '3-') echo 'selected="selected"' ?>>3-</option>
																					<option value="2+" <?php if ($thumb_row['right_thumb_power'] == '2+') echo 'selected="selected"' ?>>2+</option>
																					<option value="2" <?php if ($thumb_row['right_thumb_power'] == '2') echo 'selected="selected"' ?>>2</option>
																					<option value="2-" <?php if ($thumb_row['right_thumb_power'] == '2-') echo 'selected="selected"' ?>>2-</option>
																					<option value="1" <?php if ($thumb_row['right_thumb_power'] == '1') echo 'selected="selected"' ?>>1</option>
																					<option value="0" <?php if ($thumb_row['right_thumb_power'] == '0') echo 'selected="selected"' ?>>0</option>
																				</select></span>
																				<span style="margin-left:20px">
																					<select class="select-control" name="right_thumb_tone[]" id="right_thumb_tone[]" placeholder="Select" style="width:90px;">
																					<option></option>
																					<option value="Normal" <?php if ($thumb_row['right_thumb_tone'] == 'Normal') echo 'selected="selected"' ?>>Normal</option>
																					<option value="Flaccid" <?php if ($thumb_row['right_thumb_tone'] == 'Flaccid') echo 'selected="selected"' ?>>Flaccid</option>
																					<option value="Spastic" <?php if ($thumb_row['right_thumb_tone'] == 'Spastic') echo 'selected="selected"' ?>>Spastic</option>
																					<option value="Regid" <?php if ($thumb_row['right_thumb_tone'] == 'Regid') echo 'selected="selected"' ?>>Regid</option>
																				</select></span>
																			</div>
																		</td>
																	</tr>
																	<?php
																		}
																	?>
																	</table>
																  </div>
																  
                                            </div>
                                        </div>
                                    </div>
									
									<div class="card">
                                        <div id="headingThree" class="card-header">
                                            <button type="button" data-toggle="collapse" data-target="#respi" aria-expanded="false" aria-controls="collapseThree" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0">Respiration</h5></button>
                                        </div>
                                        <div data-parent="#accordion" id="respi" class="collapse">
                                            <div class="card-body"> 
											  <div class="table-responsive">
																  <label></label>
																	<table  class="table table-datatable table-custom" id="advancedDataTable">
																	<tr>
																		<td style="width:50%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:150px">ROM</h4>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<h4 style="color:#3f6ad8; margin-left:140px">Parameters</h4>
																			</div>
																		</td>
																		<td style="width:10%">
																			
																		</td>
																	</tr>
																	<tr>
																		<td style="width:50%">
																			<div>
																				<span class="badge badge-primary" style="margin-left:90px">Apex</span>
																				<span class="badge badge-primary" style="margin-left:57px">Base</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span class="badge badge-primary" >Movement</span>
																				<span class="badge badge-primary" style="margin-left:60px">Muscles</span>
																				<span class="badge badge-primary" style="margin-left:60px">Nerve root</span>
																			</div>
																		</td>
																		<td style="width:10%">
																			
																		</td>
																	</tr>
																	<?php
														$respiration_row = '';
														foreach($respiration as $respirations){
															$respiration_row = $CI->patient_model->editMexamnRespiration($respirations['respiration_muscle_id'],$mexamn_id);
													?>
																	<tr>
																		<td style="width:50%">
																			<div class="row">
																				<span >
																					<input type="text" class="form-control" value="<?php echo $respiration_row['respiration_apex']; ?>" name="respiration_apex[]" id="respiration_apex[]" placeholder="CM" style="width:50px;margin-left:100px" autocomplete="off"/>
																				</span>
																				<span >
																					<input type="text" class="form-control" value="<?php echo $respiration_row['respiration_base']; ?>" name="respiration_base[]" id="respiration_base[]" placeholder="CM" style="width:50px;margin-left:65px" autocomplete="off"/>
																					<input type="hidden" class="form-control" class="span11" name="respiration_muscle_id[]" id="respiration_muscle_id[]" value="<?php echo $respirations['respiration_muscle_id']; ?>" autocomplete="off">
																				</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span style="width:103px" class="badge badge-info"><?php echo $respirations['movement']; ?></span>
																				<span style="width:90px;margin-left:22px" class="badge badge-secondary"><?php echo $respirations['muscles']; ?></span>
																				<span style="width:60px;margin-left:38px" class="badge badge-warning"><?php echo $respirations['nerve_root']; ?></span>
																			</div>
																		</td>
																		<td style="width:10%">
																			
																		</td>
																	</tr>
																	<?php
																		}
																	?>
																	</table>
																  </div>
                                            </div>
                                        </div>
                                    </div>
									
									<div class="card">
                                        <div id="headingThree" class="card-header">
                                            <button type="button" data-toggle="collapse" data-target="#measure" aria-expanded="false" aria-controls="collapseThree" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0">Measure</h5></button>
                                        </div>
                                        <div data-parent="#accordion" id="measure" class="collapse">
                                            <div class="card-body"> 
											 <div class="table-responsive">
																	<table  class="table table-datatable table-custom" id="advancedDataTable">
																		<tr>
																		<td class="text-center" ><span class="badge badge-primary">Asis to Med.Mal.</span></td>
																		<td class="text-center" ><span class="badge badge-primary">Umb to Med.Mal</span></td>
																		<td class="text-center" ><span class="badge badge-primary">Mid.Thigh Circum.</span></td>
																		<td class="text-center" ><span class="badge badge-primary">Mid.Calf Circum.</span></td>
																		</tr>
																		<tr>
																		<td class="text-center" ><input class="form-control" type="text" name="ant_spine_to_inmal" id="ant_spine_to_inmal" placeholder="CM"/>
																		</td>
																		<td class="text-center" ><input type="text" class="form-control" name="app_leg_shoet" id="app_leg_shoet" placeholder="CM"/>
																		</td>
																		<td class="text-center" ><input type="text" class="form-control" name="mid_thigh_circum" id="mid_thigh_circum" placeholder="5 CM Above Pat" />
																		</td>
																		<td class="text-center" ><input type="text" name="mid_calf_circum" id="mid_calf_circum" placeholder="5 CM Below Pat"/>
																		</td>
																		</tr>
																	</table>
																  </div>
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
