<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Chart - Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
    <link href="<?php echo base_url()?>my_assets/main.css" rel="stylesheet">
 
 </head>
   <style>
   @media (min-width: 1025px) and (max-width: 1280px) {
 .scroll {
     height: 100%;
	 width: 100%;
     overflow-y: scroll;
	 overflow-x: hidden;
  }
.scroll::-webkit-scrollbar {
    width: 13px;
}

.scroll::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px; 
    border-radius: 10px;
	background-color:transparent;
}

.scroll::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 8px; 
	background-color:#ffffff;
}
}

@media (min-width: 1281px) {
  
    .scroll {
     height: 100%;
	 width: 100%;
     overflow-y: scroll;
	 overflow-x: hidden;
  }
.scroll::-webkit-scrollbar {
    width: 13px;
}

.scroll::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px; 
    border-radius: 10px;
	background-color:transparent;
}

.scroll::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 8px; 
	background-color:#ffffff;
}
  
}
@media (min-width: 768px) and (max-width: 1024px) {
  
  //CSS
  


table {
    overflow:hidden;
    overflow-y: scroll;
    
}

}
@media (min-width: 320px) and (max-width: 480px) {
  
     .scroll {
     height: 100%;
	 width: 100%;
     overflow-y: scroll;
	 overflow-x: hidden;
  }
.scroll::-webkit-scrollbar {
    width: 13px;
}

.scroll::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px; 
    border-radius: 10px;
	background-color:transparent;
}

