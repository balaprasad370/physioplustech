<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Physio Plus Tech</title>


<link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/x-icon" />

<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/uniform.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/select2.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/physio_style.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/physio_media.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>font-awesome/css/font-awesome.css" />
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo base_url(); ?>flick/jquery-ui-1.10.2.custom.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.gritter.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/colorbox.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/physio_helper.css" />
<link href="<?php echo base_url(); ?>css/jquery.alerts.css" type="text/css" rel="stylesheet" />
<style ="text/css">
button:hover span {display:none}
button:hover:before {content:"Invoice"}
</style></head>

<body style="background-color:#E7E7E7">
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
<tr>
<td align="center">
<menu class="no-print">
 
</menu>
<div class="row-fluid" style="width: 750px;" id="InvoiceContainer">
        <div class="widget-box" style="margin:0">
          <div class="widget-content">
            <div class="row-fluid">
				<div style="text-align:center"><button type="button" id="printButton" class="btn-success"><span>Print</span></button>
					</div>
                 <table class="">
                  <tbody>
                    <tr>
                      <td width="45%">
						<table  style="margin-left:30px">
							<tr>
							  <td><h3 >Physio Plus Tech</h3></td>
							</tr>
							<tr>
							  <td>180, Gnanagiri Road, Palaniandavarpuram Colony, </td>
							</tr>
							<tr>
							  <td>Sivakasi.</td>
							</tr>
							
						</table>
					  </td>
					  <td width="25%" style="text-align:right">
						 </td>
					  <td width="30%">
						<?php 
									echo '<img src="' . base_url() . 'frontend_assets/img/New%20Purple%20243x68px%20beta.png" >';
								?>
						  
                      </td>
                    </tr>
					<tr colspan="3"></tr>
					<tr>
					<td width="45%">
						<table  style="margin-left:30px">
							<tr>
							  <td><h2 >Invoice</h2></td>
							</tr>
							<tr>
							  <td> Submitted On : <?php echo date('d-m-Y',strtotime($invoiceDetails['date']));?> </td>
							</tr>
							
						</table>
					  </td>
					  <td width="25%">
					  </td>
					  <td width="35%">
					 	<?php $total = $invoiceDetails['total_amount']; ?>
					  </td>
					</tr>
                  </tbody>
                </table>
				</br></br>
				 <table class="">
                  <tbody>
                    <tr>
                      <td width="35%">
						<table  style="margin-left:20px">
						 <thead>
						 <tr>
						 <td width="35%"><strong>Invoice for</strong></td>
						 <td width="5%"></td>
						 <td width="33%" ><strong>Payable to</strong></td>
						 <td width="5%"></td>
						 <td width="33%" ><strong>Invoice #</strong></td>
						 
						 </tr>
						 </thead>
							<tr>
							  <td rowspan = "3" width="33%" ><p align="justify"><?php if($invoiceDetails['client_name'] == '') { echo  $clientDetails['clinic_name'].'</br>'.$clientDetails['address'];} else { echo $invoiceDetails['client_name']; } ?></p></td>							  <td width="5%"></td>
							  <td width="33%"><?php echo  'Ram Prakash'; ?></td>
							  <td width="5%"></td><td><?php echo $invoiceDetails['invoice_id'].date('mYd',strtotime($invoiceDetails['date'])); ?></td>
							  
							</tr>
							<tr>
							 <td width="5%"></td>
							  <td><strong><?php echo  'Physio Plus Tech'; ?></strong></td>
							  <td width="5%"></td>
							  <td><strong><?php echo 'Due Date'; ?></strong></td>
							  <td></td>
							</tr>
							<tr>
							  <td width="5%"></td>
							  <td>&nbsp;&nbsp;</td>
							  <td width="5%"></td><td><?php echo date('d-m-Y',strtotime($invoiceDetails['due_date'])); ?></td>
							</tr>
						</table>
					  </td>
					</tr>
				  </tbody>
				  </table>
				  </br>
				  <?php 
				$CI =& get_instance();
					$CI->load->model(array('admin'));
					$invoice_id = $invoiceDetails['invoice_id'];
					$Info = $CI->admin->get_det($invoice_id);
					if($invoiceDetails['amt_type'] != 'Rs') { $r  = '$'; } else { $r = 'Rs:'; }
					if($invoiceDetails['unit_price'] != '0') {
						$rate = $invoiceDetails['unit_price'];
					} else {
						if($invoiceDetails['plan'] == '1') { $rate = '300'; } else if($invoiceDetails['plan'] == '2') { $rate = '400'; } else if($invoiceDetails['plan'] == '3') { $rate = '500'; } else { $rate = 700; }
					}
					if($invoiceDetails['unit_priceloc'] != '0') {
						$l = $invoiceDetails['unit_priceloc'];
					} else {
						$l = '500';
					}
					if($invoiceDetails['unit_priceuse'] != '0') {
						$u = $invoiceDetails['unit_priceuse'];
					} else {
						$u = '100';
					}

					

				?>
				<table class="table table-bordered table-invoice">
								<tr>
								  <th>Description  </th>
								  <th> Quantity / License  </th>
								  <th>Unit price  </th>
								  <th>Total price  </th>
								</tr>
								<?php if($invoiceDetails['plan'] != '0'){ ?>
								<tr>
								 <td><?php if($invoiceDetails['plan'] == 4) { echo 'Ultimate Prescriber Plan'; } else if($invoiceDetails['plan'] == 3) { echo 'Enterprise Plan'; } else if($invoiceDetails['plan'] == 2) { echo 'Monetary Plan';  }  else if($invoiceDetails['plan'] == 1){ echo 'Professional Plan';} else { echo 'Free Plan'; }   ?></td>								  
								<td><?php echo round($invoiceDetails['duration']/30).' Months'; ?></td>
								<td><?php echo $r.' '.$rate; ?></td>
								<td style="text-align:right"><?php $info = $rate * round($invoiceDetails['duration']/30); echo $r.' '.$info; ?></td>
								
								</tr><?php } else { $info = 0; }   ?>
								<?php if(($invoiceDetails['users']-1) > '0' ) {  ?>
								<tr><td>Users</td><td><?php echo ($invoiceDetails['users']-1); ?></td><td><?php echo $r.' '.$u; ?></td><td style="text-align:right"><?php $val = ($invoiceDetails['users']-1) * $u; echo $r.' '.$val; ?></td></tr>
								<?php } else { $val = 0; }  if(($invoiceDetails['location']-1) > '0' ) { ?>
								<tr><td>Locations </td><td><?php echo ($invoiceDetails['location']-1); ?></td><td><?php echo $r.' '.$l; ?></td><td style="text-align:right" ><?php $val1 = ($invoiceDetails['location']-1) * $l; echo $r.' '.$val1;  ?></td></tr>
								<?php } else { $val1 = 0; }  ?>
								<?php if($invoiceDetails['sms'] != false ) {  ?>
							<tr><td>SMS</td><td><?php echo $invoiceDetails['sms']; ?></td>
							<?php   $total_sms_limit = $invoiceDetails['sms'];
									if($total_sms_limit == '25') { $val3 = '10'; } else if($total_sms_limit == '50') { $val3 = '25'; } else if($total_sms_limit == '100') { $val3 = '50'; } else if($total_sms_limit == '200') { 
									$val3 = '125'; } elseif($total_sms_limit == '400') { $val3 = '220';  }elseif($total_sms_limit == '500') { $val3 = '250';  }
									elseif($total_sms_limit == '1000') { $val3 = '500';  } elseif($total_sms_limit == '2000') { $val3 = '900';  } 
									elseif($total_sms_limit == '5000') { $val3 = '2250';  }  elseif($total_sms_limit == '10000') { $val3 = '4500';  } else { $val3 = '0';  }  
							?>
							<td><?php   echo $r.' '.$val3; ?></td>
							<td style="text-align:right"><?php  echo $r.' '.$val3; ?></td>
							</tr>
							<?php } else { $val3 = 0; } $rate = 0;
							if($invoiceDetails['item_id'] != false){
								$id = explode(',',$invoiceDetails['item_id']);
								$ite = explode(',',$invoiceDetails['item_quantity']);
						    for($i = 0; $i < count($id); $i++){
								$this->db->where('item_id',$id[$i]);
								$this->db->select('*')->from('admin_inv_item');
								$res = $this->db->get();
								
							?>
							<tr>
							<td><?php echo $res->row()->item_name;  ?></td><td><?php if($ite[$i] > 0){ echo $ite[$i]; } else { echo '1'; } ?></td>
							<td><?php echo $res->row()->item_price;  ?></td><td><?php echo $res->row()->item_price * $ite[$i];  ?></td>
							</tr>
							<?php $rate += $res->row()->item_price * $ite[$i]; } } 
							?>
							
							</table>
							<table >
							<tr>
							  <td style="margin-right:5px; width:45%;">  <?php if($invoiceDetails['notes'] != false){ echo 'Notes : '.$invoiceDetails['notes']; } ?> </td>
							<td style="width:5%;"></td>
							<td colspan="2">
							<table  style="margin-right:250px"  class="table table-bordered table-invoice">
							<tr><td style="text-align:right">Subtotal</td><td style="text-align:right"><?php $final = ($info+$val+$val3+$val1+$rate); echo $r.' '.$final ?></td></tr>
							<?php if($invoiceDetails['tax'] != false ) {  ?>
							<tr><td style="text-align:right">Tax (<?php $t = ($invoiceDetails['tax']/100) * $info; echo $invoiceDetails['tax'].'%'; ?>)</td>
							<td style="text-align:right"><?php $tax = $t; echo $r.' '.$t; ?></td>
							</tr>
								<?php }  else { $tax = 0; } if($invoiceDetails['discount'] != false ) { ?>
							<tr><td style="text-align:right">Discount (<?php $d = ($invoiceDetails['discount']/100) * $final; echo $invoiceDetails['discount'].'%'; ?>)</td>
							<td style="text-align:right"><?php $discount = $d; echo $r.' '.$d; ?></td>
							</tr>
								<?php } else { $discount = 0; }  ?>	
							<tr>
							<td style="text-align:right">Total</td>
							<td style="text-align:right" ><?php $res = ($final+$tax)-$discount; echo $r.' '.$res; ?></td>
							</tr>
							
							<tr>
							<td style="text-align:right">Total Paid <?php if($Info['pay_mode'] == 1) { echo '( By Cheque )' ;}  else if($Info['pay_mode'] == 3) { echo '( By card )'; } else if($Info['pay_mode'] == 4) { echo '( By Cash )'; } else { }  ?>  </td>
							<td style="text-align:right" ><?php if($invoiceDetails['status']== '1') { echo $r.' 0.00'; } else { if($Info['paid_amount'] != '') { echo 'Rs : '.$Info['paid_amount']; } else { echo $r.' '.$res;  }  } ?></td>
							</tr>
							<tr>
							<td style="text-align:right">Amount Due</td>
							<td style="text-align:right" ><?php if($invoiceDetails['status'] == '1') { echo $r.' '. $res; } else { if( $Info['paid_amount'] == false) { echo $r.' 0.00'; } else { $valus = $res - $Info['paid_amount']; echo $r.' '.$valus; } }  ?></td>
							</tr>
							</table>
</td></tr>
</table>							
            </div>
            
          </div>
        </div>
    </div>
</td>
</tr>
</table>
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