<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $patient['first_name']?> - Physio Plus Tech</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.gritter.css" />
    <style>

 .range-slider {
  margin: 60px 0 0 0%;
}

.range-slider {
  width: 100%;
}

.range-slider__range {
  -webkit-appearance: none;
  width: calc(100% - (73px));
  height:5px;
  border-radius: 5px;
  background: #d7dcdf;
  outline: none;
  padding: 0;
  margin: 0;
}
.range-slider__range::-webkit-slider-thumb {
  -webkit-appearance: none;
          appearance: none;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  background: #2c3e50;
  cursor: pointer;
  -webkit-transition: background .15s ease-in-out;
  transition: background .15s ease-in-out;
}
.range-slider__range::-webkit-slider-thumb:hover {
  background: #1abc9c;
}
.range-slider__range:active::-webkit-slider-thumb {
  background: #1abc9c;
}
.range-slider__range::-moz-range-thumb {
  width: 20px;
  height: 20px;
  border: 0;
  border-radius: 50%;
  background: #2c3e50;
  cursor: pointer;
  -webkit-transition: background .15s ease-in-out;
  transition: background .15s ease-in-out;
}
.range-slider__range::-moz-range-thumb:hover {
  background: #1abc9c;
}
.range-slider__range:active::-moz-range-thumb {
  background: #1abc9c;
}

.range-slider__value {
  display: inline-block;
  position: relative;
  width: 60px;
  color: #fff;
  line-height: 20px;
  text-align: center;
  border-radius: 3px;
  background: #2c3e50;
  padding: 5px 10px;
  margin-left: 8px;
}
.range-slider__value:after {
  position: absolute;
  top: 8px;
  left: -7px;
  width: 0;
  height: 0;
  border-top: 7px solid transparent;
  border-right: 7px solid #2c3e50;
  border-bottom: 7px solid transparent;
  content: '';
}

::-moz-range-track {
  background: #d7dcdf;
  border: 0;
}

.radio label {
  display: inline-block;
  cursor: pointer;
  position: relative;
  padding-left: 25px;
  margin-right: 15px;
  font-size: 13px;
  margin-bottom:6px;
  color: #777a80;
}
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
        <center><h3 class="panel-title"><b>Hip Assessment</b></center></h3>
	</div>
<div class="panel-body">
    <form action="<?php echo base_url().'client/assessment/addhip_assessment' ?>" method="post">
