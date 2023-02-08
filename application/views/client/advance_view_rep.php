<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta https-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/x-icon" />
<title> - Physio Plus Tech</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/print/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/print/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/print/css/uniform.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/print/css/select2.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/print/css/physio_reports.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/print/css/physio_media.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/print/css/font-awesome.css" />
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/print/css/jquery-ui-1.10.2.custom.min.css" />
 
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/print/css/colorbox.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/print/css/physio_helper.css" />
<style>
tr:hover{background:#f9f9f9;}
</style>
</head>

<center><body style="overflow:hidden; margin: 0; padding: 0">
<div class="row-fluid" style="width: 750px" id="InvoiceContainer">
		
        <div class="widget-box" style="margin:0">
          <div class="widget-content">
          	<div class="row-fluid" style="text-align:center"><button type="button" id="printButton" class="btn-success">Print</button></div>
            <div class="row-fluid">
              <?php if($clientDetails['removebranding'] == 0) { ?>     
			<table class="">
                  <tbody>
                    <tr>
                      <td width="20%">
						<table>
							<tr>
								<?php  
								if($clientDetails['logo'] != '') {
									echo '<img src="' . base_url() . 'uploads/logo/' . $clientDetails['logo'] . '"  width="200px;" height="220px;">';
								} else { if($this->session->userdata('client_id') == '6'){
									echo '<h4>'.ucfirst($clientDetails['branch_name']).'</h4.';
								} else {
									echo '<h4>'.ucfirst($clientDetails['clinic_name']).'</h4.';
								} }  
								?>
							</tr>
						</table>
					  </td>
					  
					  <td width="45%">      
						<table  style="margin-left:20px">
							<tr>
							  <td><h3><?php if($this->session->userdata('client_id') == '6'){
									echo '<h4>'.ucfirst($clientDetails['branch_name']).'</h4.';
								} else {
									echo '<h4>'.ucfirst($clientDetails['clinic_name']).'</h4.';
								} ?></h3></td>
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
					  <td width="25%" style="text-align:right">
						<div id="content-header" >
							<?php if($this->session->userdata('client_id') == '2'){ ?>
							</br></br><img src="<?php echo base_url().'images/Winner - Established Brands_Black.jpg';?>" style="width:120px;height:100px;" >&nbsp;&nbsp;&nbsp;&nbsp;
					 	<?php } else { echo '<h1><center><strong>Advance</strong></center></h1>'; } ?>
							
						
						</div>
					  </td>
                    </tr>	
                  </tbody>
                </table>
								
            <?php } else { ?>
			  
			 <td width="300px" style="text-align:right">
						<div id="content-header" >
						<?php if($this->session->userdata('client_id') == '2'){ ?>
							 </br><img src="<?php echo base_url().'images/Winner - Established Brands_Black.jpg';?>" style="width:120px;height:100px;" >&nbsp;&nbsp;&nbsp;&nbsp;
					 	<?php } else { echo '<h1><center><strong>Advance</strong></center></h1>'; } ?>
						</div>
					  </td>
			<?php }?><br>
				<table><tr><td height="20px"></td></tr></table>
				
				
				<div class="row-fluid" style="margin-top: 15px">
			  
				 <table >
					<tr>
						<td> <div class="span6">
							<table class="table table-bordered table-invoice" style="width:300px;">
							<?php
									$age = ($patient['age'] > 0) ? '('.$patient['age'].')' : '';
								?>
								<tr>
								  <td style="width:100px;">Advance From. :</td>
								  <td ><strong><?php echo ucfirst($patient['first_name']).' '.$patient['last_name'].' '.$age; ?></strong>
									<?php if($patient['occupation'] != ''){ ?>
									<br>
									<strong><?php echo '('.ucfirst($patient['occupation']).')'; ?></strong>
									<?php } ?><br>
									<strong><?php echo $patient['mobile_no'];?></strong>
									<br>
									<?php $staff_id = $this->session->userdata('staff_id'); ?>
									<?php $client_id = $this->session->userdata('client_id'); 
									$Pclient_id = $this->session->userdata('pclient_id');
									if($client_id == '2' && $staff_id == ''  || $Pclient_id == '1' ) { ?>
									  <?php if($patient['address_line1']!='') echo ucfirst($patient['address_line1'].', '.$patient['address_line2'].', '.$patient['city']).'<br>'; ?> 
									  Contact No : <?php echo $patient['mobile_no']; ?> <br>
									  Email : <?php echo $patient['email']; ?> </td>
									<?php } else { } ?> 
								</tr>
								 
							</table></div>
						</td>
						
						<td> <div class="span6">
							 </div>
						</td>
						 
					</tr>
                  
                </table>
				</div> 
				
				
                 
            </div>
            <div class="row-fluid">
              <div class="span12">
                <table class="table table-bordered table-invoice-full">
                  <thead>
                    <tr>
                      <th >Advance amount<?php echo '('.$clientDetails['currency'].')' ;?></th>
                      <th >Bill amount<?php echo '('.$clientDetails['currency'].')' ;?></th>
                      <th >Balance amount<?php echo '('.$clientDetails['currency'].')' ;?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="vertical-align: middle;text-align:right"><?php echo number_format($advance['totalAdvance'],2,'.',''); ?></td>
                      <td style="vertical-align: middle;text-align:right"><?php echo number_format($advance['totalPaid'],2,'.',''); ?></td>
                      <td style="vertical-align: middle;text-align:right"><?php echo number_format($advance['advanceBalance'],2,'.',''); ?></td>
                    </tr>
                  </tbody>
                </table>
				
                <table align="center" width="100%">
                	<tr>
                    	<td align="right">
							<table class="table table-bordered table-invoice-full" style="width:40%;">
								  <tbody>
									<tr>
										 <td style="text-align:right"><strong>Total</strong> <br></td>
									  <td style="text-align:right"><strong><?php echo number_format($advance['totalAdvance'],2,'.','').' '.$clientDetails['currency']; ?></strong><br>
									  </td>
									</tr>
									<?php //if($advance_payment!=false){ ?>
									<!--<tr>
										 <td style="text-align:right">
											<strong>Payments : </strong> <br>
											<?php foreach($advance_payment as $payment){ 
												echo date("F j, Y",strtotime($payment['payment_date'])).' (By '.$payment['payment_mode'].')';?><br>
											<?php } ?>
										</td>
										<td style="text-align:right">
											<strong></strong><br>
											<?php foreach($advance_payment as $payment1){ 
												echo number_format($payment1['paid_amt'],2,'.','').' '.$clientDetails['currency']; ?><br>
											<?php } ?>
										</td>
									</tr>-->
									<?php // } ?>
									<tr>
										 <td style="text-align:right"><strong>Total paid</strong> <br></td>
									  <td style="text-align:right"><strong><?php echo number_format($advance['totalPaid'],2,'.','').' '.$clientDetails['currency']; ?></strong><br>
									  </td>
									</tr>
									<tr>
										 <td style="text-align:right"><strong>Balance amount</strong> <br></td>
									  <td style="text-align:right"><strong><?php echo number_format($advance['advanceBalance'],2,'.','').' '.$clientDetails['currency']; ?></strong><br>
									  </td>
									</tr>
								  </tbody>
							</table>
                        </td>
                    </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div></center>
<script src="<?php echo base_url(); ?>assets/print/js/excanvas.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/print/js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/print/js/jquery-ui-1.10.2.custom.min.js"></script>
 
<script src="<?php echo base_url(); ?>assets/print/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/print/js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/print/js/jquery.peity.min.js"></script>
<script src="<?php echo base_url(); ?>assets/print/js/jquery.colorbox-min.js"></script>
<script src="<?php echo base_url(); ?>assets/print/js/jquery.form.js"></script> 
<script src="<?php echo base_url(); ?>assets/print/js/jquery.alerts.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#printButton').click(function(e) {
        window.print();
    });
	parent.$.colorbox.resize({innerWidth:750, innerHeight: $('#InvoiceContainer').outerHeight() });
});
</script>
</body>
</html>