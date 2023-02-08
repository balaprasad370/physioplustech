<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Edit Advance - Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
     
	<meta name="msapplication-tap-highlight" content="no">
	<link href="<?php echo base_url()?>asset_list/main.css" rel="stylesheet">
	<link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
	
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
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title"> Edit Advance
								</h5>
                                    <form class="" action="<?php echo base_url().'client/advance/addAdvance' ?>" method="post"  role="form" parsley-validate id="signupForm">
                                         <input type="hidden" name="advance_id" class="form-control" value=<?php echo $advance['advance_id']?>>
										<div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="vendor" class="">Patient Name *</label>
												 <select class="form-control" name="patient_id" id="patient_id" parsley-trigger="change" parsley-required="true">
                                        <optgroup label="Patient Name">
                                              <option></option>
											    <?php
									if ($patient_name!=false) {
										foreach ($patient_name as $patient_names) {
											$last_name = ($patient_names['last_name'] == '') ? '' : ucfirst($patient_names['last_name']);
											if($patient_names['patient_id'] == $advance['patient_id'])
												echo '<option value="'.$advance['patient_id'].'" selected>'.$patient_names['first_name'].' '.$last_name.'   ('.$patient_names['patient_code'].')'.'</option>';
											else
												echo '<option value="'.$patient_names['patient_id'].'">'.$patient_names['first_name'].' '.$last_name.'   ('.$patient_names['patient_code'].')'.'</option>';
										}
									}
								?>
                                        </optgroup>
                                         
                                    </select>
												</div>
                                            </div>
											 
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="bill_no" class="">Date *</label>
												 <input name="advance_date" placeholder="" type="text" class="form-control datepicker" data-toggle="datepicker" value="<?php echo date('d-m-Y',strtotime($advance['advance_date'])); ?>"></div>
												</div>
                                            </div>
                                        
										<div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="bill_no" class="">Payment Mode *</label>
												<select class="form-control payment_mode" name="payment_mode" id="payment_mode" parsley-trigger="change" parsley-required="true">
                                        <optgroup label="Payment Mode">
										<option></option>
                                        <option value="Cash" <?php if ($advance['payment_mode'] == 'Cash') echo 'selected="selected"' ?>>Cash</option>
									    <option value="Cheque" <?php if ($advance['payment_mode'] == 'Cheque') echo 'selected="selected"' ?>>Cheque</option>
										<option value="Card payment" <?php if ($advance['payment_mode'] == 'Card payment') echo 'selected="selected"' ?>>Card payment</option>
								<option value="Paytm" <?php if ($advance['payment_mode'] == 'Paytm') echo 'selected="selected"' ?>>Paytm</option>
								<option value="Gpay" <?php if ($advance['payment_mode'] == 'Gpay') echo 'selected="selected"' ?>>Gpay</option>
								<option value="Phonepe" <?php if ($advance['payment_mode'] == 'Phonepe') echo 'selected="selected"' ?>>Phonepe</option>
                                        
                                        </optgroup>
                                         
                                    </select>
												</div>
                                            </div>
											
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="bill_no" class="">Amount *</label>
												<input name="advance_amount" id="advance_amount" type="text" class="form-control" parsley-required="true" value="<?php echo $advance['advance_amount']?>">
												</div>
                                            </div>
                                        </div>
										
										<div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="notes" class="">Notes</label>
												 <textarea rows="3" class="form-control autosize-input form-rounded" id="notes" name="notes"><?php echo $advance['notes']?></textarea>
												</div>
                                            </div>
											
											 </div>
											 
											 <?php if($advance['payment_mode']=="Cheque") { ?>
											 <div class="cheque_select">
										 
										<div class="form-row">
                                            
											
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="vendor" class="">Cheque No</label>
												<input name="cheque_no" id="cheque_no" type="text" class="form-control subheading" value="<?php echo $advance['cheque_no']?>">
												</div>
                                            </div>
											
											 
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="bill_no" class="">Cheque Date</label>
												<input name="cheque_date" id="cheque_date" type="text" class="form-control datepicker" data-toggle="datepicker" value="<?php echo date('d-m-Y',strtotime($advance['cheque_date'])); ?>">
												</div>
                                            </div>
											
                                        </div>
										<div class="form-row">
                                            
											
											 <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="vendor" class="">Bank</label>
												<input name="bank" id="bank" type="text" class="form-control" value="<?php echo $advance['bank']?>">
												</div>
                                            </div>
                                        </div> 
										
										</div>
										
											 <?php } ?>
										
										<div class="pmtCheque" style="display:none">
										 
										<div class="form-row">
                                            
											
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="vendor" class="">Cheque No</label>
												<input name="cheque_no" id="cheque_no" type="text" class="form-control subheading" value="<?php echo $advance['cheque_no']?>">
												</div>
                                            </div>
											
											 
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="bill_no" class="">Cheque Date</label>
												<input name="cheque_date" id="cheque_date" type="text" class="form-control datepicker" data-toggle="datepicker" value="<?php echo date('d-m-Y',strtotime($advance['cheque_date'])); ?>">
												</div>
                                            </div>
											
                                        </div>
										<div class="form-row">
                                            
											
											 <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="vendor" class="">Bank</label>
												<input name="bank" id="bank" type="text" class="form-control" value="<?php echo $advance['bank']?>">
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
				   
    <div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Advance Has Been Updated Successfully</div></div></div>
    <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Advance Has not Been Updated Successfully</div></div></div>

	
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

$('#payment_mode').change(function() {
	var val = $('.payment_mode').val();
	if($(".payment_mode").val()=='Cash'){
		$('.pmtCheque').fadeOut();
	}
	else if($(".payment_mode").val()=='Cheque'){
		$('.pmtCheque').fadeIn();
	} 
});


$(document).ready(function() {
  $('form').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var button = $('#save');
		$.ajax({
            type: 'post',
            url: formURL,
            data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				button.prop('disabled', true);
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
		}
		else{
		 
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
