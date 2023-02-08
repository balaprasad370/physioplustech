<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advance_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		// load required models
		//$this->load->model(array('mail_model','registration_model'));
	}
	
	public function addAdvance() {
		$bill_no=$this->generate_code();
		$advanceInfo = array(
			'client_id' => $this->session->userdata('client_id'),
			'bill_no' => $bill_no,
			'patient_id' => $this->input->post('patient_id'),
			'advance_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('advance_date')))),
			'payment_mode' => $this->input->post('payment_mode'),
			'cheque_no' => $this->input->post('cheque_no'),
			'cheque_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('cheque_date')))),
			'bank' => $this->input->post('bank'),
			'advance_amount' => $this->input->post('advance_amount'),
			'notes' => $this->input->post('notes'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
		
		$this->db->insert('tbl_patient_advance', $advanceInfo);
		
		$data = array('advance_id' => $this->db->insert_id(), 'advance_amount' => $this->input->post('advance_amount'));
		if($this->db->insert_id()){
			return $data;	
		} else {
			return false;	
		}
	}
	
	public function advanceEdit($advance_id) {
		
		$advanceInfo = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $this->input->post('patient_id'),
			'advance_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('advance_date')))),
			'payment_mode' => $this->input->post('payment_mode'),
			'cheque_no' => $this->input->post('cheque_no'),
			'cheque_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('cheque_date')))),
			'bank' => $this->input->post('bank'),
			'advance_amount' => $this->input->post('advance_amount'),
			'notes' => $this->input->post('notes'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
		
		$where = array('advance_id' => $advance_id);
		$this->db->where($where);
		$this->db->update('tbl_patient_advance',$advanceInfo);
		return $advance_id;
	}
	
	//fetch records from user
	public function editAdvance($advance_id)
	{	
		$where=array('advance_id' => $advance_id);
		$this->db->select('*')->from('tbl_patient_advance')->where($where);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	// Delete concession group
	public function deleteAdvance($advance_id){
		
		$where = array('advance_id' => $advance_id);
		$this->db->where($where);
		$this->db->delete('tbl_patient_advance');
		
	}
	
	// fetch advance balance
	public function advanceBalance($patient_id){
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$where = array('patient_id' => $patient_id);
		$this->db->select('sum(advance_amount) as totaladvance')->from('tbl_patient_advance')->where($where);
		$query = $this->db->get();
		$advanceData = $query->row_array();
		$advanceData1 = ($query->num_rows() > 0) ? $advanceData['totaladvance'] : 0;
		$where1 = array('ih.patient_id' => $patient_id, 'pt.payment_mode' => 'Advance');
		$this->db->select('sum(pt.paid_amt) as totalpaid')->from('tbl_invoice_header ih')->where($where1);
		$this->db->join('tbl_invoice_payments pt','ih.bill_id = pt.bill_id');
		$query1 = $this->db->get();
		$paymentData = $query1->row_array();
		$paymentData1 = ($query1->num_rows() > 0) ? $paymentData['totalpaid'] : 0;
		 
		return (($advanceData1 - $paymentData1) > 0) ? number_format($advanceData1 - $paymentData1,2,'.','') : 0;
	}
	
	public function invWithAdvanceBal($patient_id){
		$data = array();
		$advWhere = array('patient_id' => $patient_id);
		$this->db->select('advance_date')->from('tbl_patient_advance')->where($advWhere);
		$advdate = $this->db->get();
		$date = $advdate->row_array();
		
		$this->db->select('sum(advance_amount) as totaladvance')->from('tbl_patient_advance')->where($advWhere);
		$advQuery = $this->db->get();
		$advanceData = $advQuery->row_array();
		$totalAdvance = ($advQuery->num_rows() > 0) ? number_format($advanceData['totaladvance'],2,'.','') : 0;
		$where = array('patient_id' => $patient_id,'payment_mode' => 'Advance');
		$this->db->select('bill_id')->from('tbl_invoice_header')->where($where);
		$res = $this->db->get();
		if($res->result_array() != false ){
		$bill_id = $res->row()->bill_id;
		$invWhere = array('bill_id' => $bill_id,'payment_mode' => 'Advance');
		$this->db->select('sum(paid_amt) as totalpaid')->from('tbl_invoice_payments')->where($invWhere);
		$invQuery = $this->db->get();
		$invoiceData = $invQuery->row_array();
		$totalPaid = ($invQuery->num_rows() > 0) ? number_format($invoiceData['totalpaid'],2,'.','') : 0;
		} else {
			$totalPaid =0.00;
		}
		//$advanceBalance = (($totalAdvance - $totalPaid) > 0) ? number_format($totalAdvance - $totalPaid,2,'.','') : 0;
		$advanceBalance = (($totalAdvance - $totalPaid) ) ? number_format($totalAdvance - $totalPaid,2,'.','') : 0;
		$data['totalAdvance'] = $totalAdvance;
		$data['totalPaid'] = $totalPaid;
		$data['advanceBalance'] = $advanceBalance;
		$data['advanceDate'] = $date['advance_date'];
		return $data;
	}
	
	public function Advancepri($advance_id){
		$this->db->select('pa.payment_mode,pa.bill_no,pa.client_id,pa.advance_id,pa.patient_id,pi.age,pi.address_line1,pi.address_line2,pi.city,pi.mobile_no,pi.email,pi.patient_code,pi.first_name,pi.last_name,pa.advance_date,pa.advance_amount,pa.notes');
		$this->db->from("tbl_patient_advance pa");
		$this->db->join("tbl_patient_info pi", "pa.patient_id=pi.patient_id");
		$this->db->where('pa.client_id',$this->session->userdata('client_id'));
		$this->db->where('pa.advance_id',$advance_id);
		$query = $this->db->get();
		$data= ($query->num_rows() > 0) ? $query->row_array() : false;
		
		
		return $data;
		
		
		
		
		}
		
	public function generate_code() {
		$string  = 'AB' ;
		$this->db->select('bill_no')->from('tbl_patient_advance')->where('client_id',$this->session->userdata('client_id'))->like('bill_no', $string, 'after'); 
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $string . ($query->num_rows() + 1);
		} else {
			return $string . '1';
		}
	}
	
} 