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
           
							 <?php $this->load->view('physioadmin/sidebar'); ?>
               
                 <div class="content-wrapper">
                    <section class="content-header">
                        <div class="header-icon">
                            <i class="pe-7s-note2"></i>
                        </div>
                        <div class="header-title">
                            <h1>SMS Edit</h1>
                            <small>SMS Edit</small>
                        </div>
                    </section>
                    <section class="content">
                          <div class="row">
                           	 <div class="col-sm-6">
                                <div class="panel panel-bd lobidrag">
                                     <div class="panel-body">
                                         <h1><strong>Client Details</strong> </h1></br> 
                                     <?php if($sms_det != false){ 
										   foreach($sms_det as $sms_dets){ 
											$clint_id =  $sms_dets['client_id'];
									  ?>
									  <div class="form-group">
										<label for="input01" class="col-sm-4 control-label">Client Name :</label>
										 <span class="label label-success">
										  <?php echo $sms_dets['first_name'] ?>
										</span>
									  </div>
									 <div class="form-group">
										<label for="input01" class="col-sm-4 control-label">Total Sms limit :</label>
										<span class="label label-success"><?php echo $sms_dets['total_sms_limit'] ?></span>
									 </div>
									 <div class="form-group">
										<label for="input01" class="col-sm-4 control-label">SMS count :</label>
										 <span class="label label-success"><?php echo $sms_dets['sms_count'] ?></span>
									 </div>
								<?php } ?>
									 <?php } ?>
								  </div>
                                 </div>
                             </div>
							 <div class="col-sm-6">
                                <div class="panel panel-bd lobidrag">
                                     <div class="panel-body">
                                        <h1><strong>Add SMS</strong> </h1></br> 
                                        <form action="<?php echo base_url().'physioadmin/client_det/sms_update' ?>" method="post" class="form-horizontal" role="form" parsley-validate>
											  <!--
                                                                                          <div class="form-group">
												<label for="input01" class="col-sm-4 control-label">SMS Limit :</label>
												<div class="col-sm-8">
												<input type="hidden" value="<?php echo $this->uri->segment(4); ?>" name="client_id" id="client_id">
											   <input type="text" class="form-control" name="sms_count" id="sms_count" parsley-required="true">
												</div>
											  </div>
											  -->
                 
                                                                                           <div class="form-group"  id="smsSelect">
											<label for="input01" class="col-sm-4 control-label">SMS Limit :</label>
											<div class="col-sm-8" id="selectbox2">
											<input type="hidden" value="<?php echo $this->uri->segment(4); ?>" name="client_id" id="client_id">
												<select class="chosen-select chosen-transparent form-control" name="sms_count" id="sms_count" parsley-trigger="change" parsley-required="true" parsley-error-container="#selectbox2" style="width:305px;">
													<option></option>
												<option value="10000">10000 - Rs.0.31/SMS</option>
												<option value="5000">5000 - Rs.0.35/SMS</option>
												<option value="2000">2000 - Rs.0.39/SMS</option>
												<option value="1000">1000 - Rs.0.43/SMS</option>
												<option value="400">400 - Rs.0.47/SMS</option>
												<option value="200">200 - Rs.0.51/SMS</option>
												
											   </select>
											</div>
										  </div>
                                                                                                
												<div class="form-group form-footer">
												<div class="col-sm-offset-4 col-sm-8">
												  <button type="submit" class="btn btn-success">save</button>
												  
												   </div>
											  </div>
											</div>
										</form>
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
		<script src="<?php echo base_url();?>assets/js/vendor/parsley/parsley.min.js"></script>
	<script>
	$('select').select2();
	 $(document).ready(function() {
			  $('form').on('submit', function (event) {
				 event.preventDefault();
				 var $form = $(this);
				 var  formID = $(this).attr("id");
				 var  formURL = $(this).attr("action");
				 var button1 = $('#submit');
				 button1.prop('disabled', true);
						
				$.ajax({
					type: 'post',
					url: $(this).attr('action'),
					data:$(this).serialize(),
					success:function(data, textStatus, jqXHR,form) 
					{
						setTimeout(function () {
							toastr.success('Details has been saved Successfully', 'Successfully');
							window.location.reload();
						}, 1000);
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						setTimeout(function () {
							toastr.success('Details has not been saved Successfully', 'Failure');
							window.location.reload();
					   }, 1000);
					}
				  });
		});  
	});
 

    </script></body>
 </html>
