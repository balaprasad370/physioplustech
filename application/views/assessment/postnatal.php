<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/datepicker/css/bootstrap-datetimepicker.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/colorpicker/css/bootstrap-colorpicker.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/colorpalette/bootstrap-colorpalette.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Physio Plus Tech</title> 
    <link rel="icon" type="image/ico" href="<?php echo base_url() ?>assets/images/favicon.ico" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/jgrowl/css/jquery.jgrowl.min.css">
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
</style>
  </head>
  <body>
<div class="panel panel-primary" style="margin:20px;">
	<div class="panel-heading">
       <center><h3 class="panel-title"><b><?php echo $clientDetails['clinic_name'];?></b></br>
		</br>Contributed by : <b>SRM Medical College Hospital And Research Centre, Chennai.</b>
		</br></br><b>Post Natal Assessment</b>
		</center></h3>
	</div>
<div class="panel-body">
    <form action="<?php echo base_url().'assessment/add_postnatal' ?>" method="post" role="form" parsley-validate>
<div class="col-md-12 col-sm-12">
  <!--<div class="form-group col-md-6 col-sm-6">
            <label for="name">Assessment Date  *	</label>
                 <input class="datepicker form-control" type="date"  id="assess_date" name="assess_date" required/> 
	</div>-->
				<div class="form-group col-md-6 col-sm-6">
                        <label for="datepicker" class="col-sm-4 control-label">Assessment Date</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control datepicker assess_date" id="assess_date" name="assess_date" parsley-trigger="change" parsley-required="true" data-date-format='DD/MM/YYYY'>
                        </div>
                      </div>
		
         <input type="hidden" class="form-control" value="<?php echo $this->uri->segment(3); ?>" name="patient_id" id="patient_id" placeholder="">
         <input type="hidden" name="client_id" value="<?php echo $this->session->userdata('client_id'); ?>" id="client_id" />
          
      	 <div style="width:95%; display:none;" class="view" >
						<input type="hidden" name="assess_id" id="assess_id" />
      					<center><a class="btn btn-info edit" style="border-radius: 70px; width:40%; height:35px;  background-color:#088AEC; color:white;" >
					Edit</a><a class="btn btn-info print" style="border-radius: 70px; width:40%; height:35px;  background-color:#088AEC; color:white;" >
					Print</a>
						</center></br></br></div>
		<div class="create" >     
	   <div class="form-group col-md-3 col-sm-6">
            <label for="1">Name  *	</label>
            <input type="text" name="name" class="form-control input-sm" id="1" autocomplete="off" value="<?php echo $patient_info['first_name'];?>" readonly>
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="2">Age  *</label>
            <input type="text" name="age" class="form-control input-sm" id="2" autocomplete="off" value="<?php echo $patient_info['age'];?>" readonly>
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="3">Occupation  *</label>
            <input type="text"  name="occupation" class="form-control input-sm" id="3" autocomplete="off" value="<?php echo $patient_info['occupation'];?>" readonly>
        </div>

		<!--<div class="form-group col-md-3 col-sm-6">
            <label for="4">UHID No</label>
            <input type="text" name="uhid_no" class="form-control input-sm" id="4" autocomplete="off">
        </div>-->
		
		<div class="form-group col-md-3 col-sm-6">
            <label for="5">Patient Code</label>
            <input type="text" class="form-control input-sm" id="5" value="<?php echo $patient_info['patient_code'];?>" readonly autocomplete="off">
        </div>
		
        <div class="form-group col-md-3 col-sm-6">
	      <label for="5">Marital Status  *  &nbsp;&nbsp;</label>
	<input type="radio" name="marital" parsley-required="true" value="single" id="Club"  <?php if($patient_info['marital_status'] == 'single'){ echo 'checked'; } else { } ?>/>
								<label for="Club">Single&nbsp;&nbsp;</label>
							    <input type="radio" name="marital" value="married" id="Country" <?php if($patient_info['marital_status'] == 'married'){ echo 'checked'; } else { } ?>/>
								<label for="Country">Married&nbsp;&nbsp;</label>
								</div>
								
			<div class="form-group col-md-3 col-sm-6">
            <label for="6">Height  </label>
            <input type="text" class="form-control input-sm" id="6"  name="height" autocomplete="off" value="<?php echo $patient_info['height'];?>" readonly>
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="7">Weight  </label>
            <input type="text" class="form-control input-sm" id="7"  onchange="calculateBmi()" name="weight" autocomplete="off" value="<?php echo $patient_info['weight'];?>" readonly>
        </div>
	
	   <div class="form-group col-md-3 col-sm-3">
            <label for="8">BMI *</label>
            <input type="text" class="form-control input-sm" name="bmi" id="8" readonly autocomplete="off" value="<?php echo $patient_info['bmi'];?>" readonly>
			<div id="thin" style="display:none" class="alert alert-success"> That you are too thin. </div>
		<div id="healthy" style="display:none" class="alert alert-success"> That you are healthy. </div>
		<div id="overwt" style="display:none" class="alert alert-danger"> That you have overweight. </div>
			
        </div>
					
		
		<div class="form-group col-md-6 col-sm-6">
            <label for="9">Address *</label>
             <textarea class="form-control input-sm" name="address" id="9" rows="3" autocomplete="off" readonly><?php echo $patient_info['address_line1'];?></textarea>
	  </div>
	  
      
	<div class = "form-group col-md-12 col-sm-12">
    <h5 style="color:#1E90FF"><b>Chief Complaints Of The Patient</b></h5>
	</div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="10">Nausea, Vomitting</label>
            <input type="text" class="form-control input-sm" name="vomitting" id="10" autocomplete="off">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="11">Musculoskeletal Problems</label>
            <input type="text" class="form-control input-sm" name="musculoske" id="11" autocomplete="off">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="12">Headache, Epigastric Pain</label>
            <input type="text" class="form-control input-sm" name="headache" id="12" autocomplete="off">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="13">Swelling</label>
            <input type="text" class="form-control input-sm" name="swelling" id="13" autocomplete="off">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="14">Malaise</label>
            <input type="text" class="form-control input-sm" name="malaise" id="14" autocomplete="off">
    </div> 
	
	
	 <div class = "form-group col-md-12 col-sm-12">
    <h5 style="color:#1E90FF"><b>Present History</b></h5>
    </div>
  
	<div class="form-group col-md-6 col-sm-6">
            <label for="15"><b>History Of Present Condition</b></label>
            <input type="text" class="form-control input-sm" name="present_history" id="15" autocomplete="off">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="16"><b>Relevant Past History</b> </label>
            <input type="text" class="form-control input-sm" name="past_history" id="16" autocomplete="off">
    </div> 
 
  <div class="form-group col-md-6 col-sm-6">
            <label for="17">Type Of Birth </label>
            <input type="text" class="form-control input-sm" name="birth" id="17" autocomplete="off">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="18">Date </label>
            <input type="text" class="form-control datepicker input-sm" name="date" id="18" autocomplete="off" data-date-format='DD/MM/YYYY'>
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="19">Gravida </label>
            <input type="text" class="form-control input-sm" name="gravida" id="19" autocomplete="off">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="20">Para </label>
            <input type="text" class="form-control input-sm" name="para" id="20" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="21">Complications Of Pregnancy/birth </label>
            <input type="text" class="form-control input-sm" name="complications" id="21" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="22">Blood Group </label>
            <input type="text" class="form-control input-sm" name="blood_group" id="22" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="23">Feeding: Breast / Artificial </label>
            <input type="text" class="form-control input-sm" name="feeding" id="23" autocomplete="off">
    </div>
   <div class = "form-group col-md-12 col-sm-12">
    <h5 style="color:#1E90FF"><b>After Pains</b></h5>
   </div>
    <div class="form-group col-md-6 col-sm-6">
            <label for="24">History Of Gastrointestinal System </label>  
            <input type="text" class="form-control input-sm" name="gastro" id="24" autocomplete="off">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="25">Loss Of Appetite </label>
            <input type="text" class="form-control input-sm" name="appetite" id="25" autocomplete="off">
    </div>   
	<div class="form-group col-md-6 col-sm-6">
            <label for="26">Constipation </label>
            <input type="text" class="form-control input-sm" name="constipation" id="26" autocomplete="off">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="27">History Of Genitourinary System</label>
            <input type="text" class="form-control input-sm" name="genitourinary" id="27" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="28">Incontinence</label>
            <input type="text" class="form-control input-sm" name="incontinence" id="28" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="29">Prolapse</label>
            <input type="text" class="form-control input-sm" name="prolapse" id="29" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="30">Polyuria</label>
            <input type="text" class="form-control input-sm" name="polyuria" id="30" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="31">Burning Micturition</label>
            <input type="text" class="form-control input-sm" name="micturition" id="31" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="32">Constipation</label>
            <input type="text" class="form-control input-sm" name="constipation1" id="32" autocomplete="off">
    </div>
   <div class = "form-group col-md-12 col-sm-12">
    <h5 style="color:#1E90FF"><b>Past History</b></h5>
   </div>
  
    <div class="form-group col-md-6 col-sm-6">
            <label for="33">Any History Of T.B </label>
            <input type="text" class="form-control input-sm" name="tb" id="33" autocomplete="off">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="34">Seizures </label>
            <input type="text" class="form-control input-sm" name="seizures" id="34" autocomplete="off">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="35">Blood Pressure </label>
            <input type="text" class="form-control input-sm" name="BP" id="35" autocomplete="off">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="36">Anaemia </label>
            <input type="text" class="form-control input-sm" name="anaemia" id="36" autocomplete="off">
    </div>
    <div class="form-group col-md-6 col-sm-6">
            <label for="37">Previous History Of Musculoskeletal Problems </label>
            <input type="text" class="form-control input-sm" name="p_musculoskeletal" id="37" autocomplete="off">
    </div>	
    <div class="form-group col-md-6 col-sm-6">
            <label for="38">Rh Incompatibility </label>
            <input type="text" class="form-control input-sm" name="rh_incompatibility" id="38" autocomplete="off">
    </div>
			 <table style="width:100%;"  border="1"  >
		<tr ><td colspan="3"><div class="form-group col-md-12 col-sm-12">
             <h4 class="content-headline">Body Chart</h4>
             </br>
		         <div id="progress">
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<center><span class="saveAppoinmentLoader"><span><img src="<?php echo 'http://srmpt.physioplustech.com/img/spinner.gif'; ?>"><h4><font color="red">Saving Please Wait....</font></h4></span></span></center>
				  </div>
				   <input type="hidden" id="patient_id" value="<?php echo $this->uri->segment(4); ?>" name="id" >
				   <div id="wPaint" style="position:relative; width:500px; height:550px; margin:70px auto 20px auto;"></div>
				     <center id="wPaint-img"></center>
        </div></td></tr></table> 
		</br>
		
   <div class = "form-group col-md-12 col-sm-12">
    <h5 style="color:#1E90FF"><b>Obsteric History</b></h5>
   </div>
   <div class = "form-group col-md-12 col-sm-12" style="overflow-x:auto;">
   
   <table border=1 >
   <tr>
   <th><p style="font-size:12px; text-align:center;">S.NO</p></th>
   <th><p style="font-size:10px; text-align:center;">NO OF DELIVERIES</p></th>
   <th><p style="font-size:10px; text-align:center;">MODE OF DELIVERY</p></th>
   <th><p style="font-size:10px; text-align:center;">ANY COMPLICATIONS</p></th>
   <th><p style="font-size:10px; text-align:center;">1ST STAGE OF LABOUR</p></th>
   <th><p style="font-size:10px; text-align:center;">2ND STAGE OF LABOUR</p></th>
   <th><p style="font-size:10px; text-align:center;">BABY SEX</p></th>
   <th><p style="font-size:10px; text-align:center;">BABY WEIGHT</p></th>
   </tr>
   <tr>
   <th><input type="text" value="1" class="form-control input-sm" id="" >
  </th>
   <th><input type="text" class="form-control input-sm" name="NO_DELIVERIES1" id="NO_DELIVERIES1" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="MODE_DELIVERY1" id="MODE_DELIVERY1" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="COMPLICATIONS1" id="COMPLICATIONS1" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="1ST_LABOUR1" id="1ST_LABOUR1" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="2ND_LABOUR1" id="2ND_LABOUR1" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="SEX1" id="SEX1" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="BABY_WEIGHT1" id="BABY_WEIGHT1" autocomplete="off">
  </th>
   </tr>
   <tr>
   <th><input type="text" value="2" class="form-control input-sm" id="" >
  </th>
   <th><input type="text" class="form-control input-sm" name="NO_DELIVERIES2" id="NO_DELIVERIES2" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="MODE_DELIVERY2" id="MODE_DELIVERY2" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="COMPLICATIONS2" id="COMPLICATIONS2" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="1ST_LABOUR2" id="1ST_LABOUR2" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="2ND_LABOUR2" id="2ND_LABOUR2" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="SEX2" id="SEX2" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="BABY_WEIGHT2" id="BABY_WEIGHT2" autocomplete="off">
  </th>
   </tr>
   <tr>
   <th><input type="text" value="3" class="form-control input-sm" id="" >
  </th>
   <th><input type="text" class="form-control input-sm" name="NO_DELIVERIES3" id="NO_DELIVERIES3" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="MODE_DELIVERY3" id="MODE_DELIVERY3" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="COMPLICATIONS3" id="COMPLICATIONS3" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="1ST_LABOUR3" id="1ST_LABOUR3" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="2ND_LABOUR3" id="2ND_LABOUR3" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="SEX3" id="SEX3" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="BABY_WEIGHT3" id="BABY_WEIGHT3" autocomplete="off">
  </th>
   </tr>
   <tr>
   <th><input type="text" value="4" class="form-control input-sm" id="" >
  </th>
   <th><input type="text" class="form-control input-sm" name="NO_DELIVERIES4" id="NO_DELIVERIES4" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="MODE_DELIVERY4" id="MODE_DELIVERY4" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="COMPLICATIONS4" id="COMPLICATIONS4" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="1ST_LABOUR4" id="1ST_LABOUR4" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="2ND_LABOUR4" id="2ND_LABOUR4" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="SEX4" id="SEX4" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="BABY_WEIGHT4" id="BABY_WEIGHT4" autocomplete="off">
  </th>
   </tr>
   <tr>
   <th><input type="text" value="5" class="form-control input-sm" id="" >
  </th>
   <th><input type="text" class="form-control input-sm" name="NO_DELIVERIES5" id="NO_DELIVERIES5" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="MODE_DELIVERY5" id="MODE_DELIVERY5" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="COMPLICATIONS5" id="COMPLICATIONS5" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="1ST_LABOUR5" id="1ST_LABOUR5" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="2ND_LABOUR5" id="2ND_LABOUR5" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="SEX5" id="SEX5" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="BABY_WEIGHT5" id="BABY_WEIGHT5" autocomplete="off">
  </th>
   </tr>
   <tr>
   <th><input type="text" value="6" class="form-control input-sm" id="" >
  </th>
   <th><input type="text" class="form-control input-sm" name="NO_DELIVERIES6" id="NO_DELIVERIES6" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="MODE_DELIVERY6" id="MODE_DELIVERY6" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="COMPLICATIONS6" id="COMPLICATIONS6" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="1ST_LABOUR6" id="1ST_LABOUR6" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="2ND_LABOUR6" id="2ND_LABOUR6" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="SEX6" id="SEX6" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="BABY_WEIGHT6" id="BABY_WEIGHT6" autocomplete="off">
  </th>
   </tr>
   </table>
   </div>
    
   <div class = "form-group col-md-12 col-sm-12">
    <h5 style="color:#1E90FF"><b>Medical History</b></h5>
   </div>
   <div class="form-group col-md-6 col-sm-6">
            <label for="39">Cardiac Problems </label>
            <input type="text" name="cardiac" class="form-control input-sm" id="39" autocomplete="off">
    </div>	
    <div class="form-group col-md-6 col-sm-6">
            <label for="40">Hyper Or Hypothyroidism </label>
            <input type="text" name="hypothyroidism" class="form-control input-sm" id="40" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="41">Auto Immune Disorders </label>
            <input type="text" class="form-control input-sm" name="immune" id="41" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="42">Bronchial Asthma </label>
            <input type="text" class="form-control input-sm" name="bronchial" id="42" autocomplete="off">
    </div>
	
	<div class="form-group col-md-6 col-sm-6">
            <label for="43"><b>Surgical History</b> </label>
            <input type="text" class="form-control input-sm" name="surgical" id="43" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="44"><b>Family History</b></label>
            <input type="text" class="form-control input-sm" name="family" id="44" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="45">Twins </label>
            <input type="text" class="form-control input-sm" name="twins" id="45" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="46">Congenital Defects </label>
            <input type="text" class="form-control input-sm" name="congenital" id="46" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="47">Diabetes Mellitus </label>
            <input type="text" class="form-control input-sm" name="diabetes" id="47" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="48"><b>Personal History</b></label>
            <input type="text" class="form-control input-sm" name="personal" id="48" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="49">Smoking, Alcoholism </label>
            <input type="text" class="form-control input-sm" name="smoking" id="49" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="50">Sleeping Habits </label>
            <input type="text" class="form-control input-sm" name="sleeping" id="50" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="51"><b>Social Economic History</b></label>
            <input type="text" class="form-control input-sm" name="economic" id="51" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="52">Occupation </label>
            <input type="text" class="form-control input-sm" name="occupation1" id="52" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="53">Family Members </label>
            <input type="text" class="form-control input-sm" name="members" id="53" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="54">Economic Outcome </label>
            <input type="text" class="form-control input-sm" name="outcome" id="54" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="55">Lifestyle </label>
            <input type="text" class="form-control input-sm" name="lifestyle" id="55" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="56"><b>Cultural Ideas On New Born And Postpartum</b> </label>
            <input type="text" class="form-control input-sm" name="postpartum" id="56" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="57"><b>Psychological History</b> </label>
            <input type="text" class="form-control input-sm" name="psychological" id="57" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="58">Emotional Disturbances </label>
            <input type="text" class="form-control input-sm" name="emotional" id="58" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="59">Anxiety/depression </label>
            <input type="text" class="form-control input-sm" name="anxiety" id="59" autocomplete="off">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <h5 style="color:#1E90FF"><b>Pain History </b></h5>
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="60">Onset </label>
            <input type="text" class="form-control input-sm" name="onset" id="60" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="61">Duration </label>
            <input type="text" class="form-control input-sm" name="duration" id="61" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="62">Type Of Pain </label>
            <input type="text" class="form-control input-sm" name="type_pain" id="62" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="63">Location </label>
            <input type="text" class="form-control input-sm" name="location" id="63" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="64">Aggravating Factors </label>
            <input type="text" class="form-control input-sm" name="aggravating" id="64" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="65">Relieving Factors </label>
            <input type="text" class="form-control input-sm" name="relieving" id="65" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="66">Night Pain </label>
            <input type="text" class="form-control input-sm" name="night" id="66" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="67">Irritability Level </label>
            <input type="text" class="form-control input-sm" name="irritability" id="67" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="68">VAS Score </label>
            <input type="text" class="form-control input-sm" name="VAS" id="68" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="69"><b>On Observation</b> </label>
            <input type="text" class="form-control input-sm" name="observation" id="69" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="70">General Condition - Ectomorph, Endomorph, Mesomorph </label>
            <input type="text" class="form-control input-sm" name="general" id="70" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="71">Edema </label>
            <input type="text" class="form-control input-sm" name="edema" id="71" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="72">Trophic Changes </label>
            <input type="text" class="form-control input-sm" name="trophic" id="72" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="73">Posture</label>
            <input type="text" class="form-control input-sm" name="posture" id="73" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="74">Anterior View</label>
            <input type="text" class="form-control input-sm" name="anterior" id="74" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="75">Posterior View</label>
            <input type="text" class="form-control input-sm" name="posterior" id="75" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="76">Lateral View</label>
            <input type="text" class="form-control input-sm" name="lateral" id="76" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="77">Gait </label>
            <input type="text" class="form-control input-sm" name="gait" id="77" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="78">Perineum </label>
            <input type="text" class="form-control input-sm" name="perineum" id="78" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="79">Discolouration </label>
            <input type="text" class="form-control input-sm" name="discolouration" id="79" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="80">Oedema </label>
            <input type="text" class="form-control input-sm" name="oedema" id="80" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="81">Hemorroids </label>
            <input type="text" class="form-control input-sm" name="hemorroids" id="81" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="82">Episiotomy – Type </label>
            <input type="text" class="form-control input-sm" name="episiotomy" id="82" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="83">Urine Distension </label>
            <input type="text" class="form-control input-sm" name="urine" id="83" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="84">Pain </label>
            <input type="text" class="form-control input-sm" name="pain" id="84" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="85">Lochia </label>
            <input type="text" class="form-control input-sm" name="lochia" id="85" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="86">Vulvar Haematoma </label>
            <input type="text" class="form-control input-sm" name="vulvar" id="86" autocomplete="off">
    </div>
	
	<div class="form-group col-md-12 col-sm-12">
            <h5 style="color:#1E90FF"><b>On Palpation</b> </h5>
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="87">Tenderness </label>
            <input type="text" class="form-control input-sm" name="tenderness" id="87" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="88">Temperature Variation In Skin </label>
            <input type="text" class="form-control input-sm" name="temperature" id="88" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="89">Swelling </label>
            <input type="text" class="form-control input-sm" name="swelling1" id="89" autocomplete="off">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <h5 style="color:#1E90FF"><b>On Examination </b></h5>
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="90">1.	Vital Signs </label>
			<input type="text" class="form-control input-sm" name="vital" id="90" autocomplete="off">
    </div>

	<div class="form-group col-md-6 col-sm-6">
            <label for="91"> BP </label>
            <input type="text" class="form-control input-sm" name="BP1" id="91" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="92">Pulse </label>
            <input type="text" class="form-control input-sm" name="pulse" id="92" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="93">Respiratory Rate </label>
            <input type="text" class="form-control input-sm" name="respiratory" id="93" autocomplete="off">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="94">2.	Abdomen</label>
            <input type="text" class="form-control input-sm" name="abdomen" id="94" autocomplete="off">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="95">3.	Chest Examination</label>
            <input type="text" class="form-control input-sm" name="chest" id="95" autocomplete="off">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="96">Auscultation</label>
            <input type="text" class="form-control input-sm" name="auscultation" id="96" autocomplete="off">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="97">Chest Expansion</label>
            <input type="text" class="form-control input-sm" name="chest_expansion" id="97" autocomplete="off">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="98">Pattern Of Breathing</label>
            <input type="text" class="form-control input-sm" name="breathing" id="98" autocomplete="off">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="99">4.	Range Of Motion </label>
            <input type="text" class="form-control input-sm" name="range_motion" id="99" autocomplete="off">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="100">5.	Edema Assessment </label>
            <input type="text" class="form-control input-sm" name="edema1" id="100" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="101">Girth </label>
            <input type="text" class="form-control input-sm" name="girth" id="101" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="102">Volumetric </label>
            <input type="text" class="form-control input-sm" name="volumetric" id="102" autocomplete="off">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="103">6.	Manual Muscle Testing </label>
            <input type="text" class="form-control input-sm" name="manual" id="103" autocomplete="off">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="104">7.	DTR </label>
            <input type="text" class="form-control input-sm" name="DTR" id="104" autocomplete="off">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="105"> 8. Diastasis Recti Assessment </label>
            <input type="text" class="form-control input-sm" name="diastasis" id="105" autocomplete="off">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="106">9.	Breast Examination </label>
            <input type="text" class="form-control input-sm" name="breast_exam" id="106" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="107">Size </label>
            <input type="text" class="form-control input-sm" name="size" id="107" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="108">Nipple </label>
            <input type="text" class="form-control input-sm" name="nipple" id="108" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="109">Areola </label>
            <input type="text" class="form-control input-sm" name="areola" id="109" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="110">10. Infant Feeding </label>
            <input type="text" class="form-control input-sm" name="infant" id="110" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="111">Type </label>
            <input type="text" class="form-control input-sm" name="type" id="111" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="112">Frequency </label>
            <input type="text" class="form-control input-sm" name="frequency" id="112" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="113">Breast Engorgement </label>
            <input type="text" class="form-control input-sm" name="engorgement" id="113" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="114">Nipple Soreness Or Cracked Nipples </label>
            <input type="text" class="form-control input-sm" name="cracked" id="114" autocomplete="off">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="115">11. Sensations </label>
            <input type="text" class="form-control input-sm" name="sensations" id="115" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="116">12. Varicose Veins/DVT</label>
            <input type="text" class="form-control input-sm" name="varicose" id="116" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="117">13. Suture/Episiotomy</label>
            <input type="text" class="form-control input-sm" name="suture" id="117" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="118">14. Special Test </label>
            <input type="text" class="form-control input-sm" name="special_test" id="118" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="119">15. Functional Assessment</label>
            <input type="text" class="form-control input-sm" name="functional" id="119" autocomplete="off">
    </div>
	
    <div class="col-md-12 col-sm-12">
		<div class="form-group col-md-3 col-sm-3 pull-right" >
				<input type="submit" class="btn btn-primary" value="Submit" id="save"/>
				<input type="reset" class="btn btn-danger" value="Reset"/>
		</div>
	</div></div>
