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
        <center><h3 class="panel-title"><b>SHOULDER ASSESSMENT</b>
</center></h3>
	</div>
<div class="panel-body">
    <form action="<?php echo base_url().'client/assessment/updateshoulder_assessment' ?>" method="post">
<div class="col-md-12 col-sm-12">
    <div class="form-group col-md-3 col-sm-6">
            <label for="name">ASSESSMENT DATE  *	</label>
                 <input class="datepicker form-control"  parsley-required="true" type="date"  id="assess_date" name="assess_date"/> 
	</div>
	<div class="create">
<input type="hidden" name="patient_id" id="patient_id" value="<?php echo $this->uri->segment(4); ?>" />	
<input type="hidden" name="s_id" id="s_id" value="<?php echo $this->uri->segment(5); ?>" />	
	   <div class="form-group col-md-3 col-sm-6">
            <label for="name">NAME  *	</label>
            <input type="text" name="NAME" value="<?php echo $patient['first_name'].''.$patient['last_name']; ?>" class="form-control input-sm" id="name" placeholder="" readonly>
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="name">Age/Sex  *	</label>
            <input type="text" name="age" value="<?php echo $patient['age'].'/'.$patient['gender']; ?>" class="form-control input-sm" id="age" placeholder="">
        </div>
        <div class="form-group col-md-3 col-sm-6">
            <label for="email">Reg.no  *</label>
            <input type="text" name="patient_code" value="<?php echo $patient['patient_code']; ?>" class="form-control input-sm" placeholder="" readonly>
        </div>
		</br></br></br></br></br>
		<h4>Mechanism/onset of pain</h4>
		
		<div class="form-group col-md-3 col-sm-6">
            <label for="email">Limitation of daily/social activities</label>
            <input type="text" name="social" value="<?php echo $details['social']; ?>" class="form-control input-sm" placeholder="" >
        </div>
		 <div class="form-group col-md-3 col-sm-6">
            <label for="email">Old injury/pain</label>
            <input type="text" name="injury" value="<?php echo $details['injury']; ?>" class="form-control input-sm" placeholder="" >
        </div>
		 <div class="form-group col-md-3 col-sm-6">
            <label for="email">Investigations</label>
            <input type="text" name="investigations" value="<?php echo $details['investigations']; ?>" class="form-control input-sm" placeholder="" >
        </div>
		 <div class="form-group col-md-3 col-sm-6">
            <label for="email">Surgery/injections</label>
            <input type="text" name="surgery" value="<?php echo $details['surgery']; ?>" class="form-control input-sm" placeholder="" >
        </div>
		</br></br></br></br></br>
		<h4> Pain: </h4>
		<table>
		<tr><td>Objective/ Pain </td><td>Left</td><td>Right</td></tr>
		<tr><td> Ant </td><td><input type="text" name="ant_left" value="<?php echo $details['ant_left']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="ant_right" value="<?php echo $details['ant_right']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Post  </td><td><input type="text" name="post_left" value="<?php echo $details['post_left']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="post_right" value="<?php echo $details['post_right']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Med   </td><td><input type="text" name="med_left" value="<?php echo $details['med_left']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="med_right" value="<?php echo $details['med_right']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Lat  </td><td><input type="text" name="lat_left" value="<?php echo $details['lat_left']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="lat_right" value="<?php echo $details['lat_right']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Bic. Groove    </td><td><input type="text" name="bic_left" value="<?php echo $details['bic_left']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="bic_right" value="<?php echo $details['bic_right']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Clicking    </td><td><input type="text" name="clicking_left" value="<?php echo $details['clicking_left']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="clicking_right" value="<?php echo $details['clicking_right']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Stiffness    </td><td><input type="text" name="stiffness_left" value="<?php echo $details['stiffness_left']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="stiffness_right" value="<?php echo $details['stiffness_right']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td colspan="3"> Observation    </td></tr>
		<tr><td> Alignment    </td><td><input type="text" name="alignment_left" value="<?php echo $details['alignment_left']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="alignment_right" value="<?php echo $details['alignment_right']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Swelling    </td><td><input type="text" name="swelling_left" value="<?php echo $details['swelling_left']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="swelling_right" value="<?php echo $details['swelling_right']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Warmth    </td><td><input type="text" name="warmth_left" value="<?php echo $details['warmth_left']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="warmth_right" value="<?php echo $details['warmth_right']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Winging    </td><td><input type="text" name="winging_left" value="<?php echo $details['winging_left']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="winging_right" value="<?php echo $details['winging_right']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Muscle atrophy </td><td><input type="text" name="atrophy_left" value="<?php echo $details['atrophy_left']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="atrophy_right" value="<?php echo $details['atrophy_right']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Muscle Tightness    </td><td><input type="text" name="tightness_left" value="<?php echo $details['tightness_left']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="tightness_right" value="<?php echo $details['tightness_right']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Deformities    </td><td><input type="text" name="deformities_left" value="<?php echo $details['deformities_left']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="deformities_right" value="<?php echo $details['deformities_right']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		</table>
		</br></br>
		
		<div class="past_image">
		<p style="float:right"><a id="body_edit" class="btn btn-info body_edit">Edit</a></p>
		  <img src="<?php echo $details['chart']; ?>" style="width:100%; height:auto;"></img>
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
		</br>
		
		<h4>Pain Description</h4>
		 <div class="form-group col-md-6 col-sm-6">
           <label for="email">Pain scale (0-10):</label>
           <div class="range-slider">
                       <input class="range-slider__range" type="range" value="<?php echo $details['pain_scale']; ?>" min="0" max="10" name="pain_scale">
                   <span class="range-slider__value"><?php echo $details['pain_scale']; ?></span>
           </div>
		 </div>
		 <div class="form-group col-md-6 col-sm-6">
            <label for="email">Pain duration</label>
            <input type="text" name="duration" value="<?php echo $details['duration']; ?>" class="form-control input-sm" placeholder="" >
         </div>
		 <div class="form-group col-md-12 col-sm-12">
            <label for="email">Pain type</label></br>
			   <input type="radio" style="height:1em; width:1em;"  name="category" id="category1" <?php if($details['category'] == 'Constant'){ echo 'checked'; } ?> value="Constant">                          
				<label for="category1">Constant&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
			   <input type="radio" style="height:1em; width:1em;" name="category" id="category2" <?php if($details['category'] == 'Intermittent'){ echo 'checked'; } ?> value="Intermittent" >
                <label for="category2">Intermittent&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
			   <input type="radio" style="height:1em; width:1em;" name="category" id="category3" <?php if($details['category'] == 'Sharp'){ echo 'checked'; } ?> value="Sharp" >
                <label for="category3">Sharp&nbsp;&nbsp;&nbsp; </label>
			   <input type="radio"  style="height:1em; width:1em;" name="category" id="category4" <?php if($details['category'] == 'Dull ache'){ echo 'checked'; } ?> value="Dull ache" >
                <label for="category4">Dull ache&nbsp;&nbsp;&nbsp; </label>
			   <input type="radio" style="height:1em; width:1em;" name="category" id="category5" <?php if($details['category'] == 'Throbbing'){ echo 'checked'; } ?> value="Throbbing" >
                <label for="category5">Throbbing&nbsp;&nbsp;&nbsp; </label>
			   <input type="radio" style="height:1em; width:1em;" name="category" id="category6" <?php if($details['category'] == 'Radiates'){ echo 'checked'; } ?> value="Radiates" >
                <label for="category6">Radiates&nbsp;&nbsp;&nbsp;</label>
			    <input type="radio" style="height:1em; width:1em;"  name="category" id="category7" <?php if($details['category'] == 'Moves'){ echo 'checked'; } ?> value="Moves" >
                <label for="category7">Moves&nbsp;&nbsp;&nbsp; </label>
			   <input type="radio" style="height:1em; width:1em;" name="category" id="category8" <?php if($details['category'] == 'Static'){ echo 'checked'; } ?> value="Static" >
                <label for="category8">Static&nbsp;&nbsp; </label></br>
			or </br>
			<input type="text" name="categories" id="categories" value="<?php echo $details['category']; ?>" class="form-control input-sm" placeholder="" >
		</div>
		 <div class="form-group col-md-12 col-sm-12">
              </br> <label for="email">Pain worse</label></br></br>
              <input type="radio" style="height:1em; width:1em;"  name="worse" id="worse1" <?php if($details['worse'] == 'am'){ echo 'checked'; } ?> value="am" >
                <label for="worse1">am&nbsp;&nbsp; </label>
			    <input type="radio" style="height:1em; width:1em;" name="worse" id="worse2" <?php if($details['worse'] == 'pm'){ echo 'checked'; } ?> value="pm" >
                <label for="worse2">pm &nbsp;&nbsp;</label>
			   <input type="radio" style="height:1em; width:1em;" name="worse" id="worse3" <?php if($details['worse'] == 'activity'){ echo 'checked'; } ?> value="activity" >
                <label for="worse3">activity&nbsp;&nbsp;  </label>
				<input type="radio" style="height:1em; width:1em;" name="worse" id="worse4" <?php if($details['worse'] == 'dependent'){ echo 'checked'; } ?> value="dependent" >
                <label for="worse4">dependent&nbsp;&nbsp;   </label>
			</br></br></div>
		 <div class="form-group col-md-6 col-sm-6">
            <label for="email">Aggravating factors</label>
            <input type="text" name="aggrevating" value="<?php echo $details['aggrevating']; ?>" class="form-control input-sm" placeholder="" >
         </div>
		 <div class="form-group col-md-6 col-sm-6">
            <label for="email">Relieving factors</label>
            <input type="text" name="relieving" value="<?php echo $details['relieving']; ?>" class="form-control input-sm" placeholder="" >
         </div>
        </br></br></br></br></br></br></br></br>
		<h4>Neck</h4>
		 <div class="form-group col-md-3 col-sm-6">
            <label for="email">Pain:</label>
            <input type="text" name="n_pain" value="<?php echo $details['n_pain']; ?>" class="form-control input-sm" placeholder="" >
         </div>
		 <div class="form-group col-md-3 col-sm-6">
            <label for="email">Stiffness</label>
            <input type="text" name="n_stiffness" value="<?php echo $details['n_stiffness']; ?>" class="form-control input-sm" placeholder="" >
         </div>
		 <div class="form-group col-md-3 col-sm-6">
            <label for="email">Radiation</label>
            <input type="text" name="n_radiation" value="<?php echo $details['n_radiation']; ?>" class="form-control input-sm" placeholder="" >
         </div>
		 </br></br></br></br></br>
		 <h4>Neurological</h4>
        <table>
		<tr><td> SHOULDER </td><td colspan="3"><center>LEFT</center></td><td colspan="3"><center>RIGHT</center></td></tr>
		<tr><td> Movements </td><td>Active</td><td>Passive</td><td>MMT</td><td>Active</td><td>Passive</td><td>MMT</td></tr>
		<tr><td> Flexion </td>
		<td><input type="text" name="flexion_active" value="<?php echo $details['flexion_active']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="flexion_passive" value="<?php echo $details['flexion_passive']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="flexion_mmt" value="<?php echo $details['flexion_mmt']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="flexion_active1" value="<?php echo $details['flexion_active1']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="flexion_passive1" value="<?php echo $details['flexion_passive1']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="flexion_mmt1" value="<?php echo $details['flexion_mmt1']; ?>" class="form-control input-sm" placeholder=""></td>
		</tr><tr><td> Extension </td>
		<td><input type="text" name="extension_active" value="<?php echo $details['extension_active']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="extension_passive" value="<?php echo $details['extension_passive']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="extension_mmt" value="<?php echo $details['extension_mmt']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="extension_active1" value="<?php echo $details['extension_active1']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="extension_passive1" value="<?php echo $details['extension_passive1']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="extension_mmt1" value="<?php echo $details['extension_mmt1']; ?>" class="form-control input-sm" placeholder=""></td>
		</tr><tr><td> Abduction </td>
		<td><input type="text" name="abduction_active" value="<?php echo $details['abduction_active']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="abduction_passive" value="<?php echo $details['abduction_passive']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="abduction_mmt" value="<?php echo $details['abduction_mmt']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="abduction_active1" value="<?php echo $details['abduction_active1']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="abduction_passive1" value="<?php echo $details['abduction_passive1']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="abduction_mmt1" value="<?php echo $details['abduction_mmt1']; ?>" class="form-control input-sm" placeholder=""></td>
		</tr><tr><td> Adduction </td>
		<td><input type="text" name="adduction_active" value="<?php echo $details['adduction_active']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="adduction_passive" value="<?php echo $details['adduction_passive']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="adduction_mmt" value="<?php echo $details['adduction_mmt']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="adduction_active1" value="<?php echo $details['adduction_active1']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="adduction_passive1" value="<?php echo $details['adduction_passive1']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="adduction_mmt1" value="<?php echo $details['adduction_mmt1']; ?>" class="form-control input-sm" placeholder=""></td>
		</tr><tr><td> Internal Rot </td>
		<td><input type="text" name="internalrot_active" value="<?php echo $details['internalrot_active']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="internalerot_passive" value="<?php echo $details['internalerot_passive']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="internalerot_mmt" value="<?php echo $details['internalerot_mmt']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="internalrot_active1" value="<?php echo $details['internalrot_active1']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="internalerot_passive1" value="<?php echo $details['internalerot_passive1']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="internalerot_mmt1" value="<?php echo $details['internalerot_mmt1']; ?>" class="form-control input-sm" placeholder=""></td>
		</tr><tr><td> External Rot </td>
		<td><input type="text" name="externalrot_active" value="<?php echo $details['externalrot_active']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="externalrot_passive" value="<?php echo $details['externalrot_passive']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="externalrot_mmt" value="<?php echo $details['externalrot_mmt']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="externalrot_active1" value="<?php echo $details['externalrot_active1']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="externalrot_passive1" value="<?php echo $details['externalrot_passive1']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="externalrot_mmt1" value="<?php echo $details['externalrot_mmt1']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		</table>
		</br></br>
        <h4>SPECIAL TESTS</h4>
		<table>
		<tr><td> Impingement </td><td colspan="2">Result</td><td>Rotator Cuff Testing</td><td colspan="2">Result</td></tr>
		<tr><td>  </td><td>Left</td><td>Right</td><td></td><td>Left</td><td>Right</td></tr>
		<tr><td> Painful Arc </br> Patient: Actively abduct arm  Pain between 60º-120º </td>
		<td><input type="text" name="painful_left" value="<?php echo $details['painful_left']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="painful_right" value="<?php echo $details['painful_right']; ?>" class="form-control input-sm" placeholder="" > </td>
		<td>Supraspinatus Test</br>Patient: Sh 90º flex, 45 º horizontal abd, elbow ext, sh IR</br>Therapist: Resist into sh add, patient maintains position</td>
		<td><input type="text" name="supraspinatus_left" value="<?php echo $details['supraspinatus_left']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="supraspinatus_right" value="<?php echo $details['supraspinatus_right']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Hawkins-Kennedy Test</br>Therapist: 90º sh flex, elb flex, sh IR.  Place outer arm under pt arm and on shoulder   Sh IR </td>
		<td><input type="text" name="Hawkins_left" value="<?php echo $details['Hawkins_left']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="Hawkins_right" value="<?php echo $details['Hawkins_right']; ?>" class="form-control input-sm" placeholder="" > </td>
		<td>Infraspinatus Test </br>Patient: Arm against body, elbow flexed to 90º  </br>Therapist: Resistance into IR with patient ER arm</td>
		<td><input type="text" name="Infraspinatus_left" value="<?php echo $details['Infraspinatus_left']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="Infraspinatus_right" value="<?php echo $details['Infraspinatus_right']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Stability Tests </td>
		<td><input type="text" name="Stability_left" value="<?php echo $details['Stability_left']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="Stability_right" value="<?php echo $details['Stability_right']; ?>" class="form-control input-sm" placeholder="" > </td>
		<td>Subscapularis Test (Lift Off)</br>Patient: Arm behind the back </br>Therapist: Lift arm from body  release  patient to hold position</td>
		<td><input type="text" name="Subscapularis_left" value="<?php echo $details['Subscapularis_left']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="Subscapularis_right" value="<?php echo $details['Subscapularis_right']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Apprehension Test</br>Therapist: 90º sh abd & 90º elb flex  sh ER 90º   apply PA force to humerus </td>
		<td><input type="text" name="Apprehension_left" value="<?php echo $details['Apprehension_left']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="Apprehension_right" value="<?php echo $details['Apprehension_right']; ?>" class="form-control input-sm" placeholder="" > </td>
		<td>Drop Arm Test</br>Therapist: Raise arm to 120º abd</br>Patient: Hold position and slowly lower arm down to side</td>
		<td><input type="text" name="Drop_left" value="<?php echo $details['Drop_left']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="Drop_right" value="<?php echo $details['Drop_right']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Sulcus Sign (Multidirectional Instability Test)</br>Therapist: Thumb & middle finger on ant and post acromion, index finger between humeral head & acromion</br>  Distract distal humerus with other hand.</td>
		<td><input type="text" name="Sulcus_left" value="<?php echo $details['Sulcus_left']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="Sulcus_right" value="<?php echo $details['Sulcus_right']; ?>" class="form-control input-sm" placeholder="" > </td>
		<td>&nbsp;&nbsp;&nbsp;</td><td><input type="text" name="left2" value="<?php echo $details['left2']; ?>" class="form-control input-sm" placeholder=""></td><td><input type="text" name="right2" value="<?php echo $details['right2']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		</table>
		</br></br>
		<div class="form-group col-md-12 col-sm-12">
            <label for="email">Diagnosis</label>
            <textarea name="Diagnosis" value="" class="form-control input-sm" placeholder="" ><?php echo $details['Diagnosis']; ?></textarea>
         </div>
		 <div class="form-group col-md-12 col-sm-12">
            <label for="email">Treatment Plan</label>
            <textarea name="Treatment" value="" class="form-control input-sm" placeholder="" ><?php echo $details['Treatment']; ?></textarea>
         </div>
		 <div class="form-group col-md-12 col-sm-12">
            <label for="email">Therapist</label>
            <textarea name="Therapist" value="" class="form-control input-sm" placeholder="" ><?php echo $details['Therapist']; ?></textarea>
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
    <script src="<?php echo base_url()?>range/js/index.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.gritter.min.js"></script>    
	<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
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
			window.location= "<?php echo base_url().'assessment/print_antental_assessment/' ?>"+val1+'/'+val;
		});
		var myDate = new Date();
			var prettyDate =(myDate.getDate()) + '-' + (myDate.getMonth()+1) + '-' + myDate.getFullYear();
		$("#assess_date").val(prettyDate);
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
		
		$('input[type=radio][name=category]').change(function() {
            var val1 = this.value;
			$('#categories').val(val1);
			
        });
		$('form').on('submit', function (event) {
				 event.preventDefault();
				 var $form = $(this);
				 var id = $('#patient_id').val();
				 var  formID = $(this).attr("id");
				 var  formURL = $(this).attr("action");
				
				if ( $(this).parsley().isValid() != false ) {
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
	
	$(".body_edit").click(function(){
			$('.paint_part').show();
			$('.past_image').hide();
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