<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		// load required models
		$this->load->model(array('staff_model','mail_model','registration_model','location_model','settings_model'));
	}
	
	public function check_login() {
		$this->db->select('*')->from('tbl_user')->where('username = "'. $this->input->post('username') .'" and password = "'. $this->input->post('password') .'"');
		$result=$this->db->get();
		if($result->num_rows()>0 && $result->row()->username == $this->input->post('username') && $result->row()->password == $this->input->post('password'))
		{
			$clientInfo = $this->registration_model->editProfile($result->row()->client_id);
			print_r($clientInfo);
			if($clientInfo['status'] == 1 && ($clientInfo['account_type'] == 1 || $clientInfo['account_type'] == 2))
			{
				$staffInfo = $this->staff_model->editStaff($result->row()->staff_id,$result->row()->client_id);
				if($result->row()->status == 1)
				{
					
					$profileInfoSetting = $this->registration_model->editProfile($result->row()->client_id);
					$locationCount = $this->location_model->getLocationCount($result->row()->client_id);
					$parentClientId = $this->location_model->getParentClientId($result->row()->client_id);
					echo $locationCount;
					echo $parentClientId;
					if($parentClientId == 0 && $locationCount == 0 || $locationCount != false){
						$sp_client_id = $result->row()->client_id;
					}else{
						$sp_client_id = $parentClientId;
					}
					$settingsData = $this->settings_model->editSettings($sp_client_id);
					$clientIds = '';
					$all_locations = '';
					$clientIds1 = array();
					if($settingsData['all_locations_details'] == 1){
						$all_locations = true;
						$clientIds1 = $this->location_model->getLocationsIds($sp_client_id);
						$clientIds = implode(",",$clientIds1);
					}
						$this->db->select('*')->from('tbl_validity')->where('client_id',$sp_client_id);
						$results=$this->db->get();
						if($results->num_rows()>0){
						 $duration=$results->row()->duration;
						 $users=$results->row()->num_users;
					
					}
						$this->db->select('*')->from('tbl_client')->where('client_id = "'. $sp_client_id .'"');
		            $resulte=$this->db->get();
					if($resulte->num_rows()>0){
					$plan=$resulte->row()->plan;
					$newsletter=$resulte->row()->newsletter;
					
					}
					
					// set session
					$user_data=array(
						'client_login' => true,
						'user_login' => true,
						'last_login_date' => $result->row()->last_login_date,
						'last_login_ip' => $result->row()->last_login_ip,
						'username' => $result->row()->username,
						'client_id' => $result->row()->client_id,
						'plan' => $plan,
						'newsletter' => $newsletter,
						'duration'=>$duration,
						'users' => $users,
						'create'=>$result->row()->create,
						'view'=>$result->row()->privileges,
						'edit' => $result->row()->edit,
						'delete' => $result->row()->delete,
						'clinic_name' => $clientInfo['clinic_name'],
						'first_name' => $staffInfo['first_name'],
						'last_name' => $staffInfo['last_name'],
						'user_id' => $result->row()->user_id,
						'staff_id' => $result->row()->staff_id,
						'is_location' => $clientInfo['is_location'],
						'all_locations' => $all_locations
					);
					$user_data['clientIds'] = $clientIds1;
					$this->session->set_userdata($user_data);
					// update new values
					$update=array('last_login_date' => date('Y-m-d H:i:s'), 'last_login_ip' => $_SERVER['REMOTE_ADDR']);
					$this->db->where('username = "'. $this->input->post('username') .'" and password = "'. $this->input->post('password') .'"');
					$this->db->update('tbl_user',$update);
					redirect(base_url()."client/dashboard/home");  
				} else {
					$this->session->set_flashdata('user_login_error', '<div class="NewError1"><strong>Error!</strong> Access denied! Unauthorized User.  </div>');
					redirect(base_url()."user/dashboard/login", "refresh");
				}
			}else{
				// set flashdata for error msg
				$this->session->set_flashdata('user_login_error', '<div class="NewError1"><strong>Error!</strong> Access denied! Unauthorized User.  </div>');
				redirect(base_url()."user/dashboard/login", "refresh");
			}
		}else{
			// set flashdata for error msg
			$this->session->set_flashdata('user_login_error', '<div class="NewError1"><strong>Error!</strong> Invalid Username (or) Password  </div>');
			redirect(base_url()."user/dashboard/login", "refresh");
		}
	}
	public function status_update($user_id){
		$this->db->where('user_id',$user_id);
		$this->db->select('status')->from('tbl_user');
		$res = $this->db->get();
		$sta = $res->row()->status;
		if($sta == 0){
			$usercount = $this->getUserCount();
			$no_of_users = $this->common_model->noOfUsersPlan1();
			if($no_of_users > $usercount){
				$this->updateUser($user_id);
				$st = '1';
			} else {
				$st = '0';
			}
		} else {
			$this->updateUser($user_id);
			$st = '1';
		}
		return $st;
	}
	//forget_password
	public function recover_password()
	{
		$this->db->select('*')->from('tbl_user')->where('username = "'. $this->input->post('username') .'" ');
		$result=$this->db->get();
		if($result->num_rows()>0 && $result->row()->status == 1)
		{
			// patient details for mail template
			$login_url = base_url().'user/dashboard/login';
			$user = array(
				//'ClientName' => ucfirst($staff['first_name']),
				'Password' => $result->row()->password,
				'LoginUrl' => $login_url
			);
			// create email template
			$clientMessage = $this->mail_model->forgetPasswordTemplateStaff($user);
			// mail config
			$clientMailConfig = array('to' => $result->row()->username, 'subject' => 'Congratulations! Password Recovery Successful', 'message' => $clientMessage);
			// send mail
			$this->mail_model->sendEmail($clientMailConfig);
		}else if($result->num_rows()>0 && $result->row()->status == 0) {
			$this->session->set_flashdata('password_recover_failure', '<div class="NewError1"><strong>Error!</strong> Access denied! Unauthorized User.  </div>');
			redirect(base_url()."user/dashboard/forget_password", "refresh");
		} else {
			// set flashdata for error msg
			$this->session->set_flashdata('password_recover_failure', '<div class="NewError1"><strong>Error!</strong> Email address does not exists.  </div>');
			redirect(base_url()."user/dashboard/forget_password", "refresh");
		}
	}
	
