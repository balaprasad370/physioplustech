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
							
							<tr><td colspan="4"><center>Antenatal Assessment</center></td></tr>
							</table>    
					</div>
				  </br>
				   <div style="width:95%;">  
				    <table style="width:100%;"><tr><td style="width:80%;" colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td> Date : <?php echo date('d/m/Y',strtotime($assess['assess_date'])); ?></td>
					</tr></table>   
					</div>
					<div style="width:95%;"  >  
					<p style="color:#63C0EE;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I. PATIENT DETAILS</p> 
						<table style="width:95%;"><tr><td>&nbsp;&nbsp;&nbsp;	Name :</td><td colspan="3"><?php echo $patient['first_name'].' '.$patient['last_name']; ?></td></tr>
						<?php if($assess['LMP'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	LMP			:</td><td colspan="3"><?php echo $assess['LMP']; ?></td></tr><?php } ?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Age			:</td><td colspan="3"><?php echo $patient['age']; ?></td></tr>
						<?php if($assess['EDD'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	EDD			:</td><td colspan="3"><?php echo $assess['EDD']; ?></td></tr><?php } ?>
                        <tr><td>&nbsp;&nbsp;&nbsp;	Occupation				:</td><td colspan="3"><?php echo $patient['occupation']; ?></td></tr>
						<tr><td>&nbsp;&nbsp;&nbsp;	MARITAL STATUS			:</td><td colspan="3"><?php echo $patient['marital_status']; ?></td></tr>
						<tr><td>&nbsp;&nbsp;&nbsp;	Height				: </td><td colspan="3"><?php echo $patient['height']; ?></td></tr>
						<tr><td>&nbsp;&nbsp;&nbsp;	Weight			: </td><td colspan="3"><?php echo $patient['weight']; ?></td></tr>
                        <tr><td>&nbsp;&nbsp;&nbsp;	BMI				: </td><td colspan="3"><?php echo $patient['bmi']; ?></td></tr>						
							</td></tr>
					   <tr><td>&nbsp;&nbsp;&nbsp;	Address			: </td><td colspan="3"><?php echo $patient['address_line1']; ?></tr>
					</table>
					<?php if($assess['AMENORRHOEA'] != false || $assess['VOMITTING'] != false || $assess['MUSCULOSKELETAL'] != false || $assess['CRAMPS'] != false || $assess['MICTURATION'] != false || $assess['HEADACHE'] != false || $assess['SWELLING'] != false || $assess['MALAISE'] != false || $assess['PRESENT'] != false || $assess['GPAL'] != false ){?>
					<p style="color:#63C0EE;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CHIEF COMPLAINTS OF THE PATIENT</p> 
					<?php } ?>
					<table style="width:95%;">
					   <?php if($assess['AMENORRHOEA'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	PERIOD OF AMENORRHOEA :</td><td colspan="3"><?php echo $assess['AMENORRHOEA']; ?></td></tr><?php } ?>
						<?php if($assess['VOMITTING'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	NAUSEA, VOMITTING			:</td><td colspan="3"><?php echo $assess['VOMITTING']; ?></td></tr><?php } ?>
						<?php if($assess['MUSCULOSKELETAL'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	MUSCULOSKELETAL PROBLEMS		:</td><td colspan="3"><?php echo $assess['MUSCULOSKELETAL']; ?></td></tr><?php } ?>
						<?php if($assess['CRAMPS'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	CRAMPS			:</td><td colspan="3"><?php echo $assess['CRAMPS']; ?></td></tr><?php } ?>
						<?php if($assess['MICTURATION'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	FREQUENCY OF MICTURATION			:</td><td colspan="3"><?php echo $assess['MICTURATION']; ?></td></tr><?php } ?>
						<?php if($assess['HEADACHE'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	HEADACHE, EPIGASTRIC PAIN			:</td><td colspan="3"><?php echo $assess['HEADACHE']; ?></td></tr><?php } ?>
						<?php if($assess['SWELLING'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	SWELLING			:</td><td colspan="3"><?php echo $assess['SWELLING']; ?></td></tr><?php } ?>
						<?php if($assess['MALAISE'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	MALAISE			:</td><td colspan="3"><?php echo $assess['MALAISE']; ?></td></tr><?php } ?>
						<?php if($assess['PRESENT'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	PRESENT HISTORY			:</td><td colspan="3"><?php echo $assess['PRESENT']; ?></td></tr><?php } ?>
						<?php if($assess['GPAL'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	GPAL			:</td><td colspan="3"><?php echo $assess['GPAL']; ?></td></tr><?php } ?>
						
						</table>
					<?php if($assess['LOSS_APPETITE'] != false || $assess['LOSS_WEIGHT'] != false || $assess['HEART'] != false || $assess['CONSTIPATION'] != false){?>
					<p style="color:#63C0EE;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HISTORY OF MUSCULOSKELETAL SYSTEM</p> 
					<p style="color:#63C0EE;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HISTORY OF GASTROINTESTINAL SYSTEM</p> 
					<?php } ?>
					<table style="width:95%;">
					  <?php if($assess['LOSS_APPETITE'] != false){?> <tr><td>&nbsp;&nbsp;&nbsp;	LOSS OF APPETITE :</td><td colspan="3"><?php echo $assess['LOSS_APPETITE']; ?></td></tr><?php } ?>
						<?php if($assess['LOSS_WEIGHT'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	LOSS OF WEIGHT			:</td><td colspan="3"><?php echo $assess['LOSS_WEIGHT']; ?></td></tr><?php } ?>
						<?php if($assess['HEART'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	HEART BURN 		:</td><td colspan="3"><?php echo $assess['HEART']; ?></td></tr><?php } ?>
						<?php if($assess['CONSTIPATION'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	CONSTIPATION			:</td><td colspan="3"><?php echo $assess['CONSTIPATION']; ?></td></tr><?php } ?>
						
					</table>
					<?php if($assess['INCONTINENCE'] != false || $assess['PROLAPSE'] != false || $assess['POLYURIA'] != false || $assess['MICTURITION'] != false){?>
					<p style="color:#63C0EE;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HISTORY OF GENITOURINARY SYSTEM</p> 
					<?php } ?>
					<table style="width:95%;">
					<?php if($assess['INCONTINENCE'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	INCONTINENCE  :</td><td colspan="3"><?php echo $assess['INCONTINENCE']; ?></td></tr><?php } ?>
						<?php if($assess['PROLAPSE'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	PROLAPSE			:</td><td colspan="3"><?php echo $assess['PROLAPSE']; ?></td></tr><?php } ?>
						<?php if($assess['POLYURIA'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	POLYURIA		:</td><td colspan="3"><?php echo $assess['POLYURIA']; ?></td></tr><?php } ?>
						<?php if($assess['MICTURITION'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	BURNING MICTURITION			:</td><td colspan="3"><?php echo $assess['MICTURITION']; ?></td></tr><?php } ?>
						 
					</table>
					
					<?php if($assess['TB'] != false || $assess['SEIZURES'] != false || $assess['BP'] != false || $assess['ANAEMIA'] != false || $assess['MUSCULOSKELETAL'] != false || $assess['INCOMPATIBILITY'] != false || $assess['chart'] != false){?>
					<p style="color:#63C0EE;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HISTORY OF CARDIOVASCULAR / RESPIRATORY STSYEM / PERIHERAL NERVOUS SYSTEM</p> 
					<p style="color:#63C0EE;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PAST HISTORY/ PAST MEDICAL HISTORY</p> 
					<?php } ?>
					<table style="width:100%;">
					<?php if($assess['TB'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	ANY HISTORY OF T.B :</td><td colspan="3"><?php echo $assess['TB']; ?></td></tr><?php } ?>
					<?php if($assess['SEIZURES'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	SEIZURES			:</td><td colspan="3"><?php echo $assess['SEIZURES']; ?></td></tr><?php } ?>
					<?php if($assess['BP'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	BLOOD PRESSURE		:</td><td colspan="3"><?php echo $assess['BP']; ?></td></tr><?php } ?>
					<?php if($assess['ANAEMIA'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	ANAEMIA			:</td><td colspan="3"><?php echo $assess['ANAEMIA']; ?></td></tr><?php } ?>
					<?php if($assess['MUSCULOSKELETAL'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	PREVIOUS HISTORY OF MUSCULOSKELETAL PROBLEMS		:</td><td colspan="3"><?php echo $assess['MUSCULOSKELETAL']; ?></td></tr><?php } ?>
					<?php if($assess['INCOMPATIBILITY'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Rh INCOMPATIBILITY				:</td><td colspan="3"><?php echo $assess['INCOMPATIBILITY']; ?></td></tr><?php } ?>
					<?php if($assess['chart'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Body Chart  :</td><td colspan="3"><img src="<?php echo $assess['chart']; ?>"/></td><tr><?php } ?>
					</table>
						<?php if($assess['NO_DELIVERIES1'] != ''){ ?>
					<p style="color:#63C0EE;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Obstetric History</p> 
					
					<table border="1" style="width:100%;border-collapse: collapse;">
					
						<tr>
							<th>NO.OF DELIVERIES</th>
							<th>MODE OF DELIVERY</th>
							<th>ANY COMPLICATIONS</th>
							<th>1ST STAGE OF LABOUR</th>
							<th>2ND STAGE OF LABOUR</th>
							<th>BABY SEX</th>
							<th>BABY WEIGHT</th>
						</tr>
						
						<tr>
							<td><?php echo $assess['NO_DELIVERIES1']; ?></td>
							<td><?php echo $assess['MODE_DELIVERY1']; ?></td>
							<td><?php echo $assess['COMPLICATIONS1']; ?></td>
							<td><?php echo $assess['1ST_LABOUR1']; ?></td>
							<td><?php echo $assess['2ND_LABOUR1']; ?></td>
							<td><?php echo $assess['SEX1']; ?></td>
							<td><?php echo $assess['BABY_WEIGHT1']; ?></td>
						</tr>
						<?php } ?>
						<?php if($assess['NO_DELIVERIES2'] != ''){ ?>
						<tr>
							<td><?php echo $assess['NO_DELIVERIES2']; ?></td>
							<td><?php echo $assess['MODE_DELIVERY2']; ?></td>
							<td><?php echo $assess['COMPLICATIONS2']; ?></td>
							<td><?php echo $assess['1ST_LABOUR2']; ?></td>
							<td><?php echo $assess['2ND_LABOUR2']; ?></td>
							<td><?php echo $assess['SEX2']; ?></td>
							<td><?php echo $assess['BABY_WEIGHT2']; ?></td>
						</tr>
						<?php } ?>
						<?php if($assess['NO_DELIVERIES3'] != ''){ ?>
						<tr>
							<td><?php echo $assess['NO_DELIVERIES3']; ?></td>
							<td><?php echo $assess['MODE_DELIVERY3']; ?></td>
							<td><?php echo $assess['COMPLICATIONS3']; ?></td>
							<td><?php echo $assess['1ST_LABOUR3']; ?></td>
							<td><?php echo $assess['2ND_LABOUR3']; ?></td>
							<td><?php echo $assess['SEX3']; ?></td>
							<td><?php echo $assess['BABY_WEIGHT3']; ?></td>
						</tr>
						<?php } ?>
						<?php if($assess['NO_DELIVERIES4'] != ''){ ?>
						<tr>
							<td><?php echo $assess['NO_DELIVERIES4']; ?></td>
							<td><?php echo $assess['MODE_DELIVERY4']; ?></td>
							<td><?php echo $assess['COMPLICATIONS4']; ?></td>
							<td><?php echo $assess['1ST_LABOUR4']; ?></td>
							<td><?php echo $assess['2ND_LABOUR4']; ?></td>
							<td><?php echo $assess['SEX4']; ?></td>
							<td><?php echo $assess['BABY_WEIGHT4']; ?></td>
						</tr>
						<?php } ?>
					</table>

					<?php if($assess['CARDIAC'] != false || $assess['HYPOTHYROIDISM'] != false || $assess['IMMUNE'] != false || $assess['BRONCHIAL'] != false || $assess['DRUG'] != false || $assess['SURGICAL'] != false || $assess['FAMILY'] != false || $assess['TWINS'] != false || $assess['CONGENITAL'] != false || $assess['DIABETES'] != false || $assess['PERSONAL'] != false || $assess['SMOKING'] != false || $assess['SLEEPING'] != false || $assess['ECONOMIC'] != false || $assess['OCCUPATION1'] != false || $assess['MEMBERS'] != false || $assess['OUTCOME'] != false || $assess['LIFESTYLE'] != false || $assess['PSYCHOLOGICAL'] != false || $assess['EMOTIONAL'] != false || $assess['ANXIETY'] != false){?>
					<p style="color:#63C0EE;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MENSTURAL HISTORY</p> 
					<p style="color:#63C0EE;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MEDICAL  HISTORY</p> 
					<?php } ?>
					<table style="width:95%;">
					<?php if($assess['CARDIAC'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	CARDIAC PROBLEMS   :</td><td colspan="3"><?php echo $assess['CARDIAC']; ?></td></tr><?php } ?>
					<?php if($assess['HYPOTHYROIDISM'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	HYPER OR HYPOTHYROIDISM			:</td><td colspan="3"><?php echo $assess['HYPOTHYROIDISM']; ?></td></tr><?php } ?>
					<?php if($assess['IMMUNE'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	AUTO IMMUNE DISORDERS		:</td><td colspan="3"><?php echo $assess['IMMUNE']; ?></td></tr><?php } ?>
					<?php if($assess['BRONCHIAL'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	BRONCHIAL ASTHMA			:</td><td colspan="3"><?php echo $assess['BRONCHIAL']; ?></td></tr><?php } ?>
					<?php if($assess['DRUG'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	DRUG HISTORY		:</td><td colspan="3"><?php echo $assess['DRUG']; ?></td></tr><?php } ?>
					<?php if($assess['SURGICAL'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	SURGICAL HISTORY				:</td><td colspan="3"><?php echo $assess['SURGICAL']; ?></td></tr><?php } ?>
					<?php if($assess['FAMILY'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	FAMILY HISTORY				:</td><td colspan="3"><?php echo $assess['FAMILY']; ?></td></tr><?php } ?>
					<?php if($assess['TWINS'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	TWINS				:</td><td colspan="3"><?php echo $assess['TWINS']; ?></td></tr><?php } ?>
					<?php if($assess['CONGENITAL'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	CONGENITAL DEFECTS				:</td><td colspan="3"><?php echo $assess['CONGENITAL']; ?></td></tr><?php } ?>
					<?php if($assess['DIABETES'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	DIABETES MELLITUS				:</td><td colspan="3"><?php echo $assess['DIABETES']; ?></td></tr><?php } ?>
					<?php if($assess['PERSONAL'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	PERSONAL HISTORY				:</td><td colspan="3"><?php echo $assess['PERSONAL']; ?></td></tr><?php } ?>
					<?php if($assess['SMOKING'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	SMOKING, ALCOHOLISM			:</td><td colspan="3"><?php echo $assess['SMOKING']; ?></td></tr><?php } ?>
					<?php if($assess['SLEEPING'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	SLEEPING HABITS			:</td><td colspan="3"><?php echo $assess['SLEEPING']; ?></td></tr><?php } ?>
					<?php if($assess['ECONOMIC'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	SOCIAL ECONOMIC HISTORY			:</td><td colspan="3"><?php echo $assess['ECONOMIC']; ?></td></tr><?php } ?>
					<?php if($assess['OCCUPATION1'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	OCCUPATION			:</td><td colspan="3"><?php echo $assess['OCCUPATION1']; ?></td></tr><?php } ?>
					<?php if($assess['MEMBERS'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	FAMILY MEMBERS				:</td><td colspan="3"><?php echo $assess['MEMBERS']; ?></td></tr><?php } ?>
					<?php if($assess['OUTCOME'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	ECONOMIC OUTCOME				:</td><td colspan="3"><?php echo $assess['OUTCOME']; ?></td></tr><?php } ?>
					<?php if($assess['LIFESTYLE'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	LIFESTYLE			:</td><td colspan="3"><?php echo $assess['LIFESTYLE']; ?></td></tr><?php } ?>
					<?php if($assess['PSYCHOLOGICAL'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	PSYCHOLOGICAL HISTORY				:</td><td colspan="3"><?php echo $assess['PSYCHOLOGICAL']; ?></td></tr><?php } ?>
					<?php if($assess['EMOTIONAL'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	EMOTIONAL DISTURBANCES				:</td><td colspan="3"><?php echo $assess['EMOTIONAL']; ?></td></tr><?php } ?>
					<?php if($assess['ANXIETY'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	ANXIETY/DEPRESSION				:</td><td colspan="3"><?php echo $assess['ANXIETY']; ?></td></tr><?php } ?>
					
					</table>
					
					<?php if($assess['ONSET'] != false || $assess['DURATION'] != false || $assess['TYPE_PAIN'] != false || $assess['LOCATION'] != false || $assess['AGGRAVATING'] != false || $assess['RELIEVING'] != false || $assess['NIGHT'] != false || $assess['IRRITABILITY'] != false || $assess['VAS'] != false || $assess['OBSERVATION'] != false || $assess['GENERAL'] != false || $assess['EDEMA'] != false || $assess['TROPHIC'] != false || $assess['CHOLASMA'] != false || $assess['LINEA'] != false || $assess['STRAIE'] != false || $assess['NAIL'] != false || $assess['CONJUCTIVA'] != false || $assess['POSTURE'] != false || $assess['ANTERIOR'] != false || $assess['POSTERIOR'] != false || $assess['LATERAL'] != false || $assess['GAIT'] != false){?>
					<p style="color:#63C0EE;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PAIN HISTORY</p> 
					<?php } ?>
					<table style="width:100%;">
					<?php if($assess['ONSET'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	PAIN ONSET  :</td><td colspan="3"><?php echo $assess['ONSET']; ?></td></tr><?php } ?>
					<?php if($assess['DURATION'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	DURATION		:</td><td colspan="3"><?php echo $assess['DURATION']; ?></td></tr><?php } ?>
					<?php if($assess['TYPE_PAIN'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	TYPE OF PAIN		:</td><td colspan="3"><?php echo $assess['TYPE_PAIN']; ?></td></tr><?php } ?>
					<?php if($assess['LOCATION'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	LOCATION			:</td><td colspan="3"><?php echo $assess['LOCATION']; ?></td></tr><?php } ?>
					<?php if($assess['AGGRAVATING'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	AGGRAVATING FACTORS		:</td><td colspan="3"><?php echo $assess['AGGRAVATING']; ?></td></tr><?php } ?>
					<?php if($assess['RELIEVING'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	RELIEVING FACTORS				:</td><td colspan="3"><?php echo $assess['RELIEVING']; ?></td></tr><?php } ?>
					<?php if($assess['NIGHT'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	NIGHT PAIN			:</td><td colspan="3"><?php echo $assess['NIGHT']; ?></td></tr><?php } ?>
					<?php if($assess['IRRITABILITY'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	IRRITABILITY LEVEL				:</td><td colspan="3"><?php echo $assess['IRRITABILITY']; ?></td></tr><?php } ?>
					<?php if($assess['VAS'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	VAS SCORE				:</td><td colspan="3"><?php echo $assess['VAS']; ?></td></tr><?php } ?>
					<?php if($assess['OBSERVATION'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	ON OBSERVATION				:</td><td colspan="3"><?php echo $assess['OBSERVATION']; ?></td></tr><?php } ?>
					<?php if($assess['GENERAL'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	GENERAL CONDITION- ECTOMORPH, ENDOMORPH,MESOMORPH	:</td><td colspan="3"><?php echo $assess['GENERAL']; ?></td></tr><?php } ?>
					<?php if($assess['EDEMA'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	EDEMA				:</td><td colspan="3"><?php echo $assess['EDEMA']; ?></td></tr><?php } ?>
					<?php if($assess['TROPHIC'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	TROPHIC CHANGES				:</td><td colspan="3"><?php echo $assess['TROPHIC']; ?></td></tr><?php } ?>
					<?php if($assess['CHOLASMA'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	CHOLASMA				:</td><td colspan="3"><?php echo $assess['CHOLASMA']; ?></td></tr><?php } ?>
					<?php if($assess['LINEA'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	LINEA NIGRA				:</td><td colspan="3"><?php echo $assess['LINEA']; ?></td></tr><?php } ?>
					<?php if($assess['STRAIE'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	STRAIE GRAVIDUM				:</td><td colspan="3"><?php echo $assess['STRAIE']; ?></td></tr><?php } ?>
					<?php if($assess['NAIL'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	NAIL BED				:</td><td colspan="3"><?php echo $assess['NAIL']; ?></td></tr><?php } ?>
					<?php if($assess['CONJUCTIVA'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	CONJUCTIVA AND TONGUE				:</td><td colspan="3"><?php echo $assess['CONJUCTIVA']; ?></td></tr><?php } ?>
					<?php if($assess['POSTURE'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	POSTURE				:</td><td colspan="3"><?php echo $assess['POSTURE']; ?></td></tr><?php } ?>
					<?php if($assess['ANTERIOR'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	ANTERIOR VIEW				:</td><td colspan="3"><?php echo $assess['ANTERIOR']; ?></td></tr><?php } ?>
					<?php if($assess['POSTERIOR'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	POSTERIOR VIEW			:</td><td colspan="3"><?php echo $assess['POSTERIOR']; ?></td></tr><?php } ?>
					<?php if($assess['LATERAL'] != false){?>   <tr><td>&nbsp;&nbsp;&nbsp;	LATERAL VIEW				:</td><td colspan="3"><?php echo $assess['LATERAL']; ?></td></tr><?php } ?>
					<?php if($assess['GAIT'] != false){?>	<tr><td>&nbsp;&nbsp;&nbsp;	GAIT				:</td><td colspan="3"><?php echo $assess['GAIT']; ?></td></tr><?php } ?>
						
					</table>
					<?php if($assess['TENDERNESS'] != false || $assess['TEMPERATURE'] != false || $assess['SWELLING1'] != false){?>
					<p style="color:#63C0EE;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ON PALPATION</p> 
					<?php } ?>
					<table style="width:95%;">
					<?php if($assess['TENDERNESS'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	TENDERNESS  :</td><td colspan="3"><?php echo $assess['TENDERNESS']; ?></td></tr><?php } ?>
					<?php if($assess['TEMPERATURE'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;TEMPERATURE VARIATION IN SKIN :</td><td colspan="3"><?php echo $assess['TEMPERATURE']; ?></td></tr><?php } ?>
					<?php if($assess['SWELLING1'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	SWELLING	:</td><td colspan="3"><?php echo $assess['SWELLING1']; ?></td></tr><?php } ?>
						
					</table>
					
					<?php if($assess['VITAL'] != false || $assess['BP1'] != false || $assess['PULSE'] != false || $assess['RESPIRATORY'] != false || $assess['ABDOMINAL'] != false || $assess['MOTION'] != false || $assess['EDEMA1'] != false || $assess['GIRTH'] != false || $assess['VOLUMETRIC'] != false || $assess['MANUAL'] != false || $assess['DTR'] != false || $assess['DIASTASIS'] != false || $assess['BREAST'] != false || $assess['SIZE'] != false || $assess['NIPPLE'] != false || $assess['AREOLA'] != false || $assess['VARICOSE'] != false || $assess['INCONTINENCE1'] != false || $assess['EXERCISE'] != false || $assess['WALK'] != false || $assess['STEP'] != false || $assess['SPECIAL'] != false || $assess['FUNCTIONAL'] != false || $assess['INVESTIGATIONS'] != false || $assess['LIE'] != false){?>
					<p style="color:#63C0EE;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ON EXAMINATION</p> 
					<?php } ?>
					<table style="width:95%;">
					    <?php if($assess['VITAL'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	1.	VITAL SIGNS  :</td><td colspan="3"><?php echo $assess['VITAL']; ?></td></tr><?php } ?>
						<?php if($assess['BP1'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	BP		:</td><td colspan="3"><?php echo $assess['BP1']; ?></td></tr><?php } ?>
						<?php if($assess['PULSE'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	PULSE	:</td><td colspan="3"><?php echo $assess['PULSE']; ?></td></tr><?php } ?>
						<?php if($assess['RESPIRATORY'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	RESPIRATORY RATE	:</td><td colspan="3"><?php echo $assess['RESPIRATORY']; ?></td></tr><?php } ?>
						<?php if($assess['ABDOMINAL'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	2.	ABDOMINAL GIRTH	:</td><td colspan="3"><?php echo $assess['ABDOMINAL']; ?></td></tr><?php } ?>
						<?php if($assess['MOTION'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	3.	RANGE OF MOTION 	:</td><td colspan="3"><?php echo $assess['MOTION']; ?></td></tr><?php } ?>
						<?php if($assess['EDEMA1'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	4.	EDEMA ASSESSMENT	:</td><td colspan="3"><?php echo $assess['EDEMA1']; ?></td></tr><?php } ?>
						<?php if($assess['GIRTH'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	GIRTH	:</td><td colspan="3"><?php echo $assess['GIRTH']; ?></td></tr><?php } ?>
						<?php if($assess['VOLUMETRIC'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	VOLUMETRIC	:</td><td colspan="3"><?php echo $assess['VOLUMETRIC']; ?></td></tr><?php } ?>
						<?php if($assess['MANUAL'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	5.	MANUAL MUSCLE TESTING	:</td><td colspan="3"><?php echo $assess['MANUAL']; ?></td></tr><?php } ?>
						<?php if($assess['DTR'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	6.	DTR	:</td><td colspan="3"><?php echo $assess['DTR']; ?></td></tr><?php } ?>
						<?php if($assess['DIASTASIS'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	7.	DIASTASIS RECTI ASSESSMENT 	:</td><td colspan="3"><?php echo $assess['DIASTASIS']; ?></td></tr><?php } ?>
						<?php if($assess['BREAST'] != false){?><tr><td>&nbsp;&nbsp;&nbsp; 8.	BREAST EXAMINATION	:</td><td colspan="3"><?php echo $assess['BREAST']; ?></td></tr><?php } ?>
						<?php if($assess['SIZE'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	SIZE	:</td><td colspan="3"><?php echo $assess['SIZE']; ?></td></tr><?php } ?>
						<?php if($assess['NIPPLE'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	NIPPLE	:</td><td colspan="3"><?php echo $assess['NIPPLE']; ?></td></tr><?php } ?>
						<?php if($assess['AREOLA'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	AREOLA	:</td><td colspan="3"><?php echo $assess['AREOLA']; ?></td></tr><?php } ?>
						<?php if($assess['VARICOSE'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	9.	VARICOSE VEIN/DVT  :</td><td colspan="3"><?php echo $assess['VARICOSE']; ?></td></tr><?php } ?>
						<?php if($assess['INCONTINENCE1'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	10.	INCONTINENCE ASSESSMENT	:</td><td colspan="3"><?php echo $assess['INCONTINENCE1']; ?></td></tr><?php } ?>
						<?php if($assess['EXERCISE'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	11.	EXERCISE TOLERENCE TESTING	:</td><td colspan="3"><?php echo $assess['EXERCISE']; ?></td></tr><?php } ?>
						<?php if($assess['WALK'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	6 MINUTE WALK TEST	:</td><td colspan="3"><?php echo $assess['WALK']; ?></td></tr><?php } ?>
						<?php if($assess['STEP'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	3 STEP TEST	:</td><td colspan="3"><?php echo $assess['STEP']; ?></td></tr><?php } ?>
						<?php if($assess['SPECIAL'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	12.	SPECIAL TEST :</td><td colspan="3"><?php echo $assess['SPECIAL']; ?></td></tr><?php } ?>
						<?php if($assess['FUNCTIONAL'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	13.	FUNCTIONAL ASSESSMENT	:</td><td colspan="3"><?php echo $assess['FUNCTIONAL']; ?></td></tr><?php } ?>
						<?php if($assess['INVESTIGATIONS'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	14.	INVESTIGATIONS /RECORDS : FUNDAL HEIGHT	:</td><td colspan="3"><?php echo $assess['INVESTIGATIONS']; ?></td></tr><?php } ?>
						<?php if($assess['LIE'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	LIE/PRESENTATION:</td><td colspan="3"><?php echo $assess['LIE']; ?></td></tr><?php } ?>
					
					</table>
					<table style="width:95%;">
							<tr><td><p style="float:left;" >&nbsp;&nbsp;	</td><td colspan="2">&nbsp;&nbsp;</td><td><p style="float:right;">&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url().$clientDetails['img_name']; ?>" style="width:220px; float:right;"></img></p></td></tr>
					        <tr><td><p style="float:left;" >&nbsp;&nbsp;Signature with Date :&nbsp;&nbsp; <?php echo date('d/m/Y'); ?></td><td colspan="2">&nbsp;&nbsp;</td><td><p style="float:right;">UNIT/WARD Staff: <strong><?php echo $clientDetails['first_name'];  ?></strong></p></td></tr>
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