<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/jgrowl/css/jquery.jgrowl.min.css">
  
 
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
<style type="text/css">

</style>
</head>
<body>
<?php // include_once("analyticstracking.php")?>
 
<div class="main-wrapper">

 
<div class="pattern"> 
<div class="main-wrapper">

 
<div class="top-bg"> 
 
<div class="pattern"> 

 <div class="header">
	<div class="wrapper">
	<div class="logo" style="width: auto;"> 
	<a href="<?php echo base_url(); ?>pages/home">
    <img src="<?php echo base_url(); ?>images/logo_new.png" style="height:76px;">
    </a>
    </div>
    	<ul id="nav">
	<li><a href="<?php echo base_url(); ?>pages/features">Features</a>
    	<ul>
			<li><a href="<?php echo base_url(); ?>pages/documentation">Documentation</a></li>
			<li><a href="<?php echo base_url(); ?>pages/scheduling">Scheduling</a></li>
			<li><a href="<?php echo base_url(); ?>pages/practice_management">Practice Management</a></li>
            <li><a href="<?php echo base_url(); ?>pages/billing">Billing</a></li>						
		</ul>
	</li>
	<li><a href="<?php echo base_url(); ?>pages/why_physioplus">Why Physioplus</a>
		<ul>
			<li><a href="<?php echo base_url(); ?>pages/pt_focused">PT Focused</a></li>
			<li><a href="<?php echo base_url(); ?>pages/access_anywhere">Access Anywhere</a></li>
			<li><a href="<?php echo base_url(); ?>pages/no_it">EMR Security</a></li>
            <li><a href="<?php echo base_url(); ?>pages/easy_use">Easy to Use</a></li>						
		</ul>
	</li>
	<li><a href="<?php echo base_url(); ?>pages/faq">FAQ</a></li>
	<li><a href="<?php echo base_url(); ?>pages/upgrade_pricing">Pricing</a></li>	
	<li><a href="<?php echo base_url(); ?>pages/about_us">About Us</a>
    	<ul>
        	<li><a href="<?php echo base_url(); ?>pages/our_team">Our Team</a></li>
            <li><a href="<?php echo base_url(); ?>pages/career">Careers</a></li>
            <li><a href="<?php echo base_url(); ?>pages/contact_us">Contact Us</a></li>
		</ul>
	</li>
</ul><br /><br /><br /><br />
<ul id="lognav">
	
			
			<!--<li><a href="<?php echo base_url ();?>patient/patient/login">Patient Login</a></li>-->

</ul>
	</div>
</div> 

 
 
</div>
 

</div>

</div>
 
<div class="wrapper">
<div class="home" style="margin-top:10px; margin-bottom:10px">
		<a href="<?php echo base_url(); ?>" class="style42">
		<img src="<?php echo base_url(); ?>images/Untitled-1.jpg" align="left" style="padding-right:5px">
		<font color="blue">Home</font></a>
	</div>
<table width="100%">
<tr>
<td >
<table width="100%">
<tr>
<form action="<?php echo base_url().'registration/add_app' ?>" method="post" name="ContactUs" id="ContactUs" class="admin_form">
<?php
if($this->session->flashdata('message')): echo '<div class="success">'.$this->session->flashdata('message').'</div>'; endif;
if($this->session->flashdata('warning')): echo '<div class="danger">'.$this->session->flashdata('warning').'</div>'; endif;

?>
<td style="float:left; margin-left:15px;">
	<h3 align="left" class="style7 style32">APP Registration</h3>
	<p align="left" class="style13">Apply here for Mobile App.</p>
		<table>
			<tr>
				<td>
					<input type="text"  placeholder="Your Name with Qualification" name="name" id="name" value="<?php echo set_value('name') ?>" style="width:350px; height:25px;"/>
					<?php echo form_error('name'); ?>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" placeholder="Your Specialities" name="specialities" id="specialities" value="<?php echo set_value('specialities') ?>" style="width:350px; height:25px;"/>
					<?php echo form_error('specialities'); ?>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" placeholder="Your Experience" name="experience" id="experience" value="<?php echo set_value('experience') ?>" style="width:350px; height:25px;"/>
					<?php echo form_error('experience'); ?>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" id="education" placeholder="Your Education" name="education" value="<?php echo set_value('education') ?>" style="width:350px; height:25px;"/>
					<?php echo form_error('education'); ?>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" id="email" placeholder="Your Email Id" name="email" value="<?php echo set_value('email') ?>" style="width:350px; height:25px;"/>
					<?php echo form_error('email'); ?>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" id="mobile" placeholder="Your Mobile Number" name="mobile" value="<?php echo set_value('mobile') ?>" style="width:350px; height:25px;"/>
					<?php echo form_error('mobile'); ?>
				</td>
			</tr>
			<tr>
				<td>
					<textarea id="address" placeholder="Your Address" name="address" value=""  style="width:340px; height=100px;"></textarea>
					<?php echo form_error('address'); ?>
				</td>
			</tr>
		</table>
