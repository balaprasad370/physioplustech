<html>
<head>
<title>Add Appointment - Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8" />
	<link href="<?php echo base_url()?>my_assets/main.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/mdp.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/prettify.css">
    <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar-scheduler/1.9.2/scheduler.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.6.2/fullcalendar.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<script src="<?php echo base_url() ?>assets/sweet-alert/sweetalert.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/sweet-alert/sweetalert.css">
   	<style>
.parsley-error-list{
	color:red;
	list-style-type:none;
}

label, th, td{
	font-weight:bold;
	color:#3f6ad8;
}

.fc-time-grid .fc-slats td {
  height: 2em; // Change This to your required height
  border-bottom: 0;
}
	
.sr-only-focusable:active,.sr-only-focusable:focus{position:static;width:auto;height:auto;margin:0;overflow:visible;clip:auto}[role=button]{cursor:pointer}.initialism{font-size:90%;text-transform:uppercase}blockquote{padding:10px 20px;margin:0 0 20px;font-size:17.5px;border-left:5px solid #eee}blockquote ol:last-child,blockquote p:last-child,blockquote ul:last-child{margin-bottom:0}blockquote .small,blockquote footer,blockquote small{display:block;font-size:80%;line-height:1.42857143;color:#777}blockquote .small:before,blockquote footer:before,blockquote small:before{content:'\2014 \00A0'}.blockquote-reverse,blockquote.pull-right{padding-right:15px;padding-left:0;text-align:right;border-right:5px solid #eee;border-left:0}.blockquote-reverse .small:before,.blockquote-reverse footer:before,.blockquote-reverse small:before,blockquote.pull-right .small:before,blockquote.pull-right footer:before,blockquote.pull-right small:before{content:''}.blockquote-reverse .small:after,.blockquote-reverse footer:after,.blockquote-reverse small:after,blockquote.pull-right .small:after,blockquote.pull-right footer:after,blockquote.pull-right small:after{content:'\00A0 \2014'}address{margin-bottom:20px;font-style:normal;line-height:1.42857143}code,kbd,pre,samp{font-family:Menlo,Monaco,Consolas,"Courier New",monospace}code{padding:2px 4px;font-size:90%;color:#c7254e;background-color:#f9f2f4;border-radius:4px}kbd{padding:2px 4px;font-size:90%;color:#fff;background-color:#333;border-radius:3px;-webkit-box-shadow:inset 0 -1px 0 rgba(0,0,0,.25);box-shadow:inset 0 -1px 0 rgba(0,0,0,.25)}kbd kbd{padding:0;font-size:100%;font-weight:700;-webkit-box-shadow:none;box-shadow:none}pre{display:block;padding:9.5px;margin:0 0 10px;font-size:13px;line-height:1.42857143;color:#333;word-break:break-all;word-wrap:break-word;background-color:#f5f5f5;border:1px solid #ccc;border-radius:4px}pre code{padding:0;font-size:inherit;color:inherit;white-space:pre-wrap;background-color:transparent;border-radius:0}.pre-scrollable{max-height:340px;overflow-y:scroll}.container{padding-right:15px;padding-left:15px;margin-right:auto;margin-left:auto}@media (min-width:768px){.container{width:750px}}@media (min-width:992px){.container{width:970px}}@media (min-width:1200px){.container{width:1170px}}.container-fluid{padding-right:15px;padding-left:15px;margin-right:auto;margin-left:auto}.row{margin-right:-15px;margin-left:-15px}.col-lg-1,.col-lg-10,.col-lg-11,.col-lg-12,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9,.col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-xs-1,.col-xs-10,.col-xs-11,.col-xs-12,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9{position:relative;min-height:1px;padding-right:15px;padding-left:15px}.col-xs-1,.col-xs-10,.col-xs-11,.col-xs-12,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9{float:left}.col-xs-12{width:100%}.col-xs-11{width:91.66666667%}.col-xs-10{width:83.33333333%}.col-xs-9{width:75%}.col-xs-8{width:66.66666667%}.col-xs-7{width:58.33333333%}.col-xs-6{width:50%}.col-xs-5{width:41.66666667%}.col-xs-4{width:33.33333333%}.col-xs-3{width:25%}.col-xs-2{width:16.66666667%}.col-xs-1{width:8.33333333%}.col-xs-pull-12{right:100%}.col-xs-pull-11{right:91.66666667%}.col-xs-pull-10{right:83.33333333%}.col-xs-pull-9{right:75%}.col-xs-pull-8{right:66.66666667%}.col-xs-pull-7{right:58.33333333%}.col-xs-pull-6{right:50%}.col-xs-pull-5{right:41.66666667%}.col-xs-pull-4{right:33.33333333%}.col-xs-pull-3{right:25%}.col-xs-pull-2{right:16.66666667%}.col-xs-pull-1{right:8.33333333%}.col-xs-pull-0{right:auto}.col-xs-push-12{left:100%}.col-xs-push-11{left:91.66666667%}.col-xs-push-10{left:83.33333333%}.col-xs-push-9{left:75%}.col-xs-push-8{left:66.66666667%}.col-xs-push-7{left:58.33333333%}.col-xs-push-6{left:50%}.col-xs-push-5{left:41.66666667%}.col-xs-push-4{left:33.33333333%}.col-xs-push-3{left:25%}.col-xs-push-2{left:16.66666667%}.col-xs-push-1{left:8.33333333%}.col-xs-push-0{left:auto}.col-xs-offset-12{margin-left:100%}.col-xs-offset-11{margin-left:91.66666667%}.col-xs-offset-10{margin-left:83.33333333%}.col-xs-offset-9{margin-left:75%}.col-xs-offset-8{margin-left:66.66666667%}.col-xs-offset-7{margin-left:58.33333333%}.col-xs-offset-6{margin-left:50%}.col-xs-offset-5{margin-left:41.66666667%}.col-xs-offset-4{margin-left:33.33333333%}.col-xs-offset-3{margin-left:25%}.col-xs-offset-2{margin-left:16.66666667%}.col-xs-offset-1{margin-left:8.33333333%}.col-xs-offset-0{margin-left:0}@media (min-width:768px){.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9{float:left}.col-sm-12{width:100%}.col-sm-11{width:91.66666667%}.col-sm-10{width:83.33333333%}.col-sm-9{width:75%}.col-sm-8{width:66.66666667%}.col-sm-7{width:58.33333333%}.col-sm-6{width:50%}.col-sm-5{width:41.66666667%}.col-sm-4{width:33.33333333%}.col-sm-3{width:25%}.col-sm-2{width:16.66666667%}.col-sm-1{width:8.33333333%}.col-sm-pull-12{right:100%}.col-sm-pull-11{right:91.66666667%}.col-sm-pull-10{right:83.33333333%}.col-sm-pull-9{right:75%}.col-sm-pull-8{right:66.66666667%}.col-sm-pull-7{right:58.33333333%}.col-sm-pull-6{right:50%}.col-sm-pull-5{right:41.66666667%}.col-sm-pull-4{right:33.33333333%}.col-sm-pull-3{right:25%}.col-sm-pull-2{right:16.66666667%}.col-sm-pull-1{right:8.33333333%}.col-sm-pull-0{right:auto}.col-sm-push-12{left:100%}.col-sm-push-11{left:91.66666667%}.col-sm-push-10{left:83.33333333%}.col-sm-push-9{left:75%}.col-sm-push-8{left:66.66666667%}.col-sm-push-7{left:58.33333333%}.col-sm-push-6{left:50%}.col-sm-push-5{left:41.66666667%}.col-sm-push-4{left:33.33333333%}.col-sm-push-3{left:25%}.col-sm-push-2{left:16.66666667%}.col-sm-push-1{left:8.33333333%}.col-sm-push-0{left:auto}.col-sm-offset-12{margin-left:100%}.col-sm-offset-11{margin-left:91.66666667%}.col-sm-offset-10{margin-left:83.33333333%}.col-sm-offset-9{margin-left:75%}.col-sm-offset-8{margin-left:66.66666667%}.col-sm-offset-7{margin-left:58.33333333%}.col-sm-offset-6{margin-left:50%}.col-sm-offset-5{margin-left:41.66666667%}.col-sm-offset-4{margin-left:33.33333333%}.col-sm-offset-3{margin-left:25%}.col-sm-offset-2{margin-left:16.66666667%}.col-sm-offset-1{margin-left:8.33333333%}.col-sm-offset-0{margin-left:0}}@media (min-width:992px){.col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9{float:left}.col-md-12{width:100%}.col-md-11{width:91.66666667%}.col-md-10{width:83.33333333%}.col-md-9{width:75%}.col-md-8{width:66.66666667%}.col-md-7{width:58.33333333%}.col-md-6{width:50%}.col-md-5{width:41.66666667%}.col-md-4{width:33.33333333%}.col-md-3{width:25%}.col-md-2{width:16.66666667%}.col-md-1{width:8.33333333%}.col-md-pull-12{right:100%}.col-md-pull-11{right:91.66666667%}.col-md-pull-10{right:83.33333333%}.col-md-pull-9{right:75%}.col-md-pull-8{right:66.66666667%}.col-md-pull-7{right:58.33333333%}.col-md-pull-6{right:50%}.col-md-pull-5{right:41.66666667%}.col-md-pull-4{right:33.33333333%}.col-md-pull-3{right:25%}.col-md-pull-2{right:16.66666667%}.col-md-pull-1{right:8.33333333%}.col-md-pull-0{right:auto}.col-md-push-12{left:100%}.col-md-push-11{left:91.66666667%}.col-md-push-10{left:83.33333333%}.col-md-push-9{left:75%}.col-md-push-8{left:66.66666667%}.col-md-push-7{left:58.33333333%}.col-md-push-6{left:50%}.col-md-push-5{left:41.66666667%}.col-md-push-4{left:33.33333333%}.col-md-push-3{left:25%}.col-md-push-2{left:16.66666667%}.col-md-push-1{left:8.33333333%}.col-md-push-0{left:auto}.col-md-offset-12{margin-left:100%}.col-md-offset-11{margin-left:91.66666667%}.col-md-offset-10{margin-left:83.33333333%}.col-md-offset-9{margin-left:75%}.col-md-offset-8{margin-left:66.66666667%}.col-md-offset-7{margin-left:58.33333333%}.col-md-offset-6{margin-left:50%}.col-md-offset-5{margin-left:41.66666667%}.col-md-offset-4{margin-left:33.33333333%}.col-md-offset-3{margin-left:25%}.col-md-offset-2{margin-left:16.66666667%}.col-md-offset-1{margin-left:8.33333333%}.col-md-offset-0{margin-left:0}}@media (min-width:1200px){.col-lg-1,.col-lg-10,.col-lg-11,.col-lg-12,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9{float:left}.col-lg-12{width:100%}.col-lg-11{width:91.66666667%}.col-lg-10{width:83.33333333%}.col-lg-9{width:75%}.col-lg-8{width:66.66666667%}.col-lg-7{width:58.33333333%}.col-lg-6{width:50%}.col-lg-5{width:41.66666667%}.col-lg-4{width:33.33333333%}.col-lg-3{width:25%}.col-lg-2{width:16.66666667%}.col-lg-1{width:8.33333333%}.col-lg-pull-12{right:100%}.col-lg-pull-11{right:91.66666667%}.col-lg-pull-10{right:83.33333333%}.col-lg-pull-9{right:75%}.col-lg-pull-8{right:66.66666667%}.col-lg-pull-7{right:58.33333333%}.col-lg-pull-6{right:50%}.col-lg-pull-5{right:41.66666667%}.col-lg-pull-4{right:33.33333333%}.col-lg-pull-3{right:25%}.col-lg-pull-2{right:16.66666667%}.col-lg-pull-1{right:8.33333333%}.col-lg-pull-0{right:auto}.col-lg-push-12{left:100%}.col-lg-push-11{left:91.66666667%}.col-lg-push-10{left:83.33333333%}.col-lg-push-9{left:75%}.col-lg-push-8{left:66.66666667%}.col-lg-push-7{left:58.33333333%}.col-lg-push-6{left:50%}.col-lg-push-5{left:41.66666667%}.col-lg-push-4{left:33.33333333%}.col-lg-push-3{left:25%}.col-lg-push-2{left:16.66666667%}.col-lg-push-1{left:8.33333333%}.col-lg-push-0{left:auto}.col-lg-offset-12{margin-left:100%}.col-lg-offset-11{margin-left:91.66666667%}.col-lg-offset-10{margin-left:83.33333333%}.col-lg-offset-9{margin-left:75%}.col-lg-offset-8{margin-left:66.66666667%}.col-lg-offset-7{margin-left:58.33333333%}.col-lg-offset-6{margin-left:50%}.col-lg-offset-5{margin-left:41.66666667%}.col-lg-offset-4{margin-left:33.33333333%}.col-lg-offset-3{margin-left:25%}.col-lg-offset-2{margin-left:16.66666667%}.col-lg-offset-1{margin-left:8.33333333%}.col-lg-offset-0{margin-left:0}}table{background-color:transparent}caption{padding-top:8px;padding-bottom:8px;color:#777;text-align:left}th{text-align:left}.table{width:100%;max-width:100%;margin-bottom:20px}.table>tbody>tr>td,.table>tbody>tr>th,.table>tfoot>tr>td,.table>tfoot>tr>th,.table>thead>tr>td,.table>thead>tr>th{padding:8px;line-height:1.42857143;vertical-align:top;border-top:1px solid #ddd}.table>thead>tr>th{vertical-align:bottom;border-bottom:2px solid #ddd}.table>caption+thead>tr:first-child>td,.table>caption+thead>tr:first-child>th,.table>colgroup+thead>tr:first-child>td,.table>colgroup+thead>tr:first-child>th,.table>thead:first-child>tr:first-child>td,.table>thead:first-child>tr:first-child>th{border-top:0}.table>tbody+tbody{border-top:2px solid #ddd}.table .table{background-color:#fff}.table-condensed>tbody>tr>td,.table-condensed>tbody>tr>th,.table-condensed>tfoot>tr>td,.table-condensed>tfoot>tr>th,.table-condensed>thead>tr>td,.table-condensed>thead>tr>th{padding:5px}.table-bordered{border:1px solid #ddd}.table-bordered>tbody>tr>td,.table-bordered>tbody>tr>th,.table-bordered>tfoot>tr>td,.table-bordered>tfoot>tr>th,.table-bordered>thead>tr>td,.table-bordered>thead>tr>th{border:1px solid #ddd}.table-bordered>thead>tr>td,.table-bordered>thead>tr>th{border-bottom-width:2px}.table-striped>tbody>tr:nth-of-type(odd){background-color:#f9f9f9}.table-hover>tbody>tr:hover{background-color:#f5f5f5}table col[class*=col-]{position:static;display:table-column;float:none}table td[class*=col-],table th[class*=col-]{position:static;display:table-cell;float:none}.table>tbody>tr.active>td,.table>tbody>tr.active>th,.table>tbody>tr>td.active,.table>tbody>tr>th.active,.table>tfoot>tr.active>td,.table>tfoot>tr.active>th,.table>tfoot>tr>td.active,.table>tfoot>tr>th.active,.table>thead>tr.active>td,.table>thead>tr.active>th,.table>thead>tr>td.active,.table>thead>tr>th.active{background-color:#f5f5f5}.table-hover>tbody>tr.active:hover>td,.table-hover>tbody>tr.active:hover>th,.table-hover>tbody>tr:hover>.active,.table-hover>tbody>tr>td.active:hover,.table-hover>tbody>tr>th.active:hover{background-color:#e8e8e8}.table>tbody>tr.success>td,.table>tbody>tr.success>th,.table>tbody>tr>td.success,.table>tbody>tr>th.success,.table>tfoot>tr.success>td,.table>tfoot>tr.success>th,.table>tfoot>tr>td.success,.table>tfoot>tr>th.success,.table>thead>tr.success>td,.table>thead>tr.success>th,.table>thead>tr>td.success,.table>thead>tr>th.success{background-color:#dff0d8}.table-hover>tbody>tr.success:hover>td,.table-hover>tbody>tr.success:hover>th,.table-hover>tbody>tr:hover>.success,.table-hover>tbody>tr>td.success:hover,.table-hover>tbody>tr>th.success:hover{background-color:#d0e9c6}.table>tbody>tr.info>td,.table>tbody>tr.info>th,.table>tbody>tr>td.info,.table>tbody>tr>th.info,.table>tfoot>tr.info>td,.table>tfoot>tr.info>th,.table>tfoot>tr>td.info,.table>tfoot>tr>th.info,.table>thead>tr.info>td,.table>thead>tr.info>th,.table>thead>tr>td.info,.table>thead>tr>th.info{background-color:#d9edf7}.table-hover>tbody>tr.info:hover>td,.table-hover>tbody>tr.info:hover>th,.table-hover>tbody>tr:hover>.info,.table-hover>tbody>tr>td.info:hover,.table-hover>tbody>tr>th.info:hover{background-color:#c4e3f3}.table>tbody>tr.warning>td,.table>tbody>tr.warning>th,.table>tbody>tr>td.warning,.table>tbody>tr>th.warning,.table>tfoot>tr.warning>td,.table>tfoot>tr.warning>th,.table>tfoot>tr>td.warning,.table>tfoot>tr>th.warning,.table>thead>tr.warning>td,.table>thead>tr.warning>th,.table>thead>tr>td.warning,.table>thead>tr>th.warning{background-color:#fcf8e3}.table-hover>tbody>tr.warning:hover>td,.table-hover>tbody>tr.warning:hover>th,.table-hover>tbody>tr:hover>.warning,.table-hover>tbody>tr>td.warning:hover,.table-hover>tbody>tr>th.warning:hover{background-color:#faf2cc}.table>tbody>tr.danger>td,.table>tbody>tr.danger>th,.table>tbody>tr>td.danger,.table>tbody>tr>th.danger,.table>tfoot>tr.danger>td,.table>tfoot>tr.danger>th,.table>tfoot>tr>td.danger,.table>tfoot>tr>th.danger,.table>thead>tr.danger>td,.table>thead>tr.danger>th,.table>thead>tr>td.danger,.table>thead>tr>th.danger{background-color:#f2dede}.table-hover>tbody>tr.danger:hover>td,.table-hover>tbody>tr.danger:hover>th,.table-hover>tbody>tr:hover>.danger,.table-hover>tbody>tr>td.danger:hover,.table-hover>tbody>tr>th.danger:hover{background-color:#ebcccc}.table-responsive{min-height:.01%;overflow-x:auto}@media screen and (max-width:767px){.table-responsive{width:100%;margin-bottom:15px;overflow-y:hidden;-ms-overflow-style:-ms-autohiding-scrollbar;border:1px solid #ddd}.table-responsive>.table{margin-bottom:0}.table-responsive>.table>tbody>tr>td,.table-responsive>.table>tbody>tr>th,.table-responsive>.table>tfoot>tr>td,.table-responsive>.table>tfoot>tr>th,.table-responsive>.table>thead>tr>td,.table-responsive>.table>thead>tr>th{white-space:nowrap}.table-responsive>.table-bordered{border:0}.table-responsive>.table-bordered>tbody>tr>td:first-child,.table-responsive>.table-bordered>tbody>tr>th:first-child,.table-responsive>.table-bordered>tfoot>tr>td:first-child,.table-responsive>.table-bordered>tfoot>tr>th:first-child,.table-responsive>.table-bordered>thead>tr>td:first-child,.table-responsive>.table-bordered>thead>tr>th:first-child{border-left:0}.table-responsive>.table-bordered>tbody>tr>td:last-child,.table-responsive>.table-bordered>tbody>tr>th:last-child,.table-responsive>.table-bordered>tfoot>tr>td:last-child,.table-responsive>.table-bordered>tfoot>tr>th:last-child,.table-responsive>.table-bordered>thead>tr>td:last-child,.table-responsive>.table-bordered>thead>tr>th:last-child{border-right:0}.table-responsive>.table-bordered>tbody>tr:last-child>td,.table-responsive>.table-bordered>tbody>tr:last-child>th,.table-responsive>.table-bordered>tfoot>tr:last-child>td,.table-responsive>.table-bordered>tfoot>tr:last-child>th{border-bottom:0}}fieldset{min-width:0;padding:0;margin:0;border:0}legend{display:block;width:100%;padding:0;margin-bottom:20px;font-size:21px;line-height:inherit;color:#333;border:0;border-bottom:1px solid #e5e5e5}label{display:inline-block;max-width:100%;margin-bottom:5px;font-weight:700}input[type=search]{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}input[type=checkbox],input[type=radio]{margin:4px 0 0;margin-top:1px\9;line-height:normal}input[type=file]{display:block}input[type=range]{display:block;width:100%}select[multiple],select[size]{height:auto}input[type=file]:focus,input[type=checkbox]:focus,input[type=radio]:focus{outline:5px auto -webkit-focus-ring-color;outline-offset:-2px}output{display:block;padding-top:7px;font-size:14px;line-height:1.42857143;color:#555}.form-control{display:block;width:100%;height:34px;padding:6px 12px;font-size:14px;line-height:1.42857143;color:#555;background-color:#fff;background-image:none;border:1px solid #ccc;border-radius:4px;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075);box-shadow:inset 0 1px 1px rgba(0,0,0,.075);-webkit-transition:border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;-o-transition:border-color ease-in-out .15s,box-shadow ease-in-out .15s;transition:border-color ease-in-out .15s,box-shadow ease-in-out .15s}.form-control:focus{border-color:#66afe9;outline:0;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6)}.form-control::-moz-placeholder{color:#999;opacity:1}.form-control:-ms-input-placeholder{color:#999}.form-control::-webkit-input-placeholder{color:#999}.form-control::-ms-expand{background-color:transparent;border:0}.form-control[disabled],.form-control[readonly],fieldset[disabled] .form-control{background-color:#eee;opacity:1}.form-control[disabled],fieldset[disabled] .form-control{cursor:not-allowed}textarea.form-control{height:auto}input[type=search]{-webkit-appearance:none}@media screen and (-webkit-min-device-pixel-ratio:0){input[type=date].form-control,input[type=time].form-control,input[type=datetime-local].form-control,input[type=month].form-control{line-height:34px}.input-group-sm input[type=date],.input-group-sm input[type=time],.input-group-sm input[type=datetime-local],.input-group-sm input[type=month],input[type=date].input-sm,input[type=time].input-sm,input[type=datetime-local].input-sm,input[type=month].input-sm{line-height:30px}.input-group-lg input[type=date],.input-group-lg input[type=time],.input-group-lg input[type=datetime-local],.input-group-lg input[type=month],input[type=date].input-lg,input[type=time].input-lg,input[type=datetime-local].input-lg,input[type=month].input-lg{line-height:46px}}.form-group{margin-bottom:15px}.checkbox,.radio{position:relative;display:block;margin-top:10px;margin-bottom:10px}.checkbox label,.radio label{min-height:20px;padding-left:20px;margin-bottom:0;font-weight:400;cursor:pointer}.checkbox input[type=checkbox],.checkbox-inline input[type=checkbox],.radio input[type=radio],.radio-inline input[type=radio]{position:absolute;margin-top:4px\9;margin-left:-20px}.checkbox+.checkbox,.radio+.radio{margin-top:-5px}.checkbox-inline,.radio-inline{position:relative;display:inline-block;padding-left:20px;margin-bottom:0;font-weight:400;vertical-align:middle;cursor:pointer}.checkbox-inline+.checkbox-inline,.radio-inline+.radio-inline{margin-top:0;margin-left:10px}fieldset[disabled] input[type=checkbox],fieldset[disabled] input[type=radio],input[type=checkbox].disabled,input[type=checkbox][disabled],input[type=radio].disabled,input[type=radio][disabled]{cursor:not-allowed}.checkbox-inline.disabled,.radio-inline.disabled,fieldset[disabled] .checkbox-inline,fieldset[disabled] .radio-inline{cursor:not-allowed}.checkbox.disabled label,.radio.disabled label,fieldset[disabled] .checkbox label,fieldset[disabled] .radio label{cursor:not-allowed}.form-control-static{min-height:34px;padding-top:7px;padding-bottom:7px;margin-bottom:0}.form-control-static.input-lg,.form-control-static.input-sm{padding-right:0;padding-left:0}.input-sm{height:30px;padding:5px 10px;font-size:12px;line-height:1.5;border-radius:3px}select.input-sm{height:30px;line-height:30px}select[multiple].input-sm,textarea.input-sm{height:auto}.form-group-sm .form-control{height:30px;padding:5px 10px;font-size:12px;line-height:1.5;border-radius:3px}.form-group-sm select.form-control{height:30px;line-height:30px}.form-group-sm select[multiple].form-control,.form-group-sm textarea.form-control{height:auto}.form-group-sm .form-control-static{height:30px;min-height:32px;padding:6px 10px;font-size:12px;line-height:1.5}.input-lg{height:46px;padding:10px 16px;font-size:18px;line-height:1.3333333;border-radius:6px}select.input-lg{height:46px;line-height:46px}select[multiple].input-lg,textarea.input-lg{height:auto}.form-group-lg .form-control{height:46px;padding:10px 16px;font-size:18px;line-height:1.3333333;border-radius:6px}.form-group-lg select.form-control{height:46px;line-height:46px}.form-group-lg select[multiple].form-control,.form-group-lg textarea.form-control{height:auto}.form-group-lg .form-control-static{height:46px;min-height:38px;padding:11px 16px;font-size:18px;line-height:1.3333333}.has-feedback{position:relative}.has-feedback .form-control{padding-right:42.5px}.form-control-feedback{position:absolute;top:0;right:0;z-index:2;display:block;width:34px;height:34px;line-height:34px;text-align:center;pointer-events:none}.form-group-lg .form-control+.form-control-feedback,.input-group-lg+.form-control-feedback,.input-lg+.form-control-feedback{width:46px;height:46px;line-height:46px}.form-group-sm .form-control+.form-control-feedback,.input-group-sm+.form-control-feedback,.input-sm+.form-control-feedback{width:30px;height:30px;line-height:30px}.has-success .checkbox,.has-success .checkbox-inline,.has-success .control-label,.has-success .help-block,.has-success .radio,.has-success .radio-inline,.has-success.checkbox label,.has-success.checkbox-inline label,.has-success.radio label,.has-success.radio-inline label{color:#3c763d}.has-success .form-control{border-color:#3c763d;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075);box-shadow:inset 0 1px 1px rgba(0,0,0,.075)}.has-success .form-control:focus{border-color:#2b542c;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #67b168;box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #67b168}.has-success .input-group-addon{color:#3c763d;background-color:#dff0d8;border-color:#3c763d}.has-success .form-control-feedback{color:#3c763d}.has-warning .checkbox,.has-warning .checkbox-inline,.has-warning .control-label,.has-warning .help-block,.has-warning .radio,.has-warning .radio-inline,.has-warning.checkbox label,.has-warning.checkbox-inline label,.has-warning.radio label,.has-warning.radio-inline label{color:#8a6d3b}.has-warning .form-control{border-color:#8a6d3b;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075);box-shadow:inset 0 1px 1px rgba(0,0,0,.075)}.has-warning .form-control:focus{border-color:#66512c;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #c0a16b;box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #c0a16b}.has-warning .input-group-addon{color:#8a6d3b;background-color:#fcf8e3;border-color:#8a6d3b}.has-warning .form-control-feedback{color:#8a6d3b}.has-error .checkbox,.has-error .checkbox-inline,.has-error .control-label,.has-error .help-block,.has-error .radio,.has-error .radio-inline,.has-error.checkbox label,.has-error.checkbox-inline label,.has-error.radio label,.has-error.radio-inline label{color:#a94442}.has-error .form-control{border-color:#a94442;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075);box-shadow:inset 0 1px 1px rgba(0,0,0,.075)}.has-error .form-control:focus{border-color:#843534;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #ce8483;box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #ce8483}.has-error .input-group-addon{color:#a94442;background-color:#f2dede;border-color:#a94442}.has-error .form-control-feedback{color:#a94442}.has-feedback label~.form-control-feedback{top:25px}.has-feedback label.sr-only~.form-control-feedback{top:0}.help-block{display:block;margin-top:5px;margin-bottom:10px;color:#737373}@media (min-width:768px){.form-inline .form-group{display:inline-block;margin-bottom:0;vertical-align:middle}.form-inline .form-control{display:inline-block;width:auto;vertical-align:middle}.form-inline .form-control-static{display:inline-block}.form-inline .input-group{display:inline-table;vertical-align:middle}.form-inline .input-group .form-control,.form-inline .input-group .input-group-addon,.form-inline .input-group .input-group-btn{width:auto}.form-inline .input-group>.form-control{width:100%}.form-inline .control-label{margin-bottom:0;vertical-align:middle}.form-inline .checkbox,.form-inline .radio{display:inline-block;margin-top:0;margin-bottom:0;vertical-align:middle}.form-inline .checkbox label,.form-inline .radio label{padding-left:0}.form-inline .checkbox input[type=checkbox],.form-inline .radio input[type=radio]{position:relative;margin-left:0}.form-inline .has-feedback .form-control-feedback{top:0}}.form-horizontal .checkbox,.form-horizontal .checkbox-inline,.form-horizontal .radio,.form-horizontal .radio-inline{padding-top:7px;margin-top:0;margin-bottom:0}.form-horizontal .checkbox,.form-horizontal .radio{min-height:27px}.form-horizontal .form-group{margin-right:-15px;margin-left:-15px}@media (min-width:768px){.form-horizontal .control-label{padding-top:7px;margin-bottom:0;text-align:right}}.form-horizontal .has-feedback .form-control-feedback{right:15px}@media (min-width:768px){.form-horizontal .form-group-lg .control-label{padding-top:11px;font-size:18px}}@media (min-width:768px){.form-horizontal .form-group-sm .control-label{padding-top:6px;font-size:12px}}.btn{display:inline-block;padding:6px 12px;margin-bottom:0;font-size:14px;font-weight:400;line-height:1.42857143;text-align:center;white-space:nowrap;vertical-align:middle;-ms-touch-action:manipulation;touch-action:manipulation;cursor:pointer;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;background-image:none;border:1px solid transparent;border-radius:4px}.btn.active.focus,.btn.active:focus,.btn.focus,.btn:active.focus,.btn:active:focus,.btn:focus{outline:5px auto -webkit-focus-ring-color;outline-offset:-2px}.btn.focus,.btn:focus,.btn:hover{color:#333;text-decoration:none}.btn.active,.btn:active{background-image:none;outline:0;-webkit-box-shadow:inset 0 3px 5px rgba(0,0,0,.125);box-shadow:inset 0 3px 5px rgba(0,0,0,.125)}.btn.disabled,.btn[disabled],fieldset[disabled] .btn{cursor:not-allowed;filter:alpha(opacity=65);-webkit-box-shadow:none;box-shadow:none;opacity:.65}a.btn.disabled,fieldset[disabled] a.btn{pointer-events:none}.btn-default{color:#333;background-color:#fff;border-color:#ccc}.btn-default.focus,.btn-default:focus{color:#333;background-color:#e6e6e6;border-color:#8c8c8c}.btn-default:hover{color:#333;background-color:#e6e6e6;border-color:#adadad}.btn-default.active,.btn-default:active,.open>.dropdown-toggle.btn-default{color:#333;background-color:#e6e6e6;border-color:#adadad}.btn-default.active.focus,.btn-default.active:focus,.btn-default.active:hover,.btn-default:active.focus,.btn-default:active:focus,.btn-default:active:hover,.open>.dropdown-toggle.btn-default.focus,.open>.dropdown-toggle.btn-default:focus,.open>.dropdown-toggle.btn-default:hover{color:#333;background-color:#d4d4d4;border-color:#8c8c8c}.btn-default.active,.btn-default:active,.open>.dropdown-toggle.btn-default{background-image:none}.btn-default.disabled.focus,.btn-default.disabled:focus,.btn-default.disabled:hover,.btn-default[disabled].focus,.btn-default[disabled]:focus,.btn-default[disabled]:hover,fieldset[disabled] .btn-default.focus,fieldset[disabled] .btn-default:focus,fieldset[disabled] .btn-default:hover{background-color:#fff;border-color:#ccc}.btn-default.btn-primary{color:#fff;background-color:#337ab7;border-color:#2e6da4}.btn-primary.focus,.btn-primary:focus{color:#fff;background-color:#286090;border-color:#122b40}.btn-primary:hover{color:#fff;background-color:#286090;border-color:#204d74}.btn-primary.active,.btn-primary:active,.open>.dropdown-toggle.btn-primary{color:#fff;background-color:#286090;border-color:#204d74}.btn-primary.active.focus,.btn-primary.active:focus,.btn-primary.active:hover,.btn-primary:active.focus,.btn-primary:active:focus,.btn-primary:active:hover,.open>.dropdown-toggle.btn-primary.focus,.open>.dropdown-toggle.btn-primary:focus,.open>.dropdown-toggle.btn-primary:hover{color:#fff;background-color:#204d74;border-color:#122b40}.btn-primary.active,.btn-primary:active,.open>.dropdown-toggle.btn-primary{background-image:none}.btn-primary.disabled.focus,.btn-primary.disabled:focus,.btn-primary.disabled:hover,.btn-primary[disabled].focus,.btn-primary[disabled]:focus,.btn-primary[disabled]:hover,fieldset[disabled] .btn-primary.focus,fieldset[disabled] .btn-primary:focus,fieldset[disabled] .btn-primary:hover{background-color:#337ab7;border-color:#2e6da4}.btn-primary .badge{color:#337ab7;background-color:#fff}.btn-success{color:#fff;background-color:#5cb85c;border-color:#4cae4c}.btn-success.focus,.btn-success:focus{color:#fff;background-color:#449d44;border-color:#255625}.btn-success:hover{color:#fff;background-color:#449d44;border-color:#398439}.btn-success.active,.btn-success:active,.open>.dropdown-toggle.btn-success{color:#fff;background-color:#449d44;border-color:#398439}.btn-success.active.focus,.btn-success.active:focus,.btn-success.active:hover,.btn-success:active.focus,.btn-success:active:focus,.btn-success:active:hover,.open>.dropdown-toggle.btn-success.focus,.open>.dropdown-toggle.btn-success:focus,.open>.dropdown-toggle.btn-success:hover{color:#fff;background-color:#398439;border-color:#255625}.btn-success.active,.btn-success:active,.open>.dropdown-toggle.btn-success{background-image:none}.btn-success.disabled.focus,.btn-success.disabled:focus,.btn-success.disabled:hover,.btn-success[disabled].focus,.btn-success[disabled]:focus,.btn-success[disabled]:hover,fieldset[disabled] .btn-success.focus,fieldset[disabled] .btn-success:focus,fieldset[disabled] .btn-success:hover{background-color:#5cb85c;border-color:#4cae4c}.btn-success .badge{color:#5cb85c;background-color:#fff}.btn-info{color:#fff;background-color:#5bc0de;border-color:#46b8da}.btn-info.focus,.btn-info:focus{color:#fff;background-color:#31b0d5;border-color:#1b6d85}.btn-info:hover{color:#fff;background-color:#31b0d5;border-color:#269abc}.btn-info.active,.btn-info:active,.open>.dropdown-toggle.btn-info{color:#fff;background-color:#31b0d5;border-color:#269abc}.btn-info.active.focus,.btn-info.active:focus,.btn-info.active:hover,.btn-info:active.focus,.btn-info:active:focus,.btn-info:active:hover,.open>.dropdown-toggle.btn-info.focus,.open>.dropdown-toggle.btn-info:focus,.open>.dropdown-toggle.btn-info:hover{color:#fff;background-color:#269abc;border-color:#1b6d85}.btn-info.active,.btn-info:active,.open>.dropdown-toggle.btn-info{background-image:none}.btn-info.disabled.focus,.btn-info.disabled:focus,.btn-info.disabled:hover,.btn-info[disabled].focus,.btn-info[disabled]:focus,.btn-info[disabled]:hover,fieldset[disabled] .btn-info.focus,fieldset[disabled] .btn-info:focus,fieldset[disabled] .btn-info:hover{background-color:#5bc0de;border-color:#46b8da}.btn-info .badge{color:#5bc0de;background-color:#fff}.btn-warning{color:#fff;background-color:#f0ad4e;border-color:#eea236}.btn-warning.focus,.btn-warning:focus{color:#fff;background-color:#ec971f;border-color:#985f0d}.btn-warning:hover{color:#fff;background-color:#ec971f;border-color:#d58512}.btn-warning.active,.btn-warning:active,.open>.dropdown-toggle.btn-warning{color:#fff;background-color:#ec971f;border-color:#d58512}.btn-warning.active.focus,.btn-warning.active:focus,.btn-warning.active:hover,.btn-warning:active.focus,.btn-warning:active:focus,.btn-warning:active:hover,.open>.dropdown-toggle.btn-warning.focus,.open>.dropdown-toggle.btn-warning:focus,.open>.dropdown-toggle.btn-warning:hover{color:#fff;background-color:#d58512;border-color:#985f0d}.btn-warning.active,.btn-warning:active,.open>.dropdown-toggle.btn-warning{background-image:none}.btn-warning.disabled.focus,.btn-warning.disabled:focus,.btn-warning.disabled:hover,.btn-warning[disabled].focus,.btn-warning[disabled]:focus,.btn-warning[disabled]:hover,fieldset[disabled] .btn-warning.focus,fieldset[disabled] .btn-warning:focus,fieldset[disabled] .btn-warning:hover{background-color:#f0ad4e;border-color:#eea236}.btn-warning .badge{color:#f0ad4e;background-color:#fff}.btn-danger{color:#fff;background-color:#d9534f;border-color:#d43f3a}.btn-danger.focus,.btn-danger:focus{color:#fff;background-color:#c9302c;border-color:#761c19}.btn-danger:hover{color:#fff;background-color:#c9302c;border-color:#ac2925}.btn-danger.active,.btn-danger:active,.open>.dropdown-toggle.btn-danger{color:#fff;background-color:#c9302c;border-color:#ac2925}.btn-danger.active.focus,.btn-danger.active:focus,.btn-danger.active:hover,.btn-danger:active.focus,.btn-danger:active:focus,.btn-danger:active:hover,.open>.dropdown-toggle.btn-danger.focus,.open>.dropdown-toggle.btn-danger:focus,.open>.dropdown-toggle.btn-danger:hover{color:#fff;background-color:#ac2925;border-color:#761c19}.btn-danger.active,.btn-danger:active,.open>.dropdown-toggle.btn-danger{background-image:none}.btn-danger.disabled.focus,.btn-danger.disabled:focus,.btn-danger.disabled:hover,.btn-danger[disabled].focus,.btn-danger[disabled]:focus,.btn-danger[disabled]:hover,fieldset[disabled] .btn-danger.focus,fieldset[disabled] .btn-danger:focus,fieldset[disabled] .btn-danger:hover{background-color:#d9534f;border-color:#d43f3a}.btn-danger.btn-link{font-weight:400;color:#337ab7;border-radius:0}.btn-link,.btn-link.active,.btn-link:active,.btn-link[disabled],fieldset[disabled] .btn-link{background-color:transparent;-webkit-box-shadow:none;box-shadow:none}.btn-link,.btn-link:active,.btn-link:focus,.btn-link:hover{border-color:transparent}.btn-link:focus,.btn-link:hover{color:#23527c;text-decoration:underline;background-color:transparent}.btn-link[disabled]:focus,.btn-link[disabled]:hover,fieldset[disabled] .btn-link:focus,fieldset[disabled] .btn-link:hover{color:#777;text-decoration:none}.btn-group-lg>.btn,.btn-lg{padding:10px 16px;font-size:18px;line-height:1.3333333;border-radius:6px}.btn-group-sm>.btn,.btn-sm{padding:5px 10px;font-size:12px;line-height:1.5;border-radius:3px}.btn-group-xs>.btn,.btn-xs{padding:1px 5px;font-size:12px;line-height:1.5;border-radius:3px}.btn-block{display:block;width:100%}.btn-block+.btn-block{margin-top:5px}input[type=button].btn-block,input[type=reset].btn-block,input[type=submit].btn-block{width:100%}.fade{opacity:0;-webkit-transition:opacity .15s linear;-o-transition:opacity .15s linear;transition:opacity .15s linear}.fade.in{opacity:1}.collapse{display:none}.collapse.in{display:block}tr.collapse.in{display:table-row}tbody.collapse.in{display:table-row-group}.collapsing{position:relative;height:0;overflow:hidden;-webkit-transition-timing-function:ease;-o-transition-timing-function:ease;transition-timing-function:ease;-webkit-transition-duration:.35s;-o-transition-duration:.35s;transition-duration:.35s;-webkit-transition-property:height,visibility;-o-transition-property:height,visibility;transition-property:height,visibility}.caret{display:inline-block;width:0;height:0;margin-left:2px;vertical-align:middle;border-top:4px dashed;border-top:4px solid\9;border-right:4px solid transparent;border-left:4px solid transparent}.dropdown,.dropup{position:relative}.dropdown-toggle:focus{outline:0}.dropdown-menu{position:absolute;top:100%;left:0;z-index:1000;display:none;float:left;min-width:160px;padding:5px 0;margin:2px 0 0;font-size:14px;text-align:left;list-style:none;background-color:#fff;-webkit-background-clip:padding-box;background-clip:padding-box;border:1px solid #ccc;border:1px solid rgba(0,0,0,.15);border-radius:4px;-webkit-box-shadow:0 6px 12px rgba(0,0,0,.175);box-shadow:0 6px 12px rgba(0,0,0,.175)}.dropdown-menu.pull-right{right:0;left:auto}.dropdown-menu .divider{height:1px;margin:9px 0;overflow:hidden;background-color:#e5e5e5}.dropdown-menu>li>a{display:block;padding:3px 20px;clear:both;font-weight:400;line-height:1.42857143;color:#333;white-space:nowrap}.dropdown-menu>li>a:focus,.dropdown-menu>li>a:hover{color:#262626;text-decoration:none;background-color:#f5f5f5}.dropdown-menu>.active>a,.dropdown-menu>.active>a:focus,.dropdown-menu>.active>a:hover{color:#fff;text-decoration:none;background-color:#337ab7;outline:0}.dropdown-menu>.disabled>a,.dropdown-menu>.disabled>a:focus,.dropdown-menu>.disabled>a:hover{color:#777}.dropdown-menu>.disabled>a:focus,.dropdown-menu>.disabled>a:hover{text-decoration:none;cursor:not-allowed;background-color:transparent;background-image:none;filter:progid:DXImageTransform.Microsoft.gradient(enabled=false)}.open>.dropdown-menu{display:block}.open>a{outline:0}.dropdown-menu-right{right:0;left:auto}.dropdown-menu-left{right:auto;left:0}.dropdown-header{display:block;padding:3px 20px;font-size:12px;line-height:1.42857143;color:#777;white-space:nowrap}.dropdown-backdrop{position:fixed;top:0;right:0;bottom:0;left:0;z-index:990}.pull-right>.dropdown-menu{right:0;left:auto}.dropup .caret,.navbar-fixed-bottom .dropdown .caret{content:"";border-top:0;border-bottom:4px dashed;border-bottom:4px solid\9}.dropup .dropdown-menu,.navbar-fixed-bottom .dropdown .dropdown-menu{top:auto;bottom:100%;margin-bottom:2px}@media (min-width:768px){.navbar-right .dropdown-menu{right:0;left:auto}.navbar-right .dropdown-menu-left{right:auto;left:0}}.btn-group,.btn-group-vertical{position:relative;display:inline-block;vertical-align:middle}.btn-group-vertical>.btn,.btn-group>.btn{position:relative;float:left}.btn-group-vertical>.btn.active,.btn-group-vertical>.btn:active,.btn-group-vertical>.btn:focus,.btn-group-vertical>.btn:hover,.btn-group>.btn.active,.btn-group>.btn:active,.btn-group>.btn:focus,.btn-group>.btn:hover{z-index:2}.btn-group .btn+.btn,.btn-group .btn+.btn-group,.btn-group .btn-group+.btn,.btn-group .btn-group+.btn-group{margin-left:-1px}.btn-toolbar{margin-left:-5px}.btn-toolbar .btn,.btn-toolbar .btn-group,.btn-toolbar .input-group{float:left}.btn-toolbar>.btn,.btn-toolbar>.btn-group,.btn-toolbar>.input-group{margin-left:5px}.btn-group>.btn:not(:first-child):not(:last-child):not(.dropdown-toggle){border-radius:0}.btn-group>.btn:first-child{margin-left:0}.btn-group>.btn:first-child:not(:last-child):not(.dropdown-toggle){border-top-right-radius:0;border-bottom-right-radius:0}.btn-group>.btn:last-child:not(:first-child),.btn-group>.dropdown-toggle:not(:first-child){border-top-left-radius:0;border-bottom-left-radius:0}.btn-group>.btn-group{float:left}.btn-group>.btn-group:not(:first-child):not(:last-child)>.btn{border-radius:0}.btn-group>.btn-group:first-child:not(:last-child)>.btn:last-child,.btn-group>.btn-group:first-child:not(:last-child)>.dropdown-toggle{border-top-right-radius:0;border-bottom-right-radius:0}.btn-group>.btn-group:last-child:not(:first-child)>.btn:first-child{border-top-left-radius:0;border-bottom-left-radius:0}.btn-group .dropdown-toggle:active,.btn-group.open .dropdown-toggle{outline:0}.btn-group>.btn+.dropdown-toggle{padding-right:8px;padding-left:8px}.btn-group>.btn-lg+.dropdown-toggle{padding-right:12px;padding-left:12px}.btn-group.open .dropdown-toggle{-webkit-box-shadow:inset 0 3px 5px rgba(0,0,0,.125);box-shadow:inset 0 3px 5px rgba(0,0,0,.125)}.btn-group.open .dropdown-toggle.btn-link{-webkit-box-shadow:none;box-shadow:none}.btn .caret{margin-left:0}.btn-lg .caret{border-width:5px 5px 0;border-bottom-width:0}.dropup .btn-lg .caret{border-width:0 5px 5px}.btn-group-vertical>.btn,.btn-group-vertical>.btn-group,.btn-group-vertical>.btn-group>.btn{display:block;float:none;width:100%;max-width:100%}.btn-group-vertical>.btn-group>.btn{float:none}.btn-group-vertical>.btn+.btn,.btn-group-vertical>.btn+.btn-group,.btn-group-vertical>.btn-group+.btn,.btn-group-vertical>.btn-group+.btn-group{margin-top:-1px;margin-left:0}.btn-group-vertical>.btn:not(:first-child):not(:last-child){border-radius:0}.btn-group-vertical>.btn:first-child:not(:last-child){border-top-left-radius:4px;border-top-right-radius:4px;border-bottom-right-radius:0;border-bottom-left-radius:0}.btn-group-vertical>.btn:last-child:not(:first-child){border-top-left-radius:0;border-top-right-radius:0;border-bottom-right-radius:4px;border-bottom-left-radius:4px}.btn-group-vertical>.btn-group:not(:first-child):not(:last-child)>.btn{border-radius:0}.btn-group-vertical>.btn-group:first-child:not(:last-child)>.btn:last-child,.btn-group-vertical>.btn-group:first-child:not(:last-child)>.dropdown-toggle{border-bottom-right-radius:0;border-bottom-left-radius:0}.btn-group-vertical>.btn-group:last-child:not(:first-child)>.btn:first-child{border-top-left-radius:0;border-top-right-radius:0}.btn-group-justified{display:table;width:100%;table-layout:fixed;border-collapse:separate}.btn-group-justified>.btn,.btn-group-justified>.btn-group{display:table-cell;float:none;width:1%}.btn-group-justified>.btn-group .btn{width:100%}.btn-group-justified>.btn-group .dropdown-menu{left:auto}[data-toggle=buttons]>.btn input[type=checkbox],[data-toggle=buttons]>.btn input[type=radio],[data-toggle=buttons]>.btn-group>.btn input[type=checkbox],[data-toggle=buttons]>.btn-group>.btn input[type=radio]{position:absolute;clip:rect(0,0,0,0);pointer-events:none}.input-group{position:relative;display:table;border-collapse:separate}.input-group[class*=col-]{float:none;padding-right:0;padding-left:0}.input-group .form-control{position:relative;z-index:2;float:left;width:100%;margin-bottom:0}.input-group .form-control:focus{z-index:3}.input-group-lg>.form-control,.input-group-lg>.input-group-addon,.input-group-lg>.input-group-btn>.btn{height:46px;padding:10px 16px;font-size:18px;line-height:1.3333333;border-radius:6px}select.input-group-lg>.form-control,select.input-group-lg>.input-group-addon,select.input-group-lg>.input-group-btn>.btn{height:46px;line-height:46px}select[multiple].input-group-lg>.form-control,select[multiple].input-group-lg>.input-group-addon,select[multiple].input-group-lg>.input-group-btn>.btn,textarea.input-group-lg>.form-control,textarea.input-group-lg>.input-group-addon,textarea.input-group-lg>.input-group-btn>.btn{height:auto}.input-group-sm>.form-control,.input-group-sm>.input-group-addon,.input-group-sm>.input-group-btn>.btn{height:30px;padding:5px 10px;font-size:12px;line-height:1.5;border-radius:3px}select.input-group-sm>.form-control,select.input-group-sm>.input-group-addon,select.input-group-sm>.input-group-btn>.btn{height:30px;line-height:30px}select[multiple].input-group-sm>.form-control,select[multiple].input-group-sm>.input-group-addon,select[multiple].input-group-sm>.input-group-btn>.btn,textarea.input-group-sm>.form-control,textarea.input-group-sm>.input-group-addon,textarea.input-group-sm>.input-group-btn>.btn{height:auto}.input-group .form-control,.input-group-addon,.input-group-btn{display:table-cell}.input-group .form-control:not(:first-child):not(:last-child),.input-group-addon:not(:first-child):not(:last-child),.input-group-btn:not(:first-child):not(:last-child){border-radius:0}.input-group-addon,.input-group-btn{width:1%;white-space:nowrap;vertical-align:middle}.input-group-addon{padding:6px 12px;font-size:14px;font-weight:400;line-height:1;color:#555;text-align:center;background-color:#eee;border:1px solid #ccc;border-radius:4px}.input-group-addon.input-sm{padding:5px 10px;font-size:12px;border-radius:3px}.input-group-addon.input-lg{padding:10px 16px;font-size:18px;border-radius:6px}.input-group-addon input[type=checkbox],.input-group-addon input[type=radio]{margin-top:0}.input-group .form-control:first-child,.input-group-addon:first-child,.input-group-btn:first-child>.btn,.input-group-btn:first-child>.btn-group>.btn,.input-group-btn:first-child>.dropdown-toggle,.input-group-btn:last-child>.btn-group:not(:last-child)>.btn,.input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle){border-top-right-radius:0;border-bottom-right-radius:0}.input-group-addon:first-child{border-right:0}.input-group .form-control:last-child,.input-group-addon:last-child,.input-group-btn:first-child>.btn-group:not(:first-child)>.btn,.input-group-btn:first-child>.btn:not(:first-child),.input-group-btn:last-child>.btn,.input-group-btn:last-child>.btn-group>.btn,.input-group-btn:last-child>.dropdown-toggle{border-top-left-radius:0;border-bottom-left-radius:0}.input-group-addon:last-child{border-left:0}.input-group-btn{position:relative;font-size:0;white-space:nowrap}.input-group-btn>.btn{position:relative}.input-group-btn>.btn+.btn{margin-left:-1px}.input-group-btn>.btn:active,.input-group-btn>.btn:focus,.input-group-btn>.btn:hover{z-index:2}.input-group-btn:first-child>.btn,.input-group-btn:first-child>.btn-group{margin-right:-1px}.input-group-btn:last-child>.btn,.input-group-btn:last-child>.btn-group{z-index:2;margin-left:-1px}.nav{padding-left:0;margin-bottom:0;list-style:none}.nav>li{position:relative;display:block}.nav>li>a{position:relative;display:block;padding:10px 15px}.nav>li>a:focus,.nav>li>a:hover{text-decoration:none;background-color:#eee}.nav>li.disabled>a{color:#777}.nav>li.disabled>a:focus,.nav>li.disabled>a:hover{color:#777;text-decoration:none;cursor:not-allowed;background-color:transparent}.nav .open>a,.nav .open>a:focus,.nav .open>a:hover{background-color:#eee;border-color:#337ab7}.nav .nav-divider{height:1px;margin:9px 0;overflow:hidden;background-color:#e5e5e5}.nav>li>a>img{max-width:none}.nav-tabs{border-bottom:1px solid #ddd}.nav-tabs>li{float:left;margin-bottom:-1px}.nav-tabs>li>a{margin-right:2px;line-height:1.42857143;border:1px solid transparent;border-radius:4px 4px 0 0}.nav-tabs>li>a:hover{border-color:#eee #eee #ddd}.nav-tabs>li.active>a,.nav-tabs>li.active>a:focus,.nav-tabs>li.active>a:hover{color:#555;cursor:default;background-color:#fff;border:1px solid #ddd;border-bottom-color:transparent}.nav-tabs.nav-justified{width:100%;border-bottom:0}.nav-tabs.nav-justified>li{float:none}.nav-tabs.nav-justified>li>a{margin-bottom:5px;text-align:center}.nav-tabs.nav-justified>.dropdown .dropdown-menu{top:auto;left:auto}@media (min-width:768px){.nav-tabs.nav-justified>li{display:table-cell;width:1%}.nav-tabs.nav-justified>li>a{margin-bottom:0}}.nav-tabs.nav-justified>li>a{margin-right:0;border-radius:4px}.nav-tabs.nav-justified>.active>a,.nav-tabs.nav-justified>.active>a:focus,.nav-tabs.nav-justified>.active>a:hover{border:1px solid #ddd}@media (min-width:768px){.nav-tabs.nav-justified>li>a{border-bottom:1px solid #ddd;border-radius:4px 4px 0 0}.nav-tabs.nav-justified>.active>a,.nav-tabs.nav-justified>.active>a:focus,.nav-tabs.nav-justified>.active>a:hover{border-bottom-color:#fff}}.nav-pills>li{float:left}.nav-pills>li>a{border-radius:4px}.nav-pills>li+li{margin-left:2px}.nav-pills>li.active>a,.nav-pills>li.active>a:focus,.nav-pills>li.active>a:hover{color:#fff;background-color:#337ab7}.nav-stacked>li{float:none}.nav-stacked>li+li{margin-top:2px;margin-left:0}.nav-justified{width:100%}.nav-justified>li{float:none}.nav-justified>li>a{margin-bottom:5px;text-align:center}.nav-justified>.dropdown .dropdown-menu{top:auto;left:auto}@media (min-width:768px){.nav-justified>li{display:table-cell;width:1%}.nav-justified>li>a{margin-bottom:0}}.nav-tabs-justified{border-bottom:0}.nav-tabs-justified>li>a{margin-right:0;border-radius:4px}.nav-tabs-justified>.active>a,.nav-tabs-justified>.active>a:focus,.nav-tabs-justified>.active>a:hover{border:1px solid #ddd}@media (min-width:768px){.nav-tabs-justified>li>a{border-bottom:1px solid #ddd;border-radius:4px 4px 0 0}.nav-tabs-justified>.active>a,.nav-tabs-justified>.active>a:focus,.nav-tabs-justified>.active>a:hover{border-bottom-color:#fff}}.tab-content>.tab-pane{display:none}.tab-content>.active{display:block}.nav-tabs .dropdown-menu{margin-top:-1px;border-top-left-radius:0;border-top-right-radius:0}.navbar{position:relative;min-height:50px;margin-bottom:20px;border:1px solid transparent}@media (min-width:768px){.navbar{border-radius:4px}}@media (min-width:768px){.navbar-header{float:left}}.navbar-collapse{padding-right:15px;padding-left:15px;overflow-x:visible;-webkit-overflow-scrolling:touch;border-top:1px solid transparent;-webkit-box-shadow:inset 0 1px 0 rgba(255,255,255,.1);box-shadow:inset 0 1px 0 rgba(255,255,255,.1)}.navbar-collapse.in{overflow-y:auto}@media (min-width:768px){.navbar-collapse{width:auto;border-top:0;-webkit-box-shadow:none;box-shadow:none}.navbar-collapse.collapse{display:block!important;height:auto!important;padding-bottom:0;overflow:visible!important}.navbar-collapse.in{overflow-y:visible}.navbar-fixed-bottom .navbar-collapse,.navbar-fixed-top .navbar-collapse,.navbar-static-top .navbar-collapse{padding-right:0;padding-left:0}}.navbar-fixed-bottom .navbar-collapse,.navbar-fixed-top .navbar-collapse{max-height:340px}@media (max-device-width:480px) and (orientation:landscape){.navbar-fixed-bottom .navbar-collapse,.navbar-fixed-top .navbar-collapse{max-height:200px}}.container-fluid>.navbar-collapse,.container-fluid>.navbar-header,.container>.navbar-collapse,.container>.navbar-header{margin-right:-15px;margin-left:-15px}@media (min-width:768px){.container-fluid>.navbar-collapse,.container-fluid>.navbar-header,.container>.navbar-collapse,.container>.navbar-header{margin-right:0;margin-left:0}}.navbar-static-top{z-index:1000;border-width:0 0 1px}@media (min-width:768px){.navbar-static-top{border-radius:0}}.navbar-fixed-bottom,.navbar-fixed-top{position:fixed;right:0;left:0;z-index:1030}@media (min-width:768px){.navbar-fixed-bottom,.navbar-fixed-top{border-radius:0}}.navbar-fixed-top{top:0;border-width:0 0 1px}.navbar-fixed-bottom{bottom:0;margin-bottom:0;border-width:1px 0 0}.navbar-brand{float:left;height:50px;padding:15px 15px;font-size:18px;line-height:20px}.navbar-brand:focus,.navbar-brand:hover{text-decoration:none}.navbar-brand>img{display:block}@media (min-width:768px){.navbar>.container .navbar-brand,.navbar>.container-fluid .navbar-brand{margin-left:-15px}}.navbar-toggle{position:relative;float:right;padding:9px 10px;margin-top:8px;margin-right:15px;margin-bottom:8px;background-color:transparent;background-image:none;border:1px solid transparent;border-radius:4px}.navbar-toggle:focus{outline:0}.navbar-toggle .icon-bar{display:block;width:22px;height:2px;border-radius:1px}.navbar-toggle .icon-bar+.icon-bar{margin-top:4px}@media (min-width:768px){.navbar-toggle{display:none}}.navbar-nav{margin:7.5px -15px}.navbar-nav>li>a{padding-top:10px;padding-bottom:10px;line-height:20px}@media (max-width:767px){.navbar-nav .open .dropdown-menu{position:static;float:none;width:auto;margin-top:0;background-color:transparent;border:0;-webkit-box-shadow:none;box-shadow:none}.navbar-nav .open .dropdown-menu .dropdown-header,.navbar-nav .open .dropdown-menu>li>a{padding:5px 15px 5px 25px}.navbar-nav .open .dropdown-menu>li>a{line-height:20px}.navbar-nav .open .dropdown-menu>li>a:focus,.navbar-nav .open .dropdown-menu>li>a:hover{background-image:none}}@media (min-width:768px){.navbar-nav{float:left;margin:0}.navbar-nav>li{float:left}.navbar-nav>li>a{padding-top:15px;padding-bottom:15px}}.navbar-form{padding:10px 15px;margin-top:8px;margin-right:-15px;margin-bottom:8px;margin-left:-15px;border-top:1px solid transparent;border-bottom:1px solid transparent;-webkit-box-shadow:inset 0 1px 0 rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.1);box-shadow:inset 0 1px 0 rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.1)}@media (min-width:768px){.navbar-form .form-group{display:inline-block;margin-bottom:0;vertical-align:middle}.navbar-form .form-control{display:inline-block;width:auto;vertical-align:middle}.navbar-form .form-control-static{display:inline-block}.navbar-form .input-group{display:inline-table;vertical-align:middle}.navbar-form .input-group .form-control,.navbar-form .input-group .input-group-addon,.navbar-form .input-group .input-group-btn{width:auto}.navbar-form .input-group>.form-control{width:100%}.navbar-form .control-label{margin-bottom:0;vertical-align:middle}.navbar-form .checkbox,.navbar-form .radio{display:inline-block;margin-top:0;margin-bottom:0;vertical-align:middle}.navbar-form .checkbox label,.navbar-form .radio label{padding-left:0}.navbar-form .checkbox input[type=checkbox],.navbar-form .radio input[type=radio]{position:relative;margin-left:0}.navbar-form .has-feedback .form-control-feedback{top:0}}@media (max-width:767px){.navbar-form .form-group{margin-bottom:5px}.navbar-form .form-group:last-child{margin-bottom:0}}@media (min-width:768px){.navbar-form{width:auto;padding-top:0;padding-bottom:0;margin-right:0;margin-left:0;border:0;-webkit-box-shadow:none;box-shadow:none}}.navbar-nav>li>.dropdown-menu{margin-top:0;border-top-left-radius:0;border-top-right-radius:0}.navbar-fixed-bottom .navbar-nav>li>.dropdown-menu{margin-bottom:0;border-top-left-radius:4px;border-top-right-radius:4px;border-bottom-right-radius:0;border-bottom-left-radius:0}.navbar-btn{margin-top:8px;margin-bottom:8px}.navbar-btn.btn-sm{margin-top:10px;margin-bottom:10px}.navbar-btn.btn-xs{margin-top:14px;margin-bottom:14px}.navbar-text{margin-top:15px;margin-bottom:15px}@media (min-width:768px){.navbar-text{float:left;margin-right:15px;margin-left:15px}}@media (min-width:768px){.navbar-left{float:left!important}.navbar-right{float:right!important;margin-right:-15px}.navbar-right~.navbar-right{margin-right:0}}.navbar-default{background-color:#f8f8f8;border-color:#e7e7e7}.navbar-default .navbar-brand{color:#777}.navbar-default .navbar-brand:focus,.navbar-default .navbar-brand:hover{color:#5e5e5e;background-color:transparent}.navbar-default .navbar-text{color:#777}.navbar-default .navbar-nav>li>a{color:#777}.navbar-default .navbar-nav>li>a:focus,.navbar-default .navbar-nav>li>a:hover{color:#333;background-color:transparent}.navbar-default .navbar-nav>.active>a,.navbar-default .navbar-nav>.active>a:focus,.navbar-default .navbar-nav>.active>a:hover{color:#555;background-color:#e7e7e7}.navbar-default .navbar-nav>.disabled>a,.navbar-default .navbar-nav>.disabled>a:focus,.navbar-default .navbar-nav>.disabled>a:hover{color:#ccc;background-color:transparent}.navbar-default .navbar-toggle{border-color:#ddd}.navbar-default .navbar-toggle:focus,.navbar-default .navbar-toggle:hover{background-color:#ddd}.navbar-default .navbar-toggle .icon-bar{background-color:#888}.navbar-default .navbar-collapse,.navbar-default .navbar-form{border-color:#e7e7e7}.navbar-default .navbar-nav>.open>a,.navbar-default .navbar-nav>.open>a:focus,.navbar-default .navbar-nav>.open>a:hover{color:#555;background-color:#e7e7e7}@media (max-width:767px){.navbar-default .navbar-nav .open .dropdown-menu>li>a{color:#777}.navbar-default .navbar-nav .open .dropdown-menu>li>a:focus,.navbar-default .navbar-nav .open .dropdown-menu>li>a:hover{color:#333;background-color:transparent}.navbar-default .navbar-nav .open .dropdown-menu>.active>a,.navbar-default .navbar-nav .open .dropdown-menu>.active>a:focus,.navbar-default .navbar-nav .open .dropdown-menu>.active>a:hover{color:#555;background-color:#e7e7e7}.navbar-default .navbar-nav .open .dropdown-menu>.disabled>a,.navbar-default .navbar-nav .open .dropdown-menu>.disabled>a:focus,.navbar-default .navbar-nav .open .dropdown-menu>.disabled>a:hover{color:#ccc;background-color:transparent}}.navbar-default .navbar-link{color:#777}.navbar-default .navbar-link:hover{color:#333}.navbar-default .btn-link{color:#777}.navbar-default .btn-link:focus,.navbar-default .btn-link:hover{color:#333}.navbar-default .btn-link[disabled]:focus,.navbar-default .btn-link[disabled]:hover,fieldset[disabled] .navbar-default .btn-link:focus,fieldset[disabled] .navbar-default .btn-link:hover{color:#ccc}.navbar-inverse{background-color:#222;border-color:#080808}.navbar-inverse .navbar-brand{color:#9d9d9d}.navbar-inverse .navbar-brand:focus,.navbar-inverse .navbar-brand:hover{color:#fff;background-color:transparent}.navbar-inverse .navbar-text{color:#9d9d9d}.navbar-inverse .navbar-nav>li>a{color:#9d9d9d}.navbar-inverse .navbar-nav>li>a:focus,.navbar-inverse .navbar-nav>li>a:hover{color:#fff;background-color:transparent}.navbar-inverse .navbar-nav>.active>a,.navbar-inverse .navbar-nav>.active>a:focus,.navbar-inverse .navbar-nav>.active>a:hover{color:#fff;background-color:#080808}.navbar-inverse .navbar-nav>.disabled>a,.navbar-inverse .navbar-nav>.disabled>a:focus,.navbar-inverse .navbar-nav>.disabled>a:hover{color:#444;background-color:transparent}.navbar-inverse .navbar-toggle{border-color:#333}.navbar-inverse .navbar-toggle:focus,.navbar-inverse .navbar-toggle:hover{background-color:#333}.navbar-inverse .navbar-toggle .icon-bar{background-color:#fff}.navbar-inverse .navbar-collapse,.navbar-inverse .navbar-form{border-color:#101010}.navbar-inverse .navbar-nav>.open>a,.navbar-inverse .navbar-nav>.open>a:focus,.navbar-inverse .navbar-nav>.open>a:hover{color:#fff;background-color:#080808}@media (max-width:767px){.navbar-inverse .navbar-nav .open .dropdown-menu>.dropdown-header{border-color:#080808}.navbar-inverse .navbar-nav .open .dropdown-menu .divider{background-color:#080808}.navbar-inverse .navbar-nav .open .dropdown-menu>li>a{color:#9d9d9d}.navbar-inverse .navbar-nav .open .dropdown-menu>li>a:focus,.navbar-inverse .navbar-nav .open .dropdown-menu>li>a:hover{color:#fff;background-color:transparent}.navbar-inverse .navbar-nav .open .dropdown-menu>.active>a,.navbar-inverse .navbar-nav .open .dropdown-menu>.active>a:focus,.navbar-inverse .navbar-nav .open .dropdown-menu>.active>a:hover{color:#fff;background-color:#080808}.navbar-inverse .navbar-nav .open .dropdown-menu>.disabled>a,.navbar-inverse .navbar-nav .open .dropdown-menu>.disabled>a:focus,.navbar-inverse .navbar-nav .open .dropdown-menu>.disabled>a:hover{color:#444;background-color:transparent}}.navbar-inverse .navbar-link{color:#9d9d9d}.navbar-inverse .navbar-link:hover{color:#fff}.navbar-inverse .btn-link{color:#9d9d9d}.navbar-inverse .btn-link:focus,.navbar-inverse .btn-link:hover{color:#fff}.navbar-inverse .btn-link[disabled]:focus,.navbar-inverse .btn-link[disabled]:hover,fieldset[disabled] .navbar-inverse .btn-link:focus,fieldset[disabled] .navbar-inverse .btn-link:hover{color:#444}.breadcrumb{padding:8px 15px;margin-bottom:20px;list-style:none;background-color:#f5f5f5;border-radius:4px}.breadcrumb>li{display:inline-block}.breadcrumb>li+li:before{padding:0 5px;color:#ccc;content:"/\00a0"}.breadcrumb>.active{color:#777}.pagination{display:inline-block;padding-left:0;margin:20px 0;border-radius:4px}.pagination>li{display:inline}.pagination>li>a,.pagination>li>span{position:relative;float:left;padding:6px 12px;margin-left:-1px;line-height:1.42857143;color:#337ab7;text-decoration:none;background-color:#fff;border:1px solid #ddd}.pagination>li:first-child>a,.pagination>li:first-child>span{margin-left:0;border-top-left-radius:4px;border-bottom-left-radius:4px}.pagination>li:last-child>a,.pagination>li:last-child>span{border-top-right-radius:4px;border-bottom-right-radius:4px}.pagination>li>a:focus,.pagination>li>a:hover,.pagination>li>span:focus,.pagination>li>span:hover{z-index:2;color:#23527c;background-color:#eee;border-color:#ddd}.pagination>.active>a,.pagination>.active>a:focus,.pagination>.active>a:hover,.pagination>.active>span,.pagination>.active>span:focus,.pagination>.active>span:hover{z-index:3;color:#fff;cursor:default;background-color:#337ab7;border-color:#337ab7}.pagination>.disabled>a,.pagination>.disabled>a:focus,.pagination>.disabled>a:hover,.pagination>.disabled>span,.pagination>.disabled>span:focus,.pagination>.disabled>span:hover{color:#777;cursor:not-allowed;background-color:#fff;border-color:#ddd}.pagination-lg>li>a,.pagination-lg>li>span{padding:10px 16px;font-size:18px;line-height:1.3333333}.pagination-lg>li:first-child>a,.pagination-lg>li:first-child>span{border-top-left-radius:6px;border-bottom-left-radius:6px}.pagination-lg>li:last-child>a,.pagination-lg>li:last-child>span{border-top-right-radius:6px;border-bottom-right-radius:6px}.pagination-sm>li>a,.pagination-sm>li>span{padding:5px 10px;font-size:12px;line-height:1.5}.pagination-sm>li:first-child>a,.pagination-sm>li:first-child>span{border-top-left-radius:3px;border-bottom-left-radius:3px}.pagination-sm>li:last-child>a,.pagination-sm>li:last-child>span{border-top-right-radius:3px;border-bottom-right-radius:3px}.pager{padding-left:0;margin:20px 0;text-align:center;list-style:none}.pager li{display:inline}.pager li>a,.pager li>span{display:inline-block;padding:5px 14px;background-color:#fff;border:1px solid #ddd;border-radius:15px}.pager li>a:focus,.pager li>a:hover{text-decoration:none;background-color:#eee}.pager .next>a,.pager .next>span{float:right}.pager .previous>a,.pager .previous>span{float:left}.pager .disabled>a,.pager .disabled>a:focus,.pager .disabled>a:hover,.pager .disabled>span{color:#777;cursor:not-allowed;background-color:#fff}.label{display:inline;padding:.2em .6em .3em;font-size:75%;font-weight:700;line-height:1;color:#fff;text-align:center;white-space:nowrap;vertical-align:baseline;border-radius:.25em}a.label:focus,a.label:hover{color:#fff;text-decoration:none;cursor:pointer}.label:empty{display:none}.btn .label{position:relative;top:-1px}.label-default{background-color:#777}.label-default[href]:focus,.label-default[href]:hover{background-color:#5e5e5e}.label-primary{background-color:#337ab7}.label-primary[href]:focus,.label-primary[href]:hover{background-color:#286090}.label-success{background-color:#5cb85c}.label-success[href]:focus,.label-success[href]:hover{background-color:#449d44}.label-info{background-color:#5bc0de}.label-info[href]:focus,.label-info[href]:hover{background-color:#31b0d5}.label-warning{background-color:#f0ad4e}.label-warning[href]:focus,.label-warning[href]:hover{background-color:#ec971f}.label-danger{background-color:#d9534f}.label-danger[href]:focus,.label-danger[href]:hover{background-color:#c9302c}.btn-group-xs>.btn.btn-xs .list-group-item.active>.nav-pills>.active>a>.list-group-item>.badge{float:right}.list-group-item>.badge+.badge{margin-right:5px}.nav-pills>li>a>.badge{margin-left:3px}.jumbotron{padding-top:30px;padding-bottom:30px;margin-bottom:30px;color:inherit;background-color:#eee}.jumbotron .h1,.jumbotron h1{color:inherit}.jumbotron p{margin-bottom:15px;font-size:21px;font-weight:200}.jumbotron>hr{border-top-color:#d5d5d5}.container .jumbotron,.container-fluid .jumbotron{padding-right:15px;padding-left:15px;border-radius:6px}.jumbotron .container{max-width:100%}@media screen and (min-width:768px){.jumbotron{padding-top:48px;padding-bottom:48px}.container .jumbotron,.container-fluid .jumbotron{padding-right:60px;padding-left:60px}.jumbotron .h1,.jumbotron h1{font-size:63px}}.thumbnail{display:block;padding:4px;margin-bottom:20px;line-height:1.42857143;background-color:#fff;border:1px solid #ddd;border-radius:4px;-webkit-transition:border .2s ease-in-out;-o-transition:border .2s ease-in-out;transition:border .2s ease-in-out}.thumbnail a>img,.thumbnail>img{margin-right:auto;margin-left:auto}a.thumbnail.active,a.thumbnail:focus,a.thumbnail:hover{border-color:#337ab7}.thumbnail .caption{padding:9px;color:#333}.alert{padding:15px;margin-bottom:20px;border:1px solid transparent;border-radius:4px}.alert h4{margin-top:0;color:inherit}.alert .alert-link{font-weight:700}.alert>p,.alert>ul{margin-bottom:0}.alert>p+p{margin-top:5px}.alert-dismissable,.alert-dismissible{padding-right:35px}.alert-dismissable .close,.alert-dismissible .close{position:relative;top:-2px;right:-21px;color:inherit}.alert-success{color:#3c763d;background-color:#dff0d8;border-color:#d6e9c6}.alert-success hr{border-top-color:#c9e2b3}.alert-success .alert-link{color:#2b542c}.alert-info{color:#31708f;background-color:#d9edf7;border-color:#bce8f1}.alert-info hr{border-top-color:#a6e1ec}.alert-info .alert-link{color:#245269}.alert-warning{color:#8a6d3b;background-color:#fcf8e3;border-color:#faebcc}.alert-warning hr{border-top-color:#f7e1b5}.alert-warning .alert-link{color:#66512c}.alert-danger{color:#a94442;background-color:#f2dede;border-color:#ebccd1}.alert-danger hr{border-top-color:#e4b9c0}.alert-danger .alert-link{color:#843534}@-webkit-keyframes progress-bar-stripes{from{background-position:40px 0}to{background-position:0 0}}@-o-keyframes progress-bar-stripes{from{background-position:40px 0}to{background-position:0 0}}@keyframes progress-bar-stripes{from{background-position:40px 0}to{background-position:0 0}}.progress{height:20px;margin-bottom:20px;overflow:hidden;background-color:#f5f5f5;border-radius:4px;-webkit-box-shadow:inset 0 1px 2px rgba(0,0,0,.1);box-shadow:inset 0 1px 2px rgba(0,0,0,.1)}.progress-bar{float:left;width:0;height:100%;font-size:12px;line-height:20px;color:#fff;text-align:center;background-color:#337ab7;-webkit-box-shadow:inset 0 -1px 0 rgba(0,0,0,.15);box-shadow:inset 0 -1px 0 rgba(0,0,0,.15);-webkit-transition:width .6s ease;-o-transition:width .6s ease;transition:width .6s ease}.progress-bar-striped,.progress-striped .progress-bar{background-image:-webkit-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:-o-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);-webkit-background-size:40px 40px;background-size:40px 40px}.progress-bar.active,.progress.active .progress-bar{-webkit-animation:progress-bar-stripes 2s linear infinite;-o-animation:progress-bar-stripes 2s linear infinite;animation:progress-bar-stripes 2s linear infinite}.progress-bar-success{background-color:#5cb85c}.progress-striped .progress-bar-success{background-image:-webkit-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:-o-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent)}.progress-bar-info{background-color:#5bc0de}.progress-striped .progress-bar-info{background-image:-webkit-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:-o-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent)}.progress-bar-warning{background-color:#f0ad4e}.progress-striped .progress-bar-warning{background-image:-webkit-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:-o-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent)}.progress-bar-danger{background-color:#d9534f}.progress-striped .progress-bar-danger{background-image:-webkit-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:-o-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent)}.media{margin-top:15px}.media:first-child{margin-top:0}.media,.media-body{overflow:hidden;zoom:1}.media-body{width:10000px}.media-object{display:block}.media-object.img-thumbnail{max-width:none}.media-right,.media>.pull-right{padding-left:10px}.media-left,.media>.pull-left{padding-right:10px}.media-body,.media-left,.media-right{display:table-cell;vertical-align:top}.media-middle{vertical-align:middle}.media-bottom{vertical-align:bottom}.media-heading{margin-top:0;margin-bottom:5px}.media-list{padding-left:0;list-style:none}.list-group{padding-left:0;margin-bottom:20px}.list-group-item{position:relative;display:block;padding:10px 15px;margin-bottom:-1px;background-color:#fff;border:1px solid #ddd}.list-group-item:first-child{border-top-left-radius:4px;border-top-right-radius:4px}.list-group-item:last-child{margin-bottom:0;border-bottom-right-radius:4px;border-bottom-left-radius:4px}a.list-group-item,button.list-group-item{color:#555}a.list-group-item .list-group-item-heading,button.list-group-item .list-group-item-heading{color:#333}a.list-group-item:focus,a.list-group-item:hover,button.list-group-item:focus,button.list-group-item:hover{color:#555;text-decoration:none;background-color:#f5f5f5}button.list-group-item{width:100%;text-align:left}.list-group-item.disabled,.list-group-item.disabled:focus,.list-group-item.disabled:hover{color:#777;cursor:not-allowed;background-color:#eee}.list-group-item.disabled .list-group-item-heading,.list-group-item.disabled:focus .list-group-item-heading,.list-group-item.disabled:hover .list-group-item-heading{color:inherit}.list-group-item.disabled .list-group-item-text,.list-group-item.disabled:focus .list-group-item-text,.list-group-item.disabled:hover .list-group-item-text{color:#777}.list-group-item.active,.list-group-item.active:focus,.list-group-item.active:hover{z-index:2;color:#fff;background-color:#337ab7;border-color:#337ab7}.list-group-item.active .list-group-item-heading,.list-group-item.active .list-group-item-heading>.small,.list-group-item.active .list-group-item-heading>small,.list-group-item.active:focus .list-group-item-heading,.list-group-item.active:focus .list-group-item-heading>.small,.list-group-item.active:focus .list-group-item-heading>small,.list-group-item.active:hover .list-group-item-heading,.list-group-item.active:hover .list-group-item-heading>.small,.list-group-item.active:hover .list-group-item-heading>small{color:inherit}.list-group-item.active .list-group-item-text,.list-group-item.active:focus .list-group-item-text,.list-group-item.active:hover .list-group-item-text{color:#c7ddef}.list-group-item-success{color:#3c763d;background-color:#dff0d8}a.list-group-item-success,button.list-group-item-success{color:#3c763d}a.list-group-item-success .list-group-item-heading,button.list-group-item-success .list-group-item-heading{color:inherit}a.list-group-item-success:focus,a.list-group-item-success:hover,button.list-group-item-success:focus,button.list-group-item-success:hover{color:#3c763d;background-color:#d0e9c6}a.list-group-item-success.active,a.list-group-item-success.active:focus,a.list-group-item-success.active:hover,button.list-group-item-success.active,button.list-group-item-success.active:focus,button.list-group-item-success.active:hover{color:#fff;background-color:#3c763d;border-color:#3c763d}.list-group-item-info{color:#31708f;background-color:#d9edf7}a.list-group-item-info,button.list-group-item-info{color:#31708f}a.list-group-item-info .list-group-item-heading,button.list-group-item-info .list-group-item-heading{color:inherit}a.list-group-item-info:focus,a.list-group-item-info:hover,button.list-group-item-info:focus,button.list-group-item-info:hover{color:#31708f;background-color:#c4e3f3}a.list-group-item-info.active,a.list-group-item-info.active:focus,a.list-group-item-info.active:hover,button.list-group-item-info.active,button.list-group-item-info.active:focus,button.list-group-item-info.active:hover{color:#fff;background-color:#31708f;border-color:#31708f}.list-group-item-warning{color:#8a6d3b;background-color:#fcf8e3}a.list-group-item-warning,button.list-group-item-warning{color:#8a6d3b}a.list-group-item-warning .list-group-item-heading,button.list-group-item-warning .list-group-item-heading{color:inherit}a.list-group-item-warning:focus,a.list-group-item-warning:hover,button.list-group-item-warning:focus,button.list-group-item-warning:hover{color:#8a6d3b;background-color:#faf2cc}a.list-group-item-warning.active,a.list-group-item-warning.active:focus,a.list-group-item-warning.active:hover,button.list-group-item-warning.active,button.list-group-item-warning.active:focus,button.list-group-item-warning.active:hover{color:#fff;background-color:#8a6d3b;border-color:#8a6d3b}.list-group-item-danger{color:#a94442;background-color:#f2dede}a.list-group-item-danger,button.list-group-item-danger{color:#a94442}a.list-group-item-danger .list-group-item-heading,button.list-group-item-danger .list-group-item-heading{color:inherit}a.list-group-item-danger:focus,a.list-group-item-danger:hover,button.list-group-item-danger:focus,button.list-group-item-danger:hover{color:#a94442;background-color:#ebcccc}a.list-group-item-danger.active,a.list-group-item-danger.active:focus,a.list-group-item-danger.active:hover,button.list-group-item-danger.active,button.list-group-item-danger.active:focus,button.list-group-item-danger.active:hover{color:#fff;background-color:#a94442;border-color:#a94442}.list-group-item-heading{margin-top:0;margin-bottom:5px}.list-group-item-text{margin-bottom:0;line-height:1.3}.panel{margin-bottom:20px;background-color:#fff;border:1px solid transparent;border-radius:4px;-webkit-box-shadow:0 1px 1px rgba(0,0,0,.05);box-shadow:0 1px 1px rgba(0,0,0,.05)}.panel-body{padding:15px}.panel-heading{padding:10px 15px;border-bottom:1px solid transparent;border-top-left-radius:3px;border-top-right-radius:3px}.panel-heading>.dropdown .dropdown-toggle{color:inherit}.panel-title{margin-top:0;margin-bottom:0;font-size:16px;color:inherit}.panel-title>.small,.panel-title>.small>a,.panel-title>a,.panel-title>small,.panel-title>small>a{color:inherit}.panel-footer{padding:10px 15px;background-color:#f5f5f5;border-top:1px solid #ddd;border-bottom-right-radius:3px;border-bottom-left-radius:3px}.panel>.list-group,.panel>.panel-collapse>.list-group{margin-bottom:0}.panel>.list-group .list-group-item,.panel>.panel-collapse>.list-group .list-group-item{border-width:1px 0;border-radius:0}.panel>.list-group:first-child .list-group-item:first-child,.panel>.panel-collapse>.list-group:first-child .list-group-item:first-child{border-top:0;border-top-left-radius:3px;border-top-right-radius:3px}.panel>.list-group:last-child .list-group-item:last-child,.panel>.panel-collapse>.list-group:last-child .list-group-item:last-child{border-bottom:0;border-bottom-right-radius:3px;border-bottom-left-radius:3px}.panel>.panel-heading+.panel-collapse>.list-group .list-group-item:first-child{border-top-left-radius:0;border-top-right-radius:0}.panel-heading+.list-group .list-group-item:first-child{border-top-width:0}.list-group+.panel-footer{border-top-width:0}.panel>.panel-collapse>.table,.panel>.table,.panel>.table-responsive>.table{margin-bottom:0}.panel>.panel-collapse>.table caption,.panel>.table caption,.panel>.table-responsive>.table caption{padding-right:15px;padding-left:15px}.panel>.table-responsive:first-child>.table:first-child,.panel>.table:first-child{border-top-left-radius:3px;border-top-right-radius:3px}.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child,.panel>.table:first-child>tbody:first-child>tr:first-child,.panel>.table:first-child>thead:first-child>tr:first-child{border-top-left-radius:3px;border-top-right-radius:3px}.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child td:first-child,.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child th:first-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child td:first-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child th:first-child,.panel>.table:first-child>tbody:first-child>tr:first-child td:first-child,.panel>.table:first-child>tbody:first-child>tr:first-child th:first-child,.panel>.table:first-child>thead:first-child>tr:first-child td:first-child,.panel>.table:first-child>thead:first-child>tr:first-child th:first-child{border-top-left-radius:3px}.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child td:last-child,.panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child th:last-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child td:last-child,.panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child th:last-child,.panel>.table:first-child>tbody:first-child>tr:first-child td:last-child,.panel>.table:first-child>tbody:first-child>tr:first-child th:last-child,.panel>.table:first-child>thead:first-child>tr:first-child td:last-child,.panel>.table:first-child>thead:first-child>tr:first-child th:last-child{border-top-right-radius:3px}.panel>.table-responsive:last-child>.table:last-child,.panel>.table:last-child{border-bottom-right-radius:3px;border-bottom-left-radius:3px}.panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child,.panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child,.panel>.table:last-child>tbody:last-child>tr:last-child,.panel>.table:last-child>tfoot:last-child>tr:last-child{border-bottom-right-radius:3px;border-bottom-left-radius:3px}.panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child td:first-child,.panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child th:first-child,.panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child td:first-child,.panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child th:first-child,.panel>.table:last-child>tbody:last-child>tr:last-child td:first-child,.panel>.table:last-child>tbody:last-child>tr:last-child th:first-child,.panel>.table:last-child>tfoot:last-child>tr:last-child td:first-child,.panel>.table:last-child>tfoot:last-child>tr:last-child th:first-child{border-bottom-left-radius:3px}.panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child td:last-child,.panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child th:last-child,.panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child td:last-child,.panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child th:last-child,.panel>.table:last-child>tbody:last-child>tr:last-child td:last-child,.panel>.table:last-child>tbody:last-child>tr:last-child th:last-child,.panel>.table:last-child>tfoot:last-child>tr:last-child td:last-child,.panel>.table:last-child>tfoot:last-child>tr:last-child th:last-child{border-bottom-right-radius:3px}.panel>.panel-body+.table,.panel>.panel-body+.table-responsive,.panel>.table+.panel-body,.panel>.table-responsive+.panel-body{border-top:1px solid #ddd}.panel>.table>tbody:first-child>tr:first-child td,.panel>.table>tbody:first-child>tr:first-child th{border-top:0}.panel>.table-bordered,.panel>.table-responsive>.table-bordered{border:0}.panel>.table-bordered>tbody>tr>td:first-child,.panel>.table-bordered>tbody>tr>th:first-child,.panel>.table-bordered>tfoot>tr>td:first-child,.panel>.table-bordered>tfoot>tr>th:first-child,.panel>.table-bordered>thead>tr>td:first-child,.panel>.table-bordered>thead>tr>th:first-child,.panel>.table-responsive>.table-bordered>tbody>tr>td:first-child,.panel>.table-responsive>.table-bordered>tbody>tr>th:first-child,.panel>.table-responsive>.table-bordered>tfoot>tr>td:first-child,.panel>.table-responsive>.table-bordered>tfoot>tr>th:first-child,.panel>.table-responsive>.table-bordered>thead>tr>td:first-child,.panel>.table-responsive>.table-bordered>thead>tr>th:first-child{border-left:0}.panel>.table-bordered>tbody>tr>td:last-child,.panel>.table-bordered>tbody>tr>th:last-child,.panel>.table-bordered>tfoot>tr>td:last-child,.panel>.table-bordered>tfoot>tr>th:last-child,.panel>.table-bordered>thead>tr>td:last-child,.panel>.table-bordered>thead>tr>th:last-child,.panel>.table-responsive>.table-bordered>tbody>tr>td:last-child,.panel>.table-responsive>.table-bordered>tbody>tr>th:last-child,.panel>.table-responsive>.table-bordered>tfoot>tr>td:last-child,.panel>.table-responsive>.table-bordered>tfoot>tr>th:last-child,.panel>.table-responsive>.table-bordered>thead>tr>td:last-child,.panel>.table-responsive>.table-bordered>thead>tr>th:last-child{border-right:0}.panel>.table-bordered>tbody>tr:first-child>td,.panel>.table-bordered>tbody>tr:first-child>th,.panel>.table-bordered>thead>tr:first-child>td,.panel>.table-bordered>thead>tr:first-child>th,.panel>.table-responsive>.table-bordered>tbody>tr:first-child>td,.panel>.table-responsive>.table-bordered>tbody>tr:first-child>th,.panel>.table-responsive>.table-bordered>thead>tr:first-child>td,.panel>.table-responsive>.table-bordered>thead>tr:first-child>th{border-bottom:0}.panel>.table-bordered>tbody>tr:last-child>td,.panel>.table-bordered>tbody>tr:last-child>th,.panel>.table-bordered>tfoot>tr:last-child>td,.panel>.table-bordered>tfoot>tr:last-child>th,.panel>.table-responsive>.table-bordered>tbody>tr:last-child>td,.panel>.table-responsive>.table-bordered>tbody>tr:last-child>th,.panel>.table-responsive>.table-bordered>tfoot>tr:last-child>td,.panel>.table-responsive>.table-bordered>tfoot>tr:last-child>th{border-bottom:0}.panel>.table-responsive{margin-bottom:0;border:0}.panel-group{margin-bottom:20px}.panel-group .panel{margin-bottom:0;border-radius:4px}.panel-group .panel+.panel{margin-top:5px}.panel-group .panel-heading{border-bottom:0}.panel-group .panel-heading+.panel-collapse>.list-group,.panel-group .panel-heading+.panel-collapse>.panel-body{border-top:1px solid #ddd}.panel-group .panel-footer{border-top:0}.panel-group .panel-footer+.panel-collapse .panel-body{border-bottom:1px solid #ddd}.panel-default{border-color:#ddd}.panel-default>.panel-heading{color:#333;background-color:#f5f5f5;border-color:#ddd}.panel-default>.panel-heading+.panel-collapse>.panel-body{border-top-color:#ddd}.panel-default>.panel-heading .badge{color:#f5f5f5;background-color:#333}.panel-default>.panel-footer+.panel-collapse>.panel-body{border-bottom-color:#ddd}.panel-primary{border-color:#337ab7}.panel-primary>.panel-heading{color:#fff;background-color:#337ab7;border-color:#337ab7}.panel-primary>.panel-heading+.panel-collapse>.panel-body{border-top-color:#337ab7}.panel-primary>.panel-heading .badge{color:#337ab7;background-color:#fff}.panel-primary>.panel-footer+.panel-collapse>.panel-body{border-bottom-color:#337ab7}.panel-success{border-color:#d6e9c6}.panel-success>.panel-heading{color:#3c763d;background-color:#dff0d8;border-color:#d6e9c6}.panel-success>.panel-heading+.panel-collapse>.panel-body{border-top-color:#d6e9c6}.panel-success>.panel-heading .badge{color:#dff0d8;background-color:#3c763d}.panel-success>.panel-footer+.panel-collapse>.panel-body{border-bottom-color:#d6e9c6}.panel-info{border-color:#bce8f1}.panel-info>.panel-heading{color:#31708f;background-color:#d9edf7;border-color:#bce8f1}.panel-info>.panel-heading+.panel-collapse>.panel-body{border-top-color:#bce8f1}.panel-info>.panel-heading .badge{color:#d9edf7;background-color:#31708f}.panel-info>.panel-footer+.panel-collapse>.panel-body{border-bottom-color:#bce8f1}.panel-warning{border-color:#faebcc}.panel-warning>.panel-heading{color:#8a6d3b;background-color:#fcf8e3;border-color:#faebcc}.panel-warning>.panel-heading+.panel-collapse>.panel-body{border-top-color:#faebcc}.panel-warning>.panel-heading .badge{color:#fcf8e3;background-color:#8a6d3b}.panel-warning>.panel-footer+.panel-collapse>.panel-body{border-bottom-color:#faebcc}.panel-danger{border-color:#ebccd1}.panel-danger>.panel-heading{color:#a94442;background-color:#f2dede;border-color:#ebccd1}.panel-danger>.panel-heading+.panel-collapse>.panel-body{border-top-color:#ebccd1}.panel-danger>.panel-heading .badge{color:#f2dede;background-color:#a94442}.panel-danger>.panel-footer+.panel-collapse>.panel-body{border-bottom-color:#ebccd1}.embed-responsive{position:relative;display:block;height:0;padding:0;overflow:hidden}.embed-responsive .embed-responsive-item,.embed-responsive embed,.embed-responsive iframe,.embed-responsive object,.embed-responsive video{position:absolute;top:0;bottom:0;left:0;width:100%;height:100%;border:0}.embed-responsive-16by9{padding-bottom:56.25%}.embed-responsive-4by3{padding-bottom:75%}.well{min-height:20px;padding:19px;margin-bottom:20px;background-color:#f5f5f5;border:1px solid #e3e3e3;border-radius:4px;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.05);box-shadow:inset 0 1px 1px rgba(0,0,0,.05)}.well blockquote{border-color:#ddd;border-color:rgba(0,0,0,.15)}.well-lg{padding:24px;border-radius:6px}.well-sm{padding:9px;border-radius:3px}.close{float:right;font-size:21px;font-weight:700;line-height:1;color:#000;text-shadow:0 1px 0 #fff;filter:alpha(opacity=20);opacity:.2}.close:focus,.close:hover{color:#000;text-decoration:none;cursor:pointer;filter:alpha(opacity=50);opacity:.5}button.close{-webkit-appearance:none;padding:0;cursor:pointer;background:0 0;border:0}.modal-open{overflow:hidden}.modal{position:fixed;top:0;right:0;bottom:0;left:0;z-index:1050;display:none;overflow:hidden;-webkit-overflow-scrolling:touch;outline:0}.modal.fade .modal-dialog{-webkit-transition:-webkit-transform .3s ease-out;-o-transition:-o-transform .3s ease-out;transition:transform .3s ease-out;-webkit-transform:translate(0,-25%);-ms-transform:translate(0,-25%);-o-transform:translate(0,-25%);transform:translate(0,-25%)}.modal.in .modal-dialog{-webkit-transform:translate(0,0);-ms-transform:translate(0,0);-o-transform:translate(0,0);transform:translate(0,0)}.modal-open .modal{overflow-x:hidden;overflow-y:auto}.modal-dialog{position:relative;width:auto;margin:10px}.modal-content{position:relative;background-color:#fff;-webkit-background-clip:padding-box;background-clip:padding-box;border:1px solid #999;border:1px solid rgba(0,0,0,.2);border-radius:6px;outline:0;-webkit-box-shadow:0 3px 9px rgba(0,0,0,.5);box-shadow:0 3px 9px rgba(0,0,0,.5)}.modal-backdrop{position:fixed;top:0;right:0;bottom:0;left:0;z-index:1040;background-color:#000}.modal-backdrop.fade{filter:alpha(opacity=0);opacity:0}.modal-backdrop.in{filter:alpha(opacity=50);opacity:.5}.modal-header{padding:15px;border-bottom:1px solid #e5e5e5}.modal-header .close{margin-top:-2px}.modal-title{margin:0;line-height:1.42857143}.modal-body{position:relative;padding:15px}.modal-footer{padding:15px;text-align:right;border-top:1px solid #e5e5e5}.modal-footer .btn+.btn{margin-bottom:0;margin-left:5px}.modal-footer .btn-group .btn+.btn{margin-left:-1px}.modal-footer .btn-block+.btn-block{margin-left:0}.modal-scrollbar-measure{position:absolute;top:-9999px;width:50px;height:50px;overflow:scroll}@media (min-width:768px){.modal-dialog{width:600px;margin:30px auto}.modal-content{-webkit-box-shadow:0 5px 15px rgba(0,0,0,.5);box-shadow:0 5px 15px rgba(0,0,0,.5)}.modal-sm{width:300px}}@media (min-width:992px){.modal-lg{width:900px}}.tooltip{position:absolute;z-index:1070;display:block;font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;font-size:12px;font-style:normal;font-weight:400;line-height:1.42857143;text-align:left;text-align:start;text-decoration:none;text-shadow:none;text-transform:none;letter-spacing:normal;word-break:normal;word-spacing:normal;word-wrap:normal;white-space:normal;filter:alpha(opacity=0);opacity:0;line-break:auto}.tooltip.in{filter:alpha(opacity=90);opacity:.9}.tooltip.top{padding:5px 0;margin-top:-3px}.tooltip.right{padding:0 5px;margin-left:3px}.tooltip.bottom{padding:5px 0;margin-top:3px}.tooltip.left{padding:0 5px;margin-left:-3px}.tooltip-inner{max-width:200px;padding:3px 8px;color:#fff;text-align:center;background-color:#000;border-radius:4px}.tooltip-arrow{position:absolute;width:0;height:0;border-color:transparent;border-style:solid}.tooltip.top .tooltip-arrow{bottom:0;left:50%;margin-left:-5px;border-width:5px 5px 0;border-top-color:#000}.tooltip.top-left .tooltip-arrow{right:5px;bottom:0;margin-bottom:-5px;border-width:5px 5px 0;border-top-color:#000}.tooltip.top-right .tooltip-arrow{bottom:0;left:5px;margin-bottom:-5px;border-width:5px 5px 0;border-top-color:#000}.tooltip.right .tooltip-arrow{top:50%;left:0;margin-top:-5px;border-width:5px 5px 5px 0;border-right-color:#000}.tooltip.left .tooltip-arrow{top:50%;right:0;margin-top:-5px;border-width:5px 0 5px 5px;border-left-color:#000}.tooltip.bottom .tooltip-arrow{top:0;left:50%;margin-left:-5px;border-width:0 5px 5px;border-bottom-color:#000}.tooltip.bottom-left .tooltip-arrow{top:0;right:5px;margin-top:-5px;border-width:0 5px 5px;border-bottom-color:#000}.tooltip.bottom-right .tooltip-arrow{top:0;left:5px;margin-top:-5px;border-width:0 5px 5px;border-bottom-color:#000}.popover{position:absolute;top:0;left:0;z-index:1060;display:none;max-width:276px;padding:1px;font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;font-size:14px;font-style:normal;font-weight:400;line-height:1.42857143;text-align:left;text-align:start;text-decoration:none;text-shadow:none;text-transform:none;letter-spacing:normal;word-break:normal;word-spacing:normal;word-wrap:normal;white-space:normal;background-color:#fff;-webkit-background-clip:padding-box;background-clip:padding-box;border:1px solid #ccc;border:1px solid rgba(0,0,0,.2);border-radius:6px;-webkit-box-shadow:0 5px 10px rgba(0,0,0,.2);box-shadow:0 5px 10px rgba(0,0,0,.2);line-break:auto}.popover.top{margin-top:-10px}.popover.right{margin-left:10px}.popover.bottom{margin-top:10px}.popover.left{margin-left:-10px}.popover-title{padding:8px 14px;margin:0;font-size:14px;background-color:#f7f7f7;border-bottom:1px solid #ebebeb;border-radius:5px 5px 0 0}.popover-content{padding:9px 14px}.popover>.arrow,.popover>.arrow:after{position:absolute;display:block;width:0;height:0;border-color:transparent;border-style:solid}.popover>.arrow{border-width:11px}.popover>.arrow:after{content:"";border-width:10px}.popover.top>.arrow{bottom:-11px;left:50%;margin-left:-11px;border-top-color:#999;border-top-color:rgba(0,0,0,.25);border-bottom-width:0}.popover.top>.arrow:after{bottom:1px;margin-left:-10px;content:" ";border-top-color:#fff;border-bottom-width:0}.popover.right>.arrow{top:50%;left:-11px;margin-top:-11px;border-right-color:#999;border-right-color:rgba(0,0,0,.25);border-left-width:0}.popover.right>.arrow:after{bottom:-10px;left:1px;content:" ";border-right-color:#fff;border-left-width:0}.popover.bottom>.arrow{top:-11px;left:50%;margin-left:-11px;border-top-width:0;border-bottom-color:#999;border-bottom-color:rgba(0,0,0,.25)}.popover.bottom>.arrow:after{top:1px;margin-left:-10px;content:" ";border-top-width:0;border-bottom-color:#fff}.popover.left>.arrow{top:50%;right:-11px;margin-top:-11px;border-right-width:0;border-left-color:#999;border-left-color:rgba(0,0,0,.25)}.popover.left>.arrow:after{right:1px;bottom:-10px;content:" ";border-right-width:0;border-left-color:#fff}.carousel{position:relative}.carousel-inner{position:relative;width:100%;overflow:hidden}.carousel-inner>.item{position:relative;display:none;-webkit-transition:.6s ease-in-out left;-o-transition:.6s ease-in-out left;transition:.6s ease-in-out left}.carousel-inner>.item>a>img,.carousel-inner>.item>img{line-height:1}@media all and (transform-3d),(-webkit-transform-3d){.carousel-inner>.item{-webkit-transition:-webkit-transform .6s ease-in-out;-o-transition:-o-transform .6s ease-in-out;transition:transform .6s ease-in-out;-webkit-backface-visibility:hidden;backface-visibility:hidden;-webkit-perspective:1000px;perspective:1000px}.carousel-inner>.item.active.right,.carousel-inner>.item.next{left:0;-webkit-transform:translate3d(100%,0,0);transform:translate3d(100%,0,0)}.carousel-inner>.item.active.left,.carousel-inner>.item.prev{left:0;-webkit-transform:translate3d(-100%,0,0);transform:translate3d(-100%,0,0)}.carousel-inner>.item.active,.carousel-inner>.item.next.left,.carousel-inner>.item.prev.right{left:0;-webkit-transform:translate3d(0,0,0);transform:translate3d(0,0,0)}}.carousel-inner>.active,.carousel-inner>.next,.carousel-inner>.prev{display:block}.carousel-inner>.active{left:0}.carousel-inner>.next,.carousel-inner>.prev{position:absolute;top:0;width:100%}.carousel-inner>.next{left:100%}.carousel-inner>.prev{left:-100%}.carousel-inner>.next.left,.carousel-inner>.prev.right{left:0}.carousel-inner>.active.left{left:-100%}.carousel-inner>.active.right{left:100%}.carousel-control{position:absolute;top:0;bottom:0;left:0;width:15%;font-size:20px;color:#fff;text-align:center;text-shadow:0 1px 2px rgba(0,0,0,.6);background-color:rgba(0,0,0,0);filter:alpha(opacity=50);opacity:.5}.carousel-control.left{background-image:-webkit-linear-gradient(left,rgba(0,0,0,.5) 0,rgba(0,0,0,.0001) 100%);background-image:-o-linear-gradient(left,rgba(0,0,0,.5) 0,rgba(0,0,0,.0001) 100%);background-image:-webkit-gradient(linear,left top,right top,from(rgba(0,0,0,.5)),to(rgba(0,0,0,.0001)));background-image:linear-gradient(to right,rgba(0,0,0,.5) 0,rgba(0,0,0,.0001) 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#80000000', endColorstr='#00000000', GradientType=1);background-repeat:repeat-x}.carousel-control.right{right:0;left:auto;background-image:-webkit-linear-gradient(left,rgba(0,0,0,.0001) 0,rgba(0,0,0,.5) 100%);background-image:-o-linear-gradient(left,rgba(0,0,0,.0001) 0,rgba(0,0,0,.5) 100%);background-image:-webkit-gradient(linear,left top,right top,from(rgba(0,0,0,.0001)),to(rgba(0,0,0,.5)));background-image:linear-gradient(to right,rgba(0,0,0,.0001) 0,rgba(0,0,0,.5) 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1);background-repeat:repeat-x}.carousel-control:focus,.carousel-control:hover{color:#fff;text-decoration:none;filter:alpha(opacity=90);outline:0;opacity:.9}.carousel-control .glyphicon-chevron-left,.carousel-control .glyphicon-chevron-right,.carousel-control .icon-next,.carousel-control .icon-prev{position:absolute;top:50%;z-index:5;display:inline-block;margin-top:-10px}.carousel-control .glyphicon-chevron-left,.carousel-control .icon-prev{left:50%;margin-left:-10px}.carousel-control .glyphicon-chevron-right,.carousel-control .icon-next{right:50%;margin-right:-10px}.carousel-control .icon-next,.carousel-control .icon-prev{width:20px;height:20px;font-family:serif;line-height:1}.carousel-control .icon-prev:before{content:'\2039'}.carousel-control .icon-next:before{content:'\203a'}.carousel-indicators{position:absolute;bottom:10px;left:50%;z-index:15;width:60%;padding-left:0;margin-left:-30%;text-align:center;list-style:none}.carousel-indicators li{display:inline-block;width:10px;height:10px;margin:1px;text-indent:-999px;cursor:pointer;background-color:#000\9;background-color:rgba(0,0,0,0);border:1px solid #fff;border-radius:10px}.carousel-indicators .active{width:12px;height:12px;margin:0;background-color:#fff}.carousel-caption{position:absolute;right:15%;bottom:20px;left:15%;z-index:10;padding-top:20px;padding-bottom:20px;color:#fff;text-align:center;text-shadow:0 1px 2px rgba(0,0,0,.6)}.carousel-caption .btn{text-shadow:none}@media screen and (min-width:768px){.carousel-control .glyphicon-chevron-left,.carousel-control .glyphicon-chevron-right,.carousel-control .icon-next,.carousel-control .icon-prev{width:30px;height:30px;margin-top:-10px;font-size:30px}.carousel-control .glyphicon-chevron-left,.carousel-control .icon-prev{margin-left:-10px}.carousel-control .glyphicon-chevron-right,.carousel-control .icon-next{margin-right:-10px}.carousel-caption{right:20%;left:20%;padding-bottom:30px}.carousel-indicators{bottom:20px}}.btn-group-vertical>.btn-group:after,.btn-group-vertical>.btn-group:before,.btn-toolbar:after,.btn-toolbar:before,.clearfix:after,.clearfix:before,.container-fluid:after,.container-fluid:before,.container:after,.container:before,.dl-horizontal dd:after,.dl-horizontal dd:before,.form-horizontal .form-group:after,.form-horizontal .form-group:before,.modal-footer:after,.modal-footer:before,.modal-header:after,.modal-header:before,.nav:after,.nav:before,.navbar-collapse:after,.navbar-collapse:before,.navbar-header:after,.navbar-header:before,.navbar:after,.navbar:before,.pager:after,.pager:before,.panel-body:after,.panel-body:before,.row:after,.row:before{display:table;content:" "}.btn-group-vertical>.btn-group:after,.btn-toolbar:after,.clearfix:after,.container-fluid:after,.container:after,.dl-horizontal dd:after,.form-horizontal .form-group:after,.modal-footer:after,.modal-header:after,.nav:after,.navbar-collapse:after,.navbar-header:after,.navbar:after,.pager:after,.panel-body:after,.row:after{clear:both}.center-block{display:block;margin-right:auto;margin-left:auto}.pull-right{float:right!important}.pull-left{float:left!important}.hide{display:none!important}.show{display:block!important}.invisible{visibility:hidden}.text-hide{font:0/0 a;color:transparent;text-shadow:none;background-color:transparent;border:0}.hidden{display:none!important}.affix{position:fixed}@-ms-viewport{width:device-width}.visible-lg,.visible-md,.visible-sm,.visible-xs{display:none!important}.visible-lg-block,.visible-lg-inline,.visible-lg-inline-block,.visible-md-block,.visible-md-inline,.visible-md-inline-block,.visible-sm-block,.visible-sm-inline,.visible-sm-inline-block,.visible-xs-block,.visible-xs-inline,.visible-xs-inline-block{display:none!important}@media (max-width:767px){.visible-xs{display:block!important}table.visible-xs{display:table!important}tr.visible-xs{display:table-row!important}td.visible-xs,th.visible-xs{display:table-cell!important}}@media (max-width:767px){.visible-xs-block{display:block!important}}@media (max-width:767px){.visible-xs-inline{display:inline!important}}@media (max-width:767px){.visible-xs-inline-block{display:inline-block!important}}@media (min-width:768px) and (max-width:991px){.visible-sm{display:block!important}table.visible-sm{display:table!important}tr.visible-sm{display:table-row!important}td.visible-sm,th.visible-sm{display:table-cell!important}}@media (min-width:768px) and (max-width:991px){.visible-sm-block{display:block!important}}@media (min-width:768px) and (max-width:991px){.visible-sm-inline{display:inline!important}}@media (min-width:768px) and (max-width:991px){.visible-sm-inline-block{display:inline-block!important}}@media (min-width:992px) and (max-width:1199px){.visible-md{display:block!important}table.visible-md{display:table!important}tr.visible-md{display:table-row!important}td.visible-md,th.visible-md{display:table-cell!important}}@media (min-width:992px) and (max-width:1199px){.visible-md-block{display:block!important}}@media (min-width:992px) and (max-width:1199px){.visible-md-inline{display:inline!important}}@media (min-width:992px) and (max-width:1199px){.visible-md-inline-block{display:inline-block!important}}@media (min-width:1200px){.visible-lg{display:block!important}table.visible-lg{display:table!important}tr.visible-lg{display:table-row!important}td.visible-lg,th.visible-lg{display:table-cell!important}}@media (min-width:1200px){.visible-lg-block{display:block!important}}@media (min-width:1200px){.visible-lg-inline{display:inline!important}}@media (min-width:1200px){.visible-lg-inline-block{display:inline-block!important}}@media (max-width:767px){.hidden-xs{display:none!important}}@media (min-width:768px) and (max-width:991px){.hidden-sm{display:none!important}}@media (min-width:992px) and (max-width:1199px){.hidden-md{display:none!important}}@media (min-width:1200px){.hidden-lg{display:none!important}}.visible-print{display:none!important}@media print{.visible-print{display:block!important}table.visible-print{display:table!important}tr.visible-print{display:table-row!important}td.visible-print,th.visible-print{display:table-cell!important}}.visible-print-block{display:none!important}@media print{.visible-print-block{display:block!important}}
</style>
<head>
<body>
<div class="app-container fixed-header fixed-sidebar body-tabs-line app-theme-gray closed-sidebar-mobile closed-sidebar">
     	<?php include("sidebar.php");?>
               <div class="app-main__outer">
                <div class="app-main__inner">
				<?php if($patients_name != false) { ?>
				 <p style="color:#0b5885;background-color:#d0eeff;border-color:#bee7ff;padding:.75rem 1.25rem;">Booking appointment for <strong><?php echo ucfirst($patients_name['first_name']).' '.ucfirst($patients_name['last_name']);?></strong> <a style="float:right;" id="pat_close"> X </a></p>
				<?php } ?>
				   <div class="bg-plum-plate">
                    <div class="table-responsive">
					 <table  class="table table-datatable table-custom" id="basicDataTable">
						<tr><td width="20%;">
						  <select  class="selectpicker" style="width:250px; height:30px;"  name="consultantList" id="consultantList">
							<option selected="true" disabled="disabled">&nbsp;&nbsp;All Consultants</option>
							<?php
								if($consultants != false) {
									foreach($consultants as $consultant){							
										echo'<option  value="'.$consultant['staff_id'].'" >'.ucfirst($consultant['first_name']).' '.ucfirst($consultant['last_name']).'</option>';	
									}
								}
							?>
							</select>
							
							</td>
						<td width="20%;"><a class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn" id="" style="background-color: Transparent; border: 1px solid gray; color:white;">
						<span> Scheduled : </span>
						<span class="badge badge-info" id="scheduledCount"><?php echo $scheduledCount; ?></span></a>
						</td><td width="20%;"><a class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn" id="" style="background-color: Transparent; border: 1px solid gray; color:white;"><span> Checked out : </span>
						<span class="badge badge-info" id="checkedCount"><?php echo $checkedCount; ?></span>
					   </a></td>
						<td width="20%;"><a href="<?php echo base_url().'client/settings/index' ?>#step-2" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn" style="background-color: Transparent; border: 1px solid gray; color:white;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-cog"></i> Settings &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
						</td><td width="20%;"><a class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn" id="edit_time" style="background-color: Transparent; border: 1px solid gray; color:white;"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Add Unavailable Slot  </a>&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
						</table>
					</div>
					</div>
					<div class="row">
                                <div class="col-lg-12">
								<div class="main-card mb-3 card">
								<div id='calendar1'></div>
                      </div>
					</div>
				 </div>
         </div>
	</div>
</div>  
<div id="eventModal" class="modal fade" data-dispatchidse="">
				<form class="form-horizontal" action="<?php echo base_url().'client/schedule/addAppointment' ?>" role="form" id="eventForm" method="post">
					<div class="modal-dialog">  
						  	<div class="modal-content">
						      <div class="modal-header bg-plum-plate">
								<h3 class="modal-title thin" style="color:white;">Add Appointment</h3>
							  </div>   
							  <div class="bg-plum-plate" style="color;white;" >
								</br><table><tr><td><h6 style="color:white;">&nbsp;Consultant : <span id="Consultant_name"></span></h6></td><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> <td><h6 style="float:right; color:white;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Date : <span id="adapt"></span></h6></td></tr></table>
								</br></div>
								<div id="modalBody" class="modal-body">
									  <input type="hidden" name="slot" id="slot" value="<?php echo $settings['sch_slot'] ?>" />
									  <input type="hidden" class="form-control" name="Consultant" id="Consultant" />
									  <input type="hidden" name="start_time" id="start" value="">
									  <input type="hidden" name="end_time" id="end" value="">
									<table>
									<tr>
									<td><h6 style="font-weight:bold;color:#3f6ad8;">Patient *&nbsp;&nbsp;&nbsp;&nbsp;</h6>
									</td>
									<td colspan="2"> <select style="width:250px; color:black; height:30px;" data-show-subtext="true" data-live-search="true" name="Patient" id="Patient" class="form-control select2-single"  parsley-trigger="change" parsley-required="true">
									   <option selected="true" disabled="disabled">Choose Existing Patient</option>
									   <?php
										if($patients_name != false) { ?>  
											<option value="<?php echo $patients_name['patient_id'].','.$patients_name['first_name']; ?>" selected ><?php echo ucfirst($patients_name['first_name']).' '.ucfirst($patients_name['last_name']).'   ('.$patients_name['patient_code'].')'; ?></option>	
									   <?php    
										}
										?>
									   <?php
											if($patients != false) {
												foreach($patients as $patient){
													echo'<option data-code="'.$patient['patient_code'].'" value="'.$patient['patient_id'].','.$patient['first_name'].'">'.ucfirst($patient['first_name']).' '.ucfirst($patient['last_name']).'   ('.$patient['patient_code'].')'.'</option>';	
												}
											}
										?>
									  </select></td>
									 <td colspan="2"><div id="new_pat"><a class="add_pat" id="add_pat" style="color:white;">&nbsp;&nbsp;<span class="badge" style="background-color:#337ab7; color:#ffffff;">Add New Patient</span></a></div>
									 </td>
									</tr>
									<tr><td colspan="4"></br></td></tr>
									
									<tr><td colspan="4"><div class="pt_add alert alert-info" style="display:none;">
									<div class="form-group">
										<label for="input01" class="col-sm-4 control-label">Patient Name  *</label>
										<div class="col-sm-6">
										  <input type="text"  style="width:230px;" class="form-control"  name="full_name" id="full_name"   placeholder="Enter Name">
										</div>
									 </div>
									 <div class="form-group">
										<label for="input01" class="col-sm-4 control-label">Patient Type *</label>
										<div class="col-sm-6">
										<div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
														<label class="btn btn-shadow btn-outline-primary active">
															<input type="radio" name="category" id="category" value="1"  > 
														   &nbsp;&nbsp;&nbsp;&nbsp; OP Patient&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														</label>
														<label class="btn btn-shadow btn-outline-primary">
															<input type="radio" name="category" id="category1" value="2" > 
															&nbsp;&nbsp;&nbsp;Home Patient&nbsp;&nbsp;&nbsp;
														</label>
												 </div>
										 </div>
										</div>
									 <div class="form-group">
										<label for="input01" class="col-sm-4 control-label">Gender  *</label>
										<div class="col-sm-6">
										<div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
														<label class="btn btn-shadow btn-outline-primary">
															<input type="radio" name="gender" id="gender" value="Male"  > 
														   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														</label>
														<label class="btn btn-shadow btn-outline-primary active">
															<input type="radio" name="gender" id="gender1" value="Female" > 
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Female&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														</label>
										 </div>
										</div>
									 </div>
									 <div class="form-group">
										<label for="input01" class="col-sm-4 control-label">Mobile Number </label>
										<div class="col-sm-6">
										   <input type="text" style="width:230px;" class="form-control mobile-num"  name="mobile_no" id="mobile_no" maxlength="10"   placeholder="Enter Mobile Number">
										</div>
									 </div>
									 <div class="form-group">
										<label for="input01" class="col-sm-4 control-label">Email  </label>
										<div class="col-sm-6">
										  <input type="text" style="width:230px;" class="form-control" name="email"  id="email" placeholder="Enter Email">
										</div>
									 </div>
									 <div class="form-group" text align="right">
										<a  id="cancel_pat" style="color:white;" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-danger close clickable cancel_pat">cancel</a>
										<a id="save_pat" style="color:white;" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary save_pat">Save</a>&nbsp;&nbsp;
									 </div></br>
									</td>
									</tr></div>
									
									<tr>
									<td><h6 style="font-weight:bold;color:#3f6ad8;">Treatment&nbsp;&nbsp;&nbsp;&nbsp;</h6>
									</td>
									<td colspan="2"> <select style="width:250px; height:30px;" class="form-control select2-single" data-show-subtext="true" data-live-search="true" name="treatments" id="treatments">
									   <!--<option selected="true" disabled="disabled">Choose Existing Treatment&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </option>-->
											<option selected="true" value="">Choose Existing Treatment&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </option>
											<?php
											
											 
											if($item != false) {
													foreach($item as $items){
														echo '<option value="'.$items['item_id'].'">'.ucfirst($items['item_name']).'</option>';	
													}
												}
												
												 
											?>
									  </select></td>
									  <td colspan="2"><div id="addtreat"><a class="treat_add" id="treat_add" style="color:white;">&nbsp;&nbsp;<span class="badge" style="background-color:#337ab7; color:#ffffff;">Add New Treatment</span></a></div>
									 </td>
									</tr>
									<tr><td colspan="4"></br></td></tr>
									<tr><td colspan="4"><div class="alert alert-info" style="display:none"  id="add_treatment">
											</br></br><div class="form-group">
											<label for="input01" class="col-sm-4 control-label">Treatment Name *</label>
											<div class="col-sm-6">
											   <input type="text" style="width:230px; height:30px;"  class="form-control"  id="t_name" name="t_name"/>
											</div>
										  </div>
										  <div class="form-group">
											<label for="input01" class="col-sm-4 control-label">Description </label>
											<div class="col-sm-6">
											   <textarea style="width:230px;" class="form-control" id="t_desc" name="t_desc"  rows="4"></textarea>
											</div>
										  </div>
										  <div class="form-group">
											<label for="input01" class="col-sm-4 control-label">Item Price *</label>
											<div class="col-sm-6">
											   <input type="text" style="width:230px; height:30px;" class="form-control" id="t_price" name="t_price" />
											</div>
										  </div>
										  <div class="form-group" text align="right">
										<a  id="cancelProvDiag" style="color:white;" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-danger close clickable cancelProvDiag">cancel</a>
										<a id="saveProvDiag" style="color:white;" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary saveProvDiag">Save</a>&nbsp;&nbsp;
									 </div></br>
									 </div></td></tr>
									<tr>
									<td><h6 style="font-weight:bold;color:#3f6ad8;">Appointments On  *&nbsp;&nbsp;&nbsp;&nbsp;</h6>
									</td>
									<td colspan="2"><center><span style="color:#c5c5c5;">You can choose Multiple Dates</span></center>
									  <input type="text"  name="treatment_date" style="width:250px;"  parsley-trigger="change" parsley-required="true" data-date-format='D/M/YYYY'  class="form-control from-input" placeholder="Select Multiple date" id="treatment_date1" autocomplete="off"> 
									</td>
									</tr>
									<tr><td colspan="4"></br></td></tr>
									<tr>
									<td><h6 style="font-weight:bold;color:#3f6ad8;">Time *&nbsp;&nbsp;&nbsp;&nbsp;</h6>
									</td>
									<td>   <Input type="text" style="width:100px; height:30px;" class="form-control" name="from" id="from">
									</td>
									<td> <Input type="text" style="width:100px; height:30px; float:right;" class="form-control"name="to" id="to" value="">
									</td>
									<td>   <a style="color:white;" id="add">&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge" style="background-color:#337ab7; font-size: 15px;  color:#ffffff;">+</span></a>
									  &nbsp;&nbsp;<a style="color:white;" id="sub"><span class="badge" style="background-color:#337ab7; font-size: 15px; color:#ffffff;">-</span></a></td>
									<td> 
									</td>
									</tr>
									<tr><td colspan="4"></br></td></tr>
									<tr>
									<td ><h6 style="font-weight:bold;color:#3f6ad8;">Notes&nbsp;&nbsp;&nbsp;&nbsp;</h6>
									</td>
									<td colspan="4"><textarea name="notes" id="notes" style="width:250px;" Placeholder="Enter Notes" rows="4"></textarea>
									</td>
									</tr>
									<tr><td colspan="4"></br></td></tr>
									<tr>
									<td ><h6 style="font-weight:bold;color:#3f6ad8;">Generate &nbsp;&nbsp;&nbsp;&nbsp;</h6>
									</td>
									<td colspan="4">
									<div class="custom-checkbox custom-control custom-control-inline"><input type="checkbox" value="1" name="bill_gen" id="exampleCustomInline" class="custom-control-input"><label class="custom-control-label" for="exampleCustomInline">
									Treatment Protocol </label></div>
									 <div class="custom-checkbox custom-control custom-control-inline"><input type="checkbox" value="1" name="bill_gen2" id="exampleCustomInline2" class="custom-control-input"><label class="custom-control-label" for="exampleCustomInline2">
									 Daily Register </label></div>
									<div class="custom-checkbox custom-control custom-control-inline"><input type="checkbox" value="1" name="bill_gen1" id="exampleCustomInline1" class="custom-control-input"><label class="custom-control-label" for="exampleCustomInline1">
									Invoice </label></div>									
									</td>
									</tr>  
									<tr><td colspan="4"></br></td></tr>
									<tr><td></td><td colspan="4"><span style="display:none; color:red;" class="mess">To enable this function kindly add treatment</span></td></tr>
									<tr><td colspan="4"></br></td></tr>
									<tr>
									<td ><h6 style="font-weight:bold;color:#3f6ad8;">Visit type&nbsp;&nbsp;&nbsp;&nbsp;</h6>
									</td>
									<td colspan="4">
									<div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
														<label class="btn btn-shadow btn-outline-primary">
															<input type="radio" name="firstvisit_followup" id="option1" value="0"  > 
														   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; First visit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														</label>
														<label class="btn btn-shadow btn-outline-primary active">
															<input type="radio" name="firstvisit_followup" id="option2" value="1" checked > 
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Follow up&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														</label>
									</div>
									</td>
									</tr>
									<tr><td colspan="4"></br></td></tr>
									<tr>
									<td ><h6 style="font-weight:bold;color:#3f6ad8;">Encounter type&nbsp;&nbsp;&nbsp;&nbsp;</h6>
									</td>
									<td colspan="4">
									<div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
														<label class="btn btn-shadow btn-outline-primary active">
															<input type="radio" name="e_type" id="option11" value="1" checked > 
														   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; In-Person&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														</label>
														<label class="btn btn-shadow btn-outline-primary">
															<input type="radio" name="e_type" id="option13" value="2"  > 
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Online&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														</label>
									</div>
									</td>
									</tr>  
									<tr><td colspan="4"></br></td></tr>
									<tr>
									<td ><h6 style="font-weight:bold;color:#3f6ad8;">Notify to Consultant&nbsp;&nbsp;&nbsp;&nbsp;</h6>
									</td>
									<td colspan="4">
									<div class="custom-checkbox custom-control custom-control-inline"><input type="checkbox" value="1" name="NotifyEmailDoctor" id="NotifyEmailDoctor1" class="custom-control-input"><label class="custom-control-label" for="NotifyEmailDoctor1">
									Email </label></div>
									 <div class="custom-checkbox custom-control custom-control-inline"><input type="checkbox" value="1" name="NotifySmsDoctor" id="NotifyEmailDoctor2" class="custom-control-input"><label class="custom-control-label" for="NotifyEmailDoctor2">
									 Sms </label></div>
									</td>
									</tr>
									<tr><td colspan="4"></br></td></tr>
									<tr>
									<td ></br><h6 style="font-weight:bold;color:#3f6ad8;">Notify to Patient&nbsp;&nbsp;&nbsp;&nbsp;</h6>
									</td>
									<td colspan="4">
									<div class="custom-checkbox custom-control custom-control-inline"><input type="checkbox" value="1" name="NotifyEmailPatient" id="NotifySmsPatientm3" class="custom-control-input"><label class="custom-control-label" for="NotifySmsPatientm3">
									Email </label></div>
									 <div class="custom-checkbox custom-control custom-control-inline"><input type="checkbox" value="1" name="NotifySmsPatient" id="NotifySmsPatientm2" class="custom-control-input"><label class="custom-control-label" for="NotifySmsPatientm2">
									Sms </label></div>
									<div class="custom-checkbox custom-control custom-control-inline"><input type="checkbox" value="2" name="NotifySmsPatientm" id="NotifySmsPatientm1" class="custom-control-input"><label class="custom-control-label" for="NotifySmsPatientm1">
									Sms Only Morning </label></div>									
									</td>
									</tr>
									</table>    
									<div class="modal-footer">
										<button  id="prev-btn" data-dismiss="modal" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-danger close clickable">cancel</button>
										<button type="submit" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary add_appointment submit">Add Appointment</button>
									</div>
									</form>
								</div>
					</div>
				
			  </div>
			</div>
			
			
			<div id="toast-container" style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success !</br>Your Details Has Been Added Sucessfully!</div></div></div>
			<div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-warning" aria-live="polite" style=""><div class="toast-message">Success !</br>Your Details Has Been Added Sucessfully!</div></div></div>
			
			<div class="swal2-container swal2-center swal2-fade swal2-shown" style="display:none; overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progresssteps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"><span class="swal2-x-mark"><span class="swal2-x-mark-line-left"></span><span class="swal2-x-mark-line-right"></span></span></div><div class="swal2-icon swal2-question" style="display: none;"><span class="swal2-icon-text">?</span></div><div class="swal2-icon swal2-warning" style="display: none;"><span class="swal2-icon-text">!</span></div><div class="swal2-icon swal2-info" style="display: none;"><span class="swal2-icon-text">i</span></div><div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Type: success</h2><button type="button" class="swal2-close" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" style="display: block;">Do you want to continue</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message" style="display: none;"></div></div><div class="swal2-actions" style="display: flex;"><button type="button" class="swal2-confirm swal2-styled" aria-label="" style="border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);">Cool</button><button type="button" class="swal2-cancel swal2-styled" aria-label="">Cancel</button></div><div class="swal2-footer" ></div></div></div>
			
			<div class="modal fade" id="cal-new-appt" tabindex="-1" role="dialog" aria-labelledby="new-event" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content bg-plum-plate">
                  <div class="modal-header bg-plum-plate">
                    <center><h4 class="modal-title thin" style="color:white;" id="new-event"><strong>Add Unavailable slot </strong>  </h4>  
                  </center></div>
                  <form role="form" action="<?php echo base_url().'client/schedule/add_event' ?>" method="post" id="AppointmentForm" name="AppointmentForm" parsley-validate id="basicvalidations">
                      <input type="hidden" name="slot" id="slot" value="<?php echo $settings['sch_slot'] ?>" />
					  <div class="modal-body" style="background-color:#FFFFFF;">
                      <table>
									<tr>
									<td style="width:150px;"><h6 style="font-weight:bold;color:#3f6ad8;">Staff Name *&nbsp;</h6>
									</td>
									<td colspan="2"> <select style="width:250px; color:black; height:30px;" data-show-subtext="true" data-live-search="true" name="Consult" id="Consult" class="form-control select2-single"  parsley-trigger="change" parsley-required="true">
								  <option selected="true" disabled="disabled">Choose Consultant Name</option>	<?php
										if($consultants != false) {
											foreach($consultants as $consultant){
												echo'<option value="'.$consultant['staff_id'].'">'.ucfirst($consultant['first_name']).' '.ucfirst($consultant['last_name']).'</option>';	
											}
										}
									?>
						</select></td>
									 <td colspan="2"><?php if($consultants == false) { ?> 
						   
							<a class="btn btn-greensea add_consultant" style="color:white;">&nbsp;&nbsp;<span class="badge" style="background-color:#337ab7; color:#ffffff;"> Add Me as a consultant</span></a>
						<?php  } ?>
									 </td>
									</tr>
									<tr><td colspan="4">
									<div class="add_con alert alert-info" style="display:none;">
							 <div class="form-group">
								<label for="input01" class="col-sm-4 control-label">First Name  *</label>
								<div class="col-sm-6">
								  <input type="text" class="form-control" value="<?php echo $this->session->userdata('firstname'); ?>" name="f_name" id="f_name"   placeholder="Enter First Name">
								</div>
							 </div></br></br>
							  
							 <div class="form-group">
								<label for="input01" class="col-sm-4 control-label">Last Name  *</label>
								<div class="col-sm-6">
								  <input type="text" class="form-control" value="<?php echo $this->session->userdata('lastname'); ?>"  name="l_name" id="l_name"   placeholder="Enter Last Name">
								</div>
							 </div></br></br>
							 <div class="form-group">
								<label for="input01" class="col-sm-4 control-label">City  *</label>
								<div class="col-sm-6">
								  <input type="text" class="form-control" value="<?php echo $this->session->userdata('city'); ?>"  name="city1" id="city1"   placeholder="Enter City">
								</div>
							 </div></br></br>
							  <div class="form-group">
								<label for="input01" class="col-sm-4 control-label">Mobile  *</label>
								<div class="col-sm-6">
								  <input type="text" class="form-control" value="<?php echo $this->session->userdata('mobile'); ?>" name="mobile1" id="mobile1"   placeholder="Enter Mobile">
								</div>
							 </div></br></br>
							 <div class="form-group">
								<label for="input01" class="col-sm-4 control-label">Email  *</label>
								<div class="col-sm-6">
								  <input type="text" class="form-control" value="<?php echo $this->session->userdata('username'); ?>" name="email1" id="email1"   placeholder="Enter Email">
								</div>
							 </div></br></br>
							 <div class="form-group" text align="right">
							        <a id="cancel_con" style="color:white;" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-danger close clickable cancel_con">cancel</a>
									<a id="save_con" style="color:white;" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary save_con">Save</a>&nbsp;&nbsp;
							 </div>
						</div></td></tr>
						<tr><td></br>Date *</td><td colspan="4"> </br><input type="text" name="treatment_date"  parsley-trigger="change" parsley-required="true" data-date-format='D/M/YYYY'  class="form-control from-input" placeholder="Select Multiple date" id="treatment_date" autocomplete="off"> 
                        </td></tr>
						<tr><td></br>Start Time *</td><td colspan="4"></br> <select name="start_time" class="chosen-select chosen-transparent form-control time" id="time" >
							<option value=""> Please Select</option>
						 </select>
                        </td></tr>
						<tr><td></br>End Time *</td><td colspan="2"></br>  <Input type="text" style="width:200px;" class="form-control" name="end_time" id="end_time" value="" autocomplete="off">
						</td><td colspan="2"></br><a class="mb-1 mr-1 btn btn-primary" style="color:white;" id="add1"><strong>+</strong></a>&nbsp;&nbsp;&nbsp;&nbsp;<a class="mb-1 mr-1 btn btn-primary" style="color:white;" id="sub1"><strong>-</strong></a>
                        </td></tr>
						<tr><td></br>Description *</td><td colspan="4"></br>
						<textarea type="text" style="width:430px;" class="form-control" name="desc" id="desc" value="" autocomplete="off"></textarea>
						
                        </td></tr>
									</table>
					  
					 
					
					
					 <div class="modal-footer" >
									<button  id="prev-btn" data-dismiss="modal" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-danger close clickable">cancel</button>
									<button type="submit" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary submit">Add Event</button>
					</div>
                  </form>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
            </div>
			<div id="editevent" class="modal fade">
			  <div class="modal-dialog">
                <div class="modal-content bg-plum-plate">
				 <div class="modal-header bg-plum-plate">
                    <center><h3 class="modal-title thin" style="color:white;">Encounter Appointment <small class="text-muted"></small></h3>
                 </center> </div>
				    <div style="color;white;" class="bg-plum-plate">
					</br>
					<div class="row">
					<div class="col"><h6 style="color:white;">&nbsp;&nbsp;&nbsp;Patient : <span id="edit_title"></span></h6></div>
					<div class="col" style="float:right;"><h6 style="color:white;">Mobile No : <span id="edit_mobile"> </span></h6></div>
					</div>
					<div class="row">
					<div class="col"><h6 style="color:white;">&nbsp;&nbsp;&nbsp;Consultant : <span id="consu"></span></h6></div>
					<div class="col" style="float:right;"><h6 style="color:white;">Next Appointment : <span class="edit_apt"> </span></h6></div>
					</div>					
					</br>			
					</div>
                  <form role="form" method="post" action="<?php echo base_url().'client/schedule/cancel_appointments' ?>" parsley-validate>
                     <div class="modal-body" style="background-color:#FFFFFF;">
                     <div class="form-group">
                        <textarea class="form-control" name="notes"  style="background-color:#FEFCC5;" id="notes1" rows="4"></textarea>
                      </div>
					  <div class="form-group reason-show" id="reason-show" style="display:none;">  
                        <textarea class="form-control" parsley-required="true" Placeholder="Reason for cancel" name="event-reason" id="reason" rows="4"></textarea>
                      </div> 
						<input type="hidden" class="form-control" id="notes_change" name="notes_change" />    
                    					  
                     <input type="hidden" class="form-control" id="edit_app_id" name="event-id" /><input type="hidden" class="form-control" id="chat_room" name="chat-id" />  
                    <input type="hidden" class="form-control" id="pat_id" name="check-id" />
                    <input type="hidden" class="form-control" id="get_title" name="check-id" />
                   </div>
				   <div class="modal-footer" >
				   <div class="row">
				   <div class="col">
				    <a id="join_online"><button id="next-btn" class="btn-shadow btn-wide  btn-pill btn-hover-shine btn btn-primary">Join Online</button></a>
					<a id="book"><button id="next-btn" class="btn-shadow btn-wide  btn-pill btn-hover-shine btn btn-primary">Add New Appointment</button></a>
					</br></br>
				   	<a id="session_rep"><button id="next-btn" class="btn-shadow btn-wide  btn-pill btn-hover-shine btn btn-primary">Daily Register</button></a>
				   </div>
				   <div class="col"><a id="encounter"><button id="next-btn" class="btn-shadow btn-wide btn-pill btn-hover-shine btn btn-primary">Go To Assessment</button>&nbsp;&nbsp;</a></br></br>
				   <button type="submit" id="cancel" class="btn-shadow btn-wide  btn-pill btn-hover-shine btn btn-primary" type="submit">Cancel Appointment</button></div>
				   <div class="col">
				   <a id="edit_event"><button id="next-btn" class="btn-shadow btn-wide btn-pill btn-hover-shine btn btn-primary">Reschedule</button></a>&nbsp;&nbsp;</br></br>
				   <a><button  id="cancel_no" data-dismiss="modal" class="btn-shadow btn-wide btn-pill btn btn-outline-danger"><span aria-hidden="true">&times;&nbsp;Close</span></button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
				   </div></div>
				   </form>
				   </div>
			</div><!-- /.modal-dialog -->
            </div>
			
			<div id="Cancel_model" class="modal fade" data-dispatchidse="">
			  <div class="modal-dialog">
                <div class="modal-content">
                  <form role="form" method="post" action="<?php echo base_url().'client/schedule/delete_event' ?>" parsley-validate>
                    <div class="modal-body">
                     <input type="hidden" class="form-control" id="e_staffid" name="e_staffid" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-validation-minlength="1">
                     <input type="hidden" class="form-control" id="start_event" name="start_event"  parsley-required="true" >
                    <center><h4> Are You sure You Want to Remove this Unavailable Slot</h4>
					 </center></div>
                    <div class="modal-footer">
					 <center> 
                        <a id="cancel_e" class="btn btn-pill btn-danger" style="color:white;" >Cancel</a>
                        <button id="cancel" class="btn btn-pill btn-primary submit" type="submit">Remove</button>
					  </center> 
                    </div>
                  </form>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
			
			<div id="issue_model" class="modal fade" data-dispatchidse="">
			  <div class="modal-dialog">
                <div class="modal-content">
                   <div class="modal-header">
				     <center><h4> Add Me as a Consultant. </h4>
					 </center></div>
                   <div class="modal-body">
				   		 <div class="form-group">
								<label for="input01" class="col-sm-4 control-label">First Name  *</label>
								<div class="col-sm-6">
								  <input type="text" class="form-control" value="<?php echo $this->session->userdata('firstname'); ?>" name="f_name1" id="f_name1"   placeholder="Enter First Name">
								</div>
							 </div></br></br>
							  
							 <div class="form-group">
								<label for="input01" class="col-sm-4 control-label">Last Name  *</label>
								<div class="col-sm-6">
								  <input type="text" class="form-control" value="<?php echo $this->session->userdata('lastname'); ?>"  name="l_name1" id="l_name1"   placeholder="Enter Last Name">
								</div>
							 </div></br></br>
							 <div class="form-group">
								<label for="input01" class="col-sm-4 control-label">City  *</label>
								<div class="col-sm-6">
								  <input type="text" class="form-control" value="<?php echo $this->session->userdata('city'); ?>"  name="city12" id="city12"   placeholder="Enter City">
								</div>
							 </div></br></br>
							  <div class="form-group">
								<label for="input01" class="col-sm-4 control-label">Mobile  *</label>
								<div class="col-sm-6">
								  <input type="text" class="form-control" value="<?php echo $this->session->userdata('mobile'); ?>" name="mobile12" id="mobile12"   placeholder="Enter Mobile">
								</div>
							 </div></br></br>
							 <div class="form-group">
								<label for="input01" class="col-sm-4 control-label">Email  *</label>
								<div class="col-sm-6">
								  <input type="text" class="form-control" value="<?php echo $this->session->userdata('username'); ?>" name="email12" id="email12"   placeholder="Enter Email">
								</div>
							 </div></br></br>
							 
						</div>
                 
                    <div class="modal-footer">
					 <center> 
					   <a id="save_con1" style="color:white;" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary save_con1">Save</a>&nbsp;&nbsp;
						<button  id="prev-btn" data-dismiss="modal" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-danger close clickable">cancel</button>
					  </center> 
                    </div>
                
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
			
	<div style="display:none;" class="swal2-container swal2-center swal2-fade swal2-shown delete2" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progresssteps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"><span class="swal2-x-mark"><span class="swal2-x-mark-line-left"></span><span class="swal2-x-mark-line-right"></span></span></div><div class="swal2-icon swal2-question" style="display: none;"><span class="swal2-icon-text">?</span></div><div class="swal2-icon swal2-warning" style="display: none;"><span class="swal2-icon-text">!</span></div><div class="swal2-icon swal2-info" style="display: none;"><span class="swal2-icon-text">i</span></div><div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" style="display: block;">Kindly choose date and time on Another Appointment for the Same Patient</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message" style="display: none;"></div></div><div class="swal2-actions" style="display: flex;"><button type="button" class="swal2-confirm swal2-styled cancel2" aria-label="" style="border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);">Cool</button><button type="button" class="swal2-cancel swal2-styled" style="display: none;" aria-label="">Cancel</button></div><div class="swal2-footer" style="display: none;"></div></div></div></div>
			
