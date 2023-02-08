<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/datepicker/css/bootstrap-datetimepicker.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/colorpicker/css/bootstrap-colorpicker.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/colorpalette/bootstrap-colorpalette.css">
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
    <form action="<?php echo base_url().'assessment/add_cardio/'?>" method="post" role="form" parsley-validate>
	<!--<div class="form-group col-md-6 col-sm-6">
            <label for="name">ASSESSMENT DATE  *	</label>
                 <input class="datepicker form-control" type="date"  id="assess_date" name="assess_date" required/> 
	</div>-->
	<div class="form-group col-md-6 col-sm-6">
                        <label for="datepicker" class="col-sm-4 control-label">Assessment Date</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control datepicker assess_date" id="assess_date" name="assess_date" parsley-trigger="change" parsley-required="true" data-date-format='DD/MM/YYYY'>
                        </div>
                      </div>
	     <input type="hidden" class="form-control" value="<?php echo $this->uri->segment(3); ?>" name="patient_id" id="patient_id" placeholder="">
         <input type="hidden" name="client_id" value="<?php echo $this->session->userdata('client_id'); ?>" id="client_id" />
         
      	  <div style="width:95%; display:none;" class="view" >
						<input type="hidden" name="assess_id" id="assess_id" />
      					<center><a class="btn btn-info edit" style="border-radius: 70px; width:40%; height:35px;  background-color:#088AEC; color:white;" >
					Edit</a><a class="btn btn-info print" style="border-radius: 70px; width:40%; height:35px;  background-color:#088AEC; color:white;" >
					Print</a>
						</center></br></br></div>
		<div class="col-md-12 col-sm-12 create">
      <div class="form-group col-md-3 col-sm-6">
            <label for="1">NAME  *	</label>
            <input type="text" class="form-control input-sm" id="1" placeholder="" name="name" value="<?php echo $patient_info['first_name'];?>"autocomplete="off" readonly>
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="2">Age  *	</label>
            <input type="text" class="form-control input-sm" id="2" placeholder="" name="age"  value="<?php echo $patient_info['age'];?>"autocomplete="off" readonly>
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
            <label for="5">UHID NO   	</label>
            <input type="text" class="form-control input-sm" id="5" placeholder="" name="uhid_no" autocomplete="off">
        </div>-->
		<div class="form-group col-md-3 col-sm-6">
            <label for="5">Patient Code</label>
            <input type="text" class="form-control input-sm" id="5" value="<?php echo $patient_info['patient_code'];?>" readonly autocomplete="off">
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="6">DATE OF SURGERY/ DATE OF ADMISSION</label>
           <input type="text" class="form-control input-sm datepicker" id="6" placeholder="" name="date_admission" autocomplete="off" data-date-format='DD/MM/YYYY'>
         </div>
         <div class="form-group col-md-3 col-sm-6">
            <label for="7">DATE OF ASSESSMENT    	</label>
           <input type="text" class="form-control input-sm datepicker" id="7" placeholder="" name="date_assessment" autocomplete="off" data-date-format='DD/MM/YYYY'>
         </div>
	
		<div class="form-group col-md-3 col-sm-6">
            <label for="8">WARD  </label>
            <input type="text" class="form-control input-sm" id="8" placeholder="" name="ward" autocomplete="off">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="9">ADDRESS *</label>
             <textarea class="form-control input-sm" id="9" rows="3" name="address" autocomplete="off" readonly ><?php echo $patient_info['address_line1'];?></textarea>
	  </div>

	  <div class="form-group col-md-6 col-sm-6">
            <label for="10">CHIEF COMPLAINT </label>
             <textarea class="form-control input-sm" id="10" rows="3" name="chief_complaint" autocomplete="off"></textarea>
	  </div>

	  <div class="form-group col-md-6 col-sm-6">
            <label for="11">PRESENT HISTORY </label>
             <textarea class="form-control input-sm" id="11" rows="3" name="present_history" autocomplete="off"></textarea>
	  </div>

	  <div class="form-group col-md-6 col-sm-6">
            <label for="12">PAST HISTORY </label>
             <textarea class="form-control input-sm" id="12" rows="3" name="past_history" autocomplete="off"></textarea>
	  </div>
	  	  <div class="form-group col-md-6 col-sm-6">
            <label for="13">PERSONAL HISTORY</label>
             <textarea class="form-control input-sm" id="13" rows="3" name="personal_history" autocomplete="off"></textarea>
	  </div>
         
          <div class="form-group col-md-3 col-sm-6">
            <label for="14">Smoking</label>
            <input type="text" class="form-control input-sm" id="14" placeholder="" name="smoking" autocomplete="off">
        </div>

          <div class="form-group col-md-3 col-sm-6">
            <label for="15">Alcoholism</label>
            <input type="text" class="form-control input-sm" id="15" placeholder="" name="alcoholism" autocomplete="off">
        </div>
 		
        <div class="form-group col-md-3 col-sm-6">
            <label for="16">Tobacco chewing</label>
            <input type="text" class="form-control input-sm" id="16" placeholder="" name="tobacco" autocomplete="off">
        </div>
       <div class="form-group col-md-3 col-sm-6">
            <label for="17">Diet</label>
            <input type="text" class="form-control input-sm" id="17" placeholder="" name="diet" autocomplete="off">
        </div>
        <div class="form-group col-md-6 col-sm-6">
            <label for="18">HISTORY TO ALLERGENS</label>
            <input type="text" class="form-control input-sm" id="18" placeholder="" name="allergens" autocomplete="off">
        </div>
         
		 <div class="form-group col-md-6 col-sm-6">
            <label for="19">MEDICAL HISTORY</label>
             <textarea class="form-control input-sm" id="19" rows="3" name="medical_history" autocomplete="off"></textarea>
	  </div>
	  
	   <div class="form-group col-md-6 col-sm-6">
            <label for="20">FAMILY HISTORY</label>
             <textarea class="form-control input-sm" id="20" rows="3" name="family_history" autocomplete="off"></textarea>
	  </div>
	   
	   <div class="form-group col-md-6 col-sm-6">
            <label for="21">OCCUPATIONAL HISTORY</label>
             <textarea class="form-control input-sm" id="21" rows="3" name="occupational_history" autocomplete="off"></textarea>
	  </div>
	  
	   <div class="form-group col-md-6 col-sm-6">
            <label for="22">SOCIAL HISTORY</label>
             <textarea class="form-control input-sm" id="22" rows="3" name="social_history" autocomplete="off"></textarea>
	  </div>
	
	
	 <div class="form-group col-md-3 col-sm-6">
            <label for="23">VITAL SIGNS</label>
            <input type="text" class="form-control input-sm" id="23" name="vital_signs" autocomplete="off">
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="24">Body temperature</label>
            <input type="text" class="form-control input-sm" id="24" name="body_temperature" autocomplete="off">
        </div>
	
	<div class="form-group col-md-6 col-sm-6">
            <label for="25">Heart rate</label>
            <input type="text" class="form-control input-sm" id="25" name="heart_rate" autocomplete="off">
        </div>
         
		 
		 <table style="width:100%;"  border="1"  >
		<tr ><td colspan="3"><div class="form-group col-md-12 col-sm-12">
             <h4 class="content-headline">Body Chart</h4>
             </br>
		         <div id="progress">
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<center><span class="saveAppoinmentLoader"><span><img src="<?php echo 'http://srmpt.physioplustech.com/img/spinner.gif'; ?>"><h4><font color="red">Saving Please Wait....</font></h4></span></span></center>
				  </div>
				   <input type="hidden" id="patient_id" value="<?php echo $this->uri->segment(3); ?>" name="id" >
				   <div id="wPaint" style="position:relative; width:500px; height:550px; margin:70px auto 20px auto;"></div>
				     <center id="wPaint-img"></center>
        </div></td></tr></table> 
		</br>
		 
		<div class="form-group col-md-3 col-sm-6">
            <label for="26">Blood pressure</label>
            <input type="text" class="form-control input-sm" id="26" name="blood_pressure" autocomplete="off">
    </div>
	
	<div class="form-group col-md-3 col-sm-6">
            <label for="27">Respiratory rate</label>
            <input type="text" class="form-control input-sm" id="27" name="respiratory_rate" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="28">Spo2</label>
            <input type="text" class="form-control input-sm" id="28" name="spo2" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="29">Consciousness</label>
            <input type="text" class="form-control input-sm" id="29" name="consciousness" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="30">Body built</label>
            <input type="text" class="form-control input-sm" id="30" name="body_built" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="31">External appliances</label>
            <input type="text" class="form-control input-sm" id="31" name="external_app" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="32">Color of limb</label>
            <input type="text" class="form-control input-sm" id="32" name="color_limb" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="33">Clubbing</label>
            <input type="text" class="form-control input-sm" id="33" name="clubbing" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="34">Edema</label>
            <input type="text" class="form-control input-sm" id="34" name="edema" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="35">Communication</label>
            <input type="text" class="form-control input-sm" id="35" name="communication" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="36">Speech</label>
            <input type="text" class="form-control input-sm" id="36" name="speech" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="37">Cyanosis</label>
            <input type="text" class="form-control input-sm" id="37" name="cyanosis" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="38">Dyspnoea</label>
            <input type="text" class="form-control input-sm" id="38" name="dyspnoea" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="39">Jaundice</label>
            <input type="text" class="form-control input-sm" id="39" name="jaundice" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="40">Facial expression</label>
            <input type="text" class="form-control input-sm" id="40" name="facial" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="41">Evaluation of head and neck</label>
            <input type="text" class="form-control input-sm" id="41" name="eva_head" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="42">Jugular vein</label>
            <input type="text" class="form-control input-sm" id="42" name="jugular_vein" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="43">SIGNS OF RESPIRATORY DISTRESS</label>
            <input type="text" class="form-control input-sm" id="43" name="respiratory" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="44">Nasal flaring</label>
            <input type="text" class="form-control input-sm" id="44" name="nasal" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="45">Accesory muscle usage</label>
            <input type="text" class="form-control input-sm" id="45" name="accesory" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="46">Jugular vein</label>
            <input type="text" class="form-control input-sm" id="46" name="vein" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="47">Shoulder</label>
            <input type="text" class="form-control input-sm" id="47" name="shoulder" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="48">Clavicular prominence</label>
            <input type="text" class="form-control input-sm" id="48" name="clavicular" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="49">Trapezius prominence</label>
            <input type="text" class="form-control input-sm" id="49" name="trapezius" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="50">Serratus anterior</label>
            <input type="text" class="form-control input-sm" id="50" name="serratus" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="51">Thoracic cavity</label>
            <input type="text" class="form-control input-sm" id="51" name="thoracic" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="52">Spacing of intercoastal region</label>
            <input type="text" class="form-control input-sm" id="52" name="spacing" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="53">Trachea</label>
            <input type="text" class="form-control input-sm" id="53" name="trachea" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="54">Chest wall deformities</label>
            <input type="text" class="form-control input-sm" id="54" name="chest" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="55">Unmoving chest</label>
            <input type="text" class="form-control input-sm" id="55" name="unmove_chest" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="56">Moving chest</label>
            <input type="text" class="form-control input-sm" id="56" name="move_chest" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="57">Breathing Type</label>
            <input type="text" class="form-control input-sm" id="57" name="breathing" autocomplete="off">
    </div>
	<!--<div class="form-group col-md-3 col-sm-6">
            <label for="58">Type</label>
            <input type="text" class="form-control input-sm" id="58" name="type" autocomplete="off">
    </div>-->
	<div class="form-group col-md-3 col-sm-6">
            <label for="59">Depth</label>
            <input type="text" class="form-control input-sm" id="59" name="depth" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="60">Symmetry</label>
            <input type="text" class="form-control input-sm" id="60" name="symmetry" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="61">Rate</label>
            <input type="text" class="form-control input-sm" id="61" name="rate" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="62">On palpation</label>
            <input type="text" class="form-control input-sm" id="62" name="palpation" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="63">Assessment of anterior thoracic expansion</label> 
            <input type="text" class="form-control input-sm" id="63" name="anterior_thoracic" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="64">Assessment of posterior thoracic expansion</label>
            <input type="text" class="form-control input-sm" id="64" name="posterior_thoracic" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="65">Upper lobe</label>
            <input type="text" class="form-control input-sm" id="65" name="upper_lobe" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="66">Middle lobe</label>
            <input type="text" class="form-control input-sm" id="66" name="middle_lobe" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="67">Lower lobe</label>
            <input type="text" class="form-control input-sm" id="67" name="lower_lobe" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="68">Heart position</label>
            <input type="text" class="form-control input-sm" id="68" name="heart_position" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="69">Tracheal position</label>
            <input type="text" class="form-control input-sm" id="69" name="tracheal" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="70">Mediastinal position</label>
            <input type="text" class="form-control input-sm" id="70" name="mediastinal" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="71">Accessory muscles palpation</label>
            <input type="text" class="form-control input-sm" id="71" name="muscles_palpation" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="72">Diaphragmatic exertion</label>
            <input type="text" class="form-control input-sm" id="72" name="diaphragmatic" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="73">Tenderness</label>
            <input type="text" class="form-control input-sm" id="73" name="tenderness" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="74">Fremitus</label>
            <input type="text" class="form-control input-sm" id="74" name="fremitus" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="75">Chest expansion</label>
            <input type="text" class="form-control input-sm" id="75" name="chest_expansion" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="76">Axillary level</label>
            <input type="text" class="form-control input-sm" id="76" name="axillary_level" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="77">Nipple level</label>
            <input type="text" class="form-control input-sm" id="77" name="nipple_level" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="78">Xiphoid level</label>
            <input type="text" class="form-control input-sm" id="78" name="xiphoid_level" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="79">On percussion</label>
            <input type="text" class="form-control input-sm" id="79" name="percussion" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="80">On auscultation</label>
            <input type="text" class="form-control input-sm" id="80" name="auscultation" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="81">Breath sounds</label>
            <input type="text" class="form-control input-sm" id="81" name="breath_sounds" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="82">Abnormal breath sounds</label>
            <input type="text" class="form-control input-sm" id="82" name="abnormal_breath" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="83">Voice sounds</label>
            <input type="text" class="form-control input-sm" id="83" name="voice_sounds" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="84">Heart sounds</label>
            <input type="text" class="form-control input-sm" id="84" name="heart_sounds" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="85">Other systems</label>
            <input type="text" class="form-control input-sm" id="85" name="other_systems" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="86">Integumentary system</label>
            <input type="text" class="form-control input-sm" id="86" name="integumentary" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="87">Scars</label>
            <input type="text" class="form-control input-sm" id="87" name="scars" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="88">Incisions</label>
            <input type="text" class="form-control input-sm" id="88" name="incisions" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="89">Ulcers</label>
            <input type="text" class="form-control input-sm" id="89" name="ulcers" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="90">Musculo-skeletal system</label>
            <input type="text" class="form-control input-sm" id="90" name="musculo_ske" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="91">Any deformities</label>
            <input type="text" class="form-control input-sm" id="91"  name="deformities" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="92">Asymmetrical alignment of the body</label>
            <input type="text" class="form-control input-sm" id="92" name="asymmetrical" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="93">Postural assessment</label>
            <input type="text" class="form-control input-sm" id="93" name="postural" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="94">Range of motion</label>
            <input type="text" class="form-control input-sm" id="94" name="range_motion" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="95">Muscle wasting</label>
            <input type="text" class="form-control input-sm" id="95" name="muscle_wasting" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="96">Neurological system</label>
            <input type="text" class="form-control input-sm" id="96" name="neurological" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="97">Assess co-ordinated movement</label>
            <input type="text" class="form-control input-sm" id="97" name="co_ordinated" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="98">Assess balance</label>
            <input type="text" class="form-control input-sm" id="98" name="balance" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="99">Assess equilibrium</label>
            <input type="text" class="form-control input-sm" id="99" name="equilibrium" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="100">Special investigation</label>
            <input type="text" class="form-control input-sm" id="100" name="investigation" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="101">Cough Type</label>
            <input type="text" class="form-control input-sm" id="101" name="cough" autocomplete="off">
    </div>
	<!--<div class="form-group col-md-3 col-sm-6">
            <label for="102">Type</label>
            <input type="text" class="form-control input-sm" id="102" name="type1" autocomplete="off">
    </div>-->
	<div class="form-group col-md-3 col-sm-6">
            <label for="103">What time</label>
            <input type="text" class="form-control input-sm" id="103" name="time" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="104">Aggravating factors</label>
            <input type="text" class="form-control input-sm" id="104" name="aggravating_factor" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="105">Sputum examination</label>
            <input type="text" class="form-control input-sm" id="105" name="sputum_exam" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="106">Blood examination</label>
            <input type="text" class="form-control input-sm" id="106" name="blood_exam" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="107">Chest x-ray</label>
            <input type="text" class="form-control input-sm" id="107" name="chest_xray" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="108">E.C.G</label>
            <input type="text" class="form-control input-sm" id="108" name="ecg" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="109">ABG</label>
            <input type="text" class="form-control input-sm" id="109" name="abg" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="110">PFT</label>
            <input type="text" class="form-control input-sm" id="110" name="pft" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="111">Stress test</label>
            <input type="text" class="form-control input-sm" id="111" name="stress" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="112">2D-Echo cardiogram</label>
            <input type="text" class="form-control input-sm" id="112"  name="2d_echo" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="113">CT scan</label>
            <input type="text" class="form-control input-sm" id="113" name="ct_scan" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="114">Angiogram</label>
            <input type="text" class="form-control input-sm" id="114" name="angiogram" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="115">Ultrasound scan</label>
            <input type="text" class="form-control input-sm" id="115" name="ultrasound_scan" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="116">MRI scan</label>
            <input type="text" class="form-control input-sm" id="116" name="mri_scan" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="117">Provisional diagnosis</label>
            <input type="text" class="form-control input-sm" id="117" name="prov_diagnosis" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="118">Differential diagnosis</label>
            <input type="text" class="form-control input-sm" id="118" name="diff_diagnosis" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="119">Physiotherapy treatment</label>
            <input type="text" class="form-control input-sm" id="119" name="physio_treatment" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="120">Problem list</label>
            <input type="text" class="form-control input-sm" id="120" name="problem_list" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="121">Aims</label>
            <input type="text" class="form-control input-sm" id="121" name="aims" autocomplete="off">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label for="122">Means</label>
            <input type="text" class="form-control input-sm" id="122" name="means" autocomplete="off">
    </div>
	
	
	<div class="col-md-12 col-sm-12">
		<div class="form-group col-md-3 col-sm-3 pull-right" >
				<input type="submit" class="btn btn-primary" value="Submit" id="save"/>
		</div>
	</div>
