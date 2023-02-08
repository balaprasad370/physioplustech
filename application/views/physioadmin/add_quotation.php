<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Physio Plus Tech </title>
	<link rel="icon" type="image/ico" href="<?php echo base_url() ?>assets/images/favicon.ico" />
	<link href="<?php echo base_url() ?>admin_assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>
   <!--<link href="<?php echo base_url() ?>admin_assets/plugins/pace/flash.css" rel="stylesheet" type="text/css"/>-->
    <link href="<?php echo base_url() ?>admin_assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/themify-icons/themify-icons.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/dist/css/stylehealth.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/plugins/toastr/toastr.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/plugins/NotificationStyles/css/demo.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/plugins/NotificationStyles/css/ns-default.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/plugins/NotificationStyles/css/ns-style-growl.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/plugins/NotificationStyles/css/ns-style-attached.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/plugins/NotificationStyles/css/ns-style-bar.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/plugins/NotificationStyles/css/ns-style-other.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
   	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css"></head>
     <link href="<?php echo base_url() ?>admin_assets/plugins/toastr/toastr.css" rel="stylesheet" type="text/css"/>
   <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script>

<style>

input {
	font-family: 'Roboto', sans-serif;
	display:block;
	border: none;
	border-radius: 0.25rem;
	border: 1px solid black;
	line-height: 3rem;
	padding: 0;
	font-size: 1.5rem;
	color: #607D8B;
	width: 100%;
	margin-top: 0.5rem;
}
input:focus {outline: none;}
#ui-datepicker-div {
	display: none;
	background-color: #fff;
	box-shadow: 0 0.5rem 0.5rem rgba(0,0,0,0.1);
	margin-top: 0.25rem;
	border-radius: 2rem;
	padding: 0.5rem;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
}
.ui-datepicker-calendar thead th {
	padding: 0.25rem 0;
	text-align: center;
	font-size: 0.75rem;
	font-weight: 400;
	color: #00000;
}
.ui-datepicker-calendar tbody td {
	width: 2.5rem;
	text-align: center;
	padding: 0;
}
.ui-datepicker-calendar tbody td a {
	display: block;
	border-radius: 0.25rem;
	line-height: 2rem;
	transition: 0.3s all;
	color: #546E7A;
	font-size: 0.875rem;
	text-decoration: none;
}
.ui-datepicker-calendar tbody td a:hover {	
	background-color: #E0F2F1;
}
.ui-datepicker-calendar tbody td a.ui-state-active {
	background-color: #009688;
	color: white;
}
.ui-datepicker-header a.ui-corner-all {
	cursor: pointer;
	position: absolute;
	top: 0;
	width: 2rem;
	height: 2rem;
	margin: 0.5rem;
	border-radius: 0.25rem;
	transition: 0.3s all;
}
.ui-datepicker-header a.ui-corner-all:hover {
	background-color: #ECEFF1;
}
.ui-datepicker-header a.ui-datepicker-prev {	
	left: 0;	
	background: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMyIgaGVpZ2h0PSIxMyIgdmlld0JveD0iMCAwIDEzIDEzIj48cGF0aCBmaWxsPSIjNDI0NzcwIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik03LjI4OCA2LjI5NkwzLjIwMiAyLjIxYS43MS43MSAwIDAgMSAuMDA3LS45OTljLjI4LS4yOC43MjUtLjI4Ljk5OS0uMDA3TDguODAzIDUuOGEuNjk1LjY5NSAwIDAgMSAuMjAyLjQ5Ni42OTUuNjk1IDAgMCAxLS4yMDIuNDk3bC00LjU5NSA0LjU5NWEuNzA0LjcwNCAwIDAgMS0xLS4wMDcuNzEuNzEgMCAwIDEtLjAwNi0uOTk5bDQuMDg2LTQuMDg2eiIvPjwvc3ZnPg==");
	background-repeat: no-repeat;
	background-size: 0.5rem;
	background-position: 50%;
	transform: rotate(180deg);
}
.ui-datepicker-header a.ui-datepicker-next {
	right: 0;
	background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMyIgaGVpZ2h0PSIxMyIgdmlld0JveD0iMCAwIDEzIDEzIj48cGF0aCBmaWxsPSIjNDI0NzcwIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik03LjI4OCA2LjI5NkwzLjIwMiAyLjIxYS43MS43MSAwIDAgMSAuMDA3LS45OTljLjI4LS4yOC43MjUtLjI4Ljk5OS0uMDA3TDguODAzIDUuOGEuNjk1LjY5NSAwIDAgMSAuMjAyLjQ5Ni42OTUuNjk1IDAgMCAxLS4yMDIuNDk3bC00LjU5NSA0LjU5NWEuNzA0LjcwNCAwIDAgMS0xLS4wMDcuNzEuNzEgMCAwIDEtLjAwNi0uOTk5bDQuMDg2LTQuMDg2eiIvPjwvc3ZnPg==');
	background-repeat: no-repeat;
	background-size: 10px;
	background-position: 50%;
}
.ui-datepicker-header a>span {
	display: none;
}
.ui-datepicker-title {
	text-align: center;
	line-height: 2rem;
	margin-bottom: 0.25rem;
	font-size: 0.875rem;
	font-weight: 500;
	padding-bottom: 0.25rem;
}
.ui-datepicker-week-col {
	color: #78909C;
	font-weight: 400;
	font-size: 0.75rem;
}
</style></head><body class="hold-transition sidebar-mini">        
         <div class="wrapper">
          	 <?php $this->load->view('physioadmin/sidebar'); ?>
                  <div class="content-wrapper">
                    <section class="content-header">
                        <div class="header-icon">
                            <i class="pe-7s-note2"></i>
                        </div>
                        <div class="header-title">
                            <h1>Add Quotation</h1>
                            <small>Fill to Quotation details</small>
                        </div>
                    </section>
                    <section class="content">
                        <div class="row">
                           <div class="col-sm-6">
                                <div class="panel panel-bd lobidrag">
                                     <div class="panel-body">
                                         <form action="<?php echo base_url().'physioadmin/quotation/add_quotation' ?>" method="post" class="form-horizontal" role="form" parsley-validate id="basicvalidations">
                      					  <div class="form-group">
											<label for="input01" class="col-sm-4 control-label">Name :</label>
											<div class="col-sm-8">
											<input type="text" name="name" id="name" value="" class="form-control" parsley-trigger="change" parsley-required="true">
											
											</div>
										  </div>
										  
										  <div class="form-group">
											<label for="input01" class="col-sm-4 control-label">Plan : </label>
											<div class="col-sm-8">
											 <select class="chosen-select chosen-transparent form-control" name="plan_type" id="plan_type" parsley-trigger="change" parsley-required="true">
												  <option selected="true" disabled="disabled">Please Select</option>
												  <option value="Professional Plan">Professional Plan</option>
												  <option value="Monetary Plan">Monetary Plan</option>
												  <option value="Enterprise Plan">Enterprise Plan</option>
												  <option value="Ultimate Prescriber Plan">Ultimate Prescriber Plan</option>
												  
											   </select>
											</div>
										  </div>
										  <div class="form-group">
											<label for="input01" class="col-sm-4 control-label">Custom Features (charges) :</label>
											<div class="col-sm-8">
											<input type="text" name="features" id="features" value="" class="form-control" >
											
											</div>
										  </div>
										   <div class="form-group">
										  <label for="fullname" class="col-sm-4 control-label">Additional location :</label>
										  <div class="col-sm-8">
											  <div class="checkbox check-transparent last">
												<input type="checkbox"  value="yes" name="location" id="opt1" >
												<label for="opt1"></label></br></br>
											  </div>
											</div>
											 </div>
											 <div class="form-group">
										  <label for="fullname" class="col-sm-4 control-label">Additional staff login :</label>
										  <div class="col-sm-8">
											  <div class="checkbox check-transparent last">
												<input type="checkbox"  value="yes" name="staff" id="opt2" >
												<label for="opt2"></label></br></br>
											  </div>
											</div>
											 </div>
											 <div class="form-group">
										  <label for="fullname" class="col-sm-4 control-label">Mobile App (Android only)</label>
										  <div class="col-sm-8">
											  <div class="checkbox check-transparent last">
												<input type="checkbox"  value="yes" name="app" id="opt3" >
												<label for="opt3"></label></br></br>
											  </div>
											</div>
											 </div>
											 <div class="form-group">
										  <label for="fullname" class="col-sm-4 control-label">Software Offline Version</label>
										  <div class="col-sm-8">
											  <div class="checkbox check-transparent last">
												<input type="checkbox"  value="yes" name="offline" id="opt4" >
												<label for="opt4"></label></br></br>
											  </div>
											</div>
											 </div>
										  <div class="form-group">
											<label for="input01" class="col-sm-4 control-label">Mobile No :</label>
											<div class="col-sm-8">
											<input type="text" name="mobile" id="mobile" value="" class="form-control" parsley-trigger="change" parsley-required="true" parsley-type="phone" parsley-validation-minlength="0">
											
											</div>
										  </div>
										  <!--<div class="form-group">
											<label for="input01" class="col-sm-4 control-label">Discount :</label>
											<div class="col-sm-8">
											<input type="text" name="discount" id="discount" value="" class="form-control" parsley-trigger="change" parsley-required="true" parsley-type="phone" parsley-validation-minlength="0">
											
											</div>
										  </div>-->
										  <div class="form-group">
											<label for="input01" class="col-sm-4 control-label">Email :</label>
											<div class="col-sm-8">
											<input type="text" name="email" id="email" value="" class="form-control" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-type="email" parsley-validation-minlength="1">
											
											</div>
										  </div>
										  <div class="form-group">
											<label for="input01" class="col-sm-4 control-label">Address :</label>
											<div class="col-sm-8">
											<textarea class="form-control" name="address"></textarea>
											
											</div>
										  </div>
										  <div class="form-group">
											
											<div class="col-sm-12">
											<input type="text" name="det" id="det" value="This Quotation is Valid only for 10 days from the date of issue of the quotation." class="form-control" >
											
											</div>
										  </div>
											<div class="form-group form-footer">
											<div class="col-sm-offset-4 col-sm-8">
											  <button type="submit" class="btn btn-primary" id="save">Save</button>
											   </div>
										  </div>
										</form>
                                     </div>
                                 </div>
                             </div>
							</div>
							
                     </section>
                 </div> 
                 <footer class="main-footer text-center">
                    <div class="pull-right hidden-xs"></div>
                    <strong> © 2019 <a href="#"> Physio Plus Tech </a>.</strong> All rights reserved.
                </footer>
            </div> <!-- ./wrapper -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>admin_assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/plugins/lobipanel/lobipanel.min.js" type="text/javascript"></script>
        <!--<script src="<?php echo base_url() ?>admin_assets/plugins/pace/pace.min.js" type="text/javascript"></script>-->
        <script src="<?php echo base_url() ?>admin_assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/dist/js/custom1.js" type="text/javascript"></script>
		<script src="<?php echo base_url() ?>admin_assets/dist/js/custom.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/plugins/NotificationStyles/js/modernizr.custom.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/plugins/NotificationStyles/js/classie.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/plugins/NotificationStyles/js/notificationFx.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/plugins/NotificationStyles/js/snap.svg-min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/plugins/toastr/toastr.min.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
        <script src="https://select2.github.io/select2-bootstrap-theme/js/bootstrap.min.js"></script>
        <script src="https://select2.github.io/select2-bootstrap-theme/js/anchor.min.js"></script>
	<script>
	$( function() {
	$( "#datepicker" ).datepicker({
		dateFormat: "dd-mm-yy"
		,	duration: "fast"
	});
} );
	$('select').select2();
