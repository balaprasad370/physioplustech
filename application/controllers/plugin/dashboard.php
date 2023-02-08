<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

   public function __construct() {
		parent::__construct();
		$this->load->model(array('appoinment_model','mail_model'));
		$this->load->library('session'); 
		
	}
	public function index()
	{
			$c_id = $this->uri->segment(4);
			$val = explode('-',$c_id);
			$this->db->where('first_name',str_replace('%20',' ',$val[1]));
			$this->db->select('*')->from('tbl_client')->where('clinic_name',str_replace('%20',' ',$val[0]));
			$result=$this->db->get();
			if($result->num_rows() > 0)
			{	
				$user_data=array(
					'client_id' => $result->row()->client_id,
					'clinic_name' => $result->row()->clinic_name,
				);
				$this->session->set_userdata($user_data);
			}
		   $data['clinic_details'] = $this->appoinment_model->clinic_details($this->session->userdata('client_id'));
		   $data['sch_slot'] = $this->appoinment_model->sch_slot($this->session->userdata('client_id'));
		   $data['sch_times'] = $this->appoinment_model->sch_times($this->session->userdata('client_id'));
		   $this->load->view('plugin/appointment',$data); 
		 
	}
	
	public function add_rand(){
		    $app_date =  $this->input->post('doa');
		    $name=$this->input->post('name');
			$email=$this->input->post('email');
			$mobile=$this->input->post('mobile');
			$doa=$this->input->post('doa');
			$slot=$this->input->post('slot'); 
			$repl=str_replace('/','-',$doa);
			$c_id=$this->session->userdata('client_id');
			$formated_date=date('Y-m-d',strtotime($repl));
			$time = $this->input->post('time');
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
			
			$this->load->helper('string');
			$rand = random_string('numeric',6);
			$this->db->where('mobile_no',$mobile);
			$this->db->where('email',$email);
			$this->db->select('patient_id')->from('tbl_patient_info');
			$res = $this->db->get();
			$amount =  $this->input->post('amount');
			
			if($res->result_array() != false){
				$patientid = $res->row()->patient_id;
			} else {
				$data = array(
				    'client_id'=>$this->session->userdata('client_id'),
					'appoint_date' => date('Y-m-d'),
					'first_name' => $name,
					'mobile_no' => $mobile,
					'email' => $email,
					'verify_code' => $rand,
					'patient_code' => 'PG'.ucfirst(substr($this->input->post('name'),0,1)).'/' . date('my') . '/',
				);
				$this->db->insert('tbl_patient_info',$data);
				$patientid = $this->db->insert_id();
			} 
			$doa = $this->input->post('doa');
			$c_id=$this->session->userdata('client_id');			
			$result = $this->appoinment_model->appointment_add($mobile,$patientid,$name,$date1,$date2,$email,$doa,$rand,$amount);
			$data['appointment_id'] = '64342';
			
			$this->db->where('client_id',$this->session->userdata('client_id'));
			$this->db->select('total_sms_limit,sms_count')->from('tbl_client');
			$res = $this->db->get();
			if($res->result_array() != false){
			$total_sms_limit = $res->row()->total_sms_limit;
			$sms_count = $res->row()->sms_count;
				if( $total_sms_limit > $sms_count ) {
					$result1=$this->appoinment_model->smsverify($c_id,$mobile,$rand); 
				} 
				$result1=$this->appoinment_model->verify_email($name,$email,$rand,$c_id);
			} else {
				   $result1=$this->appoinment_model->verify_email($name,$email,$rand,$c_id);
			}
			
			$data['rand'] = $rand;
			$data['mobile'] = $mobile;
			$patient_name = $name; 
			$data['amount'] = $this->input->post('amount');
			$data['apt'] =  $this->input->post('appoint');
			$this->load->view('plugin/verification',$data); 
	}
	
	public function resend()
	{
		$data['mobile'] = $this->uri->segment(4);
		$data['rand'] = $this->uri->segment(5);
		$mobile = $this->uri->segment(4);
		$rand = $this->uri->segment(5);
		$data['amount'] = $this->uri->segment(6);
		$c_id =$this->session->userdata('client_id');
		$result=$this->appoinment_model->smsverify($c_id,$mobile,$rand); 
		$this->load->view('plugin/verification1',$data);	  
	}  
	public function verify(){
		$rand = $this->input->post('rand');
		$random = $this->input->post('random');
		$amt = $this->input->post('amt');
		$apt = $this->input->post('apt_setting');
		$c_id = $this->session->userdata('client_id');
		if($rand == $random && $apt == 'paid'){
			redirect( base_url() .'plugin/dashboard/add_app'.$c_id.'/'.$amt);	
		}
		elseif($rand == $random && $apt == 'free'){
			redirect( base_url() .'plugin/dashboard/success' );	
		}
		else {
			redirect( base_url() .'plugin/dashboard/remove' );	
	    }
	}
	
	public function add_app()
	{
		$data['client_id']=$this->session->userdata('client_id');
		$data['amount'] = $this->uri->segment(4);
		$data['app_id'] = $this->uri->segment(5);
		$this->load->view('plugin/add_pay',$data);
	}
	public function remove()
	{
		$this->db->order_by("appointment_id", "desc");
		$this->db->limit(1);
		$this->db->select('appointment_id')->from('tbl_appointments');
		$result = $this->db->get();	
		$app_id = $result->row()->appointment_id;
		$result=$this->appoinment_model->remove_app($app_id);
		$this->load->view('plugin/failure');
	}
	public function success() {
		$this->db->limit(1);
		$this->db->order_by('appointment_id','desc');
		$this->db->select('patient_id,title,start,end,appointment_from,appointment_to,har_mob_no,har_email')->from('tbl_demoappointments');
		$res = $this->db->get();
		$client_id = $this->session->userdata('client_id');
		$patient_id = $res ->row()->patient_id;
		$name = $res ->row()->title;
		$start = $res ->row()->start;
		$end = $res ->row()->end;
		$har_mob_no = $res ->row()->har_mob_no;
		$har_email = $res ->row()->har_email;
		$appointment_to = $res ->row()->appointment_to;
		$appointment_from = $res ->row()->appointment_from;
		
		$data = array(
			'client_id' =>  $client_id,
			'patient_id' => $patient_id, 
			'title' =>  $name,
			'start' => $start,
			'end' => $end,
			't_status' => '1',
			'app' => '1',
			'appointment_from' => $appointment_from,
			'appointment_to' => $appointment_to,
			'har_mob_no' => $har_mob_no,
			'har_email' => $har_email 
		);
		$this->db->insert('tbl_appointments',$data);
		$id = $this->db->insert_id();
		
		$this->db->where('client_id',$client_id);
		$this->db->select('token')->from('tbl_client');
		$query = $this->db->get();
		$token = $query->row()->token;
		define( 'API_ACCESS_KEY', 'AAAAHhxim7Y:APA91bGeFWJJ6ZHdYqoxNwl7e8C7A-AvjlaDCAg43hfEhNzPVqfn1tR-Bg8y6vB0SKDaqgqnx07JyLaZiigDcJ482Tkk_nPBEhsqkX88sYHTRYLZnunznnU-Mexyj7VnDbgOn_oAaXc7' );
		$app_dat = date('d-m-Y h:i a',strtotime($start));
		$title = 'Appointment Request';
		$msg = 'Patient Name :'.$name.'
Mobile No : '.$har_mob_no.'
Date : '.$app_dat;
		$data = array("to" => $token , "priority"=>"high",
						  "notification" => array( "title" => $title , "body" => $msg,"icon" => "icon.png","vibrate"   => 1,"sound" => "bingbong.aiff"));                                                                    
		$data_string = json_encode($data); 
        $headers = array
		(
			 'Authorization: key=' . API_ACCESS_KEY, 
			 'Content-Type: application/json'
		);                                                                                 
		$ch = curl_init();  
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );                                                                  
		curl_setopt( $ch,CURLOPT_POST, true );  
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, $data_string);                                                                  
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);																													 
		$result = curl_exec($ch);
        if ($result === FALSE) {
			die('Curl failed: ' . curl_error($ch));
		}
		curl_close ($ch);
		
		$data['res'] =  $res;
		$this->load->view('plugin/success',$data);
	}
	
	public function logout()
	{
		redirect(base_url().'plugin/dashboard/sample');
	}
	public function appointment_charge(){
		$c_id = $this->uri->segment(4);
		$app_id = $this->uri->segment(5);
		$this->db->where('appointment_id',$app_id);
		$this->db->select('patient_id,title,amount,start,end,appointment_from,appointment_to,har_mob_no,har_email')->from('tbl_demoappointments');
		$res = $this->db->get();
		$patient_id = $res ->row()->patient_id;
		$name = $res ->row()->title;
		$start = $res ->row()->start;
		$end = $res ->row()->end;
		$har_mob_no = $res ->row()->har_mob_no;
		$har_email = $res ->row()->har_email;
		$appointment_to = $res ->row()->appointment_to;
		$appointment_from = $res->row()->appointment_from;
		$amount = $res->row()->amount; 
		
		$data = array(
			'client_id' =>  $c_id,
			'patient_id' => $patient_id, 
			'title' =>  $name,
			'start' => $start,
			'end' => $end,
			't_status' => '1',
			'app' => '1',
			'appointment_from' => $appointment_from,
			'appointment_to' => $appointment_to,
			'har_mob_no' => $har_mob_no,
			'har_email' => $har_email 
		);
		$this->db->insert('tbl_appointments',$data);
		$id = $this->db->insert_id();
		
	    $order = 'Online Appointment';
		$this->appoinment_model->det_app($name,$patient_id,$har_email,$id,$amount,$c_id);
		$this->mail_model->sentpaypal($c_id,$amount,$order);  
		$this->mail_model->sentapp_paypal_patient($name,$har_email,$c_id,$amount);
		$data['res'] =  $res;
		$this->load->view('plugin/success',$data); 
	}
	public function demo(){
		$this->db->where('client_id');
		$this->db->select('peak_from,peak_to')->from('tbl_settings');
		$res = $this->db->get();
		$peak = $res->row()->peak_from;
		$peak_to = $res->row()->peak_to;
		$arr = explode(',',$peak);
		$arr1 = explode(',',$peak_to);
		array_push($arr,$arr1);
		
	}
	public function verified_mail(){
		$apt = $this->input->post('apt_setting');
		$apt_id = $this->input->post('appointment_id');
		$amt = $this->input->post('amount');
		$c_id = $this->session->userdata('client_id');
		
		if($apt == 'paid'){
			redirect(base_url().'plugin/dashboard/add_app/'.$amt.'/'.$apt_id); 
		} else {
			redirect(base_url().'plugin/dashboard/success/'.$apt_id); 
		}
	}
	public function test() {
		    $this->db->where('client_id',$this->session->userdata('client_id'));
			$this->db->select('total_sms_limit,sms_count')->from('tbl_client');
			$res = $this->db->get();
			$total_sms_limit = $res->row()->total_sms_limit;
			$sms_count = $res->row()->sms_count;
			if( $total_sms_limit > $sms_count ) {
			} else {
				$result=$this->appoinment_model->verify_email($patient_name,$email,$rand);
			}
	}
	
		
	
		
}
