<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/x-icon" />
<title>Expense Print - Physio Plus Tech</title>
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
button:hover:before {content:"Expense"}
</style>
<link href="<?php echo base_url(); ?>assets/print/css/jquery.alerts.css" type="text/css" rel="stylesheet" />
<style>
tr:hover{background:#f9f9f9;}
</style>
<style>
@media print {
 header, footer { 
    visibility: hidden !important;
    display: none !important;
 }
}
@media print
      {
	  
	   #printButton {

    display: none;

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
						<table  style="margin-left:30px">
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
			
			<?php }?>
			<div class="row-fluid" style="margin-top: 15px">
			  
				 <table >
					<tr>
						<td> <div class="span6">
							<table class="table table-bordered table-invoice" style="width:300px;">
								<tr>
								  <td style="width:100px;">Vendor Name</td>
								  <td ><strong><?php echo $expinfo['ventor']; ?></strong></td>
								</tr>
								<tr>
								  <td>Date : </td>
								  <td><strong><?php echo $expinfo['bill_date'] ?></strong></td>
								
								</tr>
								<tr>
								  <td>Due Date :</td>
								  <td><strong><?php echo $expinfo['due_date'] ?></strong></td>
								</tr>
							</table></div>
						</td>
						
						<td > 
						<div class="span6">
							<table class="table table-bordered table-invoice" style="width:300px;margin-left:10px;">
								<tr>
								  <td style="width:100px;">Bill No</td>
								  <td ><strong><?php echo $expinfo['bill_no']; ?></strong></td>
								</tr>
								<tr>
								  <td>P.O./S.O : </td>
								  <td><strong><?php echo $expinfo['POSO'] ?></strong></td>
								
								</tr>
								<tr>
								  <td>Notes :</td>
								  <td><strong><?php echo $expinfo['notes'] ?></strong></td>
								</tr>
							</table></div>
						</td>
					</tr>
                  
                </table>
				</div>            
			
            <div class="row-fluid">
              <div class="span12">
                <table class="table table-bordered table-invoice-full">
                  <thead>
                    <tr>
					       <th>Item Code</th>
					       <th>Item</th>
                           <th>Quantity</th>
                            <th>Price</th>
							<th>Amount</th>
                    </tr>
                  </thead>
                  
					
					<tbody>
					<?php if($expansedet != false){
					  foreach($expansedet as $row){ ?>
                    <tr>
					  <td style="vertical-align: middle"><?php echo 'EXP-'.$row['bill_no']; ?></td>
                      <td style="vertical-align: middle"><?php echo $row['item_id']; ?></td>
                      <td style="vertical-align: middle;text-align:right"><?php echo $row['item_quantity']; ?></td>
                      <td style="vertical-align: middle;text-align:right"><?php echo $row['item_price']; ?></td>
                      <td style="vertical-align: middle;text-align:right"><?php echo $row['item_amount']; ?></td>
                    </tr>
					<?php } ?>
                  </tbody>
				 
                </table>
				<?php }  ?>
				
				
				<table align="center" width="100%">
                	<tr>
                    	<td align="right">
							<table class="table table-bordered table-invoice-full" style="width:50%;">
								  <tbody>
									<tr>
										 <td ><strong>Sub-total</strong> <br></td>
									  <td ><strong>Rs.<?php echo $expinfo['amount']; ?></strong><br>
									  </td>
									</tr>
									<tr>
										 <td ><strong>Tax (%)</strong> <br></td>
									  <td ><strong><?php echo $expinfo['tax_perc']; ?></strong><br>
									  </td>
									</tr>
									<tr>
										 <td ><strong>Total</strong> <br></td>
									  <td ><strong>Rs.<?php echo $expinfo['total_amt']; ?></strong><br>
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