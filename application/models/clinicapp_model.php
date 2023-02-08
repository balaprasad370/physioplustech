<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clinicapp_model extends CI_Model {
	public function user_login() {
		$this->db->where('username',$_GET['email']);
		$this->db->where('password',$_GET['password']);
		$this->db->select('client_id,plan,first_name,clinic_name,branch_name,parent_client_id')->from('tbl_client');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function delete_notification($notification_id) {
		$this->db->where('notification_id',$notification_id);
		$this->db->delete('tbl_client_notification');
	    return $notification_id;
	}
	 public function prescription_details() {
		$client_id = $_GET['branch'];
		$patient_id = $_GET['patient_id'];
		$this->db->where('patient_id',$patient_id);
		$this->db->where('client_id',$client_id);
		$this->db->select('*')->from('tbl_appointments');
		$this->db->order_by('appointment_from','desc');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	 }
	 public function invest_document() {
		$client_id = $_GET['branch'];
		$patient_id = $_GET['patient_id'];
		$this->db->where('patient_id',$patient_id);
		$this->db->where('client_id',$client_id);
		$this->db->select('*')->from('tbl_investigation');
		$this->db->order_by('inves_date','desc');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	 }
	 public function objects() {
		$this->db->where('patient_id',$_GET['patient_id']);
		$this->db->select('*')->from('tbl_patient_prog_notes');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
   }
    public function assess() {
		$this->db->where('patient_id',$_GET['patient_id']);
		$this->db->select('*')->from('tbl_patient_remarks');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
   }
   public function plan() {
		$this->db->where('patient_id',$_GET['patient_id']);
		$this->db->select('*')->from('tbl_soap_plan');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
   }
	 public function clinical_notes() {
		$client_id = $_GET['branch'];
		$patient_id = $_GET['patient_id'];
		$this->db->where('patient_id',$patient_id);
		$this->db->where('client_id',$client_id);
		$this->db->select('*')->from('tbl_patient_case_notes');
		$this->db->order_by('cn_date','desc');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	 }
	 public function patient_details() {
		$client_id = $_GET['branch'];
		$this->db->where('client_id',$client_id);
		$this->db->select('first_name,last_name,patient_id,age')->from('tbl_patient_info');
		$this->db->order_by('appoint_date','desc');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	 }
	  public function appointment_list() {
		$client_id = $_GET['branch'];
		$this->db->where('ai.client_id',$client_id);
		$this->db->where('ai.status',0);
		$this->db->where('ai.t_status !=',1);
		$this->db->select('ai.appointment_from,ai.title,ai.end,ai.appointment_id,ai.patient_id,pi.gender')->from('tbl_appointments ai');
		$this->db->select("DATE_FORMAT( ai.start, '%d-%m-%Y   %h:%i %p') as start",      FALSE );
		$this->db->join('tbl_patient_info pi','ai.patient_id = pi.patient_id');
		$this->db->order_by('appointment_from','desc');
		$query = $this->db->get();    
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	 }
	 public function appointment_details() {
		$client_id = $_GET['branch'];
		$id = $_GET['appointment_id'];
		$this->db->where('client_id',$client_id);
		$this->db->where('appointment_id',$id);
		$this->db->select('*')->from('tbl_appointments');
		$query = $this->db->get();    
		return ($query->num_rows() > 0) ? $query->result_array() : false ; 
	 }
	 public function cancelappointment_list() {
		$client_id = $_GET['branch'];
		$this->db->where('ai.client_id',$client_id);
		$this->db->where('ai.status','1');  
		$this->db->select('ai.appointment_from,ai.title,ai.end,ai.appointment_id,ai.patient_id,pi.gender')->from('tbl_appointments ai');
		$this->db->select("DATE_FORMAT( ai.start, '%d-%m-%Y   %h:%i %p') as start",      FALSE );
		$this->db->join('tbl_patient_info pi','ai.patient_id = pi.patient_id');
		$this->db->order_by('appointment_from','desc');
		$query = $this->db->get();  
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	 }
	 public function appointment_order(){  
		   $client_id = $_GET['branch'];
		   $this->db->where('ai.client_id',$client_id);
		   $this->db->where('ai.status','0');
		   $this->db->where('ai.t_status !=',1);
		   $this->db->select('ai.appointment_from,count(ai.appointment_id) as apt')->from('tbl_appointments ai');
		   $this->db->join('tbl_patient_info pi','ai.patient_id = pi.patient_id');
		   $this->db->group_by('ai.appointment_from');
		   $this->db->order_by('ai.appointment_from','desc');
		   $query = $this->db->get();
		   return ($query->num_rows() > 0) ? $query->result_array() : false ;
	
	 }
	 public function bill_list(){
		   $arr = array();
		   $client_id = $_GET['branch'];
		   $this->db->where('iv.client_id',$client_id);
		   $this->db->select('pi.patient_id,iv.bill_id,iv.bill_no,iv.treatment_date,pi.first_name,pi.last_name,iv.net_amt,iv.paid_amt,iv.bill_status')->from('tbl_invoice_header iv');
		   $this->db->join('tbl_patient_info pi','iv.patient_id = pi.patient_id');
		   $this->db->order_by('iv.treatment_date','desc');
		   $this->db->where('pi.episode_status !=','1');
		   $this->db->where('iv.bill_status !=','2');
		   $query = $this->db->get();
		   return ($query->num_rows() > 0) ? $query->result_array() : false ;
	
	 }
	  public function expense_list(){
		   $arr = array();
		   $client_id = $_GET['branch'];
		   $this->db->order_by('bill_id','desc');
		   $this->db->where('client_id',$client_id);
		   $this->db->select('*')->from('tbl_expanse');
		   $this->db->group_by('bill_no');
		   $query = $this->db->get();
		   return ($query->num_rows() > 0) ? $query->result_array() : false ;
	
	 }
	 public function bill_order() {
		   $client_id = $_GET['branch'];
		   $this->db->where('iv.client_id',$client_id);
		   $this->db->select('iv.treatment_date,count(iv.bill_id) as tot,SUM(iv.net_amt) as total_amt,SUM(iv.paid_amt) as totalpaid_amt')->from('tbl_invoice_header iv');
		   $this->db->group_by('iv.treatment_date');
		   $this->db->order_by('iv.treatment_date','desc');
		   $query = $this->db->get();
		   return ($query->num_rows() > 0) ? $query->result_array() : false ;
	
	 }
	 public function item_details() {
		   $client_id = $_GET['branch'];
		   $this->db->where('client_id',$client_id);
		   $this->db->select('*')->from('tbl_item');
		   $query = $this->db->get();
		   return ($query->num_rows() > 0) ? $query->result_array() : false ;
	 }
	public function expenseitem_details() {
		   $this->db->select('*')->from('tbl_expanse_item');
		   $query = $this->db->get();
		   return ($query->num_rows() > 0) ? $query->result_array() : false ;
	 }
	 public function expenseclientitem_details() {
		   $client_id = $_GET['branch'];
		   $this->db->where('client_id',$client_id);
		   $this->db->select('item_id,item_name')->from('tbl_expanse_client_item');
		   $query = $this->db->get();
		   return ($query->num_rows() > 0) ? $query->result_array() : false ;
	 }
	public function add_invoice() {
		$this->db->where('client_id',$_GET['branch']);
		$this->db->select('email')->from('tbl_client');
		$res1 = $this->db->get();
		$email = $res1->row()->email;
		$bill_no=$this->generate_code();
		 $item = $_GET['item'];
		 $patient_id = $_GET['patient_id'];
		 $client_id = $_GET['branch'];
		 $invoice_date = str_replace('/','-',$_GET['invoice']);
		 $due_date = str_replace('/','-',$_GET['due']);
		 $item1 =  str_replace('[','',$item);
		 $item2 =  str_replace(']','',$item1);
		 $value = explode(',',$item2);
		 $count = sizeof($value);
		 $data = array(
			 'client_id' =>  $client_id,
			 'treatment_date' => date('Y-m-d',strtotime($invoice_date)),
			 'patient_id' => $patient_id,
			 'total_amt'=> $_GET['total'],
			 'bill_status'=> '0',
			 'net_amt'=> $_GET['total'],
			 'bill_no' => $bill_no,
			 'created_by'=> $email,
			 'created_date'=> date('Y-m-d'),
			 'modify_by'=> $email,
			 'created_date'=> date('Y-m-d')
		 );
		$this->db->insert('tbl_invoice_header',$data);
		$bill_id  = $this->db->insert_id();
	   for($i = 0; $i<$count; $i++){
		    $va =  str_replace('"','',$value[$i]);
			$item_det = explode('/',$va);
			$this->db->where('item_id',$item_det[0]);
			$this->db->select('item_name,item_price')->from('tbl_item');
		    $res = $this->db->get();
			$item_name = $res->row()->item_name;
			$item_price = $res->row()->item_price;
			$data1 = array(
			 'client_id' =>  $client_id,
			 'staff_id' =>  $_GET['staff_id'],
			 'created_date'=> date('Y-m-d'),
			 'bill_id'=> $bill_id,
			 'item_id' => $item_det[0],
			 'item_quantity' => $item_det[1],
			 'item_price' => $item_price,
			 'item_amount' => ($item_det[1] * $item_price)
			  
			);
			$this->db->insert('tbl_invoice_detail',$data1);
		 }  
		 return $patient_id;
		 
	 } 
	 public function edit_item($bill_id) {
		 $this->db->where('iv.bill_id',$bill_id);
		 $this->db->select('iv.bill_id,iv.item_id,iv.item_quantity,iv.item_price,it.item_desc,it.item_name')->from('tbl_invoice_detail iv');
		 $this->db->join('tbl_item it','iv.item_id = it.item_id');
		 $query = $this->db->get();
		 return ($query->num_rows() > 0 ) ? $query->result_array(): false;
		  
	 }
	 public function generate_code() {
		$string  = 'B' ;
		//$this->db->select('bill_no')->from('tbl_invoice_header')->where('client_id',$this->session->userdata('client_id'))->like('bill_no', $string, 'after'); 
		$this->db->select('bill_no')->from('tbl_invoice_header')->where('client_id',$_GET['branch'])->like('bill_no'); 
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $string . ($query->num_rows() + 1);
		} else {
			return $string . '1';
		}
	}
	 public function edit_invoice($bill_id) {
		 $this->db->where('iv.bill_id',$bill_id);
		 $this->db->select('si.first_name,si.last_name,iv.bill_id,iv.treatment_date,iv.due_date,iv.discount_perc,iv.net_amt,iv.total_amt,iv.paid_amt')->from('tbl_invoice_header iv');
		 $this->db->join('tbl_staff_info si','si.staff_id = iv.staff_id');
		 $query = $this->db->get();
		 return ($query->num_rows() > 0 ) ? $query->row_array(): false;
	 }
	public function update_invoice() {
		 $item = $_GET['item'];
		 $patient_id = $_GET['patient_id'];
		 $client_id = $_GET['branch'];
		 $bill_id = $_GET['bill_id'];
		 $invoice_date = str_replace('/','-',$_GET['invoice']);
		 $due_date = str_replace('/','-',$_GET['due']);
		 $value = explode(',',$item);
		 $count = sizeof($value);
		 
		  	 $this->db->where('bill_id',$bill_id);
			 $this->db->delete('tbl_invoice_detail');
			 
			  $data = array(
				 'client_id' =>  $client_id,
				 'treatment_date' => date('Y-m-d',strtotime($invoice_date)),
				 'patient_id' => $patient_id,
				 'discount_perc'=> $_GET['discount'],
				 'total_amt'=> $_GET['total'],
				 'bill_status'=> '0',
				 'net_amt'=> $_GET['total'] - $_GET['discount'] + $_GET['pre'],
				 'created_date'=> date('Y-m-d')
			  );
			 $this->db->where('bill_id',$bill_id);
			 $this->db->update('tbl_invoice_header',$data);
			 
		   for($i = 0; $i<$count; $i++){
			 $item_det = explode('/',$value[$i]);
			 $this->db->where('item_id',$item_det[0]);
			 $this->db->select('item_price')->from('tbl_item');
			 $result = $this->db->get();
			 $item_price = $result->row()->item_price;
			 
			 $data1 = array(
				 'client_id' =>  $client_id,
				 'created_date'=> date('Y-m-d'),
				 'bill_id'=> $bill_id,
				 'item_id' => $item_det[0],
				 'item_quantity' => $item_det[1],
				 'item_price' => $item_price,
				 'item_amount' => (abs($item_det[1]) * $item_price)
			 );
			 
			 $this->db->insert('tbl_invoice_detail',$data1);
		  }
	}
	public function oppatient_details($client_id){ 
		$this->db->select('pi.mobile_no,pi.city,pi.address_line1,pi.age,pi.gender,pi.patient_id,pi.first_name,pi.last_name,pi.patient_code,pi.appoint_date,pi.photo')->from('tbl_patient_info pi');
		$this->db->where('pi.home_visit','1');
		$this->db->where('pi.client_id',$client_id);
		$this->db->order_by('pi.patient_id','desc');
		$query  = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function homepatient_details($client_id){
		//$date = date('Y-m-d', strtotime('-366 days'));
		$this->db->select('mobile_no,city,address_line1,patient_id,first_name,last_name,patient_code,appoint_date,photo,age,gender')->from('tbl_patient_info');
		/* $this->db->join('tbl_patient_visits vi','vi.patient_id=pi.patient_id');
		$this->db->where('visit_date >',$date);
		 */$this->db->where('home_visit','2');
		$this->db->where('client_id',$client_id);
		$this->db->order_by('patient_id','desc');
		$query  = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;

	}
	public function approvepatient_list($client_id){
		$this->db->select('pi.patient_id,pi.first_name,pi.last_name,pi.patient_code,pi.age,pi.appoint_date,pi.photo,pi.gender')->from('tbl_patient_info pi');
		$this->db->where('pi.app_approve',1);
		$this->db->where('pi.client_id',$client_id);
		$query  = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;

	}
	public function check_version($client_id){
		$this->db->select('*')->from('check_version');
		$this->db->where('client_id',$client_id);
		$query  = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false ;

	}
	public function todays_bills(){
		 $client_id = $_GET['client_id'];
		$this->db->select('pi.mobile_no,pv.bill_status,pi.patient_id,pi.first_name,pi.last_name,pv.bill_id,pv.net_amt,pv.paid_amt');
		$this->db->from("tbl_patient_info pi");
		$this->db->join("tbl_invoice_header pv", "pi.patient_id=pv.patient_id");
		$this->db->where('pv.client_id',$client_id);
		$this->db->where('pv.treatment_date',date('Y-m-d'));
	    $query = $this->db->get();  
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function todays_appt(){
		 $client_id = $_GET['client_id'];
		$this->db->where('ai.appointment_from',date('Y-m-d'));
		$this->db->where('ai.bill_id',0);
		$this->db->where('ai.status !=',1);
		$this->db->where('ai.t_status !=',1);
		$this->db->select('pi.mobile_no,ai.bill_id,ai.bill_status,si.first_name as sname,si.last_name as slname,ai.visit,ai.bill_id,ai.appointment_from,ai.title,ai.appointment_id,ai.patient_id,pi.gender')->from('tbl_appointments ai');
		$this->db->select("DATE_FORMAT( ai.start, '%h:%i') as start",  FALSE );
		$this->db->select("DATE_FORMAT( ai.end, '%h:%i %p') as end",  FALSE );
		$this->db->join('tbl_patient_info pi','ai.patient_id = pi.patient_id');
		$this->db->join('tbl_staff_info si','si.staff_id = ai.staff_id');
		$this->db->where('ai.client_id',$client_id);
		$query  = $this->db->get();
		$val = $query->result_array();
		
		$client_id = $_GET['client_id'];
		$this->db->where('ai.appointment_from',date('Y-m-d'));
		$this->db->where('ai.bill_id !=',0);
		$this->db->where('ai.status !=',1);
		$this->db->where('ai.t_status !=',1);
		$this->db->select('pi.mobile_no,ai.bill_id,hi.bill_status,si.first_name as sname,si.last_name as slname,ai.visit,ai.bill_id,ai.appointment_from,ai.title,ai.appointment_id,ai.patient_id,pi.gender')->from('tbl_appointments ai');
		$this->db->select("DATE_FORMAT( ai.start, '%h:%i') as start",  FALSE );
		$this->db->select("DATE_FORMAT( ai.end, '%h:%i %p') as end",  FALSE );
		$this->db->join('tbl_invoice_header hi','hi.bill_id = ai.bill_id');
		$this->db->join('tbl_patient_info pi','ai.patient_id = pi.patient_id');
		$this->db->join('tbl_staff_info si','si.staff_id = ai.staff_id');
		$this->db->where('ai.client_id',$client_id);
		$query1  = $this->db->get();
		$val1 = $query1->result_array();
		
		return array_merge($val,$val1) ;
	}
	public function todays_pat(){
		 $client_id = $_GET['client_id'];
		$this->db->where('si.treatment_date',date('Y-m-d'));  
		$this->db->select('pi.mobile_no,it.item_name,pi.gender,pi.patient_code,pi.patient_id,si.treatments,pi.first_name,pi.last_name,st.first_name as staffname')->from('tbl_patient_treatment_techniques si');
		$this->db->join('tbl_item it','si.treatments = it.item_id');
		$this->db->join('tbl_staff_info st','si.staff_id = st.staff_id');
		$this->db->join('tbl_patient_info pi','si.patient_id = pi.patient_id');
		 $this->db->where('si.client_id',$client_id);
		$query  = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function todays_income(){
		 $client_id = $_GET['client_id'];
		$this->db->select('pi.patient_id,pi.first_name,pi.last_name,pv.bill_id,pv.paid_amt');
		$this->db->from("tbl_patient_info pi");
		$this->db->join("tbl_invoice_header pv", "pi.patient_id=pv.patient_id");
		$this->db->where('pv.client_id',$client_id);
		$this->db->where('pv.cheque_date',date('Y-m-d'));
	    $query = $this->db->get();  
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function todays_expense(){
		 $client_id = $_GET['client_id'];
		$this->db->where('due_date',date('Y-m-d'));
		$this->db->select('*')->from('tbl_expanse');
		$this->db->where('client_id',$client_id);
		$query  = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function todays_expense_items(){
		 $client_id = $_GET['client_id'];
		$this->db->where('due_date',date('Y-m-d'));
		$this->db->select('*')->from('tbl_expanse');
		$this->db->where('client_id',$client_id);
		$this->db->group_by('bill_no');
		$query  = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function bill_details(){
		$client_id = $_GET['client_id'];
		$bill_id = $_GET['bill_id'];
		$this->db->where('iv.bill_id',$bill_id);
		$this->db->where('iv.client_id',$client_id);
		$this->db->select('(iv.net_amt-iv.paid_amt) as amount,pi.first_name,pi.last_name')->from('tbl_invoice_header iv');
		$this->db->join('tbl_patient_info pi','iv.patient_id = pi.patient_id');
		$query  = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false ;
	}
	public function advanceBalance($patient_id){  
		$where = array('patient_id' => $patient_id);
		$this->db->select('sum(advance_amount) as totaladvance')->from('tbl_patient_advance')->where($where);
		$query = $this->db->get();
		$advanceData = $query->row_array();
		$advanceData1 = ($query->num_rows() > 0) ? $advanceData['totaladvance'] : 0;
		$where1 = array('patient_id' => $patient_id, 'payment_mode' => 'Advance');
		$this->db->select('sum(paid_amt) as totalpaid')->from('tbl_invoice_header')->where($where1);
		$query1 = $this->db->get();
		$paymentData = $query1->row_array();
		$paymentData1 = ($query1->num_rows() > 0) ? $paymentData['totalpaid'] : 0;
		return (($advanceData1 - $paymentData1) > 0) ? number_format($advanceData1 - $paymentData1,2,'.','') : 0;
	}
	public function add_pay(){
		 $this->db->where('bill_id',$_GET['bill_id']);
		 $this->db->select('paid_amt,net_amt')->from('tbl_invoice_header');
		 $res=  $this->db->get();
		 $amt = $res->row()->paid_amt;
		 $net_amt = $res->row()->net_amt;
		 
		 $value = $amt +  $_GET['amount'];
		 if($value == $net_amt){
			 $bill_status = '1';
		 } else {
			 $bill_status = '0';
		 }
		 $date = date('Y-m-d');
		 
		 $data1 = array(
			 'cheque_date'=> $date,
			 'card_no' => $_GET['cardno'],
			 'payment_mode' => $_GET['mode'],
			 'cheque_no' => $_GET['chequeno'],
			 'card_name' => $_GET['cardname'],
			 'paid_amt' => $value,
			 'bill_status' => $bill_status,
			 'bank' => $_GET['bankname']
		  );
		  $this->db->where('client_id',$_GET['branch']);
		  $this->db->where('patient_id',$_GET['patient_id']);
		  $this->db->where('bill_id',$_GET['bill_id']);
		  $this->db->update('tbl_invoice_header',$data1);
		  
		  $data = array(
			 'payment_date'=> $date,
			 'cheque_date'=> $date,
			 'client_id' => $_GET['branch'],
			 'payment_mode' => $_GET['mode'],
			 'bill_id' => $_GET['bill_id'],
			 'cheque_no' => $_GET['chequeno'],
			 'paid_amt' => $_GET['amount'],
			 'bank' => $_GET['bankname'],
			 'card_name' => $_GET['cardname'],
			 'card_no' => $_GET['cardno']
		  );
		   $this->db->insert('tbl_invoice_payments',$data);
			$id = $this->db->insert_id(); 
			return $id;
	}
	public function add_advance(){
		 $data = array(
		  'advance_date'=>date('Y-m-d'),
		  'cheque_date'=>date('Y-m-d'),
		  'cheque_no' => $_GET['cheque_no'],
		  'client_id' => $_GET['branch'],
		  'advance_amount' => $_GET['amount'],
		  'bank' => $_GET['bank'],
		  'patient_id' => $_GET['patient_id'],
		  'payment_mode' => $_GET['mode'],
		 );
		
		$this->db->insert('tbl_patient_advance',$data);
		$id = $this->db->insert_id(); 
		return $id;
	}
	public function expense_additem() {
		$bill_no=$this->generate_code1();
		 $item = $_GET['item'];
		 $ventor = $_GET['ventor'];
		 $client_id = $_GET['branch'];
		 $date = str_replace('/','-',$_GET['invoice']);
		 $due_date = str_replace('/','-',$_GET['due']);
		 $value = explode(',',$item);
		 $count = sizeof($value);
		
		 for($i=0;$i<$count;$i++){
			 $it = explode('/',$value[$i]);
			 $val = explode('AND',$it[0]);
			
			 if($val[0] != 'E'){
				 $this->db->where('item_id', $val[1]);
				 $this->db->select('expanse_item')->from('tbl_expanse_item');
				 $res = $this->db->get();
				 $item_name = $res->row()->expanse_item;
			 } else {
				 $this->db->where('item_id', $val[1]);
				  $this->db->select('item_name')->from('tbl_expanse_client_item');
				 $res = $this->db->get();
				 $item_name = $res->row()->item_name;
			 }
			 $data = array(
		    'client_id' =>  $client_id,
			 'bill_no' => $bill_no,
			 'bill_date' =>date('Y-m-d',strtotime($date)),
			 'ventor'=> $_GET['ventor'],
			 'due_date'=> date('Y-m-d',strtotime($due_date)),
			 'POSO'=> $_GET['po'],
			 'notes' => $_GET['notes'],
			 'tax_perc' => $_GET['tax'],
			 'item_id'=> $item_name,
			 'item_quantity'=> $it[1],
			 'item_price'=> $it[2],
			 'item_amount'=> ($it[1]*$it[2]),
			 'amount' => $_GET['total'],
			 'total_amt'=> $_GET['total'] + ($_GET['total'] * $_GET['tax']/100)
		   );
			$this->db->insert('tbl_expanse',$data);
			$bill_id  = $this->db->insert_id(); 
		 } 		 
	}
	public function generate_code1() {
		$string  = 'E' ;
		//$this->db->select('bill_no')->from('tbl_invoice_header')->where('client_id',$this->session->userdata('client_id'))->like('bill_no', $string, 'after'); 
		$this->db->select('bill_no')->from('tbl_expanse')->where('client_id',$_GET['branch'])->like('bill_no'); 
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $string . ($query->num_rows() + 1);
		} else {
			return $string . '1';
		}
	}
	public function edit_expense() {
		$bill_id = $_GET['bill_id'];
		$this->db->where('bill_no',$bill_id);
		$this->db->select('bill_no,item_id,item_quantity,tax_perc,item_price')->from('tbl_expanse');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function edit_expense_item() {
		$bill_id = $_GET['bill_id'];
		$this->db->where('bill_no',$bill_id);
		$this->db->select('*')->from('tbl_expanse');
		$this->db->group_by('bill_no');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false ;
	}
	public function consultant_details() {
		$client_id = $_GET['branch'];
		$this->db->where('client_id',$client_id);
		$this->db->where('is_doctor',1);  
		$this->db->select('staff_id,first_name,last_name')->from('tbl_staff_info');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function update_expense() {
		 
		 $bill_no = $_GET['bill_no'];
		 $this->db->where('bill_no',$bill_no);
		 $this->db->delete('tbl_expanse');
		 
		 
		 $item = $_GET['item'];
		 $ventor = $_GET['ventor'];
		 $client_id = $_GET['branch'];
		 $date = str_replace('/','-',$_GET['invoice']);
		 $due_date = str_replace('/','-',$_GET['due']);
		 $value = explode(',',$item);
		 $count = sizeof($value);
		
		 for($i=0;$i<$count;$i++){
			 $it = explode('/',$value[$i]);
			$data = array(
		     'client_id' =>  $client_id,
			 'bill_no' => $bill_no,
			 'bill_date' =>date('Y-m-d',strtotime($date)),
			 'ventor'=> $_GET['ventor'],
			 'due_date'=> date('Y-m-d',strtotime($due_date)),
			 'POSO'=> $_GET['po'],
			 'notes' => $_GET['notes'],
			 'item_id'=> $it[0],
			 'item_quantity'=> $it[1],
			 'tax_perc' => $_GET['tax'],
			 'item_price'=> $it[2],
			 'item_amount'=> ($it[1]*$it[2]),
			 'amount' => $_GET['amt'],
			 'total_amt'=> $_GET['total']
		
		   );
			$this->db->insert('tbl_expanse',$data);
			$bill_id  = $this->db->insert_id(); 
		 } 		 
	}
	public function add_treatment() {
	    $item_name = $_GET['item_name'];
		$this->db->where('client_id',$_GET['branch']);
		$this->db->where('item_name',$_GET['item_name']);
		$this->db->select('item_id')->from('tbl_item');
		$result = $this->db->get();
		if($result->result_array() != false){
			$item_id  = $result->row()->item_id;
		} else {
			$this->db->where('client_id',$_GET['branch']);
			$this->db->select('email')->from('tbl_client');
			$res1 = $this->db->get();
			$email = $res1->row()->email;
			
			$item_name = $_GET['item_name'];
			$item_descr = $_GET['item_descr'];
			$item_price = $_GET['item_price'];
			$data = array(
			   'client_id' => $_GET['branch'],
			   'item_name' => $item_name,
			   'item_desc' => $item_descr,
			   'item_price' => $item_price,
			   'created_by'=> $email,
			   'created_date'=> date('Y-m-d'),
			   'modify_by'=> $email,
			   'created_date'=> date('Y-m-d')
			);
			$this->db->insert('tbl_item',$data);
			$item_id  = $this->db->insert_id();
		}			
		return $item_id;
	}
	public function add_expense() {
		$item_name = $_GET['item_name'];
		$this->db->where('client_id',$_GET['branch']);
		$this->db->where('item_name',$_GET['item_name']);
		$this->db->select('item_id')->from('tbl_expanse_client_item');
		$result = $this->db->get();
		if($result->result_array() != false){
			$item_id  = $result->row()->item_id;
		} else {
			$item_name = $_GET['item_name'];
			$item_descr = $_GET['item_descr'];
			$item_price = $_GET['item_price'];
			$data = array(
			   'client_id' => $_GET['branch'],
			   'item_name' => $item_name,
			   'item_desc' => $item_descr,
			   'item_price' => $item_price
			   
			);
			$this->db->insert('tbl_expanse_client_item',$data);
			$item_id  = $this->db->insert_id();
		}		
		return $item_id;
	}
	public function invoice_terms() {
		$client_id = $_GET['branch'];
		$this->db->where('client_id',$client_id);
		$this->db->select('notes')->from('tbl_client');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false ;
	}
	public function settings_terms() {
		$client_id = $_GET['branch'];
		$this->db->where('client_id',$client_id);
		$this->db->select('tax,discount')->from('tbl_settings');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function edit_terms() { 
		$client_id = $_GET['branch'];
		$this->db->where('client_id',$client_id);
		$this->db->set('notes',$_GET['terms']);
		$this->db->update('tbl_client');
		
		$client_id = $_GET['branch'];
		$this->db->where('client_id',$client_id);
		$this->db->set('tax',$_GET['tax']);
		$this->db->set('discount',$_GET['discount']);
		$this->db->update('tbl_settings');
		return true;  
	}
	public function profile_details() {  
		$client_id = $_GET['branch'];
		$this->db->where('client_id',$client_id);
		$this->db->select('password,first_name,last_name,branch_name,clinic_name,mobile,phone,address,city,state,zipcode')->from('tbl_client');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false ;
	}
	public function edit_clinicdetails() {
		$clinicname = $_GET['clinicname'];
		$address = $_GET['address'];
		$city = $_GET['city'];
		$state = $_GET['state'];
		$zip = $_GET['zip'];
		$data = array(
		   'clinic_name' => $clinicname,
		   'address' => $address,
		   'city' => $city,
		   'state' => $state,
		   'zipcode' => $zip
		);
		$this->db->where('client_id',$_GET['branch']);
		$this->db->update('tbl_client',$data);
		return $_GET['branch'];
	}
	public function edit_profile() {
		$data = array(
		   'first_name' => $_GET['name'],
		   'branch_name' => $_GET['branch'],
		   'mobile' => $_GET['mobile'],
		   'phone' => $_GET['phone']
		);
		$this->db->where('client_id',$_GET['client_id']);
		$this->db->update('tbl_client',$data);
		return $_GET['client_id'];
	}
	public function change_password() {  
		$client_id = $_GET['branch'];
		$this->db->where('client_id',$client_id);
		$this->db->set('password',$_GET['password']);
		$this->db->update('tbl_client');
		return $client_id;
	}
	public function calendar_details() {  
		$client_id = $_GET['branch'];
		$this->db->where('client_id',$client_id);
		$this->db->select('monday_fn_from,monday_an_to,tuesday_fn_from,tuesday_an_to,wednesday_fn_from,wednesday_an_to,thursday_fn_from,thursday_an_to,friday_fn_from,friday_an_to,saturday_fn_from,saturday_an_to,sunday_fn_from,sunday_an_to')->from('tbl_schedule_settings');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false ;
	}
	public function slot_details() {  
		$client_id = $_GET['branch'];
		$this->db->where('client_id',$client_id);
		$this->db->select('sch_slot')->from('tbl_settings');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false ;
	}
	public function edit_calendardetails() {
		$this->db->where('client_id',$_GET['branch']);
		$this->db->select('sch_slot')->from('tbl_settings');
		$res = $this->db->get();
		if($res->result_array() != false){
			$this->db->where('client_id',$_GET['branch']);
		    $this->db->set('sch_slot',$_GET['slot']);
		    $this->db->update('tbl_settings');
		}
		else {
			 $info = array(
			 'client_id' => $_GET['branch'],
			 'sch_slot' => $_GET['slot']
			 );
			 $this->db->insert('tbl_settings',$info);
		}
		$this->db->where('client_id',$_GET['branch']);
		$this->db->select('monday_fn_from')->from('tbl_schedule_settings');
		$res = $this->db->get();
		if($res->result_array() != false){
		$data = array(
		   'monday_fn_from' => $_GET['m_from'],
		   'monday_an_to' => $_GET['m_to'],
		   'tuesday_fn_from' => $_GET['tu_from'],
		   'tuesday_an_to' => $_GET['tu_to'],
		   'wednesday_fn_from' => $_GET['w_from'],
		   'wednesday_an_to' => $_GET['w_to'],
		   'thursday_fn_from' => $_GET['th_from'],
		   'thursday_an_to' => $_GET['th_to'],
		   'friday_fn_from' => $_GET['f_from'],
		   'friday_an_to' => $_GET['f_to'],
		   'saturday_fn_from' => $_GET['sa_from'],
		   'saturday_an_to' => $_GET['sa_to'],
		   'sunday_fn_from' => $_GET['su_from'],
		   'sunday_an_to' => $_GET['su_to'],
		);
		$this->db->where('client_id',$_GET['branch']);
		$this->db->update('tbl_schedule_settings',$data);
		} else {
				$data1 = array(
				   'client_id' => $_GET['branch'],
				   'monday_fn_from' => $_GET['m_from'],
				   'monday_an_to' => $_GET['m_to'],
				   'tuesday_fn_from' => $_GET['tu_from'],
				   'tuesday_an_to' => $_GET['tu_to'],
				   'wednesday_fn_from' => $_GET['w_from'],
				   'wednesday_an_to' => $_GET['w_to'],
				   'thursday_fn_from' => $_GET['th_from'],
				   'thursday_an_to' => $_GET['th_to'],
				   'friday_fn_from' => $_GET['f_from'],
				   'friday_an_to' => $_GET['f_to'],
				   'saturday_fn_from' => $_GET['sa_from'],
				   'saturday_an_to' => $_GET['sa_to'],
				   'sunday_fn_from' => $_GET['su_from'],
				   'sunday_an_to' => $_GET['su_to'],
				);
			 $this->db->insert('tbl_schedule_settings',$data1);
		}
		
		return $_GET['branch'];
	}
	public function get_id() {  
		$client_id = $_GET['branch'];
		$appointment_id = $_GET['appointment_id'];
		$this->db->where('client_id',$client_id);
		$this->db->where('appointment_id',$appointment_id);
		$this->db->select('patient_id')->from('tbl_appointments');
		$query = $this->db->get();  
		return ($query->num_rows() > 0) ? $query->row_array() : false ;
	}
    public function search_patientname() {
		$client_id = $_GET['branch'];
		$this->db->where('client_id',$client_id);
		$this->db->select('patient_id,first_name,last_name,age')->from('tbl_patient_info');
		$query = $this->db->get(); 
		$data = array();
     foreach($query->result_array() as $row){
		 array_push($data,'patient_id',$row['patient_id'], 'first_name', $row['first_name'].' '.$row['last_name'].'('.$row['age'].')');
     }	   
		return $data;  
	}
	 public function approveappointment_list() {
		$client_id = $_GET['branch'];
		$this->db->where('ai.client_id',$client_id);
		$this->db->where('ai.app','1');
		$this->db->where('ai.t_status','1');
		$this->db->where('ai.appointment_from !=','');
		$this->db->select('ai.appointment_from,ai.title,ai.start,ai.end,ai.appointment_id,ai.patient_id,pi.gender')->from('tbl_appointments ai');
		$this->db->select("DATE_FORMAT( ai.start, '%d-%m-%Y   %h:%i %p') as start",      FALSE );
		$this->db->join('tbl_patient_info pi','ai.patient_id = pi.patient_id');
		$this->db->order_by('ai.appointment_from','desc');
		$query = $this->db->get();    
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	 }
	 public function staffuser_login() {
		$email = $_GET['email'];
		$password = $_GET['password'];
		$this->db->where('ui.username',$email);  
		$this->db->where('ui.password',$password);
		$this->db->where('ui.status !=',2);
		$this->db->select('ci.plan,ui.client_id,ui.staff_id,ui.privileges,ui.create,ui.edit,ci.plan')->from('tbl_user ui');
		$this->db->join('tbl_client ci','ci.client_id = ui.client_id');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function treatment_datedetails() {  
		$treatment_id = $_GET['treatment_id'];
		$client_id = $_GET['client_id'];
		$this->db->where('client_id',$client_id);
		$this->db->where('treatment_id',$treatment_id);
		$this->db->select('treatment_date')->from('tbl_patient_treatment_techniques');
		$query = $this->db->get();  
		return ($query->num_rows() > 0) ? $query->row_array() : false ;
	}
	public function cancelappointment_order(){  
		   $client_id = $_GET['branch'];
		   $this->db->where('ai.client_id',$client_id);
		   $this->db->where('ai.status','1');
		   $this->db->select('ai.appointment_from,count(ai.appointment_id) as apt')->from('tbl_appointments ai');
		   $this->db->join('tbl_patient_info pi','ai.patient_id = pi.patient_id');
		   $this->db->group_by('ai.appointment_from');
		   $this->db->order_by('ai.appointment_from','desc');
		   $query = $this->db->get();
		   return ($query->num_rows() > 0) ? $query->result_array() : false ;
	
	}
	public function approve_appointments(){
		$appointment_id = $_GET['appointment_id'];
		$this->db->where('appointment_id',$appointment_id);
		$this->db->set('t_status','0');
		$this->db->set('status','0');
		$this->db->update('tbl_appointments'); 
	    return $appointment_id;  
	}
	public function approve_patients(){
		$patient_id = $_GET['patient_id'];
		$this->db->where('patient_id',$patient_id);
		$this->db->set('app_approve',0);
		$this->db->update('tbl_patient_info');
		return $patient_id;
	}
  public function compliants_add() {
	$client_id =  $_GET['branch'];
	$this->db->where('client_id',$client_id);
	$this->db->select('email')->from('tbl_client');
	$res = $this->db->get();
	$email = $res->row()->email;
	$client_id =  $_GET['branch'];
	
	$data = array(
	'what_treatment_you_had' =>$_GET['treatment'],
	'had_this_problem_before' =>$_GET['problem'],
	'how_long_you_had_this_prob'=>$_GET['inform'],
	'chief_complaints_dtl'=>$_GET['chief'],
	'client_id'=> $_GET['branch'],
	'patient_id'=> $_GET['patient_id'],
	'created_by'=> $email,
	'modify_by'=> $email,
	'cc_date' =>date('Y-m-d')
	);
	$this->db->insert('tbl_patient_chief_complaints',$data);
	return $this->db->insert_id();
 }
 public function pain_add() {
	$client_id =  $_GET['branch'];
	$this->db->where('client_id',$client_id);
	$this->db->select('email')->from('tbl_client');
	$res = $this->db->get();
	$email = $res->row()->email;
	$client_id =  $_GET['branch'];
	
	$data = array(
	'releaving_factors' =>$_GET['relieving'],
	'aggravating_factors' =>$_GET['aggrevate'],
	'adl_affect'=>$_GET['adl'],
	'trigger_point'=>$_GET['trigger'],
	'side_or_location' =>$_GET['location'],
	'pain_duration' =>$_GET['duration'],
	'severity_of_pain'=>$_GET['value'],
	'Threshold'=>$_GET['pressure'],
	'pain_onset'=>$_GET['onset'],
	'pain_nature'=>$_GET['nature'],
	'pain_site'=>$_GET['site'],
	'client_id'=> $_GET['branch'],
	'patient_id'=> $_GET['patient_id'],
	'created_by'=> $email,
	'modify_by'=> $email,
	'pain_date' =>date('Y-m-d')
	);
	$this->db->insert('tbl_patient_pain',$data);
	return $this->db->insert_id();
  }
	public function treatment_session() {
		$branch = $_GET['branch'];
		$patient_id = $_GET['patient_id'];
		$date = $_GET['sn_date'];
		$this->db->where('pt.client_id',$branch);
		$this->db->where('pt.patient_id',$patient_id);
		$this->db->where('pt.treatment_date',date('y-m-d',strtotime($date)));
		$this->db->select('pt.bill_status,pt.treatments,GROUP_CONCAT(pt.treatments SEPARATOR " - ") AS itemId,it.item_name,GROUP_CONCAT(it.item_name SEPARATOR " - ") AS itemName,pt.treatment_quantity,GROUP_CONCAT(pt.treatment_quantity SEPARATOR " - ") AS treatmentQuantity,pt.staff_id')->from('tbl_patient_treatment_techniques pt');
		$this->db->join('tbl_item it','pt.treatments = it.item_id');
		$query = $this->db->get();
		if($query->result_array() != false){
			$item = $query->row()->itemName;
			if($item != ''){
				$bill = $query->row()->bill_status.'/'.$query->row()->itemName.'/'.$query->row()->itemId.'/'.$query->row()->treatmentQuantity.'/'.$query->row()->staff_id;
			} else {
				$bill = '0';
			}
		} else {
			$bill = '0';
		}

		return $bill;
		
	}
	public function add_session() {
		$this->db->where('patient_id',$_GET['id']);
		$this->db->select('patient_code,first_name,last_name,concess_group_id')->from('tbl_patient_info');
		$res  = $this->db->get();
		$code  = $res->row()->patient_code;
		$first  = $res->row()->first_name;
		$last  = $res->row()->last_name;
		$concession_group_id  = $res->row()->concess_group_id;

		$this->db->where('client_id',$_GET['branch']);
		$this->db->select('username,first_name,last_name')->from('tbl_client');
		$res1  = $this->db->get();
		$username  = $res1->row()->username;
		$clientname  = $res1->row()->first_name.' '.$res1->row()->last_name;
		
		$staff = $_GET['staff_id'];
		$treatment_id = $_GET['treatment'];
		$treatment_quantity = $_GET['session'];
		
		$this->db->where('item_id',$treatment_id);
		$this->db->select('item_price,item_desc,item_name')->from('tbl_item');
		$res = $this->db->get();
		$itemname = $res->row()->item_name;
		$item_desc = $res->row()->item_desc;
		$item_price = $res->row()->item_price;
		$tot = $res->row()->item_price * $treatment_quantity;
		
		$session_det = array(
				'client_id' => $_GET['branch'],
				'patient_id' => $_GET['id'],
				'staff_id' => $staff,
				'patient_code' => $code,
				'sn_date' => date('Y-m-d',strtotime(str_replace('/','-',$_GET['sn_date']))),
				'Session_count' => $treatment_quantity,
				'item_id' => $treatment_id,
				'item_name' => $itemname,
				'repot_by' =>  $staff,
				'Comment_sess' => $_GET['notes'],
				'fpatient_name' => $first,
				'lpatient_name' => $last,
				'created_by' => $username,
				'created_date' => date('Y-m-d H:i:s'),
				'modify_by' => $username,
				'modify_date' => date('Y-m-d H:i:s'),
			);
			$this->db->insert('tbl_session_det',$session_det);
		    $data['sn_id']=$this->db->insert_id();
		    $bill = $_GET['bill_gen'];
			$bill_no=$this->generate_code_bill();
			if($bill != '') {
				if($concession_group_id  != '0'){
					$this->db->where('concess_group_id',$concession_group_id);
					$this->db->select('tax_perc,discount_perc')->from('tbl_concess_group');
					$res = $this->db->get();
					$tax = $res->row()->tax_perc;
					$discount = $res->row()->discount_perc;
					$tax_perce = ($tax/100) * $tot; 
					$discount_perce = ($discount/100) * $tot;
					$tot_amt = ($tot + $tax_perce ) - $discount_perce;
				} else{
					$tax = '0';
					$discount = '0';
					$tot_amt = $tot;
				}
				$invoice_info = array(
					'client_id' => $_GET['branch'],
					'bill_no' => $bill_no,
					'patient_id' => $_GET['id'],
					'treatment_date' => date('Y-m-d',strtotime(str_replace('/','-',$_GET['sn_date']))),
					'due_date' => date('Y-m-d',strtotime(str_replace('/','-',$_GET['sn_date']))),
					'total_amt' => $tot,
					'net_amt' => $tot_amt,
					'bill_status' => 0,
					'generated_by' => $clientname,
					'created_by' => $username,
					'created_date' => date('Y-m-d H:i:s'),
					'modify_by' => $username,
					'tax_perc' => $tax,
					'discount_perc' => $discount,
					'modify_date' => date('Y-m-d H:i:s'),
				);
				$this->db->insert('tbl_invoice_header', $invoice_info);
				$bill_id=$this->db->insert_id();
				
				$dat = array(
			        'client_id' => $_GET['branch'],
					'bill_id' => $bill_id,
					's_no' => '1',
					'item_id' => $treatment_id,
					'item_desc' => $item_desc,
					'item_quantity' => $treatment_quantity,
					'item_price' => $item_price,
					'item_amount' => $tot,
					'created_by' => $username,
					'created_date' => date('Y-m-d H:i:s'),
					'modify_by' => $username,
					'modify_date' => date('Y-m-d H:i:s'),
				);
			   $this->db->insert('tbl_invoice_detail', $dat);
				
			}
			return $_GET['id'];
	}
	public function generate_code_bill() {
		$string  = 'B' ;
		$this->db->select('bill_no')->from('tbl_invoice_header')->where('client_id',$this->session->userdata('client_id'))->like('bill_no'); 
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $string . ($query->num_rows() + 1);
		} else {
			return $string . '1';  
		}
	}
	public function add_protocolsession() {
		$this->db->where('patient_id',$_GET['id']);
		$this->db->select('patient_code,first_name,last_name,concess_group_id')->from('tbl_patient_info');
		$res  = $this->db->get();
		$code  = $res->row()->patient_code;
		$first  = $res->row()->first_name;
		$last  = $res->row()->last_name;
		$concession_group_id  = $res->row()->concess_group_id;  
     	
		$staff_id = $_GET['staff_id'];
		$treat = $_GET['treatment'];
		$item_id = $_GET['treatment'];
		$session_cont = $_GET['session'];
		
		$this->db->where('client_id',$_GET['branch']);
		$this->db->select('email,first_name,last_name')->from('tbl_client');
		$res  = $this->db->get();
		$clientName  = $res->row()->first_name.' '.$res->row()->last_name;
		$username  = $res->row()->email;
		$session_cont = $_GET['session'];
		$treat = $_GET['treatment'];		
		$id = explode('-',$treat);
		$treatment_quantity = explode(' - ',$session_cont);
		for($i=0; $i < sizeof($id); $i++){
			$this->db->where('item_id',$id[$i]);
			$this->db->select('item_name')->from('tbl_item');
			$res = $this->db->get();
			$item_name = $res->row()->item_name;
			
			$session_det = array(
				'client_id' => $_GET['branch'],
				'patient_id' => $_GET['id'],
				'staff_id' => $staff_id,
				'patient_code' => $code,
				'sn_date' => date('Y-m-d',strtotime($_GET['sn_date'])),
				'Session_count' => $treatment_quantity[$i],
				'item_id' => $id[$i],
				'item_name' => $item_name,
				'repot_by' =>  $staff_id,
				'Comment_sess' => $_GET['notes'],
				'fpatient_name' => $first,
				'lpatient_name' => $last,
				'created_by' => $username,
				'created_date' => date('Y-m-d H:i:s'),
				'modify_by' => $username,
				'modify_date' => date('Y-m-d H:i:s'),
				  
			);
			$this->db->insert('tbl_session_det',$session_det);
		    $data['sn_id']=$this->db->insert_id(); 
			
		}
		$bill = $_GET['bill_gen'];
		$bill_no=$this->generate_code_bill();
		
		if($bill != '0') {
			$price = 0;
			for($i=0; $i< sizeof($id); $i++){
				$this->db->where('item_id',$id[$i]);
				$this->db->select('item_price,item_desc')->from('tbl_item');
				$res = $this->db->get();
				$price += $res->row()->item_price * $treatment_quantity[$i];
			}
			$tot = $price;
			if($concession_group_id  != '0'){
				$this->db->where('concess_group_id',$concession_group_id);
				$this->db->select('tax_perc,discount_perc')->from('tbl_concess_group');
				$res = $this->db->get();
				$tax = $res->row()->tax_perc;
				$discount = $res->row()->discount_perc;
				$tax_perce = ($tax/100) * $tot; 
				$discount_perce = ($discount/100) * $tot;
				$tot_amt = ($tot + $tax_perce ) - $discount_perce;
			} else{
				$tax = '0';
				$discount = '0';
				$tot_amt = $tot;
			}
					
			$invoice_info = array(
				'client_id' => $_GET['branch'],
				'bill_no' => $bill_no,
				'patient_id' => $_GET['id'],
				'treatment_date' => date('Y-m-d',strtotime($_GET['sn_date'])),
				'due_date' => date('Y-m-d',strtotime($_GET['sn_date'])),
				'total_amt' => $tot,
				'net_amt' => $tot_amt,
				'bill_status' => 0,
				'generated_by' => $clientName,
				'created_by' => $username,
				'created_date' => date('Y-m-d H:i:s'),
				'modify_by' => $username,
				'tax_perc' => $tax,
				'discount_perc' => $discount,
				'modify_date' => date('Y-m-d H:i:s'),
			);
			
			$this->db->insert('tbl_invoice_header', $invoice_info);
			$bill_id=$this->db->insert_id(); 
			
			for($i=0; $i< sizeof($id); $i++){
				$this->db->where('item_id',$id[$i]);
				$this->db->select('item_price,item_desc')->from('tbl_item');
				$res = $this->db->get();
				$price = $res->row()->item_price;
				$item_desc = $res->row()->item_desc;
				$item_amt = $price * $treatment_quantity[$i];
				$dat = array(
			        'client_id' => $_GET['branch'],
					'bill_id' => $bill_id,
					's_no' => '1',
					'item_id' => $id[$i],
					'item_desc' => $item_desc,
					'item_quantity' => $treatment_quantity[$i],
					'item_price' => $price,
					'item_amount' => $item_amt,
					'created_by' => $username,
					'created_date' => date('Y-m-d H:i:s'),
					'modify_by' => $username,
					'modify_date' => date('Y-m-d H:i:s'),
				);
				$this->db->insert('tbl_invoice_detail', $dat);
			}
			
			$this->db->where('patient_id',$_GET['id']);
		    $this->db->where('treatment_date',date('Y-m-d',strtotime($_GET['sn_date'])));  
		    $this->db->set('bill_status','1');
			$this->db->set('bill_id',$bill_id);
			$this->db->update('tbl_patient_treatment_techniques');
		}
		
		return $_GET['id'];    
		
		
	}
	public function add_treatmentprotocol() {
		$this->db->where('item_id',$_GET['treatment']);
		$this->db->select('item_price')->from('tbl_item');
		$res = $this->db->get();
		$item_price = $res->row()->item_price;
		
		$this->db->where('client_id',$_GET['branch']);
		$this->db->select('username,first_name,last_name')->from('tbl_client');
		$res1  = $this->db->get();
		$username  = $res1->row()->username;
		$clientname  = $res1->row()->first_name.' '.$res1->row()->last_name;
		
		$sndate = explode(',',$_GET['sn_date']);
		for($i = 0; $i < count($sndate); $i++){
		$dat = array(  
			        'client_id' => $_GET['branch'],
					'patient_id' => $_GET['id'],
					'treatments' => $_GET['treatment'],
					'treatment_date' =>date('Y-m-d',strtotime($sndate[$i])),  
					'treatment_quantity' => $_GET['session'],
					'staff_id' => $_GET['staff_id'],
					'treatment_price' => $item_price,
					'treatment_group_id' => $this->treatmentGroupCode(),
					'bill_status' => 0,
					'created_by' => $username,
					'created_date' => date('Y-m-d H:i:s'),
					'modify_by' => $username,
					'modify_date' => date('Y-m-d H:i:s'),
				);
			$this->db->insert('tbl_patient_treatment_techniques', $dat);
		}
		$id = $_GET['id'];
		return $id;
	}
	public function treatmentGroupCode() {
		$string  = 'GRP/' ;
		$this->db->select('treatment_group_id')->from('tbl_patient_treatment_techniques')->where('client_id',$_GET['branch'])->like('treatment_group_id', $string, 'after'); 
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $string . ($query->num_rows() + 1);
		} else {
			return $string . '1';
		}
	}
	public function approve_appointmentscount($branch) {
		$this->db->where('client_id',$branch);
		$this->db->where('t_status','1');
		$this->db->select('COUNT(*) as count_rows')->from('tbl_appointments');
		$query = $this->db->get();
		return $query->row_array();
	}
	public function approve_patientscount($branch) {
		$this->db->where('client_id',$branch);
		$this->db->where('app_approve','1');
		$this->db->select('COUNT(*) as count_rows')->from('tbl_patient_info');
		$query = $this->db->get();
        return $query->row_array();
		
	}
	public function chief_compliants_list($client_id,$patient_id) {
		$this->db->where('client_id',$client_id);
		$this->db->where('patient_id',$patient_id);
		$this->db->select('chief_complaints_dtl,cc_date')->from('tbl_patient_chief_complaints');
		$this->db->order_by('cc_date','desc');
		$query = $this->db->get();    
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function pain_list($client_id,$patient_id) {
		$client_id = $_GET['branch'];
		$this->db->where('client_id',$client_id);
		$this->db->where('patient_id',$patient_id);
		$this->db->select('pain_site,severity_of_pain,pain_date')->from('tbl_patient_pain');
		$this->db->order_by('pain_date','desc');
		$query = $this->db->get();    
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function treatment_protocolslist($client_id,$patient_id) {
		$this->db->where('pt.client_id',$client_id);
		$this->db->where('pt.patient_id',$patient_id);
		$this->db->select('pt.treatment_date,it.item_name,pt.bill_status')->from('tbl_patient_treatment_techniques pt');
		$this->db->join('tbl_item it','pt.treatments = it.item_id');
		$this->db->order_by('treatment_date','desc');
		$query = $this->db->get();  
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function balance() {
		$client_id = $_GET['branch'];
		$from = date('Y-m-d',strtotime($_GET['from']));
		$to = date('Y-m-d',strtotime($_GET['to']));
		
		$this->db->select('sum(net_amt) as income');
		$this->db->from("tbl_invoice_header");
		$this->db->where('client_id',$client_id);
		$this->db->where('treatment_date >=',$from);
		$this->db->where('treatment_date <=',$to);
		$query = $this->db->get();
		$qrow = $query->row();
		$balance_income = ($query->num_rows() > 0) ? $qrow->income : false;
			
		$this->db->select('sum(ih.paid_amt) as income_pay');
		$this->db->from("tbl_invoice_header ih");
		$this->db->join("tbl_invoice_payments pt", "ih.bill_id=pt.bill_id");
		$this->db->where('ih.client_id',$client_id);
		$this->db->where('pt.payment_date >=',$from);
		$this->db->where('pt.payment_date <=',$to);
		$query = $this->db->get();
		$qrow = $query->row();
		$balance_income_pay = ($query->num_rows() > 0) ? $qrow->income_pay : false;
		
		$this->db->select('sum(item_amount) as expanse');
		$this->db->from("tbl_expanse");
		$this->db->where('bill_date >=',$from);
		$this->db->where('bill_date <=',$to);
		$this->db->where('client_id',$client_id); 
		$query1 = $this->db->get();
		$qrow1 = $query1->row();
		$balance_expanse = ($query1->num_rows() > 0) ? $qrow1->expanse : false;
		
		$data =array(
			'balance_income' => $balance_income,
			'balance_income_pay' => $balance_income_pay,
			'balance_expanse' => $balance_expanse,
		);
		return $data;
	}
	public function myaccount() {
		$client_id = $_GET['branch'];
		$this->db->where('ci.client_id',$client_id);
		$this->db->select('ci.sms_count,ci.total_sms_limit,ci.plan,vi.num_users,vi.num_location,vi.duration,vi.create_date,vi.expire_date')->from('tbl_client ci');
		$this->db->join('tbl_validity vi','ci.client_id = vi.client_id');
		$query = $this->db->get();    
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	 }
	 public function admin_token_update() {
		$branch = $_GET['client_id'];
		if($_GET['token'] != 'undefined' || $_GET['token'] != '' ){
			$this->db->where('client_id',$branch);
			$this->db->set('token',$_GET['token']);
			$this->db->update('tbl_client');
			return $_GET['client_id'];
		} else {
			return false;  
		}
	}
	public function patient_token_update() {
		$patient_id = $_GET['patient_id'];
		if($_GET['token'] != 'undefined'){
		$this->db->where('patient_id',$patient_id);
		$this->db->set('token',$_GET['token']);
		$this->db->update('tbl_patient_info');
		return true;
		} else {
			return false;
		}
	}
	public function staff_token_update() {
		if($_GET['token'] != 'undefined'){
		$this->db->where('client_id',$_GET['client_id']);
		$this->db->where('staff_id',$_GET['staff_id']);
		$this->db->set('token',$_GET['token']);
		$this->db->update('tbl_user');
		return true;
		} else {
			return false;
		}
	}
	public function client_notification1() {
		$client_id = $_GET['branch'];
		$this->db->where('client_id',$client_id);
		$this->db->where('status',0);
		$this->db->select('*')->from('tbl_client_notification');
		$query = $this->db->get();    
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function client_notification() {
		$client_id = $_GET['branch'];
		$this->db->where('client_id',$client_id);
		$this->db->where('status',1);
		$this->db->select('*')->from('tbl_client_notification');
		$query = $this->db->get();    
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function unread_patreg() {
		$client_id = $_GET['branch'];
		$this->db->where('client_id',$client_id);
		$this->db->where('status',1);
		$this->db->where('title','Patient Registration');
		$this->db->select('count(notification_id) as total')->from('tbl_client_notification');
		$result = $this->db->get();
		return $result->row()->total;
	}
	public function unread_aptreq() {
		$client_id = $_GET['branch'];
		$this->db->where('client_id',$client_id);
		$this->db->where('status',1);
		$this->db->where('title','Book Appointment');
		$this->db->select('count(notification_id) as total')->from('tbl_client_notification');
		$result = $this->db->get();
		return $result->row()->total;
	}
	public function read_aptreq() {
		$client_id = $_GET['branch'];
		$this->db->where('client_id',$client_id);
		$this->db->where('status',0);
		$this->db->where('title','Book Appointment');
		$this->db->select('count(notification_id) as total')->from('tbl_client_notification');
		$result = $this->db->get();
		return $result->row()->total;
	}
	public function unread_exereq() {
		$client_id = $_GET['branch'];
		$this->db->where('client_id',$client_id);
		$this->db->where('status',1);
		$this->db->where('title','Exercise Request');
		$this->db->select('count(notification_id) as total')->from('tbl_client_notification');
		$result = $this->db->get();
		return $result->row()->total;
	}
	public function read_exereq() {
		$client_id = $_GET['branch'];
		$this->db->where('client_id',$client_id);
		$this->db->where('status',0);
		$this->db->where('title','Exercise Request');
		$this->db->select('count(notification_id) as total')->from('tbl_client_notification');
		$result = $this->db->get();
		return $result->row()->total;
	}
	public function unread_exesend() {
		$client_id = $_GET['branch'];
		$this->db->where('client_id',$client_id);
		$this->db->where('status',1);
		$this->db->where('title','Exercise Feedback');
		$this->db->select('count(notification_id) as total')->from('tbl_client_notification');
		$result = $this->db->get();
		return $result->row()->total;
	}
	public function read_exesend() {
		$client_id = $_GET['branch'];
		$this->db->where('client_id',$client_id);
		$this->db->where('status',0);
		$this->db->where('title','Exercise Feedback');
		$this->db->select('count(notification_id) as total')->from('tbl_client_notification');
		$result = $this->db->get();
		return $result->row()->total;
	}
	public function read_patreg() {
		$client_id = $_GET['branch'];
		$this->db->where('client_id',$client_id);
		$this->db->where('status',0);
		$this->db->where('title','Patient Registration');
		$this->db->select('count(notification_id) as total')->from('tbl_client_notification');
		$result = $this->db->get();
		return $result->row()->total;
	}
	public function notify_details() {
		$client_id = $_GET['notification_id'];
		$this->db->where('notification_id',$client_id);
		$this->db->select('*')->from('tbl_client_notification');
		$query = $this->db->get();    
		return ($query->num_rows() > 0) ? $query->row_array() : false ;
	}
	public function accept_notification() {  
		$this->db->where('client_id',$_GET['branch']);
		$this->db->where('notification_id',$_GET['notification_id']);
		$this->db->set('status','0');
		$this->db->update('tbl_client_notification');
	    return $_GET['notification_id'];
	}
	public function all_notifications() { 
		$this->db->where('status','1');	
		$this->db->where('client_id',$_GET['client_id']);
		$this->db->select('count(notification_id) as total')->from('tbl_client_notification');
		$result = $this->db->get();
		return $result->row()->total;
	}
	public function get_notify() { 
		$this->db->where('client_id',0);
		$this->db->select('*')->from('tbl_client_notification');
		$this->db->order_by('notification_id','DESC');
		$result = $this->db->get();
		return ($result->num_rows() > 0) ? $result->result_array() : false ;
	}
	public function clientnotify() {
		  $this->db->select('*')->from('tbl_notify');
		  $query = $this->db->get();  
		  return ($query->num_rows() > 0) ? $query->result_array() : 0 ;
	  }
	 public function client_register()
	 {
		 $email_verification_code=$this->generate_code_mail();
		 
		 $this->db->limit(1);
		 $this->db->order_by('client_id','DESC');
		 $this->db->select('client_id')->from('tbl_client');
		 $res = $this->db->get();
		 $c_id = $res->row()->client_id;
		 $tempInfo1 = array(
		    'client_id' => $c_id+1,
			'clinic_name' => $_GET['clinic'],
			'first_name' => $_GET['name'],
			'branch_name' => $_GET['city'],
			'city' => $_GET['city'],
			'mobile' => $_GET['mobile'],
			'username' => $_GET['email'],
			'password' => $_GET['password'],
			'exes_chart' => 1,
			'account_type' => 1,
			'email_verified' => 0,
			'email_verification_code' => $email_verification_code,
			'last_login_date'=> date('Y-m-d H:i:s'),
			'created_on'=> date('Y-m-d'),
			'email' =>  $_GET['email']
		   
		);
		$this->db->insert('tbl_client', $tempInfo1);
		
		$tempInfo2 = array(
		        'client_id' => $c_id+1,  
			'create_date' => date('Y-m-d'),
			'expire_date' => date('Y-m-d'),
			'num_users' => 1,
			'num_location' => 1,
			'plan_type' => 0,		);
		
		$this->db->insert('tbl_validity', $tempInfo2);
		  
		$admin = array(
			'ClinicName' => $_GET['clinic'],
			'ClientName' => $_GET['name'],
			'City' => $_GET['city'],
			'UserName' => $_GET['email'],
			'Password' => $_GET['password'],
			'MobileNo' => $_GET['mobile'],  
			'PhoneNo' => $_GET['mobile'],
			'State' => '',
			'coupon_code' => '',
			'LastLoginDate' => date('Y-m-d H:i:s')
		);
		$adminMessage = $this->mail_model->regInformationTemplate($admin);
		$adminMailConfig = array('clinic' => 'Physio Plus Tech', 'to' => 'contact@physioplusnetwork.com', 'subject' => 'Client Registration Info from Mobile APP', 'message' => $adminMessage);
		$this->mail_model->sendEmail($adminMailConfig);
		
		$client = array(
			'ClinicName' => $_GET['clinic'],
			'ClientName' => $_GET['name'],
			'coupon_code' => '',
			'verificationCode' => $email_verification_code
		);
		$clientMessage = $this->mail_model->registrationTemplate($client);
		$clientMailConfig = array('clinic' => 'Physio Plus Tech','to' => $_GET['email'], 'subject' => 'Congratulations! Welcome to Physio Plus Tech', 'message' => $clientMessage);
		$this->mail_model->sendEmail($clientMailConfig);
		return $_GET['clinic'];   
		
	}
	public function generate_code_mail() {
		$query=$this->db->query("select IFNULL(max(substr(email_verification_code,1,20))+1,1) EMAIL_VERIFICATION_CODE from tbl_client ");
		$row = $query->row_array();
		$string  = date('Y-m-d H:i:s').$row['EMAIL_VERIFICATION_CODE'];
		return md5($string);
	}
	public function check_mail() {
		$email = $_GET['email'];
		$this->db->where('email',$email);
		$this->db->select('client_id')->from('tbl_client');
		$query = $this->db->get();    
		 if($query->result_array() != false){
			$client_id = $query->row()->client_id;
		} else {
			$client_id = '';
		}			
		return $client_id;  
	}
	public function getcheckdet($client_id)
	{
		$c_id = $client_id;
		$this->db->select('t1.client_id,t1.email,t1.first_name,t1.last_name,t1.sms_count,t1.mobile,t1.address,t1.city,t1.state,t1.country,t1.zipcode,t1.total_sms_limit,t2.plan_type,t2.duration,t2.num_users,t2.num_location,t1.created_on,t2.expire_date');
		$this->db->from("tbl_client t1");
		$this->db->join("tbl_validity t2", "t1.client_id=t2.client_id");
		$this->db->where('t1.client_id',$c_id);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function clinic_details() {
		$this->db->where('client_id',$_GET['branch']);
		$this->db->select('*')->from('tbl_client');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function session_details() {
		$this->db->where('patient_id',$_GET['patient_id']);
		$this->db->select('*')->from('tbl_session_det');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
   }
   public function session_list() {
		$this->db->where('si.client_id',$_GET['branch']);
		$this->db->select('si.sn_date,pi.patient_id,pi.patient_code,pi.first_name,pi.gender,si.Comment_sess,si.Session_count,si.item_name')->from('tbl_session_det si');
		$this->db->join('tbl_patient_info pi','si.patient_id = pi.patient_id');
		$this->db->order_by('si.sn_date','desc');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
   }
  /*  public function events_list() {
		 $this->legacy_db = $this->load->database('second', true);
		 $this->legacy_db->select('ei.ticket,ei.total_seats,ei.event_id,ei.event_image,ei.event_desc,ei.event_name,ei.start_date,ei.start_time,ei.end_date,ei.end_time,ci.city_name,vi.venue_name')->from('tbl_event ei');
		 $this->legacy_db->join('tbl_city ci','ci.city_id = ei.city_id');
		 $this->legacy_db->join('tbl_venue vi','ei.venue_id = vi.venue_id');
		 $date = new DateTime("now");
         $curr_date = $date->format('Y-m-d'); 
		 $this->legacy_db->where('ei.start_date >',$curr_date); 
		 $this->legacy_db->order_by("start_date", "ASC");
		 $query = $this->legacy_db->get();  
		return ($query->num_rows() > 0) ? $query->result_array() : false;
   } */
   public function staff_list() {
		$this->db->where('client_id',$_GET['branch']);
		$this->db->select('*')->from('tbl_staff_info');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
   }
    public function sign_details() {
		//$this->db->where('client_id',$_GET['branch']);
		$this->db->where('patient_id',$_GET['patient_id']);
		$this->db->select('*')->from('tbl_consent_sign');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
   }
   public function staff_register() {
	   $data = array(
		   'first_name' => $_GET['name'],
		   'client_id' => $_GET['branch'],  
		   'date_of_joining' => date('Y-m-d'),
		   'gender' => $_GET['gender'],
		   'is_doctor' => $_GET['type'],
		   'mobile_no' => $_GET['mobile'],
		   'city' => $_GET['city'],
		   'email' => $_GET['email'],
		   'staff_code' =>$this->generatestaff_code()
	   );
	   $this->db->insert('tbl_staff_info',$data);
	   $id =  $this->db->insert_id();
	   return $id;   
	   
   }
   public function generatestaff_code() {
		$query=$this->db->query("select IFNULL(max(substr(staff_code,10,2))+1,1) STAFF_CODE from tbl_staff_info where client_id='".$this->session->userdata('client_id')."'");
		$row = $query->row_array();
		$string  = 'S' . ucfirst(substr($_GET['gender'],0,1)) . ucfirst(substr($this->input->post('first_name'),0,1)) . '/' . date('my') . '/'.$row['STAFF_CODE'];
		return $string;
   }
   public function add_physiotimes($client_id) {
		$data = array(
			 'client_id'=>$client_id,
			 'topic'=>$_GET['name'],
			 'description'=>$_GET['notes'],
			 'link'=>$_GET['link'],
			 'date'=>date('Y-m-d')  
		);
		$this->db->insert('tbl_physiotimes',$data);
		$id = $this->db->insert_id();
		return $id;  
	}	
	public function view_physiotimes() {    
		$this->db->select('pi.blog_id,pi.date,pi.likes,pi.link,ci.mobile,pi.title,pi.description,ci.first_name,ci.last_name,ci.clinic_name')->from('tbl_blog pi');
		$this->db->join('tbl_client ci','ci.client_id = pi.client_id');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
    public function add_likes($times_id) {
		$this->db->where('blog_id',$times_id);
		$this->db->select('likes')->from('tbl_blog');
		$res = $this->db->get();
		$likes = $res->row()->likes;
		$like = $likes + 1; 
        
		$this->db->where('blog_id',$times_id);
		$this->db->set('likes',$like);
		$this->db->update('tbl_blog');
		return $times_id;  
	}
	/* public function event_deatils($events_id) {
		 $this->legacy_db = $this->load->database('second', true);
		 $this->legacy_db->select('ei.ticket,ei.total_seats,ei.event_id,ei.event_image,ei.event_desc,ei.event_name,ei.start_date,ei.start_time,ei.end_date,ei.end_time,ci.city_name,vi.venue_name')->from('tbl_event ei');
		 $this->legacy_db->join('tbl_city ci','ci.city_id = ei.city_id');
		 $this->legacy_db->join('tbl_venue vi','ei.venue_id = vi.venue_id');
		 $date = new DateTime("now");
         $curr_date = $date->format('Y-m-d'); 
		 $this->legacy_db->where('ei.start_date >',$curr_date); 
		 $this->legacy_db->where('ei.event_id',$events_id); 
		 $query = $this->legacy_db->get();  
		return ($query->num_rows() > 0) ? $query->result_array() : false;
   } */
   
   public function search_ankle() {
		 $this->db->where('id <',150);
		 $this->db->select('path,title,id,position,category')->from('physio_ankle');
		 $query = $this->db->get();
		 return ($query->num_rows() > 0 ) ? $query->result_array(): false;
	}
	public function search_ankle1() {
		 $this->db->where('id >',150);
		 $this->db->select('path,title,id,position,category')->from('physio_ankle');
		 $query = $this->db->get();
		 return ($query->num_rows() > 0 ) ? $query->result_array(): false;
	}
	public function search_cervical() {
		$this->db->where('id <',100);
		 $this->db->select('path,title,id,position,category')->from('physio_cervical');
		 $query = $this->db->get();
		 return ($query->num_rows() > 0 ) ? $query->result_array(): false;
	}
	public function search_cervical1() {
		 $this->db->where('id >',100);
		 $this->db->select('path,title,id,position,category')->from('physio_cervical');
		 $query = $this->db->get();
		 return ($query->num_rows() > 0 ) ? $query->result_array(): false;
	}
	public function search_education() {
		 $this->db->select('path,title,id,position,category')->from('physio_education');
		 $query = $this->db->get();
		 return ($query->num_rows() > 0 ) ? $query->result_array(): false;
	}
	public function search_elbow() {
		 $this->db->where('id <',100);
		 $this->db->select('path,title,id,position,category')->from('physio_elbow');
		 $query = $this->db->get();
		 return ($query->num_rows() > 0 ) ? $query->result_array(): false;
	}
	public function search_elbow1() {
		 $this->db->where('id >',99);
		 $this->db->where('id <',210);
		 $this->db->select('path,title,id,position,category')->from('physio_elbow');
		 $query = $this->db->get();
		 return ($query->num_rows() > 0 ) ? $query->result_array(): false;
	}
	public function search_elbow2() {
		 $this->db->where('id >',209);
		 $this->db->select('path,title,id,position,category')->from('physio_elbow');
		 $query = $this->db->get();
		 return ($query->num_rows() > 0 ) ? $query->result_array(): false;
	}
	public function search_hip() {
		 $this->db->where('id <',100);
		 $this->db->select('path,title,id,position,category')->from('physio_hipknee');
		 $query = $this->db->get();
		 return ($query->num_rows() > 0 ) ? $query->result_array(): false;
	}
	public function search_hip1() {
		 $this->db->where('id >',99);
		 $this->db->where('id <',300);
		 $this->db->select('path,title,id,position,category')->from('physio_hipknee');
		 $query = $this->db->get();
		 return ($query->num_rows() > 0 ) ? $query->result_array(): false;
	}
	public function search_hip2() {
		 $this->db->where('id >',299);
		 $this->db->select('path,title,id,position,category')->from('physio_hipknee');
		 $query = $this->db->get();
		 return ($query->num_rows() > 0 ) ? $query->result_array(): false;
	}
	public function search_lumber() {
		 $this->db->where('id >',100);
		 $this->db->select('path,title,id,position,category')->from('physio_lumbar');
		 $query = $this->db->get();
		 return ($query->num_rows() > 0 ) ? $query->result_array(): false;
	}
	public function search_lumber1() {
		 $this->db->where('id >',99);
		 $this->db->where('id <',250);
		 $this->db->select('path,title,id,position,category')->from('physio_lumbar');
		 $query = $this->db->get();
		 return ($query->num_rows() > 0 ) ? $query->result_array(): false;
	}
	public function search_lumber2() {
		 $this->db->where('id >',249);
		 $this->db->select('path,title,id,position,category')->from('physio_lumbar');
		 $query = $this->db->get();
		 return ($query->num_rows() > 0 ) ? $query->result_array(): false;
	}
	public function search_shoulder() {
		 $this->db->where('id <',100);
		 $this->db->select('path,title,id,position,category')->from('physio_shoulder');
		 $query = $this->db->get();
		 return ($query->num_rows() > 0 ) ? $query->result_array(): false;
	}
	public function search_shoulder1() {
		 $this->db->where('id >',99);
		 $this->db->where('id <',250);
		 $this->db->select('path,title,id,position,category')->from('physio_shoulder');
		 $query = $this->db->get();
		 return ($query->num_rows() > 0 ) ? $query->result_array(): false;
	}
	public function search_shoulder2() {
		 $this->db->where('id >',249);
		 $this->db->select('path,title,id,position,category')->from('physio_shoulder');
		 $query = $this->db->get();
		 return ($query->num_rows() > 0 ) ? $query->result_array(): false;
	}
	public function search_special() {
		 $this->db->where('id <',100);
		 $this->db->select('path,title,id,position,category')->from('physio_special');
		 $query = $this->db->get();
		 return ($query->num_rows() > 0 ) ? $query->result_array(): false;
	}
	public function search_special1() {
		 $this->db->where('id >',99);
		 $this->db->where('id <',250);
		 $this->db->select('path,title,id,position,category')->from('physio_special');
		 $query = $this->db->get();
		 return ($query->num_rows() > 0 ) ? $query->result_array(): false;
	}
	public function search_special2() {
		 $this->db->where('id >',249);
		 $this->db->select('path,title,id,position,category')->from('physio_special');
		 $query = $this->db->get();
		 return ($query->num_rows() > 0 ) ? $query->result_array(): false;
	}
	public function exercise_list($client_id) {
		$this->db->where('client_id',$client_id);
		 $this->db->select('chard_no,chart_name,img_path,hold,repet')->from('save_chart');
		 $this->db->group_by('chart_name');
		 $query = $this->db->get();
		 return ($query->num_rows() > 0 ) ? $query->result_array(): false;
	}
    public function default_exercise($client_id) {
		 $this->db->where('client_id',$client_id);
		 $this->db->select('chard_no,chart_name,img_path,hold,repet')->from('save_chart');
		 $this->db->group_by('chart_name');
		 $query = $this->db->get();
		 return ($query->num_rows() > 0 ) ? $query->result_array(): false;
	}
	public function exercisedetail() {
	  $this->db->where('client_id',$_GET['branch']);
	  $this->db->where('chard_no',$_GET['chart_id']);
	  $this->db->select('title,img_path,hold,repet')->from('save_chart');
	  $query = $this->db->get();
	  return ($query->num_rows() > 0 ) ? $query->result_array(): false;
	}
	public function ex_detail() {
	  $this->db->where('client_id',$_GET['branch']);
	  $this->db->where('chard_no',$_GET['chart_id']);
	  $this->db->select('chart_name,hold,repet,complete')->from('save_chart');
	  $this->db->group_by('chart_name');
	  $query = $this->db->get();
	  return ($query->num_rows() > 0 ) ? $query->row_array(): false;
	}
	public function send_exercise() {
		$chart_no = $_GET['chart_id'];
		$pay = 'Free';
		$amt = '0';
		$this->db->where('client_id',$_GET['branch']);
	  	$this->db->where('chard_no',$_GET['chart_id']);
	    $this->db->select('chart_name,verifycode')->from('save_chart');
	    $query = $this->db->get();
		$chartname = $query->row()->chart_name;
	    $verifycode = $query->row()->verifycode;
		
		$patient_id = $_GET['patient_id'];
		$this->db->where('patient_id',$_GET['patient_id']);
	  	$this->db->select('first_name,last_name,email')->from('tbl_patient_info');
	    $query1 = $this->db->get();
		$name = $query1->row()->first_name;
		$lname = $query1->row()->last_name;
		$patient_name =$name.' '.$lname;
	  	$client_mail = $query1->row()->email; 
		if($client_mail != false) {
			$status = 'public';
			
			$this->db->where('client_id',$_GET['branch']);
			$this->db->select('clinic_name')->from('tbl_client');
			$query2 = $this->db->get();
			$clinic_name = $query2->row()->clinic_name;
			$client_id = $_GET['branch'];  
			
			$data = array(
					'patient_name' => $patient_name,
					'patient_id' => $patient_id,
					'email' => $client_mail,
					'ex_date'=>date('Y-m-d'),
					'chartname'=>$chartname,
					'chart_no'=>$chart_no, 
					'client_id'=> $_GET['branch'], 
					'pay'=>$pay, 
					'notify'=>'1', 
					'amount'=>$amt,
					'status'=>$status,
				);
				
				$this->db->insert('prescription_detail',$data); 
			   
			   $patient_info1 = array(
					'patient_name' => $patient_name,
					'patient_id' => $patient_id,
					'email' => $client_mail,
					 'chartname'=>$chartname,
					'chart_no'=>$chart_no
				);
				$this->db->insert('chart_details', $patient_info1); 
				$id = $this->db->insert_id();		   
			
			
			$url = base_url().'pages/pdf_verification/'.$pay.'/'.$client_id.'/'.$patient_id.'/'.$status.'-'.$verifycode;
			$pdfMessage = $this->mail_model->exespdftemplate($url,$verifycode,$status,$client_id);
			$adminMailConfig = array('to' => $client_mail, 'subject' => 'Exercise Chart From' .' '.$clinic_name , 'message' => $pdfMessage);
			$this->mail_model->sendPDF($adminMailConfig);   
			return $id;
		} 
		else {
			$id = 0;
			return $id;
		}	
		
	}
	public function edit_exercise() {
		$this->db->where('client_id',$_GET['branch']);
	    $this->db->where('chard_no',$_GET['chart_id']);
	    $this->db->select('chart_id')->from('save_chart');
        $res = $this->db->get();		
		foreach($res->result_array() as $row){
			$data = array(
			 'repet' => $_GET['repeat'],
			 'hold'=> $_GET['hold'],
			 'complete' => $_GET['complete']
			);
			$this->db->where('chart_id',$row['chart_id']);
	        $this->db->update('save_chart',$data);
		}
		return $_GET['chart_id'];
	}
	public function add_exercise(){  
		$client_id = $_GET['branch'];
	  	$this->db->where('client_id',$_GET['branch']);
        $this->db->select('chard_no')->from('save_chart');
		$this->db->limit(1);
		$this->db->order_by('chart_id','desc');
		$res = $this->db->get();
		if($res->result_array() != false){
			$no = $res->row()->chard_no;
			$val = explode('C',$no);
			$chart_no = 'C'.($val[1]+1);
		} else {
			$chart_no = 'C1';
		}
		
		$id = str_replace('%20','',$_GET['exercise_id']);
		$val = explode(',',$id);
		for($i = 0; $i<count($val);$i++){
			if($_GET['type'] == 1){
				$this->db->where('id',$val[$i]);
				$this->db->select('title,path,description')->from('physio_ankle');
				$res1 = $this->db->get();
				$title = $res1->row()->title;
				$path = $res1->row()->path;
				$description = $res1->row()->description;
				
			}
			else if($_GET['type'] == 2){
				$this->db->where('id',$val[$i]);
				$this->db->select('title,path,description')->from('physio_cervical');
				$res = $this->db->get();
				$title = $res->row()->title;
				$path = $res->row()->path;
				$description = $res->row()->description;
			}
			else if($_GET['type'] == 3){
				$this->db->where('id',$val[$i]);
				$this->db->select('title,path,description')->from('physio_education');
				$res = $this->db->get();
				$title = $res->row()->title;
				$path = $res->row()->path;
				$description = $res->row()->description;
			}
			else if($_GET['type'] == 4){
				$this->db->where('id',$val[$i]);
				$this->db->select('title,path,description')->from('physio_elbow');
				$res = $this->db->get();
				$title = $res->row()->title;
				$path = $res->row()->path;
				$description = $res->row()->description;
			}
			else if($_GET['type'] == 5){
				$this->db->where('id',$val[$i]);
				$this->db->select('title,path,description')->from('physio_hipknee');
				$res = $this->db->get();
				$title = $res->row()->title;
				$path = $res->row()->path;
				$description = $res->row()->description;
			}
			else if($_GET['type'] == 6){
				$this->db->where('id',$val[$i]);
				$this->db->select('title,path,description')->from('physio_lumber');
				$res = $this->db->get();
				$title = $res->row()->title;
				$path = $res->row()->path;
				$description = $res->row()->description;
			}
			else if($_GET['type'] == 7){
				$this->db->where('id',$val[$i]);
				$this->db->select('title,path,description')->from('physio_shoulder');
				$res = $this->db->get();
				$title = $res->row()->title;
				$path = $res->row()->path;
				$description = $res->row()->description;
			}
			else{
				$this->db->where('id',$val[$i]);
				$this->db->select('title,path,description')->from('physio_special');
				$res = $this->db->get();
				$title = $res->row()->title;
				$path = $res->row()->path;
				$description = $res->row()->description;
			}
			$exes_code = $this->exes_code(); 
			$data = array(
			'client_id' => $client_id,
			'chard_no' => $chart_no,
			'chart_name' => $_GET['title'],
			'verifycode' => $exes_code,
			'img_path' => $path,
			'title' => $title,
			'img_description' => $description,
			'repet' => $_GET['session'],
			'hold' => $_GET['hold'],
			'complete' => $_GET['sets'],
			'time' => 'a Day',
			
			);
			$this->db->insert('save_chart',$data);
			
		}
		return $chart_no;
	}
	public function exes_code() {
		$query=$this->db->query("select IFNULL(max(substr(verifycode,1,6))+1,1) EMAIL_VERIFICATION_CODE from save_chart");
		$row = $query->row_array();
		$string  = date('Y-m-d H:i:s').$row['EMAIL_VERIFICATION_CODE'];
		
		return md5($string);
	}
       public function roeveruser_login() {
		$email = $_GET['email'];
		$password = $_GET['password'];
		$this->db->where('email',$email);  
		$this->db->where('password',$password);
		$this->db->where('client_id',19);
		$this->db->where('status',1);
		$this->db->select('clinic_name,client_id,plan,first_name')->from('tbl_client');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
        public function roeverstaffuser_login() {
		$email = $_GET['email'];
		$password = $_GET['password'];
		$this->db->where('ui.username',$email);  
		$this->db->where('ui.password',$password);
		$this->db->where('client_id',19);
		$this->db->where('ui.status !=',2);
		$this->db->select('ui.client_id,ui.staff_id,ui.privileges,ui.create,ui.edit,ci.plan')->from('tbl_user ui');
		$this->db->join('tbl_client ci','ci.client_id = ui.client_id');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function sentnotifications() {  
	  $this->db->where('client_id',$_GET['branch']);
	  $this->db->order_by('notification_id','desc');
	  $this->db->select('*')->from('tbl_notifications');
	  $query = $this->db->get();
	  return ($query->num_rows() > 0 ) ? $query->result_array(): false;
	}
	/* public function cityevents_list() {
		 $this->db->where('client_id',$_GET['client_id']);
		 $this->db->select('latitude,longitude')->from('tbl_client');
		 $res = $this->db->get();
		 $latitude = round($res->row()->latitude);
		 $longitude = round($res->row()->longitude);
		 
		 $this->legacy_db = $this->load->database('second', true);
		 $this->legacy_db->select('(vi.longtitude -'.$longitude.') as lon,(vi.latitude -'.$latitude.') as lat,ei.ticket,ei.total_seats,ei.event_id,ei.event_image,ei.event_desc,ei.event_name,ei.start_date,ei.start_time,ei.end_date,ei.end_time,ci.city_name,vi.venue_name')->from('tbl_event ei');
		 $this->legacy_db->join('tbl_city ci','ci.city_id = ei.city_id');
		 $this->legacy_db->join('tbl_venue vi','ei.venue_id = vi.venue_id');
		 $date = new DateTime("now");
         $curr_date = $date->format('Y-m-d'); 
		 $this->legacy_db->where('ei.start_date >',$curr_date); 
		 $this->legacy_db->order_by("lat", "ASC");
		 $this->legacy_db->order_by("lon", "ASC");
		 $query = $this->legacy_db->get();  
		return ($query->num_rows() > 0) ? $query->result_array() : false; 
   } */
   public function forgot_adminpwd($client_id) {
	   $this->db->select('*')->from('tbl_client')->where('username = "'. $_GET['email'] .'" ');
		$result=$this->db->get();
		if($result->num_rows()>0 && $result->row()->status == 1)
		{
			// patient details for mail template
			$login_url = base_url().'client/dashboard/login';
			$client = array(
				'ClientName' => ucfirst($result->row()->first_name),
				'Password' => $result->row()->password,
				'LoginUrl' => $login_url
			);
			// create email template
			$clientMessage = $this->mail_model->forgetPasswordTemplate($client);
			// mail config
			$clientMailConfig = array('to' => $result->row()->email, 'subject' => 'Congratulations! Password Recovery Successful', 'message' => $clientMessage);
			// send mail
			$this->mail_model->sendEmail($clientMailConfig);
			return true;
		} else if($result->num_rows()>0 && $result->row()->status == 0) {
		} else {
			
		}
   }
   public function forgot_staffpwd($client_id) {
	   $this->db->select('ui.status,ci.email,ui.password,ci.first_name,ci.last_name')->from('tbl_user ui')->where('ui.username = "'. $_GET['email'] .'" ');
	   $this->db->join('tbl_staff_info ci','ui.staff_id =  ci.staff_id');
	   $result=$this->db->get();
       if($result->num_rows()>0 && $result->row()->status == 1)
		{
			// patient details for mail template
			$login_url = base_url().'user/dashboard/login';
			$client = array(
				'ClientName' => ucfirst($result->row()->first_name),
				'Password' => $result->row()->password,
				'LoginUrl' => $login_url
			);
			// create email template
			$clientMessage = $this->mail_model->forgetPasswordTemplate($client);
			// mail config
			$clientMailConfig = array('to' => $result->row()->email, 'subject' => 'Congratulations! Password Recovery Successful', 'message' => $clientMessage);
			// send mail
			$this->mail_model->sendEmail($clientMailConfig);
			return true;
		} else if($result->num_rows()>0 && $result->row()->status == 0) {
		} else {
			
		} 
   }
   public function exam_det() {
	  $this->db->where('patient_id',$_GET['patient_id']);
	  $this->db->where('client_id',$_GET['client_id']);
	  $this->db->select('*')->from('tbl_patient_examination');
	  $query = $this->db->get();
	  return ($query->num_rows() > 0 ) ? $query->result_array(): false;
   }
   public function pexam_det() {
	  $this->db->where('patient_id',$_GET['patient_id']);
	  $this->db->select('*')->from('tbl_patient_paediatric');
	  $query = $this->db->get();
	  return ($query->num_rows() > 0 ) ? $query->result_array(): false;
   }
   public function provisional() {
	  $this->db->where('iv.patient_id',$_GET['patient_id']);
	  $this->db->select('iv.prov_diagnosis,iv.pd_date')->from('tbl_patient_prov_diagnosis iv');
	  //$this->db->join('tbl_prov_diagnosis_list pi','pi.pd_list_id=iv.prov_diagnosis');
	  $query = $this->db->get();
	  return ($query->num_rows() > 0 ) ? $query->result_array(): false;
   }
   public function medical() {
	  $this->db->where('patient_id',$_GET['patient_id']);
	  $this->db->select('*')->from('tbl_patient_medi_info');
	  $query = $this->db->get();
	  return ($query->num_rows() > 0 ) ? $query->result_array(): false;
   }
   public function add_examination() {
		$this->db->where('client_id',$_GET['branch']);
		$this->db->select('username')->from('tbl_client');
		$res = $this->db->get();
		$username = $res->row()->username;
		$data = array(
			'bp_systolic_diastolic' => $_GET['BP'],
			'temperature' => $_GET['temperature'],
			'heart_rate' => $_GET['heart'],
			'respiratory_rate' => $_GET['respiratory'],
			'built_of_patient' => $_GET['built'],
			'posture' => $_GET['posture'],
			'gait' => $_GET['gait'],
			'scar' => $_GET['scar'],
			'desc' => $_GET['desc'],
			'patient_id' => $_GET['patient_id'],
			'client_id' => $_GET['branch'],
			'created_by' => $username,
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $username,
			'modify_date' => date('Y-m-d H:i:s'),
			'examn_date'=> date('Y-m-d')
		);
		$this->db->insert('tbl_patient_examination',$data);
		$id = $this->db->insert_id();
		return $id;
	}
	public function add_pediatricexam() {
		$this->db->where('client_id',$_GET['branch']);
		$this->db->select('username')->from('tbl_client');
		$res = $this->db->get();
		$username = $res->row()->username;
		$data = array(
		    'paediatric_date' => date('Y-m-d'),
			'milestone' => $_GET['milestone'],
			'language' => $_GET['language'],
			'social' => $_GET['social'],
			'finemotor' => $_GET['fine'],
			'grossmotor' => $_GET['gross'],
			'patient_id' => $_GET['patient_id'],
			'reflexes' => $_GET['reflexes'],
			'client_id' => $_GET['branch'],
			'created_by' => $username,
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $username,
			'modify_date' => date('Y-m-d H:i:s'),
		);
		$this->db->insert('tbl_patient_paediatric',$data);
		$id = $this->db->insert_id();
		return $id;
	}
	public function add_medicaldiag() {
		$this->db->where('client_id',$_GET['branch']);
		$this->db->select('username')->from('tbl_client');
		$res = $this->db->get();
		$username = $res->row()->username;
		$data = array(
		    'date'=> date('Y-m-d'),
			'bio' => $_GET['medicaldiag'],
			'client_id' => $_GET['branch'],
			'patient_id' => $_GET['patient_id'],
			
		);
		$this->db->insert('tbl_patient_medi_info',$data);
		$id = $this->db->insert_id();
		return $id;
	}
	public function add_provisionaldiag() {
		$this->db->where('client_id',$_GET['branch']);
		$this->db->select('username')->from('tbl_client');
		$res = $this->db->get();
		$username = $res->row()->username;
		$data = array(
			'prov_diagnosis	' => $_GET['providiag'],
			'client_id' => $_GET['branch'],
			'patient_id' => $_GET['patient_id'],
			'created_by' => $username,
			'pd_date'=> date('Y-m-d'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $username,
			'modify_date' => date('Y-m-d H:i:s'),
		);
		$this->db->insert('tbl_patient_prov_diagnosis',$data);
		$id = $this->db->insert_id();
		return $id;
	}
	public function get_provisional() {
		 $this->db->select('pd_list_id,pd_list_name')->from('tbl_prov_diagnosis_list');
		 $query = $this->db->get();
		 return ($query->num_rows() > 0 ) ? $query->result_array(): false;
	}
	 public function sexam_det() 
	 {
		$where = array('patient_id' => $_GET['patient_id']);
		$this->db->select('sexamn_date,sexamn_id')->from('tbl_patient_sensory_examination')->where($where);
		$this->db->order_by("sexamn_date", "asc");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function add_nuero(){
		$nuero_id = rand();
		$ulnar_left = $_GET['ulnar_left'];
		$ulnar_right = $_GET['ulnar_right'];
		$radial_left = $_GET['Radial_left'];
		$radial_right = $_GET['Radial_right'];
		$median_left = $_GET['Median_left'];
		$median_right = $_GET['Median_right'];
		$musculocutaneous_left = $_GET['Musculocutaneous_left'];
		$musculocutaneous_right = $_GET['Musculocutaneous_right'];
		$sciatic_left = $_GET['Sciatic_left'];
		$sciatic_right = $_GET['Sciatic_right'];
		$tibial_left = $_GET['Tibial_left'];
		$tibial_right = $_GET['Tibial_right'];
		$commanperonial_left = $_GET['Commanperonial_left'];
		$commanperonial_right = $_GET['Commanperonial_right'];
		$femoral_left = $_GET['Femoral_left'];
		$femoral_right = $_GET['Femoral_right'];
		$lateralcutaneous_left = $_GET['Lateralcutaneous_left'];
		$lateralcutaneous_right = $_GET['Lateralcutaneous_right'];
		$obturator_left = $_GET['Obturator_left'];
		$obturator_right = $_GET['Obturator_right'];
		$sural_left = $_GET['Sural_left'];
		$sural_right = $_GET['Sural_right'];
		if($ulnar_left != '' || $ulnar_right != '' || $radial_left != '' || $radial_right != '' || $median_left != '' || $median_right != '' || $musculocutaneous_left != '' || $musculocutaneous_right != '' || $sciatic_left != '' || $sciatic_right != '' || $tibial_left != '' || $tibial_right != '' || $commanperonial_left != '' || $commanperonial_right != '' || $femoral_left != '' || $femoral_right != '' || $lateralcutaneous_left != '' || $lateralcutaneous_right != '' || $obturator_left != '' || $obturator_right != '' || $sural_left != '' || $sural_right != '')
		{
			
		$glasgow_info = array(
				'client_id' => $_GET['client_id'],
				//'nuero_date' => date('Y-m-d'),
				'patient_id' => $_GET['patient_id'],
				'nuero_id' => $nuero_id,
				'ulnar_left' => $ulnar_left,
				'ulnar_right' => $ulnar_right,
				'radial_left' => $radial_left,
				'radial_right' => $radial_right,
				'median_left' => $median_left,
				'median_right' => $median_right,
				'musculocutaneous_left' => $musculocutaneous_left,
				'musculocutaneous_right' => $musculocutaneous_right,
				'sciatic_left' => $sciatic_left,
				'sciatic_right' => $sciatic_right,
				'tibial_left' => $tibial_left,
				'tibial_right' => $tibial_right,
				'commanperonial_left' => $commanperonial_left,
				'commanperonial_right' => $commanperonial_right,
				'femoral_left' => $femoral_left,
				'femoral_right' => $femoral_right,
				'lateralcutaneous_left' => $lateralcutaneous_left,
				'lateralcutaneous_right' => $lateralcutaneous_right,
				'obturator_left' => $obturator_left,
				'obturator_right' => $obturator_right,
				'sural_left' => $sural_left,
				'sural_right' => $sural_right
			);
			$this->db->insert('tbl_patient_nuero_dynamic', $glasgow_info);
		}
		$scar = $_GET['scar'];
		$adhere = $_GET['adhere'];
		if($scar != '' || $adhere != '')
		{
		$glasgow_info = array(
				'client_id' => $_GET['client_id'],
				'patient_id' => $_GET['patient_id'],
				'nuero_id' => $nuero_id,
				'scartype' => $scar,
				'adhereto' => $adhere
				
			);
			$this->db->insert('tbl_patient_nuero_special', $glasgow_info);
		}
		$name = $_GET['name'];
		$description = $_GET['description'];
		
		if($name != '' || $description != '')
		{
			
		$glasgow_info = array(
				'client_id' => $_GET['client_id'],
				'patient_id' => $_GET['patient_id'],
				'nuero_id' => $nuero_id,
				'name' => $name,
				'description' => $description
				
			);
			$this->db->insert('tbl_patient_nuero_adl', $glasgow_info);
		}
		$ulnar_left1 = $_GET['ulnar_left1'];
		$ulnar_right1 = $_GET['ulnar_right1'];
		$Radial_left1 = $_GET['Radial_left1'];
		$Radial_right1 = $_GET['Radial_right1'];
		$Median_left1 = $_GET['Median_left1'];
		$Median_right1 = $_GET['Median_right1'];
		$Sciatic_left1 = $_GET['Sciatic_left1'];
		$Sciatic_right1 = $_GET['Sciatic_right1'];
		$Tibial_left1 = $_GET['Tibial_left1'];
		$Tibial_right1 = $_GET['Tibial_right1'];
		$Commanperonial_left1 = $_GET['peronial_left1'];
		$Commanperonial_right1 = $_GET['peronial_right1'];
		$Femoral_left1 = $_GET['Femoral_left1'];
		$Femoral_right1 = $_GET['Femoral_right1'];
		$Saphenous_left1 = $_GET['Saphenous_left1'];
		$Saphenous_right1 = $_GET['Saphenous_right1'];
		
		$Sural_left1 = $_GET['Sural_left1'];
		$Sural_right1 = $_GET['Sural_right1'];
		if($ulnar_left1 != '' || $ulnar_right1 != '' || $Radial_left1 != '' || $Radial_right1 != '' || $Median_left1 != '' || $Median_right1 != '' || $Sciatic_left1 != '' || $Sciatic_right1 != '' || $Tibial_left1 != '' || $Tibial_right1 != '' || $Commanperonial_left1 != '' || $Commanperonial_right1 != '' || $Femoral_left1 != '' || $Femoral_right1 != '' || $Sural_left1 != '' || $Sural_right1 != '' || $Saphenous_left1 != '' || $Saphenous_right1 != '')
		{
		
		$glasgow_info = array(
				'client_id' => $_GET['client_id'],
				'patient_id' => $_GET['patient_id'],
				'nuero_id' => $nuero_id,
				'ulnar_left' => $ulnar_left1,
				'ulnar_right' => $ulnar_right1,
				'Radial_left' => $Radial_left1,
				'Radial_right' => $Radial_right1,
				'Median_left' => $Median_left1,
				'Median_right' => $Median_right1,
				'Sciatic_left' => $Sciatic_left1,
				'Sciatic_right' => $Sciatic_right1,
				'Tibial_left' => $Tibial_left1,
				'Tibial_right' => $Tibial_right1,
				'peronial_left' => $Commanperonial_left1,
				'peronial_right' => $Commanperonial_right1,
				'Femoral_left' => $Femoral_left1,
				'Femoral_right' => $Femoral_right1,
				'Saphenous_left' => $Saphenous_left1,
				'Saphenous_right' => $Saphenous_right1,
    			'Sural_left' => $Sural_left1,
				'Sural_right' => $Sural_right1
			);
			$this->db->insert('tbl_patient_nuero_tissue', $glasgow_info);
		}
		$eyeopenin = $_GET['eyeopen'];
		$verbal = $_GET['verbal'];
		$motor = $_GET['motor'];
		if(($eyeopenin != '') || ($verbal != '') || ($motor != '')){
			$glasgow_total = $eyeopenin + $verbal + $motor;
			$glasgow_info = array(
				'client_id' => $_GET['client_id'],
				'patient_id' => $_GET['patient_id'],
				'nuero_date' => date('Y-m-d'),
				'nuero_id' => $nuero_id,
				'eyeopening' => isset($eyeopenin)?$eyeopenin:' ',
				'verbalresponse' => isset($verbal)?$verbal:' ',
				'motorresponse' => isset($motor)?$motor:' ',
				'total' => $glasgow_total
			);
			$this->db->insert('tbl_patient_nuero_glasgow', $glasgow_info);
		}
		
		$h1	= $_GET['h1'];
		$h2	= $_GET['h2'];
		$h3	= $_GET['h3'];
		$a1	= $_GET['a1'];
		$a2	= $_GET['a2'];
		$a3	= $_GET['a3'];
		$f1	= $_GET['f1'];
		$f2	= $_GET['f2'];
		$f3	= $_GET['f3'];
		if(($f1 != '') || ($f2 != '') || ($f3 != '')||($a1 != '')||($a2 != '')||($a3 != '')||($h1 != '')||($h2 != '')||($h3 != '')){
			$verbal_info = array(
				'client_id' => $_GET['client_id'],
				'patient_id' => $_GET['patient_id'],
				'nuero_date' => date('Y-m-d'),
				'nuero_id' => $nuero_id,
				'f1' => $f1,
				'f2' => $f2,
				'f3' => $f3,
				'a1' => $a1,
				'a2' => $a2,
				'a3' => $a3,
				'h1' => $h1,
				'h2' => $h2,
				'h3' => $h3,
			);
			$this->db->insert('tbl_patient_nuero_verbal', $verbal_info);
		}
		
		$gait = $_GET['gait'];
		$speed = $_GET['speed'];
		$horizontal = $_GET['horizontal'];
		$vertical = $_GET['vertical'];
		$pivot = $_GET['pivot'];
		$obstacle = $_GET['obstacle'];
		$obstacles = $_GET['obstacles'];
		$steps = $_GET['steps'];
		$balance = $_GET['balance'];
		
		if(($gait != '') ||($speed != '') ||($horizontal != '') ||($vertical != '') ||($pivot != '') ||($obstacle != '') ||($obstacles != '') ||($steps != '') ||($balance != '')){
		$gait_total = $gait+$speed+$horizontal +$vertical+$pivot+$obstacle+$obstacles+$steps;
			$gait_info = array(
				'client_id' => $_GET['client_id'],
				'patient_id' => $_GET['patient_id'],
				'nuero_date' => date('Y-m-d'),
				'nuero_id' => $nuero_id,
				'surface' => $gait,
				'speed' => $speed,
				'horizontal' => $horizontal,
				'vertical' => $vertical,
				'pivot' => $pivot,
				'obstacle' => $obstacle,
				'obstacles' => $obstacles,
				'steps' => $steps,
				'balance' => $balance,
				'total' => $gait_total
			);
			$this->db->insert('tbl_patient_nuero_gait', $gait_info);
		}
		
		$bowels = $_GET['bowels'];
		$bladder = $_GET['bladder'];
		$grooming = $_GET['grooming'];
		$toilet = $_GET['toilet'];
		$feeding = $_GET['feeding'];
		$transfer = $_GET['transfer'];
		$mobility = $_GET['mobility'];
		$dressing = $_GET['dressing'];
		$stairs = $_GET['stairs'];
		$bathing = $_GET['bathing'];
		
		if(($bowels != '') ||($bladder != '') ||($grooming != '') ||($toilet != '') ||($feeding != '') ||($transfer != '') ||($mobility != '') ||($dressing != '') ||($stairs != '') ||($bathing != '')){
			$function_total = $bowels+$bladder+$grooming+$toilet+$feeding+$transfer+$mobility +$dressing+$stairs+$bathing;
			$function_info = array(
				'client_id' => $_GET['client_id'],
				'patient_id' => $_GET['patient_id'],
				'nuero_date' => date('Y-m-d'),
				'nuero_id' => $nuero_id,
				'bowels'=> $bowels,
				'bladder'=> $bladder,
				'grooming'=> $grooming,
				'toilet'=> $toilet,
				'feeding'=> $feeding,
				'transfer'=> $transfer,
				'mobility'=> $mobility,
				'dressing'=> $dressing,
				'stairs'=> $stairs,
				'bathing'=> $bathing,
				'total' => $function_total
			);
			$this->db->insert('tbl_patient_nuero_functional',$function_info);
		}
		
		if($scar != '' || $adhere != '' || $eyeopenin != '' || ($verbal != '') || $name != '' || $description != '' || ($motor != '')||($f1 != '') || ($f2 != '') || ($f3 != '')||($a1 != '')||($a2 != '')||($a3 != '')||($h1 != '')||($h2 != '')||($h3 != '')||($gait != '') ||($speed != '') ||($horizontal != '') ||($vertical != '') ||($pivot != '') ||($obstacle != '') ||($obstacles != '') ||($steps != '') ||($balance != '')||($bowels != '') ||($bladder != '') ||($grooming != '') ||($toilet != '') ||($feeding != '') ||($transfer != '') ||($mobility != '') ||($dressing != '') ||($stairs != '') ||($bathing != '')||$ulnar_left != '' || $ulnar_right != '' || $Radial_left != '' || $Radial_right != '' || $Median_left != '' || $Median_right != '' || $Musculocutaneous_left != '' || $Musculocutaneous_right != '' || $Sciatic_left != '' || $Sciatic_right != '' || $Tibial_left != '' || $Tibial_right != '' || $Commanperonial_left != '' || $Commanperonial_right != '' || $Femoral_left != '' || $Femoral_right != '' || $Lateralcutaneous_left != '' || $Lateralcutaneous_right != '' || $Obturator_left != '' || $Obturator_right != '' || $Sural_left != '' || $Sural_right != '' || $ulnar_left1 != '' || $ulnar_right1 != '' || $Radial_left1 != '' || $Radial_right1 != '' || $Median_left1 != '' || $Median_right1 != '' || $Sciatic_left1 != '' || $Sciatic_right1 != '' || $Tibial_left1 != '' || $Tibial_right1 != '' || $Commanperonial_left1 != '' || $Commanperonial_right1 != '' || $Femoral_left1 != '' || $Femoral_right1 != '' || $Sural_left1 != '' || $Sural_right1 != '' || $Saphenous_left1 != '' || $Saphenous_right1 != '')
		{
			$nuero_info = array(
				'nuero_id' => $nuero_id,
				'patient_id' => $_GET['patient_id'],
				'nuero_date' => date('Y-m-d'),
				'glasgow_total' => isset($glasgow_total)?$glasgow_total:0,
				'dynamic_total' => isset($gait_total)?$gait_total:0,
				'functional_total' => isset($function_total)?$function_total:0
			);
			$this->db->insert('tbl_patient_nuero',$nuero_info);
			$data['patient_id']= $_GET['patient_id'];
			$id = $nuero_id;
			$visit_date = date('Y-m-d');
			$visit_date_value = $this->common_model->alreadyExistsVisitdate($_GET['patient_id'],$visit_date);
			if($visit_date_value == false){
				$visit_info = array('patient_id' => $_GET['patient_id'],
				'client_id' => $_GET['client_id'],
				'visit_date' => $visit_date);
				$this->db->insert('tbl_patient_visits', $visit_info);
			}
		}
		return $_GET['patient_id'];
	} 
	public function add_sexamn() {
		$this->db->where('client_id',$_GET['branch']);
		$this->db->select('username')->from('tbl_client');
		$res = $this->db->get();
		$user_name = $res->row()->username;
		
		$sexamination_info = array(
			'client_id' => $_GET['branch'],
			'patient_id' => $_GET['patient_id'],
			'sexamn_date' => date('Y-m-d'),
			'c2_occipital_protuberance' => $_GET['c2_occipital_protuberance'],
			'c2_neck_flexion_extension' => $_GET['c2_neck_flexion_extension'],
			'c3_supraclavicular_fossa' => $_GET['c3_supraclavicular_fossa'],
			'c3_neck_lateral_flexionlar_joint' => $_GET['c3_neck_lateral_flexionlar_joint'],
			'c4_acromioclavicular_joint' => $_GET['c4_acromioclavicular_joint'],
			'c4_shoulder_elevation' => $_GET['c4_shoulder_elevation'],
			'c5_antecubital_fossa' => $_GET['c5_antecubital_fossa'],
			'c5_shoulder_abduction' => $_GET['c5_shoulder_abduction'],
			'c5_biceps_brachioradialis' => $_GET['c5_biceps_brachioradialis'],
			'c6_thumb' => $_GET['c6_thumb'],
			'c6_biceps_wristextensors' => $_GET['c6_biceps_wristextensors'],
			'c6_biceps_brachioradialis' => $_GET['c6_biceps_brachioradialis'],
			'c7_middle_finger' => $_GET['c7_middle_finger'],
			'c7_wristflexors_triceps' => $_GET['c7_wristflexors_triceps'],
			'c7_triceps' => $_GET['c7_triceps'],
			'c8_little_finger' => $_GET['c8_little_finger'],
			'c8_thumb_extensor_adductors' => $_GET['c8_thumb_extensor_adductors'],
			'c8_triceps' => $_GET['c8_triceps'],
			't1_medialside_antecubital' => $_GET['t1_medialside_antecubital'],
			't2_apexof_axilla' => $_GET['t2_apexof_axilla'],
			't4_nipples' => $_GET['t4_nipples'],
			't6_xiphisternum' => $_GET['t6_xiphisternum'],
			't10_umbilicus' => $_GET['t10_umbilicus'],
			't12_midpoint_ofthe_inguinal_ligament' => $_GET['t12_midpoint_ofthe_inguinal_ligament'],
			'l2_midanterior_thigh' => $_GET['l2_midanterior_thigh'],
			'l2_hip_flexion' => $_GET['l2_hip_flexion'],
			'l2_patellar' => $_GET['patellar'],
			'l3_medial_epicondyle_ofthe_femur' => $_GET['l3_medial_epicondyle_ofthe_femur'],
			'l3_knee_extension' => $_GET['l3_knee_extension'],
			'l3_pain_with_slr' => $_GET['l3_pain_with_slr'],
			'l4_medial_malleolus' => $_GET['l4_medial_malleolus'],
			'l4_ankle_dorsi_flexion' => $_GET['l4_ankle_dorsi_flexion'],
			'l5_dorsumof_root' => $_GET['l5_dorsumof_root'],
			'l5_great_toe_extension' => $_GET['l5_great_toe_extension'],
			's1_lateral_heel' => $_GET['s1_lateral_heel'],
			's1_ankle_plantar_flexion' => $_GET['s1_ankle_plantar_flexion'],
			's1_limitedslr_achillesreflex' => $_GET['s1_limitedslr_achillesreflex'],
			's2_popliteal_fossa' => $_GET['s2_popliteal_fossa'],
			's2_knee_flexion' => $_GET['s2_knee_flexion'],
			's2_limitedslr_achillesreflex' => $_GET['s2_limitedslr_achillesreflex'],
			's5_perianal' => $_GET['s5_perianal'],
			's5_bladder_rectum' => $_GET['s5_bladder_rectum'],
			'created_by' => $user_name,
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $user_name,
			'modify_date' => date('Y-m-d H:i:s'),
		);
		$this->db->insert('tbl_patient_sensory_examination', $sexamination_info);
	    $data['sexamn_id']=$this->db->insert_id();
		
		$visit_date = date('Y-m-d');
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($_GET['patient_id'],$visit_date);
		if($visit_date_value == false){
		$visit_info = array('patient_id' =>$_GET['patient_id'], 'client_id' => $_GET['branch'],'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		return $data;
	}
	public function nexam_det(){
		$where = array('patient_id' => $_GET['patient_id']);
		$this->db->select('*')->from('tbl_patient_nuero')->where($where);
		$this->db->order_by("nuero_date", "asc");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	public function get_treatment() 
	 {
		$where = array('client_id' => $_GET['client_id']);
		$this->db->select('*')->from('tbl_item')->where($where);
		$this->db->order_by("item_id", "desc");
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function get_expense() 
	 {
		$where = array('client_id' => $_GET['client_id']);
		$this->db->select('*')->from('tbl_expanse_client_item')->where($where);
		$this->db->order_by("item_id", "desc");
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function edit_treatmentitem() 
	 {
		$data = array(
			'item_name' => $_GET['item_name'],
			'item_desc' => $_GET['item_desc'],
			'item_price' => $_GET['item_price']
		);
		$this->db->where('client_id',$_GET['client_id']);
		$this->db->where('item_id',$_GET['item_id']);
		$this->db->update('tbl_item',$data);
		return $_GET['item_id'];
	}
	public function edit_expenseitem() 
	 {
		$data = array(
			'item_name' => $_GET['item_name'],
			'item_desc' => $_GET['item_desc'],
			'item_price' => $_GET['item_price']
		);
		$this->db->where('client_id',$_GET['client_id']);
		$this->db->where('item_id',$_GET['item_id']);
		$this->db->update('tbl_expanse_client_item',$data);
		return $_GET['item_id'];
	}
	public function deletetreatmentitem() {
		$this->db->where('item_id',$_GET['item_id']);
		$this->db->where('client_id',$_GET['client_id']);
		$this->db->delete('tbl_item');
		return true;
	}
	public function deleteexpenseitem() {  
		$this->db->where('item_id',$_GET['item_id']);
		$this->db->where('client_id',$_GET['client_id']);
		$this->db->delete('tbl_expanse_client_item');
		return true;
	}
	public function get_treatmentdet() 
	 {
		$this->db->where('client_id',$_GET['client_id']);
		$this->db->where('item_id',$_GET['item_id']);
		$this->db->select('*')->from('tbl_item');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function get_expensedet() 
	 {
		$this->db->where('client_id',$_GET['client_id']);
		$this->db->where('item_id',$_GET['item_id']);
		$this->db->select('*')->from('tbl_expanse_client_item');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function add_motor() {
		$this->db->where('client_id',$_GET['client_id']);
		$this->db->select('username')->from('tbl_client');
		$res = $this->db->get();
		$user_name = $res->row()->username;
		
		$this->db->where('client_id',$_GET['client_id']);
		$this->db->select('username')->from('tbl_client');
		$res = $this->db->get();
		$user_name = $res->row()->username;
		 $mexamination_info = array(
			'client_id' => $_GET['client_id'],
			'patient_id' => $_GET['patient_id'],
			'mexamn_date' => date('Y-m-d'),
			'ant_spine_to_inmal' => $_GET['ant_spine_to_inmal'],
			'app_leg_shoet' => $_GET['app_leg_shoet'],
			'mid_thigh_circum' => $_GET['mid_thigh_circum'],
			'mid_calf_circum' => $_GET['mid_calf_circum'],
			'created_by' => $user_name,
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $user_name,
			'modify_date' => date('Y-m-d H:i:s'),
		);
				
		$this->db->insert('tbl_patient_motor_examination', $mexamination_info);
		$mexamn_id = $this->db->insert_id();
		$flexion1= $_GET['flexion1'];
		$Extension1= $_GET['Extension1'];
		$SideFlexion_left1= $_GET['SideFlexion_left1'];
		$SideFlexion_right1= $_GET['SideFlexion_right1'];
		$Rotation_left1= $_GET['Rotation_left1'];
		$Rotation_right1= $_GET['Rotation_right1'];
		if($flexion1 != 'undefined' || $Extension1 != 'undefined' || $SideFlexion_left1 != 'undefined' || $SideFlexion_right1 != 'undefined' || $Rotation_left1 != 'undefined' || $Rotation_right1 != 'undefined')
		{
			$cervical = array(
				'client_id' => $_GET['client_id'],
				'mexamn_id' => $mexamn_id,
				'flexion1' => $_GET['flexion1'],
				'patient_id' => $_GET['patient_id'],
				'Extension1' => $_GET['Extension1'],
				'SideFlexion_left1' => $_GET['SideFlexion_left1'],
				'SideFlexion_right1' => $_GET['SideFlexion_right1'],
				'Rotation_left1' => $_GET['Rotation_left1'],
				'Rotation_right1' => $_GET['Rotation_right1'],
			);
			$this->db->insert('tbl_patient_motor_cervical', $cervical);
		}
		$flexion2=$_GET['flexion2'];
		$Extension2=$_GET['Extension2'];
		$SideFlexion_left2=$_GET['SideFlexion_left2'];
		$SideFlexion_right2=$_GET['SideFlexion_right2'];
		$Rotation_left2=$_GET['rotation_left2'];
		$Rotation_right2=$_GET['rotation_right2'];
		

		if($flexion2 != 'undefined' || $Extension2 != 'undefined' || $SideFlexion_left2 != 'undefined' || $SideFlexion_right2 != 'undefined' || $Rotation_left2 != 'undefined' || $Rotation_right2 != 'undefined')
		{
		
			$tho = array(
				'client_id' =>$_GET['client_id'],
				'patient_id' => $_GET['patient_id'],
				'mexamn_id' => $mexamn_id,
				'flexion2' => $_GET['flexion2'],
				'Extension2' => $_GET['Extension2'],
				'SideFlexion_left2' => $_GET['SideFlexion_left2'],
				'SideFlexion_right2' => $_GET['SideFlexion_right2'],
				'rotation_left2' => $_GET['rotation_left2'],
				'rotation_right2' => $_GET['rotation_right2']
			);
		  $this->db->insert('tbl_patient_motor_thoraccic',$tho);
		}
		$flexion3=$_GET['flexion3'];
		$Extension3=$_GET['Extension3'];
		$SideFlexion_left3=$_GET['SideFlexion_left3'];
		$SideFlexion_right3=$_GET['SideFlexion_right3'];
		$Rotation_left3=$_GET['rotation_left3'];
		$Rotation_right3=$_GET['rotation_right3'];
		

		if($flexion3 != 'undefined' || $Extension3 != 'undefined' || $SideFlexion_left3 != 'undefined' || $SideFlexion_right3 != 'undefined' || $Rotation_left3 != 'undefined' || $Rotation_right3 != 'undefined')
		{
		    $lum = array(
				'client_id' => $_GET['client_id'],
				'patient_id' => $_GET['patient_id'],
				'mexamn_id' => $mexamn_id,
				'flexion3' => $_GET['flexion3'],
				'Extension3' => $_GET['Extension3'],
				'SideFlexion_left3' => $_GET['SideFlexion_left3'],
				'SideFlexion_right3' => $_GET['SideFlexion_right3'],
				'rotation_left3' => $_GET['rotation_left3'],
				'rotation_right3' => $_GET['rotation_right3']
			);
			$this->db->insert('tbl_patient_motor_lumber',$lum);
		}
		$respirationApex=$_GET['respiration_apex'];
		$respirationBase=$_GET['respiration_base'];
		$totRespirationMuscle=count($_GET['respiration_base']);
		for($q = 0; $q < 3; $q++)
		{
				if($respirationApex[$q]!= 'undefined' || $respirationBase[$q]!= 'undefined' )
				{
					$respiration[$q] = array(
					'client_id' => $_GET['client_id'],
					'patient_id' => $_GET['patient_id'],
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'respiration_muscle_id' => $q,
					'respiration_apex' => $respirationApex[$q],
					'respiration_base' => $respirationBase[$q],
				);
			}
		}
		if(!empty($respiration)){
			$this->db->insert_batch('tbl_patient_mexamination_respiration', $respiration);
		}
		
		$headneck = array();
		$leftHeadneckTone = explode(',',$_GET['left_headneck_tone']);
		$leftHeadneckPower = explode(',',$_GET['left_headneck_power']);
		$leftHeadneckRom = explode(',',$_GET['left_headneck_rom']);
		$rightHeadneckTone = explode(',',$_GET['right_headneck_tone']);
		$rightHeadneckPower = explode(',',$_GET['right_headneck_power']);
		$rightHeadneckRom = explode(',',$_GET['right_headneck_rom']);
		for($n = 0; $n < 7; $n++)  
		{  
			if($leftHeadneckTone[$n]!= '' || $leftHeadneckPower[$n]!='' || $leftHeadneckRom[$n]!='' || $rightHeadneckTone[$n]!='' || $rightHeadneckPower[$n]!='' || $rightHeadneckRom[$n]!='' )
				{	
					$headneck[$n] = array(
					'client_id' => $_GET['client_id'],
					'patient_id' => $_GET['patient_id'],
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'headneck_muscle_id' => $n,
					'left_headneck_tone' => $leftHeadneckTone[$n],
					'left_headneck_power' => $leftHeadneckPower[$n],
					'left_headneck_rom' => $leftHeadneckRom[$n],
					'right_headneck_tone' => $rightHeadneckTone[$n],
					'right_headneck_power' => $rightHeadneckPower[$n],
					'right_headneck_rom' => $rightHeadneckRom[$n],
				);
			}
		}  
		if(!empty($headneck)){
			$this->db->insert_batch('tbl_patient_mexamination_headneck', $headneck);
		}
		
		$hip = array();
		$leftHipTone= explode(',',$_GET['left_hip_tone']);
		$leftHipPower=explode(',',$_GET['left_hip_power']);
		$leftHipRom=explode(',',$_GET['left_hip_rom']);
		$rightHipTone=explode(',',$_GET['right_hip_tone']);
		$rightHipPower=explode(',',$_GET['right_hip_power']);
		$rightHipRom=explode(',',$_GET['right_hip_rom']);
		for($o=0; $o < 9; $o++)
		{
				if($leftHipTone[$o]!='' || $leftHipPower[$o]!='' || $leftHipRom[$o]!='' || $rightHipTone[$o]!='' || $rightHipPower[$o]!='' || $rightHipRom[$o]!='' )
				{
					$hip[$o] = array(
					'client_id' => $_GET['client_id'],
					'patient_id' => $_GET['patient_id'],
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'hip_muscle_id' => $o,
					'left_hip_tone' => $leftHipTone[$o],
					'left_hip_power' => $leftHipPower[$o],
					'left_hip_rom' => $leftHipRom[$o],
					'right_hip_tone' => $rightHipTone[$o],
					'right_hip_power' => $rightHipPower[$o],
					'right_hip_rom' => $rightHipRom[$o],
				);
			}
		}
		if(!empty($hip)){  
			$this->db->insert_batch('tbl_patient_mexamination_hip', $hip);
		}
		$knee = array();
		$leftKneeTone = explode(',',$_GET['left_knee_tone']);
		$leftKneePower = explode(',',$_GET['left_knee_power']);
		$leftKneeRom = explode(',',$_GET['left_knee_rom']);
		$rightKneeTone = explode(',',$_GET['right_knee_tone']);
		$rightKneePower = explode(',',$_GET['right_knee_power']);
		$rightKneeRom = explode(',',$_GET['right_knee_rom']);
		for($p=0; $p<4; $p++)
		{
				if($leftKneeTone[$p]!='' || $leftKneePower[$p]!='' || $leftKneeRom[$p]!='' || $rightKneeTone[$p]!='' || $rightKneePower[$p]!='' || $rightKneeRom[$p]!='' )
				{
					$knee[$p] = array(
					'client_id' => $_GET['client_id'],
					'patient_id' => $_GET['patient_id'],
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'knee_muscle_id' => $p,
					'left_knee_tone' => $leftKneeTone[$p],
					'left_knee_power' => $leftKneePower[$p],
					'left_knee_rom' => $leftKneeRom[$p],
					'right_knee_tone' => $rightKneeTone[$p],
					'right_knee_power' => $rightKneePower[$p],
					'right_knee_rom' => $rightKneeRom[$p],
				);
			}
		}
		if(!empty($knee)){
		    $this->db->insert_batch('tbl_patient_mexamination_knee', $knee);
		}
		$ankle = array();
		$leftAnkleTone=explode(',',$_GET['left_ankle_tone']);
		$leftAnklePower=explode(',',$_GET['left_ankle_power']);
		$leftAnkleRom=explode(',',$_GET['left_ankle_rom']);
		$rightAnkleTone=explode(',',$_GET['right_ankle_tone']);
		$rightAnklePower=explode(',',$_GET['right_ankle_power']);
		$rightAnkleRom=explode(',',$_GET['right_ankle_rom']);
		for($i=0; $i<5; $i++)
		{
				if($leftAnkleTone[$i]!='' || $leftAnklePower[$i]!='' || $leftAnkleRom[$i]!='' || $rightAnkleTone[$i]!='' || $rightAnklePower[$i]!='' || $rightAnkleRom[$i]!='' )
				{
					$ankle[$i] = array(
					'client_id' => $_GET['client_id'],
					'patient_id' => $_GET['patient_id'],
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d'),
					'ankle_muscle_id' => $i,
					'left_ankle_tone' => $leftAnkleTone[$i],
					'left_ankle_power' => $leftAnklePower[$i],
					'left_ankle_rom' => $leftAnkleRom[$i],
					'right_ankle_tone' => $rightAnkleTone[$i],
					'right_ankle_power' => $rightAnklePower[$i],
					'right_ankle_rom' => $rightAnkleRom[$i],
				);
			}
		}
		if(!empty($ankle)){
			$this->db->insert_batch('tbl_patient_mexamination_ankle', $ankle);
		}
		$toes = array();
		$leftToesTone=explode(',',$_GET['left_toes_tone']);
		$leftToesPower=explode(',',$_GET['left_toes_power']);
		$leftToesRom=explode(',',$_GET['left_toes_rom']);
		$rightToesTone=explode(',',$_GET['right_toes_tone']);
		$rightToesPower=explode(',',$_GET['right_toes_power']);
		$rightToesRom=explode(',',$_GET['right_toes_rom']);
		for($u=0; $u<2; $u++)
		{
				if($leftToesTone[$u]!='' || $leftToesPower[$u]!='' || $leftToesRom[$u]!='' || $rightToesTone[$u]!='' || $rightToesPower[$u]!='' || $rightToesRom[$u]='' )
				{
					$toes[$u] = array(
					'client_id' => $_GET['client_id'],
					'patient_id' => $_GET['patient_id'],
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d'),
					'toes_muscle_id' => $u,
					'left_toes_tone' => $leftToesTone[$u],
					'left_toes_power' => $leftToesPower[$u],
					'left_toes_rom' => $leftToesRom[$u],
					'right_toes_tone' => $rightToesTone[$u],
					'right_toes_power' => $rightToesPower[$u],
					'right_toes_rom' => $rightToesRom[$u],
				);
			}
		}
		if(!empty($toes)){
			$this->db->insert_batch('tbl_patient_mexamination_toes', $toes);
		}
		$hallux = array();
		$leftHalluxTone=explode(',',$_GET['left_hallux_tone']);
		$leftHalluxPower=explode(',',$_GET['left_hallux_power']);
		$leftHalluxRom=explode(',',$_GET['left_hallux_rom']);
		$rightHalluxTone=explode(',',$_GET['right_hallux_tone']);
		$rightHalluxPower=explode(',',$_GET['right_hallux_power']);
		$rightHalluxRom=explode(',',$_GET['right_hallux_rom']);
		for($m=0; $m<3; $m++)
		{
				if($leftHalluxTone[$m]!='' || $leftHalluxPower[$m]!='' || $leftHalluxRom[$m]!='' || $rightHalluxTone[$m]!='' || $rightHalluxPower[$m]!='' || $rightHalluxRom[$m]!='' )
				{
					$hallux[$m] = array(
					'client_id' => $_GET['client_id'],
					'patient_id' => $_GET['patient_id'],
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d'),
					'hallux_muscle_id' => $m,
					'left_hallux_tone' => $leftHalluxTone[$m],
					'left_hallux_power' => $leftHalluxPower[$m],
					'left_hallux_rom' => $leftHalluxRom[$m],
					'right_hallux_tone' => $rightHalluxTone[$m],
					'right_hallux_power' => $rightHalluxPower[$m],
					'right_hallux_rom' => $rightHalluxRom[$m],
				);
			}
		}
		if(!empty($hallux)){
			$this->db->insert_batch('tbl_patient_mexamination_hallux', $hallux);
		}
		$scapula = array();
		$leftScapulaTone=explode(',',$_GET['left_scapula_tone']);
		$leftScapulaPower=explode(',',$_GET['left_scapula_power']);
		$leftScapulaRom=explode(',',$_GET['left_scapula_rom']);
		$rightScapulaTone=explode(',',$_GET['right_scapula_tone']);
		$rightScapulaPower=explode(',',$_GET['right_scapula_power']);
		$rightScapulaRom=explode(',',$_GET['right_scapula_rom']);
		for($r=0; $r<5; $r++)
		{
				if($leftScapulaTone[$r]!='' || $leftScapulaPower[$r]!='' || $leftScapulaRom[$r]!='' || $rightScapulaTone[$r]!='' || $rightScapulaPower[$r]!='' || $rightScapulaRom[$r]!='' )
				{
					$scapula[$r] = array(
					'client_id' => $_GET['client_id'],
					'patient_id' => $_GET['patient_id'],
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d'),
					'scapula_muscle_id' => $r,
					'left_scapula_tone' => $leftScapulaTone[$r],
					'left_scapula_power' => $leftScapulaPower[$r],
					'left_scapula_rom' => $leftScapulaRom[$r],
					'right_scapula_tone' => $rightScapulaTone[$r],
					'right_scapula_power' => $rightScapulaPower[$r],
					'right_scapula_rom' => $rightScapulaRom[$r],
				);
			}
		}
		if(!empty($scapula)){
			$this->db->insert_batch('tbl_patient_mexamination_scapula', $scapula);
		}
		$shoulder = array();
		$leftShoulderTone=explode(',',$_GET['left_shoulder_tone']);
		$leftShoulderPower=explode(',',$_GET['left_shoulder_power']);
		$leftShoulderRom=explode(',',$_GET['left_shoulder_rom']);
		$rightShoulderTone=explode(',',$_GET['right_shoulder_tone']);
		$rightShoulderPower=explode(',',$_GET['right_shoulder_power']);
		$rightShoulderRom=explode(',',$_GET['right_shoulder_rom']);
		for($s=0; $s<8; $s++)
		{
				if($leftShoulderTone[$s]!='' || $leftShoulderPower[$s]!='' || $leftShoulderRom[$s]!='' || $rightShoulderTone[$s]!='' || $rightShoulderPower[$s]!='' || $rightShoulderRom[$s]='' )
				{
					$shoulder[$s] = array(
					'client_id' => $_GET['client_id'],
					'patient_id' => $_GET['patient_id'],
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d'),
					'shoulder_muscle_id' => $shoulderMuscleId[$s],
					'left_shoulder_tone' => $leftShoulderTone[$s],
					'left_shoulder_power' => $leftShoulderPower[$s],
					'left_shoulder_rom' => $leftShoulderRom[$s],
					'right_shoulder_tone' => $rightShoulderTone[$s],
					'right_shoulder_power' => $rightShoulderPower[$s],
					'right_shoulder_rom' => $rightShoulderRom[$s],
				);
			}
		}
		if(!empty($shoulder)){
			$this->db->insert_batch('tbl_patient_mexamination_shoulder', $shoulder);
		}
		$elbow = array();
		$leftElbowTone=explode(',',$_GET['left_elbow_tone']);
		$leftElbowPower=explode(',',$_GET['left_elbow_power']);
		$leftElbowRom=explode(',',$_GET['left_elbow_rom']);
		$rightElbowTone=explode(',',$_GET['right_elbow_tone']);
		$rightElbowPower=explode(',',$_GET['right_elbow_power']);
		$rightElbowRom=explode(',',$_GET['right_elbow_rom']);
		for($j=0; $j<3; $j++)
		{
				if($leftElbowTone[$j]!='' || $leftElbowPower[$j]!='' || $leftElbowRom[$j]!='' || $rightElbowTone[$j]!='' || $rightElbowPower[$j]!='' || $rightElbowRom[$j]!='' )
				{
					$elbow[$j] = array(
					'client_id' => $_GET['client_id'],
					'patient_id' => $_GET['patient_id'],
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d'),
					'elbow_muscle_id' => $j,
					'left_elbow_tone' => $leftElbowTone[$j],
					'left_elbow_power' => $leftElbowPower[$j],
					'left_elbow_rom' => $leftElbowRom[$j],
					'right_elbow_tone' => $rightElbowTone[$j],
					'right_elbow_power' => $rightElbowPower[$j],
					'right_elbow_rom' => $rightElbowRom[$j],
				);
			}
		}
		if(!empty($elbow))
		{
			$this->db->insert_batch('tbl_patient_mexamination_elbow', $elbow);
		}
		$fingers = array();
		$leftFingersTone= explode(',',$_GET['left_fingers_tone']);
		$leftFingersPower= explode(',',$_GET['left_fingers_power']);
		$leftFingersRom= explode(',',$_GET['left_fingers_rom']);
		$rightFingersTone= explode(',',$_GET['right_fingers_tone']);
		$rightFingersPower= explode(',',$_GET['right_fingers_power']);
		$rightFingersRom= explode(',',$_GET['right_fingers_rom']);
		for($k=0; $k<6; $k++)
		{
				if($leftFingersTone[$k]!='' || $leftFingersPower[$k]!='' || $leftFingersRom[$k]!='' || $rightFingersTone[$k]!='' || $rightFingersPower[$k]!='' || $rightFingersRom[$k]!='' )
				{
					$fingers[$k] = array(
					'client_id' => $_GET['client_id'],
					'patient_id' => $_GET['patient_id'],
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d'),
					'fingers_muscle_id' => $k,
					'left_fingers_tone' => $leftFingersTone[$k],
					'left_fingers_power' => $leftFingersPower[$k],
					'left_fingers_rom' => $leftFingersRom[$k],
					'right_fingers_tone' => $rightFingersTone[$k],
					'right_fingers_power' => $rightFingersPower[$k],
					'right_fingers_rom' => $rightFingersRom[$k],
				);
			}
		}
		if(!empty($fingers)){
			$this->db->insert_batch('tbl_patient_mexamination_fingers', $fingers);
		}
		$thumb = array();
		$leftThumbTone = explode(',',$_GET['left_thumb_tone']);
		$leftThumbPower=explode(',',$_GET['left_thumb_power']);
		$leftThumbRom=explode(',',$_GET['left_thumb_rom']);
		$rightThumbTone=explode(',',$_GET['right_thumb_tone']);
		$rightThumbPower=explode(',',$_GET['right_thumb_power']);
		$rightThumbRom=explode(',',$_GET['right_thumb_rom']);
		for($t=0; $t < 7; $t++)
		{
				if($leftThumbTone[$t]!='' || $leftThumbPower[$t]!='' || $leftThumbRom[$t]!='' || $rightThumbTone[$t]!='' || $rightThumbPower[$t]!='' || $rightThumbRom[$t]='' )
				{
					$thumb[$t] = array(
					'client_id' => $_GET['client_id'],
					'patient_id' => $_GET['patient_id'],
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d'),
					'thumb_muscle_id' => $t,
					'left_thumb_tone' => $leftThumbTone[$t],
					'left_thumb_power' => $leftThumbPower[$t],
					'left_thumb_rom' => $leftThumbRom[$t],
					'right_thumb_tone' => $rightThumbTone[$t],
					'right_thumb_power' => $rightThumbPower[$t],
					'right_thumb_rom' => $rightThumbRom[$t],
				);
			}
		}
		if(!empty($thumb)){
			$this->db->insert_batch('tbl_patient_mexamination_thumb', $thumb);
		}
		return $_GET['patient_id']; 
	}
	public function admin_login() {
		$this->db->where('username',$_GET['email']);
		$this->db->where('password',$_GET['password']);
		$this->db->select('mobile,client_id,plan,first_name,clinic_name,branch_name,parent_client_id')->from('tbl_client');
		$query = $this->db->get();
		if($query->result_array() != false){
			$output = $query->row_array();
			if($output['parent_client_id'] == '0')
			{
				
			} else {
			   $this->db->select('plan')->from('tbl_client');
			   $this->db->where('client_id',$output['parent_client_id']);
			   $res = $this->db->get();
			   $plan = $res->row()->plan;
			   $output['plan'] = $plan;
			}
			return ($query->num_rows() > 0) ? $output : false ;
	     } else {
			 return false;
		 }
	 }
	public function mexam_det() {
	  $this->db->where('patient_id',$_GET['patient_id']);
	  $this->db->select('mexamn_date,ant_spine_to_inmal,app_leg_shoet,mid_thigh_circum,mid_calf_circum')->from('tbl_patient_motor_examination');
	  $query = $this->db->get();
	  return ($query->num_rows() > 0 ) ? $query->result_array(): false;
    }
	public function insert_exercise() {
		if($_GET['type'] == 1){
			$this->db->where('id',$_GET['exercise_id']);
			$this->db->select('*')->from('physio_ankle');
			$res = $this->db->get();
		} else if($_GET['type'] == 2) {
			$this->db->where('id',$_GET['exercise_id']);
		    $this->db->select('*')->from('physio_cervical');
		    $res = $this->db->get();
		} else if($_GET['type'] == 3){
			$this->db->where('id',$_GET['exercise_id']);
		    $this->db->select('*')->from('physio_education');
		    $res = $this->db->get();
		} else if($_GET['type'] == 4){
			$this->db->where('id',$_GET['exercise_id']);
		    $this->db->select('*')->from('physio_elbow');
		    $res = $this->db->get();
		} else if($_GET['type'] == 5){
			$this->db->where('id',$_GET['exercise_id']);
		    $this->db->select('*')->from('physio_hipknee');
		    $res = $this->db->get();
		} else if($_GET['type'] == 6){
			$this->db->where('id',$_GET['exercise_id']);
		    $this->db->select('*')->from('physio_lumbar');
		    $res = $this->db->get();
		} else if($_GET['type'] == 7){
			$this->db->where('id',$_GET['exercise_id']);
		    $this->db->select('*')->from('physio_shoulder');
		    $res = $this->db->get();
		} else {
			$this->db->where('id',$_GET['exercise_id']);
		    $this->db->select('*')->from('physio_special');
		    $res = $this->db->get();
		}
		$this->db->where('chard_no',$_GET['chart_id']);
		$this->db->limit(1);
		$this->db->order_by('chart_id','desc');
		$this->db->select('chart_name,verifycode,arrange_no,perform,complete,hold,repet')->from('save_chart');
		$query = $this->db->get();
				
		$data = array(
		'chard_no' => $_GET['chart_id'],  
		'client_id' => $_GET['branch'],
		'chart_name' => $query->row()->chart_name,
		'verifycode' => $res->row()->title,
		'img_path' => $res->row()->path,
		'title' => $res->row()->title,
		'img_description' => $res->row()->description,
		'repet' => $query->row()->repet,
		'hold' => $query->row()->hold,
		'complete' => $query->row()->complete,
		'perform' => $query->row()->perform,
		'arrange_no' => ($query->row()->arrange_no+1),
		);
		$this->db->insert('save_chart',$data);
		return $this->db->insert_id();
	}
	public function create_chart(){  
		$client_id = $_GET['branch'];
	  	$this->db->select('chard_no')->from('save_chart');
		$this->db->limit(1);
		$this->db->order_by('chart_id','desc');
		$res = $this->db->get();
		if($res->result_array() != false){
			$no = $res->row()->chard_no;
			$val = explode('C',$no);
			$chart_no = 'C'.($val[1]+1);
		} else {
			$chart_no = 'C1';
		}
		
		$id = $_GET['exercise_id'];
			if($_GET['type'] == 1){
				$this->db->where('id',$id);
				$this->db->select('title,path,description')->from('physio_ankle');
				$res1 = $this->db->get();
				$title = $res1->row()->title;
				$path = $res1->row()->path;
				$description = $res1->row()->description;
				
			}
			else if($_GET['type'] == 2){
				$this->db->where('id',$id);
				$this->db->select('title,path,description')->from('physio_cervical');
				$res = $this->db->get();
				$title = $res->row()->title;
				$path = $res->row()->path;
				$description = $res->row()->description;
			}
			else if($_GET['type'] == 3){
				$this->db->where('id',$id);
				$this->db->select('title,path,description')->from('physio_education');
				$res = $this->db->get();
				$title = $res->row()->title;
				$path = $res->row()->path;
				$description = $res->row()->description;
			}
			else if($_GET['type'] == 4){
				$this->db->where('id',$id);
				$this->db->select('title,path,description')->from('physio_elbow');
				$res = $this->db->get();
				$title = $res->row()->title;
				$path = $res->row()->path;
				$description = $res->row()->description;
			}
			else if($_GET['type'] == 5){
				$this->db->where('id',$id);
				$this->db->select('title,path,description')->from('physio_hipknee');
				$res = $this->db->get();
				$title = $res->row()->title;
				$path = $res->row()->path;
				$description = $res->row()->description;
			}
			else if($_GET['type'] == 6){
				$this->db->where('id',$id);
				$this->db->select('title,path,description')->from('physio_lumber');
				$res = $this->db->get();
				$title = $res->row()->title;
				$path = $res->row()->path;
				$description = $res->row()->description;
			}
			else if($_GET['type'] == 7){
				$this->db->where('id',$id);
				$this->db->select('title,path,description')->from('physio_shoulder');
				$res = $this->db->get();
				$title = $res->row()->title;
				$path = $res->row()->path;
				$description = $res->row()->description;
			}
			else{
				$this->db->where('id',$id);
				$this->db->select('title,path,description')->from('physio_special');
				$res = $this->db->get();
				$title = $res->row()->title;
				$path = $res->row()->path;
				$description = $res->row()->description;
			}
			$exes_code = $this->exes_code(); 
			$data = array(
			'client_id' => $client_id,
			'chard_no' => $chart_no,
			'chart_name' => $_GET['new_chart'],
			'verifycode' => $exes_code,
			'img_path' => $path,
			'title' => $title,
			'img_description' => $description,
			'repet' => 1,
			'hold' => 1,
			'complete' => 1,
			'arrange_no' => 1
			);
			$this->db->insert('save_chart',$data);
		return $this->db->insert_id();
	}
	public function datewisepatient_list($client_id,$date){  
		$this->db->where('appoint_date >',$date.'-00');
		$this->db->where('appoint_date <=',$date.'-31');
		$this->db->select('mobile_no,city,address_line1,age,gender,patient_id,first_name,last_name,patient_code,appoint_date,photo')->from('tbl_patient_info');
		$this->db->where('home_visit','1');
		$this->db->where('app_approve !=','1');
		$this->db->where('client_id',$client_id);
		$this->db->order_by('patient_id','desc');
		$query  = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function datewisehomepatient_list($client_id,$date){  
		$this->db->where('appoint_date >',$date.'-00');
		$this->db->where('appoint_date <=',$date.'-31');
		$this->db->select('mobile_no,city,address_line1,age,gender,patient_id,first_name,last_name,patient_code,appoint_date,photo')->from('tbl_patient_info');
		$this->db->where('home_visit','2');
		$this->db->where('app_approve !=','1');
		$this->db->where('client_id',$client_id);
		$this->db->order_by('patient_id','desc');
		$query  = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function datewiseappointment_list() {
		$date = $_GET['date'];
		$this->db->where('appointment_from >',$date.'-00');
		$this->db->where('appointment_from <=',$date.'-31');
		$client_id = $_GET['branch'];
		$this->db->where('ai.client_id',$client_id);
		$this->db->where('ai.status',0);
		$this->db->where('ai.t_status !=',1);
		$this->db->select('pi.mobile_no,ai.visit,ai.bill_id,si.first_name as sname,si.last_name as slname,ai.staff_id,ai.appointment_from,ai.title,ai.appointment_id,ai.patient_id,pi.gender')->from('tbl_appointments ai');
		$this->db->select("DATE_FORMAT( ai.start, '%h:%i') as start", FALSE );
		$this->db->select("DATE_FORMAT( ai.end, '%h:%i %p') as end", FALSE );
		$this->db->join('tbl_patient_info pi','ai.patient_id = pi.patient_id');
		$this->db->join('tbl_staff_info si','si.staff_id = ai.staff_id');
		$this->db->order_by('appointment_from','desc');
		$query = $this->db->get();    
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	 }
	  public function datewisebill_list(){
		   $arr = array();
		   $date = $_GET['date'];
		   $this->db->where('iv.treatment_date >',$date.'-00');
		   $this->db->where('iv.treatment_date <=',$date.'-31');
		   $client_id = $_GET['branch'];
		   $this->db->where('iv.client_id',$client_id);
		   $this->db->select('pi.mobile_no,pi.patient_id,iv.bill_id,iv.bill_no,iv.treatment_date,pi.first_name,pi.last_name,iv.net_amt,iv.paid_amt,iv.bill_status')->from('tbl_invoice_header iv');
		   $this->db->join('tbl_patient_info pi','iv.patient_id = pi.patient_id');
		   $this->db->order_by('iv.treatment_date','desc');
		   $this->db->where('pi.episode_status !=','1');
		   $this->db->where('iv.bill_status !=','2');
		   $query = $this->db->get();
		   return ($query->num_rows() > 0) ? $query->result_array() : false ;
	
	 }
	 public function add_invoicediscount() {
		$this->db->where('client_id',$_GET['branch']);
		$this->db->select('email')->from('tbl_client');
		$res1 = $this->db->get();
		$email = $res1->row()->email;
		$bill_no=$this->generate_code();
		 $item = $_GET['item'];
		 $patient_id = $_GET['patient_id'];
		 $client_id = $_GET['branch'];
		 $invoice_date = str_replace('/','-',$_GET['invoice']);
		 $due_date = str_replace('/','-',$_GET['due']);
		 $item1 =  str_replace('[','',$item);
		 $item2 =  str_replace(']','',$item1);
		 $value = explode(',',$item2);
		 $count = sizeof($value);
		 $data = array(
			 'client_id' =>  $client_id,
			 'treatment_date' => date('Y-m-d',strtotime($invoice_date)),
			 'due_date' => date('Y-m-d',strtotime($due_date)),
			 'patient_id' => $patient_id,
			 'staff_id' =>  $_GET['staff_id'],    
			 'total_amt'=> $_GET['total'],
			 'bill_status'=> '0',
			 'discount_perc'=> $_GET['discount'],
			 'net_amt'=> ($_GET['total'] - $_GET['discount']),
			 'bill_no' => $bill_no,
			 'created_by'=> $email,
			 'created_date'=> date('Y-m-d'),
			 'modify_by'=> $email,
			 'created_date'=> date('Y-m-d')
		 );
		$this->db->insert('tbl_invoice_header',$data);
		$bill_id  = $this->db->insert_id();
	   for($i = 0; $i<$count; $i++){
		    $va =  str_replace('"','',$value[$i]);
			$item_det = explode('/',$va);
			$this->db->where('item_id',$item_det[0]);
			$this->db->select('item_name,item_price')->from('tbl_item');
		    $res = $this->db->get();
			$item_name = $res->row()->item_name;
			$item_price = $res->row()->item_price;
			$data1 = array(
			 'client_id' =>  $client_id,
			 'staff_id' =>  $_GET['staff_id'],
			 'created_date'=> date('Y-m-d'),
			 'bill_id'=> $bill_id,
			 'item_id' => $item_det[0],
			 'item_quantity' => $item_det[1],
			 'item_price' => $item_price,
			 'item_amount' => ($item_det[1] * $item_price)
			);
			$this->db->insert('tbl_invoice_detail',$data1);
		 }  
		 return $patient_id;
		 
	 }
	 public function chart_orders($client_id) {  
		$this->db->select('*');
		$this->db->where('t_status','2');
		$this->db->from("prescription_detail");
		$this->db->order_by("chart_id", "desc");
		$this->db->where('client_id',$client_id);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	 }
	 public function invoice_orders($client_id) {
		$this->db->where('wi.client_id',$client_id);
		$this->db->select('pi.first_name,pi.last_name,wi.payment_date,wi.amount,wi.client_id,wi.bill_id')->from('invoice_wallet wi');
		$this->db->join('tbl_patient_info pi','wi.patient_id = pi.patient_id');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	 }
	 public function mypassbook($client_id) {
		$this->db->where('client_id',$client_id);
		$this->db->select('*')->from('tbl_balance');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	 }
	 public function unsettled_chart($client_id) {
		$this->db->where('client_id',$client_id);
		$this->db->select('*');
		$this->db->from("prescription_detail");
		$this->db->order_by("chart_id", "desc");
		$this->db->where('t_status','2');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	 }
	 public function unsettled_invoice($client_id) {
		$this->db->where('wi.client_id',$client_id);
		$this->db->select('pi.first_name,pi.last_name,wi.payment_date,wi.amount,wi.client_id,wi.bill_id')->from('invoice_wallet wi');
		$this->db->join('tbl_patient_info pi','wi.patient_id = pi.patient_id');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	 }
	 public function staff_details($client_id,$staff_id) {
		$this->db->where('client_id',$client_id);
		$this->db->where('staff_id',$staff_id);
		$this->db->select('*')->from('tbl_staff_info');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false ;
	 }
	 public function staff_update()  
	 {
		 $staff_id = $_GET['staff_id'];
		 $data = array(
		  'first_name' =>$_GET['name'], 
		  'mobile_no' =>$_GET['mobile'], 
		  'email' =>$_GET['email'], 
		  'gender' =>$_GET['gender'], 
		  'is_doctor' =>$_GET['type'], 
		  'city' =>$_GET['city'], 
		 );
		 $this->db->where('staff_id',$staff_id);
		 $this->db->update('tbl_staff_info',$data);
		 return $staff_id;
	 }
	 public function todays_newpat(){
		 $client_id = $_GET['client_id'];
		 $this->db->where('client_id',$client_id);
		$this->db->select('mobile_no,gender,patient_code,patient_id,first_name,last_name')->from('tbl_patient_info');
		$this->db->where('appoint_date',date('Y-m-d'));  
		$query  = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function todays_DRpat(){
		 $client_id = $_GET['client_id'];
		$this->db->where('si.sn_date',date('Y-m-d'));  
		$this->db->where('pi.client_id',$client_id);
		$this->db->select('pi.mobile_no,it.item_name,pi.gender,it.item_name,pi.patient_code,pi.patient_id,pi.first_name,pi.last_name,st.first_name as staffname')->from('tbl_session_det si');
		$this->db->join('tbl_item it','si.item_id = it.item_id');
		$this->db->join('tbl_staff_info st','si.staff_id = st.staff_id');
		$this->db->join('tbl_patient_info pi','si.patient_id = pi.patient_id');
		$this->db->group_by('pi.patient_id');
		$query  = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false ;
	}
	public function expense_order() {
		   $client_id = $_GET['branch'];
		   $this->db->where('iv.client_id',$client_id);
		   $this->db->select('iv.bill_date,count(iv.bill_id) as tot,SUM(iv.total_amt) as total_amt')->from('tbl_expanse iv');
		   $this->db->group_by('iv.bill_date');
		   $this->db->order_by('iv.bill_date','desc');
		   $query = $this->db->get();
		   return ($query->num_rows() > 0) ? $query->result_array() : false ;
	 }
}
?>