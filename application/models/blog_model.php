<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		// load required models
		
	}
	
	public function blogAdd() {
		$bloginfo = array(
			'client_id' => $this->session->userdata('client_id'),
			'name' => $this->input->post('name'),
			'title' => $this->input->post('title'),
			'date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('date')))),
			'logo_upload' => $this->input->post('upload_img'),
			'description' => $this->input->post('description'),
			'description1' => $this->input->post('description1'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
		
		$this->db->insert('tbl_blog', $bloginfo);
		
		$data = array('blog_id' => $this->db->insert_id(), 'name' => $this->input->post('name'));
		if($this->db->insert_id()){
			return $data;	
		} else {
			return false;	
		}
	}
	
	public function deleteblog($blog_id){
		
		$where = array('blog_id' => $blog_id);
		$this->db->where($where);
		$this->db->delete('tbl_blog');
		
	}
	
	public function getbloginfo($blog_id){
		$where=array('blog_id' => $blog_id);
		$this->db->select('*')->from('tbl_blog')->where($where);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
		
	}
	
	public function edit_bloginfo($blog_id){
		$bloginfo = array(
			'client_id' => $this->session->userdata('client_id'),
			'name' => $this->input->post('name'),
			'title' => $this->input->post('title'),
			'date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('date')))),
			'logo_upload' => $this->input->post('upload_img'),
			'description' => $this->input->post('description'),
			'description1' => $this->input->post('description1'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
		
		$where = array('blog_id' => $blog_id);
		$this->db->where($where);
		$this->db->update('tbl_blog',$bloginfo);
		return $blog_id;
	}
}
	