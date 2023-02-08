<title>Physio Plus Tech</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <link rel="icon" type="image/ico" href="<?php echo base_url()?>assets/images/favicon.ico" />
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

  <form id="contact" action="<?php echo base_url().'plugin/dashboard/add_rand' ?>" method="post">
	
	<?php $this->db->select("start")->from('tbl_appointments');
						$this->db->where('client_id',$this->session->userdata('client_id'));
						$result=$this->db->get();
						
						
						if($result->result_array() != false) {
						foreach($result->result_array() as $row) 
						{
							$start[]=$row['start'];
							
						} 
						
						$date=implode(',',$start);
						$spl_id=explode(',',$date);
						for($i=0;$i<count($start);$i++)
						{	?>
							
						<?php }  ?>
						
						<input type="hidden" name="date" id="date" value="<?php echo $date; ?>" /> 
						<?php } else { } ?>	
						<?php if($sch_slot != false){ foreach($sch_slot as $sch){ ?>
						
						<input type="hidden" name="monday_fn_from" id="monday_fn_from" value="<?php echo $sch['monday_fn_from']; ?>" />
						<input type="hidden" name="monday_fn_to" id="monday_fn_to" value="<?php echo $sch['monday_fn_to']; ?>" />
						<input type="hidden" name="monday_an_from" id="monday_an_from" value="<?php echo $sch['monday_an_from']; ?>" />
						<input type="hidden" name="monday_an_to" id="monday_an_to" value="<?php echo $sch['monday_an_to']; ?>" />
						<input type="hidden" name="tuesday_fn_from" id="tuesday_fn_from" value="<?php echo $sch['tuesday_fn_from']; ?>" />
						<input type="hidden" name="tuesday_fn_to" id="tuesday_fn_to" value="<?php echo $sch['tuesday_fn_to']; ?>" />
						<input type="hidden" name="tuesday_an_from" id="tuesday_an_from" value="<?php echo $sch['tuesday_an_from']; ?>" />
						<input type="hidden" name="tuesday_an_to" id="tuesday_an_to" value="<?php echo $sch['tuesday_an_to']; ?>" />
						<input type="hidden" name="wednesday_fn_from" id="wednesday_fn_from" value="<?php echo $sch['wednesday_fn_from']; ?>" />
						<input type="hidden" name="wednesday_fn_to" id="wednesday_fn_to" value="<?php echo $sch['wednesday_fn_to']; ?>" />
						<input type="hidden" name="wednesday_an_from" id="wednesday_an_from" value="<?php echo $sch['wednesday_an_from']; ?>" />
						<input type="hidden" name="wednesday_an_to" id="wednesday_an_to" value="<?php echo $sch['wednesday_an_to']; ?>" />
						<input type="hidden" name="thursday_fn_from" id="thursday_fn_from" value="<?php echo $sch['thursday_fn_from']; ?>" />
						<input type="hidden" name="thursday_fn_to" id="thursday_fn_to" value="<?php echo $sch['thursday_fn_to']; ?>" />
						<input type="hidden" name="thursday_an_from" id="thursday_an_from" value="<?php echo $sch['thursday_an_from']; ?>" />
						<input type="hidden" name="thursday_an_to" id="thursday_an_to" value="<?php echo $sch['thursday_an_to']; ?>" />
						<input type="hidden" name="friday_fn_from" id="friday_fn_from" value="<?php echo $sch['friday_fn_from']; ?>" />
						<input type="hidden" name="friday_fn_to" id="friday_fn_to" value="<?php echo $sch['friday_fn_to']; ?>" />
						<input type="hidden" name="friday_an_from" id="friday_an_from" value="<?php echo $sch['friday_an_from']; ?>" />
						<input type="hidden" name="friday_an_to" id="friday_an_to" value="<?php echo $sch['friday_an_to']; ?>" />
						<input type="hidden" name="saturday_fn_from" id="saturday_fn_from" value="<?php echo $sch['saturday_fn_from']; ?>" />
						<input type="hidden" name="saturday_fn_to" id="saturday_fn_to" value="<?php echo $sch['saturday_fn_to']; ?>" />
						<input type="hidden" name="saturday_an_from" id="saturday_an_from" value="<?php echo $sch['saturday_an_from']; ?>" />
						<input type="hidden" name="saturday_an_to" id="saturday_an_to" value="<?php echo $sch['saturday_an_to']; ?>" />
						<input type="hidden" name="sunday_fn_from" id="sunday_fn_from" value="<?php echo $sch['sunday_fn_from']; ?>" />
						<input type="hidden" name="sunday_fn_to" id="sunday_fn_to" value="<?php echo $sch['sunday_fn_to']; ?>" />
						<input type="hidden" name="sunday_an_from" id="sunday_an_from" value="<?php echo $sch['sunday_an_from']; ?>" />
						<input type="hidden" name="sunday_an_to" id="sunday_an_to" value="<?php echo $sch['sunday_an_to']; ?>" />
						
						<?php } } ?>
						<?php if($sch_times != false) { foreach($sch_times as $sch) { ?>
							<input type="hidden" name="slot" id="slot" value="<?php echo $sch['sch_slot'] ?>" />
							<input type="hidden" name="s_time" id="s_time" value="<?php echo $sch['sch_time'] ?>" />
							<input type="hidden" name="peak_amt" id="peak_amt" value="<?php echo $sch['peak_amount'] ?>" />
							<input type="hidden" name="happy_amt" id="happy_amt" value="<?php echo $sch['happy_amount'] ?>" />
							<input type="hidden" name="peak_from" id="peak_from" value="<?php echo $sch['peak_from'] ?>" />
							<input type="hidden" name="peak_to" id="peak_to" value="<?php echo $sch['peak_to'] ?>" />
							<input type="hidden" name="peak_from" id="happy_from" value="<?php echo $sch['happy_from'] ?>" />
							<input type="hidden" name="peak_to" id="happy_to" value="<?php echo $sch['peak_to'] ?>" />
							<input type="hidden" name="charge" id="charge" value="<?php echo $sch['app_charge'] ?>" />
							<input type="hidden" name="cost" id="cost" value="<?php echo $sch['cost_settings'] ?>" />
							<input type="hidden" name="appoint" id="appoint" value="<?php echo $sch['apt_settings'] ?>" />
						<?php } } ?>
						<input type="hidden" name="day" id="day" />
						<?php if($this->session->flashdata('warning')) { ?>
											<div class="alert alert-success"><button data-dismiss="alert" class="close">&times;</button>Please Enter All details..<a class="alert-link" href="#"></a></div>
										<?php } ?>
    <h3 text align="center"><strong></strong><center><span>Online Appointment Booking Portal</span></center></h3>
     <h4 text align="center"><?php echo $this->session->userdata('clinic_name'); ?></h4>
	<?php $logo =$this->session->userdata('logo'); ?>
	<img src="<?php echo base_url().'uploads/logo/'.$logo; ?>" align="left" height="80px;" width="80px;"></img src>
	<h5 text align="right">Powered by<img src="<?php echo base_url()?>img/NEW LOGO1.png" align="right" height="80px;" width="80px;"></img src></h5>
    <fieldset>
      <input placeholder="Your Name" type="text" name="name" id="name" tabindex="1" required >
    </fieldset>
	<fieldset>
      <input placeholder="Your Mobile Number" type="text" name="mobile" id="mobile" tabindex="3" required>
    </fieldset>
    <fieldset>
      <input placeholder="Your Email Address" type="text" name="email" id="email" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Date Of Appointment" type="text" name="doa" tabindex="4" class="doa" id="datepicker">
    </fieldset>
    <fieldset>
      <select name="time" id="time" class="time" style="width:350px; height:200px;" required placeholder="Please Select Time">
		<option></option>
	  </select>
    </fieldset>
	 <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
    <p class="copyright">Designed by <a href="http://physioplustech.com" target="_blank" title="Colorlib">Physio Plus Tech</a></p>
  
  </form>
  
