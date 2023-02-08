<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct() {
		header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
		parent::__construct();
		// load required models
		$this->load->model(array('user_model','staff_model'));
	}
	 public function index() {
		redirect( base_url() . 'user/dashboard/login' );	
	}
	public function login() {
		$this->load->view('user/login');
	} 
	public function user_login() {
		if( $this->app_access->is_client_logged_in() == true ) redirect( base_url() . 'client/dashboard/home' );
		$this->user_model->check_login();
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url()."client/dashboard/login");
	}
	public function forget_password()
	{
		// loading libraries and helpers
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form'));
		// validation rules
		$this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
		// Error deliminators
		$this->form_validation->set_error_delimiters('<div class="NewError">', '</div>');
		// Form validation action
		if( $this->form_validation->run() == TRUE ) {
			$this->user_model->recover_password();
			$this->session->set_flashdata('password_recover_sucess', '<div class="NewError2"><strong>Sucess!</strong> Password has been sent to your email address .  </div>');
			redirect(base_url()."user/dashboard/forget_password", "refresh");
		}
		$this->load->view('user/forget_password');
	}














	
	

	
	
}
?>