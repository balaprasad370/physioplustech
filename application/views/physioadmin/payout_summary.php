<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Physio Plus Tech</title>
	<link rel="icon" type="image/ico" href="<?php echo base_url() ?>assets/images/favicon.ico" />
	<link href="<?php echo base_url() ?>admin_assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>
    <!--<link href="<?php echo base_url() ?>admin_assets/plugins/pace/flash.css" rel="stylesheet" type="text/css"/>-->
    <link href="<?php echo base_url() ?>admin_assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/themify-icons/themify-icons.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/dist/css/stylehealth.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/plugins/toastr/toastr.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/plugins/NotificationStyles/css/demo.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/plugins/NotificationStyles/css/ns-default.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/plugins/NotificationStyles/css/ns-style-growl.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/plugins/NotificationStyles/css/ns-style-attached.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/plugins/NotificationStyles/css/ns-style-bar.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/plugins/NotificationStyles/css/ns-style-other.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>admin_assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
   	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css"></head>
     <link href="<?php echo base_url() ?>admin_assets/plugins/toastr/toastr.css" rel="stylesheet" type="text/css"/>
   
  </head>
  <style>
  .invoice {
    position: relative;
    
}

 .invoice .tooltiptext {
    visibility: hidden;
    width: 50px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the invoice */
    position: absolute;
    z-index: 1;
}

.invoice:hover .tooltiptext {
    visibility: visible;
} 

  .edit {
    position: relative;
    
}

 .edit .tooltiptext {
    visibility: hidden;
    width: 50px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the invoice */
    position: absolute;
    z-index: 1;
}

.edit:hover .tooltiptext {
    visibility: visible;
} 
  .delete {
    position: relative;
   
}

 .delete .tooltiptext {
    visibility: hidden;
    width: 50px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the invoice */
    position: absolute;
    z-index: 1;
}

.delete:hover .tooltiptext {
    visibility: visible;
} 
</style>
  <body class="bg-1">

    
    
    <div id="wrap">
     <div class="row">
	<?php $this->load->view('physioadmin/sidebar');  ?>
       <div id="content" class="col-md-12">
          <div class="pageheader">
          <div class="breadcrumbs">
              
            </div>
         </div>
         <div class="main">
          <div class="row">
            <div class="col-md-12">
               <section class="tile transparent">
					<div class="tile-header transparent">
                    <h1><strong> Payout Summary </strong>  </h1>
                    
                    <div class="controls">
                      <a href="#" class="minimize"><i class="fa fa-chevron-down"></i></a>
                      <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
                      <a href="#" class="remove"><i class="fa fa-times"></i></a>
                    </div>
                  </div>
                  <div class="tile-body color transparent-black rounded-corners">
                     <div class="table-responsive">
					
					 <table  class="table table-datatable table-custom" id="basicDataTable">
                        <thead>
                          <tr>
                      <th>Client ID</th>
					  <th>User Name</th>
					  <th> Date</th>
					  <th> Amount</th>
					  <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
						<?php if($client_list != false){ 
							foreach($client_list as $client_lists){
								$this->db->where('client_id',$client_lists['client_id']);
								$this->db->where('pay','paid');
								$this->db->where('t_status','2');
								$this->db->select('SUM(amount) AS amount,ex_date,t_status')->from('prescription_detail');
								$res = $this->db->get();
								$amount = $res->row()->amount;
								$ex_date = $res->row()->ex_date;
								$t_status = $res->row()->t_status;
								
								$this->db->where('client_id',$client_lists['client_id']);
								$this->db->select('first_name,last_name')->from('tbl_client');
								$res = $this->db->get();
								$first_name = $res->row()->first_name;
								$last_name = $res->row()->last_name;
								
				  
				  ?>
						<tr>
							<input type="hidden" name="client_id" value="<?php echo $client_lists['client_id']; ?>">
					<td><?php echo $client_lists['client_id']; ?></td>
					<td><?php echo $first_name;  ?></td>
					<td><?php echo $ex_date; ?></td>
					<td><?php echo $amount; ?></td>
					<?php if($t_status != '1') { ?>
					<td><a href="<?php echo base_url().'physioadmin/client_det/payout_paid/'.$client_lists['client_id'] ?> " class="btn btn-info">Pay</td>
					<?php } else { ?>
					<td><?php echo 'Paid'; ?></td>
					<?php } } } ?>
						</tr>
                        </tbody>
                      </table>
					  <ul class="pager">
						<?php foreach ($links as $link) {
						 ?>
							<li>
							<?php echo $link; ?>
							</li>
						<?php } ?>
					  </ul>
						
                    </div>
                    </div>
					
                  </div>
                </section>
               </div>
              </div>
            </div>
      </div>
      </div>
   
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>admin_assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/plugins/lobipanel/lobipanel.min.js" type="text/javascript"></script>
        <!--<script src="<?php echo base_url() ?>admin_assets/plugins/pace/pace.min.js" type="text/javascript"></script>-->
        <script src="<?php echo base_url() ?>admin_assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/dist/js/custom1.js" type="text/javascript"></script>
		<script src="<?php echo base_url() ?>admin_assets/dist/js/custom.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/plugins/NotificationStyles/js/modernizr.custom.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/plugins/NotificationStyles/js/classie.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/plugins/NotificationStyles/js/notificationFx.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/plugins/NotificationStyles/js/snap.svg-min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/plugins/toastr/toastr.min.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
        <script src="https://select2.github.io/select2-bootstrap-theme/js/bootstrap.min.js"></script>
        <script src="https://select2.github.io/select2-bootstrap-theme/js/anchor.min.js"></script>
	<script>
	$('select').select2();
	$(document).ready(function() {

$('#SearchMe').click(function(e){
		e.preventDefault();
		var
		keyword = $('#keyword').val();
					
		if(keyword == '') {
			jAlert('Please enter search value.', 'Search error');
		} else {
			window.location = '<?php echo base_url(); ?>physioadmin/client_det/renewal/searchby/' + encodeURIComponent(keyword.replace(/\//g, '_'));
		}
	});

});	 
    </script>
  </body>
</html>
      
	  