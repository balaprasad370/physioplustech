<!DOCTYPE html>
<html lang="en">
<head>
<title><?php //echo ucfirst($this->session->userdata('username')); ?>Physio Plus Tech</title>

<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/x-icon" />

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/uniform.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/select2.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/physio_style.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/physio_media.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>font-awesome/css/font-awesome.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo base_url(); ?>flick/jquery-ui-1.10.2.custom.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.gritter.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/physio_helper.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.timepicker.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>lib/bootstrap-datepicker.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>lib/site.css" />

<style>
.row-fluid .span11 {
    width: 91.4894% !important;
}
</style>
</head>
<body  bgcolor="white" >
<form action="<?php echo base_url().'plugin/dashboard/add_rand' ?>" method="post" class="form-horizontal" id="PatientHistoryInfo" name="PatientHistoryInfo">
<div class="row-fluid" align="center" >
        <div class="span12">
        	<div class="widget-box" align="center" style="margin:0;">
                <div class="widget-box">
				<div  align="right">
				<a href="http://tnphysiodoctors.in/" class="btn btn-default" ><h2><font face="algerian" color="red" > X </font></h2></a>
                </div>
				  <div class="widget-content tab-content">
				  	&nbsp;&nbsp;&nbsp;<h2><center><b>Book Appointment</b></center></h2>
					<h5 text align="right">Powered by<img src="<?php echo base_url()?>img/NEW LOGO1.png" align="right" height="100px;" width="100px;"></img src></h5>
					
						
						<center><h4><font color="red">Your Appointment Has Been Requested Successfully!</font></h4></center>
						</br></br>
					<?php if($res != false ){ foreach($res->result_array() as $row ){ ?>
						<div id="tab2" class="tab-pane active">
						<div class="control-group">
						  <label class="control-label"><span style="color:#8A0808">*</span> Name</label>
						  <div class="controls">
						  
							 <?php $name = str_replace("%20"," ",$row['title']);  
							 echo $name; ?>
						  </div>
						</div>
						<div class="control-group">
							  <label class="control-label"><span style="color:#8A0808">*</span> Mobile </label>
							  <div class="controls">
								 <?php echo $row['har_mob_no'] ?>
							  </div>
						</div> 
						<div class="control-group">
						  <label class="control-label"><span style="color:#8A0808">*</span> Email </label>
						  <div class="controls">
							<?php echo $row['har_email']; ?>
						  </div>
						</div> 
						<div class="control-group">
							  </br></br>
							  <label class="control-label">Date of Appointment</label>
							  <div class="controls">
								<?php echo date('d-m-Y',strtotime($row['start'])); ?>
							  </div>
						</div></br>
						<div class="control-group">
						<label class="control-label">Appointment Time From:</label>
					    <div class="controls">
											 <?php echo date('h-i-s',strtotime($row['start'])); ?>
						 </div>
						</div>
						
						
					</div>
					<?php } 
					} ?>
				</div>
				</div>
				</div>
				</form>
			</div>
        </div>
        
    </div>
	</form>
    
