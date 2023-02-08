<?php
class Form_model extends CI_Model {
   public function __construct() { 
		parent::__construct();
		$this->load->model(array('mail_model'));
		parent::__construct();  
   }
   public function form_insert()
   {
	   $val = $this->input->post('category');
		if($val == '1')
		{
			$home = '1';
		} 
		else {
			$home = '2';
		 }
	  $data=array(
	    'client_id' => $this->input->post('client_id'),
		'first_name' => $this->input->post('firstname'),
		'last_name' => $this->input->post('lastname'),
		'age' => $this->input->post('age'),
		'mobile_no' => $this->input->post('mobile'),
		'address_line1' => $this->input->post('address'),
		'gender' => $this->input->post('gender'),
		'patient_code' => $this->generate_code(),
		'appoint_date'=> date('Y-m-d'),
		'home_visit' => $home,
		'app_approve' => '1',
		'email' => $this->input->post('email'),
        'created_date' => date('Y-m-d H:i:s'),
        'modify_date' => date('Y-m-d H:i:s')		
	  );
       $this->db->insert('tbl_patient_info',$data);
		$id = $this->db->insert_id();
		$name = $this->input->post('firstname').' '.$this->input->post('lastname');
		$mobile = $this->input->post('mobile');
		$email = $this->input->post('email');
		$branch = $this->input->post('client_id');
		$val = $this->input->post('category');
		if($val == '1')
		{
			$home1 = 'Clinic Visit';
		} 
		else {
			$home1= 'Home Patient';
		 }
		$type = $home1;
		$this->mail_model->pat_register($name,$mobile,$email,$branch,$type);
		return $id;
	}
	public function generate_code() {
		$string  = 'P' . ucfirst(substr($this->input->post('gender'),0,1)) . ucfirst(substr($this->input->post('first_name'),0,1)) . '/' . date('my') . '/';
		$this->db->select('patient_code')->from('tbl_patient_info'); 
		$this->db->where('client_id',$this->input->post('client_id'));
		$this->db->like('patient_code', $string, 'after');
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $string . ($query->num_rows() + 1);
		} else {
			return $string . '1';
		}
	}
   

		 
		
		
		

		
		






	 


}

?>