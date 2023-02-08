<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Physio Plus Tech</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="icon" type="image/ico" href="<?php echo base_url() ?>assets/images/favicon.ico" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/jgrowl/css/jquery.jgrowl.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/datepicker/css/bootstrap-datetimepicker.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/colorpicker/css/bootstrap-colorpicker.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/colorpalette/bootstrap-colorpalette.css">
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
		</br></br><b>Sports Assessment</b>
		</center></h3>
	</div>
<div class="panel-body">
     <form action="<?php echo base_url().'assessment/add_assessment' ?>" method="post">
<div class="col-md-12 col-sm-12">
   <!-- <div class="form-group col-md-6 col-sm-6">
            <label >ASSESSMENT DATE  *	</label>
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
		<div class="form-group col-md-12 col-sm-12">
        <p style="color:#63C0EE;">I. PATIENT DETAILS</p> 
		</div><div class="form-group col-md-6 col-sm-6">
            <label >Name  *	</label>
            <input type="text" name="name" value="<?php echo $patient['first_name'].' '.$patient['last_name']; ?>" class="form-control input-sm" id="name" readonly>
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Date of Birth  *	</label>
            <input type="text" name="dob" class="form-control input-sm" id="name" readonly value="<?php echo $patient['dob']; ?>">
        </div>
        <div class="form-group col-md-6 col-sm-6">
            <label for="email">Gender  *</label>
            <input type="text" name="gender" value="<?php echo $patient['age']; ?>" class="form-control input-sm" readonly>
        </div>
		<div class="form-group col-md-6 col-sm-12">
            <label for="country">Address *</label>
             <textarea class="form-control input-sm" name="address" id="address" rows="3" readonly><?php echo $patient['address_line1']; ?></textarea>
	  </div>
	  <div class="form-group col-md-6 col-sm-6">
            <label for="mobile">Occupation  *</label>
            <input type="text" value="<?php echo $patient['occupation']; ?>" name="Occupation" class="form-control input-sm" id="OCCUPATION" readonly>
        </div>
       <div class="form-group col-md-6 col-sm-6">
            <label >Sport  	</label>
            <input type="text" class="form-control input-sm" name="sport" id="sport" placeholder="">
        </div>
        

	<div class="form-group col-md-6 col-sm-6">
	      <label for="address">Standard  &nbsp;&nbsp;</label>
	      </br><input type="radio" name="standard" parsley-required="true" value="Club" id="Club"  />
		  <label for="Club">Club&nbsp;&nbsp;</label>
		  <input type="radio" name="standard" parsley-required="true" value="Country" id="Country" />
		  <label for="Country">Country&nbsp;&nbsp;</label>
		  <input type="radio" name="standard" parsley-required="true" value="International" id="International" />
		  <label for="International">International&nbsp;&nbsp;</label>
		  <input type="radio" name="standard" parsley-required="true" value="Others" id="Others" />
		  <label for="Others">Others&nbsp;&nbsp;</label>
	</div>
	<div class="form-group col-md-12 col-sm-12">
      <p style="color:#63C0EE;">II.	TRAINING DETAILS</p>
	</div> <div class="form-group col-md-6 col-sm-6">
            <label for="city">1)	Aerobic :  </label>
            <input type="text" class="form-control input-sm" id="Aerobic"  name="Aerobic" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="city">2)	Anaerobic :  </label>
            <input type="text" class="form-control input-sm" id="Anaerobic" name="Anaerobic" placeholder="">
        </div>
	
	<div class="form-group col-md-6 col-sm-6">
            <label for="state">3)	Traditional Pattern of training :</label>
            <input type="text" class="form-control input-sm" name="Trainig" id="Trainig" placeholder="">
        </div>
     <div class="form-group col-md-6 col-sm-6">
            <label >4)	Winter : </label>
            <input type="text" class="form-control input-sm" name="Winter" id="Winter" placeholder="">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label >5)	Summer : </label>
            <input type="text" class="form-control input-sm" name="Summer" id="Summer" placeholder="">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label >6)	Details of warm up/ Cool down activity :</label>
            <input type="text" class="form-control input-sm" name="warm" id="warm" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
     <p style="color:#63C0EE;">III.	MEDICAL HISTORY</p> 	
	</div>
	<div class="form-group col-md-6 col-sm-6">
            <label >1)	Past Medical History :</label>
            <input type="text" class="form-control input-sm" name="past_his" id="past_his" placeholder="">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label >2)	Social – Drug History : </label>
            <input type="text" class="form-control input-sm" name="drug_his" id="drug_his" placeholder="">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label >3)	Smoker : </label>
             <p class="col s4">
				<input type="radio" name="Smoker"  value="yes" id="rb7"  />
				<label for="rb7">Yes</label>
			 </p>
			 <p class="col s4">
				<input type="radio" name="Smoker"  value="no" id="rb8" />
				<label for="rb8">No</label>
			 </p> 
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label >4)	Alcohol : </label>
             <p class="col s4">
				 <input type="radio" name="Alcohol" value="yes" id="rb71"  />
				 <label for="rb71">Yes</label>
			 <input type="text" placeholder="If yes how much" name="alcohol_rate" id="alcohol_rate" class="form-control"  ></p>
			 <p class="col s4">
				 <input type="radio" name="Alcohol"  value="no" id="rb81" />
				 <label for="rb81">No</label>
			 </p>
			 
					
	</div> 
	<div class="form-group col-md-12 col-sm-12">
      <p style="color:#63C0EE;">IV.	DIET HISTORY</p>
	</div><div class="form-group col-md-12 col-sm-6">
            <textarea  rows="4" name="diet_notes" id="diet_notes" class="form-control" style="width:95%;" ></textarea>
   </div>
   <div class="form-group col-md-12 col-sm-12">
      <p style="color:#63C0EE;">V.	IMMUNISATION RECORD</p> 
	</div><div class="form-group col-md-12 col-sm-6">
            <textarea  rows="4" name="immunistaion" id="immunistaion" class="form-control" style="width:95%;" ></textarea>
	</div>
	<div class="form-group col-md-12 col-sm-12">
      <p style="color:#63C0EE;">VI.	PERSONAL HISTORY</p> 	
	</div><div class="form-group col-md-6 col-sm-6">
            <label ><b>1)	Type  of shoes :</b> </label>
            <input type="text" class="form-control input-sm" name="type_shoes" id="type_shoes" placeholder="">
    </div> 
 
  <div class="form-group col-md-6 col-sm-6">
            <label >2)	Protective aids : </label>
            <input type="text" class="form-control input-sm" name="protective" id="protective" placeholder="">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label >3)	Nature of ground : </label>
            <input type="text" class="form-control input-sm" name="nature" id="nature" placeholder="">
    </div> 
	<div class="form-group col-md-12 col-sm-12">
      <p style="color:#63C0EE;">VII.	CURRENT INJURY</p> 	
	</div>				
	<div class="form-group col-md-6 col-sm-6">
            <label >1)	Date of Injury </label></br>
            <input class="datepicker form-control pck-primary pck-dark" type="text" id="t_date" name="t_date" data-date-format='DD/MM/YYYY'>    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label >Acute / Chronic : </label>
            <input type="text" class="form-control input-sm" name="Acute" id="Acute" placeholder="">
    </div>
   <div class="form-group col-md-6 col-sm-6">
            <label >2)	Previous Sports related injuries </label>
           </br><input type="radio" name="s_injury" parsley-required="true" value="yes" id="s_injury"  />
		    <label for="s_injury">Yes&nbsp;&nbsp;</label>
		   <input type="radio" name="s_injury" parsley-required="true" value="no" id="s_injury1" />
		   <label for="s_injury1">No&nbsp;&nbsp;</label>
	</div>
    <div class="form-group col-md-6 col-sm-6">
            <label >If yes details </label>  
            <input type="text" class="form-control input-sm" name="s_details" id="s_details" placeholder="">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label >Time lost from training  </label>
          </br><input type="radio" name="time" parsley-required="true" value="Hours" id="Hours"  />
		   <label for="Hours">Hours &nbsp;&nbsp;</label>
		   <input type="radio" name="time" parsley-required="true" value="Days" id="Days" />
		   <label for="Days">Days &nbsp;&nbsp;</label>
	      <input type="radio" name="time" parsley-required="true" value="Week" id="Week" />
		   <label for="Week">Week&nbsp;&nbsp;</label>
    </div> 
    <div class="form-group col-md-12 col-sm-12">
        <p style="color:#63C0EE;">VIII.  MECHANISM OF INJURY</p> 		</p>
	</div>					
	<div class="form-group col-md-12 col-sm-6">
            <textarea  rows="4" name="mechanism" id="mechanism" class="form-control" style="width:95%;" ></textarea>
	</div> 
	<div class="form-group col-md-12 col-sm-12">
        <p style="color:#63C0EE;">IX  PAIN ASSESMENT</p>
	</div>				
	<div class="form-group col-md-6 col-sm-6">
            <label >Onset </label>
            <input type="text" class="form-control input-sm" name="pain_onset" id="pain_onset" placeholder="">
    </div>
   
    <div class="form-group col-md-6 col-sm-6">
            <label >Duration </label>
            <input type="text" class="form-control input-sm" name="duration" id="duration" placeholder="">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label >Side / Site </label>
            <input type="text" class="form-control input-sm" name="pain_site" id="pain_site" placeholder="">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label >Type of pain </label>
            <input type="text" class="form-control input-sm" name="pain_type" id="pain_type" placeholder="">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label >Nature of pain </label>
            <input type="text" class="form-control input-sm" name="pain_nature" id="pain_nature" placeholder="">
    </div>
    <div class="form-group col-md-6 col-sm-6">
            <label >Aggravating factors </label>
            <input type="text" class="form-control input-sm" name="aggravating_factors" id="aggravating_factors" placeholder="">
    </div>	
    <div class="form-group col-md-6 col-sm-6">
            <label >Relieving factors </label>
            <input type="text" class="form-control input-sm" name="releaving_factors" id="releaving_factors" placeholder="">
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label >24 hr pattern </label>
            <input type="text" class="form-control input-sm" name="pattern" id="pattern" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label >VAS </label>
            <input type="text" class="form-control input-sm" name="vas" id="vas" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
        </br> <p style="color:#63C0EE;">X. CLINICAL EXAMINATION</p> 
	    </br><p style="color:black;">On observation </p>
	   </br> <small style="color:black;"> General:</small>
	</div><div class="form-group col-md-6 col-sm-6">
            <label >Built  </label>
            <input type="text" class="form-control input-sm" name="Built" id="Built" placeholder="">
    </div>
    <div class="form-group col-md-6 col-sm-6">
            <label >Posture  </label>
            <input type="text" class="form-control input-sm" name="Posture" id="Posture" placeholder="">
    </div>
    <div class="form-group col-md-6 col-sm-6">
            <label >Gait  </label>
            <input type="text" class="form-control input-sm" name="Gait" id="Gait" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
       <small style="color:black;">Local:</small>
    </div><div class="form-group col-md-6 col-sm-6">
            <label >Colour:  </label>
            <input type="text" class="form-control input-sm" name="Colour" id="Colour" placeholder="">
    </div>
    <div class="form-group col-md-6 col-sm-6">
            <label >Swelling  </label>
            <input type="text" class="form-control input-sm" name="Swelling" id="Swelling" placeholder="">
    </div>
    <div class="form-group col-md-6 col-sm-6">
            <label >Muscle Wasting  </label>
            <input type="text" class="form-control input-sm" name="Wasting" id="Wasting" placeholder="">
    </div>
    <div class="form-group col-md-6 col-sm-6">
            <label >Deformity  </label>
            <input type="text" class="form-control input-sm" name="Deformity" id="Deformity" placeholder="">
    </div>
    <div class="form-group col-md-6 col-sm-6">
            <label >External appliance  </label>
            <input type="text" class="form-control input-sm" name="appliance" id="appliance" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
        <p style="color:black;"><b> On Palpation:</b></p> 
	</div><div class="form-group col-md-6 col-sm-6">
            <label >Skin  </label>
            <input type="text" class="form-control input-sm" name="Skin" id="Skin" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label >Fascia  </label>
            <input type="text" class="form-control input-sm" name="Fascia" id="Fascia" placeholder="">
    </div><div class="form-group col-md-6 col-sm-6">
            <label >Muscle bulk  </label>
            <input type="text" class="form-control input-sm" name="bulk" id="bulk" placeholder="">
    </div><div class="form-group col-md-6 col-sm-6">
            <label >Bony contour  </label>
            <input type="text" class="form-control input-sm" name="contour" id="contour" placeholder="">
    </div><div class="form-group col-md-6 col-sm-6">
            <label >Temperature  </label>
            <input type="text" class="form-control input-sm" name="Temperature" id="Temperature" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
        <p style="color:black;"><b> On Examination:</b></p>
    </div><div class="form-group col-md-6 col-sm-6">
            <label >AAROM  </label>
            <input type="text" class="form-control input-sm" name="Arom" id="Arom" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label >PROM  </label>
            <input type="text" class="form-control input-sm" name="PROM" id="PROM" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label >ACCESSORY MOVEMENTS  </label>
            <input type="text" class="form-control input-sm" name="a_movements" id="a_movements" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label >MUSCLE POWER  </label>
            <input type="text" class="form-control input-sm" name="m_power" id="m_power" placeholder="">
    </div>          <div class="form-group col-md-12 col-sm-12">
						<b>MUSCLE GIRTH</b>
	                   </div>
					  
               <div class="form-group col-md-12 col-sm-12">
						<p style="color:#63C0EE;">&nbsp;</p> 
					</div><table style="width:100%;" border="1">
						<tr><td colspan="2"><center>&nbsp;&nbsp;&nbsp;<b>MUSCLE GIRTH </b> </td><td><center><b>Right</b></center></td><td><center><b>Left</b></center></br></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp; Upper limb</td><td><div class="input-field"><input type="text" name="Upper_left" id="Upper_left" class="box-input" style="width:100%;" /></div></td><td><div class="input-field"><input type="text" name="Upper_right" id="Upper_right" class="box-input" style="width:100%;" /></div></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;Lower limb</td><td><div class="input-field"><input type="text" name="lower_left" id="lower_left" class="box-input" style="width:100%;" /></div></td><td><div class="input-field"><input type="text" name="lower_right" id="lower_right" class="box-input" style="width:100%;" /></div></td></tr>
						<tr><td colspan="4"><center>&nbsp;&nbsp;&nbsp;<b>Limb length </b></center></td></tr>
						<tr><td colspan="3">&nbsp;&nbsp;&nbsp;Apparent</td><td><div class="input-field"><input type="text" name="Apparent" id="Apparent" class="box-input" style="width:100%;" /></div></td></tr>
						<tr><td colspan="3">&nbsp;&nbsp;&nbsp;True</td><td><div class="input-field"><input type="text" name="true" id="true" class="box-input" style="width:100%;" /></div></td></tr>
						
					</table>
					
					
					 <div class="form-group col-md-12 col-sm-12">
						<p style="color:#63C0EE;">&nbsp;</p> 
					</div><table style="width:100%;" border="1">
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp; <b>SENSORY EVALUATION</b> </td><td><center><b>Right</b></center></td><td><center><b>Left</b></center></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Upper limb &nbsp;&nbsp;&nbsp;</td><td><center><b>C1  - </b></center></td><td><div class="input-field"><input type="text" name="c1_left" id="c1_left" class="box-input" style="width:100%;" /></div></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><center><b>C2  - </b></center></td><td><div class="input-field"><input type="text" name="c2_left" id="c2_left" class="box-input" style="width:100%;" /></div></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><center><b>C3  - </b></center></td><td><div class="input-field"><input type="text" name="c3_left" id="c3_left" class="box-input" style="width:100%;" /></div></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><center><b>C4  - </b></center></td><td><div class="input-field"><input type="text" name="c4_left" id="c4_left" class="box-input" style="width:100%;" /></div></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><center><b>C5  - </b></center></td><td><div class="input-field"><input type="text" name="c5_left" id="c5_left" class="box-input" style="width:100%;" /></div></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><center><b>C6  - </b></center></td><td><div class="input-field"><input type="text" name="c6_left" id="c6_left" class="box-input" style="width:100%;" /></div></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><center><b>C7  - </b></center></td><td><div class="input-field"><input type="text" name="c7_left" id="c7_left" class="box-input" style="width:100%;" /></div></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><center><b>C8  - </b></center></td><td><div class="input-field"><input type="text" name="c8_left" id="c8_left" class="box-input" style="width:100%;" /></div></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><center><b>T1  - </b></center></td><td><div class="input-field"><input type="text" name="t1_left" id="t1_left" class="box-input" style="width:100%;" /></div></td></tr>
					    <tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lower limb	 </td><td><center><b>L1  - </b></center></td><td><div class="input-field"><input type="text" name="l1_left" id="l1_left" class="box-input" style="width:100%;" /></div></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><center><b>L2  - </b></center></td><td><div class="input-field"><input type="text" name="l2_left" id="l2_left" class="box-input" style="width:100%;" /></div></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><center><b>L3  - </b></center></td><td><div class="input-field"><input type="text" name="l3_left" id="l3_left" class="box-input" style="width:100%;" /></div></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><center><b>L4  - </b></center></td><td><div class="input-field"><input type="text" name="l4_left" id="l4_left" class="box-input" style="width:100%;" /></div></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><center><b>L5  - </b></center></td><td><div class="input-field"><input type="text" name="l5_left" id="l5_left" class="box-input" style="width:100%;" /></div></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Trunk	 </td><td><center><b>S1  - </b></center></td><td><div class="input-field"><input type="text" name="s1_left" id="s1_left" class="box-input" style="width:100%;" /></div></td></tr>
					
					</table>
					
				
					 					
                    <div class="form-group col-md-12 col-sm-12">
						<p style="color:#63C0EE;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </p> 
					</div><table style="width:100%;" border="1">
						<tr><td colspan="2"><center>&nbsp;&nbsp;&nbsp;<b>REFLEX </b> </td><td><center><b>Right</b></center></td><td><center><b>Left</b></center></br></td></tr>
						<tr><td colspan="4"><center><small>Upper Limb :</small></center></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp; Biceps</td><td><div class="input-field"><input type="text" name="reflex_bi_right" id="reflex_bi_right" class="box-input" style="width:100%;" /></div></td><td><div class="input-field"><input type="text" name="reflex_bi_left" id="reflex_bi_left" class="box-input" style="width:100%;" /></div></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;Brachioradialis</td><td><div class="input-field"><input type="text" name="reflex_b_right" id="reflex_b_right" class="box-input" style="width:100%;" /></div></td><td><div class="input-field"><input type="text" name="reflex_b_left" id="reflex_b_left" class="box-input" style="width:100%;" /></div></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;Triceps</td><td><div class="input-field"><input type="text" name="reflex_t_right" id="reflex_t_right" class="box-input" style="width:100%;" /></div></td><td><div class="input-field"><input type="text" name="reflex_t_left" id="reflex_t_left" class="box-input" style="width:100%;" /></div></td></tr>
						<tr><td colspan="4"><center><small>Lower Limb :</small></center></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp; Knee</td><td><div class="input-field"><input type="text" name="knee_right" id="knee_right" class="box-input" style="width:100%;" /></div></td><td><div class="input-field"><input type="text" name="knee_left" id="knee_left" class="box-input" style="width:100%;" /></div></td></tr>
						<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;Ankle</td><td><div class="input-field"><input type="text" name="ankle_right" id="ankle_right" class="box-input" style="width:100%;" /></div></td><td><div class="input-field"><input type="text" name="ankle_left" id="ankle_left" class="box-input" style="width:100%;" /></div></td></tr>
	</table>
    </br>	
	<div class="form-group col-md-6 col-sm-6">
            <label >BIO – MECHANICAL EVALUATION  </label>
            <textarea  rows="4"  name="bio" id="bio" class="form-control" style="width:95%;" ></textarea>
	</div>
	<div class="form-group col-md-6 col-sm-6">
            <label >SPECIAL TEST:  </label>
           <textarea  rows="4"  name="special" id="special" class="form-control" style="width:95%;" ></textarea>
    </div> 
	<div class="form-group col-md-6 col-sm-6">
            <label >INVESTIGATIONS :  </label>
           <textarea  rows="4"  name="investigation" id="investigation" class="form-control" style="width:95%;" ></textarea>
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label >DIFFERENTIAL DIAGNOSIS :  </label>
           <textarea  rows="4"  name="diagnosis" id="diagnosis" class="form-control" style="width:95%;" ></textarea>
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label >FUNCTIONAL ASSESSMENT :  </label>
           <textarea  rows="4"  name="functional" id="functional" class="form-control" style="width:95%;" ></textarea>
    </div>
	<div class="form-group col-md-12 col-sm-6">
       <p style="color:#63C0EE;">XI. CLINICAL IMPRESSION </p> 
	</div>
	<div class="form-group col-md-12 col-sm-6">
           <textarea  rows="4"  name="impression" id="impression" class="form-control" style="width:95%;" ></textarea>
	</div> 
    <div class="form-group col-md-12 col-sm-12">
        <p style="color:#63C0EE;font-weight:bold;"> XII. PHYSIOTHERAPY MANAGEMENT	 </p> 
	</div>
	<!--<div class="form-group col-md-12 col-sm-6">
           <textarea  rows="4"  name="physio_manage" id="physio_manage" class="form-control" style="width:95%;" ></textarea>
	</div>-->
    <div class="form-group col-md-6 col-sm-6">
            <label >Problem list :  </label>
           <textarea  rows="4"  name="pbm_list" id="pbm_list" class="form-control" style="width:95%;" ></textarea>
    </div>
	<div class="form-group col-md-12 col-sm-12">
    
    <p style="color:black;"> <b> Aims </b> </p> 
	</div><div class="form-group col-md-6 col-sm-6">
            <label >Short term  </label>
            <input type="text" class="form-control input-sm" name="short_term" id="short_term" placeholder="">
    </div>
    <div class="form-group col-md-6 col-sm-6">
            <label >Long term & sports specific workouts  </label>
            <input type="text" class="form-control input-sm" name="long_term" id="long_term" placeholder="">
    </div>
     <div class="form-group col-md-6 col-sm-6">
            <label >Means  </label>
            <input type="text" class="form-control input-sm" name="Means" id="Means" placeholder="">
    </div>
    <div class="form-group col-md-6 col-sm-6">
            <label >Home programme  </label>
            <input type="text" class="form-control input-sm" name="home_program" id="home_program" placeholder="">
    </div>	
	<div class="form-group col-md-6 col-sm-6">
            <label >Follow up  </label>
            <input type="text" class="form-control input-sm" name="follow" id="follow" placeholder="">
    </div>
	<div class="form-group col-md-6 col-sm-6">
            <label >Criteria for return to Sports (ROM and Muscle strength Chart to be added)  </label>
            <input type="text" class="form-control input-sm" name="criteria" id="criteria" placeholder="">
    </div>
   <div class="col-md-12 col-sm-12">
		<div class="form-group col-md-3 col-sm-3 pull-right" >
				<input type="submit" class="btn btn-primary" value="Submit" id="save"/>
		</div>
	</div></div>
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
		
		$('#alcohol_rate').hide();
		$("input[type='radio']").click(function(){
            var radioValue = $("input[name='Alcohol']:checked").val();
            if(radioValue == 'yes'){
                $('#alcohol_rate').show();
            }
			else{
                $('#alcohol_rate').hide();
            }
        });
		$(".edit").click(function(){
			var val = $('#assess_id').val();
			var val1 = $('#patient_id').val();
			window.location= "<?php echo base_url().'assessment/edit_assessment/' ?>"+val1+'/'+val;
		});
		$(".print").click(function(){
			var val = $('#assess_id').val();
			var val1 = $('#patient_id').val();
			window.location= "<?php echo base_url().'assessment/print_assessment/' ?>"+val1+'/'+val;
		});
		$("#assess_date").change(function(){
			var val = $("#assess_date").val();
			var patient_id = $("#patient_id").val();
			var url= '<?php echo base_url().'assessment/assessment_info' ?>';
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
		});
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