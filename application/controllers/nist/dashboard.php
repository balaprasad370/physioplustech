<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()   {
	    header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
		parent::__construct();
		$this->load->model(array('nist_model'));
		 

	}
	public function user_login() {  
		$result = $this->nist_model->check_login();
		if($result != false)
		{
			$response['status'] = 'Success';
			$response['message'] = 'Login successfully.';
		}
		else {
		    $response['status'] = 'Failure';
			$response['message'] = 'Login Not successfully.';
		}
		echo json_encode($response);
		
		
	}
	public function index(){
		$data['page_name'] = 'index';
       $this->load->view('nist/login',$data);
	}
	
	public function home(){
		$this->app_access->nist();
		$data['page_name'] ='home';
		$this->load->view('nist/index',$data);
	}
	
	public function patient_comment(){
		$success=$this->nist_model->patient_comment();
        if($success == 'True') {
			$response['status'] = 'success';
			$response['message'] = 'Added successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Added failure.';
		}
		echo json_encode($response);  
	}
	
	public function mode_comment(){
		$success=$this->nist_model->mode_comment();
        if($success == 'True') {
			$response['status'] = 'success';
			$response['message'] = 'Added successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Added failure.';
		}
		echo json_encode($response);  
	}
	
	public function accuracy_comment(){
		$success=$this->nist_model->accuracy_comment();
        if($success == 'True') {
			$response['status'] = 'success';
			$response['message'] = 'Added successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Added failure.';
		}
		echo json_encode($response);  
	}
	
	public function availability_comment(){
		$success=$this->nist_model->availability_comment();
        if($success == 'True') {
			$response['status'] = 'success';
			$response['message'] = 'Added successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Added failure.';
		}
		echo json_encode($response);  
	}
	
	public function inter_comment(){
		$success=$this->nist_model->inter_comment();
        if($success == 'True') {
			$response['status'] = 'success';
			$response['message'] = 'Added successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Added failure.';
		}
		echo json_encode($response);  
	}
	public function recall_comment(){
		$success=$this->nist_model->recall_comment();
        if($success == 'True') {
			$response['status'] = 'success';
			$response['message'] = 'Added successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Added failure.';
		}
		echo json_encode($response);  
	}
	
	public function feedback_comment(){
		$success=$this->nist_model->feedback_comment();
        if($success == 'True') {
			$response['status'] = 'success';
			$response['message'] = 'Added successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Added failure.';
		}
		echo json_encode($response);  
	}
	public function integrity_comment(){
		$success=$this->nist_model->integrity_comment();
        if($success == 'True') {
			$response['status'] = 'success';
			$response['message'] = 'Added successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Added failure.';
		}
		echo json_encode($response);  
	}
	
	public function visible_comment(){
		$success=$this->nist_model->visible_comment();
        if($success == 'True') {
			$response['status'] = 'success';
			$response['message'] = 'Added successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Added failure.';
		}
		echo json_encode($response);  
	}
	public function form10(){
		$success=$this->nist_model->form10();
        if($success == 'True') {
			$response['status'] = 'success';
			$response['message'] = 'Added successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Added failure.';
		}
		echo json_encode($response);  
	}
	public function form11(){
		$success=$this->nist_model->form11();
        if($success == 'True') {
			$response['status'] = 'success';
			$response['message'] = 'Added successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Added failure.';
		}
		echo json_encode($response);  
	}
	public function form12(){
		$success=$this->nist_model->form12();
        if($success == 'True') {
			$response['status'] = 'success';
			$response['message'] = 'Added successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Added failure.';
		}
		echo json_encode($response);  
	}
	public function form13(){
		$success=$this->nist_model->form13();
        if($success == 'True') {
			$response['status'] = 'success';
			$response['message'] = 'Added successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Added failure.';
		}
		echo json_encode($response);  
	}
	public function form14(){
		$success=$this->nist_model->form14();
        if($success == 'True') {
			$response['status'] = 'success';
			$response['message'] = 'Added successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Added failure.';
		}
		echo json_encode($response);  
	}
	public function form15(){
		$success=$this->nist_model->form15();
        if($success == 'True') {
			$response['status'] = 'success';
			$response['message'] = 'Added successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Added failure.';
		}
		echo json_encode($response);  
	}
	public function form16(){
		$success=$this->nist_model->form16();
        if($success == 'True') {
			$response['status'] = 'success';
			$response['message'] = 'Added successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Added failure.';
		}
		echo json_encode($response);  
	}
	public function form17(){
		$success=$this->nist_model->form17();
        if($success == 'True') {
			$response['status'] = 'success';
			$response['message'] = 'Added successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Added failure.';
		}
		echo json_encode($response);  
	}
	public function form18(){
		$success=$this->nist_model->form18();
        if($success == 'True') {
			$response['status'] = 'success';
			$response['message'] = 'Added successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Added failure.';
		}
		echo json_encode($response);  
	}
	
	public function form19(){
		$success=$this->nist_model->form19();
        if($success == 'True') {
			$response['status'] = 'success';
			$response['message'] = 'Added successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Added failure.';
		}
		echo json_encode($response);  
	}
	public function form20(){
		$success=$this->nist_model->form20();
        if($success == 'True') {
			$response['status'] = 'success';
			$response['message'] = 'Added successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Added failure.';
		}
		echo json_encode($response);  
	}
	public function logout() {
		$data = array('last_login_ip' => 0,'email' => 0,'name' => 0,'id' => 0);
		$this->session->sess_destroy();
		$this->session->unset_userdata($data);
		redirect(base_url()."nist/dashboard");
	}
	
	public function sign_add(){
		$success=$this->nist_model->sign_add();
        if($success == 'True') {
			$response['status'] = 'success';
			$response['message'] = 'Added successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Added failure.';
		}
		echo json_encode($response);  
	}
	
}  