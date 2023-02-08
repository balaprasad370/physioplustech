<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Add Staff - Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
    <meta name="msapplication-tap-highlight" content="no">
    <link href="<?php echo base_url()?>my_assets/main.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>asset/css/bootstrap-colorpalette.css">
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
                                <div class="card-body"><h5 class="card-title">Add New Staff</h5>
                                    <form class=""method="post" action="<?php echo base_url().'client/staff/staff_add' ?>" parsley-validate role="form" id="signupForm" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="first_name" class="">First Name *</label>
												<input name="first_name" id="first_name"  type="text" class="form-control" parsley-trigger="change" parsley-required="true" autocomplete="off"  ></div>
                                            </div>
											 <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="last_name" class="">Last Name</label>
												<input name="last_name" id="last_name" type="text"  value="" class="form-control" autocomplete="off"></div>
                                            </div>
                                        </div>
										<div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="dob" class="">Date Of Birth </label>
												<input name="dob" id="dob"  type="text" data-date-format='D/M/YYYY' class="form-control datepicker" data-toggle="datepicker-year" autocomplete="off"></div>
                                            </div>
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="age" class="">Age </label>
												<input name="age" id="age" type="text" class="form-control" autocomplete="off"></div>
                                            </div>
                                           </div>
										<div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="mobile_no" class="">Mobile *</label>
												<input name="mobile_no" id="mobile_no"  type="text"  class="form-control" parsley-type="number"  parsley-trigger="change" parsley-required="true" parsley-required="true" parsley-type="number" maxlength="10" autocomplete="off"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="email" class="">Email *</label>
												<input name="email" id="email" type="text"  class="form-control" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-type="email" parsley-validation-minlength="1" autocomplete="off"></div>
                                            </div>
                                        </div>
										<div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="due_date" class="">Gender *</label>
												 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-shadow btn-outline-primary">
                                                        <input type="radio" name="gender" id="category" value="male" parsley-trigger="change" parsley-required="true"> 
                                                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </label>
                                                    <label class="btn btn-shadow btn-outline-primary">
                                                        <input type="radio" name="gender" id="category1" value="female" parsley-trigger="change" parsley-required="true"> 
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Female&nbsp;&nbsp;&nbsp;
                                                    </label>
								             </div>
											 </div>
                                            </div>
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="due_date" class="">Is Consultant *</label>
												   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											 
                                                    <label class="btn btn-shadow btn-outline-primary">
                                                        <input type="radio" name="is_doctor" id="is_doctor" value="1"  /> 
                                                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </label>
                                                    <label class="btn btn-shadow btn-outline-primary">
                                                        <input type="radio" name="is_doctor" id="is_doctor1"  value="0"/> 
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No &nbsp;&nbsp;&nbsp;
                                                    </label>
								            </div>
												<div class="input-group cp_dr">
                                                    <input placeholder="Color" type="text" class="form-control" name="dr_color" id="color" readonly>
													<div class="input-group-btn">
                                           <button type="button" class="mb-2 mr-2 btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fa fa-tint"></i></button>
                                        <ul class="dropdown-menu pull-right">
                                         <li>
                                           <div id="event-colorpalette" data-return-color="#color"></div>
                                            </li>
                                               </ul>
                                                  </div>
													</div>
													</div>
											</div>
										<div id="detail_info">
										<div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="designation_name" class="">Designation</label>
												<input name="designation_name" id="designation_name"  type="text"  class="form-control" autocomplete="off"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="marital_status" class="">Marital Status</label>
												 </br>
												<div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-shadow btn-outline-primary">
                                                        <input type="radio" name="marital_status" id="marital_status" value="single"  > 
                                                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Single&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </label>
                                                    <label class="btn btn-shadow btn-outline-primary">
                                                        <input type="radio" name="marital_status" id="marital_status1" value="married" > 
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Married&nbsp;&nbsp;&nbsp;
                                                    </label>
								             </div>
											 </div>
                                            </div>
                                        </div>
										<div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="date_of_joining" class="">Date Of Joining</label>
												<input name="date_of_joining" id="date_of_joining"  type="text"  class="form-control datepicker" data-date-format='D/M/YYYY' data-toggle="datepicker" autocomplete="off"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="date_of_ending" class="">Ending Date Of Contract</label>
												<input name="date_of_ending" id="date_of_ending"  type="text"  class="form-control datepicker" data-date-format='D/M/YYYY' data-toggle="datepicker" autocomplete="off"></div>
                                            </div>
                                        </div>
										<div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="address_line1" class="">Address 1</label>
												<textarea rows="3" class="form-control autosize-input form-rounded" style="height: 77px;" id="address_line1" name="address_line1" autocomplete="off"></textarea></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="address_line2" class="">Address 2</label>
												 <textarea rows="3" class="form-control autosize-input form-rounded" style="height: 77px;" id="address_line2" name="address_line2" autocomplete="off"></textarea></div>
                                            </div>
                                        </div>
										<div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="city" class="">City</label>
												<input name="city" id="city" type="text"  class="form-control" autocomplete="off"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="pincode" class="">Pincode</label>
												<input name="pincode" id="pincode" type="text"  class="form-control" autocomplete="off"></div>
                                            </div>
                                        </div>
										<div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="phone_no" class="">Phone</label>
												<input name="phone_no" id="phone_no"  type="text"  class="form-control" maxlength="10" autocomplete="off"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="photo" class="">Photo</label>
												<input name="profile_photo" id="profile_photo"  type="file"  class="form-control" accept="image/*"></div>
                                            </div>
											</div>
											

										</div>
										<div class="col-md-12" id="detail_info1">
										<div class="main-card mb-3 card">
                                        <div class="card-header"> 
                                            <div class="btn-actions-pane-right">
                                                <div class="nav">
                                                    <a data-toggle="tab" href="#tab-eg2-0" class="btn-pill btn-wide active btn btn-outline-alternate btn-sm">Qualification</a>
                                                    <a data-toggle="tab" href="#tab-eg2-2" class="btn-pill btn-wide  btn btn-outline-alternate btn-sm">Experience</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab-eg2-0" role="tabpanel">
												<p style="text-align:right">
												 <a class="mb-2 mr-2 btn-pill btn" id="AddQualificationRow" style="color:white;background-color:#3f6ad8;">Add Row
                                            </a>
                                             </p>
									<div class="table-responsive">
                                        <table class="mb-0 table" id="QualificationTable">
                                            <thead>
                                            <tr>
                                                <th>S.No</th>
												<th>Degree</th>
												<th>Institution</th>
												<th>University</th>
												<th>Duration</th>
												<th>Average</th>
												<th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody id="itemsBody">
                                            <tr>
                                                <td scope="row">1</td>
                                                <td><input type="text"  class="form-control" name="degree_name[]" autocomplete="off"></td>
                                                <td><input type="text"  class="form-control" name="institution[]" autocomplete="off"></td>
												<td> <input type="text" class="form-control" name="university[]" autocomplete="off"></td>
												<td><input type="text" class="form-control" name="duration[]" autocomplete="off"></td>
												<td><input type="text"  class="form-control" name="average[]" autocomplete="off"></td>
												<td><a href="" id="DeleteRow" class="check-toggler DeleteRow"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger"><i class="fa fa-trash-alt"> </i></button></a></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        </div>
										</div>
                                             <div class="tab-pane" id="tab-eg2-2" role="tabpanel">
												<p style="text-align:right">
												 <a class="mb-2 mr-2 btn-pill btn" id="AddExperienceRow" style="color:white;background-color:#3f6ad8;">Add Row
                                            </a>
                                             </p>
												 
												<div class="table-responsive">
                                        <table class="mb-0 table" id="ExperienceTable">
                                            <thead>
                                            <tr>
                                                <th>S.No</th>
												<th>Organisation</th>
												<th>Designation</th>
												<th>Duration</th>
												<th>Nature Of Work</th>
												 <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody id="itemsBody">
                                            <tr>
                                                <td scope="row">1</td>
                                                <td><input type="text"  class="form-control" name="organisation[]" autocomplete="off"></td>
                                                <td><input type="text"  class="form-control" name="designation[]" autocomplete="off"></td>
												<td> <input type="text" class="form-control" name="exp_duration[]" autocomplete="off"></td>
												<td><input type="text" class="form-control" name="nature_of_work[]" autocomplete="off"></td> 
												<td><a href="" id="DeleteRow" class="check-toggler DeleteRow"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger"><i class="fa fa-trash-alt"> </i></button></a></td>
                                            </tr>
                                            
                                            </tbody>
                                        </table>
                                    </div>
												
												</div>
												
												</br>
												<div class="card-footer d-block clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary" id="save">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
                                                </div>
								
                                            </div>
                                        </div>
                                          
                                    </div>
									</div>
                                       </br>
										<div class="quick">
										  <div class="card-footer d-block clearfix">
                                    <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary" id="quick_add">Quick Add</button>
												OR &nbsp;&nbsp;<a class="mb-2 mr-2 btn btn-pill btn-info" id="detail" style="color:white;">Enter Detailed Info</a>
												</center>
                                                 
                                </div></div>
                                    </form>
                                </div>
                            </div>
                             
                        </div>
                         
                    </div>
                </div>
       </div>    
	    </div>    
		 </div>   

