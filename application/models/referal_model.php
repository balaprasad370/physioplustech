<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Referal_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	 
	
	public function referal_info() {
		
		if($this->input->post('referaltypeid')== 'doctor'){
			$referal_type_id=1;
		}else if($this->input->post('referaltypeid') == 'adv'){
			$referal_type_id = 3;
		}else if($this->input->post('referaltypeid')== 'website'){
			$referal_type_id = 2;
		}else if($this->input->post('referaltypeid')== 'others'){
			$referal_type_id=4;
		}else if($this->input->post('referaltypeid')== 'patient'){
			$referal_type_id = 5;
		}else if($this->input->post('referaltypeid')== 'insurance'){
			$referal_type_id = 6;
		}
		if($this->input->post('dob') != ''){
			$dob = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('dob'))));
		}else{
			$dob = '';
		}
		$referal_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'referal_type_id' => $referal_type_id,
			'specialist_id' => $this->input->post('specialist_id'),
			'referal_name' => $this->input->post('referal_name'),
			'org_name' => $this->input->post('org_name'),
			'dob' => $dob,
			'age' => $this->input->post('age'),
			'address_line1' => $this->input->post('address_line1'),
			'address_line2' => $this->input->post('address_line2'),
			'city' => $this->input->post('city'),
			'pincode' => $this->input->post('pincode'),
			'mobile_no' => $this->input->post('mobile_no'),
			'phone_no' => $this->input->post('phone_no'),
			'email' => $this->input->post('email'),
			'website_name' => $this->input->post('website'),
			'adv_name' => $this->input->post('adv_name'),
			'location_of_adv' => $this->input->post('location_of_adv'),
			'referal_oth_name' => $this->input->post('referal_oth_name'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
		
		$this->db->insert('tbl_referal', $referal_info);
		return $this->input->post('referaltypeid');
	}
	
	public function edit_referal_info($referal_id) {
		if($this->input->post('referal_type_id1')==1){
			$referal_type_id=1;
		}else if($this->input->post('referal_type_id2')==2){
			$referal_type_id=2;
		}else if($this->input->post('referal_type_id3')==3){
			$referal_type_id=3;
		}else if($this->input->post('referal_type_id4')==4){
			$referal_type_id=4;
		}
		
		if($this->input->post('dob') != ''){
			$dob = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('dob'))));
		}else{
			$dob = '';
		}
		$edit_referal_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'referal_type_id' => $referal_type_id,
			'specialist_id' => $this->input->post('specialist_id'),
			'referal_name' => $this->input->post('referal_name'),
			'org_name' => $this->input->post('org_name'),
			'dob' => $dob,
			'age' => $this->input->post('age'),
			'address_line1' => $this->input->post('address_line1'),
			'address_line2' => $this->input->post('address_line2'),
			'city' => $this->input->post('city'),
			'pincode' => $this->input->post('pincode'),
			'mobile_no' => $this->input->post('mobile_no'),
			'phone_no' => $this->input->post('phone_no'),
			'email' => $this->input->post('email'),
			'website_name' => $this->input->post('website_name'),
			'adv_name' => $this->input->post('adv_name'),
			'location_of_adv' => $this->input->post('location_of_adv'),
			'referal_oth_name' => $this->input->post('referal_oth_name'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
		
		// update datas
		$where = array('referal_id' => $referal_id);
		$this->db->where($where);
		$update = $this->db->update('tbl_referal',$edit_referal_info);
		return $update;
	}

	public function referal_type_info() {
		$referal_type_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'referal_type_name' => $this->input->post('referal_type_name'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
		
		$insert = $this->db->insert('tbl_referal_type', $referal_type_info);
		return $insert;
	}
	
	public function referal_specialist_info($special) {
		$referal_specialist_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'specialist_name' => $special,
			'created_by' =>$this->session->userdata('username'),//$this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
		
		$this->db->insert('tbl_referal_specialist', $referal_specialist_info);
		$id = $this->db->insert_id();
		$data = array('specialist_id' => $id, 'specialist_name' => $special);
		if($id != ''){
			return $data;	
		} else {
			return false;	
		}
		
	}
	
	//fetch records from referal
	public function getAllReferal()
	{
		$query=$this->db->query("select referal_id,referal_type_id,referal_name,org_name,address_line1,website_name,adv_name,location_of_adv,referal_oth_name from tbl_referal where client_id='".$this->session->userdata('client_id')."' ");
		if($query->num_rows()>0)
		{
            foreach ($query->result_array() as $row){
                    $data[] = $row;
            }
        }
		return $data;
	}
	
	//fetch records from referal
	public function editReferalinfo($referal_id,$referal_type_id)
	{
		if($referal_type_id==1){
			$query=$this->db->query("select re.referal_type_id,re.specialist_id,referal_name,
								org_name,re.dob,re.age,re.address_line1,re.address_line2,re.city,re.pincode,re.mobile_no,
								re.phone_no,re.email from tbl_referal re
								where re.referal_id='".$referal_id."' ");
		}else if($referal_type_id==2){
			$query=$this->db->query("select re.referal_type_id,re.website_name from tbl_referal re
								where re.referal_id='".$referal_id."' ");
		}else if($referal_type_id==3){
			$query=$this->db->query("select re.referal_type_id,re.adv_name,re.location_of_adv from tbl_referal re
								where re.referal_id='".$referal_id."' ");
		}else if($referal_type_id==4){
			$query=$this->db->query("select re.referal_type_id,referal_oth_name from tbl_referal re
								where re.referal_id='".$referal_id."' ");
		}
		
		if($query->num_rows()>0)
		{
            $data=$query->row_array();
        }
		return $data;
	}
	
	// Delete referal
	function delete_referal($referal_id){
		
		$where = array('referal_id' => $referal_id);
		$this->db->where($where);
		$this->db->delete('tbl_referal');
		return $referal_id;
	}
	
	//related records count
	public function hasReferedPatient($referal_id)
	{
		$where=array('referal_id' => $referal_id);
		$this->db->select('referal_id')->from('tbl_patient_info')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	
	function getTypes() {
		$this->db->select('*');
		$this->db->from('tbl_referal_type');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function getReferalCount()
	{
		$this->db->select('count(referal_id) as totalcount')->from('tbl_referal')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function patientsCount()
	{
		$this->db->select('count(referal_id) as totalcount')->from('tbl_referal')->where('referal_type_id', '5');
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function othersCount()
	{
		$this->db->select('count(referal_id) as totalcount')->from('tbl_referal')->where('referal_type_id', '4');
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function advCount()
	{
		$this->db->select('count(referal_id) as totalcount')->from('tbl_referal')->where('referal_type_id', '3');
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function websiteCount()
	{
		$this->db->select('count(referal_id) as totalcount')->from('tbl_referal')->where('referal_type_id', '2');
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function insuranceCount()
	{
		$this->db->select('count(referal_id) as totalcount')->from('tbl_referal')->where('referal_type_id', '6');
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function doctorsCount()
	{
		$this->db->select('count(referal_id) as totalcount')->from('tbl_referal')->where('referal_type_id', '1');
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function edit_referal($seg){
		$where = array('referal_id' => $seg);
		$this->db->select('*')->from('tbl_referal')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function update()
	{
		$referal_info = array(
		     'client_id'=>$this->session->userdata('client_id'),
			'referal_type_id' => $this->input->post('referaltypeid'),
			'specialist_id' => $this->input->post('specialist_id'),
			'referal_name' => $this->input->post('referal_name'),
			'org_name' => $this->input->post('org_name'),
			'address_line1' => $this->input->post('address_line1'),
			//'address_line2' => $this->input->post('address_line2'),
			'city' => $this->input->post('city'),
			'address_line2' => $this->input->post('city'),
			'pincode' => $this->input->post('pincode'),
			'mobile_no' => $this->input->post('mobile_no'),
			'phone_no' => $this->input->post('phone_no'),
			'email' => $this->input->post('email'),
			'website_name' => $this->input->post('website'),
			'adv_name' => $this->input->post('adv_name'),
			'location_of_adv' => $this->input->post('address_line2'),
			'referal_oth_name' => $this->input->post('referal_oth_name'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
		
		$this->db->where('referal_id',$this->input->post('referalid'));
		$this->db->update('tbl_referal', $referal_info);
		$id = $this->input->post('referalid');
		return $id;
	}
	public function referal_details($id){
		
		if($id == '5'){
			$this->db->select('first_name,last_name,patient_id')->from('tbl_patient_info');
			$this->db->where('client_id',$this->session->userdata('client_id'));
			$query=$this->db->get();
		} else {
		$this->db->select('*')->from('tbl_referal');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('referal_type_id',$id);
		$query=$this->db->get();
		}
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function add_patient($prov){
		$info = array(
			'referal_type_id' => '5',
			'referal_name' => $prov,
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
			'client_id' => $this->session->userdata('client_id'),
		);
		$this->db->insert('tbl_referal',$info);
		$id = $this->db->insert_id();
		$data = array('referal_id' => $id,'pat_name' => $prov);
		if($data != ''){
			return $data;
		}
		else {
			return false;
		}
	}
	public function add_other($prov){
		$info = array(
			'referal_type_id' => '4',
			'referal_oth_name' => $prov,
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
			'client_id' => $this->session->userdata('client_id'),
		);
		$this->db->insert('tbl_referal',$info);
		$id = $this->db->insert_id();
		$data = array('referal_id' => $id,'oth_name' => $prov);
		if($data != ''){
			return $data;
		}
		else {
			return false;
		}
	}
	public function add_Adv($prov){
		$provi = explode('/',$prov);
		$info = array(
			'referal_type_id' => '3',
			'adv_name' => $provi[0],
			'location_of_adv' => $provi[1],
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
			'client_id' => $this->session->userdata('client_id'),
		);
		$this->db->insert('tbl_referal',$info);
		$id = $this->db->insert_id();
		$data = array('referal_id' => $id,'adv_name' => $provi[0]);
		if($data != ''){
			return $data;
		}
		else {
			return false;
		}
	}
	public function add_Web($prov){
		
		$info = array(
			'referal_type_id' => '2',
			'website_name' => $prov,
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
			'client_id' => $this->session->userdata('client_id'),
		);
		$this->db->insert('tbl_referal',$info);
		$id = $this->db->insert_id();
		$data = array('referal_id' => $id,'web_name' => $prov);
		if($data != ''){
			return $data;
		}
		else {
			return false;
		}
	}
	public function add_Insurance($prov){
		$provi = explode('/',$prov);
		$info = array(
			'referal_type_id' => '6',
			'referal_name' => $provi[0],
			'email' => $provi[1],
			'mobile_no' => $provi[2],
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
			'client_id' => $this->session->userdata('client_id'),
		);
		$this->db->insert('tbl_referal',$info);
		$id = $this->db->insert_id();
		$data = array('referal_id' => $id,'referal_name' => $provi[0]);
		if($data != ''){
			return $data;
		}
		else {
			return false;
		}
	}
	public function add_Doctor($prov){
		$provi = explode('/',$prov);
		$info = array(
			'referal_type_id' => '1',
			'referal_name' => $provi[0],
			'email' => $provi[1],
			'mobile_no' => $provi[2],
			'specialist_id' => $provi[3],
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
			'client_id' => $this->session->userdata('client_id'),
		);
		$this->db->insert('tbl_referal',$info);
		$id = $this->db->insert_id();
		$data = array('referal_id' => $id,'referal_name' => $provi[0]);
		if($data != ''){
			return $data;
		}
		else {
			return false;
		}
	}
	public function add_group($val) {
		$value = explode('/',$val);
		$referal_specialist_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'group_name' => $value[0],
			'email_id' => $value[1],
		);
		$this->db->insert('tbl_events_group', $referal_specialist_info);
		$id = $this->db->insert_id();
		$data = array('group_id' => $id, 'group_name' => $value[0]);
		if($data != ''){
			return $data;	
		} else {
			return false;	
		}
		
	}
	public function edit_specialist($id){
		$where = array('specialist_id' => $id);
		$this->db->select('*')->from('tbl_referal_specialist')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function specialist_update()
	{
		$referal_info = array(
		     'client_id'=>$this->session->userdata('client_id'),
			'specialist_name' => $this->input->post('specialist'),
			'modify_date' => date('Y-m-d H:i:s'),
		);

		$this->db->where('specialist_id',$this->input->post('specialist_id'));
		$this->db->update('tbl_referal_specialist', $referal_info);
		$id = $this->input->post('specialist_id');
		return $id; 
	}
	public function specialist_delete()
	{
		$this->db->where('specialist_id',$this->input->post('specialist_id'));
		$this->db->delete('tbl_referal_specialist');
		//echo $this->db->last_query();exit;
		$id = $this->input->post('specialist_id');
		return $id; 
	}
	
} 