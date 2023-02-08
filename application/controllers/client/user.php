<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
        public function __construct() {
		header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
		parent::__construct();
		$this->app_access->client();
		$this->load->model(array('common_model','user_model','registration_model'));
	}
	public function _remap($method, $params = array())
			{
			if($this->session->userdata('duration') == 0 ||  $this->session->userdata('plan') < 3 ){
				$controller = mb_strtolower(get_class($this));
				  
				if ($controller = mb_strtolower($this->uri->segment(1))) {
					$data['page_name'] = 'dashboard';
					$data['account_info'] = $this->registration_model->myaccount($this->session->userdata('client_id'));
					$data['sch_settings_inf']= $this->registration_model->editsettings($this->session->userdata('client_id')); 
					$data['profile']= $this->registration_model->editProfile($this->session->userdata('client_id'));
					$this->load->view('client/account', $data);
				} elseif (method_exists($this, $method))
				{	$data['page_name'] = 'dashboard';
						$data['account_info'] = $this->registration_model->myaccount($this->session->userdata('client_id'));
					$data['sch_settings_inf']= $this->registration_model->editsettings($this->session->userdata('client_id')); 
					$data['profile']= $this->registration_model->editProfile($this->session->userdata('client_id'));
					$this->load->view('client/account', $data); 
					return call_user_func_array(array($this, $method), $params);
				} else {
					$data['page_name'] = 'dashboard';
						$data['account_info'] = $this->registration_model->myaccount($this->session->userdata('client_id'));
					$data['sch_settings_inf']= $this->registration_model->editsettings($this->session->userdata('client_id')); 
					$data['profile']= $this->registration_model->editProfile($this->session->userdata('client_id'));
					$this->load->view('client/account', $data);
				}
			}
			else{
			  return call_user_func_array(array($this, $method), $params);
			}
		}
	public function add()
	{
		$data['page_name'] = 'user';
		$c_id = $this->session->userdata('client_id');
		$this->db->where('ur.status','1');
		$this->db->select('ur.user_id')->from('tbl_user ur')->where('ur.client_id',$c_id);
		$this->db->join("tbl_staff_info si", "ur.staff_id=si.staff_id");
		$res1 = $this->db->count_all_results();
		$this->db->select('num_users')->from('tbl_validity')->where('client_id',$c_id);
		$res = $this->db->get();
		$num_users=$res->row()->num_users;
		if($num_users > $res1){
		$data['privileges']=$this->common_model->getprivileges();
		$data['staff']=$this->common_model->getStaffList();
		$this->load->view('client/user_add',$data);
		}
		else {
			$data['page_name'] = 'dashboard';
			$data['account_info'] = $this->registration_model->myaccount($this->session->userdata('client_id'));
			$data['sch_settings_inf']= $this->registration_model->editsettings($this->session->userdata('client_id')); 
			$data['profile']= $this->registration_model->editProfile($this->session->userdata('client_id'));
			$this->load->view('client/account', $data);
		}  
	}
		 
  public function getuser() {
		$concessionData = $this->staff_model->getuser();
		echo json_encode($concessionData);
  }	   
  public function view() {
	    $data['page_name'] = 'user';
		$this->load->view('client/user_view',$data);
  }
	
 public function add_user() {
		
		$data['page_name'] = 'user';
		$user_id = $this->input->post('user_id');
		$staff_id = $this->input->post('staff_id');
		$insert = $this->input->post('insert');
		$staff = $this->staff_model->editStaff($staff_id);
		$username = $staff['email'];
		
		$usercount = $this->user_model->getUserCount();
		$no_of_users = $this->common_model->noOfUsersPlan1();
		$p_id=$this->session->userdata('plan_id');
			$privileges=$this->input->post('privileges');
			$create=$this->input->post('create');
			$edit=$this->input->post('edit');
			$delete=$this->input->post('delete');
			if($user_id == '' || $p_id == '5'){
				if($usercount < $no_of_users || $p_id == '5'){
					if($userData = $this->user_model->user_add($privileges,$edit,$delete,$username,$create)) {
						//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
						$response['status'] = 'success';
						$response['message'] = 'User info has been added successfully.';
					}
				} else {
					$response['status'] = 'failure';
					$response['flashData'] = 'Users exceeds for your plan';
				}
		} else {
				if($userData = $this->user_model->user_edit($user_id,$privileges,$edit,$delete,$create)) {
					//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'User info has been updated successfully.';
				}
			}
		
		// print json response
		echo json_encode($response);
	
  
 }

	
	 public function edit($user_id) {  
		
		$data['page_name'] = 'user';
		// load default view
		$data['privileges']=$this->common_model->getprivileges();
		$data['staff']=$this->common_model->getStaffList();
		$data['user']=$this->user_model->editUserInfo($user_id);
		$data['user_id']=$user_id;
		$this->load->view('client/user_edit',$data);
	}
	public function update($user_id){
		$data['page_name'] = 'user';
		$this->db->where('user_id',$user_id);
		$this->db->select('status')->from('tbl_user');
		$res = $this->db->get();
		$sta = $res->row()->status;
		if($sta == '0'){
			$usercount = $this->user_model->getUserCount();
			$no_of_users = $this->common_model->noOfUsersPlan1();
			if($no_of_users > $usercount){
				$this->user_model->updateUser($user_id);
				$this->session->set_flashdata('message', 'User has been updated successfully.');
				redirect(base_url().'client/user/view', 'refresh');
			} else {
				$data['page_name'] = 'dashboard';
				$data['account_info'] = $this->registration_model->myaccount($this->session->userdata('client_id'));
				$data['sch_settings_inf']= $this->registration_model->editsettings($this->session->userdata('client_id')); 
				$data['profile']= $this->registration_model->editProfile($this->session->userdata('client_id'));
				$this->load->view('client/account', $data);
			}
		} else { 
			$this->user_model->updateUser($user_id);
		    $this->session->set_flashdata('message', 'User has been updated successfully.');
		    redirect(base_url().'client/user/view', 'refresh');
		}
	}
	public function status_update(){
		$response=array();
		$result = $this->user_model->status_update($_POST['p_id']);
		if($result == '1'){
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Patient deleted successfully.';
		}
		echo json_encode($response); 
	}
	public function update1(){
		$data['page_name'] = 'patient';
		$staff_id = $this->uri->segment(4);
		$this->db->where('user_id',$staff_id);
		$this->db->select('status')->from('tbl_user');
		$res = $this->db->get();
		$sta = $res->row()->status;
		if($sta == '0'){
			$usercount = $this->user_model->getUserCount();
			$no_of_users = $this->common_model->noOfUsersPlan1();
			if($no_of_users > $usercount){
				$this->user_model->updateUser($_POST['p_id']);
				$this->session->set_flashdata('message', 'User has been updated successfully.');
				redirect(base_url().'client/user/view', 'refresh');
			} else {
				$data['page_name'] = 'dashboard';
				$data['account_info'] = $this->registration_model->myaccount($this->session->userdata('client_id'));
				$data['sch_settings_inf']= $this->registration_model->editsettings($this->session->userdata('client_id')); 
				$data['profile']= $this->registration_model->editProfile($this->session->userdata('client_id'));
				$this->load->view('client/account', $data);
			}
		} else { 
			$this->user_model->updateUser($_POST['p_id']);
		    $this->session->set_flashdata('message', 'User has been updated successfully.');
		    redirect(base_url().'client/user/view', 'refresh');
		}
		}
	public function export_user() {
		$this->load->library('export');
	// load default view
		$data['page_name'] = 'user';
		/*$data['back'] = base64_encode(end(explode("/index.php/",$_SERVER['PHP_SELF'])));*/
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 10;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
		
		
		//Count
		$where_condition = ($where_condition != '') ? $where_condition : '';
		$this->db->select('count(*) as totalrows')->from('tbl_user ur')->where('ur.client_id = "'.$this->session->userdata('client_id').'"');
		if($where_condition!='') $this->db->where($where_condition);
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->select('ur.username,si.first_name,ur.status');
		$this->db->from("tbl_user ur");
		$this->db->join("tbl_staff_info si", "ur.staff_id=si.staff_id");
		$this->db->where('ur.client_id',$this->session->userdata('client_id'));
		//do where
		if($where_condition!='') $this->db->where($where_condition);
		
		//do page
		$do_page = array_search("page",$segment_array);
		if ($do_page !== FALSE)
		{
			$current_page_segment = $do_page+1;
			$current_page = (int) $this->uri->segment($current_page_segment,0);
			$this->db->limit($config['per_page'], $current_page);
			if($current_page) array_pop($segment_array);
		} 
		else 
		{
			$current_page_segment = 0;
			$this->db->limit($config['per_page']);
			array_push($segment_array, 'page');
		}
		// data subset
		$query = $this->db->get();
		$this->export->to_excel($query, 'user_report');
		}
	public function email_check() {
		$response=array();
		$mobile=$this->uri->segment(4);
		$result = $this->user_model->email_check($mobile);
		if($result == '')
		{			
			$response['status'] = 'success';
			$response['message'] = 'Notes Has Been Added successfully.';
		}
		else{
			$response['status'] = 'error';
			$response['message'] = $result;
		}
		// print json response
		echo json_encode($response);
	}
	public function delete(){
		$data['page_name'] = 'user';
		$this->user_model->deleteuser($_POST['p_id']);
		redirect(base_url().'client/user/view', 'refresh');
	}
}
