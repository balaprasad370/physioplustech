<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<meta name="msapplication-tap-highlight" content="no">
	 <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
	 <link href="<?php echo base_url()?>my_assets/main.css" rel="stylesheet"></head>
    
	<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
     
				<?php include("sidebar.php");?>
               <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="lnr-picture text-danger">
                                    </i>
                                </div>
                                <div>Treatment Protocol
                              </div>
                            </div>
                             </div>
                    </div>        

					 <div class="row">
                        <div class="col-lg-6">
					    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <form class="form-horizontal" action ="<?php echo base_url().'client/patient/addTreatmentTechniques' ?>"  method="post" role="form" parsley-validate id="basicvalidations">
								<div class="col-md-12">
									<div class="input-group">
									  <input type="text"  name="treatment_date" style="width:300px;"  parsley-trigger="change" parsley-required="true" data-date-format='D/M/YYYY'  class="form-control from-input" placeholder="Select Multiple date" id="treatment_date1" autocomplete="off"> 
								    </div>	
								</div></br>
								<div class="col-md-12">	
									<div class="input-group">
											<select style="width:100%;" id="treatments" name="treatments[]" multiple="" class="form-control" data-select2-id="4" tabindex="-1" aria-hidden="true">
																 <option> Choose from Exisiting Treatment Item </option>
																	<?php
																	if($item != false) {
																		foreach($item as $items){
																			echo '<option value="'.$items['item_id'].'|'.$items['item_price'].'">'.ucfirst($items['item_name']).'</option>';	
																		}
																	}
																	?>
										</select>
									</div><a id="treat_add" class="btn btn-primary" style="color:white;"> Add New Treatment Item</a>
								</div></br>											
								<div  style="display:none;" id="add_treatment">
									  <div class="col-md-12">	
									   <div class="input-group">
										   <input type="text" class="form-control"   id="t_name" placeholder="Enter Item Name" name="t_name" />
										</div>
									  </div></br>
									  <div class="col-md-12">	
											<div class="input-group">
										   <textarea class="form-control" id="t_desc" name="t_desc" placeholder="Enter Item Description" rows="4"></textarea>
										</div>
									  </div></br>
									  <div class="col-md-12">	
										<div class="input-group">
										   <input type="text" class="form-control" id="t_price" name="t_price" placeholder="Enter Item Price"  />
										</div>
									  </div></br>
									  <div style="text-align:right">
											<span style="display:none"  class="fileupload-process">Saving please wait...</span>
											<button style="margin:-10px 5px 0 0" type="button" id="saveProvDiag" class="btn btn-primary btn-mini">Save</button>
											<button style="margin:-10px 24px 0 0" type="button" id="cancelProvDiag" class="btn btn-primary btn-mini">Cancel</button>
									  </div></br>
							    </div>
								<div class="col-md-12">	
									<div class="input-group">
									<input type="text" Placeholder="Session" name="treatment_quantity" id="treatment_quantity" class="form-control" />
									</div>
								</div></br>
								<div class="col-md-12">	
									<div class="input-group">
										<input type="text" Placeholder="Price" name="treatment_price" id="treatment_price" class="form-control" />
									</div>
								</div></br>
								<div class="col-md-12">	
									<div class="input-group">
										<select style="width:100%;"  id="staff_id" name="staff_id" class="form-control" data-select2-id="4" tabindex="-1" aria-hidden="true">
													<option value=""><h4>Select Consultant</h4></option>
													<?php
														if($consultants != false) {
															foreach($consultants as $consultant){
																echo'<option value="'.$consultant['staff_id'].'">'.ucfirst($consultant['first_name']).' '.ucfirst($consultant['last_name']).'</option>';	
															}
														}
													?>
										</select>
									</div><input type="hidden" name="patient_id" id="patient_id" value="<?php echo $patient_id ?>"  />
								</div></br>
						        <div class="clearfix">
														<button  id="reset-btn" class="btn-shadow float-left btn btn-link">Reset</button>
														<button type="submit" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Submit</button>
														<button  id="prev-btn" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">cancel</button>
								</div></form>
						</div>
                        </div>
                     </div>
				     
					</div>
                 </div>
			   </div>
		</div>   
