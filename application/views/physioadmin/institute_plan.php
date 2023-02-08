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
   <!-- <link href="<?php echo base_url() ?>admin_assets/plugins/pace/flash.css" rel="stylesheet" type="text/css"/>-->
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
                            <h1>Institute Plan Clients</h1>
                            <small>Institute Plan Clients</small>
                           
                        </div>
                    </section>
                    <section class="content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-bd ">
                                     <div class="panel-body">
									 <div class="table-responsive" style="background-color:#f4f9f3;">
											<table class="table table table-hover" ><tr>
											   <td >
											  <select name="client_name" id="client_name"  placeholder="Please select client" class="chosen-select chosen-transparent form-control" style="width: 260px;" >
														<option>Please select name</option>
														<?php
															if ($client_name!=false) {
																foreach ($client_name as $patient_names) {
																	echo '<option value="'.$patient_names['client_id'].'">'.$patient_names['first_name'].'</option>';
																}
															}
														?>
													</select>
												</td> <td> &nbsp;&nbsp;</td>
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
											  <th>User Name</th>
											  <th>Expire Date</th>
											  <th>Status</th>
											  <th>Action</th>
												  </tr>
												</thead>
												<tbody>
												<?php if($client_list != false){
										$c = $this->uri->segment(5)+1;					  
													foreach($client_list as $client_lists){
										  
										  ?>
												<tr>
													<td><?php echo $c; $c++; ?></td>
											<td><?php echo $client_lists['client_id']; ?></td>
											<td><?php echo $client_lists['username'];  ?></td>
											<td><?php echo $client_lists['expire_date']; ?></td>
											<?php if($client_lists['status'] != '0'){ ?>
											<td><?php echo 'Active' ?></td>
											<?php } else { ?>
											<td><?php echo 'Inactive' ?></td>
											<?php } ?>
											<td><a href="<?php echo base_url().'physioadmin/client_det/enterprise_edit/'.$client_lists['client_id']; ?>" class="btn btn-greensea"><span class="badge" style="background-color:#D72F15;">Edit</span></a>&nbsp;&nbsp;<a target="_blank" class="btn btn-dutch" href="<?php echo 'https://web.whatsapp.com/send?phone=91'.$client_lists['mobile']; ?>"> <span class="badge" style="background-color:#15A8D7;">Whatsapp</span> </a></center></td>
											</tr>
										  <?php }}?>
									   </tbody>
								  </table>
								   <div class="page-nation text-right">
								   <ul class="pagination pagination-large">
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
$('#client_id').click(function(){
		 var value=$('#client_id').val();
		 window.location="<?php echo base_url() ?>physioadmin/client_det/institute_plan/search/"+value;
	});
	$('#client_name').click(function(){
		 var value=$('#client_name').val();
		 window.location="<?php echo base_url() ?>physioadmin/client_det/institute_plan/search/"+value;
	});
	$('#refresh').click(function(){
		  window.location="<?php echo base_url() ?>physioadmin/client_det/institute_plan/";
	});
	$('#email').click(function(){
		 var value=$('#email').val();
		 window.location="<?php echo base_url() ?>physioadmin/client_det/institute_plan/"+value;
	});
$('#SearchMe').click(function(e){
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
		
			window.location = '<?php echo base_url();?>physioadmin/client_det/export_institute/' ;
		
			
	});
    </script>
</body>
</html>