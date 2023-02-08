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
					  <td width="250px" style="text-align:right">
						<div id="content-header" >
						 <h1><center><strong>Invoice</strong></center></h1>
						 
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
							<h1><center><strong>Invoice</strong></center></h1>
						<?php } else { } ?>
						</div>
					  </td>
			<?php } ?>
			</br>
			<strong>Date : &nbsp;&nbsp;<?php echo date('d/m/Y',strtotime($from)).'-'.date('d/m/Y',strtotime($to)); ?>
			</strong></br></br>
			
			<div class="row-fluid">
              <div class="span12">
                <table class="table table-bordered table-invoice-full">
                  <thead>
                         <tr>
 							<th><font color="black">Name</font></th>
							<th><font color="black">Mobile</font></th>
							<th><font color="black">Provisional Diagnosis</font></th>
							<th><font color="black"> Amount </font></th>
							</tr>
                        </thead>
                        <tbody>
						<?php
						
							foreach($patients as $row){  
								$CI =& get_instance();
							    $CI->load->model(array('common_model'));
							    $diag = $CI->common_model->get_provisional($row['patient_id']);
								$amount = $CI->common_model->get_invoiceamount($row['patient_id'],$from,$to);
								//$session = $CI->common_model->get_invoicesession($row['patient_id'],$from,$to);
								if($row['referal_id'] == $this->uri->segment(7)){
								
						?>
						<tr>

							<td><font color="black"><?php echo $row['first_name'].'  '.$row['last_name']; ?></font></td>
							<td><font color="black"><?php echo $row['mobile_no']; ?></font></td>
							<td><font color="black"><?php echo $diag['prov_diagnosis']; ?></font></td>
							<td><font color="black"><?php echo $amount; ?></font></td>
						</tr>
								<?php  } } ?>
						
                        </tbody></font>
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