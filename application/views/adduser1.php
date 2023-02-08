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
  <form class="checkout" action="<?php echo base_url().'razorpay/data1.php' ?>" method="post">
    <div class="checkout-header">
      <h1 class="checkout-title">
        Checkout
        <span class="checkout-price" id="price"></span>
		<input type="hidden" name="transaction_amount" id="transaction_amount">
                <input type="hidden" name="amount" id="amount">
		<?php foreach($profileInfo as $profile) {?>
			<input type="hidden" name="transtype" id="transtype" value="userupgrade">
			<input type="hidden" name="name" id="Bname" value="<?php echo $profile['first_name'].$profile['last_name'] ?>">
			<input type="hidden" name="email" id="Bemail" value="<?php echo $profile['email'] ?>">
			<input type="hidden" name="client_id" id="client_id" value="<?php echo $profile['client_id'] ?>">
			<input type="hidden" name="Baddress" id="Baddress" value="<?php echo $profile['address'] ?>">
			<input type="hidden" name="Bcity" id="Bcity" value="<?php echo $profile['city'] ?>">
			<input type="hidden" name="Bstate" id="Bstate" value="<?php echo $profile['state'] ?>">
			<input type="hidden" name="Bzip" id="Bzip" value="<?php echo $profile['zipcode'] ?>">
			<input type="hidden" name="mobile" id="Bmobile" value="<?php echo $profile['mobile'] ?>">
			<input type="hidden" name="duration" id="duration" value="<?php echo $profile['plan_type'] ?>">
			<input type="hidden" name="location" id="location" value="0">
			<input type="hidden" name="months" id="months" value="<?php echo $profile['duration'] ?>">
			<input type="hidden" name="sms" id="sms" value="0">
			<input type="hidden" name="user" id="user" >

                        <input type="hidden" name="userOld" id="userOld" value="<?php echo $profile['num_users'] ?>">
			<input type="hidden" name="created" id="created" value="<?php echo $profile['created_date'] ?>">
			<input type="hidden" name="expiry" id="expiry" value="<?php echo $profile['expire_date'] ?>">
			<input type="hidden" name="userduration" id="userduration" value="0">
		<?php } ?>
      </h1>
    </div>
    <p>
	  <select class="checkout-input checkout-name" id="users" name="users">
			<option value="0">----Select---</option>
			<option value="100">1 User</option>
			<option value="200">2 User</option>
			<option value="300">3 User</option>
			<option value="400">4 User</option>
			<option value="500">5 User</option>	  </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="text" class="checkout-input checkout-name" readonly name="rate" id="rate" placeholder="Rate" autofocus>
	  <div id="message"></div>
	 </p>
       
	<p>
    	<label>Duration : </label>
		<input name="uduration" type="text" readonly id="uduration"><br>
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
    $("#users option").filter(function() {
        return $(this).val() === $("#rate").val();
    }).attr('selected', true);

    $("#users").change( function() {
		$('#message').html('');
		$('#price').html('');
		var value=$(this).find("option:selected").attr("value");
		$("#rate").val($(this).find("option:selected").attr("value"));
                /*
		if(value > 500) {
			$("#charges").val('5%');
			total = parseInt(value * 0.05);
		} else {
			$("#charges").val('10%');
			total = parseInt(value * 0.10);
		}  */
		var amt = parseInt(value);
		$("#transaction_amount").val(amt);
    });
	/*
	$("#users"). change(function() {
		
		var value = $(this).val();
		
		if(value == 300){
			total = parseInt(300 * 0.10);
			var amt = 300 + parseInt(total);
			$('#price').append('Rs:'+amt);
			$('#user').val(1);
        }else if(value == 600 ){
			total = parseInt(600 * 0.10);
			var amt = 600 + parseInt(total);
			$('#price').append('Rs:'+amt);
			$('#user').val(2);
		}else if(value == 900 ){
			total = parseInt(900 * 0.10);
			var amt = 900 + parseInt(total);
			$('#price').append('Rs:'+amt);
			$('#user').val(3);
		}else if(value == 1200 ){
			total = parseInt(1200 * 0.10);
			var amt = 1200 + parseInt(total);
			$('#price').append('Rs:'+amt);
			$('#user').val(4);  
		}else{
			total = parseInt(1500 * 0.10);  
			var amt = 1500 + parseInt(total);
			$('#price').append('Rs:'+amt);
			$('#user').val(5);  
		}
		
    });   */

    $("#users"). change(function() {
		
		var value = $(this).val();
		var val=$('#months').val();
		//window.alert(val);
		//window.alert(value);
		var rem=val%30;
		//window.alert(rem);
		var month=parseInt(val/30);
		if(rem>15)
		{
			month=month+1;
		}
		//window.alert(month);
		
		$('#uduration').val(month);
		$('#userduration').val(month);
		if(value == 100){
			total = parseInt(100 * month);
			var amt = parseInt(total);
			$('#price').append('Rs:'+amt);
			$('#user').val(1);
        }else if(value == 200 ){
			total = parseInt(200 * month);
			var amt = parseInt(total);
			$('#price').append('Rs:'+amt);
			$('#user').val(2);
		}else if(value == 300 ){
			total = parseInt(300 * month);
			var amt = parseInt(total);
			$('#price').append('Rs:'+amt);
			$('#user').val(3);
		}else if(value == 400 ){
			total = parseInt(400 * month);
			var amt = parseInt(total);
			$('#price').append('Rs:'+amt);
			$('#user').val(4);  
		}else if(value == 500 ){
			total = parseInt(500 * month);  
			var amt = parseInt(total);
			$('#price').append('Rs:'+amt);
			$('#user').val(5);  
		}
		else{
			var amt = parseInt(0);
			$('#price').append('Rs:'+amt);
			
		}
		
		$("#amount").val(amt);
    });

	
});
</script>
</html>
