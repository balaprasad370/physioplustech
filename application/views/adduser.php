<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Billing Info</title>
</head>
<body>
<form name="billing" method="post" action="<?php //echo base_url().'billing/save_order' ?>" >
    <input type="hidden" name="command" />
	<div align="center">
        <h1 align="center">Your Plan Duration</h1>
        <table border="0" cellpadding="2px">
        	<tr><td>Duration:</td><td>
				<select id="duration">
					<option value="0">----Select---</option>
					<option value="100">1</option>
					<option value="200">2</option>
					<option value="300">3</option>
					<option value="400">4</option>
					<option value="500">5</option>
					
				</select>
				<input type="text" name="rate" id="rate" readonly />
				<div  id="message"></div>
			
			</td></tr>
            <tr><td>&nbsp;</td><td><input type="submit" value="Place Order" /></td></tr>
        </table>
		
	</div>
</form>
<script src="<?php echo base_url(); ?>js/excanvas.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery-ui-1.10.2.custom.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.gritter.min.js"></script> 
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.uniform.js"></script> 
<script src="<?php echo base_url(); ?>js/select2.min.js"></script>

<script>
$(document).ready(function() {

    $("#duration option").filter(function() {
        return $(this).val() === $("#rate").val();
    }).attr('selected', true);

    $("#duration").live("change", function() {
		$('#message').html('');

        $("#rate").val($(this).find("option:selected").attr("value"));
    });
	
	
});
</script>
</body>
</html>