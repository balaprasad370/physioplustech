<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
     
    <title>Physio Plus Tech</title>

     
    <link href="<?php echo base_url() ?>assets/reg/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/reg/css/bootstrap-reset.css" rel="stylesheet">
     
    <link href="<?php echo base_url() ?>assets/reg/css/font-awesome.css" rel="stylesheet" />
     
    <link href="<?php echo base_url() ?>assets/reg/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/reg/css/style-responsive.css" rel="stylesheet" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.gritter.css" />
<style>
.parsley-error-list{
	color:red;
	font-weight:600;
}
</style>
   
</head>

  <body class="login-body">
<!--<?php include_once("analyticstracking.php")?>-->
    <div class="container">
      <form class="form-signin" action="<?php echo base_url().'registration' ?>" method="post" role="form" parsley-validate>
	  <?php
	//if($this->session->flashdata('message')): echo '<div class="success">'.$this->session->flashdata('message').' <a style="background:#FE2E2E; padding:3px 12px 3px 12px; font-size:14px; border:1px solid #B40404; border-radius:6px 6px 6px 6px;" href="'.base_url().'client/dashboard/login"><strong>Login</strong></a>'.'</div>'; endif;-->
	if($this->session->flashdata('message')): echo '<div class="success">'.$this->session->flashdata('message').'</div>'; endif;
	?>
	  <h5>if you already have a account click here to</span> &nbsp;|&nbsp; <a href="<?php echo base_url(); ?>client/dashboard/home">Sign In?</a></h5>
        <h2 class="form-signin-heading">sign up for a physio plus account</h2>
        <div class="login-wrap">
            <input type="text" name="fullname" STYLE="color: #000000; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: #FFFFFF;" class="form-control" placeholder="Full Name *" autofocus parsley-required="true">
			 <font color="red"><?php echo form_error('first_name'); ?></font>
           <input type="text" name="clinic_name" STYLE="color: #000000; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: #FFFFFF;"class="form-control" placeholder="Clinic name *" parsley-required="true">
			<font color="red"><?php echo form_error('clinic_name'); ?></font>
			 <input type="email" name="email" id="email" STYLE="color: #000000; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: #FFFFFF;" class="form-control" placeholder="Email *" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-type="email" parsley-validation-minlength="1" autocomplete="off">
			<span class="email" style="color:red;font-weight:bold">Email already Exist</span>
			<font color="red"><?php echo form_error('email'); ?></font>
			<input type="password" name="password" id="password" STYLE="color: #000000; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: #FFFFFF;" class="form-control" placeholder="Password *" parsley-trigger="change" parsley-required="true" parsley-minlength="6" parsley-type="alphanum" parsley-validation-minlength="1" autocomplete="new-password">
			<font color="red"><?php echo form_error('password'); ?></font>
			<span class="c_pwd" style="color:red;font-weight:bold">Enter Numbers and Alphabets only (Must contain 8 characters)</span>
			<input type="password" id="confirm_password" name="confirm_password"  STYLE="color: #000000; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: #FFFFFF;" class="form-control confirm_password" placeholder="Confirm password *" parsley-trigger="change" parsley-required="true" parsley-minlength="6" parsley-type="alphanum" parsley-validation-minlength="1" parsley-equalto="#password">
			<font color="red"><?php echo form_error('confirm_password'); ?></font>
			<span class="pwd" style="color:red;font-weight:bold">Password Does Not Match</span>
			<input type="text" name="mobile" id="mobile" STYLE="color: #000000; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: #FFFFFF;" class="form-control" placeholder="Mobile *" parsley-trigger="change" parsley-required="true" parsley-type="phone" parsley-validation-minlength="0">
			<font color="red"><?php echo form_error('mobile'); ?></font>
			<input type="text" name="phone" STYLE="color: #000000; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: #FFFFFF;" class="form-control" placeholder="Phone">
			<font color="red"><?php echo form_error('phone'); ?></font>
			<input type="text" name="city" STYLE="color: #000000; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: #FFFFFF;" class="form-control" placeholder="City *" parsley-required="true">
			<font color="red"><?php echo form_error('city'); ?></font>
			<input type="text" name="coupon_code" STYLE="color: #000000; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: #FFFFFF;" class="form-control" placeholder="Coupon code">
			
	<select name="country" style="height:50px; width:280px;" parsley-trigger="change" parsley-required="true">
		<option selected="true" disabled="disabled">Please select country *</option>
		<option value="1|INR" <?php echo set_select('country', 1); ?>>India</option>
		<option value="164|PKR"<?php echo set_select('country', 164); ?>>Pakistan</option>
		<option value="2|AFN" <?php echo set_select('country', 2); ?>>Afghanistan</option>
		<option value="3|ALL" <?php echo set_select('country', 3); ?>>Albania</option>
		<option value="4|DZD" <?php echo set_select('country', 4); ?>>Algeria</option>
		<option value="5|USD" <?php echo set_select('country', 5); ?>>American Samoa</option>
		<option value="6|EUR" <?php echo set_select('country', 6); ?>>Andorra</option>
		<option value="7|AOA"<?php echo set_select('country', 7); ?>>Angola</option>
		<option value="8|XCD"<?php echo set_select('country', 8); ?>>Anguilla</option>
		<option value="9|XCD"<?php echo set_select('country', 9); ?>>Antigua &amp; Barbuda</option>
		<option value="10|ARS"<?php echo set_select('country', 10); ?>>Argentina</option>
		<option value="11|AMD"<?php echo set_select('country', 11); ?>>Armenia</option>
		<option value="12|AWG"<?php echo set_select('country', 12); ?>>Aruba</option>
		<option value="13|AUD"<?php echo set_select('country', 13); ?>>Australia</option>
		<option value="14|EUR"<?php echo set_select('country', 14); ?>>Austria</option>
		<option value="15|AZN"<?php echo set_select('country', 15); ?>>Azerbaijan</option>
		<option value="16|BSD"<?php echo set_select('country', 16); ?>>Bahamas</option>
		<option value="17|BHD"<?php echo set_select('country', 17); ?>>Bahrain</option>
		<option value="18|BDT"<?php echo set_select('country', 18); ?>>Bangladesh</option>
		<option value="19|BBD"<?php echo set_select('country', 19); ?>>Barbados</option>
		<option value="20|BYR"<?php echo set_select('country', 20); ?>>Belarus</option>
		<option value="21|EUR"<?php echo set_select('country', 21); ?>>Belgium</option>
		<option value="22|BZD"<?php echo set_select('country', 22); ?>>Belize</option>
		<option value="23|XOF"<?php echo set_select('country', 23); ?>>Benin</option>
		<option value="24|BMD"<?php echo set_select('country', 24); ?>>Bermuda</option>
		<option value="25|BTN"<?php echo set_select('country', 25); ?>>Bhutan</option>
		<option value="26|BOB"<?php echo set_select('country', 26); ?>>Bolivia</option>
		<option value="27|USD"<?php echo set_select('country', 27); ?>>Bonaire</option>
		<option value="28|BAM"<?php echo set_select('country', 28); ?>>Bosnia &amp; Herzegovina</option>
		<option value="29|BWP"<?php echo set_select('country', 29); ?>>Botswana</option>
		<option value="30|BRL"<?php echo set_select('country', 30); ?>>Brazil</option>
		<option value="31|USD"<?php echo set_select('country', 31); ?>>British Indian Ocean Ter</option>
		<option value="32|BND"<?php echo set_select('country', 32); ?>>Brunei</option>
		<option value="33|BGN"<?php echo set_select('country', 33); ?>>Bulgaria</option>
		<option value="34|XOF"<?php echo set_select('country', 34); ?>>Burkina Faso</option>
		<option value="35|BIF"<?php echo set_select('country', 35); ?>>Burundi</option>
		<option value="36|KHR"<?php echo set_select('country', 36); ?>>Cambodia</option>
		<option value="37|XAF"<?php echo set_select('country', 37); ?>>Cameroon</option>
		<option value="38|CAD"<?php echo set_select('country', 38); ?>>Canada</option>
		<option value="39|EUR"<?php echo set_select('country', 39); ?>>Canary Islands</option>
		<option value="40|CVE"<?php echo set_select('country', 40); ?>>Cape Verde</option>
		<option value="41|KYD"<?php echo set_select('country', 41); ?>>Cayman Islands</option>
		<option value="42|XAF"<?php echo set_select('country', 42); ?>>Central African Republic</option>
		<option value="43|XAF"<?php echo set_select('country', 43); ?>>Chad</option>
		<option value="44|GIP"<?php echo set_select('country', 44); ?>>Channel Islands</option>
		<option value="45|CLP"<?php echo set_select('country', 45); ?>>Chile</option>
		<option value="46|CNY"<?php echo set_select('country', 46); ?>>China</option>
		<option value="47|AUD"<?php echo set_select('country', 47); ?>>Christmas Island</option>
		<option value="48|AUD"<?php echo set_select('country', 48); ?>>Cocos Island</option>
		<option value="49|COP"<?php echo set_select('country', 49); ?>>Colombia</option>
		<option value="50|KMF"<?php echo set_select('country', 50); ?>>Comoros</option>
		<option value="51|XAF"<?php echo set_select('country', 51); ?>>Congo</option>
		<option value="52|NZD"<?php echo set_select('country', 52); ?>>Cook Islands</option>
		<option value="53|CRC"<?php echo set_select('country', 53); ?>>Costa Rica</option>
		<option value="54|CFA"<?php echo set_select('country', 54); ?>>Cote D'Ivoire</option>
		<option value="55|HRK"<?php echo set_select('country', 55); ?>>Croatia</option>
		<option value="56|CUP"<?php echo set_select('country', 56); ?>>Cuba</option>
		<option value="57|ANG"<?php echo set_select('country', 57); ?>>Curacao</option>
		<option value="58|EUR"<?php echo set_select('country', 58); ?>>Cyprus</option>
		<option value="59|CZK"<?php echo set_select('country', 59); ?>>Czech Republic</option>
		<option value="60|DKK"<?php echo set_select('country', 60); ?>>Denmark</option>
		<option value="61|DJF"<?php echo set_select('country', 61); ?>>Djibouti</option>
		<option value="62|XCD"<?php echo set_select('country', 62); ?>>Dominica</option>
		<option value="63|DOP"<?php echo set_select('country', 63); ?>>Dominican Republic</option>
		<option value="64|USD"<?php echo set_select('country', 64); ?>>East Timor</option>
		<option value="65|ECS"<?php echo set_select('country', 65); ?>>Ecuador</option>
		<option value="66|EGP"<?php echo set_select('country', 66); ?>>Egypt</option>
		<option value="67|SVC"<?php echo set_select('country', 67); ?>>El Salvador</option>
		<option value="68|XAF"<?php echo set_select('country', 68); ?>>Equatorial Guinea</option>
		<option value="69|ERN"<?php echo set_select('country', 69); ?>>Eritrea</option>
		<option value="70|EUR"<?php echo set_select('country', 70); ?>>Estonia</option>
		<option value="71|ETB"<?php echo set_select('country', 71); ?>>Ethiopia</option>
		<option value="72|FKP"<?php echo set_select('country', 72); ?>>Falkland Islands</option>
		<option value="73|DKK"<?php echo set_select('country', 73); ?>>Faroe Islands</option>
		<option value="74|FJD"<?php echo set_select('country', 74); ?>>Fiji</option>
		<option value="75|EUR"<?php echo set_select('country', 75); ?>>Finland</option>
		<option value="76|EUR"<?php echo set_select('country', 76); ?>>France</option>
		<option value="77|EUR"<?php echo set_select('country', 77); ?>>French Guiana</option>
		<option value="78|CFP franc"<?php echo set_select('country', 78);?>>French Polynesia</option>
		<option value="79|EUR"<?php echo set_select('country', 79); ?>>French Southern Ter</option>
		<option value="80|XAF"<?php echo set_select('country', 80); ?>>Gabon</option>
		<option value="81|GMD"<?php echo set_select('country', 81); ?>>Gambia</option>
		<option value="82|GEL"<?php echo set_select('country', 82); ?>>Georgia</option>
		<option value="83|EUR"<?php echo set_select('country', 83); ?>>Germany</option>
		<option value="84|GHS"<?php echo set_select('country', 84); ?>>Ghana</option>
		<option value="85|GIP"<?php echo set_select('country', 85); ?>>Gibraltar</option>
		<option value="86|GBP"<?php echo set_select('country', 86); ?>>Great Britain</option>
		<option value="87|EUR"<?php echo set_select('country', 87); ?>>Greece</option>
		<option value="88|DKK"<?php echo set_select('country', 88); ?>>Greenland</option>
		<option value="89|XCD"<?php echo set_select('country', 89); ?>>Grenada</option>
		<option value="90|EUR"<?php echo set_select('country', 90); ?>>Guadeloupe</option>
		<option value="91|USD"<?php echo set_select('country', 91); ?>>Guam</option>
		<option value="92|QTQ"<?php echo set_select('country', 92); ?>>Guatemala</option>
		<option value="93|GNF"<?php echo set_select('country', 93); ?>>Guinea</option>
		<option value="94|GYD"<?php echo set_select('country', 94); ?>>Guyana</option>
		<option value="95|HTG"<?php echo set_select('country', 95); ?>>Haiti</option>
		<option value="96|USD"<?php echo set_select('country', 96); ?>>Hawaii</option>
		<option value="97|HNL"<?php echo set_select('country', 97); ?>>Honduras</option>
		<option value="98|HKD"<?php echo set_select('country', 98); ?>>Hong Kong</option>
		<option value="99|HUF"<?php echo set_select('country', 99); ?>>Hungary</option>
		<option value="100|ISK"<?php echo set_select('country',100); ?>>Iceland</option>
		<option value="101|IDR"<?php echo set_select('country', 101); ?>>Indonesia</option>
		<option value="102|IRR"<?php echo set_select('country', 102); ?>>Iran</option>
		<option value="103|IQD"<?php echo set_select('country', 103); ?>>Iraq</option>
		<option value="104|EUR"<?php echo set_select('country', 104); ?>>Ireland</option>
		<option value="105|GBP"<?php echo set_select('country', 105); ?>>Isle of Man</option>
		<option value="106|ILS"<?php echo set_select('country', 106); ?>>Israel</option>
		<option value="107|EUR"<?php echo set_select('country', 107); ?>>Italy</option>
		<option value="108|JMD"<?php echo set_select('country', 108); ?>>Jamaica</option>
		<option value="109|JPY"<?php echo set_select('country', 109); ?>>Japan</option>
		<option value="110|JOD"<?php echo set_select('country', 110); ?>>Jordan</option>
		<option value="111|KZT"<?php echo set_select('country', 111); ?>>Kazakhstan</option>
		<option value="112|KES"<?php echo set_select('country', 112); ?>>Kenya</option>
		<option value="113|AUD"<?php echo set_select('country', 113); ?>>Kiribati</option>
		<option value="114|KPW"<?php echo set_select('country', 114); ?>>Korea North</option>
		<option value="115|KRW"<?php echo set_select('country', 115); ?>>Korea South</option>
		<option value="116|KWD"<?php echo set_select('country', 116); ?>>Kuwait</option>
		<option value="117|KGS"<?php echo set_select('country', 117); ?>>Kyrgyzstan</option>
		<option value="118|LAK"<?php echo set_select('country', 118); ?>>Laos</option>
		<option value="119|LVL"<?php echo set_select('country', 119); ?>>Latvia</option>
		<option value="120|LBP"<?php echo set_select('country', 120); ?>>Lebanon</option>
		<option value="121|LSL"<?php echo set_select('country', 121); ?>>Lesotho</option>
		<option value="122|LRD"<?php echo set_select('country', 122); ?>>Liberia</option>
		<option value="123|LYD"<?php echo set_select('country', 123); ?>>Libya</option>
		<option value="124|CHF"<?php echo set_select('country', 124); ?>>Liechtenstein</option>
		<option value="125|LTL"<?php echo set_select('country', 125); ?>>Lithuania</option>
		<option value="126|EUR"<?php echo set_select('country', 126); ?>>Luxembourg</option>
		<option value="127|MOP"<?php echo set_select('country', 127); ?>>Macau</option>
		<option value="128|MKD"<?php echo set_select('country', 128); ?>>Macedonia</option>
		<option value="129|MGF"<?php echo set_select('country', 129); ?>>Madagascar</option>
		<option value="130|MYR"<?php echo set_select('country', 130); ?>>Malaysia</option>
		<option value="131|MWK"<?php echo set_select('country', 131); ?>>Malawi</option>
		<option value="132|MVR"<?php echo set_select('country', 132); ?>>Maldives</option>
		<option value="133|XOF"<?php echo set_select('country', 133); ?>>Mali</option>
		<option value="134|EUR"<?php echo set_select('country', 134); ?>>Malta</option>
		<option value="135|USD"<?php echo set_select('country', 135); ?>>Marshall Islands</option>
		<option value="136|EUR"<?php echo set_select('country', 136); ?>>Martinique</option>
		<option value="137|MRO"<?php echo set_select('country', 137); ?>>Mauritania</option>
		<option value="138|MUR"<?php echo set_select('country', 138); ?>>Mauritius</option>
		<option value="139|EUR"<?php echo set_select('country', 139); ?>>Mayotte</option>
		<option value="140|MXN"<?php echo set_select('country', 140); ?>>Mexico</option>
		<option value="141|EUR"<?php echo set_select('country', 141); ?>>Midway Islands</option>
		<option value="142|MDL"<?php echo set_select('country', 142); ?>>Moldova</option>
		<option value="143|EUR"<?php echo set_select('country', 143); ?>>Monaco</option>
		<option value="144|MNT"<?php echo set_select('country', 144); ?>>Mongolia</option>
		<option value="145|XCD"<?php echo set_select('country', 145); ?>>Montserrat</option>
		<option value="146|MAD"<?php echo set_select('country', 146); ?>>Morocco</option>
		<option value="147|MZN"<?php echo set_select('country', 147); ?>>Mozambique</option>
		<option value="148|MMK"<?php echo set_select('country', 148); ?>>Myanmar</option>
		<option value="149|NAD"<?php echo set_select('country', 149); ?>>Nambia</option>
		<option value="150|AUD"<?php echo set_select('country', 150); ?>>Nauru</option>
		<option value="151|NPR"<?php echo set_select('country', 151); ?>>Nepal</option>
		<option value="152|ANG"<?php echo set_select('country', 152); ?>>Netherland Antilles</option>
		<option value="153|EUR"<?php echo set_select('country', 153); ?>>Netherlands (Holland, Europe)</option>
		<option value="154|XCD"<?php echo set_select('country', 154); ?>>Nevis</option>
		<option value="155|XPF"<?php echo set_select('country', 155); ?>>New Caledonia</option>
		<option value="156|NZD"<?php echo set_select('country', 156); ?>>New Zealand</option>
		<option value="157|NIO"<?php echo set_select('country', 157); ?>>Nicaragua</option>
		<option value="158|XOF"<?php echo set_select('country', 158); ?>>Niger</option>
		<option value="159|NGN"<?php echo set_select('country', 159); ?>>Nigeria</option>
		<option value="160|NZD"<?php echo set_select('country', 160); ?>>Niue</option>
		<option value="161|AUD"<?php echo set_select('country', 161); ?>>Norfolk Island</option>
		<option value="162|NOK"<?php echo set_select('country', 162); ?>>Norway</option>
		<option value="163|OMR"<?php echo set_select('country', 163); ?>>Oman</option>
		<option value="165|USD"<?php echo set_select('country', 165); ?>>Palau Island</option>
		<option value="166|Egyptian pound"<?php echo set_select('country', 166); ?>>Palestine</option>
		<option value="167|PAB"<?php echo set_select('country', 167); ?>>Panama</option>
		<option value="168|PGK"<?php echo set_select('country', 168); ?>>Papua New Guinea</option>
		<option value="169|PYG"<?php echo set_select('country', 169); ?>>Paraguay</option>
		<option value="170|PEN"<?php echo set_select('country', 170); ?>>Peru</option>
		<option value="171|PHP"<?php echo set_select('country', 171); ?>>Philippines</option>
		<option value="172|NZD"<?php echo set_select('country', 172); ?>>Pitcairn Island</option>
		<option value="173|PLN"<?php echo set_select('country', 173); ?>>Poland</option>
		<option value="174|EUR"<?php echo set_select('country', 174); ?>>Portugal</option>
		<option value="175|USD"<?php echo set_select('country', 175); ?>>Puerto Rico</option>
		<option value="176|QAR"<?php echo set_select('country', 176); ?>>Qatar</option>
		<option value="177|EUR"<?php echo set_select('country', 177); ?>>Republic of Montenegro</option>
		<option value="178|RSD"<?php echo set_select('country', 178); ?>>Republic of Serbia</option>
		<option value="179|EUR"<?php echo set_select('country', 179); ?>>Reunion</option>
		<option value="180|RON"<?php echo set_select('country', 180); ?>>Romania</option>
		<option value="181|RUB"<?php echo set_select('country', 181); ?>>Russia</option>
		<option value="182|RWF"<?php echo set_select('country', 182); ?>>Rwanda</option>
		<option value="183|EUR"<?php echo set_select('country', 183); ?>>St Barthelemy</option>
		<option value="184|EUX"<?php echo set_select('country', 184); ?>>St Eustatius</option>
		<option value="185|SHP"<?php echo set_select('country', 185); ?>>St Helena</option>
		<option value="186|XCD"<?php echo set_select('country', 186); ?>>St Kitts-Nevis</option>
		<option value="187|XCD"<?php echo set_select('country', 187); ?>>St Lucia</option>
		<option value="188|ANG"<?php echo set_select('country', 188); ?>>St Maarten</option>
		<option value="189|EUR"<?php echo set_select('country', 189); ?>>St Pierre &amp; Miquelon</option>
		<option value="190|XCD"<?php echo set_select('country', 190); ?>>St Vincent &amp; Grenadines</option>
		<option value="191|USD"<?php echo set_select('country', 191); ?>>Saipan</option>
		<option value="192|WST"<?php echo set_select('country', 192); ?>>Samoa</option>
		<option value="193|USD"<?php echo set_select('country', 193); ?>>Samoa American</option>
		<option value="194|EUR"<?php echo set_select('country', 194); ?>>San Marino</option>
		<option value="195|STD"<?php echo set_select('country', 195); ?>>Sao Tome &amp; Principe</option>
		<option value="196|SAR"<?php echo set_select('country', 196); ?>>Saudi Arabia</option>
		<option value="197|XOF"<?php echo set_select('country', 197); ?>>Senegal</option>
		<option value="198|SCR"<?php echo set_select('country', 198); ?>>Seychelles</option>
		<option value="199|SLL"<?php echo set_select('country', 199); ?>>Sierra Leone</option>
		<option value="200|SGD"<?php echo set_select('country', 200); ?>>Singapore</option>
		<option value="201|EUR"<?php echo set_select('country', 201); ?>>Slovakia</option>
		<option value="202|EUR"<?php echo set_select('country', 202); ?>>Slovenia</option>
		<option value="203|SBD"<?php echo set_select('country', 203); ?>>Solomon Islands</option>
		<option value="204|SOS"<?php echo set_select('country', 204); ?>>Somalia</option>
		<option value="205|ZAR"<?php echo set_select('country', 205); ?>>South Africa</option>
		<option value="206|EUR"<?php echo set_select('country', 206); ?>>Spain</option>
		<option value="207|LKR"<?php echo set_select('country', 207); ?>>Sri Lanka</option>
		<option value="208|SDG"<?php echo set_select('country', 208); ?>>Sudan</option>
		<option value="209|SRD"<?php echo set_select('country', 209); ?>>Suriname</option>
		<option value="210|SZL"<?php echo set_select('country', 210); ?>>Swaziland</option>
		<option value="211|SEK"<?php echo set_select('country', 211); ?>>Sweden</option>
		<option value="212|CHF"<?php echo set_select('country', 212); ?>>Switzerland</option>
		<option value="213|SYP"<?php echo set_select('country', 213); ?>>Syria</option>
		<option value="214|CFP franc"<?php echo set_select('country', 214); ?>>Tahiti</option>
		<option value="215|TWD"<?php echo set_select('country', 215); ?>>Taiwan</option>
		<option value="216|TJS"<?php echo set_select('country', 216); ?>>Tajikistan</option>
		<option value="217|TZS"<?php echo set_select('country', 217); ?>>Tanzania</option>
		<option value="218|THB"<?php echo set_select('country', 218); ?>>Thailand</option>
		<option value="219|XOF"<?php echo set_select('country', 219); ?>>Togo</option>
		<option value="220|NZD"<?php echo set_select('country', 220); ?>>Tokelau</option>
		<option value="221|TOP"<?php echo set_select('country', 221); ?>>Tonga</option>
		<option value="222|TTD"<?php echo set_select('country', 222); ?>>Trinidad &amp; Tobago</option>
		<option value="223|TND"<?php echo set_select('country', 223); ?>>Tunisia</option>
		<option value="224|TRY"<?php echo set_select('country', 224); ?>>Turkey</option>
		<option value="225|TMT"<?php echo set_select('country', 225); ?>>Turkmenistan</option>
		<option value="226|USD"<?php echo set_select('country', 226); ?>>Turks &amp; Caicos Is</option>
		<option value="227|AUD"<?php echo set_select('country', 227); ?>>Tuvalu</option>
		<option value="228|UGX"<?php echo set_select('country', 228); ?>>Uganda</option>
		<option value="229|UAH"<?php echo set_select('country', 229); ?>>Ukraine</option>
		<option value="230|AED"<?php echo set_select('country', 230); ?>>United Arab Emirates</option>
		<option value="231|GBP"<?php echo set_select('country', 231); ?>>United Kingdom</option>
		<option value="232|USD"<?php echo set_select('country', 232); ?>>United States of America</option>
		<option value="233|UYU"<?php echo set_select('country', 233); ?>>Uruguay</option>
		<option value="234|UZS"<?php echo set_select('country', 234); ?>>Uzbekistan</option>
		<option value="235|VUV"<?php echo set_select('country', 235); ?>>Vanuatu</option>
		<option value="236|EUR"<?php echo set_select('country', 236); ?>>Vatican City State</option>
		<option value="237|VEF"<?php echo set_select('country', 237); ?>>Venezuela</option>
		<option value="238|VND"<?php echo set_select('country', 238); ?>>Vietnam</option>
		<option  value="239|USD"<?php echo set_select('country', 239); ?>>Virgin Islands (Brit)</option>
		<option value="240|USD"<?php echo set_select('country', 240); ?>>Virgin Islands (USA)</option>
		<option  value="241|XPF"<?php echo set_select('country', 241); ?>>Wake Island</option>
		<option  value="242|MAD"<?php echo set_select('country', 242); ?>>Wallis &amp; Futana Is</option>
		<option value="243|YER"<?php echo set_select('country', 243); ?>>Yemen</option>
		<option value="244|ZRN"<?php echo set_select('country', 244); ?>>Zaire</option>
		<option  value="245|ZMW"<?php echo set_select('country', 245); ?>>Zambia</option>
		<option  value="246|ZWD"<?php echo set_select('country', 246); ?>>Zimbabwe</option>
