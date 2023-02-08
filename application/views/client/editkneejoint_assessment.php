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
        <center><h3 class="panel-title"><b>Knee Joint Assessment</b></center></h3>
	</div>
<div class="panel-body">
    <form action="<?php echo base_url().'client/assessment/updateknee_assessment' ?>" method="post">
<div class="col-md-12 col-sm-12">
    <div class="form-group col-md-3 col-sm-6">
            <label for="name">ASSESSMENT DATE  *	</label>
                 <input class="datepicker form-control" type="date"  id="assess_date" name="assess_date"/> 
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
		<input type="hidden" name="patient_id" id="patient_id" value="<?php echo $this->uri->segment(4); ?>" />	
		<input type="hidden" name="k_id" id="k_id" value="<?php echo $this->uri->segment(5); ?>" />	

		<div class="form-group col-md-3 col-sm-6">
            <label for="email">Limitation of daily/social activities</label>
            <input type="text" name="social" value="<?php echo $details['social']; ?>" class="form-control input-sm" placeholder="" >
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="email">Investigations</label>
            <input type="text" name="Investigations" value="<?php echo $details['Investigations']; ?>" class="form-control input-sm" placeholder="" >
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="email">Old injury/pain</label>
            <input type="text" name="injury" value="<?php echo $details['injury']; ?>" class="form-control input-sm" placeholder="" >
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="email">Surgery/procedures </label>
            <input type="text" name="procedures" value="<?php echo $details['procedures']; ?>" class="form-control input-sm" placeholder="" >
        </div>
		</br></br></br></br></br>
		<table>
		<tr><td>RANGE OF MOTION  </td><td colspan="2">Left</td><td colspan="2">Right</td></tr>
		<tr><td>  </td><td>Active</td><td>Passive</td><td>Active</td><td>Passive</td></tr>
		<tr><td> Ant </td>
		<td><input type="text" name="antl_active" value="<?php echo $details['antl_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="antl_passive" value="<?php echo $details['antl_passive']; ?>" class="form-control input-sm" placeholder="" > </td>
		<td><input type="text" name="antr_active" value="<?php echo $details['antr_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="antr_passive" value="<?php echo $details['antr_passive']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Post  </td>
		<td><input type="text" name="postl_active" value="<?php echo $details['postl_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="postl_passive" value="<?php echo $details['postl_passive']; ?>" class="form-control input-sm" placeholder="" ></td>
		<td><input type="text" name="postr_active" value="<?php echo $details['postr_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="postr_passive" value="<?php echo $details['postr_passive']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Med   </td>
		<td><input type="text" name="medl_active" value="<?php echo $details['medl_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="medl_passive" value="<?php echo $details['medl_passive']; ?>" class="form-control input-sm" placeholder="" > </td>
		<td><input type="text" name="medr_active" value="<?php echo $details['medr_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="medr_passive" value="<?php echo $details['medr_passive']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Lat  </td>
		<td><input type="text" name="latl_active" value="<?php echo $details['latl_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="latl_passive" value="<?php echo $details['latl_passive']; ?>" class="form-control input-sm" placeholder="" > </td>
		<td><input type="text" name="latr_active" value="<?php echo $details['latr_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="latr_passive" value="<?php echo $details['latr_passive']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td colspan="3"> Objective    </td></tr>
		<tr><td> Clicking    </td>
		<td><input type="text" name="clickingl_active" value="<?php echo $details['clickingl_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="clickingl_passive" value="<?php echo $details['clickingl_passive']; ?>" class="form-control input-sm" placeholder="" > </td>
		<td><input type="text" name="clickingr_active" value="<?php echo $details['clickingr_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="clickingr_passive" value="<?php echo $details['clickingr_passive']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Giving way     </td>
		<td><input type="text" name="wayl_active" value="<?php echo $details['wayl_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="wayl_passive" value="<?php echo $details['wayl_passive']; ?>" class="form-control input-sm" placeholder="" > </td>
		<td><input type="text" name="wayr_active" value="<?php echo $details['wayr_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="wayr_passive" value="<?php echo $details['wayr_passive']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Locking     </td>
		<td><input type="text" name="lockingl_active" value="<?php echo $details['lockingl_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="lockingl_passive" value="<?php echo $details['lockingl_passive']; ?>" class="form-control input-sm" placeholder="" > </td>
		<td><input type="text" name="lockingr_active" value="<?php echo $details['lockingr_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="lockingr_passive" value="<?php echo $details['lockingr_passive']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Grating    </td>
		<td><input type="text" name="gratingl_active" value="<?php echo $details['gratingl_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="gratingl_passive" value="<?php echo $details['gratingl_passive']; ?>" class="form-control input-sm" placeholder="" > </td>
		<td><input type="text" name="gratingr_active" value="<?php echo $details['gratingr_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="gratingr_passive" value="<?php echo $details['gratingr_passive']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Stiffness    </td>
		<td><input type="text" name="stiffl_active" value="<?php echo $details['stiffl_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="stiffl_passive" value="<?php echo $details['stiffl_passive']; ?>" class="form-control input-sm" placeholder="" > </td>
		<td><input type="text" name="stiffr_active" value="<?php echo $details['stiffr_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="stiffr_passive" value="<?php echo $details['stiffr_passive']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td colspan="3"> Observation     </td></tr>
		<tr><td> Warmth    </td>
		<td><input type="text" name="warml_active" value="<?php echo $details['warml_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="warml_passive" value="<?php echo $details['warml_passive']; ?>" class="form-control input-sm" placeholder="" > </td>
		<td><input type="text" name="warmr_active" value="<?php echo $details['warmr_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="warmr_passive" value="<?php echo $details['warmr_passive']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Swelling    </td>
		<td><input type="text" name="swell_active" value="<?php echo $details['swell_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="swell_passive" value="<?php echo $details['swell_passive']; ?>" class="form-control input-sm" placeholder="" > </td>
		<td><input type="text" name="swellr_active" value="<?php echo $details['swellr_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="swellr_passive" value="<?php echo $details['swellr_passive']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Skin changes    </td>
		<td><input type="text" name="skinl_active" value="<?php echo $details['skinl_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="skinl_passive" value="<?php echo $details['skinl_passive']; ?>" class="form-control input-sm" placeholder="" > </td>
		<td><input type="text" name="skinr_active" value="<?php echo $details['skinr_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="skinr_passive" value="<?php echo $details['skinr_passive']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Muscle atrophy </td>
		<td><input type="text" name="atrophyl_active" value="<?php echo $details['atrophyl_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="atrophyl_passive" value="<?php echo $details['atrophyl_passive']; ?>" class="form-control input-sm" placeholder="" > </td>
		<td><input type="text" name="atrophyr_active" value="<?php echo $details['atrophyr_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="atrophyr_passive" value="<?php echo $details['atrophyr_passive']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Muscle Tightness    </td>
		<td><input type="text" name="tightnessl_active" value="<?php echo $details['tightnessl_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="tightnessl_passive" value="<?php echo $details['tightnessl_passive']; ?>" class="form-control input-sm" placeholder="" > </td>
		<td><input type="text" name="tightnessr_active" value="<?php echo $details['tightnessr_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="tightnessr_passive" value="<?php echo $details['tightnessr_passive']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Patellar tracking   </td>
		<td><input type="text" name="trackingl_active" value="<?php echo $details['trackingl_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="trackingl_passive" value="<?php echo $details['trackingl_passive']; ?>" class="form-control input-sm" placeholder="" > </td>
		<td><input type="text" name="trackingr_active" value="<?php echo $details['trackingr_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="trackingr_passive" value="<?php echo $details['trackingr_passive']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		</table>
		
		</br>
		
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
		</br></br></br></br></br>
		
		<h4> Pain Description : </h4>
		<div class="form-group col-md-12 col-sm-12">
            <label for="email">Pain scale: </label>
            <div class="range-slider">
               <input class="range-slider__range" type="range" value="<?php echo $details['pain_scale']; ?>" min="0" max="10" name="pain_scale">
               <span class="range-slider__value"><?php echo $details['pain_scale']; ?></span>
           </div></div>
		<div class="form-group col-md-12 col-sm-12">
            <label for="email">Pain type</label></br>
			   <input type="radio" style="height:1em; width:1em;"  name="category" <?php if($details['categories'] == 'Constant'){ echo 'checked'; }  ?> id="category1" value="Constant">                          
				<label for="category1">Constant&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
			   <input type="radio" style="height:1em; width:1em;" name="category" id="category2" <?php if($details['categories'] == 'Intermittent'){ echo 'checked'; }  ?> value="Intermittent" >
                <label for="category2">Intermittent&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
			   <input type="radio" style="height:1em; width:1em;" name="category" id="category3" <?php if($details['categories'] == 'Sharp'){ echo 'checked'; }  ?> value="Sharp" >
                <label for="category3">Sharp&nbsp;&nbsp;&nbsp; </label>
			   <input type="radio"  style="height:1em; width:1em;" name="category" id="category4" <?php if($details['categories'] == 'Dull ache'){ echo 'checked'; }  ?> value="Dull ache" >
                <label for="category4">Dull ache&nbsp;&nbsp;&nbsp; </label>
			   <input type="radio" style="height:1em; width:1em;" name="category" id="category5" <?php if($details['categories'] == 'Throbbing'){ echo 'checked'; }  ?> value="Throbbing" >
                <label for="category5">Throbbing&nbsp;&nbsp;&nbsp; </label>
			   <input type="radio" style="height:1em; width:1em;" name="category" id="category6" <?php if($details['categories'] == 'Radiates'){ echo 'checked'; }  ?> value="Radiates" >
                <label for="category6">Radiates&nbsp;&nbsp;&nbsp;</label>
			    <input type="radio" style="height:1em; width:1em;"  name="category" id="category7" <?php if($details['categories'] == 'Moves'){ echo 'checked'; }  ?> value="Moves" >
                <label for="category7">Moves&nbsp;&nbsp;&nbsp; </label>
			   <input type="radio" style="height:1em; width:1em;" name="category" id="category8" <?php if($details['categories'] == 'Static'){ echo 'checked'; }  ?> value="Static" >
                <label for="category8">Static&nbsp;&nbsp; </label>
			or 
			<input type="text" name="categories" id="categories" value="<?php echo $details['categories']; ?>" class="form-control input-sm" placeholder="" >
		
		</div>
		<div class="form-group col-md-12 col-sm-12">
                </br> <label for="email">Pain worse&nbsp;&nbsp;&nbsp;&nbsp;</label></br>
              <input type="radio" style="height:1em; width:1em;"  name="worse" id="worse1" <?php if($details['worse'] == 'am'){ echo 'checked'; }  ?> value="am" >
                <label for="worse1">am&nbsp;&nbsp; </label>
			    <input type="radio" style="height:1em; width:1em;" name="worse" id="worse2" <?php if($details['worse'] == 'pm'){ echo 'checked'; }  ?> value="pm" >
                <label for="worse2">pm &nbsp;&nbsp;</label>
			   <input type="radio" style="height:1em; width:1em;" name="worse" id="worse3" <?php if($details['worse'] == 'activity'){ echo 'checked'; }  ?> value="activity" >
                <label for="worse3">activity&nbsp;&nbsp;  </label>
				<input type="radio" style="height:1em; width:1em;" name="worse" id="worse4" <?php if($details['worse'] == 'dependent'){ echo 'checked'; }  ?> value="dependent" >
                <label for="worse4">dependent&nbsp;&nbsp;   </label>
		</div>
		<div class="form-group col-md-12 col-sm-12">
            <label for="email">Aggravating factors&nbsp;&nbsp;&nbsp;</label></br>
			   <input type="radio"  name="Aggravating" id="Aggravating1" <?php if($details['Aggravating_factors'] == 'Walking'){ echo 'checked'; }  ?> value="Walking">                          
				<label for="Aggravating1">Walking &nbsp;&nbsp;&nbsp;</label>
			   <input type="radio"  name="Aggravating" id="Aggravating2" <?php if($details['Aggravating_factors'] == 'Stairs'){ echo 'checked'; }  ?> value="Stairs" >
                <label for="Aggravating2">Stairs &nbsp;&nbsp;&nbsp;</label>
			   <input type="radio"  name="Aggravating" id="Aggravating3" <?php if($details['Aggravating_factors'] == 'Sports'){ echo 'checked'; }  ?> value="Sports" >
                <label for="Aggravating3">Sports &nbsp;&nbsp;&nbsp;</label>
				<input type="radio"  name="Aggravating" id="Aggravating4" <?php if($details['Aggravating_factors'] == 'Rest'){ echo 'checked'; }  ?> value="Rest" >
                <label for="Aggravating4">Rest &nbsp;&nbsp;&nbsp;</label>
				<input type="radio"  name="Aggravating" id="Aggravating5" <?php if($details['Aggravating_factors'] == 'Standing'){ echo 'checked'; }  ?> value="Standing" >
                <label for="Aggravating5">Standing&nbsp;&nbsp;&nbsp; </label>
				or 
			<input type="text" id="Aggravating_factors" name="Aggravating_factors" value="<?php echo $details['Aggravating_factors']; ?>" class="form-control input-sm" placeholder="" >
		</div>
		<div class="form-group col-md-12 col-sm-12">
            <label for="email">Relieving factors:&nbsp;&nbsp;&nbsp;&nbsp;</label>
			<input type="radio" style="height:1em; width:1em;"  name="Relieving" id="Relieving1" <?php if($details['Relieving_factors'] == 'Rest'){ echo 'checked'; }  ?> value="Rest" >
                <label for="Relieving1">Rest &nbsp;&nbsp;</label>
			   <input type="radio" style="height:1em; width:1em;" name="Relieving" id="Relieving3" <?php if($details['Relieving_factors'] == 'Positioning'){ echo 'checked'; }  ?> value="Positioning" >
                <label for="Relieving3">Positioning&nbsp;&nbsp;  </label>
				<input type="radio" style="height:1em; width:1em;" name="Relieving" id="Relieving4" <?php if($details['Relieving_factors'] == 'NSAIDS'){ echo 'checked'; }  ?> value="NSAIDS" >
                <label for="Relieving4">NSAIDS&nbsp;&nbsp;   </label>
				or 
				<input type="text" id="Relieving_factors" name="Relieving_factors" value="<?php echo $details['Relieving_factors']; ?>" class="form-control input-sm" placeholder="" >
		</div>
		</br></br></br></br></br></br></br></br></br>
		<div class="form-group col-md-12 col-sm-12">FUNCTIONAL</div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="email">Standing posture </label>
            <input type="text" name="posture" value="<?php echo $details['posture']; ?>" class="form-control input-sm" placeholder="" >
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="email"><strong>Walking aid/brace: </strong></label>
            <input type="text" name="Walking" value="<?php echo $details['Walking']; ?>" class="form-control input-sm" placeholder="" >
        </div>
		<div class="form-group col-md-3 col-sm-6">
            <label for="email"><strong>Gait/Wt.bearing: </strong></label>
            <input type="text" name="bearing" value="<?php echo $details['bearing']; ?>" class="form-control input-sm" placeholder="" >
        </div>
		</br></br></br>
		<div class="form-group col-md-12 col-sm-12">EXAMINATION</div>
		<table>
		<tr><td>  </td><td colspan="3">Left</td><td colspan="3">Right</td></tr>
		<tr><td>  </td><td colspan="2">R.O.M</td><td rowspan="2"><center>MMT</center></td><td colspan="2">R.O.M</td><td rowspan="2"><center>MMT</center></td></tr>
		<tr><td>  </td><td>Active</td><td>Passive</td><td>Active</td><td>Passive</td></tr>
		<tr><td> Flexion </td><td><input type="text" name="flexl_active" value="<?php echo $details['flexl_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="flexl_passive" value="<?php echo $details['flexl_passive']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="flexl_mmt" value="<?php echo $details['flexl_mmt']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="flexr_active" value="<?php echo $details['flexr_active']; ?>" class="form-control input-sm" placeholder="" > </td>
		<td><input type="text" name="flexr_passive" value="<?php echo $details['flexr_passive']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="flexr_mmt" value="<?php echo $details['flexr_mmt']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Extension  </td>
		<td><input type="text" name="exl_active" value="<?php echo $details['exl_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="exl_passive" value="<?php echo $details['exl_passive']; ?>" class="form-control input-sm" placeholder="" > </td>
		<td><input type="text" name="exl_mmt" value="<?php echo $details['exl_mmt']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="exr_active" value="<?php echo $details['exr_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="exr_passive" value="<?php echo $details['exr_passive']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="exr_mmt" value="<?php echo $details['exr_mmt']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Ankle   </td>
		<td><input type="text" name="anklel_active" value="<?php echo $details['anklel_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="anklel_passive" value="<?php echo $details['anklel_passive']; ?>" class="form-control input-sm" placeholder="" > </td>
		<td><input type="text" name="anklel_mmt" value="<?php echo $details['anklel_mmt']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="ankler_active" value="<?php echo $details['ankler_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="ankler_passive" value="<?php echo $details['ankler_passive']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="ankler_mmt" value="<?php echo $details['ankler_mmt']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Hip  </td>
		<td><input type="text" name="hipl_active" value="<?php echo $details['hipl_active']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="hipl_passive" value="<?php echo $details['hipl_passive']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="hipl_mmt" value="<?php echo $details['hipl_mmt']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="hipr_active" value="<?php echo $details['hipr_active']; ?>" class="form-control input-sm" placeholder="" > </td>
		<td><input type="text" name="hipr_passive" value="<?php echo $details['hipr_passive']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="hipr_mmt" value="<?php echo $details['hipr_mmt']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		</table>
		</br></br></br>
        <h4>SPECIAL TESTS</h4>
		<table>
		<tr><td> Tests </td><td>Description</td><td>Left</td><td>Right</td></tr>
		<tr><td> Ant. Draw (ACL)</td><td>Bend knee, stabilize foot  pull tibia and fibula anteriorly</td>
		<td><input type="text" name="ant_left" value="<?php echo $details['ant_left']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="ant_right" value="<?php echo $details['ant_right']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Post Draw (PCL) </td><td>Bend knee, stabilize foot  push tibia and fibula posteriorly</td>
		<td><input type="text" name="post_left" value="<?php echo $details['post_left']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="post_right" value="<?php echo $details['post_right']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td>McMurrays Test (M/L Meniscus) </td><td>Medial: Bend knee fully, ER foot  apply valgus force  ext knee </br> Lateral: Bend knee fully, IR foot  apply varus force  ext knee </td>
		<td><input type="text" name="McMurrays_left" value="<?php echo $details['McMurrays_left']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="McMurrays_right" value="<?php echo $details['McMurrays_right']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Pivot shift </td><td>Hold heel  IR foot, apply axial load and valgus force  flex knee</td>
		<td><input type="text" name="Pivot_left" value="<?php echo $details['Pivot_left']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="Pivot_right" value="<?php echo $details['Pivot_right']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Patellar glide </td><td>Hold both sides of patella with thumb and index  move in various directions </td>
		<td><input type="text" name="Patellar_left" value="<?php echo $details['Patellar_left']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="Patellar_right" value="<?php echo $details['Patellar_right']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Varus Stress Test (MCL) </td><td>One hand on inner thigh applying lateral force, one on outer leg applying medial force</td>
		<td><input type="text" name="Varusmcl_left" value="<?php echo $details['Varusmcl_left']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="Varusmcl_right" value="<?php echo $details['Varusmcl_right']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Varus Stress Test (LCL) </td><td>One hand on outer thigh applying medial force, one on inner leg applying lateral force</td>
		<td><input type="text" name="Varuslcl_left" value="<?php echo $details['Varuslcl_left']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="Varuslcl_right" value="<?php echo $details['Varuslcl_right']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Lachman </td><td>Flex knee to 30º  Pull tibia anteriorly with other hand on ant thigh</td>
		<td><input type="text" name="Lachman_left" value="<?php echo $details['Lachman_left']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="Lachman_right" value="<?php echo $details['Lachman_right']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Popliteal test </td><td>Flex hip to 90º, extend knee maximally</td>
		<td><input type="text" name="Popliteal_left" value="<?php echo $details['Popliteal_left']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="Popliteal_right" value="<?php echo $details['Popliteal_right']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
		<tr><td> Valgus Stress Test (MCL) </td><td>Lying supine, ensures a neutral pelvis position with knees flexed and straighten legs.</br> Give a short tug on patients ankles and compare leg length.</td>
		<td><input type="text" name="Valgus_left" value="<?php echo $details['Valgus_left']; ?>" class="form-control input-sm" placeholder=""></td>
		<td><input type="text" name="Valgus_right" value="<?php echo $details['Valgus_right']; ?>" class="form-control input-sm" placeholder="" > </td></tr>
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