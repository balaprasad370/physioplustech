<!DOCTYPE html>
<html>
	<head>
	 <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta http-equiv="Content-Language" content="en">
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
     <?php foreach($patient_info as $row){ ?>
	 <title><?php echo $row['first_name']; ?> - Physio Plus Tech</title>
	 <?php } ?>
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"    />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	 <meta name="msapplication-tap-highlight" content="no">
    <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
	 <link href="<?php echo base_url()?>my_assets/main.css" rel="stylesheet"> 
     <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/mdp.css">
	 <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/prettify.css">
	<script src="<?php echo base_url() ?>assets/sweet-alert/sweetalert.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/sweet-alert/sweetalert.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.gritter.css" />
	<script src='https://meet.jit.si/external_api.js'></script>
        <style>
            /* The Overlay (background) */
.overlay {
  /* Height & width depends on how you want to reveal the overlay (see JS below) */   
  height: 100%;
  width: 0;
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  background-color: rgb(0,0,0); /* Black fallback color */
  background-color: #e6eafa;/* Black w/opacity */
  overflow-x: hidden; /* Disable horizontal scroll */
  transition: 0.5s; /* 0.5 second transition effect to slide in or slide down the overlay (height or width, depending on reveal) */
}

/* Position the content inside the overlay */
.overlay-content {
  position: relative;
  top: 25%; /* 25% from the top */
  width: 100%; /* 100% width */
  text-align: center; /* Centered text/links */
  margin-top: 30px; /* 30px top margin to avoid conflict with the close button on smaller screens */
}

/* The navigation links inside the overlay */
.overlay a {
  padding: 8px;
  text-decoration: none;
  font-size: 36px;
  color: #818181;
  display: block; /* Display block instead of inline */
  transition: 0.3s; /* Transition effects on hover (color) */
}

/* When you mouse over the navigation links, change their color */
.overlay a:hover, .overlay a:focus {
  color: #f1f1f1;
}

/* Position the close button (top right corner) */
.overlay .closebtn {
  position: absolute;
  top: 20px;
  right: 45px;
  font-size: 60px;
}

/* When the height of the screen is less than 450 pixels, change the font-size of the links and position the close button again, so they don't overlap */
@media screen and (max-height: 450px) {
  .overlay a {font-size: 20px}
  .overlay .closebtn {
    font-size: 40px;
    top: 15px;
    right: 35px;
  }
}



  
.sr-only-focusable:active,
.sr-only-focusable:focus {
  position: static;
  width: auto;
  height: auto;
  margin: 0;
  overflow: visible;
  clip: auto
}

[role=button] {
  cursor: pointer
}

.initialism {
  font-size: 90%;
  text-transform: uppercase
}

blockquote {
  padding: 10px 20px;
  margin: 0 0 20px;
  font-size: 17.5px;
  border-left: 5px solid #eee
}

blockquote ol:last-child,
blockquote p:last-child,
blockquote ul:last-child {
  margin-bottom: 0
}

blockquote .small,
blockquote footer,
blockquote small {
  display: block;
  font-size: 80%;
  line-height: 1.42857143;
  color: #777
}

blockquote .small:before,
blockquote footer:before,
blockquote small:before {
  content: '\2014 \00A0'
}

.blockquote-reverse,
blockquote.pull-right {
  padding-right: 15px;
  padding-left: 0;
  text-align: right;
  border-right: 5px solid #eee;
  border-left: 0
}

.blockquote-reverse .small:before,
.blockquote-reverse footer:before,
.blockquote-reverse small:before,
blockquote.pull-right .small:before,
blockquote.pull-right footer:before,
blockquote.pull-right small:before {
  content: ''
}

.blockquote-reverse .small:after,
.blockquote-reverse footer:after,
.blockquote-reverse small:after,
blockquote.pull-right .small:after,
blockquote.pull-right footer:after,
blockquote.pull-right small:after {
  content: '\00A0 \2014'
}

address {
  margin-bottom: 20px;
  font-style: normal;
  line-height: 1.42857143
}



#add_participants_model.table {
  width: 100%;
  max-width: 100%;
  margin-bottom: 20px
}

#add_participants_model.table>tbody>tr>td,
#add_participants_model.table>tbody>tr>th,
#add_participants_model.table>tfoot>tr>td,
#add_participants_model.table>tfoot>tr>th,
#add_participants_model.table>thead>tr>td,
#add_participants_model.table>thead>tr>th {
  padding: 8px;
  line-height: 1.42857143;
  vertical-align: top;
  border-top: 1px solid #ddd
}

#add_participants_model.table>thead>tr>th {
  vertical-align: bottom;
  border-bottom: 2px solid #ddd
}

#add_participants_model.table>caption+thead>tr:first-child>td,
#add_participants_model.table>caption+thead>tr:first-child>th,
#add_participants_model.table>colgroup+thead>tr:first-child>td,
#add_participants_model.table>colgroup+thead>tr:first-child>th,
#add_participants_model.table>thead:first-child>tr:first-child>td,
#add_participants_model.table>thead:first-child>tr:first-child>th {
  border-top: 0
}

#add_participants_model.table>tbody+tbody {
  border-top: 2px solid #ddd
}

#add_participants_model.table #add_participants_model.table {
  background-color: #fff
}

#add_participants_model.table-condensed>tbody>tr>td,
#add_participants_model.table-condensed>tbody>tr>th,
#add_participants_model.table-condensed>tfoot>tr>td,
#add_participants_model.table-condensed>tfoot>tr>th,
#add_participants_model.table-condensed>thead>tr>td,
#add_participants_model.table-condensed>thead>tr>th {
  padding: 5px
}

#add_participants_model.table-bordered {
  border: 1px solid #ddd
}

#add_participants_model.table-bordered>tbody>tr>td,
#add_participants_model.table-bordered>tbody>tr>th,
#add_participants_model.table-bordered>tfoot>tr>td,
#add_participants_model.table-bordered>tfoot>tr>th,
#add_participants_model.table-bordered>thead>tr>td,
#add_participants_model.table-bordered>thead>tr>th {
  border: 1px solid #ddd
}

#add_participants_model.table-bordered>thead>tr>td,
#add_participants_model.table-bordered>thead>tr>th {
  border-bottom-width: 2px
}

#add_participants_model.table-striped>tbody>tr:nth-of-type(odd) {
  background-color: #f9f9f9
}

#add_participants_model.table-hover>tbody>tr:hover {
  background-color: #f5f5f5
}

table col[class*=col-] {
  position: static;
  display: table-column;
  float: none
}

table td[class*=col-],
table th[class*=col-] {
  position: static;
  display: table-cell;
  float: none
}

#add_participants_model.table>tbody>tr.active>td,
#add_participants_model.table>tbody>tr.active>th,
#add_participants_model.table>tbody>tr>td.active,
#add_participants_model.table>tbody>tr>th.active,
#add_participants_model.table>tfoot>tr.active>td,
#add_participants_model.table>tfoot>tr.active>th,
#add_participants_model.table>tfoot>tr>td.active,
#add_participants_model.table>tfoot>tr>th.active,
#add_participants_model.table>thead>tr.active>td,
#add_participants_model.table>thead>tr.active>th,
#add_participants_model.table>thead>tr>td.active,
#add_participants_model.table>thead>tr>th.active {
  background-color: #f5f5f5
}

#add_participants_model.table-hover>tbody>tr.active:hover>td,
#add_participants_model.table-hover>tbody>tr.active:hover>th,
#add_participants_model.table-hover>tbody>tr:hover>.active,
#add_participants_model.table-hover>tbody>tr>td.active:hover,
#add_participants_model.table-hover>tbody>tr>th.active:hover {
  background-color: #e8e8e8
}

#add_participants_model.table>tbody>tr.success>td,
#add_participants_model.table>tbody>tr.success>th,
#add_participants_model.table>tbody>tr>td.success,
#add_participants_model.table>tbody>tr>th.success,
#add_participants_model.table>tfoot>tr.success>td,
#add_participants_model.table>tfoot>tr.success>th,
#add_participants_model.table>tfoot>tr>td.success,
#add_participants_model.table>tfoot>tr>th.success,
#add_participants_model.table>thead>tr.success>td,
#add_participants_model.table>thead>tr.success>th,
#add_participants_model.table>thead>tr>td.success,
#add_participants_model.table>thead>tr>th.success {
  background-color: #dff0d8
}

#add_participants_model.table-hover>tbody>tr.success:hover>td,
#add_participants_model.table-hover>tbody>tr.success:hover>th,
#add_participants_model.table-hover>tbody>tr:hover>.success,
#add_participants_model.table-hover>tbody>tr>td.success:hover,
#add_participants_model.table-hover>tbody>tr>th.success:hover {
  background-color: #d0e9c6
}

#add_participants_model.table>tbody>tr.info>td,
#add_participants_model.table>tbody>tr.info>th,
#add_participants_model.table>tbody>tr>td.info,
#add_participants_model.table>tbody>tr>th.info,
#add_participants_model.table>tfoot>tr.info>td,
#add_participants_model.table>tfoot>tr.info>th,
#add_participants_model.table>tfoot>tr>td.info,
#add_participants_model.table>tfoot>tr>th.info,
#add_participants_model.table>thead>tr.info>td,
#add_participants_model.table>thead>tr.info>th,
#add_participants_model.table>thead>tr>td.info,
#add_participants_model.table>thead>tr>th.info {
  background-color: #d9edf7
}

#add_participants_model.table-hover>tbody>tr.info:hover>td,
#add_participants_model.table-hover>tbody>tr.info:hover>th,
#add_participants_model.table-hover>tbody>tr:hover>.info,
#add_participants_model.table-hover>tbody>tr>td.info:hover,
#add_participants_model.table-hover>tbody>tr>th.info:hover {
  background-color: #c4e3f3
}

#add_participants_model.table>tbody>tr.warning>td,
#add_participants_model.table>tbody>tr.warning>th,
#add_participants_model.table>tbody>tr>td.warning,
#add_participants_model.table>tbody>tr>th.warning,
#add_participants_model.table>tfoot>tr.warning>td,
#add_participants_model.table>tfoot>tr.warning>th,
#add_participants_model.table>tfoot>tr>td.warning,
#add_participants_model.table>tfoot>tr>th.warning,
#add_participants_model.table>thead>tr.warning>td,
#add_participants_model.table>thead>tr.warning>th,
#add_participants_model.table>thead>tr>td.warning,
#add_participants_model.table>thead>tr>th.warning {
  background-color: #fcf8e3
}

#add_participants_model.table-hover>tbody>tr.warning:hover>td,
#add_participants_model.table-hover>tbody>tr.warning:hover>th,
#add_participants_model.table-hover>tbody>tr:hover>.warning,
#add_participants_model.table-hover>tbody>tr>td.warning:hover,
#add_participants_model.table-hover>tbody>tr>th.warning:hover {
  background-color: #faf2cc
}

#add_participants_model.table>tbody>tr.danger>td,
#add_participants_model.table>tbody>tr.danger>th,
#add_participants_model.table>tbody>tr>td.danger,
#add_participants_model.table>tbody>tr>th.danger,
#add_participants_model.table>tfoot>tr.danger>td,
#add_participants_model.table>tfoot>tr.danger>th,
#add_participants_model.table>tfoot>tr>td.danger,
#add_participants_model.table>tfoot>tr>th.danger,
#add_participants_model.table>thead>tr.danger>td,
#add_participants_model.table>thead>tr.danger>th,
#add_participants_model.table>thead>tr>td.danger,
#add_participants_model.table>thead>tr>th.danger {
  background-color: #f2dede
}

#add_participants_model.table-hover>tbody>tr.danger:hover>td,
#add_participants_model.table-hover>tbody>tr.danger:hover>th,
#add_participants_model.table-hover>tbody>tr:hover>.danger,
#add_participants_model.table-hover>tbody>tr>td.danger:hover,
#add_participants_model.table-hover>tbody>tr>th.danger:hover {
  background-color: #ebcccc
}

#add_participants_model.table-responsive {
  min-height: .01%;
  overflow-x: auto
}

@media screen and (max-width:767px) {
  #add_participants_model.table-responsive {
    width: 100%;
    margin-bottom: 15px;
    overflow-y: hidden;
    -ms-overflow-style: -ms-autohiding-scrollbar;
    border: 1px solid #ddd
  }
  #add_participants_model.table-responsive>#add_participants_model.table {
    margin-bottom: 0
  }
  #add_participants_model.table-responsive>#add_participants_model.table>tbody>tr>td,
  #add_participants_model.table-responsive>#add_participants_model.table>tbody>tr>th,
  #add_participants_model.table-responsive>#add_participants_model.table>tfoot>tr>td,
  #add_participants_model.table-responsive>#add_participants_model.table>tfoot>tr>th,
  #add_participants_model.table-responsive>#add_participants_model.table>thead>tr>td,
  #add_participants_model.table-responsive>#add_participants_model.table>thead>tr>th {
    white-space: nowrap
  }
  #add_participants_model.table-responsive>#add_participants_model.table-bordered {
    border: 0
  }
  #add_participants_model.table-responsive>#add_participants_model.table-bordered>tbody>tr>td:first-child,
  #add_participants_model.table-responsive>#add_participants_model.table-bordered>tbody>tr>th:first-child,
  #add_participants_model.table-responsive>#add_participants_model.table-bordered>tfoot>tr>td:first-child,
  #add_participants_model.table-responsive>#add_participants_model.table-bordered>tfoot>tr>th:first-child,
  #add_participants_model.table-responsive>#add_participants_model.table-bordered>thead>tr>td:first-child,
  #add_participants_model.table-responsive>#add_participants_model.table-bordered>thead>tr>th:first-child {
    border-left: 0
  }
  #add_participants_model.table-responsive>#add_participants_model.table-bordered>tbody>tr>td:last-child,
  #add_participants_model.table-responsive>#add_participants_model.table-bordered>tbody>tr>th:last-child,
  #add_participants_model.table-responsive>#add_participants_model.table-bordered>tfoot>tr>td:last-child,
  #add_participants_model.table-responsive>#add_participants_model.table-bordered>tfoot>tr>th:last-child,
  #add_participants_model.table-responsive>#add_participants_model.table-bordered>thead>tr>td:last-child,
  #add_participants_model.table-responsive>#add_participants_model.table-bordered>thead>tr>th:last-child {
    border-right: 0
  }
  #add_participants_model.table-responsive>#add_participants_model.table-bordered>tbody>tr:last-child>td,
  #add_participants_model.table-responsive>#add_participants_model.table-bordered>tbody>tr:last-child>th,
  #add_participants_model.table-responsive>#add_participants_model.table-bordered>tfoot>tr:last-child>td,
  #add_participants_model.table-responsive>#add_participants_model.table-bordered>tfoot>tr:last-child>th {
    border-bottom: 0
  }
}

fieldset {
  min-width: 0;
  padding: 0;
  margin: 0;
  border: 0
}

legend {
  display: block;
  width: 100%;
  padding: 0;
  margin-bottom: 20px;
  font-size: 21px;
  line-height: inherit;
  color: #333;
  border: 0;
  border-bottom: 1px solid #e5e5e5
}

label {
  display: inline-block;
  max-width: 100%;
  margin-bottom: 5px;
  font-weight: 700
}

input[type=search] {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box
}

input[type=checkbox],
input[type=radio] {
  margin: 4px 0 0;
  margin-top: 1px\9;
  line-height: normal
}

input[type=file] {
  display: block
}

input[type=range] {
  display: block;
  width: 100%
}

select[multiple],
select[size] {
  height: auto
}

input[type=file]:focus,
input[type=checkbox]:focus,
input[type=radio]:focus {
  outline: 5px auto -webkit-focus-ring-color;
  outline-offset: -2px
}

output {
  display: block;
  padding-top: 7px;
  font-size: 14px;
  line-height: 1.42857143;
  color: #555
}

#add_participants_model.form-control {
  display: block;
  width: 100%;
  height: 34px;
  padding: 6px 12px;
  font-size: 14px;
  line-height: 1.42857143;
  color: #555;
  background-color: #fff;
  background-image: none;
  border: 1px solid #ccc;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
  -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
  transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s
}

#add_participants_model.form-control:focus {
  border-color: #66afe9;
  outline: 0;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, .6);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, .6)
}

#add_participants_model.form-control::-moz-placeholder {
  color: #999;
  opacity: 1
}

#add_participants_model.form-control:-ms-input-placeholder {
  color: #999
}

#add_participants_model.form-control::-webkit-input-placeholder {
  color: #999
}

#add_participants_model.form-control::-ms-expand {
  background-color: transparent;
  border: 0
}

#add_participants_model.form-control[disabled],
#add_participants_model.form-control[readonly],
fieldset[disabled] #add_participants_model.form-control {
  background-color: #eee;
  opacity: 1
}

#add_participants_model.form-control[disabled],
fieldset[disabled] #add_participants_model.form-control {
  cursor: not-allowed
}

textarea#add_participants_model.form-control {
  height: auto
}

input[type=search] {
  -webkit-appearance: none
}

@media screen and (-webkit-min-device-pixel-ratio:0) {
  input[type=date]#add_participants_model.form-control,
  input[type=time]#add_participants_model.form-control,
  input[type=datetime-local]#add_participants_model.form-control,
  input[type=month]#add_participants_model.form-control {
    line-height: 34px
  }
  #add_participants_model.input-group-sm input[type=date],
  #add_participants_model.input-group-sm input[type=time],
  #add_participants_model.input-group-sm input[type=datetime-local],
  #add_participants_model.input-group-sm input[type=month],
  input[type=date]#add_participants_model.input-sm,
  input[type=time]#add_participants_model.input-sm,
  input[type=datetime-local]#add_participants_model.input-sm,
  input[type=month]#add_participants_model.input-sm {
    line-height: 30px
  }
  #add_participants_model.input-group-lg input[type=date],
  #add_participants_model.input-group-lg input[type=time],
  #add_participants_model.input-group-lg input[type=datetime-local],
  #add_participants_model.input-group-lg input[type=month],
  input[type=date]#add_participants_model.input-lg,
  input[type=time]#add_participants_model.input-lg,
  input[type=datetime-local]#add_participants_model.input-lg,
  input[type=month]#add_participants_model.input-lg {
    line-height: 46px
  }
}

#add_participants_model.form-group {
  margin-bottom: 15px
}

.checkbox,
.radio {
  position: relative;
  display: block;
  margin-top: 10px;
  margin-bottom: 10px
}

.checkbox label,
.radio label {
  min-height: 20px;
  padding-left: 20px;
  margin-bottom: 0;
  font-weight: 400;
  cursor: pointer
}

.checkbox input[type=checkbox],
.checkbox-inline input[type=checkbox],
.radio input[type=radio],
.radio-inline input[type=radio] {
  position: absolute;
  margin-top: 4px\9;
  margin-left: -20px
}

.checkbox+.checkbox,
.radio+.radio {
  margin-top: -5px
}

.checkbox-inline,
.radio-inline {
  position: relative;
  display: inline-block;
  padding-left: 20px;
  margin-bottom: 0;
  font-weight: 400;
  vertical-align: middle;
  cursor: pointer
}

.checkbox-inline+.checkbox-inline,
.radio-inline+.radio-inline {
  margin-top: 0;
  margin-left: 10px
}

fieldset[disabled] input[type=checkbox],
fieldset[disabled] input[type=radio],
input[type=checkbox].disabled,
input[type=checkbox][disabled],
input[type=radio].disabled,
input[type=radio][disabled] {
  cursor: not-allowed
}

.checkbox-inline.disabled,
.radio-inline.disabled,
fieldset[disabled] .checkbox-inline,
fieldset[disabled] .radio-inline {
  cursor: not-allowed
}

.checkbox.disabled label,
.radio.disabled label,
fieldset[disabled] .checkbox label,
fieldset[disabled] .radio label {
  cursor: not-allowed
}

#add_participants_model.form-control-static {
  min-height: 34px;
  padding-top: 7px;
  padding-bottom: 7px;
  margin-bottom: 0
}

#add_participants_model.form-control-static#add_participants_model.input-lg,
#add_participants_model.form-control-static#add_participants_model.input-sm {
  padding-right: 0;
  padding-left: 0
}

#add_participants_model.input-sm {
  height: 30px;
  padding: 5px 10px;
  font-size: 12px;
  line-height: 1.5;
  border-radius: 3px
}

select#add_participants_model.input-sm {
  height: 30px;
  line-height: 30px
}

select[multiple]#add_participants_model.input-sm,
textarea#add_participants_model.input-sm {
  height: auto
}

#add_participants_model.form-group-sm #add_participants_model.form-control {
  height: 30px;
  padding: 5px 10px;
  font-size: 12px;
  line-height: 1.5;
  border-radius: 3px
}

#add_participants_model.form-group-sm select#add_participants_model.form-control {
  height: 30px;
  line-height: 30px
}

#add_participants_model.form-group-sm select[multiple]#add_participants_model.form-control,
#add_participants_model.form-group-sm textarea#add_participants_model.form-control {
  height: auto
}

#add_participants_model.form-group-sm #add_participants_model.form-control-static {
  height: 30px;
  min-height: 32px;
  padding: 6px 10px;
  font-size: 12px;
  line-height: 1.5
}

#add_participants_model.input-lg {
  height: 46px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.3333333;
  border-radius: 6px
}

select#add_participants_model.input-lg {
  height: 46px;
  line-height: 46px
}

select[multiple]#add_participants_model.input-lg,
textarea#add_participants_model.input-lg {
  height: auto
}

#add_participants_model.form-group-lg #add_participants_model.form-control {
  height: 46px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.3333333;
  border-radius: 6px
}

#add_participants_model.form-group-lg select#add_participants_model.form-control {
  height: 46px;
  line-height: 46px
}

#add_participants_model.form-group-lg select[multiple]#add_participants_model.form-control,
#add_participants_model.form-group-lg textarea#add_participants_model.form-control {
  height: auto
}

#add_participants_model.form-group-lg #add_participants_model.form-control-static {
  height: 46px;
  min-height: 38px;
  padding: 11px 16px;
  font-size: 18px;
  line-height: 1.3333333
}

.has-feedback {
  position: relative
}

.has-feedback #add_participants_model.form-control {
  padding-right: 42.5px
}

#add_participants_model.form-control-feedback {
  position: absolute;
  top: 0;
  right: 0;
  z-index: 2;
  display: block;
  width: 34px;
  height: 34px;
  line-height: 34px;
  text-align: center;
  pointer-events: none
}

#add_participants_model.form-group-lg #add_participants_model.form-control+#add_participants_model.form-control-feedback,
#add_participants_model.input-group-lg+#add_participants_model.form-control-feedback,
#add_participants_model.input-lg+#add_participants_model.form-control-feedback {
  width: 46px;
  height: 46px;
  line-height: 46px
}

#add_participants_model.form-group-sm #add_participants_model.form-control+#add_participants_model.form-control-feedback,
#add_participants_model.input-group-sm+#add_participants_model.form-control-feedback,
#add_participants_model.input-sm+#add_participants_model.form-control-feedback {
  width: 30px;
  height: 30px;
  line-height: 30px
}

.has-success .checkbox,
.has-success .checkbox-inline,
.has-success .control-label,
.has-success .help-block,
.has-success .radio,
.has-success .radio-inline,
.has-success.checkbox label,
.has-success.checkbox-inline label,
.has-success.radio label,
.has-success.radio-inline label {
  color: #3c763d
}

.has-success #add_participants_model.form-control {
  border-color: #3c763d;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075)
}

.has-success #add_participants_model.form-control:focus {
  border-color: #2b542c;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #67b168;
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #67b168
}

.has-success #add_participants_model.input-group-addon {
  color: #3c763d;
  background-color: #dff0d8;
  border-color: #3c763d
}

.has-success #add_participants_model.form-control-feedback {
  color: #3c763d
}

.has-warning .checkbox,
.has-warning .checkbox-inline,
.has-warning .control-label,
.has-warning .help-block,
.has-warning .radio,
.has-warning .radio-inline,
.has-warning.checkbox label,
.has-warning.checkbox-inline label,
.has-warning.radio label,
.has-warning.radio-inline label {
  color: #8a6d3b
}

.has-warning #add_participants_model.form-control {
  border-color: #8a6d3b;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075)
}

.has-warning #add_participants_model.form-control:focus {
  border-color: #66512c;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #c0a16b;
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #c0a16b
}

.has-warning #add_participants_model.input-group-addon {
  color: #8a6d3b;
  background-color: #fcf8e3;
  border-color: #8a6d3b
}

.has-warning #add_participants_model.form-control-feedback {
  color: #8a6d3b
}

.has-error .checkbox,
.has-error .checkbox-inline,
.has-error .control-label,
.has-error .help-block,
.has-error .radio,
.has-error .radio-inline,
.has-error.checkbox label,
.has-error.checkbox-inline label,
.has-error.radio label,
.has-error.radio-inline label {
  color: #a94442
}

.has-error #add_participants_model.form-control {
  border-color: #a94442;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075)
}

.has-error #add_participants_model.form-control:focus {
  border-color: #843534;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #ce8483;
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #ce8483
}

.has-error #add_participants_model.input-group-addon {
  color: #a94442;
  background-color: #f2dede;
  border-color: #a94442
}

.has-error #add_participants_model.form-control-feedback {
  color: #a94442
}

.has-feedback label~#add_participants_model.form-control-feedback {
  top: 25px
}

.has-feedback label.sr-only~#add_participants_model.form-control-feedback {
  top: 0
}

.help-block {
  display: block;
  margin-top: 5px;
  margin-bottom: 10px;
  color: #737373
}

@media (min-width:768px) {
  #add_participants_model.form-inline #add_participants_model.form-group {
    display: inline-block;
    margin-bottom: 0;
    vertical-align: middle
  }
  #add_participants_model.form-inline #add_participants_model.form-control {
    display: inline-block;
    width: auto;
    vertical-align: middle
  }
  #add_participants_model.form-inline #add_participants_model.form-control-static {
    display: inline-block
  }
  #add_participants_model.form-inline #add_participants_model.input-group {
    display: inline-table;
    vertical-align: middle
  }
  #add_participants_model.form-inline #add_participants_model.input-group #add_participants_model.form-control,
  #add_participants_model.form-inline #add_participants_model.input-group #add_participants_model.input-group-addon,
  #add_participants_model.form-inline #add_participants_model.input-group #add_participants_model.input-group-btn {
    width: auto
  }
  #add_participants_model.form-inline #add_participants_model.input-group>#add_participants_model.form-control {
    width: 100%
  }
  #add_participants_model.form-inline .control-label {
    margin-bottom: 0;
    vertical-align: middle
  }
  #add_participants_model.form-inline .checkbox,
  #add_participants_model.form-inline .radio {
    display: inline-block;
    margin-top: 0;
    margin-bottom: 0;
    vertical-align: middle
  }
  #add_participants_model.form-inline .checkbox label,
  #add_participants_model.form-inline .radio label {
    padding-left: 0
  }
  #add_participants_model.form-inline .checkbox input[type=checkbox],
  #add_participants_model.form-inline .radio input[type=radio] {
    position: relative;
    margin-left: 0
  }
  #add_participants_model.form-inline .has-feedback #add_participants_model.form-control-feedback {
    top: 0
  }
}

#add_participants_model.form-horizontal .checkbox,
#add_participants_model.form-horizontal .checkbox-inline,
#add_participants_model.form-horizontal .radio,
#add_participants_model.form-horizontal .radio-inline {
  padding-top: 7px;
  margin-top: 0;
  margin-bottom: 0
}

#add_participants_model.form-horizontal .checkbox,
#add_participants_model.form-horizontal .radio {
  min-height: 27px
}

#add_participants_model.form-horizontal #add_participants_model.form-group {
  margin-right: -15px;
  margin-left: -15px
}

@media (min-width:768px) {
  #add_participants_model.form-horizontal .control-label {
    padding-top: 7px;
    margin-bottom: 0;
    text-align: right
  }
}

#add_participants_model.form-horizontal .has-feedback #add_participants_model.form-control-feedback {
  right: 15px
}

@media (min-width:768px) {
  #add_participants_model.form-horizontal #add_participants_model.form-group-lg .control-label {
    padding-top: 11px;
    font-size: 18px
  }
}

@media (min-width:768px) {
  #add_participants_model.form-horizontal #add_participants_model.form-group-sm .control-label {
    padding-top: 6px;
    font-size: 12px
  }
}

#add_participants_model.btn {
  display: inline-block;
  padding: 6px 12px;
  margin-bottom: 0;
  font-size: 14px;
  font-weight: 400;
  line-height: 1.42857143;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  -ms-touch-action: manipulation;
  touch-action: manipulation;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  background-image: none;
  border: 1px solid transparent;
  border-radius: 4px
}

#add_participants_model.btn.active.focus,
#add_participants_model.btn.active:focus,
#add_participants_model.btn.focus,
#add_participants_model.btn:active.focus,
#add_participants_model.btn:active:focus,
#add_participants_model.btn:focus {
  outline: 5px auto -webkit-focus-ring-color;
  outline-offset: -2px
}

#add_participants_model.btn.focus,
#add_participants_model.btn:focus,
#add_participants_model.btn:hover {
  color: #333;
  text-decoration: none
}

#add_participants_model.btn.active,
#add_participants_model.btn:active {
  background-image: none;
  outline: 0;
  -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
  box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125)
}

#add_participants_model.btn.disabled,
#add_participants_model.btn[disabled],
fieldset[disabled] #add_participants_model.btn {
  cursor: not-allowed;
  filter: alpha(opacity=65);
  -webkit-box-shadow: none;
  box-shadow: none;
  opacity: .65
}

a#add_participants_model.btn.disabled,
fieldset[disabled] a#add_participants_model.btn {
  pointer-events: none
}

#add_participants_model.btn-default {
  color: #333;
  background-color: #fff;
  border-color: #ccc
}

#add_participants_model.btn-default.focus,
#add_participants_model.btn-default:focus {
  color: #333;
  background-color: #e6e6e6;
  border-color: #8c8c8c
}

#add_participants_model.btn-default:hover {
  color: #333;
  background-color: #e6e6e6;
  border-color: #adadad
}

#add_participants_model.btn-default.active,
#add_participants_model.btn-default:active,
.open>.dropdown-toggle#add_participants_model.btn-default {
  color: #333;
  background-color: #e6e6e6;
  border-color: #adadad
}

#add_participants_model.btn-default.active.focus,
#add_participants_model.btn-default.active:focus,
#add_participants_model.btn-default.active:hover,
#add_participants_model.btn-default:active.focus,
#add_participants_model.btn-default:active:focus,
#add_participants_model.btn-default:active:hover,
.open>.dropdown-toggle#add_participants_model.btn-default.focus,
.open>.dropdown-toggle#add_participants_model.btn-default:focus,
.open>.dropdown-toggle#add_participants_model.btn-default:hover {
  color: #333;
  background-color: #d4d4d4;
  border-color: #8c8c8c
}

#add_participants_model.btn-default.active,
#add_participants_model.btn-default:active,
.open>.dropdown-toggle#add_participants_model.btn-default {
  background-image: none
}

#add_participants_model.btn-default.disabled.focus,
#add_participants_model.btn-default.disabled:focus,
#add_participants_model.btn-default.disabled:hover,
#add_participants_model.btn-default[disabled].focus,
#add_participants_model.btn-default[disabled]:focus,
#add_participants_model.btn-default[disabled]:hover,
fieldset[disabled] #add_participants_model.btn-default.focus,
fieldset[disabled] #add_participants_model.btn-default:focus,
fieldset[disabled] #add_participants_model.btn-default:hover {
  background-color: #fff;
  border-color: #ccc
}

#add_participants_model.btn-default#add_participants_model.btn-primary {
  color: #fff;
  background-color: #337ab7;
  border-color: #2e6da4
}

#add_participants_model.btn-primary.focus,
#add_participants_model.btn-primary:focus {
  color: #fff;
  background-color: #286090;
  border-color: #122b40
}

#add_participants_model.btn-primary:hover {
  color: #fff;
  background-color: #286090;
  border-color: #204d74
}

#add_participants_model.btn-primary.active,
#add_participants_model.btn-primary:active,
.open>.dropdown-toggle#add_participants_model.btn-primary {
  color: #fff;
  background-color: #286090;
  border-color: #204d74
}

#add_participants_model.btn-primary.active.focus,
#add_participants_model.btn-primary.active:focus,
#add_participants_model.btn-primary.active:hover,
#add_participants_model.btn-primary:active.focus,
#add_participants_model.btn-primary:active:focus,
#add_participants_model.btn-primary:active:hover,
.open>.dropdown-toggle#add_participants_model.btn-primary.focus,
.open>.dropdown-toggle#add_participants_model.btn-primary:focus,
.open>.dropdown-toggle#add_participants_model.btn-primary:hover {
  color: #fff;
  background-color: #204d74;
  border-color: #122b40
}

#add_participants_model.btn-primary.active,
#add_participants_model.btn-primary:active,
.open>.dropdown-toggle#add_participants_model.btn-primary {
  background-image: none
}

#add_participants_model.btn-primary.disabled.focus,
#add_participants_model.btn-primary.disabled:focus,
#add_participants_model.btn-primary.disabled:hover,
#add_participants_model.btn-primary[disabled].focus,
#add_participants_model.btn-primary[disabled]:focus,
#add_participants_model.btn-primary[disabled]:hover,
fieldset[disabled] #add_participants_model.btn-primary.focus,
fieldset[disabled] #add_participants_model.btn-primary:focus,
fieldset[disabled] #add_participants_model.btn-primary:hover {
  background-color: #337ab7;
  border-color: #2e6da4
}

#add_participants_model.btn-primary .badge {
  color: #337ab7;
  background-color: #fff
}

#add_participants_model.btn-success {
  color: #fff;
  background-color: #5cb85c;
  border-color: #4cae4c
}

#add_participants_model.btn-success.focus,
#add_participants_model.btn-success:focus {
  color: #fff;
  background-color: #449d44;
  border-color: #255625
}

#add_participants_model.btn-success:hover {
  color: #fff;
  background-color: #449d44;
  border-color: #398439
}

#add_participants_model.btn-success.active,
#add_participants_model.btn-success:active,
.open>.dropdown-toggle#add_participants_model.btn-success {
  color: #fff;
  background-color: #449d44;
  border-color: #398439
}

#add_participants_model.btn-success.active.focus,
#add_participants_model.btn-success.active:focus,
#add_participants_model.btn-success.active:hover,
#add_participants_model.btn-success:active.focus,
#add_participants_model.btn-success:active:focus,
#add_participants_model.btn-success:active:hover,
.open>.dropdown-toggle#add_participants_model.btn-success.focus,
.open>.dropdown-toggle#add_participants_model.btn-success:focus,
.open>.dropdown-toggle#add_participants_model.btn-success:hover {
  color: #fff;
  background-color: #398439;
  border-color: #255625
}

#add_participants_model.btn-success.active,
#add_participants_model.btn-success:active,
.open>.dropdown-toggle#add_participants_model.btn-success {
  background-image: none
}

#add_participants_model.btn-success.disabled.focus,
#add_participants_model.btn-success.disabled:focus,
#add_participants_model.btn-success.disabled:hover,
#add_participants_model.btn-success[disabled].focus,
#add_participants_model.btn-success[disabled]:focus,
#add_participants_model.btn-success[disabled]:hover,
fieldset[disabled] #add_participants_model.btn-success.focus,
fieldset[disabled] #add_participants_model.btn-success:focus,
fieldset[disabled] #add_participants_model.btn-success:hover {
  background-color: #5cb85c;
  border-color: #4cae4c
}

#add_participants_model.btn-success .badge {
  color: #5cb85c;
  background-color: #fff
}

#add_participants_model.btn-info {
  color: #fff;
  background-color: #5bc0de;
  border-color: #46b8da
}

#add_participants_model.btn-info.focus,
#add_participants_model.btn-info:focus {
  color: #fff;
  background-color: #31b0d5;
  border-color: #1b6d85
}

#add_participants_model.btn-info:hover {
  color: #fff;
  background-color: #31b0d5;
  border-color: #269abc
}

#add_participants_model.btn-info.active,
#add_participants_model.btn-info:active,
.open>.dropdown-toggle#add_participants_model.btn-info {
  color: #fff;
  background-color: #31b0d5;
  border-color: #269abc
}

#add_participants_model.btn-info.active.focus,
#add_participants_model.btn-info.active:focus,
#add_participants_model.btn-info.active:hover,
#add_participants_model.btn-info:active.focus,
#add_participants_model.btn-info:active:focus,
#add_participants_model.btn-info:active:hover,
.open>.dropdown-toggle#add_participants_model.btn-info.focus,
.open>.dropdown-toggle#add_participants_model.btn-info:focus,
.open>.dropdown-toggle#add_participants_model.btn-info:hover {
  color: #fff;
  background-color: #269abc;
  border-color: #1b6d85
}

#add_participants_model.btn-info.active,
#add_participants_model.btn-info:active,
.open>.dropdown-toggle#add_participants_model.btn-info {
  background-image: none
}

#add_participants_model.btn-info.disabled.focus,
#add_participants_model.btn-info.disabled:focus,
#add_participants_model.btn-info.disabled:hover,
#add_participants_model.btn-info[disabled].focus,
#add_participants_model.btn-info[disabled]:focus,
#add_participants_model.btn-info[disabled]:hover,
fieldset[disabled] #add_participants_model.btn-info.focus,
fieldset[disabled] #add_participants_model.btn-info:focus,
fieldset[disabled] #add_participants_model.btn-info:hover {
  background-color: #5bc0de;
  border-color: #46b8da
}

#add_participants_model.btn-info .badge {
  color: #5bc0de;
  background-color: #fff
}

#add_participants_model.btn-warning {
  color: #fff;
  background-color: #f0ad4e;
  border-color: #eea236
}

#add_participants_model.btn-warning.focus,
#add_participants_model.btn-warning:focus {
  color: #fff;
  background-color: #ec971f;
  border-color: #985f0d
}

#add_participants_model.btn-warning:hover {
  color: #fff;
  background-color: #ec971f;
  border-color: #d58512
}

#add_participants_model.btn-warning.active,
#add_participants_model.btn-warning:active,
.open>.dropdown-toggle#add_participants_model.btn-warning {
  color: #fff;
  background-color: #ec971f;
  border-color: #d58512
}

#add_participants_model.btn-warning.active.focus,
#add_participants_model.btn-warning.active:focus,
#add_participants_model.btn-warning.active:hover,
#add_participants_model.btn-warning:active.focus,
#add_participants_model.btn-warning:active:focus,
#add_participants_model.btn-warning:active:hover,
.open>.dropdown-toggle#add_participants_model.btn-warning.focus,
.open>.dropdown-toggle#add_participants_model.btn-warning:focus,
.open>.dropdown-toggle#add_participants_model.btn-warning:hover {
  color: #fff;
  background-color: #d58512;
  border-color: #985f0d
}

#add_participants_model.btn-warning.active,
#add_participants_model.btn-warning:active,
.open>.dropdown-toggle#add_participants_model.btn-warning {
  background-image: none
}

#add_participants_model.btn-warning.disabled.focus,
#add_participants_model.btn-warning.disabled:focus,
#add_participants_model.btn-warning.disabled:hover,
#add_participants_model.btn-warning[disabled].focus,
#add_participants_model.btn-warning[disabled]:focus,
#add_participants_model.btn-warning[disabled]:hover,
fieldset[disabled] #add_participants_model.btn-warning.focus,
fieldset[disabled] #add_participants_model.btn-warning:focus,
fieldset[disabled] #add_participants_model.btn-warning:hover {
  background-color: #f0ad4e;
  border-color: #eea236
}

#add_participants_model.btn-warning .badge {
  color: #f0ad4e;
  background-color: #fff
}

#add_participants_model.btn-danger {
  color: #fff;
  background-color: #d9534f;
  border-color: #d43f3a
}

#add_participants_model.btn-danger.focus,
#add_participants_model.btn-danger:focus {
  color: #fff;
  background-color: #c9302c;
  border-color: #761c19
}

#add_participants_model.btn-danger:hover {
  color: #fff;
  background-color: #c9302c;
  border-color: #ac2925
}

#add_participants_model.btn-danger.active,
#add_participants_model.btn-danger:active,
.open>.dropdown-toggle#add_participants_model.btn-danger {
  color: #fff;
  background-color: #c9302c;
  border-color: #ac2925
}

#add_participants_model.btn-danger.active.focus,
#add_participants_model.btn-danger.active:focus,
#add_participants_model.btn-danger.active:hover,
#add_participants_model.btn-danger:active.focus,
#add_participants_model.btn-danger:active:focus,
#add_participants_model.btn-danger:active:hover,
.open>.dropdown-toggle#add_participants_model.btn-danger.focus,
.open>.dropdown-toggle#add_participants_model.btn-danger:focus,
.open>.dropdown-toggle#add_participants_model.btn-danger:hover {
  color: #fff;
  background-color: #ac2925;
  border-color: #761c19
}

#add_participants_model.btn-danger.active,
#add_participants_model.btn-danger:active,
.open>.dropdown-toggle#add_participants_model.btn-danger {
  background-image: none
}

#add_participants_model.btn-danger.disabled.focus,
#add_participants_model.btn-danger.disabled:focus,
#add_participants_model.btn-danger.disabled:hover,
#add_participants_model.btn-danger[disabled].focus,
#add_participants_model.btn-danger[disabled]:focus,
#add_participants_model.btn-danger[disabled]:hover,
fieldset[disabled] #add_participants_model.btn-danger.focus,
fieldset[disabled] #add_participants_model.btn-danger:focus,
fieldset[disabled] #add_participants_model.btn-danger:hover {
  background-color: #d9534f;
  border-color: #d43f3a
}

#add_participants_model.btn-danger#add_participants_model.btn-link {
  font-weight: 400;
  color: #337ab7;
  border-radius: 0
}

#add_participants_model.btn-link,
#add_participants_model.btn-link.active,
#add_participants_model.btn-link:active,
#add_participants_model.btn-link[disabled],
fieldset[disabled] #add_participants_model.btn-link {
  background-color: transparent;
  -webkit-box-shadow: none;
  box-shadow: none
}

#add_participants_model.btn-link,
#add_participants_model.btn-link:active,
#add_participants_model.btn-link:focus,
#add_participants_model.btn-link:hover {
  border-color: transparent
}

#add_participants_model.btn-link:focus,
#add_participants_model.btn-link:hover {
  color: #23527c;
  text-decoration: underline;
  background-color: transparent
}

#add_participants_model.btn-link[disabled]:focus,
#add_participants_model.btn-link[disabled]:hover,
fieldset[disabled] #add_participants_model.btn-link:focus,
fieldset[disabled] #add_participants_model.btn-link:hover {
  color: #777;
  text-decoration: none
}

#add_participants_model.btn-group-lg>#add_participants_model.btn,
#add_participants_model.btn-lg {
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.3333333;
  border-radius: 6px
}

#add_participants_model.btn-group-sm>#add_participants_model.btn,
#add_participants_model.btn-sm {
  padding: 5px 10px;
  font-size: 12px;
  line-height: 1.5;
  border-radius: 3px
}

#add_participants_model.btn-group-xs>#add_participants_model.btn,
#add_participants_model.btn-xs {
  padding: 1px 5px;
  font-size: 12px;
  line-height: 1.5;
  border-radius: 3px
}

#add_participants_model.btn-block {
  display: block;
  width: 100%
}

#add_participants_model.btn-block+#add_participants_model.btn-block {
  margin-top: 5px
}

input[type=button]#add_participants_model.btn-block,
input[type=reset]#add_participants_model.btn-block,
input[type=submit]#add_participants_model.btn-block {
  width: 100%
}

.fade {
  opacity: 0;
  -webkit-transition: opacity .15s linear;
  -o-transition: opacity .15s linear;
  transition: opacity .15s linear
}

.fade.in {
  opacity: 1
}

.collapse {
  display: none
}

.collapse.in {
  display: block
}

tr.collapse.in {
  display: table-row
}

tbody.collapse.in {
  display: table-row-group
}

.collapsing {
  position: relative;
  height: 0;
  overflow: hidden;
  -webkit-transition-timing-function: ease;
  -o-transition-timing-function: ease;
  transition-timing-function: ease;
  -webkit-transition-duration: .35s;
  -o-transition-duration: .35s;
  transition-duration: .35s;
  -webkit-transition-property: height, visibility;
  -o-transition-property: height, visibility;
  transition-property: height, visibility
}

.caret {
  display: inline-block;
  width: 0;
  height: 0;
  margin-left: 2px;
  vertical-align: middle;
  border-top: 4px dashed;
  border-top: 4px solid\9;
  border-right: 4px solid transparent;
  border-left: 4px solid transparent
}

.dropdown,
.dropup {
  position: relative
}

.dropdown-toggle:focus {
  outline: 0
}

.dropdown-menu {
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 1000;
  display: none;
  float: left;
  min-width: 160px;
  padding: 5px 0;
  margin: 2px 0 0;
  font-size: 14px;
  text-align: left;
  list-style: none;
  background-color: #fff;
  -webkit-background-clip: padding-box;
  background-clip: padding-box;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, .15);
  border-radius: 4px;
  -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
  box-shadow: 0 6px 12px rgba(0, 0, 0, .175)
}

.dropdown-menu.pull-right {
  right: 0;
  left: auto
}

.dropdown-menu .divider {
  height: 1px;
  margin: 9px 0;
  overflow: hidden;
  background-color: #e5e5e5
}

.dropdown-menu>li>a {
  display: block;
  padding: 3px 20px;
  clear: both;
  font-weight: 400;
  line-height: 1.42857143;
  color: #333;
  white-space: nowrap
}

.dropdown-menu>li>a:focus,
.dropdown-menu>li>a:hover {
  color: #262626;
  text-decoration: none;
  background-color: #f5f5f5
}

.dropdown-menu>.active>a,
.dropdown-menu>.active>a:focus,
.dropdown-menu>.active>a:hover {
  color: #fff;
  text-decoration: none;
  background-color: #337ab7;
  outline: 0
}

.dropdown-menu>.disabled>a,
.dropdown-menu>.disabled>a:focus,
.dropdown-menu>.disabled>a:hover {
  color: #777
}

.dropdown-menu>.disabled>a:focus,
.dropdown-menu>.disabled>a:hover {
  text-decoration: none;
  cursor: not-allowed;
  background-color: transparent;
  background-image: none;
  filter: progid:DXImageTransform.Microsoft.gradient(enabled=false)
}

.open>.dropdown-menu {
  display: block
}

.open>a {
  outline: 0
}

.dropdown-menu-right {
  right: 0;
  left: auto
}

.dropdown-menu-left {
  right: auto;
  left: 0
}

.dropdown-header {
  display: block;
  padding: 3px 20px;
  font-size: 12px;
  line-height: 1.42857143;
  color: #777;
  white-space: nowrap
}

.dropdown-backdrop {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 990
}

.pull-right>.dropdown-menu {
  right: 0;
  left: auto
}

.dropup .caret,
#add_participants_model.navbar-fixed-bottom .dropdown .caret {
  content: "";
  border-top: 0;
  border-bottom: 4px dashed;
  border-bottom: 4px solid\9
}

.dropup .dropdown-menu,
#add_participants_model.navbar-fixed-bottom .dropdown .dropdown-menu {
  top: auto;
  bottom: 100%;
  margin-bottom: 2px
}

@media (min-width:768px) {
  #add_participants_model.navbar-right .dropdown-menu {
    right: 0;
    left: auto
  }
  #add_participants_model.navbar-right .dropdown-menu-left {
    right: auto;
    left: 0
  }
}

#add_participants_model.btn-group,
#add_participants_model.btn-group-vertical {
  position: relative;
  display: inline-block;
  vertical-align: middle
}

#add_participants_model.btn-group-vertical>#add_participants_model.btn,
#add_participants_model.btn-group>#add_participants_model.btn {
  position: relative;
  float: left
}

#add_participants_model.btn-group-vertical>#add_participants_model.btn.active,
#add_participants_model.btn-group-vertical>#add_participants_model.btn:active,
#add_participants_model.btn-group-vertical>#add_participants_model.btn:focus,
#add_participants_model.btn-group-vertical>#add_participants_model.btn:hover,
#add_participants_model.btn-group>#add_participants_model.btn.active,
#add_participants_model.btn-group>#add_participants_model.btn:active,
#add_participants_model.btn-group>#add_participants_model.btn:focus,
#add_participants_model.btn-group>#add_participants_model.btn:hover {
  z-index: 2
}

#add_participants_model.btn-group #add_participants_model.btn+#add_participants_model.btn,
#add_participants_model.btn-group #add_participants_model.btn+#add_participants_model.btn-group,
#add_participants_model.btn-group #add_participants_model.btn-group+#add_participants_model.btn,
#add_participants_model.btn-group #add_participants_model.btn-group+#add_participants_model.btn-group {
  margin-left: -1px
}

#add_participants_model.btn-toolbar {
  margin-left: -5px
}

#add_participants_model.btn-toolbar #add_participants_model.btn,
#add_participants_model.btn-toolbar #add_participants_model.btn-group,
#add_participants_model.btn-toolbar #add_participants_model.input-group {
  float: left
}

#add_participants_model.btn-toolbar>#add_participants_model.btn,
#add_participants_model.btn-toolbar>#add_participants_model.btn-group,
#add_participants_model.btn-toolbar>#add_participants_model.input-group {
  margin-left: 5px
}

#add_participants_model.btn-group>#add_participants_model.btn:not(:first-child):not(:last-child):not(.dropdown-toggle) {
  border-radius: 0
}

#add_participants_model.btn-group>#add_participants_model.btn:first-child {
  margin-left: 0
}

#add_participants_model.btn-group>#add_participants_model.btn:first-child:not(:last-child):not(.dropdown-toggle) {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0
}

#add_participants_model.btn-group>#add_participants_model.btn:last-child:not(:first-child),
#add_participants_model.btn-group>.dropdown-toggle:not(:first-child) {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0
}

#add_participants_model.btn-group>#add_participants_model.btn-group {
  float: left
}

#add_participants_model.btn-group>#add_participants_model.btn-group:not(:first-child):not(:last-child)>#add_participants_model.btn {
  border-radius: 0
}

#add_participants_model.btn-group>#add_participants_model.btn-group:first-child:not(:last-child)>#add_participants_model.btn:last-child,
#add_participants_model.btn-group>#add_participants_model.btn-group:first-child:not(:last-child)>.dropdown-toggle {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0
}

#add_participants_model.btn-group>#add_participants_model.btn-group:last-child:not(:first-child)>#add_participants_model.btn:first-child {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0
}

#add_participants_model.btn-group .dropdown-toggle:active,
#add_participants_model.btn-group.open .dropdown-toggle {
  outline: 0
}

#add_participants_model.btn-group>#add_participants_model.btn+.dropdown-toggle {
  padding-right: 8px;
  padding-left: 8px
}

#add_participants_model.btn-group>#add_participants_model.btn-lg+.dropdown-toggle {
  padding-right: 12px;
  padding-left: 12px
}

#add_participants_model.btn-group.open .dropdown-toggle {
  -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
  box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125)
}

#add_participants_model.btn-group.open .dropdown-toggle#add_participants_model.btn-link {
  -webkit-box-shadow: none;
  box-shadow: none
}

#add_participants_model.btn .caret {
  margin-left: 0
}

#add_participants_model.btn-lg .caret {
  border-width: 5px 5px 0;
  border-bottom-width: 0
}

.dropup #add_participants_model.btn-lg .caret {
  border-width: 0 5px 5px
}

#add_participants_model.btn-group-vertical>#add_participants_model.btn,
#add_participants_model.btn-group-vertical>#add_participants_model.btn-group,
#add_participants_model.btn-group-vertical>#add_participants_model.btn-group>#add_participants_model.btn {
  display: block;
  float: none;
  width: 100%;
  max-width: 100%
}

#add_participants_model.btn-group-vertical>#add_participants_model.btn-group>#add_participants_model.btn {
  float: none
}

#add_participants_model.btn-group-vertical>#add_participants_model.btn+#add_participants_model.btn,
#add_participants_model.btn-group-vertical>#add_participants_model.btn+#add_participants_model.btn-group,
#add_participants_model.btn-group-vertical>#add_participants_model.btn-group+#add_participants_model.btn,
#add_participants_model.btn-group-vertical>#add_participants_model.btn-group+#add_participants_model.btn-group {
  margin-top: -1px;
  margin-left: 0
}

#add_participants_model.btn-group-vertical>#add_participants_model.btn:not(:first-child):not(:last-child) {
  border-radius: 0
}

#add_participants_model.btn-group-vertical>#add_participants_model.btn:first-child:not(:last-child) {
  border-top-left-radius: 4px;
  border-top-right-radius: 4px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0
}

#add_participants_model.btn-group-vertical>#add_participants_model.btn:last-child:not(:first-child) {
  border-top-left-radius: 0;
  border-top-right-radius: 0;
  border-bottom-right-radius: 4px;
  border-bottom-left-radius: 4px
}

#add_participants_model.btn-group-vertical>#add_participants_model.btn-group:not(:first-child):not(:last-child)>#add_participants_model.btn {
  border-radius: 0
}

#add_participants_model.btn-group-vertical>#add_participants_model.btn-group:first-child:not(:last-child)>#add_participants_model.btn:last-child,
#add_participants_model.btn-group-vertical>#add_participants_model.btn-group:first-child:not(:last-child)>.dropdown-toggle {
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0
}

#add_participants_model.btn-group-vertical>#add_participants_model.btn-group:last-child:not(:first-child)>#add_participants_model.btn:first-child {
  border-top-left-radius: 0;
  border-top-right-radius: 0
}

#add_participants_model.btn-group-justified {
  display: table;
  width: 100%;
  table-layout: fixed;
  border-collapse: separate
}

#add_participants_model.btn-group-justified>#add_participants_model.btn,
#add_participants_model.btn-group-justified>#add_participants_model.btn-group {
  display: table-cell;
  float: none;
  width: 1%
}

#add_participants_model.btn-group-justified>#add_participants_model.btn-group #add_participants_model.btn {
  width: 100%
}

#add_participants_model.btn-group-justified>#add_participants_model.btn-group .dropdown-menu {
  left: auto
}

[data-toggle=buttons]>#add_participants_model.btn input[type=checkbox],
[data-toggle=buttons]>#add_participants_model.btn input[type=radio],
[data-toggle=buttons]>#add_participants_model.btn-group>#add_participants_model.btn input[type=checkbox],
[data-toggle=buttons]>#add_participants_model.btn-group>#add_participants_model.btn input[type=radio] {
  position: absolute;
  clip: rect(0, 0, 0, 0);
  pointer-events: none
}

#add_participants_model.input-group {
  position: relative;
  display: table;
  border-collapse: separate
}

#add_participants_model.input-group[class*=col-] {
  float: none;
  padding-right: 0;
  padding-left: 0
}

#add_participants_model.input-group #add_participants_model.form-control {
  position: relative;
  z-index: 2;
  float: left;
  width: 100%;
  margin-bottom: 0
}

#add_participants_model.input-group #add_participants_model.form-control:focus {
  z-index: 3
}

#add_participants_model.input-group-lg>#add_participants_model.form-control,
#add_participants_model.input-group-lg>#add_participants_model.input-group-addon,
#add_participants_model.input-group-lg>#add_participants_model.input-group-btn>#add_participants_model.btn {
  height: 46px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.3333333;
  border-radius: 6px
}

select#add_participants_model.input-group-lg>#add_participants_model.form-control,
select#add_participants_model.input-group-lg>#add_participants_model.input-group-addon,
select#add_participants_model.input-group-lg>#add_participants_model.input-group-btn>#add_participants_model.btn {
  height: 46px;
  line-height: 46px
}

select[multiple]#add_participants_model.input-group-lg>#add_participants_model.form-control,
select[multiple]#add_participants_model.input-group-lg>#add_participants_model.input-group-addon,
select[multiple]#add_participants_model.input-group-lg>#add_participants_model.input-group-btn>#add_participants_model.btn,
textarea#add_participants_model.input-group-lg>#add_participants_model.form-control,
textarea#add_participants_model.input-group-lg>#add_participants_model.input-group-addon,
textarea#add_participants_model.input-group-lg>#add_participants_model.input-group-btn>#add_participants_model.btn {
  height: auto
}

#add_participants_model.input-group-sm>#add_participants_model.form-control,
#add_participants_model.input-group-sm>#add_participants_model.input-group-addon,
#add_participants_model.input-group-sm>#add_participants_model.input-group-btn>#add_participants_model.btn {
  height: 30px;
  padding: 5px 10px;
  font-size: 12px;
  line-height: 1.5;
  border-radius: 3px
}

select#add_participants_model.input-group-sm>#add_participants_model.form-control,
select#add_participants_model.input-group-sm>#add_participants_model.input-group-addon,
select#add_participants_model.input-group-sm>#add_participants_model.input-group-btn>#add_participants_model.btn {
  height: 30px;
  line-height: 30px
}

select[multiple]#add_participants_model.input-group-sm>#add_participants_model.form-control,
select[multiple]#add_participants_model.input-group-sm>#add_participants_model.input-group-addon,
select[multiple]#add_participants_model.input-group-sm>#add_participants_model.input-group-btn>#add_participants_model.btn,
textarea#add_participants_model.input-group-sm>#add_participants_model.form-control,
textarea#add_participants_model.input-group-sm>#add_participants_model.input-group-addon,
textarea#add_participants_model.input-group-sm>#add_participants_model.input-group-btn>#add_participants_model.btn {
  height: auto
}

#add_participants_model.input-group #add_participants_model.form-control,
#add_participants_model.input-group-addon,
#add_participants_model.input-group-btn {
  display: table-cell
}

#add_participants_model.input-group #add_participants_model.form-control:not(:first-child):not(:last-child),
#add_participants_model.input-group-addon:not(:first-child):not(:last-child),
#add_participants_model.input-group-btn:not(:first-child):not(:last-child) {
  border-radius: 0
}

#add_participants_model.input-group-addon,
#add_participants_model.input-group-btn {
  width: 1%;
  white-space: nowrap;
  vertical-align: middle
}

#add_participants_model.input-group-addon {
  padding: 6px 12px;
  font-size: 14px;
  font-weight: 400;
  line-height: 1;
  color: #555;
  text-align: center;
  background-color: #eee;
  border: 1px solid #ccc;
  border-radius: 4px
}

#add_participants_model.input-group-addon#add_participants_model.input-sm {
  padding: 5px 10px;
  font-size: 12px;
  border-radius: 3px
}

#add_participants_model.input-group-addon#add_participants_model.input-lg {
  padding: 10px 16px;
  font-size: 18px;
  border-radius: 6px
}

#add_participants_model.input-group-addon input[type=checkbox],
#add_participants_model.input-group-addon input[type=radio] {
  margin-top: 0
}

#add_participants_model.input-group #add_participants_model.form-control:first-child,
#add_participants_model.input-group-addon:first-child,
#add_participants_model.input-group-btn:first-child>#add_participants_model.btn,
#add_participants_model.input-group-btn:first-child>#add_participants_model.btn-group>#add_participants_model.btn,
#add_participants_model.input-group-btn:first-child>.dropdown-toggle,
#add_participants_model.input-group-btn:last-child>#add_participants_model.btn-group:not(:last-child)>#add_participants_model.btn,
#add_participants_model.input-group-btn:last-child>#add_participants_model.btn:not(:last-child):not(.dropdown-toggle) {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0
}

#add_participants_model.input-group-addon:first-child {
  border-right: 0
}

#add_participants_model.input-group #add_participants_model.form-control:last-child,
#add_participants_model.input-group-addon:last-child,
#add_participants_model.input-group-btn:first-child>#add_participants_model.btn-group:not(:first-child)>#add_participants_model.btn,
#add_participants_model.input-group-btn:first-child>#add_participants_model.btn:not(:first-child),
#add_participants_model.input-group-btn:last-child>#add_participants_model.btn,
#add_participants_model.input-group-btn:last-child>#add_participants_model.btn-group>#add_participants_model.btn,
#add_participants_model.input-group-btn:last-child>.dropdown-toggle {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0
}

#add_participants_model.input-group-addon:last-child {
  border-left: 0
}

#add_participants_model.input-group-btn {
  position: relative;
  font-size: 0;
  white-space: nowrap
}

#add_participants_model.input-group-btn>#add_participants_model.btn {
  position: relative
}

#add_participants_model.input-group-btn>#add_participants_model.btn+#add_participants_model.btn {
  margin-left: -1px
}

#add_participants_model.input-group-btn>#add_participants_model.btn:active,
#add_participants_model.input-group-btn>#add_participants_model.btn:focus,
#add_participants_model.input-group-btn>#add_participants_model.btn:hover {
  z-index: 2
}

#add_participants_model.input-group-btn:first-child>#add_participants_model.btn,
#add_participants_model.input-group-btn:first-child>#add_participants_model.btn-group {
  margin-right: -1px
}

#add_participants_model.input-group-btn:last-child>#add_participants_model.btn,
#add_participants_model.input-group-btn:last-child>#add_participants_model.btn-group {
  z-index: 2;
  margin-left: -1px
}

#add_participants_model.nav {
  padding-left: 0;
  margin-bottom: 0;
  list-style: none
}

#add_participants_model.nav>li {
  position: relative;
  display: block
}

#add_participants_model.nav>li>a {
  position: relative;
  display: block;
  padding: 10px 15px
}

#add_participants_model.nav>li>a:focus,
#add_participants_model.nav>li>a:hover {
  text-decoration: none;
  background-color: #eee
}

#add_participants_model.nav>li.disabled>a {
  color: #777
}

#add_participants_model.nav>li.disabled>a:focus,
#add_participants_model.nav>li.disabled>a:hover {
  color: #777;
  text-decoration: none;
  cursor: not-allowed;
  background-color: transparent
}

#add_participants_model.nav .open>a,
#add_participants_model.nav .open>a:focus,
#add_participants_model.nav .open>a:hover {
  background-color: #eee;
  border-color: #337ab7
}

#add_participants_model.nav #add_participants_model.nav-divider {
  height: 1px;
  margin: 9px 0;
  overflow: hidden;
  background-color: #e5e5e5
}

#add_participants_model.nav>li>a>img {
  max-width: none
}

#add_participants_model.nav-tabs {
  border-bottom: 1px solid #ddd
}

#add_participants_model.nav-tabs>li {
  float: left;
  margin-bottom: -1px
}

#add_participants_model.nav-tabs>li>a {
  margin-right: 2px;
  line-height: 1.42857143;
  border: 1px solid transparent;
  border-radius: 4px 4px 0 0
}

#add_participants_model.nav-tabs>li>a:hover {
  border-color: #eee #eee #ddd
}

#add_participants_model.nav-tabs>li.active>a,
#add_participants_model.nav-tabs>li.active>a:focus,
#add_participants_model.nav-tabs>li.active>a:hover {
  color: #555;
  cursor: default;
  background-color: #fff;
  border: 1px solid #ddd;
  border-bottom-color: transparent
}

#add_participants_model.nav-tabs#add_participants_model.nav-justified {
  width: 100%;
  border-bottom: 0
}

#add_participants_model.nav-tabs#add_participants_model.nav-justified>li {
  float: none
}

#add_participants_model.nav-tabs#add_participants_model.nav-justified>li>a {
  margin-bottom: 5px;
  text-align: center
}

#add_participants_model.nav-tabs#add_participants_model.nav-justified>.dropdown .dropdown-menu {
  top: auto;
  left: auto
}

@media (min-width:768px) {
  #add_participants_model.nav-tabs#add_participants_model.nav-justified>li {
    display: table-cell;
    width: 1%
  }
  #add_participants_model.nav-tabs#add_participants_model.nav-justified>li>a {
    margin-bottom: 0
  }
}

#add_participants_model.nav-tabs#add_participants_model.nav-justified>li>a {
  margin-right: 0;
  border-radius: 4px
}

#add_participants_model.nav-tabs#add_participants_model.nav-justified>.active>a,
#add_participants_model.nav-tabs#add_participants_model.nav-justified>.active>a:focus,
#add_participants_model.nav-tabs#add_participants_model.nav-justified>.active>a:hover {
  border: 1px solid #ddd
}

@media (min-width:768px) {
  #add_participants_model.nav-tabs#add_participants_model.nav-justified>li>a {
    border-bottom: 1px solid #ddd;
    border-radius: 4px 4px 0 0
  }
  #add_participants_model.nav-tabs#add_participants_model.nav-justified>.active>a,
  #add_participants_model.nav-tabs#add_participants_model.nav-justified>.active>a:focus,
  #add_participants_model.nav-tabs#add_participants_model.nav-justified>.active>a:hover {
    border-bottom-color: #fff
  }
}

#add_participants_model.nav-pills>li {
  float: left
}

#add_participants_model.nav-pills>li>a {
  border-radius: 4px
}

#add_participants_model.nav-pills>li+li {
  margin-left: 2px
}

#add_participants_model.nav-pills>li.active>a,
#add_participants_model.nav-pills>li.active>a:focus,
#add_participants_model.nav-pills>li.active>a:hover {
  color: #fff;
  background-color: #337ab7
}

#add_participants_model.nav-stacked>li {
  float: none
}

#add_participants_model.nav-stacked>li+li {
  margin-top: 2px;
  margin-left: 0
}

#add_participants_model.nav-justified {
  width: 100%
}

#add_participants_model.nav-justified>li {
  float: none
}

#add_participants_model.nav-justified>li>a {
  margin-bottom: 5px;
  text-align: center
}

#add_participants_model.nav-justified>.dropdown .dropdown-menu {
  top: auto;
  left: auto
}

@media (min-width:768px) {
  #add_participants_model.nav-justified>li {
    display: table-cell;
    width: 1%
  }
  #add_participants_model.nav-justified>li>a {
    margin-bottom: 0
  }
}

#add_participants_model.nav-tabs-justified {
  border-bottom: 0
}

#add_participants_model.nav-tabs-justified>li>a {
  margin-right: 0;
  border-radius: 4px
}

#add_participants_model.nav-tabs-justified>.active>a,
#add_participants_model.nav-tabs-justified>.active>a:focus,
#add_participants_model.nav-tabs-justified>.active>a:hover {
  border: 1px solid #ddd
}

@media (min-width:768px) {
  #add_participants_model.nav-tabs-justified>li>a {
    border-bottom: 1px solid #ddd;
    border-radius: 4px 4px 0 0
  }
  #add_participants_model.nav-tabs-justified>.active>a,
  #add_participants_model.nav-tabs-justified>.active>a:focus,
  #add_participants_model.nav-tabs-justified>.active>a:hover {
    border-bottom-color: #fff
  }
}

.tab-content>.tab-pane {
  display: none
}

.tab-content>.active {
  display: block
}

#add_participants_model.nav-tabs .dropdown-menu {
  margin-top: -1px;
  border-top-left-radius: 0;
  border-top-right-radius: 0
}

#add_participants_model.navbar {
  position: relative;
  min-height: 50px;
  margin-bottom: 20px;
  border: 1px solid transparent
}

@media (min-width:768px) {
  #add_participants_model.navbar {
    border-radius: 4px
  }
}

@media (min-width:768px) {
  #add_participants_model.navbar-header {
    float: left
  }
}

#add_participants_model.navbar-collapse {
  padding-right: 15px;
  padding-left: 15px;
  overflow-x: visible;
  -webkit-overflow-scrolling: touch;
  border-top: 1px solid transparent;
  -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1);
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1)
}

#add_participants_model.navbar-collapse.in {
  overflow-y: auto
}

@media (min-width:768px) {
  #add_participants_model.navbar-collapse {
    width: auto;
    border-top: 0;
    -webkit-box-shadow: none;
    box-shadow: none
  }
  #add_participants_model.navbar-collapse.collapse {
    display: block!important;
    height: auto!important;
    padding-bottom: 0;
    overflow: visible!important
  }
  #add_participants_model.navbar-collapse.in {
    overflow-y: visible
  }
  #add_participants_model.navbar-fixed-bottom #add_participants_model.navbar-collapse,
  #add_participants_model.navbar-fixed-top #add_participants_model.navbar-collapse,
  #add_participants_model.navbar-static-top #add_participants_model.navbar-collapse {
    padding-right: 0;
    padding-left: 0
  }
}

#add_participants_model.navbar-fixed-bottom #add_participants_model.navbar-collapse,
#add_participants_model.navbar-fixed-top #add_participants_model.navbar-collapse {
  max-height: 340px
}

@media (max-device-width:480px) and (orientation:landscape) {
  #add_participants_model.navbar-fixed-bottom #add_participants_model.navbar-collapse,
  #add_participants_model.navbar-fixed-top #add_participants_model.navbar-collapse {
    max-height: 200px
  }
}

.container-fluid>#add_participants_model.navbar-collapse,
.container-fluid>#add_participants_model.navbar-header,
.container>#add_participants_model.navbar-collapse,
.container>#add_participants_model.navbar-header {
  margin-right: -15px;
  margin-left: -15px
}

@media (min-width:768px) {
  .container-fluid>#add_participants_model.navbar-collapse,
  .container-fluid>#add_participants_model.navbar-header,
  .container>#add_participants_model.navbar-collapse,
  .container>#add_participants_model.navbar-header {
    margin-right: 0;
    margin-left: 0
  }
}

#add_participants_model.navbar-static-top {
  z-index: 1000;
  border-width: 0 0 1px
}

@media (min-width:768px) {
  #add_participants_model.navbar-static-top {
    border-radius: 0
  }
}

#add_participants_model.navbar-fixed-bottom,
#add_participants_model.navbar-fixed-top {
  position: fixed;
  right: 0;
  left: 0;
  z-index: 1030
}

@media (min-width:768px) {
  #add_participants_model.navbar-fixed-bottom,
  #add_participants_model.navbar-fixed-top {
    border-radius: 0
  }
}

#add_participants_model.navbar-fixed-top {
  top: 0;
  border-width: 0 0 1px
}

#add_participants_model.navbar-fixed-bottom {
  bottom: 0;
  margin-bottom: 0;
  border-width: 1px 0 0
}

#add_participants_model.navbar-brand {
  float: left;
  height: 50px;
  padding: 15px 15px;
  font-size: 18px;
  line-height: 20px
}

#add_participants_model.navbar-brand:focus,
#add_participants_model.navbar-brand:hover {
  text-decoration: none
}

#add_participants_model.navbar-brand>img {
  display: block
}

@media (min-width:768px) {
  #add_participants_model.navbar>.container #add_participants_model.navbar-brand,
  #add_participants_model.navbar>.container-fluid #add_participants_model.navbar-brand {
    margin-left: -15px
  }
}

#add_participants_model.navbar-toggle {
  position: relative;
  float: right;
  padding: 9px 10px;
  margin-top: 8px;
  margin-right: 15px;
  margin-bottom: 8px;
  background-color: transparent;
  background-image: none;
  border: 1px solid transparent;
  border-radius: 4px
}

#add_participants_model.navbar-toggle:focus {
  outline: 0
}

#add_participants_model.navbar-toggle .icon-bar {
  display: block;
  width: 22px;
  height: 2px;
  border-radius: 1px
}

#add_participants_model.navbar-toggle .icon-bar+.icon-bar {
  margin-top: 4px
}

@media (min-width:768px) {
  #add_participants_model.navbar-toggle {
    display: none
  }
}

#add_participants_model.navbar-nav {
  margin: 7.5px -15px
}

#add_participants_model.navbar-nav>li>a {
  padding-top: 10px;
  padding-bottom: 10px;
  line-height: 20px
}

@media (max-width:767px) {
  #add_participants_model.navbar-nav .open .dropdown-menu {
    position: static;
    float: none;
    width: auto;
    margin-top: 0;
    background-color: transparent;
    border: 0;
    -webkit-box-shadow: none;
    box-shadow: none
  }
  #add_participants_model.navbar-nav .open .dropdown-menu .dropdown-header,
  #add_participants_model.navbar-nav .open .dropdown-menu>li>a {
    padding: 5px 15px 5px 25px
  }
  #add_participants_model.navbar-nav .open .dropdown-menu>li>a {
    line-height: 20px
  }
  #add_participants_model.navbar-nav .open .dropdown-menu>li>a:focus,
  #add_participants_model.navbar-nav .open .dropdown-menu>li>a:hover {
    background-image: none
  }
}

@media (min-width:768px) {
  #add_participants_model.navbar-nav {
    float: left;
    margin: 0
  }
  #add_participants_model.navbar-nav>li {
    float: left
  }
  #add_participants_model.navbar-nav>li>a {
    padding-top: 15px;
    padding-bottom: 15px
  }
}

#add_participants_model.navbar-form {
  padding: 10px 15px;
  margin-top: 8px;
  margin-right: -15px;
  margin-bottom: 8px;
  margin-left: -15px;
  border-top: 1px solid transparent;
  border-bottom: 1px solid transparent;
  -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1), 0 1px 0 rgba(255, 255, 255, .1);
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1), 0 1px 0 rgba(255, 255, 255, .1)
}

@media (min-width:768px) {
  #add_participants_model.navbar-form #add_participants_model.form-group {
    display: inline-block;
    margin-bottom: 0;
    vertical-align: middle
  }
  #add_participants_model.navbar-form #add_participants_model.form-control {
    display: inline-block;
    width: auto;
    vertical-align: middle
  }
  #add_participants_model.navbar-form #add_participants_model.form-control-static {
    display: inline-block
  }
  #add_participants_model.navbar-form #add_participants_model.input-group {
    display: inline-table;
    vertical-align: middle
  }
  #add_participants_model.navbar-form #add_participants_model.input-group #add_participants_model.form-control,
  #add_participants_model.navbar-form #add_participants_model.input-group #add_participants_model.input-group-addon,
  #add_participants_model.navbar-form #add_participants_model.input-group #add_participants_model.input-group-btn {
    width: auto
  }
  #add_participants_model.navbar-form #add_participants_model.input-group>#add_participants_model.form-control {
    width: 100%
  }
  #add_participants_model.navbar-form .control-label {
    margin-bottom: 0;
    vertical-align: middle
  }
  #add_participants_model.navbar-form .checkbox,
  #add_participants_model.navbar-form .radio {
    display: inline-block;
    margin-top: 0;
    margin-bottom: 0;
    vertical-align: middle
  }
  #add_participants_model.navbar-form .checkbox label,
  #add_participants_model.navbar-form .radio label {
    padding-left: 0
  }
  #add_participants_model.navbar-form .checkbox input[type=checkbox],
  #add_participants_model.navbar-form .radio input[type=radio] {
    position: relative;
    margin-left: 0
  }
  #add_participants_model.navbar-form .has-feedback #add_participants_model.form-control-feedback {
    top: 0
  }
}

@media (max-width:767px) {
  #add_participants_model.navbar-form #add_participants_model.form-group {
    margin-bottom: 5px
  }
  #add_participants_model.navbar-form #add_participants_model.form-group:last-child {
    margin-bottom: 0
  }
}

@media (min-width:768px) {
  #add_participants_model.navbar-form {
    width: auto;
    padding-top: 0;
    padding-bottom: 0;
    margin-right: 0;
    margin-left: 0;
    border: 0;
    -webkit-box-shadow: none;
    box-shadow: none
  }
}

#add_participants_model.navbar-nav>li>.dropdown-menu {
  margin-top: 0;
  border-top-left-radius: 0;
  border-top-right-radius: 0
}

#add_participants_model.navbar-fixed-bottom #add_participants_model.navbar-nav>li>.dropdown-menu {
  margin-bottom: 0;
  border-top-left-radius: 4px;
  border-top-right-radius: 4px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0
}

#add_participants_model.navbar-btn {
  margin-top: 8px;
  margin-bottom: 8px
}

#add_participants_model.navbar-btn#add_participants_model.btn-sm {
  margin-top: 10px;
  margin-bottom: 10px
}

#add_participants_model.navbar-btn#add_participants_model.btn-xs {
  margin-top: 14px;
  margin-bottom: 14px
}

#add_participants_model.navbar-text {
  margin-top: 15px;
  margin-bottom: 15px
}

@media (min-width:768px) {
  #add_participants_model.navbar-text {
    float: left;
    margin-right: 15px;
    margin-left: 15px
  }
}

@media (min-width:768px) {
  #add_participants_model.navbar-left {
    float: left!important
  }
  #add_participants_model.navbar-right {
    float: right!important;
    margin-right: -15px
  }
  #add_participants_model.navbar-right~#add_participants_model.navbar-right {
    margin-right: 0
  }
}

#add_participants_model.navbar-default {
  background-color: #f8f8f8;
  border-color: #e7e7e7
}

#add_participants_model.navbar-default #add_participants_model.navbar-brand {
  color: #777
}

#add_participants_model.navbar-default #add_participants_model.navbar-brand:focus,
#add_participants_model.navbar-default #add_participants_model.navbar-brand:hover {
  color: #5e5e5e;
  background-color: transparent
}

#add_participants_model.navbar-default #add_participants_model.navbar-text {
  color: #777
}

#add_participants_model.navbar-default #add_participants_model.navbar-nav>li>a {
  color: #777
}

#add_participants_model.navbar-default #add_participants_model.navbar-nav>li>a:focus,
#add_participants_model.navbar-default #add_participants_model.navbar-nav>li>a:hover {
  color: #333;
  background-color: transparent
}

#add_participants_model.navbar-default #add_participants_model.navbar-nav>.active>a,
#add_participants_model.navbar-default #add_participants_model.navbar-nav>.active>a:focus,
#add_participants_model.navbar-default #add_participants_model.navbar-nav>.active>a:hover {
  color: #555;
  background-color: #e7e7e7
}

#add_participants_model.navbar-default #add_participants_model.navbar-nav>.disabled>a,
#add_participants_model.navbar-default #add_participants_model.navbar-nav>.disabled>a:focus,
#add_participants_model.navbar-default #add_participants_model.navbar-nav>.disabled>a:hover {
  color: #ccc;
  background-color: transparent
}

#add_participants_model.navbar-default #add_participants_model.navbar-toggle {
  border-color: #ddd
}

#add_participants_model.navbar-default #add_participants_model.navbar-toggle:focus,
#add_participants_model.navbar-default #add_participants_model.navbar-toggle:hover {
  background-color: #ddd
}

#add_participants_model.navbar-default #add_participants_model.navbar-toggle .icon-bar {
  background-color: #888
}

#add_participants_model.navbar-default #add_participants_model.navbar-collapse,
#add_participants_model.navbar-default #add_participants_model.navbar-form {
  border-color: #e7e7e7
}

#add_participants_model.navbar-default #add_participants_model.navbar-nav>.open>a,
#add_participants_model.navbar-default #add_participants_model.navbar-nav>.open>a:focus,
#add_participants_model.navbar-default #add_participants_model.navbar-nav>.open>a:hover {
  color: #555;
  background-color: #e7e7e7
}

@media (max-width:767px) {
  #add_participants_model.navbar-default #add_participants_model.navbar-nav .open .dropdown-menu>li>a {
    color: #777
  }
  #add_participants_model.navbar-default #add_participants_model.navbar-nav .open .dropdown-menu>li>a:focus,
  #add_participants_model.navbar-default #add_participants_model.navbar-nav .open .dropdown-menu>li>a:hover {
    color: #333;
    background-color: transparent
  }
  #add_participants_model.navbar-default #add_participants_model.navbar-nav .open .dropdown-menu>.active>a,
  #add_participants_model.navbar-default #add_participants_model.navbar-nav .open .dropdown-menu>.active>a:focus,
  #add_participants_model.navbar-default #add_participants_model.navbar-nav .open .dropdown-menu>.active>a:hover {
    color: #555;
    background-color: #e7e7e7
  }
  #add_participants_model.navbar-default #add_participants_model.navbar-nav .open .dropdown-menu>.disabled>a,
  #add_participants_model.navbar-default #add_participants_model.navbar-nav .open .dropdown-menu>.disabled>a:focus,
  #add_participants_model.navbar-default #add_participants_model.navbar-nav .open .dropdown-menu>.disabled>a:hover {
    color: #ccc;
    background-color: transparent
  }
}

#add_participants_model.navbar-default #add_participants_model.navbar-link {
  color: #777
}

#add_participants_model.navbar-default #add_participants_model.navbar-link:hover {
  color: #333
}

#add_participants_model.navbar-default #add_participants_model.btn-link {
  color: #777
}

#add_participants_model.navbar-default #add_participants_model.btn-link:focus,
#add_participants_model.navbar-default #add_participants_model.btn-link:hover {
  color: #333
}

#add_participants_model.navbar-default #add_participants_model.btn-link[disabled]:focus,
#add_participants_model.navbar-default #add_participants_model.btn-link[disabled]:hover,
fieldset[disabled] #add_participants_model.navbar-default #add_participants_model.btn-link:focus,
fieldset[disabled] #add_participants_model.navbar-default #add_participants_model.btn-link:hover {
  color: #ccc
}

#add_participants_model.navbar-inverse {
  background-color: #222;
  border-color: #080808
}

#add_participants_model.navbar-inverse #add_participants_model.navbar-brand {
  color: #9d9d9d
}

#add_participants_model.navbar-inverse #add_participants_model.navbar-brand:focus,
#add_participants_model.navbar-inverse #add_participants_model.navbar-brand:hover {
  color: #fff;
  background-color: transparent
}

#add_participants_model.navbar-inverse #add_participants_model.navbar-text {
  color: #9d9d9d
}

#add_participants_model.navbar-inverse #add_participants_model.navbar-nav>li>a {
  color: #9d9d9d
}

#add_participants_model.navbar-inverse #add_participants_model.navbar-nav>li>a:focus,
#add_participants_model.navbar-inverse #add_participants_model.navbar-nav>li>a:hover {
  color: #fff;
  background-color: transparent
}

#add_participants_model.navbar-inverse #add_participants_model.navbar-nav>.active>a,
#add_participants_model.navbar-inverse #add_participants_model.navbar-nav>.active>a:focus,
#add_participants_model.navbar-inverse #add_participants_model.navbar-nav>.active>a:hover {
  color: #fff;
  background-color: #080808
}

#add_participants_model.navbar-inverse #add_participants_model.navbar-nav>.disabled>a,
#add_participants_model.navbar-inverse #add_participants_model.navbar-nav>.disabled>a:focus,
#add_participants_model.navbar-inverse #add_participants_model.navbar-nav>.disabled>a:hover {
  color: #444;
  background-color: transparent
}

#add_participants_model.navbar-inverse #add_participants_model.navbar-toggle {
  border-color: #333
}

#add_participants_model.navbar-inverse #add_participants_model.navbar-toggle:focus,
#add_participants_model.navbar-inverse #add_participants_model.navbar-toggle:hover {
  background-color: #333
}

#add_participants_model.navbar-inverse #add_participants_model.navbar-toggle .icon-bar {
  background-color: #fff
}

#add_participants_model.navbar-inverse #add_participants_model.navbar-collapse,
#add_participants_model.navbar-inverse #add_participants_model.navbar-form {
  border-color: #101010
}

#add_participants_model.navbar-inverse #add_participants_model.navbar-nav>.open>a,
#add_participants_model.navbar-inverse #add_participants_model.navbar-nav>.open>a:focus,
#add_participants_model.navbar-inverse #add_participants_model.navbar-nav>.open>a:hover {
  color: #fff;
  background-color: #080808
}

@media (max-width:767px) {
  #add_participants_model.navbar-inverse #add_participants_model.navbar-nav .open .dropdown-menu>.dropdown-header {
    border-color: #080808
  }
  #add_participants_model.navbar-inverse #add_participants_model.navbar-nav .open .dropdown-menu .divider {
    background-color: #080808
  }
  #add_participants_model.navbar-inverse #add_participants_model.navbar-nav .open .dropdown-menu>li>a {
    color: #9d9d9d
  }
  #add_participants_model.navbar-inverse #add_participants_model.navbar-nav .open .dropdown-menu>li>a:focus,
  #add_participants_model.navbar-inverse #add_participants_model.navbar-nav .open .dropdown-menu>li>a:hover {
    color: #fff;
    background-color: transparent
  }
  #add_participants_model.navbar-inverse #add_participants_model.navbar-nav .open .dropdown-menu>.active>a,
  #add_participants_model.navbar-inverse #add_participants_model.navbar-nav .open .dropdown-menu>.active>a:focus,
  #add_participants_model.navbar-inverse #add_participants_model.navbar-nav .open .dropdown-menu>.active>a:hover {
    color: #fff;
    background-color: #080808
  }
  #add_participants_model.navbar-inverse #add_participants_model.navbar-nav .open .dropdown-menu>.disabled>a,
  #add_participants_model.navbar-inverse #add_participants_model.navbar-nav .open .dropdown-menu>.disabled>a:focus,
  #add_participants_model.navbar-inverse #add_participants_model.navbar-nav .open .dropdown-menu>.disabled>a:hover {
    color: #444;
    background-color: transparent
  }
}

#add_participants_model.navbar-inverse #add_participants_model.navbar-link {
  color: #9d9d9d
}

#add_participants_model.navbar-inverse #add_participants_model.navbar-link:hover {
  color: #fff
}

#add_participants_model.navbar-inverse #add_participants_model.btn-link {
  color: #9d9d9d
}

#add_participants_model.navbar-inverse #add_participants_model.btn-link:focus,
#add_participants_model.navbar-inverse #add_participants_model.btn-link:hover {
  color: #fff
}

#add_participants_model.navbar-inverse #add_participants_model.btn-link[disabled]:focus,
#add_participants_model.navbar-inverse #add_participants_model.btn-link[disabled]:hover,
fieldset[disabled] #add_participants_model.navbar-inverse #add_participants_model.btn-link:focus,
fieldset[disabled] #add_participants_model.navbar-inverse #add_participants_model.btn-link:hover {
  color: #444
}

.breadcrumb {
  padding: 8px 15px;
  margin-bottom: 20px;
  list-style: none;
  background-color: #f5f5f5;
  border-radius: 4px
}

.breadcrumb>li {
  display: inline-block
}

.breadcrumb>li+li:before {
  padding: 0 5px;
  color: #ccc;
  content: "/\00a0"
}

.breadcrumb>.active {
  color: #777
}

.pagination {
  display: inline-block;
  padding-left: 0;
  margin: 20px 0;
  border-radius: 4px
}

.pagination>li {
  display: inline
}

.pagination>li>a,
.pagination>li>span {
  position: relative;
  float: left;
  padding: 6px 12px;
  margin-left: -1px;
  line-height: 1.42857143;
  color: #337ab7;
  text-decoration: none;
  background-color: #fff;
  border: 1px solid #ddd
}

.pagination>li:first-child>a,
.pagination>li:first-child>span {
  margin-left: 0;
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px
}

.pagination>li:last-child>a,
.pagination>li:last-child>span {
  border-top-right-radius: 4px;
  border-bottom-right-radius: 4px
}

.pagination>li>a:focus,
.pagination>li>a:hover,
.pagination>li>span:focus,
.pagination>li>span:hover {
  z-index: 2;
  color: #23527c;
  background-color: #eee;
  border-color: #ddd
}

.pagination>.active>a,
.pagination>.active>a:focus,
.pagination>.active>a:hover,
.pagination>.active>span,
.pagination>.active>span:focus,
.pagination>.active>span:hover {
  z-index: 3;
  color: #fff;
  cursor: default;
  background-color: #337ab7;
  border-color: #337ab7
}

.pagination>.disabled>a,
.pagination>.disabled>a:focus,
.pagination>.disabled>a:hover,
.pagination>.disabled>span,
.pagination>.disabled>span:focus,
.pagination>.disabled>span:hover {
  color: #777;
  cursor: not-allowed;
  background-color: #fff;
  border-color: #ddd
}

.pagination-lg>li>a,
.pagination-lg>li>span {
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.3333333
}

.pagination-lg>li:first-child>a,
.pagination-lg>li:first-child>span {
  border-top-left-radius: 6px;
  border-bottom-left-radius: 6px
}

.pagination-lg>li:last-child>a,
.pagination-lg>li:last-child>span {
  border-top-right-radius: 6px;
  border-bottom-right-radius: 6px
}

.pagination-sm>li>a,
.pagination-sm>li>span {
  padding: 5px 10px;
  font-size: 12px;
  line-height: 1.5
}

.pagination-sm>li:first-child>a,
.pagination-sm>li:first-child>span {
  border-top-left-radius: 3px;
  border-bottom-left-radius: 3px
}

.pagination-sm>li:last-child>a,
.pagination-sm>li:last-child>span {
  border-top-right-radius: 3px;
  border-bottom-right-radius: 3px
}

.pager {
  padding-left: 0;
  margin: 20px 0;
  text-align: center;
  list-style: none
}

.pager li {
  display: inline
}

.pager li>a,
.pager li>span {
  display: inline-block;
  padding: 5px 14px;
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 15px
}

.pager li>a:focus,
.pager li>a:hover {
  text-decoration: none;
  background-color: #eee
}

.pager .next>a,
.pager .next>span {
  float: right
}

.pager .previous>a,
.pager .previous>span {
  float: left
}

.pager .disabled>a,
.pager .disabled>a:focus,
.pager .disabled>a:hover,
.pager .disabled>span {
  color: #777;
  cursor: not-allowed;
  background-color: #fff
}

.label {
  display: inline;
  padding: .2em .6em .3em;
  font-size: 75%;
  font-weight: 700;
  line-height: 1;
  color: #fff;
  text-align: center;
  white-space: nowrap;
  vertical-align: baseline;
  border-radius: .25em
}

a.label:focus,
a.label:hover {
  color: #fff;
  text-decoration: none;
  cursor: pointer
}

.label:empty {
  display: none
}

#add_participants_model.btn .label {
  position: relative;
  top: -1px
}

.label-default {
  background-color: #777
}

.label-default[href]:focus,
.label-default[href]:hover {
  background-color: #5e5e5e
}

.label-primary {
  background-color: #337ab7
}

.label-primary[href]:focus,
.label-primary[href]:hover {
  background-color: #286090
}

.label-success {
  background-color: #5cb85c
}

.label-success[href]:focus,
.label-success[href]:hover {
  background-color: #449d44
}

.label-info {
  background-color: #5bc0de
}

.label-info[href]:focus,
.label-info[href]:hover {
  background-color: #31b0d5
}

.label-warning {
  background-color: #f0ad4e
}

.label-warning[href]:focus,
.label-warning[href]:hover {
  background-color: #ec971f
}

.label-danger {
  background-color: #d9534f
}

.label-danger[href]:focus,
.label-danger[href]:hover {
  background-color: #c9302c
}

#add_participants_model.btn-group-xs>#add_participants_model.btn#add_participants_model.btn-xs .list-group-item.active>#add_participants_model.nav-pills>.active>a>.list-group-item>.badge {
  float: right
}

.list-group-item>.badge+.badge {
  margin-right: 5px
}

#add_participants_model.nav-pills>li>a>.badge {
  margin-left: 3px
}

.jumbotron {
  padding-top: 30px;
  padding-bottom: 30px;
  margin-bottom: 30px;
  color: inherit;
  background-color: #eee
}

.jumbotron .h1,
.jumbotron h1 {
  color: inherit
}

.jumbotron p {
  margin-bottom: 15px;
  font-size: 21px;
  font-weight: 200
}

.jumbotron>hr {
  border-top-color: #d5d5d5
}

.container .jumbotron,
.container-fluid .jumbotron {
  padding-right: 15px;
  padding-left: 15px;
  border-radius: 6px
}

.jumbotron .container {
  max-width: 100%
}

@media screen and (min-width:768px) {
  .jumbotron {
    padding-top: 48px;
    padding-bottom: 48px
  }
  .container .jumbotron,
  .container-fluid .jumbotron {
    padding-right: 60px;
    padding-left: 60px
  }
  .jumbotron .h1,
  .jumbotron h1 {
    font-size: 63px
  }
}

.thumbnail {
  display: block;
  padding: 4px;
  margin-bottom: 20px;
  line-height: 1.42857143;
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 4px;
  -webkit-transition: border .2s ease-in-out;
  -o-transition: border .2s ease-in-out;
  transition: border .2s ease-in-out
}

.thumbnail a>img,
.thumbnail>img {
  margin-right: auto;
  margin-left: auto
}

a.thumbnail.active,
a.thumbnail:focus,
a.thumbnail:hover {
  border-color: #337ab7
}

.thumbnail .caption {
  padding: 9px;
  color: #333
}

.alert {
  padding: 15px;
  margin-bottom: 20px;
  border: 1px solid transparent;
  border-radius: 4px
}

.alert h4 {
  margin-top: 0;
  color: inherit
}

.alert .alert-link {
  font-weight: 700
}

.alert>p,
.alert>ul {
  margin-bottom: 0
}

.alert>p+p {
  margin-top: 5px
}

.alert-dismissable,
.alert-dismissible {
  padding-right: 35px
}

.alert-dismissable .close,
.alert-dismissible .close {
  position: relative;
  top: -2px;
  right: -21px;
  color: inherit
}

.alert-success {
  color: #3c763d;
  background-color: #dff0d8;
  border-color: #d6e9c6
}

.alert-success hr {
  border-top-color: #c9e2b3
}

.alert-success .alert-link {
  color: #2b542c
}

.alert-info {
  color: #31708f;
  background-color: #d9edf7;
  border-color: #bce8f1
}

.alert-info hr {
  border-top-color: #a6e1ec
}

.alert-info .alert-link {
  color: #245269
}

.alert-warning {
  color: #8a6d3b;
  background-color: #fcf8e3;
  border-color: #faebcc
}

.alert-warning hr {
  border-top-color: #f7e1b5
}

.alert-warning .alert-link {
  color: #66512c
}

.alert-danger {
  color: #a94442;
  background-color: #f2dede;
  border-color: #ebccd1
}

.alert-danger hr {
  border-top-color: #e4b9c0
}

.alert-danger .alert-link {
  color: #843534
}

@-webkit-keyframes progress-bar-stripes {
  from {
    background-position: 40px 0
  }
  to {
    background-position: 0 0
  }
}

@-o-keyframes progress-bar-stripes {
  from {
    background-position: 40px 0
  }
  to {
    background-position: 0 0
  }
}

@keyframes progress-bar-stripes {
  from {
    background-position: 40px 0
  }
  to {
    background-position: 0 0
  }
}

.progress {
  height: 20px;
  margin-bottom: 20px;
  overflow: hidden;
  background-color: #f5f5f5;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);
  box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1)
}

.progress-bar {
  float: left;
  width: 0;
  height: 100%;
  font-size: 12px;
  line-height: 20px;
  color: #fff;
  text-align: center;
  background-color: #337ab7;
  -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .15);
  box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .15);
  -webkit-transition: width .6s ease;
  -o-transition: width .6s ease;
  transition: width .6s ease
}

.progress-bar-striped,
.progress-striped .progress-bar {
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  -webkit-background-size: 40px 40px;
  background-size: 40px 40px
}

.progress-bar.active,
.progress.active .progress-bar {
  -webkit-animation: progress-bar-stripes 2s linear infinite;
  -o-animation: progress-bar-stripes 2s linear infinite;
  animation: progress-bar-stripes 2s linear infinite
}

.progress-bar-success {
  background-color: #5cb85c
}

.progress-striped .progress-bar-success {
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent)
}

.progress-bar-info {
  background-color: #5bc0de
}

.progress-striped .progress-bar-info {
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent)
}

.progress-bar-warning {
  background-color: #f0ad4e
}

.progress-striped .progress-bar-warning {
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent)
}

.progress-bar-danger {
  background-color: #d9534f
}

.progress-striped .progress-bar-danger {
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
  background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent)
}

.media {
  margin-top: 15px
}

.media:first-child {
  margin-top: 0
}

.media,
.media-body {
  overflow: hidden;
  zoom: 1
}

.media-body {
  width: 10000px
}

.media-object {
  display: block
}

.media-object.img-thumbnail {
  max-width: none
}

.media-right,
.media>.pull-right {
  padding-left: 10px
}

.media-left,
.media>.pull-left {
  padding-right: 10px
}

.media-body,
.media-left,
.media-right {
  display: table-cell;
  vertical-align: top
}

.media-middle {
  vertical-align: middle
}

.media-bottom {
  vertical-align: bottom
}

.media-heading {
  margin-top: 0;
  margin-bottom: 5px
}

.media-list {
  padding-left: 0;
  list-style: none
}

.list-group {
  padding-left: 0;
  margin-bottom: 20px
}

.list-group-item {
  position: relative;
  display: block;
  padding: 10px 15px;
  margin-bottom: -1px;
  background-color: #fff;
  border: 1px solid #ddd
}

.list-group-item:first-child {
  border-top-left-radius: 4px;
  border-top-right-radius: 4px
}

.list-group-item:last-child {
  margin-bottom: 0;
  border-bottom-right-radius: 4px;
  border-bottom-left-radius: 4px
}

a.list-group-item,
button.list-group-item {
  color: #555
}

a.list-group-item .list-group-item-heading,
button.list-group-item .list-group-item-heading {
  color: #333
}

a.list-group-item:focus,
a.list-group-item:hover,
button.list-group-item:focus,
button.list-group-item:hover {
  color: #555;
  text-decoration: none;
  background-color: #f5f5f5
}

button.list-group-item {
  width: 100%;
  text-align: left
}

.list-group-item.disabled,
.list-group-item.disabled:focus,
.list-group-item.disabled:hover {
  color: #777;
  cursor: not-allowed;
  background-color: #eee
}

.list-group-item.disabled .list-group-item-heading,
.list-group-item.disabled:focus .list-group-item-heading,
.list-group-item.disabled:hover .list-group-item-heading {
  color: inherit
}

.list-group-item.disabled .list-group-item-text,
.list-group-item.disabled:focus .list-group-item-text,
.list-group-item.disabled:hover .list-group-item-text {
  color: #777
}

.list-group-item.active,
.list-group-item.active:focus,
.list-group-item.active:hover {
  z-index: 2;
  color: #fff;
  background-color: #337ab7;
  border-color: #337ab7
}

.list-group-item.active .list-group-item-heading,
.list-group-item.active .list-group-item-heading>.small,
.list-group-item.active .list-group-item-heading>small,
.list-group-item.active:focus .list-group-item-heading,
.list-group-item.active:focus .list-group-item-heading>.small,
.list-group-item.active:focus .list-group-item-heading>small,
.list-group-item.active:hover .list-group-item-heading,
.list-group-item.active:hover .list-group-item-heading>.small,
.list-group-item.active:hover .list-group-item-heading>small {
  color: inherit
}

.list-group-item.active .list-group-item-text,
.list-group-item.active:focus .list-group-item-text,
.list-group-item.active:hover .list-group-item-text {
  color: #c7ddef
}

.list-group-item-success {
  color: #3c763d;
  background-color: #dff0d8
}

a.list-group-item-success,
button.list-group-item-success {
  color: #3c763d
}

a.list-group-item-success .list-group-item-heading,
button.list-group-item-success .list-group-item-heading {
  color: inherit
}

a.list-group-item-success:focus,
a.list-group-item-success:hover,
button.list-group-item-success:focus,
button.list-group-item-success:hover {
  color: #3c763d;
  background-color: #d0e9c6
}

a.list-group-item-success.active,
a.list-group-item-success.active:focus,
a.list-group-item-success.active:hover,
button.list-group-item-success.active,
button.list-group-item-success.active:focus,
button.list-group-item-success.active:hover {
  color: #fff;
  background-color: #3c763d;
  border-color: #3c763d
}

.list-group-item-info {
  color: #31708f;
  background-color: #d9edf7
}

a.list-group-item-info,
button.list-group-item-info {
  color: #31708f
}

a.list-group-item-info .list-group-item-heading,
button.list-group-item-info .list-group-item-heading {
  color: inherit
}

a.list-group-item-info:focus,
a.list-group-item-info:hover,
button.list-group-item-info:focus,
button.list-group-item-info:hover {
  color: #31708f;
  background-color: #c4e3f3
}

a.list-group-item-info.active,
a.list-group-item-info.active:focus,
a.list-group-item-info.active:hover,
button.list-group-item-info.active,
button.list-group-item-info.active:focus,
button.list-group-item-info.active:hover {
  color: #fff;
  background-color: #31708f;
  border-color: #31708f
}

.list-group-item-warning {
  color: #8a6d3b;
  background-color: #fcf8e3
}

a.list-group-item-warning,
button.list-group-item-warning {
  color: #8a6d3b
}

a.list-group-item-warning .list-group-item-heading,
button.list-group-item-warning .list-group-item-heading {
  color: inherit
}

a.list-group-item-warning:focus,
a.list-group-item-warning:hover,
button.list-group-item-warning:focus,
button.list-group-item-warning:hover {
  color: #8a6d3b;
  background-color: #faf2cc
}

a.list-group-item-warning.active,
a.list-group-item-warning.active:focus,
a.list-group-item-warning.active:hover,
button.list-group-item-warning.active,
button.list-group-item-warning.active:focus,
button.list-group-item-warning.active:hover {
  color: #fff;
  background-color: #8a6d3b;
  border-color: #8a6d3b
}

.list-group-item-danger {
  color: #a94442;
  background-color: #f2dede
}

a.list-group-item-danger,
button.list-group-item-danger {
  color: #a94442
}

a.list-group-item-danger .list-group-item-heading,
button.list-group-item-danger .list-group-item-heading {
  color: inherit
}

a.list-group-item-danger:focus,
a.list-group-item-danger:hover,
button.list-group-item-danger:focus,
button.list-group-item-danger:hover {
  color: #a94442;
  background-color: #ebcccc
}

a.list-group-item-danger.active,
a.list-group-item-danger.active:focus,
a.list-group-item-danger.active:hover,
button.list-group-item-danger.active,
button.list-group-item-danger.active:focus,
button.list-group-item-danger.active:hover {
  color: #fff;
  background-color: #a94442;
  border-color: #a94442
}

.list-group-item-heading {
  margin-top: 0;
  margin-bottom: 5px
}

.list-group-item-text {
  margin-bottom: 0;
  line-height: 1.3
}

.panel {
  margin-bottom: 20px;
  background-color: #fff;
  border: 1px solid transparent;
  border-radius: 4px;
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
  box-shadow: 0 1px 1px rgba(0, 0, 0, .05)
}

.panel-body {
  padding: 15px
}

.panel-heading {
  padding: 10px 15px;
  border-bottom: 1px solid transparent;
  border-top-left-radius: 3px;
  border-top-right-radius: 3px
}

.panel-heading>.dropdown .dropdown-toggle {
  color: inherit
}

.panel-title {
  margin-top: 0;
  margin-bottom: 0;
  font-size: 16px;
  color: inherit
}

.panel-title>.small,
.panel-title>.small>a,
.panel-title>a,
.panel-title>small,
.panel-title>small>a {
  color: inherit
}

.panel-footer {
  padding: 10px 15px;
  background-color: #f5f5f5;
  border-top: 1px solid #ddd;
  border-bottom-right-radius: 3px;
  border-bottom-left-radius: 3px
}

.panel>.list-group,
.panel>.panel-collapse>.list-group {
  margin-bottom: 0
}

.panel>.list-group .list-group-item,
.panel>.panel-collapse>.list-group .list-group-item {
  border-width: 1px 0;
  border-radius: 0
}

.panel>.list-group:first-child .list-group-item:first-child,
.panel>.panel-collapse>.list-group:first-child .list-group-item:first-child {
  border-top: 0;
  border-top-left-radius: 3px;
  border-top-right-radius: 3px
}

.panel>.list-group:last-child .list-group-item:last-child,
.panel>.panel-collapse>.list-group:last-child .list-group-item:last-child {
  border-bottom: 0;
  border-bottom-right-radius: 3px;
  border-bottom-left-radius: 3px
}

.panel>.panel-heading+.panel-collapse>.list-group .list-group-item:first-child {
  border-top-left-radius: 0;
  border-top-right-radius: 0
}

.panel-heading+.list-group .list-group-item:first-child {
  border-top-width: 0
}

.list-group+.panel-footer {
  border-top-width: 0
}

.panel>.panel-collapse>#add_participants_model.table,
.panel>#add_participants_model.table,
.panel>#add_participants_model.table-responsive>#add_participants_model.table {
  margin-bottom: 0
}

.panel>.panel-collapse>#add_participants_model.table caption,
.panel>#add_participants_model.table caption,
.panel>#add_participants_model.table-responsive>#add_participants_model.table caption {
  padding-right: 15px;
  padding-left: 15px
}

.panel>#add_participants_model.table-responsive:first-child>#add_participants_model.table:first-child,
.panel>#add_participants_model.table:first-child {
  border-top-left-radius: 3px;
  border-top-right-radius: 3px
}

.panel>#add_participants_model.table-responsive:first-child>#add_participants_model.table:first-child>tbody:first-child>tr:first-child,
.panel>#add_participants_model.table-responsive:first-child>#add_participants_model.table:first-child>thead:first-child>tr:first-child,
.panel>#add_participants_model.table:first-child>tbody:first-child>tr:first-child,
.panel>#add_participants_model.table:first-child>thead:first-child>tr:first-child {
  border-top-left-radius: 3px;
  border-top-right-radius: 3px
}

.panel>#add_participants_model.table-responsive:first-child>#add_participants_model.table:first-child>tbody:first-child>tr:first-child td:first-child,
.panel>#add_participants_model.table-responsive:first-child>#add_participants_model.table:first-child>tbody:first-child>tr:first-child th:first-child,
.panel>#add_participants_model.table-responsive:first-child>#add_participants_model.table:first-child>thead:first-child>tr:first-child td:first-child,
.panel>#add_participants_model.table-responsive:first-child>#add_participants_model.table:first-child>thead:first-child>tr:first-child th:first-child,
.panel>#add_participants_model.table:first-child>tbody:first-child>tr:first-child td:first-child,
.panel>#add_participants_model.table:first-child>tbody:first-child>tr:first-child th:first-child,
.panel>#add_participants_model.table:first-child>thead:first-child>tr:first-child td:first-child,
.panel>#add_participants_model.table:first-child>thead:first-child>tr:first-child th:first-child {
  border-top-left-radius: 3px
}

.panel>#add_participants_model.table-responsive:first-child>#add_participants_model.table:first-child>tbody:first-child>tr:first-child td:last-child,
.panel>#add_participants_model.table-responsive:first-child>#add_participants_model.table:first-child>tbody:first-child>tr:first-child th:last-child,
.panel>#add_participants_model.table-responsive:first-child>#add_participants_model.table:first-child>thead:first-child>tr:first-child td:last-child,
.panel>#add_participants_model.table-responsive:first-child>#add_participants_model.table:first-child>thead:first-child>tr:first-child th:last-child,
.panel>#add_participants_model.table:first-child>tbody:first-child>tr:first-child td:last-child,
.panel>#add_participants_model.table:first-child>tbody:first-child>tr:first-child th:last-child,
.panel>#add_participants_model.table:first-child>thead:first-child>tr:first-child td:last-child,
.panel>#add_participants_model.table:first-child>thead:first-child>tr:first-child th:last-child {
  border-top-right-radius: 3px
}

.panel>#add_participants_model.table-responsive:last-child>#add_participants_model.table:last-child,
.panel>#add_participants_model.table:last-child {
  border-bottom-right-radius: 3px;
  border-bottom-left-radius: 3px
}

.panel>#add_participants_model.table-responsive:last-child>#add_participants_model.table:last-child>tbody:last-child>tr:last-child,
.panel>#add_participants_model.table-responsive:last-child>#add_participants_model.table:last-child>tfoot:last-child>tr:last-child,
.panel>#add_participants_model.table:last-child>tbody:last-child>tr:last-child,
.panel>#add_participants_model.table:last-child>tfoot:last-child>tr:last-child {
  border-bottom-right-radius: 3px;
  border-bottom-left-radius: 3px
}

.panel>#add_participants_model.table-responsive:last-child>#add_participants_model.table:last-child>tbody:last-child>tr:last-child td:first-child,
.panel>#add_participants_model.table-responsive:last-child>#add_participants_model.table:last-child>tbody:last-child>tr:last-child th:first-child,
.panel>#add_participants_model.table-responsive:last-child>#add_participants_model.table:last-child>tfoot:last-child>tr:last-child td:first-child,
.panel>#add_participants_model.table-responsive:last-child>#add_participants_model.table:last-child>tfoot:last-child>tr:last-child th:first-child,
.panel>#add_participants_model.table:last-child>tbody:last-child>tr:last-child td:first-child,
.panel>#add_participants_model.table:last-child>tbody:last-child>tr:last-child th:first-child,
.panel>#add_participants_model.table:last-child>tfoot:last-child>tr:last-child td:first-child,
.panel>#add_participants_model.table:last-child>tfoot:last-child>tr:last-child th:first-child {
  border-bottom-left-radius: 3px
}

.panel>#add_participants_model.table-responsive:last-child>#add_participants_model.table:last-child>tbody:last-child>tr:last-child td:last-child,
.panel>#add_participants_model.table-responsive:last-child>#add_participants_model.table:last-child>tbody:last-child>tr:last-child th:last-child,
.panel>#add_participants_model.table-responsive:last-child>#add_participants_model.table:last-child>tfoot:last-child>tr:last-child td:last-child,
.panel>#add_participants_model.table-responsive:last-child>#add_participants_model.table:last-child>tfoot:last-child>tr:last-child th:last-child,
.panel>#add_participants_model.table:last-child>tbody:last-child>tr:last-child td:last-child,
.panel>#add_participants_model.table:last-child>tbody:last-child>tr:last-child th:last-child,
.panel>#add_participants_model.table:last-child>tfoot:last-child>tr:last-child td:last-child,
.panel>#add_participants_model.table:last-child>tfoot:last-child>tr:last-child th:last-child {
  border-bottom-right-radius: 3px
}

.panel>.panel-body+#add_participants_model.table,
.panel>.panel-body+#add_participants_model.table-responsive,
.panel>#add_participants_model.table+.panel-body,
.panel>#add_participants_model.table-responsive+.panel-body {
  border-top: 1px solid #ddd
}

.panel>#add_participants_model.table>tbody:first-child>tr:first-child td,
.panel>#add_participants_model.table>tbody:first-child>tr:first-child th {
  border-top: 0
}

.panel>#add_participants_model.table-bordered,
.panel>#add_participants_model.table-responsive>#add_participants_model.table-bordered {
  border: 0
}

.panel>#add_participants_model.table-bordered>tbody>tr>td:first-child,
.panel>#add_participants_model.table-bordered>tbody>tr>th:first-child,
.panel>#add_participants_model.table-bordered>tfoot>tr>td:first-child,
.panel>#add_participants_model.table-bordered>tfoot>tr>th:first-child,
.panel>#add_participants_model.table-bordered>thead>tr>td:first-child,
.panel>#add_participants_model.table-bordered>thead>tr>th:first-child,
.panel>#add_participants_model.table-responsive>#add_participants_model.table-bordered>tbody>tr>td:first-child,
.panel>#add_participants_model.table-responsive>#add_participants_model.table-bordered>tbody>tr>th:first-child,
.panel>#add_participants_model.table-responsive>#add_participants_model.table-bordered>tfoot>tr>td:first-child,
.panel>#add_participants_model.table-responsive>#add_participants_model.table-bordered>tfoot>tr>th:first-child,
.panel>#add_participants_model.table-responsive>#add_participants_model.table-bordered>thead>tr>td:first-child,
.panel>#add_participants_model.table-responsive>#add_participants_model.table-bordered>thead>tr>th:first-child {
  border-left: 0
}

.panel>#add_participants_model.table-bordered>tbody>tr>td:last-child,
.panel>#add_participants_model.table-bordered>tbody>tr>th:last-child,
.panel>#add_participants_model.table-bordered>tfoot>tr>td:last-child,
.panel>#add_participants_model.table-bordered>tfoot>tr>th:last-child,
.panel>#add_participants_model.table-bordered>thead>tr>td:last-child,
.panel>#add_participants_model.table-bordered>thead>tr>th:last-child,
.panel>#add_participants_model.table-responsive>#add_participants_model.table-bordered>tbody>tr>td:last-child,
.panel>#add_participants_model.table-responsive>#add_participants_model.table-bordered>tbody>tr>th:last-child,
.panel>#add_participants_model.table-responsive>#add_participants_model.table-bordered>tfoot>tr>td:last-child,
.panel>#add_participants_model.table-responsive>#add_participants_model.table-bordered>tfoot>tr>th:last-child,
.panel>#add_participants_model.table-responsive>#add_participants_model.table-bordered>thead>tr>td:last-child,
.panel>#add_participants_model.table-responsive>#add_participants_model.table-bordered>thead>tr>th:last-child {
  border-right: 0
}

.panel>#add_participants_model.table-bordered>tbody>tr:first-child>td,
.panel>#add_participants_model.table-bordered>tbody>tr:first-child>th,
.panel>#add_participants_model.table-bordered>thead>tr:first-child>td,
.panel>#add_participants_model.table-bordered>thead>tr:first-child>th,
.panel>#add_participants_model.table-responsive>#add_participants_model.table-bordered>tbody>tr:first-child>td,
.panel>#add_participants_model.table-responsive>#add_participants_model.table-bordered>tbody>tr:first-child>th,
.panel>#add_participants_model.table-responsive>#add_participants_model.table-bordered>thead>tr:first-child>td,
.panel>#add_participants_model.table-responsive>#add_participants_model.table-bordered>thead>tr:first-child>th {
  border-bottom: 0
}

.panel>#add_participants_model.table-bordered>tbody>tr:last-child>td,
.panel>#add_participants_model.table-bordered>tbody>tr:last-child>th,
.panel>#add_participants_model.table-bordered>tfoot>tr:last-child>td,
.panel>#add_participants_model.table-bordered>tfoot>tr:last-child>th,
.panel>#add_participants_model.table-responsive>#add_participants_model.table-bordered>tbody>tr:last-child>td,
.panel>#add_participants_model.table-responsive>#add_participants_model.table-bordered>tbody>tr:last-child>th,
.panel>#add_participants_model.table-responsive>#add_participants_model.table-bordered>tfoot>tr:last-child>td,
.panel>#add_participants_model.table-responsive>#add_participants_model.table-bordered>tfoot>tr:last-child>th {
  border-bottom: 0
}

.panel>#add_participants_model.table-responsive {
  margin-bottom: 0;
  border: 0
}

.panel-group {
  margin-bottom: 20px
}

.panel-group .panel {
  margin-bottom: 0;
  border-radius: 4px
}

.panel-group .panel+.panel {
  margin-top: 5px
}

.panel-group .panel-heading {
  border-bottom: 0
}

.panel-group .panel-heading+.panel-collapse>.list-group,
.panel-group .panel-heading+.panel-collapse>.panel-body {
  border-top: 1px solid #ddd
}

.panel-group .panel-footer {
  border-top: 0
}

.panel-group .panel-footer+.panel-collapse .panel-body {
  border-bottom: 1px solid #ddd
}

.panel-default {
  border-color: #ddd
}

.panel-default>.panel-heading {
  color: #333;
  background-color: #f5f5f5;
  border-color: #ddd
}

.panel-default>.panel-heading+.panel-collapse>.panel-body {
  border-top-color: #ddd
}

.panel-default>.panel-heading .badge {
  color: #f5f5f5;
  background-color: #333
}

.panel-default>.panel-footer+.panel-collapse>.panel-body {
  border-bottom-color: #ddd
}

.panel-primary {
  border-color: #337ab7
}

.panel-primary>.panel-heading {
  color: #fff;
  background-color: #337ab7;
  border-color: #337ab7
}

.panel-primary>.panel-heading+.panel-collapse>.panel-body {
  border-top-color: #337ab7
}

.panel-primary>.panel-heading .badge {
  color: #337ab7;
  background-color: #fff
}

.panel-primary>.panel-footer+.panel-collapse>.panel-body {
  border-bottom-color: #337ab7
}

.panel-success {
  border-color: #d6e9c6
}

.panel-success>.panel-heading {
  color: #3c763d;
  background-color: #dff0d8;
  border-color: #d6e9c6
}

.panel-success>.panel-heading+.panel-collapse>.panel-body {
  border-top-color: #d6e9c6
}

.panel-success>.panel-heading .badge {
  color: #dff0d8;
  background-color: #3c763d
}

.panel-success>.panel-footer+.panel-collapse>.panel-body {
  border-bottom-color: #d6e9c6
}

.panel-info {
  border-color: #bce8f1
}

.panel-info>.panel-heading {
  color: #31708f;
  background-color: #d9edf7;
  border-color: #bce8f1
}

.panel-info>.panel-heading+.panel-collapse>.panel-body {
  border-top-color: #bce8f1
}

.panel-info>.panel-heading .badge {
  color: #d9edf7;
  background-color: #31708f
}

.panel-info>.panel-footer+.panel-collapse>.panel-body {
  border-bottom-color: #bce8f1
}

.panel-warning {
  border-color: #faebcc
}

.panel-warning>.panel-heading {
  color: #8a6d3b;
  background-color: #fcf8e3;
  border-color: #faebcc
}

.panel-warning>.panel-heading+.panel-collapse>.panel-body {
  border-top-color: #faebcc
}

.panel-warning>.panel-heading .badge {
  color: #fcf8e3;
  background-color: #8a6d3b
}

.panel-warning>.panel-footer+.panel-collapse>.panel-body {
  border-bottom-color: #faebcc
}

.panel-danger {
  border-color: #ebccd1
}

.panel-danger>.panel-heading {
  color: #a94442;
  background-color: #f2dede;
  border-color: #ebccd1
}

.panel-danger>.panel-heading+.panel-collapse>.panel-body {
  border-top-color: #ebccd1
}

.panel-danger>.panel-heading .badge {
  color: #f2dede;
  background-color: #a94442
}

.panel-danger>.panel-footer+.panel-collapse>.panel-body {
  border-bottom-color: #ebccd1
}

.embed-responsive {
  position: relative;
  display: block;
  height: 0;
  padding: 0;
  overflow: hidden
}

.embed-responsive .embed-responsive-item,
.embed-responsive embed,
.embed-responsive iframe,
.embed-responsive object,
.embed-responsive video {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border: 0
}

.embed-responsive-16by9 {
  padding-bottom: 56.25%
}

.embed-responsive-4by3 {
  padding-bottom: 75%
}

.well {
  min-height: 20px;
  padding: 19px;
  margin-bottom: 20px;
  background-color: #f5f5f5;
  border: 1px solid #e3e3e3;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05)
}

.well blockquote {
  border-color: #ddd;
  border-color: rgba(0, 0, 0, .15)
}

.well-lg {
  padding: 24px;
  border-radius: 6px
}

.well-sm {
  padding: 9px;
  border-radius: 3px
}

.close {
  float: right;
  font-size: 21px;
  font-weight: 700;
  line-height: 1;
  color: #000;
  text-shadow: 0 1px 0 #fff;
  filter: alpha(opacity=20);
  opacity: .2
}

.close:focus,
.close:hover {
  color: #000;
  text-decoration: none;
  cursor: pointer;
  filter: alpha(opacity=50);
  opacity: .5
}

button.close {
  -webkit-appearance: none;
  padding: 0;
  cursor: pointer;
  background: 0 0;
  border: 0
}

.modal-open {
  overflow: hidden
}

.modal {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1050;
  display: none;
  overflow: hidden;
  -webkit-overflow-scrolling: touch;
  outline: 0
}

.modal.fade .modal-dialog {
  -webkit-transition: -webkit-transform .3s ease-out;
  -o-transition: -o-transform .3s ease-out;
  transition: transform .3s ease-out;
  -webkit-transform: translate(0, -25%);
  -ms-transform: translate(0, -25%);
  -o-transform: translate(0, -25%);
  transform: translate(0, -25%)
}

.modal.in .modal-dialog {
  -webkit-transform: translate(0, 0);
  -ms-transform: translate(0, 0);
  -o-transform: translate(0, 0);
  transform: translate(0, 0)
}

.modal-open .modal {
  overflow-x: hidden;
  overflow-y: auto
}

.modal-dialog {
  position: relative;
  width: auto;
  margin: 10px
}

.modal-content {
  position: relative;
  background-color: #fff;
  -webkit-background-clip: padding-box;
  background-clip: padding-box;
  border: 1px solid #999;
  border: 1px solid rgba(0, 0, 0, .2);
  border-radius: 6px;
  outline: 0;
  -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
  box-shadow: 0 3px 9px rgba(0, 0, 0, .5)
}

.modal-backdrop {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1040;
  background-color: #000
}

.modal-backdrop.fade {
  filter: alpha(opacity=0);
  opacity: 0
}

.modal-backdrop.in {
  filter: alpha(opacity=50);
  opacity: .5
}

.modal-header {
  padding: 15px;
  border-bottom: 1px solid #e5e5e5
}

.modal-header .close {
  margin-top: -2px
}

.modal-title {
  margin: 0;
  line-height: 1.42857143
}

.modal-body {
  position: relative;
  padding: 15px
}

.modal-footer {
  padding: 15px;
  text-align: right;
  border-top: 1px solid #e5e5e5
}

.modal-footer #add_participants_model.btn+#add_participants_model.btn {
  margin-bottom: 0;
  margin-left: 5px
}

.modal-footer #add_participants_model.btn-group #add_participants_model.btn+#add_participants_model.btn {
  margin-left: -1px
}

.modal-footer #add_participants_model.btn-block+#add_participants_model.btn-block {
  margin-left: 0
}

.modal-scrollbar-measure {
  position: absolute;
  top: -9999px;
  width: 50px;
  height: 50px;
  overflow: scroll
}

@media (min-width:768px) {
  .modal-dialog {
    width: 600px;
    margin: 30px auto
  }
  .modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
    box-shadow: 0 5px 15px rgba(0, 0, 0, .5)
  }
  .modal-sm {
    width: 300px
  }
}

@media (min-width:992px) {
  .modal-lg {
    width: 900px
  }
}

.tooltip {
  position: absolute;
  z-index: 1070;
  display: block;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 12px;
  font-style: normal;
  font-weight: 400;
  line-height: 1.42857143;
  text-align: left;
  text-align: start;
  text-decoration: none;
  text-shadow: none;
  text-transform: none;
  letter-spacing: normal;
  word-break: normal;
  word-spacing: normal;
  word-wrap: normal;
  white-space: normal;
  filter: alpha(opacity=0);
  opacity: 0;
  line-break: auto
}

.tooltip.in {
  filter: alpha(opacity=90);
  opacity: .9
}

.tooltip.top {
  padding: 5px 0;
  margin-top: -3px
}

.tooltip.right {
  padding: 0 5px;
  margin-left: 3px
}

.tooltip.bottom {
  padding: 5px 0;
  margin-top: 3px
}

.tooltip.left {
  padding: 0 5px;
  margin-left: -3px
}

.tooltip-inner {
  max-width: 200px;
  padding: 3px 8px;
  color: #fff;
  text-align: center;
  background-color: #000;
  border-radius: 4px
}

.tooltip-arrow {
  position: absolute;
  width: 0;
  height: 0;
  border-color: transparent;
  border-style: solid
}

.tooltip.top .tooltip-arrow {
  bottom: 0;
  left: 50%;
  margin-left: -5px;
  border-width: 5px 5px 0;
  border-top-color: #000
}

.tooltip.top-left .tooltip-arrow {
  right: 5px;
  bottom: 0;
  margin-bottom: -5px;
  border-width: 5px 5px 0;
  border-top-color: #000
}

.tooltip.top-right .tooltip-arrow {
  bottom: 0;
  left: 5px;
  margin-bottom: -5px;
  border-width: 5px 5px 0;
  border-top-color: #000
}

.tooltip.right .tooltip-arrow {
  top: 50%;
  left: 0;
  margin-top: -5px;
  border-width: 5px 5px 5px 0;
  border-right-color: #000
}

.tooltip.left .tooltip-arrow {
  top: 50%;
  right: 0;
  margin-top: -5px;
  border-width: 5px 0 5px 5px;
  border-left-color: #000
}

.tooltip.bottom .tooltip-arrow {
  top: 0;
  left: 50%;
  margin-left: -5px;
  border-width: 0 5px 5px;
  border-bottom-color: #000
}

.tooltip.bottom-left .tooltip-arrow {
  top: 0;
  right: 5px;
  margin-top: -5px;
  border-width: 0 5px 5px;
  border-bottom-color: #000
}

.tooltip.bottom-right .tooltip-arrow {
  top: 0;
  left: 5px;
  margin-top: -5px;
  border-width: 0 5px 5px;
  border-bottom-color: #000
}

.popover {
  position: absolute;
  top: 0;
  left: 0;
  z-index: 1060;
  display: none;
  max-width: 276px;
  padding: 1px;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 14px;
  font-style: normal;
  font-weight: 400;
  line-height: 1.42857143;
  text-align: left;
  text-align: start;
  text-decoration: none;
  text-shadow: none;
  text-transform: none;
  letter-spacing: normal;
  word-break: normal;
  word-spacing: normal;
  word-wrap: normal;
  white-space: normal;
  background-color: #fff;
  -webkit-background-clip: padding-box;
  background-clip: padding-box;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, .2);
  border-radius: 6px;
  -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
  box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
  line-break: auto
}

.popover.top {
  margin-top: -10px
}

.popover.right {
  margin-left: 10px
}

.popover.bottom {
  margin-top: 10px
}

.popover.left {
  margin-left: -10px
}

.popover-title {
  padding: 8px 14px;
  margin: 0;
  font-size: 14px;
  background-color: #f7f7f7;
  border-bottom: 1px solid #ebebeb;
  border-radius: 5px 5px 0 0
}

.popover-content {
  padding: 9px 14px
}

.popover>.arrow,
.popover>.arrow:after {
  position: absolute;
  display: block;
  width: 0;
  height: 0;
  border-color: transparent;
  border-style: solid
}

.popover>.arrow {
  border-width: 11px
}

.popover>.arrow:after {
  content: "";
  border-width: 10px
}

.popover.top>.arrow {
  bottom: -11px;
  left: 50%;
  margin-left: -11px;
  border-top-color: #999;
  border-top-color: rgba(0, 0, 0, .25);
  border-bottom-width: 0
}

.popover.top>.arrow:after {
  bottom: 1px;
  margin-left: -10px;
  content: " ";
  border-top-color: #fff;
  border-bottom-width: 0
}

.popover.right>.arrow {
  top: 50%;
  left: -11px;
  margin-top: -11px;
  border-right-color: #999;
  border-right-color: rgba(0, 0, 0, .25);
  border-left-width: 0
}

.popover.right>.arrow:after {
  bottom: -10px;
  left: 1px;
  content: " ";
  border-right-color: #fff;
  border-left-width: 0
}

.popover.bottom>.arrow {
  top: -11px;
  left: 50%;
  margin-left: -11px;
  border-top-width: 0;
  border-bottom-color: #999;
  border-bottom-color: rgba(0, 0, 0, .25)
}

.popover.bottom>.arrow:after {
  top: 1px;
  margin-left: -10px;
  content: " ";
  border-top-width: 0;
  border-bottom-color: #fff
}

.popover.left>.arrow {
  top: 50%;
  right: -11px;
  margin-top: -11px;
  border-right-width: 0;
  border-left-color: #999;
  border-left-color: rgba(0, 0, 0, .25)
}

.popover.left>.arrow:after {
  right: 1px;
  bottom: -10px;
  content: " ";
  border-right-width: 0;
  border-left-color: #fff
}

.carousel {
  position: relative
}

.carousel-inner {
  position: relative;
  width: 100%;
  overflow: hidden
}

.carousel-inner>.item {
  position: relative;
  display: none;
  -webkit-transition: .6s ease-in-out left;
  -o-transition: .6s ease-in-out left;
  transition: .6s ease-in-out left
}

.carousel-inner>.item>a>img,
.carousel-inner>.item>img {
  line-height: 1
}

@media all and (transform-3d),
(-webkit-transform-3d) {
  .carousel-inner>.item {
    -webkit-transition: -webkit-transform .6s ease-in-out;
    -o-transition: -o-transform .6s ease-in-out;
    transition: transform .6s ease-in-out;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-perspective: 1000px;
    perspective: 1000px
  }
  .carousel-inner>.item.active.right,
  .carousel-inner>.item.next {
    left: 0;
    -webkit-transform: translate3d(100%, 0, 0);
    transform: translate3d(100%, 0, 0)
  }
  .carousel-inner>.item.active.left,
  .carousel-inner>.item.prev {
    left: 0;
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0)
  }
  .carousel-inner>.item.active,
  .carousel-inner>.item.next.left,
  .carousel-inner>.item.prev.right {
    left: 0;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0)
  }
}

.carousel-inner>.active,
.carousel-inner>.next,
.carousel-inner>.prev {
  display: block
}

.carousel-inner>.active {
  left: 0
}

.carousel-inner>.next,
.carousel-inner>.prev {
  position: absolute;
  top: 0;
  width: 100%
}

.carousel-inner>.next {
  left: 100%
}

.carousel-inner>.prev {
  left: -100%
}

.carousel-inner>.next.left,
.carousel-inner>.prev.right {
  left: 0
}

.carousel-inner>.active.left {
  left: -100%
}

.carousel-inner>.active.right {
  left: 100%
}

.carousel-control {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  width: 15%;
  font-size: 20px;
  color: #fff;
  text-align: center;
  text-shadow: 0 1px 2px rgba(0, 0, 0, .6);
  background-color: rgba(0, 0, 0, 0);
  filter: alpha(opacity=50);
  opacity: .5
}

.carousel-control.left {
  background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, .5) 0, rgba(0, 0, 0, .0001) 100%);
  background-image: -o-linear-gradient(left, rgba(0, 0, 0, .5) 0, rgba(0, 0, 0, .0001) 100%);
  background-image: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, .5)), to(rgba(0, 0, 0, .0001)));
  background-image: linear-gradient(to right, rgba(0, 0, 0, .5) 0, rgba(0, 0, 0, .0001) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#80000000', endColorstr='#00000000', GradientType=1);
  background-repeat: repeat-x
}

.carousel-control.right {
  right: 0;
  left: auto;
  background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, .0001) 0, rgba(0, 0, 0, .5) 100%);
  background-image: -o-linear-gradient(left, rgba(0, 0, 0, .0001) 0, rgba(0, 0, 0, .5) 100%);
  background-image: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, .0001)), to(rgba(0, 0, 0, .5)));
  background-image: linear-gradient(to right, rgba(0, 0, 0, .0001) 0, rgba(0, 0, 0, .5) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1);
  background-repeat: repeat-x
}

.carousel-control:focus,
.carousel-control:hover {
  color: #fff;
  text-decoration: none;
  filter: alpha(opacity=90);
  outline: 0;
  opacity: .9
}

.carousel-control .glyphicon-chevron-left,
.carousel-control .glyphicon-chevron-right,
.carousel-control .icon-next,
.carousel-control .icon-prev {
  position: absolute;
  top: 50%;
  z-index: 5;
  display: inline-block;
  margin-top: -10px
}

.carousel-control .glyphicon-chevron-left,
.carousel-control .icon-prev {
  left: 50%;
  margin-left: -10px
}

.carousel-control .glyphicon-chevron-right,
.carousel-control .icon-next {
  right: 50%;
  margin-right: -10px
}

.carousel-control .icon-next,
.carousel-control .icon-prev {
  width: 20px;
  height: 20px;
  font-family: serif;
  line-height: 1
}

.carousel-control .icon-prev:before {
  content: '\2039'
}

.carousel-control .icon-next:before {
  content: '\203a'
}

.carousel-indicators {
  position: absolute;
  bottom: 10px;
  left: 50%;
  z-index: 15;
  width: 60%;
  padding-left: 0;
  margin-left: -30%;
  text-align: center;
  list-style: none
}

.carousel-indicators li {
  display: inline-block;
  width: 10px;
  height: 10px;
  margin: 1px;
  text-indent: -999px;
  cursor: pointer;
  background-color: #000\9;
  background-color: rgba(0, 0, 0, 0);
  border: 1px solid #fff;
  border-radius: 10px
}

.carousel-indicators .active {
  width: 12px;
  height: 12px;
  margin: 0;
  background-color: #fff
}

.carousel-caption {
  position: absolute;
  right: 15%;
  bottom: 20px;
  left: 15%;
  z-index: 10;
  padding-top: 20px;
  padding-bottom: 20px;
  color: #fff;
  text-align: center;
  text-shadow: 0 1px 2px rgba(0, 0, 0, .6)
}

.carousel-caption #add_participants_model.btn {
  text-shadow: none
}

@media screen and (min-width:768px) {
  .carousel-control .glyphicon-chevron-left,
  .carousel-control .glyphicon-chevron-right,
  .carousel-control .icon-next,
  .carousel-control .icon-prev {
    width: 30px;
    height: 30px;
    margin-top: -10px;
    font-size: 30px
  }
  .carousel-control .glyphicon-chevron-left,
  .carousel-control .icon-prev {
    margin-left: -10px
  }
  .carousel-control .glyphicon-chevron-right,
  .carousel-control .icon-next {
    margin-right: -10px
  }
  .carousel-caption {
    right: 20%;
    left: 20%;
    padding-bottom: 30px
  }
  .carousel-indicators {
    bottom: 20px
  }
}

#add_participants_model.btn-group-vertical>#add_participants_model.btn-group:after,
#add_participants_model.btn-group-vertical>#add_participants_model.btn-group:before,
#add_participants_model.btn-toolbar:after,
#add_participants_model.btn-toolbar:before,
.clearfix:after,
.clearfix:before,
.container-fluid:after,
.container-fluid:before,
.container:after,
.container:before,
.dl-horizontal dd:after,
.dl-horizontal dd:before,
#add_participants_model.form-horizontal #add_participants_model.form-group:after,
#add_participants_model.form-horizontal #add_participants_model.form-group:before,
.modal-footer:after,
.modal-footer:before,
.modal-header:after,
.modal-header:before,
#add_participants_model.nav:after,
#add_participants_model.nav:before,
#add_participants_model.navbar-collapse:after,
#add_participants_model.navbar-collapse:before,
#add_participants_model.navbar-header:after,
#add_participants_model.navbar-header:before,
#add_participants_model.navbar:after,
#add_participants_model.navbar:before,
.pager:after,
.pager:before,
.panel-body:after,
.panel-body:before,
.row:after,
.row:before {
  display: table;
  content: " "
}

#add_participants_model.btn-group-vertical>#add_participants_model.btn-group:after,
#add_participants_model.btn-toolbar:after,
.clearfix:after,
.container-fluid:after,
.container:after,
.dl-horizontal dd:after,
#add_participants_model.form-horizontal #add_participants_model.form-group:after,
.modal-footer:after,
.modal-header:after,
#add_participants_model.nav:after,
#add_participants_model.navbar-collapse:after,
#add_participants_model.navbar-header:after,
#add_participants_model.navbar:after,
.pager:after,
.panel-body:after,
.row:after {
  clear: both
}

</style>
    </head>
	<body> <?Php $c_id = $this->session->userdata('client_id');
				$this->db->select('logo,first_name')->from('tbl_client');
				$this->db->where('client_id',$c_id);
				$res = $this->db->get();
				$first_name = $res->row()->first_name;				
				$logo = $res->row()->logo;	?>
		<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar closed-sidebar-mobile closed-sidebar">
     <style>
.position-relative{
	color:#3f6ad8;
	font-weight: 800;
}
</style>			
			<div class="app-main__outer">
                <div class="app-main__inner p-0">
					<div class="app-inner-layout">
					<?php foreach($patient_info as $row){ ?>
					  <div class="app-inner-layout__header text-white bg-premium-dark">
                            <div class="app-page-title">
                                <div class="page-title-wrapper">
                                    <div class="page-title-heading">
                                        <div class="page-title-icon">
                                            <!--<i class="fa fa-user icon-gradient bg-mixed-hopes">
                                            </i>-->
											 <?php if($row['photo'] == '') {
                                         $photo = ($row['gender'] == 'male') ? 'img/NoImageMale_New.png' : 'img/NoImageFemale_New.png';	
			                             } else {
										$photo = 'uploads/patient/'.$row['photo'];
										}
										?>
			                             <img src="<?php echo base_url().$photo;?>" width="40" class="rounded-circle" alt="" id="OpenImgUpload"> 
			                              <input type="file" id="photo_upload" name="photo_upload" style="display:none;"/> 
										   <input type="hidden" name="photo_hidden" id="photo_img" class="form-control" />							
                                           <input type="hidden" name="patient_id" value="<?php echo $row['patient_id']?>" class="form-control">
						    	            <div style="display:none" id="photoloader"><p style="font-size:12px;">Uploding Please Wait...</p></div>
								 
                                        </div>
                                        <div><?php echo $row['first_name']; ?> ( <span style="color:yellow"><?php echo $row['patient_code']; ?></span> - <span style="color:red"><?php echo $row['age']; ?></span> )
                                            <div class="page-title-subheading">Mobile No : <?php echo $row['mobile_no']; ?>
                                            </div>
                                        </div>
                                    </div>
									<div class="page-title-actions">
                                        <a href="<?Php echo base_url().'client/schedule/appointment/pat/'.$row['patient_id']; ?>" data-toggle="tooltip" data-placement="top" title="Add Appointment"><button type="button" id="Tooltip-123" class="btn-pill mr-3 btn btn-warning">
                                            <i class="fa fa-calendar"></i>
                                        </button></a>
										<a href="<?php echo base_url().'client/invoice/add/Pt/'.$row['patient_id']; ?>" data-toggle="tooltip" data-placement="top" title="Make Invoice" ><button type="button" id="Tooltip-123" class="btn-pill mr-3 btn btn-info">
                                            <i class="fa fa-file"></i>
                                        </button></a>
										<a class="edit" href="<?php echo base_url().'client/reports/report_session/'.$row['patient_id']; ?>" data-toggle="tooltip" data-placement="top" title="Daily Register"><button type="button" id="Tooltip-123" class="btn-pill mr-3 btn btn-success">
                                            <i class="fa fa-edit"></i>
                                        </button></a>
                                    </div>
                                </div>
                            </div></div>
							<div class="app-inner-layout__wrapper">
							<div class="col-md-12 col-lg-10 col-xl-10 card">
								<div id="myNav" class="overlay" onclick=initJitsiMeet();>
              <div class="overlay-content">
                <a href="#" id="chatroom1" onclick=initJitsiMeet();>Your virtual session is ready!!!</a>
                <img src="https://physioplustech.in/frontend_assets/img/New%20Purple%20243x68px%20beta.png"  alt="Medico Logo">
    <a href="#" id="chatroom" onclick=initJitsiMeet();>Click to Enter Telehealth Room</a>


  </div>
      
    <script>
 isJitsiVideo = false;
custJitsiAPI = undefined;
function initJitsiMeet() {
document.getElementById("chatroom").style.display = "none";
document.getElementById("chatroom1").style.display = "none";
document.getElementById("myNav").style.display = "none";


  if(!isJitsiVideo && custJitsiAPI == undefined) {
    console.log('Initializing Jitsi Meet...');
    var domain = "conference.physioplustech.in";
    var options = {
        roomName: <?php echo json_encode($chatroom); ?>,
        height: window.innerHeight,
        width: "100%",
		jwt:'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJqa0AxMjMiLCJpc3MiOiJqa0AxMjMiLCJyb29tIjoiKiJ9.m1dl3BLjg4f6lHb0mHV87AICc3dtJVeqv0L996WauvI',
        parentNode: document.getElementById("click4help-video"),
    }
    custJitsiAPI= new JitsiMeetExternalAPI(domain, options);
     //custJitsiAPI.executeCommand('displayName', 'Customer');
     //custJitsiAPI.executeCommand('toggleChat');

    //custJitsiAPI.addListener('readyToClose', () => {console.log('call hung up fron add Listener Event');});
    custJitsiAPI.addEventListener('readyToClose',  function(){
                                              console.log('call hung up fron add Event Listener Event');
                                              alert('call hung up fron add Event Listener Event');
                                              });
    //custJitsiAPI.on('readyToClose', () => {console.log('call hung up fron ON event');});
    isJitsiVideo = true;
  }
}
 document.getElementById("myNav").style.width = "100%";
</script>
</div></br><button style="width:200px; float:right;" type="submit" id="add_participants" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-pill cis-border-inner btn-primary" style="margin:1%"> + Add Participants</button></br>
                           <div id ="click4help-video"></div>
                               <div class="app-inner-layout__top-pane">
                                        <div class="pane-left">
                                            <div class="mobile-app-menu-btn">
                                                <button type="button" class="hamburger hamburger--elastic">
                                                    <span class="hamburger-box">
                                                        <span class="hamburger-inner"></span>
                                                    </span>
                                                </button>
                                            </div>
                                       </div>
                                 </div><div class="bg-white">
								 <style>
								 .nav {
									   display: table;
									   width: 100%;
									   table-layout: fixed;
									   text-align: center;
								 }
								 </style>
                                 <div class="tab-content">
									<div class="tab-pane active show" id="tab-faq-1">
									   <div class="main-card mb-3">
                                        <div class="card-header">
                                            <div class="btn-actions-pane-center">
												<div class="nav">        
													<a data-toggle="tab" href="#basic" class="border-0 btn-transition btn btn-outline-primary show active">Basic details</a>
                                                    &nbsp;&nbsp;<a data-toggle="tab" href="#other" class="mr-1 ml-1 border-0 btn-transition btn btn-outline-primary show">Other Details</a>
                                                    &nbsp;&nbsp;<a data-toggle="tab" href="#Referral" class="border-0 btn-transition btn btn-outline-primary show">Referral Details</a>
                                                    &nbsp;&nbsp;<a data-toggle="tab" href="#communication" class="border-0 btn-transition btn btn-outline-primary show">Communication</a>
                                                </div>
											</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content">
											   <div class="tab-pane show active" id="basic" role="tabpanel">
												<form action="<?php echo base_url().'client/patient/edit_patient' ?>" method="post"  id="basicvalidations"  >
												<div class="row">
												<div class="col-md-4">
												<input type="hidden" name="edit_pinfo" value="Y"/>
												<input type="hidden" name="edit_pcinfo" value="X"/>
												<input type="hidden" name="patient_id" value="<?php echo $row['patient_id'] ?>"/>
												<input type="hidden" class="form-control" name="appoint_date" id="appoint_date" value="<?php echo $row['appoint_date']; ?>">
												<input type="hidden" name="dateob" value="<?php echo date('d-m-Y',strtotime($row['dob'])); ?>" id="dateob" />
												<div class="input-group">
														<div class="position-relative form-group"><label for="bill_no" class="">First Name</label>
																<input placeholder="First Name" name="first_name" style="width:250px;" id="first_name" value="<?php echo $row['first_name']; ?>" type="text" class="form-control">
												</div> 
												</div> 
												</div>	
												<div class="col-md-4">	
												<div class="input-group">
														<div class="position-relative form-group"><label for="bill_no" class="">Last Name</label>
																<input placeholder="Last Name" name="last_name" style="width:250px;" id="last_name" value="<?php echo $row['last_name']; ?>" type="text" class="form-control">
												</div>											
												</div>											
												</div>
												<div class="col-md-4">
												<div class="input-group">
                                                <div class="position-relative form-group"><label for="bill_no" class="">DOB</label>
																<input type="text" class="form-control dob" style="width:250px;" Placeholder="DOB" name="dob" id="dob" value="<?php if($row['dob'] == '0000-00-00'){  } else { echo date('d-m-Y',strtotime($row['dob'])); }?>" autocomplete="off" data-toggle="datepicker-year">
												</div>	
												</div>	
												</div>												
											</div>
											<div class="row">
												<div class="col-md-4">	
												<div class="input-group">
														<div class="position-relative form-group"><label for="bill_no" class="">Age</label>
																<input placeholder="Age" type="text" name="age" style="width:250px;" id="age" value="<?php echo $row['age']; ?>" class="form-control">
												</div>											
												</div>											
												</div>											
											
											<div class="col-md-4">
											<div class="position-relative form-group"><label for="bill_no" class="">Gender</label>
												</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-shadow btn-outline-primary">
                                                        <input type="radio" name="gender" id="option111" value="male" <?php if($row['gender']=="male" || $row['gender']=="male") { echo "checked"; } else { } ?>  > 
                                                       Male
                                                    </label>
                                                    <label class="btn btn-shadow btn-outline-primary">
                                                        <input type="radio" name="gender" id="option122" value="female" <?php if($row['gender']=="female" || $row['gender']=="Female") { echo "checked"; } else { } ?> > 
                                                        Female
                                                    </label>
													</div> 
                                             </div>
                                             </div>
                                             <div class="col-md-4">
											<div class="position-relative form-group"><label for="bill_no" class="">Patient Type</label>
																 </br>  <div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-shadow btn-outline-primary">
                                                        <input type="radio" name="category" id="option1" value="1" <?php if($row['home_visit']=="1") { echo "checked"; } else { } ?> autocomplete="off" > 
                                                       OP Patient
                                                    </label>
                                                    <label class="btn btn-shadow btn-outline-primary">
                                                        <input type="radio" name="category" id="option2" value="2" autocomplete="off"<?php if($row['home_visit']=="2") { echo "checked"; } else { } ?>> 
                                                        Home Patient
                                                    </label>
													</div> 
                                             </div>
                                             </div>
                                            </div>
											<div class="row">
												<div class="col-md-4">
												<div class="input-group">
														<div class="position-relative form-group"><label for="bill_no" class="">Clinic Reference No</label>
																<input placeholder="Clinic Reference Number" style="width:250px;" name="ref_no" id="ref_no" value="<?php echo $row['ref_no']; ?>" type="text" class="form-control">
												</div> 
												</div> 
												</div>	
												<div class="col-md-4">	
												<div class="input-group">
														<div class="position-relative form-group"><label for="bill_no" class="">Height</label>
																<input placeholder="Height" type="text" style="width:250px;" name="height" id="height" value="<?php echo $row['height']; ?>" class="form-control">
												</div>											
												</div>											
												</div>
											    <div class="col-md-4">
												<div class="input-group">
														<div class="position-relative form-group"><label for="bill_no" class="">Weight</label>
																<input placeholder="Weight" type="text" style="width:250px;" name="weight" id="weight" onchange="calculateBmi()" value="<?php echo $row['weight']; ?>" class="form-control">
												</div> 
												</div> 
												</div>												
											</div>
											<div class="row">
												<div class="col-md-4">	
												<div class="input-group">
														<div class="position-relative form-group"><label for="bill_no" class="">BMI</label>
																<input placeholder="BMI" type="text" style="width:250px;" class="form-control" name="bmi" id="bmi" readonly value="<?php echo $row['bmi']; ?>">
												    </div>
													 <div id="thin" style="display:none" class="alert alert-success"> That you are too thin. </div>
													 <div id="healthy" style="display:none" class="alert alert-success"> That you are healthy. </div>
													 <div id="overwt" style="display:none" class="alert alert-danger"> That you have overweight. </div>
												</div>											
												</div>											
											<div class="col-md-4">
                                                <div class="position-relative form-group"><label for="bill_no" class="">Maritial Status</label>
													</br>			<div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-shadow btn-outline-primary">
                                                        <input type="radio" id="Single2" value="single" name="marital_status" <?php if($row['marital_status']=="single") { echo "checked"; } else { } ?> autocomplete="off" > 
                                                       Single
                                                    </label>
                                                    <label class="btn btn-shadow btn-outline-primary">
                                                        <input type="radio" id="Married2" value="Married" name="marital_status" autocomplete="off"<?php if($row['marital_status']=="Married") { echo "checked"; } else { } ?>> 
                                                       Married
                                                    </label>
													</div> 
											   </div>
											   </div>
												<div class="col-md-4">
												<div class="input-group">
														<div class="position-relative form-group"><label for="bill_no" class="">Mobile No</label>
														<input placeholder="Mobile No" type="text" style="width:250px;" name="mobile_no" id="mobile_no"  value="<?php echo $row['mobile_no']; ?>" class="form-control" maxlength="8">
												</div> 
												</div> 
												</div>												   
											 </div></br>
											<div class="clearfix">
                                                <button  id="-btn" class="btn-shadow float-left btn btn-link"></button>
                                                <button type="submit" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-pill btn-primary">Submit</button>
                                                <button  id="prev-btn" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">cancel</button>
                                            </div></form></br>
										   </div>
										   <div class="tab-pane" id="other" role="tabpanel">
												
												<form action="<?php echo base_url().'client/patient/edit_patient' ?>" method="post"  id="basicvalidations"  >
												    <input type="hidden" name="edit_pinfo" value="X"/>
													<input type="hidden" name="edit_pcinfo" value="Y"/>
													<div class="row">
														<div class="col-md-4">
														<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">Occupation</label>
																<input placeholder="Occupation" style="width:250px;" name="occupation" id="occupation" value="<?php echo $row['occupation']; ?>" type="text" class="form-control">
														</div> 
														</div> 
														</div>	
														<div class="col-md-4">	
														<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">Id Number</label>
																<input style="width:250px;" placeholder="Id Number" type="text" name="aadhar_id" id="aadhar_id" value="<?php echo $row['aadhar_id']; ?>" class="form-control">
														</div>											
														</div>											
														</div>
														<div class="col-md-4">
														<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">Address 1</label>
																<input placeholder="Address 1" style="width:250px;" name="address_line1" id="address_line1" value="<?php echo $row['address_line1']; ?>" type="text" class="form-control">
														</div> 
														</div>	
														</div>														
													</div>
													<div class="row">
														<div class="col-md-4">	
														<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">Address 2</label>
																<input style="width:250px;" placeholder="Address 2" type="text" id="address_line2" name="address_line2" value="<?php echo $row['address_line2']; ?>" class="form-control">
														</div>											
														</div>											
														</div>											
														<div class="col-md-4">
														<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">City</label>
																<input placeholder="City" style="width:250px;" name="city" id="city" value="<?php echo $row['city']; ?>" type="text" class="form-control">
														</div> 
														</div>	
														</div>	
														<div class="col-md-4">	
														<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">Pincode</label>
																<input placeholder="Pin code" style="width:250px;" type="text" name="pincode" id="pincode" value="<?php echo $row['pincode']; ?>" class="form-control">
														</div>											
														</div>											
														</div>											
													</div>
													<div class="row">
														<div class="col-md-4">
														<div class="input-group">
														<div class="position-relative form-group"><label for="bill_no" class="">Phone No</label>
														<input placeholder="Phone Number" style="width:250px;" name="phone_no" id="phone_no" value="<?php echo $row['phone_no']; ?>" type="text" class="form-control">
														</div> 
														</div>
														</div>
														<input type="hidden" name="patient_id" value="<?php echo $this->uri->segment('5') ?>" />	
														<div class="col-md-4">	
														<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">Email</label>		
																<input placeholder="Email" style="width:250px;" type="text" name="email" id="email" value="<?php echo $row['email']; ?>" class="form-control">
														</div>											
														</div>											
														</div>											
													</div></br>
													<div class="clearfix">
														<button  id="-btn" class="btn-shadow float-left btn btn-link"></button>
														<button type="submit" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-pill btn-primary">Submit</button>
														<button  id="prev-btn" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">cancel</button>
													</div>											
											</form>
										</div>
										<div class="tab-pane" id="Referral" role="tabpanel">
											    
											<?php $this->db->where('ri.referal_id',$row['referal_id']);
												$this->db->select('ri.referal_type_id,ri.referal_id,ri.referal_name,ri.website_name,ri.adv_name,ri.referal_oth_name')->from('tbl_referal ri');
												$res1 = $this->db->get();
												if($res1->result_array() != false){ ?>	
										<div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-3 col-form-label">Referral Name</label>
                                            <div class="col-sm-3"><span class="badge badge-pill badge-success fade show" style="padding:.5em;width:150px;"><?php 	foreach ($res1->result_array() as $name1) {
													   if($name1['referal_type_id'] == '1' || $name1['referal_type_id'] == '6'){
															  echo $name1['referal_name'];
													   } elseif($name1['referal_type_id'] == '2') {
															  echo $name1['website_name'];
													   } elseif($name1['referal_type_id'] == '3') {  
															  echo $name1['adv_name'];
													   } 
													    elseif($name1['referal_type_id'] == '4') {  
															  echo $name1['referal_oth_name'];
													   }
													   else {
															  echo $name1['referal_name'];
													   }	?>										
												<?php } ?>
											</span></div>
                                        </div>
											<?php } ?>	
												 
												
												<form action="<?php echo base_url().'client/patient/update_referal_info' ?>" method="post" >
												<div class="row">	<input type="hidden" name="patient_id" value="<?php echo $this->uri->segment('5') ?>" />
					 							<div class="col-md-6">
												<div class="input-group">
														<div class="position-relative form-group"><label for="bill_no" class="">Referral Source</label>
														</br><select class="select-control referal_type_id" style="width:350px;" name="referal_type_id" id="referal_type_id">
															<option > &nbsp;&nbsp; Select Referral Source&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
															<?php
															if ($referal_type != false) {
																foreach ($referal_type as $referal_types) {
																	echo '<option value="'.$referal_types['referal_type_id'].'">'.$referal_types['referal_type_name'].'</option>';
																}
															}
														   ?>
													    </select>
												</div> 
												</div> 
												</div>	
												<div class="col-md-6">	
												<div class="input-group">
														<div class="position-relative form-group"><label for="bill_no" class="">Name</label>
														</br><select class="select-control referal_id" style="width:350px;" id="referal_id" name="referal_id" >
															<option>&nbsp;&nbsp;Please Select&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
														</select>
												</div>											
												</div>											
												</div>											
																					
											  </div></br>
											  <div class="row">
												 <div class="form-group col-sm-3">
												 <div class="position-relative form-group"><label for="bill_no" class="">Referal Send Notifications</label>
												</div>
												</div>
												<div class="form-group col-sm-4">
												<div class="text-center">
													<div class="custom-checkbox custom-control custom-control-inline"><input type="checkbox" value="1" name="referal_send_email" id="referal_send_email" class="custom-control-input"><label class="custom-control-label" for="referal_send_email">
													 Email </label></div>
													 <div class="custom-checkbox custom-control custom-control-inline"><input type="checkbox" value="1" name="referal_send_sms" id="referal_send_sms" class="custom-control-input"><label class="custom-control-label" for="referal_send_sms">
													 SMS </label></div>
												</div>
												</div>
												<input type="hidden" style="width: 250px !important; min-width: 250px; max-width: 300px;"name="patient_id" value="<?php echo $this->uri->segment('5') ?>" />
											    </div>
												<div class="clearfix">
                                                <button  id="-btn" class="btn-shadow float-left btn btn-link"></button>
                                                <button type="submit" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-pill btn-primary">Submit</button>
                                                <button  id="prev-btn" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">cancel</button>
                                              </div>
											  </form>
                                        </div>
										<div class="tab-pane" id="communication" role="tabpanel">
											<?Php $c_id = $this->session->userdata('client_id');
										  $this->db->select('clinic_name')->from('tbl_client');
										  $this->db->where('client_id',$c_id);
										  $res = $this->db->get();
										  $clinic_name = $res->row()->clinic_name;				
										 ?>
										 <form action="<?php echo base_url().'client/patient/reminder_sms'?>" method="post"  >
												<div class="form-group">
												 <div class="row">
												 <div class="form-group col-sm-4">
													<label for="first-name">Reminder Sms </label>
												</div>
												<div class="form-group col-sm-4">
												<div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-shadow btn-outline-primary">
                                                        <input type="radio" id="close2" value="1" name="close" autocomplete="off" > 
                                                       Yes
                                                    </label>
                                                    <label class="btn btn-shadow btn-outline-primary active">
                                                        <input type="radio" id="close1" value="0" name="close" autocomplete="off" > 
                                                       No
                                                    </label>
													</div>
												</div>
												<input type="hidden" style="width: 250px !important; min-width: 250px; max-width: 300px;"name="patient_id" value="<?php echo $this->uri->segment('5') ?>" />
											    </div>
											 </div></br>
											<p><font color="Blue"><h4><i><font color="black"><?php echo $clinic_name ?></font>  Reminds You that your treatment sessions are yet to be completed so please do come regularly</i></h4></font></p>
											<div class="clearfix">
                                                <button  id="-btn" class="btn-shadow float-left btn btn-link"></button>
                                                <button type="submit" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-pill btn-primary">Submit</button>
                                                <button  id="prev-btn" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">cancel</button>
                                            </div></form>
                                            </div>
											</div>
										</div>
										</div>
									</div>
									
									
									<div class="tab-pane" id="consent"><h4></h4>
                                          <div class="main-card mb-3">
												 <div class="card-body" style="float:right;">
												 <a  href="<?php echo base_url().'client/patient/consent_form/'.$row['patient_id']; ?>" target="_blank">
												<button class="mb-2 mr-2 btn-pill btn btn-info">Add New Consent Form</button></a>
												 <br></br>
                                             </div>
											 
										<div class="table-responsive">
										
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                               <th class="text-center">Date</th>
											   <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php  if($sign_detail != false){  foreach ($sign_detail as $sign) { ?>
                                            <tr id="<?php echo $sign['consent_id'] ?>">
                                               <td class="text-center"><div class="badge badge-pill badge-info"><?php echo date('d/m/Y', strtotime($sign['date'])); ?></div></td>
												 <td class="text-center">
												<a class="edit" target="_blank" href="<?php echo base_url().'client/patient/view_consent/'.$sign['patient_id'].'/'.$sign['consent_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="Print"><i class="fa fa-print"></i></button></a>
												<a href="<?php echo '#'.$sign['consent_id']; ?>" class="consent_delete"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger sign" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt" > </i></button></a>
												</td>
                                            </tr>
											<?php } } else { ?>
											<tr><td colspan="2"><center>No More Records</center></td></tr>
											<?php } ?>
                                            </tbody>
                                        </table>
										</div>
                                        </div>
										 </div>
										 
										 <div class="tab-pane" id="tab-faq-6"><h4></h4>
                                          <div class="main-card mb-3">
												 <div class="card-body">
												  <p><font color="Blue"><h4><i><center>This Feature Works Best in Desktops or Larger Screens</i></center></h4></font></p>
				   <center><button class="mb-2 mr-2 btn-pill btn btn-success" id="one">Click To Baby Chart</button>
				   <button class="mb-2 mr-2 btn-pill btn btn-success" id="two">Click To Body Chart</button>
				   <button class="mb-2 mr-2 btn-pill btn btn-success" id="three">Click To Woman Chart</button></center>
				    
					  <div id="progress">
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<center><span class="saveAppoinmentLoader"><span><img src="<?php echo base_url().'img/spinner.gif'; ?>"><h4><font color="red">Saving Please Wait....</font></h4></span></span></center>
				  </div>
				  
				  <select name="triggerpoint" class="select-control form-control" id="triggerpoint" style="width:100%;">
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
					<input type="hidden" id="patient_id" value="<?php echo $this->uri->segment(5); ?>" name="id" >
								<div id="wPaint" style="position:relative; width:500px; height:500px; margin:70px auto 20px auto;"></div>

                                <center id="wPaint-img"></center>								
	  
                                             </div>
											</br> 
										<div class="table-responsive">
										 <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                               <th class="text-center">Date</th>
											   <th class="text-center">Image</th>
											   <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php  if($chart != false){ ?>
                                       
											<?php foreach ($chart as $charts) { ?>
                                            <tr id="<?php echo $charts['patient_id'].'body'.$charts['img_id']; ?>">
                                               <td class="text-center"><div class="badge badge-pill badge-info"><?php echo date('d/m/Y', strtotime($charts['date'])); ?></div></td>
												 <td class="text-center"><img class="lightbox" src="<?php echo base_url().'body_chart/test/uploads/'.$charts['img_name'];?>" height="110" width="110"></td>
												 <td class="text-center">
												
												<a href="<?php echo '#'.$charts['patient_id'].'#'.$charts['img_id']; ?>" class="DeleteBodychart"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger sign" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt" > </i></button></a>
												</td>
                                            </tr>
											
                                             <?php
						} ?>
						<?php } else { echo '<tr><td class="text-center"  colspan="3">No More Records</td></tr>'; }  ?>
                                            </tbody>
                                        </table>
										 
 
                                    </div>
                                        </div>
										 </div>
									
									<div class="tab-pane" id="tab-faq-3"><h4></h4>
                                          <div class="main-card mb-3">
												<div class="card-header">
													<div class="btn-actions-pane-center">
														<div class="nav">
																<a data-toggle="tab" href="#Subjective" class="border-0 btn-transition btn btn-outline-primary show active">Subjective</a>
																&nbsp;&nbsp;<a data-toggle="tab" href="#Objective" class="mr-1 ml-1 border-0 btn-transition btn btn-outline-primary show">Objective</a>
																&nbsp;&nbsp;<a data-toggle="tab" href="#Assess" class="border-0 btn-transition btn btn-outline-primary show">Assessment</a>
																&nbsp;&nbsp;<a data-toggle="tab" href="#Plan" class="border-0 btn-transition btn btn-outline-primary show">Plan</a>
														</div>
													</div>
												</div>
												<div class="card-body">
													<div class="tab-content">
														<div class="tab-pane show active" id="Subjective" role="tabpanel">
														<form id="case" action ="<?php echo base_url().'client/patient/add_case_notes' ?>" method="post"  >
															<div class="row">
															<input type="hidden" name="patient_id" value="<?php echo $this->uri->segment(5); ?>" />
																<div class="col-md-6">
																 <div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">Date</label>
																<input type="text" class="form-control datepicker" style="width:300px;" Placeholder="Date" name="cn_date" id="cn_date"  autocomplete="off" data-toggle="datepicker">
																</div>	
																</div>	
																</div>	
																<div class="col-md-6">	
																<div class="input-group">
																		<div class="position-relative form-group"><label for="bill_no" class="">Description</label>
																	<textarea placeholder="Description" style="width:300px;" type="text" name="case_notes" id="case_notes" class="form-control"></textarea>
																</div>											
																</div>											
																</div>											
															</div></br>
															<div class="clearfix">
																<button  id="-btn" class="btn-shadow float-left btn btn-link"></button>
																<button type="submit" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-pill btn-primary">Submit</button>
																<button  id="prev-btn" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">cancel</button>
															</div>
														</form>
														</br></br>
														
														<?php $CI =& get_instance();
															 $CI->load->model(array('registration_model','staff_model'));
															  ?>
														 <table  class="table table-striped table-bordered case_notes" id="basicDataTable">
															<thead>
															  <tr>
																<th class="text-center">Date</th>
																<th class="text-center">Description</th>
																<th class="text-center">Approved By</th>
																<th class="text-center">Action</th>
															 </tr>
															</thead>
															<tbody>
															<?php if($case_notes != false){
															foreach ($case_notes as $row) {
																$enteredBy = $row['modify_by'];
																 $profileInfo = $CI->registration_model->getProfileInfo($enteredBy);
																  $staffInfo = $CI->staff_model->getStaffInfo($enteredBy);
																if($profileInfo != false){
																	$clientName = $profileInfo['first_name'];
																} else {
																 $clientName = $staffInfo['first_name'].' '.$staffInfo['last_name'];
																}
																$arrCaseNotes = explode("\n",$row['case_notes']);
															?>
															<tr id="<?php echo $row['patient_id'].'case'.$row['cn_id']; ?>">
																<td class="text-center"><?php echo date('d-m-Y',strtotime($row['cn_date'])); ?></td>
																<td class="text-center"><?php
																	for($i=0;$i<count($arrCaseNotes);$i++){
																		echo $arrCaseNotes[$i].'<br>';
																	}
																  ?></td>
																<td class="text-center" ><?php echo $clientName; ?></td>
																<td class="actions text-center">
																<a class="edit" href="<?php echo base_url().'client/patient/edit_case_notes/'.$row['cn_id'].'/'.$row['patient_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button> </a>
																<a class="DeleteCaseNotes" href="<?php echo '#'.$row['patient_id'].'#'.$row['cn_id']; ?>" ><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"> </i></button></a></td>
															</tr>
															<?php }  } else { ?>
															<tr><td colspan="4"><center>No Records Found</center></td></tr><?php } ?>
															
															</tbody>
														  </table>
														</div>
														<div class="tab-pane show" id="Objective" role="tabpanel">
														<form id="progress" action ="<?php echo base_url().'client/patient/add_prog_notes' ?>" method="post"  id="basicvalidations">
														<input type="hidden" name="patient_id" value="<?php echo $this->uri->segment(5); ?>" />
						  								<div class="row">
															<div class="col-md-6">
																<div class="position-relative form-group"><label for="bill_no" class="">Date</label>
																<input name="pn_date" placeholder="" type="text" style="width:300px;" class="form-control datepicker" data-toggle="datepicker"></div>
															</div>	
															<div class="col-md-6">	
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class="">Description</label>
																	
																	<textarea placeholder="Description" style="width:300px;" type="text" name="prog_notes" id="prog_notes" class="form-control"></textarea>
															</div></div>											
															</div></div></br>
															<div class="clearfix">
																<button  id="-btn" class="btn-shadow float-left btn btn-link"></button>
																<button type="submit" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-pill btn-primary">Submit</button>
																<button  id="prev-btn" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">cancel</button>
															</div>
														</form></br></br>
														
														 <table  class="table table-striped table-bordered progress_notes" id="basicDataTable">
															<thead>
															  <tr>
																<th class="text-center" >Date</th>
																<th class="text-center" >Description</th>
																<th class="text-center" >Approved By</th>
																<th class="text-center" >Action</th>
															 </tr>
															</thead>
															<tbody><?php if($prog_notes != false){ ?>
															<?php foreach ($prog_notes as $row) {
																$enteredBy = $row['modify_by'];
																 $profileInfo = $CI->registration_model->getProfileInfo($enteredBy);
																  $staffInfo = $CI->staff_model->getStaffInfo($enteredBy);
																if($profileInfo != false){
																	$clientName = $profileInfo['first_name'];
																} else {
																 $clientName = $staffInfo['first_name'].' '.$staffInfo['last_name'];
																}
																$arrprog_notes = explode("\n",$row['prog_notes']);
															?>
															<tr id="<?php echo $row['patient_id'].'progress'.$row['pn_id'] ?>">
																
																<td class="text-center" ><?php echo date('d-m-Y',strtotime($row['pn_date'])); ?></td>
																<td class="text-center" ><?php
																	for($i=0;$i<count($arrprog_notes);$i++){
																		echo $arrprog_notes[$i].'<br>';
																	}
																  ?></td>
																<td class="text-center" ><?php echo $clientName ?></td>
																<td class="actions text-center"><a class="edit" href="<?php echo base_url().'client/patient/edit_cnotes_prognotes/'.$row['patient_id'].'/'.$row['pn_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
																<a class="DeleteProgNotes" href="<?php echo '#'.$row['patient_id'].'#'.$row['pn_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"> </i></button></a></td>
															</tr>
															<?php } } else { ?>
															<tr><td colspan="4"><center> No More Records Found </center></td></tr>
															<?php } ?>
															</tbody>
														  </table>
														  
														</div>
														<div class="tab-pane show" id="Assess" role="tabpanel">
														<form id="remark" action ="<?php echo base_url().'client/patient/add_remarks' ?>" method="post"  id="basicvalidations">
														<input type="hidden" name="patient_id" style="width:300px;" value="<?php echo $this->uri->segment(5); ?>" />
						  								<div class="row">
															<div class="col-md-6">
															 <div class="input-group">
															 <div class="position-relative form-group"><label for="bill_no" class="">Date</label>
																<input type="text" class="form-control datepicker"  style="width:300px;" Placeholder="Date" name="remark_date" id="remark_date"  autocomplete="off" data-toggle="datepicker">
															 </div>	
															</div>	
															</div>	
															<div class="col-md-6">	
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class="">Description</label>
																	<textarea placeholder="Description" style="width:300px;" type="text" name="remarks" id="remarks" class="form-control"></textarea>
															</div></div>											
															</div>											
														</div></br>
														<div class="clearfix">
															<button  id="-btn" class="btn-shadow float-left btn btn-link"></button>
															<button type="submit" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-pill btn-primary">Submit</button>
															<button  id="prev-btn" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">cancel</button>
														</div>
														</form></br></br>
														
														 <table  class="table table-striped table-bordered remark_notes" id="basicDataTable">
															<thead>
															  <tr>
																<th class="text-center" >Date</th>
																<th class="text-center" >Description</th>
																<th class="text-center" >Approved By</th>
																<th class="text-center" >Action</th>
															 </tr>
															</thead>
															<tbody>
															<?php if($remarks != false){ 
															foreach ($remarks as $row) {
																$enteredBy = $row['modify_by'];
																 $profileInfo = $CI->registration_model->getProfileInfo($enteredBy);
																  $staffInfo = $CI->staff_model->getStaffInfo($enteredBy);
																if($profileInfo != false){
																	$clientName = $profileInfo['first_name'];
																} else {
																 $clientName = $staffInfo['first_name'].' '.$staffInfo['last_name'];
																}
																$arrRemarks = explode("\n",$row['remarks']);
													
															?>
															<tr id="<?php echo $row['patient_id'].'remark'.$row['remark_id'] ?>">  
																<td class="text-center" ><?php echo date('d-m-Y',strtotime($row['remark_date'])); ?></td>
																<td class="text-center" ><?php
																	for($i=0;$i<count($arrRemarks);$i++){
																		echo $arrRemarks[$i].'<br>';
																	}
																  ?></td>
																<td class="text-center" ><?php echo $clientName; ?></td>
																<td class="actions text-center"><a class="edit" href="<?php echo base_url().'client/patient/edit_cnotes_remarks/'.$row['patient_id'].'/'.$row['remark_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="DeleteRemarks" href="<?php echo '#'.$row['patient_id'].'#'.$row['remark_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"> </i></button></a></td>
															</tr>
															<?php
															} } else { ?>
															<tr><td colspan="4"><center> No More Records Found </center></td></tr>
															<?php } ?>
															</tbody>
														  </table>
														  
													 </div>
													 <div class="tab-pane show" id="Plan" role="tabpanel">
														<form id="plan" action ="<?php echo base_url().'client/patient/add_plan' ?>" method="post"  id="basicvalidations" id="basicvalidations" >
														<div class="row">
															<div class="col-md-6">
															 <div class="input-group">
															<div class="position-relative form-group"><label for="bill_no" class="">Date</label>
																<input type="text" class="form-control datepicker" style="width:300px;" Placeholder="Date" name="plan_date" id="plan_date"  autocomplete="off" data-toggle="datepicker">
															</div>	
															</div>	
															</div>	<input type="hidden" name="patient_id" value="<?php echo $this->uri->segment('5') ?>" />
															<div class="col-md-6">	
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class="">Date</label>
																<textarea placeholder="Description" style="width:300px;" type="text" name="description" id="description" class="form-control"></textarea>
															</div>											
															</div>											
															</div>											
														</div></br>
														<div class="clearfix">
															<button  id="-btn" class="btn-shadow float-left btn btn-link"></button>
															<button type="submit" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-pill btn-primary">Submit</button>
															<button  id="prev-btn" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">cancel</button>
														</div>
														</form></br></br>
														
														 <table  class="table table-striped table-bordered plan_notes" id="basicDataTable">
															<thead>
															  <tr>
																<th class="text-center" >Date</th>
																<th class="text-center" >Description </th>
																<th class="text-center" >Approved By </th>
																<th class="text-center" >Action</th>
															 </tr>
															</thead>  
															<tbody>
															<?php if($plans != false){  
															foreach ($plans as $row) {
																$enteredBy = $row['modify_by'];
																 $profileInfo = $CI->registration_model->getProfileInfo($enteredBy);
																  $staffInfo = $CI->staff_model->getStaffInfo($enteredBy);
																if($profileInfo != false){
																	$clientName = $profileInfo['first_name'];
																} else {
																 $clientName = $staffInfo['first_name'].' '.$staffInfo['last_name'];
																}
																$arrdescription = explode("\n",$row['description']);
														
															?>
															<tr id="<?php echo $row['patient_id'].'plan'.$row['soap_plan_id'] ?>">
																<td class="text-center" ><?php echo date('d-m-Y',strtotime($row['plan_date'])); ?></td>
																<td class="text-center" ><?php
																	for($i=0;$i<count($arrdescription);$i++){
																		echo $arrdescription[$i].'<br>';
																	}
																  ?></td>
																<td class="text-center" ><?php echo $clientName; ?></td>
																<td class="actions text-center"><a class="edit" href="<?php echo base_url().'client/patient/edit_plan/'.$row['patient_id'].'/'.$row['soap_plan_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="DeletePlan" href="<?php echo '#'.$row['patient_id'].'#'.$row['soap_plan_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"> </i></button></a></button></td>
															</tr>
														<?php  } } else { ?>
															<tr><td colspan="4"><center> No More Records Found </center></td></tr>
														<?php } ?>
															</tbody>
														  </table>
													  </div>
												</div>
											</div> 
                                        </div>
									</div>
									<div class="tab-pane" id="tab-faq-4">
									  <div class="main-card mb-3">
                                        <div class="card-header">
                                            <div class="btn-actions-pane-right">
												<div class="nav">
                                                    <a data-toggle="tab" href="#hips" class="border-0 btn-transition btn btn-outline-primary show active">Hip</a>
                                                    &nbsp;&nbsp;<a data-toggle="tab" href="#knees" class="mr-1 ml-1 border-0 btn-transition btn btn-outline-primary show">Knee Joint</a>
                                                    &nbsp;&nbsp;<a data-toggle="tab" href="#elbows" class="border-0 btn-transition btn btn-outline-primary show">Elbow & Wrist</a>
                                                    &nbsp;&nbsp;<a data-toggle="tab" href="#shoulders" class="border-0 btn-transition btn btn-outline-primary show">Shoulder</a>
                                                    &nbsp;&nbsp;<a data-toggle="tab" href="#foots" class="border-0 btn-transition btn btn-outline-primary show">Foot & Ankle</a>
                                                </div>
											</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content">
											 <div class="tab-pane show active" id="hips" role="tabpanel">
													<div class="main-card mb-12">
														<div class="card-body">
															<div align="right">
																<a href="<?php echo base_url().'client/assessment/hip_assessment/'.$this->uri->segment(5); ?>" target="_blank"><button class="btn btn-pill btn-info">Add Hip Assessment </button></a>&nbsp;&nbsp;&nbsp;
															</div></br>
															
														<table class="table table-striped table-bordered">
														  <thead>
															<tr>
															  <th class="text-center">Date</th>
															  <th class="text-center">Diagnosis</th>
															  <th class="text-center">Treatment Plan</th>
															  <th class="text-center">Action</th>
															</tr>
														  </thead>
														 <tbody>
														  
														  <?php if($hip_assess != false) { foreach($hip_assess as $row) { ?> 
														  <tr id="<?php echo $row['patient_id'].'hip'.$row['h_id']; ?>">
														  <td class="text-center"><?php echo date('d/m/Y', strtotime($row['assess_date'])); ?></td>
														  <td class="text-center"><?php echo $row['Diagnosis']; ?></td>
														  <td ><?php echo $row['Treatment']; ?></td>
														  <td class="actions text-center">
														  
														  <a class="edit" href="<?php echo base_url().'client/assessment/edithip_assessment/'.$row['patient_id'].'/'.$row['h_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button> </a>
														  <a href="<?php echo base_url().'client/assessment/printhip_assessment/'.$row['patient_id'].'/'.$row['h_id']; ?>" target="_blank"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-alternate " data-toggle="tooltip" data-placement="top" title="Print"><i class="fa fa-print"> </i></button></a>
																<a href="<?php echo '#'.$row['patient_id'].'#'.$row['h_id']; ?>" class="DeleteHipassess"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"> </i></button></a></td>
															
															
														</td> </tr>
														  <?php  } } else { ?>
															<tr><td colspan="4"><center> No More Records Found </center></td></tr>
														<?php } ?>
														 </tbody></table>
														
														</div>
													</div>
											 </div>
											 <div class="tab-pane" id="knees" role="tabpanel">
													<div class="main-card mb-12">
														<div class="card-body">
															<div align="right">
																<a href="<?php echo base_url().'client/assessment/kneejoint_assessment/'.$this->uri->segment(5); ?>" target="_blank"><button class="btn btn-pill btn-info">Add Knee Joint Assessment</button></a>&nbsp;&nbsp;&nbsp;
															</div></br>
															
															<table class="table table-striped table-bordered">
															  <thead>
																<tr>
																  <th>Date</th>
																  <th>Diagnosis</th>
																  <th>Treatment Plan</th>
																  <th>Action</th>
																</tr>
															  </thead>
															 <tbody>
															  <?php if($knee_assess != false) { ?>
															  <?php foreach($knee_assess as $row) { ?> 
															  <tr id="<?php echo $row['patient_id'].'knee'.$row['k_id']; ?>">
															  <td><?php echo date('d/m/Y', strtotime($row['assess_date'])); ?></td>
															  <td><?php echo $row['Diagnosis']; ?></td>
															  <td><?php echo $row['Treatment']; ?></td>
															  <td class="actions text-center">
															  
															  <a class="edit" href="<?php echo base_url().'client/assessment/editkneejoint_assessment/'.$row['patient_id'].'/'.$row['k_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button> </a>
														      <a href="<?php echo base_url().'client/assessment/printkneejoint_assessment/'.$row['patient_id'].'/'.$row['k_id']; ?>" target="_blank"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-alternate " data-toggle="tooltip" data-placement="top" title="Print"><i class="fa fa-print"> </i></button></a>
														      <a class="Deletekneeassess" href="<?php echo '#'.$row['patient_id'].'#'.$row['k_id']; ?>" ><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"> </i></button></a></td>
															
															
															  </tr>
															   <?php  } } else { ?>
															<tr><td colspan="4"><center> No More Records Found </center></td></tr>
														<?php } ?>
															 </tbody></table>
															
														</div>
													</div>
											 </div>
											 <div class="tab-pane" id="elbows" role="tabpanel">
													<div class="main-card mb-12">
														<div class="card-body">
															<div align="right">
																<a href="<?php echo base_url().'client/assessment/elbowwrist_assessment/'.$this->uri->segment(5); ?>" target="_blank"><button class="btn btn-pill btn-info">Add Elbow & Wrist Assessment</button></a>&nbsp;&nbsp;&nbsp;
															</div></br>
															
															<table class="table table-striped table-bordered">
															  <thead>
																<tr>
																  <th>Date</th>
																  <th>Diagnosis</th>
																  <th>Treatment Plan</th>
																  <th>Action</th>
																</tr>
															  </thead>
															 <tbody>
															  <?php if($elbow_assess != false) { ?>
															  <?php foreach($elbow_assess as $row) { ?>
															  <tr id="<?php echo $row['patient_id'].'elbow'.$row['e_id']; ?>">
															  <td><?php echo date('d/m/Y', strtotime($row['assess_date'])); ?></td>
															  <td><?php echo $row['Diagnosis']; ?></td>
															  <td><?php echo $row['Treatment']; ?></td>
															  <td class="actions text-center">
															  
															  <a class="edit" href="<?php echo base_url().'client/assessment/editelbowwrist_assessment/'.$row['patient_id'].'/'.$row['e_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button> </a>
														      <a href="<?php echo base_url().'client/assessment/printelbowwrist_assessment/'.$row['patient_id'].'/'.$row['e_id']; ?>" target="_blank"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-alternate " data-toggle="tooltip" data-placement="top" title="Print"><i class="fa fa-print"> </i></button></a>
															  <a class="DeleteElbowassess" href="<?php echo '#'.$row['patient_id'].'#'.$row['e_id']; ?>" ><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"> </i></button></a></td>
															
															
															  </td>
															   </tr>
															   <?php  } } else { ?>
															<tr><td colspan="4"><center> No More Records Found </center></td></tr>
														<?php } ?>
															</tbody> </table>
															
														</div>
													</div>
											 </div>
											 <div class="tab-pane" id="shoulders" role="tabpanel">
													<div class="main-card mb-12">
														<div class="card-body">
														<div align="right">
															<a href="<?php echo base_url().'client/assessment/shoulder_assessment/'.$this->uri->segment(5); ?>" target="_blank"><button class="btn btn-pill btn-info">Add Shoulder Assessment</button></a>&nbsp;&nbsp;&nbsp;
														</div></br>
														
														<table class="table table-striped table-bordered">
														  <thead>
															<tr>
															  <th>Date</th>
															  <th>Diagnosis</th>
															  <th>Treatment Plan</th>
															  <th>Action</th>
															</tr>
														  </thead>
														 <tbody>
														  <?php if($shoulder_assess != false) { ?>
														  <?php foreach($shoulder_assess as $row) { ?>
														  <tr id="<?php echo $row['patient_id'].'shoulder'.$row['s_id']; ?>">
														  <td><?php echo date('d/m/Y', strtotime($row['assess_date'])); ?></td>
														  <td><?php echo $row['Diagnosis']; ?></td>
														  <td><?php echo $row['Treatment']; ?></td>
														  <td class="actions text-center">
														  
														  <a class="edit" href="<?php echo base_url().'client/assessment/editshoulder_assessment/'.$row['patient_id'].'/'.$row['s_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button> </a>
														  <a href="<?php echo base_url().'client/assessment/printshoulder_assessment/'.$row['patient_id'].'/'.$row['s_id']; ?>" target="_blank"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-alternate " data-toggle="tooltip" data-placement="top" title="Print"><i class="fa fa-print"> </i></button></a>
														  <a href="<?php echo '#'.$row['patient_id'].'#'.$row['s_id']; ?>" class="DeleteShoulderassess"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"> </i></button></a></td>
															
														  </td>
														</tr>
														   <?php  } } else { ?>
															<tr><td colspan="4"><center> No More Records Found </center></td></tr>
														<?php } ?>
														</tbody>
														</table>
														</div>
													</div>
											 </div>
											 <div class="tab-pane" id="foots" role="tabpanel">
													<div class="main-card mb-12">
														<div class="card-body">
															 <div align="right">
																<a href="<?php echo base_url().'client/assessment/footankle_assessment/'.$this->uri->segment(5); ?>" target="_blank"><button class="btn btn-pill btn-info">Add Foot & Ankle Assessment</button></a>&nbsp;&nbsp;&nbsp;
															</div></br>
															
															<table class="table table-striped table-bordered">
															  <thead>
																<tr>
																  <th>Date</th>
																  <th>Diagnosis</th>
																  <th>Treatment Plan</th>
																  <th>Action</th>
																</tr>
															  </thead>
															 <tbody>
															  <?php if($foot_assess != false) { ?>
															  <?php foreach($foot_assess as $row) { ?> 
															  <tr id="<?php echo $row['patient_id'].'foot'.$row['f_id']; ?>">
															  <td><?php echo date('d/m/Y', strtotime($row['assess_date'])); ?></td>
															  <td><?php echo $row['Diagnosis']; ?></td>
															  <td><?php echo $row['Treatment']; ?></td>
															  <td class="actions text-center">
															  <a class="edit" href="<?php echo base_url().'client/assessment/editfootankle_assessment/'.$row['patient_id'].'/'.$row['f_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button> </a>
														      <a href="<?php echo base_url().'client/assessment/printfootankle_assessment/'.$row['patient_id'].'/'.$row['f_id']; ?>" target="_blank"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-alternate " data-toggle="tooltip" data-placement="top" title="Print"><i class="fa fa-print"> </i></button></a>
															  <a href="<?php echo '#'.$row['patient_id'].'#'.$row['f_id']; ?>" class="DeleteFootassess"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"> </i></button></a></td>
															</td>
															   </tr>
															    <?php  } } else { ?>
																	<tr><td colspan="4"><center> No More Records Found </center></td></tr>
																<?php } ?>
															</tbody> </table>
															
														</div>
													</div>
											 </div>
											</div>
										</div>
									   </div>
									</div>
									<div class="tab-pane" id="tab-faq-5">
									  <div class="main-card mb-3"></br>
                                        <div class="card-header">
                                            <div class="btn-actions-pane-center">
												<div class="nav">
                                                    <a data-toggle="tab" href="#history" class="border-0 btn-transition btn btn-outline-primary show active">History</a>
                                                    &nbsp;&nbsp;<a data-toggle="tab" href="#chief" class="mr-1 ml-1 border-0 btn-transition btn btn-outline-primary show">Chief Compliants</a>
                                                    &nbsp;&nbsp;<a data-toggle="tab" href="#pain" class="border-0 btn-transition btn btn-outline-primary show">Pain</a>
                                                    &nbsp;&nbsp;<a data-toggle="tab" href="#exam" class="border-0 btn-transition btn btn-outline-primary show">Examination</a>
                                                    &nbsp;&nbsp;<a data-toggle="tab" href="#motor" class="border-0 btn-transition btn btn-outline-primary show">Motor Examination</a>
                                                    &nbsp;&nbsp;<a data-toggle="tab" href="#sensory" class="border-0 btn-transition btn btn-outline-primary show">Sensory Examination</a>
                                                    &nbsp;&nbsp;<a data-toggle="tab" href="#petiatric" class="border-0 btn-transition btn btn-outline-primary show">Pediatric Examination</a>
                                                    &nbsp;&nbsp;<a data-toggle="tab" href="#neuro" class="border-0 btn-transition btn btn-outline-primary show">Neuro Examination</a>
                                               </div>
											</div></br>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content">
											 <div class="tab-pane show active" id="history" role="tabpanel">
													<div class="main-card mb-8">
														<div class="card-body">
															<form id="his" action ="<?php echo base_url().'client/patient/add_history' ?>" method="post"  id="basicvalidations"  >
															<div class="row">
																	<div class="col-md-6">
																	 <div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class="">Date</label>
																	<input type="text" style="width:350px;" class="form-control datepicker" Placeholder="Date" name="his_date" id="his_date"  autocomplete="off" data-toggle="datepicker">
																	</div>	
																	</div>	
																	</div><input type="hidden" name="patient_id" value="<?php echo $this->uri->segment('5') ?>" />
																	<div class="col-md-6">	
																	<div class="input-group">
																			<div class="position-relative form-group"><label for="bill_no" class="">Surgical History</label>
																	<textarea style="width:350px;" placeholder="Surgical History" type="text" name="surgical" id="surgical" class="form-control"></textarea>
																	</div>											
																	</div>											
																	</div>											
															</div></br>
															<div class="row">
																	<div class="col-md-6">	
																	<div class="input-group">
																			<div class="position-relative form-group"><label for="bill_no" class="">Medical History</label>
																	<textarea placeholder="Medical History" type="text" name="medical" style="width:350px;" id="medical" class="form-control"></textarea>
																	</div>											
																	</div>											
																	</div>	
																	<div class="col-md-6">	
																	<div class="input-group">
																			<div class="position-relative form-group"><label for="bill_no" class="">Other Disease</label>
																			<textarea placeholder="Other History" type="text" name="his_other_disease" style="width:350px;" id="his_other_disease" class="form-control"></textarea>
																	</div>											
																	</div>											
															</div></div>
															<div class="row">
																<div class="col-md-4">
																 <div class="position-relative form-group"><label for="bill_no" class="">Diabetes</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="diabetes" value="yes" name="diabetes"  > 
																	   Yes
																	</label>
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="diabetes1" value="no" name="diabetes" > 
																		No
																	</label>
																	</div></div> 
															   </div>
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">BP</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="blood_pressure" value="yes" name="blood_pressure"  > 
																	   Yes
																	</label>
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="blood_pressure1" value="no" name="blood_pressure" > 
																		No
																	</label>
																	</div> </div> 
																</div>
																<div class="col-md-4">
																	<div class="position-relative form-group"><label for="bill_no" class="">Smoking</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="smoking" value="yes" name="smoking"  > 
																	   Yes
																	</label>
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="smoking1" value="no" name="smoking" > 
																		No
																	</label></div>
																	</div> 
																</div>															
															 </div></br>
															<div class="row">
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">Drinking</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="drinking" value="yes" name="drinking"  > 
																	   Yes
																	</label>
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="drinking1" value="no" name="drinking" > 
																		No
																	</label>
																	</div> </div>
																</div>
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">Fever and Chill</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="Fever" value="yes" name="Fever"  > 
																	   Yes
																	</label>
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="Fever1" value="no" name="Fever" > 
																		No
																	</label>
																	</div> </div> 
																</div>
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">Heart Disease</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="Heart" value="yes" name="Heart"  > 
																	   Yes
																	</label>
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="Heart1" value="no" name="Heart" > 
																		No
																	</label>
																	</div> </div> 
																</div>
															</div></br>
															 <div class="row">
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">Bleeding Disorder</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="Disorder" value="yes" name="Disorder"  > 
																	   Yes
																	</label>
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="Disorder1" value="no" name="Disorder" > 
																		No
																	</label>
																	</div></div> 
															    </div>
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">Recent Infection</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="Infection" value="yes" name="Infection"  > 
																	   Yes
																	</label>
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="Infection1" value="no" name="Infection" > 
																		No
																	</label>
																	</div> </div> 
																</div>
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">Pregnancy</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="Pregnancy" value="yes" name="Pregnancy"  > 
																	   Yes
																	</label>
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="Pregnancy1" value="no" name="Pregnancy" > 
																		No
																	</label>
																	</div> </div> 
																</div>															
															 </div></br>
															 <div class="row">
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">HTN</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="HTN" value="yes" name="HTN"  > 
																	   Yes
																	</label>
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="HTN1" value="no" name="HTN" > 
																		No
																	</label>
																	</div> </div>
															   </div>
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">TB</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="TB" value="yes" name="TB"  > 
																	   Yes
																	</label>
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="TB1" value="no" name="TB" > 
																		No
																	</label>
																	</div> </div> 
																</div>
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">Cancer</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="Cancer" value="yes" name="Cancer"  > 
																	   Yes
																	</label>
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="Cancer1" value="no" name="Cancer" > 
																		No
																	</label>
																	</div> </div> 
																</div>															
															 </div></br>
															  <div class="row">
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">HIV/AIDS</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="AIDS" value="yes" name="AIDS"  > 
																	   Yes
																	</label>
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="AIDS1" value="no" name="AIDS" > 
																		No
																	</label>
																	</div> </div>
															   </div>
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">Past Surgery</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="Surgery" value="yes" name="Surgery"  > 
																	   Yes
																	</label>
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="Surgery1" value="no" name="Surgery" > 
																		No
																	</label>
																	</div> </div> 
																</div>
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">Allergies</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="Allergies" value="yes" name="Allergies"  > 
																	   Yes
																	</label>
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="Allergies1" value="no" name="Allergies" > 
																		No
																	</label>
																	</div> </div> 
																</div>															
															 </div></br>
															  <div class="row">
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">Osteoporotic</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="Osteoporotic" value="yes" name="Osteoporotic"  > 
																	   Yes
																	</label>
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="Osteoporotic1" value="no" name="Osteoporotic" > 
																		No
																	</label>
																	</div> </div>
															   </div>
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">Depression</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="Depression" value="yes" name="Depression"  > 
																	   Yes
																	</label>
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="Depression1" value="no" name="Depression" > 
																		No
																	</label>
																	</div> </div> 
																</div>
																<div class="col-md-4">
																<div class="position-relative form-group"><label for="bill_no" class="">Hepatitis</label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="Hepatitis" value="yes" name="Hepatitis"  > 
																	   Yes
																	</label>
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="Hepatitis1" value="no" name="Hepatitis" > 
																		No
																	</label>
																	</div> </div> 
																</div>															
															 </div></br>
															 <div class="row">
																<div class="col-md-4">
																  <div class="position-relative form-group"><label for="bill_no" class=""> Any Implants </label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="Implants" value="yes" name="Implants"  > 
																	   Yes
																	</label>
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="Implants1" value="no" name="Implants" > 
																		No
																	</label>
																	</div> </div>
															   </div>
																<div class="col-md-8">
																<div class="clearfix">
																	<button type="submit" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-pill btn-primary">Submit</button>
																	<button  id="prev-btn" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">cancel</button>
																</div>
																</div>															
															 </div>
															</form></br>  </br>  
															
													 <div class="table-responsive">
													<center> <table  class="table table-striped table-bordered his_notes" id="basicDataTable">
														<thead>
														  <tr>
															<th class="text-center" >Date</th>
															<th class="text-center" >Medical History</th>
															<th class="text-center" >Action</th>
														 </tr>
														</thead>
														<tbody>
														<?php  if($history != false){  
														foreach ($history as $row) {
															$arrmedical = explode("\n",$row['medical']);
													
														?>
														<tr id="<?php echo $row['patient_id'].'his'.$row['his_id'] ?>">
															<td class="text-center" ><?php echo date('d-m-Y',strtotime($row['his_date'])); ?></td>
															<td class="text-center" ><?php
																for($i=0;$i<count($arrmedical);$i++){
																	echo $arrmedical[$i].'<br>';
																}
															  ?></td>
															<td class="actions text-center"><a class="edit"  href="<?php echo base_url().'client/patient/edit_assessment_history/'.$row['patient_id'].'/'.$row['his_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="DeleteHis" href="<?php echo '#'.$row['patient_id'].'#'.$row['his_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"> </i></button></a></td>
														</tr>
														<?php  } } else { ?>
																	<tr><td colspan="3"><center> No More Records Found </center></td></tr>
																<?php } ?>
														</tbody>
													  </table></center></div>
													
														</div>
													</div>
											</div>
											
											<div class="tab-pane show" id="chief" role="tabpanel">  
													<div class="main-card mb-8">
														<div class="card-body">
															<form id="chief" action ="<?php echo base_url().'client/patient/add_complaints' ?>" method="post" >
														<input type="hidden" name="patient_id" value="<?php echo $this->uri->segment('5') ?>" />
														<div class="card-body">
														 <div class="row">
															<div class="col-md-4">
																<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class=""> Date </label>
																	<input type="text" class="form-control datepicker" Placeholder="Date" name="cc_date" style="width:250px;" id="cc_date"  autocomplete="off" data-toggle="datepicker">
																</div>	
																</div>	
															</div>
															<div class="col-md-4">
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class=""> What are your chief complaints?</label>
																	<textarea placeholder="" type="text" name="chief_complaints_dtl" id="chief_complaints_dtl" style="width:250px;" class="form-control"></textarea>
																	</div> 
																</div> 
															</div>
															<div class="col-md-4">
															    <div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class=""> How long you had this problem?</label>
																	<textarea placeholder="" type="text" name="how_long_you_had_this_prob" id="how_long_you_had_this_prob" style="width:250px;" class="form-control"></textarea>
																	</div> 
																</div> 
															</div>		
														</div></br>
														<div class="row">
															<div class="col-md-4">
															  <div class="position-relative form-group"><label for="bill_no" class="">  Had this problem before? </label>
																	</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																<label class="btn btn-shadow btn-outline-primary">
																	<input type="radio" id="had_this_problem_before" value="yes" name="had_this_problem_before"  > 
																   Yes
																</label>
																<label class="btn btn-shadow btn-outline-primary active">
																	<input type="radio" id="had_this_problem_before1" value="no" name="had_this_problem_before" > 
																	No
																</label>
																</div>
															  </div>
														    </div>
															<div class="col-md-4">
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class=""> What treatments you had?</label>
																	<textarea placeholder="" type="text" name="what_treatment_you_had" id="what_treatment_you_had" style="width:250px;" class="form-control"></textarea>
																	</div> 
																</div> 
															</div>
														</div></br>
																<div class="col-md-8">
																<div class="clearfix">
																	<button type="submit" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-pill btn-primary">Submit</button>
																	<button  id="prev-btn" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">cancel</button>
																</div>
																</div>															
															 </div>
													</form></br>  </br>  
															
													 <div class="table-responsive">
													<center> <table  class="table table-striped table-bordered chief_notes" id="basicDataTable">
														<thead>
														  <tr>
															<th class="text-center" >Date</th>
															<th class="text-center" >Chief Complaints</th>
															<th class="text-center" >Action</th>
														 </tr>
														</thead>
														<tbody>
														<?php if($chief_comp != false){  ?>
														<?php 
														foreach ($chief_comp as $row) {
														$arrchief_complaints_dtl = explode("\n",$row['chief_complaints_dtl']);
													
														?>
														<tr id="<?php echo $row['patient_id'].'chief'.$row['cc_id'] ?>">
															<td class="text-center" ><?php echo date('d-m-Y',strtotime($row['cc_date'])); ?></td>
															<td class="text-center" ><?php
																for($i=0;$i<count($arrchief_complaints_dtl);$i++){
																	echo $arrchief_complaints_dtl[$i].'<br>';
																}
															  ?></td>
															<td class="actions text-center"><a class="edit"  href="<?php echo base_url().'client/patient/edit_assessment_chiefcomp/'.$row['patient_id'].'/'.$row['cc_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
															<a class="DeleteCc" href="<?php echo '#'.$row['patient_id'].'#'.$row['cc_id']; ?>"><button  class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fa fa-trash-alt"> </i></button></a></td>
														</tr>
														<?php  } } else { ?>
																	<tr><td colspan="4"><center> No More Records Found </center></td></tr>
																<?php } ?>
														</tbody>
													  </table></center></div>
													
														</div>
													</div>
											</div>
											
											 <div class="tab-pane show" id="pain" role="tabpanel">
													<div class="main-card mb-6">
														<div class="card-body">
														<form action ="<?php echo base_url().'client/patient/add_pain' ?>" method="post" id="pain" >
														<input type="hidden" name="patient_id" value="<?php echo $this->uri->segment('5') ?>" />
													<div class="row">
														<div class="col-md-4">
															 <div class="input-group">
															<div class="position-relative form-group"><label for="bill_no" class="">  Date </label>
																<input type="text" style="width:250px;" class="form-control datepicker" Placeholder="Date" name="pain_date" id="pain_date"  autocomplete="off" data-toggle="datepicker">
															</div>	
															</div>	
													    </div>
														<div class="col-md-4">
														<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">  Pain Site </label>
																<input style="width:250px;" placeholder="Pain site" type="text" name="pain_site" id="pain_site"  class="form-control">
														</div> 
														</div>												   
														</div>
														<div class="col-md-4">
														 <div class="pb-10">
															<div class="position-relative form-group"><label for="bill_no" class=""> Severity of pain </label>
																<div class="br-wrapper br-theme-1to10">
																<select id="bars-1to10" name="severity_of_pain" style="width:100%; background-color:#3f6ad8; display: none;">
																<option value="-- no rating selected --"></option>
																	<option value="1">1 - Mild Pain</option>
																	<option value="2">2 - Mild Pain</option>
																	<option value="3">3 - Moderate Pain</option>
																	<option value="4">4 - Moderate Pain</option>
																	<option value="5">5 - Severe Pain</option>
																	<option value="6">6 - Severe Pain</option>
																	<option value="7">7 - Very Severe Pain</option>
																	<option value="8">8 - Very Severe Pain</option>
																	<option value="9">9 - Worst Pain</option>
																	<option value="10">10 - Worst Pain</option>
																</select></div>
															</div>
														</div>
														</div>		
													 </div></br>
													 <div class="row">
														<div class="col-md-4">  
														<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">  Pain Nature </label>
																<input placeholder="Pain nature" type="text" name="pain_nature" style="width:250px;" id="pain_nature"  class="form-control">
														</div> 
														</div> 
														</div>
														<div class="col-md-4">
														<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class=""> Pain Onset </label>
																<input placeholder="Pain onset" type="text" name="pain_onset" style="width:250px;" id="pain_onset"  class="form-control">
														</div> 
														</div>												   
														</div>
														<div class="col-md-4">
														<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">  Pain Duration </label>
																<input placeholder="Pain duration" type="text" name="pain_duration" style="width:250px;" id="pain_duration"  class="form-control">
														</div> 
														</div> 
														</div>
													   </div></br>
													   <div class="row">
														<div class="col-md-4">
														<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">  Side Or Location </label>
																<input placeholder="Side or location" type="text" name="side_or_location" style="width:250px;" id="side_or_location"  class="form-control">
														</div> 
														</div> 
														</div>
														<div class="col-md-4">
														<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">  Trigger Point</label>
																<input placeholder="Trigger point" type="text" name="trigger_point" style="width:250px;" id="trigger_point"   class="form-control">
														</div> 
														</div> 
														</div>
														<div class="col-md-4">
														<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">  ADL Affected </label>
																<input style="width:250px;" placeholder="ADL Affected" type="text" name="adl_affect" id="adl_affect"   class="form-control">
														</div> 
														</div> 
														</div>
													 </div></br>
													 <div class="row">
														<div class="col-md-8">
															<div class="position-relative form-group"><label for="bill_no" class="">  Diurnal variations &nbsp;&nbsp;</label>
																</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="checkbox" name="diurnal_variations[]" id="diurnal_variations" value="Morning" > 
																	    Morning
																	</label>
																	<label class="btn btn-shadow btn-outline-primary ">
																		<input type="checkbox" name="diurnal_variations[]" id="diurnal_variations1" value="Afternoon" > 
																		Afternoon
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="checkbox" name="diurnal_variations[]" id="diurnal_variations2" value="Evening"  > 
																	    Evening
																	</label>
																	<label class="btn btn-shadow btn-outline-primary ">
																		<input type="checkbox" name="diurnal_variations[]" id="diurnal_variations3" value="Night"> 
																		Night
																	</label>
																	<label class="btn btn-shadow btn-outline-primary ">
																		<input type="checkbox" name="diurnal_variations[]" id="diurnal_variations4" value="No Specific pattern"> 
																		No Specific Pattern
																	</label>
																	</div> </div>
															
														</div>
														<div class="col-md-4">
														<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">  Aggravating factors </label>
																<input style="width:250px;" placeholder="Aggravating factors" type="text" name="aggravating_factors" id="aggravating_factors"   class="form-control">
														</div> 
														</div> 
														</div>
													</div></br>
													 <div class="row">
														
														<div class="col-md-4">
														<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">  Relieving factors </label>
																<input style="width:250px;" placeholder="Relieving factors" type="text" name="releaving_factors" id="releaving_factors"   class="form-control">
														</div> 
														</div> 
														</div>												   
													 </div></br></br>
													<div class="clearfix">
													   <button type="submit" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-pill btn-primary">Submit</button>
														<button  id="prev-btn" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">cancel</button>
													</div></form></br></br>
													
													  <div class="table-responsive">
													  <table  class="table table-striped table-bordered pain_notes" id="basicDataTable">
														<thead>
														  <tr>
															<th class="text-center" >Date</th>
															<th class="text-center" >Pain Site</th>
															<th class="text-center" >Severity Of Pain</th>
															<th class="text-center" >Action</th>
														 </tr>
														</thead>
														<tbody>
														<?php if($pain != false){   ?>
														<?php 
														foreach ($pain as $row) {
															$enteredBy = $row['modify_by'];
															$profileInfo = $this->registration_model->getProfileInfo($enteredBy);
															$staffInfo = $this->staff_model->getStaffInfo($enteredBy);
															
															if($profileInfo != false)
																$clientName = $profileInfo['first_name'];
															else if($staffInfo != false)
																$clientName = $staffInfo['first_name'].' '.$staffInfo['last_name'];
												
														?>
														<tr id="<?php echo $row['patient_id'].'pain'.$row['pain_id'] ?>">
															<td class="text-center" ><?php echo date('d-m-Y',strtotime($row['pain_date'])); ?></td>
															<td class="text-center" ><?php echo $row['pain_site']; ?></td>
															<td class="text-center" ><?php echo $row['severity_of_pain']; ?></td>
															<td class="actions text-center"><a class="edit" href="<?php echo base_url().'client/patient/edit_assessment_pain/'.$row['patient_id'].'/'.$row['pain_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="DeletePain" href="<?php echo '#'.$row['patient_id'].'#'.$row['pain_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"> </i></button></a></td>
														</tr>
														<?php  } } else { ?>
																	<tr><td colspan="4"><center> No More Records Found </center></td></tr>
																<?php } ?>
														</tbody>
													  </table></div>
														</div>
													</div>
											</div>
											 <div class="tab-pane show" id="exam" role="tabpanel">
													<div class="main-card mb-6">
														<div class="card-body">
														<form id="exam" action ="<?php echo base_url().'client/patient/add_examination' ?>" method="post">
														 <input type="hidden" name="patient_id" value="<?php echo $this->uri->segment('5') ?>" />
															<div class="row">
															<div class="col-md-4">
															 <div class="input-group">
															<div class="position-relative form-group"><label for="bill_no" class=""> Date </label>
																<input style="width:250px;" type="text" class="form-control datepicker" Placeholder="Date" name="examn_date" id="examn_date" autocomplete="off" data-toggle="datepicker">
															</div>	
															</div>	
															</div>	
															<div class="col-md-4">	
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class="">  Blood pressure </label>
																	<input style="width:250px;" placeholder="Blood pressure" type="text" name="bp_systolic_diastolic" id="bp_systolic_diastolic" class="form-control">
															  </div><span style="color:#c5c5c5">Systolic/Dialtolic</span>
															</div>
															</div>
															<div class="col-md-4">	
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class="">  Temperature </label>
																<input style="width:250px;" placeholder="Temperature" type="text" name="temperature" id="temperature" class="form-control">
															</div>											
															</div>											
															</div>
														</div></br>
														<div class="row">
															<div class="col-md-4">	
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class=""> Heart rate </label>
																	<input style="width:250px;" placeholder="Heart rate" type="text" name="heart_rate" id="heart_rate" class="form-control">
															</div>											
															</div>											
															</div>											
														<div class="col-md-4">	
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class="">  Respiratory rate </label>
																<input style="width:250px;" placeholder="Respiratory rate" type="text" name="respiratory_rate" id="respiratory_rate" class="form-control">
															</div>											
															</div>											
															</div>
															<div class="col-md-4">	
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class=""> Gait </label>
																<input style="width:250px;" placeholder="Gait" type="text" name="gait" id="gait" class="form-control">
															</div>											
															</div>											
															</div>											
														</div></br></br>
														<div class="row">
															<div class="col-md-4">	
															<div class="position-relative form-group"><label for="bill_no" class="">  Built of the patient </label>
																</br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="Ectomorph" value="Ectomorph" name="built_of_patient" autocomplete="off" > 
																	   Ectomorph
																	</label>
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="Mesomorph" value="Mesomorph" name="built_of_patient" > 
																	    Mesomorph
																	</label>
																	<label class="btn btn-shadow btn-outline-primary ">
																		<input type="radio" id="Endomorph" value="Endomorph" name="built_of_patient" > 
																	    Endomorph
																	</label>
																	</div> </div>										
															</div>	
															<div class="col-md-4">	
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class="">  Posture </label>
																<textarea style="width:250px;" placeholder="Posture" type="text" name="posture" id="posture" class="form-control"></textarea>
															</div>											
															</div>											
															</div>	
															<div class="col-md-4">	
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class="">  Scar type </label>
																<textarea style="width:250px;" placeholder="Scar type" type="text" name="scaretype" id="scaretype" class="form-control"></textarea>
															</div>											
															</div>											
															</div>
														</div></br>
														<div class="row">
														    <div class="col-md-4">	
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class="">  Description </label>
																<textarea style="width:250px;" placeholder="Description" type="text" name="Description" id="Description" class="form-control"></textarea>
															</div>											
															</div>											
															</div>	
														</div></br>
														 <div class="clearfix">
																<button type="submit" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-pill btn-primary">Submit</button>
																<button  id="prev-btn" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">cancel</button>
															</div>											
															
														</br></br>
														</form>
														
													  <div class="table-responsive">
													  <table  class="table table-striped table-bordered exam_notes" id="basicDataTable">
														<thead>
														   <tr>
															<th class="text-center" >Date</th>
															<th class="text-center" >Blood Preasure</th>
															<th class="text-center" >Temperature</th>
															<th class="text-center" >Action</th>
														 </tr>
														</thead>
														<tbody>
														<?php if($examn != false){   ?>
														<?php 
														foreach ($examn as $row) {
															$enteredBy = $row['modify_by'];
															$profileInfo = $this->registration_model->getProfileInfo($enteredBy);
															$staffInfo = $this->staff_model->getStaffInfo($enteredBy);
															
															if($profileInfo != false)
																$clientName = $profileInfo['first_name'];
															else if($staffInfo != false)
																$clientName = $staffInfo['first_name'].' '.$staffInfo['last_name'];
											
														?>
														<tr id="<?php echo $row['patient_id'].'exam'.$row['examn_id'] ?>">
															<td class="text-center" ><?php echo date('d-m-Y',strtotime($row['examn_date'])); ?></td>
															<td class="text-center" ><?php echo $row['bp_systolic_diastolic']; ?></td>
															<td class="text-center" ><?php echo $row['temperature']; ?></td>
															<td class="actions text-center"><a class="edit" href="<?php echo base_url().'client/patient/edit_assessment_exam/'.$row['patient_id'].'/'.$row['examn_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="DeleteExamn" href="<?php echo '#'.$row['patient_id'].'#'.$row['examn_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"> </i></button></a></td>
														</tr>
														<?php  } } else { ?>
																	<tr><td colspan="5"><center> No More Records Found </center></td></tr>
																<?php } ?>
														</tbody>
													  </table></div>
														</div>
													</div>
											</div>
											<style>
											.card-body {
												flex: 0 0 auto;
												padding: 0.50rem;
												
											}
											#head {
												width:920px;											
											}
											#Hip {
												width:920px;											
											}
											#Knee {
												width:920px;											
											}
											#Ankle {
												width:920px;											
											}
											#Toes {
												width:920px;											
											}
											#Hallux {
												width:920px;											
											}
											#Scapula {
												width:920px;											
											}
											#shoulder {
												width:920px;											
											}
											#elbow {
												width:920px;											
											}
											#respiration {
												width:920px;											
											}
											#thumb {
												width:920px;											
											}
											#fore {
												width:920px;											
											}
											</style>
											 <div class="tab-pane show" id="motor" role="tabpanel">
													<div class="main-card mb-16">
														<div class="card-body">
															<form id="motor_exam" action="<?php echo base_url().'client/patient/add_mexamination' ?>" method="post" >
														<input type="hidden" name="patient_id" value="<?php echo $this->uri->segment('5') ?>" />
														<div class="row">
															<div class="col-md-4">
															 <div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class="">  Date </label>
																<input type="text" class="form-control datepicker" Placeholder="Date" name="mexamn_date" id="mexamn_date" autocomplete="off" data-toggle="datepicker">
															 </div>	
															 </div>	
															</div>	
														</div></br>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#head" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Head, Neck and Truck</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="head" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																 <div class="table-responsive">
																 <table  class="table table-striped table-bordered" id="advancedDataTable">
																		<tr>
																			<td style="width:30%">
																				<div>
																					<h4  style="color:#3f6ad8; margin-left:125px">Left</h4>
																				</div>
																			</td>
																			<td style="width:40%">
																				<div>
																					<h4 style="color:#3f6ad8; margin-left:140px">Parameters</h4>
																				</div>
																			</td>
																			<td style="width:30%">
																				<div>
																					<h4 style="color:#3f6ad8; margin-left:110px">Right</h4>
																				</div>
																			</td>
																		</tr>
																		<tr>
																			<td style="width:30%">
																				<div>
																					<span class="badge badge-primary" >Tone</span>
																					<span class="badge badge-primary" style="margin-left:60px">Power</span>
																					<span class="badge badge-primary" style="margin-left:30px">ROM</span>
																				</div>
																			</td>
																			<td style="width:40%">
																				<div>
																					<span class="badge badge-primary" >Movement</span>
																					<span class="badge badge-primary" style="margin-left:60px">Muscles</span>
																					<span class="badge badge-primary" style="margin-left:60px">Nerve root</span>
																				</div>
																			</td>
																			<td style="width:30%">
																				<div>
																					<span class="badge badge-primary" >ROM</span>
																					<span class="badge badge-primary" style="margin-left:32px">Power</span>
																					<span class="badge badge-primary" style="margin-left:29px">Tone</span>
																					
																				</div>
																			</td>
																		</tr>
																		<?php
																			foreach($headneck as $headnecks){
																		?>
																		<tr>
																			<td style="width:30%">
																				<div>
																					<span >
																						<input type="hidden" class="span11" name="headneck_muscle_id[]" id="headneck_muscle_id[]" value="<?php echo $headnecks['headneck_muscle_id']; ?>" autocomplete="off">
																						<select class="select-control" name="left_headneck_tone[]" id="left_headneck_tone[]" placeholder="select" style="width:90px">
																						<option></option>
																						<option value="Normal">Normal</option>
																						<option value="Flaccid">Flaccid</option>
																						<option value="Spastic">Spastic</option>
																						<option value="Regid">Regid</option>
																					</select></span>
																					<?php if($headnecks['headneck_muscle_id'] != 1) { ?>
																					<span style="margin-left:15px;">
																						<select class="select-control" name="left_headneck_power[]" id="left_headneck_power[]" placeholder="--" style="width:65px">
																						<option></option>
																						<option value="5">5</option>
																						<option value="5-">5-</option>
																						<option value="4+">4+</option>
																						<option value="4">4</option>
																						<option value="4-">4-</option>
																						<option value="3+">3+</option>
																						<option value="3">3</option>
																						<option value="3-">3-</option>
																						<option value="2+">2+</option>
																						<option value="2">2</option>
																						<option value="2-">2-</option>
																						<option value="1">1</option>
																						<option value="0">0</option>
																					</select></span>
																					<span >
																						<input type="text"  name="left_headneck_rom[]" id="left_headneck_rom[]" placeholder="Degree" style="width:50px;margin-left:20px"  value="" autocomplete="off"/>
																						</span><?php } else if($headnecks['headneck_muscle_id'] == 1) { ?>
																							<span style="margin-left:15px;display:none">
																							<select class="select-control" name="left_headneck_power[]" id="left_headneck_power[]" placeholder="--" style="width:65px">
																							<option></option>
																							<option value="5">5</option>
																							<option value="5-">5-</option>
																							<option value="4+">4+</option>
																							<option value="4">4</option>
																							<option value="4-">4-</option>
																							<option value="3+">3+</option>
																							<option value="3">3</option>
																							<option value="3-">3-</option>
																							<option value="2+">2+</option>
																							<option value="2">2</option>
																							<option value="2-">2-</option>
																							<option value="1">1</option>
																							<option value="0">0</option>
																						</select></span>
																						<span >
																							<input type="hidden"  name="left_headneck_rom[]" id="left_headneck_rom[]" placeholder="Degree" style="width:50px;margin-left:20px"  value="" autocomplete="off"/>
																						</span>
																					<?php } ?>
																				</div>
																			</td>
																			<td style="width:40%">
																				<div>
																					<span style="width:70px" class="badge badge-info"><?php echo $headnecks['movement']; ?></span>
																					<?php if($headnecks['headneck_muscle_id']!=1){ ?>
																					<span style="width:92px;margin-left:55px" class="badge badge-secondary"><?php echo $headnecks['muscles']; ?></span>
																					<span style="width:60px;margin-left:38px" class="badge badge-warning"><?php echo $headnecks['nerve_root']; ?></span>
																					<?php } else { ?>
																					<span style="width:92px;margin-left:130px" class="badge badge-secondary"><?php echo $headnecks['muscles']; ?></span>
																					<span style="width:60px;margin-left:38px" class="badge badge-warning"><?php echo $headnecks['nerve_root']; ?></span>
																					<?php } ?>
																				</div>
																			</td>
																			<td style="width:30%">
																				<div>
																					<?php if($headnecks['headneck_muscle_id'] != 1) { ?>
																					<span >
																						<input type="text"  name="right_headneck_rom[]" id="right_headneck_rom[]" placeholder="Degree" style="width:50px" autocomplete="off"/>
																					</span>
																					<span style="margin-left:15px;">
																						<select class="select-control" name="right_headneck_power[]" id="right_headneck_power[]" placeholder="--" style="width:65px;margin-left:15px">
																						<option></option>
																						<option value="5">5</option>
																						<option value="5-">5-</option>
																						<option value="4+">4+</option>
																						<option value="4">4</option>
																						<option value="4-">4-</option>
																						<option value="3+">3+</option>
																						<option value="3">3</option>
																						<option value="3-">3-</option>
																						<option value="2+">2+</option>
																						<option value="2">2</option>
																						<option value="2-">2-</option>
																						<option value="1">1</option>
																						<option value="0">0</option>
																					</select></span><?php } else if($headnecks['headneck_muscle_id'] == 1){  ?>
																						<span >
																						<input type="hidden"  name="right_headneck_rom[]" id="right_headneck_rom[]" placeholder="Degree" style="width:50px" autocomplete="off"/>
																					</span>
																					<span style="margin-left:15px;display:none">
																						<select class="select-control" name="right_headneck_power[]" id="right_headneck_power[]" placeholder="--" style="width:65px;margin-left:15px">
																						<option></option>
																						<option value="5">5</option>
																						<option value="5-">5-</option>
																						<option value="4+">4+</option>
																						<option value="4">4</option>
																						<option value="4-">4-</option>
																						<option value="3+">3+</option>
																						<option value="3">3</option>
																						<option value="3-">3-</option>
																						<option value="2+">2+</option>
																						<option value="2">2</option>
																						<option value="2-">2-</option>
																						<option value="1">1</option>
																						<option value="0">0</option>
																					</select></span>
																					<?php } ?>
																					<?php if($headnecks['headneck_muscle_id']!=1) { ?>
																					<span style="margin-left:20px">
																						<select class="select-control" name="right_headneck_tone[]" id="right_headneck_tone[]" placeholder="Select" style="width:90px;">
																						<option></option>
																						<option value="Normal">Normal</option>
																						<option value="Flaccid">Flaccid</option>
																						<option value="Spastic">Spastic</option>
																						<option value="Regid">Regid</option>
																					</select></span><?php }else{  ?>
																					<span style="margin-left:158px">
																						<select class="select-control" name="right_headneck_tone[]" id="right_headneck_tone[]" placeholder="Select" style="width:90px;">
																						<option></option>
																						<option value="Normal">Normal</option>
																						<option value="Flaccid">Flaccid</option>
																						<option value="Spastic">Spastic</option>
																						<option value="Regid">Regid</option>
																					</select></span>
																					<?php } ?>
																				</div>
																			</td>
																		</tr>
																		<?php
																			}
																		?>
																	</table>
																  </div>
																</div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#spine" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Combined movement Assesment of spine</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="spine" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																<div class="table-responsive">
																	<label></label>
																	<table  class="table table-striped table-bordered" id="advancedDataTable">
																	<tr><td class="text-center" >Cervical spine</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="cervical"> </td></tr>
																	<tr><td class="text-center" >Thoracic Spine</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="thoracic"> </td></tr>
																	<tr><td class="text-center" >Lumbar Spine</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="lumbar"> </td></tr>
																	</table>
																	</div>
																</div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#Cervical" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Cervical Spine</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="Cervical" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																 <div class="table-responsive">
																<table  class="table table-striped table-bordered" id="advancedDataTable">
																<tr><td class="text-center" >Flexion</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="flexion1"> </td></tr>
																<tr><td class="text-center" >Extension</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Extension1"> </td></tr>
																</table>
																</div>
																
																<div class="table-responsive">
																<table  class="table table-striped table-bordered" id="advancedDataTable">
																<tr><td class="text-center" ><h6 style="color:#3f6ad8;">Side Flexion</h6></td><td class="text-center" >Left</td><td class="text-center" ><input  type="text" class="form-control" name="SideFlexion_left1"> </td><td class="text-center" >Right</td><td class="text-center" ><input type="text" class="form-control" name="SideFlexion_right1"> </td></tr>
																<tr><td class="text-center" ><h6 style="color:#3f6ad8;">Rotation</h6></td><td class="text-center" >Left</td><td class="text-center" ><input type="text" class="form-control" name="Rotation_left1"> </td><td class="text-center" >Right</td><td class="text-center" ><input type="text" class="form-control" name="Rotation_right1"> </td></tr>
																</table>
																</div>
																</div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#Thoraccic" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Thoraccic Spine </h5>
																</button>
															</div>
															<div data-parent="#accordion" id="Thoraccic" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																 <div class="table-responsive">
																<label></label>
																<table  class="table table-striped table-bordered" id="advancedDataTable">
																	<tr><td class="text-center" >Flexion</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="flexion2"> </td></tr>
																	<tr><td class="text-center" >Extension</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Extension2"> </td></tr>
																</table>
																</div>
																<div class="table-responsive">
																<table  class="table table-striped table-bordered" id="advancedDataTable">
																<tr><td class="text-center" ><h6 style="color:#3f6ad8;">Side Flexion</h6></td><td class="text-center" >Left</td><td class="text-center" ><input type="text" class="form-control" name="SideFlexion_left2"> </td><td class="text-center" >Right</td><td class="text-center" ><input type="text" class="form-control" name="SideFlexion_right2"> </td></tr>
																<tr><td class="text-center" ><h6 style="color:#3f6ad8;">Rotation</h6></td><td class="text-center" >Left</td><td class="text-center" ><input type="text" class="form-control" name="Rotation_left2"> </td><td class="text-center" >Right</td><td class="text-center" ><input type="text" class="form-control" name="Rotation_right2"> </td></tr>
																</table>
																</div>
																</div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#lumber" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Lumber Spine</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="lumber" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																 <div class="table-responsive">
																<table  class="table table-striped table-bordered" id="advancedDataTable">
																	<tr><td class="text-center" >Flexion</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="flexion3"> </td></tr>
																	<tr><td class="text-center" >Extension</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Extension3"> </td></tr>
																</table>
															    </div>
															    <div class="table-responsive">
																	<table  class="table table-striped table-bordered" id="advancedDataTable">
																	<tr><td class="text-center" ><h6 style="color:#3f6ad8;">Side Flexion</h6></td><td class="text-center" >Left</td><td class="text-center" ><input type="text" class="form-control" name="SideFlexion_left3"> </td><td class="text-center" >Right</td><td class="text-center" ><input type="text" class="form-control" name="SideFlexion_right3"> </td></tr>
																	<tr><td class="text-center" ><h6 style="color:#3f6ad8;">Rotation</h6></td><td class="text-center" >Left</td><td class="text-center" ><input type="text" class="form-control" name="rotation_left3"> </td><td class="text-center" >Right</td><td class="text-center" ><input type="text" class="form-control" name="rotation_right3"> </td></tr>
																	</table>
																	 </div>
																</div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#Hip" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Hip</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="Hip" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																<div class="table-responsive">
																	<table  class="table table-striped table-bordered" id="advancedDataTable">
																	<tr>
																	<td style="width:30%">
																	<div>
																	<h4  style="color:#3f6ad8; margin-left:125px">Left</h4>
																	</div>
																	</td>
																	<td style="width:40%">
																	<div>
																	<h4  style="color:#3f6ad8; margin-left:140px">Parameters</h4>
																	</div>
																	</td>
																	<td style="width:40%">
																	<div>
																	<h4  style="color:#3f6ad8; margin-left:110px">Right</h4>
																	</div>
																	</td>
																	</tr>
																	<tr>
																	<td style="width:30%">
																	<div>
																	<span class="badge badge-primary" >Tone</span>
																	<span class="badge badge-primary" style="margin-left:60px">Power</span>
																	<span class="badge badge-primary" style="margin-left:30px">ROM</span>
																	</div>
																	</td>
																	<td style="width:40%">
																	<div>
																	<span class="badge badge-primary" >Movement</span>
																	<span class="badge badge-primary" style="margin-left:60px">Muscles</span>
																	<span class="badge badge-primary" style="margin-left:60px">Nerve root</span>
																	</div>
																	</td>
																	<td style="width:30%">
																	<div>
																	<span class="badge badge-primary" >ROM</span>
																	<span class="badge badge-primary" style="margin-left:32px">Power</span>
																	<span class="badge badge-primary" style="margin-left:29px">Tone</span>
																	</div>
																	</td>
																	</tr>
																	<?php
																		foreach($hip as $hips){
																	?>
																	<tr>
																	<td style="width:30%">
																	<div>
																		<span >
																		<select class="select-control" name="left_hip_tone[]" id="left_hip_tone[]" placeholder="Select" style="width:90px">
																			<option></option>
																			<option value="Normal">Normal</option>
																			<option value="Flaccid">Flaccid</option>
																			<option value="Spastic">Spastic</option>
																			<option value="Regid">Regid</option>
																		</select></span>
																	<span style="margin-left:15px;">
																		<select class="select-control" name="left_hip_power[]" id="left_hip_power[]" placeholder="--" style="width:65px">
																			<option></option>
																			<option value="5">5</option>
																			<option value="5-">5-</option>
																			<option value="4+">4+</option>
																			<option value="4">4</option>
																			<option value="4-">4-</option>
																			<option value="3+">3+</option>
																			<option value="3">3</option>
																			<option value="3-">3-</option>
																			<option value="2+">2+</option>
																			<option value="2">2</option>
																			<option value="2-">2-</option>
																			<option value="1">1</option>
																			<option value="0">0</option>
																	</select></span>
																	<span >
																	<input type="text"  name="left_hip_rom[]" id="left_hip_rom[]" placeholder="Degree" style="width:50px;margin-left:20px" autocomplete="off"/>
																	<input type="hidden" class="span11" name="hip_muscle_id[]" id="hip_muscle_id[]" value="<?php echo $hips['hip_muscle_id']; ?>" autocomplete="off">
																	</span>
																	</div>
																	</td>
																	<td style="width:40%">
																	<div>
																	<span style="width:70px" class="badge badge-info"><?php echo $hips['movement']; ?></span>
																		<span style="width:78px;margin-left:55px" class="badge badge-secondary"><?php echo $hips['muscles']; ?></span>
																		<span style="width:60px;margin-left:50px" class="badge badge-warning"><?php echo $hips['nerve_root']; ?></span>
																	</div>
																	</td>
																	<td style="width:40%">
																			<div>
																			<span >
																			<input type="text"  name="right_hip_rom[]" id="right_hip_rom[]" placeholder="Degree" style="width:50px" autocomplete="off"/>
																		</span>
																		<span style="margin-left:15px;">
																			<select class="select-control" name="right_hip_power[]" id="right_hip_power[]" placeholder="--" style="width:65px;margin-left:15px">
																				<option></option>
																				<option value="5">5</option>
																				<option value="5-">5-</option>
																				<option value="4+">4+</option>
																				<option value="4">4</option>
																				<option value="4-">4-</option>
																				<option value="3+">3+</option>
																				<option value="3">3</option>
																				<option value="3-">3-</option>
																				<option value="2+">2+</option>
																				<option value="2">2</option>
																				<option value="2-">2-</option>
																				<option value="1">1</option>
																				<option value="0">0</option>
																			</select></span>
																			<span style="margin-left:20px">
																			<select class="select-control" name="right_hip_tone[]" id="right_hip_tone[]" placeholder="Select" style="width:90px;">
																					<option></option>
																					<option value="Normal">Normal</option>
																					<option value="Flaccid">Flaccid</option>
																					<option value="Spastic">Spastic</option>
																					<option value="Regid">Regid</option>
																			</select></span>
																			</div>
																			</td>
																			</tr>
																			<?php
																				}
																			?>
																	</table>
																</div>
																</div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#Knee" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Knee</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="Knee" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																<div class="table-responsive">
																			  <label></label>
																				<table  class="table table-striped table-bordered" id="advancedDataTable">
																				<tr>
																					<td style="width:30%">
																							<div>
																								<h4  style="color:#3f6ad8; margin-left:125px">Left</h4>
																							</div>
																						</td>
																						<td style="width:40%">
																							<div>
																								<h4  style="color:#3f6ad8; margin-left:140px">Parameters</h4>
																							</div>
																						</td>
																						<td style="width:30%">
																							<div>
																								<h4  style="color:#3f6ad8; margin-left:110px">Right</h4>
																							</div>
																						</td>
																				</tr>
																				<tr>
																					<td style="width:30%">
																						<div>
																							<span class="badge badge-primary" >Tone</span>
																							<span class="badge badge-primary" style="margin-left:60px">Power</span>
																							<span class="badge badge-primary" style="margin-left:30px">ROM</span>
																						</div>
																					</td>
																					<td style="width:40%">
																						<div>
																							<span class="badge badge-primary" >Movement</span>
																							<span class="badge badge-primary" style="margin-left:60px">Muscles</span>
																							<span class="badge badge-primary" style="margin-left:60px">Nerve root</span>
																						</div>
																					</td>
																					<td style="width:30%">
																						<div>
																							<span class="badge badge-primary" >ROM</span>
																							<span class="badge badge-primary" style="margin-left:32px">Power</span>
																							<span class="badge badge-primary" style="margin-left:29px">Tone</span>
																							
																						</div>
																					</td>
																				</tr>
																				<?php
																					foreach($knee as $knees){
																				?>
																				<tr>
																					<td style="width:30%">
																						<div>
																							<span >
																								<select class="select-control" name="left_knee_tone[]" id="left_knee_tone[]" placeholder="Select" style="width:90px">
																								<option></option>
																								<option value="Normal">Normal</option>
																								<option value="Flaccid">Flaccid</option>
																								<option value="Spastic">Spastic</option>
																								<option value="Regid">Regid</option>
																							</select></span>
																							<span style="margin-left:15px;">
																								<select class="select-control" name="left_knee_power[]" id="left_knee_power[]" placeholder="--" style="width:65px">
																								<option></option>
																								<option value="5">5</option>
																								<option value="5-">5-</option>
																								<option value="4+">4+</option>
																								<option value="4">4</option>
																								<option value="4-">4-</option>
																								<option value="3+">3+</option>
																								<option value="3">3</option>
																								<option value="3-">3-</option>
																								<option value="2+">2+</option>
																								<option value="2">2</option>
																								<option value="2-">2-</option>
																								<option value="1">1</option>
																								<option value="0">0</option>
																							</select></span>
																							<span >
																								<input type="text"  name="left_knee_rom[]" id="left_knee_rom[]" placeholder="Degree" style="width:50px;margin-left:20px" autocomplete="off"/>
																								<input type="hidden" class="span11" name="knee_muscle_id[]" id="knee_muscle_id[]" value="<?php echo $knees['knee_muscle_id']; ?>" autocomplete="off">
																							</span>
																						</div>
																					</td>
																					<td style="width:40%">
																						<div>
																							<span style="width:70px" class="badge badge-info"><?php echo $knees['movement']; ?></span>
																							<span style="width:92px;margin-left:55px" class="badge badge-secondary"><?php echo $knees['muscles']; ?></span>
																							<span style="width:60px;margin-left:38px" class="badge badge-warning"><?php echo $knees['nerve_root']; ?></span>
																						</div>
																					</td>
																					<td style="width:30%">
																						<div>
																							<span >
																								<input type="text"  name="right_knee_rom[]" id="right_knee_rom[]" placeholder="Degree" style="width:50px" autocomplete="off"/>
																							</span>
																							<span style="margin-left:15px;">
																								<select class="select-control" name="right_knee_power[]" id="right_knee_power[]" placeholder="--" style="width:65px;margin-left:15px">
																								<option></option>
																								<option value="5">5</option>
																								<option value="5-">5-</option>
																								<option value="4+">4+</option>
																								<option value="4">4</option>
																								<option value="4-">4-</option>
																								<option value="3+">3+</option>
																								<option value="3">3</option>
																								<option value="3-">3-</option>
																								<option value="2+">2+</option>
																								<option value="2">2</option>
																								<option value="2-">2-</option>
																								<option value="1">1</option>
																								<option value="0">0</option>
																							</select></span>
																							<span style="margin-left:20px">
																								<select class="select-control" name="right_knee_tone[]" id="right_knee_tone[]" placeholder="Select" style="width:90px;">
																								<option></option>
																								<option value="Normal">Normal</option>
																								<option value="Flaccid">Flaccid</option>
																								<option value="Spastic">Spastic</option>
																								<option value="Regid">Regid</option>
																							</select></span>
																						</div>
																					</td>
																				</tr>
																				<?php
																					}
																	?></tr></table>
																  </div>
																</div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#Ankle" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Ankle</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="Ankle" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																<div class="table-responsive">
																  <label></label>
																	<table  class="table table-striped table-bordered" id="advancedDataTable">
																	<tr>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:125px">Left</h4>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:140px">Parameters</h4>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:110px">Right</h4>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >Tone</span>
																				<span class="badge badge-primary" style="margin-left:60px">Power</span>
																				<span class="badge badge-primary" style="margin-left:30px">ROM</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span class="badge badge-primary" >Movement</span>
																				<span class="badge badge-primary" style="margin-left:60px">Muscles</span>
																				<span class="badge badge-primary" style="margin-left:60px">Nerve root</span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >ROM</span>
																				<span class="badge badge-primary" style="margin-left:32px">Power</span>
																				<span class="badge badge-primary" style="margin-left:29px">Tone</span>
																				
																			</div>
																		</td>
																	</tr>
																	<?php
																		foreach($ankle as $ankles){
																	?>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span >
																					<select class="select-control" name="left_ankle_tone[]" id="left_ankle_tone[]" placeholder="Select" style="width:90px">
																					<option></option>
																					<option value="Normal">Normal</option>
																					<option value="Flaccid">Flaccid</option>
																					<option value="Spastic">Spastic</option>
																					<option value="Regid">Regid</option>
																				</select></span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="left_ankle_power[]" id="left_ankle_power[]" placeholder="--" style="width:65px">
																					<option></option>
																					<option value="5">5</option>
																					<option value="5-">5-</option>
																					<option value="4+">4+</option>
																					<option value="4">4</option>
																					<option value="4-">4-</option>
																					<option value="3+">3+</option>
																					<option value="3">3</option>
																					<option value="3-">3-</option>
																					<option value="2+">2+</option>
																					<option value="2">2</option>
																					<option value="2-">2-</option>
																					<option value="1">1</option>
																					<option value="0">0</option>
																				</select></span>
																				<span >
																					<input type="text"  name="left_ankle_rom[]" id="left_ankle_rom[]" placeholder="Degree" style="width:50px;margin-left:20px" autocomplete="off"/>
																					<input type="hidden" class="span11" name="ankle_muscle_id[]" id="ankle_muscle_id[]" value="<?php echo $ankles['ankle_muscle_id']; ?>" autocomplete="off">
																				</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span style="width:70px" class="badge badge-info"><?php echo $ankles['movement']; ?></span>
																				<span style="width:120px;margin-left:25px" class="badge badge-secondary"><?php echo $ankles['muscles']; ?></span>
																				<span style="width:65px;margin-left:38px" class="badge badge-warning"><?php echo $ankles['nerve_root']; ?></span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span >
																					<input type="text"  name="right_ankle_rom[]" id="right_ankle_rom[]" placeholder="Degree" style="width:50px" autocomplete="off"/>
																				</span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="right_ankle_power[]" id="right_ankle_power[]" placeholder="--" style="width:65px;margin-left:15px">
																					<option></option>
																					<option value="5">5</option>
																					<option value="5-">5-</option>
																					<option value="4+">4+</option>
																					<option value="4">4</option>
																					<option value="4-">4-</option>
																					<option value="3+">3+</option>
																					<option value="3">3</option>
																					<option value="3-">3-</option>
																					<option value="2+">2+</option>
																					<option value="2">2</option>
																					<option value="2-">2-</option>
																					<option value="1">1</option>
																					<option value="0">0</option>
																				</select></span>
																				<span style="margin-left:20px">
																					<select class="select-control" name="right_ankle_tone[]" id="right_ankle_tone[]" placeholder="Select" style="width:90px;">
																					<option></option>
																					<option value="Normal">Normal</option>
																					<option value="Flaccid">Flaccid</option>
																					<option value="Spastic">Spastic</option>
																					<option value="Regid">Regid</option>
																				</select></span>
																			</div>
																		</td>
																	</tr>
																	<?php
																		}
																	?>
																	</table>
																  </div>
																</div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#Toes" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Toes</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="Toes" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																 <div class="table-responsive">
															  <label></label>
																<table  class="table table-striped table-bordered" id="advancedDataTable">
																<tr>
																	<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:125px">Left</h4>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:140px">Parameters</h4>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:110px">Right</h4>
																			</div>
																		</td>
																</tr>
																<tr>
																	<td style="width:30%">
																		<div>
																			<span class="badge badge-primary" >Tone</span>
																			<span class="badge badge-primary" style="margin-left:60px">Power</span>
																			<span class="badge badge-primary" style="margin-left:30px">ROM</span>
																		</div>
																	</td>
																	<td style="width:40%">
																		<div>
																			<span class="badge badge-primary" >Movement</span>
																			<span class="badge badge-primary" style="margin-left:60px">Muscles</span>
																			<span class="badge badge-primary" style="margin-left:60px">Nerve root</span>
																		</div>
																	</td>
																	<td style="width:30%">
																		<div>
																			<span class="badge badge-primary" >ROM</span>
																			<span class="badge badge-primary" style="margin-left:32px">Power</span>
																			<span class="badge badge-primary" style="margin-left:29px">Tone</span>
																			
																		</div>
																	</td>
																</tr>
																<?php
																	foreach($toes as $toes1){
																?>
																<tr>
																	<td style="width:30%">
																		<div>
																			<span >
																				<select class="select-control" name="left_toes_tone[]" id="left_toes_tone[]" placeholder="Select" style="width:90px">
																				<option></option>
																				<option value="Normal">Normal</option>
																				<option value="Flaccid">Flaccid</option>
																				<option value="Spastic">Spastic</option>
																				<option value="Regid">Regid</option>
																			</select></span>
																			<span style="margin-left:15px;">
																				<select class="select-control" name="left_toes_power[]" id="left_toes_power[]" placeholder="--" style="width:65px">
																				<option></option>
																				<option value="5">5</option>
																				<option value="5-">5-</option>
																				<option value="4+">4+</option>
																				<option value="4">4</option>
																				<option value="4-">4-</option>
																				<option value="3+">3+</option>
																				<option value="3">3</option>
																				<option value="3-">3-</option>
																				<option value="2+">2+</option>
																				<option value="2">2</option>
																				<option value="2-">2-</option>
																				<option value="1">1</option>
																				<option value="0">0</option>
																			</select></span>
																			<span >
																				<input type="text"  name="left_toes_rom[]" id="left_toes_rom[]" placeholder="Degree" style="width:50px;margin-left:20px" autocomplete="off"/>
																				<input type="hidden" class="span11" name="toes_muscle_id[]" id="toes_muscle_id[]" value="<?php echo $toes1['toes_muscle_id']; ?>" autocomplete="off">
																			</span>
																		</div>
																	</td>
																	<td style="width:40%">
																		<div>
																			<span style="width:70px" class="badge badge-info"><?php echo $toes1['movement']; ?></span>
																			<span style="width:147px;margin-left:12px" class="badge badge-secondary"><?php echo $toes1['muscles']; ?></span>
																			<span style="width:60px;margin-left:26px" class="badge badge-warning"><?php echo $toes1['nerve_root']; ?></span>
																		</div>
																	</td>
																	<td style="width:30%">
																		<div>
																			<span >
																				<input type="text"  name="right_toes_rom[]" id="right_toes_rom[]" placeholder="Degree" style="width:50px" autocomplete="off"/>
																			</span>
																			<span style="margin-left:15px;">
																				<select class="select-control" name="right_toes_power[]" id="right_toes_power[]" placeholder="--" style="width:65px;margin-left:15px">
																				<option></option>
																				<option value="5">5</option>
																				<option value="5-">5-</option>
																				<option value="4+">4+</option>
																				<option value="4">4</option>
																				<option value="4-">4-</option>
																				<option value="3+">3+</option>
																				<option value="3">3</option>
																				<option value="3-">3-</option>
																				<option value="2+">2+</option>
																				<option value="2">2</option>
																				<option value="2-">2-</option>
																				<option value="1">1</option>
																				<option value="0">0</option>
																			</select></span>
																			<span style="margin-left:20px">
																				<select class="select-control" name="right_toes_tone[]" id="right_toes_tone[]" placeholder="Select" style="width:90px;">
																				<option></option>
																				<option value="Normal">Normal</option>
																				<option value="Flaccid">Flaccid</option>
																				<option value="Spastic">Spastic</option>
																				<option value="Regid">Regid</option>
																			</select></span>
																		</div>
																	</td>
																</tr>
																<?php
																	}
																?>
																</table>
															  </div></div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#Hallux" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Hallux</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="Hallux" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																 <div class="table-responsive">
															  <label></label>
																<table  class="table table-striped table-bordered" id="advancedDataTable">
																<tr>
																	<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:125px">Left</h4>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:140px">Parameters</h4>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:110px">Right</h4>
																			</div>
																		</td>
																</tr>
																<tr>
																	<td style="width:30%">
																		<div>
																			<span class="badge badge-primary" >Tone</span>
																			<span class="badge badge-primary" style="margin-left:60px">Power</span>
																			<span class="badge badge-primary" style="margin-left:30px">ROM</span>
																		</div>
																	</td>
																	<td style="width:40%">
																		<div>
																			<span class="badge badge-primary" >Movement</span>
																			<span class="badge badge-primary" style="margin-left:60px">Muscles</span>
																			<span class="badge badge-primary" style="margin-left:60px">Nerve root</span>
																		</div>
																	</td>
																	<td style="width:30%">
																		<div>
																			<span class="badge badge-primary" >ROM</span>
																			<span class="badge badge-primary" style="margin-left:32px">Power</span>
																			<span class="badge badge-primary" style="margin-left:29px">Tone</span>
																			
																		</div>
																	</td>
																</tr>
																<?php
																	foreach($hallux as $halluxs){
																?>
																<tr>
																	<td style="width:30%">
																		<div>
																			<span >
																				<select class="select-control" name="left_hallux_tone[]" id="left_hallux_tone[]" placeholder="Select" style="width:90px">
																				<option></option>
																				<option value="Normal">Normal</option>
																				<option value="Flaccid">Flaccid</option>
																				<option value="Spastic">Spastic</option>
																				<option value="Regid">Regid</option>
																			</select></span>
																			<span style="margin-left:15px;">
																				<select class="select-control" name="left_hallux_power[]" id="left_hallux_power[]" placeholder="--" style="width:65px">
																				<option></option>
																				<option value="5">5</option>
																				<option value="5-">5-</option>
																				<option value="4+">4+</option>
																				<option value="4">4</option>
																				<option value="4-">4-</option>
																				<option value="3+">3+</option>
																				<option value="3">3</option>
																				<option value="3-">3-</option>
																				<option value="2+">2+</option>
																				<option value="2">2</option>
																				<option value="2-">2-</option>
																				<option value="1">1</option>
																				<option value="0">0</option>
																			</select></span>
																			<span >
																				<input type="text"  name="left_hallux_rom[]" id="left_hallux_rom[]" placeholder="Degree" style="width:50px;margin-left:20px" autocomplete="off"/>
																				<input type="hidden" class="span11" name="hallux_muscle_id[]" id="hallux_muscle_id[]" value="<?php echo $halluxs['hallux_muscle_id']; ?>" autocomplete="off">
																			</span>
																		</div>
																	</td>
																	<td style="width:40%">
																		<div>
																			<span style="width:70px" class="badge badge-info"><?php echo $halluxs['movement']; ?></span>
																			<span style="width:78px;margin-left:55px" class="badge badge-secondary"><?php echo $halluxs['muscles']; ?></span>
																			<span style="width:60px;margin-left:53px" class="badge badge-warning"><?php echo $halluxs['nerve_root']; ?></span>
																		</div>
																	</td>
																	<td style="width:30%">
																		<div>
																			<span >
																				<input type="text"  name="right_hallux_rom[]" id="right_hallux_rom[]" placeholder="Degree" style="width:50px" autocomplete="off"/>
																			</span>
																			<span style="margin-left:15px;">
																				<select class="select-control" name="right_hallux_power[]" id="right_hallux_power[]" placeholder="--" style="width:65px;margin-left:15px">
																				<option></option>
																				<option value="5">5</option>
																				<option value="5-">5-</option>
																				<option value="4+">4+</option>
																				<option value="4">4</option>
																				<option value="4-">4-</option>
																				<option value="3+">3+</option>
																				<option value="3">3</option>
																				<option value="3-">3-</option>
																				<option value="2+">2+</option>
																				<option value="2">2</option>
																				<option value="2-">2-</option>
																				<option value="1">1</option>
																				<option value="0">0</option>
																			</select></span>
																			<span style="margin-left:20px">
																				<select class="select-control" name="right_hallux_tone[]" id="right_hallux_tone[]" placeholder="Select" style="width:90px;">
																				<option></option>
																				<option value="Normal">Normal</option>
																				<option value="Flaccid">Flaccid</option>
																				<option value="Spastic">Spastic</option>
																				<option value="Regid">Regid</option>
																			</select></span>
																		</div>
																	</td>
																</tr>
																<?php
																	}
																?>
																</table>
															  </div>
															  </div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#Scapula" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Scapula</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="Scapula" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																<div class="table-responsive">
																  <label></label>
																	<table  class="table table-striped table-bordered" id="advancedDataTable">
																	<tr>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:125px">Left</h4>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:140px">Parameters</h4>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:110px">Right</h4>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >Tone</span>
																				<span class="badge badge-primary" style="margin-left:60px">Power</span>
																				<span class="badge badge-primary" style="margin-left:30px">ROM</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span class="badge badge-primary" >Movement</span>
																				<span class="badge badge-primary" style="margin-left:60px">Muscles</span>
																				<span class="badge badge-primary" style="margin-left:60px">Nerve root</span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >ROM</span>
																				<span class="badge badge-primary" style="margin-left:32px">Power</span>
																				<span class="badge badge-primary" style="margin-left:29px">Tone</span>
																				
																			</div>
																		</td>
																	</tr>
																	<?php
																		foreach($scapula as $scapulas){
																	?>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span >
																					<select class="select-control" name="left_scapula_tone[]" id="left_scapula_tone[]" placeholder="Select" style="width:90px">
																					<option></option>
																					<option value="Normal">Normal</option>
																					<option value="Flaccid">Flaccid</option>
																					<option value="Spastic">Spastic</option>
																					<option value="Regid">Regid</option>
																				</select></span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="left_scapula_power[]" id="left_scapula_power[]" placeholder="--" style="width:65px">
																					<option></option>
																					<option value="5">5</option>
																					<option value="5-">5-</option>
																					<option value="4+">4+</option>
																					<option value="4">4</option>
																					<option value="4-">4-</option>
																					<option value="3+">3+</option>
																					<option value="3">3</option>
																					<option value="3-">3-</option>
																					<option value="2+">2+</option>
																					<option value="2">2</option>
																					<option value="2-">2-</option>
																					<option value="1">1</option>
																					<option value="0">0</option>
																				</select></span>
																				<span >
																					<input type="text"  name="left_scapula_rom[]" id="left_scapula_rom[]" placeholder="Degree" style="width:50px;margin-left:20px" autocomplete="off"/>
																					<input type="hidden" class="span11" name="scapula_muscle_id[]" id="scapula_muscle_id[]" value="<?php echo $scapulas['scapula_muscle_id']; ?>" autocomplete="off">
																				</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span style="width:70px" class="badge badge-info"><?php echo $scapulas['movement']; ?></span>
																				<span style="width:78px;margin-left:55px" class="badge badge-secondary"><?php echo $scapulas['muscles']; ?></span>
																				<span style="width:45px;margin-left:53px" class="badge badge-warning"><?php echo $scapulas['nerve_root']; ?></span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span >
																					<input type="text"  name="right_scapula_rom[]" id="right_scapula_rom[]" placeholder="Degree" style="width:50px" autocomplete="off"/>
																				</span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="right_scapula_power[]" id="right_scapula_power[]" placeholder="--" style="width:65px;margin-left:15px">
																					<option></option>
																					<option value="5">5</option>
																					<option value="5-">5-</option>
																					<option value="4+">4+</option>
																					<option value="4">4</option>
																					<option value="4-">4-</option>
																					<option value="3+">3+</option>
																					<option value="3">3</option>
																					<option value="3-">3-</option>
																					<option value="2+">2+</option>
																					<option value="2">2</option>
																					<option value="2-">2-</option>
																					<option value="1">1</option>
																					<option value="0">0</option>
																				</select></span>
																				<span style="margin-left:20px">
																					<select class="select-control" name="right_scapula_tone[]" id="right_scapula_tone[]" placeholder="Select" style="width:90px;">
																					<option></option>
																					<option value="Normal">Normal</option>
																					<option value="Flaccid">Flaccid</option>
																					<option value="Spastic">Spastic</option>
																					<option value="Regid">Regid</option>
																				</select></span>
																			</div>
																		</td>
																	</tr>
																	<?php
																		}
																	?>
																	</table>
																  </div>
																</div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#shoulder" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Shoulder</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="shoulder" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																<div class="table-responsive">
																  <label></label>
																	<table  class="table table-striped table-bordered" id="advancedDataTable">
																	<tr>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:125px">Left</h4>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:140px">Parameters</h4>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:110px">Right</h4>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >Tone</span>
																				<span class="badge badge-primary" style="margin-left:60px">Power</span>
																				<span class="badge badge-primary" style="margin-left:30px">ROM</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span class="badge badge-primary" >Movement</span>
																				<span class="badge badge-primary" style="margin-left:60px">Muscles</span>
																				<span class="badge badge-primary" style="margin-left:60px">Nerve root</span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >ROM</span>
																				<span class="badge badge-primary" style="margin-left:32px">Power</span>
																				<span class="badge badge-primary" style="margin-left:29px">Tone</span>
																				
																			</div>
																		</td>
																	</tr>
																	<?php
																		foreach($shoulder as $shoulders){
																	?>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span >
																					<select class="select-control" name="left_shoulder_tone[]" id="left_shoulder_tone[]" placeholder="Select" style="width:90px">
																					<option></option>
																					<option value="Normal">Normal</option>
																					<option value="Flaccid">Flaccid</option>
																					<option value="Spastic">Spastic</option>
																					<option value="Regid">Regid</option>
																				</select></span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="left_shoulder_power[]" id="left_shoulder_power[]" placeholder="--" style="width:65px">
																					<option></option>
																					<option value="5">5</option>
																					<option value="5-">5-</option>
																					<option value="4+">4+</option>
																					<option value="4">4</option>
																					<option value="4-">4-</option>
																					<option value="3+">3+</option>
																					<option value="3">3</option>
																					<option value="3-">3-</option>
																					<option value="2+">2+</option>
																					<option value="2">2</option>
																					<option value="2-">2-</option>
																					<option value="1">1</option>
																					<option value="0">0</option>
																				</select></span>
																				<span >
																					<input type="text"  name="left_shoulder_rom[]" id="left_shoulder_rom[]" placeholder="Degree" style="width:50px;margin-left:20px" autocomplete="off"/>
																					<input type="hidden" class="span11" name="shoulder_muscle_id[]" id="shoulder_muscle_id[]" value="<?php echo $shoulders['shoulder_muscle_id']; ?>" autocomplete="off">
																				</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span style="width:100px" class="badge badge-info"><?php echo $shoulders['movement']; ?></span>
																				<span style="width:110px;margin-left:30px" class="badge badge-secondary"><?php echo $shoulders['muscles']; ?></span>
																				<span style="width:60px;margin-left:23px" class="badge badge-warning"><?php echo $shoulders['nerve_root']; ?></span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span >
																					<input type="text"  name="right_shoulder_rom[]" id="right_shoulder_rom[]" placeholder="Degree" style="width:50px" autocomplete="off"/>
																				</span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="right_shoulder_power[]" id="right_shoulder_power[]" placeholder="--" style="width:65px;margin-left:15px">
																					<option></option>
																					<option value="5">5</option>
																					<option value="5-">5-</option>
																					<option value="4+">4+</option>
																					<option value="4">4</option>
																					<option value="4-">4-</option>
																					<option value="3+">3+</option>
																					<option value="3">3</option>
																					<option value="3-">3-</option>
																					<option value="2+">2+</option>
																					<option value="2">2</option>
																					<option value="2-">2-</option>
																					<option value="1">1</option>
																					<option value="0">0</option>
																				</select></span>
																				<span style="margin-left:20px">
																					<select class="select-control" name="right_shoulder_tone[]" id="right_shoulder_tone[]" placeholder="Select" style="width:90px;">
																					<option></option>
																					<option value="Normal">Normal</option>
																					<option value="Flaccid">Flaccid</option>
																					<option value="Spastic">Spastic</option>
																					<option value="Regid">Regid</option>
																				</select></span>
																			</div>
																		</td>
																	</tr>
																	<?php
																		}
																	?>
																	</table>
																  </div>
																</div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#elbow" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Elbow</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="elbow" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																<div class="table-responsive">
																  <label></label>
																	<table  class="table table-striped table-bordered" id="advancedDataTable">
																	<tr>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:125px">Left</h4>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:140px">Parameters</h4>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:110px">Right</h4>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >Tone</span>
																				<span class="badge badge-primary" style="margin-left:60px">Power</span>
																				<span class="badge badge-primary" style="margin-left:30px">ROM</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span class="badge badge-primary" >Movement</span>
																				<span class="badge badge-primary" style="margin-left:60px">Muscles</span>
																				<span class="badge badge-primary" style="margin-left:60px">Nerve root</span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >ROM</span>
																				<span class="badge badge-primary" style="margin-left:32px">Power</span>
																				<span class="badge badge-primary" style="margin-left:29px">Tone</span>
																				
																			</div>
																		</td>
																	</tr>
																	<?php
																		foreach($elbow as $elbows){
																	?>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span >
																					<select class="select-control" name="left_elbow_tone[]" id="left_elbow_tone[]" placeholder="Select" style="width:90px">
																					<option></option>
																					<option value="Normal">Normal</option>
																					<option value="Flaccid">Flaccid</option>
																					<option value="Spastic">Spastic</option>
																					<option value="Regid">Regid</option>
																				</select></span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="left_elbow_power[]" id="left_elbow_power[]" placeholder="--" style="width:65px">
																					<option></option>
																					<option value="5">5</option>
																					<option value="5-">5-</option>
																					<option value="4+">4+</option>
																					<option value="4">4</option>
																					<option value="4-">4-</option>
																					<option value="3+">3+</option>
																					<option value="3">3</option>
																					<option value="3-">3-</option>
																					<option value="2+">2+</option>
																					<option value="2">2</option>
																					<option value="2-">2-</option>
																					<option value="1">1</option>
																					<option value="0">0</option>
																				</select></span>
																				<span >
																					<input type="text"  name="left_elbow_rom[]" id="left_elbow_rom[]" placeholder="Degree" style="width:50px;margin-left:20px" autocomplete="off"/>
																					<input type="hidden" class="span11" name="elbow_muscle_id[]" id="elbow_muscle_id[]" value="<?php echo $elbows['elbow_muscle_id']; ?>" autocomplete="off">
																				</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span style="width:70px" class="badge badge-info"><?php echo $elbows['movement']; ?></span>
																				<span style="width:78px;margin-left:55px" class="badge badge-secondary"><?php echo $elbows['muscles']; ?></span>
																				<span style="width:60px;margin-left:58px" class="badge badge-warning"><?php echo $elbows['nerve_root']; ?></span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span >
																					<input type="text"  name="right_elbow_rom[]" id="right_elbow_rom[]" placeholder="Degree" style="width:50px" autocomplete="off"/>
																				</span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="right_elbow_power[]" id="right_elbow_power[]" placeholder="--" style="width:65px;margin-left:15px">
																					<option></option>
																					<option value="5">5</option>
																					<option value="5-">5-</option>
																					<option value="4+">4+</option>
																					<option value="4">4</option>
																					<option value="4-">4-</option>
																					<option value="3+">3+</option>
																					<option value="3">3</option>
																					<option value="3-">3-</option>
																					<option value="2+">2+</option>
																					<option value="2">2</option>
																					<option value="2-">2-</option>
																					<option value="1">1</option>
																					<option value="0">0</option>
																				</select></span>
																				<span style="margin-left:20px">
																					<select class="select-control" name="right_elbow_tone[]" id="right_elbow_tone[]" placeholder="Select" style="width:90px;">
																					<option></option>
																					<option value="Normal">Normal</option>
																					<option value="Flaccid">Flaccid</option>
																					<option value="Spastic">Spastic</option>
																					<option value="Regid">Regid</option>
																				</select></span>
																			</div>
																		</td>
																	</tr>
																	<?php
																		}
																	?>
																	</table>
																  </div>
																</div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#fore" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Fore Arm</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="fore" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																<div class="table-responsive">
																  <label></label>
																	<table  class="table table-striped table-bordered" id="advancedDataTable">
																	<tr>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:125px">Left</h4>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:140px">Parameters</h4>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:110px">Right</h4>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >Tone</span>
																				<span class="badge badge-primary" style="margin-left:60px">Power</span>
																				<span class="badge badge-primary" style="margin-left:30px">ROM</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span class="badge badge-primary" >Movement</span>
																				<span class="badge badge-primary" style="margin-left:60px">Muscles</span>
																				<span class="badge badge-primary" style="margin-left:60px">Nerve root</span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >ROM</span>
																				<span class="badge badge-primary" style="margin-left:32px">Power</span>
																				<span class="badge badge-primary" style="margin-left:29px">Tone</span>
																				
																			</div>
																		</td>
																	</tr>
																	<?php
																		foreach($forearm as $forearms){
																	?>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span >
																					<select class="select-control" name="left_forearm_tone[]" id="left_forearm_tone[]" placeholder="Select" style="width:90px">
																					<option></option>
																					<option value="Normal">Normal</option>
																					<option value="Flaccid">Flaccid</option>
																					<option value="Spastic">Spastic</option>
																					<option value="Regid">Regid</option>
																				</select></span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="left_forearm_power[]" id="left_forearm_power[]" placeholder="--" style="width:65px">
																					<option></option>
																					<option value="5">5</option>
																					<option value="5-">5-</option>
																					<option value="4+">4+</option>
																					<option value="4">4</option>
																					<option value="4-">4-</option>
																					<option value="3+">3+</option>
																					<option value="3">3</option>
																					<option value="3-">3-</option>
																					<option value="2+">2+</option>
																					<option value="2">2</option>
																					<option value="2-">2-</option>
																					<option value="1">1</option>
																					<option value="0">0</option>
																				</select></span>
																				<span >
																					<input type="text"  name="left_forearm_rom[]" id="left_forearm_rom[]" placeholder="Degree" style="width:50px;margin-left:20px" autocomplete="off"/>
																					<input type="hidden" class="span11" name="forearm_muscle_id[]" id="forearm_muscle_id[]" value="<?php echo $forearms['forearm_muscle_id']; ?>" autocomplete="off">
																				</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span style="width:70px" class="badge badge-info"><?php echo $forearms['movement']; ?></span>
																				<span style="width:78px;margin-left:55px" class="badge badge-secondary"><?php echo $forearms['muscles']; ?></span>
																				<span style="width:60px;margin-left:58px" class="badge badge-warning"><?php echo $forearms['nerve_root']; ?></span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span >
																					<input type="text"  name="right_forearm_rom[]" id="right_forearm_rom[]" placeholder="Degree" style="width:50px" autocomplete="off"/>
																				</span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="right_forearm_power[]" id="right_forearm_power[]" placeholder="--" style="width:65px;margin-left:15px">
																					<option></option>
																					<option value="5">5</option>
																					<option value="5-">5-</option>
																					<option value="4+">4+</option>
																					<option value="4">4</option>
																					<option value="4-">4-</option>
																					<option value="3+">3+</option>
																					<option value="3">3</option>
																					<option value="3-">3-</option>
																					<option value="2+">2+</option>
																					<option value="2">2</option>
																					<option value="2-">2-</option>
																					<option value="1">1</option>
																					<option value="0">0</option>
																				</select></span>
																				<span style="margin-left:20px">
																					<select class="select-control" name="right_forearm_tone[]" id="right_forearm_tone[]" placeholder="Select" style="width:90px;">
																					<option></option>
																					<option value="Normal">Normal</option>
																					<option value="Flaccid">Flaccid</option>
																					<option value="Spastic">Spastic</option>
																					<option value="Regid">Regid</option>
																				</select></span>
																			</div>
																		</td>
																	</tr>
																	<?php
																		}
																	?>
																	</table>
																  </div>
																</div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#wrist" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Wrist</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="wrist" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																<div class="table-responsive">
																  <label></label>
																	<table  class="table table-striped table-bordered" id="advancedDataTable">
																	<tr>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:125px">Left</h4>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:140px">Parameters</h4>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:110px">Right</h4>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >Tone</span>
																				<span class="badge badge-primary" style="margin-left:60px">Power</span>
																				<span class="badge badge-primary" style="margin-left:30px">ROM</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span class="badge badge-primary" >Movement</span>
																				<span class="badge badge-primary" style="margin-left:60px">Muscles</span>
																				<span class="badge badge-primary" style="margin-left:60px">Nerve root</span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >ROM</span>
																				<span class="badge badge-primary" style="margin-left:32px">Power</span>
																				<span class="badge badge-primary" style="margin-left:29px">Tone</span>
																				
																			</div>
																		</td>
																	</tr>
																	<?php
																		foreach($wrist as $wrists){
																	?>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span >
																					<select class="select-control" name="left_wrist_tone[]" id="left_wrist_tone[]" placeholder="Select" style="width:90px">
																					<option></option>
																					<option value="Normal">Normal</option>
																					<option value="Flaccid">Flaccid</option>
																					<option value="Spastic">Spastic</option>
																					<option value="Regid">Regid</option>
																				</select></span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="left_wrist_power[]" id="left_wrist_power[]" placeholder="--" style="width:65px">
																					<option></option>
																					<option value="5">5</option>
																					<option value="5-">5-</option>
																					<option value="4+">4+</option>
																					<option value="4">4</option>
																					<option value="4-">4-</option>
																					<option value="3+">3+</option>
																					<option value="3">3</option>
																					<option value="3-">3-</option>
																					<option value="2+">2+</option>
																					<option value="2">2</option>
																					<option value="2-">2-</option>
																					<option value="1">1</option>
																					<option value="0">0</option>
																				</select></span>
																				<span >
																					<input type="text"  name="left_wrist_rom[]" id="left_wrist_rom[]" placeholder="Degree" style="width:50px;margin-left:20px" autocomplete="off"/>
																					<input type="hidden" class="span11" name="wrist_muscle_id[]" id="wrist_muscle_id[]" value="<?php echo $wrists['wrist_muscle_id']; ?>" autocomplete="off">
																				</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span style="width:70px" class="badge badge-info"><?php echo $wrists['movement']; ?></span>
																				<span style="width:117px;margin-left:55px" class="badge badge-secondary"><?php echo $wrists['muscles']; ?></span>
																				<span style="width:60px;margin-left:21px" class="badge badge-warning"><?php echo $wrists['nerve_root']; ?></span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span >
																					<input type="text"  name="right_wrist_rom[]" id="right_wrist_rom[]" placeholder="Degree" style="width:50px" autocomplete="off"/>
																				</span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="right_wrist_power[]" id="right_wrist_power[]" placeholder="--" style="width:65px;margin-left:15px">
																					<option></option>
																					<option value="5">5</option>
																					<option value="5-">5-</option>
																					<option value="4+">4+</option>
																					<option value="4">4</option>
																					<option value="4-">4-</option>
																					<option value="3+">3+</option>
																					<option value="3">3</option>
																					<option value="3-">3-</option>
																					<option value="2+">2+</option>
																					<option value="2">2</option>
																					<option value="2-">2-</option>
																					<option value="1">1</option>
																					<option value="0">0</option>
																				</select></span>
																				<span style="margin-left:20px">
																					<select class="select-control" name="right_wrist_tone[]" id="right_wrist_tone[]" placeholder="Select" style="width:90px;">
																					<option></option>
																					<option value="Normal">Normal</option>
																					<option value="Flaccid">Flaccid</option>
																					<option value="Spastic">Spastic</option>
																					<option value="Regid">Regid</option>
																				</select></span>
																			</div>
																		</td>
																	</tr>
																	<?php
																		}
																	?>
																	</table>
																  </div>
																</div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#finger" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Fingers</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="finger" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																<div class="table-responsive">
																  <label></label>
																	<table  class="table table-striped table-bordered" id="advancedDataTable">
																	<tr>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:125px">Left</h4>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:140px">Parameters</h4>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:110px">Right</h4>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >Tone</span>
																				<span class="badge badge-primary" style="margin-left:60px">Power</span>
																				<span class="badge badge-primary" style="margin-left:30px">ROM</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span class="badge badge-primary" >Movement</span>
																				<span class="badge badge-primary" style="margin-left:60px">Muscles</span>
																				<span class="badge badge-primary" style="margin-left:60px">Nerve root</span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >ROM</span>
																				<span class="badge badge-primary" style="margin-left:32px">Power</span>
																				<span class="badge badge-primary" style="margin-left:29px">Tone</span>
																				
																			</div>
																		</td>
																	</tr>
																	<?php
																		foreach($fingers as $fingers1){
																	?>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span >
																					<select class="select-control" name="left_fingers_tone[]" id="left_fingers_tone[]" placeholder="Select" style="width:90px">
																					<option></option>
																					<option value="Normal">Normal</option>
																					<option value="Flaccid">Flaccid</option>
																					<option value="Spastic">Spastic</option>
																					<option value="Regid">Regid</option>
																				</select></span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="left_fingers_power[]" id="left_fingers_power[]" placeholder="--" style="width:65px">
																					<option></option>
																					<option value="5">5</option>
																					<option value="5-">5-</option>
																					<option value="4+">4+</option>
																					<option value="4">4</option>
																					<option value="4-">4-</option>
																					<option value="3+">3+</option>
																					<option value="3">3</option>
																					<option value="3-">3-</option>
																					<option value="2+">2+</option>
																					<option value="2">2</option>
																					<option value="2-">2-</option>
																					<option value="1">1</option>
																					<option value="0">0</option>
																				</select></span>
																				<span >
																					<input type="text" name="left_fingers_rom[]" id="left_fingers_rom[]" placeholder="Degree" style="width:50px;margin-left:20px" autocomplete="off"/>
																					<input type="hidden" class="span11" name="fingers_muscle_id[]" id="fingers_muscle_id[]" value="<?php echo $fingers1['fingers_muscle_id']; ?>" autocomplete="off">
																				</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span style="width:70px" class="badge badge-info"><?php echo $fingers1['movement']; ?></span>
																				<span style="width:78px;margin-left:55px" class="badge badge-secondary"><?php echo $fingers1['muscles']; ?></span>
																				<span style="width:60px;margin-left:51px" class="badge badge-warning"><?php echo $fingers1['nerve_root']; ?></span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span >
																					<input type="text" name="right_fingers_rom[]" id="right_fingers_rom[]" placeholder="Degree" style="width:50px" autocomplete="off"/>
																				</span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="right_fingers_power[]" id="right_fingers_power[]" placeholder="--" style="width:65px;margin-left:15px">
																					<option></option>
																					<option value="5">5</option>
																					<option value="5-">5-</option>
																					<option value="4+">4+</option>
																					<option value="4">4</option>
																					<option value="4-">4-</option>
																					<option value="3+">3+</option>
																					<option value="3">3</option>
																					<option value="3-">3-</option>
																					<option value="2+">2+</option>
																					<option value="2">2</option>
																					<option value="2-">2-</option>
																					<option value="1">1</option>
																					<option value="0">0</option>
																				</select></span>
																				<span style="margin-left:20px">
																					<select class="select-control" name="right_fingers_tone[]" id="right_fingers_tone[]" placeholder="Select" style="width:90px;">
																					<option></option>
																					<option value="Normal">Normal</option>
																					<option value="Flaccid">Flaccid</option>
																					<option value="Spastic">Spastic</option>
																					<option value="Regid">Regid</option>
																				</select></span>
																			</div>
																		</td>
																	</tr>
																	<?php
																		}
																	?>
																	</table>
																  </div>
																</div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#thumb" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Thumb</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="thumb" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																<div class="table-responsive">
																  <label></label>
																	<table  class="table table-striped table-bordered" id="advancedDataTable">
																	<tr>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:125px">Left</h4>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:140px">Parameters</h4>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:110px">Right</h4>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >Tone</span>
																				<span class="badge badge-primary" style="margin-left:60px">Power</span>
																				<span class="badge badge-primary" style="margin-left:30px">ROM</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span class="badge badge-primary" >Movement</span>
																				<span class="badge badge-primary" style="margin-left:60px">Muscles</span>
																				<span class="badge badge-primary" style="margin-left:60px">Nerve root</span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span class="badge badge-primary" >ROM</span>
																				<span class="badge badge-primary" style="margin-left:32px">Power</span>
																				<span class="badge badge-primary" style="margin-left:29px">Tone</span>
																				
																			</div>
																		</td>
																	</tr>
																	<?php
																		foreach($thumb as $thumbs){
																	?>
																	<tr>
																		<td style="width:30%">
																			<div>
																				<span >
																					<select class="select-control" name="left_thumb_tone[]" id="left_thumb_tone[]" placeholder="Select" style="width:90px">
																					<option></option>
																					<option value="Normal">Normal</option>
																					<option value="Flaccid">Flaccid</option>
																					<option value="Spastic">Spastic</option>
																					<option value="Regid">Regid</option>
																				</select></span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="left_thumb_power[]" id="left_thumb_power[]" placeholder="--" style="width:65px">
																					<option></option>
																					<option value="5">5</option>
																					<option value="5-">5-</option>
																					<option value="4+">4+</option>
																					<option value="4">4</option>
																					<option value="4-">4-</option>
																					<option value="3+">3+</option>
																					<option value="3">3</option>
																					<option value="3-">3-</option>
																					<option value="2+">2+</option>
																					<option value="2">2</option>
																					<option value="2-">2-</option>
																					<option value="1">1</option>
																					<option value="0">0</option>
																				</select></span>
																				<span >
																					<input type="text"  name="left_thumb_rom[]" id="left_thumb_rom[]" placeholder="Degree" style="width:50px;margin-left:20px" autocomplete="off"/>
																					<input type="hidden" class="span11" name="thumb_muscle_id[]" id="thumb_muscle_id[]" value="<?php echo $thumbs['thumb_muscle_id']; ?>" autocomplete="off">
																				</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span style="width:70px" class="badge badge-info"><?php echo $thumbs['movement']; ?></span>
																				<span style="width:78px;margin-left:55px" class="badge badge-secondary"><?php echo $thumbs['muscles']; ?></span>
																				<span style="width:60px;margin-left:55px" class="badge badge-warning"><?php echo $thumbs['nerve_root']; ?></span>
																			</div>
																		</td>
																		<td style="width:30%">
																			<div>
																				<span >
																					<input type="text"  name="right_thumb_rom[]" id="right_thumb_rom[]" placeholder="Degree" style="width:50px" autocomplete="off"/>
																				</span>
																				<span style="margin-left:15px;">
																					<select class="select-control" name="right_thumb_power[]" id="right_thumb_power[]" placeholder="--" style="width:65px;margin-left:15px">
																					<option></option>
																					<option value="5">5</option>
																					<option value="5-">5-</option>
																					<option value="4+">4+</option>
																					<option value="4">4</option>
																					<option value="4-">4-</option>
																					<option value="3+">3+</option>
																					<option value="3">3</option>
																					<option value="3-">3-</option>
																					<option value="2+">2+</option>
																					<option value="2">2</option>
																					<option value="2-">2-</option>
																					<option value="1">1</option>
																					<option value="0">0</option>
																				</select></span>
																				<span style="margin-left:20px">
																					<select class="select-control" name="right_thumb_tone[]" id="right_thumb_tone[]" placeholder="Select" style="width:90px;">
																					<option></option>
																					<option value="Normal">Normal</option>
																					<option value="Flaccid">Flaccid</option>
																					<option value="Spastic">Spastic</option>
																					<option value="Regid">Regid</option>
																				</select></span>
																			</div>
																		</td>
																	</tr>
																	<?php
																		}
																	?>
																	</table>
																  </div>
																</div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#respi" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Respiration</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="respi" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																<div class="table-responsive">
																  <label></label>
																	<table  class="table table-striped table-bordered" id="advancedDataTable">
																	<tr>
																		<td style="width:50%">
																			<div>
																				<h4  style="color:#3f6ad8; margin-left:150px">ROM</h4>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<h4 style="color:#3f6ad8; margin-left:140px">Parameters</h4>
																			</div>
																		</td>
																		<td style="width:10%">
																			
																		</td>
																	</tr>
																	<tr>
																		<td style="width:50%">
																			<div>
																				<span class="badge badge-primary" style="margin-left:90px">Apex</span>
																				<span class="badge badge-primary" style="margin-left:57px">Base</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span class="badge badge-primary" >Movement</span>
																				<span class="badge badge-primary" style="margin-left:60px">Muscles</span>
																				<span class="badge badge-primary" style="margin-left:60px">Nerve root</span>
																			</div>
																		</td>
																		<td style="width:10%">
																			
																		</td>
																	</tr>
																	<?php
																		foreach($respiration as $respirations){
																	?>
																	<tr>
																		<td style="width:50%">
																			<div class="row">
																				<span >
																					<input type="text" class="form-control"  name="respiration_apex[]" id="respiration_apex[]" placeholder="CM" style="width:50px;margin-left:100px" autocomplete="off"/>
																				</span>
																				<span >
																					<input type="text" class="form-control" name="respiration_base[]" id="respiration_base[]" placeholder="CM" style="width:50px;margin-left:65px" autocomplete="off"/>
																					<input type="hidden" class="form-control" class="span11" name="respiration_muscle_id[]" id="respiration_muscle_id[]" value="<?php echo $respirations['respiration_muscle_id']; ?>" autocomplete="off">
																				</span>
																			</div>
																		</td>
																		<td style="width:40%">
																			<div>
																				<span style="width:103px" class="badge badge-info"><?php echo $respirations['movement']; ?></span>
																				<span style="width:90px;margin-left:22px" class="badge badge-secondary"><?php echo $respirations['muscles']; ?></span>
																				<span style="width:60px;margin-left:38px" class="badge badge-warning"><?php echo $respirations['nerve_root']; ?></span>
																			</div>
																		</td>
																		<td style="width:10%">
																			
																		</td>
																	</tr>
																	<?php
																		}
																	?>
																	</table>
																  </div>
																</div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#measure" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Measure</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="measure" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																<div class="table-responsive">
																	<table  class="table table-striped table-bordered" id="advancedDataTable">
																		<tr>
																		<td class="text-center" ><span class="badge badge-primary">Asis to Med.Mal.</span></td>
																		<td class="text-center" ><span class="badge badge-primary">Umb to Med.Mal</span></td>
																		<td class="text-center" ><span class="badge badge-primary">Mid.Thigh Circum.</span></td>
																		<td class="text-center" ><span class="badge badge-primary">Mid.Calf Circum.</span></td>
																		</tr>
																		<tr>
																		<td class="text-center" ><input class="form-control" type="text" name="ant_spine_to_inmal" id="ant_spine_to_inmal" placeholder="CM"/>
																		</td>
																		<td class="text-center" ><input type="text" class="form-control" name="app_leg_shoet" id="app_leg_shoet" placeholder="CM"/>
																		</td>
																		<td class="text-center" ><input type="text" class="form-control" name="mid_thigh_circum" id="mid_thigh_circum" placeholder="5 CM Above Pat" />
																		</td>
																		<td class="text-center" ><input type="text" name="mid_calf_circum" id="mid_calf_circum" placeholder="5 CM Below Pat"/>
																		</td>
																		</tr>
																	</table>
																  </div>
																</div>
															</div>
														</div></br></br>
														<div class="clearfix">
															<button type="submit" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-pill btn-primary">Submit</button>
															<button  id="prev-btn" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">cancel</button>
														</div></form></br></br>
														
														  <table  class="table table-striped table-bordered motor_exam_notes" id="basicDataTable">
															<thead>
																<tr>
																<th class="text-center" >Date</th>
																<th class="text-center" >Action</th>
															</tr>
															</thead>
															<tbody>
															<?php if($mexamn != false){ ?>
															<?php 
															foreach ($mexamn as $row) {
															?>
															<tr id="<?php echo $row['patient_id'].'motor'.$row['mexamn_id'] ?>">
																<td class="text-center" ><?php echo date('d-m-Y',strtotime($row['mexamn_date'])); ?></td>
																<td class="actions text-center"><a class="edit" href="<?php echo base_url().'client/patient/edit_assessment_mexam/'.$row['patient_id'].'/'.$row['mexamn_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="DeleteMexamn" href="<?php echo '#'.$row['patient_id'].'#'.$row['mexamn_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"> </i></button></a></td>
															</tr>
															<?php  } } else { ?>
																	<tr><td colspan="2"><center> No More Records Found </center></td></tr>
																<?php } ?>
															</tbody>  
														  </table>
															</div>
													</div>
											</div>
											 <div class="tab-pane show" id="sensory" role="tabpanel">
													<div class="main-card mb-12">
														<div class="card-body">
														<form id="sensor" class="form-horizontal" action ="<?php echo base_url().'client/patient/add_sexamination' ?>"  method="post" role="form" >
													 <input type="hidden" name="patient_id" value="<?php echo $this->uri->segment('5') ?>" />
													  <div class="row">
															<div class="col-md-6">
															 <div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">  Date </label>
																<input type="text" class="form-control datepicker" Placeholder="Date" name="sexamn_date" id="sexamn_date" autocomplete="off" data-toggle="datepicker">
															    </div>	
															</div>	
															</div>
													  </div></br>
													  <table class="table table-striped table-bordered" id="drillDownDataTable">
														<thead>
														  <tr>
															<th width="5%;">Nerve root</th>
															<th width="25%;">Dermatome</th>
															<th width="35%;">Myotome</th>
															<th width="35%;">Reflexes</th>
														 </tr>
														</thead>
														<tbody>
														<tr><td class="text-center" >C2</td>
														<td class="text-center" ><h5> Occipital protuberance 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="c2_occipital_protuberance" value="Intact" name="c2_occipital_protuberance"  > 
																	   Intact
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="c2_occipital_protuberance1" value="Impaired" name="c2_occipital_protuberance" > 
																	   Impaired
																	</label>
																	</div> </h5>
														  </td>
														  <td class="text-center" >
														      <h5> Neck muscles 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="c2_neck_flexion_extension" value="Normal" name="c2_neck_flexion_extension"  > 
																	   Normal
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="c2_neck_flexion_extension1" value="Weak" name="c2_neck_flexion_extension" > 
																	   Weak
																	</label>
																	</div> </h5>
															</td>
														  <td class="text-center" >
														  </td>
														</tr>
														<tr><td class="text-center" >C3</td>
														<td class="text-center" >
														<h5> Supraclavicular fossa 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="c3_supraclavicular_fossa" value="Intact" name="c3_supraclavicular_fossa"  > 
																	   Intact
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="c3_supraclavicular_fossa1" value="Impaired" name="c3_supraclavicular_fossa" > 
																	   Impaired
																	</label>
																	</div> </h5>
														    <td class="text-center" >
															    <h5> Neck lateral flexionlar joint 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="c3_neck_lateral_flexionlar_joint" value="Normal" name="c3_neck_lateral_flexionlar_joint"  > 
																	   Normal
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="c3_neck_lateral_flexionlar_joint1" value="Weak" name="c3_neck_lateral_flexionlar_joint" > 
																	   Weak
																	</label>
																	</div> </h5>
															</td>
														  <td class="text-center" >
														  </td>
														</tr>
														<tr><td class="text-center" >C4</td>
														<td class="text-center" >
																<h5> Acromioclavicular joint 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="c4_acromioclavicular_joint" value="Intact" name="c4_acromioclavicular_joint"  > 
																	   Intact
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="c4_acromioclavicular_joint1" value="Impaired" name="c4_acromioclavicular_joint" > 
																	   Impaired
																	</label>
																	</div> </h5>
															</td>
														  <td class="text-center" >
														        <h5> Shoulder Elevation 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="c4_shoulder_elevation" value="Normal" name="c4_shoulder_elevation"  > 
																	   Normal
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="c4_shoulder_elevation1" value="Weak" name="c4_shoulder_elevation" > 
																	   Weak
																	</label>
																	</div> </h5>
														  </td>
														  <td class="text-center" >
														  </td>
														</tr>
														<tr><td class="text-center" >C5</td>
														<td class="text-center" >
														      <h5> Antecubital Fossa 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="c5_antecubital_fossa" value="Intact" name="c5_antecubital_fossa"  > 
																	   Intact
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="c5_antecubital_fossa1" value="Impaired" name="c5_antecubital_fossa" > 
																	   Impaired
																	</label>
																	</div> </h5>
														  </td>
														  <td class="text-center" >
														       <h5> Shoulder Abduction 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="c5_shoulder_abduction" value="Normal" name="c5_shoulder_abduction"  > 
																	   Normal
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="c5_shoulder_abduction1" value="Weak" name="c5_shoulder_abduction" > 
																	   Weak
																	</label>
																	</div> </h5>
															</td>
														   <td class="text-center" >
														       <h5> Biceps, Brachioradialis 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="c5_biceps_brachioradialis" value="Absent" name="c5_biceps_brachioradialis"  > 
																	  Absent
																	</label>
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="c5_biceps_brachioradialis1" value="Normal" name="c5_biceps_brachioradialis" > 
																	   Normal
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="c5_biceps_brachioradialis2" value="Weak" name="c5_biceps_brachioradialis" > 
																	   Weak
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="c5_biceps_brachioradialis3" value="Exaggerated" name="c5_biceps_brachioradialis" > 
																	   Exaggerated
																	</label>
																	</div> </h5>
															</td>
														</tr>
														<tr><td class="text-center" >C6</td>
														<td class="text-center" >
														     <h5> Thumb 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="c6_thumb" value="Intact" name="c6_thumb"  > 
																	   Intact
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="c6_thumb2" value="Impaired" name="c6_thumb" > 
																	    Impaired
																	</label>
																</div> </h5>
															
														  </td>
														  <td class="text-center" >
														        <h5> Biceps, Supinator, Wrist extensors 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="c6_biceps_wristextensors" value="Normal" name="c6_biceps_wristextensors"  > 
																	   Normal
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="c6_biceps_wristextensors1" value="Weak" name="c6_biceps_wristextensors" > 
																	    Weak 
																	</label>
																</div> </h5>
															</td>
														 <td class="text-center" >
														        <h5> Biceps, Brachioradialis 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="c6_biceps_brachioradialis" value="Absent" name="c6_biceps_brachioradialis"  > 
																	    Absent
																	</label>
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="c6_biceps_brachioradialis1" value="Normal" name="c6_biceps_brachioradialis" > 
																	   Normal
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="c6_biceps_brachioradialis2" value="Weak" name="c6_biceps_brachioradialis" > 
																	  Weak
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="c6_biceps_brachioradialis3" value="Exaggerated" name="c6_biceps_brachioradialis" > 
																	   Exaggerated
																	</label>
																</div> </h5>
															
														  </td>
														</tr>
														<tr><td class="text-center" >C7</td>
														<td class="text-center" >
														    <h5> Middle finger 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="c7_middle_finger" value="Intact" name="c7_middle_finger"  > 
																	    Intact
																	</label>
																	<label class="btn btn-shadow btn-outline-primary ">
																		<input type="radio" id="c7_middle_finger1" value="Impaired" name="c7_middle_finger" > 
																	   Impaired
																	</label>
																	
																</div> </h5>
															</td>
														  <td class="text-center" >
														   <h5> Wrist flexors, Triceps 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="c7_wristflexors_triceps" value="Normal" name="c7_wristflexors_triceps"  > 
																	    Normal
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="c7_wristflexors_triceps1" value="Weak" name="c7_wristflexors_triceps" > 
																	   Weak
																	</label>
																	
																</div> </h5>
															</td>
														    <td class="text-center" >
														        <h5> Triceps 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="c7_triceps" value="Absent" name="c7_triceps"  > 
																	    Absent
																	</label>
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="c7_triceps1" value="Normal" name="c7_triceps" > 
																	   Normal
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="c7_triceps2" value="Weak" name="c7_triceps" > 
																	   Weak
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="c7_triceps3" value="Exaggerated" name="c7_triceps" > 
																	   Exaggerated
																	</label>
																</div> </h5>
															</td>
														</tr>
														<tr><td class="text-center" >C8</td>
														<td class="text-center" >
																<h5> Little Finger 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="c8_little_finger" value="Intact" name="c8_little_finger"  > 
																	    Intact
																	</label>
																	<label class="btn btn-shadow btn-outline-primary ">
																		<input type="radio" id="c8_little_finger1" value="Impaired" name="c8_little_finger" > 
																	   Impaired
																	</label>
																</div> </h5>
															</td>
														  <td class="text-center" >
														    <h5> Thumb extensors & adductors, ulnar deviators 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="c8_thumb_extensor_adductors" value="Normal" name="c8_thumb_extensor_adductors"  > 
																	    Normal
																	</label>
																	<label class="btn btn-shadow btn-outline-primary ">
																		<input type="radio" id="c8_thumb_extensor_adductors1" value="Weak" name="c8_thumb_extensor_adductors" > 
																	   Weak
																	</label>
																</div> </h5>
															</td>
														 <td class="text-center" >
														      <h5> Triceps 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="c8_triceps" value="Absent" name="c8_triceps"  > 
																	    Absent
																	</label>
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="c8_triceps1" value="Normal" name="c8_triceps" > 
																	   Normal
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="c8_triceps2" value="Weak" name="c8_triceps"  > 
																	    Weak
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="c8_triceps3" value="Exaggerated" name="c8_triceps" > 
																	   Exaggerated
																	</label>
																</div> </h5>
															</td>
														</tr>
														<tr><td class="text-center" >T1</td>
														<td class="text-center" >
																<h5> Medial side antecubital fossa 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="t1_medialside_antecubital" value="Intact" name="t1_medialside_antecubital"  > 
																	    Intact
																	</label>
																	<label class="btn btn-shadow btn-outline-primary ">
																		<input type="radio" id="t1_medialside_antecubital1" value="Impaired" name="t1_medialside_antecubital" > 
																	   Impaired
																	</label>
																</div> </h5>
														   </td>
														  <td class="text-center" ></td>
														 <td class="text-center" ></td>
														</tr>
														<tr><td class="text-center" >T2</td>
														<td class="text-center" >
														     <h5> Apex of axilla 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="t2_apexof_axilla" value="Intact" name="t2_apexof_axilla"  > 
																	    Intact
																	</label>
																	<label class="btn btn-shadow btn-outline-primary ">
																		<input type="radio" id="t2_apexof_axilla1" value="Impaired" name="t2_apexof_axilla" > 
																	   Impaired
																	</label>
																</div> </h5>
															</td>
														  <td class="text-center" ></td>
														 <td class="text-center" ></td>
														</tr>
														<tr><td class="text-center" >T4</td>
														<td class="text-center" >
															<h5> Nipples 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="t4_nipples" value="Intact" name="t4_nipples"  > 
																	    Intact
																	</label>
																	<label class="btn btn-shadow btn-outline-primary ">
																		<input type="radio" id="t4_nipples1" value="Impaired" name="t4_nipples" > 
																	   Impaired
																	</label>
																</div> </h5>
															</td>
														  <td class="text-center" ></td>
														 <td class="text-center" ></td>
														</tr>
														<tr><td class="text-center" >T6</td>
														<td class="text-center" >
														    <h5> Xiphisternum 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="t6_xiphisternum" value="Intact" name="t6_xiphisternum"  > 
																	    Intact
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="t6_xiphisternum1" value="Impaired" name="t6_xiphisternum" > 
																	   Impaired
																	</label>
																</div> </h5>
															</td>
														  <td class="text-center" ></td>
														 <td class="text-center" ></td>
														</tr>
														<tr><td class="text-center" >T10</td>
														<td class="text-center" >
														   <h5> Umbilicus 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="t10_umbilicus" value="Intact" name="t10_umbilicus"  > 
																	    Intact
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="t10_umbilicus1" value="Impaired" name="t10_umbilicus" > 
																	   Impaired
																	</label>
																</div> </h5>
															</td>
														  <td class="text-center" ></td>
														 <td class="text-center" ></td>
														</tr>
														<tr><td class="text-center" >T12</td>
														<td class="text-center" >
														      <h5> Midpoint of the inguinal ligament 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="t12_midpoint_ofthe_inguinal_ligament" value="Intact" name="t12_midpoint_ofthe_inguinal_ligament"  > 
																	    Intact
																	</label>
																	<label class="btn btn-shadow btn-outline-primary ">
																		<input type="radio" id="t12_midpoint_ofthe_inguinal_ligament1" value="Impaired" name="t12_midpoint_ofthe_inguinal_ligament" > 
																	   Impaired
																	</label>
																</div> </h5>
															</td>
														  <td class="text-center" ></td>
														 <td class="text-center" ></td>
														</tr>
														<tr><td class="text-center" >L2</td>
														<td class="text-center" >
														     <h5> Mid-anterior thigh 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="l2_midanterior_thigh" value="Intact" name="l2_midanterior_thigh"  > 
																	    Intact
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="l2_midanterior_thigh1" value="Impaired" name="l2_midanterior_thigh" > 
																	   Impaired
																	</label>
																</div> </h5>
															</td>
														  <td class="text-center" >
														        <h5> Hip flexion 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="l2_hip_flexion" value="Normal" name="l2_hip_flexion"  > 
																	    Normal
																	</label>
																	<label class="btn btn-shadow btn-outline-primary ">
																		<input type="radio" id="l2_hip_flexion1" value="Weak" name="l2_hip_flexion" > 
																	   Weak
																	</label>
																</div> </h5>
															</td>
														 <td class="text-center" >
														       <h5> Patellar (L2,L4) 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="patellar" value="Absent" name="patellar"  > 
																	    Absent
																	</label>
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="patellar1" value="Normal" name="patellar" > 
																	   Normal
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="patellar2" value="Weak" name="patellar"  > 
																	    Weak
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="patellar3" value="Exaggerated" name="patellar" > 
																	   Exaggerated
																	</label>
																</div> </h5>
														 </td>
														</tr>
														<tr><td class="text-center" >L3</td>
														<td class="text-center" >
															<h5> Medial epicondyle of the femur 
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="l3_medial_epicondyle_ofthe_femur" value="Intact" name="l3_medial_epicondyle_ofthe_femur"  > 
																	    Intact
																	</label>
																	<label class="btn btn-shadow btn-outline-primary ">
																		<input type="radio" id="l3_medial_epicondyle_ofthe_femur1" value="Impaired" name="l3_medial_epicondyle_ofthe_femur" > 
																	   Impaired
																	</label>
																</div> </h5>
															</td>
														  <td class="text-center" >
														  <h5> Knee extension
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="l3_knee_extension" value="Normal" name="l3_knee_extension"  > 
																	    Normal
																	</label>
																	<label class="btn btn-shadow btn-outline-primary ">
																		<input type="radio" id="l3_knee_extension1" value="Weak" name="l3_knee_extension" > 
																	   Weak
																	</label>
																</div> </h5>
															</td>
														 <td class="text-center" ><h5>Pain with SLR
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="l3_pain_with_slr" value="Absent" name="l3_pain_with_slr"  > 
																	    Absent
																	</label>
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="l3_pain_with_slr1" value="Normal" name="l3_pain_with_slr" > 
																	   Normal
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="l3_pain_with_slr2" value="Weak" name="l3_pain_with_slr" > 
																	   Weak
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="l3_pain_with_slr3" value="Exaggerated" name="l3_pain_with_slr" > 
																	   Exaggerated
																	</label>
																</div> </h5>
															</td>
														</tr>
														<tr><td class="text-center" >L4</td>
														<td class="text-center" >
																<h5> Medial malleolus
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="l4_medial_malleolus" value="Normal" name="l4_medial_malleolus"  > 
																	    Normal
																	</label>
																	<label class="btn btn-shadow btn-outline-primary ">
																		<input type="radio" id="l4_medial_malleolus1" value="Weak" name="l4_medial_malleolus" > 
																	   Weak
																	</label>
																</div> </h5>
														  </td>
														  <td class="text-center" >
														      <h5> Ankle dorsi flexion
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="l4_ankle_dorsi_flexion" value="Normal" name="l4_ankle_dorsi_flexion"  > 
																	    Normal
																	</label>
																	<label class="btn btn-shadow btn-outline-primary ">
																		<input type="radio" id="l4_ankle_dorsi_flexion1" value="Weak" name="l4_ankle_dorsi_flexion" > 
																	   Weak
																	</label>
																</div> </h5>
															</td>
														 <td class="text-center" >
														 </td>
														</tr>
														<tr><td class="text-center" >L5</td>
														<td class="text-center" ><h5> Dorsum of foot @ 3rd MTP
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="l5_dorsumof_root" value="Intact" name="l5_dorsumof_root"  > 
																	    Intact
																	</label>
																	<label class="btn btn-shadow btn-outline-primary ">
																		<input type="radio" id="l5_dorsumof_root1" value="Impaired" name="l5_dorsumof_root" > 
																	   Impaired
																	</label>
																</div> </h5>
															</td>
														  <td class="text-center" ><h5> Extensor Hallucis, peroneals, Glut. med, DF's, hamstring & calf
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="l5_great_toe_extension" value="Normal" name="l5_great_toe_extension"  > 
																	    Normal
																	</label>
																	<label class="btn btn-shadow btn-outline-primary ">
																		<input type="radio" id="l5_great_toe_extension1" value="Weak" name="l5_great_toe_extension" > 
																	   Weak
																	</label>
																</div> </h5>
														  </td>
														 <td class="text-center" >
														 </td>
														</tr>
														<tr><td class="text-center" >S1</td>
														<td class="text-center" ><h5> Lateral heel
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="s1_lateral_heel1" value="Intact" name="s1_lateral_heel"  > 
																	    Intact
																	</label>
																	<label class="btn btn-shadow btn-outline-primary ">
																		<input type="radio" id="s1_lateral_heel11" value="Impaired" name="s1_lateral_heel" > 
																	   Impaired
																	</label>
																</div> </h5>
														   </td>
														  <td class="text-center" ><h5> Ankle plantar flexion
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="s1_ankle_plantar_flexion" value="Normal" name="s1_ankle_plantar_flexion"  > 
																	    Normal
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="s1_ankle_plantar_flexion1" value="Weak" name="s1_ankle_plantar_flexion" > 
																	   Weak
																	</label>
																</div> </h5>
															</td>
														 <td class="text-center" ><h5> Limited SLR, Achilles reflex
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="s1_limitedslr_achillesreflex" value="Absent" name="s1_limitedslr_achillesreflex"  > 
																	    Absent
																	</label>
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="s1_limitedslr_achillesreflex1" value="Normal" name="s1_limitedslr_achillesreflex" > 
																	   Normal
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="s1_limitedslr_achillesreflex2" value="Weak" name="s1_limitedslr_achillesreflex"  > 
																	    Weak
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="s1_limitedslr_achillesreflex3" value="Exaggerated" name="s1_limitedslr_achillesreflex" > 
																	   Exaggerated
																	</label>
																</div> </h5>
															</td>
														</tr>
														<tr><td class="text-center" >S2</td>
														<td class="text-center" ><h5> Popliteal fossa
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="s2_popliteal_fossa" value="Intact" name="s2_popliteal_fossa"  > 
																	    Intact
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="s2_popliteal_fossa1" value="Impaired" name="s2_popliteal_fossa" > 
																	   Impaired
																	</label>
																</div> </h5>
															</td>
														  <td class="text-center" ><h5> Knee flexion
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="s2_knee_flexion" value="Normal" name="s2_knee_flexion"  > 
																	    Normal
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="s2_knee_flexion1" value="Weak" name="s2_knee_flexion" > 
																	   Weak
																	</label>
																</div> </h5>
															</td>
														 <td class="text-center" ><h5> Limited SLR, Achilles reflex
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="s2_limitedslr_achillesreflex" value="Absent" name="s2_limitedslr_achillesreflex"  > 
																	   Absent
																	</label>
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="s2_limitedslr_achillesreflex1" value="Normal" name="s2_limitedslr_achillesreflex" > 
																	   Normal
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="s2_limitedslr_achillesreflex2" value="Weak" name="s2_limitedslr_achillesreflex" > 
																	   Weak
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="s2_limitedslr_achillesreflex3" value="Exaggerated" name="s2_limitedslr_achillesreflex" > 
																	   Exaggerated
																	</label>
																</div> </h5>
															</td>
														 </tr>
														 <tr><td class="text-center" >S5</td>
														<td class="text-center" ><h5> Perianal
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="s5_perianal" value="Intact" name="s5_perianal"  > 
																	    Intact
																	</label>
																	<label class="btn btn-shadow btn-outline-primary ">
																		<input type="radio" id="s5_perianal1" value="Impaired" name="s5_perianal" > 
																	   Impaired
																	</label>
																</div> </h5>
															</td>
														  <input type="hidden" name="patient_id" value="<?php echo $this->uri->segment('5') ?>" id="patient_id"/>
														   <td class="text-center" ><h5> Bladder, Rectum
																</br></br><div role="group" class="mb-2 btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-shadow btn-outline-primary active">
																		<input type="radio" id="s5_bladder_rectum" value="Normal" name="s5_bladder_rectum"  > 
																	    Normal
																	</label>
																	<label class="btn btn-shadow btn-outline-primary">
																		<input type="radio" id="s5_bladder_rectum1" value="Weak" name="s5_bladder_rectum" > 
																	   Weak
																	</label>
																</div> </h5>
															</td>
														 <td class="text-center" >
														 </td>
														</tr>
														</tbody>
													  </table>
													  <div class="clearfix">
																<button type="submit" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-pill btn-primary">Submit</button>
																<button  id="prev-btn" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">cancel</button>
													  </div>
													 </form></br></br>
													 
													  <div class="table-responsive ">
													  <table  class="table table-striped table-bordered sensor_notes" id="basicDataTable">
														<thead>
														 <tr>
															<th class="text-center" >Date</th>
															<th class="text-center" >Action</th>
														 </tr>
														</thead>
														<tbody>
														<?php if ($sexamn != false) {  
														foreach ($sexamn as $row) {
														?>
														<tr id="<?php echo $row['patient_id'].'sensory'.$row['sexamn_id'] ?>">
															<td class="text-center" ><?php echo 'Examination on'.' '.date('d-m-Y',strtotime($row['sexamn_date'])); ?></td>
															<td class="actions text-center"><a class="edit" href="<?php echo base_url().'client/patient/edit_assessment_sexam/'.$row['patient_id'].'/'.$row['sexamn_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="DeleteSexamn" href="<?php echo '#'.$row['patient_id'].'#'.$row['sexamn_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"> </i></button></a></td>
														</tr>
														<?php  } } else { ?>
																	<tr><td colspan="2"><center> No More Records Found </center></td></tr>
																<?php } ?>
														</tbody>
													  </table></div>
														</div>
													</div>
											</div>
											 <div class="tab-pane show" id="petiatric" role="tabpanel">
													<div class="main-card mb-6">
														<div class="card-body">
															<form id="pediatric" action ="<?php echo base_url().'client/patient/add_paediatric' ?>" method="post"   >
													<input type="hidden" name="patient_id" value="<?php echo $this->uri->segment('5') ?>" />
														<div class="row">
													     <div class="col-md-4">
														  <div class="input-group">
															<div class="position-relative form-group"><label for="bill_no" class="">Date</label>
																<input style="width:250px;" type="text" class="form-control datepicker" Placeholder="Date" name="paediatric_date" id="paediatric_date" autocomplete="off" data-toggle="datepicker">
															</div>
															</div>
															</div>
															<div class="col-md-4">
															<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">Language</label>
																<input style="width:250px;" placeholder="Language" type="text" name="language" id="language"  class="form-control">
															</div>															
															</div>															
															</div>
														<div class="col-md-4">
														<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">Milestone</label>
																<textarea style="width:250px;" class="form-control"  id="milestone" name="milestone" rows="2" placeholder="Enter Milestone"></textarea>
														</div> 
														</div> 
													   </div>															
													  </div>	
													<div class="row">
													  <div class="col-md-4">	
														<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">Social</label>
																<input style="width:250px;" placeholder="Social" type="text" name="social" id="social" class="form-control">
														</div>											
														</div>											
													  </div>
													  <div class="col-md-4">	
														<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">Fine Motor</label>
																<input style="width:250px;" placeholder="Fine Motor" type="text" name="finemotor" id="finemotor" class="form-control">
														</div>											
														</div>											
													  </div>
													  <div class="col-md-4">	
														<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">Gross Motor</label>
																<input style="width:250px;" placeholder="Gross Motor" type="text" name="grossmotor" id="grossmotor" class="form-control">
														</div>											
														</div>											
													  </div>													  
													</div></br>
													<div class="row">
													 <div class="col-md-4">	
														<div class="input-group">
																<div class="position-relative form-group"><label for="bill_no" class="">Reflexes</label>
																<input style="width:250px;" placeholder="Reflexes" type="text" name="reflexes" id="reflexes" class="form-control">
														</div>											
														</div>											
													  </div>
													  <div class="col-md-8">
													      <div class="clearfix">
																</br><button type="submit" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-pill btn-primary">Submit</button>
																<button  id="prev-btn" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">cancel</button>
														  </div>
													  </div>
													</div></br>
													</form></br></br>
															
													  <div class="table-responsive">
													  <table  class="table table-striped table-bordered pediatric_notes" id="basicDataTable">
														<thead>
														 <tr>
															<th class="text-center" >Date</th>
															<th class="text-center" >Milestone</th>
															<th class="text-center" >Approved By</th>
															<th class="text-center" >Action</th>
														 </tr>
														</thead>
														<tbody>
														<?php if($paediatric_info != false){ 
														foreach ($paediatric_info as $row) {
															$enteredBy = $row['modify_by'];
															$profileInfo = $this->registration_model->getProfileInfo($enteredBy);
															$staffInfo = $this->staff_model->getStaffInfo($enteredBy);
															
															if($profileInfo != false)
																$clientName = $profileInfo['first_name'];
															else if($staffInfo != false)
																$clientName = $staffInfo['first_name'].' '.$staffInfo['last_name'];
												$arrmilestone = explode("\n",$row['milestone']);
													
														?>
														<tr id="<?php echo $row['patient_id'].'Paediatric'.$row['paediatric_id'] ?>">
															<td class="text-center" ><?php echo date('d-m-Y',strtotime($row['paediatric_date'])); ?></td>
															<td class="text-center" ><?php
																for($i=0;$i<count($arrmilestone);$i++){
																	echo $arrmilestone[$i].'<br>';
																}
															  ?></td>
															<td class="text-center" ><?php echo $clientName; ?></td>
															<td class="actions text-center"><a class="edit" href="<?php echo base_url().'client/patient/edit_assessment_paediatric/'.$row['patient_id'].'/'.$row['paediatric_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="DeletePaediatric" href="<?php echo '#'.$row['patient_id'].'#'.$row['paediatric_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"> </i></button></a></td>
														</tr>
														<?php  } } else { ?>
																	<tr><td colspan="4"><center> No More Records Found </center></td></tr>
																<?php } ?>
														</tbody>
													  </table></div>
														</div>
													</div>
											</div>
											
											
											<div class="tab-pane show" id="neuro" role="tabpanel">
													<div class="main-card mb-6">
														<div class="card-body">
														<form id="nuero" action="<?php echo base_url().'client/patient/add_nuero' ?>" method="post"  >
													    <input type="hidden" name="patient_id" value="<?php echo $this->uri->segment('5') ?>" />    
														<div class="row">
															<div class="col-md-12">
															 <div class="input-group">
															<div class="position-relative form-group"><label for="nuero_date" class="">Date</label>
																<input type="text" style="width:350px;" class="form-control datepicker" Placeholder="Date" name="nuero_date" id="nuero_date" autocomplete="off" data-toggle="datepicker">
															</div>	
															</div>	
															</div>
														</div></br></br>
														<div id="accordion" class="accordion-wrapper mb-3">
														 <div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#Glasgow" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Glasgow Coma Scale-info</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="Glasgow" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																 <div class="row">
														  <div class="col-md-6">
															Eye Opening :</div>
															<div class="col-md-6">
																<select class="select-control" name="eyeopen" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="eyeopen">
																	<option value="">Please Select</option>
																	<option value="4">4</option>
																	<option value="3">3</option>
																	<option value="2">2</option>
																	<option value="1">1</option>
																</select></div>
														  </div></br></br><div class="row">
														  <div class="col-md-6">Verbal response :</div>
																 <div class="col-md-6"><select class="select-control" name="verbal" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="verbal">
																	<option value="">Please Select</option>
																	<option value="5">5</option>
																	<option value="4">4</option>
																	<option value="3">3</option>
																	<option value="2">2</option>
																	<option value="1">1</option>
																</select></div></div></br></br>
																<div class="row">
																<div class="col-md-6">Motor response :</div>
																 <div class="col-md-6"><select class="select-control" name="motor" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="motor">
																	<option value="">Please Select</option>
																	<option value="6">6</option>
																	<option value="5">5</option>
																	<option value="4">4</option>
																	<option value="3">3</option>
																	<option value="2">2 </option>
																	<option value="1">1</option>
																</select></div></div>
																</div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#neuro11" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Neuro Dynamic tests</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="neuro11" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																<div class="table-responsive media-body">
																	<table  class="table table-striped table-bordered" id="advancedDataTable">
																	<tr><td class="text-center" ></td><td class="text-center" ></td><td class="text-center" ><center>Left </center></td><td class="text-center" ><center>Right</center></td></tr>
																	<tr><td class="text-center" >Ulnar</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="ulnar_left"> </td><td class="text-center" ><input type="text" class="form-control" name="ulnar_right"></td></tr>
																	<tr><td class="text-center" >Radial</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Radial_left"> </td><td class="text-center" ><input type="text" class="form-control" name="Radial_right"></td></tr>
																	<tr><td class="text-center" >Median</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Median_left"> </td><td class="text-center" ><input type="text" class="form-control" name="Median_right"></td></tr>
																	<tr><td class="text-center" >Musculocutaneous</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Musculocutaneous_left"> </td><td class="text-center" ><input type="text" class="form-control" name="Musculocutaneous_right"></td></tr>
																	<tr><td class="text-center" >Sciatic</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Sciatic_left"> </td><td class="text-center" ><input type="text" class="form-control" name="Sciatic_right"></td></tr>
																	<tr><td class="text-center" >Tibial</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Tibial_left"> </td><td class="text-center" ><input type="text" class="form-control" name="Tibial_right"></td></tr>
																	<tr><td class="text-center" >Comman peronial</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Commanperonial_left"> </td><td class="text-center" ><input type="text" class="form-control" name="Commanperonial_right"></td></tr>
																	<tr><td class="text-center" >Femoral</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Femoral_left"> </td><td class="text-center" ><input type="text" class="form-control" name="Femoral_right"></td></tr>
																	<tr><td class="text-center" >Lateral cutaneous</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Lateralcutaneous_left"> </td><td class="text-center" ><input type="text" class="form-control" name="Lateralcutaneous_right"></td></tr>
																	<tr><td class="text-center" >Obturator</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Obturator_left"> </td><td class="text-center" ><input type="text" class="form-control" name="Obturator_right"></td></tr>
																	<tr><td class="text-center" >Sural</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Sural_left"> </td><td class="text-center" ><input type="text" class="form-control" name="Sural_right"></td></tr>
																	</table>
																  </div>
																</div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#special" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Special tests Info</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="special" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																<div class="row">
																	<div class="col-md-6">	
																	<div class="input-group">
																			<div class="input-group-prepend"><span class="input-group-text">@</span></div>
																			<input placeholder="Special Tests" type="text" name="scar" id="scar" class="form-control">
																	</div>											
																	</div>
																	<div class="col-md-6">	
																	<div class="input-group">
																			<div class="input-group-prepend"><span class="input-group-text">@</span></div>
																			<textarea placeholder="Description" type="text" name="adhere" id="adhere" class="form-control"></textarea>
																	</div>											
																	</div>											
																</div></br>
																</div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#adl" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">ADL score.functional Assessment</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="adl" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																<div class="row">
																	<div class="col-md-6">	
																	<div class="input-group">
																			<div class="input-group-prepend"><span class="input-group-text">@</span></div>
																			<input placeholder="Special Tests" type="text" name="name" id="name" class="form-control">
																	</div>											
																	</div>
																	<div class="col-md-6">	
																	<div class="input-group">
																			<div class="input-group-prepend"><span class="input-group-text">@</span></div>
																			<textarea placeholder="Description" type="text" name="description" id="description" class="form-control"></textarea>
																	</div>											
																	</div>											
																</div></br>
																</div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#tissue" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Neural Tissue Palpation</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="tissue" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																<div class="table-responsive media-body">
																	<table  class="table table-striped table-bordered" id="advancedDataTable">
																	<tr><td class="text-center" ></td><td class="text-center" ></td><td class="text-center" ><center>Left</center> </td><td class="text-center" ><center>Right</center></td></tr>													
																	<tr><td class="text-center" >Ulnar</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="ulnar_left1"> </td><td class="text-center" ><input type="text" class="form-control" name="ulnar_right1"></td></tr>
																	<tr><td class="text-center" >Radial</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Radial_left1"> </td><td class="text-center" ><input type="text" class="form-control" name="Radial_right1"></td></tr>
																	<tr><td class="text-center" >Median</td><td class="text-center" ></td><td class="text-center" ><input type="text"  class="form-control" name="Median_left1"> </td><td class="text-center" ><input type="text" class="form-control" name="Median_right1"></td></tr>
																	<tr><td class="text-center" >Sciatic</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Sciatic_left1"> </td><td class="text-center" ><input type="text" class="form-control" name="Sciatic_right1"></td></tr>
																	<tr><td class="text-center" >Tibial</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Tibial_left1"> </td><td class="text-center" ><input type="text" class="form-control" name="Tibial_right1"></td></tr>
																	<tr><td class="text-center" >peronial</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="peronial_left1"> </td><td class="text-center" ><input type="text" class="form-control" name="peronial_right1"></td></tr>
																	<tr><td class="text-center" >Comman peronial</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Femoral_left1"> </td><td class="text-center" ><input type="text" class="form-control" name="Femoral_right1"></td></tr>
																	<tr><td class="text-center" >Femoral</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Sural_left1"> </td><td class="text-center" ><input type="text" class="form-control" name="Sural_right1"></td></tr>
																	<tr><td class="text-center" >Lateral cutaneous</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="Saphenous_left1"> </td><td class="text-center" ><input type="text" class="form-control" name="Saphenous_right1"></td></tr>
																	</table>
																 </div>
																</div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#test" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Co-ordination Tests</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="test" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																<div class="table-responsive media-body">
																<label>Finger To Nose</label>
																<table  class="table table-striped table-bordered" id="advancedDataTable">
																	<tr><td class="text-center" >Time Taken to Complete the Activity :</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="f1"> </td></tr>
																	<tr><td class="text-center" >Speed at which the Activity is Performed	:</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="f2"> </td></tr>
																	<tr><td class="text-center" >No. of Error Made :</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="f3"> </td></tr>
																</table>
																</div></br></br>
																<div class="table-responsive media-body">
																	  <label>Aternating Supination - pronation movement</label>
																	  <table  class="table table-striped table-bordered" id="advancedDataTable">
																			<tr><td class="text-center" >Time Taken to Complete the Activity :</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="a1"> </td></tr>
																			<tr><td class="text-center" >Speed at which the Activity is Performed	:</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="a2"> </td></tr>
																			<tr><td class="text-center" >No. of Error Made :</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="a3"> </td></tr>
																	  </table>
																</div></br></br>
																 <div class="table-responsive media-body">
																		<label>Heel to Shin</label>
																		<table  class="table table-striped table-bordered" id="advancedDataTable">
																			<tr><td class="text-center" >Time Taken to Complete the Activity :</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="h1"> </td></tr>
																			<tr><td class="text-center" >Speed at which the Activity is Performed	:</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="h2"> </td></tr>
																			<tr><td class="text-center" >No. of Error Made :</td><td class="text-center" ></td><td class="text-center" ><input type="text" class="form-control" name="h3"> </td></tr>
																		</table>
																</div></br></br>
																</div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#gait" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Gait & Balance Testing</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="gait" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																 <div class="row">
																  <div class="col-md-6">
																  Gait level surface :
																  </div>
																  <div class="col-md-6">
																  <select class="select-control" name="gait" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="gait">
																								<option value="">Please Select</option>
																								<option value="3">3</option>
																								<option value="2">2 </option>
																								<option value="1">1</option>
																								</select>
																  </div>
																 </div></br></br>
																 <div class="row">
																  <div class="col-md-6">
																 Change in gait speed :
																  </div>
																  <div class="col-md-6">
																	<select class="select-control" name="speed" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="speed">
																		<option value="">Please Select</option>
																		<option value="3">3</option>
																		<option value="2">2 </option>
																		<option value="1">1</option>
																	</select>
																  </div>
																  </div></br></br>
																  <div class="row">
																  <div class="col-md-6">
																	Gait with horizontal head turns :
																  </div>
																  <div class="col-md-6">
																	<select class="select-control" name="horizontal" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="horizontal">
																		<option value="">Please Select</option>
																		<option value="3">3</option>
																		<option value="2">2 </option>
																		<option value="1">1</option>
																	</select>
																  </div>
																  </div></br></br>
																  <div class="row">
																  <div class="col-md-6">
																	 Gait with vertical head turns :
																  </div>
																  <div class="col-md-6">
																	<select class="select-control" name="vertical" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="vertical">
																		<option value="">Please Select</option>
																		<option value="3">3</option>
																		<option value="2">2 </option>
																		<option value="1">1</option>
																	</select>
																  </div>
																  </div></br></br>
																  <div class="row">
																  <div class="col-md-6">
																 Gait and pivot turn :
																  </div>
																  <div class="col-md-6">
																  <select class="select-control" name="pivot" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="pivot">
																								<option value="">Please Select</option>
																								<option value="3">3</option>
																								<option value="2">2 </option>
																								<option value="1">1</option>
																								</select>
																  </div>
																  </div></br></br>
																  <div class="row">
																  <div class="col-md-6">
																 Step over obstacle :
																  </div>
																  <div class="col-md-6">
																  <select class="select-control" name="obstacle" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="obstacle">
																								<option value="">Please Select</option>
																								<option value="3">3</option>
																								<option value="2">2 </option>
																								<option value="1">1</option>
																								</select>
																  </div>
																  </div></br></br>
																  <div class="row">
																  <div class="col-md-6">
																 Step around obstacles :
																  </div>
																  <div class="col-md-6">
																  <select class="select-control" name="obstacles" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="obstacles">
																								<option value="">Please Select</option>
																								<option value="3">3</option>
																								<option value="2">2 </option>
																								<option value="1">1</option>
																								</select>
																  </div>
																  </div></br></br>
																  <div class="row">
																  <div class="col-md-6">
																  Steps :
																  </div>
																  <div class="col-md-6">
																  <select class="select-control" name="steps" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="steps">
																								<option value="">Please Select</option>
																								<option value="3">3</option>
																								<option value="2">2 </option>
																								<option value="1">1</option>
																								</select>
																  </div>
																  </div></br></br>
																  <div class="media-body">
																	 <label>Balance & Movement analyser</label>
																	 <textarea name="balance" class="form-control"></textarea>
																  </div>
																</div>
															</div>
														</div>
														<div class="card">
															<div id="headingOne" class="card-header">
																<button type="button" data-toggle="collapse" data-target="#function" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
																	<h5 class="m-0 p-0">Functional Testing</h5>
																</button>
															</div>
															<div data-parent="#accordion" id="function" aria-labelledby="headingOne" class="collapse">
																<div class="card-body">
																  <div class="row">
																  <div class="col-md-6">
																  Bowels (preceding week) :
																  </div>
																  <div class="col-md-6">
																  <select class="select-control" name="bowels" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="verbal">
																		<option value="">Please Select</option>
																		<option value="2">2 </option>
																		<option value="1">1</option>
																		<option value="0">0</option>
																  </select>
																  </div>
																  </div></br></br>
																  <div class="row">
																  <div class="col-md-6">
																  Bladder (preceding week) :
																  </div>
																  <div class="col-md-6">
																  <select class="select-control" name="bladder" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="verbal">
																								<option value="">Please Select</option>
																								<option value="2">2 </option>
																								<option value="1">1</option>
																								<option value="0">0</option>
																								</select>
																  </div>
																  </div></br></br>
																  <div class="row">
																  <div class="col-md-6">
																 Grooming (preceding 24 - 48 hours) :
																  </div>
																  <div class="col-md-6">
																  <select class="select-control" name="grooming" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="verbal">
																								<option value="">Please Select</option>
																								<option value="2">2 </option>
																								<option value="1">1</option>
																								<option value="0">0</option>
																								</select>
																  </div>
																  </div></br></br>
																  <div class="row">
																  <div class="col-md-6">
																 Toilet use :
																  </div>
																  <div class="col-md-6">
																  <select class="select-control" name="toilet" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="verbal">
																								<option value="">Please Select</option>
																								<option value="2">2 </option>
																								<option value="1">1</option>
																								<option value="0">0</option>
																								</select> 
																  </div>
																  </div></br></br>
																  <div class="row">
																  <div class="col-md-6">
																  Feeding :
																  </div>
																  <div class="col-md-6">
																  <select class="select-control" name="feeding" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="verbal">
																								<option value="">Please Select</option>
																								<option value="2">2 </option>
																								<option value="1">1</option>
																								<option value="0">0</option>
																								</select>
																  </div>
																  </div></br></br>
																  <div class="row">
																  <div class="col-md-6">
																 Transfer (from bed to chair and back) :
																  </div>
																  <div class="col-md-6">
																  <select class="select-control" name="transfer" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="verbal">
																								<option value="">Please Select</option>
																								<option value="2">2 </option>
																								<option value="1">1</option>
																								<option value="0">0</option>
																								</select>
																  </div>
																  </div></br></br>
																  <div class="row">
																  <div class="col-md-6">
																 Mobility :
																  </div>
																  <div class="col-md-6">
																  <select class="select-control" name="mobility" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="verbal">
																								<option value="">Please Select</option>
																								<option value="2">2 </option>
																								<option value="1">1</option>
																								<option value="0">0</option>
																								</select> 
																  </div>
																  </div></br></br>
																  <div class="row">
																  <div class="col-md-6">
																  Dressing :
																  </div>
																  <div class="col-md-6">
																  <select class="select-control" name="dressing" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="verbal">
																								<option value="">Please Select</option>
																								<option value="2">2 </option>
																								<option value="1">1</option>
																								<option value="0">0</option>
																								</select>
																  </div>
																  </div></br></br>
																  <div class="row">
																  <div class="col-md-6">
																  Stairs :
																  </div>
																  <div class="col-md-6">
																  <select class="select-control" name="stairs" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="verbal">
																								<option value="">Please Select</option>
																								<option value="2">2 </option>
																								<option value="1">1</option>
																								<option value="0">0</option>
																								</select>
																  </div>
																  </div></br></br>
																  <div class="row">
																  <div class="col-md-6">
																  Bathing :
																  </div>
																  <div class="col-md-6">
																  <select class="select-control" name="bathing" style="width: 250px !important; min-width: 250px; max-width: 300px;" id="verbal">
																								<option value="">Please Select</option>
																								<option value="2">2 </option>
																								<option value="1">1</option>
																								<option value="0">0</option>
																								</select>
																  </div>
																  </div></br></br>
																</div>
															</div>
															</div>
														</div>
														<div class="clearfix">
															<button type="submit" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-pill btn-primary">Submit</button>
															<button  id="prev-btn" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">cancel</button>
														</div></form></br></br>
															
													  <div class="table-responsive">
													  <table  class="table table-striped table-bordered nuero_notes" id="basicDataTable">
															<thead>
															 <tr>
																<th class="text-center" >Date</th>
																 <th class="text-center" >Glasgow Coma Scale</th>
																 <th class="text-center" >Gait & balance testing</th>
																 <th class="text-center" >Functional Testing</th>
																<th class="text-center" >Action</th>
															 </tr>
															</thead>
															<tbody>
															<?php if($nuero_info != false){ 
															foreach ($nuero_info as $row) {
															?>
															<tr id="<?php echo $row['patient_id'].'nuero'.$row['nuero_id'] ?>">
																<td class="text-center" ><?php echo date('d-m-Y',strtotime($row['nuero_date'])); ?></td>
																<td class="text-center" ><?php echo $row['glasgow_total']; ?></td>
																<td class="text-center" ><?php echo $row['dynamic_total']; ?></td>
																<td class="text-center" ><?php echo $row['functional_total']; ?></td>
																<td class="actions text-center"><a class="edit" href="<?php echo base_url().'client/patient/edit_assessment_nuero/'.$row['patient_id'].'/'.$row['nuero_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="DeleteNuero" href="<?php echo '#'.$row['patient_id'].'#'.$row['nuero_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"> </i></button></a></td>
															</tr>
															<?php
															} } else { ?>
															<tr><td colspan="5"><center> No More Records.</center></td></tr>
															<?php } ?>
															</tbody>
														  </table></div>
														</div>
													</div>
											</div>
											 
										   </div>
										</div>
									   </div>
									</div>
									 
									<div class="tab-pane" id="tab-faq-7">
									<div class="main-card mb-3"></br>
                                       <div class="card-body">
                                            <div class="tab-content">
											<form id="invest" action ="<?php echo base_url().'client/patient/add_investigations' ?>" method="post"  id="basicvalidations" >
														<div class="row">
															<input type="hidden" name="patient_id" value="<?php echo $this->uri->segment('5') ?>" />
																<div class="col-md-6">
																 <div class="input-group">
																<div class="position-relative form-group"><label for="inves_date" class="">Date</label>
																<input type="text" class="form-control datepicker" style="width:300px;" Placeholder="Date" name="inves_date" id="inves_date"  autocomplete="off" data-toggle="datepicker">
																</div>	
																</div>	
																</div>	
																<div class="col-md-6">	
																<div class="input-group">
																		<div class="position-relative form-group"><label for="report_type" class="">Report Type</label>
																		<input type="text"  class="form-control" style="width:300px;" placeholder="Eg: Scan, X-Ray, Blood Report" name="report_type" id="report_type" value="" >
																</div>											
																</div>											
																</div>											
														</div></br>
														<div class="row">
															 
																 <div class="form-group col-sm-6">
																	<div class="position-relative form-group"><label for="bill_no" class="">Documents</label></br>
																	<input type='file' id='file_upload' style="width:300px;" name='file_upload'>
																	<input type="hidden" name="scan_hidden" id="upload_img" />	
																	<div style="display:none" id="dvloader"><p>Uploding Please Wait...</p>
																	<img src="<?php echo base_url().'img/loader.gif'; ?>" /></div>
																 </div>	
																 </div>	
																<div class="col-md-6">	
																<div class="input-group">
																		<div class="position-relative form-group"><label for="bill_no" class="">Description</label>
																  <textarea class="form-control"  name="descr" style="width:300px;" id="descr" rows="4"></textarea>
																</div>											
																</div>											
																</div>											
														</div></br>
														<div class="clearfix">
																<button  id="-btn" class="btn-shadow float-left btn btn-link"></button>
																<button type="submit" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-pill btn-primary">Submit</button>
																<button  id="prev-btn" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">cancel</button>
															</div>
												</form></br></br>
												
												
													  <div class="table-responsive">
													  <table  class="table table-striped table-bordered invest_notes" id="basicDataTable">
														<thead>
														 <tr>
															<th class="text-center" >Date</th>
															<th class="text-center" >Reports</th>
															<th class="text-center" >Description</th>
															<th class="text-center" >Action</th>
														 </tr>
														</thead>
														<tbody>
														<?php if($investigation != false){ 
														foreach ($investigation as $row) { ?>
														<tr id="<?php echo $row['patient_id'].'inves'.$row['inves_id']; ?>">
															<td class="text-center" ><?php echo date('d-m-Y',strtotime($row['inves_date'])); ?></td>
															<td class="text-center"><a href="<?php echo base_url().'uploads/inves/'.$row['document'] ?>"><?php echo $row['document']; ?></a></td>
															<td class="text-center" ><?php echo $row['description']; ?></td>
															<td class="actions text-center"><a class="edit" href="<?php echo base_url().'client/patient/edit_investigation/'.$row['patient_id'].'/'.$row['inves_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="DeleteInves" href="<?php echo '#'.$row['patient_id'].'#'.$row['inves_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"> </i></button></a></td>
														</tr>
														<?php
															} } else { ?>
															<tr><td colspan="4"><center> No More Records.</center></td></tr>
															<?php } ?>
														</tbody>
													  </table></div>
													</div>
										</div>
									   </div>
									</div>
									<div class="tab-pane" id="tab-faq-2">
									<div class="main-card mb-3"></br>
                                        <div class="card-header">
										      <div style="float:right">
														<div class="nav">
															<a data-toggle="tab" href="#appointment" class="border-0 btn-transition btn btn-outline-primary show active">Appointments</a>
															&nbsp;&nbsp;<a data-toggle="tab" href="#Daily_register" class="mr-1 ml-1 border-0 btn-transition btn btn-outline-primary show">Daily Register</a>
															&nbsp;&nbsp;<a data-toggle="tab" href="#invoice" class="mr-1 ml-1 border-0 btn-transition btn btn-outline-primary show">Payments</a>
														</div>
												</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content">
											 <div class="tab-pane show active" id="appointment" role="tabpanel">
													<div class="main-card mb-6">
													<div class="row">
													<div class="col-md-6"><h5>Upcoming Appointments</h5>
													</br><div class="card-body">
														  <div class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
																	<?php 
																	    if($apt_details != false) { 
																        foreach($apt_details as $apt) {
																			$this->db->where('bill_id',$apt['bill_id']);
																			$this->db->select('bill_status,paid_amt,net_amt')->from('tbl_invoice_header');
																			$res = $this->db->get();
																			if($res->result_array() != false){
																				$amt  ='S$ '.$res->row()->net_amt;
																				$amt1 ='S$ '. $res->row()->paid_amt;
																				if($res->row()->bill_status != '1'){
																					$url = base_url().'client/invoice/invoice_status_update/'.$apt['bill_id'].'/'.$row['patient_id'].'/'.$apt['appointment_id'];
																					$val = '<div class="badge badge-pill badge-secondary"><font color="white">Make Payment</font></div>';
																				} else {
																					$url = '';
																					$val = '<div class="badge badge-pill badge-alternate"><font color="white">Paid</font></div>';
																				}
																			}  else {
																				$amt = 'S$ 0.00';
																				$amt1 = 'S$ 0.00';
																				$url = base_url().'client/invoice/add/Pt/'.$row['patient_id'].'/'.$apt['appointment_id'];
																				$val = '<div class="badge badge-pill badge-primary"><font color="white">Make Bill</font></div>';
																			}
																	?>
															 
															    <div class="vertical-timeline-item vertical-timeline-element">
																	<div><span class="vertical-timeline-element-icon bounce-in"><i class="badge badge-dot badge-dot-xl badge-primary"> </i></span>
																		<div class="vertical-timeline-element-content bounce-in"><h4 class="timeline-title text-primary">Consultant <?php echo $apt['order_id']; ?>: <?php echo $apt['first_name']; ?></h4>
																			<?php if($apt['notes'] != '') { ?><p>Notes : <?php echo $apt['notes']; ?></p><?php } ?>
																			<?php if($amt != 'S$ 0.00') {   ?><p><strong>Invoice : <?php echo $amt; ?>&nbsp;&nbsp;&nbsp;&nbsp;
																			<font style="color:red;">Paid  : <?php echo $amt1; ?></font></strong></p>
																			<?php } else { echo '</br>'; } ?><p><?php if($apt['visit'] != '1') { ?>
																				<div class="badge badge-pill badge-danger">Not visited</div>
																			<?php } else { ?><div class="badge badge-pill badge-success">Visited</div>
																			<?php } ?><a href="<?php echo $url; ?>"><?php echo $val; ?></a>
																			<span class="vertical-timeline-element-date"><h4 class="timeline-title text-danger"><?php echo date('d M',strtotime($apt['appointment_from'])) ?></h4></br><font color="black"><?php echo date('h:i a', strtotime($apt['start'])).' </br> To </br> '.date('h:i a', strtotime($apt['end'])); ?></font> </span></div>
																	</div>
																</div>
															 <?php  } }  ?></div>	
														</div>
													</div>
													<div class="col-md-6"><h5>Previous Appointments</h5>
													</br><div class="card-body">
															<div class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
																	<?php 
																	    if($apt_details1 != false) { 
																        foreach($apt_details1 as $apt) {
																			$this->db->where('bill_id',$apt['bill_id']);
																			$this->db->select('bill_status,paid_amt,net_amt')->from('tbl_invoice_header');
																			$res = $this->db->get();
																			if($res->result_array() != false){
																				$amt ='S$ '. $res->row()->net_amt;
																				$amt1 ='S$ '. $res->row()->paid_amt;
																				
																				if($res->row()->bill_status != '1'){
																					$url = base_url().'client/invoice/invoice_status_update/'.$apt['bill_id'].'/'.$row['patient_id'].'/'.$apt['appointment_id'];
																					$val = '<div class="badge badge-pill badge-secondary"><font color="white">Make Payment</font></div>';
																				} else {
																					$url = '';
																					$val = '<div class="badge badge-pill badge-alternate"><font color="white">Paid</font></div>';
																				}
																			}  else {
																				$amt = 'S$ 0.00';
																				$amt1 = 'S$ 0.00';
																				$url = base_url().'client/invoice/add/Pt/'.$row['patient_id'].'/'.$apt['appointment_id'];
																				$val = '<div class="badge badge-pill badge-primary"><font color="white">Make Bill</font></div>';
																			}
																	?>
															 
															    <div class="vertical-timeline-item vertical-timeline-element">
																	<div><span class="vertical-timeline-element-icon bounce-in"><i class="badge badge-dot badge-dot-xl badge-primary"> </i></span>
																		<div class="vertical-timeline-element-content bounce-in"><h4 class="timeline-title text-primary">Consultant : <?php echo $apt['first_name']; ?></h4>
																		<?php if($apt['notes'] != '') { ?><p>Notes : <?php echo $apt['notes']; ?></p><?php } ?>
																			<?php if($amt != 'S$ 0.00') { ?><p><strong>Invoice : <?php echo $amt; ?>&nbsp;&nbsp;&nbsp;&nbsp;
																			<font style="color:red;">Paid : <?php echo $amt1; ?></font></strong></p>
																			<?php } else { echo '</br>'; }  ?><p><?php if($apt['visit'] != '1'){ ?>  
																				<div class="badge badge-pill badge-danger">Not visited</div>
																			<?php } else { ?><div class="badge badge-pill badge-success">Visited</div>
																			<?php } ?><a href="<?php echo $url; ?>"><?php echo $val; ?></a>
																			<span class="vertical-timeline-element-date"><h4 class="timeline-title text-danger"><?php echo date('d M',strtotime($apt['appointment_from'])) ?></h4></br><font color="black"><?php echo date('h:i a', strtotime($apt['start'])).' </br> To </br> '.date('h:i a', strtotime($apt['end'])); ?> </font></span></div>
																	</div>
																</div>
															 <?php  } }  ?></div>
														</div>
													</div>
													</div>
													</div>
											 </div>
											 <div class="tab-pane" id="Daily_register" role="tabpanel">
													<div class="main-card mb-6">
														<div class="card-body">
														  <div class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
																	<?php 
																	    if($daily_reg != false) { 
																        foreach($daily_reg as $r) {
																		$this->db->where('patient_id',$row['patient_id']);
																		$this->db->where('treatment_date',date('y-m-d', strtotime($r['sn_date'])));
																		$this->db->select('bill_status')->from('tbl_patient_treatment_techniques');
																		$res = $this->db->get();
																			if($res->result_array() != false){
																				$bill_status = $res->row()->bill_status;
																			} else {
																				$this->db->where('patient_id',$row['patient_id']);
																				$this->db->where('treatment_date',date('y-m-d', strtotime($r['sn_date'])));
																				$this->db->select('bill_id')->from('tbl_invoice_header');
																				$query = $this->db->get();
																				if($query->result_array() != false){
																					$bill_status = '1';
																				} else {
																					$bill_status = 0;
																				}
																			}
																	?>
															 
															    <div class="vertical-timeline-item vertical-timeline-element">
																	<div><span class="vertical-timeline-element-icon bounce-in"><i class="badge badge-dot badge-dot-xl badge-success"> </i></span>
																		<div class="vertical-timeline-element-content bounce-in"><h4 class="timeline-title text-primary">Consultant : <?php echo $r['first_name']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<font color="black">Treatment : <?php echo $r['item_name']; ?></font></h4>
																			<?php if($r['Comment_sess'] != '') { ?><p>Comments : <?php echo $r['Comment_sess']; ?></p><?php } ?>
																			<p><?php if($bill_status != '1'){ ?><div class="badge badge-pill badge-primary">Make Bill</div>
																			<?php } else { ?><div class="badge badge-pill badge-danger">Invoice Generated</div>
																			<?php } ?></p>
																			<span class="vertical-timeline-element-date"><h4 class="timeline-title text-danger"><?php echo date('d M',strtotime($r['sn_date'])) ?></h4></span></div>
																	</div>
																</div>
															 <?php  } }  ?></div>	
														</div>
													</div>
											 </div>
											 <div class="tab-pane" id="invoice" role="tabpanel">
													<div class="main-card mb-6">
													  <div class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
																	<?php 
																	    if($invoice_details != false) { 
																        foreach($invoice_details as $r) {
																	?>															 
															    <div class="vertical-timeline-item vertical-timeline-element">
																	<div><span class="vertical-timeline-element-icon bounce-in"><i class="badge badge-dot badge-dot-xl badge-danger"> </i></span>
																		<div class="vertical-timeline-element-content bounce-in"><h4 class="timeline-title text-primary">Consultant : <?php echo $r['first_name']; ?></h4>
																			<?php if($r['net_amt'] != '0.00') { ?><p><strong>Invoice : S$ <?php echo $r['net_amt']; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;
																			<font style="color:red;"><strong>Paid  : S$ <?php echo $r['paid_amt']; ?></font></strong>&nbsp;&nbsp;&nbsp;&nbsp;
																			<?php if($r['payment_mode']  != '') { ?>Payment mode : <?php echo $r['payment_mode']; ?></p>
																			<?Php } } ?><p><?php if($r['bill_status'] != '1'){ ?>
																			 <a href="<?php echo base_url().'client/invoice/invoice_status_update/'.$r['bill_id'].'/'.$row['patient_id']; ?>"><div class="badge badge-pill badge-secondary"><font color="white"> Make Payment </font> </div></a>
																			<?php } else { ?><?php } ?></p>  
																			<span class="vertical-timeline-element-date"><h4 class="timeline-title text-danger"><?php echo date('d M',strtotime($r['treatment_date'])) ?></h4></span></div>
																	</div>
																</div>
															 <?php  } }  ?></div>	
																										
													</div>
											 </div>
											</div>
										</div>
									   </div>
									</div>
									
									<div class="tab-pane" id="tab-faq-8">
										<div class="main-card mb-12">
                                        <div class="card-header" style="width:100%;">
                                            <div class="btn-actions-pane-middle">
												<div class="nav">
                                                    <a data-toggle="tab" href="#provisional" class="border-0 btn-transition btn btn-outline-primary show active">Diagnosis</a>
                                                    <!--&nbsp;&nbsp;<a data-toggle="tab" href="#medical_p" class="border-0 btn-transition btn btn-outline-primary show">Medical Diagnosis</a>-->
                                                    &nbsp;&nbsp;<a data-toggle="tab" href="#goals" class="border-0 btn-transition btn btn-outline-primary show">Goals</a>
                                                    &nbsp;&nbsp;<a data-toggle="tab" href="#protocls" class="border-0 btn-transition btn btn-outline-primary show">Treatment Protocols</a>
                                                    &nbsp;&nbsp;<a data-toggle="tab" href="#encounter" class="border-0 btn-transition btn btn-outline-primary show">Treatment Encounter</a>
                                                </div>
											</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content">
											 <div class="tab-pane" id="encounter" role="tabpanel">
													<div class="main-card mb-12">
														<div class="card-body">
															<div class="row">
													    <div class="col-md-4">
															 <div class="input-group">
															<div class="input-group-prepend datepicker-trigger">
																<div class="input-group-text">
																	<i class="fa fa-calendar-alt"></i>
																</div>
															</div>
															<input type="text" class="form-control datepicker" Placeholder="Date" name="from_date" id="from_date" autocomplete="off" data-toggle="datepicker">
															</div>	
														</div>
														<div class="col-md-4">
															 <div class="input-group">
															<div class="input-group-prepend datepicker-trigger">
																<div class="input-group-text">
																	<i class="fa fa-calendar-alt"></i>
																</div>
															</div>
															<input type="text" class="form-control datepicker" Placeholder="Date" name="to_date" id="to_date" autocomplete="off" data-toggle="datepicker">
															</div>	
														</div>
														<div class="form-group col-sm-4">
														  <button type="submit" id="group_invoice1" class="btn btn-pill btn-danger">Generate Invoice</button>
													    </div>
													    </div></br>
																
															 <table  class="table table-striped table-bordered" id="basicDataTable">
																<thead>
																  <tr>
																	  <th class="text-center" >Date</th>
																	  <th class="text-center" >Patient Name</th>
																	  <th class="text-center" >No Of Session</th>
																	  <th class="text-center" >Comments</th>
																	  <th class="text-center" >Actions</th>
																</tr>
																</thead>
																<tbody>
																<?php if($session_report != false){ 
																foreach($session_report as $infosess){
																
																$this->db->where('patient_id',$infosess['patient_id']);
																$this->db->where('treatment_date',date('y-m-d', strtotime($infosess['sn_date'])));
																$this->db->select('bill_status')->from('tbl_patient_treatment_techniques');
																$res = $this->db->get();
																if($res->result_array() != false){
																$bill_status = $res->row()->bill_status;
																} else {
																	$this->db->where('patient_id',$infosess['patient_id']);
																	$this->db->where('treatment_date',date('y-m-d', strtotime($infosess['sn_date'])));
																	$this->db->select('bill_id')->from('tbl_invoice_header');
																	$query = $this->db->get();
																	if($query->result_array() != false){
																		$bill_status = '1';
																	} else {
																		$bill_status = 0;
																	}
																}
																?>
																<tr id="<?php echo $infosess['patient_id'].'encounter'.$infosess['sn_id'] ?>">
																	
																	<td class="text-center" ><?php echo date('d/m/Y', strtotime($infosess['sn_date'])); ?></td>
																	<td class="text-center" ><?php echo $infosess['fpatient_name'].' '.$infosess['lpatient_name']; ?></td>
																	<td class="text-center" ><?php echo $infosess['Session_count']; ?></td>
																	<td class="text-center" ><?php echo wordwrap($infosess['Comment_sess'],50,"<br />\n"); ?></td>
																	<td class="actions text-center">
																	<?php if($bill_status != '1') { ?> 
																	<a class="edit" href="<?php echo base_url().'client/reports/edit_report/'.$row['patient_id'].'/'.$infosess['sn_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i> </button></a>
																	<a class="delete_encounter" href="<?php echo '#'.$row['patient_id'].'#'.$infosess['sn_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"></i> </button></a><?php } else { ?>
																	<button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success">Invoice Generated</button><?php } ?></td>  
																</tr>
																<?php
															} } else { ?>
															<tr><td colspan="5"><center> No More Records.</center></td></tr>
															<?php } ?>
																</tbody>
															  </table>
														</div>
													</div>
											</div>
											<!--<div class="tab-pane" id="medical_p" role="tabpanel">
													<div class="main-card mb-12">
														<div class="card-body">
															<form id="medical_diag" action ="<?php echo base_url().'client/patient/add_medical_diag' ?>" method="post"  id="basicvalidations"  >
																<input type="hidden" name="patient_id" value="<?php echo $this->uri->segment('5') ?>" />
																<div class="row">
																<div class="col-md-4">
																 <div class="input-group">
																<div style="width:450px;" class="position-relative form-group"><label for="bill_no" class="">Date</label>
																		<input type="text" class="form-control datepicker" Placeholder="Date" name="md_date" id="md_date" autocomplete="off" data-toggle="datepicker">
																</div>	
																</div>	
																</div>	
																<div class="col-md-8">	
																<div class="input-group">
																		<div class="position-relative form-group"><label for="bill_no" class="">Medical Diagnosis</label>
																		<input style="width:550px;" placeholder="Medical Diagnosis" type="text" name="biomechanical" id="biomechanical" class="form-control">
																</div>											
																</div>											
																</div>											
																</div></br>
															  <div class="clearfix">
																	<button type="submit" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-pill btn-primary">Submit</button>
																	<button  id="prev-btn" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">cancel</button>
															</div></form></br></br>
															
													 <table  class="table table-striped table-bordered medical_diag_notes" id="basicDataTable">
														<thead>
														  <tr>
															<th class="text-center" >Date</th>
															<th class="text-center" >Medical Diagnosis</th>
															<th class="text-center" >Action</th>
														 </tr>
														</thead>
														<tbody>
														<?php if($medi_diag != false){ 
														foreach ($medi_diag as $row) {
														?>
														<tr id="<?php echo $row['patient_id'].'medical_diag'.$row['medi_id'] ?>">
															<td class="text-center" ><?php echo date('d-m-Y',strtotime($row['date'])); ?></td>
															<td class="text-center" ><?php echo $row['bio']; ?></td>
															<td class="actions text-center"><a class="edit" href="<?php echo base_url().'client/patient/edit_treatment_medicaldiag/'.$row['patient_id'].'/'.$row['medi_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="DeleteTreatment_medical" href="<?php echo '#'.$row['patient_id'].'#'.$row['medi_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"> </i></button></a></td>
														</tr>
														<?php
															} } else { ?>
															<tr><td colspan="3"><center> No More Records.</center></td></tr>
															<?php } ?>
														</tbody>
													  </table>
														</div>
													</div>
											   </div>-->
											   <div class="tab-pane show active" id="provisional" role="tabpanel">
													<div class="main-card mb-12">
														<div class="card-body">
															<form id="provisional" action ="<?php echo base_url().'client/patient/add_prov_diag' ?>" method="post">
															<input type="hidden" name="patient_id" value="<?php echo $this->uri->segment('5') ?>" />
															<div class="row">
															<div class="col-md-4">
															 <div class="input-group">
															  <div class="position-relative form-group"><label for="bill_no" class="">Date</label>
																	<input style="width:250px;" type="text" class="form-control datepicker" Placeholder="Date" name="pd_date" id="pd_date" autocomplete="off" data-toggle="datepicker">
															  </div>	
															 </div>	
															</div>	
															<div class="col-md-4">	
															<div class="input-group">
															<div class="position-relative form-group"><label for="bill_no" class="">Diagnosis</label>
																</br><select style="width:250px;" placeholder="Choose Existing Provisional Diagnosis"  multiple="" class="select-control form-control p_diagnosis" name="prov_diagnosis[]" id="prov_diagnosis" data-select2-id="4" tabindex="-1" aria-hidden="true">
																	 <option value="" >Choose Existing Diagnosis</option>
																	 <?php
																			if ($provDiagList != false) {
																				foreach ($provDiagList as $provDiagLists) {
																				echo '<option value="'.$provDiagLists['pd_list_id'].'">'.$provDiagLists['pd_list_name'].'</option>';
																				}
																			}
																		?>
																	</select>
															</div></div></div> 
															<div class="col-md-4">  <div class="position-relative form-group"><label for="bill_no" class="">&nbsp;&nbsp;</label>
															   </br>OR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-pill btn-info" style="color:white;" id="prov">Add Diagnosis </a>											
															  </div>
															</div>
														</div></br>
														<div class="clearfix">
															<button type="submit" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-pill btn-primary">Submit</button>
															<button  id="prev-btn" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">cancel</button>
														</div></form></br></br>
														<div class="alert alert-info fade show prov_diag">
													</br></br><div class="row">
															   <div class="form-group col-sm-6">
																<div class="position-relative form-group"><label for="bill_no" class="">Diagnosis</label>
																<input type="text" name="pd_list_name" class="form-control list_pd_name" id="pd_list_name">
															   </div>
															   </div>
															   <div class="form-group col-sm-6">
															  <div class="position-relative form-group"><label for="bill_no" class="">&nbsp;</label>
																</br> <button type="submit" class="btn btn-pill btn-primary submit" name="submit" id="save_prov">save</button>
															   <button class="btn btn-danger btn-pill submit" id="cancel_prov">Close</button>
															   </div>
															   </div>
													</div>
													</div>
														
													 <table  class="table table-striped table-bordered provisional_notes" id="basicDataTable">
														<thead>
														  <tr>
															<th class="text-center" >Date</th>
															<th class="text-center" >Diagnosis</th>
															<th class="text-center" >Action</th>
														 </tr>
														</thead>
														<tbody>
														<?php if($prov != false){ 
														foreach ($prov as $row) { ?>
														<tr id="<?php echo $row['patient_id'].'provisional'.$row['pd_id'] ?>">
															
															<td class="text-center" ><?php echo date('d-m-Y',strtotime($row['pd_date'])); ?></td>
															<td class="text-center" ><?php echo $row['prov_diagnosis']; ?></td>
															<td class="actions text-center"><a class="edit" href="<?php echo base_url().'client/patient/edit_treatment_provdiag/'.$row['patient_id'].'/'.$row['pd_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="DeleteProvdiag" href="<?php echo '#'.$row['patient_id'].'#'.$row['pd_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"> </i></button></a></td>
														</tr>
														<?php
															} } else { ?>
															<tr><td colspan="3"><center> No More Records.</center></td></tr>
															<?php } ?>
														</tbody>
													  </table>
													
													</div>
											    </div>
											   </div>
											   <div class="tab-pane show" id="goals" role="tabpanel">
													<div class="main-card mb-12">
														<div class="card-body">
														<form id="goal" action ="<?php echo base_url().'client/patient/add_goals' ?>" method="post"  id="basicvalidations"  >
													    <input type="hidden" name="patient_id" value="<?php echo $this->uri->segment('5') ?>" />
						  							    <div class="row">
															<div class="col-md-4">
															 <div class="input-group">
															<div class="position-relative form-group"><label for="bill_no" class="">Date</label>
																<input type="text" style="width:250px;" class="form-control datepicker" Placeholder="Date" name="goal_date" id="goal_date" autocomplete="off" data-toggle="datepicker">
															</div>	
															</div>	
															</div>	
														</div>	
														<div class="row">
														   <div class="col-md-4">	
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class="">Short Term Goals 1</label>
																<textarea style="width:250px;"  placeholder="Short term goals" type="text" name="short_term_goals1" id="short_term_goals1" class="form-control"></textarea>
															</div>											
															</div>											
														 </div>
														 <div class="col-md-4">	
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class="">Short Term Goals 2</label>
																	<textarea style="width:250px;"  placeholder="Short term goals" type="text" name="short_term_goals2" id="short_term_goals2" class="form-control"></textarea>
															</div>											
															</div>											
														 </div>
														 <div class="col-md-4">	
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class="">Short Term Goals 3</label>
																	<textarea style="width:250px;"  placeholder="Short term goals" type="text" name="short_term_goals3" id="short_term_goals3" class="form-control"></textarea>
															</div>											
															</div>											
														 </div>
														</div></br>
														<div class="row">
															<div class="col-md-4">	
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class="">Long Term Goals 1</label>
																	<textarea style="width:250px;"  placeholder="Long term goals" type="text" name="long_term_goals1" id="long_term_goals1" class="form-control"></textarea>
															</div>											
															</div>											
															</div>
															<div class="col-md-4">	
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class="">Long Term Goals2</label>
																<textarea style="width:250px;"  placeholder="Long term goals" type="text" name="long_term_goals2" id="long_term_goals2" class="form-control"></textarea>
															</div>											
															</div>											
															</div>
															<div class="col-md-4">	
															<div class="input-group">
																	<div class="position-relative form-group"><label for="bill_no" class="">Long Term Goals3</label>
																	<textarea style="width:250px;"  placeholder="Long term goals" type="text" name="long_term_goals3" id="long_term_goals3" class="form-control"></textarea>
															</div>											
															</div>											
															</div>
														</div></br>
														<div class="row">
														   <div class="col-md-12">
															<div class="clearfix">
																</br></br><button type="submit" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-pill btn-primary">Submit</button>
																<button  id="prev-btn" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">cancel</button>
															</div>
															</div>															
														</div>
														</form></br></br>
														
													 <table  class="table table-striped table-bordered goal_notes" id="basicDataTable">
														<thead>
														  <tr>
															<th class="text-center" >Date</th>
															<th class="text-center" >Short term Goals</th>
															<th class="text-center" >Long term Goals</th>
															<th class="text-center" >Action</th>
														 </tr>
														</thead>
														<tbody>
														<?php if($goal != false){ 
														foreach ($goal as $row) {
															$arrshort_term_goals1 = explode("\n",$row['short_term_goals1']);
															$arrlong_term_goals1 = explode("\n",$row['long_term_goals1']);
														?>
														<tr id="<?php echo $row['patient_id'].'goals'.$row['goal_id'] ?>">
														    <td class="text-center" ><?php echo date('d-m-Y',strtotime($row['goal_date'])); ?></td>
															<td class="text-center" ><?php
																for($i=0;$i<count($arrshort_term_goals1);$i++){
																	echo $arrshort_term_goals1[$i].'<br>';
																}
															  ?></td>
															<td class="text-center" ><?php
																for($i=0;$i<count($arrlong_term_goals1);$i++){
																	echo $arrlong_term_goals1[$i].'<br>';
																}
															  ?></td>
															<td class="actions text-center"><a class="edit" href="<?php echo base_url().'client/patient/edit_treatment_goals/'.$row['patient_id'].'/'.$row['goal_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="DeleteGoal" href="<?php echo '#'.$row['patient_id'].'#'.$row['goal_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"> </i></button></a></td>
															
														</tr>
														<?php
															} } else { ?>
															<tr><td colspan="4"><center> No More Records.</center></td></tr>
															<?php } ?>
														</tbody>
													  </table>
														</div>
											    </div>
											   </div>
											  <div class="tab-pane show" id="protocls" role="tabpanel">
													<div class="main-card mb-12">
														<div class="card-body">
														<div style="display:none; width:100%;" class="alert alert-info fade show" id="add_treatment">
														<div class="row">
															<div class="col-md-4">	
															<div class="position-relative form-group"><label for="bill_no" class="">Item Name *</label>
															  <input type="text" class="form-control"   id="t_name" placeholder="Enter Item Name" name="t_name"/>
															</div>
														  </div>
														  <div class="col-md-4">	
															<div class="position-relative form-group"><label for="bill_no" class="">Item Price *</label>
															   <input type="text" class="form-control" id="t_price" name="t_price" placeholder="Enter Item Price"  rows="4"/>
															</div>
														  </div>
														  <div class="col-md-4">	
															<div class="position-relative form-group"><label for="bill_no" class="">Description</label>
															  <textarea class="form-control" id="t_desc" name="t_desc" placeholder="Enter Item Description" rows="2"></textarea>
															</div>
														  </div>
														  
														</div>
														  <div style="text-align:right">
																<button style="margin:-10px 5px 0 0" type="button" id="saveProvDiag" class="btn btn-primary btn-pill btn-mini">Save</button>
																<button style="margin:-10px 24px 0 0" type="button" id="cancelProvDiag" class="btn btn-danger btn-pill btn-mini">Cancel</button>
															</div>
														</div>
														<form id="protocols" class="form-horizontal" action ="<?php echo base_url().'client/patient/addTreatmentTechniques' ?>"  method="post" role="form" parsley-validate id="basicvalidations">
														<div class="row">
															<div class="col-md-4">
															 <div class="input-group">
															  <div class="position-relative form-group"><label for="bill_no" class="">Date (You Can Choose Multipledate)</label>
															  <div id="with-altField" ></div>
																	<input type="text" name="treatment_date" parsley-trigger="change" parsley-required="true" data-date-format='D-M-YYYY' placeholder="Can choose Multiple Dates"  class="form-control" id="altField" autocomplete="off">
															  </div>	
															 </div>	
															</div>	
															<div class="col-md-4">	
															<div class="input-group">
															<div class="position-relative form-group"><label for="bill_no" class="">Treatments</label>
																</br><select style="width:250px;"  multiple="" class="select-control form-control treatments" name="treatments[]" placeholder="Choose from Exisiting Treatment Item" id="treatments_item" data-select2-id="4" tabindex="-1" aria-hidden="true">
																	 <option value="" > Choose from Exisiting Treatment Item </option>
																		<?php
																		if($item != false) {
																			foreach($item as $items){
																				echo '<option value="'.$items['item_id'].'|'.$items['item_price'].'">'.ucfirst($items['item_name']).'</option>';	
																			}
																		}
																		?>
																	</select>
															</div></div>
															
															<div class="input-group">
															 <div class="position-relative form-group"><label for="bill_no" class="">No of Session (for each day)</label>
															     <input type="text" style="width:250px;" class="form-control" placeholder="Enter No Of Session" parsley-trigger="change" parsley-required="true" id="treatment_quantity" name="treatment_quantity" rows="4"/>
															</div>
															</div>	
															
															<div class="input-group">
															  <div class="position-relative form-group"><label for="bill_no" class="">Price</label>
															     <input type="text" style="width:250px;" class="form-control" placeholder="Enter No Of Price" parsley-trigger="change" parsley-required="true" id="treatment_price" name="treatment_price" rows="4"/>
															 </div>	
															 </div>	
															
															</div>
															<div class="col-md-4">
															<div class="position-relative form-group"><label for="bill_no" class="">&nbsp;&nbsp;</label>
																</br>OR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a id="treat_add" style="color:white;" class="btn btn-pill btn-info"> Add New Treatment Item</a>
															</div>
															
															<div class="input-group">
															<div class="position-relative form-group"><label for="bill_no" class="">Consultant</label>
																</br><select style="width:250px;"  class="select-control form-control p_diagnosis" name="staff_id" id="staff_id" data-select2-id="4" tabindex="-1" aria-hidden="true">
																	 <option value="">Choose from Existing Consultant</option>
																	 <?php
																		if($consultants != false) {
																			foreach($consultants as $consultant){
																				echo'<option value="'.$consultant['staff_id'].'">'.ucfirst($consultant['first_name']).' '.ucfirst($consultant['last_name']).'</option>';	
																			}
																		}
																	?>
																	</select>
															</div></div>
															
															
															</div>
														</div></br>
														<input type="hidden" name="patient_id" id="patient_id" value="<?php echo $patient_id ?>"  />
														<!--<div class="row">
														   <div class="col-md-4"><div class="position-relative form-group"><label for="bill_no" class="">Session</label>
															     <input type="text" style="width:250px;" class="form-control" placeholder="Enter No Of Session" parsley-trigger="change" parsley-required="true" id="treatment_quantity" name="treatment_quantity" rows="4"/>
															</div>
															</div>
															<div class="col-md-4">
															 <div class="input-group">
															  <div class="position-relative form-group"><label for="bill_no" class="">Price</label>
															     <input type="text" style="width:250px;" class="form-control" placeholder="Enter No Of Price" parsley-trigger="change" parsley-required="true" id="treatment_price" name="treatment_price" rows="4"/>
															 </div>	
															 </div>	
															</div>	
															<div class="col-md-4">	
															<div class="input-group">
															<div class="position-relative form-group"><label for="bill_no" class="">Consultant</label>
																</br><select style="width:250px;"  class="select-control form-control p_diagnosis" name="staff_id" id="staff_id" data-select2-id="4" tabindex="-1" aria-hidden="true">
																	 <option value="">Choose from Existing Consultant</option>
																	 <?php
																		if($consultants != false) {
																			foreach($consultants as $consultant){
																				echo'<option value="'.$consultant['staff_id'].'">'.ucfirst($consultant['first_name']).' '.ucfirst($consultant['last_name']).'</option>';	
																			}
																		}
																	?>
																	</select>
															</div></div></div>
														</div>-->
														<div class="row">
														   <div class="col-md-12">
															<div class="clearfix">
																</br></br><button type="submit" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-pill btn-primary">Submit</button>
																<button  id="prev-btn" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">cancel</button>
															</div>
															</div>															
														</div>
														</form>	</br></br>
														<div class="row">
													    <div class="col-md-4">
															 <div class="input-group">
															<div class="input-group-prepend datepicker-trigger">
																<div class="input-group-text">
																	<i class="fa fa-calendar-alt"></i>
																</div>
															</div>
															<input type="text" class="form-control datepicker" Placeholder="Date" name="from" id="from" autocomplete="off" data-toggle="datepicker">
															</div>	
														</div>
														<div class="col-md-4">
															 <div class="input-group">
															<div class="input-group-prepend datepicker-trigger">
																<div class="input-group-text">
																	<i class="fa fa-calendar-alt"></i>
																</div>
															</div>
															<input type="text" class="form-control datepicker" Placeholder="Date" name="to" id="to" autocomplete="off" data-toggle="datepicker">
															</div>	
														</div>
														<div class="form-group col-sm-4">
														  <button type="submit" id="group_invoice" class="btn btn-pill btn-danger">Generate Invoice</button>
													    </div>
													 </div>	</br>
													
														<table  class="table table-striped table-bordered protocols_notes" id="advancedDataTable">
														 <thead>
														  <tr>
														  <th class="text-center" >#</th>
														  <th class="text-center" >Date</th>
														  <th class="text-center" >Treatment</th>
														  <th class="text-center" >Quantity</th>
														  <th class="text-center" >Price</th>
														  <th class="text-center" >Consultant</th>
														  <th class="text-center" >Action</th>
														</tr>
														</thead>
														<tbody>
														<?php if($treatment != false) { $i = 1;
															foreach($treatment as $treatments){
																$s_id = explode('-',$treatments['staff_id']);
																if(sizeof($s_id) > 1) {
																	$q = array();
																	for($i = 0; $i < sizeof($s_id); $i++){
																			$this->db->where('staff_id',$s_id[$i]);
																			$this->db->select('first_name,last_name')->from('tbl_staff_info');
																			$res = $this->db->get();
																			if($res->result_array() != false){
																				$arr = $res->row()->first_name.' '.$res->row()->last_name;
																			} 
																			array_push($q,$arr); 
																			
																	}
																	$name = implode(',',$q);
																} else {
																	$this->db->where('staff_id',$s_id[0]);
																	$this->db->select('first_name,last_name')->from('tbl_staff_info');
																	$res = $this->db->get();
																	if($res->result_array() != false){
																		$name = $res->row()->first_name.' '.$res->row()->last_name;
																		
																	} else {
																		$name = '';
																	}
																	
																}  ?>
														<tr id="<?php echo $row['patient_id'].'protocols'.$i; ?>">
														
														<td>
														<?php if($treatments['bill_status'] == 1) { ?>
														<span class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success" >Invoice Generated</span>
														<?php } ?>
														</td>
														  <td data-field="treatDate_<?php echo $treatments['treatment_id']; ?>" style="vertical-align: middle"><?php echo date('d/m/Y', strtotime($treatments['treatment_date'])); ?></td>
														  <td data-field="treatment_<?php echo $treatments['treatment_id']; ?>" style="vertical-align: middle"><?php echo $treatments['itemName']; ?></td>
														  <td data-field="treatQty_<?php echo $treatments['treatment_id']; ?>" style="vertical-align: middle"><?php echo $treatments['treatmentQuantity']; ?></td>
														  <td data-field="treatPrice_<?php echo $treatments['treatment_id']; ?>" style="vertical-align: middle"><?php echo $treatments['treatmentPrice']; ?></td>
														  <td data-field="treatConsultant_<?php echo $treatments['treatment_id']; ?>" style="vertical-align: middle"><?php print_r($name); ?></td>
														  <td style="text-align: center; vertical-align: middle">
														  <?php if($treatments['bill_status'] == 0) {
																$treatmentGroupId = str_replace("/","_",$treatments['treatment_group_id']);
															?>
															<input type="hidden" name="treatmentGroup_id" id="treatmentGroup_id" value="<?php echo $treatments['treatment_group_id']; ?>" autocomplete="off">
															<input type="hidden" class="span11" name="treatment_date" id="treatment_date" value="<?php echo $treatments['treatment_date']; ?>" autocomplete="off">
															<a class="DeleteTreatment" href="<?php echo '#'.$row['patient_id'].'#'.$treatments['treatment_group_id'].'#'.$i; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"></i> </button></a>
															<a class="reschedule" href="<?php echo '#'.$row['patient_id'].'#'.$treatments['treatment_date']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Reschedule"><i class="fa fa-edit"></i></button></a>
															<?php }
															else{ ?>
																
																<a class="DeleteTreatment" href="<?php echo '#'.$row['patient_id'].'#'.$treatments['treatment_group_id'].'#'.$i; ?>" ><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"></i></button></a>
															
															<?php } ?>
															</td>
														</tr>
														<?php $i = $i+1;
															} } else { ?>
															<tr><td colspan="6"><center> No More Records.</center></td></tr>
															<?php } ?>
														</tbody>
														</table>
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
							<?php } ?>
							<style>
							.app-inner-layout .app-inner-layout__header {
								width: 100%;
								padding: 0.4rem;
							}
							.badge {
								 margin: 5px 5px 1px 1px;
								 padding: 0.35rem;
							}
							
							</style>
							 <div class="col-md-2 app-inner-layout__sidebar card">
                                <ul class="nav">
                                    <li class="nav-item"><a href="#tab-faq-1" data-toggle="tab" class="nav-link active dropdown-item">
									 <div class="badge ml-0 mr-2 badge-dot badge-dot-xl badge-success">Dark</div>
										Patient Profile
                                    </a></li>
									<li class="nav-item"><a href="#consent" data-toggle="tab" class="nav-link dropdown-item">
									 <div class="badge ml-0 mr-2 badge-dot badge-dot-xl badge-focus">Dark</div>
										Consent Form
                                    </a></li>
                                    <li class="nav-item"><a href="#tab-faq-2" data-toggle="tab" class="nav-link dropdown-item">
									<div class="badge ml-0 mr-2 badge-dot badge-dot-xl badge-info">Dark</div>
                                            Time Line </a></li>
                                    <li class="nav-item"><a href="#tab-faq-3" data-toggle="tab" class="nav-link dropdown-item">
									<div class="badge ml-0 mr-2 badge-dot badge-dot-xl badge-warning">Dark</div>
                                           SOAP Notes</a></li>
                                    <li class="nav-item"><a href="#tab-faq-4" data-toggle="tab" class="nav-link dropdown-item">
									<div class="badge ml-0 mr-2 badge-dot badge-dot-xl badge-primary" >Dark</div>
                                            Ax Templates</a></li>  
                                    <li class="nav-item"><a href="#tab-faq-5" data-toggle="tab" class="nav-link dropdown-item">
									<div class="badge ml-0 mr-2 badge-dot badge-dot-xl badge-danger">Dark</div>
                                     Custom Assessments</a></li>
									<li class="nav-item"><a href="#tab-faq-6" data-toggle="tab" class="nav-link dropdown-item">
									<div class="badge ml-0 mr-2 badge-dot badge-dot-xl badge-success">Dark</div>
                                           Body Chart</a></li>
									<li class="nav-item"><a href="#tab-faq-7" data-toggle="tab" class="nav-link dropdown-item">
									<div class="badge ml-0 mr-2 badge-dot badge-dot-xl badge-info">Dark</div>
                                            Investigation</a></li>
									<li class="nav-item"><a href="#tab-faq-8" data-toggle="tab" class="nav-link dropdown-item">
									<div class="badge ml-0 mr-2 badge-dot badge-dot-xl badge-warning">Dark</div>
                                            Interventions</a></li>
                                 </ul>
                            </div>  
                            
                        </div>
                    </div>
                </div>
            </div>
    </div>
	<div id="add_participants_model" class="modal fade" data-dispatchidse="">
        <div class="modal-dialog">
           <div class="modal-content">
			   <div class="modal-body">
				<center><h4> Add Participants</h4>
				</center>
				<div class="form-group">
						<label for="input01" class=" control-label">Email  *</label>
						<div class="">
						  <input type="text" class="form-control"  name="inviteemail" id="inviteemail"   placeholder="Enter Email">
						</div>
				</div>
			   </div>
			   <div class="modal-footer">
				<center> 
					<a id="cancel_e" class="btn btn-pill btn-danger" style="color:white;" >Cancel</a>
					<button id="send_invite" type="submit" class="btn btn-pill btn-primary submit">Send Invite</button>
				</center> 
				</div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

		<div id="toast-container" style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success !</br>Your Details Has Been Added Sucessfully!</div></div></div>
		<div class="swal2-container swal2-center swal2-fade swal2-shown" style="display:none; overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progresssteps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"><span class="swal2-x-mark"><span class="swal2-x-mark-line-left"></span><span class="swal2-x-mark-line-right"></span></span></div><div class="swal2-icon swal2-question" style="display: none;"><span class="swal2-icon-text">?</span></div><div class="swal2-icon swal2-warning" style="display: none;"><span class="swal2-icon-text">!</span></div><div class="swal2-icon swal2-info" style="display: none;"><span class="swal2-icon-text">i</span></div><div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Type: success</h2><button type="button" class="swal2-close" style="display: none;">Ã—</button></div><div class="swal2-content"><div id="swal2-content" style="display: block;">Do you want to continue</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message" style="display: none;"></div></div><div class="swal2-actions" style="display: flex;"><button type="button" class="swal2-confirm swal2-styled" aria-label="" style="border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);">Cool</button><button type="button" class="swal2-cancel swal2-styled" aria-label="">Cancel</button></div><div class="swal2-footer" ></div></div></div>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/prettify.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/lang-css.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-1.11.1.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui-1.11.1.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui.multidatespicker.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>my_assets/assets/scripts/main.js"></script></body>
		<script src="<?php echo base_url();?>assets/parsley/parsley.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
		
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

   <script src="<?php echo base_url(); ?>assets/js/jquery.gritter.min.js"></script>  
		<script type="text/javascript">
		$(function() {
			prettyPrint();
			var myDate = new Date();
		    var prettyDate1 =(myDate.getDate()) + '-' + (myDate.getMonth()+1) + '-' + myDate.getFullYear();
	
			$('#with-altField').multiDatesPicker({
				altField: '#altField',
				addDates: [prettyDate1],
				dateFormat: "dd-mm-yy"
			}); 
		});
		</script><script>
  $('.select-control').select2();
 function calculateBmi() {
		var weight = Number(document.getElementById('weight').value).toFixed(2);
		var height = Number(document.getElementById('height').value).toFixed(2);
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
	}
	$(function() {
		$('.referal_type_id').change(function() {
			var url= '<?php echo base_url().'client/referal/referal_details' ?>';
			var id = $('#referal_type_id').val();
			if (id != ""){
				$.ajax({
					type: "POST",
					dataType: 'json',
					data : {ref_id:id},
					url: url,
					success: function(data) {
						if(data.status == 'failure'){
							
						} else if(data.status == 'success') {
							
							if(id == '1' || id == '6'){
							 $('#referal_id').empty();
							 for(var i = 0;i < data.referalData.length; i++){
							  var newOption = $('<option value = ' + data.referalData[i].referal_id + '>' + data.referalData[i].referal_name + '</option>');
							  $('#referal_id').append(newOption);
							  $('#referal_id').trigger("chosen:updated");
							} 
						  }
						  if(id == '2'){
							 $('#referal_id').empty();
							 for(var i = 0;i < data.referalData.length; i++){
							  var newOption = $('<option value = ' + data.referalData[i].referal_id + '>' + data.referalData[i].website_name + '</option>');
							  $('#referal_id').append(newOption);
							  $('#referal_id').trigger("chosen:updated");
							} 
						  }
						  if(id == '3'){
							 $('#referal_id').empty();
							 for(var i = 0;i < data.referalData.length; i++){
							  var newOption = $('<option value = ' + data.referalData[i].referal_id + '>' + data.referalData[i].adv_name + '</option>');
							  $('#referal_id').append(newOption);
							  $('#referal_id').trigger("chosen:updated");
							} 
						  }
						  if(id == '4'){
							 $('#referal_id').empty();
							 for(var i = 0;i < data.referalData.length; i++){
							  var newOption = $('<option value = ' + data.referalData[i].referal_id + '>' + data.referalData[i].referal_oth_name + '</option>');
							  $('#referal_id').append(newOption);
							  $('#referal_id').trigger("chosen:updated");
							} 
						  }
						    if(id == '5'){
							 $('#referal_id').empty();
							 for(var i = 0;i < data.referalData.length; i++){
							  var newOption = $('<option value = ' + data.referalData[i].patient_id + '>' + data.referalData[i].first_name + ' '+ data.referalData[i].last_name + '</option>');
							  $('#referal_id').append(newOption);
							  $('#referal_id').trigger("chosen:updated");
							} 
						  }
						}
					}, 
					complete: function(){
							
					},
					error: function(e){ // alert error if ajax fails
						alert(e.responseText);
					} 
				 }); //end AJAX
				 }
				 else{
					
				 }
		});
			$('#treatments').change(function(){
				var treat = $('.treatments').val();
				var val = treat.join(",");
				$.ajax({
					url : '<?php echo base_url().'client/patient/split_item' ?>',            
					data : {s_name:val},
					type: "POST",
					dataType : 'json',  
					
					success:function(data, textStatus, jqXHR,form) 
					{
						if(data.status == 'success'){
							$('#treatment_price').val(data.message);
									
						} else {
								
						}
						
					},
					
				}); 
			});  
			
		$("#treat_add").click(function(){
		$("#add_treatment").fadeIn();
		});
	$("#cancelProvDiag").click(function(){
		$("#add_treatment").fadeOut();
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
				var obj = data.Treatment.item_id;
				var obj1 = data.Treatment.item_price;
				var obj2 = data.Treatment.item_name;
				$(".prov_diag").hide();
				var newOption = $('<option value = ' + obj + '/' + obj1 + '  selected>' + obj2 + '</option>');
				$('#treatments_item').append(newOption);
				$("#treatment_price").val(obj1);
				$('#treatments_item').trigger("chosen:updated"); 
							
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				/* $.jGrowl("Treatment Item Has Been Added Successfully!");
				setTimeout(function(){ 
						window.location.reload();
				}, 1000); */
			}
		}); 
	});
});
 $(document).ready(function() {
	$('.DeleteCaseNotes').on('click', function () {
			 var patient_id = $(this).attr('href').split('#')[1];
			 var cn_id = $(this).attr('href').split('#')[2];
			 url ='<?php echo base_url().'client/patient/caseNotesDelete/' ?>'+ cn_id+"/"+ patient_id; 
			 swal({
			  title: "Confirmation",
			  text: "Are you sure you want to delete this patient record?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
						if(data.status == 'success') {
						  swal("Success!", "Your records has been deleted!", "success");
						}
						$('#'+patient_id+'case'+cn_id).remove();
							
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						  swal("Failure!", "Your records has not been deleted!", "success");
						
					}
				  });
			}); 
	});
    $('.DeleteProgNotes').on('click', function () {
			 var patient_id = $(this).attr('href').split('#')[1];
			 var pn_id = $(this).attr('href').split('#')[2];
			 url ='<?php echo base_url().'client/patient/progNotesDelete/' ?>'+ patient_id+"/"+ pn_id; 
			 swal({
			  title: "Confirmation",
			  text: "Are you sure you want to delete this patient record?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
						if(data.status == 'success') {
						  swal("Success!", "Your records has been deleted!", "success");
						}
						$('#'+patient_id+'progress'+pn_id).remove();
							
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						  swal("Failure!", "Your records has not been deleted!", "success");
						
					}
				  });
			}); 
	});
	$('.DeleteRemarks').on('click', function () {
			 var patient_id = $(this).attr('href').split('#')[1];
			 var remark_id = $(this).attr('href').split('#')[2];
			 url ='<?php echo base_url().'client/patient/remarksDelete/' ?>'+ patient_id+"/"+ remark_id; 
			 swal({
			  title: "Confirmation",
			  text: "Are you sure you want to delete this patient record?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
						if(data.status == 'success') {
						  swal("Success!", "Your records has been deleted!", "success");
						}
						$('#'+patient_id+'remark'+remark_id).remove();
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
							swal("Failure!", "Your records has not been deleted!", "success");
						
					}
				  });
			}); 
	});
    $('.DeletePlan').on('click', function () {
			 var patient_id = $(this).attr('href').split('#')[1];
			 var soap_plan_id = $(this).attr('href').split('#')[2];
			 url ='<?php echo base_url().'client/patient/DeletePlan/' ?>'+ patient_id+"/"+ soap_plan_id; 
			swal({
			  title: "Confirmation",
			  text: "Are you sure you want to delete this patient record?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
						if(data.status == 'success') {
						  swal("Success!", "Your records has been deleted!", "success");
						}
							$('#'+patient_id+'plan'+soap_plan_id).remove();
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
							swal("Failure!", "Your records has not been deleted!", "success");
						
					}
				  });
			}); 
	});
	$('.DeleteHis').on('click', function () {
			 var patient_id = $(this).attr('href').split('#')[1];
			 var his_id = $(this).attr('href').split('#')[2];
			 url ='<?php echo base_url().'client/patient/assessment_history_delete/' ?>'+ patient_id+"/"+ his_id; 
			swal({
			  title: "Confirmation",
			  text: "Are you sure you want to delete this patient record?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
						if(data.status == 'success') {
						  swal("Success!", "Your records has been deleted!", "success");
						}
						$('#'+patient_id+'his'+his_id).remove();
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
							swal("Failure!", "Your records has not been deleted!", "success");
						
					}
				  });
			}); 
	});
    $('.DeleteCc').on('click', function () {
			 var patient_id = $(this).attr('href').split('#')[1];
			 var cc_id = $(this).attr('href').split('#')[2];
			 url ='<?php echo base_url().'client/patient/assessment_chiefcomp_delete/' ?>'+ patient_id+"/"+ cc_id; 
			swal({
			  title: "Confirmation",
			  text: "Are you sure you want to delete this patient record?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
						if(data.status == 'success') {
						  swal("Success!", "Your records has been deleted!", "success");
						}
						$('#'+patient_id+'chief'+cc_id).remove();
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
							swal("Failure!", "Your records has not been deleted!", "success");
						
					}
				  });
			}); 
	});
	$('.DeletePain').on('click', function () {
			 var patient_id = $(this).attr('href').split('#')[1];
			 var pain_id = $(this).attr('href').split('#')[2];
			 url ='<?php echo base_url().'client/patient/assessment_pain_delete/' ?>'+ patient_id+"/"+ pain_id; 
			swal({
			  title: "Confirmation",
			  text: "Are you sure you want to delete this patient record?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
						if(data.status == 'success') {
						  swal("Success!", "Your records has been deleted!", "success");
						}
							$('#'+patient_id+'pain'+pain_id).remove();
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
							swal("Failure!", "Your records has not been deleted!", "success");
						
					}
				  });
			}); 
	});
    $('.DeleteBodychart').on('click', function () {
			var patient_id = $(this).attr('href').split('#')[1];
			 var img_id = $(this).attr('href').split('#')[2];
			 url ='<?php echo base_url().'client/patient/body_delete/' ?>'+ patient_id+"/"+ img_id; 
			swal({
			  title: "Confirmation",
			  text: "Are you sure you want to delete this patient record?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
						if(data.status == 'success') {
						  swal("Success!", "Your records has been deleted!", "success");
						}
						$('#'+patient_id+'body'+img_id).remove();
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
							swal("Failure!", "Your records has not been deleted!", "success");
						
					}
				  });
			}); 
	});	
			$('.DeleteExamn').on('click', function () {
			var patient_id = $(this).attr('href').split('#')[1];
			 var examn_id = $(this).attr('href').split('#')[2];
			 url ='<?php echo base_url().'client/patient/assessment_examn_delete/' ?>'+ patient_id+"/"+ examn_id; 
			swal({
			  title: "Confirmation",
			  text: "Are you sure you want to delete this patient record?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
						if(data.status == 'success') {
						  swal("Success!", "Your records has been deleted!", "success");
						}
						$('#'+patient_id+'exam'+examn_id).remove();
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
							swal("Failure!", "Your records has not been deleted!", "success");
						
					}
				  });
			}); 
	});
			$('.DeleteMexamn').on('click', function () {
			 var patient_id = $(this).attr('href').split('#')[1];
			 var mexamn_id = $(this).attr('href').split('#')[2];
			 url ='<?php echo base_url().'client/patient/assessment_mexamn_delete/' ?>'+ patient_id+"/"+ mexamn_id; 
			swal({
			  title: "Confirmation",
			  text: "Are you sure you want to delete this patient record?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
						if(data.status == 'success') {
						  swal("Success!", "Your records has been deleted!", "success");
						}
							$('#'+patient_id+'motor'+mexamn_id).remove();
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
							swal("Failure!", "Your records has not been deleted!", "success");
						
					}
				  });
			}); 
	});
	$('.DeleteSexamn').on('click', function () {
			 var patient_id = $(this).attr('href').split('#')[1];
			 var sexamn_id = $(this).attr('href').split('#')[2];
			 url ='<?php echo base_url().'client/patient/assessment_sexamn_delete/' ?>'+ patient_id+"/"+ sexamn_id; 
			swal({
			  title: "Confirmation",
			  text: "Are you sure you want to delete this patient record?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
						if(data.status == 'success') {
						  swal("Success!", "Your records has been deleted!", "success");
						}
						$('#'+patient_id+'sensory'+sexamn_id).remove();
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
							swal("Failure!", "Your records has not been deleted!", "success");
						
					}
				  });
			}); 
	});
			$('.DeletePaediatric').on('click', function () {
			var patient_id = $(this).attr('href').split('#')[1];
			 var paediatric_id = $(this).attr('href').split('#')[2];
			 url ='<?php echo base_url().'client/patient/paediatricDelete/' ?>'+ patient_id+"/"+ paediatric_id; 
			swal({
			  title: "Confirmation",
			  text: "Are you sure you want to delete this patient record?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
						
						swal("Success!", "Your records has been deleted!", "success");
						$('#'+patient_id+'Paediatric'+paediatric_id).remove();
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
							swal("Failure!", "Your records has not been deleted!", "success");
						
					}
				  });
			}); 
	});
	$('.DeleteNuero').on('click', function () {
			var patient_id = $(this).attr('href').split('#')[1];
			 var nuero_id = $(this).attr('href').split('#')[2];
			 url ='<?php echo base_url().'client/patient/nueroDelete/' ?>'+ patient_id+"/"+ nuero_id;	 
			swal({
			  title: "Confirmation",
			  text: "Are you sure you want to delete this patient record?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
						if(data.status == 'success') {
						  swal("Success!", "Your records has been deleted!", "success");
						}
						$('#'+patient_id+'nuero'+nuero_id).remove();
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						swal("Success!", "Your records has been deleted!", "success");
						$('#'+patient_id+'nuero'+nuero_id).remove();
					
					}
				  });
			}); 
	});
			$('.DeleteInves').on('click', function () {
			 var patient_id = $(this).attr('href').split('#')[1];
			 var inves_id = $(this).attr('href').split('#')[2];
			 url ='<?php echo base_url().'client/patient/inves_delete/' ?>'+ patient_id+"/"+ inves_id; 
			swal({
			  title: "Confirmation",
			  text: "Are you sure you want to delete this patient record?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
						if(data.status == 'success') {
						  swal("Success!", "Your records has been deleted!", "success");
						}
						$('#'+patient_id+'inves'+inves_id).remove();
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
							swal("Failure!", "Your records has not been deleted!", "success");
						
					}
				  });
			}); 
	});
			$('.DeleteProvdiag').on('click', function () {
			 var patient_id = $(this).attr('href').split('#')[1];
			 var pd_id = $(this).attr('href').split('#')[2];
			 url ='<?php echo base_url().'client/patient/assessment_provdiag_delete/' ?>'+ patient_id+"/"+ pd_id; 
			swal({
			  title: "Confirmation",
			  text: "Are you sure you want to delete this patient record?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
						if(data.status == 'success') {
						  swal("Success!", "Your records has been deleted!", "success");
						}
						$('#'+patient_id+'provisional'+pd_id).remove();
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
							swal("Failure!", "Your records has not been deleted!", "success");
						
					}
				  });
			}); 
	});
	$('.DeleteTreatment_medical').on('click', function () {
			 var patient_id = $(this).attr('href').split('#')[1];
			 var medi_id = $(this).attr('href').split('#')[2];
			 url ='<?php echo base_url().'client/patient/DeleteTreatment_medical/' ?>'+ patient_id+"/"+ medi_id; 
			 swal({
			  title: "Confirmation",
			  text: "Are you sure you want to delete this patient record?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
						if(data.status == 'success') {
						  swal("Success!", "Your records has been deleted!", "success");
						}
						$('#'+patient_id+'medical_diag'+medi_id).remove();
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
							swal("Failure!", "Your records has not been deleted!", "success");
						
					}
				  });
			}); 
	});
	$('.DeleteTreatment').on('click', function () {
			var patient_id = $(this).attr('href').split('#')[1];
			var treatment_group_id = $(this).attr('href').split('#')[2];
			var co = $(this).attr('href').split('#')[3];
			var url ='<?php echo base_url().'client/patient/treatmentTechniqueDelete/' ?>'+ patient_id+"/"+encodeURIComponent(treatment_group_id.replace(/\//g, '_')); 
		   swal({
			  title: "Confirmation",
			  text: "Are you sure you want to delete this patient record?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
						if(data.status == 'success') {
						  swal("Success!", "Your records has been deleted!", "success");
						}
						$('#'+patient_id+'protocols'+co).remove();
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
							swal("Failure!", "Your records has not been deleted!", "success");
						
					}
				  });
			}); 
	});
	$('.DeleteGoal').on('click', function () {
			var patient_id = $(this).attr('href').split('#')[1];
			 var goal_id = $(this).attr('href').split('#')[2];
			 url ='<?php echo base_url().'client/patient/assessment_goal_delete/' ?>'+ patient_id+"/"+ goal_id; 
			swal({
			  title: "Confirmation",
			  text: "Are you sure you want to delete this patient record?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
						if(data.status == 'success') {
						  swal("Success!", "Your records has been deleted!", "success");
						}
						$('#'+patient_id+'goals'+goal_id).remove();
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
							swal("Failure!", "Your records has not been deleted!", "success");
						
					}
				  });
			}); 
	});
	$('.Deleteexercise_protocol').on('click', function () {
			var ex_id = $(this).attr('href').split('#')[1];
			url ='<?php echo base_url().'client/patient/Deleteexercise_protocol/' ?>'+ ex_id; 
			swal({
			  title: "Confirmation",
			  text: "Are you sure you want to delete this patient record?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
						if(data.status == 'success') {
						  swal("Success!", "Your records has been deleted!", "success");
						}
						$('#'+ex_id).remove();
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
							swal("Failure!", "Your records has not been deleted!", "success");
						
					}
				  });
			}); 
	});
	$("#dob").click(function() {
		setTimeout(function(){ 
			var val = $('#dob').val();
			$('#dateob').val(val);
			var today = new Date();
			var dd = Number(today.getDate());
			var mm = Number(today.getMonth()+1);
			var yyyy = Number(today.getFullYear()); 
			var myBD = $('#dob').val();
			var myBDM = Number(myBD.split("/")[0])
			var myBDD = Number(myBD.split("/")[1])
			var myBDY = Number(myBD.split("/")[2])
			var age = yyyy - myBDY;
			$('#age').val(age);
		}, 10000);
	});
	var myDate = new Date();
		var prettyDate =(myDate.getDate()) + '/' + (myDate.getMonth()+1) + '/' + myDate.getFullYear();
		var prettyDate1 =(myDate.getDate()) + '-' + (myDate.getMonth()+1) + '-' + myDate.getFullYear();
		$(".datepicker").val(prettyDate);
	$('.from-input').multiDatesPicker({
		addDates: [prettyDate1],
	});
	
	$('.prov_diag').hide();
			$('#prov').click(function() {
				$('.prov_diag').show();
			});
			$('#cancel_prov').click(function() {
				$('.prov_diag').hide();
	});
	$('#treatments').change(function(){
				var treat = $('.treatments').val();
				var val = treat.join(",");
				$.ajax({
					url : '<?php echo base_url().'client/patient/split_item' ?>',            
					data : {s_name:val},
					type: "POST",
					dataType : 'json',  
					
					success:function(data, textStatus, jqXHR,form) 
					{
						if(data.status == 'success'){
							$('#treatment_price').val(data.message);
									
						} else {
								
						}
						
					},
					
				}); 
			}); 
			$("#treat_add").click(function(){
		$("#add_treatment").fadeIn();
		});
		$("#cancelProvDiag").click(function(){
		$("#add_treatment").fadeOut();
	});
	$('#dvloader').hide();
		$(document).on('change', '#file_upload', function(e){
				var data = new FormData();
				data.append('file', $('#file_upload').prop('files')[0]);
				$('#dvloader').show();
				$.ajax({
					url : '<?php echo base_url().'client/patient/file_upload' ?>',            
					processData: false, 
					contentType: false, 
					data : data,
					type: "POST",
					dataType : 'json',  
					
					success:function(data, textStatus, jqXHR,form) 
					{
						if(data.status == 'success'){
							$('#dvloader').hide();
							$('#upload_img').val(data.file_name);
							$('#toast-container').show();
										setTimeout(function(){ 
							$('#toast-container').hide();
							}, 1000);
							//alert("Logo Has Been Added Successfully!");
								
						} else {
							$('#toast-container1').delay(5000).fadeOut(400);
							//alert("Logo Has Not Been Added Successfully!");
								
						}
						
					},
					
				});
		
			});
		$('#group_invoice1').click(function(e){
		
		e.preventDefault();
		var	from = $('#from_date').val();
		var to = $('#to_date').val();
		var patient_id = '<?php echo $this->uri->segment('5') ?>';
		if(from == "" || to == "") {
			alert('Please select start date or end date.', 'Date Filter error');
		}else {
			window.location = '<?php echo base_url(); ?>client/patient/groupinvoice2/date/' + patient_id +'/'+ encodeURIComponent(from.replace(/\//g, '-')) + '/' + encodeURIComponent(to.replace(/\//g, '-'));
			}
		});  
		$('#group_invoice').click(function(e){  
		e.preventDefault();
		var	from = $('#from').val();
		from1 = from.replace("/","-");
		from11 = from1.replace("/","-");
		var to = $('#to').val();
		to1 = to.replace("/","-");
		to11 = to1.replace("/","-");
		var patient_id = '<?php echo $this->uri->segment('5') ?>';
		var Group_id = $('#treatmentGroup_id').val();
		Group_id = Group_id.replace("/","_");
		if(from == "" || to == "") {
			alert('Please select start date or end date.', 'Date Filter error');
		}else {
			window.location = '<?php echo base_url(); ?>client/patient/groupinvoice/date/' + patient_id +'/'+ Group_id + '/' + encodeURIComponent(from11.replace(/\//g, '-')) + '/' + encodeURIComponent(to11.replace(/\//g, '-'));
			} 
		});
		$('#save_prov').click(function(){
			 var url = '<?php echo base_url().'client/patient/addProvDiagList'; ?>'; 
			 var pd_list_name = $('#pd_list_name').val();
			if (pd_list_name != ""){
				var provDiag = "provDiag="+pd_list_name;
				$.ajax({
					type: "POST",
					dataType: 'json',
					data : provDiag,
					url: url,
					success: function(data) {
						$('.saveAppoinmentLoader > span').hide();
						if(data.status == 'alreayExist'){
							var strFlashdata = '<div class="alert alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>'+data.warning+'</div>';
							$('#flashData').fadeIn();
							$('#flashData').html(strFlashdata);
						}else if(data.status == 'failure'){
							//form.showError(data.message);
						} else if(data.status == 'success') {
							var obj = data.listData.pd_list_name;
							var obj_id = data.listData.pd_list_id;
							$(".prov_diag").hide();
							  var newOption = $('<option value = ' + obj_id + ' selected>' + obj + '</option>');
							  $('.p_diagnosis').append(newOption);
							  $('.p_diagnosis').trigger("chosen:updated");
							
							
						}
					}, 
					
				 }); 
				 }
				 else{
					jAlert('Please enter the provisional diagnosis.', 'Provisional diagnosis error');
				 }	
		});
		$('.delete_encounter').on('click', function () {
			 var patient_id = $(this).attr('href').split('#')[1];
			 var sn_id = $(this).attr('href').split('#')[2];
			 swal({
			  title: "Confirmation",
			  text: "Are you sure you want to delete this patient record?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: '<?php echo base_url().'client/reports/delete' ?>',
					data : {s_id:sn_id},
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
						if(data.status == 'success') {
						  swal("Success!", "Your records has been deleted!", "success");
						}
						$('#'+patient_id+'encounter'+sn_id).remove();
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
							swal("Failure!", "Your records has not been deleted!", "success");
						
					}
				  });
			}); 
	});
		$('#treatments_item').change(function(){
				var treat = $('.treatments').val();
				var val = treat.join(",");
				$.ajax({
					url : '<?php echo base_url().'client/patient/split_item' ?>',            
					data : {s_name:val},
					type: "POST",
					dataType : 'json',  
					
					success:function(data, textStatus, jqXHR,form) 
					{
						if(data.status == 'success'){
							$('#treatment_price').val(data.message);
									
						} else {
								
						}
						
					},
					
				}); 
			}); 	
		
	$('form').on('submit', function (event) {
            event.preventDefault();  
		    var $form = $(this);
		    var formid = $(this).attr("id");
			var formURL = $(this).attr("action");
			$.ajax({
            type: 'post',
            url: $(this).attr('action'),
			data:$(this).serialize(),
			dataType: 'json',
            success:function(data, textStatus, jqXHR,form) 
			{  
			   if(formid != 'undefined'){
				    $('#toast-container').show();
					$('.'+ formid +'_notes > tbody').prepend(data.responseHTML);
					setTimeout(function(){
						$('#toast-container').hide();
					}, 1000);
					$('.'+ formid +'_notes').find('a.justInserted-'+data.cn_id).colorbox({ iframe: true, innerWidth:520, innerHeight:500});
				} else {
					window.location.reload();
				}
			},  
			error: function(data, textStatus, jqXHR,form) 
			{ 
			       $('#toast-container').show();
				   setTimeout(function(){
						$('#toast-container').hide();
						 window.location.reload(1);
					}, 1000);
			}
			});
	}); 
   
}); 

 $(document).ready(function() {
$('.DeleteHipassess').on('click', function () {
			 var patient_id = $(this).attr('href').split('#')[1];
			 var h_id = $(this).attr('href').split('#')[2];
			 url ='<?php echo base_url().'client/assessment/DeleteHipassess/' ?>'+ patient_id+"/"+ h_id; 
			 swal({
			  title: "Confirmation",
			  text: "Are you sure you want to delete this patient record?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
						if(data.status == 'success') {
						  swal("Success!", "Your records has been deleted!", "success");
						}
						$('#'+patient_id+'hip'+h_id).remove();
							
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						  swal("Failure!", "Your records has not been deleted!", "success");
						 
					}
				  });
			}); 
	});
	
	
	$('.Deletekneeassess').on('click', function () {
			 var patient_id = $(this).attr('href').split('#')[1];
			 var k_id = $(this).attr('href').split('#')[2];
			 url ='<?php echo base_url().'client/assessment/Deletekneeassess/' ?>'+ patient_id+"/"+ k_id; 
			 swal({
			  title: "Confirmation",
			  text: "Are you sure you want to delete this patient record?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
						if(data.status == 'success') {
						  swal("Success!", "Your records has been deleted!", "success");
						}
						$('#'+patient_id+'knee'+k_id).remove();
							
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						  swal("Failure!", "Your records has not been deleted!", "success");
						 
					}
				  });
			}); 
	});
	
	
	
	$('.DeleteElbowassess').on('click', function () {
			 var patient_id = $(this).attr('href').split('#')[1];
			 var e_id = $(this).attr('href').split('#')[2];
			 url ='<?php echo base_url().'client/assessment/DeleteElbowassess/' ?>'+ patient_id+"/"+ e_id; 
			 swal({
			  title: "Confirmation",
			  text: "Are you sure you want to delete this patient record?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
						if(data.status == 'success') {
						  swal("Success!", "Your records has been deleted!", "success");
						}
						$('#'+patient_id+'elbow'+e_id).remove();
							
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						  swal("Failure!", "Your records has not been deleted!", "success");
						 
					}
				  });
			}); 
	});
	
	
	$('.DeleteShoulderassess').on('click', function () {
			 var patient_id = $(this).attr('href').split('#')[1];
			 var s_id = $(this).attr('href').split('#')[2];
			 url ='<?php echo base_url().'client/assessment/DeleteShoulderassess/' ?>'+ patient_id+"/"+ s_id; 
			 swal({
			  title: "Confirmation",
			  text: "Are you sure you want to delete this patient record?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
						if(data.status == 'success') {
						  swal("Success!", "Your records has been deleted!", "success");
						}
						$('#'+patient_id+'shoulder'+s_id).remove();
							
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						  swal("Failure!", "Your records has not been deleted!", "success");
						 
					}
				  });
			}); 
	});
	
	$('.DeleteFootassess').on('click', function () {
			 var patient_id = $(this).attr('href').split('#')[1];
			 var f_id = $(this).attr('href').split('#')[2];
			 url ='<?php echo base_url().'client/assessment/DeleteFootassess/' ?>'+ patient_id+"/"+ f_id; 
			 swal({
			  title: "Confirmation",
			  text: "Are you sure you want to delete this patient record?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
						if(data.status == 'success') {
						  swal("Success!", "Your records has been deleted!", "success");
						}
						$('#'+patient_id+'foot'+f_id).remove();
							
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						  swal("Failure!", "Your records has not been deleted!", "success");
						 
					}
				  });
			}); 
	});
	
	
	 $('.consent_delete').on('click', function () {
			 var consent_id = $(this).attr('href').split('#')[1];
			 url ='<?php echo base_url().'client/patient/consent_delete/' ?>'+ consent_id; 
			swal({
			  title: "Confirmation",
			  text: "Are you sure you want to delete this patient record?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
						if(data.status == 'success') {
						  swal("Success!", "Your records has been deleted!", "success");
						}
						$('#'+consent_id).remove();
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
							swal("Failure!", "Your records has not been deleted!", "success");
						
					}
				  });
			}); 
	});	
	
	
	});
	
</script>
<script>
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
	<script>
	('#cancel_e').click(function(){
       $('#add_participants_model').modal("hide");
     });
       $('#add_participants').click(function(){
       $('#add_participants_model').modal("show");
     });
	$('#OpenImgUpload').click(function(){ $('#photo_upload').trigger('click'); });
	$(document).on('change', '#photo_upload', function(e){
				var data = new FormData();
				data.append('file', $('#photo_upload').prop('files')[0]);
				var patient_id = '<?php echo $this->uri->segment(5)?>';
				$('#photoloader').show();
				$.ajax({
					url : '<?php echo base_url().'client/patient/photo_upload/'?>'+ patient_id,            
					processData: false, 
					contentType: false, 
					data : data,
					type: "POST",
					dataType : 'json',  
					
					success:function(data, textStatus, jqXHR,form) 
					{
						if(data.status == 'success'){
							$('#photoloader').hide();
							$('#photo_img').val(data.file_name);
							$('#toast-container').show();
							setTimeout(function(){ 
								window.location.reload();
							}, 1000);
							} 
							else {
							$('#toast-container1').delay(5000).fadeOut(400);
							setTimeout(function(){ 
								window.location.reload();  
							}, 1000);	
						}
						
					},
					
				});
	});
	</script>
</body>
</html>