<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="shortcut icon" href="img/favicon.jpg">

    <title>Physio Plus Tech</title>

     
    <link href="<?php echo base_url() ?>patient/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>patient/css/bootstrap-reset.css" rel="stylesheet">
     
    <link href="<?php echo base_url() ?>patient/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link href="<?php echo base_url() ?>patient/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>patient/css/gallery.css" />

    
    <link href="<?php echo base_url() ?>patient/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>patient/css/style-responsive.css" rel="stylesheet" />

     
  </head>

  <body>

  <section id="container" class="">
      <?php $this->load->view('patient/menu'); ?>
       
      <section id="main-content">
          <section class="wrapper">
              
              <section class="panel">
                  <header class="panel-heading">
                      Exercise	 
                  </header>
                  <div class="panel-body">
                      <ul class="grid cs-style-3">
					  <?php foreach($Exe_list as $lists){ ?>
                          <li>
                              <figure>
                                  <img src="<?php echo $lists['img_path']; ?>" alt="img04" height="200" width="200">
                                  <figcaption>
                                      <h3><?php echo  $lists['title']; ?></h3> 
                                      <span>Physio Plus Tech </span>
                                      <a class="fancybox" rel="group" href="<?php echo $lists['img_path']; ?>">Full View</a>
                                  </figcaption>
                              </figure>
                          </li>
					  <?php } ?>
                          
                      </ul>

                  </div>
              </section>

              
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
    <script src="<?php echo base_url() ?>patient/assets/fancybox/source/jquery.fancybox.js"></script>
    <script src="<?php echo base_url() ?>patient/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url() ?>patient/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>patient/js/respond.min.js" ></script>

    <script src="<?php echo base_url() ?>patient/js/modernizr.custom.js"></script>
    <script src="<?php echo base_url() ?>patient/js/toucheffects.js"></script>


     
    <script src="<?php echo base_url() ?>patient/js/common-scripts.js"></script>

  <script type="text/javascript">
      $(function() {
      
          jQuery(".fancybox").fancybox();
      });

  </script>


  </body>
</html>
