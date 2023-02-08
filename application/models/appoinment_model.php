<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Appoinment_model extends CI_Model {
		
		public function sch_slot($client_id){
			$this->db->select('*')->from('tbl_schedule_settings')->where('client_id',$client_id);
			$query = $this->db->get();
			return ($query->num_rows() > 0 ) ? $query->result_array() : false;
		}
		public function sch_times($client_id){
			$this->db->select('*')->from('tbl_settings')->where('client_id',$client_id);
			$query = $this->db->get();
			return ($query->num_rows() > 0 ) ? $query->result_array() : false;
		}
		public function sch_times1($client_id){
			$this->db->select('*')->from('tbl_settings')->where('client_id',$client_id);
			$query = $this->db->get();
			return ($query->num_rows() > 0 ) ? $query->row_array() : false;
		}
		public function set_appto($app_id,$title,$app_date,$start,$end,$har_email,$har_mob_no,$client_id,$con_id){
		$app=explode('-',$app_date);
		$str=explode(' ',$start); 
		$ends=explode(' ',$end); 
		$st=explode('-',$str[0]); 
		
		echo $client_id; 
		
		for($i=$st[2] + 1; $i <= $app[2] ; $i++){
			$date1=$st[0].'-'.$st[1].'-'.$i;
			
			$start1=$date1.' '.$str[1];
			$end=$date1.' '.$ends[1];
			echo $end;
			
			$a1=array(
			'client_id'=>$client_id,
			'start'=>$start1,
			'end'=>$end,
			'title' => $title,
			'appointment_from'=>$start,
			'appointment_to'=>$app_date,
			'har_mob_no'=>$har_mob_no,
			'har_email'=>$har_email,
			'staff_id' => $con_id
			);
			$this->db->insert('tbl_appointments',$a1);
			
		}
		return true;
		  
	}
	public function get_patient_name($appoint_id)
	{	

		$this->db->where('ai.appointment_id',$appoint_id);
		$this->db->select('ai.client_id,pi.patient_id,pi.first_name,pi.last_name')->from('tbl_appointments ai');
		$this->db->join('tbl_patient_info pi','pi.patient_id = ai.patient_id');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function get_staff_name($appoint_id)
	{	

		$this->db->where('ai.appointment_id',$appoint_id);
		$this->db->select('pi.first_name,pi.last_name')->from('tbl_appointments ai');
		$this->db->join('tbl_staff_info pi','pi.staff_id = ai.staff_id');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row()->first_name." ".$query->row()->last_name : false;
	}
	public function generate_code() {
		
			$string  = 'P' . ucfirst(substr($this->input->post('gender'),0,1)) . ucfirst(substr($this->input->post('first_name'),0,1)) . '/' . date('my') . '/';
		
		$this->db->select('patient_code')->from('tbl_patient_info'); 
		if($this->session->userdata('all_locations') == true)
		{
			$this->db->where_in('client_id',$this->session->userdata('clientIds'));
		}else{
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
		$this->db->like('patient_code', $string, 'after');
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $string . ($query->num_rows() + 1);
		} else {
			return $string . '1';
		}
	}
	public function smsNotify_doc($app_id,$notify_to,$con_id) {
		$this->db->where('staff_id',$con_id);
		$this->db->select('first_name,email,mobile_no')->from('tbl_staff_info');
		$res=$this->db->get();
		$StaffMobile=$res->row()->mobile_no;
		$DoctorName = $res->row()->first_name;
		
		
		$this->db->select('AT.start as Time, CT.clinic_name, CT.city, CT.state, CT.zipcode, CT.mobile, AT.title as PatientName,AT.har_email as PatientEmail')->from('tbl_appointments AT');
		$this->db->join('tbl_client CT', 'AT.client_id = CT.client_id');
		$this->db->where('AT.appointment_id', $app_id);
		$query = $this->db->get();
		// if data exist for appointmentid
		if($query->num_rows() > 0){
			$data = $query->row();
			$city = ($data->city != '') ? $data->city.', ' : '';
			$state = ($data->state != '') ? $data->state : '';
			$zip = ($data->zipcode != '') ? ' - '.$data->zipcode : '';
			$time = date('D jS M h:i a', strtotime($data->Time));
			$location = $city.$state.$zip;
			$profile_info = $this->registration_model->editProfile($this->session->userdata('client_id'));
			$sms_count = $profile_info['sms_count'];
			$sms_limit = $profile_info['total_sms_limit'];
			$country = $profile_info['country'];
			if($sms_limit > $sms_count){
				if($StaffMobile != '') {
				  if($this->session->userdata('client_id') == '1948') {
					$clinic_name1 = 'SUNSHINE SUPER SPECIALITY PHYSIOTHERAPY CLINIC';
					$message_doctor = 'Dear '.ucfirst($DoctorName).', You have an appointment with '.ucfirst($data->PatientName).' at '.ucfirst($clinic_name1).' on '.$time.' at ' . $location;				
					$doctorSmsURL = 'http://www.smsgatewaycenter.com/library/send_sms_2.php?UserName=klakshman&Password=Smspwd@2016&Type=Individual&To='.$StaffMobile.'&Mask=PHYSIO&Message='.urlencode($message_doctor);
				  } else {
					 $message_doctor = 'Dear '.ucfirst($DoctorName).', You have an appointment with '.ucfirst($data->PatientName).' at '.ucfirst($data->clinic_name).' on '.$time.' at ' . $location;				
					 $doctorSmsURL = 'http://www.smsgatewaycenter.com/library/send_sms_2.php?UserName=klakshman&Password=Smspwd@2016&Type=Individual&To='.$StaffMobile.'&Mask=PHYSIO&Message='.urlencode($message_doctor);
				  }
				  $sms['doctor'] = 'DONE';
					$doctor_churl = @fopen($doctorSmsURL,'r');
					fclose($doctor_churl);
					if (!$doctor_churl) {
						// do nothing
					}else{
						$sms_count+=1;
					}
				}
			} 
			$this->db->where('client_id', $this->session->userdata('client_id'));
			$this->db->update('tbl_client', array('sms_count' => $sms_count));
			return $sms;
		}
	
	}
	public function smsNotify($c_id) {
		$this->db->order_by("appointment_id", "desc");
        $this->db->limit(1);
		$this->db->select('AT.start as Time, CT.clinic_name,CT.mobile ,CT.city, CT.state, CT.zipcode, CT.mobile, AT.har_mob_no as PatientMobile, AT.title as PatientName, AT.har_email as PatientEmail')->from('tbl_appointments AT');
		$this->db->join('tbl_client CT', 'AT.client_id = CT.client_id');
		$query = $this->db->get();
		// if data exist for appointmentid
		if($query->num_rows() > 0){
			$data = $query->row();
			$city = ($data->city != '') ? $data->city.', ' : '';
			$mobile = ($data->mobile != '') ? $data->mobile.', ' : '';
			$state = ($data->state != '') ? $data->state : '';
			$zip = ($data->zipcode != '') ? ' - '.$data->zipcode : '';
			$time = date('D jS M h:i a', strtotime($data->Time));
			$location = $city.$state.$zip;
			$profile_info = $this->appoinment_model->editProfile($this->session->userdata('client_id'));
			$sms_count = $profile_info['sms_count'];
			$sms_limit = $profile_info['total_sms_limit'];
			$country = $profile_info['country'];
			if($country == '200') {
				$code = '65';
			} else {
				$code = '63';
			} // if patient has mobile 
			if($data->PatientMobile != '') {
			if($sms_limit > $sms_count) {
				 if($this->session->userdata('client_id') == '1948') {
					$clinic_name1 = 'SUNSHINE SUPER SPECIALITY PHYSIOTHERAPY CLINIC';
					$message_patient = 'Dear '.ucfirst($data->PatientName).', We are pleased to confirm your appointment at '.ucfirst($clinic_name1).' on '.$time.'For Details ' . $mobile;  
					$patientSmsURL = 'http://www.smsgatewaycenter.com/library/send_sms_2.php?UserName=klakshman&Password=Smspwd@2016&Type=Individual&To='.$data->PatientMobile.'&Mask=PHYSIO&Message='.urlencode($message_patient);
				 } else {
					 $message_patient = 'Dear '.ucfirst($data->PatientName).', We are pleased to confirm your appointment at '.ucfirst($data->clinic_name).' on '.$time.'For Details ' . $mobile;  
					 $patientSmsURL = 'http://www.smsgatewaycenter.com/library/send_sms_2.php?UserName=klakshman&Password=Smspwd@2016&Type=Individual&To='.$data->PatientMobile.'&Mask=PHYSIO&Message='.urlencode($message_patient);
				 }
				$sms['patient'] = 'DONE';
				$patient_churl = @fopen($patientSmsURL,'r');
				fclose($patient_churl);
				if (!$patient_churl) {
					// do nothing
				}else{
					$sms_count+=1;
				} 
			}
			}
			// if doctor has mobile 
			$this->db->where('client_id', $this->session->userdata('client_id'));
			$this->db->update('tbl_client', array('sms_count' => $sms_count));
			return $sms; 
		} 
		
	}
	public function smsverify($c_id,$mobile,$rand) {
		$profile_info = $this->appoinment_model->editProfile($this->session->userdata('client_id'));
			$sms_count = $profile_info['sms_count'];
			$sms_limit = $profile_info['total_sms_limit'];
			$country = $profile_info['country'];
			if($mobile != '') {
				$message_patient = 'Mobile Verification Code is '.$rand.'';
				$patientSmsURL = 'http://www.smsgatewaycenter.com/library/send_sms_2.php?UserName=klakshman&Password=Smsgateway@2018&Type=Individual&To='.$mobile.'&Mask=PHYSIO&Message='.urlencode($message_patient);
			    $sms['patient'] = 'DONE';
				$patient_churl = @fopen($patientSmsURL,'r');
				fclose($patient_churl);
				if (!$patient_churl) {
					// do nothing
				}else{
					$sms_count+=1;
				}
			  			  
			}
			// if doctor has mobile 
			$this->db->where('client_id', $this->session->userdata('client_id'));
			$this->db->update('tbl_client', array('sms_count' => $sms_count));
			return $sms; 
		 
		
	}
	
	public function app_book($name,$email,$formated_date,$mobile,$date1,$date2,$c_id)
	{	
		  $data = array(
			'title' => $name,
			'har_email' => $email,
			'har_mob_no' => $mobile,
			'start' => $date1,
			'end' => $date2,
			'appointment_from'=>$formated_date,
			'client_id'=>$c_id,
			'status'=>2
		);
		
		$this->db->insert('tbl_appointments', $data);
		$app_id = $this->db->insert_id();
		return $app_id;
	}
	public function app_book1($name,$email,$formated_date,$mobile,$date1,$date2,$c_id)
	{	
		
		  $data = array(
			'title' => $name,
			'har_email' => $email,
			'har_mob_no' => $mobile,
			'start' => $date1,
			'end' => $date2,
			'appointment_from'=>$formated_date,
			'client_id'=>$c_id
		);
		$this->db->limit(1);
		$this->db->order_by('appointment_id','desc');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->update('tbl_appointments', $data);
		return true; 
	}
	public function patient_det($title,$email,$start,$mobile) {
		
		$patient_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'first_name' => $title,
			'appoint_date' => date('Y-m-d',$start),
			'mobile_no' => $mobile,
			'email' => $email,
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
			'patient_code' => $this->generate_code()
		);
		$this->db->insert('tbl_patient_info', $patient_info);
		$data = array('patient_id' => $this->db->insert_id(), 'first_name' => $this->input->post('first_name'));
		if($this->db->insert_id()){
			return $data;	
		} else {
			return false;	
		}
	}
	public function editProfile($client_id)
	{
		$this->db->select('*')->from('tbl_client')->where('client_id', $client_id);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function send_mail($name,$email,$formated_date,$mobile,$date1,$date2,$c_id)
	{
		$title=$name;
		$start=$formated_date;
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('city,state,branch_name,phone')->from('tbl_client');
		$result=$this->db->get();
		$city=$result->row()->city;
		$state=$result->row()->state;
		$branch_name=$result->row()->branch_name;
		$phone=$result->row()->phone;
		$clinic_name=$result->row()->clinic_name;
		
		$this->load->library('email');
		$this->load->helper('path');
        $this->load->helper('directory'); 
		$this->email->initialize(array(
              'protocol' => 'smtp',
              'smtp_host' => 'smtp.mandrillapp.com',
              'smtp_user' => 'no-reply@physioplustech.com',
              'smtp_pass' => 'mNeYYwFiNMcK5olu7uAwLQ',
              'smtp_port' => 587,
              'mailtype' => 'html', 
              'crlf' => "\r\n",
              'newline' => "\r\n"
           ));
          $path = set_realpath('uploads/mail/');
          $file_names = directory_map($path);

		$this->email->from('no-reply@physioplustech.com', 'Physio Plus Tech');
	
		$html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="background-color: #e4e7e0;"> <tbody><tr> <td width="100%"> <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: 0 auto; padding: 0;" class="mobile"> <tbody><tr> <td width="100%"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 5px 0; color: #000000; font-family: Arial,Helvetica,sans-serif; font-size: 11px; font-weight: light; line-height: 15px;">Appointment email notification. </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="45%" style="padding: 7px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="font: 26px impact; color: #fff;">'.$clinic_name.' <!--<img width="174" height="34" border="0" style="display: block;" alt="Logo" src="logo.png" class="imageScale">--></td> </tr> </tbody></table> </td> <td width="55%" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 2px 15px; background-color: #23a6bd; color: #ffffff; font-family: Impact; font-size: 25px; line-height: 29px;">APPOINTMENT NOTIFICATION</td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff; padding: 20px 0 10px 0;"> <tbody><tr> <td class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding: 15px 0 0 0;"> <tbody><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"> <div style="color: #130f0e; font-size: 14px; font-weight: bold; line-height: 21px; text-align: left;">Dear '.$title.',</div><br> <div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">We are pleased to confirm your appointment at '.$clinic_name.'.</div><br> <div style="color: #130f0e; font-size: 14px; line-height: 20px; text-align: left;"><strong>on</strong> '.$start.'  
		<strong>For Details&nbsp;&nbsp;</strong>'.$mobile.'</div><br> <div style="color: #AAAAAA; font-size: 11px; font-weight: bold; line-height: 17px; text-align: right; border-top:1px solid #eee; padding-top:10px; margin-top:10px">Physio Plus Clinic,<br />Sivakasi<br /> 222603 </div> </td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="100%" style="font-size: 10px;">&nbsp;</td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding-bottom: 14px;"> <tbody><tr> <td width="30%" style="padding: 10px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Facebook" src="'. base_url() .'img/facebook.png"></a></td> <td align="center"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Twitter" src="'. base_url() .'img/twitter.png"></a></td> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img border="0" style="display: block;" alt="Envelope" src="'. base_url() .'img/envelope.png"></a></td> <td align="center" style="padding-right: 7px;"></td> </tr> </tbody></table> </td> <td width="70%" style="padding: 10px 0; background-color: #343135;" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding-right: 10px; padding-left: 7px; color: #ffffff; font-family: Arial,Helvetica,sans-serif; font-size: 10px; line-height: 14px; text-align: left;">You have received this email cause you have subscribed to Physio Plus Clinic<br> &copy; 2013 Your Company</td> </tr> </tbody></table> </td> </tr> </tbody></table> </td> </tr> </tbody></table></td> </tr> </tbody></table>';	
		
				$this->email->to($email);
				$this->email->subject('Physiotherapy Appointment');
				$this->email->message($html);
				$this->email->send();
		
	}
	public function get_appoinments()
	{
			$this->db->distinct();
			if($this->uri->segment(4) == 'date'){
				$from = date('Y-m-d',  strtotime($this->uri->segment(5)));
				$to = date('Y-m-d',  strtotime($this->uri->segment(6)));
				$where_condition = "(appointment_from >= '".$from."' AND appointment_from <= '".$to."')";
				
			} elseif($this->uri->segment(4) == 'consult'){
				$this->db->where('staff_id',$this->uri->segment(5));  
			} elseif($this->session->userdata('staff_id') != false){
				$this->db->where('staff_id',$this->session->userdata('staff_id'));  
			}
			else {
				$this->db->where('client_id',$this->session->userdata('client_id'));
				$this->db->select('days_display,days_display_after')->from('tbl_settings');
				$res = $this->db->get();
				if($res->result_array() != false){
				$days = $res ->row()->days_display;
				$days1 = $res ->row()->days_display_after;
				if($days == '0' || $days == '') {  
					$this->db->where('client_id',$this->session->userdata('client_id'));
				}
				else { 
					$date = date('Y-m-d');
					$day1 ='-'.$days.' day';
					$to = date('Y-m-d',strtotime($day1));
					$day2 ='+'.$days1.'day';
					$to1 = date('Y-m-d',strtotime($day2)); 
					if($to == false ) {
						$to == $date;
					} if($to1 == false ) {
						$to1 == $date;
					}  
					$where_condition = "(appointment_from >= '".$to."' AND appointment_from <='".$to1."')";
					$this->db->where($where_condition);
					//$this->db->where($where_condition1);
				} 
			  }
			}
			if($this->session->userdata('staff_id') != false){
				$this->db->where('staff_id',$this->session->userdata('staff_id'));
			}
			$this->db->where('client_id',$this->session->userdata('client_id'));
			$this->db->select('*')->from('tbl_appointments');
			$query = $this->db->get();
			return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function remove_app($app_id)
	{
		$this->db->delete('tbl_appointments', array('appointment_id' => $app_id));
		return true;
	}
	public function domain_reg($c_id,$domain,$price)
	{
		$patient_info = array(
			'client_id' => $c_id,
			'domain_name' => $domain,
			'price' => $price,
			'created_date' => date('Y-m-d H:i:s')
		);
		$this->db->insert('tbl_domains', $patient_info);
		return true; 
	}
	public function add_patient($prov){
		$test = explode('/',$prov);
		if($test[1] != ''){
			$this->sendmail($prov);
		}
		$info = array(
		    'client_id' => $this->session->userdata('client_id'),
			'first_name' => $test[0],
			'home_visit' => $test[4],
			'gender' => $test[3],
			'mobile_no' => $test[2],
			'email' => $test[1],
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
			'patient_code' => $this->generate_code1($prov),
			'appoint_date' =>date('Y-m-d')
		);
		$this->db->insert('tbl_patient_info', $info);
		$data = array('patient_id' => $this->db->insert_id(), 'first_name' => $test[0] , 'patient_code' => $this->generate_code());
		if($this->db->insert_id()){
			return $data;	
		} else {
			return false;	
		}
		
		
	}
	public function generate_code1($prov) {
		$test = explode('/',$prov);
		$string  = 'P' . ucfirst(substr($test[3],0,1)) . ucfirst(substr($test[0],0,1)) . '/' . date('my') . '/';
		$this->db->select('patient_code')->from('tbl_patient_info'); 
		if($this->session->userdata('all_locations') == true)
		{
			$this->db->where_in('client_id',$this->session->userdata('clientIds'));
		}else{
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
		$this->db->like('patient_code', $string, 'after');
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $string . ($query->num_rows() + 1);
		} else {
			return $string . '1';
		}
	}
	public function sendmail($prov){  
		$test = explode('/',$prov);
		$url = base_url().'patient/patient/setpassword/'.$test[1];
		$pdfMessage = $this->mail_model->patienttemplate($url);
		$adminMailConfig = array('to' => $test[1], 'subject' => '[Physio Plus Tech]Active Your Account', 'message' => $pdfMessage);
		$this->mail_model->sendPatientMail($adminMailConfig);
	}
	public function appointment_add($mobile,$patientid,$name,$date1,$date2,$email,$doa,$rand,$amount)
	{	
		  $data = array(
		    'patient_id'=>$patientid,
			'title' => $name,
			'har_email' => $email,
			'har_mob_no' => $mobile,
			'start' => $date1,
			'end' => $date2,
			'amount' =>$amount,
			'appointment_from'=>$doa,
			'appointment_to' => $doa,
			'gen_date' => date('Y-m-d'),
			'client_id'=>$this->session->userdata('client_id')
		);
		
		$this->db->insert('tbl_demoappointments', $data);
		$app_id = $this->db->insert_id();
		return $app_id;
	}
	public function verify_email($patient_name,$email,$rand,$c_id) {
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('clinic_name')->from('tbl_client');
		$res = $this->db->get();
		$clinic = $res->row()->clinic_name; 
		$this->load->library('email');
		$this->load->helper('path');
        $this->load->helper('directory'); 
		 $this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'physioplus',
				  'smtp_pass' => 'sendgrid@pwd2016',
				  'smtp_port' => 587,
				  'crlf' => "\r\n",
				  'newline' => "\r\n"
		  ));
          $path = set_realpath('uploads/mail/');
          $file_names = directory_map($path);
		  $this->email->from('no-reply@physioplustech.com',$clinic);
		  
			$html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="background-color: #e4e7e0;"> <tbody><tr> <td width="100%"> <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: 0 auto; padding: 0;" class="mobile"> <tbody><tr> <td width="100%"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 5px 0; color: #000000; font-family: Arial,Helvetica,sans-serif; font-size: 11px; font-weight: light; line-height: 15px;">Registration confirmation. </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="45%" style="padding: 7px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="font: 26px impact; color: #fff;">Physio Plus Tech<!--<img width="174" height="34" border="0" style="display: block;" alt="Logo" src="logo.png" class="imageScale">--></td> </tr> </tbody></table> </td> <td width="55%" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 2px 15px; background-color: #23a6bd; color: #ffffff; font-family: Impact; font-size: 25px; line-height: 29px;">WELCOME</td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff; padding: 20px 0 10px 0;"> <tbody><tr> <td class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding: 15px 0 0 0;"> <tbody><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"> <div style="color: #130f0e; font-size: 14px; font-weight: bold; line-height: 21px; text-align: left;">Dear '. $patient_name .',</div><br> <div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">thanks for registering with '.$clinic.' </div><br> <div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">Email Verification code is </div><br> <div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">'.$rand.' </div><br> <div style="color: #130f0e; font-size: 14px; line-height: 20px; text-align: left;"> </div><br> </td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="100%" style="font-size: 10px;">&nbsp;</td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding-bottom: 14px;"> <tbody><tr> <td width="30%" style="padding: 10px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Facebook" src="'. base_url() .'img/facebook.png"></a></td> <td align="center"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Twitter" src="'. base_url() .'img/twitter.png"></a></td> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img border="0" style="display: block;" alt="Envelope" src="'. base_url() .'img/envelope.png"></a></td> <td align="center" style="padding-right: 7px;"></td> </tr> </tbody></table> </td> <td width="70%" style="padding: 10px 0; background-color: #343135;" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding-right: 10px; padding-left: 7px; color: #ffffff; font-family: Arial,Helvetica,sans-serif; font-size: 10px; line-height: 14px; text-align: left;">You have received this email cause you have subscribed to Physio plus tech<br> &copy; 2013 Your Company</td> </tr> </tbody></table> </td> </tr> </tbody></table> </td> </tr> </tbody></table></td> </tr> </tbody></table>';	
			$this->email->to($email);
			$this->email->subject('Congratulations! Welcome to '.$clinic);
			$this->email->message($html);
			$this->email->send();
	} 
	public function det_app($name,$patient_id,$har_email,$id,$amount,$c_id) {
		$data = array(
		  'patient_id' =>$patient_id,
		  'patient_name' =>$name,
		  'email' =>$har_email,
		  'chartname' => 'Appointment Charge',
		  'chart_no' => $id,
		  'client_id' => $c_id,
		  'ex_date' => date('Y-m-d'),
		  'pay' => 'paid',
		  'amount' => $amount,
		  't_status' => 2,
		);
		$this->db->insert('prescription_detail',$data);
		return true;
		
	}
	
	public function add(){
		
		$data = array(
		 'patient_id' => $this->session->userdata('patient_id'),
		);
		$this->db->insert('tbl_appointments',$data);
		return true;
	}
	public function get_appoinments1()
	{
		$this->db->where('firstvisit_followup',0);
		$this->db->set('color','#CBD35D'); 
		$this->db->update('tbl_appointments'); 
		
		$this->db->where('firstvisit_followup !=',0);
		$this->db->set('color','#27BACF'); 
		$this->db->update('tbl_appointments');   

		$this->db->distinct();
		if($this->uri->segment(4) == 'date'){
		  $from = date('Y-m-d',  strtotime($this->uri->segment(5)));  
		  $to = date('Y-m-d',  strtotime($this->uri->segment(6)));
		  $where_condition = "(appointment_from >= '".$from."' AND appointment_from <= '".$to."')";
		} elseif($this->uri->segment(4) == 'consult'){
		  $this->db->where('staff_id',$this->uri->segment(5));  
		}
		else {
		  $this->db->where('client_id',$this->session->userdata('client_id'));
		  $this->db->select('days_display,days_display_after')->from('tbl_settings');
		  $res = $this->db->get();
		  if($res->result_array() != false){
				$days = $res ->row()->days_display;
				$days1 = $res ->row()->days_display_after;
				if($days == '0' || $days == '') {  
					$date = date('Y-m-d');
					$day1 ='-30 day';
					$to = date('Y-m-d',strtotime($day1));
					$day2 ='+7 day';
					$to1 = date('Y-m-d',strtotime($day2)); 
					if($to == false ) {
						$to == $date;
					} if($to1 == false ) {
						$to1 == $date;
					}  
					$where_condition = "(ai.appointment_from >= '".$to."' AND ai.appointment_from <='".$to1."')";
					$this->db->where($where_condition);
					$this->db->where('ai.client_id',$this->session->userdata('client_id'));
				}
				else { 
					$date = date('Y-m-d');
					$day1 ='-'.$days.' day';
					$to = date('Y-m-d',strtotime($day1));
					$day2 ='+'.$days1.'day';
					$to1 = date('Y-m-d',strtotime($day2)); 
					if($to == false ) {
						$to == $date;
					} if($to1 == false ) {
						$to1 == $date;
					}  
					$where_condition = "(ai.appointment_from >= '".$to."' AND ai.appointment_from <='".$to1."')";
					$this->db->where($where_condition);
					//$this->db->where($where_condition1);
				} 
			  }
			}
			if($this->session->userdata('staff_id') != false){
				$this->db->where('ai.staff_id',$this->session->userdata('staff_id'));
			}
			$this->db->where('ai.client_id',$this->session->userdata('client_id'));
			$this->db->where('ai.status !=',1);  
			$this->db->select('ai.chat_room,ai.encounter_type,pi.mobile_no,ai.remind,ai.visit,ai.notes,ai.bill,ai.bill_id,ai.bill_status,pi.first_name AS title,ai.start,ai.end,ai.staff_id as resourceId,ai.color,ai.patient_id,ai.appointment_id,ai.status,ai.appointment_from')->from('tbl_appointments ai');
			$this->db->join('tbl_patient_info pi','pi.patient_id=ai.patient_id');
			$query = $this->db->get();
			return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function get_staffs() {
		if($this->uri->segment('4') == 'consult'){
			$this->db->where('staff_id',$this->uri->segment('5'));
		}
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('is_doctor',1);
		$this->db->select('staff_id as id,first_name as title')->from('tbl_staff_info');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function get_time(){
		$this->db->select('start,end,staff_id as resourceId,rendering,color,dow')->from('tbl_time');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function staff_slot($staff_id) {
		$this->db->where('staff_id',$staff_id);
		$this->db->select('*')->from('tbl_daywise');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	
	}
	public function add_event() {
		$var = date('H:i:s',strtotime($this->input->post('start_time')));
		$var1 = date('H:i:s',strtotime($this->input->post('end_time')));
		$date = explode(',',$this->input->post('treatment_date'));
		for( $i = 0; $i < count($date); $i++){
			$data = array(
			 'rendering' => 'background',
			 'start' =>date('Y-m-d',strtotime($date[$i])).' '.$var,
			 'end' => date('Y-m-d',strtotime($date[$i])).' '.$var1,
			 'staff_id' => $this->input->post('Consult'),
			 'color' => '#FF0000',
			 'Title' => $this->input->post('desc'),
			 'client_id'=> $this->session->userdata('client_id'),
			);
				$this->db->insert('tbl_events',$data);
		}
		return $this->input->post('Consult');
	} 
	public function get_event() {
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('event_id,start,end,staff_id as resourceId,rendering,color,title')->from('tbl_events');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function search_event($val) {
		$start = explode('/',$val);
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('start <=',$start[0]);
		$this->db->where('end >=',$start[0]);
		$this->db->where('staff_id',$start[1]);
		$this->db->select('*')->from('tbl_events');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function delete_event() {
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('staff_id',$this->input->post('e_staffid'));
		$this->db->where('start <=',$this->input->post('start_event'));
		$this->db->where('end >=',$this->input->post('start_event'));
		$this->db->delete('tbl_events');
		return $this->input->post('e_staffid');
	}
	public function add_notes($v1) {
		$val = explode('/',$v1);
		$this->db->where('appointment_id',$val[1]);
		$this->db->set('notes',$val[0]);
		$this->db->update('tbl_appointments');
		return $val[1];
	}
	public function edit_apt($provi)
	{	
		$prov = explode('/',$provi);
		  $data = array(
			'start' => $prov[0],
			'end' => $prov[1],
			'appointment_from'=>date('Y-m-d',strtotime($prov[0])),
			'appointment_to'=>date('Y-m-d',strtotime($prov[0])),
			'staff_id'=>$prov[3]
		);
	
		$this->db->where('appointment_id',$prov[2]);
		$this->db->update('tbl_appointments', $data);
		return true; 
	}
	public function get_notes($id) {
		$this->db->where('appointment_id',$id);
		$this->db->select('notes')->from('tbl_appointments');
		$q = $this->db->get();
		$notes = $q->row()->notes;
		return $notes;
	}
	public function get_apt($id) {
		$this->db->where('appointment_id',$id);
		$this->db->select('appointment_from,patient_id')->from('tbl_appointments');
		$q = $this->db->get();
		$appointment_from = $q->row()->appointment_from;
		$patient_id = $q->row()->patient_id;
		
		$this->db->where('patient_id',$patient_id);
		$this->db->where('appointment_from >',$appointment_from);
		$this->db->limit(1);
		$this->db->order_by('appointment_id','ASC');
		$this->db->select('start')->from('tbl_appointments');
		$res = $this->db->get();
		if($res->result_array() != false){
			$appointment_from = date('d M, h:i a',strtotime($res->row()->start));
			return $appointment_from;
		} else {
			return 'Null';
		}
	}
	public function get_consu($id) {
		$this->db->where('ai.appointment_id',$id);
		$this->db->select('si.first_name,si.last_name')->from('tbl_appointments ai');
		$this->db->join('tbl_staff_info si','si.staff_id = ai.staff_id');
		$q = $this->db->get();
		
		if($q->result_array() != false){
			return $name = $q->row()->first_name.' '.$q->row()->last_name;
		} else {
			return 'Null';
		}
	}
	public function viewupappointment_detail($patient_id) {
		$this->db->where('ai.patient_id',$patient_id);
		$this->db->where('ai.appointment_from >=',date('Y-m-d'));
		$this->db->select('ai.order_id,ai.visit,ai.appointment_id,ai.bill_id,ai.end,ai.start,ai.appointment_from,ai.title,si.first_name,si.last_name,ai.firstvisit_followup,ai.notes')->from('tbl_appointments ai');
		$this->db->join('tbl_staff_info si','ai.staff_id = si.staff_id');
		$this->db->order_by('ai.appointment_from','ASC');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function viewpreviousappointment_detail($patient_id) {
		$this->db->where('ai.patient_id',$patient_id);
		$this->db->where('ai.appointment_from <',date('Y-m-d'));
		$this->db->select('ai.order_id,ai.visit,ai.appointment_id,ai.bill_id,ai.end,ai.start,ai.appointment_from,ai.title,si.first_name,si.last_name,ai.firstvisit_followup,ai.notes')->from('tbl_appointments ai');
		$this->db->join('tbl_staff_info si','ai.staff_id = si.staff_id');
		$this->db->order_by('ai.appointment_from','DESC');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function viewinvoice_detail($patient_id) {
		$this->db->where('patient_id',$patient_id);
		$this->db->select('si.first_name,si.last_name,ih.bill_id,ih.patient_id,ih.treatment_date,ih.bill_status,ih.due_date,ih.net_amt,ih.paid_amt,ih.payment_mode')->from('tbl_invoice_header ih');
		$this->db->join('tbl_staff_info si','si.staff_id = ih.staff_id');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function viewregister_detail($patient_id) {
		$this->db->where('patient_id',$patient_id);
		$this->db->select('sn.item_name,si.first_name,si.last_name,sn.sn_id,sn.sn_date,sn.Session_count,sn.Comment_sess')->from('tbl_session_det sn');
		$this->db->join('tbl_staff_info si','si.staff_id = sn.staff_id');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function generate_code_invoice() {
		$string  = 'B' ;
		//$this->db->select('bill_no')->from('tbl_invoice_header')->where('client_id',$this->session->userdata('client_id'))->like('bill_no', $string, 'after'); 
		$this->db->select('bill_no')->from('tbl_invoice_header')->where('client_id',$this->session->userdata('client_id'))->like('bill_no'); 
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $string . ($query->num_rows() + 1);
		} else {
			return $string . '1';
		}
	}
	public function make_bill($appointment_id){
		$bill_no= $this->generate_code_invoice();
		$this->db->where('appointment_id',$appointment_id);
		$this->db->select('ai.patient_id,ai.appointment_from,ai.staff_id,it.item_name,ai.item_id,it.item_price,it.item_desc')->from('tbl_appointments ai');
		$this->db->join('tbl_item it','ai.item_id=it.item_id');
		$res = $this->db->get();
		if($res->result_array() != false){	
			$invoice_info = array(
				 'client_id' => $this->session->userdata('client_id'),
				 'bill_no' => $bill_no,
				 'patient_id' => $res->row()->patient_id,
				 'staff_id' => $res->row()->staff_id,
				 'treatment_date' => date('Y-m-d',strtotime(str_replace('/','-',$res->row()->appointment_from))),
				 'due_date' => date('Y-m-d',strtotime(str_replace('/','-',$res->row()->appointment_from))),
				 'notes' => '',
				 'total_amt' => $res->row()->item_price,
				 'tax_perc' => '',
				 'discount_perc' => '',
				 'net_amt' => $res->row()->item_price,
				 'bill_status' => 0,
				 'generated_by' => $this->session->userdata('firstname'),
				 'created_by' => $this->session->userdata('username'),
				 'created_date' => date('Y-m-d H:i:s'),
				 'modify_by' => $this->session->userdata('username'),
				 'modify_date' => date('Y-m-d H:i:s'),  
			);
			
			$this->db->insert('tbl_invoice_header', $invoice_info);
			$bill_id=$this->db->insert_id();
			
			$invdtl = array(
						 'treatment_date' => date('Y-m-d',strtotime(str_replace('/','-',$res->row()->appointment_from))),
						 'client_id' => $this->session->userdata('client_id'),
						 'bill_id' => $bill_id,
						 's_no' => 1,
						 'item_id' => $res->row()->item_id,
						 'staff_id' =>$res->row()->staff_id,
						 'item_desc' => $res->row()->item_desc,
						 'item_quantity' => 1,
						 'item_price' => $res->row()->item_price,
						 'item_amount' => $res->row()->item_price,
						 'created_by' => $this->session->userdata('username'),
						 'created_date' => date('Y-m-d H:i:s'),
						 'modify_by' => $this->session->userdata('username'),
						 'modify_date' => date('Y-m-d H:i:s'),
					 );
					 $this->db->insert('tbl_invoice_detail', $invdtl);
					 
					 $this->db->where('appointment_id',$appointment_id);
					 $this->db->set('bill_id',$bill_id);
					 $this->db->update('tbl_appointments');
			return $bill_id;
		}
	}
	public function verify_otp($appoint_id,$otp)
	{	
		$where_condition = "(appointment_id = '".$appoint_id."' AND patient_otp = '".$otp."')";
		$this->db->select('chat_room')->from('tbl_appointments')->where($where_condition);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row()->chat_room : false;
	}
	public function update_otp($appoint_id,$otp)
	{	
		
		$data = array(
			'patient_otp' => $otp
		);
		$this->db->where('appointment_id',$appoint_id);
		$this->db->update('tbl_appointments', $data);
		return true; 
	}
	public function clinic_details($client_id) {
		$this->db->select('*')->from('tbl_client')->where('client_id',$client_id);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
} 
?> 
	
	
	
	
	
 