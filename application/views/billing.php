<!DOCTYPE HTML>
<html>
<head>

<!-- Define Charset -->
<meta charset="utf-8"/>

<!-- Responsive Metatag -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

<!-- Page Title -->
<title> Physio Plus Tech </title>
<?php echo $this->load->view('includes_view'); ?>

<style type="text/css">
<!--
.style2 {
	font-size: 150%;
	color: #000000;
}
.style7 {font-weight: bold; }
.style13 {font-size: 90%; }
.style29 {color: #000000; font-size: 90%; }
.styleD {color: #1C9ECC; font-size: 90%; }
.style32 {color: #CC3300}
.style33 {color: #CC3300; font-weight: bold; }
.style34 {
	font-size: 90%;
	font-weight: bold;
	color: #1C9ECC;
}
.style38 {font-size: 85%; color: #CC6600; }
.style42 {font-size: 85%; color: #333333; }
.style43 {font-size: 85%; color: #000000; }
-->
</style>
</head>
<body>
<?php include_once("analyticstracking.php")?>
<!-- Main Wrapper -->
<div class="main-wrapper">

<!-- Pattern-->
<div class="pattern"> 
<?php echo $this->load->view('header_view'); ?>

</div>
<!-- END Pattern -->

<!-- END Background -->

<!-- Wrapper Section -->
<div class="wrapper">
	<div class="home" style="margin-top:10px; margin-bottom:10px">
		<a href="<?php echo base_url(); ?>" class="style42">
		<img src="<?php echo base_url(); ?>images/Untitled-1.jpg" align="left" style="padding-right:5px">
		Home</a>
	</div>
	
<!-- Title Banner Section -->
<img src="<?php echo base_url(); ?>images/title_bill.png">

<!-- Define Section -->
<div>
	<table width="940px">
		<td style="vertical-align:top" width="560px">
			<h3 align="left" class="style7 style32">Physiotherapy Billing</h3>
				<p align="left" class="style29" style="text-align:justify">Physio Plus Tech has developed a simple to use billing system, that can be generated directly from
                patient care plan or treatment records. Now billing your patients is just a click way, you don't have to start with a word document again. Physio Plus tech
                also enables the PT's to create bill by manually entering the treatments and billable items. We have in development about maintaining inventory for billable
                items (Splints, braces, exercise bands and other accessories we used to sell to our patients)  and to deduct them automatically as they have been sold.</p>
            <h3 align="left" class="style7 style32">Customize your Own Bill or Invoice</h3>
				<p align="left" class="style29" style="text-align:justify">Physio Plus Tech has freely provided customization rights to your clinic bills, you can and your
                clinic name, you can upload your clinic logo, you can maintain the terms and conditions of payment or bills and you can also enlist your clinic locations and
		        address.</p>
		</td>
		<td width="380px">
			<img src="<?php echo base_url(); ?>images/bill.png" align="right" style="margin-top:40px">
		</td>
	</table>
</div>
<!-- END Define Section -->

<!-- Feature Define Section -->
<div>
	<h3 align="left" class="style7 style32">Manage Mode of Payment</h3>
		<p align="left" class="style29" style="text-align:justify">Physio Plus Tech has given the privilege to create, edit and manage the mode of payment
        of each and every bill, so that you can keep track of the payments, like cash, cheque or online transactions. You can even edit the cheque numbers or delete it along
        with payment.</p>
	<h3 align="left" class="style7 style32">Keep track of receivable payments and Remind your Patients</h3>
		<p align="left" class="style29" style="text-align:justify">In Physio Plus Tech, we have a feature to notify you about the invoices or bills that have
        not been settled payments completely, we allow partial payments and will remind you about the rest of the payments in notification. We also have the facility to send
        your patients an SMS or Email with kind reminder and intimation about the due amount that has to be collected in order to close the bill.</p>
	<h3 align="left" class="style7 style32">Know your Income and Clinic Accounts</h3>
		<p align="left" class="style29" style="text-align:justify">In the busy schedule of clinic hours, we hardly get time to calculate our income everyday
        or even monthly. We may not have kept the record of expenses incurred in our clinic and there may not be sufficient financial data about our clinical practice. On the
        other hand a clear-cut depiction of those documents and record will enable us to apply for IT returns, bank loans and other financial services. Physio Plus Tech has the
        platform to maintain your clinic income and expense records, income statements and expense statements for now. We are working on more financial reporting features to be
        included in the near future.</p>	
<br>
<div class="bottom">
	<h4 align="left" class="style34" style="margin-left:20px">In return, you’ll experience:</h4>
		<p align="left" class="style43" style="margin-left:20px">• A service fully integrated with Physio Plus Tech EMR</p>
		<p align="left" class="style43" style="margin-left:20px">• A dedicated billing Account Manager with regional specialization</p>
		<p align="left" class="style43" style="margin-left:20px">• Customized billing reports, can help you evoluate and anayze your clinic growth</p>
		<p align="left" class="style43" style="margin-left:20px">• Transparent and secure access with 24/7 real-time access ensures privacy of your clinics financial datas</p>
</div>	
<br>
</div>
<!-- END Feature Define Section -->

</div>
<div style="margin-top:180px">
</div>
<!-- END Wrapper Section -->
<?php echo $this->load->view('footer_view'); ?>

</div>
<!-- END Main Wrapper -->

</div>
</body>
</html>