<div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Staff Has Been Added Successfully</div></div></div>
    <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Staff Has Not Been Added Successfully</div></div></div>

 		 
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>my_assets/assets/scripts/main.js"></script>
<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
<script src="<?php echo base_url() ?>asset/js/bootstrap-colorpalette.js" type="text/javascript"></script>
 
<script>
 $(document).ready(function() {
	$('#AddQualificationRow').click(function(){
		var 
		table = $('#QualificationTable'),
		sno = table.find('tbody > tr').length + 1 + '.',
		newRow = table.find('tbody > tr:first').clone();
		newRow.find('td:first').text(sno);
		newRow.css('display', 'none').appendTo( table.find('tbody') ).fadeIn().find(':input').val('');
	});
	   
	   $('#AddExperienceRow').click(function(){
		var 
		table = $('#ExperienceTable'),
		sno = table.find('tbody > tr').length + 1 + '.',
		newRow = table.find('tbody > tr:first').clone();
		newRow.find('td:first').text(sno);
		newRow.css('display', 'none').appendTo( table.find('tbody') ).fadeIn().find(':input').val('');
	});
	 
 });
 
 
 
 	   $(document).on('click', 'a.check-toggler', function(e){
		e.preventDefault();
		var
		tbody = $(this).parents('tbody'),
		tr = $(this).parents('tr');
		if( tbody.find('tr').length > 1 ) {
			tr.fadeOut(function(){
				$(this).remove();	
			});	
		}
	});
	
	$('#detail_info').hide();
	$('#detail_info1').hide();
	$('#detail').click(function() {
			$('#detail_info').show();
			$('#detail_info1').show();
			$('.quick').hide();
		});
	
	
	$(document).ready(function() {
    $('form').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		var form = $('form')[0];
		  var data = new FormData(form);
		if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var button = $('#save');
		 var button1 = $('#quick_add');
		 button.prop('disabled',true);
		 button1.prop('disabled', true);
		$.ajax({
            type: 'post',
            url: formURL,
			processData: false, 
			contentType: false, 
            data:data,
			//data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				$('#toast-container').show();
				setTimeout(function(){ 
				window.location.href="<?php echo base_url().'client/staff/view'?>";
				}, 1000);
				 
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$('#toast-container').show();
				setTimeout(function(){ 
			    window.location.href="<?php echo base_url().'client/staff/view'?>";
				}, 1000); 
			}
      }); 
		}
		else{
			
		}
		
});  
});

 $(document).ready(function() {
		var myDate = new Date();
			var prettyDate =(myDate.getDate()) + '/' + (myDate.getMonth()+1) + '/' +
			myDate.getFullYear();
		$("#datepicker").val(prettyDate);
});
 

