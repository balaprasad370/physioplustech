<!DOCTYPE html>
<html>
	<head>
	 <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta http-equiv="Content-Language" content="en">
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
     <title>Daily Register - Physio Plus Tech</title>
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
	list-style-type:none;
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
.modal-backdrop, .blockOverlay {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1040;
    width: 100vw;
    height: 100vh;
    background-color: transparent;
}
.radio-green [type="radio"]:checked+label:after {
  border-color: #00C851;
  background-color: #00C851;
}
</style>	<?php include("sidebar.php");?>
            <div class="app-main__outer">
                <div class="app-main__inner">
			<?php if($this->uri->segment(5) != false && $this->uri->segment(5) != 'page' && $this->uri->segment(5) != 'date') {?>
                       <p style="color:#0b5885;background-color:#d0eeff;border-color:#bee7ff;padding:.75rem 1.25rem;" id="pat_close_msg">Please select the <strong>treatment name </strong> to change the visit status for this patient. <a style="float:right;" id="pat_close"> X </a></p>        
                   	<?php } ?>
			 <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
								<h5 class="card-title"> Daily Register
								</h5>
                                    <form  action="<?php echo base_url().'client/reports/add_session' ?>" method="post" parsley-validate role="form">
                                       <div class="row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="cn_date" class="">Date *</label>
												 <input name="sn_date"  id="sn_date" style="width:100%;" type="text" class="form-control datepicker" data-toggle="datepicker" parsley-trigger="change" parsley-required="true"></div>
											</div>
											<div class="col-md-6">
                                                 <div class="position-relative form-group"><label for="case_notes" class="">Patient Name *</label>
											     </br><select class="select-control patient_id" style="width:100%;"  parsley-trigger="change" parsley-required="true" id="patient_id" name="patient_id">
													 <option selected="true" style="width:300px;" disabled="disabled"> Choosing Existing Patient Name</option>
													 <?php  
															$id = $this->uri->segment(4);
															if($id != false && $id != 'page' && $id != 'date') { 
																$this->db->where('patient_id',$id);
																$this->db->select('first_name,patient_code,last_name,age')->from('tbl_patient_info');
																$res = $this->db->get();
																$patient_name = $res->row()->first_name.' '.$res->row()->last_name;
																$age = $res->row()->age;
																$code = $res->row()->patient_code; ?>
																<option value="<?php echo $id; ?>" <?php echo 'selected="selected"' ?> ><?php echo $patient_name.' '.'('.$code.')'. $age; ?></option>
															<?php } else {  ?>
															<?php
																if ($patient_name != false) {
																		foreach ($patient_name as $patient_names) {  
																			$last_name = ($patient_names['last_name'] == '') ? '' : ucfirst($patient_names['last_name']);
																			$age = ($patient_names['age'] == '0') ? '' : '('.$patient_names['age'].')';
																			echo '<option value="'.$patient_names['patient_id'].'">'.$patient_names['first_name'].' '.$last_name.'   ('.$patient_names['patient_code'].')  '.$age.'</option>';
																		}
																	} 
															  }  
															?>
													</select>
												 </div>
											</div>
											</div>
											<div class="staff_idss row">
											<div class="col-md-6">
                                                 <div class="position-relative form-group"><label for="case_notes" class="">Treatment Name *</label>
											     </br><select class="select-control treatment_id" style="width:100%;"  id="treatment_id" name="treatment_id">
													 <option selected="true" disabled="disabled"> Choosing Existing Treatment Name</option>
													<?php
														if ($treatment != false) {
															foreach ($treatment as $row) {
																   echo '<option value="'.$row['item_id'].'/'.$row['item_name'].'  ">'.$row['item_name'].'  </option>';
																}
															}
													?>
													</select>
												 </div>
											</div>
											<div class="col-md-6">
                                                 <div class="position-relative form-group"><label for="case_notes" class="">Staff Name *</label>
											    </br> <select class="select-control patient_id" style="width:100%;"   id="staff_ids" name="staff_ids">
													 <option value=""> Select Name</option>
													<?php  
															$sid = $this->uri->segment(5);
															if($sid != false && $sid != 'page' && $sid != 'date') { 
																$this->db->where('staff_id',$sid);
																$this->db->select('first_name,last_name,staff_id')->from('tbl_staff_info');
																$res = $this->db->get();
																$staff_name = $res->row()->first_name.' '.$res->row()->last_name;
																?>
																<option value="<?php echo $sid; ?>" <?php echo 'selected="selected"' ?> ><?php echo $staff_name; ?></option>
															<?php } else {  ?>	
													 <?php
														if ($doctor_name != false) {
															foreach ($doctor_name as $row) {
																$selected = ($this->session->userdata('staff_id') == $row['staff_id']) ? "selected=selected" : ""; 
																echo '<option value="'.$row['staff_id'].'" '.$selected.'>'.$row['first_name'].' '.$row['last_name'].'    </option>';
															}
														} }
														
														
													?>
													</select>
												 </div>
											</div>
											</div>
											<div class="row staff_id2">
												<div class="col-md-6">
                                                 <div class="position-relative form-group"><label for="case_notes" class="">Treatment Name *</label>
											     <input type="hidden" class="form-control" id="staff_id" name="staff_id">
											     <input type="hidden" class="form-control" id="treat" name="treat">
											     <input type="text" class="form-control" style="width:100%;"  id="treatment" name="treatment" >
												</div>
											  </div>
											  <div class="col-md-6">
                                                 <div class="position-relative form-group"><label for="case_notes" class="">Staff Name *</label>
											     <input type="text" class="form-control" style="width:100%;"  id="staf" name="staf" >
												</div>
											  </div>
										     </div>
											<div class="row">
											<div class="col-md-6">
                                                 <div class="position-relative form-group"><label for="case_notes" class="">No of Session (for each day) *</label>
											      <input type="text" class="form-control" style="width:100%;"  id="session_cont" name="session_cont" value="1"  autocomplete="off">
												 </div>
											</div>
											<div class="col-md-6">
                                                 <div class="position-relative form-group"><label for="case_notes" class="">Progress Note</label>
											       <textarea class="form-control" style="width:100%;"  id="sess_comment" name="sess_comment" rows="3"></textarea>  
												</div>  
											</div>
                                         </div>
									     <div class="bill">
										   <table><tr><td><h6><div class="position-relative form-group"><label for="case_notes" class="">Bill Generate&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
													<div class="custom-checkbox custom-control custom-control-inline"><input type="checkbox" value="1" name="bill_gen" id="exampleCustomInline" class="custom-control-input"><label class="custom-control-label" for="exampleCustomInline">
                                                     </label></div>										   
											  </div></h6>
										   </td></tr></table>
										</div></br>
                                      
                                            <div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary" id="save">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
                                            </div>
										
                                    </form></br></br>
									 <div class="divider"></div>
									<h5 class="card-title"> Daily Register List
								</h5>
									 <div class="table-responsive">
									 
									  <table class="table table-striped table-bordered" style="">
									 <tr>
											    <td>   <input type="text" style="width: " autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="From" id="from" data-toggle="datepicker"/>
                                                </td>
												<td>   <input type="text" style="width: " autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="To" id="to" data-toggle="datepicker"/>
                                                </td>
												<td><button class="btn btn-pill btn-success" id="dateFilter" > Go</button>
												  <?php if($this->uri->segment(4) == 'date') { ?>
												  &nbsp;&nbsp;<a class="btn btn-pill btn-alternate" href="<?php echo base_url().'client/reports/print_session/date/'.$this->uri->segment(5).'/'.$this->uri->segment(6); ?>" target="_blank">Print</a>
												  <?php } ?>
												</td>
												</tr>
												</table>
												
										<?php if($session_report != false) { ?>
										  <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
												<th class="text-center" style="width:4%;">S.No</th>
												<th class="text-center" style="width:15%;">Date</th>
												 
												<th class="text-center" style="width:20%;">Patient Name</th>
												<th class="text-center" style="width:15%;">Treatment</th>
												<th class="text-center" style="width:15%;">Staff Name</th>
												<th class="text-center" style="width:5%;" >No of Session</th>
												<th class="text-center" style="width:5%;" >Bill Status</th>
												<th class="text-center" style="width:25%;">Action</th>
											  </tr>
											</thead>
											<tbody>
											<?php $i=1;  foreach($session_report as $row) {
												$this->db->where('patient_id',$row['patient_id']);
												$this->db->where('treatment_date',date('y-m-d', strtotime($row['sn_date'])));
												$this->db->select('bill_status')->from('tbl_patient_treatment_techniques');
												$res = $this->db->get();
												if($res->result_array() != false){
												$bill_status = $res->row()->bill_status;
												} else {
												$this->db->where('patient_id',$row['patient_id']);
												$this->db->where('treatment_date',date('y-m-d', strtotime($row['sn_date'])));
												$this->db->select('bill_id')->from('tbl_invoice_header');
												$query = $this->db->get();
												if($query->result_array() != false){
												$bill_status = '1';
												} else {
												$bill_status = 0;
												}
												}
												$this->db->select('first_name,last_name')->from('tbl_staff_info');
												$this->db->where('staff_id',$row['staff_id']);
												$res = $this->db->get();
												if($res->result_array() != false){
												if($res->row()->last_name != ''){
												$name =  $res->row()->first_name.' '.$res->row()->last_name;
												} else {
												$name =  $res->row()->first_name;
												 }  
												} else {
													$name ='Not Mentioned';													
												}
													?>
													<tr id="<?php echo $row['sn_id']; ?>">
											 <td class="text-center"> <?php echo $i; ?> </td>
											 <td class="text-center"><i class="fa fa-business-time"></i>&nbsp;&nbsp;<?php echo date('d M Y',strtotime($row['sn_date'])); ?> </td>
											 
											 <td class="text-center"><a href="<?php echo base_url().'client/patient/view/'.$row['patient_id'] ?>"> <?php echo $row['fpatient_name'].' '.$row['lpatient_name']; ?></a> </td>
											 <td class="text-center"> <?php echo $row['item_name']; ?> </td>
											  <td class="text-center"> <?php echo $name ?> </td>
											 <td class="text-center"> <?php echo $row['Session_count']; ?> </td>
											 <td class="text-center"> <?php if($bill_status == '1') { 
												 echo 'Bill Generated';
											 } ?> </td>
											 <td class="text-center">
											 <a class="edit" href="<?php echo base_url().'client/reports/edit_report/'.$row['patient_id'].'/'.$row['sn_id'];; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
												<a  href="<?php echo '#'.$row['sn_id']; ?>" class="delete"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"> </i></button></a>
												
						</td>				</td>
						</td>				</tr>
											<?php $i++; } ?>
											
											</tbody>
										  </table>
										  <nav class="pagination-rounded" aria-label="Page navigation example" style="text-align:center;">
                                    <ul class="pagination" >
									  <?php foreach ($links as $link) { ?>
										<li>
											<?php echo $link; ?>
										</li>
										<?php } ?>
                                     </ul>
								  </nav>
											<?php } else { echo '<center><h5 class="card-title" style="text-transform:capitalize;">No Records Found</h5></center>'; }  ?>
										
										</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                   </div>
			</div> 
