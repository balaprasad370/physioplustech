<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Physio Plus Tech</title>
        <link rel="stylesheet" href="https://codepen.io/gymratpacks/pen/VKzBEp#0">
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <style>
		*, *:before, *:after {  
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  font-family: 'Nunito', sans-serif;
  color: #384047;
}

form {
  max-width: 300px;
  margin: 10px auto;
  padding: 10px 20px;
  background: #e6eafa;
  border-radius: 8px;
}

h1 {
  margin: 0 0 30px 0;
  text-align: center;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #3b62ff;
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 100%;
  border: 1px solid #3b62ff;
  border-width: 1px 1px 3px;
  
  margin-bottom: 10px;
}

fieldset {
  margin-bottom: 30px;
  border: none;
}



@media screen and (min-width: 480px) {

  form {
    max-width: 880px;
  }

}
 
/* #signature {
    min-width:auto !important;
    min-height: auto !important;
  } */
  
#signature {
  width:auto;
  box-shadow: 0 0 5px 1px #ddd inset;
  border:dashed 2px #53777A;
  border: dashed 1px #53777A;
  margin:0;
  text-align:bottom;
  min-height:180px;
  min-width:200px;
  transition:.2s;
}
#signature_capture {  
  width:100%; 
  height:1em; 

}
.jSignature{
	min-height:250px;
    min-width:250px;
}
</style>		
    </head>
    <body>
      <div class="row">
    <div class="col-md-12">
      <form action="<?php echo base_url().'pages/consent_formadd' ?>" method="post">
        <h1> TELEHEALTH ROOM </h1>
        <fieldset>
          
        1. I hereby authorize <?php echo $clinic_name; ?> to use the telehealth from Physio Plus Tech for telecommunication for evaluating, testing, diagnosing and providing medical advice or treatments for me.</br></br>
		2. I understand that technical difficulties may occur before or during the telehealth sessions and my appointment cannot be started or ended as intended.</br></br>
		3. I accept that the professionals can contact interactive sessions with video call; however, I am informed that the sessions can be conducted via regular voice communication if the technical requirements such as internet speed cannot be met.</br></br>
		4. I understand that, in case my current insurance may not cover the additional fees of the telehealth practices and I may be responsible for any fee that my insurance company does not cover.</br></br>
		5. I accept that my telehealth consultant can invite other health care consultants for further assistance in evaluating, testing, diagnosing and providing medical advice or treatments for me.</br></br>
		6. I agree that my medical records on telehealth can be kept for further evaluation, analysis and documentation, and in all of these, my information will be kept private.</br></br> </fieldset>
        <p style="text-align:center;">Use your mouse cursor or the tip of your finger to sign below</p>
										<input type="hidden" id="chatroom" value="<?php echo $chatroom; ?>" name="chatroom" />
										<input type="hidden" id="appoint_id" value="<?php echo $appoint_id; ?>" name="appoint_id" />
										<input type="hidden" id="patient_id" value="<?php echo $detail['patient_id']; ?>" name="patient_id" />
										<input type="hidden" id="client_id" value="<?php echo $detail['client_id']; ?>" name="client_id" />
										 
                                        <div id="signature"></div>
										 </br>
										<div class="" align="center"><b>(Patient's Signature)</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
	                                     </br>		
	
										  <div class="divider"></div>
                                            <div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary" id="save">Submit</button>
											</center>
                                            </div>
											 <p>
										<label for="signature_capture"></label>
										<textarea id="signature_capture" name="contractdata"></textarea>
									  </p>
										 </form>
       </form>
        </div>
      </div>
	  <div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Consent form Has Been Added Successfully</div></div></div>
    
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script></body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
<script src='https://cdn.rawgit.com/willowsystems/jSignature/master/libs/jSignature.min.js'></script>  
<script>
  $(document).ready(function() {
 $('form').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var id = $('#appoint_id').val();
		 var chatroom = $('#chatroom').val();
		 var button = $('#save');
		 button.prop('disabled',true);
		$.ajax({
            type: 'post',
            url: formURL,
            data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				$('#toast-container').show();
				setTimeout(function(){ 
				window.location="<?php echo base_url().'pages/join/' ?>"+id+'/'+chatroom;
				}, 1000); 
				 
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$('#toast-container1').delay(5000).fadeOut(400);
				setTimeout(function(){ 
			    window.location.reload();
				}, 1000);  
			}
      }); 
		}
		else{
			
		}
		
}); 
});  

// Uses jSignature for signature imput: https://willowsystems.github.io/jSignature/
$('#signature_capture').hide();
$('#signature').jSignature();
var $sigdiv = $('#signature');
var datapair = $sigdiv.jSignature('getData', 'svgbase64');

$('#signature').bind('change', function(e) {
  var data = $('#signature').jSignature('getData');
  $("#signature_capture").val(data);
  
  //$("#help").slideDown(300);
});

$('#reset').click(function(e){
  $('#signature').jSignature('clear');
  $("#signature_capture").val('');
  //$("#help").slideUp(300);
  e.preventDefault();
});
</script>  
    </body>
</html>