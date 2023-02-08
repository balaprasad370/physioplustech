<!doctype html>
<html ng-app="myApp" ng-app lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title> Exercise Prescription - Physio Plus Tech</title>
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
                        <div class="row" ng-controller="customersCrtl">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="row">
									<div class="col-85" style="width:80%;">
                                    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
									  <li class="nav-item">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
									   <li class="nav-item">
											<a role="tab" class="nav-link Advance active show" href="#tab-content-2" id="tab-0" data-toggle="tab" aria-selected="false">
												<span>Exercise Charts List </span>
											</a>
										</li>
										<li class="nav-item active">
											<a role="tab" class="nav-link Invoice show" href="#tab-content-0" id="tab-1" data-toggle="tab" aria-selected="true">
												<span>Sent Excerices</span>
											</a>
										</li>
										
										
										<li class="nav-item last-child" style="float:right;"></li>
									</ul></div>
									<div class="col" style="float:right;"></br><div style="float:right;" ><a class="btn btn-warning" href="<?php echo base_url().'client/exercise/public_exercise' ?>" ><strong>Add New Exercise Chart</strong></a>
														&nbsp;&nbsp;&nbsp;</div>
									</div>
									
									</div>  
									<div class="tab-content">
									<div class="tab-pane tabs-animation fade" id="tab-content-0" role="tabpanel">
									   <div class="row" ng-controller="customersCrtl">
											<div class="col-md-12">
												<div class="main-card mb-3">
													<div class="col-md-12" >
													<div class="table-responsive">
														<table class="table table-striped table-bordered">
															<thead>
															<tr>
																<th class="text-center">Date</th>
																 
																<th class="text-center">Patient Name</th>
																 
																<th class="text-center">Email</th>
																<th class="text-center">Chart Name</th>
																 
																<th class="text-center">Payment Method</th>
																<th class="text-center">Action</th>
																 
															</tr>
															</thead>
															<tbody>
															<?php if($result != false){  ?>
															 <?php foreach($result as $row){ 
																 ?>
																 <?php
																$this->db->select('verifycode')->from('save_chart');
																$this->db->where('chard_no',$row['chart_no']);
																$this->db->where('chart_name',$row['chartname']);
																$query=$this->db->get();
																if($query->result_array() != false){
																   $verifycode=$query->row()->verifycode;
																} else { $verifycode =''; }  
																
																$this->db->select('patient_code,mobile_no')->from('tbl_patient_info')->where('patient_id',$row['patient_id']);
																$query=$this->db->get();
																if($query->result_array() != false){
																$code=$query->row()->patient_code;
																$mobile=$query->row()->mobile_no;
																} else { $code =''; }
															 ?>
															<tr>
															 <td class="text-center"><?php echo date('d-m-Y',strtotime($row['ex_date'])); ?></td>
																<td class="text-center"><?php echo $row['patient_name']?></td> 
																<td class="text-center"><?php echo $row['email'] ?></td>
																<td class="text-center text-muted"> 
																<div class="badge badge-pill badge-info"><?php echo $row['chartname']; ?></div>
																
																</td>
																<td class="text-center"><?php echo $row['pay'] ?></td>  
															   <td class="text-center"><a href="<?php echo 'https://web.whatsapp.com/send?phone=91'.$mobile.'&text=Dear '.$row['patient_name'].', This message is a reminder about the exercise plan prescribed by '.$this->session->userdata('clinic_name').' to you. Kindly adhere to the plan for better results. Kindly click the link below to access the exercise chart. We wish you good health and wellness from the team of '.$this->session->userdata('clinic_name').' '.base_url().'pages/default_pdf_verification/'.$this->session->userdata('client_id').'/'.$row['patient_id'].'/public-'.$verifycode; ?> " target="_blank" ><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success delete" data-toggle="tooltip" data-placement="top" title="Whatsapp" ng-click="send(data.start,data.mobile_no,data.staff_name)"><img src="<?php echo base_url().'img/whatsapp Logo.png' ?>" style="width:23px; height:23px;" > </img></button></a>
												</td>
															</tr>
															 <?php } ?>
															 <?php } else { echo '<tr><td class="text-center"  colspan="5">No More Records</td></tr>'; }  ?>
											
															</tbody>
														</table>
														 
														 <nav class="pagination-rounded" aria-label="Page navigation example" style="text-align:center;">
													<ul class="pagination" >
													  <?php foreach ($links as $link) { ?>
														<li>
															<?php echo $link; ?>
														</li>
														<?php } ?>
													 </ul>
												  </nav>
												  
										 
													</div>
													</div>
													<div class="col-md-12" ng-show="filteredItems > 0">    
														<div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
													</div>
												  </div>
											</div>
										</div>
									</div>
									
									<div class="tab-pane tabs-animation fade active show in" id="tab-content-2" role="tabpanel">
										<h5>&nbsp;&nbsp;&nbsp;&nbsp;Default Charts :</h5>
										<div class="row" ng-controller="customersCrtl2">
											<div class="col-md-12">
												<div class="main-card mb-3">
													<div class="col-md-12" >
													<div class="table-responsive">
													  <table class="table table-striped table-bordered">
															<thead>
															<tr>
															   <th class="text-center">Chart Name</th>
															   <th class="text-center">Action</th>
															</tr>
															</thead>
															<tbody>
															<?php if($default_chart != false){ 
															foreach ($default_chart as $list) {
																$this->db->limit(1);
																$this->db->order_by('chart_id','desc');
																$this->db->where('chard_no',$list['chard_no']);
																$this->db->select('img_description,verifycode,chard_no')->from('default_chart');
																$res = $this->db->get();
																$img = $res->row()->img_description;
																$verifycode = $res->row()->verifycode; 
																$chard_no = $res->row()->chard_no; 
																?>
															<tr id="">
																<td class="text-center">
																 
																<div class="badge badge-pill badge-info"><?php echo $list['chart_name']; ?></div>
																 
																</td>
															   
																
																<td class="text-center">
																  <a href="<?php echo base_url().'client/exercise/default_exportPdf/chartno/'.$list['chard_no'] ?>" target="_blank">
																  <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-alternate" data-toggle="tooltip" data-placement="top" title="Print"><i class="fa fa-print"></i></button>
																  </a>
																 <a href="<?php echo base_url().'client/exercise/default_savechart/'.$list['chard_no'].'/'.$list['chart_name'].'/'.$verifycode ?>">
																 <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="Share"><i class="fa fa-share"></i></button>
																 </a>
																
																</td>
															</tr>
															 <?php } ?>
															</tbody>
														</table>
														<?php } else { echo 'No Records Found'; }  ?>
														 </div>
														 </br>
														 <h5>&nbsp;&nbsp;Your Charts</h5>
														  <div class="table-responsive">
														   <table class="table table-striped table-bordered">
															<thead>
															<tr>
															   <th class="text-center">Chart Name</th>
																 <th class="text-center">Action</th>
															</tr>
															</thead>
															<tbody>
															<?php  echo $this->session->userdata('chart_name'); 
																if($chartlist != false){ 
																foreach ($chartlist as $list) {
																	$this->db->limit(1);
																	$this->db->order_by('chart_id','desc');
																	$this->db->where('client_id',$this->session->userdata('client_id'));
																	$this->db->where('chard_no',$list['chard_no']);
																	$this->db->select('img_description,verifycode')->from('save_chart');
																	$res = $this->db->get();
																	$img = $res->row()->img_description;
																	$verifycode = $res->row()->verifycode;
															?>
															<tr id="<?php echo $list['chard_no']; ?>">
																<td class="text-center">
																 
																<div class="badge badge-warning badge-pill badge-info"><?php echo $list['chart_name']; ?></div>
																 
																</td>
																 
																
																 <td class="text-center">
																 
																	<a href="<?php echo base_url().'client/exercise/public_edit/'.$list['chard_no'] ?>">
																  <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
																  </a>
																  
																  <a href="<?php echo base_url().'client/exercise/exportPdf/chartno/'.$list['chard_no'] ?>" target="_blank">
																  <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-alternate" data-toggle="tooltip" data-placement="top" title="Print"><i class="fa fa-print"></i></button>
																  </a>
																  
																  <a href="<?php echo base_url().'client/exercise/save_chart/'.$list['chard_no'].'/'.$list['chart_name'].'/'.$verifycode ?>">
																  <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="Share"><i class="fa fa-share"></i></button>
																  </a>
																  
																 <a class="delete" href="<?php echo '#'.$list['chard_no']; ?>">
																 
																<button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger confirm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"> </i></button>		
																</a>												
																</td>
															</tr>
															 <?php
																} ?>
																<?php } else { echo '<tr><td class="text-center"  colspan="3">No More Records</td></tr>'; }  ?>
															</tbody>
														</table>
														
														 <nav class="pagination-rounded" aria-label="Page navigation example" style="text-align:center;">
													<ul class="pagination" >
													  <?php foreach ($links as $link) { ?>
														<li>
															<?php echo $link; ?>
														</li>
														<?php } ?>
													 </ul>
												  </nav>
												</div>
												</div>
												<div class="col-md-12" ng-show="filteredItems > 0">    
														<div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
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

$(function(){
		$('.delete').click(function ()  {	
			 var patient_id = $(this).attr('href').split('#')[1];
			 var utl= '<?php echo base_url().'client/exercise/exercise_delete' ?>';
			swal({
			  title: "Are you sure?",
			  text: "You will be able to delete this exercise Record!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-danger',
			  confirmButtonText: 'Yes, delete it!',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: utl,
					data : {p_id:patient_id},
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{
						if(data.status == 'success') {
						  swal("Deleted!","Exercise chart has been deleted!", "success");
						}
						setTimeout(function(){ 
								window.location.reload();
						}, 1000);
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						setTimeout(function(){ 
								window.location.reload();
						}, 1000);
					}
				  });
			   
         });
		 return false;
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
