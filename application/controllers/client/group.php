<?php 
/** File name   : dashboard.php
*	Author      : Muthukumar
*	Date        : 27th Mar 2013
*	Description : Controller for physioplus client dashboard.
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group extends CI_Controller {
	
	public function __construct() {
		header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
		parent::__construct();
		// load required models
		//$this->load->model(array('client'));
		$this->app_access->client(); // check access permission for owner
		//if( $this->app_access->is_client_logged_in() == true ) redirect( base_url() . 'client/patient/add_patient_info' );
		// user access
		if($this->session->userdata('user_login')) $this->app_access->user_privileges('Invoice');
		$this->load->model(array('advance_model','common_model','newsletter_model'));
	}
	
	public function group_view()
	{
		$data['page_name'] = 'group';
		$data['group_list'] = $this->common_model->getGroupList();
		$data['contacts'] = $this->common_model->getcontacts();
		$data['patient_list'] = $this->common_model->getPatientList();
		$data['staff_list'] = $this->common_model->getStaffLists();		
		$this->load->view('client/group_view',$data);
	}
	public function group_view1()
	{
		$data['page_name'] = 'group';
		$data['group_list'] = $this->common_model->getGroupList();
		$data['contacts'] = $this->common_model->getcontacts();
		$data['patient_list'] = $this->common_model->getPatientList();
		$data['staff_list'] = $this->common_model->getStaffLists();		
		$this->load->view('client/group_view1',$data);
	}
	
	public function group_list()
	{
		$data['page_name'] = 'group';
		$data['group_list'] = $this->common_model->getGroupList();
		$data['patient_list'] = $this->common_model->getPatientList();
		$this->load->view('client/group_list',$data);
	}
	
	
	
	
/* 	public function group_list1()
	{
		$data['page_name'] = 'group';
		$data['group_list'] = $this->common_model->getGroupList();
		$data['patient_list'] = $this->common_model->getPatientList();
		$data['user']=$this->newsletter_model->newsletter_group_details();
		$this->load->view('client/group_list_one',$data);
	} 
	 */
	
	public function add_group1()
	{
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form'));
		$this->form_validation->set_rules('group_name', 'group name', 'trim|required|maxlength[20]|xss_clean');
		$response = array();
		if($this->form_validation->run() == TRUE ){
			if($query = $this->common_model->group_add())
			{
				$response['status'] = 'success';
				$response['message'] = 'Group created successfully.';
			}
		}else{
				$response['status'] = 'failure';
				$response['message'] = $this->form_validation->error_array();
			}
			
		echo json_encode($response);
	}
	public function add_group(){
		$group_id = $this->input->post('group_id');
	 
	 // echo concessGroupId;
	 
   	  if($group_id==''){
		  
				if($concessionData = $this->common_model->group_add())
				{
					//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Concession group has been added successfully.';
					$response['concessionData'] = $concessionData;
				}
			}else {
				
					$response['status'] = 'Failure';
					$response['message'] = 'Concession group has been updated successfully.';
					
				
			}
			
		echo json_encode($response);
	 }
	
	

	
	public function add_member1()
	{
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form'));
		$this->form_validation->set_rules('group_list', 'group name', 'trim|required|maxlength[20]|xss_clean');
		$response = array();
		if($this->form_validation->run() == TRUE ){
			if($query = $this->common_model->addGroupmember())
			{
				$response['status'] = 'success';
				$response['message'] = 'Group created successfully.';
			}
		}else{
				$response['status'] = 'failure';
				$response['message'] = $this->form_validation->error_array();
			}
			
		echo json_encode($response);
	}
	public function add_member(){
		$mem_id = $this->input->post('mem_id');
	 
	 // echo concessGroupId;
	 
   	  if($mem_id==''){
		  
				if($concessionData = $this->common_model->addGroupmember())
				{
					//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Concession group has been added successfully.';
					$response['concessionData'] = $concessionData;
				}
			}else {
				
					$response['status'] = 'Failure';
					$response['message'] = 'Concession group has been updated successfully.';
					
			
			}
			
		echo json_encode($response);
	 }
	
	

	public function addcontacts1()
	{
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form'));
		$this->form_validation->set_rules('firstname','trim|required|maxlength[20]|xss_clean');
		$response = array();
		if($this->form_validation->run() == TRUE ){
			if($query = $this->common_model->addcontacts())
			{
				$response['status'] = 'success';
				$response['message'] = 'Group created successfully.';
			}
		}else{
				$response['status'] = 'failure';
				$response['message'] = $this->form_validation->error_array();
			}
			
		echo json_encode($response);
	}
	public function addcontacts(){
		
		$contacts_id = $this->input->post('contacts_id');
	 
	 // echo concessGroupId;
	 
   	  if($contacts_id==''){
		  
				if($concessionData = $this->common_model->addcontacts())
				{
					//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Concession group has been added successfully.';
					$response['concessionData'] = $concessionData;
				}
			}else {
				
					$response['status'] = 'Failure';
					$response['message'] = 'Concession group has been updated successfully.';
					
			
			}
			
		echo json_encode($response);
	 }
	
	public function addcustom1()
	{
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form'));
		$this->form_validation->set_rules('group_list', 'single', 'trim|required|maxlength[20]|xss_clean');
		$response = array();
		if($this->form_validation->run() == TRUE ){
			if($query = $this->common_model->addcustom())
			{
				$response['status'] = 'success';
				$response['message'] = 'Group created successfully.';
			}
		}else{
				$response['status'] = 'failure';
				$response['message'] = $this->form_validation->error_array();
			}
			
		echo json_encode($response);
	}
	public function addcustom(){
		
		$mem_id = $this->input->post('mem_id');
	 
	 // echo concessGroupId;
	 
   	  if($mem_id==''){
		  
				if($concessionData = $this->common_model->addcustom())
				{
					//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Concession group has been added successfully.';
					$response['concessionData'] = $concessionData;
				}
			}else {
				
					$response['status'] = 'Failure';
					$response['message'] = 'Concession group has been updated successfully.';
					
			
			}
			
		echo json_encode($response);
	 }
	public function group_sent()
	{
		$data['page_name'] = 'SMS Sent';
		$data['group_list'] = $this->common_model->getGroupList();
		$data['temp_list'] = $this->common_model->getTempList();
		$data['birthdays'] = $this->common_model->getBirthday();
		$this->load->view('client/group_sent',$data);
	}
	
	public function msgsent1()
	{
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form'));
		$this->form_validation->set_rules('group_list', 'group', 'trim|required|maxlength[20]|xss_clean');
		$this->form_validation->set_rules('message', 'message', 'trim|required|xss_clean');
		$response = array();
		
		$smsCount = $this->common_model->smsCount();
		$smslimit = $this->common_model->smslimit();
		
		if( $this->form_validation->run() == TRUE ) {
			if($smsCount < $smslimit)
			{
				if($query = $this->common_model->sent_message()) {
					$response['status'] = 'success';
					$response['message'] = 'Message sent Sucessfully.';
				}
				
			}else{
					$response['status'] = 'failure';
					$response['flashData'] = 'SMS exceeds for your Promotional';
			}
		} else {
					$response['status'] = 'failure';
					$response['flashData'] = '';
					$response['message'] = $this->form_validation->error_array();
		}
		
		echo json_encode($response);
	}
	public function msgsent(){
		
		$sms_id = $this->input->post('sms_id');
	 
	    $smsCount = $this->common_model->smsCount();
		$smslimit = $this->common_model->smslimit();
   	  if($sms_id==''){
		  if($smsCount < $smslimit)
			{
				if($concessionData = $this->common_model->sent_message())
				{
					//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Concession group has been added successfully.';
					$response['concessionData'] = $concessionData;
				}
			}
	  }else {
				
					$response['status'] = 'Failure';
					$response['message'] = 'Concession group has been updated successfully.';
					
			
			}
			
		echo json_encode($response);
	 }
	
	public function template_add()
	{
		$this->load->view('client/iframe/template_add');
	}
	
	public function group_add()
	{
		$this->load->view('client/iframe/group');
	}
	
	public function new_template1()
	{
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form'));
		$this->form_validation->set_rules('ttitle', 'title', 'trim|required|maxlength[20]|xss_clean');
		$this->form_validation->set_rules('tdesc', 'description', 'trim|required|xss_clean');
		$response = array();
		if($this->form_validation->run() == TRUE ){
			if($query = $this->common_model->add_template())
			{
				$response['status'] = 'success';
				$response['message'] = 'Template has been saved successfully';
			}
		}else{
				$response['status'] = 'failure';
				$response['message'] = $this->form_validation->error_array();
		}	
		echo json_encode($response);
	}
	public function new_template(){
		
		$data['page_name'] = 'concession_group';
	    $response = array();
		
			
				if($query = $this->common_model->add_template())
				{
					$response['status'] = 'success';
					$response['message'] = 'Template has been saved successfully';
					}
			else {
					$response['status'] = 'Failure';
					$response['message'] = 'Template has not been saved successfully.';
					
				
			}
			
		echo json_encode($response);
	
	}
	public function template_delete(){
		$response=array();
		$result = $this->common_model->template_delete($_POST['p_id']);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		}
		echo json_encode($response);
	}
	public function create()
	{
		$this->db->select('client_id')->from('tbl_client')->where('status',1);
		$query = $this->db->get();
		$result = $query->result_array();
		$staff = 'Staff'; $patient = 'Patients';
		foreach($result as $row)
		{
			$info1 = array(
				'client_id' => $row['client_id'],
				'group_name' => $staff
			);
			$this->db->insert('tbl_group', $info1);
			
			$info2 = array(
				'client_id' => $row['client_id'],
				'group_name' => $patient
			);
			$this->db->insert('tbl_group', $info2);
		}
	}
	
	public function create_patient()
	{		
		$this->db->select('patient_id,mobile_no')->from('tbl_patient_info')->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		$result = $query->result_array();
		foreach($result as $row)
		{
			$info1 = array(
				'client_id' =>$this->session->userdata('client_id'),
				'member_id' => $row['patient_id'],
				'group_id' => 27,
				'mobile' => $row['mobile_no']
			);
			$this->db->insert('tbl_group_members', $info1);
			
		}
	}
	
	public function create_staff()
	{		
		$this->db->select('staff_id,mobile_no')->from('tbl_staff_info')->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		$result = $query->result_array();
		foreach($result as $row)
		{
			$info1 = array(
				'client_id' =>$this->session->userdata('client_id'),
				'member_id' => $row['staff_id'],
				'group_id' => 26,
				'mobile' => $row['mobile_no']
			);
			$this->db->insert('tbl_group_members', $info1);
			
		}
	}
	
	public function remove()
	{
		$group_id = $this->uri->segment(4);
		$member_id = $this->uri->segment(5);
		$this->common_model->remove_member($group_id,$member_id);
		redirect(base_url().'client/group/group_list', 'refresh');
	}
	
	public function deletegroup()
	{
		$group_id = $this->uri->segment(4);
		$this->common_model->delete_group($group_id);
		redirect(base_url().'client/group/group_list', 'refresh');
	}
	
	public function deletetemplate1()
	{
		$temp_id = $this->uri->segment(4);
		$this->common_model->delete_temp($temp_id);
		redirect(base_url().'client/group/single_sent', 'refresh');
	}
	public function deletetemplate($client_id,$tempid){
		$data['page_name'] = 'patient';
		$this->common_model->delete_temp($client_id,$tempid);
		$this->session->set_flashdata('message', 'Template Record has been deleted successfully.');
		redirect(base_url().'client/patient/view/'.$client_id, 'refresh');
	}
	
	public function count_member($gid)
	{
		$this->db->select('count(*) as member')->from('tbl_group_members')->where('group_id',$gid);
		$q = $this->db->get();
		$qrow = $q->row();
		$members = $qrow->member;
           echo $members;
            if($members != 0 ) 
				return $members;
            else 
				return 'Empty Group';
	}
	
	public function single_sent()
	{
		$data['page_name'] = 'Single SMS Sent';
		$data['birthdays'] = $this->common_model->getBirthday();
		$data['my_birthday'] = $this->common_model->today_birthday();
		$data['temp_list'] = $this->common_model->getTempList();
		$data['group_list'] = $this->common_model->getGroupList();
		$data['patient_list'] = $this->common_model->getPatientList();
		$data['staff_list'] = $this->common_model->StaffList();
		$data['referral_list'] = $this->common_model->getRefferalLists();
		$this->load->view('client/single_msg',$data);
	}
	
	public function single_pmsg1()
	{
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form'));
		$this->form_validation->set_rules('patient_id', 'patient', 'trim|required|xss_clean');
		$this->form_validation->set_rules('pat_message', 'message', 'trim|required|xss_clean');
		$response = array();
		
		$smsCount = $this->common_model->smsCount();
		$smslimit = $this->common_model->smslimit();
		
		if( $this->form_validation->run() == TRUE ) {
			if($smsCount < $smslimit)
			{
				if($query = $this->common_model->single_pmsg()) {
					$response['status'] = 'success';
					$response['message'] = 'Message sent Sucessfully.';
				}
				
			}else{
					$response['status'] = 'failure';
					$response['flashData'] = 'SMS exceeds for your Promotional';
			}
		} else {
					$response['status'] = 'failure';
					$response['flashData'] = '';
					$response['message'] = $this->form_validation->error_array();
		}
		echo json_encode($response);
	}
	public function single_pmsg(){
		
		$data['page_name'] = 'concession_group';
	    $response = array();
		 $smsCount = $this->common_model->smsCount();
		 $smslimit = $this->common_model->smslimit();
	      $SMS = $this->input->post('sms_id');
		
		  if($smsCount < $smslimit)
		  {
				if($query = $this->common_model->single_pmsg())
				{
					$response['status'] = 'success';
					$response['message'] = 'Message sent successfully';
					}
		  }else {
					$response['status'] = 'Failure';
					$response['message'] = 'SMS exceeds for your Promotional.';
					
				
			}
			
		echo json_encode($response);
	
	}
	public function single_smsg1()
	{
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form'));
		$this->form_validation->set_rules('staff_id', 'patient', 'trim|required|xss_clean');
		$this->form_validation->set_rules('stf_message', 'message', 'trim|required|xss_clean');
		$response = array();
		$smsCount = $this->common_model->smsCount();
		$smslimit = $this->common_model->smslimit();
		
		if( $this->form_validation->run() == TRUE ) {
			if($smsCount < $smslimit)
			{
				if($query = $this->common_model->single_smsg()) {
					$response['status'] = 'success';
					$response['message'] = 'Message sent Sucessfully.';
				}
				
			}else{
					$response['status'] = 'failure';
					$response['flashData'] = 'SMS exceeds for your Promotional';
			}
		} else {
					$response['status'] = 'failure';
					$response['flashData'] = '';
					$response['message'] = $this->form_validation->error_array();
		}
		echo json_encode($response);
	}
	public function single_smsg(){
		
		$data['page_name'] = 'concession_group';
	    $response = array();
		 $smsCount = $this->common_model->smsCount();
		$smslimit = $this->common_model->smslimit();
	     $SMS = $this->input->post('sms_id');
//echo SMS; 
		
		  if($smsCount < $smslimit){
			
				if($query = $this->common_model->single_smsg())
				{
					$response['status'] = 'success';
					$response['message'] = 'Message sent successfully';
					}
		  }else {
					$response['status'] = 'Failure';
					$response['message'] = 'SMS exceeds for your Promotional.';
					
				
			}
			
		echo json_encode($response);
	
	}
	 public function sms_report1()
	{
		$data['page_name'] = 'SMS Report';
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();

		//Pagination
		$config['per_page'] = 20;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';

		// do date filter
		$do_date = array_search("date",$segment_array);
		if ($do_date !== FALSE)
		{
			$data['dateFilter'] = true;
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+1))));
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+2))));
			$where_condition = "(delivery_date >= '".$from."' AND delivery_date <= '".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
		} 

		//Count
		$where_condition = ($where_condition != '') ? $where_condition : '';
		$where=array('client_id' => $this->session->userdata('client_id'));
		$this->db->select('count(*) as totalrows')->from('sms_delivery_report')->where($where);
		if($where_condition!='') $this->db->where($where_condition);
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;	
		
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->select('*');
		$this->db->from("sms_delivery_report ");
		$this->db->where('client_id',$this->session->userdata('client_id'));
		
		if($where_condition!='') $this->db->where($where_condition);
		//do orderby
		$this->db->order_by('delivery_date', 'desc');
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
		$data['delivery_list'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		 if($data['delivery_list'] != false) {
			$data['showTable'] = true;
		} else { 
			$data['showTable'] = false;
		}

		//Pagination
		$config['full_tag_open'] = '<div class="pagination alternate"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['first_link'] = '&lt;&lt; First';
		$config['next_link'] = 'Next &gt;';
		$config['prev_link'] = '&lt Previous';
		$config['last_link'] = 'Last &gt;&gt;';
		$config['base_url'] = site_url(join("/",$segment_array));
		$config['uri_segment'] = $current_page_segment;
		$this->pagination->initialize($config);
		$data["pagination"] = $this->pagination->create_links();	
		$data['current_page_segment'] = $current_page_segment;

		$this->load->view('client/delivery_report',$data);
	} 
	 
	 public function sms_report(){
		
		$data['page_name'] = 'SMS Report';
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		$config['per_page'] = 10;
		$current_page ='';
		$this->db->select('*')->from('sms_delivery_report')->where('client_id',$this->session->userdata('client_id'));
		$this->db->distinct();
		$query = $this->db->get();
		$config['total_rows'] = $query->num_rows();
		
		$search=str_replace('%20',' ',$this->uri->segment(4));
		$search1=str_replace('%20',' ',$this->uri->segment(5));
		$search2=str_replace('%20',' ',$this->uri->segment(6));
		if($search == 'date'){
			//$data['dateFilter'] = true;
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment(5))));
			//echo $from;
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment(6))));
			//echo $to;
			$where_condition = "(delivery_date >= '".$from."' AND delivery_date <='".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
			$this->db->where($where_condition);
			$this->db->where('client_id',$this->session->userdata('client_id'));
		    $this->db->select('*');
			$this->db->from("sms_delivery_report");
			$this->db->order_by("delivery_date", "desc");
			
			
		}
			else {
			$this->db->select('*');
			$this->db->from("sms_delivery_report");
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
		
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
		$this->db->order_by('delivery_date','desc');
		$query=$this->db->get();
		$config['full_tag_open'] = '<div class="pagination alternate"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['first_link'] = '&lt;&lt; First';
		$config['next_link'] = 'Next &gt;';
		$config['prev_link'] = '&lt Previous';
		$config['last_link'] = 'Last &gt;&gt;';
		
		$config['base_url'] = site_url(join("/",$segment_array));
		$config['uri_segment'] = $current_page_segment;
		$this->pagination->initialize($config);
		$data["pagination"] = $this->pagination->create_links();
		$str_links = $this->pagination->create_links();	
		$data["links"] = explode('<li>',$str_links);
		$data['current_page_segment'] = $current_page_segment;
		$data["pagination"] = $this->pagination->create_links();
		$data['result']=$query->result_array();
	    $this->load->view('client/delivery_report',$data); 
	} 
	
	
	public function export_sms_report1()
	{
		$this->load->library('export');
		$data['page_name'] = 'SMS Report';
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();

		//Pagination
		$config['per_page'] = 20;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';

		// do date filter
		$do_date = array_search("date",$segment_array);
		if ($do_date !== FALSE)
		{
			$data['dateFilter'] = true;
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+1))));
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+2))));
			$where_condition = "(delivery_date >= '".$from."' AND delivery_date <= '".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
		} 

		//Count
		$where_condition = ($where_condition != '') ? $where_condition : '';
		$where=array('client_id' => $this->session->userdata('client_id'));
		$this->db->select('count(*) as totalrows')->from('sms_delivery_report')->where($where);
		if($where_condition!='') $this->db->where($where_condition);
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;	
		
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->select('*');
		$this->db->from("sms_delivery_report ");
		$this->db->where('client_id',$this->session->userdata('client_id'));
		
		if($where_condition!='') $this->db->where($where_condition);
		//do orderby
		$this->db->order_by('delivery_date', 'desc');
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
		
		$this->export->to_excel($query, 'Delivery Report');
	}
	public function export_sms_report(){
		$this->load->library('export');
		$data['page_name'] = 'staff';
		
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		$config['per_page'] =10;
		$current_page ='';
		$this->db->select('*')->from('sms_delivery_report')->where('client_id',$this->session->userdata('client_id'));
		$this->db->distinct();
		$query = $this->db->get();
		$config['total_rows'] = $query->num_rows();
		
		$search=str_replace('%20',' ',$this->uri->segment(4));
		$search1=str_replace('%20',' ',$this->uri->segment(5));
		$search2=str_replace('%20',' ',$this->uri->segment(6));
		if($search == 'date'){
			//$data['dateFilter'] = true;
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment(5))));
			//echo $from;
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment(6))));
			//echo $to;
			$where_condition = "(delivery_date >= '".$from."' AND delivery_date <='".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
			$this->db->where($where_condition);
			$this->db->where('client_id',$this->session->userdata('client_id'));
		    $this->db->select('delivery_date,status,message,delivery_time');
			$this->db->from("sms_delivery_report");
			$this->db->order_by("delivery_date", "desc");
			
		}
			else {
		     $this->db->where('client_id',$this->session->userdata('client_id'));
		     $this->db->select('delivery_date,status,message,delivery_time');
			 $this->db->from("sms_delivery_report");
			 $this->db->order_by("delivery_date", "desc");
			}
		
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
		$query=$this->db->get();
		$this->export->to_excel($query, 'Delivery Report');
		} 
	
	
	public function bday_msg($mobile)
	{
		$data['page_name'] = 'staff';
		$data['mobile'] = $mobile;
		$this->load->view('client/bday_msg',$data);
	}
	public function bdaymsg_send($mobile){
		$sms_id = $this->input->post('sms_id');
	 
	
	 
   	  if($sms_id==''){
		  
				if($concessionData = $this->common_model->bday_gretting($mobile))
				{
					$response['status'] = 'success';
					$response['message'] = 'Concession group has been added successfully.';
					$response['concessionData'] = $concessionData;
				}
			}else {
				
					$response['status'] = 'Failure';
					$response['message'] = 'Concession group has been updated successfully.';
					
			
			}
			
		echo json_encode($response);
	 }

	public function bdaymsg_send1($mobile)
	{
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form'));
		$this->form_validation->set_rules('msg', 'Grettings', 'trim|required|xss_clean');
		$response = array();
		$smsCount = $this->common_model->smsCount();
		$smslimit = $this->common_model->smslimit();
		
		if( $this->form_validation->run() == TRUE ) {
			if($smsCount < $smslimit)
			{
				if($query = $this->common_model->bday_gretting($mobile)) {
					$response['status'] = 'success';
					$response['message'] = 'Message sent Sucessfully.';
				}
				
			}else{
					$response['status'] = 'failure';
					$response['flashData'] = 'SMS exceeds for your Promotional';
			}
		} else {
					$response['status'] = 'failure';
					$response['flashData'] = '';
					$response['message'] = $this->form_validation->error_array();
		}
		echo json_encode($response);
	}
	
	public function num_msg1()
	{
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form'));
		$this->form_validation->set_rules('mobileno', 'monile no', 'trim|required|max_length[15]|numeric|xss_clean');
		$this->form_validation->set_rules('num_message', 'message', 'trim|required|xss_clean');
		$response = array();
		
		$smsCount = $this->common_model->smsCount();
		$smslimit = $this->common_model->smslimit();
		
		if( $this->form_validation->run() == TRUE ) {
			if($smsCount < $smslimit)
			{
				if($query = $this->common_model->nummessage()) {
					$response['status'] = 'success';
					$response['message'] = 'Message sent Sucessfully.';
				}
				
			}else{
					$response['status'] = 'failure';
					$response['flashData'] = 'SMS exceeds for your Promotional';
			}
		} else {
					$response['status'] = 'failure';
					$response['flashData'] = '';
					$response['message'] = $this->form_validation->error_array();
		}
		echo json_encode($response);
	}
	public function num_msg(){
		
		$data['page_name'] = 'concession_group';
	    $response = array();
		/* $smsCount = $this->common_model->smsCount();
		$smslimit = $this->common_model->smslimit();
	     *//* $SMS = $this->input->post('sms_id');
		echo SMS; 
		
		  if($smsCount < $smslimit)*/
			
				if($query = $this->common_model->nummessage())
				{
					$response['status'] = 'success';
					$response['message'] = 'Message sent successfully';
					}
			else {
					$response['status'] = 'Failure';
					$response['message'] = 'SMS exceeds for your Promotional.';
					
				
			}
			
		echo json_encode($response);
	
	}
	public function pro_diagnosis()
	{
		$data['page_name'] = 'group';
		$data['group_list'] = $this->common_model->getGroupList();
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		// search fields
		$info_search = array(
			'PatientName' => 'first_name',
			'MobileNo' => 'mobile_no',
			'PatientId' => 'patient_code',
			'ReferedBy' => 'referal_name',
			'ProvisionalDiagnosis' => 'prov_diagnosis',
		);
		
		//do searchby
		$do_searchby = array_search("searchby",$segment_array);
		if($do_searchby != false) {
			$searchType = $this->uri->segment($do_searchby+1);
			$searchby = $this->uri->segment($do_searchby+2);
			$keyword = urldecode($this->uri->segment($do_searchby+3));
			$patients = $this->uri->segment($do_searchby+4);			
			if($searchType == 'diagnosis') {
				$keyword = str_replace('_', '/', $keyword);
				$data['searchBy'] = $searchby;
				$data['keyword'] = $keyword;
				$data['plist'] = $patients;
			}else{
				$data['searchBy'] = false;
				$data['keyword'] = false;
			}
		}
		
		$this->load->view('client/pro_diagnosis',$data);
	}

	public function add_diagnosis()
	{
		$diagnosis = $_POST['diagnosis'];
		$group = $_POST['group'];
		$len = substr_count($_POST['plist'], ',');
		$plist = explode(',',$_POST['plist']);
		$response = array();
		for($i=0;$i<$len;$i++){
			$this->db->select('patient_id,mobile_no');
			$this->db->from("tbl_patient_info");
			$this->db->where('client_id',$this->session->userdata('client_id'));
			$this->db->where('patient_id',$plist[$i]);
			$query = $this->db->get();
			$diagnosis_list = ($query->num_rows() > 0) ? $query->result_array() : false;
			if($diagnosis_list != false){
				foreach($diagnosis_list as $members){
					$listinfo = array(
						'client_id' => $this->session->userdata('client_id'),
						'member_id' => $members['patient_id'],
						'group_id' => $group,
						'mobile' => $members['mobile_no']
					);
					
					$this->db->insert('tbl_group_members', $listinfo);
				}
			}
		}
		
		$response['status'] = 'success';
		$response['message'] = 'Member add Sucessfully.';
		
		echo json_encode($response);
	}
}