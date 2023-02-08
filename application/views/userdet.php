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
<body>
  <form class="checkout" action="<?php echo base_url() ?>client/bill/showMessage">
    <div class="checkout-header">
      <h1 class="checkout-title">
        Checkout
        <span class="checkout-price" id="price"></span>
      </h1>
    </div>
	<table width="284" height="193">
	<tr>
    	<td height="46"><label>Full Name</label></td>
		<td><input name="name" type="text" id="name">
	 </tr>
	 <tr>
    	<td height="46"><label>Email</label></td>
		<td><input name="email" type="text" id="email">
	 </tr>
	  <tr>
    	<td height="46"><label>Phone</label></td>
		<td><input name="phone" type="text" id="phone">
	 </tr>
	 <tr>
    	<td height="46"><label>Address 1</label></td>
		<td><input name="address1" type="text" id="address1">
	 </tr>
	 <tr>
    	<td height="46"><label>Address 2</label></td>
		<td><input name="address2" type="text" id="address2">
	 </tr>
	<tr>
    	<td height="46"><label>City</label></td>
		<td><input name="city" type="text" id="city">
	 </tr>
	 <tr>
    	<td height="46"><label>State</label></td>
		<td><input name="state" type="text" id="state">
	 </tr>
	 <tr>
    	<td height="46"><label>Zip</label></td>
		<td><input name="zip" type="text" id="zip">
	 </tr>
	 <tr>
    	<td height="46"><label>Account Number</label></td>
		<td><input name="zip" type="text" id="zip">
	 </tr>
	 
	<tr>
		<td width="116" height="43"><label>Chose Plan</label></td> 
		<td width="156"><select id="duration">
				<option value="0">----Select---</option>
				<option value="1">Solo</option>
				<option value="2">Team</option>
				<option value="3">Cluster</option>
				<option value="4">Chains</option>
				<option value="5">Intitute</option>
				<option value="6">New Clinic</option>
		  </select>
	 </td>
	 </tr>
	 <tr>
		<td height="43"><label>No of User</label></td>
	   <td><input type='button' value='-' class='qtyminus' field='user' id="userincre"/>
    <input type='text' name='user' value='0' style="width:35px" id='user' />
    <input type='button' value='+' class='qtyplus' field='user' id="userdecre"/>
	<div id="unlimituser"></div>
	</td>
	 </tr>
	 <tr>
	 <td height="49"><label>No of Location</label></td>		
	  <td> <input type='button' value='-' class='qtyminus' field='location' id="locationincre"/>
    <input type='text' name='location' value='0'  style="width:35px" id='location'/>
    <input type='button' value='+' class='qtyplus' field='location' id="locationdecre"/>
	<div id="unlimitlocation"></div>
	</td>
	</tr>
	<tr>
		
		   <td width="116" height="43"><label>Duration</label></td> 
		   <td width="156"><select id="months">
				<option value="0">----Select---</option>
				<option value="1">1 Month</option>
				<option value="3">3 Months</option>
				<option value="6">6 Months</option>
				<option value="12">1 Year</option>
		  </select>
	 </td>
	 </tr>
	
	<tr>
    	<td height="46"><label>SMS Limit</label></td>
		<td><input name="sms" type="text" id="sms">
		<a href="#" id="checkrate">Check Rate</a></td>
	 </tr>
	 </table>
    <p>
      <input type="submit" value="Purchase" class="checkout-btn">
    </p>
  </form>
  
  <div id="details" style="position: absolute; top: 50px; right: 50px;background-color:orange;text-align:center;width:400px;height:200px;margin-top: 20px;margin-left: 5px;">
	
  </div>
  

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
	$('#details').hide();
    $("#duration option").filter(function() {
        return $(this).val() === $("#rate").val();
    }).attr('selected', true);

    $("#duration").live("change", function() {
		$('#details').html('');
		$('#details').show();
        $("#rate").val($(this).find("option:selected").attr("value"));
		var plan = $("#rate").val();
    });
	
	$("#duration").live("change", function() {
		
		var value = $(this).val();
		
		if(value == 1){
			$('#details').append('<br><div align="center"><table align="center"><tr><td><p style="font-size:20px">Plan Name</p></td><td>:</td><td><p style="font-size:20px">solo Plan</p></td></tr><tr><td><p style="font-size:20px">Price</p></td><td>:</td><td><p style="font-size:20px">Rs : 580/Month</p></td></tr><tr><td><p style="font-size:20px">No of User</p></td><td>:</td><td><p style="font-size:20px">1</p></td></tr><tr><td><p style="font-size:20px">No of Location</p></td><td>:</td><td><p style="font-size:20px">1</p></td></tr><tr><td><p style="font-size:20px">No of Staff</p></td><td>:</td><td><p style="font-size:20px">Unlimited</p></td></tr></table></div>');
			$('#user').show();
			$('#location').show();
			$('#unlimituser').html('');
			$('#unlimitlocation').html('');
			$('#user').val('1');
			$('#location').val('1');
			$('#price').html('$0');
			$('#userincre').show();
			$('#userdecre').show();
			$('#locationincre').show();
			$('#locationdecre').show();
			$("#user").removeAttr("disabled"); 
			$("#location").removeAttr("disabled"); 
        }else if(value == 2 ){
			$('#details').append('<br><div align="center"><table align="center"><tr><td><p style="font-size:20px">Plan Name</p></td><td>:</td><td><p style="font-size:20px">Team Plan</p></td></tr><tr><td><p style="font-size:20px">Price</p></td><td>:</td><td><p style="font-size:20px">Rs : 890/Month</p></td></tr><tr><td><p style="font-size:20px">No of User</p></td><td>:</td><td><p style="font-size:20px">5</p></td></tr><tr><td><p style="font-size:20px">No of Location</p></td><td>:</td><td><p style="font-size:20px">1</p></td></tr><tr><td><p style="font-size:20px">No of Staff</p></td><td>:</td><td><p style="font-size:20px">Unlimited</p></td></tr></table></div>');
			$('#user').show();
			$('#location').show();
			$('#unlimituser').html('');
			$('#unlimitlocation').html('');
			$('#user').val('5');
			$('#location').val('1');
			$('#price').html('$0');
			$('#userincre').show();
			$('#userdecre').show();
			$('#locationincre').show();
			$('#locationdecre').show();
			$("#user").removeAttr("disabled"); 
			$("#location").removeAttr("disabled"); 
		}else if(value == 3 ){
			$('#details').append('<br><div align="center"><table align="center"><tr><td><p style="font-size:20px">Plan Name</p></td><td>:</td><td><p style="font-size:20px">Cluster Plan</p></td></tr><tr><td><p style="font-size:20px">Price</p></td><td>:</td><td><p style="font-size:20px">Rs : 1680/Month</p></td></tr><tr><td><p style="font-size:20px">No of User</p></td><td>:</td><td><p style="font-size:20px">15</p></td></tr><tr><td><p style="font-size:20px">No of Location</p></td><td>:</td><td><p style="font-size:20px">3</p></td></tr><tr><td><p style="font-size:20px">No of Staff</p></td><td>:</td><td><p style="font-size:20px">Unlimited</p></td></tr></table></div>');
			$('#user').show();
			$('#location').show();
			$('#unlimituser').html('');
			$('#unlimitlocation').html('');
			$('#user').val('15');
			$('#location').val('3');
			$('#price').html('$0');
			$('#userincre').show();
			$('#userdecre').show();
			$('#locationincre').show();
			$('#locationdecre').show();
			$("#user").removeAttr("disabled"); 
			$("#location").removeAttr("disabled"); 
		}else if(value == 4 ){
			$('#details').append('<br><div align="center"><table align="center"><tr><td><p style="font-size:20px">Plan Name</p></td><td>:</td><td><p style="font-size:20px">Chains Plan</p></td></tr><tr><td><p style="font-size:20px">Price</p></td><td>:</td><td><p style="font-size:20px">Rs : 2390/Month</p></td></tr><tr><td><p style="font-size:20px">No of User</p></td><td>:</td><td><p style="font-size:20px">Unlimited</p></td></tr><tr><td><p style="font-size:20px">No of Location</p></td><td>:</td><td><p style="font-size:20px">Unlimited Location</p></td></tr><tr><td><p style="font-size:20px">No of Staff</p></td><td>:</td><td><p style="font-size:20px">Unlimited</p></td></tr></table></div>');
			$('#user').hide();
			$('#location').hide();
			$('#price').html('$0');
			$('#unlimituser').html('UnLimited User');
			$('#unlimitlocation').html('UnLimited Location');
			$('#userincre').hide();
			$('#userdecre').hide();
			$('#locationincre').hide();
			$('#locationdecre').hide();
		}else if(value == 5 ){
			$('#details').append('<br><div align="center"><table align="center"><tr><td><p style="font-size:20px">Plan Name</p></td><td>:</td><td><p style="font-size:20px">Institute Plan</p></td></tr><tr><td><p style="font-size:20px">Price</p></td><td>:</td><td><p style="font-size:20px">Free Forever</p></td></tr><tr><td><p style="font-size:20px">No of User</p></td><td>:</td><td><p style="font-size:20px">Unlimited Users</p></td></tr><tr><td><p style="font-size:20px">No of Location</p></td><td>:</td><td><p style="font-size:20px">1</p></td></tr><tr><td><p style="font-size:20px">No of Staff</p></td><td>:</td><td><p style="font-size:20px">Unlimited</p></td></tr></table></div>');
			$('#user').hide();
			$("#location").hide();
			$('#unlimituser').html('UnLimited User');
			$('#unlimitlocation').html('Only 1 Location');
			$('#location').val('1');
			$('#price').html('$0');
			$('#userincre').hide();
			$('#userdecre').hide();
			$('#userincre').hide();
			$('#userdecre').hide();
			$('#locationincre').hide();
			$('#locationdecre').hide();
		}else if(value == 6 ){
			$('#details').append('<br><div align="center"><table align="center"><tr><td><p style="font-size:20px">Plan Name</p></td><td>:</td><td><p style="font-size:20px">New Clinic</p></td></tr><tr><td><p style="font-size:20px">Price</p></td><td>:</td><td><p style="font-size:20px">Rs : 300/Month</p></td></tr><tr><td><p style="font-size:20px">No of User</p></td><td>:</td><td><p style="font-size:20px">1</p></td></tr><tr><td><p style="font-size:20px">No of Location</p></td><td>:</td><td><p style="font-size:20px">1</p></td></tr><tr><td><p style="font-size:20px">No of Staff</p></td><td>:</td><td><p style="font-size:20px">Unlimited</p></td></tr></table></div>');
			$('#user').show();
			$('#location').show();
			$('#unlimituser').html('');
			$('#unlimitlocation').html('');
			$("#user").removeAttr("disabled"); 
			$("#location").removeAttr("disabled"); 
			$('#user').val('1');
			$('#location').val('1');
			$('#price').html('$0');
			$('#userincre').show();
			$('#userdecre').show();
			$('#locationincre').show();
			$('#locationdecre').show();
		}else{
			$('#details').hide();
			$('#price').html('$0');
			$('#user').val('0');
			$('#unlimituser').html('');
			$('#unlimitlocation').html('');
			$('#location').val('0');
			$('#userincre').show();
			$('#userdecre').show();
			$('#locationincre').show();
			$('#locationdecre').show();
		}
    });
	
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
            $('input[name='+fieldName+']').val(0);
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
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
	
	$("#checkrate").click(function(){
		var plan = $('#duration').val();
		var user = $('#user').val();
		var location = $('#location').val();
		var duration = $('#months').val();
		var sms_count = $('#sms').val();
		var price = 0,user_price=0,location_price=0,sms_price=0;
		if(plan == 1){
			if(user >1 || location > 1){
					if(user >1){
					user = user - 1; 
					user_price = user * 100;
					}
					if(location > 1){
						location = location -1;
						location_price = location * 500;
					}
					sms_price = sms_count * 0.50;
					price =  duration * (580+ parseInt(user_price) + parseInt(location_price)) + parseInt(sms_price);
					$("#price").html('');
					$("#price").html('$'+price);
			}else{
					sms_price = sms_count * 0.50;
					price = (duration * 580) + parseInt(sms_price);
					$("#price").html('');
					$("#price").html('$'+price);
			}
		}else if(plan == 2){
			if(user >5 || location > 1){
					if(user >5){
					user = user - 5; 
					user_price = user * 100;
					}
					if(location > 1){
						location = location -1;
						location_price = location * 500;
					}
					sms_price = sms_count * 0.50;
					price = duration * (890+ parseInt(user_price) + parseInt(location_price)) + parseInt(sms_price);
					$("#price").html('');
					$("#price").html('$'+price);
			}else{
					sms_price = sms_count * 0.50;
					price = (duration * 890 ) + parseInt(sms_price);
					$("#price").html('');
					$("#price").html('$'+price);
			}
		}else if(plan == 3){
			if(user >15 || location > 3){
					if(user >15){
						user = user - 15; 
						user_price = user * 100;
					}
					if(location > 3){
						location = location -3;
						location_price = location * 500;
					}
					sms_price = sms_count * 0.50;
					price = duration * (1680+ parseInt(user_price) + parseInt(location_price)) + parseInt(sms_price);
					$("#price").html('');
					$("#price").html('$'+price);
			}else{
					sms_price = sms_count * 0.50;
					price = (duration * 1680) + parseInt(sms_price);
					$("#price").html('');
					$("#price").html('$'+price);
			}
		}else if(plan == 4){
					sms_price = sms_count * 0.50;
					price = (duration * 2390 ) + parseInt(sms_price);
					$("#price").html('');
					$("#price").html('$'+price);
		}else if(plan == 5){
			
					if(location > 1){
						location = location -1;
						location_price = location * 500;
					}
					sms_price = sms_count * 0.50;
					price = parseInt(location_price) + parseInt(sms_price);
					$("#price").html('');
					$("#price").html('$'+price);
			
		}else{
			if(user > 1 || location > 1){
					if(user >1){
					user = user - 1; 
					user_price = user * 100;
					}
					if(location > 1){
						location = location -1;
						location_price = location * 500;
					}
					sms_price = sms_count * 0.50;
					price = duration * (300 + parseInt(user_price) + parseInt(location_price)) + parseInt(sms_price);
					$("#price").html('');
					$("#price").html('$'+price);
			}else{
					sms_price = sms_count * 0.50;
					price = (duration * 300) + parseInt(sms_price);
					$("#price").html('');
					$("#price").html('$'+price);
			}
		
		}
	
	
		
	});
	
	
	
});
</script>
</html>
