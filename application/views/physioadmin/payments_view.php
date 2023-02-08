<!DOCTYPE html>
<html lang="en">
<head>
<title>Physio Plus Admin</title>
<meta charset="UTF-8" />
<link rel="shortcut icon" href="<?php echo base_url() ?>admin_assets/dist/img/ico/favicon.png" type="image/x-icon" /> 
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css" />
<link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/fullcalendar.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/matrix-style.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/matrix-media.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/daterangepicker.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.gritter.css" />
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>


<div id="header">
  <h1><a href="#">Physio Plus Admin</a></h1>
</div>



<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome User</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
        <li class="divider"></li>
        <li><a href="<?php echo base_url().'physioadmin/dashboard/logout' ?>"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
    
  </ul>
</div>

<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>

<?php echo $this->load->view('physioadmin/sidebar'); ?>

<div id="content">

  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
  <ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="#">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="#">Dashboard</a></li>
		<li class="pull-right no-text-shadow">
			<div id="dashboard-report-range" class="dashboard-date-range tooltips no-tooltip-on-touch-device responsive" data-original-title="Change dashboard date range" data-placement="top" data-desktop="tooltips" data-tablet="" style="display: block;">
				<i class="icon-calendar"></i>
				<span></span>
				<i class="icon-angle-down"></i>
			</div>
		</li>
	</ul>



  <div class="container-fluid">
	 <h1>Payments</h1>
	<hr>
   <a href="<?php echo base_url()."physioadmin/client_det/insert"; ?>" > click</a>
	<div class="row-fluid">
      <div class="span6">
		<div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Personal-info</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal" id="contactForm" name="contactForm">
            <div class="control-group">
              <label class="control-label">Client id:</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Client Id" name="client_id" id="cliet_id" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Pay Amount :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Pay Amount" name="amount" id="amount" />
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Tax :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Tax" name="tax" id="tax" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Discount :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Discount" name="discount" id="discount" />
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
            </div>
          </form>
        </div>
      </div>		
      </div>
    </div>
	
</div>

 


<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Brought to you by <a href="http://themedesigner.in/">physioplustech.com</a> </div>
</div>

<script src="<?php echo base_url(); ?>js/jquery.colorbox-min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.form.js"></script> 
<script src="<?php echo base_url(); ?>js/physio_helper.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.colorpicker-min.js"></script>
<script src="<?php echo base_url(); ?>js/physio_controller.js"></script>
<script src="<?php echo base_url(); ?>js/FileAPI.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery-ui-1.10.2.custom.min.js"></script>
<script src="<?php echo base_url(); ?>js/excanvas.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.ui.custom.js"></script> 
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.flot.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.flot.resize.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.peity.min.js"></script> 
<script src="<?php echo base_url(); ?>js/fullcalendar.min.js"></script> 
<script src="<?php echo base_url(); ?>js/matrix.js"></script> 
<script src="<?php echo base_url(); ?>js/matrix.dashboard.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.gritter.min.js"></script> 
<script src="<?php echo base_url(); ?>js/matrix.interface.js"></script> 
<script src="<?php echo base_url(); ?>js/matrix.chat.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.validate.js"></script> 
<script src="<?php echo base_url(); ?>js/matrix.form_validation.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.wizard.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.uniform.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.alerts.js"></script>
<script src="<?php echo base_url(); ?>js/select2.min.js"></script> 
<script src="<?php echo base_url(); ?>js/matrix.popover.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.dataTables.min.js"></script> 
<script src="<?php echo base_url(); ?>js/matrix.tables.js"></script>
<script src="<?php echo base_url(); ?>js/app.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/date.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/daterangepicker.js"></script> 

<script type="text/javascript">
 function goPage (newURL) {

      
      if (newURL != "") {
      
          
          if (newURL == "-" ) {
              resetMenu();            
          } 
          else {  
            document.location.href = newURL;
          }
      }
  }
 

function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
} 



$('#contactForm').submit(function (event) {

	
    dataString = $("#contactForm").serialize();
	
		$.ajax({
			type:"POST",
			url:"<?php echo base_url(); ?>physioadmin/client_det/payment_save",
			data:dataString,
	 
			success:function (data) {
				
					alert('sucessfully add');
					setTimeout(function() {
					window.location="<?php echo base_url() ?>physioadmin//client_det/renewal";
					},1000 ); 
			}
	 
		});
		
	
	event.preventDefault();
	
});

</script>

</body>
</html>
