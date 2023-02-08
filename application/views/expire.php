<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>Responsive 'Flat Profile' HTML Portfolio Template</title>
	<link href="<?php echo base_url(); ?>css/expire/demo.css" rel="stylesheet" type="text/css">
	 <link rel="stylesheet" href="<?php echo base_url(); ?>css/expire/jqbar.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/expire/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/expire/bootstrap-responsive.css">

	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,600' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/expire/style.css">
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/expire/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/expire/simpletextrotator.css" />
    <style>
.myButton {
	-moz-box-shadow:inset 0px 0px 0px 0px #f5978e;
	-webkit-box-shadow:inset 0px 0px 0px 0px #f5978e;
	box-shadow:inset 0px 0px 0px 0px #f5978e;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #f24537), color-stop(1, #c62d1f));
	background:-moz-linear-gradient(top, #f24537 5%, #c62d1f 100%);
	background:-webkit-linear-gradient(top, #f24537 5%, #c62d1f 100%);
	background:-o-linear-gradient(top, #f24537 5%, #c62d1f 100%);
	background:-ms-linear-gradient(top, #f24537 5%, #c62d1f 100%);
	background:linear-gradient(to bottom, #f24537 5%, #c62d1f 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f24537', endColorstr='#c62d1f',GradientType=0);
	background-color:#f24537;
	-moz-border-radius:42px;
	-webkit-border-radius:42px;
	border-radius:42px;
	border:3px solid #d02718;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Georgia;
	font-size:19px;
	font-weight:bold;
	padding:12px 13px;
	text-decoration:none;
	text-shadow:-4px 1px 10px #810e05;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #c62d1f), color-stop(1, #f24537));
	background:-moz-linear-gradient(top, #c62d1f 5%, #f24537 100%);
	background:-webkit-linear-gradient(top, #c62d1f 5%, #f24537 100%);
	background:-o-linear-gradient(top, #c62d1f 5%, #f24537 100%);
	background:-ms-linear-gradient(top, #c62d1f 5%, #f24537 100%);
	background:linear-gradient(to bottom, #c62d1f 5%, #f24537 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#c62d1f', endColorstr='#f24537',GradientType=0);
	background-color:#c62d1f;
}
.myButton:active {
	position:relative;
	top:1px;
}

	</style>
    <!--[if lt IE 9]> 
			<style>
				.rw-wrapper{ display: none; } 
				.rw-sentence-IE{ display: block;  }
			</style>
	<![endif]-->
</head>
<body >

	<div class="container topbottom">
		<div class="row-fluid">

			<div class="span5">
				<?php if($this->session->userdata('logo') != ''){ ?>
					<img src="<?php echo base_url().'/uploads/logo/'. $this->session->userdata('logo'); ?>" alt="Profile Avatar" class="avatar">
				<?php 
					}else{
				?>
					<img src="<?php echo base_url().'/img/NoLogo.png' ?>" alt="Profile Avatar" class="avatar">
				<?php 
					}
				?>
				<div class="navigation">
					<div>
						<ul>
							<li>
								<a href="<?php echo base_url() ?>client/dashboard/expire">Documentation</a>
							</li>
							<li>
								<a href="<?php echo base_url() ?>client/dashboard/expire1">Scheduling</a>
							</li>
							<li>
								<a href="<?php echo base_url() ?>client/dashboard/expire2">Invoice</a>
							</li>
							<li>
								<a href="<?php echo base_url() ?>client/dashboard/expire3">Practice management</a>
							</li>
							<li>
								<a href="<?php echo base_url() ?>client/dashboard/logout1">Sign out</a>
							</li>
						</ul>
					</div>
				</div> 			
			</div>

			<div class="span7 homeabout">
				<div class="person">
					<span class="name"><?php echo $this->session->userdata('firstname').$this->session->userdata('lastname'); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="<?php echo base_url() ?>client/dashboard/buy" class="myButton"><font color="white">Buy Now!</font></a></span>
					
				</div>
				
				<div class="desciption home">
					<h1><p>Your Account has <span class="rotate greentext">Expired</span></p></h1>
				</div>	
				
				<h3>Documents: </h3>
					<div class="row">
						
							 <ul>
								<li>Subjective assessment </li><br>
								<li>Evidence based Physiotherapy specific assessments with Pain scale, Motor examination, sensory examination, Special tests and outcome measures</li><br>
								<li>Can upload investigation files </li><br>
								<li>Make your own treatments protocols </li><br>
								<li>Keep a note of all the diagnosis & generate overall clinical report </li>
							 </ul>
					</div>			
				
			</div>

		</div>
	</div>
	<script src="<?php echo base_url(); ?>js/expire/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/expire/jqbar.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/expire/jquery.simple-text-rotator.min.js"></script>
	<script type="text/javascript">
	 $(document).ready(function () {			
		
            $('#bar-1').jqbar({ label: 'HTML5', value: 80, barColor: '#21ba82' });

            $('#bar-2').jqbar({ label: 'CSS', value: 99, barColor: '#21ba82' });

            $('#bar-3').jqbar({ label: 'JavaScript', value: 85, barColor: '#21ba82' });

            $('#bar-4').jqbar({ label: 'WordPress', value: 75, barColor: '#21ba82' });

			$('#bars-content .content').css({'opacity':'0',display:'none'});
			$('#bars-content .content:eq(0)').css('display','block').animate({opacity:1},1000);
			$('.jqbar:first').addClass('active');
			$('.jqbar').hover(function(){ $(this).addClass('hover');},function(){ $(this).removeClass('hover');});
			$('.jqbar').click(function(){
				$('.jqbar').removeClass('active');
				var id = $(this).addClass('active').attr('id').replace('bar','content');				
				$('#bars-content .content').css({'opacity':'0',display:'none'});
				$('#' + id).css('display','block').animate({opacity:1},1000);
				
			});		
			
			 $(".rotate").textrotator({
				animation: "spin",
				separator: ",",
				speed: 2000
			  });
        });
		
    </script>
</body>
</html>	