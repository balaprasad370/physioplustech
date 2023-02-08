<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Staff Working - Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
    
  <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
    <meta name="msapplication-tap-highlight" content="no">
 

<link href="<?php echo base_url()?>asset_list/main.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>my_assets/jquery-confirm.css" />
<style>
.pagination {
  display: inline-block;
}

.pagination li {
  color: black;
  float: left;
  text-decoration: none;
}
</style>
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
                          
				<?php include("sidebar.php");?>
             <div class="app-main__outer">
                <div class="app-main__inner">
                             
                    <div class="tabs-animation">
                         
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Schedule Settings
                                         
                                    </div>
									  
											</br>
											<div class="btn-actions-pane-right">
                                            <div role="group" class="btn-group-sm btn-group">
                                                <a class="mb-2 mr-2 btn btn-pill btn-primary" id="done" style="color:white;">Set Time</a>
                                              </div>
                                        </div>
										<div class="card-body">
                                    <div class="table-responsive get_time">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Day</th>
												<th class="text-center">From</th>
												<th class="text-center">To</th>
												 
                                                 
                                            </tr>
                                            </thead>
                                            <tbody>
											 <?php if($sch_settings_inf != false){?>
											<?php foreach($sch_settings_inf as $row) { ?>
                                            <tr>
                                                <td class="text-center text-muted"> 
												<?php echo $row['day']; ?>
												</td>
                                                
                                                 <td class="text-center"><?php echo $row['start']; ?></td>
												 
												<td class="text-center"><?php echo $row['end']; ?></td>
											 
                                            </tr>
                                             <?php } ?>
						 <?php } else { ?> 
						  <tr><td colspan="3" class="text-center">No Records Found</td></tr><?php } ?>
                                            </tbody>
                                        </table>
										 
										 
								  
						 
                                    </div>
									
									
									<div class="table-responsive set_time" style="display:none">
													 <form class="" action="<?php echo base_url().'client/settings/sch_settings_edit' ?>" method="post"  role="form" parsley-validate>
                                    
                                                   <table class="table table-striped table-bordered" id="InvoiceTable">
													<thead>
													<tr>
														<th>Day</th>
														<th>Set Timings(Forenoon)</th>
														<th>Set Timings(Afternoon)</th>
													 </tr>
													 <input type="hidden" name="staff_id" id="staff_id" value="<?php echo $this->uri->segment(4);  ?>" />
													</thead>
                                                  <tbody id="itemsBody">
                                                    <tr>
                                                   <td class="td">Monday</td>
                                                  <td id="selectbox2">
												 <select class="form-control" id="monday_fn_from" name="monday_fn_from" parsley-trigger="change" parsley-required="true">
												<option value="1">1 am</option>
												<option value="2">2 am</option>
												<option value="3">3 am</option>
												<option value="4">4 am</option>
												<option value="5">5 am</option>
												<option value="6">6 am</option>
												<option value="7">7 am</option>
												<option value="8">8 am</option>
												<option value="9">9 am</option>
												<option value="10">10 am</option>
												<option value="11">11 am</option>
												<option value="12">12 am</option>
												<option value="13">1 pm</option>
												<option value="14">2 pm</option>
												<option value="15">3 pm</option>
												<option value="16">4 pm</option>
												<option value="17">5 pm</option>
												<option value="18">6 pm</option>
												<option value="19">7 pm</option>
												<option value="20">8 pm</option>
												<option value="21">9 pm</option>
												<option value="22">10 pm</option>
												<option value="23">11 pm</option>
												<option value="24">12 pm</option>
												</select>
												</td>
												<td>
												<select class="form-control" id="monday_an_to" name="monday_an_to"  parsley-trigger="change" parsley-required="true">
									            <option value="1">1 am</option>
									<option value="2">2 am</option>
									<option value="3">3 am</option>
									<option value="4">4 am</option>
									<option value="5">5 am</option>
									<option value="6">6 am</option>
									<option value="7">7 am</option>
									<option value="8">8 am</option>
									<option value="9">9 am</option>
									<option value="10">10 am</option>
									<option value="11">11 am</option>
									<option value="12">12 am</option>
									<option value="13">1 pm</option>
									<option value="14">2 pm</option>
									<option value="15">3 pm</option>
									<option value="16">4 pm</option>
									<option value="17">5 pm</option>
									<option value="18">6 pm</option>
									<option value="19">7 pm</option>
									<option value="20">8 pm</option>
									<option value="21">9 pm</option>
									<option value="22">10 pm</option>
									<option value="23">11 pm</option>
									<option value="24">12 pm</option>
												</select>
												</td>
											  
                                            </tr>
											
											
											<tr>
                                                <td class="td">Tuesday</td>
                                                 
                                                <td id="selectbox2">
												 <select class="form-control" id="tuesday_fn_from" name="tuesday_fn_from"  parsley-trigger="change" parsley-required="true">
									             <option value="1">1 am</option>
									<option value="2">2 am</option>
									<option value="3">3 am</option>
									<option value="4">4 am</option>
									<option value="5">5 am</option>
									<option value="6">6 am</option>
									<option value="7">7 am</option>
									<option value="8">8 am</option>
									<option value="9">9 am</option>
									<option value="10">10 am</option>
									<option value="11">11 am</option>
									<option value="12">12 am</option>
									<option value="13">1 pm</option>
									<option value="14">2 pm</option>
									<option value="15">3 pm</option>
									<option value="16">4 pm</option>
									<option value="17">5 pm</option>
									<option value="18">6 pm</option>
									<option value="19">7 pm</option>
									<option value="20">8 pm</option>
									<option value="21">9 pm</option>
									<option value="22">10 pm</option>
									<option value="23">11 pm</option>
									<option value="24">12 pm</option>
												</select>
												</td>
												<td>
												<select class="form-control" id="tuesday_an_to" name="tuesday_an_to"  parsley-trigger="change" parsley-required="true">
									             <option value="1">1 am</option>
									<option value="2">2 am</option>
									<option value="3">3 am</option>
									<option value="4">4 am</option>
									<option value="5">5 am</option>
									<option value="6">6 am</option>
									<option value="7">7 am</option>
									<option value="8">8 am</option>
									<option value="9">9 am</option>
									<option value="10">10 am</option>
									<option value="11">11 am</option>
									<option value="12">12 am</option>
									<option value="13">1 pm</option>
									<option value="14">2 pm</option>
									<option value="15">3 pm</option>
									<option value="16">4 pm</option>
									<option value="17">5 pm</option>
									<option value="18">6 pm</option>
									<option value="19">7 pm</option>
									<option value="20">8 pm</option>
									<option value="21">9 pm</option>
									<option value="22">10 pm</option>
									<option value="23">11 pm</option>
									<option value="24">12 pm</option>
												 </select>
												</td>
											  
                                            </tr>
											
											 
											<tr>
                                                <td class="td">Wednesday</td>
                                                 
                                                <td id="selectbox2">
												 <select class="form-control" id="wednesday_fn_from" name="wednesday_fn_from"  parsley-trigger="change" parsley-required="true">
									 <option value="1">1 am</option>
									<option value="2">2 am</option>
									<option value="3">3 am</option>
									<option value="4">4 am</option>
									<option value="5">5 am</option>
									<option value="6">6 am</option>
									<option value="7">7 am</option>
									<option value="8">8 am</option>
									<option value="9">9 am</option>
									<option value="10">10 am</option>
									<option value="11">11 am</option>
									<option value="12">12 am</option>
									<option value="13">1 pm</option>
									<option value="14">2 pm</option>
									<option value="15">3 pm</option>
									<option value="16">4 pm</option>
									<option value="17">5 pm</option>
									<option value="18">6 pm</option>
									<option value="19">7 pm</option>
									<option value="20">8 pm</option>
									<option value="21">9 pm</option>
									<option value="22">10 pm</option>
									<option value="23">11 pm</option>
									<option value="24">12 pm</option></select>
												</td>
												<td>
												<select class="form-control" id="wednesday_an_to" name="wednesday_an_to"  parsley-trigger="change" parsley-required="true">
									
									 <option value="1">1 am</option>
									<option value="2">2 am</option>
									<option value="3">3 am</option>
									<option value="4">4 am</option>
									<option value="5">5 am</option>
									<option value="6">6 am</option>
									<option value="7">7 am</option>
									<option value="8">8 am</option>
									<option value="9">9 am</option>
									<option value="10">10 am</option>
									<option value="11">11 am</option>
									<option value="12">12 am</option>
									<option value="13">1 pm</option>
									<option value="14">2 pm</option>
									<option value="15">3 pm</option>
									<option value="16">4 pm</option>
									<option value="17">5 pm</option>
									<option value="18">6 pm</option>
									<option value="19">7 pm</option>
									<option value="20">8 pm</option>
									<option value="21">9 pm</option>
									<option value="22">10 pm</option>
									<option value="23">11 pm</option>
									<option value="24">12 pm</option>
									</select>
												</td>
											  
                                            </tr>
											
 
											<tr>
                                                <td class="td">Thursday</td>
                                                 
                                                <td id="selectbox2">
												 <select class="form-control" id="thursday_fn_from" name="thursday_fn_from"  parsley-trigger="change" parsley-required="true">
									<option value="1">1 am</option>
									<option value="2">2 am</option>
									<option value="3">3 am</option>
									<option value="4">4 am</option>
									<option value="5">5 am</option>
									<option value="6">6 am</option>
									<option value="7">7 am</option>
									<option value="8">8 am</option>
									<option value="9">9 am</option>
									<option value="10">10 am</option>
									<option value="11">11 am</option>
									<option value="12">12 am</option>
									<option value="13">1 pm</option>
									<option value="14">2 pm</option>
									<option value="15">3 pm</option>
									<option value="16">4 pm</option>
									<option value="17">5 pm</option>
									<option value="18">6 pm</option>
									<option value="19">7 pm</option>
									<option value="20">8 pm</option>
									<option value="21">9 pm</option>
									<option value="22">10 pm</option>
									<option value="23">11 pm</option>
									<option value="24">12 pm</option>
							</select>
												</td>
												<td>
												<select class="form-control" id="thursday_an_to" name="thursday_an_to"  parsley-trigger="change" parsley-required="true">
									<option value="1">1 am</option>
									<option value="2">2 am</option>
									<option value="3">3 am</option>
									<option value="4">4 am</option>
									<option value="5">5 am</option>
									<option value="6">6 am</option>
									<option value="7">7 am</option>
									<option value="8">8 am</option>
									<option value="9">9 am</option>
									<option value="10">10 am</option>
									<option value="11">11 am</option>
									<option value="12">12 am</option>
									<option value="13">1 pm</option>
									<option value="14">2 pm</option>
									<option value="15">3 pm</option>
									<option value="16">4 pm</option>
									<option value="17">5 pm</option>
									<option value="18">6 pm</option>
									<option value="19">7 pm</option>
									<option value="20">8 pm</option>
									<option value="21">9 pm</option>
									<option value="22">10 pm</option>
									<option value="23">11 pm</option>
									<option value="24">12 pm</option>
							</select>
												</td>
											  
                                            </tr>
 
											<tr>
                                                <td class="td">Friday</td>
                                                 
                                                <td id="selectbox2">
												 <select class="form-control" id="friday_fn_from" name="friday_fn_from"  parsley-trigger="change" parsley-required="true">
									 <option value="1">1 am</option>
									<option value="2">2 am</option>
									<option value="3">3 am</option>
									<option value="4">4 am</option>
									<option value="5">5 am</option>
									<option value="6">6 am</option>
									<option value="7">7 am</option>
									<option value="8">8 am</option>
									<option value="9">9 am</option>
									<option value="10">10 am</option>
									<option value="11">11 am</option>
									<option value="12">12 am</option>
									<option value="13">1 pm</option>
									<option value="14">2 pm</option>
									<option value="15">3 pm</option>
									<option value="16">4 pm</option>
									<option value="17">5 pm</option>
									<option value="18">6 pm</option>
									<option value="19">7 pm</option>
									<option value="20">8 pm</option>
									<option value="21">9 pm</option>
									<option value="22">10 pm</option>
									<option value="23">11 pm</option>
									<option value="24">12 pm</option>
									</select>
												</td>
												<td>
												<select class="form-control" id="friday_an_to" name="friday_an_to"  parsley-trigger="change" parsley-required="true">
								                <option value="1">1 am</option>
									<option value="2">2 am</option>
									<option value="3">3 am</option>
									<option value="4">4 am</option>
									<option value="5">5 am</option>
									<option value="6">6 am</option>
									<option value="7">7 am</option>
									<option value="8">8 am</option>
									<option value="9">9 am</option>
									<option value="10">10 am</option>
									<option value="11">11 am</option>
									<option value="12">12 am</option>
									<option value="13">1 pm</option>
									<option value="14">2 pm</option>
									<option value="15">3 pm</option>
									<option value="16">4 pm</option>
									<option value="17">5 pm</option>
									<option value="18">6 pm</option>
									<option value="19">7 pm</option>
									<option value="20">8 pm</option>
									<option value="21">9 pm</option>
									<option value="22">10 pm</option>
									<option value="23">11 pm</option>
									<option value="24">12 pm</option>
												</select>
												</td>
											  
                                            </tr>
											
											
											 
											<tr>
                                                <td class="td">Saturday</td>
                                                 
                                                <td >
												 <select class="form-control" id="saturday_fn_from" name="saturday_fn_from"  parsley-trigger="change" parsley-required="true">
									<option value="1">1 am</option>
									<option value="2">2 am</option>
									<option value="3">3 am</option>
									<option value="4">4 am</option>
									<option value="5">5 am</option>
									<option value="6">6 am</option>
									<option value="7">7 am</option>
									<option value="8">8 am</option>
									<option value="9">9 am</option>
									<option value="10">10 am</option>
									<option value="11">11 am</option>
									<option value="12">12 am</option>
									<option value="13">1 pm</option>
									<option value="14">2 pm</option>
									<option value="15">3 pm</option>
									<option value="16">4 pm</option>
									<option value="17">5 pm</option>
									<option value="18">6 pm</option>
									<option value="19">7 pm</option>
									<option value="20">8 pm</option>
									<option value="21">9 pm</option>
									<option value="22">10 pm</option>
									<option value="23">11 pm</option>
									<option value="24">12 pm</option>
							</select>
												</td>
												<td>
												<select class="form-control" id="saturday_an_to" name="saturday_an_to"  parsley-trigger="change" parsley-required="true">
												<option value="1">1 am</option>
									<option value="2">2 am</option>
									<option value="3">3 am</option>
									<option value="4">4 am</option>
									<option value="5">5 am</option>
									<option value="6">6 am</option>
									<option value="7">7 am</option>
									<option value="8">8 am</option>
									<option value="9">9 am</option>
									<option value="10">10 am</option>
									<option value="11">11 am</option>
									<option value="12">12 am</option>
									<option value="13">1 pm</option>
									<option value="14">2 pm</option>
									<option value="15">3 pm</option>
									<option value="16">4 pm</option>
									<option value="17">5 pm</option>
									<option value="18">6 pm</option>
									<option value="19">7 pm</option>
									<option value="20">8 pm</option>
									<option value="21">9 pm</option>
									<option value="22">10 pm</option>
									<option value="23">11 pm</option>
									<option value="24">12 pm</option>
									 	</select>
												</td>
											  
                                            </tr>
											
											 
											<tr>
                                                <td class="td">Sunday</td>
                                                 
                                                <td id="selectbox2">
												 <select class="form-control" id="sunday_fn_from" name="sunday_fn_from"  parsley-trigger="change" parsley-required="true">
									 <option value="1">1 am</option>
									<option value="2">2 am</option>
									<option value="3">3 am</option>
									<option value="4">4 am</option>
									<option value="5">5 am</option>
									<option value="6">6 am</option>
									<option value="7">7 am</option>
									<option value="8">8 am</option>
									<option value="9">9 am</option>
									<option value="10">10 am</option>
									<option value="11">11 am</option>
									<option value="12">12 am</option>
									<option value="13">1 pm</option>
									<option value="14">2 pm</option>
									<option value="15">3 pm</option>
									<option value="16">4 pm</option>
									<option value="17">5 pm</option>
									<option value="18">6 pm</option>
									<option value="19">7 pm</option>
									<option value="20">8 pm</option>
									<option value="21">9 pm</option>
									<option value="22">10 pm</option>
									<option value="23">11 pm</option>
									<option value="24">12 pm</option>
									</select>
												</td>
												<td>
												<select class="form-control" id=" " name="sunday_an_to"  parsley-trigger="change" parsley-required="true">
									 <option value="1">1 am</option>
									<option value="2">2 am</option>
									<option value="3">3 am</option>
									<option value="4">4 am</option>
									<option value="5">5 am</option>
									<option value="6">6 am</option>
									<option value="7">7 am</option>
									<option value="8">8 am</option>
									<option value="9">9 am</option>
									<option value="10">10 am</option>
									<option value="11">11 am</option>
									<option value="12">12 am</option>
									<option value="13">1 pm</option>
									<option value="14">2 pm</option>
									<option value="15">3 pm</option>
									<option value="16">4 pm</option>
									<option value="17">5 pm</option>
									<option value="18">6 pm</option>
									<option value="19">7 pm</option>
									<option value="20">8 pm</option>
									<option value="21">9 pm</option>
									<option value="22">10 pm</option>
									<option value="23">11 pm</option>
									<option value="24">12 pm</option>
									 </select>
												</td>
											  
                                            </tr>
											</tbody>
											</table>
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
	</div>
 
 
 <div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Setting Details Has Been Added Successfully</div></div></div>
 <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Setting Details Has not Been Added Successfully</div></div></div>

<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-confirm.js"></script>	
<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
 
<script>
 $('#done').click(function() {
		 $('.get_time').hide();
		 $('.set_time').show();
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
				window.location.reload();
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
