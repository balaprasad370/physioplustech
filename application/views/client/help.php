<!doctype html>
<html ng-app="myApp" ng-app lang="en">

 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
    <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">
	<meta name="msapplication-tap-highlight" content="no">
	<link href="<?php echo base_url()?>my_assets/main.css" rel="stylesheet"></head>
    <link rel='stylesheet' href='https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'>
	<body>
<div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container card">
            <div class="h-75">
                <div class="h-75 no-gutters row">
                    <div class="d-none d-lg-block col-lg-4">
                        <img style="width:100%; height:100%;" src="<?php echo base_url().'iconsforreportsection/unnamed.jpg' ?>"></img></br>
                    </div>
                    <div class="h-75 d-flex bg-white justify-content-top align-items-center col-md-12 col-lg-8">
                        <div class="mx-auto app-login-box col-sm-12 col-md-8 col-lg-10">
                            <center><img style="width:150px; height:120px;" src="https://www.physioplustech.in/images/physio-tech.png"></img></center>
                            <h1 style="font-style: italic; float:center;"><center>HOW CAN WE HELP YOU TODAY?</center></h1>	
                            <div  ng-controller="customersCrtl1">
                                <form class="">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
											<input class="form-control " ng-model="search" ng-change="filter1()" style="font-size:20px; width:100%; height:50px; border-radius: 50px 50px 50px 50px;" type="text" placeholder="&nbsp;&nbsp;Type to Search here"/>
											</div>
                                        </div>
										<div class="col-md-12">
											<div class="card-header"><font color="black"><small><b>If you don't find answers for your query here, please send us a support ticket.</b></small></font>
											<div class="btn-actions-pane-right">
												<a  target="_blank" href="https://physioplus.freshdesk.com/support/tickets/new" class="btn btn-shadow btn-info ml-2" style="color:white;"><strong>New Support Ticket</strong></a>
											</div>
											</div>
										</div>
                                    </div>
									
                                   <div class="row" >
										<div class="col-md-12">
												<div class="table-responsive">
													<table class="table table-striped table-bordered">
													<tr ng-if="search != null" ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit" id="data.id">
															<td style=""><a href="{{data.link}}">{{data.search}}</a></br>{{data.description | limitTo: 100}}</td>
													</tr>
													</table>
												</div>
											
										</div>
									</div> 
								</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script></body>
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
    $http.get('<?php echo base_url().'client/dashboard/gethelp'; ?>').success(function(data){
        $scope.list = data;
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 5; //max no of items to display in a page
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
	$scope.delete = function($patient_id) {
		var utl= '<?php echo base_url().'client/patient/delete' ?>';
		swal({
          title: "Are you sure?",
          text: "You will be able to delete this Patient Record!",
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
				data : {p_id:$patient_id},
				dataType: 'json', 
				success:function(data, textStatus, jqXHR,form) 
				{
					if(data.status == 'success') {
					  swal("Deleted!", "Your Patient Records has been deleted!", "success");
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
    $http.get('<?php echo base_url().'client/dashboard/get_help'; ?>').success(function(data){
        $scope.list = data;
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 10; //max no of items to display in a page
        $scope.filteredItems1 = $scope.list.length; //Initially for no filter  
        $scope.totalItems = $scope.list.length;
    });
    $scope.setPage = function(pageNo) {
        $scope.currentPage = pageNo;
    };
    $scope.filter1 = function() {
        $timeout(function() { 
            $scope.filteredItems1 = $scope.filtered.length;
        }, 10);
    };
	$scope.delete1 = function($patient_id) {
		var utl= '<?php echo base_url().'client/patient/delete' ?>';
		swal({
          title: "Are you sure?",
          text: "You will be able to delete this Patient Record!",
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
				data : {p_id:$patient_id},
				dataType: 'json', 
				success:function(data, textStatus, jqXHR,form) 
				{
					if(data.status == 'success') {
					  swal("Deleted!", "Your Patient Records has been deleted!", "success");
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

</html>
