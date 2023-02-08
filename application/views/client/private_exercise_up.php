<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Physio Plus Tech</title>
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
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title"> Private Exercise
								</h5>
                                     <form action="<?php echo base_url().'client/private_exercise/ex_save'?>" method="post"class="form-horizontal" role="form" parsley-validate id="basicvalidations">
										 <div class="form-row">
                                            <div class="col-md-6">
                                               <div class="position-relative form-group"><label for="vendor" class="">Title Of Exercise *</label>
												 <input name="title" id="title" type="text" class="form-control" parsley-required="true"  >
                                               </div>
											    <div class="position-relative form-group"><label for="bill_no" class="">Main Category</label>
												 <select class="form-control" name="category" id="category" parsley-trigger="change" parsley-required="true">
														<option value="0">Select One</option>
														<option value="1">Ankle and Foot</option>
														<option value="2">Cervical</option>
														<option value="3">Elbow and Hand</option>
														<option value="4">Hip and Knee</option>
														<option value="5">Lumbar Thoracic</option>
														<option value="6">Shoulder</option>
														<option value="7">Special</option>
														<option value="8">Education</option>
												  </select>
												  </br>
												   <select name="items" class="chosen-select chosen-transparent form-control" id="input07">
													<option value="3">No category selected</option>
												  </select>
												</div>
												<div class="form-group">
													<div class="position-relative form-group"><label for="bill_no" class="">Exercise *&nbsp;&nbsp;&nbsp;
											          <input type='file' id='scan' name='scan'>
													  <input type="hidden" name="scan_hidden" id="scan_hidden" class="form-control"/>
													  <div style="display:none" id="dvloader"><p>Uploding Please Wait...</p><img src="<?php echo base_url().'img/loader.gif'; ?>" /></div>
													 </div>
												  </div> 
                                            </div>
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="bill_no" class="">Position *</label>
											     <input name="t_position" class="form-control" id="t_position"  parsley-trigger="change" parsley-required="true" />
											     </div><div class="position-relative form-group"><label for="vendor" class="">Description *</label>
												   <textarea name="descr" class="form-control" id="descr" rows="6" parsley-trigger="change" parsley-required="true"></textarea>
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
				   
    <div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Exercise Has Been Saved Successfully</div></div></div>
    <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Exercise Has not Been Saved Successfully</div></div></div>
	<div id="toast-container2"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Exercise Has Been Uploaded Successfully!!</div></div></div>
    <div id="toast-container3" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Exercise Has not Been Uploaded.</div></div></div>

	
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script></body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
 
