<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/images/favicon.ico" />
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
	$profileInfo = $CI->registration_model->getcheckdet();
?>

<body>
<form class="checkout" action="<?php echo base_url().'razorpay/data1.php' ?>" method="POST">
                                    
    <div class="checkout-header">
      <h1 class="checkout-title">
        Checkout
        <span class="checkout-price" id="price"></span>
		 <span class="checkout-transtype" id="transtype"></span>
		  <input type="hidden" name="transtype" id="transtype" value="planupgrade">
		  
		<input type="hidden" name="amount" id="amount">
		<input type="hidden" name="price1" id="price1">
      </h1>
    </div>
	<table width="359" height="193">
	<?php foreach($profileInfo as $profile) {?>
		<input type="hidden" name="client_id" id="client_id" value="<?php echo $profile['client_id']  ?>">
		
	<tr>
    	<td height="36"><label>Full Name</label></td>
		<td>:</td>
		<td>
			<?php echo $profile['first_name'] ?>
			<input type="hidden" name="name" id="name" value="<?php echo $profile['first_name'] ?>"> 
		</td>
	 </tr>
	 <tr>
    	<td height="36"><label>Email</label></td>
		<td>:</td>
		<td><?php echo $profile['email'] ?>
		<input type="hidden" name="email" id="email" value="<?php echo $profile['email'] ?>">
		</td>
	 </tr>
	  <tr>
    	<td height="36"><label>Phone</label></td>
		<td>:</td>
		<td><?php echo $profile['mobile'] ?>
			<input type="hidden" name="mobile" id="mobile" value="<?php echo $profile['mobile'] ?>">
		</td>
	 </tr>
	 <tr>
    	<td height="36"><label>Address </label></td>
		<td>:</td>
		<td><?php echo $profile['address'] ?>
			<input type="hidden" name="Baddress" id="Baddress" value="<?php echo $profile['address'] ?>">
		</td>
	 </tr>
	<tr>
    	<td height="36"><label>City</label></td>
		<td>:</td>
		<td><?php echo $profile['city'] ?>
		<input type="hidden" name="Bcity" id="Bcity" value="<?php echo $profile['city'] ?>">
		</td>
	 </tr>
	 <tr>
    	<td height="36"><label>State</label></td>
		<td>:</td>
		<td><?php echo $profile['state'] ?>
		<input type="hidden" name="Bstate" id="Bstate" value="<?php echo $profile['state'] ?>">
		</td>
	 </tr>
	
	 <tr>
    	<td height="36"><label>Country</label></td>
		<td>:</td>
		<td><?php echo 'India' ?></td>
	 </tr>
	 <tr>
    	<td height="36"><label>Zip</label></td>
		<td>:</td>
		<td><?php echo $profile['zipcode'] ?>
		<input type="hidden" name="Bzip" id="Bzip" value="<?php echo $profile['zipcode'] ?>">
		</td>
	 </tr>
     <?php } ?>
	<tr>
		<td width="116" height="43"><label>Choose Plan</label></td> 
		<td>:</td>
		<td width="156"><select id="duration" name="duration">
				<option value="0">----Select---</option>
				<option value="1">Professional</option>
				<option value="2">Monetary</option>
				<option value="3">Enterprise</option>
				<option value="4">Ultimate Prescriber</option>
		  </select>
	 </td>
	 </tr>
	 <tr>
		<td height="33"><label>No of User</label></td>
		<td>:</td>
	   <td><input type='button' value='-' class='qtyminus' field='user' id="userincre"/>
    <input type='text' name='user' value='1' style="width:35px" id='user' />
    <input type='button' value='+' class='qtyplus' field='user' id="userdecre"/>
	<div id="unlimituser"></div>
	</td>
	 </tr>
	 <!--
	 <tr>
	 <td height="33"><label>No of Location</label></td>	
		<td>:</td>
	  <td> <input type='button' value='-' class='qtyminus' field='location' id="locationincre"/>
    <input type='text' name='location' value='1'  style="width:35px" id='location'/>
    <input type='button' value='+' class='qtyplus' field='location' id="locationdecre"/>
	<div id="unlimitlocation"></div>
	</td>
	</tr>-->
	<tr>
    	<td height="39"><label>No of Location</label></td>
		<td>:</td>
		<td><?php echo "1"; ?>
		<input type="hidden" name='location' value='1'  style="width:35px" id='location'/>
		</td>
	 </tr>
	<tr>
		
		   <td width="116" height="33"><label>Duration</label></td> 
		   <td>:</td>
		   <td width="156"><select id="months" name="months">
				<option value="0">----Select---</option>
				<option value="1">1 Month</option>
				<option value="3">3 Months</option>
				<option value="6">6 Months</option>
				<option value="12">1 Year</option>
		  </select><input type="text" value="30" readonly name="month" id="month" >
	 </td>
	 </tr>
	 <!--
	<tr>
    	<td height="36"><label>Online Charges</label></td>
		<td>:</td>
		<td><input name="charges" type="text" readonly id="charges"><br>
		</tr>
		-->
		<!--
	<tr>
    	<td height="36"><label>SMS Limit</label></td>
		<td>:</td>
		<td><input name="sms" type="text" id="sms"><br>
		<a href="#" id="checkrate">Check Rate</a></td>
	 </tr>-->
	 
	 <tr>
		<td width="116" height="43"><label>SMS Limit</label></td> 
		<td>:</td>
		<td width="156"><select id="sms" name="sms">
				<option value="0">----Select---</option>
				<option value="10000">10000 - Rs.0.31/SMS</option>
				<option value="5000">5000 - Rs.0.35/SMS</option>
				<option value="2000">2000 - Rs.0.39/SMS</option>
			    <option value="1000">1000 - Rs.0.43/SMS</option>
				<option value="400">400 - Rs.0.47/SMS</option>
				<option value="200">200 - Rs.0.51/SMS</option>
		  </select>
		   <a href="#" id="checkrate">Check Rate</a>
	 </td>
	
	 </tr>
	 
	 </table>
    <p>
      <input type="submit" value="Purchase" class="checkout-btn" name="submit" id="submit">
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
<script src="<?php echo base_url(); ?>js/excanvas.min.js"></script> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery-ui-1.10.2.custom.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.gritter.min.js"></script> 
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script> 

