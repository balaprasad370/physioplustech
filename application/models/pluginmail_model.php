<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pluginmail_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		$this->load->library(array('email'));
		// config mandrill and detect it is ready or not
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
	}
	
	public function sendEmail($info) {
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
	
	//contact details sent to our admin
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
                    	<p style="color:#fff; margin-top:25px; font-size:15px; text-align:center; line-height:25px;">India`s First Web-based Clinic Management Software for Physiotherapists by Physiotherapists</p>
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
                        <a style="color:#CCCCCC;" href="http://physioplustech.com/"><p>www.physioplustech.com</p></a>
                    </td>
                </tr>
			</table>
		</td>
	</tr>
</table>';
		return $template;
	}
	
	//appoinment details sent to patient
	public function patientAppointmentTemplate($info) {
		$html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="background-color: #e4e7e0;"> <tbody><tr> <td width="100%"> <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: 0 auto; padding: 0;" class="mobile"> <tbody><tr> <td width="100%"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 5px 0; color: #000000; font-family: Arial,Helvetica,sans-serif; font-size: 11px; font-weight: light; line-height: 15px;">Appointment email notification. </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="45%" style="padding: 7px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="font: 26px impact; color: #fff;">'. $info['ClinicName'] .'<!--<img width="174" height="34" border="0" style="display: block;" alt="Logo" src="logo.png" class="imageScale">--></td> </tr> </tbody></table> </td> <td width="55%" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 2px 15px; background-color: #23a6bd; color: #ffffff; font-family: Impact; font-size: 25px; line-height: 29px;">APPOINTMENT NOTIFICATION</td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff; padding: 20px 0 10px 0;"> <tbody><tr> <td class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding: 15px 0 0 0;"> <tbody><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"> <div style="color: #130f0e; font-size: 14px; font-weight: bold; line-height: 21px; text-align: left;">Dear '. $info['PersonName'] .',</div><br> <div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">We are pleased to confirm your appointment at '. $info['ClinicName'] .'.</div><br> <div style="color: #130f0e; font-size: 14px; line-height: 20px; text-align: left;"><strong>on</strong> '. $info['Time'] .' <strong>at</strong> '. $info['Location'] .' </div><br> <div style="color: #AAAAAA; font-size: 11px; font-weight: bold; line-height: 17px; text-align: right; border-top:1px solid #eee; padding-top:10px; margin-top:10px">'. $info['ClinicName'] .',<br />'. $info['Location'] .'<br />'. $info['ClinicMobile'] .' </div> </td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="100%" style="font-size: 10px;">&nbsp;</td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding-bottom: 14px;"> <tbody><tr> <td width="30%" style="padding: 10px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Facebook" src="'. base_url() .'img/facebook.png"></a></td> <td align="center"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Twitter" src="'. base_url() .'img/twitter.png"></a></td> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img border="0" style="display: block;" alt="Envelope" src="'. base_url() .'img/envelope.png"></a></td> <td align="center" style="padding-right: 7px;"></td> </tr> </tbody></table> </td> <td width="70%" style="padding: 10px 0; background-color: #343135;" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding-right: 10px; padding-left: 7px; color: #ffffff; font-family: Arial,Helvetica,sans-serif; font-size: 10px; line-height: 14px; text-align: left;">You have received this email cause you have subscribed to '. $info['ClinicName'] .'.<br> &copy; 2013 Your Company</td> </tr> </tbody></table> </td> </tr> </tbody></table> </td> </tr> </tbody></table></td> </tr> </tbody></table>';	
		return $html;
	}
	
	//registration details sent to client
	public function registrationTemplate($info) {
		$url = base_url().'pages/email_verification/'.$info['verificationCode'];
		$html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="background-color: #e4e7e0;"> <tbody><tr> <td width="100%"> <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: 0 auto; padding: 0;" class="mobile"> <tbody><tr> <td width="100%"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 5px 0; color: #000000; font-family: Arial,Helvetica,sans-serif; font-size: 11px; font-weight: light; line-height: 15px;">Registration confirmation. </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="45%" style="padding: 7px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="font: 26px impact; color: #fff;">Physio Plus Tech<!--<img width="174" height="34" border="0" style="display: block;" alt="Logo" src="logo.png" class="imageScale">--></td> </tr> </tbody></table> </td> <td width="55%" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 2px 15px; background-color: #23a6bd; color: #ffffff; font-family: Impact; font-size: 25px; line-height: 29px;">WELCOME</td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff; padding: 20px 0 10px 0;"> <tbody><tr> <td class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding: 15px 0 0 0;"> <tbody><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"> <div style="color: #130f0e; font-size: 14px; font-weight: bold; line-height: 21px; text-align: left;">Dear '. $info['ClientName'] .',</div><br> <div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">thanks for registering with Physio Plus Tech </div><br> <div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">to verify your email address, please follow the below link </div><br> <div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;"><a href=" '.$url.' ">'.$url.'</a> </div><br> <div style="color: #130f0e; font-size: 14px; line-height: 20px; text-align: left;"> </div><br> </td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="100%" style="font-size: 10px;">&nbsp;</td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding-bottom: 14px;"> <tbody><tr> <td width="30%" style="padding: 10px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Facebook" src="'. base_url() .'img/facebook.png"></a></td> <td align="center"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Twitter" src="'. base_url() .'img/twitter.png"></a></td> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img border="0" style="display: block;" alt="Envelope" src="'. base_url() .'img/envelope.png"></a></td> <td align="center" style="padding-right: 7px;"></td> </tr> </tbody></table> </td> <td width="70%" style="padding: 10px 0; background-color: #343135;" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding-right: 10px; padding-left: 7px; color: #ffffff; font-family: Arial,Helvetica,sans-serif; font-size: 10px; line-height: 14px; text-align: left;">You have received this email cause you have subscribed to Physio plus tech<br> &copy; 2013 Your Company</td> </tr> </tbody></table> </td> </tr> </tbody></table> </td> </tr> </tbody></table></td> </tr> </tbody></table>';	
		return $html;
	}
	
	//forget password details sent to client
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
				1. '.$info['Title'].' '.$info['PatientFirstName'].' '.$info['PatientLastName'].'  - '.$info['Age'].' / '.$info['Gender'].'.
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
				Dr. '.$info['ClientFirstName'].' '.$info['ClientLastName'].',
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
														<p style="color:#666;padding-left:25px;font-size:120%">Total amount of payments :<span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;"> Rs. '.$info['paidAmt'].'</span></p>
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
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://physioplustech.com/"> www.physioplustech.com</a></p>
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
														<p style="color:#666;padding-left:25px;font-size:120%">State : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$info['State'].'</span></p>
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
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://physioplustech.com/"> www.physioplustech.com</a></p>
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
								<a style="color:#ccc;" href="#">www.physioplustech.com</a>
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
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://physioplustech.com/"> www.physioplustech.com</a></p>
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
	
	public function exespdftemplate($info,$verifycode){
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
														<h1 style=" font-size:24px; color:#666; padding-left:25px;">Hello Client,</h1>
														<p style=" color:#666; padding-left:25px;"><span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">We have created a home exercise program for you.</p>
														<p style=" color:#666; padding-left:25px;"><span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">Your exercise code is : '.$verifycode.'</p> 
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
														<p style="color:#666;padding-left:25px;font-size:120%">This is a no-reply email address. Please do not reply to this email. The sender email address is '.$this->session->userdata('username').'</p>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://physioplustech.com/"> www.physioplustech.com</a></p>
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
	
	public function sendPDF($info) {
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
	
	public function patienttemplate($url)

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

														<h1 style=" font-size:24px; color:#666; padding-left:25px;">Dear Patient,</h1>

														<p style=" color:#666; padding-left:25px;"><span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">Your Physio Plus Tech Login URL is Below .</p>
														<p style=" color:#666; padding-left:25px;"><span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">Click Here to set your Account Password : '.$url.'</p> 
													</td>

												</tr>

												<tr>

													<td width="275px">

														<p style="color:#666;padding-left:25px;font-size:120%">Please visit:</p>

														<p style="color:#666;padding-left:25px;font-size:120%">This Link : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$url.'</span></p>

													</td>

												</tr>

												<tr>

													<td width="275px">

														<p style="color:#666;padding-left:25px;font-size:120%">If the above is not a clickable link, please copy and paste the URL in your browser address bar to visit your exercise page.</p>

														<p style="color:#666;padding-left:25px;font-size:120%">This is a no-reply email address. Please do not reply to this email. The sender email address is '.$this->session->userdata('username').'</p>

													</td>

												</tr>

											</table>

										</td>

									</tr>

								</table>

							</td>

						</tr>

					</table>

					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://physioplustech.com/"> www.physioplustech.com</a></p>

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
}