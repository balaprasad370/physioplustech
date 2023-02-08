<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Physio Plus Tech</title>

     
    <link href="<?php echo base_url() ?>patient/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>patient/css/bootstrap-reset.css" rel="stylesheet">
     
    <link href="<?php echo base_url() ?>patient/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>patient/css/table-responsive.css" rel="stylesheet" />
     
    <link href="<?php echo base_url() ?>patient/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>patient/css/style-responsive.css" rel="stylesheet" />
 
  </head>

  <body>
	 <?php $this->load->view('patient/menu'); ?>
  <section id="container" class="">
       
      <section id="main-content">
          <section class="wrapper">
              
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Billing List
                          </header>
                          <div class="panel-body">
                              <section id="flip-scroll">
								<?php if( $invoice != false){ ?>
                                  <table class="table table-bordered table-striped table-condensed cf">
                                      <thead class="cf">
                                      <tr>
                                          <th><i class="fa fa-calendar"></i> Date</th>
                                          <th class="numeric"><i class="fa fa-tag"></i> Bill No</th>
                                          <th class="numeric"><i class="fa fa-inr"></i> Bill Amount</th>
                                          <th class="numeric"><i class="fa fa-thumbs-up"></i> Paid Amount</th>
                                          <th class="numeric"><i class="fa fa-thumbs-down"></i> Due Amount</th>
                                          <th class="numeric"><i class="fa fa-calendar"></i> Due Date</th>
                                          <th><i class="fa fa-credit-card"></i> Payment Mode</th>
                                          <th class="numeric"><i class="fa fa-edit"></i> Status</th>
                                          <th class="numeric"><i class="fa fa-cogs"></i> View</th>
                                      </tr>
                                      </thead>
                                      <tbody>
									  <?php foreach($invoice as $invoices) {
											$net_amt = $invoices['net_amt'];
											$paid_amt = $invoices['paid_amt'];
											$balance_amt = $net_amt - $paid_amt;
											$current_date = strtotime(date('Y-m-d'));
										?>
                                      <tr>
                                          <td><?php echo $invoices['treatment_date'] ?></td>
                                          <td><?php echo '<span class="badge bg-info">'.$invoices['bill_no'].'</span>'; ?></td>
                                          <td class="numeric"><?php echo number_format($invoices['net_amt'],2,'.',''); ?></td>
                                          <td class="numeric"><?php  echo number_format($invoices['paid_amt'],2,'.',''); ?></td>
                                          <td class="numeric"><?php  if($net_amt == $paid_amt) echo ''; else echo number_format($balance_amt,2,'.','');  ?></td>
                                          <td class="numeric"><?php echo $invoices['due_date'];  ?></td>
                                          <td class="numeric"><?php echo $invoices['payment_mode']; ?></td>
                                          <td class="numeric">
											<?php if($invoices['bill_status'] == 0){
													if(strtotime($invoices['due_date']) > $current_date)
														echo '<span class="label label-primary">Pending</span>';
													else
														echo '<span class="label label-danger">Overdue</span>';
												  } else { 
													echo '<span class="label label-success">Paid</span>';
						 	
												} ?>
										  </td>
										  <td class="numeric"><button class="btn btn-success btn-xs"><a href="<?php echo base_url().'patient/patient/invoice_view/'.$invoices['bill_no']; ?>" ><i class="fa fa-eye"></i></a></button></td>
                                      </tr>
									  <?php } ?>
                                      </tbody>
                                  </table>
								<?php } else {
									echo 'No Bill found';
								}
								?>
                              </section>
                          </div>
                      </section>
                  </div>
              </div>
              
          </section>
      </section>
       
      <footer class="site-footer">
          <div class="text-center">
              2013 &copy; FlatLab by VectorLab.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
       
  </section>

    
    <script src="<?php echo base_url() ?>patient/js/jquery.js"></script>
    <script src="<?php echo base_url() ?>patient/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url() ?>patient/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url() ?>patient/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url() ?>patient/js/respond.min.js" ></script>
     
    <script src="<?php echo base_url() ?>patient/js/common-scripts.js"></script>


  </body>
</html>
