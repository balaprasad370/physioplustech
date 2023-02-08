<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Language" content="en">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Dashboard - Physio Plus Tech</title>
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
	<link rel="stylesheet" href="https://simeydotme.github.io/jQuery-ui-Slider-Pips/dist/css/jqueryui.min.css">
	<link rel="stylesheet" href="https://rawgit.com/simeydotme/jQuery-ui-Slider-Pips/master/dist/jquery-ui-slider-pips.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/nps_score.css">
	<style>
		.tabs-lg-alternate.card-header>.nav .nav-item .widget-number.mob {
			display: none;
		}
		.tabs-lg-alternate.card-header>.nav .nav-item .widget-number.one {
			display: block;
		}
		a.btn-icon.btn-icon-only.btn-shadow.btn-dashed.btn.btn-outline-secondary {
			text-overflow: ellipsis;
			overflow-x: hidden;
			overflow-y: hidden;
			width: 100%;
		}
		a.btn-icon.btn-icon-only.btn-shadow.btn-dashed.btn.btn-outline-secondary {
			width: 100%;
		}
		button.btn-icon.btn-icon-only.btn-shadow.btn-dashed.btn.btn-outline-secondary {
			width: 100%;
		}
		button.btn-icon.btn-icon-only.btn-shadow.btn-dashed.btn.btn-outline-secondary img {
			width: 100% !important;
		}
		i.fas.fa-coins.fa-2x {
			font-size: 1.5em !important;
		}
		.add_new_patient {
			display: none;
		}
		div {
			text-align: left !important;
		}
		@media (max-width: 768px) {
			.tabs-lg-alternate.card-header>.nav {
				display: block;
			}
			.br-1 {
				padding: 0 1em;
			}
			.arrow {
				text-align: right !important;
				color: #3f6ad8;
				font-size: 1.5em;
			}
			.add_new_patient {
				display: block;
				text-align: left !important;
				padding: 8px !important;
				box-shadow: 1px 4px 11px 1px #f3f2f2;
				margin-bottom: 8px;
			}
			.tabs-lg-alternate.card-header>.nav .nav-link {
				display: flex;
				flex-direction: row;
				justify-content: space-between;
			}
			.tabs-lg-alternate.card-header>.nav .nav-item .widget-number.mob {
				display: block;
			}
			.tabs-lg-alternate.card-header>.nav .nav-item .widget-number.one {
				display: none;
			}
			.col-md-6.col-sm-6.col-xs-6.pull-right {
				margin: 0 !important;
			}
			.tab-pane.active.show .card-header {
				height: auto;
				display: block;
				padding: .75rem 0;
				text-align: center;
			}
			.table-responsive {
				display: none;
			}
		}
		div
		{
			text-align:center;
		}
		img
		{
			vertical-align:middle;
		}

		#tab-content-1 .widget-number
		{
			font-size:large;
		}

	</style>
</head>

<body>

	<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
		<?php include("sidebar.php");?>
		<div class="app-main__outer">
			<div class="app-main__inner">
                View Patient
            </div>
        </div>
    </div>
</body>
</html>