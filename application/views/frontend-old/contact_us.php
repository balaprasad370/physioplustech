<!DOCTYPE HTML>
<html>
<head>

 
<meta charset="utf-8"/>

 
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

 
<title> Physio Plus Tech </title>
<?php echo $this->load->view('includes_view'); ?>

<script type="text/javascript" > 
 
$(document).ready(function() {
$(".styles-open").click(function(){
$(".styles, .styles-open").animate({ "left":"-220px" }, 1000); $(".styles-closed").animate({ "left":"0" }, 1000);
return false;
});
$(".styles-closed a").click(function(){
$(".styles-closed").animate({ "left":"-220px" },1000);
$(".styles").animate({ "left":"0" }, 1000);
$(".styles-open").animate({ "left":"220" }, 1000);
return false;
});
}); 

</script>
 
</head>
<body>
<?php include_once("analyticstracking.php")?>
 
<div class="main-wrapper">
 
<div class="pattern"> 
<?php echo $this->load->view('header_view'); ?>

</div>
 
<div class="wrapper">
	<div class="home" style="margin-top:10px; margin-bottom:10px">
		<a href="<?php echo base_url(); ?>pages/home" class="style42">
		<img src="<?php echo base_url(); ?>images/Untitled-1.jpg" align="left" style="padding-right:5px">
		Home</a>
	</div>

 
<img src="<?php echo base_url(); ?>images/title_contact.png">

 
<table width="100%">
<tr>
<td>
<table width="100%">
<tr>
<td style="float:left; margin-left:15px;">
	<h3 align="left" class="style7 style32">Address</h3>
	<h4 align="left" class="style80">Physio Plus Tech</h4>
	<p align="left" class="style29">180, Gnanagiri Road, Palaniyandavar Colony,</p>
	<p align="left" class="style29">Sivakasi - 626 123.</p>
	<p align="left" class="style29">Tamilnadu, India.</p>
	<p align="left" class="style29">Ph: 04562 222603,</p>
	<p align="left" class="style29">Cell: +91 98946 04603</p>
	<a href="mailto:sivakasi@physioplusnetwork.com" class="mail">
	<p align="left" class="styleP">Mail: contact@physioplusnetwork.com</p>
	</a>
</td>
<td style="float:right; margin-right:15px;">
<img src="<?php echo base_url(); ?>images/contact img.png">
</td>
</tr>
</table>
</td>
</tr>
</table>
<table width="100%">
<tr>
<td>
<table width="100%">
<tr>
<form action="" method="post" name="ContactUs" id="ContactUs" class="admin_form">
<?php
if($this->session->flashdata('message')): echo '<div class="success">'.$this->session->flashdata('message').'</div>'; endif;
?>
<td style="float:left; margin-left:15px;">
	<h3 align="left" class="style7 style32">Contact Us</h3>
	<p align="left" class="style13">IFeel free to send us a message.</p>
		<table>
			<tr>
				<td>
					<input type="text" id="name" placeholder="Your Name" name="name" value="<?php echo set_value('name') ?>" style="width:260px; height:25px;"/>
					<?php echo form_error('name'); ?>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" id="email" placeholder="Your Email" name="email" value="<?php echo set_value('email') ?>" style="width:260px; height:25px;"/>
					<?php echo form_error('email'); ?>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" id="phone" placeholder="Your Number" name="phone" value="<?php echo set_value('phone') ?>" style="width:260px; height:25px;"/>
					<?php echo form_error('phone'); ?>
				</td>
			</tr>
			<tr>
				<td>
					<textarea id="message" placeholder="Your Message" name="message" value="<?php echo set_value('message') ?>" rows="5" cols="20" style="width:250px;"></textarea>
					<?php echo form_error('message'); ?>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" class="submit" value="Submit" id="send" style="margin-top:10px;"/>
				</td>
			</tr>
		</table>
</td>
</form>
<td style="float:right; margin-right:15px;">
<h3 align="left" class="style7 style32">Our Location</h3>
<iframe width="450" height="400" style="frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
src="https://maps.google.co.in/maps?q=Physio+Plus+Sivakasi,+Sivakasi,+Tamil+Nadu&amp;hl=en&amp;sll=9.45702,77.797322&amp;sspn=0.047497,0.084028&amp;oq=physio+plus&amp;hq=Physio+Plus+Sivakasi,&amp;hnear=Sivakasi,+Virudhunagar,+Tamil+Nadu&amp;t=m&amp;ie=UTF8&amp;ll=9.456814,77.800125&amp;spn=0.023748,0.042014&amp;z=14&amp;iwloc=A&amp;cid=17475005918195933318&amp;output=embed">
</iframe>
<br>
<small>
<a href="https://maps.google.co.in/maps?q=Physio+Plus+Sivakasi,+Sivakasi,+Tamil+Nadu&amp;hl=en&amp;sll=9.45702,77.797322&amp;sspn=0.047497,0.084028&amp;oq=physio+plus&amp;hq=Physio+Plus+Sivakasi,&amp;hnear=Sivakasi,+Virudhunagar,+Tamil+Nadu&amp;t=m&amp;ie=UTF8&amp;ll=9.456814,77.800125&amp;spn=0.023748,0.042014&amp;z=14&amp;iwloc=A&amp;cid=17475005918195933318&amp;source=embed"
style="color:#0000FF;text-align:left;">View Larger Map</a></small>
</td>
</tr>
</table>
</td>
</tr>
</table>
<!--<h3 align="left" class="style7 style32" style="margin-left:50px">Contact Us</h3>
	<p align="left" class="style13" style="margin-left:50px; text-align:justify">IFeel free to send us a message.</p>
		<table style="margin-left:15px">
			<tr>
				<td>
					<input type="text" id="name" placeholder="Your Name" name="name" style="width:260px; height:25px; margin-left:50px"/>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" id="email" placeholder="Your Email" name="email" style="width:260px; height:25px; margin-left:50px"/>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" id="number" placeholder="Your Number" name="number" style="width:260px; height:25px; margin-left:50px"/>
				</td>
			</tr>
			<tr>
				<td>
					<textarea id="message" placeholder="Your Message" name="message" rows="5" cols="20" style="width:250px; margin-left:50px"></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" class="submit" value="Submit" id="send" style="margin-top:10px; margin-left:50px"/>
				</td>
			</tr>
		</table>-->
