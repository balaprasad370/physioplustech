<!DOCTYPE html>
<html>
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
	 <link href="<?php echo base_url()?>my_assets/main.css" rel="stylesheet">
    <script src="<?php echo base_url() ?>assets/sweet-alert/sweetalert.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/sweet-alert/sweetalert.css">
 </head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    
			<style>
.parsley-error-list{
	color:red;
}
label, th, .td{
	font-weight:bold;
	color:#3f6ad8;
}
.pagination {
  display: inline-block;
}

.pagination li {
  color: black;
  float: left;
  text-decoration: none;
}
</style>	<?php include("sidebar.php");?>
            <div class="app-main__outer">
                <div class="app-main__inner">
                               
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
								<h5 class="card-title"> Reschedule 
								</h5>
                                    <form  action="<?php echo base_url().'client/schedule/update_appointment' ?>" method="post" parsley-validate role="form">
                                       <?php if($sch_slot != false){ foreach($sch_slot as $sch){ ?>
						
											<input type="hidden" name="monday_fn_from" id="monday_fn_from" value="<?php echo $sch['monday_fn_from']; ?>" />
											<input type="hidden" name="monday_fn_to" id="monday_fn_to" value="<?php echo $sch['monday_fn_to']; ?>" />
											<input type="hidden" name="monday_an_from" id="monday_an_from" value="<?php echo $sch['monday_an_from']; ?>" />
											<input type="hidden" name="monday_an_to" id="monday_an_to" value="<?php echo $sch['monday_an_to']; ?>" />
											<input type="hidden" name="tuesday_fn_from" id="tuesday_fn_from" value="<?php echo $sch['tuesday_fn_from']; ?>" />
											<input type="hidden" name="tuesday_fn_to" id="tuesday_fn_to" value="<?php echo $sch['tuesday_fn_to']; ?>" />
											<input type="hidden" name="tuesday_an_from" id="tuesday_an_from" value="<?php echo $sch['tuesday_an_from']; ?>" />
											<input type="hidden" name="tuesday_an_to" id="tuesday_an_to" value="<?php echo $sch['tuesday_an_to']; ?>" />
											<input type="hidden" name="wednesday_fn_from" id="wednesday_fn_from" value="<?php echo $sch['wednesday_fn_from']; ?>" />
											<input type="hidden" name="wednesday_fn_to" id="wednesday_fn_to" value="<?php echo $sch['wednesday_fn_to']; ?>" />
											<input type="hidden" name="wednesday_an_from" id="wednesday_an_from" value="<?php echo $sch['wednesday_an_from']; ?>" />
											<input type="hidden" name="wednesday_an_to" id="wednesday_an_to" value="<?php echo $sch['wednesday_an_to']; ?>" />
											<input type="hidden" name="thursday_fn_from" id="thursday_fn_from" value="<?php echo $sch['thursday_fn_from']; ?>" />
											<input type="hidden" name="thursday_fn_to" id="thursday_fn_to" value="<?php echo $sch['thursday_fn_to']; ?>" />
											<input type="hidden" name="thursday_an_from" id="thursday_an_from" value="<?php echo $sch['thursday_an_from']; ?>" />
											<input type="hidden" name="thursday_an_to" id="thursday_an_to" value="<?php echo $sch['thursday_an_to']; ?>" />
											<input type="hidden" name="friday_fn_from" id="friday_fn_from" value="<?php echo $sch['friday_fn_from']; ?>" />
											<input type="hidden" name="friday_fn_to" id="friday_fn_to" value="<?php echo $sch['friday_fn_to']; ?>" />
											<input type="hidden" name="friday_an_from" id="friday_an_from" value="<?php echo $sch['friday_an_from']; ?>" />
											<input type="hidden" name="friday_an_to" id="friday_an_to" value="<?php echo $sch['friday_an_to']; ?>" />
											<input type="hidden" name="saturday_fn_from" id="saturday_fn_from" value="<?php echo $sch['saturday_fn_from']; ?>" />
											<input type="hidden" name="saturday_fn_to" id="saturday_fn_to" value="<?php echo $sch['saturday_fn_to']; ?>" />
											<input type="hidden" name="saturday_an_from" id="saturday_an_from" value="<?php echo $sch['saturday_an_from']; ?>" />
											<input type="hidden" name="saturday_an_to" id="saturday_an_to" value="<?php echo $sch['saturday_an_to']; ?>" />
											<input type="hidden" name="sunday_fn_from" id="sunday_fn_from" value="<?php echo $sch['sunday_fn_from']; ?>" />
											<input type="hidden" name="sunday_fn_to" id="sunday_fn_to" value="<?php echo $sch['sunday_fn_to']; ?>" />
											<input type="hidden" name="sunday_an_from" id="sunday_an_from" value="<?php echo $sch['sunday_an_from']; ?>" />
											<input type="hidden" name="sunday_an_to" id="sunday_an_to" value="<?php echo $sch['sunday_an_to']; ?>" />
											
											<?php } } ?> 
											<?php if($sch_times != false) { foreach($sch_times as $sch) { ?>
												<input type="hidden" name="slot" id="slot" value="<?php echo $sch['sch_slot'] ?>" />
											<?php } } ?>
											<input type="hidden" name="day" id="day" />
											<?php if($query != false) {
												foreach($query as $row){ 
												 ?>
												<?php  $this->db->select("start,end")->from('tbl_events');
											$this->db->where('staff_id',$row['staff_id']);
											$result=$this->db->get();
											if($result->result_array() != false) {
											foreach($result->result_array() as $val) 
											{
												$start[] = date('Y-m-d h:i A',strtotime($val['start']));
												$end[] = date('Y-m-d h:i A',strtotime($val['end']));
											} 
											$date = implode(',',$start);
											$date1 = implode(',',$end);
											$spl_id = explode(',',$date);
											for($i=0;$i<count($start);$i++)
											{	?>
											<?php }  ?>
											
											<input type="hidden" name="date" class="chosen-select chosen-transparent form-control" id="date" value="<?php echo $date; ?>" /> 
											<input type="hidden" name="date1" class="chosen-select chosen-transparent form-control" id="date1" value="<?php echo $date1; ?>" /> 
											<?php } else { } ?>	
											<input type="hidden" name="patient_id" class="form-control" id="patient_id" value="<?php echo $patient_id; ?>" /> 
											
											<input type="hidden" value="<?php echo $row['appointment_id'] ?>" name="appointment_id" style="cursor: pointer">
											<div class="row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="case_notes" class="">Patient Name</label>
											     <input type="text" name="first_name" disabled value="<?php echo $row['title'] ?>"   class="form-control" placeholder="Enter First Name" parsley-trigger="change" parsley-required="true"  id="first_name">
												</div>
											</div>
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="cn_date" class="">Appointment Date</label>
												 <input name="appointment_from"  value="<?php echo date('d/m/Y',strtotime($row['appointment_from'])); ?>" id="appointment_from" style="width:100%;" type="text" class="form-control datepicker" data-toggle="datepicker"></div>
											</div>
											
											</div>
											<div class="staff_idss row">
											<div class="col-md-6">
                                                 <div class="position-relative form-group"><label for="case_notes" class="">Start Time</label>
											     </br><select name="time" class="chosen-select chosen-transparent form-control time" id="time">
														<option value="<?php echo date('h:i a',strtotime($row['start'])); ?>" selected ><?php echo date('h:i a',strtotime($row['start'])); ?></option>
													 </select>
												 </div>
											</div>
											<div class="col-md-6">
                                                 <div class="position-relative form-group"><label for="case_notes" class="">End Time</label>
											     <table><tr><td><input type="text" style="width:370px;" class="chosen-select chosen-transparent form-control" value="<?php echo date('h:i a',strtotime($row['end'])); ?>" name="end_time" id="end_time" />
												 </td>
												 <td>&nbsp;&nbsp;&nbsp;<a class="btn btn-primary" style="color:white;" id="add1"><i class="fa fa-plus"></i></a></td>
												 <td>&nbsp;&nbsp;&nbsp;<a class="btn btn-primary" style="color:white;" id="sub1"><i class="fa fa-minus"></i></a>
												</td></tr></table></div>
											</div>
											</div>
											<?php } } ?>
											<div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary" id="save">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
                                            </div>
										
                                    </form></br></br>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
                   </div>
			</div> 
