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
		<?php if($details['Limitation'] != false || $details['injury'] != false || $details['Investigations'] != false || $details['Surgery'] != false){?>
		<h4>Mechanism/onset of pain</h4>
		<?php } ?>
		   <table style="width:95%;">
		   <?php if($details['Limitation'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Limitation of daily/social activities :</td>
		   <td colspan="3"><?php echo $details['Limitation']; ?></td></tr><?php } ?>
			<?php if($details['injury'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Old injury/pain :	</td><td colspan="3"><?php echo $details['injury']; ?> </td></tr><?php } ?>
			<?php if($details['Investigations'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Investigations			:</td><td colspan="3"><?php echo $details['Investigations']; ?></td></tr><?php } ?>
            <?php if($details['Surgery'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Surgery/injections :	</td><td colspan="3"><?php echo $details['Surgery']; ?></td></tr><?php } ?>		
			</table>

		
		</br></br></br></br></br>
		<?php if($details['ant_left'] != false || $details['ant_right'] != false || $details['post_left'] != false || $details['post_right'] != false || $details['med_left'] != false || $details['med_right'] != false || $details['lat_left'] != false || $details['lat_right'] != false || $details['bic_left'] != false || $details['bic_right'] != false || $details['clicking_left'] != false || $details['clicking_right'] != false || $details['stiffness_left'] != false || $details['stiffness_right'] != false || $details['Alignment_left'] != false || $details['Alignment_right'] != false || $details['Swelling_left'] != false || $details['Swelling_right'] != false || $details['Warmth_left'] != false || $details['Warmth_right'] != false || $details['Winging_left'] != false || $details['Winging_right'] != false || $details['atrophy_left'] != false || $details['atrophy_right'] != false || $details['tightness_left'] != false || $details['tightness_right'] != false || $details['deformities_left'] != false || $details['deformities_right'] != false){?>
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
		<?php echo $details['Alignment_left']; ?>
		</td>
		<td>
		<?php echo $details['Alignment_right']; ?></td></tr>
		<tr><td> Swelling    </td><td><?php echo $details['Swelling_left']; ?></td>
		<td><?php echo $details['Swelling_right']; ?></td></tr>
		<tr><td> Warmth    </td>
		<td><?php echo $details['Warmth_left']; ?></td>
		<td><?php echo $details['Warmth_right']; ?></td></tr>
		<tr><td> Winging    </td>
		<td><?php echo $details['Winging_left']; ?></td>
		<td>
		<?php echo $details['Winging_right']; ?></td></tr>
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
		</br></br>
		
		<img src="<?php echo $details['rate']; ?>"> 
		<?php if($details['pain_worst'] != false || $details['at_rest'] != false || $details['heavy'] != false || $details['mvt'] != false || $details['at_night'] != false || $details['pain_type1'] != false || $details['aggrevating'] != false || $details['relieving'] != false){?>
		<h4>Pain Description </h4>
		 
			<table style="width:95%;">
			<?php if($details['rate'] != false){ ?>
			<tr><td>&nbsp;&nbsp;&nbsp; Rate Your Elbow/Wrist Pain: (Circle Number): </td>
			<td colspan="3"><?php echo $details['rate']; ?></td></tr><?php } ?>
			<?php if($details['pain_worst'] != false){ ?>
			<tr><td>&nbsp;&nbsp;&nbsp;	Pain range:	</td><td colspan="3"><?php echo $details['pain_worst']; ?></td></tr>
			<?php } ?>
			<?php if($details['at_rest'] != false){ ?>
			<tr><td>&nbsp;&nbsp;&nbsp;	At Rest :	</td><td colspan="3"><?php echo $details['at_rest']; ?></td></tr>
			<?php } ?>
			<?php if($details['heavy'] != false){ ?>
			<tr><td>&nbsp;&nbsp;&nbsp;	Lifting a heavy object :	</td><td colspan="3"><?php echo $details['heavy']; ?></td></tr>	
			<?php } ?>
			<?php if($details['mvt'] != false){ ?>			
			<tr><td>&nbsp;&nbsp;&nbsp;	When doing a task with repeated elbow/wrist mvt :	</td><td colspan="3"><?php echo $details['mvt']; ?></td></tr>
			<?php } ?>
			<?php if($details['at_night'] != false){ ?>
			<tr><td>&nbsp;&nbsp;&nbsp;	At night /rest :	</td><td colspan="3"><?php echo $details['at_night']; ?></td></tr>			
			<?php } ?>
			<?php if($details['pain_type1'] != false){ ?>
			<tr><td>&nbsp;&nbsp;&nbsp;	Pain type :	</td><td colspan="3"><?php echo $details['pain_type1']; ?></td></tr>						
			<?php } ?>
			<?php if($details['aggrevating'] != false){ ?>
			<tr><td>&nbsp;&nbsp;&nbsp;	Aggravating factors :	</td><td colspan="3"><?php echo $details['aggrevating']; ?></td></tr>						
			<?php } ?>
			<?php if($details['relieving'] != false){ ?>
			<tr><td>&nbsp;&nbsp;&nbsp;	Relieving factors :	</td><td colspan="3"><?php echo $details['relieving']; ?></td></tr>						
			<?php } ?>
			</table>
		<?php } ?>
			</br></br>
		<?php if($details['Tingling'] != false) { ?>
		<h4>Neurological </h4>
		<p>Tingling/ Numbness : <?php echo $details['Tingling']; ?></p>
		<?php } ?>
		</br></br>
		<?php if($details['flexion_active'] != false || $details['flexion_passive'] != false || $details['flexion_mmt'] != false || $details['flexion_active1'] != false || $details['flexion_passive1'] != false || $details['flexion_mmt1'] != false || $details['extension_active'] != false || $details['extension_passive'] != false || $details['extension_mmt'] != false || $details['extension_active1'] != false || $details['extension_passive1'] != false || $details['extension_mmt1'] != false || $details['Pronation_active'] != false || $details['Pronation_passive'] != false || $details['Pronation_mmt'] != false || $details['Pronation_active1'] != false || $details['Pronation_passive1'] != false || $details['Pronation_mmt1'] != false || $details['Supination_active'] != false || $details['Supination_passive'] != false || $details['Supination_mmt'] != false || $details['Supination_active1'] != false || $details['Supination_passive1'] != false || $details['Supination_mmt1'] != false) { ?>
		<h4>EXAMINATION </h4>
		
		<table border="1" style="width:100%;border-collapse: collapse;">
		<tr><td> Elb/wrist </td><td colspan="3"><center>LEFT</center></td><td colspan="3"><center>RIGHT</center></td></tr>
		<tr><td> Movements </td><td>Active</td><td>Passive</td><td>MMT</td><td>Active</td><td>Passive</td><td>MMT</td></tr>
		<tr><td> Flexion </td>
		<td><?php echo $details['flexion_active']; ?></td>
		<td><?php echo $details['flexion_passive']; ?></td>
		<td>
		<?php echo $details['flexion_mmt']; ?></td>
		<td><?php echo $details['flexion_active1']; ?></td>
		<td><?php echo $details['flexion_passive1']; ?></td>
		<td><?php echo $details['flexion_mmt1']; ?></td>
		</tr><tr><td> Extension </td>
		<td><?php echo $details['extension_active']; ?></td>
		<td><?php echo $details['extension_passive']; ?></td>
		<td><?php echo $details['extension_mmt']; ?></td>
		<td><?php echo $details['extension_active1']; ?></td>
		<td><?php echo $details['extension_passive1']; ?></td>
		<td><?php echo $details['extension_mmt1']; ?></td>
		</tr>
		<tr><td> Pronation </td>
		<td><?php echo $details['Pronation_active']; ?></td>
		<td><?php echo $details['Pronation_passive']; ?></td>
		<td><?php echo $details['Pronation_mmt']; ?></td>
		<td><?php echo $details['Pronation_active1']; ?></td>
		<td><?php echo $details['Pronation_passive1']; ?></td>
		<td><?php echo $details['Pronation_mmt1']; ?></td></tr>
		<tr><td> Supination </td>
		<td><?php echo $details['Supination_active']; ?></td>
		<td><?php echo $details['Supination_passive']; ?></td>
		<td><?php echo $details['Supination_mmt']; ?></td>
		<td><?php echo $details['Supination_active1']; ?></td>
		<td><?php echo $details['Supination_passive1']; ?></td>
		<td><?php echo $details['Supination_mmt1']; ?></td></tr>
		</table>
		<?php } ?>
		
</br></br>
<h4></h4>
<?php if($details['Elbow_left'] != false || $details['Elbow_right'] != false || $details['Varuslcl_left'] != false || $details['Varuslcl_right'] != false || $details['Valgusmcl_left'] != false || $details['Valgusmcl_right'] != false || $details['Irritated_left'] != false || $details['Irritated_right'] != false || $details['pronation_left'] != false || $details['pronation_right'] != false || $details['Golfers_left'] != false || $details['Golfers_right'] != false || $details['Wrist_left'] != false || $details['Wrist_right'] != false || $details['Carpal_left'] != false || $details['Carpal_right'] != false || $details['Tinel_left'] != false || $details['Tinel_right'] != false || $details['Finkelstein_left'] != false || $details['Finkelstein_right'] != false) { ?>
		
<table border="1" style="width:100%;border-collapse: collapse;">
		<tr><td> Special Tests</td><td>Left</td><td>Right</td></tr>
		<tr><td> Elbow </td>
		<td><?php echo $details['Elbow_left']; ?></td>
		<td><?php echo $details['Elbow_right']; ?></td></tr>
		<tr><td> Varus Stress Test (LCL)</br>Elbow in slight flexion Apply lateral force to arm and medial force to forearm. </td>
		<td><?php echo $details['Varuslcl_left']; ?></td>
		<td><?php echo $details['Varuslcl_right']; ?></td></tr>
		<tr><td> Valgus Stress Test (MCL)</br>Elbow in slight flexion  Apply medial force to arm and lateral force to forearm. </td>
		<td><?php echo $details['Valgusmcl_left']; ?></td>
		<td><?php echo $details['Valgusmcl_right']; ?></td></tr>
		<tr><td> Tinel's Sign (Irritated Nerve)</br>Repeated tapping over nerve </td>
		<td><?php echo $details['Irritated_left']; ?></td>
		<td><?php echo $details['Irritated_right']; ?></td></tr>
		<tr><td> Mills' Test (Lateral Epicondylitis)</br>Forearm pronation wrist flexion elbow extension </td>
		<td><?php echo $details['pronation_left']; ?></td>
		<td><?php echo $details['pronation_right']; ?></td></tr>
		<tr><td> Golfers Elbow Test (Medial Epicondylitis)</br>(A) Forearm supination wrist extension elbow extension</br>(B) Resisted wrist and elbow flexion</td>
		<td><?php echo $details['Golfers_left']; ?></td>
		<td><?php echo $details['Golfers_right']; ?></td></tr>
		<tr><td> Wrist </td><td><?php echo $details['Wrist_left']; ?></td>
		<td><?php echo $details['Wrist_right']; ?></td></tr>
		<tr><td> Phalen's Test (Carpal Tunnel Syndrome)</br>Push dorsal surface of hands together. Hold for 60 sec</td>
		<td><?php echo $details['Carpal_left']; ?></td>
		<td><?php echo $details['Carpal_right']; ?></td></tr>
		<tr><td> Tinel's Sign (Irritated Nerve)</br>Repeated tapping over nerve</td>
		<td><?php echo $details['Tinel_left']; ?></td>
		<td><?php echo $details['Tinel_right']; ?></td></tr>
		<tr><td> Finkelstein's Test (De Quervain’s tenosynovitis)</br>Form a fist around thumb ulnar deviation</td>
		<td><?php echo $details['Finkelstein_left']; ?></td>
		<td><?php echo $details['Finkelstein_right']; ?></td></tr>
		</table>
<?php } ?>
		</br></br>
<h4>  </h4></br>
		
		<table style="width:95%;">
		<?php if($details['Diagnosis'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;  <strong>Diagnosis : </strong></td>
		<td colspan="3"><?php echo $details['Diagnosis']; ?></td></tr><?php } ?>
			<?php if($details['Treatment'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	<strong>Treatment Plan : <strong></td><td colspan="3"><?php echo $details['Treatment']; ?></td></tr><?php } ?>
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