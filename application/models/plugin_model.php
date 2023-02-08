<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plugin_model extends CI_Model {

    public function client_det($client_id) {
		$where=array('client_id' => $client_id);
		$this->db->select('*')->from('tbl_client')->where($where);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	 public function staff_det($client_id) {
		$where=array('client_id' => $client_id, 'is_doctor' => 1);
		$this->db->select('*')->from('tbl_staff_info')->where($where);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function add_appointment() {
		$slot = $this->input->post('slot');
		$formated_date = date('Y-m-d',strtotime($this->input->post('apt_date')));
		$time = $this->input->post('timings');
		$starttime = date("H:i:s",strtotime($time));
		if($slot == '' || $slot == false){
		 $slot = '30';
		} else {
		 $slot = $slot;
		}
		$add = '+ '.$slot.'minutes';
		$endTime = date('H:i:s', strtotime($starttime.''.$add));
		$date1=$formated_date.' '.$starttime;
		$date2=$formated_date.' '.$endTime;
		
		$this->db->where('mobile_no',$this->input->post('mobile_no'));
		$this->db->select('patient_id')->from('tbl_patient_info');
		$res = $this->db->get();
		$amount =  $this->input->post('amount');
		if($res->result_array() != false){
			$patientid = $res->row()->patient_id;
		} else {
		   $data = array(
				    'client_id'=>$this->session->userdata('client_id'),
					'appoint_date' => date('Y-m-d'),
					'first_name' => $this->input->post('name'),
					'mobile_no' => $this->input->post('mobile_no'),
					'email' => $this->input->post('email'),
					'patient_code' => 'PG'.ucfirst(substr($this->input->post('name'),0,1)).'/' . date('my') . '/',
				);
				$this->db->insert('tbl_patient_info',$data);
				$patientid = $this->db->insert_id();
		}
		
		$data = array(
			'title' => $this->input->post('name'),
			'start' => $date1,
			'end' => $date2,
			'patient_id' => $patientid,
			'appointment_from' => date('Y-m-d',strtotime($this->input->post('apt_date'))),
			'appointment_to' => date('Y-m-d',strtotime($this->input->post('apt_date'))),
			'client_id' => $this->input->post('client_id'),
			't_status' => 2,
		);
		print_r($data);
		
		
		$this->db->insert('tbl_appointments',$data);
		return $this->db->insert_id();
	}




}
?>