<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>free bootstrap template- Beta Landing Page</title>
     <!--REQUIRED STYLE SHEETS-->
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLE CSS -->
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- VEGAS STYLE CSS -->
    <link href="<?php echo base_url(); ?>assets/scripts/vegas/jquery.vegas.min.css" rel="stylesheet" />
       <!-- CUSTOM STYLE CSS -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />
     <!-- GOOGLE FONT -->
     <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
     <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    </head>
<body background="<?php echo base_url(); ?>images/tablet2.png">

    <div class="loader"></div>

    <!-- MAIN CONTAINER -->
    <div class="container-fluid">
        <!-- NAVBAR SECTION -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#" >BETA <i class="fa fa-plus"></i></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li ><a data-toggle="modal" data-target="#mAbout" href="#mHome"> ABOUT</a></li>
            <li><a data-toggle="modal" data-target="#mService" href="#mService">SERVICES</a></li>
            <li><a data-toggle="modal" data-target="#mContact" href="#myModal">CONTACT</a></li>
          </ul>
        </div>         
      </div>
    </div>
     <!-- END NAVBAR SECTION -->

         <!-- MAIN ROW SECTION -->
         <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-12">
                <div id="movingicon">
                      <i class="fa fa-flask fa-spin icon-color"></i>
                    <br />   
                  <div id="headLine"></div>   
                </div>              
            </div>
             <!--/. HEAD LINE DIV-->
            <div class="col-md-8 col-md-offset-2" >
                <div id="counter"></div>
                        <div id="counter-default" class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="inner">
                                    <div id="day-number" class="timer-number"></div>
                                    <div class="timer-text">DAYS</div>
                                   
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="inner">
                                    <div id="hour-number" class="timer-number"></div>
                                    <div class="timer-text">HOURS</div>
                                    
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="inner">
                                    <div id="minute-number" class="timer-number"></div>
                                    <div class="timer-text">MINUTES</div>
                                  
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="inner">
                                    <div id="second-number" class="timer-number"></div>
                                    <div class="timer-text">SECOND</div>

                                   

                                </div>
                            </div>
                        </div>
                
            </div>
               <!--/. COUNTER DIV-->
            <div class="col-md-6 col-md-offset-3">    
               
                <div class="input-group">    
      <input type="text" class="form-control">
                      <span class="input-group-btn">
        <button class="btn btn-primary" type="button">  <i class="fa fa-cog fa-spin subscribe-icon"></i> SUBSCRIBE ! </button>
      </span>
    </div>       
                   </div>
             <!--/. SUBSCRIBE DIV-->
            <div class="col-md-6 col-md-offset-3">
                 <div class="social-links" >
                     <a href="#" >  <i class="fa fa-facebook fa-4x"></i> </a>
                      <a href="#" >  <i class="fa fa-google-plus fa-4x"></i> </a>
                      <a href="#" >  <i class="fa fa-twitter fa-4x"></i> </a>
                      <a href="#" >  <i class="fa fa-linkedin fa-4x"></i> </a>
                      
                     </div>
            </div>
               <!--/. SOCIAL DIV-->
         </div>
     <!--END MAIN ROW SECTION -->
    </div>
      <!-- MAIN CONTAINER END -->
    <div class="modal fade" id="mAbout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel1"> <i class="fa fa-plus"></i> ABOUT BETA </h4>
	      </div>
	      <div class="modal-body">
		        <div class="mian-popup-body" >
                   <h1> <span class="fa fa-flask "></span> WHO WE ARE ?</h1>
		        	<div class="row">
		        	<p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Pellentesque volutpat, diam in accumsan scelerisque.
                       
		        	</p>
                    <h3> <span class="fa fa-cog fa-spin "></span> Our Aim</h3>
		        	<p>
		        		Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Pellentesque volutpat, diam in accumsan scelerisque, tellus 
                        ligula ullamcorper urna, sed luctus velit lacus sit amet sem. 
                       
		        	</p>
		        	 <h3> <span class="fa fa-glass"></span> Our Values</h3>
		        	<p>
		        		Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Pellentesque volutpat, diam in accumsan scelerisque, tellus 
                        ligula ullamcorper urna, sed luctus velit lacus sit amet sem. 
                        
		        	</p>
		        </div>
		        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary back-btn" data-dismiss="modal">CLOSE ME</button>
	      </div>
	    </div>
	  </div>
	</div>
     <!--/. ABOUT MODAL POPUP DIV-->
    <div class="modal fade" id="mService" tabindex="-1" role="dialog" aria-labelledby="mService1" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="mService1"> <i class="fa fa-plus"></i> OUR SERVICES </h4>
	      </div>
	      <div class="modal-body">
		        <div class="mian-popup-body">
                   <h1> <span class="fa fa-thumbs-o-up "></span> WHAT WE OFFER ?</h1>
		        	<div class="row">
		        	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Pellentesque volutpat, diam in accumsan scelerisque.
                        
		        	</p>
                    <h3> <span class="fa fa-cog fa-spin "></span> Responsive Design</h3>
		        	<p>
		        		Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Pellentesque volutpat, diam in accumsan scelerisque, tellus 
                        ligula ullamcorper urna, sed luctus velit lacus sit amet sem. 
                       
                       
		        	</p>
                      
                        <h3> <span class="fa fa-tint "></span> Unique Design</h3>
		        	<p>
		        		Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Pellentesque volutpat, diam in accumsan scelerisque, tellus 
                        ligula ullamcorper urna, sed luctus velit lacus sit amet sem. 
                       
		        	</p>
		        	
		        </div>
		        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary back-btn" data-dismiss="modal">CLOSE ME</button>
	      </div>
	    </div>
	  </div>
	</div>
     <!--/. SERVICES MODAL POPUP DIV-->
    <div class="modal fade" id="mContact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel"> <i class="fa fa-plus"></i> CONTACT US</h4>
	      </div>
	      <div class="modal-body">
              <div class="mian-popup-body">
                   <h1> <span class="fa fa-book "></span> REACH US</h1>
		        	<div class="row">
		        	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Pellentesque volutpat, diam in accumsan scelerisque.
                       
		        	</p>
                    <h3> <span class="fa fa-cog fa-spin "></span> Our Location</h3>
		        	<p>
		        		123 UA, Newyork Street, 2078. <br />
                        Call: +42-78-0090-00.
                         
		        	</p>
              <br/><br/>
		        	<div >
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2999841.293321206!2d-75.80920404999999!3d42.75594204999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew+York!5e0!3m2!1sen!2s!4v1395313088825" class="mymap" ></iframe>
					</div>
		        </div>
		        </div>
		        
	      </div>
	     <div class="modal-footer">
	        <button type="button" class="btn btn-primary back-btn" data-dismiss="modal">CLOSE ME</button>
	      </div>
	    </div>
	  </div>
	</div>
    <!--/. CONTACT MODAL POPUP DIV-->
     <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
     <!-- CORE JQUERY  -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-1.10.2.js"></script>
     <!-- BOOTSTRAP CORE SCRIPT   -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap.js"></script>
    <!-- COUNTDOWN SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery.countdown.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/countdown.js"></script>
    <!-- VEGAS SLIDESHOW SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/plugins/vegas/jquery.vegas.min.js"></script>
     <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
     
</body>
</html>
