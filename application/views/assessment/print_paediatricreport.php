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
							
							<tr><td colspan="4"><center>Paediatric Physiotherapy Assessment</center></td></tr>
							</table>    
					</div>
				  <?php if($assess1 != false) { foreach($assess1 as $assess){ ?>
				  <hr>
				   <div style="width:95%;">  
				    <table style="width:100%;"><tr><td style="width:80%;" colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td> Date : <?php echo date('d/m/Y',strtotime($assess['assess_date'])); ?></td>
					</tr></table>   
					</div>
					<div style="width:95%;"  >  
					<table style="width:95%;"><tr><td>&nbsp;&nbsp;&nbsp;	Name :</td><td colspan="3"><?php echo $patient['first_name'].' '.$patient['last_name']; ?></td></tr>
						<tr><td>&nbsp;&nbsp;&nbsp;	DOB			:</td><td colspan="3"><?php echo date('d M, Y',strtotime($patient['dob'])); ?></td></tr>
						<?php if($assess['b_weight'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	BIRTH WEIGHT				:</td><td><?php echo $assess['b_weight']; ?></td><td></tr><?php } ?>
						<?php if($assess['circumference'] != false){?><tr><td>&nbsp;&nbsp;&nbsp; HEAD CIRCUMFERENCE : </td><td><?php echo $assess['circumference']; ?></td></tr><?php } ?>
						<tr><td>&nbsp;&nbsp;&nbsp;	AGE/SEX				:</td><td colspan="3"><?php echo $patient['age']; ?></td></tr> 
						<tr><td>&nbsp;&nbsp;&nbsp;	ADDRESS			:</td><td colspan="3"><?php echo $patient['address_line1']; ?></td></tr> 
						<!--<tr><td>&nbsp;&nbsp;&nbsp;	UHID NO					:</td><td colspan="3"><?php echo $assess['uhid']; ?></td></tr>-->
						<?php if($assess['op'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	OP/IP NO				: </td><td colspan="3"><?php echo $assess['op']; ?></td></tr><?php } ?>
						<?php if($assess['complaints'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	CHIEF COMPLAINTS				: </td><td colspan="3"><?php echo $assess['complaints']; ?>
							</td></tr><?php } ?> 
					</table>
					<?php if($assess['prenatal'] != false || $assess['natal'] != false || $assess['postnatal'] != false || $assess['family'] != false ){?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;<b><u>HISTORY</u></b> </p> 
						<table style="width:95%;">
						<?php if($assess['prenatal'] != false){?><tr><td>&nbsp;&nbsp;&nbsp; PRENATAL :</td><td colspan="3"><?php echo $assess['prenatal']; ?></td></tr><?php } ?>
						<?php if($assess['natal'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;NATAL			:</td><td colspan="3"><?php echo $assess['natal']; ?></td></tr><?php } ?>
						<?php if($assess['postnatal'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;POSTNATAL 				:</td><td colspan="3"><?php echo $assess['postnatal']; ?></td></tr><?php } ?>
						<?php if($assess['family'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;FAMILY HISTORY				:</td><td colspan="3"><?php echo $assess['family']; ?></td></tr><?php } ?>
					   </table>
					<?php } ?>
					<?php if($assess['supine'] != false || $assess['stone'] != false || $assess['sitting'] != false){?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;<b><u>OBSERVATION</u></b></p> 
						<table style="width:95%;">
						<?php if($assess['supine'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;SUPINE  :</td><td colspan="3"><?php echo $assess['supine']; ?></td></tr><?php } ?>
						<?php if($assess['stone'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;PRONE			:</td><td colspan="3"><?php echo $assess['stone']; ?></td></tr><?php } ?>
						<?php if($assess['sitting'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;SITTING				:</td><td colspan="3"><?php echo ($assess['sitting']); ?></td></tr><?php } ?>
						</table>
					<?php } ?>
					<?php if($assess['milestone'] != false || $assess['follow'] != false || $assess['head_holding'] != false || $assess['rolling_over'] != false || $assess['sitwith'] != false || $assess['sittingwith'] != false || $assess['crawing'] != false || $assess['stand'] != false || $assess['walkwith'] != false || $assess['walkwithout'] != false){?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;<b>MILESTONES </b></p>
				    <?php } ?>
					<table style="width:95%;">
						<?php if($assess['milestone'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;1.	Social smile :</td><td colspan="3"><?php echo $assess['milestone']; ?></td></tr><?php } ?>
						<?php if($assess['follow'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;2.	Follow with eyes			:</td><td colspan="3"><?php echo $assess['follow']; ?></td></tr><?php } ?>
						<?php if($assess['head_holding'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;3.	Head holding				:</td><td colspan="3"><?php echo $assess['head_holding']; ?></td></tr><?php } ?>
						<?php if($assess['rolling_over'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;4.	Rolling over				:</td><td colspan="3"><?php echo $assess['rolling_over']; ?></td></tr><?php } ?>
						<?php if($assess['sitwith'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;5.	Sitting(with support)				:</td><td colspan="3"><?php echo $assess['sitwith']; ?></td></tr><?php } ?>
						<?php if($assess['sittingwith'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;6.	Sitting(without support)				:</td><td colspan="3"><?php echo $assess['sittingwith']; ?></td></tr><?php } ?>
						<?php if($assess['crawing'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;7.	Crawling 				:</td><td colspan="3"><?php echo $assess['crawing']; ?></td></tr><?php } ?>
						<?php if($assess['stand'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;8.	Standing				:</td><td colspan="3"><?php echo $assess['stand']; ?></td></tr><?php } ?>
						<?php if($assess['walkwith'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;9.	Walking(with support)				:</td><td colspan="3"><?php echo $assess['walkwith']; ?></td></tr><?php } ?>
						<?php if($assess['walkwithout'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;10.	Walking(without support)				:</td><td colspan="3"><?php echo $assess['walkwithout']; ?></td></tr><?php } ?>
					</table>
					<?php if($assess['suck'] != false || $assess['root'] != false || $assess['swallowing'] != false || $assess['u_limb'] != false){?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;<b>REFLEX EVALUATION</b></p> 
					<p style="color:black;">&nbsp;&nbsp;&nbsp;<b>NEONATAL REFLEXES</b></p> 
					<?php } ?>
					<table style="width:95%;">
						<?php if($assess['suck'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;1.	Sucking :</td><td colspan="3"><?php echo $assess['suck']; ?></td></tr><?php } ?>
						<?php if($assess['root'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;2.	Rooting		:</td><td colspan="3"><?php echo $assess['root']; ?></td></tr><?php } ?>
						<?php if($assess['swallowing'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;3.	Swallowing 				:</td><td colspan="3"><?php echo $assess['swallowing']; ?></td></tr><?php } ?>
						<?php if($assess['u_limb'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;4.	Upper limb placing 				:</td><td colspan="3"><?php echo $assess['u_limb']; ?></td></tr><?php } ?>
					</table>
					<?php if($assess['sucking1'] != false || $assess['sucking2'] != false || $assess['rooting1'] != false || $assess['rooting2'] != false || $assess['grasp1'] != false || $assess['grasp2'] != false || $assess['foot1'] != false || $assess['foot2'] != false || $assess['remains1'] != false || $assess['remains2'] != false || $assess['startle1'] != false || $assess['startle2'] != false || $assess['hamd1'] != false || $assess['hamd2'] != false){?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;<b>MILESTONE ASSESSMENT ( See chart attached GMFM Score sheet)</b></p>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;<b>DEVELOPMENTAL REFLEXES </b></p> 
					<p style="font-style:italic;">&nbsp;&nbsp;&nbsp;<b>PRIMITIVE REFLEXES</b></p>
					<div style="overflow-x:auto;"><center><table class="table" style="border: 1px solid #ddd; width:95%;"    >
							<tr>
							<th><center>REFLEX</center></th>
							<th><center>NORMAL UNTIL</center></th>
							<th><center>PRESENT</center></th>
							<th><center>INTEGRATED</center></th>
							</tr>
							<tr style="background-color: #f2f2f2;">
							<td><center>SUCKING</center></td>
							<td><center>3 MONTHS</center></td>
							<td><center><?php echo $assess['sucking1']; ?></center></td>
							<td><center><?php echo $assess['sucking2']; ?></center></td>
							</tr>
							<tr>
							<td><center>ROOTING</center></td>
							<td><center>3 MONTHS</center></td>
							<td><center><?php echo $assess['rooting1']; ?></center></td>
							<td><center><?php echo $assess['rooting2']; ?></center></td>
							</tr>
							<tr style="background-color: #f2f2f2;">
							<td><center>GRASP</center></td>
							<td><center>3 MONTHS</center></td>
							<td><center><?php echo $assess['grasp1']; ?></center></td>
							<td><center><?php echo $assess['grasp2']; ?></center></td>
							</tr>
							<tr>
							<td><center>FOOT GRASP</center></td>
							<td><center>9 MONTHS</center></td>
							<td><center><?php echo $assess['foot1']; ?></center></td>
							<td><center><?php echo $assess['foot2']; ?></center></td>
							</tr>
							<tr style="background-color: #f2f2f2;">
							<td><center>PLACING</center></td>
							<td><center>REMAINS</center></td>
							<td><center><?php echo $assess['remains1']; ?></center></td>
							<td><center><?php echo $assess['remains2']; ?></center></td>
							</tr>
							<tr>
							<td><center>STARTLE</center></td>
							<td><center>STARTLE</center></td>
							<td><center><?php echo $assess['startle1']; ?></center></td>
							<td><center><?php echo $assess['startle2']; ?></center></td>
							</tr>
							<tr style="background-color: #f2f2f2;">
							<td><center>HAMD OPENING</center></td>
							<td><center>1 MONTHS</center></td>
							<td><center><?php echo $assess['hamd1']; ?></center></td>
							<td><center><?php echo $assess['hamd2']; ?></center></td>
							</tr>
					</table></center></div>
					<?php } ?>
					</br>
					<?php if($assess['flexor1'] != false || $assess['flexor2'] != false || $assess['extensor1'] != false || $assess['extensor2'] != false || $assess['cross1'] != false || $assess['cross2'] != false){?>
					<p style="font-style:italic;">&nbsp;&nbsp;&nbsp;<b>SPINAL  REFLEXES</b></p>
					<div style="overflow-x:auto;">
					<center><table class="table" style="border: 1px solid #ddd; width:95%;"  >
							<tr>
							<th><center>REFLEX</center></th>
							<th><center>NORMAL UNTIL</center></th>
							<th><center>PRESENT</center></th>
							<th><center>INTEGRATED</center></th>
							</tr>
							<tr style="background-color: #f2f2f2;">
							<td><center>FLEXOR WITHDRAWAL</center></td>
							<td><center>2 MONTHS</center></td>
							<td><center><?php echo $assess['flexor1']; ?></center></td>
							<td><center><?php echo $assess['flexor2']; ?></center></td>
							</tr>
							<tr>
							<td><center>EXTENSOR THRUST</center></td>
							<td><center>2 MONTHS</center></td>
							<td><center><?php echo $assess['extensor1']; ?></center></td>
							<td><center><?php echo $assess['extensor2']; ?></center></td>
							</tr>
							<tr style="background-color: #f2f2f2;">
							<td><center>CROSSED EXTENSION</center></td>
							<td><center>2 MONTHS</center></td>
							<td><center><?php echo $assess['cross1']; ?></center></td>
							<td><center><?php echo $assess['cross2']; ?></center></td>
							</tr>
					</table>
					</center></div>
					<?php } ?></br>
					<?php if($assess['atnr1'] != false || $assess['atnr2'] != false || $assess['rare1'] != false || $assess['rare2'] != false || $assess['supine1'] != false || $assess['supine2'] != false || $assess['tonic1'] != false || $assess['tonic2'] != false || $assess['positive1'] != false || $assess['positive2'] != false || $assess['negative1'] != false || $assess['negative2'] != false){?>
					<p style="font-style:italic;">&nbsp;&nbsp;&nbsp;<b>BRAINSTEM  REFLEXES</b></p>
					<div style="overflow-x:auto;">
					<center><table class="table" style="border: 1px solid #ddd; width:95%;"   >
							<tr>
							<th><center>REFLEX</center></th>
							<th><center>NORMAL UNTIL</center></th>
							<th><center>PRESENT</center></th>
							<th><center>INTEGRATED</center></th>
							</tr>
							<tr style="background-color: #f2f2f2;">
							<td><center>ATNR</center></td>
							<td><center>6 MONTHS USUALLY PATHOLOGICAL</center></td>
							<td><center><?php echo $assess['atnr1']; ?></center></td>
							<td><center><?php echo $assess['atnr2']; ?></center></td>
							</tr>
							<tr>
							<td><center>STNR</center></td>
							<td><center>RARE AND PATHOLOGICAL</center></td>
							<td><center><?php echo $assess['rare1']; ?></center></td>
							<td><center><?php echo $assess['rare2']; ?></center></td>
							</tr>
							<tr style="background-color: #f2f2f2;">
							<td><center>TONIC LABRYNTHINE SUPINE</center></td>
							<td><center>PATHOLOGICAL</center></td>
							<td><center><?php echo $assess['supine1']; ?></center></td>
							<td><center><?php echo $assess['supine2']; ?></center></td>
							</tr>
							<tr>
							<td><center>TONIC LABRYNTHINE PRONE</center> </td>
							<td><center>3 MONTHS</center></td>
							<td><center><?php echo $assess['tonic1']; ?></center></td>
							<td><center><?php echo $assess['tonic2']; ?></center></td>
							</tr>
							<tr style="background-color: #f2f2f2;">
							<td><center>POSITIVE SUPPORTING</center> </td>
							<td><center>3 MONTHS</center></td>
							<td><center><?php echo $assess['positive1']; ?></center></td>
							<td><center><?php echo $assess['positive2']; ?></center></td>
							</tr>
							<tr>
							<td><center>NEGATIVE SUPPORTING </center></td>
							<td><center>3-5 MONTHS</center></td>
							<td><center><?php echo $assess['negative1']; ?></center></td>
							<td><center><?php echo $assess['negative2']; ?></center></td>
							</tr>
					</table>
					</center></div>
					<?php } ?>
					</br>
					<?php if($assess['optical1'] != false || $assess['optical2'] != false || $assess['labrythine1'] != false || $assess['labrythine2'] != false || $assess['labrythine3'] != false){?>
					<p style="font-style:italic;">&nbsp;&nbsp;&nbsp;<b>MIDBRAIN   REFLEXES</b></p>
					<div style="overflow-x:auto;">
					<center><table class="table" style="border: 1px solid #ddd; width:95%;"   >
							<tr>
							<th><center>REACTIONS </center></th>
							<th><center>EMERGES</center></th>
							<th><center>ACHIEVED</center></th>
							<th><center>NOT ACHIEVED</center></th>
							</tr>
							<tr style="background-color: #f2f2f2;" >
							<td><center>OPTICAL</center></td>
							<td><center>6 MONTHS</center></td>
							<td><center><?php echo $assess['optical1']; ?></center></td>
							<td><center><?php echo $assess['optical2']; ?></center></td>
							</tr>
							<tr>
							<td><center>LABRYTHINE</center></td>
							<td><center><?php echo $assess['labrythine1']; ?></center></td>
							<td><center><?php echo $assess['labrythine2']; ?></center></td>
							<td><center><?php echo $assess['labrythine3']; ?></center></td>
							</tr>
					</table></center></div>
					<?php } ?>
					</br>
					<?php if($assess['n_righting1'] != false || $assess['n_righting2'] != false || $assess['pathological1'] != false || $assess['pathological2'] != false || $assess['rising1'] != false || $assess['rising2'] != false || $assess['b_righting1'] != false || $assess['b_righting2'] != false || $assess['amphibian1'] != false || $assess['amphibian2'] != false || $assess['rotation1'] != false || $assess['rotation2'] != false){?>
					<p style="font-style:italic;">&nbsp;&nbsp;&nbsp;<b>CORTICAL REACTIONS</b></p>
					<div style="overflow-x:auto;">
					<center><table class="table" style="border: 1px solid #ddd; width:95%;"   >
							<tr>
							<th><center>NECK RIGHTING</center> </th>
							<th><center>EMERGES</center></th>
							<th><center>ACHIEVED</center></th>
							<th><center>NOT ACHIEVED</center></th>
							</tr>
							<tr style="background-color: #f2f2f2;">
							<td><center>NECK RIGHTING</center></td>
							<td><center>5 MONTHS</center></td>
							<td><center><?php echo $assess['n_righting1']; ?></center></td>
							<td><center><?php echo $assess['n_righting2']; ?></center></td>
							</tr>
							<tr>
							<td><center>ASSOCIATED REACTIONS</center></td>
							<td><center>PATHOLOGICAL</center></td>
							<td><center><?php echo $assess['pathological1']; ?></center></td>
							<td><center><?php echo $assess['pathological2']; ?></center></td>
							</tr>
							<tr style="background-color: #f2f2f2;">
							<td><center>RISING</center></td>
							<td><center>2-6 MONTHS</center></td>
							<td><center><?php echo $assess['rising1']; ?></center></td>
							<td><center><?php echo $assess['rising2']; ?></center></td>
							</tr>
							<tr>
							<td><center>BODY RIGHTING</center></td>
							<td><center>4-6 MONTHS</center></td>
							<td><center><?php echo $assess['b_righting1']; ?></center></td>
							<td><center><?php echo $assess['b_righting2']; ?></center></td>
							</tr>
							<tr style="background-color: #f2f2f2;">
							<td><center>AMPHIBIAN</center></td>
							<td><center>4-6 MONTHS</center></td>
							<td><center><?php echo $assess['amphibian1']; ?></center></td>
							<td><center><?php echo $assess['amphibian2']; ?></center></td>
							</tr>
							<tr>
							<td><center>ROTATION</center></td>
							<td><center>6-10 MONTHS</center></td>
							<td><center><?php echo $assess['rotation1']; ?></center></td>
							<td><center><?php echo $assess['rotation2']; ?></center></td>
							</tr>
					</table></center></div>
					<?php } ?></br>
					<?php if($assess['Supine_prone1'] != false || $assess['Supine_prone2'] != false || $assess['kneeling1'] != false || $assess['kneeling2'] != false || $assess['sitting1'] != false || $assess['sitting2'] != false || $assess['K_standing1'] != false || $assess['K_standing2'] != false || $assess['standing1'] != false || $assess['standing2'] != false || $assess['s_reaction1'] != false || $assess['s_reaction2'] != false || $assess['s_fall1'] != false || $assess['s_fall2'] != false){?>
					<p style="font-style:italic;">&nbsp;&nbsp;&nbsp;<b>TILT REACTIONS</b></p>
	  	            <div style="overflow-x:auto;">
						<center><table class="table" style="border: 1px solid #ddd; width:95%;"  >
								<tr>
								<th><center>NECK RIGHTING</center> </th>
								<th><center>EMERGES</center></th>
								<th><center>ACHIEVED</center></th>
								<th><center>NOT ACHIEVED</center></th>
								</tr>
								<tr style="background-color: #f2f2f2;">
								<td><center>SUPINE NAD PRONE</center></td>
								<td><center>6 MONTHS</center></td>
								<td><center><?php echo $assess['Supine_prone1']; ?></center></td>
								<td><center><?php echo $assess['Supine_prone2']; ?></center></td>
								</tr>
								<tr>
								<td><center>FOUR POINT KNEELING</center></td>
								<td><center>7-12 MONTHS</center></td>
								<td><center><?php echo $assess['kneeling1']; ?></center></td>
								<td><center><?php echo $assess['kneeling2']; ?></center></td>
								</tr>
								<tr style="background-color: #f2f2f2;">
								<td><center>SITTING</center></td>
								<td><center>9-12 MONTHS</center></td>
								<td><center><?php echo $assess['sitting1']; ?></center></td>
								<td><center><?php echo $assess['sitting2']; ?></center></td>
								</tr>
								<tr>
								<td><center>KNEEL STANDING</center></td>
								<td><center>18 MONTHS</center></td>
								<td><center><?php echo $assess['K_standing1']; ?></center></td>
								<td><center><?php echo $assess['K_standing2']; ?></center></td>
								</tr>
								<tr style="background-color: #f2f2f2;">
								<td><center>STANDING</center></td>
								<td><center>12-18MONTHS</center></td>
								<td><center><?php echo $assess['standing1']; ?></center></td>
								<td><center><?php echo $assess['standing2']; ?></center></td>
								</tr>
								<tr>
								<td><center>STAGGERING REACTION</center></td>
								<td><center>12-18 MONTHS</center></td>
								<td><center><?php echo $assess['s_reaction1']; ?></center></td>
								<td><center><?php echo $assess['s_reaction2']; ?></center></td>
								</tr>
								<tr style="background-color: #f2f2f2;" >
								<td><center>SAVING FROM FALL</center></td>
								<td><center>5-10 MONTHS</center></td>
								<td><center><?php echo $assess['s_fall1']; ?></center></td>
								<td><center><?php echo $assess['s_fall2']; ?></center></td>
								</tr>
						</table></center></div></br>
					<?php } ?>
						<?php if($assess['h_cortical'] != false || $assess['examiner'] != false || $assess['surroundings'] != false || $assess['activity'] != false || $assess['Speech'] != false || $assess['Vision'] != false || $assess['Hearing'] != false || $assess['function'] != false || $assess['Orientation'] != false || $assess['Handedness'] != false){?>
						<p style="color:black;">&nbsp;&nbsp;&nbsp;<b>ON EXAMINATION</b> </p>
					    <?php } ?>
						<table  style="width:95%;">
						<?php if($assess['h_cortical'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Higher cortical function :</td><td colspan="3"><?php echo $assess['h_cortical']; ?></td></tr><?php } ?>
						<?php if($assess['examiner'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Integration with 4 examiner			:</td><td colspan="3"><?php echo $assess['examiner']; ?></td></tr><?php } ?>
						<?php if($assess['surroundings'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Integration with surroundings				:</td><td colspan="3"><?php echo $assess['surroundings']; ?></td></tr><?php } ?>
						<?php if($assess['activity'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Over all activity				:</td><td colspan="3"><?php echo $assess['activity']; ?></td></tr><?php } ?>
						<?php if($assess['Speech'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Speech/ articulation				:</td><td colspan="3"><?php echo $assess['Speech']; ?></td></tr><?php } ?>
						<?php if($assess['Vision'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Vision				:</td><td colspan="3"><?php echo $assess['Vision']; ?></td></tr><?php } ?>
						<?php if($assess['Hearing'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Hearing 				:</td><td colspan="3"><?php echo $assess['Hearing']; ?></td></tr><?php } ?>
						<?php if($assess['function'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Cognitive function				:</td><td colspan="3"><?php echo $assess['function']; ?></td></tr><?php } ?>
						<?php if($assess['Orientation'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Orientation				:</td><td colspan="3"><?php echo $assess['Orientation']; ?></td></tr><?php } ?>
						<?php if($assess['Handedness'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Handedness				:</td><td colspan="3"><?php echo $assess['Handedness']; ?></td></tr><?php } ?>
					 </table>
					 <?php if($assess['Head'] != false || $assess['Chest'] != false || $assess['Height'] != false || $assess['Weight'] != false){?>
					 <p style="color:black;">&nbsp;&nbsp;&nbsp;<b>CRANIAL VERVE EXAMINATION</b></p>
					 <p style="color:black;">&nbsp;&nbsp;&nbsp;PHYSICAL EXAMINATION</p>
					 <?php } ?>
					 <table style="width:95%;">
						<?php if($assess['Head'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Head circumference  :</td><td colspan="3"><?php echo $assess['Head']; ?></td></tr><?php } ?>
						<?php if($assess['Chest'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Chest circumference			:</td><td colspan="3"><?php echo $assess['Chest']; ?></td></tr><?php } ?>
						<?php if($assess['Height'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Height				:</td><td colspan="3"><?php echo $assess['Height']; ?></td></tr><?php } ?>
						<?php if($assess['Weight'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Weight				:</td><td colspan="3"><?php echo $assess['Weight']; ?></td></tr><?php } ?>
					</table>
					<?php if($assess['Biceps'] != false || $assess['Triceps'] != false || $assess['Knee'] != false || $assess['Ankle'] != false || $assess['Abdomen'] != false){?>
					<p style="color:black">&nbsp;&nbsp;&nbsp;<b> TENDON REFLEX</b></p>
					<?php } ?>
					<table style="width:95%;">
						<?php if($assess['Biceps'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Biceps     :</td><td colspan="3"><?php echo $assess['Biceps']; ?></td></tr><?php } ?>
						<?php if($assess['Triceps'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Triceps 			:</td><td colspan="3"><?php echo $assess['Triceps']; ?></td></tr><?php } ?>
						<?php if($assess['Knee'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Knee 				:</td><td colspan="3"><?php echo $assess['Knee']; ?></td></tr><?php } ?>
						<?php if($assess['Ankle'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Ankle 				:</td><td colspan="3"><?php echo $assess['Ankle']; ?></td></tr><?php } ?>
						<?php if($assess['Abdomen'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Abdomen 				:</td><td colspan="3"><?php echo $assess['Abdomen']; ?></td></tr><?php } ?>
					</table>
					<?php if($assess['breathing'] != false || $assess['Endurance'] != false){?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;<b> RESPIRATORY STATUS</b></p>
					<?php } ?>
					<table style="width:95%;">
						<?php if($assess['breathing'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;1.	Pattern of breathing     :</td><td colspan="3"><?php echo $assess['breathing']; ?></td></tr><?php } ?>
						<?php if($assess['Endurance'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;2.	Endurance 			:</td><td colspan="3"><?php echo $assess['Endurance']; ?></td></tr><?php } ?>
					</table>
					<?php if($assess['Superficial'] != false || $assess['Deep'] != false || $assess['cortical'] != false){?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;<b> SENSORY EVALUATION </b> </p>
					<?php } ?>
					<table style="width:95%;">
						<?php if($assess['Superficial'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Superficial      :</td><td colspan="3"><?php echo $assess['Superficial']; ?></td></tr><?php } ?>
						<?php if($assess['Deep'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Deep 			:</td><td colspan="3"><?php echo $assess['Deep']; ?></td></tr><?php } ?>
						<?php if($assess['cortical'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Combined cortical sensation 			:</td><td colspan="3"><?php echo $assess['cortical']; ?></td></tr><?php } ?>
					</table>
					<?php if($assess['tone'] != false || $assess['power'] != false || $assess['Arom'] != false || $assess['Prom'] != false || $assess['Deformities'] != false){?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;<b> MOTOR ASSESSMENT/ MUSCULOSKELETAL ASSESSMENT</b></p>
					<?php } ?>
					<table style="width:95%;">
						<?php if($assess['tone'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Muscle tone      :</td><td colspan="3"><?php echo $assess['tone']; ?></td></tr><?php } ?>
						<?php if($assess['power'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Muscle power/ voluntary control 			:</td><td colspan="3"><?php echo $assess['power']; ?></td></tr><?php } ?>
						<?php if($assess['Arom'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Arom  			:</td><td colspan="3"><?php echo $assess['Arom']; ?></td></tr><?php } ?>
						<?php if($assess['Prom'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Prom  			:</td><td colspan="3"><?php echo $assess['Prom']; ?></td></tr><?php } ?>
						<?php if($assess['Deformities'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Deformities / contractures/tightness   			:</td><td colspan="3"><?php echo $assess['Deformities']; ?></td></tr><?php } ?>
					</table>
					<?php if($assess['true1'] != false || $assess['true2'] != false || $assess['Apparent1'] != false || $assess['Apparent2'] != false){?> 
					<p style="color:black;">&nbsp;&nbsp;&nbsp;<b> Limb length discrepancy  </b></p>
					<div style="overflow-x:auto;">
					   <center> <table style="border: 1px solid #ddd; width:95%;"   >
							<tr>
							<th>&nbsp;&nbsp; </th>
							<th><center>Right     (cm)   </center></th>
							<th><center>Left (cm)</center></th>
							</tr>
							<tr style="background-color: #f2f2f2;">
							<td><center>True length</center></td>
							<td><center><?php echo $assess['true1']; ?></center></td>
							<td><center><?php echo $assess['true2']; ?></center></td>
							</tr>
							<tr>
							<td><center>Apparent length</center></td>
							<td><center><?php echo $assess['Apparent1']; ?></center></td>
							<td><center><?php echo $assess['Apparent2']; ?></center></td>
							</tr>
						</table></center>
					</div>
					<?php } ?>
					</br>
					<?php if($assess['thigh1'] != false || $assess['thigh2'] != false || $assess['calf1'] != false || $assess['calf2'] != false || $assess['arm1'] != false || $assess['arm2'] != false || $assess['forearm1'] != false || $assess['forearm2'] != false){?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp; Muscle girth </p>
					<?php } ?>
					<div style="overflow-x:auto;">
						<center><table style="border: 1px solid #ddd; width:95%;"   >
							<?php if($assess['thigh1'] != false || $assess['thigh2'] != false){?>
							<tr>
							<th><center>Mid thigh </center></th>
							<td><center><?php echo $assess['thigh1']; ?></center></td>
							<td><center><?php echo $assess['thigh2']; ?></center></td>
							</tr>	
							<?php } ?>
							<?php if($assess['calf1'] != false || $assess['calf2'] != false){?>
							<tr style="background-color: #f2f2f2;">
							<td><center>Mid calf </center></td>
							<td><center><?php echo $assess['calf1']; ?></center></td>
							<td><center><?php echo $assess['calf2']; ?></center></td>
							</tr>
							<?php } ?>
							<?php if($assess['arm1'] != false || $assess['arm2'] != false){?>
							<tr>
							<td><center>Mid arm  </center></td>
							<td><center><?php echo $assess['arm1']; ?></center></td>
							<td><center><?php echo $assess['arm2']; ?></center></td>
							</tr>
							<?php } ?>
							<?php if($assess['forearm1'] != false || $assess['forearm2'] != false){?>
							<tr style="background-color: #f2f2f2;">
							<td><center>Mid forearm </center></td>
							<td><center><?php echo $assess['forearm1']; ?></center></td>
							<td><center><?php echo $assess['forearm2']; ?></center></td>
							</tr>
							<?php } ?>
						</table></center>
						</div>
						<table style="width:95%;">
						<?php if($assess['Posture'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Posture assessment      :</td><td colspan="3"><?php echo $assess['Posture']; ?></td></tr><?php } ?>
						<?php if($assess['ordination'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Co-ordination test 			:</td><td colspan="3"><?php echo $assess['Co-ordination']; ?></td></tr><?php } ?>
						<?php if($assess['Gait'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Gait assessment  			:</td><td colspan="3"><?php echo $assess['Gait']; ?></td></tr><?php } ?>
					</table></br><table style="width:95%;">	
						<?php if($assess['bal_assessment'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Balance assessment:  			:</td><td colspan="3"><?php echo $assess['bal_assessment']; ?></td></tr><?php } ?>
				     </table></br>
					 <?php if($assess['sit_Static'] != false || $assess['sit_Dynamic'] != false){?> 
					 <p style="color:black;">&nbsp;&nbsp;&nbsp; Sitting balance </p>
					<table style="width:95%;">
						<?php if($assess['sit_Static'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;•	Static      :</td><td colspan="3"><?php echo $assess['sit_Static']; ?></td></tr><?php } ?>
						<?php if($assess['sit_Dynamic'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;•	Dynamic 			:</td><td colspan="3"><?php echo $assess['sit_Dynamic']; ?></td></tr><?php } ?>
					</table>
					 <?php } ?>
					<?php if($assess['stand_Static'] != false || $assess['stand_Balance'] != false){?> 
					 <p style="color:black;">&nbsp;&nbsp;&nbsp; Standing  balance </p>
					<?php } ?>
					<table style="width:95%;">
						<?php if($assess['stand_Static'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;•	Static      :</td><td colspan="3"><?php echo $assess['stand_Static']; ?></td></tr><?php } ?>
						<?php if($assess['stand_Balance'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;•	Dynamic 			:</td><td colspan="3"><?php echo $assess['stand_Balance']; ?></td></tr><?php } ?>
					</table></br><table style="width:95%;">	
						<?php if($assess['Bladder'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Bladder / bowel control   			:</td><td colspan="3"><?php echo $assess['Bladder']; ?></td></tr><?php } ?>
				     </table>
					 
					 <?php if($assess['Eating'] != false || $assess['Grooming'] != false || $assess['Bathing'] != false || $assess['Dressing-Upper'] != false || $assess['Dressing-Lower'] != false || $assess['Toileting'] != false){?> 
					 <p style="color:black;">&nbsp;&nbsp;&nbsp; <b>FUNCTIONAL ASSESSMENT</b> </p>
					 <p style="font-style:italic;">&nbsp;&nbsp;&nbsp;<b><u>WEE FIM SCALE</u></b> </p>
					 <p style="font-style:italic;">&nbsp;&nbsp;&nbsp;<b><u>SELF CARE</u></b></p>
					<table style="width:95%;">
						<?php if($assess['Eating'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;1.	Eating :</td><td colspan="3"><?php echo $assess['Eating']; ?></td></tr><?php } ?>
						<?php if($assess['Grooming'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;2.	Grooming			:</td><td colspan="3"><?php echo $assess['Grooming']; ?></td></tr><?php } ?>
						<?php if($assess['Bathing'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;3.	Bathing				:</td><td colspan="3"><?php echo $assess['Bathing']; ?></td></tr><?php } ?>
						<?php if($assess['Dressing-Upper'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;4.	Dressing-Upper Body				:</td><td colspan="3"><?php echo $assess['Dressing-Upper']; ?></td></tr><?php } ?>
						<?php if($assess['Dressing-Lower'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;5.	Dressing-Lower Body				:</td><td colspan="3"><?php echo $assess['Dressing-Lower']; ?></td></tr><?php } ?>
						<?php if($assess['Toileting'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;6.	Toileting				:</td><td colspan="3"><?php echo $assess['Toileting']; ?></td></tr><?php } ?>
					</table>
					 <?php } ?>
					 
					<?php if($assess['Bladder_manage'] != false || $assess['Bowel'] != false){?> 
					<p style="font-style:italic;">&nbsp;&nbsp;&nbsp;<b><u>SPHINTER</u></b></p>
					<table style="width:95%;">
					   <?php if($assess['Bladder_manage'] != false){?> <tr><td>&nbsp;&nbsp;&nbsp;7.	Bladder Management 				:</td><td colspan="3"><?php echo $assess['Bladder_manage']; ?></td></tr><?php } ?>
						<?php if($assess['Bowel'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;8.	Bowel Management				:</td><td colspan="3"><?php echo $assess['Bowel']; ?></td></tr><?php } ?>
					</table>
					<?php } ?>
					<?php if($assess['Chair'] != false || $assess['Toilet'] != false || $assess['Tub'] != false ){?>
					<p style="font-style:italic;">&nbsp;&nbsp;&nbsp;<b><u>MOBILITY</u></b></p>
					<table style="width:95%;">
						 <?php if($assess['Chair'] != false){?> <tr><td>&nbsp;&nbsp;&nbsp;9.	Transfer Chair/Wheel Chair				:</td><td colspan="3"><?php echo $assess['Chair']; ?></td></tr><?php } ?>
						 <?php if($assess['Toilet'] != false){?> <tr><td>&nbsp;&nbsp;&nbsp;10.	Transfer Toilet				:</td><td colspan="3"><?php echo $assess['Toilet']; ?></td></tr><?php } ?>
						 <?php if($assess['Tub'] != false){?> <tr><td>&nbsp;&nbsp;&nbsp;11.	Transfer Tub				:</td><td colspan="3"><?php echo $assess['Tub']; ?></td></tr><?php } ?>
					</table>
					<?php } ?>
					<?php if($assess['Crawls'] != false || $assess['stairs'] != false ){?>
					<p style="font-style:italic;">&nbsp;&nbsp;&nbsp;<b><u>LOCOMOTION</u></b></p>
					<table style="width:95%;">
						<?php if($assess['Crawls'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;12.	Crawls/Walk/Wheelchair				:</td><td colspan="3"><?php echo $assess['Crawls']; ?></td></tr><?php } ?>
						<?php if($assess['stairs'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;13.	Stairs				:</td><td colspan="3"><?php echo $assess['stairs']; ?></td></tr><?php } ?>
					</table>
					<?php } ?>
					<?php if($assess['comprehension'] != false || $assess['expression'] != false ){?>
					<p style="font-style:italic;">&nbsp;&nbsp;&nbsp;<b><u> COMMUNICATION </u></b></p>
					<table style="width:95%;">
						<?php if($assess['comprehension'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;14.	Comprehension				:</td><td colspan="3"><?php echo $assess['comprehension']; ?></td></tr><?php } ?>
						<?php if($assess['expression'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;15.	Expression				:</td><td colspan="3"><?php echo $assess['expression']; ?></td></tr><?php } ?>
					</table>
					<?php } ?>
					<?php if($assess['social'] != false || $assess['pbm'] != false || $assess['memory'] != false ){?>
					<p style="font-style:italic;">&nbsp;&nbsp;&nbsp;<b><u> SOCIAL COGNITION </u></b></p>
					<table style="width:95%;">
						<?php if($assess['social'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;16.	Social Interaction				:</td><td colspan="3"><?php echo $assess['social']; ?></td></tr><?php } ?>
						<?php if($assess['pbm'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;17.	Problem Solving 				:</td><td colspan="3"><?php echo $assess['pbm']; ?></td></tr><?php } ?>
						<?php if($assess['memory'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;18.	Memory			:</td><td colspan="3"><?php echo $assess['memory']; ?></td></tr><?php } ?>
					</table>
					<?php } ?>
					<?php if($assess['investigation'] != false || $assess['impression'] != false || $assess['diagnosis'] != false || $assess['pbm_list'] != false|| $assess['goal'] != false|| $assess['short_term'] != false|| $assess['long_term'] != false) { ?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp; <b>DETAILS OF CURRENT MEDICATION</b> </p>
					 <table style="width:95%;">
						<?php if($assess['investigation'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;INVESTIGATIONS :</td><td colspan="3"><?php echo $assess['investigation']; ?></td></tr><?php } ?>
						<?php if($assess['impression'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;CLINICAL IMPRESSION			:</td><td colspan="3"><?php echo $assess['impression']; ?></td></tr><?php } ?>
						<?php if($assess['diagnosis'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;DIFFERENTIAL DIAGNOSIS				:</td><td colspan="3"><?php echo $assess['diagnosis']; ?></td></tr><?php } ?>
						<?php if($assess['pbm_list'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;PROBLEM LIST				:</td><td colspan="3"><?php echo $assess['pbm_list']; ?></td></tr><?php } ?>
						<?php if($assess['goal'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;GOALS				:</td><td colspan="3"><?php echo $assess['goal']; ?></td></tr><?php } ?>
						<?php if($assess['short_term'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;SHORT TERM				:</td><td colspan="3"><?php echo $assess['short_term']; ?></td></tr><?php } ?>
						<?php if($assess['long_term'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;LONG TERM				:</td><td colspan="3"><?php echo $assess['long_term']; ?></td></tr><?php } ?>
					</table>
					<?php } ?>
					<table style="width:95%;">
							<tr><td><p style="float:left;" >&nbsp;&nbsp;	</td><td colspan="2">&nbsp;&nbsp;</td><td><p style="float:right;">&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url().$clientDetails['img_name']; ?>" style="width:220px; float:right;"></img></p></td></tr>
					        <tr><td><p style="float:left;" >&nbsp;&nbsp;Signature with Date :&nbsp;&nbsp; <?php echo date('d/m/Y'); ?></td><td colspan="2">&nbsp;&nbsp;</td><td><p style="float:right;">UNIT/WARD Staff: <strong><?php echo $clientDetails['first_name'];  ?></strong></p></td></tr>
					</table>
					<?PHP } } ?>
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