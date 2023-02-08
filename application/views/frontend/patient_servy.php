<!DOCTYPE html>
<html>
	<head>
	 <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta http-equiv="Content-Language" content="en">
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
     <title>Daily Register - Physio Plus Tech</title>
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"    />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	 <meta name="msapplication-tap-highlight" content="no">
     <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
	 <link href="<?php echo base_url()?>my_assets/main.css" rel="stylesheet">
	 <script src="<?php echo base_url() ?>assets/sweet-alert/sweetalert.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/sweet-alert/sweetalert.css">
 </head>
<body>


   <style>
.sv-rating__item-text {
    min-width: 2.1500em;
    height: 2.3125em;
    display: inline-block;
    color: #9f9f9f;
    padding: 0 0.3125em;
    border: dotted 0.1000em #9f9f9f !important;
    text-align: center;
    font-size: 1em;
    line-height: 1.13;
    cursor: pointer;
    margin: 3px 0;
    margin-right: 0px !important;
    box-sizing: border-box;
    border-radius: 50%;
	font-family: "Roboto", sans-serif;
}
.sv-root-modern .sv-footer__complete-btn {
    background: rgba(0, 0, 0, 0) linear-gradient(to left, rgb(81, 70, 174), rgb(117, 96, 235)) repeat scroll 0% 0% !important;
}

.sv-rating__item--selected .sv-rating__item-text:hover {

    background: rgba(0, 0, 0, 0) linear-gradient(to left, rgb(81, 70, 174), rgb(117, 96, 235)) repeat scroll 0% 0% !important;

}
.sv-root-modern .sv-rating__item--selected .sv-rating__item-text {
	background: rgba(0, 0, 0, 0) linear-gradient(to left, rgb(81, 70, 174), rgb(117, 96, 235)) repeat scroll 0% 0% !important;
	border-color :rgba(0, 0, 0, 0) linear-gradient(to left, rgb(81, 70, 174), rgb(117, 96, 235)) repeat scroll 0% 0% !important;
	}
	.sv-root-modern .sv-rating input:focus + .sv-rating__min-text + .sv-rating__item-text, .sv-rating input:focus + .sv-rating__item-text {
    outline-color: rgb(117, 96, 235) !important;
}
.sv-root-modern .sv-question__title--answer {
    background-color: aliceblue !important;
}
.sv-title {
	font-size: 14px !important;
margin: 0 0 15px !important;
color: #716c80 !important;
line-height: 1.5 !important;
font-family: "Roboto", sans-serif !important;
}
.sv-question__required-text{
	display: none;
}
</style>


  
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">	  
         <div class="app-main__inner">
			<div class="tab-content">		
				<div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
					<div class="col-md-8 offset-md-2  mt-5 mt-5">
						<div class="card" style='padding-bottom:20px'>
							<input type="hidden" name='patient_id' value="<?=$patient_id?>" id="patient_id">
							<input type="hidden" name='staff_id' value="<?=$staff_id?>" id="staff_id">
							<h5 class="card-title"><center>
							<div class="header-logo">
								<a href="<?=base_url();?>"><img src="<?=base_url();?>frontend_assets/img/Physio+Logo_New.png" alt="logo" style="padding-bottom: 30px;"></a>
							</div>
							Patient Satisfaction Score</center></h5><hr>
							<div id="surveyElement" class=""></div>
							<div id="surveyResult"></div>
						</div>
					</div>
				</div>
			</div>
		</div>	
    
</div>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/prettify.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/lang-css.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui-1.11.1.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui.multidatespicker.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>my_assets/assets/scripts/main.js"></script></body>
<script src="<?php echo base_url();?>assets/parsley/parsley.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
<script src="<?php echo base_url();?>assets/js/unpkg/jquery"></script>
<script src="<?php echo base_url();?>assets/js/unpkg/survey.jquery.min.js"></script>
<link href="<?php echo base_url();?>assets/css/unpkg/modern.css" type="text/css" rel="stylesheet"/>
	<script>
Survey
    .StylesManager
    .applyTheme("modern");

var json = {
    //"completedHtml": "<h3>Thank you for your feedback.</h3> <h5>Your thoughts and ideas will help us to create a great product!</h5>",
    "completedHtmlOnCondition": [
        {
            "expression": "{nps_score} > 8 and {nps_score} <= 10",
            "html": "<h3>Thanks for your feedback.</h3> <h6>It’s great to hear that you like the services provided <?php echo $clinic_name;?> or <?php echo $staff_name; ?>. Your feedback helps us discover new opportunities to improve <?php echo $clinic_name;?> and make sure you have the best possible experience.</h6>"
        },
		{
            "expression": "{nps_score} > 6 and {nps_score} <= 8",
            "html": "<h3>Thanks for your feedback.</h3><h6> . Our goal is to create the best possible service for your better health. Your thoughts, ideas and suggestions play a major role in helping us identify opportunities to improve.</h6><br/>"
        },
		{
            "expression": "{nps_score} <= 6",
            "html": "<h3>Thanks for your feedback.</h3><h6> We highly value all ideas and suggestions from our patients/clients, whether they are positive or critical. In the future, our team might reach out to you to learn more about how we can further improve our service so that it exceeds your expectations.</h6><br/>"
        }
    ],
    "pages": [
        {
            "name": "page1",
            "elements": [
                {
                    "type": "rating",
                    "name": "nps_score",
                    "title": "How likely would you recommend  <?php echo $staff_name; ?> to people close to you ?",
                    "isRequired": true,
                    "rateMin": 0,
                    "rateMax": 10,
                    "minRateDescription": "(Most unlikely)",
                    "maxRateDescription": "(Most likely)"
                }, /* {
                    "type": "checkbox",
                    "name": "promoter_features",
                    "visibleIf": "{nps_score} >= 9",
                    "title": "What features do you value the most?",
                    "isRequired": true,
                    "validators": [
                        {
                            "type": "answercount",
                            "text": "Please select two features maximum.",
                            "maxCount": 2
                        }
                    ],
                    "hasOther": true,
                    "choices": [
                        "Performance", "Stability", "User Interface", "Complete Functionality"
                    ],
                    "otherText": "Other feature:",
                    "colCount": 2
                }, */ {
                    "type": "comment",
                    "name": "passive_experience",
                    "visibleIf": "{nps_score} >= 5  ",
                    "title": "We would love to know your comment on the above score"
                }, {
                    "type": "comment",
                    "name": "disappointed_experience",
                    "visibleIf": "{nps_score} < 5",
                    "title": "What do you miss and what was disappointing in your experience with us?"
                }
            ]
        }
    ],
    "showQuestionNumbers": "off"
};

window.survey = new Survey.Model(json);

survey.onComplete.add(function (result) {
          /*document
             .querySelector('#surveyResult')
            .textContent = "Result JSON:\n" + JSON.stringify(result.data, null, 3);*/
			 var staff_id = $("#staff_id").val(); 
			var patient_id = $("#patient_id").val();
			var disappointed_experience = result.data.disappointed_experience;
			var passive_experience = result.data.passive_experience;
			var npsurl = '<?=base_url()?>frontend/save_nps_score/';
			if(result.data.nps_score!='')
			{
				$.ajax
				({
					type: 'post',
					url:npsurl,
					data:{
							"nps_score":result.data.nps_score,
							"staff_id":staff_id,
							"patient_id":patient_id,
							"dp":disappointed_experience,
							"pe":passive_experience
						},
					success:function(data) 
					{
						
					}
				});
			} 
	});

$("#surveyElement").Survey({model: survey});
</script>
  </body>
</html>