</div>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	<script>
	 $('select').select2();
  $( function() {
	   $("#datepicker").datepicker({ dateFormat: 'dd/mm/yy'  });
    
  } );
  </script>
  <script>
var openedGritter = null;
$(document).ready(function() {
	 $apt = $('#appoint').val();
	  $apt_cost = $('#cost').val();
	 if($apt == 'free'){
		$('.amount').hide();
	} else if($apt_cost == 'stan') {	
		$("#div1").fadeOut();
	} else {
		$("#div1").fadeIn();
	}
	
	$('.doa').change(function(){
		var date = $('.doa').datepicker('getDate');
		var dayOfWeek = date.getUTCDay();
		var slide = $('#slot').val();
		var s_time = $('#s_time').val();
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
							 $('#time').append('<option value="12:30 AM">12:30 AM</option>');
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
							 $('#time').append('<option value="12:30 PM">12:30 PM</option>');
							 
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
				 if(slide == 60)
				 {
					 $('#time option[value!="0"]').remove();
					 for(var i = from;i <= 12;i++)
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
					 for(var i = 1;i<= to_to;i++)
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
				  if(slide == 5)
				 {
					 $('#time option[value!="0"]').remove();
					 for(var i = from;i <= 12;i++)
					 {
						 if(i == 12)
						 {
							 $('#time').append('<option value="12:00 AM">12:00 AM</option>'); 
							
				
						 }
						 for(var j=0;j<=60;j=j+05)
						 {
							 if(i == 12)
							 {
								 
							 }
							 else
							 {
							 if(j == 0 || j == 5)
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
					 for(var i = 1;i<= to_to;i++)
					 {
						 if(i == 12)
						 {
							 $('#time').append('<option value="12:00 PM">12:00 PM</option>'); 
							
							
						 }
						 for(var j=0;j<=60;j=j+05)
						 {
							 if(i == 12)
							 {
								 
							 }
							 else
							 {
							 if(j == 0 || j == 5)
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
				var c=0;
				var cnt=$('select#time option').length;
				var time_sel=$('#time').val();
				var date_app=$('.doa').val();
				var date = date_app.split('/');
				var final_date=date[2]+'-'+date[1]+'-'+date[0];
				spl=$('#date').val().split(',');
				
				for(var i=0;i<spl.length;i++)
				{ 
					var spl1=spl[i].split(' ');
					
					if(final_date == spl1[0])
					{
							var opt_t =spl1[1].split(":");
							if(opt_t[0] <= '12'){
									var time = opt_t[0]+':'+opt_t[1]+' '+'AM';
							}
							else {
								opt_t[0] =	parseInt(opt_t[0])-12;
								var time = opt_t[0]+':'+opt_t[1]+' '+'PM';
							}
							
							for( var j = 1; j < cnt; j++){
								if(time == document.getElementById("time").options[j].value) {
									c = c+1;
									
								}
							}
						
					}
				}
				
				if(c => s_time)
				{
					
					$("#time option[value = '" + time + "' ]").remove();
				}
	});
	
		
		
	
	
	
});

</script>