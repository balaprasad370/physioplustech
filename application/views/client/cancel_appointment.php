<!doctype html>
<html ng-app="myApp" ng-app lang="en">
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
                        <div class="row" ng-controller="customersCrtl">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header"> Canceled Appointments List
                                   </div>
								    <div class="col-md-12" >
									<div class="table-responsive">
										<table class="table table-striped table-bordered">
										 <tr>
                                                <th class="text-center">Image</th>
												<th class="text-center">Date</th>
												<th class="text-center">Patient Name</th>
												<th class="text-center">Time</th>
												<th class="text-center">Visit Status</th>
												<th class="text-center">Bill Status</th>
												<th class="text-center">Consultant Name</th>
												<th class="text-center">Action</th>
                                        </tr>
										<tbody>
										<tr><td colspan="8"> <input style="width:100%;" type="text" ng-model="search" ng-change="filter()" placeholder="Search All Fields" class="form-control" /> </td>
										</tr>
											<tr ng-show="filteredItems > 0" ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
												<td class="text-center" ng-if="data.gender == 'Female' || data.gender == 'female'">
												    <img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/girl.png" alt="">
												</td>
												<td class="text-center" ng-if="data.gender != 'Female' || data.gender != 'female'">
													<img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/boy.png" alt="">
												</td>
												<td style="width:120px;" class="text-center"><i class="fa fa-business-time"></i>&nbsp;&nbsp;{{data.appointment_from}}</td>
												<td class="text-center">
												<a href="<?php echo base_url().'client/patient/view/' ?>{{data.patient_id}}">{{data.title}}</a>
												</td><td class="text-center">{{data.start.split(' ')[1]}} To {{data.end.split(' ')[1]}} &nbsp;<div ng-if="data.bill_id != '0'" class="badge badge-pill badge-warning" data-toggle="tooltip" data-placement="top" title="Appointment No : {{data.order_id.split('/')[0]}} of total {{data.order_id.split('/')[1]}} Appointments">{{data.order_id}}</div></p></td>
												</td>
												<td class="text-center" ng-if="data.visit == '0'">
												  <div class="badge badge-pill badge-danger">Not Visited</div>
												</td>
												<td class="text-center" ng-if="data.visit != '0'">
													<div class="badge badge-pill badge-success">Visited</div>
												</td>
												<td class="text-center" ng-if="data.bill_id == 0">
														<a href="<?php echo base_url().'client/invoice/add/Pt/'; ?>{{data.patient_id}}/{{data.appointment_id}}" ><div class="badge badge-pill badge-primary">Make Bill</div></a>
												</td>
												<td class="text-center" ng-if="data.bill_id != 0">
													<div ng-if="data.bill_status == 1"><div class="badge badge-pill badge-alternate">Paid</div></div>
													<a href="<?php echo base_url().'client/invoice/invoice_status_update/'; ?>{{data.bill_id}}/{{data.patient_id}}" ><div ng-if="data.bill_status != 1"><div class="badge badge-pill badge-secondary">Make Payment</div></div></a>
												</td>
												<td class="text-center">{{data.staff_name}} {{data.staff_lname}}</td>
												<td class="text-center">
												<a href="<?php echo base_url().'client/schedule/reschedule1/' ?>{{data.appointment_id}}"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Reschedule"><i class="fa fa-pencil-square-o"> </i></button></a>
												<button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete" ng-click="delete(data.appointment_id)"><i class="fa fa-trash-alt"> </i></button>
												</td>
											 </tr>
											 <tr ng-if="filteredItems < 10">
											 <td colspan="11"><center><h6>No More Records</h6></center></td>
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
                </div>
                    </div>
					<div style="display:none;" class="swal2-container swal2-center swal2-fade swal2-shown delete1" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progresssteps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"><span class="swal2-x-mark"><span class="swal2-x-mark-line-left"></span><span class="swal2-x-mark-line-right"></span></span></div><div class="swal2-icon swal2-question" style="display: none;"><span class="swal2-icon-text">?</span></div><div class="swal2-icon swal2-warning" style="display: none;"><span class="swal2-icon-text">!</span></div><div class="swal2-icon swal2-info" style="display: none;"><span class="swal2-icon-text">i</span></div><div class="swal2-icon swal2-success" style="display: none;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Are You Sure You want to delete this Appointment Record?</h2><button type="button" class="swal2-close" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" style="display: block;">Do you want to continue</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message" style="display: none;"></div></div><div class="swal2-actions" style="display: flex;"><button type="button" id="confirm" class="swal2-confirm swal2-styled confirm" aria-label="" style="border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);">Cool</button><button type="button"  class="swal2-cancel swal2-styled cancel1" aria-label="">Cancel</button></div><div class="swal2-footer" style="display: none;"></div></div></div>
					<div style="display:none;" class="swal2-container swal2-center swal2-fade swal2-shown delete2" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progresssteps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"><span class="swal2-x-mark"><span class="swal2-x-mark-line-left"></span><span class="swal2-x-mark-line-right"></span></span></div><div class="swal2-icon swal2-question" style="display: none;"><span class="swal2-icon-text">?</span></div><div class="swal2-icon swal2-warning" style="display: none;"><span class="swal2-icon-text">!</span></div><div class="swal2-icon swal2-info" style="display: none;"><span class="swal2-icon-text">i</span></div><div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" style="display: block;">Deleted Successfully!</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message" style="display: none;"></div></div><div class="swal2-actions" style="display: flex;"><button type="button" class="swal2-confirm swal2-styled cancel2" aria-label="" style="border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);">Cool</button><button type="button" class="swal2-cancel swal2-styled" style="display: none;" aria-label="">Cancel</button></div><div class="swal2-footer" style="display: none;"></div></div></div></div>

 

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
    $http.get('<?php echo base_url().'client/schedule/getcancelappointment'; ?>').success(function(data){
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
	$scope.visit = function($appointment_id) {
		var utl= '<?php echo base_url().'client/schedule/add_visit' ?>';
		swal({
          title: "Are you sure?",
          text: "Patient has Been Arrived",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-info',
          confirmButtonText: 'Yes',
          closeOnConfirm: false,
        },
        function(){
			$.ajax({
				type: 'post',
				url: utl,
				data : {p_id:$appointment_id},
				dataType: 'json', 
				success:function(data, textStatus, jqXHR,form) 
				{ 
					if(data.status == 'success') {
					  swal("Success!", "Your status has been changed!", "success");
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
	$scope.delete = function($appointment_id) {
		var utl= '<?php echo base_url().'client/schedule/del_appointment' ?>';
		swal({
          title: "Are you sure?",
          text: "You will not be able to recover this imaginary file!",
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
				data : {p_id:$appointment_id},
				dataType: 'json', 
				success:function(data, textStatus, jqXHR,form) 
				{
					if(data.status == 'success') {
					  swal("Deleted!", "Your Records has been deleted!", "success");
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
