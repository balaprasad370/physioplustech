<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Chart edit - Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
    <link href="<?php echo base_url()?>my_assets/main.css" rel="stylesheet">
 
	<script src="<?php echo base_url() ?>assets/sweet-alert/sweetalert.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/sweet-alert/sweetalert.css">
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
				<div class="card-header">Edit Chart
			    </div>
				 <div class="tabs-animation">
					<form class="form-horizontal" action="<?php echo base_url().'client/exercise/saveeditchart' ?>" method="post" parsley-validate id="signupForm">
				    <?php if($chart_det != false) { 
					$val =  count($chart_det);
						foreach($chart_det as $name){
							$pname = $name['patient_name'];	
							$cname = $name['chart_name'];	
							$cno = $name['chard_no'];	
						}
					?>
					
					<input type="hidden" name="chartno" id="chartno" value="<?php echo $cno ?>" class="form-control" >
					</br>
					<div class="table-responsive">
					<table class="table table-striped" width="1048" height="340">
					<tr><td><div align="center">Chart Name :</div></td><td colspan="3"><input type="text" class="form-control" name="chart_name"  value="<?php echo $cname ?>"></td></tr>
					
				<?php $i = 0;
					foreach($chart_det as $img){
							$CI =& get_instance();
					        $CI->load->model(array('exercise_model'));
							
							$id = explode('/',$img['img_path']);
							if($id[2] == 'www.physioplustech.in') {	
				?>
				<input type="hidden" value="<?php echo $img['chart_id'] ?>" name="chart_id[]" >
				<input type="hidden" value="<?php echo $img['img_path']; ?>" name="path[]" >
				<tr id="<?php echo $img['chart_id'] ?>"><td width="375" height="334">
						<div align="center"><img src="<?php echo $img['img_path']; ?>" width="260" height="272"  style="max-width:95%;border:2px dotted #545565;">
					    </div>
					</td>
					<td width="300">
						<textarea class="form-control" rows="4" cols="50" style="width:300px; height:250px;" name="descr[]"><?php echo $img['img_description'] ?></textarea>
					</td>
					<td width="50">
					</td>
					<td width="307">
					<div align="left">
                      <label class="control-label">Hold</label>
                    </div>
                    <div class="controls">
                      <div align="left">
                        <select  class="chosen-select chosen-transparent form-control hold1" id="hold" name="hold[]">
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
                        <select  class="chosen-select chosen-transparent form-control repeat1" id="repeat" name="repeat[]">							
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
					<select class="chosen-select chosen-transparent form-control complete1" id="complete" name="complete[]">
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
				</div></br>
				<center>
				<div align="center">
				<a class="btn btn-danger btn-pill delete_exercise" href="<?php echo '#'.$img['chart_id'] ?>"><i class="fa fa-trash-alt"></i></a>
						<?php if($i != 0) { ?>
					   <a class="btn btn-success btn-pill move_up"  href="<?php echo '#'.$img['chart_id'].'#'.$img['chard_no']; ?>" ><i class="fa fa-arrow-up"></i> </a>
						<?Php } if(($val-1) != $i) { ?><a class="btn btn-info btn-pill move_down"  href="<?php echo '#'.$img['chart_id'].'#'.$img['chard_no'] ?>" ><i class="fa fa-arrow-down"></i></a>				
						<?php } ?>
				</div>
				</center>
				</tr>
					<?php $i = $i+1; }  else { ?>
					<input type="hidden" value="<?php echo $img['chart_id'] ?>" name="chart_id[]" >
				<input type="hidden" value="<?php echo $img['img_path']; ?>" name="path[]" >
				<tr id="<?php echo $img['chart_id'] ?>"><td width="375" height="334">
						<div align="center"><img src="<?php echo 'https://exerciseprescriptions20.s3.ap-south-1.amazonaws.com/',$img['img_path']; ?>" width="260" height="272"  style="max-width:95%;border:2px dotted #545565;">
					    </div>
					</td>
					<td width="300">
						<textarea class="form-control" rows="4" cols="50" style="width:300px; height:250px;" name="descr[]"><?php echo $img['img_description'] ?></textarea>
					</td>
					<td width="50">
					</td>
					<td width="307">
					<div align="left">
                      <label class="control-label">Hold</label>
                    </div>
                    <div class="controls">
                      <div align="left">
                        <select  class="chosen-select chosen-transparent form-control hold1" id="hold" name="hold[]">
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
                        <select  class="chosen-select chosen-transparent form-control repeat1" id="repeat" name="repeat[]">							
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
					<select class="chosen-select chosen-transparent form-control complete1" id="complete" name="complete[]">
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
				</div></br>
				<center>
				<div align="center">
				<a class="btn btn-danger btn-pill delete_exercise" href="<?php echo '#'.$img['chart_id'] ?>"><i class="fa fa-trash-alt"></i></a>
						<?php if($i != 0) { ?>
					   <a class="btn btn-success btn-pill move_up"  href="<?php echo '#'.$img['chart_id'].'#'.$img['chard_no']; ?>" ><i class="fa fa-arrow-up"></i> </a>
						<?Php } if(($val-1) != $i) { ?><a class="btn btn-info btn-pill move_down"  href="<?php echo '#'.$img['chart_id'].'#'.$img['chard_no'] ?>" ><i class="fa fa-arrow-down"></i></a>				
						<?php } ?>
				</div>
				</center>
				</tr>	
					<?php } } }
					
				?>
				
				<tr><td></td>
					<td><button type="submit" class="btn btn-pill btn-primary btn-lg margin-bottom-20" id="save"> <i class="fa fa-save"></i> Update</button>
					&nbsp;&nbsp;<a href="<?Php echo base_url().'client/exercise/public_exercise/'.$this->uri->segment(4); ?> " class="btn btn-pill btn-alternate btn-lg margin-bottom-20"><i class="fa fa-plus"></i> ADD EXERCISE</a></td>
					
					<td></td></tr>
				</table>  
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
	<div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Exercise Chart Has Been Updated Successfully</div></div></div>
    <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Exercise Chart Has Not Been Updated Successfully</div></div></div>

   <div class="app-drawer-overlay d-none animated fadeIn"></div>
