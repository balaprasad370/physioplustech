<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail_model extends CI_Model {
	public function __construct() {
	  parent::__construct();
		$this->load->library('email');
		 $this->email->initialize(array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'smtp-relay.sendinblue.com',  
		  'smtp_user' => 'info@physioplustech.asia',
		  'smtp_pass' => 'ZYIU5EJ2rMC6d7XO',
		  'smtp_port' => 587,
		  'crlf' => "\r\n",
		  'newline' => "\r\n"
		));
		$this->email->from('no-reply@physioplustech.com', 'Physio Plus Tech');
	}
	public function sendEmail($info) {
		$this->email->from('no-reply@physioplustech.com', 'Physio Plus Tech'); // from no-reply@physioplustech.com
		$this->email->to($info['to']);
		$this->email->subject($info['subject']);
		$this->email->message($info['message']);
		$this->email->send();
	}
	public function sendEmail_pwd($info) {
		$this->email->from('no-reply@physioplustech.com');
		$this->email->to($info['to']);
		$this->email->subject($info['subject']);
		$this->email->message($info['message']);
		$this->email->send();
	}
	
	public function mail_template($name='', $mail='', $phone='', $message=''){
		$template = '	
		<table width="100%"  style="font-family:Arial, Helvetica, sans-serif; background:#B45F04; font-size:13px;">
	    <tr>
		<td align="center">
        	<table align="center" style="width:600px;">
            	<tr>
                	<td style="width:200px; background:#B45F04; float:left;">
                    	<img src="'.base_url().'img/logo.png" style="width:200px; height:88px;">
                    </td>
                    <td style="width:390px; height:100px; float:right;">
                    	<p style="color:#fff; margin-top:25px; font-size:15px; text-align:center; line-height:25px;"></p>
                    </td>
                </tr>
                <tr bgcolor="#CCCCCC" style="margin-top:-5px;">
                	<td>
                    	<table bgcolor="#FFFFFF" style="margin:20px 20px 20px 20px; width:600px ">
                        	<tr>
                            	<td width="300px;">
                    	<p style="color:#585858; font-family:Times New Roman, Times, serif; font-size:22px; text-align:left; padding-left:20px;"><strong>Contact Message</strong></p>
                           		</td>
							</tr>
                            <tr>
                            	<td>
                    				<table>
                                    	<tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">Name :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$name.'</p>
			                        		</td>
										</tr>
                                        <tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">E-Mail :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$mail.'</p>
			                        		</td>
										</tr>
                                        <tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">Phone :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$phone.'</p>
			                        		</td>
										</tr>
                                        <tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">Message :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$message.'</p>
			                        		</td>
										</tr>
									</table>
                        		</td>
							</tr>
						</table>
                    </td>
				</tr>
				<tr>
                	<td align="center">
                    	<p style="color:#CCCCCC; text-align:center;">Copyright © 2013 Physio Plus Tech. All Rights Reserved.</p>
                        <a style="color:#CCCCCC;" href="https://www.physioplustech.in/"><p>www.physioplustech.in</p></a>
                    </td>
                </tr>
			</table>
		</td>
	</tr>
	</table>';
		return $template;
	}
	public function patientAppointmentTemplate($info) {
		$html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="background-color: #e4e7e0;"> <tbody><tr> <td width="100%"> <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: 0 auto; padding: 0;" class="mobile"> <tbody><tr> <td width="100%"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 5px 0; color: #000000; font-family: Arial,Helvetica,sans-serif; font-size: 11px; font-weight: light; line-height: 15px;"></td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="45%" style="padding: 7px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="font: 26px impact; color: #fff;">'. $info['ClinicName'] .'<!--<img width="174" height="34" border="0" style="display: block;" alt="Logo" src="logo.png" class="imageScale">--></td> </tr> </tbody></table> </td> <td width="55%" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 2px 15px; background-color: #23a6bd; color: #ffffff; font-family: Impact; font-size: 25px; line-height: 29px;">Email reminders for appointments</td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff; padding: 20px 0 10px 0;"> <tbody><tr> <td class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding: 15px 0 0 0;"> <tbody><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"><div style="color: #130f0e; font-size: 14px; font-weight: bold; line-height: 21px; text-align: left;">Dear '. $info['PersonName'] .',</div><br></td> </tr><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"><div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">Your appointment with '. $info['DoctorName'] .' is on '. $info['Date'] .' at '. $info['Time'] .'.</div><br/><br/></td> </tr><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"><div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">This appointment is considered confirmed. We look forward to seeing you then. We appreciate your help in keeping our schedule running efficiently.</div><br/><br/></td> </tr><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"><div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">Any cancellation/rescheduling of appointment , please inform us at least 12 hours in advance. Otherwise a CANCELLATION CHARGE will be applied.</div><br/><br/></td> </tr><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"><div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">If you arrive late for appointments by more than 10 minutes we may only be able to treat you for the remainder of the session.</div><br/><br/></td> </tr><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"></td> </tr><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"><br/><div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">Thank you,</div></td> </tr><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"><div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">'.$info['ClinicName'].',</div></td> </tr><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"><div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">Tel - '.$info['ClinicMobile'].'</div></td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="100%" style="font-size: 10px;">&nbsp;</td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding-bottom: 14px;"> <tbody><tr> <td width="30%" style="padding: 10px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Facebook" src="'. base_url() .'img/facebook.png"></a></td> <td align="center"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Twitter" src="'. base_url() .'img/twitter.png"></a></td> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img border="0" style="display: block;" alt="Envelope" src="'. base_url() .'img/envelope.png"></a></td> <td align="center" style="padding-right: 7px;"></td> </tr> </tbody></table> </td> <td width="70%" style="padding: 10px 0; background-color: #343135;" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding-right: 10px; padding-left: 7px; color: #ffffff; font-family: Arial,Helvetica,sans-serif; font-size: 10px; line-height: 14px; text-align: left;">You have received this email cause you have subscribed to '. $info['ClinicName'] .'.<br> &copy; 2013 Your Company</td> </tr> </tbody></table> </td> </tr> </tbody></table> </td> </tr> </tbody></table></td> </tr> </tbody></table>';	
		return $html;
	}
	public function registrationTemplate($info) {
		$url = base_url().'pages/email_verification/'.$info['verificationCode'];
		$html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="background-color: #e4e7e0;"> <tbody><tr> <td width="100%"> <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: 0 auto; padding: 0;" class="mobile"> <tbody><tr> <td width="100%"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 5px 0; color: #000000; font-family: Arial,Helvetica,sans-serif; font-size: 11px; font-weight: light; line-height: 15px;">Registration confirmation. </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="45%" style="padding: 7px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="font: 26px impact; color: #fff;">Physio Plus Tech<!--<img width="174" height="34" border="0" style="display: block;" alt="Logo" src="logo.png" class="imageScale">--></td> </tr> </tbody></table> </td> <td width="55%" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 2px 15px; background-color: #23a6bd; color: #ffffff; font-family: Impact; font-size: 25px; line-height: 29px;">WELCOME</td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff; padding: 20px 0 10px 0;"> <tbody><tr> <td class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding: 15px 0 0 0;"> <tbody><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"> <div style="color: #130f0e; font-size: 14px; font-weight: bold; line-height: 21px; text-align: left;">Dear '. $info['ClientName'] .',</div><br> <div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">thanks for registering with Physio Plus Tech </div><br> <div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">to verify your email address, please follow the below link </div><br> <div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;"><a href=" '.$url.' ">'.$url.'</a> </div><br> <div style="color: #130f0e; font-size: 14px; line-height: 20px; text-align: left;"> </div><br> </td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="100%" style="font-size: 10px;">&nbsp;</td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding-bottom: 14px;"> <tbody><tr> <td width="30%" style="padding: 10px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Facebook" src="'. base_url() .'img/facebook.png"></a></td> <td align="center"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Twitter" src="'. base_url() .'img/twitter.png"></a></td> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img border="0" style="display: block;" alt="Envelope" src="'. base_url() .'img/envelope.png"></a></td> <td align="center" style="padding-right: 7px;"></td> </tr> </tbody></table> </td> <td width="70%" style="padding: 10px 0; background-color: #343135;" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding-right: 10px; padding-left: 7px; color: #ffffff; font-family: Arial,Helvetica,sans-serif; font-size: 10px; line-height: 14px; text-align: left;">You have received this email cause you have subscribed to Physio plus tech<br> &copy; 2013 Your Company</td> </tr> </tbody></table> </td> </tr> </tbody></table> </td> </tr> </tbody></table></td> </tr> </tbody></table>';	
		return $html;
	}
	public function forgetPasswordTemplate($info) {
		$html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="background-color: #e4e7e0;"> <tbody><tr> <td width="100%"> <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: 0 auto; padding: 0;" class="mobile"> <tbody><tr> <td width="100%"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 5px 0; color: #000000; font-family: Arial,Helvetica,sans-serif; font-size: 11px; font-weight: light; line-height: 15px;">Password recovered successfully. </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="45%" style="padding: 7px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="font: 26px impact; color: #fff;">Physio Plus Tech<!--<img width="174" height="34" border="0" style="display: block;" alt="Logo" src="logo.png" class="imageScale">--></td> </tr> </tbody></table> </td> <td width="55%" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 2px 15px; background-color: #23a6bd; color: #ffffff; font-family: Impact; font-size: 25px; line-height: 29px;">Password Recovered Successfully</td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff; padding: 20px 0 10px 0;"> <tbody><tr> <td class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding: 15px 0 0 0;"> <tbody><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"> <div style="color: #130f0e; font-size: 14px; font-weight: bold; line-height: 21px; text-align: left;">Dear '.$info['ClientName'].',</div><br> <div style="color: #130f0e; font-size: 14px; line-height: 21px; margin-left:30px">Your password is : <strong>'.$info['Password'].'</strong></div><br> <div style="color: #130f0e; font-size: 14px; font-weight: bold; line-height: 21px; text-align: left;">You can login here : </div><br> <div style="color: #130f0e; font-size: 14px; line-height: 21px; margin-left:30px;"><a href=" '.$info['LoginUrl'].' ">'.$info['LoginUrl'].'</a></div><br><div style="color: #AAAAAA; font-size: 11px; font-weight: bold; line-height: 17px; text-align: right; border-top:1px solid #eee; padding-top:10px; margin-top:10px"></div> </td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="100%" style="font-size: 10px;">&nbsp;</td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding-bottom: 14px;"> <tbody><tr> <td width="30%" style="padding: 10px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Facebook" src="'. base_url() .'img/facebook.png"></a></td> <td align="center"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Twitter" src="'. base_url() .'img/twitter.png"></a></td> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img border="0" style="display: block;" alt="Envelope" src="'. base_url() .'img/envelope.png"></a></td> <td align="center" style="padding-right: 7px;"></td> </tr> </tbody></table> </td> <td width="70%" style="padding: 10px 0; background-color: #343135;" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding-right: 10px; padding-left: 7px; color: #ffffff; font-family: Arial,Helvetica,sans-serif; font-size: 10px; line-height: 14px; text-align: left;">You have received this email cause you have subscribed to Physio plus tech<br> &copy; 2013 Your Company</td> </tr> </tbody></table> </td> </tr> </tbody></table> </td> </tr> </tbody></table></td> </tr> </tbody></table>';	
		return $html;
	}
	
	//forget password details sent to staff
	public function forgetPasswordTemplateStaff($info) {
		$html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="background-color: #e4e7e0;"> <tbody><tr> <td width="100%"> <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: 0 auto; padding: 0;" class="mobile"> <tbody><tr> <td width="100%"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 5px 0; color: #000000; font-family: Arial,Helvetica,sans-serif; font-size: 11px; font-weight: light; line-height: 15px;">Password recovered successfully. </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="45%" style="padding: 7px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="font: 26px impact; color: #fff;">Physio Plus Tech<!--<img width="174" height="34" border="0" style="display: block;" alt="Logo" src="logo.png" class="imageScale">--></td> </tr> </tbody></table> </td> <td width="55%" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 2px 15px; background-color: #23a6bd; color: #ffffff; font-family: Impact; font-size: 25px; line-height: 29px;">Password Recovered Successfully</td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff; padding: 20px 0 10px 0;"> <tbody><tr> <td class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding: 15px 0 0 0;"> <tbody><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"> <div style="color: #130f0e; font-size: 14px; font-weight: bold; line-height: 21px; text-align: left;">Dear User,</div><br> <div style="color: #130f0e; font-size: 14px; line-height: 21px; margin-left:30px">Your password is : <strong>'.$info['Password'].'</strong></div><br> <div style="color: #130f0e; font-size: 14px; font-weight: bold; line-height: 21px; text-align: left;">You can login here : </div><br> <div style="color: #130f0e; font-size: 14px; line-height: 21px; margin-left:30px;"><a href=" '.$info['LoginUrl'].' ">'.$info['LoginUrl'].'</a></div><br><div style="color: #AAAAAA; font-size: 11px; font-weight: bold; line-height: 17px; text-align: right; border-top:1px solid #eee; padding-top:10px; margin-top:10px"></div> </td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="100%" style="font-size: 10px;">&nbsp;</td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding-bottom: 14px;"> <tbody><tr> <td width="30%" style="padding: 10px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Facebook" src="'. base_url() .'img/facebook.png"></a></td> <td align="center"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Twitter" src="'. base_url() .'img/twitter.png"></a></td> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img border="0" style="display: block;" alt="Envelope" src="'. base_url() .'img/envelope.png"></a></td> <td align="center" style="padding-right: 7px;"></td> </tr> </tbody></table> </td> <td width="70%" style="padding: 10px 0; background-color: #343135;" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding-right: 10px; padding-left: 7px; color: #ffffff; font-family: Arial,Helvetica,sans-serif; font-size: 10px; line-height: 14px; text-align: left;">You have received this email cause you have subscribed to Physio plus tech<br> &copy; 2013 Your Company</td> </tr> </tbody></table> </td> </tr> </tbody></table> </td> </tr> </tbody></table></td> </tr> </tbody></table>';	
		return $html;
	}
	
	//appoinment details sent to doctor
	public function doctorAppointmentTemplate($info) {
		$html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="background-color: #e4e7e0;"> <tbody><tr> <td width="100%"> <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: 0 auto; padding: 0;" class="mobile"> <tbody><tr> <td width="100%"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 5px 0; color: #000000; font-family: Arial,Helvetica,sans-serif; font-size: 11px; font-weight: light; line-height: 15px;">Appointment email notification. </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="45%" style="padding: 7px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="font: 26px impact; color: #fff;">'. $info['ClinicName'] .'<!--<img width="174" height="34" border="0" style="display: block;" alt="Logo" src="logo.png" class="imageScale">--></td> </tr> </tbody></table> </td> <td width="55%" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 2px 15px; background-color: #23a6bd; color: #ffffff; font-family: Impact; font-size: 25px; line-height: 29px;">APPOINTMENT NOTIFICATION</td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff; padding: 20px 0 10px 0;"> <tbody><tr> <td class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding: 15px 0 0 0;"> <tbody><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"> <div style="color: #130f0e; font-size: 14px; font-weight: bold; line-height: 21px; text-align: left;">Dear '. $info['DoctorName'] .',</div><br> <div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">You have an appointment with <strong>'. $info['PatientName'] .'</strong> at '. $info['ClinicName'] .'.</div><br> <div style="color: #130f0e; font-size: 14px; line-height: 20px; text-align: left;"><strong>on</strong> '. $info['Time'] .' <strong>at</strong> '. $info['Location'] .' </div><br> <div style="color: #AAAAAA; font-size: 11px; font-weight: bold; line-height: 17px; text-align: right; border-top:1px solid #eee; padding-top:10px; margin-top:10px">'. $info['ClinicName'] .',<br />'. $info['Location'] .'<br />'. $info['ClinicMobile'] .' </div> </td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="100%" style="font-size: 10px;">&nbsp;</td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding-bottom: 14px;"> <tbody><tr> <td width="30%" style="padding: 10px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Facebook" src="'. base_url() .'img/facebook.png"></a></td> <td align="center"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Twitter" src="'. base_url() .'img/twitter.png"></a></td> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img border="0" style="display: block;" alt="Envelope" src="'. base_url() .'img/envelope.png"></a></td> <td align="center" style="padding-right: 7px;"></td> </tr> </tbody></table> </td> <td width="70%" style="padding: 10px 0; background-color: #343135;" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding-right: 10px; padding-left: 7px; color: #ffffff; font-family: Arial,Helvetica,sans-serif; font-size: 10px; line-height: 14px; text-align: left;">You have received this email cause you have subscribed to '. $info['ClinicName'] .'.<br> &copy; 2013 Your Company</td> </tr> </tbody></table> </td> </tr> </tbody></table> </td> </tr> </tbody></table></td> </tr> </tbody></table>';	
		return $html;
	}
	
	 public function sentpaypal_events($c_id,$amount,$eventname,$ticket_no,$event_id,$name,$email,$delegate)
    {
		$url = base_url().'confirmation/upgrade_events/'.$c_id.'/'.$amount.'/'.$eventname.'/'.$ticket_no.'/'.$event_id.'/'.$delegate;		
		$admin_logo = base_url().'img/logo.png';
		$this->db->select('first_name,last_name,email,clinic_name')->from('tbl_client')->where('client_id',$c_id);
	    $res = $this->db->get();
	    $f_name = $res->row()->first_name;
		$l_name = $res->row()->last_name;
		$clinic_name = $res->row()->clinic_name;
	    $email1 = $res->row()->email;
		$date = date('d-m-Y');
		$this->load->library('email');
		$this->load->helper('path');
        $this->load->helper('directory'); 
		 $this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'physiotechasia',
				  'smtp_pass' => 'Physioasia@2019',
				  'smtp_port' => 587,
				  'crlf' => "\r\n",
				  'mailtype' => 'html',
				  'newline' => "\r\n"
		  ));
          $path = set_realpath('uploads/mail/');
          $file_names = directory_map($path);
		  $this->email->from('no-reply@physioplustech.com',$clinic_name);
		  	
		$template='<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		  
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="450px" align="center">
									<tr>
										<td align="center">
												<img style="float:left;"  src="https://www.physioplustech.in/img/logo.png">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
													<td colspan = "2">
													<p style="color:#666;padding-left:25px;font-size:120%">Dear '.$f_name.'</p>
													</td>
													
												</tr>
												<tr>
												<td  colspan = "2">
													<p style="color:#666;padding-left:25px;font-size:120%">You have placed an order on http://physioplustech.com </p>
												</td>
												</tr>
												<tr>
													<td  colspan = "2">
														<p style="color:#666;padding-left:25px;font-size:120%">For your convenience, we have included a copy of your order below:</p>
													</td>
												</tr>
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Order Date: '.$date.' </p>
												</td>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Amount  : Rs '.$amount.' </p>
												</td>
												</tr>
												<tr>
													<td colspan="2">
														<p style="color:#666;padding-left:25px;font-size:120%">You may review your invoice history at any time by logging in to your client area.</p>
														<p style="color:#666;padding-left:25px;font-size:120%">This is a no-reply email address. Please do not reply to this email. To contact the sender kindly email to contact@physioplusnetwork.com</p>
													</td>
												</tr>
												<tr>
												<td>
												<a class="iframePopup" data-width="700" data-height="1000" id="viewReport" style="display:block;text-decoration:none;background-color:#095E9A;border:3px solid#d4d4d4;border-radius:3px;color:#fff;text-align:center; padding-top:7px;font-size:17px;margin-left:25px; width:300px; height:30px;" href=" '.$url.' ">Download the Ticket</a>
												</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>';
		
		$this->email->to($email1);
		$this->email->subject($name.' '.'Ticket Confirmation');
		$this->email->message($template);
		$this->email->send();
		
		$template='<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		 
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="450px" align="center">
									<tr>
										<td align="center">
												<img style="float:left;"  src="https://www.physioplustech.in/img/logo.png">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
													<td colspan = "2">
													<p style="color:#666;padding-left:25px;font-size:120%">Dear '.$f_name.'</p>
													</td>
													
												</tr>
												<tr>
												<td  colspan = "2">
													<p style="color:#666;padding-left:25px;font-size:120%">You have placed an order on http://physioplustech.com </p>
												</td>
												</tr>
												<tr>
													<td  colspan = "2">
														<p style="color:#666;padding-left:25px;font-size:120%">For your convenience, we have included a copy of your order below:</p>
													</td>
												</tr>
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Order Date: '.$date.' </p>
												</td>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Amount  : Rs '.$amount.' </p>
												</td>
												</tr>
												<tr>
													
												</tr>
												<tr>
												<td>
												<a class="iframePopup" data-width="700" data-height="1000" id="viewReport" style="display:block;text-decoration:none;background-color:#095E9A;border:3px solid#d4d4d4;border-radius:3px;color:#fff;text-align:center; padding-top:7px;font-size:17px;margin-left:25px; width:300px; height:30px;" href=" '.$url.' ">Download the Ticket</a>
												</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s LAST Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>';
		
		$this->email->to($email);
		$this->email->subject('Ticket Confirmation');
		$this->email->message($template);
		$this->email->send();  
		
		$template='<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		 
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="450px" align="center">
									<tr>
										<td align="center">
												<img style="float:left;"  src="https://www.physioplustech.in/img/logo.png">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
													<td colspan = "2">
													<p style="color:#666;padding-left:25px;font-size:120%">Dear '.$f_name.'</p>
													</td>
													
												</tr>
												<tr>
												<td  colspan = "2">
													<p style="color:#666;padding-left:25px;font-size:120%">You have placed an order on http://physioplustech.com </p>
												</td>
												</tr>
												<tr>
													<td  colspan = "2">
														<p style="color:#666;padding-left:25px;font-size:120%">For your convenience, we have included a copy of your order below:</p>
													</td>
												</tr>
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Order Date: '.$date.' </p>
												</td>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Amount  : Rs '.$amount.' </p>
												</td>
												</tr>
												<tr>
													<td colspan="2">
														<p style="color:#666;padding-left:25px;font-size:120%">You may review your invoice history at any time by logging in to your client area.</p>
														<p style="color:#666;padding-left:25px;font-size:120%">This is a no-reply email address. Please do not reply to this email. To contact the sender kindly email to contact@physioplusnetwork.com</p>
													</td>
												</tr>
												<tr>
												<td>
												<a class="iframePopup" data-width="700" data-height="1000" id="viewReport" style="display:block;text-decoration:none;background-color:#095E9A;border:3px solid#d4d4d4;border-radius:3px;color:#fff;text-align:center; padding-top:7px;font-size:17px;margin-left:25px; width:300px; height:30px;" href=" '.$url.' ">Download the Ticket</a>
												</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>';
		
		$this->email->to('contact@physioplusnetwork.com');
		$this->email->subject($name.' '.'Ticket Confirmation');
		$this->email->message($template);
		$this->email->send();
		return true; 
   }
	
	//referal thanks letter sent to doctors email
	public function referalThanksTemplate($info) {
		$url = base_url().'uploads/logo/'.$info['Logo'];
		$html = '
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#ccc; padding-top:15px; padding-bottom:15px;">
				<tr>
				<td align="center">
				<table width="600" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF;">
				<tr>
				<td>

				</td>
				</tr>
				<tr>
				<td width="250px" align="center" valign="middle" style="background:#FFFFFF;">
				<img src=" '.$url.' " style="width:250px;height:180px;">
				</td>
				<td width="350px" align="left" valign="top" style="background:#0099DC;">
				<p style="font-family: Tahoma, Geneva, sans-serif;
					font-size:130%;
					color:#ffffff;
					text-align:right; 
					padding-top:20px; 
					padding-right:15px; 
					line-height:20px; 
					text-shadow:1px 1px 1px rgba(0, 0, 0, 0.2);">
				<strong>'.$info['ClinicName'].'</strong>
				</p>
				<p style="font-family: Tahoma, Geneva, sans-serif;
					font-size:110%; 
					color:#ffffff; 
					text-align:right; 
					padding-right:15px; 
					line-height:20px;">
				Dr. '.$info['ClientFirstName'].'.,
				</p>
				<p style="font-family: Tahoma, Geneva, sans-serif; 
					font-size:90%; 
					color:#ffffff; 
					text-align:right; 
					padding-right:15px; 
					line-height:5px;">
				'.$info['Address1'].',
				</p>
				<p style="font-family: Tahoma, Geneva, sans-serif; 
					font-size:90%; 
					color:#ffffff; 
					text-align:right; 
					padding-right:15px; 
					line-height:5px;">
				'.$info['City'].' - '.$info['Zipcode'].'.
				</p>
				<p style="font-family: Tahoma, Geneva, sans-serif; 
					font-size:90%; 
					color:#ffffff; 
					text-align:right; 
					padding-right:15px;
					line-height:5px;">
				Cell : '.$info['Mobile'].'
				</p>
				<p style="font-family: Tahoma, Geneva, sans-serif; 
					font-size:90%; 
					color:#ffffff; 
					text-align:right; 
					padding-right:15px; 
					padding-bottom:20px; 
					line-height:5px;">
				Email : '.$info['Email'].'
				</p>
				</td>
				</tr>
				</table>
				<table width="600" border="0" cellspacing="0" cellpadding="0">
				<td width="600px" align="left" valign="top" style="background: #0099DC; /* Old browsers */
																								background:-moz-linear-gradient(center right , #83D9F9 10%, #0099DC 100%) repeat scroll 0 0 transparent;
																								background: -webkit-gradient(linear, left right, left right, color-stop(10%,#83D9F9), color-stop(100%,#0099DC)); /* Chrome,Safari4+ */
																								background: -webkit-linear-gradient(right, #83D9F9 10%,#0099DC 100%); /* Chrome10+,Safari5.1+ */
																								background: -o-linear-gradient(right, #83D9F9 10%,#0099DC 100%); /* Opera11.10+ */
																								background: -ms-linear-gradient(right, #83D9F9 10%,#0099DC 100%); /* IE10+ */
																								filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=#0099DC, endColorstr=#83D9F9,GradientType=0 ); /* IE6-9 */
																								background: linear-gradient(right, #83D9F9 10%,#0099DC 100%); /* W3C */">
				<p style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif; 
					font-size:180%;	
					color:#000000; 
					text-align:right; 
					padding-top:10px; 
					padding-bottom:10px; 
					padding-right:60px; 
					text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);">
				Thanking You...
				</p>
				</td>
				</table>
				<table width="600" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF;">	
				<tr>
				<td>
				<p style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif; 
					font-size:110%;	
					color:#4E5252; 
					text-align:right; 
					padding-top:20px; 
					padding-right:30px;">
				'.$info['Date'].'
				</p>
				</td>
				</tr>
				<tr>
				<td>
				<p style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif; 
					font-size:110%;	
					color:#4E5252; 
					text-align:left; 
					padding-top:20px; 
					padding-left:30px;">
				Sub: Thanks for the referral of
				</p>
				</td>
				</tr>
				<tr>
				<td>
				<p style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif; 
					font-size:105%;	
					color:#E15173; 
					text-align:left; 
					padding-top:10px; 
					padding-left:30px;">
				1. '.$info['Title'].' '.$info['PatientFirstName'].'- '.$info['Age'].' / '.$info['Gender'].'.
				</p>
				</td>
				</tr>
				<tr>
				<td>
				<p style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif; 
					font-size:100%;	
					color:#4E5252; 
					text-align:left; 
					padding-top:25px; 
					padding-left:30px;">
				Dear Dr. '.$info['ReferalName'].',
				</p>
				</td>
				</tr>
				<tr>
				<td>
				<p style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif; 
					font-size:100%;	
					color:#4E5252; 
					text-align:left;
					text-align:justify;
					padding-top:10px; 
					padding-right:35px; 
					line-height:25px; 
					padding-left:30px;">
				I wish to render my sincere thanks for your referrals. I assure you that I will treat your patient appropriately and abide the essence of your skilled practice in showing good results at the earliest possibility.
				</p>
				</td>
				</tr>
				<tr>
				<td>
				<p style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif; 
					font-size:100%;	
					color:#4E5252; 
					text-align:left; 
					padding-top:30px; 
					padding-left:30px;">
				Sincerely,
				</p>
				</td>
				</tr>
				<tr>
				<td>
				<p style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif; 
					font-size:100%;	
					color:#4E5252; 
					text-align:left; 
					padding-top:10px; 
					padding-left:30px;">
				Dr. '.$info['ClientFirstName'].',
				</p>
				<br>
				</td>
				</tr>
				<tr>
				<td style="background:#0099DC; width:600px; height:15px; text-align:left; vertical-align:bottom;">
				</td>
				</tr>
				</table>    
				</td>
				</tr>
			</table>
		
		
		';
		return $html;
	}
	public function referalThanksTemplate1($info) {
		$url = base_url().'uploads/logo/'.$info['Logo'];
		$html = '
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#ccc; padding-top:15px; padding-bottom:15px;">
				<tr>
				<td align="center">
				<table width="600" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF;">
				<tr>
				<td>

				</td>
				</tr>
				<tr>
				<td width="250px" align="center" valign="middle" style="background:#FFFFFF;">
				<img src=" '.$url.' ">
				</td>
				<td width="350px" align="left" valign="top" style="background:#0099DC;">
				<p style="font-family: Tahoma, Geneva, sans-serif;
					font-size:130%;
					color:#ffffff;
					text-align:right; 
					padding-top:20px; 
					padding-right:15px; 
					line-height:20px; 
					text-shadow:1px 1px 1px rgba(0, 0, 0, 0.2);">
				<strong>'.$info['ClinicName'].'</strong>
				</p>
				<p style="font-family: Tahoma, Geneva, sans-serif;
					font-size:110%; 
					color:#ffffff; 
					text-align:right; 
					padding-right:15px; 
					line-height:20px;">
				Dr. '.$info['ClientFirstName'].' '.$info['ClientLastName'].'.,
				</p>
				<p style="font-family: Tahoma, Geneva, sans-serif; 
					font-size:90%; 
					color:#ffffff; 
					text-align:right; 
					padding-right:15px; 
					line-height:5px;">
				'.$info['Address1'].',
				</p>
				<p style="font-family: Tahoma, Geneva, sans-serif; 
					font-size:90%; 
					color:#ffffff; 
					text-align:right; 
					padding-right:15px; 
					line-height:5px;">
				'.$info['City'].' - '.$info['Zipcode'].'.
				</p>
				<p style="font-family: Tahoma, Geneva, sans-serif; 
					font-size:90%; 
					color:#ffffff; 
					text-align:right; 
					padding-right:15px;
					line-height:5px;">
				Cell : '.$info['Mobile'].'
				</p>
				<p style="font-family: Tahoma, Geneva, sans-serif; 
					font-size:90%; 
					color:#ffffff; 
					text-align:right; 
					padding-right:15px; 
					padding-bottom:20px; 
					line-height:5px;">
				Email : '.$info['Email'].'
				</p>
				</td>
				</tr>
				</table>
				<table width="600" border="0" cellspacing="0" cellpadding="0">
				<td width="600px" align="left" valign="top" style="background: #0099DC; /* Old browsers */
																								background:-moz-linear-gradient(center right , #83D9F9 10%, #0099DC 100%) repeat scroll 0 0 transparent;
																								background: -webkit-gradient(linear, left right, left right, color-stop(10%,#83D9F9), color-stop(100%,#0099DC)); /* Chrome,Safari4+ */
																								background: -webkit-linear-gradient(right, #83D9F9 10%,#0099DC 100%); /* Chrome10+,Safari5.1+ */
																								background: -o-linear-gradient(right, #83D9F9 10%,#0099DC 100%); /* Opera11.10+ */
																								background: -ms-linear-gradient(right, #83D9F9 10%,#0099DC 100%); /* IE10+ */
																								filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=#0099DC, endColorstr=#83D9F9,GradientType=0 ); /* IE6-9 */
																								background: linear-gradient(right, #83D9F9 10%,#0099DC 100%); /* W3C */">
				<p style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif; 
					font-size:180%;	
					color:#000000; 
					text-align:right; 
					padding-top:10px; 
					padding-bottom:10px; 
					padding-right:60px; 
					text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);">
				Thanking You...
				</p>
				</td>
				</table>
				<table width="600" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF;">	
				<tr>
				<td>
				<p style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif; 
					font-size:110%;	
					color:#4E5252; 
					text-align:right; 
					padding-top:20px; 
					padding-right:30px;">
				'.$info['Date'].'
				</p>
				</td>
				</tr>
				
				<tr>
				<td>
				<p style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif; 
					font-size:100%;	
					color:#4E5252; 
					text-align:left; 
					padding-top:25px; 
					padding-left:30px;">
				   Dear Dr. '.$info['ReferalName'].',
				</p>
				</td>
				</tr>
				<tr>
				<td>
				<p style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif; 
					font-size:100%;	
					color:#4E5252; 
					text-align:left;
					text-align:justify;
					padding-top:10px; 
					padding-right:35px; 
					line-height:25px; 
					padding-left:30px;">
				It was indeed very thoughtful of you to have advised '.$info['Title'].' '.$info['PatientFirstName'].' '.$info['PatientLastName'].' to visit us in connection with the therapy required by your friend.
				</p>
				</td>
				</tr>
				<tr>
				<td>
				<p style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif; 
					font-size:100%;	
					color:#4E5252; 
					text-align:left;
					text-align:justify;
					padding-top:10px; 
					padding-right:35px; 
					line-height:25px; 
					padding-left:30px;">
				While it reflects your faith in the competence of MobiPhysio, it also reminds us of our added responsibility that you have put on our shoulders.
				</p>
				</td>
				</tr>
								<tr>
				<td>
				<p style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif; 
					font-size:100%;	
					color:#4E5252; 
					text-align:left;
					text-align:justify;
					padding-top:10px; 
					padding-right:35px; 
					line-height:25px; 
					padding-left:30px;">
				We will do our very best for '.$info['Title'].' '.$info['PatientFirstName'].' '.$info['PatientLastName'].'.
				</p>
				</td>
				</tr>
				<tr><td>&nbsp;&nbsp;</td></tr>
				<tr>
				<td>
				<p style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif; 
					font-size:100%;	
					color:#4E5252; 
					text-align:left;
					text-align:justify;
					padding-top:10px; 
					padding-right:35px; 
					line-height:25px; 
					padding-left:30px;">
				Thanks once again.
				</p>
				</td>
				</tr>
				<tr>
				<td style="background:#0099DC; width:600px; height:15px; text-align:left; vertical-align:bottom;">
				</td>
				</tr>
				</table>    
				</td>
				</tr>
			</table>
		
		
		';
		return $html;
	}
	
	//invoice sent to patient email
	public function patientInvoiceTemplate($info)
	{
		$admin_logo = base_url().'img/logo.png';
		$client_logo = base_url().'uploads/logo/'.$info['Logo'];
		$url = base_url().'client/emailviews/invoices/'.$info['billId'].'/'.$info['clientId'];
		$template = '
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="570px" align="center">
									<tr>
										<td align="center">
											<img style="float:left;" src=" '.$admin_logo.' ">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
													<td>
														<img style=" float:right; width:200px; margin-top:15px; margin-right:15px;" src=" '.$client_logo.' ">
													</td>
												</tr>
												<tr>
													<td>
														<h1 style=" font-size:24px; color:#666; padding-left:25px;">Hello '.$info['patientName'].',</h1>
														<p style=" color:#666; padding-left:25px;"><span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$info['ClinicName'].'</span> has sent you an invoice.</p>
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">Invoice payable on or before :<span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;"> '.date("F j, Y",strtotime($info['dueDate'])).'</span></p>
														<p style="color:#666;padding-left:25px;font-size:120%">Invoice amount :<span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;"> Rs. '.$info['netAmt'].'</span></p>
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">Total amount of paid :<span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;"> Rs. '.$info['paidAmt'].'</span></p>
														<p style="color:#666;padding-left:25px;font-size:120%">Amount outstanding :<span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;"> Rs. '.$info['pendingAmt'].'</span></p>
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">Message from <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$info['ClinicName'].' :</span></p>
														<p style="color:#666;padding-left:25px;font-size:120%">Invoice Due</p>
													</td>
												</tr>
												<tr>
													<td width="275px">
														<table>
															<tr>
																<td>
																<a style="display:block;text-decoration:none;background-color:#095E9A;border:3px solid 						#d4d4d4;border-radius:3px;color:#fff;text-align:center; padding-top:7px;font-size:17px;															margin-left:25px; width:300px; height:30px;" href=" '.$url.' ">View the Invoice</a>
																</td>
															</tr>
															<tr>
															</tr>
														</table>
														<br>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>
		';
		return $template;
	}
	
	//reg. information intemate to admin
	public function regInformationTemplate($info)
	{
		$admin_logo = base_url().'img/logo.png';
		$template = '
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="570px" align="center">
									<tr>
										<td align="center">
											<img style="float:left;" src=" '.$admin_logo.' ">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
													<td>
														<h1 style=" font-size:24px; color:#666; padding-left:25px;">Hello Admin,</h1>
														<p style=" color:#666; padding-left:25px;"><span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$info['ClientName'].'</span> has registered on '.$info['LastLoginDate'].'.</p>
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">Name : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;"> '.$info['ClientName'].'</span></p>
														<p style="color:#666;padding-left:25px;font-size:120%">Clinic Name : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$info['ClinicName'].'</span></p>
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">City : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$info['City'].'</span></p>
														<p style="color:#666;padding-left:25px;font-size:120%">Coupon Code : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$info['coupon_code'].'</span></p>
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">User name : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$info['UserName'].'</span></p>
														<p style="color:#666;padding-left:25px;font-size:120%">Password : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$info['Password'].'</span></p>
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">Mobile No : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$info['MobileNo'].'</span></p>
														<p style="color:#666;padding-left:25px;font-size:120%">Phone No : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$info['PhoneNo'].'</span></p>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>
		';
		return $template;
	}
	
	//newsletter subscription details sent to subscriper email
	public function subscriptionTemplate()
	{
		$admin_logo = base_url().'img/logo.png';
		$facebook_img = base_url().'images/facebook.png';
		$twitter_img = base_url().'images/twitter.png';
		$template = '
			<table width="100%"  style="font-family: Times New Roman, Times, serif; background:#0099DC; font-size:13px;">
			<tr>
				<td align="center">
					<table align="center" style="width:600px;">
						<tr>
							<td style="width:200px; background:#0099DC; height:100px; float:left;">
								<img src=" '.$admin_logo.' " style="width:200px;">
							</td>
							<td style="width:390px; height:100px; float:right;">
								<p style="color:#fff; margin-top:25px; font-size:18px; text-align:center; line-height:25px;">India`s First Web-based Clinic Management Software for Physiotherapists by Physiotherapists</p>
							</td>
						</tr>
						<tr bgcolor="#FFFFFF" style="margin-top:-5px;">
							<td>
								<table bgcolor="#E6E6E6" style="margin:20px 20px 20px 20px; width:600px ">
									<tr>
										<td>
								<p style="color:#2E2E2E; margin-top:25px; font-size:16px; text-align:left; line-height:25px; padding-left:15px;"> Hi Subscribers,</p>
								<p  style="color:#2E2E2E; margin-top:25px; font-size:16px; text-align:left; line-height:25px; padding-left:15px;">We`re thrilled you`ve signed up for our Email Newsletters.</p>
								<p style="color:#2E2E2E; margin-top:25px; font-size:16px; text-align:left; line-height:25px; padding-left:15px;">We here at <strong>Physio Plus Tech</strong> strive to provide the best and most informative content aroundso we figured we`d Start Now.</p>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<table style="width:100%; height:100px; background:#FFFFFF;">
									<tr>
										<td style="width:400px;">
										<p style="color:#2E2E2E; margin-top:25px; font-size:17px; text-align:left; line-height:25px; padding-left:25px;">For even more goodness, check us out on</p>
										</td>
										<td style="width:100px;" align="center">
											<a href="https://www.facebook.com/physiosoftware"><img src=" '.$facebook_img.' " style="width:60px; height:60px; margin-right:10px;"></a>
										</td>
										<td style="width:100px;" align="center">
											<a href="https://twitter.com/PHYSIOPLUSchain"><img src=" '.$twitter_img.' " style="width:60px; height:60px; margin-right:50px;"></a>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td align="center">
								<p style="color:#ccc; text-align:center;">Copyright © 2013 Physio Plus Tech. All Rights Reserved.</p>
								<a style="color:#ccc;" href="#">www.physioplustech.in</a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		';
		return $template;
	}
	
	//location info sent to admin email
	public function locationInfoTemplate($info)
	{
		$admin_logo = base_url().'img/logo.png';
		$client_logo = base_url().'uploads/logo/'.$info['Logo'];
		$url = base_url().'client/dashboard/login';
		$template = '
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="570px" align="center">
									<tr>
										<td align="center">
											<img style="float:left;" src=" '.$admin_logo.' ">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
													<td>
														<img style=" float:right; width:200px; margin-top:15px; margin-right:15px;" src=" '.$client_logo.' ">
													</td>
												</tr>
												<tr>
													<td>
														<h1 style=" font-size:24px; color:#666; padding-left:25px;">Dear '.$info['ClientName'].',</h1>
														<p style=" color:#666; padding-left:50px;padding-right:20px"><span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$info['ClinicName'].'</span> has created an admin login for the branch of <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$info['BranchName'].'</span> with <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">Physio Plus Tech.</span></p>
														<p style=" color:#666; padding-left:50px;padding-right:20px"><span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">Click the following link :</span></p>
														<p style=" color:#666; padding-left:50px;padding-right:20px"><span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;"><a href=" '.$url.' "></a>'.$url.'</span></p>
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:50px;font-size:120%"><span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">Login with :</span></p>
														<p style="color:#666;padding-left:75px;font-size:120%">Username : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;"> '.$info['UserName'].'</span></p>
														<p style="color:#666;padding-left:75px;font-size:120%">Password : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;"> '.$info['Password'].'</span></p>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>
		';
		return $template;
	}
	
	public function exespdftemplate($info,$verifycode,$status,$client_id){
		$name = $this->input->post('name');
		$pat_name = explode('/',$name);
		//$admin_logo = 'https://www.physioplustech.in/img/logo.png';
			if($client_id != ''){
			$this->db->where('client_id',$client_id);
			} else {
				$this->db->where('client_id',$this->session->userdata('client_id'));
			}
			$this->db->select('*')->from('tbl_client');
			$res = $this->db->get();
			$clinic_name = $res->row()->clinic_name;
			$info1 = $res->row()->logo;
			$admin_logo1 = base_url().'uploads/logo/'.$info1;
			
		$template = '
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="570px" align="center">
									<tr>
										<td align="center">
											<img style="float:left;" height="101" width="229" src=" '.$admin_logo1.' ">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
													<td>
														<h1 style=" font-size:24px; color:#666; padding-left:25px;">Hello '.$pat_name[0].',</h1>
														<p style=" color:#666; padding-left:25px;"><span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">We have created a home exercise program for you.</p>
														<!--<p style=" color:#666; padding-left:25px;"><span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">Your exercise code is : '.$status.'-'.$verifycode.'</p>--> 
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">Please visit:</p>
														<p style="color:#666;padding-left:25px;font-size:120%">This Link : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$info.'</span></p>
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">If the above is not a clickable link, please copy and paste the URL in your browser address bar to visit your exercise page.</p>
														<p style="color:#666;padding-left:25px;font-size:120%">This is a no-reply email address. Please do not reply to this email. The sender email address is contact@physioplusnetwork.com</p>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>
		';
		return $template;
	}
	public function exespdftemplate_default($info,$verifycode,$status,$client_id){
		$name = $this->input->post('name');
		$pat_name = explode('/',$name);
		//$admin_logo = 'https://www.physioplustech.in/img/logo.png';
			if($client_id != ''){
			$this->db->where('client_id',$client_id);
			} else {
				$this->db->where('client_id',$this->session->userdata('client_id'));
			}
			$this->db->select('*')->from('tbl_client');
			$res = $this->db->get();
			$clinic_name = $res->row()->clinic_name;
			$info1 = $res->row()->logo;
			$admin_logo1 = base_url().'uploads/logo/'.$info1;
			
		$template = '
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="570px" align="center">
									<tr>
										<td align="center">
											<img style="float:left;" height="101" width="229" src=" '.$admin_logo1.' ">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
													<td>
														<h1 style=" font-size:24px; color:#666; padding-left:25px;">Hello '.$pat_name[0].',</h1>
														<p style=" color:#666; padding-left:25px;"><span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">We have created a home exercise program for you.</p>
														<!--<p style=" color:#666; padding-left:25px;"><span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">Your exercise code is : '.$status.'-'.$verifycode.'</p>--> 
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">Please visit:</p>
														<p style="color:#666;padding-left:25px;font-size:120%">This Link : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$info.'</span></p>
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">If the above is not a clickable link, please copy and paste the URL in your browser address bar to visit your exercise page.</p>
														<p style="color:#666;padding-left:25px;font-size:120%">This is a no-reply email address. Please do not reply to this email. The sender email address is contact@physioplusnetwork.com</p>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>
		';
		return $template;
	}
	public function patienttemplate($url)
 
	{
        $login_url= base_url().'patient/patient/login';
		$this->db->select('*')->from('tbl_client')->where('client_id',$this->session->userdata('client_id'));
	    $res = $this->db->get();
	    $clinic_name = $res->row()->clinic_name;
		$info = $res->row()->logo;
		//$admin_logo = base_url().'img/logo.png';
        $admin_logo = base_url().'uploads/logo/'.$info;

		$template = '

		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">

		<tr>

		<td align="center">

		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">

			<tr>

				<td>

					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">

						<tr>

							<td>

								<table width="570px" align="center">

									<tr>

										<td align="center">

											<img style="float:left; width:120px; height:120px;"  src=" '.$admin_logo.' ">

										</td>

									 </tr>

									<tr>

										<td>

											<table width="570px" align="center" bgcolor="#FFFFFF">

												<tr>

													<td>

														<h1 style=" font-size:24px; color:#666; padding-left:25px;">Dear Patient,</h1>

														<p style=" color:#666; padding-left:25px;"><span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">Your '.$clinic_name.' Login URL is Below .</p>
														<p style=" color:#666; padding-left:25px;"><span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">Click Here to set your Account Password : '.$url.'</p> 
													</td>

												</tr>

												<tr>

													<td width="275px">

														<p style="color:#666;padding-left:25px;font-size:120%">Please visit:</p>

														<p style="color:#666;padding-left:25px;font-size:120%">This Link : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$login_url.'</span></p>

													</td>

												</tr>

												<tr>

													<td width="275px">

														<p style="color:#666;padding-left:25px;font-size:120%">If the above is not a clickable link, please copy and paste the URL in your browser address bar to visit your exercise page.</p>

														<p style="color:#666;padding-left:25px;font-size:120%">This is a no-reply email address. Please do not reply to this email. The sender email address is contact@physioplusnetwork.com</p>

													</td>

												</tr>

											</table>

										</td>

									</tr>

								</table>

							</td>

						</tr>

					</table>

					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>

					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>

				</td>

			</tr>

		</table>

		</td>

		</tr>

		</table>

		';

		return $template;

	}
	
	public function sendPatientMail($info) {
		$this->load->library('email');
		 $this->email->initialize(array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'smtp.sendgrid.net',
		  'smtp_user' => 'physiotechasia',
		  'smtp_pass' => 'Physioasia@2019',
		  'smtp_port' => 587,
		  'crlf' => "\r\n",
		  'newline' => "\r\n"
		));
		$this->email->from('no-reply@physioplustech.com', 'Physio Plus Tech');
		
		$this->db->select('*')->from('tbl_client')->where('client_id',$this->session->userdata('client_id'));
	    $res = $this->db->get();
	    $clinic_name = $res->row()->clinic_name;
		$email = array(
			'html' => $info['message'], //Consider using a view file
			'subject' => $info['subject'],
			'from_email' => 'no-reply@physioplustech.com',
			'from_name' => 'Physio Plus Tech',
			'to' => array(array('email' => $info['to'] )) //Check documentation for more details on this one
		);
		
		$this->email->clear(); // Clear previous cache
     	$this->email->from('no-reply@physioplustech.com', $clinic_name); // from no-reply@physioplustech.com
		$this->email->to($info['to']);
		$this->email->subject($info['subject']);
		$this->email->message($info['message']);
		$this->email->send();
			
	}
	
	public function forgettemplate($url)

	{

		$admin_logo = base_url().'patient/img/email-img/forgot.jpg';

		$template = '

		<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody><tr><td height="30"></td></tr>
<tr bgcolor="#F1F2F7">
<td align="center" bgcolor="#F1F2F7" valign="top" width="100%">

<!--  top header -->
<table class="container" align="center" border="0" cellpadding="0" cellspacing="0" width="600">
    <tbody>
    <tr bgcolor="7087A3"><td height="15"></td></tr>

    <tr bgcolor="7087A3">
        <td align="center">
            <table class="container-middle" align="center" border="0" cellpadding="0" cellspacing="0" width="560">
                <tbody><tr>
                    <td>
                        <table class="top-header-left" align="left" border="0" cellpadding="0" cellspacing="0">
                            <tbody><tr>
                                <td align="center">
                                    <table class="date" border="0" cellpadding="0" cellspacing="0">
                                        <tbody><tr>
                                            <td>
                                                <img  style="display: block;" src="'.base_url().'patient/img/email-img/icon-cal.png" alt="icon 1" width="13">
                                            </td>
                                            <td>&nbsp;&nbsp;</td>
                                            <td style="color: #fefefe; font-size: 11px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;">
                                                <singleline>
                                                    '.date("F j, Y, g:i a").'
                                                </singleline>
                                            </td>
                                        </tr>

                                        </tbody></table>
                                </td>
                            </tr>
                            </tbody></table>

                        
                    </td>
                </tr>
                </tbody></table>
        </td>
    </tr>

    <tr bgcolor="7087A3"><td height="10"></td></tr>

    </tbody>
</table>

<!--  end top header  -->


<!-- main content -->
<table class="container" align="center"  border="0" cellpadding="0" cellspacing="0" width="600" bgcolor="ffffff">


<!--Header-->
<tbody><tr ><td height="40"></td></tr>

<tr>
    <td>
        <table class="container-middle" align="center" border="0" cellpadding="0" cellspacing="0" width="560">
            <tbody><tr>
                <td>
                    <table class="logo" align="center" border="0" cellpadding="0" cellspacing="0">
                        <tbody><tr>
                            <td align="center">
                                <a href="" style="display: block;"><img  style="display: block;" src="'.$admin_logo.'" alt="logo" width="500"></a>
                            </td>
                        </tr>
                        </tbody></table>

                </td>
            </tr>
            </tbody></table>
    </td>
</tr>

<tr ><td height="40"></td></tr>
<!-- end header -->


<!-- main section -->
<tr>
    <td>
        <table class="container-middle" align="center" border="0" cellpadding="0" cellspacing="0" width="560">


            <tr ><td height="7"></td></tr>

            <tr ><td height="20"></td></tr>

            <tr >
                <td>
                    <table class="mainContent" align="center" border="0" cellpadding="0" cellspacing="0" width="528">
                        <tbody><tr>
                            <td  class="main-header" style="color: #484848; font-size: 16px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;">

                                Hello,

                            </td>
                        </tr>
                        <tr><td height="20"></td></tr>
                        <tr>
                            <td  class="main-subheader" style="color: #a4a4a4; font-size: 12px; font-weight: normal; line-height:20px; font-family: Helvetica, Arial, sans-serif;">

                                You received this email because you filled out a form on Physioplustech.com indicating that you had forgotten your password. 

                            </td>
                        </tr>

                        </tbody></table>
                </td>
            </tr>

            <tr ><td height="25"></td></tr>


           </table>
    </td>
</tr>
<tr>
    <td>
        <table class="container-middle" align="center" border="0" cellpadding="0" cellspacing="0" width="560" bgcolor="F1F2F7">
            <tr >
                <td>
                    <table class="mainContent" align="center" border="0" cellpadding="0" cellspacing="0" width="528">
                        <tbody><tr><td height="20"></td></tr>
                        <tr>
                            <td>
                                <table class="section-item" align="left" border="0" cellpadding="0" cellspacing="0">
                                    <tbody><tr><td height="6"></td></tr>
                                    <tr>
                                        <td><a href="" style="width: 128px; display: block;"><img style="display: block;" src="'.base_url().'patient/img/email-img/Lock.png" alt="image1" class="section-img" height="auto" width="128"></a></td>
                                    </tr>
                                    <tr><td height="10"></td></tr>
                                    </tbody></table>

                                <table align="left" border="0" cellpadding="0" cellspacing="0">
                                    <tbody><tr><td height="30" width="30"></td></tr>
                                    </tbody></table>

                                <table class="section-item" align="left" border="0" cellpadding="0" cellspacing="0" width="360">
                                    <tbody><tr>
                                        <td style="color: #484848; font-size: 16px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;">

                                            Reset Password

                                        </td>
                                    </tr>
                                    <tr><td height="15"></td></tr>
                                    <tr>
                                        <td  style="color: #a4a4a4; line-height: 25px; font-size: 12px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;">

                                           Please Click Here

                                        </td>
                                    </tr>
                                    <tr><td height="15"></td></tr>
                                    <tr>
                                        <td>
                                            <a href="'.$url.'" target="_blank" style="background-color: #7087A3; font-size: 12px; padding: 10px 15px; color: #fff; text-decoration: none"> RECOVER PASSWORD</a>
                                        </td>
                                    </tr>
                                    </tbody></table>
                            </td>
                        </tr>

                        <tr><td height="20"></td></tr>

                        </tbody></table>
                </td>
            </tr>
            </table>
    </td>
</tr>
<tr>
    <td>
        <table class="container-middle" align="center" border="0" cellpadding="0" cellspacing="0" width="560">
            <tr >
                <td>
                    <table class="mainContent" align="center" border="0" cellpadding="0" cellspacing="0" width="528">
                        <tbody><tr><td height="20"></td></tr>
                        <tr>
                            <td>
                                <table class="section-item" align="left" border="0" cellpadding="0" cellspacing="0" width="360">
                                    <tbody>
                                    
                                    <tr>
                                        <td height="15"></td>
                                    </tr>
                                    <tr>
                                        <td style="color: #a4a4a4; line-height: 25px; font-size: 12px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;">

                                           If a new window does not open automatically please copy the URL below and paste it in your browser to manually complete the process. 

                                        </td>
                                    </tr>
                                    <tr><td height="15"></td></tr>
                                    <tr>
                                        <td>
                                            '.$url.'
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                            </td>
                        </tr>
                        </tbody></table>
                </td>
            </tr>
          </table>
    </td>
</tr>
<tr>
    <td>
        <table class="container-middle" align="center" border="0" cellpadding="0" cellspacing="0" width="560">
            <tbody><tr>
                <td>
                    <table class="nav" align="center" border="0" cellpadding="0" cellspacing="0">
                        <tbody><tr><td height="10"></td></tr>
                        <tr>
                            <td  style="font-size: 13px; font-family: Helvetica, Arial, sans-serif;" align="center">
                                <table align="center" border="0" cellpadding="0" cellspacing="0">
                                    <tbody><tr>
                                        <td>
                                            <a style="display: block; width: 16px;" href="#"><img  style="display: block;" src="'.base_url().'patient/img/email-img/social-google.png" alt="google plus" width="16"></a>
                                        </td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td>
                                            <a style="display: block; width: 16px;" href="#"><img  style="display: block;" src="'.base_url().'patient/img/email-img/social-youtube.png" alt="youtube" width="16"></a>
                                        </td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td>
                                            <a style="display: block; width: 16px;" href="#"><img style="display: block;" src="'.base_url().'patient/img/email-img/social-facebook.png" alt="facebook" width="16"></a>
                                        </td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td>
                                            <a style="display: block; width: 16px;" href="#"><img  style="display: block;" src="'.base_url().'patient/img/email-img/social-twitter.png" alt="twitter" width="16"></a>
                                        </td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td>
                                            <a style="display: block; width: 16px;" href="#"><img  style="display: block;" src="'.base_url().'patient/img/email-img/social-linkedin.png" alt="linkedin" width="16"></a>
                                        </td>
                                    </tr>
                                    </tbody></table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            </tbody></table>
    </td>
</tr>
<tr><td height="35"></td></tr>
<!-- end prefooter  -->
</tbody></table>
<!--end main Content -->
<!-- footer -->
<table class="container" border="0" cellpadding="0" cellspacing="0" width="600">
    <tbody>
    <tr bgcolor="7087A3">
        <td  style="color: #fff; font-size: 10px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;" align="center">
            Physio Plus Tech  Patient Portal © Copyright 2015 . All Rights Reserved

        </td>
    </tr>

    <tr>
        <td bgcolor="7087A3" height="14"></td>
    </tr>
    </tbody></table>
<!-- end footer-->
</td>
</tr>

<tr><td height="30"></td></tr>

</tbody>
</table>';

		return $template;

	}
	
	public function sendForgetPass($info) {
		$this->load->config('mandrill');
		$this->load->library('mandrill');
		$this->mandrill_ready = NULL;
		try {
			$this->mandrill->init( $this->config->item('mandrill_api_key') );
			$this->mandrill_ready = TRUE;
		} catch(Mandrill_Exception $e) {
			echo $e;
			$this->mandrill_ready = FALSE;
		}
		if($this->mandrill_ready) {

			//Send us some email!

			$email = array(

				'html' => $info['message'], //Consider using a view file

				'subject' => $info['subject'],

				'from_email' => 'no-reply@physioplustech.com',

				'from_name' => 'Physio Plus Tech',

				'to' => array(array('email' => $info['to'] )) //Check documentation for more details on this one

				//'to' => array(array('email' => 'joe@example.com' ),array('email' => 'joe2@example.com' )) //for multiple emails

			);

			$result = $this->mandrill->messages_send($email);

			if($result[0]['status'] == 'sent') {

				// do nothing	

			} else {

				// Email settings to send email

				$this->email->clear(); // Clear previous cache

				//$this->email->set_newline("\r\n");

				$this->email->from('no-reply@physioplustech.com', 'Physio Plus Tech'); // from no-reply@physioplustech.com

				$this->email->to($info['to']);

				$this->email->subject($info['subject']);

				$this->email->message($info['message']);

				$this->email->send();

			}

		} else {

			// Email settings to send email

			$this->email->clear(); // Clear previous cache

			//$this->email->set_newline("\r\n");

			$this->email->from('no-reply@physioplustech.com', 'Physio Plus Tech'); // from no-reply@physioplustech.com

			$this->email->to($info['to']);

			$this->email->subject($info['subject']);

			$this->email->message($info['message']);

			$this->email->send();

		}

	}
	public function sendPDF($info) {
		
			$email = array(
				'html' => $info['message'], //Consider using a view file
				'subject' => $info['subject'],
				'from_email' => 'no-reply@physioplustech.com',
				'from_name' => 'Physio Plus Tech',
				'to' => array(array('email' => $info['to'] )) //Check documentation for more details on this one
				//'to' => array(array('email' => 'joe@example.com' ),array('email' => 'joe2@example.com' )) //for multiple emails
			);
			$result = $this->email->send($email);
			if($result[0]['status'] == 'sent') {
				// do nothing	
			} else {
				// Email settings to send email
				$this->email->clear(); // Clear previous cache
				//$this->email->set_newline("\r\n");
				$this->email->from('no-reply@physioplustech.com',$info['clinic']); // from no-reply@physioplustech.com
				$this->email->to($info['to']);
				$this->email->subject($info['subject']);
				$this->email->message($info['message']);
				$this->email->send();
			}
		
	}
	public function app_mail($name,$email,$date1,$time,$mobile)
	{
		$this->load->library('email');
		$this->load->helper('path');
        $this->load->helper('directory'); 
		 $this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'physiotechasia',
				  'smtp_pass' => 'Physioasia@2019',
				  'smtp_port' => 587,
				  'crlf' => "\r\n",
				  'mailtype' => 'html',
				  'newline' => "\r\n"
		  ));
          $path = set_realpath('uploads/mail/');
          $file_names = directory_map($path);

		$this->email->from('no-reply@physioplustech.com', 'Physio Plus Tech');
	
		$html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="background-color: #e4e7e0;"> <tbody><tr> <td width="100%"> <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: 0 auto; padding: 0;" class="mobile"> <tbody><tr> <td width="100%"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 5px 0; color: #000000; font-family: Arial,Helvetica,sans-serif; font-size: 11px; font-weight: light; line-height: 15px;">Appointment email notification. </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="45%" style="padding: 7px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="font: 26px impact; color: #fff;">Physio Plus Clinic <!--<img width="174" height="34" border="0" style="display: block;" alt="Logo" src="logo.png" class="imageScale">--></td> </tr> </tbody></table> </td> <td width="55%" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 2px 15px; background-color: #23a6bd; color: #ffffff; font-family: Impact; font-size: 25px; line-height: 29px;">APPOINTMENT NOTIFICATION</td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff; padding: 20px 0 10px 0;"> <tbody><tr> <td class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding: 15px 0 0 0;"> <tbody><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"> <div style="color: #130f0e; font-size: 14px; font-weight: bold; line-height: 21px; text-align: left;">Dear '.$name.',</div><br> <div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">We are pleased to confirm your appointment at Physio Plus Clinic.</div><br> <div style="color: #130f0e; font-size: 14px; line-height: 20px; text-align: left;"><strong>on</strong> '.$date1.'  <strong>at</strong> Sivakasi.</div><br> <div style="color: #AAAAAA; font-size: 11px; font-weight: bold; line-height: 17px; text-align: right; border-top:1px solid #eee; padding-top:10px; margin-top:10px">Physio Plus Clinic,<br />Sivakasi<br /> 222603 </div> </td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="100%" style="font-size: 10px;">&nbsp;</td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding-bottom: 14px;"> <tbody><tr> <td width="30%" style="padding: 10px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Facebook" src="'. base_url() .'img/facebook.png"></a></td> <td align="center"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Twitter" src="'. base_url() .'img/twitter.png"></a></td> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img border="0" style="display: block;" alt="Envelope" src="'. base_url() .'img/envelope.png"></a></td> <td align="center" style="padding-right: 7px;"></td> </tr> </tbody></table> </td> <td width="70%" style="padding: 10px 0; background-color: #343135;" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding-right: 10px; padding-left: 7px; color: #ffffff; font-family: Arial,Helvetica,sans-serif; font-size: 10px; line-height: 14px; text-align: left;">You have received this email cause you have subscribed to Physio Plus Clinic<br> &copy; 2013 Your Company</td> </tr> </tbody></table> </td> </tr> </tbody></table> </td> </tr> </tbody></table></td> </tr> </tbody></table>';	
		
				$this->email->to($email);
				$this->email->subject('Physiotherapy Appointment');
				$this->email->message($html);
				$this->email->send();
		
	}
	public function app_det($app_id)
	{
		$this->db->where('appointment_id',$app_id);
		$this->db->select('title,start,har_email')->from('tbl_appointments');
		$res=$this->db->get();
		$title=$res->row()->title;
		$start=$res->row()->start;
		$email=$res->row()->har_email;
		
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('city,state,branch_name,zipcode,clinic_name,mobile')->from('tbl_client');
		$result=$this->db->get();
		$city=$result->row()->city;
		$state=$result->row()->state;
		$branch_name=$result->row()->branch_name;
		$clinicMobile=$result->row()->mobile;
		$zipcode=$result->row()->zipcode;
		$clinic_name=$result->row()->clinic_name;
		
		$this->load->library('email');
		$this->load->helper('path');
        $this->load->helper('directory'); 
		 $this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'physiotechasia',
				  'smtp_pass' => 'Physioasia@2019',
				  'smtp_port' => 587,
				  'mailtype' => 'html',
				  'crlf' => "\r\n",
				  'newline' => "\r\n"
		  ));
          $path = set_realpath('uploads/mail/');
          $file_names = directory_map($path);

		$this->email->from('no-reply@physioplustech.com', $clinic_name);
	
		$html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="background-color: #e4e7e0;"> <tbody><tr> <td width="100%"> <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: 0 auto; padding: 0;" class="mobile"> <tbody><tr> <td width="100%"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 5px 0; color: #000000; font-family: Arial,Helvetica,sans-serif; font-size: 11px; font-weight: light; line-height: 15px;">Appointment email notification. </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="45%" style="padding: 7px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="font: 26px impact; color: #fff;">Physio Plus Clinic <!--<img width="174" height="34" border="0" style="display: block;" alt="Logo" src="logo.png" class="imageScale">--></td> </tr> </tbody></table> </td> <td width="55%" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 2px 15px; background-color: #23a6bd; color: #ffffff; font-family: Impact; font-size: 25px; line-height: 29px;">APPOINTMENT NOTIFICATION</td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff; padding: 20px 0 10px 0;"> <tbody><tr> <td class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding: 15px 0 0 0;"> <tbody><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"> <div style="color: #130f0e; font-size: 14px; font-weight: bold; line-height: 21px; text-align: left;">Dear '.$title.',</div><br> <div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">You have an appointment with '.$title.' at '.$clinic_name.'.</div><br> <div style="color: #130f0e; font-size: 14px; line-height: 20px; text-align: left;"><strong>on</strong> '.$start.'<strong>For details</strong> '.$clinicMobile.'</div><br> <div style="color: #AAAAAA; font-size: 11px; font-weight: bold; line-height: 17px; text-align: right; border-top:1px solid #eee; padding-top:10px; margin-top:10px">Physio Plus Clinic,<br />Sivakasi<br /> 222603 </div> </td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="100%" style="font-size: 10px;">&nbsp;</td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding-bottom: 14px;"> <tbody><tr> <td width="30%" style="padding: 10px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Facebook" src="'. base_url() .'img/facebook.png"></a></td> <td align="center"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Twitter" src="'. base_url() .'img/twitter.png"></a></td> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img border="0" style="display: block;" alt="Envelope" src="'. base_url() .'img/envelope.png"></a></td> <td align="center" style="padding-right: 7px;"></td> </tr> </tbody></table> </td> <td width="70%" style="padding: 10px 0; background-color: #343135;" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding-right: 10px; padding-left: 7px; color: #ffffff; font-family: Arial,Helvetica,sans-serif; font-size: 10px; line-height: 14px; text-align: left;">You have received this email cause you have subscribed to Physio Plus Clinic<br> &copy; 2013 Your Company</td> </tr> </tbody></table> </td> </tr> </tbody></table> </td> </tr> </tbody></table></td> </tr> </tbody></table>';	
		$this->email->to($email);
		$this->email->subject('Physiotherapy Appointment');
		$this->email->message($html);
		$this->email->send();
		
	}
	public function app_det1($con_id,$title,$start)
	{
		$this->db->where('staff_id',$con_id);
		$this->db->select('last_name,first_name,email')->from('tbl_staff_info');
		$res=$this->db->get();
		$first_name=$res->row()->first_name;
		$last_name=$res->row()->last_name;
		$email=$res->row()->email;
		
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('city,state,branch_name,zipcode,clinic_name,mobile')->from('tbl_client');
		$result=$this->db->get();
		$city=$result->row()->city;
		$state=$result->row()->state;
		$branch_name=$result->row()->branch_name;
		$clinic_name=$result->row()->clinic_name;
		$clinicMobile=$result->row()->mobile;
		$zipcode=$result->row()->zipcode;
		$this->load->library('email');
		$this->load->helper('path');
        $this->load->helper('directory'); 
		 $this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'physiotechasia',
				  'smtp_pass' => 'Physioasia@2019',
				  'smtp_port' => 587,
				  'crlf' => "\r\n",
				  'mailtype' => 'html',
				  'newline' => "\r\n"
		  ));
          $path = set_realpath('uploads/mail/');
          $file_names = directory_map($path);

		$this->email->from('no-reply@physioplustech.com', 'Physio Plus Tech');
	
		$html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="background-color: #e4e7e0;"> <tbody><tr> <td width="100%"> <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: 0 auto; padding: 0;" class="mobile"> <tbody><tr> <td width="100%"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 5px 0; color: #000000; font-family: Arial,Helvetica,sans-serif; font-size: 11px; font-weight: light; line-height: 15px;">Appointment email notification. </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="45%" style="padding: 7px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="font: 26px impact; color: #fff;">Physio Plus Clinic <!--<img width="174" height="34" border="0" style="display: block;" alt="Logo" src="logo.png" class="imageScale">--></td> </tr> </tbody></table> </td> <td width="55%" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 2px 15px; background-color: #23a6bd; color: #ffffff; font-family: Impact; font-size: 25px; line-height: 29px;">APPOINTMENT NOTIFICATION</td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff; padding: 20px 0 10px 0;"> <tbody><tr> <td class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding: 15px 0 0 0;"> <tbody><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"> <div style="color: #130f0e; font-size: 14px; font-weight: bold; line-height: 21px; text-align: left;">Dear '.$first_name.' '.$last_name.',</div><br> <div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">You have an appointment with '.$title.' at '.$clinic_name.'.</div><br> <div style="color: #130f0e; font-size: 14px; line-height: 20px; text-align: left;"><strong>on</strong> '.$start.'<strong>For details</strong> '.$clinicMobile.'</div><br> <div style="color: #AAAAAA; font-size: 11px; font-weight: bold; line-height: 17px; text-align: right; border-top:1px solid #eee; padding-top:10px; margin-top:10px">Physio Plus Clinic,<br />Sivakasi<br /> 222603 </div> </td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="100%" style="font-size: 10px;">&nbsp;</td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding-bottom: 14px;"> <tbody><tr> <td width="30%" style="padding: 10px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Facebook" src="'. base_url() .'img/facebook.png"></a></td> <td align="center"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Twitter" src="'. base_url() .'img/twitter.png"></a></td> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img border="0" style="display: block;" alt="Envelope" src="'. base_url() .'img/envelope.png"></a></td> <td align="center" style="padding-right: 7px;"></td> </tr> </tbody></table> </td> <td width="70%" style="padding: 10px 0; background-color: #343135;" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding-right: 10px; padding-left: 7px; color: #ffffff; font-family: Arial,Helvetica,sans-serif; font-size: 10px; line-height: 14px; text-align: left;">You have received this email cause you have subscribed to Physio Plus Clinic<br> &copy; 2013 Your Company</td> </tr> </tbody></table> </td> </tr> </tbody></table> </td> </tr> </tbody></table></td> </tr> </tbody></table>';	
		
				$this->email->to($email);
				$this->email->subject('Physiotherapy Appointment');
				$this->email->message($html);
				$this->email->send();
				return true;
		
	}
	public function upgrade_reports_Plan($c_id,$val,$total,$duration,$user,$num_location,$total_sms_limit,$plan)
	{
		$this->db->select('first_name,last_name')->from('tbl_client')->where('client_id',$c_id);
		$res = $this->db->get();
		$f_name = $res->row()->first_name;
		$l_name = $res->row()->last_name;
		$date = date('d-m-y');
		$this->load->library('email');
		$this->load->helper('path');
        $this->load->helper('directory'); 
		 $this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'physiotechasia',
				  'smtp_pass' => 'Physioasia@2019',
				  'smtp_port' => 587,
				  'mailtype' => 'html',
				  'crlf' => "\r\n",
				  'newline' => "\r\n"
		  ));
          $path = set_realpath('uploads/mail/');
          $file_names = directory_map($path);

		$this->email->from('no-reply@physioplustech.com', 'Physio Plus Tech');
		$this->db->select('email')->from('tbl_client')->where('client_id',$c_id);
		$res = $this->db->get();
		$email = $res->row()->email;
		$url = base_url().'confirmation/upgrade_plan/'.$c_id.'/'.$duration.'/'.$user.'/'.$num_location.'/'.$plan.'/'.$total_sms_limit;
		$template = '
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="450px" align="center">
									<tr>
										<td align="center">
												<img style="float:left;"  src="https://www.physioplustech.in/img/logo.png">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Dear '.$f_name.'</p>
												</td>
												</tr>
												<tr>
												<td width="275px">
													<p style="color:#666;padding-left:25px;font-size:120%">This is a payment receipt for Invoice sent on '.$date.'.</p>
												</td>
												</tr>
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%"> Plan Upgrade -<a href="http://www.physioplustech.in/">physioplustech.com</a>-</p>
												</td>
												</tr>
												<tr>  
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">You may review your invoice history at any time by logging in to your client area.</p>
														<p style="color:#666;padding-left:25px;font-size:120%">This is a no-reply email address. Please do not reply to this email. The sender email address is contact@physioplusnetwork.com</p>
													</td>
												</tr>
												<tr>
												<td>
												<a class="iframePopup" data-width="700" data-height="1000" id="viewReport" style="display:block;text-decoration:none;background-color:#095E9A;border:3px solid#d4d4d4;border-radius:3px;color:#fff;text-align:center; padding-top:7px;font-size:17px;margin-left:25px; width:300px; height:30px;" href=" '.$url.' ">Download the Invoice</a>
												</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>  
		</td>
		</tr>
		</table>
		';
		$this->email->to($email);
		$this->email->subject('Invoice Payment Confirmation');
		$this->email->message($template);
		$this->email->send();  
		
		$this->db->select('first_name,last_name')->from('tbl_client')->where('client_id',$c_id);
		$res = $this->db->get();
		$f_name = $res->row()->first_name;
		$l_name = $res->row()->last_name;
		$date = date('d-m-y');
		$this->load->library('email');
		$this->load->helper('path');
        $this->load->helper('directory'); 
		 $this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'physiotechasia',
				  'smtp_pass' => 'Physioasia@2019',
				  'smtp_port' => 587,
				  'mailtype' => 'html',
				  'crlf' => "\r\n",
				  'newline' => "\r\n"
		  ));
          $path = set_realpath('uploads/mail/');
          $file_names = directory_map($path);

		$this->email->from('no-reply@physioplustech.com', 'Physio Plus Tech');
		$this->db->select('total_sms_limit,email')->from('tbl_client')->where('client_id',$c_id);
		$res = $this->db->get();
		$email = $res->row()->email;
		$url = base_url().'confirmation/upgrade_plan/'.$c_id.'/'.$duration.'/'.$user.'/'.$num_location.'/'.$total_sms_limit.'/'.$plan;
		$template = '
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="450px" align="center">
									<tr>
										<td align="center">
												<img style="float:left;"  src="https://www.physioplustech.in/img/logo.png">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Dear '.$f_name.'</p>
												</td>
												</tr>
												<tr>
												<td width="275px">
													<p style="color:#666;padding-left:25px;font-size:120%">This is a payment receipt for Invoice sent on '.$date.'.</p>
												</td>
												</tr>
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%"> Plan Upgrade <a href="http://www.physioplustech.in/">physioplustech.com</a></p>
												</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">You may review your invoice history at any time by logging in to your client area.</p>
														<p style="color:#666;padding-left:25px;font-size:120%">This is a no-reply email address. Please do not reply to this email. The sender email address is contact@physioplusnetwork.com</p>
													</td>
												</tr>
												<tr>
												<td>
												<a class="iframePopup" data-width="700" data-height="1000" id="viewReport" style="display:block;text-decoration:none;background-color:#095E9A;border:3px solid#d4d4d4;border-radius:3px;color:#fff;text-align:center; padding-top:7px;font-size:17px;margin-left:25px; width:300px; height:30px;" href=" '.$url.' ">Download the Invoice</a>
												</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>  
		</td>
		</tr>
		</table>
		';
		$this->email->to('contact@physioplusnetwork.com');
		$this->email->subject('Invoice Payment Confirmation');
		$this->email->message($template);
		$this->email->send();
		return true;  
	}
	
	public function upgrade_reports_user($c_id,$val,$total,$user)
	{
		$this->db->select('first_name,last_name,email')->from('tbl_client')->where('client_id',$c_id);
		$res = $this->db->get();
		$f_name = $res->row()->first_name;
		$l_name = $res->row()->last_name;
		$email = $res->row()->email;
		$date = date('d-m-y');
		$this->load->library('email');
		$this->load->helper('path');
        $this->load->helper('directory'); 
		 $this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'physiotechasia',
				  'smtp_pass' => 'Physioasia@2019',
				  'smtp_port' => 587,
				  'crlf' => "\r\n",
				  'mailtype' => 'html',
				  'newline' => "\r\n"
		  ));
          $path = set_realpath('uploads/mail/');
          $file_names = directory_map($path);
  
		$this->email->from('no-reply@physioplustech.com', 'Physio Plus Tech');
		$url = base_url().'confirmation/upgrade_user/'.$c_id.'/'.$user;
		$template = '
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="450px" align="center">
									<tr>
										<td align="center">
												<img style="float:left;"  src="https://www.physioplustech.in/img/logo.png">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Dear '.$f_name.'</p>
												</td>
												</tr>
												<tr>
												<td width="275px">
													<p style="color:#666;padding-left:25px;font-size:120%">This is a payment receipt for Invoice sent on '.$date.'.</p>
												</td>
												</tr>
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">User Registration <a href="http://www.physioplustech.in/">physioplustech.com</a></p>
												</td>
												</tr>
												<tr>
												<td width="275px">
												
												<p style="color:#666;padding-left:25px;font-size:120%">Paid  : Rs '.$total.'</p>
												</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">You may review your invoice history at any time by logging in to your client area.</p>
														<p style="color:#666;padding-left:25px;font-size:120%">This is a no-reply email address. Please do not reply to this email. The sender email address is contact@physioplusnetwork.com</p>
													</td>
												</tr>
												<tr>
												<td>
												<a class="iframePopup" data-width="700" data-height="1000" id="viewReport" style="display:block;text-decoration:none;background-color:#095E9A;border:3px solid#d4d4d4;border-radius:3px;color:#fff;text-align:center; padding-top:7px;font-size:17px;margin-left:25px; width:300px; height:30px;" href=" '.$url.' ">Download the Invoice</a>
												</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>
		';
		$this->email->to($email);
		$this->email->subject('Invoice Payment Confirmation');
		$this->email->message($template);
		$this->email->send();
		
		$this->db->select('first_name,last_name,email')->from('tbl_client')->where('client_id',$c_id);
		$res = $this->db->get();
		$f_name = $res->row()->first_name;
		$l_name = $res->row()->last_name;
		$email = $res->row()->email;
		$date = date('d-m-y');
		$this->load->library('email');
		$this->load->helper('path');
        $this->load->helper('directory'); 
		 $this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'physiotechasia',
				  'smtp_pass' => 'Physioasia@2019',
				  'smtp_port' => 587,
				  'mailtype' => 'html',
				  'crlf' => "\r\n",
				  'newline' => "\r\n"
		  ));
          $path = set_realpath('uploads/mail/');
          $file_names = directory_map($path);

		$this->email->from('no-reply@physioplustech.com', 'Physio Plus Tech');
		$url = base_url().'confirmation/upgrade_user/'.$c_id.'/'.$user;
		$template = '
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="450px" align="center">
									<tr>
										<td align="center">
												<img style="float:left;"  src="https://www.physioplustech.in/img/logo.png">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Dear '.$f_name.'</p>
												</td>
												</tr>
												<tr>
												<td width="275px">
													<p style="color:#666;padding-left:25px;font-size:120%">This is a payment receipt for Invoice sent on '.$date.'.</p>
												</td>
												</tr>
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">User Registration <a href="http://www.physioplustech.in/">physioplustech.com</a></p>
												</td>
												</tr>
												<tr>
												<td width="275px">
												
												<p style="color:#666;padding-left:25px;font-size:120%">Paid  : Rs '.$total.'</p>
												</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">You may review your invoice history at any time by logging in to your client area.</p>
														<p style="color:#666;padding-left:25px;font-size:120%">This is a no-reply email address. Please do not reply to this email. The sender email address is contact@physioplusnetwork.com</p>
													</td>
												</tr>
												<tr>
												<td>
												<a class="iframePopup" data-width="700" data-height="1000" id="viewReport" style="display:block;text-decoration:none;background-color:#095E9A;border:3px solid#d4d4d4;border-radius:3px;color:#fff;text-align:center; padding-top:7px;font-size:17px;margin-left:25px; width:300px; height:30px;" href=" '.$url.' ">Download the Invoice</a>
												</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>
		';
		$this->email->to('contact@physioplusnetwork.com');
		$this->email->subject('Invoice Payment Confirmation');
		$this->email->message($template);
		$this->email->send();
		return true;
   }
    public function upgrade_reports_location($c_id,$val,$total,$num_location)
	{
		$this->db->select('first_name,last_name,email')->from('tbl_client')->where('client_id',$c_id);
		$res = $this->db->get();
		$f_name = $res->row()->first_name;
		$l_name = $res->row()->last_name;
		$email = $res->row()->email;
		$date = date('d-m-y');
		$this->load->library('email');
		$this->load->helper('path');
        $this->load->helper('directory'); 
		 $this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'physiotechasia',
				  'smtp_pass' => 'Physioasia@2019',
				  'smtp_port' => 587,
				  'mailtype' => 'html',
				  'crlf' => "\r\n",
				  'newline' => "\r\n"
		  ));
          $path = set_realpath('uploads/mail/');
          $file_names = directory_map($path);

		$this->email->from('no-reply@physioplustech.com', 'Physio Plus Tech');
		$url = base_url().'confirmation/upgrade_location/'.$c_id.'/'.$num_location;
		$template = '
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="450px" align="center">
									<tr>
										<td align="center">
												<img style="float:left;"  src="https://www.physioplustech.in/img/logo.png">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Dear '.$f_name.'</p>
												</td>
												</tr>
												<tr>
												<td width="275px">
													<p style="color:#666;padding-left:25px;font-size:120%">This is a payment receipt for Invoice sent on '.$date.'.</p>
												</td>
												</tr>
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Location Registration <a href="http://www.physioplustech.in/">physioplustech.com</a></p>
												</td>
												</tr>
												<tr>
												<td width="275px">
												
												<p style="color:#666;padding-left:25px;font-size:120%">Paid  : Rs '.$total.'</p>
												</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">You may review your invoice history at any time by logging in to your client area.</p>
														<p style="color:#666;padding-left:25px;font-size:120%">This is a no-reply email address. Please do not reply to this email. The sender email address is contact@physioplusnetwork.com</p>
													</td>
												</tr>
												<tr>
												<td>
												<a class="iframePopup" data-width="700" data-height="1000" id="viewReport" style="display:block;text-decoration:none;background-color:#095E9A;border:3px solid#d4d4d4;border-radius:3px;color:#fff;text-align:center; padding-top:7px;font-size:17px;margin-left:25px; width:300px; height:30px;" href=" '.$url.' ">Download the Invoice</a>
												</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>
		';
		$this->email->to($email);
		$this->email->subject('Invoice Payment Confirmation');
		$this->email->message($template);
		$this->email->send();
		
		$this->db->select('first_name,last_name,email')->from('tbl_client')->where('client_id',$c_id);
		$res = $this->db->get();
		$f_name = $res->row()->first_name;
		$l_name = $res->row()->last_name;
		$email = $res->row()->email;
		$date = date('d-m-y');
		$this->load->library('email');
		$this->load->helper('path');
        $this->load->helper('directory'); 
		 $this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'physiotechasia',
				  'smtp_pass' => 'Physioasia@2019',
				  'smtp_port' => 587,
				  'mailtype' => 'html',
				  'crlf' => "\r\n",
				  'newline' => "\r\n"
		  ));
          $path = set_realpath('uploads/mail/');
          $file_names = directory_map($path);

		$this->email->from('no-reply@physioplustech.com', 'Physio Plus Tech');
		$url = base_url().'confirmation/upgrade_location/'.$c_id.'/'.$num_location;
		$template = '
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="450px" align="center">
									<tr>
										<td align="center">
												<img style="float:left;"  src="https://www.physioplustech.in/img/logo.png">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Dear '.$f_name.'</p>
												</td>
												</tr>
												<tr>
												<td width="275px">
													<p style="color:#666;padding-left:25px;font-size:120%">This is a payment receipt for Invoice sent on '.$date.'.</p>
												</td>
												</tr>
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Location Registration <a href="http://www.physioplustech.in/">physioplustech.com</a></p>
												</td>
												</tr>
												<tr>
												<td width="275px">
												
												<p style="color:#666;padding-left:25px;font-size:120%">Paid  : Rs '.$total.'</p>
												</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">You may review your invoice history at any time by logging in to your client area.</p>
														<p style="color:#666;padding-left:25px;font-size:120%">This is a no-reply email address. Please do not reply to this email. The sender email address is contact@physioplusnetwork.com</p>
													</td>
												</tr>
												<tr>
												<td>
												<a class="iframePopup" data-width="700" data-height="1000" id="viewReport" style="display:block;text-decoration:none;background-color:#095E9A;border:3px solid#d4d4d4;border-radius:3px;color:#fff;text-align:center; padding-top:7px;font-size:17px;margin-left:25px; width:300px; height:30px;" href=" '.$url.' ">Download the Invoice</a>
												</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>
		';
		$this->email->to('contact@physioplusnetwork.com');
		$this->email->subject('Invoice Payment Confirmation');
		$this->email->message($template);
		$this->email->send();
		return true; 
   }
   public function upgrade_reports_transactional($c_id,$val,$total,$total_sms_limit)
	{
		$this->db->select('email,first_name,last_name')->from('tbl_client')->where('client_id',$c_id);
		$res = $this->db->get();
		$f_name = $res->row()->first_name;
		$l_name = $res->row()->last_name;
		$email = $res->row()->email;
		$date = date('d-m-y');
		$this->load->library('email');
		$this->load->helper('path');
        $this->load->helper('directory'); 
		 $this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'physiotechasia',
				  'smtp_pass' => 'Physioasia@2019',
				  'smtp_port' => 587,
				  'crlf' => "\r\n",
				  'mailtype' => 'html',
				  'newline' => "\r\n"
		  ));
          $path = set_realpath('uploads/mail/');
          $file_names = directory_map($path);

		$this->email->from('no-reply@physioplustech.com', 'Physio Plus Tech');
		$url = base_url().'confirmation/upgrade_transaction/'.$c_id.'/'.$total_sms_limit;
		$template = '
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="450px" align="center">
									<tr>
										<td align="center">
												<img style="float:left;"  src="https://www.physioplustech.in/img/logo.png">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Dear '.$f_name.'</p>
												</td>
												</tr>
												<tr>
												<td width="275px">
													<p style="color:#666;padding-left:25px;font-size:120%">This is a payment receipt for Invoice sent on '.$date.'.</p>
												</td>
												</tr>
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Transactional SMS Limit Registration  <a href="http://www.physioplustech.in/">physioplustech.com</a> </p>
												</td>
												</tr>
												<tr>
												<td width="275px">
												
												<p style="color:#666;padding-left:25px;font-size:120%">Paid  : Rs '.$total.'</p>
												</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">You may review your invoice history at any time by logging in to your client area.</p>
														<p style="color:#666;padding-left:25px;font-size:120%">This is a no-reply email address. Please do not reply to this email. The sender email address is contact@physioplusnetwork.com</p>
													</td>
												</tr>
												<tr>
												<td>
												<a class="iframePopup" data-width="700" data-height="1000" id="viewReport" style="display:block;text-decoration:none;background-color:#095E9A;border:3px solid#d4d4d4;border-radius:3px;color:#fff;text-align:center; padding-top:7px;font-size:17px;margin-left:25px; width:300px; height:30px;" href=" '.$url.' ">Download the Invoice</a>
												</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>
		';
		$this->email->to($email);
		$this->email->subject('Invoice Payment Confirmation');
		$this->email->message($template);
		$this->email->send();
		
		$this->db->select('first_name,last_name')->from('tbl_client')->where('client_id',$c_id);
		$res = $this->db->get();
		$f_name = $res->row()->first_name;
		$l_name = $res->row()->last_name;
		$email = $res->row()->email;
		$date = date('d-m-y');
		$this->load->library('email');
		$this->load->helper('path');
        $this->load->helper('directory'); 
		 $this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'physiotechasia',
				  'smtp_pass' => 'Physioasia@2019',
				  'smtp_port' => 587,
				  'crlf' => "\r\n",
				  'mailtype' => 'html',
				  'newline' => "\r\n"
		  ));
          $path = set_realpath('uploads/mail/');
          $file_names = directory_map($path);

		$this->email->from('no-reply@physioplustech.com', 'Physio Plus Tech');
		$url = base_url().'confirmation/upgrade_transaction/'.$c_id.'/'.$total_sms_limit;
		$template = '
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="450px" align="center">
									<tr>
										<td align="center">
												<img style="float:left;"  src="https://www.physioplustech.in/img/logo.png">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Dear '.$f_name.'</p>
												</td>
												</tr>
												<tr>
												<td width="275px">
													<p style="color:#666;padding-left:25px;font-size:120%">This is a payment receipt for Invoice sent on '.$date.'.</p>
												</td>
												</tr>
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Transactional SMS Limit Registration  <a href="http://www.physioplustech.in/">physioplustech.com</a> </p>
												</td>
												</tr>
												<tr>
												<td width="275px">
												
												<p style="color:#666;padding-left:25px;font-size:120%">Paid  : Rs '.$total.'</p>
												</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">You may review your invoice history at any time by logging in to your client area.</p>
														<p style="color:#666;padding-left:25px;font-size:120%">This is a no-reply email address. Please do not reply to this email. The sender email address is contact@physioplusnetwork.com</p>
													</td>
												</tr>
												<tr>
												<td>
												<a class="iframePopup" data-width="700" data-height="1000" id="viewReport" style="display:block;text-decoration:none;background-color:#095E9A;border:3px solid#d4d4d4;border-radius:3px;color:#fff;text-align:center; padding-top:7px;font-size:17px;margin-left:25px; width:300px; height:30px;" href=" '.$url.' ">Download the Invoice</a>
												</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>
		';
		$this->email->to('contact@physioplusnetwork.com');
		$this->email->subject('Invoice Payment Confirmation');
		$this->email->message($template);
		$this->email->send();
		return true;
   }
   public function upgrade_reports_promotional($c_id,$val,$total,$psms_limit)
	{
		$this->db->select('email,first_name,last_name')->from('tbl_client')->where('client_id',$c_id);
		$res = $this->db->get();
		$f_name = $res->row()->first_name;
		$l_name = $res->row()->last_name;
		$email = $res->row()->email;
		$date = date('d-m-y');
		$this->load->library('email');
		$this->load->helper('path');
        $this->load->helper('directory'); 
		 $this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'physiotechasia',
				  'smtp_pass' => 'Physioasia@2019',
				  'smtp_port' => 587,
				  'crlf' => "\r\n",
				  'mailtype' => 'html',
				  'newline' => "\r\n"
		  ));
          $path = set_realpath('uploads/mail/');
          $file_names = directory_map($path);

		$this->email->from('no-reply@physioplustech.com', 'Physio Plus Tech');
		$url = base_url().'confirmation/upgrade_promotion/'.$c_id.'/'.$psms_limit;
		$template = '
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="450px" align="center">
									<tr>
										<td align="center">
												<img style="float:left;"  src="https://www.physioplustech.in/img/logo.png">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Dear '.$f_name.'</p>
												</td>
												</tr>
												<tr>
												<td width="275px">
													<p style="color:#666;padding-left:25px;font-size:120%">This is a payment receipt for Invoice sent on '.$date.'.</p>
												</td>
												</tr>
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Promotional SMS Limit Registration  <a href="http://www.physioplustech.in/">physioplustech.com</a> </p>
												</td>
												</tr>
												<tr>
												<td width="275px">
												
												<p style="color:#666;padding-left:25px;font-size:120%">Paid  : Rs '.$total.'</p>
												</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">You may review your invoice history at any time by logging in to your client area.</p>
														<p style="color:#666;padding-left:25px;font-size:120%">This is a no-reply email address. Please do not reply to this email. The sender email address is contact@physioplusnetwork.com</p>
													</td>
												</tr>
												<tr>
												<td>
												<a class="iframePopup" data-width="700" data-height="1000" id="viewReport" style="display:block;text-decoration:none;background-color:#095E9A;border:3px solid#d4d4d4;border-radius:3px;color:#fff;text-align:center; padding-top:7px;font-size:17px;margin-left:25px; width:300px; height:30px;" href=" '.$url.' ">Download the Invoice</a>
												</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>
		';
		$this->email->to($email);
		$this->email->subject('Invoice Payment Confirmation');
		$this->email->message($template);
		$this->email->send();
		
		$this->db->select('first_name,last_name')->from('tbl_client')->where('client_id',$c_id);
		$res = $this->db->get();
		$f_name = $res->row()->first_name;
		$l_name = $res->row()->last_name;
		$email = $res->row()->email;
		$date = date('d-m-y');
		$this->load->library('email');
		$this->load->helper('path');
        $this->load->helper('directory'); 
		 $this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'physiotechasia',
				  'smtp_pass' => 'Physioasia@2019',
				  'smtp_port' => 587,
				  'crlf' => "\r\n",
				  'newline' => "\r\n"
		  ));
		 
          $path = set_realpath('uploads/mail/');
          $file_names = directory_map($path);

		$this->email->from('no-reply@physioplustech.com', 'Physio Plus Tech');
		  $url = base_url().'confirmation/upgrade_promotion/'.$c_id.'/'.$psms_limit;
		$template = '
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="450px" align="center">
									<tr>
										<td align="center">
												<img style="float:left;"  src="https://www.physioplustech.in/img/logo.png">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Dear '.$f_name.'</p>
												</td>
												</tr>
												<tr>
												<td width="275px">
													<p style="color:#666;padding-left:25px;font-size:120%">This is a payment receipt for Invoice sent on '.$date.'.</p>
												</td>
												</tr>
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Promotional SMS Limit Registration  <a href="http://www.physioplustech.in/">physioplustech.com</a> </p>
												</td>
												</tr>
												<tr>
												<td width="275px">
												
												<p style="color:#666;padding-left:25px;font-size:120%">Paid  : Rs '.$total.'</p>
												</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">You may review your invoice history at any time by logging in to your client area.</p>
														<p style="color:#666;padding-left:25px;font-size:120%">This is a no-reply email address. Please do not reply to this email. The sender email address is contact@physioplusnetwork.com</p>
													</td>
												</tr>
												<tr>
												<td>
												<a class="iframePopup" data-width="700" data-height="1000" id="viewReport" style="display:block;text-decoration:none;background-color:#095E9A;border:3px solid#d4d4d4;border-radius:3px;color:#fff;text-align:center; padding-top:7px;font-size:17px;margin-left:25px; width:300px; height:30px;" href=" '.$url.' ">Download the Invoice</a>
												</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>
		';
		$this->email->to('contact@physioplusnetwork.com');
		$this->email->subject('Invoice Payment Confirmation');
		$this->email->message($template);
		$this->email->send();
		return true;
   }
   
  public function upgrade_domainpurchase($c_id,$domain_name,$duration,$total)
	{
		$this->db->select('email,first_name,last_name')->from('tbl_client')->where('client_id',$c_id);
		$res = $this->db->get();
		$f_name = $res->row()->first_name;
		$l_name = $res->row()->last_name;
		$email = $res->row()->email;
		$date = date('d-m-y');
		$this->load->library('email');
		$this->load->helper('path');
        $this->load->helper('directory'); 
		 $this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'physiotechasia',
				  'smtp_pass' => 'Physioasia@2019',
				  'smtp_port' => 587,
				  'mailtype' => 'html',
				  'crlf' => "\r\n",
				  'newline' => "\r\n"
		  ));
          $path = set_realpath('uploads/mail/');
          $file_names = directory_map($path);

		$this->email->from('no-reply@physioplustech.com', 'Physio Plus Tech');
		$url = base_url().'confirmation/upgrade_domain/'.$c_id.'/'.$total;
		$template = '
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="450px" align="center">
									<tr>
										<td align="center">
												<img style="float:left;"  src="https://www.physioplustech.in/img/logo.png">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Dear '.$f_name.'</p>
												</td>
												</tr>
												<tr>
												<td width="275px">
													<p style="color:#666;padding-left:25px;font-size:120%">This is a payment receipt for Invoice sent on '.$date.'.</p>
												</td>
												</tr>
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Domain Registration  <a href="http://www.physioplustech.in/">physioplustech.com</a> </p>
												</td>
												</tr>
												<tr>
												<td width="275px">
												
												<p style="color:#666;padding-left:25px;font-size:120%">Paid  : Rs '.$total.'</p>
												</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">You may review your invoice history at any time by logging in to your client area.</p>
														<p style="color:#666;padding-left:25px;font-size:120%">This is a no-reply email address. Please do not reply to this email. The sender email address is contact@physioplusnetwork.com</p>
													</td>
												</tr>
												<tr>
												<td>
												<a class="iframePopup" data-width="700" data-height="1000" id="viewReport" style="display:block;text-decoration:none;background-color:#095E9A;border:3px solid#d4d4d4;border-radius:3px;color:#fff;text-align:center; padding-top:7px;font-size:17px;margin-left:25px; width:300px; height:30px;" href=" '.$url.' ">Download the Invoice</a>
												</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>
		';
		$this->email->to($email);
		$this->email->subject('Invoice Payment Confirmation');
		$this->email->message($template);
		$this->email->send();
		
		$this->db->select('first_name,last_name')->from('tbl_client')->where('client_id',$c_id);
		$res = $this->db->get();
		$f_name = $res->row()->first_name;
		$l_name = $res->row()->last_name;
		$email = $res->row()->email;
		$date = date('d-m-y');
		$this->load->library('email');
		$this->load->helper('path');
        $this->load->helper('directory'); 
		 $this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'physiotechasia',
				  'smtp_pass' => 'Physioasia@2019',
				  'smtp_port' => 587,
				  'mailtype' => 'html',
				  'crlf' => "\r\n",
				  'newline' => "\r\n"
		  ));
		 
          $path = set_realpath('uploads/mail/');
          $file_names = directory_map($path);

		$this->email->from('no-reply@physioplustech.com', 'Physio Plus Tech');
		 $url = base_url().'confirmation/upgrade_domain/'.$c_id.'/'.$total;
		$template = '
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="450px" align="center">
									<tr>
										<td align="center">
												<img style="float:left;"  src="https://www.physioplustech.in/img/logo.png">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Dear '.$f_name.'</p>
												</td>
												</tr>
												<tr>
												<td width="275px">
													<p style="color:#666;padding-left:25px;font-size:120%">This is a payment receipt for Invoice sent on '.$date.'.</p>
												</td>
												</tr>
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Domain Registration  <a href="http://www.physioplustech.in/">physioplustech.com</a> </p>
												</td>
												</tr>
												<tr>
												<td width="275px">
												
												<p style="color:#666;padding-left:25px;font-size:120%">Paid  : Rs '.$total.'</p>
												</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">You may review your invoice history at any time by logging in to your client area.</p>
														<p style="color:#666;padding-left:25px;font-size:120%">This is a no-reply email address. Please do not reply to this email. The sender email address is contact@physioplusnetwork.com</p>
													</td>
												</tr>
												<tr>
												<td>
												<a class="iframePopup" data-width="700" data-height="1000" id="viewReport" style="display:block;text-decoration:none;background-color:#095E9A;border:3px solid#d4d4d4;border-radius:3px;color:#fff;text-align:center; padding-top:7px;font-size:17px;margin-left:25px; width:300px; height:30px;" href=" '.$url.' ">Download the Invoice</a>
												</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>
		';
		$this->email->to('contact@physioplusnetwork.com');
		$this->email->subject('Invoice Payment Confirmation');
		$this->email->message($template);
		$this->email->send();
		return true;
   }
   public function domainsuccess($c_id,$domain_name,$duration,$total)
   {
	   $url = base_url().'confirmation/upgrade_domain/'.$c_id.'/'.$total;
	   $this->db->select('first_name,last_name')->from('tbl_client')->where('client_id',$c_id);
		$res = $this->db->get();
		$f_name = $res->row()->first_name;
		$l_name = $res->row()->last_name;
		$email = $res->row()->email;
		$date = date('d-m-y');
		$this->load->library('email');
		$this->load->helper('path');
        $this->load->helper('directory'); 
		 $this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'physiotechasia',
				  'smtp_pass' => 'Physioasia@2019',
				  'smtp_port' => 587,
				  'crlf' => "\r\n",
				  'mailtype' => 'html',
				  'newline' => "\r\n"
		  ));
		 
        $path = set_realpath('uploads/mail/');
        $file_names = directory_map($path);
	   $template='<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="450px" align="center">
									<tr>
										<td align="center">
												<img style="float:left;"  src="https://www.physioplustech.in/img/logo.png">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
													<td width="275px">
													<p style="color:#666;padding-left:25px;font-size:120%">Dear '.$f_name.' '.$l_name.'</p>
													</td>
													
												</tr>
												<tr>
												<td width="275px">
													<p style="color:#666;padding-left:25px;font-size:120%">This message is to confirm that your domain purchase has been successful. The details of the domain purchase are below:</p>
												</td>
												</tr>
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Registration Date: '.$date.' </p>
												</td>
												</tr>
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Domain: '.$domain_name.' </p>
												</td>
												</tr>
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Registration Period: '.$duration.' </p>
												</td>
												</tr>
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Amount  : Rs '.$total.'</p>
												</td>
												</tr>
												<tr>
													<td width="275px">
													<p style="color:#666;padding-left:25px;font-size:120%">You may login to your client area at https://www.physioplustech.in/ to manage your new domain.</p>
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">You may review your invoice history at any time by logging in to your client area.</p>
														<p style="color:#666;padding-left:25px;font-size:120%">This is a no-reply email address. Please do not reply to this email. The sender email address is contact@physioplusnetwork.com</p>
													</td>
												</tr>
												<tr>
												<td>
												<a class="iframePopup" data-width="700" data-height="1000" id="viewReport" style="display:block;text-decoration:none;background-color:#095E9A;border:3px solid#d4d4d4;border-radius:3px;color:#fff;text-align:center; padding-top:7px;font-size:17px;margin-left:25px; width:300px; height:30px;" href=" '.$url.' ">Download the Invoice</a>
												</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>';
		
		$this->email->to('contact@physioplusnetwork.com');
		$this->email->subject('Invoice Payment Confirmation');
		$this->email->message($template);
		$this->email->send();
		return true;
   }
   public function sentpaypal($c_id,$amount,$order)
   {
		$url = base_url().'confirmation/upgrade_exercise/'.$c_id.'/'.$amount.'/'.$order;		
		$admin_logo = base_url().'img/logo.png';
		$this->db->select('first_name,last_name,email,clinic_name')->from('tbl_client')->where('client_id',$c_id);
	    $res = $this->db->get();
	    $f_name = $res->row()->first_name;
		$l_name = $res->row()->last_name;
		$clinic_name = $res->row()->clinic_name;
	    $email = $res->row()->email;
		$date = date('d-m-Y');
		$this->load->library('email');
		$this->load->helper('path');
        $this->load->helper('directory'); 
		 $this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'physiotechasia',
				  'smtp_pass' => 'Physioasia@2019',
				  'smtp_port' => 587,
				  'crlf' => "\r\n",
				  'mailtype' => 'html',
				  'newline' => "\r\n"
		  ));
          $path = set_realpath('uploads/mail/');
          $file_names = directory_map($path);
		  $this->email->from('no-reply@physioplustech.com',$clinic_name);
		  	
		  $template='<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		  
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="450px" align="center">
									<tr>
										<td align="center">
												<img style="float:left;"  src="https://www.physioplustech.in/img/logo.png">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
													<td colspan = "2">
													<p style="color:#666;padding-left:25px;font-size:120%">Dear '.$f_name.'</p>
													</td>
													
												</tr>
												<tr>
												<td  colspan = "2">
													<p style="color:#666;padding-left:25px;font-size:120%">You have received an order on http://physioplustech.com </p>
												</td>
												</tr>
												<tr>
													<td  colspan = "2">
														<p style="color:#666;padding-left:25px;font-size:120%">For your convenience, we have included a copy of your order below:</p>
													</td>
												</tr>
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Order Date: '.$date.' </p>
												</td>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Amount  : Rs '.$amount.' </p>
												</td>
												</tr>
												<tr>
													<td colspan="2">
														<p style="color:#666;padding-left:25px;font-size:120%">You may review your invoice history at any time by logging in to your client area.</p>
														<p style="color:#666;padding-left:25px;font-size:120%">This is a no-reply email address. Please do not reply to this email. The sender email address is contact@physioplusnetwork.com</p>
													</td>
												</tr>
												<tr>
												<td>
												<a class="iframePopup" data-width="700" data-height="1000" id="viewReport" style="display:block;text-decoration:none;background-color:#095E9A;border:3px solid#d4d4d4;border-radius:3px;color:#fff;text-align:center; padding-top:7px;font-size:17px;margin-left:25px; width:300px; height:30px;" href=" '.$url.' ">Download the Invoice</a>
												</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>';
		
		$this->email->to($email);
		$this->email->subject('Invoice Confirmation');
		$this->email->message($template);
		$this->email->send();
		
		 $template='<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		  
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="450px" align="center">
									<tr>
										<td align="center">
												<img style="float:left;"  src="https://www.physioplustech.in/img/logo.png">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
													<td colspan = "2">
													<p style="color:#666;padding-left:25px;font-size:120%">Dear '.$f_name.'</p>
													</td>
													
												</tr>
												<tr>
												<td  colspan = "2">
													<p style="color:#666;padding-left:25px;font-size:120%">You have received an order on http://physioplustech.com </p>
												</td>
												</tr>
												<tr>
													<td  colspan = "2">
														<p style="color:#666;padding-left:25px;font-size:120%">For your convenience, we have included a copy of your order below:</p>
													</td>
												</tr>
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Order Date: '.$date.' </p>
												</td>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Amount  : Rs '.$amount.' </p>
												</td>
												</tr>
												<tr>
													<td colspan="2">
														<p style="color:#666;padding-left:25px;font-size:120%">You may review your invoice history at any time by logging in to your client area.</p>
														<p style="color:#666;padding-left:25px;font-size:120%">This is a no-reply email address. Please do not reply to this email. The sender email address is contact@physioplusnetwork.com</p>
													</td>
												</tr>
												<tr>
												<td>
												<a class="iframePopup" data-width="700" data-height="1000" id="viewReport" style="display:block;text-decoration:none;background-color:#095E9A;border:3px solid#d4d4d4;border-radius:3px;color:#fff;text-align:center; padding-top:7px;font-size:17px;margin-left:25px; width:300px; height:30px;" href=" '.$url.' ">Download the Invoice</a>
												</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>';
		
		$this->email->to('contact@physioplusnetwork.com');
		$this->email->subject('Invoice Confirmation');
		$this->email->message($template);
		$this->email->send();
		return true;
   } 
   public function sentpaypal_patient($c_id,$amount,$p_id)
   {
	    $order="Exercise Prescription";
		$url = base_url().'confirmation/upgrade_exercise/'.$c_id.'/'.$amount.'/'.$order;		
		$this->db->select('clinic_name,logo')->from('tbl_client')->where('client_id',$c_id);
	    $res = $this->db->get();
	    $clinic_name = $res->row()->clinic_name;
		$info = $res->row()->logo;
		$admin_logo = base_url().'uploads/logo/'.$info;
		$this->db->select('first_name,last_name,email')->from('tbl_patient_info')->where('patient_id',$p_id);
	    $res = $this->db->get();
	    $f_name = $res->row()->first_name;
		$l_name = $res->row()->last_name;
		$email = $res->row()->email;
		$date = date('d-m-y');
		$this->load->library('email');
		$this->load->helper('path');
        $this->load->helper('directory'); 
		 $this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'physiotechasia',
				  'smtp_pass' => 'Physioasia@2019',
				  'smtp_port' => 587,
				  'crlf' => "\r\n",
				  'mailtype' => 'html',
				  'newline' => "\r\n"
		  ));
          $path = set_realpath('uploads/mail/');
          $file_names = directory_map($path);
		  $this->email->from('no-reply@physioplustech.com',$clinic_name);
		  	
		  $template='<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		  
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="450px" align="center">
									<tr>
										<td align="center">
												<img style="float:left;"  src="https://www.physioplustech.in/img/logo.png">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
													<td colspan = "2">
													<p style="color:#666;padding-left:25px;font-size:120%">Dear '.$f_name.'</p>
													</td>
													
												</tr>
												<tr>
												<td  colspan = "2">
													<p style="color:#666;padding-left:25px;font-size:120%">You have received an exercise prescription on http://physioplustech.com </p>
												</td>
												</tr>
												<tr>
													<td  colspan = "2">
														<p style="color:#666;padding-left:25px;font-size:120%">For your convenience, we have included a copy of your order below:</p>
													</td>
												</tr>
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Prescription Date: '.$date.' </p>
												</td>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Amount  : Rs '.$amount.' </p>
												</td>
												</tr>
												<tr>
													<td colspan="2">
														
														<p style="color:#666;padding-left:25px;font-size:120%">This is a no-reply email address. Please do not reply to this email. The sender email address is contact@physioplusnetwork.com</p>
													</td>
												</tr>
												<tr>
												<td>
												<a class="iframePopup" data-width="700" data-height="1000" id="viewReport" style="display:block;text-decoration:none;background-color:#095E9A;border:3px solid#d4d4d4;border-radius:3px;color:#fff;text-align:center; padding-top:7px;font-size:17px;margin-left:25px; width:300px; height:30px;" href=" '.$url.' ">Download the Invoice</a>
												</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>';
		
		$this->email->to($email);
		$this->email->subject('Invoice Confirmation');
		$this->email->message($template);
		$this->email->send();
   }
   public function sentapp_paypal_patient($name,$har_email,$c_id,$amount)
   {	    
	    $today=date('Y-m-d');
		$title = $name;
		$email = $har_email;
		$order = "Online Appointment";
		$url = base_url().'confirmation/upgrade_exercise/'.$c_id.'/'.$amount.'/'.$order;		
		$this->db->select('clinic_name,logo')->from('tbl_client')->where('client_id',$c_id);
	    $res = $this->db->get();
	    $clinic_name = $res->row()->clinic_name;
		$info = $res->row()->logo;
		$admin_logo = base_url().'uploads/logo/'.$info;
		 
		$date = date('d-m-y');
		$this->load->library('email');
		$this->load->helper('path');
        $this->load->helper('directory'); 
		 $this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'physiotechasia',
				  'smtp_pass' => 'Physioasia@2019',
				  'smtp_port' => 587,
				  'crlf' => "\r\n",
				  'newline' => "\r\n"
		  ));
          $path = set_realpath('uploads/mail/');
          $file_names = directory_map($path);
		  $this->email->from('no-reply@physioplustech.com',$clinic_name);
		  	
		  $template='<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		  
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="450px" align="center">
									<tr>
										<td align="center">
												<img style="float:left;"  src="https://www.physioplustech.in/img/logo.png">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
													<td colspan = "2">
													<p style="color:#666;padding-left:25px;font-size:120%">Dear '.$title.'</p>
													</td>
													
												</tr>
												<tr>
												<td  colspan = "2">
													<p style="color:#666;padding-left:25px;font-size:120%">You have received an invoice for online Appointments on http://physioplustech.com </p>
												</td>
												</tr>
												<tr>
													<td  colspan = "2">
														<p style="color:#666;padding-left:25px;font-size:120%">For your convenience, we have included a copy of your order below:</p>
													</td>
												</tr>
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Prescription Date: '.$date.' </p>
												</td>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Amount  : Rs '.$amount.' </p>
												</td>
												</tr>
												<tr>
													<td colspan="2">
														
														<p style="color:#666;padding-left:25px;font-size:120%">This is a no-reply email address. Please do not reply to this email. The sender email address is contact@physioplusnetwork.com</p>
													</td>
												</tr>
												<tr>
												<td>
												<a class="iframePopup" data-width="700" data-height="1000" id="viewReport" style="display:block;text-decoration:none;background-color:#095E9A;border:3px solid#d4d4d4;border-radius:3px;color:#fff;text-align:center; padding-top:7px;font-size:17px;margin-left:25px; width:300px; height:30px;" href=" '.$url.' ">Download the Invoice</a>
												</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>';
		
		$this->email->to($email);
		$this->email->subject('Invoice Confirmation');
		$this->email->message($template);
		$this->email->send();
		
   }
   public function sentapp_paypal_patient1($c_id,$amount,$p_id)
   {	    
	    $today=date('Y-m-d');
		$this->db->where('patient_id',$p_id);
		$this->db->where('client_id',$c_id);
		$this->db->select('email,first_name,last_name')->from('tbl_patient_info');
		$res = $this->db->get();
		$title = $res->row()->first_name.' '.$res->row()->last_name;
		$email = $res->row()->email;
		$order = "Invoice";
		$url = base_url().'confirmation/upgrade_exercise/'.$c_id.'/'.$amount.'/'.$order;		
		$this->db->select('clinic_name,logo')->from('tbl_client')->where('client_id',$c_id);
	    $res = $this->db->get();
	    $clinic_name = $res->row()->clinic_name;
		$info = $res->row()->logo;
		$admin_logo = base_url().'uploads/logo/'.$info;
		 
		$date = date('d-m-y');
		$this->load->library('email');
		$this->load->helper('path');
        $this->load->helper('directory'); 
		 $this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'physiotechasia',
				  'smtp_pass' => 'Physioasia@2019',
				  'smtp_port' => 587,
				  'mailtype' => 'html',
				  'crlf' => "\r\n",
				  'newline' => "\r\n"
		  ));
          $path = set_realpath('uploads/mail/');
          $file_names = directory_map($path);
		  $this->email->from('no-reply@physioplustech.com',$clinic_name);
		  	
		  $template='<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		  
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="450px" align="center">
									<tr>
										<td align="center">
												<img style="float:left;"  src="https://www.physioplustech.in/img/logo.png">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
													<td colspan = "2">
													<p style="color:#666;padding-left:25px;font-size:120%">Dear '.$title.'</p>
													</td>
													
												</tr>
												<tr>
												<td  colspan = "2">
													<p style="color:#666;padding-left:25px;font-size:120%">You have received an invoice for online Invoice Payments on http://physioplustech.com </p>
												</td>
												</tr>
												<tr>
													<td  colspan = "2">
														<p style="color:#666;padding-left:25px;font-size:120%">For your convenience, we have included a copy of your order below:</p>
													</td>
												</tr>
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Prescription Date: '.$date.' </p>
												</td>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Amount  : Rs '.$amount.' </p>
												</td>
												</tr>
												<tr>
													<td colspan="2">
														
														<p style="color:#666;padding-left:25px;font-size:120%">This is a no-reply email address. Please do not reply to this email. The sender email address is contact@physioplusnetwork.com</p>
													</td>
												</tr>
												<tr>
												<td>
												<a class="iframePopup" data-width="700" data-height="1000" id="viewReport" style="display:block;text-decoration:none;background-color:#095E9A;border:3px solid#d4d4d4;border-radius:3px;color:#fff;text-align:center; padding-top:7px;font-size:17px;margin-left:25px; width:300px; height:30px;" href=" '.$url.' ">Download the Invoice</a>
												</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>';
		
		$this->email->to($email);
		$this->email->subject('Invoice Confirmation');
		$this->email->message($template);
		$this->email->send(); 
   }
   
    public function renewalsend_mail($client_id,$duration)
   {	    
	    $today=date('Y-m-d');
		$this->db->where('client_id',$client_id);
		$this->db->select('email,first_name,last_name,username')->from('tbl_client');
		$res = $this->db->get();
		$title = $res->row()->first_name;
		$email = $res->row()->email;
		$username = $res->row()->username;
		$day = $duration.' '.'days';
		$NewDate=Date('d-m-Y', strtotime($day));
		$order = "Invoice";
		$admin_logo = base_url().'img/logo.png';	 
		$date = date('d-m-y');
		$this->load->library('email');
		$this->load->helper('path');
        $this->load->helper('directory'); 
		$this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'physiotechasia',
				  'smtp_pass' => 'Physioasia@2019',
				  'smtp_port' => 587,
				  'crlf' => "\r\n",
				  'mailtype' => 'html',
				  'newline' => "\r\n"
		  ));
          $path = set_realpath('uploads/mail/');
          $file_names = directory_map($path);
		  $this->email->from('no-reply@physioplustech.com','Physio Plus Tech');
		  	
		  $template='<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		  
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="450px" align="center">
									<tr>
										<td align="center">
												<img style="float:left;"  src="https://www.physioplustech.in/img/logo.png">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
													<td colspan = "2">
													<p style="color:#666;padding-left:25px;font-size:120%">Hi '.$title.'</p>
													</td>
												</tr>
												<tr>
												<td  colspan = "2">
													<p style="color:#666;padding-left:25px;font-size:120%">Just letting you know that you’re Clinic Management Software will expire on '.$NewDate.'</p>
												</td>
												</tr>
												<tr>
													<td  colspan = "2">
														<p style="color:#666;padding-left:25px;font-size:120%">Please recharge your account to avoid inconvenience in services.</p>
													</td>
												</tr>
												<tr>
													<td  colspan = "2"><p style="color:#666;padding-left:25px;font-size:120%">If you are ready to subscribe:</p></td>
												</tr>
												<tr> <td  colspan = "2"><p style="color:#666;padding-left:25px;font-size:120%"><ul><li> Log in to Physioplustech.com. </li></ul></p></td></tr>
												<tr> <td  colspan = "2"><p style="color:#666;padding-left:25px;font-size:120%"><ul><li>  Go to My Account and click on Upgrade. </li></ul></p></td></tr>
												<tr> <td  colspan = "2"><p style="color:#666;padding-left:25px;font-size:120%"><ul><li> select Plan and Duration Details. </li></ul></p></td></tr>
												<tr> <td  colspan = "2"><p style="color:#666;padding-left:25px;font-size:120%"><ul><li>  Confirm the number of users and Transaction Mail that you need. </li></ul></p></td></tr>
												<tr> <td  colspan = "2"><p style="color:#666;padding-left:25px;font-size:120%"><ul><li>  Click on Purchase. </li></ul></p></td></tr>
												<tr> <td  colspan = "2"><p style="color:#666;padding-left:25px;font-size:120%"><ul><li>  Enter your payment details in PayPal. </li></ul></p></td></tr>
												<tr>
												<td  colspan = "2"><p style="color:#666;padding-left:25px;font-size:120%">If you need any help please don’t hesitate to send a message to our friendly team at: contact@physioplusnetwork.com.</p>
												</td></tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>';
		
		$this->email->to($email);
		$this->email->subject('Your Clinic Management Software Will Expire In '.$day.'');
		$this->email->message($template);
		$this->email->send();  
   }
   
   public function certificate($letter_id) {
		$this->db->select('*')->from('tbl_client')->where('client_id',$this->session->userdata('client_id'));
	    $res = $this->db->get();
	    $clinic_name = $res->row()->clinic_name;
		$this->load->library('email');
		$this->load->helper('path');
        $this->load->helper('directory'); 
		 $this->email->initialize(array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'smtp-relay.sendinblue.com',  
		  'smtp_user' => 'info@physioplustech.asia',
		  'smtp_pass' => 'ZYIU5EJ2rMC6d7XO',
		  'smtp_port' => 587,
		  'crlf' => "\r\n",
		  'newline' => "\r\n"
		  ));
		  $path = set_realpath('uploads/mail/');
          $file_names = directory_map($path);
		  $this->email->from('no-reply@physioplustech.com',$clinic_name);
	     $today=date('d-m-Y');
	   $email=$this->input->post('email');
	   $this->db->select('*')->from('tbl_client')->where('client_id',$this->session->userdata('client_id'));
	    $res = $this->db->get();
	    $clinic_name = $res->row()->clinic_name;
		$info = $res->row()->logo;
		$first_name=$res->row()->first_name;
		$last_name=$res->row()->last_name;
		$address=$res->row()->address;
		$city=$res->row()->city;
		$zipcode=$res->row()->zipcode;
		$mobile=$res->row()->mobile;
		$admin_logo = base_url().'uploads/logo/'.$info;
	    $this->db->select('*')->from('tbl_letter')->where('letter_id',$letter_id);
		$res1=$this->db->get();
	    $title=$res1->row()->title;
		$letter=$res1->row()->letter;
		$url = base_url().'uploads/logo/'.$info;
		$html = '
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#ccc; padding-top:15px; padding-bottom:15px;">
				<tr>
				<td align="center">
				<table width="600" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF;">
				<tr>
				<td>

				</td>
				</tr>
				<tr>
				<td width="250px" align="center" valign="middle" style="background:#FFFFFF;">
				<img src=" '.$url.' ">
				</td>
				<td width="350px" align="left" valign="top" style="background:#0099DC;">
				<p style="font-family: Tahoma, Geneva, sans-serif;
					font-size:130%;
					color:#ffffff;
					text-align:right; 
					padding-top:20px; 
					padding-right:15px; 
					line-height:20px; 
					text-shadow:1px 1px 1px rgba(0, 0, 0, 0.2);">
				<strong>'.$clinic_name.'</strong>
				</p>
				<p style="font-family: Tahoma, Geneva, sans-serif;
					font-size:110%; 
					color:#ffffff; 
					text-align:right; 
					padding-right:15px; 
					line-height:20px;">
				Dr. '.$first_name.',
				</p>
				<p style="font-family: Tahoma, Geneva, sans-serif; 
					font-size:90%; 
					color:#ffffff; 
					text-align:right; 
					padding-right:15px; 
					line-height:5px;">
				'.$address.',</br></br>
				</p>
				<p style="font-family: Tahoma, Geneva, sans-serif; 
					font-size:90%; 
					color:#ffffff; 
					text-align:right; 
					padding-right:15px; 
					line-height:5px;">
				'.$city.' - '.$zipcode.'.
				</p>
				<p style="font-family: Tahoma, Geneva, sans-serif; 
					font-size:90%; 
					color:#ffffff; 
					text-align:right; 
					padding-right:15px;
					line-height:5px;">
				Cell : '.$mobile.'
				</p>
				<p style="font-family: Tahoma, Geneva, sans-serif; 
					font-size:90%; 
					color:#ffffff; 
					text-align:right; 
					padding-right:15px; 
					padding-bottom:20px; 
					line-height:5px;">
				Email : '.$email.'
				</p>
				</td>
				</tr>
				</table>
				<table width="600" border="0" cellspacing="0" cellpadding="0">
				<td width="600px" align="left" valign="top" style="background: #0099DC; /* Old browsers */
																								background:-moz-linear-gradient(center right , #83D9F9 10%, #0099DC 100%) repeat scroll 0 0 transparent;
																								background: -webkit-gradient(linear, left right, left right, color-stop(10%,#83D9F9), color-stop(100%,#0099DC)); /* Chrome,Safari4+ */
																								background: -webkit-linear-gradient(right, #83D9F9 10%,#0099DC 100%); /* Chrome10+,Safari5.1+ */
																								background: -o-linear-gradient(right, #83D9F9 10%,#0099DC 100%); /* Opera11.10+ */
																								background: -ms-linear-gradient(right, #83D9F9 10%,#0099DC 100%); /* IE10+ */
																								filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=#0099DC, endColorstr=#83D9F9,GradientType=0 ); /* IE6-9 */
																								background: linear-gradient(right, #83D9F9 10%,#0099DC 100%); /* W3C */">
				<p style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif; 
					font-size:180%;	
					color:#000000; 
					text-align:center; 
					padding-top:10px; 
					padding-bottom:10px; 
					padding-right:60px; 
					text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);">
				'.$title.'
				</p>
				</td>
				</table>
				<table width="600" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF;">	
				<tr>
				<td>
				<p style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif; 
					font-size:110%;	
					color:#4E5252; 
					text-align:right; 
					padding-top:20px; 
					padding-right:30px;">
				Date : '.$today.'
				</p>
				</td>
				</tr>
				
				<tr>
				<td>
                  <p style="font-family:Times New Roman, Arial, Helvetica, sans-serif; 
					font-size:150%;	
					color:rgb(0, 0, 0); 
					text-align:justify;
					padding-top:10px; 
					line-height: 200%;
					text-indent: 70px;
					padding-left:10px;
					padding-right:10px;">
					
				'.$letter.',
				</p>
				</td>
				</tr>
				
				<tr>
				<td>
				<p style="font-family:Times New Roman, Arial, Helvetica, sans-serif; 
					font-size:150%;	
					color:rgb(0, 0, 0); 
					text-align:left;
					padding-top:10px; 
					line-height: 200%;
					padding-left:20px;">
				 Sincerely, 
				 <br>
				'.$first_name.',
				</p>
				</p>
				</td>
				</td>
				
			</table>';
		$this->email->to($email);
		$this->email->subject('Certification Mail');
		$this->email->message($html);
		$this->email->send(); 
	
     }
	 public function app_reg() {
		 $this->load->library('email');
		 $this->email->initialize(array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'smtp.sendgrid.net',
		  'smtp_user' => 'physiotechasia',
		  'smtp_pass' => 'Physioasia@2019',
		  'smtp_port' => 587,
		  'mailtype' => 'html',
		  'crlf' => "\r\n",
		  'newline' => "\r\n"
		));
		$admin_logo = base_url().'img/logo.png';
		$today = date('d-m-Y');
		$template = '
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="570px" align="center">
									<tr>
										<td align="center">
											<img style="float:left;" src=" '.$admin_logo.' ">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
													<td>
														<h1 style=" font-size:24px; color:#666; padding-left:25px;">Hello Admin,</h1>
														<p style=" color:#666; padding-left:25px;"><span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$this->input->post('clinic_name').'</span> has registered on '.$today.'.</p>
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">Name : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;"> '.$this->input->post('first_name').'</span></p>
														<p style="color:#666;padding-left:25px;font-size:120%">Clinic Name : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$this->input->post('clinic_name').'</span></p>
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">Clinic Website : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$this->input->post('clinic_website').'</span></p>
														<p style="color:#666;padding-left:25px;font-size:120%">Address : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$this->input->post('address').'</span></p>
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">Email : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$this->input->post('email').'</span></p>
														<p style="color:#666;padding-left:25px;font-size:120%">Mobile  : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$this->input->post('mobile').'</span></p>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>
		';	
		
		
		$this->email->from('no-reply@physioplustech.com','Physio Plus Tech');
	   	$this->email->to('contact@physioplusnetwork.com');
		$this->email->subject('App Request');
		$this->email->message($template);
		$this->email->send();
		return true;
	 } 
	 public function feedback_app($branch,$name,$email,$message,$mobile,$clinic) {
		 $this->load->library('email');
		 $this->email->initialize(array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'smtp.sendgrid.net',
		  'smtp_user' => 'physiotechasia',
		  'smtp_pass' => 'Physioasia@2019',
		  'mailtype' => 'html',
		  'smtp_port' => 587,
		  'crlf' => "\r\n",
		  'newline' => "\r\n"
		));
		$template = '	
		<table width="100%"  style="font-family:Arial, Helvetica, sans-serif; background:#B45F04; font-size:13px;">
	    <tr>
		<td align="center">
        	<table align="center" style="width:600px;">
            	<tr>
                	<td style="width:200px; background:#B45F04; float:left;">
                    	<img src="'.base_url().'img/logo.png" style="width:200px; height:88px;">
                    </td>
                    <td style="width:390px; height:100px; float:right;">
                    	<p style="color:#fff; margin-top:25px; font-size:15px; text-align:center; line-height:25px;">India`s First Web-based Clinic Management Software for Physiotherapists by Physiotherapists</p>
                    </td>
                </tr>
                <tr bgcolor="#CCCCCC" style="margin-top:-5px;">
                	<td>
                    	<table bgcolor="#FFFFFF" style="margin:20px 20px 20px 20px; width:600px ">
                        	<tr>
                            	<td width="300px;">
                    	<p style="color:#585858; font-family:Times New Roman, Times, serif; font-size:22px; text-align:left; padding-left:20px;"><strong>Feedback</strong></p>
                           		</td>
							</tr>
                            <tr>
                            	<td>
                    				<table>
                                    	<tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">Clinic Name  :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$clinic.'</p>
			                        		</td>
										</tr>
										<tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;"> Name  :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$name.'</p>
			                        		</td>
										</tr>
                                        <tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">E-Mail :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$email.'</p>
			                        		</td>
										</tr>
                                        <tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">Mobile  :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$mobile.'</p>
			                        		</td>
										</tr>
                                        <tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">Message :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$message.'</p>
			                        		</td>
										</tr>
									</table>
                        		</td>
							</tr>
						</table>
                    </td>
				</tr>
				<tr>
                	<td align="center">
                    	<p style="color:#CCCCCC; text-align:center;">Copyright © 2013 Physio Plus Tech. All Rights Reserved.</p>
                        <a style="color:#CCCCCC;" href="http://www.physioplustech.in/"><p>www.physioplustech.in</p></a>
                    </td>
                </tr>
			</table>
		</td>
	</tr>
	</table>';
		
		$this->email->from('no-reply@physioplustech.com','Physio Plus Tech');
	   	$this->email->to('contact@physioplusnetwork.com');
		$this->email->subject('Patient Feedback from'.' '.$clinic);
		$this->email->message($template);
		$this->email->send();
        return $clinic;	
		 
	 }
	  public function feedback_clinic($branch,$name,$email,$message,$mobile,$clinic_email) {
		 $this->load->library('email');
		 $this->email->initialize(array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'smtp.sendgrid.net',
		  'smtp_user' => 'physiotechasia',
		  'smtp_pass' => 'Physioasia@2019',
		  'smtp_port' => 587,
		  'mailtype' => 'html',
		  'crlf' => "\r\n",
		  'newline' => "\r\n"
		));
		$template = '	
		<table width="100%"  style="font-family:Arial, Helvetica, sans-serif; background:#B45F04; font-size:13px;">
	    <tr>
		<td align="center">
        	<table align="center" style="width:600px;">
            	<tr>
                	<td style="width:200px; background:#B45F04; float:left;">
                    	<img src="'.base_url().'img/logo.png" style="width:200px; height:88px;">
                    </td>
                    <td style="width:390px; height:100px; float:right;">
                    	<p style="color:#fff; margin-top:25px; font-size:15px; text-align:center; line-height:25px;">India`s First Web-based Clinic Management Software for Physiotherapists by Physiotherapists</p>
                    </td>
                </tr>
                <tr bgcolor="#CCCCCC" style="margin-top:-5px;">
                	<td>
                    	<table bgcolor="#FFFFFF" style="margin:20px 20px 20px 20px; width:600px ">
                        	<tr>
                            	<td width="300px;">
									<p style="color:#585858; font-family:Times New Roman, Times, serif; font-size:22px; text-align:left; padding-left:20px;"><strong>Feedback</strong></p>
                           		</td>
							</tr>
                            <tr>
                            	<td>
                    				<table>
                                    	<tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;"> Name  :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$name.'</p>
			                        		</td>
										</tr>
                                        <tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">E-Mail :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$email.'</p>
			                        		</td>
										</tr>
                                        <tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">Mobile  :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$mobile.'</p>
			                        		</td>
										</tr>
                                        <tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">Message :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$message.'</p>
			                        		</td>
										</tr>
									</table>
                        		</td>
							</tr>
						</table>
                    </td>
				</tr>
				<tr>
                	<td align="center">
                    	<p style="color:#CCCCCC; text-align:center;">Copyright © 2013 Physio Plus Tech. All Rights Reserved.</p>
                        <a style="color:#CCCCCC;" href="http://www.physioplustech.in/"><p>www.physioplustech.in</p></a>
                    </td>
                </tr>
			</table>
		</td>
	</tr>
	</table>';
		
		$this->email->from('no-reply@physioplustech.com','Physio Plus Tech');
	   	$this->email->to($clinic_email);
		$this->email->subject('Patient Feedback');
		$this->email->message($template);
		$this->email->send();
       return $clinic_email;
	 }
	 
   	public function newsletter($email){
		
		 $this->load->library('email');
		 $this->email->initialize(array(
				'protocol' => 'smtp',
				'smtp_host' => 'smtp.sendgrid.net',
				'smtp_port' => 465,
			  'smtp_user' => 'Pakistanphysioplus', // change it to yours
			  'smtp_pass' => 'smspwd@2016', // change it to yours
			  'mailtype' => 'html',
			  'charset' => 'iso-8859-1',
			  'mailtype' => 'html',
			  'wordwrap' => TRUE
		  
		));
		$this->email->from('no-reply@physioplustech.com', 'Physio Plus Tech');
		
	 $template ='<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background: #ddd;">
<tr>
<td align="center">
<table width="600" border="0" cellspacing="0" cellpadding="0" style="background: #fff;" align="center">
  <tr>
    <td>
    <table width="600" border="0" cellspacing="0" cellpadding="0" align="center">
  	<tr>
    	<td height="30" align="left" valign="middle" style=" background:#1278C6"> <p style="font-size:11px; line-height:14px; font-family: Arial, Helvetica, sans-serif;color:#fff; margin:0 0 0 0; display:block; padding-left: 20px"></p></td>
    </tr>
    <tr>
        <td style="background: #0099DC; /* Old browsers */
        			background:-moz-linear-gradient(center bottom , #ffffff 25%, #0099DC 90%) repeat scroll 0 0 transparent;
        			background: -webkit-gradient(linear, left bottom, left bottom, color-stop(25%,#ffffff), color-stop(90%,#0099DC)); /* Chrome,Safari4+ */
					background: -webkit-linear-gradient(bottom, #ffffff 25%,#0099DC 90%); /* Chrome10+,Safari5.1+ */
					background: -o-linear-gradient(bottom, #ffffff 25%,#0099DC 90%); /* Opera11.10+ */
					background: -ms-linear-gradient(bottom, #ffffff 25%,#0099DC 90%); /* IE10+ */
					background: linear-gradient(bottom, #ffffff 25%,#0099DC 90%);">
					
        <table width="600" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td height="85">
            <table width="600" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td align="left"><img src="https://www.physioplustech.in/images/newsletter/july_13/logo_new.png" width="180" height="80" style=" margin-left:30px;"/></td>
                <td align="right"><p style="font-size:11px; line-height:14px; font-family: Arial, Helvetica, sans-serif;color:#fff; margin:0 0 0 0; display:block; padding-right:13px"><strong>JANUARY 2017</strong></p></td>
            </tr>
            </table>
            </td>
        </tr>
        <tr>
            <td height="274" align="center" valign="top">
            <table width="575" border="0" cellspacing="0" cellpadding="0">
            <tr>
            <td height="265"><img src="http://www.physioevents.com/news_letter/mumbai.png" /></td>
            </tr>
            </table>
            </td>
        </tr>
        </table>
        </td>
    </tr>
</table>
</td>
</tr>
  <tr>
    <td align="center" valign="top"><table width="550" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="550" height="40" align="left" valign="top" style="background: #0099DC; /* Old browsers */
        																background:-moz-linear-gradient(center right , #83D9F9 10%, #0099DC 100%) repeat scroll 0 0 transparent;
        																background: -webkit-gradient(linear, left bottom, left bottom, color-stop(10%,#83D9F9), color-stop(100%,#0099DC)); /* Chrome,Safari4+ */
																		background: -webkit-linear-gradient(bottom, #83D9F9 10%,#0099DC 100%); /* Chrome10+,Safari5.1+ */
																		background: -o-linear-gradient(bottom, #83D9F9 10%,#0099DC 100%); /* Opera11.10+ */
																		background: -ms-linear-gradient(bottom, #83D9F9 10%,#0099DC 100%); /* IE10+ */">
																		<h2 style="font-family: Arial, Helvetica, sans-serif; font-size:130%; padding-left:15px; padding-top:8px; text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2); color:#ffffff;"><center>Indian Academy of Fitness Training</center></h2>
																		
        </td>
      </tr>
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="242" align="left" valign="top"><img src="http://www.physioevents.com/news_letter/image1.png"  style="margin-top:12px" width="220" height="144" alt="" /></td>
            <td align="left" valign="top"><p style="display:block; margin:10px 10px 0 0; font-family: Arial, Helvetica, sans-serif; font-size:12px; line-height:18px; color:#848484;">
<span style="font-family: Arial, Helvetica, sans-serif; font-size:15px; line-height:18px; color:#555656; font-style:italic; xfont-weight:bold">Indian Academy of Fitness Training is committed to bring the best quality fitness training programs at your disposal. </span>
<br>
<br>
<span style="font-family: Arial, Helvetica, sans-serif; font-size:15px; line-height:18px; color:#555656; font-style:italic; xfont-weight:bold"><b>Date Of Event: 14th Jan To 15th Jan 2017</b></br></br>
<b><center>Fee Structure : Rs.8500/-</center></b> </span></p></td>
          </tr>
          <tr>
            <td height="22" align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="50" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="265" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="265" height="40" align="left" valign="top" style="background: #0099DC; /* Old browsers */
                																background:-moz-linear-gradient(center right , #83D9F9 10%, #0099DC 100%) repeat scroll 0 0 transparent;
																                background: -webkit-gradient(linear, left right, left right, color-stop(10%,#83D9F9), color-stop(100%,#0099DC)); /* Chrome,Safari4+ */
																				background: -webkit-linear-gradient(right, #83D9F9 10%,#0099DC 100%); /* Chrome10+,Safari5.1+ */
																				background: -o-linear-gradient(right, #83D9F9 10%,#0099DC 100%); /* Opera11.10+ */
																				background: -ms-linear-gradient(right, #83D9F9 10%,#0099DC 100%); /* IE10+ */">
													<h2 style="font-family:  Arial, Helvetica, sans-serif; font-size:110%; padding-left:20px; padding-top:10px; text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2); color:#ffffff;">Diabetic Fitness Training Courses</h2>							
                </td>
              </tr>
              <tr>
                <td align="left" valign="top">
                
                <ul class="arrowlinks" style="margin-left:10px; list-style-type:none;  padding:0" >
<li style="padding-left:25px; padding-bottom:10px; background:url(https://www.physioplustech.in/images/newsletter/july_13/arrow.png) 0 5px no-repeat; font:12px/18px Arial, Helvetica, sans-serif; color:#848484; text-decoration:none; font-style:courier">Gyrokinesis</li>
<li style="padding-left:25px; padding-bottom:10px; background:url(https://www.physioplustech.in/images/newsletter/july_13/arrow.png) 0 5px no-repeat; font:12px/18px Arial, Helvetica, sans-serif; color:#848484; text-decoration:none; font-style:courier">Tai Chi-basics</li>
<li style="padding-left:25px; padding-bottom:10px; background:url(https://www.physioplustech.in/images/newsletter/july_13/arrow.png) 0 5px no-repeat; font:12px/18px Arial, Helvetica, sans-serif; color:#848484; text-decoration:none; font-style:courier">Class Formation</li>
<li style="padding-left:25px; padding-bottom:10px; background:url(https://www.physioplustech.in/images/newsletter/july_13/arrow.png) 0 5px no-repeat; font:12px/18px Arial, Helvetica, sans-serif; color:#848484; text-decoration:none; font-style:courier">Yoga in Diabetes</li>
<li style="padding-left:25px; padding-bottom:10px; background:url(https://www.physioplustech.in/images/newsletter/july_13/arrow.png) 0 5px no-repeat; font:12px/18px Arial, Helvetica, sans-serif; color:#848484; text-decoration:none; font-style:courier">Strength Training for Diabetes</li>
<li style="padding-left:25px; padding-bottom:10px; background:url(https://www.physioplustech.in/images/newsletter/july_13/arrow.png) 0 5px no-repeat; font:12px/18px Arial, Helvetica, sans-serif; color:#848484; text-decoration:none; font-style:courier">Exercise Specific for different types of Diabetes</li>
<li style="padding-left:25px; padding-bottom:10px; background:url(https://www.physioplustech.in/images/newsletter/july_13/arrow.png) 0 5px no-repeat; font:12px/18px Arial, Helvetica, sans-serif; color:#848484; text-decoration:none; font-style:courier">Ball Exercise in Diabetes</li>
<li style="padding-left:25px; padding-bottom:10px; background:url(https://www.physioplustech.in/images/newsletter/july_13/arrow.png) 0 5px no-repeat; font:12px/18px Arial, Helvetica, sans-serif; color:#848484; text-decoration:none; font-style:courier">Brand Exercise in Diabetes</li>
<li style="padding-left:25px; padding-bottom:10px; background:url(https://www.physioplustech.in/images/newsletter/july_13/arrow.png) 0 5px no-repeat; font:12px/18px Arial, Helvetica, sans-serif; color:#848484; text-decoration:none; font-style:courier">Eye and Oral Care in Diabetes</li>
<li style="padding-left:25px; padding-bottom:10px; background:url(https://www.physioplustech.in/images/newsletter/july_13/arrow.png) 0 5px no-repeat; font:12px/18px Arial, Helvetica, sans-serif; color:#848484; text-decoration:none; font-style:courier">Diet Management for Diabetic patients</li>
</ul>
                
                </td>
              </tr>
            </table></td>
            <td width="20px" align="center" valign="top"></td>
            <td width="265" align="right" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="265" height="40" align="left" valign="top" style="background: #0099DC; /* Old browsers */
                																background:-moz-linear-gradient(center right , #83D9F9 10%, #0099DC 100%) repeat scroll 0 0 transparent;
                																background: -webkit-gradient(linear, left right, left right, color-stop(10%,#83D9F9), color-stop(100%,#0099DC)); /* Chrome,Safari4+ */
																				background: -webkit-linear-gradient(right, #83D9F9 10%,#0099DC 100%); /* Chrome10+,Safari5.1+ */
																				background: -o-linear-gradient(right, #83D9F9 10%,#0099DC 100%); /* Opera11.10+ */
																				background: -ms-linear-gradient(right, #83D9F9 10%,#0099DC 100%); /* IE10+ */">
																				<h2 style="font-family:  Arial, Helvetica, sans-serif; font-size:110%; padding-left:15px; padding-top:10px; text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2); color:#ffffff;">RESOURCE PERSON</h2>
																				     </td>
              </tr>
              <tr>
			   <td align="right" valign="top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<center><img src="http://www.physioevents.com/news_letter/new.png" height="180px" width="180px"></center>
              &nbsp;&nbsp; &nbsp;&nbsp;  <p ><b><center>Dr.Surajeet Chakrabarty</center></b> 
				
</p><p style="font:12px/18px Arial, Helvetica, sans-serif; color:#848484; text-decoration:none; font-style:courier">M.P.T (Musculoskeletal and sports ),MIAP,  Ph.d MASTER PRACTITIONER CERTIFIED
AEROBIC INSTRUCTOR AND PERSONAL TRAINER(I.F.A) Step-kick boxing- Group exercise )
BLS(C.P.R.+A.E.D.)-A.H.A. INDOOR CYCLING SPECIALIST (FITOUR)MEMBER OF N.F.T.A
PRESIDENT OF I.A.F.T
</p>&nbsp;&nbsp;&nbsp;&nbsp;


                 </td>
              </tr>
            </table></td>
			
          </tr>
        </table></td>
      </tr>
	  <tr>
        <td height="50" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="265" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="265" height="40" align="left" valign="top" style="background: #0099DC; /* Old browsers */
                																background:-moz-linear-gradient(center right , #83D9F9 10%, #0099DC 100%) repeat scroll 0 0 transparent;
																                background: -webkit-gradient(linear, left right, left right, color-stop(10%,#83D9F9), color-stop(100%,#0099DC)); /* Chrome,Safari4+ */
																				background: -webkit-linear-gradient(right, #83D9F9 10%,#0099DC 100%); /* Chrome10+,Safari5.1+ */
																				background: -o-linear-gradient(right, #83D9F9 10%,#0099DC 100%); /* Opera11.10+ */
																				background: -ms-linear-gradient(right, #83D9F9 10%,#0099DC 100%); /* IE10+ */">
																				<h2 style="font-family:  Arial, Helvetica, sans-serif; font-size:110%; padding-left:20px; padding-top:10px; text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2); color:#ffffff;">Contact Details</h2>
																				    </td>
              </tr>
              <tr>
                <td align="left" valign="top">
                
               <p><b>Organizing Secretary (Mumbai) :</b></br></br>
			   &nbsp;&nbsp; +91 9821855177 </p></br></br>
			   <p><b>Chief Organizing Secretary :</b> </br></br></br></br>
                &nbsp;&nbsp;&nbsp;Dr.Yagnesh Trivedi - 097246 79701 </br></br></br></br>
				&nbsp;&nbsp;&nbsp;Dr.Darshan Talreja - 078787 59761 </p></br></br></br>
				<ul>
				<li>Limited Seats</li></br>
				<li>Dates and venue are subject  to Change</li></ul>
                </td>
              </tr>
            </table></td>
            <td width="20px" align="center" valign="top"></td>
            <td width="265" align="right" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="265" height="40" align="left" valign="top" style="background: #0099DC; /* Old browsers */
                																background:-moz-linear-gradient(center right , #83D9F9 10%, #0099DC 100%) repeat scroll 0 0 transparent;
                																background: -webkit-gradient(linear, left right, left right, color-stop(10%,#83D9F9), color-stop(100%,#0099DC)); /* Chrome,Safari4+ */
																				background: -webkit-linear-gradient(right, #83D9F9 10%,#0099DC 100%); /* Chrome10+,Safari5.1+ */
																				background: -o-linear-gradient(right, #83D9F9 10%,#0099DC 100%); /* Opera11.10+ */
																				background: -ms-linear-gradient(right, #83D9F9 10%,#0099DC 100%); /* IE10+ */">
																				<h2 style="font-family: Arial, Helvetica, sans-serif; font-size:110%; padding-left:15px; padding-top:10px; text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2); color:#ffffff;">Venue</h2>
																				</td>
              </tr>
              <tr>
			   <td align="right" valign="top"><center>&nbsp;&nbsp;&nbsp;&nbsp;<img src="http://www.physioevents.com/news_letter/venue.jpg" height="280px" width="280px"></center>
              <p  align ="left"><b>Hotel Legend</b></br></br>
			  Plot No.53.Junc of Nehru Road and</br></br>
			   2nd Road,Santacruz,East,Mumbai - 400055.
			  </p>

                </td>
              </tr>
            </table></td>
			
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="15" align="left" valign="top"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="top"><table width="600" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="600" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="75" align="center" valign="middle" style="background:url(https://www.physioplustech.in/images/newsletter/july_13/b_footer.jpg) 0 0 no-repeat"> <p style="font-size:11px; line-height:16px; font-family:  Arial, Helvetica, sans-serif;  color:#969e9b; margin:0 0 0 0; display:block"><img src="http://www.physioevents.com/news_letter/image10.png" height="55px" width="500px">

</p></td>
          </tr>
          <tr>
            <td height="50" align="center" valign="middle" bgcolor="#1278C6"><font color="white">This newsletter is a free contribution by</font></br>
			<a href="http://www.physioevents.com/"  color:#969e9b; text-decoration: none; font-style:normal" target="newtab"><font color="white">www.physioevents.com</font></a></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</td>
</tr>
</table>';
		$this->load->library('email');
		$this->email->to($email); 
		$this->email->subject('Physio Newsletter');
		$this->email->message($template);	
		$this->email->send();

	}
	public function regInformationTemplate1($info)
	{
		$admin_logo = base_url().'img/logo.png';
		$template = '
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="570px" align="center">
									<tr>
										<td align="center">
											<img style="float:left;" src=" '.$admin_logo.' ">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
													<td>
														<h1 style=" font-size:24px; color:#666; padding-left:25px;">Hello Admin,</h1>
														<p style=" color:#666; padding-left:25px;"><span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$info['ClientName'].'</span> has registered on '.$info['LastLoginDate'].'.</p>
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">Name : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;"> '.$info['ClientName'].'</span></p>
														<p style="color:#666;padding-left:25px;font-size:120%">Clinic Name : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$info['ClinicName'].'</span></p>
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">City : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$info['City'].'</span></p>
														<p style="color:#666;padding-left:25px;font-size:120%">User name : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$info['UserName'].'</span></p>
													</td>
												</tr>
												
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">Mobile No : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$info['MobileNo'].'</span></p>
														<p style="color:#666;padding-left:25px;font-size:120%">Phone No : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$info['PhoneNo'].'</span></p>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>
		';
		return $template;
	}
	public function offer_request($branch,$name,$email,$message,$mobile,$clinic_email,$ex_type) {
		 $this->db->where('client_id',$branch);
		 $this->db->select('email')->from('tbl_client');
		 $res = $this->db->get();
		 $clinic_email = $res->row()->email;
		
		 $this->load->library('email');
		 $this->email->initialize(array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'smtp.sendgrid.net',
		  'smtp_user' => 'physiotechasia',
		  'smtp_pass' => 'Physioasia@2019',
		  'smtp_port' => 587,
		  'crlf' => "\r\n",
		  'mailtype' => 'html',
		  'newline' => "\r\n"
		));
		$template = '	
		<table width="100%"  style="font-family:Arial, Helvetica, sans-serif; background:#B45F04; font-size:13px;">
	    <tr>
		<td align="center">
        	<table align="center" style="width:600px;">
            	<tr>
                	<td style="width:200px; background:#B45F04; float:left;">
                    	<img src="'.base_url().'img/logo.png" style="width:200px; height:88px;">
                    </td>
                    <td style="width:390px; height:100px; float:right;">
                    	<p style="color:#fff; margin-top:25px; font-size:15px; text-align:center; line-height:25px;">India`s First Web-based Clinic Management Software for Physiotherapists by Physiotherapists</p>
                    </td>
                </tr>
                <tr bgcolor="#CCCCCC" style="margin-top:-5px;">
                	<td>
                    	<table bgcolor="#FFFFFF" style="margin:20px 20px 20px 20px; width:600px ">
                        	<tr>
                            	<td width="300px;">
									<p style="color:#585858; font-family:Times New Roman, Times, serif; font-size:22px; text-align:left; padding-left:20px;"><strong>Exercise Offer Request</strong></p>
                           		</td>
							</tr>
                            <tr>
                            	<td>
                    				<table>
                                    	<tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;"> Name  :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$name.'</p>
			                        		</td>
										</tr>
                                        <tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">E-Mail :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$email.'</p>
			                        		</td>
										</tr>
                                        <tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">Mobile  :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$mobile.'</p>
			                        		</td>
										</tr>
										<tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">Exercise Type :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$ex_type.'</p>
			                        		</td>
										</tr>
                                        <tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">Message :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$message.'</p>
			                        		</td>
										</tr>
									</table>
                        		</td>
							</tr>
						</table>
                    </td>
				</tr>
				<tr>
                	<td align="center">
                    	<p style="color:#CCCCCC; text-align:center;">Copyright © 2013 Physio Plus Tech. All Rights Reserved.</p>
                        <a style="color:#CCCCCC;" href="http://www.physioplustech.in/"><p>www.physioplustech.in</p></a>
                    </td>
                </tr>
			</table>
		</td>
	</tr>
	</table>';
		
		$this->email->from('no-reply@physioplustech.com','Physio Plus Tech');
	   	$this->email->to($clinic_email);
		$this->email->subject('Exercise Request');
		$this->email->message($template);
		$this->email->send();
       return $clinic_email;
	 }
	 public function pat_register($name,$mobile,$email,$branch,$type) {
		
		 $this->load->library('email');
		 $this->email->initialize(array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'smtp.sendgrid.net',
		  'smtp_user' => 'physiotechasia',
		  'smtp_pass' => 'Physioasia@2019',
		  'smtp_port' => 587,
		  'crlf' => "\r\n",
		  'mailtype' => 'html',
		  'newline' => "\r\n"
		));
		
		$this->db->select('clinic_name,email,logo')->from('tbl_client')->where('client_id',$branch);
	    $res = $this->db->get();
	    $clinic_name = $res->row()->clinic_name;
		$clinic_email = $res->row()->email;
		$logo = $res->row()->logo;
		
		$admin_logo = base_url().'img/logo.png';
		$client_logo = base_url().'uploads/logo/'.$logo;
		$template = '
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="570px" align="center">
									<tr>
										<td align="center">
											<img style="float:left;" src=" '.$admin_logo.' ">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												
												<tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;"> Name  :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$name.'</p>
			                        		</td>
										</tr>
                                        <tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">E-Mail :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$email.'</p>
			                        		</td>
										</tr>
                                        <tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">Mobile  :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$mobile.'</p>
			                        		</td>
										</tr>
										<tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">Patient Type :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$type.'</p>
			                        		</td>
										</tr>
                                        </table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>
		';
		$this->email->from('no-reply@physioplustech.com','Physio Plus Tech');
	   	$this->email->to($clinic_email);
		$this->email->subject('Patient Registration');
		$this->email->message($template);
		$this->email->send();
		return $template;  
	}
	 public function exercise_feedback($patient_id,$client_id,$pain,$complex) {
		 $this->db->where('client_id',$client_id);
		 $this->db->select('email')->from('tbl_client');
		 $res = $this->db->get();
		 $clinic_email = $res->row()->email;
		 $this->load->library('email');
		 $this->email->initialize(array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'smtp.sendgrid.net',
		  'smtp_user' => 'physiotechasia',
		  'smtp_pass' => 'Physioasia@2019',
		  'smtp_port' => 587,
		  'mailtype' => 'html',
		  'crlf' => "\r\n",
		  'newline' => "\r\n"
		));
		
		$this->db->select('clinic_name,email,logo')->from('tbl_client')->where('client_id',$client_id);
	    $res = $this->db->get();
	    $clinic_name = $res->row()->clinic_name;
		$clinic_email = $res->row()->email;
		$logo=$res->row()->logo;
		
		$this->db->select('first_name,email,mobile_no')->from('tbl_patient_info')->where('patient_id',$patient_id);
	    $res1 = $this->db->get();
	    $name = $res1->row()->first_name;
		$email = $res1->row()->email;
		$mobile=$res1->row()->mobile_no;
		
		$admin_logo = base_url().'img/logo.png';
		$client_logo = base_url().'uploads/logo/'.$logo;
		$template = '
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="570px" align="center">
									<tr>
										<td align="center">
											<img style="float:left;" src=" '.$admin_logo.' ">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												
												<tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">Patient Name  :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$name.'</p>
			                        		</td>
										</tr>
                                        <tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">E-Mail :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$email.'</p>
			                        		</td>
										</tr>
                                        <tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">Mobile  :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$mobile.'</p>
			                        		</td>
										</tr>
										<tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">Severity Of Pain :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$pain.'</p>
			                        		</td>
										</tr>
										<tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">Complexity :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$complex.'</p>
			                        		</td>
										</tr>
                                        </table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>
		';
		
		$this->email->from('no-reply@physioplustech.com','Physio Plus Tech');
		$this->email->to($clinic_email);
		$this->email->subject('Workout Feedback');
		$this->email->message($template);
		$this->email->send();
		return $template;  
	 }
	 public function patient_access($info) {
		 $url = base_url().'uploads/logo/'.$info['Logo'];
		$d1 = date('Y-m-d');
		$date = date('d-m-Y',strtotime($d1));
		$html = '
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#ccc; padding-top:15px; padding-bottom:15px;">
				<tr>
				<td align="center">
				<table width="600" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF;">
				<tr>
				<td>

				</td>
				</tr>
				<tr>
				<td width="250px" align="center" valign="middle" style="background:#FFFFFF;">
				<img src=" '.$url.' " style="width:40px; height:30px;">
				</td>
				<td width="350px" align="left" valign="top" style="background:#0099DC;">
				<p style="font-family: Tahoma, Geneva, sans-serif;
					font-size:130%;
					color:#ffffff;
					text-align:right; 
					padding-top:20px; 
					padding-right:15px; 
					line-height:20px; 
					text-shadow:1px 1px 1px rgba(0, 0, 0, 0.2);">
				<strong>'.$info['ClinicName'].'</strong>
				</p>
				<p style="font-family: Tahoma, Geneva, sans-serif;
					font-size:110%; 
					color:#ffffff; 
					text-align:right; 
					padding-right:15px; 
					line-height:20px;">
				Dr. '.$info['ClientFirstName'].' '.$info['ClientLastName'].'.,
				</p>
				<p style="font-family: Tahoma, Geneva, sans-serif; 
					font-size:90%; 
					color:#ffffff; 
					text-align:right; 
					padding-right:15px; 
					line-height:5px;">
				'.$info['Address1'].',
				</p>
				<p style="font-family: Tahoma, Geneva, sans-serif; 
					font-size:90%; 
					color:#ffffff; 
					text-align:right; 
					padding-right:15px; 
					line-height:5px;">
				'.$info['City'].' - '.$info['Zipcode'].'.
				</p>
				<p style="font-family: Tahoma, Geneva, sans-serif; 
					font-size:90%; 
					color:#ffffff; 
					text-align:right; 
					padding-right:15px;
					line-height:5px;">
				Cell : '.$info['Mobile'].'
				</p>
				<p style="font-family: Tahoma, Geneva, sans-serif; 
					font-size:90%; 
					color:#ffffff; 
					text-align:right; 
					padding-right:15px; 
					padding-bottom:20px; 
					line-height:5px;">
				Email : '.$info['Email'].'
				</p>
				</td>
				</tr>
				</table>
				<table width="600" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF;">	
				<tr>
				<td>
				<p style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif; 
					font-size:110%;	
					color:#4E5252; 
					text-align:right; 
					padding-top:20px; 
					padding-right:30px;">
				'.$date.'
				</p>
				</td>
				</tr>
				
				<tr>
				<td>
				<p style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif; 
					font-size:100%;	
					color:#4E5252; 
					text-align:left; 
					padding-top:25px; 
					padding-left:30px;">
				Dear '.$info['Title'].' '.$info['Patientname'].' ,
				</p>
				</td>
				</tr>
				<tr>
				<td>
				<p style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif; 
					font-size:100%;	
					color:#4E5252; 
					text-align:left;
					text-align:justify;
					padding-top:10px; 
					padding-right:35px; 
					line-height:25px; 
					padding-left:30px;">
				It was our Privilege to have got the opportunity to treat you at our clinic, MobiPhysio on '.$date.'.
				</p>
				</td>
				</tr>
				<tr>
				<td>
				<p style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif; 
					font-size:100%;	
					color:#4E5252; 
					text-align:left;
					text-align:justify;
					padding-top:10px; 
					padding-right:35px; 
					line-height:25px; 
					padding-left:30px;">
				We sincerely hope, that you are feeling better.
				</p>
				</td>
				</tr>
				<tr>
				<td>
				<p style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif; 
					font-size:100%;	
					color:#4E5252; 
					text-align:left;
					text-align:justify;
					padding-top:10px; 
					padding-right:35px; 
					line-height:25px; 
					padding-left:30px;">
				Should you have any issue or further discomfort, please call us unhesitatingly; we will be too happy to respond.
				</p>
				</td>
				</tr>
				<tr>
				<td>
				<p style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif; 
					font-size:100%;	
					color:#4E5252; 
					text-align:left; 
					padding-top:30px; 
					padding-left:30px;">
				Sincerely,
				</p>
				</td>
				</tr>
				<tr>
				<td>
				<p style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif; 
					font-size:100%;	
					color:#4E5252; 
					text-align:left; 
					padding-top:10px; 
					padding-left:30px;">
				Dr. T.R. Vandana P.T ,
				</p>
				<br>
				</td>
				</tr>
				
				<tr>
				<td style="background:#0099DC; width:600px; height:15px; text-align:left; vertical-align:bottom;">
				</td>
				</tr>
				</table>    
				</td>
				</tr>
			</table>';
			
		$this->email->from('no-reply@physioplustech.com','Physio Plus Tech');
		$this->email->to($info['Patientmail']);
		$this->email->subject('Patient Access Sevices');
		$this->email->message($html);
		$this->email->send();
		return $info['Patientmail']; 	
		 
	 }
	 /*
	 public function reviewTemplate1($info){
		
			$this->db->where('client_id',$this->session->userdata('client_id'));
		
			$this->db->select('*')->from('tbl_client');
			$res = $this->db->get();
			$clinic_name = $res->row()->clinic_name;
			$info1 = $res->row()->logo;
			$admin_logo1 = base_url().'uploads/logo/'.$info1;
			
		$template = '
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="570px" align="center">
									<tr>
										<td align="center">
											<img style="float:left;" height="101" width="229" src=" '.$admin_logo1.' ">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
													<td>
														<h1 style=" font-size:24px; color:#666; padding-left:25px;">Hello '.$pat_name[0].',</h1>
														<p style=" color:#666; padding-left:25px;"><span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">We have created a home exercise program for you.</p>
														<!--<p style=" color:#666; padding-left:25px;"><span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">Your exercise code is : '.$status.'-'.$verifycode.'</p>--> 
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">Please visit:</p>
														<p style="color:#666;padding-left:25px;font-size:120%">This Link : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$info.'</span></p>
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">If the above is not a clickable link, please copy and paste the URL in your browser address bar to visit your exercise page.</p>
														<p style="color:#666;padding-left:25px;font-size:120%">This is a no-reply email address. Please do not reply to this email. The sender email address is contact@physioplusnetwork.com</p>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>
		';
		return $template;
	}
   */
	public function ReviewTemplate($info) {
		//$html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="background-color: #e4e7e0;"> <tbody><tr> <td width="100%"> <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: 0 auto; padding: 0;" class="mobile"> <tbody><tr> <td width="100%"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 5px 0; color: #000000; font-family: Arial,Helvetica,sans-serif; font-size: 11px; font-weight: light; line-height: 15px;"></td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="45%" style="padding: 7px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="font: 26px impact; color: #fff;">'. $info['ClinicName'] .'<!--<img width="174" height="34" border="0" style="display: block;" alt="Logo" src="logo.png" class="imageScale">--></td> </tr> </tbody></table> </td> <td style="background-color: #23a6bd;" width="55%" class="mobile_hide"> <table style="background-color: #23a6bd;" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="background-color: #23a6bd; color: #ffffff; font-family: Impact; font-size: 26px; line-height: 29px;">Google Review Remainder</td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff; padding: 20px 0 10px 0;"> <tbody><tr> <td class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding: 15px 0 0 0;"> <tbody><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"><div style="color: #130f0e; font-size: 14px; font-weight: bold; line-height: 21px; text-align: left;">Dear '. $info['PersonName'] .',</div><br></td> </tr><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"><div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">Kindly Rate Our Service in Google Reviews with below link, '.'.</div><br/></td> </tr><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"><div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">'.$info['ReviewLink'].'</div><br/><br/></td> </tr><!--<tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"><div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">Any cancellation/rescheduling of appointment , please inform us at least 12 hours in advance. Otherwise a CANCELLATION CHARGE will be applied.</div><br/><br/></td> </tr><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"><div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">If you arrive late for appointments by more than 10 minutes we may only be able to treat you for the remainder of the session.</div><br/><br/></td> </tr><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"></td> </tr>--><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"><br/><div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">Thank you,</div></td> </tr><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"><div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">'.$info['ClinicName'].',</div></td> </tr><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"><div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">'.'</div></td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="100%" style="font-size: 10px;">&nbsp;</td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding-bottom: 14px;"> <tbody><tr> <td width="30%" style="padding: 10px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <!--<td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Facebook" src="'. base_url() .'img/facebook.png"></a></td> <td align="center"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Twitter" src="'. base_url() .'img/twitter.png"></a></td> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img border="0" style="display: block;" alt="Envelope" src="'. base_url() .'img/envelope.png"></a></td> <td align="center" style="padding-right: 7px;"></td> </tr> </tbody></table> </td> --><td width="100%" style="padding: 10px 0; background-color: #343135;" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding-right: 10px; padding-left: 7px; color: #ffffff; font-family: Arial,Helvetica,sans-serif; font-size: 10px; line-height: 14px; text-align: left;">You have received this email cause you have subscribed to '. $info['ClinicName'] .'.<br> &copy; 2013 Your Company</td> </tr> </tbody></table> </td> </tr> </tbody></table> </td> </tr> </tbody></table></td> </tr> </tbody></table>';	
		//$html='<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="background-color: #e4e7e0;"> <tbody><tr> <td width="100%"></tbody></table>';
		$html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="background-color: #e4e7e0;"> <tbody><tr> <td width="100%"> <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: 0 auto; padding: 0;" class="mobile"> <tbody><tr> <td width="100%"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 5px 0; color: #000000; font-family: Arial,Helvetica,sans-serif; font-size: 11px; font-weight: light; line-height: 15px;"></td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="45%" style="padding: 7px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="font: 26px impact; color: #fff;">'. $info['ClinicName'] .'<!--<img width="174" height="34" border="0" style="display: block;" alt="Logo" src="logo.png" class="imageScale">--></td> </tr> </tbody></table> </td> <td style="background-color: #23a6bd;" width="55%" class="mobile_hide"> <table style="background-color: #23a6bd;" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="background-color: #23a6bd; color: #ffffff; font-family: Impact; font-size: 26px; line-height: 29px;">Google Review Remainder</td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff; padding: 20px 0 10px 0;"> <tbody><tr> <td class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding: 15px 0 0 0;"> <tbody><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"><div style="color: #130f0e; font-size: 14px; font-weight: bold; line-height: 21px; text-align: left;">Dear '. $info['PersonName'] .',</div></td> </tr><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"><div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">Hope you had a good Physiotherapy session at '.$info['ClinicName'].'</div><br></td> </tr><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"><div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">We wish you a speedy recovery!'.'</div><br></td> </tr><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"><div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">If you are happy with our service, Kindly click below to leave a review'.'</div></td> </tr><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"><div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">'.$info['ReviewLink'].'</div><br/><br/></td> </tr><!--<tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"><div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">Any cancellation/rescheduling of appointment , please inform us at least 12 hours in advance. Otherwise a CANCELLATION CHARGE will be applied.</div><br/><br/></td> </tr><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"><div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">If you arrive late for appointments by more than 10 minutes we may only be able to treat you for the remainder of the session.</div><br/><br/></td> </tr><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"></td> </tr>--><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"><div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">Thank you &#128522;</div></td> </tr><!--<tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"><div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">'.$info['ClinicName'].',</div></td> </tr>--><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"><div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">'.'</div></td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="100%" style="font-size: 10px;">&nbsp;</td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding-bottom: 14px;"> <tbody><tr> <td width="30%" style="padding: 10px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <!--<td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Facebook" src="'. base_url() .'img/facebook.png"></a></td> <td align="center"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Twitter" src="'. base_url() .'img/twitter.png"></a></td> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img border="0" style="display: block;" alt="Envelope" src="'. base_url() .'img/envelope.png"></a></td> <td align="center" style="padding-right: 7px;"></td> </tr> </tbody></table> </td> --><td width="100%" style="padding: 10px 0; background-color: #343135;" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding-right: 10px; padding-left: 7px; color: #ffffff; font-family: Arial,Helvetica,sans-serif; font-size: 10px; line-height: 14px; text-align: left;">You have received this email cause you have subscribed to '. $info['ClinicName'] .'.<br> &copy; 2013 Your Company</td> </tr> </tbody></table> </td> </tr> </tbody></table> </td> </tr> </tbody></table></td> </tr> </tbody></table>';	
		return $html;
	}
 
}