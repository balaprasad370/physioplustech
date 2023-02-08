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
	<div class="panel panel-primary" style="margin:20px;">
	 
        <center><h3 style="text-align:center;"><b>Elbow/wrist Assessment</b></center></h3>
	
	<table>  
		<tr>
		<td><b>Name :</b></td>
		<td colspan="3"><?php echo $patient['first_name'].''.$patient['last_name']; ?></td>
		<td></td><td></td><td></td><td></td><td></td><td></td>
		<td></td><td></td><td></td><td></td><td></td><td></td>
		<td></td><td></td><td></td><td></td><td></td><td></td>
		<td></td><td></td><td></td><td></td><td></td><td></td>
		<td></td><td></td><td></td><td></td><td></td><td></td>
		
		<td colspan="3"><b>Age/Sex</b></td>
		<td><?php echo $patient['age'].'/'.$patient['gender']; ?></td>
		<td></td><td></td><td></td><td></td><td></td><td></td>
		<td></td><td></td><td></td><td></td><td></td><td></td>
		<td></td><td></td><td></td><td></td><td></td><td></td>
		<td></td><td></td><td></td><td></td><td></td><td></td>
		<td></td><td></td><td></td><td></td><td></td><td></td>
		<td colspan="3"><b>Reg.no</b></td>
		<td><?php echo $patient['patient_code']; ?></td>
		
		</tr>
		</table>
	
	
	<table style="width:95%;"><tr><td>&nbsp;&nbsp;&nbsp;	Occupation :</td>
		   <td colspan="3"><?php echo $patient['occupation']; ?></td></tr>
			<tr><td>&nbsp;&nbsp;&nbsp;	Date
			:</td><td colspan="3"><?php echo date('d-m-Y',strtotime($details['assess_date'])); ?></td></tr>
          
		  </table>
		</br></br></br></br></br>
		<?php if($details['social'] != false || $details['injury'] != false || $details['investigations'] != false || $details['surgery'] != false){?>
		<h4>Mechanism/onset of pain</h4>
		   <?php } ?>
		   <table style="width:95%;">
		   <?php if($details['social'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Limitation of daily/social activities :</td>
		   <td colspan="3"><?php echo $details['social']; ?></td></tr><?php } ?>
			<?php if($details['injury'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Old injury/pain :	</td><td colspan="3"><?php echo $details['injury']; ?> </td></tr><?php } ?>
			<?php if($details['investigations'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Investigations			:</td><td colspan="3"><?php echo $details['investigations']; ?></td></tr><?php } ?>
           <?php if($details['surgery'] != false){?> <tr><td>&nbsp;&nbsp;&nbsp;	Surgery/injections :	</td><td colspan="3"><?php echo $details['surgery']; ?></td></tr><?php } ?>		
			</table>
		
		
		</br></br></br></br></br>
		<?php if($details['ant_left'] != false || $details['ant_right'] != false || $details['post_left'] != false || $details['post_right'] != false || $details['med_left'] != false || $details['med_right'] != false || $details['lat_left'] != false || $details['lat_right'] != false || $details['bic_left'] != false || $details['bic_right'] != false || $details['clicking_left'] != false || $details['clicking_right'] != false || $details['stiffness_left'] != false || $details['stiffness_right'] != false || $details['alignment_left'] != false || $details['alignment_right'] != false || $details['swelling_left'] != false || $details['swelling_right'] != false || $details['warmth_left'] != false || $details['warmth_right'] != false || $details['tightness_left'] != false || $details['winging_left'] != false || $details['winging_right'] != false || $details['tightness_right'] != false || $details['deformities_left'] != false || $details['deformities_right'] != false){?>
		<h4>Dominant hand: L/R/ Ambi</h4>
		
		<table border="1" style="width:100%;border-collapse: collapse;">
		<tr><td><strong>Objective/ Pain </strong></td><td>Left</td><td>Right</td></tr>
		<tr><td> Ant </td><td><?php echo $details['ant_left']; ?></td>
		<td><?php echo $details['ant_right']; ?></td>
		</tr>
		<tr><td> Post  </td>
		<td><?php echo $details['post_left']; ?></td>
		<td><?php echo $details['post_right']; ?></td>
		</tr>
		<tr><td> Med   </td><td><?php echo $details['med_left']; ?></td>
		<td><?php echo $details['med_right']; ?></td></tr>
		<tr><td> Lat  </td><td><?php echo $details['lat_left']; ?></td>
		<td><?php echo $details['lat_right']; ?></td></tr>
		<tr><td> Bic. Groove    </td>
		<td><?php echo $details['bic_left']; ?></td>
		<td><?php echo $details['bic_right']; ?></td></tr>
		<tr><td> Clicking    </td>
		<td><?php echo $details['clicking_left']; ?></td>
		<td><?php echo $details['clicking_right']; ?></td></tr>
		<tr><td> Stiffness    </td>
		<td><?php echo $details['stiffness_left']; ?></td>
		<td><?php echo $details['stiffness_right']; ?></td></tr>
		<tr><td colspan="3"><strong> Observation  </strong>  </td></tr>
		<tr><td> Alignment    </td>
		<td>
		<?php echo $details['alignment_left']; ?>
		</td>
		<td>
		<?php echo $details['alignment_right']; ?></td></tr>
		<tr><td> Swelling    </td><td><?php echo $details['swelling_left']; ?></td>
		<td><?php echo $details['swelling_right']; ?></td></tr>
		<tr><td> Warmth    </td>
		<td><?php echo $details['warmth_left']; ?></td>
		<td><?php echo $details['warmth_right']; ?></td></tr>
		<tr><td> Winging    </td>
		<td><?php echo $details['winging_left']; ?></td>
		<td>
		<?php echo $details['winging_right']; ?></td></tr>
		<tr><td> Muscle atrophy </td><td><?php echo $details['atrophy_left']; ?></td>
		<td><?php echo $details['atrophy_right']; ?></td></tr>
		<tr><td> Muscle Tightness    </td>
		<td><?php echo $details['tightness_left']; ?></td>
		<td>
		<?php echo $details['tightness_right']; ?></td></tr>
		<tr><td> Deformities    </td>
		<td><?php echo $details['deformities_left']; ?></td>
		<td><?php echo $details['deformities_right']; ?></td></tr>
		</table>
        <?php } ?>
		<img src="<?php echo $details['chart']; ?>"> 
		</br></br>
		<?php if($details['pain_scale'] != false || $details['duration'] != false || $details['category'] != false || $details['worse'] != false || $details['aggrevating'] != false || $details['relieving'] != false){?>
		
		<h4>Pain Description </h4>
		<?php } ?>
			<table style="width:95%;">
			<?php if($details['pain_scale'] != false) { ?><tr><td>&nbsp;&nbsp;&nbsp;  Pain scale (0-10): :</td>
			<td colspan="3"><?php echo $details['pain_scale']; ?></td></tr><?php } ?>
			<?php if($details['duration'] != false) { ?>
			<tr><td>&nbsp;&nbsp;&nbsp;	Pain duration			:</td><td colspan="3"><?php echo $details['duration']; ?></td></tr>
			<?php } ?>
			<?php if($details['category'] != false) { ?>
            <tr><td>&nbsp;&nbsp;&nbsp;	Pain type :	</td><td colspan="3"><?php echo $details['category']; ?></td></tr>
			<?php } ?>
			<?php if($details['worse'] != false) { ?>
			<tr><td>&nbsp;&nbsp;&nbsp;	Pain worse :	</td><td colspan="3"><?php echo $details['worse']; ?></td></tr>
			<?php } ?>
			<?php if($details['aggrevating'] != false) { ?>
			<tr><td>&nbsp;&nbsp;&nbsp;	Aggravating factors :	</td><td colspan="3"><?php echo $details['aggrevating']; ?></td></tr>	<?php } ?>
				<?php if($details['relieving'] != false) { ?>			
			<tr><td>&nbsp;&nbsp;&nbsp;	Relieving factors :	</td><td colspan="3"><?php echo $details['relieving']; ?></td></tr>			
				<?php } ?>
			</table></br></br>
			
		<?php if($details['flexion_active'] != false || $details['flexion_passive'] != false || $details['flexion_mmt'] != false || $details['flexion_active1'] != false || $details['flexion_passive1'] != false || $details['flexion_mmt1'] != false || $details['extension_active'] != false || $details['extension_passive'] != false || $details['extension_mmt'] != false || $details['extension_active1'] != false || $details['extension_passive1'] != false || $details['extension_mmt1'] != false || $details['abduction_active'] != false || $details['abduction_passive'] != false || $details['abduction_mmt'] != false || $details['abduction_active1'] != false || $details['abduction_passive1'] != false || $details['abduction_mmt1'] != false){?>
			
		<h4>Neurological </h4>
		
		<table border="1" style="width:100%;border-collapse: collapse;">
		<tr><td> SHOULDER </td><td colspan="3"><center>LEFT</center></td><td colspan="3"><center>RIGHT</center></td></tr>
		<tr><td> Movements </td><td>Active</td><td>Passive</td><td>MMT</td><td>Active</td><td>Passive</td><td>MMT</td></tr>
		<tr><td> Flexion </td>
		<td><?php echo $details['flexion_active']; ?></td>
		<td><?php echo $details['flexion_passive']; ?></td>
		<td><?php echo $details['flexion_mmt']; ?></td>
		<td><?php echo $details['flexion_active1']; ?></td>
		<td><?php echo $details['flexion_passive1']; ?></td>
		<td><?php echo $details['flexion_mmt1']; ?></td>
		</tr>
		<tr><td> Extension </td>
		<td><?php echo $details['extension_active']; ?></td>
		<td><?php echo $details['extension_passive']; ?></td>
		<td><?php echo $details['extension_mmt']; ?></td>
		<td><?php echo $details['extension_active1']; ?></td>
		<td><?php echo $details['extension_passive1']; ?></td>
		<td><?php echo $details['extension_mmt1']; ?></td>
		</tr>
		<tr><td> Abduction </td>
		<td><?php echo $details['abduction_active']; ?></td>
		<td><?php echo $details['abduction_passive']; ?></td>
		<td><?php echo $details['abduction_mmt']; ?></td>
		<td><?php echo $details['abduction_active1']; ?></td>
		<td><?php echo $details['abduction_passive1']; ?></td>
		<td><?php echo $details['abduction_mmt1']; ?></td>
		</tr>
		<tr><td> Adduction </td>
		<td><?php echo $details['adduction_active']; ?></td>
		<td><?php echo $details['adduction_passive']; ?></td>
		<td><?php echo $details['adduction_mmt']; ?></td>
		<td><?php echo $details['adduction_active1']; ?></td>
		<td><?php echo $details['adduction_passive1']; ?></td>
		<td><?php echo $details['adduction_mmt1']; ?></td>
		</tr>
		<tr><td> Internal Rot </td>
		<td><?php echo $details['internalrot_active']; ?></td>
		<td><?php echo $details['internalerot_passive']; ?></td>
		<td><?php echo $details['internalerot_mmt']; ?></td>
		<td><?php echo $details['internalrot_active1']; ?></td>
		<td><?php echo $details['internalerot_passive1']; ?></td>
		<td><?php echo $details['internalerot_mmt1']; ?></td>
		</tr>
		<tr><td> External Rot </td>
		<td><?php echo $details['externalrot_active']; ?></td>
		<td><?php echo $details['externalrot_passive']; ?></td>
		<td><?php echo $details['externalrot_mmt']; ?></td>
		<td><?php echo $details['externalrot_active1']; ?></td>
		<td><?php echo $details['externalrot_passive1']; ?></td>
		<td><?php echo $details['externalrot_mmt1']; ?></td></tr>
		</table>
		<?php } ?>
</br></br>
<?php if($details['painful_left'] != false || $details['painful_right'] != false || $details['supraspinatus_left'] != false || $details['supraspinatus_right'] != false || $details['Hawkins_left'] != false || $details['Hawkins_right'] != false || $details['Infraspinatus_left'] != false || $details['Infraspinatus_right'] != false || $details['Stability_left'] != false || $details['Stability_right'] != false || $details['Subscapularis_left'] != false || $details['Subscapularis_right'] != false || $details['Apprehension_left'] != false || $details['Apprehension_right'] != false || $details['Drop_left'] != false || $details['Drop_right'] != false || $details['Sulcus_left'] != false || $details['Sulcus_right'] != false || $details['right2'] != false){?>
			
<h4>SPECIAL TESTS</h4>

<table border="1" style="width:100%;border-collapse: collapse;">
	<tr><td> Impingement </td><td colspan="2">Result</td><td>Rotator Cuff Testing</td><td colspan="2">Result</td></tr>
		<tr><td>  </td><td>Left</td><td>Right</td><td></td><td>Left</td><td>Right</td></tr>
		<tr><td> Painful Arc </br> Patient: Actively abduct arm Pain between 60º-120º </td>
		<td><?php echo $details['painful_left']; ?></td>
		<td><?php echo $details['painful_right']; ?></td>
		<td>Supraspinatus Test</br>Patient: Sh 90º flex, 45 º horizontal abd, elbow ext, sh IR</br>Therapist: Resist into sh add, patient maintains position</td>
		<td><?php echo $details['supraspinatus_left']; ?></td>
		<td><?php echo $details['supraspinatus_right']; ?></td></tr>
		<tr><td> Hawkins-Kennedy Test</br>Therapist: 90º sh flex, elb flex, sh IR.  Place outer arm under pt arm and on shoulder Sh IR </td>
		<td><?php echo $details['Hawkins_left']; ?></td>
		<td><?php echo $details['Hawkins_right']; ?></td>
		<td>Infraspinatus Test </br>Patient: Arm against body, elbow flexed to 90º  </br>Therapist: Resistance into IR with patient ER arm</td>
		<td><?php echo $details['Infraspinatus_left']; ?></td>
		<td><?php echo $details['Infraspinatus_right']; ?></td></tr>
		<tr><td> Stability Tests </td>
		<td><?php echo $details['Stability_left']; ?></td>
		<td><?php echo $details['Stability_right']; ?></td>
		<td>Subscapularis Test (Lift Off)</br>Patient: Arm behind the back </br>Therapist: Lift arm from body release patient to hold position</td>
		<td><?php echo $details['Subscapularis_left']; ?></td>
		<td><?php echo $details['Subscapularis_right']; ?></td></tr>
		<tr><td> Apprehension Test</br>Therapist: 90º sh abd & 90º elb flex sh ER 90º apply PA force to humerus </td>
		<td><?php echo $details['Apprehension_left']; ?></td>
		<td><?php echo $details['Apprehension_right']; ?></td>
		<td>Drop Arm Test</br>Therapist: Raise arm to 120º abd</br>Patient: Hold position and slowly lower arm down to side</td>
		<td><?php echo $details['Drop_left']; ?></td>
		<td><?php echo $details['Drop_right']; ?></td></tr>
		<tr><td> Sulcus Sign (Multidirectional Instability Test)</br>Therapist: Thumb & middle finger on ant and post acromion, index finger between humeral head & acromion</br>Distract distal humerus with other hand.</td>
		<td><?php echo $details['Sulcus_left']; ?></td>
		<td><?php echo $details['Sulcus_right']; ?></td>
		<td>&nbsp;&nbsp;&nbsp;</td><td><?php echo $details['left2']; ?></td>
		<td>
		<?php echo $details['right2']; ?> 
		</td></tr>
		</table>
<?php } ?>
		</br></br>
<h4>  </h4></br>
		
		<table style="width:95%;">
		<?php if($details['Diagnosis'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;  <strong>Diagnosis : </strong></td>
		<td colspan="3"><?php echo $details['Diagnosis']; ?></td></tr><?php } ?>
			<?php if($details['Treatment'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	<strong>Treatment Plan : <strong></td><td colspan="3"><?php echo $details['Treatment']; ?></td></tr>
            <?php } ?>
			<?php if($details['Therapist'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	<strong>Therapist :	 <strong></td><td colspan="3"><?php echo $details['Therapist']; ?></td></tr>
			<?php } ?>
			</table>

  

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