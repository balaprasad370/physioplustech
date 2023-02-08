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
    <form action="<?php echo base_url().'assessment/update_neuro' ?>" method="post">
<div class="col-md-12 col-sm-12">
  	<input type="hidden" class="form-control" value="<?php echo $patient['patient_id']; ?>" name="patient_id" id="patient_id" placeholder="">
  	 <input type="hidden" class="form-control" value="<?php echo $assess['neuro_id']; ?>" name="neuro_id" id="neuro_id" placeholder="">
     <input type="hidden" class="form-control" value="<?php echo $assess['assess_date']; ?>" name="assess_date" id="assess_date" placeholder="">
	<div style="width:95%; display:none;" class="view" >
						<input type="hidden" name="assess_id" id="assess_id" />
      					<center><a class="btn btn-info edit" style="border-radius: 70px; width:40%; height:35px;  background-color:#088AEC; color:white;" >
					Edit</a><a class="btn btn-info print" style="border-radius: 70px; width:40%; height:35px;  background-color:#088AEC; color:white;" >
					Print</a>
						</center></br></br></div>
	<div class="create">
		<div class="form-group col-md-6 col-sm-6">
            <label >Name   *	</label>
            <input type="text" name="name" value="<?php echo $patient['first_name'].' '.$patient['last_name']; ?>" class="form-control input-sm" id="name" readonly>
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label >Age *	</label>
            <input type="text" name="age" class="form-control input-sm" value="<?php echo $patient['first_name']; ?>" id="age" readonly>
        </div>
        <div class="form-group col-md-3 col-sm-6">
            <label>Sex </label>
             </br><input type="radio" name="gender" <?php if($patient['gender'] == 'male'){ echo 'checked'; } else { } ?>  value="male" id="Male"  />
		    <label for="Male">Male&nbsp;&nbsp;</label>
		    <input type="radio" name="gender" <?php if($patient['gender'] == 'female'){ echo 'checked'; } else { } ?> value="female" id="female" />
		    <label for="female">Female&nbsp;&nbsp;</label>
		</div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Occupation: </label>
            <input type="text" name="Occupation" value="<?php echo $patient['occupation']; ?>" class="form-control input-sm" readonly>
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >IP no </label>
            <input type="text" name="Ip" value="<?php echo $assess['Ip']; ?>" class="form-control input-sm" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >OP no </label>
            <input type="text" name="Op" value="<?php echo $assess['Op']; ?>" class="form-control input-sm" placeholder="">
        </div>
		
       <div class="form-group col-md-6 col-sm-6">
            <label >CHIEF COMPLAINTS	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Complaints']; ?>" name="Complaints" id="complaints" placeholder="">
        </div>
        <div class="form-group col-md-12 col-sm-12">
         <p style="color:#63C0EE;">History of present illness: </p>
	    </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Onset / Duration	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Onset']; ?>" name="Present" id="Present" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Mental state	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Mental']; ?>" name="Mental" id="Mental" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >LOC 	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Loc']; ?>" name="Loc" id="Loc" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Convulsions	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Convulsions']; ?>" name="Convulsions" id="Convulsions" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Headache	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Headache']; ?>" name="Headache" id="Headache" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Sleep	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Sleep']; ?>" name="Sleep" id="Sleep" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Speech	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Speech']; ?>" name="Speech" id="Speech" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Movement/sensation	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Sensation']; ?>" name="Sensation" id="Sensation" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Spincter control	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Spincter']; ?>" name="Spincter" id="Spincter" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >History of past illness </label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Past_illness']; ?>" name="Past_illness" id="Past_illness" placeholder="">
        </div>
	   	<div class="form-group col-md-6 col-sm-6">
            <label >Mode of injury	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Mode']; ?>" name="Mode" id="Mode" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Medical history	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Medical']; ?>" name="Medical" id="Medical" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Developmental history	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Developmental']; ?>" name="Developmental" id="Developmental" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Birth history	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Birth']; ?>" name="Birth" id="Birth" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Family history	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Family']; ?>" name="Family" id="Family" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Personal history	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Personal']; ?>" name="Personal" id="Personal" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Pain assessment if necessary	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Pain']; ?>" name="Pain" id="Pain" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >On Observation:	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['observation1']; ?>" name="observation1" id="observation1" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Built	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Built']; ?>" name="Built" id="Built" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Posture	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Posture']; ?>" name="Posture" id="Posture" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Attitude of limbs	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Attitude']; ?>" name="Attitude" id="Attitude" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >External appliances	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['External']; ?>" name="External" id="External" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Involuntary movements	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Involuntary']; ?>" name="Involuntary" id="Involuntary" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Mode of ambulation	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Ambulation']; ?>" name="Ambulation" id="ambulation" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Tropical changes	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Tropical']; ?>" name="Tropical" id="Tropical" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Type of breathing	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Breathing']; ?>" name="Breathing" id="Breathing" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >On observation	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Observation']; ?>" name="observation" id="observation" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Muscle tone – atonic/flaccid/spastic/rigid	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Muscle_tone']; ?>" name="Muscle_tone" id="Muscle_tone" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Symmetry of chest expansion	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Symmetry']; ?>" name="Symmetry" id="Symmetry" placeholder="">
        </div>
		<div class="form-group col-md-12 col-sm-12">
            <label >On palpation	</label>
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Skin temperature	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Skin_temperature']; ?>" name="Skin_temperature" id="Skin_temperature" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Swelling	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Swelling']; ?>" name="Swelling" id="Swelling" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Tone	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Tone']; ?>" name="Tone" id="Tone" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Pain site	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Pain_site']; ?>" name="Pain_site" id="Pain_site" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Trigger point	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Trigger_point']; ?>" name="Trigger_point" id="Trigger_point" placeholder="">
        </div>
		
		<div class="form-group col-md-6 col-sm-6">
            <label >1) LOC according to GLASCOW COMA SCALE	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Glascow']; ?>" name="Glascow" id="Glascow" placeholder="">
        </div>
		<div class="form-group col-md-12 col-sm-12">
         <p style="color:#000;">EYE OPENING</p>
	    </div>
		
		
		<div class="form-group col-md-6 col-sm-6">
            <label >Spontaneous	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Spontaneous']; ?>" name="Spontaneous" id="Spontaneous" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >To speech	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Speech1']; ?>" name="Speech1" id="speech1" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >To painful stimulus	</label>
           <input type="text" class="form-control input-sm" value="<?php echo $assess['Painful']; ?>" name="Painful" id="Painful" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >No response	</label>
           <input type="text" class="form-control input-sm" value="<?php echo $assess['No_response1']; ?>" name="No_response1" id="No_response1" placeholder="">
        </div>
		<div class="form-group col-md-12 col-sm-12">
         <p style="color:#000;">MOTOR RESPONSE</p>
	    </div>
		
		
		<div class="form-group col-md-6 col-sm-6">
					<label >Follows motor commands	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Follows']; ?>" name="Follows" id="Follows" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label >Localizes	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Localizes']; ?>" name="Localizes" id="Localizes" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label >Withdraws	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Withdraws']; ?>" name="Withdraws" id="Withdraws" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label >Abnormal flexion	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Abnormal']; ?>" name="Abnormal" id="Abnormal" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label >Extensor response	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Extensor']; ?>" name="Extensor" id="Extensor" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label >No response	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['No_response2']; ?>" name="No_response2" id="No_response2" placeholder="">
		</div>
		<div class="form-group col-md-12 col-sm-12">
         <p style="color:#000;">VERBAL RESPONSE</p>
	    </div>
		
		
		<div class="form-group col-md-6 col-sm-6">
            <label >Oriented	</label>
           <input type="text" class="form-control input-sm" value="<?php echo $assess['Oriented']; ?>" name="Oriented" id="Oriented" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
					<label >Confused conversation	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Confused']; ?>" name="Confused" id="Confused" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label >Inappropriate words	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Inappropriate']; ?>" name="Inappropriate" id="Inappropriate" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label >Incomprehensible sounds	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Incomprehensible']; ?>" name="Incomprehensible" id="Incomprehensible" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label >No response	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['No_response3']; ?>" name="No_response3" id="No_response3" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label >2) Memory – short term / long term	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Memory']; ?>" name="Memory" id="Memory" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label >3) Orientation – time / place / person	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Orientation']; ?>" name="Orientation" id="Orientation" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label >4) Attention	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Attention']; ?>" name="Attention" id="Attention" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label >5) Abstract reasoning thoughts	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Abstract']; ?>" name="Abstract" id="Abstract" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label >6) Judgment	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Judgment']; ?>" name="Judgment" id="Judgment" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label >7) Calculation	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Calculation']; ?>" name="Calculation" id="Calculation" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label >8) Communication ability	</label>
					</br>&nbsp;&nbsp;a.	Impairment in receptive language (word recognition, auditory comprehension, reading comprehension)
					</br>&nbsp;&nbsp;b.	Impairment in expressive language (word finding, fluency, writing,  spelling)
					</br>&nbsp;&nbsp;c.	Perception: Unilateral neglect/ Apraxia/ Agnosia
		</div><div class="form-group col-md-12 col-sm-12">
					<label >9)	Cranial nerve examination	</label>
		</div><div class="form-group col-md-6 col-sm-6">
					<label >i.	Olfactory -  anosmia	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Olfactory']; ?>" name="Olfactory" id="Olfactory" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label >ii.	Optic – visual acuity, visual field	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Optic']; ?>" name="Optic" id="Optic" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label >iii.	Occulomotor	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Occulomotor']; ?>" name="Occulomotor" id="Occulomotor" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label >iv.	Trochlear                 	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Trochlear']; ?>" name="Trochlear" id="Trochlear" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label >v.	Abducens	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Abducens']; ?>" name="Abducens" id="Abducens" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label >vi.	Trigeminal (mixed)- jaw jerk	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Trigeminal']; ?>" name="Trigeminal" id="Trigeminal" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label >vii.	Facial (mixed)	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Facial']; ?>" name="Facial" id="Facial" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label >viii.	Vestibule cochlear S – caloric test	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Vestibule']; ?>" name="Vestibule" id="Vestibule" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label >ix.	Glossopharyngeal mix	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Glossopharyngeal']; ?>" name="Glossopharyngeal" id="Glossopharyngeal" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label >x.	Vagus(mix)	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Vagus']; ?>" name="Vagus" id="Vagus" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label >xi.	Spinal accessory – sternocleidomastoid, trapezius	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Spinal_accessory']; ?>" name="Spinal_accessory" id="Spinal_accessory" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label >xii.	Hypoglossal M – fasciculation,atrophy, deviation to affected side 	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Hypoglossal']; ?>" name="Hypoglossal" id="Hypoglossal" placeholder="">
		</div>
		<div class="form-group col-md-12 col-sm-12">
					<label >Sensory assessment	</label>
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label >Superficial – touch, pain, temperature, pressure	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Superficial_touch']; ?>" name="Superficial_touch" id="Superficial_touch" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label >Deep – joint movement sense, joint position sense, vibration	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Deep_joint']; ?>" name="Deep_joint" id="Deep_joint" placeholder="">
		</div><div class="form-group col-md-6 col-sm-6">
					<label >Cortical– tactile localization, 2 point discrimination, stereognosis, barognosis, graphesthesia / person	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Cortical_tactile']; ?>"  name="Cortical_tactile" id="Cortical_tactile" placeholder="">
		</div>
		<div class="form-group col-md-12 col-sm-12">
					<label >Sensory grading	</label>
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label >1. Intact – normal accurate response	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Intact_normal']; ?>" name="Intact_normal" id="Intact_normal" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label >2. Decreased – delayed response	</label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Decreased_delay']; ?>" name="Decreased_delay" id="Decreased_delay" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label >3. Exaggerated – increased sensitivity or awareness of stimulus after it has ceased
	                </label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Exaggerated']; ?>" name="Exaggerated" id="Exaggerated" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label >4. Inaccurate – inappropriate perception to given stimulus
	                </label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Inaccurate']; ?>" name="Inaccurate" id="Inaccurate" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label >5. Absent – no response
	                </label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Absent']; ?>" name="Absent" id="Absent" placeholder="">
		</div>
		<div class="form-group col-md-6 col-sm-6">
					<label >6. Inconsistent or ambiguous – reaponse inadequate to assess
	                </label>
					<input type="text" class="form-control input-sm" value="<?php echo $assess['Inconsistent']; ?>" name="Inconsistent" id="Inconsistent" placeholder="">
		</div>
		<div class="form-group col-md-12 col-sm-12">
					<label >Motor assessment	</label>
		</div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Muscle spasticity – according to Modified Ashworth Scale	</label>
				</br>&nbsp;&nbsp;0-	No increase in muscle tone
				</br>&nbsp;&nbsp;1-	Slight increase in muscle tone (manifested by a catch and release or minimal resistance at the end of ROM)
				</br>&nbsp;&nbsp;1+- slight increase in muscle tone (manifested by a catch followed by minimal resistance throughout remainder of ROM)
				</br>&nbsp;&nbsp;2-	More marked increase in muscle tone throughtout most of ROM but affected part is easily moved
				</br>&nbsp;&nbsp;3-	Considerable increase in muscle tone passive movement is difficult
				</br>&nbsp;&nbsp;4-	Affected part in flexion or extension
		</div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Muscle power	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['M_power']; ?>" name="M_power" id="M_power" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >ROM – active/passive 	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['ROM']; ?>" name="ROM" id="ROM" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Muscle girth – LMN lesions	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['LMN']; ?>" name="LMN" id="LMN" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Reflexes – developmental 	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Reflexes']; ?>" name="Reflexes" id="Reflexes" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Deep Tendon Reflexes	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Deep_tendon']; ?>" name="Deep_tendon" id="Deep_tendon" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Biceps (C5, C6) 	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Biceps']; ?>" name="Biceps" id="Biceps" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Triceps (C7, C8)	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Triceps']; ?>" name="Triceps" id="Triceps" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Patellar (L2, L3, L4)	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Patellar']; ?>" name="Patellar" id="Patellar" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Hamstrings (L5, S1, S2)	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Hamstrings']; ?>" name="Hamstrings" id="Hamstrings" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Ankle (S1, S2)	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Ankle']; ?>" name="Ankle" id="Ankle" placeholder="">
        </div>
		<!--<div class="form-group col-md-6 col-sm-6">
            <label >Reflex grading	</label>
            	</br>&nbsp;&nbsp;0-	Absent
				</br>&nbsp;&nbsp;+ - diminished (no movement)
				</br>&nbsp;&nbsp;++- normal (visible movement)
				</br>&nbsp;&nbsp;+++ - exaggerated
				</br>&nbsp;&nbsp;++++- exaggerated with clonus sustained movement lasting for more than 30 secs
        </div>-->
		<div class="form-group col-md-6 col-sm-6">
		<label for="Reflex grading">Reflex grading </label>
		</br><input type="radio" name="Reflex"  value="0-" id="Reflex"  <?php if($assess['Reflex'] == '0-'){ echo 'checked'; } else { } ?> />
		<label for="0">0- Absent&nbsp;&nbsp;</label></br>
		<input type="radio" name="Reflex" value="+-" id="Reflex" <?php if($assess['Reflex'] == '+-'){ echo 'checked'; } else { } ?>/>
		<label for="+-">+ - diminished (no movement)&nbsp;&nbsp;</label></br>
		<input type="radio" name="Reflex" value="++-" id="Reflex" <?php if($assess['Reflex'] == '++-'){ echo 'checked'; } else { } ?>/>
		<label for="++-">++- normal (visible movement)&nbsp;&nbsp;</label></br>
		<input type="radio" name="Reflex" value="+++-" id="Reflex" <?php if($assess['Reflex'] == '+++-'){ echo 'checked'; } else { } ?>/>
		<label for="+++-">+++ - exaggerated&nbsp;&nbsp;</label></br>
		<input type="radio" name="Reflex" value="++++-" id="Reflex" <?php if($assess['Reflex'] == '++++-'){ echo 'checked'; } else { } ?>/>
		<label for="++++-">++++- exaggerated with clonus sustained movement lasting for more than 30 secs&nbsp;&nbsp;</label>
		</div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Superficial reflexes	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Superficial_reflexes']; ?>" name="Superficial_reflexes" id="Superficial_reflexes" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Babinski sign	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Babinski']; ?>" name="Babinski" id="Babinski" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Involuntary movements – intentional tremor, postural tremor, resting tremor	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Involuntary1']; ?>" name="Involuntary1" id="Involuntary1" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Voluntary control	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Voluntary']; ?>" name="Voluntary" id="Voluntary" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Co ordination assessment 	</label>
           <textarea class="form-control input-sm" value="" name="Co_ordination"  rows="3"><?php echo $assess['Co_ordination']; ?></textarea>
	    </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Non equilibrium :	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Non_equilibrium']; ?>" name="Non_equilibrium" id="Non_equilibrium" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Finger to nose	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Finger_to_nose']; ?>" name="Finger_to_nose" id="Finger_to_nose" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Finger to therapist finger	</label>
			<input type="text" class="form-control input-sm" value="<?php echo $assess['Finger_to_therapist']; ?>" name="Finger_to_therapist" id="Finger_to_therapist" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Finger to finger	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Finger_to_finger']; ?>" name="Finger_to_finger" id="Finger_to_finger" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Alternate nose to finger	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Alternate_nose']; ?>" name="Alternate_nose" id="Alternate_nose" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Finger opposition	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Finger_opposition']; ?>" name="Finger_opposition" id="Finger_opposition" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Mass grasp	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Mass']; ?>" name="Mass" id="Mass" placeholder="">
       </div>
	   <div class="form-group col-md-6 col-sm-6">
            <label >Pronation / Supination	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Pronation']; ?>" name="Pronation" id="Pronation" placeholder="">
       </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Rebound	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Rebound']; ?>" name="Rebound" id="Rebound" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Tapping (hand & foot) 	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Tapping']; ?>" name="Tapping" id="Tapping" placeholder="">
        </div>
	    <div class="form-group col-md-6 col-sm-6">
            <label >Pointing and past pointing	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Pointing']; ?>" name="Pointing" id="Pointing" placeholder="">
        </div>
	    <div class="form-group col-md-6 col-sm-6">
            <label >Alternate heel to knee & heel to toe 	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Alternate_heel']; ?>" name="Alternate_heel" id="Alternate_heel" placeholder="">
        </div>
	    <div class="form-group col-md-6 col-sm-6">
            <label >Toe to examiners finger 	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Toe']; ?>"name="Toe" id="Toe" placeholder="">
        </div>
	    <div class="form-group col-md-6 col-sm-6">
            <label >Heel on shin 	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Heel_on_shin']; ?>" name="Heel_on_shin" id="Heel_on_shin" placeholder="">
        </div>
	    <div class="form-group col-md-6 col-sm-6">
            <label >Drawing a circle (hand & Foot) 	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Drawing']; ?>" name="Drawing" id="Drawing" placeholder="">
        </div>
	    <div class="form-group col-md-6 col-sm-6">
            <label >Fixation / position holding (UL & LL) 	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Fixation']; ?>" name="Fixation" id="Fixation" placeholder="">
        </div>
	    <div class="form-group col-md-6 col-sm-6">
            <label >Grading 	</label>
                </br>&nbsp;&nbsp;5 - Normal performance
				</br>&nbsp;&nbsp;4 - Minimal impairment – able to accomplish activity with slightly less than normal speed and skill
				</br>&nbsp;&nbsp;3 - Moderate impairment – able to accomplish activity but coordination deficits very noticeable movements are slow, awkward and unsteady
				</br>&nbsp;&nbsp;2 – Severe impairment – able only to initiate activity without completion
				</br>&nbsp;&nbsp;1 -	Activity impossible
       </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Equilibrium 	</label>
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
		</div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Grading 	</label>
				</br>&nbsp;&nbsp;4 - able to accomplish activity
				</br>&nbsp;&nbsp;3 – Can complete activity, needs minor help to maintain balance
				</br>&nbsp;&nbsp;2 - Can complete activity with moderate to maximal help
				</br>&nbsp;&nbsp;1 - Activity impossible
		</div>
		<div class="form-group col-md-12 col-sm-12">
			<label >Balance assessment
			</label>
		</div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Static 	</label>
             <input type="text" class="form-control input-sm" value="<?php echo $assess['Static']; ?>" name="Static" id="Static" placeholder="">
       	</div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Dynamic  	</label>
             <input type="text" class="form-control input-sm" value="<?php echo $assess['Dynamic']; ?>" name="Dynamic" id="Dynamic" placeholder="">
       	</div>
		<div class="form-group col-md-6 col-sm-6">
             <label >1.	Berg balance scale 	</label>
             <input type="text" class="form-control input-sm" value="<?php echo $assess['Berg']; ?>" name="Berg" id="Berg" placeholder="">
       	</div>
		<div class="form-group col-md-6 col-sm-6">
             <label >2.	Functional balance grades 	</label>
             <input type="text" class="form-control input-sm" value="<?php echo $assess['Functional_grades']; ?>" name="Functional_grades" id="Functional_grades" placeholder="">
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
            <label >•	Type, depth, pattern  	</label>
             <input type="text" class="form-control input-sm" value="<?php echo $assess['R_type']; ?>" name="R_type" id="R_type" placeholder="">
       	</div>
		<div class="form-group col-md-6 col-sm-6">
            <label >•	Chest expansion  	</label>
             <input type="text" class="form-control input-sm" value="<?php echo $assess['R_chest']; ?>" name="R_chest" id="R_chest" placeholder="">
       	</div>
		<div class="form-group col-md-6 col-sm-6">
            <label >•	Ventilation – mode  	</label>
             <input type="text" class="form-control input-sm" value="<?php echo $assess['R_ventilation']; ?>" name="R_ventilation" id="R_ventilation" placeholder="">
       	</div>
		<div class="form-group col-md-6 col-sm-6">
            <label >•	Auscultation  	</label>
             <input type="text" class="form-control input-sm" value="<?php echo $assess['R_auscultation']; ?>" name="R_auscultation" id="R_auscultation" placeholder="">
       	</div>
		<div class="form-group col-md-6 col-sm-6">
            <label >•	Percussion  	</label>
             <input type="text" class="form-control input-sm" value="<?php echo $assess['R_percussion']; ?>" name="R_percussion" id="R_percussion" placeholder="">
       	</div>
		<div class="form-group col-md-6 col-sm-6">
            <label >•	PFT  	</label>
             <input type="text" class="form-control input-sm" value="<?php echo $assess['R_pft']; ?>" name="R_pft" id="R_pft" placeholder="">
       	</div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Assessment of bladder and bowel functions – incontinence, urinary retention 	</label>
       	</div>
		<div class="form-group col-md-12 col-sm-12">
        <label > Assessment of posture</label>
		</div>
		<div class="form-group col-md-6 col-sm-6">
            <label > Anterior view:</label>
           <input type="text" class="form-control input-sm" value="<?php echo $assess['Anterior']; ?>" name="Anterior" id="Anterior" placeholder="">
       	</div><div class="form-group col-md-6 col-sm-6">
            <label > Posterior view:</label>
           <input type="text" class="form-control input-sm" value="<?php echo $assess['Posterior']; ?>" name="Posterior" id="Posterior" placeholder="">
       	</div><div class="form-group col-md-6 col-sm-6">
            <label >  Lateral view:</label>
           <input type="text" class="form-control input-sm" value="<?php echo $assess['Lateral']; ?>" name="Lateral" id="Lateral" placeholder="">
       	</div>
		<div class="form-group col-md-12 col-sm-12">
         <label > Assessment of gait</label>
		</div>
		<div class="form-group col-md-6 col-sm-6">
            <label > Qualitative:</label>
           <input type="text" class="form-control input-sm" value="<?php echo $assess['Qualitative']; ?>" name="Qualitative" id="Qualitative" placeholder="">
       	</div>
		<div class="form-group col-md-6 col-sm-6">
            <label > Quantitative:</label>
           <input type="text" class="form-control input-sm" value="<?php echo $assess['Quantitative']; ?>" name="Quantitative" id="Quantitative" placeholder="">
       	</div>
		<div class="form-group col-md-12 col-sm-12">
            <label >  Assessment of disability / ADL- functional assessment, BARTHEL INDEX</label>
			<label >  Investigations – x-ray, CT, MRI</label>
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
	<script>	
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
			window.location= "<?php echo base_url().'assessment/edit_assessment/' ?>"+val1+'/'+val;
		});
		$(".print").click(function(){
			var val = $('#assess_id').val();
			var val1 = $('#patient_id').val();
			window.location= "<?php echo base_url().'assessment/print_assessment/' ?>"+val1+'/'+val;
		});
		$("#assess_date").change(function(){
			var val = $("#assess_date").val();
			var patient_id = $("#patient_id").val();
			var url= '<?php echo base_url().'assessment/assessment_info' ?>';
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
		});
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
	});
	 
	//$(':radio:not(:checked)').attr('disabled', true);
</script>

</body>
</html>