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
                                <div class="card-body"><h5 class="card-title"> Nuero Examination
								</h5>
                                    <form class="" action="<?php echo base_url().'client/patient/add_nuero' ?>" method="post"  role="form" parsley-validate id="signupForm">
                                         <input type="hidden" name="nuero_id" value="<?php echo $nuero_id ?>"  />
						                 <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $patient_id ?>"  />
														<div class="row">
															<div class="col-md-12">
															 <div class="input-group">
															<div class="position-relative form-group"><label for="bill_no" class="">Date</label>
																<input type="text" class="form-control datepicker" Placeholder="Date" name="examn_date" id="examn_date" autocomplete="off" data-toggle="datepicker">
															</div>	
															</div>	
															</div>
														</div> 
														<?php
							$CI =& get_instance();
							$CI->load->model('patient_model');
							$glasgow = $this->patient_model->getAllGlasgow($nuero_id);
							$verbal = $this->patient_model->getAllVerbal($nuero_id);
							$gaid = $this->patient_model->getAllGait($nuero_id);
							$functional = $this->patient_model->getAllFunctional($nuero_id);
							$dynamic=$this->patient_model->editNuerodynamic($patient_id,$nuero_id);
							$tissue=$this->patient_model->editNuerotissue($patient_id,$nuero_id);
							$adl=$this->patient_model->editNueroadl($patient_id,$nuero_id);
							$spl=$this->patient_model->editNuerospl($patient_id,$nuero_id);
					?>
														
														<div id="accordion" class="accordion-wrapper mb-3">
															<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#Glasgow" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Glasgow Coma Scale-info</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="Glasgow" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																 <div class="row">
														  <div class="col-md-6">
															Eye Opening :</div>
															<div class="col-md-6">
																<select class="select-control" name="eyeopen" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="eyeopen">
																	<?php 
															if($glasgow[0]['eyeopening'] != 0){
																echo '<option value="'.$glasgow[0]['eyeopening'].'" selected>'.$glasgow[0]['eyeopening'].'</option>'; 
															}else{
																echo '<option><option>';
															}
														?>
																	<option value="4">4</option>
																	<option value="3">3</option>
																	<option value="2">2</option>
																	<option value="1">1</option>
																</select></div>
														  </div></br></br><div class="row">
														  <div class="col-md-6">Verbal response :</div>
																 <div class="col-md-6"><select class="select-control" name="verbal" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="verbal">
																	<?php 
													if($glasgow[0]['verbalresponse'] != 0){
														echo '<option value="'.$glasgow[0]['verbalresponse'].'" selected>'.$glasgow[0]['verbalresponse'].'</option>'; 
													}else{
														echo '<option><option>';
													}
												?>
																	<option value="5">5</option>
																	<option value="4">4</option>
																	<option value="3">3</option>
																	<option value="2">2</option>
																	<option value="1">1</option>
																</select></div></div></br></br>
																<div class="row">
																<div class="col-md-6">Motor response :</div>
																 <div class="col-md-6"><select class="select-control" name="motor" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="motor">
																	<?php 
															if($glasgow[0]['motorresponse']!= 0){
																echo '<option value="'.$glasgow[0]['motorresponse'].'" selected>'.$glasgow[0]['motorresponse'].'</option>'; 
															}else{
																echo '<option><option>';
															}
												       ?>
																	<option value="6">6</option>
																	<option value="5">5</option>
																	<option value="4">4</option>
																	<option value="3">3</option>
																	<option value="2">2 </option>
																	<option value="1">1</option>
																</select></div></div>
																</div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#neuro11" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Neuro Dynamic tests</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="neuro11" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																<div class="table-responsive media-body">
																	<table  class="table table-datatable table-custom" id="advancedDataTable">
																	<tr><td class="text-center" ></td><td class="text-center" ></td><td class="text-center" ><center>Left </center></td><td class="text-center" ><center>Right</center></td></tr>
																	<tr><td class="text-center" >Ulnar</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="ulnar_left" value="<?php echo $dynamic['ulnar_left'] ?>"> </td><td class="text-center" ><input type="text" class="form-control" name="ulnar_right" value="<?php echo $dynamic['ulnar_right'] ?>"></td></tr>
																	<tr><td class="text-center" >Radial</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Radial_left" value="<?php echo $dynamic['radial_left'] ?>"> </td><td class="text-center" ><input type="text" class="form-control" name="Radial_right" value="<?php echo $dynamic['radial_right'] ?>"></td></tr>
																	<tr><td class="text-center" >Median</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Median_left" value="<?php echo $dynamic['median_left'] ?>" > </td><td class="text-center" ><input type="text" class="form-control" name="Median_right" value="<?php echo $dynamic['median_right'] ?>" ></td></tr>
																	<tr><td class="text-center" >Musculocutaneous</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Musculocutaneous_left" value="<?php echo $dynamic['musculocutaneous_left'] ?>"> </td><td class="text-center" ><input type="text" class="form-control" name="Musculocutaneous_right" value="<?php echo $dynamic['musculocutaneous_right'] ?>"></td></tr>
																	<tr><td class="text-center" >Sciatic</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Sciatic_left" value="<?php echo $dynamic['sciatic_left'] ?>"> </td><td class="text-center" ><input type="text" class="form-control" name="Sciatic_right" value="<?php echo $dynamic['sciatic_right'] ?>"></td></tr>
																	<tr><td class="text-center" >Tibial</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Tibial_left" value="<?php echo $dynamic['tibial_left'] ?>"> </td><td class="text-center" ><input type="text" class="form-control" name="Tibial_right" value="<?php echo $dynamic['tibial_right'] ?>"></td></tr>
																	<tr><td class="text-center" >Comman peronial</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Commanperonial_left" value="<?php echo $dynamic['commanperonial_left'] ?>"> </td><td class="text-center" ><input type="text" class="form-control" name="Commanperonial_right" value="<?php echo $dynamic['commanperonial_right'] ?>"></td></tr>
																	<tr><td class="text-center" >Femoral</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Femoral_left" value="<?php echo $dynamic['femoral_left'] ?>"> </td><td class="text-center" ><input type="text" class="form-control" name="Femoral_right" value="<?php echo $dynamic['femoral_right'] ?>"></td></tr>
																	<tr><td class="text-center" >Lateral cutaneous</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Lateralcutaneous_left" value="<?php echo $dynamic['lateralcutaneous_left'] ?>"> </td><td class="text-center" ><input type="text" class="form-control" name="Lateralcutaneous_right" value="<?php echo $dynamic['lateralcutaneous_right'] ?>"></td></tr>
																	<tr><td class="text-center" >Obturator</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Obturator_left" value="<?php echo $dynamic['obturator_left'] ?>"> </td><td class="text-center" ><input type="text" class="form-control" name="Obturator_right" value="<?php echo $dynamic['obturator_right'] ?>"></td></tr>
																	<tr><td class="text-center" >Sural</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Sural_left" value="<?php echo $dynamic['sural_left'] ?>"> </td><td class="text-center" ><input type="text" class="form-control" name="Sural_right"  value="<?php echo $dynamic['sural_right'] ?>"></td></tr>
																	</table>
																  </div>
																</div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#special" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Special tests Info</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="special" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																<div class="row">
																	<div class="col-md-6">	
																	<div class="input-group">
																			<div class="input-group-prepend"><span class="input-group-text">@</span></div>
																			<input placeholder="Special Tests" type="text" name="scar" id="scar" class="form-control" value="<?php echo $spl['scartype'] ?>">
																	</div>											
																	</div>
																	<div class="col-md-6">	
																	<div class="input-group">
																			<div class="input-group-prepend"><span class="input-group-text">@</span></div>
																			<textarea placeholder="Description" type="text" name="adhere" id="adhere" class="form-control"><?php echo $spl['adhereto'] ?></textarea>
																	</div>											
																	</div>											
																</div></br>
																</div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#adl" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">ADL score.functional Assessment</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="adl" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																<div class="row">
																	<div class="col-md-6">	
																	<div class="input-group">
																			<div class="input-group-prepend"><span class="input-group-text">@</span></div>
																			<input placeholder="Special Tests" type="text" name="name" id="name" class="form-control" value="<?php echo $adl['name'] ?>">
																	</div>											
																	</div>
																	<div class="col-md-6">	
																	<div class="input-group">
																			<div class="input-group-prepend"><span class="input-group-text">@</span></div>
																			<textarea placeholder="Description" type="text" name="description" id="description" class="form-control"><?php echo $adl['description']; ?></textarea>
																	</div>											
																	</div>											
																</div></br>
																</div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#tissue" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Neural Tissue Palpation</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="tissue" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																<div class="table-responsive media-body">
																	<table  class="table table-datatable table-custom" id="advancedDataTable">
																	<tr><td class="text-center" ></td><td class="text-center" ></td><td class="text-center" ><center>Left</center> </td><td class="text-center" ><center>Right</center></td></tr>													
																	<tr><td class="text-center" >Ulnar</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="ulnar_left1" value="<?php echo $tissue['ulnar_left']; ?>"> </td><td class="text-center" ><input type="text" class="form-control" name="ulnar_right1"  value="<?php echo $tissue['ulnar_right']; ?>"></td></tr>
																	<tr><td class="text-center" >Radial</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Radial_left1" value="<?php echo $tissue['radial_left']; ?>"> </td><td class="text-center" ><input type="text" class="form-control" name="Radial_right1" value="<?php echo $tissue['radial_right']; ?>"></td></tr>
																	<tr><td class="text-center" >Median</td><td class="text-center" ></td><td class="text-center" ><input type="text"  class="form-control" name="Median_left1" value="<?php echo $tissue['median_left']; ?>"> </td><td class="text-center" ><input type="text" class="form-control" name="Median_right1" value="<?php echo $tissue['median_right']; ?>"></td></tr>
																	<tr><td class="text-center" >Sciatic</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Sciatic_left1" value="<?php echo $tissue['sciatic_left']; ?>"> </td><td class="text-center" ><input type="text" class="form-control" name="Sciatic_right1" value="<?php echo $tissue['sciatic_right']; ?>"></td></tr>
																	<tr><td class="text-center" >Tibial</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Tibial_left1" value="<?php echo $tissue['tibial_left']; ?>"> </td><td class="text-center" ><input type="text" class="form-control" name="Tibial_right1" value="<?php echo $tissue['tibial_right']; ?>"></td></tr>
																	<tr><td class="text-center" >peronial</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="peronial_left1" value="<?php echo $tissue['peronial_left']; ?>"> </td><td class="text-center" ><input type="text" class="form-control" name="peronial_right1" value="<?php echo $tissue['peronial_right']; ?>"></td></tr>
																	<tr><td class="text-center" >Comman peronial</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Femoral_left1" value="<?php echo $tissue['femoral_left']; ?>"> </td><td class="text-center" ><input type="text" class="form-control" name="Femoral_right1" value="<?php echo $tissue['femoral_right']; ?>"></td></tr>
																	<tr><td class="text-center" >Femoral</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Sural_left1"  value="<?php echo $tissue['sural_left']; ?>"> </td><td class="text-center" ><input type="text" class="form-control" name="Sural_right1" value="<?php echo $tissue['sural_right']; ?>"></td></tr>
																	<tr><td class="text-center" >Lateral cutaneous</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Saphenous_left1"  value="<?php echo $tissue['saphenous_left']; ?>"> </td><td class="text-center" ><input type="text" class="form-control" name="Saphenous_right1" value="<?php echo $tissue['saphenous_right']; ?>" ></td></tr>
																	</table>
																 </div>
																</div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#test" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Co-ordination Tests</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="test" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																<div class="table-responsive media-body">
																<label>Finger To Nose</label>
																<table  class="table table-datatable table-custom" id="advancedDataTable">
																	<tr><td class="text-center" >Time Taken to Complete the Activity :</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="f1" value="<?php echo $verbal[0]['f1']; ?>" > </td></tr>
																	<tr><td class="text-center" >Speed at which the Activity is Performed	:</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="f2" value="<?php echo $verbal[0]['f2']; ?>"> </td></tr>
																	<tr><td class="text-center" >No. of Error Made :</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="f3" value="<?php echo $verbal[0]['f3']; ?>"> </td></tr>
																</table>
																</div></br></br>
																<div class="table-responsive media-body">
																	  <label>Aternating Supination - pronation movement</label>
																	  <table  class="table table-datatable table-custom" id="advancedDataTable">
																			<tr><td class="text-center" >Time Taken to Complete the Activity :</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="a1" value="<?php echo $verbal[0]['a1']; ?>"> </td></tr>
																			<tr><td class="text-center" >Speed at which the Activity is Performed	:</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="a2" value="<?php echo $verbal[0]['a2']; ?>"> </td></tr>
																			<tr><td class="text-center" >No. of Error Made :</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="a3" value="<?php echo $verbal[0]['a3'] ?>"> </td></tr>
																	  </table>
																</div></br></br>
																 <div class="table-responsive media-body">
																		<label>Heel to Shin</label>
																		<table  class="table table-datatable table-custom" id="advancedDataTable">
																			<tr><td class="text-center" >Time Taken to Complete the Activity :</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="h1" value="<?php echo $verbal[0]['h1']; ?>"> </td></tr>
																			<tr><td class="text-center" >Speed at which the Activity is Performed	:</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="h2" value="<?php echo $verbal[0]['h2']; ?>"> </td></tr>
																			<tr><td class="text-center" >No. of Error Made :</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="h3" value="<?php echo $verbal[0]['h3']; ?>"> </td></tr>
																		</table>
																</div></br></br>
																</div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#gait" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Gait & Balance Testing</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="gait" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																 <div class="row">
																  <div class="col-md-6">
																  Gait level surface :
																  </div>
																  <div class="col-md-6">
																  <select class="select-control" name="gait" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="gait">
																								<?php 
																	echo '<option value="'.$gaid[0]['surface'].'" selected>'.$gaid[0]['surface'].'</option>';
												?>
																								<option value="3">3</option>
																								<option value="2">2 </option>
																								<option value="1">1</option>
																								</select>
																  </div>
																 </div></br></br>
																 <div class="row">
																  <div class="col-md-6">
																 Change in gait speed :
																  </div>
																  <div class="col-md-6">
																	<select class="select-control" name="speed" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="speed">
																		<?php 
															echo '<option value="'.$gaid[0]['speed'].'" selected>'.$gaid[0]['speed'].'</option>';
												?>
																		<option value="3">3</option>
																		<option value="2">2 </option>
																		<option value="1">1</option>
																	</select>
																  </div>
																  </div></br></br>
																  <div class="row">
																  <div class="col-md-6">
																	Gait with horizontal head turns :
																  </div>
																  <div class="col-md-6">
																	<select class="select-control" name="horizontal" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="horizontal">
																		<?php 
													echo '<option value="'.$gaid[0]['horizontal'].'" selected>'.$gaid[0]['horizontal'].'</option>';
												?>
																		<option value="3">3</option>
																		<option value="2">2 </option>
																		<option value="1">1</option>
																	</select>
																  </div>
																  </div></br></br>
																  <div class="row">
																  <div class="col-md-6">
																	 Gait with vertical head turns :
																  </div>
																  <div class="col-md-6">
																	<select class="select-control" name="vertical" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="vertical">
																	<?php 
													echo '<option value="'.$gaid[0]['vertical'].'" selected>'.$gaid[0]['vertical'].'</option>';
												?>
																		<option value="3">3</option>
																		<option value="2">2 </option>
																		<option value="1">1</option>
																	</select>
																  </div>
																  </div></br></br>
																  <div class="row">
																  <div class="col-md-6">
																 Gait and pivot turn :
																  </div>
																  <div class="col-md-6">
																  <select class="select-control" name="pivot" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="pivot">
																								<?php 
													echo '<option value="'.$gaid[0]['pivot'].'" selected>'.$gaid[0]['pivot'].'</option>';
												?>
																								<option value="3">3</option>
																								<option value="2">2 </option>
																								<option value="1">1</option>
																								</select>
																  </div>
																  </div></br></br>
																  <div class="row">
																  <div class="col-md-6">
																 Step over obstacle :
																  </div>
																  <div class="col-md-6">
																  <select class="select-control" name="obstacle" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="obstacle">
																								<?php 
													echo '<option value="'.$gaid[0]['obstacle'].'" selected>'.$gaid[0]['obstacle'].'</option>';
												?>
																								<option value="3">3</option>
																								<option value="2">2 </option>
																								<option value="1">1</option>
																								</select>
																  </div>
																  </div></br></br>
																  <div class="row">
																  <div class="col-md-6">
																 Step around obstacles :
																  </div>
																  <div class="col-md-6">
																  <select class="select-control" name="obstacles" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="obstacles">
																								<?php 
													echo '<option value="'.$gaid[0]['obstacles'].'" selected>'.$gaid[0]['obstacles'].'</option>'; ?>
																								<option value="3">3</option>
																								<option value="2">2 </option>
																								<option value="1">1</option>
																								</select>
																  </div>
																  </div></br></br>
																  <div class="row">
																  <div class="col-md-6">
																  Steps :
																  </div>
																  <div class="col-md-6">
																  <select class="select-control" name="steps" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="steps">
																								<?php 
													echo '<option value="'.$gaid[0]['steps'].'" selected>'.$gaid[0]['steps'].'</option>';
												?>
																								<option value="3">3</option>
																								<option value="2">2 </option>
																								<option value="1">1</option>
																								</select>
																  </div>
																  </div></br></br>
																  <div class="media-body">
																	 <label>Balance & Movement analyser</label>
																	 <textarea name="balance" class="form-control"><?php echo $gaid[0]['balance']; ?></textarea>
																  </div>
																</div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#function" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Functional Testing</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="function" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																  <div class="row">
																  <div class="col-md-6">
																  Bowels (preceding week) :
																  </div>
																  <div class="col-md-6">
																  <select class="select-control" name="bowels" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="verbal">
																		<?php echo '<option value="'.$functional[0]['bowels'].'" selected>'.$functional[0]['bowels'].'</option>'; ?>
																		<option value="2">2 </option>
																		<option value="1">1</option>
																		<option value="0">0</option>
																  </select>
																  </div>
																  </div></br></br>
																  <div class="row">
																  <div class="col-md-6">
																  Bladder (preceding week) :
																  </div>
																  <div class="col-md-6">
																  <select class="select-control" name="bladder" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="verbal">
																							<?php echo '<option value="'.$functional[0]['bladder'].'" selected>'.$functional[0]['bladder'].'</option>'; ?>
																								<option value="2">2 </option>
																								<option value="1">1</option>
																								<option value="0">0</option>
																								</select>
																  </div>
																  </div></br></br>
																  <div class="row">
																  <div class="col-md-6">
																 Grooming (preceding 24 - 48 hours) :
																  </div>
																  <div class="col-md-6">
																  <select class="select-control" name="grooming" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="verbal">
																								<?php echo '<option value="'.$functional[0]['grooming'].'" selected>'.$functional[0]['grooming'].'</option>'; ?>
																								<option value="2">2 </option>
																								<option value="1">1</option>
																								<option value="0">0</option>
																								</select>
																  </div>
																  </div></br></br>
																  <div class="row">
																  <div class="col-md-6">
																 Toilet use :
																  </div>
																  <div class="col-md-6">
																  <select class="select-control" name="toilet" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="verbal">
																								<?php echo '<option value="'.$functional[0]['toilet'].'" selected>'.$functional[0]['toilet'].'</option>'; ?>
																								<option value="2">2 </option>
																								<option value="1">1</option>
																								<option value="0">0</option>
																								</select> 
																  </div>
																  </div></br></br>
																  <div class="row">
																  <div class="col-md-6">
																  Feeding :
																  </div>
																  <div class="col-md-6">
																  <select class="select-control" name="feeding" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="verbal">
																								<?php echo '<option value="'.$functional[0]['feeding'].'" selected>'.$functional[0]['feeding'].'</option>'; ?>
																								<option value="2">2 </option>
																								<option value="1">1</option>
																								<option value="0">0</option>
																								</select>
																  </div>
																  </div></br></br>
																  <div class="row">
																  <div class="col-md-6">
																 Transfer (from bed to chair and back) :
																  </div>
																  <div class="col-md-6">
																  <select class="select-control" name="transfer" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="verbal">
																							<?php echo '<option value="'.$functional[0]['transfer'].'" selected>'.$functional[0]['transfer'].'</option>'; ?>
																								<option value="2">2 </option>
																								<option value="1">1</option>
																								<option value="0">0</option>
																								</select>
																  </div>
																  </div></br></br>
																  <div class="row">
																  <div class="col-md-6">
																 Mobility :
																  </div>
																  <div class="col-md-6">
																  <select class="select-control" name="mobility" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="verbal">
																							<?php echo '<option value="'.$functional[0]['mobility'].'" selected>'.$functional[0]['mobility'].'</option>'; ?>
																								<option value="2">2 </option>
																								<option value="1">1</option>
																								<option value="0">0</option>
																								</select> 
																  </div>
																  </div></br></br>
																  <div class="row">
																  <div class="col-md-6">
																  Dressing :
																  </div>
																  <div class="col-md-6">
																  <select class="select-control" name="dressing" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="verbal">
																								<?php echo '<option value="'.$functional[0]['dressing'].'" selected>'.$functional[0]['dressing'].'</option>'; ?>
																								<option value="2">2 </option>
																								<option value="1">1</option>
																								<option value="0">0</option>
																								</select>
																  </div>
																  </div></br></br>
																  <div class="row">
																  <div class="col-md-6">
																  Stairs :
																  </div>
																  <div class="col-md-6">
																  <select class="select-control" name="stairs" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="verbal">
																								<?php echo '<option value="'.$functional[0]['stairs'].'" selected>'.$functional[0]['stairs'].'</option>'; ?>
																								<option value="2">2 </option>
																								<option value="1">1</option>
																								<option value="0">0</option>
																								</select>
																  </div>
																  </div></br></br>
																  <div class="row">
																  <div class="col-md-6">
																  Bathing :
																  </div>
																  <div class="col-md-6">
																  <select class="select-control" name="bathing" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="verbal">
																								<?php echo '<option value="'.$functional[0]['bathing'].'" selected>'.$functional[0]['bathing'].'</option>'; ?>
																								<option value="2">2 </option>
																								<option value="1">1</option>
																								<option value="0">0</option>
																								</select>
																  </div>
																  </div></br></br>
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
	 <div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Progress Notes Has Been Updated Successfully</div></div></div>
    <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Progress Notes Has not Been Updated Successfully</div></div></div>

	
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script></body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> 	
<script>
$('select').select2();

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
