<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Telehealthroom extends CI_Controller {


		public function __construct() {
		parent::__construct();
		$this->load->model(array('service_model','common_model','patient_model', 'staff_model', 'schedule_model', 'settings_model','appoinment_model'));
	}


	public function join()
	{
		$appoint_id=$this->input->post('appoint_id');
		$otp = $this->input->post('otp');
		$invite = $this->input->post('invite');
		$chat_room=$this->appoinment_model->verify_otp($appoint_id,$otp);
		if($chat_room == false){
        $data["appoint_id"]=$appoint_id;
        $data["error_msg"]="Wrong OTP!! Try again!!";
		$this->load->view('frontend/verify_otp',$data);
		}else{
			$data['chatroom']=$chat_room;
			if($invite == "1"){
			 $data["appoint_id"]=$appoint_id;
              $data['patient_name']=$this->appoinment_model->get_staff_name($appoint_id);
			  $this->load->view('frontend/chat_room',$data);
			}else{
				$data['chatroom']=$chat_room;
				$data["appoint_id"]=$appoint_id;
				$this->db->where('ai.appointment_id',$appoint_id);
				$this->db->select('ci.clinic_name')->from('tbl_appointments ai');
				$this->db->join('tbl_client ci','ci.client_id=ai.client_id');
				$res = $this->db->get();
				$data['clinic_name'] = $res->row()->clinic_name;
				$data['detail']=$this->appoinment_model->get_patient_name($appoint_id);
				$this->load->view('frontend/add_sign',$data);  
		    }
			
		}

     }


}