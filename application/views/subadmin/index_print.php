<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta https-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/x-icon" />
<title>  - Physio Plus Tech</title>
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
          	<div class="row-fluid" style="text-align:center"></div>
            <div class="row-fluid">
			
			<table class="">
                  <tbody>
                    <tr>
                      <td width="300px">
						<table>
							<tr>
							<img src="https://www.physioplustech.in/images/physio-tech.png">
								
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
								  <td style="width:100px;">Invoice No. :</td>
								  <td ><strong><?php $digits = 5;
                                      echo rand(pow(10, $digits-1), pow(10, $digits)-1);?></strong></td>
								</tr>
								<tr>
								  <td>Date : </td>
								  <td><strong><?php echo date("Y-m-d");?></strong></td>
								
								</tr>
								
							</table></div>
						</td>
						<td style="vertical-align:top"> <div class="span6">
							<table class="table table-bordered table-invoice" style="width:450px;height:113px;margin-left:10px;">
								
								<tr>
								  <td style="width:60px"> To :</td>
									<td ><strong><?php echo $result['first_name'];?></strong></br>
									<?php if($result['address'] != false){ ?>
									<strong><?php echo $result['address'];?></strong>
									<br><?php } ?>
									<strong><?php echo $result['email'];?></strong>	
									<br><strong><?php echo $result['mobile'];?></strong>
									
									
									  </td>
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
					  <th >No</th>	
                      <th >Description</th>
                      <th >Rate</th>
                      <th >Total</th>
                    </tr>
                  </thead>
                  
					
					<tbody>
                    <tr>
					<td style="vertical-align: middle">1</td>
					  <td style="vertical-align: middle">Software Subscription (2019 - 2020) </td>
                      <td style="vertical-align: middle">Rs.8,000 /- </td>
                      <td style="vertical-align: middle;text-align:right">Rs.8,000 /- </td>
                      
                    </tr>
					
					
					
                  </tbody>
				  
                </table>
				<table align="center" width="100%">
                	<tr>
						<td style="vertical-align:top">
							
							<div >
								<h5></h5>
							</div>
							
							
						<div>
						<h5></h5>
						</div><div >
							<h5>Invoice generated by,</h5>
						</div>
						<div >
							<strong>&nbsp;&nbsp;   PHYSIO PLUS TECH</strong>
						</div>
						
						</td>
                    	<td align="right">
							<table class="table table-bordered table-invoice-full" style="width:80%;">
								  <tbody>
									<tr>
									  <td style="text-align:right"><strong>Subtotal</strong> <br>
										
										</td>
									
									  <td style="text-align:right">Rs.8,000 /-<strong>
									   </strong></td>
									</tr>
									<tr>
									  <td style="text-align:right"><strong>Discount</strong> <br>
										
										</td>
									
									  <td style="text-align:right">Rs.2,000 /-<strong>
									   </strong></td>
									</tr>
									<tr>
										 <td style="text-align:right"><strong>Total</strong> <br></td>
									  <td style="text-align:right"><strong>Rs.6,000 /-</strong><br>
									  </td>
									</tr>
									
								
								  </tbody>
							</table>
                        </td>
                    </tr>
                </table>
                
				<div style="text-align:center">
					<h5>*** This is computer generated invoice no signature required. ***</h5>
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