</select>
<font color="red"><?php echo form_error('country'); ?></font></br></br>
            
               
      
            <button class="btn btn-lg btn-login btn-block" type="submit" id="save">Submit</button>    
		
        </div>
	</form>
          
      
    </div>
     
    <script src="<?php echo base_url() ?>assets/reg/js/jquery.js"></script>
    <script src="<?php echo base_url() ?>assets/reg/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.gritter.min.js"></script>
	<script>
	$(document).ready(function() {
				$('.email').hide();
				$("#password").focus(function(e){
					e.preventDefault();
					var email = $('#email').val();
					if(email == '') { } else {
						$.ajax({
						url : '<?php echo base_url().'registration/email_check' ?>',
						type: "POST",
						data : {e_id:email},
						dataType: 'json', 
						success:function(data, textStatus, jqXHR,form) 
						{
							$('.email').show();
							setTimeout(function(){ 
							window.location.reload();
							}, 1000);
						},
						error: function(jqXHR, textStatus, errorThrown) 
						{
							$('.email').hide();
						}
					});
					}
				});
				
			});
		$(document).ready(function(){
			$('.pwd').hide();
			$('.c_pwd').hide();
			$('#confirm_password').focus(function() {
				var pass=$('#password').val();
				$('.c_pwd').hide();
				$('.pwd').hide();
			});
			$('#password').focus(function() {
				$('.c_pwd').hide();
				$('.pwd').hide();
			});
			$('#mobile').focus(function() {
				var pass=$('#password').val();
				var pass1=$('#confirm_password').val();
				var regx = /^[0-9a-zA-Z]+$/;
				var leng = pass.length;
				if (!regx.test(pass) || leng < 8 ) {
				$('.c_pwd').show();
				} else {
					if(pass != pass1){
						$('.pwd').show();
					} else {
					}
				}
			});
			$('#message').hide();
			$("#eventform").submit(function(e){
				var postData = $(this).serializeArray();
				var formURL = $(this).attr("action");
				$.ajax(
				{
					url : formURL,
					type: "POST",
					data : postData,
					success:function(data, textStatus, jqXHR,form) 
					{
						var objJSON = JSON.parse(data);
						if(objJSON.status == 'failure'){
							alert('Invalid Email');
						}else{
							if ( $( "#message" ).is( ":hidden" ) ) {
								$( "#message" ).show( "slow" );
							} else {
								$( "#message" ).slideUp();
							}
						}
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						alert('Error');
					}
				});
				e.preventDefault(); 
			}); 
		});
		
		$(document).ready(function() {
  $('form').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var button = $('#save');
		 button.prop('disabled',true);
		$.ajax({
            type: 'post',
            url: formURL,
            data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				
				$.gritter.add({title:	'Success',text:	'You are Registered successfully'});
				setTimeout(function(){ 
				$('.md-close btn btn-default').click();
				window.location.href="<?php echo base_url().'registration/registration_success/'?>"
				}, 1000);
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$.gritter.add({title:	'Success',text:	'You are not Registered successfully'});
				setTimeout(function(){ 
				$('.md-close btn btn-default').click();
				window.location.reload();
				}, 1000);
			}
      }); 
		}
		else{
			
		}
		
});  
}); 
	</script>
  </body>
</html>