</td>

<td style="float:right; margin-right:15px;">
		<h3 align="left" class="style7 style32">Clinic Details</h3>
		<table>
			<tr>
				<td>
					<h5>App Icon ( size(512X512))</h5>
					 <input type='file' id='logo_upload' name='logo_upload'>
                     <input type="hidden" name="upload_img" id="upload_img" />
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" id="clinic_name" placeholder="Your Clinic Name" name="clinic_name" value="<?php echo set_value('clinic_name') ?>" style="width:350px; height:25px;"/>
					<?php echo form_error('clinic_name'); ?>
				</td>
			</tr>
			<tr></tr>
			<tr>
				<td>
					<input type="text" id="clinic_website" placeholder="Your Clinic Website" name="clinic_website" value="<?php echo set_value('clinic_website') ?>" style="width:350px; height:25px;"/>
					<?php echo form_error('clinic_website'); ?>
				</td>
			</tr>
			
			<tr>
				<td>
				<h4>Clinic Timings : </h4> </br>
				<select name="clinic_from" style="height:50px; width:360px;">
					<option value="">From Time</option>
					<option value="1"  >1 am</option>
					<option value="2" >2 am</option>
					<option value="3" >3 am</option>
					<option value="4">4 am</option>
					<option value="5" >5 am</option>
					<option value="6" >6 am</option>
					<option value="7" >7 am</option>
					<option value="8"  >8 am</option>
					<option value="9" >9 am</option>
					<option value="10">10 am</option>
					<option value="11" >11 am</option>
					<option value="12" >12 am</option>	
				</select>
					<?php echo form_error('clinic_from'); ?>
				</td>
			</tr>
			<tr>
				<td>
				<select name="clinic_to" style="height:50px; width:360px;">
					<option value="">To Time</option>
					<option value="1" >1 pm</option>
					<option value="2" >2 pm</option>
					<option value="3" >3 pm</option>
					<option value="4" >4 pm</option>
					<option value="5" >5 pm</option>
					<option value="6" >6 pm</option>
					<option value="7" >7 pm</option>
					<option value="8"  >8 pm</option>
					<option value="9" >9 pm</option>
					<option value="10">10 pm</option>
					<option value="11" >11 pm</option>
					<option value="12" >12 pm</option>
				</select>
					<?php echo form_error('clinic_to'); ?>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" class="submit" value="Submit" style="margin-top:10px;"/>
				</td>
			</tr>
		</table>

</td>
</tr>

</table>
</td>
</tr>
</table>
</form>
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
 <script src="<?php  echo base_url();  ?>assets/js/vendor/jgrowl/jquery.jgrowl.min.js"></script>
 <script type="text/javascript" src="<?php  echo base_url();  ?>assets/js/jquery.min.js"></script>
<script>
$(document).ready(function() {
	$(document).on('change', '#logo_upload', function(e){
				var data = new FormData();
				data.append('logo', $('#logo_upload').prop('files')[0]);
				$.ajax(
				{
					url : '<?php echo base_url().'registration/logo_upload' ?>',            
					processData: false, 
					contentType: false, 
					data : data,
					type: "POST",
					dataType : 'json',  
					success:function(data, textStatus, jqXHR,form) 
					{
						if(data.status == 'success'){
							$('#upload_img').val(data.file_name);
							alert("Logo Has Been Added Successfully!");
								
						} else {
							alert("Logo Has Been Added Successfully!");
								
						}
						
					},
					
				});
		
			});
	
});
</script>
</body>
</html>