<script>
$(document).ready(function(){
	var categories = {
    "Select One":[{value:'3', text:'No cataegory selected'}],
    "Ankle and Foot":[{value:'1', text:'Aarom'},{value:'2', text:'Arom'},{value:'3', text:'Elastic Band'},{value:'4', text:'Isometric'},{value:'5', text:'Miscellaneous'},{value:'6', text:'Mobilization'},{value:'7', text:'PROM'},{value:'8', text:'Stabilization'},{value:'9', text:'Stretches'}],
    "Cervical":[{value:'1', text:'AAROM'},{value:'2', text:'AROM'},{value:'3', text:'Elastic Band'},{value:'4', text:'Isometric'},{value:'5', text:'Miscellaneous'},{value:'6', text:'Mobilization'},{value:'7', text:'PROM'},{value:'8', text:'Stabilization'},{value:'9', text:'Stretches'}],
    "Elbow and Hand":[{value:'1', text:'Ball'},{value:'2', text:'Elastic Band'},{value:'3', text:'Free Weight'},{value:'4', text:'Miscellaneous'},{value:'5', text:'Putty'},{value:'6', text:'Arom'},{value:'7', text:'Closed Chain'},{value:'8', text:'Fine Motor'},{value:'9', text:'Isometric'},{value:'10', text:'Mobilization'},{value:'11', text:'Stretches'}],
    "Hip and Knee":[{value:'1', text:'AROM'},{value:'2', text:'Bosu'},{value:'3', text:'Cones'},{value:'4', text:'Isometric'},{value:'5', text:'Miscellaneous'},{value:'6', text:'Open Chain'},{value:'7', text:'Stretches'},{value:'8', text:'4 way Hip'},{value:'9', text:'Balance'},{value:'10', text:'Boxes and Steps'},{value:'11', text:'Elastic Band'},{value:'12', text:'Machines and Cables'},{value:'13', text:'Mobilization'},{value:'14', text:'Plyometrics'},{value:'15', text:'AAROM'},{value:'16', text:'Ball'},{value:'17', text:'Closed Chain'},{value:'18', text:'Foam Roll'},{value:'19', text:'Medicine Ball'},{value:'20', text:'Neural Glides'},{value:'21', text:'Prom'}],
	"Lumbar Thoracic":[{value:'1', text:'Ball'},{value:'2', text:'Elastic Band'},{value:'3', text:'Medicine Ball'},{value:'4', text:'Mobilization'},{value:'5', text:'Stretches'},{value:'6', text:'AROM'},{value:'7', text:'Bosu'},{value:'8', text:'Foam Roll'},{value:'9', text:'Miscellaneous'},{value:'10', text:'Stabilization'},{value:'11', text:'Traction'}],
	"Shoulder":[{value:'1', text:'Aarom'},{value:'2', text:'Ball'},{value:'3', text:'Elastic Band'},{value:'4', text:'Free Weight'},{value:'5', text:'Machines and Cables'},{value:'6', text:'Miscellaneous'},{value:'7', text:'Neural Glides'},{value:'8', text:'Pulley'},{value:'9', text:'Stretches'},{value:'10', text:'6 Way Shoulder'},{value:'11', text:'Arom'},{value:'12', text:'Bosu'},{value:'13', text:'Foam Roll'},{value:'14', text:'Isometric'},{value:'15', text:'Medicine Ball'},{value:'16', text:'Mobilization'},{value:'17', text:'Pendulum'},{value:'18', text:'Stabilization'},{value:'19', text:'Wand'}],
	"Special":[{value:'1', text:'Aquatics'},{value:'2', text:'Cardio'},{value:'3', text:'Miscellaneous'},{value:'4', text:'Modalities'},{value:'5', text:'Neuro'},{value:'6', text:'Oral and Facial'},{value:'7', text:'Vestibular'}],
	"Education":[{value:'1', text:'Body Mechanics'},{value:'2', text:'Gait Training'},{value:'3', text:'Miscellaneous'},{value:'4', text:'Positioning'},{value:'5', text:'Stair Training'},{value:'6', text:'Transfers'}]
    };
function selectchange(){
    var select = $('[name=items]');
    select.empty();
    $.each(categories[$(':selected', this).text()], function(){
        select.append('<option value="'+this.value+'">'+this.text+'</option>');
    });
}
$(function(){
    $('[name=category]').on('change', selectchange)
	
});
	});
	 
	 $(document).ready(function() {
		 $(document).on('change', '#scan', function(e){
				var data = new FormData();
				data.append('file', $('#scan').prop('files')[0]);
				$('#dvloader').show();
				$.ajax({
					url : '<?php echo base_url().'client/exercise/file_upload' ?>',            
					processData: false, 
					contentType: false, 
					data : data,
					type: "POST",
					dataType : 'json',  
					
					success:function(data, textStatus, jqXHR,form) 
					{
						if(data.status == 'success'){
							$('#scan_hidden').val(data.file_name);
							$('#toast-container2').show();
								$('#dvloader').hide();
						} else {
							$('#toast-container3').show();
								
						}
						
					},
					
				});
		
			});
   $('form').on('submit', function (event) {
         event.preventDefault();
		  if ( $(this).parsley().isValid() ) {
		   var $form = $(this);
		   var  formID = $(this).attr("id");
		   var  formURL = $(this).attr("action");
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
					window.location.href="<?php echo base_url().'client/exercise/private_exercise'?>"
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
});
</script>
</html>
