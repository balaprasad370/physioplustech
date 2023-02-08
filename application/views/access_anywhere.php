<!DOCTYPE HTML>
<html>
<head>
 
<meta charset="utf-8"/>

 
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
 
<title> Physio Plus Tech </title>
<?php echo $this->load->view('includes_view'); ?>

<style type="text/css">
 
</style>
</head>

<body>
<?php include_once("analyticstracking.php")?>
 
<div class="main-wrapper">

 
<div class="pattern"> 
<?php echo $this->load->view('header_view'); ?>

</div>
 
 
<div class="wrapper">
	<div class="home" style="margin-top:10px; margin-bottom:10px">
		<a href="<?php echo base_url(); ?>" class="style42">
		<img src="<?php echo base_url(); ?>images/Untitled-1.jpg" align="left" style="padding-right:5px">
		Home</a>
	</div>

 
<img src="<?php echo base_url(); ?>images/title_access.png">

 
<div>
	<table width="940px">
		<td style="vertical-align:top" width="560px">
			<h3 align="left" class="style7 style32">You can take it with you</h3>
				<p align="left" class="style13" style="text-align:justify">Unlike old-fashioned Windows business software that was not designed to be used
				outside the office, web-based software works on any computer or tablet that has a web browser. This includes any Windows or Macintosh
				computer. For many functions, you can also use your iPad or even your web-enabled smartphone. You and your team can access Physio Plus Tech
				securely from anywhere.</p>
				<h3 align="left" class="style7 style32">iPad? No problem</h3>
				<p align="left" class="style13" style="text-align:justify">Physio Plus Tech runs on your iPad without any extra tricks or apps. Now you can
				create documentation, update schedules or utilize any feature of Physio with your iPad. Work from home, office, or on the go. Many of our
				prospective custmers had requested about its adoptability with tablets and smartphones, and we were glad that we read their minds even before selling our product.</p>
		</td>
		<td width="380px">
			<img src="<?php echo base_url(); ?>images/access any.png" align="right" style="margin-top:40px">
		</td>
	</table>
</div>

 
<div>
		<p align="left" class="style29" style="text-align:justify">For more intensive tasks such as creating an initial exam, the iPad may not be the most
		efficient tool for the trade. However, for a majority of your needs throughout the day, the iPad works like a charm. Some iPad competitors like the
		Nook or Kindle are simply not robust enough to run most applications. These devices are more suited for reading and Internet browsing vs. using to
		run a clniic or business.</p>
	<h3 align="left" class="style7 style32">Secure access</h3>
		<p align="left" class="style29" style="text-align:justify">Physio Plus Tech adheres to IAMI (Indian Association for Medical Informatics) regulations
        and strict security guidelines to secure patient information. All Physio Plus Tech information areas are password protected and we require that each
        participating therapist have his or her own individual login information.</p>
		<p align="left" class="style29" style="text-align:justify">Physio Plus Tech has also taken extraordinary measures to secure your health and patient
		information by implementing SSL (Secure Socket Layer) encryption. SSL is the same Internet security system that banks use to protect your banking
		information and can be trusted to secure your documentation.</p>
<br>

</div>
 

</div>
 
<?php echo $this->load->view('footer_view'); ?>

</div>
 

</div>
</body>
</html>