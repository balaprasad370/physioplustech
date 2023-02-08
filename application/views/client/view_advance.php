<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/x-icon" />
<title>Advance Print - Physio Plus Tech</title>
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
button:hover:before {content:"Advance"}
</style>
<link href="<?php echo base_url(); ?>css/jquery.alerts.css" type="text/css" rel="stylesheet" />
<style>
tr:hover{background:#f9f9f9;}
@media print
      {
	  
	   #printButton {

    display: none;

  }
  }
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
                      <td width="25%">
						<table>
							<tr>
								<?php
								if($clientDetails['logo'] != '') {
									echo '<img src="' . base_url() . 'uploads/logo/' . $clientDetails['logo'] . '"  width="200px;" height="200px;">';
								} else { if($this->session->userdata('client_id') == '6'){
									echo '<h4>'.ucfirst($clientDetails['branch_name']).'</h4.';
								} else {
									echo '<h4>'.ucfirst($clientDetails['clinic_name']).'</h4.';
								}	}
								?>
							</tr>
						</table>
						
                      </td>
					  
					  <td width="50%">
						<table  style="margin-left:30px">  
							<tr>
							  <td><h4><?php if($this->session->userdata('client_id') == '6'){
									echo '<h4>'.ucfirst($clientDetails['branch_name']).'</h4.';
								} else {  
									echo '<h4>'.ucfirst($clientDetails['clinic_name']).'</h4.';
								} ?></h4></td>
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
							</br></br></br><img src="<?php echo base_url().'images/Winner - Established Brands_Black.jpg';?>" style="width:120px;height:100px;" >&nbsp;&nbsp;&nbsp;&nbsp;
					 	<?php } else { echo '<h1><center><strong>Advance</strong></center></h1>'; } ?>
							
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
						<div id="content-header" >
						<?php if($this->session->userdata('client_id') != '1948') { ?>
							<h1><center><strong>Advance</strong></center></h1>
						<?php } else { } ?>
						</div>
					  </td>
			<?php }?><br>
                <table >
					<tr>
						<td style="vertical-align:top">
							<table class="table table-bordered table-invoice" style="width:300px;">
								<?php
									$age = ($advance['age'] > 0) ? '('.$advance['age'].')' : '';
								?>
								<tr>
								  <td style="width:80px">Bill  No :</td>
								  <td ><strong><?php echo $advance['bill_no']; ?></strong></td>
								</tr>
								<tr>
								  <td>Bill Date : </td>
								  <td><strong><?php echo date("M j, Y",strtotime($advance['advance_date']));?></strong></td>
								</tr>
								<tr>
								  <td>Notes : </td>
								  <td><strong><?php echo $advance['notes'];?></strong></td>
								</tr>
							</table>
						</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td style="vertical-align:top"> <div class="span6">
							<table class="table table-bordered table-invoice" style="width:350px;height:90px;margin-left:2px;">
								
								<tr>
								  <td style="width:60px">Advance From:</td>
									<td ><strong><?php echo ucfirst($advance['first_name']).' '.$advance['last_name'].' '.$age; ?></strong>
									<br><?php if($advance['address_line1'] != ''){ ?>
									<?php echo $advance['address_line1'];?><?php } ?>
									<?php if($advance['mobile_no'] != ''){ ?>
									Contact No : <?php echo $advance['mobile_no']; ?> 
									<?php } ?>&nbsp;</br>
									<?php if($advance['email'] != ''){ ?>
									  Email : <?php echo $advance['email']; ?> 
									  <?php } ?>
									</td>
								  </tr>
							</table></div>
						</td>
					</tr>
                  
                </table>
           
            <div class="row-fluid">
              <div class="span12">
                <table class="table table-bordered table-invoice-full">
                  <thead>
                    <tr>
					<th >Date</th>
                    <th >Advance amount<?php echo '('.$clientDetails['currency'].')' ;?></th>
                    <th >Payment Mode</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
					  <td style="vertical-align: middle;text-align:center"><?php echo $advance['advance_date'];  ?></td>
                      <td style="vertical-align: middle;text-align:center"><?php echo number_format($advance['advance_amount'],2,'.','');  ?></td>
                      <td style="vertical-align: middle;text-align:center"><?php echo $advance['payment_mode'];  ?></td>
                    </tr>
                  </tbody>
                </table>
				<div >
							
						</div>
						
				
				 <table align="center" width="100%">
                	<tr>
                    	<td align="right">
							<table class="table table-bordered table-invoice-full" style="width:50%;">
								  <tbody>
									<tr>
										 <td ><strong>Total</strong> <br></td>
									  <td ><strong><?php echo number_format($advance['advance_amount'],2,'.','').' '.$clientDetails['currency']; ?></strong><br>
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