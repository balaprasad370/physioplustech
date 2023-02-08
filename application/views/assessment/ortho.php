<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Physio Plus Tech</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="icon" type="image/ico" href="<?php echo base_url() ?>assets/images/favicon.ico" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/jgrowl/css/jquery.jgrowl.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/datepicker/css/bootstrap-datetimepicker.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/colorpicker/css/bootstrap-colorpicker.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/colorpalette/bootstrap-colorpalette.css">
  <style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

.range-slider {
  width: 100%;
}

.range-slider__range {
  -webkit-appearance: none;
  width: calc(100% - (73px));
  height: 10px;
  border-radius: 5px;
  background: #d7dcdf;
  outline: none;
  padding: 0;
  margin: 0;
}
.range-slider__range::-webkit-slider-thumb {
  -webkit-appearance: none;
          appearance: none;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  background: #2c3e50;
  cursor: pointer;
  -webkit-transition: background .15s ease-in-out;
  transition: background .15s ease-in-out;
}
.range-slider__range::-webkit-slider-thumb:hover {
  background: #1abc9c;
}
.range-slider__range:active::-webkit-slider-thumb {
  background: #1abc9c;
}
.range-slider__range::-moz-range-thumb {
  width: 20px;
  height: 20px;
  border: 0;
  border-radius: 50%;
  background: #2c3e50;
  cursor: pointer;
  -webkit-transition: background .15s ease-in-out;
  transition: background .15s ease-in-out;
}
.range-slider__range::-moz-range-thumb:hover {
  background: #1abc9c;
}
.range-slider__range:active::-moz-range-thumb {
  background: #1abc9c;
}

.range-slider__value {
  display: inline-block;
  position: relative;
  width: 60px;
  color: #fff;
  line-height: 20px;
  text-align: center;
  border-radius: 3px;
  background: #2c3e50;
  padding: 5px 10px;
  margin-left: 8px;
}
.range-slider__value:after {
  position: absolute;
  top: 8px;
  left: -7px;
  width: 0;
  height: 0;
  border-top: 7px solid transparent;
  border-right: 7px solid #2c3e50;
  border-bottom: 7px solid transparent;
  content: '';
}

::-moz-range-track {
  background: #d7dcdf;
  border: 0;
}

.radio label {
  display: inline-block;
  cursor: pointer;
  position: relative;
  padding-left: 25px;
  margin-right: 15px;
  font-size: 13px;
  margin-bottom:6px;
  color: #777a80;
}

.radio input[type=radio]:checked + label
{
color :#383838;
}</style></head>
  <body>
<div class="panel panel-primary" style="margin:20px;">
	<div class="panel-heading">
       <center><h3 class="panel-title"><b><?php echo $clientDetails['clinic_name'];?></b></br>
		</br>Contributed by : <b>SRM Medical College Hospital And Research Centre, Chennai.</b>
		</br></br><b>Orthopedic Assessment</b>
		</center></h3>
	</div>
<div class="panel-body">
    <form action="<?php echo base_url().'assessment/add_ortho' ?>" method="post">
