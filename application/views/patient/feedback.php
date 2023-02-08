<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Physio Plus Tech</title>

     
    <link href="<?php echo base_url() ?>patient/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>patient/css/bootstrap-reset.css" rel="stylesheet">
     
    <link href="<?php echo base_url() ?>patient/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    
    <link href="<?php echo base_url() ?>patient/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>patient/css/style-responsive.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>css/rateit.css" rel="stylesheet" type="text/css">
	 <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>patient/assets/gritter/css/jquery.gritter.css" />
	 <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>patient/assets/bootstrap-datepicker/css/datepicker.css" />
     
  </head>

  <body>

  <section id="container" class="">
	 <?php $this->load->view('patient/menu'); ?>
	
       
      <section id="main-content">
          <section class="wrapper site-min-height">
              
              <div class="row-fluid" id="draggable_portlets">
				<form name="ajaxform" id="ajaxform" action="<?php echo base_url().'patient/patient/add_feedback' ?>" method="POST" class="form-horizontal" >
					<div class="row">
					  <div class="col-lg-12">
						  <section class="panel">
							<div class="panel-body">
								<div class="form-group">
									<label class="col-sm-2 control-label col-lg-2" >Consultant :</label>
									<div class="col-lg-3">
										 <select class="form-control input-sm m-bot15" name="Consultant" id="Consultant">
                                             <option></option>
											 <?php foreach($consultants as $staff){ 
												echo '<option value="'.$staff['staff_id'].'">'.$staff['first_name'].$staff['last_name'].'</option>';
												
											} ?>
                                          </select>
									</div>
									 <label class="col-sm-2 control-label col-lg-1">Date</label>
									 <div class="col-md-3 col-xs-11">
										  <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="12-02-2012"  class="input-append date dpYears">
											  <input type="text" readonly value="" placeholder="dd-mm-yyyy" size="16" class="form-control" name="visitdate">
											  <span class="input-group-btn add-on">
												<button class="btn btn-danger" type="button"><i class="fa fa-calendar"></i></button>
											  </span>
										   </div>
									</div>
								</div>
						  </section>
					  </div>
					</div>
                  <div class="col-md-6 column sortable">
                      
                      <div class="panel panel-primary">
                          <div class="panel-heading">Your Appointment</div>
                          <div class="panel-body">
							<div class="form-group">
								<label class="col-sm-2 control-label col-lg-7" >1. Ease Of Making Appointment By Phone</label>
								<div class="col-lg-5">
                                    <div class="feed1"> 
										<select id="fb1" name='srate1'>
											<option value="0" >Bad</option>
											<option value="1" >Poor</option>
											<option value="2" >Fair</option>
											<option value="3" >Good</option>
											<option value="4" >very Good</option>
											<option value="5" >Excellent</option>
										</select>
									</div>
									<div class="rateit" data-rateit-backingfld="#fb1"></div>
									<span id="fb1text"></span>
                                </div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label col-lg-7" >2.The efficiency of the Registration</label>
								<div class="col-lg-5">
                                    <div class="feed1"> 
										<select id="fb2" name='srate2'>
											<option value="0" >Bad</option>
											<option value="1" >Poor</option>
											<option value="2" >Fair</option>
											<option value="3" >Good</option>
											<option value="4" >very Good</option>
											<option value="5" >Excellent</option>
										</select>
									</div>
									<div class="rateit" data-rateit-backingfld="#fb2"></div>
									<span id="fb2text"></span>
                                </div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label col-lg-7" >3.Keeping you infrormed of your appointment time</label>
								<div class="col-lg-5">
                                    <div class="feed1"> 
										<select id="fb3" name='srate3'>
											<option value="0" >Bad</option>
											<option value="1" >Poor</option>
											<option value="2" >Fair</option>
											<option value="3" >Good</option>
											<option value="4" >very Good</option>
											<option value="5" >Excellent</option>
										</select>
									</div>
									<div class="rateit" data-rateit-backingfld="#fb3"></div>
									<span id="fb3text"></span>
                                </div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label col-lg-7" >4.waiting time in resception area</label>
								<div class="col-lg-5">
                                    <div class="feed1"> 
										<select id="fb4" name='srate4'>
											<option value="0" >Bad</option>
											<option value="1" >Poor</option>
											<option value="2" >Fair</option>
											<option value="3" >Good</option>
											<option value="4" >very Good</option>
											<option value="5" >Excellent</option>
										</select>
									</div>
									<div class="rateit" data-rateit-backingfld="#fb4"></div>
									<span id="fb4text"></span>
                                </div>
							</div>
                          </div>
                      </div>
                       
                      <div class="panel panel-default">
                          <div class="panel-heading">Our Staff</div>
                          <div class="panel-body">
							<div class="form-group">
								<label class="col-sm-2 control-label col-lg-7" >1. Ease Of Making Appointment By Phone</label>
								<div class="col-lg-5">
                                    <div class="feed1"> 
										<select id="fb5" name='srate5'>
											<option value="0" >Bad</option>
											<option value="1" >Poor</option>
											<option value="2" >Fair</option>
											<option value="3" >Good</option>
											<option value="4" >very Good</option>
											<option value="5" >Excellent</option>
										</select>
									</div>
									<div class="rateit" data-rateit-backingfld="#fb5"></div>
									<span id="fb5text"></span>
                                </div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label col-lg-7" >2.The efficiency of the Registration</label>
								<div class="col-lg-5">
                                    <div class="feed1"> 
										<select id="fb6" name='srate6'>
											<option value="0" >Bad</option>
											<option value="1" >Poor</option>
											<option value="2" >Fair</option>
											<option value="3" >Good</option>
											<option value="4" >very Good</option>
											<option value="5" >Excellent</option>
										</select>
									</div>
									<div class="rateit" data-rateit-backingfld="#fb6"></div>
									<span id="fb6text"></span>
                                </div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label col-lg-7" >3.Keeping you infrormed of your appointment time</label>
								<div class="col-lg-5">
                                    <div class="feed1"> 
										<select id="fb7" name='srate7'>
											<option value="0" >Bad</option>
											<option value="1" >Poor</option>
											<option value="2" >Fair</option>
											<option value="3" >Good</option>
											<option value="4" >very Good</option>
											<option value="5" >Excellent</option>
										</select>
									</div>
									<div class="rateit" data-rateit-backingfld="#fb7"></div>
									<span id="fb7text"></span>
                                </div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label col-lg-7" >4.waiting time in resception area</label>
								<div class="col-lg-5">
                                    <div class="feed1"> 
										<select id="fb8" name='srate8'>
											<option value="0" >Bad</option>
											<option value="1" >Poor</option>
											<option value="2" >Fair</option>
											<option value="3" >Good</option>
											<option value="4" >very Good</option>
											<option value="5" >Excellent</option>
										</select>
									</div>
									<div class="rateit" data-rateit-backingfld="#fb8"></div>
									<span id="fb8text"></span>
                                </div>
							</div>
                          </div>
                      </div>
                       
                      <div class="panel panel-success">
                          <div class="panel-heading">Our facility</div>
                          <div class="panel-body">
							<div class="form-group">
								<label class="col-sm-2 control-label col-lg-7" >1.Hours of operation convenient for you</label>
								<div class="col-lg-5">
                                    <div class="feed1"> 
										<select id="fb19" name='srate19'>
											<option value="0" >Bad</option>
											<option value="1" >Poor</option>
											<option value="2" >Fair</option>
											<option value="3" >Good</option>
											<option value="4" >very Good</option>
											<option value="5" >Excellent</option>
										</select>
									</div>
									<div class="rateit" data-rateit-backingfld="#fb19"></div>
									<span id="fb19text"></span>
                                </div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label col-lg-7" >3.Sinage and directions easy to follow</label>
								<div class="col-lg-5">
                                    <div class="feed1"> 
										<select id="fb20" name='srate20'>
											<option value="0" >Bad</option>
											<option value="1" >Poor</option>
											<option value="2" >Fair</option>
											<option value="3" >Good</option>
											<option value="4" >very Good</option>
											<option value="5" >Excellent</option>
										</select>
									</div>
									<div class="rateit" data-rateit-backingfld="#fb20"></div>
									<span id="fb20text"></span>
                                </div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label col-lg-7" >3.Keeping you infrormed of your appointment time</label>
								<div class="col-lg-5">
                                    <div class="feed1"> 
										<select id="fb21" name='srate21'>
											<option value="0" >Bad</option>
											<option value="1" >Poor</option>
											<option value="2" >Fair</option>
											<option value="3" >Good</option>
											<option value="4" >very Good</option>
											<option value="5" >Excellent</option>
										</select>
									</div>
									<div class="rateit" data-rateit-backingfld="#fb21"></div>
									<span id="fb21text"></span>
                                </div>
							</div>
                          </div>
                      </div>
                      
					  <div class="panel panel-info">
                          <div class="panel-heading">RECOMMEND</div>
                          <div class="panel-body">
							<div class="form-group">
								<label class="col-sm-2 control-label col-lg-7" >WHOULD YOU RECOMMEND THE AVEDA</label>
								<div class="col-lg-5">
									<label>
								<input type="radio" name="recommend"  value="1" />
							Yes</label>
							<label>
								<input type="radio" name="recommend"  value="0" />
							No</label>
                                </div>
							</div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6 column sortable">
                       
                      <div class="panel panel-warning">
                          <div class="panel-heading">Our Communication With You</div>
                           <div class="panel-body">
							<div class="form-group">
								<label class="col-sm-2 control-label col-lg-7" >1.Is Your Phone Call Answered Promptly</label>
								<div class="col-lg-5">
                                    <div class="feed1"> 
										<select id="fb9" name='srate9'>
											<option value="0" >Bad</option>
											<option value="1" >Poor</option>
											<option value="2" >Fair</option>
											<option value="3" >Good</option>
											<option value="4" >very Good</option>
											<option value="5" >Excellent</option>
										</select>
									</div>
									<div class="rateit" data-rateit-backingfld="#fb9"></div>
									<span id="fb9text"></span>
                                </div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label col-lg-7" >2.Expalanation Of Your Procedure</label>
								<div class="col-lg-5">
                                    <div class="feed1"> 
										<select id="fb10" name='srate10'>
											<option value="0" >Bad</option>
											<option value="1" >Poor</option>
											<option value="2" >Fair</option>
											<option value="3" >Good</option>
											<option value="4" >very Good</option>
											<option value="5" >Excellent</option>
										</select>
									</div>
									<div class="rateit" data-rateit-backingfld="#fb10"></div>
									<span id="fb10text"></span>
                                </div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label col-lg-7" >3.Effectiveness Of Our Health Information Materal</label>
								<div class="col-lg-5">
                                    <div class="feed1"> 
										<select id="fb11" name='srate11'>
											<option value="0" >Bad</option>
											<option value="1" >Poor</option>
											<option value="2" >Fair</option>
											<option value="3" >Good</option>
											<option value="4" >very Good</option>
											<option value="5" >Excellent</option>
										</select>
									</div>
									<div class="rateit" data-rateit-backingfld="#fb11"></div>
									<span id="fb11text"></span>
                                </div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label col-lg-7" >4.waiting time in resception area</label>
								<div class="col-lg-5">
                                    <div class="feed1"> 
										<select id="fb12" name='srate12'>
											<option value="0" >Bad</option>
											<option value="1" >Poor</option>
											<option value="2" >Fair</option>
											<option value="3" >Good</option>
											<option value="4" >very Good</option>
											<option value="5" >Excellent</option>
										</select>
									</div>
									<div class="rateit" data-rateit-backingfld="#fb12"></div>
									<span id="fb12text"></span>
                                </div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label col-lg-7" >5.Taking time to answer your question</label>
								<div class="col-lg-5">
                                    <div class="feed1"> 
										<select id="fb13" name='srate13'>
											<option value="0" >Bad</option>
											<option value="1" >Poor</option>
											<option value="2" >Fair</option>
											<option value="3" >Good</option>
											<option value="4" >very Good</option>
											<option value="5" >Excellent</option>
										</select>
									</div>
									<div class="rateit" data-rateit-backingfld="#fb13"></div>
									<span id="fb13text"></span>
                                </div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label col-lg-7" >6.Amount of time spent with you</label>
								<div class="col-lg-5">
                                    <div class="feed1"> 
										<select id="fb14" name='srate14'>
											<option value="0" >Bad</option>
											<option value="1" >Poor</option>
											<option value="2" >Fair</option>
											<option value="3" >Good</option>
											<option value="4" >very Good</option>
											<option value="5" >Excellent</option>
										</select>
									</div>
									<div class="rateit" data-rateit-backingfld="#fb14"></div>
									<span id="fb14text"></span>
                                </div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label col-lg-7" >7.Explaining things in a way you could understand</label>
								<div class="col-lg-5">
                                    <div class="feed1"> 
										<select id="fb15" name='srate15'>
											<option value="0" >Bad</option>
											<option value="1" >Poor</option>
											<option value="2" >Fair</option>
											<option value="3" >Good</option>
											<option value="4" >very Good</option>
											<option value="5" >Excellent</option>
										</select>
									</div>
									<div class="rateit" data-rateit-backingfld="#fb15"></div>
									<span id="fb15text"></span>
                                </div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label col-lg-7" >8.Instructions regarding Home program/follow-up care</label>
								<div class="col-lg-5">
                                    <div class="feed1"> 
										<select id="fb16" name='srate16'>
											<option value="0" >Bad</option>
											<option value="1" >Poor</option>
											<option value="2" >Fair</option>
											<option value="3" >Good</option>
											<option value="4" >very Good</option>
											<option value="5" >Excellent</option>
										</select>
									</div>
									<div class="rateit" data-rateit-backingfld="#fb16"></div>
									<span id="fb16text"></span>
                                </div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label col-lg-7" >9.The thoroughness of the examination</label>
								<div class="col-lg-5">
                                    <div class="feed1"> 
										<select id="fb17" name='srate17'>
											<option value="0" >Bad</option>
											<option value="1" >Poor</option>
											<option value="2" >Fair</option>
											<option value="3" >Good</option>
											<option value="4" >very Good</option>
											<option value="5" >Excellent</option>
										</select>
									</div>
									<div class="rateit" data-rateit-backingfld="#fb17"></div>
									<span id="fb17text"></span>
                                </div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label col-lg-7" >10.Advice given to you on ways to stay healthy</label>
								<div class="col-lg-5">
                                    <div class="feed1"> 
										<select id="fb18" name='srate18'>
											<option value="0" >Bad</option>
											<option value="1" >Poor</option>
											<option value="2" >Fair</option>
											<option value="3" >Good</option>
											<option value="4" >very Good</option>
											<option value="5" >Excellent</option>
										</select>
									</div>
									<div class="rateit" data-rateit-backingfld="#fb18"></div>
									<span id="fb18text"></span>
                                </div>
							</div>
                          </div>
                      </div>
                      
                      <div class="panel panel-danger">
                          <div class="panel-heading">You Overall satisfaction with</div>
                           <div class="panel-body">
							<div class="form-group">
								<label class="col-sm-2 control-label col-lg-7" >1.Our Practice</label>
								<div class="col-lg-5">
                                    <div class="feed1"> 
										<select id="fb22" name='srate22'>
											<option value="0" >Bad</option>
											<option value="1" >Poor</option>
											<option value="2" >Fair</option>
											<option value="3" >Good</option>
											<option value="4" >very Good</option>
											<option value="5" >Excellent</option>
										</select>
									</div>
									<div class="rateit" data-rateit-backingfld="#fb22"></div>
									<span id="fb22text"></span>
                                </div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label col-lg-7" >2.The quality of your medical care</label>
								<div class="col-lg-5">
                                    <div class="feed1"> 
										<select id="fb23" name='srate23'>
											<option value="0" >Bad</option>
											<option value="1" >Poor</option>
											<option value="2" >Fair</option>
											<option value="3" >Good</option>
											<option value="4" >very Good</option>
											<option value="5" >Excellent</option>
										</select>
									</div>
									<div class="rateit" data-rateit-backingfld="#fb23"></div>
									<span id="fb23text"></span>
                                </div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label col-lg-7" >3.overall rating of care from your provider</label>
								<div class="col-lg-5">
                                    <div class="feed1"> 
										<select id="fb24" name='srate24'>
											<option value="0" >Bad</option>
											<option value="1" >Poor</option>
											<option value="2" >Fair</option>
											<option value="3" >Good</option>
											<option value="4" >very Good</option>
											<option value="5" >Excellent</option>
										</select>
									</div>
									<div class="rateit" data-rateit-backingfld="#fb24"></div>
									<span id="fb24text"></span>
                                </div>
							</div>
                          </div>
                      </div>
                  </div>
				  <div class="row">
					  <div class="col-lg-12">
						  <section class="panel">
							<div class="panel-body">
								<div class="form-group">
									<div class="col-lg-11" align="right">
										<button type="submit" class="btn btn-danger">Save</button>
									</div>
								</div>
							</div>
						  </section>
					  </div>
					</div>
				 </form>
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
    
    <script src="<?php echo base_url() ?>patient/js/common-scripts.js"></script>
	<script src="<?php echo base_url() ?>patient/js/gritter.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>patient/assets/gritter/js/jquery.gritter.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>patient/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url() ?>patient/js/advanced-form-components.js"></script>
	<script>
