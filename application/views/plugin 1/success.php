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
	h3{
		color:black;
	}
</style>

<div class="container"> 

  <form id="contact" action="#" method="post">
  <div class="control-group">
  <font color="black"><p>Book Appointment</p></font>
  <font color="blue"><p>Powered by</p><img src="<?php echo base_url()?>img/NEW LOGO1.png" align="right" height="80px;" width="80px;"></img src></font>
  </div>
					<?php if($res != false ){ foreach($res->result_array() as $row ){ ?>
						<div class="control-group">
						<table >
						<tr>
						<td width="250px;">
						<p> Name </p>
						</td>
						<td width="20px;"></td>
						<td width="250px;">
						<p> <?php $name = str_replace("%20"," ",$row['title']);  
							 echo $name; ?></p>
					    </td>
						</tr>
						<tr><td colspan="3">&nbsp;&nbsp;</td></tr>
						<tr>
						<td width="250px;">
						<p> Mobile </p>
						</td>
						<td width="20px;"></td>
						<td width="250px;">
						<p>  <?php echo $row['har_mob_no'] ?></p>
						</td>
						</tr>
						<tr><td colspan="3">&nbsp;&nbsp;</td></tr>
						
						<tr>
						<td width="250px;">
						<p> Email </p>
						</td>
						<td width="20px;"></td>
						<td width="250px;">
						<p> <?php echo $row['har_email']; ?></p>
						
						</td>
						</tr>
						<tr><td colspan="3">&nbsp;&nbsp;</td></tr>
						
						<tr>
						<td width="250px;">
						<p> Date of Appointment </p>
						
						</td>
						<td width="20px;"></td>
						<td width="250px;">
						<p><?php echo date('d-m-Y',strtotime($row['start'])); ?> </p>
						</td>
						</tr>
						<tr><td colspan="3">&nbsp;&nbsp;</td></tr>
						<tr>
						<td width="250px;">
						<p> Appointment Time </p>
						</td>
						<td width="20px;"></td>
						<td width="250px;">
						<p><?php echo date('h:i a',strtotime($row['start'])); ?></p>
						</td>
						</tr>
						</table>
						</div>
						</br></br>
						<!--<div class="control-group">
						<label class="control-label">Appointment charge </label>
					    <div class="controls">
							<button class="btn btn-info" type="submit"><strong>Pay</strong></button>				
						 </div>
						</div>-->
						</br></br>
						<div class="control-group">
						<font color="red"><p>Please Note :</p></font>
						<p> This form sends a callback request to the doctor and is not a confirmation of your appointment. Your appointment will be confirmed once the doctor approves the same.</p>
						</div>
					
					<?php } } ?>
				
				
				</form>
			</div>
       
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
var openedGritter = null;
$(document).ready(function() {
	 
});

</script>
</body>

</html>