<!-- <script type="text/javascript" src="<?php echo base_url()?>my_assets/assets/scripts/main.js"></script>-->
 <script type="text/javascript" src="<?php echo base_url() ?>assets/schedule/moment.js"></script>
 <script type="text/javascript" src="<?php echo base_url() ?>assets/schedule/jquery.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url() ?>assets/schedule/jquery-ui.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url() ?>assets/schedule/fullcalendar.js"></script>
 <script type="text/javascript" src="<?php echo base_url() ?>assets/schedule/bootstrap.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url() ?>assets/schedule/scheduler.js"></script>
 <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui.multidatespicker.js"></script>
 <script type="text/javascript" src="<?php echo base_url() ?>assets/js/prettify.js"></script>
 <script type="text/javascript" src="<?php echo base_url() ?>assets/js/lang-css.js"></script>
 <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
 <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
 <script src="<?php echo base_url() ?>assets/js/parsley.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
 <script src="https://select2.github.io/select2-bootstrap-theme/js/bootstrap.min.js"></script>
 <script src="https://select2.github.io/select2-bootstrap-theme/js/anchor.min.js"></script>
 <script>
			$( ".select2-single" ).select2();			
 </script>
 <script>
  
	 
$(function() {
	$('.cancel2').click(function() {
		$('.delete2').hide();
	});
	$('#exampleCustomInline').click(function() {
		var treatment = $('#treatments').val();
		if(treatment == '' || treatment == null ){
			if(document.getElementById('exampleCustomInline').checked) {
				$('input[name="bill_gen"]').prop("checked", false);
				$('.mess').show();
			} else {
				$('.mess').hide();
			}
		} else {
			$('.mess').hide();
		}
	});
	
	$('#exampleCustomInline1').click(function() {
		var treatment = $('#treatments').val();
		if(treatment == '' || treatment == null ){
			if(document.getElementById('exampleCustomInline1').checked) {
				$('input[name="bill_gen1"]').prop("checked", false);
				$('.mess').show();
			} else {
				$('.mess').hide();
			}
		} else {
			$('.mess').hide();
		}
	});
	$('#exampleCustomInline2').click(function() {
		var treatment = $('#treatments').val();
		if(treatment == '' || treatment == null ){
			if(document.getElementById('exampleCustomInline2').checked) {
				$('input[name="bill_gen2"]').prop("checked", false);
				$('.mess').show();
			} else {
				$('.mess').hide();
			}
		} else {
			$('.mess').hide();
		}
	});
	
		 $('#sub').click(function(){
			 var from_value = $('#to').val();
			 var slot = $('#slot').val();
				if($('#slot').val() != undefined){
					var slide = $('#slot').val();
				} else {
					var slide = '30';
				}
				var val = from_value.split(':');  
				var value = val[1].split(' ');
				if(slide == '45'){
					if(parseInt(value[0]) - parseInt(slide) == 0){
						if(val[0] == 12){
							var hr = '12'+':'+'00 pm';
						} else {
							var hr =(val[0]) +':'+'00 '+value[1];
						}
					} else {
						if(parseInt(slide) - parseInt(value[0]) == '30'){
							var tt = parseInt(slide) - parseInt(value[0]);
							if(val[0] == 1) {
								var hr =12 +':'+tt+' '+'pm';
							} else if(val[0] == 12) {
								var hr =(val[0]-1) +':'+tt+' '+'am';
							}else  {
								var hr =(val[0]-1) +':'+tt+' '+value[1];
							}
						} else if(parseInt(slide) - parseInt(value[0]) == '15'){
							var tt = 45;
							if(val[0] == 1) {
								var hr = 12 +':'+tt+' '+'pm';
							} else if(val[0] == 12) {
								var hr =(val[0]-1) +':'+tt+' '+'am';
							} else {
								var hr =(val[0]-1) +':'+tt+' '+value[1];
							}
						} else {
							var tt = 15;
							if(val[0] == 1) {
								var hr =12 +':'+tt+' '+'pm';
							} else if(val[0] == 12) {
								var hr =(val[0]-1) +':'+tt+' '+'am';
							} else {
								var hr =(val[0]-1) +':'+tt+' '+value[1];
							}
						}
						
					}
				}
				if(slide == '30'){
					if(parseInt(value[0]) - parseInt(slide) == 0){
						if(val[0] == '12'){
							var hr = '12'+':'+'00 AM';
						} else {
							var hr = val[0] +':'+'00 '+value[1];
						}
					} else {
						if((parseInt(val[0])-1) == 0){
							var hr = '12'+':'+'30 '+value[1];
						} else {
							var hr = ((parseInt(val[0])-1))+':'+'30 '+value[1];
						}
					}
				}
				if(slide == '15'){
				  if(parseInt(value[0])-parseInt(slide) < '0'){
					  if(val[0] != 1){
					  var hr = (parseInt(val[0])-1)+':'+'45'+' '+value[1];
					  } else {
						   var hr = '12:45 PM';
					  }
				  } else {
					  if(val[0] == 12 && value[0] == 15){
						  var hr = '12:00 AM';
					  } else { 
					      var hr = val[0]+':'+(parseInt(value[0])-parseInt(slide))+' '+value[1];
					  }
				  }				
				}
				if(slide == '5'){
				  if(parseInt(value[0])-parseInt(slide) < '0'){
					  if(val[0] != 1){
					  var hr = (parseInt(val[0])-1)+':'+'55'+' '+value[1];
					  } else {
						   var hr = '12:55 PM';
					  }
				  } else {
					  if(val[0] == 12 && value[0] == 05){
						  var hr = '12:00 AM';
					  } else { 
					      var hr = val[0]+':'+(parseInt(value[0])-parseInt(slide))+' '+value[1];
					  }
				  }				
				}
				if(slide == '60'){
					if(val[0] == 01 && value[0] == 00){
						  var hr = '12:00 AM';
					  } else { 
					      var hr = (parseInt(val[0])-1) +':00 '+value[1];
					  }
				}
				$('#to').val(hr); 
		});
		  
		 $('#add').click(function(){
			var from_value = $('#to').val();
			var slot = $('#slot').val();
				if($('#slot').val() != undefined){
					var slide = $('#slot').val();
				} else {
					var slide = '30';
				}
				var val = from_value.split(':');  
				var value = val[1].split(' ');
				if(slide == '45'){
					if(parseInt(value[0])+parseInt(slide) == 60){
						if((parseInt(val[0])+1) == 13){
							var hr = '01'+':'+'00 pm';
						} else if((parseInt(val[0])+1) == 12) {
								var hr = (parseInt(val[0])+1)+':00 am';
						} else {
							var hr = (parseInt(val[0])+1)+':'+'00 '+value[1];
						}
					} else if(parseInt(value[0])+parseInt(slide) > 60){
						var tt = parseInt(value[0])+parseInt(slide) - 60;
						if((parseInt(val[0])+1) == 13){
							var hr = '01'+':'+tt +' pm';
						} else if((parseInt(val[0])+1) == 12) {
								var hr = (parseInt(val[0])+1)+':'+tt+' '+'pm';
						} else {
							var hr = (parseInt(val[0])+1)+':'+tt+' '+value[1];
						}
					} else {
						if(val[0] == 12){
							var hr = (val[0])+':'+'45 pm';
						} else {
						    var hr = (val[0])+':'+'45 '+value[1];
						}
					}
				}
				if(slide == '30'){
					if(parseInt(value[0])+parseInt(slide) == 60){
						if((parseInt(val[0])+1) == 13){
							var hr = '01'+':'+'00 PM';
						} else {
							var hr = (parseInt(val[0])+1)+':'+'00 '+value[1];
						}
					} else {
						if(val[0] == 12){
							var hr = (val[0])+':'+'30 PM';
						} else {
						    var hr = (val[0])+':'+'30 '+value[1];
						}
					}
				}
				if(slide == '15'){
					if(parseInt(value[0])+parseInt(slide)  == '60'){
						if((parseInt(val[0])+1) == 13){
							var hr = '01'+':'+'00 PM';
						} else {
							var hr = (parseInt(val[0])+1)+':'+'00 '+value[1];
						}
					} else {
						if(val[0] == '12' && value[1] != 'PM'){
						  var hr = val[0]+':'+(parseInt(value[0])+parseInt(slide))+' PM';
						} else {	
						  var hr = val[0]+':'+(parseInt(value[0])+parseInt(slide))+' '+ value[1];
						}
					}
				}
				if(slide == '5'){
					if(parseInt(value[0])+parseInt(slide)  == '60'){
						if((parseInt(val[0])+1) == 13){
							var hr = '01'+':'+'00 PM';
						} else {
							var hr = (parseInt(val[0])+1)+':'+'00 '+value[1];
						}
					} else {
						if(val[0] == '12' && value[1] != 'PM'){
						  var hr = val[0]+':'+(parseInt(value[0])+parseInt(slide))+' PM';
						} else {	
						  var hr = val[0]+':'+(parseInt(value[0])+parseInt(slide))+' '+ value[1];
						}
					}
				}
				if(slide == '60'){
					if((parseInt(val[0])+1) == 13){
							var hr = '01'+':'+'00 PM';
					} else {
							var hr = (parseInt(val[0])+1)+':'+'00 '+value[1];
					}
				}
				$('#to').val(hr);  	
				
		  });
		  $('#cancel_no').click(function(){  
			   var val = $('#notes1').val();
			   var val1 = $('#notes_change').val();
			   if(val != val1){
				   $('#toast-container').show();
				   setTimeout(function(){ 
								$('#toast-container').hide();
							}, 1000);
			   } else {
				   
			   }
			   
		   });
		   $('#sub1').click(function(){
			 var from_value = $('#end_time').val();
			 var slot = $('#slot').val();
				if($('#slot').val() != undefined){
					var slide = $('#slot').val();
				} else {
					var slide = '30';
				}
				var val = from_value.split(':');  
				var value = val[1].split(' ');
				if(slide == '30'){
					if(parseInt(value[0]) - parseInt(slide) == 0){
						if(val[0] == '12'){
							var hr = '12'+':'+'00 AM';
						} else {
							var hr = val[0] +':'+'00 '+value[1];
						}
					} else {
						if((parseInt(val[0])-1) == 0){
							var hr = '12'+':'+'30 '+value[1];
						} else {
							var hr = ((parseInt(val[0])-1))+':'+'30 '+value[1];
						}
					}
				}
				if(slide == '15'){
				  if(parseInt(value[0])-parseInt(slide) < '0'){
					  if(val[0] != 1){
					  var hr = (parseInt(val[0])-1)+':'+'45'+' '+value[1];
					  } else {
						   var hr = '12:45 PM';
					  }
				  } else {
					  if(val[0] == 12 && value[0] == 15){
						  var hr = '12:00 AM';
					  } else { 
					      var hr = val[0]+':'+(parseInt(value[0])-parseInt(slide))+' '+value[1];
					  }
				  }				
				}
				if(slide == '5'){
				  if(parseInt(value[0])-parseInt(slide) < '0'){
					  if(val[0] != 1){
					  var hr = (parseInt(val[0])-1)+':'+'55'+' '+value[1];
					  } else {
						   var hr = '12:55 PM';
					  }
				  } else {
					  if(val[0] == 12 && value[0] == 05){
						  var hr = '12:00 AM';
					  } else { 
					      var hr = val[0]+':'+(parseInt(value[0])-parseInt(slide))+' '+value[1];
					  }
				  }				
				}
				if(slide == '60'){
					if(val[0] == 01 && value[0] == 00){
						  var hr = '12:00 AM';
					  } else { 
					      var hr = (parseInt(val[0])-1) +':00 '+value[1];
					  }
				}
				$('#end_time').val(hr); 
				
	 });
	 $("#notes1").keyup(function(){
			var val = $("#notes1").val();
			var v1 = $("#notes1").val()+'/'+$('#edit_app_id').val();
			var url= '<?php echo base_url().'client/schedule/add_notes' ?>';
			
		    $.ajax({
					type: "POST",
					dataType: 'json',
					data : {notes:v1},
					url: url,
					success: function(data) {
						if(data.status == 'failure'){
							
						} else if(data.status == 'success') {
							
						}
					}, 
					complete: function(){
							
					},
					error: function(e){ // alert error if ajax fails
						alert(e.responseText);
					} 
			});
			
		});
	 $('#add1').click(function(){
			var from_value = $('#end_time').val();
			var slot = $('#slot').val();
				if($('#slot').val() != undefined){
					var slide = $('#slot').val();
				} else {
					var slide = '30';
				}
				var val = from_value.split(':');  
				var value = val[1].split(' ');
				if(slide == '45'){
					if(parseInt(value[0])+parseInt(slide) == 60){
						if((parseInt(val[0])+1) == 13){
							var hr = '01'+':'+'00 pm';
						} else if((parseInt(val[0])+1) == 12) {
								var hr = (parseInt(val[0])+1)+':'+tt+' '+'pm';
						} else {
							var hr = (parseInt(val[0])+1)+':'+'00 '+value[1];
						}
					} else if(parseInt(value[0])+parseInt(slide) > 60){
						var tt = parseInt(value[0])+parseInt(slide) - 60;
						if((parseInt(val[0])+1) == 13){
							var hr = '01'+':'+tt +' pm';
						} else if((parseInt(val[0])+1) == 12) {
								var hr = (parseInt(val[0])+1)+':'+tt+' '+'pm';
						} else {
							var hr = (parseInt(val[0])+1)+':'+tt+' '+value[1];
						}
					} else {
						if(val[0] == 12){
							var hr = (val[0])+':'+'45 pm';
						} else {
						    var hr = (val[0])+':'+'45 '+value[1];
						}
					}
				}
				if(slide == '30'){
					if(parseInt(value[0])+parseInt(slide) == 60){
						if((parseInt(val[0])+1) == 13){
							var hr = '01'+':'+'00 PM';
						} else {
							var hr = (parseInt(val[0])+1)+':'+'00 '+value[1];
						}
					} else {
						if(val[0] == 12){
							var hr = (val[0])+':'+'30 PM';
						} else {
						    var hr = (val[0])+':'+'30 '+value[1];
						}
					}
				}
				if(slide == '15'){
					if(parseInt(value[0])+parseInt(slide)  == '60'){
						if((parseInt(val[0])+1) == 13){
							var hr = '01'+':'+'00 PM';
						} else {
							var hr = (parseInt(val[0])+1)+':'+'00 '+value[1];
						}
					} else {
						if(val[0] == '12' && value[1] != 'PM'){
						  var hr = val[0]+':'+(parseInt(value[0])+parseInt(slide))+' PM';
						} else {	
						  var hr = val[0]+':'+(parseInt(value[0])+parseInt(slide))+' '+ value[1];
						}
					}
				}
				if(slide == '5'){
					if(parseInt(value[0])+parseInt(slide)  == '60'){
						if((parseInt(val[0])+1) == 13){
							var hr = '01'+':'+'00 PM';
						} else {
							var hr = (parseInt(val[0])+1)+':'+'00 '+value[1];
						}
					} else {
						if(val[0] == '12' && value[1] != 'PM'){
						  var hr = val[0]+':'+(parseInt(value[0])+parseInt(slide))+' PM';
						} else {	
						  var hr = val[0]+':'+(parseInt(value[0])+parseInt(slide))+' '+ value[1];
						}
					}
				}
				if(slide == '60'){
					if((parseInt(val[0])+1) == 13){
							var hr = '01'+':'+'00 PM';
					} else {
							var hr = (parseInt(val[0])+1)+':'+'00 '+value[1];
					}
				}
				$('#end_time').val(hr);  	
				
		  });
		   $('#time').change(function() {
				var from_value = $('#time').val();
				var slot = $('#slot').val();
				if($('#slot').val() != undefined){
					var slide = $('#slot').val();
				} else {
					var slide = '30';
				}
				var val = from_value.split(':');
				var value = val[1].split(' ');
				if(slide == '45'){
					if(parseInt(value[0])+parseInt(slide) == 60){
						if((parseInt(val[0])+1) == 13){
							var hr = '01'+':'+'00 pm';
						} else if((parseInt(val[0])+1) == 12) {
								var hr = (parseInt(val[0])+1)+':00 pm';
						} else {
							var hr = (parseInt(val[0])+1)+':'+'00 '+value[1];
						}
					} else if(parseInt(value[0])+parseInt(slide) > 60){
						var tt = parseInt(value[0])+parseInt(slide) - 60;
						if((parseInt(val[0])+1) == 13){
							var hr = '01'+':'+tt +' pm';
						} else if((parseInt(val[0])+1) == 12) {
								var hr = (parseInt(val[0])+1)+':00 pm';
						} else {
							var hr = (parseInt(val[0])+1)+':'+tt+' '+value[1];
						}
					} else {
						if(val[0] == 12){
							var hr = (val[0])+':'+'45 pm';
						} else {
						    var hr = (val[0])+':'+'45 '+value[1];
						}
					}
				}
				if(slide == '30'){
					if(parseInt(value[0])+parseInt(slide) == 60){
						if((parseInt(val[0])+1) == 13){
							var hr = '01'+':'+'00 PM';
						} else {
							var hr = (parseInt(val[0])+1)+':'+'00 '+value[1];
						}
					} else {
						if(val[0] == 12){
							var hr = (val[0])+':'+'30 PM';
						} else {
						    var hr = (val[0])+':'+'30 '+value[1];
						}
					}
				}
				if(slide == '15'){
					if(parseInt(value[0])+parseInt(slide)  == '60'){
						if((parseInt(val[0])+1) == 13){
							var hr = '01'+':'+'00 PM';
						} else {
							var hr = (parseInt(val[0])+1)+':'+'00 '+value[1];
						}
					} else {
						if(val[0] == '12' && value[1] != 'PM'){
						  var hr = val[0]+':'+(parseInt(value[0])+parseInt(slide))+' PM';
						} else {	
						  var hr = val[0]+':'+(parseInt(value[0])+parseInt(slide))+' '+ value[1];
						}
					}
				}
				if(slide == '5'){
					if(parseInt(value[0])+parseInt(slide)  == '60'){
						if((parseInt(val[0])+1) == 13){
							var hr = '01'+':'+'00 PM';
						} else {
							var hr = (parseInt(val[0])+1)+':'+'00 '+value[1];
						}
					} else {
						if(val[0] == '12' && value[1] != 'PM'){
						  var hr = val[0]+':'+(parseInt(value[0])+parseInt(slide))+' PM';
						} else {	
						  var hr = val[0]+':'+(parseInt(value[0])+parseInt(slide))+' '+ value[1];
						}
					}
				}
				if(slide == '60'){
					if((parseInt(val[0])+1) == 13){
							var hr = '01'+':'+'00 PM';
					} else {
							var hr = (parseInt(val[0])+1)+':'+'00 '+value[1];
					}
				}
				$('#end_time').val(hr); 
		});
		$("#edit_time").click(function(){
			$("#cal-new-appt").modal();
		});
		  
		$('#cancel_pat').click(function(){
			$('.pt_add').hide();
			$('#new_pat').show();
			$('#new_pat1').show();
			
		});
		$('#cancel_pat1').click(function(){
			$('.pt_add').hide();
			$('#new_pat').show();
			$('#new_pat1').show();
		});
		$('.add_con').hide();
		$('.add_consultant').click(function(){
			$('.add_con').show();
			$('#new_consult').hide();
			$('#new_consult1').hide();
		});
		$('.cancel_con').click(function(){
			$('.add_con').hide();
			$('#new_consult').show();
			$('#new_consult1').show();
		});
		$('.save_con1').click(function(){
			var fname = $('#f_name1').val();
			var lname = $('#l_name1').val();
			var city = $('#city12').val();
			var email = $('#email12').val();
			var mobile = $('#mobile12').val();
			var provD = fname + '/' + lname + '/' + email +'/' + mobile; 
			var url = '<?php echo base_url().'client/schedule/quick_add_consult' ?>';
			
			if (fname != ""){
				var provDiag = "provDiag=" + provD;
				$.ajax({
					type: "POST",
					dataType: 'json',
					data : provDiag,
					url: url,
					success: function(data) {
						if(data.status == 'failure'){
							
						} else if(data.status == 'success') {
							$('#toast-container1').show();
							setTimeout(function(){ 
								window.location.reload();
							}, 1000);
						}
					}, 
					complete: function(){
							
					},
					error: function(e){ // alert error if ajax fails
						//alert(e.responseText);
					} 
				 }); //end AJAX
				 }
				 else {
					jAlert('Please enter the provisional diagnosis.', 'Provisional diagnosis error');
				 }	
		});
		$('.save_con').click(function(){
			var fname = $('#f_name').val();
			var lname = $('#l_name').val();
			var email = $('#email1').val();
			var mobile = $('#mobile1').val();
			var provD = fname + '/' + lname + '/' + email +'/' + mobile; 
			var url = '<?php echo base_url().'client/schedule/quick_add_consult' ?>';
			
			if (fname != ""){
				var provDiag = "provDiag=" + provD;
				$.ajax({
					type: "POST",
					dataType: 'json',
					data : provDiag,
					url: url,
					success: function(data) {
						if(data.status == 'failure'){
							
						} else if(data.status == 'success') {
							$(".add_con").hide();
							$(".add_consultant").hide();
							$("#Consult").append("<option value='"+ data.consultData.staff_id +"' selected>"+ data.consultData.name  + " </option>");
					        $('#Consult').trigger('change');
						
						}
					}, 
					complete: function(){
							
					},
					error: function(e){ // alert error if ajax fails
						//alert(e.responseText);
					} 
				 }); //end AJAX
				 }
				 else {
					jAlert('Please enter the provisional diagnosis.', 'Provisional diagnosis error');
				 }	
		});
		$('.save_pat1').click(function(){
			var url= '<?php echo base_url().'client/schedule/add_Pat' ?>';
			var name = $('#full_name1').val();
			var email = $('#email1').val();
			var mobile = $('#mobile_no1').val();
			var gender = $("input[name='gender1']:checked").val();
			var type = $("input[name='category1']:checked").val();
			var provD = name + '/' + email +'/' + mobile+'/'+gender+'/'+type; 
			if (name != ""){
				var provDiag = "provDiag=" + provD;
				$.ajax({
					type: "POST",
					dataType: 'json',
					data : provDiag,
					url: url,
					success: function(data) {
						if(data.status == 'failure'){
							
						} else if(data.status == 'success') {
							$(".pt_add").hide();
							$("#Patient1").append("<option value='"+ data.PatientData.patient_id + ','+ data.PatientData.first_name + "' selected>"+ data.PatientData.first_name + " </option>");
					        $('#Patient1').trigger('change');
						}
					}, 
					complete: function(){
							
					},
					error: function(e){ // alert error if ajax fails
						//alert(e.responseText);
					} 
				 }); //end AJAX
				 }
				 else{
					jAlert('Please enter the provisional diagnosis.', 'Provisional diagnosis error');
				 }	 
		});
		$('.save_pat').click(function(){
			var url= '<?php echo base_url().'client/schedule/add_Pat' ?>';
			var name = $('#full_name').val();
			var email = $('#email').val();
			var mobile = $('#mobile_no').val();
			var gender = $("input[name='gender']:checked").val();
			var type = $("input[name='category']:checked").val();
			var provD = name + '/' + email +'/' + mobile+'/'+gender+'/'+type; 
			if (name != ""){
				var provDiag = "provDiag=" + provD;
				$.ajax({
					type: "POST",
					dataType: 'json',
					data : provDiag,
					url: url,
					success: function(data) {
						if(data.status == 'failure'){
							
						} else if(data.status == 'success') {
							$(".pt_add").hide();
							$("#Patient").append("<option value='"+ data.PatientData.patient_id + ','+ data.PatientData.first_name + "' selected>"+ data.PatientData.first_name + " </option>");
					        $('#Patient').trigger('change');
						}
					}, 
					complete: function(){
							
					},
					error: function(e){ // alert error if ajax fails
						//alert(e.responseText);
					} 
				 }); //end AJAX
				 }
				 else{
					jAlert('Please enter the provisional diagnosis.', 'Provisional diagnosis error');
				 }	
		}); 
		prettyPrint();
			var today = new Date();
			$('.from-input').multiDatesPicker({
				dateFormat: "dd-mm-yy",
				
			});
		

		
		})
