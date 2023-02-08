<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo $patient['first_name']?> - Physio Plus Tech</title>
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
                                <div class="card-body"><h5 class="card-title"> Chief Complaints
								</h5>
                                    <form class="" action="<?php echo base_url().'client/patient/add_complaints' ?>" method="post"  role="form" parsley-validate id="signupForm">
                                         <input type="hidden" name="cc_id" value="<?php echo $cc_id ?>"  />
						                 <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $patient_id ?>"  />
										<div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="cc_date" class="">Date</label>
												 <input name="cc_date" value="<?php echo date('d-m-Y',strtotime($chiefcomp['cc_date'])); ?>" type="text" class="form-control datepicker" data-toggle="datepicker" parsley-trigger="change" parsley-required="true" autocomplete="off"></div>
												</div>
											 
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="chief_complaints_dtl" class="">What are your chief complaints?</label>
												<textarea rows="3" class="form-control autosize-input form-rounded" id="chief_complaints_dtl" name="chief_complaints_dtl" ><?php echo $chiefcomp['chief_complaints_dtl'] ?></textarea>
												 </div>
												</div>
                                            </div>
											
											
											<div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="how_long_you_had_this_prob" class="">How long you had this problem?</label>
												<textarea rows="3" class="form-control autosize-input form-rounded" id="how_long_you_had_this_prob" name="how_long_you_had_this_prob" ><?php echo $chiefcomp['how_long_you_had_this_prob'] ?></textarea>
												 </div>
												</div>
											 
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="had_this_problem_before" class="">Had this problem before?</label>
																	
																	<label <?php if($chiefcomp['had_this_problem_before'] == 'yes') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="had_this_problem_before" value="yes" name="had_this_problem_before"  <?php echo ($chiefcomp['had_this_problem_before'] !='no')?'checked':'' ?>> 
																	   Yes
																	</label>
																	<label <?php if($chiefcomp['had_this_problem_before'] == 'no') echo 'class ="active btn btn-shadow btn-outline-primary"'; else echo 'class = "btn btn-shadow btn-outline-primary"';?>>
																		<input type="radio" id="had_this_problem_before" value="no" name="had_this_problem_before" <?php echo ($chiefcomp['had_this_problem_before'] !='yes')?'checked':'' ?>> 
																		No
																	</label>
																	</div> 
												</div>
                                            </div>

											<?php if($chiefcomp['had_this_problem_before']=="yes") { ?>
											<div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="what_treatment_you_had" class="">What treatments you had?</label>
												<input class="form-control" id="what_treatment_you_had" name="what_treatment_you_had" value="<?php echo $chiefcomp['what_treatment_you_had'] ?>" > 
												 </div>
												</div>
												</div>
												  <?php } ?>
												
											<div class="form-row" id="cp_dr">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="what_treatment_you_had" class="">What treatments you had?</label>
												<input class="form-control" id="what_treatment_you_had" name="what_treatment_you_had" value="<?php echo $chiefcomp['what_treatment_you_had'] ?>" > 
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
	 <div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Chief Complaints Has Been Updated Successfully</div></div></div>
    <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Chief Complaints Has not Been Updated Successfully</div></div></div>

	
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script></body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
<script>
 $(document).ready(function() {
  $('form').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var id = $('#patient_id').val();
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
				window.location = '<?php echo base_url().'client/patient/view/' ?>'+id;
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


 $(document).ready(function(){
	$("#cp_dr").hide();
	 $("input[type='radio']").click(function(){
            var radioValue = $("input[name='had_this_problem_before']:checked").val();
			 if(radioValue == 'yes'){
               $("#cp_dr").show();
			   $("#cp").hide();
            }
			else
			{
				$("#cp_dr").hide();
				$("#cp").hide();
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
