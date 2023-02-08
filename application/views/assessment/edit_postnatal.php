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
    <form action="<?php echo base_url().'assessment/update_postnatal' ?>" method="post">
<div class="col-md-12 col-sm-12">
   <!--<div class="form-group col-md-6 col-sm-6">
            <label for="name">Assessment Date  *	</label>
                 <input class="datepicker form-control" type="date"  id="assess_date" name="assess_date" value="<?php echo $postnata_ass['assess_date'];?>"/> 
	</div>-->
	<div class="form-group col-md-6 col-sm-6">
                        <label for="datepicker" class="col-sm-4 control-label">Assessment Date</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control datepicker assess_date" id="assess_date" value="<?php echo date('d-m-Y',strtotime($postnata_ass['assess_date']));?>" name="assess_date" data-date-format='DD/MM/YYYY'>
                        </div>
                      </div>
		
     <input type="hidden" class="form-control" value="<?php echo $postnata_ass['patient_id']; ?>" name="patient_id" id="patient_id" placeholder="">
  	 <input type="hidden" class="form-control" value="<?php echo $postnata_ass['postnata_id']; ?>" name="postnata_id" id="postnata_id" placeholder="">
     	<div class="create" >     
	   <div class="form-group col-md-3 col-sm-6">
            <label for="1">Name  *	</label>
            <input type="text" name="name" class="form-control input-sm" id="1" value="<?php echo $patient['first_name'];?>" autocomplete="off" readonly>
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="2">Age  *</label>
            <input type="text" name="age" class="form-control input-sm" id="2" value="<?php echo $patient['age'];?>" autocomplete="off" readonly>
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="3">Occupation  *</label>
            <input type="text"  name="occupation" class="form-control input-sm" id="3" value="<?php echo $patient['occupation'];?>" autocomplete="off" readonly>
        </div>

		<!--<div class="form-group col-md-3 col-sm-6">
            <label for="4">UHID No</label>
            <input type="text" name="uhid_no" class="form-control input-sm" id="4" value="<?php echo $postnata_ass['uhid_no'];?>" autocomplete="off" >
        </div>-->
		<div class="form-group col-md-3 col-sm-6">
            <label for="5">Patient Code</label>
            <input type="text" class="form-control input-sm" id="5" value="<?php echo $patient['patient_code'];?>" readonly autocomplete="off">
        </div>
        <div class="form-group col-md-3 col-sm-6">
	      <label for="5">Marital Status  *  &nbsp;&nbsp;</label>
		  <?php if($patient['marital_status']=="single") { ?> 
	 <input type="radio" name="marital" parsley-required="true" value="Single" id="Club"  checked />
	                           <label for="Club">Single&nbsp;&nbsp;</label>
							    <input type="radio" name="marital" value="Married" id="Country" />
								<label for="Country">Married&nbsp;&nbsp;</label>
								<?php } elseif($patient['marital_status']=="Married") { ?>
								<input type="radio" name="marital" parsley-required="true" value="Single" id="Club"   />
	                           <label for="Club">Single&nbsp;&nbsp;</label>
							    <input type="radio" name="marital" value="Married" id="Country" checked />
								<label for="Country">Married&nbsp;&nbsp;</label>
								<?php  } else { ?>
							   <input type="radio" name="marital" parsley-required="true" value="Single" id="Club"   />
	                           <label for="Club">Single&nbsp;&nbsp;</label>
							    <input type="radio" name="marital" value="Married" id="Country"  />
								<label for="Country">Married&nbsp;&nbsp;</label>
									
								<?php }?>
								</div>
								
			<div class="form-group col-md-3 col-sm-6">
            <label for="6">Height  </label>
            <input type="text" class="form-control input-sm" id="6"  name="height" value="<?php echo $patient['height'];?>" autocomplete="off" readonly>
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="7">Weight  </label>
            <input type="text" class="form-control input-sm" id="7"  onchange="calculateBmi()" name="weight" value="<?php echo $patient['weight'];?>" autocomplete="off" readonly>
        </div>
	
	   <div class="form-group col-md-3 col-sm-3">
            <label for="8">BMI *</label>
            <input type="text" class="form-control input-sm" name="bmi" id="8" readonly value="<?php echo $patient['bmi'];?>" autocomplete="off" readonly>
			<div id="thin" style="display:none" class="alert alert-success"> That you are too thin. </div>
		<div id="healthy" style="display:none" class="alert alert-success"> That you are healthy. </div>
		<div id="overwt" style="display:none" class="alert alert-danger"> That you have overweight. </div>
			
        </div>
					
		
		<div class="form-group col-md-6 col-sm-6">
            <label for="9">Address *</label>
             <textarea class="form-control input-sm" name="address" id="9" rows="3" autocomplete="off" readonly><?php echo $patient['address_line1'];?></textarea>
	  </div>
	  
      
	<div class = "form-group col-md-12 col-sm-12">
    <h5 style="color:#1E90FF"><b>Chief Complaints Of The Patient</b></h5>
	</div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="10">Nausea, Vomitting</label>
            <input type="text" class="form-control input-sm" name="vomitting" id="10" value="<?php echo $postnata_ass['vomitting'];?>" autocomplete="off">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="11">Musculoskeletal Problems</label>
            <input type="text" class="form-control input-sm" name="musculoske" id="11" value="<?php echo $postnata_ass['musculoske'];?>" autocomplete="off">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="12">Headache, Epigastric Pain</label>
            <input type="text" class="form-control input-sm" name="headache" id="12" value="<?php echo $postnata_ass['headache'];?>" autocomplete="off">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="13">Swelling</label>
            <input type="text" class="form-control input-sm" name="swelling" id="13" value="<?php echo $postnata_ass['swelling'];?>" autocomplete="off">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="14">Malaise</label>
            <input type="text" class="form-control input-sm" name="malaise" id="14" value="<?php echo $postnata_ass['malaise'];?>" autocomplete="off">
    </div> 
	
	
	 <div class = "form-group col-md-12 col-sm-12">
    <h5 style="color:#1E90FF"><b>Present History</b></h5>
    </div>
  
	<div class="form-group col-md-6 col-sm-6">
            <label for="15"><b>History Of Present Condition</b></label>
            <input type="text" class="form-control input-sm" name="present_history" id="15" value="<?php echo $postnata_ass['present_history'];?>" autocomplete="off">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="16"><b>Relevant Past History</b> </label>
            <input type="text" class="form-control input-sm" name="past_history" id="16" value="<?php echo $postnata_ass['past_history'];?>" autocomplete="off">
    </div> 
 
  <div class="form-group col-md-6 col-sm-6">
            <label for="17">Type Of Birth </label>
            <input type="text" class="form-control input-sm" name="birth" id="17" value="<?php echo $postnata_ass['birth'];?>" autocomplete="off">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="18">Date </label>
            <input type="text" class="form-control datepicker input-sm" name="date" id="18" value="<?php echo date('d-m-Y',strtotime($postnata_ass['date'])); ?>" autocomplete="off" data-date-format='DD/MM/YYYY'>
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="19">Gravida </label>
            <input type="text" class="form-control input-sm" name="gravida" id="19" value="<?php echo $postnata_ass['gravida'];?>" autocomplete="off">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="20">Para </label>
            <input type="text" class="form-control input-sm" name="para" id="20" value="<?php echo $postnata_ass['para'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="21">Complications Of Pregnancy/birth </label>
            <input type="text" class="form-control input-sm" name="complications" id="21" value="<?php echo $postnata_ass['complications'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="22">Blood Group </label>
            <input type="text" class="form-control input-sm" name="blood_group" id="22" value="<?php echo $postnata_ass['blood_group'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="23">Feeding: Breast / Artificial </label>
            <input type="text" class="form-control input-sm" name="feeding" id="23" value="<?php echo $postnata_ass['feeding'];?>" autocomplete="off">
    </div>
   <div class = "form-group col-md-12 col-sm-12">
    <h5 style="color:#1E90FF"><b>After Pains</b></h5>
   </div>
    <div class="form-group col-md-6 col-sm-6">
            <label for="24">History Of Gastrointestinal System </label>  
            <input type="text" class="form-control input-sm" name="gastro" id="24" value="<?php echo $postnata_ass['gastro'];?>" autocomplete="off">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="25">Loss Of Appetite </label>
            <input type="text" class="form-control input-sm" name="appetite" id="25" value="<?php echo $postnata_ass['appetite'];?>" autocomplete="off">
    </div>   
	<div class="form-group col-md-6 col-sm-6">
            <label for="26">Constipation </label>
            <input type="text" class="form-control input-sm" name="constipation" id="26" value="<?php echo $postnata_ass['constipation'];?>" autocomplete="off">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="27">History Of Genitourinary System</label>
            <input type="text" class="form-control input-sm" name="genitourinary" id="27" value="<?php echo $postnata_ass['genitourinary'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="28">Incontinence</label>
            <input type="text" class="form-control input-sm" name="incontinence" id="28" value="<?php echo $postnata_ass['incontinence'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="29">Prolapse</label>
            <input type="text" class="form-control input-sm" name="prolapse" id="29" value="<?php echo $postnata_ass['prolapse'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="30">Polyuria</label>
            <input type="text" class="form-control input-sm" name="polyuria" id="30" value="<?php echo $postnata_ass['polyuria'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="31">Burning Micturition</label>
            <input type="text" class="form-control input-sm" name="micturition" id="31" value="<?php echo $postnata_ass['micturition'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="32">Constipation</label>
            <input type="text" class="form-control input-sm" name="constipation1" id="32" value="<?php echo $postnata_ass['constipation1'];?>" autocomplete="off">
    </div>
   <div class = "form-group col-md-12 col-sm-12">
    <h5 style="color:#1E90FF"><b>Past History</b></h5>
   </div>
  
    <div class="form-group col-md-6 col-sm-6">
            <label for="33">Any History Of T.B </label>
            <input type="text" class="form-control input-sm" name="tb" id="33" value="<?php echo $postnata_ass['tb'];?>" autocomplete="off">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="34">Seizures </label>
            <input type="text" class="form-control input-sm" name="seizures" id="34" value="<?php echo $postnata_ass['seizures'];?>" autocomplete="off">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="35">Blood Pressure </label>
            <input type="text" class="form-control input-sm" name="BP" id="35" value="<?php echo $postnata_ass['BP'];?>" autocomplete="off">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="36">Anaemia </label>
            <input type="text" class="form-control input-sm" name="anaemia" id="36" value="<?php echo $postnata_ass['anaemia'];?>" autocomplete="off">
    </div>
    <div class="form-group col-md-6 col-sm-6">
            <label for="37">Previous History Of Musculoskeletal Problems </label>
            <input type="text" class="form-control input-sm" name="p_musculoskeletal" id="37" value="<?php echo $postnata_ass['p_musculoskeletal'];?>" autocomplete="off">
    </div>	
    <div class="form-group col-md-6 col-sm-6">
            <label for="38">Rh Incompatibility </label>
            <input type="text" class="form-control input-sm" name="rh_incompatibility" id="38" value="<?php echo $postnata_ass['rh_incompatibility'];?>" autocomplete="off">
    </div>
	
	 <div class="past_image">
		<p style="float:right"><a id="edit" class="btn btn-info edit">Edit</a></p>
		  <img src="<?php echo $postnata_ass['chart']; ?>" style="width:100%; height:auto;"></img>
		</div>
		<div style="display:none;" class="paint_part">
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
        </div></td></tr></table></div>
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
   <th><input type="text" class="form-control input-sm" name="NO_DELIVERIES1" id="NO_DELIVERIES1" value="<?php echo $postnata_ass['NO_DELIVERIES1'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="MODE_DELIVERY1" id="MODE_DELIVERY1" value="<?php echo $postnata_ass['MODE_DELIVERY1'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="COMPLICATIONS1" id="COMPLICATIONS1" value="<?php echo $postnata_ass['COMPLICATIONS1'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="1ST_LABOUR1" id="1ST_LABOUR1" value="<?php echo $postnata_ass['1ST_LABOUR1'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="2ND_LABOUR1" id="2ND_LABOUR1" value="<?php echo $postnata_ass['2ND_LABOUR1'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="SEX1" id="SEX1" value="<?php echo $postnata_ass['SEX1'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="BABY_WEIGHT1" id="BABY_WEIGHT1" value="<?php echo $postnata_ass['BABY_WEIGHT1'];?>" autocomplete="off">
  </th>
   </tr>
   <tr>
   <th><input type="text" value="2" class="form-control input-sm" id="" >
  </th>
   <th><input type="text" class="form-control input-sm" name="NO_DELIVERIES2" id="NO_DELIVERIES2" value="<?php echo $postnata_ass['NO_DELIVERIES2'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="MODE_DELIVERY2" id="MODE_DELIVERY2" value="<?php echo $postnata_ass['MODE_DELIVERY2'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="COMPLICATIONS2" id="COMPLICATIONS2" value="<?php echo $postnata_ass['COMPLICATIONS2'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="1ST_LABOUR2" id="1ST_LABOUR2" value="<?php echo $postnata_ass['1ST_LABOUR2'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="2ND_LABOUR2" id="2ND_LABOUR2" value="<?php echo $postnata_ass['2ND_LABOUR2'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="SEX2" id="SEX2" value="<?php echo $postnata_ass['SEX2'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="BABY_WEIGHT2" id="BABY_WEIGHT2" value="<?php echo $postnata_ass['BABY_WEIGHT2'];?>" autocomplete="off">
  </th>
   </tr>
   <tr>
   <th><input type="text" value="3" class="form-control input-sm" id="" >
  </th>
   <th><input type="text" class="form-control input-sm" name="NO_DELIVERIES3" id="NO_DELIVERIES3" value="<?php echo $postnata_ass['NO_DELIVERIES3'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="MODE_DELIVERY3" id="MODE_DELIVERY3" value="<?php echo $postnata_ass['MODE_DELIVERY3'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="COMPLICATIONS3" id="COMPLICATIONS3" value="<?php echo $postnata_ass['COMPLICATIONS3'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="1ST_LABOUR3" id="1ST_LABOUR3" value="<?php echo $postnata_ass['1ST_LABOUR3'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="2ND_LABOUR3" id="2ND_LABOUR3" value="<?php echo $postnata_ass['2ND_LABOUR3'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="SEX3" id="SEX3" value="<?php echo $postnata_ass['SEX3'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="BABY_WEIGHT3" id="BABY_WEIGHT3" value="<?php echo $postnata_ass['BABY_WEIGHT3'];?>" autocomplete="off">
  </th>
   </tr>
   <tr>
   <th><input type="text" value="4" class="form-control input-sm" id="" >
  </th>
   <th><input type="text" class="form-control input-sm" name="NO_DELIVERIES4" id="NO_DELIVERIES4" value="<?php echo $postnata_ass['NO_DELIVERIES4'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="MODE_DELIVERY4" id="MODE_DELIVERY4" value="<?php echo $postnata_ass['MODE_DELIVERY4'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="COMPLICATIONS4" id="COMPLICATIONS4" value="<?php echo $postnata_ass['COMPLICATIONS4'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="1ST_LABOUR4" id="1ST_LABOUR4" value="<?php echo $postnata_ass['1ST_LABOUR4'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="2ND_LABOUR4" id="2ND_LABOUR4" value="<?php echo $postnata_ass['2ND_LABOUR4'];?>" autocomplete="off"> 
  </th>
   <th><input type="text" class="form-control input-sm" name="SEX4" id="SEX4" value="<?php echo $postnata_ass['SEX4'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="BABY_WEIGHT4" id="BABY_WEIGHT4" value="<?php echo $postnata_ass['BABY_WEIGHT4'];?>" autocomplete="off">
  </th>
   </tr>
   <tr>
   <th><input type="text" value="5" class="form-control input-sm" id="" >
  </th>
   <th><input type="text" class="form-control input-sm" name="NO_DELIVERIES5" id="NO_DELIVERIES5" value="<?php echo $postnata_ass['NO_DELIVERIES5'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="MODE_DELIVERY5" id="MODE_DELIVERY5" value="<?php echo $postnata_ass['MODE_DELIVERY5'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="COMPLICATIONS5" id="COMPLICATIONS5" value="<?php echo $postnata_ass['COMPLICATIONS5'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="1ST_LABOUR5" id="1ST_LABOUR5" value="<?php echo $postnata_ass['1ST_LABOUR5'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="2ND_LABOUR5" id="2ND_LABOUR5" value="<?php echo $postnata_ass['2ND_LABOUR5'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="SEX5" id="SEX5" value="<?php echo $postnata_ass['SEX5'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="BABY_WEIGHT5" id="BABY_WEIGHT5" value="<?php echo $postnata_ass['BABY_WEIGHT5'];?>" autocomplete="off">
  </th>
   </tr>
   <tr>
   <th><input type="text" value="6" class="form-control input-sm" id="" >
  </th>
   <th><input type="text" class="form-control input-sm" name="NO_DELIVERIES6" id="NO_DELIVERIES6" value="<?php echo $postnata_ass['NO_DELIVERIES6'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="MODE_DELIVERY6" id="MODE_DELIVERY6" value="<?php echo $postnata_ass['MODE_DELIVERY6'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="COMPLICATIONS6" id="COMPLICATIONS6" value="<?php echo $postnata_ass['COMPLICATIONS6'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="1ST_LABOUR6" id="1ST_LABOUR6" value="<?php echo $postnata_ass['1ST_LABOUR6'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="2ND_LABOUR6" id="2ND_LABOUR6" value="<?php echo $postnata_ass['2ND_LABOUR6'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="SEX6" id="SEX6" value="<?php echo $postnata_ass['SEX6'];?>" autocomplete="off">
  </th>
   <th><input type="text" class="form-control input-sm" name="BABY_WEIGHT6" id="BABY_WEIGHT6" value="<?php echo $postnata_ass['BABY_WEIGHT6'];?>" autocomplete="off">
  </th>
   </tr>
   </table>
   </div>
    
   <div class = "form-group col-md-12 col-sm-12">
    <h5 style="color:#1E90FF"><b>Medical History</b></h5>
   </div>
   <div class="form-group col-md-6 col-sm-6">
            <label for="39">Cardiac Problems </label>
            <input type="text" name="cardiac" class="form-control input-sm" id="39" value="<?php echo $postnata_ass['cardiac'];?>" autocomplete="off">
    </div>	
    <div class="form-group col-md-6 col-sm-6">
            <label for="40">Hyper Or Hypothyroidism </label>
            <input type="text" name="hypothyroidism" class="form-control input-sm" id="40" value="<?php echo $postnata_ass['hypothyroidism'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="41">Auto Immune Disorders </label>
            <input type="text" class="form-control input-sm" name="immune" id="41" value="<?php echo $postnata_ass['immune'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="42">Bronchial Asthma </label>
            <input type="text" class="form-control input-sm" name="bronchial" id="42" value="<?php echo $postnata_ass['bronchial'];?>" autocomplete="off">
    </div>
	
	<div class="form-group col-md-6 col-sm-6">
            <label for="43"><b>Surgical History</b> </label>
            <input type="text" class="form-control input-sm" name="surgical" id="43" value="<?php echo $postnata_ass['surgical'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="44"><b>Family History</b></label>
            <input type="text" class="form-control input-sm" name="family" id="44" value="<?php echo $postnata_ass['family'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="45">Twins </label>
            <input type="text" class="form-control input-sm" name="twins" id="45" value="<?php echo $postnata_ass['twins'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="46">Congenital Defects </label>
            <input type="text" class="form-control input-sm" name="congenital" id="46" value="<?php echo $postnata_ass['congenital'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="47">Diabetes Mellitus </label>
            <input type="text" class="form-control input-sm" name="diabetes" id="47" value="<?php echo $postnata_ass['diabetes'];?>" autocomplete="off"> 
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="48"><b>Personal History</b></label>
            <input type="text" class="form-control input-sm" name="personal" id="48" value="<?php echo $postnata_ass['personal'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="49">Smoking, Alcoholism </label>
            <input type="text" class="form-control input-sm" name="smoking" id="49" value="<?php echo $postnata_ass['smoking'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="50">Sleeping Habits </label>
            <input type="text" class="form-control input-sm" name="sleeping" id="50" value="<?php echo $postnata_ass['sleeping'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="51"><b>Social Economic History</b></label>
            <input type="text" class="form-control input-sm" name="economic" id="51" value="<?php echo $postnata_ass['economic'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="52">Occupation </label>
            <input type="text" class="form-control input-sm" name="occupation1" id="52" value="<?php echo $postnata_ass['occupation1'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="53">Family Members </label>
            <input type="text" class="form-control input-sm" name="members" id="53" value="<?php echo $postnata_ass['members'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="54">Economic Outcome </label>
            <input type="text" class="form-control input-sm" name="outcome" id="54" value="<?php echo $postnata_ass['outcome'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="55">Lifestyle </label>
            <input type="text" class="form-control input-sm" name="lifestyle" id="55" value="<?php echo $postnata_ass['lifestyle'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="56"><b>Cultural Ideas On New Born And Postpartum</b> </label>
            <input type="text" class="form-control input-sm" name="postpartum" id="56" value="<?php echo $postnata_ass['postpartum'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="57"><b>Psychological History</b> </label>
            <input type="text" class="form-control input-sm" name="psychological" id="57" value="<?php echo $postnata_ass['psychological'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="58">Emotional Disturbances </label>
            <input type="text" class="form-control input-sm" name="emotional" id="58" value="<?php echo $postnata_ass['emotional'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="59">Anxiety/depression </label>
            <input type="text" class="form-control input-sm" name="anxiety" id="59" value="<?php echo $postnata_ass['anxiety'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <h5 style="color:#1E90FF"><b>Pain History </b></h5>
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="60">Onset </label>
            <input type="text" class="form-control input-sm" name="onset" id="60" value="<?php echo $postnata_ass['onset'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="61">Duration </label>
            <input type="text" class="form-control input-sm" name="duration" id="61" value="<?php echo $postnata_ass['duration'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="62">Type Of Pain </label>
            <input type="text" class="form-control input-sm" name="type_pain" id="62" value="<?php echo $postnata_ass['type_pain'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="63">Location </label>
            <input type="text" class="form-control input-sm" name="location" id="63" value="<?php echo $postnata_ass['location'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="64">Aggravating Factors </label>
            <input type="text" class="form-control input-sm" name="aggravating" id="64" value="<?php echo $postnata_ass['aggravating'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="65">Relieving Factors </label>
            <input type="text" class="form-control input-sm" name="relieving" id="65" value="<?php echo $postnata_ass['relieving'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="66">Night Pain </label>
            <input type="text" class="form-control input-sm" name="night" id="66" value="<?php echo $postnata_ass['night'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="67">Irritability Level </label>
            <input type="text" class="form-control input-sm" name="irritability" id="67" value="<?php echo $postnata_ass['irritability'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="68">VAS Score </label>
            <input type="text" class="form-control input-sm" name="VAS" id="68" value="<?php echo $postnata_ass['VAS'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="69"><b>On Observation</b> </label>
            <input type="text" class="form-control input-sm" name="observation" id="69" value="<?php echo $postnata_ass['observation'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="70">General Condition - Ectomorph, Endomorph, Mesomorph </label>
            <input type="text" class="form-control input-sm" name="general" id="70" value="<?php echo $postnata_ass['general'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="71">Edema </label>
            <input type="text" class="form-control input-sm" name="edema" id="71" value="<?php echo $postnata_ass['edema'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="72">Trophic Changes </label>
            <input type="text" class="form-control input-sm" name="trophic" id="72" value="<?php echo $postnata_ass['trophic'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="73">Posture</label>
            <input type="text" class="form-control input-sm" name="posture" id="73" value="<?php echo $postnata_ass['posture'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="74">Anterior View</label>
            <input type="text" class="form-control input-sm" name="anterior" id="74" value="<?php echo $postnata_ass['anterior'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="75">Posterior View</label>
            <input type="text" class="form-control input-sm" name="posterior" id="75" value="<?php echo $postnata_ass['posterior'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="76">Lateral View</label>
            <input type="text" class="form-control input-sm" name="lateral" id="76" value="<?php echo $postnata_ass['lateral'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="77">Gait </label>
            <input type="text" class="form-control input-sm" name="gait" id="77" value="<?php echo $postnata_ass['gait'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="78">Perineum </label>
            <input type="text" class="form-control input-sm" name="perineum" id="78" value="<?php echo $postnata_ass['perineum'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="79">Discolouration </label>
            <input type="text" class="form-control input-sm" name="discolouration" id="79" value="<?php echo $postnata_ass['discolouration'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="80">Oedema </label>
            <input type="text" class="form-control input-sm" name="oedema" id="80" value="<?php echo $postnata_ass['oedema'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="81">Hemorroids </label>
            <input type="text" class="form-control input-sm" name="hemorroids" id="81" value="<?php echo $postnata_ass['hemorroids'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="82">Episiotomy – Type </label>
            <input type="text" class="form-control input-sm" name="episiotomy" id="82" value="<?php echo $postnata_ass['episiotomy'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="83">Urine Distension </label>
            <input type="text" class="form-control input-sm" name="urine" id="83" value="<?php echo $postnata_ass['urine'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="84">Pain </label>
            <input type="text" class="form-control input-sm" name="pain" id="84" value="<?php echo $postnata_ass['pain'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="85">Lochia </label>
            <input type="text" class="form-control input-sm" name="lochia" id="85" value="<?php echo $postnata_ass['lochia'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="86">Vulvar Haematoma </label>
            <input type="text" class="form-control input-sm" name="vulvar" id="86" value="<?php echo $postnata_ass['vulvar'];?>" autocomplete="off">
    </div>
	
	<div class="form-group col-md-12 col-sm-12">
            <h5 style="color:#1E90FF"><b>On Palpation</b> </h5>
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="87">Tenderness </label>
            <input type="text" class="form-control input-sm" name="tenderness" id="87" value="<?php echo $postnata_ass['tenderness'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="88">Temperature Variation In Skin </label>
            <input type="text" class="form-control input-sm" name="temperature" id="88" value="<?php echo $postnata_ass['temperature'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="89">Swelling </label>
            <input type="text" class="form-control input-sm" name="swelling1" id="89" value="<?php echo $postnata_ass['swelling1'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <h5 style="color:#1E90FF"><b>On Examination </b></h5>
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="90">1.	Vital Signs </label>
			<input type="text" class="form-control input-sm" name="vital" id="90" value="<?php echo $postnata_ass['vital'];?>" autocomplete="off">
    </div>

	<div class="form-group col-md-6 col-sm-6">
            <label for="91"> BP </label>
            <input type="text" class="form-control input-sm" name="BP1" id="91" value="<?php echo $postnata_ass['BP1'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="92">Pulse </label>
            <input type="text" class="form-control input-sm" name="pulse" id="92" value="<?php echo $postnata_ass['pulse'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="93">Respiratory Rate </label>
            <input type="text" class="form-control input-sm" name="respiratory" id="93" value="<?php echo $postnata_ass['respiratory'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="94">2.	Abdomen</label>
            <input type="text" class="form-control input-sm" name="abdomen" id="94" value="<?php echo $postnata_ass['abdomen'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="95">3.	Chest Examination</label>
            <input type="text" class="form-control input-sm" name="chest" id="95" value="<?php echo $postnata_ass['chest'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="96">Auscultation</label>
            <input type="text" class="form-control input-sm" name="auscultation" id="96" value="<?php echo $postnata_ass['auscultation'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="97">Chest Expansion</label>
            <input type="text" class="form-control input-sm" name="chest_expansion" id="97" value="<?php echo $postnata_ass['chest_expansion'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="98">Pattern Of Breathing</label>
            <input type="text" class="form-control input-sm" name="breathing" id="98" value="<?php echo $postnata_ass['breathing'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="99">4.	Range Of Motion </label>
            <input type="text" class="form-control input-sm" name="range_motion" id="99" value="<?php echo $postnata_ass['range_motion'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="100">5.	Edema Assessment </label>
            <input type="text" class="form-control input-sm" name="edema1" id="100" value="<?php echo $postnata_ass['edema1'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="101">Girth </label>
            <input type="text" class="form-control input-sm" name="girth" id="101" value="<?php echo $postnata_ass['girth'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="102">Volumetric </label>
            <input type="text" class="form-control input-sm" name="volumetric" id="102" value="<?php echo $postnata_ass['volumetric'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="103">6.	Manual Muscle Testing </label>
            <input type="text" class="form-control input-sm" name="manual" id="103" value="<?php echo $postnata_ass['manual'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="104">7.	DTR </label>
            <input type="text" class="form-control input-sm" name="DTR" id="104" value="<?php echo $postnata_ass['DTR'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="105"> 8. Diastasis Recti Assessment </label>
            <input type="text" class="form-control input-sm" name="diastasis" id="105" value="<?php echo $postnata_ass['diastasis'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="106">9.	Breast Examination </label>
            <input type="text" class="form-control input-sm" name="breast_exam" id="106" value="<?php echo $postnata_ass['breast_exam'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="107">Size </label>
            <input type="text" class="form-control input-sm" name="size" id="107" value="<?php echo $postnata_ass['size'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="108">Nipple </label>
            <input type="text" class="form-control input-sm" name="nipple" id="108" value="<?php echo $postnata_ass['nipple'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="109">Areola </label>
            <input type="text" class="form-control input-sm" name="areola" id="109" value="<?php echo $postnata_ass['areola'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="110">10. Infant Feeding </label>
            <input type="text" class="form-control input-sm" name="infant" id="110" value="<?php echo $postnata_ass['infant'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="111">Type </label>
            <input type="text" class="form-control input-sm" name="type" id="111" value="<?php echo $postnata_ass['type'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="112">Frequency </label>
            <input type="text" class="form-control input-sm" name="frequency" id="112" value="<?php echo $postnata_ass['frequency'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="113">Breast Engorgement </label>
            <input type="text" class="form-control input-sm" name="engorgement" id="113" value="<?php echo $postnata_ass['engorgement'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="114">Nipple Soreness Or Cracked Nipples </label>
            <input type="text" class="form-control input-sm" name="cracked" id="114" value="<?php echo $postnata_ass['cracked'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="115">11. Sensations </label>
            <input type="text" class="form-control input-sm" name="sensations" id="115" value="<?php echo $postnata_ass['sensations'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="116">12. Varicose Veins/DVT</label>
            <input type="text" class="form-control input-sm" name="varicose" id="116" value="<?php echo $postnata_ass['varicose'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="117">13. Suture/Episiotomy</label>
            <input type="text" class="form-control input-sm" name="suture" id="117" value="<?php echo $postnata_ass['suture'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="118">14. Special Test </label>
            <input type="text" class="form-control input-sm" name="special_test" id="118" value="<?php echo $postnata_ass['special_test'];?>" autocomplete="off">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="119">15. Functional Assessment</label>
            <input type="text" class="form-control input-sm" name="functional" id="119" value="<?php echo $postnata_ass['functional'];?>" autocomplete="off">
    </div>
	
    <div class="col-md-12 col-sm-12">
		<div class="form-group col-md-3 col-sm-3 pull-right" >
				<input type="submit" class="btn btn-primary" value="Submit" id="save"/>
				<input type="reset" class="btn btn-danger" value="Reset"/>
		</div>
	</div></div>
</form>
</div>
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
				
				$.jGrowl("Patient Assessment Has Been Updated Successfully!");
				setTimeout(function(){ 
				window.location = '<?php echo base_url().'client/patient/view/' ?>'+id;
				}, 1000);
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$.jGrowl("Patient Assessment Has Not Been Updated Successfully!");
				setTimeout(function(){ 
				$('.md-close btn btn-default').click();
				window.location.reload();
				}, 1000);
			}
      });

			  
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
	
	
	$(".edit").click(function(){
			$('.paint_part').show();
			$('.past_image').hide();
		});
		
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
		    //window.location.href="<?php echo base_url()?>client/patient/view/"+id;
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
</script>

</body>
</html>