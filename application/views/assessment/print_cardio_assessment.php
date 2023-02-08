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
							
							<tr><td colspan="4"><center>Cardio - Respiratory Assessment</center></td></tr>
							</table>    
					</div>
				  </br>
				   <div style="width:95%;">  
				    <table style="width:100%;"><tr><td style="width:80%;" colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td> Date : <?php echo date('d/m/Y',strtotime($assess['assess_date'])); ?></td>
					</tr></table>   
					</div>
					<div style="width:95%;"  >   
					
						<p style="color:#000000;font-weight:bold;">&nbsp;&nbsp;&nbsp;I. PATIENT DETAILS</p> 	
					<table style="width:95%;">
					
					<tr><td>&nbsp;&nbsp;&nbsp;	Name :</td><td colspan="3"><?php echo $patient['first_name']; ?></td></tr>
						<tr><td>&nbsp;&nbsp;&nbsp;	Age			:</td><td colspan="3"><?php echo $patient['age']; ?></td></tr>
						<tr><td>&nbsp;&nbsp;&nbsp;	Sex				:</td><td colspan="3"><?php echo $patient['gender']; ?></td></tr>
						<tr><td>&nbsp;&nbsp;&nbsp;	Occupation				:</td><td colspan="3"><?php echo $patient['occupation']; ?></td></tr>
						<!--<tr><td>&nbsp;&nbsp;&nbsp;	UHID NO			:</td><td colspan="3"><?php echo $assess['uhid_no']; ?></td></tr>-->
						
						<?php if(date('d-m-Y',strtotime($assess['date_admission']))!='01-01-1970'){?><tr><td>&nbsp;&nbsp;&nbsp;	Date Of Surgery/ Date Of Admission			:</td><td colspan="3"><?php echo date('d M, Y',strtotime($assess['date_admission'])); ?></td></tr><?php } ?>
						<?php if(date('d-m-Y',strtotime($assess['date_assessment']))!='01-01-1970'){?><tr><td>&nbsp;&nbsp;&nbsp;	Date Of Assessment		:</td><td colspan="3"><?php echo date('d M, Y',strtotime($assess['date_assessment'])); ?></td></tr><?php } ?>
						<?php if($assess['ward'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Ward			:</td><td colspan="3"><?php echo $assess['ward']; ?></td></tr><?php } ?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Address			:</td><td colspan="3"><?php echo $patient['address_line1']; ?></td></tr>
						</table>
						<p style="color:#000000;font-weight:bold;">&nbsp;&nbsp;&nbsp;II. PATIENT Assessment</p> 
						<table style="width:95%;">
					    <?php if($assess['chief_complaint'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Chief Complaint :</td><td colspan="3"><?php echo $assess['chief_complaint']; ?></td></tr><?php } ?>
						<?php if($assess['present_history'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Present History			:</td><td colspan="3"><?php echo $assess['present_history']; ?></td></tr><?php } ?>
						<?php if($assess['past_history'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Past History		:</td><td colspan="3"><?php echo $assess['past_history']; ?></td></tr><?php } ?>
						<?php if($assess['personal_history'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Personal History			:</td><td colspan="3"><?php echo $assess['personal_history']; ?></td></tr><?php } ?>
						<?php if($assess['smoking'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Smoking			:</td><td colspan="3"><?php echo $assess['smoking']; ?></td></tr><?php } ?>
						<?php if($assess['alcoholism'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Alcoholism				:</td><td colspan="3"><?php echo $assess['alcoholism']; ?></td></tr><?php } ?>
						<?php if($assess['tobacco'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Tobacco chewing: </td><td colspan="3"><?php echo $assess['tobacco']; ?></tr><?php } ?>
						<?php if($assess['diet'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Diet 			: </td><td colspan="3"><?php echo $assess['diet']; ?></tr><?php } ?>
                        <?php if($assess['allergens'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	History To Allergens				: </td><td colspan="3"><?php echo $assess['allergens']; ?></td></tr><?php } ?>
                        <?php if($assess['medical_history'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Medical History 			: </td><td colspan="3"><?php echo $assess['medical_history']; ?></tr><?php } ?>
						<?php if($assess['family_history'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Family History 			: </td><td colspan="3"><?php echo $assess['family_history']; ?></tr><?php } ?>
						<?php if($assess['occupational_history'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Occupational History 			: </td><td colspan="3"><?php echo $assess['occupational_history']; ?></tr><?php } ?>
						<?php if($assess['social_history'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Social History 			: </td><td colspan="3"><?php echo $assess['social_history']; ?></tr><?php } ?>
						<?php if($assess['vital_signs'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Vital Signs 			: </td><td colspan="3"><?php echo $assess['vital_signs']; ?></tr><?php } ?>
						<?php if($assess['body_temperature'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Body Temperature 			: </td><td colspan="3"><?php echo $assess['body_temperature']; ?></tr><?php } ?>
						<?php if($assess['heart_rate'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Heart rate 			: </td><td colspan="3"><?php echo $assess['heart_rate']; ?></tr><?php } ?>
						<?php if($assess['chart'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Body Chart  :</td><td colspan="3"><img src="<?php echo $assess['chart']; ?>"/></td><tr><?php } ?>
						<?php if($assess['blood_pressure'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Blood pressure 			: </td><td colspan="3"><?php echo $assess['blood_pressure']; ?></tr><?php } ?>
						<?php if($assess['respiratory_rate'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Respiratory rate 			: </td><td colspan="3"><?php echo $assess['respiratory_rate']; ?></tr><?php } ?>
						<?php if($assess['spo2'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Spo2 			: </td><td colspan="3"><?php echo $assess['spo2']; ?></tr><?php } ?>
						
					</table>
					<?php if($assess['consciousness'] != false || $assess['body_built'] != false || $assess['external_app'] != false || $assess['color_limb'] != false || $assess['clubbing'] != false || $assess['edema'] != false || $assess['communication'] != false ) {?>
					<p style="color:#000000;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OBJECTIVE DATA</p> 		</p>
					<?php } ?>
						<table style="width:95%;">
						<?php if($assess['consciousness'] != false){?><tr><td>&nbsp;&nbsp;&nbsp; Consciousness:</td><td colspan="3"><?php echo $assess['consciousness']; ?></td></tr><?php } ?>
						<?php if($assess['body_built'] != false){?><tr><td>&nbsp;&nbsp;&nbsp; Body built			:</td><td colspan="3"><?php echo $assess['body_built']; ?></td></tr><?php } ?>
						<?php if($assess['external_app'] != false){?><tr><td>&nbsp;&nbsp;&nbsp; 	External appliances			:</td><td colspan="3"><?php echo $assess['external_app']; ?></td></tr><?php } ?>
						<?php if($assess['color_limb'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Color of limb				:</td><td colspan="3"><?php echo $assess['color_limb']; ?></td></tr><?php } ?>
						<?php if($assess['clubbing'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Clubbing		:</td><td colspan="3"><?php echo $assess['clubbing']; ?></td></tr><?php } ?>
						<?php if($assess['edema'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Edema					:</td><td colspan="3"><?php echo $assess['edema']; ?></td></tr><?php } ?>
						<?php if($assess['communication'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Communication				: </td><td colspan="3"><?php echo $assess['communication']; ?></td></tr><?php } ?>
						<?php if($assess['speech'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Speech				: </td><td colspan="3"><?php echo $assess['speech']; ?></td></tr><?php } ?>
						<?php if($assess['cyanosis'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Cyanosis				: </td><td colspan="3"><?php echo $assess['cyanosis']; ?></td></tr><?php } ?>
						<?php if($assess['dyspnoea'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Dyspnoea				: </td><td colspan="3"><?php echo $assess['dyspnoea']; ?></td></tr><?php } ?>
						<?php if($assess['jaundice'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Jaundice				: </td><td colspan="3"><?php echo $assess['jaundice']; ?></td></tr><?php } ?>
						<?php if($assess['facial'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Facial expression				: </td><td colspan="3"><?php echo $assess['facial']; ?></td></tr><?php } ?>
						<?php if($assess['eva_head'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Evaluation of head and neck				: </td><td colspan="3"><?php echo $assess['eva_head']; ?></td></tr><?php } ?>
						<?php if($assess['jugular_vein'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Jugular vein				: </td><td colspan="3"><?php echo $assess['jugular_vein']; ?></td></tr><?php } ?>
						<?php if($assess['respiratory'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Signs Of Respiratory Distress			: </td><td colspan="3"><?php echo $assess['respiratory']; ?></td></tr><?php } ?>
						<?php if($assess['nasal'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Nasal flaring				: </td><td colspan="3"><?php echo $assess['nasal']; ?></td></tr><?php } ?>
						<?php if($assess['accesory'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Accesory muscle usage				: </td><td colspan="3"><?php echo $assess['accesory']; ?></td></tr><?php } ?>
						<?php if($assess['vein'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Jugular vein			: </td><td colspan="3"><?php echo $assess['vein']; ?></td></tr><?php } ?>
						<?php if($assess['shoulder'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Shoulder				: </td><td colspan="3"><?php echo $assess['shoulder']; ?></td></tr><?php } ?>
						<?php if($assess['clavicular'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Clavicular prominence			: </td><td colspan="3"><?php echo $assess['clavicular']; ?></td></tr><?php } ?>
						<?php if($assess['trapezius'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Trapezius prominence			: </td><td colspan="3"><?php echo $assess['trapezius']; ?></td></tr><?php } ?>
						<?php if($assess['serratus'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Serratus anterior				: </td><td colspan="3"><?php echo $assess['serratus']; ?></td></tr><?php } ?>
						<?php if($assess['thoracic'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Thoracic cavity			: </td><td colspan="3"><?php echo $assess['thoracic']; ?></td></tr><?php } ?>
						<?php if($assess['spacing'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Spacing of intercoastal region			: </td><td colspan="3"><?php echo $assess['spacing']; ?></td></tr><?php } ?>
						<?php if($assess['trachea'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Trachea		: </td><td colspan="3"><?php echo $assess['trachea']; ?></td></tr><?php } ?>
					    <?php if($assess['chest'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Chest wall deformities		: </td><td colspan="3"><?php echo $assess['chest']; ?></td></tr><?php } ?>
						<?php if($assess['unmove_chest'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Unmoving chest		: </td><td colspan="3"><?php echo $assess['unmove_chest']; ?></td></tr><?php } ?>
						<?php if($assess['move_chest'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Moving chest		: </td><td colspan="3"><?php echo $assess['move_chest']; ?></td></tr><?php } ?>
						<?php if($assess['breathing'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Breathing Type	: </td><td colspan="3"><?php echo $assess['breathing']; ?></td></tr><?php } ?>
						<!--<tr><td>&nbsp;&nbsp;&nbsp;	Type		: </td><td colspan="3"><?php echo $assess['type']; ?></td></tr>-->
						<?php if($assess['depth'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Depth		: </td><td colspan="3"><?php echo $assess['depth']; ?></td></tr><?php } ?>
						<?php if($assess['symmetry'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Symmetry		: </td><td colspan="3"><?php echo $assess['symmetry']; ?></td></tr><?php } ?>
						<?php if($assess['rate'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Rate		: </td><td colspan="3"><?php echo $assess['rate']; ?></td></tr><?php } ?>
						<?php if($assess['palpation'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	On palpation		: </td><td colspan="3"><?php echo $assess['palpation']; ?></td></tr><?php } ?>
						<?php if($assess['anterior_thoracic'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Assessment of anterior thoracic expansion		: </td><td colspan="3"><?php echo $assess['anterior_thoracic']; ?></td></tr><?php } ?>
						<?php if($assess['posterior_thoracic'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Assessment of posterior thoracic expansion		: </td><td colspan="3"><?php echo $assess['posterior_thoracic']; ?></td></tr><?php } ?>
						<?php if($assess['upper_lobe'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Upper lobe		: </td><td colspan="3"><?php echo $assess['upper_lobe']; ?></td></tr><?php } ?>
						<?php if($assess['middle_lobe'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Middle lobe		: </td><td colspan="3"><?php echo $assess['middle_lobe']; ?></td></tr><?php } ?>
						<?php if($assess['lower_lobe'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Lower lobe		: </td><td colspan="3"><?php echo $assess['lower_lobe']; ?></td></tr><?php } ?>
						<?php if($assess['heart_position'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Heart position		: </td><td colspan="3"><?php echo $assess['heart_position']; ?></td></tr><?php } ?>
						<?php if($assess['tracheal'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Tracheal position	: </td><td colspan="3"><?php echo $assess['tracheal']; ?></td></tr><?php } ?>
						<?php if($assess['mediastinal'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Mediastinal position		: </td><td colspan="3"><?php echo $assess['mediastinal']; ?></td></tr><?php } ?>
						<?php if($assess['muscles_palpation'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Accessory muscles palpation		: </td><td colspan="3"><?php echo $assess['muscles_palpation']; ?></td></tr><?php } ?>
						<?php if($assess['diaphragmatic'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Diaphragmatic exertion		: </td><td colspan="3"><?php echo $assess['diaphragmatic']; ?></td></tr><?php } ?>
						<?php if($assess['tenderness'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Tenderness		: </td><td colspan="3"><?php echo $assess['tenderness']; ?></td></tr><?php } ?>
						<?php if($assess['fremitus'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Fremitus		: </td><td colspan="3"><?php echo $assess['fremitus']; ?></td></tr><?php } ?>
						<?php if($assess['chest_expansion'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Chest expansion		: </td><td colspan="3"><?php echo $assess['chest_expansion']; ?></td></tr><?php } ?>
						<?php if($assess['axillary_level'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Axillary level		: </td><td colspan="3"><?php echo $assess['axillary_level']; ?></td></tr><?php } ?>
						<?php if($assess['nipple_level'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Nipple level		: </td><td colspan="3"><?php echo $assess['nipple_level']; ?></td></tr><?php } ?>
						<?php if($assess['xiphoid_level'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Xiphoid level		: </td><td colspan="3"><?php echo $assess['xiphoid_level']; ?></td></tr><?php } ?>
						<?php if($assess['percussion'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	On percussion		: </td><td colspan="3"><?php echo $assess['percussion']; ?></td></tr><?php } ?>
						<?php if($assess['auscultation'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	On auscultation		: </td><td colspan="3"><?php echo $assess['auscultation']; ?></td></tr><?php } ?>
						<?php if($assess['breath_sounds'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Breath sounds		: </td><td colspan="3"><?php echo $assess['breath_sounds']; ?></td></tr><?php } ?>
						<?php if($assess['abnormal_breath'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Abnormal breath sounds		: </td><td colspan="3"><?php echo $assess['abnormal_breath']; ?></td></tr><?php } ?>
						<?php if($assess['voice_sounds'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Voice sounds		: </td><td colspan="3"><?php echo $assess['voice_sounds']; ?></td></tr><?php } ?>
						<?php if($assess['heart_sounds'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Heart sounds		: </td><td colspan="3"><?php echo $assess['heart_sounds']; ?></td></tr><?php } ?>
						<?php if($assess['other_systems'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Other systems		: </td><td colspan="3"><?php echo $assess['other_systems']; ?></td></tr><?php } ?>
						<?php if($assess['integumentary'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Integumentary system		: </td><td colspan="3"><?php echo $assess['integumentary']; ?></td></tr><?php } ?>
						<?php if($assess['scars'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Scars		: </td><td colspan="3"><?php echo $assess['scars']; ?></td></tr><?php } ?>
						<?php if($assess['incisions'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Incisions		: </td><td colspan="3"><?php echo $assess['incisions']; ?></td></tr><?php } ?>
						<?php if($assess['ulcers'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Ulcers		: </td><td colspan="3"><?php echo $assess['ulcers']; ?></td></tr><?php } ?>
						<?php if($assess['musculo_ske'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Musculo-skeletal system		: </td><td colspan="3"><?php echo $assess['musculo_ske']; ?></td></tr><?php } ?>
						<?php if($assess['deformities'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Any deformities		: </td><td colspan="3"><?php echo $assess['deformities']; ?></td></tr><?php } ?>
						<?php if($assess['asymmetrical'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Asymmetrical alignment of the body		: </td><td colspan="3"><?php echo $assess['asymmetrical']; ?></td></tr><?php } ?>
						<?php if($assess['postural'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Postural assessment		: </td><td colspan="3"><?php echo $assess['postural']; ?></td></tr><?php } ?>
						<?php if($assess['range_motion'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Range of motion		: </td><td colspan="3"><?php echo $assess['range_motion']; ?></td></tr><?php } ?>
						<?php if($assess['muscle_wasting'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Muscle wasting	: </td><td colspan="3"><?php echo $assess['muscle_wasting']; ?></td></tr><?php } ?>
						<?php if($assess['neurological'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Neurological system	: </td><td colspan="3"><?php echo $assess['neurological']; ?></td></tr><?php } ?>
						<?php if($assess['co_ordinated'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Assess co-ordinated movement		: </td><td colspan="3"><?php echo $assess['co_ordinated']; ?></td></tr><?php } ?>
						<?php if($assess['balance'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Assess balance		: </td><td colspan="3"><?php echo $assess['balance']; ?></td></tr><?php } ?>
						<?php if($assess['equilibrium'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Assess equilibrium		: </td><td colspan="3"><?php echo $assess['equilibrium']; ?></td></tr><?php } ?>
						<?php if($assess['investigation'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Special investigation		: </td><td colspan="3"><?php echo $assess['investigation']; ?></td></tr><?php } ?>
						<?php if($assess['cough'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Cough Type		: </td><td colspan="3"><?php echo $assess['cough']; ?></td></tr><?php } ?>
						<!--<tr><td>&nbsp;&nbsp;&nbsp;	Type		: </td><td colspan="3"><?php echo $assess['type1']; ?></td></tr>-->
						<?php if($assess['time'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	What time		: </td><td colspan="3"><?php echo $assess['time']; ?></td></tr><?php } ?>
						<?php if($assess['aggravating_factor'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Aggravating factors		: </td><td colspan="3"><?php echo $assess['aggravating_factor']; ?></td></tr><?php } ?>
						<?php if($assess['sputum_exam'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Sputum examination		: </td><td colspan="3"><?php echo $assess['sputum_exam']; ?></td></tr><?php } ?>
						<?php if($assess['blood_exam'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Blood examination		: </td><td colspan="3"><?php echo $assess['blood_exam']; ?></td></tr><?php } ?>
						<?php if($assess['chest_xray'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Chest x-ray		: </td><td colspan="3"><?php echo $assess['chest_xray']; ?></td></tr><?php } ?>
						<?php if($assess['ecg'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	E.C.G		: </td><td colspan="3"><?php echo $assess['ecg']; ?></td></tr><?php } ?>
						<?php if($assess['abg'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	ABG		: </td><td colspan="3"><?php echo $assess['abg']; ?></td></tr><?php } ?>
						<?php if($assess['pft'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	PFT		: </td><td colspan="3"><?php echo $assess['pft']; ?></td></tr><?php } ?>
						<?php if($assess['stress'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Stress test		: </td><td colspan="3"><?php echo $assess['stress']; ?></td></tr><?php } ?>
						<?php if($assess['2d_echo'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	2D-Echo cardiogram		: </td><td colspan="3"><?php echo $assess['2d_echo']; ?></td></tr><?php } ?>
						<?php if($assess['ct_scan'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	CT scan		: </td><td colspan="3"><?php echo $assess['ct_scan']; ?></td></tr><?php } ?>
						<?php if($assess['angiogram'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Angiogram		: </td><td colspan="3"><?php echo $assess['angiogram']; ?></td></tr><?php } ?>
						<?php if($assess['ultrasound_scan'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Ultrasound scan		: </td><td colspan="3"><?php echo $assess['ultrasound_scan']; ?></td></tr><?php } ?>
						<?php if($assess['mri_scan'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	MRI scan		: </td><td colspan="3"><?php echo $assess['mri_scan']; ?></td></tr><?php } ?>
						<?php if($assess['prov_diagnosis'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Provisional diagnosis	: </td><td colspan="3"><?php echo $assess['prov_diagnosis']; ?></td></tr><?php } ?>
						<?php if($assess['diff_diagnosis'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Differential diagnosis		: </td><td colspan="3"><?php echo $assess['diff_diagnosis']; ?></td></tr><?php } ?>
						<?php if($assess['physio_treatment'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Physiotherapy treatment		: </td><td colspan="3"><?php echo $assess['physio_treatment']; ?></td></tr><?php } ?>
						<?php if($assess['problem_list'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Problem list		: </td><td colspan="3"><?php echo $assess['problem_list']; ?></td></tr><?php } ?>
						<?php if($assess['aims'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Aims	: </td><td colspan="3"><?php echo $assess['aims']; ?></td></tr><?php } ?>
						<?php if($assess['means'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	means		: </td><td colspan="3"><?php echo $assess['means']; ?></td></tr><?php } ?>

					</table>
					<table style="width:95%;">
							<tr><td><p style="float:left;" >&nbsp;&nbsp;	</td><td colspan="2">&nbsp;&nbsp;</td><td><p style="float:right;">&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url().$clientDetails['img_name']; ?>" style="width:220px; float:right;"></img></p></td></tr>
					        <tr><td><p style="float:left;" >&nbsp;&nbsp;Signature with Date :&nbsp;&nbsp; <?php echo date('d/m/Y'); ?></td><td colspan="2">&nbsp;&nbsp;</td><td><p style="float:right;">UNIT/WARD Staff: <strong><?php echo $clientDetails['first_name'];  ?></strong></p></td></tr>
					</table>
					
					
							</br></br>
	  	
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