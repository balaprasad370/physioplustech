<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Patientmodel extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function PPassword($email,$password){
		$passwordinfo = array(
			'password' => $password
		);
		$where = array(
			'email'=> $email
		);
		$this->db->where($where);
		$this->db->update('tbl_patient_info',$passwordinfo);
		return true;
	}
	
	public function check_login() {
		$this->db->select('*')->from('tbl_patient_info')->where('email = "'. $this->input->post('username') .'" and password = "'. $this->input->post('password') .'" ');
		$result=$this->db->get();
		// if user avail
		if($result->num_rows()>0 && $result->row()->email == $this->input->post('username') && $result->row()->password == $this->input->post('password'))
		{
			// set session
			$user_data=array(
				'patient_login' => true,
				'first_name' => $result->row()->first_name,
				'privilege' => $result->row()->privilege,
				'last_name' => $result->row()->last_name,
				'client_id' => $result->row()->client_id,
				'patient_id' => $result->row()->patient_id,
				'patient_code' => $result->row()->patient_code,
				'gender' => $result->row()->gender,
				'dob' => $result->row()->dob,
				'age' => $result->row()->age,
				'marital_status' => $result->row()->marital_status,
				'height' => $result->row()->height,
				'weight' => $result->row()->weight,
				'bmi' => $result->row()->bmi,
				'occupation' => $result->row()->occupation,
				'address_line1' => $result->row()->address_line1,
				'address_line2' => $result->row()->address_line2,
				'city' => $result->row()->city,
				'pincode' => $result->row()->pincode,
				'mobile_no' => $result->row()->mobile_no,
				'email' => $result->row()->email,
			);
			$this->session->set_userdata($user_data);
			
			// redirect to home
			redirect(base_url()."patient/patient/home");
			
		}else{
			// set flashdata for error msg
			$this->session->set_flashdata('client_login_error', '<div class="NewError1"><strong>Error!</strong> Invalid Username (or) Password  </div>');
			redirect(base_url()."patient/patient/login", "refresh");
		}
	}
	public function appointment_details($client_id,$patient_id) {
		$this->db->where('patient_id',$patient_id);
		$this->db->select('client_id,appointment_id,t_status,title,har_mob_no,har_email,start,appointment_from,end')->from('tbl_appointments');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function getnumVisit(){
		$where = array('patient_id' => $this->session->userdata('patient_id'), 'status'	=> 1);
		$this->db->select("count(patient_id) as tot_visit")->from('tbl_appointments');
		$this->db->where($where);
		$q = $this->db->get();
		$qrow = $q->row();
		return $qrow->tot_visit;
	}
	
	public function getnumDueVisit(){
		$where = array('patient_id' => $this->session->userdata('patient_id'), 'status'	=> 0);
		$this->db->select("count(patient_id) as tot_visit")->from('tbl_appointments');
		$this->db->where($where);
		$q = $this->db->get();
		$qrow = $q->row();
		return $qrow->tot_visit;
	}
	
	public function getCancel(){
		$where = array('patient_id' => $this->session->userdata('patient_id'), 'status'	=> 2);
		$this->db->select("count(patient_id) as tot_visit")->from('tbl_appointments');
		$this->db->where($where);
		$q = $this->db->get();
		$qrow = $q->row();
		return $qrow->tot_visit;
	}
	public function getTimeline($from_date,$to_date){	
		$dateRange = "start BETWEEN '".$from_date."%' AND '".$to_date."%'";
		$where = array('patient_id' => $this->session->userdata('patient_id'));
		$this->db->select("*")->from('tbl_appointments');
		$this->db->where($where);
		$this->db->where($dateRange, NULL, FALSE); 
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function getCaseNotes(){
		$this->db->select('*')->from('tbl_patient_case_notes')->where('patient_id', $this->session->userdata('patient_id'));
		$this->db->order_by("cn_date", "asc");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getProgressNotes(){
		$this->db->select('*')->from('tbl_patient_prog_notes')->where('patient_id', $this->session->userdata('patient_id'));
		$this->db->order_by("pn_date", "asc");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getRemark(){
		$this->db->select('*')->from('tbl_patient_remarks')->where('patient_id', $this->session->userdata('patient_id'));
		$this->db->order_by("remark_date", "asc");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getHostory(){
		$this->db->select('*')->from('tbl_patient_history')->where('patient_id', $this->session->userdata('patient_id'));
		$this->db->order_by("his_date", "asc");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getChef(){
		$this->db->select('*')->from('tbl_patient_chief_complaints')->where('patient_id', $this->session->userdata('patient_id'));
		$this->db->order_by("cc_date", "asc");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getPain(){
		$this->db->select('*')->from('tbl_patient_pain')->where('patient_id', $this->session->userdata('patient_id'));
		$this->db->order_by("pain_date", "asc");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getExam(){
		$this->db->select('*')->from('tbl_patient_examination')->where('patient_id', $this->session->userdata('patient_id'));
		$this->db->order_by("examn_date", "asc");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getMotor(){
		$this->db->select('*')->from('tbl_patient_motor_examination')->where('patient_id', $this->session->userdata('patient_id'));
		$this->db->order_by("mexamn_date", "asc");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getSexam(){
		$this->db->select('*')->from('tbl_patient_sensory_examination')->where('patient_id', $this->session->userdata('patient_id'));
		$this->db->order_by("sexamn_date", "asc");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getInvestigation(){
		$this->db->select('*')->from('tbl_investigation')->where('patient_id', $this->session->userdata('patient_id'));
		$this->db->order_by("inves_date", "asc");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getProvisional(){
		$this->db->select('*')->from('tbl_patient_prov_diagnosis')->where('patient_id', $this->session->userdata('patient_id'));
		$this->db->order_by("pd_date", "asc");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getGoal(){
		$this->db->select('*')->from('tbl_patient_goals')->where('patient_id', $this->session->userdata('patient_id'));
		$this->db->order_by("goal_date", "asc");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getTreatment(){
		$this->db->distinct();
		$this->db->select('tt.client_id,tt.treatment_id,tt.patient_id,tt.treatment_date,tt.treatments,tt.treatment_quantity,tt.treatment_price,tt.treatment_group_id,tt.bill_status,tt.staff_id,si.first_name,si.last_name,it.item_name,GROUP_CONCAT(it.item_name SEPARATOR " - ") AS itemName,GROUP_CONCAT(tt.treatment_quantity SEPARATOR " - ") AS treatmentQuantity,GROUP_CONCAT(tt.treatment_price SEPARATOR " - ") AS treatmentPrice,GROUP_CONCAT(si.first_name SEPARATOR " - ") AS staffName')->from('tbl_patient_treatment_techniques tt')->where('patient_id', $this->session->userdata('patient_id'))->group_by("tt.treatment_group_id");
		$this->db->join("tbl_staff_info si", "tt.staff_id=si.staff_id");
		$this->db->join("tbl_item it", "tt.treatments=it.item_id");
		$this->db->order_by("tt.treatment_date", "asc");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getInvoiceBill(){
		$this->db->select('*')->from("tbl_invoice_header")->where('patient_id',$this->session->userdata('patient_id'));
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getDoctorname() {
		$this->db->select('staff_id,first_name,last_name,staff_code,dr_color')->from('tbl_staff_info');
		$this->db->where('is_doctor', 1);
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	
	public function feedback_add(){
		$srate1 = $this->input->post('srate1');
		$srate2 = $this->input->post('srate2');
		$srate3 = $this->input->post('srate3');
		$srate4 = $this->input->post('srate4');
		$srate5 = $this->input->post('srate5');
		$srate6 = $this->input->post('srate6');
		$srate7 = $this->input->post('srate7');
		$srate8 = $this->input->post('srate8');
		$srate9 = $this->input->post('srate9');
		$srate10 = $this->input->post('srate10');
		$srate11 = $this->input->post('srate11');
		$srate12 = $this->input->post('srate12');
		$srate13 = $this->input->post('srate13');
		$srate14 = $this->input->post('srate14');
		$srate15 = $this->input->post('srate15');
		$srate16 = $this->input->post('srate16');
		$srate17 = $this->input->post('srate17');
		$srate18 = $this->input->post('srate18');
		$srate19 = $this->input->post('srate19');
		$srate20= $this->input->post('srate20');
		$srate21 = $this->input->post('srate21');
		$srate22 = $this->input->post('srate22');
		$srate23 = $this->input->post('srate23');
		$srate24 = $this->input->post('srate24');
		if($this->input->post('recommend') == ''){
			$recommend = '';
		}else{
			$recommend = $this->input->post('recommend');
		}
		
		$totalrate = ($srate1 +$srate2 +$srate3 +$srate4 +$srate5 +$srate6 +$srate7 +$srate8 +$srate9 +$srate10 +$srate11 +$srate12 +$srate13 +$srate14 +$srate15 +$srate16 +$srate17 +$srate18+$srate19 +$srate20+$srate21 +$srate22 +$srate23 +$srate24) / 24;
		
		$feedbackinfo = array(
			'client_id' => $this->session->userdata('client_id'),
			'staff_id' => $this->input->post('Consultant'),
			'patient_id' => $this->session->userdata('patient_id'),
			'visit_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('visitdate')))),
			'your_apoinment1' => $srate1,
			'your_apoinment2' => $srate2,
			'your_apoinment3' => $srate3,
			'your_apoinment4' => $srate4,
			'our_staff1' => $srate5,
			'our_staff2' => $srate6,
			'our_staff3' => $srate7,
			'our_staff4' => $srate8,
			'our_comun1' => $srate9,
			'our_comun2' => $srate10,
			'our_comun3' => $srate11,
			'our_comun4' => $srate12,
			'our_comun5' => $srate13,
			'our_comun6' => $srate14,
			'our_comun7' => $srate15,
			'our_comun8' => $srate16,
			'our_comun9' => $srate17,
			'our_comun9' => $srate18,
			'our_facility1' => $srate19,
			'our_facility2' => $srate20,
			'our_facility3' => $srate21,
			'satisfaction1' => $srate22,
			'satisfaction2' => $srate23,
			'satisfaction3' => $srate24,
			'total_rate' => $totalrate,
			'recommend' => $recommend
		);
		
		$this->db->insert('feedback',$feedbackinfo);
		return true;
	}
	
	public function getLogo(){
		$where = array('client_id' => $this->session->userdata('client_id'));
		$this->db->select("*")->from('tbl_client');
		$this->db->where($where);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function getExecriseList(){
		$where = array('client_id' => $this->session->userdata('client_id'),'patient_id' => $this->session->userdata('patient_id'));
		$this->db->select("*")->from('save_chart');
		$this->db->group_by("chard_no");
		$this->db->where($where);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function getExecrise($chard_no){
		$where = array('chard_no' => $chard_no);
		$this->db->select("*")->from('save_chart');
		$this->db->where($where);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	 	public function editSexamn($patient_id,$sexamn_id)
	{
		$where = array('patient_id' => $patient_id, 'sexamn_id' => $sexamn_id);
		$this->db->select('*')->from('tbl_patient_sensory_examination')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
		public function editPatientinfo($patient_id = '')
	{	
		$where=array('patient_id' => $patient_id);
		$this->db->select('*')->from('tbl_patient_info')->where($where);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	
}