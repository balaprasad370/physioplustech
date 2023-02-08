<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newsletter_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('mail_model');
	}
	
	//add newsletter
	public function add_newsletter() {
		
		$newsletter_info = array(
			'email' => $this->input->post('email'),
			'status' => 1,
		);
		$this->db->insert('tbl_newsletter_subscription', $newsletter_info);
		// create email template
		$subscriptionMessage = $this->mail_model->subscriptionTemplate();
		// mail config
		$subscriberMailConfig = array('to' => $this->input->post('email'), 'subject' => 'Welcome to Physio Plus Tech', 'message' => $subscriptionMessage);
		// send mail
		$this->mail_model->sendEmail($subscriberMailConfig);
		return $this->db->insert_id();
	}
	
		public function get_email_add() {
		
	
			$where = array('client_id' => $this->session->userdata('client_id'));
		 $this->db->select('email')->from('tbl_patient_info')->where($where);
		
		$query=$this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result_array() : false;
		
	
	}
			public function set_month_limit() {
		
	$info = array(
			
			'month_newsletter' => 1,
			
		);
		
		$where = array('client_id' => $this->session->userdata('client_id'));
		$this->db->where($where);
		$this->db->update('tbl_client',$info);
		$data['client_id']=$this->session->userdata('client_id');
		return $data;
		
	
	}
		public function get_month_limit() {
		
	$this->db->select('month_newsletter')->from('tbl_client')->where('client_id',$this->session->userdata('client_id')); 
		$query = $this->db->get();
		return $query;
	
	}
	
	
} 