<!--
<table width="100%">
		<td width="40%" style="vertical-align:top">
			<ul>
				<img src="<?php echo base_url(); ?>images/plain doc.png" style="margin-top:20px">
				<h3 align="left" class="style7 style32" style="margin-top:-780px; margin-left:50px">Address</h3>
				<h4 align="left" class="style80" style="margin-left:50px">Physio Plus Tech</h4>
					<p align="left" class="style29" style="margin-left:50px">180, Gnanagiri Road, Palaniyandavar Colony,</p>
					<p align="left" class="style29" style="margin-left:50px">Sivakasi - 626 123.</p>
					<p align="left" class="style29" style="margin-left:50px">Tamilnadu, India.</p>
					<p align="left" class="style29" style="margin-left:50px">Ph: 04562 222603,</p>
					<p align="left" class="style29" style="margin-left:50px">Cell: +91 98946 04603</p>
					<a href="mailto:sivakasi@physioplusnetwork.com" class="mail">
					<p align="left" class="styleP" style="margin-left:50px">Mail: sivakasi@physioplusnetwork.com</p>
					</a>
			</ul>
<br>
			<ul>
				<h3 align="left" class="style7 style32" style="margin-left:50px">Contact Us</h3>
					<p align="left" class="style13" style="margin-left:50px; text-align:justify">IFeel free to send us a message.</p>
					<table style="margin-left:15px">
						<tr>
							<td>
								<input type="text" id="name" placeholder="Your Name" name="name" style="width:260px; height:25px; margin-left:50px"/>
							</td>
						</tr>
						<tr>
							<td>
								<input type="text" id="email" placeholder="Your Email" name="email" style="width:260px; height:25px; margin-left:50px"/>
							</td>
						</tr>
						<tr>
							<td>
								<input type="text" id="number" placeholder="Your Number" name="number" style="width:260px; height:25px; margin-left:50px"/>
							</td>
						</tr>
						<tr>
							<td>
								<textarea id="message" placeholder="Your Message" name="message" rows="5" cols="20" style="width:250px; margin-left:50px"></textarea>
							</td>
						</tr>
						<tr>
							<td>
								<input type="submit" class="submit" value="Submit" id="send" style="margin-top:10px; margin-left:50px"/>
							</td>
						</tr>
					</table>
				</ul>
		</td>
		<td width="60%">
			<ul>
				<img src="<?php echo base_url(); ?>images/contact img.png">
			</ul>
			<ul>
				<h3 align="left" class="style7 style32" style="margin-left:20px; margin-top:-20px">Our Location</h3>
					<iframe width="450" height="400" style="margin-left:20px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
					src="https://maps.google.co.in/maps?q=Physio+Plus+Sivakasi,+Sivakasi,+Tamil+Nadu&amp;hl=en&amp;sll=9.45702,77.797322&amp;sspn=0.047497,0.084028&amp;oq=physio+plus&amp;hq=Physio+Plus+Sivakasi,&amp;hnear=Sivakasi,+Virudhunagar,+Tamil+Nadu&amp;t=m&amp;ie=UTF8&amp;ll=9.456814,77.800125&amp;spn=0.023748,0.042014&amp;z=14&amp;iwloc=A&amp;cid=17475005918195933318&amp;output=embed">
					</iframe>
					<br>
					<small>
					<a href="https://maps.google.co.in/maps?q=Physio+Plus+Sivakasi,+Sivakasi,+Tamil+Nadu&amp;hl=en&amp;sll=9.45702,77.797322&amp;sspn=0.047497,0.084028&amp;oq=physio+plus&amp;hq=Physio+Plus+Sivakasi,&amp;hnear=Sivakasi,+Virudhunagar,+Tamil+Nadu&amp;t=m&amp;ie=UTF8&amp;ll=9.456814,77.800125&amp;spn=0.023748,0.042014&amp;z=14&amp;iwloc=A&amp;cid=17475005918195933318&amp;source=embed"
					style="color:#0000FF;text-align:left; margin-left:20px">View Larger Map</a></small>
			</ul>
		</td>
	</table>
<!-- END Contact Function Section
-->
<br>



 
</div>
 
<?php echo $this->load->view('footer_view'); ?>

</div>
 

</div>
</body>
</html>