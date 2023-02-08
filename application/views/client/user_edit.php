<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Edit User - Physio Plus Tech</title>
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
.table td{
	border-top : 0px;
}

</style>
<style>
/* The container */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  
  height: 25px;
  width: 25px;
  background-color: #D3D3D3;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
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
                                <div class="card-body"><h5 class="card-title"> Edit User </h5>
                                    <form class="" action="<?php echo base_url().'client/user/add_user/' ?>" method="post"  role="form" parsley-validate id="signupForm">
                                         <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?php echo $user['user_id'] ? $user['user_id'] : ''?>" autocomplete="off"/>
										<div class="form-row">
                                            <div class="col-md-6" >
                                                <div class="position-relative form-group"><label for="Email" class="">Email</label>
												  <div class="alert alert-danger fade show" style="padding:.5em;"><?php echo $user['username'] ? $user['username'] : ''?>
											</div> 
											</div>
                                            </div>
											</div>
										<div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="password" class="">Password *</label>
												<input name="password" placeholder="" type="password" id="password" class="form-control" value="<?php echo $user['password'] ? $user['password'] : ''?>" parsley-trigger="change" parsley-required="true" parsley-minlength="6" parsley-type="alphanum" parsley-validation-minlength="1" autocomplete="off"></div>
                                            </div>
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="confirm_password" class="">Password Confirm *</label>
												<input name="confirm_password" id="confirm_password" type="password" class="form-control" value="<?php echo $user['password'] ? $user['password'] : ''?>" parsley-trigger="change" parsley-required="true" parsley-minlength="6" parsley-type="alphanum" parsley-validation-minlength="1" parsley-equalto="#password" autocomplete="off">
												</div>
                                            </div>
                                        </div>
										<div class="tile-header"> <h5 class="card-title" style="text-transform:capitalize;">Privilleges</h5></div>
									   <div class="table-responsive">
									  <table  class="table table-striped table-bordered" id="inlineEditDataTable">
										<thead>
										  <tr>
											<th class="text-center">Categories</th>
											<th class="text-center">Create</th>
											<th class="text-center">View</th>
											<th class="text-center">Edit</th>
											<th class="text-center">Delete</th>

											</tr>
										</thead>
										<tbody>
										<tr>
									<?php
											if ($privileges != false) {
												$privilegeList = explode(",",$user['privileges']);
												$edit_list = explode(",",$user['edit']);
												$delete_list = explode(",",$user['delete']);
												$create_list = explode(",",$user['create']);
												foreach ($privileges as $privilege_list) {
													echo '<tr>';
													echo '<td width="128" height="44" class="text-center"><div align="left">'.$privilege_list['privilege_name'].'</div></td>';
													
														if (in_array($privilege_list['privilege_id'],$create_list)) {
														echo '<td class="text-center"><label class="container"> 
													<input type="checkbox" name="create[]"  value="'.$privilege_list['privilege_id'].'" checked>
													<span class="checkmark"></span>
													</label></td>';
													}else{
														echo '<td class="text-center"><label class="container"> 
													<input type="checkbox" name="create[]"  value="'.$privilege_list['privilege_id'].'">
													<span class="checkmark"></span>
													</label></td>';
													}
														  
													if (in_array($privilege_list['privilege_id'],$privilegeList)) {
														echo '<td class="text-center">
													<label class="container"> 
													<input type="checkbox" name="privileges[]"  value="'.$privilege_list['privilege_id'].'" checked>
													<span class="checkmark"></span>
													</label>
													</td>';
													}else{
														echo '<td class="text-center">
													<label class="container"> 
													<input type="checkbox" name="privileges[]"  value="'.$privilege_list['privilege_id'].'">
													<span class="checkmark"></span>
													</label>
													</td>';
													}
													
													if (in_array($privilege_list['privilege_id'],$edit_list)) {
														echo '<td class="text-center">
													<label class="container"> 
													<input type="checkbox" name="edit[]"  value="'.$privilege_list['privilege_id'].'" checked>
													<span class="checkmark"></span>
													</label>
													</td>';
													}else{
														echo '<td class="text-center">
													<label class="container"> 
													<input type="checkbox" name="edit[]"  value="'.$privilege_list['privilege_id'].'">
													<span class="checkmark"></span>
													</label>
													</td>';
													}
													
													if (in_array($privilege_list['privilege_id'],$delete_list)) {
														echo '<td class="text-center">
													<label class="container"> 
													<input type="checkbox" name="delete[]"  value="'.$privilege_list['privilege_id'].'" checked>
													<span class="checkmark"></span>
													</label>
													</td>';
													}else{
														echo '<td class="text-center">
													<label class="container"> 
													<input type="checkbox" name="delete[]"  value="'.$privilege_list['privilege_id'].'">
													<span class="checkmark"></span>
													</label>
													</td>';
													} 
												
													echo '</tr>';
												}
											}
										?>
													 <td></td>
													 <td></td>
													  <td></td>
													   <td></td></tr>
										<!-- <tr>
										  
											<?php
												if ($privileges != false) {
													foreach ($privileges as $privilege_list) {
														if($privilege_list['privilege_name'] != "Hide Contact details"){ 
														echo '<tr>';
														echo '<td width="128" height="44" class="text-center"><div align="center">'.$privilege_list['privilege_name'].'</div></td>';
														echo '<td class="text-center">
														<div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<button type="button" class="btn btn-outline-2x btn-outline-primary" style="height:20px;width:20px;"><input type="checkbox" name="create[]"  value="'.$privilege_list['privilege_id'].'"></button>
																	 </div>
														</td>';
														echo '<td class="text-center">
														<div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<button type="button" class="btn btn-outline-2x btn-outline-primary" style="height:20px;width:20px;"><input type="checkbox" name="privileges[]"  value="'.$privilege_list['privilege_id'].'"></button>
																	 </div>
														</td>';
														echo '<td class="text-center">
														<div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<button type="button" class="btn btn-outline-2x btn-outline-primary" style="height:20px;width:20px;"><input type="checkbox" name="edit[]"  value="'.$privilege_list['privilege_id'].'"></button>
																	 </div></td>';
														
														echo '<td class="text-center">
														<div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<button type="button" class="btn btn-outline-2x btn-outline-primary" style="height:20px;width:20px;"><input type="checkbox" name="delete[]"  value="'.$privilege_list['privilege_id'].'"></button>
																	 </div></td>';
							
														echo '</tr>';
														}
														else { 
														echo '<tr>';
														echo '<td width="128" height="44" class="text-center"><div align="center">'.$privilege_list['privilege_name'].'</div></td>';
														echo '<td class="text-center"><div align="center"><input type="checkbox" name="privileges[]"  value="'.$privilege_list['privilege_id'].'"></div></td>';
														echo '</tr>';
														}
													}
												}
											?>
										 
										 <td></td>
										 <td></td>
										  <td></td>
										   <td></td></tr>-->
										 </tbody>
										  </table>
										  </div>
											<div class="divider"></div>
                                            <div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary submit" id="save">Submit</button>
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
				   
    <div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>User Has Been Added Successfully</div></div></div>
    <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>User Has not Been Added Successfully</div></div></div>

	
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script></body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
 
