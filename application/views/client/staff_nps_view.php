<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Clinic Statistics - Physio Plus Tech</title>  
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
    <meta name="msapplication-tap-highlight" content="no">
    <link href="<?php echo base_url()?>my_assets/main.css" rel="stylesheet">
	 <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/daterangepicker-bs3.css" />
	<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.peity.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.colorbox-min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/moment.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/daterangepicker.js"></script>
   	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/serial.js"></script>
	<script src="<?php echo base_url() ?>assets/sweet-alert/sweetalert.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/sweet-alert/sweetalert.css">
	
	 <style>
div
{
    text-align:center;
}
img
{
    vertical-align:middle;
}
.highcharts-credits{
	display:none;
}
</style>
</head>
   
 <body>
 <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
	<?php include("sidebar.php");?>
	<div class="app-main__outer">
        <div class="app-main__inner">	
		   <div class="row">
		   <div class="tab-content">
			<div class="tab-pane tabs-animation fade active show" id="tab-content-0" role="tabpanel">
				<div class="row">
				 <?php if(count($staff_details)>0){?>
				  <?php foreach($staff_details as $k=> $details){
					  $i= $k+1; 
					  ?>
				 
				  <!--<div class="col-md-4">-->
					<figure class="highcharts-figure" style='margin-left:15px'>
					<div class="main-card mb-4 card">
						<div class="card-header"><?=$details['first_name']?></div>		
						<div class="card-body">
                           
						
							<div id="container<?=$i;?>" class="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
							<input type="hidden" name="staff_id" value="<?=$details['staff_id']?>" id="staff_id">	
						
						
                         </div>
					</div>
					</figure>
				  <!--</div>-->
				  
				 <?php }}?>
				</div>	
			</div>
			</div>
		   </div>	
		</div>
	</div>		
 </div>
 <script type="text/javascript" src="<?php echo base_url()?>my_assets/assets/scripts/main.js"></script>
	<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.sparkline.min.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/accessibility.js"></script>
	<script>

	$(".container").each(function(index){
		
		var staff_id = $(this).next("#staff_id").val();
		
		var i = index+1;
		
		$.ajax({
	       type: "GET",
		   dataType:'json',
	       cache: false,
	       url: '<?php echo base_url().'client/dashboard/staff_npsdata'?>',
	       data: {'staff_id':staff_id},
	       success: function(details){
				//alert(details.data[index].y);
			Highcharts.chart('container'+i, {
				chart: {
					plotBackgroundColor: null,
					plotBorderWidth: 0,
					plotShadow: false
				},
				title: {
					text: details.data[index].y+"%",
					align: 'center',
					verticalAlign: 'middle',
					y: 60
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
				accessibility: {
					point: {
						valueSuffix: '%'
					}
				},
				plotOptions: {
					pie: {
						dataLabels: {
							enabled: false,
							distance: -50,
							style: {
								fontWeight: 'bold',
								color: 'white'
							}
						},
						startAngle: -90,
						endAngle: 90,
						center: ['50%', '75%'],
						size: '110%',
						showInLegend: true
					}
				},
				//var utl= '<?php echo base_url().'client/dashboard/make_bill' ?>';
				series: [{type:'pie',
							name:'NPS',
							innerSize:'80%',
							data:details.data
							}]
			});
		   }
		 })
	})
	
	

	</script>
 </body>
 </html>