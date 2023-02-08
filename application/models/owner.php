<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Owner extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function check_login() {
		/*$sql = "call OwnerLogin(?,?)";
		$execute = $this->db->query($sql, array($this->input->post('username'), $this->input->post('password')));
		print_r( $execute->row_array() );	*/
		$this->db->select('*')->from('admin')->where('user_name = "'. $this->input->post('username') .'" and password = "'. $this->input->post('password') .'"');
		$result = $this->db->get();
		// if user avail 
		if( $result->num_rows() > 0 ) {
			// set session
			/* $user_data = array(
				'owner_login' => true,
				'last_login_date' => $result->row()->last_login_date,
				'last_login_ip' => $result->row()->last_login_ip,
				'username' => $result->row()->username
			);
			$this->session->set_userdata($user_data);
			// update new values
			$update = array('last_login_date' => date('Y-m-d H:i:s'), 'last_login_ip' => $_SERVER['REMOTE_ADDR']);
			$this->db->where('username = "'. $this->input->post('username') .'" and password = "'. $this->input->post('password') .'"');
			$this->db->update('tbl_owner', $update);
			// redirect to home */
			$user_data=array(
				'user_id' =>  $result->row()->user_id,
				'password' =>  $result->row()->password,
				'user_name' =>  $result->row()->user_name,
				'mail' => $result->row()->mail,
			);
			$this->session->set_userdata($user_data);
			
			if($this->session->userdata('user_id') == 5){
				$this->db->where('state','ANDHRA PRADESH');
				$this->db->or_where('state','Andhra Pradesh');
				$this->db->set('state','telangana');
				$this->db->update('tbl_client');
			}
			redirect(base_url()."physioadmin/dashboard/home");
		} else {
			// set flashdata for error msg
			$this->session->set_flashdata('owner_login_error', '<div class="alert alert-error"><strong>Error!</strong> Invalid Username (or) Password  </div>');
			redirect(base_url()."physioadmin/dashboard/login", "refresh");
		}
	}
	public function get_total_clients() {
		if($this->session->userdata('user_id')=='2'){
			$this->db->where('city','New Delhi');
		}
		if($this->session->userdata('user_id')=='3'){
			$this->db->where('city','mumbai');
		}
		if($this->session->userdata('user_id')=='4'){
			$this->db->where('city','jaipur');
			$this->db->or_where('city','udaipur');
			$this->db->or_where('city','jodhpur');
		}
		if($this->session->userdata('user_id')=='5'){
			$this->db->where('state','Telangana');
			$this->db->or_where('state','ANDHRA PRADESH');
			$this->db->or_where('state','Andhra pradesh');
		}
		$this->db->select('*')->from('tbl_client');
		$query = $this->db->get();
		return $query->num_rows();
	}  
	public function get_premium_clients() {
		if($this->session->userdata('user_id')=='2'){
			$this->db->where('city','New Delhi');
		}
		if($this->session->userdata('user_id')=='3'){
			$this->db->where('city','mumbai');
		}
		if($this->session->userdata('user_id')=='4'){
			$this->db->where('city','jaipur');
			$this->db->or_where('city','udaipur');
			$this->db->or_where('city','jodhpur');
		}
		if($this->session->userdata('user_id')=='5'){
			$this->db->where('state','Telangana');
			//$this->db->or_where('state','ANDHRA PRADESH');
			//$this->db->or_where('state','Andhra pradesh');
		}
		$this->db->where('t2.duration !=',0);
		$this->db->where('t1.plan !=',0);
		$this->db->where('t1.plan !=',5);
		$this->db->select('*')->from('tbl_client t1');
		$this->db->join("tbl_validity t2", "t1.client_id=t2.client_id");
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function get_free_clients() {
		if($this->session->userdata('user_id')=='2'){
			$this->db->where('city','New Delhi');
		}
		if($this->session->userdata('user_id')=='3'){
			$this->db->where('city','mumbai');
		}
		if($this->session->userdata('user_id')=='4'){
			$this->db->where('city','jaipur');
			$this->db->or_where('city','udaipur');
			$this->db->or_where('city','jodhpur');
		}
		if($this->session->userdata('user_id')=='5'){
			$this->db->where('state','Telangana');
			$this->db->or_where('state','ANDHRA PRADESH');
			$this->db->or_where('state','Andhra pradesh');
		}
		$this->db->where('parent_client_id','0');
		$this->db->where('plan','0');
		$this->db->select('*')->from('tbl_client');
		$query = $this->db->get();
		return $query->num_rows();
	}
	
	
	public function add_quotation(){
		$add = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'mobile' => $this->input->post('mobile'),
			'address' => $this->input->post('address'),
			'plan_type' => $this->input->post('plan_type'),
			'location' => $this->input->post('location'),
			'features' => $this->input->post('features'),
			'det' => $this->input->post('det'),
			'staff' => $this->input->post('staff'),
			//'discount' => $this->input->post('discount'), 
			'app' => $this->input->post('app'),
			'offline' => $this->input->post('offline'),
			'created_id' => $this->session->userdata('user_id'),
			'created_by' => $this->session->userdata('user_name'),
			'created_date' => date('Y-m-d H:i:s'),
			
		);
		
		$this->db->insert('tbl_quotation_add', $add);
		
	}
	
	public function quotation_view()
	{
		$this->db->select('*')->from('tbl_quotation_add');
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array()  : false;
	
	}
	public function getquoteview($id)
	{
		$this->db->select('*')->from('tbl_quotation_add');
		$this->db->where('id',$id);
	    $query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function delete($id){
		$where = array('id' => $id);
		$this->db->where($where);
		$this->db->delete('tbl_quotation_add');
		
	}
} 