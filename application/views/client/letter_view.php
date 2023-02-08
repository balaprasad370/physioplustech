<!doctype html>
<html ng-app="myApp" ng-app lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Letter List - Physio Plus Tech</title>
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
                                   </br><div class="row">
									<div class="col"><h5 class="card-title">&nbsp;&nbsp;&nbsp;&nbsp;Letters List</h5>
									</div>
									<div class="col" >
									<div style="float:right;" ><a  class="btn btn-shadow btn-warning" href="<?php echo base_url().'client/letter/letter_format' ?>" ><strong>Add New</strong></a>
														&nbsp;&nbsp;&nbsp;</div>
								
                                   </div>
                                   </div></br>
                                   
								    <div class="col-md-12" >
										<table class="table table-striped table-bordered">
										<thead>
										  <tr>
										   <th class="text-center">Letter Title</th>
											<th class="text-center">Action</th>
										  </tr>
										</thead>
										<tbody>
										<tr><td colspan="9"> <input style="width:100%;" type="text" ng-model="search" ng-change="filter()" placeholder="Search All Fields" class="form-control" /> </td>
										</tr>
											<tr ng-if="data != 0" ng-show="filteredItems > 0" ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit" id="data.bill_id">
												  
												<td class="text-center">{{data.title}}</td>
												 
												<td class="text-center">
												<a class="edit" href="<?php echo base_url().'client/letter/letter_edit/'; ?>{{data.letter_id}}"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
												<a href="<?php echo base_url().'client/letter/letter_print/';?>{{data.letter_id}}" target="_blank"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-alternate" data-toggle="tooltip" data-placement="top" title="Print"><i class="fa fa-print"></i></button></a>
												<a href="<?php echo base_url().'client/letter/letter_email/'; ?>{{data.letter_id}}/{{data.client_id}}"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="Email"><i class="fa fa-share"> </i></button></a>
												<a href=""><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" ng-click="delete(data.letter_id,data.title)" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"> </i></button></a>
												</td>
											</tr>
											<tr ng-show="filteredItems < 10"> 
											   <td colspan="2"><center><h6> No More Records </h6></center></td>
											</tr>
										</tbody>
										</table>
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
    $http.get('<?php echo base_url().'client/letter/getletter'; ?>').success(function(data){
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
	$scope.delete = function($letter_id,$title) {
		var utl= '<?php echo base_url().'client/letter/delete' ?>';
		swal({
          title: "Are you sure?",
          text: "You will be able to delete this "+$title+" Record!",
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
				data : {p_id:$letter_id},
				dataType: 'json', 
				success:function(data, textStatus, jqXHR,form) 
				{
					if(data.status == 'success') {
					  swal("Deleted!", $title+ " Records has been deleted!", "success");
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
	var today = new Date();
	$scope.date = today;
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
