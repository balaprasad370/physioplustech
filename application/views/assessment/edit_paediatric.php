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
		</br></br><b>Paediatric Physiotherapy Assessment</b>
		</center></h3>
	</div>
<div class="panel-body">
    <form action="<?php echo base_url().'assessment/update_paediatric' ?>" method="post">
<div class="col-md-12 col-sm-12">
   <!--<div class="form-group col-md-6 col-sm-6">
            <label >ASSESSMENT DATE  *	</label>
                 <input class="datepicker form-control" type="date" value="<?php echo date('Y-m-d',strtotime($assess['assess_date'])); ?>" id="assess_date" name="assess_date"/> 
	</div>-->
	<div class="form-group col-md-6 col-sm-6">
                        <label for="datepicker" class="col-sm-4 control-label">Assessment Date</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control datepicker assess_date" id="assess_date" name="assess_date" data-date-format='DD/MM/YYYY' value="<?php echo date('d-m-Y',strtotime($assess['assess_date']));?>">
                        </div>
                      </div>
		 <input type="hidden" class="form-control" value="<?php echo $this->uri->segment(3); ?>" name="patient_id" id="patient_id" placeholder="">
    <div style="width:95%; display:none;" class="view" >
						<input type="hidden" name="paediatric_id" value="<?php echo $this->uri->segment(4); ?>" id="paediatric_id" />
      					<center><a class="btn btn-info edit" style="border-radius: 70px; width:40%; height:35px;  background-color:#088AEC; color:white;" >
					Edit</a><a class="btn btn-info print" style="border-radius: 70px; width:40%; height:35px;  background-color:#088AEC; color:white;" >
					Print</a>
						</center></br></br></div>
	<div class="create">
		<div class="form-group col-md-6 col-sm-6">
            <label >Name  *	</label>
            <input type="text" name="name" value="<?php echo $patient['first_name'].' '.$patient['last_name']; ?>" readonly class="form-control input-sm" id="name" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >Date of Birth  *	</label>
            <input type="text" name="dob" class="form-control input-sm" value="<?php echo $patient['dob']; ?>" readonly id="dob" placeholder="">
        </div>
        <div class="form-group col-md-6 col-sm-6">
            <label >BIRTH WEIGHT </label>
            <input type="text" name="b_weight" value="<?php echo $assess['b_weight']; ?>" class="form-control input-sm" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >HEAD CIRCUMFERENCE: </label>
            <input type="text" name="circumference" value="<?php echo $assess['circumference']; ?>" class="form-control input-sm" placeholder="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label >AGE / SEX </label>
            <input type="text" name="age" value="<?php echo $patient['age']; ?>" class="form-control input-sm" readonly>
        </div>
		<div class="form-group col-md-12 col-sm-12">
            <label for="country">Address *</label>
             <textarea class="form-control input-sm" name="address" id="address" rows="3" readonly><?php echo $patient['address_line1']; ?></textarea>
	  </div>
	  <div class="form-group col-md-3 col-sm-6">
            <label for="5">Patient Code</label>
            <input type="text" class="form-control input-sm" id="5" value="<?php echo $patient['patient_code'];?>" readonly autocomplete="off">
        </div>
	  <!--<div class="form-group col-md-6 col-sm-6">
            <label for="mobile">UHID NO</label>
            <input type="text"  name="uhid" value="<?php echo $assess['uhid']; ?>" class="form-control input-sm" id="uhid" placeholder="">
        </div>-->
       <div class="form-group col-md-3 col-sm-6">
            <label >OP/IP NO	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['op']; ?>" name="op" id="op" placeholder="">
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label >CHIEF COMPLAINTS	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['complaints']; ?>" name="complaints" id="complaints" placeholder="">
        </div>
        <div class="form-group col-md-12 col-sm-12">
        <p style="color:#63C0EE;">HISTORY</p>
		</div>
        <div class="form-group col-md-3 col-sm-6">
            <label >PRENATAL	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['prenatal']; ?>" name="prenatal" id="prenatal" placeholder="">
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label >NATAL	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['natal']; ?>" name="natal" id="natal" placeholder="">
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label >POSTNATAL	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['postnatal']; ?>" name="postnatal" id="postnatal" placeholder="">
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label >FAMILY HISTORY	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['family']; ?>" name="family" id="family" placeholder="">
        </div>
		<div class="form-group col-md-12 col-sm-12">
        <p style="color:#63C0EE;">OBSERVATION</p>
		</div>
		<div class="form-group col-md-3 col-sm-6">
            <label >SUPINE	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['supine']; ?>" name="supine" id="supine" placeholder="">
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label >PRONE	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['stone']; ?>" name="stone" id="stone" placeholder="">
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label >SITTING	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['sitting']; ?>" name="sitting" id="sitting" placeholder="">
        </div>
	   <div class="form-group col-md-12 col-sm-12">
        <p style="color:#63C0EE;">MILESTONES</p>
		</div>
		<div class="form-group col-md-3 col-sm-6">
            <label >1. Social Smile	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['milestone']; ?>" name="milestone" id="milestone" placeholder="">
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label >2.	Follow with eyes	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['follow']; ?>" name="follow" id="follow" placeholder="">
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label >3.	Head holding	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['head_holding']; ?>" name="head_holding" id="head_holding" placeholder="">
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label >4.	Rolling over	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['rolling_over']; ?>" name="rolling_over" id="rolling_over" placeholder="">
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label >5.	Sitting(with support)	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['sitwith']; ?>" name="sitwith" id="sitwith" placeholder="">
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label >6.	Sitting(without support)	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['sittingwith']; ?>" name="sittingwith" id="sittingwith" placeholder="">
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label >7.	Crawling 	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['crawing']; ?>" name="crawing" id="crawing" placeholder="">
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label >8.	Standing</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['stand']; ?>" name="stand" id="stand" placeholder="">
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label >9.	Walking(with support)	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['walkwith']; ?>" name="walkwith" id="walkwith" placeholder="">
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label >10.	Walking(without support)	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['walkwithout']; ?>" name="walkwithout" id="walkwithout" placeholder="">
        </div>
		 <div class="form-group col-md-12 col-sm-12">
        <p style="color:#63C0EE;">REFLEX EVALUATION:</p>
        <p style="color:black;">NEONATAL REFLEXES</p>
		</div>
		<div class="form-group col-md-3 col-sm-6">
            <label >1.	Sucking	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['suck']; ?>" name="suck" id="suck" placeholder="">
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label >2.	Rooting	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['root']; ?>" name="root" id="root" placeholder="">
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label >3.	Swallowing	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['swallowing']; ?>" name="swallowing" id="swallowing" placeholder="">
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label >4.	Upper limb placing	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['u_limb']; ?>" name="u_limb" id="u_limb" placeholder="">
        </div>
		<div class="form-group col-md-12 col-sm-12">
        <p style="color:#63C0EE;"><a href="<?php echo base_url().'assessment/edit_paediatricGMFM/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.date('Y-m-d',strtotime($assess['assess_date'])); ?>" target="_blank">MILESTONE ASSESSMENT ( See chart attached GMFM Score sheet)</a></p>
        <p style="color:black;">DEVELOPMENTAL REFLEXES:</p>
        <p style="color:black;">PRIMITIVE REFLEXES:</p>
		</div>
		 <div class = "form-group col-md-12 col-sm-12" style="overflow-x:auto;">
		 <table style="width:100%;"  border="1"  >
		    <tr>
			<th>REFLEX</th>
			<th>NORMAL UNTIL</th>
			<th>PRESENT</th>
			<th>INTEGRATED</th>
			</tr>
			<tr>
			<td>SUCKING</td>
			<td>3 MONTHS</td>
			<td><input type="text" value="<?php echo $assess['sucking1']; ?>" name="sucking1" id="sucking1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['sucking2']; ?>" name="sucking2" id="sucking2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
			<tr>
			<td>ROOTING</td>
			<td>3 MONTHS</td>
			<td><input type="text" value="<?php echo $assess['rooting1']; ?>" name="rooting1" id="rooting1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['rooting2']; ?>" name="rooting2" id="rooting2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
			<tr>
			<td>GRASP</td>
			<td>3 MONTHS</td>
			<td><input type="text" value="<?php echo $assess['grasp1']; ?>" name="grasp1" id="grasp1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['grasp2']; ?>" name="grasp2" id="grasp2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
			<tr>
			<td>FOOT GRASP</td>
			<td>9 MONTHS</td>
			<td><input type="text" value="<?php echo $assess['foot1']; ?>" name="foot1" id="foot1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['foot2']; ?>" name="foot2" id="foot2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
			<tr>
			<td>PLACING</td>
			<td>REMAINS</td>
			<td><input type="text" value="<?php echo $assess['remains1']; ?>" name="remains1" id="remains1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['remains2']; ?>" name="remains2" id="remains2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
			<tr>
			<td>STARTLE</td>
			<td>STARTLE</td>
			<td><input type="text" value="<?php echo $assess['startle1']; ?>" name="startle1" id="startle1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['startle2']; ?>" name="startle2" id="startle2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
			<tr>
			<td>HAMD OPENING</td>
			<td>1 MONTHS</td>
			<td><input type="text" value="<?php echo $assess['hamd1']; ?>" name="hamd1" id="hamd1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['hamd2']; ?>" name="hamd2" id="hamd2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
	</table></div></br>
	<div class="form-group col-md-12 col-sm-12">
        <p style="color:black;">SPINAL REFLEXES:</p>
	</div>
	 <div class = "form-group col-md-12 col-sm-12" style="overflow-x:auto;">
	<table style="width:100%;"  border="1"  >
		    <tr>
			<th>REFLEX</th>
			<th>NORMAL UNTIL</th>
			<th>PRESENT</th>
			<th>INTEGRATED</th>
			</tr>
			<tr>
			<td>FLEXOR WITHDRAWAL</td>
			<td>2 MONTHS</td>
			<td><input type="text" value="<?php echo $assess['flexor1']; ?>" name="flexor1" id="flexor1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['flexor2']; ?>" name="flexor2" id="flexor2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
			<tr>
			<td>EXTENSOR THRUST</td>
			<td>2 MONTHS</td>
			<td><input type="text" value="<?php echo $assess['extensor1']; ?>" name="extensor1" id="extensor1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['extensor2']; ?>" name="extensor2" id="extensor2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
			<tr>
			<td>CROSSED EXTENSION</td>
			<td>2 MONTHS</td>
			<td><input type="text" value="<?php echo $assess['cross1']; ?>" name="cross1" id="cross1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['cross2']; ?>" name="cross2" id="cross2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
	</table>
	</div></br>
	<div class="form-group col-md-12 col-sm-12">
        <p style="color:black;">BRAINSTEM REFLEXES:</p>
	</div>
	 <div class = "form-group col-md-12 col-sm-12" style="overflow-x:auto;">
	<table style="width:100%;"  border="1"  >
		    <tr>
			<th>REFLEX</th>
			<th>NORMAL UNTIL</th>
			<th>PRESENT</th>
			<th>INTEGRATED</th>
			</tr>
			<tr>
			<td>ATNR</td>
			<td>6 MONTHS USUALLY PATHOLOGICAL</td>
			<td><input type="text" value="<?php echo $assess['atnr1']; ?>" name="atnr1" id="atnr1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['atnr2']; ?>" name="atnr2" id="atnr2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
			<tr>
			<td>STNR</td>
			<td>RARE AND PATHOLOGICAL</td>
			<td><input type="text" value="<?php echo $assess['rare1']; ?>" name="rare1" id="rare1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['rare2']; ?>" name="rare2" id="rare2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
			<tr>
			<td>TONIC LABRYNTHINE SUPINE</td>
			<td>PATHOLOGICAL</td>
			<td><input type="text" value="<?php echo $assess['supine1']; ?>" name="supine1" id="supine1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['supine2']; ?>" name="supine2" id="supine2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
			<tr>
			<td>TONIC LABRYNTHINE PRONE </td>
			<td>3 MONTHS</td>
			<td><input type="text" value="<?php echo $assess['tonic1']; ?>" name="tonic1" id="tonic1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['tonic2']; ?>" name="tonic2" id="tonic2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
			<tr>
			<td>POSITIVE SUPPORTING </td>
			<td>3 MONTHS</td>
			<td><input type="text" value="<?php echo $assess['positive1']; ?>" name="positive1" id="positive1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['positive2']; ?>" name="positive2" id="positive2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
			<tr>
			<td>NEGATIVE SUPPORTING </td>
			<td>3-5 MONTHS</td>
			<td><input type="text" value="<?php echo $assess['negative1']; ?>" name="negative1" id="negative1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['negative2']; ?>" name="negative2" id="negative2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
	</table>
	</div></br>
	<div class="form-group col-md-12 col-sm-12">
        <p style="color:black;">MIDBRAIN REFLEXES:</p>
	</div>
	 <div class = "form-group col-md-12 col-sm-12" style="overflow-x:auto;">
	<table style="width:100%;"  border="1"  >
		    <tr>
			<th>REACTIONS </th>
			<th>EMERGES</th>
			<th>ACHIEVED</th>
			<th>NOT ACHIEVED</th>
			</tr>
			<tr>
			<td>OPTICAL</td>
			<td>6 MONTHS</td>
			<td><input type="text" value="<?php echo $assess['optical1']; ?>" name="optical1" id="optical1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['optical2']; ?>" name="optical2" id="optical2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
			<tr>
			<td>LABRYTHINE</td>
			<td><input type="text" value="<?php echo $assess['labrythine1']; ?>" name="labrythine1" id="labrythine1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['labrythine2']; ?>" name="labrythine2" id="labrythine2" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['labrythine3']; ?>" name="labrythine3" id="labrythine3" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
	</table></div></br>
	<div class="form-group col-md-12 col-sm-12">
        <p style="color:black;">CORTICAL REACTIONS:</p>
	</div>
	 <div class = "form-group col-md-12 col-sm-12" style="overflow-x:auto;">
	<table style="width:100%;"  border="1"  >
		    <tr>
			<th>NECK RIGHTING </th>
			<th>EMERGES</th>
			<th>ACHIEVED</th>
			<th>NOT ACHIEVED</th>
			</tr>
			<tr>
			<td>NECK RIGHTING</td>
			<td>5 MONTHS</td>
			<td><input type="text" value="<?php echo $assess['n_righting1']; ?>" name="n_righting1" id="n_righting1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['n_righting2']; ?>" name="n_righting2" id="n_righting2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
			<tr>
			<td>ASSOCIATED REACTIONS</td>
			<td>PATHOLOGICAL</td>
			<td><input type="text" value="<?php echo $assess['pathological1']; ?>" name="pathological1" id="pathological1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['pathological2']; ?>" name="pathological2" id="pathological2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
			<tr>
			<td>RISING</td>
			<td>2-6 MONTHS</td>
			<td><input type="text" value="<?php echo $assess['rising1']; ?>" name="rising1" id="rising1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['rising2']; ?>" name="rising2" id="rising2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
			<tr>
			<td>BODY RIGHTING</td>
			<td>4-6 MONTHS</td>
			<td><input type="text" value="<?php echo $assess['b_righting1']; ?>" name="b_righting1" id="b_righting1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['b_righting2']; ?>" name="b_righting2" id="b_righting2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
			<tr>
			<td>AMPHIBIAN</td>
			<td>4-6 MONTHS</td>
			<td><input type="text" value="<?php echo $assess['amphibian1']; ?>" name="amphibian1" id="amphibian1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['amphibian2']; ?>" name="amphibian2" id="amphibian2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
			<tr>
			<td>ROTATION</td>
			<td>6-10 MONTHS</td>
			<td><input type="text" value="<?php echo $assess['rotation1']; ?>" name="rotation1" id="rotation1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['rotation2']; ?>" name="rotation2" id="rotation2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
	</table></div></br>
	<div class="form-group col-md-12 col-sm-12">
        <p style="color:black;">TILT REACTIONS:</p>
	</div>
	 <div class = "form-group col-md-12 col-sm-12" style="overflow-x:auto;">
	<table style="width:100%;"  border="1"  >
		    <tr>
			<th>NECK RIGHTING </th>
			<th>EMERGES</th>
			<th>ACHIEVED</th>
			<th>NOT ACHIEVED</th>
			</tr>
			<tr>
			<td>SUPINE NAD PRONE</td>
			<td>6 MONTHS</td>
			<td><input type="text" value="<?php echo $assess['Supine_prone1']; ?>" name="Supine_prone1" id="Supine_prone1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['Supine_prone2']; ?>" name="Supine_prone2" id="Supine_prone2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
			<tr>
			<td>FOUR POINT KNEELING</td>
			<td>7-12 MONTHS</td>
			<td><input type="text" value="<?php echo $assess['kneeling1']; ?>" name="kneeling1" id="kneeling1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['kneeling2']; ?>" name="kneeling2" id="kneeling2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
			<tr>
			<td>SITTING</td>
			<td>9-12 MONTHS</td>
			<td><input type="text" value="<?php echo $assess['sitting1']; ?>" name="sitting1" id="sitting1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['sitting2']; ?>" name="sitting2" id="sitting2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
			<tr>
			<td>KNEEL STANDING</td>
			<td>18 MONTHS</td>
			<td><input type="text" value="<?php echo $assess['K_standing1']; ?>" name="K_standing1" id="K_standing1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['K_standing2']; ?>" name="K_standing2" id="K_standing2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
			<tr>
			<td>STANDING</td>
			<td>12-18MONTHS</td>
			<td><input type="text" value="<?php echo $assess['standing1']; ?>" name="standing1" id="standing1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['standing2']; ?>" name="standing2" id="standing2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
			<tr>
			<td>STAGGERING REACTION</td>
			<td>12-18 MONTHS</td>
			<td><input type="text" value="<?php echo $assess['s_reaction1']; ?>" name="s_reaction1" id="s_reaction1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['s_reaction2']; ?>" name="s_reaction2" id="s_reaction2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
			<tr>
			<td>SAVING FROM FALL</td>
			<td>5-10 MONTHS</td>
			<td><input type="text" value="<?php echo $assess['s_fall1']; ?>" name="s_fall1" id="s_fall1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['s_fall2']; ?>" name="s_fall2" id="s_fall2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
	</table></div></br>
	<div class="form-group col-md-12 col-sm-12">
        <p style="color:black;">ON EXAMINATION:</p>
	</div>
	<div class="form-group col-md-3 col-sm-6">
            <label >Higher cortical function	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['h_cortical']; ?>" name="h_cortical" id="h_cortical" placeholder="">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label >Integration with 4 examiner	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['examiner']; ?>" name="examiner" id="examiner" placeholder="">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > Integration with surroundings	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['surroundings']; ?>" name="surroundings" id="surroundings" placeholder="">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > Over all activity	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['activity']; ?>" name="activity" id="activity" placeholder="">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > Speech/ articulation	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Speech']; ?>" name="Speech" id="Speech" placeholder="">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > Vision	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Vision']; ?>" name="Vision" id="Vision" placeholder="">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > Hearing	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Hearing']; ?>" name="Hearing" id="Hearing" placeholder="">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > Cognitive function	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['function']; ?>" name="function" id="function" placeholder="">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > Orientation	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Orientation']; ?>" name="Orientation" id="Orientation" placeholder="">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > Handedness	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Handedness']; ?>" name="Handedness" id="Handedness" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
        <p style="color:#63C0EE;">CRANIAL VERVE EXAMINATION:</p>
        <p style="color:black;">PHYSICAL EXAMINATION:</p>
	</div>
	<div class="form-group col-md-3 col-sm-6">
            <label > Head circumference	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Head']; ?>" name="Head" id="Head" placeholder="">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > Chest circumference	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Chest']; ?>" name="Chest" id="Chest" placeholder="">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > Height	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Height']; ?>" name="Height" id="Height" placeholder="">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > Weight	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Weight']; ?>" name="Weight" id="Weight" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
        <p style="color:#63C0EE;">TENDON REFLEX:</p>
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > Biceps </label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Biceps']; ?>" name="Biceps" id="Biceps" placeholder="">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > Triceps 	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Triceps']; ?>" name="Triceps" id="Triceps" placeholder="">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > Knee 	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Knee']; ?>" name="Knee" id="Knee" placeholder="">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > Ankle 	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Ankle']; ?>" name="Ankle" id="Ankle" placeholder="">    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > Abdomen	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Abdomen']; ?>" name="Abdomen" id="Abdomen" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
        <p style="color:#63C0EE;">RESPIRATORY STATUS:</p>
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > 1.	Pattern of breathing	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['breathing']; ?>" name="breathing" id="breathing" placeholder="">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > 2.	Endurance	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Endurance']; ?>" name="Endurance" id="Endurance" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
        <p style="color:#63C0EE;">SENSORY EVALUATION:</p>
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > Superficial 	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Superficial']; ?>" name="Superficial" id="Superficial" placeholder="">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > Deep 	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Deep']; ?>" name="Deep" id="Deep" placeholder="">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > Combined cortical sensation 	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['cortical']; ?>" name="cortical" id="cortical" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
        <p style="color:#63C0EE;">MOTOR ASSESSMENT/ MUSCULOSKELETAL ASSESSMENT:</p>
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > Muscle tone 	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['tone']; ?>" name="tone" id="tone" placeholder="">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > Muscle power/ voluntary control: 	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['power']; ?>" name="power" id="power" placeholder="">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > Arom  	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Arom']; ?>" name="Arom" id="Arom" placeholder="">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > Prom  	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Prom']; ?>" name="Prom" id="Prom" placeholder="">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > Deformities / contractures/tightness   	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Deformities']; ?>" name="Deformities" id="Deformities" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
        <p style="color:#63C0EE;">Limb length discrepancy :</p>
    </div></br>
	 <div class = "form-group col-md-12 col-sm-12" style="overflow-x:auto;">
	<table style="width:100%;"  border="1"  >
		    <tr>
			<th>&nbsp;&nbsp; </th>
			<th>Right     (cm)   </th>
			<th>Left (cm)</th>
			</tr>
			<tr>
			<td>True length</td>
			<td><input type="text" value="<?php echo $assess['true1']; ?>" name="true1" id="true1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['true2']; ?>" name="true2" id="true2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
			<tr>
			<td>Apparent length</td>
			<td><input type="text" value="<?php echo $assess['Apparent1']; ?>" name="Apparent1" id="Apparent1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['Apparent2']; ?>" name="Apparent2" id="Apparent2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
		</table>
		</div></br>
		<div class="form-group col-md-12 col-sm-12">
        <p style="color:#63C0EE;">Muscle girth :</p>
    </div>
	 <div class = "form-group col-md-12 col-sm-12" style="overflow-x:auto;">
		<table style="width:100%;"  border="1"  >
		    <tr>
			<th>Mid thigh </th>
			<td><input type="text" value="<?php echo $assess['thigh1']; ?>" name="thigh1" id="thigh1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['thigh2']; ?>" name="thigh2" id="thigh2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>	
			
			<tr>
			<td>Mid calf </td>
			<td><input type="text" value="<?php echo $assess['calf1']; ?>" name="calf1" id="calf1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['calf2']; ?>" name="calf2" id="calf2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
			<tr>
			<td>Mid arm  </td>
			<td><input type="text" value="<?php echo $assess['arm1']; ?>" name="arm1" id="arm1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['arm2']; ?>" name="arm2" id="arm2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
			<tr>
			<td>Mid forearm </td>
			<td><input type="text" value="<?php echo $assess['forearm1']; ?>" name="forearm1"  id="forearm1" class="form-control input-sm" style="width:100%;" /></td>
			<td><input type="text" value="<?php echo $assess['forearm2']; ?>" name="forearm2" id="forearm2" class="form-control input-sm" style="width:100%;" /></td>
			</tr>
		</table>
		</div>
	<div class="form-group col-md-3 col-sm-6">
            <label > Posture assessment:   	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Posture']; ?>" name="Posture" id="Posture" placeholder="">
    </div>
    <div class="form-group col-md-3 col-sm-6">
            <label > Co-ordination test:   	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Co-ordination']; ?>" name="Co-ordination" id="Co-ordination" placeholder="">
    </div>
    <div class="form-group col-md-3 col-sm-6">
            <label > Gait assessment  	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Gait']; ?>" name="Gait" id="Gait" placeholder="">
    </div>
    <div class="form-group col-md-3 col-sm-6">
            <label > Balance assessment:   	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['bal_assessment']; ?>" name="bal_assessment" id="bal_assessment" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
        <p style="color:black;">Sitting balance :</p>
    </div>
   <div class="form-group col-md-3 col-sm-6">
            <label >•	Static   	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['sit_Static']; ?>" name="sit_Static" id="sit_Static" placeholder="">
    </div>	
