<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/select2.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/physio_style.css" />
<link href="<?php echo base_url() ?>patient/css/style-responsive.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>patient/css/table-responsive.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url(); ?>font-awesome/css/font-awesome.css" />
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
<body style="background:none; margin: 0;">

<!--Header-part-->

<div >

<div class="container-fluid">

<?php
$segment_array = $this->uri->segment_array();
$chart = array_search("chartno",$segment_array);
if ($chart !== FALSE)
{
	$chart_no = $this->uri->segment($chart+1);
}

$CI =& get_instance();
$CI->load->model(array('exercise_model','registration_model'));
$chartDet = $CI->exercise_model->getdefault_chart($chart_no);

$clientDetails = $CI->registration_model->editProfile($this->session->userdata('client_id'));
$profileInfo = $CI->registration_model->editProfile($this->session->userdata('client_id'));
$clientName = ucfirst($profileInfo['first_name']);
?>
<table>
<tr>
<td width="120"><img src="<?php echo base_url().'uploads/logo/'.$clientDetails['logo'];?>" style="width:162px; height:auto;" ></td>
<td width="120"></td>
<td width="432"><p><h3><font color="#6699FF">Home Exercise Program</font></h6></p>
</td>
<?php if($this->session->userdata('client_id') == '2') { ?>
<td width="136"><img src="<?php echo base_url().'images/Winner - Established Brands_Black.jpg';?>" style="width:120px;height:90px;" ></td>
<?php } ?>
</td>
<?php 
	$total = 0;
	foreach($chartDet as $pname){
		//$name = $pname['patient_name'];
		$total++;
	}
?>
</tr>
</table>
    <hr>
    <div class="row-fluid" style="margin-bottom: 15px;">
		<div align="right"><?php echo 'Total :'. $total ?></div>
		<table width="1013" height="375" >
		<?php 	
				foreach($chartDet as $img){ echo $img;
				?>
				<tr><td width="347">
					<img src="<?php echo 'https://exerciseprescriptions20.s3.ap-south-1.amazonaws.com/'.$img['img_path']; ?>" height="250px;" width="250px;" >					
					<input type="hidden" id="path" name="path[]" value="<?php echo $img['img_path']; ?>" >
					</td>
					<td width="400">
						<p align="center"><strong><?php echo $img['title'] ?></strong></p><br>
						<p style="align:justify"><?php echo $img['img_description'] ?></p>
					</td>
					<td width="40" >&nbsp;</td>
					<td width="210">
					<table>
						
						<?php if($img['hold'] != -1) {?>
							<tr><td>Hold</td><td>: <?php echo $img['hold'].' Secs'; ?></td></tr>
						<?php } if($img['repet'] != -1){  ?>
							<tr><td>Repeat</td><td>: <?php echo $img['repet'].' Times'; ?></td></tr>
						<?php } if($img['complete'] != -1) { ?>
							<tr><td>complete</td><td>: <?php echo $img['complete'].' Sets'; ?></td></tr>
						<?php } ?>	</table>
					</td>
				</tr>
		<?php }
		?>
		</table>
		<br><br><br>
		
		<!--<table>
		<tr>
		
	       <th>	Disclaimer: </th>
</tr>
 <tr><td><h6>The above exercises are prescribed to the specific patient Mentioned Above.
These exercises are Not transferable or Not advisable for other persons even with 
the same problems. The clinic, the staff or the admin are not responsible for any issues 
caused by doing the above exercises without the instructions from the doctor.</h6></td></tr>

</table>-->


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
