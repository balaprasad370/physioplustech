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
							
							<tr><td colspan="4"><center>Post Natal Assessment </center></td></tr>
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
						<tr><td>&nbsp;&nbsp;&nbsp;	Age			:</td><td colspan="3"><?php echo $patient['age']; ?></td></tr>
                        <tr><td>&nbsp;&nbsp;&nbsp;	Occupation				:</td><td colspan="3"><?php echo $patient['occupation']; ?></td></tr>
						<!--<tr><td>&nbsp;&nbsp;&nbsp;	UHID NO			:</td><td colspan="3"><?php echo $assess['uhid_no']; ?></td></tr>-->
						<tr><td>&nbsp;&nbsp;&nbsp;	Marital Status					:</td><td colspan="3"><?php echo $patient['marital_status']; ?></td></tr>
						<tr><td>&nbsp;&nbsp;&nbsp;	Height				: </td><td colspan="3"><?php echo $patient['height']; ?></td></tr>
						<tr><td>&nbsp;&nbsp;&nbsp;	Weight			: </td><td colspan="3"><?php echo $patient['weight']; ?></td></tr>
                        <tr><td>&nbsp;&nbsp;&nbsp;	BMI				: </td><td colspan="3"><?php echo $patient['bmi']; ?></td></tr>						
							</td></tr>
					   <tr><td>&nbsp;&nbsp;&nbsp;	Address			: </td><td colspan="3"><?php echo $patient['address_line1']; ?></tr>
					</table>
					<?php if($assess['vomitting'] != false || $assess['musculoske'] != false || $assess['headache'] != false || $assess['swelling'] != false || $assess['malaise'] != false){?>
					<p style="color:#63C0EE;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;II. Chief Complaints Of The Patient</p> 
					<?php } ?>
					<?php if($assess['vomitting'] != false) { ?>
					<table style="width:95%;"><tr><td>&nbsp;&nbsp;&nbsp;	Nausea, Vomitting :</td><td colspan="3"><?php echo $assess['vomitting']; ?></td></tr>
					<?php } ?>
					<?php if($assess['musculoske'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Musculoskeletal Problems			:</td><td colspan="3"><?php echo $assess['musculoske']; ?></td></tr>
						<?php } ?>
						<?php if($assess['headache'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Headache, Epigastric Pain		:</td><td colspan="3"><?php echo $assess['headache']; ?></td></tr>
						<?php } ?>
						<?php if($assess['swelling'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Swelling			:</td><td colspan="3"><?php echo $assess['swelling']; ?></td></tr>
						<?php } ?>
						<?php if($assess['malaise'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Malaise			:</td><td colspan="3"><?php echo $assess['malaise']; ?></td></tr>
						<?php } ?>
						</table>
					<?php if($assess['present_history'] != false){?>
					<p style="color:#63C0EE;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;III. Present History</p> 
					<table style="width:95%;"><tr><td>&nbsp;&nbsp;&nbsp;	History Of Present Condition :</td><td colspan="3"><?php echo $assess['present_history']; ?></td></tr>
					<?php } ?>
					<?php if($assess['past_history'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Relevant Past History			:</td><td colspan="3"><?php echo $assess['past_history']; ?></td></tr>
						<?php } ?>
						<?php if($assess['birth'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Type Of Birth		:</td><td colspan="3"><?php echo $assess['birth']; ?></td></tr>
						<?php } ?>
						<?php if(date('d-m-Y',strtotime($assess['date']))!='01-01-1970'){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Date			:</td><td colspan="3"><?php echo $assess['date']; ?></td></tr>
						<?php } ?>
						<?php if($assess['gravida'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Gravida		:</td><td colspan="3"><?php echo $assess['gravida']; ?></td></tr>
						<?php } ?>
						<?php if($assess['para'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Para				:</td><td colspan="3"><?php echo $assess['para']; ?></td></tr>
						<?php } ?>
						<?php if($assess['complications'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Complications Of Pregnancy/birth: </td><td colspan="3"><?php echo $assess['complications']; ?></td></tr>
						<?php } ?>
						<?php if($assess['blood_group'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Blood Group			: </td><td colspan="3"><?php echo $assess['blood_group']; ?></td></tr>
                        <?php } ?>
						<?php if($assess['feeding'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Feeding: Breast / Artificial				: </td><td colspan="3"><?php echo $assess['feeding']; ?></td></tr>
                        <?php } ?>
					</table>
					<?php if($assess['gastro'] != false){?> 
					<p style="color:#63C0EE;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IV. After Pains</p> 
					<table style="width:95%;">
					<tr><td>&nbsp;&nbsp;&nbsp;	History Of Gastrointestinal System  :</td><td colspan="3"><?php echo $assess['gastro']; ?></td></tr>
					<?php } ?>
					<?php if($assess['appetite'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Loss Of Appetite			:</td><td colspan="3"><?php echo $assess['appetite']; ?></td></tr>
						<?php } ?>
						<?php if($assess['constipation'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Constipation		:</td><td colspan="3"><?php echo $assess['constipation']; ?></td></tr>
						<?php } ?>
						<?php if($assess['genitourinary'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	History Of Genitourinary System			:</td><td colspan="3"><?php echo $assess['genitourinary']; ?></td></tr>
						<?php } ?>
						<?php if($assess['incontinence'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Incontinence		:</td><td colspan="3"><?php echo $assess['incontinence']; ?></td></tr>
						<?php } ?>
						<?php if($assess['prolapse'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Prolapse				:</td><td colspan="3"><?php echo $assess['prolapse']; ?></td></tr>
						<?php } ?>
						<?php if($assess['polyuria'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Polyuria : </td><td colspan="3"><?php echo $assess['polyuria']; ?></td></tr>
						<?php } ?>
						<?php if($assess['micturition'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Burning Micturition			: </td><td colspan="3"><?php echo $assess['micturition']; ?></td></tr>
                        <?php } ?>
						<?php if($assess['constipation1'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Constipation				: </td><td colspan="3"><?php echo $assess['constipation1']; ?></td></tr>
                        <?php } ?>
					</table>
					
					<?php if($assess['tb'] != false){?>
					<p style="color:#63C0EE;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;V. Past History</p>
					<?php } ?>
					<table style="width:100%;">
					<?php if($assess['tb'] != false){?>
					<tr><td>&nbsp;&nbsp;&nbsp;	Any History Of T.B  :</td><td colspan="3"><?php echo $assess['tb']; ?></td></tr>
					<?php } ?>
					<?php if($assess['seizures'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Seizures			:</td><td colspan="3"><?php echo $assess['seizures']; ?></td></tr>
					<?php } ?>
					<?php if($assess['BP'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Blood Pressure		:</td><td colspan="3"><?php echo $assess['BP']; ?></td></tr>
					<?php } ?>
					<?php if($assess['anaemia'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Anaemia			:</td><td colspan="3"><?php echo $assess['anaemia']; ?></td></tr>
					<?php } ?>
					<?php if($assess['p_musculoskeletal'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Previous History Of Musculoskeletal Problems		:</td><td colspan="3"><?php echo $assess['p_musculoskeletal']; ?></td></tr>
					<?php } ?>
					<?php if($assess['rh_incompatibility'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Rh Incompatibility				:</td><td colspan="3"><?php echo $assess['rh_incompatibility']; ?></td></tr>
						<?php } ?>
					</table>
					<?php if($assess['chart'] != false){ ?>
					<table style="width:100%;">
					<tr><td>&nbsp;&nbsp;&nbsp;	Body Chart  :</td><td colspan="3"><img src="<?php echo $assess['chart']; ?>"/></td></tr>
						
					</table><?php } ?>
					<?php if($assess['NO_DELIVERIES1'] != ''){ ?>
					<p style="color:#63C0EE;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Obstetric History</p> 
					<?php } ?>
					<table border="1" style="width:100%;border-collapse: collapse;">
						<?php if($assess['NO_DELIVERIES1'] != ''){ ?>
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
						<?php if($assess['NO_DELIVERIES5'] != ''){ ?>
						<tr>
							<td><?php echo $assess['NO_DELIVERIES5']; ?></td>
							<td><?php echo $assess['MODE_DELIVERY5']; ?></td>
							<td><?php echo $assess['COMPLICATIONS5']; ?></td>
							<td><?php echo $assess['1ST_LABOUR5']; ?></td>
							<td><?php echo $assess['2ND_LABOUR5']; ?></td>
							<td><?php echo $assess['SEX5']; ?></td>
							<td><?php echo $assess['BABY_WEIGHT5']; ?></td>
						</tr>
						<?php } ?>
						<?php if($assess['NO_DELIVERIES6'] != ''){ ?>
						<tr>
							<td><?php echo $assess['NO_DELIVERIES6']; ?></td>
							<td><?php echo $assess['MODE_DELIVERY6']; ?></td>
							<td><?php echo $assess['COMPLICATIONS6']; ?></td>
							<td><?php echo $assess['1ST_LABOUR6']; ?></td>
							<td><?php echo $assess['2ND_LABOUR6']; ?></td>
							<td><?php echo $assess['SEX6']; ?></td>
							<td><?php echo $assess['BABY_WEIGHT6']; ?></td>
						</tr>
						<?php } ?>
					</table>

					<?php if($assess['cardiac'] != false || $assess['hypothyroidism'] != false || $assess['immune'] != false || $assess['bronchial'] != false || $assess['surgical'] != false || $assess['family'] != false || $assess['twins'] != false || $assess['congenital'] != false || $assess['diabetes'] != false || $assess['personal'] != false || $assess['smoking'] != false || $assess['sleeping'] != false || $assess['economic'] != false || $assess['occupation1'] != false || $assess['members'] != false || $assess['outcome'] != false || $assess['lifestyle'] != false || $assess['postpartum'] != false || $assess['psychological'] != false || $assess['emotional'] != false || $assess['anxiety'] != false){?>
					<p style="color:#63C0EE;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VI. Medical History</p> 
					<?php } ?>
					<table style="width:95%;">
					<?php if($assess['cardiac'] != false){?>
					<tr><td>&nbsp;&nbsp;&nbsp;	Cardiac Problems  :</td><td colspan="3"><?php echo $assess['cardiac']; ?></td></tr>
					<?php } ?>
					<?php if($assess['hypothyroidism'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Hyper Or Hypothyroidism			:</td><td colspan="3"><?php echo $assess['hypothyroidism']; ?></td></tr>
					<?php } ?>
					<?php if($assess['immune'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Auto Immune Disorders		:</td><td colspan="3"><?php echo $assess['immune']; ?></td></tr>
					<?php } ?>
					<?php if($assess['bronchial'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Bronchial Asthma			:</td><td colspan="3"><?php echo $assess['bronchial']; ?></td></tr>
					<?php } ?>
					<?php if($assess['surgical'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Surgical History		:</td><td colspan="3"><?php echo $assess['surgical']; ?></td></tr>
					<?php } ?>
					<?php if($assess['family'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Family History				:</td><td colspan="3"><?php echo $assess['family']; ?></td></tr>
					<?php } ?>
					<?php if($assess['twins'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Twins				:</td><td colspan="3"><?php echo $assess['twins']; ?></td></tr>
					<?php } ?>
					<?php if($assess['congenital'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Congenital Defects				:</td><td colspan="3"><?php echo $assess['congenital']; ?></td></tr>
					<?php } ?>
					<?php if($assess['diabetes'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Diabetes Mellitus				:</td><td colspan="3"><?php echo $assess['diabetes']; ?></td></tr>
					<?php } ?>
					<?php if($assess['personal'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Personal History				:</td><td colspan="3"><?php echo $assess['personal']; ?></td></tr>
					<?php } ?>
					<?php if($assess['smoking'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Smoking, Alcoholism				:</td><td colspan="3"><?php echo $assess['smoking']; ?></td></tr>
					<?php } ?>
					<?php if($assess['sleeping'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Sleeping Habits				:</td><td colspan="3"><?php echo $assess['sleeping']; ?></td></tr>
					<?php } ?>
					<?php if($assess['economic'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Social Economic History				:</td><td colspan="3"><?php echo $assess['economic']; ?></td></tr>
					<?php } ?>
					<?php if($assess['occupation1'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Occupation				:</td><td colspan="3"><?php echo $assess['occupation1']; ?></td></tr>
					<?php } ?>
					<?php if($assess['members'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Family Members 				:</td><td colspan="3"><?php echo $assess['members']; ?></td></tr>
					<?php } ?>
					<?php if($assess['outcome'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Economic Outcome				:</td><td colspan="3"><?php echo $assess['outcome']; ?></td></tr>
					<?php } ?>
					<?php if($assess['lifestyle'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Lifestyle				:</td><td colspan="3"><?php echo $assess['lifestyle']; ?></td></tr>
					<?php } ?>
					<?php if($assess['postpartum'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Cultural Ideas On New Born & Postpartum				:</td><td colspan="3"><?php echo $assess['postpartum']; ?></td></tr>
					<?php } ?>
					<?php if($assess['psychological'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Psychological History				:</td><td colspan="3"><?php echo $assess['psychological']; ?></td></tr>
					<?php } ?>
					<?php if($assess['emotional'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Emotional Disturbances				:</td><td colspan="3"><?php echo $assess['emotional']; ?></td></tr>
					<?php } ?>
					<?php if($assess['anxiety'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Anxiety/depression				:</td><td colspan="3"><?php echo $assess['anxiety']; ?></td></tr>
					<?php } ?>
					</table>
					
					<?php if($assess['onset'] != false || $assess['duration'] != false || $assess['type_pain'] != false || $assess['location'] != false || $assess['aggravating'] != false || $assess['relieving'] != false || $assess['night'] != false || $assess['irritability'] != false || $assess['VAS'] != false || $assess['observation'] != false || $assess['general'] != false || $assess['edema'] != false || $assess['trophic'] != false || $assess['posture'] != false || $assess['anterior'] != false || $assess['posterior'] != false || $assess['lateral'] != false || $assess['gait'] != false || $assess['perineum'] != false || $assess['discolouration'] != false || $assess['oedema'] != false || $assess['hemorroids'] != false || $assess['episiotomy'] != false || $assess['urine'] != false || $assess['pain'] != false || $assess['lochia'] != false || $assess['vulvar'] != false){?>
					<p style="color:#63C0EE;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VII. Pain History</p> 
					<?php } ?>
					<table style="width:100%;">
					<?php if($assess['onset'] != false){?>
					<tr><td>&nbsp;&nbsp;&nbsp;	Onset  :</td><td colspan="3"><?php echo $assess['onset']; ?></td></tr>
					<?php } ?>
					<?php if($assess['duration'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Duration		:</td><td colspan="3"><?php echo $assess['duration']; ?></td></tr>
					<?php } ?>
					<?php if($assess['type_pain'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Type Of Pain		:</td><td colspan="3"><?php echo $assess['type_pain']; ?></td></tr>
					<?php } ?>
					<?php if($assess['location'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Location			:</td><td colspan="3"><?php echo $assess['location']; ?></td></tr>
					<?php } ?>
					<?php if($assess['aggravating'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Aggravating Factors		:</td><td colspan="3"><?php echo $assess['aggravating']; ?></td></tr>
					<?php } ?>
					<?php if($assess['relieving'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Relieving Factors				:</td><td colspan="3"><?php echo $assess['relieving']; ?></td></tr>
					<?php } ?>
					<?php if($assess['night'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Night Pain			:</td><td colspan="3"><?php echo $assess['night']; ?></td></tr>
					<?php } ?>
					<?php if($assess['irritability'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Irritability Level				:</td><td colspan="3"><?php echo $assess['irritability']; ?></td></tr>
					<?php } ?>
					<?php if($assess['VAS'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	VAS Score				:</td><td colspan="3"><?php echo $assess['VAS']; ?></td></tr>
					<?php } ?>
					<?php if($assess['observation'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	On Observation				:</td><td colspan="3"><?php echo $assess['observation']; ?></td></tr>
						<?php } ?>
						<?php if($assess['general'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	General Condition - Ectomorph, Endomorph, Mesomorph				:</td><td colspan="3"><?php echo $assess['general']; ?></td></tr>
						<?php } ?>
						<?php if($assess['edema'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;	Edema				:</td><td colspan="3"><?php echo $assess['edema']; ?></td></tr>
						<?php } ?>
						
						<?php if($assess['trophic'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Trophic Changes				:</td><td colspan="3"><?php echo $assess['trophic']; ?></td></tr><?php } ?>
						<?php if($assess['posture'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Posture				:</td><td colspan="3"><?php echo $assess['posture']; ?></td></tr><?php } ?>
						<?php if($assess['anterior'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Anterior View 				:</td><td colspan="3"><?php echo $assess['anterior']; ?></td></tr><?php } ?>
						<?php if($assess['posterior'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Posterior View				:</td><td colspan="3"><?php echo $assess['posterior']; ?></td></tr><?php } ?>
						<?php if($assess['lateral'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Lateral View				:</td><td colspan="3"><?php echo $assess['lateral']; ?></td></tr><?php } ?>
						<?php if($assess['gait'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Gait				:</td><td colspan="3"><?php echo $assess['gait']; ?></td></tr><?php } ?>
						<?php if($assess['perineum'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Perineum				:</td><td colspan="3"><?php echo $assess['perineum']; ?></td></tr><?php } ?>
						<?php if($assess['discolouration'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Discolouration				:</td><td colspan="3"><?php echo $assess['discolouration']; ?></td></tr><?php } ?>
						<?php if($assess['oedema'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Oedema				:</td><td colspan="3"><?php echo $assess['oedema']; ?></td></tr><?php } ?>
					    <?php if($assess['hemorroids'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Hemorroids				:</td><td colspan="3"><?php echo $assess['hemorroids']; ?></td></tr><?php } ?>
						<?php if($assess['episiotomy'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Episiotomy – Type				:</td><td colspan="3"><?php echo $assess['episiotomy']; ?></td></tr><?php } ?>
						<?php if($assess['urine'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Urine Distension				:</td><td colspan="3"><?php echo $assess['urine']; ?></td></tr><?php } ?>
						<?php if($assess['pain'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Pain				:</td><td colspan="3"><?php echo $assess['pain']; ?></td></tr><?php } ?>
						<?php if($assess['lochia'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Lochia				:</td><td colspan="3"><?php echo $assess['lochia']; ?></td></tr><?php } ?>
						<?php if($assess['vulvar'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Vulvar Haematoma				:</td><td colspan="3"><?php echo $assess['vulvar']; ?></td></tr><?php } ?>
					</table>
					
					<?php if($assess['tenderness'] != false || $assess['temperature'] != false || $assess['swelling1'] != false ){?>
					<p style="color:#63C0EE;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VIII. On Palpation</p> 
					<?php } ?>
					<table style="width:95%;">
					   <?php if($assess['tenderness'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Tenderness  :</td><td colspan="3"><?php echo $assess['tenderness']; ?></td></tr><?php } ?>
						<?php if($assess['temperature'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Temperature Variation In Skin			:</td><td colspan="3"><?php echo $assess['temperature']; ?></td></tr><?php } ?>
						<?php if($assess['swelling1'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Swelling	:</td><td colspan="3"><?php echo $assess['swelling1']; ?></td></tr><?php } ?>
						
					</table>
					<?php if($assess['vital'] != false || $assess['BP1'] != false || $assess['pulse'] != false || $assess['respiratory'] != false || $assess['abdomen'] != false || $assess['chest'] != false || $assess['auscultation'] != false || $assess['chest_expansion'] != false || $assess['breathing'] != false || $assess['range_motion'] != false || $assess['edema1'] != false || $assess['girth'] != false || $assess['volumetric'] != false || $assess['manual'] != false || $assess['DTR'] != false || $assess['diastasis'] != false || $assess['breast_exam'] != false || $assess['size'] != false || $assess['nipple'] != false || $assess['areola'] != false || $assess['infant'] != false || $assess['type'] != false || $assess['frequency'] != false || $assess['engorgement'] != false || $assess['cracked'] != false || $assess['sensations'] != false || $assess['varicose'] != false || $assess['suture'] != false || $assess['special_test'] != false || $assess['functional'] != false){?>
					
					<p style="color:#63C0EE;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IX. On Examination</p> 
					<?php } ?>
					<table style="width:95%;">
					   <?php if($assess['vital'] != false){?> <tr><td>&nbsp;&nbsp;&nbsp;	1.	Vital Signs   :</td><td colspan="3"><?php echo $assess['vital']; ?></td></tr><?php } ?>
						<?php if($assess['BP1'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	BP		:</td><td colspan="3"><?php echo $assess['BP1']; ?></td></tr><?php } ?>
						<?php if($assess['pulse'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	Pulse	:</td><td colspan="3"><?php echo $assess['pulse']; ?></td></tr><?php } ?>
						<?php if($assess['respiratory'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	Respiratory Rate	:</td><td colspan="3"><?php echo $assess['respiratory']; ?></td></tr><?php } ?>
						<?php if($assess['abdomen'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	2.	Abdomen	:</td><td colspan="3"><?php echo $assess['abdomen']; ?></td></tr><?php } ?>
						<?php if($assess['chest'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	3.	Chest Examination	:</td><td colspan="3"><?php echo $assess['chest']; ?></td></tr><?php } ?>
						<?php if($assess['auscultation'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	Auscultation	:</td><td colspan="3"><?php echo $assess['auscultation']; ?></td></tr><?php } ?>
						<?php if($assess['chest_expansion'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	Chest Expansion	:</td><td colspan="3"><?php echo $assess['chest_expansion']; ?></td></tr><?php } ?>
						<?php if($assess['breathing'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	Pattern Of Breathing	:</td><td colspan="3"><?php echo $assess['breathing']; ?></td></tr><?php } ?>
						<?php if($assess['range_motion'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	4.	Range Of Motion	:</td><td colspan="3"><?php echo $assess['range_motion']; ?></td></tr><?php } ?>
						<?php if($assess['edema1'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	5.	Edema Assessment	:</td><td colspan="3"><?php echo $assess['edema1']; ?></td></tr><?php } ?>
						<?php if($assess['girth'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	Girth	:</td><td colspan="3"><?php echo $assess['girth']; ?></td></tr><?php } ?>
						<?php if($assess['volumetric'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	Volumetric	:</td><td colspan="3"><?php echo $assess['volumetric']; ?></td></tr><?php } ?>
						<?php if($assess['manual'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	6.	Manual Muscle Testing	:</td><td colspan="3"><?php echo $assess['manual']; ?></td></tr><?php } ?>
						<?php if($assess['DTR'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	7.	DTR	:</td><td colspan="3"><?php echo $assess['DTR']; ?></td></tr><?php } ?>
						<?php if($assess['diastasis'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	8. Diastasis Recti Assessment	:</td><td colspan="3"><?php echo $assess['diastasis']; ?></td></tr><?php } ?>
						<?php if($assess['breast_exam'] != false){?><tr><td>&nbsp;&nbsp;&nbsp; 9. Breast Examination	:</td><td colspan="3"><?php echo $assess['breast_exam']; ?></td></tr><?php } ?>
						<?php if($assess['size'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	Size	:</td><td colspan="3"><?php echo $assess['size']; ?></td></tr><?php } ?>
						<?php if($assess['nipple'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	Nipple	:</td><td colspan="3"><?php echo $assess['nipple']; ?></td></tr><?php } ?>
						<?php if($assess['areola'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	Areola	:</td><td colspan="3"><?php echo $assess['areola']; ?></td></tr><?php } ?>
						<?php if($assess['infant'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	10. Infant Feeding	:</td><td colspan="3"><?php echo $assess['infant']; ?></td></tr><?php } ?>
						<?php if($assess['type'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	Type	:</td><td colspan="3"><?php echo $assess['type']; ?></td></tr><?php } ?>
						<?php if($assess['frequency'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	Frequency	:</td><td colspan="3"><?php echo $assess['frequency']; ?></td></tr><?php } ?>
						<?php if($assess['engorgement'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	Breast Engorgement	:</td><td colspan="3"><?php echo $assess['engorgement']; ?></td></tr><?php } ?>
						<?php if($assess['cracked'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	Nipple Soreness Or Cracked Nipples	:</td><td colspan="3"><?php echo $assess['cracked']; ?></td></tr><?php } ?>
						<?php if($assess['sensations'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	11. Sensations	:</td><td colspan="3"><?php echo $assess['sensations']; ?></td></tr><?php } ?>
						<?php if($assess['varicose'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	12. Varicose Veins/DVT	:</td><td colspan="3"><?php echo $assess['varicose']; ?></td></tr><?php } ?>
						<?php if($assess['suture'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	13. Suture/Episiotomy :</td><td colspan="3"><?php echo $assess['suture']; ?></td></tr><?php } ?>
						<?php if($assess['special_test'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	14. Special Test	:</td><td colspan="3"><?php echo $assess['special_test']; ?></td></tr><?php } ?>
						<?php if($assess['functional'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	15. Functional Assessment	:</td><td colspan="3"><?php echo $assess['functional']; ?></td></tr><?php } ?>
					
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