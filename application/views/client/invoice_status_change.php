<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Invoice Payment - Physio Plus Tech</title>
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
</style>
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    
				<?php include("sidebar.php");?>
            <div class="app-main__outer">
                <div class="app-main__inner">
                      <div class="tab-content">
					   <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
                            <div class="main-card mb-3">
							  <div class="app-page-title" style="background-color:black; color:white;">
										<div class="page-title-wrapper">
											<div class="page-title-heading" style="height:20px;">
												<div class="page-title-icon bg-plum-plate"><i class="fa fa-file text-white"></i></div>
												<div><?php echo $name; ?>
													<div class="page-title-subheading">Invoice No : <?php echo 'INV'.$invoiceData['bill_no']; ?></div>
												</div>
											</div>
										</div>
									</div>
							   <div class="card-body"><h5 class="card-title"> Invoice Payment
								</h5>
                                    <form class="" action="<?php echo base_url().'client/invoice/update_invoice_status' ?>" method="post"  role="form" parsley-validate id="signupForm">
                                          <input type="hidden" class="form-control" id="bill_id" name="bill_id" autocomplete="off" value="<?php echo $invoiceData['bill_id']? $invoiceData['bill_id'] : ''?>" readonly  />
				                          <input type="hidden" class="form-control" id="net_amt" name="net_amt" autocomplete="off" value="<?php echo $invoiceData['net_amt']? $invoiceData['net_amt'] : ''?>" readonly  />
										<div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="bill_no" class="">Payment Date</label>
												<input name="payment_date" id="payment_date" type="text" class="form-control datepicker" data-toggle="datepicker"></div>
                                            </div>
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="vendor" class="">Payment Mode</label>
												<select class="form-control" name="payment_mode" id="payment_mode" parsley-trigger="change" parsley-required="true">
												<optgroup label="Please Select">
												  <option></option>
													<option value="Cash">Cash</option>
								<option value="Cheque" >Cheque</option>
								<option value="Card payment" >Card payment</option>
								<option value="Advance" >Advance</option>
								<option value="Paytm" >Paytm</option>
								<option value="Gpay" >Gpay</option>
								<option value="Phonepe" >Phonepe</option>
													</optgroup>
													</select>
												</div>
                                            </div>
                                        </div>
										<div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="vendor" class="">Is discount percentage</label>
												<div class="custom-checkbox custom-control"><input type="checkbox" id="is_discount_perc" value="1" class="custom-control-input" name="is_discount_perc" checked><label class="custom-control-label" for="is_discount_perc">
												</label></div>
												</div>
                                            </div>
											 <?php if($invoiceData['discount_perc'] > 0){ ?>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="bill_no" class="">Previous Discount</label>
												<h4><font id="prevDiscount"><?php echo $invoiceData['discount_perc']; ?></font></h4>
												</div>
                                            </div>
											<?php } ?>
                                        </div>
										<div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="vendor" class="">Discount</label>
												<input name="discount_perc" id="Discount" type="text" class="form-control" value=0.00>
												</div>
                                            </div>
											 
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="bill_no" class="">Amount</label>
												 <input name="paid_amt" id="paid_amt" type="text" class="form-control" value="<?php echo $invoiceData['net_amt'] - $invoiceData['paid_amt']; ?>"  parsley-required="true"> 
												</div>
                                            </div>
                                        </div>
										
										<div class="form-row" id="pmtAdvance" style="display:none">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="vendor" class="">Adv. Amount</label>
												<input name="advance_in_hand" id="advance_in_hand" type="text" class="form-control" readonly>
												</div>
                                            </div>
											 </div>
											 
											 <div class="form-row" id="pmtCard" style="display:none">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="vendor" class="">Name of the card</label>
												<input name="card_name" id="card_name" type="text" class="form-control" >
												</div>
                                            </div>

											 </div>
											  <div id="pmtCheque">
											 <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="vendor" class="">Cheque No.</label>
												<input name="card_name" id="card_name" type="text" class="form-control" >
												</div>
                                            </div>
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="vendor" class="">Cheque Date</label>
												<input name="cheque_date" id="cheque_date" type="text" class="form-control datepicker" data-toggle="datepicker">
												</div>
                                            </div>

											 </div>
											 
											 <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="vendor" class="">Bank</label>
												<input name="bank" id="bank" type="text" class="form-control" >
												</div>
                                            </div>
											 

											 </div>
											</div>
									   
										<div class="divider"></div>
                                            <div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary" id="save">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
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
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script></body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
 
<script>
  $(document).ready(function() {
		var myDate = new Date();
			var prettyDate =(myDate.getDate()) + '/' + (myDate.getMonth()+1) + '/' +
			myDate.getFullYear();
		$(".datepicker").val(prettyDate);
});

