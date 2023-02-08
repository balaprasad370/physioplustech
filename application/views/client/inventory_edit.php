<!doctype html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Edit Inventory - Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
    
 
    <meta name="msapplication-tap-highlight" content="no">
 <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
<link href="<?php echo base_url()?>asset_list/main.css" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>tags1/src/jquery.tagsinput.css" />
  
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
                                <div class="card-body"><h5 class="card-title">Edit Inventory</h5>
                                    <form class=""method="post" action="<?php echo base_url().'client/inventory/update_inventory' ?>" parsley-validate role="form" id="signupForm">
                                        <input type="hidden" class="form-control" id="inventory_id" name="inventory_id" value="<?php echo $inv['inventory_id'] ?>" />
										<div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="product_date" class="">Date </label>
												<input name="product_date" id="product_date" value="<?php echo date('d-m-Y',strtotime($inv['date'])); ?>" type="text" data-date-format='D/M/YYYY' class="form-control datepicker" data-toggle="datepicker" parsley-trigger="change" parsley-required="true"></div>
                                            </div>
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="product_name" class="">Product Name *</label>
												<input name="product_name" id="product_name" placeholder="Product Name" type="text" class="form-control" parsley-trigger="change" parsley-required="true" autocomplete="off" value="<?php echo $inv['pro_name'];?>"></div>
                                            </div>
                                           
                                        </div>
										<div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="product_type" class="">Product Type</label>
												<input name="product_type" id="product_type" placeholder="Product Type" type="text" class="form-control" autocomplete="off" value="<?php echo $inv['pro_category'];?>"></div>
                                            </div>
											 
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="brand_name" class="">Brand Name / Company Name</label>
												<input name="brand_name" id="brand_name" placeholder="Brand Name/Company Name" type="text" class="form-control" autocomplete="off" value="<?php echo $inv['brand_name'];?>"></div>
                                            </div>
                                        </div>
										<div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="scan" class="">Product Image</label>
												<a href="<?php echo base_url().'uploads/inventory/'.$inv['pro_img'] ?>"><img src="<?php echo base_url().'uploads/inventory/'.$inv['pro_img'] ?>" width="80px;"  height="80px;"></a>
												<input name="scan" id="scan" type="file" class="form-control-file">
												<input type="hidden" name="scan_hidden" id="scan_hidden" class="form-control" value="<?php echo $inv['pro_img'] ?>"/>
												<div style="display:none" id="dvloader"><p>Uploding Please Wait...</p><img src="<?php echo base_url().'img/loader.gif'; ?>" /></div>
							
												</div>
                                            </div>
											 
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="product_description" class="">Product Description</label>
												<textarea rows="3" class="form-control autosize-input form-rounded" style="height: 77px;" id="product_description" name="product_description" placeholder="Product Description" autocomplete="off"><?php echo $inv['pro_description'];?></textarea></div>
                                            </div>
                                        </div>
										
 
										<div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="sale_order" class="">Set no of quantity required for Whole Sale Order *</label>
												<input name="sale_order" id="sale_order" placeholder="Number of Quantity" type="text"  class="form-control" parsley-trigger="change" parsley-required="true" autocomplete="off" value="<?php echo $inv['sale_order'];?>"></div>
                                            </div>
											
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="expire_date" class="">Expiry Date</label>
												
												<input name="expire_date" id="expire_date" data-date-format='D/M/YYYY' type="text" class="form-control datepicker" data-toggle="datepicker"></div>
                                            </div>
                                        </div>
										
										 
										
										<div class="form-row">
                                            
											 
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="brand_name" class="">Not Applicable</label>
												<div class="custom-checkbox custom-control"><input type="checkbox" id="exampleCustomCheckbox" class="custom-control-input" value="Yes" name="not_applicable" <?php echo ($inv['not_applicable']=='Yes' ? 'checked' : '');?>><label class="custom-control-label" for="exampleCustomCheckbox">Not Applicable
                                                            </label></div></div>
                                            </div>
											
											  <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="pack_size" class="">Product Pack sizes</label>
												 <div class="custom-checkbox custom-control"><input type="checkbox" id="exampleCustomCheckbox3" class="custom-control-input" name="product" value="true" <?php echo ($inv['product']=='true' ? 'checked' : '');?>><label class="custom-control-label" for="exampleCustomCheckbox3">This product is bought in and/or sold in packs</label></div></div>
                                            </div>
											
                                        </div>
										
										
										
										 
										 <div class="form-row">

											 
                                        </div>
										
										<div class="form-row add_product">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="pack_option" class="">Pack Size Label</label>
												<input name="pack_option" id="pack_option" placeholder="Pack Size Label" type="text" class="form-control" value="<?php echo $inv['pack_option'];?>"></div>
                                             
											</div>
											
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="pack_quantity" class="">Pack Size Quantity</label>
												<table><tr><td><input name="pack_quantity" id="qty" placeholder="Pack Size Quantity" type="text" class="form-control" value="<?php echo $inv['pack_quantity'];?>">
                                                </td>
												 <td>&nbsp;&nbsp;&nbsp;<input type='button' class="btn btn-alternate" name='add' onclick='javascript: document.getElementById("qty").value++;' value='+'/>
												<td>&nbsp;&nbsp;&nbsp;<input type='button' class="btn btn-alternate" name='subtract' onclick='javascript: document.getElementById("qty").value--;' value='-'/>
											</td></tr></table>
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

