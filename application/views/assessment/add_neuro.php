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
</style></head>
  <body>
<div class="panel panel-primary" style="margin:20px;">
	<div class="panel-heading">
       <center><h3 class="panel-title"><b><?php echo $clientDetails['clinic_name'];?></b></br>
		</br>Contributed by : <b>SRM Medical College Hospital And Research Centre, Chennai.</b> 
		</br></br><b>Neurological Assessment</b>
		</center></h3>
	</div>
<div class="panel-body">
    <form action="<?php echo base_url().'assessment/add_neuro' ?>" method="post">
<div class="col-md-12 col-sm-12">
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
						</center></br></br>
		</div>
	<div class="create">
		<div class="form-group col-md-6 col-sm-6">
            <label for="name">Name   *	</label>
            <input type="text" name="name" value="<?php echo $patient['first_name'].' '.$patient['last_name']; ?>" class="form-control input-sm" id="name" readonly>
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="age">Age *	</label>
            <input type="text" name="age" class="form-control input-sm" value="<?php echo $patient['age']; ?>" id="age" readonly>
        </div>
        <div class="form-group col-md-3 col-sm-6">
            <label for="gender">Sex </label>
             </br><input type="radio" name="gender" <?php if($patient['gender'] == 'male'){ echo 'checked'; } else { } ?>  value="male" id="Male"  />
		    <label for="Male">Male&nbsp;&nbsp;</label>
		    <input type="radio" name="gender" <?php if($patient['gender'] == 'female'){ echo 'checked'; } else { } ?> value="female" id="female" />
		    <label for="female">Female&nbsp;&nbsp;</label>
		</div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Occupation">Occupation: </label>
            <input type="text" name="Occupation"  class="form-control input-sm" placeholder="" value="<?php echo $patient['occupation'];?>" readonly>
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Ip">IP no </label>
            <input type="text" name="Ip" class="form-control input-sm" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Op">OP no </label>
            <input type="text" name="Op" class="form-control input-sm" placeholder="">
        </div>
		
       <div class="form-group col-md-6 col-sm-6">
            <label for="Complaints">CHIEF COMPLAINTS	</label>
            <input type="text" class="form-control input-sm" name="Complaints" id="complaints" placeholder="">
        </div>
        <div class="form-group col-md-12 col-sm-12">
         <p style="color:#63C0EE;">History of present illness: </p>
	    </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Present">Onset / Duration	</label>
            <input type="text" class="form-control input-sm" name="Present" id="Present" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Mental">Mental state	</label>
            <input type="text" class="form-control input-sm" name="Mental" id="Mental" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Loc">LOC 	</label>
            <input type="text" class="form-control input-sm" name="Loc" id="Loc" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Convulsions">Convulsions	</label>
            <input type="text" class="form-control input-sm" name="Convulsions" id="Convulsions" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Headache">Headache	</label>
            <input type="text" class="form-control input-sm" name="Headache" id="Headache" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Sleep">Sleep	</label>
            <input type="text" class="form-control input-sm" name="Sleep" id="Sleep" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Speech">Speech	</label>
            <input type="text" class="form-control input-sm" name="Speech" id="Speech" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Sensation">Movement/sensation	</label>
            <input type="text" class="form-control input-sm" name="Sensation" id="Sensation" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Spincter">Spincter control	</label>
            <input type="text" class="form-control input-sm" name="Spincter" id="Spincter" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Past_illness">History of past illness </label>
            <input type="text" class="form-control input-sm" name="Past_illness" id="Past_illness" placeholder="">
        </div>
	   	<div class="form-group col-md-6 col-sm-6">
            <label for="Mode">Mode of injury	</label>
            <input type="text" class="form-control input-sm" name="Mode" id="Mode" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Medical">Medical history	</label>
            <input type="text" class="form-control input-sm" name="Medical" id="Medical" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Developmental">Developmental history	</label>
            <input type="text" class="form-control input-sm" name="Developmental" id="Developmental" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Birth">Birth history	</label>
            <input type="text" class="form-control input-sm" name="Birth" id="Birth" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Family">Family history	</label>
            <input type="text" class="form-control input-sm" name="Family" id="Family" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Personal">Personal history	</label>
            <input type="text" class="form-control input-sm" name="Personal" id="Personal" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Pain">Pain assessment if necessary	</label>
            <input type="text" class="form-control input-sm" name="Pain" id="Pain" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="observation1">On Observation:	</label>
            <input type="text" class="form-control input-sm" name="observation1" id="observation1" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Built">Built	</label>
            <input type="text" class="form-control input-sm" name="Built" id="Built" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Posture">Posture	</label>
            <input type="text" class="form-control input-sm" name="Posture" id="Posture" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Attitude">Attitude of limbs	</label>
            <input type="text" class="form-control input-sm" name="Attitude" id="Attitude" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="External">External appliances	</label>
            <input type="text" class="form-control input-sm" name="External" id="External" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Involuntary">Involuntary movements	</label>
            <input type="text" class="form-control input-sm" name="Involuntary" id="Involuntary" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Ambulation">Mode of ambulation	</label>
            <input type="text" class="form-control input-sm" name="Ambulation" id="ambulation" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Tropical">Tropical changes	</label>
            <input type="text" class="form-control input-sm" name="Tropical" id="Tropical" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Breathing">Type of breathing	</label>
            <input type="text" class="form-control input-sm" name="Breathing" id="Breathing" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="observation">On observation	</label>
            <input type="text" class="form-control input-sm" name="observation" id="observation" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Muscle_tone">Muscle tone – atonic/flaccid/spastic/rigid	</label>
            <input type="text" class="form-control input-sm" name="Muscle_tone" id="Muscle_tone" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Symmetry">Symmetry of chest expansion	</label>
            <input type="text" class="form-control input-sm" name="Symmetry" id="Symmetry" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Palpation">On palpation	</label>
            <input type="text" class="form-control input-sm" name="Palpation" id="Palpation" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Skin_temperature">Skin temperature	</label>
            <input type="text" class="form-control input-sm" name="Skin_temperature" id="Skin_temperature" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Swelling">Swelling	</label>
            <input type="text" class="form-control input-sm" name="Swelling" id="Swelling" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Tone">Tone	</label>
            <input type="text" class="form-control input-sm" name="Tone" id="Tone" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Pain_site">Pain site	</label>
            <input type="text" class="form-control input-sm" name="Pain_site" id="Pain_site" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Trigger_point">Trigger point	</label>
            <input type="text" class="form-control input-sm" name="Trigger_point" id="Trigger_point" placeholder="">
        </div>
		<div class="form-group col-md-12 col-sm-12">
         <p style="color:#000;">On Examination</p>
	    </div>
		
		
		<div class="form-group col-md-6 col-sm-6">
            <label for="Glascow">1) LOC according to GLASCOW COMA SCALE	</label>
            <input type="text" class="form-control input-sm" name="Glascow" id="Glascow" placeholder="">
        </div>
		<div class="form-group col-md-12 col-sm-12">
         <p style="color:#000;">EYE OPENING</p>
	    </div>
		
		
		<div class="form-group col-md-6 col-sm-6">
            <label for="Spontaneous">Spontaneous	</label>
            <input type="text" class="form-control input-sm" name="Spontaneous" id="Spontaneous" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Speech1">To speech	</label>
            <input type="text" class="form-control input-sm" name="Speech1" id="Speech1" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Painful">To painful stimulus	</label>
           <input type="text" class="form-control input-sm" name="Painful" id="Painful" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="No_response1">No response	</label>
           <input type="text" class="form-control input-sm" name="No_response1" id="No_response1" placeholder="">
        </div>
		
		<div class="form-group col-md-12 col-sm-12">
         <p style="color:#000;">MOTOR RESPONSE</p>
	    </div>
		
		<div class="form-group col-md-6 col-sm-6">
					<label for="Follows">Follows motor commands	</label>
					<input type="text" class="form-control input-sm" name="Follows" id="Follows" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label for="Localizes">Localizes	</label>
					<input type="text" class="form-control input-sm" name="Localizes" id="Localizes" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label for="Withdraws">Withdraws	</label>
					<input type="text" class="form-control input-sm" name="Withdraws" id="Withdraws" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label for="Abnormal">Abnormal flexion	</label>
					<input type="text" class="form-control input-sm" name="Abnormal" id="Abnormal" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label for="Extensor">Extensor response	</label>
					<input type="text" class="form-control input-sm" name="Extensor" id="Extensor" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label for="No_response2">No response	</label>
					<input type="text" class="form-control input-sm" name="No_response2" id="No_response2" placeholder="">
		</div>
		<div class="form-group col-md-12 col-sm-12">
         <p style="color:#000;">VERBAL RESPONSE</p>
	    </div>
		
		<div class="form-group col-md-6 col-sm-6">
            <label for="Oriented">Oriented	</label>
           <input type="text" class="form-control input-sm" name="Oriented" id="Oriented" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
					<label for="Confused">Confused conversation	</label>
					<input type="text" class="form-control input-sm" name="Confused" id="Confused" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label for="Inappropriate">Inappropriate words	</label>
					<input type="text" class="form-control input-sm" name="Inappropriate" id="Inappropriate" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label for="Incomprehensible">Incomprehensible sounds	</label>
					<input type="text" class="form-control input-sm" name="Incomprehensible" id="Incomprehensible" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label for="No_response3">No response	</label>
					<input type="text" class="form-control input-sm" name="No_response3" id="No_response3" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label for="Memory">2) Memory – short term / long term	</label>
					<input type="text" class="form-control input-sm" name="Memory" id="Memory" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label for="Orientation">3) Orientation – time / place / person	</label>
					<input type="text" class="form-control input-sm" name="Orientation" id="Orientation" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label for="Attention">4) Attention	</label>
					<input type="text" class="form-control input-sm" name="Attention" id="Attention" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label for="Abstract">5) Abstract reasoning thoughts	</label>
					<input type="text" class="form-control input-sm" name="Abstract" id="Abstract" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label for="Judgment">6) Judgment	</label>
					<input type="text" class="form-control input-sm" name="Judgment" id="Judgment" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label for="Calculation">7) Calculation	</label>
					<input type="text" class="form-control input-sm" name="Calculation" id="Calculation" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label for="Communication">8) Communication ability	</label>
					</br>&nbsp;&nbsp;a.	Impairment in receptive language (word recognition, auditory comprehension, reading comprehension)
					</br>&nbsp;&nbsp;b.	Impairment in expressive language (word finding, fluency, writing,  spelling)
					</br>&nbsp;&nbsp;c.	Perception: Unilateral neglect/ Apraxia/ Agnosia
		</div><div class="form-group col-md-12 col-sm-12">
					<label for="Cranial">9)	Cranial nerve examination	</label>
		</div><div class="form-group col-md-6 col-sm-6">
					<label for="Olfactory">i.	Olfactory -  anosmia	</label>
					<input type="text" class="form-control input-sm" name="Olfactory" id="Olfactory" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label for="Optic">ii.	Optic – visual acuity, visual field	</label>
					<input type="text" class="form-control input-sm" name="Optic" id="Optic" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label for="Occulomotor">iii.	Occulomotor	</label>
					<input type="text" class="form-control input-sm" name="Occulomotor" id="Occulomotor" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label for="Trochlear">iv.	Trochlear                 	</label>
					<input type="text" class="form-control input-sm" name="Trochlear" id="Trochlear" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label for="Abducens">v.	Abducens	</label>
					<input type="text" class="form-control input-sm" name="Abducens" id="Abducens" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label for="Trigeminal">vi.	Trigeminal (mixed)- jaw jerk	</label>
					<input type="text" class="form-control input-sm" name="Trigeminal" id="Trigeminal" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label for="Facial">vii.	Facial (mixed)	</label>
					<input type="text" class="form-control input-sm" name="Facial" id="Facial" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label for="Vestibule">viii.	Vestibule cochlear S – caloric test	</label>
					<input type="text" class="form-control input-sm" name="Vestibule" id="Vestibule" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label for="Glossopharyngeal">ix.	Glossopharyngeal mix	</label>
					<input type="text" class="form-control input-sm" name="Glossopharyngeal" id="Glossopharyngeal" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label for="Vagus">x.	Vagus(mix)	</label>
					<input type="text" class="form-control input-sm" name="Vagus" id="Vagus" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label for="Spinal">xi.	Spinal accessory – sternocleidomastoid, trapezius	</label>
					<input type="text" class="form-control input-sm" name="Spinal_accessory" id="Spinal_accessory" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label for="Hypoglossal">xii.	Hypoglossal M – fasciculation,atrophy, deviation to affected side 	</label>
					<input type="text" class="form-control input-sm" name="Hypoglossal" id="Hypoglossal" placeholder="">
		</div>
		<div class="form-group col-md-12 col-sm-12">
					<label for="Sensory">Sensory assessment	</label>
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label for="Superficial">Superficial – touch, pain, temperature, pressure	</label>
					<input type="text" class="form-control input-sm" name="Superficial_touch" id="Superficial_touch" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label for="Deep">Deep – joint movement sense, joint position sense, vibration	</label>
					<input type="text" class="form-control input-sm" name="Deep_joint" id="Deep_joint" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label for="Cortical">Cortical– tactile localization, 2 point discrimination, stereognosis, barognosis, graphesthesia / person	</label>
					<input type="text" class="form-control input-sm" name="Cortical_tactile" id="Cortical_tactile" placeholder="">
		</div>
		<div class="form-group col-md-12 col-sm-12">
					<label for="Sensory1">Sensory grading	</label>
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label for="Intact_normal">1. Intact – normal accurate response	</label>
					<input type="text" class="form-control input-sm" name="Intact_normal" id="Intact_normal" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label for="Decreased_delay">2. Decreased – delayed response	</label>
					<input type="text" class="form-control input-sm" name="Decreased_delay" id="Decreased_delay" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label for="Exaggerated">3. Exaggerated – increased sensitivity or awareness of stimulus after it has ceased
	                </label>
					<input type="text" class="form-control input-sm" name="Exaggerated" id="Exaggerated" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label for="Inaccurate">4. Inaccurate – inappropriate perception to given stimulus
	                </label>
					<input type="text" class="form-control input-sm" name="Inaccurate" id="Inaccurate" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label for="Absent">5. Absent – no response
	                </label>
					<input type="text" class="form-control input-sm" name="Absent" id="Absent" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label for="Inconsistent">6. Inconsistent or ambiguous – reaponse inadequate to assess
	                </label>
					<input type="text" class="form-control input-sm" name="Inconsistent" id="Inconsistent" placeholder="">
		</div>
		<div class="form-group col-md-12 col-sm-12">
					<label for="Motor">Motor assessment	</label>
		</div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Muscle">Muscle spasticity – according to Modified Ashworth Scale	</label>
				</br>&nbsp;&nbsp;0-	No increase in muscle tone
				</br>&nbsp;&nbsp;1-	Slight increase in muscle tone (manifested by a catch and release or minimal resistance at the end of ROM)
				</br>&nbsp;&nbsp;1+- slight increase in muscle tone (manifested by a catch followed by minimal resistance throughout remainder of ROM)
				</br>&nbsp;&nbsp;2-	More marked increase in muscle tone throughtout most of ROM but affected part is easily moved
				</br>&nbsp;&nbsp;3-	Considerable increase in muscle tone passive movement is difficult
				</br>&nbsp;&nbsp;4-	Affected part in flexion or extension
		 </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="M_power">Muscle power	</label>
            <input type="text" class="form-control input-sm" name="M_power" id="M_power" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="ROM">ROM – active/passive 	</label>
            <input type="text" class="form-control input-sm" name="ROM" id="ROM" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="LMN">Muscle girth – LMN lesions	</label>
            <input type="text" class="form-control input-sm" name="LMN" id="LMN" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Reflexes">Reflexes – developmental 	</label>
            <input type="text" class="form-control input-sm" name="Reflexes" id="Reflexes" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Deep_tendon">Deep Tendon Reflexes	</label>
            <input type="text" class="form-control input-sm" name="Deep_tendon" id="Deep_tendon" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Biceps">Biceps (C5, C6) 	</label>
            <input type="text" class="form-control input-sm" name="Biceps" id="Biceps" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Triceps">Triceps (C7, C8)	</label>
            <input type="text" class="form-control input-sm" name="Triceps" id="Triceps" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Patellar">Patellar (L2, L3, L4)	</label>
            <input type="text" class="form-control input-sm" name="Patellar" id="Patellar" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Hamstrings">Hamstrings (L5, S1, S2)	</label>
            <input type="text" class="form-control input-sm" name="Hamstrings" id="Hamstrings" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Ankle">Ankle (S1, S2)	</label>
            <input type="text" class="form-control input-sm" name="Ankle" id="Ankle" placeholder="">
        </div>
		<!--<div class="form-group col-md-6 col-sm-6">
            <label for="Reflex">Reflex grading	</label>
            	</br>&nbsp;&nbsp;0-	Absent
				</br>&nbsp;&nbsp;+ - diminished (no movement)
				</br>&nbsp;&nbsp;++- normal (visible movement)
				</br>&nbsp;&nbsp;+++ - exaggerated
				</br>&nbsp;&nbsp;++++- exaggerated with clonus sustained movement lasting for more than 30 secs
        </div>-->
		<div class="form-group col-md-6 col-sm-6">
		<label for="Reflex grading">Reflex grading </label>
		</br><input type="radio" name="Reflex"  value="0-" id="Reflex"  />
		<label for="0">0- Absent&nbsp;&nbsp;</label></br>
		<input type="radio" name="Reflex" value="+-" id="Reflex" />
		<label for="+-">+ - diminished (no movement)&nbsp;&nbsp;</label></br>
		<input type="radio" name="Reflex" value="++-" id="Reflex" />
		<label for="++-">++- normal (visible movement)&nbsp;&nbsp;</label></br>
		<input type="radio" name="Reflex" value="+++-" id="Reflex" />
		<label for="+++-">+++ - exaggerated&nbsp;&nbsp;</label></br>
		<input type="radio" name="Reflex" value="++++-" id="Reflex" />
		<label for="++++-">++++- exaggerated with clonus sustained movement lasting for more than 30 secs&nbsp;&nbsp;</label>
		</div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Superficial_reflexes">Superficial reflexes	</label>
            <input type="text" class="form-control input-sm" name="Superficial_reflexes" id="Superficial_reflexes" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Babinski">Babinski sign	</label>
            <input type="text" class="form-control input-sm" name="Babinski" id="Babinski" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Involuntary1">Involuntary movements – intentional tremor, postural tremor, resting tremor	</label>
            <input type="text" class="form-control input-sm" name="Involuntary1" id="Involuntary1" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Voluntary">Voluntary control	</label>
            <input type="text" class="form-control input-sm" name="Voluntary" id="Voluntary" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Co_ordination">Co ordination assessment 	</label>
           <textarea class="form-control input-sm" name="Co_ordination" rows="3"></textarea>
	    </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Non_equilibrium">Non equilibrium :	</label>
            <input type="text" class="form-control input-sm" name="Non_equilibrium" id="Non_equilibrium" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Finger_to_nose">Finger to nose	</label>
            <input type="text" class="form-control input-sm" name="Finger_to_nose" id="Finger_to_nose" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Finger_to_therapist">Finger to therapist finger	</label>
			<input type="text" class="form-control input-sm" name="Finger_to_therapist" id="Finger_to_therapist" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Finger_to_finger">Finger to finger	</label>
            <input type="text" class="form-control input-sm" name="Finger_to_finger" id="Finger_to_finger" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Alternate_nose">Alternate nose to finger	</label>
            <input type="text" class="form-control input-sm" name="Alternate_nose" id="Alternate_nose" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="name">Finger opposition	</label>
            <input type="Finger_opposition" class="form-control input-sm" name="Finger_opposition" id="Finger_opposition" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Mass">Mass grasp	</label>
            <input type="text" class="form-control input-sm" name="Mass" id="Mass" placeholder="">
       </div>
	   <div class="form-group col-md-6 col-sm-6">
            <label for="Pronation">Pronation / Supination	</label>
            <input type="text" class="form-control input-sm" name="Pronation" id="Pronation" placeholder="">
       </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Rebound">Rebound	</label>
            <input type="text" class="form-control input-sm" name="Rebound" id="Rebound" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Tapping">Tapping (hand & foot) 	</label>
            <input type="text" class="form-control input-sm" name="Tapping" id="Tapping" placeholder="">
        </div>
	    <div class="form-group col-md-6 col-sm-6">
            <label for="Pointing">Pointing and past pointing	</label>
            <input type="text" class="form-control input-sm" name="Pointing" id="Pointing" placeholder="">
        </div>
	    <div class="form-group col-md-6 col-sm-6">
            <label for="Alternate_heel">Alternate heel to knee & heel to toe 	</label>
            <input type="text" class="form-control input-sm" name="Alternate_heel" id="Alternate_heel" placeholder="">
        </div>
	    <div class="form-group col-md-6 col-sm-6">
            <label for="Toe">Toe to examiners finger 	</label>
            <input type="text" class="form-control input-sm" name="Toe" id="Toe" placeholder="">
        </div>
	    <div class="form-group col-md-6 col-sm-6">
            <label for="Heel_on_shin">Heel on shin 	</label>
            <input type="text" class="form-control input-sm" name="Heel_on_shin" id="Heel_on_shin" placeholder="">
        </div>
	    <div class="form-group col-md-6 col-sm-6">
            <label for="Drawing">Drawing a circle (hand & Foot) 	</label>
            <input type="text" class="form-control input-sm" name="Drawing" id="Drawing" placeholder="">
        </div>
	    <div class="form-group col-md-6 col-sm-6">
            <label for="Fixation">Fixation / position holding (UL & LL) 	</label>
            <input type="text" class="form-control input-sm" name="Fixation" id="Fixation" placeholder="">
        </div>
	    <div class="form-group col-md-6 col-sm-6">
            <label for="Grading1">Grading 	</label>
                </br>&nbsp;&nbsp;5 - Normal performance
				</br>&nbsp;&nbsp;4 - Minimal impairment – able to accomplish activity with slightly less than normal speed and skill
				</br>&nbsp;&nbsp;3 - Moderate impairment – able to accomplish activity but coordination deficits very noticeable movements are slow, awkward and unsteady
				</br>&nbsp;&nbsp;2 – Severe impairment – able only to initiate activity without completion
				</br>&nbsp;&nbsp;1 -	Activity impossible
             <input type="text" class="form-control input-sm" name="Grading1" id="Grading1" placeholder="">
       	</div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Equilibrium">Equilibrium 	</label>
                </br>&nbsp;&nbsp;5 -	Normal performance
				</br>&nbsp;&nbsp;Standing – normal posture
				</br>&nbsp;&nbsp;Standing – vision occluded
				</br>&nbsp;&nbsp;Standing – feet together
				</br>&nbsp;&nbsp;Standing on one foot
				</br>&nbsp;&nbsp;Standing – forward trunk flexion and return back to neutral
				</br>&nbsp;&nbsp;Standing – lateral trunk flexion
				</br>&nbsp;&nbsp;Walk – tandem walking
				</br>&nbsp;&nbsp;Walk – along a straight line
				</br>&nbsp;&nbsp;Walk – place feet on foot marks
				</br>&nbsp;&nbsp;Walk – sideways
				</br>&nbsp;&nbsp;Walk – backward
				</br>&nbsp;&nbsp;Walk – in a circle
				</br>&nbsp;&nbsp;Walk – on heels
				</br>&nbsp;&nbsp;Walk – on toes
		  <input type="text" class="form-control input-sm" name="Equilibrium" id="Equilibrium" placeholder="">
       	</div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Grading">Grading 	</label>
				</br>&nbsp;&nbsp;4 - able to accomplish activity
				</br>&nbsp;&nbsp;3 – Can complete activity, needs minor help to maintain balance
				</br>&nbsp;&nbsp;2 - Can complete activity with moderate to maximal help
				</br>&nbsp;&nbsp;1 - Activity impossible
			<input type="text" class="form-control input-sm" name="Grading" id="Grading" placeholder="">
       	</div>
		<div class="form-group col-md-12 col-sm-12">
			<label for="Balance">Balance assessment
			</label>
		</div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Static">Static 	</label>
             <input type="text" class="form-control input-sm" name="Static" id="Static" placeholder="">
       	</div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Dynamic">Dynamic  	</label>
             <input type="text" class="form-control input-sm" name="Dynamic" id="Dynamic" placeholder="">
       	</div>
		<div class="form-group col-md-6 col-sm-6">
             <label for="Berg">1.	Berg balance scale 	</label>
             <input type="text" class="form-control input-sm" name="Berg" id="Berg" placeholder="">
       	</div>
		<div class="form-group col-md-6 col-sm-6">
             <label for="Functional_grades">2.	Functional balance grades 	</label>
             <input type="text" class="form-control input-sm" name="Functional_grades" id="Functional_grades" placeholder="">
       	</div>
		<div class="form-group col-md-12 col-sm-12">
		  <label>Normal –  able to maintain balance without support. Accepts maximal challenge and can shift weight in all directions.</label>
		  <label>Good – able to maintain balance without support. Accepts moderate challenge and can shift weight although limitations are evident</label>
		  <label>Fair – able to maintain balance without support cannot tolerate challenge cannot maintain balance while shuffling weight</label>
		  <label>Poor – patient requires support to maintain balance</label>
		  <label>Zero – patient requires maximal assistance to maintain balance</label>
		</div>
		<div class="form-group col-md-12 col-sm-12">
            <label>Respiratory assessment 	</label>
       	</div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="R_type">•	Type, depth, pattern  	</label>
             <input type="text" class="form-control input-sm" name="R_type" id="R_type" placeholder="">
       	</div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="R_chest">•	Chest expansion  	</label>
             <input type="text" class="form-control input-sm" name="R_chest" id="R_chest" placeholder="">
       	</div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="R_ventilation">•	Ventilation – mode  	</label>
             <input type="text" class="form-control input-sm" name="R_ventilation" id="R_ventilation" placeholder="">
       	</div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="R_auscultation">•	Auscultation  	</label>
             <input type="text" class="form-control input-sm" name="R_auscultation" id="R_auscultation" placeholder="">
       	</div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="R_percussion">•	Percussion  	</label>
             <input type="text" class="form-control input-sm" name="R_percussion" id="R_percussion" placeholder="">
       	</div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="R_pft">•	PFT  	</label>
             <input type="text" class="form-control input-sm" name="R_pft" id="R_pft" placeholder="">
       	</div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="ass_bladder">Assessment of bladder and bowel functions – incontinence, urinary retention 	</label>
             <input type="text" class="form-control input-sm" name="ass_bladder" id="ass_bladder" placeholder="">
       	</div>
		<div class="form-group col-md-12 col-sm-12">
        <label for="posture"> Assessment of posture</label>
		</div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Anterior"> Anterior view:</label>
           <input type="text" class="form-control input-sm" name="Anterior" id="Anterior" placeholder="">
       	</div><div class="form-group col-md-6 col-sm-6">
            <label for="Posterior"> Posterior view:</label>
           <input type="text" class="form-control input-sm" name="Posterior" id="Posterior" placeholder="">
       	</div><div class="form-group col-md-6 col-sm-6">
            <label for="Lateral">  Lateral view:</label>
           <input type="text" class="form-control input-sm" name="Lateral" id="Lateral" placeholder="">
       	</div>
		<div class="form-group col-md-12 col-sm-12">
         <label for="gait"> Assessment of gait</label>
		</div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Qualitative"> Qualitative:</label>
           <input type="text" class="form-control input-sm" name="Qualitative" id="Qualitative" placeholder="">
       	</div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="Quantitative"> Quantitative:</label>
           <input type="text" class="form-control input-sm" name="Quantitative" id="Quantitative" placeholder="">
       	</div>
		<div class="form-group col-md-12 col-sm-12">
            <label for="disability">  Assessment of disability / ADL- functional assessment, BARTHEL INDEX</label>
			<label for="Investigations">  Investigations – x-ray, CT, MRI</label>
		</div>
		<div class="col-md-12 col-sm-12">
		 <div class="form-group col-md-3 col-sm-3 pull-right" >
				<input type="submit" class="btn btn-primary" value="Submit" id="save"/>
		 </div>
	    </div></div>
