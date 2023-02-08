<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
     
 
    <meta name="msapplication-tap-highlight" content="no">
 
<link href="<?php echo base_url()?>my_assets/main.css" rel="stylesheet">
 <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
<link href="<?php echo base_url(); ?>assets/css/rateit.css" rel="stylesheet" type="text/css">
	<style>
.parsley-error-list{
	color:red;
	list-style-type:none;
}
label, span, th, .td{
	font-weight:bold;
	color:#3f6ad8;
}
</style>
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
     
				<?php include("sidebar.php");?>
              <div class="app-main__outer">
                <div class="app-main__inner">
                              
                    <div class="tab-content">
                        
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title"> Feedback
								</h5>
                                    <form class="" action="<?php echo base_url().'client/feedback/add_feedback'?>" method="post"  role="form" parsley-validate id="signupForm">
                                       <div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="patient_id" class="">Patient Name *</label>
												 
												  <select class="multiselect-dropdown form-control" name="patient_id" parsley-trigger="change" parsley-required="true" parsley-error-container="#selectbox" id="patient_id">
                                                  <?php
										if ($patient_name!=false) {
											foreach ($patient_name as $patient_names) {
												$last_name = ($patient_names['last_name'] == '') ? '' : ucfirst($patient_names['last_name']);
												$age = ($patient_names['age'] == '0') ? '' : '('.$patient_names['age'].')';
												echo '<option value="'.$patient_names['patient_id'].'">'.$patient_names['first_name'].' '.$last_name.'   ('.$patient_names['patient_code'].')  '.$age.'</option>';
											}
										}
									?>
											</select>
												 </div>
												</div>
											 
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="visitdate" class="">Date</label>
												 <input name="visitdate" data-toggle="datepicker" type="text" class="form-control datepicker" autocomplete="off"></div>
												</div>
                                            </div>
 
                                        
                                          
                                          <div class="table-responsive">
										  <table class="table table-striped table-bordered" id="InvoiceTable" style="text-align:center;">
                                             
                                            <tbody id="itemsBody">
                                            <tr>
                                  <td class="td">Your Appointment</td>
                                  <td>1. Ease Of Making Appointment By Phone</td>
                                  <td colspan="5">
							   <div class="feed1"> <select id="fb1" name='srate1' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" >Bad</option>
								<option value="1" >Poor</option>
								<option value="2" >Fair</option>
								<option value="3" >Good</option>
								<option value="4" >Very Good</option>
								<option value="5" >Excellent</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb1"></div>
							<span id="fb1text"></span></td>
					 </tr>
                         <tr>
                                  <td>&nbsp;</td>
                                  <td>2.The efficiency of the Registration</td>
                                  <td colspan="5">
							   <div class="feed1"> <select id="fb2" name='srate2' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" >Bad</option>
								<option value="1" >Poor</option>
								<option value="2" >Fair</option>
								<option value="3" >Good</option>
								<option value="4" >Very Good</option>
								<option value="5" >Excellent</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb2"></div>
							<span id="fb2text"></span>
							</td> </tr>
                          <tr>
                                  <td>&nbsp;</td>
                                  <td>3.Keeping you infrormed of your appointment time</td>
                                  <td colspan="5">
							   <div class="feed1"> <select id="fb3" name='srate3' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" >Bad</option>
								<option value="1" >Poor</option>
								<option value="2" >Fair</option>
								<option value="3" >Good</option>
								<option value="4" >Very Good</option>
								<option value="5" >Excellent</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb3"></div>
							<span id="fb3text"></span>
							</td>
							</tr>
                          <tr>
                                  <td>&nbsp;</td>
                                  <td>4.waiting time in resception area</td>
                                  <td colspan="5">
							   <div class="feed1"> <select id="fb4" name='srate4' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" >Bad</option>
								<option value="1" >Poor</option>
								<option value="2" >Fair</option>
								<option value="3" >Good</option>
								<option value="4" >Very Good</option>
								<option value="5" >Excellent</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb4"></div>
							<span id="fb4text"></span>
							</td>
							</tr>
                          <tr>
                                  <td class="td">Our Staff</td>
                                  <td>1.The frindliness and courtesy of receptionist</td>
                                  <td colspan="5">
							   <div class="feed1"> <select id="fb5" name='srate5' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" >Bad</option>
								<option value="1" >Poor</option>
								<option value="2" >Fair</option>
								<option value="3" >Good</option>
								<option value="4" >Very Good</option>
								<option value="5" >Excellent</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb5"></div>
							<span id="fb5text"></span>
							</td>
							</tr>
                             <tr>
                                  <tr><td>&nbsp;</td>
                                  <td>2.the caring concern of our therapist</td>
                                  <td colspan="5">
							   <div class="feed1"> <select id="fb6" name='srate6' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" >Bad</option>
								<option value="1" >Poor</option>
								<option value="2" >Fair</option>
								<option value="3" >Good</option>
								<option value="4" >Very Good</option>
								<option value="5" >Excellent</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb6"></div>
							<span id="fb6text"></span>
							</td>
							</tr>
							<tr><td>&nbsp;</td>
                                  <td>3.The Helpfulness of our staff</td>
                                  <td colspan="5">
							   <div class="feed1"> <select id="fb7" name='srate7' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" >Bad</option>
								<option value="1" >Poor</option>
								<option value="2" >Fair</option>
								<option value="3" >Good</option>
								<option value="4" >Very Good</option>
								<option value="5" >Excellent</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb7"></div>
							<span id="fb7text"></span>
							</td>
							</tr>
							<tr><td>&nbsp;</td>
                                  <td>4.The professionalism of our staff</td>
                                  <td colspan="5">
							   <div class="feed1"> <select id="fb8" name='srate8' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" >Bad</option>
								<option value="1" >Poor</option>
								<option value="2" >Fair</option>
								<option value="3" >Good</option>
								<option value="4" >Very Good</option>
								<option value="5" >Excellent</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb8"></div>
							<span id="fb8text"></span>
							</td>
							</tr>
							<tr><td class="td">Our Communication With You</td>
                                  <td>1.Is Your Phone Call Answered Promptly</td>
                                  <td colspan="5">
							   <div class="feed1"> <select id="fb9" name='srate9' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" >Bad</option>
								<option value="1" >Poor</option>
								<option value="2" >Fair</option>
								<option value="3" >Good</option>
								<option value="4" >Very Good</option>
								<option value="5" >Excellent</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb9"></div>
							<span id="fb9text"></span>
							</td>
							</tr>
							<tr><td>&nbsp;</td>
                                  <td>2.Expalanation Of Your Procedure</td>
                                  <td colspan="5">
							   <div class="feed1"> <select id="fb10" name='srate10' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" >Bad</option>
								<option value="1" >Poor</option>
								<option value="2" >Fair</option>
								<option value="3" >Good</option>
								<option value="4" >Very Good</option>
								<option value="5" >Excellent</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb10"></div>
							<span id="fb10text"></span>
							</td>
							</tr>
							<tr><td>&nbsp;</td>
                                  <td>3.Effectiveness Of Our Health Information Materal</td>
                                  <td colspan="5">
							   <div class="feed1"> <select id="fb11" name='srate11' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" >Bad</option>
								<option value="1" >Poor</option>
								<option value="2" >Fair</option>
								<option value="3" >Good</option>
								<option value="4" >Very Good</option>
								<option value="5" >Excellent</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb11"></div>
							<span id="fb11text"></span>
							</td>
							</tr>
							<tr><td>&nbsp;</td>
                                  <td>4.Willingness to listen carefully to you</td>
                                  <td colspan="5">
							   <div class="feed1"> <select id="fb12" name='srate12' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" >Bad</option>
								<option value="1" >Poor</option>
								<option value="2" >Fair</option>
								<option value="3" >Good</option>
								<option value="4" >Very Good</option>
								<option value="5" >Excellent</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb12"></div>
							<span id="fb12text"></span>
							</td>
							</tr>
							<tr><td>&nbsp;</td>
                                  <td>5.Taking time to answer your question</td>
                                  <td colspan="5">
							   <div class="feed1"> <select id="fb13" name='srate13' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" >Bad</option>
								<option value="1" >Poor</option>
								<option value="2" >Fair</option>
								<option value="3" >Good</option>
								<option value="4" >Very Good</option>
								<option value="5" >Excellent</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb13"></div>
							<span id="fb13text"></span>
							</td>
							</tr>
							<tr><td>&nbsp;</td>
                                  <td>6.Amount of time spent with you</td>
                                  <td colspan="5">
							   <div class="feed1"> <select id="fb14" name='srate14' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" >Bad</option>
								<option value="1" >Poor</option>
								<option value="2" >Fair</option>
								<option value="3" >Good</option>
								<option value="4" >Very Good</option>
								<option value="5" >Excellent</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb14"></div>
							<span id="fb14text"></span>
							</td>
							</tr>
							<tr><td>&nbsp;</td>
                                  <td>7.Explaining things in a way you could understand</td>
                                  <td colspan="5">
							   <div class="feed1"> <select id="fb15" name='srate15' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" >Bad</option>
								<option value="1" >Poor</option>
								<option value="2" >Fair</option>
								<option value="3" >Good</option>
								<option value="4" >Very Good</option>
								<option value="5" >Excellent</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb15"></div>
							<span id="fb15text"></span>
							</td>
							</tr>
							<tr><td>&nbsp;</td>
                                  <td>8.Instructions regarding Home program/follow-up care</td>
                                  <td colspan="5">
							   <div class="feed1"> <select id="fb16" name='srate16' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" >Bad</option>
								<option value="1" >Poor</option>
								<option value="2" >Fair</option>
								<option value="3" >Good</option>
								<option value="4" >Very Good</option>
								<option value="5" >Excellent</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb16"></div>
							<span id="fb16text"></span>
							</td>
							</tr>
							<tr><td>&nbsp;</td>
                                  <td>9.The thoroughness of the examination</td>
                                  <td colspan="5">
							   <div class="feed1"> <select id="fb17" name='srate17' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" >Bad</option>
								<option value="1" >Poor</option>
								<option value="2" >Fair</option>
								<option value="3" >Good</option>
								<option value="4" >Very Good</option>
								<option value="5" >Excellent</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb17"></div>
							<span id="fb17text"></span>
							</td>
							</tr>
							<tr><td>&nbsp;</td>
                                  <td>10.Advice given to you on ways to stay healthy</td>
                                  <td colspan="5">
							   <div class="feed1"> <select id="fb18" name='srate18' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" >Bad</option>
								<option value="1" >Poor</option>
								<option value="2" >Fair</option>
								<option value="3" >Good</option>
								<option value="4" >Very Good</option>
								<option value="5" >Excellent</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb18"></div>
							<span id="fb18text"></span>
							</td>
							</tr>
							<tr><td class="td">Our facility</td>
                                  <td>1.Hours of operation convenient for you</td>
                                  <td colspan="5">
							   <div class="feed1"> <select id="fb19" name='srate19' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" >Bad</option>
								<option value="1" >Poor</option>
								<option value="2" >Fair</option>
								<option value="3" >Good</option>
								<option value="4" >Very Good</option>
								<option value="5" >Excellent</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb19"></div>
							<span id="fb19text"></span>
							</td>
							</tr>
							<tr><td>&nbsp;</td>
                                  <td>2.Overall comfort</td>
                                  <td colspan="5">
							   <div class="feed1"> <select id="fb20" name='srate20' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" >Bad</option>
								<option value="1" >Poor</option>
								<option value="2" >Fair</option>
								<option value="3" >Good</option>
								<option value="4" >Very Good</option>
								<option value="5" >Excellent</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb20"></div>
							<span id="fb20text"></span>
							</td>
							</tr>
							<tr><td>&nbsp;</td>
                                  <td>3.Sinage and directions easy to follow</td>
                                  <td colspan="5">
							   <div class="feed1"> <select id="fb21" name='srate21' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" >Bad</option>
								<option value="1" >Poor</option>
								<option value="2" >Fair</option>
								<option value="3" >Good</option>
								<option value="4" >Very Good</option>
								<option value="5" >Excellent</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb21"></div>
							<span id="fb21text"></span>
							</td>
							</tr>
							<tr><td class="td">You Overall satisfaction with</td>
                                  <td>1.Our Practice1.Our Practice</td>
                                  <td colspan="5">
							   <div class="feed1"> <select id="fb22" name='srate22' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" >Bad</option>
								<option value="1" >Poor</option>
								<option value="2" >Fair</option>
								<option value="3" >Good</option>
								<option value="4" >Very Good</option>
								<option value="5" >Excellent</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb22"></div>
							<span id="fb22text"></span>
							</td>
							</tr>
							<tr><td>&nbsp;</td>
                                  <td>2.The quality of your medical care</td>
                                  <td colspan="5">
							   <div class="feed1"> <select id="fb23" name='srate23' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" >Bad</option>
								<option value="1" >Poor</option>
								<option value="2" >Fair</option>
								<option value="3" >Good</option>
								<option value="4" >Very Good</option>
								<option value="5" >Excellent</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb23"></div>
							<span id="fb23text"></span>
							</td>
							</tr>
							<tr><td>&nbsp;</td>
                                  <td>3.overall rating of care from your provider</td>
                                  <td colspan="5">
							   <div class="feed1"> <select id="fb24" name='srate24' class="chosen-select chosen-transparent form-control">
								<option value="0" selected="selected" >Bad</option>
								<option value="1" >Poor</option>
								<option value="2" >Fair</option>
								<option value="3" >Good</option>
								<option value="4" >Very Good</option>
								<option value="5" >Excellent</option>
							</select></div>
							<div class="rateit" data-rateit-backingfld="#fb24"></div>
							<span id="fb24text"></span>
							</td>
							</tr>
							<tr><td class="td">Would You Recommend The <?php echo $this->session->userdata('clinic_name') ?></td>
                                  <td><div class="form-group">
                             <div class="position-relative form-group"><label for="due_date" class=""> </label>
												  
												<div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-shadow btn-outline-primary">
                                                        <input type="radio" name="recommend" id="recommend" value="1" parsley-trigger="change" parsley-required="true"> 
                                                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </label>
                                                    <label class="btn btn-shadow btn-outline-primary">
                                                        <input type="radio" name="recommend" id="recommend1" value="0" parsley-trigger="change" parsley-required="true"> 
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No&nbsp;&nbsp;&nbsp;
                                                    </label>
								             </div>
											 </div>
                      </div>
							</td>
							</tr>
                                            
                                            </tbody>
                                        </table>
										  </div>
										  
										  <div class="divider"></div>
                                            <div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary" id="save">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
                                            </div>
											
										 
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                   </div>
				   </div>   
				   </div>   

				   
	<div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Feedback Has Been Saved Successfully</div></div></div>
    <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Feedback Has Not Been Saved Successfully</div></div></div>

	
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script type="text/javascript" src="<?php echo base_url()?>my_assets/assets/scripts/main.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.rateit.js" ></script>
<script>

