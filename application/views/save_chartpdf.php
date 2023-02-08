<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/select2.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/physio_style.css" />

<link rel="stylesheet" href="<?php echo base_url(); ?>font-awesome/css/font-awesome.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
<body style="background:none; margin: 0;">

<!--Header-part-->

<div >

<div class="container-fluid">

<?php
$segment_array = $this->uri->segment_array();
$chart = array_search("chartname",$segment_array);
if ($chart !== FALSE)
{
	$chart_no = $this->uri->segment($chart+1);
}

$CI =& get_instance();
$CI->load->model(array('exercise_model','registration_model'));
$chartDet = $CI->exercise_model->save_charts($chart_no);
$clientDetails = $CI->registration_model->editProfile($this->session->userdata('client_id'));
$profileInfo = $CI->registration_model->editProfile($this->session->userdata('client_id'));
$clientName = ucfirst($profileInfo['first_name']).' '.ucfirst($profileInfo['last_name']);
?>
<table>
<tr>
<td width="136"><img src="<?php echo base_url().'uploads/logo/'.$clientDetails['logo'];?>" ></td>
<td width="371"><p><h3><font color="#6699FF">Home Exercise Program</font></h6></p>
<p><h6><font color="#6699FF">Created By : <?php echo $clientName .',  '. date("M").' '.date("d").'th '.date("o")  ?></font></h6></p>
</td>

</tr>
</table>
    <hr>
    <div class="row-fluid" style="margin-bottom: 15px;">
		<div align="right"><?php echo 'Total :'. $total ?></div>
		<table width="1013" height="375" >
		<?php 	
				foreach($chartDet as $img){
				?>
				<tr><td width="387">
					<img src="<?php echo $img['img_path'] ?>" width="327" height="328"  style="max-width:95%;border:2px dotted #545565;">					
					<input type="hidden" id="path" name="path[]" value="<?php echo $img['img_path'] ?>" >
					</td>
					<td width="412">
						<p align="center"><strong><?php echo $img['title'] ?></strong></p><br>
						<p align="center"><?php echo $img['img_description'] ?></p>
					</td>
					<td width="198">
					<table>
						<?php if($img['repet'] != -1){  ?>
							<tr><td>Repeat	</td><td>:<?php echo $img['repet'] ?></td></tr>
						<?php } if($img['hold'] != -1) {?>
							<tr><td>Hold</td><td>:<?php echo $img['hold'] ?></td></tr>
						<?php } if($img['complete'] != -1) { ?>
							<tr><td>complete</td><td>:<?php echo $img['complete'] ?></td></tr>
						<?php } if($img['perform'] != -1) {?>
							<tr><td>Perform	</td><td>:<?php echo $img['perform'] ?></td></tr>
						<?php } if($img['time'] != 'empty') { ?>
							<tr><td>Time</td><td>:<?php echo $img['time'] ?></td></tr>
						<?php } ?>
					</table>
					</td>
				</tr>
		<?php }
		?>
</table>

</div>
</div>
</div>
</div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->

<!--end-Footer-part-->
<script src="<?php echo base_url(); ?>js/excanvas.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery-ui-1.10.2.custom.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.gritter.min.js"></script> 
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.uniform.js"></script> 
<script src="<?php echo base_url(); ?>js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.peity.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.colorbox-min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.form.js"></script> 
<script src="<?php echo base_url(); ?>js/physio_helper.js"></script>
<script src="<?php echo base_url(); ?>js/physio_controller.js"></script>

</body>
</html>
