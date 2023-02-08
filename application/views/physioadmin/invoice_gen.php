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
                            <h1>Invoice</h1>
                            <small>Invoice</small>
                        </div>
                    </section>
                    <section class="content">
                        <div class="row">
                           <div class="col-sm-10">
                                <div class="panel panel-bd lobidrag">
                                     <div class="panel-body">
                                        <form action="<?php echo base_url().'physioadmin/client_det/add_invoicedet/' ?>" method="post" class="form-horizontal" role="form"  >
                                            <div class="col-sm-12 form-group">
                                               <label for="datepicker">Invoice Date</br>    
													<input type="text" class="datepicker" name="invoice_date" style="width:900px;" autocomplete="off">
												</label>		</div>
												<div class="col-sm-12 form-group">
                                               <label for="datepicker">Due Date</br>
													<input type="text" class="datepicker" name="due_date" style="width:900px;" autocomplete="off">
												</label>		</div>
											<div class="col-sm-12 form-group">
                                                <label>Client Name</label>
                                                <input type="text" name="c_name" id="c_name" class="form-control" placeholder="Enter Client Name" >
                                            </div>	
											<div class="col-sm-12 form-group">
                                                <label>Client Mail ID</label>
                                                 <select class="chosen-select chosen-transparent form-control"  placeholder="select Name" name="client_id" id="plan_type" >
												 <option value="">Select username</option>
												 <?php 
												 foreach($clients as $row){ ?>
												 <option value="<?php echo $row['client_id'] ?>"><?php  echo $row['username'].'('.$row['client_id'].')'; ?></option>
												 <?php }
												 ?>
												</select>
											</div>
                                            <div class="col-sm-12 form-group">
                                                <label>Plan</label>
                                                <select  class="chosen-select chosen-transparent form-control Plan"   placeholder="select Plan" name="plan_type" id="plan_type" >
													  <option value="">Select Plan</option>
													  <option value="0">Free Plan</option>
													  <option value="1">Professional  Plan</option>
													  <option value="2">Monetary  Plan</option>
													  <option value="3">Enterprise Plan</option>
													  <option value="4" >Ultimate Prescriber Plan</option>
													  <option value="5">Institute</option>
												</select> 
											</div>
											<div class="col-sm-12 form-group">
                                                <label>Plan Amount(per month)</label>
                                                <input type="text" class="chosen-select chosen-transparent form-control Plan_amt" name="unit_price" id="unit_price" /> 
											</div>
                                            <div class="col-sm-12 form-group">
                                                <label>Duration</label>
												<select  class="chosen-select chosen-transparent form-control"  placeholder="select Plan" name="duration" id="duration">
												<option value="">Please Select</option>
												<option value="30">30 DAYS</option>
												<option value="90">90 DAYS</option>
												<option value="180">180 DAYS</option>
												<option value="365" >1 Year</option>
												<option value="730">2 Years</option>
												<option value="1095">3 Years</option>
												<option value="1460"> 4 Years</option>
												</select> </div>
                                            <div class="col-sm-12 form-group">
                                                <label>Users</label>
                                                <input type="text" name="users" id="users" class="form-control" placeholder="Enter Users Login" >
                                            </div>
											  <div class="col-sm-12 form-group">
                                                <label>User amount (per User)</label>
                                                <input type="text" name="users_amt" id="users_amt" class="form-control" placeholder="Enter Users Login" >
                                            </div>
                                            <div class="col-sm-12 form-group">
                                                <label>Location</label>
                                                <input type="text" id="location" name="location" class="form-control" placeholder="Enter No of location" >
                                            </div>
											<div class="col-sm-12 form-group">
                                                <label>Location amount (per Location)</label>
                                                <input type="text" name="location_amt" id="location_amt" class="form-control" placeholder="Enter Users Login" >
                                            </div>
											<div class="col-sm-12 form-group">
                                                <label>Transactional SMS</label>
                                                <input type="text" id="t_sms" name="t_sms" class="form-control" placeholder="Enter Sms Count" >
                                           
                                            </div>
											<div class="col-sm-12 form-group">
                                                <label>Status</label>
												<select  class="chosen-select chosen-transparent form-control"  placeholder="select Status" name="status" id="status" >
												    <option value=""> Please Select </option>
												    <option value="1"> To Pay </option>
													<option value="0"> Paid </option>
												</select> </div>  
											<div class="col-sm-12 form-group">
                                                <label>Currency</label>
												<select  class="chosen-select chosen-transparent form-control"  placeholder="select Status" name="amt_type" id="amt_type" >
												    <option value=""> Please Select </option>
												    <option value="Rs">INR </option>
													<option value="$"> Dollar </option>
												</select> </div>  												
                                            <div class="col-sm-12 form-group">
                                                <label>Notes</label>
												<textarea class="chosen-select chosen-transparent form-control" name="notes" id="notes" ></textarea> </div> 
                                            
											<button type="button" class="btn btn-amethyst margin-bottom-20" id="AddInvoiceRow">Add Row</button>&nbsp;&nbsp;&nbsp;&nbsp;
												<div class="table-responsive">
											  <center><table style="width:98%;" class="table table-datatable table-custom" id="InvoiceTable">
												<thead>
												  <tr>
													<th>S.No</th>
													<th>Item *</th>
													<th>Quantity</th>
													<th>Price</th>
													<th>Amount</th>
													<th>Action</th>
												  </tr>
												</thead>
												<tbody id="itemsBody">
												  <tr> <td>1</td>
													  <td> <select  name="item_id[]"  class="form-control" placeholder="please Select Item " id="item_id">
														<option value ="" >Please Select</option>
													   <?php	 $items= $item_name['arrayData']; 
																	 if ($item_name['status'] == 'success') {
																			foreach ($items as $item_names) {
																				echo '<option value="'.$item_names['item_id'].'">'.$item_names['item_name'].'</option>';
																			}
																		}  ?>
														</select></td>
															<td> <input type="text"  class="form-control item_quantity" value="" name="item_quantity[]" ></td>
														  <td><input type="text"  class="form-control item_price" value="" name="item_price[]" ></td>
														  <td><input type="text"  class="form-control item_amount" value="" name="item_amount[]" ></td>
														  <td><a href="" id="DeleteRow" class="check-toggler DeleteRow">Delete</a></td>
												  </tr>
												  
												</tbody>
											  </table></center>
											</div>
											<div class="col-sm-12 form-group">
                                                <label>Sub Total</label>
                                                <input type="text" class="form-control" id="subtotal" name="subtotal" placeholder="subtotal" >
                                            </div>
                                            <div class="col-sm-12 form-group">
                                                <label>Tax (%)</label>
                                                <input type="text" class="form-control" id="tax" name="tax" placeholder="Tax">
                                            </div>
                                            <div class="col-sm-12 form-group">
                                                <label>Discount (%)</label>
                                               <input type="text" class="form-control" id="discount" name="discount" placeholder="Discount">
											 </div>
											<div class="col-sm-12 form-group">
                                                <label >Total</label>
                                                <input type="text" class="form-control" id="total" name="total" placeholder="Total">
											</div>  
                                            <div class="col-sm-12 reset-button">
                                                 <button type="button"  href="#" class="btn btn-warning">Reset</button>
                                                 <button type="submit" id="submit" class="btn btn-success">Save</button>
                                            </div>
                                         </form>
                                     </div>
                                 </div>
                             </div>
							</div>
							<div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-bd ">
                                     <div class="panel-body">
                                     <div class="table-responsive">
                                     <table class="table table-bordered table-hover">
                                        <thead>
											<tr>
                                            <th>Date</th>
											<th>Client ID</th>
											<th>Client Name</th>
											<th>Status</th>
											<th>Action </th></tr>
								        </thead><?php  if($invoice != false){ foreach($invoice as $row) {
											$CI =& get_instance();
											$CI->load->model(array('admin'));
											$invoice_id = $row['invoice_id'];
											$profileInfo = $CI->admin->get_det($invoice_id);
											if($row['client_name'] == '') {
												$this->db->where('client_id',$row['client_id']);
												$this->db->select('first_name')->from('tbl_client');
												$res = $this->db->get();
												$name = $res->row()->first_name;
											} else {
												$name = $row['client_name'];
											}
											?>
								        <tr><td><?php echo $row['date']; ?> </td>
										<td><?php echo $row['client_id'] ?></td>
										<td><?php echo $name; ?></td>
										<td><?php echo $amt = $row['total_amount'] - $profileInfo['paid_amount']; if($amt > 0 ) { ?> <a class="btn btn-default" style="background-color:#1CA2E9; color:white;" href="<?php echo base_url().'physioadmin/dashboard/invoice_add/'.$row['invoice_id'].'/'.$row['client_id'] ?>"><i class="fa fa-plus"></i>  Add Payments</a>
				<?php  } else { }   ?></td>
											
											<td><p><a class="btn btn-warning" href="<?php echo base_url().'physioadmin/client_det/invoices/'.$row['invoice_id'].'/'.$row['client_id'] ?>" ><i class="fa fa-print"></i> Preview</a>
											&nbsp;&nbsp;
											<a class="btn btn-success" href="<?php echo base_url().'physioadmin/dashboard/invoice_email/'.$row['invoice_id'].'/'.$row['client_id'] ?>"><i class="fa fa-envelope"></i>  Email</a>
											&nbsp;&nbsp;<a class="btn btn-danger delete" href="<?php echo '#'.$row['invoice_id']; ?>"><i class="fa fa-trash-o"></i> Delete</a></td>
										 
										</tr>
										<?php  } } ?>
									   </tbody>
								    </table>
								   <div class="page-nation text-right">
								   <ul class="pagination pagination-large">
									<?php foreach ($links as $link) {
									 ?>
										<li>
										<?php echo $link; ?>
										</li>
										  
									<?php } ?>
									</ul>
									</div>
                        </div>
                        
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
	$( ".datepicker" ).datepicker({
		dateFormat: "dd-mm-yy"
		,	duration: "fast"
	});
} );
	$('.chosen-select').select2();
	
