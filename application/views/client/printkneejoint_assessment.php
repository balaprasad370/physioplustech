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
	 
        <center><h3 style="text-align:center;"><b>Knee Joint Assessment</b></center></h3>
	
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
			:</td><td colspan="3"><?php echo date('d-m-Y',strtotime($details['social'])); ?></td></tr>
          
		  </table>
		</br></br></br></br></br>
		<?php if($details['social'] != false || $details['injury'] != false || $details['Investigations'] != false || $details['procedures'] != false){?>
		<h4>Mechanism/onset of pain</h4>
		<?php } ?>
		   <table style="width:95%;">
		  <?php if($details['social'] != false){?> <tr><td>&nbsp;&nbsp;&nbsp;	Limitation of daily/social activities :</td><td colspan="3"><?php echo $details['social']; ?></td></tr><?php } ?>
			<?php if($details['injury'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Old injury/pain :	</td><td colspan="3"><?php echo $details['injury']; ?></td></tr><?php } ?>
			<?php if($details['Investigations'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Investigations			:</td><td colspan="3"><?php echo $details['Investigations']; ?></td></tr><?php } ?>
            <?php if($details['procedures'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Surgery/injections :	</td><td colspan="3"><?php echo $details['procedures']; ?></td></tr><?php } ?>	
			</table>

		
		</br></br></br></br></br>
		<h4></h4>
		
		<table border="1" style="width:100%;border-collapse: collapse;">
		<?php if($details['antl_active'] != false || $details['antl_passive'] != false || $details['antr_active'] != false || $details['antr_passive'] != false || $details['postl_active'] != false || $details['postl_passive'] != false || $details['postr_active'] != false || $details['postr_passive'] != false || $details['medl_active'] != false || $details['medl_passive'] != false || $details['medr_active'] != false || $details['medr_passive'] != false || $details['latl_active'] != false || $details['latl_passive'] != false || $details['latr_active'] != false || $details['latr_passive'] != false){?>
		<tr><td><strong>Pain Area</strong> </td><td colspan="2">Left</td><td colspan="2">Right</td></tr>
		<tr><td> Ant </td>
		<td><?php echo $details['antl_active']; ?></td>
		<td><?php echo $details['antl_passive']; ?></td>
		<td><?php echo $details['antr_active']; ?></td>
		<td><?php echo $details['antr_passive']; ?></td></tr>
		<tr><td> Post  </td>
		<td><?php echo $details['postl_active']; ?></td>
		<td><?php echo $details['postl_passive']; ?></td>
		<td><?php echo $details['postr_active']; ?></td>
		<td><?php echo $details['postr_passive']; ?></td></tr>
		<tr><td> Med   </td>
		<td><?php echo $details['medl_active']; ?></td>
		<td><?php echo $details['medl_passive']; ?></td>
		<td><?php echo $details['medr_active']; ?></td>
		<td><?php echo $details['medr_passive']; ?></td></tr>
		<tr><td> Lat  </td>
		<td><?php echo $details['latl_active']; ?></td>
		<td><?php echo $details['latl_passive']; ?></td>
		<td><?php echo $details['latr_active']; ?></td>
		<td><?php echo $details['latr_passive']; ?></td></tr>
		<?php } ?>
		<?php if($details['clickingl_active'] != false || $details['clickingl_passive'] != false || $details['clickingr_active'] != false || $details['clickingr_passive'] != false || $details['wayl_active'] != false || $details['wayl_passive'] != false || $details['wayr_active'] != false || $details['wayr_passive'] != false || $details['lockingl_active'] != false || $details['lockingl_passive'] != false || $details['lockingr_active'] != false || $details['lockingr_passive'] != false || $details['gratingl_active'] != false || $details['gratingl_passive'] != false || $details['gratingr_active'] != false || $details['gratingr_passive'] != false || $details['stiffl_active'] != false || $details['stiffl_passive'] != false || $details['stiffr_active'] != false || $details['stiffr_passive'] != false){?>
		<tr><td colspan="3"> <strong>Objective </strong>   </td></tr>
		<tr><td> Clicking    </td>
		<td><?php echo $details['clickingl_active']; ?></td>
		<td><?php echo $details['clickingl_passive']; ?></td>
		<td><?php echo $details['clickingr_active']; ?></td>
		<td><?php echo $details['clickingr_passive']; ?></td></tr>
		<tr><td> Giving way     </td>
		<td><?php echo $details['wayl_active']; ?></td>
		<td><?php echo $details['wayl_passive']; ?></td>
		<td><?php echo $details['wayr_active']; ?></td>
		<td><?php echo $details['wayr_passive']; ?></td></tr>
		<tr><td> Locking     </td>
		<td><?php echo $details['lockingl_active']; ?></td>
		<td><?php echo $details['lockingl_passive']; ?></td>
		<td><?php echo $details['lockingr_active']; ?></td>
		<td><?php echo $details['lockingr_passive']; ?></td></tr>
		<tr><td> Grating    </td>
		<td><?php echo $details['gratingl_active']; ?></td>
		<td><?php echo $details['gratingl_passive']; ?></td>
		<td><?php echo $details['gratingr_active']; ?></td>
		<td><?php echo $details['gratingr_passive']; ?></td></tr>
		<tr><td> Stiffness    </td>
		<td><?php echo $details['stiffl_active']; ?></td>
		<td><?php echo $details['stiffl_passive']; ?></td>
		<td><?php echo $details['stiffr_active']; ?></td>
		<td><?php echo $details['stiffr_passive']; ?></td></tr>
		<?php } ?>
		<?php if($details['warml_active'] != false || $details['warml_passive'] != false || $details['warmr_active'] != false || $details['warmr_passive'] != false || $details['swell_active'] != false || $details['swell_passive'] != false || $details['swellr_active'] != false || $details['swellr_passive'] != false || $details['skinl_active'] != false || $details['skinl_passive'] != false || $details['skinr_active'] != false || $details['skinr_passive'] != false || $details['atrophyl_active'] != false || $details['atrophyl_passive'] != false || $details['atrophyr_active'] != false || $details['atrophyr_passive'] != false || $details['tightnessl_active'] != false || $details['tightnessl_passive'] != false || $details['tightnessr_active'] != false || $details['tightnessr_passive'] != false || $details['trackingl_active'] != false || $details['trackingl_passive'] != false || $details['trackingr_active'] != false || $details['trackingr_passive'] != false){?>
		
		<tr><td colspan="3"><strong> Observation </strong>    </td></tr>
		<tr><td> Warmth    </td>
		<td><?php echo $details['warml_active']; ?></td>
		<td><?php echo $details['warml_passive']; ?></td>
		<td><?php echo $details['warmr_active']; ?></td>
		<td><?php echo $details['warmr_passive']; ?></td></tr>
		<tr><td> Swelling    </td>
		<td><?php echo $details['swell_active']; ?></td>
		<td><?php echo $details['swell_passive']; ?></td>
		<td><?php echo $details['swellr_active']; ?></td>
		<td><?php echo $details['swellr_passive']; ?></td></tr>
		<tr><td> Skin changes    </td>
		<td><?php echo $details['skinl_active']; ?></td>
		<td><?php echo $details['skinl_passive']; ?></td>
		<td><?php echo $details['skinr_active']; ?></td>
		<td><?php echo $details['skinr_passive']; ?></td></tr>
		<tr><td> Muscle atrophy </td>
		<td><?php echo $details['atrophyl_active']; ?></td>
		<td><?php echo $details['atrophyl_passive']; ?></td>
		<td><?php echo $details['atrophyr_active']; ?></td>
		<td><?php echo $details['atrophyr_passive']; ?></td></tr>
		<tr><td> Muscle Tightness    </td>
		<td><?php echo $details['tightnessl_active']; ?></td>
		<td><?php echo $details['tightnessl_passive']; ?></td>
		<td><?php echo $details['tightnessr_active']; ?></td>
		<td><?php echo $details['tightnessr_passive']; ?></td></tr>
		<tr><td> Patellar tracking   </td>
		<td><?php echo $details['trackingl_active']; ?></td>
		<td><?php echo $details['trackingl_passive']; ?></td>
		<td><?php echo $details['trackingr_active']; ?></td>
		<td><?php echo $details['trackingr_passive']; ?></td></tr>
		<?php } ?>
		</table>

		
		</br>
		<img src="<?php echo $details['chart']; ?>"> 
		</br></br>
		<?php if($details['pain_scale'] != false || $details['categories'] != false || $details['worse'] != false || $details['Aggravating_factors'] != false || $details['Relieving_factors'] != false){?>
		<h4>Pain Description </h4>
		<?php } ?>
			<table style="width:95%;">
			<?php if($details['pain_scale'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;  Pain scale (0-10): </td>
		   <td colspan="3"><?php echo $details['pain_scale']; ?></td></tr><?php } ?>	
			<?php if($details['categories'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Pain type :	</td><td colspan="3"><?php echo $details['categories']; ?></td></tr><?php } ?>	
			<?php if($details['worse'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Pain worse :	</td><td colspan="3"><?php echo $details['worse']; ?></td></tr><?php } ?>	
			<?php if($details['Aggravating_factors'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Aggravating factors :	</td><td colspan="3"><?php echo $details['Aggravating_factors']; ?></td></tr><?php } ?>	
			<?php if($details['Relieving_factors'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Relieving factors :	</td><td colspan="3"><?php echo $details['Relieving_factors']; ?></td></tr><?php } ?>	
			
			</table>
			</br></br>
			<?php if($details['posture'] != false || $details['Walking'] != false || $details['bearing'] != false ){?>
			<h4>FUNCTIONAL </h4>
			<?php } ?>
			<table style="width:95%;"> 
			<?php if($details['posture'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Standing posture :	</td><td colspan="3"><?php echo $details['posture']; ?></td></tr><?php } ?>
			<?php if($details['Walking'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Walking aid/brace :	</td><td colspan="3"><?php echo $details['Walking']; ?></td></tr><?php } ?>
			<?php if($details['bearing'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Gait/Wt.bearing :	</td><td colspan="3"><?php echo $details['bearing']; ?></td></tr><?php } ?>			
			 
			</table>
			</br></br>
			<?php if($details['flexl_active'] != false || $details['flexl_passive'] != false || $details['flexl_mmt'] != false || $details['flexr_active'] != false || $details['flexr_passive'] != false || $details['flexr_mmt'] != false || $details['exl_active'] != false || $details['exl_passive'] != false || $details['exl_mmt'] != false || $details['exr_active'] != false || $details['exr_passive'] != false || $details['exr_mmt'] != false || $details['anklel_active'] != false || $details['anklel_passive'] != false || $details['anklel_mmt'] != false || $details['ankler_active'] != false || $details['ankler_passive'] != false || $details['ankler_mmt'] != false || $details['hipl_active'] != false || $details['hipl_passive'] != false || $details['hipl_mmt'] != false || $details['hipr_active'] != false || $details['hipr_passive'] != false || $details['hipr_mmt'] != false){?>
		<h4>EXAMINATION </h4>
		
		<table border="1" style="width:100%;border-collapse: collapse;">
		<tr><td>  </td><td colspan="3">Left</td><td colspan="3">Right</td></tr>
		<tr><td>  </td><td colspan="2">R.O.M</td><td rowspan="2"><center>MMT</center></td><td colspan="2">R.O.M</td><td rowspan="2"><center>MMT</center></td></tr>
		<tr><td>  </td><td>Active</td><td>Passive</td><td>Active</td><td>Passive</td></tr>
		<tr><td> Flexion </td>
		<td><?php echo $details['flexl_active']; ?></td>
		<td><?php echo $details['flexl_passive']; ?></td>
		<td><?php echo $details['flexl_mmt']; ?></td>
		<td><?php echo $details['flexr_active']; ?></td>
		<td><?php echo $details['flexr_passive']; ?></td>
		<td><?php echo $details['flexr_mmt']; ?></td>
		</tr>
		<tr><td> Extension  </td>
		<td><?php echo $details['exl_active']; ?></td>
		<td><?php echo $details['exl_passive']; ?></td>
		<td><?php echo $details['exl_mmt']; ?></td>
		<td><?php echo $details['exr_active']; ?></td>
		<td><?php echo $details['exr_passive']; ?></td>
		<td><?php echo $details['exr_mmt']; ?></td></tr>
		<tr><td> Ankle   </td>
		<td><?php echo $details['anklel_active']; ?></td>
		<td><?php echo $details['anklel_passive']; ?></td>
		<td><?php echo $details['anklel_mmt']; ?></td>
		<td><?php echo $details['ankler_active']; ?></td>
		<td><?php echo $details['ankler_passive']; ?></td>
		<td><?php echo $details['ankler_mmt']; ?></td></tr>
		<tr><td> Hip  </td>
		<td><?php echo $details['hipl_active']; ?></td>
		<td><?php echo $details['hipl_passive']; ?></td>
		<td><?php echo $details['hipl_mmt']; ?></td>
		<td><?php echo $details['hipr_active']; ?></td>
		<td><?php echo $details['hipr_passive']; ?></td>
		<td><?php echo $details['hipr_mmt']; ?></td></tr>		
		</table>
			<?php } ?>
		</br></br>
		<?php if($details['ant_left'] != false || $details['ant_right'] != false || $details['post_left'] != false || $details['post_right'] != false || $details['McMurrays_left'] != false || $details['McMurrays_right'] != false || $details['Pivot_left'] != false || $details['Pivot_right'] != false || $details['Patellar_left'] != false || $details['Patellar_right'] != false || $details['Varusmcl_left'] != false || $details['Varusmcl_right'] != false || $details['Lachman_left'] != false || $details['Lachman_right'] != false || $details['Popliteal_left'] != false || $details['Popliteal_right'] != false || $details['Valgus_left'] != false || $details['Valgus_right'] != false){?>
		<h4>Special TESTS</h4>
		
		<table border="1" style="width:100%;border-collapse: collapse;">
		<tr>
		<th>TESTS</th>
		<th>Description</th>
		<th>Left</th>
		<th>Right</th>
		</tr>
		<tr>
		<td> Ant. Draw (ACL)</td>
		<td>Bend knee, stabilize foot pull tibia and fibula anteriorly</td>
		<td><?php echo $details['ant_left']; ?></td>
		<td><?php echo $details['ant_right']; ?></td>
		</tr>
		<tr>
		<td>Post Draw (PCL)</td>
		<td>Bend knee, stabilize foot push tibia and fibula posteriorly</td>
		<td><?php echo $details['post_left']; ?></td>
		<td><?php echo $details['post_right']; ?></td>
		</tr>
		<tr>
		<td>McMurrays Test (M/L Meniscus)</td>
		<td>Medial: Bend knee fully, ER foot apply valgus force  ext knee </br> Lateral: Bend knee fully, IR foot apply varus force ext knee </td>
		<td><?php echo $details['McMurrays_left']; ?></td>
		<td><?php echo $details['McMurrays_right']; ?> </td>
		</tr>
		<tr>
		<td>Pivot shift</td>
		<td>Hold heel IR foot, apply axial load and valgus force flex knee</td>
		<td><?php echo $details['Pivot_left']; ?></td>
		<td><?php echo $details['Pivot_right']; ?> </td>
		</tr>
		<tr>
		<td>Patellar glide</td>
		<td>Hold both sides of patella with thumb and index move in various directions </td>
		<td><?php echo $details['Patellar_left']; ?></td>
		<td><?php echo $details['Patellar_right']; ?> </td>
		</tr>
		<tr>
		<td>Varus Stress Test (MCL)</td>
		<td>One hand on inner thigh applying lateral force, one on outer leg applying medial force</td>
		<td><?php echo $details['Varusmcl_left']; ?></td>
		<td><?php echo $details['Varusmcl_right']; ?> </td>
		</tr>
		<tr>
		<td>Lachman</td>
		<td>Flex knee to 30º Pull tibia anteriorly with other hand on ant thigh</td>
		<td><?php echo $details['Lachman_left']; ?></td>
		<td><?php echo $details['Lachman_right']; ?></td>
		</tr>
		<tr>
		<td>Popliteal test</td>
		<td>Flex hip to 90º, extend knee maximally</td>
		<td><?php echo $details['Popliteal_left']; ?></td>
		<td><?php echo $details['Popliteal_right']; ?></td>
		</tr>
		<tr>
		<td>Valgus Stress Test (MCL)</td>
		<td>Lying supine, ensures a neutral pelvis position with knees flexed and straighten legs.</br> Give a short tug on patients ankles and compare leg length.</td>
		<td><?php echo $details['Valgus_left']; ?></td>
		<td><?php echo $details['Valgus_right']; ?></td>
		</tr>
  
		</table><?php } ?>
</br></br>

<h4>  </h4></br>
		
		<table style="width:95%;">
            <?php if($details['Diagnosis'] != false){?> <tr><td>&nbsp;&nbsp;&nbsp;  <strong>Diagnosis : </strong></td><td colspan="3"><?php echo $details['Diagnosis']; ?></td></tr><?php } ?>
			 <?php if($details['Treatment'] != false){?> <tr><td>&nbsp;&nbsp;&nbsp;	<strong>Treatment Plan : <strong></td><td colspan="3"><?php echo $details['Treatment']; ?></td></tr><?php } ?>
             <?php if($details['Therapist'] != false){?> <tr><td>&nbsp;&nbsp;&nbsp;	<strong>Therapist :	 <strong></td><td colspan="3"><?php echo $details['Therapist']; ?></td></tr><?php } ?>
			
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