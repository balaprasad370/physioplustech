<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HealtITUES extends CI_Controller {

	public function __construct() {  
		parent::__construct();
		
		$this->load->model(array('health_it_query_model'));
		
	}
	public function index(){
		$data['page_name'] = 'Query';
		$this->load->view('feedback/index',$data);
	}
	public function add_feedback(){
		$response=array();
		$result = $this->health_it_query_model->add_feedback();
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = ' successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Added successfully.';
		}
		echo json_encode($response);
	}
	
}