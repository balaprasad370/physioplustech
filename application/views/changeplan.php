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
  <form class="checkout" action="http://physioplustech.com/PHP_Kit/IFRAME_KIT/dataFrom1.php" method="post">
    <div class="checkout-header">
	
      <h1 class="checkout-title">
        Checkout
        <span class="checkout-price" id="price"></span>
		 <span class="checkout-transtype" id="transtype"></span>
		  <input type="hidden" name="transtype" id="transtype" value="Events">
		 <?php /* if($this->uri->segment(5) == '103') { ?>
			<input type="hidden" name="amt" value="10">
		 <?php } else { */ ?>	
		  <input type="hidden" name="amt" id="transaction_amount">
		<?php // } ?></h1>    
		
		
    </div>
	<table width="359" height="193">
	<?php foreach($profileInfo as $profile) {?>
		<input type="hidden" name="client_id" id="client_id" value="<?php echo $profile['client_id']  ?>">
		<input type="hidden" class="amount" name="amount" id="amount" value="">
		<input type="hidden" class="amount1" name="amount1" id="amount1" value="">
		<input type="hidden" class="amount2" name="amount2" id="amount2" value="">
		
		<center>Confirm Registration Details</center>
	<tr>
    	<td height="46"><label>Full Name</label></td>
		<td>:</td>
		<td>
			<input type="text" name="Bname" id="Bname" value="<?php echo $profile['first_name'] ?>">
		</td>
	 </tr>
	 <tr>
    	<td height="46"><label>Email</label></td>
		<td>:</td>
		<td><input type="text" name="Bemail" id="Bemail" value="<?php echo $profile['email'] ?>">
		</td>
	 </tr>
	  <tr>
    	<td height="46"><label>Phone</label></td>
		<td>:</td>
		<td><input type="text" name="Bmobile" id="Bmobile" value="<?php echo $profile['mobile'] ?>">
		</td>
	 </tr>
	 <tr>
    	<td height="46"><label>Address </label></td>
		<td>:</td>
		<td><input type="text" name="Baddress" id="Baddress" value="<?php echo $profile['address'] ?>">
		</td>
	 </tr>
	 <span class="address_msg" style="color:red;font-weight:bold">Please Enter Address.</span>
	
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
	<span class="state_msg" style="color:red;font-weight:bold">Please Enter State.</span>
	
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
	 <span class="zip_msg" style="color:red;font-weight:bold">Please Enter Zipcode.</span>
		
	 <tr>
    	<td height="46"><label>Charges</label></td>
		<td>:</td>
		<td><input type="text" name="tax" id="tax" readonly value="">
		</td>
	 </tr>
     <?php } ?>
	 <input type='hidden' name='location'id="location"  style="width:35px" value="<?php echo $event_id; ?>" />
	  <tr>
    	<td height="46"><label>Event 
		</label></td>
		<td>:</td>
		<td><?php echo $eventname ?>
		</td>
	 </tr>	
	  <tr>
    	<td height="46"><label>Select Delegate Name(Main Conference) : 
		</label></td>
		<td>:</td>
		<td>
		   <select id="delegate" name="duration" width="220px;">
		   <option value ="">Please Select</option>
		   </br>
		    </br>
			 </br>
		   <?php			if ($delegate_name != false) {
									foreach ($delegate_name as $referal_types) {
										echo '<option value="'.$referal_types['price_id'].'">'.$referal_types['ticket_name'].'</option>';
									}
								}
							?>
		  </select>
		</td>
		<span class="msg" style="color:red;font-weight:bold">Amount has not been mentioned.</span>
			
	 </tr>	
	 
	 
	 
	 
	 
	 
	 
	<tr>
		<td height="43"><label>No of Ticket</label></td>
		<td>: &nbsp;&nbsp;</td>
	    <td><input type='button' value='-' class='qtyminus' field='user' id="userincre"/>
			<input type='text' name='user' value='1'  style="width:35px" id='ticket'/><input type='button' value='+' class='qtyplus' field='user' id="userdecre"/></br></br>
			<a href="#" id="checkrate">Confirm To Place Order</a></td></br>
	    </td>
	 </tr>
	 
	 </table>
    <p>
      <input type="submit" value="Purchase" class="checkout-btn" name="submit" id="submit">
    </p>
  </form>
  
  <div id="details" style="position: absolute; top: 100px; right: 100px;">
	
  </div>
  <div align="center">Before Purchase click Checkout </div>

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
	$('#submit').attr('disabled','disabled');
	$('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {  
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(1);
        }
    });
	
	$(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 1) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(1);
        }
    });
	
	
	 $('#delegate').change(function() {
	    var del = $('#delegate').val();
		var e_id = '<?php echo $this->uri->segment(4); ?>';
		var val =  del + '/'+ e_id;
		var url = '<?php echo base_url().'client/renewal/delegate_price/' ?>' + del + '/'+ e_id;
		
		if(del != '') {
		$.ajax({
					
					dataType: 'json',
					url: url,
					success: function(data) {
						
						if(data.status == 'failure'){
							
						} else if(data.status == 'success') {
							
							$('#amount').val(data.message);
						}  
					} 
					
					
				 });
		} else {
			
			$('#amount').val('0');
						
		}			//end AJAX
	});
	
	
	$('#preconference').change(function() {
	    var del = $('#preconference').val();
		var e_id = '<?php echo $this->uri->segment(4); ?>';
		var val =  del + '/'+ e_id;
		if(del != '') {
		var url = '<?php echo base_url().'client/dashboard/preconference_price' ?>';
		$.ajax({
		
					type: "POST",
					dataType: 'json',
					data : {value:val},
					url: url,
					success: function(data) {
						if(data.status == 'failure'){
							alert('dfhsghfdg');
						} else if(data.status == 'success') {
							
							 $('.amount1').val(data.value.price); 
						}
					}, 
					complete: function(){
							
					},
					error: function(e){ // alert error if ajax fails
						alert(e.responseText);
					} 
				 }); //end AJAX
		} else {
			$('.amount1').val('0'); 
		}
	});
	
	//alert('fddfdf');
	
	
	$('#postconference').change(function() {
	    var del = $('#postconference').val();
		var e_id = '<?php echo $this->uri->segment(4); ?>';
		var val =  del + '/'+ e_id;
		
		var url = '<?php echo base_url().'client/dashboard/postconference_price' ?>';
		if(del != ''){
		$.ajax({
		
					type: "POST",
					dataType: 'json',
					data : {value:val},
					url: url,
					success: function(data) {
						if(data.status == 'failure'){
							alert('dfhsghfdg');
						} else if(data.status == 'success') {
							
							 $('.amount2').val(data.value.price); 
						}
					}, 
					complete: function(){
							
					},
					error: function(e){ // alert error if ajax fails
						alert(e.responseText);
					} 
				 }); //end AJAX
		} else {
			$('.amount2').val('0'); 
		}
	});
	$('.state_msg').hide();
	$('.address_msg').hide();
	$('.zip_msg').hide();
		
	$('#submit').hide();
	$('.msg').hide();
	$("#checkrate").click(function(){
		var user = $('#ticket').val();
		var amount = ($('#amount').val());
		var amount1= ($('#amount1').val());
		var amount2= ($('#amount2').val());
		
		if(amount=='NaN'||amount=='') {
		 
		 var amo=0;
		}
		else 
		{
		
		var amo=parseInt(amount);
		
		}
		
		if(amount1=='NaN'||amount1=='') {
		 
		 var amo1=0;
		}
		else 
		{
		
		var amo1=parseInt(amount1);
		
		}
		
		if(amount2=='NaN'||amount2=='') {
		 
		 var amo2=0;
		}
		else 
		{
		
		var amo2=parseInt(amount2);
		
		}
		
		var pricepp = amo+amo1+amo2;
		if(pricepp != ''){
			var price = 0; 
			price = (user) * pricepp;
			if(price > 500){
				$("#tax").val('5%');
				total = price + (price * 0.05);
			} else {
				$("#tax").val('10%');
				total = price + (price * 0.01);
			}
			$("#price").html('');
			$("#price").html('Rs:'+ total);
			$('.msg').hide();
			$("#transaction_amount").val(total);
			 var address = $('#Baddress').val();
			 var zipcode = $('#zipcode').val();
			 var state = $('#state').val();
			 if(address == '0') {
				 $('.address_msg').show();
			 } else if(zipcode == '0') {
				 $('.zip_msg').show();
             } else if(state == '0') {
				 $('.state_msg').show();
			 } else {	 
			    $('#submit').show();
			    $("#submit").removeAttr("disabled"); 
			 } 
		}
		else {
			$('.msg').show();
		}
	});  
	
	
	
});
</script>
</html>
