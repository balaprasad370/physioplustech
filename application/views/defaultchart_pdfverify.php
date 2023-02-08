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
<?php //include_once("analyticstracking.php")?>
<!-- Main Wrapper -->
<div class="main-wrapper">
	<!-- Top Background -->
		<!-- Pattern-->
		<div class="pattern"> 
		<div class="main-wrapper">

<!-- Top Background -->
<div class="top-bg"> 
<!-- Pattern-->
<div class="pattern"> 

<!-- Header -->
<div class="header">
	<div class="wrapper">
	<div class="logo" style="width: auto;"><!--<h1></h1>-->
	<a href="<?php echo base_url(); ?>pages/home">
	
	<?php //$c_id = $this->uri->segment('4');
	$this->db->where('client_id',$c_id);
	$this->db->select('logo')->from('tbl_client');
	$res = $this->db->get();
	$logo = $res->row()->logo;
?>
    <img src="<?php echo base_url(); ?>images/logo_new.png" style="height:76px;">
    </a>
    </div>
   <ul id="lognav">
		<li><a href="<?php echo base_url ();?>patient/patient/login">Patient Login</a></li>
	</ul>
	</div>
</div><!-- END Header -->

<!-- END Main Content -->
 
</div>
<!-- Pattern -->

</div>
<!-- Background -->
		</div><!-- END Pattern -->
	<!-- Wrapper Section -->
	<?php if($pay == 'paid') { ?>
	
	<form class="checkout" action="<?php echo base_url().'razorpay/data1.php' ?>" method="post">
			<?php $this->db->where('patient_id',$this->uri->segment(5));
			 $this->db->select('chartname,amount,chart_no')->from('defaultchart_detail');
			 $res = $this->db->get();
			 $chart = $res->row()->chartname; 
			 $chart_no = $res->row()->chart_no; 
			 $amount = $res->row()->amount; ?>
			 
	<?php 
	$CI =& get_instance();
	$CI->load->model(array('registration_model'));
	$client_id=$this->uri->segment(4);
	$profileInfo = $CI->registration_model->getcheckdet1($client_id);
	$c_id = $this->uri->segment('4');
	foreach($profileInfo as $profile) { ?>
			<input type="hidden" name="transtype" id="transtype" value="exercisechart">
			<input type="hidden" name="Bname" id="Bname" value="<?php echo $profile['first_name'].$profile['last_name'] ?>">
			<input type="hidden" name="Bemail" id="Bemail" value="<?php echo $profile['email'] ?>">
			<input type="hidden" name="client_id" id="client_id" value="<?php echo $profile['client_id'] ?>">
			<input type="hidden" name="Baddress" id="Baddress" value="<?php echo $profile['address'] ?>">
			<input type="hidden" name="Bcity" id="Bcity" value="<?php echo $profile['city'] ?>">
			<input type="hidden" name="Bstate" id="Bstate" value="<?php echo $profile['state'] ?>">
			<input type="hidden" name="Bzip" id="Bzip" value="<?php echo $profile['zipcode'] ?>">
			<input type="hidden" name="Bmobile" id="Bmobile" value="<?php echo $profile['mobile'] ?>">
			<input type="hidden" name="duration" id="duration" value="0">
			<input type="hidden" name="location" id="location" value="<?php echo $chart_no; ?>">
			<input type="hidden" name="months" id="months" value="0">
			<input type="hidden" name="sms" id="sms" value="0">
			<input type="hidden" name="user" id="user" value="<?php echo $p_id; ?>" >
		<?php  } ?>
	<div class="wrapper">
		<div align="center">
		</br>
			<img src="<?php echo base_url().'/uploads/logo/'.$logo ?>" width=500 height=600>
			<br><br>
			<?php if($amount > 500){
					$total = $amount + ($amount * 0.05);
			} else { $total = $amount + ($amount * 0.10);  }  ?>
			<?php echo $chart.'  -  Rs.'.$total; ?>  
			<input type="hidden" name="amt" id="amt" value="<?php echo $total; ?>" >
	
			<br> <br>
			<button class="btn btn-info" type="submit"><strong>Purchase</strong></button>
			<br>
			<br>
			Click here to purchase your Exercise Chart </br><br>
			<br><br><br><br><br>
		</div>
	</div>
	</form>
	<?php } elseif($pay == 'free')  { ?> 
	
	<div class="wrapper">
		<div align="center">
		</br>
			<img src="<?php echo base_url().'/uploads/logo/'.$logo ?>" width="500" height="600">
			<br><br><br>
			 <form class="form-horizontal" id="my_form" action="<?php echo base_url(); ?>pages/default_pdf/" method="get">
			  <input type="hidden" style="height:40px;text-align: center" name="code" id="code" value="<?php echo $code.'-'.$c_id; ?>"> &nbsp;&nbsp;&nbsp; <input type="submit" class="btn btn-success btn-large" style="height:45px" value="Download Exercise">
			</form>   
			<br>
			<!--Enter your Exercise Code
			<br><br><br><br><br>
			<font><i>To retrieve your on-line custom home exercise program, please enter your "Exercise Code" in the field above. Your code is located in the email sent to you OR at the top of the printed handout provided to you.</i></font>
		--></div>
	</div>
	<?Php } ?>
	
<br><br>
<?php echo $this->load->view('footer_view'); ?>

</div>
<!-- END Main Wrapper -->
</div>
</body>
</html>