<script>
	 $('#staff_id').change(function() {
		var val=$('#staff_id').val();
		var spl=val.split('/');
		 if(spl[1]!=""){
		$('.email_tag').show();
		$('.email_id').val(spl[1]);
		}
		else{
			$('.email_tag').show();
			$('.email_id').val('No Email Found');
		}
		
		});
		
		$('.email').hide();
		$('#staff_id').change(function() {
			var val = $('#staff_id').val();
			var spl=val.split('/');
			
		var email = spl[1];
			$('.email').hide();
			if(email == '') { 
				$('.email').hide();
			  } else {
				$.ajax({
						url : '<?php echo base_url().'client/user/email_check/' ?>'+email,
						type: "POST",
						dataType: 'json', 
						success:function(data, textStatus, jqXHR,form) 
						{
							if(data.status == 'success'){
								$('.email').hide();
								
							} else {
								$('.email').show();
								$('#save').hide();
								window.location.reload();
							}
						},
						error: function(jqXHR, textStatus, errorThrown) 
						{
							
						}
				});
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
		 button.prop('disabled',true);
		$.ajax({
            type: 'post',
            url: formURL,
            data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				$('#toast-container').show();
				setTimeout(function(){ 
				window.location.href="<?php echo base_url().'client/user/view'?>";
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
