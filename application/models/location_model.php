<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Location_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		// load required models
		$this->load->model(array('mail_model','registration_model'));
	}
	
	public function locationAdd() {
		$email_verification_code=$this->generate_code();
		$clientDetails = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$result = $this->input->post('country');
        $result_explode = explode('|', $result);
		$locationData = array(
			'parent_client_id' => $this->session->userdata('client_id'),
			'first_name' => $this->input->post('first_name'),
			'branch_name' => $this->input->post('branch_name'),
			'clinic_name' => $clientDetails['clinic_name'],
			'email' => $this->input->post('email'),
			'username' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'mobile' => $this->input->post('mobile'),
			'phone' => $this->input->post('phone'),
			'address' => $this->input->post('address'),
			'city' => $this->input->post('city'),
			'state' => $this->input->post('state'),
			'zipcode' => $this->input->post('zipcode'),
			'country' => $result_explode[0],
			'currency' => $result_explode[1], 
			'status' => 1,
			'email_verified' => 1,
			'plan_id' => 4,
			'account_type' => 1,
			'email_verification_code' => $email_verification_code,
			'created_on' => date('Y-m-d H:i:s'),
			'last_login_date' => date('Y-m-d H:i:s'),
		);
		$location1 = array(
			'plan_type' => 4,
			'create_date' => date('Y-m-d H:i:s'),
		);  
		$this->db->insert('tbl_client', $locationData);
		$this->db->insert('tbl_validity', $location1);
		$clientName = ucfirst($this->input->post('first_name'));
		$clientDetails = $this->registration_model->editProfile($this->session->userdata('client_id'));
		// patient details for mail template
		$clientInfo = array(
			'ClinicName' => ucfirst($clientDetails['clinic_name']),
			'ClientName' => $clientName,
			'Logo' => $clientDetails['logo'],
			'UserName' => $this->input->post('email'),
			'Password' => $this->input->post('password'),
			'BranchName' => $this->input->post('branch_name'),
		);
		// create email template
		$clientMessage = $this->mail_model->locationInfoTemplate($clientInfo);
		// mail config
		$clientMailConfig = array('to' => $this->input->post('email'), 'subject' => 'New Location Info', 'message' => $clientMessage);
		// send mail
		$this->mail_model->sendEmail($clientMailConfig);
		
		
		return $this->db->insert_id();
	}
	
	public function locationEdit($client_id) {
		
		$locationData = array(
			'parent_client_id' => $this->session->userdata('client_id'),
			'first_name' => $this->input->post('first_name'),
			'branch_name' => $this->input->post('branch_name'),
			'email' => $this->input->post('email'),
			'username' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'mobile' => $this->input->post('mobile'),
			'phone' => $this->input->post('phone'),
			'address' => $this->input->post('address'),
			'city' => $this->input->post('city'),
			'state' => $this->input->post('state'),
			'zipcode' => $this->input->post('zipcode'),
			'country' => $this->input->post('country'),
			'created_on' => date('Y-m-d H:i:s'),
			'last_login_date' => date('Y-m-d H:i:s'),
		);
		
		$where = array('client_id' => $client_id);
		$this->db->where($where);
		$this->db->update('tbl_client',$locationData);
		return $client_id;
	}
	
	//fetch records from user
	public function editLocation($client_id)
	{	
		$where=array('client_id' => $client_id);
		$this->db->select('*')->from('tbl_client')->where($where);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
            $data=$query->row_array();
        }
		return $data;
	}
	
	public function updateLocation($client_id) {
		
		$locationInfo = $this->editLocation($client_id);
		if($locationInfo['status'] == 0)
			$status = 1;
		else
			$status = 0;
		
		$locationData = array(
			'status' => $status
		);
		
		$where = array('client_id' => $client_id);
		$this->db->where($where);
		$this->db->update('tbl_client',$locationData);
		return $client_id;
	}
	
	//get location count
	public function getLocationCount($client_id = '')
	{
		if($client_id == ''){
			$clientId = $this->session->userdata('client_id');
		}else{
			$clientId = $client_id;
		}
		$parentClientId = $this->getParentClientId();
		if($parentClientId == 0){
			$where = array('parent_client_id' => $clientId,'parent_client_id !=' => '0','status' => 1);
		}else{
			$parentInfo = $this->registration_model->editProfile($clientId);
			$where = array('parent_client_id' => $parentInfo['parent_client_id'],'parent_client_id !=' => '0','status' => 1);
		}
		$this->db->select('count(parent_client_id) as locationCount')->from('tbl_client')->where($where);
		$locationcount = $this->db->get();
		if($locationcount->num_rows()>0)
		{
            $locationcount1=$locationcount->row_array();
        }
		return ($locationcount->num_rows()>0) ? $locationcount1['locationCount'] : false;
	}
	
	//get locations
	public function getLocations($datas = '')
	{
		if($datas == ''){
			$clientId = $this->session->userdata('client_id');
		}else{
			$clientId = $datas;
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
		$this->db->select('*')->from('tbl_client')->where($where);
		$query = $this->db->get();
		$data['child'] = $query->result_array();
		
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	// generate email code
	public function generate_code() {
		$query=$this->db->query("select IFNULL(max(substr(email_verification_code,1,20))+1,1) EMAIL_VERIFICATION_CODE from tbl_client ");
		$row = $query->row_array();
		$string  = date('Y-m-d H:i:s').$row['EMAIL_VERIFICATION_CODE'];
		
		return md5($string);
	}
	
	public function getLocationsIds($data = '')
	{
		if($data == ''){
			$clientId = $this->session->userdata('client_id');
		}else{
			$clientId = $data;
		}
		$data = array();
		$parentIds = array();
		$allLocationIds = array();
		$location = $this->getLocations($clientId);
		$parentClientId = $this->getParentClientId($clientId);
		if($parentClientId == 0){
			$locationId[] = '';
			$client_id = $clientId;
			if($location != false){
				foreach($location as $locations){
					$locationId = $locations['client_id'];
					array_push($allLocationIds,$locationId);
				}
			}
			$locationId = $client_id;
			array_push($allLocationIds,$locationId);
		}else{
			$client_id = $clientId;
			$locationId[] = '';
			if($location != false){
				foreach($location as $locations){
					$locationId = $locations['client_id'];
					array_push($allLocationIds,$locationId);
				}
			}
			$locationId = $client_id;
			array_push($allLocationIds,$locationId);
			$childProfileInfo = $this->registration_model->editProfile($clientId);
			$locationId = $childProfileInfo['parent_client_id'];
			array_push($allLocationIds,$locationId);
		}
		return ($allLocationIds != '') ? $allLocationIds : false;
	}
	
	//get parent client id
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
		return ($query->num_rows()>0) ? $query->row()->parent_client_id : false;
	}
} 