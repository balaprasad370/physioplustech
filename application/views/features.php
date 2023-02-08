<!DOCTYPE HTML>
<html>
<head>

<!-- Define Charset -->
<meta charset="utf-8"/>

<!-- Responsive Metatag -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

<!-- Page Title -->
<title>Physio Plus Tech</title>
<?php echo $this->load->view('includes_view'); ?>

<style type="text/css">
<!--
.style2 {
	font-size: 150%;
	color: #000000;
}
.style7 {font-weight: bold; }
.style13 {font-size: 90%; }
.style29 {color: #000000; font-size: 90%; }
.styleD {color: #1C9ECC; font-size: 90%; }
.style32 {color: #CC3300}
.style33 {color: #CC3300; font-weight: bold; }
.style34 {
	font-size: 90%;
	font-weight: bold;
	color: #1C9ECC;
}
.style38 {font-size: 85%; color: #CC6600; }
.style42 {font-size: 85%; color: #333333; }
.style43 {font-size: 85%; color: #000000; }
-->
</style>
</head>
<body>
<?php include_once("analyticstracking.php")?>
<!-- Main Wrapper -->
<div class="main-wrapper">

<!-- Top Background -->
<!-- Pattern-->
<div class="pattern"> 
<?php echo $this->load->view('header_view'); ?>

</div>
<!-- END Background -->

<!-- Wrapper Section -->
<div class="wrapper">
	<div class="home" style="margin-top:10px; margin-bottom:10px">
		<a href="<?php echo base_url(); ?>" class="style42">
		<img src="<?php echo base_url(); ?>images/Untitled-1.jpg" align="left" style="padding-right:5px">
		Home</a>
	</div>

<!-- Title Banner Section -->
<img src="<?php echo base_url(); ?>images/title_features.png">

<!-- Define Section -->
<div>
	<table width="940px">
		<td style="vertical-align:top" width="560px">
			<h3 align="left" class="style7 style32">World's Best web-based physiotherapy software</h3>
				<p align="left" class="style13" style="text-align:justify">Physio Plus Tech is World's Best web-based software, that's multifunctional and an all in one place solution to manage the clinic
                more effectively and efficiently. Physio Plus tech is conceived, planned, developed and perfected by a physiotherapist since 2011 and its coding has been supervised every day, so that its
                intuitive, easy and natural to adopt for a physiotherapist in his clinic. Moreover we will give online training and demo so that you and your staff will be ready to go live in Physio plus
                tech in just 30 minutes.</p>
			<h3 align="left" class="style33">Your Practice in One Place</h3>
				<p align="left" class="style13" style="text-align:justify">Physio Plus Tech is an integrated physiotherapy software designed to let you focus on your patients and your PT business – not on
                recording details in paper and filing it</p>
		</td>
		<td width="380px">
			<a class="group2" href="<?php echo base_url(); ?>images/features.png"><img src="<?php echo base_url(); ?>images/features.1.png" align="right" style="margin-top:40px"></a>
		</td>
	</table>
</div><!-- END Define Section -->

<br>

<!-- Feature Define Section -->
<div>
	<h4 align="left" class="style34">Documentation</h4>
		<p align="left" class="style43" style="text-align:justify">Physio Plus Tech meets the specific needs of therapists by streamlining the PT workflow, resulting in compliant,
        defensible and efficient documentation, which you can integrate with other features like reporting, referral management and billing services</p>
		<hr>
	<h4 align="left" class="style34">Scheduling</h4>
		<p align="left" class="style43" style="text-align:justify">Integrated scheduling with documentation and billing saves time and increases productivity. It replaces manual
        schedule books or standalone scheduling software that is not integrated with your clinic's practice management system. You can add new patient anywhere at the software</p>
		<hr>
	<h4 align="left" class="style34">Practice Management</h4>
		<p align="left" class="style43" style="text-align:justify">Automatic alerts and real-time reports allow you to run your clinic more effectively. It provides the manager or
        clinic owner with real-time business intelligence to improve operational decision-making. It shows automatic feedback from your treatments and patient compliance about the
        treatment techniques, modalities and exercises</p>
		<hr>
	<h4 align="left" class="style34">Billing</h4>
		<p align="left" class="style43" style="text-align:justify">The all-in-one solution helps to bridge that gap with our integrated billing and documentation system. When you add
        a patient at schedule, you can automatically generate a bill for him, or you can directly make bills by just adding a new patient even at the billing</p>
		<hr>
<br>
	<h3 align="left" class="style7 style32">Software designed for the future</h3>
		<p align="left" class="style29">Physio Plus Tech is a web based physiotherapy Clinic management software – no IT staffs or servers are required</p>
		<p align="left" class="style29">Created specifically for Physiotherapists, so it works the way you do and meets your complete documentation and billing requirements</p>
		<p align="left" class="style29" style="text-align:justify">Simple to learn and easy to use for everyone in your office</p>
		<p align="left" class="style29" style="text-align:justify">Access patient data from anywhere using any web-enabled computer, smartphone or iPad.</p>
<br>
</div>
<!-- END Feature Define Section -->

</div>
<!-- END Wrapper Section-->
<?php echo $this->load->view('footer_view'); ?>

</div>
<!-- END Main Wrapper -->

</div>
</body>
</html>