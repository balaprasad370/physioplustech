<!DOCTYPE html>
<html lang="en">
<head>
<title>Physio Plus Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/uniform.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/select2.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/physio_style.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/physio_media.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>font-awesome/css/font-awesome.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo base_url(); ?>flick/jquery-ui-1.10.2.custom.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.gritter.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/colorbox.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/physio_helper.css" />
<link href="<?php echo base_url(); ?>css/jquery.alerts.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.alerts.css" />
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Physio Plus Admin</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome User</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
        <li class="divider"></li>
        <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
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
    <li class=""><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Client</a>
  <ul>
    
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Client</span> </a>
      <ul>
        <li><a href="<?php echo base_url().'physioadmin/dashboard/home' ?>">Client Details</a></li>
        <li><a href="<?php echo base_url().'physioadmin/client_det/view' ?>">Active User</a></li>
        <li><a href="<?php echo base_url().'physioadmin/client_det/sms_count' ?>">SMS Count</a></li>
      </ul>
    </li>
    <li><a href="<?php echo base_url().'physioadmin/client_det/deactive_user' ?>"><i class="icon icon-tint"></i> <span>Plan &amp; Days</span></a></li>
	<li class="submenu"><a href="#"><i class="icon icon-home"></i> <span>Plan Client List</span></a> 
		<ul>
        <li><a href="<?php echo base_url().'physioadmin/client_det/solo_plan' ?>">Solo Plan</a></li>
        <li><a href="<?php echo base_url().'physioadmin/client_det/team_plan' ?>">Team Plan</a></li>
        <li><a href="<?php echo base_url().'physioadmin/client_det/cluster_plan'?>">Cluster Plan</a></li>
        <li><a href="<?php echo base_url().'physioadmin/client_det/chain_plan' ?>">Chain Plan</a></li>
        <li><a href="<?php echo base_url().'physioadmin/client_det/institute_plan'?>">Institute Plan</a></li>
        <li><a href="<?php echo base_url().'physioadmin/client_det/rural_plan'?>">Rural Clinic Plan</a></li>
      </ul>
	</li>
     <li><a href="<?php echo base_url().'physioadmin/client_det/payments' ?>"><i class="icon icon-pencil"></i> <span>Payments</span></a></li>
    <li> <a href="<?php echo base_url().'physioadmin/client_det/renewal' ?>"><i class="icon icon-file"></i><span>Renewal Client</span></a></li>

  </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
  <ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="index.html">Home</a> 
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
<!--End-breadcrumbs-->

<!--Action boxes-->


  <div class="container-fluid">
	 <h1>Recoup</h1>
	<hr>
   
	<div class="row-fluid">
      <div class="span6">
		<div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                  <h5>Recoup Details</h5>
                </div>
			<form action="" method="post" class="form-horizontal" id="contactForm" name="contactForm">
                <div class="widget-content nopadding">
					<div class="control-group">
                      <label class="control-label"><span style="color:#8A0808">* </span>Register Date</label>
                      <div class="controls">
                        <div class="input-append date" style="padding:0">
                          <input type="text" value=""  class="span11 PhysioDatePicker" id="start" name="start" readonly  style="cursor: pointer">
                        </div>
                      </div>
                    </div>
					
                     <div class="form-actions" style="text-align:right">
					 <button type="submit" class="btn btn-success" style="margin-right:10px" id="save" >Save</button>
					</div>
                </div>
			</form>
              </div>

      </div>  
    </div>
    </div>
	
	
</div>

 
<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Brought to you by <a href="http://themedesigner.in/">physioplustech.com</a> </div>
</div>

<!--end-Footer-part-->
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
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
   function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }
 
// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
} 



$('#contactForm').submit(function (event) {

	$("#save").attr("disabled", "disabled");
    dataString = $("#contactForm").serialize();
	
		$.ajax({
			type:"POST",
			url:"<?php echo base_url(); ?>pages/deactive",
			data:dataString,
	 
			success:function (data) {
				
					alert('sucessfully add');
				
			}
	 
		});
		
	
	event.preventDefault();
	
});




</script>

</body>
</html>
