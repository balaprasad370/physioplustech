<!doctype html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Add New Referral - Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
    
  <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
    <meta name="msapplication-tap-highlight" content="no">
 
<link href="<?php echo base_url()?>asset_list/main.css" rel="stylesheet">
 
 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
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
                                <div class="card-body"><h5 class="card-title">Add Referral</h5>
                                   
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="title" class="">Referral source</label></br>
												<select class="form-control" name="title"  id="title" parsley-trigger="change" parsley-required="true" parsley-error-container="#selectbox">
                                                <optgroup label="Please Select"></optgroup>
												 <option value="6">Insurance</option>
												 <option value="1">Doctors</option>
												 <option value="2">Website</option>
												 <option value="3">Advertisement</option>
												 <option value="4">Others</option>
												 <option value="5">Patients</option>
											</select>
												</div>
                                            </div>
											 
                                        </div>
										 <div id="doctor">
										 <form class=""method="post" action="<?php echo base_url().'client/referal/add_referal' ?>" parsley-validate role="form" id="signupForm">
										<input type="hidden" name="referaltypeid" value="doctor"  id="referaltypeid" />
										<div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="specialist_id" class="">Referral source </label>
												<select class="form-control" name="specialist_id" id="specialist_id">
                                         <optgroup label="Select specialists">
										 <?php if ($specialists != false) { foreach ($specialists as $specialist) {
										echo '<option value="'.$specialist['specialist_id'].'">'.$specialist['specialist_name'].'</option>';
									} } ?> </optgroup>
							   
                                        
                                    </select>
									<a class="mb-2 mr-2 btn btn-info btn-pill special" style="color:white;">Add New Speciality
                                             </a>
												</div>
                                            </div>
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="referal_name" class="">Doctor Name *</label>
												<input name="referal_name" id="referal_name" placeholder="Doctor Name" type="text" class="form-control" parsley-trigger="change" parsley-required="true" autocomplete="off"></div>
                                            </div>
                                           
                                        </div>
										
										<div class="form-row add_special alert alert-info">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="specialist" class="">Speciality</label>
												<input name="specialist" id="specialist" placeholder="Speciality Name" type="text" class="form-control" autocomplete="off"></div>
                                            <div class="form-group">
												<a id="save" class="mb-2 mr-2 btn btn-pill btn-primary save" style="color:white;">Save</button></a>
												<a id="cancel" class="mb-2 mr-2 btn btn-pill btn-danger" style="color:white;">Cancel</button></a>
												</div>
											</div>
										    
										</div>
										
										
										<div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="org_name" class="">Company Name *</label>
												<input name="org_name" id="org_name" placeholder="Company Name" type="text" class="form-control" parsley-trigger="change" parsley-required="true" autocomplete="off"></div>
                                            </div>
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="address_line1" class="">Address * </label>
												
                                                <textarea rows="3" class="form-control autosize-input form-rounded" style="height: 77px;" id="address_line1" name="address_line1" placeholder="Address" parsley-trigger="change" parsley-required="true" autocomplete="off"></textarea>
												</div>
                                            </div>
                                           
                                        </div>
										<div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="city" class="">Location</label>
												<input name="city" id="city" placeholder="Location" type="text"  class="form-control" autocomplete="off"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="pincode" class="">Pin Code</label>
												<input name="pincode" id="pincode" placeholder="Pin Code" type="text" class="form-control" autocomplete="off"></div>
                                            </div>
                                        </div>
										 
										 <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="mobile_no" class="">Mobile  *</label>
												<input name="mobile_no" id="mobile_no" placeholder="Mobile" type="text" class="form-control" parsley-type="number" parsley-trigger="change" parsley-required="true"  autocomplete="off" maxlength="10"></div>
                                            </div>
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="phone_no" class="">Phone </label>
												<input name="phone_no" id="phone_no" placeholder="Phone" type="text" class="form-control" maxlength="10" autocomplete="off"></div>
                                            </div>
                                           
                                        </div>
										
										<div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="email" class="">Email </label>
												<input name="email" id="email" placeholder="Email" type="text" class="form-control" autocomplete="off"></div>
                                            </div>
											 
                                           
                                        </div>
										
										<div class="divider"></div>
                                            <div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary submit" id="submit">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
                                            </div>
										</form>
                                       </div>
									   
									   
									   <div id="Insurance">
									   <form class=""method="post" action="<?php echo base_url().'client/referal/add_referal' ?>" parsley-validate role="form" id="signupForm">
										<input type="hidden" name="referaltypeid" value="insurance" id="referaltypeid" />
										<div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="referal_name" class="">Name *</label>
												<input name="referal_name" id="referal_name" placeholder="Name" type="text" class="form-control" parsley-trigger="change" parsley-required="true" autocomplete="off"></div>
                                            </div>
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="org_name" class="">Company Name *</label>
												<input name="org_name" id="org_name" placeholder="Company Name" type="text" class="form-control" parsley-trigger="change" parsley-required="true" autocomplete="off"></div>
                                            </div>
                                           
                                        </div>
										 
										
										<div class="form-row">
                                           
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="address_line1" class="">Address * </label>
												
                                                <textarea rows="3" class="form-control autosize-input form-rounded" style="height: 77px;" id="address_line1" name="address_line1" placeholder="Address" parsley-trigger="change" parsley-required="true" autocomplete="off"></textarea>
												</div>
                                            </div>
											
											 <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="city" class="">Location</label>
												<input name="city" id="city" placeholder="Location" type="text" class="form-control" autocomplete="off"></div>
                                            </div>
                                           
                                        </div>
										<div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="pincode" class="">Pin Code</label>
												<input name="pincode" id="pincode" placeholder="Pin Code" type="text"  class="form-control" autocomplete="off"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="mobile_no" class="">Mobile  *</label>
												<input name="mobile_no" id="mobile_no" placeholder="Mobile" type="text" class="form-control" parsley-type="number" parsley-trigger="change" parsley-required="true"  autocomplete="off" maxlength="10"></div>
                                            </div>
                                        </div>
										 
										 <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="phone_no" class="">Phone </label>
												<input name="phone_no" id="phone_no" placeholder="Phone" type="text" class="form-control"  autocomplete="off" ></div>
                                            </div>
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="email" class="">Email </label>
												<input name="email" id="email" placeholder="Email" type="text" class="form-control" autocomplete="off"></div>
                                            </div>
                                           
                                        </div>
										<div class="divider"></div>
                                            <div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary submit" id="submit">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
                                            </div>
										</form>
										 </div>
									   
									   
									    <div id="website">
										 <form class=""method="post" action="<?php echo base_url().'client/referal/add_referal' ?>" parsley-validate role="form" id="signupForm">
										<input type="hidden" name="referaltypeid" value="website" id="referaltypeid" />
										<div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="website" class="">Website Name *</label>
												<input name="website" id="website" placeholder="Website Name" type="text" class="form-control" parsley-trigger="change" parsley-required="true" autocomplete="off"></div>
                                            </div>
											 </div>
											  
											 <div class="divider"></div>
                                            <div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary submit" id="submit">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
                                            </div>
											</form>
										 </div>
										 
										 
										 <div id="patient">
										 <form class=""method="post" action="<?php echo base_url().'client/referal/add_referal' ?>" parsley-validate role="form" id="signupForm">
										<input type="hidden" name="referaltypeid" value="patient" id="referaltypeid" />		
										<div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="referal_name" class="">Patient Name *</label>
												<input name="referal_name" id="referal_name" placeholder="Patient Name" type="text" class="form-control" parsley-trigger="change" parsley-required="true" autocomplete="off"></div>
                                            </div>
											 </div>
											 <div class="divider"></div>
                                            <div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary submit" id="submit">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
                                            </div>
											 </form>
										 </div>
										 
										 
										 <div id="others">
										 <form class=""method="post" action="<?php echo base_url().'client/referal/add_referal' ?>" parsley-validate role="form" id="signupForm">
										<input type="hidden" name="referaltypeid" value="others" id="referaltypeid" />
										<div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="referal_oth_name" class="">Name of the other Source *</label>
												<input name="referal_oth_name" id="referal_oth_name" placeholder="Other Source Name" type="text" class="form-control"  parsley-trigger="change" parsley-required="true" autocomplete="off"></div>
                                            </div>
											 </div>
											 <div class="divider"></div>
                                            <div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary submit" id="submit">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
                                            </div>
											 </form>
										 </div>
										 
										 <div id="advertisement">
										 <form class=""method="post" action="<?php echo base_url().'client/referal/add_referal' ?>" parsley-validate role="form" id="signupForm">
										 <input type="hidden" name="referaltypeid" value="adv" id="referaltypeid" />
										 <div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="adv_name" class="">Advertisement Name *</label>
												<input name="adv_name" id="adv_name" placeholder="Advertisement Name" type="text"  class="form-control" parsley-trigger="change" parsley-required="true" autocomplete="off"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="location_of_adv" class="">Description</label>
												<textarea class="form-control" name="location_of_adv" id="input05" rows="6" autocomplete="off" placeholder="Description" autocomplete="off"></textarea></div>
                                            </div>
                                        </div>
										<div class="divider"></div>
                                            <div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary submit" id="submit">Submit</button>
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
		 </div>   