$(document).ready(function() {

	DraggablePortlet.init();
	  
	$("#fb1").change( function () {
		$('#fb1text').html($('#fb1 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb2").change( function () {
		$('#fb2text').html($('#fb2 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb3").change( function () {
		$('#fb3text').html($('#fb3 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb4").change( function () {
		$('#fb4text').html($('#fb4 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb5").change( function () {
		$('#fb5text').html($('#fb5 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb6").change( function () {
		$('#fb6text').html($('#fb6 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb7").change( function () {
		$('#fb7text').html($('#fb7 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb8").change( function () {
		$('#fb8text').html($('#fb8 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb9").change( function () {
		$('#fb9text').html($('#fb9 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb10").change( function () {
		$('#fb10text').html($('#fb10 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb11").change( function () {
		$('#fb11text').html($('#fb11 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb12").change( function () {
		$('#fb12text').html($('#fb12 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb13").change( function () {
		$('#fb13text').html($('#fb13 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb14").change( function () {
		$('#fb14text').html($('#fb14 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb15").change( function () {
		$('#fb15text').html($('#fb15 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb16").change( function () {
		$('#fb16text').html($('#fb16 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb17").change( function () {
		$('#fb17text').html($('#fb17 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb18").change( function () {
		$('#fb18text').html($('#fb18 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb19").change( function () {
		$('#fb19text').html($('#fb19 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb20").change( function () {
		$('#fb20text').html($('#fb20 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb21").change( function () {
		$('#fb21text').html($('#fb21 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb22").change( function () {
		$('#fb22text').html($('#fb22 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb23").change( function () {
		$('#fb23text').html($('#fb23 :selected').text());
		$( "#totalschore" ).click();
	});
	$("#fb24").change( function () {
		$('#fb24text').html($('#fb24 :selected').text());
		$( "#totalschore" ).click();
	});

 
 $("#ajaxform").submit(function(e)
{
	var consult = $('#Consultant').val();
	var date = $('#visitdate').val();
	if(consult != '' && date != ''){
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        success:function(data, textStatus, jqXHR,form) 
        {
			var objJSON = JSON.parse(data);
			if(objJSON.status == 'failure'){
				 $.gritter.add({
						title: 'Failure!',
						text: 'Feeb Back Submit Failure',
						image: '<?php echo base_url() ?>patient/img/error.png',
						sticky: false,
						before_open: function(){
							if($('.gritter-item-wrapper').length == 2)
							{
								return false;
							}
						}
					});
			} else {
				
				window.setTimeout(function(){location.reload()},1000)
				 $.gritter.add({
						title: 'Sucess',
						text: 'Feeb Back Submit Success',
						image: '<?php echo base_url() ?>patient/img/success.png',
						sticky: false,
						before_open: function(){
							if($('.gritter-item-wrapper').length == 2)
							{
								return false;
							}
						}
					});
			}
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
            alert('Error');
        }
    });
	}else{
		 $.gritter.add({
           
            title: 'Error!',
             
            text: 'Consultant & Date Field is Must.',
            
            image: '<?php echo base_url() ?>patient/img/error.png',
             
            sticky: false,
             
            before_open: function(){
                if($('.gritter-item-wrapper').length == 2)
                {
                    
                    return false;
                }
            }
        });
		
	}
    e.preventDefault();  
    e.unbind();  
});

});

</script>
      

  </body>
</html>
