<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Edit Expense - Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="msapplication-tap-highlight" content="no">
	<link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
	<link href="<?php echo base_url()?>asset_list/main.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/jquery.jgrowl.min.css">
<style>
.parsley-error-list{
	color:red;
	list-style-type:none;
}
label, th, .td{
	font-weight:bold;
	color:#3f6ad8;
}
.custom-control-label{
	color:#000000;
	font-weight:400;
}
</style>
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
 <?php include("sidebar.php");?>
           <div class="app-main__outer">
                <div class="app-main__inner">
                        <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Edit Expense</h5>
                                    <form class=""method="post" action="<?php echo base_url().'client/bill/add_expanse/'.$this->uri->segment('4'); ?>" parsley-validate role="form" id="signupForm">
									<?php foreach($expanseinfo as $expinfo){ ?>  
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="vendor" class="">Vendor Name *</label>
												<input name="vendor" id="vendor" placeholder="Vendor Name" value="<?php echo $expinfo['ventor'] ?>" type="text" class="form-control" parsley-trigger="change" parsley-required="true" autocomplete="off" style="text-transform: capitalize;"></div>
                                            </div>
											 
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="bill_no" class="">Bill No</label>
												<input name="bill_no" id="bill_no" placeholder="" type="text" value="<?php echo $expinfo['bill_no'] ?>" class="form-control" readonly></div>
                                            </div>
                                        </div>
										<div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="bill_date" class="">Date </label>
												<input name="bill_date" id="bill_date" placeholder="<?php echo $expinfo['bill_date'] ?>" type="text" value="<?php echo date('d-m-Y',strtotime($expinfo['bill_date']));?>" data-date-format='D/M/YYYY' class="form-control datepicker" data-toggle="datepicker"></div>
                                                <input type="hidden" name="bill_date1"  placeholder="" value="<?php echo $expinfo['bill_date'] ?>"   id="bill_date1">
											</div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="due_date" class="">Due Date </label>
												<input name="due_date" id="due_date" placeholder="<?php echo $expinfo['due_date'] ?>" value="<?php echo date('d-m-Y',strtotime($expinfo['due_date']));?>" type="text" data-date-format='D/M/YYYY' class="form-control datepicker" data-toggle="datepicker"></div>
                                                <input type="hidden" name="due_date1"  value="<?php echo $expinfo['due_date'] ?>"   id="due_date1">
											</div>
                                        </div>
										<div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="po" class="">P.O. / S.O</label>
												<input name="po" id="po" placeholder="P.O. / S.O" type="text"  class="form-control" value="<?php echo $expinfo['POSO'] ?>" autocomplete="off"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="notes" class="">Notes</label>
												<textarea rows="3" class="form-control autosize-input form-rounded" style="height: 77px;" id="notes" name="notes" placeholder="Notes" autocomplete="off"><?php echo $expinfo['notes'] ?></textarea></div>
                                            </div>
                                        </div>
										
										<div class="form-row">
										<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="Purchase" class="">Is this Expense a Products Purchase?</label>
												 &nbsp;&nbsp;&nbsp;&nbsp; 
												<div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label <?php if($expinfo['purchase'] == 'yes') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
                                                        <input type="radio" name="Purchase" id="Purchase" value="yes" <?php echo ($expinfo['purchase']=='yes')?'checked':'' ?>> 
                                                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </label>
                                                    <label <?php if($expinfo['purchase'] == 'no') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
                                                        <input type="radio" name="Purchase" id="Purchase1" value="no" <?php echo ($expinfo['purchase']=='no')?'checked':'' ?>> 
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No&nbsp;&nbsp;&nbsp;
                                                    </label>
								             </div>
											 
												</div>
                                            </div>
										</div>
										
										 
										<p style="text-align:right">
											 <a class="mb-2 mr-2 btn btn-pill btn-primary" id="AddInvoiceRow" style="color:white;">Add Row</a>
									   </p>
										<div class="table-responsive">
                                        <table class="mb-0 table" id="InvoiceTable">
                                            <thead>
                                            <tr>
                                                <th>S.No</th>
												<th>Item *</th>
												<th>Description/staff</th>
												<th>Quantity *</th>
												<th>Price *</th>
												<th>Amount</th>
												<th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody id="itemsBody">
											<?php
											$s_no =1;
											foreach($expansedet as $expansedets){
											?>
                                            <tr>
                                                <td scope="row"><?php echo $s_no; ?></td>
                                                <td>
												<select class="form-control" name="item_id[]" id="item_id">
                                         <optgroup label="Select Expense">
										 <option>
												  <?php 
										echo '<option value="'.$expansedets['item_id'].'" selected>'.$expansedets['item_id'].'</option>';
										 foreach($items as $itemlist){
											echo '<option value="'.$itemlist['expanse_item'].'">'.$itemlist['expanse_item'].'</option>';
										} 
										foreach($client_items as $itemlists){
											echo '<option value="'.$itemlists['item_name'].'" myTag="'.$itemlists['item_price'].'">'.$itemlists['item_name'].'</option>';
										}
										
										?>
									</option> </optgroup>
							   
                                       </select>
												
												</td>
                                                <td><input type="text"  class="form-control" name="item_desc[]" value="<?php echo $expansedets['item_desc']; ?>" ></td>
												<td> <input type="text" parsley-trigger="change" parsley-required="true" value="<?php echo $expansedets['item_quantity']; ?>"  class="form-control" name="item_quantity[]" ></td>
												<td><input type="text" parsley-trigger="change" parsley-required="true" value="<?php echo $expansedets['item_price']; ?>" class="form-control" name="item_price[]" ></td>
												<td><input type="text"  class="form-control" name="item_amount[]" value="<?php echo $expansedets['item_amount']; ?>"></td>
												<td><a href="" id="DeleteRow" class="check-toggler DeleteRow"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete"><i class="fa fa-trash-alt"> </i></button>
                                            </button></a></td>
                                            </tr>
                                             <?php $s_no++; } ?>
                                            </tbody>
                                        </table>
                                    </div>
									  </br>
									   <?php foreach($expanseinfo as $expinfo){ ?>
									 <div class="table-responsive">
									<table class="mb-0 table">
									<tbody>
									<tr>
									<td class="width30 td" style="text-align:right; vertical-align: middle">Subtotal:</td>
								   <?php if($expinfo['total_amt'] == 0.00){ ?>
									<td class="width70" style="line-height: 28px"><strong>Rs <font id="SubTotal">0.00</font></strong></td>
									<?php }else{ ?>
									<td class="width70" style="line-height: 28px"><strong>Rs <font id="SubTotal"><?php echo $expinfo['amount']; ?></font></strong></td>
									<?php } ?>
									</tr>
									<tr>
									<td style="text-align:right; vertical-align: middle" class="td">Tax(%) :</td>
									 
									<td><input type="text" name="tax_perc" style="width:96%;" class="form-control" id="tax" value="<?php echo $expinfo['tax_perc']; ?>"></td>
									 
									 
									</tr>
									 <input type="hidden" class="form-control" id="amount1" name="amount1" value="<?php echo $expinfo['total_amt']; ?>">
									<tr>
									<td style="text-align:right; vertical-align: middle" class="td">Total :</td>
									 <?php if($expinfo['total_amt'] == 0.00){ ?>
									 <td class="width70" style="line-height: 28px"><strong>Rs <font id="dueamount">0.00</font></strong></td>
									<?php } else { ?>
									<td class="width70" style="line-height: 28px"><strong>Rs <font id="dueamount"><?php echo $expinfo['total_amt']; ?></font></strong></td>
									<?php } ?>
									</tr>
									</tbody>
									</table>
									</div>
									<?php } } ?>
                                    <input type="hidden" name="total_amt" id="total_amt" value="<?php echo $expinfo['amount']; ?>" />
                                        <div class="divider"></div>
                                            <div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary" id="save">Update</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
                                            </div>
											<?php //} ?>
                                    </form>
                                </div>
                            </div>
                             
                        </div>
                         
                    </div>
                </div>
       </div>    
	    </div>    
		 </div>   

