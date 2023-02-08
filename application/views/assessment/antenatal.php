<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Physio Plus Tech</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/datepicker/css/bootstrap-datetimepicker.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/colorpicker/css/bootstrap-colorpicker.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/colorpalette/bootstrap-colorpalette.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
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
</style></head>
  <body>
<div class="panel panel-primary" style="margin:20px;">
	<div class="panel-heading">
        <center><h3 class="panel-title"><b><?php echo $clientDetails['clinic_name'];?></b></br>
		</br>Contributed by : <b>SRM Medical College Hospital And Research Centre, Chennai.</b> 
		</br></br><b>Antenatal Assessment</b>
		</center></h3>
	</div>
<div class="panel-body">
    <form action="<?php echo base_url().'assessment/add_antenatal' ?>" method="post">
<div class="col-md-12 col-sm-12">
   <!--<div class="form-group col-md-6 col-sm-6">
            <label for="name">ASSESSMENT DATE  *	</label>
                 <input class="datepicker form-control" type="date"  id="assess_date" name="assess_date" required/> 
	</div>-->
	<div class="form-group col-md-6 col-sm-6">
                        <label for="datepicker" class="col-sm-4 control-label">Assessment Date</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control datepicker assess_date" id="assess_date" name="assess_date" data-date-format='DD/MM/YYYY'>
                        </div>
                      </div>
		 <input type="hidden" name="client_id" value="<?php echo $this->session->userdata('client_id'); ?>" id="client_id" />
         <input type="hidden" class="form-control" value="<?php echo $this->uri->segment(3); ?>" name="patient_id" id="patient_id" placeholder="">
    <div style="width:95%; display:none;" class="view" >
						<input type="hidden" name="assess_id" id="assess_id" />
      					<center><a class="btn btn-info edit" style="border-radius: 70px; width:40%; height:35px;  background-color:#088AEC; color:white;" >
					Edit</a><a class="btn btn-info print" style="border-radius: 70px; width:40%; height:35px;  background-color:#088AEC; color:white;" >
					Print</a>
						</center></br></br></div>
						<div class="create">     
	   <div class="form-group col-md-3 col-sm-6">
            <label for="name">NAME  *	</label>
            <input type="text" name="NAME" value="<?php echo $patient['first_name'].''.$patient['last_name']; ?>" class="form-control input-sm" id="name" placeholder="" readonly>
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="name">LMP  </label>
            <input type="text" name="LMP" class="form-control input-sm" id="name" placeholder="">
        </div>
        <div class="form-group col-md-3 col-sm-6">
            <label for="email">AGE  *</label>
            <input type="text" name="AGE" value="<?php echo $patient['age']; ?>" class="form-control input-sm" placeholder="" readonly>
        </div>
       <div class="form-group col-md-3 col-sm-6">
            <label for="name">EDD 	</label>
            <input type="text" class="form-control input-sm" name="EDD" id="EDD" placeholder="">
        </div>
        <div class="form-group col-md-6 col-sm-6">
            <label for="mobile">OCCUPATION  *</label>
            <input type="text" value="<?php echo $patient['occupation']; ?>" name="OCCUPATION" class="form-control input-sm" id="OCCUPATION" readonly>
        </div>

	<div class="form-group col-md-6 col-sm-6">
	      <label for="address">MARITAL STATUS  *  &nbsp;&nbsp;</label>
	<input type="radio" name="MARITAL" parsley-required="true" value="single" id="Club" <?php if($patient['marital_status'] == 'single'){ echo 'checked'; } else { } ?> />
								<label for="Club">SINGLE&nbsp;&nbsp;</label>
							    <input type="radio" name="MARITAL" value="married" id="Country" <?php if($patient['marital_status'] == 'married'){ echo 'checked'; } else { } ?>/>
								<label for="Country">MARRIED&nbsp;&nbsp;</label>
								</div>
	
	 <div class="form-group col-md-3 col-sm-6">
            <label for="city">HEIGHT  </label>
            <input type="text" class="form-control input-sm" id="height"  name="HEIGHT" placeholder="" value="<?php echo $patient['height']; ?>" readonly>
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="city">WEIGHT  </label>
            <input type="text" class="form-control input-sm" id="weight" name="WEIGHT" placeholder="" value="<?php echo $patient['weight']; ?>" readonly>
        </div>
	
	<div class="form-group col-md-6 col-sm-6">
            <label for="state">BMI *</label>
            <input type="text" class="form-control input-sm" name="BMI" id="bmi" placeholder="" value="<?php echo $patient['bmi']; ?>" readonly>
        </div>

	<div class="form-group col-md-6 col-sm-6">
            <label for="country">ADDRESS *</label>
             <textarea class="form-control input-sm" name="ADDRESS" id="address" rows="3" readonly><?php echo $patient['address_line1']; ?></textarea>
	  </div>

	<div class = "form-group col-md-12 col-sm-12">
    <h5><b>CHIEF COMPLAINTS OF THE PATIENT</b></h5>
	</div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">PERIOD OF AMENORRHOEA</label>
            <input type="text" class="form-control input-sm" name="AMENORRHOEA" id="AMENORRHOEA" placeholder="">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">NAUSEA, VOMITTING</label>
            <input type="text" class="form-control input-sm" name="VOMITTING" id="VOMITTING" placeholder="">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">MUSCULOSKELETAL PROBLEMS</label>
            <input type="text" class="form-control input-sm" name="MUSCULOSKELETAL" id="MUSCULOSKELETAL" placeholder="">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">CRAMPS</label>
            <input type="text" class="form-control input-sm" name="CRAMPS" id="pincode" placeholder="">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">FREQUENCY OF MICTURATION </label>
            <input type="text" class="form-control input-sm" name="MICTURATION" id="MICTURATION" placeholder="">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">HEADACHE, EPIGASTRIC PAIN</label>
            <input type="text" class="form-control input-sm" name="HEADACHE" id="HEADACHE" placeholder="">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">SWELLING</label>
            <input type="text" class="form-control input-sm" name="SWELLING" id="SWELLING" placeholder="">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">MALAISE</label>
            <input type="text" class="form-control input-sm" name="MALAISE" id="MALAISE" placeholder="">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode"><b>PRESENT HISTORY</b></label>
            <input type="text" class="form-control input-sm" name="PRESENT" id="PRESENT" placeholder="">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode"><b>GPAL</b> </label>
            <input type="text" class="form-control input-sm" name="GPAL" id="GPAL" placeholder="">
    </div> 
  <div class = "form-group col-md-12 col-sm-12">
    <h5><b>HISTORY OF MUSCULOSKELETAL SYSTEM</b></h5>
  </div>
  <div class = "form-group col-md-12 col-sm-12">
    <h5><b>HISTORY OF GASTROINTESTINAL SYSTEM</b></h5>
  </div>
  <div class="form-group col-md-6 col-sm-6">
            <label for="pincode">LOSS OF APPETITE </label>
            <input type="text" class="form-control input-sm" name="LOSS_APPETITE" id="LOSS_APPETITE" placeholder="">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">LOSS OF WEIGHT </label>
            <input type="text" class="form-control input-sm" name="LOSS_WEIGHT" id="LOSS_WEIGHT" placeholder="">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">HEART BURN </label>
            <input type="text" class="form-control input-sm" name="HEART" id="HEART" placeholder="">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">CONSTIPATION </label>
            <input type="text" class="form-control input-sm" name="CONSTIPATION" id="CONSTIPATION" placeholder="">
    </div>
   <div class = "form-group col-md-12 col-sm-12">
    <h5><b>HISTORY OF GENITOURINARY SYSTEM</b></h5>
   </div>
    <div class="form-group col-md-6 col-sm-6">
            <label for="pincode">INCONTINENCE </label>  
            <input type="text" class="form-control input-sm" name="INCONTINENCE" id="INCONTINENCE" placeholder="">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">PROLAPSE </label>
            <input type="text" class="form-control input-sm" name="PROLAPSE" id="PROLAPSE" placeholder="">
    </div>   
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">POLYURIA </label>
            <input type="text" class="form-control input-sm" name="POLYURIA" id="POLYURIA" placeholder="">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">BURNING MICTURITION </label>
            <input type="text" class="form-control input-sm" name="MICTURITION" id="MICTURITION" placeholder="">
    </div>
   <div class = "form-group col-md-12 col-sm-12">
    <h5><b>HISTORY OF CARDIOVASCULAR / RESPIRATORY STSYEM / PERIHERAL NERVOUS SYSTEM</b></h5>
   </div>
   <div class = "form-group col-md-12 col-sm-12">
    <h5><b>PAST HISTORY/ PAST MEDICAL HISTORY</b></h5>
   </div>
    <div class="form-group col-md-6 col-sm-6">
            <label for="pincode">ANY HISTORY OF T.B </label>
            <input type="text" class="form-control input-sm" name="TB" id="TB" placeholder="">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">SEIZURES </label>
            <input type="text" class="form-control input-sm" name="SEIZURES" id="SEIZURES" placeholder="">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">BLOOD PRESSURE </label>
            <input type="text" class="form-control input-sm" name="BP" id="BP" placeholder="">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">ANAEMIA </label>
            <input type="text" class="form-control input-sm" name="ANAEMIA" id="ANAEMIA" placeholder="">
    </div>
    <div class="form-group col-md-6 col-sm-6">
            <label for="pincode">PREVIOUS HISTORY OF MUSCULOSKELETAL PROBLEMS </label>
            <input type="text" class="form-control input-sm" name="MUSCULOSKELETAL" id="MUSCULOSKELETAL" placeholder="">
    </div>	
    <div class="form-group col-md-6 col-sm-6">
            <label for="pincode">Rh INCOMPATIBILITY </label>
            <input type="text" class="form-control input-sm" name="INCOMPATIBILITY" id="INCOMPATIBILITY" placeholder="">
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
    <h5><b>OBSTERIC HISTORY</b></h5>
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
   <th><input type="text" value="1" class="form-control input-sm" id="pincode" placeholder="">
  </th>
   <th><input type="text" class="form-control input-sm" name="NO_DELIVERIES1" id="NO_DELIVERIES1" placeholder="">
  </th>
   <th><input type="text" class="form-control input-sm" name="MODE_DELIVERY1" id="MODE_DELIVERY1" placeholder="">
  </th>
   <th><input type="text" class="form-control input-sm" name="COMPLICATIONS1" id="COMPLICATIONS1" placeholder="">
  </th>
   <th><input type="text" class="form-control input-sm" name="1ST_LABOUR1" id="1ST_LABOUR1" placeholder="">
  </th>
   <th><input type="text" class="form-control input-sm" name="2ND_LABOUR1" id="2ND_LABOUR1" placeholder="">
  </th>
   <th><input type="text" class="form-control input-sm" name="SEX1" id="SEX1" placeholder="">
  </th>
   <th><input type="text" class="form-control input-sm" name="BABY_WEIGHT1" id="BABY_WEIGHT1" placeholder="">
  </th>
   </tr>
   <tr>
   <th><input type="text" value="2" class="form-control input-sm" id="pincode" placeholder="">
  </th>
   <th><input type="text" class="form-control input-sm" name="NO_DELIVERIES2" id="NO_DELIVERIES2" placeholder="">
  </th>
   <th><input type="text" class="form-control input-sm" name="MODE_DELIVERY2" id="MODE_DELIVERY2" placeholder="">
  </th>
   <th><input type="text" class="form-control input-sm" name="COMPLICATIONS2" id="COMPLICATIONS2" placeholder="">
  </th>
   <th><input type="text" class="form-control input-sm" name="1ST_LABOUR2" id="1ST_LABOUR2" placeholder="">
  </th>
   <th><input type="text" class="form-control input-sm" name="2ND_LABOUR2" id="2ND_LABOUR2" placeholder="">
  </th>
   <th><input type="text" class="form-control input-sm" name="SEX2" id="SEX2" placeholder="">
  </th>
   <th><input type="text" class="form-control input-sm" name="BABY_WEIGHT2" id="BABY_WEIGHT2" placeholder="">
  </th>
   </tr>
   <tr>
   <th><input type="text" value="3" class="form-control input-sm" id="pincode" placeholder="">
  </th>
   <th><input type="text" class="form-control input-sm" name="NO_DELIVERIES3" id="NO_DELIVERIES3" placeholder="">
  </th>
   <th><input type="text" class="form-control input-sm" name="MODE_DELIVERY3" id="MODE_DELIVERY3" placeholder="">
  </th>
   <th><input type="text" class="form-control input-sm" name="COMPLICATIONS3" id="COMPLICATIONS3" placeholder="">
  </th>
   <th><input type="text" class="form-control input-sm" name="1ST_LABOUR3" id="1ST_LABOUR3" placeholder="">
  </th>
   <th><input type="text" class="form-control input-sm" name="2ND_LABOUR3" id="2ND_LABOUR3" placeholder="">
  </th>
   <th><input type="text" class="form-control input-sm" name="SEX3" id="SEX3" placeholder="">
  </th>
   <th><input type="text" class="form-control input-sm" name="BABY_WEIGHT3" id="BABY_WEIGHT3" placeholder="">
  </th>
   </tr>
   <tr>
   <th><input type="text" value="4" class="form-control input-sm" id="pincode" placeholder="">
  </th>
   <th><input type="text" class="form-control input-sm" name="NO_DELIVERIES4" id="NO_DELIVERIES4" placeholder="">
  </th>
   <th><input type="text" class="form-control input-sm" name="MODE_DELIVERY4" id="MODE_DELIVERY4" placeholder="">
  </th>
   <th><input type="text" class="form-control input-sm" name="COMPLICATIONS4" id="COMPLICATIONS4" placeholder="">
  </th>
   <th><input type="text" class="form-control input-sm" name="1ST_LABOUR4" id="1ST_LABOUR4" placeholder="">
  </th>
   <th><input type="text" class="form-control input-sm" name="2ND_LABOUR4" id="2ND_LABOUR4" placeholder="">
  </th>
   <th><input type="text" class="form-control input-sm" name="SEX4" id="SEX4" placeholder="">
  </th>
   <th><input type="text" class="form-control input-sm" name="BABY_WEIGHT4" id="BABY_WEIGHT4" placeholder="">
  </th>
   </tr>
   </table> 
   </div>
    <div class = "form-group col-md-12 col-sm-12">
    <h5><b>MENSTURAL HISTORY</b></h5>
   </div>
   <div class = "form-group col-md-12 col-sm-12">
    <h5><b>MEDICAL  HISTORY</b></h5>
   </div>
   <div class="form-group col-md-6 col-sm-6">
            <label for="pincode">CARDIAC PROBLEMS </label>
            <input type="text" name="CARDIAC" class="form-control input-sm" id="CARDIAC" placeholder="">
    </div>	
    <div class="form-group col-md-6 col-sm-6">
            <label for="pincode">HYPER OR HYPOTHYROIDISM </label>
            <input type="text" name="HYPOTHYROIDISM" class="form-control input-sm" id="HYPOTHYROIDISM" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">AUTO IMMUNE DISORDERS </label>
            <input type="text" class="form-control input-sm" name="IMMUNE" id="IMMUNE" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">BRONCHIAL ASTHMA </label>
            <input type="text" class="form-control input-sm" name="BRONCHIAL" id="BRONCHIAL" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">DRUG HISTORY </label>
            <input type="text" class="form-control input-sm" name="DRUG" id="DRUG" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode"><b>SURGICAL HISTORY</b> </label>
            <input type="text" class="form-control input-sm" name="SURGICAL" id="SURGICAL" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode"><b>FAMILY HISTORY</b></label>
            <input type="text" class="form-control input-sm" name="FAMILY" id="FAMILY" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">TWINS </label>
            <input type="text" class="form-control input-sm" name="TWINS" id="TWINS" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">CONGENITAL DEFECTS </label>
            <input type="text" class="form-control input-sm" name="CONGENITAL" id="CONGENITAL" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">DIABETES MELLITUS </label>
            <input type="text" class="form-control input-sm" name="DIABETES" id="DIABETES" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode"><b>PERSONAL HISTORY</b></label>
            <input type="text" class="form-control input-sm" name="PERSONAL" id="PERSONAL" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">SMOKING, ALCOHOLISM </label>
            <input type="text" class="form-control input-sm" name="SMOKING" id="SMOKING" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">SLEEPING HABITS </label>
            <input type="text" class="form-control input-sm" name="SLEEPING" id="SLEEPING" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode"><b>SOCIAL ECONOMIC HISTORY</b></label>
            <input type="text" class="form-control input-sm" name="ECONOMIC" id="ECONOMIC" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">OCCUPATION </label>
            <input type="text" class="form-control input-sm" name="OCCUPATION1" id="OCCUPATION1" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">FAMILY MEMBERS </label>
            <input type="text" class="form-control input-sm" name="MEMBERS" id="MEMBERS" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">ECONOMIC OUTCOME </label>
            <input type="text" class="form-control input-sm" name="OUTCOME" id="OUTCOME" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">LIFESTYLE </label>
            <input type="text" class="form-control input-sm" name="LIFESTYLE" id="LIFESTYLE" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode"><b>PSYCHOLOGICAL HISTORY</b> </label>
            <input type="text" class="form-control input-sm" name="PSYCHOLOGICAL" id="PSYCHOLOGICAL" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">EMOTIONAL DISTURBANCES </label>
            <input type="text" class="form-control input-sm" name="EMOTIONAL" id="EMOTIONAL" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">ANXIETY/DEPRESSION </label>
            <input type="text" class="form-control input-sm" name="ANXIETY" id="ANXIETY" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="pincode"><b>PAIN HISTORY </b></label>
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">PAIN ONSET </label>
            <input type="text" class="form-control input-sm" name="ONSET" id="ONSET" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">DURATION </label>
            <input type="text" class="form-control input-sm" name="DURATION" id="DURATION" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">TYPE OF PAIN </label>
            <input type="text" class="form-control input-sm" name="TYPE_PAIN" id="TYPE_PAIN" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">LOCATION </label>
            <input type="text" class="form-control input-sm" name="LOCATION" id="LOCATION" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">AGGRAVATING FACTORS </label>
            <input type="text" class="form-control input-sm" name="AGGRAVATING" id="AGGRAVATING" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">RELIEVING FACTORS </label>
            <input type="text" class="form-control input-sm" name="RELIEVING" id="RELIEVING" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">NIGHT PAIN </label>
            <input type="text" class="form-control input-sm" name="NIGHT" id="NIGHT" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">IRRITABILITY LEVEL </label>
            <input type="text" class="form-control input-sm" name="IRRITABILITY" id="IRRITABILITY" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">VAS SCORE </label>
            <input type="text" class="form-control input-sm" name="VAS" id="VAS" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode"><b>ON OBSERVATION</b> </label>
            <input type="text" class="form-control input-sm" name="OBSERVATION" id="OBSERVATION" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">GENERAL CONDITION- ECTOMORPH, ENDOMORPH,MESOMORPH </label>
            <input type="text" class="form-control input-sm" name="GENERAL" id="GENERAL" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">EDEMA </label>
            <input type="text" class="form-control input-sm" name="EDEMA" id="EDEMA" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">TROPHIC CHANGES </label>
            <input type="text" class="form-control input-sm" name="TROPHIC" id="TROPHIC" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">CHOLASMA </label>
            <input type="text" class="form-control input-sm" name="CHOLASMA" id="CHOLASMA" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">LINEA NIGRA </label>
            <input type="text" class="form-control input-sm" name="LINEA" id="LINEA" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">  STRAIE GRAVIDUM </label>
            <input type="text" class="form-control input-sm" name="STRAIE" id="STRAIE" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">NAIL BED </label>
            <input type="text" class="form-control input-sm" name="NAIL" id="NAIL" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">CONJUCTIVA AND TONGUE </label>
            <input type="text" class="form-control input-sm" name="CONJUCTIVA" id="CONJUCTIVA" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">POSTURE </label>
            <input type="text" class="form-control input-sm" name="POSTURE" id="POSTURE" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">     ANTERIOR VIEW </label>
            <input type="text" class="form-control input-sm" name="ANTERIOR" id="ANTERIOR" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">POSTERIOR VIEW </label>
            <input type="text" class="form-control input-sm" name="POSTERIOR" id="POSTERIOR" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">LATERAL VIEW </label>
            <input type="text" class="form-control input-sm" name="LATERAL" id="LATERAL" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">GAIT </label>
            <input type="text" class="form-control input-sm" name="GAIT" id="GAIT" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode"><b>ON PALPATION</b> </label>
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">TENDERNESS </label>
            <input type="text" class="form-control input-sm" name="TENDERNESS" id="TENDERNESS" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">TEMPERATURE VARIATION IN SKIN </label>
            <input type="text" class="form-control input-sm" name="TEMPERATURE" id="TEMPERATURE" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">SWELLING </label>
            <input type="text" class="form-control input-sm" name="SWELLING1" id="SWELLING1" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="pincode"><b>ON EXAMINATION </b></label>
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="pincode">1.	VITAL SIGNS </label>
			<input type="text" class="form-control input-sm" name="VITAL" id="VITAL" placeholder="">
    </div>

	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode"> BP </label>
            <input type="text" class="form-control input-sm" name="BP1" id="BP1" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">PULSE </label>
            <input type="text" class="form-control input-sm" name="PULSE" id="PULSE" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">RESPIRATORY RATE </label>
            <input type="text" class="form-control input-sm" name="RESPIRATORY" id="RESPIRATORY" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="pincode">2.	ABDOMINAL GIRTH </label>
            <input type="text" class="form-control input-sm" name="ABDOMINAL" id="ABDOMINAL" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="pincode">3.	RANGE OF MOTION </label>
            <input type="text" class="form-control input-sm" name="MOTION" id="MOTION" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="pincode">4.	EDEMA ASSESSMENT </label>
            <input type="text" class="form-control input-sm" name="EDEMA1" id="EDEMA1" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">GIRTH </label>
            <input type="text" class="form-control input-sm" name="GIRTH" id="GIRTH" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">VOLUMETRIC </label>
            <input type="text" class="form-control input-sm" name="VOLUMETRIC" id="VOLUMETRIC" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="pincode">5.	MANUAL MUSCLE TESTING </label>
            <input type="text" class="form-control input-sm" name="MANUAL" id="MANUAL" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="pincode">6.	DTR </label>
            <input type="text" class="form-control input-sm" name="DTR" id="DTR" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="pincode"> 7.	DIASTASIS RECTI ASSESSMENT </label>
            <input type="text" class="form-control input-sm" name="DIASTASIS" id="DIASTASIS" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="pincode">8.	BREAST EXAMINATION </label>
            <input type="text" class="form-control input-sm" name="BREAST" id="BREAST" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">SIZE </label>
            <input type="text" class="form-control input-sm" name="SIZE" id="SIZE" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">NIPPLE </label>
            <input type="text" class="form-control input-sm" name="NIPPLE" id="NIPPLE" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">AREOLA </label>
            <input type="text" class="form-control input-sm" name="AREOLA" id="AREOLA" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="pincode">9.	VARICOSE VEIN/DVT </label>
            <input type="text" class="form-control input-sm" name="VARICOSE" id="VARICOSE" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="pincode">10.	INCONTINENCE ASSESSMENT </label>
            <input type="text" class="form-control input-sm" name="INCONTINENCE1" id="INCONTINENCE1" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="pincode">11.	EXERCISE TOLERENCE TESTING </label>
            <input type="text" class="form-control input-sm" name="EXERCISE" id="EXERCISE" placeholder="">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">6 MINUTE WALK TEST </label>
            <input type="text" class="form-control input-sm" name="WALK" id="WALK" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">3 STEP TEST </label>
            <input type="text" class="form-control input-sm" name="STEP" id="STEP" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="pincode">12.	SPECIAL TEST </label>
            <input type="text" class="form-control input-sm" name="SPECIAL" id="SPECIAL" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="pincode">13.	FUNCTIONAL ASSESSMENT </label>
            <input type="text" class="form-control input-sm" name="FUNCTIONAL" id="FUNCTIONAL" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label for="pincode">14.	INVESTIGATIONS /RECORDS : FUNDAL HEIGHT </label>
            <input type="text" class="form-control input-sm" name="INVESTIGATIONS" id="INVESTIGATIONS" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">LIE/PRESENTATION </label>
            <input type="text" class="form-control input-sm" name="LIE" id="LIE" placeholder="">
    </div>
    <div class="col-md-12 col-sm-12">
		<div class="form-group col-md-3 col-sm-3 pull-right" >
				<input type="submit" class="btn btn-primary" value="Submit" id="save"/>
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
		/* $(".edit").click(function(){
			var val = $('#assess_id').val();
			var val1 = $('#patient_id').val();
			window.location= "<?php echo base_url().'assessment/edit_antenatal/' ?>"+val1+'/'+val;
		});
		$(".print").click(function(){
			var val = $('#assess_id').val();
			var val1 = $('#patient_id').val();
			window.location= "<?php echo base_url().'assessment/print_antental_assessment/' ?>"+val1+'/'+val;
		});
		$("#assess_date").change(function(){
			var val = $("#assess_date").val();
			var patient_id = $("#patient_id").val();
			var url= '<?php echo base_url().'assessment/antenatal_assessment_info' ?>';
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
					error: function(e){ 
						alert(e.responseText);
					} 
				 }); 
		}); */
		 
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

		$(document).on('keyup', '#weight', function(){  
		    var weight =  $(this).val();
			var height = $('#height').val();
			if(weight > 0 && height > 0){	
			
			var finalBmi = Number(weight/(height/100*height/100)).toFixed(2);
			document.getElementById('bmi').value = finalBmi
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
		});
	});
	
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