<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Location List - Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
    <meta name="msapplication-tap-highlight" content="no">
	
	<link href="<?php echo base_url()?>asset_list/main.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>my_assets/jquery-confirm.css" />
	<script src="<?php echo base_url() ?>assets/sweet-alert/sweetalert.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/sweet-alert/sweetalert.css">
    <style>
         .tabs-lg-alternate.card-header>.nav .nav-item .widget-number.mob {
         display: none;
         }
         .tabs-lg-alternate.card-header>.nav .nav-item .widget-number.one {
         display: block;
         }
         a.btn-icon.btn-icon-only.btn-shadow.btn-dashed.btn.btn-outline-secondary {
         text-overflow: ellipsis;
         overflow-x: hidden;
         overflow-y: hidden;
         width: 100%;
         }
         a.btn-icon.btn-icon-only.btn-shadow.btn-dashed.btn.btn-outline-secondary {
         width: 100%;
         }
         button.btn-icon.btn-icon-only.btn-shadow.btn-dashed.btn.btn-outline-secondary {
         width: 100%;
         }
         button.btn-icon.btn-icon-only.btn-shadow.btn-dashed.btn.btn-outline-secondary img {
         width: 100% !important;
         }
         i.fas.fa-coins.fa-2x {
         font-size: 1.5em !important;
         }
         .add_new_patient {
         display: none;
         }
         @media (max-width: 768px) {
         .tabs-lg-alternate.card-header>.nav {
         display: block;
         }
         .br-1 {
         padding: 0 1em;
         }
         .arrow {
         text-align: right !important;
         color: #3f6ad8;
         font-size: 1.5em;
         }
         .add_new_patient {
         display: block;
         text-align: left !important;
         padding: 8px !important;
         box-shadow: 1px 4px 11px 1px #f3f2f2;
         margin-bottom: 8px;
         border: 1px solid rgb(238 238 238 / 70%);
         border-radius: 6px;
         }
         .tabs-lg-alternate.card-header>.nav .nav-link {
         display: flex;
         flex-direction: row;
         justify-content: space-between;
         }
         .tabs-lg-alternate.card-header>.nav .nav-item .widget-number.mob {
         display: block;
         }
         .tabs-lg-alternate.card-header>.nav .nav-item .widget-number.one {
         display: none;
         }
         .col-md-6.col-sm-6.col-xs-6.pull-right {
         margin: 0 !important;
         }
         .tab-pane.active.show .card-header {
         height: auto;
         display: block;
         padding: .75rem 0;
         text-align: center;
         margin-bottom: 8px !important;
         border: none !important;
         }
         .table-responsive.add_patient {
         display: none;
         }
         }
         img
         {
         vertical-align: middle;
         }
         #tab-content-1 .widget-number
         {
         font-size: large;
         }
         .mob_none {
         display: block;
         }
         .mob {
         display: none;
         }
         @media (max-width: 768px) {
            .mob_none {
               display: none;
            }
            .mob {
               display: block;
            }
            .add_new_patient {
               display: block;
               text-align: left !important;
               padding: 8px !important;
               box-shadow: 1px 4px 11px 1px #f3f2f2;
               margin-bottom: 8px;
               border: 1px solid rgb(238 238 238 / 70%);
               border-radius: 6px;
               margin: 1em 6px;
            }
            .table-bordered th, .table-bordered td {
               border: 1px solid #e9ecef;
               padding: 4px;
            }
         }
      </style>
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
         <?php include("sidebar.php");?>
             <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="tabs-animation">
                         <div class="row mob">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
									</br><div class="row">
									<div class="col" style="width:90%;"><h5 class="card-title">&nbsp;&nbsp;&nbsp;&nbsp;Location list</h5>
									</div>
									<div class="col" style="width:10%; margin-right: 15px;" >	<a style="float:right;" class="btn btn-shadow btn-warning" href="<?php echo base_url().'client/referal/location_one' ?>" ><strong>Add New Location</strong></a>
									&nbsp;&nbsp;
									</div>
									</div>
									<div class="card-body">
                                    <div class="table-responsive">
										<table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Name<br>
												 Email <br>
												Clinic name<br>Branch<br>
												City<br></th>
												<th class="text-center">
												State<br>Mobile<br>
												Status</th>
												<th class="text-center">Action</th>
                                              </tr>
                                            </thead>
                                            <tbody>
											<?php if($location != false){ ?>
                                        
										  <?php
						                   foreach ($location as $locations) {
						                   ?>
                                            <tr>
                                                <td class="text-center text-muted"> 
												<div class="badge badge-pill badge-info"><?php echo $locations['first_name']; ?></div>
												
												<br>
                                               <?php echo $locations['email']; ?><br>
											   <?php echo $locations['clinic_name']; ?><br>
											   <?php echo $locations['branch_name']; ?><br>
											   <?php echo $locations['city']; ?></td>
											   <td class="text-center"><?php echo $locations['state']; ?><br>
							                   <?php echo $locations['mobile']; ?> 
											   <br> 
												<?php if($locations['status'] == 0){ ?>
												<div class="badge badge-pill badge-danger">Inactive</div>
												<?php } 
												else {  ?>
											   <div class="badge badge-pill badge-success">Active</div>
												<?php } ?>
												</td>
                                                <td class="text-center">
												  <a class="edit" href="<?php echo base_url().'client/location/edit/'.$locations['client_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
												  <a href="<?php echo '#'.$locations['client_id']; ?>" class="UpdateMe"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Status Change"><i class="fa fa-trash-alt"> </i></button></a>
												  </td>
                                            </tr>
                                             <?php } ?>
											 <?php } else { echo '<tr><td colspan="10" class="text-center">No More Records</td></tr>'; }  ?>
                                            </tbody>
                                        </table>
										 
                                    </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                        
                         <div class="row mob_none">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
									</br><div class="row">
									<div class="col" style="width:90%;"><h5 class="card-title">&nbsp;&nbsp;&nbsp;&nbsp;Location list</h5>
									</div>
									<div class="col" style="width:10%; margin-right: 15px;" >	<a style="float:right;" class="btn btn-shadow btn-warning" href="<?php echo base_url().'client/referal/location_one' ?>" ><strong>Add New Location</strong></a>
									&nbsp;&nbsp;
									</div>
									</div>
									<div class="card-body">
                                    <div class="table-responsive">
										<table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Name</th>
												<th class="text-center">Email</th>
												<th class="text-center">Clinic name</th>
												<th class="text-center">Branch</th>
												<th class="text-center">City</th>
												<th class="text-center">State</th>
												<th class="text-center">Mobile</th>
												<th class="text-center">Status</th>
												<th class="text-center">Action</th>
                                              </tr>
                                            </thead>
                                            <tbody>
											<?php if($location != false){ ?>
                                        
										  <?php
						                   foreach ($location as $locations) {
						                   ?>
                                            <tr>
                                                <td class="text-center text-muted"> 
												<div class="badge badge-pill badge-info"><?php echo $locations['first_name']; ?></div>
												
												</td>
                                               <td class="text-center"><?php echo $locations['email']; ?></td>
											   <td class="text-center"><?php echo $locations['clinic_name']; ?></td>
											   <td class="text-center"><?php echo $locations['branch_name']; ?></td>
											   <td class="text-center"><?php echo $locations['city']; ?></td>
											   <td class="text-center"><?php echo $locations['state']; ?></td>
							                   <td class="text-center"><?php echo $locations['mobile']; ?></td>
											    <td class="text-center text-muted"> 
												<?php if($locations['status'] == 0){ ?>
												<div class="badge badge-pill badge-danger">Inactive</div>
												<?php } 
												else {  ?>
											   <div class="badge badge-pill badge-success">Active</div>
												<?php } ?>
												</td>
                                                <td class="text-center">
												  <a class="edit" href="<?php echo base_url().'client/location/edit/'.$locations['client_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
												  <a href="<?php echo '#'.$locations['client_id']; ?>" class="UpdateMe"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Status Change"><i class="fa fa-trash-alt"> </i></button></a>
												  </td>
                                            </tr>
                                             <?php } ?>
											 <?php } else { echo '<tr><td colspan="10" class="text-center">No More Records</td></tr>'; }  ?>
                                            </tbody>
                                        </table>
										 
                                    </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                         
                         
                    </div>
                </div>
                    </div>
    </div>
 
  

 
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script>
 	
 
<script>
$(document).ready(function() {
		
	$('.UpdateMe').on('click', function () {
			 var client_id = $(this).attr('href').split('#')[1];
			 url ='<?php echo base_url().'client/location/update/' ?>'+ client_id; 
			 swal({
			  title: "Confirmation",
			  text: "Are you sure you want to update this location?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					data : {c_id:client_id},
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
					//alert(data.status); 
						if(data.status == 'success') { 
						  swal("Success!", "Your records has been Updated!", "success");
						}
						window.location.reload(); 
							
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						  swal("Failure!", "Your records has not been Updated!", "success");
						// window.location.reload(); 
					}
				  });
			}); 
	});
});
</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5eceda798ee2956d73a53d09/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>