<div class="modal" id="feedbackModal" >
    <div class="modal-dialog modal-md" role="document" style="top:150px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="feedbackModalLabel">Would you like to receive  patient feedback for this session? If yes click whichever is convenient.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 2.3rem;">
                  
					<input type="hidden" name="p_mobile" id="p_mobile" value="">
					<input type="hidden" name="p_name" id="p_name" value="">
				  <label class="radio-inline" style="width: 166px;">
					<input class="" type="radio" checked autocomplete="off" name="feedbacktype" value="whatsapp" style="margin-right: 8px;"><b>Via WhatsApp</b>
					<img style="width:23px; height:23px;" src="<?=base_url()?>/img/whatsapp Logo.png">
				  </label>

				  <label class="radio-inline" style="width: 140px;">
					<input class="" type="radio" autocomplete="off" name="feedbacktype" value="email" style="margin-right: 8px;"><b>Via Email</b>
					<img style="width:23px; height:23px;" src="<?=base_url()?>/img/mail.png">
					
				  </label>

				  <label class="radio-inline" style="width: 166px;">
					<input class="" type="radio" autocomplete="off" name="feedbacktype" value="SMS" style="margin-right: 8px;"><b>Via SMS</b>
					<i class="fas fa-2x fa-envelope-open-text" style="line-height: 0;" ></i>
					<!--<img style="width:23px; height:23px;" src="<?=base_url()?>/img/demo/envelope.png">-->
				  </label>

				
			</div>
            <div class="modal-footer">
                <a type="button" class="btn btn-primary" id="sendFeedBackLink" >Send Link</a>
				<button type="button" class="btn btn-secondary" data-dismiss="modal" id="close_id">Close</button>
                
            </div>
        </div>
    </div>