<script src="<?php echo base_url(); ?>js/excanvas.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery-ui-1.10.2.custom.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.gritter.min.js"></script> 
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.uniform.js"></script> 
<script src="<?php echo base_url(); ?>js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.peity.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.colorbox-min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.form.js"></script> 
<script src="<?php echo base_url(); ?>js/physio_helper.js"></script>
<script src="<?php echo base_url(); ?>js/physio_controller.js"></script>
<script>
var openedGritter = null;
$(document).ready(function() {
	$('#doa').change(function(){
		var date = $('#doa').datepicker('getDate');
		var dayOfWeek = date.getUTCDay();
		var slide = $('#slot').val();
		if(dayOfWeek == '0')
		{
			var from = $('#monday_fn_from').val();
			var from2 = $('#monday_an_from').val();
			var to1 = $('#monday_fn_to').val();
			var to_to= $('#monday_an_to').val();
			
		}
		else if(dayOfWeek == '1')
		{
			var from = $('#tuesday_fn_from').val();
			var from2 = $('#tuesday_an_from').val();
			var to1 = $('#tuesday_fn_to').val();
			var to_to = $('#tuesday_an_to').val();
		}
		else if(dayOfWeek == '2')
		{
			var from = $('#wednesday_fn_from').val();
			var from2 = $('#wednesday_an_from').val();
			var to1 = $('#wednesday_fn_to').val();
			var to_to = $('#wednesday_an_to').val();
		}
		else if(dayOfWeek == '3')
		{
			var from = $('#thursday_fn_from').val();
			var from2 = $('#thursday_an_from').val();
			var to1 = $('#thursday_fn_to').val();
			var to_to = $('#thursday_an_to').val();
		}
		else if(dayOfWeek == '4')
		{
			var from = $('#friday_fn_from').val();
			var from2 = $('#friday_an_from').val();
			var to1 = $('#friday_fn_to').val();
			var to_to = $('#friday_an_to').val();
		}
		else if(dayOfWeek == '5')
		{
			var from = $('#saturday_fn_from').val();
			var from2 = $('#saturday_an_from').val();
			var to1 = $('#saturday_fn_to').val();
			var to_to = $('#saturday_an_to').val();
		}
		else
		{
			var from = $('#sunday_fn_from').val();
			var from2 = $('#sunday_an_from').val();
			var to1 = $('#sunday_fn_to').val();
			var to_to = $('#sunday_an_to').val();
		}
					
			if(slide == 30)
				 {
					
					 $('#time option[value!="0"]').remove();
					 for(var i = from ;i <= 12; i++)
					 {
						 if(i == 12)
						 {
							 $('#time').append('<option value="12:00 AM">12:00 AM</option>'); 
						 }
						 for(var j = 0; j <= 60;j = j+30)
						 {
							 if(i == 12)
							 {
								 
							 }
							 else
							 {
								 if(j == 0)
								 {
									var store = i + ':0' + j + ' AM';
								 }
								 else
								 {
									var store= i + ':' + j + ' AM'; 
								 }
								if(j == 60)
								{
									break;
								}
								
								$('#time').append('<option value="' + store  +'">' + store + '</option>');
						
							}
						 }
					 }
					 for(var i = 1 ;i < to_to ; i++)
					 {
						 if(i == 12)
						 {
							 $('#time').append('<option value="12:00 PM">12:00 PM</option>'); 
							 
							 
						 }
						 for(var j = 0;j <= 60;j = j+30)
						 {
							 if(i == 12)
							 {
								 
							 }
							 else
							 {
									 if(j == 0)
									 {
									var store=i + ':0' + j + ' PM';
									 }
									 else
									 {
										var store=i + ':' + j + ' PM'; 
									 }
									if(j == 60)
									{
										break;
									}
								 $('#time').append('<option value="' + store  +'">' + store + '</option>');
							}
						 }
					 }
					 
				 }
				 if(slide == 15)
				 {
					
					 $('#time option[value!="0"]').remove();
					 for(var i = from;i <= 12;i++)
					 {
						 if(i == 12)
						 {
							 $('#time').append('<option value="12:00 AM">12:00 AM</option>'); 
							
							
						 }
						 for(var j=0;j<=60;j=j+15)
						 {
							 if(i == 12)
							 {
								 
							 }
							 else
							 {
							 if(j == 0)
							 {
							var store=i + ':0' + j + ' AM';
							 }
							 else
							 {
								var store=i + ':' + j + ' AM'; 
							 }
							if(j == 60)
							{
								break;
							}
						 $('#time').append('<option value="' + store  +'">' + store + '</option>');
						 
						
						
						 }
						 }
					 }
					for(var i = 1;i<=to_to;i++)
					 {
						 if(i == 12)
						 {
							 $('#time').append('<option value="12:00 PM">12:00 PM</option>'); 
							 
							  
						 }
						 for(var j=0;j<=60;j=j+15)
						 {
							 if(i == 12)
							 {
								 
							 }
							 else
							 {
								 if(j == 0)
								 {
								var store=i + ':0' + j + ' PM';
								 }
								 else
								 {
									var store=i + ':' + j + ' PM'; 
								 }
								if(j == 60)
								{
									break;
								}
									$('#time').append('<option value="' + store  +'">' + store + '</option>');
							}
						 }
					 }
							
							
				
				 }
				else
				 {
					 $('#time option[value!="0"]').remove();
					 for(var i = 0;i <= 12;i++)
					 {
						 if(i == 12)
						 {
							 $('#time').append('<option value="12:00 AM">12:00 AM</option>'); 
							
				
						 }
						 for(var j=0;j<=60;j=j+60)
						 {
							 if(i == 12)
							 {
								 
							 }
							 else
							 {
							 if(j == 0)
							 {
							var store=i + ':0' + j + ' AM';
							 }
							 else
							 {
								var store=i + ':' + j + ' AM'; 
							 }
							if(j == 60)
							{
								break;
							}
						 $('#time').append('<option value="' + store  +'">' + store + '</option>');
						
					
						 }
						 }
					 }
					 for(var i = 1;i<= 12;i++)
					 {
						 if(i == 12)
						 {
							 $('#time').append('<option value="12:00 PM">12:00 PM</option>'); 
							
							
						 }
						 for(var j=0;j<=60;j=j+60)
						 {
							 if(i == 12)
							 {
								 
							 }
							 else
							 {
							 if(j == 0)
							 {
							var store=i + ':0' + j + ' PM';
							 }
							 else
							 {
								var store=i + ':' + j + ' PM'; 
							 }
							if(j == 60)
							{
								break;
							}
						 $('#time').append('<option value="' + store  +'">' + store + '</option>');
						
						
						 }
						 }
					 }
					 
				 } 
				
				 
	});  
	
	$('#time').change(function(){
			var doa=$('#doa').val();
			var final_doa=doa.replace("/", "-");
			var doa=final_doa.replace("/", "-");
			var date=doa.split('-');
			var final_date=date[2]+'-'+date[1]+'-'+date[0];
			spl=$('#date').val().split(',');
			var f = document.getElementById("time"); 
			var leng=$('select#time option').length;
			var time_sel=$('#time').val();
			for(var i=0;i<spl.length;i++)
			{
				var spl1=spl[i].split(' ');
				
					if(final_date == spl1[0])
					{	
						var opt =time_sel.split(" ");
							if(opt[1] == 'PM'){
								var opt_t=opt[0].split(':');
								var opt_t2 = parseInt(opt[0]) + parseInt(12);
								var opt_time =opt_t2+':'+opt_t[1]+':'+'00';
								
							}
							else {
								var opt_t=opt[0].split(':');
								if( opt_t[0] < 10 ){
								var opt_time = 0 + opt_t[0]+':'+opt_t[1]+':'+'00';
								}
								else {
									var opt_time = opt_t[0]+':'+opt_t[1]+':'+'00';
								}
							}
							if(spl1[1] == opt_time)
							{
								alert(spl1[1] +"  "+ "This Time Slot already Has Been Taken....");
								
							}
							else {
							}
							
						
						
					}
								
			}  
						
		}); 
	

});

</script>
</body>
</html>
