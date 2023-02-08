<!DOCTYPE HTML>
<html>
<head>

<!-- Define Charset -->
<meta charset="utf-8"/>

<!-- Responsive Metatag -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

<!-- Page Title -->
<title> Physio Plus Tech </title>
<?php echo $this->load->view('includes_view'); ?>

<style type="text/css">
</style>
</head>
<body>
<?php include_once("analyticstracking.php")?>
<!-- Main Wrapper -->
<div class="main-wrapper">

<!-- Pattern-->
<div class="pattern"> 
<?php echo $this->load->view('header_view'); ?>

</div>
<!-- END Pattern -->

<!-- END Background -->

<!-- Wrapper Section -->
<div class="wrapper">

<div class="bottom">
	<h4 align="left" class="style34" style="margin-left:20px"><?php echo $confirmation; ?></h4>
		<p align="left" class="style43" style="margin-left:20px">You can login here : </p>
		<span style="color:red;margin-left:50px"><a style="color:red" href="http://www.physioplustech.com/client/dashboard/login">http://www.physioplustech.com/client/dashboard/login</a></span>
        <!--<p align="left" class="style43" style="margin-left:20px">No servers, downloads or backups – no IT staff required.</p>
        <p align="left" class="style43" style="margin-left:20px">Access patient data from anywhere using your PC, Macintosh, iPad or smartphone.</p>-->
</div>
<br>
<!-- END Feature Define Section -->

</div>
<div style="margin-top:180px">
</div>
<!-- END Wrapper Section -->
<?php echo $this->load->view('footer_view'); ?>

</div>
</div>
</body>
</html>