</form>
</div>
</div>
  <script src="<?php  echo base_url();  ?>assets/js/vendor/jgrowl/jquery.jgrowl.min.js"></script>
  <script src="<?php  echo base_url();  ?>assets/js/vendor/bootstrap/bootstrap-dropdown-multilevel.js" type="text/javascript"></script>
  <script type="text/javascript" src="<?php  echo base_url();  ?>assets/js/vendor/mmenu/js/jquery.mmenu.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="<?php  echo base_url();  ?>assets/js/vendor/nicescroll/jquery.nicescroll.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url() ?>assets/js/vendor/momentjs/moment-with-langs.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url() ?>assets/js/vendor/datepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url() ?>assets/js/vendor/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url() ?>assets/js/vendor/colorpalette/bootstrap-colorpalette.js" type="text/javascript"></script>
   
   
	<script>	
	 $(document).ready(function() {
		/* $(".edit").click(function(){
			var val = $('#assess_id').val();
			var val1 = $('#patient_id').val();
			window.location= "<?php echo base_url().'assessment/edit_neuro/' ?>"+val1+'/'+val;
		});
		$(".print").click(function(){
			var val = $('#assess_id').val();
			var val1 = $('#patient_id').val();
			window.location= "<?php echo base_url().'assessment/print_neuro/' ?>"+val1+'/'+val;
		});
		$("#assess_date").change(function(){
			var val = $("#assess_date").val();
			var patient_id = $("#patient_id").val();
			var url= '<?php echo base_url().'assessment/neuro_assessment_info' ?>';
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
					error: function(e){ 
						alert(e.responseText);
					} 
				 }); 
		}); */
		 
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

		$(document).on('keyup', '#weight', function(){  
		    var weight =  $(this).val();
			var height = $('#height').val();
			if(weight > 0 && height > 0){	
			
			var finalBmi = Number(weight/(height/100*height/100)).toFixed(2);
			document.getElementById('bmi').value = finalBmi
			if(finalBmi < 18.5){
				document.getElementById('thin').style.display='block';
				document.getElementById('healthy').style.display='none';
				document.getElementById('overwt').style.display='none';
			}
			if(finalBmi > 18.5 && finalBmi < 25){
				document.getElementById('healthy').style.display='block';
				document.getElementById('thin').style.display='none';
				document.getElementById('overwt').style.display='none';
			}
			if(finalBmi > 25){
				document.getElementById('overwt').style.display='block';
				document.getElementById('thin').style.display='none';
				document.getElementById('healthy').style.display='none';
			}
			}
		});
	});
	
	//$(':radio:not(:checked)').attr('disabled', true);
	
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