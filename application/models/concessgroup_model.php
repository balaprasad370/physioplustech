<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Concessgroup_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		// load required models
		$this->load->model(array('mail_model','registration_model'));
	}
	
	public function concessGroupAdd() {
		$concessionInfo = array(
			'client_id' => $this->session->userdata('client_id'),
			'concess_group_name' => $this->input->post('concess_group_name'),
			'age' => $this->input->post('age'),
			'tax_perc' => $this->input->post('tax_perc'),
			'discount_perc' => $this->input->post('discount_perc'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
		
		$this->db->insert('tbl_concess_group', $concessionInfo);
		
		$data = array('concess_group_id' => $this->db->insert_id(), 'concess_group_name' => $this->input->post('concess_group_name'));
		if($this->db->insert_id()){
			return $data;	
		} else {
			return false;	
		}
	}
	
	public function concessGroupEdit($concess_group_id) {
		
		$concessionInfo = array(
			'client_id' => $this->session->userdata('client_id'),
			'concess_group_name' => $this->input->post('concess_group_name'),
			'age' => $this->input->post('age'),
			'tax_perc' => $this->input->post('tax_perc'),
			'discount_perc' => $this->input->post('discount_perc'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
		
		$where = array('concess_group_id' => $concess_group_id);
		$this->db->where($where);
		$this->db->update('tbl_concess_group',$concessionInfo);
		return $concess_group_id;
	}
	
	//fetch records from user
	public function editConcessGroup($concess_group_id)
	{	
		$where=array('concess_group_id' => $concess_group_id);
		$this->db->select('*')->from('tbl_concess_group')->where($where);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	// Delete concession group
	public function deleteConcessionGroup($concess_group_id){
		
		$where = array('concess_group_id' => $concess_group_id);
		$this->db->where($where);
		$this->db->delete('tbl_concess_group');
		return $concess_group_id;
		
	}
	public function concessGroupAdd_pat($prov) {
		$provi = explode('/',$prov);
		$concessionInfo = array(
			'client_id' => $this->session->userdata('client_id'),
			'concess_group_name' => $provi[0],
			'age' => $this->input->post('age'),
			'tax_perc' => $provi[1],
			'discount_perc' => $provi[2],
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
		
		$this->db->insert('tbl_concess_group', $concessionInfo);
		$data = array('concess_group_id' => $this->db->insert_id(), 'concess_group_name' => $this->input->post('concess_group_name'));
		if($this->db->insert_id()){
			return $data;	
		} else {
			return false;	
		}
	}
	public function get_concession() {
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('concess_group_id,concess_group_name')->from('tbl_concess_group');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function search_concession() {
		$segment_array = $this->uri->segment_array();
		$do_concess = array_search("concess",$segment_array);
		if($do_concess != false) {
			$search1 = $this->uri->segment($do_concess+1);
			$where_condition = "(concess_group_id ='".$search1."')";
		}
		$this->db->distinct();
		$this->db->where($where_condition);
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('count(*) as totalrows')->from('tbl_patient_info');
		$q = $this->db->get();
		$qrow = $q->row();
		
		$this->db->distinct(); 
		$this->db->where($where_condition);
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('first_name,last_name,patient_id,patient_code,email,mobile_no');
		$this->db->from("tbl_patient_info");
		$this->db->order_by('patient_id', 'desc');
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array()  : false; 
	}
	public function removeConcessionGroup($patient_id){
		$patient_id = $this->uri->segment(4);
		$this->db->where('patient_id',$patient_id);
		$this->db->set('concess_group_id',0);
		$this->db->update('tbl_patient_info');
	}
	
	
} 