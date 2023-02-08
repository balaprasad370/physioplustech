<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Checkout Form</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/checkout.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<?php 
	$CI =& get_instance();
	$CI->load->model(array('registration_model'));
	$profileInfo = $CI->registration_model->getcheckdet();
?>
<body>
  <form class="checkout" action="<?php echo base_url() ?>PHP_Kit/IFRAME_KIT/dataFrom.php" method="post">
    <div class="checkout-header">
      <h1 class="checkout-title">
        Checkout
        <span class="checkout-price" id="price"></span>
		<input type="hidden" name="transaction_amount" id="transaction_amount">
		<?php foreach($profileInfo as $profile) {?>
			<input type="hidden" name="transtype" id="transtype" value="psmsupgrade">
			<input type="hidden" name="Bname" id="Bname" value="<?php echo $profile['first_name'].$profile['last_name'] ?>">
			<input type="hidden" name="client_id" id="client_id" value="<?php echo $profile['client_id'] ?>">
			<input type="hidden" name="Bemail" id="Bemail" value="<?php echo $profile['email'] ?>">
			<input type="hidden" name="client_id" id="client_id" value="<?php echo $profile['client_id'] ?>">
			<input type="hidden" name="duration" id="duration" value="0">
			<input type="hidden" name="user" id="user" value="0">
			<input type="hidden" name="months" id="months" value="0">
			<input type="hidden" name="location" id="location" value="0">
			<input type="hidden" name="Baddress" id="Baddress" value="<?php echo $profile['address'] ?>">
			<input type="hidden" name="Bcity" id="Bcity" value="<?php echo $profile['city'] ?>">
			<input type="hidden" name="Bstate" id="Bstate" value="<?php echo $profile['state'] ?>">
			<input type="hidden" name="Bzip" id="Bzip" value="<?php echo $profile['zipcode'] ?>">
			<input type="hidden" name="Bmobile" id="Bmobile" value="<?php echo $profile['mobile'] ?>">
			<input type="hidden" name="sms" id="sms" value="">
		<?php } ?>
      </h1>
    </div>
    <p>
	  <select class="checkout-input checkout-name" id="smss" name="smss">
			<option value="0">----Select---</option>
			<option value="400">1000 SMS</option>
			<option value="600">2000 SMS</option>
			<option value="1250">5000 SMS</option>
	
	  </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="text" class="checkout-input checkout-name" readonly name="rate" id="rate" placeholder="Price" autofocus>
	  <div id="message"></div>
	 </p>
	  <p>
    	<label>Online Charges : </label>
		<input name="charges" type="text" readonly id="charges"><br>
	</p>
    <p>
      <input type="submit" value="Purchase" class="checkout-btn">
    </p>
  </form>

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
<script src="<?php echo base_url(); ?>js/excanvas.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery-ui-1.10.2.custom.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.gritter.min.js"></script> 
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.uniform.js"></script> 
<script src="<?php echo base_url(); ?>js/select2.min.js"></script>
<script>
$(document).ready(function() {
	$('#price').append('$0');
    $("#smss option").filter(function() {
        return $(this).val() === $("#rate").val();
    }).attr('selected', true);
	
    $("#smss").change(function() {
		$('#message').html('');
		$('#price').html('');
        $("#rate").val($(this).find("option:selected").attr("value"));
		value = $(this).find("option:selected").attr("value");
		if(value > 500) {
			$("#charges").val('5%');
			total = parseInt(value * 0.05);
		} else {
			$("#charges").val('10%');
			total = parseInt(value * 0.10);
		}
		amt = parseInt(total) + parseInt(value);
		$("#transaction_amount").val(amt);
    });
	
	$("#smss").change(function() {
		var value = $(this).val();
		if(value == 400){
			total = parseInt(400 * 0.10);
			var amt = 400 + parseInt(total);
			$('#price').append('Rs:'+amt);
			
			$('#sms').val(1000);
        }else if(value == 600 ){
			total = parseInt(600 * 0.05);
			var amt = 600 + parseInt(total);
			$('#price').append('Rs:'+amt);
			$('#sms').val(2000);
		}else {
			total = parseInt(1250 * 0.05);
			var amt = 1250 + parseInt(total);
			$('#price').append('Rs:'+amt);
			
			$('#sms').val(5000);
		}
		
    });
	
});
</script>
</html>
