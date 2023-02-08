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
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/jgrowl/css/jquery.jgrowl.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/sticky.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-confirm.js"></script>
  </head>
  <style>

</style>
  <body class="bg-1">

   
    
    <div id="wrap">
     <div class="row">
	<?php $this->load->view('subadmin/sidebar');  ?>
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
                    <h1><strong>Client Details</strong>  </h1>
                    
                    <div class="controls">
                      <a href="#" class="minimize"><i class="fa fa-chevron-down"></i></a>
                      <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
                      <a href="#" class="remove"><i class="fa fa-times"></i></a>
                    </div>
                  </div>
                  <div class="tile-body color transparent-black rounded-corners">
                     <div class="table-responsive">
				<table class="table table-datatable table-custom"><tr>
			   <td >Search by
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
										echo '<option value="'.$patient_names['client_id'].'">'.$patient_names['username'].'</option>';
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
					
					</tr>
					<tr>
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
					<td ><select name="clinic_name" id="clinic_name" width="200%" placeholder="Please select clinic_name" class="chosen-select chosen-transparent form-control" style="width: 260px;">
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
					
					<td ><select name="state" id="state" width="200%" placeholder="Please select state" class="chosen-select chosen-transparent form-control" style="width: 260px;">
                            <option>Please select State Name</option>
                            <?php
								if ($client_name!=false) {
                                    foreach ($client_name as $patient_names) {
										echo '<option value="'.$patient_names['client_id'].'">'.$patient_names['state'].'</option>';
                                    }
                                }
                            ?>
                        </select>
					</td>
					
				</tr>
			</table>
					 <table  class="table table-datatable table-custom" id="basicDataTable">
                        <thead>
                          <tr>
                       <th>S.No</th>
					  <th>Client ID</th>
					  <th>User Name</th>
					  
					  <th>Email Verified</th>
					  <th>Client Name</th>
					  <th>Clinic Name</th>
					  <th>Address</th>
					  <th>Contact No</th>
					   <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
						<?php if($client != false){ $c = $this->uri->segment(5)+1;	
							foreach($client as $clients){
				           $this->db->where('client_id',$clients['client_id']);
						   $this->db->select('*')->from('tbl_validity');
						   $res = $this->db->get();
						   if($res->result_array() != false){
						   $validity = $res->row()->duration;
						   $num_users = $res->row()->num_users;
						   $num_location = $res->row()->num_location;
						   } else {
							    $validity = $clients['client_id'];
								$num_users =1;
								$num_location =1;
						   }
				  ?>
						<tr>
							<td><?php echo $c; ?></td>
					<td><?php echo $clients['client_id']; ?></td>
					<td><?php echo $clients['username'];  ?></td>
					
				   <td><?php echo $clients['email_verified']; ?></td>
					<td><?php echo $clients['first_name'].$clients['last_name'] ?></td>
					<td><?php echo $clients['clinic_name'];?></td>
					<td><?php echo $clients['address'].'<br><font color="red">City </font> : '.$clients['city'].'<br><font color="blue">State </font>: '.$clients['state'];?></td>
					
					<td><?php echo $clients['mobile'].'<br>'.$clients['phone'];?></td>
					<td><a href="<?php echo base_url().'subadmin/dashboard/activate/'.$clients['client_id'];?>" style="color:white;"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a>&nbsp;
					<a href="<?php echo base_url().'subadmin/dashboard/client_print/'.$clients['client_id'];?>" style="color:white;"><i class="fa fa-print fa-2x" aria-hidden="true"></i></a>&nbsp;
					<a href="<?php echo base_url().'subadmin/dashboard/usage_list/'.$clients['client_id'];?>" style="color:white;"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></a>&nbsp;
					<a href="<?php echo '#'.$clients['client_id']; ?>" style="color:white;" class="confirm"><i class="fa fa-envelope fa-2x" aria-hidden="true"></i></a>
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
	<script src="<?php  echo base_url();  ?>assets/js/vendor/jgrowl/jquery.jgrowl.min.js"></script>
	<script>
	$('select').select2();
	 
	$(document).ready(function() {
	$('#client_id').change(function(){
		 var value=$('#client_id').val();
		 window.location="<?php echo base_url() ?>subadmin/dashboard/client_list/search/"+value;
	});
	$('#mobile').change(function(){
		 var value=$('#mobile').val();
		 window.location="<?php echo base_url() ?>subadmin/dashboard/client_list/search/"+value;
	});
	$('#clinic_name').change(function(){
		 var value=$('#clinic_name').val();
		 window.location="<?php echo base_url() ?>subadmin/dashboard/client_list/search/"+value;
	});
	$('#client_name').change(function(){
		 var value=$('#client_name').val();
	window.location="<?php echo base_url() ?>subadmin/dashboard/client_list/search/"+value;
	});
	
	$('#email').change(function(){
		 var value=$('#email').val();
		 window.location="<?php echo base_url() ?>subadmin/dashboard/client_list/search/"+value;
	});
	$('#city').change(function(){
		 var value=$('#city').val();
		 window.location="<?php echo base_url() ?>subadmin/dashboard/client_list/city/"+value;
	});
	
	$('#state').change(function(){
		 var value=$('#state').val();
		 window.location="<?php echo base_url() ?>subadmin/dashboard/client_list/search/"+value;
	});
	
	
 
  $('.confirm').on('click', function () {
			 var client_id = $(this).attr('href').split('#')[1];
			 $.confirm({
             title: 'Confirmation',
             content: 'Are you sure you want to send Invoice to this client?',
             confirmButton: 'Proceed',
             confirmButtonClass: 'btn-info',
             icon: 'fa fa-question-circle',
             animation: 'scale',
             animationClose: 'top',
             opacity: 0.5,
             confirm: function () {
				 
				 $.ajax({
						url : '<?php echo base_url().'subadmin/dashboard/send_mail/' ?>',
						type: "POST",
						data : {p_id:client_id},
						dataType: 'json', 
						success:function(data, textStatus, jqXHR,form) 
						{
							$.alert('Invoice Send Successfully!');
							 window.location.reload();
						},
						 error: function(jqXHR, textStatus, errorThrown) 
						{
							$.alert('Invoice Send Successfully!');
							 window.location.reload();
						} 
				});
			 }
         });
    }); 
 
});


	
    </script>
  </body>
</html>
      
	  