<div class="col-md-12 col-sm-12">
   <!--<div class="form-group col-md-6 col-sm-6">
            <label >ASSESSMENT DATE  *	</label>
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
	<div class="create">
		<div class="form-group col-md-6 col-sm-6">
            <label >Name   *	</label>
            <input type="text" name="name" readonly value="<?php echo $patient['first_name'].' '.$patient['last_name']; ?>" class="form-control input-sm" id="name" placeholder="">
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label >Age *	</label>
            <input type="text" name="age" class="form-control input-sm" value="<?php echo $patient['age']; ?>" id="age" readonly>
        </div>
        <div class="form-group col-md-3 col-sm-6">
            <label >Sex </label>
             </br><input type="radio" name="gender" <?php if($patient['gender'] == 'male'){ echo 'checked'; } else { } ?>  value="male" id="gender"  />
		    <label >Male&nbsp;&nbsp;</label>
		    <input type="radio" name="gender" <?php if($patient['gender'] == 'female'){ echo 'checked'; } else { } ?> value="female" id="gender" />
		    <label >Female&nbsp;&nbsp;</label>
		   </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Occupation: </label>
            <input type="text" value="<?php echo $patient['occupation']; ?>" name="Occupation"  class="form-control input-sm" readonly>
        </div>
		<!--<div class="form-group col-md-6 col-sm-6">
            <label >UHID no </label>
            <input type="text" name="uhid" class="form-control input-sm" placeholder="">
        </div>-->
		<div class="form-group col-md-3 col-sm-6">
            <label for="5">Patient Code</label>
            <input type="text" class="form-control input-sm" id="5" value="<?php echo $patient['patient_code'];?>" readonly autocomplete="off">
        </div>
		<div class="form-group col-md-6 col-sm-12">
            <label for="country">Address *</label>
             <textarea class="form-control input-sm" name="address" id="address" rows="3" readonly><?php echo $patient['address_line1']; ?></textarea>
	  </div>
	  <div class="form-group col-md-6 col-sm-6">
            <label for="mobile">Phone no:</label>
            <input type="text"  name="mobile" class="form-control input-sm" value="<?php echo $patient['mobile_no']; ?>" id="mobile" readonly>
        </div>
		<div class="form-group col-md-12 col-sm-12">
        </div>
       <div class="form-group col-md-6 col-sm-6">
            <label >CHIEF COMPLAINTS	</label>
            <input type="text" class="form-control input-sm" name="complaints" id="complaints" placeholder="">
        </div>
        <div class="form-group col-md-6 col-sm-6">
            <label > Hand  Dominance	</label>
            <input type="text" class="form-control input-sm" name="Dominance" id="Dominance" placeholder="">
        </div>
		<div class="form-group col-md-12 col-sm-12">
         <p style="color:#63C0EE;">History </p>
	    </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Present History	</label>
            <input type="text" class="form-control input-sm" name="Present" id="Present" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Past History	</label>
            <input type="text" class="form-control input-sm" name="Past" id="Past" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Medical History:	</label>
            <input type="text" class="form-control input-sm" name="Medical" id="Medical" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Surgical History	</label>
            <input type="text" class="form-control input-sm" name="Surgical" id="Surgical" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Personal / Social History	</label>
            <input type="text" class="form-control input-sm" name="Personal" id="Personal" placeholder="">
        </div>
		<div class="form-group col-md-12 col-sm-12">
        <p style="color:#63C0EE;">Pain Assessment</p>
		</div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Site and Side:	</label>
            <input type="text" class="form-control input-sm" name="site" id="site" placeholder="">
        </div>
	   	<div class="form-group col-md-6 col-sm-6">
            <label >Onset	</label>
            <input type="text" class="form-control input-sm" name="Onset" id="Onset" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Duration	</label>
            <input type="text" class="form-control input-sm" name="Duration" id="Duration" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Nature	</label>
            <input type="text" class="form-control input-sm" name="Nature" id="Nature" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Type	</label>
            <input type="text" class="form-control input-sm" name="Type" id="Type" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Behavior	</label>
            <input type="text" class="form-control input-sm" name="Behavior" id="Behavior" placeholder="">
        </div>
		<div class="form-group col-md-12 col-sm-12">
         <p style="color:#63C0EE;">Severity </p>
          <div class="range-slider">
                  <input class="range-slider__range" type="range" value="5" min="0" max="10" name="severity">
                  <span class="range-slider__value">0</span>
          </div>
		</div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Irritability	</label>
            <input type="text" class="form-control input-sm" name="Irritability" id="Irritability" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >24 hours Pattern	</label>
            <input type="text" class="form-control input-sm" name="Pattern" id="Pattern" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Aggravating Factors	</label>
            <input type="text" class="form-control input-sm" name="Aggravating" id="Aggravating" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Relieving Factors	</label>
            <input type="text" class="form-control input-sm" name="Relieving" id="Relieving" placeholder="">
        </div>
	   
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
        </div></td></tr></table> 
       <div class="form-group col-md-12 col-sm-12">
        <p style="color:#63C0EE;">On Observation</p>
        </div>
		<div class="form-group col-md-12 col-sm-12">
        <p style="color:black;">General Observation</p>
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Built	</label>
            <input type="text" class="form-control input-sm" name="Built" id="Built" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Posture	</label>
            <input type="text" class="form-control input-sm" name="Posture" id="Posture" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Gait	</label>
            <input type="text" class="form-control input-sm" name="Gait" id="Gait" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >External fixation	</label>
            <input type="text" class="form-control input-sm" name="fixation" id="fixation" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Mobility Aids	</label>
            <input type="text" class="form-control input-sm" name="m_aids" id="m_aids" placeholder="">
        </div>
		<div class="form-group col-md-12 col-sm-12">
         <p style="color:black;">Local Observation </p>
	    </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Local swelling	</label>
            <input type="text" class="form-control input-sm" name="l_swelling" id="l_swelling" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Body contour	</label>
            <input type="text" class="form-control input-sm" name="b_contour" id="b_contour" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Soft tissue contour	</label>
            <input type="text" class="form-control input-sm" name="s_contour" id="s_contour" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Muscle wasting	</label>
            <input type="text" class="form-control input-sm" name="wasting" id="wasting" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Skin changes	</label>
            <input type="text" class="form-control input-sm" name="skin" id="skin" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Hair loss	</label>
            <input type="text" class="form-control input-sm" name="loss" id="loss" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Clubbing	</label>
            <input type="text" class="form-control input-sm" name="Clubbing" id="Clubbing" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Cyanosis	</label>
            <input type="text" class="form-control input-sm" name="Cyanosis" id="Cyanosis" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Open wound/scar	</label>
            <input type="text" class="form-control input-sm" name="scar" id="scar" placeholder="">
        </div>
		<div class="form-group col-md-12 col-sm-12">
         <p style="color:black;">On Palpation</p>
	    </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Tenderness	</label>
            <input type="text" class="form-control input-sm" name="Tenderness" id="Tenderness" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Warmth	</label>
            <input type="text" class="form-control input-sm" name="Warmth" id="Warmth" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Spasm	</label>
            <input type="text" class="form-control input-sm" name="Spasm" id="Spasm" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Scar	</label>
            </br><input type="radio" name="Scar_type" value="Mobile" id="Mobile"  />
		  <label for="Mobile">Mobile   &nbsp;&nbsp;</label>
		  <input type="radio" name="Scar_type" value="Adherent" id="Adherent" />
		  <label for="Adherent">Adherent &nbsp;&nbsp;</label>
		 </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Crepitus	</label>
            <input type="text" class="form-control input-sm" name="Crepitus" id="Crepitus" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Bony Spur	</label>
            <input type="text" class="form-control input-sm" name="Spur" id="Spur" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Oedema	</label>
            </br><input type="radio" name="Oedema" parsley-required="true" value="Pitting" id="Pitting"  />
			  <label for="Pitting">Pitting  &nbsp;&nbsp;</label>
			  <input type="radio" name="Oedema" parsley-required="true" value="Non Pitting" id="Non Pitting" />
			  <label for="Non Pitting">Non Pitting&nbsp;&nbsp;</label>
		  </div>
		<div class="form-group col-md-12 col-sm-12">
         <p style="color:#63C0EE;">On Examination</p>
	    </div>
		 
		<table style="width:100%;"  border="1"  >
								<tr><td colspan="2" style="40%;">&nbsp;&nbsp;&nbsp; </td><td><center><b>Right</b></center></td><td><center><b>Left</b></center></td></tr>
								<tr><td colspan="2">&nbsp;&nbsp;&nbsp;Range of Motion	</td><td><div class="input-field"><input type="text" name="motion_right" id="motion_right" class="box-input" style="width:100%;" /></div></td><td><div class="input-field"><input type="text" name="motion_left" id="motion_left" class="box-input" style="width:100%;" /></div></td></tr>
								<tr><td colspan="2">&nbsp;&nbsp;&nbsp; Muscle Strength	</td><td><div class="input-field"><input type="text" name="strength_right" id="strength_right" class="box-input" style="width:100%;" /></div></td><td><div class="input-field"><input type="text" name="strength_left" id="strength_left" class="box-input" style="width:100%;" /></div></td></tr>
								<tr><td colspan="4"><center>&nbsp;&nbsp;&nbsp;<b>Resisted Isometrics </b></center></td></tr>
								<tr><td colspan="2">&nbsp;&nbsp;&nbsp; Limb Length	</td><td><div class="input-field"><input type="text" name="limb_right" id="limb_right" class="box-input" style="width:100%;" /></div></td><td><div class="input-field"><input type="text" name="limb_left" id="limb_left" class="box-input" style="width:100%;" /></div></td></tr>
								<tr><td colspan="2">&nbsp;&nbsp;&nbsp;Apparent  </td><td colspan="3"><div class="input-field"><input type="text" name="Apparent" id="Apparent" class="box-input" style="width:100%;" /></div></td></tr>
								<tr><td colspan="2">&nbsp;&nbsp;&nbsp;True  </td><td colspan="3"><div class="input-field"><input type="text" name="true" id="true" class="box-input" style="width:100%;" /></div></td></tr>
								<tr><td colspan="2">&nbsp;&nbsp;&nbsp; Muscle Girth	</td><td><div class="input-field"><input type="text" name="muscle_left" id="muscle_left" class="box-input" style="width:100%;" /></div></td><td><div class="input-field"><input type="text" name="muscle_right" id="muscle_right" class="box-input" style="width:100%;" /></div></td></tr>
		</table>
		 </br>
		<div class="form-group col-md-3 col-sm-6">
					<label >Mid Thigh	</label>
					<input type="text" class="form-control input-sm" name="thigh" id="thigh" placeholder="">
		</div>
		<div class="form-group col-md-3 col-sm-6">
					<label >Mid Calf	</label>
					<input type="text" class="form-control input-sm" name="calf" id="calf" placeholder="">
		</div>
		<div class="form-group col-md-3 col-sm-6">
					<label >Mid Arm	</label>
					<input type="text" class="form-control input-sm" name="arm" id="arm" placeholder="">
		</div>
		<div class="form-group col-md-3 col-sm-6">
					<label >Mid forearm	</label>
					<input type="text" class="form-control input-sm" name="forearm" id="forearm" placeholder="">
		</div></br></br>
		 
		<table style="width:100%;"  border="1"  >
								<tr><td colspan="2" style="40%;">&nbsp;&nbsp;&nbsp; </td><td><center><b>Right</b></center></td><td><center><b>Left</b></center></td></tr>
								<tr><td colspan="2">&nbsp;&nbsp;&nbsp;Deep Tendon Reflexes	</td><td><div class="input-field"><input type="text" name="d_rightreflexes" id="d_rightreflexes" class="box-input" style="width:100%;" /></div></td><td><div class="input-field"><input type="text" name="d_leftreflexes" id="d_leftreflexes" class="box-input" style="width:100%;" /></div></td></tr>
		</table>
		 </br></br>
		<div class="form-group col-md-6 col-sm-6">
            <label >Biceps	</label>
            <input type="text" class="form-control input-sm" name="Biceps" id="Biceps" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Triceps	</label>
            <input type="text" class="form-control input-sm" name="Triceps" id="Triceps" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Brachioradialis 	</label>
            <input type="text" class="form-control input-sm" name="Brachioradialis" id="Brachioradialis" placeholder="">
        </div><div class="form-group col-md-6 col-sm-6">
            <label >Knee	</label>
            <input type="text" class="form-control input-sm" name="knee" id="knee" placeholder="">
        </div><div class="form-group col-md-6 col-sm-6">
            <label >Ankle 	</label>
            <input type="text" class="form-control input-sm" name="ankle" id="ankle" placeholder="">
        </div><div class="form-group col-md-6 col-sm-6">
            <label >Superficial Reflexes	</label>
            <input type="text" class="form-control input-sm" name="superficial" id="superficial" placeholder="">
        </div><div class="form-group col-md-6 col-sm-6">
            <label >Abdominal 	</label>
            <input type="text" class="form-control input-sm" name="abdominal" id="abdominal" placeholder="">
        </div><div class="form-group col-md-6 col-sm-6">
            <label >Plantar	</label>
            <input type="text" class="form-control input-sm" name="plantar" id="plantar" placeholder="">
        </div><div class="form-group col-md-6 col-sm-6">
            <label >Sensory Evaluation	</label>
            <input type="text" class="form-control input-sm" name="sensory" id="sensory" placeholder="">
        </div><div class="form-group col-md-6 col-sm-6">
            <label >Superficial sensation	</label>
            <input type="text" class="form-control input-sm" name="superficial_sen" id="superficial_sen" placeholder="">
        </div><div class="form-group col-md-6 col-sm-6">
            <label >Deep sensation	</label>
            <input type="text" class="form-control input-sm" name="deep" id="deep" placeholder="">
        </div><div class="form-group col-md-6 col-sm-6">
            <label >Balance Assessment	</label>
            <input type="text" class="form-control input-sm" name="balance" id="balance" placeholder="">
        </div><div class="form-group col-md-6 col-sm-6">
            <label >Posture Assessment	</label>
            <input type="text" class="form-control input-sm" name="posture_ass" id="posture_ass" placeholder="">
        </div><div class="form-group col-md-6 col-sm-6">
            <label >Gait Evaluation	</label>
            <input type="text" class="form-control input-sm" name="gait_ass" id="gait_ass" placeholder="">
        </div><div class="form-group col-md-6 col-sm-6">
            <label >Functional Assessment	</label>
            <input type="text" class="form-control input-sm" name="functional" id="functional" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Special Test	</label>
            <input type="text" class="form-control input-sm" name="special" id="special" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Investigations	</label>
            <input type="text" class="form-control input-sm" name="investigation" id="investigation" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Physical therapy Diagnosis:	</label>
            <input type="text" class="form-control input-sm" name="p_diagnosis" id="p_diagnosis" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Differential Diagnosis	</label>
            <input type="text" class="form-control input-sm" name="diff_diagnosis" id="diff_diagnosis" placeholder="">
        </div>
		<!--<div class="form-group col-md-6 col-sm-6">
            <label >Management	</label>
            <input type="text" class="form-control input-sm" name="manage" id="manage" placeholder="">
        </div>-->
		<div class="form-group col-md-12 col-sm-12">
         <p style="color:#63C0EE;font-weight:bold;">Management</p>
	    </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Problem List	</label>
           <textarea class="form-control input-sm" name="pbm_list" id="pbm_list" rows="3"></textarea>
	    </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Anticipatory Goals	</label>
           <textarea class="form-control input-sm" name="a_goal" id="a_goal" rows="3"></textarea>
	    </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Long Term Goals	</label>
            <textarea class="form-control input-sm" name="long_goal" id="long_goal" rows="3"></textarea>
	    </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Short Term Goals	</label>
            <textarea class="form-control input-sm" name="manage" id="manage" rows="3"></textarea>
	    </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Physiotherapy Treatment	</label>
            <textarea class="form-control input-sm" name="p_treatment" id="p_treatment" rows="3"></textarea>
	    </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Orthotic/Prosthetic Advice	</label>
            <textarea class="form-control input-sm" name="p_advice" id="p_advice" rows="3"></textarea>
	    </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Home Advices	</label>
             <textarea class="form-control input-sm" name="h_advices" id="h_advices" rows="3"></textarea>
	    </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Follow Up 	</label>
            <textarea class="form-control input-sm" name="follow" id="follow" rows="3"></textarea>
	   </div>
		
	
   <div class="col-md-12 col-sm-12">
		<div class="form-group col-md-3 col-sm-3 pull-right" >
				<input type="submit" class="btn btn-primary" value="Submit" id="save"/>
		</div>
	</div></div>
