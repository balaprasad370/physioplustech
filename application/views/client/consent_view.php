<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/x-icon" />
<title> - Physio Plus Tech</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/uniform.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/select2.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/physio_reports.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/physio_media.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>font-awesome/css/font-awesome.css" />
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo base_url(); ?>flick/jquery-ui-1.10.2.custom.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.gritter.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/colorbox.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/physio_helper.css" />
<style ="text/css">
button:hover span {display:none}
button:hover:before {content:""}
</style>
<link href="<?php echo base_url(); ?>css/jquery.alerts.css" type="text/css" rel="stylesheet" />
<style>
tr:hover{background:#f9f9f9;}
</style>
</head>
<center><body style="overflow:scroll; margin: 0; padding: 0">
<div class="row-fluid" style="width: 900px; overflow-x: hidden; overflow-y: auto;" id="InvoiceContainer">
        <div class="widget-box" style="margin:0">
          <div class="widget-content">
          	<div class="row-fluid" style="text-align:center"><button type="button" id="printButton" class="btn-success">Print</button></div>
            <?php if($clientDetails['removebranding'] == 0) { ?>     
			<table class="">
                  <tbody>
                    <tr>
                      <td width="25%">
						<table>
							<tr>
								<?php
								if($clientDetails['logo'] != '') {
									echo '<img src="' . base_url() . 'uploads/logo/' . $clientDetails['logo'] . '"  width="200px;" height="200px;">';
								} else {
									echo '<h4>'.ucfirst($clientDetails['clinic_name']).'</h4.';
								}
								?>
							</tr>
						</table>
                      </td>
					  <td width="45%">
						<table  style="margin-left:30px">
							<tr>
							  <td><h3><?php echo ucfirst($clientDetails['clinic_name']); ?></h3></td>
							</tr>
							<tr>
							  <td><?php echo ucfirst($clientDetails['address']); ?></td>
							</tr>
							<tr>
							  <td><?php echo ucfirst($clientDetails['city']). ' - '. $clientDetails['zipcode'].', '.ucfirst($clientDetails['state']); ?></td>
							</tr>
							<?php if($clientDetails['website'] != false){  ?>
							<tr>
							  <td >Website : <?php echo $clientDetails['website']; ?></td>
							</tr>
							<?php } ?>
							<?php if($clientDetails['email'] != false){  ?>
							<tr>
							  <td >Email : <?php if($clientDetails['contact_mail'] != '') { echo $clientDetails['contact_mail']; } else { echo $clientDetails['email']; } ?></td>
							</tr>
							<?php } ?>
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
							<?php if($clientDetails['bank_details'] != false){ ?>
							<tr>
							  <td><strong>Bank Details:</strong> <?php echo $clientDetails['bank_details']; ?></td>
							</tr>
							<?php } ?>
							<?php } ?>
							
							
							
						</table>
					  </td>
					  
                    </tr>	
                  </tbody>
                </table>
								
            <?php } ?>
        
		<tr><td colspan="3">
            <div class="row-fluid" style="margin-top: 15px">
            	<div class="span6">
                	<table class="table table-bordered table-invoice">
                        <tr>
                          <td >Id : </td>
                          <td ><strong><?php echo $patient_info['patient_code']; ?></strong></td>
                        </tr>
						<?php
							$age = ($patient_info['age'] > 0) ? '('.$patient_info['age'].')' : '';
						?>
						<tr>
                          <td>Date of Birth: </td>
                          <td><strong><?php if($patient_info['dob'] == '0000-00-00'){ echo 'Not Mentioned'; } else { echo date('d-m-Y',strtotime($patient_info['dob'])); }?></strong></td>
                        </tr>
						<tr>
                          <td >Name : </td>
                          <td ><strong><?php echo ucfirst($patient_info['first_name']).' '.$patient_info['last_name'].' '.$age; ?></strong>
						  <?php if($patient_info['occupation'] != ''){ ?>
							<br>
							<strong><?php echo '('.ucfirst($patient_info['occupation']).')'; ?></strong>
							<?php } ?>
						  </td>
                        </tr>
                        <tr>
                          <td>Gender : </td>
                          <td ><strong><?php echo ucfirst($patient_info['gender']); ?></strong></td>
                        </tr>
						<?php if ($patient_info['food_habits'] != false && $patient_info['food_habits']=="0" ) { ?>
                        <tr>
                          <td>Food habits : </td>
                          <td ><strong>
							<?php
							echo $patient_info['food_habits'];
						  ?>
						<?php } else { } ?>
					 </strong></td>
                        </tr>
                    </table>
                </div>
                <div class="span6">
                	<table class="table table-bordered table-invoice">
						<?php if($patient_info['address_line1'] !=  false || $patient_info['address_line2'] !=  false ) { ?>
                        <tr>
                          <td >Address : </td>
                          <td >
							<strong><?php echo ucfirst($patient_info['address_line1']).', '; ?></strong>
							<strong><?php echo ucfirst($patient_info['address_line2']); ?></strong>
						  </td>
                        </tr>
                       <?php } else { } ?>
						<?php if($patient_info['city'] !=  false) { ?>
						 <tr>
                          <td>City : </td>
                          <td ><strong><?php echo ucfirst($patient_info['city']); ?></strong></td>
                        </tr>
							<?php } else { } ?>
							<?php if($patient_info['mobile_no'] !=  false) { ?>
                        <tr>
                          <td>Mobile : </td>
                          <td ><strong><?php echo $patient_info['mobile_no']; ?></strong></td>
                        </tr>
							<?php } else { } ?>
							<?php if($patient_info['email'] !=  false) { ?>
                        <tr>
                          <td>Email : </td>
                          <td ><strong><?php echo $patient_info['email']; ?></strong></td>
                        </tr>
							<?php } else { } ?>
                    </table>
                </div>
            </div>
			
			<!-- Case notes  -->
            
			</td></tr>
			
		 
				
		<div class="row-fluid">
              <div class="span12">
                <table class="table table-bordered table-invoice-full">
                  <thead>
                    <tr>
                      <th >Terms & Conditions</th>
                      
                    </tr>
                  </thead>
                  <tbody>
					
                    <tr>
                      <td style="vertical-align: middle"><?php echo $clientDetails['consent_form']?></td>
                      </tr>
                  </tbody>
				 
                </table>
				</div></div>
				
				<div class="row-fluid">
              <div class="span12">
                <table class="table table-bordered table-invoice-full">
                  <thead>
                    <tr>
					<th>Date</th>
                      <th >Patient Signature</th>
                      <th >Guardian Signature</th>
                    </tr>
                  </thead>
                  <tbody>
					
                    <tr>
					<td><?php echo date('d-m-Y',strtotime($sign_detail['date'])); ?></td>
                      <td><img src="<?php echo base_url().$sign_detail['img_name']?>" height="auto" width="100%">
                      </td>
					  <td><img src="<?php echo base_url().$sign_detail['img_name1']?>" height="auto" width="100%">
                      </td>
					  </tr>
					   
                  </tbody>
				 
                </table>
				</div></div>

        </div>
    </div></center>
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
	parent.$.colorbox.resize({innerWidth:750, innerHeight: $('#InvoiceContainer').outerHeight() });
});
</script>
</script>
</body>
</html>

