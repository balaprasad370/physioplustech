<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class App_access {
	
	public function __construct() {
		// create ci instance 
		if( !isset($this->ci) ) $this->ci = & get_instance();
	}
	
	// find owner login status
	public function is_owner_logged_in() {
		$login_status = $this->ci->session->userdata('owner_login');
		return ($login_status == true) ? true : false;
	}
	
	// check login status and redirect to home if no session
	public function owner() {
		$login_status = $this->ci->session->userdata('owner_login');
		if($login_status != true) {
			redirect( base_url() . 'physioadmin/login' );	
		}
	}
	
	//find client login status
	public function is_client_logged_in(){
		$login_status=$this->ci->session->userdata('client_login');
		return ($login_status==true) ? true : false;
	}
	
	//check login status of client and redirect to home if no session
	public function client(){
		$login_status=$this->ci->session->userdata('client_login');
		if($login_status!=true){
			redirect(base_url().'client/dashboard/login');
		}
	}
	
	//find user login status
	public function is_user_logged_in(){
		$login_status=$this->ci->session->userdata('user_login');
		return ($login_status==true) ? true : false;
	}
	
	
	//check login status of user and redirect to home if no session
	public function client_user(){
		$login_status=$this->ci->session->userdata('user_login');
		if($login_status!=true){
			redirect(base_url().'user/dashboard/login');
		}
	}
	
	
	//check user privileges
	public function user_privileges($allow = ''){
		$login_status = $this->ci->session->userdata('user_login');
		if($login_status!=true){
			redirect(base_url().'user/dashboard/login');
		} else {
			$this->ci->db->select('privileges')->from('tbl_user')->where('user_id', $this->ci->session->userdata('user_id'));
			$query = $this->ci->db->get();
			$allowed = explode(',', $query->row()->privileges);
			$this->ci->db->select('privilege_name')->from('tbl_privileges');	
			$this->ci->db->where_in('privilege_id', $allowed);
			//$this->ci->db->where('privilege_id IN (SELECT privileges FROM tbl_user WHERE user_id = "'.$this->ci->session->userdata('user_id').'")', NULL, FALSE);
			$Query = $this->ci->db->get();
			$privileges = array();
			foreach($Query->result_array() as $privilege) {
				array_push($privileges, $privilege['privilege_name']);
			}
			if(in_array($allow, $privileges)){
				// do nothing 
			} else {
				redirect(base_url().'client/dashboard/');
			}
		}
	}
	
	
	//check user privileges
	public function check_user_privileges($allow = ''){
		$client_login_status = $this->ci->session->userdata('client_login');
		$user_login_status = $this->ci->session->userdata('user_login');
		if($user_login_status==true && $client_login_status== true){
			$this->ci->db->select('privileges')->from('tbl_user')->where('user_id', $this->ci->session->userdata('user_id'));
			$query = $this->ci->db->get();
			$allowed = explode(',', $query->row()->privileges);
			$this->ci->db->select('privilege_name')->from('tbl_privileges');	
			$this->ci->db->where_in('privilege_id', $allowed);
			//$this->ci->db->where('privilege_id IN (SELECT privileges FROM tbl_user WHERE user_id = "'.$this->ci->session->userdata('user_id').'")', NULL, FALSE);
			$Query = $this->ci->db->get();
			$privileges = array();
			foreach($Query->result_array() as $privilege) {
				array_push($privileges, $privilege['privilege_name']);
			}
			if(in_array($allow, $privileges)){
				return true;
			} else {
				return false;
			}
		} else {
			return true;	
		}
	}
	
	public function is_patient_logged_in(){
		$login_status=$this->ci->session->userdata('patient_login');
		return ($login_status==true) ? true : false;
	}
	
	public function patient(){
		$login_status=$this->ci->session->userdata('patient_login');
		if($login_status!=true){
			redirect(base_url().'patient/patient/login');
		}
	}
	public function nist(){
		$login_status=$this->ci->session->userdata('nist_login');
		if($login_status!=true){
			redirect(base_url().'nist/dashboard/');
		}
	}
}