</form>
</div>
	
	<script src="<?php echo base_url();?>assets/js/vendor/parsley/parsley.min.js"></script>
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
 <script src="<?php  echo base_url();  ?>assets/js/vendor/bootstrap/bootstrap-dropdown-multilevel.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php  echo base_url();  ?>assets/js/vendor/mmenu/js/jquery.mmenu.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php  echo base_url();  ?>assets/js/vendor/nicescroll/jquery.nicescroll.min.js" type="text/javascript"></script>
     <script src="<?php echo base_url() ?>assets/js/vendor/momentjs/moment-with-langs.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/datepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/colorpalette/bootstrap-colorpalette.js" type="text/javascript"></script>
   
   
 
<script>

/* $(".edit").click(function(){
			var val = $('#assess_id').val();
			var val1 = $('#patient_id').val();
			window.location= "<?php echo base_url().'assessment/cardio_edit/' ?>"+val1+'/'+val;
		});
		$(".print").click(function(){
			var val = $('#assess_id').val();
			var val1 = $('#patient_id').val();
			window.location= "<?php echo base_url().'assessment/print_cardio/' ?>"+val1+'/'+val;
		});
$("#assess_date").change(function(){
			var val = $("#assess_date").val();
			var patient_id = $("#patient_id").val();
			var url= '<?php echo base_url().'assessment/cardio_assessment_info' ?>';
			$.ajax({
					type: "POST",
					dataType: 'json',
					data : {val:val,patient_id:patient_id},
					url: url,
					success: function(data) {
						if(data.status == 'success'){
							$('#assess_id').val(data.message);
							$('.view').show();
							$('.create').hide();
						} else if(data.status != 'success') {
							$('.create').show();
							$('.view').hide();
					    }
					}, 
					complete: function(){
							
					},
					error: function(e){ 
						alert(e.responseText);
					} 
				 }); 
		}); */

