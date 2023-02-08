<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Referaloffer extends CI_Controller {
         
		 public function __construct() {
		 parent::__construct();
		 $this->app_access->client();
		 $this->load->model(array('concessgroup_model','registration_model','referaloffer_model'));
	}
	public function index()
	{
		$data['page_name'] = 'referral';
		$data['result']=$this->referaloffer_model->view();
		$this->load->view('client/referaloffer_add',$data);
	}
	public function add_referaloffer() {
		$data['page_name'] = 'referral';
	   $success=$this->referaloffer_model->add_referral();
     
	    if($success == 'True') {
			$response['status'] = 'success';
			$response['message'] = 'Letter  Has Been Added successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Letter Has Been Added failure.';
		}
		echo json_encode($response);   
	  }
    public function send_mail(){
		$data['page_name'] = 'referral';
		$client_id = $this->uri->segment(5);
		$id = $this->uri->segment(4);
		$this->referaloffer_model->referal_email($id,$client_id);
		//redirect(base_url()."client/referaloffer/index/",$data);
	}
	public function name_check() {
		$response=array();
		$mobile=$this->uri->segment(4);
		$result = $this->referaloffer_model->name_check($mobile);
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

}