<div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Referral Has Been Added Successfully</div></div></div>
    <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Referral Has Not Been Added Successfully</div></div></div>

 		 
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script>
<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> 
<script>
 $('select').select2();
 
 $(document).ready(function() {
	
    $("#Insurance").fadeIn();
	$("#doctor").fadeOut();
	$("#website").fadeOut();
	$("#advertisement").fadeOut();
	$("#others").fadeOut();
	$("#patient").fadeOut();
	$("#patient").fadeOut();
	
 });
 
 
 $('#title').change(function() {
		var value = $('#title').val();
		if(value == '6'){
			$("#Insurance").fadeIn();
			$("#doctor").fadeOut();
			$("#website").fadeOut();
			$("#advertisement").fadeOut();
			$("#others").fadeOut();
			$("#patient").fadeOut();
		}
		if(value == '5'){
			$("#Insurance").fadeOut();
			$("#doctor").fadeOut();
			$("#website").fadeOut();
			$("#advertisement").fadeOut();
			$("#others").fadeOut();
			$("#patient").fadeIn();
		}
		if(value == '4'){
			$("#Insurance").fadeOut();
			$("#doctor").fadeOut();
			$("#website").fadeOut();
			$("#advertisement").fadeOut();
			$("#patient").fadeOut();
			$("#others").fadeIn();
		}
		if(value == '3'){
			$("#Insurance").fadeOut();
			$("#doctor").fadeOut();
			$("#website").fadeOut();
			$("#patient").fadeOut();
			$("#others").fadeOut();
			$("#advertisement").fadeIn();
		}
		if(value == '2'){
			$("#Insurance").fadeOut();
			$("#doctor").fadeOut();
			$("#patient").fadeOut();
			$("#others").fadeOut();
			$("#advertisement").fadeOut();
			$("#website").fadeIn();
		}
		if(value == '1'){
			$("#Insurance").fadeOut();
			$("#patient").fadeOut();
			$("#others").fadeOut();
			$("#advertisement").fadeOut();
			$("#website").fadeOut();
			$("#doctor").fadeIn();
		}
	});
	
	
	$('.add_special').hide();
		$('.special').click(function() {
			$('.add_special').show();
		});
		$('#cancel').click(function() {
			$('.add_special').hide();
		});
		$('#save').click(function(){
			var url= '<?php echo base_url().'client/referal/add_specialist' ?>';
			var special = $('#specialist').val();
			if (special != ""){
				$.ajax({
					type: "POST",
					dataType: 'json',
					data : {s_name:special},
					url: url,
					success: function(data) {
						if(data.status == 'failure'){
							
						} else if(data.status == 'success') {
							$(".add_special").hide();
							  var newOption = $('<option value = ' + data.specialData.specialist_id + ' selected>' + data.specialData.specialist_name + '</option>');
							  $('#specialist_id').append(newOption);
							  $('#specialist_id').trigger("chosen:updated");
						}
					}, 
					complete: function(){
							
					},
					error: function(e){  
						alert(e.responseText);
					} 
				 });  
				 }
				 else{
					alert('Please enter the Specialist.', 'Provisional diagnosis error');
				 }	
		});
		
		
		 $(document).ready(function() {
  $('form').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 $('#submit').hide();
		 var button = $('.submit');
		 button.prop('disabled',true);
		$.ajax({
            type: 'post',
            url: formURL,
            data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				$('#toast-container').show();
				setTimeout(function(){ 
				window.location.href="<?php echo base_url().'client/referal/view_referal'?>"
				}, 1000);
				 
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$('#toast-container1').delay(5000).fadeOut(400);
				setTimeout(function(){ 
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
</body>


</html>