$('#pmtCheque').hide();
$(document).on('change', '#payment_mode', function(){
		  var mode = $("#payment_mode").val();
		 if($("#payment_mode").val() == 'Cash' || mode == 'Grabpay' || mode == 'Amex' || mode == 'Visa/Master' || mode == 'Bank transfer' ){
			$('#pmtCash').fadeIn();
			$('#pmtAdvance').fadeOut();
			$('#pmtCheque').fadeOut();
			$('#pmtCard').fadeOut();
		}else if($("#payment_mode").val()=='Cheque'){
			$('#pmtCash').fadeIn();
			$('#pmtAdvance').fadeOut();
			$('#pmtCheque').fadeIn();
			$('#pmtCard').fadeOut();
		}else if($("#payment_mode").val()=='Card payment'){
			$('#pmtCash').fadeIn();
			$('#pmtAdvance').fadeOut();
			$('#pmtCheque').fadeOut();
			$('#pmtCard').fadeIn();
		}else if($("#payment_mode").val()=='Paytm'){
			$('#pmtCash').fadeIn();
			$('#pmtAdvance').fadeOut();
			$('#pmtCheque').fadeOut();
			$('#pmtCard').fadeOut();
		}
		else if($("#payment_mode").val()=='Gpay'){
			$('#pmtCash').fadeIn();
			$('#pmtAdvance').fadeOut();
			$('#pmtCheque').fadeOut();
			$('#pmtCard').fadeOut();
		}
		else if($("#payment_mode").val()== 'Advance'){
			$('#pmtCash').fadeIn();
			$('#pmtAdvance').fadeIn();
			$('#pmtCheque').fadeOut();
			$('#pmtCard').fadeOut();
			var
			patient_id = <?php echo $invoiceData['patient_id']; ?>;
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
						alert('dsf');
					} 
				 }); //end AJAX
			}
			else {
				
			}
		}
	});
	
	
	 var SubTotal, Tax, Discount, DueAmount;
	// tax calculation
	$(document).on('keyup', '#Tax', function(){
		var	
		subTotal = <?php echo $invoiceData['net_amt'] - $invoiceData['paid_amt']; ?>;
		tax =  ( parseFloat( $(this).val() ) / 100 ) * subTotal;
		$('#DueAmount').text( (subTotal + tax).toFixed(2) );
		$('#paid_amt').val((subTotal + tax).toFixed(2));
		SubTotal = subTotal;
		Tax = tax;
		$('#Discount').trigger('keyup');
	});
	
	// discount calculation
	$(document).on('keyup', '#Discount', function(){
		var
		prevDiscount = <?php echo $invoiceData['discount_perc']; ?>;
		if(prevDiscount > 0){
			subTotal = <?php echo $invoiceData['total_amt']; ?>;
		}else{
			subTotal = <?php echo $invoiceData['net_amt']- $invoiceData['paid_amt']; ?>;
		}
		checked = $('#is_discount_perc').is(':checked');
		if(checked)
			discount =  ( parseFloat( $(this).val() ) / 100 ) * subTotal;
		else
			discount = parseFloat( $(this).val() );
		
		if($('#Discount').val() > 0){
			$('#DueAmount').text( (<?php echo $invoiceData['net_amt']- $invoiceData['paid_amt']; ?> - discount).toFixed(2) );
			$('#paid_amt').val((<?php echo $invoiceData['net_amt']- $invoiceData['paid_amt']; ?> - discount).toFixed(2));
		}else{
			$('#DueAmount').text( (<?php echo $invoiceData['net_amt']- $invoiceData['paid_amt']; ?>).toFixed(2) );
			$('#paid_amt').val((<?php echo $invoiceData['net_amt']- $invoiceData['paid_amt']; ?>).toFixed(2));
		}
	});
	
	$('#is_discount_perc').change(function () {
		$('#Tax').trigger('keyup');
		$('#Discount').trigger('keyup');
	});
	 
	 
	 $(document).ready(function() {
   $('form').on('submit', function (event) {
         event.preventDefault();
		  if ( $(this).parsley().isValid() ) {
		 var $form = $(this);
		var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var payment_mode = $('#payment_mode').val();
		 var balance = $('#advance_in_hand').val(); 
		 var paid =  $('#paid_amt').val();
		 if(payment_mode == 'Advance' && parseInt(balance) >= paid){
 			 var button = $('#save');
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
					window.location.href="<?php echo base_url().'client/invoice/views/'?>"
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
		 } else if(payment_mode != 'Advance') {
			 var button = $('#save');
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
					window.location.href="<?php echo base_url().'client/invoice/views/'?>"
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
			 $('#paid_amt').val(balance);
			 alert('This patient advance is not enough to make payment');
		 }
		 } else {
	}

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
</html>