<script src="<?php  echo base_url();  ?>assets/js/code.jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>my_assets/assets/scripts/main.js"></script>
 
<script src="<?php echo base_url() ?>assets/js/dough.js"></script>
<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
 
	<script>
	
    $(document).ready(function() {
		  $('.add_exercise').click(function() {
			 var chartname = '<?Php echo $this->uri->segment(4) ?>';
			  window.location = '<?php echo base_url().'client/exercise/public_exercise/' ?>'+chartname;
		  });
		  $('.move_up').click(function ()  {
	
			var chard_no = $(this).attr('href').split('#')[2];
			var chart_id = $(this).attr('href').split('#')[1];
			var url='<?php echo base_url().'client/exercise/move_up/' ?>'+chart_id+'/'+chard_no;
			$.ajax({
					type: 'post',
					url: url,
					dataType:'json',
					success:function(data, textStatus, jqXHR,form) 
					{
						setTimeout(function(){ 
						  window.location.reload();
						}, 1000);
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						setTimeout(function(){ 
							window.location.reload();
						}, 1000);
					}
			  }); 
		});	
		$('.move_down').click(function ()  {
			var chard_no = $(this).attr('href').split('#')[2];
			var chart_id = $(this).attr('href').split('#')[1];
			var url='<?php echo base_url().'client/exercise/move_down/' ?>'+chart_id+'/'+chard_no;
			$.ajax({
					type: 'post',
					url: url,
					dataType:'json',
					success:function(data, textStatus, jqXHR,form) 
					{
						setTimeout(function(){ 
						  window.location.reload();
						}, 1000);
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						setTimeout(function(){ 
							window.location.reload();
						}, 1000);
					}
			  }); 
		});
		$('.delete_exercise').on('click', function () {
			var chart_id = $(this).attr('href').split('#')[1];
			swal({
			  title: "Confirmation",
			  text: "Are you sure you want to delete this patient record?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url : '<?php echo base_url().'client/exercise/delete_exercise' ?>',
					data : {c_id:chart_id},
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
						swal("Success!", "Your Exercise has been deleted!", "success");
						setTimeout(function(){ 
										window.location.reload();
									}, 1000);
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
							swal("Failure!", "Your Exercise has not been deleted!", "success");
						window.location.reload();
					}
				  });
			}); 
	});
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
		$('#time').change(function(){
			var value = $(this).val();
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
  $('form').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
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
				$('.md-close btn btn-default').click();
				window.location.href="<?php echo base_url().'client/exercise/chartlist'?>"
				}, 1000);
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$('#toast-container1').delay(5000).fadeOut(400);
				setTimeout(function(){ 
				$('.md-close btn btn-default').click();
				window.location.reload();
				}, 1000);
			}
      }); 
		
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
      