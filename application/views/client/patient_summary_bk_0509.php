<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Case Report - Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
     
    <meta name="msapplication-tap-highlight" content="no">
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
                                
                    <div class="tabs-animation">
                         
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header"> Case Reports
                                       
                                    </div>
									<div class="card-body">
                                    <div class="table-responsive">
									  
									   <table class="table table-striped" style="">
                                             
                                                <tr>
											    <td>   <input type="text" style="width: " autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="From" id="from" data-toggle="datepicker"/>
                                                </td>
												<td>   <input type="text" style="width: " autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="To" id="to" data-toggle="datepicker"/>
                                                </td>
												<td><button class="btn btn-success btn-pill" id="dateFilter" > Go</button>
                                                 &nbsp;&nbsp;<button class="btn btn-info btn-pill" id="ExportMe"><i class="fa fa-download"></i></button>
												</td>
												<td>
											<select style="width:200px;" class="searchType" name="searchType" id="searchType">
												<option selected="true" disabled="disabled">Please Select</option>
													<option value="PatientName" data-value="info" <?php if(isset($searchBy) && $searchBy == 'PatientName') echo 'selected="selected"'; ?>>Patient name</option>
												<option value="ProvisionalDiagnosis" data-value="diagnosis" <?php if(isset($searchBy) && $searchBy == 'ProvisionalDiagnosis') echo 'selected="selected"'; ?>>Provisional diagnosis</option>
												<?php $staff_id = $this->session->userdata('staff_id'); 
												 if($staff_id != ''){
													$this->db->select('privileges')->from('tbl_user')->where('staff_id',$staff_id);
													$res = $this->db->get(); 
													$pri = $res->row()->privileges;
													$spl = explode(',',$pri);
													if(in_array("10", $spl)){ } else {  ?>
												<option value="MobileNo" data-value="info" <?php if(isset($searchBy) && $searchBy == 'MobileNo') echo 'selected="selected"'; ?>>Mobile no</option>
												 <?php } } else{ ?>
												 <option value="MobileNo" data-value="info" <?php if(isset($searchBy) && $searchBy == 'MobileNo') echo 'selected="selected"'; ?>>Mobile no</option>
												 <?php } ?>
												<option value="PatientId" data-value="info" <?php if(isset($searchBy) && $searchBy == 'PatientId') echo 'selected="selected"'; ?>>Patient Id</option>
												<option value="ReferedBy" data-value="info" <?php if(isset($searchBy) && $searchBy == 'ReferedBy') echo 'selected="selected"'; ?>>Refered by</option>
											   </select>
												</td>
												
												<td><div class="patient_idss"><select style="width: 200px !important; min-width: 200px; max-width: 200px;" class="patient_id" name="patient_id" id="patient_id">
							                  <option selected="true" disabled="disabled">Please Select</option>
											<?php
												if ($patient_name!=false) {
													foreach ($patient_name as $patient_names) {
														$last_name = ($patient_names['last_name'] == '') ? '' : ucfirst($patient_names['last_name']);
														$age = ($patient_names['age'] == '0') ? '' : '('.$patient_names['age'].')';
														echo '<option value="'.$patient_names['first_name'].'">'.$patient_names['first_name'].' '.$last_name.'   ('.$patient_names['patient_code'].')  '.$age.'</option>';
													}
												}
											?></select></div>
							</td>
							<td><div class="provDiag"><select style="width: 200px !important; min-width: 200px; max-width: 200px;" class="prov_diagnosis" name="prov_diagnosis" id="prov_diagnosis">
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
						</td>
						<td><div class="category"><select style="width: 200px !important; min-width: 200px; max-width: 200px;" class="mobileno" name="mobileno" id="mobileno">
								<option selected="true" disabled="disabled">Please Select</option>
							<?php
								if ($mobile != false) {
									foreach ($mobile as $mobileno) {
										 echo '<option value="'.$mobileno['mobile_no'].'">'.$mobileno['mobile_no'].'</option>';
                                   
									}
								}
							?></select></div>
						</td>
						<td><div class="category2"><select style="width: 200px !important; min-width: 200px; max-width: 200px;" class="p_code" name="p_code" id="p_code">
							<option selected="true" disabled="disabled">Please Select</option>
							<?php
								if ($patient_code != false) {
									foreach ($patient_code as $code) {
										 echo '<option value="'.$code['patient_id'].'">'.$code['patient_code'].'</option>';
                                   
									}
								}
							?></select></div>
						</td>
						<td><div class="category1"><select style="width: 200px !important; min-width: 200px; max-width: 200px;" class="referrer" name="referrer" id="referrer">
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
                                       	} /* else {
											 echo '<option value="'.$name1['referal_id'].'">'.$name1['referal_name'].'</option>';
                                       	}	 */										
									} 
								} 
							?></select></div>
						</td>
												</tr>
											  
                                        </table>
										</div>
										</div>
                                       
										<div class="card-body">
										<div class="table-responsive">
									<?php  if($patient_list != false){ ?>
									 
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                               <th class="text-center">Name</th>
												<th class="text-center">Date</th>
												<th class="text-center">Mobile no.</th>
												<th class="text-center">Email</th>
												<th class="text-center">Address</th>
												<th class="text-center">Action</th>
												 
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php
					  	                        foreach($patient_list as $row){ 												
						                     ?>  
                                            <tr>
                                                
						                        <td class="text-center"><a href="<?php echo base_url().'client/patient/view/'.$row['patient_id'] ?>" ><?php echo $row['first_name'].'  '.$row['last_name']; ?></a></td>
						                       <td class="text-center"><?php echo $row['appoint_date']; ?></td>
											   <td class="text-center"><?php echo $row['mobile_no']; ?></td>
											   <td class="text-center"><?php echo $row['email']; ?></td>
											   <td class="text-center"><?php echo $row['address_line1']; ?></td>
											    <td class="text-center">
												  <a href="<?php echo base_url().'client/reports/patient_summary_report/'.$row['patient_id'].'/'.$this->uri->segment(5).'/'.$this->uri->segment(6); ?>" target="_blank">
												  <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-alternate" data-toggle="tooltip" data-placement="top" title="Print"><i class="fa fa-print"></i></button>
												  </a>
												<?php  $patient_id = $row['patient_id'];
												$t = $this->uri->segment(4);
												if($t == 'date'){
													$from_date = $this->uri->segment(5);
													$to_date = $this->uri->segment(6);
												 	$CI =& get_instance();
													$CI->load->model(array('assessment_model','cardio_assessment_model'));
													$data['shoulder_assess'] = $CI->assessment_model->viewshoulder_detail($patient_id,$from_date,$to_date);
													$data['elbow_assess'] = $CI->assessment_model->viewelbow_detail($patient_id,$from_date,$to_date);
													$data['foot_assess'] = $CI->assessment_model->viewfoot_detail($patient_id,$from_date,$to_date);
													$data['knee_assess'] = $CI->assessment_model->viewknee_detail($patient_id,$from_date,$to_date);
													$data['hip_assess'] = $CI->assessment_model->viewhip_detail($patient_id,$from_date,$to_date);
		   	                                        $data['cardio_detail'] = $CI->cardio_assessment_model->cardio_detail($patient_id,$from_date,$to_date);
													$data['post_detail'] = $CI->cardio_assessment_model->post_detail($patient_id,$from_date,$to_date);
													$data['antenatal_detail'] = $CI->assessment_model->antenatal_detail($patient_id,$from_date,$to_date);
													$data['neuro_detail'] = $CI->assessment_model->neuro_detail($patient_id,$from_date,$to_date);
													$data['paediatric_detail'] = $CI->assessment_model->paediatric_detail($patient_id,$from_date,$to_date);
													$data['ortho_detail'] = $CI->assessment_model->ortho_detail($patient_id,$from_date,$to_date);
													$data['sports_detail'] = $CI->assessment_model->sports_detail($patient_id,$from_date,$to_date);
													if($data['hip_assess'] != false){ ?> 
													<a href="<?php echo base_url().'client/assessment/printhipreport_assessment/'.$row['patient_id'].'/'.$this->uri->segment(5).'/'.$this->uri->segment(6); ?>" target="_blank">
												  <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-alternate" data-toggle="tooltip" data-placement="top" title="Hip Assessment">H</button>
												  </a>
													<?php } if($data['knee_assess'] != false){ ?>
													<a href="<?php echo base_url().'client/assessment/printkneereport_assessment/'.$row['patient_id'].'/'.$this->uri->segment(5).'/'.$this->uri->segment(6); ?>" target="_blank">
												  <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-alternate" data-toggle="tooltip" data-placement="top" title="Knee Joint Assessment">K</button>
												  </a>							
													<?php } if($data['shoulder_assess'] != false){ ?>
													<a href="<?php echo base_url().'client/assessment/printshoulderreport_assessment/'.$row['patient_id'].'/'.$this->uri->segment(5).'/'.$this->uri->segment(6); ?>" target="_blank">
												  <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-alternate" data-toggle="tooltip" data-placement="top" title="Shoulder Assessment">S</button>
												  </a>
													<?php } if($data['elbow_assess'] != false){ ?>
													<a href="<?php echo base_url().'client/assessment/printelbowreport_assessment/'.$row['patient_id'].'/'.$this->uri->segment(5).'/'.$this->uri->segment(6); ?>" target="_blank">
												  <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-alternate" data-toggle="tooltip" data-placement="top" title="Elbow & Wrist Assessment">E</button>
												  </a>
													<?php } if($data['foot_assess'] != false){ ?>
													<a href="<?php echo base_url().'client/assessment/printfootreport_assessment/'.$row['patient_id'].'/'.$this->uri->segment(5).'/'.$this->uri->segment(6); ?>" target="_blank">
												  <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-alternate" data-toggle="tooltip" data-placement="top" title="Foot & Ankle Assessment">F</button>
												  </a>
													<?php } if($data['cardio_detail'] != false){ ?>
													<a href="<?php echo base_url().'assessment/print_cardioreport/'.$row['patient_id'].'/'.$this->uri->segment(5).'/'.$this->uri->segment(6); ?>" target="_blank">
												  <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-alternate" data-toggle="tooltip" data-placement="top" title="Cardio Assessment">C</button>
												  </a>
													<?php } if($data['post_detail'] != false){ ?>
													<a href="<?php echo base_url().'assessment/print_postnatalreport/'.$row['patient_id'].'/'.$this->uri->segment(5).'/'.$this->uri->segment(6); ?>" target="_blank">
												  <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-alternate" data-toggle="tooltip" data-placement="top" title="Postnatal Assessment">P</button>
												  </a>
													<?php } if($data['antenatal_detail'] != false){ ?>
													<a href="<?php echo base_url().'assessment/print_antentalreport_assessment/'.$row['patient_id'].'/'.$this->uri->segment(5).'/'.$this->uri->segment(6); ?>" target="_blank">
												  <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-alternate" data-toggle="tooltip" data-placement="top" title="Anatental Assessment">A</button>
												  </a>
													<?php } if($data['neuro_detail'] != false){ ?>
													<a href="<?php echo base_url().'assessment/print_neuroreport/'.$row['patient_id'].'/'.$this->uri->segment(5).'/'.$this->uri->segment(6); ?>" target="_blank">
												  <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-alternate" data-toggle="tooltip" data-placement="top" title="Neuro Assessment">N</button>
												  </a>
													<?php } if($data['paediatric_detail'] != false){ ?>
													<a href="<?php echo base_url().'assessment/print_paediatricreport/'.$row['patient_id'].'/'.$this->uri->segment(5).'/'.$this->uri->segment(6); ?>" target="_blank">
												  <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-alternate" data-toggle="tooltip" data-placement="top" title="Paediatric Assessment">P</button>
												  </a>
												<?php } } ?>  
												  <a href="<?php echo base_url().'client/reports/report_send/'.$row['patient_id']; ?>">
												  <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="Send"><i class="fa fa-share"></i></button>
												  </a>
												  </td>
                                            </tr>
                                             
									<?php } } ?>
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
							</br>
							
							
							
                                    </div>
                                     </div>
                                </div>
                            </div>
                        </div>
						
						
                         
                         
                    </div>
                </div>
                    </div>
    </div>
 
 
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> 		
<script>
$('select').select2();

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
			window.location = '<?php echo base_url(); ?>client/reports/patient_summary/date/'+ start_date + '/' + to_date ;
		}
	});
	
	var value = '<?php echo $this->uri->segment(4); ?>'; 
	if( value == 'date'){
	var	 from = '<?php echo date('d/m/Y', strtotime($this->uri->segment(5))); ?>';
	var to = '<?php echo date('d/m/Y', strtotime($this->uri->segment(6))); ?>';
	} else {
		var	 from = '<?Php echo date('d/m/Y'); ?>';
		var to = '<?Php echo date('d/m/Y'); ?>';
	}
	$("#from").val(from);
	$("#to").val(to);
	
	  
		 
   $('#ExportMe').click(function(e){
		e.preventDefault();
		var	
		from = '<?php echo $this->uri->segment(5); ?>';
		var to = '<?php echo $this->uri->segment(6); ?>';
		if(from == '' || to == '') {
			jAlert('Please select start date or end date.', 'Date Filter error');
		} else {
			window.location = '<?php echo base_url(); ?>client/reports/export_casereport/date/' + encodeURIComponent(from.replace(/\//g, '-')) + '/' + encodeURIComponent(to.replace(/\//g, '-'));
		}
			
	});
	
	$('.patient_idss').hide();
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
			}else{
				$('.keyWord').fadeIn();
				$('.patient_idss').fadeOut();
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
		$('.patient_id').change(function(){
			var value = $('#patient_id').val();
			window.location="<?php echo base_url() ?>client/reports/patient_summary/searchby/info/PatientName/"+value;
		});
		$('.prov_diagnosis').change(function(){
			var value=$('#prov_diagnosis').val();
			window.location="<?php echo base_url() ?>client/reports/patient_summary/searchby/diagnosis/ProvisionalDiagnosis/"+value;
		});
		$('.mobileno').change(function(){
			 var value=$('#mobileno').val();
			 window.location="<?php echo base_url() ?>client/reports/patient_summary/searchby/info/MobileNo/"+value;
		}); 
		$('.referrer').change(function(){
			var value=$('#referrer').val();
			window.location="<?php echo base_url() ?>client/reports/patient_summary/searchby/info/ReferedBy/"+value;
		}); 
		$('.p_code').change(function(){
			 var value=$('#p_code').val();
			  window.location="<?php echo base_url() ?>client/reports/patient_summary/searchby/info/PatientId/"+value;
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
