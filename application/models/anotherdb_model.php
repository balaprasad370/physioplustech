<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

class Anotherdb_model extends CI_Model
{
  private $another;
  function __construct()
  {
    parent::__construct();
    $this->legacy_db = $this->load->database('second', true);
  }

  public function add_register() {
	 $registration_info = array(
			'first_name' => $this->input->post('fullname'),
			'clinic_name' => $this->input->post('clinic_name'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'mobile' => $this->input->post('mobile'),
			'phone' => $this->input->post('phone'),
			'address' => $this->input->post('address'),
			'city' => $this->input->post('city'),
			'state' => $this->input->post('state'),
			'zipcode' => $this->input->post('zipcode'),
			'status' => 0,
			'email_verified' => 0,
			'exes_chart' => 1,
			'account_type' => 1,
			'created_on' => date('Y-m-d H:i:s'),
			'last_login_date' => date('Y-m-d H:i:s'),
		);
		
		$this->legacy_db->insert('tbl_user', $registration_info);
		return true;
	 }
	 public function getalleventtype() {
			$this->legacy_db->select('event_id')->from('tbl_event');
			$query=$this->legacy_db->get();
			return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function eventcount1($event_id)
	{
		$this->legacy_db->select('AVG(review_rating) as star')->from('tbl_review');
        $this->legacy_db->where('event_id',$event_id);	
	    $query = $this->legacy_db->get();
	    return  ($query->num_rows() > 0) ? $query->row_array() : false;
	} 
	 public function getevent_det($event_id) {
			$this->legacy_db->where('event_id',$event_id);
			$this->legacy_db->select('*')->from('tbl_event');
			$query=$this->legacy_db->get();
			return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getcity_det() {
			
			$this->legacy_db->select('city_name')->from('tbl_city');
			$query=$this->legacy_db->get();
			return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getticketcount($event_id) {
		$this->legacy_db->select('sum(no_tickets) as tickets')->from('tbl_tickets');
		$this->legacy_db->where('event_id',$event_id);
		$query = $this->legacy_db->get();
		$no_ticket = $query->row()->tickets;
		return $no_ticket;
	}
	public function getticketrate($event_id) {
		
		$this->legacy_db->select('price')->from('tbl_price');
		$this->legacy_db->where('event_id',$event_id);
		$query = $this->legacy_db->get();
		if($query->result_array() != false){
		$price1 = $query->row()->price;
		return $price1;
		} else {
			return false;
		}
	}
	public function edit_payout($event_id) {
		$this->legacy_db->where('event_id',$event_id);
		$this->legacy_db->set('status','1');
		$this->legacy_db->set('paid_date',date('Y-m-d'));
		$this->legacy_db->update('tbl_tickets');
	}
	public function delegate_type($event_id)
	{
		$this->legacy_db->select('ticket_name,price_id')->from('tbl_price')->where('event_id',$event_id);
	    $this->legacy_db->distinct();
		$query=$this->legacy_db->get();
	    return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	/* public function preconference($event_id)
	{
	$this->legacy_db->where('conference','Preconference');
	$this->legacy_db->select('topic,conference')->from('tbl_preconference')->where('event_id',$event_id);
	$this->legacy_db->distinct();
    $query=$this->legacy_db->get();
	return ($query->num_rows() > 0) ? $query->result_array() : false;
	
	
	}
	
	public function postconference($event_id)
	{
	$this->legacy_db->where('conference','PostConference');
	$this->legacy_db->select('topic,conference')->from('tbl_preconference')->where('event_id',$event_id);
	$this->legacy_db->distinct();
    $query=$this->legacy_db->get();
	return ($query->num_rows() > 0) ? $query->result_array() : false;
	
	
	}
	
	
	
	
	public function conferencetype($event_id)
	{
	$this->legacy_db->select('conference')->from('tbl_preconference')->where('event_id',$event_id);
	$this->legacy_db->distinct();
    $query=$this->legacy_db->get();
	return ($query->num_rows() > 0) ? $query->result_array() : false;
	
	
	}
	
	
	public function preconferenceprice($event_id)
	{
	
	$this->legacy_db->where('conference','Preconference');
	$this->legacy_db->select('price')->from('tbl_preconference')->where('event_id',$event_id);
	$this->legacy_db->distinct();
    $query=$this->legacy_db->get();
	return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	
	public function preconference_pricedetails($val)
	{
	$id = explode('/',$val);
	$this->legacy_db->where('conference','Preconference');
	$this->legacy_db->where('event_id',$id[1]);
	$this->legacy_db->where('topic',$id[0]);
	$this->legacy_db->select('price')->from('tbl-preconference');
	$query = $this->legacy_db->get();
	if($query->result_array() != false){
		$price = $query->row()->price;
		$data = array('price' => $price);
		if($data != false){
		return $data;	
		} else {
		return false;	
		}
		} else {
			return false;	
		}
	}
	
	public function postconference_pricedetails($val)
	{
	$id = explode('/',$val);
	$this->legacy_db->where('conference','postconference');
	$this->legacy_db->where('event_id',$id[1]);
	$this->legacy_db->where('topic',$id[0]);
	$this->legacy_db->select('price')->from('tbl-preconference');
	$query = $this->legacy_db->get();
	if($query->result_array() != false){
		$price = $query->row()->price;
		$data = array('price' => $price);
		if($data != false){
		return $data;	
		} else {
		return false;	
		}
		} else {
			return false;	
		}
	
	
	} */
	public function price_details() { 
	    $val = $this->uri->segment(4);
		$val1 = $this->uri->segment(5);
		$this->legacy_db->where('event_id',$val1);
		$this->legacy_db->where('price_id',$val);
		$this->legacy_db->select('price')->from('tbl_price');
		$query = $this->legacy_db->get();
		if($query->result_array() != false){
		
		 $data = $query->row()->price;
		
		} else {
			$data = '';
		}
		return $data;
	}
	public function get_username($event_id) {
		$this->legacy_db->select('client_id')->from('tbl_organizer');
		$this->legacy_db->where('event_id',$event_id);
		$res = $this->legacy_db->get();
		if($res->result_array() != false) {
			$client_id = $res->row()->client_id;
			$this->legacy_db->where('client_id',$client_id);
			$this->legacy_db->select('client_id,first_name,last_name')->from('tbl_user');
			$query = $this->legacy_db->get();
			return ($query->num_rows() > 0) ? $query->row_array() : false;
		} else {
			return false;
		}
	}
	public function add_jobs() {
		$curl = curl_init();
		
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('mobile,client_id,email,first_name,last_name')->from('tbl_client');
		$res = $this->db->get();
		$mobile = $res->row()->mobile;
		$client_id = $res->row()->client_id;
		$email = $res->row()->email;
		$first_name = $res->row()->first_name;
		$last_name = $res->row()->last_name;
		$post_data='mobile_no='.$mobile.'&country_code=91&email='.$email.'&name='.$first_name.'&integrated_from='.$email;
		$url="https://recruiter.curofy.com/recruiter_signup_hms";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));   
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		$result = curl_exec($ch);
		//$json = '{"status": 1, "data": {"auth_token": "6f7ae295c8438e5e0a786b65f99aaa1f", "user_id": "pavi"}}';
		if(is_array($result)){
		extract(json_decode($result, true));
		if($status == '1'){
			$token = $data['auth_token'];
			$user_id = $data['user_id'];
			$data = array(
			    'client_id' => $this->session->userdata('client_id'),
				'user_id' => $user_id,
				'token' => $token
			);
			$this->db->insert('tbl_jobs',$data);
			$id = $this->db->insert_id();
		} 
		} else { } 
		return true;
	}
	public function getjobs() {
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('*')->from('tbl_jobs');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	
	}
	public function event_register() {
		$data = array(
			 'name' => $_GET['name'],
			 'college_name'=> $_GET['mobile'],
			 'client_id'=> $_GET['branch'],
			 'mobile'=> $_GET['mobile'],
			 'city'=> $_GET['mobile'],
			 'event_id'=> $_GET['event_id'],
			 'date'=> date('Y-m-d'),
			 'email' => $_GET['email']
		);
		$this->legacy_db->insert('tbl_free_register',$data);
		$id = $this->legacy_db->insert_id();
		return $id;
	}
	public function price_details1() {
		$this->legacy_db->where('event_id',$_GET['event_id']);
		$this->legacy_db->select('*')->from('tbl_price');
		$query = $this->legacy_db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
   }
	 
	
	
	
  
}