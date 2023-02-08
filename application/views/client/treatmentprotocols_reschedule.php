<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Edit Treatment Protocol - Physio Plus Tech</title>
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
                                <div class="card-body"><h5 class="card-title"> Treatment Protocol
								</h5>
                                    <form class="" action="<?php echo base_url().'client/patient/addTreatmentTechniques' ?>" method="post"  role="form" parsley-validate id="signupForm">
                                         
									 
										 <div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="sn_date" class="">Date *</label>
												<input name="treatment_date" placeholder="" type="text" class="form-control datepicker" data-toggle="datepicker" value="<?php echo date('d-m-Y',strtotime($this->uri->segment(5))); ?>" placeholder="<?php echo date('d-m-Y',strtotime($this->uri->segment(5))); ?>" parsley-trigger="change" parsley-required="true" id="datepicker"></div>
                                            </div>
											
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="item_name" class="">Treatment Name *</label>
												 <select class="multiselect-dropdown form-control treatments" name="treatments" parsley-trigger="change" parsley-required="true" parsley-error-container="#selectbox" id="treatments">
														   <?Php $treat =  explode(',',$treatments);
														$treat_price =  explode(',',$price); 
														$treat_id =  explode(',',$id); 								  
												  for($i = 0; $i < sizeof($treat);$i++){
													  echo '<option value="'.$treat_id[$i].'|'.$treat_price[$i].'" selected >'.ucfirst($treat[$i]).'</option>';	
												  } ?>
												  <?php
													if($item != false) {
														foreach($item as $items){
															echo '<option value="'.$items['item_id'].'|'.$items['item_price'].'">'.ucfirst($items['item_name']).'</option>';	
														}
													}
													?>
                          
 											</select>
												</div>
                                            </div>
                                        </div>
										
										<div class="form-row">
                                            <div class="col-md-6" id="selectbox">
                                                <div class="position-relative form-group"><label for="item_name" class="">No of Session </label>
													<input name="treatment_quantity" placeholder="" type="text" class="form-control" value="<?php echo $quantity; ?>"></div>
                                            
												</div>
                                            
											 
                                             
											  <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="no_session" class="">Price</label>
													   <input type="text" class="form-control" placeholder="Enter Price" parsley-trigger="change" parsley-required="true" id="treatment_price" value="<?Php echo $price; ?>" name="treatment_price" rows="4"/>
												</div>
                                            </div>
											
                                        </div>
										
 
										<div class="form-row">
										  <div class="col-md-6">
                                            <div class="position-relative form-group"><label for="item_name" class="">Consultant Name *</label>
												 <select class="multiselect-dropdown form-control" name="item_name" parsley-trigger="change" parsley-required="true" parsley-error-container="#selectbox" id="item_name">
													<option value="">Select Consultant</option>
													<?php
														if($consultants != false) {
															foreach($consultants as $consultant){
																if($consultant['staff_id'] == $staff_id){
																  echo'<option value="'.$consultant['staff_id'].'" selected >'.ucfirst($consultant['first_name']).' '.ucfirst($consultant['last_name']).'</option>';	
																}													
																echo'<option value="'.$consultant['staff_id'].'">'.ucfirst($consultant['first_name']).' '.ucfirst($consultant['last_name']).'</option>';	
															}
														}
													?>
												  </select>
												</div>
											</div>
											
										</div>	
											<input type="hidden" name="patient_id" id="patient_id" value="<?php echo $this->uri->segment(4); ?>"  />
											<div class="divider"></div>
                                            <div class="clearfix">
                                                <center>
                                                <button style="float:right;" type="submit" class="mb-2 mr-2 btn btn-pill btn-primary" id="save">Submit</button>
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
				   
    <div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Report Has Been Updated Successfully</div></div></div>
    <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Report Has not Been Updated Successfully</div></div></div>

	
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script></body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
 
<script>
	$(document).ready(function() {
		$('.treatments').change(function(){  
		 alert('xzxzx');
		}); 
		
  $('form').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var button = $('#save');
		 button.prop('disabled',true);
		$.ajax({
            type: 'post',
            url: formURL,
            data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				$('#toast-container').show();
				setTimeout(function(){ 
				window.location = '<?php echo base_url().'client/reports/report_session' ?>';
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
</html>
