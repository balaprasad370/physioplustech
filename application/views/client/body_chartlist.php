<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
     
	<meta name="msapplication-tap-highlight" content="no">
	 
	<link href="<?php echo base_url()?>asset_list/main.css" rel="stylesheet">
	<link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.gritter.css" />
	<style>
.parsley-error-list{
	color:red;
}
label, th, .td{
	font-weight:bold;
	color:#3f6ad8;
}
</style>
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    
				<?php include("sidebar.php");?>
            <div class="app-main__outer">
                <div class="app-main__inner">
                               
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
						 
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title"> This Feature Works Best in Desktops or Larger Screens
								</h5>
                                  
 				  <p style="float:right;"><a href="<?php echo base_url().'client/patient/view/'.$this->uri->segment('4'); ?>" class="btn btn-info" >Back</a>
				   </p>
				   <center>
				   <button class="mb-2 mr-2 btn-pill btn btn-success" id="one">Click To Baby Chart</button>
				   <button class="mb-2 mr-2 btn-pill btn btn-success" id="two">Click To Body Chart</button>
				   <button class="mb-2 mr-2 btn-pill btn btn-success" id="three">Click To Woman Chart</button>
				     
					  <div id="progress">
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<center><span class="saveAppoinmentLoader"><span><img src="<?php echo base_url().'img/spinner.gif'; ?>"><h4><font color="red">Saving Please Wait....</font></h4></span></span></center>
				  </div>
				  
				  <select name="triggerpoint" class="chosen-select form-control" id="triggerpoint">
					<option value="">Select Trigger Point Chart<option>
					<option value="AbdominalObliques">Abdominal Obliques</option>						
					<option value="Trapezius">Trapezius</option> 
					<option value="Abductor_Digiti_Minimi_Foot">Abductor Digiti Minimi (Foot)</option>
					<option value="Abductor_Digiti_Minimi_Hand">Abductor Digiti Minimi (Hand) </option>
					<option value="Abductor_Hallucis">Abductor Hallucis</option>
					<option value="Adductor_Pollicis">Adductor Pollicis</option>
					<option value="Anconeus">Anconeus</option>
					<option value="Adductor_Magnus">Adductor_Magnus</option>
					<option value="Adductor_Longus">Adductor_Longus</option>
					<option value="biceps_brachii" >Biceps Brachii</option>
					<option value="biceps_femoris" >Biceps Femoris</option>
					<option value="brachialis" >Brachialis</option>
					<option value="brachioradialis" >Brachioradialis</option>
					<option value="buccinator" >Buccinator</option>
					<option value="coccygeus" >Coccygeus</option>
					<option value="coracobrachialis" >Coracobrachialis</option>
					<option value="deltoid" >Deltoid</option>
					<option value="digastric" >Digastric</option>
					<option value="extensor_carpi_radialis_brevis" >Extensor Carpi Radialis Brevis</option>
					<option value="extensor_carpi_radialis_longus" >Extensor Carpi Radialis Longus</option>
					<option value="extensor_carpi_ulnaris" >Extensor Carpi Ulnaris</option>
					<option value="extensor_digitorum" >Extensor Digitorum</option>
					<option value="extensor_digitorum_brevis" >Extensor Digitorum Brevis</option>
					<option value="extensor_digitorum_longus" >Extensor Digitorum Longus</option>
					<option value="extensor_hallucis_brevis" >Extensor Hallucis Brevis</option>
					<option value="extensor_hallucis_longus" >Extensor Hallucis Longus</option>
					<option value="extensor_indicis" >Extensor Indicis</option>
					<option value="first_dorsal_interosseus" >First Dorsal Interosseus</option>
					<option value="flexor_carpi_radialis" >Flexor Carpi Radialis</option>
					<option value="flexor_carpi_ulnaris" >Flexor Carpi Ulnaris</option>
					<option value="flexor_digitorum_brevis_foot" >Flexor Digitorum Brevis (Foot)</option>
					<option value="flexor_digitorum_longus">Flexor Digitorum Longus</option>
					<option value="flexor_digitorum_profundus" >Flexor Digitorum Profundus</option>
					<option value="flexor_digitorum_superficialis" >Flexor Digitorum Superficialis</option>
					<option value="flexor_hallucis_brevis" >Flexor Hallucis Brevis</option>
					<option value="flexor_hallucis_longus" >Flexor Hallucis Longus</option>
					<option value="flexor_pollicis_longus" >Flexor Pollicis Longus</option>
					<option value="frontalis" >Frontalis</option>
					<option value="gastrocnemius" >Gastrocnemius</option>
					<option value="gluteus_maximus" >Gluteus Maximus</option>
					<option value="gluteus_medius" >Gluteus Medius</option>
					<option value="gluteus_minimus" >Gluteus Minimus</option>
					<option value="gracilis" >Gracilis</option>
					<option value="iliocostalis_lumborum" >Iliocostalis Lumborum</option>
					<option value="iliocostalis_thoracis" >Iliocostalis Thoracis</option>
					<option value="iliopsoas" >Iliopsoas</option>
					<option value="infraspinatus" >Infraspinatus</option>
					<option value="intercostals" >Intercostals</option>
					<option value="interossei_of_foot" >Interossei of Foot</option>
					<option value="lateral_pterygoid" >Lateral Pterygoid</option>
					<option value="latissimus_dorsi" >Latissimus Dorsi</option>
					<option value="levator_ani" >Levator Ani</option>
					<option value="levator_scapulae" >Levator Scapulae</option>
					<option value="longissimus_thoracis" >Longissimus Thoracis</option>
					<option value="masseter" >Masseter</option>
					<option value="medial_pterygoid" >Medial Pterygoid</option>
					<option value="multifidi" >Multifidi</option>
					<option value="obliquus_externus_abdominis" >Obliquus Externus Abdominis</option>
					<option value="obturator_internus" >Obturator Internus</option>
					<option value="occipitalis" >Occipitalis</option>
					<option value="opponens_pollicis" >Opponens Pollicis</option>
					<option value="orbicularis_oculi" >Orbicularis Oculi</option>
					<option value="palmaris_longus" >Palmaris Longus</option>
					<option value="pectineus" >Pectineus</option>
					<option value="pectoralis_major" >Pectoralis Major</option>
					<option value="pectoralis_minimus" >Pectoralis Minimus</option>
					<option value="pelvic_floor" >Pelvic Floor</option>
					<option value="peroneus_brevis" >Peroneus Brevis</option>
					<option value="peroneus_longus" >Peroneus Longus</option>
					<option value="peroneus_tertius" >Peroneus Tertius</option>
					<option value="piriformis" >Piriformis</option>
					<option value="plantaris" >Plantaris</option>
					<option value="platysma" >Platysma</option>
					<option value="popliteus" >Popliteus</option>
					<option value="pronator_teres" >Pronator Teres</option>
					<option value="pyramidalis" >Pyramidalis</option>
					<option value="quadratus_lumborum" >Quadratus Lumborum</option>
					<option value="quadratus_plantae" >Quadratus Plantae</option>
					<option value="rectus_abdominis" >Rectus Abdominis</option>
					<option value="rectus_femoris" >Rectus Femoris</option>
					<option value="rhomboid" >Rhomboid</option>
					<option value="sartorius" >sartorius</option>
					<option value="scalene" >Scalene</option>
					<option value="semimembranosus" >Semimembranosus</option>
					<option value="semispinalis_capitis" >Semispinalis Capitis</option>
					<option value="semitendinosus" >Semitendinosus</option>
					<option value="serratus_anterior" >Serratus Anterior</option>
					<option value="serratus_posterior_inferior" >Serratus Posterior Inferior</option>
					<option value="serratus_posterior_superior" >Serratus Posterior Superior</option>
					<option value="soleus" >Soleus</option>
					<option value="sphincter_ani" >Sphincter Ani</option>
					<option value="splenius_capitis" >Splenius Capitis</option>
					<option value="splenius_cervicis" >Splenius Cervicis</option>
					<option value="sternalis" >Sternalis</option>
					<option value="sternocleidomastoid" >Sternocleidomastoid</option>
					<option value="subclavius" >Subclavius</option>
					<option value="suboccipital_group" >Suboccipital Group</option>
					<option value="subscapularis" >Subscapularis</option>
					<option value="supinator" >Supinator</option>
					<option value="supraspinatus" >Supraspinatus</option>
					<option value="temporalis" >Temporalis</option>
					<option value="tensor_fasciae_latae" >Tensor Fasciae Latae</option>
					<option value="teres_major" >Teres Major</option>
					<option value="teres_minor" >Teres Minor</option>
					<option value="tibialis_anterior" >Tibialis Anterior</option>
					<option value="tibialis_posterior" >Tibialis Posterior</option>
					<option value="trapezius" >Trapezius</option>
					<option value="Triceps_brachii" >Triceps Brachii</option>
					<option value="vastus_intermedius" >Vastus Intermedius</option>
					<option value="vastus_lateralis" >Vastus Lateralis</option>
					<option value="vastus_medialis" >Vastus Medialis</option>
					<option value="zygomaticus" >Zygomaticus</option>
					
					</select>
					<input type="hidden" id="patient_id" value="<?php echo $this->uri->segment(4); ?>" name="id" >
								<div id="wPaint" style="position:relative; width:500px; height:500px; margin:70px auto 20px auto;"></div>

                                <center id="wPaint-img"></center>								
	  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                   </div>
				   </div>   
				   </div>  
				   
     
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
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
   <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> 
 <script src="<?php echo base_url(); ?>assets/js/jquery.gritter.min.js"></script>    
