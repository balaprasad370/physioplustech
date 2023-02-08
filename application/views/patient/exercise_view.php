<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Physio Plus Tech</title>

    
    <link href="<?php echo base_url() ?>patient/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>patient/css/bootstrap-reset.css" rel="stylesheet">
     
    <link href="<?php echo base_url() ?>patient/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <link href="<?php echo base_url() ?>patient/css/tasks.css" rel="stylesheet">

      
    <link href="<?php echo base_url() ?>patient/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>patient/css/style-responsive.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>patient/css/table-responsive.css" rel="stylesheet" />
     

  </head>

  <body>

  <section id="container" class="">
	<?php $this->load->view('patient/menu'); ?>
       
      <section id="main-content">
          <section class="wrapper">
              
              <div class="row">
                  <div class="col-md-12">
                      <section class="panel tasks-widget">
                          <header class="panel-heading">
                              Exercise list
                          </header>
                          <div class="panel-body">
                              <div class="task-content">
                                  <ul class="task-list">
									<?php
										if($Exe_list != false){
										foreach($Exe_list as $lists){ 
									?>
                                      <li>
                                           <a href="<?php echo base_url().'patient/patient/exercise_view/'.$lists['chard_no'] ?>"><div class="task-title">
                                             <span class="task-title-sp"><?php echo $lists['chart_name']; ?></span>
                                              <span class="badge badge-sm label-success">2 Days</span>
                                              <div class="pull-right">
                                                  <button class="btn btn-success btn-xs"><i class=" fa fa-check"></i></button>
                                                  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                                  <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                              </div>
                                          </div></a>
                                      </li>
									<?php 
									} 
										}else{
											echo 'Chart List is Empty';
										}
									?>
                                  </ul>
                              </div>
                          </div>
                      </section>
                  </div>
              </div>
               
          </section>
      </section>
       
      <footer class="site-footer">
          <div class="text-center">
              2015 &copy; Physio Plus Tech.
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
    <script src="<?php echo base_url() ?>patient/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>patient/js/respond.min.js" ></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    
    <script src="<?php echo base_url() ?>patient/js/common-scripts.js"></script>
    <script src="<?php echo base_url() ?>patient/js/tasks.js" type="text/javascript"></script>
    <script>
      jQuery(document).ready(function() {
          TaskList.initTaskWidget();
      });

      $(function() {
          $( "#sortable" ).sortable();
          $( "#sortable" ).disableSelection();
      });

    </script>

  </body>
</html>