$(document).ready(function() {

$("#backing2b").bind('rated', function (event, value) { $('#value5').text('You\'ve rated it: ' + value); });
    $("#backing2b").bind('reset', function () { $('#value5').text('Rating reset'); });
    $("#backing2b").bind('over', function (event, value) { $('#hover5').text('Hovering over: ' + value); });
	  
	$('.feed1').hide();
	
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
	
	});	

	
   $('#getschore').click(function(){
		var total = 0;
		$('#feedbacktable [name="srate[]"]').each(function(){
			total += ($(this).val() == '') ? 0 :  parseInt( $(this).val() );
		});
		total = total/24;
		//$('#totalrate').append('<div class="rateit" data-rateit-value="2" data-rateit-ispreset="true" data-rateit-readonly="true"></div>');
		//$('#totalrate').append('<div class="rateit" data-rateit-value="'+total+'" data-rateit-ispreset="true" data-rateit-readonly="true"></div>');
		//alert('<div class="rateit" data-rateit-value="2" data-rateit-ispreset="true" data-rateit-readonly="true"></div>');
	});
	
$(document).ready(function() {
  $('form').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
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
				window.location.href="<?php echo base_url().'client/feedback/views/'?>"
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
	  
	   $(document).ready(function() {
		var myDate = new Date();
			var prettyDate =(myDate.getDate()) + '/' + (myDate.getMonth()+1) + '/' +
					myDate.getFullYear();
		$(".datepicker").val(prettyDate);
	});
	  </script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5eceda798ee2956d73a53d09/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
	  </body>
</html>
