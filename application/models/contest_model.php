<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contest_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		// load required models
	}
	
	public function clientPresent()
	{
		$this->db->select('client_id')->from('tbl_campaign')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	
	
	
} 