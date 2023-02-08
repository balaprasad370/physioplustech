<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Physio Plus Tech</title>
     
    <link rel="icon" type="image/ico" href="<?php echo base_url() ?>assets/images/favicon.ico" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/jgrowl/css/jquery.jgrowl.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/datepicker/css/bootstrap-datetimepicker.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/colorpicker/css/bootstrap-colorpicker.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/colorpalette/bootstrap-colorpalette.css">
	
	<link href="<?php echo base_url()?>my_assets/main.css" rel="stylesheet"> 
     <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/mdp.css">
	 <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/prettify.css">
	     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
<script src="<?php echo base_url() ?>assets/sweet-alert/sweetalert.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/sweet-alert/sweetalert.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.gritter.css" />
	  
	   <link rel="stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> 
	   
	   
	   
	   <script type="text/javascript" src="<?php echo base_url() ?>assets/js/prettify.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/lang-css.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-1.11.1.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui-1.11.1.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui.multidatespicker.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>my_assets/assets/scripts/main.js"></script>
		<script src="<?php echo base_url();?>assets/parsley/parsley.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
  <style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}


input[type=radio] {

  width: 20px;
        height: 20px;
}
#scoreCheck label{
	padding-top:5px;
	text-align:center;
	width: 70px;
	height: 40px;
	font-size:large;
}

.btn-group-toggle label{
	padding-top:20px;
	text-align:center;
	width: 70px;
	height: 40px;
	font-size:large;
}

.create
{
	font-size:large;
}
.create input
{
	font-size:large;
	
}

#assess_date{
	font-size:large;
}
#assess{
	font-size:large;
}
<!--
input[type='radio']:after {
        width: 20px;
        height: 20px;
        border-radius: 20px;
        top: -2px;
        left: -1px;
        position: relative;
        background-color: #d1d3d1;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
    }

    input[type='radio']:checked:after {
        width: 20px;
        height: 20px;
        border-radius: 20px;
        top: -2px;
        left: -1px;
        position: relative;
        background-color: #ffa500;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
    }-->



</style>
  
  </head>
  <body>
<div class="panel panel-primary" style="margin:20px;">
	<div class="panel-heading">
        <center><h3 class="panel-title"><b><?php echo $clientDetails['clinic_name'];?></b></br>
		<!--</br>Contributed by : <b>SRM Medical College Hospital And Research Centre, Chennai.</b> </br>-->
		</br><b>Paediatric - Gross Motor Function Measure(GMFM)</b>
		</center></h3>
	</div>
<div class="panel-body">
    <form action="<?php echo base_url().'assessment/add_paediatric_GMFM_LR' ?>" method="post">
