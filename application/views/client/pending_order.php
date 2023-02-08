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
												<span>Pending Orders</span>
											</a>
										</li>
									</ul></div>
									</div> 
									<div class="tab-content">
									<div class="row" >
										<div class="col-md-12">
											<div class="main-card mb-3">
												<div class="col-md-12" >
												<div class="table-responsive">
													<?php  
														if($result != false) { ?><table class="table table-striped table-bordered">
													<thead>
													  <tr>
														<th width="58">Order #</th>
														<th width="58">Date</th>
														<th width="92">Amount</th>
														<th width="112">Online Charges</th>
														<th width="112">Amount Payable</th>
													  </tr>
													</thead>
													<tbody>
													<?php foreach($result as $row){
													if($row['amount'] > 500) {
														$tax = '5%';
															$fees = $row['amount'] * 0.05;
													} else {
														$tax = '10%';
														$fees = $row['amount'] * 0.10;
													}
													
													 ?>
													
													<tbody>
													<tr>
														<td> <?php echo $row['chart_id'].''.$row['patient_id']?></td>
														<td><?php echo date('d-m-Y',strtotime($row['ex_date'])); ?></td>
														<td><?php echo $total = $row['amount'] + $fees; ?></td>
														<td><?php echo $tax; ?></td>
														<td><?php  echo $row['amount']; ?></td>
													</tr>
													<?php
														} 
													?>
													<?php if($invoice != false){  foreach($invoice as $row) { ?>
															<?php if($row['amount'] > 500) {
																		$tax = '5%';
																			$value = intval($row['amount']) + ($row['amount'] * 0.05);
																	} else {
																		$tax = '10%';
																		$value = intval($row['amount']) + ($row['amount'] * 0.10);
																	} ?>
															<tr>
															<td><?php echo $row['bill_id']; ?></td>
															<td><?php echo $row['payment_date']  ?></td>
															<td><?php echo $value; ?></td>
															<td><?php echo 'Invoice';  ?></td>
															<td><?php echo $row['amount']; ?></td>
															</tr>
													<?php } } ?>
														
													</tbody>
													</table>
													<?Php } ?>
													</div>
												</div>
												<div class="table-responsive">
												<div class="col-md-12" ng-show="filteredItems1 > 0">    
													<div pagination="" max-size="maxSize" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
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
