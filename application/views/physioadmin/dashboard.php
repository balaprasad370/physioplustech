<!DOCTYPE html>
<html>
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
            
				<?php $this->load->view('physioadmin/sidebar'); ?>
               
                 <div class="content-wrapper">
                    
                  <section class="content-header">
                    <div class="header-icon"><i class="pe-7s-user-female"></i></div>
                    <div class="header-title">
                        <form action="#" method="get" class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
                            <div class="input-group">
                                <input type="text" name="q" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button type="submit" name="search" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </form>   
                        <h1>Profile</h1>
                        <small>Show user data in clear profile design</small>
                        <ol class="breadcrumb hidden-xs">
                            <li><a href="#"><i class="pe-7s-home"></i>Home</a></li>
                            <li><a href="#">UI Elements</a></li>
                            <li class="active">Profile</li>
                        </ol>
                    </div>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
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
                        <div class="col-sm-12 col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-header-headshot"></div>
                                </div>
								 <?php if($this->uri->segment(4) != false ) { 
									 $this->db->where('client_id',$this->uri->segment(4));
									 $this->db->select('first_name,last_name,city,last_login_date,last_login_ip')->from('tbl_client');
									 $res = $this->db->get();
									 $ip = $res->row()->last_login_ip;
									 $last_login_date = $res->row()->last_login_date;
									 $name = $res->row()->first_name.' '.$res->row()->last_name;
									 $city = $res->row()->city;
									?>
									 
									<?php } else { } ?>
                                <div class="card-content">
                                    <div class="card-content-member">
                                        <h4 class="m-t-0"><?php echo $name;  ?></h4>
                                        <p class="m-0"><i class="pe-7s-map-marker"></i><?php echo $city; ?></p>
                                    </div>
                                    <div class="card-content-languages">
                                           </br> <h4 style="color:black;">Last Login Date : <?php echo date('d-m-Y h:i a',strtotime($last_login_date)); ?> </h4></br>
											<h4 style="color:black;">Last Login IP : <?php echo $ip; ?></h4>
                                        </br><h4>Joined On : <?php echo $joined_on;?></h4></br>
                                    
                                    </div>
                                    
                                </div>
                               
                            </div>
                        </div>
						
                        <div class="col-sm-12 col-md-8">
                            <div class="row">
							
                                <div class="col-sm-12 col-md-12">
                                    <div class="rating-block">
                                        <h3><center>Client Information</center></h3></br>
                                        <h4>Mail : <?php echo $email;?></h4></br>
									  <h4>Clinic : <?php echo $clinic_name;?></h4></br>
									  <h4>Plan : <?php if($plan == 0 ){
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
											
											
											?></h4></br>
									  <h4>Mobile : <?php echo $mobile;?></h4></br>
									   <h4>Address : <?php echo $address.', '.$city.', '.$state;?></h4></br>
									 
                                    </div>
                                </div>
						  <?php } ?>			
                            </div>	
                            </div>
							<center><h3 style="color:green;">Usage List</h3></center>
							<div class="col-sm-12 col-md-12">
                            <div class="row">
                                <div class="col-sm-12 col-md-3" >
								<div class="rating-block" style="background-color:#FEFCC5;">
                                    <div class="notification notification-success">
									  <h4>Total No of Patients</h4>
									  <p style="font-size:22px;"><a href="#"></a><code><?php echo $count2.' '.'Patients'; ?></code>.</p>
									  Last Updated Date : <?php echo date('d-m-Y h:i a',strtotime($patient_update['created_date']));?>
									</div></br>
                                </div>
                                </div>
								<div class="col-sm-12 col-md-3" >
                                    <div class="rating-block" style="background-color:#FCA2BA;">
                                       <div class="notification notification-info">
										  <h4>Total No of Appointments</h4>
										  <p style="font-size:22px;"><a href="#"></a><code><?php echo $count3.' '.'Appointments';?></code>.</p>
										 Last Updated Date : 
										  <?php 
					 if(date('d-m-Y',strtotime($app_update['gen_date']))=='01-01-1970'|| date('d-m-Y',strtotime($app_update['gen_date']))=='30-11--0001'){
						 echo 'NIL';
					 }
					else {
					 echo date('d-m-Y h:i a',strtotime($app_update['gen_date']));
					 }  ?>
										 
										</div></br>
                                    </div>
                                </div>
								<div class="col-sm-12 col-md-3" >
                                    <div class="rating-block" style="background-color:#A6AFE7;">
                                       <div class="notification notification-red">
										  <h4>Total No of Billing</h4>
										  <p style="font-size:22px;"><a href="#"></a><code><?php echo $count4.' '.'Invoice'; ?></code>.</p>
										 Last Updated Date : <?php 
					 if(date('d-m-Y',strtotime($inv_update['created_date']))=='01-01-1970'){
						 echo 'NIL';
					 }
					else {
					 echo date('d-m-Y h:i a',strtotime($inv_update['created_date']));
					 } 
					 
					 ?>
										  
										</div></br>
                                    </div>
                                </div>
								<div class="col-sm-12 col-md-3" >
                                    <div class="rating-block" style="background-color:#FBCCF5;">
                                        <div class="notification notification-warning">
										  <h4>Total No of Exercise Charts</h4>
										  <p style="font-size:22px;"><a href="#"></a><code><?php echo $count6.' '.'Exercise Charts'; ?></code>.</p>
										Last Updated Date : <?php if(date('d-m-Y',strtotime($exe_update['date']))=='01-01-1970'){
								echo 'NIL';} else {  echo date('d-m-Y h:i a',strtotime($exe_update['date'])); } 
					
									?>	
										</div>  </br> 
                                    </div>
                                </div>
								<div class="col-sm-12 col-md-3" >
                                    <div class="rating-block" style="background-color:#E8CCFB;">
                                       <div class="notification no-top-margin">
										  <h4> Total No of Branches</h4>
										  <p style="font-size:22px;"><a href="#"></a><code><?php echo $count.' '.'Branches';?></code>.</p>
										</div></br>
					
                                    </div>
                                </div>
								<div class="col-sm-12 col-md-3" >
                                    <div class="rating-block" style="background-color:#A6E7E2;">
                                       <div class="notification notification-success">
										  <h4>Total No of Users</h4>
										  <p style="font-size:22px;"><a href="#"></a><code><?php echo $user.' '.'Users'; ?></code>.</p>
										</div></br>
                                    </div>
                                </div>
								<div class="col-sm-12 col-md-3" >
                                    <div class="rating-block" style="background-color:#FCC7A2;">
                                       <div class="notification notification-success">
										  <h4>Total No of Staffs</h4>
										  <p style="font-size:22px;"><a href="#"></a><code><?php echo $count1.' '.'Staffs'; ?></code>.</p>
										</div></br>
                                    </div>
                                </div>
								<div class="col-sm-12 col-md-3" >
                                    <div class="rating-block" style="background-color:#D1F0C2;">
                                      <div class="notification no-top-margin">
										  <h4> Total No of Expenses</h4>
										  <p style="font-size:22px;"><a href="#"></a><code><?php echo $expense.' '.'Expenses';?></code>.</p>
										</div> </br>
                                    </div>
                                </div>
                            </div>	
                           </div>
						   <center><h3 style="color:green;">APP Usage List</h3></center>
							<div class="col-sm-12 col-md-12">
                            <div class="row">
                                <div class="col-sm-12 col-md-3" >
								<div class="rating-block" style="background-color:#FEFCC5;">
                                    <div class="notification notification-success">
									  <h4>Total No of Patients</h4>
									  <p style="font-size:22px;"><a href="#"></a><code><?php echo $app1.' '.'Patients'; ?></code>.</p>
									  Last Updated Date : <?php echo date('d-m-Y h:i a',strtotime($patient_update['created_date']));?>
									</div></br>
                                </div>
                                </div>
								<div class="col-sm-12 col-md-3" >
                                    <div class="rating-block" style="background-color:#FCA2BA;">
                                       <div class="notification notification-info">
										  <h4>Total No of Appointments</h4>
										  <p style="font-size:22px;"><a href="#"></a><code><?php echo $app2.' '.'Appointments';?></code>.</p>
										 Last Updated Date : 
										  <?php 
					 if(date('d-m-Y',strtotime($app_update['gen_date']))=='01-01-1970'|| date('d-m-Y',strtotime($app_update['gen_date']))=='30-11--0001'){
						 echo 'NIL';
					 }
					else {
					 echo date('d-m-Y h:i a',strtotime($app_update['gen_date']));
					 }  ?>
										 
										</div></br>
                                    </div>
                                </div>
								<div class="col-sm-12 col-md-3" >
                                    <div class="rating-block" style="background-color:#A6AFE7;">
                                       <div class="notification notification-red">
										  <h4>Total No of Billing</h4>
										  <p style="font-size:22px;"><a href="#"></a><code><?php echo $app3.' '.'Invoice'; ?></code>.</p>
										 Last Updated Date : <?php 
					 if(date('d-m-Y',strtotime($inv_update['created_date']))=='01-01-1970'){
						 echo 'NIL';
					 }
					else {
					 echo date('d-m-Y h:i a',strtotime($inv_update['created_date']));
					 } 
					 
					 ?>
										  
										</div></br>
                                    </div>
                                </div>
								<div class="col-sm-12 col-md-3" >
                                    <div class="rating-block" style="background-color:#D1F0C2;">
                                      <div class="notification no-top-margin">
										  <h4> Total No of Expenses</h4>
										  <p style="font-size:22px;"><a href="#"></a><code><?php echo $app4.' '.'Expenses';?></code>.</p>
										</div> </br>
                                    </div>
                                </div>
                            </div>	
                           </div>  
						   <center><h3 style="color:green;">Assessment Details</h3></center>
							<div class="col-sm-12 col-md-12">
                            <div class="table-responsive">
                                     <table class="table table-bordered table-hover">
                                        <thead>
											<tr>
                                            <th style="background-color:#4E9D6C; color:white;">Name</th>
                                            <th style="background-color:#4E9D6C; color:white;">No of Records</th>
											</tr> </thead>
								        <tr><td>Subjective</td><td><?php echo $case_notes;?></td></tr>
								        <tr><td>Objective</td><td><?php echo $prog_notes;?></td></tr>
								        <tr><td>Assessment</td><td><?php echo $remark;?></td></tr>
								        <tr><td>Plan</td><td><?php echo $plan_list;?></td></tr>
								        <tr><td>History</td><td><?php echo $history;?></td></tr>
								        <tr><td>Chief Complaints</td><td><?php echo $chief_comp;?></td></tr>
								        <tr><td>Pain</td><td><?php echo $pain;?></td></tr>
								        <tr><td>Examination</td><td><?php echo $examn;?></td></tr>
								        <tr><td>Motor Examination</td><td><?php echo $mexamn;?></td></tr>
								        <tr><td>Sensory Examination</td><td><?php echo $sexamn;?></td></tr>
								        <tr><td>Pediatric Examination</td><td><?php echo $paediatric;?></td></tr>
								        <tr><td>Investigation</td><td><?php echo $investigation;?></td></tr>
								        <tr><td>Provisional Diagnosis</td><td><?php echo $prov_diag;?></td></tr>
								        <tr><td>Medical Diagnosis</td><td><?php echo $medical;?></td></tr>
								        <tr><td>Goal</td><td><?php echo $goal;?></td></tr>
										<tr><td>Hip Assessment</td><td><?php echo $hip;?></td></tr>
										<tr><td>Knee Assessment</td><td><?php echo $knee;?></td></tr>
										<tr><td>Elbow Assessment</td><td><?php echo $elbow;?></td></tr>
										<tr><td>Shoulder Assessment</td><td><?php echo $shoulder;?></td></tr>
										<tr><td>Foot Assessment</td><td><?php echo $foot;?></td></tr>
									   </tbody>
								    </table>
								   
                              </div>
							</div>
							</div> 
                </section> 
            </div> 
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
		$('#learn_more').hide();
		
		$('#more').click(function(){
			$('#learn_more').show();
			$('#more').hide();
		});
	});
	</script>
  </body>
</html>
      
	  