</div>   
 <script type="text/javascript" src="<?php echo base_url()?>my_assets/assets/scripts/main.js"></script></body>
 <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui.multidatespicker.js"></script>
 <script type="text/javascript" src="<?php echo base_url() ?>assets/js/prettify.js"></script>
 <script type="text/javascript" src="<?php echo base_url() ?>assets/js/lang-css.js"></script>
 <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
 <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
 <script src="<?php echo base_url() ?>assets/js/parsley.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
 <script src="https://select2.github.io/select2-bootstrap-theme/js/bootstrap.min.js"></script>
 <script src="https://select2.github.io/select2-bootstrap-theme/js/anchor.min.js"></script>
 <script type="text/javascript">
 $( "select" ).select2();
		$(function() {
			$('#treatments').change(function(){
				var treat = $('.treatments').val();
				var val = treat.join(",");
				$.ajax({
					url : '<?php echo base_url().'client/patient/split_item' ?>',            
					data : {s_name:val},
					type: "POST",
					dataType : 'json',  
					
					success:function(data, textStatus, jqXHR,form) 
					{
						if(data.status == 'success'){
							$('#treatment_price').val(data.message);
									
						} else {
								
						}
						
					},
					
				}); 
			});  
			prettyPrint();
			var today = new Date();
			$('#from-input').multiDatesPicker({
				//minDate: 0,
				dateFormat: "dd-mm-yy"
			});
			
			
			$("#treat_add").click(function(){
		$("#add_treatment").fadeIn();
		});
	$("#cancelProvDiag").click(function(){
		$("#add_treatment").fadeOut();
	});
	 $('form').on('submit', function (event) {
         event.preventDefault();
		 var $form = $(this);
		if ( $(this).parsley().isValid() ) {
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
				var id = '<?php echo $this->uri->segment(4); ?>';
				
				$.jGrowl("Treatment Has Been Added Successfully!");
				setTimeout(function(){ 
					window.location="<?php echo base_url().'client/patient/view/' ?>" + id;
				}, 1000); 
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$.jGrowl("Treatment Has Not Been Added Successfully!");
				setTimeout(function(){ 
						window.location.reload();
				}, 1000);
			}
      }); 
	  }
		else{
			
		}
});  
$("#saveProvDiag").click(function(e){
		e.preventDefault();
		var url= '<?php echo base_url().'client/patient/add_treatment/' ?>';
		var t_name = $('#t_name').val();
		var t_desc = $('#t_desc').val();
		var t_price = $('#t_price').val();
		var provDiag = t_name + '/' + t_desc + '/' + t_price;
			
		 $.ajax({
			url : url,
			type: "POST",
			data : {prov:provDiag},
			dataType: 'json', 
			success:function(data, textStatus, jqXHR,form) 
			{
				$("#add_treatment").fadeOut();
				var obj = data.Treatment.item_id;
				var obj1 = data.Treatment.item_price;
				var obj2 = data.Treatment.item_name;
				$(".prov_diag").hide();
				var newOption = $('<option value = ' + obj + '/' + obj1 + '  selected>' + obj2 + '</option>');
				$('#treatments').append(newOption);
				$("#treatment_price").val(obj1);
				$('#treatments').trigger("chosen:updated"); 
							
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$.jGrowl("Treatment Item Has Been Added Successfully!");
				setTimeout(function(){ 
						window.location.reload();
				}, 1000);
			}
		}); 
	});
});
$(document).ready(function() {
	  $('.datepicker').datetimepicker({
           dateFormat: 'yy-mm-dd' 
	  });
	  $(".chosen-select").chosen({disable_search_threshold: 10});
      $(".datepicker").on("dp.show",function (e) {
        var newtop = $('.bootstrap-datetimepicker-widget').position().top - 0;      
        $('.bootstrap-datetimepicker-widget').css('top', newtop + 'px');
      });
     //datepicker Initialization
	   $('.datepicker1').datetimepicker({
           
	});
	var myDate = new Date();
		var prettyDate =(myDate.getDate()) + '/' + (myDate.getMonth()+1) + '/' + myDate.getFullYear();
		$(".datepicker1").val(prettyDate);
		
	$(".datepicker1").on("dp.show",function (e) {
        var newtop = $('.bootstrap-datetimepicker-widget').position().top - 0;      
        $('.bootstrap-datetimepicker-widget').css('top', newtop + 'px');
      });
      //initialize colorpicker
      $('#colorpicker').colorpicker();

      $('#colorpicker').colorpicker().on('showPicker', function(e){
        var newtop = $('.dropdown-menu.colorpicker.colorpicker-visible').position().top - 0;      
        $('.dropdown-menu.colorpicker.colorpicker-visible').css('top', newtop + 'px');
      });

      //initialize colorpicker RGB
      $('#colorpicker-rgb').colorpicker({
        format: 'rgb'
      });

      $('#colorpicker-rgb').colorpicker().on('showPicker', function(e){
        var newtop = $('.dropdown-menu.colorpicker.colorpicker-visible').position().top - 0;      
        $('.dropdown-menu.colorpicker.colorpicker-visible').css('top', newtop + 'px');
      });
	 $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;

            console.log(log);
        
        if( input.length ) {
          input.val(log);
        } else {
          if( log ) alert(log);
        }
        
      });

      // Initialize colorpalette
      $('#event-colorpalette').colorPalette({ 
        colors:[['#428bca', '#5cb85c', '#5bc0de', '#f0ad4e' ,'#d9534f', '#ff4a43', '#22beef', '#a2d200', '#ffc100', '#cd97eb', '#16a085', '#FF0066', '#A40778', '#1693A5']] 
      }).on('selectColor', function(e) {
        var data = $(this).data();

        $(data.returnColor).val(e.color);
        $(this).parents(".input-group").css("border-bottom-color", e.color );
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