<div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Inventory Has Been Updated Successfully</div></div></div>
 <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Inventory Has Not Been Updated Successfully</div></div></div>

 		 
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script>
<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>tags1/src/jquery.tagsinput.js"></script>
 
<script>
 /* $('.add_product').hide();
  $("input[type='checkbox']").change(function()
	{
		var isChecked = jQuery("input[name=product]:checked").val();
		if(isChecked == 'true')
		{
			$('.add_product').show();
			
		} else {
			$('.add_product').hide();
			
		}
});


$('.add_cg').hide();
 $('#add_option').hide();
  $("input[type='checkbox']").change(function()
	{
		var isChecked = jQuery("input[name=variant]:checked").val();
		if(isChecked == '1')
		{
			$('.add_cg').show();
			$('#add_option').show();
		} else {
			$('.add_cg').hide();
			$('#add_option').hide();
			$('.add_cg1').hide();
		}
});

 $('.add_cg1').hide();
        $('#add_option').click(function(){
			$('.add_cg1').show();
			$('.add_option').hide();

		})
		$('#delete').click(function(){
			$('.add_cg1').hide();
			$('.add_option').show();

		})
		
		
		$('#complete').change(function(){
			var value = $(this).val();
			
			if(value == 'Color'){
			  var newOption = $("<option value='size'>Size</option>");
			  var test = $('.complete1').append(newOption);
			
			$('.complete1').trigger("chosen:updated");
			 }
			 else if(value == 'Size'){
				var newOption = $("<option value='color'>Color</option>"); 
				var test = $('.complete1').append(newOption);
				$('.complete1').trigger("chosen:updated");
			 }
			 
				});
				
				
function onAddTag(tag) {
			alert("Added a tag: " + tag);
		}
		function onRemoveTag(tag) {
			alert("Removed a tag: " + tag);
		}

		function onChangeTag(input,tag) {
			alert("Changed a tag: " + tag);
		}

		$(function() {

			$('#tags_1').tagsInput({width:'auto'});
			$('#tags_2').tagsInput({
				width: 'auto',
				onChange: function(elem, elem_tags)
				{
					var languages = ['php','ruby','javascript'];
					$('.tag', elem_tags).each(function()
					{
						if($(this).text().search(new RegExp('\\b(' + languages.join('|') + ')\\b')) >= 0)
							$(this).css('background-color', 'yellow');
					});
				}
			});
			$('#tags_3').tagsInput({
				width: 'auto',

				 
				autocomplete_url:'test/fake_json_endpoint.html'  
			});

 
		});
	
	
  
	$("input[type='checkbox']").change(function()
    {
		var isChecked = jQuery("input[name=not_applicable]:checked").val();
		if(isChecked == 'Yes')
		{
			$('#expire_date').val("");
			 $('#expire_date').hide();
		}
		else{
			 $('#expire_date').show();
		}
		
	});  */
	  
	  
	  $(document).on('change', '#scan', function(e){
				var data = new FormData();
				data.append('file', $('#scan').prop('files')[0]);
				$('#dvloader').show();
				$.ajax({
					url : '<?php echo base_url().'client/inventory/file_upload' ?>',            
					processData: false, 
					contentType: false, 
					data : data,
					type: "POST",
					dataType : 'json',  
					success:function(data, textStatus, jqXHR,form) 
					{
						//alert(data.status);
						if(data.status == 'success'){
							$('#scan_hidden').val(data.file_name);
							 
								$('#dvloader').hide();
								
								$('#toast-container').show();
										setTimeout(function(){ 
							$('#toast-container').hide();
							}, 1000);
							
						} else {
							 $('#toast-container1').delay(5000).fadeOut(400);
							$('#dvloader').hide();
							
						}
						
					},
					
				});
		
			});
			
			
$(document).ready(function() {
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
			dataType : 'json',  
            data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				if(data.status == 'success'){
				var inven_id = data.inven_id;
				$('#toast-container').show();
				setTimeout(function(){ 
						window.location.href="<?php echo base_url().'client/invoice/views/'?>";
					}, 1000);
					}
					else{
						$('#toast-container1').delay(5000).fadeOut(400);
					setTimeout(function(){ 
					$('.md-close btn btn-default').click();
					window.location.reload();
					}, 1000);
					}
				
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
