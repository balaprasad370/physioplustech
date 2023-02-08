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
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/jquery-confirm.css" /> 
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/sticky.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-confirm.js"></script>
  
  
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
                             Appointment List
                          </header>
                          <div class="panel-body">
                              <section id="flip-scroll">
							  <?php if($this->session->flashdata('message1')): echo '<div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>'.$this->session->flashdata('message1').'</div>'; endif; ?>
   								<?php if( $appointments != false){ ?>
                                  
								  <table class="table table-bordered table-striped table-condensed cf">
                                      <thead class="cf">
                                      <tr>
                                          <th> Date</th>
										  <th class="numeric"> Patient Name</th>
                                          <th class="numeric"> From Time</th>
                                          <th class="numeric"> To Time</th>
                                          <th class="numeric"> Status</th>
										  
                                      </tr>
                                      </thead>
                                      <tbody>
									  <?php foreach($appointments as $row) {
									  ?>
                                      <tr>
                                          <td><?php echo date('Y-m-d',strtotime($row['appointment_from'])); ?></td>
										  <td><?php echo $row['title']; ?></td>
										  <td><?php echo date('g:i A',strtotime($row['start'])); ?></td>
                                          <td><?php echo date('g:i A',strtotime($row['end'])); ?></td>
                                          <td><?php if($row['t_status'] == '0') { echo 'Confirmed'; } else { echo 'Pending'; } ?></td>
										  <!--<td><a href="<?php echo base_url().'patient/patient/reschedule/'.$row['appointment_id'] ?>" ><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a class="delete" href="<?php echo base_url().'patient/patient/delete_appointment/'.$row['appointment_id'] ?>" ><i class="fa fa-trash-o"></i></a></td>-->
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
	<script>
	$(function(){
		$('.delete').bind('click', function ()  {	
			 var patient_id = $(this).attr('href').split('#')[1];
			 $.confirm({
             title: 'Confirmation',
             content: 'Are you sure you want to delete this Appointment?',
             confirmButton: 'Proceed',
             confirmButtonClass: 'btn-info',
             icon: 'fa fa-question-circle',
             animation: 'scale',
             animationClose: 'top',
             opacity: 0.5,
             confirm: function () {
				 
				 $.ajax({
						url : '<?php echo base_url().'patient/patient/delete_appointment' ?>',
						type: "POST",
						data : {p_id:patient_id},
						dataType: 'json', 
						success:function(data, textStatus, jqXHR,form) 
						{
							$.alert('Patient record has been deleted successfully!');
							setTimeout(function(){ 
								window.location.reload();
							}, 1000);
						},
						error: function(jqXHR, textStatus, errorThrown) 
						{
							$.alert('Patient record has been deleted successfully!');
							setTimeout(function(){ 
								window.location.reload();
							}, 1000);
						}
				});
			 }
         });
		 return false;
    });
		
	})
	</script>
  </body>
</html>
