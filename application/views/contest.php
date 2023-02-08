<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Checkout Form</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/checkout.css">
  <link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/icon.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <style>
	#status
{
font-size:11px;
margin-left:10px;
}
.green
{
background-color:#CEFFCE;
}
.red
{
background-color:#FFD9D9;
}
  </style>
</head>
<body>
  <form class="checkout" action="<?php echo base_url() ?>php-sdk/examples/charging-iframe/contest.php" id="signupForm" name="signupForm">
    <div class="checkout-header">
      <h1 class="checkout-title">
        Checkout
        <span class="checkout-price" id="price"><font face="Rupee Foradian">`</font> 500</span>
		
      </h1>
    </div>
	<table width="404" height="193">
	<tr>
    	<td height="46"><label>First Name</label></td>
		<td><input class="easyui-validatebox" name="fname" type="text" id="fname" required="true"></td>
	 </tr>
	 <tr>
    	<td height="46"><label>Last Name</label></td>
		<td><input class="easyui-validatebox" name="lname" type="text" id="lname" required="true"></td>
	 </tr>
	 <tr>
    	<td height="46"><label>Clinic Name</label></td>
		<td><input class="easyui-validatebox" required="true" name="cname" type="text" id="cname"></td>
	 </tr>
	 <tr>
    	<td height="46"><label>Email</label></td>
		<td><input name="email" type="text" id="email" class="easyui-validatebox" required="true" validType="email">
		<span id="status"></span>
		</td>
		
	 </tr>
	 <tr>
    	<td height="46"><label>Password</label></td>
		<td><input maxlength="25" minlength="8" name="password" type="text" id="password" class="easyui-validatebox" required="true"></td>
	 </tr>
	 <tr>
    	<td height="46"><label>Confirm Password</label></td>
		<td><input name="cpassword" maxlength="25"  minlength="8" type="text" id="cpassword" class="easyui-validatebox" required="true"></td>
	 </tr>
	 <tr>
    	<td height="46"><label>Mobile No</label></td>
		<td><input name="mobile" type="text" id="mobile" class="easyui-validatebox" required="true"></td>
	 </tr>
	  <tr>
    	<td height="46"><label>Phone No</label></td>
		<td><input name="phone" type="text" id="phone"></td>
	 </tr>
	 <tr>
    	<td height="46"><label>Address </label></td>
		<td><textarea name="address" rows="3" id="address" type="text" class="easyui-validatebox" required="true"></textarea></td>
	 </tr>
	 
	<tr>
    	<td height="46"><label>City</label></td>
		<td><input name="city" type="text" id="city" class="easyui-validatebox" required="true"></td>
	 </tr>
	 <tr>
    	<td height="46"><label>State</label></td>
		<td><input name="state" type="text" id="state" class="easyui-validatebox" required="true"></td>
	 </tr>
	 <tr>
    	<td height="46"><label>Zip or Pincode</label></td>
		<td><input name="zip" type="text" id="zip"></td>
	 </tr>
	 <tr>
    	<td height="46"><label>Country</label></td>
		<td>
		<select id="country" name="country" class="easyui-validatebox" required="true">
			<option>--select--</option>
			<option value="1|INR">India</option>
<option value="2|AFN">Afghanistan</option>
<option value="3|ALL">Albania</option>
<option value="4|DZD">Algeria</option>
<option value="5|USD">American Samoa</option>
<option value="6|EUR">Andorra</option>
<option value="7|AOA">Angola</option>
<option value="8|XCD">Anguilla</option>
<option value="9|XCD">Antigua &amp; Barbuda</option>
<option value="10|ARS">Argentina</option>
<option value="11|AMD">Armenia</option>
<option value="12|AWG">Aruba</option>
<option value="13|AUD">Australia</option>
<option value="14|EUR">Austria</option>
<option value="15|AZN">Azerbaijan</option>
<option value="16|BSD">Bahamas</option>
<option value="17|BHD">Bahrain</option>
<option value="18|BDT">Bangladesh</option>
<option value="19|BBD">Barbados</option>
<option value="20|BYR">Belarus</option>
<option value="21|EUR">Belgium</option>
<option value="22|BZD">Belize</option>
<option value="23|XOF">Benin</option>
<option value="24|BMD">Bermuda</option>
<option value="25|BTN">Bhutan</option>
<option value="26|BOB">Bolivia</option>
<option value="27|USD">Bonaire</option>
<option value="28|BAM">Bosnia &amp; Herzegovina</option>
<option value="29|BWP">Botswana</option>
<option value="30|BRL">Brazil</option>
<option value="31|USD">British Indian Ocean Ter</option>
<option value="32|BND">Brunei</option>
<option value="33|BGN">Bulgaria</option>
<option value="34|XOF">Burkina Faso</option>
<option value="35|BIF">Burundi</option>
<option value="36|KHR">Cambodia</option>
<option value="37|XAF">Cameroon</option>
<option value="38|CAD">Canada</option>
<option value="39|EUR">Canary Islands</option>
<option value="40|CVE">Cape Verde</option>
<option value="41|KYD">Cayman Islands</option>
<option value="42|XAF">Central African Republic</option>
<option value="43|XAF">Chad</option>
<option value="44|GIP">Channel Islands</option>
<option value="45|CLP">Chile</option>
<option value="46|CNY">China</option>
<option value="47|AUD">Christmas Island</option>
<option value="48|AUD">Cocos Island</option>
<option value="49|COP">Colombia</option>
<option value="50|KMF">Comoros</option>
<option value="51|XAF">Congo</option>
<option value="52|NZD">Cook Islands</option>
<option value="53|CRC">Costa Rica</option>
<option value="54|CFA">Cote D'Ivoire</option>
<option value="55|HRK">Croatia</option>
<option value="56|CUP">Cuba</option>
<option value="57|ANG">Curacao</option>
<option value="58|EUR">Cyprus</option>
<option value="59|CZK">Czech Republic</option>
<option value="60|DKK">Denmark</option>
<option value="61|DJF">Djibouti</option>
<option value="62|XCD">Dominica</option>
<option value="63|DOP">Dominican Republic</option>
<option value="64|USD">East Timor</option>
<option value="65|ECS">Ecuador</option>
<option value="66|EGP">Egypt</option>
<option value="67|SVC">El Salvador</option>
<option value="68|XAF">Equatorial Guinea</option>
<option value="69|ERN">Eritrea</option>
<option value="70|EUR">Estonia</option>
<option value="71|ETB">Ethiopia</option>
<option value="72|FKP">Faroe Islands</option>
<option value="74|FJD">Fiji</option>
<option value="75|EUR">Finland</option>
<option value="76|EUR">France</option>
<option value="77|EUR">French Guiana</option>
<option value="78|CFP franc">French Polynesia</option>
<option value="79|EUR">French Southern Ter</option>
<option value="80|XAF">Gabon</option>
<option value="81|GMD">Gambia</option>
<option value="82|GEL">Georgia</option>
<option value="83|EUR">Germany</option>
<option value="84|GHS">Ghana</option>
<option value="85|GIP">Gibraltar</option>
<option value="86|GBP">Great Britain</option>
<option value="87|EUR">Greece</option>
<option value="88|DKK">Greenland</option>
<option value="89|XCD">Grenada</option>
<option value="90|EUR">Guadeloupe</option>
<option value="91|USD">Guam</option>
<option value="92|QTQ">Guatemala</option>
<option value="93|GNF">Guinea</option>
<option value="94|GYD">Guyana</option>
<option value="95|HTG">Haiti</option>
<option value="96|USD">Hawaii</option>
<option value="97|HNL">Honduras</option>
<option value="98|HKD">Hong Kong</option>
<option value="99|HUF">Hungary</option>
<option value="100|ISK">Iceland</option>
<option value="101|IDR">Indonesia</option>
<option value="102|IRR">Iran</option>
<option value="103|IQD">Iraq</option>
<option value="104|EUR">Ireland</option>
<option value="105|GBP">Isle of Man</option>
<option value="106|ILS">Israel</option>
<option value="107|EUR">Italy</option>
<option value="108|JMD">Jamaica</option>
<option value="109|JPY">Japan</option>
<option value="110|JOD">Jordan</option>
<option value="111|KZT">Kazakhstan</option>
<option value="112|KES">Kenya</option>
<option value="113|AUD">Kiribati</option>
<option value="114|KPW">Korea North</option>
<option value="115|KRW">Korea South</option>
<option value="116|KWD">Kuwait</option>
<option value="117|KGS">Kyrgyzstan</option>
<option value="118|LAK">Laos</option>
<option value="119|LVL">Latvia</option>
<option value="120|LBP">Lebanon</option>
<option value="121|LSL">Lesotho</option>
<option value="122|LRD">Liberia</option>
<option value="123|LYD">Libya</option>
<option value="124|CHF">Liechtenstein</option>
<option value="125|LTL">Lithuania</option>
<option value="126|EUR">Luxembourg</option>
<option value="127|MOP">Macau</option>
<option value="128|MKD">Macedonia</option>
<option value="129|MGF">Madagascar</option>
<option value="130|MYR">Malaysia</option>
<option value="131|MWK">Malawi</option>
<option value="132|MVR">Maldives</option>
<option value="133|XOF">Mali</option>
<option value="134|EUR">Malta</option>
<option value="135|USD">Marshall Islands</option>
<option value="136|EUR">Martinique</option>
<option value="137|MRO">Mauritania</option>
<option value="138|MUR">Mauritius</option>
<option value="139|EUR">Mayotte</option>
<option value="140|MXN">Mexico</option>
<option value="141|EUR">Midway Islands</option>
<option value="142|MDL">Moldova</option>
<option value="143|EUR">Monaco</option>
<option value="144|MNT">Mongolia</option>
<option value="145|XCD">Montserrat</option>
<option value="146|MAD">Morocco</option>
<option value="147|MZN">Mozambique</option>
<option value="148|MMK">Myanmar</option>
<option value="149|NAD">Nambia</option>
<option value="150|AUD">Nauru</option>
<option value="151|NPR">Nepal</option>
<option value="152|ANG">Netherland Antilles</option>
<option value="153|EUR">Netherlands (Holland, Europe)</option>
<option value="154|XCD">Nevis</option>
<option value="155|XPF">New Caledonia</option>
<option value="156|NZD">New Zealand</option>
<option value="157|NIO">Nicaragua</option>
<option value="158|XOF">Niger</option>
<option value="159|NGN">Nigeria</option>
<option value="160|NZD">Niue</option>
<option value="161|AUD">Norfolk Island</option>
<option value="162|NOK">Norway</option>
<option value="163|OMR">Oman</option>
<option value="164|PKR">Pakistan</option>
<option value="165|USD">Palau Island</option>
<option value="166|Egyptian pound">Palestine</option>
<option value="167|PAB">Panama</option>
<option value="168|PGK">Papua New Guinea</option>
<option value="169|PYG">Paraguay</option>
<option value="170|PEN">Peru</option>
<option value="171|PHP">Philippines</option>
<option value="172|NZD">Pitcairn Island</option>
<option value="173|PLN">Poland</option>
<option value="174|EUR">Portugal</option>
<option value="175|USD">Puerto Rico</option>
<option value="176|QAR">Qatar</option>
<option value="177|EUR">Republic of Montenegro</option>
<option value="178|RSD">Republic of Serbia</option>
<option value="179|EUR">Reunion</option>
<option value="180|RON">Romania</option>
<option value="181|RUB">Russia</option>
<option value="182|RWF">Rwanda</option>
<option value="183|EUR">St Barthelemy</option>
<option value="184|EUX">St Eustatius</option>
<option value="185|SHP">St Helena</option>
<option value="186|XCD">St Kitts-Nevis</option>
<option value="187|XCD">St Lucia</option>
<option value="188|ANG">St Maarten</option>
<option value="189|EUR">St Pierre &amp; Miquelon</option>
<option value="190|XCD">St Vincent &amp; Grenadines</option>
<option value="191|USD">Saipan</option>
<option value="192|WST">Samoa</option>
<option value="193|USD">Samoa American</option>
<option value="194|EUR">San Marino</option>
<option value="195|STD">Sao Tome &amp; Principe</option>
<option value="196|SAR">Saudi Arabia</option>
<option value="197|XOF">Senegal</option>
<option value="198|SCR">Seychelles</option>
<option value="199|SLL">Sierra Leone</option>
<option value="200|SGD">Singapore</option>
<option value="201|EUR">Slovakia</option>
<option value="202|EUR">Slovenia</option>
<option value="203|SBD">Solomon Islands</option>
<option value="204|SOS">Somalia</option>
<option value="205|ZAR">South Africa</option>
<option value="206|EUR">Spain</option>
<option value="207|LKR">Sri Lanka</option>
<option value="208|SDG">Sudan</option>
<option value="209|SRD">Suriname</option>
<option value="210|SZL">Swaziland</option>
<option value="211|SEK">Sweden</option>
<option value="212|CHF">Switzerland</option>
<option value="213|SYP">Syria</option>
<option value="214|CFP franc">Tahiti</option>
<option value="215|TWD">Taiwan</option>
<option value="216|TJS">Tajikistan</option>
<option value="217|TZS">Tanzania</option>
<option value="218|THB">Thailand</option>
<option value="219|XOF">Togo</option>
<option value="220|NZD">Tokelau</option>
<option value="221|TOP">Tonga</option>
<option value="222|TTD">Trinidad &amp; Tobago</option>
<option value="223|TND">Tunisia</option>
<option value="224|TRY">Turkey</option>
<option value="225|TMT">Turkmenistan</option>
<option value="226|USD">Turks &amp; Caicos Is</option>
<option value="227|AUD">Tuvalu</option>
<option value="228|UGX">Uganda</option>
<option value="229|UAH">Ukraine</option>
<option value="230|AED">United Arab Emirates</option>
<option value="231|GBP">United Kingdom</option>
<option value="232|USD">United States of America</option>
<option value="233|UYU">Uruguay</option>
<option value="234|UZS">Uzbekistan</option>
<option value="235|VUV">Vanuatu</option>
<option value="236|EUR">Vatican City State</option>
<option value="237|VEF">Venezuela</option>
<option value="238|VND">Vietnam</option>
<option  value="239|USD">Virgin Islands (Brit)</option>
<option value="240|USD">Virgin Islands (USA)</option>
<option  value="241|XPF">Wake Island</option>
<option  value="242|MAD">Wallis &amp; Futana Is</option>
<option value="243|YER">Yemen</option>
<option value="244|ZRN">Zaire</option>
<option  value="245|ZMW">Zambia</option>
<option  value="246|ZWD">Zimbabwe</option>
		</select>
		</td>
	 </tr>
	<tr>
		<td width="143" height="43"><label>Your Plan</label></td> 
		<td width="249">
			<input type="text" value="Contest Plan" readonly>
			<input type="hidden" value="7" name="plan" id="plan">
		</td>
	 </tr>
	 <tr>
		<td height="43"><label>No of User</label></td>
	   <td>
			<input type='hidden' name='user' value='0' style="width:35px" id='user' readonly />
			<input type='text' value='Unlimit' readonly />
	<div id="unlimituser"></div>
	</td>
	 </tr>
	 <tr>
		<td width="143" height="43"><label>T-Shirt Size</label></td> 
		<td width="249">
			<select name="size" id="size">
				<option></option>
				<option value="Medium">Medium</option>
				<option value="large">Large</option>
				<option value="XL">XL</option>
				<option value="2XL">2XL</option>
			</select>
		</td>
	 </tr>
	 <tr>
	 <td height="49"><label>No of Location</label></td>		
	  <td> 
		<input type='hidden' name='location' value='0'  style="width:35px" id='location' readonly />
		<input type='text' value='Unlimit' readonly />
	<div id="unlimitlocation"></div>
	</td>
	</tr>
	<tr>
		
		   <td width="143" height="43"><label>Duration</label></td> 
		   <td width="249">
				<input type='text' name='months' value='30'  style="width:35px" id='months' readonly />
	 </td>
	 </tr>
	
	<tr>
    	<td height="46"><label>SMS Limit</label></td>
		<td><input name="sms" type="text" id="sms" class="easyui-validatebox" value="0" readonly required="true">
	 </tr>
	 <tr>
		<td height="46"><label>Amount</label></td>
		<td><input type="text" name="transaction_amount" id="transaction_amount" value="500" readonly ></td>
	</tr>
	 </table>
    <p>
      <input type="submit" value="Purchase" class="checkout-btn" name="submit" id="submit">
    </p>
  </form>
  
  <div class="about">
    <p class="about-links">
      Thanks For Your subscription
    </p>
    <p class="about-author">
      &copy; 2014 All Rights Reserved By -
      <a href="http://www.physioplustech.com/pages/upgrade_pricing" target="_blank">PhysioPlusTech</a><br>
     For queries <a href="http://www.physioplustech.com/pages/contact_us" target="_blank">Contact Us</a>
    </p>
  </div>
</body>
<script src="<?php echo base_url(); ?>js/excanvas.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery-ui-1.10.2.custom.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.gritter.min.js"></script> 
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.uniform.js"></script> 
<script src="<?php echo base_url(); ?>js/select2.min.js"></script>
<script type="text/javascript" src="http://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
<script>
$(document).ready(function() {
			
	
$("#email").change(function() 
{ 

var username = $("#email").val();
var msgbox = $("#status");


if(username.length > 3)
{
$("#status").html('<img src="<?php echo base_url() ?>img/loader.gif" align="absmiddle">&nbsp;Checking availability...');

$.ajax({  
    type: "POST",  
    url: "<?php echo base_url(); ?>pages/user_available/",  
    data: "username="+ username,  
    success: function(msg){  
   
   $("#status").ajaxComplete(function(event, request){ 

	if(msg == 'OK')
	{ 
	
	    $("#email").removeClass("red");
	    $("#email").addClass("green");
        msgbox.html('<img src="<?php echo base_url() ?>img/yes.png" align="absmiddle"> <font color="Green"> Available </font>  ');
	}  
	else  
	{  
	     $("#email").removeClass("green");
		 $("#email").addClass("red");
		msgbox.html(msg);
	}  
   
   });
   } 
   
  }); 

}
else
{
 $("#email").addClass("red");
$("#status").html('<font color="#cc0000">Enter valid User Name</font>');
}

return false;
});

 $('#submit').click(function(event){
    
        data = $('#password').val();
        var len = data.length;
        var filter=/^[a-zA-Z0-9]+$/;
        /* if(len < 1) {
            alert("Password cannot be blank");
            // Prevent form submission
            event.preventDefault();
        } */
         
			if($('#password').val() != $('#cpassword').val()) {
				alert("Password and Confirm Password don't match");
				// Prevent form submission
				event.preventDefault();
			}
    });
	
	$('#password').keypress(function(e)
      {
          var code = e.keyCode ? e.keyCode:e.which; // Get the key code.
          var pressedKey = String.fromCharCode(code); // Find the key pressed.
          if(pressedKey.match(/[_~\\\/\ ,+.;'=?><:"|\[\]\-!@#\$%\^&\*\(\)]+$/)) // Check if it's a alpanumeric char or not.
          {
              e.preventDefault(); // If it is not then prevent the event from happening.
          }
      });
	
});
</script>
</html>
