<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Edit Invoice - Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="msapplication-tap-highlight" content="no">
	<link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
	<link href="<?php echo base_url()?>asset_list/main.css" rel="stylesheet">
	
	<style>
.parsley-error-list{
	color:red;
	list-style-type:none;
}
label, th, .td{
	font-weight:bold;
	color:#3f6ad8;
}
.table td{
	border-top : 0px;
}
</style>
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    
				<?php include("sidebar.php");?>
            <div class="app-main__outer">
                <div class="app-main__inner">
                               
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title"> Edit Invoice
								</h5>
                                    <form class="" action="<?php echo base_url().'client/invoice/add_invoice1' ?>" method="post"  role="form" parsley-validate id="signupForm">
                                        <input type="hidden" class="form-control" id="bill_id" name="bill_id" autocomplete="off" value="<?php echo $invoice_hdr['bill_id'] ?>" readonly style="width: 62%" /> 
										<div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="vendor" class="">Patient Name *</label>
												 <select class="multiselect-dropdown form-control" name="patient_id" parsley-trigger="change" parsley-required="true" parsley-error-container="#selectbox" id="Patient">
													<optgroup label="Please Select">
													 <?php 
													$this->db->where('patient_id',$invoice_hdr['patient_id']);
													$this->db->select('first_name,last_name')->from('tbl_patient_info');
													$res = $this->db->get();
													$name = $res->row()->first_name.' '.$res->row()->last_name; ?>
													<option value="<?php echo $invoice_hdr['patient_id'] ?>" selected ><?php echo $name; ?></option>
                                                     </optgroup>
										          </select>
												</div>
                                            </div>
											 
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="bill_no" class="">Staff Name *</label>
												<select class="form-control" name="staff_id" id="staff_id" parsley-trigger="change" parsley-required="true" >
												<optgroup label="Please Select">
												<option value ="<?php echo $get_staff['staff_id']; ?>" selected ><?php echo $get_staff['first_name'].' '.$get_staff['last_name']; ?> </option>
													   <?php
												foreach ($consultants as $consult) {
													echo '<option value="'.$consult['staff_id'].'">'.$consult['first_name'].' '.$consult['last_name'].'</option>';
												}
											   ?></option>
										  </optgroup>
										  </select>
												</div>
                                            </div>
                                        </div>
										
										
										<div class="form-row">
                                           <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="bill_no" class="">Bill Date</label>
												<input name="bill_date" placeholder="" type="text" class="form-control datepicker" data-toggle="datepicker" value="<?php echo date('d-m-Y',strtotime($invoice_hdr['treatment_date'])); ?>" placeholder="<?php echo date('d-m-Y',strtotime($invoice_hdr['treatment_date'])); ?>"></div>
                                            </div>
											 
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="bill_no" class="">Due Date</label>
												<input name="due_date" id="due_date" type="text" class="form-control datepicker" data-toggle="datepicker" value="<?php echo date('d-m-Y',strtotime($invoice_hdr['due_date'])); ?>">
												</div>
                                            </div>
                                        </div>
										
										
										<div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="vendor" class="">Appointment</label>
												<select class="form-control" name="appointment_id" id="appointment_id">
												<?php if($set_apts != false){ ?>
						   <option value="<?php echo $set_apts['appointment_id'] ?>"><?php echo date('D M,Y h:i a',strtotime($set_apts['start'])); ?></option>
						   <?php } else { ?>
							 <option value="0">None</option>
						   <?php } ?>
						    <?php if($apts != false){
										foreach ($apts as $consult) {
											echo '<option value="'.$consult['appointment_id'].'">'.date('D M,Y h:i a',strtotime($consult['start'])).'</option>';
										}
									}
								?>
											</select>
												</div>
                                            </div>
											 
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="vendor" class="">Bill No.</label>
												<input name="bill_no" id="bill_no" type="text" class="form-control" readonly value="<?php echo $invoice_hdr['bill_no'] ?>"></div>
                                            </div>
                                        </div>
										 
											<?php
											$CI =& get_instance();
											$CI->load->model(array('registration_model','staff_model'));
											$enteredBy = $invoice_hdr['modify_by'];
											$profileInfo = $CI->registration_model->getProfileInfo($enteredBy);
											$staffInfo = $CI->staff_model->getStaffInfo($enteredBy);
											
											if($profileInfo != false)
												$clientName = $profileInfo['first_name'].' '.$profileInfo['last_name'];
											else if($staffInfo != false)
												$clientName = $staffInfo['first_name'].' '.$staffInfo['last_name'];
											?>
										<div class="form-row">
										
										
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="vendor" class="">Subheading</label>
												<input name="subheading" id="subheading" type="text" class="form-control subheading" value="<?php echo $invoice_hdr['subheading'] ?>" autocomplete="off">
												</div>
                                            </div>
											
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="bill_no" class="">Footer</label>
												<input name="inv_footer" id="inv_footer" type="text" class="form-control footer" value="<?php echo $invoice_hdr['inv_footer'] ?>">
												</div>
                                            </div>
											 
                                            
                                        </div><div class="form-row">
										<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="vendor" class="">Invoice generated by</label>
												<p style="font-weight:bold;color:#794c8a;"><?php echo $clientName; ?></p>
												 <!--<div class="badge badge-pill badge-alternate" style="padding:.5em;font-size:14px;"></div>-->
												</div>
                                            </div>
											
										
                                            <!--<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="vendor" class="">Notes</label>
												<input name="notes" id="notes" type="text" class="form-control" value="<?php echo $invoice_hdr['notes'] ?>">
												</div>
                                            </div>-->
											 
                                             
                                        </div>
										  
									   
										
										<input type="hidden" class="form-control" id="total_amt" name="total_amt" readonly  value="<?php echo $invoice_hdr['total_amt']? $invoice_hdr['total_amt'] : '0.00'?>"/>
										<input type="hidden" class="form-control" id="net_amt" name="net_amt" value="<?php echo $invoice_hdr['net_amt']? $invoice_hdr['net_amt'] : '0.00'?>"/>
										<p style="text-align:right">
										  <a class="mb-2 mr-2 btn-pill btn" id="AddInvoiceRow" style="color:white;background-color:#3f6ad8;">Add Row
                                            </a>
                                            <a class="mb-2 mr-2 btn-pill btn" id="AddNewItem" style="color:white;background-color:#3f6ad8;">Add Item
                                            </a>
                                            <a class="mb-2 mr-2 btn-pill btn" id="AddNewPdt" style="color:white;background-color:#3f6ad8;">Add Product
                                            </a>
											</p>
											
										<div class="col-md-12 add_product"  style="display:none;">
										<div class="position-relative row form-group"><label for="pdt_name" class="col-sm-2 col-form-label">Product Name</label>
                                            <div class="col-sm-10">
											<input name="pdt_name" id="pdt_name" type="text" class="form-control" >
											</div>
                                        </div>
										
										<div class="position-relative row form-group"><label for="item_code" class="col-sm-2 col-form-label">Product Code</label>
                                            <div class="col-sm-10">
											<input name="item_code" id="item_code" type="text" class="form-control" >
											</div>
                                        </div>
										
										
										<div class="position-relative row form-group"><label for="stack_items" class="col-sm-2 col-form-label">No Of Products</label>
                                            <div class="col-sm-10">
											<input name="stack_items" id="stack_items" type="text" class="form-control" >
											</div>
                                        </div>
										
										<div class="position-relative row form-group"><label for="amount_pdt" class="col-sm-2 col-form-label">Amount</label>
                                            <div class="col-sm-10">
											<input name="amount_pdt" id="amount_pdt" type="text" class="form-control" >
											</div>
                                        </div>
										<div class="position-relative row form-group"><label for="discount_pdt" class="col-sm-2 col-form-label">Discount</label>
                                            <div class="col-sm-10">
											<input name="discount_pdt" id="discount_pdt" type="text" class="form-control" >
											</div>
                                        </div>
										<div class="position-relative row form-group"><label for="stack_items" class="col-sm-2 col-form-label">Total</label>
                                            <div class="col-sm-10">
											<input name="total_pdt" id="total_pdt" type="text" class="form-control" >
											</div>
                                        </div>
										
										<div class="form-group" style="display:inline-block">
												<button class="mb-2 mr-2 btn btn-primary btn-sm btn-pill" type="submit" id="save_pdt">Save</button>
												<button class="mb-2 mr-2 btn btn-danger btn-sm btn-pill" type="button" id="cancel_pdt">Cancel</button>
										    </div>
											
										</div>
										
										<div class="col-md-12 add_item" id="two" style="display:none;">
										<div class="position-relative row form-group"><label for="item_name" class="col-sm-2 col-form-label">* Item Name</label>
                                            <div class="col-sm-10">
											<input name="item_name" id="item_name" type="text" class="form-control" >
											</div>
                                        </div>
										
										<div class="position-relative row form-group"><label for="item_desc" class="col-sm-2 col-form-label">Item Description</label>
                                            <div class="col-sm-10">
											<input name="item_desc" id="item_desc" type="text" class="form-control" >
											</div>
                                        </div>
										
										
										<div class="position-relative row form-group"><label for="item_price" class="col-sm-2 col-form-label">* Price</label>
                                            <div class="col-sm-10">
											<input name="item_price" id="item_price" type="text" class="form-control" >
											</div>
                                        </div>
										
										<div class="form-group" style="display:inline-block">
												<button class="mb-2 mr-2 btn btn-primary btn-pill btn-sm" type="submit" id="save_item">Save</button>
												<button class="mb-2 mr-2 btn btn-danger btn-pill btn-sm" type="button" id="cancel2">Cancel</button>
										    </div>
											
										</div>
										
										<div class="table-responsive">
                                        <table class="mb-0 table" id="InvoiceTable">
                                            <thead>
                                            <tr>
                                                <th>S.No</th>
												<th>Item *</th>
												<th>Description</th>
												<th>Quantity</th>
												<th>Price (S$)</th>
												<th>Amount (S$)</th>
												<th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody id="itemsBody">
                                            <tr><?php
												if($invoice_dtl!=false){
												$s_no = 1;
												foreach ($invoice_dtl as $invoice_dtls) {
												
												?>
                                                <td scope="row"><?php echo $s_no; ?>.</td>
                                                 
                                                <td id="selectbox2">
												<select class="form-control" name="item_id[]" id="item_id" parsley-trigger="change" parsley-required="true" parsley-error-container="#selectbox2">
												<option value ="" >Please Select</option>
												  <?php
												$item_names = $items['arrayData']; 
												if ($items['status'] == 'success') {
													foreach ($item_names as $item_name) {
														if($item_name['item_id'] == $invoice_dtls['item_id'])
															echo '<option value="'.$invoice_dtls['item_id'].'" selected>'.$item_name['item_name'].'</option>';
														else
															echo '<option value="'.$item_name['item_id'].'">'.$item_name['item_name'].'</option>';
													}
											  }
											   foreach ($products as $product) {
												$dtr = $invoice_dtls['item_id'];
												$val = explode('/',$dtr);
												if($product['product_id'] == $val[1])
													echo '<option value="PR/'.$product['product_id'].'/'.$product['stack_tems'].'" selected>'.$product['item_name'].'</option>';
												 else
													echo '<option value="PR/'.$product['product_id'].'/'.$product['stack_tems'].'">'.$product['item_name'].'</option>';
																					 
												
											 }
											 foreach ($inventory as $inventory_item) {
												$dtr = $invoice_dtls['item_id'];
												$val = explode('/',$dtr);
												if($inventory_item['color_code'] == $val[0])
													echo '<option value="'.$inventory_item['color_code'].'/'.$inventory_item['inventory_id'].'" selected>'.$inventory_item['pro_name'].'('.$inventory_item['size'].')'.'('.$inventory_item['variant_value'].')'.'</option>';
												else 
													echo '<option value="'.$inventory_item['color_code'].'/'.$inventory_item['inventory_id'].'">'.$inventory_item['pro_name'].'('.$inventory_item['size'].')'.'('.$inventory_item['variant_value'].')'.'</option>';
											 }
											   
												
											?>
											</select>
												</td>
												
											  <td><input type="text" value="" class="form-control item_desc" value="<?php echo $invoice_dtls['item_desc']? $invoice_dtls['item_desc'] : ''?>" name="item_desc[]" id="item_desc"></td>
											  <td> <input type="text"  class="form-control item_quantity" value="<?php echo $invoice_dtls['item_quantity']? $invoice_dtls['item_quantity'] : ''?>" name="item_quantity[]" ></td>
											  <td><input type="text"  class="form-control item_price" value="<?php echo $invoice_dtls['item_price']? $invoice_dtls['item_price'] : ''?>" name="item_price[]" ></td>
											  <td><input type="text"  class="form-control item_amount" value="<?php echo $invoice_dtls['item_amount']? $invoice_dtls['item_amount'] : ''?>" name="item_amount[]" ></td>
											 
												<td><a href="" id="DeleteRow" class="check-toggler DeleteRow"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete"><i class="fa fa-trash-alt"> </i></button></a></td>
                                            </tr>
                                             <?php $s_no++; }  }?>
                                            </tbody>
                                        </table>
                                    </div>
									</br> 
									
									<div class="col-md-12">
									<div class="form-row">
                                            
											
											 <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="vendor" class="">Notes</label>
												<textarea rows="3" class="form-control autosize-input form-rounded" style="height: 200px;background-color:LemonChiffon;" id="notes" name="notes" placeholder="Notes"><?php echo $invoice_hdr['notes']; ?></textarea>
												 
												</div>
                                            </div>
										 <div class="col-md-6">	
									<div class="table-responsive">
									<table class="mb-0 table">
									<tbody>
									<tr>
									<td class="width30 td" style="text-align:right; vertical-align: middle">Subtotal <?php echo '('.$clientDetails['currency'].')' ;?>:</td>
									<?php if($invoice_hdr['total_amt'] == 0.00){ ?>
									<td class="width70" style="line-height: 28px"><strong>Rs <font id="SubTotal">0.00</font></strong></td>
									<?php }else{ ?>
									<td class="width70" style="line-height: 28px"><strong>Rs <font id="SubTotal"><?php echo $invoice_hdr['total_amt']; ?></font></strong></td>
									<?php } ?>
									</tr>
									<tr>
									<td style="text-align:right; vertical-align: middle" class="td">Tax(%) :</td>
									<?php if($invoice_hdr['tax_perc'] > 0){ ?>
									<td><input type="text" name="tax_perc" style="width:96%;" class="form-control" id="Tax" value="<?php echo $invoice_hdr['tax_perc']? $invoice_hdr['tax_perc'] : 0.00?>"></td>
									<?php }else{ ?>
									<td><input type="text" name="tax_perc" style="width:96%;" class="form-control" id="Tax" value="<?php echo $settings['tax']? $settings['tax'] : 0.00?>"></td>
									<?php } ?>
									</tr>
									<tr>
									<td style="text-align:right; vertical-align: middle" class="td">Is discount percentage :</td>
									<td>
									<div class="custom-checkbox custom-control"><input type="checkbox" id="is_discount_perc" value="1" class="custom-control-input" name="is_discount_perc" checked><label class="custom-control-label" for="is_discount_perc">
												</label></div>
									</td>
									</tr>
									<tr>
									<td style="text-align:right; vertical-align: middle" class="td">Discount :</td>
									<?php if($invoice_hdr['discount_perc'] > 0){ ?>
									<td><input type="text" name="discount_perc" style="width:96%;" class="form-control" id="Discount" value="<?php echo $invoice_hdr['discount_perc']? $invoice_hdr['discount_perc'] : 0.00?>"></td>
									<?php }else{ ?>
									<td><input type="text" name="discount_perc" style="width:96%;" class="form-control" id="Discount" value="<?php echo $settings['discount']? $settings['discount'] : 0.00?>"></td>
									<?php } ?>
									</tr>
									</tbody>
									</table>
									</div>
                                    </div>
									</div>
									</div>
								<input type="hidden" class="form-control" id="payInvoice" name="payInvoice"  autocomplete="off" readonly style="width: 62%" />
									 <div class="pull-right" >
									 <?php if($invoice_hdr['net_amt']==''){ ?>
									<h6 style="font-weight:bold;"><span>Amount Due<?php echo '('.$clientDetails['currency'].')' ;?></span> Rs <font id="DueAmount">0.00</font></h6>
									<?php }else{ ?>
									<h6 style="font-weight:bold;"><span>Amount Due<?php echo '('.$clientDetails['currency'].')' ;?></span> Rs <font id="DueAmount"><?php echo $invoice_hdr['net_amt']; ?></font></h6>
									 <?php } ?>
									  </div>
									  <br></br> 
                                        <div class="position-relative row form-check" style="text-align:right;">
                                            <div class="buttonOptions" style="text-align:right;margin-bottom:20px">
											<div class="col-sm-10 offset-sm-2">
											<div class="saveCancel" style="display:inline-block">
												<button class="mb-2 mr-2 btn btn-primary btn-sm btn-pill save" type="submit">Change</button>
                                            </div>
											 
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
				   </div>  
				   
    <div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Invoice Has Been Saved Successfully</div></div></div>
    <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Invoice Has not Been Saved Successfully</div></div></div>

	
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
<script>
 $(document).ready(function() {
	 $('#AddInvoiceRow').click(function(){
		var 
		table = $('#InvoiceTable'),
		sno = table.find('tbody > tr').length + 1 + '.',
		newRow = table.find('tbody > tr:first').clone();
		newRow.find('td:first').text(sno);
		newRow.css('display', 'none').appendTo( table.find('tbody') ).fadeIn().find(':input').val('');
	});
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

$('#AddNewItem').click(function() { 
     $('.add_item').show();
});
$('#cancel2').click(function() {
        $('#two').hide();
});

$('#AddNewPdt').click(function() { 
			$('.add_product').show();
		});
		$('#cancel_pdt').click(function() {
		  $('.add_product').hide();
		});
		
		/* $(document).ready(function() {
		var myDate = new Date();
			var prettyDate =(myDate.getDate()) + '/' + (myDate.getMonth()+1) + '/' +
					myDate.getFullYear();
		$(".datepicker").val(prettyDate);
	}); */
	
	
	$('#save_pdt').click(function(){
		 	var url= '<?php echo base_url().'client/invoice/product_add1' ?>';
			var pdt_name = $('#pdt_name').val();
			var item_code = $('#item_code').val();
			var stack_items = $('#stack_items').val();
			var amount_pdt = $('#amount_pdt').val();
			var discount_pdt = $('#discount_pdt').val();
			var total_pdt = $('#total_pdt').val();
			var provD = pdt_name + '/' + item_code + '/' + stack_items + '/' + amount_pdt +'/'+discount_pdt+'/'+total_pdt ; 
			var button = $('#save_pdt');
			button.prop('disabled',true);				
			if (pdt_name != "" && stack_items != "" && total_pdt != "" ){
				var provDiag = "provDiag=" + provD;
				$.ajax({
					type: "POST",
					dataType: 'json',
					data : provDiag,
					url: url,
					success: function(data) {
						if(data.status == 'failure'){  
							
						} else if(data.status == 'success') {
							var val = $('#net_amt').val();
							 $(".add_product").hide();
							    var table = $('#InvoiceTable'),
								sno = table.find('tbody > tr').length + 1 + '.';
								var markup = "<tr><td>"+sno+"</td><td><select class='form-control' name='item_id[]'><option value = PR/" + data.itemData + " selected>" + pdt_name + "</option></select>"+
								"</td><td><input type='text' value='' class='form-control' name='item_desc[]' id='item_desc'></td><td><input type='text' value='1' class='form-control' name='item_quantity[]' id='item_quantity'></td><td><input type='text' value="+total_pdt+" name='item_price[]' class='form-control' id='item_price'></td><td><input type='text' class='form-control' value="+total_pdt+" name='item_amount[]' id='item_amount'></td> <td><a href='' id='DeleteRow' class='check-toggler DeleteRow'><button class='mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete'><i class='fa fa-trash-alt'> </i></button></a></td></tr>";
									$("#InvoiceTable tbody").append(markup);
									var	subTotal = 0;
									$('#itemsBody [name="item_amount[]"]').each(function(){
										subTotal += ($(this).val() == '') ? 0.00 :  parseInt( $(this).val() );
									});
									$('#SubTotal').text(subTotal.toFixed(2));
									$('#DueAmount').text((parseInt(val) + parseInt(data.itemData.item_price)).toFixed(2));
									$('#total_amt').val(subTotal.toFixed(2));
									$('#net_amt').val((parseInt(val) + parseInt(data.itemData.item_price)).toFixed(2));
						}
					}, 
					complete: function(){
							
					},
					error: function(e){ // alert error if ajax fails
						alert(e.responseText);
					} 
				 }); //end AJAX
				 }
				 else{
					alert('Please Enter the Product Details.', 'Provisional diagnosis error');
				 }	
		});
		
		
		$('#save_item').click(function(){
		 	var url= '<?php echo base_url().'client/invoice/item_add1' ?>';
			var g_name = $('#item_name').val();
			var tax_perc = $('#item_desc').val();
			var discount_perc = $('#item_price').val();
			var provD = g_name + '/' + tax_perc + '/' + discount_perc ; 
			var button = $('#save_item');
			button.prop('disabled',true);				
					
			if (g_name != ""){
				var provDiag = "provDiag=" + provD;
				$.ajax({
					type: "POST",
					dataType: 'json',
					data : provDiag,
					url: url,
					success: function(data) {
						if(data.status == 'failure'){
							
						} else if(data.status == 'success') {
							var val = $('#net_amt').val();
							  $(".add_item").hide();
							    var table = $('#InvoiceTable'),
								sno = table.find('tbody > tr').length + 1 + '.';
							
								var markup = "<tr><td>"+sno+"</td><td><select class='form-control' name='item_id[]'><option value = " + data.itemData.item_id + " selected>" + data.itemData.item_name + "</option></select>"+
								"</td><td><input type='text' value='' class='form-control' name='item_desc[]' id='item_desc'></td><td><input type='text' value='1' class='form-control' name='item_quantity[]' id='item_quantity'></td><td><input type='text' value="+data.itemData.item_price+" name='item_price[]' class='form-control' id='item_price'></td><td><input type='text' class='form-control' value="+data.itemData.item_price+" name='item_amount[]' id='item_amount'></td> <td><a href='' id='DeleteRow' class='check-toggler DeleteRow'><button class='mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete'><i class='fa fa-trash-alt'> </i></button></a></td></tr>";
									$("#InvoiceTable tbody").append(markup);
									var	subTotal = 0;
									$('#itemsBody [name="item_amount[]"]').each(function(){
										subTotal += ($(this).val() == '') ? 0.00 :  parseInt( $(this).val() );
									});
									$('#SubTotal').text(subTotal.toFixed(2));
									$('#DueAmount').text((parseInt(val) + parseInt(data.itemData.item_price)).toFixed(2));
									$('#total_amt').val(subTotal.toFixed(2));
									$('#net_amt').val((parseInt(val) + parseInt(data.itemData.item_price)).toFixed(2));
						}
					}, 
					complete: function(){
							
					},
					error: function(e){ // alert error if ajax fails
						alert(e.responseText);
					} 
				 }); //end AJAX
				 }
				 else{
					alert('Please Enter the Item Details.', 'Provisional diagnosis error');
				 }	
		});
		
		$(document).on('change', '[name="item_id[]"]', function(){
			
			var 
			$this = $(this),
			id = $this.val(),
			parent = $this.parent().parent();
			var val = id.split('/');
			var items = <?php echo json_encode($items); ?>;
			var product_items = <?php echo json_encode($product_items); ?>;
			var inven_items = <?php echo json_encode($inven_items); ?>;
			if(val[1] === 'undefined' || val[1] == undefined || val[1] == void 0 ){
				parent.find('[name="item_amount[]"]').val(items.jsonData[id].item_amount);
				parent.find('[name="item_price[]"]').val(items.jsonData[id].item_price);
				parent.find('[name="item_desc[]"]').val(items.jsonData[id].item_desc);
				parent.find('[name="item_quantity[]"]').val(1).trigger('keyup');
			} else {
				if(val[0] == 'PR'){
					var prod = val[1];
					parent.find('[name="item_amount[]"]').val(product_items.jsonData[prod].total);
					parent.find('[name="item_price[]"]').val(product_items.jsonData[prod].total);
					parent.find('[name="item_quantity[]"]').val(1).trigger('keyup');
				} else {
					var inven = val[0];
					parent.find('[name="item_amount[]"]').val(inven_items.jsonData[inven].buy_price);
					parent.find('[name="item_price[]"]').val(inven_items.jsonData[inven].buy_price);
					parent.find('[name="item_quantity[]"]').val(1).trigger('keyup');
			    }
			}
		});
		
		$(document).on('keyup', '[name="item_quantity[]"]', function(){
			var
			$this = $(this),
			$thisRow = $this.parents('tr'),
			quantity = ($this.val() == '') ? 0 : parseInt( $this.val() ),
			price = parseFloat( $thisRow.find('[name="item_price[]"]').val() );
			$thisRow.find('[name="item_amount[]"]').val( (price*quantity).toFixed(2) ).trigger('subTotalCalc');
	});
	
	$(document).on('subTotalCalc', '[name="item_amount[]"]', function(){
	var	subTotal = 0;
	$('#itemsBody [name="item_amount[]"]').each(function(){
		subTotal += ($(this).val() == '') ? 0.00 :  parseInt( $(this).val() );
	});
	$('#SubTotal').text(subTotal.toFixed(2));
	$('#total_amt').val(subTotal.toFixed(2));
	$('#Tax').trigger('keyup');
});

$(document).on('keyup', '[name="item_price[]"]', function(){
	var
	$this = $(this),
	$thisRow = $this.parents('tr'),
	price = ($this.val() == '') ? 0 : parseInt( $this.val() ),
	quantity = parseFloat( $thisRow.find('[name="item_quantity[]"]').val() );
	$thisRow.find('[name="item_amount[]"]').val( (price*quantity).toFixed(2) ).trigger('subTotalCalc');
});

$(document).on('keyup', '#Tax', function(){
	var	
	subTotal = parseFloat( $('#SubTotal').text() );
	tax =  ( parseFloat( $(this).val() ) / 100 ) * subTotal;
	$('#DueAmount').text( (subTotal + tax).toFixed(2) );
	checked = $('#is_discount_perc').is(':checked');
	if(checked)
		discount =  ( parseFloat( $('#discount').val() ) / 100 ) * subTotal;
	else
		discount = parseFloat( $('#discount').val() );
        $('#net_amt').val((subTotal + tax - discount).toFixed(2));
	 if($('#paid_amt').val() > 0){
		$('#paid_amt').val((subTotal + tax - discount).toFixed(2));
	}
	SubTotal = subTotal;
	Tax = tax;
	$('#Discount').trigger('keyup');
});

$(document).on('keyup', '#Discount', function(){
	var	
	subTotal = parseFloat( $('#SubTotal').text() );
	var	
	tax =  ( parseFloat( $('#Tax').val() ) / 100 ) * subTotal;
	var	
	dueAmount = (subTotal + tax);
	checked = $('#is_discount_perc').is(':checked');
	if(checked)
		discount =  ( parseFloat( $(this).val() ) / 100 ) * subTotal;
	else
		discount = parseFloat( $(this).val() );
	
	$('#DueAmount').text( (dueAmount - discount).toFixed(2) );
	$('#net_amt').val((dueAmount - discount).toFixed(2));
	if($('#paid_amt').val() > 0){
		$('#paid_amt').val((dueAmount - discount).toFixed(2));
	}
});

$('#is_discount_perc').change(function () {
	$('#Tax').trigger('keyup');
	$('#Discount').trigger('keyup');
});

$(document).ready(function() {
  $('form').on('submit', function (event) {
         event.preventDefault();
		 var $form = $(this);
		var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var button = $('.save');
		 button.prop('disabled',true);
		$.ajax({
            type: 'post',
            url: $(this).attr('action'),
			data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				$('#toast-container').show();
				setTimeout(function(){ 
				$('.md-close btn btn-default').click();
				window.location.href="<?php echo base_url().'client/invoice/views'?>"
				}, 1000);
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$('#toast-container1').delay(5000).fadeOut(400);
				setTimeout(function(){ 
				$('.md-close btn btn-default').click();
				window.location.reload();
				}, 1000);
			}
      });

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