<div class="col-md-12 col-sm-12">
    <div class="form-group col-md-3 col-sm-6">
            <label for="name">ASSESSMENT DATE  *	</label>
                 <input class="datepicker form-control"  parsley-required="true"  type="date"  id="assess_date" name="assess_date"/> 
	</div>
	<div class="create" >     
	   <div class="form-group col-md-3 col-sm-6">
            <label for="name">NAME  *	</label>
            <input type="text" name="NAME" value="<?php echo $patient['first_name'].''.$patient['last_name']; ?>" class="form-control input-sm" id="name" placeholder="" readonly>
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="name">Age/Sex  *	</label>
            <input type="text" name="LMP" value="<?php echo $patient['age'].'/'.$patient['gender']; ?>" class="form-control input-sm" id="age" placeholder="">
        </div>
        <div class="form-group col-md-3 col-sm-6">
            <label for="email">Reg.no  *</label>
            <input type="text" name="patient_code" value="<?php echo $patient['patient_code']; ?>" class="form-control input-sm" placeholder="" readonly>
        </div>
		</br></br></br></br></br>
		<h4>Mechanism/onset of pain</h4>
		     <input type="hidden" name="patient_id" value="<?php echo $patient['patient_id']; ?>" class="form-control input-sm" placeholder="" >
       
		<div class="form-group col-md-3 col-sm-6">
            <label for="email">Limitation of daily/social activities</label>
            <input type="text" name="social" value="" class="form-control input-sm" placeholder="" >
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="email">Investigations</label>
            <input type="text" name="Investigations" value="" class="form-control input-sm" placeholder="" >
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="email">Old injury/pain</label>
            <input type="text" name="injury" value="" class="form-control input-sm" placeholder="" >
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="email">Surgery/procedures </label>
            <input type="text" name="Surgery" value="" class="form-control input-sm" placeholder="" >
        </div>
		</br></br></br></br></br>
		
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
		</br></br></br></br></br>
		
		<h4> Area of Pain : </h4></br>
		<h4> Objective : </h4></br>
		<div class="form-group col-md-3 col-sm-6">
            <label for="email">Warmth </label>
            <input type="text" name="Warmth" value="" class="form-control input-sm" placeholder="" >
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="email">Edema </label>
            <input type="text" name="Edema" value="" class="form-control input-sm" placeholder="" >
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="email">Skin changes </label>
            <input type="text" name="Skin" value="" class="form-control input-sm" placeholder="" >
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="email">Muscle atrophy </label>
            <input type="text" name="m_atrophy" value="" class="form-control input-sm" placeholder="" >
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="email">Tightness </label>
            <input type="text" name="Tightness" value="" class="form-control input-sm" placeholder="" >
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="email">Clicking/Snapping </label>
            <input type="text" name="Snapping" value="" class="form-control input-sm" placeholder="" >
        </div>
		</br></br></br></br></br></br></br>
		<div class="form-group col-md-12 col-sm-12">
            <label for="email"><strong>Contractures/Deformities </strong></label>
            <input type="text" name="Deformities" value="" class="form-control input-sm" placeholder="" >
        </div>
		</br></br></br></br></br></br></br>
		<h4>Functional</h4>
		<div class="form-group col-md-3 col-sm-6">
            <label for="email">Limb alignment: </label>
            <input type="text" name="Limb" value="" class="form-control input-sm" placeholder="" >
        </div>
		</br></br></br></br>
		<h4>Gait </h4>
		<div class="form-group col-md-6 col-sm-6">
            <label for="email">Stance phase </label>
            <input type="text" name="Stance" value="" class="form-control input-sm" placeholder="" >
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="email">Swing phase </label>
            <input type="text" name="Swing" value="" class="form-control input-sm" placeholder="" >
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="email">Walking aid/Brace  </label>
            <input type="text" name="Walking" value="" class="form-control input-sm" placeholder="" >
        </div>
		<div class="form-group col-md-6 col-sm-6">
            <label for="email">Weight bearing </label>
            <input type="text" name="Weight" value="" class="form-control input-sm" placeholder="" >
        </div>
		
		</br></br></br></br></br></br></br></br>
		<h4>Pain Description </h4>
		<div class="form-group col-md-12 col-sm-12">
            <label for="email">Pain scale (0-10):  </label>
		    <div class="range-slider">
                       <input class="range-slider__range" type="range" value="5" min="0" max="10" name="pain_scale">
                   <span class="range-slider__value">0</span>
            </div></div>
		<div class="form-group col-md-12 col-sm-12">
            <label for="email">Pain duration  </label>
            <input type="text" name="duration" value="" class="form-control input-sm" placeholder="" >
        </div>
		<div class="form-group col-md-12 col-sm-12">
            <label for="email">Pain type&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;</label>
			   <input type="radio" style="height:1em; width:1em;"  name="category" id="category1" value="Constant">                          
				<label for="category1">Constant&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
			   <input type="radio" style="height:1em; width:1em;" name="category" id="category2" value="Intermittent" >
                <label for="category2">Intermittent&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
			   <input type="radio" style="height:1em; width:1em;" name="category" id="category3" value="Sharp" >
                <label for="category3">Sharp&nbsp;&nbsp;&nbsp; </label>
			   <input type="radio"  style="height:1em; width:1em;" name="category" id="category4" value="Dull ache" >
                <label for="category4">Dull ache&nbsp;&nbsp;&nbsp; </label>
			   <input type="radio" style="height:1em; width:1em;" name="category" id="category5" value="Throbbing" >
                <label for="category5">Throbbing&nbsp;&nbsp;&nbsp; </label>
			   <input type="radio" style="height:1em; width:1em;" name="category" id="category6" value="Radiates" >
                <label for="category6">Radiates&nbsp;&nbsp;&nbsp;</label>
			    <input type="radio" style="height:1em; width:1em;"  name="category" id="category7" value="Moves" >
                <label for="category7">Moves&nbsp;&nbsp;&nbsp; </label>
			   <input type="radio" style="height:1em; width:1em;" name="category" id="category8" value="Static" >
                <label for="category8">Static&nbsp;&nbsp; </label>
			or 
			<input type="text" name="categories" id="categories" value="" class="form-control input-sm" placeholder="" >
		 </div>
		<div class="form-group col-md-12 col-sm-12">
            <label for="email">Pain worse&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp; </label>
			    <input type="radio" style="height:1em; width:1em;"  name="worse" id="worse1" value="am" >
                <label for="worse1">am&nbsp;&nbsp; </label>
			    <input type="radio" style="height:1em; width:1em;" name="worse" id="worse2" value="pm" >
                <label for="worse2">pm &nbsp;&nbsp;</label>
			   <input type="radio" style="height:1em; width:1em;" name="worse" id="worse3" value="activity" >
                <label for="worse3">activity&nbsp;&nbsp;  </label>
				<input type="radio" style="height:1em; width:1em;" name="worse" id="worse4" value="dependent" >
                <label for="worse4">dependent&nbsp;&nbsp;   </label>
		 </div>
		 <div class="form-group col-md-12 col-sm-12">
            <label for="email">Aggravating factors&nbsp;&nbsp;&nbsp;</label></br>
			   <input type="radio"  name="Aggravating" id="Aggravating1" value="Walking">                          
				<label for="Aggravating1">Walking &nbsp;&nbsp;&nbsp;</label>
			   <input type="radio"  name="Aggravating" id="Aggravating2" value="Stairs" >
                <label for="Aggravating2">Stairs &nbsp;&nbsp;&nbsp;</label>
			   <input type="radio"  name="Aggravating" id="Aggravating3" value="Sports" >
                <label for="Aggravating3">Sports &nbsp;&nbsp;&nbsp;</label>
				<input type="radio"  name="Aggravating" id="Aggravating4" value="Rest" >
                <label for="Aggravating4">Rest &nbsp;&nbsp;&nbsp;</label>
				<input type="radio"  name="Aggravating" id="Aggravating5" value="Standing" >
                <label for="Aggravating5">Standing&nbsp;&nbsp;&nbsp; </label>
				or 
			<input type="text" name="Aggravating_factors" value="" class="form-control input-sm" placeholder="" id="Aggravating_factors" >
		</div>
		<div class="form-group col-md-12 col-sm-12">
            <label for="email">Relieving factors:&nbsp;&nbsp;&nbsp;&nbsp;</label>
			<input type="radio" style="height:1em; width:1em;"  name="Relieving" id="worse1" value="Rest" >
                <label for="worse2">Rest &nbsp;&nbsp;</label>
			   <input type="radio" style="height:1em; width:1em;" name="Relieving" id="worse3" value="Positioning" >
                <label for="worse3">Positioning&nbsp;&nbsp;  </label>
				<input type="radio" style="height:1em; width:1em;" name="Relieving" id="worse4" value="NSAIDS" >
                <label for="worse4">NSAIDS&nbsp;&nbsp;   </label>
				or 
				<input type="text" name="Relieving_factors" id="Relieving_factors" value="" class="form-control input-sm" placeholder="" >
		</div>
		
		<table>
		<tr><td>RANGE OF MOTION  </td><td colspan="3">Left</td><td colspan="3">Right</td></tr>
		<tr><td>  </td><td>Active</td><td>Passive</td><td>MMT</td><td>Active</td><td>Passive</td><td>MMT</td></tr>
		<tr><td> Flexion </td><td><input type="text" name="flexl_active"  class="form-control input-sm" placeholder=""></td><td><input type="text" name="flexl_passive"  class="form-control input-sm" placeholder=""></td><td><input type="text" name="flexl_mmt"  class="form-control input-sm" placeholder=""></td><td><input type="text" name="flexr_active" class="form-control input-sm" placeholder="" > </td><td><input type="text" name="flexr_passive"  class="form-control input-sm" placeholder=""></td><td><input type="text" name="flexr_mmt"  class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Extension  </td><td><input type="text" name="exl_active" class="form-control input-sm" placeholder=""></td><td><input type="text" name="exl_passive" class="form-control input-sm" placeholder="" > </td><td><input type="text" name="exl_mmt"  class="form-control input-sm" placeholder=""></td><td><input type="text" name="exr_active" class="form-control input-sm" placeholder=""></td><td><input type="text" name="exr_passive" class="form-control input-sm" placeholder=""></td><td><input type="text" name="exr_mmt"  class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Abduction   </td><td><input type="text" name="abduction1_active"class="form-control input-sm" placeholder=""></td><td><input type="text" name="abduction1_passive" class="form-control input-sm" placeholder="" > </td><td><input type="text" name="abduction1_mmt"  class="form-control input-sm" placeholder=""></td><td><input type="text" name="abductionr_active" class="form-control input-sm" placeholder=""></td><td><input type="text" name="abductionr_passive"  class="form-control input-sm" placeholder=""></td><td><input type="text" name="abductionr_mmt" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Adduction  </td><td><input type="text" name="adductionl_active" class="form-control input-sm" placeholder=""></td><td><input type="text" name="adductionl_passive"  class="form-control input-sm" placeholder=""></td><td><input type="text" name="adductionl_mmt" class="form-control input-sm" placeholder=""></td><td><input type="text" name="adductionr_active"  class="form-control input-sm" placeholder="" > </td><td><input type="text" name="adductionr_passive"  class="form-control input-sm" placeholder=""></td><td><input type="text" name="adductionr_mmt" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Internal Rot </td><td><input type="text" name="irotl_active" class="form-control input-sm" placeholder=""></td><td><input type="text" name="irotl_passive" class="form-control input-sm" placeholder=""></td><td><input type="text" name="irotl_mmt"  class="form-control input-sm" placeholder=""></td><td><input type="text" name="irotr_active" class="form-control input-sm" placeholder="" > </td><td><input type="text" name="irotr_passive"  class="form-control input-sm" placeholder=""></td><td><input type="text" name="irotr_mmt"  class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> External Rot  </td><td><input type="text" name="erotl_active" class="form-control input-sm" placeholder=""></td><td><input type="text" name="erotl_passive"  class="form-control input-sm" placeholder=""></td><td><input type="text" name="erotl_mmt" class="form-control input-sm" placeholder=""></td><td><input type="text" name="erotr_mmt"  class="form-control input-sm" placeholder="" > </td><td><input type="text" name="erotr_passive"  class="form-control input-sm" placeholder=""></td><td><input type="text" name="erotr_active"  class="form-control input-sm" placeholder="" > </td></tr>
		</table>
		</br></br>
        <h4>SPECIAL TESTS</h4>
		<table>
		<tr><td> Tests </td><td>Procedure</td><td>Left</td><td>Right</td></tr>
		<tr><td> Trendelenburg</br>Glut med weakness</td><td>Patient goes into SLS. Observe for hip drop.</td>
		<td><input type="text" name="Trendelenburg_left" value="" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="Trendelenburg_right" value="" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Faber’s (Patrick) </td><td>Place patient’s foot onto the opposite knee  Stabilize opp hip & apply force into abd, ER and posteriorly </td>
		<td><input type="text" name="Fabers_left" value="" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="Fabers_right" value="" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Sign of the Buttock</br>Bursitis, tight glut max.or tight post capsule</td><td>Perform SLR test to max range. With knee flexed, flex hip  Assess if further hip flexion can be achieved</td>
		<td><input type="text" name="Bursitis_left" value="" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="Bursitis_right" value="" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Piriformis </td><td>Patient in side lying. Leg to be tested on top. 60⁰ hip flex & 90⁰ knee flex  apply add force at knee</td>
		<td><input type="text" name="Piriformis_left" value="" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="Piriformis_right" value="" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Thomas</br> Tight iliopsoas n rectus femoris</td><td>Patient brings both knees to chest   Passively lower the test limb </td>
		<td><input type="text" name="Thomas_left" value="" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="Thomas_right" value="" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td>Ober’s</br> Tight ITB </td><td>Patient in side lying. Leg to be tested on top. Hip passively extended with knee in flex  abd hip and stabilize pelvis in a neutral position. Release the leg, allowing it to adduct. </td>
		<td><input type="text" name="Ober_left" value="" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="Ober_right" value="" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Leg Length </td><td>Lying supine, ensures a neutral pelvis position with knees flexed and straighten legs. Give a short tug on patients ankles and compare leg length.</td>
		<td><input type="text" name="Leg_left" value="" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="Leg_right" value="" class="form-control input-sm" placeholder="" > </td></tr>
		</table>
		</br></br>
		<div class="form-group col-md-12 col-sm-12">
            <label for="email">Diagnosis</label>
            <textarea name="Diagnosis" value="" class="form-control input-sm" placeholder="" ></textarea>
         </div>
		 <div class="form-group col-md-12 col-sm-12">
            <label for="email">Treatment Plan</label>
            <textarea name="Treatment" value="" class="form-control input-sm" placeholder="" ></textarea>
         </div>
		 <div class="form-group col-md-12 col-sm-12">
            <label for="email">Therapist</label>
            <textarea name="Therapist" value="" class="form-control input-sm" placeholder="" ></textarea>
         </div>
		
    <div class="col-md-12 col-sm-12">
		<div class="form-group col-md-3 col-sm-3 pull-right" >
				<input type="submit" class="btn btn-primary" value="Submit" id="save"/>
		</div>
	</div></div>
