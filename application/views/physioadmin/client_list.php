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
    <<!--link href="<?php echo base_url() ?>admin_assets/plugins/pace/flash.css" rel="stylesheet" type="text/css"/>-->
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
   <style>
.pager{padding-left:0;margin:20px 0;text-align:center;list-style:none}.pager li{display:inline}.pager li>a,.pager li>span{display:inline-block;padding:5px 14px;background-color:#fff;border:1px solid #ddd;border-radius:15px}.pager li>a:focus,.pager li>a:hover{text-decoration:none;background-color:#eee}.pager .next>a,.pager .next>span{float:right}.pager .previous>a,.pager .previous>span{float:left}.pager .disabled>a,.pager .disabled>a:focus,.pager .disabled>a:hover,.pager .disabled>span{color:#777;cursor:not-allowed;background-color:#fff}
</style>
  </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
                
                <?php $this->load->view('physioadmin/sidebar'); ?>
                <div class="content-wrapper">
                   <section class="content-header">
                        <div class="header-icon">
                            <i class="pe-7s-box1"></i>
                        </div>
                        <div class="header-title">
                            <form action="#" method="get" class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
                                <div class="input-group">
                                    <input type="text" name="q" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button type="submit" name="search" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form>   
                            <h1>Clients List</h1>
                            <small>Clients List</small>
                            <ol class="breadcrumb hidden-xs">
                                <li><a href="#"><i class="pe-7s-home"></i> Home</a></li>
                                <li class="active">Clients List</li>
                            </ol>
                        </div>
                    </section>
                    <section class="content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-bd ">
                                    <div class="panel-heading">
										<div class="btn-group"> 
                                         <div class="table-responsive">
											<table class="table "><tr>
														   <td><select name="client_name" id="client_name"  placeholder="Please select client" class="chosen-select chosen-transparent form-control" style="width: 260px;" >
																		<option>Please select name</option>
																		<?php
																			if ($client_name!=false) {
																				foreach ($client_name as $patient_names) {
																					echo '<option value="'.$patient_names['client_id'].'">'.$patient_names['first_name'].'</option>';
																				}
																			}
																		?>
																	</select>
																</td> 
																<td ><select name="client_id" id="client_id" width="500px;" placeholder="Please select client" class="chosen-select chosen-transparent form-control" style="width: 260px;" >
																		<option>Please select ID</option>
																		 <?php
																			if ($client_name!=false) {
																				foreach ($client_name as $patient_names) {
																					echo '<option value="'.$patient_names['client_id'].'">'.$patient_names['client_id'].'</option>';
																				}
																			}
																		?>
																	</select>
																</td>
																<td ><select name="email" id="email" width="200%" placeholder="Please select client" class="chosen-select chosen-transparent form-control" style="width: 260px;">
																		<option>Please select email</option>
																		<?php
																			if ($client_name!=false) {
																				foreach ($client_name as $patient_names) {
																					echo '<option value="'.$patient_names['client_id'].'">'.$patient_names['email'].'</option>';
																				}
																			}
																		?>
																	</select>
																</td>
																<td ><select name="city" id="city" width="100%" placeholder="Please select city" class="chosen-select chosen-transparent form-control" >
																		<option>Please select city</option>
																		<?php
																			if ($client_name!=false) {
																				foreach ($client_name as $patient_names) {
																					echo '<option value="'.$patient_names['city'].'">'.$patient_names['city'].'</option>';
																				}
																			}
																		?>
																	</select>
																</td>
																<td ><select name="mobile" id="mobile" width="200%" placeholder="Please select mobile" class="chosen-select chosen-transparent form-control" style="width: 260px;">
																		<option>Please select Mobile No</option>
																		<?php
																			if ($client_name!=false) {
																				foreach ($client_name as $patient_names) {
																					echo '<option value="'.$patient_names['client_id'].'">'.$patient_names['mobile'].'</option>';
																				}
																			}
																		?>
																	</select>
																</td>
																
																</tr>
																<tr>
																	<td><select name="clinic_name" id="clinic_name" width="200%" placeholder="Please select clinic_name" class="chosen-select chosen-transparent form-control" style="width: 260px;">
																			<option>Please select Clinic Name</option>
																			<?php
																				if ($client_name!=false) {
																					foreach ($client_name as $patient_names) {
																						echo '<option value="'.$patient_names['client_id'].'">'.$patient_names['clinic_name'].'</option>';
																					}
																				}
																			?>
																		</select>
																	</td>
																	<td> <button id="refresh" class="btn btn-info">Refresh</button></td>
																	<td> <button class="btn btn-success" id="ExportMe"><i class="fa fa-download"></i>&nbsp;&nbsp;Export</button> </td>
															    </tr>
														</table>                         
										</div> 
										</div>
                                    </div>
                                    <div class="panel-body">
                                     <div class="table-responsive">
                                     <table class="table table-bordered table-hover">
                                            <thead>
                                            <tr>
										   <th>S.No</th>
										  <th>Client ID</th>
										  <th>User Name</th>
										  <?php if($this->session->userdata('user_id') == 1) { ?>
										  <th>Password</th>
										  <?php } ?>
										  <th>Email Verified</th>
										  <th>Client Name</th>
										  <th>Clinic Name</th>
										  <th>Address</th>
										  
										  <th>Contact No</th>
										  <th>Plan</th>
										   <th>Status</th>
										   <th>Action</th>
											  </tr>
											</thead>
											<tbody>
											<?php if($client != false){ $c = $this->uri->segment(5)+1;	
												foreach($client as $clients){
									  
									  ?>
											<tr>
												<td><?php echo $c; ?></td>
										<td><?php echo $clients['client_id']; ?></td>
										<td><?php echo $clients['username'];  ?></td>
										<?php if($this->session->userdata('user_id') == 1) { ?>
										  <td><?php echo $clients['password'];  ?></td>
										<?php } ?>
										<td><?php echo $clients['email_verified']; ?></td>
										<td><?php echo $clients['first_name'].$clients['last_name'] ?></td>
										<td><?php echo $clients['clinic_name'];?></td>
										<td><?php echo $clients['address'].'<br><font color="red">City </font> : '.$clients['city'].'<br><font color="blue">State </font>: '.$clients['state'];?></td>
										
										<td><?php echo $clients['mobile'].'<br>'.$clients['phone'];?></td>
										<td><?php if($clients['plan'] == 0 ){
													echo 'Free Plan';
													
												} 
												elseif($clients['plan'] == 1){
													echo 'Professional Plan';
													
												} 
												elseif($clients['plan'] == 2){
													echo 'Monetary Plan';
													
												} 
												elseif( $clients['plan'] == 3){
													echo 'Enterprize Plan';
													
												} 
												elseif( $clients['plan'] == 4){
													echo 'Ultimate Prescriber Plan';
													
												} 
												elseif($clients['plan'] == 5){
													echo 'Institute plan';
													
												} 
												
												
												?></td>
												<td><?php if($clients['status'] == 0 ){ 
												echo 'Inactive'; }
												if($clients['status'] == 1){
													echo 'Active';
												}
												
												?></td>
												<td><a  href="<?php echo base_url().'physioadmin/client_det/usage_list/'.$clients['client_id'] ?>"><i class="fa fa-eye" style="font-size:20px;color:white;text-shadow:1px 1px 1px color:white;"></i> </a>
										<a class="delete1" href="<?php echo '#'.$clients['client_id']; ?>"><i class="fa fa-trash-o" style="font-size:20px;color:white;text-shadow:1px 1px 1px color:white;"></i> <span class="tooltiptext">Deactivate</span></a></td>
										<a class="whatsapp" href="<?php echo 'https://web.whatsapp.com/send?phone=91'.$clients['mobile']; ?>"><i class="fa fa-share" style="font-size:20px;color:white;text-shadow:1px 1px 1px color:white;"></i> <span class="tooltiptext">share</span></a></td>
										</tr>
									  <?php  $c++; } }?>
									   </tbody>
								  </table>
								   <div class="page-nation text-right">
								   <ul class="pager">
									<?php foreach ($links as $link) {
									 ?>
										<li>
										<?php echo $link; ?>
										</li>
										  
									<?php } ?>
									</ul>
									</div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section> 
</div>
<footer class="main-footer">
    <div class="pull-right hidden-xs"></div>
    <strong>© 2019 <a href="#">Physio Plus Tech</a></strong> All rights reserved.
</footer>
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
	
	$(document).ready(function() {
	$('#client_id').change(function(){
		 var value=$('#client_id').val();
		 window.location="<?php echo base_url() ?>physioadmin/dashboard/client_list/search/"+value;
	});
	$('#client_name').change(function(){
		 var value=$('#client_name').val();
	window.location="<?php echo base_url() ?>physioadmin/dashboard/client_list/search/"+value;
	});
	$('#refresh').click(function(){
		  window.location="<?php echo base_url() ?>physioadmin/dashboard/client_list/";
	});
	$('#email').change(function(){
		 var value=$('#email').val();
		 window.location="<?php echo base_url() ?>physioadmin/dashboard/client_list/search/"+value;
	});
	$('#city').change(function(){
		 var value=$('#city').val();
		 window.location="<?php echo base_url() ?>physioadmin/dashboard/client_list/city/"+value;
	});
	$('#submit').click(function() {
	var name = $('#name').val();
	var email = $('#email').val();
	var mobile = $('#mobileno').val();
	window.location ="http://physioplustech.com/physioadmin/dashboard/search/" +name+'/'+email+'/'+mobile;
	});
 $('#SearchMe').change(function(e){
		e.preventDefault();
		var
		keyword = $('#keyword').val();
					
		if(keyword == '') {
			jAlert('Please enter search value.', 'Search error');
		} else {
			window.location = '<?php echo base_url(); ?>physioadmin/client_det/view/searchby/' + encodeURIComponent(keyword.replace(/\//g, '_'));
		}
	});
 
});

$('#ExportMe').click(function(e){
		e.preventDefault();
		
			window.location = '<?php echo base_url();?>physioadmin/dashboard/export_freeclient/' ;
		
			
	});
	
	
	$(document).ready(function() {
	$('.delete1').bind('click', function ()  {	
			 var client_id = $(this).attr('href').split('#')[1];
			 $.confirm({
             title: 'Confirmation',
             content: 'Are you sure you want to Deactivate this client?',
             confirmButton: 'Proceed',
             confirmButtonClass: 'btn-info',
             icon: 'fa fa-question-circle',
             animation: 'scale',
             animationClose: 'top',
             opacity: 0.5,
             confirm: function () {
				 
				 $.ajax({
						url : '<?php echo base_url().'physioadmin/client_det/deactive_clientlist/' ?>',
						type: "POST",
						data : {p_id:client_id},
						dataType: 'json', 
						success:function(data, textStatus, jqXHR,form) 
						{
							$.alert('Client Account has been deactivated successfully!');
							setTimeout(function(){ 
								window.location.reload();
							}, 1000);
						},
						error: function(jqXHR, textStatus, errorThrown) 
						{
							$.alert('Client Account has  been deactivated successfully!');
							setTimeout(function(){ 
								window.location.reload();
							}, 1000);
						}
				});
			 }
         });
		 return false;
    }); 
	});
 </script>
</body>
</html>