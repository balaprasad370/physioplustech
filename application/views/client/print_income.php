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
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/print/css/jquery.gritter.css" />
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
                      <td width="300px">
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
					  <td width="300px" style="text-align:right">
						<div id="content-header" >
						 <?php if($this->session->userdata('client_id') == '2'){ ?>
							</br><img src="<?php echo base_url().'images/Winner - Established Brands_Black.jpg';?>" style="width:120px;height:100px;" >
					 	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php } else { ?>
						<h2 style="color:#348AC9">Bill statement</h3>
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
                <?php if($invoices != false){  ?>
						 <table  class="table table-bordered table-invoice" id="section-to-print">
                        <thead>
                         <tr>
							 
							<th>Name</th>
							<th>Date</th>
							<th>Bill No.</th>
							<th>Payment mode</th>
							<th>Status</th>
							<th>Bill amount<?php echo '('.$clientDetails['currency'].')' ;?></th>  
							<th>Paid amount<?php echo '('.$clientDetails['currency'].')' ;?></th>
							<th>Due amount<?php echo '('.$clientDetails['currency'].')' ;?></th>
						</tr>
						</thead>
                        <tbody>
						<?php
						$billAmountTotal = 0;
						$paidAmountTotal = 0;
						$pendingAmountTotal = 0;
						$advanceAmountTotal =0;
						 
						foreach($invoices as $invoice){
						?>
						
						<tr>
							
							<td><?php echo $invoice['first_name'].'  '.$invoice['last_name']; ?></td>
							<td><?php echo date('d-m-Y',strtotime($invoice['treatment_date'])); ?></td>
							<td><?php echo $invoice['bill_no'].''.substr($invoice['bill_id'],-7); ?></td>
							<td><?php echo $invoice['payment_mode']; ?></td>
							<td><?php echo $invoice['payment_mode']; ?></td>
							<td><?php echo number_format($invoice['net_amt'],2,'.',''); ?></td>
							<td><?php echo number_format($invoice['paid_amt'],2,'.',''); ?></td>
							<td><?php echo number_format($invoice['net_amt'] - $invoice['paid_amt'],2,'.',''); ?></td>
						  </tr>
						
						<?php
						$billAmountTotal += $invoice['net_amt'];
						$paidAmountTotal += $invoice['paid_amt'];
						$pendingAmountTotal += $invoice['net_amt'] - $invoice['paid_amt'];
						
						}  ?>
						
						<tr>
						 
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>
							<strong>Total<?php echo '('.$clientDetails['currency'].')' ;?>  </strong>
						</td>
						<td>
							<strong><?php echo number_format($billAmountTotal,2,'.',''); ?></strong>
						</td>
						<td>
							<strong><?php echo number_format($paidAmountTotal,2,'.',''); ?></strong>
						</td>
						<td>
							<strong><?php echo number_format($pendingAmountTotal,2,'.',''); ?></strong>
						</td>
						</tr>
                        
					  
					    <?php } ?>
						<?Php if($advances != false){ ?>
						<tr><td colspan="9"><center><strong><h4>Advance Amount</h4></strong></center></td></tr>
						<?Php foreach($advances as $row){ ?>
						<tr>
						 
						<td><?php echo $invoice['first_name'].'  '.$invoice['last_name']; ?></td>
						<td><?php echo date('d-m-Y',strtotime($invoice['treatment_date'])); ?></td>
						<td colspan="3">Advance Amount</td>
						<td>&nbsp;</td>
						<td><?php echo  $row['advance_amount']?> </td>
						<td>&nbsp;</td>
						</tr>
						<?php $advanceAmountTotal += $row['advance_amount']; }  ?>
						
						<tr>
						<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
						
						<td>
							<strong>Total<?php echo '('.$clientDetails['currency'].')' ;?> : </strong>
						</td>
						<td>
							<strong></strong>
						</td>
						<td>
							<strong><?php echo number_format($advanceAmountTotal,2,'.',''); ?></strong>
						</td>
						 
						</tr>
						
                        </tbody>
                      </table>
						<?php } ?>
               
				
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