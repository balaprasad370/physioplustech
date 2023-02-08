<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Edit Location - Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
    <meta name="msapplication-tap-highlight" content="no">
	
	<link href="<?php echo base_url()?>my_assets/main.css" rel="stylesheet">
<style>
.parsley-error-list{
	color:red;
	list-style-type:none;
}
label, th, .td{
	font-weight:bold;
	color:#3f6ad8;
}
.custom-control-label{
	color:#000000;
	font-weight:400;
}
</style>
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
   <?php include("sidebar.php");?>
           <div class="app-main__outer">
                <div class="app-main__inner">
                     <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Edit Location</h5>
                                    <form class=""method="post" action="<?php echo base_url().'client/location/add_location' ?>" parsley-validate role="form" id="signupForm">
                                        <input type="hidden" value="<?php echo $locationInfo['client_id']; ?>" name="client_id" id="client_id" />
										<div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="first_name" class="">Branch admin name *</label>
												<input name="first_name" id="first_name" placeholder="Enter Branch admin name" type="text" class="form-control" value="<?php echo $locationInfo['first_name']; ?>" parsley-trigger="change" parsley-required="true" parsley-minlength="4" autocomplete="off"></div>
                                            </div>
											 
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="email" class="">Branch admin email *</label>
												<input name="email" id="email" placeholder="Enter Branch admin email" type="text"  value="<?php echo $locationInfo['email']; ?>" class="form-control" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-type="email" autocomplete="off"></div>
                                            <div class="alert alert-danger fade show email" style="padding:.5em;">Email already Exist
											</div>                                           
										   </div> 
										</div>
										<div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="password" class="">Password * </label>
												<input name="password" id="password" placeholder="Enter Password" type="password"  value="<?php echo $locationInfo['password']; ?>" class="form-control" parsley-trigger="change" parsley-required="true" parsley-minlength="6" autocomplete="off"></div>
                                            </div>
											<div class="col-md-6">
                                                <div class="position-relative form-group"><label for="confirm_password" class="">Password Confirm *</label>
												<input name="confirm_password" id="confirm_password" placeholder="Enter Password Confirm" type="password" class="form-control" value="<?php echo $locationInfo['password']; ?>" parsley-trigger="change" parsley-required="true" parsley-minlength="6" parsley-type="alphanum"  parsley-equalto="#password"autocomplete="off"></div>
                                            </div>
                                           
                                        </div>
										<div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="branch_name" class="">Branch name *</label>
												<input name="branch_name" id="branch_name" placeholder="Enter Branch name" type="text"  class="form-control" value="<?php echo $locationInfo['branch_name']; ?>" parsley-trigger="change" parsley-minlength="4" parsley-required="true" autocomplete="off"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="clinic_name" class="">Clinic name *</label>
												<input name="clinic_name" id="clinic_name" placeholder="" type="text"  class="form-control" value="<?php echo $this->session->userdata('clinic_name') ?>" readonly autocomplete="off"></div>
                                            </div>
                                        </div>
										
										<div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="mobile" class="">Branch mobile no *</label>
												<input name="mobile" id="mobile" placeholder="Enter Branch mobile no" type="text"  class="form-control" value="<?php echo $locationInfo['mobile']; ?>" parsley-type="number"  parsley-required="true" parsley-trigger="change" pattern="[1-9]{1}[0-9]{9}" maxlength="10" autocomplete="off"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="phone" class="">Branch phone no *</label>
												<input name="phone" id="phone" placeholder="Enter Branch phone no" type="text"  class="form-control" value="<?php echo $locationInfo['phone']; ?>" parsley-type="number" parsley-required="true" parsley-trigger="change"  pattern="[1-9]{1}[0-9]{9}" maxlength="10" autocomplete="off"></div>
                                            </div>
                                        </div>
										
										
										<div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="city" class="">City *</label>
												<input name="city" id="city" placeholder="Enter City" type="text"  class="form-control" parsley-required="true" value="<?php echo $locationInfo['city']; ?>" autocomplete="off"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="state" class="">State *</label>
												<input name="state" id="state" placeholder="Enter State" type="text"  class="form-control" parsley-required="true" value="<?php echo $locationInfo['state']; ?>" autocomplete="off"></div>
                                            </div>
                                        </div>
										
										<div class="form-row">
                                             <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="zipcode" class="">Zip or Pincode *</label>
												<input name="zipcode" id="zipcode" placeholder="Enter Zip or Pincode" type="text"  class="form-control" value="<?php echo $locationInfo['zipcode']; ?>" parsley-required="true" parsley-trigger="change" parsley-type="number" parsley-minlength="4" autocomplete="off"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="country" class="">Country *</label>
												<select class="multiselect-dropdown form-control" parsley-trigger="change" parsley-required="true"  name="country" id="country">
													<optgroup label="Please select country">
											    <option value="1|INR" <?php if ($locationInfo['country'] == '1|INR') echo 'selected="selected"' ?>>India</option>
												<option value="2|AFN" <?php if ($locationInfo['country'] == '2|AFN') echo 'selected="selected"' ?>>Afghanistan</option>
												<option value="3|ALL" <?php if ($locationInfo['country'] == '3|ALL') echo 'selected="selected"' ?>>Albania</option>
												<option value="4|DZD" <?php if ($locationInfo['country'] == '4|DZD') echo 'selected="selected"' ?>>Algeria</option>
												<option value="5|USD" <?php if ($locationInfo['country'] == '5|USD') echo 'selected="selected"' ?>>American Samoa</option>
												<option value="6|EUR" <?php if ($locationInfo['country'] == '6|EUR') echo 'selected="selected"' ?>>Andorra</option>
												<option value="7|AOA" <?php if ($locationInfo['country'] == '7|AOA') echo 'selected="selected"' ?>>Angola</option>
												<option value="8|XCD" <?php if ($locationInfo['country'] == '8|XCD') echo 'selected="selected"' ?>>Anguilla</option>
												<option value="9|XCD" <?php if ($locationInfo['country'] == '9|XCD') echo 'selected="selected"' ?>>Antigua &amp; Barbuda</option>
												<option value="10|ARS" <?php if ($locationInfo['country'] == '10|ARS') echo 'selected="selected"' ?>>Argentina</option>
												<option value="11|AMD" <?php if ($locationInfo['country'] == '11|AMD') echo 'selected="selected"' ?>>Armenia</option>
												<option value="12|AWG" <?php if ($locationInfo['country'] == '12|AWG') echo 'selected="selected"' ?>>Aruba</option>
												<option value="13|AUD" <?php if ($locationInfo['country'] == '13|AUD') echo 'selected="selected"' ?>>Australia</option>
												<option value="14|EUR" <?php if ($locationInfo['country'] == '14|EUR') echo 'selected="selected"' ?>>Austria</option>
												<option value="15|AZN" <?php if ($locationInfo['country'] == '15|AZN') echo 'selected="selected"' ?>>Azerbaijan</option>
												<option value="16|BSD" <?php if ($locationInfo['country'] == '16|BSD') echo 'selected="selected"' ?>>Bahamas</option>
												<option value="17|BHD" <?php if ($locationInfo['country'] == '17|BHD') echo 'selected="selected"' ?>>Bahrain</option>
												<option value="18|BDT" <?php if ($locationInfo['country'] == '18|BDT') echo 'selected="selected"' ?>>Bangladesh</option>
												<option value="19|BBD" <?php if ($locationInfo['country'] == '19|BBD') echo 'selected="selected"' ?>>Barbados</option>
												<option value="20|BYR" <?php if ($locationInfo['country'] == '20|BYR') echo 'selected="selected"' ?>>Belarus</option>
												<option value="21|EUR" <?php if ($locationInfo['country'] == '21|EUR') echo 'selected="selected"' ?>>Belgium</option>
												<option value="22|BZD" <?php if ($locationInfo['country'] == '22|BZD') echo 'selected="selected"' ?>>Belize</option>
												<option value="23|XOF" <?php if ($locationInfo['country'] == '23|XOF') echo 'selected="selected"' ?>>Benin</option>
												<option value="24|BMD" <?php if ($locationInfo['country'] == '24|BMD') echo 'selected="selected"' ?>>Bermuda</option>
												<option value="25|BTN" <?php if ($locationInfo['country'] == '25|BTN') echo 'selected="selected"' ?>>Bhutan</option>
												<option value="26|BOB" <?php if ($locationInfo['country'] == '26|BOB') echo 'selected="selected"' ?>>Bolivia</option>
												<option value="27|USD" <?php if ($locationInfo['country'] == '27|USD') echo 'selected="selected"' ?>>Bonaire</option>
												<option value="28|BAM" <?php if ($locationInfo['country'] == '28|BAM') echo 'selected="selected"' ?>>Bosnia &amp; Herzegovina</option>
												<option value="29|BWP" <?php if ($locationInfo['country'] == '29|BWP') echo 'selected="selected"' ?>>Botswana</option>
												<option value="30|BRL" <?php if ($locationInfo['country'] == '30|BRL') echo 'selected="selected"' ?>>Brazil</option>
												<option value="31|USD" <?php if ($locationInfo['country'] == '31|USD') echo 'selected="selected"' ?>>British Indian Ocean Ter</option>
												<option value="32|BND" <?php if ($locationInfo['country'] == '32|BND') echo 'selected="selected"' ?>>Brunei</option>
												<option value="33|BGN" <?php if ($locationInfo['country'] == '33|BGN') echo 'selected="selected"' ?>>Bulgaria</option>
												<option value="34|XOF" <?php if ($locationInfo['country'] == '34|XOF') echo 'selected="selected"' ?>>Burkina Faso</option>
												<option value="35|BIF" <?php if ($locationInfo['country'] == '35|BIF') echo 'selected="selected"' ?>>Burundi</option>
												<option value="36|KHR" <?php if ($locationInfo['country'] == '36|KHR') echo 'selected="selected"' ?>>Cambodia</option>
												<option value="37|XAF" <?php if ($locationInfo['country'] == '37|XAF') echo 'selected="selected"' ?>>Cameroon</option>
												<option value="38|CAD" <?php if ($locationInfo['country'] == '38|CAD') echo 'selected="selected"' ?>>Canada</option>
												<option value="39|EUR" <?php if ($locationInfo['country'] == '39|EUR') echo 'selected="selected"' ?>>Canary Islands</option>
												<option value="40|CVE" <?php if ($locationInfo['country'] == '40|CVE') echo 'selected="selected"' ?>>Cape Verde</option>
												<option value="41|KYD" <?php if ($locationInfo['country'] == '41|KYD') echo 'selected="selected"' ?>>Cayman Islands</option>
												<option value="42|XAF" <?php if ($locationInfo['country'] == '42|XAF') echo 'selected="selected"' ?>>Central African Republic</option>
												<option value="43|XAF" <?php if ($locationInfo['country'] == '43|XAF') echo 'selected="selected"' ?>>Chad</option>
												<option value="44|GIP" <?php if ($locationInfo['country'] == '44|GIP') echo 'selected="selected"' ?>>Channel Islands</option>
												<option value="45|CLP" <?php if ($locationInfo['country'] == '45|CLP') echo 'selected="selected"' ?>>Chile</option>
												<option value="46|CNY" <?php if ($locationInfo['country'] == '46|CNY') echo 'selected="selected"' ?>>China</option>
												<option value="47|AUD" <?php if ($locationInfo['country'] == '47|AUD') echo 'selected="selected"' ?>>Christmas Island</option>
												<option value="48|AUD" <?php if ($locationInfo['country'] == '48|AUD') echo 'selected="selected"' ?>>Cocos Island</option>
												<option value="49|COP" <?php if ($locationInfo['country'] == '49|COP') echo 'selected="selected"' ?>>Colombia</option>
												<option value="50|KMF" <?php if ($locationInfo['country'] == '50|KMF') echo 'selected="selected"' ?>>Comoros</option>
												<option value="51|XAF" <?php if ($locationInfo['country'] == '51|XAF') echo 'selected="selected"' ?>>Congo</option>
												<option value="52|NZD" <?php if ($locationInfo['country'] == '52|NZD') echo 'selected="selected"' ?>>Cook Islands</option>
												<option value="53|CRC" <?php if ($locationInfo['country'] == '53|CRC') echo 'selected="selected"' ?>>Costa Rica</option>
												<option value="54|CFA" <?php if ($locationInfo['country'] == '54|CFA') echo 'selected="selected"' ?>>Cote D'Ivoire</option>
												<option value="55|HRK" <?php if ($locationInfo['country'] == '55|HRK') echo 'selected="selected"' ?>>Croatia</option>
												<option value="56|CUP" <?php if ($locationInfo['country'] == '56|CUP') echo 'selected="selected"' ?>>Cuba</option>
												<option value="57|ANG" <?php if ($locationInfo['country'] == '57|ANG') echo 'selected="selected"' ?>>Curacao</option>
												<option value="58|EUR" <?php if ($locationInfo['country'] == '58|EUR') echo 'selected="selected"' ?>>Cyprus</option>
												<option value="59|CZK" <?php if ($locationInfo['country'] == '59|CZK') echo 'selected="selected"' ?>>Czech Republic</option>
												<option value="60|DKK" <?php if ($locationInfo['country'] == '60|DKK') echo 'selected="selected"' ?>>Denmark</option>
												<option value="61|DJF" <?php if ($locationInfo['country'] == '61|DJF') echo 'selected="selected"' ?>>Djibouti</option>
												<option value="62|XCD" <?php if ($locationInfo['country'] == '62|XCD') echo 'selected="selected"' ?>>Dominica</option>
												<option value="63|DOP" <?php if ($locationInfo['country'] == '63|DOP') echo 'selected="selected"' ?>>Dominican Republic</option>
												<option value="64|USD" <?php if ($locationInfo['country'] == '64|USD') echo 'selected="selected"' ?>>East Timor</option>
												<option value="65|ECS" <?php if ($locationInfo['country'] == '65|ECS') echo 'selected="selected"' ?>>Ecuador</option>
												<option value="66|EGP" <?php if ($locationInfo['country'] == '66|EGP') echo 'selected="selected"' ?>>Egypt</option>
												<option value="67|SVC" <?php if ($locationInfo['country'] == '67|SVC') echo 'selected="selected"' ?>>El Salvador</option>
												<option value="68|XAF" <?php if ($locationInfo['country'] == '68|XAF') echo 'selected="selected"' ?>>Equatorial Guinea</option>
												<option value="69|ERN" <?php if ($locationInfo['country'] == '69|ERN') echo 'selected="selected"' ?>>Eritrea</option>
												<option value="70|EUR" <?php if ($locationInfo['country'] == '70|EUR') echo 'selected="selected"' ?>>Estonia</option>
												<option value="71|ETB" <?php if ($locationInfo['country'] == '71|ETB') echo 'selected="selected"' ?>>Ethiopia</option>
												<option value="72|FKP" <?php if ($locationInfo['country'] == '72|FKP') echo 'selected="selected"' ?>>Falkland Islands</option>
												<option value="73|DKK" <?php if ($locationInfo['country'] == '73|DKK') echo 'selected="selected"' ?>>Faroe Islands</option>
												<option value="74|FJD" <?php if ($locationInfo['country'] == '74|FJD') echo 'selected="selected"' ?>>Fiji</option>
												<option value="75|EUR" <?php if ($locationInfo['country'] == '75|EUR') echo 'selected="selected"' ?>>Finland</option>
												<option value="76|EUR" <?php if ($locationInfo['country'] == '76|EUR') echo 'selected="selected"' ?>>France</option>
												<option value="77|EUR" <?php if ($locationInfo['country'] == '77|EUR') echo 'selected="selected"' ?>>French Guiana</option>
												<option value="78|CFP franc <?php if ($locationInfo['country'] == '78|CFP franc') echo 'selected="selected"' ?>">French Polynesia</option>
												<option value="79|EUR" <?php if ($locationInfo['country'] == '79|EUR') echo 'selected="selected"' ?>>French Southern Ter</option>
												<option value="80|XAF" <?php if ($locationInfo['country'] == '80|XAF') echo 'selected="selected"' ?>>Gabon</option>
												<option value="81|GMD" <?php if ($locationInfo['country'] == '81|GMD') echo 'selected="selected"' ?>>Gambia</option>
												<option value="82|GEL" <?php if ($locationInfo['country'] == '82|GEL') echo 'selected="selected"' ?>>Georgia</option>
												<option value="83|EUR" <?php if ($locationInfo['country'] == '83|EUR') echo 'selected="selected"' ?>>Germany</option>
												<option value="84|GHS" <?php if ($locationInfo['country'] == '84|GHS') echo 'selected="selected"' ?>>Ghana</option>
												<option value="85|GIP" <?php if ($locationInfo['country'] == '85|GIP') echo 'selected="selected"' ?>>Gibraltar</option>
												<option value="86|GBP" <?php if ($locationInfo['country'] == '86|GBP') echo 'selected="selected"' ?>>Great Britain</option>
												<option value="87|EUR" <?php if ($locationInfo['country'] == '87|EUR') echo 'selected="selected"' ?>>Greece</option>
												<option value="88|DKK" <?php if ($locationInfo['country'] == '88|DKK') echo 'selected="selected"' ?>>Greenland</option>
												<option value="89|XCD" <?php if ($locationInfo['country'] == '89|XCD') echo 'selected="selected"' ?>>Grenada</option>
												<option value="90|EUR" <?php if ($locationInfo['country'] == '90|EUR') echo 'selected="selected"' ?>>Guadeloupe</option>
												<option value="91|USD" <?php if ($locationInfo['country'] == '91|USD') echo 'selected="selected"' ?>>Guam</option>
												<option value="92|QTQ" <?php if ($locationInfo['country'] == '92|QTQ') echo 'selected="selected"' ?>>Guatemala</option>
												<option value="93|GNF" <?php if ($locationInfo['country'] == '93|GNF') echo 'selected="selected"' ?>>Guinea</option>
												<option value="94|GYD" <?php if ($locationInfo['country'] == '94|GYD') echo 'selected="selected"' ?>>Guyana</option>
												<option value="95|HTG" <?php if ($locationInfo['country'] == '95|HTG') echo 'selected="selected"' ?>>Haiti</option>
												<option value="96|USD" <?php if ($locationInfo['country'] == '96|USD') echo 'selected="selected"' ?>>Hawaii</option>
												<option value="97|HNL" <?php if ($locationInfo['country'] == '97|HNL') echo 'selected="selected"' ?>>Honduras</option>
												<option value="98|HKD" <?php if ($locationInfo['country'] == '98|HKD') echo 'selected="selected"' ?>>Hong Kong</option>
												<option value="99|HUF" <?php if ($locationInfo['country'] == '99|HUF') echo 'selected="selected"' ?>>Hungary</option>
												<option value="100|ISK" <?php if ($locationInfo['country'] == '100|ISK') echo 'selected="selected"' ?>>Iceland</option>
												<option value="101|IDR" <?php if ($locationInfo['country'] == '101|IDR') echo 'selected="selected"' ?>>Indonesia</option>
												<option value="102|IRR" <?php if ($locationInfo['country'] == '102|IRR') echo 'selected="selected"' ?>>Iran</option>
												<option value="103|IQD" <?php if ($locationInfo['country'] == '103|IQD') echo 'selected="selected"' ?>>Iraq</option>
												<option value="104|EUR" <?php if ($locationInfo['country'] == '104|EUR') echo 'selected="selected"' ?>>Ireland</option>
												<option value="105|GBP" <?php if ($locationInfo['country'] == '105|GBP') echo 'selected="selected"' ?>>Isle of Man</option>
												<option value="106|ILS" <?php if ($locationInfo['country'] == '106|ILS') echo 'selected="selected"' ?>>Israel</option>
												<option value="107|EUR" <?php if ($locationInfo['country'] == '107|EUR') echo 'selected="selected"' ?>>Italy</option>
												<option value="108|JMD" <?php if ($locationInfo['country'] == '108|JMD') echo 'selected="selected"' ?>>Jamaica</option>
												<option value="109|JPY" <?php if ($locationInfo['country'] == '109|JPY') echo 'selected="selected"' ?>>Japan</option>
												<option value="110|JOD" <?php if ($locationInfo['country'] == '110|JOD') echo 'selected="selected"' ?>>Jordan</option>
												<option value="111|KZT" <?php if ($locationInfo['country'] == '111|KZT') echo 'selected="selected"' ?>>Kazakhstan</option>
												<option value="112|KES" <?php if ($locationInfo['country'] == '112|KES') echo 'selected="selected"' ?>>Kenya</option>
												<option value="113|AUD" <?php if ($locationInfo['country'] == '113|AUD') echo 'selected="selected"' ?>>Kiribati</option>
												<option value="114|KPW" <?php if ($locationInfo['country'] == '114|KPW') echo 'selected="selected"' ?>>Korea North</option>
												<option value="115|KRW" <?php if ($locationInfo['country'] == '115|KRW') echo 'selected="selected"' ?>>Korea South</option>
												<option value="116|KWD" <?php if ($locationInfo['country'] == '116|KWD') echo 'selected="selected"' ?>>Kuwait</option>
												<option value="117|KGS" <?php if ($locationInfo['country'] == '117|KGS') echo 'selected="selected"' ?>>Kyrgyzstan</option>
												<option value="118|LAK" <?php if ($locationInfo['country'] == '118|LAK') echo 'selected="selected"' ?>>Laos</option>
												<option value="119|LVL" <?php if ($locationInfo['country'] == '119|LVL') echo 'selected="selected"' ?>>Latvia</option>
												<option value="120|LBP" <?php if ($locationInfo['country'] == '120|LBP') echo 'selected="selected"' ?>>Lebanon</option>
												<option value="121|LSL" <?php if ($locationInfo['country'] == '121|LSL') echo 'selected="selected"' ?>>Lesotho</option>
												<option value="122|LRD" <?php if ($locationInfo['country'] == '122|LRD') echo 'selected="selected"' ?>>Liberia</option>
												<option value="123|LYD" <?php if ($locationInfo['country'] == '123|LYD') echo 'selected="selected"' ?>>Libya</option>
												<option value="124|CHF" <?php if ($locationInfo['country'] == '124|CHF') echo 'selected="selected"' ?>>Liechtenstein</option>
												<option value="125|LTL" <?php if ($locationInfo['country'] == '125|LTL') echo 'selected="selected"' ?>>Lithuania</option>
												<option value="126|EUR" <?php if ($locationInfo['country'] == '126|EUR') echo 'selected="selected"' ?>>Luxembourg</option>
												<option value="127|MOP" <?php if ($locationInfo['country'] == '127|MOP') echo 'selected="selected"' ?>>Macau</option>
												<option value="128|MKD" <?php if ($locationInfo['country'] == '128|MKD') echo 'selected="selected"' ?>>Macedonia</option>
												<option value="129|MGF" <?php if ($locationInfo['country'] == '129|MGF') echo 'selected="selected"' ?>>Madagascar</option>
												<option value="130|MYR" <?php if ($locationInfo['country'] == '130|MYR') echo 'selected="selected"' ?>>Malaysia</option>
												<option value="131|MWK" <?php if ($locationInfo['country'] == '131|MWK') echo 'selected="selected"' ?>>Malawi</option>
												<option value="132|MVR" <?php if ($locationInfo['country'] == '132|MVR') echo 'selected="selected"' ?>>Maldives</option>
												<option value="133|XOF" <?php if ($locationInfo['country'] == '133|XOF') echo 'selected="selected"' ?>>Mali</option>
												<option value="134|EUR" <?php if ($locationInfo['country'] == '134|EUR') echo 'selected="selected"' ?>>Malta</option>
												<option value="135|USD" <?php if ($locationInfo['country'] == '135|USD') echo 'selected="selected"' ?>>Marshall Islands</option>
												<option value="136|EUR" <?php if ($locationInfo['country'] == '136|EUR') echo 'selected="selected"' ?>>Martinique</option>
												<option value="137|MRO" <?php if ($locationInfo['country'] == '137|MRO') echo 'selected="selected"' ?>>Mauritania</option>
												<option value="138|MUR" <?php if ($locationInfo['country'] == '138|MUR') echo 'selected="selected"' ?>>Mauritius</option>
												<option value="139|EUR" <?php if ($locationInfo['country'] == '139|EUR') echo 'selected="selected"' ?>>Mayotte</option>
												<option value="140|MXN" <?php if ($locationInfo['country'] == '140|MXN') echo 'selected="selected"' ?>>Mexico</option>
												<option value="141|EUR" <?php if ($locationInfo['country'] == '141|EUR') echo 'selected="selected"' ?>>Midway Islands</option>
												<option value="142|MDL" <?php if ($locationInfo['country'] == '142|MDL') echo 'selected="selected"' ?>>Moldova</option>
												<option value="143|EUR" <?php if ($locationInfo['country'] == '143|EUR') echo 'selected="selected"' ?>>Monaco</option>
												<option value="144|MNT" <?php if ($locationInfo['country'] == '144|MNT') echo 'selected="selected"' ?>>Mongolia</option>
												<option value="145|XCD" <?php if ($locationInfo['country'] == '145|XCD') echo 'selected="selected"' ?>>Montserrat</option>
												<option value="146|MAD" <?php if ($locationInfo['country'] == '146|MAD') echo 'selected="selected"' ?>>Morocco</option>
												<option value="147|MZN" <?php if ($locationInfo['country'] == '147|MZN') echo 'selected="selected"' ?>>Mozambique</option>
												<option value="148|MMK" <?php if ($locationInfo['country'] == '148|MMK') echo 'selected="selected"' ?>>Myanmar</option>
												<option value="149|NAD" <?php if ($locationInfo['country'] == '149|NAD') echo 'selected="selected"' ?>>Nambia</option>
												<option value="150|AUD" <?php if ($locationInfo['country'] == '150|AUD') echo 'selected="selected"' ?>>Nauru</option>
												<option value="151|NPR" <?php if ($locationInfo['country'] == '151|NPR') echo 'selected="selected"' ?>>Nepal</option>
												<option value="152|ANG" <?php if ($locationInfo['country'] == '152|ANG') echo 'selected="selected"' ?>>Netherland Antilles</option>
												<option value="153|EUR" <?php if ($locationInfo['country'] == '153|EUR') echo 'selected="selected"' ?>>Netherlands (Holland, Europe)</option>
												<option value="154|XCD" <?php if ($locationInfo['country'] == '154|XCD') echo 'selected="selected"' ?>>Nevis</option>
												<option value="155|XPF" <?php if ($locationInfo['country'] == '155|XPF') echo 'selected="selected"' ?>>New Caledonia</option>
												<option value="156|NZD" <?php if ($locationInfo['country'] == '156|NZD') echo 'selected="selected"' ?>>New Zealand</option>
												<option value="157|NIO" <?php if ($locationInfo['country'] == '157|NIO') echo 'selected="selected"' ?>>Nicaragua</option>
												<option value="158|XOF" <?php if ($locationInfo['country'] == '158|XOF') echo 'selected="selected"' ?>>Niger</option>
												<option value="159|NGN" <?php if ($locationInfo['country'] == '159|NGN') echo 'selected="selected"' ?>>Nigeria</option>
												<option value="160|NZD" <?php if ($locationInfo['country'] == '160|NZD') echo 'selected="selected"' ?>>Niue</option>
												<option value="161|AUD" <?php if ($locationInfo['country'] == '161|AUD') echo 'selected="selected"' ?>>Norfolk Island</option>
												<option value="162|NOK" <?php if ($locationInfo['country'] == '162|NOK') echo 'selected="selected"' ?>>Norway</option>
												<option value="163|OMR" <?php if ($locationInfo['country'] == '163|OMR') echo 'selected="selected"' ?>>Oman</option>
												<option value="164|PKR" <?php if ($locationInfo['country'] == '164|PKR') echo 'selected="selected"' ?>>Pakistan</option>
												<option value="165|USD" <?php if ($locationInfo['country'] == '165|USD') echo 'selected="selected"' ?>>Palau Island</option>
												<option value="166|Egyptian pound" <?php if ($locationInfo['country'] == '166|Egyptian pound') echo 'selected="selected"' ?>>Palestine</option>
												<option value="167|PAB" <?php if ($locationInfo['country'] == '167|PAB') echo 'selected="selected"' ?>>Panama</option>
												<option value="168|PGK" <?php if ($locationInfo['country'] == '168|PGK') echo 'selected="selected"' ?>>Papua New Guinea</option>
												<option value="169|PYG" <?php if ($locationInfo['country'] == '169|PYG') echo 'selected="selected"' ?>>Paraguay</option>
												<option value="170|PEN" <?php if ($locationInfo['country'] == '170|PEN') echo 'selected="selected"' ?>>Peru</option>
												<option value="171|PHP" <?php if ($locationInfo['country'] == '171|PHP') echo 'selected="selected"' ?>>Philippines</option>
												<option value="172|NZD" <?php if ($locationInfo['country'] == '172|NZD') echo 'selected="selected"' ?>>Pitcairn Island</option>
												<option value="173|PLN" <?php if ($locationInfo['country'] == '173|PLN') echo 'selected="selected"' ?>>Poland</option>
												<option value="174|EUR" <?php if ($locationInfo['country'] == '174|EUR') echo 'selected="selected"' ?>>Portugal</option>
												<option value="175|USD" <?php if ($locationInfo['country'] == '175|USD') echo 'selected="selected"' ?>>Puerto Rico</option>
												<option value="176|QAR" <?php if ($locationInfo['country'] == '176|QAR') echo 'selected="selected"' ?>>Qatar</option>
												<option value="177|EUR" <?php if ($locationInfo['country'] == '177|EUR') echo 'selected="selected"' ?>>Republic of Montenegro</option>
												<option value="178|RSD" <?php if ($locationInfo['country'] == '178|RSD') echo 'selected="selected"' ?>>Republic of Serbia</option>
												<option value="179|EUR" <?php if ($locationInfo['country'] == '179|EUR') echo 'selected="selected"' ?>>Reunion</option>
												<option value="180|RON" <?php if ($locationInfo['country'] == '180|RON') echo 'selected="selected"' ?>>Romania</option>
												<option value="181|RUB" <?php if ($locationInfo['country'] == '181|RUB') echo 'selected="selected"' ?>>Russia</option>
												<option value="182|RWF" <?php if ($locationInfo['country'] == '182|RWF') echo 'selected="selected"' ?>>Rwanda</option>
												<option value="183|EUR" <?php if ($locationInfo['country'] == '183|EUR') echo 'selected="selected"' ?>>St Barthelemy</option>
												<option value="184|EUX" <?php if ($locationInfo['country'] == '184|EUX') echo 'selected="selected"' ?>>St Eustatius</option>
												<option value="185|SHP" <?php if ($locationInfo['country'] == '185|SHP') echo 'selected="selected"' ?>>St Helena</option>
												<option value="186|XCD" <?php if ($locationInfo['country'] == '186|XCD') echo 'selected="selected"' ?>>St Kitts-Nevis</option>
												<option value="187|XCD" <?php if ($locationInfo['country'] == '187|XCD') echo 'selected="selected"' ?>>St Lucia</option>
												<option value="188|ANG" <?php if ($locationInfo['country'] == '188|ANG') echo 'selected="selected"' ?>>St Maarten</option>
												<option value="189|EUR" <?php if ($locationInfo['country'] == '189|EUR') echo 'selected="selected"' ?>>St Pierre &amp; Miquelon</option>
												<option value="190|XCD" <?php if ($locationInfo['country'] == '190|XCD') echo 'selected="selected"' ?>>St Vincent &amp; Grenadines</option>
												<option value="191|USD" <?php if ($locationInfo['country'] == '191|USD') echo 'selected="selected"' ?>>Saipan</option>
												<option value="192|WST" <?php if ($locationInfo['country'] == '192|WST') echo 'selected="selected"' ?>>Samoa</option>
												<option value="193|USD" <?php if ($locationInfo['country'] == '193|USD') echo 'selected="selected"' ?>>Samoa American</option>
												<option value="194|EUR" <?php if ($locationInfo['country'] == '194|EUR') echo 'selected="selected"' ?>>San Marino</option>
												<option value="195|STD" <?php if ($locationInfo['country'] == '195|STD') echo 'selected="selected"' ?>>Sao Tome &amp; Principe</option>
												<option value="196|SAR" <?php if ($locationInfo['country'] == '196|SAR') echo 'selected="selected"' ?>>Saudi Arabia</option>
												<option value="197|XOF" <?php if ($locationInfo['country'] == '197|XOF') echo 'selected="selected"' ?>>Senegal</option>
												<option value="198|SCR" <?php if ($locationInfo['country'] == '198|SCR') echo 'selected="selected"' ?>>Seychelles</option>
												<option value="199|SLL" <?php if ($locationInfo['country'] == '199|SLL') echo 'selected="selected"' ?>>Sierra Leone</option>
												<option value="200|SGD" <?php if ($locationInfo['country'] == '200|SGD') echo 'selected="selected"' ?>>Singapore</option>
												<option value="201|EUR" <?php if ($locationInfo['country'] == '201|EUR') echo 'selected="selected"' ?>>Slovakia</option>
												<option value="202|EUR" <?php if ($locationInfo['country'] == '202|EUR') echo 'selected="selected"' ?>>Slovenia</option>
												<option value="203|SBD" <?php if ($locationInfo['country'] == '203|SBD') echo 'selected="selected"' ?>>Solomon Islands</option>
												<option value="204|SOS" <?php if ($locationInfo['country'] == '204|SOS') echo 'selected="selected"' ?>>Somalia</option>
												<option value="205|ZAR" <?php if ($locationInfo['country'] == '205|ZAR') echo 'selected="selected"' ?>>South Africa</option>
												<option value="206|EUR" <?php if ($locationInfo['country'] == '206|EUR') echo 'selected="selected"' ?>>Spain</option>
												<option value="207|LKR" <?php if ($locationInfo['country'] == '207|LKR') echo 'selected="selected"' ?>>Sri Lanka</option>
												<option value="208|SDG" <?php if ($locationInfo['country'] == '208|SDG') echo 'selected="selected"' ?>>Sudan</option>
												<option value="209|SRD" <?php if ($locationInfo['country'] == '209|SRD') echo 'selected="selected"' ?>>Suriname</option>
												<option value="210|SZL" <?php if ($locationInfo['country'] == '210|SZL') echo 'selected="selected"' ?>>Swaziland</option>
												<option value="211|SEK" <?php if ($locationInfo['country'] == '211|SEK') echo 'selected="selected"' ?>>Sweden</option>
												<option value="212|CHF" <?php if ($locationInfo['country'] == '212|CHF') echo 'selected="selected"' ?>>Switzerland</option>
												<option value="213|SYP" <?php if ($locationInfo['country'] == '213|SYP') echo 'selected="selected"' ?>>Syria</option>
												<option value="214|CFP franc" <?php if ($locationInfo['country'] == '214|CFP franc') echo 'selected="selected"' ?>>Tahiti</option>
												<option value="215|TWD" <?php if ($locationInfo['country'] == '215|TWD') echo 'selected="selected"' ?>>Taiwan</option>
												<option value="216|TJS" <?php if ($locationInfo['country'] == '216|TJS') echo 'selected="selected"' ?>>Tajikistan</option>
												<option value="217|TZS" <?php if ($locationInfo['country'] == '217|TZS') echo 'selected="selected"' ?>>Tanzania</option>
												<option value="218|THB" <?php if ($locationInfo['country'] == '218|THB') echo 'selected="selected"' ?>>Thailand</option>
												<option value="219|XOF" <?php if ($locationInfo['country'] == '219|XOF') echo 'selected="selected"' ?>>Togo</option>
												<option value="220|NZD" <?php if ($locationInfo['country'] == '220|NZD') echo 'selected="selected"' ?>>Tokelau</option>
												<option value="221|TOP" <?php if ($locationInfo['country'] == '221|TOP') echo 'selected="selected"' ?>>Tonga</option>
												<option value="222|TTD" <?php if ($locationInfo['country'] == '222|TTD') echo 'selected="selected"' ?>>Trinidad &amp; Tobago</option>
												<option value="223|TND" <?php if ($locationInfo['country'] == '223|TND') echo 'selected="selected"' ?>>Tunisia</option>
												<option value="224|TRY" <?php if ($locationInfo['country'] == '224|TRY') echo 'selected="selected"' ?>>Turkey</option>
												<option value="225|TMT" <?php if ($locationInfo['country'] == '225|TMT') echo 'selected="selected"' ?>>Turkmenistan</option>
												<option value="226|USD" <?php if ($locationInfo['country'] == '226|USD') echo 'selected="selected"' ?>>Turks &amp; Caicos Is</option>
												<option value="227|AUD" <?php if ($locationInfo['country'] == '227|AUD') echo 'selected="selected"' ?>>Tuvalu</option>
												<option value="228|UGX" <?php if ($locationInfo['country'] == '228|UGX') echo 'selected="selected"' ?>>Uganda</option>
												<option value="229|UAH" <?php if ($locationInfo['country'] == '229|UAH') echo 'selected="selected"' ?>>Ukraine</option>
												<option value="230|AED" <?php if ($locationInfo['country'] == '230|AED') echo 'selected="selected"' ?>>United Arab Emirates</option>
												<option value="231|GBP" <?php if ($locationInfo['country'] == '231|GBP') echo 'selected="selected"' ?>>United Kingdom</option>
												<option value="232|USD" <?php if ($locationInfo['country'] == '232|USD') echo 'selected="selected"' ?>>United States of America</option>
												<option value="233|UYU" <?php if ($locationInfo['country'] == '233|UYU') echo 'selected="selected"' ?>>Uruguay</option>
												<option value="234|UZS" <?php if ($locationInfo['country'] == '234|UZS') echo 'selected="selected"' ?>>Uzbekistan</option>
												<option value="235|VUV" <?php if ($locationInfo['country'] == '235|VUV') echo 'selected="selected"' ?>>Vanuatu</option>
												<option value="236|EUR" <?php if ($locationInfo['country'] == '236|EUR') echo 'selected="selected"' ?>>Vatican City State</option>
												<option value="237|VEF" <?php if ($locationInfo['country'] == '237|VEF') echo 'selected="selected"' ?>>Venezuela</option>
												<option value="238|VND" <?php if ($locationInfo['country'] == '238|VND') echo 'selected="selected"' ?>>Vietnam</option>
												<option  value="239|USD" <?php if ($locationInfo['country'] == '239|USD') echo 'selected="selected"' ?>>Virgin Islands (Brit)</option>
												<option value="240|USD" <?php if ($locationInfo['country'] == '240|USD') echo 'selected="selected"' ?>>Virgin Islands (USA)</option>
												<option  value="241|XPF" <?php if ($locationInfo['country'] == '241|XPF') echo 'selected="selected"' ?>>Wake Island</option>
												<option  value="242|MAD" <?php if ($locationInfo['country'] == '242|MAD') echo 'selected="selected"' ?>>Wallis &amp; Futana Is</option>
												<option value="243|YER" <?php if ($locationInfo['country'] == '243|YER') echo 'selected="selected"' ?>>Yemen</option>
												<option value="244|ZRN" <?php if ($locationInfo['country'] == '244|ZRN') echo 'selected="selected"' ?>>Zaire</option>
												<option  value="245|ZMW" <?php if ($locationInfo['country'] == '245|ZMW') echo 'selected="selected"' ?>>Zambia</option>
												<option  value="246|ZWD" <?php if ($locationInfo['country'] == '246|ZWD') echo 'selected="selected"' ?>>Zimbabwe</option>
												</optgroup>
											</select> </div>
                                            </div>
                                        </div>
										 <div class="divider"></div>
                                            <div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary" id="save">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
                                            </div>
                                    </form>
                                </div>
                            </div>
                             
                        </div>
                         
                    </div>
                </div>
       </div>    
	    </div>    
		 </div>   

<div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Location Has Been Updated Successfully</div></div></div>
<div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Location Has Not Been Updated Successfully</div></div></div>
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>my_assets/assets/scripts/main.js"></script>
<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
<script>
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
				$('#toast-container').show();
				setTimeout(function(){ 
				window.location.href="<?php echo base_url().'client/location/view/'?>";
				}, 1000);
				 
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$('#toast-container1').delay(5000).fadeOut(400);
				setTimeout(function(){ 
			    window.location.reload();
				}, 1000); 
			}
      }); 
		}
		else{
			
		}
		
});  
}); 

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
							$('#save').hide();
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