</form>
</div>
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
   <script src="https://www.physioplustech.in/range/js/index.js"></script>
    <script src="<?php  echo base_url();  ?>assets/js/vendor/bootstrap/bootstrap-dropdown-multilevel.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php  echo base_url();  ?>assets/js/vendor/mmenu/js/jquery.mmenu.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php  echo base_url();  ?>assets/js/vendor/nicescroll/jquery.nicescroll.min.js" type="text/javascript"></script>
     <script src="<?php echo base_url() ?>assets/js/vendor/momentjs/moment-with-langs.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/datepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/colorpalette/bootstrap-colorpalette.js" type="text/javascript"></script>
   
   
 
	<script>
	
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
	 $(document).ready(function() {
		
		$('#alcohol_rate').hide();
		$("input[type='radio']").click(function(){
            var radioValue = $("input[name='Alcohol']:checked").val();
            if(radioValue == 'yes'){
                $('#alcohol_rate').show();
            }
			else{
                $('#alcohol_rate').hide();
            }
        });
		$(".edit").click(function(){
			var val = $('#assess_id').val();
			var val1 = $('#patient_id').val();
			window.location= "<?php echo base_url().'assessment/edit_ortho/' ?>"+val1+'/'+val;
		});
		$(".print").click(function(){
			var val = $('#assess_id').val();
			var val1 = $('#patient_id').val();
			window.location= "<?php echo base_url().'assessment/print_ortho/' ?>"+val1+'/'+val;
		});
		$("#assess_date").change(function(){
			var val = $("#assess_date").val();
			var patient_id = $("#patient_id").val();
			var url= '<?php echo base_url().'assessment/ortho_assessment_info' ?>';
			$.ajax({
					type: "POST",
					dataType: 'json',
					data : {val:val,patient_id:patient_id},
					url: url,
					success: function(data) {
						if(data.status == 'success'){
							$('#assess_id').val(data.message);
							$('.view').show();
						} else if(data.status != 'success') {
							$('.create').show();
					    }
					}, 
					complete: function(){
							
					},
					error: function(e){ // alert error if ajax fails
						alert(e.responseText);
					} 
				 }); 
		});
		$('form').on('submit', function (event) {
				 event.preventDefault();
				 var $form = $(this);
				 var  formID = $(this).attr("id");
				 var  formURL = $(this).attr("action");
				 var id = $('#patient_id').val();
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

					  
		}); 
	});
	
	$('#gender:radio:not(:checked)').attr('disabled', true);
	
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