</form>
</div>
	<script src="<?php echo base_url();?>assets/js/vendor/parsley/parsley.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>wpaintone/lib/jquery.ui.core.1.10.3.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>wpaintone/lib/jquery.ui.widget.1.10.3.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>wpaintone/lib/jquery.ui.mouse.1.10.3.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>wpaintone/lib/jquery.ui.draggable.1.10.3.min.js"></script>	
	<link rel="Stylesheet" type="text/css" href="<?php echo base_url() ?>wpaintone/lib/wColorPicker.min.css" />
	<script type="text/javascript" src="<?php echo base_url() ?>wpaintone/lib/wColorPicker.min.js"></script>
	<link rel="Stylesheet" type="text/css" href="<?php echo base_url() ?>wpaintone/wPaint.min.css" />
	<script type="text/javascript" src="<?php echo base_url() ?>wpaintone/wPaint.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>wpaintone/plugins/main/wPaint.menu.main.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>wpaintone/plugins/text/wPaint.menu.text.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>wpaintone/plugins/shapes/wPaint.menu.main.shapes.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>wpaintone/plugins/file/wPaint.menu.main.file.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>wpaintone/lib/jquery.ui.core.1.10.3.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>wpaintone/lib/jquery.ui.widget.1.10.3.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>wpaintone/lib/jquery.ui.mouse.1.10.3.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>wpaintone/lib/jquery.ui.draggable.1.10.3.min.js"></script>	
	<link rel="Stylesheet" type="text/css" href="<?php echo base_url() ?>wpaintone/lib/wColorPicker.min.css" />
	<script type="text/javascript" src="<?php echo base_url() ?>wpaintone/lib/wColorPicker.min.js"></script>
	<link rel="Stylesheet" type="text/css" href="<?php echo base_url() ?>wpaintone/wPaint.min.css" />
	<script type="text/javascript" src="<?php echo base_url() ?>wpaintone/wPaint.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>wpaintone/plugins/main/wPaint.menu.main.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>wpaintone/plugins/text/wPaint.menu.text.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>wpaintone/plugins/shapes/wPaint.menu.main.shapes.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>wpaintone/plugins/file/wPaint.menu.main.file.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.gritter.min.js"></script> 
	<script src="<?php  echo base_url();  ?>assets/js/vendor/jgrowl/jquery.jgrowl.min.js"></script>
	<script src="<?php  echo base_url();  ?>assets/js/vendor/bootstrap/bootstrap-dropdown-multilevel.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php  echo base_url();  ?>assets/js/vendor/mmenu/js/jquery.mmenu.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php  echo base_url();  ?>assets/js/vendor/nicescroll/jquery.nicescroll.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/momentjs/moment-with-langs.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/datepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/colorpalette/bootstrap-colorpalette.js" type="text/javascript"></script>
   
	<script>	
		/*  $(document).ready(function() {
		$(".edit").click(function(){
			var val = $('#assess_id').val();
			var val1 = $('#patient_id').val();
			window.location= "<?php echo base_url().'assessment/edit_postnatal/' ?>"+val1+'/'+val;
		});
		$(".print").click(function(){
			var val = $('#assess_id').val();
			var val1 = $('#patient_id').val();
			window.location= "<?php echo base_url().'assessment/print_postnatal/' ?>"+val1+'/'+val;
		});
		$("#assess_date").change(function(){
			var val = $("#assess_date").val();
			var patient_id = $("#patient_id").val();
			var url= '<?php echo base_url().'assessment/postnatal_assessment_info' ?>';
			$.ajax({
					type: "POST",
					dataType: 'json',
					data : {val:val,patient_id:patient_id},
					url: url,
					success: function(data) {
						if(data.status == 'success'){
							$('#assess_id').val(data.message);
							$('.view').show();
							$('.create').hide();
						} else if(data.status != 'success') {
							$('.create').show();
							$('.view').hide();
					    }
					}, 
					complete: function(){
							
					},
					error: function(e){ 
						alert(e.responseText);
					} 
				 }); 
		});
		 
		 });	 */ 
	$(document).ready(function() {
  $('form').on('submit', function (event) {
         event.preventDefault();
		 var $form = $(this);
		  if ( $(this).parsley().isValid() ) {
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
	  }
		else{
			
		}

			  
});  
});

	function calculateBmi() {
	var weight = Number(document.getElementById('7').value).toFixed(2);
	var height = Number(document.getElementById('6').value).toFixed(2);
	if(weight > 0 && height > 0){	
	var finalBmi = Number(weight/(height/100*height/100)).toFixed(2);
	document.getElementById('8').value = finalBmi
	if(finalBmi < 18.5){
		document.getElementById('thin').style.display='block';
		document.getElementById('healthy').style.display='none';
		document.getElementById('overwt').style.display='none';
	}
	if(finalBmi > 18.5 && finalBmi < 25){
		document.getElementById('healthy').style.display='block';
		document.getElementById('thin').style.display='none';
		document.getElementById('overwt').style.display='none';
	}
	if(finalBmi > 25){
		document.getElementById('overwt').style.display='block';
		document.getElementById('thin').style.display='none';
		document.getElementById('healthy').style.display='none';
	}
	}
    } 
	
	$(':radio:not(:checked)').attr('disabled', true);
	
	
	$('#progress').hide();
	 var why = $('input[name="patient_id"]').val();
	 $(document).ready(function() { 
	 var images = [
          '/test/uploads/wPaint.png',
        ];

         function saveImg(image) {
	       var why1 = $("#assess_date").val();
		   var _this = this;
		    $.ajax({
            type: 'POST',  
			url : '<?php echo base_url(); ?>assessment/body_chart', 
			cache : false,
            data: {image:image,id:why,date:why1},
			beforeSend: function(){
				$('.saveAppoinmentLoader > span').show();   
				$('#progress').show();
				
			},
			
            success: function (resp) {
			$('.saveAppoinmentLoader > span').hide(); 
			$('#progress').hide();
			$.jGrowl("Image saved successfully");
			var id=$('#patient_id').val();
		   
            var id=('#patient_id').val();
              resp = $.parseJSON(resp);  
              images.push(resp.img);
                 $('#wPaint').wPaint('image', '<?php echo base_url()?>baby.png')
     		 },
          });
		}

        function loadImgBg () {
			this._showFileModal('bg', images);
        }

        function loadImgFg () {
			this._showFileModal('fg', images);
        }
		$(document).ready(function(){
			 setInterval(function() {
			var url= '<?php echo base_url().'client/cron/working_time' ?>';
				$.ajax({
					url: url,
					method: 'post',
					aysnc: false,
					success: function(response) {
						console.log(response);
					}
				});
			}, 120000);
			$('#wPaint').wPaint('image', '<?php echo base_url()?>pain-chart-blank.JPG')
		});
		$('#wPaint').wPaint({
          menuOffsetLeft: -35,
          menuOffsetTop: -50,
          saveImg: saveImg,
          loadImgBg: loadImgBg,
          loadImgFg: loadImgFg
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
</script>

</body>
</html>