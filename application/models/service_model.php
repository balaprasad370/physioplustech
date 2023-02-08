<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Service_model extends CI_Model {
	
	public function getLocations_lat($client_id)
	{	
		$clientId = $client_id;
		$data[]='';
		$parentClientId = $this->getParentClientId($clientId);
		if($parentClientId == 11){ 
			$client_id = $clientId;
			$where = array('parent_client_id' => $client_id,'status' => 1);
		} else  {
			$profileInfo = $this->registration_model->editProfile($clientId);
			$client_id = $profileInfo['parent_client_id'];
			$where = array('parent_client_id' => $client_id,'client_id !=' => $clientId,'status' => 1);
		}
		$this->db->select('branch_name,client_id,address,latitude,longitude,city,state')->from('tbl_client')->where($where);
		$query = $this->db->get();  
		foreach($query->result_array() as $row){
			$address = $row['city'].','.$row['state'];
			$geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false'); 
			$output = json_decode($geocodeFromAddr);  
        	$latitude  = $output->results[0]->geometry->location->lat; 
			$longitude = $output->results[0]->geometry->location->lng;
			$this->db->where('client_id',$row['client_id']);
			$this->db->set('latitude',$latitude);
			$this->db->set('longitude',$longitude);
			$this->db->update('tbl_client');
		}
		return true;

	}
	public function getLocations($client_id)
	{	
		$clientId = $client_id;
		$data[]='';
		$parentClientId = $this->getParentClientId($clientId);
		//if($parentClientId == 0){  
			$client_id = $clientId;
			$where = array('parent_client_id' => $client_id,'status' => 1);
		/* }else{
			$profileInfo = $this->registration_model->editProfile($clientId);
			$client_id = $profileInfo['parent_client_id'];
			$where = array('parent_client_id' => $client_id,'client_id !=' => $clientId,'status' => 1);
		} */
		$this->db->select('department,branch_name,client_id,address,latitude,longitude')->from('tbl_client')->where($where);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function getParentClientId($client_id = '')
	{  
		if($client_id == ''){
			$clientId = $this->session->userdata('client_id');
		}else{
			$clientId = $client_id;
		}
		$this->db->select('parent_client_id')->from('tbl_client')->where('client_id',$clientId);
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->parent_client_id : false ;
	}
	public function client_details() {
		$this->db->where('client_id',$this->uri->segment(3));
		$this->db->select('token,email,first_name,clinic_name,branch_name,address,zipcode,mobile,latitude,longitude,phone,state')->from('tbl_client');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	/*-----------------setting update-------------------*/
	public function brand_view($client_id) {
		$this->db->where('client_id',$client_id);
		$this->db->select('address,city,state,zipcode,country,contact_mail,website,removebranding,facebook,twitter,youtube')->from('tbl_client');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function setting_google_view($client_id) {
		$this->db->where('client_id',$client_id);
		$this->db->select('googleRevew_link,map')->from('tbl_client');
		$query = $this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	
	public function setting_invoice_view($client_id) {
		$this->db->where('client_id',$client_id);
		$this->db->select('notes,note,footer')->from('tbl_client');
		$query = $this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function setting_general_view($client_id) {
		$this->db->select('discount,tax')->from('tbl_settings');
		$this->db->where('client_id',$client_id);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	
	public function update_branding()
	{
		//$result = $this->input->post('country');
        //$result_explode = explode('|', $result);
	if($_GET['remove_branding']){
			$removebranding = 1;
		}else{
			$removebranding = 0;
		}
		$registration_info = array(
			'address' => $_GET['address'],
			'contact_mail' => $_GET['mail'],
			'city' => $_GET['city'],
			'state' => $_GET['state'],
			'zipcode' => $_GET['zipcode'],
			'Website' => $_GET['Website'],
			'country'=>$_GET['country'],
			'currency'=>'',
			'created_on' => date('Y-m-d H:i:s'),
			'last_login_date' => date('Y-m-d H:i:s'),
			'removebranding' => $removebranding,
			'facebook' => $_GET['facebook'],
			'twitter' => $_GET['twitter'],
			'youtube' => $_GET['youtube']
			/* 'map'=>$this->input->post('map'),
            'googleRevew_link'=>$this->input->post('review') */
		);
			
		$this->db->where('client_id', $_GET['branch']);
		$this->db->update('tbl_client',$registration_info);
		//echo $this->db->last_query();exit;
		return $_GET['branch'];
	}
	public function setting_google_update($client_id) {
		
		$registration_info = array(
			'map'=>$_GET['map'],
            'googleRevew_link'=>$_GET['review']
		);
			
		$this->db->where('client_id', $client_id);
		$this->db->update('tbl_client',$registration_info);
		return $client_id;
	}
	public function setting_invoice_save($client_id)
	{
		$settings_info = array(
			'notes' => $_GET['notes'],		
			'note' => $_GET['note'],
			'footer' => $_GET['footer'],
		);
		$this->db->where('client_id',$client_id);
		$this->db->update('tbl_client', $settings_info);
		return $client_id;
	}
	public function general_setting_save($client_id)
	{
		$settings_info = array(
			'client_id' => $client_id,
			'discount' => $_GET['discount'],
			'tax' => $_GET['tax'],
			
		);
		
		$data = $this->editSettings($client_id);
		if($data != false){
			$this->db->where('client_id', $client_id);
			$this->db->update('tbl_settings',$settings_info);
		}else{
			$this->db->insert('tbl_settings', $settings_info);
		}
		return $client_id;
	}
	public function editSettings($client_id)
	{	
		$this->db->select('*')->from('tbl_settings');
		$this->db->where('client_id',$client_id);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	/*----------------------------------*/
	public function schedule_time($client_id){
			$this->db->select('client_id,monday_fn_from,monday_an_to,tuesday_fn_from,tuesday_an_to,wednesday_fn_from,wednesday_an_to,thursday_fn_from,thursday_an_to,friday_fn_from,friday_an_to,saturday_fn_from,saturday_an_to,sunday_fn_from,sunday_an_to')->from('tbl_schedule_settings')->where('client_id',$client_id);
			$query = $this->db->get();
			return ($query->num_rows() > 0 ) ? $query->result_array() : false ;
	}
	public function sch_slot($client_id){
		$this->db->select('sch_slot,sch_time')->from('tbl_settings')->where('client_id',$client_id);
		$query = $this->db->get();
		return ($query->num_rows() > 0 ) ? $query->result_array() : false ;
	}
	public function appointment_details($client_id,$email) {
		$arr = array($client_id);
		if($client_id == ''){
			$clientId = $this->session->userdata('client_id');
		}else{
			$clientId = $client_id;
		}
		$data[]='';
		$parentClientId = $this->getParentClientId($clientId);
		if($parentClientId == 0){
			$client_id = $clientId;
			$where = array('parent_client_id' => $client_id,'status' => 1);
		}else{
			$profileInfo = $this->registration_model->editProfile($clientId);
			$client_id = $profileInfo['parent_client_id'];
			$where = array('parent_client_id' => $client_id,'client_id !=' => $clientId,'status' => 1);
		}
		
		$this->db->select('client_id')->from('tbl_client')->where($where);
		
		$query = $this->db->get();
		$appointQuery = $query->result_array();
		foreach($appointQuery as $counts) {
			$arr[] = $counts['client_id'];
			
		}
		
		$this->db->where_in('client_id',$arr);
		$this->db->where('har_email',$email);
		$this->db->where('status !=',1);
		$this->db->where('status !=',2);
		$this->db->select('client_id,appointment_id,t_status,title,har_mob_no,har_email,start,appointment_from')->from('tbl_appointments');
		$this->db->order_by('appointment_id','desc');
		$query = $this->db->get();  
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	 }
	public function appointment_view($app_id) {
		$this->db->where('appointment_id',$app_id);
		$this->db->select('client_id,appointment_id,t_status,title,har_mob_no,har_email,start,appointment_from')->from('tbl_appointments');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	
	
	public function frontpage_details($id) {
		$this->db->where('cmsid',$id);
		$this->db->select('*')->from('tbl_cms');  
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function cancel_appointments($appointment_id) {
		$this->db->select('start,client_id,title,patient_id')->from('tbl_appointments');
		$this->db->where('appointment_id',$appointment_id);
		$res = $this->db->get();
		$client_id = $res->row()->client_id;
		$title = $res->row()->title;
		$date = date('d,M Y',strtotime($res->row()->start));
		$time = date('H:i a',strtotime($res->row()->start));
		
		$this->db->where('client_id',$client_id);
		$this->db->select('email,mobile,clinic_name,first_name,total_sms_limit,sms_count')->from('tbl_client');
		$res1 = $this->db->get();  
		$email = $res1->row()->email;
		$mobile = $res1->row()->mobile;
		$clinic_name = $res1->row()->clinic_name;
		$name = $res1->row()->first_name;
		$total_sms_limit = $res1->row()->total_sms_limit;
		$sms_count = $res1->row()->sms_count;
		if($total_sms_limit - $sms_count > 0 || $client_id == '1636' || $client_id == '1809'){
			$message_patient = 'Dear '.$name.',  your appointment with '.$title.' at '.$time.' and '.$date.', has been cancelled by '.$title;
			$sms['patient'] = 'DONE';
			if($client_id != '1636' && $client_id != '1809' ) {
				$patientSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=PHYSIO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$mobile.'&duplicateCheck=true&format=json&msg='.urlencode($message_patient);
				$patient_churl = @fopen($patientSmsURL,'r');
				fclose($patient_churl);
				if (!$patient_churl) {
					// do nothing
				} else {
					$sms_count += 1;
				}
			 } else if($client_id == '1636') {
				$patientSmsURL = 'http://smsindia.techmartonline.com/api/sendhttp.php?authkey=136791ASgfUVtgugG15874a756&mobiles='.$mobile.'&message='.urlencode($message_patient).'&sender=PHPLUS&route=4&country=0';
			   $patient_churl = @fopen($patientSmsURL,'r');
			   fclose($patient_churl);
			   $sms_count += 1;
			} else if($client_id == '1809') {
			   $patientSmsURL = 'http://smsserver9.creativepoint.in/api.php?username=mobiphysio&password=935251&to='.$mobile.'&from=PHYSIO&message='.urlencode($message_patient);
			   $patient_churl = @fopen($patientSmsURL,'r');
			   fclose($patient_churl);
			   $sms_count += 1;
		    } else {
			}
			$this->db->where('client_id', $client_id);
			$this->db->update('tbl_client', array('sms_count' => $sms_count));
						
		}
		/* if($email != false) {
			$this->load->library('email');
			$this->load->helper('path');
			$this->load->helper('directory'); 
			$this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'pavithravarthini',
				  'smtp_pass' => 'physioplus@2017',
				  'smtp_port' => 587,
				  'crlf' => "\r\n",
				  'newline' => "\r\n"
		  ));
		  $path = set_realpath('uploads/mail/');
          $file_names = directory_map($path);
		  $this->email->from('no-reply@physioplustech.com',$clinic_name);
		  $html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="background-color: #e4e7e0;"> <tbody><tr> <td width="100%"> <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: 0 auto; padding: 0;" class="mobile"> <tbody><tr> <td width="100%"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 5px 0; color: #000000; font-family: Arial,Helvetica,sans-serif; font-size: 11px; font-weight: light; line-height: 15px;">Appointment email notification. </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="45%" style="padding: 7px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="font: 26px impact; color: #fff;">'. $info['ClinicName'] .'<!--<img width="174" height="34" border="0" style="display: block;" alt="Logo" src="logo.png" class="imageScale">--></td> </tr> </tbody></table> </td> <td width="55%" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 2px 15px; background-color: #23a6bd; color: #ffffff; font-family: Impact; font-size: 25px; line-height: 29px;">APPOINTMENT NOTIFICATION</td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff; padding: 20px 0 10px 0;"> <tbody><tr> <td class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding: 15px 0 0 0;"> <tbody><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"> <div style="color: #130f0e; font-size: 14px; font-weight: bold; line-height: 21px; text-align: left;">Dear '. $info['PersonName'] .',</div><br> <div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">We are pleased to confirm your appointment at '. $info['ClinicName'] .'.</div><br> <div style="color: #130f0e; font-size: 14px; line-height: 20px; text-align: left;"><strong>on</strong> '. $info['Time'] .'. <strong>For details </strong> '. $info['ClinicMobile'] .' </div><br> <div style="color: #AAAAAA; font-size: 11px; font-weight: bold; line-height: 17px; text-align: right; border-top:1px solid #eee; padding-top:10px; margin-top:10px">'. $info['ClinicName'] .',<br />'. $info['Location'] .'<br />'. $info['ClinicMobile'] .' </div> </td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="100%" style="font-size: 10px;">&nbsp;</td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding-bottom: 14px;"> <tbody><tr> <td width="30%" style="padding: 10px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Facebook" src="'. base_url() .'img/facebook.png"></a></td> <td align="center"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Twitter" src="'. base_url() .'img/twitter.png"></a></td> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img border="0" style="display: block;" alt="Envelope" src="'. base_url() .'img/envelope.png"></a></td> <td align="center" style="padding-right: 7px;"></td> </tr> </tbody></table> </td> <td width="70%" style="padding: 10px 0; background-color: #343135;" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding-right: 10px; padding-left: 7px; color: #ffffff; font-family: Arial,Helvetica,sans-serif; font-size: 10px; line-height: 14px; text-align: left;">You have received this email cause you have subscribed to '. $info['ClinicName'] .'.<br> &copy; 2013 Your Company</td> </tr> </tbody></table> </td> </tr> </tbody></table> </td> </tr> </tbody></table></td> </tr> </tbody></table>';	
				 
		  //$this->email->to($email);
		  $this->email->subject('Cancel Appointments from Mobile App');
		  $this->email->message($html);
		 // $this->email->send();
			
		}  */
			
		$this->db->where('appointment_id',$appointment_id);
		$this->db->set('status','1');  
		$this->db->set('cancel_date',date('Y-m-d'));  
		$this->db->update('tbl_appointments');  
		return "Deleted Successfully";
	}
	public function getclients_lat($client_id)
	{	
		$this->db->select('branch_name,client_id,address,latitude,longitude')->from('tbl_client')->where('client_id',$client_id);
		$query = $this->db->get();
		$address = $query->row()->address;
		$geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false');
		$geo = json_decode($geo, true);
		if ($geo['status'] = 'OK') {
			$latitude = $geo['results'][0]['geometry']['location']['lat'];
			$longitude = $geo['results'][0]['geometry']['location']['lng'];
		}
		$this->db->where('client_id',$client_id);
		$this->db->set('latitude',$latitude);
		$this->db->set('longitude',$longitude);
		$this->db->update('tbl_client');
	}
	public function smsNotification($appointment_id, $notify_to) {
			
		$this->db->select('AT.client_id,AT.start as Time, CT.clinic_name, CT.city,CT.mobile,CT.state, CT.zipcode, CT.mobile,PT.mobile_no as PatientMobile, PT.first_name as PatientName, PT.email as PatientEmail')->from('tbl_appointments AT');
		$this->db->join('tbl_patient_info PT', 'AT.patient_id = PT.patient_id');
		$this->db->join('tbl_client CT', 'AT.client_id = CT.client_id');
		$this->db->where('AT.appointment_id', $appointment_id);
		$query = $this->db->get();
		// if data exist for appointmentid
		if($query->num_rows() > 0){
			$data = $query->row();
			$client_id = $data->client_id;
			$city = ($data->city != '') ? $data->city.', ' : '';
			$mobile = ($data->mobile != '') ? $data->mobile.', ' : '';
			$state = ($data->state != '') ? $data->state : '';
			$zip = ($data->zipcode != '') ? ' - '.$data->zipcode : '';
			$time = date('D jS M h:i a', strtotime($data->Time));
			$location = $city.$state.$zip;
			$profile_info = $this->registration_model->editProfile($client_id);
			$sms_count = $profile_info['sms_count'];
			$sms_limit = $profile_info['total_sms_limit'];
			$message_patient = 'Dear '.ucfirst($data->PatientName).', We are pleased to confirm your appointment at '.ucfirst($data->clinic_name).' on '.$time.' For details ' . ucfirst($data->mobile);
			$sms['patient'] = 'DONE';
			
			if($sms_limit - $sms_count > 0 || $client_id != '1636' || $client_id != '1809' || $client_id != '1948') {
				if($client_id == '1948') {
					$clinic_name1 = 'SUNSHINE SUPER SPECIALITY PHYSIOTHERAPY CLINIC';
					$message_patient1 = 'Dear '.ucfirst($data->PatientName).', We are pleased to confirm your appointment at '.ucfirst($clinic_name1).' on '.$time.' For details ' . ucfirst($data->mobile);
					$patientSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=PHYSIO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$data->PatientMobile.'&duplicateCheck=true&format=json&msg='.urlencode($message_patient1);
					$patient_churl = @fopen($patientSmsURL,'r');
					fclose($patient_churl);
					$sms_count+=1;
				} else {
					$patientSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=PHYSIO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$data->PatientMobile.'&duplicateCheck=true&format=json&msg='.urlencode($message_patient1);
					$patient_churl = @fopen($patientSmsURL,'r');
					fclose($patient_churl);
					$sms_count+=1;
				}
			} else if($client_id == '1809') {
				 $smsUrl = 'http://smsserver9.creativepoint.in/api.php?username=mobiphysio&password=935251&to='.$data->PatientMobile.'&from=PHYSIO&message='.urlencode($message_patient);
				 $doctor_churl = @fopen($smsUrl,'r');
				 fclose($doctor_churl);
				 $sms_count+=1;
			} else if($client_id == '1636') {
				 $smsUrl = 'http://smsindia.techmartonline.com/api/sendhttp.php?authkey=136791ASgfUVtgugG15874a756&mobiles='.$data->PatientMobile.'&message='.urlencode($message_patient).'&sender=PHPLUS&route=4&country=0';
				 $doctor_churl = @fopen($smsUrl,'r');
				 fclose($doctor_churl);
				 $sms_count+=1;
			} else {
			}
			$this->db->where('client_id', $this->session->userdata('client_id'));
			$this->db->update('tbl_client', array('sms_count' => $sms_count));
			return $sms;
		}
		
	}
	public function smsNotification_approve($appointment_id, $notify_to) {
		$this->db->select('AT.client_id,AT.start as Time, CT.clinic_name, CT.city,CT.mobile,CT.state, CT.zipcode, CT.mobile,PT.mobile_no as PatientMobile, PT.first_name as PatientName, PT.email as PatientEmail')->from('tbl_appointments AT');
		$this->db->join('tbl_patient_info PT', 'AT.patient_id = PT.patient_id');
		$this->db->join('tbl_client CT', 'AT.client_id = CT.client_id');
		$this->db->where('AT.appointment_id', $appointment_id);
		$query = $this->db->get();
		// if data exist for appointmentid
		if($query->num_rows() > 0){
			$data = $query->row();
			$client_id = $data->client_id;
			$city = ($data->city != '') ? $data->city.', ' : '';
			$mobile = ($data->mobile != '') ? $data->mobile.', ' : '';
			$state = ($data->state != '') ? $data->state : '';
			$zip = ($data->zipcode != '') ? ' - '.$data->zipcode : '';
			$time = date('D jS M h:i a', strtotime($data->Time));
			$location = $city.$state.$zip;
			
			$profile_info = $this->registration_model->editProfile($client_id);
			$sms_count = $profile_info['sms_count'];
			$message_patient = 'Dear '.ucfirst($data->PatientName).', Your appointment request at the '.ucfirst($data->clinic_name).' on '.$time.' is approved For details ' . ucfirst($data->mobile);
			$sms['patient'] = 'DONE';
			
			if($client_id != '1636' && $client_id != '1809') {
				if($client_id == '1948') {
					$clinic_name1 = 'SUNSHINE SUPER SPECIALITY PHYSIOTHERAPY CLINIC';
					$message_patient1= 'Dear '.ucfirst($data->PatientName).', Your appointment request at the '.ucfirst($clinic_name1).' on '.$time.' is approved For details ' . ucfirst($data->mobile);
			        $patientSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=PHYSIO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$data->PatientMobile.'&duplicateCheck=true&format=json&msg='.urlencode($message_patient1);
					$patient_churl = @fopen($patientSmsURL,'r');
					fclose($patient_churl);
					$sms_count+=1;
				} else {
					$patientSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=PHYSIO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$data->PatientMobile.'&duplicateCheck=true&format=json&msg='.urlencode($message_patient);
					$patient_churl = @fopen($patientSmsURL,'r');
					fclose($patient_churl);
					$sms_count+=1;
				}
			} else if($client_id == '1809')  {
				$patientSmsURL = 'http://smsserver9.creativepoint.in/api.php?username=mobiphysio&password=935251&to='.$data->PatientMobile.'&from=PHYSIO&message='.urlencode($message_patient);
				$patient_churl = @fopen($patientSmsURL,'r');
				fclose($patient_churl);
				$sms_count+=1;
			}
			else if($client_id == '1636')  {
				$patientSmsURL = 'http://smsindia.techmartonline.com/api/sendhttp.php?authkey=136791ASgfUVtgugG15874a756&mobiles='.$data->PatientMobile.'&message='.urlencode($message_patient).'&sender=PHPLUS&route=4&country=0';
				$patient_churl = @fopen($patientSmsURL,'r');
				fclose($patient_churl);
				$sms_count+=1;
			} else {
			}
			$this->db->where('client_id', $this->session->userdata('client_id'));
			$this->db->update('tbl_client', array('sms_count' => $sms_count));
			return $sms;
		}
		
	}
	public function smsNotification_reschedule($appointment_id, $notify_to) {
		$app_id = $this->input->post('appointment_id');
		$slot1 = $this->input->post('slot');
		$iDateFrom = $this->input->post('appointment_from');
		$str = str_replace('/','-',$iDateFrom);
		$date = date('Y-m-d', strtotime($str));
		$t1 = date('H:i:s',strtotime($this->input->post('time')));
		$this->db->select('AT.client_id,AT.start as Time, CT.clinic_name, CT.city,CT.mobile,CT.state, CT.zipcode, CT.mobile,PT.mobile_no as PatientMobile, PT.first_name as PatientName, PT.email as PatientEmail')->from('tbl_appointments AT');
		$this->db->join('tbl_patient_info PT', 'AT.patient_id = PT.patient_id');
		$this->db->join('tbl_client CT', 'AT.client_id = CT.client_id');
		$this->db->where('AT.appointment_id', $appointment_id);
		$query = $this->db->get();
		// if data exist for appointmentid
		if($query->num_rows() > 0){
			$data = $query->row();
			$client_id = $data_>client_id;
			$city = ($data->city != '') ? $data->city.', ' : '';
			$mobile = ($data->mobile != '') ? $data->mobile.', ' : '';
			$state = ($data->state != '') ? $data->state : '';
			$zip = ($data->zipcode != '') ? ' - '.$data->zipcode : '';
			$time = date('D jS M h:i a', strtotime($data->Time));
			$time1 = $date .' '.$t1;
			$time_reschedule = date('D jS M h:i a', strtotime($time1));
			$sms_count = 0;
			$location = $city.$state.$zip;
			$profile_info = $this->registration_model->editProfile($client_id);
			$sms_count = $profile_info['sms_count'];
			$message_patient = 'Dear '.ucfirst($data->PatientName).', Your appointment request at the '.ucfirst($data->clinic_name).' on '.$time.' is rescheduled to '.$time_reschedule.'   For details ' . ucfirst($data->mobile);
			$sms['patient'] = 'DONE';
			if($client_id != '1636' && $client_id != '1809'){
				if($client_id == '1948') {
					$clinic_name1 = 'SUNSHINE SUPER SPECIALITY PHYSIOTHERAPY CLINIC';
					$message_patient = 'Dear '.ucfirst($data->PatientName).', Your appointment request at the '.ucfirst($clinic_name1).' on '.$time.' is rescheduled to '.$time_reschedule.'   For details ' . ucfirst($data->mobile);
					$patientSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=PHYSIO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$data->PatientMobile.'&duplicateCheck=true&format=json&msg='.urlencode($message_patient);
					$patient_churl = @fopen($patientSmsURL,'r');
					fclose($patient_churl);
					$sms_count+=1;
				} else {
				$patientSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=PHYSIO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$data->PatientMobile.'&duplicateCheck=true&format=json&msg='.urlencode($message_patient);
				$patient_churl = @fopen($patientSmsURL,'r');
				fclose($patient_churl);
				$sms_count+=1;
				}
				
			} else if($client_id == '1809') {
				$patientSmsURL = 'http://smsserver9.creativepoint.in/api.php?username=mobiphysio&password=935251&to='.$data->PatientMobile.'&from=PHYSIO&message='.urlencode($message_patient);
				$patient_churl = @fopen($patientSmsURL,'r');
				fclose($patient_churl);
				$sms_count+=1;
			} else if($client_id == '1636') {
				$patientSmsURL = 'http://smsindia.techmartonline.com/api/sendhttp.php?authkey=136791ASgfUVtgugG15874a756&mobiles='.$data->PatientMobile.'&message='.urlencode($message_patient).'&sender=PHPLUS&route=4&country=0';
				$patient_churl = @fopen($patientSmsURL,'r');
				fclose($patient_churl);
				$sms_count+=1;
			} else {
			}
			$this->db->where('client_id', $this->session->userdata('client_id'));
			$this->db->update('tbl_client', array('sms_count' => $sms_count));
			return $sms;
		}
		
	}
	public function user_login() {
	//	print_r($_POST);exit;
		/* $email = $_POST['email'];
		$password = $_POST['password'];
		$this->db->where('email',$email);  
		$this->db->where('password',$password);
		$this->db->select('client_id,patient_id,status')->from('tbl_patient_info');
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		return ($query->num_rows() > 0) ? $query->result_array() : false ; */
		$this->db->where('username',$_POST['email']);
		$this->db->where('password',$_POST['password']);
		$this->db->select('client_id,plan,first_name,clinic_name,branch_name,parent_client_id')->from('tbl_client');
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function forget_password() {
		$branch = $_GET["branch"];
		$this->db->where('client_id',$branch);
		$this->db->select('clinic_name')->from('tbl_client');
		$res1 = $this->db->get();
		$clinic = $res1->row()->clinic_name;
		
		$email = $_GET['email'];
		$this->db->where('email',$email);
		$this->db->select('mobile_no,first_name')->from('tbl_patient_info');
		$res = $this->db->get();
		$mobile = $res->row()->mobile_no;
		$name = $res->row()->first_name;
		$html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="background-color: #e4e7e0;"> <tbody><tr> <td width="100%"> <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: 0 auto; padding: 0;" class="mobile"> <tbody><tr> <td width="100%"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 5px 0; color: #000000; font-family: Arial,Helvetica,sans-serif; font-size: 11px; font-weight: light; line-height: 15px;">Password recovered successfully. </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="45%" style="padding: 7px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="font: 26px impact; color: #fff;">'.$clinic.'<!--<img width="174" height="34" border="0" style="display: block;" alt="Logo" src="logo.png" class="imageScale">--></td> </tr> </tbody></table> </td> <td width="55%" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 2px 15px; background-color: #23a6bd; color: #ffffff; font-family: Impact; font-size: 25px; line-height: 29px;">Password Recovered Successfully</td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff; padding: 20px 0 10px 0;"> <tbody><tr> <td class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding: 15px 0 0 0;"> <tbody><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"> <div style="color: #130f0e; font-size: 14px; font-weight: bold; line-height: 21px; text-align: left;">Dear '.$name.',</div><br> <div style="color: #130f0e; font-size: 14px; line-height: 21px; margin-left:30px">Your password is : <strong>'.$mobile.'</strong></div><br><div style="color: #AAAAAA; font-size: 11px; font-weight: bold; line-height: 17px; text-align: right; border-top:1px solid #eee; padding-top:10px; margin-top:10px"></div> </td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="100%" style="font-size: 10px;">&nbsp;</td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding-bottom: 14px;"> <tbody><tr> <td width="30%" style="padding: 10px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Facebook" src="'. base_url() .'img/facebook.png"></a></td> <td align="center"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Twitter" src="'. base_url() .'img/twitter.png"></a></td> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img border="0" style="display: block;" alt="Envelope" src="'. base_url() .'img/envelope.png"></a></td> <td align="center" style="padding-right: 7px;"></td> </tr> </tbody></table> </td> <td width="70%" style="padding: 10px 0; background-color: #343135;" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding-right: 10px; padding-left: 7px; color: #ffffff; font-family: Arial,Helvetica,sans-serif; font-size: 10px; line-height: 14px; text-align: left;">You have received this email cause you have subscribed to Physio plus tech<br> &copy; 2013 Your Company</td> </tr> </tbody></table> </td> </tr> </tbody></table> </td> </tr> </tbody></table></td> </tr> </tbody></table>';	
		$this->email->to($email);
		$this->email->subject('Congratulations! Password Recovery Successful - Mobile APP');
		$this->email->message($html);
		$this->email->send(); 	
		return $email;  
	}
	public function user_details() {
		$client_id = $_POST['branch'];
		$patient_id = $_POST['patient_id'];
		$this->db->where('patient_id',$patient_id);
		$this->db->where('client_id',$client_id);
		$this->db->select('*')->from('tbl_patient_info');
		$query = $this->db->get();
		$output = $query->row_array();
		if($output['photo'] != '')
		{
			$output['photo'] = base_url().'/uploads/patient/'.$output['photo'];
		} else {
			$output['photo'] = '';
		}
		return ($query->num_rows() > 0) ? $output : false ;
	 }
	public function verify_code($name,$mobile,$rand,$branch) {
		$this->load->model('appoinment_model');
		$client_id = $branch;
		$profile_info = $this->appoinment_model->editProfile($client_id);
			$sms_count = $profile_info['sms_count'];
			$sms_limit= $profile_info['total_sms_limit'];
			if($mobile != '') {
				$message_patient = 'Mobile Verification Code is '.$rand.'';
				$sms['patient'] = 'DONE';
				if($client_id != '1636' && $client_id != '1809'){
					if($sms_limit > $sms_count) {
						$patientSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=PHYSIO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$mobile.'&duplicateCheck=true&format=json&msg='.urlencode($message_patient);
						$patient_churl = @fopen($patientSmsURL,'r');
						fclose($patient_churl);
						if (!$patient_churl) {
							
						}else{
							$sms_count += 1;
						} 
						} else {
						}
				} else if($client_id == '1809') {
				   $patientSmsURL = 'http://smsserver9.creativepoint.in/api.php?username=mobiphysio&password=935251&to='.$mobile.'&from=PHYSIO&message='.urlencode($message_patient);
				   $patient_churl = @fopen($patientSmsURL,'r');
				   fclose($patient_churl);
				   $sms_count += 1;
			   }
				else if($client_id == '1636') {
				   $patientSmsURL = 'http://smsindia.techmartonline.com/api/sendhttp.php?authkey=136791ASgfUVtgugG15874a756&mobiles='.$mobile.'&message='.urlencode($message_patient).'&sender=PHPLUS&route=4&country=0';
				   $patient_churl = @fopen($patientSmsURL,'r');
				   fclose($patient_churl);
				   $sms_count += 1;
			   } else {
			   }
			   $this->db->where('client_id', $branch);
			   $this->db->update('tbl_client', array('sms_count' => $sms_count));
			   return $sms;
			}
			
	}
	public function resend_verify_code($name,$mobile,$rand,$branch){
		$this->load->model('appoinment_model');
		$client_id = $branch;
		$profile_info = $this->appoinment_model->editProfile($branch);
			$sms_count = $profile_info['sms_count'];
			$sms_limit= $profile_info['total_sms_limit'];
			if($mobile != '') {
				$message_patient = 'Mobile Verification Code is '.$rand.'';
				$sms['patient'] = 'DONE';
				if($client_id != '1636' && $client_id != '1809'){
					if($sms_limit > $sms_count) {
						$patientSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=PHYSIO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$mobile.'&duplicateCheck=true&format=json&msg='.urlencode($message_patient);
						$patient_churl = @fopen($patientSmsURL,'r');
						fclose($patient_churl);
						if (!$patient_churl) {
							
						}else{
							$sms_count += 1;
						}
						
					} else { }
				} else if($client_id == '1809')  {
					$patientSmsURL = 'http://smsserver9.creativepoint.in/api.php?username=mobiphysio&password=935251&to='.$mobile.'&from=PHYSIO&message='.urlencode($message_patient);
				    $patient_churl = @fopen($patientSmsURL,'r');
				    fclose($patient_churl);
					$sms_count += 1;
				}
				else if($client_id == '1636')  {
					$patientSmsURL = 'http://smsindia.techmartonline.com/api/sendhttp.php?authkey=136791ASgfUVtgugG15874a756&mobiles='.$mobile.'&message='.urlencode($message_patient).'&sender=PHPLUS&route=4&country=0';
				    $patient_churl = @fopen($patientSmsURL,'r');
				    fclose($patient_churl);
					$sms_count += 1;
				} else {
				}
 				$this->db->where('client_id', $branch);
			    $this->db->update('tbl_client', array('sms_count' => $sms_count));
			    return $sms;
			}
			 
	}
	public function clinic_details() {
		$this->db->where('ti.client_id',$_POST['branch']);
		$this->db->select('ai.name,ti.phone,ai.specialities,ai.experience,ai.education,ai.email,ai.clinic_name,ai.address,ai.clinic_website,ai.clinic_from,ai.clinic_to,ai.app_logo,ti.mobile,ai.photo,ai.doctor_photo,ai.short_desc,ai.long_desc,ai.profile_desc')->from('tbl_app_det ai');
		$this->db->join("tbl_client ti", "ti.clinic_name=ai.clinic_name");
		$query = $this->db->get();
		$output = $query->row_array();
		return ($query->num_rows() > 0) ? $output : false ;
	}
	public function token_details() {
		$this->db->where('client_id',$_GET['client_id']);
		$this->db->where('patient_id',$_GET['patient_id']);
		$this->db->select('client_id,token,token_id,patient_id')->from('tbl_device');
		$result = $this->db->get();
		return ($result->num_rows() > 0) ? $result->result_array() : false ;

	}
	public function all_token_details() {
		$this->db->where('client_id',$_GET['client_id']);
		$this->db->select('*')->from('tbl_device');
		$result = $this->db->get();
		return ($result->num_rows() > 0) ? $result->result_array() : false ;

	}
	public function all_tokens() {
		$this->db->where('client_id','1339');
		$this->db->select('*')->from('tbl_device');
		$result = $this->db->get();
		return ($result->num_rows() > 0) ? $result->result_array() : false ;
	}
	public function all_notifications() {
		$this->db->where('client_id',$_GET['client_id']);
		$this->db->select('*')->from('tbl_notifications');
		$this->db->group_by('title');
		$result = $this->db->get();
		return ($result->num_rows() > 0) ? $result->result_array() : false ;
	}
	public function notifications_details() {
		$this->db->where('client_id',$_GET['client_id']);
		$this->db->where('notification_id',$_GET['notification_id']);
		$this->db->where('image !=','');
		$this->db->select('*')->from('tbl_notifications');
		$result = $this->db->get();
		
		return ($result->num_rows() > 0) ? $result->result_array() : false ;
	}
	public function get_token($app_id) {
		$this->db->where('token_id',$app_id);
		$this->db->select('*')->from('tbl_device');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function treatment_protocol($patient_id,$client_id) {
		$this->db->distinct();
		$where = array('tt.patient_id' => $patient_id, 'tt.client_id' => $client_id);
		$this->db->select('tt.treatment_date,tt.client_id,tt.treatment_id,tt.patient_id,tt.treatment_quantity As session,tt.treatment_price,tt.treatment_group_id,tt.bill_status,tt.staff_id,si.first_name,si.last_name,it.item_name AS Treatment_name,it.image_name')->from('tbl_patient_treatment_techniques tt')->where($where);
		$this->db->join("tbl_staff_info si", "tt.staff_id=si.staff_id");
		$this->db->join("tbl_item it", "tt.treatments=it.item_id");
		$this->db->order_by("tt.treatment_date", "desc");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function invoice_view($patient_id,$client_id) {
		$this->db->distinct();
		$where = array('ih.patient_id' => $patient_id, 'ih.client_id' => $client_id);
		$this->db->where($where);
		$this->db->select('ih.client_id,ih.due_date,ih.bill_no,ih.bill_id,ih.patient_id,pi.patient_code,pi.first_name,pi.last_name,ih.net_amt,ih.bill_status,ih.paid_amt,ih.payment_mode');
		$this->db->from("tbl_invoice_header ih");
		$this->db->join("tbl_patient_info pi", "ih.patient_id=pi.patient_id");
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}  
	public function particular_invoicedetails($patient_id,$client_id,$bill_id) {
		$where=array('id.bill_id' => $bill_id);
		$this->db->select('id.bill_id,id.item_id,id.staff_id,it.item_name,it.item_desc,id.item_quantity,id.item_price,id.item_amount,iv.bill_no as invoicename,iv.treatment_date as invoicedate,iv.due_date,iv.bill_status,iv.total_amt,iv.discount_perc, iv.tax_perc,net_amt,iv.payment_mode,iv.paid_amt');
		$this->db->from("tbl_invoice_detail id");
		$this->db->join("tbl_item it", "id.item_id=it.item_id");
		$this->db->join("tbl_invoice_header iv", "iv.bill_id=id.bill_id");
		$this->db->where($where);	
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	
	}
	public function viewchart_detail($patient_id,$client_id) {
		$this->db->distinct();
		if($client_id == 19){
			$this->db->where('patient_id',$patient_id);
			$this->db->select('client_id')->from('tbl_patient_info');
			$res = $this->db->get();
			$client_id = $res->row()->client_id;
			$this->db->where('ch.client_id',$client_id);
		}  else {
			$this->db->where('ch.client_id',$client_id);
		}
		$this->db->select('ch.chard_no,ch.day_view,ci.detail_id as chart_id,ci.date,ci.chartname,ci.chart_no,ch.img_path,ch.time,ch.hold,ch.complete,ch.repet,ch.perform')->from('chart_details ci');
		$this->db->join("save_chart ch","ci.chart_no=ch.chard_no");
		$this->db->where('ci.patient_id',$patient_id);
		$this->db->group_by('chartname');
		$query = $this->db->get();  
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}  
	public function particularchart_detail($client_id,$chart_no) {
		if($chart_no == 'C15' || $chart_no == 'C117' ){
		 $this->db->where('client_id','103');
		} else {
			$this->db->where('client_id',$client_id);
		}     
		$this->db->where('chard_no',$chart_no);
		$this->db->select('img_description,chart_id,chart_name,img_path,title,repet,hold,complete,perform,time')->from('save_chart');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function particularexercise($client_id,$chart_id) {
		$this->db->where('client_id',$client_id);
		$this->db->where('chart_id',$chart_id);
		$this->db->select('chart_id,chart_name,img_path,title,repet,hold,complete,perform,	time')->from('save_chart');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function particularchart_details1($client_id,$chart_id) {
		//$this->db->where('client_id',$client_id);
		$this->db->where('chart_id',$chart_id);
		$this->db->select('chart_id,img_description,chart_name,img_path,title,repet,hold,complete,perform,time')->from('save_chart');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function notify_client($appointment_id) {
		$this->db->select('client_id,start,title,har_mob_no,patient_id')->from('tbl_appointments');
		$this->db->where('appointment_id',$appointment_id);
		$res = $this->db->get();
		$client_id = $res->row()->client_id;
		$title = $res->row()->title .'('.$res->row()->har_mob_no.')';
		$har_mob_no = $res->row()->har_mob_no;
		$start = date('d,M Y',strtotime($res->row()->start));
		$time = date('H:i a',strtotime($res->row()->start));
		
		$this->db->where('client_id',$client_id);
		$this->db->select('email,mobile,clinic_name,first_name,total_sms_limit,sms_count')->from('tbl_client');
		$res1 = $this->db->get();
		$email = $res1->row()->email;
		$mobile = $res1->row()->mobile;
		$clinic_name = $res1->row()->clinic_name;
		$name = $res1->row()->first_name;
		$total_sms_limit = $res1->row()->total_sms_limit;
		$sms_count = $res1->row()->sms_count;
		if($total_sms_limit - $sms_count > 0){
		$message_patient = 'Dear '.ucfirst($name).', you have received an appointment request by '.$title.' at '.$time.' and '.$start.', to approve or reschedule visit your Physioplus account.';				
			$sms['patient'] = 'DONE';
			$patientSmsURL = 'https://sendsms.transmitsms.com/send-sms-fast?key=e602f568c7f20bfcf94b94aa3f076e49&secret=Physio989460&to=65'.$mobile.'&message='.urlencode($message_patient);
			$patient_churl = @fopen($patientSmsURL,'r');
			fclose($patient_churl);
			if (!$patient_churl) {
					// do nothing
			} else {
				$sms_count += 1;
			}
			
			$this->db->where('client_id', $client_id);
			$this->db->update('tbl_client', array('sms_count' => $sms_count));
						
		}
		if($email != false) {
			$this->load->library('email');
			$this->load->helper('path');
			$this->load->helper('directory'); 
			$this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'pavithravarthini',
				  'smtp_pass' => 'physioplus@2017',
				  'smtp_port' => 587,
				  'crlf' => "\r\n",
				  'newline' => "\r\n"
		  ));
		  $path = set_realpath('uploads/mail/');
          $file_names = directory_map($path);
		  $this->email->from('no-reply@physioplustech.com',$clinic_name);
		  $html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="background-color: #e4e7e0;"> <tbody><tr> <td width="100%"> <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: 0 auto; padding: 0;" class="mobile"> <tbody><tr> <td width="100%"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 5px 0; color: #000000; font-family: Arial,Helvetica,sans-serif; font-size: 11px; font-weight: light; line-height: 15px;">Appointment email notification. </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="45%" style="padding: 7px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="font: 26px impact; color: #fff;">'. $clinic_name .'<!--<img width="174" height="34" border="0" style="display: block;" alt="Logo" src="logo.png" class="imageScale">--></td> </tr> </tbody></table> </td> <td width="55%" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 2px 15px; background-color: #23a6bd; color: #ffffff; font-family: Impact; font-size: 25px; line-height: 29px;">APPOINTMENT NOTIFICATION</td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff; padding: 20px 0 10px 0;"> <tbody><tr> <td class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding: 15px 0 0 0;"> <tbody><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"> <div style="color: #130f0e; font-size: 14px; font-weight: bold; line-height: 21px; text-align: left;">Dear '. $name .',</div><br> <div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">you have received an appointment request by '.$title.' at '.$time.' and '.$start.', to approve or reschedule visit your Physioplus account.</div><br> <div style="color: #130f0e; font-size: 14px; line-height: 20px; text-align: left;"></td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="100%" style="font-size: 10px;">&nbsp;</td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding-bottom: 14px;"> <tbody><tr> <td width="30%" style="padding: 10px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Facebook" src="'. base_url() .'img/facebook.png"></a></td> <td align="center"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Twitter" src="'. base_url() .'img/twitter.png"></a></td> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img border="0" style="display: block;" alt="Envelope" src="'. base_url() .'img/envelope.png"></a></td> <td align="center" style="padding-right: 7px;"></td> </tr> </tbody></table> </td> <td width="70%" style="padding: 10px 0; background-color: #343135;" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding-right: 10px; padding-left: 7px; color: #ffffff; font-family: Arial,Helvetica,sans-serif; font-size: 10px; line-height: 14px; text-align: left;">You have received this email cause you have subscribed to '.$clinic_name.'.<br> &copy; 2013 Your Company</td> </tr> </tbody></table> </td> </tr> </tbody></table> </td> </tr> </tbody></table></td> </tr> </tbody></table>';	
		  $this->email->to($email);    
		  $this->email->subject('Appointment request from Mobile App');
		  $this->email->message($html);
		  $this->email->send();
			
		}
		return true;
	}
	public function check_invoice($client_id,$patient_id,$bill_id) {
		$this->db->select('id.bill_id,id.item_id,id.staff_id,SUM(id.item_amount) as Subtotal,iv.bill_no as invoicename,iv.treatment_date as invoicedate,iv.due_date,iv.bill_status,iv.total_amt,iv.discount_perc, iv.tax_perc,net_amt,iv.payment_mode,iv.paid_amt');
		$this->db->from("tbl_invoice_detail id");
		$this->db->join("tbl_item it", "id.item_id=it.item_id");
		$this->db->join("tbl_invoice_header iv", "iv.bill_id=id.bill_id");
		$this->db->where('iv.client_id',$client_id);
		$this->db->where('iv.patient_id',$patient_id);
		$this->db->where('iv.bill_id',$bill_id);
		$this->db->group_by('iv.bill_id');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	
	}
	public function paid_amount($client_id,$patient_id,$bill_id) {
		$this->db->where('client_id',$client_id);
		$this->db->where('bill_id',$bill_id);
		$this->db->select('payment_mode,payment_date,paid_amt');
		$this->db->from("tbl_invoice_payments");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function case_reports($patient_id,$client_id) {
		$this->db->distinct();
		$where = array('pi.patient_id' => $patient_id, 'pi.client_id' => $client_id);
		$this->db->where($where);
		$this->db->select('pi.client_id,pi.appoint_date,pi.patient_code,pi.patient_id,pi.first_name,pi.last_name,di.prov_diagnosis');
		$this->db->from("tbl_patient_info pi");
		$this->db->join('tbl_patient_prov_diagnosis di',"pi.patient_id = di.patient_id");
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	
	public function workout($client_id,$chart_id) {
		$this->db->where('client_id',$client_id);
		$this->db->where('chard_no',$chart_id);
		$this->db->select('*')->from('save_chart');
		$query = $this->db->get();
		$val = $query->num_rows();
		return $val;
	}
	public function chart_details($id,$chart_no) {
		$val = $id + 1;
		$this->db->where('chart_id',$val); 
		$this->db->where('chard_no',$chart_no);
		$this->db->limit(1);
		$this->db->select('*')->from('save_chart');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false ;
	
	}
	public function admin_details() {
		$clientId = $_GET['branch'];
		$data[]='';
		$parentClientId = $this->getParentClientId($clientId);
		if($parentClientId == 0){  
			$client_id = $clientId;
			$where = array('parent_client_id' => $client_id,'status' => 1);
		}else{
			$profileInfo = $this->registration_model->editProfile($clientId);
			$client_id = $profileInfo['parent_client_id'];
			$where = array('parent_client_id' => $client_id,'client_id !=' => $clientId,'status' => 1);
		}
		$this->db->select('first_name,last_name,branch_name,client_id,address,latitude,longitude')->from('tbl_client')->where($where);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	   }
		public function sel_time($id,$chart_id) {
				$this->db->where('patient_id',$id);
				$this->db->where('chard_no',$chart_id);
				$this->db->select('repet')->from('save_chart');
				$query = $this->db->get();
				if($query->result_array() != false){
					return $query->row()->repet;
				} else {
					return false;
				}
		}
		public function doc_list($client_id){
			$this->db->where('client_id',$client_id);
			$this->db->select('*')->from('tbl_doctors_list');
			$query =$this->db->get();
			return ($query->num_rows() > 0) ? $query->result_array() : false ;
		}
	public function user_login1() {
		$email = $_GET['email'];
		$branch = $_GET['branch'];
		$mobile = $_GET['mobile'];
		$this->db->where('client_id',$branch);  
		$this->db->where('email',$email);  
		$this->db->where('mobile_no',$mobile);
		$this->db->select('client_id,patient_id,status,first_name')->from('tbl_patient_info');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function user_login2() {
		$email = $_GET['email'];
		$mobile = $_GET['mobile'];
		$branch = $_GET['branch'];
		$this->db->where('client_id',$branch); 
		$this->db->where('mobile_no',$mobile);  
		$this->db->where('email',$email);  
		$this->db->select('client_id,patient_id,status,first_name')->from('tbl_patient_info');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function basic_exercise($patient_id) {
		if($patient_id != false) {
			$this->db->distinct();
			$chard_no[0] = 'C15';
			$chard_no[1] = 'C117';
			$this->db->select('ch.day_view,ch.chart_name,ch.chard_no,ch.img_path,ch.time,ch.hold,ch.complete,ch.repet,ch.perform')->from('save_chart ch');
			$this->db->where('ch.chard_no','C15');
			$this->db->or_where('ch.chard_no','C117');
			$this->db->where('ch.client_id','103');
			$this->db->group_by('chard_no');
			$query = $this->db->get();    
			return ($query->num_rows() > 0) ? $query->result_array() : false;
		} else {
			return false;
		}
	}  
		
	public function verify_email($patient_name,$email,$rand,$clinic,$branch,$mobile) {
		 $date = date('d-m-Y');
		$this->load->library('email');
		$this->load->helper('path');
        $this->load->helper('directory'); 
		 $this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'pavithravarthini',
				  'smtp_pass' => 'physioplus@2017',
				  'smtp_port' => 587,
				  'crlf' => "\r\n",
				  'newline' => "\r\n"
		  ));
         
		 $this->email->from('no-reply@physioplustech.com',$clinic);
		 $html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="background-color: #e4e7e0;"> <tbody><tr> <td width="100%"> <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: 0 auto; padding: 0;" class="mobile"> <tbody><tr> <td width="100%"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 5px 0; color: #000000; font-family: Arial,Helvetica,sans-serif; font-size: 11px; font-weight: light; line-height: 15px;">Registration confirmation. </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="45%" style="padding: 7px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="font: 26px impact; color: #fff;">Physio Plus Tech<!--<img width="174" height="34" border="0" style="display: block;" alt="Logo" src="logo.png" class="imageScale">--></td> </tr> </tbody></table> </td> <td width="55%" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 2px 15px; background-color: #23a6bd; color: #ffffff; font-family: Impact; font-size: 25px; line-height: 29px;">WELCOME</td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff; padding: 20px 0 10px 0;"> <tbody><tr> <td class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding: 15px 0 0 0;"> <tbody><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"> <div style="color: #130f0e; font-size: 14px; font-weight: bold; line-height: 21px; text-align: left;">Dear '. $patient_name .',</div><br> <div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">thanks for registering with '.$clinic.' </div><br> <div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">Email Verification code is </div><br> <div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">'.$rand.' </div><br> <div style="color: #130f0e; font-size: 14px; line-height: 20px; text-align: left;"> </div><br> </td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="100%" style="font-size: 10px;">&nbsp;</td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding-bottom: 14px;"> <tbody><tr> <td width="30%" style="padding: 10px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Facebook" src="'. base_url() .'img/facebook.png"></a></td> <td align="center"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Twitter" src="'. base_url() .'img/twitter.png"></a></td> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img border="0" style="display: block;" alt="Envelope" src="'. base_url() .'img/envelope.png"></a></td> <td align="center" style="padding-right: 7px;"></td> </tr> </tbody></table> </td> <td width="70%" style="padding: 10px 0; background-color: #343135;" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding-right: 10px; padding-left: 7px; color: #ffffff; font-family: Arial,Helvetica,sans-serif; font-size: 10px; line-height: 14px; text-align: left;">You have received this email cause you have subscribed to Physio plus tech<br> &copy; 2013 Your Company</td> </tr> </tbody></table> </td> </tr> </tbody></table> </td> </tr> </tbody></table></td> </tr> </tbody></table>';	
		 $this->email->to($email);
		 $this->email->subject('Congratulations! Welcome to '.$clinic.' - Mobile APP');
		 $this->email->message($html);
		 $this->email->send();
		
		
		  
		
	}  
	public function pat_details($id,$branch)
	{
		$this->db->where('patient_id',$id);
		$this->db->where('client_id',$branch);
		$this->db->select('email,mobile_no,patient_id')->from('tbl_patient_info');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;

	}
	public function patient_details($client_id){
		$this->db->select('*')->from('tbl_patient_info');
		$this->db->where('client_id',$client_id);
		$query  = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;

	} 
     public function treatment_order() {
		   $client_id = $_GET['branch'];
		    $patient_id = $_GET['patient_id'];
		   $this->db->where('iv.client_id',$client_id);
		   $this->db->where('iv.patient_id',$patient_id);
		   $this->db->select('iv.treatment_id,si.first_name,si.last_name,iv.treatment_quantity,iv.treatment_date,count(iv.treatment_id) as tot')->from('tbl_patient_treatment_techniques iv');
		   $this->db->join("tbl_staff_info si", "iv.staff_id=si.staff_id");
		   $this->db->group_by('iv.treatment_date');
		   $this->db->order_by("iv.treatment_date", "desc");
		   $query = $this->db->get();
		   return ($query->num_rows() > 0) ? $query->result_array() : false ;
	
	 }
    public function consent_details(){
		$client_id =  $_GET['client_id'];
		$this->db->select('consent_form')->from('tbl_client');
		$this->db->where('client_id',$client_id);
		$query  = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false ;

	} 
	public function add_regnotification($client_id,$title,$name,$mobile) {
		 $data  = array(
		 'client_id'=>$client_id,
		 'patient_name'=>$name,
		 'mobile'=>$mobile ,
		 'title'=>$title,
		 'status'=>'1',
		 );
		 $this->db->insert('tbl_client_notification',$data);
		 return $this->db->insert_id();
    }
	public function add_aptnotification($client_id,$title,$name,$mobile,$start) {
		 $data  = array(
		 'client_id'=>$client_id,
		 'patient_name'=>$name,
		 'mobile'=>$mobile ,
		 'title'=>$title,
		 'start'=>$start,
		 'status'=>'1',
		 );
		 $this->db->insert('tbl_client_notification',$data);
		 return $this->db->insert_id();
	 } 
	 public function add_exfeedbacknotification($client_id,$title,$patient_id) {
        $this->db->select('first_name,mobile_no')->from('tbl_patient_info')->where('patient_id',$patient_id);
	    $res1 = $this->db->get();
	    $name = $res1->row()->first_name;
		$mobile=$res1->row()->mobile_no;		

		$data  = array(
		 'client_id'=>$client_id,
		 'patient_name'=>$name,
		 'mobile'=>$mobile ,
		 'title'=>$title,
		 'status'=>'1',
		 );
		 $this->db->insert('tbl_client_notification',$data);
		 return $this->db->insert_id();
	 }
	 public function add_exreqnotification($client_id,$title,$name,$mobile,$ex_type) {
		 $data  = array(
		 'client_id'=>$client_id,
		 'patient_name'=>$name,
		 'mobile'=>$mobile ,
		 'title'=>$title,
		 'status'=>'1',
		 'pain'=>$ex_type
		 );
		 $this->db->insert('tbl_client_notification',$data);
		 return $this->db->insert_id();
	 }
	 public function approve($appointment_id) {
		 $this->db->where('appointment_id',$appointment_id);
		 $this->db->set('t_status','0');
		 $this->db->update('tbl_appointments');
		 return $appointment_id;  
	 }
	 public function getLocations_count($client_id)
	{	
		$clientId = $client_id;
		$data[]='';
		$parentClientId = $this->getParentClientId($clientId);
		if($parentClientId == 0){  
			$client_id = $clientId;
			$where = array('parent_client_id' => $client_id,'status' => 1);
		}else{
			$profileInfo = $this->registration_model->editProfile($clientId);
			$client_id = $profileInfo['parent_client_id'];
			$where = array('parent_client_id' => $client_id,'client_id !=' => $clientId,'status' => 1);
		}
		$this->db->select('COUNT(client_id) as count')->from('tbl_client')->where($where);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false ;
	}
	public function revents_clientdetails() {
		$this->db->where('client_id',$this->uri->segment(3));
		$this->db->select('email,first_name,clinic_name,branch_name,address,zipcode,mobile,latitude,longitude,phone,state')->from('tbl_client');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false ;
	}
	
	public function staff_register() {
	   $data = array(
		   'first_name' => $_POST['name'],
		   'client_id' => $_POST['branch'],  
		   'date_of_joining' => date('Y-m-d'),
		   'gender' => $_POST['gender'],
		   'is_doctor' => $_POST['type'],
		   'mobile_no' => $_POST['mobile'],
		   //'city' => $_POST['city'],
		   'email' => $_POST['email'],
		   'dob' => $_POST['dob'],
		   'staff_code' =>$this->generatestaff_code()
	   );
	   $this->db->insert('tbl_staff_info',$data);
	   $id =  $this->db->insert_id();
	   return $id;   
	   
   }
	 public function generatestaff_code() {
		$query=$this->db->query("select IFNULL(max(substr(staff_code,10,2))+1,1) STAFF_CODE from tbl_staff_info where client_id='".$this->session->userdata('client_id')."'");
		$row = $query->row_array();
		$string  = 'S' . ucfirst(substr($_GET['gender'],0,1)) . ucfirst(substr($this->input->post('first_name'),0,1)) . '/' . date('my') . '/'.$row['STAFF_CODE'];
		return $string;
   }
   public function staff_list() {
		$this->db->where('client_id',$_POST['branch']);
		$this->db->select('*')->from('tbl_staff_info');
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		return ($query->num_rows() > 0) ? $query->result_array() : false;
   }
	public function staff_update()  
	 {
		 $staff_id = $_POST['staff_id'];
		 $data = array(
		  'first_name' =>$_POST['name'], 
		  'mobile_no' =>$_POST['mobile'], 
		  'email' =>$_POST['email'], 
		  'gender' =>$_POST['gender'], 
		  'is_doctor' =>$_POST['type'], 
		  'dob' =>$_POST['dob'], 
		 // 'city' =>$_POSTT['city'], 
		 
		 );
		 $this->db->where('staff_id',$staff_id);
		 $this->db->update('tbl_staff_info',$data);
		 return $staff_id;
	 } 
	 public function add_protocolsession() {
		$this->db->where('patient_id',$_POST['id']);
		$this->db->select('patient_code,first_name,last_name,concess_group_id')->from('tbl_patient_info');
		$res  = $this->db->get();
		$code  = $res->row()->patient_code;
		$first  = $res->row()->first_name;
		$last  = $res->row()->last_name;
		$concession_group_id  = $res->row()->concess_group_id;  
     	
		$staff_id = $_POST['staff_id'];
		$treat = $_POST['treatment'];
		$item_id = $_POST['treatment'];
		$session_cont = $_POST['session'];
		
		$this->db->where('client_id',$_POST['branch']);
		$this->db->select('email,first_name,last_name')->from('tbl_client');
		$res  = $this->db->get();
		$clientName  = $res->row()->first_name.' '.$res->row()->last_name;
		$username  = $res->row()->email;
		$session_cont = $_POST['session'];
		$treat = $_POST['treatment'];		
		$id = explode('-',$treat);
		$treatment_quantity = explode(' - ',$session_cont);
		for($i=0; $i < sizeof($id); $i++){
			$this->db->where('item_id',$id[$i]);
			$this->db->select('item_name')->from('tbl_item');
			$res = $this->db->get();
			$item_name = $res->row()->item_name;
			
			$session_det = array(
				'client_id' => $_POST['branch'],
				'patient_id' => $_POST['id'],
				'staff_id' => $staff_id,
				'patient_code' => $code,
				'sn_date' => date('Y-m-d',strtotime($_POST['sn_date'])),
				'Session_count' => $treatment_quantity[$i],
				'item_id' => $id[$i],
				'item_name' => $item_name,
				'repot_by' =>  $staff_id,
				'Comment_sess' => $_POST['notes'],
				'fpatient_name' => $first,
				'lpatient_name' => $last,
				'created_by' => $username,
				'created_date' => date('Y-m-d H:i:s'),
				'modify_by' => $username,
				'modify_date' => date('Y-m-d H:i:s'),
				  
			);
			$this->db->insert('tbl_session_det',$session_det);
		    $data['sn_id']=$this->db->insert_id(); 
			
		}
		$bill = $_POST['bill_gen'];
		$bill_no=$this->generate_code_bill();
		
		if($bill != '0') {
			$price = 0;
			for($i=0; $i< sizeof($id); $i++){
				$this->db->where('item_id',$id[$i]);
				$this->db->select('item_price,item_desc')->from('tbl_item');
				$res = $this->db->get();
				$price += $res->row()->item_price * $treatment_quantity[$i];
			}
			$tot = $price;
			if($concession_group_id  != '0'){
				$this->db->where('concess_group_id',$concession_group_id);
				$this->db->select('tax_perc,discount_perc')->from('tbl_concess_group');
				$res = $this->db->get();
				$tax = $res->row()->tax_perc;
				$discount = $res->row()->discount_perc;
				$tax_perce = ($tax/100) * $tot; 
				$discount_perce = ($discount/100) * $tot;
				$tot_amt = ($tot + $tax_perce ) - $discount_perce;
			} else{
				$tax = '0';
				$discount = '0';
				$tot_amt = $tot;
			}
					
			$invoice_info = array(
				'client_id' => $_POST['branch'],
				'bill_no' => $bill_no,
				'patient_id' => $_POST['id'],
				'treatment_date' => date('Y-m-d',strtotime($_POST['sn_date'])),
				'due_date' => date('Y-m-d',strtotime($_POST['sn_date'])),
				'total_amt' => $tot,
				'net_amt' => $tot_amt,
				'bill_status' => 0,
				'generated_by' => $clientName,
				'created_by' => $username,
				'created_date' => date('Y-m-d H:i:s'),
				'modify_by' => $username,
				'tax_perc' => $tax,
				'discount_perc' => $discount,
				'modify_date' => date('Y-m-d H:i:s'),
			);
			
			$this->db->insert('tbl_invoice_header', $invoice_info);
			$bill_id=$this->db->insert_id(); 
			
			for($i=0; $i< sizeof($id); $i++){
				$this->db->where('item_id',$id[$i]);
				$this->db->select('item_price,item_desc')->from('tbl_item');
				$res = $this->db->get();
				$price = $res->row()->item_price;
				$item_desc = $res->row()->item_desc;
				$item_amt = $price * $treatment_quantity[$i];
				$dat = array(
			        'client_id' => $_POST['branch'],
					'bill_id' => $bill_id,
					's_no' => '1',
					'item_id' => $id[$i],
					'item_desc' => $item_desc,
					'item_quantity' => $treatment_quantity[$i],
					'item_price' => $price,
					'item_amount' => $item_amt,
					'created_by' => $username,
					'created_date' => date('Y-m-d H:i:s'),
					'modify_by' => $username,
					'modify_date' => date('Y-m-d H:i:s'),
				);
				$this->db->insert('tbl_invoice_detail', $dat);
			}
			
			$this->db->where('patient_id',$_POST['id']);
		    $this->db->where('treatment_date',date('Y-m-d',strtotime($_POST['sn_date'])));  
		    $this->db->set('bill_status','1');
			$this->db->set('bill_id',$bill_id);
			$this->db->update('tbl_patient_treatment_techniques');
		}
		
		return $_POST['id'];    
		
		
	}
	public function generate_code_bill() {
		$string  = 'B' ;
		$this->db->select('bill_no')->from('tbl_invoice_header')->where('client_id',$this->session->userdata('client_id'))->like('bill_no'); 
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $string . ($query->num_rows() + 1);
		} else {
			return $string . '1';  
		}
	}
	public function session_list() {	
		$this->db->where('si.client_id',$_POST['branch']);
		$this->db->select('si.sn_id,si.sn_date,pi.patient_id,pi.patient_code,pi.first_name,pi.gender,si.Comment_sess,si.Session_count,si.item_name')->from('tbl_session_det si');
		$this->db->join('tbl_patient_info pi','si.patient_id = pi.patient_id');
		$this->db->order_by('si.sn_date','desc');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
   } 
	public function todays_appt(){
		 $client_id = $_POST['client_id'];
		$this->db->where('ai.appointment_from',date('Y-m-d'));
		$this->db->where('ai.bill_id',0);
		$this->db->where('ai.status !=',1);
		$this->db->where('ai.t_status !=',1);
		$this->db->select('pi.mobile_no,ai.bill_id,ai.bill_status,si.first_name as sname,si.last_name as slname,ai.visit,ai.bill_id,ai.appointment_from,ai.title,ai.appointment_id,ai.patient_id,pi.gender')->from('tbl_appointments ai');
		$this->db->select("DATE_FORMAT( ai.start, '%h:%i') as start",  FALSE );
		$this->db->select("DATE_FORMAT( ai.end, '%h:%i %p') as end",  FALSE );
		$this->db->join('tbl_patient_info pi','ai.patient_id = pi.patient_id');
		$this->db->join('tbl_staff_info si','si.staff_id = ai.staff_id');
		$this->db->where('ai.client_id',$client_id);
		$query  = $this->db->get();
		$val = $query->result_array();
		
		$client_id = $_GET['client_id'];
		$this->db->where('ai.appointment_from',date('Y-m-d'));
		$this->db->where('ai.bill_id !=',0);
		$this->db->where('ai.status !=',1);
		$this->db->where('ai.t_status !=',1);
		$this->db->select('pi.mobile_no,ai.bill_id,hi.bill_status,si.first_name as sname,si.last_name as slname,ai.visit,ai.bill_id,ai.appointment_from,ai.title,ai.appointment_id,ai.patient_id,pi.gender')->from('tbl_appointments ai');
		$this->db->select("DATE_FORMAT( ai.start, '%h:%i') as start",  FALSE );
		$this->db->select("DATE_FORMAT( ai.end, '%h:%i %p') as end",  FALSE );
		$this->db->join('tbl_invoice_header hi','hi.bill_id = ai.bill_id');
		$this->db->join('tbl_patient_info pi','ai.patient_id = pi.patient_id');
		$this->db->join('tbl_staff_info si','si.staff_id = ai.staff_id');
		$this->db->where('ai.client_id',$client_id);
		$query1  = $this->db->get();
		$val1 = $query1->result_array();
		
		return array_merge($val,$val1) ;
	} 
	public function todays_bills(){
		 $client_id = $_GET['client_id'];
		$this->db->select('pi.mobile_no,pv.bill_status,pi.patient_id,pi.first_name,pi.last_name,pv.bill_id,pv.net_amt,pv.paid_amt');
		$this->db->from("tbl_patient_info pi");
		$this->db->join("tbl_invoice_header pv", "pi.patient_id=pv.patient_id");
		$this->db->where('pv.client_id',$client_id);
		$this->db->where('pv.treatment_date',date('Y-m-d'));
	    $query = $this->db->get();  
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function todays_income(){
		 $client_id = $_GET['client_id'];
		$this->db->select('pi.patient_id,pi.first_name,pi.last_name,pv.bill_id,pv.paid_amt');
		$this->db->from("tbl_patient_info pi");
		$this->db->join("tbl_invoice_header pv", "pi.patient_id=pv.patient_id");
		$this->db->where('pv.client_id',$client_id);
		$this->db->where('pv.cheque_date',date('Y-m-d'));
	    $query = $this->db->get();  
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function todays_pat(){
		 $client_id = $_GET['client_id'];
		$this->db->where('si.treatment_date',date('Y-m-d'));  
		$this->db->select('pi.mobile_no,it.item_name,pi.gender,pi.patient_code,pi.patient_id,si.treatments,pi.first_name,pi.last_name,st.first_name as staffname')->from('tbl_patient_treatment_techniques si');
		$this->db->join('tbl_item it','si.treatments = it.item_id');
		$this->db->join('tbl_staff_info st','si.staff_id = st.staff_id');
		$this->db->join('tbl_patient_info pi','si.patient_id = pi.patient_id');
		 $this->db->where('si.client_id',$client_id);
		$query  = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function oppatient_details($client_id){ 
		$this->db->select('pi.mobile_no,pi.city,pi.address_line1,pi.age,pi.gender,pi.patient_id,pi.first_name,pi.last_name,pi.patient_code,pi.appoint_date,pi.photo')->from('tbl_patient_info pi');
		$this->db->where('pi.home_visit','1');
		$this->db->where('pi.client_id',$client_id);
		$this->db->order_by('pi.patient_id','desc');
		$query  = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function bill_list(){
		   $arr = array();
		   $client_id = $_GET['client_id'];
		   $this->db->where('iv.client_id',$client_id);
		   $this->db->select('pi.patient_id,iv.bill_id,iv.bill_no,iv.treatment_date,pi.first_name,pi.last_name,iv.net_amt,iv.paid_amt,iv.bill_status')->from('tbl_invoice_header iv');
		   $this->db->join('tbl_patient_info pi','iv.patient_id = pi.patient_id');
		   $this->db->order_by('iv.treatment_date','desc');
		   $this->db->where('pi.episode_status !=','1');
		   $this->db->where('iv.bill_status !=','2');
		   $query = $this->db->get();
		  // echo $this->db->last_query();exit;
		   return ($query->num_rows() > 0) ? $query->result_array() : false ;
	
	 }
	 public function add_invoice() {
		$this->db->where('client_id',$_POST['branch']);
		$this->db->select('email')->from('tbl_client');
		$res1 = $this->db->get();
		$email = $res1->row()->email;
		 $item = $_POST['item'];
		 $patient_id = $_POST['patient_id'];
		 $client_id = $_POST['branch'];
		 $bill_no=$this->generate_code($client_id);
		 $invoice_date = str_replace('/','-',$_POST['invoice']);
		 $due_date = str_replace('/','-',$_POST['due']);
		 $item1 =  str_replace('[','',$item);
		 $item2 =  str_replace(']','',$item1);
		 $value = explode(',',$item2);
		// print_r($value);exit;
		 $count = sizeof($value);
		 $data = array(
			 'client_id' =>  $client_id,
			 'treatment_date' => date('Y-m-d',strtotime($invoice_date)),
			 'patient_id' => $patient_id,
			 'total_amt'=> $_POST['total'],
			 'bill_status'=> '0',
			 'net_amt'=> $_POST['total'],
			 'bill_no' => $bill_no,
			 'created_by'=> $email,
			 'created_date'=> date('Y-m-d'),
			 'modify_by'=> $email,
			 'due_date' => $due_date,
			 'staff_id' =>  $_POST['staff_id'],
			 'created_date'=> date('Y-m-d'),
			 'net_amt'=> $_POST['total'] - $_POST['discount'] + $_POST['pre'],
			'discount_perc'=> $_POST['discount']
		 );
		$this->db->insert('tbl_invoice_header',$data);
		$bill_id  = $this->db->insert_id();
	   for($i = 0; $i<$count; $i++){
		    $va =  str_replace('"','',$value[$i]);
			$item_det = explode('/',$va);
			$this->db->where('item_id',$item_det[0]);
			$this->db->select('item_name,item_price')->from('tbl_item');
		    $res = $this->db->get();
			$item_name = $res->row()->item_name;
			$item_price = $res->row()->item_price;
			$data1 = array(
			 'client_id' =>  $client_id,
			 'staff_id' =>  $_POST['staff_id'],
			 'created_date'=> date('Y-m-d'),
			 'bill_id'=> $bill_id,
			 'item_id' => $item_det[0],
			 'item_quantity' => $item_det[1],
			 'item_price' => $item_price,
			 'item_amount' => ($item_det[1] * $item_price)
			  
			);
			$this->db->insert('tbl_invoice_detail',$data1);
		 }  
		 return $patient_id;
		 
	 }
	public function generate_code($client_id) {
		$string  = 'B' ;
		//$this->db->select('bill_no')->from('tbl_invoice_header')->where('client_id',$this->session->userdata('client_id'))->like('bill_no', $string, 'after'); 
		$this->db->select('bill_no')->from('tbl_invoice_header')->where('client_id',$client_id)->like('bill_no'); 
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $string . ($query->num_rows() + 1);
		} else {
			return $string . '1';
		}
	}
	public function edit_invoice($bill_id) {
		 $this->db->where('iv.bill_id',$bill_id);
		 $this->db->select('si.first_name,si.last_name,iv.bill_id,iv.treatment_date,iv.due_date,iv.discount_perc,iv.net_amt,iv.total_amt,iv.paid_amt')->from('tbl_invoice_header iv');
		 $this->db->join('tbl_staff_info si','si.staff_id = iv.staff_id');
		 $query = $this->db->get();

		 return ($query->num_rows() > 0 ) ? $query->row_array(): false;
	 }
	 public function update_invoice() {
		 $item = $_POST['item'];
		 $patient_id = $_POST['patient_id'];
		 $client_id = $_POST['branch'];
		 $bill_id = $_POST['bill_id'];
		 $invoice_date = str_replace('/','-',$_POST['invoice']);
		 $due_date = str_replace('/','-',$_POST['due']);
		 $value = explode(',',$item);
		 $count = sizeof($value);
		 
		  	 $this->db->where('bill_id',$bill_id);
			 $this->db->delete('tbl_invoice_detail');
			 
			  $data = array(
				 'client_id' =>  $client_id,
				 'treatment_date' => date('Y-m-d',strtotime($invoice_date)),
				 'patient_id' => $patient_id,
				 'discount_perc'=> $_POST['discount'],
				 'total_amt'=> $_POST['total'],
				 'bill_status'=> '0',
				 'net_amt'=> $_POST['total'] - $_POST['discount'] + $_POST['pre'],
				 'due_date' => $due_date,
				 'created_date'=> date('Y-m-d')
			  );
			 $this->db->where('bill_id',$bill_id);
			 $this->db->update('tbl_invoice_header',$data);
			 //echo $this->db->last_query();exit;
		   for($i = 0; $i<$count; $i++){
			 $item_det = explode('/',$value[$i]);
			 $this->db->where('item_id',$item_det[0]);
			 $this->db->select('item_price')->from('tbl_item');
			 $result = $this->db->get();
			 $item_price = $result->row()->item_price;
			 
			 $data1 = array(
				 'client_id' =>  $client_id,
				 'created_date'=> date('Y-m-d'),
				 'bill_id'=> $bill_id,
				 'item_id' => $item_det[0],
				 'item_quantity' => $item_det[1],
				 'item_price' => $item_price,
				 'item_amount' => (abs($item_det[1]) * $item_price)
			 );
			 
			 $this->db->insert('tbl_invoice_detail',$data1);
		  }
		return $bill_id;
	}
	public function add_exercise(){  
		$client_id = $_POST['branch'];
	  	$this->db->where('client_id',$_POST['branch']);
        $this->db->select('chard_no')->from('save_chart');
		$this->db->limit(1);
		$this->db->order_by('chart_id','desc');
		$res = $this->db->get();
		if($res->result_array() != false){
			$no = $res->row()->chard_no;
			$val = explode('C',$no);
			$chart_no = 'C'.($val[1]+1);
		} else {
			$chart_no = 'C1';
		}
		
		$id = str_replace('%20','',$_POST['exercise_id']);
		$val = explode(',',$id);
		for($i = 0; $i<count($val);$i++){
			if($_POST['type'] == 1){
				$this->db->where('id',$val[$i]);
				$this->db->select('title,path,description')->from('physio_ankle');
				$res1 = $this->db->get();
				$title = $res1->row()->title;
				$path = $res1->row()->path;
				$description = $res1->row()->description;
				
			}
			else if($_POST['type'] == 2){
				$this->db->where('id',$val[$i]);
				$this->db->select('title,path,description')->from('physio_cervical');
				$res = $this->db->get();
				$title = $res->row()->title;
				$path = $res->row()->path;
				$description = $res->row()->description;
			}
			else if($_POST['type'] == 3){
				$this->db->where('id',$val[$i]);
				$this->db->select('title,path,description')->from('physio_education');
				$res = $this->db->get();
				$title = $res->row()->title;
				$path = $res->row()->path;
				$description = $res->row()->description;
			}
			else if($_POST['type'] == 4){
				$this->db->where('id',$val[$i]);
				$this->db->select('title,path,description')->from('physio_elbow');
				$res = $this->db->get();
				$title = $res->row()->title;
				$path = $res->row()->path;
				$description = $res->row()->description;
			}
			else if($_POST['type'] == 5){
				$this->db->where('id',$val[$i]);
				$this->db->select('title,path,description')->from('physio_hipknee');
				$res = $this->db->get();
				$title = $res->row()->title;
				$path = $res->row()->path;
				$description = $res->row()->description;
			}
			else if($_POST['type'] == 6){
				$this->db->where('id',$val[$i]);
				$this->db->select('title,path,description')->from('physio_lumber');
				$res = $this->db->get();
				$title = $res->row()->title;
				$path = $res->row()->path;
				$description = $res->row()->description;
			}
			else if($_POST['type'] == 7){
				$this->db->where('id',$val[$i]);
				$this->db->select('title,path,description')->from('physio_shoulder');
				$res = $this->db->get();
				$title = $res->row()->title;
				$path = $res->row()->path;
				$description = $res->row()->description;
			}
			else{
				$this->db->where('id',$val[$i]);
				$this->db->select('title,path,description')->from('physio_special');
				$res = $this->db->get();
				$title = $res->row()->title;
				$path = $res->row()->path;
				$description = $res->row()->description;
			}
			$exes_code = $this->exes_code(); 
			$data = array(
			'client_id' => $client_id,
			'chard_no' => $chart_no,
			'chart_name' => $_POST['title'],
			'verifycode' => $exes_code,
			'img_path' => $path,
			'title' => $title,
			'img_description' => $description,
			'repet' => $_POST['session'],
			'hold' => $_POST['hold'],
			'complete' => $_POST['sets'],
			'time' => 'a Day',
			
			);
			$this->db->insert('save_chart',$data);
			
		}
		return $chart_no;
	}
	public function exes_code() {
		$query=$this->db->query("select IFNULL(max(substr(verifycode,1,6))+1,1) EMAIL_VERIFICATION_CODE from save_chart");
		$row = $query->row_array();
		$string  = date('Y-m-d H:i:s').$row['EMAIL_VERIFICATION_CODE'];
		
		return md5($string);
	}
	public function exercise_list($client_id) {
		$this->db->where('client_id',$client_id);
		 $this->db->select('chard_no,chart_name,img_path,hold,repet')->from('save_chart');
		 $this->db->group_by('chart_name');
		 $query = $this->db->get();
		 return ($query->num_rows() > 0 ) ? $query->result_array(): false;
	}
	public function exercisedetail() {
	  $this->db->where('client_id',$_GET['branch']);
	  $this->db->where('chard_no',$_GET['chart_id']);
	  $this->db->select('title,img_path,hold,repet')->from('save_chart');
	  $query = $this->db->get();
	  return ($query->num_rows() > 0 ) ? $query->result_array(): false;
	}
	public function edit_exercise() {
		$this->db->where('client_id',$POST['branch']);
	    $this->db->where('chard_no',$_POST['chart_id']);
	    $this->db->select('chart_id')->from('save_chart');
        $res = $this->db->get();		
		foreach($res->result_array() as $row){
			$data = array(
			 'repet' => $_POST['repeat'],
			 'hold'=> $_POST['hold'],
			 'complete' => $_POST['complete']
			);
			$this->db->where('chart_id',$row['chart_id']);
	        $this->db->update('save_chart',$data);
		}
		return $_POST['chart_id'];
	}
	public function profile_details() {  
		$client_id = $_GET['branch'];
		$this->db->where('client_id',$client_id);
		$this->db->select('password,first_name,last_name,branch_name,clinic_name,mobile,phone,address,city,state,zipcode')->from('tbl_client');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false ;
	}
	public function edit_profile() {
		$data = array(
		   'first_name' => $_POST['name'],
		   'branch_name' => $_POST['branch'],
		   'mobile' => $_POST['mobile'],
		   'phone' => $_POST['phone'],
			'clinic_name' => $_POST['clinicname'],
		   'address' => $_POST['address'],
		   'city' => $_POST['city'],
		   'state' => $_POST['state'],
		   'zipcode' =>$_POST['zip']
		);
		$this->db->where('client_id',$_POST['client_id']);
		$this->db->update('tbl_client',$data);
		return $_POST['client_id'];
	}
      public function item_details() {
		   $client_id = $_GET['branch'];
		   $this->db->where('client_id',$client_id);
		   $this->db->select('*')->from('tbl_item');
		   $query = $this->db->get();
		   return ($query->num_rows() > 0) ? $query->result_array() : false ;
	 }
	  public function add_treatment() {
	    $item_name = $_POST['item_name'];
		$this->db->where('client_id',$_POST['branch']);
		$this->db->where('item_name',$_POST['item_name']);
		$this->db->select('item_id')->from('tbl_item');
		$result = $this->db->get();
		if($result->result_array() != false){
			$item_id  = $result->row()->item_id;
		} else {
			$this->db->where('client_id',$_POST['branch']);
			$this->db->select('email')->from('tbl_client');
			$res1 = $this->db->get();
			$email = $res1->row()->email;
			
			$item_name = $_POST['item_name'];
			$item_descr = $_POST['item_descr'];
			$item_price = $_POST['item_price'];
			$data = array(
			   'client_id' => $_POST['branch'],
			   'item_name' => $item_name,
			   'item_desc' => $item_descr,
			   'item_price' => $item_price,
			   'created_by'=> $email,
			   'created_date'=> date('Y-m-d'),
			   'modify_by'=> $email,
			   'created_date'=> date('Y-m-d')
			);
			$this->db->insert('tbl_item',$data);
			$item_id  = $this->db->insert_id();
		}			
		return $item_id;
	}
    public function edit_item($item_id,$client_id) {
		 $this->db->where('item_id',$item_id);
		 $this->db->where('client_id',$client_id);
		$this->db->select('*');
		$this->db->from("tbl_item");
		$query = $this->db->get();
		return ($query->num_rows() > 0 ) ? $query->result_array(): false;
		  
	 }
	 public function edit_treatmentitem() 
	 {
		$data = array(
			'item_name' => $_POST['item_name'],
			'item_desc' => $_POST['item_desc'],
			'item_price' => $_POST['item_price']
		);
		$this->db->where('client_id',$_POST['client_id']);
		$this->db->where('item_id',$_POST['item_id']);
		$this->db->update('tbl_item',$data);
		return $_POST['item_id'];
	}
	public function get_expense() 
	 {
		$where = array('client_id' => $_GET['client_id']);
		$this->db->select('*')->from('tbl_expanse_client_item')->where($where);
		$this->db->order_by("item_id", "desc");
		$query = $this->db->get();
		//echo $this->db->last_query();exit
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function add_expense() {
		$item_name = $_POST['item_name'];
		$this->db->where('client_id',$_POST['branch']);
		$this->db->where('item_name',$_POST['item_name']);
		$this->db->select('item_id')->from('tbl_expanse_client_item');
		$result = $this->db->get();
		if($result->result_array() != false){
			$item_id  = $result->row()->item_id;
		} else {
			$item_name = $_POST['item_name'];
			$item_descr = $_POST['item_descr'];
			$item_price = $_POST['item_price'];
			$data = array(
			   'client_id' => $_POST['branch'],
			   'item_name' => $item_name,
			   'item_desc' => $item_descr,
			   'item_price' => $item_price
			   
			);
			$this->db->insert('tbl_expanse_client_item',$data);
			$item_id  = $this->db->insert_id();
		}		
		return $item_id;
	}
    public function get_expensedet() 
	 {
		$this->db->where('client_id',$_GET['client_id']);
		$this->db->where('item_id',$_GET['item_id']);
		$this->db->select('*')->from('tbl_expanse_client_item');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function edit_expenseitem() 
	 {
		$data = array(
			'item_name' => $_POST['item_name'],
			'item_desc' => $_POST['item_desc'],
			'item_price' => $_POST['item_price']
		);
		$this->db->where('client_id',$_POST['client_id']);
		$this->db->where('item_id',$_POST['item_id']);
		$this->db->update('tbl_expanse_client_item',$data);
		return $_POST['item_id'];
	}
	public function get_provisional() {
		 $where = array('client_id' => $_GET['client_id']);
		 $this->db->select('*')->from('tbl_prov_diagnosis_list');
		 $query = $this->db->get();
		 return ($query->num_rows() > 0 ) ? $query->result_array(): false;
	}
	public function provi_add($client_id) {
		$this->db->where('client_id',$_POST['client_id']);
		$this->db->select('email')->from('tbl_client');
		$res1 = $this->db->get();
		$email = $res1->row()->email;

		$provdiag_info = array(
			'client_id' => $_POST['client_id'],
			'pd_list_name' => $_POST['pd_list_name'],
			'created_by' => $email,
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $email,
			'modify_date' => date('Y-m-d H:i:s'),
		);
				
		$this->db->insert('tbl_prov_diagnosis_list', $provdiag_info);
		$item_id  = $this->db->insert_id();
		return $item_id;
	}
	public function get_provisional_details() {
		 $where = array('client_id' => $_GET['client_id'],'pd_list_id' => $_GET['pd_list_id']);
		 $this->db->select('*')->from('tbl_prov_diagnosis_list')->where($where);
		 $query = $this->db->get();
		 return ($query->num_rows() > 0 ) ? $query->result_array(): false;
	}
	
	public function edit_provisional(){
		$this->db->where('client_id',$_POST['client_id']);
		$this->db->select('email')->from('tbl_client');
		$res1 = $this->db->get();
		$email = $res1->row()->email;

		$provdiag_info = array(
			'pd_list_name' => $_POST['pd_list_name'],
			'created_by' => $email,
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $email,
			'modify_date' => date('Y-m-d H:i:s'),
		);
		$this->db->where('client_id',$_POST['client_id']);
		$this->db->where('pd_list_id',$_POST['pd_list_id']);
		$this->db->update('tbl_prov_diagnosis_list', $provdiag_info);
		//$item_id  = $this->db->insert_id();
		return $_POST['pd_list_id'];
	}
	public function calendar_details() {  
		$client_id = $_GET['branch'];
		$this->db->where('client_id',$client_id);
		$this->db->select('monday_fn_from,monday_an_to,tuesday_fn_from,tuesday_an_to,wednesday_fn_from,wednesday_an_to,thursday_fn_from,thursday_an_to,friday_fn_from,friday_an_to,saturday_fn_from,saturday_an_to,sunday_fn_from,sunday_an_to')->from('tbl_schedule_settings');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false ;
	}
	public function slot_details() {  
		$client_id = $_GET['branch'];
		$this->db->where('client_id',$client_id);
		$this->db->select('sch_slot,sch_time,days_display_after,days_display,display_view')->from('tbl_settings');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false ;
	}
	public function edit_calendardetails() {
		$this->db->where('client_id',$_POST['branch']);
		$this->db->select('sch_slot')->from('tbl_settings');
		$res = $this->db->get();
		if($res->result_array() != false){
			$info = array(
			 'sch_slot' => $_POST['slot'],
			 'sch_time' => $_POST['sch_time'],
			 'days_display_after' => $_POST['days_display_after'],
			 'days_display' => $_POST['days_display'],
			 'display_view' => $_POST['display_view']
			 );
			$this->db->where('client_id',$_POST['branch']);
		    //$this->db->set('sch_slot',$_POST['slot']);
		    $this->db->update('tbl_settings',$info);
			//echo $this->db->last_query();exit;
		}
		else {
			 $info = array(
			 'client_id' => $_POST['branch'],
			 'sch_slot' => $_POST['slot'],
			 'sch_time' => $_POST['sch_time'],
			 'days_display_after' => $_POST['days_display_after'],
			 'days_display' => $_POST['days_display'],
			 'display_view' => $_POST['display_view']
			 );
			 $this->db->insert('tbl_settings',$info);
		}
		$this->db->where('client_id',$_POST['branch']);
		$this->db->select('monday_fn_from')->from('tbl_schedule_settings');
		$res = $this->db->get();
		if($res->result_array() != false){
		$data = array(
		   'monday_fn_from' => $_POST['m_from'],
		   'monday_an_to' => $_POST['m_to'],
		   'tuesday_fn_from' => $_POST['tu_from'],
		   'tuesday_an_to' => $_POST['tu_to'],
		   'wednesday_fn_from' => $_POST['w_from'],
		   'wednesday_an_to' => $_POST['w_to'],
		   'thursday_fn_from' => $_POST['th_from'],
		   'thursday_an_to' => $_POST['th_to'],
		   'friday_fn_from' => $_POST['f_from'],
		   'friday_an_to' => $_POST['f_to'],
		   'saturday_fn_from' => $_POST['sa_from'],
		   'saturday_an_to' => $_POST['sa_to'],
		   'sunday_fn_from' => $_POST['su_from'],
		   'sunday_an_to' => $_POST['su_to'],
		);
		$this->db->where('client_id',$_POST['branch']);
		$this->db->update('tbl_schedule_settings',$data);
		} else {
				$data1 = array(
				   'client_id' => $_POST['branch'],
				   'monday_fn_from' => $_POST['m_from'],
				   'monday_an_to' => $_POST['m_to'],
				   'tuesday_fn_from' => $_POST['tu_from'],
				   'tuesday_an_to' => $_POST['tu_to'],
				   'wednesday_fn_from' => $_POST['w_from'],
				   'wednesday_an_to' => $_POST['w_to'],
				   'thursday_fn_from' => $_POST['th_from'],
				   'thursday_an_to' => $_POST['th_to'],
				   'friday_fn_from' => $_POST['f_from'],
				   'friday_an_to' => $_POST['f_to'],
				   'saturday_fn_from' => $_POST['sa_from'],
				   'saturday_an_to' => $_GET['sa_to'],
				   'sunday_fn_from' => $_POST['su_from'],
				   'sunday_an_to' => $_POST['su_to'],
				);
			 $this->db->insert('tbl_schedule_settings',$data1);
		}
		
		return $_POST['branch'];
	}
	public function client_register()
	 {
		$clientQ = $this->db->query("SELECT client_id from tbl_client where username = '".$_POST['email']."'");
		if($clientQ->num_rows() == 0){
		$email_verification_code=$this->generate_code_mail();
		 
		 $this->db->limit(1);
		 $this->db->order_by('client_id','DESC');
		 $this->db->select('client_id')->from('tbl_client');
		 $res = $this->db->get();
		 $c_id = $res->row()->client_id;
		 $tempInfo1 = array(
		    'client_id' => $c_id+1,
			'clinic_name' => $_POST['clinic'],
			'first_name' => $_POST['name'],
			'branch_name' => $_POST['city'],
			'city' => $_POST['city'],
			'mobile' => $_POST['mobile'],
			'username' => $_POST['email'],
			'password' => $_POST['password'],
			'exes_chart' => 1,
			'account_type' => 1,
			'email_verified' => 0,
			'email_verification_code' => $email_verification_code,
			'last_login_date'=> date('Y-m-d H:i:s'),
			'created_on'=> date('Y-m-d'),
			'email' =>  $_POST['email']
		   
		);
		$this->db->insert('tbl_client', $tempInfo1);
		$client_id = $this->db->insert_id();
		$tempInfo2 = array(
		        'client_id' => $c_id+1,  
			'create_date' => date('Y-m-d'),
			'expire_date' => date('Y-m-d'),
			'num_users' => 1,
			'num_location' => 1,
			'plan_type' => 0,		);
		
		$this->db->insert('tbl_validity', $tempInfo2);
		  
		$admin = array(
			'ClinicName' => $_POST['clinic'],
			'ClientName' => $_POST['name'],
			'City' => $_POST['city'],
			'UserName' => $_POST['email'],
			'Password' => $_POST['password'],
			'MobileNo' => $_POST['mobile'],  
			'PhoneNo' => $_POST['mobile'],
			'State' => '',
			'coupon_code' => '',
			'LastLoginDate' => date('Y-m-d H:i:s')
		);
		$adminMessage = $this->mail_model->regInformationTemplate($admin);
		$adminMailConfig = array('clinic' => 'Physio Plus Tech', 'to' => 'contact@physioplusnetwork.com', 'subject' => 'Client Registration Info from Mobile APP', 'message' => $adminMessage);
		$this->mail_model->sendEmail($adminMailConfig);
		
		$client = array(
			'ClinicName' => $_GET['clinic'],
			'ClientName' => $_GET['name'],
			'coupon_code' => '',
			'verificationCode' => $email_verification_code
		);
		$clientMessage = $this->mail_model->registrationTemplate($client);
		$clientMailConfig = array('clinic' => 'Physio Plus Tech','to' => $_GET['email'], 'subject' => 'Congratulations! Welcome to Physio Plus Tech', 'message' => $clientMessage);
		$this->mail_model->sendEmail($clientMailConfig);
		return $client_id;   
		}
	}
	public function generate_code_mail() {
		$query=$this->db->query("select IFNULL(max(substr(email_verification_code,1,20))+1,1) EMAIL_VERIFICATION_CODE from tbl_client ");
		$row = $query->row_array();
		$string  = date('Y-m-d H:i:s').$row['EMAIL_VERIFICATION_CODE'];
		return md5($string);
	}
	public function forgot_adminpwd($client_id) {
	   $this->db->select('*')->from('tbl_client')->where('username = "'. $_POST['email'] .'" ');
		$result=$this->db->get();
		if($result->num_rows()>0 && $result->row()->status == 1)
		{
			// patient details for mail template
			$login_url = base_url().'client/dashboard/login';
			$client = array(
				'ClientName' => ucfirst($result->row()->first_name),
				'Password' => $result->row()->password,
				'LoginUrl' => $login_url
			);
			// create email template
			$clientMessage = $this->mail_model->forgetPasswordTemplate($client);
			// mail config
			$clientMailConfig = array('to' => $result->row()->email, 'subject' => 'Congratulations! Password Recovery Successful', 'message' => $clientMessage);
			// send mail
			$this->mail_model->sendEmail($clientMailConfig);
			return true;
		} else if($result->num_rows()>0 && $result->row()->status == 0) {
		} else {
			
		}
   }
   public function session_details() {	
		$this->db->where('si.client_id',$_POST['branch']);
		$this->db->where('si.sn_id',$_POST['sn_id']);
		$this->db->select('si.sn_id,si.sn_date,pi.patient_id,pi.patient_code,pi.first_name,pi.gender,si.Comment_sess,si.Session_count,si.item_name')->from('tbl_session_det si');
		$this->db->join('tbl_patient_info pi','si.patient_id = pi.patient_id');
		$this->db->order_by('si.sn_date','desc');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
   }
   public function update_session() {
		$this->db->where('patient_id',$_POST['id']);
		$this->db->select('patient_code,first_name,last_name,concess_group_id')->from('tbl_patient_info');
		$res  = $this->db->get();
		$code  = $res->row()->patient_code;
		$first  = $res->row()->first_name;
		$last  = $res->row()->last_name;
		$concession_group_id  = $res->row()->concess_group_id;  
     	
		$staff_id = $_POST['staff_id'];
		$treat = $_POST['treatment'];
		$item_id = $_POST['treatment'];
		$session_cont = $_POST['session'];
		
		$this->db->where('client_id',$_POST['branch']);
		$this->db->select('email,first_name,last_name')->from('tbl_client');
		$res  = $this->db->get();
		$clientName  = $res->row()->first_name.' '.$res->row()->last_name;
		$username  = $res->row()->email;
		$session_cont = $_POST['session'];
		$treat = $_POST['treatment'];		
		$id = explode('-',$treat);
		$treatment_quantity = explode(' - ',$session_cont);
		for($i=0; $i < sizeof($id); $i++){
			$this->db->where('item_id',$id[$i]);
			$this->db->select('item_name')->from('tbl_item');
			$res = $this->db->get();
			$item_name = $res->row()->item_name;
			
			$session_det = array(
				'client_id' => $_POST['branch'],
				'patient_id' => $_POST['id'],
				'staff_id' => $staff_id,
				'patient_code' => $code,
				'sn_date' => date('Y-m-d',strtotime($_POST['sn_date'])),
				'Session_count' => $treatment_quantity[$i],
				'item_id' => $id[$i],
				'item_name' => $item_name,
				'repot_by' =>  $staff_id,
				'Comment_sess' => $_POST['notes'],
				'fpatient_name' => $first,
				'lpatient_name' => $last,
				'created_by' => $username,
				'created_date' => date('Y-m-d H:i:s'),
				'modify_by' => $username,
				'modify_date' => date('Y-m-d H:i:s'),
				  
			);
			$this->db->where('client_id',$_POST['branch']);
			$this->db->where('sn_id',$_POST['sn_id']);
			$this->db->update('tbl_session_det',$session_det);
		    
			
		}
		
		
		return $_POST['sn_id'];    
		
		
	}
	
	public function product_add($client_id) {  
		$data = array(
		   'client_id'=>$client_id,
		   'item_date'=>date('Y-m-d'),
		   'item_name'=>$_POST['item_name'],
		   'item_code'=>$_POST['item_code'],
		   'amount'=>$_POST['amount'],
		   'discount'=>$_POST['discount'],
		   'stack_items'=>$_POST['stack_items'],
		   'total'=>$_POST['total'],
		 //  'total_items'=>$_POST['total_items'],
		);
		$this->db->insert('tbl_product_info',$data);
		$id = $this->db->insert_id();
		return $id;
	}
 	public function product_details($client_id,$item_id) {
		$this->db->where('client_id',$client_id);
		$this->db->where('product_id',$item_id);
		$this->db->select('*')->from('tbl_product_info');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function update_product($client_id,$item_id) {
		$data = array(
		   'client_id'=>$client_id,
		   'item_date'=>date('Y-m-d'),
		   'item_name'=>$_POST['item_name'],
		   'item_code'=>$_POST['item_code'],
		   'amount'=>$_POST['amount'],
		   'discount'=>$_POST['discount'],
		   'stack_items'=>$_POST['stack_items'],
		   'total'=>$_POST['total'],
		 
		);
		$this->db->where('product_id',$item_id);
		$this->db->update('tbl_product_info',$data);
		//$id = $this->db->insert_id();
		return $item_id;
	}
	public function product_list($client_id) {
		$this->db->where('client_id',$client_id);
		$this->db->select('*')->from('tbl_product_info');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function sms_notification_update($client_id) {
		
		$registration_info = array(
			'daily_sms_notify' => $_POST['daily_sms_notify'],
			'sms_notify' => $_POST['sms_notify'],
			'welcome_sms_notify' => $_POST['welcome_sms_notify'],
			'created_on' => date('Y-m-d H:i:s'),
			'last_login_date' => date('Y-m-d H:i:s')
		);
			
		$this->db->where('client_id', $client_id);
		$this->db->update('tbl_client',$registration_info);
		return $client_id;
	
	}
	public function sms_notification_view($client_id) {
		
			
		$this->db->where('client_id', $client_id);
		$this->db->select('daily_sms_notify,welcome_sms_notify,sms_notify')->from('tbl_client');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
}