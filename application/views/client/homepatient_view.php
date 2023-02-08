<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
    
    <meta name="msapplication-tap-highlight" content="no">
	
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
<link href="<?php echo base_url()?>asset_list/main.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
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
				
				  <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                        <li class="nav-item">
                            <a role="tab" class="nav-link " href="<?php echo base_url().'client/patient/patient_view' ?>">
                                <span> View OP Patient List</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link active" href="<?php echo base_url().'client/patient/homepatient_view' ?>">
                                <span>View Home Patient List</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tabs-animation">
                          
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">View Home Patient List
                                   </div>
								   <div class="table-responsive">
									 <table class="table table-striped table-bordered" style="">
                                             
                                                <tr>
											    <td>   <input type="text" style="width: " autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="From" id="from" data-toggle="datepicker"/>
                                                </td>
												<td>   <input type="text" style="width: " autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="To" id="to" data-toggle="datepicker"/>
                                                </td>
												<td><button class="btn btn-pill btn-success" id="dateFilter" > Go</button>
                                                 &nbsp;&nbsp;<button class="btn btn-pill btn-info" id="ExportMe"><i class="fa fa-download"></i></button>
												</td>
												<td>
											<select class="searchType" name="searchType" id="searchType">
												<option selected="true" disabled="disabled">Please Select</option>
													<option value="PatientName" <?php if(isset($searchBy) && $searchBy == 'PatientName') echo 'selected="selected"'; ?>>Patient name</option>
													<option value="ProvisionalDiagnosis" data-value="diagnosis" <?php if(isset($searchBy) && $searchBy == 'ProvisionalDiagnosis') echo 'selected="selected"'; ?>>Provisional diagnosis</option>
												<?php $staff_id = $this->session->userdata('staff_id'); 
												 if($staff_id != ''){
													$this->db->select('privileges')->from('tbl_user')->where('staff_id',$staff_id);
													$res = $this->db->get(); 
													$pri = $res->row()->privileges;
													$spl = explode(',',$pri);
													if(in_array("10", $spl)){ } else {  ?>
												<option value="MobileNo" <?php if(isset($searchBy) && $searchBy == 'MobileNo') echo 'selected="selected"'; ?>>Mobile no</option>
												 <?php } } else{ ?>
												 <option value="MobileNo" <?php if(isset($searchBy) && $searchBy == 'MobileNo') echo 'selected="selected"'; ?>>Mobile no</option>
												 <?php } ?>
												<option value="PatientId"  <?php if(isset($searchBy) && $searchBy == 'PatientId') echo 'selected="selected"'; ?>>Patient Id</option>
												<option value="ReferedBy" <?php if(isset($searchBy) && $searchBy == 'ReferedBy') echo 'selected="selected"'; ?>>Refered by</option> 
                                               </select>
												</td>
												
												<td><div class="patient_idss"> <select id="patient_id" name="patient_id" class="patient_id">
												<option selected="true" disabled="disabled">Please Select Patient Name</option>
												  <?php
													if ($patient_name!=false) {
														foreach ($patient_name as $patient_names) {
															$last_name = ($patient_names['last_name'] == '') ? '' : ucfirst($patient_names['last_name']);
															$age = ($patient_names['age'] == '0') ? '' : '('.$patient_names['age'].')';
															echo '<option value="'.$patient_names['patient_id'].'">'.$patient_names['first_name'].' '.$last_name.'   ('.$patient_names['patient_code'].')  '.$age.'</option>';
														}
													}
													?>
												</select></div>
											<div class="provDiag"><select class="prov_diagnosis" name="prov_diagnosis" id="prov_diagnosis">
												<option selected="true" disabled="disabled">Please Select</option>
												<?php
												if ($provDiagList != false) {
													foreach ($provDiagList as $provDiagLists) {
														if($provDiagLists['pd_list_name'] == $keyword){
															echo '<option value="'.$provDiagLists['pd_list_name'].'" selected>'.$provDiagLists['pd_list_name'].'</option>';
														}else{
															echo '<option value="'.$provDiagLists['pd_list_name'].'">'.$provDiagLists['pd_list_name'].'</option>';
														}
													}
												}
											?></select></div>
												<div class="category">
												<select id="mobileno" name="mobileno" class="mobileno">
												<option selected="true" disabled="disabled">Please Select Mobile No</option>
                                                  <?php
													if ($mobile != false) {
														foreach ($mobile as $mobileno) {
															 echo '<option value="'.$mobileno['mobile_no'].'">'.$mobileno['mobile_no'].'</option>';
													   
														}
													}
												?>
												</select></div> 
												
												<div class="category2">
												<select id="p_code" name="p_code" class="p_code">
												<option selected="true" disabled="disabled">Please Select</option>
                                                  <?php
													if ($patient_code != false) {
														foreach ($patient_code as $code) {
															 echo '<option value="'.$code['patient_id'].'">'.$code['patient_code'].'</option>';
													   
														}
													}
												?>
												</select></div>
												
												<div class="category1">
												<select id="referrer" name="referrer" class="referrer">
												<option selected="true" disabled="disabled">Please Select</option>
                                                  <?php
													if ($name != false) {
														foreach ($name as $name1) {
															if($name1['referal_type_id'] == '1' || $name1['referal_type_id'] == '6'){
															  echo '<option value="'.$name1['referal_id'].'">'.$name1['referal_name'].'</option>';
															} elseif($name1['referal_type_id'] == '2') {
																 echo '<option value="'.$name1['referal_id'].'">'.$name1['website_name'].'</option>';
															} elseif($name1['referal_type_id'] == '3') {  
																 echo '<option value="'.$name1['referal_id'].'">'.$name1['adv_name'].'</option>';
															} else {
																 echo '<option value="'.$name1['referal_id'].'">'.$name1['referal_name'].'</option>';
															}											
														}
													}
												?>
												</select></div>
												
												</td>
												 
												</tr>
											  
                                        </table>
									</div>
								    <div class="table-responsive">
										<table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Image</th>
                                                 <th class="text-center">Name</th>
												<th class="text-center">Date</th>
                                                <th class="text-center">Mobile No</th>
                                                <th class="text-center">Email</th>
												 
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                           <tbody>
											<?php if($patients != false){ 
											foreach ($patients as $row) {
												 $this->db->where('patient_id',$row['patient_id']);
												$this->db->select('SUM(net_amt) as net_amt, SUM(paid_amt) as paid_amt')->from('tbl_invoice_header');
												$res = $this->db->get();
												if($res->result_array() != false){
												   $net_amt = $res->row()->net_amt;
												   $paid_amt = $res->row()->paid_amt;
												 $amt = $net_amt-$paid_amt; 
												} else {
													$amt = 0;
												}
											?>
                                            <tr id="<?php echo $row['patient_id'] ?>">
                                                 <?php if($row['gender'] == 'male' or  $row['gender'] == 'Male') { ?><td class="text-center" style="width: 80px;">
													<img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/boy.png" alt="">
												</td><?php } else { ?>
												<td class="text-center" style="width: 80px;">
													<img width="40" class="rounded-circle" src="<?php echo base_url() ?>my_assets/assets/images/avatars/girl.png" alt="">
												</td>
												<?php } ?>
                                                <td class="text-center">
                                                   <a href="<?php echo base_url().'client/patient/view/'.$row['patient_id'] ?>" ><?php echo $row['first_name']; ?></a> 
                                                </td>
                                                 
                                                 <td class="text-center"><?php echo $row['appoint_date']; ?></td>
                                                <td class="text-center"><?php echo $row['mobile_no']; ?></td>
												<td class="text-center"><?php echo $row['email']; ?></td>
												 
												<td class="text-center">
												
												 <a href="<?php echo base_url().'client/invoice/add/Pt/'.$row['patient_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Invoice"><i class="fa fa-file"></i></button></a>
												
												 <a href="#"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"> </i></button></a>
												 
                                                </td>
                                            </tr>
                                             <?php
						} ?>
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
								  
						<?php } else { echo '</br><center><h5 class="card-title" style="text-transform:capitalize;">No Records Found</h5></center>'; }  ?>
                                    </div>
                                     
                                </div>
                            </div>
                        </div>
                         
                         
                    </div>
                </div>
                    </div>
					<div style="display:none;" class="swal2-container swal2-center swal2-fade swal2-shown delete1" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progresssteps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"><span class="swal2-x-mark"><span class="swal2-x-mark-line-left"></span><span class="swal2-x-mark-line-right"></span></span></div><div class="swal2-icon swal2-question" style="display: none;"><span class="swal2-icon-text">?</span></div><div class="swal2-icon swal2-warning" style="display: none;"><span class="swal2-icon-text">!</span></div><div class="swal2-icon swal2-info" style="display: none;"><span class="swal2-icon-text">i</span></div><div class="swal2-icon swal2-success" style="display: none;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Are You Sure You want to delete this Appointment Record?</h2><button type="button" class="swal2-close" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" style="display: block;">Do you want to continue</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message" style="display: none;"></div></div><div class="swal2-actions" style="display: flex;"><button type="button" id="confirm" class="swal2-confirm swal2-styled confirm" aria-label="" style="border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);">Cool</button><button type="button"  class="swal2-cancel swal2-styled cancel1" aria-label="">Cancel</button></div><div class="swal2-footer" style="display: none;"></div></div></div>
					<div style="display:none;" class="swal2-container swal2-center swal2-fade swal2-shown delete2" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progresssteps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"><span class="swal2-x-mark"><span class="swal2-x-mark-line-left"></span><span class="swal2-x-mark-line-right"></span></span></div><div class="swal2-icon swal2-question" style="display: none;"><span class="swal2-icon-text">?</span></div><div class="swal2-icon swal2-warning" style="display: none;"><span class="swal2-icon-text">!</span></div><div class="swal2-icon swal2-info" style="display: none;"><span class="swal2-icon-text">i</span></div><div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" style="display: block;">Deleted Successfully!</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message" style="display: none;"></div></div><div class="swal2-actions" style="display: flex;"><button type="button" class="swal2-confirm swal2-styled cancel2" aria-label="" style="border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);">Cool</button><button type="button" class="swal2-cancel swal2-styled" style="display: none;" aria-label="">Cancel</button></div><div class="swal2-footer" style="display: none;"></div></div></div></div>

 

