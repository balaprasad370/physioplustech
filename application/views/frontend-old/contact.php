<!DOCTYPE html>
 
 <html class="no-js" lang="en"> 

<head>
	<meta name="viewport" content="width=device-width" />
	<title>Physio Plus Tech</title> 

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" href="<?php echo base_url() ?>css/foundation.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>css/normalize.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>css/fgx-foundation.css" />
	<link rel='shortcut icon' href='<?php echo base_url() ?>images/favicon.ico' type='image/x-icon' />

	 
	<link rel="stylesheet" href="<?php echo base_url() ?>plugins/fontawesome/css/font-awesome.min.css">

	 
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url() ?>css/style.css" />
	
 
	<script src="<?php echo base_url() ?>js/vendor/jquery.js"></script>
	<script src="<?php echo base_url() ?>js/vendor/custom.modernizr.js"></script>
	
</head>
<body onload="initialize()">

 
<div class="main-wrapper">
	 
	<?php include ("header.php");?>
    </div>
       
      <iframe width="100%" height="400" style="frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
src="https://maps.google.co.in/maps?q=Physio+Plus+Sivakasi,+Sivakasi,+Tamil+Nadu&amp;hl=en&amp;sll=9.45702,77.797322&amp;sspn=0.047497,0.084028&amp;oq=physio+plus&amp;hq=Physio+Plus+Sivakasi,&amp;hnear=Sivakasi,+Virudhunagar,+Tamil+Nadu&amp;t=m&amp;ie=UTF8&amp;ll=9.456814,77.800125&amp;spn=0.023748,0.042014&amp;z=14&amp;iwloc=A&amp;cid=17475005918195933318&amp;output=embed">
</iframe>
    <div class="main-wrapper">       
	<div class="content_wrapper">
		<div class="row">
			
            			

			
			</div>
		</div>
	</div>
</div>   
<?php include ("footer.php");?>
<script src="<?php echo base_url() ?>js/foundation.min.js"></script>
<script src="<?php echo base_url() ?>js/foundation/foundation.js"></script>
<script src="<?php echo base_url() ?>js/foundation/foundation.topbar.js"></script>


<script src="<?php echo base_url() ?>js/app-head-calls.js"></script>
<script src="<?php echo base_url() ?>js/jquery.validate.min.js"></script>

 

<script type="text/javascript">
function initialize() {
var mapOptions = {
  center: new google.maps.LatLng(9.456859 , 77.800128),
  zoom: 13,
  mapTypeId: google.maps.MapTypeId.ROADMAP
};
var map = new google.maps.Map(document.getElementById("map_canvas"),
	mapOptions);
var myLatlng = new google.maps.LatLng(9.456859 , 77.800128);
var marker = new google.maps.Marker({
	position: myLatlng,
	title:"Address"
});

 
marker.setMap(map);
}
</script>      
<script>
	$(document).foundation();
</script>
</body>
</html>
