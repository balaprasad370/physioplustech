<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Add Invoice - Physio Plus Tech </title>
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
                                <div class="card-body"><h5 class="card-title"> New Invoice
								</h5>
                                    <form class="" action="<?php echo base_url().'client/invoice/add_invoice1' ?>" method="post"  role="form" parsley-validate id="signupForm">
                                         <?php $id1 = $this->uri->segment(6);
										$this->db->where('appointment_id',$id1);
										$this->db->select('ai.start,ai.staff_id,si.first_name,si.last_name')->from('tbl_appointments ai');
										$this->db->join('tbl_staff_info si','si.staff_id = ai.staff_id');
										$res = $this->db->get();
										if($res->result_array() != false){
											$start = $res->row()->start;
											$staff_id = $res->row()->staff_id;
											$name = $res->row()->first_name.' '.$res->row()->last_name;
										} ?>
										<div class="form-row">
                                            <div class="col-md-6" id="selectbox">
                                                <div class="position-relative form-group"><label for="vendor" class="">Patient Name *</label>
												 <select class="multiselect-dropdown form-control" name="patient_id" parsley-trigger="change" parsley-required="true" parsley-error-container="#selectbox" id="Patient">
                                            <?php  
												$id = $this->uri->segment(5);
												if($id != false) { 
												$this->db->where('patient_id',$id);
												$this->db->select('first_name,patient_code,last_name,age')->from('tbl_patient_info');
												$res = $this->db->get();
												$patient_name = $res->row()->first_name.' '.$res->row()->last_name;
												$age = $res->row()->age;
												$code = $res->row()->patient_code; ?>
												<option value="<?php echo $id ?>" <?php echo 'selected="selected"' ?> ><?php echo $patient_name.' '.'('.$code.')'. $age; ?></option>
												<?php } else {  ?>
												<option value="" selected disabled="disabled" style="width:520px;">Select Your Patient Name</option>
												<?php	if ($patient_name!=false) {
														foreach ($patient_name as $patient_names) {
															$last_name = ($patient_names['last_name'] == '') ? '' : ucfirst($patient_names['last_name']);
															$age = ($patient_names['age'] == '0') ? '' : '('.$patient_names['age'].')';
															echo '<option value="'.$patient_names['patient_id'].'">'.$patient_names['first_name'].' '.$last_name.'   ('.$patient_names['patient_code'].')  '.$age.'</option>';
														}
													}
												}
											?>
											</select>
											
												</div>
												<a id="add_pat" class="mb-2 mr-2 btn btn-pill add_pat" style="color:white;padding-top: 5px;background-color:#3f6ad8;">Add New Patient
                                             </a>
                                            </div>
											
											
											 
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="bill_no" class="">Staff Name *</label>
												<select class="multiselect-dropdown form-control" name="staff_id" id="staff_id" parsley-trigger="change" parsley-required="true" >
												<optgroup label="Please Select">
												  </optgroup>
												  <option> </option>
													<?php if($id1 != ''){
														echo '<option value="'.$staff_id.'" selected>'.$name.'</option>';
														} else {
														}		
														foreach ($consultants as $consult) {
														echo '<option value="'.$consult['staff_id'].'">'.$consult['first_name'].' '.$consult['last_name'].'</option>';
													}
													?>
										 
													</select>
												</div>
                                            </div>
                                        </div>
										
										<div class="form-row pt_add alert alert-info" style="diplay:none;">
                                             <div class="col-md-6">
                                                 <div class="position-relative form-group"><label for="full_name">Name</label> 
												  <input name="full_name" id="full_name" type="text" class="form-control" placeholder="Enter Name">
												</div>
												
                                             </div>
											 
										
										<div class="col-md-6">
										<label for="due_date" class="" style="text-align:center;">Gender *</label></br>
										<div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-shadow btn-outline-primary">
                                                        <input type="radio" name="gender" id="gender" value="male" > 
                                                       Male 
                                                    </label>
                                                    <label class="btn btn-shadow btn-outline-primary">
                                                        <input type="radio" name="gender" id="gender1" value="female" > 
                                                       Female 
                                                    </label>
								             </div>
											 
											 </div>
											 
											 <div class="col-md-6">
										<label for="due_date" class="" style="text-align:center;">Patient Type *</label></br>
										<div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-shadow btn-outline-primary">
                                                        <input type="radio" name="category" id="category" value="1"> 
                                                     OP Patient
                                                    </label>
                                                    <label class="btn btn-shadow btn-outline-primary">
                                                        <input type="radio" name="category" id="category1" value="2" > 
                                                       Home Patient
                                                    </label>
								             </div>
											 
											 </div>
											 
											 
											  <div class="col-md-6">
                                                 <div class="position-relative form-group"><label for="mobile_no">Mobile No</label> 
												  <input name="mobile_no" id="mobile_no" type="text" class="form-control" placeholder="Enter Mobile Number" maxlength="10">
												</div>
												
                                             </div>
											 
  
											 
											  <div class="col-md-6">
                                                 <div class="position-relative form-group"><label for="email">Email</label> 
												  <input name="email" id="email" type="text" class="form-control" placeholder="Enter Email">
												</div>
												<div class="form-group">
												<a id="save" class="mb-2 mr-2 btn-pill btn btn-primary save_pat" style="color:white;">Submit</button></a>
												<a id="cancel_pat" class="mb-2 mr-2 btn-pill btn btn-danger cancel_pat" style="color:white;">Cancel</button></a>
												</div>
                                             </div>
											 </div>
										
										
										<div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="bill_no" class="">Bill Date</label>
												<input name="bill_date" placeholder="" type="text" class="form-control datepicker" data-toggle="datepicker"></div>
                                            </div>
											
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="bill_no" class="">Due Date</label>
												<input name="due_date" id="due_date" type="text" class="form-control datepicker" data-toggle="datepicker">
												</div>
                                            </div>
                                        </div>
										
										
										<div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="vendor" class="">Appointment</label>
												<select class="multiselect-dropdown form-control" name="appointment_id" id="appointment_id">
                                        <optgroup label="Please Select">
										<option value="0">None</option>
										
										<?php if($id1 != ''){
										//echo '<option value="'.$id1.'" selected>'.$start.' ( No bill generated ) </option>';
										echo '<option value="'.$id1.'" selected>'.$start.' </option>';
										} else {
										}											
										if($apts != false){
										    foreach ($apts as $consult) {
											 if($consult['bill_id'] == 0) { 
												//echo '<option value="'.$consult['appointment_id'].'">'.$consult['start'].' ( No bill generated ) </option>';
												echo '<option value="'.$consult['appointment_id'].'">'.$consult['start'].'</option>'; 
											} else { 
												echo '<option value="'.$consult['appointment_id'].'">'.$consult['start'].'</option>';
											 } 
											}
										}
										?>
							            </optgroup>
											</select>
												</div>
                                            </div>
											 <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="vendor" class="">Bill No.</label>
												<input name="bill_no" id="bill_no" type="text" class="form-control" readonly></div>
                                            </div>
                                             
                                        </div>
										<div class="form-row">
                                            
											
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="vendor" class="">Subheading</label>
												<input name="subheading" id="subheading" type="text" class="form-control subheading" autocomplete="off">
												</div>
                                            </div>
											
											 
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="bill_no" class="">Footer</label>
												<input name="inv_footer" id="inv_footer" type="text" class="form-control footer" value="<?php echo $note['footer']; ?>">
												</div>
                                            </div>
											
                                        </div>
										<!--<div class="form-row">
                                            
											
											 <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="vendor" class="">Notes</label>
												<input name="notes" id="notes" type="text" class="form-control" value="<?php echo $note['note']; ?>">
												</div>
                                            </div>
                                        </div> -->
										  
									   
										
										<input type="hidden" class="form-control" id="total_amt" name="total_amt" readonly  />
										<input type="hidden" class="form-control" id="net_amt" name="net_amt"  />
					  
										 
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
												<button class="mb-2 mr-2 btn btn-pill btn-primary btn-pill btn-sm" type="submit" id="save_pdt">Save</button>
												<button class="mb-2 mr-2 btn btn-pill btn-danger btn-pill btn-sm" type="button" id="cancel_pdt">Cancel</button>
										    </div>
											
										</div>
										
										<div class="col-md-12 add_item" id="two">
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
												<button class="mb-2 mr-2 btn btn-pill btn-primary btn-pill btn-sm" type="submit" id="save_item">Save</button>
												<button class="mb-2 mr-2 btn btn-pill btn-danger btn-pill btn-sm" type="button" id="cancel2">Cancel</button>
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
												<th>Price (INR)</th>
												<th>Amount (INR)</th>
												<th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody id="itemsBody">
                                            <tr>
                                                <td scope="row">1</td>
                                                 
                                                <td id="selectbox2">
												<select class="form-control" name="item_id[]" id="item_id" parsley-trigger="change" parsley-required="true" parsley-error-container="#selectbox2">
												<option value ="" >Please Select</option>
								                <?php  
												 $item_names = $items['arrayData']; 
												 if ($items['status'] == 'success') {
													foreach ($item_names as $item_name) {
														echo '<option value="'.$item_name['item_id'].'">'.$item_name['item_name'].'</option>';
													}
												}
												 foreach ($products as $products_item) {
														echo '<option value="PR/'.$products_item['product_id'].'/'.$products_item['stack_items'].'">'.$products_item['item_name'].'</option>';
												} 
												foreach ($inventory as $inventory_item) {
														echo '<option value="'.$inventory_item['color_code'].'/'.$inventory_item['inventory_id'].'">'.$inventory_item['pro_name'].'('.$inventory_item['size'].')'.'('.$inventory_item['variant_value'].')'.'</option>';
												 }
											?>
											</select>
												</td>
												
											  <td><input type="text" value="" class="form-control item_desc" value="" name="item_desc[]" id="item_desc"></td>
											  <td> <input type="text"  class="form-control item_quantity" value="" name="item_quantity[]" ></td>
											  <td><input type="text"  class="form-control item_price" value="" name="item_price[]" ></td>
											  <td><input type="text"  class="form-control item_amount" value="" name="item_amount[]" ></td>
											 
												<td><a href="" id="DeleteRow" class="check-toggler DeleteRow"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete"><i class="fa fa-trash-alt"> </i></button>
                                            </button></a></td>
                                            </tr>
                                            
                                            </tbody>
                                        </table>
                                    </div>
									</br> 
									<div class="col-md-12">
									<div class="form-row">
                                            
											
									<div class="col-md-6">
                                    <div class="position-relative form-group"><label for="vendor" class="">Notes</label>
									<textarea rows="3" class="form-control autosize-input form-rounded" style="height: 200px;background-color:LemonChiffon;" id="notes" name="notes" placeholder="Notes"><?php echo $note['note']; ?></textarea>
									</div>
									</div>
                                        
										 <div class="col-md-6">
									<div class="table-responsive">
									<table class="mb-0 table">
									<tbody>
									<tr>
									<td class="width30 td" style="text-align:right; vertical-align: middle">Subtotal :</td>
									<td class="width70" style="line-height: 28px"><strong>Rs <font id="SubTotal">0.00</font></strong></td>
									</tr>
									<tr>
									<td class="td" style="text-align:right; vertical-align: middle">Tax(%) :</td>
									<td><input type="text" name="tax_perc" style="width:96%;" class="form-control" id="Tax" value=""></td>
									</tr>
									<tr>
									<td class="td" style="text-align:right; vertical-align: middle">Is discount percentage :</td>
									<td>
									<div class="custom-checkbox custom-control"><input type="checkbox" id="is_discount_perc" value="1" class="custom-control-input" name="is_discount_perc" checked><label class="custom-control-label" for="is_discount_perc">
                                    </label></div>
									 
									</td>
									</tr>
									<tr>
									<td class="td" style="text-align:right; vertical-align: middle">Discount :</td>
									<td><input type="text" name="discount_perc" style="width:96%;" class="form-control" id="Discount" value=""></td>
									</tr>
									</tbody>
									</table>
									</div>
									
									</div>
									
									</div>
									</div>
					
								<input type="hidden" class="form-control" id="payInvoice" name="payInvoice"  autocomplete="off" readonly style="width: 62%" />
								<div class="pull-right" >
								<h6 style="font-weight:bold;"><span>Amount Due :</span> Rs  <font id="DueAmount">0.00</font></h6>
								</div><br></br> 
                                        <div class="position-relative row form-check" style="text-align:right;">
                                            <div class="buttonOptions" style="text-align:right;margin-bottom:20px">
											<div class="col-sm-10 offset-sm-2">
											<div class="payInv" style="display:inline-block">
												<a href="#registration"><button class="mb-2 mr-2 btn btn-pill btn-gradient-primary btn-sm" id="PayInvoice" type="button">Make Payment</button></a>
                                            </div>
											<div class="saveCancel" style="display:inline-block">
												<button class="mb-2 mr-2 btn btn-pill btn-success btn-sm submit" type="submit" id="submit">Save & Pay later</button>
												<button class="mb-2 mr-2 btn btn-pill btn-danger btn-sm" type="reset">Cancel</button>
										    </div>
                                            </div>
											</div>
                                        </div>
										
										<div class="pmtCash" style="display:none" id="registration">
										
										
										<div class="table-responsive">
										<table class="mb-0 table">
										<tbody>
										<tr>
										<td class="width30" style="text-align:right; vertical-align: middle">Payment Date :</td>
										<td class="width70" style="line-height: 28px"><input type="text"  class="form-control datepicker" id="payment_date" name="payment_date" readonly   data-date-format='D/M/YYYY' data-toggle="datepicker"></td>
										</tr>
										<tr>
										<td style="text-align:right; vertical-align: middle">Payment Mode :</td>
										<td>
										<select class="form-control" name="payment_mode" placeholder="Choose Your Payment" id="payment_mode">
										<option></option>
										<option value="Cash">Cash</option>
									<option value="Cheque" >Cheque</option>
									<option value="Card payment" >Card payment</option>
									<option value="Advance" >Advance</option>
									<option value="Paytm" >Paytm</option>
									<option value="Gpay" >Gpay</option>
									<option value="Phonepe" >Phonepe</option>
										</select>
										</td>
										</tr>
										<tr>
										<td style="text-align:right; vertical-align: middle">Amount <?php echo '('.$clientDetails['currency'].')' ;?></td>
										<td><input type="text" class="form-control" id="paid_amt" name="paid_amt" /></td>
										</tr>
										</tbody>
										</table>
										</div>
										</div>
										
										
						<div class="pmtAdvance" style="display:none">
						<div class="table-responsive">
                        <table class="mb-0 table">
                        <tbody>
                        <tr>
                        <td  style="text-align:right; vertical-align: middle">Adv. In Hand :</td>
                        <td ><input type="text"  class="form-control" id="advance_in_hand" name="advance_in_hand" readonly  autocomplete="off"></td>
                        </tr>
                        </tbody>
                        </table>
						</div>
						</div>
						
						
						<div class="pmtCard" style="display:none">
						<div class="table-responsive">
                        <table class="mb-0 table">
                        <tbody>
                        <tr>
                        <td class="width30" style="text-align:right; vertical-align: middle">Card no.</td>
                        <td class="width70" style="line-height: 28px"><input type="text"  class="form-control" id="card_no" name="card_no" ></td>
                        </tr>
						<tr>
                        <td class="width30" style="text-align:right; vertical-align: middle">Name of the card</td>
                        <td class="width70" style="line-height: 28px"><input type="text"  class="form-control" id="card_name" name="card_name"   ></td>
                        </tr>
                        </tbody>
                        </table>
						</div>
						</div>
						
						<div class="pmtCheque" style="display:none">
						<div class="table-responsive">
                        <table class="mb-0 table">
                        <tbody>
                        <tr>
                        <td class="width30" style="text-align:right; vertical-align: middle">Cheque no.</td>
                        <td class="width70" style="line-height: 28px"><input type="text"  class="form-control" id="cheque_no" name="cheque_no"   autocomplete="off"></td>
                        </tr>
						<tr>
                        <td class="width30" style="text-align:right; vertical-align: middle">Date :</td>
                        <td class="width70" style="line-height: 28px"><input type="text"  class="form-control datepicker" id="cheque_date" name="cheque_date" readonly   data-date-format='D/M/YYYY' data-toggle="datepicker"></td>
                        </tr>
						<tr>
                        <td class="width30" style="text-align:right; vertical-align: middle">Bank</td>
                        <td class="width70" style="line-height: 28px"><input type="text"  class="form-control" id="bank" name="bank"  autocomplete="off"></td>
                        </tr>
                        </tbody>
                        </table>
						</div>
						</div>
						
						<div class="table-responsive">
                        <table class="mb-0 table">
						<tbody>
                        <tr>
						<div class="continueOptions" style="display:none;text-align:right;">
												<button class="mb-2 mr-2 btn btn-primary btn-pill btn-sm" type="submit" id="continue">Continue</button>
												<button class="mb-2 mr-2 btn btn-danger btn-pill btn-sm" type="button" id="cancel1">Cancel</button>
										    </div>
						</tr>
						</tbody>
						</table>
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
				   
    <div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Invoice Has Been Added Successfully</div></div></div>
    <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Invoice Has not Been Added Successfully</div></div></div>

	
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script></body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
 
