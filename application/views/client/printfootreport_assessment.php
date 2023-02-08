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
	<hr>
	<?php if($details1 != false) { foreach($details1 as $details) { ?>
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
		
		<?php if($details['social'] != false || $details['injury'] != false || $details['procedures'] != false){?>
		<h4>Mechanism/onset of pain</h4>
		<?php } ?>
		   <table style="width:95%;">
		   <?php if($details['social'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Limitation of daily/social activities :</td>
		   <td colspan="3"><?php echo $details['social']; ?></td></tr><?php } ?>
			<?php if($details['injury'] != false){?><<tr><td>&nbsp;&nbsp;&nbsp;	Old injury/pain :	</td><td colspan="3"><?php echo $details['injury']; ?> </td></tr>
			<?php } ?>
            <?php if($details['procedures'] != false){?><<tr><td>&nbsp;&nbsp;&nbsp;	Surgery/procedures :	</td><td colspan="3"><?php echo $details['procedures']; ?></td></tr><?php } ?>			
			</table>
			<img src="<?php echo $details['chart']; ?>">
			
			<?php if($details['pain_scale'] != false || $details['duration'] != false || $details['category'] != false || $details['Aggravating'] != false || $details['Relieving'] != false){?>
		
			<h4>Pain Description </h4>
			<?php } ?>
			<table style="width:95%;">
			<?php if($details['pain_scale'] != false) { ?><tr><td>&nbsp;&nbsp;&nbsp;  Pain scale (0-10): :</td>
			<td colspan="3"><?php echo $details['pain_scale']; ?></td></tr><?php } ?>
			<?php if($details['duration'] != false) { ?><tr><td>&nbsp;&nbsp;&nbsp;	Pain duration			:</td><td colspan="3"><?php echo $details['duration']; ?></td></tr><?php } ?>
			<?php if($details['category'] != false) { ?>
            <tr><td>&nbsp;&nbsp;&nbsp;	Pain type :	</td><td colspan="3"><?php echo $details['category']; ?></td></tr>
			<?php } ?>
			<?php if($details['Aggravating'] != false) { ?>
			<tr><td>&nbsp;&nbsp;&nbsp;	Aggravating factors :	</td><td colspan="3"><?php echo $details['Aggravating']; ?></td></tr>
			<?php } ?>
			<?php if($details['Relieving'] != false) { ?>
			<tr><td>&nbsp;&nbsp;&nbsp;	Relieving factors :	</td><td colspan="3"><?php echo $details['Relieving']; ?></td></tr>			
			<?php } ?>
			</table>
			</br></br></br></br></br>
			<?php if($details['tenderness'] != false || $details['Swelling'] != false || $details['bruises'] != false || $details['sensation'] != false){?>
		
		<h4>Objective</h4>
			<?php } ?>
		   <table style="width:95%;">
		   <?php if($details['tenderness'] != false) { ?><tr><td>&nbsp;&nbsp;&nbsp;	Tenderness :</td>
		   <td colspan="3"><?php echo $details['tenderness']; ?></td></tr><?php } ?>
			<?php if($details['Swelling'] != false) { ?><tr><td>&nbsp;&nbsp;&nbsp;	Swelling :	</td><td colspan="3"><?php echo $details['Swelling']; ?> </td></tr>
			<?php } ?>
			<?php if($details['bruises'] != false) { ?>
            <tr><td>&nbsp;&nbsp;&nbsp;	Bruises :	</td><td colspan="3"><?php echo $details['bruises']; ?></td></tr><?php } ?>
			<?php if($details['Warmth'] != false) { ?><tr><td>&nbsp;&nbsp;&nbsp;	Warmth :	</td><td colspan="3"><?php echo $details['Warmth']; ?></td></tr><?php } ?>
			<?php if($details['sensation'] != false) { ?>
			<tr><td>&nbsp;&nbsp;&nbsp;	Proprioception/sensation :	</td><td colspan="3"><?php echo $details['sensation']; ?></td></tr><?php } ?>			
			</table>

		
		</br></br></br></br></br>
		<?php if($details['limb'] != false){ ?>
		<h4>Functional</h4>
		   
		   <table style="width:95%;"><tr><td>&nbsp;&nbsp;&nbsp;	Limb alignment :</td>
		   <td colspan="3"><?php echo $details['limb']; ?></td></tr>
					
			</table>
		<?php } ?>
		
		</br></br></br></br></br>
		<?php if($details['High'] != false || $details['Antalgic'] != false || $details['propulsive'] != false || $details['Balance'] != false || $details['Contracture'] != false ){ ?>
		<h4>Gait : PWB/NWB</h4>
		<?php } ?>
		   <table style="width:95%;">
		   <?php if($details['High'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	High stepping gait (foot drop, equinovarus) :</td><td colspan="3"><?php echo $details['High']; ?></td></tr><?php } ?>
		   <?php if($details['Antalgic'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;Antalgic gait (ankle, hindfoot or midfoot pain) :</td><td colspan="3"><?php echo $details['Antalgic']; ?></td></tr><?php } ?>
		   <?php if($details['propulsive'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Short propulsive phase (forefoot pain) :</td><td colspan="3"><?php echo $details['propulsive']; ?></td></tr><?php } ?>
		   <?php if($details['Balance'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Balance testing Closed eyes/open eyes :</td><td colspan="3"><?php echo $details['Balance']; ?></td></tr><?php } ?>
		   <?php if($details['Contracture'] != false){?><tr><td>&nbsp;&nbsp;&nbsp;	Contracture/Deformities :</td><td colspan="3"><?php echo $details['Contracture']; ?></td></tr><?php } ?>
					
			</table>

		
		</br></br></br></br></br>
		<?php if($details['Dorsiflexion_active'] != false || $details['Dorsiflexion_passive'] != false || $details['Dorsiflexion_active1'] != false || $details['Dorsiflexion_passive1'] != false || $details['Plantar_active'] != false || $details['Plantar_passive'] != false || $details['Plantar_active1'] != false || $details['Plantar_passive1'] != false || $details['Inversion_active'] != false || $details['Inversion_passive'] != false || $details['Inversion_active1'] != false || $details['Inversion_passive1'] != false || $details['Eversion_active'] != false || $details['Eversion_passive'] != false || $details['Eversion_active1'] != false || $details['Eversion_passive1'] != false || $details['toef_active'] != false || $details['toef_passive'] != false || $details['toef_active1'] != false || $details['toef_passive1'] != false || $details['big_active'] != false || $details['big_passive'] != false || $details['big_active1'] != false || $details['ant_passive1'] != false ){?>
		<h4>Examination</h4>
		
		<table border="1" style="width:100%;border-collapse: collapse;">
		<tr><td>RANGE OF MOTION  </td><td colspan="2">Left</td><td colspan="2">Right</td></tr>
		<tr><td>  </td><td>Active</td><td>Passive</td><td>Active</td><td>Passive</td></tr>
		<tr><td> Dorsiflexion   </td>
		<td><?php echo $details['Dorsiflexion_active']; ?></td>
		<td><?php echo $details['Dorsiflexion_passive']; ?></td>
		<td><?php echo $details['Dorsiflexion_active1']; ?></td>
		<td><?php echo $details['Dorsiflexion_passive1']; ?></td></tr>
		<tr><td> Plantar flexion </td>
		<td><?php echo $details['Plantar_active']; ?></td>
		<td><?php echo $details['Plantar_passive']; ?></td>
		<td><?php echo $details['Plantar_active1']; ?></td>
		<td><?php echo $details['Plantar_passive1']; ?></td></tr>
		<tr><td> Inversion   </td>
		<td><?php echo $details['Inversion_active']; ?></td>
		<td><?php echo $details['Inversion_passive']; ?></td>
		<td><?php echo $details['Inversion_active1']; ?></td>
		<td><?php echo $details['Inversion_passive1']; ?></td></tr>
		<tr><td> Eversion  </td>
		<td><?php echo $details['Eversion_active']; ?></td>
		<td><?php echo $details['Eversion_passive']; ?></td>
		<td><?php echo $details['Eversion_active1']; ?></td>
		<td><?php echo $details['Eversion_passive1']; ?></td></tr>
		<tr><td> Toe flexion    </td>
		<td><?php echo $details['toef_active']; ?></td>
		<td><?php echo $details['toef_passive']; ?></td>
		<td><?php echo $details['toef_active1']; ?></td>
		<td><?php echo $details['toef_passive1']; ?></td></tr>
		<tr><td> Toe extension    </td>
		<td><?php echo $details['toee_active']; ?></td>
		<td><?php echo $details['toee_passive']; ?></td>
		<td><?php echo $details['toee_active1']; ?></td>
		<td><?php echo $details['toee_passive1']; ?></td></tr>
		<tr><td> Big toe flex/ext    </td>
		<td><?php echo $details['big_active']; ?></td>
		<td><?php echo $details['big_passive']; ?></td>
		<td><?php echo $details['big_active1']; ?></td>
		<td><?php echo $details['ant_passive1']; ?></td></tr>
		</table>
        <?php } ?>
		
		</br></br>
		
		<h4>Ankle Stability Tests </h4>
		
		<table border="1" style="width:100%;border-collapse: collapse;">
		<tr><td> Tests </td><td>Description</td><td>Left</td><td>Right</td></tr>
		<tr><td> Anterior Drawer: </br> ATFL & Anteromedial Capsule</td><td>(A) Stabilize distal tibia other hand cups calcaneus and apply PA force.</br>(B) Stabilize foot & talus on table apply AP force to distal tibia.</td>
		<td><?php echo $details['ATFLAnterior_left']; ?> </td>
		<td><?php echo $details['ATFLAnterior_right']; ?></td></tr>
		<tr><td> Squeeze Test: </br>ATFL</td><td>Compress the proximal fibula against the tibia </td>
		<td><?php echo $details['ATFLSqueeze_left']; ?></td>
		<td><?php echo $details['ATFLSqueeze_right']; ?></td></tr>
		<tr><td> Inversion Talar Tilt Test: </br> ATFL (PF position)</br> CFL (neutral position) </td><td>Patient’s legs over edge of the table</br>(a) Grasp calcaneus with one hand & stabilize lower leg with the other invert foot with ankle in neutral.</br>(b) Repeat with ankle in PF  </td>
		<td><?php echo $details['Inversiontalar_left']; ?></td>
		<td><?php echo $details['Inversiontalar_right']; ?></td></tr>
		<tr><td> Eversion Talar Tilt Test:</br>Deltoid ligament</br>Achilles' tendon</td><td>Patient’s legs over edge of the table</br>Grasp calcaneus with one hand & stabilize lower leg with the other Evert foot</td>
	  	<td><?php echo $details['Eversiontalar_left']; ?></td>
		<td><?php echo $details['Eversiontalar_right']; ?></td></tr>
		<tr><td> Thompson Test:</br>Achilles' tendon</td><td>Patient in prone, squeeze calf </td>
		<td><?php echo $details['Thompson_left']; ?></td>
		<td><?php echo $details['Thompson_right']; ?></td></tr>
		<tr><td>Varus/Valgus Stress Testing of the MTP: </br> Collateral ligament sprain</td><td>Stabilize proximal bone & grasp distal bone move distal bone medially/laterally</td>  
		<td><?php echo $details['Valgus_left']; ?></td>
		<td><?php echo $details['Valgus_right']; ?></td></tr>
		</table>
		
</br></br>

<h4>  </h4></br>
		
		<table style="width:95%;">
		<?php if ($details['Diagnosis'] != false) {  ?><tr><td>&nbsp;&nbsp;&nbsp;  <strong>Diagnosis : </strong></td>
		<td colspan="3"><?php echo $details['Diagnosis']; ?></td></tr><?php } ?>
			<?php if ($details['Treatment'] != false) {  ?><tr><td>&nbsp;&nbsp;&nbsp;	<strong>Treatment Plan : <strong></td><td colspan="3"><?php echo $details['Treatment']; ?></td></tr>
			<?php } ?>           
			<?php if ($details['Therapist'] != false) {  ?>
		   <tr><td>&nbsp;&nbsp;&nbsp;	<strong>Therapist :	 <strong></td><td colspan="3"><?php echo $details['Therapist']; ?></td></tr>
			<?php } ?> 
			</table>

	<?php } } ?> 

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