<script src="<?php echo base_url(); ?>js/select2.min.js"></script>
<script>
$(document).ready(function() {
	
	$('#submit').attr('disabled','disabled');
	$('#price').append('Rs:0');
	$('#details').hide();
	$('#month').hide();
    $("#duration option").filter(function() {
        return $(this).val() === $("#rate").val();
    }).attr('selected', true);

    $("#duration").change(function() {
		$('#details').html('');
		$('#details').show();
        $("#rate").val($(this).find("option:selected").attr("value"));
		var plan = $("#rate").val();
    });
	
	$("#duration").change(function() {
		var value = $(this).val();
		if(value == 1){
			$('#details').append('<br><div align="center"><table width="183" height="417" border="2" bordercolor="#FFFFFF" bgcolor="#FF9900"><tr><th height="46" scope="row"><h1 class="style2"> Professional Features <br> (Rs:300/Month) </h1></th></tr><tr><th height="29" scope="row"> Patient Manager</th></tr><tr><th height="29" scope="row"> Appointment Manager</th></tr><tr><th height="29" scope="row"> Referral Manager</th></tr><tr><th height="29" scope="row"> Feedback</th></tr><tr><th height="29" scope="row"> EMR</th></tr><tr><th height="29" scope="row"> Staff</th></tr></table></div>');
        }else if(value == 2 ){
			$('#details').append('<br><div align="center"><table width="183" height="417" border="2" bordercolor="#FFFFFF" bgcolor="#FF9900"><tr><th height="46" scope="row"><h1 class="style2">Monetary Features <br> (Rs:500/Month)</h1></th></tr><tr><th height="29" scope="row"> Patient Manager</th></tr><tr><th height="29" scope="row"> Appointment Manager</th></tr><tr><th height="29" scope="row"> Referral Manager</th></tr><tr><th height="29" scope="row"> Feedback</th></tr><tr><th height="29" scope="row"> EMR</th></tr><th height="29" scope="row"> Billing (OP Billing, Home visits Billing, Automatic Fees Deduction Packegs, Advance Payments & Automatic Deuction)</th><tr><th height="29" scope="row"> Staff</th></tr><tr><th height="29" scope="row"> Expense</th></tr><tr><th height="29" scope="row"> Concession Group</th></tr></table></div>');
		}else if(value == 3 ){
			$('#details').append('<br><div align="center"><table width="183" height="417" border="2" bordercolor="#FFFFFF" bgcolor="#FF9900"><tr><th height="46" scope="row"><h1 class="style2">Enterprise <br> (Rs:600/Month)</h1></th></tr><tr><th height="29" scope="row"> Patient Manager</th></tr><tr><th height="29" scope="row"> Appointment Manager</th></tr><tr><th height="29" scope="row"> Referral Manager</th></tr><tr><th height="29" scope="row"> Feedback</th></tr><tr><th height="29" scope="row"> EMR</th></tr><tr><th height="29" scope="row"> Staff</th></tr><tr><th height="29" scope="row"> Expense</th></tr><tr><th height="29" scope="row"> Concession Group</th></tr><tr><th height="48" scope="row"> Reports(Case,Income,Expense,Balance Sheet)</th></tr></table></div>');
		}else if(value == 4 ){
			$('#details').append('<br><div align="center"><table width="183" height="417" border="2" bordercolor="#FFFFFF" bgcolor="#FF9900"><tr><th height="46" scope="row"><h1 class="style2">Ultimate Prescriber <br> (Rs:1000/Month)</h1></th></tr><tr><th height="29" scope="row"> Patient Manager</th></tr><tr><th height="29" scope="row"> Appointment Manager</th></tr><tr><th height="29" scope="row"> Referral Manager</th></tr><tr><th height="29" scope="row"> Feedback</th></tr><tr><th height="29" scope="row"> EMR</th></tr><th height="29" scope="row"> Billing (OP Billing, Home visits Billing, Automatic Fees Deduction Packegs, Advance Payments & Automatic Deuction)</th><tr><th height="29" scope="row"> Staff</th></tr><tr><th height="29" scope="row"> Expense</th></tr><tr><th height="29" scope="row"> Concession Group</th></tr><tr><th height="48" scope="row"> Reports(Case,Income,Expense,Balance Sheet)</th></tr><tr><th height="29" scope="row"> Exercise Prescription</th></tr><tr><th height="29" scope="row"> Patient Portal</th></tr></table></div>');
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
	$('#submit').hide();
	$("#checkrate").click(function(){
		
		var plan = $('#duration').val();
		var user = $('#user').val();
		var location = $('#location').val();
		var duration = $('#months').val();
		var sms_count = $('#sms').val();
		var price = 0,user_price=0,location_price=0,sms_price=0;
		//alert(location);
		if(sms_count=="10000")
		{
			sms_price=3100;
		}
		else if(sms_count=="5000")
		{
			sms_price=1750;
		}
		else if(sms_count=="2000")
		{
			sms_price=780;
		}
		else if(sms_count=="1000")
		{
			sms_price=430;
		}
		else if(sms_count=="400")
		{
			sms_price=188;
		}
		else if(sms_count=="200")
		{
			sms_price=102;
		}
		//alert(sms_price);
		if(plan == 1){
			if(user >1 || location >1){
					user_price = (user-1) * 100;
					location_price = (location-1) * 500;
					//sms_price = sms_count * 0.50;
					if(duration == 12){
					    price =  2520+(duration * (parseInt(user_price) + parseInt(location_price)) + parseInt(sms_price));
					}else{
						price =  duration * (300+ parseInt(user_price) + parseInt(location_price)) + parseInt(sms_price);
					}
					/*
					if(price >= 500) {
						$("#charges").val('5%');
						total = price + (price * 0.05);
					} else {
						$("#charges").val('10%');
						total = price + (price * 0.10);
					}*/
					$("#price").html('');
					$("#price").html('Rs:'+Math.round(price));
					$("#amount").val(Math.round(price));
	
					
					
			}else{
					//sms_price = sms_count * 0.50;
					if(duration == 12){
						price = (2520 + parseInt(sms_price));
						//total = price + (price * 0.145);
					}else{
						price = (duration * 300) + parseInt(sms_price);
						//total = price + (price * 0.145);
					}
					/*
					if(price >= 500) {
						$("#charges").val('5%');
						total = price + (price * 0.05);
					} else {
						$("#charges").val('10%');
						total = price + (price * 0.10);
					}*/
					$("#price").html('');
					$("#price").html('Rs:'+Math.round(price));
					$("#amount").val(Math.round(price));
	
			}
		}else if(plan == 2){
			if(user >1 || location >1){
					user_price = (user-1) * 100;
					location_price = (location-1) * 500;
					//sms_price = sms_count * 0.50;
					if(duration == 12){
					price =  4200+(duration * (parseInt(user_price) + parseInt(location_price)) + parseInt(sms_price));
					//total = price + (price * 0.145);
					}else{
					price =  duration * (500+ parseInt(user_price) + parseInt(location_price)) + parseInt(sms_price);
					//total = price + (price * 0.145);
					}
					/*
					if(price >= 500) {
						$("#charges").val('5%');
						total = price + (price * 0.05);
					} else {
						$("#charges").val('10%');
						total = price + (price * 0.10);
					}*/
					$("#price").html('');
					$("#price").html('Rs:'+Math.round(price));
					$("#amount").val(Math.round(price));  
	
			}else{
					//sms_price = sms_count * 0.50;
					if(duration == 12){
						price = (4200 + parseInt(sms_price));
						//total = price + (price * 0.145);
					}else{
						price = (duration * 500) + parseInt(sms_price);
					    //total = price + (price * 0.145);
					}
					/*
					if(price >= 500) {
						$("#charges").val('5%');
						total = price + (price * 0.05);
					} else {
						$("#charges").val('10%');
						total = price + (price * 0.10);
					}*/
					$("#price").html('');
					$("#price").html('Rs:'+Math.round(price));
					$("#amount").val(Math.round(price));
	
			}
		}else if(plan == 3){
			if(user >1 || location >1){
					user_price = (user-1) * 100;
					location_price = (location-1) * 500;
					//sms_price = sms_count * 0.50;
					if(duration == 12){
					price =  5040+(duration * (parseInt(user_price) + parseInt(location_price)) + parseInt(sms_price));
					//total = price + (price * 0.145);
					}else{
					price =  duration * (600+ parseInt(user_price) + parseInt(location_price)) + parseInt(sms_price);
					//total = price + (price * 0.145);
					}
					/*
					if(price >= 500) {
						$("#charges").val('5%');
						total = price + (price * 0.05);
					} else {
						$("#charges").val('10%');
						total = price + (price * 0.10);
					}*/
					$("#price").html('');
					$("#price").html('Rs:'+Math.round(price));
					$("#amount").val(Math.round(price));
	
			}else{
					//sms_price = sms_count * 0.50;
					if(duration == 12){
						price = (5040 + parseInt(sms_price));
					    //total = price + (price * 0.145);
					}else{
						price = (duration * 600) + parseInt(sms_price);
					   //total = price + (price * 0.145);
					}
					/*
					if(price > 500) {
						$("#charges").val('5%');
						total = price + (price * 0.05);
					} else {
						$("#charges").val('10%');
						total = price + (price * 0.10);
					}*/
					$("#price").html('');
					$("#price").html('Rs:'+Math.round(price));
					$("#amount").val(Math.round(price));
	
			}
		}else if(plan == 4){
			if(user >1 || location >1){
					user_price = (user-1) * 100;
					location_price = (location-1) * 500;
					//sms_price = sms_count * 0.50;
					if(duration == 12){
						price =  ((8400 + parseInt(location_price))+(duration * parseInt(user_price))+ parseInt(sms_price));
						//total = price + (price * 0.145);
					} else if(duration == 3){
						price =  ((2700 + parseInt(location_price)) +(duration * parseInt(user_price))+ parseInt(sms_price));
						//total = price + (price * 0.145);
					} 
					else if(duration == 6){
						price =  ((5100 + parseInt(location_price)) +(duration * parseInt(user_price))+parseInt(sms_price));
						//total = price + (price * 0.145);
					}
					else {
					    price =  duration * (1000+ parseInt(user_price)+parseInt(location_price)) + parseInt(sms_price);
					    //total = price + (price * 0.145);
					}
					/*
					if(price >= 500) {
						$("#charges").val('5%');
						total = price + (price * 0.05);
					} else {
						$("#charges").val('10%');
						total = price + (price * 0.10);
					}*/
					$("#price").html('');
					$("#price").html('Rs:'+Math.round(price));
					$("#amount").val(Math.round(price));
	
			}else{
					//sms_price = sms_count * 0.50;
					if(duration == 12){
						price = (8400 + parseInt(sms_price));
					    //total = price + (price * 0.145);
					} else if(duration == 6){
						price = (5100 + parseInt(sms_price));
					    //total = price + (price * 0.145);
					} else if(duration == 3){
						price = (2700 + parseInt(sms_price));
					    //total = price + (price * 0.145);
					}
					else{
						price = (duration * 1000) + parseInt(sms_price);  
						//total = price + (price * 0.145);
					}
					/*
					if(price >= 500) {
						$("#charges").val('5%');
						total = price + (price * 0.05);
					} else {
						$("#charges").val('5%');
						total = price + (price * 0.10);
					}*/
					$("#price").html('');
					$("#price").html('Rs:'+Math.round(price));
					$("#amount").val(Math.round(price));
			}  
		}
		
		if($('#duration').val() != '' && $('#months').val() != '' && $('#country').val() != ''){
					$("#submit").removeAttr("disabled"); 
		}
		$('#submit').show();
		
	});

	
	
	
});
</script>
</html>
