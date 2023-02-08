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
									   <li class="nav-item active">
											<a role="tab" class="nav-link active show" href="#tab-content-1" id="tab-1" data-toggle="tab" aria-selected="true">
												<span>My Passbook</span>
											</a>
										</li>
										<li class="nav-item">
											<a role="tab" class="nav-link show" href="<?php echo base_url().'client/dashboard/invite_earn' ?>" >  
												<span>Invite & Earn</span>
											</a>
										</li>
									</ul></div>
									<div class="col" style="float:right;"></br><div style="float:right;" ><a class="btn btn-shadow btn-warning" href="<?php echo base_url().'client/dashboard/add_balance' ?>" ><strong>Add Balance</strong></a>
														&nbsp;&nbsp;&nbsp;</div>
									</div>
									</div> 
									<div class="tab-content">
									<div class="tab-pane tabs-animation fade active show in" id="tab-content-1" role="tabpanel">
									<div class="row" >
										<div class="col-md-12">
											<div class="main-card mb-3">
												<div class="col-md-12" >
												<div class="table-responsive">
													<table class="table table-striped table-bordered">
													<thead>
													  <tr>
														<th width="58">Order #</th>
														<th width="58">Date</th>
														<th width="58">Name</th>
														<th width="58">Transactional Details / Reference</th>
														<th width="92">Amount</th>
													  </tr>
													</thead>
													<tbody>
													<?php if($result != false){ foreach($result as $row){  ?>														
														<tbody>
														<?php ?>
														<tr>
														<td> <?php echo 'OID'.$row['id']; ?></td>
														<td><?php echo date('d-m-Y',strtotime($row['date'])); ?></td>  
														<td> <?php echo $row['name']; ?></td>
														<td> <?php echo $row['ref_name']; ?></td>
														<td><?php echo $row['price']; ?></td>
														</tr>
													<?php } } ?>
													<?php if($invoice != false){  foreach($invoice as $row) { ?>
															<tr>
															<td><?php echo $row['bill_id']; ?></td>
															<td><?php echo $row['payment_date']  ?></td>
															<td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
															<td><?php echo 'Invoice';  ?></td>
															<td><?php echo $row['amount']; ?></td>
															</tr>
													<?php } } ?>
													<?php if($exercise != false){ foreach($exercise as $row){ 
														  $fees = $row['amount'] * 0.10;
														  $tax = $fees * 0.145; 
														 ?>
														
														<tbody>
														<?php  if($row['chartname'] == 'Appointment') { 
														$this->db->where('client_id',$this->session->userdata('client_id'));
														$this->db->where('gen_date',date('Y-m-d',strtotime($row['ex_date'])));
														$this->db->select('appointment_id,title')->from('tbl_appointments');
														$res = $this->db->get();
														$app_id = $res->row()->appointment_id;
														$title = $res->row()->title;
														?>
															<tr>
															<td> <?php echo $row['chart_id'].''.$app_id?></td>
															<td><?php echo date('d-m-Y',strtotime($row['ex_date'])); ?></td>
															<td><?php echo $title; ?></td>
															<td><?php echo 'Appointment'; ?></td>				
															<td><?php echo $row['amount']; ?></td>
															</tr>
													<?php } else { ?>
														<tr>
														<td> <?php echo $row['chart_id'].''.$row['patient_id']?></td>
														<td><?php echo date('d-m-Y',strtotime($row['ex_date'])); ?></td>
														<td><?php echo $row['patient_name']; ?></td>
														<td><?php echo 'Exercise chart -'.''.$row['chartname']; ?></td>				
														<td><?php echo $row['amount']; ?></td>
														</tr>
													<?php }  } } ?>	  												
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
