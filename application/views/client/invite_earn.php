<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"    />
    <meta name="msapplication-tap-highlight" content="no">
	<script src="<?php echo base_url() ?>assets/sweet-alert/sweetalert.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/sweet-alert/sweetalert.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
    <link href="<?php echo base_url()?>my_assets/main.css" rel="stylesheet">
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
                         
				<?php include("sidebar.php");?>
             <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="tabs-animation">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="row">
									<div class="col-85" style="width:80%;">
                                    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
									   <li class="nav-item">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									   </li>
									   <li class="nav-item">
											<a role="tab" class="nav-link  show" href="<?php echo base_url().'client/dashboard/mypassbook' ?>" >
												<span>My Passbook</span>
											</a>
										</li>
										<li class="nav-item active">
											<a role="tab" class="nav-link active show" href="#tab-content-0" id="tab-0" data-toggle="tab" aria-selected="false">
												<span>Invite & Earn</span>
											</a>
										</li>
									</ul></div>
									<div class="col" style="float:right;"></br><div style="float:right;" ><a class="btn btn-shadow btn-warning" href="<?php echo base_url().'client/dashboard/add_balance' ?>" ><strong>Add Balance</strong></a>
														&nbsp;&nbsp;&nbsp;</div>
									</div>
									</div> 
									<div class="tab-content">
									<div class="tab-pane tabs-animation fade active show in" id="tab-content-0" role="tabpanel">  
									<center><h1><strong>Invite </strong> &  Earn</h1></br><div class="dis-coupon-block ">
											<p>
												Refer Your Reference Code  <span style="color:#6f42c1;" ><strong><?php echo 'CRC'.$this->session->userdata('client_id').''.ucfirst(substr($this->session->userdata('firstname'),0,1)); ?></strong></span> to your friend and Earn Rs.1000 in your wallet when he makes the Annual subscription!!
											</p>
											<!--<img style="width:320px; height:280px; border: dotted 1px #6f42c1;"  src="<?php echo base_url() ?>img/demo/Group%202102@2x.png" alt="1">-->
										</div></center> </br></br> 
									
									<div class="row" >
										<div class="col-md-12">
											<div class="main-card mb-3"> 
											<form method="post" action="<?php echo base_url().'client/dashboard/invite_friends' ?>" >
											<center><div style="width:90%;" class="alert alert-info fade show" id="add_treatment">
														<div class="row" >		<input type="hidden" name="client_id" value="<?php echo $this->session->userdata('client_id'); ?>" >
												
												<div class="col-md-3" style="align:center;"></br><input type="text" style="width:200px;" required name="name" placeholder="Full Name" id="name"></div>
												<div class="col-md-3"></br><input type="text" name="mobile" placeholder="Mobile" required style="width:200px;" id="mobile"></div>
												<div class="col-md-3"></br><input type="text" name="email" placeholder="Email" required style="width:200px;" id="email"></div>
												<div class="col-md-3"></br><button type="submit" class="btn btn-info">Invite</button></div>
											</form></div></div></center></br>
												<div class="col-md-12" >
												<div class="table-responsive">
													<table class="table table-striped table-bordered">
													<thead>
													  <tr>
														<th width="58"><center>Name</center></th>
														<th width="58"><center>Mobile No</center></th>
														<th width="92"><center>Email</center></th>
														<th width="58"><center>Status</center></th>
														
													  </tr>
													</thead>
													<tbody>
													<?php if($i_friends != false) { foreach($i_friends as $row){ 
													    $this->db->where('email',$row['email']);
													    $this->db->select('plan')->from('tbl_client');
														$res = $this->db->get();
														if($res->result_array() != false){
														$v = $res->row()->plan;
														} else {
															$v =  '';
														}
													?>														
														<tbody>
														<?php ?>
														<tr>
														<td><center> <?php echo $row['name']; ?></center></td>
														<td><center> <?php echo $row['mobile']; ?></center></td>
														<td><center><?php echo $row['email']; ?></center></td>
														<td><center>
														<?php if($v == '') { ?>  
														<div class="mb-3 progress">
															<div class="progress-bar bg-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">Invited</div>
															<div class="progress" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">Registered</div>
															<div class="progress" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">Subscribed</div>
															<div class="progress" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">Redeemed</div>
														</div><?php } if($v == 0){ ?>
															<div class="mb-3 progress">
																<div class="progress-bar bg-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">Invited</div>
																<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">Registered</div>
																<div class="progress" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">Subscribed</div>
																<div class="progress" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">Redeemed</div>
															</div><?Php } if($v > 0){  ?>	
															<div class="mb-3 progress">
																<div class="progress-bar bg-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">Invited</div>
																<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">Registered</div>
																<div class="progress-bar bg-danger" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">Subscribed</div>
																<div class="progress" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">Redeemed</div>
															</div><?php } ?>
														
													    </center></td>
														</tr>
													<?php } } else {  ?>
													<tr><td colspan="4"><center>No Records Found</center></td></tr>
													<?php } ?>
														
													</tbody>
													</table>
													</div>
												</div>
												<div class="table-responsive">
												<div class="col-md-12" ng-show="filteredItems1 > 0">    
													<div pagination="" max-size="maxSize" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
												</div>
												</div>
											  </div>
										</div></br>
									</div>
									</div>
									
                                </div>
                            </div>
                        </div>
                     <div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Patient Has Been Added Successfully</div></div></div>
    <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Patient Has Not Been Added Successfully</div></div></div>
    
                         
                    </div>
                </div>
                    </div>
					
<script type="text/javascript" src="<?php echo base_url()?>my_assets/assets/scripts/main.js"></script></body>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/moment.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
 <script src="https://select2.github.io/select2-bootstrap-theme/js/bootstrap.min.js"></script>
 <script src="https://select2.github.io/select2-bootstrap-theme/js/anchor.min.js"></script>
 <script src="<?php echo base_url() ?>assets/search-js/angular.min.js"></script>
<script src="<?php echo base_url() ?>assets/search-js/ui-bootstrap-tpls-0.10.0.min.js"></script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
$(document).ready(function(){
$('form').on('submit', function (event) {
			 event.preventDefault();
			 var $form = $(this);
			 var val = $('input[name=category]:checked', '#basicvalidations').val();
			 var value= $('.mobile_val').val();
			 var  formID = $(this).attr("id");
			 var  formURL = $(this).attr("action");
			 $.ajax({
				type: 'post',
				url: $(this).attr('action'),
				data:$(this).serialize(),
				success:function(data, textStatus, jqXHR,form) 
				{
					setTimeout(function(){
						$('#toast-container').show();							
						window.location.reload();
					}, 1000);
					 
				},
				error: function(jqXHR, textStatus, errorThrown) 
				{
					setTimeout(function(){
						$('#toast-container1').show();							
						window.location.reload();
					}, 1000);
				}
			  });
			
				  
	}); 
	}); 

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
