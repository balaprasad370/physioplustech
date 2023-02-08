<!DOCTYPE html>
 
 <html class="no-js" lang="en"> 

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<title>Physio Plus Tech</title>  

	 
	<link rel="stylesheet" href="<?php echo base_url() ?>plugins/smallipop/css/contrib/animate.min.css" type="text/css" media="all" title="Screen" />
	<link rel="stylesheet" href="<?php echo base_url() ?>plugins/smallipop/css/jquery.smallipop.css" type="text/css" media="all" title="Screen" />
	<link rel='shortcut icon' href='<?php echo base_url() ?>images/favicon.ico' type='image/x-icon' />

	 
	<link rel="stylesheet" href="<?php echo base_url() ?>css/normalize.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>css/foundation.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>css/fgx-foundation.css" />

	 
	<link rel="stylesheet" href="<?php echo base_url() ?>plugins/fontawesome/css/font-awesome.min.css">

	 
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo base_url() ?>css/style.css" />

	 
	<script src="<?php echo base_url() ?>js/vendor/jquery.js"></script>
	<script src="<?php echo base_url() ?>js/vendor/custom.modernizr.js"></script>
</head>
<body>

 
<div class="main-wrapper">
	 
	<?php include ("header.php");?>
</div> 
<div class="main-content-top">	
	<div class="main-wrapper">	
		<div class="row">
			<div class="large-6 columns">
				<h2>Pricing Plans</h2>
			</div>        
			<div class="large-6 columns">
				<ul class="breadcrumbs right">
					
					<li><a href="<?php echo base_url()?>">Home</a></li>
					
					<li><a href="<?php echo base_url().'frontend/pricing'?>">Pricing</a></li>
				</ul>
			</div>
		</div>
	</div>		
</div>
 
<div class="main-wrapper">
	<div class="row main-content"> 

    <div class="large-12 columns">
               
      <div class="row"> 
                
       	<div class="large-11 push-1 columns">
                    
         	
         	
      
            

			<div class="row">
                        	
			  <div class="large-4 columns" id="run">
		  
              <ul class="pricing-table">
				
					<li class="title">Free For Ever</li>
					<li class="price">Features</i></li>
					<h3><li class="bullet-item">Patient Manager</li></h3>
					<h4><li class="bullet-item">Appointment Manager</li></h4>
					<h4><li class="bullet-item">Referral Manager</li></h4>
					<h4><li class="bullet-item">Feedback Manager</li></h4>
					<h4><li class="bullet-item">Price : Free</li></h4>
					<li class="cta-button"><a class="button" href="<?php echo base_url() ?>registration">Sign Up</a></li>
					</ul>       
				 
							
			  </div>
			

              <div class="large-4 columns">
                            
				<ul class="pricing-table">
				
					<li class="title">Premium</li>
					
					<h3><li class="cta-button"><a class="button" >Get Your Own Clinic's Mobile app</a></li></h3>
					<h3><li class="bullet-item">Patient Manager</li></h3>
					<h4><li class="bullet-item">Appointment Manager</li></h4>
					<h4><li class="bullet-item">Referral Manager</li></h4>
					<h4><li class="bullet-item">Feedback Manager</li></h4>
					<h4><li class="bullet-item">Billing Manager</li></h4>
					<h4><li class="bullet-item">Exercise Prescriber</li></h4>
					<h4><li class="bullet-item">Physiotherapy specific EMR</li></h4>
					<h4><li class="bullet-item">Patient Login Via Your Website</li></h4>
					
					<h4><li class="bullet-item">Free Online Support</li></h4>
					
					<h4><li class="bullet-item">Enhanced Security</li></h4>
					<li class="price"><a class="button" href="<?php echo base_url().'frontend/request_quote'?>">Request Quote</a></li>
					
					<!--<li class="cta-button"><a class="button" href="<?php echo base_url() ?>pages/changeplan">Buy Now</a></li>-->
				</ul>                            
                            
              </div>                            

              <div class="large-4 columns">
                            
				<ul class="pricing-table">
					<li class="title">Corporate</li>
					<li class="price">Tailor Your Plan</li>
					<h3><li class="cta-button"><a class="button">Get Your Own Clinic's Mobile app</a></li></h3>
					<h3><li class="bullet-item">All Premium Features</li></h3>
					<h4><li class="bullet-item">Complete Customization</li></h4>
					<h4><li class="bullet-item">Customize URL</li></h4>
					<h4><li class="bullet-item">Exclusive Hosting Server</li></h4>
					<h4><li class="bullet-item">In campus Login Security</li></h4>
					<h4><li class="bullet-item">Optional Third Party Integrations</li></h4>
					
					<li class="cta-button"><a class="button" href="<?php echo base_url() ?>frontend/contact">Contact Us</a></li>
				</ul>                            
                            
              </div>                            
                        
            </div></br>
 
                                  
        </div>
            
                
      </div> 
        
    </div>

  </div>
  
</div>   
<?php include ("footer.php"); ?>
 
<script type="text/javascript" src="<?php echo base_url() ?>plugins/carouFredSel/jquery.carouFredSel-6.2.0-packed.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>plugins/carouFredSel/helper-plugins/jquery.touchSwipe.min.js"></script>
 
<script src="<?php echo base_url() ?>js/app-head-calls.js"></script>
<script src="<?php echo base_url() ?>js/foundation.min.js"></script>

<script>
$(document).foundation();
$(document).ready (function(){
$("#text").click (function(){
$('#run').css("background-color", "lightblue");
});
});

</script>  

 
<script type="text/javascript" src="<?php echo base_url() ?>plugins/smallipop/lib/contrib/prettify.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>plugins/smallipop/lib/jquery.smallipop.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>plugins/smallipop/lib/smallipop.calls.js"></script> 

 
<script src="<?php echo base_url() ?>js/app-bottom-calls.js"></script>

</body>
</html>