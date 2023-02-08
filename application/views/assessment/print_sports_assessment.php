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
							
							<tr><td colspan="4"><center>Sports Assessment </center></td></tr>
							</table>    
					</div>
				  </br>
				   <div style="width:95%;">  
				    <table style="width:100%;"><tr><td style="width:80%;" colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td> Date : <?php echo date('d/m/Y',strtotime($assess['assess_date'])); ?></td>
					</tr></table>   
					</div>
					<div style="width:95%;"  >  
					<p style="color:#63C0EE;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I. PATIENT DETAILS</p>
						<table style="width:95%;"><tr><td>&nbsp;&nbsp;&nbsp;1)	Name :</td><td colspan="3"><?php echo $patient['first_name'].' '.$patient['last_name']; ?></td></tr>
						<tr><td>&nbsp;&nbsp;&nbsp;2)	Date of Birth			:</td><td colspan="3"><?php echo date('d M, Y',strtotime($patient['dob'])); ?></td></tr>
						<tr><td>&nbsp;&nbsp;&nbsp;3)	Gender				:</td><td colspan="3"><?php echo $patient['gender']; ?></td></tr>
						<tr><td>&nbsp;&nbsp;&nbsp;4)	Address				:</td><td colspan="3"><?php echo $patient['address_line1']; ?></td></tr>
						<tr><td>&nbsp;&nbsp;&nbsp;5)	Occupation			:</td><td colspan="3"><?php echo $patient['occupation']; ?></td></tr>
						<?php if($assess['sport'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;6)	Sport					:</td><td colspan="3"><?php echo $assess['sport']; ?></td></tr><?php } ?>
						<?php if($assess['standard'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;7)	Standard				: </td><td colspan="3"><?php echo $assess['standard']; ?>
							</td></tr><?php } ?>
					</table>
					<?php if($assess['Aerobic'] != false || $assess['Anaerobic'] != false || $assess['Trainig'] != false || $assess['Winter'] != false || $assess['Summer'] != false || $assess['warm'] != false ){?>
					<p style="color:#63C0EE;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;II.	TRAINING DETAILS</p> 
						<table style="width:95%;">
						<?php if($assess['Aerobic'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;1)	Aerobic :</td><td colspan="3"><?php echo $assess['Aerobic']; ?></td></tr><?php } ?>
						<?php if($assess['Anaerobic'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;2)	Anaerobic			:</td><td colspan="3"><?php echo $assess['Anaerobic']; ?></td></tr><?php } ?>
						<?php if($assess['Trainig'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;3)	Traditional Pattern of training 				:</td><td colspan="3"><?php echo $assess['Trainig']; ?></td></tr><?php } ?>
						<?php if($assess['Winter'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;4)	Winter				:</td><td colspan="3"><?php echo $assess['Winter']; ?></td></tr><?php } ?>
						<?php if($assess['Summer'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;5)	Summer			:</td><td colspan="3"><?php echo $assess['Summer']; ?></td></tr><?php } ?>
						<?php if($assess['warm'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;6)	Details of warm up/ Cool down activity					:</td><td colspan="3"><?php echo $assess['warm']; ?></td></tr><?php } ?>
					</table>
					<?php } ?>
					<?php if($assess['past_his'] != false || $assess['drug_his'] != false || $assess['Smoker'] != false || $assess['Alcohol'] != false){?>
					<p style="color:#63C0EE;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;III.	MEDICAL HISTORY</p> 		</p>
					<?php } ?>
						<table style="width:95%;">
						<?php if($assess['past_his'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;1)	Past Medical History :</td><td colspan="3"><?php echo $assess['past_his']; ?></td></tr><?php } ?>
						<?php if($assess['drug_his'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;2)	Social – Drug History			:</td><td colspan="3"><?php echo $assess['drug_his']; ?></td></tr><?php } ?>
						<?php if($assess['Smoker'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;3)	Smoker				:</td><td colspan="3"><?php echo ($assess['Smoker']); ?></td></tr><?php } ?>
						<?php if($assess['Alcohol'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;4)	Alcohol				:</td><td><?php echo ($assess['Alcohol']); ?></td>
						  <?php if($assess['Alcohol'] == 'yes') { ?>
							<td colspan="2"><?php echo $assess['alcohol_rate']; ?></td></tr><?php } ?>
						  <?php } ?></table>
						  <?php if($assess['diet_notes'] != false){?>
					<p style="color:#63C0EE;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IV.	DIET HISTORY</p>
						<table style="width:95%;">
						<tr><td colspan="4"><center><?php echo $assess['diet_notes']; ?></center></td></tr>
						</table>
						 <?php } ?>
						 <?php if($assess['immunistaion'] != false){?>
					<p style="color:#63C0EE;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;V.	IMMUNISATION RECORD</p>
						<table style="width:95%;">
						<tr><td colspan="4"><center><?php echo $assess['immunistaion']; ?></center></td></tr>
					</table>
					<?php } ?>
					 <?php if($assess['type_shoes'] != false || $assess['protective'] != false || $assess['nature'] != false ){?>
					<p style="color:#63C0EE;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VI.	PERSONAL HISTORY</p>
					 <?php } ?>
					<table style="width:95%;">
						 <?php if($assess['type_shoes'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;1)	Type  of shoes :</td><td colspan="3"><?php echo $assess['type_shoes']; ?></td></tr><?php } ?>
						 <?php if($assess['protective'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;2)	Protective aids			:</td><td colspan="3"><?php echo $assess['protective']; ?></td></tr><?php } ?>
						 <?php if($assess['nature'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;3)	Nature of ground				:</td><td colspan="3"><?php echo $assess['nature']; ?></td></tr><?php } ?>
					</table>
					<?php if(date('d-m-Y',strtotime($assess['current_injury']))!='01-01-1970' || $assess['Acute'] != false || $assess['s_injury'] != false || $assess['s_details'] != false || $assess['time'] != false ){?>
					<p style="color:#63C0EE;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VII.	CURRENT INJURY</p> 
					<?php } ?>
					<table style="width:95%;">
					<?php if(date('d-m-Y',strtotime($assess['current_injury']))!='01-01-1970'){?>
						<tr><td>&nbsp;&nbsp;&nbsp;1)	Date of Injury :</td><td colspan="3"><?php echo date('d-m-Y',strtotime($assess['current_injury'])); ?></td></tr><?php } ?>
						<?php if($assess['Acute'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	Acute / Chronic	 :</td><td colspan="3"><?php echo $assess['Acute']; ?></td></tr><?php } ?>
						<?php if($assess['s_injury'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;2)	Previous Sports related injuries		:</td><td colspan="3"><?php echo $assess['s_injury']; ?></td></tr><?php } ?>
						<?php if($assess['s_details'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	If yes details		:</td><td colspan="3"><?php echo $assess['s_details']; ?></td></tr><?php } ?>
						<?php if($assess['time'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;3)	Time lost from training 				:</td><td colspan="3"><?php echo $assess['time']; ?></td></tr><?php } ?>
					</table>
					<?php if($assess['mechanism'] != false){?>
					<p style="color:#63C0EE;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VIII.  MECHANISM OF INJURY</p>
					<table style="width:95%;">
						<tr><td colspan="4"><center><?php echo $assess['mechanism']; ?></center></td></tr>
					</table>
					<?php } ?>
					<?php if($assess['pain_onset'] != false || $assess['duration'] != false || $assess['pain_site'] != false  || $assess['pain_type'] != false  || $assess['pain_nature'] != false  || $assess['aggravating_factors'] != false  || $assess['releaving_factors'] != false  || $assess['pattern'] != false  || $assess['vas'] != false ){?>
					<p style="color:#63C0EE;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IX  PAIN ASSESMENT</p>
					<?php } ?>
					<table style="width:95%;">
						<?php if($assess['pain_onset'] != false){?><tr><td>&nbsp;&nbsp;&nbsp; Onset</td><td colspan="3"><?php echo $assess['pain_onset']; ?></td></tr><?php } ?>
						<?php if($assess['duration'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Duration	 :</td><td colspan="3"><?php echo $assess['duration']; ?></td></tr><?php } ?>
						<?php if($assess['pain_site'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Side / Site		:</td><td colspan="3"><?php echo $assess['pain_site']; ?></td></tr><?php } ?>
						<?php if($assess['pain_type'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Type of pain		:</td><td colspan="3"><?php echo $assess['pain_type']; ?></td></tr><?php } ?>
						<?php if($assess['pain_nature'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Nature of pain	:</td><td colspan="3"><?php echo $assess['pain_nature']; ?></td></tr><?php } ?>
						<?php if($assess['aggravating_factors'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Aggravating factors	:</td><td colspan="3"><?php echo $assess['aggravating_factors']; ?></td></tr><?php } ?>
						<?php if($assess['releaving_factors'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Relieving factors	:</td><td colspan="3"><?php echo $assess['releaving_factors']; ?></td></tr><?php } ?>
						<?php if($assess['pattern'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;24 hr pattern	:</td><td colspan="3"><?php echo $assess['pattern']; ?></td></tr><?php } ?>
						<?php if($assess['vas'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;VAS	:</td><td colspan="3"><?php echo $assess['vas']; ?></td></tr><?php } ?>
					</table>
					 <?php if($assess['Built'] != false || $assess['Posture'] != false || $assess['Gait'] != false || $assess['Gait'] != false || $assess['Gait'] != false || $assess['Gait'] != false || $assess['Gait'] != false || $assess['Gait'] != false || $assess['Gait'] != false ){?>
					<p style="color:#63C0EE;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;X. CLINICAL EXAMINATION</p>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;&nbsp;<b> On observation:</b></p> 
					 <?php } ?>
					<table style="width:95%;">
						<tr><td colspan="4"><small style="color:black;">&nbsp;&nbsp;&nbsp;&nbsp; General:</small></td></tr> 
						<?php if($assess['Built'] != false){?><tr><td>&nbsp;&nbsp;&nbsp; Built</td><td colspan="3"><?php echo $assess['Built']; ?></td></tr><?php } ?>
						<?php if($assess['Posture'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Posture	 :</td><td colspan="3"><?php echo $assess['Posture']; ?></td></tr><?php } ?>
						<?php if($assess['Gait'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Gait		:</td><td colspan="3"><?php echo $assess['Gait']; ?></td></tr><?php } ?>
						 <tr><td colspan="4"><small style="color:black;">&nbsp;&nbsp;&nbsp;&nbsp; Local:</small></td></tr> 
						<?php if($assess['Colour'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Colour		:</td><td colspan="3"><?php echo $assess['Colour']; ?></td></tr><?php } ?>
						<?php if($assess['Swelling'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Swelling	:</td><td colspan="3"><?php echo $assess['Swelling']; ?></td></tr><?php } ?>
						<?php if($assess['Wasting'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Muscle Wasting	:</td><td colspan="3"><?php echo $assess['Wasting']; ?></td></tr><?php } ?>
						<?php if($assess['Deformity'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Deformity	:</td><td colspan="3"><?php echo $assess['Deformity']; ?></td></tr><?php } ?>
						<?php if($assess['appliance'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;External appliance	:</td><td colspan="3"><?php echo $assess['appliance']; ?></td></tr><?php } ?>
					</table>	
 <?php if($assess['Skin'] != false || $assess['Fascia'] != false || $assess['bulk'] != false | $assess['contour'] != false | $assess['Temperature'] != false){?>					
					<p style="color:black;">&nbsp;&nbsp;&nbsp;<b> On Palpation:</b></p> 
 <?php } ?>
					<table style="width:95%;">
						<?php if($assess['Skin'] != false){?><tr><td>&nbsp;&nbsp;&nbsp; Skin</td><td colspan="3"><?php echo $assess['Skin']; ?></td></tr><?php } ?>
						<?php if($assess['Fascia'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Fascia		 :</td><td colspan="3"><?php echo $assess['Fascia']; ?></td></tr><?php } ?>
						<?php if($assess['bulk'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Muscle bulk		 :</td><td colspan="3"><?php echo $assess['bulk']; ?></td></tr><?php } ?>
						<?php if($assess['contour'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Bony contour		:</td><td colspan="3"><?php echo $assess['contour']; ?></td></tr><?php } ?>
						<?php if($assess['Temperature'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Temperature		:</td><td colspan="3"><?php echo $assess['Temperature']; ?></td></tr><?php } ?>
					</table> 
					<?php if($assess['Arom'] != false){?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;&nbsp;<b> On Examination:</b></p>
    				<p style="color:black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; AAROM:</p> 
					<table style="width:95%;">
						<tr><td colspan="4"><center><?php echo $assess['Arom']; ?></center></td></tr>
					</table>
					<?php } ?>
					<?php if($assess['PROM'] != false){?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PROM:</p> 
					<table style="width:95%;">
						<tr><td colspan="4"><center><?php echo $assess['PROM']; ?></center></td></tr>
					</table>
					<?php } ?>
					<?php if($assess['a_movements'] != false){?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ACCESSORY MOVEMENTS:</p> 
					<table style="width:95%;">
						<tr><td colspan="4"><center><?php echo $assess['a_movements']; ?></center></td></tr>
					</table>
					<?php } ?>
					<?php if($assess['m_power'] != false){?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; MUSCLE POWER:</p> 
					<table style="width:95%;">
						<tr><td colspan="4"><center><?php echo $assess['m_power']; ?></center></td></tr>
					</table>
					<?php } ?>
                    <p style="color:#63C0EE;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </p> 
					<table style="width:95%;">
					<?php if($assess['Upper_right'] != false || $assess['Upper_left'] != false || $assess['lower_right'] != false || $assess['lower_left'] != false || $assess['Apparent'] != false) {?>
					
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;<b>MUSCLE GIRTH</b> </td><td><center><b>Right</b></center></td><td><center><b>Left</b></center></br></td></tr>
					<?php } ?>
						<?php if($assess['Upper_right'] != false || $assess['Upper_left'] != false) {?><tr><td colspan="2">&nbsp;&nbsp;&nbsp;Upper limb	-</td><td><center><?php echo $assess['Upper_right']; ?></center></td><td><center><?php echo $assess['Upper_left']; ?></center></td></tr><?php } ?>
						<?php if($assess['lower_right'] != false || $assess['lower_left'] != false) {?><tr><td colspan="2">&nbsp;&nbsp;&nbsp;Lower limb	-</td><td><center><?php echo $assess['lower_right']; ?></center></td><td><center><?php echo $assess['lower_left']; ?></center></td></tr>
						<?php } ?>
						<?php if($assess['Apparent'] != false || $assess['a_true'] != false) {?>
						<tr><td colspan="4">&nbsp;&nbsp;&nbsp;<b>Limb length </b></td></tr>
						<?php } ?>
						<?php if($assess['Apparent'] != false) {?><tr><td colspan="1">&nbsp;&nbsp;&nbsp;Apparent  -</td><td colspan="3"><center><?php echo $assess['Apparent']; ?></center></td></tr><?php } ?>
						<?php if($assess['a_true'] != false) {?><tr><td colspan="2">&nbsp;&nbsp;&nbsp;True  -</td><td colspan="3"><center><?php echo $assess['a_true']; ?></center></td></tr><?php } ?>
					</table>                                                            
					<p style="color:#63C0EE;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p> 
					<table style="width:95%;">
					<?php if($assess['c1_left'] != false || $assess['c2_left'] != false || $assess['c3_left'] != false || $assess['c4_left'] != false || $assess['c5_left'] != false || $assess['c6_left'] != false || $assess['c7_left'] != false || $assess['c8_left'] != false || $assess['t1_left'] != false ){?>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp; <b>SENSORY EVALUATION</b> </td><td><center><b>Right</b></center></td><td><center><b>Left</b></center></td></tr>  
					<?php } ?>
					<?php if($assess['c1_left'] != false || $assess['c2_left'] != false || $assess['c3_left'] != false || $assess['c4_left'] != false || $assess['c5_left'] != false || $assess['c6_left'] != false || $assess['c7_left'] != false || $assess['c8_left'] != false){ ?>
					<tr><td colspan="2"></br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Upper limb </td><td><center><b>C1  - </b></center></td><td><center><?php echo $assess['c1_left']; ?></center></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><center><b>C2  - </b></center></td><td><center><?php echo $assess['c2_left']; ?></center></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><center><b>C3  - </b></center></td><td><center><?php echo $assess['c3_left']; ?></center></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><center><b>C4  - </b></center></td><td><center><?php echo $assess['c4_left']; ?></center></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><center><b>C5  - </b></center></td><td><center><?php echo $assess['c5_left']; ?></center></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><center><b>C6  - </b></center></td><td><center><?php echo $assess['c6_left']; ?></center></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><center><b>C7  - </b></center></td><td><center><?php echo $assess['c7_left']; ?></center></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><center><b>C8  - </b></center></td><td><center><?php echo $assess['c8_left']; ?></center></td></tr><?php } ?>
						<?php if($assess['t1_left'] != false || $assess['l1_left'] != false || $assess['l2_left'] != false || $assess['l3_left'] != false || $assess['l4_left'] != false || $assess['l5_left'] != false || $assess['s1_left'] != false){ ?>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><center><b>T1  - </b></center></td><td><center><?php echo $assess['t1_left']; ?></center></td></tr>
					    <tr><td colspan="2"></br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lower limb	 </td><td><center><b>L1  - </b></center></td><td><center><?php echo $assess['l1_left']; ?></center></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><center><b>L2  - </b></center></td><td><center><?php echo $assess['l2_left']; ?></center></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><center><b>L3  - </b></center></td><td><center><?php echo $assess['l3_left']; ?></center></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><center><b>L4  - </b></center></td><td><center><?php echo $assess['l4_left']; ?></center></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><center><b>L5  - </b></center></td><td><center><?php echo $assess['l5_left']; ?></center></td></tr>
						<tr><td colspan="2"></br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Trunk	 </td><td><center><b>S1  - </b></center></td><td><center><?php echo $assess['s1_left']; ?></center></td></tr><?php } ?>
					</table>    					
                    <p style="color:#63C0EE;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </p> 
					<table style="width:95%;">
					<?php if($assess['reflex_bi_right'] != false || $assess['reflex_bi_left'] != false || $assess['reflex_b_right'] != false || $assess['reflex_b_left'] != false || $assess['reflex_t_left'] != false || $assess['knee_right'] != false || $assess['knee_left'] != false || $assess['ankle_right'] != false || $assess['ankle_left'] != false ) {?>
					
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;<b>REFLEX </b> </td><td><center><b>Right</b></center></td><td><center><b>Left</b></center></td></tr>
					
						<tr><td colspan="4">&nbsp;&nbsp;&nbsp;<small>Upper Limb :</small></td></tr>
						<?php } ?>
						<?php if($assess['reflex_bi_right'] != false || $assess['reflex_bi_left'] != false) { ?><tr><td colspan="2">&nbsp;&nbsp;&nbsp; Biceps</td><td><center><?php echo $assess['reflex_bi_right']; ?></center></td><td><center><?php echo $assess['reflex_bi_left']; ?></center></td></tr><?php } ?>
						<?php if($assess['reflex_b_right'] != false || $assess['reflex_b_left'] != false) { ?><tr><td colspan="2">&nbsp;&nbsp;&nbsp;Brachioradialis</td><td><center><?php echo $assess['reflex_b_right']; ?></center></td><td><center><?php echo $assess['reflex_b_left']; ?></center></td></tr><?php } ?>
						<?php if($assess['reflex_t_right'] != false || $assess['reflex_t_left'] != false) { ?><tr><td colspan="2">&nbsp;&nbsp;&nbsp;Triceps</td><td><center><?php echo $assess['reflex_t_right']; ?></center></td><td><center><?php echo $assess['reflex_t_left']; ?></center></td></tr><?php } ?>
						<?php if($assess['knee_right'] != false || $assess['knee_left'] != false || $assess['ankle_right'] != false || $assess['ankle_left'] != false) { ?>
						<tr><td colspan="4">&nbsp;&nbsp;&nbsp;<small>Lower Limb :</small></td></tr>
						<?php } ?>
						<?php if($assess['knee_right'] != false || $assess['knee_left'] != false) { ?><tr><td colspan="2">&nbsp;&nbsp;&nbsp; Knee</td><td><center><?php echo $assess['knee_right']; ?></center></td><td><center><?php echo $assess['knee_left']; ?></center></td></tr><?php } ?>
						<?php if($assess['ankle_right'] != false || $assess['ankle_left'] != false) { ?><tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;Ankle</td><td><center><?php echo $assess['ankle_right']; ?></center></td><td><center><?php echo $assess['ankle_left']; ?></center></td></tr><?php } ?>
					</table>     
					<?php if($assess['bio'] != false){?>					
					<p style="color:black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BIO – MECHANICAL EVALUATION:</p> 
					<table style="width:95%;">
						<tr><td colspan="4"><center><?php echo $assess['bio']; ?></center></td></tr>
					</table>
                    <?php } ?>
					<?php if($assess['special_test'] != false){?>	
				     <p style="color:black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SPECIAL TEST:</p> 
					<table style="width:95%;">
						<tr><td colspan="4"><center><?php echo $assess['special_test']; ?></center></td></tr>
					</table>
					<?php } ?>
					<?php if($assess['investigations'] != false){?>	
					<p style="color:black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INVESTIGATIONS:</p> 
					<table style="width:95%;">
						<tr><td colspan="4"><center><?php echo $assess['investigations']; ?></center></td></tr>
					</table>
					<?php } ?>
					<?php if($assess['diagnosis'] != false){?>	
					<p style="color:black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DIFFERENTIAL DIAGNOSIS:</p> 
					<table style="width:95%;">
						<tr><td colspan="4"><center><?php echo $assess['diagnosis']; ?></center></td></tr>
					</table>
					<?php } ?>
					<?php if($assess['functional'] != false){?>	
					<p style="color:black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FUNCTIONAL ASSESSMENT :</p> 
					<table style="width:95%;">
						<tr><td colspan="4"><center><?php echo $assess['functional']; ?></center></td></tr>
					</table>
					<?php } ?>
					<?php if($assess['impression'] != false){?>	
					<p style="color:#63C0EE;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; XI. CLINICAL IMPRESSION </p> 
					<table style="width:95%;">
						<tr><td colspan="4"><center><?php echo $assess['impression']; ?></center></td></tr>
					</table>
					<?php } ?>
					<!--<p style="color:#63C0EE;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; XII. PHYSIOTHERAPY MANAGEMENT-->	 </p> 
					<!--<table style="width:95%;">
						<tr><td colspan="4"><center><?php echo $assess['physio_manage']; ?></center></td></tr>
					</table>-->
					<?php if($assess['pbm_list'] != false){?>	
					<p style="color:black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Problem list :</p> 
					<table style="width:95%;">
						<tr><td colspan="4"><center><?php echo $assess['pbm_list']; ?></center></td></tr>
					</table>
					<?php } ?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp; <b> Aims </b> </p> 
					<table style="width:95%;">
						<?php if($assess['short_term'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;  Short term	</td><td colspan="3"><?php echo $assess['short_term']; ?></td></tr><?php } ?>
						<?php if($assess['long_term'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Long term & sports specific workouts		 :</td><td colspan="3"><?php echo $assess['long_term']; ?></td></tr><?php } ?>
						<?php if($assess['Means'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Means		:</td><td colspan="3"><?php echo $assess['Means']; ?></td></tr><?php } ?>
						<?php if($assess['home_program'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Home programme		:</td><td colspan="3"><?php echo $assess['home_program']; ?></td></tr><?php } ?>
						<?php if($assess['follow'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Follow up		:</td><td colspan="3"><?php echo $assess['follow']; ?></td></tr><?php } ?>
					</table>
					<table style="width:95%;">
						<?php if($assess['criteria'] != false){?><tr><td>&nbsp;&nbsp; Criteria for return to Sports :</td><td colspan="3"><center><?php echo $assess['criteria']; ?></center></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;(ROM and Muscle strength Chart to be added)</td><td></td><td></td></tr><?php } ?>
					</table>
					<table style="width:95%;">
							<tr><td><p style="float:left;" >&nbsp;&nbsp;	</td><td colspan="2">&nbsp;&nbsp;</td><td><p style="float:right;">&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url().$staff_info['img_name']; ?>" style="width:220px; float:right;"></img></p></td></tr>
					        <tr><td><p style="float:left;" >&nbsp;&nbsp;Signature with Date :&nbsp;&nbsp; <?php echo date('d/m/Y'); ?></td><td colspan="2">&nbsp;&nbsp;</td><td><p style="float:right;">UNIT/WARD Staff: <strong><?php echo $staff_info['first_name'];  ?></strong></p></td></tr>
					</table>
					</br></br>
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