$(function(){
	$('#AddInvoiceRow').click(function(){
		var 
		table = $('#InvoiceTable'),
		sno = table.find('tbody > tr').length + 1 + '.',
		newRow = table.find('tbody > tr:first').clone();
		newRow.find('td:first').text(sno);
		newRow.css('display', 'none').appendTo( table.find('tbody') ).fadeIn().find(':input').val('');
	});
    $(document).on('change', '[name="item_id[]"]', function(){
	var 
			$this = $(this),
			id = $this.val(),
			parent = $this.parent().parent();
			var items = <?php echo json_encode($item_name); ?>;
			parent.find('[name="item_amount[]"]').val(items.jsonData[id].item_price);
			parent.find('[name="item_price[]"]').val(items.jsonData[id].item_price);
			parent.find('[name="item_quantity[]"]').val(1).trigger('keyup');
	});	
		$(document).on('keyup', '[name="item_quantity[]"]', function(){
			var
			$this = $(this),
			$thisRow = $this.parents('tr'),
			quantity = ($this.val() == '') ? 0 : parseInt( $this.val() ),
			price = parseFloat( $thisRow.find('[name="item_price[]"]').val() );
			var id = $thisRow.find('[name="item_id[]"]').val();
			$thisRow.find('[name="item_amount[]"]').val( (price*quantity).toFixed(2) ).trigger('subTotalCalc');
	});
	$(document).on('subTotalCalc', '[name="item_amount[]"]', function(){
		var	subTotal = 0;
		$('#itemsBody [name="item_amount[]"]').each(function(){
			subTotal += ($(this).val() == '') ? 0.00 :  parseInt( $(this).val() );
		});
		
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
		if(user < 1){
			var sub = parseInt(value);
		} else {
			var val2 = $('#users_amt').val();
			var rate1 = (user-1) * val2;
			var sub = parseInt(rate1) + parseInt(value);
		}
		var loc = $('#location').val();
		if(loc < 1){
			var sub1 = parseInt(sub);
		} else {
			var rate = (loc-1) * 500;
			var sub1 = parseInt(rate) + parseInt(sub);
		}
		
		$('#subtotal').val(parseInt(sub1) + parseInt(subTotal));
		$('#total').val(parseInt(sub1) + parseInt(subTotal));
	});
	
    $(document).on('click', 'a.DeleteRow', function(e){
			e.preventDefault();
			var
			tbody = $(this).parents('tbody'),
			tr = $(this).parents('tr'),
			sno = 1;
			if( tbody.find('tr').length > 1 ) {
				tr.fadeOut(function(){
					$(this).remove();
					tbody.find('tr').each(function(){
						$(this).find('td:first').text(sno+'.');
						sno++;	
					});
					$('#itemsBody [name="item_amount[]"]:first').trigger('subTotalCalc');
				});	
			}
	});
	$('#subtotal').val('0.00');
	$('#total').val('0.00');
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
