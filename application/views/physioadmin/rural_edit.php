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
                            <h1>Free Plan Edit</h1>
                            <small>Plan Edit</small>
                        </div>
                    </section>
                    <section class="content">
                          <div class="row">
                           	 <div class="col-sm-6">
                                <div class="panel panel-bd lobidrag">
                                     <div class="panel-body">
                                         <h1><strong>Client Details</strong> </h1></br> 
                                       <?php if($team_cname != false && $team_det != false){ ?>
												<?php foreach($team_cname as $cname){ 
											$clint_id =  $cname['client_id'];
										
										?>
												  <div class="form-group">
													<label for="input01" class="col-sm-4 control-label">Client Name:</label>
													 <span class="btn btn-success bottommargin">
													  <?php echo $cname['first_name'] ?>
													</span>
												  </div>
										<?php } 
											foreach($team_det as $team_dets){
											?>
												 <div class="form-group">
													<label for="input01" class="col-sm-4 control-label">Duration:</label>
													
													 <span class="btn btn-success bottommargin"><?php echo $team_dets['duration'] ?></span>
													<?php $duration = $team_dets['duration']; ?>
													
												  </div>

												  <div class="form-group">
													<label for="input01" class="col-sm-4 control-label">No.of Users</label>
													
													 <span class="btn btn-success bottommargin"><?php echo $team_dets['num_users'] ?></span>
													<?php $num_user = $team_dets['num_users']; ?>
												  
												  </div>

												  <div class="form-group">
													<label for="input01" class="col-sm-4 control-label">No.of Location</label>
													
													  <span class="btn btn-success bottommargin"><?php echo $team_dets['num_location'] ?></span>
													<?php $num_location = $team_dets['num_location']; ?>
											 
												  </div>
											</br>
										<?php } } ?> 
                                     </div>
                                 </div>
                             </div>
							 <div class="col-sm-6">
                                <div class="panel panel-bd lobidrag">
                                     <div class="panel-body">
                                        <h1><strong>Add Plan</strong> </h1></br> 
                                        <form action="<?php echo base_url().'physioadmin/client_det/edit_plan' ?>" method="post" class="form-horizontal" role="form"  parsley-validate id="basicvalidations">
										  <div class="form-group">
											<label for="input01" class="col-sm-4 control-label">Plan : </label>
											<div class="col-sm-8" id="selectbox">
											 <input type="hidden" value="<?php echo $clint_id; ?>" name="client_id" id="client_id">
                                                                                         <input type="hidden" value="<?php echo $num_user; ?>" name="users" id="users">
											 <input type="hidden" value="<?php echo $num_location; ?>" name="location" id="location">
												<select class="chosen-select chosen-transparent form-control" name="plan_type" id="plan_type" parsley-trigger="change" parsley-required="true" parsley-error-container="#selectbox">
													<option value="1">Professional  Plan</option>
												  <option value="2">Monetary  Plan</option>
												  <option value="3">Enterprise Plan</option>
												  <option value="4">Ultimate Prescriber Plan</option>
												  <option value="5">Institute</option>
											   </select>
											</div>
										  </div>
										  <div class="form-group">
											<label for="input01" class="col-sm-4 control-label">Duration : </label>
											<div class="col-sm-8" id="selectbox1">
												<select class="chosen-select chosen-transparent form-control" name="duration" id="duration" parsley-trigger="change" parsley-required="true" parsley-error-container="#selectbox1">
													<option></option>
												<option value="1">1 DAY</option>
												<option value="2">2 DAYS</option>
												<option value="3">3 DAYS</option>
												<option value="4">4 DAYS</option>
												<option value="5">5 DAYS</option>
												<option value="7">7 DAYS</option>
												<option value="30">30 DAYS</option>
												<option value="31">31 DAYS</option>
												<option value="90">90 DAYS</option>
												<option value="180">180 DAYS</option>
												<option value="365" >1 Year</option>
											   </select>
											</div>
										  </div>
                                                                                  <div class="form-group">
											<label for="input01" class="col-sm-4 control-label">Trial : </label>
											<div class="col-sm-8" id="selectbox1">
												<select class="chosen-select chosen-transparent form-control" name="trial" id="trial" >
													<option></option>
												    <option value="1">Yes</option>
												    <option value="2">No</option>
												</select>
											</div>
										  </div>
										  <div class="form-group">
											<label for="input01" class="col-sm-4 control-label">Discount(%) : </label>
											<div class="col-sm-8" id="selectbox">
											    <input type="hidden" value="<?php echo $clint_id; ?>" name="client_id" id="client_id">
												<input type="text" name="disc_per" id="disc_per" value="" class="form-control" parsley-required="true">
											</div>
										  </div>
										  <div class="form-group">
											<label for="input01" class="col-sm-4 control-label">Discount details : </label>
											<div class="col-sm-8" id="selectbox">
											    <input type="hidden" value="<?php echo $clint_id; ?>" name="client_id" id="client_id">
												<textarea name="disc_desc" id="disc_desc" value="" class="form-control" parsley-required="true"></textarea>
											</div>
										  </div>
										  <div class="form-group">
										  <input type="checkbox" id="changeNeeded" name="changeNeeded" value="yes" onclick="change()">
											<div class="col-sm-8" id="selectbox">
											    
                                                <label for="changeNeeded"> Do you want to change locations and users?</label>
											</div>
										  </div>
										  <div class="form-group" style="display:none;" id="userSelect" >
											<label for="input01" class="col-sm-4 control-label">Users : </label>
											<div class="col-sm-8" id="selectbox">
											    <input type="hidden" value="<?php echo $clint_id; ?>" name="client_id" id="client_id">
												<input type="text" name="plan_user" id="plan_user" value="" class="form-control" parsley-required="true">
											</div>
										  </div>
										  <div class="form-group" style="display:none;" id="locSelect" >
											<label for="input01" class="col-sm-4 control-label">Location : </label>
											<div class="col-sm-8" id="selectbox">
											    <input type="hidden" value="<?php echo $clint_id; ?>" name="client_id" id="client_id">
												<input type="text" name="plan_loc" id="plan_loc" value="" class="form-control" parsley-required="true">
											</div>
										  </div>
										  
										  <div class="form-group" style="display:none;" id="smsSelect">
											<label for="input01" class="col-sm-4 control-label">SMS : </label>
											<div class="col-sm-8" id="selectbox2">
												<select class="chosen-select chosen-transparent form-control" name="plan_sms" id="plan_sms" parsley-trigger="change" parsley-required="true" parsley-error-container="#selectbox2" style="width:305px;">
													<option></option>
												<option value="3100">10000 - Rs.0.31/SMS</option>
												<option value="1750">5000 - Rs.0.35/SMS</option>
												<option value="780">2000 - Rs.0.39/SMS</option>
												<option value="430">1000 - Rs.0.43/SMS</option>
												<option value="188">400 - Rs.0.47/SMS</option>
												<option value="102">200 - Rs.0.51/SMS</option>
												
											   </select>
											</div>
										  </div>
                                                                                  </br></br>
											<div class="form-group form-footer">
											<div class="col-sm-offset-4 col-sm-8">
											  <button type="submit" class="btn btn-success" id="save">save</button>
											  <?php	$this->db->where('client_id',$this->uri->segment(4));
												$this->db->select('status')->from('tbl_client');
												$res = $this->db->get();
												$status = $res->row()->status; if($status == 1) { ?>
												&nbsp;&nbsp;&nbsp; 	<a class="btn btn-danger" href="<?php echo base_url().'physioadmin/client_det/deactive_client2/'.$this->uri->segment(4); ?>" id="deactivate" >Deactivate</a>
												<?php } else { ?>
												<a class="btn btn-success" href="<?php echo base_url().'physioadmin/client_det/activate_client/'.$this->uri->segment(4); ?>" id="deactivate" >Activate</a>
												<?php } ?>
										</br></br>
											   </div>
										  </div>
										</div>
									  </form>
									 </div>
                                 </div>
                                 </div>
								 <div class="row">
								 <div class="col-sm-6">
                                <div class="panel panel-bd lobidrag">
                                     <div class="panel-body">
                                         <form action="<?php echo base_url().'physioadmin/client_det/edit_user' ?>" method="post" class="form-horizontal" role="form"  parsley-validate id="basicvalidations">
                                           <h1><strong>Only User Add</strong> </h1></br> 
                                        <div class="col-sm-12 form-group">
                                                <label>Users</label>
												<input type="hidden" value="<?php echo $clint_id; ?>" name="client_id" id="client_id">
                                                                                                <input type="hidden" value="<?php echo $num_user; ?>" name="edit_users" id="edit_users">
												<input type="text" name="num_users" id="num_users" value="" class="form-control" parsley-required="true">
										 </div>
										 <div class="col-sm-offset-4 col-sm-8">
										  <button type="submit" class="btn btn-primary" id="save">Save</button>
										 </div>
										  </form>
                                     </div>
                                 </div>
                             </div>
							 <div class="col-sm-6">
                                <div class="panel panel-bd lobidrag">
                                     <div class="panel-body">
                                        <form action="<?php echo base_url().'physioadmin/client_det/edit_location' ?>" method="post" class="form-horizontal" role="form"  parsley-validate id="basicvalidations">
                                           <h1><strong>Only Location Add</strong> </h1></br> 
                                        <div class="col-sm-12 form-group">
                                                <label>Location</label>
												<input type="hidden" value="<?php echo $clint_id; ?>" name="client_id" id="client_id">
												<input type="text" name="num_location" id="num_location" value="" class="form-control" parsley-required="true">
										</div>
                                                                                <div class="col-sm-12 form-group">
                                                <label>Discount</label>
												<input type="hidden" value="<?php echo $clint_id; ?>" name="client_id" id="client_id">
												<input type="text" name="disc_location" id="disc_location" value="" class="form-control" parsley-required="true">
										</div>
										 <div class="col-sm-offset-4 col-sm-8">
										  <button type="submit" class="btn btn-primary" id="save">Save</button>
										 </div>
										  </form>
									  </div>
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
 

    </script>
<script>
	function change() {
  // Get the checkbox
  var checkBox = document.getElementById("changeNeeded");
  // Get the output text
  var user = document.getElementById("userSelect");
  var loc = document.getElementById("locSelect");
  var sms= document.getElementById("smsSelect");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    user.style.display = "block";
	loc.style.display = "block";
	sms.style.display = "block";
  } else {
    user.style.display = "none";
	loc.style.display = "none";
	sms.style.display = "none";
  }
}
	</script>
</body>
 </html>
