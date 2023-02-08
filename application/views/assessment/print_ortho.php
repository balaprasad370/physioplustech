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
							
							<tr><td colspan="4"><center>Orthopedic Assessment </center></td></tr>
							</table>    
					</div>
				  </br>
				  
				   <div style="width:95%;">  
				    <table style="width:100%;"><tr><td style="width:80%;" colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td> Date : <?php echo date('d/m/Y',strtotime($assess['assess_date'])); ?></td>
					</tr></table>   
					</div>
					<div style="width:95%;"  >  
					<table style="width:95%;"><tr><td>&nbsp;&nbsp;&nbsp;	Name :</td><td colspan="3"><?php echo $patient['first_name'].' '.$patient['last_name']; ?></td></tr>
						<tr><td>&nbsp;&nbsp;&nbsp;	Age			:</td><td><?php echo $patient['age']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
						<tr><td>&nbsp;&nbsp;&nbsp;  Sex : </td><td><?php echo $patient['gender']; ?></td></tr>
						<tr><td>&nbsp;&nbsp;&nbsp;	Occupation:				:</td><td colspan="3"><?php echo $patient['occupation']; ?></td></tr>
						<!--<tr><td>&nbsp;&nbsp;&nbsp;	UHID no				:</td><td colspan="3"><?php echo $assess['uhid']; ?></td></tr>-->
						<tr><td>&nbsp;&nbsp;&nbsp;  Date of Assessment			:</td><td colspan="3"><?php echo date('d-m-Y',strtotime($assess['assess_date'])); ?></td></tr>
						<tr><td>&nbsp;&nbsp;&nbsp;  Address					:</td><td colspan="3"><?php echo $patient['address_line1']; ?></td></tr>
						<tr><td>&nbsp;&nbsp;&nbsp;  Phone no:				: </td><td colspan="3"><?php echo $patient['mobile_no']; ?>
							</td></tr>
					</table>
					<table style="width:95%;">
					<?php if($assess['complaints'] != false){?>
					<tr><td>&nbsp;&nbsp;&nbsp;Chief Complaints :</td><td colspan="3"><?php echo $assess['complaints']; ?></td></tr>
					<?php } ?>
					<?php if($assess['Dominance'] != false){?>
					<tr><td>&nbsp;&nbsp;&nbsp;Hand Dominance   :			</td><td colspan="3"><?php echo $assess['Dominance']; ?></td></tr>
					<?php } ?>
					<?php if($assess['Present'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Present History  : 			</td><td colspan="3"><?php echo $assess['Present']; ?></td></tr>
						<?php } ?>
						<?php if($assess['Past'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Past History   :				</td><td colspan="3"><?php echo $assess['Past']; ?></td></tr>
						<?php } ?>
						<?php if($assess['Medical'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Medical History  :   </td><td colspan="3"><?php echo $assess['Medical']; ?></td></tr>
						<?php } ?>
						<?php if($assess['Surgical'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Surgical History	:</td><td colspan="3"><?php echo $assess['Surgical']; ?></td></tr>
						<?php } ?>
						<?php if($assess['Personal'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Personal / Social History:	:</td><td colspan="3"><?php echo $assess['Personal']; ?></td></tr>
					<?php } ?>
					</table>
					<?php if($assess['site'] != false){?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;<b>Pain Assessment</b>: 	</p>
					<table style="width:95%;">
					
					<tr><td>&nbsp;&nbsp;&nbsp;Site and Side :</td><td colspan="3"><?php echo $assess['site']; ?></td></tr>
					<?php } ?>
					<?php if($assess['Onset'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Onset		:</td><td colspan="3"><?php echo $assess['Onset']; ?></td></tr>
						<?php } ?>
						<?php if($assess['Duration'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Duration	:</td><td colspan="3"><?php echo ($assess['Duration']); ?>
						</td></tr>
						<?php } ?>
						<?php if($assess['Nature'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Nature	:</td><td><?php echo ($assess['Nature']); ?></td></tr>
						<?php } ?>
						<?php if($assess['Type'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Type	:</td><td><?php echo ($assess['Type']); ?></td></tr>
						<?php } ?>
						<?php if($assess['Behavior'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Behavior	:</td><td><?php echo ($assess['Behavior']); ?></td></tr>
						<?php } ?>
						<?php if($assess['severity'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;<b>Severity VAS	</b>	:</td><td><?php echo ($assess['severity']); ?></td></tr>
						<?php } ?>
					</table>
					
					<table style="width:95%;">
					<?php if($assess['Irritability'] != false){?>
					    <tr><td>&nbsp;&nbsp;&nbsp;Irritability :</td><td colspan="3"><?php echo $assess['Irritability']; ?></td></tr>
						<?php } ?>
						<?php if($assess['Pattern'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;24 hours Pattern		:</td><td colspan="3"><?php echo $assess['Pattern']; ?></td></tr>
						<?php } ?>
						<?php if($assess['Aggravating'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Aggravating Factors	:</td><td colspan="3"><?php echo ($assess['Aggravating']); ?></td></tr>
						<?php } ?>
						<?php if($assess['Relieving'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Relieving Factors	:</td><td><?php echo ($assess['Relieving']); ?></td></tr>
					<?php } ?>
					</table>
					<div class="past_image">
						<img src="<?php echo $assess['chart']; ?>" style="width:100%; height:400px;">
						
					</div>
					<?php if($assess['Built'] != false){?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;<b>On Observation</b>		</p>
					<table style="width:95%;">  
					
					    <tr><td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. General Observation :</td></tr>
					    <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Built :</td><td colspan="3"><?php echo $assess['Built']; ?></td></tr>
						<?php } ?>
						<?php if($assess['Posture'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Posture		:</td><td colspan="3"><?php echo $assess['Posture']; ?></td></tr>
						<?php } ?>
						<?php if($assess['Gait'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gait	:</td><td colspan="3"><?php echo ($assess['Gait']); ?></td></tr>
						<?php } ?>
						<?php if($assess['fixation'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;External fixation	:</td><td><?php echo ($assess['fixation']); ?></td></tr>
						<?php } ?>
						<?php if($assess['m_aids'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobility Aids	:</td><td><?php echo ($assess['m_aids']); ?></td></tr>
					    <?php } ?>
					</table>
					<table style="width:95%;">
					<?php if($assess['l_swelling'] != false){?>
						<tr><td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.	Local Observation	:</td><td></td></tr>
						<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Local swelling	:</td><td><?php echo ($assess['l_swelling']); ?></td></tr>
					<?php } ?>
					<?php if($assess['b_contour'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Body contour	:</td><td><?php echo ($assess['b_contour']); ?></td></tr>
						<?php } ?>
						<?php if($assess['s_contour'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Soft tissue contour	:</td><td><?php echo ($assess['s_contour']); ?></td></tr>
						<?php } ?>
						<?php if($assess['wasting'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Muscle wasting	:</td><td><?php echo ($assess['wasting']); ?></td></tr>
						<?php } ?>
						<?php if($assess['skin'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Skin changes	:</td><td><?php echo ($assess['skin']); ?></td></tr>
						<?php } ?>
						<?php if($assess['loss'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hair loss	:</td><td><?php echo ($assess['loss']); ?></td></tr>
						<?php } ?>
						<?php if($assess['Clubbing'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Clubbing	:</td><td><?php echo ($assess['Clubbing']); ?></td></tr>
						<?php } ?>
						<?php if($assess['Cyanosis'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cyanosis	:</td><td><?php echo ($assess['Cyanosis']); ?></td></tr>
						<?php } ?>
						<?php if($assess['scar'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Open wound/scar	:</td><td><?php echo ($assess['scar']); ?></td></tr>
						<?php } ?>
					</table>
					<?php if($assess['Tenderness'] != false){?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;<b>On Palpation	</b>	</p>
					
					<table style="width:95%;">
						<tr><td>&nbsp;&nbsp;&nbsp;Tenderness	:</td><td><?php echo ($assess['Tenderness']); ?></td></tr>
					<?php } ?>
					<?php if($assess['Warmth'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Warmth	:</td><td><?php echo ($assess['Warmth']); ?></td></tr>
					<?php } ?>
					<?php if($assess['Spasm'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Spasm	:</td><td><?php echo ($assess['Spasm']); ?></td></tr>
					<?php } ?>
					<?php if($assess['Scar_type'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Scar	:</td><td><?php echo ($assess['Scar_type']); ?></td></tr>
					<?php } ?>
					<?php if($assess['Crepitus'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Crepitus	:</td><td><?php echo ($assess['Crepitus']); ?></td></tr>
					<?php } ?>
					<?php if($assess['Spur'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Bony Spur	:</td><td><?php echo ($assess['Spur']); ?></td></tr>
					<?php } ?>
					<?php if($assess['Oedema'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Oedema	:</td><td><?php echo ($assess['Oedema']); ?></td></tr>
					<?php } ?>
					</table>
					<?php if($assess['motion_right'] != false || $assess['motion_left'] != false || $assess['strength_right'] != false || $assess['strength_left'] != false || $assess['limb_right'] != false || $assess['limb_left'] != false || $assess['Apparent'] != false || $assess['true'] != false || $assess['muscle_left'] != false || $assess['muscle_right'] != false){?>
					<div class="form-group col-md-12 col-sm-12">
					 <p style="color:black;">&nbsp;&nbsp;&nbsp;<b>On Examination</b></p></br>
					</div>
					<div style="overflow-x:auto;">
					<center><table style="border: 1px solid #ddd; width:95%;"  >
											<tr><td colspan="2">&nbsp;&nbsp;&nbsp; </td><td><center><b>Right</b></center></td><td><center><b>Left</b></center></td></tr>
											<?php if($assess['motion_right'] != false || $assess['motion_left'] != false){ ?><tr style="background-color: #f2f2f2;" ><td colspan="2">&nbsp;&nbsp;&nbsp;Range of Motion	</td><td><div class="input-field"><?php echo $assess['motion_right']; ?></div></td><td><div class="input-field"><?php echo $assess['motion_left']; ?></div></td></tr><?php } ?>
											<?php if($assess['strength_right'] != false || $assess['strength_left'] != false){ ?><tr><td colspan="2">&nbsp;&nbsp;&nbsp; Muscle Strength	</td><td><div class="input-field"><?php echo $assess['strength_right']; ?></div></td><td><div class="input-field"><?php echo $assess['strength_left']; ?></div></td></tr><?php } ?>
					<?php if($assess['limb_right'] != false || $assess['limb_left'] != false || $assess['Apparent'] != false || $assess['true'] != false ||  $assess['muscle_left'] != false || $assess['muscle_right'] != false) { ?>
											<tr style="background-color: #f2f2f2;"><td colspan="4"><center>&nbsp;&nbsp;&nbsp;<b>Resisted Isometrics </b></center></td></tr>
											<?php } ?>
											<?php if($assess['limb_right'] != false || $assess['limb_left'] != false){ ?><tr><td colspan="2">&nbsp;&nbsp;&nbsp; Limb Length	</td><td><div class="input-field"><?php echo $assess['limb_right']; ?></div></td><td><div class="input-field"><?php echo $assess['limb_left']; ?></div></td></tr><?php } ?>
											<?php if($assess['Apparent'] != false){ ?><tr style="background-color: #f2f2f2;"><td colspan="2">&nbsp;&nbsp;&nbsp;Apparent  </td><td colspan="2"><div class="input-field"><?php echo $assess['Apparent']; ?></div></td></tr><?php } ?>
											<?php if($assess['true'] != false){ ?><tr><td colspan="2">&nbsp;&nbsp;&nbsp;True  </td><td colspan="2"><div class="input-field"><?php echo $assess['true']; ?></div></td></tr><?php } ?>
											<?php if($assess['muscle_left'] != false || $assess['muscle_right'] != false){ ?><tr style="background-color: #f2f2f2;"><td colspan="2">&nbsp;&nbsp;&nbsp; Muscle Girth	</td><td><div class="input-field"><?php echo $assess['muscle_left']; ?></div></td><td><div class="input-field"><?php echo $assess['muscle_right']; ?></div></td></tr><?php } ?>
					</table></center>
					</div>
					<?php } ?>
					</br></br>
					<?php if($assess['thigh'] != false || $assess['calf'] != false || $assess['arm'] != false || $assess['forearm'] != false || $assess['d_rightreflexes'] != false || $assess['d_leftreflexes'] != false){?>
					<div style="overflow-x:auto;">
					<center><table style="border: 1px solid #ddd; width:95%;"  >
											<tr>
										<?php if($assess['thigh'] != false){?>	<td><center><b>Mid Thigh</b></center></td><?php } ?>
										<?php if($assess['calf'] != false){?>	<td><center><b>Mid Calf</b></center></td><?php } ?>
										<?php if($assess['arm'] != false){?>	<td><center><b>Mid Arm</b></center></td><?php } ?>
										<?php if($assess['forearm'] != false){?>	<td><center><b>Mid forearm</b></center></td><?php } ?>
											</tr>
											<tr style="background-color: #f2f2f2;">
											<?php if($assess['thigh'] != false){?><td><center><b><?php echo $assess['thigh']; ?></b></center></td><?php } ?>
											<?php if($assess['calf'] != false){?><td><center><b><?php echo $assess['calf']; ?></b></center></td><?php } ?>
											<?php if($assess['arm'] != false){?><td><center><b><?php echo $assess['arm']; ?></b></center></td><?php } ?>
											<?php if($assess['forearm'] != false){?><td><center><b><?php echo $assess['forearm']; ?></b></center></td><?php } ?>
											</tr>
					</table></center></div>
					</br></br>
					<?php if($assess['d_rightreflexes'] != false || $assess['d_leftreflexes'] != false){ ?>
					<div style="overflow-x:auto;">
					<center><table class="table" style="border: 1px solid #ddd; width:95%;"    >
											<tr><td colspan="2" style="40%;">&nbsp;&nbsp;&nbsp; </td><td><center><b>Right</b></center></td><td><center><b>Left</b></center></td></tr>
											<tr style="background-color: #f2f2f2;">
											<td colspan="2">&nbsp;&nbsp;&nbsp;Deep Tendon Reflexes	</td>
											<?php if($assess['d_rightreflexes'] != false){?><td><div class="input-field"><?php echo $assess['d_rightreflexes']; ?></div></td><?php } ?>
											<?php if($assess['d_leftreflexes'] != false){?><td><div class="input-field"><?php echo $assess['d_leftreflexes']; ?></div></td><?php } ?></tr>
					</center></table>
					</div>
					<?php } ?>
					<?php } ?>
					<table style="width:95%;">
					<?php if($assess['Biceps'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Biceps	:</td><td><?php echo ($assess['Biceps']); ?></td></tr>
					<?php } ?>
					<?php if($assess['Triceps'] != false){?>
  					 <tr><td>&nbsp;&nbsp;&nbsp;Triceps	:</td><td><?php echo ($assess['Triceps']); ?></td></tr>
					<?php } ?>
					<?php if($assess['Brachioradialis'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Brachioradialis 	:</td><td><?php echo ($assess['Brachioradialis']); ?></td></tr>
					<?php } ?>
					<?php if($assess['knee'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Knee	:</td><td><?php echo ($assess['knee']); ?></td></tr>
					<?php } ?>
					<?php if($assess['ankle'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Ankle 	:</td><td><?php echo ($assess['ankle']); ?></td></tr>
					<?php } ?>
					<?php if($assess['superficial'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Superficial Reflexes	:</td><td><?php echo ($assess['superficial']); ?></td></tr>
					<?php } ?>
					<?php if($assess['abdominal'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Abdominal 	:</td><td><?php echo ($assess['abdominal']); ?></td></tr>
					<?php } ?>
					<?php if($assess['plantar'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Plantar	:</td><td><?php echo ($assess['plantar']); ?></td></tr>
					<?php } ?>
					<?php if($assess['sensory'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Sensory Evaluation	:</td><td><?php echo ($assess['sensory']); ?></td></tr>
					<?php } ?>
					<?php if($assess['superficial'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Superficial sensation	:</td><td><?php echo ($assess['superficial']); ?></td></tr>
					<?php } ?>
					<?php if($assess['deep'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Deep sensation	:</td><td><?php echo ($assess['deep']); ?></td></tr>
					<?php } ?>
					<?php if($assess['balance'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Balance Assessment	:</td><td><?php echo ($assess['balance']); ?></td></tr>
					<?php } ?>
					<?php if($assess['posture_ass'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Posture Assessment	:</td><td><?php echo ($assess['posture_ass']); ?></td></tr>
					<?php } ?>
					<?php if($assess['gait_ass'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Gait Evaluation	:</td><td><?php echo ($assess['gait_ass']); ?></td></tr>
					<?php } ?>
					<?php if($assess['functional'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Functional Assessment	:</td><td><?php echo ($assess['functional']); ?></td></tr>
					<?php } ?>
					<?php if($assess['special'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Special Test	:</td><td><?php echo ($assess['special']); ?></td></tr>
					<?php } ?>
					<?php if($assess['investigation'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Investigations	:</td><td><?php echo ($assess['investigation']); ?></td></tr>
					<?php } ?>
					<?php if($assess['p_diagnosis'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Physical therapy Diagnosis	:</td><td><?php echo ($assess['p_diagnosis']); ?></td></tr>
					<?php } ?>
					<?php if($assess['diff_diagnosis'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Differential Diagnosis	:</td><td><?php echo ($assess['diff_diagnosis']); ?></td></tr>
					<?php } ?>
						<!--<tr><td>&nbsp;&nbsp;&nbsp;Management	:</td><td><?php echo ($assess['manage']); ?></td></tr>-->
						<?php if($assess['pbm_list'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Problem List	:</td><td><?php echo ($assess['pbm_list']); ?></td></tr>
						<?php } ?>
						<?php if($assess['a_goal'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Anticipatory Goals	:</td><td><?php echo ($assess['a_goal']); ?></td></tr>
						<?php } ?>
						<?php if($assess['long_goal'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Long Term Goals	:</td><td><?php echo ($assess['long_goal']); ?></td></tr>
						<?php } ?>
						<?php if($assess['manage'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Short Term Goals	:</td><td><?php echo ($assess['manage']); ?></td></tr>
						<?php } ?>
						<?php if($assess['p_treatment'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Physiotherapy Treatment	:</td><td><?php echo ($assess['p_treatment']); ?></td></tr>
						<?php } ?>
						<?php if($assess['p_advice'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Orthotic/Prosthetic Advice	:</td><td><?php echo ($assess['p_advice']); ?></td></tr>
						<?php } ?>
						<?php if($assess['h_advices'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Home Advices	:</td><td><?php echo ($assess['h_advices']); ?></td></tr>
						<?php } ?>
						<?php if($assess['follow'] != false){?>
						<tr><td>&nbsp;&nbsp;&nbsp;Follow Up 	:</td><td><?php echo ($assess['follow']); ?></td></tr>
						<?php } ?>
					</table>
					
					 <table style="width:95%;">
							<tr><td><p style="float:left;" >&nbsp;&nbsp;	</td><td colspan="2">&nbsp;&nbsp;</td><td><p style="float:right;">&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url().$staff_info['img_name']; ?>" style="width:220px; float:right;"></img></p></td></tr>
					        <tr><td><p style="float:left;" >&nbsp;&nbsp;Signature with Date :&nbsp;&nbsp; <?php echo date('d/m/Y'); ?></td><td colspan="2">&nbsp;&nbsp;</td><td><p style="float:right;">UNIT/WARD Staff: <strong><?php echo $staff_info['first_name'];  ?></strong></p></td></tr>
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