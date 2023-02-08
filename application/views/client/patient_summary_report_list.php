<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/x-icon" />
<title> - Physio Plus Tech</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/uniform.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/select2.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/physio_reports.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/physio_media.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>font-awesome/css/font-awesome.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo base_url(); ?>flick/jquery-ui-1.10.2.custom.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.gritter.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/colorbox.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/physio_helper.css" />
<style ="text/css">
button:hover span {display:none}
button:hover:before {content:"Invoice"}
</style>
<link href="<?php echo base_url(); ?>css/jquery.alerts.css" type="text/css" rel="stylesheet" />
<style>
tr:hover{background:#f9f9f9;}
</style>
</head>
  <style ="text/css">
button:hover span {display:none}
button:hover:before {content:"Reports"}
</style>
<style>
tr:hover{background:#f9f9f9;}
@media (min-width: 768px) and (max-width: 979px) {
[class*="span"], .row-fluid [class*="span"] {
 display: block;
 float: left;
 margin-left: 2.76243%;
}
.row-fluid .span12 {
    width: 100%;
}
.row-fluid .span11 {
    width: 91.4365%;
}
.row-fluid .span10 {
    width: 82.8729%;
}
.row-fluid .span9 {
    width: 74.3094%;
}
.row-fluid .span8 {
    width: 65.7459%;
}
.row-fluid .span7 {
    width: 57.1823%;
}
.row-fluid .span6 {
    width: 48.6188%;
}
.row-fluid .span5 {
    width: 40.0552%;
}
.row-fluid .span4 {
    width: 31.4917%;
}
.row-fluid .span3 {
    width: 22.9282%;
}
.row-fluid .span2 {
    width: 14.3646%;
}
.row-fluid .span1 {
    width: 5.80111%;
}
}
tr:hover{background:#f9f9f9;}
</style>


<body style="height:auto; overflow:scroll; margin: 0; padding: 0">
<center><div class="row-fluid" style="width: 900px; overflow-x: hidden; overflow-y: auto;" id="InvoiceContainer">
        <div class="widget-box" style="margin:0">
          <div class="widget-content">
          	<div class="row-fluid" style="text-align:center"><button type="button" id="printButton" class="btn-success"><span>Print</span></button></div>
            <table width="100%;" style="border: 1px solid transparent" >
              <thead>    
			<?php if($clientDetails['removebranding'] == 0) { ?>     
			        <tr class="header">
                      <td width="40%">
						<table>
							<tr>
								<?php
								if($clientDetails['logo'] != '') {
									echo '<img src="' . base_url() . 'uploads/logo/' . $clientDetails['logo'] . '" >';
								} else {
									echo '<h4>'.ucfirst($clientDetails['clinic_name']).'</h4.';
								}
								?>
							</tr>
						</table>
                      </td>
					  <td width="40%">
						<table  style="margin-left:30px">
						
							<tr>
							  <td><h2><?php echo ucfirst($clientDetails['clinic_name']); ?></h2></td>
							</tr>
							
							<tr>
							  <td><?php echo ucfirst($clientDetails['address']); ?></td>
							</tr>
							<tr>
							  <td><?php echo ucfirst($clientDetails['city']). ' - '. $clientDetails['zipcode'].', '.ucfirst($clientDetails['state']); ?></td>
							</tr>
								<?php if($clientDetails['phone'] == '' && $clientDetails['mobile'] != '' ) { ?>
							<tr>
							  <td>Mobile : <?php echo $clientDetails['mobile']; ?></td>
							</tr>
							<?php }else if($clientDetails['phone'] != '' && $clientDetails['mobile'] == '' ){ ?>
							<tr>
							  <td>Phone: <?php echo $clientDetails['phone']; ?></td>
							</tr>
							<?php }else if($clientDetails['phone'] != '' && $clientDetails['mobile'] != ''){ ?>
							<tr>
							  <td>Mobile : <?php echo $clientDetails['mobile']; ?></td>
							</tr>
							<tr>
							  <td>Phone: <?php echo $clientDetails['phone']; ?></td>
							</tr>
							<?php } ?>
							
							<?php if($clientDetails['email'] != false){  ?>
							<tr>
							  <td >Email : <?php echo $clientDetails['email']; ?></td>
							</tr>
							<?php } ?>
							
						</table>
					  </td>
					  <td width="20%" style="text-align:right">
						<h3 style="color:#348AC9"><strong>&nbsp;&nbsp;Case Report</strong></h3>
					  </td>
                    </tr>	
            <?php } else { ?>
			<tr class="header">
			
			    <br>
					<br>
					<br>	<br>
					<br>
					<br>
					<br>	<br>
					<br>
					<br><br>
					<br>
					 <td width="300px" style="text-align:right">
						<div id="content-header" >
						
							<h1><strong>Case Report</strong></h1>
							
						</div>
			    </td>
				</tr>
			<?php } ?>
            </thead>
			<tbody><tr><td colspan="3">
            <div class="row-fluid" style="margin-top: 15px">
            	<div class="span6">
                	<table class="table table-bordered table-invoice">
                        <tr>
                          <td >Id : </td>
                          <td ><strong><?php echo $patient['patient_code']; ?></strong></td>
                        </tr>
						<?php
							$age = ($patient['age'] > 0) ? '('.$patient['age'].')' : '';
						?>
						<tr>
                          <td>Date : </td>
                          <td><strong><?php echo date("F j, Y",strtotime($patient['appoint_date']));?></strong></td>
                        </tr>
						<tr>
                          <td >Name : </td>
                          <td ><strong><?php echo ucfirst($patient['first_name']).' '.$patient['last_name'].' '.$age; ?></strong>
						  <?php if($patient['occupation'] != ''){ ?>
							<br>
							<strong><?php echo '('.ucfirst($patient['occupation']).')'; ?></strong>
							<?php } ?>
						  </td>
                        </tr>
                        <tr>
                          <td>Gender : </td>
                          <td ><strong><?php echo ucfirst($patient['gender']); ?></strong></td>
                        </tr>
						<?php if ($patient['food_habits'] != false && $patient['food_habits']=="0" ) { ?>
                        <tr>
                          <td>Food habits : </td>
                          <td ><strong>
							<?php
							echo $patient['food_habits'];
						  ?>
						<?php } else { } ?>
					 </strong></td>
                        </tr>
                    </table>
                </div>
                <div class="span6">
                	<table class="table table-bordered table-invoice">
						<?php if($patient['address_line1'] !=  false || $patient['address_line2'] !=  false ) { ?>
                        <tr>
                          <td >Address : </td>
                          <td >
							<strong><?php echo ucfirst($patient['address_line1']).', '; ?></strong>
							<strong><?php echo ucfirst($patient['address_line2']); ?></strong>
						  </td>
                        </tr>
                       <?php } else { } ?>
						<?php if($patient['city'] !=  false) { ?>
						 <tr>
                          <td>City : </td>
                          <td ><strong><?php echo ucfirst($patient['city']); ?></strong></td>
                        </tr>
							<?php } else { } ?>
							<?php if($patient['mobile_no'] !=  false) { ?>
                        <tr>
                          <td>Mobile : </td>
                          <td ><strong><?php echo $patient['mobile_no']; ?></strong></td>
                        </tr>
							<?php } else { } ?>
							<?php if($patient['email'] !=  false) { ?>
                        <tr>
                          <td>Email : </td>
                          <td ><strong><?php echo $patient['email']; ?></strong></td>
                        </tr>
							<?php } else { } ?>
                    </table>
                </div>
            </div>
			
			<!-- Case notes  -->
            
			</td></tr>
			<?php if($report['case_notes']==1 ) { ?>
			<tr><td colspan="3">
                 <?php
						$CI =& get_instance();
						$CI->load->model(array('registration_model','staff_model'));
						if($caseNote != false) {
						?>
						
						<h5><strong>Subjective :</strong></h5>
						 <?php
						 $clientName = $this->session->userdata('first_name');
								foreach($caseNote as $caseNotes){
									$enteredBy = $caseNotes['modify_by'];
									
									$profileInfo = $CI->registration_model->getProfileInfo($enteredBy);
									$staffInfo = $CI->staff_model->getStaffInfo($enteredBy);
									
									if($profileInfo != false){
										$clientName = $profileInfo['first_name'];
								}
									else if($staffInfo != false){
										$clientName = $staffInfo['first_name'];
								$clientName = $staffInfo['first_name'];
									}
									
									$arrCaseNotes = explode("\n",$caseNotes['case_notes']);
								?>
						   <div class="row-fluid">
							<table class="table table-bordered table-invoice-full">
							  <thead>
								<tr>
								 <?php if($caseNotes['case_notes'] != false) { ?>
								  <th>Date</th>
								  <?php } else { } ?>
								   <?php if($caseNotes['case_notes'] != false ) { ?>
								  <th>Description</th>
								   <?php } else { } ?>
								   <?php if($clientName!= false ) { ?>
								  <th>Approved By</th>
								   <?php } else { } ?>
								</tr>
							  </thead>
							  <tbody>
							   
								<tr class="odd gradeX">
								 <?php if($caseNotes['case_notes'] != false ) { ?> <td style="text-align:center"><?php echo date('d/m/Y', strtotime($caseNotes['cn_date'])); ?></td> <?php } else { } ?>
								  <?php if($caseNotes['case_notes'] != false ) { ?><td style="vertical-align: middle">
								  <?php
									for($i=0;$i<count($arrCaseNotes);$i++){
										echo $arrCaseNotes[$i].'<br>';
									}
								  ?>
								 </td> <?php } else { } ?>
								  <?php if($clientName!= false ) { ?> <td style="text-align:center"><?php echo $clientName; ?></td> <?php } else { } ?>
								 </tr>
								
							  </tbody>
							</table>
						</div>
						<?php
						} }
						?>
						
						
                    </td>
                </tr>
				<?php } ?>
				<?php if($report['prog_notes']==1 ) { ?>
            <tr><td colspan="3">
                        
				   <?php if($progNote != false) {
					?>
					<h5><strong>Objective :</strong></h5>
						
					  <?php
							foreach($progNote as $progNotes){
								
							?>
					<div class="row-fluid">
						<table class="table table-bordered table-invoice-full">
						  <thead>
							<tr>
							 <?php if($progNotes['pn_date'] != false ) { ?>
							  <th>Date</th>
								<?php } else { } ?>
							   <?php if($progNotes['prog_notes'] != false ) { ?>
							  <th>Description</th>
								<?php } else { } ?>
							   
							</tr>
						  </thead>
						  <tbody>
						  
							<tr class="odd gradeX">
							  <?php if($progNotes['pn_date'] != false ) { ?> <td style="vertical-align: middle"><?php echo date('d/m/Y', strtotime($progNotes['pn_date'])); ?></td><?php } else { } ?>
							  <?php if($progNotes['prog_notes'] != false ) { ?> <td style="vertical-align: middle"><?php echo $progNotes['prog_notes']; ?></td><?php } else { } ?>
							 
							 </tr>
							
						  </tbody>
						</table>
					</div>
					<?php } ?>
					<?php
					}
					?>
					
                    </td>
                </tr>
				<?php } ?>
				<?php if($report['remarks']==1 ) { ?>
            <tr><td colspan="3">
                       
						<?php
						if($remark != false) {
						?>
						<h5><strong>Assessment :</strong></h5>
							
						<?php
								foreach($remark as $remarks){
									
								?>
						<div class="row-fluid">
							<table class="table table-bordered table-invoice-full">
							  <thead>
								<tr>
								 <?php if($remarks['remark_date'] != false ) { ?>
								  <th>Date</th>
								  <?php } else { } ?>
								  <?php if($remarks['remarks'] != false ) { ?>
								  <th>Description</th>
								  <?php } else { } ?>
								  
								</tr>
							  </thead>
							  <tbody>
								
								<tr class="odd gradeX">
								  <?php if($remarks['remark_date'] != false ) { ?><td style="vertical-align: middle"><?php echo date('d/m/Y', strtotime($remarks['remark_date'])); ?></td><?php } else { } ?>
								 <?php if($remarks['remarks'] != false ) { ?> <td style="vertical-align: middle"><?php echo $remarks['remarks']; ?></td><?php } else { } ?>
								  </tr>
								
							  </tbody>
							</table>
						</div>
						<?php
						} }
						?>
						
                    </td>
                </tr>
				<?php } ?>
				<?php if($report['plan']==1 ) { ?>
            <tr><td colspan="3">
               <div class="row-fluid">
					
					<?php
					if($plans != false) {
					?>
					<h5><strong>Plan :</strong></h5>
						
					<?php
							foreach($plans as $plan){
								
							?>
					<div class="row-fluid">
						<table class="table table-bordered table-invoice-full">
						  <thead>
							<tr>
							 <?php if($plan['plan_date'] != false ) { ?>
							  <th>Date</th>
							  <?php } else { } ?>
							  <?php if($plan['description'] != false ) { ?>
							  <th>Description</th>
							  <?php } else { } ?>
							  
							</tr>
						  </thead>
						  <tbody>
							
							<tr class="odd gradeX">
							  <?php if($plan['plan_date'] != false ) { ?><td style="vertical-align: middle"><?php echo date('d/m/Y', strtotime($plan['plan_date'])); ?></td><?php } else { } ?>
							 <?php if($plan['description'] != false ) { ?> <td style="vertical-align: middle"><?php echo $plan['description']; ?></td><?php } else { } ?>
							  </tr>
							
						  </tbody>
						</table>
					</div>
					<?php
					} } 
					?>
					</div>
                    </td>
                </tr>
				<?php } ?><?php if($report['treatment']==1 ) { ?>
		  <tr><td colspan="3">
		  
          <?php
			if($treatment != false) {
			?>
            <div class="row-fluid">
            	<h5>Treatment Summary :</h5>
                <table class="table table-bordered table-invoice-full">
                  <thead>
                    <tr>
                      <th>Date</th>
					  <th>Treatment</th>
					  <th>Tariff Codes</th>
					  <th>Comments</th>
</tr>
                  </thead>
                  <tbody>
                    <?php
					foreach($treatment as $treatments){ 
					?>
					<tr class="odd gradeX">
					  <td style="vertical-align: middle"><?php echo date('d/m/Y', strtotime($treatments['treatment_date'])); ?></td>
					  <td style="vertical-align: middle"><?php echo $treatments['itemName']; ?></td>
					  <td style="vertical-align: middle"><?php echo $treatments['treatment_quantity']; ?></td>
					  <td style="vertical-align: middle"><?php echo $treatments['treatment_price']; ?></td>
					
					 	</tr>
					<?php } ?>
                  </tbody>
                </table>
            </div>
            <?php
			}
			?>
			
		  </td>  </tr><?php
			}
			?>
				<?php if($report['body_chart'] == 1 ) {  ?>
				<tr><td colspan="3">
				 <?php 
					if($bodychart != false) {
					?>
					<h5><strong>Body Chart :</strong></h5>
						
					<?php
							foreach($bodychart as $bodycharts){
								
							?>
					<div class="row-fluid">
						<table class="table table-bordered table-invoice-full">
						  <thead>
							<tr>
							 <?php if($bodycharts['date'] != false ) { ?>
							  <th>Date</th>
							  <?php } else { } ?>
							  <?php if($bodycharts['img_name'] != false ) { ?>
							  <th>Body Chart</th>
							  <?php } else { } ?>
							  
							</tr>
						  </thead>
						  <tbody>
							
							<tr class="odd gradeX">
							  <?php if($bodycharts['date'] != false ) { ?><td style="vertical-align: middle"><?php echo date('d/m/Y', strtotime($bodycharts['date'])); ?></td><?php } else { } ?>
							 <?php if($bodycharts['img_name'] != false ) { ?> <td style="vertical-align: middle"><img src="<?php echo base_url().'wpaintone/test/uploads/'.$bodycharts['img_name'] ?>" style="width:250px;height:180px;"/></td><?php } else { } ?>
							  </tr>
							
						  </tbody>
						</table>
					</div>
					
					<?php
					} } else {}
					?>
				</td></tr>
				<?php } ?>
				<?php if($report['chief_complain']==1 ) { ?>
					
				<tr><td colspan="3">
				<div class="row-fluid">
						
					<?php
					if($chief_comp != false) { ?>
					<h5><strong>Chief Complaints :</strong></h5>
					<?php
					foreach($chief_comp as $chief_complaints){ 
					?>
					
						<table class="table table-bordered table-invoice-full">
						  <thead>
							<tr>
							<?php if($chief_complaints['cc_date'] != false ) { ?>
							  <th>Date</th>
							  <?php } else { } ?>
							  <?php if($chief_complaints['chief_complaints_dtl'] != false ) { ?>
							  <th>What are your chief complaints?</th>
							   <?php } else { } ?>
							  <?php if($chief_complaints['how_long_you_had_this_prob'] != false ) { ?>
							  <th>How long you had this problem?</th>
							   <?php } else { } ?>
							  <?php if($chief_complaints['had_this_problem_before'] != false ) { ?>
							  <th>Had this problem before?</th>
							   <?php } else { } ?>
							  <?php if($chief_complaints['what_treatment_you_had'] != false ) { ?>
							  <th>what treatments you had?</th>
							   <?php } else { } ?>
							</tr>
						  </thead>
						  <tbody>
							
							<tr class="odd gradeX">
							 <?php if($chief_complaints['cc_date'] != false ) { ?> <td style="text-align:center"><?php echo date('d/m/Y', strtotime($chief_complaints['cc_date'])); ?></td> <?php } else { } ?>
							  <?php if($chief_complaints['chief_complaints_dtl'] != false ) { ?><td style="text-align:center"><?php echo $chief_complaints['chief_complaints_dtl']; ?></td> <?php } else { } ?>
							  <?php if($chief_complaints['how_long_you_had_this_prob'] != false ) { ?> <td style="text-align:center"><?php echo $chief_complaints['how_long_you_had_this_prob']; ?></td> <?php } else { } ?>
							 <?php if($chief_complaints['had_this_problem_before'] != false ) { ?> <td style="text-align:center"><?php echo $chief_complaints['had_this_problem_before']; ?></td> <?php } else { } ?>
							  <?php if($chief_complaints['what_treatment_you_had'] != false ) { ?> <td style="text-align:center"><?php echo $chief_complaints['what_treatment_you_had']; ?></td> <?php } else { } ?>
							</tr>
							
						  </tbody>
						</table>
						<?php } ?>
						<?php
					}
					?>
					</div>
					
				</td></tr><?php } ?><?php if($report['history']==1 ) { ?>
				<tr><td colspan="3">
				
			   <div class="row-fluid">
            	<?php 	if($history != false) { ?>
					<h5><strong>History :</strong></h5>
					  <?php $arr=array(); ?>
							<?php foreach($history as $his){ 
							$arr[]=$his['drinking'];
							}	?>		
						<?php 
							if($history != false) { 
								foreach($history as $his){ 
							?>
						<table class="table table-bordered table-invoice-full">
						  <thead>
							<tr>
							<?php if($his['his_date'] != false ) { ?>
							  <th >Date</th>
							  <?php } else { } ?>
							  <?php if($his['his_other_disease'] != false ) { ?>
							  <th >History</th>
							  <?php } else { ?>
							  <?php } ?>
							   <?php if($his['medical'] != false ) { ?>
							  <th >Medical History</th>
							  <?php } else { ?>
							  <?php } ?>
								<?php if($his['surgical'] != false ) { ?>
							  <th >Surgical History</th>
							  <?php } else { ?>
							  <?php } ?>
							   <?php if($his['diabetes'] != false &&  $his['diabetes'] !="0" ) { ?>
							  <th >Diabetes</th>
							  <?php } else { ?>
							  <?php } ?>
								 <?php if($his['blood_pressure'] != false &&  $his['blood_pressure'] !="0" ) { ?>
							  <th >BP</th>
							  <?php } else { ?>
							  <?php } ?>
								<?php if($his['medicine_used_prev'] != false ) { ?>
							  <th >Med. used prev.</th>
							  <?php } else { ?>
							  <?php } ?>
								<?php if($his['smoking'] != false && $his['smoking']!="0" ) { ?>
							  <th >Smoking</th>
							  <?php } else { ?>
							  <?php } ?>
								 <?php if($his['drinking'] != false  && $his['drinking'] != '0') { ?>
							  <th >Drinking</th>
							  <?php } else { ?>
							  <?php } ?>
								 <?php if($his['Fever'] != false &&  $his['Fever'] != '0') { ?>
							  <th >Fever</th>
							  <?php } else { ?>
							  <?php } ?>
							 </tr>
						  </thead>
						  <tbody>
							<tr class="odd gradeX">
							 <?php if($his['his_date'] != false ) { ?>
							  <td style="text-align:center"><?php echo date('d/m/Y', strtotime($his['his_date'])); ?></td><?php } else { } ?>
							   <?php if($his['his_other_disease'] != false ) { ?><td style="text-align:center"><?php echo $his['his_other_disease']; ?></td><?php } else { } ?>
							   <?php if($his['medical'] != false ) { ?><td style="text-align:center"><?php echo $his['medical']; ?></td><?php } else { } ?>
								 <?php if($his['surgical'] != false ) { ?><td style="text-align:center"><?php echo $his['surgical']; ?></td><?php } else { } ?>
							   <?php if($his['diabetes'] != false &&  $his['diabetes'] !="0" ) { ?><td style="text-align:center">
							  <?php
									echo $his['diabetes']; 
								  ?></td><?php } else { } ?>
									<?php if($his['blood_pressure'] != false &&  $his['blood_pressure'] !="0" ) { ?> <td style="text-align:center">
									<?php 
									echo $his['blood_pressure']; 
								   ?></td><?php } else { } ?>
							   <?php if($his['medicine_used_prev'] != false ) { ?> <td style="text-align:center"><?php echo $his['medicine_used_prev']; ?></td><?php } else { } ?>
							  <?php if($his['smoking'] != false && $his['smoking']!="0" ) { ?>  <td style="text-align:center">
							   <?php  
									echo $his['smoking'];
								  ?>
							  </td><?php } else { } ?>
							 
							   <?php if($his['drinking'] != false  && $his['drinking'] != '0') { ?><td style="text-align:center">
								<?php
									echo $his['drinking'];  ?>
							  </td><?php } else { } ?>
							 
							  <?php if($his['Fever'] != false  && $his['Fever'] != '0') { ?><td style="text-align:center">
							   <?php
									echo $his['Fever'];
								   ?>
							  </td><?php } else { } ?>
							   
							  </tr>
							
						  </tbody>
						</table>
						<?php } } ?> 
						 <?php
						 if($history != false) {
							foreach($history as $his){ 
							?>
						<table class="table table-bordered table-invoice-full">
						  <thead>
							<tr>
							  <?php if($his['Heart'] != false ) { ?>
							  <th>Heart Disease</th>
							  <?php } else { ?>
							  <?php } ?>
							   <?php if($his['Disorder'] != false ) { ?>
							  <th> Bleeding Disorder</th>
							   <?php } else { ?>
							  <?php } ?>
							  <?php if($his['hereditary_disease'] != false ) { ?>
							  <th>Hereditary</th>
							  <?php } ?>
							  <?php if($his['Infection'] != false ) { ?>
							  <th>Infection</th>
							  <?php } else { ?>
							  <?php } ?>
								<?php if($his['Pregnancy'] != false ) { ?>
							  <th>Preghnency</th>
							   <?php } else { ?>
							  <?php } ?>
							  <?php if($his['HTN'] != false ) { ?>
							  <th>HTN</th>
							   <?php } else { ?>
							  <?php } ?>
							  <?php if($his['TB'] != false ) { ?>
							  <th>TB</th>
							   <?php } else { ?>
							  <?php } ?>
							  <!--<th>Cancer</th>
							  <th>AIDS</th>-->
							   <?php if($his['Allergies'] != false ) { ?>
							  <th>Allergies</th>
							  <?php } else { ?>
							  <?php } ?>
							   <?php if($his['Osteoporotic'] != false ) { ?>
							  <th>Osteoporotic</th>
							  <?php } else { ?>
							  <?php } ?>
							   <?php if($his['Depression'] != false ) { ?>
							  <th>Depression</th>
							  <?php } else { ?>
							  <?php } ?>
							  <?php if($his['Hepatitis'] != false ) { ?>
							  <th>Hepatitis</th>
							  <?php } else { ?>
							  <?php } ?>
							  <?php if($his['Implants'] != false ) { ?>
							  <th>Implants</th>
							   <?php } else { ?>
							  <?php } ?>
							</tr>
						  </thead>
						  <tbody>
						   
							<tr class="odd gradeX">
							
							 
							   <?php if($his['Heart'] != false && $his['Heart'] != '0' ) { ?>
							   <td style="text-align:center">
								<?php echo $his['Heart']; ?>
									 </td>
							 <?php } else { } ?>
							 <?php if($his['Disorder'] != false && $his['Disorder'] != '0' ) { ?>
							   <td style="text-align:center">
							   <?php 
									echo $his['Disorder'];
								   ?>
							  </td> 
							  <?php } else { } ?>
							
							 <?php if($his['Infection'] != false && $his['Infection'] != '0' ) { ?>
							<td style="text-align:center">
							   <?php 
									echo $his['Infection'];
								   ?> </td>
								  <?php } else { } ?>
								  <?php if($his['Pregnancy'] != false && $his['Pregnancy'] != '0' ) { ?>
							<td style="text-align:center">
							   <?php 
									echo $his['Pregnancy'];
								  ?>
								   
							  </td>
							   <?php } else { } ?>
								<?php if($his['HTN'] != false && $his['HTN'] != '0' ) { ?>
							  <td style="text-align:center">
							   <?php 
									echo $his['HTN'];
								  ?>
							  </td>
							   <?php } else { } ?>
							   <?php if($his['TB'] != false && $his['TB'] != '0' ) { ?>
							  <td style="text-align:center">
							   <?php  
									echo $his['TB'];
								  ?>
							  </td>
							  <?php } else { } ?>
							  <!--<td style="text-align:center">
							   <?php if ($his['Cancer']=="0"){
									echo '';
									}
								  else { 
									echo $his['Cancer'];
								  } ?>
							  </td>-->
							  <!-- <?php if ($his['AIDS']=="0"){
									echo '';
									}
								  else { 
									echo $his['AIDS'];
								  } ?>
							  </td>-->
								<?php if($his['Allergies'] != false && $his['Allergies'] != '0' ) { ?>
							  <td style="text-align:center">
							   <?php 
									echo $his['Allergies'];
								   ?>
							  </td>
							  <?php } else { } ?>
							 <?php if($his['Osteoporotic'] != false && $his['Osteoporotic'] != '0' ) { ?>
							  <td style="text-align:center">
							   <?php 
									echo $his['Osteoporotic'];
								  ?>
							  </td>
							  <?php } else { } ?>
							 <?php if($his['Depression'] != false && $his['Depression'] != '0' ) { ?>
							  <td style="text-align:center">
							   <?php 
									echo $his['Depression'];
								   ?>
							  </td>
							  <?php } else { } ?>
							 <?php if($his['Hepatitis'] != false && $his['Hepatitis'] != '0' ) { ?>
							  <td style="text-align:center">
							   <?php 
									echo $his['Hepatitis'];
								   ?>
							  </td>
							   <?php } else { } ?>
							   <?php if($his['Implants'] != false && $his['Implants'] != '0' ) { ?>
							  <td style="text-align:center">
							   <?php 
									echo $his['Implants'];
								  ?></td>
								 <?php } else { } ?>
								  <?php if($his['hereditary_disease'] != false && $his['hereditary_disease'] != '0' ) { ?>
							  <td style="text-align:center">
							   <?php 
									echo $his['hereditary_disease'];
								   ?>
							  </td>
							   <?php } else { } ?>
							 </tr>
							<?php } ?>
						  </tbody>
						</table>
						 <?php
					} }
					?>
					</div>
					
				</td></tr><?php } ?><?php if($report['pain']==1 ) { ?>
				<tr><td colspan="3">
				<?php
				if($pain != false) { ?>
				<h5><strong>Pain :</strong></h5>
					<div class="row-fluid">
				   
					<?php
						foreach($pain as $pains){ 
					?>
						<table class="table table-bordered table-invoice-full">
						  <thead>
							<tr>
							<?php if ($pains['pain_date'] != false) { ?>
							  <th>Date</th>
							  <?php } else { } ?>
							  <?php if ($pains['pain_site'] != false) { ?>
							  <th>Pain site</th>
							   <?php } else { } ?>
							  <?php if ($pains['severity_of_pain'] != false || $pains['severity_of_pain'] != 0) { ?>
							  <th>Severity of pain</th>
							   <?php } else { } ?>
							  <?php if ($pains['Threshold'] != false || $pains['Threshold'] != 0) { ?>
							  <th>pain Threshold(Algometry)Site</th>
							   <?php } else { } ?>
							  <?php if ($pains['pain_nature'] != false) { ?>
							  <th>Pain nature</th>
							   <?php } else { } ?>
							  <?php if ($pains['pain_onset'] != false) { ?>
							  <th>Pain onset</th>
							   <?php } else { } ?>
							 </tr>
						  </thead>
						   <tbody>
							
							<tr class="odd gradeX">
							<?php if ($pains['pain_date'] != false) { ?>
							  <td style="text-align:center"><?php echo date('d/m/Y', strtotime($pains['pain_date'])); ?></td>
							   <?php } else { } ?>
							  <?php if ($pains['pain_site'] != false) { ?>
							  <td style="text-align:center"><?php echo $pains['pain_site']; ?></td>
							   <?php } else { } ?>
							  <?php if ($pains['severity_of_pain'] != false || $pains['severity_of_pain'] != 0) { ?>
							  <td style="text-align:center">
							 
							   <?php 
									echo $pains['severity_of_pain'];
								  } ?> /10
								  </td>
								  
								  <?php if ($pains['Threshold'] != false || $pains['Threshold'] != 0) { ?>
								  <td style="text-align:center">
								  <?php 
									echo $pains['Threshold'];
								  } ?>
							  </td>
							   
							  <?php if ($pains['pain_nature'] != false) { ?>
							   <td style="text-align:center"><?php echo $pains['pain_nature']; ?></td>
								<?php } else { } ?>
							   <?php if ($pains['pain_onset'] != false) { ?>
							  <td style="text-align:center"><?php echo $pains['pain_onset']; ?></td>
							   <?php } else { } ?>
							  
						  </tbody>
						</table>
						<?php
					} 
						foreach($pain as $pains){ 
					?>
						 <table class="table table-bordered table-invoice-full">
						  <thead>
							<tr>   	  
							  
							  <?php if ($pains['pain_duration'] != false) { ?>
							  <th>Pain duration</th>
							  <?php } else { } ?>
							  <?php if ($pains['side_or_location'] != false) { ?>
							  <th>Side or location</th>
							   <?php } else { } ?>
							  <?php if ($pains['diurnal_variations'] != false) { ?>
							  <th>Diurnal variations</th>
							   <?php } else { } ?>
							  <?php if ($pains['trigger_point'] != false) { ?>
							  <th>Trigger Points</th>
							   <?php } else { } ?>
							  <?php if ($pains['aggravating_factors'] != false) { ?>
							  <th>Aggravating factors</th>
							   <?php } else { } ?>
							  <?php if ($pains['releaving_factors'] != false) { ?>
							  <th>Relieving factors</th>
							   <?php } else { } ?>
							 
							   </tr>
						  </thead>
						   <tbody>
									  
							  <?php if ($pains['pain_duration'] != false) { ?>
							  <td style="text-align:center"><?php echo $pains['pain_duration']; ?></td>
							  <?php } else { } ?>
							  <?php if ($pains['side_or_location'] != false) { ?>
							  <td style="text-align:center"><?php echo $pains['side_or_location']; ?></td>
							  <?php } else { } ?>
							  <?php if ($pains['diurnal_variations'] != false) { ?>
							  <td style="text-align:center"><?php echo $pains['diurnal_variations']; ?></td>
							  <?php } else { } ?>
							  <?php if ($pains['trigger_point'] != false) { ?>
							  <td style="text-align:center"><?php echo $pains['trigger_point']; ?></td>
							  <?php } else { } ?>
							  <?php if ($pains['aggravating_factors'] != false) { ?>
							  <td style="text-align:center"><?php echo $pains['aggravating_factors']; ?></td>
							  <?php } else { } ?>
							  <?php if ($pains['releaving_factors'] != false) { ?>
							  <td style="text-align:center"><?php echo $pains['releaving_factors']; ?></td>
							  <?php } else { } ?>
							</tr>
							 </tbody>
						</table>
							 <?php } ?>
						 
						</div>
						  <?php
					}
					?>
            	
				</td></tr><?php } ?><?php if($report['examination']==1 ) { ?>
				<tr><td colspan="3">
					<div class="row-fluid">
				  <?php
					if($examn != false) { ?>
					<h5><strong>Examination :</strong></h5>
					<?php
					foreach($examn as $examns){ 
					?>
				 
						<table class="table table-bordered table-invoice-full">
						  <thead>
							<tr>
							 <?php if ($examns['examn_date'] != false) { ?>
							  <th>Date</th>
							  <?php } else { } ?>
							  <?php if ($examns['bp_systolic_diastolic'] != false) { ?>
							  <th>Blood pressure sys/dial</th>
							  <?php } else { } ?>
							   <?php if ($examns['temperature'] != false && $examns['temperature'] !="0") { ?>
							   <th>Temperature</th>
							  <?php } else { } ?>
							   <?php if ($examns['heart_rate'] != false && $examns['heart_rate'] !="0") { ?>
							
							  <th>Heart rate</th>
							  <?php } else { } ?>
							   <?php if ($examns['respiratory_rate'] != false && $examns['respiratory_rate'] !="0") { ?>
								  <th>Respiratory rate</th>
							  <?php } else { } ?>
							   <?php if ($examns['built_of_patient'] != false && $examns['built_of_patient'] !="0") { ?>
							   <th>Built of the patient</th>
							  <?php } else { } ?>
							  <?php if ($examns['posture'] != false) { ?>
							  <th>Posture</th>
							  <?php } else { } ?>
							  <?php if ($examns['gait'] != false) { ?>
							  <th>Gait</th>
							  <?php } else { } ?>
							  
							</tr>
						  </thead>
						  <tbody> 
						   
							<tr class="odd gradeX">
							  <?php if ($examns['examn_date'] != false) { ?>
							  <td style="text-align:center"><?php echo date('d/m/Y', strtotime($examns['examn_date'])); ?></td>
							   <?php } else { } ?>
							  <?php if ($examns['bp_systolic_diastolic'] != false) { ?>
							  <td style="text-align:center">
							 
							  <?php if ($examns['bp_systolic_diastolic']=="0"){
									echo '';
									}
								  else { 
									echo $examns['bp_systolic_diastolic'];
								  } ?>
								 </td>
								   <?php } else { } ?>
								 <?php if ($examns['temperature'] != false && $examns['temperature'] !="0") { ?>
							  <td style="text-align:center">
							   <?php		  
									echo $examns['temperature'];
								 ?>
							   </td>
								 <?php } else { } ?>
							   <?php if ($examns['heart_rate'] != false && $examns['heart_rate'] !="0") { ?>
								<td style="text-align:center">
							   <?php
									echo $examns['heart_rate'];
								  ?>
							   </td>
								 <?php } else { } ?>
							   <?php if ($examns['respiratory_rate'] != false && $examns['respiratory_rate'] !="0") { ?>
								<td style="text-align:center">
							   <?php 
									echo $examns['respiratory_rate'];
								   ?>
							   </td>
								 <?php } else { } ?>
							   <?php if ($examns['built_of_patient'] != false && $examns['built_of_patient'] !="0") { ?>
								<td style="text-align:center">
							   <?php 
									echo $examns['built_of_patient'];
								   ?>
							   </td>
								 <?php } else { } ?>
							   <?php if ($examns['posture'] != false) { ?>
							  <td style="text-align:center"><?php echo $examns['posture']; ?></td>
								<?php } else { } ?>
							  <?php if ($examns['gait'] != false) { ?>
							  <td style="text-align:center"><?php echo $examns['gait']; ?></td>
								<?php } else { } ?>
							  
							</tr>
							
						  </tbody>
						</table>
						<?php } ?>
						 <?php
					}
					?>
					</div>
				</td></tr><?php } ?> 
				<tr><td colspan="3">
				 
				 
            <!-- Motor Examination -->
			<div class="row-fluid">
			
            <?php 
			if($mexamn != false) {
			?>
            
            	<h5><strong>Motor Examination :</strong></h5>
                <?php
				// declare variables and array for loop
				$headneck_cols      = 'tbl_patient_mexamination_headneck.left_headneck_tone AS leftTone,tbl_patient_mexamination_headneck.left_headneck_power AS leftPower,tbl_patient_mexamination_headneck.left_headneck_rom AS leftRom,tbl_headneck_muscles.movement AS Movement,tbl_headneck_muscles.muscles AS Muscles,tbl_headneck_muscles.nerve_root AS nerveRoot,tbl_patient_mexamination_headneck.right_headneck_rom AS rightRom,tbl_patient_mexamination_headneck.right_headneck_power AS rightPower,tbl_patient_mexamination_headneck.right_headneck_tone AS rightTone';
				$hip_cols           = 'tbl_patient_mexamination_hip.left_hip_tone AS leftTone,tbl_patient_mexamination_hip.left_hip_power AS leftPower,tbl_patient_mexamination_hip.left_hip_rom AS leftRom,tbl_hip_muscles.movement AS Movement,tbl_hip_muscles.muscles AS Muscles,tbl_hip_muscles.nerve_root AS nerveRoot,tbl_patient_mexamination_hip.right_hip_rom AS rightRom,tbl_patient_mexamination_hip.right_hip_power AS rightPower,tbl_patient_mexamination_hip.right_hip_tone AS rightTone';
				$knee_cols          = 'tbl_patient_mexamination_knee.left_knee_tone AS leftTone,tbl_patient_mexamination_knee.left_knee_power AS leftPower,tbl_patient_mexamination_knee.left_knee_rom AS leftRom,tbl_knee_muscles.movement AS Movement,tbl_knee_muscles.muscles AS Muscles,tbl_knee_muscles.nerve_root AS nerveRoot,tbl_patient_mexamination_knee.right_knee_rom AS rightRom,tbl_patient_mexamination_knee.right_knee_power AS rightPower,tbl_patient_mexamination_knee.right_knee_tone AS rightTone';
				$ankle_cols         = 'tbl_patient_mexamination_ankle.left_ankle_tone AS leftTone,tbl_patient_mexamination_ankle.left_ankle_power AS leftPower,tbl_patient_mexamination_ankle.left_ankle_rom AS leftRom,tbl_ankle_muscles.movement AS Movement,tbl_ankle_muscles.muscles AS Muscles,tbl_ankle_muscles.nerve_root AS nerveRoot,tbl_patient_mexamination_ankle.right_ankle_rom AS rightRom,tbl_patient_mexamination_ankle.right_ankle_power AS rightPower,tbl_patient_mexamination_ankle.right_ankle_tone AS rightTone';
				$toes_cols          = 'tbl_patient_mexamination_toes.left_toes_tone AS leftTone,tbl_patient_mexamination_toes.left_toes_power AS leftPower,tbl_patient_mexamination_toes.left_toes_rom AS leftRom,tbl_toes_muscles.movement AS Movement,tbl_toes_muscles.muscles AS Muscles,tbl_toes_muscles.nerve_root AS nerveRoot,tbl_patient_mexamination_toes.right_toes_rom AS rightRom,tbl_patient_mexamination_toes.right_toes_power AS rightPower,tbl_patient_mexamination_toes.right_toes_tone AS rightTone';
				$hallux_cols        = 'tbl_patient_mexamination_hallux.left_hallux_tone AS leftTone,tbl_patient_mexamination_hallux.left_hallux_power AS leftPower,tbl_patient_mexamination_hallux.left_hallux_rom AS leftRom,tbl_hallux_muscles.movement AS Movement,tbl_hallux_muscles.muscles AS Muscles,tbl_hallux_muscles.nerve_root AS nerveRoot,tbl_patient_mexamination_hallux.right_hallux_rom AS rightRom,tbl_patient_mexamination_hallux.right_hallux_power AS rightPower,tbl_patient_mexamination_hallux.right_hallux_tone AS rightTone';
				$scapula_cols       = 'tbl_patient_mexamination_scapula.left_scapula_tone AS leftTone,tbl_patient_mexamination_scapula.left_scapula_power AS leftPower,tbl_patient_mexamination_scapula.left_scapula_rom AS leftRom,tbl_scapula_muscles.movement AS Movement,tbl_scapula_muscles.muscles AS Muscles,tbl_scapula_muscles.nerve_root AS nerveRoot,tbl_patient_mexamination_scapula.right_scapula_rom AS rightRom,tbl_patient_mexamination_scapula.right_scapula_power AS rightPower,tbl_patient_mexamination_scapula.right_scapula_tone AS rightTone';
				$shoulder_cols 	    = 'tbl_patient_mexamination_shoulder.left_shoulder_tone AS leftTone,tbl_patient_mexamination_shoulder.left_shoulder_power AS leftPower,tbl_patient_mexamination_shoulder.left_shoulder_rom AS leftRom,tbl_shoulder_muscles.movement AS Movement,tbl_shoulder_muscles.muscles AS Muscles,tbl_shoulder_muscles.nerve_root AS nerveRoot,tbl_patient_mexamination_shoulder.right_shoulder_rom AS rightRom,tbl_patient_mexamination_shoulder.right_shoulder_power AS rightPower,tbl_patient_mexamination_shoulder.right_shoulder_tone AS rightTone';
				$elbow_cols         = 'tbl_patient_mexamination_elbow.left_elbow_tone AS leftTone,tbl_patient_mexamination_elbow.left_elbow_power AS leftPower,tbl_patient_mexamination_elbow.left_elbow_rom AS leftRom,tbl_elbow_muscles.movement AS Movement,tbl_elbow_muscles.muscles AS Muscles,tbl_elbow_muscles.nerve_root AS nerveRoot,tbl_patient_mexamination_elbow.right_elbow_rom AS rightRom,tbl_patient_mexamination_elbow.right_elbow_power AS rightPower,tbl_patient_mexamination_elbow.right_elbow_tone AS rightTone';
				$forearm_cols       = 'tbl_patient_mexamination_forearm.left_forearm_tone AS leftTone,tbl_patient_mexamination_forearm.left_forearm_power AS leftPower,tbl_patient_mexamination_forearm.left_forearm_rom AS leftRom,tbl_forearm_muscles.movement AS Movement,tbl_forearm_muscles.muscles AS Muscles,tbl_forearm_muscles.nerve_root AS nerveRoot,tbl_patient_mexamination_forearm.right_forearm_rom AS rightRom,tbl_patient_mexamination_forearm.right_forearm_power AS rightPower,tbl_patient_mexamination_forearm.right_forearm_tone AS rightTone';
				$wrist_cols         = 'tbl_patient_mexamination_wrist.left_wrist_tone AS leftTone,tbl_patient_mexamination_wrist.left_wrist_power AS leftPower,tbl_patient_mexamination_wrist.left_wrist_rom AS leftRom,tbl_wrist_muscles.movement AS Movement,tbl_wrist_muscles.muscles AS Muscles,tbl_wrist_muscles.nerve_root AS nerveRoot,tbl_patient_mexamination_wrist.right_wrist_rom AS rightRom,tbl_patient_mexamination_wrist.right_wrist_power AS rightPower,tbl_patient_mexamination_wrist.right_wrist_tone AS rightTone';
				$fingers_cols       = 'tbl_patient_mexamination_fingers.left_fingers_tone AS leftTone,tbl_patient_mexamination_fingers.left_fingers_power AS leftPower,tbl_patient_mexamination_fingers.left_fingers_rom AS leftRom,tbl_fingers_muscles.movement AS Movement,tbl_fingers_muscles.muscles AS Muscles,tbl_fingers_muscles.nerve_root AS nerveRoot,tbl_patient_mexamination_fingers.right_fingers_rom AS rightRom,tbl_patient_mexamination_fingers.right_fingers_power AS rightPower,tbl_patient_mexamination_fingers.right_fingers_tone AS rightTone';
				$thumb_cols 	    = 'tbl_patient_mexamination_thumb.left_thumb_tone AS leftTone,tbl_patient_mexamination_thumb.left_thumb_power AS leftPower,tbl_patient_mexamination_thumb.left_thumb_rom AS leftRom,tbl_thumb_muscles.movement AS Movement,tbl_thumb_muscles.muscles AS Muscles,tbl_thumb_muscles.nerve_root AS nerveRoot,tbl_patient_mexamination_thumb.right_thumb_rom AS rightRom,tbl_patient_mexamination_thumb.right_thumb_power AS rightPower,tbl_patient_mexamination_thumb.right_thumb_tone AS rightTone';
				$respiration_cols   = 'tbl_patient_mexamination_respiration.respiration_apex AS leftTone,tbl_patient_mexamination_respiration.respiration_base AS leftPower,tbl_patient_mexamination_respiration.left_respiration_rom AS leftRom,tbl_respiration_muscles.movement AS Movement,tbl_respiration_muscles.muscles AS Muscles,tbl_respiration_muscles.nerve_root AS nerveRoot,tbl_patient_mexamination_respiration.right_respiration_rom AS rightRom,tbl_patient_mexamination_respiration.right_respiration_power AS rightPower,tbl_patient_mexamination_respiration.right_respiration_tone AS rightTone';
				$display_cols       = array($headneck_cols,$hip_cols,$knee_cols,$ankle_cols,$toes_cols,$hallux_cols,$scapula_cols,$shoulder_cols,$elbow_cols,$forearm_cols,$wrist_cols,$fingers_cols,$thumb_cols,$respiration_cols);
				$join_condition     = array('tbl_patient_mexamination_headneck.headneck_muscle_id = tbl_headneck_muscles.headneck_muscle_id','tbl_patient_mexamination_hip.hip_muscle_id = tbl_hip_muscles.hip_muscle_id','tbl_patient_mexamination_knee.knee_muscle_id = tbl_knee_muscles.knee_muscle_id','tbl_patient_mexamination_ankle.ankle_muscle_id = tbl_ankle_muscles.ankle_muscle_id','tbl_patient_mexamination_toes.toes_muscle_id = tbl_toes_muscles.toes_muscle_id','tbl_patient_mexamination_hallux.hallux_muscle_id = tbl_hallux_muscles.hallux_muscle_id','tbl_patient_mexamination_scapula.scapula_muscle_id = tbl_scapula_muscles.scapula_muscle_id','tbl_patient_mexamination_shoulder.shoulder_muscle_id = tbl_shoulder_muscles.shoulder_muscle_id','tbl_patient_mexamination_elbow.elbow_muscle_id = tbl_elbow_muscles.elbow_muscle_id','tbl_patient_mexamination_forearm.forearm_muscle_id = tbl_forearm_muscles.forearm_muscle_id','tbl_patient_mexamination_wrist.wrist_muscle_id = tbl_wrist_muscles.wrist_muscle_id','tbl_patient_mexamination_fingers.fingers_muscle_id = tbl_fingers_muscles.fingers_muscle_id','tbl_patient_mexamination_thumb.thumb_muscle_id = tbl_thumb_muscles.thumb_muscle_id','tbl_patient_mexamination_respiration.respiration_muscle_id = tbl_respiration_muscles.respiration_muscle_id');
				$motorExamnTitle    = array('Head Neck and Trunk','Hip','Knee','Ankle','Toes','Hallux','Scapula','Shoulder','Elbow','Fore arm','Wrist','Fingers','Thumb','Respiration');
				$motorExamnTable    = array('tbl_patient_mexamination_headneck','tbl_patient_mexamination_hip','tbl_patient_mexamination_knee','tbl_patient_mexamination_ankle','tbl_patient_mexamination_toes','tbl_patient_mexamination_hallux','tbl_patient_mexamination_scapula','tbl_patient_mexamination_shoulder','tbl_patient_mexamination_elbow','tbl_patient_mexamination_forearm','tbl_patient_mexamination_wrist','tbl_patient_mexamination_fingers','tbl_patient_mexamination_thumb','tbl_patient_mexamination_respiration');
				$motorExamnSubTable = array('tbl_headneck_muscles','tbl_hip_muscles','tbl_knee_muscles','tbl_ankle_muscles','tbl_toes_muscles','tbl_hallux_muscles','tbl_scapula_muscles','tbl_shoulder_muscles','tbl_elbow_muscles','tbl_forearm_muscles','tbl_wrist_muscles','tbl_fingers_muscles','tbl_thumb_muscles','tbl_respiration_muscles');
				
				// date loop
				foreach($mexamn as $mexamns) {
				// items loop
				for($i = 0; $i <= 13; $i++) {
					// check item exist for the looped date
					$getData = $this->patient_model->viewMexamnData($mexamns['mexamn_id'],$mexamns['mexamn_date'],$motorExamnTable[$i],$motorExamnSubTable[$i],$join_condition[$i],$display_cols[$i]);
					if($getData != false) {
				?>
                	<div><?php echo '<span>'.date('d/m/Y', strtotime($mexamns['mexamn_date'])) . ' - <strong>' . $motorExamnTitle[$i] . '</strong></span>'; ?></div>
                	<table class="table table-bordered table-invoice-full">
                      <thead>
                        <tr>
                          <td colspan="3" style="text-align:center"><span class="badge">Left</span></td>
                          <td colspan="3" style="text-align:center"><span class="badge">Parameters</span></td>
                          <td colspan="3" style="text-align:center"><span class="badge">Right</span></td>
                        </tr>
                        <tr>
                          <td style="text-align:center"><span class="badge badge-success">Tone</span></td>
                          <td style="text-align:center"><span class="badge badge-success">Power</span></td>
                          <td style="text-align:center"><span class="badge badge-success">ROM</span></td>
                          <td style="text-align:center"><span class="badge badge-success">Movement</span></td>
                          <td style="text-align:center"><span class="badge badge-success">Muscles</span></td>
                          <td style="text-align:center"><span class="badge badge-success">Nerve root</span></td>
                          <td style="text-align:center"><span class="badge badge-success">ROM</span></td>
                          <td style="text-align:center"><span class="badge badge-success">Power</span></td>
                          <td style="text-align:center"><span class="badge badge-success">Tone</span></td>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
						foreach($getData as $getDatas){
						?>
                          <tr>
                        	 <td style="text-align:center"><?php echo ($getDatas['leftTone'] != '') ? $getDatas['leftTone'] : '-'; ?></td>
                             <td style="text-align:center"><?php echo ($getDatas['leftPower'] != '') ? $getDatas['leftPower'] : '-'; ?></td>
                             <td style="text-align:center"><?php echo ($getDatas['leftRom'] != '') ? $getDatas['leftRom'] : '-'; ?></td>
                             <td style="text-align:center"><?php echo ($getDatas['Movement'] != '') ? $getDatas['Movement'] : '-'; ?></td>
                             <td style="text-align:center"><?php echo ($getDatas['Muscles'] != '') ? $getDatas['Muscles'] : '-'; ?></td>
                             <td style="text-align:center"><?php echo ($getDatas['nerveRoot'] != '') ? $getDatas['nerveRoot'] : '-'; ?></td>
                             <td style="text-align:center"><?php echo ($getDatas['rightRom'] != '') ? $getDatas['rightRom'] : '-'; ?></td>
                             <td style="text-align:center"><?php echo ($getDatas['rightPower'] != '') ? $getDatas['rightPower'] : '-'; ?></td>
                             <td style="text-align:center"><?php echo ($getDatas['rightTone'] != '') ? $getDatas['rightTone'] : '-'; ?></td>
						  </tr>
						<?php
						}
						?>
                      </tbody>
                    </table>
				<?php
					}
				}
				}
				}
				?>
				<?php 
				 if($combine != false) {
				 foreach($combine as $examns)
				   {
				 ?>
				 <table class="table table-bordered table-invoice-full">
				  <h5><strong>Combined movement Assesment of spine</strong></h5>
                  <thead>
				  <tr>
				 
				     <?php if ($examns['cervical'] != false) { ?>
                   <th>Cervical spine</th>
				    <?php } else { } ?>
				    <?php if ($examns['thoracic'] != false) { ?>
				   <th>Thoracic Spine</th>
				    <?php } else { } ?>
				    <?php if ($examns['lumbar'] != false) { ?>
				   <th>Lumbar Spine</th>
				    <?php } else { } ?>
				 </tr>
				 </thead>
				 <tbody>
				   <tr class="odd gradeX">
					  <?php if ($examns['cervical'] != false) { ?>
					  <td style="text-align:center"><?php echo $examns['cervical']; ?></td>
					   <?php } else { } ?>
					  <?php if ($examns['thoracic'] != false) { ?>
					  <td style="text-align:center"><?php echo $examns['thoracic']; ?></td>
					   <?php } else { } ?>
					  <?php if ($examns['lumbar'] != false) { ?>
					  <td style="text-align:center"><?php echo $examns['lumbar']; ?></td>
					   <?php } else { } ?>
					  </tr>
					   <?php } ?>
				</tbody>
				</table>
				 <?php } ?>
				 
				
				<?php
					if($cervical != false) {
					foreach($cervical as $examns){ 
				?>
				<?php if($examns['flexion1'] != false || $examns['Extension1'] != false || $examns['SideFlexion_left1'] != false || $examns['SideFlexion_right1'] != false || $examns['Rotation_left1'] != false || $examns['Rotation_right1'] != false) { ?>
				<table class="table table-bordered table-invoice-full">
				  <h5><strong>Cervical Spine:</strong></h5>
                  <thead>
                    <tr>
					
					  <th>Date</th>	
					
					<?php if($examns['flexion1'] != false ) { ?>
                      <th>FLexion</th>
					  <?php } else { } ?>
					  <?php if($examns['Extension1'] != false ) { ?>
					  <th>Extension</th>
					  <?php } else { } ?>
					  <?php if($examns['SideFlexion_left1'] != false ) { ?>
					  <th>Side Flexion Left</th>
					  <?php } else { } ?>
					  <?php if($examns['SideFlexion_right1'] != false ) { ?>
					  <th>Side Flexion Right</th>
					  <?php } else { } ?>
					  <?php if($examns['Rotation_left1'] != false ) { ?>
					  <th>Rotation Left</th>
					  <?php } else { } ?>
					  <?php if($examns['Rotation_right1'] != false ) { ?>
					  <th>Rotation Right</th>
					  <?php } else { } ?>
					 
				   </tr>
                  </thead> 
                  <tbody> 
                    <?php
						$data=explode(" ",$examns['mexamn_date']);
					?>
					<tr class="odd gradeX">
					<?php if($examns['mexamn_date'] != false ) { ?>
					   <td style="text-align:center"><?php echo $data[0]; ?></td>
					   <?php } else { } ?>
					   <?php if($examns['flexion1'] != false ) { ?>
					  <td style="text-align:center"><?php echo $examns['flexion1']; ?></td>
					  <?php } else { } ?>
					    <?php if($examns['Extension1'] != false ) { ?>
					  <td style="text-align:center"><?php echo $examns['Extension1']; ?></td>
					   <?php } else { } ?>
					    <?php if($examns['SideFlexion_left1'] != false ) { ?>
					  <td style="text-align:center"><?php echo $examns['SideFlexion_left1']; ?></td>
					   <?php } else { } ?>
					    <?php if($examns['SideFlexion_right1'] != false ) { ?>
					  <td style="text-align:center"><?php echo $examns['SideFlexion_right1']; ?></td>
					   <?php } else { } ?>
					    <?php if($examns['Rotation_left1'] != false ) { ?>
					  <td style="text-align:center"><?php echo $examns['Rotation_left1']; ?></td>
					   <?php } else { } ?>
					    <?php if($examns['Rotation_right1'] != false ) { ?>
					  <td style="text-align:center"><?php echo $examns['Rotation_right1']; ?></td>
					   <?php } else { } ?>
					  </tr>
					   
				</tbody>
				</table>
				 <?php } } } ?>
				 
				 
				 
				 
				 <?php
					if($lumber != false) {
					foreach($lumber as $examns){ 
				?>
				 <?php if($examns['flexion3'] != false || $examns['Extension3'] != false || $examns['SideFlexion_left3'] != false || $examns['SideFlexion_right3'] != false || $examns['rotation_left3'] != false || $examns['rotation_right3'] != false) { ?>
				<table class="table table-bordered table-invoice-full">
				  <h5><strong>Lumber Spine:</strong></h5>
                  <thead>
                    <tr>
					
					   <th>Date</th>	
					
					<?php if($examns['flexion3'] != false ) { ?>
                      <th>FLexion</th>
					  <?php } else { } ?>
					  <?php if($examns['Extension3'] != false ) { ?>
					  <th>Extension</th>
					  <?php } else { } ?>
					  <?php if($examns['SideFlexion_left3'] != false ) { ?>
					  <th>Side Flexion Left</th>
					  <?php } else { } ?>
					  <?php if($examns['SideFlexion_right3'] != false ) { ?>
					  <th>Side Flexion Right</th>
					  <?php } else { } ?>
					  <?php if($examns['rotation_left3'] != false ) { ?>
					  <th>Rotation Left</th>
					  <?php } else { } ?>
					  <?php if($examns['rotation_right3'] != false ) { ?>
					  <th>Rotation Right</th>
					  <?php } else { } ?>
					 
				   </tr>
                  </thead>
                  <tbody>
                    <?php
					
						$data=explode(" ",$examns['mexamn_date']);
					?>
					<tr class="odd gradeX">
					   <?php if($examns['flexion3'] != false || $examns['Extension3'] != false || $examns['SideFlexion_left3'] != false || $examns['SideFlexion_right3'] != false || $examns['rotation_left3'] != false || $examns['rotation_right3'] != false) { ?><td style="text-align:center"><?php echo $data[0]; ?></td> <?php } else { } ?>
					  <?php if($examns['flexion3'] != false ) { ?> <td style="text-align:center"><?php echo $examns['flexion3']; ?></td> <?php } else { } ?>
					  <?php if($examns['Extension3'] != false ) { ?> <td style="text-align:center"><?php echo $examns['Extension3']; ?></td> <?php } else { } ?>
					  <?php if($examns['SideFlexion_left3'] != false ) { ?> <td style="text-align:center"><?php echo $examns['SideFlexion_left3']; ?></td> <?php } else { } ?>
					   <?php if($examns['SideFlexion_right3'] != false ) { ?><td style="text-align:center"><?php echo $examns['SideFlexion_right3']; ?></td> <?php } else { } ?>
					  <?php if($examns['rotation_left3'] != false ) { ?> <td style="text-align:center"><?php echo $examns['rotation_left3']; ?></td> <?php } else { } ?>
					   <?php if($examns['rotation_right3'] != false ) { ?><td style="text-align:center"><?php echo $examns['rotation_right3']; ?></td> <?php } else { } ?>
					  </tr>
					  
				</tbody>
				</table>
				 <?php } } }?>
				 
				 
				
				<?php
					if($thoraccic != false) {
						foreach($thoraccic as $examns){ 
					?>
					<?php if($examns['flexion2'] != false || $examns['Extension2'] != false || $examns['SideFlexion_left2'] != false || $examns['SideFlexion_right2'] != false || $examns['rotation_right2'] != false || $examns['rotation_left2'] != false) { ?>
				 <table class="table table-bordered table-invoice-full">
					<h5><strong>Thoracci Spine :</strong></h5>
                  <thead>
                    <tr>
					 
					  <th>Date</th>
								  
					   <?php if($examns['flexion2'] != false ) { ?>
                      <th>FLexion</th>
					   <?php } else { } ?>
					   <?php if($examns['Extension2'] != false ) { ?>
					  <th>Extension</th>
					   <?php } else { } ?>
					   <?php if($examns['SideFlexion_left2'] != false ) { ?>
					  <th>Side Flexion Left</th>
					   <?php } else { } ?>
					   <?php if($examns['SideFlexion_right2'] != false ) { ?>
					  <th>Side Flexion Right</th>
					   <?php } else { } ?>
					   <?php if($examns['rotation_left2'] != false ) { ?>
					  <th>Rotation Left</th>
					   <?php } else { } ?>
					   <?php if($examns['rotation_right2'] != false ) { ?>
					  <th>Rotation Right</th>
					    <?php } else { } ?>
				   </tr>
                  </thead>
                  <tbody>
                    <?php
						
					$data=explode(" ",$examns['mexamn_date']);
					?>
					<tr class="odd gradeX">
					    <?php if($examns['flexion2'] != false || $examns['Extension2'] != false || $examns['SideFlexion_left2'] != false || $examns['SideFlexion_right2'] != false || $examns['rotation_right2'] != false || $examns['rotation_left2'] != false) { ?> <td style="text-align:center"><?php echo $data[0]; ?></td><?php } else { } ?>
					  <?php if($examns['flexion2'] != false ) { ?><td style="text-align:center"><?php echo $examns['flexion2']; ?></td><?php } else { } ?>
					  <?php if($examns['Extension2'] != false ) { ?><td style="text-align:center"><?php echo $examns['Extension2']; ?></td><?php } else { } ?>
					  <?php if($examns['SideFlexion_left2'] != false ) { ?> <td style="text-align:center"><?php echo $examns['SideFlexion_left2']; ?></td><?php } else { } ?>
					   <?php if($examns['SideFlexion_right2'] != false ) { ?><td style="text-align:center"><?php echo $examns['SideFlexion_right2']; ?></td><?php } else { } ?>
					   <?php if($examns['rotation_left2'] != false ) { ?><td style="text-align:center"><?php echo $examns['rotation_left2']; ?></td><?php } else { } ?>
					   <?php if($examns['rotation_right2'] != false ) { ?><td style="text-align:center"><?php echo $examns['rotation_right2']; ?></td><?php } else { } ?>
					  </tr>
					
                  </tbody>
                </table>
				<?php } } } ?>
				
				
				<?php
					if($masure != false) {
					foreach($masure as $examns){ 
					 if($examns['app_leg_shoet'] != 0 || $examns['ant_spine_to_inmal'] != 0 || $examns['mid_thigh_circum'] != 0 || $examns['mid_calf_circum'] != 0 ) { ?>
					<h5><strong>Measure:</strong></h5>
					<?php } } foreach($masure as $examns){ 
					 if($examns['app_leg_shoet'] != 0 || $examns['ant_spine_to_inmal'] != 0 || $examns['mid_thigh_circum'] != 0 || $examns['mid_calf_circum'] != 0 ) { ?>
			  	 <table class="table table-bordered table-invoice-full">
					
                  <thead>
                    <tr>
					
						<th>Date</th>
							
						 <?php if($examns['ant_spine_to_inmal'] != false && $examns['ant_spine_to_inmal'] != '0') { ?>
                      <th>Asis to Med.Mal</th>
					  <?php } else { } ?>
					   <?php  if($examns['app_leg_shoet'] != false && $examns['app_leg_shoet'] != '0')  { ?>
					  <th>Umb to Med.Mal</th>
					  <?php } else { } ?>
					   <?php if($examns['mid_thigh_circum'] != false && $examns['mid_thigh_circum'] != '0') { ?>
					  <th>Mid.Thigh Circum</th>
					  <?php } else { } ?>
					   <?php if($examns['mid_calf_circum'] != false && $examns['mid_calf_circum'] != '0') { ?>
					  <th>Mid.Calf Circum</th>
					  <?php } else { } ?>
				   </tr>
                  </thead>
                  <tbody>
                    <?php  
				
					$data=explode(" ",$examns['created_date']);
					?>
					
				    <tr class="odd gradeX">
					 <td style="text-align:center"><?php echo $data[0]; ?></td>
					  <?php if($examns['ant_spine_to_inmal'] != false && $examns['ant_spine_to_inmal'] != '0') { ?><td style="text-align:center"><?php echo $examns['ant_spine_to_inmal']; ?></td><?php } else { } ?>
					 <?php  if($examns['app_leg_shoet'] != false && $examns['app_leg_shoet'] != '0')  { ?><td style="text-align:center"><?php echo $examns['app_leg_shoet']; ?></td><?php } else { } ?>
					   <?php if($examns['mid_thigh_circum'] != false && $examns['mid_thigh_circum'] != '0') { ?> <td style="text-align:center"><?php echo $examns['mid_thigh_circum']; ?></td><?php } else { } ?>
					   <?php if($examns['mid_calf_circum'] != false && $examns['mid_calf_circum'] != '0') { ?><td style="text-align:center"><?php echo $examns['mid_calf_circum']; ?></td><?php } else { } ?>
					  
					  </tr>
					
                  </tbody>
                </table>
				
				<?php } }  ?>
					
                
            </div>
			
				</td></tr> <?php } ?><?php if($report['pediatric_exam']==1 ) { ?>
				<tr><td colspan="3">
				<div class="row-fluid">
					<?php
						if($pediatric != false) { ?>
						<h5>Pediatric Examination :</h5>
						<?php
							foreach($pediatric as $examns){ 
					?>
					<table class="table table-bordered table-invoice-full">
						  <thead>
							<tr>
							<?php if($examns['paediatric_date'] != false || $examns['milestone'] != false || $examns['finemotor'] != false || $examns['grossmotor'] != false ) { ?>
								 <th>Date</th>
							<?php } else { } ?>
							 <?php if($examns['milestone'] != false ) { ?>
							  <th>Milestone</th>
							  <?php } else { } ?>
							  <?php if($examns['finemotor'] != false ) { ?>
							  <th>Finemotor</th>
							  <?php } else { } ?>
							  <?php if($examns['grossmotor'] != false ) { ?>
							   <th>Grossmotor</th>
							   <?php } else { } ?>
						   </tr>
						  </thead>
						  <tbody>
						   
							<tr class="odd gradeX">
								<?php if($examns['paediatric_date'] != false || $examns['milestone'] != false || $examns['finemotor'] != false || $examns['grossmotor'] != false ) { ?>
								 <td style="text-align:center"><?php echo date('d-m-Y',strtotime($examns['paediatric_date'])); ?></td><?php } else { } ?>
							 <?php if($examns['milestone'] != false ) { ?><td style="text-align:center"><?php echo $examns['milestone']; ?></td><?php } else { } ?>
								<?php if($examns['finemotor'] != false ) { ?><td style="text-align:center"><?php echo $examns['finemotor']; ?></td><?php } else { } ?>
								<?php if($examns['grossmotor'] != false ) { ?><td style="text-align:center"><?php echo $examns['grossmotor']; ?></td><?php } else { } ?>
							 </tr>
							<?php }  ?>
						  </tbody>
						</table>
						<?php } ?>
						
					</div>
				   
				</td></tr><?php  } ?><?php if($report['neuro_exam']==1 ) { ?>
				<tr><td colspan="3">
				<div class="row-fluid">
				
			<?php
				if($glascow != false) { ?>
				<h5>Neuro Examination :</h5>
				<h5>Glasgow Coma Scale-info :</h5>
				<?php
					foreach($glascow as $examns){ 
			?>
			<table class="table table-bordered table-invoice-full">
				  <thead>
                    <tr>
					<?php if($examns['verbalresponse'] != false || $examns['eyeopening'] != false || $examns['motorresponse'] != false || $examns['total'] != false ) { ?>
						 <th>Date</th>
					<?php } else { } ?>
					<?php if($examns['eyeopening'] != false ) { ?>
                       <th>Eye Opening </th>
					   <?php } else { } ?>
					   <?php if($examns['verbalresponse'] != false ) { ?>
					  <th>Verbal response</th>
					  <?php } else { } ?>
					  <?php if($examns['motorresponse'] != false ) { ?>
					  <th>Motor response</th>
					  <?php } else { } ?>
					  <?php if($examns['total'] != false ) { ?>
					   <th>Total</th>
					   <?php } else { } ?>
				   </tr>
                  </thead>
                  <tbody>
                   
					<tr class="odd gradeX">
					<?php if($examns['verbalresponse'] != false || $examns['eyeopening'] != false || $examns['motorresponse'] != false || $examns['total'] != false ) { ?><td style="text-align:center"><?php echo $examns['nuero_date']; ?></td><?php } else { } ?>
					 <?php if($examns['eyeopening'] != false ) { ?><td style="text-align:center"><?php echo $examns['eyeopening']; ?></td><?php } else { } ?>
					    <?php if($examns['verbalresponse'] != false ) { ?><td style="text-align:center"><?php echo $examns['verbalresponse']; ?></td><?php } else { } ?>
					    <?php if($examns['motorresponse'] != false ) { ?><td style="text-align:center"><?php echo $examns['motorresponse']; ?></td><?php } else { } ?>
					 <?php if($examns['total'] != false ) { ?> <td style="text-align:center"><?php echo $examns['total']; ?></td><?php } else { } ?>
					  </tr>
					<?php }  ?>
                  </tbody>
                </table>
				<?php } ?>
				
				<?php
						if($tests!= false) { ?>
									
						<h5>Nuero Dynamic tests-info :</h5>
						<?php 
							foreach($tests as $treatments){ 
					?>
				
				<?php if($treatments['ulnar_left'] != false || $treatments['ulnar_right'] != false || $treatments['radial_left'] != false || $treatments['radial_right'] != false || $treatments['median_left'] != false || $treatments['median_right'] != false || $treatments['musculocutaneous_left'] != false ) { ?>
				<table class="table table-bordered table-invoice-full">
				<thead>
                    <tr>
					
					  <th>Date</th>
					 
					  <?php if($treatments['ulnar_left'] != false ) { ?>
                      <th>Ulnar Left</th>
					  <?php } else { } ?>
					  <?php if($treatments['ulnar_right'] != false ) { ?>
					   <th>Ulnar Right</th>
					   <?php } else { } ?>
					   <?php if($treatments['radial_left'] != false ) { ?>
					  <th>Radial Left</th>
					  <?php } else { } ?>
					  <?php if($treatments['radial_right'] != false ) { ?>
					  <th>Radial Right</th>
					  <?php } else { } ?>
					  <?php if($treatments['median_left'] != false ) { ?>
					  <th>Median Left</th>
					  <?php } else { } ?>
					  <?php if($treatments['median_right'] != false ) { ?>
					  <th>Median Right</th>
					  <?php } else { } ?>
					  <?php if($treatments['musculocutaneous_left'] != false ) { ?>
					  <th>Musculocutaneous Left</th>
					  <?php } else { } ?>
					  
					 
				   </tr>
                  </thead>
                  <tbody>
                    <?php
						
						$data = explode(" ", $treatments['neuro_date']);
					?>
					<tr class="odd gradeX">
					<?php if($treatments['ulnar_left'] != false || $treatments['ulnar_right'] != false || $treatments['radial_left'] != false || $treatments['radial_right'] != false || $treatments['median_left'] != false || $treatments['median_right'] != false || $treatments['musculocutaneous_left'] != false ) { ?><td style="vertical-align: middle"><?php echo $data[0]; ?></td><?php } else { } ?>
					<?php if($treatments['ulnar_left'] != false ) { ?> <td style="vertical-align: middle"><?php echo $treatments['ulnar_left']; ?></td><?php } else { } ?>
					  <?php if($treatments['ulnar_right'] != false ) { ?><td style="vertical-align: middle"><?php echo $treatments['ulnar_right']; ?></td><?php } else { } ?>
					    <?php if($treatments['radial_left'] != false ) { ?><td style="vertical-align: middle"><?php echo $treatments['radial_left']; ?></td><?php } else { } ?>
					  <?php if($treatments['radial_right'] != false ) { ?><td style="vertical-align: middle"><?php echo $treatments['radial_right']; ?></td><?php } else { } ?>
					   <?php if($treatments['median_left'] != false ) { ?><td style="vertical-align: middle"><?php echo $treatments['median_left']; ?></td><?php } else { } ?>
					   <?php if($treatments['median_right'] != false ) { ?><td style="vertical-align: middle"><?php echo $treatments['median_right']; ?></td><?php } else { } ?>
					    <?php if($treatments['musculocutaneous_left'] != false ) { ?><td style="vertical-align: middle"><?php echo $treatments['musculocutaneous_left']; ?></td><?php } else { } ?>
					  
					</tr>
					
                  </tbody>
                </table>
				<?php } } } ?>
				<?php
						if($tests!= false) {
							foreach($tests as $treatments){ 
					?>
					 <?php if($treatments['musculocutaneous_left'] != false || $treatments['sciatic_left'] != false || $treatments['sciatic_right'] != false || $treatments['tibial_left'] != false || $treatments['tibial_right'] != false || $treatments['commanperonial_left'] != false || $treatments['commanperonial_right'] != false ) { ?>
				<table class="table table-bordered table-invoice-full">
					
                  <thead>
				 
                    <tr>
					<?php if($treatments['musculocutaneous_left'] != false ) { ?>
					  <th>Musculocutaneous Right</th>
					  <?php } else { } ?>
					  <?php if($treatments['sciatic_left'] != false ) { ?>
					  <th>Sciatic Left</th>
					  <?php } else { } ?>
					  <?php if($treatments['sciatic_right'] != false ) { ?>
                      <th>Sciatic Right</th>
					  <?php } else { } ?>
					  <?php if($treatments['tibial_left'] != false ) { ?>
					  <th>Tibial Left</th>
					  <?php } else { } ?>
					  <?php if($treatments['tibial_right'] != false ) { ?>
					  <th>Tibial Right</th>
					  <?php } else { } ?>
					  <?php if($treatments['commanperonial_left'] != false ) { ?>
					  <th>Comman peronial Left</th>
					  <?php } else { } ?>
					  <?php if($treatments['commanperonial_right'] != false ) { ?>
					  <th>Comman peronial Right</th>
					  <?php } else { } ?>
				 </tr>
                  </thead>
                  <tbody>
                    
					<tr class="odd gradeX">
					  <?php if($treatments['musculocutaneous_left'] != false ) { ?><td style="vertical-align: middle"><?php echo $treatments['musculocutaneous_right']; ?></td><?php } else { } ?>
					   <?php if($treatments['sciatic_left'] != false ) { ?><td style="vertical-align: middle"><?php echo $treatments['sciatic_left']; ?></td><?php } else { } ?>
					   <?php if($treatments['sciatic_right'] != false ) { ?><td style="vertical-align: middle"><?php echo $treatments['sciatic_right']; ?></td><?php } else { } ?>
					    <?php if($treatments['tibial_left'] != false ) { ?><td style="vertical-align: middle"><?php echo $treatments['tibial_left']; ?></td><?php } else { } ?>
					   <?php if($treatments['tibial_right'] != false ) { ?> <td style="vertical-align: middle"><?php echo $treatments['tibial_right']; ?></td><?php } else { } ?>
					   <?php if($treatments['commanperonial_left'] != false ) { ?><td style="vertical-align: middle"><?php echo $treatments['commanperonial_left']; ?></td><?php } else { } ?>
					   <?php if($treatments['commanperonial_right'] != false ) { ?> <td style="vertical-align: middle"><?php echo $treatments['commanperonial_right']; ?></td><?php } else { } ?>
					 </tr>
					
                  </tbody>
                </table>
				<?php } } }  ?>
				<?php
						if($tests!= false) {
							foreach($tests as $treatments){ 
					?>
					<?php if($treatments['femoral_left'] != false || $treatments['femoral_right'] != false || $treatments['lateralcutaneous_left'] != false || $treatments['lateralcutaneous_right'] != false || $treatments['obturator_left'] != false || $treatments['obturator_right'] != false || $treatments['sural_left'] != false || $treatments['sural_right'] != false  ) { ?>
				<table class="table table-bordered table-invoice-full">
					<thead>
                    <tr>
					<?php if($treatments['femoral_left'] != false ) { ?>
                      <th>Femoral Left</th>
					   <?php } else { } ?>
					  <?php if($treatments['femoral_right'] != false ) { ?>
					  <th>Femoral Right</th>
					   <?php } else { } ?>
					  <?php if($treatments['lateralcutaneous_left'] != false ) { ?>
					  <th>Lateral cutaneous Left</th>
					   <?php } else { } ?>
					  <?php if($treatments['lateralcutaneous_right'] != false ) { ?>
					  <th>Lateral cutaneous Right</th>
					   <?php } else { } ?>
					  <?php if($treatments['obturator_left'] != false ) { ?>
					 <th>Obturator Left</th>
					  <?php } else { } ?>
					 <?php if($treatments['obturator_right'] != false ) { ?>
					  <th>Obturator Right</th>
					   <?php } else { } ?>
					  <?php if($treatments['sural_left'] != false ) { ?>
					 <th>Sural Left</th>
					  <?php } else { } ?>
					 <?php if($treatments['sural_right'] != false ) { ?>
					  <th>Sural Right</th>
					   <?php } else { } ?>
				   </tr>
                  </thead>
                  <tbody>
                   
					<tr class="odd gradeX">
					  <?php if($treatments['femoral_left'] != false ) { ?><td style="vertical-align: middle"><?php echo $treatments['femoral_left']; ?></td><?php } else { } ?>
					 <?php if($treatments['femoral_right'] != false ) { ?> <td style="vertical-align: middle"><?php echo $treatments['femoral_right']; ?></td><?php } else { } ?>
					   <?php if($treatments['lateralcutaneous_left'] != false ) { ?><td style="vertical-align: middle"><?php echo $treatments['lateralcutaneous_left']; ?></td><?php } else { } ?>
					   <?php if($treatments['lateralcutaneous_right'] != false ) { ?><td style="vertical-align: middle"><?php echo $treatments['lateralcutaneous_right']; ?></td><?php } else { } ?>
					  <?php if($treatments['obturator_left'] != false ) { ?><td style="vertical-align: middle"><?php echo $treatments['obturator_left']; ?></td><?php } else { } ?>
					  <?php if($treatments['obturator_right'] != false ) { ?><td style="vertical-align: middle"><?php echo $treatments['obturator_right']; ?></td><?php } else { } ?>
					    <?php if($treatments['sural_left'] != false ) { ?><td style="vertical-align: middle"><?php echo $treatments['sural_left']; ?></td><?php } else { } ?>
					 <?php if($treatments['sural_right'] != false ) { ?> <td style="vertical-align: middle"><?php echo $treatments['sural_right']; ?></td><?php } else { } ?>
					</tr>
					
                  </tbody>
                </table>
				<?php } } }  ?>
				
				<?php
					if($adlscore != false) { ?>
					 <h5>ADL score.functional Assessment Info :</h5>
					 <?php	foreach($adlscore as $examns){ 
					?>
				<table class="table table-bordered table-invoice-full">
				  <thead>
                    <tr>
					 <?php if($examns['neuro_date'] != false ) { ?>
						<th>Date</th>
					 <?php } else { } ?>
						<?php if($examns['name'] != false ) { ?>
                       <th>Name</th>
					    <?php } else { } ?>
					   <?php if($examns['description'] != false ) { ?>
					  <th>Description</th>
					   <?php } else { } ?>
					  
					 </tr>
                  </thead>
                  <tbody>
				 
                    <?php
					
					$data=explode(" ",$examns['neuro_date']);
					?>
					<tr class="odd gradeX">
					 <?php if($examns['neuro_date'] != false ) { ?><td style="vertical-align: middle"><?php echo $data[0] ?></td> <?php } else { } ?>
					 <?php if($examns['name'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['name']; ?></td> <?php } else { } ?>
					    <?php if($examns['description'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['description']; ?></td> <?php } else { } ?>
					 </tr>
					
                  </tbody>
                </table>
				<?php } ?>
					<?php  } ?>
				
				
				<?php
					if($gait != false) { ?>
					<h5>Dynamic gait index :</h5>
					<?php	foreach($gait as $examns){ 
					?>
				<table class="table table-bordered table-invoice-full">
					
                  <thead>
                    <tr>
					 <?php if($examns['nuero_date'] != false ) { ?>
						<th>Date</th> 
						 <?php } else { } ?>
						 <?php if($examns['surface'] != false ) { ?>
                       <th>Gait level surface</th>
					    <?php } else { } ?>
					    <?php if($examns['speed'] != false ) { ?>
					  <th>Change in gait speed</th>
					   <?php } else { } ?>
					   <?php if($examns['horizontal'] != false ) { ?>
					  <th>Gait with horizontal head turns</th>
					   <?php } else { } ?>
					   <?php if($examns['vertical'] != false ) { ?>
					  <th>Gait with vertical head turns </th>
					   <?php } else { } ?>
					   <?php if($examns['pivot'] != false ) { ?>
					  <th>Gait and pivot turn</th>
					   <?php } else { } ?>
					   <?php if($examns['obstacle'] != false ) { ?>
					  <th>Step over obstacle</th>
					   <?php } else { } ?>
					   <?php if($examns['obstacles'] != false ) { ?>
					  <th>Step around obstacles</th>
					   <?php } else { } ?>
					   <?php if($examns['steps'] != false ) { ?>
					 <th>Steps</th>
					  <?php } else { } ?>
					 </tr>
                  </thead>
                  <tbody>
                   
					<tr class="odd gradeX">
					<?php if($examns['nuero_date'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['nuero_date']; ?></td><?php } else { } ?>
					<?php if($examns['surface'] != false ) { ?> <td style="vertical-align: middle"><?php echo $examns['surface']; ?></td><?php } else { } ?>
					  <?php if($examns['speed'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['speed']; ?></td><?php } else { } ?>
					 <?php if($examns['horizontal'] != false ) { ?> <td style="vertical-align: middle"><?php echo $examns['horizontal']; ?></td><?php } else { } ?>
					  <?php if($examns['vertical'] != false ) { ?> <td style="vertical-align: middle"><?php echo $examns['vertical']; ?></td><?php } else { } ?>
					  <?php if($examns['pivot'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['pivot']; ?></td><?php } else { } ?>
					   <?php if($examns['obstacle'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['obstacle']; ?></td><?php } else { } ?>
					   <?php if($examns['obstacles'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['obstacles']; ?></td><?php } else { } ?>
					 <?php if($examns['steps'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['steps']; ?></td><?php } else { } ?>
					 </tr>
					 
					<?php }  ?>
                  </tbody>
                </table>
				<?php } ?>
				
				<?php
					if($gait != false) { ?>
					<h5>Balance Movement Analyser :</h5>
					<?php
					foreach($gait as $examns){ 
					?>
				<table class="table table-bordered table-invoice-full">
					
					<thead>
                    <tr>
					 <?php if($examns['nuero_date'] != false ) { ?>
					<th>Date</th>
					 <?php } else { } ?>
					 <?php if($examns['balance'] != false ) { ?>
					<th>Comments</th>
					 <?php } else { } ?>
					</thead>
					<tbody>
                   
					<tr class="odd gradeX">
					  <?php if($examns['nuero_date'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['nuero_date']; ?></td><?php } else { } ?>
					  <?php if($examns['balance'] != false ) { ?> <td style="vertical-align: middle"><?php echo $examns['balance']; ?></td><?php } else { } ?>
					</tr>
						<?php }  ?>
                  </tbody>
                </table>
				<?php } ?>
				
				
				<?php
					if($function != false) { ?>
					<h5>Modified barthel Index - Info :</h5>
					<?php foreach($function as $examns){ 
				?>
				<table class="table table-bordered table-invoice-full">
					
					
                  <thead>
                    <tr>
					<?php if($examns['nuero_date'] != false ) { ?>
						<th>Date</th>
						 <?php } else { } ?>
						<?php if($examns['bowels'] != false ) { ?>
						
                       <th>bowels (preceding week) :</th>
					    <?php } else { } ?>
					   <?php if($examns['bladder'] != false ) { ?>
					  <th>bladder (preceding week) :</th>
					   <?php } else { } ?>
					  <?php if($examns['grooming'] != false ) { ?>
					  <th>grooming (preceding 24 - 48 hours) :</th>
					   <?php } else { } ?>
					  <?php if($examns['toilet'] != false ) { ?>
					  <th>toilet use : </th>
					   <?php } else { } ?>
					  <?php if($examns['feeding'] != false ) { ?>
					  <th>feeding </th>
					   <?php } else { } ?>
					  <?php if($examns['transfer'] != false ) { ?>
					  <th>transfer (from bed to chair and back) :</th>
					   <?php } else { } ?>
					  <?php if($examns['mobility'] != false ) { ?>
					  <th>mobility :</th>
					   <?php } else { } ?>
					  <?php if($examns['dressing'] != false ) { ?>
					 <th>dressing :</th>
					  <?php } else { } ?>
					 <?php if($examns['stairs'] != false ) { ?>
					  <th>stairs :</th>
					   <?php } else { } ?>
					  <?php if($examns['bathing'] != false ) { ?>
					   <th>bathing :</th>
					    <?php } else { } ?>
					  
					 </tr>
                  </thead> 
                  <tbody>
                   
					<tr class="odd gradeX">
					<?php if($examns['nuero_date'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['nuero_date']; ?></td> <?php } else { } ?>
					  <?php if($examns['bowels'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['bowels']; ?></td> <?php } else { } ?>
					  <?php if($examns['bladder'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['bladder']; ?></td> <?php } else { } ?>
					 <?php if($examns['grooming'] != false ) { ?> <td style="vertical-align: middle"><?php echo $examns['grooming']; ?></td> <?php } else { } ?>
					   <?php if($examns['toilet'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['toilet']; ?></td> <?php } else { } ?>
					    <?php if($examns['feeding'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['feeding']; ?></td> <?php } else { } ?>
					  <?php if($examns['transfer'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['transfer']; ?></td> <?php } else { } ?>
					 <?php if($examns['mobility'] != false ) { ?> <td style="vertical-align: middle"><?php echo $examns['mobility']; ?></td> <?php } else { } ?>
					  <?php if($examns['dressing'] != false ) { ?> <td style="vertical-align: middle"><?php echo $examns['dressing']; ?></td> <?php } else { } ?>
					  <?php if($examns['stairs'] != false ) { ?> <td style="vertical-align: middle"><?php echo $examns['stairs']; ?></td> <?php } else { } ?>
					  <?php if($examns['bathing'] != false ) { ?> <td style="vertical-align: middle"><?php echo $examns['bathing']; ?></td> <?php } else { } ?>
					 </tr>
					 
					<?php }  ?>
                  </tbody>
                </table>
				<?php } ?>
				
				
				<?php
					if($special != false) { ?>
					<h5>Special tests Info :</h5>
				<?php	foreach($special as $examns){ 
				?>
				<table class="table table-bordered table-invoice-full">
					
					
                  <thead>
                    <tr>
					<?php if($examns['neuro_date'] != false ) { ?>
					<th>Date</th>
					 <?php } else { } ?>
					<?php if($examns['scartype'] != false ) { ?>
                       <th>Special Tests</th>
					    <?php } else { } ?>
					   <?php if($examns['adhereto'] != false ) { ?>
					  <th>Description</th>
					   <?php } else { } ?>
					  			  
					 </tr>
                  </thead>
                  <tbody>
                    <?php
					$data = explode(" ", $examns['neuro_date']);
					?>
					<tr class="odd gradeX">
						<?php if($examns['neuro_date'] != false ) { ?><td style="vertical-align: middle"><?php echo $data[0]; ?></td> <?php } else { } ?>
					 <?php if($examns['scartype'] != false ) { ?> <td style="vertical-align: middle"><?php echo $examns['scartype']; ?></td> <?php } else { } ?>
					   <?php if($examns['adhereto'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['adhereto']; ?></td> <?php } else { } ?>
					 </tr>
					 
					<?php }  ?>
                  </tbody>
                </table>
				<?php } ?>
				
				<?php
					if($neural != false) { ?>
				
					<h5>Neural Tissue Palpation :</h5>
					<?php 
					foreach($neural as $examns){ 
				?>
				<?php if($examns['ulnar_left'] != false ||  $examns['ulnar_right'] != false  || $examns['radial_left'] != false || $examns['radial_right'] != false  || $examns['median_left'] != false || $examns['median_right'] != false || $examns['sciatic_left'] != false || $examns['sciatic_right'] != false || $examns['tibial_left'] != false ) { ?>
				<table class="table table-bordered table-invoice-full">
					
					
                  <thead>
                    <tr>
					
					    <th>Date</th>
						
						<?php if($examns['ulnar_left'] != false ) { ?>
                       <th>Ulnar Left</th>
					    <?php } else { } ?>
					   <?php if($examns['ulnar_right'] != false ) { ?>
					   <th>Ulnar Right</th>
					    <?php } else { } ?>
					   <?php if($examns['radial_left'] != false ) { ?>
					  <th>Radial Left</th>
					   <?php } else { } ?>
					  <?php if($examns['radial_right'] != false ) { ?>
					  <th>Radial Right</th>
					   <?php } else { } ?>
					  <?php if($examns['median_left'] != false ) { ?>
					  <th>Median Left</th>
					   <?php } else { } ?>
					  <?php if($examns['median_right'] != false ) { ?>
					  <th>Median Right</th>
					   <?php } else { } ?>
					  <?php if($examns['sciatic_left'] != false ) { ?>
					  <th>Sciatic Left</th>
					   <?php } else { } ?>
					  <?php if($examns['sciatic_right'] != false ) { ?>
					  <th>Sciatic Right</th>
					   <?php } else { } ?>
					  <?php if($examns['tibial_left'] != false ) { ?>
					  <th>Tibial Left</th>
					   <?php } else { } ?>
					  
					  			  
					 </tr>
                  </thead>
                  <tbody>
                  
					<tr class="odd gradeX">
					 <?php if($examns['neuro_date'] != false ) { ?><td style="vertical-align: middle"><?php echo $data[0]; ?></td></td> <?php } else { } ?>
					  <?php if($examns['ulnar_left'] != false ) { ?> <td style="vertical-align: middle"><?php echo $examns['ulnar_left']; ?></td> <?php } else { } ?>
					  <?php if($examns['ulnar_right'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['ulnar_right']; ?></td> <?php } else { } ?>
					   <?php if($examns['radial_left'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['radial_left']; ?></td> <?php } else { } ?>
					  <?php if($examns['radial_right'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['radial_right']; ?></td> <?php } else { } ?>
					   <?php if($examns['median_left'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['median_left']; ?></td> <?php } else { } ?>
					  <?php if($examns['median_right'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['median_right']; ?></td> <?php } else { } ?>
					  <?php if($examns['sciatic_left'] != false ) { ?> <td style="vertical-align: middle"><?php echo $examns['sciatic_left']; ?></td> <?php } else { } ?>
					  <?php if($examns['sciatic_right'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['sciatic_right']; ?></td> <?php } else { } ?>
					   <?php if($examns['tibial_left'] != false ) { ?> <td style="vertical-align: middle"><?php echo $examns['tibial_left']; ?></td> <?php } else { } ?>
					  
					 </tr>
					 
					
                  </tbody>
                </table>
				<?php } } } ?>
				<?php
					if($neural != false) {
					foreach($neural as $examns){ 
				?>
				<?php if($examns['tibial_right'] != false || $examns['peronial_left'] != false || $examns['peronial_right'] != false || $examns['femoral_left'] != false || $examns['sural_left'] != false || $examns['sural_right'] != false || $examns['saphenous_left'] != false || $examns['saphenous_right'] != false) { ?>
			<table class="table table-bordered table-invoice-full">
				<thead>
                    <tr>
					 <?php if($examns['tibial_right'] != false ) { ?>
                       <th>Tibial Right</th>
					    <?php } else { } ?>
					    <?php if($examns['peronial_left'] != false ) { ?>
					  <th>Peronial Left</th>
					   <?php } else { } ?>
					   <?php if($examns['peronial_right'] != false ) { ?>
					  <th>Peronial Right</th>
					   <?php } else { } ?>
					   <?php if($examns['femoral_left'] != false ) { ?>
					  <th>Femoral Left</th>
					   <?php } else { } ?>
					   <?php if($examns['femoral_right'] != false ) { ?>
					  <th>Femoral Right</th>
					   <?php } else { } ?>
					   <?php if($examns['sural_left'] != false ) { ?>
					  <th>Sural Left</th>
					   <?php } else { } ?>
					   <?php if($examns['sural_right'] != false ) { ?>
					  <th>Sural Right</th>
					   <?php } else { } ?>
					   <?php if($examns['saphenous_left'] != false ) { ?>
					  <th>Saphenous Left</th>
					   <?php } else { } ?>
					   <?php if($examns['saphenous_right'] != false ) { ?>
					  <th>Saphenous Right</th>
					  <?php } else { } ?>
				</tr>
                  </thead>
                  <tbody>
                   
					<tr class="odd gradeX">
					   <?php if($examns['tibial_right'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['tibial_right']; ?></td> <?php } else { } ?>
					   <?php if($examns['peronial_left'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['peronial_left']; ?></td> <?php } else { } ?>
					  <?php if($examns['peronial_right'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['peronial_right']; ?></td> <?php } else { } ?>
					    <?php if($examns['femoral_left'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['femoral_left']; ?></td> <?php } else { } ?>
					    <?php if($examns['femoral_right'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['femoral_right']; ?></td> <?php } else { } ?>
					 <?php if($examns['sural_left'] != false ) { ?>  <td style="vertical-align: middle"><?php echo $examns['sural_left']; ?></td> <?php } else { } ?>
					<?php if($examns['sural_right'] != false ) { ?> <td style="vertical-align: middle"><?php echo $examns['sural_right']; ?></td> <?php } else { } ?>
					  <?php if($examns['saphenous_left'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['saphenous_left']; ?></td> <?php } else { } ?>
					<?php if($examns['saphenous_right'] != false ) { ?> <td style="vertical-align: middle"><?php echo $examns['saphenous_right']; ?></td> <?php } else { } ?>
					  
					 </tr>
					 
					<?php }  ?>
                  </tbody>
                </table>
				<?php } } ?>
				
				<?php
					if($verbal != false) { ?>
					<h5><strong>Co-ordination Tests</strong></h5>
					<?php
					foreach($verbal as $examns){ 
					?>
					<?php if($examns['h1'] != false || $examns['h2'] != false || $examns['h3'] != false ) { ?>
					<h5>Finger to Nose :</h5>
					<?php } }
					foreach($verbal as $examns){ 
				?>
				<?php if($examns['h1'] != false || $examns['h2'] != false || $examns['h3'] != false ) { ?>
				<table class="table table-bordered table-invoice-full">
					<thead>
                    <tr>
					
						 <th>Date</th>
					
						 <?php if($examns['h1'] != false ) { ?>
                       <th>Time Taken to Complete the Activity :</th>
					   <?php } else { } ?>
					   <?php if($examns['h2'] != false ) { ?>
					   <th>Speed at which the Activity is Performed	 :</th>
					   <?php } else { } ?>
					   <?php if($examns['h3'] != false ) { ?>
					  <th>No. of Error Made :</th>
					  <?php } else { } ?>
					  			  			  
					 </tr>
                  </thead>
                  <tbody>
                    
					<tr class="odd gradeX">
						<?php if($examns['h1'] != false || $examns['h2'] != false || $examns['h3'] != false ) { ?> <td style="vertical-align: middle"><?php echo $examns['nuero_date']; ?></td><?php } else { } ?>
					    <?php if($examns['h1'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['h1']; ?></td><?php } else { } ?>
					   <?php if($examns['h2'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['h2']; ?></td><?php } else { } ?>
					  <?php if($examns['h3'] != false ) { ?> <td style="vertical-align: middle"><?php echo $examns['h3']; ?></td><?php } else { } ?>
					 </tr>
					 
					<?php }  ?>
                  </tbody>
                </table>
				<?php } } ?>
				<?php
					if($verbal != false) { ?>
										<?php
					foreach($verbal as $examns){ 
					?>
					  <?php if($examns['a1'] != false || $examns['a2'] != false || $examns['a3'] != false ) { ?>
					<h5>Aternating supination-pronation movement :</h5>
					<?php } } ?>
					<?php
					foreach($verbal as $examns){ 
				?>
				 <?php if($examns['a1'] != false || $examns['a2'] != false || $examns['a3'] != false ) { ?>
				<table class="table table-bordered table-invoice-full">
					
					
                  <thead>
                    <tr>
					 
					    <th>Date</th>
						 
					  <?php if($examns['a1'] != false ) { ?>
                       <th>Time Taken to Complete the Activity :</th>
					    <?php } else { } ?>
					     <?php if($examns['a2'] != false ) { ?>
					   <th>Speed at which the Activity is Performed	 :</th>
					    <?php } else { } ?>
					     <?php if($examns['a3'] != false ) { ?>
					  <th>No. of Error Made :</th>
					  <?php } else { } ?>
					  			  			  
					 </tr>
                  </thead>
                  <tbody>
                   
					<tr class="odd gradeX">
						  <?php if($examns['a1'] != false || $examns['a2'] != false || $examns['a3'] != false ) { ?> <td style="vertical-align: middle"><?php echo $examns['nuero_date']; ?></td> <?php } else { } ?>
					  	  <?php if($examns['a1'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['a1']; ?></td> <?php } else { } ?>
					  	 <?php if($examns['a2'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['a2']; ?></td> <?php } else { } ?>
					  	 <?php if($examns['a3'] != false ) { ?><td style="vertical-align: middle"><?php echo $examns['a3']; ?></td> <?php } else { } ?>
					  			  			  
					 </tr>
					 
					<?php }  ?>
                  </tbody>
                </table>
				<?php } } ?>
				<?php
					if($verbal != false) { ?>
					<?php
					foreach($verbal as $examns){
				?>
				<?php if($examns['f1'] != false || $examns['f2'] != false || $examns['f3'] != false  ) { ?> 
					<h5>Heel to Shin :</h5>
					<?php } } 
					foreach($verbal as $examns){
				?>
				<?php if($examns['f1'] != false || $examns['f2'] != false || $examns['f3'] != false  ) { ?> 
				<table class="table table-bordered table-invoice-full">
					
					
                  <thead>
                    <tr>
					
						 <th>Date</th>
						
						 <?php if($examns['f1'] != false ) { ?> 
                       <th>Time Taken to Complete the Activity :</th>
					   <?php } else { } ?>
					   <?php if($examns['f2'] != false ) { ?> 
					   <th>Speed at which the Activity is Performed	 :</th>
					   <?php } else { } ?>
					   <?php if($examns['f3'] != false ) { ?> 
					  <th>No. of Error Made :</th>
					  <?php } else { } ?>
					  			  			  
					 </tr>
                  </thead>
                  <tbody>
                   
					<tr class="odd gradeX">
					<?php if($examns['f1'] != false || $examns['f2'] != false || $examns['f3'] != false  ) { ?>  <td style="vertical-align: middle"><?php echo $examns['nuero_date']; ?></td> <?php } else { } ?>
					   <?php if($examns['f1'] != false ) { ?> <td style="vertical-align: middle"><?php echo $examns['f1']; ?></td> <?php } else { } ?>
					  <?php if($examns['f2'] != false ) { ?>  <td style="vertical-align: middle"><?php echo $examns['f2']; ?></td> <?php } else { } ?>
					  <?php if($examns['f3'] != false ) { ?>  <td style="vertical-align: middle"><?php echo $examns['f3']; ?></td> <?php } else { } ?>
					 </tr>
					 
					
                  </tbody>
                </table>
				<?php } } } ?>
				</div>
			
		  </td></tr><?php } ?> <?php if($report['sensory_exam']==1 ) { ?>
		  <tr><td colspan="3">
		 
            <?php
			if($sexamn != false) {
			?>
            <div class="row-fluid">
            	<h5>Sensory Examination :</h5>
                <table class="table table-bordered table-invoice-full">
                  <thead>
                    <tr>
                      <th>Date</th>
					  <th>Nerve root</th>
					  <th>Dermatome</th>
					  <th>Myotome</th>
					  <th>Reflexes</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
					foreach($sexamn as $sexamns){
					?>
						<?php if($sexamns['c2_occipital_protuberance'] != '0' || $sexamns['c2_neck_flexion_extension'] != '0') { ?>
						<tr class="odd gradeX">
						  <td style="vertical-align: middle"><?php echo date('d/m/Y', strtotime($sexamns['sexamn_date'])); ?></td>
						  <td style="vertical-align: middle">C2</td>
							<td style="vertical-align: middle"><?php if($sexamns['c2_occipital_protuberance'] != '0') { ?>Occipital protuberance : <strong><?php echo $sexamns['c2_occipital_protuberance']; } ?></strong></td>
						  	<td style="vertical-align: middle"><?php if($sexamns['c2_neck_flexion_extension'] != '0') { ?>Neck muscles : <strong><?php echo $sexamns['c2_neck_flexion_extension']; }?></strong></td>
						    <td style="vertical-align: middle"></td>
						</tr>
					<?php } if($sexamns['c3_supraclavicular_fossa'] != '0' || $sexamns['c3_neck_lateral_flexionlar_joint'] != '0') { ?>
						<tr class="odd gradeX">
						  <td style="vertical-align: middle"><?php echo date('d/m/Y', strtotime($sexamns['sexamn_date'])); ?></td>
						  <td style="vertical-align: middle">C3</td>
							<td style="vertical-align: middle"><?php if($sexamns['c3_supraclavicular_fossa'] != '0') { ?>Supraclavicular fossa : <strong><?php echo $sexamns['c3_supraclavicular_fossa']; } ?></strong></td>
						  	<td style="vertical-align: middle"><?php if($sexamns['c3_neck_lateral_flexionlar_joint'] != '0') { ?>Neck lateral flexionlar joint : <strong><?php echo $sexamns['c3_neck_lateral_flexionlar_joint']; }?></strong></td>
						    <td style="vertical-align: middle"></td>
						</tr>
					<?php } if($sexamns['c4_acromioclavicular_joint'] != '0' || $sexamns['c4_shoulder_elevation'] != '0') { ?>
						<tr class="odd gradeX">
						  <td style="vertical-align: middle"><?php echo date('d/m/Y', strtotime($sexamns['sexamn_date'])); ?></td>
						  <td style="vertical-align: middle">C4</td>
							<td style="vertical-align: middle"><?php if($sexamns['c4_acromioclavicular_joint'] != '0') { ?>Acromioclavicular joint : <strong><?php echo $sexamns['c4_acromioclavicular_joint']; } ?></strong></td>
						  	<td style="vertical-align: middle"><?php if($sexamns['c4_shoulder_elevation'] != '0') { ?>Shoulder elevation : <strong><?php echo $sexamns['c4_shoulder_elevation']; }?></strong></td>
						    <td style="vertical-align: middle"></td>
						</tr>
					<?php } if($sexamns['c5_antecubital_fossa']!='0' || $sexamns['c5_shoulder_abduction']!='0' || $sexamns['c5_biceps_brachioradialis']!='0'){?>
						<tr class="odd gradeX">
						  <td style="vertical-align: middle"><?php echo date('d/m/Y', strtotime($sexamns['sexamn_date'])); ?></td>
						  <td style="vertical-align: middle">C5</td>
						  <td style="vertical-align: middle"><?php if($sexamns['c5_antecubital_fossa'] != '0') { ?>Antecubital Fossa : <strong><?php echo $sexamns['c5_antecubital_fossa']; } ?></strong></td>
						  <td style="vertical-align: middle"><?php if($sexamns['c5_shoulder_abduction'] != '0') { ?>Shoulder Abduction : <strong><?php echo $sexamns['c5_shoulder_abduction']; } ?></strong></td>
						  <td style="vertical-align: middle"><?php if($sexamns['c5_biceps_brachioradialis'] != '0') { ?>Biceps, Brachioradialis : <strong><?php echo $sexamns['c5_biceps_brachioradialis']; } ?></strong></td>
						</tr>
					<?php } if($sexamns['c6_thumb']!='0' || $sexamns['c6_biceps_wristextensors']!='0' || $sexamns['c6_biceps_brachioradialis']!='0'){?>
						<tr class="odd gradeX">
						  <td style="vertical-align: middle"><?php echo date('d/m/Y', strtotime($sexamns['sexamn_date'])); ?></td>
						  <td style="vertical-align: middle">C6</td>
						  <td style="vertical-align: middle"><?php if($sexamns['c6_thumb'] != '0') { ?>Thumb : <strong><?php echo $sexamns['c6_thumb']; } ?></strong></td>
						  <td style="vertical-align: middle"><?php if($sexamns['c6_biceps_wristextensors'] != '0') { ?>Biceps, Supinator, Wrist extensors : <strong><?php echo $sexamns['c6_biceps_wristextensors']; } ?></strong></td>
						  <td style="vertical-align: middle"><?php if($sexamns['c6_biceps_brachioradialis'] != '0') { ?>Biceps, Brachioradialis : <strong><?php echo $sexamns['c6_biceps_brachioradialis']; } ?></strong></td>
						</tr>
					<?php } if($sexamns['c7_middle_finger']!='0' || $sexamns['c7_wristflexors_triceps']!='0' || $sexamns['c7_triceps']!='0'){?>
						<tr class="odd gradeX">
						  <td style="vertical-align: middle"><?php echo date('d/m/Y', strtotime($sexamns['sexamn_date'])); ?></td>
						  <td style="vertical-align: middle">C7</td>
						  <td style="vertical-align: middle"><?php if($sexamns['c7_middle_finger'] != '0') { ?>Middle finger : <strong><?php echo $sexamns['c7_middle_finger']; } ?></strong></td>
						  <td style="vertical-align: middle"><?php if($sexamns['c7_wristflexors_triceps'] != '0') { ?>Wrist flexors, Triceps : <strong><?php echo $sexamns['c7_wristflexors_triceps']; } ?></strong></td>
						  <td style="vertical-align: middle"><?php if($sexamns['c7_triceps'] != '0') { ?>Triceps : <strong><?php echo $sexamns['c7_triceps']; } ?></strong></td>
						</tr>
					<?php } if($sexamns['c8_little_finger']!='0' || $sexamns['c8_thumb_extensor_adductors']!='0' || $sexamns['c8_triceps']!='0'){?>
						<tr class="odd gradeX">
						  <td style="vertical-align: middle"><?php echo date('d/m/Y', strtotime($sexamns['sexamn_date'])); ?></td>
						  <td style="vertical-align: middle">C8</td>
						  <td style="vertical-align: middle"><?php if($sexamns['c8_little_finger'] != '0') { ?>Little Finger : <strong><?php echo $sexamns['c8_little_finger']; } ?></strong></td>
						  <td style="vertical-align: middle"><?php if($sexamns['c8_thumb_extensor_adductors'] != '0') { ?>Thumb extensors & adductors, ulnar deviators : <strong><?php echo $sexamns['c8_thumb_extensor_adductors']; } ?></strong></td>
						  <td style="vertical-align: middle"><?php if($sexamns['c8_triceps'] != '0') { ?>Triceps : <strong><?php echo $sexamns['c8_triceps']; } ?></strong></td>
						</tr>
					<?php } if($sexamns['t1_medialside_antecubital']!='0'){?>
						<tr class="odd gradeX">
						  <td style="vertical-align: middle"><?php echo date('d/m/Y', strtotime($sexamns['sexamn_date'])); ?></td>
						  <td style="vertical-align: middle">T1</td>
						  <td style="vertical-align: middle"><?php if($sexamns['t1_medialside_antecubital'] != '0') { ?>Medial side antecubital fossa : <strong><?php echo $sexamns['t1_medialside_antecubital']; } ?></strong></td>
						  <td style="vertical-align: middle"></td>
						  <td style="vertical-align: middle"></td>
						</tr>
					<?php } if($sexamns['t2_apexof_axilla']!='0'){?>
						<tr class="odd gradeX">
						  <td style="vertical-align: middle"><?php echo date('d/m/Y', strtotime($sexamns['sexamn_date'])); ?></td>
						  <td style="vertical-align: middle">T2</td>
						  <td style="vertical-align: middle"><?php if($sexamns['t2_apexof_axilla'] != '0') { ?>Apex of axilla : <strong><?php echo $sexamns['t2_apexof_axilla']; } ?></strong></td>
						  <td style="vertical-align: middle"></td>
						  <td style="vertical-align: middle"></td>
						</tr>
					<?php } if($sexamns['t4_nipples']!='0'){?>
						<tr class="odd gradeX">
						  <td style="vertical-align: middle"><?php echo date('d/m/Y', strtotime($sexamns['sexamn_date'])); ?></td>
						  <td style="vertical-align: middle">T4</td>
						  <td style="vertical-align: middle"><?php if($sexamns['t4_nipples'] != '0') { ?>Nipples : <strong><?php echo $sexamns['t4_nipples']; } ?></strong></td>
						  <td style="vertical-align: middle"></td>
						  <td style="vertical-align: middle"></td>
						</tr>
					<?php } if($sexamns['t6_xiphisternum']!='0'){?>
						<tr class="odd gradeX">
						  <td style="vertical-align: middle"><?php echo date('d/m/Y', strtotime($sexamns['sexamn_date'])); ?></td>
						  <td style="vertical-align: middle">T6</td>
						  <td style="vertical-align: middle"><?php if($sexamns['t6_xiphisternum'] != '0') { ?>Xiphisternum : <strong><?php echo $sexamns['t6_xiphisternum']; } ?></strong></td>
						  <td style="vertical-align: middle"></td>
						  <td style="vertical-align: middle"></td>
						</tr>
					<?php } if($sexamns['t10_umbilicus']!='0'){?>
						<tr class="odd gradeX">
						  <td style="vertical-align: middle"><?php echo date('d/m/Y', strtotime($sexamns['sexamn_date'])); ?></td>
						  <td style="vertical-align: middle">T6</td>
						  <td style="vertical-align: middle"><?php if($sexamns['t10_umbilicus'] != '0') { ?>Umbilicus : <strong><?php echo $sexamns['t10_umbilicus']; } ?></strong></td>
						  <td style="vertical-align: middle"></td>
						  <td style="vertical-align: middle"></td>
						</tr>
					<?php } if($sexamns['t12_midpoint_ofthe_inguinal_ligament']!='0'){?>
						<tr class="odd gradeX">
						  <td style="vertical-align: middle"><?php echo date('d/m/Y', strtotime($sexamns['sexamn_date'])); ?></td>
						  <td style="vertical-align: middle">T12</td>
						  <td style="vertical-align: middle"><?php if($sexamns['t12_midpoint_ofthe_inguinal_ligament'] != '0') { ?>Midpoint of the inguinal ligament : <strong><?php echo $sexamns['t12_midpoint_ofthe_inguinal_ligament']; } ?></strong></td>
						  <td style="vertical-align: middle"></td>
						  <td style="vertical-align: middle"></td>
						</tr>
					<?php } if($sexamns['l2_midanterior_thigh']!='0' || $sexamns['l2_hip_flexion']!='0'){?>
						<tr class="odd gradeX">
						  <td style="vertical-align: middle"><?php echo date('d/m/Y', strtotime($sexamns['sexamn_date'])); ?></td>
						  <td style="vertical-align: middle">L2</td>
						  <td style="vertical-align: middle"><?php if($sexamns['l2_midanterior_thigh'] != '0') { ?>Mid-anterior thigh : <strong><?php echo $sexamns['l2_midanterior_thigh']; } ?></strong></td>
						  <td style="vertical-align: middle"><?php if($sexamns['l2_hip_flexion'] != '0') { ?>Hip flexion : <strong><?php echo $sexamns['l2_hip_flexion']; } ?></strong></td>
						  <td style="vertical-align: middle"></td>
						</tr>
					<?php } if($sexamns['l3_medial_epicondyle_ofthe_femur']!='0' || $sexamns['l3_knee_extension']!='0' || $sexamns['l3_pain_with_slr']!='0'){?>
						<tr class="odd gradeX">
						  <td style="vertical-align: middle"><?php echo date('d/m/Y', strtotime($sexamns['sexamn_date'])); ?></td>
						  <td style="vertical-align: middle">L3</td>
						  <td style="vertical-align: middle"><?php if($sexamns['l3_medial_epicondyle_ofthe_femur'] != '0') { ?>Medial epicondyle of the femur : <strong><?php echo $sexamns['l3_medial_epicondyle_ofthe_femur']; } ?></strong></td>
						  <td style="vertical-align: middle"><?php if($sexamns['l3_knee_extension'] != '0') { ?>Knee extension : <strong><?php echo $sexamns['l3_knee_extension']; } ?></strong></td>
						  <td style="vertical-align: middle"><?php if($sexamns['l3_pain_with_slr'] != '0') { ?>Pain with SLR : <strong><?php echo $sexamns['l3_pain_with_slr']; } ?></strong></td>
						</tr>
					<?php } if($sexamns['l4_medial_malleolus']!='0' || $sexamns['l4_ankle_dorsi_flexion']!='0'){?>
						<tr class="odd gradeX">
						  <td style="vertical-align: middle"><?php echo date('d/m/Y', strtotime($sexamns['sexamn_date'])); ?></td>
						  <td style="vertical-align: middle">L4</td>
						  <td style="vertical-align: middle"><?php if($sexamns['l4_medial_malleolus'] != '0') { ?>Medial malleolus : <strong><?php echo $sexamns['l4_medial_malleolus']; } ?></strong></td>
						  <td style="vertical-align: middle"><?php if($sexamns['l4_ankle_dorsi_flexion'] != '0') { ?>Ankle dorsi flexion : <strong><?php echo $sexamns['l4_ankle_dorsi_flexion']; } ?></strong></td>
						  <td style="vertical-align: middle"></td>
						</tr>
					<?php } if($sexamns['l5_dorsumof_root']!='0' || $sexamns['l5_great_toe_extension']!='0'){?>
						<tr class="odd gradeX">
						  <td style="vertical-align: middle"><?php echo date('d/m/Y', strtotime($sexamns['sexamn_date'])); ?></td>
						  <td style="vertical-align: middle">L5</td>
						  <td style="vertical-align: middle"><?php if($sexamns['l5_dorsumof_root'] != '0') { ?>Dorsum of foot @ 3rd MTP : <strong><?php echo $sexamns['l5_dorsumof_root']; } ?></strong></td>
						  <td style="vertical-align: middle"><?php if($sexamns['l5_great_toe_extension'] != '0') { ?>Extensor Hallucis, peroneals, Glut. med, DF's, hamstring & calf : <strong><?php echo $sexamns['l5_great_toe_extension']; } ?></strong></td>
						  <td style="vertical-align: middle"></td>
						</tr>
					<?php } if($sexamns['s1_lateral_heel']!='0' || $sexamns['s1_ankle_plantar_flexion']!='0' || $sexamns['s1_limitedslr_achillesreflex']!='0'){?>
						<tr class="odd gradeX">
						  <td style="vertical-align: middle"><?php echo date('d/m/Y', strtotime($sexamns['sexamn_date'])); ?></td>
						  <td style="vertical-align: middle">S1</td>
						  <td style="vertical-align: middle"><?php if($sexamns['s1_lateral_heel'] != '0') { ?>Lateral heel : <strong><?php echo $sexamns['s1_lateral_heel']; } ?></strong></td>
						  <td style="vertical-align: middle"><?php if($sexamns['s1_ankle_plantar_flexion'] != '0') { ?>Ankle plantar flexion : <strong><?php echo $sexamns['s1_ankle_plantar_flexion']; } ?></strong></td>
						  <td style="vertical-align: middle"><?php if($sexamns['s1_limitedslr_achillesreflex'] != '0') { ?>Limited SLR, Achilles reflex : <strong><?php echo $sexamns['s1_limitedslr_achillesreflex']; } ?></strong></td>
						</tr>
					<?php } if($sexamns['s2_popliteal_fossa']!='0' || $sexamns['s2_knee_flexion']!='0' || $sexamns['s2_limitedslr_achillesreflex']!='0'){?>
						<tr class="odd gradeX">
						  <td style="vertical-align: middle"><?php echo date('d/m/Y', strtotime($sexamns['sexamn_date'])); ?></td>
						  <td style="vertical-align: middle">S2</td>
						  <td style="vertical-align: middle"><?php if($sexamns['s2_popliteal_fossa'] != '0') { ?>Popliteal fossa : <strong><?php echo $sexamns['s2_popliteal_fossa']; } ?></strong></td>
						  <td style="vertical-align: middle"><?php if($sexamns['s2_knee_flexion'] != '0') { ?>Knee flexion : <strong><?php echo $sexamns['s2_knee_flexion']; } ?></strong></td>
						  <td style="vertical-align: middle"><?php if($sexamns['s2_limitedslr_achillesreflex'] != '0') { ?>Limited SLR, Achilles reflex : <strong><?php echo $sexamns['s2_limitedslr_achillesreflex']; } ?></strong></td>
						</tr>
					<?php } if($sexamns['s5_perianal']!='0' || $sexamns['s5_bladder_rectum']!='0'){?>
						<tr class="odd gradeX">
						  <td style="vertical-align: middle"><?php echo date('d/m/Y', strtotime($sexamns['sexamn_date'])); ?></td>
						  <td style="vertical-align: middle">S5</td>
						  <td style="vertical-align: middle"><?php if($sexamns['s5_perianal'] != '0') { ?>Perianal : <strong><?php echo $sexamns['s5_perianal']; } ?></strong></td>
						  <td style="vertical-align: middle"><?php if($sexamns['s5_bladder_rectum'] != '0') { ?>bladder, rectum : <strong><?php echo $sexamns['s5_bladder_rectum']; } ?></strong></td>
							<td></td>
						</tr>
					<?php } ?>
					<?php } ?>
                  </tbody>
                </table>
            </div>
            <?php
			}
			?>
		  </td></tr><?php } ?> <?php if($report['investigation']==1 ) { ?>
		  <tr><td colspan="3">
		 
              <?php
			if($investigation != false) { ?>
			<h5>Investigation:</h5>
			<?php
			foreach($investigation as $invest){ 
			?>
			<div class="row-fluid">
            	
                <table class="table table-bordered table-invoice-full">
                  <thead>
                    <tr>
					<?php if($invest['inves_date']!= false ){ ?>
                      <th>Date</th>
					  <?php } else { } ?>
					  <?php if($invest['document']!= false ){ ?>
					  <th>Documents</th>
					  <?php } else { } ?>
					  <?php if($invest['description']!= false ){ ?>
					  <th>Description</th>
					  <?php } else { } ?>
                    </tr>
                  </thead>
                  <tbody>
                   
					<tr class="odd gradeX">
						 <?php if($invest['inves_date']!= false ){ ?> <td style="text-align:center"><?php echo date('d/m/Y', strtotime($invest['inves_date'])); ?></td><?php } else { } ?>
						  <?php if($invest['document']!= false ){ ?> <td style="text-align:center"><?php echo $invest['document']; ?></td><?php } else { } ?>
					  <?php if($invest['description']!= false ){ ?> <td style="text-align:center"><?php echo $invest['description']; ?></td><?php } else { } ?>
					</tr>
					
                  </tbody>
                </table>
            </div>
			<?php } ?>
            <?php
			}
			?>
			
			
		  </td></tr><?php } ?><?php if($report['provisional']==1 ) { ?>		
          <tr><td colspan="3">
		  
            <?php
			if($prov_diag != false) { ?>
			<h5><strong>Treatement :</strong></h5>
			<h5>Provisional Diagnosis :</h5>
			<?php
			foreach($prov_diag as $prov_diagnosis){ 
			?>
			
            <div class="row-fluid">
            	
                <table class="table table-bordered table-invoice-full">
                  <thead>
                    <tr>
					<?php if($prov_diagnosis['pd_date']!= false ){ ?>
                      <th>Date</th>
					  <?php } else { } ?>
					  <?php if($prov_diagnosis['icd_code_desc']!= false ){ ?>
					  <th>Provisional Diagnosis</th>
					  <?php } else { } ?>
                    </tr>
                  </thead>
                  <tbody>
                   
					<tr class="odd gradeX">
						 <?php if($prov_diagnosis['pd_date']!= false ){ ?> <td style="text-align:center"><?php echo date('d/m/Y', strtotime($prov_diagnosis['pd_date'])); ?></td><?php } else { } ?>
						   <?php if($prov_diagnosis['icd_code_desc']!= false ){ ?> <td style="text-align:center"><?php echo $prov_diagnosis['icd_code_desc']; ?></td><?php } else { } ?>
					</tr>
					
                  </tbody>
                </table>
            </div>
			<?php } ?>
            <?php
			}
			?>
			
		  </td></tr> <?php } ?><?php if($report['diagnosis']==1 ) { ?>
		  <tr><td colspan="3">
		  
			 <?php
			if($medic != false) { ?>
			<h5>Medical Diagnosis :</h5>
			<?php
			foreach($medic as $medics){ 
			?>
			 <div class="row-fluid"> 
            	
                <table class="table table-bordered table-invoice-full">
                  <thead>
                    <tr>
					<?php if($medics['date']!= false ){ ?>
                      <th>Date</th>
					  <?php } else { } ?>
					  <?php if($medics['bio']!= false ){ ?>
					  <th>Medical Diagnosis</th>
					   <?php } else { } ?>
                    </tr>
                  </thead>
                  <tbody>
                   	<tr class="odd gradeX">
						  	<?php if($medics['date']!= false ){ ?><td style="text-align:center"><?php echo date('d/m/Y', strtotime($medics['date'])); ?></td> <?php } else { } ?>
						 <?php if($medics['bio']!= false ){ ?> <td style="text-align:center"><?php echo str_ireplace('%20',' ',$medics['bio']); ?></td> <?php } else { } ?>
					</tr>
					
                  </tbody>
                </table>
            </div>
			<?php } ?>
            <?php
			} else { 
				echo ' ';
				}
			?>
			
		  </td></tr><?php } ?> <?php if($report['goal']==1 ) { ?>
		  <tr><td colspan="3">
		 
            <!-- Goal -->
            <?php
			if($goal != false) { ?>
			<?php
			foreach($goal as $goals){ 
			?>
			<?php if($goals['short_term_goals1']!= false || $goals['short_term_goals2']!= false || $goals['short_term_goals3']!= false || $goals['long_term_goals1']!= false || $goals['long_term_goals2']!= false || $goals['long_term_goals3']!= false){ ?>
			<h5>Goals :</h5>
			<?php } } ?>
			<?php
			foreach($goal as $goals){ 
			?>
            <div class="row-fluid">
            	
                <table class="table table-bordered table-invoice-full">
                  <thead>
                    <tr>
					<?php if($goals['short_term_goals1']!= false || $goals['short_term_goals2']!= false || $goals['short_term_goals3']!= false || $goals['long_term_goals1']!= false || $goals['long_term_goals2']!= false || $goals['long_term_goals3']!= false){ ?>
                      <th>Date</th>
					   <?php } else { } ?>
					   <?php if($goals['short_term_goals1']!= false ){ ?>
					  <th>Short term goals 1</th>
					   <?php } else { } ?>
					   <?php if($goals['short_term_goals2']!= false ){ ?>
					  <th>Short term goals 2</th>
					   <?php } else { } ?>
					   <?php if($goals['short_term_goals3']!= false ){ ?>
					  <th>Short term goals 3</th>
					   <?php } else { } ?>
					   <?php if($goals['long_term_goals1']!= false ){ ?>
					  <th>Long term goals 1</th>
					   <?php } else { } ?>
					   <?php if($goals['long_term_goals2']!= false ){ ?>
					  <th>Long term goals 2</th>
					   <?php } else { } ?>
					   <?php if($goals['long_term_goals3']!= false ){ ?>
					  <th>Long term goals 3</th>
					   <?php } else { } ?>
                    </tr>
                  </thead>
                  <tbody>
                  
					<tr class="odd gradeX">
					 <?php if($goals['short_term_goals1']!= false || $goals['short_term_goals2']!= false || $goals['short_term_goals3']!= false || $goals['long_term_goals1']!= false || $goals['long_term_goals2']!= false || $goals['long_term_goals3']!= false){ ?> <td style="text-align:center"><?php echo date('d/m/Y', strtotime($goals['goal_date'])); ?></td> <?php } else { } ?>
					  <?php if($goals['short_term_goals1']!= false ){ ?> <td style="text-align:center"><?php echo $goals['short_term_goals1']; ?></td> <?php } else { } ?>
					   <?php if($goals['short_term_goals2']!= false ){ ?><td style="text-align:center"><?php echo $goals['short_term_goals2']; ?></td> <?php } else { } ?>
					 <?php if($goals['short_term_goals3']!= false ){ ?>  <td style="text-align:center"><?php echo $goals['short_term_goals3']; ?></td> <?php } else { } ?>
					  <?php if($goals['long_term_goals1']!= false ){ ?> <td style="text-align:center"><?php echo $goals['long_term_goals1']; ?></td> <?php } else { } ?>
					  <?php if($goals['long_term_goals2']!= false ){ ?> <td style="text-align:center"><?php echo $goals['long_term_goals2']; ?></td> <?php } else { } ?>
					  <?php if($goals['long_term_goals3']!= false ){ ?> <td style="text-align:center"><?php echo $goals['long_term_goals3']; ?></td> <?php } else { } ?>
					</tr>
					
                  </tbody>
                </table>
				
            </div>
			<?php } ?>
            <?php
			}
			?>
			
		  </td>  </tr><?php } ?>
		  
		</tbody>
        </table>
			
			
          
        </div>
    </div>
	</div>
	</center>
 <script src="<?php echo base_url(); ?>js/excanvas.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery-ui-1.10.2.custom.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.gritter.min.js"></script> 
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.peity.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.colorbox-min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.form.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.alerts.js"></script>
 <script type="text/javascript">
$(document).ready(function() {
	$('#printButton').click(function(e) {
        window.print();
    });
	parent.$.colorbox.resize({innerWidth:900, innerHeight: $('#InvoiceContainer').outerHeight() });
});
</script>
</body>
</html>