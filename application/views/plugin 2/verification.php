<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic);
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  -moz-font-smoothing: antialiased;
  -o-font-smoothing: antialiased;
  font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
}

body {
  font-family: "Roboto", Helvetica, Arial, sans-serif;
  font-weight: 100;
  font-size: 12px;
  line-height: 30px;
  color: #777;
  background: #2487EA;
}

.container {
  max-width: 400px;
  width: 100%;
  margin: 0 auto;
  position: relative;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="url"],
#contact textarea,
#contact button[type="submit"] {
  font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
}

#contact {
  background: #F9F9F9;
  padding: 25px;
  margin: 150px 0;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

#contact h3 {
  display: block;
  font-size: 30px;
  font-weight: 300;
  margin-bottom: 10px;
}

#contact h4 {
  margin: 5px 0 15px;
  display: block;
  font-size: 13px;
  font-weight: 400;
}

fieldset {
  border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="url"],
#contact textarea {
  width: 100%;
  border: 1px solid #ccc;
  background: #FFF;
  margin: 0 0 5px;
  padding: 10px;
}

#contact input[type="text"]:hover,
#contact input[type="email"]:hover,
#contact input[type="tel"]:hover,
#contact input[type="url"]:hover,
#contact textarea:hover {
  -webkit-transition: border-color 0.3s ease-in-out;
  -moz-transition: border-color 0.3s ease-in-out;
  transition: border-color 0.3s ease-in-out;
  border: 1px solid #aaa;
}

#contact textarea {
  height: 100px;
  max-width: 100%;
  resize: none;
}

#contact button[type="submit"] {
  cursor: pointer;
  width: 100%;
  border: none;
  background: #2487EA;
  color: #FFF;
  margin: 0 0 5px;
  padding: 10px;
  font-size: 15px;
}

#contact button[type="submit"]:hover {
  background: #43A047;
  -webkit-transition: background 0.3s ease-in-out;
  -moz-transition: background 0.3s ease-in-out;
  transition: background-color 0.3s ease-in-out;
}

#contact button[type="submit"]:active {
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
}

.copyright {
  text-align: center;
}

#contact input:focus,
#contact textarea:focus {
  outline: 0;
  border: 1px solid #aaa;
}

::-webkit-input-placeholder {
  color: #888;
}

:-moz-placeholder {
  color: #888;
}

::-moz-placeholder {
  color: #888;
}

:-ms-input-placeholder {
  color: #888;
}
.right {
		margin-top:100px;
		position: absolute;
		right: 100px;
		width: 200px;
		border: 3px;
		padding: 10px;
	}
</style>

<div class="container"> 

  <form id="contact" action="<?php echo base_url().'plugin/dashboard/verify' ?>" method="post">
  <h3 text align="center"><strong>Book Appointment</strong></h3>
  <h5 text align="right">Powered by<img src="<?php echo base_url()?>img/NEW LOGO1.png" align="right" height="80px;" width="80px;"></img src></h5>
  <fieldset>
      <h3> <font color="red">  Enter One Time Password In Your Mobile or Email Id </font> </h3>
  </fieldset> 
  <fieldset>
      <input type="hidden" name="random" id="random" value="<?php echo $rand ?>"/>
	  <input type="hidden" name="amt" id="amt" value="<?php echo $amount ?>"/>
	  <input type="hidden" name="apt_setting" id="apt_setting" value="<?php echo $apt ?>"/>
   </fieldset> 
	<fieldset>
       <input type="text" class="span11" id="rand" name="rand" autocomplete="off" />
   </fieldset>   
	<fieldset>
       <button type="submit" id="submit" class="btn btn-success">Confirm</button>
	</fieldset>   
	<fieldset>
        <input type="hidden" class="span11" id="mobile" name="mobile" value="<?php echo $mobile; ?>" autocomplete="off" />
		<!--<p>If you did not receive the OTP on SMS.You can&nbsp;&nbsp;<a href="<?php echo base_url().'plugin/dashboard/resend/'.$mobile.'/'.$rand.'/'.$amount ?>" id="resend"><u>click here to resend the SMS</u></a></p>-->
	</fieldset>   
	
        
    
	</form>
	
	</div>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
$('select').select2();
var openedGritter = null;
$(document).ready(function() {
	
 /* $('#submit').click(function() {
		var rand =$('#rand').val();
		var random =$('#random').val();
		var amt =$('#amt').val();
		var apt =$('#apt_setting').val();
		var c_id ="<?php echo $this->session->userdata('client_id') ?>";
		if(rand == random && apt == 'paid'){
			gritter = $.gritter.add({title:	'Saving',text:	'Appiontment Has been Booked Successfully..', sticky: true});
			setTimeout(function() {
					window.location="<?php echo base_url() ?>plugin/dashboard/add_app/" + c_id +'/'+ amt;
			},1000 );	
		}
		else if(rand == random && apt == 'free'){
			gritter = $.gritter.add({title:	'Saving',text:	'Appiontment Has been Booked Successfully..', sticky: true});
			setTimeout(function() {
					window.location="<?php echo base_url() ?>plugin/dashboard/success/";
			},1000 );	
		}
		else {
			gritter = $.gritter.add({title:	'Error',text:	'Please Check Your Mobile Number', sticky: true});
			setTimeout(function() {
					window.location="<?php echo base_url() ?>plugin/dashboard/remove";
			},1000 );	
		}
	}); */
							
	

});

</script>
</body>

</html>