.scroll::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 8px; 
	background-color:#ffffff;
}
  
}
</style>
    
  <body>
  <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
                          
				<?php include("sidebar.php");?>
             <div class="app-main__outer">
                <div class="app-main__inner">
                <div class="main-card mb-3 card">
				 <div class="tabs-animation">
					<form class="form-horizontal" action="<?php echo base_url().'client/exercise/saveloadchart' ?>" method="post" parsley-validate id="signupForm">
				    <?php $CI =& get_instance();
					$CI->load->model(array('exercise_model','common_model'));
					if($this->session->userdata('chart_name') != false ) {
						$chart_no = $this->session->userdata('chart_name');						
					    $chart_det=$this->exercise_model->getcharts($chart_no);
						if($chart_det != false) { 
						foreach($chart_det as $name){
							$pname = $name['patient_name'];	
							$cname = $name['chart_name'];	
							$cno = $name['chard_no'];	
						}
					 } ?>
					<input type="hidden" name="chartno" id="chartno" value="<?php echo $cno ?>" class="form-control" >
					<div class="table-responsive">
					<table class="table table-datatable table-custom" width="1048" height="340">
					<tr><td colspan="1"><center> Chart Name : *</center></td>
						<td colspan="3"><center><span class="label label-info"><?php echo $cname ?></span></center></td>
					</tr>
					<?php 
							foreach($chart_det as $img){		
					?>
							<input type="hidden" value="<?php echo $cname ?>" name="chart_name" >
							<input type="hidden" value="<?php echo $img['chart_id'] ?>" name="chart_id[]" >
							<input type="hidden" value="<?php echo $img['verifycode'] ?>" name="verifycode" >
				
							<tr><td width="375" height="334">
								<div align="center"><img src="<?php echo 'https://exerciseprescriptions20.s3.ap-south-1.amazonaws.com/'.$img['img_path'] ?>" width="260" height="272"  style="max-width:95%;border:2px dotted #545565;">
								</div>
							</td>
							<td width="300">
								<textarea class="form-control" rows="4" cols="50" style="width:300px; height:250px;" name="descr1[]"><?php echo $img['img_description'] ?></textarea>
							</td>
							<td width="50">
							</td>
							<td width="307">
							<div align="left">
							  <label class="control-label">Hold</label>
							</div>
							<div class="controls">
							  <div align="left">
								<select  class="chosen-select chosen-transparent form-control hold1" id="hold" name="hold1[]">
								   <?php 
									if($img['hold'] != -1){
										echo '<option value="'.$img['hold'].'" selected>'. $img['hold'].' Seconds</option>';
									}else{
										echo '<option value="-1" selected>__________</option>';
									}
								  ?>
									<option value="-1">__________</option>
									<option value="0">0 Seconds</option>
									<option value="1">1 Second</option>
									<option value="2">2 Seconds</option>
									<option value="3">3 Seconds</option>
									<option value="4">4 Seconds</option>
									<option value="5">5 Seconds</option>
									<option value="6">6 Seconds</option>
									<option value="7">7 Seconds</option>
									<option value="8">8 Seconds</option>
									<option value="9">9 Seconds</option>
									<option value="10">10 Seconds</option>
									<option value="11">11 Seconds</option>
									<option value="12">12 Seconds</option>
									<option value="13">13 Seconds</option>
									<option value="14">14 Seconds</option>
									<option value="15">15 Seconds</option>
									<option value="20">20 Seconds</option>
									<option value="25">25 Seconds</option>
									<option value="30">30 Seconds</option>
									<option value="35">35 Seconds</option>
									<option value="45">45 Seconds</option>
									<option value="60">1 Minute</option>
									<option value="120">2 Minutes</option>
									<option value="180">3 Minutes</option>
									<option value="240">4 Minutes</option>
									<option value="300">5 Minutes</option>
									<option value="360">6 Minutes</option>
									<option value="420">7 Minutes</option>
									<option value="480">8 Minutes</option>
									<option value="540">9 Minutes</option>
									<option value="600">10 Minutes</option>
									<option value="720">12 Minutes</option>
									<option value="900">15 Minutes</option>
									<option value="1200">20 Minutes</option>
									<option value="1500">25 Minutes</option>
									<option value="1800">30 Minutes</option>
								</select>
							</div>
						</div>
							<div align="left">
							  <label class="control-label">Perform / Session </label>
							</div>
							<div class="controls">
							  <div align="left">
								<select  class="chosen-select chosen-transparent form-control repeat1" id="repeat" name="repeat1[]">							
								  <?php 
									if($img['repet'] != -1){
										echo '<option value="'.$img['repet'].'" selected>'. $img['repet'].' Times</option>';
									}else{
										echo '<option value="-1" selected>__________</option>';
									}
								  ?>
								  <option value="-1">__________</option>
								  <option value="1">1 Time</option>
								  <option value="2">2 Times</option>
								  <option value="3">3 Times</option>
								  <option value="4">4 Times</option>
								  <option value="5">5 Times</option>
								  <option value="6">6 Times</option>
								  <option value="7">7 Times</option>
								  <option value="8">8 Times</option>
								  <option value="9">9 Times</option>
								  <option value="10">10 Times</option>
								  <option value="11">11 Times</option>
								  <option value="12">12 Times</option>
								  <option value="13">13 Times</option>
								  <option value="14">14 Times</option>
								  <option value="15">15 Times</option>
								  <option value="16">16 Times</option>
								  <option value="17">17 Times</option>
								  <option value="18">18 Times</option>
								  <option value="19">19 Times</option>
								  <option value="20">20 Times</option>
								  <option value="21">21 Times</option>
								  <option value="22">22 Times</option>
								  <option value="23">23 Times</option>
								  <option value="24">24 Times</option>
								  <option value="25">25 Times</option>
								  <option value="26">26 Times</option>
								  <option value="27">27 Times</option>
								  <option value="28">28 Times</option>
								  <option value="29">29 Times</option>
								  <option value="30">30 Times</option>
								  <option value="31">31 Times</option>
								  <option value="32">32 Times</option>
								  <option value="33">33 Times</option>
								  <option value="34">34 Times</option>
								  <option value="35">35 Times</option>
								  <option value="36">36 Times</option>
								  <option value="37">37 Times</option>
								  <option value="38">38 Times</option>
								  <option value="39">39 Times</option>
								  <option value="40">40 Times</option>
								  <option value="41">41 Times</option>
								  <option value="42">42 Times</option>
								  <option value="43">43 Times</option>
								  <option value="44">44 Times</option>
								  <option value="45">45 Times</option>
								  <option value="46">46 Times</option>
								  <option value="47">47 Times</option>
								  <option value="48">48 Times</option>
								  <option value="49">49 Times</option>
								  <option value="50">50 Times</option>
								</select>
							  </div>
							</div>
							
						<div align="left">
							<label class="control-label">Complete</label>
						</div>
						<div class="controls">
						  <div align="left">
							<select class="chosen-select chosen-transparent form-control complete1" id="complete" name="complete1[]">
								<?php 
									if($img['complete'] != -1){
										echo '<option value="'.$img['complete'].'" selected>'. $img['complete'].' Sets</option>';
									}else{
										echo '<option value="-1" selected>__________</option>';
									}
								  ?>
									<option value="-1">__________</option>
									<option value="1">1 Set</option>
									<option value="2">2 Sets</option>
									<option value="3">3 Sets</option>
									<option value="4">4 Sets</option>
									<option value="5">5 Sets</option>
									<option value="6">6 Sets</option>
									<option value="7">7 Sets</option>
									<option value="8">8 Sets</option>
									<option value="9">9 Sets</option>
									<option value="10">10 Sets</option>
									<option value="11">11 Sets</option>
									<option value="12">12 Sets</option>
									<option value="13">13 Sets</option>
									<option value="14">14 Sets</option>
									<option value="15">15 Sets</option>
									<option value="16">16 Sets</option>
									<option value="17">17 Sets</option>
									<option value="18">18 Sets</option>
									<option value="19">19 Sets</option>
									<option value="20">20 Sets</option>
							</select>
						  </div>
						</div>
						
						</td>
					</tr>
					<?php } ?>
					<?php }  else { ?>
					</table>
					<div class="table-responsive">
					<table class="table table-striped" width="1048" height="340">
					<tr><td colspan="1"><center> Chart Name * : </center></td>
						<td colspan="3"><center><input type="text" class="form-control" parsley-trigger="change" parsley-required="true" id="cname" name="cname"  ></center></td>
					</tr>
					
					<?php } 
					$chartlist = $CI->exercise_model->countlist();
					$status = $CI->exercise_model->exexstatus();
					$count=0;
						if($chartlist != false){
							foreach($chartlist as $list){
								$count++;
							}
						}
						if($status != false ){
					?>
					
					
					<?php 
						$pname=array();
						$imgid = array();
						$id = array();
						foreach ($_COOKIE as $key=>$val)
						{
							if(stristr($key,'imgid') ){
								$imgid[]=$key;
								$pname[]= $val;
								
							}
						}
						
						$j = 0 ;
						for($i=0;$i<sizeof($pname);$i++){
							$str = explode("https://exerciseprescriptions20.s3.ap-south-1.amazonaws.com/",$pname[$i]);
							$id = end($str);
							$str1 = explode("https://physioplustech.in/uploads/exercise/",$pname[$i]);
							$id1 = end($str1);
							
							$images = $CI->exercise_model->getimage_ankle($id);
						    $images1 = $CI->exercise_model->getimage_cervical($id);
							$images2 = $CI->exercise_model->getimage_shoulder($id);
							$images3 = $CI->exercise_model->getimage_special($id);
							$images4 = $CI->exercise_model->getimage_education($id);
							$images5 = $CI->exercise_model->getimage_elbow($id);
							$images6 = $CI->exercise_model->getimage_hip($id);
							$images7 = $CI->exercise_model->getimage_lumber($id);
							$images8 = $CI->exercise_model->getimage_privateankle($id1);
						    $images9 = $CI->exercise_model->getimage_privatecervical($id1);
							$images10 = $CI->exercise_model->getimage_privateeducation($id1);
							$images11 = $CI->exercise_model->getimage_privateelbow($id1);
							$images12 = $CI->exercise_model->getimage_privatehip($id1);
							$images13 = $CI->exercise_model->getimage_privatelumbar($id1);
							$images14 = $CI->exercise_model->getimage_privateshoulder($id1);
							$images15 = $CI->exercise_model->getimage_privatespecial($id1);
							
							
							
							if ($images != false) {
								
								foreach($images as $img){
									$text = $img['title'].PHP_EOL .PHP_EOL .PHP_EOL .$img['description'];
								?>
									
									<tr><td width="375" height="334">
										<div align="center"><img src="<?php echo 'https://exerciseprescriptions20.s3.ap-south-1.amazonaws.com/'.$img['path'] ?>" width="260" height="272"  style="max-width:95%;border:2px dotted #545565;">
										<input type="hidden" id="path" name="path[]" value="<?php echo $img['path'] ?>" >
										</div>
									</td>
									<td width="300">
										<textarea class="form-control" rows="4" cols="50" style="width:300px; height:250px;" name="descr[]"><?php echo $img['description'] ?></textarea>
										<input type="hidden" id="title" name="title[]" value="<?php echo $img['title'] ?>" >
									</td>
									<td width="47"></td>
									<td width="310">
									<div align="left">
									  <label class="control-label">Hold</label>
									</div>
									<div class="controls">
									  <div align="left">
										<select  class="chosen-select chosen-transparent form-control hold1" name="hold[]" id="hold" >
										  <option value="-1">__________</option>
											<option value="0">0 Seconds</option>
											<option value="1">1 Second</option>
											<option value="2">2 Seconds</option>
											<option value="3">3 Seconds</option>
											<option value="4">4 Seconds</option>
											<option value="5">5 Seconds</option>
											<option value="6">6 Seconds</option>
											<option value="7">7 Seconds</option>
											<option value="8">8 Seconds</option>
											<option value="9">9 Seconds</option>
											<option value="10">10 Seconds</option>
											<option value="11">11 Seconds</option>
											<option value="12">12 Seconds</option>
											<option value="13">13 Seconds</option>
											<option value="14">14 Seconds</option>
											<option value="15">15 Seconds</option>
											<option value="20">20 Seconds</option>
											<option value="25">25 Seconds</option>
											<option value="30">30 Seconds</option>
											<option value="35">35 Seconds</option>
											<option value="45">45 Seconds</option>
											<option value="60">1 Minute</option>
											<option value="120">2 Minutes</option>
											<option value="180">3 Minutes</option>
											<option value="240">4 Minutes</option>
											<option value="300">5 Minutes</option>
											<option value="360">6 Minutes</option>
											<option value="420">7 Minutes</option>
											<option value="480">8 Minutes</option>
											<option value="540">9 Minutes</option>
											<option value="600">10 Minutes</option>
											<option value="720">12 Minutes</option>
											<option value="900">15 Minutes</option>
											<option value="1200">20 Minutes</option>
											<option value="1500">25 Minutes</option>
											<option value="1800">30 Minutes</option>
										</select>
									</div>
								  </div>
									<div align="left">
									  <label class="control-label">Perform / Session</label>
									</div>
									<div class="controls">
									  <div align="left">
										<!--<select class="form-control" name="repeat[]" id="repeat" class="repeat1">-->
										  <select class="chosen-select chosen-transparent form-control repeat1" name="repeat[]" id="repeat">
										  <option value="-1" selected>__________</option>
										  <option value="1">1 Time</option>
										  <option value="2">2 Times</option>
										  <option value="3">3 Times</option>
										  <option value="4">4 Times</option>
										  <option value="5">5 Times</option>
										  <option value="6">6 Times</option>
										  <option value="7">7 Times</option>
										  <option value="8">8 Times</option>
										  <option value="9">9 Times</option>
										  <option value="10">10 Times</option>
										  <option value="11">11 Times</option>
										  <option value="12">12 Times</option>
										  <option value="13">13 Times</option>
										  <option value="14">14 Times</option>
										  <option value="15">15 Times</option>
										  <option value="16">16 Times</option>
										  <option value="17">17 Times</option>
										  <option value="18">18 Times</option>
										  <option value="19">19 Times</option>
										  <option value="20">20 Times</option>
										  <option value="21">21 Times</option>
										  <option value="22">22 Times</option>
										  <option value="23">23 Times</option>
										  <option value="24">24 Times</option>
										  <option value="25">25 Times</option>
										  <option value="26">26 Times</option>
										  <option value="27">27 Times</option>
										  <option value="28">28 Times</option>
										  <option value="29">29 Times</option>
										  <option value="30">30 Times</option>
										  <option value="31">31 Times</option>
										  <option value="32">32 Times</option>
										  <option value="33">33 Times</option>
										  <option value="34">34 Times</option>
										  <option value="35">35 Times</option>
										  <option value="36">36 Times</option>
										  <option value="37">37 Times</option>
										  <option value="38">38 Times</option>
										  <option value="39">39 Times</option>
										  <option value="40">40 Times</option>
										  <option value="41">41 Times</option>
										  <option value="42">42 Times</option>
										  <option value="43">43 Times</option>
										  <option value="44">44 Times</option>
										  <option value="45">45 Times</option>
										  <option value="46">46 Times</option>
										  <option value="47">47 Times</option>
										  <option value="48">48 Times</option>
										  <option value="49">49 Times</option>
										  <option value="50">50 Times</option>
										</select>
									  </div>
									</div>
									
								<div align="left">
									<label class="control-label">Complete</label>
								</div>
								<div class="controls">
								  <div align="left">
									<select class="chosen-select chosen-transparent form-control complete1" name="complete[]" id="complete" >
										<option value="-1" selected>__________</option>
											<option value="1">1 Set</option>
											<option value="2">2 Sets</option>
											<option value="3">3 Sets</option>
											<option value="4">4 Sets</option>
											<option value="5">5 Sets</option>
											<option value="6">6 Sets</option>
											<option value="7">7 Sets</option>
											<option value="8">8 Sets</option>
											<option value="9">9 Sets</option>
											<option value="10">10 Sets</option>
											<option value="11">11 Sets</option>
											<option value="12">12 Sets</option>
											<option value="13">13 Sets</option>
											<option value="14">14 Sets</option>
											<option value="15">15 Sets</option>
											<option value="16">16 Sets</option>
											<option value="17">17 Sets</option>
											<option value="18">18 Sets</option>
											<option value="19">19 Sets</option>
											<option value="20">20 Sets</option>
									</select>
								  </div>
								</div>
							</td>
									<?php $j = $j + 1;?>
						</tr>
						<?php   }
						} if($images1 != false) { foreach($images1 as $img){ ?>
						<tr><td width="375" height="334">
										<div align="center"><img src="<?php echo 'https://exerciseprescriptions20.s3.ap-south-1.amazonaws.com/'.$img['path'] ?>" width="260" height="272"  style="max-width:95%;border:2px dotted #545565;">
										<input type="hidden" id="path" name="path[]" value="<?php echo $img['path'] ?>" >
										</div>
									</td>
									<td width="300">
										<textarea class="form-control" rows="4" cols="50" style="width:300px; height:250px;" name="descr[]"><?php echo $img['description'] ?></textarea>
										<input type="hidden" id="title" name="title[]" value="<?php echo $img['title'] ?>" >
									</td>
									<td width="47"></td>
									<td width="310">
									<div align="left">
									  <label class="control-label">Hold</label>
									</div>
									<div class="controls">
									  <div align="left">
										<select  class="chosen-select chosen-transparent form-control hold1" name="hold[]" id="hold" >
										  <option value="-1">__________</option>
											<option value="0">0 Seconds</option>
											<option value="1">1 Second</option>
											<option value="2">2 Seconds</option>
											<option value="3">3 Seconds</option>
											<option value="4">4 Seconds</option>
											<option value="5">5 Seconds</option>
											<option value="6">6 Seconds</option>
											<option value="7">7 Seconds</option>
											<option value="8">8 Seconds</option>
											<option value="9">9 Seconds</option>
											<option value="10">10 Seconds</option>
											<option value="11">11 Seconds</option>
											<option value="12">12 Seconds</option>
											<option value="13">13 Seconds</option>
											<option value="14">14 Seconds</option>
											<option value="15">15 Seconds</option>
											<option value="20">20 Seconds</option>
											<option value="25">25 Seconds</option>
											<option value="30">30 Seconds</option>
											<option value="35">35 Seconds</option>
											<option value="45">45 Seconds</option>
											<option value="60">1 Minute</option>
											<option value="120">2 Minutes</option>
											<option value="180">3 Minutes</option>
											<option value="240">4 Minutes</option>
											<option value="300">5 Minutes</option>
											<option value="360">6 Minutes</option>
											<option value="420">7 Minutes</option>
											<option value="480">8 Minutes</option>
											<option value="540">9 Minutes</option>
											<option value="600">10 Minutes</option>
											<option value="720">12 Minutes</option>
											<option value="900">15 Minutes</option>
											<option value="1200">20 Minutes</option>
											<option value="1500">25 Minutes</option>
											<option value="1800">30 Minutes</option>
										</select>
									</div>
								  </div>
									<div align="left">
									  <label class="control-label">Perform / Session</label>
									</div>
									<div class="controls">
									  <div align="left">
										<!--<select class="form-control" name="repeat[]" id="repeat" class="repeat1">-->
										  <select class="chosen-select chosen-transparent form-control repeat1" name="repeat[]" id="repeat">
										  <option value="-1" selected>__________</option>
										  <option value="1">1 Time</option>
										  <option value="2">2 Times</option>
										  <option value="3">3 Times</option>
										  <option value="4">4 Times</option>
										  <option value="5">5 Times</option>
										  <option value="6">6 Times</option>
										  <option value="7">7 Times</option>
										  <option value="8">8 Times</option>
										  <option value="9">9 Times</option>
										  <option value="10">10 Times</option>
										  <option value="11">11 Times</option>
										  <option value="12">12 Times</option>
										  <option value="13">13 Times</option>
										  <option value="14">14 Times</option>
										  <option value="15">15 Times</option>
										  <option value="16">16 Times</option>
										  <option value="17">17 Times</option>
										  <option value="18">18 Times</option>
										  <option value="19">19 Times</option>
										  <option value="20">20 Times</option>
										  <option value="21">21 Times</option>
										  <option value="22">22 Times</option>
										  <option value="23">23 Times</option>
										  <option value="24">24 Times</option>
										  <option value="25">25 Times</option>
										  <option value="26">26 Times</option>
										  <option value="27">27 Times</option>
										  <option value="28">28 Times</option>
										  <option value="29">29 Times</option>
										  <option value="30">30 Times</option>
										  <option value="31">31 Times</option>
										  <option value="32">32 Times</option>
										  <option value="33">33 Times</option>
										  <option value="34">34 Times</option>
										  <option value="35">35 Times</option>
										  <option value="36">36 Times</option>
										  <option value="37">37 Times</option>
										  <option value="38">38 Times</option>
										  <option value="39">39 Times</option>
										  <option value="40">40 Times</option>
										  <option value="41">41 Times</option>
										  <option value="42">42 Times</option>
										  <option value="43">43 Times</option>
										  <option value="44">44 Times</option>
										  <option value="45">45 Times</option>
										  <option value="46">46 Times</option>
										  <option value="47">47 Times</option>
										  <option value="48">48 Times</option>
										  <option value="49">49 Times</option>
										  <option value="50">50 Times</option>
										</select>
									  </div>
									</div>
									
								<div align="left">
									<label class="control-label">Complete</label>
								</div>
								<div class="controls">
								  <div align="left">
									<select class="chosen-select chosen-transparent form-control complete1" name="complete[]" id="complete" >
										<option value="-1" selected>__________</option>
											<option value="1">1 Set</option>
											<option value="2">2 Sets</option>
											<option value="3">3 Sets</option>
											<option value="4">4 Sets</option>
											<option value="5">5 Sets</option>
											<option value="6">6 Sets</option>
											<option value="7">7 Sets</option>
											<option value="8">8 Sets</option>
											<option value="9">9 Sets</option>
											<option value="10">10 Sets</option>
											<option value="11">11 Sets</option>
											<option value="12">12 Sets</option>
											<option value="13">13 Sets</option>
											<option value="14">14 Sets</option>
											<option value="15">15 Sets</option>
											<option value="16">16 Sets</option>
											<option value="17">17 Sets</option>
											<option value="18">18 Sets</option>
											<option value="19">19 Sets</option>
											<option value="20">20 Sets</option>
									</select>
								  </div>
								</div>
							</td>
									<?php $j = $j + 1;?>
						</tr>
						<?php }	} if ($images2 != false) {
								foreach($images2 as $img){
									$text = $img['title'].PHP_EOL .PHP_EOL .PHP_EOL .$img['description'];
								?>
									
									<tr><td width="375" height="334">
										<div align="center"><img src="<?php echo 'https://exerciseprescriptions20.s3.ap-south-1.amazonaws.com/'.$img['path'] ?>" width="260" height="272"  style="max-width:95%;border:2px dotted #545565;">
										<input type="hidden" id="path" name="path[]" value="<?php echo $img['path'] ?>" >
										</div>
									</td>
									<td width="300">
										<textarea class="form-control" rows="4" cols="50" style="width:300px; height:250px;" name="descr[]"><?php echo $img['description'] ?></textarea>
										<input type="hidden" id="title" name="title[]" value="<?php echo $img['title'] ?>" >
									</td>
									<td width="47"></td>
									<td width="310">
									<div align="left">
									  <label class="control-label">Repeat</label>
									</div>
									<div class="controls">
									  <div align="left">
										<select class="chosen-select chosen-transparent form-control" name="repeat[]" id="repeat" class="repeat1">
										  <option value="-1" selected>__________</option>
										  <option value="1">1 Time</option>
										  <option value="2">2 Times</option>
										  <option value="3">3 Times</option>
										  <option value="4">4 Times</option>
										  <option value="5">5 Times</option>
										  <option value="6">6 Times</option>
										  <option value="7">7 Times</option>
										  <option value="8">8 Times</option>
										  <option value="9">9 Times</option>
										  <option value="10">10 Times</option>
										  <option value="11">11 Times</option>
										  <option value="12">12 Times</option>
										  <option value="13">13 Times</option>
										  <option value="14">14 Times</option>
										  <option value="15">15 Times</option>
										  <option value="16">16 Times</option>
										  <option value="17">17 Times</option>
										  <option value="18">18 Times</option>
										  <option value="19">19 Times</option>
										  <option value="20">20 Times</option>
										  <option value="21">21 Times</option>
										  <option value="22">22 Times</option>
										  <option value="23">23 Times</option>
										  <option value="24">24 Times</option>
										  <option value="25">25 Times</option>
										  <option value="26">26 Times</option>
										  <option value="27">27 Times</option>
										  <option value="28">28 Times</option>
										  <option value="29">29 Times</option>
										  <option value="30">30 Times</option>
										  <option value="31">31 Times</option>
										  <option value="32">32 Times</option>
										  <option value="33">33 Times</option>
										  <option value="34">34 Times</option>
										  <option value="35">35 Times</option>
										  <option value="36">36 Times</option>
										  <option value="37">37 Times</option>
										  <option value="38">38 Times</option>
										  <option value="39">39 Times</option>
										  <option value="40">40 Times</option>
										  <option value="41">41 Times</option>
										  <option value="42">42 Times</option>
										  <option value="43">43 Times</option>
										  <option value="44">44 Times</option>
										  <option value="45">45 Times</option>
										  <option value="46">46 Times</option>
										  <option value="47">47 Times</option>
										  <option value="48">48 Times</option>
										  <option value="49">49 Times</option>
										  <option value="50">50 Times</option>
										</select>
									  </div>
									</div>
									<div align="left">
									  <label class="control-label">Hold</label>
									</div>
									<div class="controls">
									  <div align="left">
										<select  class="chosen-select chosen-transparent form-control" name="hold[]" id="hold" class="hold1">
										  <option value="-1">__________</option>
											<option value="0">0 Seconds</option>
											<option value="1">1 Second</option>
											<option value="2">2 Seconds</option>
											<option value="3">3 Seconds</option>
											<option value="4">4 Seconds</option>
											<option value="5">5 Seconds</option>
											<option value="6">6 Seconds</option>
											<option value="7">7 Seconds</option>
											<option value="8">8 Seconds</option>
											<option value="9">9 Seconds</option>
											<option value="10">10 Seconds</option>
											<option value="11">11 Seconds</option>
											<option value="12">12 Seconds</option>
											<option value="13">13 Seconds</option>
											<option value="14">14 Seconds</option>
											<option value="15">15 Seconds</option>
											<option value="20">20 Seconds</option>
											<option value="25">25 Seconds</option>
											<option value="30">30 Seconds</option>
											<option value="35">35 Seconds</option>
											<option value="45">45 Seconds</option>
											<option value="60">1 Minute</option>
											<option value="120">2 Minutes</option>
											<option value="180">3 Minutes</option>
											<option value="240">4 Minutes</option>
											<option value="300">5 Minutes</option>
											<option value="360">6 Minutes</option>
											<option value="420">7 Minutes</option>
											<option value="480">8 Minutes</option>
											<option value="540">9 Minutes</option>
											<option value="600">10 Minutes</option>
											<option value="720">12 Minutes</option>
											<option value="900">15 Minutes</option>
											<option value="1200">20 Minutes</option>
											<option value="1500">25 Minutes</option>
											<option value="1800">30 Minutes</option>
										</select>
									</div>
								</div>
								<div align="left">
									<label class="control-label">Complete</label>
								</div>
								<div class="controls">
								  <div align="left">
									<select class="chosen-select chosen-transparent form-control" name="complete[]" id="complete" class="complete1">
										<option value="-1" selected>__________</option>
											<option value="1">1 Set</option>
											<option value="2">2 Sets</option>
											<option value="3">3 Sets</option>
											<option value="4">4 Sets</option>
											<option value="5">5 Sets</option>
											<option value="6">6 Sets</option>
											<option value="7">7 Sets</option>
											<option value="8">8 Sets</option>
											<option value="9">9 Sets</option>
											<option value="10">10 Sets</option>
											<option value="11">11 Sets</option>
											<option value="12">12 Sets</option>
											<option value="13">13 Sets</option>
											<option value="14">14 Sets</option>
											<option value="15">15 Sets</option>
											<option value="16">16 Sets</option>
											<option value="17">17 Sets</option>
											<option value="18">18 Sets</option>
											<option value="19">19 Sets</option>
											<option value="20">20 Sets</option>
									</select>
								  </div>
								</div>
								<div align="left">
									<label class="control-label">Perform</label>
								</div>
								<div class="controls">
								  <div align="left">
									<select  class="chosen-select chosen-transparent form-control" name="perform[]" id="perform" class="perform1">
									  <option value="-1" selected>__________</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
											<option value="13">13</option>
											<option value="14">14</option>
											<option value="15">15</option>
											<option value="16">16</option>
											<option value="17">17</option>
											<option value="18">18</option>
											<option value="19">19</option>
											<option value="20">20</option>
									</select>
								  </div>
								</div>
								<div align="left">
									<label class="control-label">Time(s)</label>
								</div>
								<div class="controls">
								  <div align="left">
									<select class="chosen-select chosen-transparent form-control" name="time[]" id="time" class="time1">
										<option value="empty" selected>__________</option>
										<option value="a Day">a Day</option>
										<option value="a Week">a Week</option>
										<option value="an Hour">an Hour</option>
									</select>
								  </div>
								</div>
							</td>
						</tr>
						<?php }
						}
						
						if($images3 != false)  { foreach($images3 as $img) { ?>
						<tr><td width="375" height="334">
										<div align="center"><img src="<?php echo 'https://exerciseprescriptions20.s3.ap-south-1.amazonaws.com/'.$img['path'] ?>" width="260" height="272"  style="max-width:95%;border:2px dotted #545565;">
										<input type="hidden" id="path" name="path[]" value="<?php echo $img['path'] ?>" >
										</div>
									</td>
									<td width="300">
										<textarea class="form-control" rows="4" cols="50" style="width:300px; height:250px;" name="descr[]"><?php echo $img['description'] ?></textarea>
										<input type="hidden" id="title" name="title[]" value="<?php echo $img['title'] ?>" >
									</td>
									<td width="47"></td>
									<td width="310">
									<div align="left">
									  <label class="control-label">Hold</label>
									</div>
									<div class="controls">
									  <div align="left">
										<select  class="chosen-select chosen-transparent form-control hold1" name="hold[]" id="hold" >
										  <option value="-1">__________</option>
											<option value="0">0 Seconds</option>
											<option value="1">1 Second</option>
											<option value="2">2 Seconds</option>
											<option value="3">3 Seconds</option>
											<option value="4">4 Seconds</option>
											<option value="5">5 Seconds</option>
											<option value="6">6 Seconds</option>
											<option value="7">7 Seconds</option>
											<option value="8">8 Seconds</option>
											<option value="9">9 Seconds</option>
											<option value="10">10 Seconds</option>
											<option value="11">11 Seconds</option>
											<option value="12">12 Seconds</option>
											<option value="13">13 Seconds</option>
											<option value="14">14 Seconds</option>
											<option value="15">15 Seconds</option>
											<option value="20">20 Seconds</option>
											<option value="25">25 Seconds</option>
											<option value="30">30 Seconds</option>
											<option value="35">35 Seconds</option>
											<option value="45">45 Seconds</option>
											<option value="60">1 Minute</option>
											<option value="120">2 Minutes</option>
											<option value="180">3 Minutes</option>
											<option value="240">4 Minutes</option>
											<option value="300">5 Minutes</option>
											<option value="360">6 Minutes</option>
											<option value="420">7 Minutes</option>
											<option value="480">8 Minutes</option>
											<option value="540">9 Minutes</option>
											<option value="600">10 Minutes</option>
											<option value="720">12 Minutes</option>
											<option value="900">15 Minutes</option>
											<option value="1200">20 Minutes</option>
											<option value="1500">25 Minutes</option>
											<option value="1800">30 Minutes</option>
										</select>
									</div>
								  </div>
									<div align="left">
									  <label class="control-label">Perform / Session</label>
									</div>
									<div class="controls">
									  <div align="left">
										<!--<select class="form-control" name="repeat[]" id="repeat" class="repeat1">-->
										  <select class="chosen-select chosen-transparent form-control repeat1" name="repeat[]" id="repeat">
										  <option value="-1" selected>__________</option>
										  <option value="1">1 Time</option>
										  <option value="2">2 Times</option>
										  <option value="3">3 Times</option>
										  <option value="4">4 Times</option>
										  <option value="5">5 Times</option>
										  <option value="6">6 Times</option>
										  <option value="7">7 Times</option>
										  <option value="8">8 Times</option>
										  <option value="9">9 Times</option>
										  <option value="10">10 Times</option>
										  <option value="11">11 Times</option>
										  <option value="12">12 Times</option>
										  <option value="13">13 Times</option>
										  <option value="14">14 Times</option>
										  <option value="15">15 Times</option>
										  <option value="16">16 Times</option>
										  <option value="17">17 Times</option>
										  <option value="18">18 Times</option>
										  <option value="19">19 Times</option>
										  <option value="20">20 Times</option>
										  <option value="21">21 Times</option>
										  <option value="22">22 Times</option>
										  <option value="23">23 Times</option>
										  <option value="24">24 Times</option>
										  <option value="25">25 Times</option>
										  <option value="26">26 Times</option>
										  <option value="27">27 Times</option>
										  <option value="28">28 Times</option>
										  <option value="29">29 Times</option>
										  <option value="30">30 Times</option>
										  <option value="31">31 Times</option>
										  <option value="32">32 Times</option>
										  <option value="33">33 Times</option>
										  <option value="34">34 Times</option>
										  <option value="35">35 Times</option>
										  <option value="36">36 Times</option>
										  <option value="37">37 Times</option>
										  <option value="38">38 Times</option>
										  <option value="39">39 Times</option>
										  <option value="40">40 Times</option>
										  <option value="41">41 Times</option>
										  <option value="42">42 Times</option>
										  <option value="43">43 Times</option>
										  <option value="44">44 Times</option>
										  <option value="45">45 Times</option>
										  <option value="46">46 Times</option>
										  <option value="47">47 Times</option>
										  <option value="48">48 Times</option>
										  <option value="49">49 Times</option>
										  <option value="50">50 Times</option>
										</select>
									  </div>
									</div>
									
								<div align="left">
									<label class="control-label">Complete</label>
								</div>
								<div class="controls">
								  <div align="left">
									<select class="chosen-select chosen-transparent form-control complete1" name="complete[]" id="complete" >
										<option value="-1" selected>__________</option>
											<option value="1">1 Set</option>
											<option value="2">2 Sets</option>
											<option value="3">3 Sets</option>
											<option value="4">4 Sets</option>
											<option value="5">5 Sets</option>
											<option value="6">6 Sets</option>
											<option value="7">7 Sets</option>
											<option value="8">8 Sets</option>
											<option value="9">9 Sets</option>
											<option value="10">10 Sets</option>
											<option value="11">11 Sets</option>
											<option value="12">12 Sets</option>
											<option value="13">13 Sets</option>
											<option value="14">14 Sets</option>
											<option value="15">15 Sets</option>
											<option value="16">16 Sets</option>
											<option value="17">17 Sets</option>
											<option value="18">18 Sets</option>
											<option value="19">19 Sets</option>
											<option value="20">20 Sets</option>
									</select>
								  </div>
								</div>
							</td>
									<?php $j = $j + 1;?>
						</tr>
						<?Php } } if($images4 != false) { foreach($images4 as $img) { ?>
						<tr><td width="375" height="334">
										<div align="center"><img src="<?php echo 'https://exerciseprescriptions20.s3.ap-south-1.amazonaws.com/'.$img['path'] ?>" width="260" height="272"  style="max-width:95%;border:2px dotted #545565;">
										<input type="hidden" id="path" name="path[]" value="<?php echo $img['path'] ?>" >
										</div>
									</td>
									<td width="300">
										<textarea class="form-control" rows="4" cols="50" style="width:300px; height:250px;" name="descr[]"><?php echo $img['description'] ?></textarea>
										<input type="hidden" id="title" name="title[]" value="<?php echo $img['title'] ?>" >
									</td>
									<td width="47"></td>
									<td width="310">
									<div align="left">
									  <label class="control-label">Hold</label>
									</div>
									<div class="controls">
									  <div align="left">
										<select  class="chosen-select chosen-transparent form-control hold1" name="hold[]" id="hold" >
										  <option value="-1">__________</option>
											<option value="0">0 Seconds</option>
											<option value="1">1 Second</option>
											<option value="2">2 Seconds</option>
											<option value="3">3 Seconds</option>
											<option value="4">4 Seconds</option>
											<option value="5">5 Seconds</option>
											<option value="6">6 Seconds</option>
											<option value="7">7 Seconds</option>
											<option value="8">8 Seconds</option>
											<option value="9">9 Seconds</option>
											<option value="10">10 Seconds</option>
											<option value="11">11 Seconds</option>
											<option value="12">12 Seconds</option>
											<option value="13">13 Seconds</option>
											<option value="14">14 Seconds</option>
											<option value="15">15 Seconds</option>
											<option value="20">20 Seconds</option>
											<option value="25">25 Seconds</option>
											<option value="30">30 Seconds</option>
											<option value="35">35 Seconds</option>
											<option value="45">45 Seconds</option>
											<option value="60">1 Minute</option>
											<option value="120">2 Minutes</option>
											<option value="180">3 Minutes</option>
											<option value="240">4 Minutes</option>
											<option value="300">5 Minutes</option>
											<option value="360">6 Minutes</option>
											<option value="420">7 Minutes</option>
											<option value="480">8 Minutes</option>
											<option value="540">9 Minutes</option>
											<option value="600">10 Minutes</option>
											<option value="720">12 Minutes</option>
											<option value="900">15 Minutes</option>
											<option value="1200">20 Minutes</option>
											<option value="1500">25 Minutes</option>
											<option value="1800">30 Minutes</option>
										</select>
									</div>
								  </div>
									<div align="left">
									  <label class="control-label">Perform / Session</label>
									</div>
									<div class="controls">
									  <div align="left">
										<!--<select class="form-control" name="repeat[]" id="repeat" class="repeat1">-->
										  <select class="chosen-select chosen-transparent form-control repeat1" name="repeat[]" id="repeat">
										  <option value="-1" selected>__________</option>
										  <option value="1">1 Time</option>
										  <option value="2">2 Times</option>
										  <option value="3">3 Times</option>
										  <option value="4">4 Times</option>
										  <option value="5">5 Times</option>
										  <option value="6">6 Times</option>
										  <option value="7">7 Times</option>
										  <option value="8">8 Times</option>
										  <option value="9">9 Times</option>
										  <option value="10">10 Times</option>
										  <option value="11">11 Times</option>
										  <option value="12">12 Times</option>
										  <option value="13">13 Times</option>
										  <option value="14">14 Times</option>
										  <option value="15">15 Times</option>
										  <option value="16">16 Times</option>
										  <option value="17">17 Times</option>
										  <option value="18">18 Times</option>
										  <option value="19">19 Times</option>
										  <option value="20">20 Times</option>
										  <option value="21">21 Times</option>
										  <option value="22">22 Times</option>
										  <option value="23">23 Times</option>
										  <option value="24">24 Times</option>
										  <option value="25">25 Times</option>
										  <option value="26">26 Times</option>
										  <option value="27">27 Times</option>
										  <option value="28">28 Times</option>
										  <option value="29">29 Times</option>
										  <option value="30">30 Times</option>
										  <option value="31">31 Times</option>
										  <option value="32">32 Times</option>
										  <option value="33">33 Times</option>
										  <option value="34">34 Times</option>
										  <option value="35">35 Times</option>
										  <option value="36">36 Times</option>
										  <option value="37">37 Times</option>
										  <option value="38">38 Times</option>
										  <option value="39">39 Times</option>
										  <option value="40">40 Times</option>
										  <option value="41">41 Times</option>
										  <option value="42">42 Times</option>
										  <option value="43">43 Times</option>
										  <option value="44">44 Times</option>
										  <option value="45">45 Times</option>
										  <option value="46">46 Times</option>
										  <option value="47">47 Times</option>
										  <option value="48">48 Times</option>
										  <option value="49">49 Times</option>
										  <option value="50">50 Times</option>
										</select>
									  </div>
									</div>
									
								<div align="left">
									<label class="control-label">Complete</label>
								</div>
								<div class="controls">
								  <div align="left">
									<select class="chosen-select chosen-transparent form-control complete1" name="complete[]" id="complete" >
										<option value="-1" selected>__________</option>
											<option value="1">1 Set</option>
											<option value="2">2 Sets</option>
											<option value="3">3 Sets</option>
											<option value="4">4 Sets</option>
											<option value="5">5 Sets</option>
											<option value="6">6 Sets</option>
											<option value="7">7 Sets</option>
											<option value="8">8 Sets</option>
											<option value="9">9 Sets</option>
											<option value="10">10 Sets</option>
											<option value="11">11 Sets</option>
											<option value="12">12 Sets</option>
											<option value="13">13 Sets</option>
											<option value="14">14 Sets</option>
											<option value="15">15 Sets</option>
											<option value="16">16 Sets</option>
											<option value="17">17 Sets</option>
											<option value="18">18 Sets</option>
											<option value="19">19 Sets</option>
											<option value="20">20 Sets</option>
									</select>
								  </div>
								</div>
							</td>
									<?php $j = $j + 1;?>
						</tr>
						<?php  }  } if($images5 != false) { foreach($images5 as $img) {  ?>
						<tr><td width="375" height="334">
										<div align="center"><img src="<?php echo 'https://exerciseprescriptions20.s3.ap-south-1.amazonaws.com/'.$img['path'] ?>" width="260" height="272"  style="max-width:95%;border:2px dotted #545565;">
										<input type="hidden" id="path" name="path[]" value="<?php echo $img['path'] ?>" >
										</div>
									</td>
									<td width="300">
										<textarea class="form-control" rows="4" cols="50" style="width:300px; height:250px;" name="descr[]"><?php echo $img['description'] ?></textarea>
										<input type="hidden" id="title" name="title[]" value="<?php echo $img['title'] ?>" >
									</td>
									<td width="47"></td>
									<td width="310">
									<div align="left">
									  <label class="control-label">Hold</label>
									</div>
									<div class="controls">
									  <div align="left">
										<select  class="chosen-select chosen-transparent form-control hold1" name="hold[]" id="hold" >
										  <option value="-1">__________</option>
											<option value="0">0 Seconds</option>
											<option value="1">1 Second</option>
											<option value="2">2 Seconds</option>
											<option value="3">3 Seconds</option>
											<option value="4">4 Seconds</option>
											<option value="5">5 Seconds</option>
											<option value="6">6 Seconds</option>
											<option value="7">7 Seconds</option>
											<option value="8">8 Seconds</option>
											<option value="9">9 Seconds</option>
											<option value="10">10 Seconds</option>
											<option value="11">11 Seconds</option>
											<option value="12">12 Seconds</option>
											<option value="13">13 Seconds</option>
											<option value="14">14 Seconds</option>
											<option value="15">15 Seconds</option>
											<option value="20">20 Seconds</option>
											<option value="25">25 Seconds</option>
											<option value="30">30 Seconds</option>
											<option value="35">35 Seconds</option>
											<option value="45">45 Seconds</option>
											<option value="60">1 Minute</option>
											<option value="120">2 Minutes</option>
											<option value="180">3 Minutes</option>
											<option value="240">4 Minutes</option>
											<option value="300">5 Minutes</option>
											<option value="360">6 Minutes</option>
											<option value="420">7 Minutes</option>
											<option value="480">8 Minutes</option>
											<option value="540">9 Minutes</option>
											<option value="600">10 Minutes</option>
											<option value="720">12 Minutes</option>
											<option value="900">15 Minutes</option>
											<option value="1200">20 Minutes</option>
											<option value="1500">25 Minutes</option>
											<option value="1800">30 Minutes</option>
										</select>
									</div>
								  </div>
									<div align="left">
									  <label class="control-label">Perform / Session</label>
									</div>
									<div class="controls">
									  <div align="left">
										<!--<select class="form-control" name="repeat[]" id="repeat" class="repeat1">-->
										  <select class="chosen-select chosen-transparent form-control repeat1" name="repeat[]" id="repeat">
										  <option value="-1" selected>__________</option>
										  <option value="1">1 Time</option>
										  <option value="2">2 Times</option>
										  <option value="3">3 Times</option>
										  <option value="4">4 Times</option>
										  <option value="5">5 Times</option>
										  <option value="6">6 Times</option>
										  <option value="7">7 Times</option>
										  <option value="8">8 Times</option>
										  <option value="9">9 Times</option>
										  <option value="10">10 Times</option>
										  <option value="11">11 Times</option>
										  <option value="12">12 Times</option>
										  <option value="13">13 Times</option>
										  <option value="14">14 Times</option>
										  <option value="15">15 Times</option>
										  <option value="16">16 Times</option>
										  <option value="17">17 Times</option>
										  <option value="18">18 Times</option>
										  <option value="19">19 Times</option>
										  <option value="20">20 Times</option>
										  <option value="21">21 Times</option>
										  <option value="22">22 Times</option>
										  <option value="23">23 Times</option>
										  <option value="24">24 Times</option>
										  <option value="25">25 Times</option>
										  <option value="26">26 Times</option>
										  <option value="27">27 Times</option>
										  <option value="28">28 Times</option>
										  <option value="29">29 Times</option>
										  <option value="30">30 Times</option>
										  <option value="31">31 Times</option>
										  <option value="32">32 Times</option>
										  <option value="33">33 Times</option>
										  <option value="34">34 Times</option>
										  <option value="35">35 Times</option>
										  <option value="36">36 Times</option>
										  <option value="37">37 Times</option>
										  <option value="38">38 Times</option>
										  <option value="39">39 Times</option>
										  <option value="40">40 Times</option>
										  <option value="41">41 Times</option>
										  <option value="42">42 Times</option>
										  <option value="43">43 Times</option>
										  <option value="44">44 Times</option>
										  <option value="45">45 Times</option>
										  <option value="46">46 Times</option>
										  <option value="47">47 Times</option>
										  <option value="48">48 Times</option>
										  <option value="49">49 Times</option>
										  <option value="50">50 Times</option>
										</select>
									  </div>
									</div>
									
								<div align="left">
									<label class="control-label">Complete</label>
								</div>
								<div class="controls">
								  <div align="left">
									<select class="chosen-select chosen-transparent form-control complete1" name="complete[]" id="complete" >
										<option value="-1" selected>__________</option>
											<option value="1">1 Set</option>
											<option value="2">2 Sets</option>
											<option value="3">3 Sets</option>
											<option value="4">4 Sets</option>
											<option value="5">5 Sets</option>
											<option value="6">6 Sets</option>
											<option value="7">7 Sets</option>
											<option value="8">8 Sets</option>
											<option value="9">9 Sets</option>
											<option value="10">10 Sets</option>
											<option value="11">11 Sets</option>
											<option value="12">12 Sets</option>
											<option value="13">13 Sets</option>
											<option value="14">14 Sets</option>
											<option value="15">15 Sets</option>
											<option value="16">16 Sets</option>
											<option value="17">17 Sets</option>
											<option value="18">18 Sets</option>
											<option value="19">19 Sets</option>
											<option value="20">20 Sets</option>
									</select>
								  </div>
								</div>
							</td>
									<?php $j = $j + 1;?>
						</tr>
						<?php  }  } if($images6 != false) { foreach($images6 as $img) {  ?>
						<tr><td width="375" height="334">
										<div align="center"><img src="<?php echo 'https://exerciseprescriptions20.s3.ap-south-1.amazonaws.com/'.$img['path'] ?>" width="260" height="272"  style="max-width:95%;border:2px dotted #545565;">
										<input type="hidden" id="path" name="path[]" value="<?php echo $img['path'] ?>" >
										</div>
									</td>
									<td width="300">
										<textarea class="form-control" rows="4" cols="50" style="width:300px; height:250px;" name="descr[]"><?php echo $img['description'] ?></textarea>
										<input type="hidden" id="title" name="title[]" value="<?php echo $img['title'] ?>" >
									</td>
									<td width="47"></td>
									<td width="310">
									<div align="left">
									  <label class="control-label">Hold</label>
									</div>
									<div class="controls">
									  <div align="left">
										<select  class="chosen-select chosen-transparent form-control hold1" name="hold[]" id="hold" >
										  <option value="-1">__________</option>
											<option value="0">0 Seconds</option>
											<option value="1">1 Second</option>
											<option value="2">2 Seconds</option>
											<option value="3">3 Seconds</option>
											<option value="4">4 Seconds</option>
											<option value="5">5 Seconds</option>
											<option value="6">6 Seconds</option>
											<option value="7">7 Seconds</option>
											<option value="8">8 Seconds</option>
											<option value="9">9 Seconds</option>
											<option value="10">10 Seconds</option>
											<option value="11">11 Seconds</option>
											<option value="12">12 Seconds</option>
											<option value="13">13 Seconds</option>
											<option value="14">14 Seconds</option>
											<option value="15">15 Seconds</option>
											<option value="20">20 Seconds</option>
											<option value="25">25 Seconds</option>
											<option value="30">30 Seconds</option>
											<option value="35">35 Seconds</option>
											<option value="45">45 Seconds</option>
											<option value="60">1 Minute</option>
											<option value="120">2 Minutes</option>
											<option value="180">3 Minutes</option>
											<option value="240">4 Minutes</option>
											<option value="300">5 Minutes</option>
											<option value="360">6 Minutes</option>
											<option value="420">7 Minutes</option>
											<option value="480">8 Minutes</option>
											<option value="540">9 Minutes</option>
											<option value="600">10 Minutes</option>
											<option value="720">12 Minutes</option>
											<option value="900">15 Minutes</option>
											<option value="1200">20 Minutes</option>
											<option value="1500">25 Minutes</option>
											<option value="1800">30 Minutes</option>
										</select>
									</div>
								  </div>
									<div align="left">
									  <label class="control-label">Perform / Session</label>
									</div>
									<div class="controls">
									  <div align="left">
										<!--<select class="form-control" name="repeat[]" id="repeat" class="repeat1">-->
										  <select class="chosen-select chosen-transparent form-control repeat1" name="repeat[]" id="repeat">
										  <option value="-1" selected>__________</option>
										  <option value="1">1 Time</option>
										  <option value="2">2 Times</option>
										  <option value="3">3 Times</option>
										  <option value="4">4 Times</option>
										  <option value="5">5 Times</option>
										  <option value="6">6 Times</option>
										  <option value="7">7 Times</option>
										  <option value="8">8 Times</option>
										  <option value="9">9 Times</option>
										  <option value="10">10 Times</option>
										  <option value="11">11 Times</option>
										  <option value="12">12 Times</option>
										  <option value="13">13 Times</option>
										  <option value="14">14 Times</option>
										  <option value="15">15 Times</option>
										  <option value="16">16 Times</option>
										  <option value="17">17 Times</option>
										  <option value="18">18 Times</option>
										  <option value="19">19 Times</option>
										  <option value="20">20 Times</option>
										  <option value="21">21 Times</option>
										  <option value="22">22 Times</option>
										  <option value="23">23 Times</option>
										  <option value="24">24 Times</option>
										  <option value="25">25 Times</option>
										  <option value="26">26 Times</option>
										  <option value="27">27 Times</option>
										  <option value="28">28 Times</option>
										  <option value="29">29 Times</option>
										  <option value="30">30 Times</option>
										  <option value="31">31 Times</option>
										  <option value="32">32 Times</option>
										  <option value="33">33 Times</option>
										  <option value="34">34 Times</option>
										  <option value="35">35 Times</option>
										  <option value="36">36 Times</option>
										  <option value="37">37 Times</option>
										  <option value="38">38 Times</option>
										  <option value="39">39 Times</option>
										  <option value="40">40 Times</option>
										  <option value="41">41 Times</option>
										  <option value="42">42 Times</option>
										  <option value="43">43 Times</option>
										  <option value="44">44 Times</option>
										  <option value="45">45 Times</option>
										  <option value="46">46 Times</option>
										  <option value="47">47 Times</option>
										  <option value="48">48 Times</option>
										  <option value="49">49 Times</option>
										  <option value="50">50 Times</option>
										</select>
									  </div>
									</div>
									
								<div align="left">
									<label class="control-label">Complete</label>
								</div>
								<div class="controls">
								  <div align="left">
									<select class="chosen-select chosen-transparent form-control complete1" name="complete[]" id="complete" >
										<option value="-1" selected>__________</option>
											<option value="1">1 Set</option>
											<option value="2">2 Sets</option>
											<option value="3">3 Sets</option>
											<option value="4">4 Sets</option>
											<option value="5">5 Sets</option>
											<option value="6">6 Sets</option>
											<option value="7">7 Sets</option>
											<option value="8">8 Sets</option>
											<option value="9">9 Sets</option>
											<option value="10">10 Sets</option>
											<option value="11">11 Sets</option>
											<option value="12">12 Sets</option>
											<option value="13">13 Sets</option>
											<option value="14">14 Sets</option>
											<option value="15">15 Sets</option>
											<option value="16">16 Sets</option>
											<option value="17">17 Sets</option>
											<option value="18">18 Sets</option>
											<option value="19">19 Sets</option>
											<option value="20">20 Sets</option>
									</select>
								  </div>
								</div>
							</td>
									<?php $j = $j + 1;?>
						</tr>
						<?php  }  } if($images7 != false) { foreach($images7 as $img) {  ?>
						<tr><td width="375" height="334">
										<div align="center"><img src="<?php echo 'https://exerciseprescriptions20.s3.ap-south-1.amazonaws.com/'.$img['path'] ?>" width="260" height="272"  style="max-width:95%;border:2px dotted #545565;">
										<input type="hidden" id="path" name="path[]" value="<?php echo $img['path'] ?>" >
										</div>
									</td>
									<td width="300">
										<textarea class="form-control" rows="4" cols="50" style="width:300px; height:250px;" name="descr[]"><?php echo $img['description'] ?></textarea>
										<input type="hidden" id="title" name="title[]" value="<?php echo $img['title'] ?>" >
									</td>
									<td width="47"></td>
									<td width="310">
									<div align="left">
									  <label class="control-label">Hold</label>
									</div>
									<div class="controls">
									  <div align="left">
										<select  class="chosen-select chosen-transparent form-control hold1" name="hold[]" id="hold" >
										  <option value="-1">__________</option>
											<option value="0">0 Seconds</option>
											<option value="1">1 Second</option>
											<option value="2">2 Seconds</option>
											<option value="3">3 Seconds</option>
											<option value="4">4 Seconds</option>
											<option value="5">5 Seconds</option>
											<option value="6">6 Seconds</option>
											<option value="7">7 Seconds</option>
											<option value="8">8 Seconds</option>
											<option value="9">9 Seconds</option>
											<option value="10">10 Seconds</option>
											<option value="11">11 Seconds</option>
											<option value="12">12 Seconds</option>
											<option value="13">13 Seconds</option>
											<option value="14">14 Seconds</option>
											<option value="15">15 Seconds</option>
											<option value="20">20 Seconds</option>
											<option value="25">25 Seconds</option>
											<option value="30">30 Seconds</option>
											<option value="35">35 Seconds</option>
											<option value="45">45 Seconds</option>
											<option value="60">1 Minute</option>
											<option value="120">2 Minutes</option>
											<option value="180">3 Minutes</option>
											<option value="240">4 Minutes</option>
											<option value="300">5 Minutes</option>
											<option value="360">6 Minutes</option>
											<option value="420">7 Minutes</option>
											<option value="480">8 Minutes</option>
											<option value="540">9 Minutes</option>
											<option value="600">10 Minutes</option>
											<option value="720">12 Minutes</option>
											<option value="900">15 Minutes</option>
											<option value="1200">20 Minutes</option>
											<option value="1500">25 Minutes</option>
											<option value="1800">30 Minutes</option>
										</select>
									</div>
								  </div>
									<div align="left">
									  <label class="control-label">Perform / Session</label>
									</div>
									<div class="controls">
									  <div align="left">
										<!--<select class="form-control" name="repeat[]" id="repeat" class="repeat1">-->
										  <select class="chosen-select chosen-transparent form-control repeat1" name="repeat[]" id="repeat">
										  <option value="-1" selected>__________</option>
										  <option value="1">1 Time</option>
										  <option value="2">2 Times</option>
										  <option value="3">3 Times</option>
										  <option value="4">4 Times</option>
										  <option value="5">5 Times</option>
										  <option value="6">6 Times</option>
										  <option value="7">7 Times</option>
										  <option value="8">8 Times</option>
										  <option value="9">9 Times</option>
										  <option value="10">10 Times</option>
										  <option value="11">11 Times</option>
										  <option value="12">12 Times</option>
										  <option value="13">13 Times</option>
										  <option value="14">14 Times</option>
										  <option value="15">15 Times</option>
										  <option value="16">16 Times</option>
										  <option value="17">17 Times</option>
										  <option value="18">18 Times</option>
										  <option value="19">19 Times</option>
										  <option value="20">20 Times</option>
										  <option value="21">21 Times</option>
										  <option value="22">22 Times</option>
										  <option value="23">23 Times</option>
										  <option value="24">24 Times</option>
										  <option value="25">25 Times</option>
										  <option value="26">26 Times</option>
										  <option value="27">27 Times</option>
										  <option value="28">28 Times</option>
										  <option value="29">29 Times</option>
										  <option value="30">30 Times</option>
										  <option value="31">31 Times</option>
										  <option value="32">32 Times</option>
										  <option value="33">33 Times</option>
										  <option value="34">34 Times</option>
										  <option value="35">35 Times</option>
										  <option value="36">36 Times</option>
										  <option value="37">37 Times</option>
										  <option value="38">38 Times</option>
										  <option value="39">39 Times</option>
										  <option value="40">40 Times</option>
										  <option value="41">41 Times</option>
										  <option value="42">42 Times</option>
										  <option value="43">43 Times</option>
										  <option value="44">44 Times</option>
										  <option value="45">45 Times</option>
										  <option value="46">46 Times</option>
										  <option value="47">47 Times</option>
										  <option value="48">48 Times</option>
										  <option value="49">49 Times</option>
										  <option value="50">50 Times</option>
										</select>
									  </div>
									</div>
									
								<div align="left">
									<label class="control-label">Complete</label>
								</div>
								<div class="controls">
								  <div align="left">
									<select class="chosen-select chosen-transparent form-control complete1" name="complete[]" id="complete" >
										<option value="-1" selected>__________</option>
											<option value="1">1 Set</option>
											<option value="2">2 Sets</option>
											<option value="3">3 Sets</option>
											<option value="4">4 Sets</option>
											<option value="5">5 Sets</option>
											<option value="6">6 Sets</option>
											<option value="7">7 Sets</option>
											<option value="8">8 Sets</option>
											<option value="9">9 Sets</option>
											<option value="10">10 Sets</option>
											<option value="11">11 Sets</option>
											<option value="12">12 Sets</option>
											<option value="13">13 Sets</option>
											<option value="14">14 Sets</option>
											<option value="15">15 Sets</option>
											<option value="16">16 Sets</option>
											<option value="17">17 Sets</option>
											<option value="18">18 Sets</option>
											<option value="19">19 Sets</option>
											<option value="20">20 Sets</option>
									</select>
								  </div>
								</div>
							</td>
									<?php $j = $j + 1;?>
						</tr>
						<?php } } 
						if ($images8 != false) {
								foreach($images8 as $img){
									$text = $img['title'].PHP_EOL .PHP_EOL .PHP_EOL .$img['description'];
								?>
									
									<tr><td width="375" height="334">
										<div align="center"><img src="<?php echo 'https://www.physioplustech.in/uploads/exercise/'.$img['path'] ?>" width="260" height="272"  style="max-width:95%;border:2px dotted #545565;">
										<input type="hidden" id="path" name="path[]" value="<?php echo 'https://www.physioplustech.in/uploads/exercise/'.$img['path'] ?>" >
										</div>
									</td>
									<td width="300">
										<textarea class="form-control" rows="4" cols="50" style="width:300px; height:250px;" name="descr[]"><?php echo $img['description'] ?></textarea>
										<input type="hidden" id="title" name="title[]" value="<?php echo $img['title'] ?>" >
									</td>
									<td width="47"></td>
									<td width="310">
									<div align="left">
									  <label class="control-label">Hold</label>
									</div>
									<div class="controls">
									  <div align="left">
										<select  class="chosen-select chosen-transparent form-control hold1" name="hold[]" id="hold" >
										  <option value="-1">__________</option>
											<option value="0">0 Seconds</option>
											<option value="1">1 Second</option>
											<option value="2">2 Seconds</option>
											<option value="3">3 Seconds</option>
											<option value="4">4 Seconds</option>
											<option value="5">5 Seconds</option>
											<option value="6">6 Seconds</option>
											<option value="7">7 Seconds</option>
											<option value="8">8 Seconds</option>
											<option value="9">9 Seconds</option>
											<option value="10">10 Seconds</option>
											<option value="11">11 Seconds</option>
											<option value="12">12 Seconds</option>
											<option value="13">13 Seconds</option>
											<option value="14">14 Seconds</option>
											<option value="15">15 Seconds</option>
											<option value="20">20 Seconds</option>
											<option value="25">25 Seconds</option>
											<option value="30">30 Seconds</option>
											<option value="35">35 Seconds</option>
											<option value="45">45 Seconds</option>
											<option value="60">1 Minute</option>
											<option value="120">2 Minutes</option>
											<option value="180">3 Minutes</option>
											<option value="240">4 Minutes</option>
											<option value="300">5 Minutes</option>
											<option value="360">6 Minutes</option>
											<option value="420">7 Minutes</option>
											<option value="480">8 Minutes</option>
											<option value="540">9 Minutes</option>
											<option value="600">10 Minutes</option>
											<option value="720">12 Minutes</option>
											<option value="900">15 Minutes</option>
											<option value="1200">20 Minutes</option>
											<option value="1500">25 Minutes</option>
											<option value="1800">30 Minutes</option>
										</select>
									</div>
								</div>
									<div align="left">
									  <label class="control-label">Perform / Session</label>
									</div>
									<div class="controls">
									  <div align="left">
										<select class="chosen-select chosen-transparent form-control repeat1" name="repeat[]" id="repeat">
										  <option value="-1" selected>__________</option>
										  <option value="1">1 Time</option>
										  <option value="2">2 Times</option>
										  <option value="3">3 Times</option>
										  <option value="4">4 Times</option>
										  <option value="5">5 Times</option>
										  <option value="6">6 Times</option>
										  <option value="7">7 Times</option>
										  <option value="8">8 Times</option>
										  <option value="9">9 Times</option>
										  <option value="10">10 Times</option>
										  <option value="11">11 Times</option>
										  <option value="12">12 Times</option>
										  <option value="13">13 Times</option>
										  <option value="14">14 Times</option>
										  <option value="15">15 Times</option>
										  <option value="16">16 Times</option>
										  <option value="17">17 Times</option>
										  <option value="18">18 Times</option>
										  <option value="19">19 Times</option>
										  <option value="20">20 Times</option>
										  <option value="21">21 Times</option>
										  <option value="22">22 Times</option>
										  <option value="23">23 Times</option>
										  <option value="24">24 Times</option>
										  <option value="25">25 Times</option>
										  <option value="26">26 Times</option>
										  <option value="27">27 Times</option>
										  <option value="28">28 Times</option>
										  <option value="29">29 Times</option>
										  <option value="30">30 Times</option>
										  <option value="31">31 Times</option>
										  <option value="32">32 Times</option>
										  <option value="33">33 Times</option>
										  <option value="34">34 Times</option>
										  <option value="35">35 Times</option>
										  <option value="36">36 Times</option>
										  <option value="37">37 Times</option>
										  <option value="38">38 Times</option>
										  <option value="39">39 Times</option>
										  <option value="40">40 Times</option>
										  <option value="41">41 Times</option>
										  <option value="42">42 Times</option>
										  <option value="43">43 Times</option>
										  <option value="44">44 Times</option>
										  <option value="45">45 Times</option>
										  <option value="46">46 Times</option>
										  <option value="47">47 Times</option>
										  <option value="48">48 Times</option>
										  <option value="49">49 Times</option>
										  <option value="50">50 Times</option>
										</select>
									  </div>
									</div>
									
								<div align="left">
									<label class="control-label">Complete</label>
								</div>
								<div class="controls">
								  <div align="left">
									<select class="chosen-select chosen-transparent form-control complete1" name="complete[]" id="complete">
										<option value="-1" selected>__________</option>
											<option value="1">1 Set</option>
											<option value="2">2 Sets</option>
											<option value="3">3 Sets</option>
											<option value="4">4 Sets</option>
											<option value="5">5 Sets</option>
											<option value="6">6 Sets</option>
											<option value="7">7 Sets</option>
											<option value="8">8 Sets</option>
											<option value="9">9 Sets</option>
											<option value="10">10 Sets</option>
											<option value="11">11 Sets</option>
											<option value="12">12 Sets</option>
											<option value="13">13 Sets</option>
											<option value="14">14 Sets</option>
											<option value="15">15 Sets</option>
											<option value="16">16 Sets</option>
											<option value="17">17 Sets</option>
											<option value="18">18 Sets</option>
											<option value="19">19 Sets</option>
											<option value="20">20 Sets</option>
									</select>
								  </div>
								</div>
								
							</td>  
							<?php $j = $j + 1;?>
						</tr>
						<?php }
						} 
						
							if ($images9 != false) {
								foreach($images9 as $img){
									$text = $img['title'].PHP_EOL .PHP_EOL .PHP_EOL .$img['description'];
								?>
									
									<tr><td width="375" height="334">
										<div align="center"><img src="<?php echo 'https://www.physioplustech.in/uploads/exercise/'.$img['path'] ?>" width="260" height="272"  style="max-width:95%;border:2px dotted #545565;">
										<input type="hidden" id="path" name="path[]" value="<?php echo 'https://www.physioplustech.in/uploads/exercise/'.$img['path'] ?>" >
										</div>
									</td>
									<td width="300">
										<textarea class="form-control" rows="4" cols="50" style="width:300px; height:250px;" name="descr[]"><?php echo $img['description'] ?></textarea>
										<input type="hidden" id="title" name="title[]" value="<?php echo $img['title'] ?>" >
									</td>
									<td width="47"></td>
									<td width="310">
									<div align="left">
									  <label class="control-label">Hold</label>
									</div>
									<div class="controls">
									  <div align="left">
										<select  class="chosen-select chosen-transparent form-control hold1" name="hold[]" id="hold" >
										  <option value="-1">__________</option>
											<option value="0">0 Seconds</option>
											<option value="1">1 Second</option>
											<option value="2">2 Seconds</option>
											<option value="3">3 Seconds</option>
											<option value="4">4 Seconds</option>
											<option value="5">5 Seconds</option>
											<option value="6">6 Seconds</option>
											<option value="7">7 Seconds</option>
											<option value="8">8 Seconds</option>
											<option value="9">9 Seconds</option>
											<option value="10">10 Seconds</option>
											<option value="11">11 Seconds</option>
											<option value="12">12 Seconds</option>
											<option value="13">13 Seconds</option>
											<option value="14">14 Seconds</option>
											<option value="15">15 Seconds</option>
											<option value="20">20 Seconds</option>
											<option value="25">25 Seconds</option>
											<option value="30">30 Seconds</option>
											<option value="35">35 Seconds</option>
											<option value="45">45 Seconds</option>
											<option value="60">1 Minute</option>
											<option value="120">2 Minutes</option>
											<option value="180">3 Minutes</option>
											<option value="240">4 Minutes</option>
											<option value="300">5 Minutes</option>
											<option value="360">6 Minutes</option>
											<option value="420">7 Minutes</option>
											<option value="480">8 Minutes</option>
											<option value="540">9 Minutes</option>
											<option value="600">10 Minutes</option>
											<option value="720">12 Minutes</option>
											<option value="900">15 Minutes</option>
											<option value="1200">20 Minutes</option>
											<option value="1500">25 Minutes</option>
											<option value="1800">30 Minutes</option>
										</select>
									</div>
								</div>
									<div align="left">
									  <label class="control-label">Perform / Session</label>
									</div>
									<div class="controls">
									  <div align="left">
										<select class="chosen-select chosen-transparent form-control repeat1" name="repeat[]" id="repeat" >
										  <option value="-1" selected>__________</option>
										  <option value="1">1 Time</option>
										  <option value="2">2 Times</option>
										  <option value="3">3 Times</option>
										  <option value="4">4 Times</option>
										  <option value="5">5 Times</option>
										  <option value="6">6 Times</option>
										  <option value="7">7 Times</option>
										  <option value="8">8 Times</option>
										  <option value="9">9 Times</option>
										  <option value="10">10 Times</option>
										  <option value="11">11 Times</option>
										  <option value="12">12 Times</option>
										  <option value="13">13 Times</option>
										  <option value="14">14 Times</option>
										  <option value="15">15 Times</option>
										  <option value="16">16 Times</option>
										  <option value="17">17 Times</option>
										  <option value="18">18 Times</option>
										  <option value="19">19 Times</option>
										  <option value="20">20 Times</option>
										  <option value="21">21 Times</option>
										  <option value="22">22 Times</option>
										  <option value="23">23 Times</option>
										  <option value="24">24 Times</option>
										  <option value="25">25 Times</option>
										  <option value="26">26 Times</option>
										  <option value="27">27 Times</option>
										  <option value="28">28 Times</option>
										  <option value="29">29 Times</option>
										  <option value="30">30 Times</option>
										  <option value="31">31 Times</option>
										  <option value="32">32 Times</option>
										  <option value="33">33 Times</option>
										  <option value="34">34 Times</option>
										  <option value="35">35 Times</option>
										  <option value="36">36 Times</option>
										  <option value="37">37 Times</option>
										  <option value="38">38 Times</option>
										  <option value="39">39 Times</option>
										  <option value="40">40 Times</option>
										  <option value="41">41 Times</option>
										  <option value="42">42 Times</option>
										  <option value="43">43 Times</option>
										  <option value="44">44 Times</option>
										  <option value="45">45 Times</option>
										  <option value="46">46 Times</option>
										  <option value="47">47 Times</option>
										  <option value="48">48 Times</option>
										  <option value="49">49 Times</option>
										  <option value="50">50 Times</option>
										</select>
									  </div>
									</div>
									
								<div align="left">
									<label class="control-label">Complete</label>
								</div>
								<div class="controls">
								  <div align="left">
									<select class="chosen-select chosen-transparent form-control complete1" name="complete[]" id="complete" >
										<option value="-1" selected>__________</option>
											<option value="1">1 Set</option>
											<option value="2">2 Sets</option>
											<option value="3">3 Sets</option>
											<option value="4">4 Sets</option>
											<option value="5">5 Sets</option>
											<option value="6">6 Sets</option>
											<option value="7">7 Sets</option>
											<option value="8">8 Sets</option>
											<option value="9">9 Sets</option>
											<option value="10">10 Sets</option>
											<option value="11">11 Sets</option>
											<option value="12">12 Sets</option>
											<option value="13">13 Sets</option>
											<option value="14">14 Sets</option>
											<option value="15">15 Sets</option>
											<option value="16">16 Sets</option>
											<option value="17">17 Sets</option>
											<option value="18">18 Sets</option>
											<option value="19">19 Sets</option>
											<option value="20">20 Sets</option>
									</select>
								  </div>
								</div>
								
							</td>
							<?php $j = $j + 1;?>
						</tr>
						<?php }
						}
						if ($images10 != false) {
								foreach($images10 as $img){
									$text = $img['title'].PHP_EOL .PHP_EOL .PHP_EOL .$img['description'];
								?>
									
									<tr><td width="375" height="334">
										<div align="center"><img src="<?php echo 'https://www.physioplustech.in/uploads/exercise/'.$img['path'] ?>" width="260" height="272"  style="max-width:95%;border:2px dotted #545565;">
										<input type="hidden" id="path" name="path[]" value="<?php echo 'https://www.physioplustech.in/uploads/exercise/'.$img['path'] ?>" >
										</div>
									</td>
									<td width="300">
										<textarea class="form-control" rows="4" cols="50" style="width:300px; height:250px;" name="descr[]"><?php echo $img['description'] ?></textarea>
										<input type="hidden" id="title" name="title[]" value="<?php echo $img['title'] ?>" >
									</td>
									<td width="47"></td>
									<td width="310">
									<div align="left">
									  <label class="control-label">Hold</label>
									</div>
									<div class="controls">
									  <div align="left">
										<select  class="chosen-select chosen-transparent form-control hold1" name="hold[]" id="hold" >
										  <option value="-1">__________</option>
											<option value="0">0 Seconds</option>
											<option value="1">1 Second</option>
											<option value="2">2 Seconds</option>
											<option value="3">3 Seconds</option>
											<option value="4">4 Seconds</option>
											<option value="5">5 Seconds</option>
											<option value="6">6 Seconds</option>
											<option value="7">7 Seconds</option>
											<option value="8">8 Seconds</option>
											<option value="9">9 Seconds</option>
											<option value="10">10 Seconds</option>
											<option value="11">11 Seconds</option>
											<option value="12">12 Seconds</option>
											<option value="13">13 Seconds</option>
											<option value="14">14 Seconds</option>
											<option value="15">15 Seconds</option>
											<option value="20">20 Seconds</option>
											<option value="25">25 Seconds</option>
											<option value="30">30 Seconds</option>
											<option value="35">35 Seconds</option>
											<option value="45">45 Seconds</option>
											<option value="60">1 Minute</option>
											<option value="120">2 Minutes</option>
											<option value="180">3 Minutes</option>
											<option value="240">4 Minutes</option>
											<option value="300">5 Minutes</option>
											<option value="360">6 Minutes</option>
											<option value="420">7 Minutes</option>
											<option value="480">8 Minutes</option>
											<option value="540">9 Minutes</option>
											<option value="600">10 Minutes</option>
											<option value="720">12 Minutes</option>
											<option value="900">15 Minutes</option>
											<option value="1200">20 Minutes</option>
											<option value="1500">25 Minutes</option>
											<option value="1800">30 Minutes</option>
										</select>
									</div>
								   </div>
									<div align="left">
									  <label class="control-label">Perform / Session</label>
									</div>
									<div class="controls">
									  <div align="left">
										<select class="chosen-select chosen-transparent form-control repeat1" name="repeat[]" id="repeat" >
										  <option value="-1" selected>__________</option>
										  <option value="1">1 Time</option>
										  <option value="2">2 Times</option>
										  <option value="3">3 Times</option>
										  <option value="4">4 Times</option>
										  <option value="5">5 Times</option>
										  <option value="6">6 Times</option>
										  <option value="7">7 Times</option>
										  <option value="8">8 Times</option>
										  <option value="9">9 Times</option>
										  <option value="10">10 Times</option>
										  <option value="11">11 Times</option>
										  <option value="12">12 Times</option>
										  <option value="13">13 Times</option>
										  <option value="14">14 Times</option>
										  <option value="15">15 Times</option>
										  <option value="16">16 Times</option>
										  <option value="17">17 Times</option>
										  <option value="18">18 Times</option>
										  <option value="19">19 Times</option>
										  <option value="20">20 Times</option>
										  <option value="21">21 Times</option>
										  <option value="22">22 Times</option>
										  <option value="23">23 Times</option>
										  <option value="24">24 Times</option>
										  <option value="25">25 Times</option>
										  <option value="26">26 Times</option>
										  <option value="27">27 Times</option>
										  <option value="28">28 Times</option>
										  <option value="29">29 Times</option>
										  <option value="30">30 Times</option>
										  <option value="31">31 Times</option>
										  <option value="32">32 Times</option>
										  <option value="33">33 Times</option>
										  <option value="34">34 Times</option>
										  <option value="35">35 Times</option>
										  <option value="36">36 Times</option>
										  <option value="37">37 Times</option>
										  <option value="38">38 Times</option>
										  <option value="39">39 Times</option>
										  <option value="40">40 Times</option>
										  <option value="41">41 Times</option>
										  <option value="42">42 Times</option>
										  <option value="43">43 Times</option>
										  <option value="44">44 Times</option>
										  <option value="45">45 Times</option>
										  <option value="46">46 Times</option>
										  <option value="47">47 Times</option>
										  <option value="48">48 Times</option>
										  <option value="49">49 Times</option>
										  <option value="50">50 Times</option>
										</select>
									  </div>
									</div>
									
								<div align="left">
									<label class="control-label">Complete</label>
								</div>
								<div class="controls">
								  <div align="left">
									<select class="chosen-select chosen-transparent form-control complete1" name="complete[]" id="complete" >
										<option value="-1" selected>__________</option>
											<option value="1">1 Set</option>
											<option value="2">2 Sets</option>
											<option value="3">3 Sets</option>
											<option value="4">4 Sets</option>
											<option value="5">5 Sets</option>
											<option value="6">6 Sets</option>
											<option value="7">7 Sets</option>
											<option value="8">8 Sets</option>
											<option value="9">9 Sets</option>
											<option value="10">10 Sets</option>
											<option value="11">11 Sets</option>
											<option value="12">12 Sets</option>
											<option value="13">13 Sets</option>
											<option value="14">14 Sets</option>
											<option value="15">15 Sets</option>
											<option value="16">16 Sets</option>
											<option value="17">17 Sets</option>
											<option value="18">18 Sets</option>
											<option value="19">19 Sets</option>
											<option value="20">20 Sets</option>
									</select>
								  </div>
								</div>
								
							</td>
							<?php $j = $j + 1;?>
						</tr>
						<?php }
						}
						if ($images11 != false) {
								foreach($images11 as $img){
									$text = $img['title'].PHP_EOL .PHP_EOL .PHP_EOL .$img['description'];
								?>
									
									<tr><td width="375" height="334">
										<div align="center"><img src="<?php echo 'https://www.physioplustech.in/uploads/exercise/'.$img['path'] ?>" width="260" height="272"  style="max-width:95%;border:2px dotted #545565;">
										<input type="hidden" id="path" name="path[]" value="<?php echo 'https://www.physioplustech.in/uploads/exercise/'.$img['path'] ?>" >
										</div>
									</td>
									<td width="300">
										<textarea class="form-control" rows="4" cols="50" style="width:300px; height:250px;" name="descr[]"><?php echo $img['description'] ?></textarea>
										<input type="hidden" id="title" name="title[]" value="<?php echo $img['title'] ?>" >
									</td>
									<td width="47"></td>
									<td width="310">
									<div align="left">
									  <label class="control-label">Hold</label>
									</div>
									<div class="controls">
									  <div align="left">
										<select  class="chosen-select chosen-transparent form-control hold1" name="hold[]" id="hold" >
										  <option value="-1">__________</option>
											<option value="0">0 Seconds</option>
											<option value="1">1 Second</option>
											<option value="2">2 Seconds</option>
											<option value="3">3 Seconds</option>
											<option value="4">4 Seconds</option>
											<option value="5">5 Seconds</option>
											<option value="6">6 Seconds</option>
											<option value="7">7 Seconds</option>
											<option value="8">8 Seconds</option>
											<option value="9">9 Seconds</option>
											<option value="10">10 Seconds</option>
											<option value="11">11 Seconds</option>
											<option value="12">12 Seconds</option>
											<option value="13">13 Seconds</option>
											<option value="14">14 Seconds</option>
											<option value="15">15 Seconds</option>
											<option value="20">20 Seconds</option>
											<option value="25">25 Seconds</option>
											<option value="30">30 Seconds</option>
											<option value="35">35 Seconds</option>
											<option value="45">45 Seconds</option>
											<option value="60">1 Minute</option>
											<option value="120">2 Minutes</option>
											<option value="180">3 Minutes</option>
											<option value="240">4 Minutes</option>
											<option value="300">5 Minutes</option>
											<option value="360">6 Minutes</option>
											<option value="420">7 Minutes</option>
											<option value="480">8 Minutes</option>
											<option value="540">9 Minutes</option>
											<option value="600">10 Minutes</option>
											<option value="720">12 Minutes</option>
											<option value="900">15 Minutes</option>
											<option value="1200">20 Minutes</option>
											<option value="1500">25 Minutes</option>
											<option value="1800">30 Minutes</option>
										</select>
									</div>
								   </div>
									<div align="left">
									  <label class="control-label">Perform / Session</label>
									</div>
									<div class="controls">
									  <div align="left">
										<select class="chosen-select chosen-transparent form-control repeat1" name="repeat[]" id="repeat" >
										  <option value="-1" selected>__________</option>
										  <option value="1">1 Time</option>
										  <option value="2">2 Times</option>
										  <option value="3">3 Times</option>
										  <option value="4">4 Times</option>
										  <option value="5">5 Times</option>
										  <option value="6">6 Times</option>
										  <option value="7">7 Times</option>
										  <option value="8">8 Times</option>
										  <option value="9">9 Times</option>
										  <option value="10">10 Times</option>
										  <option value="11">11 Times</option>
										  <option value="12">12 Times</option>
										  <option value="13">13 Times</option>
										  <option value="14">14 Times</option>
										  <option value="15">15 Times</option>
										  <option value="16">16 Times</option>
										  <option value="17">17 Times</option>
										  <option value="18">18 Times</option>
										  <option value="19">19 Times</option>
										  <option value="20">20 Times</option>
										  <option value="21">21 Times</option>
										  <option value="22">22 Times</option>
										  <option value="23">23 Times</option>
										  <option value="24">24 Times</option>
										  <option value="25">25 Times</option>
										  <option value="26">26 Times</option>
										  <option value="27">27 Times</option>
										  <option value="28">28 Times</option>
										  <option value="29">29 Times</option>
										  <option value="30">30 Times</option>
										  <option value="31">31 Times</option>
										  <option value="32">32 Times</option>
										  <option value="33">33 Times</option>
										  <option value="34">34 Times</option>
										  <option value="35">35 Times</option>
										  <option value="36">36 Times</option>
										  <option value="37">37 Times</option>
										  <option value="38">38 Times</option>
										  <option value="39">39 Times</option>
										  <option value="40">40 Times</option>
										  <option value="41">41 Times</option>
										  <option value="42">42 Times</option>
										  <option value="43">43 Times</option>
										  <option value="44">44 Times</option>
										  <option value="45">45 Times</option>
										  <option value="46">46 Times</option>
										  <option value="47">47 Times</option>
										  <option value="48">48 Times</option>
										  <option value="49">49 Times</option>
										  <option value="50">50 Times</option>
										</select>
									  </div>
									</div>
									
								<div align="left">
									<label class="control-label">Complete</label>
								</div>
								<div class="controls">
								  <div align="left">
									<select class="chosen-select chosen-transparent form-control complete1" name="complete[]" id="complete" >
										<option value="-1" selected>__________</option>
											<option value="1">1 Set</option>
											<option value="2">2 Sets</option>
											<option value="3">3 Sets</option>
											<option value="4">4 Sets</option>
											<option value="5">5 Sets</option>
											<option value="6">6 Sets</option>
											<option value="7">7 Sets</option>
											<option value="8">8 Sets</option>
											<option value="9">9 Sets</option>
											<option value="10">10 Sets</option>
											<option value="11">11 Sets</option>
											<option value="12">12 Sets</option>
											<option value="13">13 Sets</option>
											<option value="14">14 Sets</option>
											<option value="15">15 Sets</option>
											<option value="16">16 Sets</option>
											<option value="17">17 Sets</option>
											<option value="18">18 Sets</option>
											<option value="19">19 Sets</option>
											<option value="20">20 Sets</option>
									</select>
								  </div>
								</div>
								
							</td>
							<?php $j = $j + 1;?>
						</tr>
						<?php }
						}
						if ($images12 != false) {
								foreach($images12 as $img){
									$text = $img['title'].PHP_EOL .PHP_EOL .PHP_EOL .$img['description'];
								?>
									
									<tr><td width="375" height="334">
										<div align="center"><img src="<?php echo 'https://www.physioplustech.in/uploads/exercise/'.$img['path'] ?>" width="260" height="272"  style="max-width:95%;border:2px dotted #545565;">
										<input type="hidden" id="path" name="path[]" value="<?php echo 'https://www.physioplustech.in/uploads/exercise/'.$img['path'] ?>" >
										</div>
									</td>
									<td width="300">
										<textarea class="form-control" rows="4" cols="50" style="width:300px; height:250px;" name="descr[]"><?php echo $img['description'] ?></textarea>
										<input type="hidden" id="title" name="title[]" value="<?php echo $img['title'] ?>" >
									</td>
									<td width="47"></td>
									<td width="310">
									<div align="left">
									  <label class="control-label">Hold</label>
									</div>
									<div class="controls">
									  <div align="left">
										<select  class="chosen-select chosen-transparent form-control hold1" name="hold[]" id="hold" >
										  <option value="-1">__________</option>
											<option value="0">0 Seconds</option>
											<option value="1">1 Second</option>
											<option value="2">2 Seconds</option>
											<option value="3">3 Seconds</option>
											<option value="4">4 Seconds</option>
											<option value="5">5 Seconds</option>
											<option value="6">6 Seconds</option>
											<option value="7">7 Seconds</option>
											<option value="8">8 Seconds</option>
											<option value="9">9 Seconds</option>
											<option value="10">10 Seconds</option>
											<option value="11">11 Seconds</option>
											<option value="12">12 Seconds</option>
											<option value="13">13 Seconds</option>
											<option value="14">14 Seconds</option>
											<option value="15">15 Seconds</option>
											<option value="20">20 Seconds</option>
											<option value="25">25 Seconds</option>
											<option value="30">30 Seconds</option>
											<option value="35">35 Seconds</option>
											<option value="45">45 Seconds</option>
											<option value="60">1 Minute</option>
											<option value="120">2 Minutes</option>
											<option value="180">3 Minutes</option>
											<option value="240">4 Minutes</option>
											<option value="300">5 Minutes</option>
											<option value="360">6 Minutes</option>
											<option value="420">7 Minutes</option>
											<option value="480">8 Minutes</option>
											<option value="540">9 Minutes</option>
											<option value="600">10 Minutes</option>
											<option value="720">12 Minutes</option>
											<option value="900">15 Minutes</option>
											<option value="1200">20 Minutes</option>
											<option value="1500">25 Minutes</option>
											<option value="1800">30 Minutes</option>
										</select>
									</div>
								   </div>
									<div align="left">
									  <label class="control-label">Perform / Session</label>
									</div>
									<div class="controls">
									  <div align="left">
										<select class="chosen-select chosen-transparent form-control repeat1" name="repeat[]" id="repeat" >
										  <option value="-1" selected>__________</option>
										  <option value="1">1 Time</option>
										  <option value="2">2 Times</option>
										  <option value="3">3 Times</option>
										  <option value="4">4 Times</option>
										  <option value="5">5 Times</option>
										  <option value="6">6 Times</option>
										  <option value="7">7 Times</option>
										  <option value="8">8 Times</option>
										  <option value="9">9 Times</option>
										  <option value="10">10 Times</option>
										  <option value="11">11 Times</option>
										  <option value="12">12 Times</option>
										  <option value="13">13 Times</option>
										  <option value="14">14 Times</option>
										  <option value="15">15 Times</option>
										  <option value="16">16 Times</option>
										  <option value="17">17 Times</option>
										  <option value="18">18 Times</option>
										  <option value="19">19 Times</option>
										  <option value="20">20 Times</option>
										  <option value="21">21 Times</option>
										  <option value="22">22 Times</option>
										  <option value="23">23 Times</option>
										  <option value="24">24 Times</option>
										  <option value="25">25 Times</option>
										  <option value="26">26 Times</option>
										  <option value="27">27 Times</option>
										  <option value="28">28 Times</option>
										  <option value="29">29 Times</option>
										  <option value="30">30 Times</option>
										  <option value="31">31 Times</option>
										  <option value="32">32 Times</option>
										  <option value="33">33 Times</option>
										  <option value="34">34 Times</option>
										  <option value="35">35 Times</option>
										  <option value="36">36 Times</option>
										  <option value="37">37 Times</option>
										  <option value="38">38 Times</option>
										  <option value="39">39 Times</option>
										  <option value="40">40 Times</option>
										  <option value="41">41 Times</option>
										  <option value="42">42 Times</option>
										  <option value="43">43 Times</option>
										  <option value="44">44 Times</option>
										  <option value="45">45 Times</option>
										  <option value="46">46 Times</option>
										  <option value="47">47 Times</option>
										  <option value="48">48 Times</option>
										  <option value="49">49 Times</option>
										  <option value="50">50 Times</option>
										</select>
									  </div>
									</div>
									
								<div align="left">
									<label class="control-label">Complete</label>
								</div>
								<div class="controls">
								  <div align="left">
									<select class="chosen-select chosen-transparent form-control complete1" name="complete[]" id="complete" >
										<option value="-1" selected>__________</option>
											<option value="1">1 Set</option>
											<option value="2">2 Sets</option>
											<option value="3">3 Sets</option>
											<option value="4">4 Sets</option>
											<option value="5">5 Sets</option>
											<option value="6">6 Sets</option>
											<option value="7">7 Sets</option>
											<option value="8">8 Sets</option>
											<option value="9">9 Sets</option>
											<option value="10">10 Sets</option>
											<option value="11">11 Sets</option>
											<option value="12">12 Sets</option>
											<option value="13">13 Sets</option>
											<option value="14">14 Sets</option>
											<option value="15">15 Sets</option>
											<option value="16">16 Sets</option>
											<option value="17">17 Sets</option>
											<option value="18">18 Sets</option>
											<option value="19">19 Sets</option>
											<option value="20">20 Sets</option>
									</select>
								  </div>
								</div>
								
							</td>
							<?php $j = $j + 1;?>
						</tr>
						<?php }
						}
						if ($images13 != false) {
								foreach($images13 as $img){
									$text = $img['title'].PHP_EOL .PHP_EOL .PHP_EOL .$img['description'];
								?>
									
									<tr><td width="375" height="334">
										<div align="center"><img src="<?php echo 'https://www.physioplustech.in/uploads/exercise/'.$img['path'] ?>" width="260" height="272"  style="max-width:95%;border:2px dotted #545565;">
										<input type="hidden" id="path" name="path[]" value="<?php echo 'https://www.physioplustech.in/uploads/exercise/'.$img['path'] ?>" >
										</div>
									</td>
									<td width="300">
										<textarea class="form-control" rows="4" cols="50" style="width:300px; height:250px;" name="descr[]"><?php echo $img['description'] ?></textarea>
										<input type="hidden" id="title" name="title[]" value="<?php echo $img['title'] ?>" >
									</td>
									<td width="47"></td>
									<td width="310">
									<div align="left">
									  <label class="control-label">Hold</label>
									</div>
									<div class="controls">
									  <div align="left">
										<select  class="chosen-select chosen-transparent form-control hold1" name="hold[]" id="hold" >
										  <option value="-1">__________</option>
											<option value="0">0 Seconds</option>
											<option value="1">1 Second</option>
											<option value="2">2 Seconds</option>
											<option value="3">3 Seconds</option>
											<option value="4">4 Seconds</option>
											<option value="5">5 Seconds</option>
											<option value="6">6 Seconds</option>
											<option value="7">7 Seconds</option>
											<option value="8">8 Seconds</option>
											<option value="9">9 Seconds</option>
											<option value="10">10 Seconds</option>
											<option value="11">11 Seconds</option>
											<option value="12">12 Seconds</option>
											<option value="13">13 Seconds</option>
											<option value="14">14 Seconds</option>
											<option value="15">15 Seconds</option>
											<option value="20">20 Seconds</option>
											<option value="25">25 Seconds</option>
											<option value="30">30 Seconds</option>
											<option value="35">35 Seconds</option>
											<option value="45">45 Seconds</option>
											<option value="60">1 Minute</option>
											<option value="120">2 Minutes</option>
											<option value="180">3 Minutes</option>
											<option value="240">4 Minutes</option>
											<option value="300">5 Minutes</option>
											<option value="360">6 Minutes</option>
											<option value="420">7 Minutes</option>
											<option value="480">8 Minutes</option>
											<option value="540">9 Minutes</option>
											<option value="600">10 Minutes</option>
											<option value="720">12 Minutes</option>
											<option value="900">15 Minutes</option>
											<option value="1200">20 Minutes</option>
											<option value="1500">25 Minutes</option>
											<option value="1800">30 Minutes</option>
										</select>
									</div>
								</div>
									<div align="left">
									  <label class="control-label">Perform / Session</label>
									</div>
									<div class="controls">
									  <div align="left">
										<select class="chosen-select chosen-transparent form-control repeat1" name="repeat[]" id="repeat" >
										  <option value="-1" selected>__________</option>
										  <option value="1">1 Time</option>
										  <option value="2">2 Times</option>
										  <option value="3">3 Times</option>
										  <option value="4">4 Times</option>
										  <option value="5">5 Times</option>
										  <option value="6">6 Times</option>
										  <option value="7">7 Times</option>
										  <option value="8">8 Times</option>
										  <option value="9">9 Times</option>
										  <option value="10">10 Times</option>
										  <option value="11">11 Times</option>
										  <option value="12">12 Times</option>
										  <option value="13">13 Times</option>
										  <option value="14">14 Times</option>
										  <option value="15">15 Times</option>
										  <option value="16">16 Times</option>
										  <option value="17">17 Times</option>
										  <option value="18">18 Times</option>
										  <option value="19">19 Times</option>
										  <option value="20">20 Times</option>
										  <option value="21">21 Times</option>
										  <option value="22">22 Times</option>
										  <option value="23">23 Times</option>
										  <option value="24">24 Times</option>
										  <option value="25">25 Times</option>
										  <option value="26">26 Times</option>
										  <option value="27">27 Times</option>
										  <option value="28">28 Times</option>
										  <option value="29">29 Times</option>
										  <option value="30">30 Times</option>
										  <option value="31">31 Times</option>
										  <option value="32">32 Times</option>
										  <option value="33">33 Times</option>
										  <option value="34">34 Times</option>
										  <option value="35">35 Times</option>
										  <option value="36">36 Times</option>
										  <option value="37">37 Times</option>
										  <option value="38">38 Times</option>
										  <option value="39">39 Times</option>
										  <option value="40">40 Times</option>
										  <option value="41">41 Times</option>
										  <option value="42">42 Times</option>
										  <option value="43">43 Times</option>
										  <option value="44">44 Times</option>
										  <option value="45">45 Times</option>
										  <option value="46">46 Times</option>
										  <option value="47">47 Times</option>
										  <option value="48">48 Times</option>
										  <option value="49">49 Times</option>
										  <option value="50">50 Times</option>
										</select>
									  </div>
									</div>
									
								<div align="left">
									<label class="control-label">Complete</label>
								</div>
								<div class="controls">
								  <div align="left">
									<select class="chosen-select chosen-transparent form-control complete1" name="complete[]" id="complete" >
										<option value="-1" selected>__________</option>
											<option value="1">1 Set</option>
											<option value="2">2 Sets</option>
											<option value="3">3 Sets</option>
											<option value="4">4 Sets</option>
											<option value="5">5 Sets</option>
											<option value="6">6 Sets</option>
											<option value="7">7 Sets</option>
											<option value="8">8 Sets</option>
											<option value="9">9 Sets</option>
											<option value="10">10 Sets</option>
											<option value="11">11 Sets</option>
											<option value="12">12 Sets</option>
											<option value="13">13 Sets</option>
											<option value="14">14 Sets</option>
											<option value="15">15 Sets</option>
											<option value="16">16 Sets</option>
											<option value="17">17 Sets</option>
											<option value="18">18 Sets</option>
											<option value="19">19 Sets</option>
											<option value="20">20 Sets</option>
									</select>
								  </div>
								</div>
								
							</td>
							<?php $j = $j + 1;?>
						</tr>
						<?php }
						}
						if ($images14 != false) {
								foreach($images14 as $img){
									$text = $img['title'].PHP_EOL .PHP_EOL .PHP_EOL .$img['description'];
								?>
									
									<tr><td width="375" height="334">
										<div align="center"><img src="<?php echo 'https://www.physioplustech.in/uploads/exercise/'.$img['path'] ?>" width="260" height="272"  style="max-width:95%;border:2px dotted #545565;">
										<input type="hidden" id="path" name="path[]" value="<?php echo 'https://www.physioplustech.in/uploads/exercise/'.$img['path'] ?>" >
										</div>
									</td>
									<td width="300">
										<textarea class="form-control" rows="4" cols="50" style="width:300px; height:250px;" name="descr[]"><?php echo $img['description'] ?></textarea>
										<input type="hidden" id="title" name="title[]" value="<?php echo $img['title'] ?>" >
									</td>
									<td width="47"></td>
									<td width="310">
									<div align="left">
									  <label class="control-label">Hold</label>
									</div>
									<div class="controls">
									  <div align="left">
										<select  class="chosen-select chosen-transparent form-control hold1" name="hold[]" id="hold" >
										  <option value="-1">__________</option>
											<option value="0">0 Seconds</option>
											<option value="1">1 Second</option>
											<option value="2">2 Seconds</option>
											<option value="3">3 Seconds</option>
											<option value="4">4 Seconds</option>
											<option value="5">5 Seconds</option>
											<option value="6">6 Seconds</option>
											<option value="7">7 Seconds</option>
											<option value="8">8 Seconds</option>
											<option value="9">9 Seconds</option>
											<option value="10">10 Seconds</option>
											<option value="11">11 Seconds</option>
											<option value="12">12 Seconds</option>
											<option value="13">13 Seconds</option>
											<option value="14">14 Seconds</option>
											<option value="15">15 Seconds</option>
											<option value="20">20 Seconds</option>
											<option value="25">25 Seconds</option>
											<option value="30">30 Seconds</option>
											<option value="35">35 Seconds</option>
											<option value="45">45 Seconds</option>
											<option value="60">1 Minute</option>
											<option value="120">2 Minutes</option>
											<option value="180">3 Minutes</option>
											<option value="240">4 Minutes</option>
											<option value="300">5 Minutes</option>
											<option value="360">6 Minutes</option>
											<option value="420">7 Minutes</option>
											<option value="480">8 Minutes</option>
											<option value="540">9 Minutes</option>
											<option value="600">10 Minutes</option>
											<option value="720">12 Minutes</option>
											<option value="900">15 Minutes</option>
											<option value="1200">20 Minutes</option>
											<option value="1500">25 Minutes</option>
											<option value="1800">30 Minutes</option>
										</select>
									</div>
									</div>
									<div align="left">
									  <label class="control-label">Perform / Session</label>
									</div>
									<div class="controls">
									  <div align="left">
										<select class="chosen-select chosen-transparent form-control repeat1" name="repeat[]" id="repeat" >
										  <option value="-1" selected>__________</option>
										  <option value="1">1 Time</option>
										  <option value="2">2 Times</option>
										  <option value="3">3 Times</option>
										  <option value="4">4 Times</option>
										  <option value="5">5 Times</option>
										  <option value="6">6 Times</option>
										  <option value="7">7 Times</option>
										  <option value="8">8 Times</option>
										  <option value="9">9 Times</option>
										  <option value="10">10 Times</option>
										  <option value="11">11 Times</option>
										  <option value="12">12 Times</option>
										  <option value="13">13 Times</option>
										  <option value="14">14 Times</option>
										  <option value="15">15 Times</option>
										  <option value="16">16 Times</option>
										  <option value="17">17 Times</option>
										  <option value="18">18 Times</option>
										  <option value="19">19 Times</option>
										  <option value="20">20 Times</option>
										  <option value="21">21 Times</option>
										  <option value="22">22 Times</option>
										  <option value="23">23 Times</option>
										  <option value="24">24 Times</option>
										  <option value="25">25 Times</option>
										  <option value="26">26 Times</option>
										  <option value="27">27 Times</option>
										  <option value="28">28 Times</option>
										  <option value="29">29 Times</option>
										  <option value="30">30 Times</option>
										  <option value="31">31 Times</option>
										  <option value="32">32 Times</option>
										  <option value="33">33 Times</option>
										  <option value="34">34 Times</option>
										  <option value="35">35 Times</option>
										  <option value="36">36 Times</option>
										  <option value="37">37 Times</option>
										  <option value="38">38 Times</option>
										  <option value="39">39 Times</option>
										  <option value="40">40 Times</option>
										  <option value="41">41 Times</option>
										  <option value="42">42 Times</option>
										  <option value="43">43 Times</option>
										  <option value="44">44 Times</option>
										  <option value="45">45 Times</option>
										  <option value="46">46 Times</option>
										  <option value="47">47 Times</option>
										  <option value="48">48 Times</option>
										  <option value="49">49 Times</option>
										  <option value="50">50 Times</option>
										</select>
									  </div>
									</div>
									
								<div align="left">
									<label class="control-label">Complete</label>
								</div>
								<div class="controls">
								  <div align="left">
									<select class="chosen-select chosen-transparent form-control complete1" name="complete[]" id="complete" >
										<option value="-1" selected>__________</option>
											<option value="1">1 Set</option>
											<option value="2">2 Sets</option>
											<option value="3">3 Sets</option>
											<option value="4">4 Sets</option>
											<option value="5">5 Sets</option>
											<option value="6">6 Sets</option>
											<option value="7">7 Sets</option>
											<option value="8">8 Sets</option>
											<option value="9">9 Sets</option>
											<option value="10">10 Sets</option>
											<option value="11">11 Sets</option>
											<option value="12">12 Sets</option>
											<option value="13">13 Sets</option>
											<option value="14">14 Sets</option>
											<option value="15">15 Sets</option>
											<option value="16">16 Sets</option>
											<option value="17">17 Sets</option>
											<option value="18">18 Sets</option>
											<option value="19">19 Sets</option>
											<option value="20">20 Sets</option>
									</select>
								  </div>
								</div>
								
							</td>
							<?php $j = $j + 1;?>
						</tr>
						<?php }
						}
						if ($images15 != false) {
								foreach($images15 as $img){
									$text = $img['title'].PHP_EOL .PHP_EOL .PHP_EOL .$img['description'];
								?>
									
									<tr><td width="375" height="334">
										<div align="center"><img src="<?php echo 'https://www.physioplustech.in/uploads/exercise/'.$img['path'] ?>" width="260" height="272"  style="max-width:95%;border:2px dotted #545565;">
										<input type="hidden" id="path" name="path[]" value="<?php echo 'https://www.physioplustech.in/uploads/exercise/'.$img['path'] ?>" >
										</div>
									</td>
									<td width="300">
										<textarea class="form-control" rows="4" cols="50" style="width:300px; height:250px;" name="descr[]"><?php echo $img['description'] ?></textarea>
										<input type="hidden" id="title" name="title[]" value="<?php echo $img['title'] ?>" >
									</td>
									<td width="47"></td>
									<td width="310">
									<div align="left">
									  <label class="control-label">Hold</label>
									</div>
									<div class="controls">
									  <div align="left">
										<select  class="chosen-select chosen-transparent form-control hold1" name="hold[]" id="hold" >
										  <option value="-1">__________</option>
											<option value="0">0 Seconds</option>
											<option value="1">1 Second</option>
											<option value="2">2 Seconds</option>
											<option value="3">3 Seconds</option>
											<option value="4">4 Seconds</option>
											<option value="5">5 Seconds</option>
											<option value="6">6 Seconds</option>
											<option value="7">7 Seconds</option>
											<option value="8">8 Seconds</option>
											<option value="9">9 Seconds</option>
											<option value="10">10 Seconds</option>
											<option value="11">11 Seconds</option>
											<option value="12">12 Seconds</option>
											<option value="13">13 Seconds</option>
											<option value="14">14 Seconds</option>
											<option value="15">15 Seconds</option>
											<option value="20">20 Seconds</option>
											<option value="25">25 Seconds</option>
											<option value="30">30 Seconds</option>
											<option value="35">35 Seconds</option>
											<option value="45">45 Seconds</option>
											<option value="60">1 Minute</option>
											<option value="120">2 Minutes</option>
											<option value="180">3 Minutes</option>
											<option value="240">4 Minutes</option>
											<option value="300">5 Minutes</option>
											<option value="360">6 Minutes</option>
											<option value="420">7 Minutes</option>
											<option value="480">8 Minutes</option>
											<option value="540">9 Minutes</option>
											<option value="600">10 Minutes</option>
											<option value="720">12 Minutes</option>
											<option value="900">15 Minutes</option>
											<option value="1200">20 Minutes</option>
											<option value="1500">25 Minutes</option>
											<option value="1800">30 Minutes</option>
										</select>
									</div>
								</div>
									<div align="left">
									  <label class="control-label">Perform / Session </label>
									</div>
									<div class="controls">
									  <div align="left">
										<select class="chosen-select chosen-transparent form-control repeat1" name="repeat[]" id="repeat" >
										  <option value="-1" selected>__________</option>
										  <option value="1">1 Time</option>
										  <option value="2">2 Times</option>
										  <option value="3">3 Times</option>
										  <option value="4">4 Times</option>
										  <option value="5">5 Times</option>
										  <option value="6">6 Times</option>
										  <option value="7">7 Times</option>
										  <option value="8">8 Times</option>
										  <option value="9">9 Times</option>
										  <option value="10">10 Times</option>
										  <option value="11">11 Times</option>
										  <option value="12">12 Times</option>
										  <option value="13">13 Times</option>
										  <option value="14">14 Times</option>
										  <option value="15">15 Times</option>
										  <option value="16">16 Times</option>
										  <option value="17">17 Times</option>
										  <option value="18">18 Times</option>
										  <option value="19">19 Times</option>
										  <option value="20">20 Times</option>
										  <option value="21">21 Times</option>
										  <option value="22">22 Times</option>
										  <option value="23">23 Times</option>
										  <option value="24">24 Times</option>
										  <option value="25">25 Times</option>
										  <option value="26">26 Times</option>
										  <option value="27">27 Times</option>
										  <option value="28">28 Times</option>
										  <option value="29">29 Times</option>
										  <option value="30">30 Times</option>
										  <option value="31">31 Times</option>
										  <option value="32">32 Times</option>
										  <option value="33">33 Times</option>
										  <option value="34">34 Times</option>
										  <option value="35">35 Times</option>
										  <option value="36">36 Times</option>
										  <option value="37">37 Times</option>
										  <option value="38">38 Times</option>
										  <option value="39">39 Times</option>
										  <option value="40">40 Times</option>
										  <option value="41">41 Times</option>
										  <option value="42">42 Times</option>
										  <option value="43">43 Times</option>
										  <option value="44">44 Times</option>
										  <option value="45">45 Times</option>
										  <option value="46">46 Times</option>
										  <option value="47">47 Times</option>
										  <option value="48">48 Times</option>
										  <option value="49">49 Times</option>
										  <option value="50">50 Times</option>
										</select>
									  </div>
									</div>
									
								<div align="left">
									<label class="control-label">Complete</label>
								</div>
								<div class="controls">
								  <div align="left">
									<select class="chosen-select chosen-transparent form-control complete1" name="complete[]" id="complete" >
										<option value="-1" selected>__________</option>
											<option value="1">1 Set</option>
											<option value="2">2 Sets</option>
											<option value="3">3 Sets</option>
											<option value="4">4 Sets</option>
											<option value="5">5 Sets</option>
											<option value="6">6 Sets</option>
											<option value="7">7 Sets</option>
											<option value="8">8 Sets</option>
											<option value="9">9 Sets</option>
											<option value="10">10 Sets</option>
											<option value="11">11 Sets</option>
											<option value="12">12 Sets</option>
											<option value="13">13 Sets</option>
											<option value="14">14 Sets</option>
											<option value="15">15 Sets</option>
											<option value="16">16 Sets</option>
											<option value="17">17 Sets</option>
											<option value="18">18 Sets</option>
											<option value="19">19 Sets</option>
											<option value="20">20 Sets</option>
									</select>
								  </div>
								</div>
								
							</td>
							<?php $j = $j + 1;?>
						</tr>
						<?php }
						}
						

						}
						?>
					<tr>
					<td></td>
					<td><button type="submit" class="mb-2 mr-2 btn-pill btn btn-primary" id="save"> <i class="fa fa-save"></i> Save</button> </li>
					<a class="mb-2 mr-2 btn btn-pill btn-gradient-alternate btn-sm" href="<?php echo base_url().'client/exercise/public_exercise' ?>" id="add_more"> <i class="fa fa-plus"></i> Add More Exercise</a> </li></td>  
					</tr>
					</table>
				<?php } ?>
				</form>
				</div>
				 </div>
                </section>
                </div>
                </div>
             </div>
            </div>  
          </div>
         





      </div>
      <!-- Make page fluid-->




    </div>
	</div>
	<div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Exercise Chart Has Been Added Successfully</div></div></div>
    <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Exercise Chart Has Not Been Added Successfully</div></div></div>

   <div class="app-drawer-overlay d-none animated fadeIn"></div>
