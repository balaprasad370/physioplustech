<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('mail_model');
		
	}
	public function getcheckdet2()
	{
		$c_id=$this->uri->segment(5);
		$this->db->select('t1.client_id,t1.email,t1.first_name,t1.last_name,t1.sms_count,t1.mobile,t1.address,t1.city,t1.state,t1.country,t1.zipcode,t1.total_sms_limit,t2.plan_type,t2.duration,t2.num_users,t2.num_location,t2.create_date,t2.expire_date');
		$this->db->from("tbl_client t1");
		$this->db->join("tbl_validity t2", "t1.client_id=t2.client_id");
		$this->db->where('t1.client_id',$c_id);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function app_add1($c_id,$amount,$p_id) {
	  $this->db->where('patient_id',$p_id);
	  $this->db->select('first_name,last_name,email')->from('tbl_patient_info');
	  $res = $this->db->get();
	  $fname = $res->row()->first_name;
	  $lname = $res->row()->last_name;
	  $email = $res->row()->email;
		$data= array(
		'client_id'=> $c_id,
		'amount'=> $amount,
		'patient_id'=> $p_id,
		'patient_name'=>$fname.' '.$lname,
		'email'=> $email,
		'pay'=> 'paid',
		'chartname'=> 'Invoice',
		't_status'=>'2',
		'notify'=>'1',
		'ex_date'=> date('Y-m-d')
		);
	$this->db->insert('prescription_detail',$data);
	return true;
  }
	public function getcheckdet1($client_id)
	{
		$this->db->select('t1.client_id,t1.email,t1.first_name,t1.last_name,t1.sms_count,t1.mobile,t1.address,t1.city,t1.state,t1.country,t1.zipcode,t1.total_sms_limit,t2.plan_type,t2.duration,t2.num_users,t2.num_location,t2.create_date,t2.expire_date');
		$this->db->from("tbl_client t1");
		$this->db->join("tbl_validity t2", "t1.client_id=t2.client_id");
		$this->db->where('t1.client_id',$client_id);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getsession_report($patient_id) {
		$this->db->where('patient_id',$patient_id);
		$this->db->select('*')->from('tbl_session_det');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	public function add_register()
	{		
		$name = $this->input->post('name');
			$data=array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'mobile_no'=> $this->input->post('mobile_no'),
			'city' => $this->input->post('city')
			);  
		 $this->db->insert('tbl_register', $data);
		 return $name;
	} 
	
	public function add_registration() {
		$result = $this->input->post('country');
        $result_explode = explode('|', $result);
		$email_verification_code=$this->generate_code();
		/* $this->legacy_db = $this->load->database('second', true);
		$registration_info = array(
		    'username' => $this->input->post('email'),
			'first_name' => $this->input->post('fullname'),
			'last_name' => $this->input->post('last_name'),
			'clinic_name' => $this->input->post('clinic_name'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'mobile' => $this->input->post('mobile'),
			'phone' => $this->input->post('phone'),
			'daily_sms_notify' => 1,
			'address' => $this->input->post('address'),
			'city' => $this->input->post('city'),
			'state' => $this->input->post('state'),
			'zipcode' => $this->input->post('zipcode'),
			'country'=>$result_explode[0],
			'currency'=>$result_explode[1],
			'status' => 0,
			'email_verified' => 0,
			'exes_chart' => 1,
			'account_type' => 4,
			'email_verification_code' => $email_verification_code,
			'created_on' => date('Y-m-d H:i:s'),
			'last_login_date' => date('Y-m-d H:i:s'),
			
		);
		
		$this->legacy_db->insert('tbl_user', $registration_info);
		$client_id=$this->legacy_db->insert_id(); */
		$ran_str = random_string('numeric',6);
		$registration_info = array(
		    'first_name' => $this->input->post('fullname'),
			'last_name' => $this->input->post('last_name'),
			'branch_name' => $this->input->post('city'),
			'clinic_name' => $this->input->post('clinic_name'),
			'email' => $this->input->post('email'),
			'username' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'mobile' => $this->input->post('mobile'),
			'phone' => $this->input->post('phone'),
			'daily_sms_notify' => 1,
			'address' => $this->input->post('address'),
			'city' => $this->input->post('city'),
			'state' => $this->input->post('state'),
			'zipcode' => $this->input->post('zipcode'),
			'country'=>$result_explode[0],
			'currency'=>$result_explode[1],  
			'status' => 0,
			'email_verified' => 0,
			'exes_chart' => 1,
			'account_type' => 1,
			'verify_code' => $ran_str,
			'email_verification_code' => $email_verification_code,
			'created_on' => date('Y-m-d H:i:s'),
			'last_login_date' => date('Y-m-d H:i:s'),
			'coupon_code' => $this->input->post('coupon_code'),
		);
		
		$this->db->insert('tbl_client', $registration_info);
		$expire_date = $this->db->query("SELECT DATE_ADD(curdate(),INTERVAL 365 DAY) as expire from dual");
		foreach($expire_date->result() as $days)
		{
			$ex_date = $days->expire;
		}
		
		$validity_info = array(
		    'create_date' => date('Y-m-d'),
			'expire_date' => $ex_date,
			'plan_type' => 4,
			'duration' => 0,
			'num_users' => 1,
			'num_location' => 1,
			'pay_amount' => 0,
			'tax' => 0,
			'discount' => 0,
			'tot_pay_amount' => 0
		);
		
		$this->db->insert('tbl_validity', $validity_info);
			
		$client = array(
			'ClinicName' => ucfirst($this->input->post('clinic_name')),
			'ClientName' => ucfirst($this->input->post('fullname')),
			'verificationCode' => $email_verification_code
		);
		$clientMessage = $this->mail_model->registrationTemplate($client);
		$clientMailConfig = array('to' => $this->input->post('email'), 'subject' => 'Congratulations! Welcome to Physio Plus Tech', 'message' => $clientMessage);
		$this->mail_model->sendEmail($clientMailConfig);
		
		$mobile = $this->input->post('mobile'); 
		//$message_patient = 'Mobile Verification Code is '.$ran_str.'';
		$message_patient = 'Hello! You are one step away from registering with Physio Plus Tech. The Mobile Verification Code is '.$ran_str.'';
		$sms['patient'] = 'DONE';
		$patientSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=FISIYO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$mobile.'&duplicateCheck=true&format=json&msg='.urlencode($message_patient);
		$patient_churl = @fopen($patientSmsURL,'r');
		fclose($patient_churl);
		if (!$patient_churl) {
		}else{
		
		}  
		
		
		/* $clientName = ucfirst($this->input->post('fullname')).' '.ucfirst($this->input->post('last_name'));
		$admin = array(
			'ClinicName' => ucfirst($this->input->post('clinic_name')),
			'ClientName' => $clientName,
			'City' => $this->input->post('city'),
			'State' => $this->input->post('state'),
			'UserName' => $this->input->post('email'),
			'Password' => $this->input->post('password'),
			'MobileNo' => $this->input->post('mobile'),
			'PhoneNo' => $this->input->post('phone'),
			'coupon_code' => $this->input->post('coupon_code'),
			'LastLoginDate' => date('Y-m-d H:i:s')
			
		);
		$adminMessage = $this->mail_model->regInformationTemplate($admin);
		
		$adminMailConfig = array('clinic'=> 'Physio Plus Tech','to' => 'contact@physioplusnetwork.com', 'subject' => 'Client Registration Info from Software', 'message' => $adminMessage);
		$this->mail_model->sendEmail($adminMailConfig); */
		
		/* $adminMailConfig1 = array('clinic'=> 'Physio Plus Tech','to' => 'info@physioasia.com', 'subject' => 'Asia Client Registration Info from Software', 'message' => $adminMessage);
		$this->mail_model->sendEmail($adminMailConfig1); */
		


		return $this->db->insert_id();  
	}
	
	// generate staff code
	public function generate_code() {
		$query=$this->db->query("select IFNULL(max(substr(email_verification_code,1,20))+1,1) EMAIL_VERIFICATION_CODE from tbl_client ");
		$row = $query->row_array();
		$string  = date('Y-m-d H:i:s').$row['EMAIL_VERIFICATION_CODE'];
		return md5($string);
	}
	
	//email verified status check
	public function emailVerificationCheck($email_verification_code)
	{
		$data = array();
		$this->db->select('email_verified,email_verification_code')->from('tbl_client')->where('email_verification_code',$email_verification_code);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	public function emailStatusChange($email_verification_code)
	{
		$this->db->where('email_verification_code', $email_verification_code);
		$this->db->update('tbl_client',array('email_verified' => 1, 'status' => 1, 'plan_id' => 4));
	}
	
	//change profile
	public function editProfile($client_id)
	{
		$this->db->select('*')->from('tbl_client')->where('client_id', $client_id);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function editappProfile($client_name)
	{
		$this->db->select('*')->from('tbl_app_det')->where('clinic_name', $client_name);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function editsettings($client_id)
	{
		$this->db->select('*')->from('tbl_schedule_settings')->where('client_id', $client_id);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function myaccount($client_id)
	{
	   $this->db->select('*')->from('tbl_validity')->where('client_id', $client_id);
	   $query=$this->db->get();
	   //echo $query->num_rows().'hi';
	   return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	//change profile
	public function getProfileInfo($user_name)
	{
		$this->db->select('*')->from('tbl_client')->where('username', $user_name);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	//update profile
	public function profile_edit($client_id) {
		
		$registration_info = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'clinic_name' => $this->input->post('clinic_name'),
			'branch_name' => $this->input->post('branch_name'),
			'degree' => $this->input->post('degree'),
			'speciality' => $this->input->post('speciality'),
			'experience' => $this->input->post('experience'),
			'mobile' => $this->input->post('mobile'),
			'phone' => $this->input->post('phone'),
			'photo' => $this->input->post('upload_image'),
			'created_on' => date('Y-m-d H:i:s'),
			'last_login_date' => date('Y-m-d H:i:s'),
			'speaker_status' => $this->input->post('speaker_status'),
			'bank_details' => $this->input->post('bank_details'),
			
		);
			
		$this->db->where('client_id', $client_id);
		$this->db->update('tbl_client',$registration_info);
		if(!empty($_FILES['profile_photo']['name']))
		{
			
			$config['upload_path'] = './uploads/client/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '10000000M';
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('profile_photo'))
			{
				$error = array('error' => $this->upload->display_errors());	
			}else{
				$data = array('upload_data' => $this->upload->data());
				$filedata = array(
					'client_img' => $data['upload_data']['file_name']
				);

				$this->db->where('client_id', $client_id);
				$this->db->update('tbl_client', $filedata);
			}	
		}
		if(!empty($_FILES['clinic_photo']['name']))
		{
			
			$config['upload_path'] = './uploads/client/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '10000000M';
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('clinic_photo'))
			{
				$error = array('error' => $this->upload->display_errors());	
			}else{
				$data = array('upload_data' => $this->upload->data());
				$filedata = array(
					'clinic_img1' => $data['upload_data']['file_name']
				);

				$this->db->where('client_id', $client_id);
				$this->db->update('tbl_client', $filedata);
			}	
		}
		if(!empty($_FILES['clinic_photo1']['name']))
		{
			
			$config['upload_path'] = './uploads/client/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '10000000M';
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('clinic_photo1'))
			{
				$error = array('error' => $this->upload->display_errors());	
			}else{
				$data = array('upload_data' => $this->upload->data());
				$filedata = array(
					'clinic_img2' => $data['upload_data']['file_name']
				);

				$this->db->where('client_id', $client_id);
				$this->db->update('tbl_client', $filedata);
			}	
		}
		if(!empty($_FILES['clinic_photo2']['name']))
		{
			
			$config['upload_path'] = './uploads/client/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '10000000M';
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('clinic_photo2'))
			{
				$error = array('error' => $this->upload->display_errors());	
			}else{
				$data = array('upload_data' => $this->upload->data());
				$filedata = array(
					'clinic_img3' => $data['upload_data']['file_name']
				);

				$this->db->where('client_id', $client_id);
				$this->db->update('tbl_client', $filedata);
			}	
		}
		if(!empty($_FILES['clinic_photo3']['name']))
		{
			
			$config['upload_path'] = './uploads/client/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '10000000M';
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('clinic_photo3'))
			{
				$error = array('error' => $this->upload->display_errors());	
			}else{
				$data = array('upload_data' => $this->upload->data());
				$filedata = array(
					'clinic_img4' => $data['upload_data']['file_name']
				);

				$this->db->where('client_id', $client_id);
				$this->db->update('tbl_client', $filedata);
			}	
		}
		return $client_id;
	}
	public function profile_edit1($client_id) {
		$result = $this->input->post('country');
        $result_explode = explode('|', $result);
		if($this->input->post('remove_branding')){
			$removebranding = 1;
		}else{
			$removebranding = 0;
		}
		$registration_info = array(
			'address' => $this->input->post('address'),
			'contact_mail' => $this->input->post('mail'),
			'city' => $this->input->post('city'),
			'state' => $this->input->post('state'),
			'zipcode' => $this->input->post('zipcode'),
			'Website' => $this->input->post('Website'),
			'country'=>$result_explode[0],
			'currency'=>$result_explode[1],
			'created_on' => date('Y-m-d H:i:s'),
			'last_login_date' => date('Y-m-d H:i:s'),
			'removebranding' => $removebranding,
			'facebook' => $this->input->post('facebook'),
			'twitter' => $this->input->post('twitter'),
			'youtube' => $this->input->post('youtube'),
			'instagarm' => $this->input->post('instagarm')
			
			/* 'map'=>$this->input->post('map'),
            'googleRevew_link'=>$this->input->post('review') */
		);
			
		$this->db->where('client_id', $client_id);
		$this->db->update('tbl_client',$registration_info);
		return $client_id;
	}
	public function update_googleDetails($client_id) {
		
		$gooleregistration_info = array(
			'map'=>$this->input->post('map'),
            'googleRevew_link'=>$this->input->post('review')
		);
			
		$this->db->where('client_id', $client_id);
		$this->db->update('tbl_client',$gooleregistration_info);
		echo $this->db->last_query();exit;
		return $client_id;
	}
	public function profile_edit2($client_id) {
		$registration_info = array(
		
			'whatsapp' => $this->input->post('whatsapp'),
			'daily_sms_notify' => $this->input->post('daily_sms_notify'),
			'sms_notify' => $this->input->post('daily_sms_notify1'),
			'welcome_sms_notify' => $this->input->post('welcome_sms_notify'),
			'created_on' => date('Y-m-d H:i:s'),
			'last_login_date' => date('Y-m-d H:i:s')
			
		);
			
		$this->db->where('client_id', $client_id);
		$this->db->update('tbl_client',$registration_info);
		return $client_id;
	}
	public function getIPbillinfo($user_name)
	{
		$this->db->select('*')->from('tbl_client')->where('username', $user_name);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	public function  client_validity()
	{
		$expire_date = $this->db->query("SELECT DATE_ADD(curdate(),INTERVAL 7 DAY) as expire from dual");
		foreach($expire_date->result() as $days)
		{
			$ex_date = $days->expire;
		}
		
		$validity_info = array(
			'create_date' => date('Y-m-d'),
			'expire_date' => $ex_date,
			'plan_type' => 1,
			'duration' => 0,
			'num_users' => 1,
			'num_location' => 1,
			'pay_amount' => 0,
			'tax' => 0,
			'discount' => 0,
			'tot_pay_amount' => 0
		);
		
		$this->db->insert('tbl_validity', $validity_info);
		return true;
	}
	
	public function get_valitidy()
	{
		$this->db->select('duration,plan_type,num_users,psms_count,psms_limit')->from('tbl_validity');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		return ($query->num_rows() > 0 ) ? $query->result_array() : false;
	}
	public function get_totalsms()
	{
		$this->db->select('total_sms_limit,sms_count')->from('tbl_client')->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		return ($query->num_rows() > 0 ) ? $query->row_array() : false;
	}
		
		
	public function getcheckdet()
	{
		$this->db->select('t1.client_id,t1.email,t1.first_name,t1.last_name,t1.sms_count,t1.mobile,t1.address,t1.city,t1.state,t1.country,t1.zipcode,t1.total_sms_limit,t2.plan_type,t2.duration,t2.num_users,t2.num_location,t2.create_date,t2.created_date,t2.expire_date');
		$this->db->from("tbl_client t1");
		$this->db->join("tbl_validity t2", "t1.client_id=t2.client_id");
		$this->db->where('t1.client_id',$this->session->userdata('client_id'));
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getcheckdetails($client_id)
	{
		$this->db->select('t1.client_id,t1.email,t1.first_name,t1.last_name,t1.sms_count,t1.mobile,t1.address,t1.city,t1.state,t1.country,t1.zipcode,t1.total_sms_limit,t2.plan_type,t2.duration,t2.num_users,t2.num_location,t2.create_date,t2.expire_date');
		$this->db->from("tbl_client t1");
		$this->db->join("tbl_validity t2", "t1.client_id=t2.client_id");
		$this->db->where('t1.client_id',$client_id);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function getCenter($client_id)
	{
		$this->db->where('client_id',$client_id);
		$this->db->or_where('parent_client_id',$client_id);
		$this->db->select('client_id,branch_name')->from('tbl_client');
		$query = $this->db->get();
		return ($query->num_rows() > 0 ) ? $query->result_array() : false;
	}
	public function sch_slot(){
		$this->db->select('*')->from('tbl_schedule_settings')->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		return ($query->num_rows() > 0 ) ? $query->result_array() : false;
	}
	public function sch_times(){
		$this->db->select('sch_time,sch_slot')->from('tbl_settings')->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		return ($query->num_rows() > 0 ) ? $query->result_array() : false;
	}
	 public function email_check($email){
		$this->db->where('email',$email);
		$this->db->select('client_id')->from('tbl_client');
		$res = $this->db->get();
		$user = $res->row()->client_id;
		return $user;
	}
	public function pay_det($c_id,$p_id)
	{
		$this->db->order_by('chart_id','desc');
		$this->db->limit(1);
		$this->db->where('client_id',$c_id);
		$this->db->where('patient_id',$p_id);
		$this->db->set('t_status','2');
		$this->db->update('prescription_detail');
		return true;
	}
	public function add_app() {
		$registration_info = array(
			'name' => $this->input->post('name'),
			'specialities' => $this->input->post('specialities'),
			'experience' => $this->input->post('experience'),
			'education' => $this->input->post('education'),
			'email' => $this->input->post('email'),
			'mobile' => $this->input->post('mobile'),
			'clinic_name' => $this->input->post('clinic_name'),
			'address' => $this->input->post('address'),
			'clinic_website' => $this->input->post('clinic_website'),
			'clinic_from' => $this->input->post('clinic_from'),
			'clinic_to' => $this->input->post('clinic_to'),
			'app_logo' => $this->input->post('upload_img'),
		);
		
		$this->db->insert('tbl_app_det', $registration_info);
		return $this->db->insert_id();  
	}
	public function edit_app($value,$value1,$value2) {
		$this->db->where('clinic_name',$this->input->post('clinic_name'));
		$this->db->select('app_id')->from('tbl_app_det');
		$res = $this->db->get();
		if($res->result_array() == false) {
		$img = $this->input->post('upload_img');
			if($img != ''){
				$val = 'http://18.139.248.5/uploads/logo/'.$img;
			} else {
				$val = $this->input->post('upload');
			}
		$registration_info = array(
			'email' => $this->input->post('email'),
			'mobile' => $this->input->post('mobile'),
			'clinic_name' => $this->input->post('clinic_name'),
			'address' => $this->input->post('address'),
			'clinic_website' => $this->input->post('clinic_website'),
			'app_logo' => $val,
			'short_desc' => $this->input->post('short_desc'),
			'long_desc' => $this->input->post('long_desc'),
			'client_id' => $this->session->userdata('client_id')
		);
		
		$this->db->insert('tbl_app_det', $registration_info);
		$id = $this->db->insert_id();
		$this->mail_model->app_reg();
		return $id; 
		}
		else {
			$img = $this->input->post('upload_img');
			if($img != ''){
				$val = 'http://18.139.248.5/uploads/logo/'.$img;
			} else {
				$val = $this->input->post('upload');
			}
			$registration_info1 = array(
				'email' => $this->input->post('email'),
				'mobile' => $this->input->post('mobile'),
				'address' => $this->input->post('address'),
				'clinic_website' => $this->input->post('clinic_website'),
				'app_logo' => $val,
				'doctor_photo' => $val1,
				'short_desc' => $this->input->post('short_desc'),
				'long_desc' => $this->input->post('long_desc'),
				'profile_desc' => $this->input->post('profile_desc'),
							'client_id' => $this->session->userdata('client_id')
			);
			$this->db->where('clinic_name',$this->input->post('clinic_name'));
			$this->db->update('tbl_app_det', $registration_info1);
		}
			
	}
	public function add_notification() {  
		$pic = 'http://18.139.248.5/uploads/app/'.$this->input->post('upload_img');
		$date = date('Y-m-d');
		$time = $date.' '.$this->input->post('time');
		$patient_id = implode(',',$this->input->post('patient_id'));
		$id =  explode(',',$patient_id);
		for($i=0; $i < sizeof($id); $i++){
			$validity_info = array(
				'client_id' => $this->session->userdata('client_id'),
				'date' => $time,
				'title' => $this->input->post('title'),
				'message' => $this->input->post('message'),
				'image' => $pic,
				'short_desc' => $this->input->post('short_desc'),
				'patient_id' => $id[$i],
				'not_date'=> date('Y-m-d')
			);
		   $this->db->insert('tbl_notifications', $validity_info);
		}
		return true;
	}
	public function add_physiojob() {
		$date = date('Y-m-d');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('*')->from('tbl_client');
		$res = $this->db->get();
		$f_name = $res->row()->first_name;
		$l_name = $res->row()->last_name;
		$email = $res->row()->email;
		$clinic = $res->row()->clinic_name;
		$validity_info = array(
		    'client_id' => $this->session->userdata('client_id'),
			'date' => $date,
			'firstname' => $f_name,
			'lastname' => $l_name,
			'email' => $email,
			'Organization_name' => $clinic,
			'Organization_type' => 'clinic',
			'country_code' => $this->input->post('digit'),
			'password' => $this->input->post('password'),
			'mobile' => $this->input->post('mobile')
		);
		$this->db->insert('tbl_jobs', $validity_info);
		return true;
	}
	public function add_physiojobdesc() {
		$date = date('Y-m-d');
		$prov_diagnosis = $this->input->post('qualify');
		$provDiagnosis = implode(",",$prov_diagnosis);
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('user_id')->from('tbl_jobs');
		$res = $this->db->get();
		$user_id = $res->row()->user_id;
		$validity_info = array(
		    'user_id' => $user_id,
			'date' => $date,
			'title' => $this->input->post('title'),
			'description' => $this->input->post('desc'),
			'min_salary' => $this->input->post('min'),
			'max_salary' => $this->input->post('max'),
			'hospital_location' => $this->input->post('location'),
			'hospital_name' => $this->input->post('clinic_name'),
			'job_position' => $this->input->post('position'),
			'qualification' => $provDiagnosis,
			'speciality' => $this->input->post('special')
		);
		$this->db->insert('tbl_jobsdesc',$validity_info);
		return true;
	}
	public function invoice_det($client_id) {
		$this->db->where('wi.client_id',$client_id);
		$this->db->select('pi.first_name,pi.last_name,wi.payment_date,wi.amount,wi.client_id,wi.bill_id')->from('invoice_wallet wi');
		$this->db->join('tbl_patient_info pi','wi.patient_id = pi.patient_id');
		$query = $this->db->get();
		return ($query->num_rows() > 0 ) ? $query->result_array() : false;
	}
	public function exercise_det(){
		$this->db->select('*');
		$this->db->where('t_status','2');
		$this->db->from("prescription_detail");
		$this->db->order_by("chart_id", "desc");
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		return ($query->num_rows() > 0 ) ? $query->result_array() : false;
	}
	public function delete_notification($sn_id) {
		$this->db->where('notification_id',$sn_id);
		$this->db->delete('tbl_notifications');
		return true;
	}
	public function edit_notification() {
		$this->db->where('notification_id',$this->uri->segment('4'));
		$this->db->select('*')->from('tbl_notifications');
		$query = $this->db->get();
		return ($query->num_rows() > 0 ) ? $query->row_array() : false;
	}
	public function edit_notification1($id) {
		$this->db->where('notification_id',$id);
		$this->db->select('*')->from('tbl_notifications');
		$query = $this->db->get();
		return ($query->num_rows() > 0 ) ? $query->row_array() : false;
	}
	public function update_notification() {
		$data = array(
		'title' => $this->input->post('title'),
		'short_desc' => $this->input->post('short_desc'),
		'message' => $this->input->post('message'),
		);
		$this->db->where('notification_id',$this->input->post('id'));
		$this->db->update('tbl_notifications',$data);
	}
	public function doc_add() {
		if($this->input->post('upload_img1') != '' || $this->input->post('upload_img1') != false){
		$image = 'http://18.139.248.5/uploads/doc_photo/'.$this->input->post('upload_img1');
		} else {
			$image = '';
		}
		$data = array(
		'client_id' => $this->session->userdata('client_id'),
		'doc_name' => $this->input->post('name'),
		'doc_spec' => $this->input->post('special'),
		'doc_exper' => $this->input->post('experience'),
		'doc_edu' => $this->input->post('education'),
		'doc_photo' => $image,
		);
		$this->db->insert('tbl_doctors_list',$data);
		return true;
	}
	public function doctor_det($client_id) {
		$this->db->where('client_id',$client_id);
		$this->db->select('*')->from('tbl_doctors_list');
		$query = $this->db->get();
		return ($query->num_rows() > 0 ) ? $query->result_array() : false;
	}
	public function delete_doctor($sn_id) {
		$this->db->where('doctor_id',$sn_id);
		$this->db->delete('tbl_doctors_list');
		return true;
	}
	public function edit_doc() {
		$doctor_id = $this->uri->segment(4);
		$this->db->where('doctor_id',$doctor_id);
		$this->db->select('*')->from('tbl_doctors_list');
		$query = $this->db->get();
		return ($query->num_rows() > 0 ) ? $query->row_array() : false;
	
		
	}
	public function update_doctordetails() {
		if($this->input->post('upload_img1') != '' || $this->input->post('upload_img1') != false){
		  $image = 'http://18.139.248.5/uploads/doc_photo/'.$this->input->post('upload_img1');
		} else if($this->input->post('scan_hidden') != '' || $this->input->post('scan_hidden') != false){
		  	$image = 'http://18.139.248.5/uploads/doc_photo/'.$this->input->post('scan_hidden');
		} else {
			$image = '';
		}
		$data = array(
		'doc_name' => $this->input->post('name'),
		'doc_spec' => $this->input->post('special'),
		'doc_exper' => $this->input->post('experience'),
		'doc_edu' => $this->input->post('education'),
		'doc_photo' => $image,
		);
		$this->db->where('doctor_id',$this->input->post('id'));
		$this->db->update('tbl_doctors_list',$data);
		return true;
	}
	public function add_notify() {
		$pic = 'http://18.139.248.5/uploads/app/'.$this->input->post('upload_img');
		$date = date('Y-m-d');
		$time = $date.' '.$this->input->post('time');
		$validity_info = array(
		    'client_id' => $this->session->userdata('client_id'),
			'date' => $time,
			'title' => $this->input->post('title'),
			'message' => $this->input->post('message'),
			'image' => $pic,
			'short_desc' => $this->input->post('short_desc'),
			'not_date'=> date('Y-m-d')
		);
		
		$this->db->insert('tbl_notify', $validity_info);
		return true;
	}
	public function edit_notify() {
		$this->db->where('notification_id',$this->uri->segment('4'));
		$this->db->select('*')->from('tbl_notify');
		$query = $this->db->get();
		return ($query->num_rows() > 0 ) ? $query->row_array() : false;
	}
	public function delete_notify($sn_id) {
		$this->db->where('notification_id',$sn_id);
		$this->db->delete('tbl_notify');
		return true;
	}
	public function add_clinicdetails()
	{		
		$data=array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'mobile_no'=> $this->input->post('mobile_no'),
			'clinic_name'=> $this->input->post('clinic_name'),
			'role'=> $this->input->post('role'),
			'message' => $this->input->post('message')
		);  
		 $this->db->insert('tbl_details', $data);
		 $id = $this->db->insert_id();
		 
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
				  'newline' => "\r\n"
		  ));
         
		  $this->email->from('no-reply@physioplustech.com','Physio Plus Tech - Singapore');
		  	
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
												<img style="float:left;"  src="http://www.physioplustech.in/img/logo.png">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
													<td colspan = "2">
													<p style="color:#666;padding-left:25px;font-size:120%">Hello Admin</p>
													</td>
													
												</tr>
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Name : </p>
												</td>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%"> '.$this->input->post('name').' </p>
												</td>
												</tr>
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Email </p>
												</td>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">'.$this->input->post('email').'</p>
												</td>
												</tr><tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Mobile No :</p>
												</td>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">'.$this->input->post('mobile_no').' </p>
												</td>
												</tr>
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%"> Message :</p>
												</td>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">'.$this->input->post('message').'</p>
												</td>
												</tr>
												<tr>
												<td width="275px">&nbsp;
												</td>
												<td width="275px">&nbsp;
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
		$this->email->subject('Contest Registration Info');
		$this->email->message($template);
		$this->email->send();
		 
		 
		 
		 return $id;
	} 
	public function email1_check($email){
		$this->db->where('email',$email);
		$this->db->select('details_id')->from('tbl_details');
		$res = $this->db->get();
		if($res->result_array() != false){
		$user = $res->row()->details_id;
		} else {
			$user = '';
		}
		return $user;
	}
	public function staff_revenue() {   
		$search2 = $this->uri->segment(6);
		$search1 = $this->uri->segment(5);
		$search = $this->uri->segment(4);
		if($search == 'search'){
			$this->db->where('ih.treatment_date >=',date('Y-m-d',strtotime($search1)));
			$this->db->where('ih.treatment_date <=',date('Y-m-d',strtotime($search2)));
		} else {
		}
		$this->db->select('si.staff_id,si.first_name,si.last_name,SUM(ih.total_amt) as total,SUM(ih.net_amt) as net,SUM(ih.paid_amt) as paid,SUM(ih.tax_perc * total_amt / 100) as tax,SUM(ih.discount_perc) as discount')->from('tbl_invoice_header ih');
		$this->db->join('tbl_staff_info si','si.staff_id=ih.staff_id');
		$this->db->group_by('si.staff_id');
		$query = $this->db->get();
		return ($query->num_rows() > 0 ) ? $query->result_array() : false;
	}
	public function treatment_amt() {
		$search2 = $this->uri->segment(6);
		$search1 = $this->uri->segment(5);
		$search = $this->uri->segment(4);
		if($search == 'search'){
			$this->db->where('iv.treatment_date >=',date('Y-m-d',strtotime($search1)));
			$this->db->where('iv.treatment_date <=',date('Y-m-d',strtotime($search2)));
		} else {
		}
		$this->db->select('SUM(iv.total_amt) as t_amount,SUM(iv.net_amt) as amount,SUM(iv.paid_amt) as paid_amt,SUM((tax_perc * total_amt / 100)) as tax,SUM(discount_perc) as discount,iv.client_id')->from('tbl_invoice_header iv');
		$this->db->where('iv.client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		return ($query->num_rows() > 0 ) ? $query->result_array() : false;
	}
	public function treatment_revenue() {
		$search2 = $this->uri->segment(6);
		$search1 = $this->uri->segment(5);
		$search = $this->uri->segment(4);
		if($search == 'search'){
			$this->db->where('iv.treatment_date >=',date('Y-m-d',strtotime($search1)));
			$this->db->where('iv.treatment_date <=',date('Y-m-d',strtotime($search2)));
		} else {
		}
		$this->db->select('si.item_name,iv.item_id,SUM(iv.item_quantity) as count,SUM(iv.item_quantity * iv.item_price) as net_amt')->from('tbl_invoice_detail iv');
		$this->db->join('tbl_item si','si.item_id=iv.item_id');
		$this->db->group_by('iv.item_id');
		$query = $this->db->get();
		return ($query->num_rows() > 0 ) ? $query->result_array() : false;
	}
	public function product_revenue() {  
		$search2 = $this->uri->segment(6);
		$search1 = $this->uri->segment(5);
		$search = $this->uri->segment(4);
		if($search == 'search'){
			$this->db->where('iv.treatment_date >=',date('Y-m-d',strtotime($search1)));
			$this->db->where('iv.treatment_date <=',date('Y-m-d',strtotime($search2)));
		} else {
		}
		$this->db->like('item_id','PR','both');
		$this->db->select('iv.item_id,SUM(iv.item_quantity) as count,SUM(iv.item_quantity * iv.item_price) as net_amt')->from('tbl_invoice_detail iv');
		$query = $this->db->get();
		return ($query->num_rows() > 0 ) ? $query->result_array() : false;
	}
	public function get_time($staff_id){
		$this->db->where('staff_id',$staff_id);
		$this->db->select('*')->from('tbl_daywise');
		$query = $this->db->get();
		return ($query->num_rows() > 0 ) ? $query->result_array() : false;
	}
	public function apt_details($id){  
		$this->db->select('start,appointment_id,bill_id')->from('tbl_appointments');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('patient_id',$id);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	 public function sign_save()
	{
		$data = array(
			'img_name'=>$this->generate_Newimage(),
			'patient_id'=>$this->input->post('patient_id'),
			'date' => date('Y-m-d'),
			'client_id'=>$this->input->post('client_id')
		);
		$this->db->insert('tbl_consent_sign',$data);
		return $this->db->insert_id();
	}
	public function get_patient_name($appoint_id)
	{	

		$this->db->where('ai.appointment_id',$appoint_id);
		$this->db->select('pi.first_name,pi.last_name')->from('tbl_appointments ai');
		$this->db->join('tbl_patient_info pi','pi.patient_id = ai.patient_id');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row()->first_name." ".$query->row()->last_name : false;
	}
	public function generate_Newimage() {
		
		$data = $this->input->post('contractdata');
 
        $data = str_replace('data:image/png;base64,', '', $data);

		$data = str_replace(' ', '+', $data);
       
	    $data = base64_decode($data);
       
	    $file = 'sign/'.rand() . '.png';
		
		$success = file_put_contents($file, $data);

		$data = base64_decode($data); 

		$source_img = imagecreatefromstring($data);

		$rotated_img = imagerotate($source_img, 90, 0); 

		$file1 = 'sign/'. rand(). '.png';

		$imageSave = imagejpeg($rotated_img, $file1, 10);

		imagedestroy($source_img); 
    
        return $file;	
		  
	}
	public function i_friends($client_id) {
		$this->db->where('client_id',$client_id);
		$this->db->select('*')->from('tbl_invitefriends');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	
	}	
	public function invite_friends() {
		$data = array(
			'client_id' => $this->input->post('client_id'),
			'name' => $this->input->post('name'),
			'mobile' => $this->input->post('mobile'),
			'email' => $this->input->post('email'),
			'create_date' => date('Y-m-d')
		);
		$this->db->insert('tbl_invitefriends',$data); 
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
		$id = $this->db->insert_id();
		$name1=$this->input->post('name');
		$name=$this->session->userdata('firstname');
		$url = 'https://physioplustech.in/registration/invite/REG'.$id.'/'.date('d');
		
		$html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="background-color: #e4e7e0;"> <tbody><tr> <td width="100%"> <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: 0 auto; padding: 0;" class="mobile"> <tbody><tr> <td width="100%"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 5px 0; color: #000000; font-family: Arial,Helvetica,sans-serif; font-size: 11px; font-weight: light; line-height: 15px;"></td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="45%" style="padding: 7px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="font: 26px impact; color: #fff;">Physio Plus Tech<!--<img width="174" height="34" border="0" style="display: block;" alt="Logo" src="logo.png" class="imageScale">--></td> </tr> </tbody></table> </td> <td width="55%" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 2px 15px; background-color: #23a6bd; color: #ffffff; font-family: Impact; font-size: 25px; line-height: 29px;">Invitation</td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff; padding: 20px 0 10px 0;"> <tbody><tr> <td class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding: 15px 0 0 0;"> <tbody><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"> <div style="color: #130f0e; font-size: 14px; font-weight: bold; line-height: 21px; text-align: left;">Dear '. $name1 .',</div><br> <div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">'.$name.' sent you a coupon code for Rs.1000 on "Physio Wallet" Visit the below link to receive it. '.$url.'</div> </td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="100%" style="font-size: 10px;">&nbsp;</td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding-bottom: 14px;"> <tbody><tr> <td width="30%" style="padding: 10px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Facebook" src="'. base_url() .'img/facebook.png"></a></td> <td align="center"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Twitter" src="'. base_url() .'img/twitter.png"></a></td> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img border="0" style="display: block;" alt="Envelope" src="'. base_url() .'img/envelope.png"></a></td> <td align="center" style="padding-right: 7px;"></td> </tr> </tbody></table> </td> <td width="70%" style="padding: 10px 0; background-color: #343135;" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding-right: 10px; padding-left: 7px; color: #ffffff; font-family: Arial,Helvetica,sans-serif; font-size: 10px; line-height: 14px; text-align: left;">You have received this email cause you have subscribed to '. $info['ClinicName'] .'.<br> &copy; 2013 Your Company</td> </tr> </tbody></table> </td> </tr> </tbody></table> </td> </tr> </tbody></table></td> </tr> </tbody></table>';	

		$this->email->to($this->input->post('email'));
		$this->email->subject('Physio Plus Tech - Invitation');
		$this->email->message($html);
		$this->email->send();
		return $id;
	}
	public function send_rmail(){
		
		/* $this->db->where('client_id',$this->input->post('c_id'));
		$this->db->set('email_verified',1);
		$this->db->set('status',1);
		$this->db->update('tbl_client'); */
		
		$this->db->where('client_id',$this->input->post('c_id'));
		$this->db->select('*')->from('tbl_client');
		$res = $this->db->get();
		
		
		$clientName = ucfirst($res->row()->first_name).' '.ucfirst($res->row()->last_name);
		$admin = array(
			'ClinicName' => ucfirst($res->row()->first_name),
			'ClientName' => $clientName,
			'City' => $res->row()->city,
			'State' => $res->row()->state,
			'UserName' => $res->row()->email,
			'Password' => $res->row()->password,
			'MobileNo' => $res->row()->mobile,
			'PhoneNo' => $res->row()->phone,
			'coupon_code' => $res->row()->coupon_code,
			'LastLoginDate' => date('Y-m-d H:i:s')
			
		);
		$adminMessage = $this->mail_model->regInformationTemplate($admin);
		
		$adminMailConfig = array('clinic'=> 'Physio Plus Tech','to' => 'contact@physioplusnetwork.com', 'subject' => 'Client Registration Info from Software', 'message' => $adminMessage);
		$this->mail_model->sendEmail($adminMailConfig);
		
		$adminMailConfig = array('clinic'=> 'Physio Plus Tech','to' => 'sales@physioplusnetwork.com', 'subject' => 'Client Registration Info from Software', 'message' => $adminMessage);
		$this->mail_model->sendEmail($adminMailConfig);
		return true;
	}
	public function letter_edit()
	{
		$this->db->where('client_id',$this->uri->segment(3));
	    $this->db->select('*')->from('tbl_letter')->where('letter_id',$this->uri->segment(4));
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array()  : false;
	}
	public function client_details()
	{
		$this->db->select('*')->from('tbl_client')->where('client_id',$this->uri->segment(3));
		$query =$this->db->get();
		return ($query->num_rows()>0) ? $query->result_array()  : false;
	}
	public function orderHistory($client_id)
	{
	   $this->db->select('*')->from('tbl_order_details')->where('client_id', $client_id)->order_by("order_id", "desc")->limit(5);
	   $query=$this->db->get();
	   //$data['invoice_record']= $query->result_array();
	   //echo $query->num_rows().'hi';
	   return ($query->num_rows() > 0) ? $query->result_array() : false;

	}
	public function orderDetails()
	{
	   $orderId=$this->uri->segment(4);
	   $this->db->select('*')->from('tbl_order_details')->where('order_id', $orderId);
	   $query=$this->db->get();
	   //$data['invoice_record']= $query->result_array();
	   //echo $query->num_rows().'hi';
	   //echo $query->num_rows();
	   return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function bill_client()
	{
		$this->db->select('*')->from('tbl_client')->where('client_id', '103');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function get_summary($patient_id){
	  $this->db->where('patient_id',$patient_id);
	  $this->db->select('age,gender')->from('tbl_patient_info');
	  $query=$this->db->get();
	  return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function get_history($patient_id){
	  $this->db->where('patient_id',$patient_id);
	  $this->db->select('medical')->from('tbl_patient_history');
	  $query=$this->db->get();
	  return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function get_complaints($patient_id){
	  $this->db->where('patient_id',$patient_id);
	  $this->db->select('chief_complaints_dtl')->from('tbl_patient_chief_complaints');
	  $query2=$this->db->get();
	  return ($query2->num_rows() > 0) ? $query2->row_array() : false;
	}
	public function get_pay($patient_id){
	  $this->db->where('patient_id',$patient_id);
		$this->db->select('SUM(net_amt) as total,SUM(paid_amt) as paid')->from('tbl_invoice_header');
		$inc = $this->db->get();
		if($inc->result_array() != false){
		   $inv = ($inc->row()->total) - ($inc->row()->paid);
		} else {
		   $inv = '0.00'; 
		}
	  return $inv;
	}
	public function get_treatment($patient_id){
	 $this->db->where('pi.patient_id',$patient_id);
	 $this->db->select('it.item_name')->from('tbl_patient_treatment_techniques pi');
	 $this->db->join('tbl_item it','pi.treatments = it.item_id');
	 $query2=$this->db->get();
	 return ($query2->num_rows() > 0) ? $query2->row_array() : false;
	}
	public function get_visit($patient_id){
	 $this->db->where('patient_id',$patient_id);
	 $this->db->where('treatment_date >',date('Y-m-d'));
	 $this->db->select('treatment_date')->from('tbl_patient_treatment_techniques pi');
	 $this->db->order_by('treatment_date','ASC');
	 $d = $this->db->get();
	 if($d->result_array() != false){
		  $date1 = $d->row()->treatment_date;
		  $treatment_date =  date('d-m-Y',strtotime($date1));
		  $this->db->where('appointment_from',$date1);
	      $this->db->where('patient_id',$patient_id);
		  $this->db->select('appointment_id')->from('tbl_appointments');
		  $q = $this->db->get();
		  if($q->result_array() != false){
		     $app = '1';
		  } else {
			 $app = ''; 
		  }
	 } else {
		$treatment_date = 'N/A';
	 }
	 return $treatment_date;
	}
} 