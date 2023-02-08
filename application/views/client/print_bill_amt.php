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
						 <table  class="table table-bordered table-invoice-full" id="section-to-print">
                        <thead>
                         <tr>
							<th>Date</th>
                            <th>Bill no.</th>
                             
                            <th>Patient name</th>
							<th>Payment mode</th>
                            <th>Bill amount	<?php echo '('.$clientDetails['currency'].')' ;?></th>
                            <th>Paid amount	<?php echo '('.$clientDetails['currency'].')' ;?></th>
							<th>Due amount	<?php echo '('.$clientDetails['currency'].')' ;?></th>
						</tr>
						</thead>
                        <?php 
						$val = 0;
						$val1 = 0;
						$val2 = 0;
						foreach ($invoice_record as $invoice_records) {
							$net_amt = $invoice_records['net_amt'];
					        $paid_amt = $invoice_records['paid_amt'];
					        $balance_amt = $net_amt - $paid_amt;
					        $current_date = strtotime(date('Y-m-d'));
					        $url = base_url().'client/invoice/invoice_status_update/'.$invoice_records['bill_id'].'/'.$invoice_records['patient_id'];
					
						?>
						<tr>
						  <td><?php echo $invoice_records['treatment_date']; ?></td>
							<?php 
					if($invoice_records['bill_status'] == 0){
					?>
							<td><a href="<?php echo base_url().'client/invoice/edit/'.$invoice_records['bill_id']; ?>"><?php echo $invoice_records['bill_no']; ?></a></td>
							</a></td>
							<?php }else{ ?>
							<td><?php echo $invoice_records['bill_no']; ?></td>
							<?php } ?>
							
							<td><?php echo $invoice_records['first_name'].' '.$invoice_records['last_name']; ?></td>
							<td data-field="paymentMode_<?php echo $invoice_records['bill_id']; ?>" ><?php echo $invoice_records['payment_mode']; ?></td>
							<td data-field="invoiceNet_<?php echo $invoice_records['bill_id']; ?>" ><?php echo number_format($invoice_records['net_amt'],2,'.',''); ?></td>
					       <td data-field="invoicePaid_<?php echo $invoice_records['bill_id']; ?>" ><?php echo number_format($invoice_records['paid_amt'],2,'.','') ; ?></td>
                	      <td data-field="invoiceDue_<?php echo $invoice_records['bill_id']; ?>" >
							<?php echo number_format(($invoice_records['net_amt'] - $invoice_records['paid_amt']),2,'.','') ; ?>
					    </td>
						<?php
				$val += $invoice_records['net_amt'];
				$val1 += $invoice_records['paid_amt'];
				$val2 += $balance_amt;
				 ?>
				<?php }
				?>
						<tr><td></td><td></td><td></td> <td><strong>Total :</strong></td>
				<td><?php echo number_format($val,2,'.',''); ?></td><td><?php echo number_format($val1,2,'.',''); ?></td><td><?php echo number_format($val2,2,'.',''); ?></td></tr>
				
                          </tbody>
                      </table>
					<?php }    ?>
						
                        
					  
					   </br></br>
					  <?php if($todays_advance != false) { ?>
					  <h4>Advance Reports</h4>
					  <table  class="table table-bordered table-invoice-full" id="basicDataTable">
                        <thead>
                          <tr>
                            <th>S.No</th>
                             <th>Patient name</th>
							<th>Payment mode</th>
                            <th>Advance amount<?php echo '('.$clientDetails['currency'].')' ;?></th>
						 </tr>
                        </thead>
                        <tbody>
						<?php
						$val = 0;
						$i=1;
						foreach ($todays_advance as $todays_advances) {
						?>
						<tr>
						<td><?php echo $i;  ?></td>
						
						<td><?php echo $todays_advances['first_name'].' '.$todays_advances['last_name']; ?></td>
						<td><?php echo $todays_advances['payment_mode']; ?></td>
						<td><?php echo $todays_advances['advance_amount']; ?></td>
					</tr>
				<?php
				$val += $todays_advances['advance_amount'];
				 $i = $i+1;
				 ?>
				<?php }
				?>
				
				<tr> <td></td><td></td><td><strong>Total :</strong></td>
				<td><?php echo number_format($val,2,'.',''); ?></td></tr>
				 </tbody>
                      </table>
							
						<?php }   ?>
				
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