<script src="<?php  echo base_url();  ?>assets/js/code.jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>my_assets/assets/scripts/main.js"></script>
 
<script src="<?php echo base_url() ?>assets/js/dough.js"></script>
<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
 
	<script>
	
   $(function(){
		$('#perform').change(function(){
			var value = $(this).val();
			var newOption = $('<option value = ' + value + ' selected>' + value + '</option>');
			$('.perform1').append(newOption);
			$('.perform1').trigger("chosen:updated");
		});
		$('#repeat').change(function(){
			var value = $(this).val();
			var newOption = $('<option value = ' + value + ' selected>' + value + '</option>');
			$('.repeat1').append(newOption);
			$('.repeat1').trigger("chosen:updated");
		});
		$('#Opt0').click(function() {
			$('.sun').prop('checked', this.checked);
		});
		$('#mon0').click(function() {
			$('.mon').prop('checked', this.checked);
		});
		$('#tue0').click(function() {
			$('.tue').prop('checked', this.checked);
		});
		$('#wed0').click(function() {
			$('.wed').prop('checked', this.checked);
		});
		$('#thu0').click(function() {
			$('.thu').prop('checked', this.checked);
		});
		$('#fri0').click(function() {
			
			$('.fri').prop('checked', this.checked);
		});
		$('#sat0').click(function() {
			
			$('.sat').prop('checked', this.checked);
		});
		
		$('.day_view').hide();
		$('#time').change(function(){
			var value = $(this).val();
			if(value == 'a Week'){
				$('.day_view').show();
				$('.sun').prop('checked', false);
				$('.mon').prop('checked', false);
				$('.tue').prop('checked', false);
				$('.wed').prop('checked',false);
				$('.thu').prop('checked', false);
				$('.sat').prop('checked', false);
				$('.fri').prop('checked', false);
			}
			else if(value == 'a Day'){
				$('.sun').prop('checked', 'checked');
				$('.mon').prop('checked', 'checked');
				$('.tue').prop('checked', 'checked');
				$('.wed').prop('checked','checked');
				$('.thu').prop('checked', 'checked');
				$('.sat').prop('checked', 'checked');
				$('.fri').prop('checked', 'checked');
				$('.day_view').show();
			} else {
				$('.day_view').hide();
			}
			var newOption = $('<option value = ' + value + ' selected>' + value + '</option>');
			$('.time1').append(newOption);
			$('.time1').trigger("chosen:updated");
		});
		$('#hold').change(function(){
			var value = $(this).val();
			var newOption = $('<option value = ' + value + ' selected>' + value + '</option>');
			$('.hold1').append(newOption);
			$('.hold1').trigger("chosen:updated");
		});
		$('#complete').change(function(){
			var value = $(this).val();
			var newOption = $('<option value = ' + value + ' selected>' + value + '</option>');
			$('.complete1').append(newOption);
			$('.complete1').trigger("chosen:updated");
		});
	})
	$(document).ready(function() {
		$('#name').change(function() {
		var val=$('#name').val();
		var spl=val.split('/');
		if(spl[2]!=""){
		$('#email').val(spl[2]);
		}
		else{
			$('#email').val('No Email Found');
		}
		
		});
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
            url: $(this).attr('action'),
			data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				
				$('#toast-container').show();
				setTimeout(function(){
				if (document.cookie) {
								var cookies = document.cookie.split('; ');
								$.each(cookies, function(index, cookie) {
									cookie = cookie.split('=');
									str = cookie[0];
									if(str.indexOf("imgid") >= 0){
										$.dough( cookie[0], 'remove' );
									}
								});
					}					
					window.location = '<?php echo base_url().'client/exercise/chartlist/' ?>';
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
  </body>
</html>
      