<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chatroom extends CI_Controller {


		public function __construct() {
		header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
		parent::__construct();
		$this->app_access->client();
		$this->load->model(array('service_model','common_model','patient_model', 'staff_model', 'schedule_model', 'settings_model','appoinment_model'));
	}


		public function join()
	{
		$data['page_name'] = 'chatroom';
		$id = $this->uri->segment(4);
		$appoint_id = $this->uri->segment(4);
		$patient_id=$this->uri->segment(5);
		$chat_room=$this->uri->segment(6);
        $otp=$this->generateNumericOTP(6);
		$this->appoinment_model->update_otp($appoint_id,$otp);
		$this->patient_model->send_otp($patient_id,$otp,$appoint_id);
		$data['appoint_id'] = $appoint_id;
		$data['chatroom']=$chat_room;
		$this->load->view('client/chat_room',$data);

     }


// Function to generate OTP 
function generateNumericOTP($n) { 

    $generator = "1357902468"; 
  
    $result = ""; 
  
    for ($i = 1; $i <= $n; $i++) { 
        $result .= substr($generator, (rand()%(strlen($generator))), 1); 
    } 
  
    // Return result 
    return $result; 
} 
}