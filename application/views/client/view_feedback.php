<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/x-icon" />
<title> - Physio Plus Tech</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/uniform.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/select2.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/physio_reports.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/physio_media.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>font-awesome/css/font-awesome.css" />
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo base_url(); ?>flick/jquery-ui-1.10.2.custom.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.gritter.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/colorbox.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/physio_helper.css" />
<style>

@media (min-width: 768px) and (max-width: 979px) {
[class*="span"], .row-fluid [class*="span"] {
 display: block;
 float: left;
 margin-left: 2.76243%;
}
.row-fluid .span12 {
    width: 100%;
}
.row-fluid .span11 {
    width: 91.4365%;
}
.row-fluid .span10 {
    width: 82.8729%;
}
.row-fluid .span9 {
    width: 74.3094%;
}
.row-fluid .span8 {
    width: 65.7459%;
}
.row-fluid .span7 {
    width: 57.1823%;
}
.row-fluid .span6 {
    width: 48.6188%;
}
.row-fluid .span5 {
    width: 40.0552%;
}
.row-fluid .span4 {
    width: 31.4917%;
}
.row-fluid .span3 {
    width: 22.9282%;
}
.row-fluid .span2 {
    width: 14.3646%;
}
.row-fluid .span1 {
    width: 5.80111%;
}
}
 @media print
      {
	  
	   #printButton {

    display: none;

  }
  }
