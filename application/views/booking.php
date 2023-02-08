<!DOCTYPE html>
<html lang="en">
<head>
<title><?php //echo ucfirst($this->session->userdata('username')); ?>Physio Plus Tech</title><!-- Favicon --><link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/x-icon" />
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/fullcalendar.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/uniform.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/select2.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/physio_style.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/physio_media.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>font-awesome/css/font-awesome.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo base_url(); ?>flick/jquery-ui-1.10.2.custom.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.gritter.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/colorbox.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/physio_helper.css" />
<link href="<?php echo base_url(); ?>css/jquery.alerts.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.alerts.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/colorpicker.css" />
<style script="text/css">
xtr:hover{background:#f9f9f9;}
.timeline {
	position: absolute;
	left: 59px;
	border: none;
	border-top: 1px solid red;
	width: 100%;
	margin: 0;
	padding: 0;
	z-index: 999;
}
</style>
</head>
<body>


<p align="center">
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-group"></i> Home</a> <a href="#">View schedule</a></div>
  	<h1>Appointment Booking</h1>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
<div class="container-fluid">
    <hr>
    <div class="row-fluid" style="margin-bottom: 15px;">
        <div class="span3">
        	<span style="display: inline-block; width: 250px;">
        	<select  name="consultantList" id="consultantList">
                <option value="0">All Consultants</option>
                <?php
					if($consultants != false) {
						foreach($consultants as $consultant){							
							echo'<option  value="'.$consultant['staff_id'].'" >'.ucfirst($consultant['first_name']).' '.ucfirst($consultant['last_name']).'</option>';	
						}
					}
				?>
            </select>
            </span>
        </div>
        <div class="span5" style="position:relative">
        	<span style="position: absolute; left: 0; bottom: 0;">
        	<span><strong>Today's schedule - </strong></span>
            <span> Scheduled : </span>
            <span class="badge badge-important" id="scheduledCount"><?php echo $scheduledCount; ?></span>
            <span> Checked out : </span>
            <span class="badge badge-info" id="checkedCount"><?php echo $checkedCount; ?></span>
            </span>
        </div>
     
    </div>
	<div class="row-fluid">
		<div class="span12">
			<?php 
			if($doctor != false) {
				foreach($doctor as $doctors){
					$drColor = $doctors['dr_color'];
					echo '<span class="label label-important" style="background:'.$drColor.';margin-bottom:7px">'.ucfirst($doctors['first_name']).' '.ucfirst($doctors['last_name']).'</span>&nbsp;&nbsp;&nbsp;';
				}
			}
			?>
        </div>
	<div>
     <!--<div class="row-fluid">
        <div class="span3">
        	<select placeholder="Doctor">
            	<option></option>
                <option value="0">All doctors</option>
                <option value="1">Ram prakash</option>
                <option value="2">Muthukumar</option>
            </select>
        </div>
        <div class="span3 pull-right">
            <h5 style="text-align:right; margin-top: 0">Today's Schedule</h5>
            <ul class="site-stats" style="text-align:right">
                <li class="bg_lr" style="width:32%"> <strong>120</strong> <small>Scheduled</small></li>
                <li class="bg_lb" style="width:32%; margin-right: 0;"> <strong>2540</strong> <small>Checked out</small></li>
            </ul>
        </div>
        <div class="span3 pull-right">
        	<a href="#" class="btn"><i class="icon icon-cog"></i> Settings</a>
        </div>
    </div>-->
    
    <div class="row-fluid">
    
	<div class="span12">
        <div class="widget-box widget-calendar" style="margin-bottom:5px">
          <div class="widget-title"> <span class="icon"><i class="icon-calendar"></i></span>
            <h5>All Consultants</h5>
            
          </div>
          <div class="widget-content">
            <div class="panel-left" style="margin-top: 10px;">
              <div id="calendar"></div>
              <div class="clr"></div>
            </div>
            
          </div>
        </div>
      </div>
        
	</div>
</div>
</div>
</p>
<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy;  Brought to you by <a href="#">physioplustech.com</a> </div>
</div>

<!--end-Footer-part-->
<!-- Script useage -->
<div class="boxOverlay" id="AppointmentMask"></div>
<div id="AddAppointment" class="row-fluid appointmentBox">
<a href="#" class="closeBox" id="CloseAppointment">Close appointment</a>
<div class="widget-box" style="margin: 0">
<div id="flashData" style="display:none"></div>
<?php if($this->session->flashdata('warning')): echo '<div class="alert alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>'.$this->session->flashdata('warning').'</div>'; endif; ?>
<div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
  <h5>New Appointment</h5>
</div>

<div class="widget-content nopadding">
  <form method="post" action="" class="form-horizontal" name="AppointmentForm" id="AppointmentForm">
    <div class="control-group">
      <label class="control-label">Consultant :</label>
      <div class="controls">
        <select name="Consultant" id="Consultant" placeholder="Please select consultant">
            <option></option>
            <?php
            if($consultants != false) {
                foreach($consultants as $consultant){
                    echo'<option data-code="'.$consultant['staff_code'].'" value="'.$consultant['staff_id'].'">'.ucfirst($consultant['first_name']).' '.ucfirst($consultant['last_name']).'</option>';	
                }
            }
            ?>
        </select>
      </div>
    </div>
	  <div class="control-group">
      <label class="control-label">Available Slots :</label>
      <div class="controls">
        <div class="span12">
			<?php 
			if($doctor != false) {
				foreach($doctor as $doctors){
					$drColor = $doctors['dr_color'];
					echo '<span class="label label-important" style="background:'.$drColor.';margin-bottom:7px">'.'9:00'.' '.'AM'.'</span>&nbsp;&nbsp;&nbsp;';
				}
			}
			?>
        </div>
      </div>
    </div>
	
    <div class="control-group">
      <label class="control-label">Patient :</label>
      <div class="controls">
        <select name="Patient" id="Patient" placeholder="Please select patient">
            <option></option>
            <?php
            if($patients != false) {
                foreach($patients as $patient){
                    echo'<option data-code="'.$patient['patient_code'].'" value="'.$patient['patient_id'].'">'.ucfirst($patient['first_name']).' '.ucfirst($patient['last_name']).'   ('.$patient['patient_code'].')'.'</option>';	
                }
            }
            ?>
        </select>
		<a style="margin:3px 0 0 0" data-width="520" data-height="480" href="<?php echo base_url().'client/iframe/patient_add_popup/sch' ?>" class="iframePopup btn btn-info btn-mini"><i class="icon-plus"></i> Add Patient</a>
      </div>
    </div>
    <div class="control-group">
	  <label class="control-label">Appointments To</label>
	  <div class="controls">
		<div class="input-append date" style="padding:0">
		  <input type="text" value=""  class="span11 PhysioDatePicker" id="appointment_to" name="appointment_to" readonly  style="cursor: pointer">
		</div>
	  </div>
	</div>
	<div class="control-group" >
	  <label class="control-label">Visit type:</label>
	  <div class="controls" >
		<table >
			<td >
				<label>
				<input type="radio" name="firstvisit_followup"  value="0" />
				First visit</label>
			</td>
			<td width="10px"></td>
			<td>
				<label>
				<input type="radio" name="firstvisit_followup"  value="1" />
				Follow up</label>
			</td>
		</table>
	  </div>
	</div>
    <div class="control-group">
      <label class="control-label">Notify to consultant:</label>
      <div class="controls">
        <label>
          <input type="checkbox" name="NotifyEmailDoctor" id="NotifyEmailDoctor" value="1" />
          Email</label>
        <label>
          <input type="checkbox" name="NotifySmsDoctor" id="NotifySmsDoctor" value="1" />
          Sms Now</label>
		  <label>
          <input type="checkbox" name="NotifySmsDoctor" id="NotifySmsDoctor" value="2" />
          Sms Only Morning</label>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label">Notify to patient:</label>
      <div class="controls">
        <label>
          <input type="checkbox" name="NotifyEmailPatient" id="NotifyEmailPatient" value="1" />
          Email</label>
        <label>
          <input type="checkbox" name="NotifySmsPatient" id="NotifySmsPatient" value="1" />
          Sms Now</label>
		  <label>
		   <input type="checkbox" name="NotifySmsPatient" id="NotifySmsPatient" value="2" />
          Sms Only Morning</label>
        
      </div>
    </div>
    <div class="form-actions" style="text-align: right">
      <span class="saveAppoinmentLoader"><span><img src="<?php echo base_url().'img/spinner.gif'; ?>"> Saving appointment...</span></span>
      <input type="hidden" name="start" id="start" value="">
      <input type="hidden" name="end" id="end" value="">
      <button type="submit" class="btn btn-success" style="margin-right:10px">Save</button>
      <button type="button" class="btn btn-success" id="CancelAppointment">Cancel</button>
    </div>
  </form>
</div>
</div>    
</div>

<div class="boxOverlay" id="ResendMask"></div>
<div id="ResendNotification" class="row-fluid appointmentBox">
<a href="#" class="closeBox" id="CloseResend">Close appointment</a>
<div class="widget-box" style="margin: 0">
<div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
  <h5>Appointment details</h5>
</div>
<div class="widget-content nopadding">
  <form method="post" class="form-horizontal" name="AppointmentDelete" id="AppointmentDelete">
    <div class="control-group">
      <label class="control-label">Consultant :</label>
      <div class="controls" id="ConsultantText" style="padding:15px 0 5px 0;"></div>
    </div>
    <div class="control-group">
      <label class="control-label">Patient :</label>
      <div class="controls" id="PatientText" style="padding:15px 0 5px 0;"></div>
    </div>
	 <div class="control-group">
      <label class="control-label">Reason for Cancel :</label>
		<textarea rows="4" cols="50" id="Reson_cancel" name="Reson_cancel"></textarea>
		<p id="cancel_text"><center><h6 style="color:#F00">Only 150 Characters allowed</h6></center></p>
    </div>
    
    <!--<div class="control-group">
      <label class="control-label">Notify :</label>
      <div class="controls">
        <label>
          <input type="checkbox" name="ResendEmail" id="ResendEmail" value="1" />
          Email</label>
        <label>
          <input type="checkbox" name="ResendSms" id="ResendSms" value="1" />
          Sms</label>
        
      </div>
    </div>-->
    <div class="form-actions" style="text-align: right">
		<input type="hidden" name="appointment_id" id="appointment_id">
      <span class="processingLoader" style="display:none"><span><img src="<?php echo base_url().'img/spinner.gif'; ?>"> Processing...</span></span>
	  <button type="submit" class="btn btn-danger" id="DeleteAppointment">Delete</button>
      <button type="button" class="btn btn-success" style="margin-right:10px" id="CheckOut">Check Out</button>
	  <button type="button" class="btn btn-success" id="CancelDelAppointment">Cancel</button>
    </div>
  </form> 
</div>

<!--<div id="Canceldialog" title="Sure You want to cancel Appointment?">
<form  method="POST" name="cancel_form" id="cancel_form">
<label class="control-label">Rosen for Cancel :</label>
<textarea rows="4" cols="50" id="Reson_cancel" name="Reson_cancel"></textarea>
<input type="hidden" name="appointment_id" id="appointment_id">
<input type="submit" value="Conform" id="cancel_app">
</form>
</div>-->

</div>    
</div>



<script src="<?php echo base_url(); ?>js/excanvas.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery-ui-1.10.2.custom.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.gritter.min.js"></script> 
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>js/fullcalendar.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.uniform.js"></script> 
<script src="<?php echo base_url(); ?>js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.peity.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.colorbox-min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.form.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.alerts.js"></script>
<script src="<?php echo base_url(); ?>js/physio_helper.js"></script>
<script src="<?php echo base_url(); ?>js/physio_controller.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.alerts.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.colorpicker-min.js"></script>
<script>
function setTimeline(view) {
    var parentDiv = jQuery(".fc-agenda-slots:visible").parent();
    var timeline = parentDiv.children(".timeline");
    if (timeline.length == 0) { //if timeline isn't there, add it
        timeline = jQuery("<hr>").addClass("timeline");
        parentDiv.prepend(timeline);
    }

    var curTime = new Date();

    var curCalView = jQuery("#calendar").fullCalendar('getView');
    if (curCalView.visStart < curTime && curCalView.visEnd > curTime) {
        timeline.show();
    } else {
        timeline.hide();
        return;
    }

    var curSeconds = (curTime.getHours() * 60 * 60) + (curTime.getMinutes() * 60) + curTime.getSeconds();
    var percentOfDay = curSeconds / 86400; //24 * 60 * 60 = 86400, # of seconds in a day
    var topLoc = Math.floor(parentDiv.height() * percentOfDay);

    timeline.css("top", topLoc + "px");

    if (curCalView.name == "agendaWeek") { //week view, don't want the timeline to go the whole way across
        var dayCol = jQuery(".fc-today:visible");
        var left = dayCol.position().left + 1;
        var width = dayCol.width()-2;
        timeline.css({
            left: left + "px",
            width: width + "px"
        });
    }

}
$(document).ready(function() {
	$('.Physiocolorpicker').colorpicker();
	$('#Canceldialog').hide();
	
	//Reason for cancel text area
	$('#CancelDelAppointment').attr('disabled', true);
	$('#Reson_cancel').on('keyup',function() {
    if($(this).val() != '') {
        $('#CancelDelAppointment').attr('disabled' , false);
    }else{
        $('#CancelDelAppointment').attr('disabled' , true);
    }
	});
	
	
	
	//$( "#appointment_to" ).datepicker( "setDate" , $.currentDate() );
	var
	consultantId = $('#consultantList').val();
	var calendar = $('#calendar').fullCalendar({
		<?php
			if($settings['sch_slot'] != '')
				$sch_slot = $settings['sch_slot'];
			else
				$sch_slot = 30;
			
		?>
		
			<?php $max=max($sch_settings_inf['monday_an_to'] ,$sch_settings_inf['tuesday_an_to'],$sch_settings_inf['wednesday_an_to'],$sch_settings_inf['thursday_an_to'],$sch_settings_inf['friday_an_to'],$sch_settings_inf['saturday_an_to'],$sch_settings_inf['sunday_an_to']);?>
			<?php $min=min($sch_settings_inf['monday_fn_from'] ,$sch_settings_inf['tuesday_fn_from'],$sch_settings_inf['wednesday_fn_from'],$sch_settings_inf['thursday_fn_from'],$sch_settings_inf['friday_fn_from'],$sch_settings_inf['saturday_fn_from'],$sch_settings_inf['sunday_fn_from']);?>
		
		<?php $dmin='7am'?>
		<?php $dmax='10pm'?>
		
		
		slotMinutes: <?php echo  $sch_slot; ?>,
		minTime: '<?php if ($min != '') {echo  $min .='am' ;} else{ echo $dmin ;} ?>',
	   maxTime: '<?php if ($max != '') {echo $max .='pm';} else{ echo $dmax ;} ?>',
		defaultEventMinutes: 120,
		header: {
			left: 'prev,next,title',
			center: '',
			right: 'month,agendaWeek'
		},
		
		
		defaultView: 'month',
		viewDisplay: function(view) {
        try {
            setTimeline();
        } catch(err) {}
    },
		selectable: true,
		selectHelper: true,
		select: function(start, end, allDay) {
			
				$('#AppointmentMask').fadeIn(function(){
					$('#AddAppointment').center().fadeIn(function(){
						$('#start').val( start.YmdHis() );
						$('#end').val( end.YmdHis() );
					});
				});
			
			calendar.fullCalendar('unselect');
		},
		editable: false,

		//eventSources: [base_url + 'client/schedule/getAppointments/'+4],
		
		eventClick: function(object, e) {
			var
			consultant = $('#Consultant > option[value="' + object.staff_id + '"]'),
			patient = $('#Patient > option[value="' + object.patient_id + '"]');
			$('#ConsultantText').html('<strong>' + consultant.text().ucfirst() + '</strong> <em style="font-size:11px">(' + consultant.attr('data-code') +')</em>');
			$('#PatientText').html('<a href="<?php echo base_url(); ?>client/patient/view/' +object.patient_id+ ' "><strong>' + patient.text().ucfirst() + '</strong>');
			$('#appointment_id').val(object.appointment_id);
			$('#ResendMask').fadeIn(function(){	$('#ResendNotification').center().fadeIn() });
		}

	});
	
	$(document).on('change', '#consultantList', function(){
		var
		src = base_url + 'client/schedule/getAppointments/'+$(this).val();
		//src = base_url + 'client/schedule/getCurrMonthAppointments';
		$('#calendar').fullCalendar('removeEvents');
		$('#calendar').fullCalendar('addEventSource', src);
		$('#calendar').fullCalendar('rerenderEvents');
	});
	$('#consultantList').trigger('change');
	
	// close appointment box
	$('#AppointmentMask, #CloseAppointment, #CancelAppointment').click(function(e){
		e.preventDefault();
		$('#AddAppointment').fadeOut(function(){
			$('#AppointmentForm')[0].reset();
			$('#AppointmentForm').find('input[type="hidden"]').val('');
			$('#AppointmentForm').find('input[type="checkbox"]').removeAttr('checked');
			$.uniform.update('#NotifyEmailDoctor, #NotifySmsDoctor, #NotifyEmailPatient, #NotifySmsPatient');
			$('#AppointmentForm').find("select").select2("val", "");
			$('#AppointmentForm').showError(null);
			$('#AppointmentId').remove();
			$('#AppointmentMask').fadeOut();	
		})
	});
	
	// close Resend box
	$('#ResendMask, #CloseResend').click(function(e){
		e.preventDefault();
		$('#ResendNotification').fadeOut(function(){
			$('#appointment_id').val('');
			$("#Reson_cancel").val('');
			$('#CancelDelAppointment').attr('disabled', true);
			$('#ResendMask').fadeOut();	
		})
	});
	
	//save patient personal info
	$('#AppointmentForm').ajaxForm({
			url: base_url + 'client/ajax/addAppointment',
			dataType: 'json',
			beforeSerialize: function(){
				$('.saveAppoinmentLoader > span').show();	
			},
			success: function(data, status, xhr, form){
				$('.saveAppoinmentLoader > span').hide();
				if(data.status == 'failure'){
					if(data.flashData==''){
						form.showError(data.message);
					}else{
						form.showError(null);
						var strFlashdata = '<div class="alert alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>'+data.flashData+'</div>';
						$('#flashData').fadeIn();
						$('#flashData').html(strFlashdata);
					}
				} else {
					var
					src = base_url + 'client/schedule/getCurrMonthAppointments';
					$('#calendar').fullCalendar('removeEvents');
					$('#calendar').fullCalendar('addEventSource', src);
					$('#calendar').fullCalendar('rerenderEvents');
					$('#CloseAppointment').trigger('click');
					$.gritter.add({title:	'Success',text:	'Appointment has been saved successfully'});
					$('#scheduledCount').text(data.scheduledCount);
					$('#checkedCount').text(data.checkedCount);
					/*if(data.sms == true) {
						$.post(data.PatientUrl.patient);
						$.post(data.DoctorUrl.doctor);
					}*/
				}
			}
	});
	
	//$('#DeleteAppointment').click(function(){
	$('#AppointmentDelete').ajaxForm({
			url: base_url + 'client/ajax/deleteAppointment',
			dataType: 'json',
			beforeSerialize: function(){
				$('.processingLoader > span').show();	
			},
			success: function(data, status, xhr, form){
				$('.processingLoader > span').hide();
					if(data.status=='failure'){
						form.showError(data.message);
					} else {
						var
						src = base_url + 'client/schedule/getCurrMonthAppointments';
						$('#calendar').fullCalendar('removeEvents');
						$('#calendar').fullCalendar('addEventSource', src);
						$('#calendar').fullCalendar('rerenderEvents');
						//$("#calendar").fullCalendar('refetchEvents');
						//$('#CancelDelAppointment').trigger('click');
						$.gritter.add({title:	'Success',text:	'Appointment has been deleted successfully'});
						$('#scheduledCount').text(data.scheduledCount);
						$('#checkedCount').text(data.checkedCount);
						/*if(data.sms == true) {
							$.post(data.PatientUrl.patient);
							$.post(data.DoctorUrl.doctor);
						}*/
						$('#ResendNotification').fadeOut(function(){
							$('#ResendMask').fadeOut();	
							});
						
					}
			}
	});
	//});
	
	$('#CheckOut').click(function(){
		var appointment_id = $('#appointment_id').val();
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: base_url + 'client/ajax/checkoutAppointment/' + appointment_id, //The url where the server req would we made.
			beforeSend: function(){
				$('.processingLoader > span').show();
			},
			success: function(data) {
				$('.processingLoader > span').hide();
				if(data.status=='failure'){
					form.showError(data.message);
				} else {
					//$("#calendar").fullCalendar('refetchEvents');
					//$('#CheckOut').trigger('click');
					var
					src = base_url + 'client/schedule/getCurrMonthAppointments';
					$('#calendar').fullCalendar('removeEvents');
					$('#calendar').fullCalendar('addEventSource', src);
					$('#calendar').fullCalendar('rerenderEvents');
					$.gritter.add({title:	'Success',text:	'Appointment has been checked out successfully'});
					$('#scheduledCount').text(data.scheduledCount);
					$('#checkedCount').text(data.checkedCount);
					/*if(data.sms == true) {
						$.post(data.PatientUrl.patient);
						$.post(data.DoctorUrl.doctor);
					}*/
					$('#ResendNotification').fadeOut(function(){
							
							$('#ResendMask').fadeOut();	
					});
					
					window.location.assign("<?php echo base_url().'client/invoice/add/' ?>");
				}
			}, 
			/* complete: function(){
				$('#referal_type_id').parent().css('background', 'none');	
			}, */
			error: function(e){ // alert error if ajax fails
				alert(e.responseText);
			} 
		 }); //end AJAX
	});
	
	
	
	$('#CancelDelAppointment').click(function(){
		var appointment_id = $('#appointment_id').val();
		var Reson_cancel = $('#Reson_cancel').val();
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: base_url + 'client/ajax/cancelAppointment/' + appointment_id + '/' + Reson_cancel , //The url where the server req would we made.
			beforeSend: function(){
				$('.processingLoader > span').show();
			},
			success: function(data) {
				$('.processingLoader > span').hide();
				if(data.status=='failure'){
					form.showError(data.message);
				} else {
					var
					src = base_url + 'client/schedule/getCurrMonthAppointments';
					$('#calendar').fullCalendar('removeEvents');
					$('#calendar').fullCalendar('addEventSource', src);
					$('#calendar').fullCalendar('rerenderEvents');
					//$('#flashData').fadOut();
					
					//$('#calendar').fullCalendar( 'removeEvent', appointment_id );
					$.gritter.add({title:	'Success',text:	'Appointment has been cancel successfully'});
					$('#scheduledCount').text(data.scheduledCount);
					$('#checkedCount').text(data.checkedCount);
					$('#ResendNotification').fadeOut(function(){
							
							$('#ResendMask').fadeOut();	
					});
					
					$("#Reson_cancel").val('');
					$('#CancelDelAppointment').attr('disabled', true);
				}
			}, 
			
			error: function(e){ // alert error if ajax fails
				alert(e.responseText);
			} 
		 }); //end AJAX
	});
	
		
});

</script>
</body>
</html>
