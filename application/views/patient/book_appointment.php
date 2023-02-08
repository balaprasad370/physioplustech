<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/datepicker/css/bootstrap-datetimepicker.css">
    <title>Physio Plus Tech</title>
    <link rel="icon" type="image/ico" href="<?php echo base_url() ?>assets/images/favicon.ico" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/css/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/vendor/animate/animate.css">
    <link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url() ?>assets/js/vendor/mmenu/css/jquery.mmenu.all.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/videobackground/css/jquery.videobackground.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/vendor/bootstrap-checkbox.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/vendor/bootstrap/bootstrap-dropdown-multilevel.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/summernote/css/summernote.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/summernote/css/summernote-bs3.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/chosen/css/chosen.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/chosen/css/chosen-bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/datepicker/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/colorpicker/css/bootstrap-colorpicker.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/colorpalette/bootstrap-colorpalette.css">
    <link href="<?php echo base_url() ?>patient/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>patient/css/bootstrap-reset.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>patient/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>patient/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>patient/css/style-responsive.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>css/rateit.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>patient/assets/gritter/css/jquery.gritter.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>patient/assets/bootstrap-datepicker/css/datepicker.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/jgrowl/css/jquery.jgrowl.min.css">
    
  </head>

  <body>

  <section id="container" class="">
	 <?php $this->load->view('patient/menu'); ?>
	
       
      <section id="main-content">
          <section class="wrapper site-min-height">
               
              <div class="row-fluid" id="draggable_portlets">
				<form name="ajaxform" id="ajaxform" action="<?php echo base_url().'patient/patient/add_appointment' ?>" method="POST" class="form-horizontal" >
					 <header class="panel-heading">
                              Book Appointment
                    </header>
					<div class="row">
					  <div class="col-lg-12">
					   <section class="panel">
							<div class="panel-body">
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
									<?php } } ?>
									<input type="hidden" name="day" id="day" />
									
									<div class="form-group">
									<label class="col-sm-5 control-label col-lg-2" >Name :</label>
									<div class="col-lg-3">
									  <input type="text" name="name" style="width:260px;" />
								    </div>
									</div></br></br>
									<div class="form-group">
									<label class="col-sm-5 control-label col-lg-2" >Mobile :</label>
									<div class="col-lg-5">
									  <input type="text" name="mobile" style="width:260px;" />
								    </div>
									</div></br></br>
									<div class="form-group">
									<label class="col-sm-5 control-label col-lg-2" >Email :</label>
									<div class="col-lg-5">
									  <input type="text" name="email" style="width:260px;"/>
								    </div>
									</div></br></br>
									<div class="form-group">
									 <label class="col-sm-5 control-label col-lg-2" >Appointment Date :</label>
									<div class="col-lg-3">
										  <input type="text" name="appointment_from" width="200px;" data-date-format='DD/MM/YYYY' class="form-control datepicker" parsley-trigger="change" parsley-required="true" id="appointment_from">
                          			</div>
									</div></br></br>
									<div class="form-group">
									<label class="col-sm-5 control-label col-lg-2" > Time :</label>
									<div class="col-lg-3">
									<select class="form-control input-sm m-bot15" width="200px;" name="time" id="time">
                                             <option></option>
									</select>
									</div>
									</div></br></br>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-danger">Save</button>
								</section>
							</form>
					  </div>
					</div>
                 </div>
               
          </section>
      </section>
      
      <footer class="site-footer">
          <div class="text-center">
                2015 &copy; Patient Portal Physio Plus Tech.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
       
  </section>

     
    <script src="<?php echo base_url() ?>patient/js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo base_url() ?>patient/assets/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>patient/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url() ?>patient/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url() ?>patient/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url() ?>patient/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>patient/js/respond.min.js" ></script>
    <script src="<?php echo base_url() ?>patient/js/draggable-portlet.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery.rateit.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/datepicker/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo base_url() ?>patient/js/common-scripts.js"></script>
	<script src="<?php echo base_url() ?>patient/js/gritter.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>patient/assets/gritter/js/jquery.gritter.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>patient/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url() ?>patient/js/advanced-form-components.js"></script>
	 <script type="text/javascript" src="<?php  echo base_url();  ?>assets/js/jquery.min.js"></script>
    <script src="<?php  echo base_url();  ?>assets/js/code.jquery.js"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/bootstrap/bootstrap-dropdown-multilevel.js"></script>
    <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?lang=css&amp;skin=sons-of-obsidian"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/vendor/mmenu/js/jquery.mmenu.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/vendor/nicescroll/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/vendor/animate-numbers/jquery.animateNumbers.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/vendor/videobackground/jquery.videobackground.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/vendor/blockui/jquery.blockUI.js"></script>
	<script src="<?php echo base_url() ?>assets/js/vendor/datepicker/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/colorpicker/bootstrap-colorpicker.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/colorpalette/bootstrap-colorpalette.js"></script>
    <script src="<?php echo base_url() ?>assets/js/minimal.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datatables/ColReorderWithResize.js"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datatables/colvis/dataTables.colVis.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datatables/dataTables.bootstrap.js"></script>
    <script src="<?php  echo base_url();  ?>assets/js/vendor/jgrowl/jquery.jgrowl.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/vendor/parsley/parsley.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	 <script type="text/javascript" src="<?php  echo base_url();  ?>assets/js/jquery.min.js"></script>
    <script src="<?php  echo base_url();  ?>assets/js/code.jquery.js"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/bootstrap/bootstrap-dropdown-multilevel.js"></script>
    <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?lang=css&amp;skin=sons-of-obsidian"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/vendor/mmenu/js/jquery.mmenu.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/vendor/nicescroll/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/vendor/animate-numbers/jquery.animateNumbers.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/vendor/videobackground/jquery.videobackground.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/vendor/blockui/jquery.blockUI.js"></script>
	<script src="<?php  echo base_url();  ?>assets/js/vendor/modals/classie.js"></script>
    <script src="<?php  echo base_url();  ?>assets/js/vendor/modals/modalEffects.js"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/summernote/summernote.min.js"></script>
    <!--<script src="<?php echo base_url() ?>assets/js/vendor/chosen/chosen.jquery.min.js"></script>-->
    <script src="<?php echo base_url() ?>assets/js/vendor/momentjs/moment-with-langs.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/datepicker/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/colorpicker/bootstrap-colorpicker.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/colorpalette/bootstrap-colorpalette.js"></script>
    <script src="<?php echo base_url() ?>assets/js/minimal.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datatables/ColReorderWithResize.js"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datatables/colvis/dataTables.colVis.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datatables/tabletools/ZeroClipboard.js"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datatables/tabletools/dataTables.tableTools.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datatables/dataTables.bootstrap.js"></script>
    <script src="<?php  echo base_url();  ?>assets/js/vendor/jgrowl/jquery.jgrowl.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/vendor/parsley/parsley.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	<script>
	 $('select').select2();
	
	 
	
