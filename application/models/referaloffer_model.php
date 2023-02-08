<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Referaloffer_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function add_referral()
	  {
		$data = array(
			'client_id' => $this->session->userdata('client_id'),
			'referral_name' => $this->input->post('referral_name'),
			'email' => $this->input->post('email'),
			'mobile_no' => $this->input->post('mobile_no'),
			'is_physio' => $this->input->post('is_physio'),
			'referral_code' => $this->generate_code(),
			'referral_sub_code' => $this->sub_generate_code()
		   
		);
		
		$this->db->insert('tbl_referaloffer', $data);
		
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('*');
		$this->db->from("tbl_client");
		$query = $this->db->get();
		$first_name = $query->row()->first_name;
		
			$email =$this->input->post('email');
			$url ='https://www.physioplustech.in/registration';
		$template = '<div style="background: #87CEFA;-ms-flex:0 0 83.333333%;flex:0 0 83.333333%;max-width:83.333333%;
position:relative;width:100%;min-height:1px;padding-right:10px;padding-left:15px;">
&nbsp;&nbsp;<img src="https://www.physioplustech.in/images/physio-tech.png" style="display: block;
  margin-left: auto;
  margin-right: auto;">

 <h3 style="text-align:center!important;font-size: 28px;
  font-weight: 900;
  margin-bottom: 28px;
  letter-spacing: 1px;color:white;font-family:cursive;">Join & Earn RS.1000 now</h3>
 <p style="padding:4px;margin-bottom: 30px;text-align:center;font-size:18px;font-family:cursive;">Physio Plus Tech is a great Platform for Physiotherapists to Document our practice & Manage our clinic.
 with this software and mobile app, I can digitalize my patient records, automate my clinic flow with financial & clinical statistics
 without any extra efforts.sending exercises & patient followup has also become very easy. </p>
  <p style="padding-top:4px; margin-bottom: 30px;text-align:center;font-size:18px;font-family:cursive;">I am sure you will also benefit from such a good software. signup now for free @ <a href="'.$url.'" style="background-color:#9370DB;
  position: relative;
  z-index: 1;
  padding: 6px 6px;
  border-radius: 20px;
  color:white;text-align:center;color:white;">Sign Up</a></p>
  <p style="padding-top:4px; margin-bottom: 30px;text-align:center;font-size:18px;font-family:cursive;">We both will get <font style="position: relative;
  z-index: 1;
  padding: 6px 6px;
  border-radius: 20px;
  text-align:center;color:#FF1493;">Rs.50</font> in our account once you signup and if you make a purchase for one year package we both will get <font style="position: relative;
  z-index: 1;
  padding: 6px 6px;
  border-radius: 20px;
  text-align:center;color:#FF1493;">Rs.1000</font> in our
 account.<br><br>For more information visit : physioplustech.in</p>
     
      <p style="padding-top:4px; margin-bottom: 30px;font-size:18px;font-family:cursive;">
  Thanks,</p><p style="font-size:18px;font-family:cursive;">'.$first_name.'</p>	  
  </div>
  ';
  print_r($template);
		$this->email->to($email);
		$this->email->subject('Referral Notification');
		$this->email->message($template);
		$this->email->send(); 
		return true;
		
	}
	 public function generate_code() {
		$string  = 'RPC' .$this->session->userdata('client_id');
		//echo $string;
		return $string;
	}
	public function sub_generate_code() {
		$string  = 'RPC' .$this->session->userdata('client_id').'/';
		$this->db->select('referral_sub_code')->from('tbl_referaloffer')->where('client_id',$this->session->userdata('client_id'))->like('referral_sub_code', $string, 'after'); 
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $string . ($query->num_rows() + 1);
		} else {
			return $string . '1';
		}
	}
	public function view(){
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('*');
		$this->db->from("tbl_referaloffer");
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function referal_email($id,$client_id) 
       {
	    $this->email->from('no-reply@physioplustech.com', 'Physio Plus Tech');
		$this->db->select('*')->from('tbl_referaloffer')->where('client_id',$client_id);
		$res = $this->db->get();
		$email = $res->row()->email;
		$referral_name = $res->row()->referral_name;
		$referral_sub_code =$res->row()->referral_sub_code;
		$c_id = $res->row()->client_id;
		
		$this->db->select('*')->from('tbl_client')->where('client_id',$c_id);
		$query = $this->db->get();
		$client_name = $query->row()->first_name;
		
		
		$date = date('d/m/Y');
		$url = base_url().'registration/';
		
		
		$template = '<div style="background: #f9f9f9;-ms-flex:0 0 83.333333%;flex:0 0 83.333333%;max-width:83.333333%;
position:relative;width:100%;min-height:1px;padding-right:15px;padding-left:15px;">
&nbsp;&nbsp;<img src="https://www.physioplustech.in/images/physio-tech.png" style="display: block;
  margin-left: auto;
  margin-right: auto;">

 <h3 style="text-align:center!important;font-size: 28px;
  font-weight: 900;
  margin-bottom: 28px;
  letter-spacing: 1px;">Join the referral program & Earn RS.1000 now</h3>
 
  <h4 style="text-align:center!important;font-size: 24px;
  font-weight: 500;
  margin-bottom: 28px;
  letter-spacing: 1px;">Refer a Physio friend & Encourage Documentation in his/her Practice.</h4>
  
  <p style="margin-bottom: 30px;text-align:center;">'.$referral_name.' of '.$email.' has requested you to give testimonial of her/him performance and excellence in the profession.kindly click below to enter your testimonial write your testimonial.Your Referral Code is '.$referral_sub_code.'</p>
  <h4>Referral name : '.$client_name.'</h4>
              <center><a href="'.$url.'" style="background-color: #F97794;
  position: relative;
  z-index: 1;
  padding: 12px 32px;
  border-radius: 30px;
  color:white;text-align:center;">Sign Up</a></center>&nbsp;&nbsp;
  </div>';
  print_r($template);
		/* $this->email->to($email);
		$this->email->subject('Referral Notification');
		$this->email->message($template);
		$this->email->send();  */
		
}
public function name_check($mobile){
		//$this->db->where('client_id', $this->session->userdata('client_id'));
	    $this->db->where('username',$mobile);
		$this->db->select('client_id')->from('tbl_client');
		$res = $this->db->get();
		if($res->result_array() != false){
			$user = $res->row()->client_id;
		}else {
			$user = '';
		}
		return $user;
	}
}