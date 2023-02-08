<?php 
class Pdf_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	} 
	
	public function getcharts($cno,$client_id){
		$this->db->select('*')->from('save_chart');
		$this->db->where('client_id',$client_id);
		$this->db->where('chard_no',$cno);
		$this->db->order_by('arrange_no','asc');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function getdefaultcharts($cno,$client_id){
		$this->db->select('*')->from('default_chart');
		$this->db->where('client_id',$client_id);
		$this->db->where('chard_no',$cno);
		$this->db->order_by('arrange_no','asc');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function editProfile($client_id)
	{
		$this->db->select('*')->from('tbl_client')->where('client_id', $client_id);
		$query=$this->db->get();
		//echo $query->num_rows().'hi';
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function getprivatecharts($cno,$client_id){
		$this->db->select('*')->from('save_privatechart');
		$this->db->where('client_id',$client_id);
		$this->db->where('chard_no',$cno);
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
}
	