public function user_add($privileges,$edit,$delete,$username,$create) {
		if($privileges != ''){
			$pstring=implode(",",$privileges);
		}else{
			$pstring = '';
		}
		if($edit != ''){
			$edit=implode(",",$edit);
		}else{
			$edit = '';
		}
		if($delete != ''){
			$delete=implode(",",$delete);
		}else{
			$delete = '';
		}
		if($create != ''){
			$create=implode(",",$create);
		}else{
			$create = '';
		}
		
		$userdata = array(
			'client_id' => $this->session->userdata('client_id'),
			'username' => $username,
			'password' => $this->input->post('password'),
			'staff_id' => $this->input->post('staff_id'),
			'privileges' => $pstring,
			'edit' => $edit,
			'delete' => $delete,
			'create' => $create,
			'status' => 1,
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
		
		$this->db->insert('tbl_user', $userdata);
		return $this->db->insert_id();
	}
	
	public function user_edit($user_id,$privileges,$edit,$delete,$create) {
		
		$userInfo = $this->editUserInfo($user_id);
		$staffData = $this->staff_model->editStaff($userInfo['staff_id']);
		if($privileges != ''){
			$pstring=implode(",",$privileges);
		}else{
			$pstring = '';
		}
		if($edit != ''){
			$edit=implode(",",$edit);
		}else{
			$edit = '';
		}
		if($delete != ''){
			$delete=implode(",",$delete);
		}else{
			$delete = '';
		}
			if($create != ''){
			$create=implode(",",$create);
		}else{
			$create = '';
		}
		if(in_array("10", $create)){
			array_push($pstring,'10');
		}
		else { 
		}
		$userdata = array(
			'client_id' => $this->session->userdata('client_id'),
			'username' => $staffData['email'],
			'password' => $this->input->post('password'),
			'privileges' => $pstring,
			'edit' => $edit,
			'delete' => $delete,
			'create' => $create,
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
		
		$where = array('user_id' => $user_id);
		$this->db->where($where);
		$this->db->update('tbl_user',$userdata);
		return $user_id;
	}
	public function getClientname($status){
		if($status == 'home'){
			/* if($this->session->userdata('user_id')=='2'){
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
			} */
			$this->db->select('clinic_name,city,client_id,email,first_name,mobile')->from('tbl_client');
			$query = $this->db->get();
			return ($query->num_rows() > 0) ? $query->result_array() : false;
		}
		else if($status == 'ultimate'){
			/* if($this->session->userdata('user_id')=='2'){
				$this->db->where('t2.city','New Delhi');
			}
			if($this->session->userdata('user_id')=='3'){
				$this->db->where('t2.city','mumbai');
			}
			if($this->session->userdata('user_id')=='4'){
				$this->db->where('t2.city','jaipur');
				$this->db->or_where('t2.city','udaipur');
				$this->db->or_where('t2.city','jodhpur');
			}
			if($this->session->userdata('user_id')=='5'){
				$this->db->where('t2.state','Telangana');
			} */
			$this->db->select('t2.clinic_name,t2.city,t2.client_id,t2.first_name,t2.email,t2.mobile');
			$this->db->from("tbl_client t2");
			$this->db->join("tbl_validity t1", "t1.client_id=t2.client_id");
			$this->db->where("t2.plan",4);
			$this->db->where("t1.duration !=",0);
			$query = $this->db->get();
			return ($query->num_rows() > 0) ? $query->result_array() : false;
		}
		else if($status == 'enterprise'){
			/* if($this->session->userdata('user_id')=='2'){
				$this->db->where('t2.city','New Delhi');
			}
			if($this->session->userdata('user_id')=='3'){
				$this->db->where('t2.city','mumbai');
			}
			if($this->session->userdata('user_id')=='4'){
				$this->db->where('t2.city','jaipur');
				$this->db->or_where('t2.city','udaipur');
				$this->db->or_where('t2.city','jodhpur');
			}
			if($this->session->userdata('user_id')=='5'){
				$this->db->where('t2.state','Telangana');
			} */
			$this->db->select('t2.clinic_name,t2.city,t2.client_id,t2.first_name,t2.email,t2.mobile');
			$this->db->from("tbl_client t2");
			$this->db->join("tbl_validity t1", "t1.client_id=t2.client_id");
			$this->db->where("t2.plan",3);
			$this->db->where("t1.duration !=",0);
			$query = $this->db->get();
			return ($query->num_rows() > 0) ? $query->result_array() : false;
		}
		else if($status == 'institute'){
			/* if($this->session->userdata('user_id')=='2'){
				$this->db->where('t2.city','New Delhi');
			}
			if($this->session->userdata('user_id')=='3'){
				$this->db->where('t2.city','mumbai');
			}
			if($this->session->userdata('user_id')=='4'){
				$this->db->where('t2.city','jaipur');
				$this->db->or_where('t2.city','udaipur');
				$this->db->or_where('t2.city','jodhpur');
			}
			if($this->session->userdata('user_id')=='5'){
				$this->db->where('t2.state','Telangana');
			} */
			$this->db->select('t2.clinic_name,t2.city,t2.client_id,t2.first_name,t2.email,t2.mobile');
			$this->db->from("tbl_client t2");
			$this->db->join("tbl_validity t1", "t1.client_id=t2.client_id");
			$this->db->where("t2.plan",5);
			$this->db->where("t1.duration !=",0);
			$query = $this->db->get();
			return ($query->num_rows() > 0) ? $query->result_array() : false;
		}
		else if($status == 'free'){
			/* if($this->session->userdata('user_id')=='2'){
				$this->db->where('t2.city','New Delhi');
			}
			if($this->session->userdata('user_id')=='3'){
				$this->db->where('t2.city','mumbai');
			}
			if($this->session->userdata('user_id')=='4'){
				$this->db->where('t2.city','jaipur');
				$this->db->or_where('t2.city','udaipur');
				$this->db->or_where('t2.city','jodhpur');
			}
			if($this->session->userdata('user_id')=='5'){
				$this->db->where('t2.state','Telangana');
			} */
			$this->db->select('t2.clinic_name,t2.city,t2.client_id,t2.first_name,t2.email,t2.mobile');
			$this->db->from("tbl_client t2");
			$this->db->join("tbl_validity t1", "t1.client_id=t2.client_id");
			$this->db->where("t1.duration",0);
			$this->db->where("t2.status",1);
			$query = $this->db->get();
			return ($query->num_rows() > 0) ? $query->result_array() : false;
		}
		else if($status == 'monetary'){
			/* if($this->session->userdata('user_id')=='2'){
				$this->db->where('t2.city','New Delhi');
			}
			if($this->session->userdata('user_id')=='3'){
				$this->db->where('t2.city','mumbai');
			}
			if($this->session->userdata('user_id')=='4'){
				$this->db->where('t2.city','jaipur');
				$this->db->or_where('t2.city','udaipur');
				$this->db->or_where('t2.city','jodhpur');
			}
			if($this->session->userdata('user_id')=='5'){
				$this->db->where('t2.state','Telangana');
			} */
			$this->db->select('t2.clinic_name,t2.city,t2.client_id,t2.first_name,t2.email,t2.mobile');
			$this->db->from("tbl_client t2");
			$this->db->join("tbl_validity t1", "t1.client_id=t2.client_id");
			$this->db->where("t2.plan",2);
			$this->db->where("t1.duration !=",0);
			$query = $this->db->get();
			return ($query->num_rows() > 0) ? $query->result_array() : false;
		}
		else if($status == 'professional'){
			/* if($this->session->userdata('user_id')=='2'){
				$this->db->where('t2.city','New Delhi');
			}
			if($this->session->userdata('user_id')=='3'){
				$this->db->where('t2.city','mumbai');
			}
			if($this->session->userdata('user_id')=='4'){
				$this->db->where('t2.city','jaipur');
				$this->db->or_where('t2.city','udaipur');
				$this->db->or_where('t2.city','jodhpur');
			}
			if($this->session->userdata('user_id')=='5'){
				$this->db->where('t2.state','Telangana');
			} */
			$this->db->select('t2.clinic_name,t2.city,t2.client_id,t2.first_name,t2.email,t2.mobile');
			$this->db->from("tbl_client t2");
			$this->db->join("tbl_validity t1", "t1.client_id=t2.client_id");
			$this->db->where("t2.plan",1);
			$this->db->where("t1.duration !=",0);
			$query = $this->db->get();
			return ($query->num_rows() > 0) ? $query->result_array() : false;
		}
		else {
			
			$this->db->select('clinic_name,city,client_id,email,first_name,mobile')->from('tbl_client');
			$query = $this->db->get();
			return ($query->num_rows() > 0) ? $query->result_array() : false;
		}
	}
	public function updateUser($user_id) {
		
		$userInfo = $this->editUserInfo($user_id);
		if($userInfo['status'] == 0)
			$status = 1;
		else
			$status = 0;
		
		$userData = array(
			'status' => $status
		);
		
		$where = array('user_id' => $user_id);
		$this->db->where($where);
		$this->db->update('tbl_user',$userData);
		return $user_id;
	}
	
	//fetch records from user
	public function editUserInfo($user_id)
	{	
		$where=array('user_id' => $user_id);
		$this->db->select('*')->from('tbl_user')->where($where);
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->row_array() : false;
	}
	
	//get users count
	public function getUserCount()
	{
		$this->db->where('status','1');
		$this->db->select('count(ur.user_id) as usercount')->from('tbl_user ur')->where('ur.client_id', $this->session->userdata('client_id'));
		$this->db->join("tbl_staff_info si", "ur.staff_id=si.staff_id");
		$usercount = $this->db->get();
		if($usercount->num_rows()>0)
		{
            $usercount1=$usercount->row_array();
        }
		return ($usercount->num_rows()>0) ? $usercount1['usercount'] : false;
	}
	public function client_det() {
		/* if($this->session->userdata('user_id')=='2'){
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
		} */
		$this->db->select('username,first_name,last_name,client_id')->from('tbl_client');
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array() : false;
	}
	public function add_notification() {
		if($this->input->post('upload_img') == '') {
		  $pic = '';
		} else {    
			$pic = 'http://18.139.248.5/uploads/app/'.$this->input->post('upload_img');
		}
		$date = date('Y-m-d');
		$time = $date.' '.$this->input->post('time');
		$validity_info = array(
		    'client_id' => $this->session->userdata('client_id'),
			'title' => $this->input->post('title'),
			'message' => $this->input->post('message'),
			'image' => $pic,
			'short_desc' => $this->input->post('short_desc')
			
		);
		
		$this->db->insert('tbl_client_notification', $validity_info);
		return true;
	}
	public function delete_notification($sn_id) {
		$this->db->where('notification_id',$sn_id);
		$this->db->delete('tbl_client_notification');
		return true;
	}
	public function getquoteclient($id)
	{
		$this->db->select('*')->from('tbl_req_quotation');
		$this->db->where('id',$id);
	    $query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function email_check($mobile){
		$this->db->where('client_id', $this->session->userdata('client_id'));
	    $this->db->where('username',$mobile);
		$this->db->select('user_id')->from('tbl_user');
		$res = $this->db->get();
		if($res->result_array() != false){
			$user = $res->row()->user_id;
		}else {
			$user = '';
		}
		return $user;
	}
	public function deleteuser($user_id){
		
		$where = array('user_id' => $user_id);
		$this->db->where($where);
		$this->db->delete('tbl_user');
		
	}
} 