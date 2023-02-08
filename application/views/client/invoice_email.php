<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta https-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php //echo ucfirst($this->session->userdata('username')); ?>Physio Plus Tech</title>

<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/x-icon" />

<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/uniform.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/select2.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/physio_style.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/physio_media.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>font-awesome/css/font-awesome.css" />
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo base_url(); ?>flick/jquery-ui-1.10.2.custom.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.gritter.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/colorbox.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/physio_helper.css" />
<link href="<?php echo base_url(); ?>css/jquery.alerts.css" type="text/css" rel="stylesheet" />
</head>

<body style="background-color:#E7E7E7">
<!--<div class="row-fluid" style="text-align:center;margin-top:15px"><button type="button" id="printButton" class="btn-success">Print</button></div>-->
<iframe width="100%" height="100%" style="display:block;" id='myiframe' name='myIframeInvoice' src="<?php echo base_url().'client/emailviews/invoice/'.$invoice_hdr['bill_id'].'/'.$invoice_hdr['client_id']; ?>"  />
</iframe>
<script src="<?php echo base_url(); ?>js/excanvas.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery-ui-1.10.2.custom.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.gritter.min.js"></script> 
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.uniform.js"></script> 
<script src="<?php echo base_url(); ?>js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.peity.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.colorbox-min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.form.js"></script> 
<script src="<?php echo base_url(); ?>js/physio_helper.js"></script>
<script src="<?php echo base_url(); ?>js/physio_controller.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.alerts.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	
	/* function loadiFrame(src)
    {
        $("#iframeplaceholder").html("<iframe id='myiframe' name='myIframeInvoice' src='" + src + "' />");
    }

    $(function()
    {
        $("#printButton").bind("click", 
            function() { 
                loadiFrame("<?php echo base_url(); ?>client/emailviews/invoice/<?php echo $invoice_hdr['bill_id']; ?>"); 
                alert('hi');
				$("#myiframe").load( 
                    function() {
                        window.frames['myIframeInvoice'].focus();
                        window.frames['myIframeInvoice'].print();
                    }
                 );
            }
        );
    }); */
	
	$('#printButton').click(function(e) {
		myiframe1 = document.getElementById('myiframe');
		$("#myiframe").get(0).contentWindow.focus();
		$("#myiframe").get(0).contentWindow.print();
    });
});
</script>
</body>
</html>