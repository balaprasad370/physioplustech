<!DOCTYPE html>
 
 
 
 <html lang="en"> 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Checkout Form</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/checkout.css">
   
</head>
<?php 
	$CI =& get_instance();
	$CI->load->model(array('registration_model'));
	$profileInfo = $CI->registration_model->getcheckdet();
?>
<body>
 <form class="checkout" action="http://physioplustech.com/PHP_Kit/IFRAME_KIT/dataFrom.php" method="post">
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
	  <select class="checkout-input checkout-name" id="smss" >
			<option value="0">----Select---</option>
			<option value="40">200 SMS</option>
			<option value="80">400 SMS</option>
			<option value="200">1000 SMS</option>
			<option value="400">2000 SMS</option>
			<option value="1000">5000 SMS</option>
			<option value="2000">10000 SMS</option>
	  </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="text" class="checkout-input checkout-name" readonly name="rate" id="rate" placeholder="Price" autofocus>
	  <div id="message"></div>
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
		$("#transaction_amount").val($(this).find("option:selected").attr("value"));
    });
	alert('dfhsgvhdf');
	$("#smss").change(function() {
		var value = $(this).val();
		if(value == 40){  
			total = parseInt(40 * 0.10);
			var amt = 40 + parseInt(total);
			$('#price').append('Rs:'+amt);
			$('#sms').val(200);
        }else if(value == 80 ){
			total = parseInt(80 * 0.10);
			var amt = 80 + parseInt(total);
			$('#price').append('Rs:'+amt);
			$('#sms').val(400);
		}else if(value == 200 ){
			total = parseInt(200 * 0.10);
			var amt = 200 + parseInt(total);
			$('#price').append('Rs:'+amt);
			$('#sms').val(1000);
		}else if(value == 400 ){
			total = parseInt(400 * 0.10);
			var amt = 400 + parseInt(total);
			$('#price').append('Rs:'+amt);
			$('#sms').val(2000);
		}else if(value == 1000 ){
			total = parseInt(1000 * 0.05);
			var amt = 1000 + parseInt(total);
			$('#price').append('Rs:'+amt);
			$('#sms').val(5000);
		}else{
			total = parseInt(2000 * 0.05);
			var amt = 2000 + parseInt(total);
			$('#price').append('Rs:'+amt);
			$('#sms').val(10000);
		}
		
    });
	
});
</script>
</html>