<div id="toast-container" style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success !</br>Your Details Has Been Updated Sucessfully!</div></div></div>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/prettify.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/lang-css.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui-1.11.1.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui.multidatespicker.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>my_assets/assets/scripts/main.js"></script></body>
<script src="<?php echo base_url();?>assets/parsley/parsley.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
<script type="text/javascript">
 $(document).ready(function() {
	 $('form').on('submit', function (event) {
			  event.preventDefault();
			  var $form = $(this);
			  if ( $(this).parsley().isValid() ) {
			  var  formID = $(this).attr("id");
			  var  formURL = $(this).attr("action");
			  var button = $('#save');
                         
                          var clinic = '<?php echo $this->session->userdata('clinic_name'); ?>';
		      var clinic_map = '<?php echo $this->session->userdata('map'); ?>';
		      //var rose= '<?php echo json_decode('"\u1F339"');?>';
		     var plus= '<?php echo json_decode('"\u002B"');?>';
		    //window.alert(clinic_map);
		     var map=clinic_map.replaceAll("+","%2B");

		      button.prop('disabled',true);
			  $.ajax({
						type: 'post',
						url: $(this).attr('action'),
						data:$(this).serialize(),
                                                dataType: "json",
						success:function(data, textStatus, jqXHR,form) 
						{
									
									$('#toast-container').show();

                                                                         if(data.mobile != undefined){
								 swal({
								  //title: "Are you sure?",
								  title: "You have to send Reschedule Notification to Patient",
								  type: "success",
								  showCancelButton: true,
								  confirmButtonClass: 'btn-danger',
								  confirmButtonText: 'Yes',
								  closeOnConfirm: false,
								},
								function(){
									//var msg='Dear '+data.patientname+'%0a'+ 'Your appointment with '+data.staffname+' at'+clinic+' on '+data.date+' '+data.time+' IST has been rescheduled successfully . ;
									if(map=='')
									{
									var msg='Dear '+data.patientname+','+'%0a'+ 'Your appointment with '+data.staffname+' on '+data.date+' '+data.time+' IST has been rescheduled successfully .' ;
									}
									else{
										var msg='Dear '+data.patientname+','+'%0a'+ 'Your appointment with '+data.staffname+' on '+data.date+' '+data.time+' IST has been rescheduled successfully .'+'%0a'+'Visit us:'+'%0a'+map ;
									}
									//var msg='https://web.whatsapp.com/send?phone=91'+$mobile+'&text=Your Physiotherapy appointment on '+$start+' IST has been successfully scheduled.     Please call us on '+mobile+' to give us 24 hours notice to reschedule or cancel the appointment.';
									window.open('https://web.whatsapp.com/send?phone=91'+data.mobile+'&text='+msg, '_blank');
									
									
							}); 
							
							
							
							 } else {
							 }



									setTimeout(function(){ 
											window.location.reload();
									}, 5000);
						},
						error: function(jqXHR, textStatus, errorThrown) 
						{
									setTimeout(function(){
										toastr.success('Appointment has been saved Successfully', 'Successfully');
							
									//$('.md-close btn btn-default').click();
									window.location.reload();
									}, 1000);
						}
					  });
					}
					else{
						
					}
						  
		  });
	 
	    $('#sub1').click(function(){
			 var from_value = $('#end_time').val();
			 var slot = $('#slot').val();
				if($('#slot').val() != undefined){
					var slide = $('#slot').val();
				} else {
					var slide = '30';
				}
				var val = from_value.split(':');  
				var value = val[1].split(' ');
				if(slide == '30'){
					if(parseInt(value[0]) - parseInt(slide) == 0){
						if(val[0] == '12'){
							var hr = '12'+':'+'00 AM';
						} else {
							var hr = val[0] +':'+'00 '+value[1];
						}
					} else {
						if((parseInt(val[0])-1) == 0){
							var hr = '12'+':'+'30 '+value[1];
						} else {
							var hr = ((parseInt(val[0])-1))+':'+'30 '+value[1];
						}
					}
				}
				if(slide == '15'){
				  if(parseInt(value[0])-parseInt(slide) < '0'){
					  if(val[0] != 1){
					  var hr = (parseInt(val[0])-1)+':'+'45'+' '+value[1];
					  } else {
						   var hr = '12:45 PM';
					  }
				  } else {
					  if(val[0] == 12 && value[0] == 15){
						  var hr = '12:00 AM';
					  } else { 
					      var hr = val[0]+':'+(parseInt(value[0])-parseInt(slide))+' '+value[1];
					  }
				  }				
				}
				if(slide == '45'){
					if(parseInt(value[0]) - parseInt(slide) == 0){
						if(val[0] == 12){
							var hr = '12'+':'+'00 am';
						} else {
							var hr =(val[0]) +':'+'00 '+value[1];
						}
					} else {
						if(parseInt(slide) - parseInt(value[0]) == '30'){
							var tt = parseInt(slide) - parseInt(value[0]);
							if(val[0] == 1) {
								var hr =12 +':'+tt+' '+'pm';
							} else if(val[0] == 12) {
								var hr =(val[0]-1) +':'+tt+' '+'am';
							}else  {
								var hr =(val[0]-1) +':'+tt+' '+value[1];
							}
						} else if(parseInt(slide) - parseInt(value[0]) == '15'){
							var tt = 45;
							if(val[0] == 1) {
								var hr = 12 +':'+tt+' '+'pm';
							} else if(val[0] == 12) {
								var hr =(val[0]-1) +':'+tt+' '+'am';
							} else {
								var hr =(val[0]-1) +':'+tt+' '+value[1];
							}
						} else {
							var tt = 15;
							if(val[0] == 1) {
								var hr =12 +':'+tt+' '+'pm';
							} else if(val[0] == 12) {
								var hr =(val[0]-1) +':'+tt+' '+'am';
							} else {
								var hr =(val[0]-1) +':'+tt+' '+value[1];
							}
						}
						
					}
				}
				if(slide == '5'){
				  if(parseInt(value[0])-parseInt(slide) < '0'){
					  if(val[0] != 1){
					  var hr = (parseInt(val[0])-1)+':'+'55'+' '+value[1];
					  } else {
						   var hr = '12:55 PM';
					  }
				  } else {
					  if(val[0] == 12 && value[0] == 05){
						  var hr = '12:00 AM';
					  } else { 
					      var hr = val[0]+':'+(parseInt(value[0])-parseInt(slide))+' '+value[1];
					  }
				  }				
				}
				if(slide == '60'){
					if(val[0] == 01 && value[0] == 00){
						  var hr = '12:00 AM';
					  } else { 
					      var hr = (parseInt(val[0])-1) +':00 '+value[1];
					  }
				}
				$('#end_time').val(hr); 
				
	    });
		$('#time').change(function() {
				var from_value = $('#time').val();
				var slot = $('#slot').val();
				if($('#slot').val() != undefined){
					var slide = $('#slot').val();
				} else {
					var slide = '30';
				}
				var val = from_value.split(':');
				var value = val[1].split(' ');
				if(slide == '30'){
					if(parseInt(value[0])+parseInt(slide) == 60){
						if((parseInt(val[0])+1) == 13){
							var hr = '01'+':'+'00 PM';
						} else {
							var hr = (parseInt(val[0])+1)+':'+'00 '+value[1];
						}
					} else {
						if(val[0] == 12){
							var hr = (val[0])+':'+'30 PM';
						} else {
						    var hr = (val[0])+':'+'30 '+value[1];
						}
					}
				}
				if(slide == '45'){
					if(parseInt(value[0])+parseInt(slide) == 60){
						if((parseInt(val[0])+1) == 13){
							var hr = '01'+':'+'00 PM';
						}else if((parseInt(val[0])+1) == 13){
							var hr = '12'+':'+'00 PM';
						} else {
							var hr = (parseInt(val[0])+1)+':'+'00 '+value[1];
						}
					} else if(parseInt(value[0])+parseInt(slide) > 60){
						var tt = parseInt(value[0])+parseInt(slide) - 60;
						if((parseInt(val[0])+1) == 13){
							var hr = '01'+':'+tt +' pm';
						} else if((parseInt(val[0])+1) == 12) {
								var hr = (parseInt(val[0])+1)+':'+tt+' '+'pm';
						} else {
							var hr = (parseInt(val[0])+1)+':'+tt+' '+value[1];
						}
					} else {
						if(val[0] == 12){
							var hr = (val[0])+':'+'45 pm';
						} else {
						    var hr = (val[0])+':'+'45 '+value[1];
						}
					}
				}
				if(slide == '15'){
					if(parseInt(value[0])+parseInt(slide)  == '60'){
						if((parseInt(val[0])+1) == 13){
							var hr = '01'+':'+'00 PM';
						} else {
							var hr = (parseInt(val[0])+1)+':'+'00 '+value[1];
						}
					} else {
						if(val[0] == '12' && value[1] != 'PM'){
						  var hr = val[0]+':'+(parseInt(value[0])+parseInt(slide))+' PM';
						} else {	
						  var hr = val[0]+':'+(parseInt(value[0])+parseInt(slide))+' '+ value[1];
						}
					}
				}
				if(slide == '5'){
					if(parseInt(value[0])+parseInt(slide)  == '60'){
						if((parseInt(val[0])+1) == 13){
							var hr = '01'+':'+'00 PM';
						} else {
							var hr = (parseInt(val[0])+1)+':'+'00 '+value[1];
						}
					} else {
						if(val[0] == '12' && value[1] != 'PM'){
						  var hr = val[0]+':'+(parseInt(value[0])+parseInt(slide))+' PM';
						} else {	
						  var hr = val[0]+':'+(parseInt(value[0])+parseInt(slide))+' '+ value[1];
						}
					}
				}
				if(slide == '60'){
					if((parseInt(val[0])+1) == 13){
							var hr = '01'+':'+'00 PM';
					} else {
							var hr = (parseInt(val[0])+1)+':'+'00 '+value[1];
					}
				}
				$('#end_time').val(hr); 
		});
	    $('#add1').click(function(){
			var from_value = $('#end_time').val();
			var slot = $('#slot').val();
				if($('#slot').val() != undefined){
					var slide = $('#slot').val();
				} else {
					var slide = '30';
				}
				var val = from_value.split(':');  
				var value = val[1].split(' ');
				if(slide == '30'){
					if(parseInt(value[0])+parseInt(slide) == 60){
						if((parseInt(val[0])+1) == 13){
							var hr = '01'+':'+'00 PM';
						} else {
							var hr = (parseInt(val[0])+1)+':'+'00 '+value[1];
						}
					} else {
						if(val[0] == 12){
							var hr = (val[0])+':'+'30 PM';
						} else {
						    var hr = (val[0])+':'+'30 '+value[1];
						}
					}
				}
				if(slide == '45'){
					if(parseInt(value[0])+parseInt(slide) == 60){
						if((parseInt(val[0])+1) == 13){
							var hr = '01'+':'+'00 pm';
						} else if((parseInt(val[0])+1) == 12) {
								var hr = (parseInt(val[0])+1)+':'+tt+' '+'pm';
						} else {
							var hr = (parseInt(val[0])+1)+':'+'00 '+value[1];
						}
					} else if(parseInt(value[0])+parseInt(slide) > 60){
						var tt = parseInt(value[0])+parseInt(slide) - 60;
						if((parseInt(val[0])+1) == 13){
							var hr = '01'+':'+tt +' pm';
						} else if((parseInt(val[0])+1) == 12) {
								var hr = (parseInt(val[0])+1)+':'+tt+' '+'pm';
						} else {
							var hr = (parseInt(val[0])+1)+':'+tt+' '+value[1];
						}
					} else {
						if(val[0] == 12){
							var hr = (val[0])+':'+'45 pm';
						} else {
						    var hr = (val[0])+':'+'45 '+value[1];
						}
					}
				}
				if(slide == '15'){
					if(parseInt(value[0])+parseInt(slide)  == '60'){
						if((parseInt(val[0])+1) == 13){
							var hr = '01'+':'+'00 PM';
						} else {
							var hr = (parseInt(val[0])+1)+':'+'00 '+value[1];
						}
					} else {
						if(val[0] == '12' && value[1] != 'PM'){
						  var hr = val[0]+':'+(parseInt(value[0])+parseInt(slide))+' PM';
						} else {	
						  var hr = val[0]+':'+(parseInt(value[0])+parseInt(slide))+' '+ value[1];
						}
					}
				}
				
				if(slide == '5'){
					if(parseInt(value[0])+parseInt(slide)  == '60'){
						if((parseInt(val[0])+1) == 13){
							var hr = '01'+':'+'00 PM';
						} else {
							var hr = (parseInt(val[0])+1)+':'+'00 '+value[1];
						}
					} else {
						if(val[0] == '12' && value[1] != 'PM'){
						  var hr = val[0]+':'+(parseInt(value[0])+parseInt(slide))+' PM';
						} else {	
						  var hr = val[0]+':'+(parseInt(value[0])+parseInt(slide))+' '+ value[1];
						}
					}
				}
				if(slide == '60'){
					if((parseInt(val[0])+1) == 13){
							var hr = '01'+':'+'00 PM';
					} else {
							var hr = (parseInt(val[0])+1)+':'+'00 '+value[1];
					}
				}
				/* var spl = $('#date').val().split(',');
				var date_app = $('#appointment_from').val();
				var date = date_app.split('/');
				var final_date = date[2]+'-'+date[1]+'-'+date[0];
				alert(spl.length);
				for(var i=0;i<spl.length;i++)
				{
					var spl1=spl[i].split(' ');
					
					if(final_date == spl1[0])
					{
						var value = spl1[1].split(':'); 
						if(value[0] < 10){
							v1 = ("0" + value[0]).slice(-1);
						} else {
							v1 = value[0];
						}
						var val = v1+':'+value[1]+' '+spl1[2];
						if(from_value == val){
							alert('Time slots not available');
						} else {
							
						} 
					}
					
				} */
				$('#end_time').val(hr); 
		   });
	    
		$('#appointment_from').click(function(){
		var date1 = $('#appointment_from').val();
		var date = date1.split('/');
		var d = new Date(date[2],date[1]-1,date[0]);
		var dayOfWeek = d.getUTCDay();
		if($('#slot').val() != undefined){
			var slide = $('#slot').val();
		} else {
			var slide = '30';
		}
		if(dayOfWeek == '0')
		{
			var from = $('#monday_fn_from').val();
			var to_to= $('#monday_an_to').val();
			
		}
		else if(dayOfWeek == '1')
		{
			var from = $('#tuesday_fn_from').val();
			var to_to = $('#tuesday_an_to').val();
		}
		else if(dayOfWeek == '2')
		{
			var from = $('#wednesday_fn_from').val();
			var to_to = $('#wednesday_an_to').val();
		}
		else if(dayOfWeek == '3')
		{
			var from = $('#thursday_fn_from').val();
			var to_to = $('#thursday_an_to').val();
		}
		else if(dayOfWeek == '4')
		{
			var from = $('#friday_fn_from').val();
			var to_to = $('#friday_an_to').val();
		}
		else if(dayOfWeek == '5')
		{
			var from = $('#saturday_fn_from').val();
			var to_to = $('#saturday_an_to').val();
		}
		else
		{
			var from = $('#sunday_fn_from').val();
			var to_to = $('#sunday_an_to').val();
		}
		if(from == undefined){
			var from = '7';
			var to_to = '10';
		}			
		if(slide == 45)
				 {
					         $('#time option[value!="0"]').remove();
							 $('#time').append('<option value="">Please Select</option>');
					         $('#time').append('<option value="6:00 AM">6:00 AM</option>'); 
					         $('#time').append('<option value="6:45 AM">6.45:00 AM</option>'); 
					         $('#time').append('<option value="7:30 AM">7:30 AM</option>'); 
							 $('#time').append('<option value="8:15 AM">8:15 AM</option>');
							 $('#time').append('<option value="9:00 AM">9:00 AM</option>');
							 $('#time').append('<option value="9:45 AM">9:45 AM</option>');
							 $('#time').append('<option value="10:30 AM">10:30 AM</option>');
							 $('#time').append('<option value="11:15 AM">11:15 AM</option>');
							 $('#time').append('<option value="12:00 AM">12:00 PM</option>');
							 $('#time').append('<option value="12:45 PM">12:45 PM</option>');
							 $('#time').append('<option value="1:30 PM">1:30 PM</option>');
							 $('#time').append('<option value="2:15 PM">2:15 PM</option>');
							 $('#time').append('<option value="3:00 PM">3:00 PM</option>');
							 $('#time').append('<option value="3:45 PM">3:45 PM</option>');
							 $('#time').append('<option value="4:30 PM">4:30 PM</option>');
							 $('#time').append('<option value="5:15 PM">5:15 PM</option>');
							 $('#time').append('<option value="6:00 PM">6:00 PM</option>');
							 $('#time').append('<option value="6:45 PM">6:45 PM</option>');
							 $('#time').append('<option value="7:30 PM">7:30 PM</option>');
							 $('#time').append('<option value="8:15 PM">8:15 PM</option>');
							 $('#time').append('<option value="9:00 PM">9:00 PM</option>');
		}	
		if(slide == 30)
				 {
					
					 $('#time option[value!="0"]').remove();
					 $('#time').append('<option value="">Please Select</option>');
					 for(var i = from ;i <= 12; i++)
					 {
						 if(i == 12)
						 {
							 $('#time').append('<option value="12:00 AM">12:00 AM</option>'); 
							  $('#time').append('<option value="12:30 PM">12:30 PM</option>'); 
						 }
						 for(var j = 0; j <= 60;j = j+30)
						 {
							 if(i == 12)
							 {
								 
							 }
							 else
							 {
								 if(j == 0)
								 {
									var store = i + ':0' + j + ' AM';
								 }
								 else
								 {
									var store= i + ':' + j + ' AM'; 
								 }
								if(j == 60)
								{
									break;
								}
								
								$('#time').append('<option value="' + store  +'">' + store + '</option>');
						
							}
						 }
					 }
					 for(var i = 1 ;i < to_to ; i++)
					 {
						 if(i == 12)
						 {
							 $('#time').append('<option value="12:00 PM">12:00 PM</option>'); 
							 $('#time').append('<option value="12:30 AM">12:30 AM</option>');
							 
						 }
						 for(var j = 0;j <= 60;j = j+30)
						 {
							 if(i == 12)
							 {
								 
							 }
							 else
							 {
									 if(j == 0)
									 {
									var store=i + ':0' + j + ' PM';
									 }
									 else
									 {
										var store=i + ':' + j + ' PM'; 
									 }
									if(j == 60)
									{
										break;
									}
								 $('#time').append('<option value="' + store  +'">' + store + '</option>');
							}
						 }
					 }
					 
				 }
				 if(slide == 15)
				 {
					
					 $('#time option[value!="0"]').remove();
					 $('#time').append('<option value="">Please Select</option>');
					 for(var i = from;i <= 12;i++)
					 {
						 if(i == 12)
						 {
							 $('#time').append('<option value="12:00 AM">12:00 AM</option>'); 
							 $('#time').append('<option value="12:15 PM">12:15 PM</option>'); 
							 $('#time').append('<option value="12:30 PM">12:30 PM</option>'); 
							 $('#time').append('<option value="12:45 PM">12:45 PM</option>'); 
						 }
						 for(var j=0;j<=60;j=j+15)
						 {
							 if(i == 12)
							 {
								 
							 }
							 else
							 {
							 if(j == 0)
							 {
							var store=i + ':0' + j + ' AM';
							 }
							 else
							 {
								var store=i + ':' + j + ' AM'; 
							 }
							if(j == 60)
							{
								break;
							}
						   $('#time').append('<option value="' + store  +'">' + store + '</option>');
						  }
						}
					 }
					for(var i = 1;i<=to_to;i++)
					 {
						 if(i == 12)
						 {
							 $('#time').append('<option value="12:00 PM">12:00 PM</option>'); 
							 $('#time').append('<option value="12:15 AM">12:15 AM</option>'); 
							 $('#time').append('<option value="12:30 AM">12:30 AM</option>'); 
							 $('#time').append('<option value="12:45 AM">12:45 AM</option>'); 
						 }
						 for(var j=0;j<=60;j=j+15)
						 {
							 if(i == 12)
							 {
								 
							 }
							 else
							 {
								 if(j == 0)
								 {
								var store=i + ':0' + j + ' PM';
								 }
								 else
								 {
									var store=i + ':' + j + ' PM'; 
								 }
								if(j == 60)
								{
									break;
								}
									$('#time').append('<option value="' + store  +'">' + store + '</option>');
							}
						 }
					 }
				 }
				 if(slide == 60)
				 {
					 $('#time option[value!="0"]').remove();
					 $('#time').append('<option value="">Please Select</option>');
					 for(var i = from;i <= 12;i++)
					 {
						 if(i == 12)
						 {
							 $('#time').append('<option value="12:00 AM">12:00 AM</option>'); 
								
						 }
						 for(var j=0;j<=60;j=j+60)
						 {
							 if(i == 12)
							 {
								 
							 }
							 else
							 {
							 if(j == 0)
							 {
							var store=i + ':0' + j + ' AM';
							 }
							 else
							 {
								var store=i + ':' + j + ' AM'; 
							 }
							if(j == 60)
							{
								break;
							}
						 $('#time').append('<option value="' + store  +'">' + store + '</option>');
						
					
						 }
						 }
					 }
					 for(var i = 1;i<= to_to;i++)
					 {
						 if(i == 12)
						 {
							 $('#time').append('<option value="12:00 PM">12:00 PM</option>'); 
							
							
						 }
						 for(var j=0;j<=60;j=j+60)
						 {
							 if(i == 12)
							 {
								 
							 }
							 else
							 {
							 if(j == 0)
							 {
							var store=i + ':0' + j + ' PM';
							 }
							 else
							 {
								var store=i + ':' + j + ' PM'; 
							 }
							if(j == 60)
							{
								break;
							}
						 $('#time').append('<option value="' + store  +'">' + store + '</option>');
						
						
						 }
						 }
					 }
					 
				 } 
				  if(slide == 5)
				 {
					 $('#time option[value!="0"]').remove();
					 $('#time').append('<option value="">Please Select</option>');
					 for(var i = from;i <= 12;i++)
					 {
						 if(i == 12)
						 {
							 $('#time').append('<option value="12:00 AM">12:00 AM</option>'); 
							 $('#time').append('<option value="12:05 PM">12:05 PM</option>'); 
							 $('#time').append('<option value="12:10 PM">12:10 PM</option>'); 
							 $('#time').append('<option value="12:15 PM">12:15 PM</option>'); 
							 $('#time').append('<option value="12:20 PM">12:20 PM</option>'); 
							 $('#time').append('<option value="12:25 PM">12:25 PM</option>'); 
							 $('#time').append('<option value="12:30 PM">12:30 PM</option>'); 
							 $('#time').append('<option value="12:35 PM">12:35 PM</option>'); 
							 $('#time').append('<option value="12:40 PM">12:40 PM</option>'); 
							 $('#time').append('<option value="12:45 PM">12:45 PM</option>'); 
							 $('#time').append('<option value="12:50 PM">12:50 PM</option>'); 
							 $('#time').append('<option value="12:55 PM">12:55 PM</option>'); 
						 }
						 for(var j=0;j<=60;j=j+05)
						 {
							 if(i == 12)
							 {
								 
							 }
							 else
							 {
							 if(j == 0 || j == 5)
							 {
							var store=i + ':0' + j + ' AM';
							 }
							 else
							 {
								var store=i + ':' + j + ' AM'; 
							 }
							if(j == 60)
							{
								break;
							}
						 $('#time').append('<option value="' + store  +'">' + store + '</option>');
						
					
						 }
						 }
					 }
					 for(var i = 1;i<= to_to;i++)
					 {
						 if(i == 12)
						 {
							 $('#time').append('<option value="12:00 AM">12:00 AM</option>'); 
							 $('#time').append('<option value="12:05 AM">12:05 AM</option>'); 
							 $('#time').append('<option value="12:10 AM">12:10 AM</option>'); 
							 $('#time').append('<option value="12:15 AM">12:15 AM</option>'); 
							 $('#time').append('<option value="12:20 AM">12:20 AM</option>'); 
							 $('#time').append('<option value="12:25 AM">12:25 AM</option>'); 
							 $('#time').append('<option value="12:30 AM">12:30 AM</option>'); 
							 $('#time').append('<option value="12:35 AM">12:35 AM</option>'); 
							 $('#time').append('<option value="12:40 AM">12:40 AM</option>'); 
							 $('#time').append('<option value="12:45 AM">12:45 AM</option>'); 
							 $('#time').append('<option value="12:50 AM">12:50 AM</option>'); 
							 $('#time').append('<option value="12:55 AM">12:55 AM</option>'); 
						 }
						 for(var j=0;j<=60;j=j+05)
						 {
							 if(i == 12)
							 {
								 
							 }
							 else
							 {
							 if(j == 0 || j == 5)
							 {
							var store=i + ':0' + j + ' PM';
							 }
							 else
							 {
								var store=i + ':' + j + ' PM'; 
							 }
							if(j == 60)
							{
								break;
							}
						 $('#time').append('<option value="' + store  +'">' + store + '</option>');
							}
						 }
					 }
					 
				 }
				if($('#slot').val() != undefined){
					var slide = $('#slot').val();
				} else {
					var slide = '30';
				}
				var cnt=$('select#time option').length;
				var date_app=$('#appointment_from').val();
				var date = date_app.split('/');
				var final_date=date[2]+'-'+date[1]+'-'+date[0];
				spl=$('#date').val().split(',');
				spl_end=$('#date1').val().split(',');
				for(var i=0;i<spl.length;i++)
				{
					var spl1=spl[i].split(' ');
					var spl2=spl_end[i].split(' ');
					var value = spl1[1].split(':'); 
					if(value[0] < 10){
						v1 = ("0" + value[0]).slice(-1);
					} else {
						v1 = value[0].slice(-1);
					}
					
					var v1 = spl2[1].split(':'); 
					if(v1[0] < 10){
						var end_time = ("0" + v1[0]).slice(-1)+':' + v1[1] +' '+spl2[2];
					} else {
						var end_time = v1[0]+':' + v1[1] +' '+spl2[2];
					}
					
					var v = spl1[1].split(':'); 
					if(v[0] < 10){
						var time = ("0" + v[0]).slice(-1)+':' + v[1] +' '+spl1[2];
					} else {
						var time = v[0]+':' + v[1] +' '+spl1[2];
					}
					
					if(final_date == spl1[0])
					{
						
						$("#time option[value = '" + time + "' ]").remove();
						for(var j=0; j < cnt; j++)
						{    
							if($('#slot').val() != undefined){
								var slide = $('#slot').val();
							} else {
								var slide = '30';
							}
							var val = time.split(':');  
							var value = val[1].split(' ');
							if(slide == '30'){
								if(parseInt(value[0])+parseInt(slide) == 60){
									if((parseInt(val[0])+1) == 13){
										var hr = '01'+':'+'00 PM';
									} else {
										var hr = (parseInt(val[0])+1)+':'+'00 '+value[1];
									}
								} else {
									if(val[0] == 12){
										var hr = (val[0])+':'+'30 PM';
									} else {
										var hr = (val[0])+':'+'30 '+value[1];
									}
								}
							}
							if(slide == '15'){
								if(parseInt(value[0])+parseInt(slide)  == '60'){
									if((parseInt(val[0])+1) == 13){
										var hr = '01'+':'+'00 PM';
									} else {
										var hr = (parseInt(val[0])+1)+':'+'00 '+value[1];
									}
								} else {
									if(val[0] == '12' && value[1] != 'PM'){
									  var hr = val[0]+':'+(parseInt(value[0])+parseInt(slide))+' PM';
									} else {	
									  var hr = val[0]+':'+(parseInt(value[0])+parseInt(slide))+' '+ value[1];
									}
								}
							}
							if(slide == '5'){
								if(parseInt(value[0])+parseInt(slide)  == '60'){
									if((parseInt(val[0])+1) == 13){
										var hr = '01'+':'+'00 PM';
									} else {
										var hr = (parseInt(val[0])+1)+':'+'00 '+value[1];
									}
								} else {
									if(val[0] == '12' && value[1] != 'PM'){
									  var hr = val[0]+':'+(parseInt(value[0])+parseInt(slide))+' PM';
									} else {	
									  var hr = val[0]+':'+(parseInt(value[0])+parseInt(slide))+' '+ value[1];
									}
								}
							}
							if(slide == '60'){
								if((parseInt(val[0])+1) == 13){
										var hr = '01'+':'+'00 PM';
								} else {
										var hr =  (parseInt(val[0])+1)+':'+'00 '+value[1];
								}
							}
							$("#time option[value = '" + time + "' ]").remove();
							var time = hr; 
							if(end_time == hr || end_time < hr) {
								break;
							}
					    } 
					}
				}
						
				
	   });
		
	    var date1 = $('#appointment_from').val();
	    var date = date1.split('/');
		var d = new Date(date[2],date[1]-1,date[0]);
		var dayOfWeek = d.getUTCDay();
		if($('#slot').val() != undefined){
			var slide = $('#slot').val();
		} else {
			var slide = '30';
		}
		if(dayOfWeek == '0')
		{
			var from = $('#monday_fn_from').val();
			var to_to= $('#monday_an_to').val();
			
		}
		else if(dayOfWeek == '1')
		{
			var from = $('#tuesday_fn_from').val();
			var to_to = $('#tuesday_an_to').val();
		}
		else if(dayOfWeek == '2')
		{
			var from = $('#wednesday_fn_from').val();
			var to_to = $('#wednesday_an_to').val();
		}
		else if(dayOfWeek == '3')
		{
			var from = $('#thursday_fn_from').val();
			var to_to = $('#thursday_an_to').val();
		}
		else if(dayOfWeek == '4')
		{
			var from = $('#friday_fn_from').val();
			var to_to = $('#friday_an_to').val();
		}
		else if(dayOfWeek == '5')
		{
			var from = $('#saturday_fn_from').val();
			var to_to = $('#saturday_an_to').val();
		}
		else
		{
			var from = $('#sunday_fn_from').val();
			var to_to = $('#sunday_an_to').val();
		}
		if(from == undefined){
			var from = '7';
			var to_to = '10';
		}			
			
		if(slide == 30)
				 {
					
					 
					for(var i = from ;i <= 12; i++)
					 {
						 if(i == 12)
						 {
							 $('#time').append('<option value="12:00 AM">12:00 AM</option>'); 
							  $('#time').append('<option value="12:30 PM">12:30 PM</option>'); 
						 }
						 for(var j = 0; j <= 60;j = j+30)
						 {
							 if(i == 12)
							 {
								 
							 }
							 else
							 {
								 if(j == 0)
								 {
									var store = i + ':0' + j + ' AM';
								 }
								 else
								 {
									var store= i + ':' + j + ' AM'; 
								 }
								if(j == 60)
								{
									break;
								}
								
								$('#time').append('<option value="' + store  +'">' + store + '</option>');
						
							}
						 }
					 }
					 for(var i = 1 ;i < to_to ; i++)
					 {
						 if(i == 12)
						 {
							 $('#time').append('<option value="12:00 PM">12:00 PM</option>'); 
							 $('#time').append('<option value="12:30 AM">12:30 AM</option>');
							 
						 }
						 for(var j = 0;j <= 60;j = j+30)
						 {
							 if(i == 12)
							 {
								 
							 }
							 else
							 {
									 if(j == 0)
									 {
									var store=i + ':0' + j + ' PM';
									 }
									 else
									 {
										var store=i + ':' + j + ' PM'; 
									 }
									if(j == 60)
									{
										break;
									}
								 $('#time').append('<option value="' + store  +'">' + store + '</option>');
							}
						 }
					 }
					 
				 }
				 if(slide == 15)
				 {
					
					 for(var i = from;i <= 12;i++)
					 {
						 if(i == 12)
						 {
							 $('#time').append('<option value="12:00 AM">12:00 AM</option>'); 
							 $('#time').append('<option value="12:15 PM">12:15 PM</option>'); 
							 $('#time').append('<option value="12:30 PM">12:30 PM</option>'); 
							 $('#time').append('<option value="12:45 PM">12:45 PM</option>'); 
						 }
						 for(var j=0;j<=60;j=j+15)
						 {
							 if(i == 12)
							 {
								 
							 }
							 else
							 {
							 if(j == 0)
							 {
							var store=i + ':0' + j + ' AM';
							 }
							 else
							 {
								var store=i + ':' + j + ' AM'; 
							 }
							if(j == 60)
							{
								break;
							}
						   $('#time').append('<option value="' + store  +'">' + store + '</option>');
						  }
						}
					 }
					for(var i = 1;i<=to_to;i++)
					 {
						 if(i == 12)
						 {
							 $('#time').append('<option value="12:00 PM">12:00 PM</option>'); 
							 $('#time').append('<option value="12:15 AM">12:15 AM</option>'); 
							 $('#time').append('<option value="12:30 AM">12:30 AM</option>'); 
							 $('#time').append('<option value="12:45 AM">12:45 AM</option>'); 
						 }
						 for(var j=0;j<=60;j=j+15)
						 {
							 if(i == 12)
							 {
								 
							 }
							 else
							 {
								 if(j == 0)
								 {
								var store=i + ':0' + j + ' PM';
								 }
								 else
								 {
									var store=i + ':' + j + ' PM'; 
								 }
								if(j == 60)
								{
									break;
								}
									$('#time').append('<option value="' + store  +'">' + store + '</option>');
							}
						 }
					 }
				 }
				 if(slide == 60)
				 {
					 for(var i = from;i <= 12;i++)
					 {
						 if(i == 12)
						 {
							 $('#time').append('<option value="12:00 AM">12:00 AM</option>'); 
								
						 }
						 for(var j=0;j<=60;j=j+60)
						 {
							 if(i == 12)
							 {
								 
							 }
							 else
							 {
							 if(j == 0)
							 {
							var store=i + ':0' + j + ' AM';
							 }
							 else
							 {
								var store=i + ':' + j + ' AM'; 
							 }
							if(j == 60)
							{
								break;
							}
						 $('#time').append('<option value="' + store  +'">' + store + '</option>');
						
					
						 }
						 }
					 }
					 for(var i = 1;i<= to_to;i++)
					 {
						 if(i == 12)
						 {
							 $('#time').append('<option value="12:00 PM">12:00 PM</option>'); 
							
							
						 }
						 for(var j=0;j<=60;j=j+60)
						 {
							 if(i == 12)
							 {
								 
							 }
							 else
							 {
							 if(j == 0)
							 {
							var store=i + ':0' + j + ' PM';
							 }
							 else
							 {
								var store=i + ':' + j + ' PM'; 
							 }
							if(j == 60)
							{
								break;
							}
						    $('#time').append('<option value="' + store  +'">' + store + '</option>');
						
						
						 }
						 }
					 }
					 
				 } 
				  if(slide == 5)
				 {
					for(var i = from;i <= 12;i++)
					 {
						 if(i == 12)
						 {
							 $('#time').append('<option value="12:00 AM">12:00 AM</option>'); 
							 $('#time').append('<option value="12:05 PM">12:05 PM</option>'); 
							 $('#time').append('<option value="12:10 PM">12:10 PM</option>'); 
							 $('#time').append('<option value="12:15 PM">12:15 PM</option>'); 
							 $('#time').append('<option value="12:20 PM">12:20 PM</option>'); 
							 $('#time').append('<option value="12:25 PM">12:25 PM</option>'); 
							 $('#time').append('<option value="12:30 PM">12:30 PM</option>'); 
							 $('#time').append('<option value="12:35 PM">12:35 PM</option>'); 
							 $('#time').append('<option value="12:40 PM">12:40 PM</option>'); 
							 $('#time').append('<option value="12:45 PM">12:45 PM</option>'); 
							 $('#time').append('<option value="12:50 PM">12:50 PM</option>'); 
							 $('#time').append('<option value="12:55 PM">12:55 PM</option>'); 
						 }
						 for(var j=0;j<=60;j=j+05)
						 {
							 if(i == 12)
							 {
								 
							 }
							 else
							 {
							 if(j == 0 || j == 5)
							 {
							var store=i + ':0' + j + ' AM';
							 }
							 else
							 {
								var store=i + ':' + j + ' AM'; 
							 }
							if(j == 60)
							{
								break;
							}
						    $('#time').append('<option value="' + store  +'">' + store + '</option>');
						 }
						}
					 }
					 for(var i = 1;i<= to_to;i++)
					 {
						 if(i == 12)
						 {
							 $('#time').append('<option value="12:00 AM">12:00 AM</option>'); 
							 $('#time').append('<option value="12:05 AM">12:05 AM</option>'); 
							 $('#time').append('<option value="12:10 AM">12:10 AM</option>'); 
							 $('#time').append('<option value="12:15 AM">12:15 AM</option>'); 
							 $('#time').append('<option value="12:20 AM">12:20 AM</option>'); 
							 $('#time').append('<option value="12:25 AM">12:25 AM</option>'); 
							 $('#time').append('<option value="12:30 AM">12:30 AM</option>'); 
							 $('#time').append('<option value="12:35 AM">12:35 AM</option>'); 
							 $('#time').append('<option value="12:40 AM">12:40 AM</option>'); 
							 $('#time').append('<option value="12:45 AM">12:45 AM</option>'); 
							 $('#time').append('<option value="12:50 AM">12:50 AM</option>'); 
							 $('#time').append('<option value="12:55 AM">12:55 AM</option>'); 
						 }
						 for(var j=0;j<=60;j=j+05)
						 {
							 if(i == 12)
							 {
								 
							 }
							 else
							 {
							 if(j == 0 || j == 5)
							 {
							var store=i + ':0' + j + ' PM';
							 }
							 else
							 {
								var store=i + ':' + j + ' PM'; 
							 }
							if(j == 60)
							{
								break;
							}
								$('#time').append('<option value="' + store  +'">' + store + '</option>');
							}
						 }
					 }
					 
				 }
				 if(slide == 45)
				 {
					        // $('#time option[value!="0"]').remove();
							 //$('#time').append('<option value="">Please Select</option>');
					         $('#time').append('<option value="6:00 AM">6:00 AM</option>'); 
					         $('#time').append('<option value="6:45 AM">6.45:00 AM</option>'); 
					         $('#time').append('<option value="7:30 AM">7:30 AM</option>'); 
							 $('#time').append('<option value="8:15 AM">8:15 AM</option>');
							 $('#time').append('<option value="9:00 AM">9:00 AM</option>');
							 $('#time').append('<option value="9:45 AM">9:45 AM</option>');
							 $('#time').append('<option value="10:30 AM">10:30 AM</option>');
							 $('#time').append('<option value="11:15 AM">11:15 AM</option>');
							 $('#time').append('<option value="12:00 AM">12:00 PM</option>');
							 $('#time').append('<option value="12:45 PM">12:45 PM</option>');
							 $('#time').append('<option value="1:30 PM">1:30 PM</option>');
							 $('#time').append('<option value="2:15 PM">2:15 PM</option>');
							 $('#time').append('<option value="3:00 PM">3:00 PM</option>');
							 $('#time').append('<option value="3:45 PM">3:45 PM</option>');
							 $('#time').append('<option value="4:30 PM">4:30 PM</option>');
							 $('#time').append('<option value="5:15 PM">5:15 PM</option>');
							 $('#time').append('<option value="6:00 PM">6:00 PM</option>');
							 $('#time').append('<option value="6:45 PM">6:45 PM</option>');
							 $('#time').append('<option value="7:30 PM">7:30 PM</option>');
							 $('#time').append('<option value="8:15 PM">8:15 PM</option>');
							 $('#time').append('<option value="9:00 PM">9:00 PM</option>');
		        }
				if($('#slot').val() != undefined){
					var slide = $('#slot').val();
				} else {
					var slide = '30';
				}
				var cnt=$('select#time option').length;
				var date_app=$('#appointment_from').val();
				var date = date_app.split('/');
				var final_date=date[2]+'-'+date[1]+'-'+date[0];
				spl=$('#date').val().split(',');
				spl_end=$('#date1').val().split(',');
				for(var i=0;i<spl.length;i++)
				{
					var spl1=spl[i].split(' ');
					var spl2=spl_end[i].split(' ');
					var value = spl1[1].split(':'); 
					if(value[0] < 10){
						v1 = ("0" + value[0]).slice(-1);
					} else {
						v1 = value[0].slice(-1);
					}
					
					var v1 = spl2[1].split(':'); 
					if(v1[0] < 10){
						var end_time = ("0" + v1[0]).slice(-1)+':' + v1[1] +' '+spl2[2];
					} else {
						var end_time = v1[0]+':' + v1[1] +' '+spl2[2];
					}
					
					var v = spl1[1].split(':'); 
					if(v[0] < 10){
						var time = ("0" + v[0]).slice(-1)+':' + v[1] +' '+spl1[2];
					} else {
						var time = v[0]+':' + v[1] +' '+spl1[2];
					}
					
					if(final_date == spl1[0])
					{
						
						for(var j=0; j < cnt; j++)
						{    
							if($('#slot').val() != undefined){
								var slide = $('#slot').val();
							} else {
								var slide = '30';
							}
							var val = time.split(':');  
							var value = val[1].split(' ');
							if(slide == '30'){
								if(parseInt(value[0])+parseInt(slide) == 60){
									if((parseInt(val[0])+1) == 13){
										var hr = '01'+':'+'00 PM';
									} else {
										var hr = (parseInt(val[0])+1)+':'+'00 '+value[1];
									}
								} else {
									if(val[0] == 12){
										var hr = (val[0])+':'+'30 PM';
									} else {
										var hr = (val[0])+':'+'30 '+value[1];
									}
								}
							}
							if(slide == '15'){
								if(parseInt(value[0])+parseInt(slide)  == '60'){
									if((parseInt(val[0])+1) == 13){
										var hr = '01'+':'+'00 PM';
									} else {
										var hr = (parseInt(val[0])+1)+':'+'00 '+value[1];
									}
								} else {
									if(val[0] == '12' && value[1] != 'PM'){
									  var hr = val[0]+':'+(parseInt(value[0])+parseInt(slide))+' PM';
									} else {	
									  var hr = val[0]+':'+(parseInt(value[0])+parseInt(slide))+' '+ value[1];
									}
								}
							}
							if(slide == '5'){
								if(parseInt(value[0])+parseInt(slide)  == '60'){
									if((parseInt(val[0])+1) == 13){
										var hr = '01'+':'+'00 PM';
									} else {
										var hr = (parseInt(val[0])+1)+':'+'00 '+value[1];
									}
								} else {
									if(val[0] == '12' && value[1] != 'PM'){
									  var hr = val[0]+':'+(parseInt(value[0])+parseInt(slide))+' PM';
									} else {	
									  var hr = val[0]+':'+(parseInt(value[0])+parseInt(slide))+' '+ value[1];
									}
								}
							}
							if(slide == '60'){
								if((parseInt(val[0])+1) == 13){
										var hr = '01'+':'+'00 PM';
								} else {
										var hr =  (parseInt(val[0])+1)+':'+'00 '+value[1];
								}
							}
							
							if(end_time == hr || end_time < hr) {
								break;
							}
							var time = hr; 
					    } 
					}
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
</body>
</html>