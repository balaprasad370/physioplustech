<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	public function getstaff1()
	{
		$this->db->select('*');
		$this->db->from("tbl_staff_info");
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->order_by('staff_id','desc'); 
		$query = $this->db->get();
	    return ($query->num_rows() > 0) ? $query->result_array():0;
	}
	public function staff_info() {
		$staff_code = $this->generate_code();
		if($this->input->post('dob') != ''){
			$dob = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('dob'))));
		}else{
			$dob = '';
		}
		$staff_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'staff_code' => $staff_code,
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'dob' => $dob,
			'age' => $this->input->post('age'),
			'date_of_joining' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('date_of_joining')))),
			'date_of_ending' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('date_of_ending')))),
			'gender' => $this->input->post('gender'),
			'is_doctor' => $this->input->post('is_doctor'),
			'dr_color' => $this->input->post('dr_color'),
			'marital_status' => $this->input->post('marital_status'),
			'address_line1' => $this->input->post('address_line1'),
			'address_line2' => $this->input->post('address_line2'),
			'city' => $this->input->post('city'),
			'pincode' => $this->input->post('pincode'),
			'mobile_no' => $this->input->post('mobile_no'),
			'phone_no' => $this->input->post('phone_no'),
			'designation_name' => $this->input->post('designation_name'),
			'email' => $this->input->post('email'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
			'reg_date' =>date('Y-m-d'),
		);
		$insert = $this->db->insert('tbl_staff_info', $staff_info);
		$staff_id=$this->db->insert_id();
		
		$totqual=count($_POST['degree_name']);
		$degree_name=$_POST['degree_name'];
		$institution=$_POST['institution'];
		$university=$_POST['university'];
		$average=$_POST['average'];
		$duration=$_POST['duration'];
		$sno=1;
		if($degree_name[0] != '') {
			for($i=0; $i<$totqual; $i++)
			{
				if($degree_name[$i]!='')
				{
					$staff_qualify[$i] = array(  
						'client_id' => $this->session->userdata('client_id'),
						'staff_id' => $staff_id,
						's_no' => $sno,
						'degree_name' => $degree_name[$i],
						'institution' => $institution[$i],
						'university' => $university[$i],
						'duration' => $duration[$i],
						'average' => $average[$i],
						'created_by' => $this->session->userdata('username'),
						'created_date' => date('Y-m-d H:i:s'),
						'modify_by' => $this->session->userdata('username'),
						'modify_date' => date('Y-m-d H:i:s'),  
					);
					$sno++;
				}
			}
			$this->db->insert_batch('tbl_staff_qualification', $staff_qualify);
		}
		//$totexp_check = count($_POST['organisation']) ? true : false;
		$totexp=count($_POST['organisation']);
		$organisation=$_POST['organisation'];
		$designation=$_POST['designation'];
		$exp_duration=$_POST['exp_duration'];
		$nature_of_work=$_POST['nature_of_work'];
		$sno1=1;
		if($totexp > 0) {
			for($j=0; $j<$totexp; $j++)
			{
					$staff_exp[$j] = array(
						'client_id' => $this->session->userdata('client_id'),
						'staff_id' => $staff_id,
						's_no' => $sno1,
						'organisation' => $organisation[$j],
						'designation' => $designation[$j],
						'exp_duration' => $exp_duration[$j],
						'nature_of_work' => $nature_of_work[$j],
						'created_by' => $this->session->userdata('username'),
						'created_date' => date('Y-m-d H:i:s'),
						'modify_by' => $this->session->userdata('username'),
						'modify_date' => date('Y-m-d H:i:s'),
					);
					$sno1++;
			}
			$this->db->insert_batch('tbl_staff_experience', $staff_exp);
			$this->db->where('organisation', '');
			$this->db->delete('tbl_staff_experience');  
		}
		if(!empty($_FILES['profile_photo']['name']))
		{
			
			$config['upload_path'] = './uploads/staff/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '10000000M';
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('profile_photo'))
			{
				$error = array('error' => $this->upload->display_errors());	
			}else{
				$data = array('upload_data' => $this->upload->data());
				$filedata = array(
					'staff_img' => $data['upload_data']['file_name']
				);

				$this->db->where('staff_id', $staff_id);
				$this->db->update('tbl_staff_info', $filedata);
			}	
		}
		return $staff_id;
	}
	
	public function edit_staff_info($staff_id) {
		if($this->input->post('dob') != ''){
			$dob = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('dob'))));
		}else{
			$dob = '';
		}
		$edit_staff_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'dob' => $dob,
			'age' => $this->input->post('age'),
			'date_of_joining' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('date_of_joining')))),
			'date_of_ending' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('date_of_ending')))),
			'gender' => $this->input->post('gender'),
			'is_doctor' => $this->input->post('is_doctor'),
			'dr_color' => $this->input->post('dr_color'),
			'marital_status' => $this->input->post('marital_status'),
			'address_line1' => $this->input->post('address_line1'),
			'address_line2' => $this->input->post('address_line2'),
			'city' => $this->input->post('city'),
			'pincode' => $this->input->post('pincode'),
			'mobile_no' => $this->input->post('mobile_no'),
			'phone_no' => $this->input->post('phone_no'),
			'designation_name' => $this->input->post('designation_name'),
			'email' => $this->input->post('email'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
			'reg_date' =>date('Y-m-d'),
		);
		$where = array('staff_id' => $staff_id, 'client_id' => $this->session->userdata('client_id'));
		$this->db->where($where);
		$update = $this->db->update('tbl_staff_info',$edit_staff_info);
		
		$this->db->where('staff_id',$staff_id);
		$this->db->set('username',$this->input->post('email'));
		$this->db->update('tbl_user');
		
		$this->db->where($where);
		$this->db->delete('tbl_staff_qualification');
		$totqual=count($_POST['degree_name']);
		$degree_name=$_POST['degree_name'];
		$institution=$_POST['institution'];
		$university=$_POST['university'];
		$average=$_POST['average'];
		$duration=$_POST['duration'];
		$sno=1;
		for($i=0; $i<$totqual; $i++)
		{
			if($degree_name[$i]!='')
			{
				$staff_qualify[$i] = array(
					'client_id' => $this->session->userdata('client_id'),
					'staff_id' => $staff_id,
					's_no' => $sno,
					'degree_name' => $degree_name[$i],
					'institution' => $institution[$i],
					'university' => $university[$i],
					'duration' => $duration[$i],
					'average' => $average[$i],
					'created_by' => $this->session->userdata('username'),
					'created_date' => date('Y-m-d H:i:s'),
					'modify_by' => $this->session->userdata('username'),
					'modify_date' => date('Y-m-d H:i:s'),
				);
				$sno++;
				$this->db->insert_batch('tbl_staff_qualification', $staff_qualify[$i]);
			}
		}
		
		
		$this->db->where($where);
		$this->db->delete('tbl_staff_experience');
		
		$totexp=count($_POST['organisation']);
		$organisation=$_POST['organisation'];
		$designation=$_POST['designation'];
		$exp_duration=$_POST['exp_duration'];
		$nature_of_work=$_POST['nature_of_work'];
		$sno1=1;
		for($j=0; $j<$totexp; $j++)
		{
				$staff_exp[$j] = array(
					'client_id' => $this->session->userdata('client_id'),
					'staff_id' => $staff_id,
					's_no' => $sno1,
					'organisation' => $organisation[$j],
					'designation' => $designation[$j],
					'exp_duration' => $exp_duration[$j],
					'nature_of_work' => $nature_of_work[$j],
					'created_by' => $this->session->userdata('username'),
					'created_date' => date('Y-m-d H:i:s'),
					'modify_by' => $this->session->userdata('username'),
					'modify_date' => date('Y-m-d H:i:s'),
				);
				$sno1++;
		}
		$this->db->insert_batch('tbl_staff_experience', $staff_exp);
		$this->db->where('organisation', '');
		$this->db->delete('tbl_staff_experience');
		if(!empty($_FILES['profile_photo']['name']))
		{
			
			$query = $this->db->query("SELECT staff_img FROM tbl_staff_info where staff_id = '".$staff_id."'");
			if($query->num_rows()>0)
			{
				$imgdata = $query->row_array();
				if($imgdata['staff_img']!='')
				{
					unlink('./uploads/staff/'.$imgdata['staff_img']);
				}
			}	
			
			$config['upload_path'] = './uploads/staff/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '10000000M';
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('profile_photo'))
			{
				$error = array('error' => $this->upload->display_errors());	
			}else{
				$data = array('upload_data' => $this->upload->data());
				$filedata = array(
					'staff_img' => $data['upload_data']['file_name']
				);

				$this->db->where('staff_id', $staff_id);
				$this->db->update('tbl_staff_info', $filedata);
			}	
		}
	}
	
	
	public function stafftype_info($privileges) {
		
		$pstring=implode(",",$privileges);
		$stafftype_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'staff_type_name' => $this->input->post('staff_type_name'),
			'privileges' => $pstring,
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
		
		$insert = $this->db->insert('tbl_staff_type', $stafftype_info);
		return $insert;
	}
	
	public function staffdesn_info() {
		$staffdesn_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'designation_name' => $this->input->post('designation_name'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
		
		$insert = $this->db->insert('tbl_designation', $staffdesn_info);
		$data = array('designation' => $this->db->insert_id(), 'designation_name' => $this->input->post('designation_name'));
		if($this->db->insert_id()){
			return $data;	
		} else {
			return false;	
		}
	}
	
	// generate staff code
	public function generate_code() {
		$query=$this->db->query("select IFNULL(max(substr(staff_code,10,2))+1,1) STAFF_CODE from tbl_staff_info where client_id='".$this->session->userdata('client_id')."'");
		$row = $query->row_array();
		$string  = 'S' . ucfirst(substr($this->input->post('gender'),0,1)) . ucfirst(substr($this->input->post('first_name'),0,1)) . '/' . date('my') . '/'.$row['STAFF_CODE'];
		return $string;
	}
	
	public function view_staff(){
		$this->db->select("*")->from('tbl_staff_info');
		$query =$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false; 
	}
	public function getStaff() {
		$this->db->select('first_name')->from('tbl_staff_info');
		$this->db->where('client_id',$this->session->userdata('client_id'));
	    $query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	public function designation(){
		$this->db->select('designation_name')->from('tbl_staff_info');
		$this->db->where('designation_name !=','');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	//fetch records from staff
	public function getAllStaff()
	{
		$query=$this->db->query("select si.staff_code,si.date_of_joining,si.first_name,si.staff_type_id,
								st.staff_type_name,si.designation,de.designation_name,si.mobile_no,si.email,si.address_line1 from tbl_staff_info si,
								tbl_staff_type st,tbl_designation de where si.client_id='".$this->session->userdata('client_id')."' and 
								si.staff_type_id=st.staff_type_id and si.client_id=st.client_id and si.designation_id=de.designation_id and si.client_id and si.client_id=de.client_id");
		if($query->num_rows()>0)
		{
            foreach ($query->result_array() as $row){
                    $data[] = $row;
            }
        }
		return $data;
	}
	
	//fetch records from staff
	public function editStaff($staff_id)
	{
		$where = array('staff_id' => $staff_id);
		$this->db->select('staff_id,staff_code,first_name,last_name,dob,age,dob,date_of_joining,gender,is_doctor,dr_color,marital_status,
							address_line1,address_line2,city,pincode,mobile_no,phone_no,email,
							designation_name,date_of_ending')->from('tbl_staff_info')->where($where);
		$query=$this->db->get();

		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	//fetch records from staff
	public function editStaff1($staff_id)
	{
		$where = array('staff_id' => $staff_id);
		$this->db->select('degree_name,institution,university,duration,average')->from('tbl_staff_qualification')->where($where);
		$query=$this->db->get();

		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getuser()
	{
		$this->db->select('si.mobile_no,ur.created_date,si.staff_code,si.staff_id,ur.user_id,ur.username,ur.staff_id,si.first_name,ur.status');
		$this->db->from("tbl_user ur");  
		$this->db->join("tbl_staff_info si","ur.staff_id=si.staff_id");
		$this->db->where('ur.client_id',$this->session->userdata('client_id'));
		$this->db->order_by('user_id', 'desc');
		$query = $this->db->get();
	    return ($query->num_rows() > 0) ? $query->result_array():0;
	}
	public function getuserID($staff_username)
	{
		$where = array('username' => $staff_username);
		$this->db->select('staff_id')->from('tbl_user')->where($where);
		$query=$this->db->get();

		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function getStaffName($s_id)
	{
		$where = array('staff_id' => $s_id);
		$this->db->select('*')->from('tbl_staff_info')->where($where);
		$query=$this->db->get();

		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	//fetch records from staff
	public function editStaff2($staff_id)
	{
		$where = array('staff_id' => $staff_id);
		$this->db->select('organisation,designation,exp_duration,nature_of_work')->from('tbl_staff_experience')->where($where);
		$query=$this->db->get();

		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	// Delete referal
	function delete_staff($staff_id){
		
		$where = array('staff_id' => $staff_id);
		$this->db->where($where);
		$this->db->delete('tbl_staff_info');
		
		$this->db->where($where);
		$this->db->delete('tbl_staff_qualification');
		
		$this->db->where($where);
		$this->db->delete('tbl_user');
				
		$this->db->where($where);
		$this->db->delete('tbl_staff_experience');
		return $staff_id;
	}
	
	public function getStaffInfo($user_name)
	{	
		$where=array('email' => $user_name, 'client_id' => $this->session->userdata('client_id'));
		$this->db->select('*')->from('tbl_staff_info')->where($where);
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->row_array() : false;
	}
	
	// get doctors from staff list
	function getDoctors($datas = '') {
		if($datas == '') {
			$this->db->select('*');
		} else {
			$this->db->select($datas);
		}
		$this->db->from('tbl_staff_info')->where('client_id', $this->session->userdata('client_id'));
		$this->db->where('is_doctor', 1);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function getstaffCount()
	{
		$this->db->select('count(staff_id) as totalcount')->from('tbl_staff_info')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	
	public function sessStaff()
	{
		$this->db->select('staff_id')->from('tbl_staff_info')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	
	public function getAllSess ()
	{
		$where=array('client_id' => $this->session->userdata('client_id'));
		$this->db->select('*')->from('tbl_session_det')->where($where);
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array() : false;
	}
	
	public function getIPbillinfo($user_name)
	{
		$this->db->select('*')->from('tbl_client')->where('username', $user_name);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
		public function quick_consult_add($prov) {
		$provi = explode('/',$prov);
		$staff_code = $this->generate_code();
	   $client_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'staff_code' => $staff_code,
			'first_name' => $provi[0],
			'last_name' => $provi[1],
			'mobile_no' => $provi[3],
			'email' => $provi[2],
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'is_doctor'=>1,
			'date_of_joining'=>date('Y-m-d H:i:s'),
			'dr_color'=>'#947373',
			'modify_date' => date('Y-m-d H:i:s'),
		
		);
		// insert datas
		$this->db->insert('tbl_staff_info', $client_info);
		$data = array('staff_id' => $this->db->insert_id(), 'name' => $provi[0].' '.$provi[1]);
		if($this->db->insert_id()){
			return $data;	
		} else {
			return false;	
		}
	}
	public function staffpro()
	{
		
		$this->db->select('staff_id')->from('tbl_invoice_detail');
		
		$result=$this->db->get();
	
		return ($result->num_rows()>0) ? $result->result_array() : false;
	}
	public function staffinfo()
	{
		$this->db->select('*')->from('tbl_staff_info')->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('is_doctor', 1);
		$result=$this->db->get();
		return ($result->num_rows()>0) ? $result->result_array() : false;
	}
	public function search_staff_session()
	{
		$from=$this->uri->segment(5);
		$to=$this->uri->segment(6);
		$Therapist=$this->uri->segment(7);
	
		$this->db->select('*')->from('tbl_session_det')->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('created_date >= ',date('Y-m-d h:i:s',strtotime($from)));
		$this->db->where('created_date <= ',date('Y-m-d h:i:s',strtotime($to)));
		$res=$this->db->get();
		return ($res->num_rows()>0) ? $res->result_array() : false;
		
		
	}
	Public function report(){
		$this->db->select('*')->from('tbl_session_det');
		$res = $this->db->get();
		return ($res->num_rows()>0) ? $res->result_array() : false;
	}
	public function search_sessionwise()
	{	
		$item_id = $this->uri->segment(7);
		$this->db->distinct();
		$this->db->where('ih.client_id',$this->session->userdata('client_id'));
		$this->db->select('ih.bill_no,ih.bill_id,ih.treatment_date,ih.patient_id,pi.patient_code,pi.first_name,pi.last_name,ih.bill_status,idtl.item_amount,ih.payment_mode,it.item_name');
		$this->db->from("tbl_invoice_header ih");
		$this->db->join("tbl_patient_info pi", "ih.patient_id=pi.patient_id");
		$this->db->join("tbl_invoice_detail idtl", "idtl.bill_id=ih.bill_id");
		$this->db->join("tbl_item it", "it.item_id=idtl.item_id");
		$this->db->where('ih.client_id',$this->session->userdata('client_id'));
		$this->db->where('ih.treatment_date >=',date('Y-m-d',strtotime($this->uri->segment(5))));
		$this->db->where('ih.treatment_date <=',date('Y-m-d',strtotime($this->uri->segment(6))));
		$this->db->where('ih.staff_id',$item_id);
		$this->db->order_by('idtl.bill_id', 'asc');
		$res=$this->db->get();
		return ($res->num_rows()>0) ? $res->result_array() : false;
	}
	
} 