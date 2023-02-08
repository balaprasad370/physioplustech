<!DOCTYPE html>
<html>
  <head>
    <title>Physio Plus Tech</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8" />
	<link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/images/favicon.ico" />
    <link href="<?php  echo base_url();  ?>assets/css/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="<?php  echo base_url();  ?>assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php  echo base_url();  ?>assets/css/vendor/animate/animate.css">
    <link type="text/css" rel="stylesheet" media="all" href="<?php  echo base_url();  ?>assets/js/vendor/mmenu/css/jquery.mmenu.all.css" />
    <link rel="stylesheet" href="<?php  echo base_url();  ?>assets/js/vendor/videobackground/css/jquery.videobackground.css">
    <link rel="stylesheet" href="<?php  echo base_url();  ?>assets/css/vendor/bootstrap-checkbox.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/chosen/css/chosen.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/chosen/css/chosen-bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/datepicker/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/colorpicker/css/bootstrap-colorpicker.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/colorpalette/bootstrap-colorpalette.css">
	<link rel="stylesheet" href="<?php  echo base_url();  ?>assets/js/vendor/modals/css/component.css">
	<link href="<?php echo base_url() ?>assets/css/minimal.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/js/vendor/datatables/css/dataTables.bootstrap.css">
	<link rel="stylesheet" href="<?php  echo base_url();  ?>assets/css/vendor/bootstrap/bootstrap-dropdown-multilevel.css">
    <link type="text/css" rel="stylesheet" media="all" href="<?php  echo base_url();  ?>assets/js/vendor/mmenu/css/jquery.mmenu.all.css" />
    <link rel="stylesheet" href="<?php  echo base_url();  ?>assets/js/vendor/chosen/css/chosen.min.css">
    <link rel="stylesheet" href="<?php  echo base_url();  ?>assets/js/vendor/chosen/css/chosen-bootstrap.css">
    <link rel="stylesheet" href="<?php  echo base_url();  ?>assets/js/vendor/datatables/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="<?php  echo base_url();  ?>assets/js/vendor/datatables/css/ColVis.css">
    <link rel="stylesheet" href="<?php  echo base_url();  ?>assets/js/vendor/datatables/css/TableTools.css">
	<link href="<?php  echo base_url();  ?>assets/css/minimal.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/jquery-confirm.css" /> 
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/sticky.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-confirm.js"></script>
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
                            $CI =& get_instance();
				            $CI->load->model(array('anotherdb_model'));
							$profileInfo = $CI->anotherdb_model->get_username($client_lists['event_id']);
					if($profileInfo['last_name'] != 0){
						$name = $profileInfo['first_name'].' '.$profileInfo['last_name'];
					} else {
						$name = $profileInfo['first_name'];
					}
					?>
						<tr>
							<input type="hidden" name="client_id" value="<?php echo $client_lists['user_id']; ?>">
					<td><?php echo $profileInfo['userid']; ?></td>
					<td><?php echo $name;  ?></td>
					<td><?php echo date('d-m-Y',strtotime($client_lists['date'])); ?></td>
					<td><?php echo $client_lists['amount']; ?></td>
					<?php if($client_lists['status'] != '1') { ?>
					<td><a href="<?php echo base_url().'physioadmin/client_det/payout_paid/'.$client_lists['event_id'] ?> " class="btn btn-primary">Pay</td>
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
    
	
    <section class="videocontent" id="video"></section>
	<script src="<?php  echo base_url();  ?>assets/js/vendor/bootstrap/bootstrap-dropdown-multilevel.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php  echo base_url();  ?>assets/js/vendor/mmenu/js/jquery.mmenu.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php  echo base_url();  ?>assets/js/vendor/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php  echo base_url();  ?>assets/js/vendor/nicescroll/jquery.nicescroll.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php  echo base_url();  ?>assets/js/vendor/animate-numbers/jquery.animateNumbers.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php  echo base_url();  ?>assets/js/vendor/videobackground/jquery.videobackground.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php  echo base_url();  ?>assets/js/vendor/blockui/jquery.blockUI.js" type="text/javascript"></script>
	 <script src="<?php echo base_url() ?>assets/js/vendor/momentjs/moment-with-langs.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/datepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/colorpalette/bootstrap-colorpalette.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/minimal.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datatables/ColReorderWithResize.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datatables/colvis/dataTables.colVis.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datatables/tabletools/ZeroClipboard.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datatables/tabletools/dataTables.tableTools.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="<?php  echo base_url();  ?>assets/js/vendor/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php  echo base_url();  ?>assets/js/vendor/datatables/colvis/dataTables.colVis.min.js" type="text/javascript"></script>
    <script src="<?php  echo base_url();  ?>assets/js/vendor/datatables/tabletools/ZeroClipboard.js" type="text/javascript"></script>
    <script src="<?php  echo base_url();  ?>assets/js/vendor/datatables/tabletools/dataTables.tableTools.min.js" type="text/javascript"></script>
    <script src="<?php  echo base_url();  ?>assets/js/vendor/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="<?php  echo base_url();  ?>assets/js/minimal.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	<script>
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
      
	  