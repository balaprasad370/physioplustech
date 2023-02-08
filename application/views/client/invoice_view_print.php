<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/x-icon" />
<title>Invoice Print - Physio Plus Tech</title>
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
 @media print
      {
	  
	   #printButton {

    display: none;

  }
  }
</style>
<style>
<?php 
if($this->session->userdata('client_id')=='1948')
{?>
@media print { a[href]:after { content: none !important; } }
<?php
	
}
?>
</style>			

</head>

<body style="height:auto; overflow:scroll; margin: 0; padding: 0">
<center><div class="row-fluid" style="width: 800px" id="InvoiceContainer">
		
		<?php $classwib = ($this->session->userdata('client_id')!='1948') ? "widget-box" : "" ?>
		<?php $classcontent = ($this->session->userdata('client_id')!='1948') ? "widget-content" : "" ?>
        <div class="<?=$classwib?>" style="margin:0; width:100%;">
		
          <div class="<?=$classcontent?>">
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
								} else { if($this->session->userdata('client_id') == '6'){
									echo '<h4>'.ucfirst($clientDetails['branch_name']).'</h4.';
								} else {
									echo '<h4>'.ucfirst($clientDetails['clinic_name']).'</h4.';
								} }
								?>
							</tr>
						</table>
                      </td>
					  <td width="500px">
						<table  style="margin-left:40px">
							<tr>
							  <td><h3> <?php if($this->session->userdata('client_id') == '6'){
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
					  <td width="250px" >
						<div id="content-header" >
							<?php 
					if($invoice_hdr['bill_status'] == 0){
					?>
						<h1><center><strong>Invoice</strong></center></h1>
					    <?php } else { if($this->session->userdata('client_id') == '2'){ ?>
							</br></br><img src="<?php echo base_url().'images/Winner - Established Brands_Black.jpg';?>" style="width:120px;height:100px;" >&nbsp;&nbsp;&nbsp;&nbsp;
					 	<?php } else { echo '<h1><center><strong>Bill</strong></center></h1>'; } } ?>
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
			 <td width="300px" style="text-align:right">
						
						<?php if($this->session->userdata('client_id') != '1948') { ?>
						<div id="content-header" >
							<h1><center><strong>Invoice</strong></center></h1>
						</div>
						<?php } else {?>
					
						<?php } ?>
						
					  </td>
			<?php }?>
			<div class="row-fluid" style="margin-top: 13px">
			  
				 <table >
					<tr>
						<td> <div class="span12">
							<table class="table table-bordered table-invoice" style="width:277px;">
								<tr>
								  <td style="width:100px;">Invoice  No. :</td>
								  <td ><strong><?php echo $invoice_hdr['bill_no']; ?></strong></td>
								</tr>
								<tr>
								  <td>Invoice Date : </td>
								  <td><strong><?php echo date("M j, Y",strtotime($invoice_hdr['treatment_date']));?></strong></td>
								<?php $invoice_date = $invoice_hdr['treatment_date']; ?>
								</tr>
								<tr>
								  <td>Due Date :</td>
								  <td><strong><?php echo date("M j, Y",strtotime($invoice_hdr['due_date']));?></strong></td>
								</tr>
								<?php $this->db->where('bill_id',$bill);
								$this->db->select('appointment_from,start')->from('tbl_appointments');
								$res = $this->db->get();
								if($res->result_array() != false){
									$val = $res->row()->start; ?>
									<tr>
								     <td>Appointment Date & Time :</td>
								     <td><strong><?php echo date("M j, Y h:i A",strtotime($val));?></strong></td>
								    </tr>
								<?php } else {
									$val = '';
								} 
								?>
							</table></div>
						</td>
						<td style="vertical-align:top"> <div class="span12">
							<table class="table table-bordered table-invoice" style="width:450px;height:113px;margin-left:10px;">
								<?php
									$age = ($patient['age'] > 0) ? '('.$patient['age'].')' : '';
								?>
								<tr>
								  <td style="width:91px">Invoice To:</td>
									<td ><strong><?php echo ucfirst($patient['first_name']).' '.$patient['last_name'].' '.$age; ?></strong>
									<?php if($patient['occupation'] != ''){ ?>
									<br>
									<strong><?php echo '('.ucfirst($patient['occupation']).')'; ?></strong>
									<?php } ?>
									<br>
									  <?php if($patient['address_line1']!='') echo ucfirst($patient['address_line1'].', '.$patient['address_line2'].', '.$patient['city']).'<br>'; ?> 
									  Contact No : <?php echo $patient['mobile_no']; ?> <br>
									 <?php if($patient['email'] !='') { ?> Email : <?php echo $patient['email']; ?> <?php } ?><br>
									 
						 <?php if($patient['referal_type_id']!= false && $patient['referal_id'] != false ){ 
									 $referal_type_id = $patient['referal_id'];
									 $this->db->select('*')->from('tbl_referal');
						   $this->db->where('referal_id',$referal_type_id);
						   $query = $this->db->get();
							
						   if($query->result_array() != false && $patient['referal_type_id'] != 5) {
						   $referal_id = $query->row()->referal_type_id;
						   $ref_id = $query->row()->referal_id;
						   
						   if($referal_id == 1){
						   $name = $query->row()->referal_name;
						   }
						   else if ($referal_id == 2){
							   $name = $query->row()->website_name;
						   }
						   else if($referal_id == 3){
							   $name = $query->row()->adv_name;
						   }
						   else if($referal_id == 4){
							   $name = $query->row()->referal_oth_name;
						   }
						   
						   else if($referal_id == 6){
							   $name = $query->row()->referal_name;
						   }
						   } else {
								$this->db->where('patient_id',$patient['referal_id']);
								$this->db->select('first_name,last_name')->from('tbl_patient_info');
								$query = $this->db->get();
                                $name = $query->row()->first_name.' '.$query->row()->last_name;

						    }		 
						   ?>
						   
 						   Referred By : <?php  echo $name; } ?>
						   
									  
									  </td>
								  </tr>
							</table></div>
						</td>
					</tr>
                  
                </table>
				</div>            
			 <div class="row-fluid">
              <div class="span12">
                <table class="table table-bordered table-invoice-full" style="width:94%">
                  <thead>
                    <tr>
					  <th >Date</th>	
                      <th >Item</th>
					  <th >Qty</th>
                      <th >Price</th>
                      <th >Amount</th>
                    </tr>
                  </thead>
                  <?php $sub_total = 0; /* if($treatment != false) { $i = 1;
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
				  } } }  else { */ ?>
					<?php
						if($invoice_dtl!=false){
						
						foreach ($invoice_dtl as $invoice_dtls)
						{
							$this->db->where('item_id',$invoice_dtls['item_id']);
							$this->db->select('item_name')->from('tbl_item');
							$res = $this->db->get();
							
							if($res->result_array() != false) {
								$item = $res->row()->item_name;
							} else {
								$id = explode('/',$invoice_dtls['item_id']);
								if($id[0] == 'PR') {
									$this->db->where('product_id',$id[1]);
									$this->db->select('item_name')->from('tbl_product_info');
									$res = $this->db->get();
									$item = $res->row()->item_name;
								} else {
									$this->db->where('inventory_id',$id[1]);
									$this->db->select('pro_name')->from('tbl_inventory');
									$res = $this->db->get();
									$item = $res->row()->pro_name;
								}								
							}
					?>
					<tbody>
                    <tr>
					<?php //echo $staff_name;?>								
					  <td style="vertical-align: middle"><?php echo  date('d-m-Y',strtotime($invoice_dtls['treatment_date']));  ?></td>
                      <td style="vertical-align: middle"><?php echo $item ?></td>
                      <td style="vertical-align: middle;text-align:right"><?php echo $invoice_dtls['item_quantity']; ?></td>
                      <td style="vertical-align: middle;text-align:right"><?php echo $invoice_dtls['item_price']; ?></td>
                      <td style="vertical-align: middle;text-align:right"><?php echo $invoice_dtls['item_amount']; ?></td>
                    </tr>
                  </tbody>
				  <?php
						$sub_total += $invoice_dtls['item_amount'];
						
							}  
				  }  
						?>
                </table>
				
                <table align="center" width="94%">
                	<tr>
						<td style="vertical-align:top">
							<?php if($advanceBalance > 0) { ?>
							<div >
								<h5>Current Advance Balance  :  <?php echo number_format($advanceBalance,2,'.',''); ?></h5>
							</div>
							<?php } ?>
							<!--<div style="text-align:left;width:350px;">
								<strong><?php echo $invoice_hdr['notes']; ?></strong>
							</div>-->
							<?php
							$CI =& get_instance();
							$CI->load->model(array('registration_model','staff_model'));
							$enteredBy = $invoice_hdr['modify_by'];
							$profileInfo = $CI->registration_model->getProfileInfo($enteredBy);
							$staffInfo = $CI->staff_model->getStaffInfo($enteredBy);
							
							if($profileInfo != false)
								$clientName = $profileInfo['first_name'];
							else if($staffInfo != false)
								$clientName = $staffInfo['first_name'];
						?>
						<div>
						<h5>Notes :&nbsp;&nbsp;<?php echo $invoice_hdr['notes']; ?></h5>
						</div><div >
							<h5>Invoice generated by,</h5>
						</div>
						<div >
							<strong><?php echo $clientName.'.'; ?></strong>
						</div>
						<?php if($invoice_hdr['notes'] != '') { ?>
						
						
							
						
						<?php } ?>
						</td>
                    	<td align="right">
							<table class="table table-bordered table-invoice-full" style="width:80%;">
								  <tbody>
									<tr>
									  <td style="text-align:right"><strong>Subtotal</strong> <br>
										<?php if($invoice_hdr['tax_perc']!='0.00') { ?>
										<strong>Tax </strong> 
										<?php } ?>
										<?php if($invoice_hdr['discount_perc']!='0.00') { ?>
										<br><strong>Discount </strong></td>
										<?php } ?>
										
									  <td style="text-align:right"><strong>
									  <?php echo number_format($sub_total,2,'.',''); ?><br>
									  <?php if($invoice_hdr['tax_perc']!='0.00') {  $ta = ($sub_total * $invoice_hdr['tax_perc']/100);  echo number_format($ta,2,'.',''); } ?><br>
									  <?php if($invoice_hdr['discount_perc'] != '0.00'){  echo number_format($invoice_hdr['discount_perc'],2,'.',''); } ?>
									  </strong></td>
									</tr>
									<tr>
										 <td style="text-align:right"><strong>Total</strong> <br></td>
									  <?php 
									 if($invoice_hdr['tax_perc']!='0.00'){
										 $sub_total = ($sub_total * $invoice_hdr['tax_perc']/100);
									 }
									 $totl = ($sub_total - $invoice_hdr['discount_perc']);
									 ?>
									 <!-- <td style="text-align:right"><strong><?php echo number_format($invoice_hdr['net_amt'],2,'.',''); ?></strong><br>
									  </td>-->
									  <td style="text-align:right"><strong><?php echo number_format($totl,2,'.',''); ?></strong><br>
									  </td>
									</tr>
									<?php if($invoice_payment!=false){ ?>
									<tr>
										 <td style="text-align:right">
											<strong>Payments : </strong> <br>
											<?php foreach($invoice_payment as $payment_date){ 
											 echo date("F j, Y",strtotime($payment_date['payment_date'])).' (By '.$payment_date['payment_mode'].')';
											     
											 if($payment_date['payment_mode'] == 'Cash' || $payment_date['payment_mode'] == 'cash' && $payment_date['payment_mode'] == 'Advance' || $payment_date['payment_mode'] == 'advance'){
												
											   } else if($payment_date['payment_mode'] == 'Card payment' || $payment_date['payment_mode'] == 'card payment' ) { ?>
												  Card Name: <?php echo $payment_date['card_name']; ?>
												<?php } else if($payment_date['payment_mode'] == 'Cheque' || $payment_date['payment_mode'] == 'cheque') { 
												 ?></br>
											     Cheque No:<?php echo  $payment_date['cheque_no']; ?></br>
												 Bank: <?php echo $payment_date['bank']; ?>
												
												<?php } 	?><br>
											   
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
									  <!--<td style="text-align:right"><strong><?php echo number_format($invoice_hdr['net_amt'] - $invoice_hdr['paid_amt'],2,'.',''); ?></strong><br></td>-->
									  <td style="text-align:right"><strong><?php echo number_format($totl - $invoice_hdr['paid_amt'],2,'.',''); ?></strong><br>
									  </td>
									</tr>
								  </tbody>
							</table>
                        </td>
                    </tr>
                </table>
				<div style="text-align:center">
					<h5><?php if($invoice_hdr['inv_footer'] != ''){ echo $invoice_hdr['inv_footer']; } else { echo $profileInfo['footer']; } ?></h5>
				</div>
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