</div>			
<div id="toast-container" style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success !</br>Your Details Has Been Added Sucessfully!</div></div></div>

<script type="text/javascript" src="<?php echo base_url() ?>assets/js/prettify.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/lang-css.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui-1.11.1.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui.multidatespicker.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>my_assets/assets/scripts/main.js"></script></body>
<script src="<?php echo base_url();?>assets/parsley/parsley.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
$('.select-control').select2();
$(document).ready(function() {
	var value = '<?php echo $this->uri->segment(4); ?>'; 
	if( value == 'date'){
	var	 from = '<?php echo date('d/m/Y', strtotime($this->uri->segment(5))); ?>';
	var to = '<?php echo date('d/m/Y', strtotime($this->uri->segment(6))); ?>';
	} else {
		var	 from = '<?Php echo date('d/m/Y', strtotime('-30 days')); ?>';
		var to = '<?Php echo date('d/m/Y'); ?>';
	}
	$("#from").val(from);
	$("#to").val(to);
	  	 
		var myDate = new Date();
		var prettyDate =(myDate.getDate()) + '/' + (myDate.getMonth()+1) + '/' + myDate.getFullYear();
		$(".datepicker").val(prettyDate);
   
	$('form').on('submit', function (event) {
            event.preventDefault();  
		    var $form = $(this);
                    var clinic = '<?php echo $this->session->userdata('clinic_name'); ?>';
		    var smiley= '<?php echo json_decode('"\uE414"');?>';
			if ( $(this).parsley().isValid() ) {
		    var formid = $(this).attr("id");
			var formURL = $(this).attr("action");
			var button = $('#save');
		    button.prop('disabled',true);
			$.ajax({
            type: 'post',
            url: $(this).attr('action'),
			data:$(this).serialize(),
			dataType: 'json',
            success:function(data, textStatus, jqXHR,form) 
			{  
				$('#toast-container').show();
                if(data.review==0)
				{
					if(data.review_link!='')
					{
					swal({
								  //title: "Are you sure?",
								  //title: "Do you want to send Google Review to the Patient",
								  title: "Do you want to request a Google Review from the patient",
								  type: "success",
								  showCancelButton: true,
								  confirmButtonClass: 'btn-danger',
								  confirmButtonText: 'Yes',
								  /*closeOnConfirm: false,*/
								 closeOnConfirm: true	
								},
								function(inputValue){
								if (inputValue===false) {
										
										button.prop('disabled',false);
										$('.toast-container').hide();
										window.location.href="<?php echo base_url()?>client/reports/report_session";
									}else{

									//window.alert("hi");
									//msg='https://web.whatsapp.com/send?phone=91'+$mobile+'&text=Your Physiotherapy appointment on '+startdate+' IST has been scheduled successfully .Please call us on '+mobile+' to give us 24 hours notice to reschedule or cancel the appointment.'+'%0a'+'Visit us: '+map+'%0a'+rose+' Regards '+clinic_name;
                                    var msg='https://web.whatsapp.com/send?phone=91'+data.mobile+'&text=Hi '+data.name+','+'%0a'+'Kindly Rate Our Service at '+'%0a'+data.review_link;
									var msg1='https://web.whatsapp.com/send?phone=91'+data.mobile+'&text=Hi '+data.name+','+'%0a'+'Hope you had a good Physiotherapy session at '+clinic+'%0a'+'%0a'+'We wish you a speedy recovery!'+'%0a'+'%0a'+'If you are happy with our service, Kindly click below to leave a review.'+'%0a'+data.review_link+'%0a'+'%0a'+'Thank you'+smiley;
									window.open(msg1, '_blank');
									
									window.location.href="<?php echo base_url()?>client/reports/report_session";
								}
									
							}); 
					}else{
						window.location.href="<?php echo base_url()?>client/reports/report_session";
					}
					/*   if client do not have google review
					else
					{
						swal({
								  //title: "Are you sure?",
								  title: "Do you want to send a Feedback Form to the Patient",
								  type: "success",
								  showCancelButton: true,
								  confirmButtonClass: 'btn-danger',
								  confirmButtonText: 'Yes',
								  closeOnConfirm: false,
								},
								function(){
									//window.alert("hi");
									//msg='https://web.whatsapp.com/send?phone=91'+$mobile+'&text=Your Physiotherapy appointment on '+startdate+' IST has been scheduled successfully .Please call us on '+mobile+' to give us 24 hours notice to reschedule or cancel the appointment.'+'%0a'+'Visit us: '+map+'%0a'+rose+' Regards '+clinic_name;
                                    //var msg='https://web.whatsapp.com/send?phone=91'+data.mobile+'&text=Hi '+data.name+','+'%0a'+'Kindly Rate Our Service at '+'%0a'+data.review_link
									//window.open(msg, '_blank');
									//window.location.href="<?php echo base_url()?>client/reports/report_session";
									window.location.href="<?php echo base_url()?>client/reports/report_session";
							}); 
						
					}*/
				}
				/* to send feedback to the patient after sending google review form
				else{
					swal({
								  //title: "Are you sure?",
								  title: "Do you want to send a Feedback Form to the Patient",
								  type: "success",
								  showCancelButton: true,
								  confirmButtonClass: 'btn-danger',
								  confirmButtonText: 'Yes',
								  closeOnConfirm: false,
								},
								function(){
									//window.alert("hi");
									//msg='https://web.whatsapp.com/send?phone=91'+$mobile+'&text=Your Physiotherapy appointment on '+startdate+' IST has been scheduled successfully .Please call us on '+mobile+' to give us 24 hours notice to reschedule or cancel the appointment.'+'%0a'+'Visit us: '+map+'%0a'+rose+' Regards '+clinic_name;
                                    //var msg='https://web.whatsapp.com/send?phone=91'+data.mobile+'&text=Hi '+data.name+','+'%0a'+'Kindly Rate Our Service at '+'%0a'+data.review_link
									//window.open(msg, '_blank');
									//window.location.href="<?php echo base_url()?>client/reports/report_session";
									window.location.href="<?php echo base_url()?>client/reports/report_session";
							}); 
					
					
				}*/

				else{
					button.prop('disabled',false);
					$("#p_mobile").val(data.mobile);	
					$("#p_name").val(data.name);	
					$("#feedbackModal").modal({backdrop: 'static', keyboard: false}); 
					 /* setTimeout(function(){
						button.prop('disabled',false);
								window.location.href="<?php echo base_url()?>client/reports/report_session";
								//window.location.href="<?php echo base_url()?>frontend/patient_survey/"+patient_id;
					}, 3000); */
			       }	
					
			},
			error: function(data, textStatus, jqXHR,form) 
			{ 
			        button.prop('disabled',false);
					$('#toast-container').show();
				setTimeout(function(){
							window.location.reload(1);
				}, 1000);
				
			}
			});
			}
		else{
			
		}
	});  
	
	$('#dateFilter').click(function(e){
		e.preventDefault();
		var	
		from = $('#from').val();
		to = $('#to').val();
		var date_app=$('#from').val();
		var date = date_app.split('/'); 
		var start_date=date[0]+'-'+date[1]+'-'+date[2];
		var date_app1=$('#to').val();
		var date1 = date_app1.split('/'); 
		var to_date=date1[0]+'-'+date1[1]+'-'+date1[2];
		
		if(from == '' || to == '') {
			alert('Please select start date or end date.', 'Date Filter error');
		} else {
			window.location = '<?php echo base_url(); ?>client/reports/report_session/date/'+ start_date + '/' + to_date ;
		}
	});
	
	
	$('.bill').hide();
		var val = '<?php echo $this->uri->segment(4); ?>';
		if(val != 'page' && val != 'date'){
   			var p_id = '<?php echo $this->uri->segment(4); ?>';
			var sn_date =$('#sn_date').val();
			var sn = sn_date.replace("/", "-");
			var sn1 = sn.replace("/", "-");
			var provD = p_id + '/' + sn1; 
			var provDiag = "provDiag=" + provD;
			var url= '<?php echo base_url().'client/reports/check_bill' ?>';
			$.ajax({
					type: "POST",
					dataType: 'json',
					data : provDiag,
					url: url,
					success: function(data) {
						if(data.status == 'failure'){
						alert('error');
						} else if(data.status == 'success') {
								if(data.concessionData != '0'){
								$('.staff_id2').show();
								$('.staff_idss').hide();	
								var opt = data.concessionData.split("/");
								$("#session_cont").val(opt[3]);
								$('#treatment').val(opt[1]);
								$('#treat').val(opt[2]);
								$('#staff_id').val(opt[4]);
								$('#staf').val(opt[5]);
								if(opt[0] == '1'){
									$('.bill').hide();
								} else {
									$('.bill').show();
								}
							} else {
								$('.staff_id2').hide();
								$('.staff_idss').show();
								$('.bill').show();
							}
						}
					}, 
					complete: function(){
							
					},
					error: function(e){ // alert error if ajax fails
						alert(e.responseText);
					} 
				 });

			}
		$('.staff_idss').hide();
		$('.patient_id').change(function() {
			var p_id = $('#patient_id').val();
			var sn_date =$('#sn_date').val();
			var sn = sn_date.replace("/", "-");
			var sn1 = sn.replace("/", "-");
			var provD = p_id + '/' + sn1; 
			var provDiag = "provDiag=" + provD;
			var url= '<?php echo base_url().'client/reports/check_bill' ?>';
			$.ajax({
					type: "POST",
					dataType: 'json',
					data : provDiag,
					url: url,
					success: function(data) {
						if(data.status == 'failure'){
						alert('error');
						} else if(data.status == 'success') {
							if(data.concessionData != '0'){
								$('.staff_id2').show();
								$('.staff_idss').hide();
								$("#staff_ids").prop('required',false);
								var opt = data.concessionData.split("/");
								$("#session_cont").val(opt[3]);
								$('#treatment').val(opt[1]);
								$('#treat').val(opt[2]);
								$('#staff_id').val(opt[4]);
								$('#staf').val(opt[5]);
								if(opt[0] == '1'){
									$('.bill').hide();
								} else {
									$('.bill').show();
								}
							} else {
								$("#staff_ids").prop('required',true);
								$('.staff_id2').hide();
								$('.staff_idss').show();
								$('.bill').show();
							}
						}
					}, 
					complete: function(){
							
					},
					error: function(e){ // alert error if ajax fails
						alert(e.responseText);
					} 
				 });
			
		});
});


