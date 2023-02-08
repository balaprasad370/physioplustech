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
                            <h1>Renewal Clients</h1>
                            <small>Renewal Clients</small>
                           
                        </div>
                    </section>
                    <section class="content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-bd ">
                                    <div class="panel-body">
                                     <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                              <tr>
										  <th>S.No</th>
										  <th>Client ID</th>
										  <th>User Name</th>
										  <th>No Of days Remaining</th>
										  <th>Contact No</th>
										  <th>Action</th> 
											  </tr>
											</thead>
											<tbody>
											 <?php if($renewal_list != false){
										$c = $this->uri->segment(5)+1;						  
												foreach($renewal_list as $renewal_lists){
									  
									  ?>
											<tr>
												<td><?php echo $c; ?></td>
										<td><?php echo $renewal_lists['client_id']; ?></td>
										<td><?php echo $renewal_lists['username'];  ?></td>
										<td><?php echo $renewal_lists['duration']; ?></td>
										<td><?php echo $renewal_lists['mobile'].'<br>'.$renewal_lists['phone']; ?></td>
										<td><a href="<?php echo base_url().'physioadmin/client_det/send_mail/'.$renewal_lists['client_id'].'/'.$renewal_lists['duration']; ?>" class="btn btn-dutch"><span class="badge" style="background-color:#D72F15;">Send Mail</span></a>&nbsp;&nbsp;<a target="_blank" class="btn btn-dutch" href="<?php echo 'https://web.whatsapp.com/send?phone=91'.$renewal_lists['mobile']; ?>"> <span class="badge" style="background-color:#15A8D7;">Whatsapp</span> </a></center></td>
										</tr>
									  <?php $c++; }}?>
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

$('#SearchMe').click(function(e){
		e.preventDefault();
		var
		keyword = $('#keyword').val();
					
		if(keyword == '') {
			jAlert('Please enter search value.', 'Search error');
		} else {
			window.location = '<?php echo base_url(); ?>physioadmin/client_det/renewal/searchby/' + encodeURIComponent(keyword.replace(/\//g, '_'));
		}
	});

});	 
    </script>
</body>
</html>