<div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Expense Has Been Updated Successfully</div></div></div>
<div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Expense Has Not Been Updated Successfully</div></div></div>

 		 
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script>
<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
<script src="<?php echo base_url();?>asset/js/jquery.jgrowl.min.js"></script>
<script>
 $('#AddInvoiceRow').click(function(){
		var 
		table = $('#InvoiceTable'),
		sno = table.find('tbody > tr').length + 1 + '.',
		newRow = table.find('tbody > tr:first').clone();
		newRow.find('td:first').text(sno);
		newRow.css('display', 'none').appendTo( table.find('tbody') ).fadeIn().find(':input').val('');
	});
/* 	
$(document).on('change', '[name="item_id[]"]', function(){
			
		var 
			$this = $(this),
			id = $('#item_id').val();
			parent = $this.parent().parent();
			//parent.find('[name="item_price[]"]').val(items.jsonData[id].price);
			//parent.find('[name="item_desc[]"]').val(items.jsonData[id].description);
			parent.find('[name="item_quantity[]"]').val(1).trigger('keyup');
	}); */
$(document).on('change', '[name="item_id[]"]', function(){
			var $this = $(this),
			id = $('#item_id').val();
			parent = $this.parent().parent();
			var price = $('option:selected', this).attr('mytag');
			var row = $(this).closest('tr');
			row.find("input[name='item_price[]']").val(price);
			//parent.find('[name="item_price[]"]').val(items.jsonData[id].price);
			//parent.find('[name="item_desc[]"]').val(items.jsonData[id].description);
			parent.find('[name="item_quantity[]"]').val(1).trigger('keyup');
	});	