$(function(){
	 
	$('#duration').change(function() {
		var plan = $('.Plan').val();
		var duration = $('#duration').val();
		var unit_price = $('#unit_price').val();
		var d = duration/30;
		$('#users').val(1);
		$('#location').val(1);
		if(unit_price == ''){
			if(plan == 1){
				var value = Math.round(d) * 300;
				$('#subtotal').val(value);
			} else if(plan == 2) {
				var value = Math.round(d) * 500;
				$('#subtotal').val(value);
			} else if(plan == 3) {
				var value = Math.round(d) * 600;
				$('#subtotal').val(value);
			} else if(plan == 4) {
				var value = Math.round(d) * 700;
				$('#subtotal').val(value);
			} else {
				var value = Math.round(d) * 0;
				$('#subtotal').val(value);
			}
		} else {
			var value = Math.round(d) * unit_price;
			$('#subtotal').val(value);
		}
		$('#total').val(value);
	});
	$('#users').change(function() {
		var plan = $('.Plan').val();
		var duration = $('#duration').val();
		var unit_price = $('#unit_price').val();
		var d = Math.round(duration/30);
		if(unit_price == ''){
			if(plan == 1){
				var value = d * 300;
			} else if(plan == 2) {
				var value = d * 500;
			} else if(plan == 3) {
				var value = d * 600;
			} else if(plan == 4) {
				var value = d * 700;
			} else {
				var value = d * 0;
			}
		} else {
			var value = d * unit_price;
		}
		var user = $('#users').val();
		var rate = (user-1) * 100;
		var sub = parseInt(rate) + parseInt(value);
		$('#subtotal').val(sub);
		$('#total').val(sub);
	});
	$('#users_amt').change(function() {
		var plan = $('.Plan').val();
		var duration = $('#duration').val();
		var unit_price = $('#unit_price').val();
		var d = Math.round(duration/30);
		if(unit_price == ''){
			if(plan == 1){
				var value = d * 300;
			} else if(plan == 2) {
				var value = d * 500;
			} else if(plan == 3) {
				var value = d * 600;
			} else if(plan == 4) {
				var value = d * 700;
			} else {
				var value = d * 0;
			}
		} else {
			var value = d * unit_price;
		}
		var user = $('#users').val();
		var val2 = $('#users_amt').val();
		var rate = (user-1) * val2;
		var sub = parseInt(rate) + parseInt(value);
		$('#subtotal').val(sub);
		$('#total').val(sub);
	});
	$('#location').change(function() {
		var plan = $('.Plan').val();
		var duration = $('#duration').val();
		var unit_price = $('#unit_price').val();
		var d = Math.round(duration/30);
		if(unit_price == ''){
			if(plan == 1){
				var value = d * 300;
			} else if(plan == 2) {
				var value = d * 500;
			} else if(plan == 3) {
				var value = d * 600;
			} else if(plan == 4) {
				var value = d * 700;
			} else {
				var value = d * 0;
			}
		} else {
			var value = d * unit_price;
		}
		var user = $('#users').val();
		if(user == 1){
			var sub = parseInt(value);
		} else {
			var val2 = $('#users_amt').val();
			var rate = (user-1) * val2;
			var sub = parseInt(rate) + parseInt(value);
		}
		var loc = $('#location').val();
		var rate = (loc-1) * 500;
		var sub1 = parseInt(rate) + parseInt(sub);
		$('#subtotal').val(sub1);
		$('#total').val(sub1);
	});
	$('#location_amt').change(function() {
		var plan = $('.Plan').val();
		var duration = $('#duration').val();
		var unit_price = $('#unit_price').val();
		var d = Math.round(duration/30);
		if(unit_price == ''){
			if(plan == 1){
				var value = d * 300;
			} else if(plan == 2) {
				var value = d * 500;
			} else if(plan == 3) {
				var value = d * 600;
			} else if(plan == 4) {
				var value = d * 700;
			} else {
				var value = d * 0;
			}
		} else {
			var value = d * unit_price;
		}
		var user = $('#users').val();
		if(user == 1){
			var sub = parseInt(value);
		} else {
			var val2 = $('#users_amt').val();
			var rate = (user-1) * val2;
			var sub = parseInt(rate) + parseInt(value);
		}
		var loc = $('#location').val();
		var location_amt = $('#location_amt').val();
		var rate = (loc-1) * location_amt;
		var sub1 = parseInt(rate) + parseInt(sub);
		$('#subtotal').val(sub1);
		$('#total').val(sub1);
	});
	$('#t_sms').change(function() {
		var val = $('#t_sms').val();
		var val1 = $('#subtotal').val();
		var sms_price = val * 0.50;
		var sub = parseInt(sms_price) + parseInt(val1);
		$('#subtotal').val(sub);
		$('#total').val(sub);
		
	});
	$('#tax').change(function() {
		var val = $('#tax').val();
		var val1 = $('#subtotal').val();
		var rate  = val1 * ( val / 100 );
		var sub = parseInt(rate) + parseInt(val1);
		$('#total').val(sub);
		//$('#subtotal').val(sub);
		
	});
	$('#discount').change(function() {
		var val = $('#discount').val();
		var val1 = $('#subtotal').val();
		var rate  = val1 * ( val / 100 );
		var sub = parseInt(val1) - parseInt(rate);
		$('#total').val(sub);
		//$('#subtotal').val(sub);
	});
							
	$('.delete').on("click", function () {
		
                    var invoice_id = $(this).attr('href').split('#')[1];
					swal({
                        title: "Are you sure?",
                        text: "Your will not be able to recover this imaginary file!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel plx!",
                        closeOnConfirm: false,
                        closeOnCancel: false},
                        function (isConfirm) {
                            if (isConfirm) {
								$.ajax({
											url : '<?php echo base_url().'physioadmin/client_det/invoice_delete' ?>',
											type: "POST",
											data : {i_id:invoice_id},
											dataType: 'json', 
											success:function(data, textStatus, jqXHR,form) 
											{
												swal("Deleted!", "Your imaginary file has been deleted.", "success");
												setTimeout(function(){ 
													window.location.reload();
												}, 1000);
											},
											error: function(jqXHR, textStatus, errorThrown) 
											{
												swal("Deleted!", "Your imaginary file has been deleted.", "success");
												setTimeout(function(){ 
													window.location.reload();
												}, 1000);
											}
									});
                            } else {
                                swal("Cancelled", "Your imaginary file is safe :)", "error");
                            }
                        });
                });
	  
		$('form').on('submit', function (event) {
				 event.preventDefault();
				 var $form = $(this);
				 var  formID = $(this).attr("id");
				 var  formURL = $(this).attr("action");
				 var button1 = $('#submit');
				 button1.prop('disabled', true);
						
				$.ajax({
					type: 'post',
					url: $(this).attr('action'),
					data:$(this).serialize(),
					success:function(data, textStatus, jqXHR,form) 
					{
						setTimeout(function () {
							toastr.success('Details has been saved Successfully', 'Successfully');
							window.location.reload();
						}, 1000);
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						setTimeout(function () {
							toastr.success('Details has not been saved Successfully', 'Failure');
							window.location.reload();
					   }, 1000);
					}
				  });
		});
	  $('.delete').bind('click', function ()  {	
			 var invoice_id = $(this).attr('href').split('#')[1];
			 $.confirm({
             title: 'Confirmation',
             content: 'Are you sure you want to delete this patient?',
             confirmButton: 'Proceed',
             confirmButtonClass: 'btn-info',
             icon: 'fa fa-question-circle',
             animation: 'scale',
             animationClose: 'top',
             opacity: 0.5,
             confirm: function () {
				 
				 $.ajax({
						url : '<?php echo base_url().'physioadmin/client_det/invoice_delete' ?>',
						type: "POST",
						data : {i_id:invoice_id},
						dataType: 'json', 
						success:function(data, textStatus, jqXHR,form) 
						{
							$.alert('Invoice record has been deleted successfully!');
							setTimeout(function(){ 
								window.location.reload();
							}, 1000);
						},
						error: function(jqXHR, textStatus, errorThrown) 
						{
							$.alert('Invoice record has been deleted successfully!');
							setTimeout(function(){ 
								window.location.reload();
							}, 1000);
						}
				});
			 }
         });
		 return false; 
    });
	
      
      $(".chosen-select").chosen({disable_search_threshold: 4});
      
    });
      
    </script></body>
 </html>