<div class="col-md-12 col-sm-12">
   <!--<div class="form-group col-md-6 col-sm-6">
            <label >ASSESSMENT DATE  *	</label>
                 <input class="datepicker form-control" type="date"  id="assess_date" name="assess_date" required/> 
	</div>-->
	<div class="form-group col-md-6 col-sm-6">
                        <label id="assess" for="datepicker" class="col-sm-4 control-label">Assessment Date</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control datepicker assess_date" id="assess_date" name="assess_date" data-date-format='DD/MM/YYYY'>
                        </div>
                      </div>  <!--Assessment date ends -->
	     <input type="hidden" class="form-control" value="<?php echo $this->uri->segment(3); ?>" name="patient_id" id="patient_id" placeholder="">
         <input type="hidden" name="client_id" value="<?php echo $this->session->userdata('client_id'); ?>" id="client_id" />
          
      	 <div style="width:95%; display:none;" class="view" >
						<input type="hidden" name="assess_id" id="assess_id" />
      					<center><a class="btn btn-info edit" style="border-radius: 70px; width:40%; height:35px;  background-color:#088AEC; color:white;" >
					Edit</a><a class="btn btn-info print" style="border-radius: 70px; width:40%; height:35px;  background-color:#088AEC; color:white;" >
					Print</a>
						</center></br></br></div>
	<div class="create">
		<div class="form-group col-md-6 col-sm-6">
            <label >Child Name  *	</label>
            <input type="text" name="name" value="<?php echo $patient['first_name'].' '.$patient['last_name']; ?>" class="form-control input-sm" id="name" readonly>
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Date of Birth  *	</label>
            <input class="datepicker form-control" type="date" value="<?php echo $patient['dob']; ?>"  id="dob" name="dob" readonly/> 
	  </div>
        <div class="form-group col-md-6 col-sm-6">
            <label >BIRTH WEIGHT </label>
            <input type="text" name="b_weight" value="" class="form-control input-sm" >
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >EVALUATOR'S NAME: </label>
            <input type="text" name="evaluator" value="" class="form-control input-sm" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >AGE / SEX</label>
            <input type="text" name="age" value="<?php echo $patient['age']; ?>" class="form-control input-sm" readonly>
        </div>
		
	  <!--<div class="form-group col-md-6 col-sm-6">
            <label for="mobile">UHID NO</label>
            <input type="text"  name="uhid" class="form-control input-sm" id="uhid" placeholder="">
        </div>-->
		
		<div class="form-group col-md-3 col-sm-6">
            <label for="5">Patient Code</label>
            <input type="text" class="form-control input-sm" id="5" value="<?php echo $patient['patient_code'];?>" readonly autocomplete="off">
        </div>
		
		<div class="form-group col-md-12 col-sm-12">
        <p style="color:#63C0EE;">Testing Condition (e.g., room, clothing, time, others present):</p>
        
		</div>
		
		
     </div><!-- class create ends-->
	 
	 <div class="form-group col-md-6 col-sm-6">
        <p style="color:black;font-size:large">Check Appropriate scrore: If an item is not tested(NT)</p>
	</div>
	 
	 <div class = "form-group col-md-12 col-sm-12" style="overflow-x:auto;">
	<table id="lying" border=1  >
		    <tr>
			<th>ITEM</th>
			<th style="width:70%">A: LYING & ROLLING</th>
			<th colspan="5">SCORE</th>
			</tr>
			<tr>
			<td>1</td>
			<td>SUP, HEAD IN MIDLINE: Turns Head with Extremities Symmetrical</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="LR-1" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="LR-1" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="LR-1" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="LR-1" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="LR-1" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			<tr>
			<td>2</td>
			<td>SUP: Brings snds to Midline, Fingers one with other</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="LR-2" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="LR-2" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="LR-2" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="LR-2" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="LR-2" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			<tr>
			<td>3</td>
			<td>SUP: Lifts Head 45Deg</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="LR-3" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="LR-3" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="LR-3" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="LR-3" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="LR-3" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			<tr>
			<td>4</td>
			<td>SUP: Flexes R Hip & Knee Througn full Range</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="LR-4" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="LR-4" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="LR-4" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="LR-4" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="LR-4" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			<tr>
			<td>5</td>
			<td>SUP: Flexes L Hip & Knee Througn full Range</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="LR-5" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="LR-5" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="LR-5" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="LR-5" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="LR-5" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			<tr>
			<td>6</td>
			<td>SUP: Reaches Out With R Arm, Hand crosses Midline toward Toy</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="LR-6" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="LR-6" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="LR-6" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="LR-6" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="LR-6" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			<tr>
			<td>7</td>
			<td>SUP: Reaches Out With R Arm, Hand crosses Midline toward Toy</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="LR-7" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="LR-7" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="LR-7" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="LR-7" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="LR-7" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			<tr>
			<td>8</td>
			<td>SUP: Rolls to PR over R side</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="LR-8" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="LR-8" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="LR-8" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="LR-8" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="LR-8" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			<tr>
			<td>9</td>
			<td>SUP: Rolls to PR over R side</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="LR-9" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="LR-9" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="LR-9" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="LR-9" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="LR-9" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			<tr>
			<td>10</td>
			<td>PR: Lifts Head Upright</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="LR-10" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="LR-10" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="LR-10" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="LR-10" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="LR-10" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			<tr>
			<td>11</td>
			<td>PR ON FOREARMS: Lifts Head Upright, Elbows Ext, Chest Raised</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="LR-11" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="LR-11" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="LR-11" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="LR-11" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="LR-11" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			<tr>
			<td>12</td>
			<td>PR ON FOREARMS: Weight on R Forearm, fully extends oposite Arm Forward</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="LR-12" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="LR-12" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="LR-12" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="LR-12" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="LR-12" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			<tr>
			<td>13</td>
			<td>PR ON FOREARMS: Weight on L Forearm, fully extends oposite Arm Forward</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="LR-13" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="LR-13" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="LR-13" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="LR-13" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="LR-13" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			<tr>
			<td>14</td>
			<td>PR: Rolls to SUP over R side</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="LR-14" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="LR-14" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="LR-14" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="LR-14" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="LR-14" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			<tr>
			<td>15</td>
			<td>PR: Rolls to SUP over L side</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="LR-15" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="LR-15" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="LR-15" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="LR-15" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="LR-15" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			<td>16</td>
			<td>PR: Pivots to R 90Deg using Extremities</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="LR-16" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="LR-16" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="LR-16" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="LR-16" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="LR-16" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			<td>17</td>
			<td>PR: Pivots to R 90Deg using Extremities</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="LR-17" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="LR-17" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="LR-17" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="LR-17" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="LR-17" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			
			<tr>
			<td colspan="2" text-align="right">TOTAL DIMENSION A</td>
			<td colspan="5"><input type="text" name="dimensionA" id="dimA" class="form-control input-sm"  style="width:100%;" /></td>
			</tr>
	</table></div></br>
	
	
	<div class = "form-group col-md-12 col-sm-12" style="overflow-x:auto;">
	<table id="sitting" border=1  >
		    <tr>
			<th>ITEM</th>
			<th style="width:70%">B: SITTING</th>
			<th colspan="5">SCORE</th>
			
			</tr>
			<tr>
			<td>18</td>
			<td>SUP, HANDS GRASPED BY EXAMINER: Pulls self to sitting with Head control</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="SI-18" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="SI-18" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="SI-18" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="SI-18" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="SI-18" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			<tr>
			<td>19</td>
			<td>SUP, Rolls to R side, Attains Sitting</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="SI-19" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="SI-19" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="SI-19" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="SI-19" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="SI-19" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			<tr>
			<td>20</td>
			<td>SUP, Rolls to L side, Attains Sitting</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="SI-20" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="SI-20" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="SI-20" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="SI-20" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="SI-20" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			<tr>
			<td>21</td>
			<td>SIT ON MAT, SUPPORTED AT THORAX BY THERAPIST: Lifts Head Upright, maintains 3 seconds</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="SI-21" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="SI-21" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="SI-21" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="SI-21" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="SI-21" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			<tr>
			<td>22</td>
			<td>SIT ON MAT, SUPPORTED AT THORAX BY THERAPIST: Lifts Head Midline, maintains 10 seconds</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="SI-22" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="SI-22" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="SI-22" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="SI-22" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="SI-22" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			<tr>
			<td>23</td>
			<td>SIT ON MAT, Arm(s) Propping: Maintains, 5 seconds</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="SI-23" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="SI-23" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="SI-23" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="SI-23" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="SI-23" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			<tr>
			<td>24</td>
			<td>SIT ON MAT, Maintains Arms Free, 3 seconds</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="SI-24" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="SI-24" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="SI-24" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="SI-24" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="SI-24" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			<tr>
			<td>25</td>
			<td>SIT ON MAT with Small Toy in Front: Leans Forward, Touchstoy, Re-Erects without Arm Propping</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="SI-25" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="SI-25" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="SI-25" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="SI-25" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="SI-25" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			<tr>
			<td>26</td>
			<td>SIT ON MAT, Touches Toy placed 45Deg behind Child's R Side, Returns to Start</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="SI-26" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="SI-26" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="SI-26" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="SI-26" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="SI-26" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			<tr>
			<td>27</td>
			<td>SIT ON MAT, Touches Toy placed 45Deg behind Child's L Side, Returns to Start</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="SI-27" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="SI-27" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="SI-27" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="SI-27" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="SI-27" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			<tr>
			<td>28</td>
			<td>R SIDE SIT: Maintains Arms Free, 5 seconds</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="SI-28" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="SI-28" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="SI-28" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="SI-28" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="SI-8" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			<tr>
			<td>29</td>
			<td>L SIDE SIT: Maintains Arms Free, 5 seconds</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="SI-29" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="SI-29" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="SI-29" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="SI-29" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="SI-29" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			<tr>
			<td>30</td>
			<td>SIT ON MAT, Lowers to PR with Control</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="SI-30" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="SI-30" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="SI-30" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="SI-30" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="SI-30" value="NT" checked="checked" autocomplete="off">
			</div></td>
			</tr>
			<tr>
			<td>31</td>
			<td>SIT ON MAT WITH FEET IN FRONT: Attains 4 Point over R side </td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="SI-31" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="SI-31" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="SI-31" value="2" autocomplete="off"></label>
		    <label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="SI-31" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="SI-31" value="NT" checked="checked" autocomplete="off">
			</div></td>
			</tr>
			<tr>
			<td>32</td>
			<td>SIT ON MAT WITH FEET IN FRONT: Attains 4 Point over L side </td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="SI-32" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="SI-32" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="SI-32" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="SI-32" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="SI-32" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			<tr>
			<td>33</td>
			<td>SIT ON MAT, Pivots 90Deg, without Arms assisting</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="SI-33" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="SI-33" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="SI-33" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="SI-33" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="SI-33" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			<tr>
			<td>34</td>
			<td> SIT ON BENCH: Maintains, Arms and Feet Free, 10 seconds</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="SI-34" value="0" autocomplete="off"></label>
		    <label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="SI-34" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="SI-34" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="SI-34" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="SI-34" value="NT" checked="checked" autocomplete="off"></label>
			</div></td>
			</tr>
			<tr>
			<td>35</td>
			<td>STD: Attains Sit on Small Bench</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="SI-35" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="SI-35" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="SI-35" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="SI-35" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="SI-35" value="NT" checked="checked" autocomplete="off"></label>
			</div>
			</td>
			</tr>
			<tr>
			<td>36</td>
			<td>ON THE FLOOR: Attains Sit on Small Bench</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="SI-36" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="SI-36" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="SI-36" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="SI-36" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="SI-36" value="NT" checked="checked" autocomplete="off"></label>
			</div>
			</td>
			</tr>
			<tr>
			<td>37</td>
			<td>ON THE FLOOR: Attains Sit on Large Bench</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="SI-37" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="SI-37" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="SI-37" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="SI-37" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="SI-37" value="NT" checked="checked" autocomplete="off"></label>
			</div>
			</td>
			</tr>
			<tr>
			<td colspan="2" text-align="right">TOTAL DIMENSION B</td>
			<td colspan="5"><input type="text" name="dimensionB" id="dimB" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
			
	</table></div></br>
	 
	 <div class = "form-group col-md-12 col-sm-12" style="overflow-x:auto;">
	<table id="crawling" border=1  >
		    <tr>
			<th>ITEM</th>
			<th style="width:70%">C: CRAWLING & KNEELING</th>
			<th colspan="5">SCORE</th>
			
			</tr>
			<tr>
			<td>38</td>
			<td>PR: CREEPS FORWARD 1.8m(6')</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="CK-38" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="CK-38" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="CK-38" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="CK-38" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="CK-38" value="NT" checked="checked" autocomplete="off"></label>
			</div>
			</td>
			</tr>
			<tr>
			<td>39</td>
			<td>4 POINT: Maintains, Weight on Hands and Knees, 10 seconds</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="CK-39" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="CK-39" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="CK-39" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="CK-39" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="CK-39" value="NT" checked="checked" autocomplete="off"></label>
			</div>
			</td>
			</tr>
			<tr>
			<td>40</td>
			<td>4 POINT: Attains Sit Arms Free</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="CK-40" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="CK-40" value="1" autocomplete="off" ></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="CK-40" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="CK-40" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="CK-40" value="NT" checked="checked" autocomplete="off"></label>
			</div>
			</td>
			</tr>
			<tr>
			<td>41</td>
			<td>PR:Attains 4 POINT, Weight on Hands and Knees </td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="CK-41" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="CK-41" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="CK-41" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="CK-41" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="CK-41" value="NT" checked="checked" autocomplete="off"></label>
			</div>
			</td>
			
			</tr>
			<tr>
			<td>42</td>
			<td>4 POINT: Reaches Forward with R Arm, Hand above Shoulder Level</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="CK-42" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="CK-42" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="CK-42" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="CK-42" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="CK-42" value="NT" checked="checked" autocomplete="off"></label>
			</div>
			</td>
			
			</tr>
			<tr>
			<td>43</td>
			<td>4 POINT: Reaches Forward with L Arm, Hand above Shoulder Level</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="CK-43" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="CK-43" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="CK-43" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="CK-43" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="CK-43" value="NT" checked="checked" autocomplete="off"></label>
			</div>
			</td>
			</tr>
			<tr>
			<td>44</td>
			<td>4 POINT: Crawls Or Hitches Forward 1.8m(6')</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="CK-44" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="CK-44" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="CK-44" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="CK-44" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="CK-44" value="NT" checked="checked" autocomplete="off"></label>
			</div>
			</td>
			</tr>
			<tr>
			<td>45</td>
			<td>4 POINT: Crawls Reciprocally Forward 1.8m(6')</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="CK-45" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="CK-45" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="CK-45" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="CK-45" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="CK-45" value="NT" checked="checked" autocomplete="off"></label>
			</div>
			</td>
			</tr>
			<tr>
			<td>46</td>
			<td>4 POINT: Crawls Up 4 Steps on Hands and Knees/Feet</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="CK-46" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="CK-46" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="CK-46" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="CK-46" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="CK-46" value="NT" checked="checked" autocomplete="off"></label>
			</div>
			</td>
			</tr>
			<tr>
			<td>47</td>
			<td>4 POINT: Crawls Backwards Down 4 Steps on Hands and Knees/Feet</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="CK-47" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="CK-47" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="CK-47" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="CK-47" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="CK-47" value="NT" checked="checked" autocomplete="off"></label>
			</div>
			</td>
			</tr>
			<tr>
			<td>48</td>
			<td>SIT ON MAT: Attains High KN using Arms, Maintains, Arms Free, 10 Seconds</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="CK-48" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="CK-48" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="CK-48" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="CK-48" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="CK-48" value="NT" checked="checked" autocomplete="off"></label>
			
			</div>
			</td>
			</tr>
			<tr>
			<td>49</td>
			<td>HIGH KN:Attains Half KN on R Knee using Arms, Maintains, Arms Free, 10 Seconds</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="CK-49" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="CK-49" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="CK-49" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="CK-49" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="CK-49" value="NT" checked="checked" autocomplete="off"></label>
			</div>
			</tr>
			<tr>
			<td>50</td>
			<td>HIGH KN:Attains Half KN on L Knee using Arms, Maintains, Arms Free, 10 Seconds</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="CK-50" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="CK-50" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="CK-50" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="CK-50" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="CK-50" value="NT" checked="checked" autocomplete="off"></label>
			</div>
			</td>
			</tr>
			<tr>
			<td>51</td>
			<td>HIGH KN: KN Walks Forward 10 Steps, Arms Free</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="CK-51" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="CK-51" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="CK-51" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="CK-51" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="CK-51" value="NT" checked="checked" autocomplete="off"></label>
			</div>
			</td>
			</tr>
			
			
			<tr>
			<td colspan="2" text-align="right">TOTAL DIMENSION C</td>
			<td colspan="5"><input type="text" name="dimensionC" id="dimC" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
	</table></div></br>
	
	<div class = "form-group col-md-12 col-sm-12" style="overflow-x:auto;">
	<table id="standing" border=1  >
		    <tr>
			<th>ITEM</th>
			<th style="width:70%">D: STANDING</th>
			<th colspan="5">SCORE</th>
			
			</tr>
			<tr>
			<td>52</td>
			<td>ON THE FLOOR: Pulls to STD at Large Bench</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="ST-52" value="0"  autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="ST-52" value="1"  autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="ST-52" value="2"  autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="ST-52" value="3"  autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="ST-52" value="NT" checked="checked"  autocomplete="off"></label>
			</div>
			</td>
			</tr>
			<tr>
			<td>53</td>
			<td>STD: Maintains, Arms Free, 3 Seconds</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="ST-53" value="0"  autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="ST-53" value="1"  autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="ST-53" value="2"  autocomplete="off"></label>
		    <label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="ST-53" value="3"  autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="ST-53" value="NT" checked="checked"  autocomplete="off"></label>
			</div>
			</td>
			</tr>
			<tr>
			<td>54</td>
			<td>STD: Holding on to Large Bench with One Hand, Lifts R Foot, 3 Seconds</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="ST-54" value="0"  autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="ST-54" value="1"  autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="ST-54" value="2"  autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="ST-54" value="3"  autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="ST-54" value="NT" checked="checked"  autocomplete="off"></label>
			</div>
			</td>
			</tr>
			<tr>
			<td>55</td>
			<td>STD: Holding on to Large Bench with One Hand, Lifts L Foot, 3 Seconds</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="ST-55" value="0"  autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="ST-55" value="1"  autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="ST-55" value="2"  autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="ST-55" value="3"  autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="ST-55" value="NT" checked="checked"  autocomplete="off"></label>
			</div>
			</td>
			</tr>
			<tr>
			<td>56</td>
			<td>STD: Maintains, Arms Free, 20 Seconds</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="ST-56" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="ST-56" value="1"  autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="ST-56" value="2"  autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="ST-56" value="3"  autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="ST-56" value="NT" checked="checked"  autocomplete="off"></label>
			</div>
			</td>
			</tr>
			<tr>
			<td>57</td>
			<td>STD: Lifts L Foot, Arms Free, 10 Seconds</td>
		    <td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="ST-57" value="0"  autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="ST-57" value="1"  autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="ST-57" value="2"  autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="ST-57" value="3"  autocomplete="off"></label>
		    <label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="ST-57" value="NT" checked="checked"  autocomplete="off"></label>
			</div>
			</td>
			</tr>
			<tr>
			<td>58</td>
			<td>STD: Lifts R Foot, Arms Free, 10 Seconds</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="ST-58" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="ST-58" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="ST-58" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="ST-58" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="ST-58" value="NT" checked="checked" autocomplete="off"></label>
			</div>
			</td>
			</tr>
			<tr>
			<td>59</td>
			<td>SIT ON SMALL BENCH: Attains STD without using Arms</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="ST-59" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="ST-59" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="ST-59" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="ST-59" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="ST-59" value="NT" checked="checked" autocomplete="off"></label>
			</div>
			</td>
			</tr>
			<tr>
			<td>60</td>
			<td>HIGH KN: Attains STD Through Half KN on R Knee, Without using Arms</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="ST-60" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="ST-60" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="ST-60" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="ST-60" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="ST-60" value="NT" checked="checked" autocomplete="off"></label>
			</td>
			</tr>
			<tr>
			<td>61</td>
			<td>HIGH KN: Attains STD Through Half KN on L Knee, Without using Arms</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="ST-61" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="ST-61" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="ST-61" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="ST-61" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="ST-61" value="NT" checked="checked" autocomplete="off"></label>
			</div>
			</td>
			</tr>
			
			<tr>
			<td>62</td>
			<td>STD: Lowers to Sit on Floor with Control, Arms Free</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="ST-62" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="ST-62" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="ST-62" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="ST-62" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="ST-62" value="NT" checked="checked" autocomplete="off"></label>
			</div>
			</td>
			
			</tr>
			<tr>
			<td>63</td>
			<td>STD: Attains SQUAT,Arms Free</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="ST-63" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="ST-63" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="ST-63" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="ST-63" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="ST-63" value="NT" checked="checked" autocomplete="off"></label>
			</div>
			</td>
			</tr>
			<tr>
			<td>64</td>
			<td>STD: Picks up Object from Floor, Arms Free, Returns to Stand</td>
			<td colspan="5">
		    <div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">

			<label class="btn btn-shadow btn-outline-primary">0<input type="radio" id="score-0" name="ST-64" value="0" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">1<input type="radio" id="score-1" name="ST-64" value="1" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">2<input type="radio" id="score-2" name="ST-64" value="2" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary">3<input type="radio" id="score-3" name="ST-64" value="3" autocomplete="off"></label>
			<label class="btn btn-shadow btn-outline-primary active">NT<input type="radio" id="score-NT" name="ST-64" value="NT" checked="checked" autocomplete="off"></label>
			
			
			</div>
			</td>
			</tr>
			
			<tr>
			<td colspan="2" text-align="right">TOTAL DIMENSION D</td>
			<td colspan="5"><input type="text" name="dimensionD" id="dimD" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
	</table></div></br>
	
	<div class = "form-group col-md-12 col-sm-12" style="overflow-x:auto;">
	<table id="walking" border=1  >
		    <tr>
			<th>ITEM</th>
			<th style="width:70%">E: WALKING, RUNNING & JUMPING</th>
			<th colspan="5">SCORE</th>
			</tr>
			<tr>
			<td>65</td>
			<td>STD, 2 HANDS ON LARGE BENCH: Cruises 3 Steps to R</td>
			<td colspan="5">
			<h5>
			<div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
	<label class="btn btn-shadow btn-outline-primary">
	<input type="radio" id="score-0" name="WRJ-65" value="0"  autocomplete="off"> 
	0
	</label>
	<label class="btn btn-shadow btn-outline-primary">
	<input type="radio" id="score-1" name="WRJ-65" value="1" autocomplete="off" > 
	1
	</label>
	<label class="btn btn-shadow btn-outline-primary">
	<input type="radio" id="score-2" name="WRJ-65" value="2" autocomplete="off"  > 
	2
	</label>
	<label class="btn btn-shadow btn-outline-primary">
	<input type="radio" id="score-3" name="WRJ-65" value="3"  autocomplete="off" > 
	3
	</label>
	<label class="btn btn-shadow btn-outline-primary active">
	<input type="radio" id="score-NT" name="WRJ-65" value="NT" autocomplete="off" checked=""> 
	NT
	</label>
	</div>
	</h5>
	</td>
			</tr>
			
			
			<tr>
			<td>66</td>
			<td>STD, 2 HANDS ON LARGE BENCH: Cruises 3 Steps to L</td>
			<td colspan="5">
			<h5>
			<div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
	<label class="btn btn-shadow btn-outline-primary">
	<input type="radio" id="score-0" name="WRJ-66" value="0"  autocomplete="off"> 
	0
	</label>
	<label class="btn btn-shadow btn-outline-primary">
	<input type="radio" id="score-1" name="WRJ-66" value="1" autocomplete="off" > 
	1
	</label>
	<label class="btn btn-shadow btn-outline-primary">
	<input type="radio" id="score-2" name="WRJ-66" value="2" autocomplete="off"  > 
	2
	</label>
	<label class="btn btn-shadow btn-outline-primary">
	<input type="radio" id="score-3" name="WRJ-66" value="3"  autocomplete="off" > 
	3
	</label>
	<label class="btn btn-shadow btn-outline-primary active">
	<input type="radio" id="score-NT" name="WRJ-66" value="NT" autocomplete="off" checked=""> 
	NT
	</label>
	</div>
	</h5>
	</td>
			</tr>
			
			<tr>
			<td>67</td>
			<td>STD, 2 HANDS HELD: Walks Forward 10 Steps</td>
			<td colspan="5">
			<h5>
			<div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
	<label class="btn btn-shadow btn-outline-primary">
	<input type="radio" id="score-0" name="WRJ-67" value="0"  autocomplete="off"> 
	0
	</label>
	<label class="btn btn-shadow btn-outline-primary">
	<input type="radio" id="score-1" name="WRJ-67" value="1" autocomplete="off" > 
	1
	</label>
	<label class="btn btn-shadow btn-outline-primary">
	<input type="radio" id="score-2" name="WRJ-67" value="2" autocomplete="off"  > 
	2
	</label>
	<label class="btn btn-shadow btn-outline-primary">
	<input type="radio" id="score-3" name="WRJ-67" value="3"  autocomplete="off" > 
	3
	</label>
	<label class="btn btn-shadow btn-outline-primary active">
	<input type="radio" id="score-NT" name="WRJ-67" value="NT" autocomplete="off" checked=""> 
	NT
	</label>
	</div>
	</h5>
	</td>
			</tr>
			
			<tr>
			<td>68</td>
			<td>STD , 1 HAND HELD: Walks Forward 10 Steps</td>
			<td colspan="5">
			<h5>
			<div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
	<label class="btn btn-shadow btn-outline-primary">
	<input type="radio" id="score-0" name="WRJ-68" value="0"  autocomplete="off"> 
	0
	</label>
	<label class="btn btn-shadow btn-outline-primary">
	<input type="radio" id="score-1" name="WRJ-68" value="1" autocomplete="off" > 
	1
	</label>
	<label class="btn btn-shadow btn-outline-primary">
	<input type="radio" id="score-2" name="WRJ-68" value="2" autocomplete="off"  > 
	2
	</label>
	<label class="btn btn-shadow btn-outline-primary">
	<input type="radio" id="score-3" name="WRJ-68" value="3"  autocomplete="off" > 
	3
	</label>
	<label class="btn btn-shadow btn-outline-primary active">
	<input type="radio" id="score-NT" name="WRJ-68" value="NT" autocomplete="off" checked=""> 
	NT
	</label>
	</div>
	</h5>
	</td>
			</tr>
			
			<tr>
			<td>69</td>
			<td>STD: Walks Forward 10 Steps</td>
			<td colspan="5">
			<h5>
			<div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
	<label class="btn btn-shadow btn-outline-primary">
	<input type="radio" id="score-0" name="WRJ-69" value="0"  autocomplete="off"> 
	0
	</label>
	<label class="btn btn-shadow btn-outline-primary">
	<input type="radio" id="score-1" name="WRJ-69" value="1" autocomplete="off" > 
	1
	</label>
	<label class="btn btn-shadow btn-outline-primary">
	<input type="radio" id="score-2" name="WRJ-69" value="2" autocomplete="off"  > 
	2
	</label>
	<label class="btn btn-shadow btn-outline-primary">
	<input type="radio" id="score-3" name="WRJ-69" value="3"  autocomplete="off" > 
	3
	</label>
	<label class="btn btn-shadow btn-outline-primary active">
	<input type="radio" id="score-NT" name="WRJ-69" value="NT" autocomplete="off" checked=""> 
	NT
	</label>
	</div>
	</h5>
	</td>
			</tr>
			<tr>
			<td>70</td>
			<td>STD: Walks Forward 10 Steps, Stops, Turns 180Deg, Returns</td>
			<td colspan="5">
			<h5>
			<div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
	<label class="btn btn-shadow btn-outline-primary">
	<input type="radio" id="score-0" name="WRJ-70" value="0"  autocomplete="off"> 
	0
	</label>
	<label class="btn btn-shadow btn-outline-primary">
	<input type="radio" id="score-1" name="WRJ-70" value="1" autocomplete="off" > 
	1
	</label>
	<label class="btn btn-shadow btn-outline-primary">
	<input type="radio" id="score-2" name="WRJ-70" value="2" autocomplete="off"  > 
	2
	</label>
	<label class="btn btn-shadow btn-outline-primary">
	<input type="radio" id="score-3" name="WRJ-70" value="3"  autocomplete="off" > 
	3
	</label>
	<label class="btn btn-shadow btn-outline-primary active">
	<input type="radio" id="score-NT" name="WRJ-70" value="NT" autocomplete="off" checked=""> 
	NT
	</label>
	</div>
	</h5>
	</td>
			</tr>
			
			<tr>
			<td>71</td>
			<td>STD: Walks Backward 10 Steps</td>
			<td colspan="5">
			<h5>
			<div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
	<label class="btn btn-shadow btn-outline-primary">
	<input type="radio" id="score-0" name="WRJ-71" value="0"  autocomplete="off"> 
	0
	</label>
	<label class="btn btn-shadow btn-outline-primary">
	<input type="radio" id="score-1" name="WRJ-71" value="1" autocomplete="off" > 
	1
	</label>
	<label class="btn btn-shadow btn-outline-primary">
	<input type="radio" id="score-2" name="WRJ-71" value="2" autocomplete="off"  > 
	2
	</label>
	<label class="btn btn-shadow btn-outline-primary">
	<input type="radio" id="score-3" name="WRJ-71" value="3"  autocomplete="off" > 
	3
	</label>
	<label class="btn btn-shadow btn-outline-primary active">
	<input type="radio" id="score-NT" name="WRJ-71" value="NT" autocomplete="off" checked=""> 
	NT
	</label>
	</div>
	</h5>
	</td>
			</tr>
			
	<tr>
		<td>72</td>
		<td>STD: Walks Forward 10 Steps, Carrying a Large Object with 2 Hands</td>
		<td colspan="5">
		<h5>
		<div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-0" name="WRJ-72" value="0"  autocomplete="off"> 
			0
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-1" name="WRJ-72" value="1" autocomplete="off" > 
			1
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-2" name="WRJ-72" value="2" autocomplete="off"  > 
			2
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-3" name="WRJ-72" value="3"  autocomplete="off" > 
			3
			</label>
			<label class="btn btn-shadow btn-outline-primary active">
				<input type="radio" id="score-NT" name="WRJ-72" value="NT" autocomplete="off" checked=""> 
			NT
			</label>
		</div>
		</h5>
		</td>
	</tr>
	<tr>
		<td>73</td>
		<td>STD: Walks Forward 10 Consecutive Steps</td>
		<td colspan="5">
		<h5>
		<div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-0" name="WRJ-73" value="0"  autocomplete="off"> 
			0
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-1" name="WRJ-73" value="1" autocomplete="off" > 
			1
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-2" name="WRJ-73" value="2" autocomplete="off"  > 
			2
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-3" name="WRJ-73" value="3"  autocomplete="off" > 
			3
			</label>
			<label class="btn btn-shadow btn-outline-primary active">
				<input type="radio" id="score-NT" name="WRJ-73" value="NT" autocomplete="off" checked=""> 
			NT
			</label>
		</div>
		</h5>
		</td>
	</tr>
	<tr>
		<td>74</td>
		<td>STD: Walks Forward 10 Consecutive Steps on a Straight line 2cm (3/4") Wide</td>
		<td colspan="5">
		<h5>
		<div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-0" name="WRJ-74" value="0"  autocomplete="off"> 
			0
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-1" name="WRJ-74" value="1" autocomplete="off" > 
			1
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-2" name="WRJ-74" value="2" autocomplete="off"  > 
			2
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-3" name="WRJ-74" value="3"  autocomplete="off" > 
			3
			</label>
			<label class="btn btn-shadow btn-outline-primary active">
				<input type="radio" id="score-NT" name="WRJ-74" value="NT" autocomplete="off" checked=""> 
			NT
			</label>
		</div>
		</h5>
		</td>
	</tr>
	<tr>
		<td>75</td>
		<td>STD: Steps over Stick at Knee Level, R Foot Leading</td>
		<td colspan="5">
		<h5>
		<div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-0" name="WRJ-75" value="0"  autocomplete="off"> 
			0
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-1" name="WRJ-75" value="1" autocomplete="off" > 
			1
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-2" name="WRJ-75" value="2" autocomplete="off"  > 
			2
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-3" name="WRJ-75" value="3"  autocomplete="off" > 
			3
			</label>
			<label class="btn btn-shadow btn-outline-primary active">
				<input type="radio" id="score-NT" name="WRJ-75" value="NT" autocomplete="off" checked=""> 
			NT
			</label>
		</div>
		</h5>
		</td>
	</tr>
	<tr>
		<td>76</td>
		<td>STD: Steps over Stick at Knee Level, L Foot Leading</td>
		<td colspan="5">
		<h5>
		<div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-0" name="WRJ-76" value="0"  autocomplete="off"> 
			0
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-1" name="WRJ-76" value="1" autocomplete="off" > 
			1
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-2" name="WRJ-76" value="2" autocomplete="off"  > 
			2
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-3" name="WRJ-76" value="3"  autocomplete="off" > 
			3
			</label>
			<label class="btn btn-shadow btn-outline-primary active">
				<input type="radio" id="score-NT" name="WRJ-76" value="NT" autocomplete="off" checked=""> 
			NT
			</label>
		</div>
		</h5>
		</td>
	</tr>
	<tr>
		<td>77</td>
		<td>STD: Runs 4.5m(15'), Stops & Returns</td>
		<td colspan="5">
		<h5>
		<div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-0" name="WRJ-77" value="0"  autocomplete="off"> 
			0
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-1" name="WRJ-77" value="1" autocomplete="off" > 
			1
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-2" name="WRJ-77" value="2" autocomplete="off"  > 
			2
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-3" name="WRJ-77" value="3"  autocomplete="off" > 
			3
			</label>
			<label class="btn btn-shadow btn-outline-primary active">
				<input type="radio" id="score-NT" name="WRJ-77" value="NT" autocomplete="off" checked=""> 
			NT
			</label>
		</div>
		</h5>
		</td>
	</tr>
	<tr>
		<td>78</td>
		<td>STD: Kicks Ball with R Foot</td>
		<td colspan="5">
		<h5>
		<div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-0" name="WRJ-78" value="0"  autocomplete="off"> 
			0
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-1" name="WRJ-78" value="1" autocomplete="off" > 
			1
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-2" name="WRJ-78" value="2" autocomplete="off"  > 
			2
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-3" name="WRJ-78" value="3"  autocomplete="off" > 
			3
			</label>
			<label class="btn btn-shadow btn-outline-primary active">
				<input type="radio" id="score-NT" name="WRJ-78" value="NT" autocomplete="off" checked=""> 
			NT
			</label>
		</div>
		</h5>
		</td>
	</tr>
	
	<tr>
		<td>79</td>
		<td>STD: Kicks Ball with L Foot</td>
		<td colspan="5">
		<h5>
		<div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-0" name="WRJ-79" value="0"  autocomplete="off"> 
			0
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-1" name="WRJ-79" value="1" autocomplete="off" > 
			1
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-2" name="WRJ-79" value="2" autocomplete="off"  > 
			2
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-3" name="WRJ-79" value="3"  autocomplete="off" > 
			3
			</label>
			<label class="btn btn-shadow btn-outline-primary active">
				<input type="radio" id="score-NT" name="WRJ-79" value="NT" autocomplete="off" checked=""> 
			NT
			</label>
		</div>
		</h5>
		</td>
	</tr>
	
	<tr>
		<td>80</td>
		<td>STD: Jumps 30 cm (12") High, Both Feet Simultaneously</td>
		<td colspan="5">
		<div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-0" name="WRJ-80" value="0"  autocomplete="off"> 
			0
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-1" name="WRJ-80" value="1" autocomplete="off" > 
			1
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-2" name="WRJ-80" value="2" autocomplete="off"  > 
			2
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-3" name="WRJ-80" value="3"  autocomplete="off" > 
			3
			</label>
			<label class="btn btn-shadow btn-outline-primary active">
				<input type="radio" id="score-NT" name="WRJ-80" value="NT" autocomplete="off" checked=""> 
			NT
			</label>
		</div>
		</td>
	</tr>
	<tr>
		<td>81</td>
		<td>STD: Jumps Forward 30 cm (12"), Both Feet Simultaneously</td>
		<td colspan="5">
		<h5>
		<div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-0" name="WRJ-81" value="0"  autocomplete="off"> 
			0
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-1" name="WRJ-81" value="1" autocomplete="off" > 
			1
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-2" name="WRJ-81" value="2" autocomplete="off"  > 
			2
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-3" name="WRJ-81" value="3"  autocomplete="off" > 
			3
			</label>
			<label class="btn btn-shadow btn-outline-primary active">
				<input type="radio" id="score-NT" name="WRJ-81" value="NT" autocomplete="off" checked=""> 
			NT
			</label>
		</div>
		</h5>
		</td>
	</tr>
	
	<tr>
		<td>82</td>
		<td>STD ON R FOOT: Hops on R Foot 10 Times within a 60cm(24") Circle</td>
		<td colspan="5">
		<h5>
		<div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-0" name="WRJ-82" value="0"  autocomplete="off"> 
			0
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-1" name="WRJ-82" value="1" autocomplete="off" > 
			1
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-2" name="WRJ-82" value="2" autocomplete="off"  > 
			2
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-3" name="WRJ-82" value="3"  autocomplete="off" > 
			3
			</label>
			<label class="btn btn-shadow btn-outline-primary active">
				<input type="radio" id="score-NT" name="WRJ-82" value="NT" autocomplete="off" checked=""> 
			NT
			</label>
		</div>
		</h5>
		</td>
	</tr>
	<tr>
		<td>83</td>
		<td>STD ON L FOOT: Hops on L Foot 10 Times within a 60cm(24") Circle</td>
		<td colspan="5">
		<h5>
		<div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-0" name="WRJ-83" value="0"  autocomplete="off"> 
			0
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-1" name="WRJ-83" value="1" autocomplete="off" > 
			1
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-2" name="WRJ-83" value="2" autocomplete="off"  > 
			2
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-3" name="WRJ-83" value="3"  autocomplete="off" > 
			3
			</label>
			<label class="btn btn-shadow btn-outline-primary active">
				<input type="radio" id="score-NT" name="WRJ-83" value="NT" autocomplete="off" checked=""> 
			NT
			</label>
		</div>
		</h5>
		</td>
	</tr>
	
	<tr>
		<td>84</td>
		<td>STD, HOLDING 1 RAIL: Walks up 4 Steps, Holding 1 Rail, at Alternating Feet</td>
		<td colspan="5">
		<h5>
		<div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-0" name="WRJ-84" value="0"  autocomplete="off"> 
			0
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-1" name="WRJ-84" value="1" autocomplete="off" > 
			1
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-2" name="WRJ-84" value="2" autocomplete="off"  > 
			2
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-3" name="WRJ-84" value="3"  autocomplete="off" > 
			3
			</label>
			<label class="btn btn-shadow btn-outline-primary active">
				<input type="radio" id="score-NT" name="WRJ-84" value="NT" autocomplete="off" checked=""> 
			NT
			</label>
		</div>
		</h5>
		</td>
	</tr>
	<tr>
		<td>85</td>
		<td>STD, HOLDING 1 RAIL: Walks Down 4 Steps, Holding 1 Rail, at Alternating Feet</td>
		<td colspan="5">
		<h5>
		<div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-0" name="WRJ-85" value="0"  autocomplete="off"> 
			0
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-1" name="WRJ-85" value="1" autocomplete="off" > 
			1
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-2" name="WRJ-85" value="2" autocomplete="off"  > 
			2
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-3" name="WRJ-85" value="3"  autocomplete="off" > 
			3
			</label>
			<label class="btn btn-shadow btn-outline-primary active">
				<input type="radio" id="score-NT" name="WRJ-85" value="NT" autocomplete="off" checked=""> 
			NT
			</label>
		</div>
		</h5>
		</td>
	</tr>
	
	<tr>
		<td>86</td>
		<td>STD: Walks Up 4 Steps, Alternating Feet</td>
		<td colspan="5">
		<h5>
		<div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-0" name="WRJ-86" value="0"  autocomplete="off"> 
			0
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-1" name="WRJ-86" value="1" autocomplete="off" > 
			1
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-2" name="WRJ-86" value="2" autocomplete="off"  > 
			2
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-3" name="WRJ-86" value="3"  autocomplete="off" > 
			3
			</label>
			<label class="btn btn-shadow btn-outline-primary active">
				<input type="radio" id="score-NT" name="WRJ-86" value="NT" autocomplete="off" checked=""> 
			NT
			</label>
		</div>
		</h5>
		</td>
	</tr>
	<tr>
		<td>87</td>
		<td>STD: Walks Down 4 Steps, Alternating Feet</td>
		<td colspan="5">
		<h5>
		<div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-0" name="WRJ-87" value="0"  autocomplete="off"> 
			0
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-1" name="WRJ-87" value="1" autocomplete="off" > 
			1
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-2" name="WRJ-87" value="2" autocomplete="off"  > 
			2
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-3" name="WRJ-87" value="3"  autocomplete="off" > 
			3
			</label>
			<label class="btn btn-shadow btn-outline-primary active">
				<input type="radio" id="score-NT" name="WRJ-87" value="NT" autocomplete="off" checked=""> 
			NT
			</label>
		</div>
		</h5>
		</td>
	</tr>
	<tr>
		<td>88</td>
		<td>STD ON 15CM(6") STEPS: Jumps Off,Both Feet Simultaneously</td>
		<td colspan="5">
		<h5>
		<div id="scoreCheck" role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-0" name="WRJ-88" value="0"  autocomplete="off"> 
			0
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-1" name="WRJ-88" value="1" autocomplete="off" > 
			1
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-2" name="WRJ-88" value="2" autocomplete="off"  > 
			2
			</label>
			<label class="btn btn-shadow btn-outline-primary">
				<input type="radio" id="score-3" name="WRJ-88" value="3"  autocomplete="off" > 
			3
			</label>
			<label class="btn btn-shadow btn-outline-primary active">
				<input type="radio" id="score-NT" name="WRJ-88" value="NT" autocomplete="off" checked=""> 
			NT
			</label>
		</div>
		</h5>
		</td>
	</tr>
			
			
			<tr>
			<td colspan="2" text-align="right">TOTAL DIMENSION E</td>
			<td colspan="5"><input type="text" name="dimensionE" id="dimE" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
	</table></div></br>
	 
	 <div id="summaryScore"	 class="form-group col-md-12 col-sm-12">
        <h3 style="color:black;text-align=center;">GMFM-88 SUMMARY SCORE </h3>
		</div>
	<div class = "form-group col-md-12 col-sm-12" style="overflow-x:auto;">
	    <table id="score" border=1  >
		    <tr>
			<th>DIMENSION</th>
			<th colspan="3">CALCULATION OF DIMENSION % SCORES</th>
			<!--<th>GOAL AREA</th>-->
			</tr>
			
			<tr>
			<td>A. LYING & ROLLING</td>
			<td style="width:20%">(Total Dimension A) &#247; 51 &#61;</td>
			<td style="width:15%"><div id="divide" style="width:50%;float:left"><p id="ScoreA" style="text-align:center;height:25px;">A</p><p style="border-bottom:1px solid #000"></p></br><p id="totA" style="text-align:center;margin-top:0px">51</p></div><div style="margin-top:25px;margin-left:2px;width:40%;float:left">x 100 =</div></td>
			<td style="width:15%"><input id="perA" type="text" name="percentageA"  class="form-control input-sm" style="width:100%;" /></td>
			<!--<td><label for="goalE">A.</label><input type="checkbox" id="goalA" name="A" value="A" style="margin-left:5px"></td>-->
			</tr>
			<tr>
			<td>B. SITTING</td>
			<td style="width:20%">(Total Dimension A) &#247; 60 &#61;</td>
			<td style="width:15%"><div id="divide" style="width:50%;float:left"><p id="ScoreB" style="text-align:center;height:25px;">B</p><p style="border-bottom:1px solid #000"></p></br><p id="totA" style="text-align:center;margin-top:0px">60</p></div><div style="margin-top:25px;margin-left:2px;width:40%;float:left">x 100 =</div></td>
			<td><input id="perB" type="text" name="percentageB"  class="form-control input-sm" style="width:100%;" /></td>
			<!--<td><label for="goalB">B.</label><input type="checkbox" id="goalB" name="B" value="B" style="margin-left:5px"></td>-->
			</tr>
			<tr>
			<td>C. CRAWLING & KNEELING</td>
			<td style="width:20%">(Total Dimension A) &#247; 42 &#61;</td>
			<td style="width:15%"><div id="divide" style="width:50%;float:left"><p id="ScoreC" style="text-align:center;height:25px;">C</p><p style="border-bottom:1px solid #000"></p></br><p id="totA" style="text-align:center;margin-top:0px">42</p></div><div style="margin-top:25px;margin-left:2px;width:40%;float:left">x 100 =</div></td>
			<td><input id="perC" type="text" name="percentageC"  class="form-control input-sm" style="width:100%;" /></td>
			<!--<td><label for="goalC">C.</label><input type="checkbox" id="goalC" name="C" value="C" style="margin-left:5px"></td>-->
			</tr>
			<tr>
			<td>D. STANDING</td>
			<td style="width:20%">(Total Dimension A) &#247; 39 &#61;</td>
			<td style="width:15%"><div id="divide" style="width:50%;float:left"><p id="ScoreD" style="text-align:center;height:25px;">D</p><p style="border-bottom:1px solid #000"></p></br><p id="totA" style="text-align:center;margin-top:0px">39</p></div><div style="margin-top:25px;margin-left:2px;width:40%;float:left">x 100 =</div></td>
			<td><input id="perD" type="text" name="percentageD"  class="form-control input-sm" style="width:100%;" /></td>
			<!--<td><label for="goalD">D.</label><input type="checkbox" id="goalD" name="D" value="D" style="margin-left:5px"></td>-->
			</tr>
			<tr>
			<td>E. WALKING,RUNNING & JUMPING</td>
			<td style="width:20%">(Total Dimension A) &#247; 72 &#61;</td>
			<td style="width:15%"><div id="divide" style="width:50%;float:left"><p id="ScoreE" style="text-align:center;height:25px;">E</p><p style="border-bottom:1px solid #000"></p></br><p id="totA" style="text-align:center;margin-top:0px">72</p></div><div style="margin-top:25px;margin-left:2px;width:40%;float:left">x 100 =</div></td>
			<td><input id="perE" type="text" name="percentageE"  class="form-control input-sm" style="width:100%;" /></td>
			<!--<td><label for="goalE">E.</label> <input type="checkbox" id="goalE" name="E" value="E" style="margin-left:5px"></td>-->
			</tr>
			
			
	 
	 <div class = "form-group col-md-12 col-sm-12" style="overflow-x:auto;margin-top:15px">
	    <table id="GMFM_Score" border=1 style="width:80%;margin:auto;margin-top:50px";>
		<tr>
			<td style="width:30%;text-align:center;"><div id="gmfmBtn" onclick="calculateGMFM(this.id)" >CALCULATION OF GMFM SCORE </div></td>
			<td style="width:20%"><div id="divide" style="width:94%;float:left"><p style="text-align:center;height:25px;">A%+B%+C%+D%+E% </p><p style="border-bottom:1px solid #000"></p></br><p id="totA" style="text-align:center;margin-top:0px">Total Dimension</p></div><div style="margin-top:25px;margin-left:2px;width:3%;float:left"> =</div></td>
			<td style="width:25%"><div id="divide" style="width:94%;float:left"><p id="ScoreGMFM" style="text-align:center;height:25px;">A%+B%+C%+D%+E% </p><p style="border-bottom:1px solid #000"></p></br><p id="totA" style="text-align:center;margin-top:0px">5</p></div><div style="margin-top:25px;margin-left:2px;width:3%;float:left"> =</div></td>
			<td style="width:15%"><input id="gmfm" type="text" name="gmfm"  class="form-control input-sm" style="width:100%;" /></td>
			
			</tr>
		</table></div></br>
	 
	
	 
	 <div class="col-md-12 col-sm-12">
		<div class="form-group col-md-3 col-sm-3 pull-right" >
				<input type="submit" class="btn btn-primary" value="Save_GMFM" id="save"/>
		</div>
	</div>
	 
	 
	 
</form>
</div>
</div>

  <script src="<?php  echo base_url();  ?>assets/js/vendor/jgrowl/jquery.jgrowl.min.js"></script>
  <script src="<?php  echo base_url();  ?>assets/js/vendor/bootstrap/bootstrap-dropdown-multilevel.js" type="text/javascript"></script>
  <script type="text/javascript" src="<?php  echo base_url();  ?>assets/js/vendor/mmenu/js/jquery.mmenu.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="<?php  echo base_url();  ?>assets/js/vendor/nicescroll/jquery.nicescroll.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url() ?>assets/js/vendor/momentjs/moment-with-langs.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url() ?>assets/js/vendor/datepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url() ?>assets/js/vendor/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url() ?>assets/js/vendor/colorpalette/bootstrap-colorpalette.js" type="text/javascript"></script>
 
	
<script>		
 $(document).ready(function() {
		$(".edit").click(function(){
			var val = $('#assess_id').val();
			var val1 = $('#patient_id').val();
			window.location= "<?php echo base_url().'assessment/edit_paediatric/' ?>"+val1+'/'+val;
		});
		$(".print").click(function(){
			var val = $('#assess_id').val();
			var val1 = $('#patient_id').val();
			window.location= "<?php echo base_url().'assessment/print_paediatric/' ?>"+val1+'/'+val;
		});
		
		$("#assess_date").change(function(){
			var val = $("#assess_date").val();
			var patient_id = $("#patient_id").val();
			var url= '<?php echo base_url().'assessment/peadiatric_assessment_info' ?>';
			$.ajax({
					type: "POST",
					dataType: 'json',
					data : {val:val,patient_id:patient_id},
					url: url,
					success: function(data) {
						if(data.status == 'success'){
							$('#assess_id').val(data.message);
							$('.view').show();
						} else if(data.status != 'success') {
							$('.create').show();
					    }
					}, 
					complete: function(){
							
					},
					error: function(e){ // alert error if ajax fails
						alert(e.responseText);
					} 
				 }); 
		});
		 
		 });	

	 
	$(document).ready(function() {
  $('form').on('submit', function (event) {
         event.preventDefault();
		 var $form = $(this);
		var id = $('#patient_id').val();
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var button = $('#save');
		 button.prop('disabled', true);
		$.ajax({
            type: 'post',
            url: $(this).attr('action'),
			data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				
				$.jGrowl("Patient Assessment Has Been Added Successfully!");
				setTimeout(function(){ 
				window.location = '<?php echo base_url().'client/patient/view/' ?>'+id;
				window.close();
				}, 1000);
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$.jGrowl("Patient Assessment Has Not Been Added Successfully!");
				setTimeout(function(){ 
				$('.md-close btn btn-default').click();
				window.location.reload();
				}, 1000);
			}
      });

			  
});  
});


//initialize datepicker
      $('.datepicker').datetimepicker({
        icons: {
          time: "fa fa-clock-o",
          date: "fa fa-calendar",
          up: "fa fa-arrow-up",
          down: "fa fa-arrow-down"
        }
      });

      $(".datepicker").on("dp.show",function (e) {
        var newtop = $('.bootstrap-datetimepicker-widget').position().top - 45;      
        $('.bootstrap-datetimepicker-widget').css('top', newtop + 'px');
      });
	  
	  

		var myDate = new Date();
			var prettyDate =(myDate.getDate()) + '/' + (myDate.getMonth()+1) + '/' +
					myDate.getFullYear();
		$(".assess_date").val(prettyDate);

$('#dimA').on('click',function(){
	
	var dimenA=document.getElementById("dimA");
	
    var tab_lying=document.getElementById("lying");
	
	var rows=tab_lying.getElementsByTagName("tr");
	var len=rows.length;
	
	var dimValue=0;
	for (var i=1;i<len-1;i++)
	{
		var radio=rows[i].getElementsByTagName('input');
		var len1=radio.length;
		//alert(len1);
		//getCheckedVal(radio);
		
		
		var val="";
		var valueInt=0;
		//get value of checked radio button
	for(var j=0;j<len1;j++)
	{
		
		if(radio[j].checked)
		{			
		val=radio[j].value; 
		if(val=="NT")
		{
			val="0";
		}
		break
		}
		
    }
		
		valueInt=parseInt(val);
		dimValue=dimValue+valueInt;
	}
	dimenA.value=dimValue;
	var score=document.getElementById("ScoreA");
	score.innerHTML=dimValue;
	var per=document.getElementById("perA");
	var perVal=(parseFloat((parseInt(dimValue)/51)*100)).toFixed(2);
	per.value=perVal;
	});

// Sitting total dimensionB
$('#dimB').on('click',function(){
	var dimenB=document.getElementById("dimB");
	
    var tab_sitting=document.getElementById("sitting");
	
	var rows=tab_sitting.getElementsByTagName("tr");
	var len=rows.length;
	var dimValue=0;
	for (var i=1;i<len-1;i++)
	{
		var radio=rows[i].getElementsByTagName('input');
		var len1=radio.length;
		//alert(len1);
		//getCheckedVal(radio);
		
		
		var val="";
		var valueInt=0;
		//get value of checked radio button
	for(var j=0;j<len1;j++)
	{
		
		if(radio[j].checked)
		{			
		val=radio[j].value; 
		if(val=="NT")
		{
			val="0";
		}
		break
		}
		
    }
		
		valueInt=parseInt(val);
		dimValue=dimValue+valueInt;
	}
	dimenB.value=dimValue;
	var score=document.getElementById("ScoreB");
	score.innerHTML=dimValue;
	var per=document.getElementById("perB");
	var perVal=(parseFloat((parseInt(dimValue)/60)*100)).toFixed(2);
	per.value=perVal;
	});



	// Crawling total dimensionB
$('#dimC').on('click',function(){
	var dimenC=document.getElementById("dimC");
	
    var tab_crawling=document.getElementById("crawling");
	
	var rows=tab_crawling.getElementsByTagName("tr");
	var len=rows.length;
	var dimValue=0;
	for (var i=1;i<len-1;i++)
	{
		var radio=rows[i].getElementsByTagName('input');
		var len1=radio.length;
		//alert(len1);
		//getCheckedVal(radio);
		
		
		var val="";
		var valueInt=0;
		//get value of checked radio button
	for(var j=0;j<len1;j++)
	{
		
		if(radio[j].checked)
		{			
		val=radio[j].value; 
		if(val=="NT")
		{
			val="0";
		}
		break
		}
		
    }
		
		valueInt=parseInt(val);
		dimValue=dimValue+valueInt;
	}
	dimenC.value=dimValue;
	var score=document.getElementById("ScoreC");
	score.innerHTML=dimValue;
	var per=document.getElementById("perC");
	var perVal=(parseFloat((parseInt(dimValue)/42)*100)).toFixed(2);
	per.value=perVal;
	});


// Standing total dimensionB
$('#dimD').on('click',function(){
	var dimenD=document.getElementById("dimD");
	
    var tab_standing=document.getElementById("standing");
	
	var rows=tab_standing.getElementsByTagName("tr");
	var len=rows.length;
	var dimValue=0;
	for (var i=1;i<len-1;i++)
	{
		var radio=rows[i].getElementsByTagName('input');
		var len1=radio.length;
		//alert(len1);
		//getCheckedVal(radio);
		
		
		var val="";
		var valueInt=0;
		//get value of checked radio button
	for(var j=0;j<len1;j++)
	{
		
		if(radio[j].checked)
		{			
		val=radio[j].value; 
		if(val=="NT")
		{
			val="0";
		}
		break
		}
		
    }
		
		valueInt=parseInt(val);
		dimValue=dimValue+valueInt;
	}
	dimenD.value=dimValue;
	var score=document.getElementById("ScoreD");
	score.innerHTML=dimValue;
	var per=document.getElementById("perD");
	var perVal=(parseFloat((parseInt(dimValue)/39)*100)).toFixed(2);
	per.value=perVal;
	});
	
	
	//WALKING
	$('#dimE').on('click',function(){
	var dimenD=document.getElementById("dimE");
	
    var tab_walking=document.getElementById("walking");
	
	var rows=tab_walking.getElementsByTagName("tr");
	var len=rows.length;
	var dimValue=0;
	for (var i=1;i<len-1;i++)
	{
		var radio=rows[i].getElementsByTagName('input');
		var len1=radio.length;
		//alert(len1);
		//getCheckedVal(radio);
		
		
		var val="";
		var valueInt=0;
		//get value of checked radio button
	for(var j=0;j<len1;j++)
	{
		
		if(radio[j].checked)
		{			
		val=radio[j].value; 
		if(val=="NT")
		{
			val="0";
		}
		break
		}
		
    }
		
		valueInt=parseInt(val);
		dimValue=dimValue+valueInt;
	}
	dimenD.value=dimValue;
	var score=document.getElementById("ScoreE");
	score.innerHTML=dimValue;
	var per=document.getElementById("perE");
	var perVal=(parseFloat((parseInt(dimValue)/39)*100)).toFixed(2);
	per.value=perVal;
	});
/*
$(document).ready(function(){
	$('#lying input').on('change'.function(){
		val selec=$("[type='radio']:checked").val();
		alert(selec);
	});
});	*/
	
$('#gmfm').on('click',function(){
	var dimA=document.getElementById("perA").value;

	var dimB=document.getElementById("perB").value;
	
	var dimC=document.getElementById("perC").value;
	
	var dimD=document.getElementById("perD").value;
	
	var dimE=document.getElementById("perE").value;
	
	var gmfm=document.getElementById("gmfm");
	var gmfmScore=document.getElementById("ScoreGMFM");
	//ScoreGMFM
	var gmfmScoreVal=dimA+"+"+dimB+"+"+dimC+"+"+dimD+"+"+dimE;
	var gmfmVal=(parseFloat((parseFloat(dimA)+parseFloat(dimB)+parseFloat(dimC)+parseFloat(dimD)+parseFloat(dimE))/5)).toFixed(2);
	gmfmScore.innerHTML=gmfmScoreVal;
	gmfm.value=gmfmVal;
});

</script>

<script>
/*
$('#dimA').on('click',function(){
	alert("hi");
	var dimenA=document.getElementById("dimA");
	
    var tab_lying=document.getElementById("lying");
	
	var rows=tab_lying.getElementsByTagName("tr");
	var len=rows.length;
	alert(len);
	var dimValue=0;
	for (var i=1;i<len-1;i++)
	{
		var radio=rows[i].getElementsByTagName('input');
		var len1=radio.length;
		//alert(len1);
		//getCheckedVal(radio);
		
		
		var val="";
		var valueInt=0;
		//get value of checked radio button
	for(var j=0;j<len1;j++)
	{
		
		if(radio[j].checked)
		{			
		val=radio[j].value; 
		if(val=="NT")
		{
			val="0";
		}
		break
		}
		
    }
		
		valueInt=parseInt(val);
		dimValue=dimValue+valueInt;
	}
	dimenA.value=dimValue;
	var score=document.getElementById("ScoreA");
	score.innerHTML=dimValue;
	var per=document.getElementById("perA");
	var perVal=(parseFloat((parseInt(dimValue)/51)*100)).toFixed(2);
	per.value=perVal;
	});



// Sitting total dimensionB
$('#dimB').on('click',function(){
	var dimenB=document.getElementById("dimB");
	
    var tab_sitting=document.getElementById("sitting");
	
	var rows=tab_sitting.getElementsByTagName("tr");
	var len=rows.length;
	var dimValue=0;
	for (var i=1;i<len-1;i++)
	{
		var radio=rows[i].getElementsByTagName('input');
		var len1=radio.length;
		//alert(len1);
		//getCheckedVal(radio);
		
		
		var val="";
		var valueInt=0;
		//get value of checked radio button
	for(var j=0;j<len1;j++)
	{
		
		if(radio[j].checked)
		{			
		val=radio[j].value; 
		if(val=="NT")
		{
			val="0";
		}
		break
		}
		
    }
		
		valueInt=parseInt(val);
		dimValue=dimValue+valueInt;
	}
	dimenB.value=dimValue;
	var score=document.getElementById("ScoreB");
	score.innerHTML=dimValue;
	var per=document.getElementById("perB");
	var perVal=(parseFloat((parseInt(dimValue)/60)*100)).toFixed(2);
	per.value=perVal;
	});
	
	
	// Crawling total dimensionB
$('#dimC').on('click',function(){
	var dimenC=document.getElementById("dimC");
	
    var tab_crawling=document.getElementById("crawling");
	
	var rows=tab_crawling.getElementsByTagName("tr");
	var len=rows.length;
	var dimValue=0;
	for (var i=1;i<len-1;i++)
	{
		var radio=rows[i].getElementsByTagName('input');
		var len1=radio.length;
		//alert(len1);
		//getCheckedVal(radio);
		
		
		var val="";
		var valueInt=0;
		//get value of checked radio button
	for(var j=0;j<len1;j++)
	{
		
		if(radio[j].checked)
		{			
		val=radio[j].value; 
		if(val=="NT")
		{
			val="0";
		}
		break
		}
		
    }
		
		valueInt=parseInt(val);
		dimValue=dimValue+valueInt;
	}
	dimenC.value=dimValue;
	var score=document.getElementById("ScoreC");
	score.innerHTML=dimValue;
	var per=document.getElementById("perC");
	var perVal=(parseFloat((parseInt(dimValue)/42)*100)).toFixed(2);
	per.value=perVal;
	});


// Standing total dimensionB
$('#dimD').on('click',function(){
	var dimenD=document.getElementById("dimD");
	
    var tab_standing=document.getElementById("standing");
	
	var rows=tab_standing.getElementsByTagName("tr");
	var len=rows.length;
	var dimValue=0;
	for (var i=1;i<len-1;i++)
	{
		var radio=rows[i].getElementsByTagName('input');
		var len1=radio.length;
		//alert(len1);
		//getCheckedVal(radio);
		
		
		var val="";
		var valueInt=0;
		//get value of checked radio button
	for(var j=0;j<len1;j++)
	{
		
		if(radio[j].checked)
		{			
		val=radio[j].value; 
		if(val=="NT")
		{
			val="0";
		}
		break
		}
		
    }
		
		valueInt=parseInt(val);
		dimValue=dimValue+valueInt;
	}
	dimenD.value=dimValue;
	var score=document.getElementById("ScoreD");
	score.innerHTML=dimValue;
	var per=document.getElementById("perD");
	var perVal=(parseFloat((parseInt(dimValue)/39)*100)).toFixed(2);
	per.value=perVal;
	});
	
	//WALKING
	$('#dimE').on('click',function(){
	var dimenD=document.getElementById("dimE");
	
    var tab_walking=document.getElementById("walking");
	
	var rows=tab_walking.getElementsByTagName("tr");
	var len=rows.length;
	var dimValue=0;
	for (var i=1;i<len-1;i++)
	{
		var radio=rows[i].getElementsByTagName('input');
		var len1=radio.length;
		//alert(len1);
		//getCheckedVal(radio);
		
		
		var val="";
		var valueInt=0;
		//get value of checked radio button
	for(var j=0;j<len1;j++)
	{
		
		if(radio[j].checked)
		{			
		val=radio[j].value; 
		if(val=="NT")
		{
			val="0";
		}
		break
		}
		
    }
		
		valueInt=parseInt(val);
		dimValue=dimValue+valueInt;
	}
	dimenD.value=dimValue;
	var score=document.getElementById("ScoreE");
	score.innerHTML=dimValue;
	var per=document.getElementById("perE");
	var perVal=(parseFloat((parseInt(dimValue)/39)*100)).toFixed(2);
	per.value=perVal;
	});
*/

/*
function getCheckedVal(var radio)
{
	var value="";
	var len=radio.length;
	alert(len);
	/*
	for(var i=0;i<len;i++)
	{
		if(radio[i].checked)
		{			
		value=radio[i].value; 
		if(value=="NT")
		{
			value="0";
		}
		}
            
		
	}
	return value;
}


function calculateGMFM(var id)
{
	var dimA=document.getElementById("perA");
	var dimB=document.getElementById("perB");
	var dimC=document.getElementById("perC");
	var dimD=document.getElementById("perD");
	var dimD=document.getElementById("perE");
	var dimE=document.getElementById("gmfm");
	var gmfmVal=(dimA+dimB+dimC+dimD+dimE)/5;
	gmfm.value=gmfmVal;
	
}*/

function getDimA(x)
{
	alert(hi);
	var dimenA=document.getElementById(x);
	var tab_lying=document.getElementById("lying");
	var rows=tab_lying.getElementByTagName("tr");
	var len=rows.length;
	alert(len)
	
}


	

</script>
</body>
</html>