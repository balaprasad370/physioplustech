<!DOCTYPE html>
<html>
  <head>
    <title>Physio Plus Tech</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8" />
	 <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/images/favicon.ico" />
    <link href="<?php  echo base_url();  ?>assets/css/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="<?php  echo base_url();  ?>assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php  echo base_url();  ?>assets/css/vendor/animate/animate.css">
    <link type="text/css" rel="stylesheet" media="all" href="<?php  echo base_url();  ?>assets/js/vendor/mmenu/css/jquery.mmenu.all.css" />
    <link rel="stylesheet" href="<?php  echo base_url();  ?>assets/js/vendor/videobackground/css/jquery.videobackground.css">
    <link rel="stylesheet" href="<?php  echo base_url();  ?>assets/css/vendor/bootstrap-checkbox.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/chosen/css/chosen.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/chosen/css/chosen-bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/datepicker/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/colorpicker/css/bootstrap-colorpicker.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/colorpalette/bootstrap-colorpalette.css">
	<link rel="stylesheet" href="<?php  echo base_url();  ?>assets/js/vendor/modals/css/component.css">
	<link href="<?php echo base_url() ?>assets/css/minimal.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/js/vendor/datatables/css/dataTables.bootstrap.css">
	<link rel="stylesheet" href="<?php  echo base_url();  ?>assets/css/vendor/bootstrap/bootstrap-dropdown-multilevel.css">
    <link type="text/css" rel="stylesheet" media="all" href="<?php  echo base_url();  ?>assets/js/vendor/mmenu/css/jquery.mmenu.all.css" />
    <link rel="stylesheet" href="<?php  echo base_url();  ?>assets/js/vendor/chosen/css/chosen.min.css">
    <link rel="stylesheet" href="<?php  echo base_url();  ?>assets/js/vendor/chosen/css/chosen-bootstrap.css">
    <link rel="stylesheet" href="<?php  echo base_url();  ?>assets/js/vendor/datatables/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="<?php  echo base_url();  ?>assets/js/vendor/datatables/css/ColVis.css">
    <link rel="stylesheet" href="<?php  echo base_url();  ?>assets/js/vendor/datatables/css/TableTools.css">
	<link href="<?php  echo base_url();  ?>assets/css/minimal.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/jquery-confirm.css" /> 
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/sticky.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-confirm.js"></script>
   <style>
   .alert-success{
	   font-size : 14px;
   }
    </style>
  </head>
  
  <body class="bg-1">

   
    
    <div id="wrap">
     <div class="row">
	<?php $this->load->view('subadmin/sidebar');  ?>
       <div id="content" class="col-md-12">
          <div class="pageheader">
          <div class="breadcrumbs">
              
            </div>
         </div>
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

         <div class="main">
          <div class="row">
            <div class="col-md-12">
               <section class="tile transparent">
					<div class="tile-header transparent">
                    <h1><strong>Usage Monitor</strong></h1>
                    <div class="controls">
					
					 </div>
                  </div>
                 </div>
                </section>
               </div>
              </div>
			  <?php if($this->uri->segment(4) != false ) { 
					 $this->db->where('client_id',$this->uri->segment(4));
					 $this->db->select('last_login_date,last_login_ip')->from('tbl_client');
					 $res = $this->db->get();
					 $ip = $res->row()->last_login_ip;
					 $last_login_date = $res->row()->last_login_date;
					?>
                     <h3 style="color:#fff;">Last Login Date : <?php echo date('d-m-Y h:i a',strtotime($last_login_date)); ?> </h3></br>
					 <h3 style="color:#fff;">Last Login IP : <?php echo $ip; ?></h3>
					<?php } else { } ?>
					
				<div class="row">	
				
				<div class="col-md-6">
             
                <section class="tile color transparent-black">

                  
                  <div class="tile-header">
                    <h1><strong>Client</strong> Information</h1>
                    <div class="controls">
                      <a href="#" class="minimize"><i class="fa fa-chevron-down"></i></a>
                      <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
                      <a href="#" class="remove"><i class="fa fa-times"></i></a>
                    </div>
                  </div>
                   <div class="tile-body">

                    <div class="row">

                      

                      <div class="col-md-3">

                      
                    <div class="container">
                      <h4>Name : <?php echo $first_name;?></h4>
					  <h4>Mail : <?php echo $email;?></h4>
					  <h4>Clinic : <?php echo $clinic_name;?></h4>
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
							
							
							?></h4>
					  <h4>Mobile : <?php echo $mobile;?></h4>
					  <h4>Joined On : <?php echo $joined_on;?></h4>
                      <p><a class="btn btn-red btn-large" id="more">Learn more</a></p>
                    </div>

                 
                      <div class="container" id="learn_more">
                      <h4>Address : </h4><p><?php echo $address;?></p>
					  <h4>City : <?php echo $city;?></h4>
					  
					  <h4>State : <?php echo $state;?></h4>
					  
                    </div>
                     </div>
					</div>
                 </div>
                 </section>
				</div>
				<div class="col-md-9">
                <section class="tile color transparent-black">
                 <div class="tile-header">
                    <h1><strong>Usage</strong> List</h1>
                    <div class="controls">
                      <a href="#" class="minimize"><i class="fa fa-chevron-down"></i></a>
                      <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
                      <a href="#" class="remove"><i class="fa fa-times"></i></a>
                    </div>
                  </div>
                 
                  <div class="tile-body">

                    <div class="notification no-top-margin">
                      <h4> Total No of Clinics</h4>
                      <p style="font-size:22px;"><a href="#"></a><code><?php echo $count.' '.'Clinics';?></code>.</p>
                    </div>

                    <div class="notification notification-warning">
                      <h4>Total No of Admins</h4>
                      <p style="font-size:22px;"><a href="#"></a> <code><?php echo $count.' '.'Admins'; ?></code>.</p>
                    </div>

                    <div class="notification notification-danger">
                      <h4>Total No of staffs</h4>
                      <p style="font-size:22px;"><a href="#"></a><code><?php echo $count1.' '.'Staffs'; ?></code>.</p>
                    </div>

                    <div class="notification notification-success">
                      <h4>Total No of patients</h4>
                      <p style="font-size:22px;"><a href="#"></a><code><?php echo $count2.' '.'Patients'; ?></code>.</p>
                    </div>

                    <div class="notification notification-info">
                      <h4>Total No of Appointments</h4>
                      <p style="font-size:22px;"><a href="#"></a><code><?php echo $count3.' '.'Appointments';?></code>.</p>
                    </div>

                    <div class="notification notification-red">
                      <h4>Total No of Billing</h4>
                      <p style="font-size:22px;"><a href="#"></a><code><?php echo $count4.' '.'Invoice'; ?></code>.</p>
                    </div>

                    <div class="notification notification-green">
                      <h4>Total No of Referrals</h4>
                      <p style="font-size:22px;"><a href="#"></a><code><?php echo $count5.' '.'Referrals'; ?></code>.</p>
                    </div>

                    <div class="notification notification-orange">
                      <h4>Total No of Exercise Charts</h4>
                      <p style="font-size:22px;"><a href="#"></a><code><?php echo $count6.' '.'Exercise Charts'; ?></code>.</p>
                    </div>

                   

                  </div>
                  
                </section>
				</div>
					  <?php }  else { ?>
              <div class="col-md-9">
                
                <section class="tile color transparent-black">

                  
                  <div class="tile-header">
                    <h1><strong>Usage</strong> List</h1>
                    <div class="controls">
                      <a href="#" class="minimize"><i class="fa fa-chevron-down"></i></a>
                      <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
                      <a href="#" class="remove"><i class="fa fa-times"></i></a>
                    </div>
                  </div>
                 
                  <div class="tile-body">

                    <div class="notification no-top-margin">
                      <h4> Total No of Clinics</h4>
                      <p style="font-size:22px;"><a href="#"></a><code><?php echo $count.' '.'Clinics';?></code>.</p>
                    </div>

                    <div class="notification notification-warning">
                      <h4>Total No of Admins</h4>
                      <p style="font-size:22px;"><a href="#"></a> <code><?php echo $count.' '.'Admins'; ?></code>.</p>
                    </div>

                    <div class="notification notification-danger">
                      <h4>Total No of staffs</h4>
                      <p style="font-size:22px;"><a href="#"></a><code><?php echo $count1.' '.'Staffs'; ?></code>.</p>
                    </div>

                    <div class="notification notification-success">
                      <h4>Total No of patients</h4>
                      <p style="font-size:22px;"><a href="#"></a><code><?php echo $count2.' '.'Patients'; ?></code>.</p>
                    </div>

                    <div class="notification notification-info">
                      <h4>Total No of Appointments</h4>
                      <p style="font-size:22px;"><a href="#"></a><code><?php echo $count3.' '.'Appointments';?></code>.</p>
                    </div>

                    <div class="notification notification-red">
                      <h4>Total No of Billing</h4>
                      <p style="font-size:22px;"><a href="#"></a><code><?php echo $count4.' '.'Invoice'; ?></code>.</p>
                    </div>

                    <div class="notification notification-green">
                      <h4>Total No of Referrals</h4>
                      <p style="font-size:22px;"><a href="#"></a><code><?php echo $count5.' '.'Referrals'; ?></code>.</p>
                    </div>

                    <div class="notification notification-orange">
                      <h4>Total No of Exercise Charts</h4>
                      <p style="font-size:22px;"><a href="#"></a><code><?php echo $count6.' '.'Exercise Charts'; ?></code>.</p>
                    </div>

                   

                  </div>
                  
                </section>
				</div>
				</div>
					  <?php } ?>
			 
      
		</div>
    
	
    <section class="videocontent" id="video"></section>
	<script src="<?php  echo base_url();  ?>assets/js/vendor/bootstrap/bootstrap-dropdown-multilevel.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php  echo base_url();  ?>assets/js/vendor/mmenu/js/jquery.mmenu.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php  echo base_url();  ?>assets/js/vendor/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php  echo base_url();  ?>assets/js/vendor/nicescroll/jquery.nicescroll.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php  echo base_url();  ?>assets/js/vendor/animate-numbers/jquery.animateNumbers.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php  echo base_url();  ?>assets/js/vendor/videobackground/jquery.videobackground.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php  echo base_url();  ?>assets/js/vendor/blockui/jquery.blockUI.js" type="text/javascript"></script>
	 <script src="<?php echo base_url() ?>assets/js/vendor/momentjs/moment-with-langs.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/datepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/colorpalette/bootstrap-colorpalette.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/minimal.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datatables/ColReorderWithResize.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datatables/colvis/dataTables.colVis.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datatables/tabletools/ZeroClipboard.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datatables/tabletools/dataTables.tableTools.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="<?php  echo base_url();  ?>assets/js/vendor/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php  echo base_url();  ?>assets/js/vendor/datatables/colvis/dataTables.colVis.min.js" type="text/javascript"></script>
    <script src="<?php  echo base_url();  ?>assets/js/vendor/datatables/tabletools/ZeroClipboard.js" type="text/javascript"></script>
    <script src="<?php  echo base_url();  ?>assets/js/vendor/datatables/tabletools/dataTables.tableTools.min.js" type="text/javascript"></script>
    <script src="<?php  echo base_url();  ?>assets/js/vendor/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="<?php  echo base_url();  ?>assets/js/minimal.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	<script>
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
      
	  