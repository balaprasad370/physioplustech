<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Letter extends CI_Controller {
	public function __construct() {
		header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
		parent::__construct();
		$this->app_access->client(); // check access permission for owner
		$this->load->model(array('common_model'));
		
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
	public function letter_format(){
		$data['page_name'] = 'letter';
		$this->load->view('client/letter_add',$data);
	}
    public function letter_submit() {
		$data['page_name'] = 'user';
	 $this->load->model('common_model');
	 $success=$this->common_model->add_letter();
     //echo $this->input->post('letter_desc'); 
	    if($success == 'True') {
			$response['status'] = 'success';
			$response['message'] = 'Letter  Has Been Added successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Letter Has Been Added failure.';
		}
		echo json_encode($response);   
	  }
	 
   
	 public function letter_view(){
		$data['page_name'] = 'letter';
		$this->load->view('client/letter_view',$data);
	 }
	 
	 public function getletter() {
		$concessionData = $this->common_model->getletter();
		echo json_encode($concessionData);
	}
	 
	public function letter_edit()
	{
	
	$data['page_name'] = 'letter'; 
	$data['edit']=$this->common_model->letter_edit();
	$this->load->view('client/letter_edit',$data);
	
  } 
    public function letter_update1() {
		$data['page_name'] = 'letter';
	 $this->load->model('common_model');
	 $letter_id = $this->input->post('letter_id');
	 $success=$this->common_model->letter_upadte($letter_id); 
	    if($success == 'True') {
			$response['status'] = 'success';
			$response['message'] = 'Letter  Has Been Updated successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Letter Has Been Updated failure.';
		}
		echo json_encode($response);   
	  }
	  
	   
	 public function letter_email() {
		$data['page_name'] = 'letter';
		$data['result']=$this->common_model->view_test();
		$this->load->view('client/letter_email_send',$data);	
	}
	public function certificateSendEmail() {
	$data['page_name'] = 'user';
	$response = array();
	
	$letter_id=$this->input->post('user');
	if($invoiceEmail = $this->mail_model->certificate($letter_id))
		 {
			$response['status'] = 'success';
			$response['message'] = 'Mail has been sent successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Mail has been Sent failure.';
		}
		// print json response
		echo json_encode($response); 
		
	}
	public function template_add()
	{
	$data['page_name']='letter';
	$this->load->view('client/templateadd',$data);
	
	}
	  public function add_group()
	{
	 $data['page_name'] = 'letter';
	 $this->load->model('common_model');
	 $success=$this->common_model->add_letter(); 
	    if($success == 'True') {
			$response['status'] = 'success';
			$response['message'] = 'Letter  Has Been Added successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Letter Has Been Added failure.';
		}
		echo json_encode($response);   
	}  
  public function letter_print()
	{
	$data['page_name'] = 'letter'; 
	$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
	$data['result']=$this->common_model->letter_edit();
	$data['client']=$this->common_model->client_details();
	$this->load->view('client/letter_support',$data);
	
	} 
	  public function export_homepatient(){
		$this->load->library('export');
		$data['page_name'] = 'patient';
		$segment_array = $this->uri->segment_array();
		
		$search=str_replace('%20',' ',$this->uri->segment(4));
		$search1=str_replace('%20',' ',$this->uri->segment(5));
		$search2=str_replace('%20',' ',$this->uri->segment(6));
		if($search == 'date'){
			//$data['dateFilter'] = true;
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment(5))));
			//echo $from;
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment(6))));
			//echo $to;
			$where_condition = "(appoint_date >= '".$from."' AND appoint_date <='".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
			$this->db->where($where_condition);
			$this->db->where('client_id',$this->session->userdata('client_id'));
		    $this->db->select('patient_code,first_name,last_name,appoint_date,mobile_no,email,address_line1');
			$this->db->from("tbl_patient_info");
			$this->db->order_by("patient_id", "desc");
			$this->db->where('home_visit',2);
		}
			else {
		     $this->db->where('client_id',$this->session->userdata('client_id'));
		     $this->db->select('patient_code,first_name,last_name,appoint_date,mobile_no,email,address_line1');
			 $this->db->from("tbl_patient_info");
			 $this->db->order_by("patient_id", "desc");
			 $this->db->where('home_visit',2);
			}
		
		
		$query=$this->db->get();
		$this->export->to_excel($query, 'homepatient_list');
		} 
	public function delete(){
		$data['page_name'] = 'letter';
		$result = $this->common_model->letter_delete($_POST['p_id']);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Invoice deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Invoice deleted successfully.';
		}
		echo json_encode($response);
	}
	}