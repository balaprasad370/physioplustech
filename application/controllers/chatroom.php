<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chatroom extends CI_Controller {


		public function __construct() {
		parent::__construct();
		$this->load->model(array('service_model','common_model','patient_model', 'staff_model', 'schedule_model', 'settings_model','appoinment_model'));
	}


		public function join()
	{
		$appoint_id=$this->input->post('appoint_id');
		$otp = $this->input->post('otp');
		$chat_room=$this->appoinment_model->verify_otp($appoint_id,$otp);
		if($chat_room == false){
        $data["appoint_id"]=$appoint_id;
        $data["error_msg"]="Wrong OTP!! Try again!!";
		$this->load->view('frontend/verify_otp',$data);
		}else{
			$data['chatroom']=$chat_room;
			$this->load->view('frontend/chat_room',$data);
		}

     }


}