<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()   {
	    header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
		parent::__construct();
		$this->load->model(array('nist_model'));
		 

	}
	public function index(){
		$data['page_name'] ='index';
		$this->db->select('*');
		//$this->db->from("tbl_patient_comment");
		$this->db->from('tbl_nist');
		$query = $this->db->get();
		$data['record'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		$this->load->view('nist/nist_list',$data);
	}
	public function nist_print(){
		 
	}
	
}  