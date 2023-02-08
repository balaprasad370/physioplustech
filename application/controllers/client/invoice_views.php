<!doctype html>
<html ng-app="myApp" ng-app lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Financial Management - Physio Plus Tech</title>
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
									  <li class="nav-item active">
											<a role="tab" class="nav-link Invoice active show" href="#tab-content-0" id="tab-0" data-toggle="tab" aria-selected="true">
												<span>Invoice List</span>
											</a>
										</li>
										<li class="nav-item">
											<a role="tab" class="nav-link Expense show" href="#tab-content-1" id="tab-0" data-toggle="tab" aria-selected="false">
												<span>Expense List </span>
											</a>
										</li>
										<li class="nav-item">
											<a role="tab" class="nav-link Advance show" href="#tab-content-2" id="tab-0" data-toggle="tab" aria-selected="false">
												<span>Advance List </span>
											</a>
										</li>
										<li class="nav-item">
											<a role="tab" class="nav-link Inventory show" href="#tab-content-3" id="tab-0" data-toggle="tab" aria-selected="false">
												<span>Inventory List </span>
											</a>
										</li>
										<li class="nav-item last-child" style="float:right;"></li>
									</ul></div>
									<?Php $edit = explode(",",$this->session->userdata('edit'));
																	if(in_array("4",$edit) || $this->session->userdata('user_login')== false){
																?>
									<div class="inv col" style="float:right;"></br><div style="float:right;" ><a class="btn btn-shadow btn-warning" href="<?php echo base_url().'client/invoice/add' ?>" ><strong>Add New Invoice</strong></a>
														&nbsp;&nbsp;&nbsp;</div>
									</div>
									<div class="exp col" style="display:none; float:right;"></br><div style="float:right;" ><a class="btn btn-shadow btn-warning" href="<?php echo base_url().'client/bill/expanse' ?>" ><strong>Add New Expense</strong></a>
														&nbsp;&nbsp;&nbsp;</div>
									</div>
									<div class="adv col" style="display:none; float:right;"></br><div style="float:right;" ><a class="btn btn-shadow btn-warning" href="<?php echo base_url().'client/advance/add' ?>" ><strong>Add New Advance</strong></a>
														&nbsp;&nbsp;&nbsp;</div>
									</div>
									<div class="inven col" style="display:none; float:right;"></br><div style="float:right;" ><a class="btn btn-shadow btn-warning" href="<?php echo base_url().'client/inventory/index' ?>" ><strong>Add New Product</strong></a>
														&nbsp;&nbsp;&nbsp;</div>
									</div>
																	<?php } ?>
									</div>  
									<div class="tab-content">
									<div class="tab-pane tabs-animation fade active show in" id="tab-content-0" role="tabpanel">
									   <div class="row" ng-controller="customersCrtl">
											<div class="col-md-12">
												<div class="main-card mb-3">
													<div class="col-md-12" >
													<div class="table-responsive">
														<table class="table table-striped table-bordered">
														<thead>
														  <tr>
															<th class="text-center">Date</th>
															<th class="text-center">Bill no.</th>
															<th class="text-center">Patient name</th>
															<th class="text-center">Bill amount (INR)</th>
															<th class="text-center">Paid amount (INR)</th>
															<th class="text-center">Due amount (INR)</th>
															<th class="text-center">Payment mode</th>
															<th class="text-center">Status {{date}}</th>
															<th class="text-center">Action</th>
														 </tr>
														</thead>
														<tbody>
														<tr><td colspan="9"> <input style="width:100%;" type="text" ng-model="search" ng-change="filter()" placeholder="Search All Fields" class="form-control" /> </td>
														</tr>
															<tr ng-if="data != 0" ng-show="filteredItems > 0" ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit" id="data.bill_id">
																<td style="width:120px;" class="text-center"><i class="fa fa-business-time"></i>&nbsp;&nbsp;{{data.treatment_date}}</td>
																<td class="text-center text-muted"> 
																<div class="badge badge-pill badge-info">{{data.bill_no}}</div>
																</td>
																<td class="text-center">
																<a href="<?php echo base_url().'client/patient/view/' ?>{{data.patient_id}}"><img src="<?php echo base_url().'img/pngwing.png' ?>" style="width:30px; height:30px;" ></img>{{data.first_name}} {{data.last_name}}</a>
																</td>
																<td class="text-center">{{data.net_amt}}</td>
																<td class="text-center">{{data.paid_amt}}</td>
																<td class="text-center">{{data.net_amt - data.paid_amt}}.00</br>
																<a ng-if="data.bill_status == 0" class="badge badge-pill badge-secondary" href="<?php echo base_url().'client/invoice/invoice_status_update/'; ?>{{data.bill_id}}/{{data.patient_id}}"><i class="fa fa-plus"></i> Add payment</a></td>
																<td class="text-center">{{data.payment_mode}}</td>
																<td class="text-center">  
																	<div ng-if="data.bill_status == 1" class="badge badge-pill badge-alternate" style="padding:.5em;">Paid </div>
																	<div ng-if="data.bill_status == 0"><div ng-show="(data.due_date < date1) == true" class="badge badge-pill badge-danger" style="padding:.5em;">Overdue</div>
																	<div  ng-show="(data.due_date < date1) != true" class="badge badge-pill badge-warning" style="padding:.5em;">Pending</div>
																   </div>
																</td>
																
																<td class="text-center">
																   <a href="<?php echo base_url().'client/invoice/invoice_view_print/'; ?>{{data.bill_id}}" target="_blank"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-alternate" data-toggle="tooltip" data-placement="top" title="Print"><i class="fa fa-print"></i></button></a>
																   <?Php $edit = explode(",",$this->session->userdata('edit'));
																	if(in_array("4",$edit) || $this->session->userdata('user_login')== false){
																   ?>
																   <a ng-if="data.bill_status == 0" class="edit" href="<?php echo base_url().'client/invoice/edit/' ?>{{data.bill_id}}"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
																	<?php } ?>
																	 <a href="<?php echo base_url().'client/invoice/invoiceSendPatientEmail/' ?>{{data.bill_id}}/{{data.client_id}}"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Email"><img src="<?php echo base_url().'img/mail.png' ?>" style="width:15px; height:15px;"></img></button></a>
																   <a ng-if="data.bill_status == 1" href="https://web.whatsapp.com/send?phone=91{{data.mobile_no}}&text=Dear {{data.first_name}} {{data.last_name}}, Your invoice for the service by <?php echo $this->session->userdata('clinic_name'); ?> has been sent to you, kindly click the below link to access your Invoice. We wish you good health and wellness from the team of <?php echo $this->session->userdata('clinic_name').' '.base_url().'client/emailviews/invoices/'; ?>{{data.bill_id}}/{{data.client_id}}" target="_blank" ><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="Whatsapp"><img src="<?php echo base_url().'img/whatsapp Logo.png' ?>" style="width:20px; height:20px;"></img></button></a>
																   <a ng-if="data.bill_status == 0" href="https://web.whatsapp.com/send?phone=91{{data.mobile_no}}&text=Dear {{data.first_name}} {{data.last_name}}, Your invoice from <?php echo $this->session->userdata('clinic_name'); ?>, stays overdue, kindly make the due payment, and help us serve you and all our clients with high motivation.  We wish you good health and wellness from the team of  <?php echo $this->session->userdata('clinic_name').' '.base_url().'client/emailviews/invoices/'; ?>{{data.bill_id}}/{{data.client_id}}" target="_blank" ><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="Whatsapp"><img src="<?php echo base_url().'img/whatsapp Logo.png' ?>" style="width:20px; height:20px;"></img></button></a>
																  <?Php $delete = explode(",",$this->session->userdata('delete'));
																	if(in_array("4",$delete) || $this->session->userdata('user_login')== false){
																   ?>
																  <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete" ng-click="delete(data.bill_id,data.first_name)"><i class="fa fa-trash-alt"> </i></button>
																	<?php } ?>
																</td>
																
															 </tr>
															 
															  <tr ng-if="filteredItems < 10">
															 <td colspan="11"><center><h6> No More Records </h6></center></td>
															 </tr>
														</tbody>
														</table>
														</div>
													</div>
													<div class="col-md-12" ng-show="filteredItems > 0">    
														<div pagination="" max-size="maxSize" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
													</div>
												  </div>
											</div>
										</div>
									</div>
									<div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
										<div class="row" ng-controller="customersCrtl1">
												<div class="col-md-12">
													<div class="main-card mb-3">
														<div class="col-md-12" >
														<div class="table-responsive">
															<table class="table table-striped table-bordered">
															<thead>
															  <tr>
																<th class="text-center">Date</th>
																<th class="text-center">Bill No.</th>
																<th class="text-center">Vendor</th>
																<th class="text-center">Subtotal</th>
																<th class="text-center">Tax</th>
																<th class="text-center">Total Amount</th>
																<th class="text-center">Action</th>
															  </tr>
															</thead>
															<tbody>
															<tr><td colspan="9"> <input style="width:100%;" type="text" ng-model="search" ng-change="filter1()" placeholder="Search All Fields" class="form-control" /> </td>
															</tr>
																<tr ng-if="data != 0" ng-show="filteredItems > 0" ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit" id="data.bill_id">
																	<td class="text-center"><i class="fa fa-business-time"></i>&nbsp;&nbsp;{{data.bill_date}}</td>
																	<td class="text-center text-muted"> 
																	<div class="badge badge-pill badge-info">EXP-{{data.bill_no}}</div>
																	</td>
																	<td class="text-center">{{data.ventor}}</td>
																	<td class="text-center">{{data.amount}}.00</td>
																	<td class="text-center">{{data.tax_perc}}</td>
																	<td class="text-center">{{data.total_amt}}.00</td>
																	<td class="text-center">
																	  <a href="<?php echo base_url().'client/bill/expense_print/'; ?>{{data.bill_no}}" target="_blank">
																	  <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-alternate" data-toggle="tooltip" data-placement="top" title="Print"><i class="fa fa-print"></i></button>
																	  </a>
																	  <?Php $edit = explode(",",$this->session->userdata('edit'));
																	if(in_array("4",$edit) || $this->session->userdata('user_login')== false){
																   ?>
																	 <a href="<?php echo base_url().'client/bill/expanse_edit/'; ?>{{data.bill_no}}">
																	 <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
																	</a><?php } ?>
																	<?Php $delete = explode(",",$this->session->userdata('delete'));
																	if(in_array("4",$delete) || $this->session->userdata('user_login')== false){
																   ?><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" ng-click="delete1(data.bill_no,data.ventor)" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"> </i></button>												 
																	<?php } ?></td>
																	</tr>
																  <tr ng-if="filteredItems < 10">
																 <td colspan="11"><center><h6> No More Records </h6></center></td>
																 </tr>
															</tbody>
															</table>
															</div>
														</div>
														<div class="col-md-12" ng-show="filteredItems > 0">    
															<div pagination="" max-size="maxSize" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
														</div></br></br>
													</div>
												</div>
											</div>
                                    </div>
									<div class="tab-pane tabs-animation fade" id="tab-content-2" role="tabpanel">
										<div class="row" ng-controller="customersCrtl2">
											<div class="col-md-12">
												<div class="main-card mb-3">
													<div class="col-md-12" >
													<div class="table-responsive">
														<table class="table table-striped table-bordered">
														<thead>
														   <tr>
																<th class="text-center">Date</th>
																<th class="text-center">Bill No</th>
																 <th class="text-center">Name</th>
																<th class="text-center">Amount (INR)</th>
																<th class="text-center">Action</th>
														   </tr>
														</thead>
														<tbody>
														<tr><td colspan="9"> <input style="width:100%;" type="text" ng-model="search" ng-change="filter2()" placeholder="Search All Fields" class="form-control" /> </td>
														</tr>
															<tr ng-if="data != 0" ng-show="filteredItems > 0" ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit" id="data.bill_id">
																<td class="text-center"><i class="fa fa-business-time"></i>&nbsp;&nbsp; {{data.advance_date}}</td>
																<td class="text-center text-muted"> 
																<div class="badge badge-pill badge-info">{{data.bill_no}}</div>
																</td>
																<td class="text-center">{{data.first_name}} {{data.last_name}}</td>
																<td class="text-center">{{data.advance_amount}}</td>
																 <td class="text-center">
																 <a href="<?php echo base_url().'client/advance/view_advance/'; ?>{{data.advance_id}}" target="blank"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-alternate" data-toggle="tooltip" data-placement="top" title="Print"><i class="fa fa-print"></i></button></a>
																 <?Php $edit = explode(",",$this->session->userdata('edit'));
																	if(in_array("4",$edit) || $this->session->userdata('user_login')== false){
																   ?><a class="edit" href="<?php echo base_url().'client/advance/edit/'; ?>{{data.advance_id}}"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
																	<?Php } $delete = explode(",",$this->session->userdata('delete'));
																	if(in_array("4",$delete) || $this->session->userdata('user_login')== false){
																?>
																 <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete" ng-click="delete2(data.advance_id,data.first_name)"><i class="fa fa-trash-alt"> </i></button>
																	<?php } ?>
																</td>
																</tr>
																
															  <tr ng-show="filteredItems < 10">
															 <td colspan="11"><center><h6> No More Records </h6></center></td>
															 </tr>
														</tbody>
														</table>
														</div>
													</div>
													<div class="col-md-12" ng-show="filteredItems > 0">    
														<div pagination="" max-size="maxSize" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
													</div>
												  </div>
											</div>
										</div>
                                    </div>
									<div class="tab-pane tabs-animation fade" id="tab-content-3" role="tabpanel">
										<div class="table-responsive">
										<div class="col-md-12" >
										<table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="text-center">No</th>
												 <th class="text-center">Product Code</th>
												 <th class="text-center">Image</th>
												 <th class="text-center">Product Name</th>
												 <th class="text-center">Product Type</th>
												 <th class="text-center">Available</th>
												 <th class="text-center">Action</th>
                                                 
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php $cnt=1; ?>
											<?php if($inventory != false){ 
											$amount = 0;
											$quantity = 0;
											foreach ($inventory as $row) {
												$CI =& get_instance();
												$CI->load->model(array('inventory_model'));	
												$info = $CI->inventory_model->inventory_detail($row['inventory_id']);
												$this->db->where('inventory_id',$row['inventory_id']);
												$this->db->select('color_code')->from('tbl_inventory_color');
												$res = $this->db->get();
												foreach($res->result_array() as $row1){
													$value = $row1['color_code'].'/'.$row['inventory_id'];
													$this->db->where('item_id',$value);
													$this->db->select('item_amount,item_quantity')->from('tbl_invoice_detail');
													$res = $this->db->get();
													if($res->result_array() != false) {
														$amount += $res->row()->item_amount;
														$quantity = $res->row()->item_quantity;
													} else {
														
													}
												}
											?>
                                            <tr>
                                                <td class="text-center text-muted"> 
												<?php echo $cnt; $cnt++;?>
												
												</td>
                                                
                                                 <td class="text-center"> <div class="badge badge-pill badge-info"><a href="<?php echo base_url().'client/inventory/inventory_edit/'.$row['inventory_id']?>"><?php echo $info['code']; ?></a></div> </td>
												 
												<td class="text-center"><?php if($info['pro_img'] != false){ ?>
												<img class="resize" src="<?php echo base_url().'uploads/inventory/'.$info['pro_img']?>" height="100px" width="90px">
												<?php }else  {?>
												<img class="resize" src="https://www.physioplustech.in/images/inventory-icon-png-8.png" height="100px" width="90px">
											   <?php } ?></td>
												<td class="text-center"><?php echo $info['pro_name'] ?></td>
											 
                                                <td class="text-center">
												 <?php echo $info['pro_category']?>
                                                </td>
												
												<td class="text-center">
												 <?php echo ($row['stock'] - $quantity); ?>
                                                </td>
												
												
												
												<td class="text-center">
												<?Php $delete = explode(",",$this->session->userdata('delete'));
																	if(in_array("4",$delete) || $this->session->userdata('user_login')== false){
																?>
												<a href="<?php echo '#'.$row['inventory_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"> </i></button></a>
																	<?Php } $edit = explode(",",$this->session->userdata('edit'));
																	if(in_array("4",$edit) || $this->session->userdata('user_login')== false){
																?>
																<a href="<?php echo base_url().'client/inventory/inventory_view/'.$row['inventory_id']?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit Quantity & Price"><i class="fa fa-edit"> </i></button></a>  
																<a href="<?php echo base_url().'client/inventory/stock_value/'.$row['inventory_id']?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="Stock Value"><i class="fa fa-eye"> </i></button></a>
												<?php } ?></td>
                                            </tr>
                                             <?php } ?>
											 <?php } else { echo '<tr><td class="text-center"  colspan="9">No More Records</td></tr>'; }  ?>
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
             </div>
