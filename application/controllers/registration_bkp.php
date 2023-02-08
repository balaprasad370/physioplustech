<?php 
/** File name   : dashboard.php
*	Author      : Muthukumar
*	Date        : 27th Mar 2013
*	Description : Controller for physioplus client dashboard.
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller {
	
	public function __construct() {
		parent::__construct();  
		//$this->app_access->client(); // check access permission for owner
		$this->load->model(array('registration_model','client','location_model','settings_model'));
	   }

        
	public function user_login() {  
		if( $this->app_access->is_client_logged_in() == true ) 
                {
                 // $this->calendarClientAccess();

                    redirect( base_url() . 'client/dashboard/home' );
                }
		$this->client->check_login();
	}

      

	
	public function index_new() {
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form'));
		$this->form_validation->set_rules('mobile', 'mobile no', 'trim|required|callback_mobile|xss_clean');
		$this->form_validation->set_rules('clinic_name', 'clinic name', 'trim|required');
		$this->form_validation->set_rules('email', 'email');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_rules('confirm_password');
		$this->form_validation->set_rules('mobile', 'mobile no');
		$this->form_validation->set_rules('city', 'city');
		$this->form_validation->set_rules('country', 'country');
		
		$this->form_validation->set_error_delimiters('<div class="error"><p>', '</p></div>');
	/* 	if($this->form_validation->run() == TRUE){  
			$this->registration_model->add_registration();
			/* $this->session->set_flashdata('message', 'verification link has been sent to your email address. if not received email in 5 minutes check your spam folder');
			redirect(base_url().'registration/', 'refresh');
		} */
			if($this->form_validation->run() == TRUE){  
				$result = $this->registration_model->add_registration();
				if($result != ''){
					redirect(base_url().'registration/registration_verify/'.$result, 'refresh');
				} else {
					
				}
			} else {
					$data['code'] = '';
					$this->load->view('frontend/registration_add1',$data);
			} 
		
		}
	public function invite() {
		$id = $this->uri->segment(3);
		$v = explode('REG',$id);
		$this->db->where('id',$v[1]);
		$this->db->select('ci.client_id,ci.first_name')->from('tbl_invitefriends iv');
		$this->db->join('tbl_client ci','ci.client_id=iv.client_id');
		$query = $this->db->get();
		$data['code'] = 'CRC'.$query->row()->client_id.''.ucfirst(substr($query->row()->first_name,0,1));
		$this->load->view('frontend/registration_add1',$data);
	}
	public function registration_success(){
		$this->load->view('frontend/registration_success');
	}
	public function getResultfromdb1($email){
			$this->db->select('email')->from('tbl_client')->where('email',$email);
			$query = $this->db->get()->num_rows();
           
            if($query == 0 ) echo 'userOk';
            else echo 'userNo';
        }
	
	
	
	
	public function alreadyExists_email()
	{
		$email=$this->input->post('email');
		$this->db->select('email')->from('tbl_client')->where('email = "'. $email.'" ');
		$result=$this->db->get();
		if($result->num_rows()>0)
		{
			$this->form_validation->set_message('alreadyExists_email', 'email already exists');
			return false;
		} else 	{
			return true;
		}
	} 
	
	public function mobile(){
		if($this->input->post('mobile')!=''){
			if(!preg_match('/^[0-9\+\-]+$/',$this->input->post('mobile'))){
				$this->form_validation->set_message('mobile', "Please enter valid mobile no.");
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}	
	}
	
	public function phone(){
		if($this->input->post('phone')!=''){
			if(!preg_match('/^[0-9\+\-]+$/',$this->input->post('phone'))){
				$this->form_validation->set_message('phone', "Please enter valid phone no.");
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}	
	}
	public function email_check()
	{
		$response=array();
		$result = $this->registration_model->email_check($_POST['e_id']);
		if($result == '')
		{			
			$response['status'] = 'success';
			$response['message'] = 'Notes Has Been Added successfully.';
		}
		else{
			$response['status'] = 'error';
			$response['message'] = 'Notes Has Been Added successfully.';
		}
		// print json response
		echo json_encode($response);
		
	}
	public function add_app() {
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form'));
		$this->form_validation->set_rules('name', 'name');
		$this->form_validation->set_rules('specialities', 'specialities', 'trim|required|xss_clean');
		$this->form_validation->set_rules('experience', 'experience', 'trim|required|xss_clean');
		$this->form_validation->set_rules('education', 'education', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('clinic_name', 'clinic_name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('clinic_website', 'clinic_website', 'trim|required|xss_clean');
		$this->form_validation->set_rules('address', 'address', 'trim|required|xss_clean');
		$this->form_validation->set_rules('clinic_from', 'clinic_from', 'trim|required|xss_clean');
		$this->form_validation->set_rules('clinic_to', 'clinic_to', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<div class="error"><p>', '</p></div>');
		if($this->form_validation->run() == TRUE){ 
			$this->registration_model->add_app();
			$this->mail_model->app_reg();  
			$this->session->set_flashdata('message', 'Your mobile app request is successful. We will contact you Soon.');
			redirect(base_url().'pages/app_reg', 'refresh');
		}
		  $this->session->set_flashdata('warning', 'Full Fill All requirements Correctly.');
		  redirect(base_url().'pages/app_reg', 'refresh');
	}
	public function logo_upload(){
		
		$result =array();
		$config['upload_path'] = './uploads/app_logo';
		$config['allowed_types'] = "*";
		$config['max_size'] = '10000000M';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('logo'))
		{
			$error = array('error' => $this->upload->display_errors());
			$result['status'] ='fail';
			$result['msg'] ='File Upload Error';
			$result['file_name'] = "";
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$result['status'] ='success';
			$result['msg'] ='File Upload Successfully';
			$result['file_name'] = $data['upload_data']['file_name'];
		}
		echo json_encode($result);	
	}
	public function email1_check()
	{
		$response=array();
		$result = $this->registration_model->email1_check($_POST['e_id']);
		if($result != '')
		{			
			$response['status'] = 'success';
			$response['message'] = 'Notes Has Been Added successfully.';
		}
		else{
			$response['status'] = 'error';
			$response['message'] = 'Notes Has Been Added successfully.';
		}
		// print json response
		echo json_encode($response);
		
	}
	public function registration_verify(){
		$this->db->select('verify_code,client_id')->from('tbl_client');
		$this->db->limit(1);
		$this->db->order_by('client_id','DESC');
		$res = $this->db->get();
		$data['v_code']=$res->row()->verify_code;
		$data['c_id']=$res->row()->client_id;
		$this->load->view('frontend/reg_verify',$data);
	}
	public function success() {
		$this->registration_model->send_rmail();
		redirect(base_url().'registration/registration_success', 'refresh');
	}
	public function success123() {
		$client = array(
			'ClinicName' => 'Test',
			'ClientName' => 'Tewst',
			'verificationCode' => 'asasasasa'
		);
		$clientMessage = $this->mail_model->registrationTemplate($client);
		$clientMailConfig = array('to' => 'contact@physioplusnetwork.com', 'subject' => 'Congratulations! Welcome to Physio Plus Tech', 'message' => $clientMessage);
		$this->mail_model->sendEmail($clientMailConfig);
	}
	
}