$(document).ready(function() {
DraggablePortlet.init();

$('#appointment_from').change(function(){
		var date1 = $('#appointment_from').val();
		var date = date1.split('/');
		var d = new Date(date[2],date[1]-1,date[0]);
		var dayOfWeek = d.getUTCDay();
		alert(dayOfWeek);
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
					 $('#time').append('<option value="">Please Select</option>');
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
					 $('#time').append('<option value="">Please Select</option>');
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
					 $('#time').append('<option value="">Please Select</option>');
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
					 $('#time').append('<option value="">Please Select</option>');
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

				var cnt=$('select#time option').length;
				var time_sel=$('#time').val();
				var date_app=$('.appointment_from').val();
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
									$("#time option[value = '" + time + "' ]").remove();
								}
							}
						
					}
				}
	});	  
	
	 $('.datepicker').datetimepicker({
           dateFormat: 'yy-mm-dd',
		   datepicker: true
	});
	 $(".datepicker").on("dp.show",function (e) {
        var newtop = $('.bootstrap-datetimepicker-widget').position().top - 45;      
        $('.bootstrap-datetimepicker-widget').css('top', newtop + 'px');
      });
	  $('form').on('submit', function (event) {
			 event.preventDefault();
			 var $form = $(this);
			 if ( $(this).parsley().isValid() ) {
			 var  formID = $(this).attr("id");
			 var  formURL = $(this).attr("action");
			$.ajax({
				type: 'post',
				url: $(this).attr('action'),
				data:$(this).serialize(),
				success:function(data, textStatus, jqXHR,form) 
				{
					
					$.jGrowl("Reschedule Has Been Done!");
					setTimeout(function(){ 
						window.location="<?php echo base_url().'patient/patient/appointment_details' ?>";
					}, 1000);
					
				},
				error: function(jqXHR, textStatus, errorThrown) 
				{
					$.jGrowl("Reschedule Has not Been Done!");
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

</script>
      

  </body>
</html>
