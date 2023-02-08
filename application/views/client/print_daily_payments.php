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
<style ="text/css">
button:hover span {display:none}
button:hover:before {content:"Invoice"}
</style>
<link href="<?php echo base_url(); ?>assets/print/css/jquery.alerts.css" type="text/css" rel="stylesheet" />
<style>
tr:hover{background:#f9f9f9;}

@media print {
  a[href]:after {
    content: none !important;
  }
}
</style>
</head>

<body style="height:auto; overflow:scroll; margin: 0; padding: 0">
<center><div class="row-fluid" style="width: 800px" id="InvoiceContainer">
		
        <div class="widget-box" style="margin:0; width:100%;">
          <div class="widget-content">
          	<div class="row-fluid" style="text-align:center"><button type="button" id="printButton" class="btn-success"><span>Print</span></button></div>
            <div class="row-fluid">
			<?php if($clientDetails['removebranding'] == 0) { ?>     
			<table class="">
                  <tbody>
                    <tr>
                      <td width="250px">
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
					  <td width="500px">
						<table  style="margin-left:45px">
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
					  <td width="250px" style="text-align:right">
						<div id="content-header" >
						 <?php if($this->session->userdata('client_id') == '2'){ ?>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url().'images/Winner - Established Brands_Black.jpg';?>" style="width:120px;height:100px;" >
					 	<?php } else { ?>
						<h2 style="color:#348AC9"><strong>&nbsp;&nbsp;</strong></h2>
						<?php } ?>
						</div>
					  </td>
                    </tr>	
                  </tbody>
                </table>
								
            <?php } else { ?>
			<br>
					<br>
					<br>	<br>
					<br>
					<br>
					<br>	<br>
					<br>
					<br><br>
					<br>
			 
			<?php } ?>
			</br>
			
			
			<div class="row-fluid">
              <div class="span12">
                <?php if($invoice_record != false){  ?>
					    <h5> Summary of Payments by Type (<?php if($this->uri->segment('5') != '') { echo 'Date : '.$this->uri->segment('5').' to '.$this->uri->segment('6'); } else { } ?>)</h5>
					 <table  class="table table-bordered table-custom" id="basicDataTable">
                        <thead>
                          <tr>
                             <th>Date</th>
                           	<th>Payment mode</th>
                            <th>Amount(SGD)</th>
                           </tr>
                        </thead>
                        <tbody>
						<?php 
						$val = 1;
						foreach ($invoice_record as $invoice_records) {
						?>
						<tr>
						<td><?php echo $val; $val = $val + 1; ?></td>
						<td><?php echo $invoice_records['payment_mode']; ?></td>
						<td><?php echo $invoice_records['paid']; ?></td>
					</tr>
					<?php } ?>
						</tbody>
                     </table>
						
					 
						<h5>Invoice List (<?php if($this->uri->segment('5') != '') { echo 'Date : '.$this->uri->segment('5').' to '.$this->uri->segment('6'); } else { } ?>)</h5>
					<?php if($invoices != false){  ?>
					 <table  class="table table-bordered table-custom" id="basicDataTable">
                        <thead>
                          <tr>
                            <th>S.No</th>
                            <th>Date</th>
                            <th>Bill Id</th>
                            <th>Patient name</th>
                            <th>Source</th>
                            <th>Total amount<?php echo '('.$clientDetails['currency'].')' ;?></th>
							
				            
                           </tr>
                        </thead>
                        <tbody>
						<?php 
						$val = 1;
						foreach ($invoices as $records) {
						?>
						<tr>
						<td><?php echo $val; $val = $val + 1; ?></td>
						<td><?php echo date('d-m-Y',strtotime($records['cheque_date'])); ?></td>
						<td><?php echo $records['bill_no']; ?></td>
						<td><?php echo $records['first_name'].' '.$records['last_name'];?></td>
						<td><?php echo $records['payment_mode'].' : '.$records['paid_amt']; ?></td>
						<td><?php echo $records['paid_amt']; ?></td>
						
					</tr>  
					<?php } ?>
						</tbody>
                     </table>
					<?php } } else { echo '</br><center><h3>No Records Found</h3></center>'; }  ?>
				
				</div> 
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