<!doctype html>
<html ng-app="myApp" ng-app lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title> Staff & User - Physio Plus Tech</title>
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
											<a role="tab" class="nav-link staff_list active show" href="#tab-content-0" id="tab-1" data-toggle="tab" aria-selected="true">
												<span>Staff List</span>
											</a>
										</li>
										<li class="nav-item">
											<a role="tab" class="nav-link user_list show" href="#tab-content-1" id="tab-0" data-toggle="tab" aria-selected="false">
												<span>User List </span>
											</a>
										</li>
										
										<li class="nav-item last-child" style="float:right;"></li>
									</ul></div>
									<?Php $create = explode(",",$this->session->userdata('create'));
																	if(in_array("3",$create) || $this->session->userdata('user_login')== false){
																?>
									<div class="staff col" style="float:right;"></br><div style="float:right;" ><a class="btn btn-shadow btn-warning" href="<?php echo base_url().'client/staff/add' ?>" ><strong>Add New Staff</strong></a>
														&nbsp;&nbsp;&nbsp;</div>
																	</div> <?PHP } ?>
									<?Php if($this->session->userdata('user_login')== false){
																?>
									<div class="user col" style="display:none; float:right;"></br><div style="float:right;" ><a class="btn btn-shadow btn-warning" href="<?php echo base_url().'client/user/add' ?>" ><strong>Add New User</strong></a>
														&nbsp;&nbsp;&nbsp;</div><?PHP } ?>
									</div>
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
															<!--<th class="text-center">Joining Date</th>-->
															<th class="text-center">Staff Id</th>
															<th class="text-center">Name</th>
															<th class="text-center">Designation</th>
															<th class="text-center">Mobile No</th>
															<th class="text-center">Email</th>
															<th class="text-center">Photo</th>
															<th class="text-center">Action</th>
														  </tr>
														</thead>
														<tbody>
														<tr><td colspan="9"> <input style="width:100%;" type="text" ng-model="search" ng-change="filter()" placeholder="Search All Fields" class="form-control" /> </td>
														</tr>
															<tr ng-if="data != 0" ng-show="filteredItems > 0" ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit" id="data.bill_id">
																<!--<td class="text-center"><i class="fa fa-business-time"></i>&nbsp;&nbsp;{{data.reg_date}}</td>-->
																<td class="text-center text-muted"> 
																<a href="<?php echo base_url().'client/staff/edit/'; ?>{{data.staff_id}}"><div class="badge badge-pill badge-info">{{data.staff_code}}</div></a>
																</td>
																<td class="text-center">{{data.first_name}}</td>
																<td class="text-center">{{data.designation_name}}</td>
																<td class="text-center">{{data.mobile_no}}</td>
																<td class="text-center">{{data.email}}</td>
																<td class="text-center"><span ng-if="data.staff_img != null"><img src="<?=base_url().'uploads/staff/'?>{{data.staff_img}}" class="img-responsive" width="80" height="80"></span></td>
																<td style="text-align: center; vertical-align: middle">
																<a class="edit" href="<?php echo base_url().'client/staff/edit_time/'; ?>{{data.staff_id}}"><button type="submit" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="Working Time"><i class="fa fa-check-circle"></i> </button></a>
																<?php if(($this->session->userdata('client_login')== true) && ($this->session->userdata('user_login')== false)  ){  ?>
																<a class="edit" href="<?php echo base_url().'client/staff/edit/'; ?>{{data.staff_id}}"><button type="submit" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
																<button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" ng-click="delete(data.staff_id,data.first_name)" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"></i> </button>
																<?php } $getview = explode(",",$this->session->userdata('edit'));
																if(in_array("3",$getview)){
																?>
																<a class="edit" href="<?php echo base_url().'client/staff/edit/'; ?>{{data.staff_id}}"><button type="submit" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
																<?php }  
																$getdelete = explode(",",$this->session->userdata('delete'));
																if(in_array("3",$getdelete)){
																?>
																	<button ng-click="delete(data.staff_id)" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"></i></button>
																<?php }  if( $clientDetails['promotional'] == 1 ) {?>
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
														<div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
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
																<th class="text-center">Staff Code</th>
																<th class="text-center">Staff</th>
																<th class="text-center">Mobile No</th>
																<th class="text-center">User</th>
																<th class="text-center">Status</th>
																<th class="text-center">Action</th>
															  </tr>
															</thead>
															<tbody>
															<tr><td colspan="9"> <input style="width:100%;" type="text" ng-model="search" ng-change="filter1()" placeholder="Search All Fields" class="form-control" /> </td>
															</tr>
																<tr ng-if="data != 0" ng-show="filteredItems > 0" ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit" >
																	<td class="text-center"><i class="fa fa-business-time"></i>&nbsp;&nbsp;{{data.created_date.split(' ')[0]}}</td>
																	<td class="text-center text-muted"> 
																		<a href="<?php echo base_url().'client/staff/edit/'; ?>{{data.staff_id}}"><div class="badge badge-pill badge-info">{{data.staff_code}}</div></a>
																	</td>
																	<td class="text-center">{{data.first_name}}</td>
																	<td class="text-center">{{data.mobile_no}}</td>
																	<td class="text-center">{{data.username}}</td>
																	<td class="text-center">
																	 <a ng-if="data.status == 0" ><button ng-click="active(data.user_id,data.first_name)" type="submit" class="mb-2 mr-2 btn-pill btn btn-alternate status">Inactive</button></a>
																	 <a ng-if="data.status != 0"><button  ng-click="active(data.user_id,data.first_name)" type="reset" class="mb-2 mr-2 btn btn-pill btn-warning status">Active</button></a>
																	</td>
																	<td class="text-center">
																	  <a class="edit" href="<?php echo base_url().'client/user/edit/'; ?>{{data.user_id}}"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
																	  <button ng-click="delete1(data.user_id,data.first_name)" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"></i></button></a>
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
															<div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
														</div></br></br>
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
    $http.get('<?php echo base_url().'client/staff/getstaff'; ?>').success(function(data){
        $scope.list = data;
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 10; //max no of items to display in a page
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
	$scope.delete = function($staff_id,$first_name) {
		var utl= '<?php echo base_url().'client/staff/delete' ?>';
		swal({
          title: "Are you sure?",
          text: "You will be able to delete this "+$first_name+"  Record!",
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
				data : {p_id:$staff_id},
				dataType: 'json', 
				success:function(data, textStatus, jqXHR,form) 
				{
					if(data.status == 'success') {
					  swal("Deleted!", $first_name + " Records has been deleted!", "success");
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
    $http.get('<?php echo base_url().'client/user/getuser'; ?>').success(function(data){
        $scope.list = data;
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 10; //max no of items to display in a page
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
	$scope.active = function($user_id,$first_name) {
		var utl= '<?php echo base_url().'client/user/status_update' ?>';
		swal({
          title: "Are you sure?",
          text: "You will be able to change this "+$first_name+" Status!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-info',
          confirmButtonText: 'Yes, Update it!',
          closeOnConfirm: false,
        },
        function(){
			$.ajax({
				type: 'post',
				url: utl,
				data : {p_id:$user_id},
				dataType: 'json', 
				success:function(data, textStatus, jqXHR,form) 
				{
					if(data.status == 'success') {
					  swal("Success!", $first_name +"  status has been changed!", "success");
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
	$scope.delete1 = function($user_id,$first_name) {
		var utl= '<?php echo base_url().'client/user/delete' ?>';
		swal({
          title: "Are you sure?",
          text: "You will be able to delete this "+$first_name+" User!",
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
				data : {p_id:$user_id},
				dataType: 'json', 
				success:function(data, textStatus, jqXHR,form) 
				{
					if(data.status == 'success') {
					  swal("Deleted!", $first_name + " Records has been deleted!", "success");
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
	$('.staff_list').click(function(){
		$('.staff').show();
		$('.user').hide();
	});
	$('.user_list').click(function(){
		$('.staff').hide();
		$('.user').show();
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
