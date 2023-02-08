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
    <p>
	  <select class="checkout-input checkout-name" id="duration">
			<option value="0">----Select---</option>
			<option value="1740">3 Month</option>
			<option value="3130">6 Month</option>
			<option value="5916">1 Year</option>
	  </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="text" class="checkout-input checkout-name" readonly name="rate" id="rate" placeholder="Price" autofocus>
	  <div id="message"  style="background-color:#0C0;text-align:center;height:50px;margin-top: 20px;margin-left: 5px;" ></div>
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
    $("#duration option").filter(function() {
        return $(this).val() === $("#rate").val();
    }).attr('selected', true);

    $("#duration").live("change", function() {
		$('#message').html('');
		$('#price').html('');
        $("#rate").val($(this).find("option:selected").attr("value"));
    });
	
	$("#duration").live("change", function() {
		
		var value = $(this).val();
		
		if(value == 1740){
			$('#message').append('<br><b><font color="white">Subcribe for 1year  & save Rs:1044/- </font></b>');
			$('#price').append('$1740');
        }else if(value == 3130 ){
			$('#message').append('<br><b><span style="text-decoration: line-through; color: red;"><span style="color: white;">3480</span></span> <font color="white">10% OFF [ SAVE Rs : 348/- ]</font></b>');
			$('#price').append('$3130');
		}else if(value == 0 ){
			$('#message').hide();
		}else{
			$('#message').append('<br><b><span style="text-decoration: line-through; color: red;"><span style="color: white;">6960</span></span> <font color="white">15% OFF  [ SAVE Rs : 1044/- ]</font></b>');
			$('#price').append('$5916');
		}
		
    });
	
});
</script>
</html>
