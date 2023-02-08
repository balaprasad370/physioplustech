<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
     public function __construct() {
		parent::__construct();
		
		$this->load->model(array('subadmin_model'));
	 }
	 
	 
	 public function index(){
		 $data['page_name'] ='subadmin';
		 $this->load->view('subadmin/login',$data);
		 
	 }
	 
	  public function user_login() {
		$result = $this->subadmin_model->check_login();
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
	 
}?>