</form>
</div>
 <script src="<?php echo base_url(); ?>assets/js/jquery.gritter.min.js"></script>    
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
    <script src="<?php echo base_url()?>range/js/index.js"></script>
    <script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
	<script>	
	 $(document).ready(function() {
		 $('input[type=radio][name=category]').change(function() {
            var val1 = this.value;
			$('#categories').val(val1);
		 });
		 $('input[type=radio][name=Aggravating]').change(function() {
            var val1 = this.value;
			$('#Aggravating_factors').val(val1);
		 });
		 $('input[type=radio][name=Relieving]').change(function() {
            var val1 = this.value;
			$('#Relieving_factors').val(val1);
		 });
		$(".edit").click(function(){
			var val = $('#assess_id').val();
			var val1 = $('#patient_id').val();
			window.location= "<?php echo base_url().'assessment/edit_antenatal/' ?>"+val1+'/'+val;
		});
		$(".print").click(function(){
			var val = $('#assess_id').val();
			var val1 = $('#patient_id').val();
			window.location= "<?php echo base_url().'assessment/print_antental_assessment/' ?>"+val1+'/'+val;
		});
		/* $("#assess_date").change(function(){
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
				
				if ( $(this).parsley().isValid()) {
				 var button = $('#save');
				 button.prop('disabled', true);
				 $.ajax({
					type: 'post',
					url: $(this).attr('action'),
					data:$(this).serialize(),
					success:function(data, textStatus, jqXHR,form) 
					{
						
						$.gritter.add({title:	'Success',text:	'Patient Assessment Has Been Added Successfully'});
						setTimeout(function(){ 
							$('.md-close btn btn-default').click();
							window.location.reload();
						}, 1000);
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						$.gritter.add({title:	'Success',text:	'Patient Assessment Has Not Been Added Successfully'});
						 
						setTimeout(function(){ 
							$('.md-close btn btn-default').click();
							window.location.reload();
						}, 1000);
					}
			  });
			} else {
				alert('Select Assessment Date');
			}
				  
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
			url : '<?php echo base_url(); ?>client/assessment/body_chart', 
			cache : false,
            data: {image:image,id:why,date:why1},
			beforeSend: function(){
				$('.saveAppoinmentLoader > span').show();   
				$('#progress').show();
				
			},
			
            success: function (resp) {
			$('.saveAppoinmentLoader > span').hide(); 
			$('#progress').hide();
			$.gritter.add({
				text:	'Image saved successfully'});
			//$.jGrowl("Image saved successfully");
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