$(document).ready(function() {
		
	$('.delete').on('click', function () {
			 var sn_id = $(this).attr('href').split('#')[1];
			 url ='<?php echo base_url().'client/reports/delete/' ?>'+ sn_id; 
			 swal({
			  title: "Confirmation",
			  text: "Are you sure you want to Delete this Patient?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					data : {s_id:sn_id},
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
					 if(data.status == 'success') { 
						  swal("Success!", "Your records has been Deleted!", "success");
						}
						 $('#'+sn_id).remove(); 
							
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						  swal("Failure!", "Your records has not been Deleted!", "success");
						// window.location.reload(); 
					}
				  });
			}); 
	});
});
$('#pat_close').click(function(){
	$("#pat_close_msg").hide();
	
})
$("#sendFeedBackLink").on("click",function(){
	var button = $('#save');
	$("#feedbackModal").hide();
	var feedbacktype = $("input:radio[name='feedbacktype']:checked").val();
	var p_mobile = $("#p_mobile").val();
	var p_name = $("#p_name").val();
	var p_id = $("#patient_id").val();
	var d_id = ($("#staff_ids").val() !="" && $("#staff_ids").val()>0) ? $("#staff_ids").val() : $("#staff_id").val();
	var clinic = '<?php echo $this->session->userdata('clinic_name'); ?>';
	if(feedbacktype == 'whatsapp'){
		
		var smiley= '<?php echo json_decode('"\uE414"');?>';
		var feebbackurl = '<?=base_url()?>frontend/patient_survey/'+p_id+'/'+d_id;
		$("#feedbackModal").hide();
		button.prop('disabled',false);
		var msg1='https://web.whatsapp.com/send?phone=91'+p_mobile+'&text=Dear '+p_name+','+'%0a'+'Hope you had a good Physiotherapy session at '+clinic+'%0a'+'%0a'+'We wish you a speedy recovery!'+'%0a'+'%0a'+'If you are happy with our service, Kindly click below to leave a review.'+'%0a'+feebbackurl+'%0a'+'%0a'+'Thank you'+smiley;
		window.open(msg1, '_blank');
		window.location.href="<?php echo base_url()?>client/reports/report_session";
	}else
	{
		
		var urlfeedb ='<?php echo base_url().'client/reports/sendfeedbackLink'?>';
		$.ajax({
					type: 'POST',
					dataType: 'json',
					url :urlfeedb, 
					data : {"p_mobile" : p_mobile,"p_name" : p_name,"p_id":p_id,"d_id":d_id,"feedbacktype" : feedbacktype},
					success:function(details) 
					{ 
						
						if(details.status == 'success') { 
							swal("Success!", "Feedback send", "success");
							$("#feedbackModal").hide();
							button.prop('disabled',false);
							setTimeout(function(){
							button.prop('disabled',false);
								window.location.href="<?php echo base_url()?>client/reports/report_session";
							}, 3000);
						
						}else{
							swal("Failure!", "Feedback link send failed !", "error");
							$("#feedbackModal").hide();
								button.prop('disabled',false);
								setTimeout(function(){
									button.prop('disabled',false);
									window.location.href="<?php echo base_url()?>client/reports/report_session";
								}, 3000);
							}
					},
					complete: function(){
							setTimeout(function(){
							button.prop('disabled',false);
								window.location.href="<?php echo base_url()?>client/reports/report_session";
							}, 3000);	
					},
					error: function(e){ // alert error if ajax fails
							
						
					}
				});
		}
});
$("#close_id").on('click',function(){
		window.location.href="<?php echo base_url()?>client/reports/report_session";
})
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