<script>
	$(".footer").attr("placeholder", "Enter Your  Footer");
	$(".subheading").attr("placeholder", "Enter Your  Subheading");
	$(".notes").attr("placeholder", "Enter Your  Notes");
	$(".email").attr("placeholder", "Enter Your  Email Address");
	$(".payment").attr("placeholder", "Choose Your Payment Mode");
	
	  $(document).ready(function() {
		var myDate = new Date();
			var prettyDate =(myDate.getDate()) + '/' + (myDate.getMonth()+1) + '/' +
					myDate.getFullYear();
		$(".datepicker").val(prettyDate);
	});
      
  $('#AddInvoiceRow').click(function(){
		var 
		table = $('#InvoiceTable'),
		sno = table.find('tbody > tr').length + 1 + '.',
		newRow = table.find('tbody > tr:first').clone();
		newRow.find('td:first').text(sno);
		newRow.css('display', 'none').appendTo( table.find('tbody') ).fadeIn().find(':input').val('');
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
	
	
	$(document).on('change', '[name="item_id[]"]', function(){
			
			var 
			$this = $(this),
			id = $this.val(),
			parent = $this.parent().parent();
			var val = id.split('/');
			var product_items = <?php echo json_encode($product_items); ?>;
			var items = <?php echo json_encode($items); ?>;
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
						parent.find('[name="item_amount[]"]').val(inven_items.jsonData[inven].retail_price);
						parent.find('[name="item_price[]"]').val(inven_items.jsonData[inven].retail_price);
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
			var id = $thisRow.find('[name="item_id[]"]').val();
			var val = id.split('/');
			if(val[1] === 'undefined' || val[1] == undefined || val[1] == void 0 ){
				$thisRow.find('[name="item_amount[]"]').val( (price*quantity).toFixed(2) ).trigger('subTotalCalc');
			} 
			else {
				 if(val[0] == 'PR'){
					if(val[2] > quantity){
						$thisRow.find('[name="item_amount[]"]').val( (price*quantity).toFixed(2) ).trigger('subTotalCalc');
				    } else {
						alert('Available Items only '+val[2]);
						$thisRow.find('[name="item_quantity[]"]').val(val[2]);
						$thisRow.find('[name="item_amount[]"]').val( (price*val[2]).toFixed(2) ).trigger('subTotalCalc');
					}
				} else { 
					var inven_items = <?php echo json_encode($inven); ?>;
					var inven = val[1];
					var order = inven_items.jsonData[inven].sale_order;			   
					if(parseInt(order) == parseInt(quantity) || parseInt(order) < parseInt(quantity) ){
					   var value = (inven_items.jsonData[inven].wholesale_price);
					   var value3 = quantity * value;
					   $thisRow.find('[name="item_amount[]"]').val(value3).trigger('subTotalCalc');
					 }
					else {
						$thisRow.find('[name="item_amount[]"]').val( (price*quantity).toFixed(2) ).trigger('subTotalCalc');
					}
				}
			}				
	});
	
 $(document).on('keyup', '[name="item_price[]"]', function(){
	var
	$this = $(this),
	$thisRow = $this.parents('tr'),
	price = ($this.val() == '') ? 0 : parseInt( $this.val() ),
	quantity = parseFloat( $thisRow.find('[name="item_quantity[]"]').val() );
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

 
$(document).on('keyup', '#Tax', function(){
	var	
	subTotal = parseFloat( $('#SubTotal').text() );
	tax =  ( parseFloat( $(this).val() ) / 100 ) * subTotal;
	$('#DueAmount').text( (subTotal + tax).toFixed(2) );
	$('#net_amt').val((subTotal + tax).toFixed(2));
	if($('#paid_amt').val() > 0){
		$('#paid_amt').val((subTotal + tax).toFixed(2));
	}
	SubTotal = subTotal;
	Tax = tax;
	$('#Discount').trigger('keyup');
});
	 
$(document).on('keyup', '#Discount', function(){
	var	
	dueAmount = (SubTotal + Tax);
	checked = $('#is_discount_perc').is(':checked');
	if(checked)
		discount =  ( parseFloat( $(this).val() ) / 100 ) * dueAmount;
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

  $(document).on('click', '#PayInvoice', function(){
	var
	hiddenValue = 1;
	$('.pmtCash').fadeIn();
	$('.pmtCheque').fadeOut();
	$('.continueOptions').fadeIn();
	$('.buttonOptions').fadeOut();
	var net_amt=$('#net_amt').val();
	$('#paid_amt').val(net_amt);
	$('#payInvoice').val(hiddenValue);
	//$('#payment_mode').trigger('change');
	var p_mode = $('#payment_mode').val();
	 
	if(p_mode ==''){
		$('#payment_mode').val('Cash'); 
		
	}
	else{
		$('#payment_mode').trigger('change');
	}
});

$(document).on('click', '#cancel1', function(){
	$("#payInvoice").val('');
	$( ".pmtCash" ).fadeOut( "speed", function() {
		$("#payment_date").val('');
		$("#payment_mode").val('');
		$("#paid_amt").val(''); 
	});
	$( ".pmtCheque" ).fadeOut( "speed", function() {
		$("#cheque_no").val('');
		$("#cheque_date").val('');
		$("#bank").val('');
	});
	$( ".pmtCard" ).fadeOut( "speed", function() {
		$("#card_no").val('');
		$("#card_name").val('');
	});
	$( ".pmtAdvance" ).fadeOut( "speed", function() {
		$("#advance_in_hand").val('');
	});
	$('.continueOptions').fadeOut();
	$('#submit').show();
	$('#PayInvoice').show();
	$('#cancel').show();
});

$(document).on('change', '#payment_mode', function(){
	if($("#payment_mode").val()=='Cash'){
		$('.pmtCash').fadeIn();
		$('.pmtCheque').fadeOut();
		$('.pmtAdvance').fadeOut();
		$('.pmtCard').fadeOut();
		$('.continueOptions').fadeIn();
		$('.buttonOptions').fadeOut();
	}else if($("#payment_mode").val()=='Cheque'){
		$('.pmtCash').fadeIn();
		$('.pmtCheque').fadeIn();
		$('.pmtAdvance').fadeOut();
		$('.pmtCard').fadeOut();
		$('.continueOptions').fadeIn();
		$('.buttonOptions').fadeOut();
	}else if($("#payment_mode").val()=='Card payment'){
		$('.pmtCash').fadeIn();
		$('.pmtCheque').fadeOut();
		$('.pmtAdvance').fadeOut();
		$('.pmtCard').fadeIn();
		$('.continueOptions').fadeIn();
		$('.buttonOptions').fadeOut();
	}else if($("#payment_mode").val()=='Paytm'){
			$('.pmtCash').fadeIn();
			$('.pmtAdvance').fadeOut();
			$('.pmtCheque').fadeOut();
			$('.pmtCard').fadeOut();
			$('.continueOptions').fadeIn();
		    $('.buttonOptions').fadeOut();
		}
		else if($("#payment_mode").val()=='Gpay'){
			$('.pmtCash').fadeIn();
			$('.pmtAdvance').fadeOut();
			$('.pmtCheque').fadeOut();
			$('.pmtCard').fadeOut();
			$('.continueOptions').fadeIn();
		    $('.buttonOptions').fadeOut();
		}
	else if($("#payment_mode").val()=='Advance'){
		$('.pmtCash').fadeIn();
		$('.pmtAdvance').fadeIn();
		$('.pmtCheque').fadeOut();
		$('.pmtCard').fadeOut();
		$('.continueOptions').fadeIn();
		$('.buttonOptions').fadeOut();
		var
		patient_id = $('#Patient').val();
        url = '<?php echo base_url().'client/advance/getAdvanceBalance/' ?>' + patient_id;
		if (patient_id != ""){
			$.ajax({
				type: "POST",
				dataType: 'json',
				url: url, //The url where the server req would we made.
					success: function(data) { 
					     $('#advance_in_hand').val(data.advanceAmount);
						 
					}, 
					error: function(){ // alert error if ajax fails
						
					} 
			 }); //end AJAX
		}
	}else{
		$('.buttonOptions').fadeIn();
	}
});	


$('#Patient').change(function() {
			var Patient = $('#Patient').val();
			var url= '<?php echo base_url().'client/bill/apt_details' ?>';
			var provD = Patient; 
			var id = $('#Patient').val();
			if (provD != ""){
				$.ajax({
					type: "POST",
					dataType: 'json',
					data : {ref_id:id},
					url: url,  
					success: function(data) {
						if(data.status == 'failure'){
						} else if(data.status == 'success') {
							 $('#Tax').val('0.00');
							 $('#Discount').val('0.00');
							 $('#DueAmount').text('0.00');
							 $('#net_amt').val('0.00');
							 $('#paid_amt').val('0.00');
							 $('#appointment_id').empty();
							 var newOption = $('<option value="0">None</option>');
							  $('#appointment_id').append(newOption);
							  $('#appointment_id').trigger("chosen:updated");
							 for(var i = 0;i < data.referalData.length; i++){
								 if(data.referalData[i].bill_id == 0) {
								     var newOption = $('<option value = ' + data.referalData[i].appointment_id + '>' + data.referalData[i].start + ' ( No bill generated ) </option>');  
								 } else {
									  var newOption = $('<option value = ' + data.referalData[i].appointment_id + '>' + data.referalData[i].start + '</option>');
								 } $('#appointment_id').append(newOption);
								  $('#appointment_id').trigger("chosen:updated");
							  }
						}
					}, 
					complete: function(){
							
					},
					error: function(e){ // alert error if ajax fails
						alert(e.responseText);
					} 
				 });
			} 
		});
		
$('#staff_id').change(function() {
			var Patient = $('#Patient').val();
			var url= '<?php echo base_url().'client/patient/get_concess_det' ?>';
			var provD = Patient; 
			if (provD != ""){
				
			 	var provDiag = "provDiag=" + provD;
				$.ajax({
					type: "POST",
					dataType: 'json',
					data : provDiag,
					url: url,
					success: function(data) {
						if(data.status == 'failure'){
						} else if(data.status == 'success') {
							var val = data.tax_detail.tax;
								$('#Tax').val(val);
								var val1 = data.tax_detail.discount;
								$('#Discount').val(val1);
								var val2 =$('#SubTotal').text(); 
								
							  if(val2 != '' && val2 != '0.00'){
								var	
								dueAmount = parseFloat( val2 ) + parseFloat( val );
								checked = $('#is_discount_perc').is(':checked');
								if(checked)
									discount =  ( parseFloat( $('#Discount').val() ) / 100 ) * dueAmount;
								else
									discount = parseFloat( $('#Discount').val() );
								
								$('#DueAmount').text( (dueAmount - discount).toFixed(2) );
								$('#net_amt').val((dueAmount - discount).toFixed(2));
								if($('#paid_amt').val() > 0){
								$('#paid_amt').val((dueAmount - discount).toFixed(2));
								}
							  }
						}
					}, 
					complete: function(){
							
					},
					error: function(e){ 
						alert(e.responseText);
					} 
				 });
			} 
		});
		



 $('form').on('submit', function (event) {
			 event.preventDefault();
     		 var val = $('#Patient').val();
			 var val1 = $('#staff_id').val();
			 var val2 = $('#item_id').val();
			 var $form = $(this);  
			 if(val != false && val1 != false && val2 != false){
			 $('#continue').attr('disabled',true);  
			 var payment_mode = $('#payment_mode').val();
			 var balance = $('#advance_in_hand').val(); 
			 var paid =  $('#paid_amt').val();
			 if(payment_mode == 'Advance' && parseInt(balance) >= paid){
					 var  formID = $(this).attr("id");
					 var  formURL = $(this).attr("action");
					 var button = $('#submit');
					 button.prop('disabled',true);	
					$.ajax({
						type: 'post',
						url: $(this).attr('action'),
						data:$(this).serialize(),
						success:function(data, textStatus, jqXHR,form) 
						{	
						  $('#toast-container').show();
							setTimeout(function(){ 
								window.location="<?php echo base_url().'client/invoice/views' ?>";
							}, 1000);
							
						},
						error: function(jqXHR, textStatus, errorThrown) 
						{
							$('#toast-container1').delay(5000).fadeOut(400);
							setTimeout(function(){ 
								window.location="<?php echo base_url().'client/invoice/add' ?>";
							}, 1000);
						}
				  });
				} else if(payment_mode != 'Advance') {
				   var  formID = $(this).attr("id");
					 var  formURL = $(this).attr("action");
					 var button = $('#submit');
					 button.prop('disabled',true);				
							
					$.ajax({
						type: 'post',
						url: $(this).attr('action'),
						data:$(this).serialize(),
						success:function(data, textStatus, jqXHR,form) 
						{	
						  $('#toast-container').show();
							setTimeout(function(){ 
								window.location="<?php echo base_url().'client/invoice/views' ?>";
							}, 1000);
							
						},
						error: function(jqXHR, textStatus, errorThrown) 
						{
							$('#toast-container1').delay(5000).fadeOut(400);
							setTimeout(function(){ 
								window.location="<?php echo base_url().'client/invoice/add' ?>";
							}, 1000);
						}
				  });
				} else {
					$('#paid_amt').val(balance);
			        alert('This patient advance is not enough to make payment');
					$('#continue').attr('disabled',false);  
				}
	} else {
		
		if(val1 == undefined || val1 == ''){
			$('.staff_req').show();
		}if(val2 == undefined || val2 == ''){
			$('.item_req').show();
		} if(val == undefined || val == '' || val == false){
			$('.patient_req').show();
		}			
	}
				  
	}); 
	
	 $('.add_item').hide();
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
									$('#DueAmount').text(subTotal.toFixed(2));
									$('#total_amt').val(subTotal.toFixed(2));
									$('#net_amt').val(subTotal.toFixed(2));
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
		$('#Tax').val('0.00');
		$('#Discount').val('0.00');
		
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
							 $(".add_item").hide();
							  var newOption = $('<option value = ' + data.itemData.item_id + '>' + data.itemData.item_name + '</option>');
							  $('#item_id').append(newOption);
							  $('#item_id').trigger("chosen:updated");
							  $('#item_desc').val(); 
							  var opt = $('#item_price').val(data.itemData.item_price);
                              $('#item_quantity').val(1); 							  
						      $('#item_amount').val(data.itemData.item_price);
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
									$('#DueAmount').text(subTotal.toFixed(2));
									$('#total_amt').val(subTotal.toFixed(2));
									$('#net_amt').val(subTotal.toFixed(2));
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
		
		$('.pt_add').hide();
		$(document).ready(function() {
			 $('.add_pat').click(function() {
				 $('.pt_add').show();
			 });
			 
			 $('#cancel_pat').click(function(){
			$('.pt_add').hide();
		});
		
		});
		
		
		$('.save_pat').click(function(){
			var url= '<?php echo base_url().'client/invoice/add_Pat' ?>';
			var name = $('#full_name').val();
			var email = $('#email').val();
			var mobile = $('#mobile_no').val();
			var gender = $("input[name='gender']:checked").val();
			var type = $("input[name='category']:checked").val();
			var provD = name + '/' + email +'/' + mobile+'/'+gender+'/'+type; 
			if (name != ""){
				var provDiag = "provDiag=" + provD;
				$.ajax({
					type: "POST",
					dataType: 'json',
					data : provDiag,
					url: url,
					success: function(data) {
						if(data.status == 'failure'){
							
						} else if(data.status == 'success') {
							$(".pt_add").hide();
							//alert(data.PatientData.patient_id);
							  var newOption = $('<option value = ' + data.PatientData.patient_id + ' selected>' + data.PatientData.first_name + '(' + data.PatientData.patient_code  + ')</option>');
							  $('#Patient').append(newOption);
							  $('#Patient').trigger("chosen:updated");
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
					alert('Please Enter the Basic Details.', 'Provisional diagnosis error');
				 }	
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
</html>
