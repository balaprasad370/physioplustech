<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

<!DOCTYPE html>
<html lang="en"> 
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Physio Plus Tech</title>
    <link rel="icon" type="image/ico" href="<?php echo base_url() ?>assets/images/favicon.ico" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/jgrowl/css/jquery.jgrowl.min.css">
 
   
<style type="text/css">
.calendar {
    position: relative;
	font-family: 'Century Gothic','Segoe UI', Calibri, Arial;
	font-size: 12px;
	border-collapse: collapse;
	margin: 0; padding: 0;
	z-index: 4;
	border:1px solid rgba(0,0,0,0.08);
	width: 250px;
	color: #000;
	text-align: center;
	background-color: #FFF;
}
.calendar th,
.calendar td {
	text-align: center;
	-webki-ttransition: all 0.3s ease;
	-moz-transition: all 0.3s ease;
	transition: all 0.3s ease;
}
.calendar th:first-child,
.calendar td:first-child {
	margin-left: 5px;
}
.calendar span {
	padding: 6px 4px; 
	display: block;
}
.calendar .month {
	padding: 15px;
}

.calendar .pMDate, .calendar .nMDate { color: #AAA; }
.calendar .date, .calendar .pMDate, .calendar .nMDate, .calendar .month { cursor: pointer; }
.calendar .date:hover, .calendar .pMDate:hover, .calendar .nMDate:hover, .calendar .month:hover { background-color: #E2E2E2; }
.calendar .date:active, .calendar .pMDate:active, .calendar .nMDate:active, .calendar .month:active { background-color: #22A7F0; color: #FFF; }
.calendar .selected {
	background-color: #22A7F0 !important;
	color: #FFF !important;
}

.calendar tr:first-child th {
	background-color: #FFF;
	padding: 4px;
	padding-top: 8px;
	font-size: 14px;
}
.calendar tr:first-child th { cursor: pointer; color:#000; }
.calendar tr:first-child th:hover { color:#22A7F0; }
.calendar tr:first-child th:active { color: #22A7F0; }
.calendar thead tr:nth-child(2) th { color: #555; padding: 8px 3px; }
.calendar #prev, .calendar #next {
	font-family: 'Times New Roman';
	font-size: 20px;
	padding: 0;
}
.calendar #today {
	text-align: center; cursor: pointer;
	color: #22A7F0; padding: 10px 6px;
}
.calendar #today:hover { color: #80A7DD; }
.calendar #today:active { color: #000; }
.calendar #currDay { color:#22A7F0; }
.datepicker {
	background: #ffffff url('https://cdn4.iconfinder.com/data/icons/small-n-flat/24/calendar-128.png') no-repeat right top;
	background-size: 30px 30px;;
}
#deceased{
    background-color:#FFF3F5;
	padding-top:10px;
	margin-bottom:10px;
}
.remove_field{
	float:right;	
	cursor:pointer;
	position : absolute;
}
.remove_field:hover{
	text-decoration:none;
}
label {
font-size:12px;
}
</style>
   
	<script type='text/javascript'>
	$(function() {
		//calendar call function
		$('.datepicker').dcalendar();
		$('.datepicker').dcalendarpicker();

		    var max_fields = 10; 
		    var x = 1; 
		
		$('#add').click(function () {		   
			if(x < max_fields){ 
			    x++; 
			    $("#addblock").before('<div class="col-md-12 col-sm-12" id="deceased">	<a href="#" class="remove_field" title="Remove">X</a>	<div class="form-group col-md-3 col-sm-3">            <label for="name">Name*</label>            <input type="text" class="form-control input-sm" id="name" placeholder="">        </div>	<div class="form-group col-md-3 col-sm-3">            <label for="gender">Gender*</label>            <input type="text" class="form-control input-sm" id="gender" placeholder="">        </div>	<div class="form-group col-md-3 col-sm-3">            <label for="age">Age*</label>            <input type="text" class="form-control input-sm" id="age" placeholder="">        </div>	<div class="form-group col-md-3 col-sm-3">            <label for="DOB">Date of Birth or Exact Birth Year*</label>            <input type="text" class="form-control input-sm datepicker" id="DOB'+x+'" placeholder="">        </div>	<div class="form-group col-md-3 col-sm-3">            <label for="DOD">Date of Death or Exact Death Year*</label>             <input type="text" class="form-control input-sm datepicker" id="DOD'+x+'" placeholder="">        </div>	<div class="form-group col-md-3 col-sm-3">            <label for="mother">Deceased Person\'s Mother Name*</label>            <input type="text" class="form-control input-sm" id="mother" placeholder="">        </div>	<div class="form-group col-md-3 col-sm-3">            <label for="father">Deceased Person\'s Father Name*</label>            <input type="text" class="form-control input-sm" id="father" placeholder="">        </div>	<div class="form-group col-md-3 col-sm-3">	    <label for="photo">Upload Photo*</label>	    <input type="file" id="photo">	    <p class="help-block">Please upload individual photo. Group photo is not acceptable.</p>	</div></div>');

				$('.datepicker').dcalendarpicker();
			}  else{
				alert("Only 10 Names Allowed");
			}  
		});
		$(document).on('click', '.remove_field', function(e){
		        e.preventDefault(); 
			$(this).parent('div').remove(); 
			x--;
		});

		
	});
	</script>
  </head>
  <body>

<div class="panel panel-primary" style="margin:20px;">
	<div class="panel-heading">
        <center><h3 class="panel-title"><b><?php echo $clientDetails['clinic_name'];?></b></br>
		</br>Contributed by : <b>SRM Medical College Hospital And Research Centre, Chennai.</b>
		</br></br><b>Cardio - Respiratory Assessment</b>
		</center></h3>
	</div>
<div class="panel-body">
    <form action="<?php echo base_url().'assessment/update_cardio/"'?>" method="post">
	<input type="hidden" class="form-control" value="<?php echo $cardio_ass['assess_date']; ?>" name="assess_date" id="assess_date" placeholder="">
	<input type="hidden" class="form-control" value="<?php echo $patient['patient_id']; ?>" name="patient_id" id="patient_id" placeholder="">
  	 <input type="hidden" class="form-control" value="<?php echo $cardio_ass['cardio_id']; ?>" name="cardio_id" id="cardio_id" placeholder="">
     
	<div class="col-md-12 col-sm-12">
      <div class="form-group col-md-3 col-sm-6">
            <label for="1">NAME  *	</label>
            <input type="text" class="form-control input-sm" id="1" placeholder="" name="name" autocomplete="off" value="<?php echo $patient_info['first_name'];?>" readonly>
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="2">Age  *	</label>
            <input type="text" class="form-control input-sm" id="2" placeholder="" name="age" autocomplete="off" value="<?php echo $patient_info['age'];?>" readonly>
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="3">Sex  *	</label>
            </br><input type="radio" name="gender" <?php if($patient_info['gender'] == 'male'){ echo 'checked'; } else { } ?>  value="male" id="Male"  />
		    <label for="Male">Male&nbsp;&nbsp;</label>
		    <input type="radio" name="gender" <?php if($patient_info['gender'] == 'female'){ echo 'checked'; } else { } ?> value="female" id="female" />
		    <label for="female">Female&nbsp;&nbsp;</label>
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="4">OCCUPATION  *	</label>
            <input type="text" class="form-control input-sm" id="4" placeholder="" name="occupation" autocomplete="off" value="<?php echo $patient_info['occupation'];?>" readonly>
        </div>
		<!--<div class="form-group col-md-3 col-sm-6">
            <label for="5">UHID NO  	</label>
            <input type="text" class="form-control input-sm" id="5" placeholder="" name="uhid_no" autocomplete="off" value="<?php echo $cardio_ass['uhid_no'];?>">
        </div>-->
		<div class="form-group col-md-3 col-sm-6">
            <label for="5">Patient Code</label>
            <input type="text" class="form-control input-sm" id="5" value="<?php echo $patient_info['patient_code'];?>" readonly autocomplete="off">
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="6">DATE OF SURGERY/ DATE OF ADMISSION</label>
           <input type="text" class="form-control input-sm datepicker" id="6" placeholder="" name="date_admission" autocomplete="off" value="<?php echo $cardio_ass['date_admission'];?>">
         </div>
         <div class="form-group col-md-3 col-sm-6">
            <label for="7">DATE OF ASSESSMENT   </label>
           <input type="text" class="form-control input-sm datepicker" id="7" placeholder="" name="date_assessment" autocomplete="off" value="<?php echo $cardio_ass['date_assessment'];?>">
         </div>
	
		<div class="form-group col-md-3 col-sm-6">
            <label for="8">WARD   </label>
            <input type="text" class="form-control input-sm" id="8" placeholder="" name="ward" autocomplete="off" value="<?php echo $cardio_ass['ward'];?>">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="9">ADDRESS *</label>
             <textarea class="form-control input-sm" id="9" rows="3" name="address" autocomplete="off" readonly><?php echo $patient_info['address_line1'];?></textarea>
	  </div>

	  <div class="form-group col-md-6 col-sm-6">
            <label for="10">CHIEF COMPLAINT </label>
             <textarea class="form-control input-sm" id="10" rows="3" name="chief_complaint" autocomplete="off"><?php echo $cardio_ass['chief_complaint'];?></textarea>
	  </div>

	  <div class="form-group col-md-6 col-sm-6">
            <label for="11">PRESENT HISTORY </label>
             <textarea class="form-control input-sm" id="11" rows="3" name="present_history" autocomplete="off"><?php echo $cardio_ass['present_history'];?></textarea>
	  </div>

	  <div class="form-group col-md-6 col-sm-6">
            <label for="12">PAST HISTORY </label>
             <textarea class="form-control input-sm" id="12" rows="3" name="past_history" autocomplete="off"><?php echo $cardio_ass['past_history'];?></textarea>
	  </div>
	  	  <div class="form-group col-md-6 col-sm-6">
            <label for="13">PERSONAL HISTORY</label>
             <textarea class="form-control input-sm" id="13" rows="3" name="personal_history" autocomplete="off"><?php echo $cardio_ass['personal_history'];?></textarea>
	  </div>
         
          <div class="form-group col-md-3 col-sm-6">
            <label for="14">Smoking</label>
            <input type="text" class="form-control input-sm" id="14" placeholder="" name="smoking" autocomplete="off" value="<?php echo $cardio_ass['smoking'];?>">
        </div>

          <div class="form-group col-md-3 col-sm-6">
            <label for="15">Alcoholism</label>
            <input type="text" class="form-control input-sm" id="15" placeholder="" name="alcoholism" autocomplete="off" value="<?php echo $cardio_ass['alcoholism'];?>">
        </div>
 		
        <div class="form-group col-md-3 col-sm-6">
            <label for="16">Tobacco chewing</label>
            <input type="text" class="form-control input-sm" id="16" placeholder="" name="tobacco" autocomplete="off" value="<?php echo $cardio_ass['tobacco'];?>">
        </div>
       <div class="form-group col-md-3 col-sm-6">
            <label for="17">Diet</label>
            <input type="text" class="form-control input-sm" id="17" placeholder="" name="diet" autocomplete="off" value="<?php echo $cardio_ass['diet'];?>">
        </div>
        <div class="form-group col-md-6 col-sm-6">
            <label for="18">HISTORY TO ALLERGENS</label>
            <input type="text" class="form-control input-sm" id="18" placeholder="" name="allergens" autocomplete="off" value="<?php echo $cardio_ass['allergens'];?>">
        </div>
         
		 <div class="form-group col-md-6 col-sm-6">
            <label for="19">MEDICAL HISTORY</label>
             <textarea class="form-control input-sm" id="19" rows="3" name="medical_history" autocomplete="off"><?php echo $cardio_ass['medical_history'];?></textarea>
	  </div>
	  
	   <div class="form-group col-md-6 col-sm-6">
            <label for="20">FAMILY HISTORY</label>
             <textarea class="form-control input-sm" id="20" rows="3" name="family_history" autocomplete="off"><?php echo $cardio_ass['family_history'];?></textarea>
	  </div>
	   
	   <div class="form-group col-md-6 col-sm-6">
            <label for="21">OCCUPATIONAL HISTORY</label>
             <textarea class="form-control input-sm" id="21" rows="3" name="occupational_history" autocomplete="off"><?php echo $cardio_ass['occupational_history'];?></textarea>
	  </div>
	  
	   <div class="form-group col-md-6 col-sm-6">
            <label for="22">SOCIAL HISTORY</label>
             <textarea class="form-control input-sm" id="22" rows="3" name="social_history" autocomplete="off"><?php echo $cardio_ass['social_history'];?></textarea>
	  </div>
	
	
	 <div class="form-group col-md-3 col-sm-6">
            <label for="23">VITAL SIGNS</label>
            <input type="text" class="form-control input-sm" id="23" name="vital_signs" autocomplete="off" value="<?php echo $cardio_ass['vital_signs'];?>">
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="24">Body temperature</label>
            <input type="text" class="form-control input-sm" id="24" name="body_temperature" autocomplete="off" value="<?php echo $cardio_ass['body_temperature'];?>">
        </div>
	
	<div class="form-group col-md-6 col-sm-6">
            <label for="25">Heart rate</label>
            <input type="text" class="form-control input-sm" id="25" name="heart_rate" autocomplete="off" value="<?php echo $cardio_ass['heart_rate'];?>">
        </div>
         
		 <div class="past_image">
		<p style="float:right"><a id="edit" class="btn btn-info edit">Edit</a></p>
		  <img src="<?php echo $cardio_ass['chart']; ?>" style="width:100%; height:auto;"></img>
		</div>
		<div style="display:none;" class="paint_part">
		<table style="width:100%;"  border="1"  >
		<tr ><td colspan="3"><div class="form-group col-md-12 col-sm-12">
             <h4 class="content-headline">Body Chart</h4>
             </br>
		         <div id="progress">
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<center><span class="saveAppoinmentLoader"><span><img src="<?php echo 'http://srmpt.physioplustech.com/img/spinner.gif'; ?>"><h4><font color="red">Saving Please Wait....</font></h4></span></span></center>
				  </div>
				   <input type="hidden" id="patient_id" value="<?php echo $this->uri->segment(4); ?>" name="id" >
				   <div id="wPaint" style="position:relative; width:500px; height:550px; margin:70px auto 20px auto;"></div>
				     <center id="wPaint-img"></center>
        </div></td></tr></table></div>
		</br>
		<div class="form-group col-md-3 col-sm-6">
            <label for="26">Blood pressure</label>
            <input type="text" class="form-control input-sm" id="26" name="blood_pressure" autocomplete="off" value="<?php echo $cardio_ass['blood_pressure'];?>"> 
    </div>
	
	<div class="form-group col-md-3 col-sm-6">
            <label for="27">Respiratory rate</label>
            <input type="text" class="form-control input-sm" id="27" name="respiratory_rate" autocomplete="off" value="<?php echo $cardio_ass['respiratory_rate'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="28">Spo2</label>
            <input type="text" class="form-control input-sm" id="28" name="spo2" autocomplete="off" value="<?php echo $cardio_ass['spo2'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="29">Consciousness</label>
            <input type="text" class="form-control input-sm" id="29" name="consciousness" autocomplete="off" value="<?php echo $cardio_ass['consciousness'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="30">Body built</label>
            <input type="text" class="form-control input-sm" id="30" name="body_built" autocomplete="off" value="<?php echo $cardio_ass['body_built'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="31">External appliances</label>
            <input type="text" class="form-control input-sm" id="31" name="external_app" autocomplete="off" value="<?php echo $cardio_ass['external_app'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="32">Color of limb</label>
            <input type="text" class="form-control input-sm" id="32" name="color_limb" autocomplete="off" value="<?php echo $cardio_ass['color_limb'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="33">Clubbing</label>
            <input type="text" class="form-control input-sm" id="33" name="clubbing" autocomplete="off" value="<?php echo $cardio_ass['clubbing'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="34">Edema</label>
            <input type="text" class="form-control input-sm" id="34" name="edema" autocomplete="off" value="<?php echo $cardio_ass['edema'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="35">Communication</label>
            <input type="text" class="form-control input-sm" id="35" name="communication" autocomplete="off" value="<?php echo $cardio_ass['communication'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="36">Speech</label>
            <input type="text" class="form-control input-sm" id="36" name="speech" autocomplete="off" value="<?php echo $cardio_ass['speech'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="37">Cyanosis</label>
            <input type="text" class="form-control input-sm" id="37" name="cyanosis" autocomplete="off" value="<?php echo $cardio_ass['cyanosis'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="38">Dyspnoea</label>
            <input type="text" class="form-control input-sm" id="38" name="dyspnoea" autocomplete="off" value="<?php echo $cardio_ass['dyspnoea'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="39">Jaundice</label>
            <input type="text" class="form-control input-sm" id="39" name="jaundice" autocomplete="off" value="<?php echo $cardio_ass['jaundice'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="40">Facial expression</label>
            <input type="text" class="form-control input-sm" id="40" name="facial" autocomplete="off" value="<?php echo $cardio_ass['facial'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="41">Evaluation of head and neck</label>
            <input type="text" class="form-control input-sm" id="41" name="eva_head" autocomplete="off" value="<?php echo $cardio_ass['eva_head'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="42">Jugular vein</label>
            <input type="text" class="form-control input-sm" id="42" name="jugular_vein" autocomplete="off" value="<?php echo $cardio_ass['jugular_vein'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="43">SIGNS OF RESPIRATORY DISTRESS</label>
            <input type="text" class="form-control input-sm" id="43" name="respiratory" autocomplete="off" value="<?php echo $cardio_ass['respiratory'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="44">Nasal flaring</label>
            <input type="text" class="form-control input-sm" id="44" name="nasal" autocomplete="off" value="<?php echo $cardio_ass['nasal'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="45">Accesory muscle usage</label>
            <input type="text" class="form-control input-sm" id="45" name="accesory" autocomplete="off" value="<?php echo $cardio_ass['accesory'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="46">Jugular vein</label>
            <input type="text" class="form-control input-sm" id="46" name="vein" autocomplete="off" value="<?php echo $cardio_ass['vein'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="47">Shoulder</label>
            <input type="text" class="form-control input-sm" id="47" name="shoulder" autocomplete="off" value="<?php echo $cardio_ass['shoulder'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="48">Clavicular prominence</label>
            <input type="text" class="form-control input-sm" id="48" name="clavicular" autocomplete="off" value="<?php echo $cardio_ass['clavicular'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="49">Trapezius prominence</label>
            <input type="text" class="form-control input-sm" id="49" name="trapezius" autocomplete="off" value="<?php echo $cardio_ass['trapezius'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="50">Serratus anterior</label>
            <input type="text" class="form-control input-sm" id="50" name="serratus" autocomplete="off" value="<?php echo $cardio_ass['serratus'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="51">Thoracic cavity</label>
            <input type="text" class="form-control input-sm" id="51" name="thoracic" autocomplete="off" value="<?php echo $cardio_ass['thoracic'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="52">Spacing of intercoastal region</label>
            <input type="text" class="form-control input-sm" id="52" name="spacing" autocomplete="off" value="<?php echo $cardio_ass['spacing'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="53">Trachea</label>
            <input type="text" class="form-control input-sm" id="53" name="trachea" autocomplete="off" value="<?php echo $cardio_ass['trachea'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="54">Chest wall deformities</label>
            <input type="text" class="form-control input-sm" id="54" name="chest" autocomplete="off" value="<?php echo $cardio_ass['chest'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="55">Unmoving chest</label>
            <input type="text" class="form-control input-sm" id="55" name="unmove_chest" autocomplete="off" value="<?php echo $cardio_ass['unmove_chest'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="56">Moving chest</label>
            <input type="text" class="form-control input-sm" id="56" name="move_chest" autocomplete="off" value="<?php echo $cardio_ass['move_chest'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="57">Breathing Type</label>
            <input type="text" class="form-control input-sm" id="57" name="breathing" autocomplete="off" value="<?php echo $cardio_ass['breathing'];?>">
    </div>
	<!--<div class="form-group col-md-3 col-sm-6">
            <label for="58">Type</label>
            <input type="text" class="form-control input-sm" id="58" name="type" autocomplete="off" value="<?php echo $cardio_ass['type'];?>">
    </div>-->
	<div class="form-group col-md-3 col-sm-6">
            <label for="59">Depth</label>
            <input type="text" class="form-control input-sm" id="59" name="depth" autocomplete="off" value="<?php echo $cardio_ass['depth'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="60">Symmetry</label>
            <input type="text" class="form-control input-sm" id="60" name="symmetry" autocomplete="off" value="<?php echo $cardio_ass['symmetry'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="61">Rate</label>
            <input type="text" class="form-control input-sm" id="61" name="rate" autocomplete="off" value="<?php echo $cardio_ass['rate'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="62">On palpation</label>
            <input type="text" class="form-control input-sm" id="62" name="palpation" autocomplete="off" value="<?php echo $cardio_ass['palpation'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="63">Assessment of anterior thoracic expansion</label> 
            <input type="text" class="form-control input-sm" id="63" name="anterior_thoracic" autocomplete="off" value="<?php echo $cardio_ass['anterior_thoracic'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="64">Assessment of posterior thoracic expansion</label>
            <input type="text" class="form-control input-sm" id="64" name="posterior_thoracic" autocomplete="off" value="<?php echo $cardio_ass['posterior_thoracic'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="65">Upper lobe</label>
            <input type="text" class="form-control input-sm" id="65" name="upper_lobe" autocomplete="off" value="<?php echo $cardio_ass['upper_lobe'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="66">Middle lobe</label>
            <input type="text" class="form-control input-sm" id="66" name="middle_lobe" autocomplete="off" value="<?php echo $cardio_ass['middle_lobe'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="67">Lower lobe</label>
            <input type="text" class="form-control input-sm" id="67" name="lower_lobe" autocomplete="off" value="<?php echo $cardio_ass['lower_lobe'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="68">Heart position</label>
            <input type="text" class="form-control input-sm" id="68" name="heart_position" autocomplete="off" value="<?php echo $cardio_ass['heart_position'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="69">Tracheal position</label>
            <input type="text" class="form-control input-sm" id="69" name="tracheal" autocomplete="off" value="<?php echo $cardio_ass['tracheal'];?>"> 
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="70">Mediastinal position</label>
            <input type="text" class="form-control input-sm" id="70" name="mediastinal" autocomplete="off" value="<?php echo $cardio_ass['mediastinal'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="71">Accessory muscles palpation</label>
            <input type="text" class="form-control input-sm" id="71" name="muscles_palpation" autocomplete="off" value="<?php echo $cardio_ass['muscles_palpation'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="72">Diaphragmatic exertion</label>
            <input type="text" class="form-control input-sm" id="72" name="diaphragmatic" autocomplete="off" value="<?php echo $cardio_ass['diaphragmatic'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="73">Tenderness</label>
            <input type="text" class="form-control input-sm" id="73" name="tenderness" autocomplete="off" value="<?php echo $cardio_ass['tenderness'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="74">Fremitus</label>
            <input type="text" class="form-control input-sm" id="74" name="fremitus" autocomplete="off" value="<?php echo $cardio_ass['fremitus'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="75">Chest expansion</label>
            <input type="text" class="form-control input-sm" id="75" name="chest_expansion" autocomplete="off" value="<?php echo $cardio_ass['chest_expansion'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="76">Axillary level</label>
            <input type="text" class="form-control input-sm" id="76" name="axillary_level" autocomplete="off" value="<?php echo $cardio_ass['axillary_level'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="77">Nipple level</label>
            <input type="text" class="form-control input-sm" id="77" name="nipple_level" autocomplete="off" value="<?php echo $cardio_ass['nipple_level'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="78">Xiphoid level</label>
            <input type="text" class="form-control input-sm" id="78" name="xiphoid_level" autocomplete="off" value="<?php echo $cardio_ass['xiphoid_level'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="79">On percussion</label>
            <input type="text" class="form-control input-sm" id="79" name="percussion" autocomplete="off" value="<?php echo $cardio_ass['percussion'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="80">On auscultation</label>
            <input type="text" class="form-control input-sm" id="80" name="auscultation" autocomplete="off" value="<?php echo $cardio_ass['auscultation'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="81">Breath sounds</label>
            <input type="text" class="form-control input-sm" id="81" name="breath_sounds" autocomplete="off" value="<?php echo $cardio_ass['breath_sounds'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="82">Abnormal breath sounds</label>
            <input type="text" class="form-control input-sm" id="82" name="abnormal_breath" autocomplete="off" value="<?php echo $cardio_ass['abnormal_breath'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="83">Voice sounds</label>
            <input type="text" class="form-control input-sm" id="83" name="voice_sounds" autocomplete="off" value="<?php echo $cardio_ass['voice_sounds'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="84">Heart sounds</label>
            <input type="text" class="form-control input-sm" id="84" name="heart_sounds" autocomplete="off" value="<?php echo $cardio_ass['heart_sounds'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="85">Other systems</label>
            <input type="text" class="form-control input-sm" id="85" name="other_systems" autocomplete="off" value="<?php echo $cardio_ass['other_systems'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="86">Integumentary system</label>
            <input type="text" class="form-control input-sm" id="86" name="integumentary" autocomplete="off" value="<?php echo $cardio_ass['integumentary'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="87">Scars</label>
            <input type="text" class="form-control input-sm" id="87" name="scars" autocomplete="off" value="<?php echo $cardio_ass['scars'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="88">Incisions</label>
            <input type="text" class="form-control input-sm" id="88" name="incisions" autocomplete="off" value="<?php echo $cardio_ass['incisions'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="89">Ulcers</label>
            <input type="text" class="form-control input-sm" id="89" name="ulcers" autocomplete="off" value="<?php echo $cardio_ass['ulcers'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="90">Musculo-skeletal system</label>
            <input type="text" class="form-control input-sm" id="90" name="musculo_ske" autocomplete="off" value="<?php echo $cardio_ass['musculo_ske'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="91">Any deformities</label>
            <input type="text" class="form-control input-sm" id="91"  name="deformities" autocomplete="off" value="<?php echo $cardio_ass['deformities'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="92">Asymmetrical alignment of the body</label>
            <input type="text" class="form-control input-sm" id="92" name="asymmetrical" autocomplete="off" value="<?php echo $cardio_ass['asymmetrical'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="93">Postural assessment</label>
            <input type="text" class="form-control input-sm" id="93" name="postural" autocomplete="off" value="<?php echo $cardio_ass['postural'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="94">Range of motion</label>
            <input type="text" class="form-control input-sm" id="94" name="range_motion" autocomplete="off" value="<?php echo $cardio_ass['range_motion'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="95">Muscle wasting</label>
            <input type="text" class="form-control input-sm" id="95" name="muscle_wasting" autocomplete="off" value="<?php echo $cardio_ass['muscle_wasting'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="96">Neurological system</label>
            <input type="text" class="form-control input-sm" id="96" name="neurological" autocomplete="off" value="<?php echo $cardio_ass['neurological'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="97">Assess co-ordinated movement</label>
            <input type="text" class="form-control input-sm" id="97" name="co_ordinated" autocomplete="off" value="<?php echo $cardio_ass['co_ordinated'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="98">Assess balance</label>
            <input type="text" class="form-control input-sm" id="98" name="balance" autocomplete="off" value="<?php echo $cardio_ass['balance'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="99">Assess equilibrium</label>
            <input type="text" class="form-control input-sm" id="99" name="equilibrium" autocomplete="off" value="<?php echo $cardio_ass['equilibrium'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="100">Special investigation</label>
            <input type="text" class="form-control input-sm" id="100" name="investigation" autocomplete="off" value="<?php echo $cardio_ass['investigation'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="101">Cough Type</label>
            <input type="text" class="form-control input-sm" id="101" name="cough" autocomplete="off" value="<?php echo $cardio_ass['cough'];?>">
    </div>
	<!--<div class="form-group col-md-3 col-sm-6">
            <label for="102">Type</label>
            <input type="text" class="form-control input-sm" id="102" name="type1" autocomplete="off" value="<?php echo $cardio_ass['type1'];?>">
    </div>-->
	<div class="form-group col-md-3 col-sm-6">
            <label for="103">What time</label>
            <input type="text" class="form-control input-sm" id="103" name="time" autocomplete="off" value="<?php echo $cardio_ass['time'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="104">Aggravating factors</label>
            <input type="text" class="form-control input-sm" id="104" name="aggravating_factor" autocomplete="off" value="<?php echo $cardio_ass['aggravating_factor'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="105">Sputum examination</label>
            <input type="text" class="form-control input-sm" id="105" name="sputum_exam" autocomplete="off" value="<?php echo $cardio_ass['sputum_exam'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="106">Blood examination</label>
            <input type="text" class="form-control input-sm" id="106" name="blood_exam" autocomplete="off" value="<?php echo $cardio_ass['blood_exam'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="107">Chest x-ray</label>
            <input type="text" class="form-control input-sm" id="107" name="chest_xray" autocomplete="off" value="<?php echo $cardio_ass['chest_xray'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="108">E.C.G</label>
            <input type="text" class="form-control input-sm" id="108" name="ecg" autocomplete="off" value="<?php echo $cardio_ass['ecg'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="109">ABG</label>
            <input type="text" class="form-control input-sm" id="109" name="abg" autocomplete="off" value="<?php echo $cardio_ass['abg'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="110">PFT</label>
            <input type="text" class="form-control input-sm" id="110" name="pft" autocomplete="off" value="<?php echo $cardio_ass['pft'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="111">Stress test</label>
            <input type="text" class="form-control input-sm" id="111" name="stress" autocomplete="off" value="<?php echo $cardio_ass['stress'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="112">2D-Echo cardiogram</label>
            <input type="text" class="form-control input-sm" id="112"  name="2d_echo" autocomplete="off" value="<?php echo $cardio_ass['2d_echo'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="113">CT scan</label>
            <input type="text" class="form-control input-sm" id="113" name="ct_scan" autocomplete="off" value="<?php echo $cardio_ass['ct_scan'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="114">Angiogram</label>
            <input type="text" class="form-control input-sm" id="114" name="angiogram" autocomplete="off" value="<?php echo $cardio_ass['angiogram'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="115">Ultrasound scan</label>
            <input type="text" class="form-control input-sm" id="115" name="ultrasound_scan" autocomplete="off" value="<?php echo $cardio_ass['ultrasound_scan'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="116">MRI scan</label>
            <input type="text" class="form-control input-sm" id="116" name="mri_scan" autocomplete="off" value="<?php echo $cardio_ass['mri_scan'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="117">Provisional diagnosis</label>
            <input type="text" class="form-control input-sm" id="117" name="prov_diagnosis" autocomplete="off" value="<?php echo $cardio_ass['prov_diagnosis'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="118">Differential diagnosis</label>
            <input type="text" class="form-control input-sm" id="118" name="diff_diagnosis" autocomplete="off" value="<?php echo $cardio_ass['diff_diagnosis'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="119">Physiotherapy treatment</label>
            <input type="text" class="form-control input-sm" id="119" name="physio_treatment" autocomplete="off" value="<?php echo $cardio_ass['physio_treatment'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="120">Problem list</label>
            <input type="text" class="form-control input-sm" id="120" name="problem_list" autocomplete="off" value="<?php echo $cardio_ass['problem_list'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="121">Aims</label>
            <input type="text" class="form-control input-sm" id="121" name="aims" autocomplete="off" value="<?php echo $cardio_ass['aims'];?>">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="122">Means</label>
            <input type="text" class="form-control input-sm" id="122" name="means" autocomplete="off" value="<?php echo $cardio_ass['means'];?>">
    </div>
	
	
	<div class="col-md-12 col-sm-12">
		<div class="form-group col-md-3 col-sm-3 pull-right" >
				<input type="submit" class="btn btn-primary" value="Submit" id="save"/>
		</div>
	</div>
</form>
</div>
   <script type="text/javascript" src="<?php echo base_url() ?>wpaintone/lib/jquery.ui.core.1.10.3.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url() ?>wpaintone/lib/jquery.ui.widget.1.10.3.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url() ?>wpaintone/lib/jquery.ui.mouse.1.10.3.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url() ?>wpaintone/lib/jquery.ui.draggable.1.10.3.min.js"></script>	
   <link rel="Stylesheet" type="text/css" href="<?php echo base_url() ?>wpaintone/lib/wColorPicker.min.css" />
   <script type="text/javascript" src="<?php echo base_url() ?>wpaintone/lib/wColorPicker.min.js"></script>
   <link rel="Stylesheet" type="text/css" href="<?php echo base_url() ?>wpaintone/wPaint.min.css" />
   <script type="text/javascript" src="<?php echo base_url() ?>wpaintone/wPaint.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url() ?>wpaintone/plugins/main/wPaint.menu.main.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url() ?>wpaintone/plugins/text/wPaint.menu.text.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url() ?>wpaintone/plugins/shapes/wPaint.menu.main.shapes.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url() ?>wpaintone/plugins/file/wPaint.menu.main.file.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url() ?>wpaintone/lib/jquery.ui.core.1.10.3.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url() ?>wpaintone/lib/jquery.ui.widget.1.10.3.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url() ?>wpaintone/lib/jquery.ui.mouse.1.10.3.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url() ?>wpaintone/lib/jquery.ui.draggable.1.10.3.min.js"></script>	
   <link rel="Stylesheet" type="text/css" href="<?php echo base_url() ?>wpaintone/lib/wColorPicker.min.css" />
   <script type="text/javascript" src="<?php echo base_url() ?>wpaintone/lib/wColorPicker.min.js"></script>
   <link rel="Stylesheet" type="text/css" href="<?php echo base_url() ?>wpaintone/wPaint.min.css" />
   <script type="text/javascript" src="<?php echo base_url() ?>wpaintone/wPaint.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url() ?>wpaintone/plugins/main/wPaint.menu.main.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url() ?>wpaintone/plugins/text/wPaint.menu.text.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url() ?>wpaintone/plugins/shapes/wPaint.menu.main.shapes.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url() ?>wpaintone/plugins/file/wPaint.menu.main.file.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/js/jquery.gritter.min.js"></script> 
<script src="<?php  echo base_url();  ?>assets/js/vendor/jgrowl/jquery.jgrowl.min.js"></script>
<script>

if (typeof jQuery === 'undefined') { throw new Error('DCalendar.Picker: This plugin requires jQuery'); }
 
+function ($) {

    Date.prototype.getDays = function() { return new Date(this.getFullYear(), this.getMonth() + 1, 0).getDate(); };
	var months = ['January','February','March','April','May','June','July','August','September','October','November','December'],
		short_months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
		daysofweek = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],

		DCalendar = function(elem, options) {
		    this.calendar = $(elem);
			this.today = new Date();	
			this.date = this.today;		
			this.viewMode = 'days';
			this.options = options;
			this.selected = (this.date.getMonth() + 1) + "/" + this.date.getDate() + "/" + this.date.getFullYear();
			
			if(options.mode === 'calendar')
				this.tHead = $('<thead><tr><th id="prev">‹</th><th colspan="5" id="currM"></th><th id="next">›</th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead>');
			else if (options.mode === 'datepicker')
				this.tHead = $('<thead><tr><th id="prev">‹</th><th colspan="5" id="currM"></th><th id="next">›</th></tr><tr><th>S</th><th>M</th><th>T</th><th>W</th><th>T</th><th>F</th><th>S</th></tr></thead>');
			this.tHead.find('#currM').text(months[this.today.getMonth()] +" " + this.today.getFullYear());
			this.calendar.prepend(this.tHead);
			var that = this;

			this.calendar.on('click', '#next', function() { initCreate('next'); })
				.on('click', '#prev', function() { initCreate('prev'); })
				.on('click', '#today', function() {
					that.viewMode = 'days';
					var curr = new Date(that.date),
						sys = new Date(that.today);
					if(curr.toString() != sys.toString()) { that.date = sys; }
					that.create('days');
				}).on('click', '.date, .pMDate, .nMDate', function() {
					var tClass = $(this).attr('class'),
						sdate = $(this).text(),
						cmonth = that.date.getMonth(),
						cyear = that.date.getFullYear();

					
					if(tClass === 'pMDate') { cyear = (cmonth === 0 ? cyear - 1 : cyear); }
					else if(tClass === 'nMDate') { cyear = (cmonth + 2 === 13 ? cyear + 1 : cyear); }
					
					if(tClass === 'pMDate'){ cmonth = (cmonth === 0 ? '12' : cmonth); }
					else if (tClass === 'nMDate') { cmonth = (cmonth + 2 === 13 ? '1' : cmonth + 2); }
					else { cmonth = cmonth + 1; }

					
					that.selected = cmonth + '/' + sdate + '/' + cyear;

					if(that.options.mode === 'datepicker') {
						that.calendar.find('td').removeClass('selected');
						$(this).addClass('selected');
					}
					selectDate();
					return true;
				}).on('click', '#currM', function(){
					that.viewMode = 'months';
					that.create(that.viewMode);
				}).on('click', '.month', function(e){
					that.viewMode = 'days';
					var curr = new Date(that.date), y = that.calendar.find('#currM').text();
					curr.setMonth($(e.currentTarget).attr('num'));
					that.date = curr;
					that.create(that.viewMode);
				});

			function selectDate () {
				var newDate = formatDate(that.options.format);
				var e = $.Event('selectdate', {date: newDate});
				that.calendar.trigger(e);
			}

			function formatDate (format) {
				var d = new Date(that.selected), day = d.getDate(), m = d.getMonth(), y = d.getFullYear();
				return format.replace(/(yyyy|yy|mmmm|mmm|mm|m|dd|d)/gi, function (e) {
					switch(e.toLowerCase()){
						case 'd': return day;
						case 'dd': return (day < 10 ? "0"+day: day);
						case 'm': return m+1;
						case 'mm': return (m+1 < 10 ? "0"+(m+1): (m+1));
						case 'mmm': return short_months[m];
						case 'mmmm': return months[m];
						case 'yy': return y.toString().substr(2,2);
						case 'yyyy': return y;
					}
				});
			}

			function initCreate(o){
				var curr = new Date(that.date),
					currMonth = curr.getMonth(),
					currYear = curr.getFullYear();
				curr.setDate(1);
				if(that.viewMode === 'days') {
					curr.setMonth(currMonth + (o === 'next' ? 1 : -1));
				} else {
					curr.setFullYear(currYear + (o === 'next' ? 1 : - 1));
				}
				that.date = curr;
				that.create(that.viewMode);
			}

			this.create(this.viewMode);
		}

	DCalendar.prototype = {

		constructor : DCalendar, 

		

		create : function(mode){
			var that = this, cal = [], tBody = $('<tbody></tbody>'), d = new Date(that.date), days = that.date.getDays(), day = 1, nStartDate = 1, selDate = that.selected.split('/');
			that.calendar.empty();
			if(mode === "days") {
				if(that.options.mode === 'calendar') {
					that.tHead = $('<thead><tr><th id="prev">‹</th><th colspan="5" id="currM"></th><th id="next">›</th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead>');
				} else if (that.options.mode === 'datepicker') {
					that.tHead = $('<thead><tr><th id="prev">‹</th><th colspan="5" id="currM"></th><th id="next">›</th></tr><tr><th>S</th><th>M</th><th>T</th><th>W</th><th>T</th><th>F</th><th>S</th></tr></thead>');
				}
				that.tHead.find('#currM').text(months[that.date.getMonth()] +" " + that.date.getFullYear());
				that.calendar.append(that.tHead);

				for(var i = 1; i <= 6; i++){
					var temp = [$('<td></td>'),$('<td></td>'),$('<td></td>'),$('<td></td>'),$('<td></td>'),$('<td></td>'),$('<td></td>')];

					while(day <= days){
						d.setDate(day);
						var dayOfWeek = d.getDay();
						if(day === that.today.getDate() 
							&& d.getMonth() === that.today.getMonth() 
							&& d.getFullYear() === that.today.getFullYear()) {
							temp[dayOfWeek].attr('id', 'currDay');
						} 
						if(that.options.mode === 'datepicker'
							&& (((d.getMonth() + 1) + "/" + day + "/" + d.getFullYear()) === (selDate[0] + "/" + selDate[1] + "/" + selDate[2]))) {
							temp[dayOfWeek].addClass('selected');
						}
						if(i === 1 && dayOfWeek === 0){
							break;
						} else if(dayOfWeek < 6){
							temp[dayOfWeek].html('<span>'+(day++)+'</span>').addClass('date');
						} else {
							temp[dayOfWeek].html('<span>'+(day++)+'</span>').addClass('date');
							break;
						}
					}
					
					if (i === 1 || i > 4) {
						var p = new Date(that.date);
						
						if (i === 1) {
							var pMonth = p.getMonth(), pDays = 0;
							p.setDate(1);
							p.setMonth(pMonth - 1);
							pDays = p.getDays();
							for (var a = 6; a >= 0; a--) {
								if (temp[a].text() === ''){
									temp[a].html('<span>' + (pDays--) + '</span>').addClass('pMDate');
									if (that.options.mode === 'datepicker' 
										&& (((d.getMonth()) + "/" + (pDays + 1) + "/" + d.getFullYear()) === (selDate[0] + "/" + selDate[1] + "/" + selDate[2]))) {
										temp[a].addClass('selected');
									}
								}
							}
						} 
						
						else if (i > 4) {
							for (var a = 0; a <= 6; a++) {
								if (temp[a].text() === ''){
									temp[a].html('<span>' + (nStartDate++) + '</span>').addClass('nMDate');
									if (that.options.mode === 'datepicker' 
										&& (((d.getMonth()+2) + "/" + (nStartDate - 1) + "/" + d.getFullYear()) === (selDate[0] + "/" + selDate[1] + "/" + selDate[2]))) {
										temp[a].addClass('selected');
									}
								}
							}
						}
					}
					cal.push(temp);
				}

				$.each(cal, function(i, v){
					var row = $('<tr></tr>'), l = v.length;
					for(var i = 0; i < l; i++) { row.append(v[i]); }
					tBody.append(row);
				});

				var sysDate = "Today: " + daysofweek[that.today.getDay()] + ", " + months[that.today.getMonth()] + " " + that.today.getDate() + ", " + that.today.getFullYear();
				tBody.append('<tr><td colspan="7" id="today">' + sysDate + '</td></tr>').appendTo(that.calendar);
			} else {
				this.tHead = $('<thead><tr><th id="prev">‹</th><th colspan="2" id="currM"></th><th id="next">›</th></tr>');
				that.tHead.find('#currM').text(that.date.getFullYear());
				that.tHead.appendTo(that.calendar);
				var currI = 0;
				for (var i = 0; i < 3; i++) {
					var row = $('<tr></tr>');
					for (var x = 0; x < 4; x++) {
						var col = $('<td align="center"></td>');
						var m = $('<span class="month" num="' + currI + '">' + short_months[currI] + '</span>');
						col.append(m).appendTo(row);
						currI++;
					}
					tBody.append(row);
				}
				var sysDate = "Today: " + daysofweek[that.today.getDay()] + ", "+ months[that.today.getMonth()] + " " + that.today.getDate() + ", " + that.today.getFullYear();
				tBody.append('<tr><td colspan="4" id="today">' + sysDate + '</td></tr>').appendTo(that.calendar);
			}
		}
	}

	
	$.fn.dcalendar = function(opts){
		return $(this).each(function(index, elem){
			var that = this;
 			var $this = $(that),
 				data = $(that).data('dcalendar'),
 				options = $.extend({}, $.fn.dcalendar.defaults, $this.data(), typeof opts === 'object' && opts);
 			if(!data){
 				$this.data('dcalendar', (data = new DCalendar(this, options)));
 			}
 			if(typeof opts === 'string') data[opts]();
		});
	}

	$.fn.dcalendar.defaults = {
		mode : 'calendar',
		format: 'dd/mm/yyyy',
	};

	$.fn.dcalendar.Constructor = DCalendar;

	
	$.fn.dcalendarpicker = function(opts){
		return $(this).each(function(){
			var that = $(this);
			var cal = $('<table class="calendar"></table>'), hovered = false, selectedDate = false;
			that.wrap($('<div class="datepicker" style="position:relative;"></div>'));
			cal.css({
				position:'absolute',
				left:0, display:'none',
				'box-shadow':'0 4px 6px 1px rgba(0, 0, 0, 0.14)',
				width:'230px',
			}).appendTo(that.parent());
			if(opts){
				opts.mode = 'datepicker';
				cal.dcalendar(opts);
			} else{
				cal.dcalendar({mode: 'datepicker'});
			}
			cal.hover(function(){
				hovered = true;
			}, function(){
				hovered = false;
			}).on('click', function(){
				if(!selectedDate)
					that.focus();
				else {
					selectedDate = false;
					$(this).hide();
				}
			}).on('selectdate', function(e){
				that.val(e.date).trigger('onchange');
			    that.trigger($.Event('dateselected', {date: e.date, elem: that}));
				selectedDate = true;
			});
			that.on('keydown', function(e){ if(e.which) return false; })
				.on('focus', function(){
					$('.datepicker').find('.calendar').not(cal).hide();
					cal.show();
				})
				.on('blur', function(){ if(!hovered) cal.hide(); });
		});
	}

}(jQuery);

$(document).ready(function() {
  $('form').on('submit', function (event) {
         event.preventDefault();
		 var $form = $(this);
		var id = $('#patient_id').val();
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var button = $('#save');
		 button.prop('disabled', true);
		$.ajax({
            type: 'post',
            url: $(this).attr('action'),
			data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				
				$.jGrowl("Patient Assessment Has Been Updated Successfully!");
				setTimeout(function(){ 
				window.location = '<?php echo base_url().'client/patient/view/' ?>'+id;
				}, 1000);
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$.jGrowl("Patient Assessment Has Not Been Updated Successfully!");
				setTimeout(function(){ 
				$('.md-close btn btn-default').click();
				window.location.reload();
				}, 1000);
			}
      });

			  
});  
});

$(':radio:not(:checked)').attr('disabled', true);


$(".edit").click(function(){
			$('.paint_part').show();
			$('.past_image').hide();
		});
		
		$('#progress').hide();
	 var why = $('input[name="patient_id"]').val();
	 $(document).ready(function() { 
	 var images = [
          '/test/uploads/wPaint.png',
        ];

         function saveImg(image) {
	       var why1 = $("#assess_date").val();
		   var _this = this;
		    $.ajax({
            type: 'POST',  
			url : '<?php echo base_url(); ?>assessment/body_chart', 
			cache : false,
            data: {image:image,id:why,date:why1},
			beforeSend: function(){
				$('.saveAppoinmentLoader > span').show();   
				$('#progress').show();
				
			},
			
            success: function (resp) {
			$('.saveAppoinmentLoader > span').hide(); 
			$('#progress').hide();
			$.jGrowl("Image saved successfully");
			var id=$('#patient_id').val();
		    //window.location.href="<?php echo base_url()?>client/patient/view/"+id;
            var id=('#patient_id').val();
              resp = $.parseJSON(resp);  
              images.push(resp.img);
                 $('#wPaint').wPaint('image', '<?php echo base_url()?>baby.png')
     		 },
          });
			
		 
		}

        function loadImgBg () {
			this._showFileModal('bg', images);
        }

        function loadImgFg () {
			this._showFileModal('fg', images);
        }
		$(document).ready(function(){
			 setInterval(function() {
			var url= '<?php echo base_url().'client/cron/working_time' ?>';
				$.ajax({
					url: url,
					method: 'post',
					aysnc: false,
					success: function(response) {
						console.log(response);
					}
				});
			}, 120000);
			$('#wPaint').wPaint('image', '<?php echo base_url()?>pain-chart-blank.JPG')
		});
		$('#wPaint').wPaint({
          menuOffsetLeft: -35,
          menuOffsetTop: -50,
          saveImg: saveImg,
          loadImgBg: loadImgBg,
          loadImgFg: loadImgFg
        });
		
	});	
</script>
</body>
</html>