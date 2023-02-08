<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Physiotherapy Invoice</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/checkout.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <style type="text/css">
.style2 {color: #FFFFFF}
</style>
</head>
<?php 
	$CI =& get_instance();
	$CI->load->model(array('registration_model'));
	$profileInfo = $CI->registration_model->getcheckdetails($client_id);
?>
  
<body>
  <form class="checkout" action="<?php echo base_url().'razorpay/data2.php' ?>" method="post">
    <div class="checkout-header">
	
      <h1 class="checkout-title">
        Physiotherapy Invoice
        <span class="checkout-price" id="price"></span>
		 <span class="checkout-transtype" id="transtype"></span>
		  <input type="hidden" name="transtype" id="transtype" value="App-Invoice">
		  <input type="hidden"  name="amt" id="transaction_amount">
		 <input type="hidden" name="amount" id="amount" value="<?php echo $amount; ?>">
		
		</h1>    
		
		
    </div>
	<table width="359" height="193">
	<?php foreach($profileInfo as $profile) {?>
		<input type="hidden" name="client_id" id="client_id" value="<?php echo $profile['client_id']  ?>">
		
	<tr>
    	<td height="46"><label>Full Name</label></td>
		<td>:</td>
		<td>
			<input type="text" name="name" id="name" value="<?php echo $profile['first_name'] ?>">
		</td>
	 </tr>
	 <tr>
    	<td height="46"><label>Email</label></td>
		<td>:</td>
		<td><input type="text" name="email" id="email" value="<?php echo $profile['email'] ?>">
		</td>
	 </tr>
	  <tr>
    	<td height="46"><label>Phone</label></td>
		<td>:</td>
		<td><input type="text" name="mobile" id="mobile" value="<?php echo $profile['mobile'] ?>">
		</td>
	 </tr>
	 <tr>
    	<td height="46"><label>Address </label></td>
		<td>:</td>
		<td><input type="text" name="address" id="address" value="<?php echo $profile['address'] ?>">
		</td>
	 </tr>
	 
	<tr>
    	<td height="46"><label>City</label></td>
		<td>:</td>
		<td>	<input type="text" name="Bcity" id="Bcity" value="<?php echo $profile['city'] ?>">
		</td>
	 </tr>
	 <tr>
    	<td height="46"><label>State</label></td>
		<td>:</td>
		<td><input type="text" name="Bstate" id="Bstate" value="<?php echo $profile['state'] ?>">
		</td>
	 </tr>
	
	 <tr>
    	<td height="46"><label>Country</label></td>
		<td>:</td>
		<td><?php echo 'India' ?></td>
	 </tr>
	 <tr>
    	<td height="46"><label>Zip</label></td>
		<td>:</td>
		<td><input type="text" name="Bzip" id="Bzip" value="<?php echo $profile['zipcode'] ?>">
		
		</td>
	 </tr>
	 	 <input type='hidden' name='bill_id'id="bill_id"  style="width:35px" value="<?php echo $bill_id; ?>" />
	 
	
	 
     <?php } ?>
	 </table>
    <p>
      <input type="submit" value="Make Payment" class="checkout-btn" name="submit" id="submit">
    </p>
  </form>
   <div id="details" style="position: absolute; top: 100px; right: 100px;">
	
  </div>
  <div align="center">Before Purchase click Check rate </div>

  <div class="about">
    <p class="about-links">
      Thanks For Your subscription
    </p>
    <p class="about-author">
      &copy; 2014 All Rights Reserved By -
      <a href="http://www.physioplustech.com/pages/upgrade_pricing" target="_blank">PhysioPlusTech</a><br>
     For queries <a href="http://www.physioplustech.com/pages/contact_us" target="_blank">Contact Us</a>
    </p>
  </div>
 </body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script type="text/javascript" src="<?php  echo base_url();  ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>js/excanvas.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery-ui-1.10.2.custom.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.gritter.min.js"></script> 
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.uniform.js"></script> 
<script src="<?php echo base_url(); ?>js/select2.min.js"></script>
<script>
$(document).ready(function() {

    var price = $('#amount').val();
	$("#price").html('');
	$("#price").html('Rs:'+Math.round(price));
	$("#transaction_amount").val(Math.round(price));
$("#checkrate").click(function(){
	var price = $('#amount').val();
	/* if(price >= 500) {
	$("#charges").val('5%');
		total = parseInt(price) + (price * 0.05);
	} else {
	$("#charges").val('10%');
		total = parseInt(price) + (price * 0.10);
	} */
	$("#price").html('');
	$("#price").html('Rs:'+Math.round(price));
	$("#transaction_amount").val(Math.round(price));
	$('#submit').show();
});
});

</script>
</html>