<script type="text/javascript" src="<?php echo base_url()?>my_assets/assets/scripts/main.js"></script></body>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/moment.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
 <script src="https://select2.github.io/select2-bootstrap-theme/js/bootstrap.min.js"></script>
 <script src="https://select2.github.io/select2-bootstrap-theme/js/anchor.min.js"></script>
 <script src="<?php echo base_url() ?>assets/search-js/angular.min.js"></script>
<script src="<?php echo base_url() ?>assets/search-js/ui-bootstrap-tpls-0.10.0.min.js"></script>
<script>
var app = angular.module('myApp', ['ui.bootstrap']);

app.filter('startFrom', function() {
    return function(input, start) {
        if(input) {
            start = +start; //parse to int
            return input.slice(start);
        }
        return [];
    }
});
app.controller('customersCrtl', function ($scope, $http, $timeout) {
    $http.get('<?php echo base_url().'client/invoice/getinvoice'; ?>').success(function(data){
        $scope.list = data;
		$scope.date1 = '<?php echo date('Y-m-d'); ?>'; 
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 10; //max no of items to display in a page
         $scope.maxSize = 10;
		 $scope.filteredItems = $scope.list.length; //Initially for no filter  
        $scope.totalItems = $scope.list.length;
    });
    $scope.setPage = function(pageNo) {
        $scope.currentPage = pageNo;
    };
    $scope.filter = function() {
        $timeout(function() { 
            $scope.filteredItems = $scope.filtered.length;
        }, 10);
    };
	$scope.delete = function($bill_id,$first_name) {
		var utl= '<?php echo base_url().'client/invoice/delete' ?>';
		swal({
          title: "Are you sure?",
          text: "You will be able to delete this "+$first_name+" Appointment!",
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
				data : {p_id:$bill_id},
				dataType: 'json', 
				success:function(data, textStatus, jqXHR,form) 
				{
					if(data.status == 'success') {
					  swal("Deleted!", $first_name + " Bill has been deleted!", "success");
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
	};
    $scope.sort_by = function(predicate) {  
        $scope.predicate = predicate;
        $scope.reverse = !$scope.reverse;
    };
});
app.controller('customersCrtl1', function ($scope, $http, $timeout) {
    $http.get('<?php echo base_url().'client/bill/getexpense'; ?>').success(function(data){
        //$scope.list = data;
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 10; //max no of items to display in a page
         $scope.maxSize = 10;
		$scope.filteredItems = $scope.list.length; //Initially for no filter  
        $scope.totalItems = $scope.list.length;
    });
    $scope.setPage = function(pageNo) {
        $scope.currentPage = pageNo;
    };
    $scope.filter1 = function() {
        $timeout(function() { 
            $scope.filteredItems = $scope.filtered.length;
        }, 10);
    };
	$scope.delete1 = function($bill_no,$ventor) {
		var utl= '<?php echo base_url().'client/bill/delete' ?>';
		swal({
          title: "Are you sure?",
          text: "You will be able to delete this "+ $ventor +" Expense!",
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
				data : {p_id:$bill_no},
				dataType: 'json', 
				success:function(data, textStatus, jqXHR,form) 
				{
					if(data.status == 'success') {
					  swal("Deleted!", $ventor +" Expense Records has been deleted!", "success");
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
	};
    $scope.sort_by = function(predicate) {  
        $scope.predicate = predicate;
        $scope.reverse = !$scope.reverse;
    };
});
app.controller('customersCrtl2', function ($scope, $http, $timeout) {
    $http.get('<?php echo base_url().'client/bill/getadvanse'; ?>').success(function(data){
    	//console.log('Data:::::::'+data);
       // $scope.list = data;
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 10; //max no of items to display in a page
         $scope.maxSize = 10;
		 $scope.filteredItems = $scope.list.length; //Initially for no filter  
        $scope.totalItems = $scope.list.length;
    });
    $scope.setPage = function(pageNo) {
        $scope.currentPage = pageNo;
    };
    $scope.filter2 = function() {
        $timeout(function() { 
            $scope.filteredItems = $scope.filtered.length;
        }, 10);
    };
	$scope.delete2 = function($advance_id,$first_name) {
		var utl= '<?php echo base_url().'client/advance/delete' ?>';
		swal({
          title: "Are you sure?",
          text: "You will be able to delete this "+ $first_name +" Advance Record!",
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
				data : {p_id:$advance_id},
				dataType: 'json', 
				success:function(data, textStatus, jqXHR,form) 
				{
					if(data.status == 'success') {
					  swal("Deleted!", $first_name + " Advance Records has been deleted!", "success");
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
	};
    $scope.sort_by = function(predicate) {  
        $scope.predicate = predicate;
        $scope.reverse = !$scope.reverse;
    };
});
$(document).ready(function() {
	$('.Invoice').click(function(){
		$('.inv').show();
		$('.exp').hide();
		$('.adv').hide();
		$('.inven').hide();
	});
	$('.Expense').click(function(){
		$('.inv').hide();
		$('.exp').show();
		$('.adv').hide();
		$('.inven').hide();
	});
	$('.Advance').click(function(){
		$('.inv').hide();
		$('.exp').hide();
		$('.adv').show();
		$('.inven').hide();
	});
	$('.Inventory').click(function(){
		$('.inv').hide();
		$('.exp').hide();
		$('.adv').hide();
		$('.inven').show();  
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
