<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>form-assets/css/montserrat-font.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>form-assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>form-assets/css/style.css"/>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/main.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/dynamic.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/markup.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/scrollbar/perfect-scrollbar.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery-confirm.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/scrollbar/perfect-scrollbar.min.css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/pepper-grinder/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/dubrox/Multiple-Dates-Picker-for-jQuery-UI/master/jquery-ui.multidatespicker.css">
   </head>
<body class="form-v10">
	<div class="page-content">
		<div class="form-v10-content">  
			
				<div class="form-left" ></br></br>
				  <div class="row-fluid" style="overflow-x: hidden; overflow-y: auto;" id="InvoiceContainer">
				   <div >  
				    <table style="width:100%;"><tr>
							<td colspan="4"><center> <b><?php echo $clientDetails['clinic_name'];?></b></center> </td></tr>
							
							<tr><td colspan="4"><center>Neuro Assessment </center></td></tr>
							</table>     
					</div>
				  </br>
				   <div style="width:95%;">  
				    <table style="width:100%;"><tr><td style="width:80%;" colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td> Date : <?php echo date('d/m/Y',strtotime($assess['assess_date'])); ?></td>
					</tr></table>   
					</div>
					<div style="width:95%;"  >  
					<table style="width:95%;"><tr><td>&nbsp;&nbsp;&nbsp;	Name :</td><td colspan="3"><?php echo $patient['first_name'].' '.$patient['last_name']; ?></td></tr>
						<tr><td>&nbsp;&nbsp;&nbsp;	Age			:</td><td><?php echo $patient['age']; ?></td></tr>
						<tr><td>&nbsp;&nbsp;&nbsp;  Sex          :</td><td><?php echo $patient['gender']; ?></td></tr>
						<tr><td>&nbsp;&nbsp;&nbsp;	Occupation:				:</td><td colspan="3"><?php echo $patient['occupation']; ?></td></tr>
						<?php if($assess['Ip'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	IP no			:</td><td><?php echo $assess['Ip']; ?></td></tr><?php } ?>
						<?php if($assess['Op'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;  OP No           :</td><td><?php echo $assess['Op']; ?></td></tr><?php } ?>
						<?php if($assess['Complaints'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;  Chief Complaints          :</td><td><?php echo $assess['Complaints']; ?></td></tr><?php } ?>
					</table>
					<?php if($assess['Onset'] != false || $assess['Mental'] != false || $assess['Loc'] != false || $assess['Convulsions'] != false || $assess['Headache'] != false || $assess['Sleep'] != false || $assess['Speech'] != false || $assess['Sensation'] != false || $assess['Spincter'] != false ){?>
					<p style="color:black">&nbsp;&nbsp;&nbsp;History of present illness	</p>
					<?php } ?>
					<table style="width:95%;">
						<?php if($assess['Onset'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;•	Onset / Duration   :			</td><td colspan="3"><?php echo $assess['Onset']; ?></td></tr><?php } ?>
						<?php if($assess['Mental'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;•	Mental state  : 			</td><td colspan="3"><?php echo $assess['Mental']; ?></td></tr><?php } ?>
						<?php if($assess['Loc'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;•	LOC   :				</td><td colspan="3"><?php echo $assess['Loc']; ?></td></tr><?php } ?>
						<?php if($assess['Convulsions'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;•	Convulsions  :   </td><td colspan="3"><?php echo $assess['Convulsions']; ?></td></tr><?php } ?>
						<?php if($assess['Headache'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;•	Headache	:</td><td colspan="3"><?php echo $assess['Headache']; ?></td></tr><?php } ?>
						<?php if($assess['Sleep'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;•	Sleep	:</td><td colspan="3"><?php echo $assess['Sleep']; ?></td></tr><?php } ?>
					    <?php if($assess['Speech'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;•	Speech   :			</td><td colspan="3"><?php echo $assess['Speech']; ?></td></tr><?php } ?>
						<?php if($assess['Sensation'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;•	Movement/sensation  : 			</td><td colspan="3"><?php echo $assess['Sensation']; ?></td></tr><?php } ?>
						<?php if($assess['Spincter'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;•	Spincter control   :				</td><td colspan="3"><?php echo $assess['Spincter']; ?></td></tr><?php } ?>
					</table>
					
					<table style="width:95%;">
						<?php if($assess['Past_illness'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;History of past illness   :			</td><td colspan="3"><?php echo $assess['Past_illness']; ?></td></tr><?php } ?>
						<?php if($assess['Mode'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mode of injury  : 			</td><td colspan="3"><?php echo $assess['Mode']; ?></td></tr><?php } ?>
						<?php if($assess['Medical'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Medical history   :				</td><td colspan="3"><?php echo $assess['Medical']; ?></td></tr><?php } ?>
						<?php if($assess['Developmental'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Developmental history :   </td><td colspan="3"><?php echo $assess['Developmental']; ?></td></tr><?php } ?>
						<?php if($assess['Birth'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Birth history	:</td><td colspan="3"><?php echo $assess['Birth']; ?></td></tr><?php } ?>
						<?php if($assess['Family'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Family history	:</td><td colspan="3"><?php echo $assess['Family']; ?></td></tr><?php } ?>
					    <?php if($assess['Personal'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Personal history   :			</td><td colspan="3"><?php echo $assess['Personal']; ?></td></tr><?php } ?>
						<?php if($assess['Pain'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pain assessment if necessary  : 			</td><td colspan="3"><?php echo $assess['Pain']; ?></td></tr><?php } ?>
						<?php if($assess['Observation'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;On Observation  :				</td><td colspan="3"><?php echo $assess['Observation']; ?></td></tr><?php } ?>
						<?php if($assess['Built'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Built  :				</td><td colspan="3"><?php echo $assess['Built']; ?></td></tr><?php } ?>
						<?php if($assess['Posture'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Posture  :				</td><td colspan="3"><?php echo $assess['Posture']; ?></td></tr><?php } ?>
						<?php if($assess['Attitude'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Attitude of limbs :				</td><td colspan="3"><?php echo $assess['Attitude']; ?></td></tr><?php } ?>
						<?php if($assess['External'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;External appliances  :				</td><td colspan="3"><?php echo $assess['External']; ?></td></tr><?php } ?>
						<?php if($assess['Involuntary'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Involuntary movements  :				</td><td colspan="3"><?php echo $assess['Involuntary']; ?></td></tr><?php } ?>
						<?php if($assess['Ambulation'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mode of ambulation  :				</td><td colspan="3"><?php echo $assess['Ambulation']; ?></td></tr><?php } ?>
						<?php if($assess['Tropical'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tropical changes  :				</td><td colspan="3"><?php echo $assess['Tropical']; ?></td></tr><?php } ?>
						<?php if($assess['Breathing'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Type of breathing  :				</td><td colspan="3"><?php echo $assess['Breathing']; ?></td></tr><?php } ?>
						<?php if($assess['observation1'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;On Observation  :				</td><td colspan="3"><?php echo $assess['observation1']; ?></td></tr><?php } ?>
						<?php if($assess['Muscle_tone'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Muscle tone – atonic/flaccid/spastic/rigid  :				</td><td colspan="3"><?php echo $assess['Muscle_tone']; ?></td></tr><?php } ?>
						<?php if($assess['Symmetry'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Symmetry of chest expansion  :				</td><td colspan="3"><?php echo $assess['Symmetry']; ?></td></tr><?php } ?>
					</table>
					
					<?php if($assess['Skin_temperature'] != false || $assess['Swelling'] != false || $assess['Tone'] != false || $assess['Pain_site'] != false || $assess['Trigger_point'] != false){?>
					<p style="color:black">&nbsp;&nbsp;&nbsp;On palpation	</p>
					<?php } ?>
					<table style="width:95%;">
						<?php if($assess['Skin_temperature'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Skin temperature     :	</td><td colspan="3"><?php echo $assess['Skin_temperature']; ?></td></tr><?php } ?>
						<?php if($assess['Swelling'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Swelling     :	</td><td colspan="3"><?php echo $assess['Swelling']; ?></td></tr><?php } ?>
						<?php if($assess['Tone'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Tone     :	</td><td colspan="3"><?php echo $assess['Tone']; ?></td></tr><?php } ?>
						<?php if($assess['Pain_site'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Pain site     :	</td><td colspan="3"><?php echo $assess['Pain_site']; ?></td></tr><?php } ?>
						<?php if($assess['Trigger_point'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Trigger point     :	</td><td colspan="3"><?php echo $assess['Trigger_point']; ?></td></tr><?php } ?>
					</table>
					<?php if($assess['site'] != false || $assess['Spontaneous'] != false || $assess['Speech1'] != false || $assess['Painful'] != false || $assess['No_response1'] != false ){?>
					<p style="color:#63C0EE;">&nbsp;&nbsp;&nbsp; On Examination  : 	</p>
					<?php } ?>
					<p style="color:black;"></p>
					<?php if($assess['Glascow'] != false){?><table style="width:95%;">
					  <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1)	LOC according to GLASCOW COMA SCALE		</td><td colspan="4"><?php echo $assess['Glascow']; ?></td></tr>
					</table><?php } ?>
					</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EYE OPENING 
					<table style="width:95%;">
					   <?php if($assess['site'] != false){?> <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Site and Side :</td><td colspan="3"><?php echo $assess['site']; ?></td></tr><?php } ?>
						<?php if($assess['Spontaneous'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Spontaneous 		:</td><td colspan="3"><?php echo $assess['Spontaneous']; ?></td></tr><?php } ?>
						<?php if($assess['Speech1'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To speech 	:</td><td colspan="3"><?php echo ($assess['Speech1']); ?></td></tr><?php } ?>
						<?php if($assess['Painful'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To painful stimulus 	:</td><td><?php echo ($assess['Painful']); ?></td></tr><?php } ?>
						<?php if($assess['No_response1'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No response 	:</td><td><?php echo ($assess['No_response1']); ?></td></tr><?php } ?>
					</table>
					<?php if($assess['Follows'] != false || $assess['Localizes'] != false || $assess['Withdraws'] != false || $assess['Abnormal'] != false || $assess['Extensor'] != false || $assess['No_response2'] != false ){?>
					<p style="color:#00000;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MOTOR RESPONSE		</p>
					<?php } ?>
					<table style="width:95%;">
					    <?php if($assess['Follows'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Follows motor commands :</td><td colspan="3"><?php echo $assess['Follows']; ?></td></tr><?php } ?>
						<?php if($assess['Localizes'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Localizes  		:</td><td colspan="3"><?php echo $assess['Localizes']; ?></td></tr><?php } ?>
						<?php if($assess['Withdraws'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Withdraws  	:</td><td colspan="3"><?php echo ($assess['Withdraws']); ?></td></tr><?php } ?>
						<?php if($assess['Abnormal'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Abnormal flexion  	:</td><td><?php echo ($assess['Abnormal']); ?></td></tr><?php } ?>
						<?php if($assess['Extensor'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Extensor response 	:</td><td><?php echo ($assess['Extensor']); ?></td></tr><?php } ?>
						<?php if($assess['No_response2'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No response  	:</td><td><?php echo ($assess['No_response2']); ?></td></tr><?php } ?>
					</table>
					<?php if($assess['Oriented'] != false || $assess['Confused'] != false || $assess['Inappropriate'] != false || $assess['Incomprehensible'] != false || $assess['No_response3'] != false){?>
					<p style="color:#00000;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VERBAL RESPONSE		</p>
					<?php } ?>
					<table style="width:95%;">
					   <?php if($assess['Oriented'] != false){?> <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Oriented  :</td><td colspan="3"><?php echo $assess['Oriented']; ?></td></tr><?php } ?>
						<?php if($assess['Confused'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Confused conversation   		:</td><td colspan="3"><?php echo $assess['Confused']; ?></td></tr><?php } ?>
						<?php if($assess['Inappropriate'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Inappropriate words   	:</td><td colspan="3"><?php echo ($assess['Inappropriate']); ?></td></tr><?php } ?>
						<?php if($assess['Incomprehensible'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Incomprehensible sounds   	:</td><td><?php echo ($assess['Incomprehensible']); ?></td></tr><?php } ?>
						<?php if($assess['No_response3'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No response 	:</td><td><?php echo ($assess['No_response3']); ?></td></tr><?php } ?>
					</table>
					<?php if($assess['Memory'] != false){?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2)	Memory – short term / long term		</p>
					<table style="width:95%;">
						<tr><td colspan="4"><center><?php echo $assess['Memory'] ?></center></td></tr>
					</table>
					<?php } ?>
					<?php if($assess['Orientation'] != false){?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3)	Orientation – time / place / person		</p>
					<table style="width:95%;">
						<tr><td colspan="4"><center><?php echo $assess['Orientation'] ?></center></td></tr>
					</table>
					<?php } ?>
					<?php if($assess['Attention'] != false){?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4)	Attention		</p>
					<table style="width:95%;">
						<tr><td colspan="4"><center><?php echo $assess['Attention'] ?></center></td></tr>
					</table>
					<?php } ?>
					<?php if($assess['Abstract'] != false){?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5)	Abstract reasoning thoughts		</p>
					<table style="width:95%;">
						<tr><td colspan="4"><center><?php echo $assess['Abstract'] ?></center></td></tr>
					</table>
					<?php } ?>
					<?php if($assess['Judgment'] != false){?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6)	Judgment		</p>
					<table style="width:95%;">
						<tr><td colspan="4"><center><?php echo $assess['Judgment'] ?></center></td></tr>
					</table>
					<?php } ?>
					<?php if($assess['Calculation'] != false){?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7)	Calculation		</p>
					<table style="width:95%;">
						<tr><td colspan="4"><center><?php echo $assess['Calculation'] ?></center></td></tr>
					</table>
					<?php } ?>
					 
					<p style="color:black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8)	Communication ability		</p>
					<table style="width:95%;">
					<tr><td>a.	Impairment in receptive language (word recognition, auditory comprehension, reading comprehension)</td></tr>
                    <tr><td>b.	Impairment in expressive language (word finding, fluency, writing,  spelling)</td></tr>
                    <tr><td>c.	Perception: Unilateral neglect/ Apraxia/ Agnosia</td></tr>
					
					</table>
					 
					<?php if($assess['Olfactory'] != false || $assess['Optic'] != false || $assess['Occulomotor'] != false || $assess['Trochlear'] != false || $assess['Abducens'] != false || $assess['Trigeminal'] != false || $assess['Facial'] != false || $assess['Vestibule'] != false || $assess['Glossopharyngeal'] != false || $assess['Vagus'] != false || $assess['Spinal_accessory'] != false || $assess['Hypoglossal'] != false){?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;9)	Cranial nerve examination		</p>
					<?php } ?>
					<table style="width:95%;">
					    <?php if($assess['Olfactory'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;i.	Olfactory -  anosmia  :</td><td colspan="3"><?php echo $assess['Olfactory']; ?></td></tr><?php } ?>
						<?php if($assess['Optic'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ii.	Optic – visual acuity, visual field   		:</td><td colspan="3"><?php echo $assess['Optic']; ?></td></tr><?php } ?>
						<?php if($assess['Occulomotor'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;iii.	Occulomotor   	:</td><td colspan="3"><?php echo ($assess['Occulomotor']); ?></td></tr><?php } ?>
						<?php if($assess['Trochlear'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;iv.	Trochlear                    	:</td><td><?php echo ($assess['Trochlear']); ?></td></tr><?php } ?>
						<?php if($assess['Abducens'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;v.	Abducens 	:</td><td><?php echo ($assess['Abducens']); ?></td></tr><?php } ?>
						<?php if($assess['Trigeminal'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;vi.	Trigeminal (mixed)- jaw jerk 	:</td><td><?php echo ($assess['Trigeminal']); ?></td></tr><?php } ?>
						<?php if($assess['Facial'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;vii.	Facial (mixed) 	:</td><td><?php echo ($assess['Facial']); ?></td></tr><?php } ?>
						<?php if($assess['Vestibule'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;viii.	Vestibule cochlear S – caloric test 	:</td><td><?php echo ($assess['Vestibule']); ?></td></tr><?php } ?>
						<?php if($assess['Glossopharyngeal'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ix.	Glossopharyngeal mix 	:</td><td><?php echo ($assess['Glossopharyngeal']); ?></td></tr><?php } ?>
						<?php if($assess['Vagus'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;x.	Vagus(mix) 	:</td><td><?php echo ($assess['Vagus']); ?></td></tr><?php } ?>
						<?php if($assess['Spinal_accessory'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;xi.	Spinal accessory – sternocleidomastoid, trapezius 	:</td><td><?php echo ($assess['Spinal_accessory']); ?></td></tr><?php } ?>
						<?php if($assess['Hypoglossal'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;xii.	Hypoglossal M – fasciculation,atrophy, deviation to affected side 	:</td><td><?php echo ($assess['Hypoglossal']); ?></td></tr><?php } ?>
					</table>
					<?php if($assess['Superficial_touch'] != false || $assess['Deep_joint'] != false || $assess['Cortical_tactile'] != false ){?>
					<p style="color:#63C0EE;">&nbsp;&nbsp;&nbsp;Sensory assessment		</p>
					<?php } ?>
					<table style="width:95%;">
					   <?php if($assess['Superficial_touch'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Superficial – touch, pain, temperature, pressure  </td><td colspan="3"><?php echo $assess['Superficial_touch']; ?></td></tr><?php } ?>
						<?php if($assess['Deep_joint'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Deep – joint movement sense, joint position sense, vibration     </td><td colspan="3"><?php echo $assess['Deep_joint']; ?></td></tr><?php } ?>
						<?php if($assess['Cortical_tactile'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Cortical– tactile localization, 2 point discrimination, stereognosis, barognosis, graphesthesia</td><td colspan="3"><?php echo ($assess['Cortical_tactile']); ?></td></tr><?php } ?>
					</table>
					<?php if($assess['Intact_normal'] != false || $assess['Decreased_delay'] != false || $assess['Exaggerated'] != false  || $assess['Inaccurate'] != false || $assess['Absent'] != false || $assess['Inconsistent'] != false){?>
					<p style="color:#63C0EE;">&nbsp;&nbsp;&nbsp;Sensory grading		</p>
					<?php } ?>
					<table style="width:95%;">
					    <?php if($assess['Intact_normal'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;1 intact – normal accurate response  :</td><td colspan="3"><?php echo $assess['Intact_normal']; ?></td></tr><?php } ?>
						<?php if($assess['Decreased_delay'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;2 decreased – delayed response     :</td><td colspan="3"><?php echo $assess['Decreased_delay']; ?></td></tr><?php } ?>
						<?php if($assess['Exaggerated'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;3 exaggerated – increased sensitivity or awareness of stimulus after it has ceased  :</td><td colspan="3"><?php echo ($assess['Exaggerated']); ?></td></tr><?php } ?>
						<?php if($assess['Inaccurate'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;4 inaccurate – inappropriate perception to given stimulus   	:</td><td><?php echo ($assess['Inaccurate']); ?></td></tr><?php } ?>
						<?php if($assess['Absent'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;5 absent – no response 	:</td><td><?php echo ($assess['Absent']); ?></td></tr><?php } ?>
						<?php if($assess['Inconsistent'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;6 inconsistent or ambiguous – reaponse inadequate to assess 	:</td><td><?php echo ($assess['Inconsistent']); ?></td></tr><?php } ?>
					</table>
					<p style="color:#63C0EE;">&nbsp;&nbsp;&nbsp;Motor assessment		</p>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;Muscle spasticity – according to Modified Ashworth Scale		</p>
					
					
					<table style="width:95%;">
					   <tr><td>0 - No increase in muscle tone</td></tr>
					<tr><td>1 - Slight increase in muscle tone (manifested by a catch and release or minimal resistance at the end of ROM)</td></tr>
					<tr><td>1 +- slight increase in muscle tone (manifested by a catch followed by minimal resistance throughout remainder of ROM)</td></tr>
					<tr><td>2 - More marked increase in muscle tone throughtout most of ROM but affected part is easily moved</td></tr>
					<tr><td>3 - Considerable increase in muscle tone passive movement is difficult</td></tr>
					<tr><td>4 - Affected part in flexion or extension</td></tr>
					</table>
					
				   <?php if($assess['M_power'] != false){?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;Muscle power		</p>
					<table style="width:95%;">
						<tr><td colspan="4"><center><?php echo $assess['M_power'] ?></center></td></tr>
					</table>
				   <?php } ?>
				    <?php if($assess['ROM'] != false){?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;ROM – active/passive – developmental		</p>
					<table style="width:95%;">
						<tr><td colspan="4"><center><?php echo $assess['ROM'] ?></center></td></tr>
					</table>
					 <?php } ?>
					<?php if($assess['LMN'] != false){?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;Muscle girth – LMN lesions		</p>
					<table style="width:95%;">
						<tr><td colspan="4"><center><?php echo $assess['LMN'] ?></center></td></tr>
					</table>
					 <?php } ?>
					<?php if($assess['Reflexes'] != false){?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;Reflexes – developmental		</p>
					<table style="width:95%;">
						<tr><td colspan="4"><center><?php echo $assess['Reflexes'] ?></center></td></tr>
					</table>
					<?php } ?>
					<?php if($assess['Deep_tendon'] != false){?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;Deep Tendon Reflexes </p>
					<table style="width:95%;">
						<tr><td colspan="4"><center><?php echo $assess['Deep_tendon'] ?></center></td></tr>
					</table>
					<?php } ?>
					<table style="width:95%;">
					   <?php if($assess['Biceps'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Biceps (C5, C6) :</td><td colspan="3"><?php echo $assess['Biceps']; ?></td></tr><?php } ?>
						<?php if($assess['Triceps'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Triceps (C7, C8)		:</td><td colspan="3"><?php echo $assess['Triceps']; ?></td></tr><?php } ?>
						<?php if($assess['Patellar'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Patellar (L2, L3, L4)	:</td><td colspan="3"><?php echo ($assess['Patellar']); ?></td></tr><?php } ?>
						<?php if($assess['Hamstrings'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Hamstrings (L5, S1, S2)	:</td><td><?php echo ($assess['Hamstrings']); ?></td></tr><?php } ?>
						<?php if($assess['Ankle'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Ankle (S1, S2)	:</td><td><?php echo ($assess['Ankle']); ?></td></tr><?php } ?>
					</table>
					<?php if($assess['Reflex'] != false){?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;Reflex grading :<?php echo $assess['Reflex'];?> </p>
					<!--<table style="width:95%;">
						<tr><td>0 -	Absent</td></tr>
						<tr><td>+ - diminished (no movement)</td></tr>
						<tr><td>++ - normal (visible movement)</td></tr>
						<tr><td>+++ - exaggerated</td></tr>
						<tr><td>++++ - exaggerated with clonus sustained movement lasting for more than 30 secs</td></tr>
						
						</table>-->
					<?php } ?>
					</br>
					<table style="width:95%;">
					    <?php if($assess['Superficial_reflexes'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Superficial reflexes :</td><td colspan="3"><?php echo $assess['Superficial_reflexes']; ?></td></tr><?php } ?>
					    <?php if($assess['Babinski'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Babinski sign :</td><td colspan="3"><?php echo $assess['Babinski']; ?></td></tr><?php } ?>
						<?php if($assess['Involuntary1'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Involuntary movements – intentional tremor, postural tremor, resting tremor	:</td><td colspan="3"><?php echo ($assess['Involuntary1']); ?></td></tr><?php } ?>
						<?php if($assess['Voluntary'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Voluntary control	:</td><td><?php echo ($assess['Voluntary']); ?></td></tr><?php } ?>
					</table>
					<?php if($assess['Co_ordination'] != false){?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;Co ordination assessment 		</p>
					<table style="width:95%;">
						<tr><td colspan="4"><center><?php echo $assess['Co_ordination'] ?></center></td></tr>
					</table><?php } ?>
					<table style="width:95%;">
					    <?php if($assess['Non_equilibrium'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Non equilibrium :</td><td colspan="3"><?php echo $assess['Non_equilibrium']; ?></td></tr><?php } ?>
					    <?php if($assess['Finger_to_nose'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Finger to nose :</td><td colspan="3"><?php echo $assess['Finger_to_nose']; ?></td></tr><?php } ?>
						<?php if($assess['Finger_to_therapist'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Finger to therapist finger		:</td><td colspan="3"><?php echo $assess['Finger_to_therapist']; ?></td></tr><?php } ?>
						<?php if($assess['Finger_to_finger'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Finger to finger	:</td><td colspan="3"><?php echo ($assess['Finger_to_finger']); ?></td></tr><?php } ?>
						<?php if($assess['Alternate_nose'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Alternate nose to finger	:</td><td><?php echo ($assess['Alternate_nose']); ?></td></tr><?php } ?>
						<?php if($assess['Finger_opposition'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Finger opposition	:</td><td><?php echo ($assess['Finger_opposition']); ?></td></tr><?php } ?>
						<?php if($assess['Mass'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Mass grasp	:</td><td><?php echo ($assess['Mass']); ?></td></tr><?php } ?>
						<?php if($assess['Pronation'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Pronation / Supination	:</td><td><?php echo ($assess['Pronation']); ?></td></tr><?php } ?>
						<?php if($assess['Rebound'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Rebound	:</td><td><?php echo ($assess['Rebound']); ?></td></tr><?php } ?>
						<?php if($assess['Tapping'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Tapping (hand & foot)	:</td><td><?php echo ($assess['Tapping']); ?></td></tr><?php } ?>
						<?php if($assess['Pointing'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Pointing and past pointing	:</td><td><?php echo ($assess['Pointing']); ?></td></tr><?php } ?>
						<?php if($assess['Alternate_heel'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Alternate heel to knee & heel to toe	:</td><td><?php echo ($assess['Alternate_heel']); ?></td></tr><?php } ?>
						<?php if($assess['Toe'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Toe to examiners finger	:</td><td><?php echo ($assess['Toe']); ?></td></tr><?php } ?>
						<?php if($assess['Heel_on_shin'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Heel on shin	:</td><td><?php echo ($assess['Heel_on_shin']); ?></td></tr><?php } ?>
						<?php if($assess['Drawing'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Drawing a circle (hand & Foot)	:</td><td><?php echo ($assess['Drawing']); ?></td></tr><?php } ?>
						<?php if($assess['Fixation'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Fixation / position holding (UL & LL)	:</td><td><?php echo ($assess['Fixation']); ?></td></tr><?php } ?>
						</table>
					 <p style="color:black;">&nbsp;&nbsp;&nbsp;Grading		</p>
					  	
						
						<table style="width:95%;">
						<tr><td>5 -	Normal performance</td></tr>
						<tr><td>4 - Minimal impairment – able to accomplish activity with slightly less than normal speed and skill</td></tr>
						<tr><td>3 - Moderate impairment – able to accomplish activity but coordination deficits very noticeable movements are slow, awkward and unsteady</td></tr>
						<tr><td>2 – Severe impairment – able only to initiate activity without completion</td></tr>
						<tr><td>1-	Activity impossible</td></tr>
						
						</table>
						
						
						<p style="color:black;">&nbsp;&nbsp;&nbsp;Equilibrium		</p>
					    
						<table style="width:95%;">
						<tr><td>Standing – normal posture</td></tr>
						<tr><td>Standing – vision occluded</td></tr>
						<tr><td>Standing – feet together</td></tr>
						<tr><td>Standing on one foot</td></tr>
						<tr><td>Standing – forward trunk flexion and return back to neutral</td></tr>
						<tr><td>Standing – lateral trunk flexion</td></tr>
						<tr><td>Walk – tandem walking</td></tr>
						<tr><td>Walk – along a straight line</td></tr>
						<tr><td>Walk – place feet on foot marks</td></tr>
						<tr><td>Walk – sideways</td></tr>
						<tr><td>Walk – backward</td></tr>
						<tr><td>Walk – in a circle</td></tr>
						<tr><td>Walk – on heels</td></tr>
						<tr><td>Walk – on toes</td></tr>
						</table>
						
						
						<p style="color:black;">&nbsp;&nbsp;&nbsp;Grading		</p>
						<table style="width:95%;">
						<tr><td>4 - able to accomplish activity</td></tr>
						<tr><td>3 – Can complete activity, needs minor help to maintain balance</td></tr>
						<tr><td>2 -	Can complete activity with moderate to maximal help</td></tr>
						<tr><td>1 -	Activity impossible</td></tr>
						
						</table>
					    <?php if($assess['Static'] != false || $assess['Dynamic'] != false || $assess['Berg'] != false  || $assess['Functional_grades'] != false){?>
						<table style="width:95%;">
							<tr><td colspan="4">&nbsp;&nbsp;&nbsp;Balance assessment 	:</td><td></td></tr>
							<?php if($assess['Static'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Static :</td><td><?php echo ($assess['Static']); ?></td></tr><?php } ?>
							<?php if($assess['Dynamic'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dynamic :</td><td><?php echo ($assess['Dynamic']); ?></td></tr><?php } ?>
							<?php if($assess['Berg'] != false){?><tr><td>&nbsp;&nbsp;&nbsp; 1.	Berg balance scale	:</td><td><?php echo ($assess['Berg']); ?></td></tr><?php } ?>
							<?php if($assess['Functional_grades'] != false){?><tr><td>&nbsp;&nbsp;&nbsp; 2.	Functional balance grades	:</td><td><?php echo ($assess['Functional_grades']); ?></td></tr><?php } ?>
					    </table>
						<?php } ?>
						<table style="width:95%;">
						<tr><td>Normal – able to maintain balance without support. Accepts maximal challenge and can shift weight in all directions.</td></tr>
						<tr><td>Good – able to maintain balance without support. Accepts moderate challenge and can shift weight although limitations are evident</td></tr>
						<tr><td>Fair – able to maintain balance without support cannot tolerate challenge cannot maintain balance while shuffling weight</td></tr>
						<tr><td>Poor – patient requires support to maintain balance</td></tr>
						<tr><td>Zero – patient requires maximal assistance to maintain balance</td></tr>
						</table>
						<?php if($assess['R_type'] != false || $assess['R_chest'] != false || $assess['R_ventilation'] != false  || $assess['R_auscultation'] != false  || $assess['R_percussion'] != false  || $assess['R_pft'] != false){?>
					<table style="width:95%;">
						<tr><td colspan="4">&nbsp;&nbsp;&nbsp;Respiratory assessment 	:</td><td></td></tr>
						 <?php if($assess['R_type'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;•	Type, depth, pattern :</td><td><?php echo ($assess['R_type']); ?></td></tr><?php } ?>
						 <?php if($assess['R_chest'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;•	Chest expansion	:</td><td><?php echo ($assess['R_chest']); ?></td></tr><?php } ?>
						 <?php if($assess['R_ventilation'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;•	Ventilation – mode	:</td><td><?php echo ($assess['R_ventilation']); ?></td></tr><?php } ?>
						 <?php if($assess['R_auscultation'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;•	Auscultation	:</td><td><?php echo ($assess['R_auscultation']); ?></td></tr><?php } ?>
						 <?php if($assess['R_percussion'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;•	Percussion	:</td><td><?php echo ($assess['R_percussion']); ?></td></tr><?php } ?>
						 <?php if($assess['R_pft'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;•	PFT	:</td><td><?php echo ($assess['R_pft']); ?></td></tr><?php } ?>
					</table>
						<?php } ?>
						<?php if($assess['Anterior'] != false || $assess['Posterior'] != false || $assess['Lateral'] != false ){?>
					<p style="color:#63C0EE;">&nbsp;&nbsp;&nbsp;Assessment of bladder and bowel functions – incontinence, urinary retention		</p>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;Assessment of posture		</p>
					<?php } ?>
					<table style="width:95%;">
					   <?php if($assess['Anterior'] != false){?> <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Anterior view :</td><td colspan="3"><?php echo $assess['Anterior']; ?></td></tr><?php } ?>
					   <?php if($assess['Posterior'] != false){?> <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Posterior view :</td><td colspan="3"><?php echo $assess['Posterior']; ?></td></tr><?php } ?>
						<?php if($assess['Lateral'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lateral view:		:</td><td colspan="3"><?php echo $assess['Lateral']; ?></td></tr><?php } ?>
					</table>
					<?php if($assess['Qualitative'] != false || $assess['Quantitative'] != false){?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;Assessment of gait	</p>
					<?php } ?>
					<table style="width:95%;">
						<?php if($assess['Qualitative'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Qualitative	:</td><td><?php echo ($assess['Qualitative']); ?></td></tr><?php } ?>
						<?php if($assess['Quantitative'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quantitative	:</td><td><?php echo ($assess['Quantitative']); ?></td></tr><?php } ?>
					</table>
					<p style="color:#63C0EE;">&nbsp;&nbsp;&nbsp;Assessment of disability / ADL- functional assessment, BARTHEL INDEX</p>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;Investigations – x-ray, CT, MRI</p>

	  	
		
		          <table style="width:95%;">
							<tr><td><p style="float:left;" >&nbsp;&nbsp;	</td><td colspan="2">&nbsp;&nbsp;</td><td><p style="float:right;">&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url().$clientDetails['img_name']; ?>" style="width:220px; float:right;"></img></p></td></tr>
					        <tr><td><p style="float:left;" >&nbsp;&nbsp;Signature with Date :&nbsp;&nbsp; <?php echo date('d/m/Y'); ?></td><td colspan="2">&nbsp;&nbsp;</td><td><p style="float:right;">UNIT/WARD Staff: <strong><?php echo $clientDetails['first_name'];  ?></strong></p></td></tr>
					</table>
		</div>  
	   </div>
	   </div>
	</div>
	</div>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/parsley.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/all.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/plugins/fullcalendar/lib/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/plugins/fullcalendar/fullcalendar.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/plugins/fullcalendar/data/profile-agenda.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/select2/select2.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-confirm.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-confirm.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/plugins/materialNote/js/ckMaterializeOverrides.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/plugins/materialNote/lib/codeMirror/codemirror.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/plugins/materialNote/lib/codeMirror/xml.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/plugins/materialNote/js/materialNote.js"></script>
	<script src="<?php echo base_url() ?>assets/js/counter.js"></script>
	<script src="https://cdn.rawgit.com/dubrox/Multiple-Dates-Picker-for-jQuery-UI/master/jquery-ui.multidatespicker.js" ></script>
    <script>
	$(document).ready(function() {
		$('#printButton').click(function(e) {
          window.print();
        });
		parent.$.colorbox.resize({innerWidth:900, innerHeight: $('#InvoiceContainer').outerHeight() });
	});
		</script>
</body>
</html>





