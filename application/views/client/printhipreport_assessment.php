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
	 <center><h3 style="text-align:center;"><b>Hip Assessment</b></center></h3>
	<?php if($details1 != false){ foreach($details1 as $details){ ?>
    <hr>
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
			:</td><td colspan="3"><?php  echo date('d-m-Y',strtotime($details['assess_date'])); ?></td></tr>
      </table>
	</br></br></br></br></br>
	<?php if($details['social'] != false || $details['Investigations'] != false || $details['injury'] != false || $details['Surgery'] != false){?>
		 <h4>Mechanism/onset of pain </h4>
		 <?php } ?>
		   <table style="width:95%;">
		   <?php if($details['social'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Limitation of daily/social activities :</td>
		  
		   <td colspan="3"><?php echo $details['social']; ?></td></tr><?php } ?>
			<?php if($details['Investigations'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Investigations			:</td><td colspan="3"><?php echo $details['Investigations']; ?></td></tr>
            <?php } ?>
			<?php if($details['injury'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Old injury/pain :	</td><td colspan="3"><?php echo $details['injury']; ?></td></tr>
			<?php } ?>
			<?php if($details['Surgery'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Surgery/procedures :	</td><td colspan="3"><?php echo $details['Surgery']; ?></td></tr><?php } ?>
			</table>
			</br>
			<?php if($details['chart'] != false){?>
		 <img src="<?php echo $details['chart']; ?>">
			<?php } ?>		 
		</br></br>
		<?php if($details['Warmth'] != false || $details['Edema'] != false || $details['Skin'] != false || $details['m_atrophy'] != false || $details['Tightness'] != false || $details['Snapping'] != false){?>
		<h4> Area of Pain : </h4> 
		<h4> Objective : </h4></br>
		<?php } ?>
		<table style="width:95%;">
		    <?php if($details['Warmth'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;  Warmth :</td><td colspan="3"><?php echo $details['Warmth']; ?></td></tr><?php } ?>	
			<?php if($details['Edema'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Edema			:</td><td colspan="3"><?php echo $details['Edema']; ?></td></tr>	<?php } ?>	
           <?php if($details['Skin'] != false){?> <tr><td>&nbsp;&nbsp;&nbsp;	Skin changes :	</td><td colspan="3"><?php echo $details['Skin']; ?></td></tr>	<?php } ?>	
			<?php if($details['m_atrophy'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Muscle atrophy :	</td><td colspan="3"><?php echo $details['m_atrophy']; ?></td></tr>	<?php } ?>	
			<?php if($details['Tightness'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Tightness :	</td><td colspan="3"><?php echo $details['Tightness']; ?></td></tr>	<?php } ?>	
			<?php if($details['Snapping'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Clicking/Snapping :	</td><td colspan="3"><?php echo $details['Snapping']; ?></td></tr>	<?php } ?>		
			
			</table>
			</br></br>
			<?php if($details['pain_scale'] != 5 || $details['duration'] != false || $details['category'] != false || $details['worse'] != false || $details['Aggravating'] != false || $details['Relieving'] != false){?>
			<h4>Pain Description </h4>
			
			<table style="width:95%;">
			<?php if($details['pain_scale'] != 5){  ?><tr><td>&nbsp;&nbsp;&nbsp;  Pain scale (0-10) : </td><td colspan="3"><?php echo $details['pain_scale']; ?></td></tr><?php } ?>
			<?php if($details['duration'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Pain duration			:</td><td colspan="3"><?php echo $details['duration']; ?></td></tr><?php } ?>
            <?php if($details['category'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Pain type :	</td><td colspan="3"><?php echo $details['category']; ?></td></tr><?php } ?>
			<?php if($details['worse'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Pain worse :	</td><td colspan="3"><?php echo $details['worse']; ?></td></tr><?php } ?>
			<?php if($details['Aggravating'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Aggravating factors :	</td><td colspan="3"><?php echo $details['Aggravating']; ?></td></tr><?php } ?>		
			<?php if($details['Relieving'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Relieving factors :	</td><td colspan="3"><?php echo $details['Relieving']; ?></td></tr><?php } ?>			
			
			</table>
			<?php } ?>
		
		</br></br>
		<?php if($details['Deformities'] != false){?><h4>Contractures/Deformities : <?php echo $details['Deformities']; ?></h4><?php } ?>
		<?php if($details['Limb'] != false){?>
		<h4>Functional</h4>
		<h4>Limb alignment: <?php echo $details['Limb']; ?></h4><?php } ?>
		
		</br></br>
		
		<?php if($details['Stance'] != false || $details['Swing'] != false || $details['Walking'] != false || $details['Weight'] != false){?>
		<h4>Gait </h4>
		<?php } ?>
		</br></br>
		
		<table>  
		<tr>
		<?php if($details['Stance'] != false){?>
		
		<td><b>Stance phase :</b></td>
		<td colspan="3"><?php echo $details['Stance']; ?></td>
		<td></td><td></td><td></td><td></td><td></td><td></td>
		<td></td><td></td><td></td><td></td><td></td><td></td>
		<td></td><td></td><td></td><td></td><td></td><td></td>
		<td></td><td></td><td></td><td></td><td></td><td></td>
		<td></td><td></td><td></td><td></td><td></td><td></td>
		<?php } ?>
		<?php if($details['Swing'] != false){?>
		
		<td colspan="3"><b>Swing phase	:</b></td>
		<td><?php echo $details['Swing']; ?></td>
		<?php } ?>
		</tr>
		
		<tr>
		<?php if($details['Walking'] != false){?>
		
		<td><b>Walking aid/Brace :</b></td>
		<td colspan="3"><?php echo $details['Walking']; ?></td>
		<td></td><td></td><td></td><td></td><td></td><td></td>
		<td></td><td></td><td></td><td></td><td></td><td></td>
		<td></td><td></td><td></td><td></td><td></td><td></td>
		<td></td><td></td><td></td><td></td><td></td><td></td>
		<td></td><td></td><td></td><td></td><td></td><td></td>
		<?php } ?>
		<?php if($details['Weight'] != false){?>
		
		<td colspan="3"><b>Weight bearing :</b></td>
		<td><?php echo $details['Weight']; ?></td>
		<?php } ?>
		</tr>
		</table>
		
		<br/>
		<?php if($details['flexl_active'] != false || $details['flexl_passive'] != false || $details['flexl_mmt'] != false || $details['flexr_active'] != false || $details['flexr_passive'] != false || $details['flexr_mmt'] != false || $details['exl_active'] != false || $details['exl_passive'] != false || $details['exl_mmt'] != false || $details['exr_active'] != false || $details['exr_passive'] != false || $details['exr_mmt'] != false || $details['abduction1_active'] != false || $details['abduction1_passive'] != false || $details['abduction1_mmt'] != false || $details['abductionr_active'] != false || $details['abductionr_passive'] != false || $details['abductionr_mmt'] != false || $details['adductionl_active'] != false || $details['adductionl_passive'] != false || $details['adductionl_mmt'] != false || $details['adductionr_active'] != false || $details['adductionr_passive'] != false || $details['adductionr_mmt'] != false || $details['irotl_active'] != false || $details['irotl_passive'] != false || $details['irotl_mmt'] != false || $details['irotr_active'] != false || $details['irotr_passive'] != false || $details['irotr_mmt'] != false || $details['erotl_active'] != false || $details['erotl_passive'] != false || $details['erotl_mmt'] != false || $details['erotr_active'] != false || $details['erotr_passive'] != false){?>
	  <table border="1" style="width:100%;border-collapse: collapse;"> 
				
		<tr><td>RANGE OF MOTION  </td><td colspan="3">Left</td><td colspan="3">Right</td></tr>
		<tr><td>  </td><td>Active</td><td>Passive</td><td>MMT</td><td>Active</td><td>Passive</td><td>MMT</td></tr>
		
		<tr><td> Flexion </td><td><?php echo $details['flexl_active']; ?></td><td><?php echo $details['flexl_passive']; ?></td><td><?php echo $details['flexl_mmt']; ?></td><td><?php echo $details['flexr_active']; ?></td><td><?php echo $details['flexr_passive']; ?></td><td><?php echo $details['flexr_mmt']; ?></td></tr>
		<tr><td> Extension  </td><td><?php echo $details['exl_active']; ?></td><td><?php echo $details['exl_passive']; ?> </td><td><?php echo $details['exl_mmt']; ?></td><td><?php echo $details['exr_active']; ?></td><td><?php echo $details['exr_passive']; ?></td><td><?php echo $details['exr_mmt']; ?></td></tr>
		<tr><td> Abduction   </td><td><?php echo $details['abduction1_active']; ?></td><td><?php echo $details['abduction1_passive']; ?> </td><td><?php echo $details['abduction1_mmt']; ?></td><td><?php echo $details['abductionr_active']; ?></td><td><?php echo $details['abductionr_passive']; ?></td><td><?php echo $details['abductionr_mmt']; ?> </td></tr>
		<tr><td> Adduction  </td><td><?php echo $details['adductionl_active']; ?></td><td><?php echo $details['adductionl_passive']; ?></td><td><?php echo $details['adductionl_mmt']; ?></td><td><?php echo $details['adductionr_active']; ?> </td><td><?php echo $details['adductionr_passive']; ?></td><td><?php echo $details['adductionr_mmt']; ?> </td></tr>
		<tr><td> Internal Rot </td><td><?php echo $details['irotl_active']; ?></td><td><?php echo $details['irotl_passive']; ?></td><td><?php echo $details['irotl_mmt']; ?></td><td><?php echo $details['irotr_active']; ?></td><td><?php echo $details['irotr_passive']; ?></td><td><?php echo $details['irotr_mmt']; ?></td></tr>
		<tr><td> External Rot  </td><td><?php echo $details['erotl_active']; ?></td><td><?php echo $details['erotl_passive']; ?></td><td><?php echo $details['erotl_mmt']; ?></td><td><?php echo $details['erotr_active']; ?></td><td><?php echo $details['erotr_passive']; ?></td><td><?php echo $details['erotr_active']; ?></td></tr>
		</table>
		</br></br>
		<?php } ?>
		<?php if($details['Trendelenburg_left'] != false || $details['Trendelenburg_right'] != false || $details['Fabers_left'] != false || $details['Fabers_right'] != false || $details['Bursitis_left'] != false || $details['Bursitis_right'] != false || $details['Piriformis_left'] != false || $details['Piriformis_right'] != false || $details['Thomas_left'] != false || $details['Thomas_right'] != false || $details['Ober_left'] != false || $details['Ober_right'] != false || $details['Leg_left'] != false || $details['Leg_right'] != false){?>
		<h4>HIP TESTS</h4>
		<?php } ?>
		<table border="1" style="width:100%;border-collapse: collapse;">
		<?php if($details['Trendelenburg_left'] != false || $details['Trendelenburg_right'] != false || $details['Fabers_left'] != false || $details['Fabers_right'] != false || $details['Bursitis_left'] != false || $details['Bursitis_right'] != false || $details['Piriformis_left'] != false || $details['Piriformis_right'] != false || $details['Thomas_left'] != false || $details['Thomas_right'] != false || $details['Ober_left'] != false || $details['Ober_right'] != false || $details['Leg_left'] != false || $details['Leg_right'] != false){?>
		<tr>
		<th>TESTS</th>
		<th>Procedure</th>
		<th>Left</th>
		<th>Right</th>
		</tr>
		<?php } ?>
		<?php if($details['Trendelenburg_left'] != false || $details['Trendelenburg_right'] != false){?>
		<tr>
		<td>Trendelenburg</br>Glut med weakness</td>
		<td>Patient goes into SLS. Observe for hip drop.</td>
		<td><?php echo $details['Trendelenburg_left']; ?></td>
		<td><?php echo $details['Trendelenburg_right']; ?></td>
		</tr>
		<?php } ?>
		<?php if($details['Fabers_left'] != false || $details['Fabers_right'] != false){?>
		<tr>
		<td>Faber’s (Patrick)</td>
		<td>Place patient’s foot onto the opposite knee Stabilize opp hip & apply force into abd, ER and posteriorly</td>
		<td><?php echo $details['Fabers_left']; ?></td>
		<td><?php echo $details['Fabers_right']; ?></td>
		</tr>
		<?php } ?>
		<?php if($details['Bursitis_left'] != false || $details['Bursitis_right'] != false){?>
		<tr>
		<td>Sign of the Buttock</br>Bursitis, tight glut max.or tight post capsule</td>
		<td>Perform SLR test to max range. With knee flexed, flex hip Assess if further hip flexion can be achieved</td>
		<td><?php echo $details['Bursitis_left']; ?></td>
		<td><?php echo $details['Bursitis_right']; ?> </td>
		</tr>
		<?php } ?>
		<?php if($details['Piriformis_left'] != false || $details['Piriformis_right'] != false){?>
		<tr>
		<td>Piriformis</td>
		<td>Patient in side lying. Leg to be tested on top. 60 hip flex & 90 knee flex apply add force at knee</td>
		<td><?php echo $details['Piriformis_left']; ?></td>
		<td><?php echo $details['Piriformis_right']; ?> </td>
		</tr>
		<?php } ?>
		<?php if($details['Thomas_left'] != false || $details['Thomas_right'] != false){?>
		<tr>
		<td>Thomas</br> Tight iliopsoas n rectus femoris</td>
		<td>Patient in side lying. Leg to be tested on top. 60 hip flex & 90 knee flex apply add force at knee</td>
		<td><?php echo $details['Thomas_left']; ?></td>
		<td><?php echo $details['Thomas_right']; ?> </td>
		</tr>
		<?php } ?>
		<?php if($details['Ober_left'] != false || $details['Ober_right'] != false){?>
		<tr>
		<td>Ober’s</br> Tight ITB</td>
		<td>Patient in side lying. Leg to be tested on top. Hip passively extended with knee in flex abd hip and stabilize pelvis in a neutral position. Release the leg, allowing it to adduct.</td>
		<td><?php echo $details['Ober_left']; ?></td>
		<td><?php echo $details['Ober_right']; ?> </td>
		</tr>
		<?php } ?>
		<?php if($details['Leg_left'] != false || $details['Leg_right'] != false){?>
		<tr>
		<td>Leg Length</td>
		<td>Lying supine, ensures a neutral pelvis position with knees flexed and straighten legs. Give a short tug on patients ankles and compare leg length.</td>
		<td><?php echo $details['Leg_left']; ?></td>
		<td><?php echo $details['Leg_right']; ?></td>
		</tr>
		<?php } ?>
  
</table>
</br></br>

<h4>  </h4></br>
		
		<table style="width:95%;">
		  <?php if($details['Diagnosis'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;  <strong>Diagnosis : </strong></td><td colspan="3"><?php echo $details['Diagnosis']; ?></td></tr><?php } ?>
			<?php if($details['Treatment'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	<strong>Treatment Plan : <strong></td><td colspan="3"><?php echo $details['Treatment']; ?></td></tr><?php } ?>
           <?php if($details['Therapist'] != false){?> <tr><td>&nbsp;&nbsp;&nbsp;	<strong>Therapist :	 <strong></td><td colspan="3"><?php echo $details['Therapist']; ?></td></tr><?php } ?>
			
			</table>
	<?php }	} ?>

  

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