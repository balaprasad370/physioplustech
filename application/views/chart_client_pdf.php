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
if($status != false){
	foreach($status as $pdfdet){
		$chart_no = $pdfdet['chard_no'];
		$client_id = $pdfdet['client_id'];
		$patient_id = $pdfdet['patient_id'];
	}

$CI =& get_instance();
$CI->load->model(array('pdf_model'));
if($sta == 'public'){
	$chartDet = $CI->pdf_model->getdefaultcharts($chart_no,$client_id);
} 
$clientDetails = $CI->pdf_model->editProfile($cid);

?>
<table>
<tr>
<td width="136"><img src="<?php echo base_url().'uploads/logo/'.$clientDetails['logo'];?>" style="width:120px;height:120px;" ></td>
<td width="581"><center><p><h3><font color="#6699FF">Home Exercise Program</font></h6></p>
<p><h6><font color="#6699FF">Created By : Dr.<?php echo $clientDetails['first_name'].',</br>  '. date("M").' '.date("d").'th '.date("o")  ?></font></h6></p> 
</center></td>

<?php 
	$total = 0;
	foreach($chartDet as $pname){
		$name = $pname['patient_name'];
		$total++;
	}
?>
<!--<td width="211"><h6><font color="#FF3333">Patient Name : <?php echo $name ?></font></h6></td>-->
</tr>
</table>
    <hr>
    <div class="row-fluid" style="margin-bottom: 15px;">
		<div align="right"><?php echo 'Total :'. $total ?></div>
		<table width="1013" height="375" >
		<?php if($status != false) {  foreach($status as $img) { $id = explode('/',$img['img_path']); ?>
		<tr><td width="347"></br>
		   <?Php if($id[2] == 'www.physioplustech.in') { ?><img src="<?php echo $img['img_path']; ?>" height="250px;" width="250px;">					
			<?php } else { ?>
			<img src="<?php echo 'https://exerciseprescriptions20.s3.ap-south-1.amazonaws.com/'.$img['img_path']; ?>" style="width:250px;height:250px;border:2px dotted #545565;"><?php }	 ?>
			
			<input type="hidden" id="path" name="path[]" value="<?php echo $img['img_path'] ?>" >
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
		<?php } } ?>
		
		</table>
<?php } else{ ?>
Your Code is in correct
<?php }?>
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