$(document).ready(function() {
  $('form').on('submit', function (event) {
         event.preventDefault();
		 var $form = $(this);
		 if ( $(this).parsley().isValid() ) {
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
				
				$.jGrowl("Patient Assessment Has Been Added Successfully!");
				setTimeout(function(){ 
				window.location = '<?php echo base_url().'client/patient/view/' ?>'+id;
				}, 1000);
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$.jGrowl("Patient Assessment Has Not Been Added Successfully!");
				setTimeout(function(){ 
				$('.md-close btn btn-default').click();
				window.location.reload();
				}, 1000);
			}
      });
	  }
		else{
			
		}

			  
});  
}); 

function myFunction() {
  window.print();
}

$(':radio:not(:checked)').attr('disabled', true);

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
	
	//initialize datepicker
      $('.datepicker').datetimepicker({
        icons: {
          time: "fa fa-clock-o",
          date: "fa fa-calendar",
          up: "fa fa-arrow-up",
          down: "fa fa-arrow-down"
        }
      });

      $(".datepicker").on("dp.show",function (e) {
        var newtop = $('.bootstrap-datetimepicker-widget').position().top - 45;      
        $('.bootstrap-datetimepicker-widget').css('top', newtop + 'px');
      });
	  
	  

		var myDate = new Date();
			var prettyDate =(myDate.getDate()) + '/' + (myDate.getMonth()+1) + '/' +
					myDate.getFullYear();
		$(".assess_date").val(prettyDate);

</script>
</body>
</html>