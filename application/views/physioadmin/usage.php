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
    <body class="hold-transition sidebar-mini">        
         <div class="wrapper">
            <header class="main-header">
                <a href="#" class="logo"> <!-- Logo -->
                    Physio Plus Tech
                </a>
               <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <!-- Sidebar toggle button-->
                        <span class="sr-only">Toggle navigation</span>
                        <span class="fa fa-tasks"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown messages-menu">
                             <a href="#" class="dropdown-toggle admin-notification" data-toggle="dropdown"> 
                                <i class="pe-7s-cart"></i>
                                <span class="label label-primary">5</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header"><i class="fa fa-shopping-basket"></i> 4 Orders</li>
                                <li>
                                    <ul class="menu">
                                        <li><!-- start Notifications -->
                                           <a href="#" class="border-gray">
                                            <div class="pull-left">
                                                <img src="<?php echo base_url() ?>admin_assets/dist/img/stethescope.png" class="img-thumbnail" alt="User Image"></div>
                                                <h4>stethescope</h4>
                                                <p><strong>total item:</strong> 21
                                                </p>
                                            </a>     
                                        </li>
                                        <li>
                                            <a href="#" class="border-gray">
                                                <div class="pull-left">
                                                    <img src="<?php echo base_url() ?>admin_assets/dist/img/nocontrol.png" class="img-thumbnail" alt="User Image"></div>
                                                    <h4>Nocontrol</h4>
                                                    <p><strong>total item:</strong> 11
                                                    </p>
                                                </a> 
                                            </li>
                                            <li>
                                                <a href="#" class="border-gray">
                                                    <div class="pull-left">
                                                        <img src="<?php echo base_url() ?>admin_assets/dist/img/lab.png" class="img-thumbnail" alt="User Image"></div>
                                                        <h4>lab</h4>
                                                        <p><strong>total item:</strong> 16
                                                        </p>
                                                    </a> 
                                                </li>
                                                <li class="nav-list">
                                                    <a href="#" class="border-gray">
                                                        <div class="pull-left">
                                                            <img src="<?php echo base_url() ?>admin_assets/dist/img/therm.jpg" class="img-thumbnail" alt="User Image"></div>
                                                            <h4>Pressure machine</h4>
                                                            <p><strong>total item:</strong> 10
                                                            </p>
                                                        </a> 
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="footer"><a href="#"> See all Orders <i class="fa fa-arrow-right"></i></a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown messages-menu">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="pe-7s-mail"></i>
                                            <span class="label label-success">4</span>
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li class="header"><i class="fa fa-envelope-o"></i>
                                                4 Messages</li>
                                                <li>
                                                    <ul class="menu">
                                                        <li><!-- start message -->
                                                         <a href="#" class="border-gray">
                                                            <div class="pull-left">
                                                                <img src="<?php echo base_url() ?>admin_assets/dist/img/avatar2.png" class="img-thumbnail" alt="User Image"></div>
                                                                <h4>Alrazy</h4>
                                                                <p>Lorem Ipsum is simply dummy text of...
                                                                </p>
                                                                <span class="label label-success pull-right">11.00am</span>
                                                            </a>       

                                                        </li>
                                                        <li>
                                                            <a href="#" class="border-gray">
                                                                <div class="pull-left">
                                                                    <img src="<?php echo base_url() ?>admin_assets/dist/img/avatar4.png" class="img-thumbnail" alt="User Image"></div>
                                                                    <h4>Tanjil</h4>
                                                                    <p>Lorem Ipsum is simply dummy text of...
                                                                    </p>
                                                                    <span class="label label-success pull-right"> 12.00am</span>
                                                                </a>       

                                                            </li>
                                                            <li>
                                                                <a href="#" class="border-gray">
                                                                    <div class="pull-left">
                                                                        <img src="<?php echo base_url() ?>admin_assets/dist/img/avatar3.png" class="img-thumbnail" alt="User Image"></div>
                                                                        <h4>Jahir</h4>
                                                                        <p>Lorem Ipsum is simply dummy text of...
                                                                        </p>
                                                                        <span class="label label-success pull-right"> 10.00am</span>
                                                                    </a>       

                                                                </li>
                                                                <li>
                                                                 <a href="#" class="border-gray">
                                                                    <div class="pull-left">
                                                                        <img src="<?php echo base_url() ?>admin_assets/dist/img/avatar4.png" class="img-thumbnail" alt="User Image"></div>
                                                                        <h4>Shawon</h4>
                                                                        <p>Lorem Ipsum is simply dummy text of...
                                                                        </p>
                                                                        <span class="label label-success pull-right"> 09.00am</span>
                                                                    </a>       

                                                                </li>
                                                                <li>
                                                                    <a href="#" class="border-gray">
                                                                        <div class="pull-left">
                                                                            <img src="<?php echo base_url() ?>admin_assets/dist/img/avatar3.png" class="img-thumbnail" alt="User Image"></div>
                                                                            <h4>Shipon</h4>
                                                                            <p>Lorem Ipsum is simply dummy text of...
                                                                            </p>
                                                                            <span class="label label-success pull-right"> 03.00pm</span>
                                                                        </a>       
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="footer"><a href="#">See all messages <i class=" fa fa-arrow-right"></i></a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="dropdown notifications-menu">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                            <i class="pe-7s-bell"></i>
                                                            <span class="label label-warning">8</span>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li class="header"><i class="fa fa-bell"></i> 8 Notifications</li>
                                                            <li>
                                                                <ul class="menu">
                                                                    <li>
                                                                        <a href="#" class="border-gray"><i class="fa fa-inbox"></i> Inbox  <span class=" label-success label label-default pull-right">9</span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" class="border-gray"><i class="fa fa-cart-plus"></i> New Order <span class=" label-success label label-default pull-right">3</span> </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" class="border-gray"><i class="fa fa-money"></i> Payment Failed  <span class="label-success label label-default pull-right">6</span> </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" class="border-gray"><i class="fa fa-cart-plus"></i> Order Confirmation <span class="label-success label label-default pull-right">7</span> </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" class="border-gray"><i class="fa fa-cart-plus"></i> Update system status <span class=" label-success label label-default pull-right">11</span> </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" class="border-gray"><i class="fa fa-cart-plus"></i> client update <span class="label-success label label-default pull-right">12</span> </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" class="border-gray"><i class="fa fa-cart-plus"></i> shipment cancel 
                                                                            <span class="label-success label label-default pull-right">2</span> </a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="footer">
                                                                 <a href="#"> See all Notifications <i class=" fa fa-arrow-right"></i></a>
                                                             </li>
                                                         </ul>
                                                     </li>
                                                     <li class="dropdown tasks-menu">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                            <i class="pe-7s-file"></i>
                                                            <span class="label label-danger">9</span>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li class="header"><i class="fa fa-file"></i> 9 tasks</li>
                                                            <li>
                                                                <ul class="menu">
                                                                    <li> <!-- Task item -->
                                                                        <a href="#">
                                                                            <h3>
                                                                                <i class="fa fa-check-circle"></i> Data table error
                                                                                <span class="label-primary label label-default pull-right">35%</span>
                                                                            </h3>
                                                                            <div class="progress">
                                                                                <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" data-original-title="35%" style="width: 35%">
                                                                                    <span class="sr-only">35% Complete (primary)</span>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </li> <!-- end task item -->
                                                                    <li> <!-- Task item -->
                                                                        <a href="#">
                                                                            <h3>
                                                                              <i class="fa fa-check-circle"></i>  Change theme color
                                                                              <span class="label-success label label-default pull-right">55%</span>
                                                                          </h3>
                                                                          <div class="progress">
                                                                            <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" data-original-title="55%" style="width: 55%">
                                                                                <span class="sr-only">55% Complete (primary)</span>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li> <!-- end task item -->
                                                                <li> <!-- Task item -->
                                                                    <a href="#">
                                                                        <h3>
                                                                            <i class="fa  fa-check-circle"></i> Change the font-family 
                                                                            <span class="label-info label label-default pull-right">60%</span>
                                                                        </h3>
                                                                        <div class="progress">
                                                                            <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" data-original-title="60%" style="width: 60%">
                                                                                <span class="sr-only">60% Complete (info)</span>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li> 
                                                                <li> 
                                                                    <a href="#">
                                                                        <h3>
                                                                         <i class="fa  fa-check-circle"></i> Animation should be skip
                                                                         <span class="label-warning label label-default pull-right">80%</span>
                                                                     </h3>
                                                                     <div class="progress">
                                                                        <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" data-original-title="80%"  style="width: 80%">
                                                                            <span class="sr-only">80% Complete (warning)</span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="footer"><a href="#">See all tasks <i class=" fa fa-arrow-right"></i></a></li>
                                                </ul>

                                            </li>
                                            <li class="dropdown dropdown-user admin-user">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                                                    <div class="user-image">
                                                        <img src="<?php echo base_url() ?>admin_assets/dist/img/avatar4.png" class="img-circle" height="40" width="40" alt="User Image">
                                                    </div>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#"><i class="fa fa-users"></i> User Profile</a></li>
                                                    <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                                                    <li><a href="#"><i class="fa fa-sign-out"></i> Logout</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </header>
							 <?php $this->load->view('physioadmin/sidebar'); ?>
               
                 <div class="content-wrapper">
                    <section class="content-header">
                        <div class="header-icon">
                            <i class="pe-7s-note2"></i>
                        </div>
                        <div class="header-title">
                            <h1>Enterprise Plan Edit</h1>
                            <small>Plan Edit</small>
                        </div>
                    </section>
					<?php 
							  $id = $this->uri->segment(4);
							  if($id != false) { 
							  $this->db->select('*')->from('tbl_client');
							  $this->db->where('client_id',$id);
							  $res = $this->db->get();
							  $first_name = $res->row()->first_name;
							  $email = $res->row()->email;
							  $clinic_name = $res->row()->clinic_name;
							  $city = $res->row()->city;
							  $mobile = $res->row()->mobile;
							  $joined_on = $res->row()->created_on;
							  $address = $res->row()->address;
							  $state = $res->row()->state;
							  $country = $res->row()->country;
							  $plan = $res->row()->plan;
					?>  

                    <section class="content">
                          <div class="row">
                           	 <div class="col-sm-6">
                                <div class="panel panel-bd lobidrag">
                                     <div class="panel-body">
                                         <h1><strong>Usage Monitor</strong> </h1></br> 
                                      <h4>Name&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $first_name;?></h4>
									  <h4>Mail&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $email;?></h4>
									  <h4>Clinic&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $clinic_name;?></h4>
									  <h4> Plan&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;<?php if($plan == 0 ){
												echo 'Free Plan';
												
											} 
											elseif($plan == 1){
												echo 'Professional Plan';
												
											} 
											elseif($plan == 2){
												echo 'Monetary Plan';
												
											} 
											elseif( $plan == 3){
												echo 'Enterprize Plan';
												
											} 
											elseif( $plan == 4){
												echo 'Ultimate Prescriber Plan';
												
											} 
											elseif($plan == 5){
												echo 'Institute plan';
												
											} 
											
											
											?></h4>
									  <h4>Mobile&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $mobile;?></h4>
									  <h4>Joined On&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $joined_on;?></h4>
							         <h4>Address&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;</h4><p><?php echo $address;?></p>
									  <h4>City&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $city;?></h4>
									  <h4>State&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $state;?></h4><?php }?>           
                                     </div>
                                 </div>
                             </div>
							  <div class="col-sm-6">
                                <div class="panel panel-bd lobidrag">
                                     <div class="panel-body">
									 <h1><strong>Clinic </strong> Details </h1>
									 </br><h4>Total No of Clinics&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $count.' '.'Clinics';?></h4>
									  <h4>Total No of Admins&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $count.' '.'Admins'; ?></h4>
							         <h4>Total No of staffs&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $count1.' '.'Staffs'; ?></h4>
									  <h4>Total No of patients&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $count2.' '.'Patients'; ?></h4>
									  <h4>Total No of Appointments&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $count3.' '.'Appointments';?></h4>           
									  <h4>Total No of Billing&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $count4.' '.'Invoice'; ?></h4>          
									  <h4>Total No of Referrals&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $count5.' '.'Referrals'; ?></h4>        
									  <h4>Total No of Exercise Charts&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $count6.' '.'Exercise Charts'; ?></h4>    
                                    </br></div>
									 </div>
							  </div>
							 </div>
							</div>
					     </section>
						 
                 </div> 
                 <footer class="main-footer text-center">
                    <div class="pull-right hidden-xs"></div>
                    <strong> © 2019 <a href="#"> Physio Plus Tech </a>.</strong> All rights reserved.
                </footer>
            </div> <!-- ./wrapper -->
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

	$(document).ready(function() {
  $('form').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var button = $('#save');
		 button.prop('disabled',true);
		$.ajax({
            type: 'post',
            url: formURL,
            data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				
				$.jGrowl("Account Has Been Activated Successfully!");
				setTimeout(function(){ 
				$('.md-close btn btn-default').click();
				window.location.reload();
				}, 1000);
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$.jGrowl("Account Has Not Been Activated Successfully!");
				setTimeout(function(){ 
				$('.md-close btn btn-default').click();
				window.location.reload();
				}, 1000);
			}
      }); 
		}
		else{

		}
		
});  
});
 

    </script></body>
 </html>