<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> 
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/moment.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
 <script src="https://select2.github.io/select2-bootstrap-theme/js/bootstrap.min.js"></script>
 <script src="https://select2.github.io/select2-bootstrap-theme/js/anchor.min.js"></script>
 <script>
  $('select').select2();
  
  var myDate = new Date();
		var prettyDate =(myDate.getDate()) + '/' + (myDate.getMonth()+1) + '/' +
		myDate.getFullYear();
		$(".datepicker").val(prettyDate);
		
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
			jAlert('Please select start date or end date.', 'Date Filter error');
		} else {
			window.location = '<?php echo base_url(); ?>client/patient/homepatient_view/date/'+ start_date + '/' + to_date ;
		}
	});
	
	$('#ExportMe').click(function(e){
		e.preventDefault();
		var value = '<?php echo $this->uri->segment(4); ?>'; 
		if( value == 'date'){
		var	 from = '<?php echo $this->uri->segment(5); ?>';
		var to = '<?php echo $this->uri->segment(6); ?>';
		
		if(from == '' || to == '')
		{
			jAlert('Please select start date or end date.', 'Date Filter error');
		} 
		else
		{
			window.location = '<?php echo base_url(); ?>client/reports/export_patient/date/' + encodeURIComponent(from.replace(/\//g, '-')) + '/' + encodeURIComponent(to.replace(/\//g, '-'));
		}
	 }
	 else {
		 jAlert('Please select start date or end date.', 'Date Filter error');
	 }
			
	});
	
	
	$(document).ready(function() {
	    $('.patient_idss').hide();
		$('.patient_idss1').hide();
		$('.provDiag').hide();
		$('.category1').hide();
		$('.category2').hide();
		$('.category').hide();
		$('#searchType').change(function(){
			var searchType = $(this).val();
			if(searchType == 'ProvisionalDiagnosis'){
				$('.keyWord').fadeOut();
				$('.provDiag').fadeIn();
			}else{
				$('.keyWord').fadeIn();
				$('.provDiag').fadeOut();
			}
				if(searchType == 'PatientName'){
				$('.keyWord').fadeOut();
				$('.patient_idss').fadeIn();
				$('.patient_idss1').fadeIn();
			}else{
				$('.keyWord').fadeIn();
				$('.patient_idss').fadeOut();
				$('.patient_idss1').fadeOut();
			}
			if(searchType == 'MobileNo'){
				$('.keyWord').fadeOut();
				$('.category').fadeIn();
			}else{
				$('.keyWord').fadeIn();
				$('.category').fadeOut();
			}
			 if(searchType == 'ReferedBy'){
				$('.keyWord').fadeOut();
				$('.category1').fadeIn();
			}else{
				$('.keyWord').fadeIn();
				$('.category1').fadeOut();
			} 
			if(searchType == 'PatientId'){
				$('.keyWord').fadeOut();
				$('.category2').fadeIn();
			}else{
				$('.keyWord').fadeIn();
				$('.category2').fadeOut();
			} 
		});
   });
   
   $('.patient_id').change(function(){
			var value = $('#patient_id').val();
			window.location="<?php echo base_url() ?>client/patient/homepatient_view/PatientId/"+value;
		});
		$('.prov_diagnosis').change(function(){
			var value=$('#prov_diagnosis').val();
			window.location="<?php echo base_url() ?>client/patient/homepatient_view/diagnosis/"+value;
		});
		$('.mobileno').change(function(){
			 var value=$('#mobileno').val();
			 window.location="<?php echo base_url() ?>client/patient/homepatient_view/MobileNo/"+value;
		});   
		$('.referrer').change(function(){
			var value=$('#referrer').val();
			window.location="<?php echo base_url() ?>client/patient/homepatient_view/ReferedBy/"+value;
		}); 
		$('.p_code').change(function(){
			 var value=$('#p_code').val();
			  window.location="<?php echo base_url() ?>client/patient/homepatient_view/PatientId/"+value;
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
