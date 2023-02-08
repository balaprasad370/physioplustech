<!DOCTYPE HTML>
<html>
<head>

<!-- Define Charset -->
<meta charset="utf-8"/>

<!-- Responsive Metatag -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<meta name="keywords" content="Practice management software, Clinic software, Physio Plus Tech, Healthcare practice management,Physiotherapy,Physiotherapy Software,Physiotherapy Clinic Management software India "/>
<meta name="description" content="Physio Plus Tech is the most advanced and affordable healthcare practice management system. Physio Plus Tech is completely web-based, secure and reliable and has no upfront costs or contracts."/>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/jgrowl/css/jquery.jgrowl.min.css">

  <title> Physio Plus Tech </title>
<?php echo $this->load->view('includes_view'); ?>
</head>
<body>
<?php include_once("analyticstracking.php")?>
<!-- Main Wrapper -->
<div class="main-wrapper"  style="width:100%;">

<!-- Pattern-->
<div class="pattern" style="width:100%;"> 
<!-- Main Wrapper -->
<div class="main-wrapper">

<!-- Top Background -->
<div class="top-bg"> 
<!-- Pattern-->
<div class="pattern" > 

<!-- Header -->
<div class="header" style="width:100%;">
	<div class="wrapper">
	<div class="logo" style="width: auto;"><!--<h1></h1>-->
	<a href="<?php echo base_url(); ?>pages/home">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url(); ?>images/logo_new.png" style="height:76px;">
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
</ul><br /><br />
</div>
</div><!-- END Header -->

<!-- END Main Content -->
 
</div>
<!-- Pattern -->

</div>
<!-- Background -->

</div>

</br></br>
<div class="wrapper" >
<form action="<?php echo base_url().'pages/add_clinicdetails' ?>" method="post"  />

<div class="row">
	
<center><h1><strong>Writing Contest : Win a Website or Mobile app for you or your clinic</strong></h1></center>
<center><h3><font color="red" > Worth Rs:10,000/- </font></h3></center>
<table class="table_responsive">
<?php if($this->session->flashdata('Message')): echo '<div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>'.$this->session->flashdata('Message').'</div>'; endif; ?>
<?php if($this->session->flashdata('Error')): echo '<div class="alert alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>'.$this->session->flashdata('Error').'</div>'; endif; ?>

<tr><td colspan="3"><input type="text" placeholder="Enter Full Name *" required name="name"  ></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td colspan="3"><input type="text" placeholder="Enter Mobile Number*" required name="mobile_no"  ></td></tr>
<tr><td colspan="3"><input type="text" required name="email" placeholder="Enter Email *" id="email"  />
 <span class="mail" style="color:red;font-weight:bold"> </br>Already  Submitted</span></td>
<input type="hidden" name="mail1" id="mail1" />
 <td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td colspan="3"><input type="text" placeholder="Enter Clinic Name*" required name="clinic_name"  ></td></tr>
<tr><td colspan="7"><select style="width:100%;" id="role" class="chosen-select chosen-transparent form-control" required name="role"  >
<option>Please Select Role </option>
<option value="student"> Student</option>
<option value="physiotherapist"> Physiotherapist </option>
<option value="academician"> Academician </option>
</select></td></tr>
<tr><td colspan="7"><textarea class="span6 ckeditor m-wrap" placeholder="Enter Your Message" name="message" id="message"  style="width:98%; height:250px;" ></textarea>
						  <span id="count" style="color:red;font-weight:bold title_count"></span>
					   </td></tr>
<tr><td colspan="3"><center>&nbsp;&nbsp;&nbsp;&nbsp;</center></td></tr>
<tr><td colspan="3"><center>&nbsp;&nbsp;&nbsp;&nbsp;</center></td></tr>
<tr><td colspan="7"><center><button class="btn btn-success" style="width:40%;" type="submit" ><strong>Submit</strong></button></center></td></tr>
</table></br></br></br>
</form>
</div>
</div>


<?php echo $this->load->view('footer_view'); ?>

</div>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js"></script> 
<script type="text/javascript" src="<?php  echo base_url();  ?>assets/js/jquery.min.js"></script>

<script src="<?php  echo base_url();  ?>assets/js/vendor/jgrowl/jquery.jgrowl.min.js"></script>
<script>
$('document').ready(function() {
	$('#count').hide();
	var text_max1 = 500;
     $('#count').html(text_max1 + ' characters remaining');
     $('.m-wrap').keyup(function() {
		$('#count').show();
		var text_length = $('.m-wrap').val().length;
        var text_remaining = text_max1 - text_length;
        $('#count').html(text_remaining + ' characters remaining');
     });
	$('.mail').hide();
	$("#role").click(function(e){
		e.preventDefault();
		var email = $('#email').val();
		$.ajax({
			url : '<?php echo base_url().'registration/email1_check' ?>',
			type: "POST",
			data : {e_id:email},
			dataType: 'json', 
			success:function(data, textStatus, jqXHR,form) 
				{
					if(data.status == 'success'){
						$('.mail').show();
						setTimeout(function(){ 
						    window.location.reload();
						}, 2000);
					} else {
						$('.mail').hide();
					}
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$('.email').hide();
			}
		});
	});
	/*  $('form').on('submit', function (event) {
				 event.preventDefault();
				
				 var  formID = $(this).attr("id");
				 var  formURL = $(this).attr("action");
				  var  formURL = $(this).attr("action");
				$.ajax({
					type: 'post',
					url: $(this).attr('action'),
					data:$(this).serialize(),
					success:function(data, textStatus, jqXHR,form) 
					{
						if(data.status == 'Success') {
						$.jGrowl("Details Has Been Added Successfully!");
						setTimeout(function(){ 
								window.location.reload();
						}, 1000);
						} else {
							$.jGrowl("Details Has Been Added Successfully!");
							setTimeout(function(){ 
									//window.location.reload();
							}, 1000);
						}
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						$.jGrowl("Setting Details Has Not Been Added Successfully!");
						setTimeout(function(){ 
								//window.location.reload();
						}, 1000);
					}
			  });
					
		});  
	 */
});
</script>
</body>
</html>