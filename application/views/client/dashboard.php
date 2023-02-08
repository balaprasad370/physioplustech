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
   	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/amcharts.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/serial.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pie.js"></script>
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
</style>
</head>
   
 <body>

      <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    		<?php include("sidebar.php");?>
            <div class="app-main__outer">
                <div class="app-main__inner">
                     <div class="row">
					<div class="col-85" style="width:80%;">					 
                    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
					   
						<li class="nav-item">
                            <a class="nav-link print_tab " href="<?php echo base_url()?>client/dashboard/home" >
                                <span>Todays List </span>
                            </a>
                        </li>
						 <?php if($admin != false &&  !$this->session->userdata('staff_id')){  ?>
						<li class="nav-item">
                            <a class="nav-link clinic_tab" href="<?php echo base_url()?>client/dashboard/home" >
                                <span>Super Admin Dashboard </span>
                            </a>
                        </li>
						<?php } ?>
						<?php if($this->app_access->check_user_privileges('Clinic Statistics') ){ ?>
						<li class="nav-item">
                            <a class="nav-link clinic_tab active" href="<?php echo base_url()?>client/dashboard/home1" >
                                <span>Clinic Statistics</span>
                            </a>
                        </li>
						<?php }?>
                    </ul>
					</div>
					<!--<div class="print col" id="print" style="float:right;"></br><div style="float:right;" ><a class="btn btn-shadow btn-alternate" href="<?php echo base_url().'client/clinical_summary/report_print' ?>" target="_blank"><strong>Print</strong></a>
														&nbsp;&nbsp;&nbsp;</div>
					</div>-->
					</div>		
					 <div class="tab-content">
					 
						 <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
							<div class="row">
							<div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-night-fade">
                            <a href="<?php echo base_url().'client/schedule/appointment_list' ?>">
							<div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Total </div>
                                            <div class="widget-subheading">Appointments </div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $scheduleCount; ?></span></div>
                                        </div>
                                    </div></a>
                                </div>
                            </div>
                           
								<div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-arielle-smile">
                                     <a href="<?php echo base_url().'client/patient/patient_view' ?>" ><div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Total</div>
                                            <div class="widget-subheading"> Patients</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $patientCount; ?></span></div>
                                        </div>
                                    </div></a>
                                </div>
                            </div>
                           	<div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-happy-green">
                                     <a href="<?php echo base_url().'client/invoice/views' ?>" >
										<div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Total</div>
                                            <div class="widget-subheading">Income</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo 'Rs : '.number_format($incomeAmt); ?></span></div>
                                        </div>
                                    </div></a>
                                </div>
                            </div>
                    </div>
					<div class="row">
                            	<div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-sunny-morning">
                                   <a href="<?php echo base_url().'client/bill/expanse_view' ?>">
									<div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Total </div>
                                            <div class="widget-subheading">Expense </div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo 'Rs : '.number_format($expenseAmt); ?></span></div>
                                        </div>
                                    </div></a>
                                </div>
                            </div>
                            	<div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-ripe-malin">
                                   <a href="<?php echo base_url().'client/user/view' ?>" >
										<div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Total</div>
                                            <div class="widget-subheading"> Users</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $userCount; ?></span></div>
                                        </div>
                                    </div></a>
                                </div>
                            </div>
                            	<div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-midnight-bloom">
                                    <a href="<?php echo base_url().'client/referal/view_referal' ?>">
										<div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Total</div>
                                            <div class="widget-subheading">Referrals</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $referalCount; ?></span></div>
                                        </div>
                                    </div></a>
                                </div>
                            </div>
                    </div>
		 
		
		<div class="col-md-12">
		 </div>
		</br>
		 <div class="row">
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div id="reportrange" style="float:right; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
			  <i class="fa fa-calendar"></i>
			  <span></span> <b class="caret"></b>
		  </div>
		  <input type="hidden" class="span11" id="date_filter" name="date_filter" autocomplete="off" />
		  <input type="hidden" class="span11" id="dateString" name="dateString" autocomplete="off" />
		  <input type="hidden" class="span11" id="countString" name="countString" autocomplete="off" />
		  </div><div class="container-fluid">
		  <div class="quick-actions_homepage"></div>
            <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="mb-3 card">
                                <div class="card-header-tab card-header">
                                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><strong>New Patient Entry </strong> [Per Day]</div>
                                </div>
                                <div class="pt-0 card-body">
                                    <div id="chartdiv" style="width: 100%; height:362px;"></div>
								</div>
                            </div>
                        </div>
						<div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="mb-3 card">
                                <div class="card-header-tab card-header">
                                    <!--<div class="card-header-title font-size-lg text-capitalize font-weight-normal">Number of Patients Treated Per Day [Derived from session Reporting] </div>-->
									<div class="card-header-title font-size-lg text-capitalize font-weight-normal">Number of Patients Treated Per Day [daily register] </div>
								</div>
                                <div class="pt-0 card-body">
                                    <div id="stackchart" style="width: 100%; height:362px;"></div>
								</div>
                            </div>
                        </div>
             </div>
			 <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="mb-3 card">
                                <div class="card-header-tab card-header">
                                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><strong>Income Analytics </strong> (Only for month wise)</div>
                                </div>
                                <div class="pt-0 card-body">
                                    <div id="incomediv" style="width: 100%; height:362px;"></div>
								</div>
                            </div>
                        </div>
						<div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="mb-3 card">
                                <div class="card-header-tab card-header">
                                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><strong>Expense Analytics </strong> (Monthly) </div>
                                </div>
                                <div class="pt-0 card-body">
                                    <div id="expensediv" style="width: 100%; height:362px;"></div>
								</div>
                            </div>
                        </div>
						
                    </div>
					
					<div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="mb-3 card">
                                <div class="card-header-tab card-header">
                                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><strong>Conditions Analytics </strong> (Only for month wise)</div>
                                </div>
                                <div class="pt-0 card-body">
                                    <div id="piediv" style="width: 100%; height:362px;"></div>
								</div>
                            </div>
                        </div>
						<div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="mb-3 card">
                                <div class="card-header-tab card-header">
                                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">Medical Analytics </div>
                                </div>
                                <div class="pt-0 card-body">
                                    <div id="medidiv" style="width: 100%; height:362px;"></div>
								</div>
                            </div>
                        </div>
					 </div>
					 <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="mb-3 card">
                                <div class="card-header-tab card-header">
                                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><strong>Appointment Analytics </strong></div>
                                </div>
                                <div class="pt-0 card-body">
                                    <div id="aptdiv" style="width: 100%; height:362px;"></div>
								</div>
                            </div>
                        </div>
						<div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="mb-3 card">
                                <div class="card-header-tab card-header">
                                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">Referal Analytics </div>
                                </div>
                                <div class="pt-0 card-body">
                                    <div id="refdiv" style="width: 100%; height:362px;"></div>
								</div>
                            </div>
                        </div>
						
                    </div>
					</div>
					</div>
					
			 </div>
	</div>
	</div>
	</div>
	 <script type="text/javascript" src="<?php echo base_url()?>my_assets/assets/scripts/main.js"></script></body>
	<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.sparkline.min.js"></script>
	<script>
	AmCharts.loadJSON = function(url) {
	  if (window.XMLHttpRequest) {
		var request = new XMLHttpRequest();
	  } else {
		var request = new ActiveXObject('Microsoft.XMLHTTP');
	  }
	  request.open('GET', url, false);
	  request.send();
	return eval(request.responseText);
	};
	
