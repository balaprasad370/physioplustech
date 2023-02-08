<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Physio Plus Tech</title>
	<link rel="icon" type="image/ico" href="<?php echo base_url() ?>assets/images/favicon.ico" />
	<link href="<?php echo base_url() ?>admin_assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>
    <!--<link href="<?php echo base_url() ?>admin_assets/plugins/pace/flash.css" rel="stylesheet" type="text/css"/>-->
    <link href="<?php echo base_url() ?>admin_assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/themify-icons/themify-icons.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/dist/css/stylehealth.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/plugins/toastr/toastr.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/plugins/NotificationStyles/css/demo.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/plugins/NotificationStyles/css/ns-default.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/plugins/NotificationStyles/css/ns-style-growl.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/plugins/NotificationStyles/css/ns-style-attached.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/plugins/NotificationStyles/css/ns-style-bar.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/plugins/NotificationStyles/css/ns-style-other.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
   	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css"></head>
     <link href="<?php echo base_url() ?>admin_assets/plugins/toastr/toastr.css" rel="stylesheet" type="text/css"/>
   
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
	 <h1>Plan Settings</h1>
	<hr>
   
	<div class="row-fluid">
      <div class="span6">
		<?php if($plan_det != false){ ?>
	  
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>Half Width <code>class=Span6</code></h5>
          </div>
          <div class="widget-content nopadding"> 
			<form class="form-horizontal">
			<?php foreach($plan_det as $client_det){ 
				$clint_id =  $client_det['client_id'];
			
			?>
				
				<div class="control-group">
					<label class="control-label">Client Name:</label>
					<div class="controls">
						<span class="label label-important"><?php echo $client_det['first_name'] ?></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Created Date & Time:</label>
					<div class="controls">
						<span class="label label-important"><?php echo $client_det['created_on'] ?></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Expire date:</label>
					<div class="controls">
						<span class="label label-important"><?php echo $client_det['expire_date'] ?></span>
					</div>
				</div>
				<?php } ?>
			</form>
		  </div>
        </div>
		<?php }?>

      </div>
	  
	
	  <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>Half Width <code>class=Span6</code></h5>
          </div>
          <div class="widget-content"> 
			<form action="<?php echo base_url().'physioadmin/client_det/edit_plan/' ?>" method="post" class="form-horizontal" id="contactForm" name="contactForm">
				<div class="control-group">
					<input type="hidden" id="client_id" name="client_id" value="<?php echo $clint_id; ?>" autocomplete="off" />
					<label class="control-label">Plan:</label>
					<div class="controls">
						<select placeholder="select Plan" name="plan_type" id="plan_type" >
							  <option value="1">Professional  Plan</option>
							  <option value="2">Monetary  Plan</option>
							  <option value="3">Enterprise Plan</option>
							  <option value="4" selected>Ultimate Prescriber Plan</option>
							  <option value="5">Institute</option>
							  </select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Duration:</label>
					<div class="controls">
						<select placeholder="select Plan" name="duration" id="duration">
							  <option></option>
							  <option value="1">1 DAY</option>
							<option value="3">3 DAYS</option>
								<option value="7">7 DAYS</option>							 
							 <option value="30">30 DAYS</option>
							  <option value="90">90 DAYS</option>
							  <option value="180">180 DAYS</option>
							  <option value="365">1 Year</option>
							  
						</select>
					</div>
				</div>				
				<div class="form-actions">
					<button type="submit" class="btn btn-success" id="save" >Save</button>
					<?php	$this->db->where('client_id',$this->uri->segment(4));
					$this->db->select('status')->from('tbl_client');
					$res = $this->db->get();
					$status = $res->row()->status; if($status == 1) { ?>
					&nbsp;&nbsp;&nbsp; 	<a class="btn btn-danger" href="<?php echo base_url().'physioadmin/client_det/deactive_client/'.$this->uri->segment(4); ?>" id="deactivate" >Deactivate</a>
					<?php } else { ?>
					<a class="btn btn-info" href="<?php echo base_url().'physioadmin/client_det/activate_client/'.$this->uri->segment(4); ?>" id="deactivate" >Activate</a>
					<?php } ?></div>
				
			</form>
		  </div>
        </div>
      </div>
		
	  
    </div>
    </div>
	
	
</div>



<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Brought to you by <a href="http://themedesigner.in/">physioplustech.com</a> </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>admin_assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/plugins/lobipanel/lobipanel.min.js" type="text/javascript"></script>
        <!--<script src="<?php echo base_url() ?>admin_assets/plugins/pace/pace.min.js" type="text/javascript"></script>-->
        <script src="<?php echo base_url() ?>admin_assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/dist/js/custom1.js" type="text/javascript"></script>
		<script src="<?php echo base_url() ?>admin_assets/dist/js/custom.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/plugins/NotificationStyles/js/modernizr.custom.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/plugins/NotificationStyles/js/classie.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/plugins/NotificationStyles/js/notificationFx.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/plugins/NotificationStyles/js/snap.svg-min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/plugins/toastr/toastr.min.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
        <script src="https://select2.github.io/select2-bootstrap-theme/js/bootstrap.min.js"></script>
        <script src="https://select2.github.io/select2-bootstrap-theme/js/anchor.min.js"></script>
	<script>
	$('select').select2();
  
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

	$("#save").attr("disabled", "disabled");
    dataString = $("#contactForm").serialize();
	
		$.ajax({
			type:"POST",
			url:"<?php echo base_url(); ?>physioadmin/client_det/paln_save",
			data:dataString,
	 
			success:function (data) {
				
					alert('sucessfully add');
					setTimeout(function() {
					window.location="<?php echo base_url() ?>physioadmin/client_det/deactive_user";
					},1000 ); 
				
			}
	 
		});
		
	
	event.preventDefault();
	
});




</script>

</body>
</html>
