<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Birthday List - Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
    
  <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
    <meta name="msapplication-tap-highlight" content="no">
 

<link href="<?php echo base_url()?>asset_list/main.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>my_assets/jquery-confirm.css" />
 
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
                          
				<?php include("sidebar.php");?>
             <div class="app-main__outer">
                <div class="app-main__inner">
                             
                    <div class="tabs-animation">
                         
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Today's Birthday Patient List
                                         
                                    </div>
									 <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Name</th>
												 
												<th class="text-center">DOB</th>
												<th class="text-center">Action</th>
                                                 
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php if($my_birthday != false){ 
						                   foreach ($my_birthday as $row) {
						                   ?>
                                            <tr>
                                                <td class="text-center text-muted"> 
												<div class="badge badge-pill badge-info"><?php echo $row['first_name'];?></div>
												
												</td>
                                                
                                                 <td class="text-center"><?php echo date("M - d, Y", strtotime($row['dob'])); ?></td>
												 
												 
                                                <td class="text-center">
												<a href="<?php echo base_url().'client/group/bday_msg/'.$row['mobile_no'] ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Message"><i class="fa fa-eye"></i></button></a>
												 
                                                </td>
                                            </tr>
											
											<?php  } } else { ?>
																	<tr><td colspan="3"><center> No More Records Found </center></td></tr>
																<?php } ?>
                                            </tbody>
											
                                        </table>
										 
								 
                                    </div>
                                     </div>
                                </div>
								
								
								<div class="col-md-6">
                                <div id="accordion" class="accordion-wrapper mb-3">
                                    <div class="card">
                                        <div id="headingOne" class="card-header">
                                            <button type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
                                                <h5 class="m-0 p-0">Upcoming Birthdays</h5>
                                            </button>
                                        </div>
                                        <div data-parent="#accordion" id="collapseOne1" aria-labelledby="headingOne" class="collapse show">
                                            <div class="card-body"> 
											
											<marquee direction="up" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 3, 0);" scrollamount="5" > 
											  <ul class="nav nav-tabs tabdrop">
											  <?php if($birthdays != false){ 
									
										foreach($birthdays as $bday){
									
									?> <li id="nav" class="clearfix"><a data-width="600" data-height="420" href="<?php echo base_url().'client/group/bday_msg/'.$bday['mobile_no'] ?>" class="form-group">
										<div class="form-group"><img width="40" height="40" alt="User" src="<?php echo base_url(); ?>img/bday.png"> </div>
										<div class="form-group"><div class="mb-2 mr-2 badge badge-success" style="padding:.6em;"> 
										 <?php echo $bday['first_name'].$bday['last_name']; ?></div></br>
										 <div class="mb-2 mr-2 badge badge-warning" style="padding:.6em;"> 
										 <?php echo date("M - d", strtotime($bday['dob'])); ?></div>
										 
										</div>
									 </a></li>
									  <?php } } else { echo '</br><center><h5 class="card-title" style="text-transform:capitalize;">No Records Found</h5></center>'; } ?>
									</ul>
									</marquee>
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
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-confirm.js"></script>	
 
<script>

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