</script>
<script>
$("ul#demo_menu2").sidebar({
            position:"right",
            callback:{
                item : {
                    enter : function(){
                        $(this).find("h6").animate({color:"red"}, 250);
                    },
                    leave : function(){
                        $(this).find("h6").animate({color:"white"}, 250);
                    }
                }
            }
        });
</script>
<script>
$(document).ready(function(e) {
	
	$('#topTooltip, #rightTooltip, #bottomTooltip, #leftTooltip').tooltip();
	 $('.card.hover').hover(function(){
        $(this).addClass('flip');
      },function(){
        $(this).removeClass('flip');
      });
	var chart;
	var legend;
	$('#reportrange').daterangepicker(
	{
		startDate: moment().subtract('days', 59),
		endDate: moment(),
		minDate: '01/01/2012',
		maxDate: '12/31/2020',
		//dateLimit: { days: 60 },
		showDropdowns: true,
		showWeekNumbers: true,
		timePicker: false,
		timePickerIncrement: 1,
		timePicker12Hour: true,
		ranges: {
		   'Today': [moment(), moment()],
		   'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
		   'Last 7 Days': [moment().subtract('days', 6), moment()],
		   'Last 30 Days': [moment().subtract('days', 29), moment()],
		   'This Month': [moment().startOf('month'), moment().endOf('month')],
		   'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
	},
	opens: 'left',
	buttonClasses: ['btn btn-default'],
	applyClass: 'btn-small btn-primary',
	cancelClass: 'btn-small',
	format: 'MM/DD/YYYY',
	separator: ' to ',
	locale: {
		applyLabel: 'Submit',
		fromLabel: 'From',
		toLabel: 'To',
		customRangeLabel: 'Custom Range',
		daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
		monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
		firstDay: 1
	}
	},
	function(start, end) {
		
	  console.log("Callback has been called!");
	  $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
	  
		  var
		  dateFilterValue = $('#reportrange span').html();
		  
		  dateFilterArr = dateFilterValue.split("-");
		  
			var i;
			dateFilterArr1 = [];
			for (i = 0; i < dateFilterArr.length; ++i) {
				dateFilterArr1.push(moment(dateFilterArr[i],'MMMM D, YYYY').format('YYYY-MM-DD'));
			}
			var dateFilter = dateFilterArr1.join("and");
			//alert(JSON.stringify(dateFilterArr1));
			$('#date_filter').val(dateFilter);
			var chartData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/patientchart/'+dateFilter);
			var pieData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/provdiagchart/'+dateFilter);
			var incomeData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/incomechart/'+dateFilter);
			var SessionData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/sessionChart/'+dateFilter);
			var medicalData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/medidiagchart/'+dateFilter);
			var AptData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/aptdiagchart/'+dateFilter);
			var refData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/refdiagchart/'+dateFilter);
			var expenseData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/expensereport/'+dateFilter);
			
			barChart(chartData);
			expenseChart(expenseData);
			pieChart(pieData);
			incomeChart(incomeData);
			medicalChart(medicalData);
			appointChart(AptData);
			referalChart(refData);
			sessChart(SessionData);
			$('#fromToDate span').text('');
			$.ajax({
				type: "POST",
				dataType: 'json',
				url: base_url + 'client/dashboard/incomereport/' + dateFilter, //The url where the server req would we made.
				beforeSend: function(){
					//$('#patient_id').parent().css('background', 'url("<?php echo base_url(); ?>img/spinner.gif") no-repeat 96% center');
				},
				success: function(data) { 
					$('#incomeInfo').html(data.incomeHtml);
					$('#fromToDate span').append(data.fromToDate);
				}, 
				complete: function(){
					
				},
				error: function(e){ // alert error if ajax fails
					alert(e.responseText);
				} 
			 }); //end AJAX
			
	 }
	);
	  
	  $('#reportrange span').html(moment().subtract('days', 59).format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
	  
	  var
	  dateFilterValue = $('#reportrange span').html();
	  
	  dateFilterArr = dateFilterValue.split("-");
	  
		var i;
		dateFilterArr1 = [];
		for (i = 0; i < dateFilterArr.length; ++i) {
			dateFilterArr1.push(moment(dateFilterArr[i],'MMMM D, YYYY').format('YYYY-MM-DD'));
		}
		var dateFilter = dateFilterArr1.join("and");
		$('#date_filter').val(dateFilter);
	  var chartData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/patientchart/'+dateFilter);
	function barChart(chartData){
		chart = new AmCharts.AmSerialChart();
		chart.dataProvider = chartData;
		chart.categoryField = "category";
		chart.startDuration = 1;
		var categoryAxis = chart.categoryAxis;
		categoryAxis.labelRotation = 90;
		categoryAxis.gridPosition = "start";
		categoryAxis.equalSpacing = true;
		var graph = new AmCharts.AmGraph();
		graph.valueField = "value1";
		graph.balloonText = "[[category]]: <b>[[value]]</b>";
		graph.type = "column";
		graph.lineAlpha = 0;
		graph.fillAlphas = 0.8;
		graph.colorField = "color";
		chart.addGraph(graph);
		var chartCursor = new AmCharts.ChartCursor();
		chartCursor.cursorAlpha = 0;
		chartCursor.zoomable = false;
		chartCursor.categoryBalloonEnabled = false;
		chart.addChartCursor(chartCursor);
		chart.write("chartdiv");
	}
	var SessionData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/sessionChart/'+dateFilter);
	function sessChart(SessionData){
		chart = new AmCharts.AmSerialChart();
		chart.dataProvider = SessionData;
		chart.categoryField = "category";
		chart.startDuration = 1;
		var categoryAxis = chart.categoryAxis;
		categoryAxis.labelRotation = 90;
		categoryAxis.gridPosition = "start";
		categoryAxis.equalSpacing = true;
		var graph = new AmCharts.AmGraph();
		graph.valueField = "value1";
		graph.balloonText = "[[category]]: <b>[[value]]</b>";
		graph.type = "column";
		graph.lineAlpha = 0;
		graph.fillAlphas = 0.8;
		graph.colorField = "color";
		chart.addGraph(graph);
		var chartCursor = new AmCharts.ChartCursor();
		chartCursor.cursorAlpha = 0;
		chartCursor.zoomable = false;
		chartCursor.categoryBalloonEnabled = false;
		chart.addChartCursor(chartCursor);

		chart.write("stackchart");
	}
	
	var pieData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/provdiagchart/'+dateFilter);
	function pieChart(pieData){
			// PIE CHART
			chart = new AmCharts.AmPieChart();
			chart.dataProvider = pieData;
			chart.titleField = "provdiag";
			chart.valueField = "count1";
			
			// LEGEND
			legend = new AmCharts.AmLegend();
			legend.align = "center";
			legend.markerType = "circle";
			chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[count1]]</b> ([[percents]]%)</span>";
			chart.addLegend(legend);
			chart.write("piediv");
		
		
	}
	var refData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/refdiagchart/'+dateFilter);
	function referalChart(refData){
			// PIE CHART
			chart = new AmCharts.AmPieChart();
			chart.dataProvider = refData;
			chart.titleField = "Referal";
			chart.valueField = "count";
			
			// LEGEND
			legend = new AmCharts.AmLegend();
			legend.align = "center";
			legend.markerType = "circle";
			chart.balloonText = "[[Referal]]<br><span style='font-size:14px'><b>[[count]]</b> ([[percents]]%)</span>";
			chart.addLegend(legend);
			chart.write("refdiv");
		
		
	} 
	
	var AptData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/aptdiagchart/'+dateFilter);
	function appointChart(AptData){
			// PIE CHART
			chart = new AmCharts.AmPieChart();
			chart.dataProvider = AptData;
			chart.titleField = "Time";
			chart.valueField = "count";
			
			// LEGEND
			legend = new AmCharts.AmLegend();
			legend.align = "center";
			legend.markerType = "circle";
			chart.balloonText = "[[Time]]<br><span style='font-size:14px'><b>[[count]]</b> ([[percents]]%)</span>";
			chart.addLegend(legend);
			chart.write("aptdiv");
		
		
	} 
	
	var medicalData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/medidiagchart/'+dateFilter);
	function medicalChart(medicalData){
			// PIE CHART
			chart = new AmCharts.AmPieChart();
			chart.dataProvider = medicalData;
			chart.titleField = "provdiag";
			chart.valueField = "count1";
			
			// LEGEND
			legend = new AmCharts.AmLegend();
			legend.align = "center";
			legend.markerType = "circle";
			chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[count1]]</b> ([[percents]]%)</span>";
			chart.addLegend(legend);
			chart.write("medidiv");
		
		
	}
	
	var incomeData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/incomechart/'+dateFilter);
	function incomeChart(incomeData){
	
		chart = new AmCharts.AmSerialChart();
		chart.dataProvider = incomeData;
		chart.categoryField = "month";
		chart.startDuration = 1;

		// AXES
		// category
		var categoryAxis = chart.categoryAxis;
		categoryAxis.labelRotation = 90;
		categoryAxis.gridPosition = "start";
		categoryAxis.equalSpacing = true;
		var graph = new AmCharts.AmGraph();
		graph.valueField = "total";
		graph.balloonText = "[[category]]: <b>[[value]]</b>";
		graph.type = "column";
		graph.lineAlpha = 0;
		graph.fillAlphas = 0.8;
		graph.colorField = "color";
		chart.addGraph(graph);
		var chartCursor = new AmCharts.ChartCursor();
		chartCursor.cursorAlpha = 0;
		chartCursor.zoomable = false;
		chartCursor.categoryBalloonEnabled = false;
		chart.addChartCursor(chartCursor);
		chart.write("incomediv");
	}
	var expenseData = AmCharts.loadJSON('<?php echo base_url(); ?>client/dashboard/expensereport/'+dateFilter);
	function expenseChart(expenseData){
	
		chart = new AmCharts.AmSerialChart();
		chart.dataProvider = expenseData;
		chart.categoryField = "month";
		chart.startDuration = 1;

		var categoryAxis = chart.categoryAxis;
		categoryAxis.labelRotation = 90;
		categoryAxis.gridPosition = "start";
		categoryAxis.equalSpacing = true;
		var graph = new AmCharts.AmGraph();
		graph.valueField = "total";
		graph.balloonText = "[[category]]: <b>[[value]]</b>";
		graph.type = "column";
		graph.lineAlpha = 0;
		graph.fillAlphas = 0.8;
		graph.colorField = "color";
		chart.addGraph(graph);
		var chartCursor = new AmCharts.ChartCursor();
		chartCursor.cursorAlpha = 0;
		chartCursor.zoomable = false;
		chartCursor.categoryBalloonEnabled = false;
		chart.addChartCursor(chartCursor);
		chart.write("expensediv");
	}
	function incomeReport()
	{
		$.ajax({
				type: "POST",
				dataType: 'json',
				
				url: '<?php echo base_url().'client/dashboard/incomereport/' ?>'+ dateFilter, 
				beforeSend: function(){
					//$('#patient_id').parent().css('background', 'url("<?php echo base_url(); ?>img/spinner.gif") no-repeat 96% center');
				},
				success: function(data) {
					$('#incomeInfo').html(data.incomeHtml);
					$('#fromToDate span').append(data.fromToDate);
				}, 
				complete: function(){
					//$('#patient_id').parent().css('background', 'none');	
				},
				error: function(e){ // alert error if ajax fails
					alert(e.responseText);
				} 
			 }); //end AJAX
	}
	
	  $(document).on('change', '#date_filter', function(){
		barChart(chartData);
		pieChart(pieData);
		medicalChart(medicalData);
		appointChart(AptData);
		referalChart(refData);
		incomeChart(incomeData);
		expenseChart(expenseData);
		sessChart(SessionData);
		incomeReport();
	  });
	  
	  $('#date_filter').trigger('change');
	/*  <?php if($clientDetails['account_type'] == 1) { ?>
		$.gritter.add({title:	'Activate Search Physio Account',text:	'Go to settings to join the national online directory for physiotherapistd and enjoy the premium listing for free'});
	  <?php } ?> */
    
	});
	$('.print_tab').click(function(){
		$('#print').show();
	});
    $('.clinic_tab').click(function(){
		$('#print').hide();
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
      