<?php 
/** File name   : dashboard.php
*	Author      : Muthukumar
*	Date        : 27th Mar 2013
*	Description : Controller for physioplus client dashboard.
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		//$this->app_access->client(); // check access permission for owner
		$this->load->model(array('plugin_model','appoinment_model'));
	}
	
	// redirect index method to home
	public function index() {
		$client_id = 103;
		$data['client_details'] = $this->plugin_model->client_det($client_id); 
		$data['staff_details'] = $this->plugin_model->staff_det($client_id); 
		$data['sch_slot'] = $this->appoinment_model->sch_slot($client_id);
		$data['sch_times'] = $this->appoinment_model->sch_times1($client_id);
		$this->load->view('plugin/appointment',$data);
	}
	public function add_appointment() {
		$result = $this->plugin_model->add_appointment();
		if($result != ''){
			$response['status'] = 'Success';
			$response['message'] = 'Chart has been added successfully.';
		
		}else {
			$response['status'] = 'failure';
			$response['message'] = 'chart has not been added successfully.';
		}
		echo json_encode($response);
	}
	
	
			
	
	
}