<div class="form-group col-md-3 col-sm-6">
            <label > •	Dynamic   	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['sit_Dynamic']; ?>" name="sit_Dynamic" id="sit_Dynamic" placeholder="">
    </div>
<div class="form-group col-md-12 col-sm-12">
        <p style="color:black;">Standing balance : </p>
</div>	
<div class="form-group col-md-3 col-sm-6">
            <label >•	Static   	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['stand_Static']; ?>" name="stand_Static" id="Static" placeholder="">
    </div>	
 <div class="form-group col-md-3 col-sm-6">
            <label > •	Balance   	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['stand_Balance']; ?>" name="stand_Balance" id="Balance" placeholder="">
    </div>
	
   <div class="form-group col-md-3 col-sm-6">
            <label > Bladder / bowel control   	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Bladder']; ?>" name="Bladder" id="Bladder" placeholder="">
    </div>
  <div class="form-group col-md-12 col-sm-12">
        <p style="color:black;">FUNCTIONAL ASSESSMENT: </p>
        <p style="color:black;"><u>WEE FIM SCALE</u></p>
        <p style="color:black;"><u>SELF CARE</u> </p>
  </div>	
	<div class="form-group col-md-3 col-sm-6">
            <label > 1.	Eating   	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Eating']; ?>" name="Eating" id="Eating" placeholder="">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > 2.	Grooming   	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Grooming']; ?>" name="Grooming" id="Grooming" placeholder="">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > 3.	Bathing   	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Bathing']; ?>" name="Bathing" id="Bathing" placeholder="">
    </div><div class="form-group col-md-3 col-sm-6">
            <label > 4.	Dressing-Upper Body   	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Dressing-Upper']; ?>" name="Dressing-Upper" id="Dressing-Upper" placeholder="">
    </div><div class="form-group col-md-3 col-sm-6">
            <label > 5.	Dressing-Lower Body   	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Dressing-Lower']; ?>" name="Dressing-Lower" id="Dressing-Lower" placeholder="">
    </div><div class="form-group col-md-3 col-sm-6">
            <label >6.	Toileting   	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Toileting']; ?>" name="Toileting" id="Toileting" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
        <p style="color:black;"><u>SPHINTER</u> </p>
  </div><div class="form-group col-md-3 col-sm-6">
            <label > 7.	Bladder Management   	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Bladder_manage']; ?>" name="Bladder_manage" id="Bladder" placeholder="">
    </div><div class="form-group col-md-3 col-sm-6">
            <label > 8.	Bowel Management  	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Bowel']; ?>" name="Bowel" id="Bowel" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
        <p style="color:black;"><u>MOBILITY</u> </p>
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > 9.	Transfer Chair/Wheel Chair   	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Chair']; ?>" name="Chair" id="Chair" placeholder="">
    </div><div class="form-group col-md-3 col-sm-6">
            <label > 10.	Transfer Toilet   	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Toilet']; ?>" name="Toilet" id="Toilet" placeholder="">
    </div><div class="form-group col-md-3 col-sm-6">
            <label > 11.	Transfer Tub   	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Tub']; ?>" name="Tub" id="Tub" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
        <p style="color:black;"><u>LOCOMOTION</u> </p>
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > 12.	Crawls/Walk/Wheelchair   	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['Crawls']; ?>" name="Crawls" id="Crawls" placeholder="">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > 13.	Stairs   	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['stairs']; ?>" name="stairs" id="stairs" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
        <p style="color:black;"><u>COMMUNICATION</u> </p>
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > 14.	Comprehension   	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['comprehension']; ?>" name="comprehension" id="comprehension" placeholder="">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > 15.	Expression   	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['expression']; ?>" name="expression" id="expression" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
        <p style="color:black;"><u>SOCIAL COGNITION</u> </p>
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > 16.	Social Interaction   	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['social']; ?>" name="social" id="social" placeholder="">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > 17.	Problem Solving    	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['pbm']; ?>" name="pbm" id="pbm" placeholder="">
    </div>
	<div class="form-group col-md-3 col-sm-6">
            <label > 18.	Memory   	</label>
            <input type="text" class="form-control input-sm" value="<?php echo $assess['memory']; ?>" name="memory" id="memory" placeholder="">
    </div>
	<div class="form-group col-md-12 col-sm-12">
            <label > DETAILS OF CURRENT MEDICATION   	</label>
           <textarea  rows="4"  name="medication" id="medication"  class="form-control" style="width:95%;" ><?php echo $assess['medication']; ?></textarea>
	  </div>
	<div class="form-group col-md-12 col-sm-12">
            <label > INVESTIGATIONS   	</label>
           <textarea  rows="4"  name="investigation" id="investigation" class="form-control" style="width:95%;" ><?php echo $assess['investigation']; ?></textarea>
	</div>
	<div class="form-group col-md-12 col-sm-12">
            <label > CLINICAL IMPRESSION  	</label>
            <textarea  rows="4"  name="impression" id="impression" class="form-control" style="width:95%;" ><?php echo $assess['impression']; ?></textarea>
	  </div>
	<div class="form-group col-md-12 col-sm-12">
            <label > DIFFERENTIAL DIAGNOSIS  	</label>
           <textarea  rows="4"  name="diagnosis" id="diagnosis" class="form-control" style="width:95%;" ><?php echo $assess['diagnosis']; ?></textarea>
	   </div>
	<div class="form-group col-md-12 col-sm-12">
            <label > PROBLEM LIST   	</label>
           <textarea  rows="4"  name="pbm_list" id="pbm_list" class="form-control" style="width:95%;" ><?php echo $assess['pbm_list']; ?></textarea>
	  </div>
	<div class="form-group col-md-12 col-sm-12">
            <label > GOALS   	</label>
            <textarea  rows="4"  name="goal" id="goal" class="form-control" style="width:95%;" ><?php echo $assess['goal']; ?></textarea>
	 </div>
	<div class="form-group col-md-12 col-sm-12">
            <label > SHORT TERM   	</label>
           <textarea  rows="4"  name="short_term" id="short_term" class="form-control" style="width:95%;" ><?php echo $assess['short_term']; ?></textarea>
	</div>
	<div class="form-group col-md-12 col-sm-12">
            <label > LONG TERM   	</label>
           <textarea  rows="4"  name="long_term" id="long_term" class="form-control" style="width:95%;" ><?php echo $assess['long_term']; ?></textarea>
	</div>
   <div class="col-md-12 col-sm-12">
		<div class="form-group col-md-3 col-sm-3 pull-right" >
				<input type="submit" class="btn btn-primary" value="Submit" id="save"/>
		</div>
	</div></div>
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
			window.location= "<?php echo base_url().'assessment/edit_antenatal/' ?>"+val1+'/'+val;
		});
		$(".print").click(function(){
			var val = $('#assess_id').val();
			var val1 = $('#patient_id').val();
			window.location= "<?php echo base_url().'assessment/print_antenatal/' ?>"+val1+'/'+val;
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
	  
	  
</script>

</body>
</html>