$(document).on('keyup', '[name="item_quantity[]"]', function(){
		var
		$this = $(this),
		$thisRow = $this.parents('tr'),
		quantity = ($this.val() == '') ? 0 : parseInt( $this.val() ),
		price = parseFloat( $thisRow.find('[name="item_price[]"]').val() );
		if(price>0){
		$thisRow.find('[name="item_amount[]"]').val( (price*quantity).toFixed(2) ).trigger('subTotalCalc');
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
	
	$(document).on('change', '[name="item_price[]"]', function(){
		    var	subTotal = 0;
			$('#itemsBody [name="item_amount[]"]').each(function(){
				subTotal += ($(this).val() == '') ? 0.00 :  parseInt( $(this).val() );
			});
			var tax =  ( parseFloat( $('#tax').val() ) / 100 ) * subTotal;
			$('#SubTotal').text(subTotal.toFixed(2));
			$('#dueamount').text( (subTotal + tax).toFixed(2) );
			$('#total_amt').val(subTotal.toFixed(2));
			$('#amount1').val((subTotal + tax).toFixed(2));
			
	});
	$(document).on('keyup', '#tax', function(){
			var	
			subTotal = parseFloat( $('#SubTotal').text() );
			tax =  ( parseFloat( $(this).val() ) / 100 ) * subTotal;
			$('#dueamount').text( (subTotal + tax).toFixed(2) );
			$('#total_amt').val(subTotal.toFixed(2));
			$('#amount1').val((subTotal + tax).toFixed(2));
	});
	$(document).on('change', '[name="item_quantity[]"]', function(){
		    var	subTotal = 0;
			$('#itemsBody [name="item_amount[]"]').each(function(){
				subTotal += ($(this).val() == '') ? 0.00 :  parseInt( $(this).val() );
			});
			var tax =  ( parseFloat( $('#tax').val() ) / 100 ) * subTotal;
			$('#SubTotal').text(subTotal.toFixed(2));
			$('#dueamount').text( (subTotal + tax).toFixed(2) );
			$('#total_amt').val(subTotal.toFixed(2));
			$('#amount1').val((subTotal + tax).toFixed(2));
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
		$(document).on('subTotalCalc', '[name="item_amount[]"]', function(){
			var	subTotal = 0;
			$('#itemsBody [name="item_amount[]"]').each(function(){
				subTotal += ($(this).val() == '') ? 0.00 :  parseInt( $(this).val() );
			});
			var tax =  ( parseFloat( $('#tax').val() ) / 100 ) * subTotal;
			$('#SubTotal').text(subTotal.toFixed(2));
			$('#dueamount').text( (subTotal + tax).toFixed(2) );
			$('#total_amt').val(subTotal.toFixed(2));
			$('#amount1').val((subTotal + tax).toFixed(2));
			//$('#Tax').trigger('keyup');
		});
		
		
		
		 $('form').on('submit', function (event) {
         event.preventDefault();
		var value = $('#bill_date').val();
		 if(value != '') {
		  }
		else {
			var value1 = $('#bill_date1').val();
			$('#bill_date').val(value1);
		}
		var values = $('#due_date').val();
		  if(values != '') {
		  }
		else {
			var values1 = $('#due_date1').val();
			$('#due_date').val(values1);
		}		
		 var val = $('#total_amt').val();
		if(val == '0'){
			var val1 = $('#total_amount').val();
			$('#total_amt').val(val1);
		}
		if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var button =$('#save');
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
				window.location='<?php echo base_url().'client/invoice/views'; ?>';
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
	} else {
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
</body>
</html>
