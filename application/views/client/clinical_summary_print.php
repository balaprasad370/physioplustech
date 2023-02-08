<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta https-equiv="Content-Type" content="text/html; charset=utf-8" />
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
button:hover:before {content:"Report"}
</style>
<link href="<?php echo base_url(); ?>css/jquery.alerts.css" type="text/css" rel="stylesheet" />
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
			  
			  <?php if($result != false){  ?>
				<h5>Today's OP Patient List</h5>
						 <table  class="table table-bordered table-invoice" id="section-to-print">
                        <thead>
                         <tr>
							<th>Name</th>
							<th>Mobile no.</th>
							<th>Email</th>
							<th>Address</th>
						</tr>
						</thead>
                        <tbody>
						<?php
						
						foreach($result as $row){
						?>
						
						<tr>
							<td><?php echo $row['first_name'].'  '.$row['last_name']; ?></td>
							<td><?php echo $row['mobile_no']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['address_line1']; ?></td>
							
						  </tr>
						
						<?php
						
						}  ?>
						
						<tr>
						 
						<td></td>
						<td></td>
                        <td>Total </td>
						<td>
							<strong><?php echo $pat_rows.' Patients'; ?> </strong>
						</td>
						
						</tr>
                        </tbody>
						</table>
					  
					    <?php } ?>
						
						
				<?php if($tot_list_home != false){  ?>
				<h5>Today's Home Patient List</h5>
						 <table  class="table table-bordered table-invoice" id="section-to-print">
                        <thead>
                         <tr>
							<th>Name</th>
							<th>Mobile no.</th>
							<th>Email</th>
							<th>Address</th>
						</tr>
						</thead>
                        <tbody>
						<?php
						
						foreach($tot_list_home as $row){
						?>
						
						<tr>
							<td><?php echo $row['first_name'].'  '.$row['last_name']; ?></td>
							<td><?php echo $row['mobile_no']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['address_line1']; ?></td>
							
						  </tr>
						
						<?php
						
						}  ?>
						
						<tr>
						<td></td>
						<td></td>
						 
                        <td>Total </td>
						<td>
							<strong><?php echo $pat_rows.' Patients'; ?> </strong>
						</td>
						
						</tr>
                        </tbody>
						</table>
					  
					    <?php } ?>
						
						
						 <?php if($T_result != false){  ?>
				<h5>Treatment Protocols Wise</h5>
						 <table  class="table table-bordered table-invoice" id="section-to-print">
                        <thead>
                         <tr>
							 <th>Patient Name</th>
							<th>Date</th>
							<th>Treatment Name</th>
							<th>Consultant</th>
							<th>Session</th>
						</tr>
						</thead>
                        <tbody>
						<?php
						
						foreach($T_result as $row){
						?>
						
						<tr>
							<td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
							<td><?php echo $row['treatment_date']; ?></td>
							<td><?php echo $row['item_name'];?></td>
							<?php $this->db->select('*')->from('tbl_staff_info');
								  $this->db->where('staff_id',$row['staff_id']);
								  $query=$this->db->get();
								  $name = $query->row()->first_name; ?>
							<td><?php echo $name; ?></td>
							<td><?php echo $row['treatment_quantity'];?></td>
							
						  </tr>
						
						<?php
						
						}  ?>
						
						<tr>
						<td></td>
						<td></td>
						 <td></td>
                        <td>Total </td>
						<td>
							<strong><?php echo $T_patientCount.' Patients'; ?> </strong>
						</td>
						
						</tr>
                        </tbody>
						</table>
					  
					    <?php } ?>
						
						
						<?php if($session != false){  ?>
				<h5>Today's Daily Register List</h5>
						 <table  class="table table-bordered table-invoice" id="section-to-print">
                        <thead>
                         <tr>
							<th>Name</th>
							<th>Treatment</th>
							<th>Session</th>
							<th>Comments</th>
						</tr>
						</thead>
                        <tbody>
						<?php
						
						foreach($session as $row){
						?>
						
						<tr>
							<td><?php echo $row['fpatient_name'].'  '.$row['lpatient_name']; ?></td>
							<td><?php echo $row['item_name']; ?></td>
							<td><?php echo $row['Session_count']; ?></td>
							<td><?php echo $row['Comment_sess']; ?></td>
							
						  </tr>
						
						<?php
						
						}  ?>
						
						
                        </tbody>
						</table>
					  
					    <?php } ?>
					
               
			        <?php if($app != false){  ?>
					<h5>Today's Appointment List</h5>
			   <table  class="table table-bordered table-invoice" id="section-to-print">
                        <thead>
                         <tr>
							 <th>Appointment Date</th>
							  <th>Patient Name</th>
							<th>Start Time</th>
							<th>End Time</th>
							<th>Consultant Name</th>
							<th>Treatement Item</th>
						</tr>
						</thead>
                        <tbody>
						<?php
						
						foreach($app as $row){
						?>
						
						<tr>
							<td><?php echo date('d-m-Y',strtotime($row['start'])); ?></td>
							
							<td><?php echo $row['title']; ?></td>
							<td><?php echo date('H:i:s',strtotime($row['start'])); ?></td>
							<td><?php echo date('H:i:s',strtotime($row['end'])); ?></td>
							<td><?php echo $row['first_name']; ?></td>
							<td><?php echo $row['item_name']; ?></td>
						  </tr>
						
						<?php
						
						}  ?>
						
						<tr>
						 
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>Total</td>
						<td>
							<strong><?php echo $app_rows.' appointments'; ?> </strong>
						</td>
						
						</tr>
                        </tbody>
						</table>
					  
					    <?php } ?>
						
						
			        <?php if($invoice != false){  ?>
					<h5>Today's Invoice List</h5>
			   <table  class="table table-bordered table-invoice" id="section-to-print">
                        <thead>
                         <tr>
							 <th>Date</th>
                            <th>Bill no.</th>
                            <th>Patient Id</th>
                            <th>Patient name</th>
							<th>Payment mode</th>
                            <th>Bill amount</th>
                            <th>Paid amount</th>
							<th>Due amount</th>
						</tr>
						</thead>
                        <tbody>
						<?php 
						$billAmountTotal = 0;
						$paidAmountTotal = 0;
						$pendingAmountTotal = 0;					
						foreach ($invoice as $row) {
							 
						?>
						<tr>
						<td><?php echo date('d-m-Y',strtotime($row['treatment_date'])); ?></td>
							
							<td><?php echo $row['bill_no']; ?></td>
							
							<td><?php echo $row['patient_code']; ?></td>
							<td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
							<td><?php echo $row['payment_mode']; ?></td>
							<td><?php echo number_format($row['net_amt'],2,'.',''); ?></td>
							<td><?php echo number_format($row['paid_amt'],2,'.','') ; ?></td>
							<td></td>
							</tr>
						<?php 
						$billAmountTotal += $row['net_amt'];
						$paidAmountTotal += $row['paid_amt'];
						$pendingAmountTotal += $row['net_amt'] - $row['paid_amt'];
						 }  ?>
						<tr><td colspan="6">&nbsp;</td>
                        <td>Total</td><td><strong><?php echo number_format($billAmountTotal,2,'.',''); ?></strong></td></tr>
						
						<?php
						
						}  ?>
						
						
                        </tbody>
						</table>
						
						<?php if($T_expense != false){  ?>
						<h5>Today's Expense List</h5>
			   <table  class="table table-bordered table-invoice" id="section-to-print">
                        <thead>
                         <tr>
							 <th>Date</th>
                            <th>Bill no.</th>
                            <th>Vendor</th>
                            <th>Total Amount</th>
							
						</tr>
						</thead>
                        <tbody>
						<?php 
						foreach ($T_expense as $row) {
							 
						?>
						<tr>
						<td><?php echo $row['bill_date'];?></td>
						
							<td><?php echo $row['bill_no'];?></td>
							
							
							<td><?php echo $row['ventor']; ?></td>
							<td><?php echo $row['total_amt'];?></td>
							
							</tr>
						<?php }  ?>
						 
						<tr><td></td><td></td><td> Total </td><td><strong><?php echo $exp_rows.' expenses'; ?></strong></td></tr>
                        
						
						
						
                        </tbody>
						</table>
					  
					  <p style="float:right;"><strong>Total Amount : <?php echo $T_incomeAmt - $T_expenseAmt;?></strong> </p><?php
						
						}  ?></br>
				
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
	$('#printButton').click(function(e) {
        window.print();
    });
	parent.$.colorbox.resize({innerWidth:750, innerHeight: $('#InvoiceContainer').outerHeight() });
});
</script>
</body>
</html>