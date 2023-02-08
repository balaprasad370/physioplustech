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
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/morris.css">
 
<script language="javascript" type="text/javascript" src="http://18.139.248.5/assets/js/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.peity.min.js"></script> 
 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/moment.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/daterangepicker.js"></script>
   	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/amcharts.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/serial.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pie.js"></script>
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
						<h2 style="color:#348AC9"><strong>Income</strong></h2>
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
			<div class="row">
			  <div class="col-md-12">
			   <h5><strong><?php echo $name; ?> Income Reports </strong> chart</h5>
			   <div id="line-area-example" style="height: 250px; width:96%;"></div>
			   </div>
			</div>
			<div class="row-fluid">
              <div class="span12">
                <?php if($result != false){ ?>
						<h4>Summary Of Practice Revenue Overtime (<?php echo $from.''.$to; ?>)</h4>  
						<table  class="table table-bordered table-invoice" id="section-to-print">
                         <thead>
                          <tr>
                            <th>S.No</th>
							<th>Date</th>
							<th>Amount</th>
                          </tr>
                         </thead>
                        <tbody>
						<?php $i = 1; foreach($result as $row) { ?>
						<tr>
						<td><center><?php echo $i; $i++; ?></center></td>
						<td><center><?php echo $row['date']; ?></center></td>
						<td><center><?php echo $row['total']; ?></center></td>
						</tr>
						<?php } ?>
						</tbody>
						</table>
						<?php } ?>
                       <?php if($result1 != false){ ?>
						<div class="row">
							<h4>&nbsp;&nbsp;Summary Of revenue by practitioner</h4>
                            <div class="col-md-12 text-center">
                            <span id="sparkline03"></span>
                            </div>
                         </div>
                          </br>  
						 <table  class="table table-bordered table-invoice" id="section-to-print">
                         <thead>
                          <tr>
                            <th>S.No</th>
							<th>Staff Name</th>
							<th>Amount</th>
							<th>Discounts</th>
							<th>Total</th>
                          </tr>
                        </thead>
                        <tbody>
						<?php $i = 1; $amt = 0; foreach($result1 as $row) { ?>
						<tr>
						<td><?php echo $i; $i++; ?></td>
						<td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
						<td><?php echo $row['tot']; ?></td>
						<td><?php echo $row['discount']; ?></td>
						<td><?php echo $row['total']; ?></td>
						</tr>
						<?php $amt  += $row['total']; } ?>
						<tr><td colspan="4"> <center>Total </center></td><td><?php echo $amt; ?></td></tr>
						</tbody>
						</table>
						<?php } ?>
						
						<?php if($result2 != false){ ?>
						 <div class="row">
							<h4>&nbsp;&nbsp;Summary Of revenue by item type</h4>
                            <div class="col-md-12 text-center">
                            <span id="sparkline04"></span>
                            </div>
                         </div></br> 
						 <table  class="table table-bordered table-invoice" id="section-to-print">
                         <thead>
                          <tr>
                            <th>S.No</th>
							<th>Item Name</th>
							<th>Amount</th>
                          </tr>
                        </thead>
                        <tbody>
						<?php $i = 1; $amt = 0; foreach($result2 as $row) {
                           $this->db->where('item_id',$row['item_id']);
						   $this->db->select('item_name')->from('tbl_item');
						   $res = $this->db->get();
						   if($res->result_array() != false){
						   $item_name = $res->row()->item_name;
						   } else {
							   $item = $row['item_id'];
							   $val = explode('/',$item);
							   if($val[0] == 'PR'){
								   $this->db->where('product_id',$val[1]);
						           $this->db->select('item_name')->from('tbl_product_info');
						           $q = $this->db->get();
								   $item_name = $q->row()->item_name;
							   }
							   
						   }
						?>
						<tr>
						<td><?php echo $i; $i++; ?></td>
						<td><?php echo $item_name; ?></td>
						<td><?php echo $row['total']; ?></td>
						</tr>
						<?php $amt  += $row['total']; } ?>
						<tr><td colspan="2"> <center>Total </center></td><td><?php echo $amt; ?></td></tr>
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
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.sparkline.min.js"></script>	
<script src="<?php echo base_url(); ?>assets/js/morris.min.js"></script>
<script src="http://18.139.248.5/assets/js/vendor/rickshaw/raphael-min.js"></script> 
<script src="http://18.139.248.5/assets/js/vendor/rickshaw/d3.v2.js"></script>
<script src="http://18.139.248.5/assets/js/vendor/rickshaw/rickshaw.min.js"></script>
<script type="text/javascript">
$(function(){
		 var val = <?php echo json_encode($result); ?>;
		if(val != false){
			 Morris.Area({
				element: 'line-area-example',
				data: val,
				xkey: 'date',
				ykeys: ['total'],
				labels: ['Total'],
				lineColors:['#a2d200'],
				lineWidth:'0',
				grid: false,
				fillOpacity:'0.5'
			 });
			 $('#line-area-example').show();
			 $('.spin').hide();
		 } else {
			 $('#line-area-example').hide();
			 $('.spin').text('No records Found');
		 }
		var val1 = <?php echo json_encode($result4); ?>;
		if(val1 != false){
		 $('#sparkline03').sparkline(val1, {
			type: 'pie',
			width: 'auto',
			height: '250px',
			sliceColors: ['#22beef','#a2d200','#ffc100','#ff4a43']
         }); 
		}
		var val2 = <?php echo json_encode($result3); ?>;
		if(val2 != false){
		 $('#sparkline04').sparkline(val2, {
			type: 'pie',
			width: 'auto',
			height: '250px',
			sliceColors: ['#22beef','#a2d200','#ffc100','#ff4a43']
         }); 
		}   
	
	$('#printButton').click(function(e) {
        window.print();
    });
	parent.$.colorbox.resize({innerWidth:750, innerHeight: $('#InvoiceContainer').outerHeight() });
});
</script>
</body>
</html>