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
.style43 {font-size: 85%; color: #000000; }
.styleE {font-size: 90%; color: #000000; }
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


<!-- Wrapper Section -->
<div class="wrapper">
	<div class="home" style="margin-top:10px; margin-bottom:10px">
		<a href="<?php echo base_url(); ?>" class="style42">
		<img src="<?php echo base_url(); ?>images/Untitled-1.jpg" align="left" style="padding-right:5px">
		Home</a>
	</div>

<!-- Title Banner Section -->
<img src="<?php echo base_url(); ?>images/title_career.png">

<!-- Define Section -->
<div>
	<table width="940px">
		<td style="vertical-align:top" width="560px">
			<h3 align="left" class="style7 style32">Careers</h3>
				<p align="left" class="style13" style="text-align:justify">Physio Plus Tech believes in empowering the physiotherapy community to achieve greatness
				in therapy practice. That’s why we created an intuitive, web-based electronic medical record solution and combined it with exceptional,
				comprehensive practice management services. Physio Plus Tech gives therapists peace of mind, so they can get back to what truly matters—their
				patients.</p>
				<p align="left" class="style13" style="text-align:justify">But we can’t do it alone, and that’s why we want you.</p>
				<p align="left" class="style13" style="text-align:justify">As a Physio Plus Tech team member, you’ll be a part of something big. Really big.
				Not only will you work with—and learn from—creative, talented, and driven individuals, you’ll contribute your creativity, talent, and drive
				(oh, and spectacular sense of humor) to make us better.</p>
		</td>
		<td width="380px">
			<img src="<?php echo base_url(); ?>images/career.png" align="right" style="margin-top:40px">
		</td>
	</table>
</div>
<!-- END Define Section -->
		<p align="left" class="style13" style="text-align:justify">Here, we collaborate; we innovate; we change the game. Ready to jump in? Check out
			our current openings below.</p>
<br>
<!-- Feature Define Section -->
<div class="resume">
	<h3 align="left" class="style7 style32" style="margin-left:30px">Submit Your Resume</h3>
		<p align="left" class="style29" style="text-align:justify; margin-left:30px">To submit a resume, use the form on the left. Send a PDF of your resume with your name and the
		title of the job you are applying for as</p>
		<p align="left" class="style29" style="text-align:justify; margin-left:30px">your file name. E.g... "kumar-executive_manager.pdf"</p>
		<input type="file" id="file" placeholder="Choose a file.." name="file"/ style="height:30px; margin-left:30px">
<br>		
		<input type="submit" class="submit" value="Submit" id="send" style="margin-top:10px; margin-left:30px"/>
<br>
<br>
</div>
<div>
<br>
	<h3 align="left" class="style7 style32">Current Job Openings</h3>
	<h4 align="left" class="style80">Customer Support Executive (Director of First impressions)</h4>
		<p align="left" class="style29" style="text-align:justify">Responsibilities:-&nbsp; As a part of Physio Plus Tech, you will responsible for the postion</p>
		<p align="left" class="style29" style="text-align:justify">• Candidates should have any Degree</p>
		<p align="left" class="style29" style="text-align:justify">• Well-organised</p>
		<p align="left" class="style29" style="text-align:justify">• Friendly and polite (manners cost nothing after all)</p>
		<p align="left" class="style29" style="text-align:justify">• Able to deal with difficult clients or customers (not everyone knows the manners rule)</p>
		<p align="left" class="style29" style="text-align:justify">• Efficient & Self-motivated</p>
		<p align="left" class="style29" style="text-align:justify">• Good Computer knowledge and fluency in English</p>
		<p align="left" class="style29" style="text-align:justify">• Have polished communication skills </p>
<br>
	<h4 align="left" class="style80">Marketing Executive</h4>
		<p align="left" class="style29" style="text-align:justify">Responsibilities:-&nbsp; As a part of Physio Plus Tech, you will responsible for the postion</p>
		<p align="left" class="style29" style="text-align:justify">• Candidates should have a Management Degree in marketing</p>
		<p align="left" class="style29" style="text-align:justify">• Well-organised</p>
		<p align="left" class="style29" style="text-align:justify">• Friendly and polite (manners cost nothing after all)</p>
		<p align="left" class="style29" style="text-align:justify">• Able to deal with difficult clients or customers (not everyone knows the manners rule)</p>
		<p align="left" class="style29" style="text-align:justify">• Efficient & Self-motivated</p>
		<p align="left" class="style29" style="text-align:justify">• Good Computer knowledge and fluency in English</p>
		<p align="left" class="style29" style="text-align:justify">• Ability to turn a No sale to an addictive customer </p>
<br>
</div>
<!-- END Feature Define Section -->

</div>
<!-- END Wrapper Section -->
<?php echo $this->load->view('footer_view'); ?>

</div>
<!-- END Main Wrapper -->

</div>
</body>
</html>