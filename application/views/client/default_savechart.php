<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Send Exercise - Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="msapplication-tap-highlight" content="no">
	<link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
	<link href="<?php echo base_url()?>asset_list/main.css" rel="stylesheet">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<style>
.parsley-error-list{
	color:red;
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
                                <div class="card-body"><h5 class="card-title"> Send Exercise Chart
								</h5>
                                    <form class="" action="<?php echo base_url().'client/exercise/default_add_chart' ?>" method="post"  role="form" >
                                         
										<div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="name" class="">Patient Name *</label>
												 <select class="form-control" name="name" id="name" parsley-trigger="change" parsley-required="true">
                                        <optgroup label="Patient Name">
                                              <option></option>
													<?php if ($patient_name!=false) {
													foreach ($patient_name as $patient_names) {
													$last_name = ($patient_names['last_name'] == '') ? '' : ucfirst($patient_names['last_name']);
													$age = ($patient_names['age'] == '0') ? '' : '('.$patient_names['age'].')';
													echo '<option value="'.$patient_names['first_name'].' '.$patient_names['last_name'].'/'.$patient_names['patient_id'].'/'.$patient_names['email'].'/'.$patient_names['mobile_no'].'">'.$patient_names['first_name'].' '.$last_name.'   ('.$patient_names['patient_code'].')  '.$age.'</option>';
												  } }?>
                                        </optgroup>
                                         
                                    </select>
												</div>
                                            </div>
											
											 
											<input type="hidden" name="pay" value="free" />
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="email" class="">Email  </label>
												<input name="email1" id="email" type="text" class="form-control" readonly style="background-color:#16aaff;color:white;">
												</div>
                                            </div>
											</div>
											<div class="form-row">
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="email" class="">Mobile No  </label>
												<input name="mobile" id="mobile" type="text" class="form-control" readonly style="background-color:#16aaff;color:white;">
												</div>
                                            </div>
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="pay" class="">Add Payment</label>
												<select class="form-control pay" name="pay" id="pay" parsley-trigger="change" parsley-required="true">
													<optgroup label="Select">
													<option></option>
													<option value="free">Free Prescription</option>
													<option value="paid">Paid Prescription</option>
													</optgroup>
                                                </select>
												</div>
                                            </div>
                                            </div>
                                        
										<div class="form-row">
 
											
											<div class="col-md-6 amout">
                                                <div class="position-relative form-group"><label for="amt" class="">Set Amount *</label>
												<input name="amt" id="amt" type="text" class="form-control" parsley-required="true">
												</div>
                                            </div>
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="bill_no" class="">Chart Name</label>
												<input name="chartname" id="chartname" type="text" class="form-control"  value="<?php echo str_replace('%20',' ',$chartname);  ?>">
												</div>
                                            </div>
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="category" class="">Notify to Patient </label>
												</br>
												<div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-shadow btn-outline-primary ">
                                                        <input type="radio" name="category" id="category" value="1" > 
                                                       &nbsp;&nbsp;&nbsp;&nbsp; Via Whatsapp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </label>
                                                    <label class="btn btn-shadow btn-outline-primary active">
                                                        <input type="radio" name="category" id="category1" value="2" checked> 
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Via Email&nbsp;&nbsp;&nbsp;
                                                    </label>
								                  </div>
											 
												</div>
												</div>
											
                                        </div>
										    <input type="hidden" name="client_id" id="client_id" value="<?php echo $this->session->userdata('client_id');; ?>" />
										    <input type="hidden" name="clinic" id="clinic" value="<?php echo $this->session->userdata('clinic_name'); ?>" />
										    <input type="hidden" name="chard_no" id="chard_no" value="<?php echo $chard_no; ?>" />
											<input type="hidden" name="verify" id="verify" value="<?php echo $verifycode; ?>" />
											<input type="hidden" name="status" id="status" value="<?php echo $status; ?>" class="form-control"/>
		
					                        <div class="divider"></div>
                                            <div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn-pill btn btn-primary" id="save">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn-pill btn btn-danger">Cancel</button>
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
				   
    <div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Chart Has Been Sent Successfully</div></div></div>
    <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Chart Has Not Been Sent Successfully</div></div></div>

	
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script></body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
<script>
 $(document).ready(function() {
		var myDate = new Date();
			var prettyDate =(myDate.getDate()) + '/' + (myDate.getMonth()+1) + '/' +
			myDate.getFullYear();
		$(".datepicker").val(prettyDate);
});
$('.amout').fadeOut();
$('#pay').change(function() {
	var val = $('.pay').val();
	if(val == 'free'){
		$('.amout').fadeOut();
	}
	else if(val == 'paid'){
		$('.amout').fadeIn();
	} 
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

$('select').select2();

$(document).ready(function() {
   $('form').on('submit', function (event) {
	    event.preventDefault();
		var $form = $(this);
		if($("input[name=category]:checked").val() == "1"){
          var val1 = $('#client_id').val();
		  var val3 = $('#verify').val();
		  var val31 = $('#clinic').val();
		  var val=$('#name').val();
		  var spl= val.split('/');
		  var url = 'https://physioplustech.in/pages/default_pdf_verification/'+val1+'/'+spl[1]+'/public-'+val3;
		  window.open('https://web.whatsapp.com/send?phone=91'+spl[3]+'&text=Dear '+ spl[0] +', ' + val31 +'  has sent you an exercise chart, kindly click the below link to access the exercise chart. '+ url, '_blank');
		} else {
			
				 var  formID = $(this).attr("id");
				 var  formURL = $(this).attr("action");
				 var button = $('#save');
				 $.ajax({
					type: 'post',
					url: formURL,
					data:$(this).serialize(),
					success:function(data, textStatus, jqXHR,form) 
					{
						//button.prop('disabled', true);
						$('#toast-container').show();
						setTimeout(function(){ 
						$('.md-close btn btn-default').click();
						window.location.href="<?php echo base_url().'client/exercise/exercise_chartlist' ?>"
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
});   
});


$('#name').change(function() {
		var val=$('#name').val();
		var spl=val.split('/');
		if(spl[2] != ""){
		  $('#email').val(spl[2]);
		}
		else{
			$('#email').val('No Email Found');
		}
		if(spl[3] != ""){
		  $('#mobile').val(spl[3]);
		}
		else{
			$('#mobile').val('No Mobile No Found');
			
		}
		
		});
		
		
		$('.day_view').hide();
		$('.time1').change(function(){
			var  value = $(this).val();
			if(value == 'Week'){
				$('.day_view').show();
				$('.sun').prop('checked', false);
				$('.mon').prop('checked', false);
				$('.tue').prop('checked', false);
				$('.wed').prop('checked',false);
				$('.thu').prop('checked', false);
				$('.sat').prop('checked', false);
				$('.fri').prop('checked', false);
			}
			else if(value == 'Day'){
				$('.sun').prop('checked', 'checked');
				$('.mon').prop('checked', 'checked');
				$('.tue').prop('checked', 'checked');
				$('.wed').prop('checked','checked');
				$('.thu').prop('checked', 'checked');
				$('.sat').prop('checked', 'checked');
				$('.fri').prop('checked', 'checked');
				$('.day_view').show();
			} else {
				$('.day_view').hide();
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
