<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta https-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/x-icon" />
<title>  - Physio Plus Tech</title>
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/sticky.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/moment.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/amcharts.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/serial.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pie.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/morris.css">
<style ="text/css">
button:hover span {display:none}
button:hover:before {content:"Income Charts"}
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
					  <td width="250px" style="text-align:right">
						<div id="content-header" >
						 <?php if($this->session->userdata('client_id') == '2'){ ?>
							</br><img src="<?php echo base_url().'images/Winner - Established Brands_Black.jpg';?>" style="width:120px;height:100px;" >
					 	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php } else { ?>
						<h2 style="color:#348AC9"><strong>Reports</strong></h2>
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
                <?php if($tr_list != false){ ?>
						<?php if($this->uri->segment(4) == 'both')	{ ?>  
								   <h5 class="card-title" style="text-transform:capitalize;"><?php echo $name.' Performance Report based on Daily Register ('.date('d-m-Y', strtotime($this->uri->segment(5))) .' and '.date('d-m-Y', strtotime($this->uri->segment(6))) .' )'; ?></h5>
                                 <?php } else { ?>
								   <h5 class="card-title" style="text-transform:capitalize;"><?php echo $name.' Performance Report based on Daily Register ('.date('d-m-Y', strtotime('-30 days')) .' and '.date('d-m-Y').' )'; ?></h5>
                                 <?php } ?><table  class="table table-bordered table-custom" id="basicDataTable">
                        <thead>
                         <tr>
                                               <th class="text-center">S.No</th>
												<th class="text-center">Date</th>
												<th class="text-center">Patient Name</th>
												<th class="text-center">Treatment Name</th>
												<th class="text-center">No of Session</th>
												<th class="text-center">Bill Status</th>
												 
                                            </tr>
										</thead>
										<tbody>
										  <tbody>
															
									       <?php $i = 1; foreach($tr_list as $row) { 
										   $this->db->where('patient_id',$row['patient_id']);
												$this->db->where('treatment_date',date('y-m-d', strtotime($row['sn_date'])));
												$this->db->select('bill_status')->from('tbl_patient_treatment_techniques');
												$res = $this->db->get();
												if($res->result_array() != false){
												$bill_status = $res->row()->bill_status;
												} else {
												$this->db->where('patient_id',$row['patient_id']);
												$this->db->where('treatment_date',date('y-m-d', strtotime($row['sn_date'])));
												$this->db->select('bill_id')->from('tbl_invoice_header');
												$query = $this->db->get();
												if($query->result_array() != false){
												$bill_status = '1';
												} else {
												$bill_status = 0;
												}
												} ?>
                                            <tr>
                                               <td class="text-center"><?php echo $i; $i++; ?></td>
						                       <td class="text-center"><?php echo $row['sn_date']; ?></td>
						                       <td class="text-center"><?php echo $row['fpatient_name'].$row['lpatient_name']; ?></td>
						                       <td class="text-center"><?php echo $row['item_name']; ?></td>
						                       <td class="text-center"><?php echo $row['Session_count']; ?></td>
						                     <td class="text-center"> <?php if($bill_status == '1') { 
												 echo 'Bill Generated';
											 } ?> </td> </tr>
                                             <?php } ?>
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
<script src="<?php echo base_url(); ?>assets/print/js/jquery.gritter.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/print/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/print/js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/print/js/jquery.peity.min.js"></script>
<script src="<?php echo base_url(); ?>assets/print/js/jquery.colorbox-min.js"></script>
<script src="<?php echo base_url(); ?>assets/print/js/jquery.form.js"></script> 
<script src="<?php echo base_url(); ?>assets/print/js/jquery.alerts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/morris.min.js"></script>
 <script src="http://18.139.248.5/assets/js/vendor/rickshaw/raphael-min.js"></script> 
    <script src="http://18.139.248.5/assets/js/vendor/rickshaw/d3.v2.js"></script>
    <script src="http://18.139.248.5/assets/js/vendor/rickshaw/rickshaw.min.js"></script>
   
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