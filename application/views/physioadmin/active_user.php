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
                                    
                                    <div class="panel-body">
									<div class="table-responsive" style="background-color:#f4f9f3;">
											<table class="table table table-hover"><tr>
														   <td><select name="client_name" id="client_name"  placeholder="Please select client" class="chosen-select chosen-transparent form-control" style="width: 260px;" >
																		<option>Please select name</option>
																		<?php
																			if ($client_name!=false) {
																				foreach ($client_name as $row) {
																					echo '<option value="'.$row['client_id'].'">'.$row['first_name'].'</option>';
																				}
																			}
																		?>
																	</select>
																</td> 
																<td ><select name="client_id" id="client_id" width="500px;" placeholder="Please select client" class="chosen-select chosen-transparent form-control" style="width: 260px;" >
																		<option>Please select ID</option>
																		 <?php
																			if ($client_name!=false) {
																				foreach ($client_name as $row) {
																					echo '<option value="'.$row['client_id'].'">'.$row['client_id'].'</option>';
																				}
																			}
																		?>
																	</select>
																</td>
																<td ><select name="email" id="email" width="200%" placeholder="Please select client" class="chosen-select chosen-transparent form-control" style="width: 260px;">
																		<option>Please select email</option>
																		<?php
																			if ($client_name!=false) {
																				foreach ($client_name as $row) {
																					echo '<option value="'.$row['client_id'].'">'.$row['email'].'</option>';
																				}
																			}
																		?>
																	</select>
																</td>
																<td ><select name="city" id="city" width="100%" placeholder="Please select city" class="chosen-select chosen-transparent form-control" >
																		<option>Please select city</option>
																		<?php
																			if ($client_name!=false) {
																				foreach ($client_name as $row) {
																					echo '<option value="'.$row['city'].'">'.$row['city'].'</option>';
																				}
																			}
																		?>
																	</select>
																</td>
																<td ><select name="mobile" id="mobile" width="200%" placeholder="Please select mobile" class="chosen-select chosen-transparent form-control" style="width: 260px;">
																		<option>Please select Mobile No</option>
																		<?php
																			if ($client_name!=false) {
																				foreach ($client_name as $row) {
																					echo '<option value="'.$row['client_id'].'">'.$row['mobile'].'</option>';
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
																					foreach ($client_name as $row) {
																						echo '<option value="'.$row['client_id'].'">'.$row['clinic_name'].'</option>';
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
                                    <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                            <thead>
                                               <tr>
											  <th>S.No</th>
											  <th>Client ID</th>
											  <th>Name</th>
											  <th>User Name</th>
											  <?Php if($this->session->userdata('user_id') == 1) { ?>
											   <th>Password</th>
											  <?Php } ?> <th>Registered</th>
											  <th>Expire</th>
											  <th>Last Login Date</th>
											  <th>Status</th>
											  <th>Action</th>
											  
												  </tr>
												</thead>
												<tbody>
												 <?php if($active_user != false){ 
										          $c = $this->uri->segment(5)+1;
													foreach($active_user as $active_client){
												   $this->db->where('client_id',$active_client['client_id']);
												   $this->db->select('*')->from('tbl_validity');
												   $res = $this->db->get();
												   if($res->result_array() != false){
												   $validity = $res->row()->duration;
												   $num_users = $res->row()->num_users;
												   $num_location = $res->row()->num_location;
												   } else {
														$validity = '0';
														$num_users =1;
														$num_location =1;
												   }
										  ?>
												<tr>
													<td><?php echo $c; ?></td>
											<td><?php echo $active_client['client_id']; ?></td>
											<td><?php echo $active_client['first_name']; ?></td>
											<td><?php echo $active_client['username'];  ?></td>
											<?Php if($this->session->userdata('user_id') == 1) { ?>
											<td><?php echo $active_client['password'];  ?></td>
											<?Php } ?><td><?php echo $active_client['created_on']; ?></td>
											<td><?php echo $active_client['expire_date']; ?></td>
											<td><?php echo date('d-F-Y h:i a',strtotime($active_client['last_login_date'])); ?></td>
											<td><span class="badge badge-greensea" style="padding:0.5em;"><?php echo $validity;?>&nbsp;&nbsp;Days</span></td>
											<td><a class="usage" href="<?php echo base_url().'physioadmin/client_det/usage_list/'.$active_client['client_id'] ?>"><span class="badge" style="background-color:#0D903F; padding:0.5em;">view</span></a>
											
											<?php if($active_client['status'] == 0) { ?><a class="verify" href="<?php echo '#'.$active_client['client_id']; ?>"><i class="fa fa-trash-o" style="font-size:20px;color:white;text-shadow:1px 1px 1px color:white;"></i> <span class="tooltiptext"><span class="badge badge-info" style="background-color:#2F4F4F; padding:0.5em;">Activate</span></span></a><?php } ?>
											<?php if($active_client['status'] == 1) { ?><a class="verify" href="<?php echo '#'.$active_client['client_id']; ?>"><i class="fa fa-trash-o" style="font-size:20px;color:white;text-shadow:1px 1px 1px color:white;"></i> <span class="tooltiptext"><span class="badge badge-info" style="background-color:#D72F15; padding:0.5em;">Deactivate</span></span></a><?php } ?>
											&nbsp;&nbsp;<a target="_blank" class="btn btn-dutch" href="<?php echo 'https://web.whatsapp.com/send?phone=91'.$active_client['mobile']; ?>"> <span class="badge" style="background-color:#15A8D7;">Whatsapp</span> </a></center></td></tr>
										<?php $c++; } }?>
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
       <!-- <script src="<?php echo base_url() ?>admin_assets/plugins/pace/pace.min.js" type="text/javascript"></script>-->
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
		 window.location="<?php echo base_url() ?>physioadmin/client_det/view/search/"+value;
	});
	$('#mobile').change(function(){
		 var value=$('#mobile').val();
		 window.location="<?php echo base_url() ?>physioadmin/client_det/view/search/"+value;
	});
	$('#clinic_name').change(function(){
		 var value=$('#clinic_name').val();
		 window.location="<?php echo base_url() ?>physioadmin/client_det/view/search/"+value;
	});
	$('#client_name').change(function(){
		 var value=$('#client_name').val();
	window.location="<?php echo base_url() ?>physioadmin/client_det/view/search/"+value;
	});
	$('#refresh').click(function(){
		  window.location="<?php echo base_url() ?>physioadmin/client_det/view/";
	});
	$('#email').change(function(){
		 var value=$('#email').val();
		 window.location="<?php echo base_url() ?>physioadmin/client_det/view/search/"+value;
	});
	$('#city').change(function(){
		 var value=$('#city').val();
		 window.location="<?php echo base_url() ?>physioadmin/client_det/view/city/"+value;
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
		
			window.location = '<?php echo base_url();?>physioadmin/client_det/export_activeuser/' ;
		
			
	});
	
	$(document).ready(function() {
	$('.verify').on("click", function () {
		          var client_id = $(this).attr('href').split('#')[1];
					swal({
                        title: "Are you sure?",
                        text: "You have to change the status of this Account",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes",
                        cancelButtonText: "No",
                        closeOnConfirm: false,
                        closeOnCancel: false},
                        function (isConfirm) {
                            if (isConfirm) {
								$.ajax({
											url : '<?php echo base_url().'physioadmin/dashboard/account_verify/' ?>',
											type: "POST",
											data : {p_id:client_id},
											dataType: 'json', 
											success:function(data, textStatus, jqXHR,form) 
											{
												swal("Your status has been changed.", "success");
												setTimeout(function(){ 
													window.location.reload();
												}, 1000);
											},
											error: function(jqXHR, textStatus, errorThrown) 
											{
												swal("Your status has not been changed", "Failure");
												setTimeout(function(){ 
													window.location.reload();
												}, 1000);
											}
									});
                            } else {
                                swal("Cancelled", "Your status has not been changed", "error");
                            }
                        });
                });
	});
    </script></body>
</html>