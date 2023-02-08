<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="description" content="Easily create beautiful form multi step wizards!">
    <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <link href="<?php echo base_url()?>asset_list/main.css" rel="stylesheet">
    <script src="<?php echo base_url() ?>assets/sweet-alert/sweetalert.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/sweet-alert/sweetalert.css">
    <link href="<?php echo base_url(); ?>nist_css/rateit.css" rel="stylesheet" type="text/css">
	
 <style>
 .rating, label, th, .td{
	font-weight:bold;
	color:#3f6ad8;
}
.dropdown-item{
	 
}
 </style>
 <style>
/* #signature {
    min-width:auto !important;
    min-height: auto !important;
  } */
  
#signature {
  width:auto;
  box-shadow: 0 0 5px 1px #ddd inset;
  border:dashed 2px #53777A;
  border: dashed 1px #53777A;
  margin:0;
  text-align:bottom;
  min-height:180px;
  min-width:200px;
  transition:.2s;
}
#signature_capture {
  width:100%; 
  height:1em; 

}
.jSignature{
	min-height:250px;
    min-width:250px;
}
</style>	
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
      
            <div class="app-main__outer">
                <div class="app-main__inner p-0">
                    <div class="app-inner-layout chat-layout">
        
                        <div class="app-inner-layout__header text-white bg-premium-dark">
                            <div class="app-page-title">
                                <div class="page-title-wrapper">
                                    <div class="page-title-heading">
                                        
                                        <div style="text-align:center;">Physio Plus Tech
                                            <div class="page-title-subheading"> </div>
                                        </div>
                                    </div>
									<div class="page-title-actions">
                                         
                                        <a class="btn btn-pill btn-wide btn-alternate" href="<?php echo base_url()?>nist/dashboard/logout">Logout</a>
                                    </div>
                                     
                                </div>
                            </div>
                        </div>
                        <div class="app-inner-layout__wrapper row-fluid no-gutters">
                           <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="row">
									<div class="col-85" style="width:80%;">
                                    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
									   <li class="nav-item">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									   </li>
									   <li class="nav-item active">
											<a role="tab" class="nav-link active show" href="#tab-content-0" id="tab-0" data-toggle="tab" aria-selected="false">
												<span>Invite & Earn</span>
											</a>
										</li>
									</ul></div>
									
									</div> 
									<div class="tab-content">
									<div class="tab-pane tabs-animation fade active show in" id="tab-content-0" role="tabpanel">  
									<center><h1><strong>Invite </strong> &  Earn</h1></br><div class="dis-coupon-block ">
											<p>
												Refer Your Reference Code  <span style="color:#6f42c1;" ><strong><?php echo 'CRC'.$client_id.''.ucfirst(substr($name,0,1)); ?></strong></span> to your friend and Earn Rs.1000 in your wallet when he makes the Annual subscription!!
											</p>
											<!--<img style="width:320px; height:280px; border: dotted 1px #6f42c1;"  src="<?php echo base_url() ?>img/demo/Group%202102@2x.png" alt="1">-->
										</div></center> </br></br> 
									
									<div class="row" >
										<div class="col-md-12">
											<div class="main-card mb-3"> 
											<form method="post" action="<?php echo base_url().'client/dashboard/invite_friends' ?>" >
											<center><div style="width:90%;" class="alert alert-info fade show" id="add_treatment">
														<div class="row" >
														<input type="hidden" name="client_id" value="<?php echo $client_id; ?>" >
												<div class="col-md-3" style="align:center;"></br><input type="text" style="width:200px;" name="name" placeholder="Full Name" id="name"></div>
												<div class="col-md-3"></br><input type="text" name="mobile" placeholder="Mobile" style="width:200px;" id="mobile"></div>
												<div class="col-md-3"></br><input type="text" name="email" placeholder="Email" style="width:200px;" id="email"></div>
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
																<div class="progress-bar bg-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">Registered</div>
																<div class="progress" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">Subscribed</div>
																<div class="progress" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">Redeemed</div>
															</div><?Php } if($v > 0){  ?>	
															<div class="mb-3 progress">
																<div class="progress-bar bg-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">Invited</div>
																<div class="progress-bar bg-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">Registered</div>
																<div class="progress-bar bg-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">Subscribed</div>
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
                        </div>
                    </div>
                </div> </div>
    </div>
</div>


	<div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Friends Details Has Been Added Successfully</div></div></div>
    <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Friends Details Has Not Been Added Successfully</div></div></div>
	
	
	
	
	
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
<script src='https://cdn.rawgit.com/willowsystems/jSignature/master/libs/jSignature.min.js'></script>
<script type="text/javascript" src="<?php echo base_url(); ?>nist_css/jquery.rateit.js" ></script>

<script>
 $(document).ready(function() {
  $('form').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var button = $('#save');
		 button.prop('disabled',true);
		 $('.btn-primary').hide();
		$.ajax({
            type: 'post',
            url: formURL,
            data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				$('#toast-container').show();
				setTimeout(function(){ 
				window.location.reload();
				}, 1000);
				 
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$('#toast-container1').delay(5000).fadeOut(400);
				setTimeout(function(){ 
			    window.location.reload();
				}, 1000); 
			}
      }); 
		}
		else{
			
		}
		
});  
});  



	
	
	</script>
 </body>
</html>