$("#dob").click(function(e){ 
	setTimeout(function(){ 
	var today = new Date();
	var dd = Number(today.getDate());
	var mm = Number(today.getMonth()+1);
    var yyyy = Number(today.getFullYear()); 
	var myBD = $('#dob').val();
	var myBDM = Number(myBD.split("/")[0])
	var myBDD = Number(myBD.split("/")[1])
	var myBDY = Number(myBD.split("/")[2])
	var age = yyyy - myBDY;
	$('#age').val(age);
	}, 10000);
}); 


 $('#event-colorpalette').colorPalette({ 
        colors:[['#428bca', '#5cb85c', '#5bc0de', '#f0ad4e' ,'#d9534f', '#ff4a43', '#22beef', '#a2d200', '#ffc100', '#cd97eb', '#16a085', '#FF0066', '#A40778', '#1693A5', '#0000FF', '#696969', '#808000', '#FF0000', '#2F4F4F', '#FA8072', '#6A5ACD']] 
      }).on('selectColor', function(e) {
        var data = $(this).data();

        $(data.returnColor).val(e.color);
        $(this).parents(".input-group").css("border-bottom-color", e.color );
});

$(document).ready(function(){
	 $(".cp_dr").hide();
	 $("input[type='radio']").change(function(){
            var radioValue = $("input[name='is_doctor']:checked").val();
            if(radioValue == '1'){
               $(".cp_dr").show();
            }
			else
			{
				$(".cp_dr").hide();
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