$(document).ready(function() {
	$('#consultantList').change(function() {
		var con = $('#consultantList').val();
		if(con != 'all'){
		  window.location = "<?php echo base_url().'client/schedule/appointment/consult/' ?>" + con ;
		} else {
			  window.location = "<?php echo base_url().'client/schedule/appointment/' ?>";
		}
	});
	var LoginEmpno = "123456";
	var AmbulanceResources = <?php echo json_encode($staffs); ?>;
	var Events = <?php echo json_encode($app_list); ?>;
		$('form').on('submit', function (event) {
			 $('.reason-show').show();
			  event.preventDefault();
			  var $form = $(this);
			  if ( $(this).parsley().isValid() ) {
			  var  formID = $(this).attr("id");
			  var  formURL = $(this).attr("action");
                          var clinic_map = '<?php echo $this->session->userdata('map'); ?>';
                          var map=clinic_map.replaceAll("+","%2B");

			  var button = $('.add_appointment');
			  button.prop('disabled', true);
			  $('.submit').hide();
			  $.ajax({
						type: 'post',
						url: $(this).attr('action'),  
						data:$(this).serialize(),
						dataType: "json",
						async:true,
						success:function(data, textStatus, jqXHR,form) 
						{
							
							$('#toast-container').show();
							if(data.message != undefined){
								
								 swal({
								  title: "Would you like to send a WhatsApp notification to the patient?",
								  //text: " Do you want to send WhatsApp Notification to the Patient",
								  type: "success",
								  showCancelButton: true,
								  confirmButtonClass: 'btn-danger',
								  confirmButtonText: 'Yes',
								  /* closeOnConfirm: false, */
								  closeOnConfirm: true
								},
								function(inputValue){
									if (inputValue===false) {
										$("#eventModal").modal('hide');
										$('.submit').show();
										$('.toast-container').hide();
										window.location.reload();
									}else{
                                                                        
                if(clinic_map=="")
                {
                //msg='https://web.whatsapp.com/send?phone=91'+$mobile+'&text=Your Physiotherapy appointment on '+startdate+' IST has been scheduled successfully .Please call us on '+mobile+' to give us 24 hours notice to reschedule or cancel the appointment.'+'%0a'+rose+' Regards '+clinic_name;
                window.open('https://web.whatsapp.com/send?phone=91'+data.mobile+'&text='+data.message, '_blank');
                 }
                else
                {
                 //msg='https://web.whatsapp.com/send?phone=91'+$mobile+'&text=Your Physiotherapy appointment on '+startdate+' IST has been scheduled successfully .Please call us on '+mobile+' to give us 24 hours notice to reschedule or cancel the appointment.'+'%0a'+'Visit us: '+map+'%0a'+rose+' Regards '+clinic_name;
     window.open('https://web.whatsapp.com/send?phone=91'+data.mobile+'&text='+data.message+'%0a'+'Visit us: '+map, '_blank');

                 }

									$("#eventModal").modal('hide');
									$('.submit').show();
									$('.toast-container').hide();
									window.location.reload();
									}
								}); 
							 } else {
							 }
							/* setTimeout(function(){ 
								window.location.reload();
							}, 5000); */
						},
						error: function(jqXHR, textStatus, errorThrown) 
						{
							 
							 swal({
								  title: "Would you like to send a WhatsApp notification to the patient?",
								  //text: " Do you want to send WhatsApp Notification to the Patient",
								  type: "success",
								  showCancelButton: true,
								  confirmButtonClass: 'btn-danger',
								  confirmButtonText: 'Yes',
								  /* closeOnConfirm: false, */
								  closeOnConfirm: true
								},
								function(inputValue){
									if (inputValue===false) {
										$("#eventModal").modal('hide');
										$('.submit').show();
										$('.toast-container').hide();
										window.location.reload();
									}else{
                                                                        
                             if(clinic_map=="")
                              {
                              //msg='https://web.whatsapp.com/send?phone=91'+$mobile+'&text=Your Physiotherapy appointment on '+startdate+' IST has been scheduled successfully .Please call us on '+mobile+' to give us 24 hours notice to reschedule or cancel the appointment.'+'%0a'+rose+' Regards '+clinic_name;
                              window.open('https://web.whatsapp.com/send?phone=91'+data.mobile+'&text='+data.message, '_blank');


                               }
                              else
                              {
                               //msg='https://web.whatsapp.com/send?phone=91'+$mobile+'&text=Your Physiotherapy appointment on '+startdate+' IST has been scheduled successfully .Please call us on '+mobile+' to give us 24 hours notice to reschedule or cancel the appointment.'+'%0a'+'Visit us: '+map+'%0a'+rose+' Regards '+clinic_name;
                   window.open('https://web.whatsapp.com/send?phone=91'+data.mobile+'&text='+data.message+'%0a'+'Visit us: '+map, '_blank');

                               }

									$("#eventModal").modal('hide');
									$('.submit').show();
									$('.toast-container').hide();
									window.location.reload();
									}
								});

							// alert(errorThrown);
							 /* setTimeout(function(){
								//toastr.success('Appointment has been saved Successfully', 'Successfully');
							    window.location.reload();
							}, 1000); */ 
						}
					  });
					}
					else{
						
					}
						  
		  }); 
		 $('#cancel_e').click(function(){
			 $('#Cancel_model').modal("hide");
		 });		  
		  $('#sub1').click(function(){
			 var from_value = $('#end_time').val();
			 var slot = $('#slot').val();
				if($('#slot').val() != undefined){
					var slide = $('#slot').val();
				} else {
					var slide = '30';
				}
				var val = from_value.split(':');  
				var value = val[1].split(' ');
				if(slide == '45'){
					if(parseInt(value[0]) - parseInt(slide) == 0){
						if(val[0] == 12){
							var hr = '12'+':'+'00 am';
						} else {
							var hr =(val[0]) +':'+'00 '+value[1];
						}
					} else {
						if(parseInt(slide) - parseInt(value[0]) == '30'){
							var tt = parseInt(slide) - parseInt(value[0]);
							if(val[0] == 1) {
								var hr =12 +':'+tt+' '+'pm';
							} else if(val[0] == 12) {
								var hr =(val[0]-1) +':'+tt+' '+'am';
							}else  {
								var hr =(val[0]-1) +':'+tt+' '+value[1];
							}
						} else if(parseInt(slide) - parseInt(value[0]) == '15'){
							var tt = 45;
							if(val[0] == 1) {
								var hr = 12 +':'+tt+' '+'pm';
							} else if(val[0] == 12) {
								var hr =(val[0]-1) +':'+tt+' '+'am';
							} else {
								var hr =(val[0]-1) +':'+tt+' '+value[1];
							}
						} else {
							var tt = 15;
							if(val[0] == 1) {
								var hr =12 +':'+tt+' '+'pm';
							} else if(val[0] == 12) {
								var hr =(val[0]-1) +':'+tt+' '+'am';
							} else {
								var hr =(val[0]-1) +':'+tt+' '+value[1];
							}
						}
						
					}
				}
				if(slide == '30'){
					if(parseInt(value[0]) - parseInt(slide) == 0){
						if(val[0] == '12'){
							var hr = '12'+':'+'00 AM';
						} else {
							var hr = val[0] +':'+'00 '+value[1];
						}
					} else {
						if((parseInt(val[0])-1) == 0){
							var hr = '12'+':'+'30 '+value[1];
						} else {
							var hr = ((parseInt(val[0])-1))+':'+'30 '+value[1];
						}
					}
				}
				if(slide == '15'){
				  if(parseInt(value[0])-parseInt(slide) < '0'){
					  if(val[0] != 1){
					  var hr = (parseInt(val[0])-1)+':'+'45'+' '+value[1];
					  } else {
						   var hr = '12:45 PM';
					  }
				  } else {
					  if(val[0] == 12 && value[0] == 15){
						  var hr = '12:00 AM';
					  } else { 
					      var hr = val[0]+':'+(parseInt(value[0])-parseInt(slide))+' '+value[1];
					  }
				  }				
				}
				if(slide == '5'){
				  if(parseInt(value[0])-parseInt(slide) < '0'){
					  if(val[0] != 1){
					  var hr = (parseInt(val[0])-1)+':'+'55'+' '+value[1];
					  } else {
						   var hr = '12:55 PM';
					  }
				  } else {
					  if(val[0] == 12 && value[0] == 05){
						  var hr = '12:00 AM';
					  } else { 
					      var hr = val[0]+':'+(parseInt(value[0])-parseInt(slide))+' '+value[1];
					  }
				  }				
				}
				if(slide == '60'){
					if(val[0] == 01 && value[0] == 00){
						  var hr = '12:00 AM';
					  } else { 
					      var hr = (parseInt(val[0])-1) +':00 '+value[1];
					  }
				}
				$('#end_time').val(hr); 
				
	 });
	  
	$(function() {
		$('#book').click(function() {    
			 var id1 = $('#pat_id').val(); 
			 var name1 = $('#get_title').val();
			 var newOption = $('<option value = ' + id1 +','+ name1 + ' selected>' + name1 + '</option>');
			 $('#Patient').append(newOption);
			 $('#Patient').trigger("chosen:updated");
			 $("#editevent").modal('hide');
			 $('.delete2').show();
		});
		TabBindingOption();
		DefaultTab();
		$("#Contacter").val(LoginEmpno); 
		Event_ContacterInput();
		GetEvents();
		BindingFullCalendar();
		
	});
  
	

	function GetLoginHospitalCode() {
		HospitalCode = "T0";
	}

	function GetLoginEmpno() {
		LoginEmpno = "123456";
	}

	function GetEvents(date) {
		data = [{ id: "1", title: "From UCLA" }, { id: "1", title: "From NY" }];
    	$.each(data, function(index) {
			var divWaitingAssign = document.createElement("div");
			divWaitingAssign.setAttribute("class", "fc-event");
			divWaitingAssign.setAttribute("data-dispatchidse", data[index].id);
			divWaitingAssign.textContent = data[index].title;
			$("#external-events").append(divWaitingAssign);
		});
		DragableEvent();
	}

	function GetEvent(Dispatch) {
		var ReturnValue = [];
		return ReturnValue;
	}

	function DragableEvent() {
		$("#external-events .fc-event").each(function() {
			$(this).data("event", {
				id: $(this).attr("data-dispatchidse"),
				title: $.trim($(this).text()), // use the element's text as the event title
				stick: true // maintain when user navigates (see docs on the renderEvent method)
			});
			
			$(this).draggable({
				zIndex: 999,
				revert: true, // will cause the event to go back to its
				revertDuration: 0 //  original position after the drag
			});
		});
	}

	function TabBindingOption() {
		$(".nav-tabs li").click(function(e) {
			switch ($(this).attr("id")) {
				case "tab-T": 
					tabActionDisplay(false);
					$(this).tab("show");
					break;
				case "tab-S": 
					tabActionDisplay(true);
					$(this).tab("show");
					break;
				default:
					break;
			}
		});
	}

	function tabActionDisplay() {
		
	}

	function Event_ButtonAddCompanyEmpno() {
		if ($("#" + $("#tx_CompanyEmpNo").val()).length > 0) {
			$("#ErrMsg").text("Error!");
			$("#divErrMsg").modal("show");
			return;
		}

		var divCompanyEmpNo = document.createElement("div");
		divCompanyEmpNo.setAttribute("class", "btn-group");
		divCompanyEmpNo.setAttribute("data-empno", $("#tx_CompanyEmpNo").val());
		var label = document.createElement("label");
		label.setAttribute("type", "button");
		label.setAttribute("class", "btn btn-primary");
		label.textContent = GetContacterName($("#tx_CompanyEmpNo").val());
		var button = document.createElement("button");
		button.setAttribute("type", "button");
		button.setAttribute("class", "btn btn-primary");
		var addimage = document.createElement("i");
		addimage.setAttribute("class", "fa fa-times");
		button.appendChild(addimage);
		divCompanyEmpNo.appendChild(label);
		divCompanyEmpNo.appendChild(button);
		divCompany.appendChild(divCompanyEmpNo);
		EventDeleteConpanyEmp();
	}

	function EventDeleteConpanyEmp() {
		$("#divCompany div button").bind("click", function() {
			$(this)
				.parent("div")
				.remove();
		});
	}

	function GetContacterName(InputEmpno) {
		var ReturnValue = InputEmpno;
		return ReturnValue;
	}

	function Event_ContacterInput() {
		$("#Contacter").bind("input", function() {
			if ($("#Contacter").val().length === 6) {
				GetContacterName($("#Contacter").val());
			} else {
				$("#ContacterName").text("");
			}
		});
	}

	function DefaultContacter() {
		$("#Contacter").val(LoginEmpno);
		GetContacterName($("#Contacter").val());
	}
	
	var max='<?php echo $max; ?>';
	var min='<?php echo $min; ?>';
	var slide = $('#slot').val();  
	function BindingFullCalendar() {
		$("#calendar1").fullCalendar({
			schedulerLicenseKey: "CC-Attribution-NonCommercial-NoDerivatives",
			header: {
				left: "prev,today,next",
				center: "title",
				right: "month,agendaWeek,agendaDay"
			},
			lang: "zh-tw",
			defaultView: "agendaDay",
			buttonText: {
				month: "Month",
				agendaWeek: "Week",
				agendaDay: "Day",
				today: "Today"
			},
			minTime: min + ':00:00',
			maxTime: max +':00:00',
			slotDuration: '00:'+slide+':00',
			events: Events,
			selectable: true,
			selectHelper: true,
			resources: AmbulanceResources,
			editable: true,
			eventDrop: function(event,dayDelta,minuteDelta,allDay,revertFunc) {
			    var staff_id = event.resourceId;
				var start = ($.fullCalendar.formatDate(event.start, 'Y-M-D HH:mm:ss' ));
				var end = ($.fullCalendar.formatDate(event.end, 'Y-M-D HH:mm:ss' ));
				var app_id = event.appointment_id;
				var provi = start+'/'+end+'/'+app_id+'/'+staff_id;
				var url= '<?php echo base_url().'client/schedule/edit_apt' ?>';
		        var txt;
				var r = confirm("Appointment for "+event.title+" will be rescheduled. Continue");
				if (r == true) {
					$.ajax({
						type: "POST",
						dataType: 'json',
						data : {provisional:provi},
						url: url,
						success: function(data) {
							if(data.status == 'failure'){
								
							} else if(data.status == 'success') {
								
							}
						}, 
						complete: function(){
								
						},
						error: function(e){ // alert error if ajax fails
							alert(e.responseText);
						} 
					});
				} else {
				    alert("You pressed Cancel!");
				}
				
			},
			loading: function(isLoading) {
				if (isLoading) {
					$("#loadingModal").modal();
				} else {
					DefaultContacter();
					$("#loadingModal").modal("toggle");
				}
			},
			dayClick: function(date, jsEvent, view, resourceObj) {
				if (view.name === "month" || view.name === "agendaWeek") {
					$("#calendar1").fullCalendar("gotoDate", date);
					$("#calendar1").fullCalendar("changeView", "agendaDay");
					return;
				}
				$('#e_staffid').val(resourceObj.id);
				$('#Consultant_name').text(resourceObj.title);
				$('#Consultant').val(resourceObj.id);
				
			},
			select: function(eventstart, eventend, ev, view) {
				var sta = ($.fullCalendar.formatDate(eventstart, 'DD-MM-Y'));
				var start = ($.fullCalendar.formatDate(eventstart, 'Y-M-D HH:mm:ss' ));
				var start1 = ($.fullCalendar.formatDate(eventstart, 'Y-MM-DD HH:mm:ss' ));
				var end = ($.fullCalendar.formatDate(eventend, 'Y-M-D HH:mm:ss' ));
				var t = start.split(' ');
				var m = t[0].split('-');
				if(m[1] < 10){
					m[1]= '0' + m[1];
				}
				if(m[2] < 10){
					m[2] = '0'+m[2];
				}
				$('.from-input').multiDatesPicker({
					addDates: [sta],
				});
				
				var today1 = (m[0]+'-'+m[1]+'-'+m[2]);				
				var t1 = t[1].split(':');
				if(t1[0] > '12') {
						time = (t1[0]-12)+':'+t1[1]+' '+'pm';
					} else if(t1[0] == '12') {
						time = (t1[0])+':'+t1[1]+' '+'pm';
					} else {
						time = (t1[0])+':'+t1[1]+' '+'am';
					}
				var today = '<?php echo date('Y-m-d'); ?>';
				if(today > today1){
						alert('Previous date Appointment booking is not allowed');
				} else {
					   
					    $('#start').val(start);
						var f = time.split(':');
						if(f[0] == '12'){
							if(f[1] == '00 pm'){
							 $('#from').val('12:00 pm');	
							} else {
								$('#from').val(time);
							}
						} else {
							$('#from').val(time);
						}
						var slot = '<?php if($settings['sch_slot'] != '') { echo $settings['sch_slot']; } else { echo '30';  } ?>';
						var val = time.split(':');
						var value = val[1].split(' ');
						if((Number(value[0]) + Number(slot)) == '60') {
						  if(val[0] == '12') {
							  var t = '1' + ':'+ '00' +' '+ 'pm';
						  } else {
							  if((Number(val[0]) + Number(1)) == '12') {
							  var t = (Number(val[0]) + Number(1)) + ':'+ '00' +' '+ 'pm';
							  } else {
								   var t = (Number(val[0]) + Number(1)) + ':'+ '00' +' '+ value[1];
							  }
						  }
						} else if((Number(value[0]) + Number(slot)) > '60') {
						  var v1 = (Number(value[0]) + Number(slot)) - 60;
						  if(val[0] == '12') {
							  var t = '1' + ':'+ v1 +' '+ 'pm';
						  } else {
							  if((Number(val[0]) + Number(1)) == '12') {
								var t = (Number(val[0]) + Number(1)) + ':'+ v1 +' '+ 'pm';
							  } else {
								   var t = (Number(val[0]) + Number(1)) + ':'+ v1 +' '+ value[1];
							  }
						  }
						} else {
							  var t = val[0] + ':'+ (Number(value[0]) + Number(slot)) +' '+ value[1];
						}
						var g = start.split(' ');						
						$('#to').val(t);
						$('#adapt').html(g[0]+' - '+time);   
						$('#start').val(start);
						$('#end').val(end);
						var s_id = $('#e_staffid').val();
				        var val = start1 + '/' + $('#e_staffid').val();
						var url= '<?php echo base_url().'client/schedule/search_event' ?>';
				        $.ajax({
							type: "POST",
							dataType: 'json',
							data : {search:val},
							url: url,  
							success: function(data) {
								if(data.status == 'Failure'){
									if (view.name === "agendaDay") {
										DefaultContacter();
										$("#modalTitle").text("Add Appointment - "+ start);
										if(s_id != ''){
										$("#eventModal").modal();
										} else {
											$('#issue_model').modal();
										}
									}
								} else if(data.status == 'success') {
									$('#start_event').val(val);
									$("#Cancel_model").modal();
								}
							}, 
							complete: function(){
									
							},
							error: function(e){ // alert error if ajax fails
								alert(e.responseText);
							} 
						});
				}  
				
			},
			eventClick:  function(event, delta, revertFunc, jsEvent, ui, view) {
					if(event.event_id == undefined){
						var title = event.title;
						var id = event.appointment_id;
						$('#pat_id').val(event.patient_id);
						$('#pat_id1').val(event.patient_id);
						$('#edit_app_id').val(event.appointment_id);
						$('#edit_title').html('<a style="color:white;" href="<?php echo base_url().'client/patient/view/' ?>'+event.patient_id+'" >&nbsp;&nbsp;&nbsp;'+event.title+'&nbsp;&nbsp;&nbsp;</a>');
						$('#edit_mobile').text(event.mobile_no);  
						$('#get_title').val(title);
						$('#edit_title1').val(title);
						$('#chat_room').val(event.chat_room);
						if(event.encounter_type != '2'){
							$('#join_online').hide();
							$('#book').show();

						}
						if(event.encounter_type == '2'){
							$('#book').hide();
							$('#join_online').show();

						}
						
						if(event.bill == '0'){
								var val = "<a style='color:white;' class='Invoice' href='<?php echo base_url().'client/invoice/add/Pt/';  ?>"+event.patient_id+"/"+event.appointment_id+"' >Make Bill</a>";
						} else {
							if(event.bill_status == '0'){
								var val = "<a style='color:white;' class='payment' href='<?php echo base_url().'client/invoice/invoice_status_update/';  ?>"+event.bill_id+"/"+event.patient_id+"' >Add Payment</a>";
							}
							if(event.bill_status == '1'){  
								var val = "<a style='color:white;' class='ViewInvoice' href='<?php echo base_url().'client/invoice/views/searchby/PatientName/';  ?>"+event.title+"' >View Invoice</a>";
							}
						}
						$('.b_status').html(val);
						var url= '<?php echo base_url().'client/schedule/get_notes' ?>';
						$.ajax({
								type: "POST",
								dataType: 'json',
								data : {a_id:id},
								url: url,
								success: function(data) {
									if(data.status != 'Failure'){   
										$('#notes1').val(data.message);
										$('#notes_change').val(data.message);
										$('.edit_apt').text(data.apt);
										$('#consu').text(data.consu);
									} else {  
										$('.edit_apt').text(data.apt);
										$('#consu').text(data.consu);
									}
								}, 
								complete: function(){
										
								},
								error: function(e){ // alert error if ajax fails
									//alert(e.responseText);
								} 
						});
						var today = '<?php echo date('Y-m-d'); ?>';
						if(event.appointment_from < today){
							$('#cancel').attr("disabled", true);
						} else {
						}
						if(event.status != 1) {
						   $("#editevent").modal();
						}  else {
							alert('Cancelled Appointments');
						}
					}
			},
			eventResize: function(event, delta, revertFunc, jsEvent, ui, view) {  
				var staff_id = event.resourceId;
				var start = ($.fullCalendar.formatDate(event.start, 'Y-M-D HH:mm:ss' ));
				var end = ($.fullCalendar.formatDate(event.end, 'Y-M-D HH:mm:ss' ));
				var app_id = event.appointment_id;
				var provi = start+'/'+end+'/'+app_id+'/'+staff_id;
				var url= '<?php echo base_url().'client/schedule/edit_apt' ?>';
		
				$.ajax({
						type: "POST",
						dataType: 'json',
						data : {provisional:provi},
						url: url,
						success: function(data) {
							if(data.status == 'failure'){
								
							} else if(data.status == 'success') {
								
							}
						}, 
						complete: function(){
								
						},
						error: function(e){ // alert error if ajax fails
							alert(e.responseText);
						} 
				}); 
			},
			eventRender: function(event, element) {
				if(event.event_id == undefined){
				element.find(".fc-title").append("&nbsp;&nbsp;<a class='assessment' href='<?php echo base_url().'client/patient/view/';  ?>"+event.patient_id+"' data-toggle='tooltip' data-placement='top' title='Profile' ><img src='<?php echo base_url() ?>img/35387-person-icon-blue-no-tie-images.png' style='width:12px; height:12px;'></img></a>&nbsp;&nbsp;");
				
				if(event.remind == 1){
				 element.find(".fc-title").append("&nbsp;&nbsp;<a class='notes' data-toggle='tooltip' data-placement='top' title='Reminder SMS'><i class='fa fa-check' style='font-size: 1.3em; color:green;'></i><span class='tooltiptext'>Reminder SMS </span></a>&nbsp;&nbsp;");
				}
				
				if(event.notes != ''){
				 element.find(".fc-title").append("&nbsp;&nbsp;<a class='notes' data-toggle='tooltip' data-placement='top' title='Notes'><img src='<?php echo base_url() ?>img/65990-sticky-notepad-and-pencil-images.png' style='width:14px; height:14px;'></img></a>&nbsp;&nbsp;");
				}
				
				if(event.bill_id == '0'){  
					element.find(".fc-title").append("&nbsp;<a class='Invoice' href='<?php echo base_url().'client/invoice/add/Pt/';  ?>"+event.patient_id+"/"+event.appointment_id+"' data-toggle='tooltip' data-placement='top' title='Make Bill'><i class='fa fa-usd' style='font-size: 1.3em; color:red;'></i></a>&nbsp;&nbsp;");
				} else {
					if(event.bill_status == '0'){
						element.find(".fc-title").append("&nbsp;<a class='payment' href='<?php echo base_url().'client/invoice/invoice_status_update/';  ?>"+event.bill_id+"/"+event.patient_id+"' data-toggle='tooltip' data-placement='top' title='Make Payment'><i class='fa fa-usd' style='font-size: 1.3em; color:red;'></i></a>&nbsp;&nbsp;");
					}
					if(event.bill_status == '1'){  
						element.find(".fc-title").append("&nbsp;<a class='ViewInvoice' href='<?php echo base_url().'client/invoice/views/searchby/PatientName/';  ?>"+event.title+"' data-toggle='tooltip' data-placement='top' title='Paid' ><i class='fa fa-usd' style='font-size: 1.3em; color:green;'></i></a>&nbsp;&nbsp;");
					}
				}
				if(event.visit == '1'){
				 element.find(".fc-title").append("&nbsp;&nbsp;<a class='visit' data-toggle='tooltip' data-placement='top' title='Visited'><i class='fa fa-user' style='font-size: 1.3em; color:#0D7628;'></i></a>&nbsp;&nbsp;");  
				} else {
					 element.find(".fc-title").append("&nbsp;&nbsp;<a class='Nvisit' data-toggle='tooltip' data-placement='top' title='Not Visited'><i class='fa fa-user' style='font-size: 1.3em; color:red;'></i></a>&nbsp;&nbsp;");
				}
				
			  }
			  if (event.rendering == 'background' && event.title != undefined) {
				element.append('<div style="color:white; text-align:center; font-size:15px;">'+event.title+'</div>');
			  }
			 
			},
			viewRender: function(view, element) {
			}
		});
	}

	function DefaultTab() {
		tabActionDisplay(false);
		$("#tab-I").tab("show");
	}
});
</script>
<script>
    $(function(){
		$('#topTooltip, #rightTooltip, #bottomTooltip, #leftTooltip').tooltip();
	
		$("#treat_add").click(function(){
			$("#add_treatment").fadeIn();
			$("#addtreat").hide();
		});
		$("#treat_add1").click(function(){
			$("#add_treatment1").fadeIn();
			$("#addtreat1").hide();
		});
		$("#cancelProvDiag").click(function(){
			$("#add_treatment").fadeOut();
			$("#addtreat").show();
		});
		$("#cancelProvDiag1").click(function(){
			$("#add_treatment1").fadeOut();
			$("#addtreat1").show();
		});
		
		$("#saveProvDiag1").click(function(e){
			e.preventDefault();
			var url= '<?php echo base_url().'client/patient/add_treatment/' ?>';
			var t_name = $('#t_name1').val();
			var t_desc = $('#t_desc1').val();
			var t_price = $('#t_price1').val();
			var provDiag = t_name + '/' + t_desc + '/' + t_price;  
			$.ajax({  
				url : url,
				type: "POST",
				data : {prov:provDiag},
				dataType: 'json', 
				success:function(data, textStatus, jqXHR,form) 
				{
					$("#add_treatment1").fadeOut();
					//$("#treatments").append('<option value=' + data.Treatment.item_id + ' selected >' + data.Treatment.item_name + '</option>');
					$("#treatments1").append("<option value='"+data.Treatment.item_id+"' selected>"+data.Treatment.item_name+"</option>");
					$('#treatments1').trigger('change');
				},
				error: function(jqXHR, textStatus, errorThrown) 
				{
					$.jGrowl("Treatment Item Has Been Added Successfully!");
					setTimeout(function(){ 
							window.location.reload();
					}, 1000);
				}
			}); 
		});
		$("#saveProvDiag").click(function(e){
			e.preventDefault();
			var url= '<?php echo base_url().'client/patient/add_treatment/' ?>';
			var t_name = $('#t_name').val();
			var t_desc = $('#t_desc').val();
			var t_price = $('#t_price').val();
			var provDiag = t_name + '/' + t_desc + '/' + t_price;
				
			 $.ajax({
				url : url,
				type: "POST",
				data : {prov:provDiag},
				dataType: 'json', 
				success:function(data, textStatus, jqXHR,form) 
				{
					$("#add_treatment").fadeOut();
					//$("#treatments").append('<option value=' + data.Treatment.item_id + ' selected >' + data.Treatment.item_name + '</option>');
					$("#treatments").append("<option value='"+data.Treatment.item_id+"' selected>"+data.Treatment.item_name+"</option>");
					$('#treatments').trigger('change');
				},
				error: function(jqXHR, textStatus, errorThrown) 
				{
					$.jGrowl("Treatment Item Has Been Added Successfully!");
					setTimeout(function(){ 
							window.location.reload();
					}, 1000);
				}
			}); 
		});
		$('.pt_add').hide();
		$('.add_pat').click(function(){
			$('.pt_add').show();
			$('#new_pat').hide();
			$('#new_pat1').hide();
		});
		
		$('#check-event').click(function() {
			var val = $('#edit_app_id').val();
			var val1 = $('#pat_id').val();
			window.location = "<?php echo base_url().'client/invoice/add/Pt/' ?>" + val1 + '/' + val;
		});
		$('#edit_event').click(function() {
			var val = $('#edit_app_id').val();
			window.location = "<?php echo base_url().'client/schedule/reschedule1/' ?>" + val;
		});
		$('#session_rep').click(function(){
			var val1 = $('#pat_id').val();
			window.location = "<?php echo base_url().'client/reports/report_session/' ?>" + val1 ;
		});
		$('#encounter').click(function(){
			var val1 = $('#pat_id').val();
			window.location = "<?php echo base_url().'client/patient/view/' ?>" + val1 ;
		});
		$('#join_online').click(function(){
			var val1 = $('#edit_app_id').val();
			var val2 = $('#pat_id').val();
			var val3 = $('#chat_room').val();
			window.location = "<?php echo base_url().'client/telehealthroom/join/' ?>" + val1 +'/'+val2+'/'+val3;
		});
      $('#external-events div.external-event').each(function() {
      $(this).draggable({
          zIndex: 999,
          revert: true, 
          revertDuration: 0,
          drag: function() {
            $('.cal-options .date-info').addClass('out')
            $('.cal-options #event-delete').addClass('in')
          },
          stop: function() {
            $('.cal-options .date-info').removeClass('out')
            $('.cal-options #event-delete').removeClass('in')
          }
        });
        
      });
     
	$('#treatment_date').click(function(){
			var slide = $('#slot').val();
			var max='<?php echo $max; ?>';
		    var min='<?php echo $min; ?>';
			var from = min;
			var to_to = 11;
			if(slide == 30)
				 {
					 $('#time option[value!="0"]').remove();
					 $('#time').append('<option value="">Please Select</option>');
					 for(var i = from ;i <= 12; i++)
					 {
						 if(i == 12)
						 {
							 $('#time').append('<option value="12:00 PM">12:00 PM</option>'); 
							 $('#time').append('<option value="12:30 PM">12:30 PM</option>');	 
						
						 }
						 for(var j = 0; j <= 60;j = j+30)
						 {
							 if(i == 12)
							 {
								//var store = i +  j + ' PM';
							 }
							 else
							 {
								 if(j == 0)
								 {
									var store = i + ':0' + j + ' AM';
								 }
								 else
								 {
									var store= i + ':' + j + ' AM'; 
								 }
								if(j == 60)
								{
									break;
								}
								
								$('#time').append('<option value="' + store  +'">' + store + '</option>');
						
							}
						 }
					 }
					 for(var i = 1 ;i < to_to ; i++)
					 {
						 if(i == 12)
						 {
							 $('#time').append('<option value="12:00 PM">12:00 PM</option>'); 
							 $('#time').append('<option value="12:30 PM">12:30 PM</option>');	 
						 }
						 for(var j = 0;j <= 60;j = j+30)
						 {
							 if(i == 12)
							 {
								//var store=i +  j + ' PM';
							 }
							 else
							 {
									 if(j == 0)
									 {
									var store=i + ':0' + j + ' PM';
									 }
									 else
									 {
										var store=i + ':' + j + ' PM'; 
									 }
									if(j == 60)
									{
										break;
									}
								 $('#time').append('<option value="' + store  +'">' + store + '</option>');
							}
						 }
					 }
					 
				 }
				 if(slide == 15)
				 {
					
					 $('#time option[value!="0"]').remove();
					 $('#time').append('<option value="">Please Select</option>');
					 for(var i = from;i <= 12;i++)
					 {
						 if(i == 12)
						 {
							 $('#time').append('<option value="12:00 PM">12:00 PM</option>'); 
							 $('#time').append('<option value="12:15 PM">12:15 PM</option>');	 
						     $('#time').append('<option value="12:30 PM">12:30 PM</option>');	 
							 $('#time').append('<option value="12:45 PM">12:45 PM</option>');	 
						 }
						 for(var j=0;j<=60;j=j+15)
						 {
							 if(i == 12)
							 {
								// var store= i + j + ' PM';
							 }
							 else
							 {
							 if(j == 0)
							 {
							var store=i + ':0' + j + ' AM';
							 }
							 else
							 {
								var store=i + ':' + j + ' AM'; 
							 }
							if(j == 60)
							{
								break;
							}
						 $('#time').append('<option value="' + store  +'">' + store + '</option>');
						 
						
						
						 }
						 }
					 }
					for(var i = 1;i<=to_to;i++)
					 {
						 if(i == 12)
						 {
							 $('#time').append('<option value="12:00 PM">12:00 PM</option>'); 
							 $('#time').append('<option value="12:15 PM">12:15 PM</option>');	 
						     $('#time').append('<option value="12:30 PM">12:30 PM</option>');	 
							 $('#time').append('<option value="12:45 PM">12:45 PM</option>');	 
						 }
						 for(var j=0;j<=60;j=j+15)
						 {
							 if(i == 12)
							 {
								 //var store= i + j + ' PM';
							 }
							 else
							 {
								 if(j == 0)
								 {
								var store=i + ':0' + j + ' PM';
								 }
								 else
								 {
									var store=i + ':' + j + ' PM'; 
								 }
								if(j == 60)
								{
									break;
								}
									$('#time').append('<option value="' + store  +'">' + store + '</option>');
							}
						 }
					 }
							
							
				
				 }
				 if(slide == 60)
				 {
					 $('#time option[value!="0"]').remove();
					 $('#time').append('<option value="">Please Select</option>');
					 for(var i = from;i <= 12;i++)
					 {
						 if(i == 12)
						 {
							 $('#time').append('<option value="12:00 PM">12:00 PM</option>'); 
								
						 }
						 for(var j=0;j<=60;j=j+60)
						 {
							 if(i == 12)
							 {
								 
							 }
							 else
							 {
							 if(j == 0)
							 {
								var store=i + ':0' + j + ' AM';
							 }
							 else
							 {
								var store=i + ':' + j + ' AM'; 
							 }
							if(j == 60)
							{
								break;
							}
						 $('#time').append('<option value="' + store  +'">' + store + '</option>');
						
					
						 }
						 }
					 }
					 for(var i = 1;i<= to_to;i++)
					 {
						 if(i == 12)
						 {
							 $('#time').append('<option value="12:00 PM">12:00 PM</option>'); 
						 }
						 for(var j=0;j<=60;j=j+60)
						 {
							 if(i == 12)
							 {
								 
							 }
							 else
							 {
							 if(j == 0)
							 {
							var store=i + ':0' + j + ' PM';
							 }
							 else
							 {
								var store=i + ':' + j + ' PM'; 
							 }
							if(j == 60)
							{
								break;
							}
						 $('#time').append('<option value="' + store  +'">' + store + '</option>');
						 }
						 }
					 }
					 
				 } 
				  if(slide == 5)
				 {
					 $('#time option[value!="0"]').remove();
					 $('#time').append('<option value="">Please Select</option>');
					 for(var i = from;i <= 12;i++)
					 {
						 if(i == 12)
						 {
							 $('#time').append('<option value="12:00 PM">12:00 PM</option>'); 
							 $('#time').append('<option value="12:05 PM">12:05 PM</option>');	 
						     $('#time').append('<option value="12:10 PM">12:10 PM</option>');	 
							 $('#time').append('<option value="12:15 PM">12:15 PM</option>');	 
							 $('#time').append('<option value="12:20 PM">12:20 PM</option>');	 
						     $('#time').append('<option value="12:25 PM">12:25 PM</option>');	 
							 $('#time').append('<option value="12:30 PM">12:30 PM</option>');	 
							 $('#time').append('<option value="12:35 PM">12:35 PM</option>');	 
						     $('#time').append('<option value="12:40 PM">12:40 PM</option>');	 
							 $('#time').append('<option value="12:45 PM">12:45 PM</option>');	 
							 $('#time').append('<option value="12:50 PM">12:50 PM</option>');	 
							 $('#time').append('<option value="12:55 PM">12:55 PM</option>');	 
						   
						 }
						 for(var j=0;j<=60;j=j+05)
						 {
							 if(i == 12)
							 {
								// var store=i +  j + ' PM';
							 }
							 else
							 {
							 if(j == 0 || j == 5)
							 {
							var store=i + ':0' + j + ' AM';
							 }
							 else
							 {
								var store=i + ':' + j + ' AM'; 
							 }
							if(j == 60)
							{
								break;
							}
						 $('#time').append('<option value="' + store  +'">' + store + '</option>');
						
					
						 }
						 }
					 }
					 for(var i = 1;i<= to_to;i++)
					 {
						 if(i == 12)
						 {
							  $('#time').append('<option value="12:00 PM">12:00 PM</option>'); 
							 $('#time').append('<option value="12:05 PM">12:05 PM</option>');	 
						     $('#time').append('<option value="12:10 PM">12:10 PM</option>');	 
							 $('#time').append('<option value="12:15 PM">12:15 PM</option>');	 
							 $('#time').append('<option value="12:20 PM">12:20 PM</option>');	 
						     $('#time').append('<option value="12:25 PM">12:25 PM</option>');	 
							 $('#time').append('<option value="12:30 PM">12:30 PM</option>');	 
							 $('#time').append('<option value="12:35 PM">12:35 PM</option>');	 
						     $('#time').append('<option value="12:40 PM">12:40 PM</option>');	 
							 $('#time').append('<option value="12:45 PM">12:45 PM</option>');	 
							 $('#time').append('<option value="12:50 PM">12:50 PM</option>');	 
							 $('#time').append('<option value="12:55 PM">12:55 PM</option>');	 
						 }
						 for(var j=0;j<=60;j=j+05)
						 {
							 if(i == 12)
							 {
								//var store=i +  j + ' PM'; 
							 }
							 else
							 {
							 if(j == 0 || j == 5)
							 {
							var store=i + ':0' + j + ' PM';
							 }
							 else
							 {
								var store=i + ':' + j + ' PM'; 
							 }
							if(j == 60)
							{
								break;
							}
						 $('#time').append('<option value="' + store  +'">' + store + '</option>');
							}
						 }
					 }
					 
				 }

				var cnt=$('select#time option').length;
				var time_sel=$('#time').val();
				var date_app=$('.appointment_from').val();
				var date = date_app.split('/');
				var final_date=date[2]+'-'+date[1]+'-'+date[0];
				spl=$('#date').val().split(',');
				
				for(var i=0;i<spl.length;i++)
				{ 
					var spl1=spl[i].split(' ');
					
					if(final_date == spl1[0])
					{
							var opt_t =spl1[1].split(":");
							if(opt_t[0] <= '12'){
									var time = opt_t[0]+':'+opt_t[1]+' '+'AM';
							}
							else {
								opt_t[0] =	parseInt(opt_t[0])-12;
								var time = opt_t[0]+':'+opt_t[1]+' '+'PM';
							}
							
							for( var j = 1; j < cnt; j++){
								if(time == document.getElementById("time").options[j].value) {
									$("#time option[value = '" + time + "' ]").remove();
								}
							}
						
					}
				}
		});
}); 


$('#pat_close').click(function(){
	window.location="<?php echo base_url().'client/schedule/appointment' ?>";
	
});
	
</script>
 
</body>
</html>