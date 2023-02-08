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
  <form class="checkout" action="<?php echo base_url().'razorpay/data1.php' ?>" method="post">
    <div class="checkout-header">
      <h1 class="checkout-title">
        Checkout
        <span class="checkout-price" id="price"></span>
		<input type="hidden" name="transaction_amount" id="transaction_amount">
                <input type="hidden" name="amount" id="amount">
		<?php foreach($profileInfo as $profile) {?>
			<input type="hidden" name="transtype" id="transtype" value="tsmsupgrade">
			<input type="hidden" name="name" id="name" value="<?php echo $profile['first_name'].$profile['last_name'] ?>">
			<input type="hidden" name="client_id" id="client_id" value="<?php echo $profile['client_id'] ?>">
			<input type="hidden" name="email" id="email" value="<?php echo $profile['email'] ?>">
			<input type="hidden" name="client_id" id="client_id" value="<?php echo $profile['client_id'] ?>">
			<input type="hidden" name="duration" id="duration" value="<?php echo $profile['plan_type'] ?>">
			<input type="hidden" name="user" id="user" value="0">
			<input type="hidden" name="months" id="months" value="0">
			<input type="hidden" name="location" id="location" value="0">
			<input type="hidden" name="Baddress" id="Baddress" value="<?php echo $profile['address'] ?>">
			<input type="hidden" name="Bcity" id="Bcity" value="<?php echo $profile['city'] ?>">
			<input type="hidden" name="Bstate" id="Bstate" value="<?php echo $profile['state'] ?>">
			<input type="hidden" name="Bzip" id="Bzip" value="<?php echo $profile['zipcode'] ?>">
			<input type="hidden" name="mobile" id="mobile" value="<?php echo $profile['mobile'] ?>">
			<input type="hidden" name="sms" id="sms" value="">
		<?php } ?>
      </h1>
    </div>
    <!--
    <p>
	  <select class="checkout-input checkout-name" id="smss" name="smss">
			<option value="0">----Select---</option>
			<option value="125">200 SMS</option>
			<option value="220">400 SMS</option>
			<option value="500">1000 SMS</option>
			<option value="900">2000 SMS</option>
			<option value="2250">5000 SMS</option>
			<option value="4500">10000 SMS</option>
	  </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="text" class="checkout-input checkout-name" readonly name="rate" id="rate" placeholder="Price" autofocus>
	  <div id="message"></div>
	 </p>-->

     <p style="width:400px;">
	  <select  style="width:170px;float:left" class="checkout-input checkout-name" id="smss" name="smss">
			<option value="0">----Select---</option>
			<!--
			<option value="125">200 SMS</option>
			<option value="220">400 SMS</option>
			<option value="500">1000 SMS</option>
			<option value="900">2000 SMS</option>
			<option value="2250">5000 SMS</option>
			<option value="4500">10000 SMS</option>-->
			<option value="3100">10000 - Rs.0.31/SMS</option>
			<option value="1750">5000 - Rs.0.35/SMS</option>
			<option value="780">2000 - Rs.0.39/SMS</option>
			<option value="430">1000 - Rs.0.43/SMS</option>
			<option value="188">400 - Rs.0.47/SMS</option>
			<option value="102">200 - Rs.0.51/SMS</option>
	  </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input  style="width:150px;float:left" type="text" class="checkout-input checkout-name" readonly name="rate" id="rate" placeholder="Price" autofocus>
	  <div id="message"></div>
	 </p>
<!--

	 <p>
    	<label>Online Charges : </label>
		<input name="charges" type="text" readonly id="charges"><br>
	</p>  -->
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

/*
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
		
    });  */
    
     $("#smss").change(function() {
		$('#message').html('');
		$('#price').html('');
        $("#rate").val($(this).find("option:selected").attr("value"));
		value = $(this).find("option:selected").attr("value");
	        amt = parseInt(value);
		$("#transaction_amount").val(amt);
		$("#amount").val(amt);
		
    });
   /*	
	$("#smss").change (function() {
		
		var value = $(this).val();
		
		if(value == 125){
			total = parseInt(125 * 0.10);
			var amt = 125 + parseInt(total);
			$('#price').append('Rs:'+amt);
			$('#sms').val(200);
        }else if(value == 220 ){
			total = parseInt(220 * 0.10);
			var amt = 220 + parseInt(total);
			$('#price').append('Rs:'+amt);
			$('#sms').val(400);
		}else if(value == 500 ){
			total = parseInt(500 * 0.10);
			var amt = 500 + parseInt(total);
			$('#price').append('Rs:'+amt);
			$('#sms').val(1000);
		}else if(value == 900 ){
			total = parseInt(900 * 0.05);
			var amt = 900 + parseInt(total);
			$('#price').append('Rs:'+amt);
			$('#sms').val(2000);
		}else if(value == 250 ){
			total = parseInt(2250 * 0.05);
			var amt = 2250 + parseInt(total);
			$('#price').append('Rs:'+amt);
			$('#sms').val(5000);
		}else{
			total = parseInt(4500 * 0.05);
			var amt = 4500 + parseInt(total);
			$('#price').append('Rs:'+amt);
			$('#sms').val(10000);
		}
		
    });
*/

     $("#smss").change (function() {
		
		var value = $(this).val();
		
		if(value == 102){
			//total = parseInt(125 * 0.10);
			var amt = 102;
//			+ parseInt(total);
			$('#price').append('Rs:'+amt);
			$('#sms').val(200);
        }else if(value == 188 ){
			//total = parseInt(220 * 0.10);
			var amt = 188;
			//+ parseInt(total);
			$('#price').append('Rs:'+amt);
			$('#sms').val(400);
		}else if(value == 430 ){
			//total = parseInt(500 * 0.10);
			var amt = 430 ;
			//+ parseInt(total);
			$('#price').append('Rs:'+amt);
			$('#sms').val(1000);
		}else if(value == 780 ){
			//total = parseInt(900 * 0.05);
			var amt = 780;
//			+ parseInt(total);
			$('#price').append('Rs:'+amt);
			$('#sms').val(2000);
		}else if(value == 1750 ){
			//total = parseInt(2250 * 0.05);
			var amt = 1750;
//			+ parseInt(total);
			$('#price').append('Rs:'+amt);
			$('#sms').val(5000);
		}else if(value == 3100 ){
			//total = parseInt(4500 * 0.05);
			var amt = 3100 ;
			//+ parseInt(total);
			$('#price').append('Rs:'+amt);
			$('#sms').val(10000);
		}
		else{
			var amt = 0 ;
			//+ parseInt(total);
			$('#price').append('Rs:'+amt);
		}
		
    });
	
});
</script>
</html>
