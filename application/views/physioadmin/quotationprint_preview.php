<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta https-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/x-icon" />
<title> Physio Plus Tech</title>
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
button:hover:before {content:"Quotation"}
</style>
<link href="<?php echo base_url(); ?>css/jquery.alerts.css" type="text/css" rel="stylesheet" />
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
			
			<table class="">
                  <tbody>
                    <tr>
                      <td width="300px">
						<table>
							<tr>
							<img src="<?php echo base_url() ?>frontend_assets/img/New%20Purple%20243x68px%20beta.png">
								
							</tr>
						</table>
                      </td>
					  <td width="500px">
						<table  style="margin-left:30px">
							<tr>
							  <td><h3>Physio Plus Tech</h3></td>
							</tr>
							<tr>
							  <td>180, Gnanagiri Road, Palaniandavarpuram Colony,</td>
							</tr>
							<tr>
							  <td>Sivakasi - 626123, Tamil nadu</td>
							</tr>
							
							<tr>
							  <td >Website : www.physioplustech.com</td>
							</tr>
							
							<tr>
							  <td >Email : contact@physioplusnetwork.com</td>
							</tr>
							<tr>
							  <td>Mobile : 9894604603</td>
							</tr>
							<tr>
							  <td>Phone: 04562222603</td>
							</tr>
							
							
							
							
							
							
						</table>
					  </td>
					 
                    </tr>	
                  </tbody>
                </table>
								
           
			<div class="row-fluid" style="margin-top: 15px">
			  
				 <table >
					<tr>
						<td> <div class="span6">
							<table class="table table-bordered table-invoice" style="width:300px;">
								<tr>
								  <td style="width:100px;">Quotation No:</td>
								  <td ><strong><?php $digits = 4;
                                      echo rand(pow(10, $digits-1), pow(10, $digits)-1);?>
									  </strong></td>
								</tr>
								<tr>
								  <td>Date : </td>
								  <td><strong><?php echo date("Y-m-d");?></strong></td>
								
								</tr>
								
							</table></div>
						</td>
						<td style="vertical-align:top"> <div class="span6">
							<table class="table table-bordered table-invoice" style="width:450px;height:113px;margin-left:10px;">
								<?php if($result != false){ 
						foreach ($result as $res) {
						?>
								<tr>
								  <td style="width:60px">To:</td>
									<td ><strong><?php echo $res['name']; ?></strong>
									<br><strong><?php echo $res['mobile']; ?></strong>
									<br><strong><?php echo $res['email']; ?></strong>
									
									
									  </td>
								  </tr>
								  <?php
								}  } ?>
						
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
					  
                      <th >Description</th>
                      <th >Cost</th>
                      <th >Recurrence</th>
                      <th >Total</th>
                    </tr>
                  </thead>
                  <?php if($result != false){ 
						foreach ($result as $res) {
							?>
					
					<tbody>
                    <tr>
					<?php if($res['plan_type'] !=false){ 
					
					 
					?>
					
					  <td style="vertical-align: middle"><?php echo $res['plan_type'];?></td>
					  <?php   
					  if($res['plan_type'] == 'Professional Plan')
					  {
						  $amount = 'Rs.3600 /-';
					  }
					  if($res['plan_type'] == 'Monetary Plan')
					  {
						  $amount = 'Rs.6000 /-';
					  }
					  if($res['plan_type'] == 'Enterprise Plan')
					  {
						  $amount = 'Rs.7200 /-';
					  }
					  if($res['plan_type'] == 'Ultimate Prescriber Plan')
					  {
						  $amount = 'Rs.8000 /-';
					  }  ?>
                      <td style="vertical-align: middle"><?php echo $amount;?></td>
                      <td style="vertical-align: middle;text-align:right">Yearly</td>
                      <td style="vertical-align: middle;text-align:right"><?php echo $amount;?></td>
					<?php } ?>
                    </tr>
					
					<tr>
					<?php if($res['location'] =='yes'){
						$amt1 = 'Rs.7000 /-'; ?>
					  <td style="vertical-align: middle">Additional location</td>
                      <td style="vertical-align: middle"><?php echo $amt1;?></td>
                      <td style="vertical-align: middle;text-align:right">Yearly</td>
                      <td style="vertical-align: middle;text-align:right"><?php echo $amt1;?></td>
                      <?php } ?>
                    </tr>
					<tr>
					<?php if($res['staff'] =='yes'){ 
					$amount = 'Rs.1200 /-';?>
					  <td style="vertical-align: middle">Additional staff login</td>
                      <td style="vertical-align: middle"><?php echo $amount;?></td>
                      <td style="vertical-align: middle;text-align:right">Yearly</td>
                      <td style="vertical-align: middle;text-align:right"><?php echo $amount;?></td>
                      <?php } ?>
                    </tr>
					<tr>
					<?php if($res['app'] =='yes'){
						$amount = 'Rs.5000 /-'?>
					  <td style="vertical-align: middle">Mobile App (Android only)</td>
                      <td style="vertical-align: middle"><?php echo $amount;?></td>
                      <td style="vertical-align: middle;text-align:right">One Time Payment</td>
                      <td style="vertical-align: middle;text-align:right"><?php echo $amount;?></td>
                      <?php } ?>
                    </tr>
					<tr>
					<?php if($res['offline'] =='yes'){
                        $amount = 'Rs.10,000 /-'	?>
					  <td style="vertical-align: middle">Software Offline Version</td>
                      <td style="vertical-align: middle"><?php echo $amount;?></td>
                      <td style="vertical-align: middle;text-align:right">One Time Payment</td>
                      <td style="vertical-align: middle;text-align:right"><?php echo $amount;?></td>
                      <?php } ?>
                    </tr>
					<tr>
					<?php if($res['features'] != '0'){ ?>
					  <td style="vertical-align: middle" colspan="3">Custom Features</td>
                      <td style="vertical-align: middle;text-align:right">Rs.<?php echo $res['features'];?>/-</td>
                      <?php } ?>
                    </tr>
                  </tbody>
				   <?php
								}  } ?>
								
								
                </table>
				
				
                
				<div style="text-align:center">
					<h5><?php echo $res['det'];?></h5>
				</div>
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