<script>

$('select').select2();
	$('#progress').hide();
	 var why = $('input[name="id"]').val();
	$(document).ready(function() { 
	 var images = [
          '/test/uploads/wPaint.png',
        ];

         function saveImg(image) {
	       
			var _this = this;
		
			
			$.ajax({
            type: 'POST',  
			url : '<?php echo base_url(); ?>client/patient/body_chart', 
			cache : false,
            data: {image:image,id:why},
			
		 beforeSend: function(){
			$('.saveAppoinmentLoader > span').show(); 
			$('#progress').show();
			
		},
			
            success: function (resp) {
			$('.saveAppoinmentLoader > span').hide(); 
			$('#progress').hide();
			
			$.gritter.add({title:'Success',text:	'Chart saved successfully'});
			//parent.location.reload();
			var id=$('#patient_id').val();
		    window.top.location.href="<?php echo base_url()?>client/patient/view/"+id;
            var id=('#patient_id').val();
            	
				
		 
			 //alert('Image Saved Successfully');
             //_this._displayStatus('<h1><font color="red">Image saved successfully</font></h1>');
              resp = $.parseJSON(resp);  
              images.push(resp.img);
            // $('#wPaint-img').attr('src', images);
			  
			$('#wPaint').wPaint('image', '<?php echo base_url()?>baby.png')
     		
			  
			  
			
			  },
          });
		 
		}

        function loadImgBg () {

          // internal function for displaying background images modal
          // where images is an array of images (base64 or url path)
          // NOTE: that if you can't see the bg image changing it's probably
          // becasue the foregroud image is not transparent.
          this._showFileModal('bg', images);
        }

        function loadImgFg () {

          // internal function for displaying foreground images modal
          // where images is an array of images (base64 or url path)
          this._showFileModal('fg', images);
        }

		$('#one').click(function() {
		  $('#wPaint').wPaint('image', '<?php echo base_url()?>baby.png')
     	});
		
		 $('#two').click(function() {		
		        $('#wPaint').wPaint('image', '<?php echo base_url()?>pain-chart-blank.JPG')
		 });
		$('#three').click(function() {
				$('#wPaint').wPaint('image', '<?php echo base_url()?>woman.gif')
     	});
		
		$(document).ready(function(){
			$('#wPaint').wPaint('image', '<?php echo base_url()?>pain-chart-blank.JPG')
		});
		
		$('#triggerpoint').change(function() {
		var image= $('#triggerpoint').val();
		if(image=='AbdominalObliques')
		{
			$('#wPaint').wPaint('image', '<?php echo base_url()?>triggerchart/chart1.jpg')
		}
		else if(image=="Trapezius")
		{
			$('#wPaint').wPaint('image', '<?php echo base_url()?>triggerchart/combine_images.png')
		}
		else if(image=='Abductor_Digiti_Minimi_Foot')
		{
			$('#wPaint').wPaint('image', '<?php echo base_url()?>triggerchart/chart2.jpg')
		}
		else if(image=='Abductor_Digiti_Minimi_Hand')
		{
			$('#wPaint').wPaint('image', '<?php echo base_url()?>triggerchart/test.jpg')
		}
		else if(image=='Abductor_Hallucis')
		{
			$('#wPaint').wPaint('image', '<?php echo base_url()?>triggerchart/Abductor_Hallucis.jpg')
		}
		else if(image=='Adductor_Pollicis')
		{
			$('#wPaint').wPaint('image', '<?php echo base_url()?>triggerchart/chart6.jpg')
		}
		else if(image=='Anconeus')
		{
			$('#wPaint').wPaint('image', '<?php echo base_url()?>triggerchart/chart7.jpg')
		}
		else if(image=='Adductor_Magnus')
		{
			$('#wPaint').wPaint('image', '<?php echo base_url()?>triggerchart/AdductorMagnus.jpg')
		}
		else if(image=='Adductor_Longus')
		{
			$('#wPaint').wPaint('image', '<?php echo base_url()?>triggerchart/AdductorLongusBrevis.jpg')
		}
		else if(image=='Adductor_magnus')
		{
			$('#wPaint').wPaint('image', '<?php echo base_url()?>triggerchart/AdductorLongusBrevis.jpg')
		}
		else if(image=='Adductor_pollicis')
		{
			$('#wPaint').wPaint('image', '<?php echo base_url()?>triggerchart/AdductorLongusBrevis.jpg')
		}
		else if(image=='anconeus')
		{
			$('#wPaint').wPaint('image', '<?php echo base_url()?>triggerchart/AdductorLongusBrevis.jpg')
		}
		
		else if(image == 'biceps_brachii'){
		$('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Biceps%20Brachii.jpg');
		}
		else if(image == 'biceps_femoris'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Biceps%20Femoris.png');
		}
		else if(image == 'brachialis'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Brachialis.jpg');
		}
		else if(image == 'brachioradialis'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Brachioradialis.jpg');
		}
		else if(image == 'buccinator'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Buccinator.jpg');
		}
		else if(image == 'coccygeus'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Coccygeus.jpg');
		}
		else if(image == 'coracobrachialis'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Coracobrachialis.jpg');
		}
		else if(image == 'deltoid'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Deltoid.jpg');
		}
		else if(image == 'digastric'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Digastric.jpg');
		}
		else if(image == 'extensor_carpi_radialis_brevis'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Extensor%20Carpi%20Radialis%20Brevis.jpg');
		}
		else if(image == 'extensor_carpi_radialis_longus'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Extensor%20Carpi%20Radialis%20Longus.jpg');
		}
		else if(image == 'extensor_carpi_ulnaris'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Extensor%20Carpi%20Ulnaris.jpg');
		}
		else if(image == 'extensor_digitorum'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Extensor%20Digitorum.jpg');
		}
		else if(image == 'extensor_digitorum_brevis'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Extensor%20Digitorum%20Brevis.jpg');
		}
		else if(image == 'extensor_digitorum_longus'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Extensor%20Digitorum%20Longus.jpg');
		}
		else if(image == 'extensor_hallucis_brevis'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Extensor%20Hallucis%20Brevis.jpg');
		}
		else if(image == 'extensor_hallucis_longus'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Extensor%20Hallucis%20Longus.jpg');
		}
		else if(image == 'extensor_indicis'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Extensor%20Indicis.jpg');
		}
		else if(image == 'first_dorsal_interosseus'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/First%20Dorsal%20Interosseus.jpg');
		}
		else if(image == 'flexor_carpi_radialis'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Flexor%20Carpi%20Radialis.jpg');
		}
		else if(image == 'flexor_carpi_ulnaris'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Flexor%20Carpi%20Ulnaris.jpg');
		}
		else if(image == 'flexor_digitorum_brevis_foot'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Flexor%20Digitorum%20Brevis%20%28Foot%29.jpg');
		}
		else if(image == 'flexor_digitorum_longus'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Flexor%20Digitorum%20Longus.jpg');
		}
		else if(image == 'flexor_digitorum_profundus'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Flexor%20Digitorum%20Profundus.jpg');
		}
		else if(image == 'flexor_digitorum_superficialis'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Flexor%20Digitorum%20Superficialis.jpg');
		}
		else if(image == 'flexor_hallucis_brevis'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Flexor%20Hallucis%20Brevis.jpg');
		}
		else if(image == 'flexor_hallucis_longus'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Flexor%20Hallucis%20Longus.jpg');
		}
		else if(image == 'flexor_pollicis_longus'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Flexor%20Pollicis%20Longus.jpg');
		}
		else if(image == 'frontalis'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Frontalis.jpg');
		}
		else if(image == 'gastrocnemius'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Gastrocnemius.jpg');
		}
		else if(image == 'gluteus_maximus'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Gluteus%20Maximus.png');
		}
		else if(image == 'gluteus_medius'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Gluteus%20Medius.jpg');
		}
		else if(image == 'gluteus_minimus'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Gluteus%20Minimus.jpg');
		}
		else if(image == 'gracilis'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Gracilis.jpg');
		}
		else if(image == 'iliocostalis_lumborum'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Iliocostalis%20Lumborum.png');
		}
		else if(image == 'iliocostalis_thoracis'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Iliocostalis%20Thoracis.png');
		}
		else if(image == 'iliopsoas'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Iliopsoas.png');
		}
		else if(image == 'infraspinatus'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Infraspinatus.jpg');
		}
		else if(image == 'intercostals'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Intercostals.jpg');
		}
		else if(image == 'interossei_of_foot'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Interossei%20of%20Foot.jpg');
		}
		else if(image == 'lateral_pterygoid'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Lateral%20Pterygoid.jpg');
		}
		else if(image == 'latissimus_dorsi'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Latissimus%20Dorsi.jpg');
		}
		else if(image == 'levator_ani'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Levator%20Ani.jpg');
		}
		else if(image == 'levator_scapulae'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Levator%20Scapulae.jpg');
		}
		else if(image == 'longissimus_thoracis'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Longissimus%20Thoracis.png');
		}
		else if(image == 'masseter'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Masseter.jpg');
		}
		else if(image == 'medial_pterygoid'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Medial%20Pterygoid.jpg');
		}
		else if(image == 'multifidi'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Multifidi.png');
		}
		else if(image == 'obliquus_externus_abdominis'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Obliquus%20Externus%20Abdominis.jpg');
		}
		else if(image == 'obturator_internus'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Obturator%20Internus.jpg');
		}
		else if(image == 'occipitalis'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Occipitalis.jpg');
		}
		else if(image == 'opponens_pollicis'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Opponens%20Pollicis.jpg');
		}
		else if(image == 'orbicularis_oculi'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Orbicularis%20Oculi.jpg');
		}
		else if(image == 'palmaris_longus'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Palmaris%20Longus.jpg');
		}
		else if(image == 'pectineus'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Pectineus.jpg');
		}
		else if(image == 'pectoralis_major'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Pectoralis%20Major.jpg');
		}
		else if(image == 'pectoralis_minimus'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Pectoralis%20Minimus.jpg');
		}
		else if(image == 'pelvic_floor'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Pelvic%20Floor.jpg');
		}
		else if(image == 'peroneus_brevis'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Peroneus%20Brevis.jpg');
		}
		else if(image == 'peroneus_longus'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Peroneus%20Longus.jpg');
		}
		else if(image == 'peroneus_tertius'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Peroneus%20Tertius.jpg');
		}
		else if(image == 'piriformis'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Piriformis.jpg');
		}
		else if(image == 'plantaris'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Plantaris.jpg');
		}
		else if(image == 'platysma'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Platysma.jpg');
		}
		else if(image == 'popliteus'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Popliteus.jpg');
		}
		else if(image == 'pronator_teres'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Pronator%20Teres.jpg');
		}
		else if(image == 'pyramidalis'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Pyramidalis.jpg');
		}
		else if(image == 'quadratus_lumborum'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Quadratus%20Lumborum.jpg');
		}
		else if(image == 'quadratus_plantae'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Quadratus%20Plantae.jpg');
		}
		else if(image == 'rectus_abdominis'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Rectus%20Abdominis.jpg');
		}
		else if(image == 'rectus_femoris'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Rectus%20Femoris.jpg');
		}
		else if(image == 'rhomboid'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Rhomboid.jpg');
		}
		else if(image == 'sartorius'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Sartorius.jpg');
		}
		else if(image == 'scalene'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Scalene.jpg');
		}
		else if(image == 'semimembranosus'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Semimembranosus.png');
		}
		else if(image == 'semispinalis_capitis'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Semispinalis%20Capitis.jpg');
		}
		else if(image == 'semitendinosus'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Semitendinosus.png');
		}
		else if(image == 'serratus_anterior'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Serratus%20Anterior.jpg');
		}
		else if(image == 'serratus_posterior_inferior'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Serratus%20Posterior%20Inferior.png');
		}
		else if(image == 'serratus_posterior_superior'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Serratus%20Posterior%20Superior.jpg');
		}
		else if(image == 'soleus'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Soleus.jpg');
		}
		else if(image == 'sphincter_ani'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Sphincter%20Ani.jpg');
		}
		else if(image == 'splenius_capitis'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Splenius%20Capitis.jpg');
		}
		else if(image == 'splenius_cervicis'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Splenius%20Cervicis.jpg');
		}
		else if(image == 'sternalis'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Sternalis.jpg');
		}
		else if(image == 'sternocleidomastoid'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Sternocleidomastoid.jpg');
		}
		else if(image == 'subclavius'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Subclavius.jpg');
		}
		else if(image == 'suboccipital_group'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Suboccipital%20Group.jpg');
		}
		else if(image == 'subscapularis'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Subscapularis.jpg');
		}
		else if(image == 'supinator'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Supinator.jpg');
		}
		else if(image == 'supraspinatus'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Supraspinatus.jpg');
		}
		else if(image == 'temporalis'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Temporalis.jpg');
		}
		else if(image == 'tensor_fasciae_latae'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Tensor%20Fasciae%20Latae.jpg');
		}
		else if(image == 'teres_major'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Teres%20Major.jpg');
		}
		else if(image == 'teres_minor'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Teres%20Minor.jpg');
		}
		else if(image == 'tibialis_anterior'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Tibialis%20Anterior.jpg');
		}
		else if(image == 'tibialis_posterior'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Tibialis%20Posterior.jpg');
		}
		else if(image == 'trapezius'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Trapezius.jpg');
		}
		else if(image == 'Triceps_brachii'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Triceps%20Brachii.jpg');
		}
		else if(image == 'vastus_intermedius'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Vastus%20Intermedius.jpg');
		}
		else if(image == 'vastus_lateralis'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Vastus%20Lateralis.jpg');
		}
		else if(image == 'vastus_medialis'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Vastus%20Medialis.jpg');
		}
		else if(image == 'zygomaticus'){
		 $('#wPaint').wPaint('image','<?php echo base_url()?>triggerchart/Zygomaticus.jpg');
		}
		
		
	});
		
	
        // init wPaint
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
