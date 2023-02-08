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
  <style>
  .invoice {
    position: relative;
    
}

 .invoice .tooltiptext {
    visibility: hidden;
    width: 50px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the invoice */
    position: absolute;
    z-index: 1;
}

.invoice:hover .tooltiptext {
    visibility: visible;
} 

  .edit {
    position: relative;
    
}

 .edit .tooltiptext {
    visibility: hidden;
    width: 50px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the invoice */
    position: absolute;
    z-index: 1;
}

.edit:hover .tooltiptext {
    visibility: visible;
} 
  .delete {
    position: relative;
   
}

 .delete .tooltiptext {
    visibility: hidden;
    width: 50px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the invoice */
    position: absolute;
    z-index: 1;
}

.delete:hover .tooltiptext {
    visibility: visible;
} 
</style>
  <body class="bg-1">

   
    <div id="wrap">
     <div class="row">
	<?php $this->load->view('physioadmin/sidebar');  ?>
       <div id="content" class="col-md-12">
          <div class="pageheader">
          <div class="breadcrumbs">
              
            </div>
         </div>
         <div class="main">
          <div class="row">
            <div class="col-md-12">
               <section class="tile transparent">
					<div class="tile-header transparent">
                    <h1><strong>Client Details</strong></h1>
                    
                    <div class="controls">
                      <a href="#" class="minimize"><i class="fa fa-chevron-down"></i></a>
                      <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
                      <a href="#" class="remove"><i class="fa fa-times"></i></a>
                    </div>
                  </div>
                  <div class="tile-body color transparent-black rounded-corners">
                     <div class="table-responsive">
					<table class="table table-datatable table-custom"><tr>
			   <td >Search by</td>
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
					 <table  class="table table-datatable table-custom" id="basicDataTable">
                        <thead>
                          <tr>
                       <th>S.No</th>
					  <th>Client ID</th>
					  <th>User Name</th>
					  <?php if($this->session->userdata('user_id') == 1) { ?>
					  <th>Password</th>
					  <?Php } ?>
					  <th>Email Verified</th>
					  <th>Client Name</th>
					  <th>Clinic Name</th>
					  <th>Address</th>
					  <th>Contact No</th>
					  <th>Plan</th>
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
					 <?Php } ?><td><?php echo $clients['email_verified']; ?></td>
					<td><?php echo $clients['first_name'].$clients['last_name'] ?></td>
					<td><?php echo $clients['clinic_name'];?></td>
					<td><?php echo $clients['address'].'<br><font color="red">City </font> : '.$clients['city'].'<br><font color="blue">State </font>: '.$clients['state'];?></td>
					<!--<td><?php echo $clients['city'];?></td>
					<td><?php echo $clients['state'];?></td>-->
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
							<td><a  href="<?php echo base_url().'physioadmin/client_det/usage_list/'.$clients['client_id'] ?>"><i class="fa fa-eye" style="font-size:20px;color:white;text-shadow:1px 1px 1px color:white;"></i> </a>
					&nbsp;&nbsp;<a target="_blank" class="btn btn-dutch" href="<?php echo 'https://web.whatsapp.com/send?phone=91'.$clients['mobile']; ?>"> <span class="badge" style="background-color:#15A8D7;">Whatsapp</span> </a></center></td>
					</tr>
				  <?php  $c++; } }?>
						</tr>
						
					
						
                        </tbody>
                      </table>
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
                </section>
               </div>
              </div>
            </div>
      </div>
      
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
		 window.location="<?php echo base_url() ?>physioadmin/client_det/dashboard/search/"+value;
	});
	$('#client_name').change(function(){
		 var value=$('#client_name').val();
	window.location="<?php echo base_url() ?>physioadmin/client_det/dashboard/search/"+value;
	});
	$('#refresh').click(function(){
		  window.location="<?php echo base_url() ?>physioadmin/client_det/dashboard/";
	});
	$('#email').change(function(){
		 var value=$('#email').val();
		 window.location="<?php echo base_url() ?>physioadmin/client_det/dashboard/search/"+value;
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
		
			window.location = '<?php echo base_url();?>physioadmin/dashboard/export_client/' ;
		
			
	});
    </script>
  </body>
</html>
      
	  