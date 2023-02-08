<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
     
    <meta name="msapplication-tap-highlight" content="no">
	<link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
<link href="<?php echo base_url()?>my_assets/main.css" rel="stylesheet"></head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
            <?php include("sidebar.php");?>
            <div class="app-main__outer">
                    <div class="app-main__inner">
                      <div class="row">
                    <div class="col-md-12">
                    <div class="main-card mb-3 card">
					 <div class="row">
									<div class="col-85" style="width:80%;">
                                    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
									   <li class="nav-item">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									   </li>
									   <li class="nav-item active">
											<a role="tab" class="nav-link active show" href="#tab-content-1" id="tab-1" data-toggle="tab" aria-selected="true">
												<span>Private Exercise View</span>
											</a>
										</li>
										
									</ul></div>
									<div class="col" style="float:right;"></br><div style="float:right;" ><a class="btn btn-shadow btn-warning" href="<?php echo base_url().'client/private_exercise/ex_upload' ?>" ><strong>Add New Exercise
									</strong></a>
														&nbsp;&nbsp;&nbsp;</div>
									</div>
									</div> 
					<div class="card-body">
                            <div class="main-card mb-3">
                                    <div class="grid-menu grid-menu-4col">
                                        <div class="no-gutters row">
										   <div class="col-sm-3" >
                                                <a href="<?php echo base_url().'client/private_exercise/private_ankle' ?>"> <div class="widget-chart widget-chart-hover">
                                                        <img style="width:120px; height:120px;" src="<?php echo base_url(); ?>icon/ankle.png" height="42" width="42">
														<div class="widget-subheading"></br>Ankle & Foot</div>    
                                                </div></a>
                                            </div>
                                            <div class="col-sm-3" >
                                                <a href="<?php echo base_url().'client/private_exercise/private_cervical' ?>"> <div class="widget-chart widget-chart-hover">
                                                        <img style="width:120px; height:120px;" src="<?php echo base_url(); ?>icon/pain-neck-man-health-512.png" height="42" width="42">
														<div class="widget-subheading"></br>Cervical</div>    
                                                </div></a>
                                            </div>
											 <div class="col-sm-3" >
                                                <a href="<?php echo base_url().'client/private_exercise/private_education' ?>"> <div class="widget-chart widget-chart-hover">
                                                    <img style="width:120px; height:120px;" src="<?php echo base_url(); ?>icon/educate_icon_1435588347778.png" height="42" width="42">
													<div class="widget-subheading"></br>Education</div>    
                                                </div></a>
                                            </div>
                                            <div class="col-sm-3" >
                                                <a href="<?php echo base_url().'client/private_exercise/private_elbow' ?>"> <div class="widget-chart widget-chart-hover">
                                                    <img style="width:120px; height:120px;" src="<?php echo base_url(); ?>icon/Muscles-icon.png" height="42" width="42">
													<div class="widget-subheading"></br>Elbow & Hand</div>    
                                                </div></a>
                                            </div>
											  <div class="col-sm-3" >
                                                <a href="<?php echo base_url().'client/private_exercise/private_hipknee' ?>"> <div class="widget-chart widget-chart-hover">
                                                    <img style="width:120px; height:120px;" src="<?php echo base_url(); ?>icon/icon-big.gif" height="42" width="42">
													<div class="widget-subheading"></br>Hip and Knee</div>    
                                                </div></a>
                                            </div>
                                            <div class="col-sm-3" >
                                                <a href="<?php echo base_url().'client/private_exercise/private_lumbarthoracic' ?>"> <div class="widget-chart widget-chart-hover">
                                                    <img style="width:120px; height:120px;" src="<?php echo base_url(); ?>icon/spine-icon.png" height="42" width="42">
													<div class="widget-subheading"></br>Lumbar Thoracic</div>    
                                                </div></a>
                                            </div>
											  <div class="col-sm-3" >
                                                <a href="<?php echo base_url().'client/private_exercise/private_shoulder' ?>"> <div class="widget-chart widget-chart-hover">
                                                    <img style="width:120px; height:120px;" src="<?php echo base_url(); ?>icon/shoulder-icon.png" height="42" width="42">
													<div class="widget-subheading"></br>Shoulder</div>    
                                                </div></a>
                                            </div>
											  <div class="col-sm-3" >
                                                <a href="<?php echo base_url().'client/private_exercise/private_special' ?>"> <div class="widget-chart widget-chart-hover">
                                                    <img style="width:120px; height:120px;" src="<?php echo base_url(); ?>icon/miscellaneous-icon.png" height="42" width="42">
													<div class="widget-subheading"></br>Special</div>    
                                                </div></a>
                                            </div>
											 <div class="col-sm-3" >
											 </div>
											 <div class="col-sm-3" >
											 </div>
											 <div class="col-sm-3" >
											 </div>
											 <div class="col-sm-3" >
											 </div>
                                        </div>
                                    </div>
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
<script type="text/javascript" src="<?php echo base_url()?>my_assets/assets/scripts/main.js"></script>
 	
<script>
</script>

</body>
</html>