</style>
</head>
<center><body >
<div class="row-fluid" style="width: 900px; overflow-x: hidden; overflow-y: auto;" id="InvoiceContainer">
        <div class="widget-box" style="margin:0">
          <div class="widget-content">
          	<div class="row-fluid" style="text-align:center"><button type="button" id="printButton" class="btn-success">Print</button></div>
           <div class="table-responsive">
                     <?php foreach($feedbackinfo as $fbrecord){ ?>
                      <table class="table table-bordered table-sortable">
					      <tr>
						<td colspan="3"><table class="table table-bordered table-sortable">
						<tr><td>Patient Name : <?php echo '<span class="badge badge-important">'.$fbrecord['pfirst'].$fbrecord['plast'].'</span>'; ?></td>
						<!--<td>Consultant Name :</td>-->
						<td>Date : <?php echo '<span class="badge badge-warning">'.$fbrecord['visit_date'].'</span>'; ?></td></tr>
						
						</table>
						</td>
						</tr>
						<tr >
			<td height="64" colspan="7"><div align="center"><strong>FeedBack Information</strong></div></td>
		</tr>
		  <tr>
			<td height="34">&nbsp;</td>
			<td width="35%">&nbsp;</td>
			<td colspan="5"><div align="center">Rating</div>          
			</td>
			</tr>
			<td colspan="3"><table class="table table-bordered table-sortable">
						<tr><td height="34">Your Appointment</td>
						<td>1. Ease Of Making Appointment By Phone</td>
						<td colspan="5"><?php
					$i=0;
					while($i<$fbrecord['your_apoinment1']){
						echo '<img src="'.base_url().'img/gstar.png">';
						$i++;
					}
				?></td></tr>
						<tr><td height="34">&nbsp;</td>
						<td>2.The efficiency of the Registration</td>
						<td colspan="5"><?php
					$i=0;
					while($i<$fbrecord['your_apoinment2']){
						echo '<img src="'.base_url().'img/gstar.png">';
						$i++;
					}
				?></td></tr>
				<tr><td height="34">&nbsp;</td>
						<td>3.Keeping you infrormed of your appointment time</td>
						<td colspan="5"><?php
					$i=0;
					while($i<$fbrecord['your_apoinment3']){
						echo '<img src="'.base_url().'img/gstar.png">';
						$i++;
					}
				?></td></tr>
				<tr><td height="34">&nbsp;</td>
						<td>4.waiting time in resception area</td>
						<td colspan="5"><?php
					$i=0;
					while($i<$fbrecord['your_apoinment4']){
						echo '<img src="'.base_url().'img/gstar.png">';
						$i++;
					}
				?></td></tr>
				<tr><td height="34">Our Staff</td>
						<td>1.The frindliness and courtesy of receptionist</td>
						<td colspan="5"><?php
					$i=0;
					while($i<$fbrecord['our_staff1']){
						echo '<img src="'.base_url().'img/gstar.png">';
						$i++;
					}
				?></td></tr>
				<tr><td height="34">&nbsp;</td>
						<td>2.the caring concern of our therapist</td>
						<td colspan="5"><?php
					$i=0;
					while($i<$fbrecord['our_staff2']){
						echo '<img src="'.base_url().'img/gstar.png">';
						$i++;
					}
				?></td></tr>
				<tr><td height="34">&nbsp;</td>
						<td>3.The Helpfulness of our staff</td>
						<td colspan="5"><?php
					$i=0;
					while($i<$fbrecord['our_staff3']){
						echo '<img src="'.base_url().'img/gstar.png">';
						$i++;
					}
				?></td></tr>
				<tr><td height="34">&nbsp;</td>
						<td>4.The professionalism of our staff</td>
						<td colspan="5"><?php
					$i=0;
					while($i<$fbrecord['our_staff4']){
						echo '<img src="'.base_url().'img/gstar.png">';
						$i++;
					}
				?></td></tr>
				<tr><td height="34">Our Communication With You</td>
						<td>1.Is Your Phone Call Answered Promptly</td>
						<td colspan="5"><?php
					$i=0;
					while($i<$fbrecord['our_comun1']){
						echo '<img src="'.base_url().'img/gstar.png">';
						$i++;
					}
				?></td></tr>
				<tr><td height="34">&nbsp;</td>
						<td>2.Expalanation Of Your Procedure</td>
						<td colspan="5"><?php
					$i=0;
					while($i<$fbrecord['our_comun2']){
						echo '<img src="'.base_url().'img/gstar.png">';
						$i++;
					}
				?></td></tr>
				<tr><td height="34">&nbsp;</td>
						<td>3.Effectiveness Of Our Health Information Materal</td>
						<td colspan="5"><?php
					$i=0;
					while($i<$fbrecord['our_comun3']){
						echo '<img src="'.base_url().'img/gstar.png">';
						$i++;
					}
				?></td></tr>
				<tr><td height="34">&nbsp;</td>
						<td>4.Willingness to listen carefully to you</td>
						<td colspan="5"><?php
					$i=0;
					while($i<$fbrecord['our_comun4']){
						echo '<img src="'.base_url().'img/gstar.png">';
						$i++;
					}
				?></td></tr>
				<tr><td height="34">&nbsp;</td>
						<td>5.Taking time to answer your question</td>
						<td colspan="5"><?php
					$i=0;
					while($i<$fbrecord['our_comun5']){
						echo '<img src="'.base_url().'img/gstar.png">';
						$i++;
					}
				?></td></tr>
				<tr><td height="34">&nbsp;</td>
						<td>6.Amount of time spent with you</td>
						<td colspan="5"><?php
					$i=0;
					while($i<$fbrecord['our_comun6']){
						echo '<img src="'.base_url().'img/gstar.png">';
						$i++;
					}
				?></td></tr>
				<tr><td height="34">&nbsp;</td>
						<td>7.Explaining things in a way you could understand</td>
						<td colspan="5"><?php
					$i=0;
					while($i<$fbrecord['our_comun7']){
						echo '<img src="'.base_url().'img/gstar.png">';
						$i++;
					}
				?></td></tr>
				<tr><td height="34">&nbsp;</td>
						<td>8.Instructions regarding Home program/follow-up care</td>
						<td colspan="5"><?php
					$i=0;
					while($i<$fbrecord['our_comun8']){
						echo '<img src="'.base_url().'img/gstar.png">';
						$i++;
					}
				?></td></tr>
				<tr><td height="34">&nbsp;</td>
						<td>9.The thoroughness of the examination</td>
						<td colspan="5"><?php
					$i=0;
					while($i<$fbrecord['our_comun9']){
						echo '<img src="'.base_url().'img/gstar.png">';
						$i++;
					}
				?></td></tr>
				<tr><td height="34">&nbsp;</td>
						<td>10.Advice given to you on ways to stay healthy</td>
						<td colspan="5"><?php
					$i=0;
					while($i<$fbrecord['our_comun10']){
						echo '<img src="'.base_url().'img/gstar.png">';
						$i++;
					}
				?></td></tr>
				<tr><td height="34">Our facility</td>
						<td>1.Hours of operation convenient for you</td>
						<td colspan="5"><?php
					$i=0;
					while($i<$fbrecord['our_facility1']){
						echo '<img src="'.base_url().'img/gstar.png">';
						$i++;
					}
				?></td></tr>
				<tr><td height="34">&nbsp;</td>
						<td>2.Overall comfort</td>
						<td colspan="5"><?php
					$i=0;
					while($i<$fbrecord['our_facility2']){
						echo '<img src="'.base_url().'img/gstar.png">';
						$i++;
					}
				?></td></tr>
				<tr><td height="34">&nbsp;</td>
						<td>3.Sinage and directions easy to follow</td>
						<td colspan="5"><?php
					$i=0;
					while($i<$fbrecord['our_facility3']){
						echo '<img src="'.base_url().'img/gstar.png">';
						$i++;
					}
				?></td></tr>
						<tr><td height="34">You Overall satisfaction with</td>
						<td>1.Our Practice</td>
						<td colspan="5"><?php
					$i=0;
					while($i<$fbrecord['satisfaction1']){
						echo '<img src="'.base_url().'img/gstar.png">';
						$i++;
					}
				?></td></tr>
				<tr><td height="34">&nbsp;</td>
						<td>2.The quality of your medical care</td>
						<td colspan="5"><?php
					$i=0;
					while($i<$fbrecord['satisfaction2']){
						echo '<img src="'.base_url().'img/gstar.png">';
						$i++;
					}
				?></td></tr>
				<tr><td height="34">&nbsp;</td>
						<td>3.overall rating of care from your provider</td>
						<td colspan="5"><?php
					$i=0;
					while($i<$fbrecord['satisfaction3']){
						echo '<img src="'.base_url().'img/gstar.png">';
						$i++;
					}
				?></td></tr>
					<tr><td height="77">WHOULD YOU RECOMMEND THE AVEDA</td>
					<td colspan="6"><?php 
				switch($fbrecord['recommend']){
					case '1':
							echo '<img src="'.base_url().'img/like.png">';
							break;
					case '0':
							echo '<img src="'.base_url().'img/dislik.png">';
							break;
				}
				?></td></tr>
						</table></td>
		 
		<?php } ?>
						
        </div>
           
			<hr>
			
          </div>
        </div>
    </div></center>
<script src="<?php echo base_url(); ?>js/excanvas.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery-ui-1.10.2.custom.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.gritter.min.js"></script> 
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.peity.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.colorbox-min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.form.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.alerts.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#printButton').click(function(e) {
        window.print();
    });
	parent.$.colorbox.resize({innerWidth:750, innerHeight: $('#InvoiceContainer').outerHeight() });
});
</script>
</body>
</html>