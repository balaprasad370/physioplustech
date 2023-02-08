<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta https-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/x-icon" />
<title><?php //echo ucfirst($this->session->userdata('username')); ?> - Physio Plus Tech</title>
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
button:hover:before {content:"Invoice"}
</style>
<link href="<?php echo base_url(); ?>css/jquery.alerts.css" type="text/css" rel="stylesheet" />
<style>
tr:hover{background:#f9f9f9;}
</style>
</head>

<body style="overflow:hidden; margin: 0; padding: 0">
<center><div class="row-fluid" style="width: 750px" id="InvoiceContainer">
		
        <div class="widget-box" style="margin:0">
          <div class="widget-content">
          	<div class="row-fluid" style="text-align:center"><button type="button" id="printButton" class="btn-success"><span>Print</span></button></div>
            <div class="row-fluid">
				<div style="text-align:center">
					<h3 ><?php echo ucfirst($clientDetails['clinic_name']); ?></h3>
				</div>
                <table class="">
                  <tbody>
                    <tr>
                      <td width="33%">
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
					  <td width="33%">
						<table  style="margin-left:30px">
							<tr>
							  <td><?php echo ucfirst($clientDetails['address']); ?></td>
							</tr>
							<tr>
							  <td><?php echo ucfirst($clientDetails['city']). ' - '. $clientDetails['zipcode'].', '.ucfirst($clientDetails['state']); ?></td>
							</tr>
							<tr>
							  <td>Mobile : <?php echo $clientDetails['mobile']; ?></td>
							</tr>
							<tr>
							  <td >Email : <?php echo $clientDetails['email']; ?></td>
							</tr>
							<?php if($clientDetails['bank_details'] != false){ ?>
							<tr>
							  <td><strong>Bank Details :</strong><?php echo $clientDetails['bank_details']; ?></td>
							</tr>
							<?php } ?>
						</table>
					  </td>
					  <td width="33%" style="text-align:right">
						<div id="content-header" >
							<h1><strong>Invoice</strong></h1>
						</br></br>
						<?Php if($invoice_hdr['net_amt']- $invoice_hdr['paid_amt'] > 0 ) { ?>
						<a target="_blank" class="btn btn-info" href="<?php echo 'https://physioplustech.in/client/renewal/pay_invoice/'.$clientDetails['client_id'].'/'.$invoice_hdr['bill_id'].'/'.($invoice_hdr['net_amt'] - $invoice_hdr['paid_amt']) ?>">Make Payment</a>
						<?Php } else { } ?>
						</div>
						<div style="margin-left:25px;">
							<strong><?php echo $invoice_hdr['subheading']; ?></strong>
						</div>
					  </td>
                    </tr>
                  </tbody>
                </table>
				<table><tr><td height="20px"></td></tr></table>
                <table >
					<tr>
						<td>
							<table class="table table-bordered table-invoice" style="width:200px">
								<tr>
								  <td >Invoice No. : </td>
								  <td ><strong><?php echo $invoice_hdr['bill_no']; ?></strong></td>
								</tr>
								<tr>
								  <td>Invoice Date:</td>
								  <td><strong><?php echo date("F j, Y",strtotime($invoice_hdr['due_date']));?></strong></td>
								</tr>
								<tr>
								  <td>Due Date:</td>
								  <td><strong><?php echo date("F j, Y",strtotime($invoice_hdr['due_date']));?></strong></td>
								</tr>
							</table>
						</td>
						<td style="vertical-align:top">
							<table class="table table-bordered table-invoice" style="width:495px;height:113px;margin-left:20px;">
								<tr>
								  <td >Invoice To : </td>
									<td ><strong><?php echo $patient['first_name']; ?></strong> <br>
									  <?php if($patient['address_line1']!='') echo $patient['address_line1'].'<br>'; ?> 
									  Contact No : <?php echo $patient['mobile_no']; ?> <br>
									  Email : <?php echo $patient['email']; ?> </td>
								  </tr>
							</table>
						</td>
					</tr>
                  
                </table>
            </div>
            <div class="row-fluid">
              <div class="span12">
                <table class="table table-bordered table-invoice-full">
                  <thead>
                    <tr>
                      <th >Date</th>
                      <th >Item</th>
                      <th >Amount</th>
                    </tr>
                  </thead>
                  <tbody>
					<?php
					$sub_total = 0;
					  /* if($treatment != false) { $i = 1;
															foreach($treatment as $treatments){ if($treatments['bill_status'] == 1) {
																  ?>
														<tr>
														  <td data-field="treatDate_<?php echo $treatments['treatment_id']; ?>" style="vertical-align: middle"><?php echo date('d/m/Y', strtotime($treatments['treatment_date'])); ?></td>
														  <td data-field="treatment_<?php echo $treatments['treatment_id']; ?>" style="vertical-align: middle"><?php echo $treatments['itemName']; ?></td>
														  <td data-field="treatPrice_<?php echo $treatments['treatment_id']; ?>" style="vertical-align: middle"><?php 
														   $val1 = explode('-',$treatments['treatmentPrice']);
														    $amt = 0; for($i=0; $i < sizeof($val1); $i++){  $amt += $val1[$i];   }  $i = $i+1; echo $amt; ?></td>
														  
														</tr>
														<?php  $sub_total += $amt;
				  } } } else { */
						if($invoice_dtl!=false){
						foreach ($invoice_dtl as $invoice_dtls) {
							$this->db->where('item_id', $invoice_dtls['item_id']);
							$this->db->select('item_name')->from('tbl_item');
							$res = $this->db->get();
							$item_name = $res->row()->item_name;
					?>
                    <tr>
				  	  <td style="vertical-align: middle"><?php echo  date('d-m-Y',strtotime($invoice_dtls['treatment_date']));  ?></td>
                      <td style="vertical-align: middle"><?php echo $item_name; ?></td>  
                      <td style="vertical-align: middle;text-align:right"><?php echo $invoice_dtls['item_amount']; ?></td>
                    </tr>
                
				  <?php
						$sub_total += $invoice_dtls['item_amount']; }  } ?>    
						  </tbody>
                </table>
				
                <table align="center" width="100%">
                	<tr>
						<td style="vertical-align:top">
							<div style="text-align:left;width:150px;">
								<strong><?php echo $invoice_hdr['notes']; ?></strong>
							</div>
						</td>
                    	<td align="right">
							<table class="table table-bordered table-invoice-full" style="width:50%;">
								  <tbody>
									<tr>
									  <td style="text-align:right"><strong>Subtotal</strong> <br>
										<?php if($invoice_hdr['tax_perc']!='0.00') { ?>
										<strong>Tax (%)</strong> <br>
										<?php } ?>
										<?php if($invoice_hdr['discount_perc']!='0.00') { ?>
										<strong>Discount (%)</strong></td>
										<?php } ?>
									  <td style="text-align:right"><strong><?php echo number_format($sub_total,2,'.',''); ?><br>
										<?php if($invoice_hdr['tax_perc']!='0.00') { echo $invoice_hdr['tax_perc']; } ?><br>
										<?php if($invoice_hdr['discount_perc']!='0.00') { echo $invoice_hdr['discount_perc']; } ?></strong></td>
									</tr>
									<tr>
										 <td style="text-align:right"><strong>Total</strong> <br></td>
									  <td style="text-align:right"><strong><?php echo number_format($invoice_hdr['net_amt'],2,'.',''); ?></strong><br>
									  </td>
									</tr>
									<?php if($invoice_payment!=false){ ?>
									<tr>
										 <td style="text-align:right">
											<strong>Payments : </strong> <br>
											<?php foreach($invoice_payment as $payment_date){ 
												echo date("F j, Y",strtotime($payment_date['payment_date']));?><br>
											<?php } ?>
										</td>
										<td style="text-align:right">
											<strong></strong><br>
											<?php foreach($invoice_payment as $payment_amt){ 
												echo number_format($payment_amt['paid_amt'],2,'.',''); ?><br>
											<?php } ?>
										</td>
									</tr>
									<?php } ?>
									<tr>
										 <td style="text-align:right"><strong>Total paid</strong> <br></td>
									  <td style="text-align:right"><strong><?php echo number_format($invoice_hdr['paid_amt'],2,'.',''); ?></strong><br>
									  </td>
									</tr>
									<tr>
										 <td style="text-align:right"><strong>Amount due</strong> <br></td>
									  <td style="text-align:right"><strong><?php echo number_format($invoice_hdr['net_amt'] - $invoice_hdr['paid_amt'],2,'.',''); ?></strong><br>
									  </td>
									</tr>
								  </tbody>
							</table>
                        </td>
                    </tr>
                </table>
				<div style="text-align:center">
					<strong><?php echo $invoice_hdr['inv_footer']; ?></strong>
				</div>
              </div>
            </div>
          </div>
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
	window.print();
	$('#printButton').click(function(e) {
        window.print();
    });
	parent.$.colorbox.resize({innerWidth:750, innerHeight: $('#InvoiceContainer').outerHeight() });
});
</script>
</body>
</html>