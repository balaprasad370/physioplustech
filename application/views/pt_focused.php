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

<!-- Pattern-->
<div class="pattern"> 
<?php echo $this->load->view('header_view'); ?>

</div>
<!-- END Pattern -->

<!-- END Background -->

<!-- Wrapper Section -->
<div class="wrapper">
	<div class="home" style="margin-top:10px; margin-bottom:10px">
		<a href="<?php echo base_url(); ?>" class="style42">
		<img src="<?php echo base_url(); ?>images/Untitled-1.jpg" align="left" style="padding-right:5px">
		Home</a>
	</div>

<!-- Title Banner Section -->
<img src="<?php echo base_url(); ?>images/title_pt.png">

<!-- Define Section -->
<div>
	<table width="940px">
		<td style="vertical-align:top" width="560px">
			<h3 align="left" class="style7 style32">Create high-quality PT documentation efficiently</h3>
				<p align="left" class="style13" style="text-align:justify">Physio Plus Tech allows you to create professional, legible documentation
				quickly - without paperwork headaches. Our easy templates help you to quickly create comprehensive digital documents with point-and-click
				selections entry to minimize typing. Physio Plus Tech documentation software prompts you with simple questions and tests
				according to a PT specific workflow, so every evaluation, progress note, flow sheet, or daily note is completed with precision. With your
				clinic branding built-in, physicians will notice your practice from the high-quality documentation that sets you apart from the rest.</p>
			<h3 align="left" class="style7 style32">Physio Plus Tech works the way you do</h3>
				<p align="left" class="style13" style="text-align:justify">Physio Plus Tech is designed specifically for physiotherapists, PT assistants
                and rehab clerical staff with easy processes that are custom fit for your workflows. From scheduling a new patient, to creating complete
                documentation notes, to managing physician referral system and working with your billing system, Physio Plus Tech software minimizes your
                effort and moves as fast as you do.</p>
		</td>
		<td width="380px">
			<img src="<?php echo base_url(); ?>images/focus.png" align="right" style="margin-top:40px">
		</td>
	</table>
</div>
<!-- END Define Section -->

<!-- Feature Define Section -->
<div>
	<h3 align="left" class="style7 style32">Advantage of being made by Physiotherapist itself</h3>
		<p align="left" class="style29" style="text-align:justify">Our Founder, Dr. S. Ram Prakash, PT, is still a practicing physiotherapist. He uses
      	Physio Plus Tech in his practice daily and has guided the design of the system to optimize for simplicity, efficiency and compliance. He still posses
        many unquenched thirsts for innovative technology to develop more exiting and theraphist friendly features like exercise prescriptions, online directory,
		and shopping portals. We aim to fullfill his expectation in the near future.</p>
	<h3 align="left" class="style7 style32">Improve your quality of care</h3>
		<p align="left" class="style29" style="text-align:justify">Everyone in your clinic can spend less time on paperwork, giving you more time with your patients
        to improve patient outcomes. You’ll even be reminded with alerts to stay on track to complete unfinished notes, file Case reports on time, contact your
        inactive patients, maintain and manage billing system so that all aged recievables would be collected at time with ease.</p>
<br>
</div>
<!-- END Feature Define Section -->

</div>
<!-- END Wrapper Section -->
<!-- END Wrapper Section -->
<?php echo $this->load->view('footer_view'); ?>

</div>
<!-- END Main Wrapper -->

</div>
</body>
</html>