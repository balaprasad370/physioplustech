<?php 
/** File name   : dashboard.js
*	Author      : Karuna
*	Date        : 25th Mar 2013
*	Description : Controller for physioplus admin dashboard.
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quotation extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		// load required models
		header("cache-Control: no-store, no-cache, must-revalidate");
	     header("cache-Control: post-check=0, pre-check=0", false);
	     header("Pragma: no-cache");
		$this->load->model(array('owner','registration_model','user_model','admin'));
	}
	
	
	public function index(){
		if($this->session->userdata('user_name') != false) {
			$data['page_name'] = 'dashboard'; 
			$this->load->view('physioadmin/add_quotation',$data);
		}else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		}
	}
	
	public function add_quotation(){
		$success=$this->owner->add_quotation();
        if($success == 'True') {
			$response['status'] = 'success';
			$response['message'] = 'quotation Has Been Added successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'quotation Has Been Added failure.';
		}
		echo json_encode($response);   
	  }
		
		
	public function quotation_view()
	{
	if($this->session->userdata('user_name') != false) {
		$data['page_name'] = 'dashboard'; 
		$data['result']=$this->owner->quotation_view();
		$this->load->view('physioadmin/view_quotation',$data);
		
		}else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	
	public function quotation_print(){
		if($this->session->userdata('user_name') != false) {
		$id = $this->uri->segment(4);
		$data['page_name'] = 'home';
		$data['result'] = $this->owner->getquoteview($id);
		$this->load->view('physioadmin/quotationprint_preview',$data);
		}else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	public function quotationprint(){
		$this->load->view('physioadmin/quotationprint');
	}
	public function domain_expire(){
		$this->load->view('physioadmin/domain_expire');
	}
	public function delete(){
		$data['page_name'] = 'Domain';
		$this->owner->delete($_POST['p_id']);
		redirect(base_url().'physioadmin/quotation/quotation_view', 'refresh');
	}
	
}?>