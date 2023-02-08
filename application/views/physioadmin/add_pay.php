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
   <!-- <link href="<?php echo base_url() ?>admin_assets/plugins/pace/flash.css" rel="stylesheet" type="text/css"/>-->
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
  <body class="hold-transition sidebar-mini">
        <div class="wrapper">
                
                <?php $this->load->view('physioadmin/sidebar'); ?>
                <div class="content-wrapper">
                   <section class="content-header">
                        <div class="header-icon">
                            <i class="pe-7s-box1"></i>
                        </div>
                        <div class="header-title">
                            <form action="#" method="get" class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
                                <div class="input-group">
                                    <input type="text" name="q" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button type="submit" name="search" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form>   
                            <h1>Edit Invoice</h1>
                            <small>Edit Invoice</small>
                           
                        </div>
                    </section>
                    <section class="content">
                    <div class="row">
                      <div class="col-sm-12">
                       <div class="panel panel-bd ">
                        <div class="panel-body">
					    <form action="<?php echo base_url().'physioadmin/client_det/add_paydet/' ?>" method="post" class="form-horizontal" role="form" >
                       	 <div class="form-group">
                        <label for="input01" class="col-sm-4 control-label">Payment Mode :</label>
                        <div class="col-sm-8">
                         <select class="chosen-select chosen-transparent form-control" placeholder="select Name" name="pay" id="pay">
						  <option value="">Please Select</option>
							  <option value="1">Cheque</option>
							  <option value="2">Cash</option>
							  <option value="3">Card Payment</option>
						</select>
                        </div>
                      </div>
                      <?php $this->db->where('invoice_id',$invoice_id);
				$this->db->select('total_amount,discount')->from('tbl_client_invoice');
				$res = $this->db->get();
				$total = $res->row()->total_amount;
				$discount = $res->row()->discount;
				?>
				<input type="hidden" name="client_id" value="<?php echo $client_id; ?>" />
				<input type="hidden" name="invoice_id" value="<?php echo $invoice_id; ?>" />
				
                     <div class="form-group">
                        <label for="input01" class="col-sm-4 control-label">Discount :</label>
                        <div class="col-sm-8">
                       <input type="text" name="discount" id="discount" value="<?php  if($discount != false) { echo number_format($discount,2,'.',''); } else { echo '0.00'; }  ?>" class="form-control" />
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="input01" class="col-sm-4 control-label">Amount :</label>
                        <div class="col-sm-8">
                      <input type="text" name="amount" id="amount" value="<?php echo number_format($total,2,'.',''); ?>" class="form-control"/>
                        </div>
                      </div>
					<div class="che">
                      <div class="form-group">
                        <label for="input01" class="col-sm-4 control-label">Cheque No :</label>
                        <div class="col-sm-8">
                         <input type="text" name="che_no" id="che_no" class="form-control" />
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="input01" class="col-sm-4 control-label">Bank :</label>
                        <div class="col-sm-8">
                          <input type="text" name="bank" id="bank" class="form-control"/>
                        </div>
                      </div>
                      </div>
					 
					  <div class="form-group car" >
                        <label for="input01" class="col-sm-4 control-label">Name of the card:</label>
                        <div class="col-sm-8">
                          <input type="text" name="card_name" id="card_name" class="form-control" />
                        </div>
                      </div>
					<div class="form-group form-footer">
                        <div class="col-sm-offset-4 col-sm-8">
                          <button type="submit" class="btn btn-success">Save</button>
                          </div>
                    </div>
					</form>		
                    </div>
                </div>
            </div>
        </div>
    </section> 
</div>
<footer class="main-footer">
    <div class="pull-right hidden-xs"></div>
    <strong>© 2019 <a href="#">Physio Plus Tech</a></strong> All rights reserved.
</footer>
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
	$('.che').hide();
	$('.car').hide();
	$('#pay').change(function() {
		var payment  = $('#pay').val();
		alert(payment);
		if(payment == '1'){
			$('.che').show();
			$('.car').hide();
		} else if(payment == '3'){
			$('.che').hide();
			$('.car').show();
		} else {
			$('.che').hide();
			$('.car').hide();
		}
	});
	$('#discount').change(function() {
		var dis = $('#discount').val();
		var amount = $('#amount').val();
		var amt = (dis/100) * amount;
		var am = amount - amt;
		$('#amount').val(am);
	});
	$('#deactivate').click(function() {
	alert('dnhvfidj');
});

	
	  $('.delete').bind('click', function ()  {	
			 var invoice_id = $(this).attr('href').split('#')[1];
			 $.confirm({
             title: 'Confirmation',
             content: 'Are you sure you want to delete this patient?',
             confirmButton: 'Proceed',
             confirmButtonClass: 'btn-info',
             icon: 'fa fa-question-circle',
             animation: 'scale',
             animationClose: 'top',
             opacity: 0.5,
             confirm: function () {
				 
				 $.ajax({
						url : '<?php echo base_url().'physioadmin/client_det/invoice_delete' ?>',
						type: "POST",
						data : {i_id:invoice_id},
						dataType: 'json', 
						success:function(data, textStatus, jqXHR,form) 
						{
							$.alert('Invoice record has been deleted successfully!');
							setTimeout(function(){ 
								window.location.reload();
							}, 1000);
						},
						error: function(jqXHR, textStatus, errorThrown) 
						{
							$.alert('Invoice record has been deleted successfully!');
							setTimeout(function(){ 
								window.location.reload();
							}, 1000);
						}
				});
			 }
         });
		 return false; 
    });
	$('form').on('submit', function (event) {
				 event.preventDefault();
				 var $form = $(this);
				 var  formID = $(this).attr("id");
				 var  formURL = $(this).attr("action");
				 var button1 = $('#submit');
				 button1.prop('disabled', true);
						
				$.ajax({
					type: 'post',
					url: $(this).attr('action'),
					data:$(this).serialize(),
					success:function(data, textStatus, jqXHR,form) 
					{
						setTimeout(function () {
							toastr.success('Details has been saved Successfully', 'Successfully');
							window.location = '<?php echo base_url().'physioadmin/dashboard/invoice_gen' ?>';
						}, 1000);
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						setTimeout(function () {
							toastr.success('Details has not been saved Successfully', 'Failure');
							window.location = '<?php echo base_url().'physioadmin/dashboard/invoice_gen' ?>';
					   }, 1000);
					}
				  });
		}); 
      //chosen select input
      $(".chosen-select").chosen({disable_search_threshold: 4});
      
    })
      
    </script>
  </body>
</html>
      