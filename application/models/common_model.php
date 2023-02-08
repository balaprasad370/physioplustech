<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		$this->load->model(array('settings_model','client','location_model','registration_model'));
	}
	public function paid_inv($id)
	{
		if($this->uri->segment(4) == 'both'){  
			$from = date('Y-m-d',strtotime($this->uri->segment(5)));
			$to = date('Y-m-d',strtotime($this->uri->segment(6)));
		} else {
			$to = date('Y-m-d');
			$from = date('Y-m-d', strtotime("-30 days"));
		}
		$this->db->where('ih.treatment_date >=',$from);
		$this->db->where('ih.treatment_date <=',$to);
		$this->db->where('ih.client_id',$this->session->userdata('client_id'));
		$this->db->where('ih.staff_id',$id);
		$this->db->select('ih.treatment_date,ih.bill_no,pi.first_name,pi.last_name,ih.paid_amt,ih.net_amt')->from('tbl_invoice_header ih');
		$this->db->join('tbl_patient_info pi','pi.patient_id = ih.patient_id');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    } 
    public function paid_chart($id)
	{
		if($this->uri->segment(4) == 'both'){  
			$from = date('Y-m-d',strtotime($this->uri->segment(5)));
			$to = date('Y-m-d',strtotime($this->uri->segment(6)));
		} else {
			$to = date('Y-m-d');
			$from = date('Y-m-d', strtotime("-30 days"));
		}
		$this->db->where('ih.treatment_date >=',$from);
		$this->db->where('ih.treatment_date <=',$to);
		$this->db->where('ih.client_id',$this->session->userdata('client_id'));  
		$this->db->where('ih.staff_id',$id);
		$this->db->select('ih.treatment_date as date,SUM(ih.paid_amt) as total')->from('tbl_invoice_header ih');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    } 
	public function cre_inv($id)
	{
		if($this->uri->segment(4) == 'both'){  
			$from = date('Y-m-d',strtotime($this->uri->segment(5)));
			$to = date('Y-m-d',strtotime($this->uri->segment(6)));
		} else {
			$to = date('Y-m-d');
			$from = date('Y-m-d', strtotime("-30 days"));
		}
		$this->db->where('ih.treatment_date >=',$from);
		$this->db->where('ih.treatment_date <=',$to);
		$this->db->where('ih.client_id',$this->session->userdata('client_id'));
		$this->db->where('ih.staff_id',$id);
		$this->db->select('ih.treatment_date,ih.bill_no,pi.first_name,pi.last_name,ih.net_amt')->from('tbl_invoice_header ih');
		$this->db->join('tbl_patient_info pi','pi.patient_id = ih.patient_id');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	public function ex_save()
	{
		$data=array(
		    'client_id' => $this->session->userdata('client_id'),
		    'position' => $this->input->post('category'),
			'category' => $this->input->post('items'),
			'description' => $this->input->post('descr'),
			'title' => $this->input->post('title'),
			'path'=> $this->input->post('scan_hidden'),
			't_position' => $this->input->post('t_position')
		);
       $id=$this->input->post('category');
	   if ($id=='1')
	   {
		   
		   $this->db->insert('private_ankle',$data);
	   }
	   elseif($id=='2')
	   {
		   
		   $this->db->insert('private_cervical',$data);
	   }
       elseif($id=='3')
	   {
		   
		    $this->db->insert('private_elbow',$data);
	   }
	    elseif($id=='4')
	   {
		   
		    $this->db->insert('private_hip',$data);
	   }
	    elseif($id=='5')
	   {
		   
		    $this->db->insert('private_lumbar',$data);
	   } elseif($id=='6')
	   {
		   
		    $this->db->insert('private_shoulder',$data);
	   } elseif($id=='7')
	   {
		   
		    $this->db->insert('private_special',$data);
	   }
	    else
	   {
		   
		    $this->db->insert('private_education',$data);
		   return true;
	   }
		
	}
	public function edit_report_details($sn_id) {
		$this->db->where('sn_id',$sn_id);
		$this->db->select('sn_date,fpatient_name,patient_id,comment_sess,session_count,sn_id,lpatient_name,Session_count,item_id,item_name')->from('tbl_session_det')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	public function select_patient_name(){
		$this->db->select('patient_code,first_name,age');
    $this->db->from('tbl_patient_info')->where('category','ip');

    $query = $this->db->get();
	return $query->result_array();
	}
	public function select_category(){
		$this->db->select('patient_code, appoint_date,first_name,mobile_no, email, address_line1');
		$this->db->from('tbl_patient_info')->where('category','ip');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function select_ip(){
		$this->db->select('patient_id, first_name,mobile_no, email, address_line1');
		$this->db->from('tbl_patient_info')->where('ip_patient','1');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function select_ankle(){
		$this->db->select('*')->from('private_ankle');
	    $query = $this->db->get();
		return $query->result_array();
	}
	public function getprivileges() {
		$this->db->select('privilege_id,privilege_name')->from('tbl_privileges');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	public function item_details($app_id) {
		$this->db->where('appointment_id',$app_id);
		$this->db->select('item_id')->from('tbl_appointments');
		$res = $this->db->get();
		$id = $res->row()->item_id;
		
        $this->db->where('item_id',$id);
		$this->db->select('item_id,item_name,item_desc,item_price')->from('tbl_item');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->row_array() : false;
    
    }
	public function item_details1($id) {
		$this->db->where('item_id',$id);
		$this->db->select('item_id,item_name,item_desc,item_price')->from('tbl_item');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->row_array() : false;
    }
	public function getnotes($client_id)
	{	
		
		//return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	public function getReferaltype() {
		
		$this->db->select('referal_type_id,referal_type_name')->from('tbl_referal_type');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	
	public function getConcessGroups() {
		$this->db->select('concess_group_id,concess_group_name')->from('tbl_concess_group')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	
	public function getProvdiagList() {
		
		$this->db->select('pd_list_id,pd_list_name')->from('tbl_prov_diagnosis_list');
		if($this->session->userdata('all_locations') == true)
		{
			$this->db->where_in('client_id',$this->session->userdata('clientIds'));
		}else{
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	public function getProvdiag($patient_id) {
		$this->db->where('patient_id',$patient_id);
		$this->db->select('pd_date,prov_diagnosis,pd_id,patient_id')->from('tbl_patient_prov_diagnosis');
		if($this->session->userdata('all_locations') == true)
		{
			$this->db->where_in('client_id',$this->session->userdata('clientIds'));
		}else{
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	public function getmobileno(){
		$this->db->select('mobile_no')->from('tbl_patient_info');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	public function getmobile_no(){
		$this->db->select('mobile_no')->from('tbl_patient_info');
		$this->db->where('home_visit',2);
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	public function getpatientid(){
		$this->db->select('patient_id,patient_code')->from('tbl_patient_info');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	public function getpayment_mode(){
		$this->db->select('payment_mode')->from('tbl_invoice_header');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	public function getreferal_name(){
		$this->db->select('referal_type_id,referal_id,referal_name,website_name')->from('tbl_referal');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	public function getinvoice()
	{
		if($this->session->userdata('client_id') == '2774'){
			//$this->db->where('pv.treatment_date >','2019-12-02');
                        $this->db->where('pv.treatment_date >','2021-01-01');

		}

		$this->db->where('pi.client_id',$this->session->userdata('client_id'));
		$this->db->select('pi.patient_id,pi.patient_code,pi.client_id,pi.mobile_no,pi.first_name,pi.last_name,pv.bill_no,pv.net_amt,pv.paid_amt,pv.treatment_date,pv.bill_status,pv.due_date,pv.bill_id,pv.payment_mode');
		$this->db->from("tbl_patient_info pi");
		$this->db->join("tbl_invoice_header pv", "pi.patient_id=pv.patient_id");
		$this->db->where('pv.client_id',$this->session->userdata('client_id'));
		$this->db->order_by('pv.treatment_date','DESC');
		$query = $this->db->get();
	    return ($query->num_rows() > 0) ? $query->result_array() : 0;
	}
	public function getadvanse()
	{
		$this->db->order_by('advance_id', 'desc'); 
		$this->db->select('pi.patient_id,pi.patient_code,pv.bill_no,pi.first_name,pi.last_name,pi.referal_name,pi.mobile_no,pv.advance_amount,pv.advance_date,pv.advance_id');
		$this->db->from("tbl_patient_info pi");
		$this->db->join("tbl_patient_advance pv", "pi.patient_id=pv.patient_id");
		$this->db->where('pv.client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
	    return ($query->num_rows() > 0) ? $query->result_array():0;
	
	}
	public function getinvoiceList() {
		
		$this->db->select('*')->from('tbl_invoice_header');
		if($this->session->userdata('all_locations') == true)
		{
			$this->db->where_in('client_id',$this->session->userdata('clientIds'));
		}else{
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	public function getexpense()
	{
		$this->db->select('amount,tax_perc,bill_id,client_id,bill_no,total_amt,bill_date,ventor,due_date');
		$this->db->from("tbl_expanse");
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->group_by('bill_no'); 
		$this->db->order_by('bill_id','desc');
		$query = $this->db->get();
	    return ($query->num_rows() > 0) ? $query->result_array() : 0;
	}
	public function getReferalspecialist() {
		$this->db->select('specialist_id,specialist_name')->from('tbl_referal_specialist')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	public function getReferallist() {
		$this->db->select('*')->from('tbl_referal')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	
	public function getStaffList() {
		$this->db->select('staff_id,first_name,email')->from('tbl_staff_info')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	public function reschedule($id) {
		$this->db->select('notes,staff_id,title,appointment_from,appointment_id,end,start')->from('tbl_appointments')->where('appointment_id', $id);
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	
	function get_referalnames_by_id ($referal_type_id){
        if($referal_type_id==1){
			$this->db->select('referal_id as id, referal_name as name');
		}else if($referal_type_id==2){
			$this->db->select('referal_id as id, website_name as name');
		}else if($referal_type_id==3){
			$this->db->select('referal_id as id, adv_name as name');
		}else if($referal_type_id==4){
			$this->db->select('referal_id as id, referal_oth_name as name');
		}else if($referal_type_id==5){
			$this->db->select('patient_id as id, first_name as name');
		}
		
		$this->db->where('client_id', $this->session->userdata('client_id'));
		
		if($referal_type_id!=5){
			$this->db->where('referal_type_id', $referal_type_id);
			$query = $this->db->get('tbl_referal');
		} else {
			$query = $this->db->get('tbl_patient_info');
		}
		
		$data = array();
		if($query->num_rows() > 0) {
			foreach($query->result_array() as $referals) {
				array_push($data, array('id' => $referals['id'], 'name' => $referals['name']));	
			}
			return $data;
		} else {
			return false;	
		}
    }
	
	public function getStafftype() {
        $data = array();
		$query = $this->db->query("select staff_type_id,staff_type_name from tbl_staff_type where client_id='".$this->session->userdata('client_id')."'");
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	
	public function getDesignation() {
        $data = array();
		$query = $this->db->query("select designation_id,designation_name from tbl_designation where client_id='".$this->session->userdata('client_id')."'");
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	public function getsessiondet() {
		//$this->db->where('treatment_date',date('Y-m-d'));
		$this->db->select('patient_id,treatment_date,treatments,treatment_quantity')->from('tbl_patient_treatment_techniques');
		$this->db->distinct();
		$this->db->group_by('patient_id');
		if($this->session->userdata('all_locations') == true)
		{
			$this->db->where_in('client_id',$this->session->userdata('clientIds'));
		} else {
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    } 
	public function getPatientname() {
		//$this->db->where('episode_status !=','1');
		//$this->db->where('app_approve !=','1');
		//$this->db->where('home_visit !=',2);
		$this->db->select('patient_id,first_name,last_name,patient_code,age,email,appoint_date,address_line1,mobile_no')->from('tbl_patient_info');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    } 
    public function getPatientname_app() {
		//$this->db->where('episode_status !=','1');
		$this->db->where('app_approve','1');
		$this->db->select('patient_id,first_name,last_name,patient_code,age,email,appoint_date,address_line1,mobile_no')->from('tbl_patient_info');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    } 	
	public function getPatientname_invoice() {
		$this->db->where('episode_status !=','1');
		//$this->db->where('app_approve !=','1');
		//$this->db->where('home_visit !=',2);
		$this->db->select('patient_id,first_name,last_name,patient_code,age,email,appoint_date,address_line1,mobile_no')->from('tbl_patient_info');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	public function getPatientname_home() {
		//$this->db->where('episode_status !=','1');
		//$this->db->where('app_approve !=','1');
		//$this->db->where('home_visit !=',1);
		$this->db->where('home_visit',2);
		$this->db->select('patient_id,first_name,last_name,patient_code,age,email,appoint_date,address_line1,mobile_no')->from('tbl_patient_info');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	public function getgroup() {
		$this->db->select('*')->from('tbl_events_group');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	
	public function getPatientname1() {
		$this->db->where('pi.client_id',$this->session->userdata('client_id'));
		
		$this->db->select('pi.patient_id,pi.patient_code,pi.appoint_date,pi.first_name,pi.last_name,pi.mobile_no,pi.email,pi.address_line1,pi.photo,pi.gender');
		$this->db->from("tbl_patient_info pi");
		$this->db->join("tbl_patient_visits pv", "pi.patient_id=pv.patient_id");
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	public function getPatientname2() {
		
		/* $date = date('Y-m-d');
		$next_due_date = date('Y-m-d', strtotime("+30 days"));
		$this->db->where('ai.client_id',$this->session->userdata('client_id'));
		$this->db->where('ai.appointment_from >=',$date);
		$this->db->where('ai.appointment_to <',$next_due_date);
		 */
		$this->db->where('pi.client_id',$this->session->userdata('client_id'));
		$this->db->where('ai.status','0');
		$this->db->where('ai.appointment_from',date('Y-m-d'));
		$this->db->select('ai.title,ai.patient_id,pi.patient_code,pi.age')->from('tbl_appointments ai');
		$this->db->join('tbl_patient_info pi','pi.patient_id=ai.patient_id');
		$this->db->group_by('ai.patient_id');
		$res = $this->db->get();
		return ($res->num_rows() > 0) ? $res->result_array() : false;
	}
	public function cancel_patientname(){
		$this->db->where('pi.client_id',$this->session->userdata('client_id'));
		$this->db->where('ai.status','1');
		$this->db->select('ai.title,ai.patient_id,pi.patient_code,pi.age')->from('tbl_appointments ai');
		$this->db->join('tbl_patient_info pi','pi.patient_id=ai.patient_id');
		$this->db->group_by('ai.patient_id');
		$res = $this->db->get();
		return ($res->num_rows() > 0) ? $res->result_array() : false;
	} 
	public function getDoctorname() {
		$this->db->select('staff_id,first_name,last_name,staff_code,dr_color')->from('tbl_staff_info');
		$this->db->where('is_doctor', 1);
		if($this->session->userdata('all_locations') == true)
		{
			$this->db->where_in('client_id',$this->session->userdata('clientIds'));
		}else{
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	
	public function getLocDoctorname() {
		$this->db->select('staff_id,first_name,last_name,staff_code,dr_color')->from('tbl_staff_info');
		$this->db->where('is_doctor', 1);
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    }	
	public function rsgetItemNames($item_id) {
		$this->db->select('item_id,item_name,item_price')->from('tbl_item');
		$this->db->where('status',1);
		$this->db->where('item_id !=',$item_id);
		$this->db->where('client_id', $this->session->userdata('client_id'));
		$this->db->or_where('client_id',0);
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	public function getItemNames() {
		$this->db->select('item_id,item_name,item_price')->from('tbl_item');
		$this->db->where('status',1);
		$this->db->where('client_id', $this->session->userdata('client_id'));
		$this->db->or_where('client_id',0);
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	
	public function getItems() {
		
		$result = array();
		$result['arrayData'] = array();
		$result['jsonData'] = array();
		// get items
		$this->db->select('*')->from('tbl_item')->where('client_id', $this->session->userdata('client_id'));
		$this->db->where('item_hide',0);
		$this->db->where('status',1);
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$result['status'] = 'success';
			foreach($query->result_array() as $item) {
				$item['id'] = $item['item_id'];
				$item['text'] = $item['item_name'];
				array_push($result['arrayData'], $item);
				$result['jsonData'][ $item['item_id'] ] = $item;
			}
			$result['message'] = 'Items has been fetched successfully';
		} else if($query->num_rows() == 0) {
			$result['status'] = 'No data';
			$result['message'] = 'No items found';
		} else {
			$result['status'] = 'failure';
			$result['message'] = 'Server error. Please try again later.';
		}
		
		return $result;
	}
	
	public function getExItems() {
		$result = array();
		$result['arrayData'] = array();
		$result['jsonData'] = array();
		// get items
		$this->db->select('*')->from('tbl_expanse_client_item')->where('client_id', $this->session->userdata('client_id'));
		$this->db->where('item_hide',0);
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$result['status'] = 'success';
			foreach($query->result_array() as $item) {
				$item['id'] = $item['item_id'];
				$item['text'] = $item['item_name'];
				array_push($result['arrayData'], $item);
				$result['jsonData'][ $item['item_id'] ] = $item;
			}
			$result['message'] = 'Items has been fetched successfully';
		} else if($query->num_rows() == 0) {
			$result['status'] = 'No data';
			$result['message'] = 'No items found';
		} else {
			$result['status'] = 'failure';
			$result['message'] = 'Server error. Please try again later.';
		}
		
		return $result;
	}
	
	public function noOfUsersPlan() {
		//echo $this->session->userdata('plan_id');
		$this->db->select('no_of_users')->from('tbl_plan')->where('plan_id', $this->session->userdata('plan_id'));
		$no_of_users = $this->db->get();
		//return ($no_of_users->num_rows()>0) ? $no_of_users1['no_of_users'] : false;
		if($no_of_users->num_rows()>0)
		return ($no_of_users->num_rows()>0) ? $no_of_users->row()->no_of_users : false;
	}
	
	public function noOfLocationsPlan() {
		//echo $this->session->userdata('plan_id');
		$this->db->select('no_of_locations')->from('tbl_plan')->where('plan_id', $this->session->userdata('plan_id'));
		$noOfLocations = $this->db->get();
		//return ($no_of_users->num_rows()>0) ? $no_of_users1['no_of_users'] : false;
		if($noOfLocations->num_rows()>0)
		return ($noOfLocations->num_rows()>0) ? $noOfLocations->row()->no_of_locations : false;
	}
	
	public function noOfUsersPlan1() {
		//echo $this->session->userdata('plan_id');
		$this->db->select('num_users')->from('tbl_validity')->where('client_id', $this->session->userdata('client_id'));
		$no_of_users = $this->db->get();
		//return ($no_of_users->num_rows()>0) ? $no_of_users1['no_of_users'] : false;
		if($no_of_users->num_rows()>0)
		return ($no_of_users->num_rows()>0) ? $no_of_users->row()->num_users : false;
	}
	
	
	public function noOfLocationsPlan1() {
		//echo $this->session->userdata('plan_id');
		$this->db->select('num_location')->from('tbl_validity')->where('client_id', $this->session->userdata('client_id'));
		$noOfLocations = $this->db->get();
		//return ($no_of_users->num_rows()>0) ? $no_of_users1['no_of_users'] : false;
		if($noOfLocations->num_rows()>0)
		return ($noOfLocations->num_rows()>0) ? $noOfLocations->row()->num_location : false;
	}
	
	
	public function alreadyExistsVisitdate($patient_id,$visit_date)
	{
		$where = array('patient_id' => $patient_id, 'visit_date' => $visit_date, 'client_id' => $this->session->userdata('client_id'));
		$this->db->select('visit_date')->from('tbl_patient_visits')->where($where);
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->row()->visit_date : false;
	}
	
	public function getSpecialities($speciality_name) {
		$this->db->distinct();
		$this->db->select('speciality_name')->from('tbl_client_speciality');
		$this->db->like('speciality_name', $speciality_name);
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	
	
	public function getAllsessclient()
	{
			$where=array('client_id' => $this->session->userdata('client_id'));
		$this->db->select('*')->from('tbl_session_det')->where($where);
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array() : false;
	}
	
	
	public function delete_session($sn_id)
	{
		$where = array('sn_id' => $sn_id);
		$this->db->where($where);
		$this->db->delete('tbl_session_det');
		return $sn_id;
	}
	
	
	public function getFees() {
		$result = array();
		$result['arrayData'] = array();
		$result['jsonData'] = array();
		// get items
		$this->db->select('*')->from('tlb_bill_type')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$result['status'] = 'success';
			foreach($query->result_array() as $fees) {
				$fees['id'] = $fees['fees_id'];
				$fees['text'] = $fees['fees_name'];
				array_push($result['arrayData'], $fees);
				$result['jsonData'][ $fees['fees_id'] ] = $fees;
			}
			$result['message'] = 'Items has been fetched successfully';
		} else if($query->num_rows() == 0) {
			$result['status'] = 'No data';
			$result['message'] = 'No items found';
		} else {
			$result['status'] = 'failure';
			$result['message'] = 'Server error. Please try again later.';
		}
		
		return $result; 
	}
	
	public function searchPhone($cell)
	{
		$this->db->select('client_id,mobile_no')->from('tbl_patient_info')->where('mobile_no',$cell);
		$result = $this->db->get();
		return ($result->num_rows()>0) ? $result->result_array()  : false;
	}
	
	public function addExpanse()
	{
		$expanseInfo = array(
			'client_id' => $this->session->userdata('client_id'),
			'ex_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('ex_date')))),
			'ex_name' => $this->input->post('ex_name'),
			'ex_amount' => $this->input->post('ex_amount'),
			'ex_cmd' => $this->input->post('ex_cmd'),
		);
		
		$this->db->insert('expanse', $expanseInfo);
		
		return true;
	}
	
	public function getExpanseInfo()
	{
		$this->db->select('*')->from('expanse')->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array() : false;
	}
	
	public function getTotalPresent($tot_date)
	{
		$where = array('client_id' =>  $this->session->userdata('client_id'),'sn_date'=>$tot_date);
		$this->db->select("count(DISTINCT staff_id) as tot_present")->from('tbl_session_det');
		$this->db->where($where);
		$q = $this->db->get();
		$qrow = $q->row();
		return $qrow->tot_present;
	}
	
	public function getTotalSession($tot_date)
	{
		$where = array('client_id' =>  $this->session->userdata('client_id'),'sn_date'=>$tot_date);
		$this->db->select('count(*) as tot_session')->from('tbl_session_det');
		$this->db->where($where);
		$q = $this->db->get();
		$qrow = $q->row();
		return $qrow->tot_session;
		
	}
	
	
	public function getTotalAppoiment($tot_date)
	{
		$where = array('client_id' =>  $this->session->userdata('client_id'),'appointment_from'=>$tot_date,'status !=' =>2);
		$this->db->select('count(*) as tot_appoiment')->from('tbl_appointments');
		$this->db->where($where);
		$q = $this->db->get();
		$qrow = $q->row();
		return $qrow->tot_appoiment;
	}
	
	public function getTotalCancel($tot_date)
	{
		$where = array('client_id' =>  $this->session->userdata('client_id'),'cancel_date'=>$tot_date,'status'=>2);
		$this->db->select('count(*) as tot_cancel')->from('tbl_appointments');
		$this->db->where($where);
		$q = $this->db->get();
		$qrow = $q->row();
		return $qrow->tot_cancel;
	}
	
	public function getStaffName($tot_date)
	{
		$where = array('client_id' =>  $this->session->userdata('client_id'),'sn_date'=>$tot_date);
		$this->db->distinct();
		$this->db->select("staff_id")->from('tbl_session_det');
		$this->db->where($where);
		$q = $this->db->get();
		return $q->result();
		
	}
	
	public function group_add()
	{
		$groupInfo = array(
			'client_id' => $this->session->userdata('client_id'),
			'group_name' => $this->input->post('group_name')
		);
		
		$this->db->insert('tbl_group', $groupInfo);
		
		return true;
	}
	
	public function getGroupList()
	{
		$this->db->select('*')->from('tbl_group')->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array()  : false;
	}
	
	public function getcontacts()
	{
		$this->db->select('*')->from('tbl_contacts')->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array()  : false;
	}
	
	public function getPatientList()
	{
		$this->db->select('patient_id,first_name,last_name,mobile_no')->from('tbl_patient_info')->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		
		return ($query->num_rows()>0) ? $query->result_array()  : false;
	}
	
	public function getStaffLists()
	{
		$this->db->select('staff_id,first_name,last_name,mobile_no')->from('tbl_staff_info')->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array()  : false;
	}
	
	public function getRefferalLists()
	{
		$this->db->select('referal_id,referal_name,org_name,mobile_no')->from('tbl_referal');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('referal_type_id',1);
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array()  : false;
	}
	
	public function addGroupmember()
	{
		$members = $this->input->post('group_members');
		$count = sizeof($members);
		
		for($i=0;$i<$count;$i++){
		
			if($members[$i] != '' ){
			
				$patient = explode('|',$members[$i]);
				$member_info = array(
						'client_id' => $this->session->userdata('client_id'),
						'group_id' => $this->input->post('group_list'),
						'mobile' => $patient[0],
						'member_id' => $patient[1]
					);
				$this->db->insert('tbl_group_members', $member_info); 
			}

		}
		return true;
	}
	public function addcustom()
	{
		$members = $this->input->post('contacts');
		$count = sizeof($members);
		for($i=0;$i<$count;$i++){
		
			if($members[$i] != '' ){
				$patient = explode('|',$members[$i]);
				$member_info = array(
						'client_id' => $this->session->userdata('client_id'),
						'group_id' => $this->input->post('group_list'),
						'mobile' => $patient[0],
						'member_id' => $patient[1],
					);
				$this->db->insert('tbl_group_members', $member_info); 
			}
		}
		return true;
	}
	
		public function addcontacts()
	{
		
		
				$member_info = array(
						'first_name' =>$this->input->post('firstname'),
						'last_name' => $this->input->post('lastname'),
						'mobile' => $this->input->post('mobile'),
						'client_id' => $this->session->userdata('client_id'),
						
					);
				$this->db->insert('tbl_contacts', $member_info); 
		
		return true;
	}
	
	public function getGroupMember($groupid){
		$this->db->select('group_name')->from('tbl_group')->where('group_id',$groupid);
		$result = $this->db->get();
		$staff = $result->row()->group_name;
		if($staff == 'Staff'){
				$this->db->select('t1.mobile,t1.member_id,t2.first_name,t2.last_name');
				$this->db->from('tbl_group_members t1');
				$this->db->join('tbl_staff_info t2','t2.staff_id = t1.member_id');
				$this->db->where('t1.group_id',$groupid);
				$this->db->order_by("t2.first_name", "desc"); 
				$query = $this->db->get();
				return ($query->num_rows()>0) ? $query->result_array()  : false;
		}elseif($staff == 'patients'){
				$this->db->select('t1.mobile,t1.member_id,t2.first_name,t2.last_name');
				$this->db->from('tbl_group_members t1');
				$this->db->join('tbl_patient_info t2','t2.patient_id = t1.member_id');
				$this->db->where('t1.group_id',$groupid);
				$this->db->order_by("t2.first_name", "asc"); 
				$query = $this->db->get();
				return ($query->num_rows()>0) ? $query->result_array()  : false;
		}
		else
		{
			$this->db->select('t1.mobile,t1.member_id,t2.first_name,t2.last_name');
				$this->db->from('tbl_group_members t1');
				$this->db->join('tbl_contacts t2','t2.contacts_id = t1.member_id');
				$this->db->where('t1.group_id',$groupid);
				$this->db->order_by("t2.first_name", "asc"); 
				$query = $this->db->get();
				return ($query->num_rows()>0) ? $query->result_array()  : false;
		}
	}
	
	public function sent_message()
	{
		date_default_timezone_set("Asia/Kolkata"); 
		$gid = $this->input->post('group_list');
		$message = $this->input->post('message');
		$this->db->select('count(*) as totalrows')->from('tbl_group_members')->where('group_id',$gid);
		$q = $this->db->get();
		$qrow = $q->row();
		$totsms = $qrow->totalrows;
		
		$this->db->select('mobile')->from('tbl_group_members')->where('group_id',$gid);
		$query = $this->db->get();
		$mobile = ($query->num_rows()>0) ? $query->result_array()  : false;
		
		if($mobile != false){
			foreach($mobile as $mobileno){
				if($mobileno['mobile'] != 0){
					$doctorSmsURL =	'http://bullksms.krpinfosolutions.in/api/sendmsg.php?user=physioplus&pass=goodluck&sender=Test&phone='.$mobile.'&text='.urlencode($message).'&priority=dnd&stype=normal';
					$doctor_churl = @fopen($doctorSmsURL,'r');
					fclose($doctor_churl); 
					$this->db->query('update tbl_validity set psms_count = 	psms_count + 1 where client_id ='. $this->session->userdata('client_id'));
					$deliveryinfo = array(
					
						'client_id' => $this->session->userdata('client_id'),
						'delivery_date' => date('Y-m-d'),
						'status' => 'Success',
						'message' => $message,
						'delivery_time' => date("h:i:s A")
					
					);
					$this->db->insert('sms_delivery_report',$deliveryinfo);
				}
			}
		}else{
			return false;
		}
	}
	
	public function add_template()
	{
		$tempInfo = array(
			'client_id' => $this->session->userdata('client_id'),
			'title' => $this->input->post('ttitle'),
			'description' => $this->input->post('tdesc')
		);
		
		$this->db->insert('tbl_template', $tempInfo);
		
		return true;
	}
	
	public function getTempList()
	{
		$this->db->select('*')->from('tbl_template')->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array()  : false;
	}
	
	public function getBirthday()
	{
		$bday = $this->db->query('SELECT DATE_ADD(curdate(),INTERVAL 7 DAY) as bday from dual');
		foreach($bday->result() as $days)
		{
			$todate = $days->bday;
		} 
		$query = $this->db->query("select first_name,last_name,dob,mobile_no from tbl_patient_info where DATE_FORMAT(dob, '%c-%d') BETWEEN DATE_FORMAT('".date('Y-m-d')."', '%c-%d')  AND DATE_FORMAT('".$todate."', '%c-%d') ORDER BY DATE_FORMAT(dob, '%c-%d') ASC");

		return ($query->num_rows()>0) ? $query->result_array()  : false;
	}
	
	public function remove_member($group_id,$member_id)
	{
		$where = array('client_id' => $this->session->userdata('client_id'),'member_id' =>$member_id,'group_id'=>$group_id );
		$this->db->where($where);
		$this->db->delete('tbl_group_members');
	}
	
	public function delete_group($group_id)
	{
		$where = array('client_id' => $this->session->userdata('client_id'),'group_id'=>$group_id );
		$this->db->where($where);
		$this->db->delete('tbl_group_members');
		
		$this->db->where($where);
		$this->db->delete('tbl_group');
	}
	
	public function delete_temp($client_id,$tempid){
		
		$where = array('client_id' => $client_id,'tempid' => $tempid);
		$this->db->where($where);
		$this->db->delete('tbl_template');
	}
	
	
	public function StaffList()
	{
		$this->db->select('staff_id,first_name,last_name,mobile_no')->from('tbl_staff_info')->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array()  : false;
	}
	
	public function single_pmsg()
	{
		date_default_timezone_set("Asia/Kolkata"); 
		$mobile = $this->input->post('patient_id');
		$message = $this->input->post('pat_message');
			$doctorSmsURL =	'http://bullksms.krpinfosolutions.in/api/sendmsg.php?user=physioplus&pass=goodluck&sender=Test&phone='.$mobile.'&text='.urlencode($message).'&priority=dnd&stype=normal';
					$doctor_churl = @fopen($doctorSmsURL,'r');
					fclose($doctor_churl); 
			$this->db->query('update tbl_validity set psms_count = 	psms_count + 1 where client_id ='. $this->session->userdata('client_id'));
			$deliveryinfo = array(
					
						'client_id' => $this->session->userdata('client_id'),
						'delivery_date' => date('Y-m-d'),
						'status' => 'Success',
						'message' => $message,
						'delivery_time' => date("h:i:s A")
					
					);
			$this->db->insert('sms_delivery_report',$deliveryinfo);
			
		return true;
	}
	
	public function single_smsg()
	{
		date_default_timezone_set("Asia/Kolkata"); 
		$mobile = $this->input->post('staff_id');
		$message = $this->input->post('stf_message');
			$doctorSmsURL =	'http://bullksms.krpinfosolutions.in/api/sendmsg.php?user=physioplus&pass=goodluck&sender=Test&phone='.$mobile.'&text='.urlencode($message).'&priority=dnd&stype=normal';
					$doctor_churl = @fopen($doctorSmsURL,'r');
					fclose($doctor_churl); 
			$this->db->query('update tbl_validity set psms_count = 	psms_count + 1 where client_id ='. $this->session->userdata('client_id'));
			$deliveryinfo = array(
					
						'client_id' => $this->session->userdata('client_id'),
						'delivery_date' => date('Y-m-d'),
						'status' => 'Success',
						'message' => $message,
						'delivery_time' => date("h:i:s A")
					
					);
			$this->db->insert('sms_delivery_report',$deliveryinfo);
		return true;
	}
	
	public function bday_gretting($mobile)
	{
		date_default_timezone_set("Asia/Kolkata"); 
		$message = $this->input->post('msg');
			$doctorSmsURL = 'http://bulk.smsinfo.in/api/sendmsg.php?user=physioplus&pass=goodluck&sender=Test&phone='.$mobile.'&text='.urlencode($message).'&priority=dnd&stype=normal';
					$doctor_churl = @fopen($doctorSmsURL,'r');
					fclose($doctor_churl); 
			$this->db->query('update tbl_validity set psms_count = psms_count + 1 where client_id ='. $this->session->userdata('client_id'));
			$deliveryinfo = array(
					
						'client_id' => $this->session->userdata('client_id'),
						'delivery_date' => date('Y-m-d'),
						'status' => 'Success',
						'message' => $message,
						'delivery_time' => date("h:i:s A")
					
					);
			$this->db->insert('sms_delivery_report',$deliveryinfo);
		return true;
	}
	
	public function promotional()
	{
		$this->db->select('promotional')->from('tbl_client')->where('client_id',$this->session->userdata('client_id'));
		$result = $this->db->get();
		return ($result->num_rows()>0) ? $result->row()->promotional : false;
	}
	
	public function smslimit() {
		$this->db->select('psms_limit')->from('tbl_validity')->where('client_id', $this->session->userdata('client_id'));
		$smslimit = $this->db->get();
		return ($smslimit->num_rows()>0) ? $smslimit->row()->psms_limit : false;
	}
	
	public function smsCount() {
		$this->db->select('psms_count')->from('tbl_validity')->where('client_id', $this->session->userdata('client_id'));
		$smslimit = $this->db->get();
		return ($smslimit->num_rows()>0) ? $smslimit->row()->psms_count : false;
	}
	
	public function nummessage()
	{
		date_default_timezone_set("Asia/Kolkata"); 
		$mobile = $this->input->post('mobileno');
		$message = $this->input->post('num_message');
			$doctorSmsURL =	'http://bullksms.krpinfosolutions.in/api/sendmsg.php?user=physioplus&pass=goodluck&sender=Test&phone='.$mobile.'&text='.urlencode($message).'&priority=dnd&stype=normal';
					$doctor_churl = @fopen($doctorSmsURL,'r');
					fclose($doctor_churl); 
			$this->db->query('update tbl_validity set psms_count = 	psms_count + 1 where client_id ='. $this->session->userdata('client_id'));
			$deliveryinfo = array(
					
						'client_id' => $this->session->userdata('client_id'),
						'delivery_date' => date('Y-m-d'),
						'status' => 'Success',
						'message' => $message,
						'delivery_time' => date("h:i:s A")
					
					);
			//$this->db->insert('sms_delivery_report',$deliveryinfo);
			
		return true;
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
			'patient_id' => $this->input->post('patient_id'),
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
			'our_comun10' => $srate18,
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
	
	public function feedbackview($feedback_id){
		$this->db->where('fb.client_id',$this->session->userdata('client_id'));
		$this->db->where('fb.feedback_id',$feedback_id);
		$this->db->select('fb.feedback_id,fb.client_id,pi.first_name as pfirst,pi.last_name as plast,fb.visit_date,fb.your_apoinment1,fb.your_apoinment2,fb.your_apoinment3,fb.your_apoinment4,fb.our_staff1,fb.our_staff2,fb.our_staff3,fb.our_staff4,fb.our_comun1,fb.our_comun2,fb.our_comun3,fb.our_comun4,fb.our_comun5,fb.our_comun6,fb.our_comun7,fb.our_comun8,fb.our_comun9,fb.our_comun10,fb.our_facility1,fb.our_facility2,fb.our_facility3,fb.satisfaction1,fb.satisfaction2,fb.satisfaction3,fb.total_rate,fb.recommend');
		$this->db->from("feedback fb");
		$this->db->join("tbl_patient_info pi", "fb.patient_id=pi.patient_id");
		//$this->db->join("tbl_staff_info si", "fb.staff_id=si.staff_id");
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array()  : false;
	}
	public function getDetails()
	{
		$this->db->select('*')->from('tbl_client')->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array()  : false;
	}
	public function set_appto($app_id,$title,$app_date,$start,$end,$har_email,$har_mob_no,$client_id,$con_id){
		 $app=explode('-',$app_date);
		$str=explode(' ',$start); 
		$ends=explode(' ',$end); 
		$st=explode('-',$str[0]); 
		
		echo $client_id; 
		
		for($i=$st[2] + 1; $i <= $app[2] ; $i++){
			$date1=$st[0].'-'.$st[1].'-'.$i;
			
			$start1=$date1.' '.$str[1];
			$end=$date1.' '.$ends[1];
			echo $end;
			
			$a1=array(
			'client_id'=>$client_id,
			'start'=>$start1,
			'end'=>$end,
			'title' => $title,
			'appointment_from'=>$start,
			'appointment_to'=>$app_date,
			'har_mob_no'=>$har_mob_no,
			'har_email'=>$har_email,
			'staff_id' => $con_id
			);
			$this->db->insert('tbl_appointments',$a1);
			
		}
		return true;
		  
	}
	public function set_updateto($app_id,$title,$app_date,$con_id)
	{
		
		$a2=array(
		'appointment_to' => $app_date,
		'staff_id' => $con_id
		);
		$this->db->where('appointment_id',$app_id);
		$this->db->where('title',$title);
		$this->db->update('tbl_appointments',$a2);
		return true;
	}
	public function chart_name($client_id) {
		$this->db->select('chart_name,chard_no')->from('save_chart')->where('client_id',$this->session->userdata('client_id'));
		$this->db->distinct();
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array()  : false;
	}
	
	public function search_incomeadvance()
	{
		if($this->uri->segment(4) != ''){
		$from=$this->uri->segment(5);
		$to=$this->uri->segment(6);
		 
		} else {
			$from = date('d-m-Y', strtotime('-30 days'));
			$to = date('d-m-Y');
		 
			
		}

		$this->db->where('ih.advance_date >= ',date('Y-m-d',strtotime($from)));
		$this->db->where('ih.advance_date <= ',date('Y-m-d',strtotime($to)));
		$this->db->where('ih.client_id',$this->session->userdata('client_id'));
		$this->db->select('ih.advance_date,ih.payment_mode,ih.cheque_no,ih.advance_amount,ih.patient_id,pi.patient_code,pi.first_name,pi.last_name');
		$this->db->from("tbl_patient_advance ih");
		$this->db->join("tbl_patient_info pi", "ih.patient_id=pi.patient_id");
		$this->db->order_by('ih.advance_date', 'asc');
		 if($this->uri->segment(4) == 'p_name'){
			 $this->db->where('pi.patient_id',$from);
		 }
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->result_array() : false;
	}
	public function search_incomestat()
	{
		/* if($this->uri->segment(4) == 'date'){
			$from=$this->uri->segment(5);
			$to=$this->uri->segment(6);
		    $this->db->where('ih.treatment_date >= ',date('Y-m-d',strtotime($from)));
		    $this->db->where('ih.treatment_date <= ',date('Y-m-d',strtotime($to)));		
		} else if($this->uri->segment(4) == 'p_name') {
			 $from=$this->uri->segment(5);
			 $this->db->where('pi.patient_id',$from); 
		} else if($this->uri->segment(4) == 'mobile') {
			 $from=$this->uri->segment(5);
			 $this->db->where('pi.patient_id',$from); 
		}
		else {
			$from = date('d-m-Y', strtotime('-30 days'));
			$to = date('d-m-Y');
			$this->db->where('ih.treatment_date >= ',date('Y-m-d',strtotime($from)));
		    $this->db->where('ih.treatment_date <= ',date('Y-m-d',strtotime($to)));
		}
		$this->db->distinct();
		$this->db->where('ih.client_id',$this->session->userdata('client_id'));
		$this->db->select('ih.bill_no,ih.bill_id,ih.treatment_date,ih.patient_id,pi.patient_code,pi.first_name,pi.last_name,ih.bill_status,ih.net_amt,ih.paid_amt,ih.payment_mode');
		$this->db->from("tbl_invoice_header ih");
		$this->db->join("tbl_patient_info pi", "ih.patient_id=pi.patient_id");
		$this->db->order_by('ih.treatment_date', 'asc');
		$res=$this->db->get();  
		return ($res->num_rows()>0) ? $res->result_array() : false;   */
		
		if($this->uri->segment(4) == 'date'){  
			$from=$this->uri->segment(5);
			$to=$this->uri->segment(6);
		    $this->db->where('ih.payment_date >= ',date('Y-m-d',strtotime($from)));
		    $this->db->where('ih.payment_date <= ',date('Y-m-d',strtotime($to)));		
		} else if($this->uri->segment(4) == 'p_name') {
			 $from=$this->uri->segment(5);
			 $this->db->where('pi.patient_id',$from); 
		} else if($this->uri->segment(4) == 'mobile') {
			 $from=$this->uri->segment(5);
			 $this->db->where('pi.patient_id',$from); 
		}
		else {
			$from = date('d-m-Y', strtotime('-30 days'));
			$to = date('d-m-Y');
			$this->db->where('ih.payment_date >= ',date('Y-m-d',strtotime($from)));
		    $this->db->where('ih.payment_date <= ',date('Y-m-d',strtotime($to)));
		}
		$this->db->distinct();    
		$this->db->where('ih.client_id',$this->session->userdata('client_id'));
		$this->db->select('id.bill_no,ih.bill_id,ih.payment_date,id.patient_id,pi.patient_code,pi.first_name,pi.last_name,ih.paid_amt,ih.payment_mode,id.net_amt,id.treatment_date');
		$this->db->from("tbl_invoice_payments ih");
		$this->db->join("tbl_invoice_header id", "id.bill_id=ih.bill_id");
		$this->db->join("tbl_patient_info pi", "id.patient_id=pi.patient_id");
		$this->db->order_by('ih.payment_date', 'asc');
		$res=$this->db->get();  
		return ($res->num_rows()>0) ? $res->result_array() : false;
	}
	
	public function search_incomestat1()
	{
		$search2 = $this->uri->segment(6);
		$search1 = $this->uri->segment(5);
		$search = $this->uri->segment(4);
		if($search == 'date'){
			$this->db->where('payment_date >=',date('Y-m-d',strtotime($search1)));
			$this->db->where('payment_date <=',date('Y-m-d',strtotime($search2)));
		} else {
		}
		$this->db->select('payment_mode,SUM(paid_amt)as total')->from('tbl_invoice_payments'); 
		$this->db->group_by('payment_mode');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		return ($query->num_rows() > 0 ) ? $query->result_array() : false;
	}
	public function search_incometreat()
	{
		if($this->uri->segment(4) != ''){
		$from=$this->uri->segment(5);
		$to=$this->uri->segment(6);
		$treatment=$this->uri->segment(7);
		} else {
			$from = date('d-m-Y', strtotime('-30 days'));
			$to = date('d-m-Y');
			$treatment = 'null';
			
		}
		$this->db->distinct();
		$this->db->where('ih.client_id',$this->session->userdata('client_id'));
		$this->db->select('ih.bill_no,ih.bill_id,ih.treatment_date,ih.patient_id,pi.patient_code,pi.first_name,pi.last_name,ih.bill_status,idtl.item_amount,ih.payment_mode,it.item_name');
		$this->db->from("tbl_invoice_header ih");
		$this->db->join("tbl_patient_info pi", "ih.patient_id=pi.patient_id");
		$this->db->join("tbl_invoice_detail idtl", "idtl.bill_id=ih.bill_id");
		$this->db->join("tbl_item it", "it.item_id=idtl.item_id");
		$this->db->where('ih.client_id',$this->session->userdata('client_id'));
		$this->db->where('ih.treatment_date >= ',date('Y-m-d',strtotime($from)));
		$this->db->where('ih.treatment_date <= ',date('Y-m-d',strtotime($to)));
		$this->db->order_by('idtl.bill_id', 'asc');
		 
		if($treatment != 'null'){
		   $this->db->where('idtl.item_id',$treatment);
		}
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array()  : false;

	}
	public function sch_slot(){
			$this->db->select('*')->from('tbl_schedule_settings')->where('client_id',$this->session->userdata('client_id'));
			$query = $this->db->get();
			return ($query->num_rows() > 0 ) ? $query->result_array() : false;
		}
		public function sch_times(){
			$this->db->select('sch_slot,sch_time')->from('tbl_settings')->where('client_id',$this->session->userdata('client_id'));
			$query = $this->db->get();
			return ($query->num_rows() > 0 ) ? $query->result_array() : false;
		}
	 public function add_letter()
	  {
		$tempInfo = array(
			'client_id' => $this->session->userdata('client_id'),
			'title' => $this->input->post('tittle'),
			'letter' => $this->input->post('letter')
		   
		);
		
		$this->db->insert('tbl_letter', $tempInfo);
		return true;
		
	}
	public function letter_view() 
	{
		$this->db->where('client_id',$this->session->userdata('client_id'));
	    $this->db->select('*')->from('tbl_letter')->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array()  : false;
	
	}
	public function letter_edit()
	{
		$this->db->where('client_id',$this->session->userdata('client_id'));
	    $this->db->select('*')->from('tbl_letter')->where('letter_id',$this->uri->segment(4));
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array()  : false;
	
	}
	public function letter_upadte($letter_id)
	{
	
	 $update1=array(
    'title' => $this->input->post('tittle'),
	'letter' => $this->input->post('letter')
	);
	$this->db->where('letter_id',$letter_id);
	$this->db->update('tbl_letter',$update1);
	return true;
	
	}
	
	public function view_test()
	{
	
	  $this->db->select('*')->from('tbl_letter')->where('letter_id',$this->uri->segment(4));
	  $query = $this->db->get();
	  return ($query->num_rows()>0) ? $query->result_array()  : false;
	
	
	}
	public function client_details()
	{
	
	$this->db->select('*')->from('tbl_client')->where('client_id',$this->session->userdata('client_id'));
	$query =$this->db->get();
	return ($query->num_rows()>0) ? $query->result_array()  : false;
	}
	public function get_mobile(){
		$this->db->select('mobile_no')->from('tbl_patient_info')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
   
	}
	public function get_code(){
		$this->db->select('patient_code')->from('tbl_patient_info')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
   
	}
	 
  public function search_referalreport()
	{
		
		if($this->uri->segment(4) == 'date') {
			$this->db->where('pi.appoint_date >=',date('Y-m-d',strtotime($this->uri->segment(5))));
			$this->db->where('pi.appoint_date <=',date('Y-m-d',strtotime($this->uri->segment(6))));
		} else {
			$to = date('Y-m-d');
			$from = date('Y-m-d', strtotime("-30 days"));
			$this->db->where('pi.appoint_date >=',date('Y-m-d',strtotime($from)));
			$this->db->where('pi.appoint_date <=',date('Y-m-d',strtotime($to)));
		}
		
		$this->db->distinct(); 
		$this->db->where('pi.referal_id !=','');
		$this->db->where('pi.client_id',$this->session->userdata('client_id'));
		$this->db->select('pi.referal_id,pi.patient_id,pi.patient_code,pi.first_name,pi.last_name,pi.mobile_no,pi.email')->from("tbl_patient_info pi");
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array()  : false; 
	}
	public function get_invoiceamount($patient_id,$from,$to)
	{
		$this->db->where('treatment_date >=',date('Y-m-d',strtotime($from)));
		$this->db->where('treatment_date <=',date('Y-m-d',strtotime($to)));
		$this->db->where('client_id',$this->session->userdata('client_id'));		
		$this->db->where('patient_id',$patient_id);		
		$this->db->select('SUM(net_amt) AS amount')->from('tbl_invoice_header');
		$query = $this->db->get();
		return $query->row()->amount;
	}
	
	public function search_referalreport1()
	{
		if($this->uri->segment(4) == 'date') {
			$this->db->where('pi.appoint_date >=',date('Y-m-d',strtotime($this->uri->segment(5))));
			$this->db->where('pi.appoint_date <=',date('Y-m-d',strtotime($this->uri->segment(6))));
		} else {
			$to = date('Y-m-d');
			$from = date('Y-m-d', strtotime("-30 days"));
			$this->db->where('pi.appoint_date >=',date('Y-m-d',strtotime($from)));
			$this->db->where('pi.appoint_date <=',date('Y-m-d',strtotime($to)));
		}
		$this->db->distinct(); 
		$this->db->where('pi.referal_id !=','');
		$this->db->where('pi.client_id',$this->session->userdata('client_id'));
		$this->db->select('ri.adv_name,ri.website_name,ri.referal_type_id,ri.referal_id,ri.referal_name,ri.referal_oth_name,count(pi.patient_id) as patient')->from("tbl_patient_info pi");
		$this->db->join('tbl_referal ri','ri.referal_id = pi.referal_id');
        $this->db->group_by('pi.referal_id');
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array()  : false; 
	}
	public function getStaff() {
		$this->db->select('first_name,last_name,staff_id')->from('tbl_staff_info');
		$this->db->where('client_id',$this->session->userdata('client_id'));
	    $query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	
	
	public function getTreatmentName() {
		$this->db->where('td.client_id',$this->session->userdata('client_id'));
		
		$this->db->select('item_id');
		$this->db->from("tbl_appointments");
		/* $this->db->join("tbl_appointments pv", "td.item_id=pv.item_id");
		$this->db->where('pv.status','0');
		 */$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	public function get_provisional($patient_id){
		$this->db->where('patient_id',$patient_id);
		$this->db->select('prov_diagnosis')->from('tbl_patient_prov_diagnosis');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
   }
   public function list_treatments($d1){
	    $this->db->where('pd.treatment_date',date('Y-m-d',strtotime($d1)));
		$this->db->select('pd.treatments,pd.treatment_quantity,pi.first_name,pi.last_name,pi.patient_code,pi.patient_id,pi.age,it.item_name')->from('tbl_patient_treatment_techniques pd');
		$this->db->join('tbl_patient_info pi',"pd.patient_id = pi.patient_id");
		$this->db->join('tbl_item it',"it.item_id = pd.treatments");
		$this->db->where('pd.client_id',$this->session->userdata('client_id'));
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function client_appcheck() {
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('app_id')->from('tbl_app_det');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function add_mobifeedback(){
		$data=array(
		    'patient_id' => $this->input->post('patient_id'),
		    'touch' => $this->input->post('touch'),
		    'satisfactory' => $this->input->post('satisfactory'),
			'reception' => $this->input->post('reception'),
			'interaction' => $this->input->post('interaction'),
			'relief' => $this->input->post('relief'),
			'recommend'=> $this->input->post('recommend'),
			'reason'=> $this->input->post('reason'),
			'improvements'=> $this->input->post('improvements'),
		);
		$this->db->insert('tbl_mobifeedback',$data);
       $id = $this->db->insert_id();
	   return $id;
	}
	public function mobi_feedbackview($feedback_id){
		$this->db->where('fb.feedback_id',$feedback_id);
		$this->db->select('fb.touch,fb.satisfactory,fb.reception,fb.interaction,fb.relief,fb.recommend,fb.reason,fb.improvements,pi.first_name,pi.last_name');
		$this->db->from("tbl_mobifeedback fb");
		$this->db->join("tbl_patient_info pi", "fb.patient_id=pi.patient_id");
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array()  : false;
	}
	public function request_quote_add()
	{		
	 $requirement = $this->input->post('req');
	 $req =implode(",", $requirement);
     $data=array(
	 'name' =>$this->input->post('name'),
	 'email' =>$this->input->post('email'),
	 'mobile' =>$this->input->post('mobile'),
	 'message' =>$this->input->post('desc'),
	 'duration' =>$this->input->post('duration'),
	 'requirement' =>$req,
	 'login' =>$this->input->post('login'),
	 'clogin' =>$this->input->post('clogin'),
	 
	 ); 
	 $this->db->insert('tbl_req_quotation', $data);
	 
	  $name = $this->input->post('name');
      $email = $this->input->post('email');
      $mobile = $this->input->post('mobile');
      $message = $this->input->post('desc');
	  $duration = $this->input->post('duration');
	  $requirement = $this->input->post('req');
	  $login = $this->input->post('login');
	  $clogin = $this->input->post('clogin');
	  $data['req'] =implode(",", $requirement);
		$date = date('d-m-Y');
		 $this->load->library('email');
		$this->load->helper('path');
        $this->load->helper('directory'); 
		 $this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'physiotechasia',
				  'smtp_pass' => 'Physioasia@2019',
				  'smtp_port' => 587,
				  'crlf' => "\r\n",
				  'newline' => "\r\n",
				  'mailtype' => 'html'
		  ));
         
		  $this->email->from('no-reply@physioplustech.com','Physio Plus Tech');
		  	
		$template='<table width="100%"  style="font-family:Arial, Helvetica, sans-serif; background:#B45F04; font-size:13px;">
	    <tr>
		<td align="center">
        	<table align="center" style="width:600px;">
            	<tr>
                	<td style="width:200px; background:#B45F04; float:left;">
                    	<img src="http://physioplustech.in/images/logo.png" style="width:200px; height:88px;">
                    </td>
                    <td style="width:390px; height:100px; float:right;">
                    	<p style="color:#fff; margin-top:25px; font-size:15px; text-align:center; line-height:25px;">World`s Best Web-based Clinic Management Software for Physiotherapists by Physiotherapists</p>
                    </td>
                </tr>
                <tr bgcolor="#CCCCCC" style="margin-top:-5px;">
                	<td>
                    	<table bgcolor="#FFFFFF" style="margin:20px 20px 20px 20px; width:600px ">
                        	<tr>
                            	<td width="300px;">
                    	<p style="color:#585858; font-family:Times New Roman, Times, serif; font-size:22px; text-align:left; padding-left:20px;"><strong>Contact Message</strong></p>
                           		</td>
							</tr>
                            <tr>
                            	<td>
                    				<table>
                                    	<tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">Name :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$name.'</p>
			                        		</td>
										</tr>
                                        <tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">E-Mail :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$email.'</p>
			                        		</td>
										</tr>
                                        <tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">Phone :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$mobile.'</p>
			                        		</td>
										</tr>
										<tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">requirements :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$data['req'].'</p>
			                        		</td>
										</tr>
										<tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">No Of staff Login :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$login.'</p>
			                        		</td>
										</tr>
										<tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">No Of Location :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$clogin.'</p>
			                        		</td>
										</tr>
										<tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">Duration :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$duration.'</p>
			                        		</td>
										</tr>
                                        <tr>
                            				<td>
							                   	<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">Message :</p>
                        					</td>
			                                <td>
												<p style="color:#6E6E6E; font-size:16px; text-align:left; padding-left:20px;">'.$message.'</p>
			                        		</td>
										</tr>
									</table>
                        		</td>
							</tr>
						</table>
                    </td>
				</tr>
				<tr>
                	<td align="center">
                    	<p style="color:#CCCCCC; text-align:center;">Copyright © 2013 Physio Plus Tech. All Rights Reserved.</p>
                        <a style="color:#CCCCCC;" href="http://physioplustech.com/"><p>www.physioplustech.com</p></a>
                    </td>
                </tr>
			</table>
		</td>
	</tr>
	</table>';
		
		$this->email->to('contact@physioplusnetwork.com');
		$this->email->subject('Request Quote - Physio Plus Tech');
		$this->email->message($template);
		$this->email->send();
		   
		 
		 
		  return true;
	}
	public function item_detail() {
	
	    $this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('note,footer')->from('tbl_client');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->row_array() : false;
    }
	public function staff_names() {
	    $this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('staff_id,first_name,last_name')->from('tbl_staff_info');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	public function staff_mobile() {
	    $this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('staff_id,mobile_no')->from('tbl_staff_info');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	public function letter_names() {
	    $this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('letter_id,title')->from('tbl_letter');
		$this->db->group_by('title');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	public function getCharttname() {
	    $this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('chard_no,chart_name')->from('save_chart');
		$this->db->group_by('chart_name');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	public function getPrivateChartname() {
	    $this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('chard_no,chart_name')->from('save_privatechart');
		$this->db->group_by('chart_name');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	public function letter_delete($letter_id){
		
		$where = array('letter_id' => $letter_id);
		$this->db->where($where);
		$this->db->delete('tbl_letter');
		return $letter_id;
		
	}
	
	public function search_patientinfo($p_id) {
		$this->db->where('patient_id',$p_id);
		$this->db->select('first_name,email,patient_id')->from('tbl_patient_info')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	public function report_patientsend_email($patient_id,$client_id) {
	    
		$email_id = $this->input->post('email_id');
		
		$registration_info = $this->registration_model->editProfile($client_id);
		$clinic_name = $registration_info['clinic_name'];
		$email = $registration_info['email'];
		$logo = $registration_info['logo'];
		$client_name = $registration_info['first_name'];
		$address = $registration_info['address'];
		
		$url = base_url().'uploads/logo/'.$logo;
		
		$patient_code = array();
		$first_name = array();
		$last_name = array();
		$treatment_date = array();
		$bill_no = array();
		$bill_id = array();
		$payment_mode = array();
		$net_amt = array();
		$paid_amt = array();
		$rem_amt = array();
		
		$this->db->distinct(); 
		$this->db->where('pi.patient_id',$patient_id);
		$this->db->where('ih.client_id',$this->session->userdata('client_id'));
		$this->db->select('ih.bill_no,ih.bill_id,ih.treatment_date,ih.patient_id,pi.patient_code,pi.first_name,pi.last_name,ih.bill_status,ih.net_amt,ih.paid_amt,ih.payment_mode');
		$this->db->from("tbl_invoice_header ih");
		$this->db->join("tbl_invoice_payments pt", "ih.bill_id=pt.bill_id");
		$this->db->join("tbl_patient_info pi", "ih.patient_id=pi.patient_id");
		$this->db->order_by('ih.treatment_date', 'asc');
		$query = $this->db->get();
		
         $net_amtt = 0; 
		if($query->result_array() != false){
			 foreach($query->result_array() as $row){
				 
				 array_push($first_name,$row['first_name']);
				 
				  array_push($last_name,$row['last_name']);
				  array_push($patient_code,$row['patient_code']);
				  array_push($treatment_date,$row['treatment_date']);
				  array_push($bill_no,$row['bill_no']);
				  array_push($bill_id,$row['bill_id']);
				  array_push($payment_mode,$row['payment_mode']);
				  array_push($net_amt,$row['net_amt']);
				  array_push($paid_amt,$row['paid_amt']);
				  array_push($rem_amt,$row['net_amt'] - $row['paid_amt']);
				  
				  $net_amtt += $row['net_amt'];
			 }
		}
		
		$pat ='';
		
		for( $i = 0; $i < count($first_name); $i++ ) {
			
			$pat .= '<tr>
			<td >'.$patient_code[$i].'</td>
			<td >'.$first_name[$i]. ' '.$last_name[$i].'</td>
				<td >'.date('d-m-Y',strtotime($treatment_date[$i])).'</td>
				<td >'.$bill_no[$i].''.substr($bill_id[$i],-7).'</td>
				<td >'.$payment_mode[$i].'</td>
				<td >'.$payment_mode[$i].'</td>
				<td >'.$net_amt[$i].'</td>
				<td >'.$paid_amt[$i].'</td>
				<td >'.$rem_amt[$i].'</td>
			  </tr>
			';
			}
			
			$pat_header ='<table width="600" border="1px solid black" cellspacing="0" cellpadding="0" style="background:#FFFFFF;border-collapse: collapse;">
				
				<tr>
    <th>Patient Code</th>
    <th>Full Name</th> 
    <th>Date</th>
	<th>Bill No</th>
    <th>Payment Mode</th> 
    <th>Staus</th>
	<th>Bill Amount</th>
    <th>Paid Amount</th> 
    <th>Due Amount</th>
  </tr>';
			   $pat_middle = $pat;
		 
		    $pat_footer='<tr><td colspan="8"></td></tr>
					<tr> <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td >Total: <b>'.number_format($net_amtt,2,'.','').' </b></td> <td></td>
					</tr>   
			</table></br>';
			if(count($patient_code) >= 1){
			 $pat_template = $pat_header.$pat_middle.$pat_footer;
			}
			else{
				$pat_template = '';
			}
			
		 // print_r($pat_template);
		  
		$patient_codee = array();
		$first_namee = array();
		$last_namee = array();
		$treatment_datee = array();
		$payment_modee = array();
		$advance_amount = array();
		
		$this->db->distinct(); 
		$this->db->where('pi.patient_id',$patient_id);
		$this->db->where('ih.client_id',$this->session->userdata('client_id'));
		$this->db->select('ih.payment_mode,ih.cheque_no,ih.advance_amount,ih.advance_date,ih.patient_id,pi.patient_code,pi.first_name,pi.last_name');
		$this->db->from("tbl_patient_advance ih");
		$this->db->join("tbl_patient_info pi", "ih.patient_id=pi.patient_id");
		$this->db->order_by('ih.advance_date', 'asc');
		$res = $this->db->get();
		
		$adv_amtt = 0; 
		
		if($res->result_array() != false){
			 foreach($res->result_array() as $row){
				 
				 array_push($patient_codee,$row['patient_code']);
                 array_push($first_namee,$row['first_name']);
                 array_push($last_namee,$row['last_name']);
                 array_push($treatment_datee,$row['advance_date']);
                 array_push($payment_modee,$row['payment_mode']); 
                 array_push($advance_amount,$row['advance_amount']);				 
				 
				 $adv_amtt += $row['advance_amount'];
			 }
		}
		
		$advance ='';
		
			for( $i = 0; $i < count($patient_codee); $i++ ) {
			
			$advance .= '<tr>
			<td >'.$patient_codee[$i].'</td>
			<td >'.$first_namee[$i]. ' '.$last_namee[$i].'</td>
				<td >'.date('d-m-Y',strtotime($treatment_datee[$i])).'</td>
				<td >'.$payment_modee[$i].'</td>
				<td >'.$advance_amount[$i].'</td>
				
			  </tr>
			';
			}
			
			$advance_header ='<table width="600" border="1px solid black" cellspacing="0" cellpadding="0" style="background:#FFFFFF;border-collapse: collapse;"><tr>
				
				<td colspan="5">
				<p style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif; 
					font-size:110%;	
					color:#4E5252; 
					text-align:center; 
					padding-top:20px; 
					padding-right:30px;">
				Advance Amount
				</p>
				</td></tr>
  <tr>
    <th>Patient Code</th>
    <th>Full Name</th> 
    <th>Date</th>
	<th>Payment Mode</th>
	<th>Advance Amount</th>
  </tr>';
			   $advance_middle = $advance;
		 
		    $advance_footer='<tr><td colspan="4"></td></tr>
					<tr> <td></td><td></td><td></td><td></td><td >Total: <b>'.number_format($adv_amtt,2,'.','').' </b></td> 
					</tr>   
			</table></br>';
			if(count($patient_codee) >= 1){
			 $advance_template = $advance_header.$advance_middle.$advance_footer;
			}
			else{
				$advance_template ='';
			}
		     $start = '<table  style="font-family: arial, sans-serif;border-collapse: collapse;width: 100%;">
				<tr>
				<td align="center">
				<table width="600" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF;">
				<tr>
				<td>

				</td>
				</tr>
				<tr>
				<td width="250px" align="center" valign="middle" style="background:#FFFFFF;">
				<img src=" '.$url.' " style="width:200px;height:160px;">
				</td>
				<td width="350px" align="left" valign="top" style="background:#0099DC;">
				<p style="font-family: Tahoma, Geneva, sans-serif;
					font-size:130%;
					color:#ffffff;
					text-align:right; 
					padding-top:20px; 
					padding-right:15px; 
					line-height:20px; 
					text-shadow:1px 1px 1px rgba(0, 0, 0, 0.2);">
				<strong>'.$clinic_name.'</strong>
				</p>
				<p style="font-family: Tahoma, Geneva, sans-serif;
					font-size:110%; 
					color:#ffffff; 
					text-align:right; 
					padding-right:15px; 
					line-height:20px;">
				Dr. '.$client_name.'.,
				</p>
				
				
				<p style="font-family: Tahoma, Geneva, sans-serif; 
					font-size:90%; 
					color:#ffffff; 
					text-align:right; 
					padding-right:15px; 
					padding-bottom:20px; 
					line-height:5px;">
				Email : '.$email.'
				</p>
				</td>
				</tr>
				</table>';
				$end = '<table width="600" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF;">	
			   <tr>
				<td style="background:#0099DC; width:600px; height:15px; text-align:left; vertical-align:bottom;">
				</td>
				</tr>
				</table>    
				</td>
				</tr>
			</table>';
			
			$template = $start.$pat_template.$advance_template.$end;
		   
		  print_r($template);
		  
		  $this->load->helper('path');
          $this->load->helper('directory'); 
		  $config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.sendgrid.net',
			'smtp_port' => 587,
			'smtp_user' => 'physiotechasia', 
			'smtp_pass' => 'Physioasia@2019', 
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
        );
		
	    $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
		$this->email->from('no-reply@physioplustech.com','Physio Plus Tech');
		$this->email->to($email_id);
	    $this->email->subject('Income Statement Report - Physio Plus Tech');
		$this->email->message($template);
		$this->email->send();
			
			
	}
	public function deletefeedback($feedback_id){
		
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$where = array('feedback_id' => $feedback_id);
		$this->db->where($where);
		$this->db->delete('feedback');
		return $feedback_id;
		
	}
	
	public function getmail($patient_id) {
		$this->db->where('patient_id',$patient_id);
		$this->db->select('first_name,last_name,email')->from('tbl_patient_info');
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->row_array()  : false;
	}
	public function generate_code() {
		$seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'); 
		shuffle($seed); 
        $rand = '';
       foreach (array_rand($seed, 4) as $k) $rand .= $seed[$k];
           return $rand;
	}
	
	public function send_mail() {
		$code = $this->generate_code();
		$data = array(
		 'verify_code' => $code,
		 'patient_id' =>$this->input->post('patient_id'),
		 'from_date' =>$this->input->post('from_date'), 
		 'to_date' => $this->input->post('to_date'),
		 'client_id' => $this->session->userdata('client_id')
		);
		$this->db->insert('send_patientreport',$data);
		$id = $this->db->insert_id();
		
		$url = base_url().'pages/report_print/'.$code;		
		$admin_logo = base_url().'img/logo.png';
		$this->db->select('ci.clinic_name,pi.first_name,pi.last_name,pi.email')->from('tbl_patient_info pi')->where('patient_id',$this->input->post('patient_id'));
	    $this->db->join('tbl_client ci','pi.client_id = ci.client_id');
		$res = $this->db->get();
		$f_name = $res->row()->first_name;
		$l_name = $res->row()->last_name;
		$email = $res->row()->email;
		$clinic_name = $res->row()->clinic_name; 
		$date = date('d-m-Y');
		
		$this->load->library('email');
		$this->load->helper('path');
        $this->load->helper('directory'); 
		 $this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'physiotechasia',
				  'smtp_pass' => 'Physioasia@2019',
				  'smtp_port' => 587,
				  'crlf' => "\r\n",
				  'mailtype' => 'html',
				  'newline' => "\r\n"
		  ));
          $path = set_realpath('uploads/mail/');
          $file_names = directory_map($path);
		  $this->email->from('no-reply@physioplustech.co.za',$clinic_name);
		  	
		  $template='<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		  
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="450px" align="center">
									<tr>
										<td align="center">
												<img style="float:left;"  src="http://www.physioplustech.in/img/logo.png">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
													<td colspan = "2">
													<p style="color:#666;padding-left:25px;font-size:120%">Dear '.$f_name.'</p>
													</td>
													
												</tr>
												<tr>
												<td  colspan = "2">
													<p style="color:#666;padding-left:25px;font-size:120%">You have received an report on '.$clinic_name.'</p>
												</td>
												</tr>
												<tr>
												<td>
												<a class="iframePopup" data-width="700" data-height="1000" id="viewReport" style="display:block;text-decoration:none;background-color:#095E9A;border:3px solid#d4d4d4;border-radius:3px;color:#fff;text-align:center; padding-top:7px;font-size:17px;margin-left:25px; width:300px; height:30px;" href=" '.$url.' ">Download the Reports</a>
												</td>
												</tr>
												<tr>
												<td  colspan = "2">
													<p style="color:#666;padding-left:25px;font-size:120%">This is a no-reply email address. Please do not reply to this email.</p>
												</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://www.physioplustech.in/"> www.physioplustech.in</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>';
		
	    $this->email->to($email); 
		$this->email->subject('Summary Reports');
		$this->email->message($template);
		$this->email->send();
		return $id; 
	}
	public function incomechart_value() {
		$date = $this->uri->segment(4);
		   	if($date == 'date')	{
				$from = date('Y-m-d',strtotime($this->uri->segment(5)));
				$to = date('Y-m-d',strtotime($this->uri->segment(6)));
				$where_condition = "(treatment_date >= '".$from."' AND treatment_date <= '".$to."')";
				$this->db->where($where_condition);
				$this->db->where('client_id',$this->session->userdata('client_id'));
				$this->db->select('treatment_date as date,SUM(net_amt) as total');
				$this->db->from("tbl_invoice_header");
				$this->db->group_by('treatment_date');
		    } 
			else {
				$to = date('Y-m-d');
				$from = date('Y-m-d', strtotime("-30 days"));
				$where_condition = "(treatment_date >= '".$from."' AND treatment_date <= '".$to."')";
				$this->db->where($where_condition);			
				$this->db->where('client_id',$this->session->userdata('client_id'));
				$this->db->select('treatment_date as date,SUM(net_amt) as total');
				$this->db->from("tbl_invoice_header");
				$this->db->group_by('treatment_date');
		    }
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
		
	}
	public function outstand_invoice()
	{
		if($this->uri->segment(4) != ''){
		  $from=$this->uri->segment(5);
		  $to=$this->uri->segment(6);
		  $Therapist=$this->uri->segment(7);
		} else {
			$from = date('d-m-Y', strtotime('-30 days'));
			$to = date('d-m-Y');
			$Therapist = 'null';
			
		}
		$this->db->select('it.first_name,it.last_name,iv.treatment_date,iv.payment_mode,iv.staff_id,iv.net_amt,iv.paid_amt,iv.patient_id')->from('tbl_invoice_header iv')->where('iv.client_id',$this->session->userdata('client_id'));
		$this->db->join('tbl_patient_info it','iv.patient_id = it.patient_id');
		$this->db->where('iv.treatment_date >= ',date('Y-m-d',strtotime($from)));
		$this->db->where('iv.treatment_date <= ',date('Y-m-d',strtotime($to)));
		$this->db->where('iv.bill_status !=',1);
		if($Therapist != 'null'){
		   $this->db->where('iv.staff_id',$Therapist);
		}
		$this->db->order_by('iv.treatment_date','ASC'); 
		$res=$this->db->get();
		return ($res->num_rows()>0) ? $res->result_array() : false;
	}
	public function outstandSum_invoice()
	{
		if($this->uri->segment(4) != ''){
		  $from=$this->uri->segment(5);
		  $to=$this->uri->segment(6);
		  $Therapist=$this->uri->segment(7);
		} else {
			$from = date('d-m-Y', strtotime('-30 days'));
			$to = date('d-m-Y');
			$Therapist = 'null';
			
		}
		$this->db->select('it.first_name,it.last_name,iv.treatment_date,iv.payment_mode,iv.staff_id,sum(iv.net_amt) AS net_amt,sum(iv.paid_amt) AS paid_amt,iv.patient_id')->from('tbl_invoice_header iv')->where('iv.client_id',$this->session->userdata('client_id'));
		$this->db->join('tbl_patient_info it','iv.patient_id = it.patient_id');
		$this->db->where('iv.treatment_date >= ',date('Y-m-d',strtotime($from)));
		$this->db->where('iv.treatment_date <= ',date('Y-m-d',strtotime($to)));
		$this->db->where('iv.bill_status !=',1);
		if($Therapist != 'null'){
		   $this->db->where('iv.staff_id',$Therapist);
		}
		$this->db->group_by('iv.patient_id'); 
		$this->db->order_by('iv.treatment_date','ASC'); 
		$res=$this->db->get();
		return ($res->num_rows()>0) ? $res->result_array() : false;
	}
	public function performance_lists($id)
	{
		if($this->uri->segment(4) != ''){
		$from=$this->uri->segment(5);
		$to=$this->uri->segment(6);
		} else {
			$from = date('d-m-Y', strtotime('-30 days'));
			$to = date('d-m-Y');
		}
		$this->db->select('it.first_name,it.last_name,iv.treatment_date,iv.payment_mode,iv.staff_id,iv.net_amt,iv.paid_amt,iv.patient_id')->from('tbl_invoice_header iv')->where('iv.client_id',$this->session->userdata('client_id'));
		$this->db->join('tbl_patient_info it','iv.patient_id = it.patient_id');
		$this->db->where('iv.treatment_date >= ',date('Y-m-d',strtotime($from)));
		$this->db->where('iv.treatment_date <= ',date('Y-m-d',strtotime($to)));
		$this->db->where('iv.staff_id',$id);
		$this->db->order_by('iv.treatment_date','ASC'); 
		$res=$this->db->get();
		return ($res->num_rows()>0) ? $res->result_array() : false;
	}
	public function performance_treatmentlists($id) {
		if($this->uri->segment(4) != ''){
		$from=$this->uri->segment(5);
		$to=$this->uri->segment(6);
		} else {
			$from = date('d-m-Y', strtotime('-30 days'));
			$to = date('d-m-Y');
		}
		$this->db->where('staff_id',$id);
		$this->db->where('sn_date >= ',date('Y-m-d',strtotime($from)));
		$this->db->where('sn_date <= ',date('Y-m-d',strtotime($to)));
		$this->db->select('patient_id,fpatient_name,sn_date,Session_count,lpatient_name,item_name')->from('tbl_session_det');
		$this->db->order_by('sn_date','ASC'); 
		$res=$this->db->get();
		return ($res->num_rows()>0) ? $res->result_array() : false;
	}
	public function performance_charts($id) {
		$date = $this->uri->segment(4);
		   	if($date == 'both')	{
				$from = date('Y-m-d',strtotime($this->uri->segment(5)));
				$to = date('Y-m-d',strtotime($this->uri->segment(6)));
				$where_condition = "(treatment_date >= '".$from."' AND treatment_date <= '".$to."')";
				$this->db->where($where_condition);
				$this->db->where('client_id',$this->session->userdata('client_id'));
				$this->db->where('staff_id',$id);
				$this->db->select('treatment_date as date,SUM(net_amt) as total');
				$this->db->from("tbl_invoice_header");
				$this->db->group_by('treatment_date');
		    } 
			else {
				$to = date('Y-m-d');
				$from = date('Y-m-d', strtotime("-30 days"));
				$where_condition = "(treatment_date >= '".$from."' AND treatment_date <= '".$to."')";
				$this->db->where($where_condition);			
				$this->db->where('staff_id',$id);
				$this->db->where('client_id',$this->session->userdata('client_id'));
				$this->db->select('treatment_date as date,SUM(net_amt) as total');
				$this->db->from("tbl_invoice_header");
				$this->db->group_by('treatment_date');
		    }
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
		
	}
	public function staffincomechart_value() {
		$date = $this->uri->segment(4);
		   	if($date == 'date')	{
				$from = date('Y-m-d',strtotime($this->uri->segment(5)));
				$to = date('Y-m-d',strtotime($this->uri->segment(6)));
				$where_condition = "(ih.treatment_date >= '".$from."' AND ih.treatment_date <= '".$to."')";
				$this->db->where($where_condition);
				$this->db->where('ih.client_id',$this->session->userdata('client_id'));
				$this->db->select('si.first_name,si.last_name,SUM(ih.total_amt) as tot,SUM(ih.discount_perc) as discount,SUM(ih.net_amt) as total');
				$this->db->from("tbl_invoice_header ih");  
				$this->db->join("tbl_staff_info si",'si.staff_id=ih.staff_id');  
				$this->db->group_by('ih.staff_id');
		    } else {
				$to = date('Y-m-d');
				$from = date('Y-m-d', strtotime("-30 days"));
				$where_condition = "(ih.treatment_date >= '".$from."' AND ih.treatment_date <= '".$to."')";
				$this->db->where($where_condition);
				$this->db->where('ih.client_id',$this->session->userdata('client_id'));
				$this->db->select('si.first_name,si.last_name,SUM(ih.total_amt) as tot,SUM(ih.discount_perc) as discount,SUM(ih.net_amt) as total');
				$this->db->from("tbl_invoice_header ih");
				$this->db->join("tbl_staff_info si",'si.staff_id=ih.staff_id');
				$this->db->group_by('ih.staff_id');
		    }
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
		
	}
	public function pdtincomechart_value() {
		$date = $this->uri->segment(4);
		   	if($date == 'date')	{
				$from = date('Y-m-d',strtotime($this->uri->segment(5)));
				$to = date('Y-m-d',strtotime($this->uri->segment(6)));
				$where_condition = "(ih.treatment_date >= '".$from."' AND ih.treatment_date <= '".$to."')";
				$this->db->where($where_condition);
				$this->db->where('ih.client_id',$this->session->userdata('client_id'));
				$this->db->select('si.item_id,SUM(si.item_amount) as total');
				$this->db->from("tbl_invoice_header ih");
				$this->db->join("tbl_invoice_detail si",'si.bill_id=ih.bill_id');
				$this->db->group_by('si.item_id');
		    } else {
				$to = date('Y-m-d');
				$from = date('Y-m-d', strtotime("-30 days"));
				$where_condition = "(ih.treatment_date >= '".$from."' AND ih.treatment_date <= '".$to."')";
				$this->db->where($where_condition);
				$this->db->where('ih.client_id',$this->session->userdata('client_id'));
				$this->db->select('si.item_id,SUM(si.item_amount) as total');
				$this->db->from("tbl_invoice_header ih");
				$this->db->join("tbl_invoice_detail si",'si.bill_id=ih.bill_id');
				$this->db->group_by('si.item_id');
		    }
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
		
	}
	public function rsstaff_list($staff_id) {
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('is_doctor',1);
		$this->db->where('staff_id !=',$staff_id);
		$this->db->select('staff_id,first_name,last_name')->from('tbl_staff_info');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function staff_list() {
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('is_doctor',1);
		$this->db->select('staff_id,first_name,last_name')->from('tbl_staff_info');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function dailypatientchart_list() {
		$to = date('Y-m-d');
		$from = date('Y-m-d', strtotime("-30 days"));
		$where_condition = "(appoint_date >= '".$from."' AND appoint_date <= '".$to."')";
		$this->db->where($where_condition);			
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('appoint_date as date,COUNT(patient_id) as total');
		$this->db->from("tbl_patient_info");
		$this->db->group_by('appoint_date');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function staffchart_list() {
		$to = date('Y-m-d');
		$from = date('Y-m-d', strtotime("-30 days"));
		$where_condition = "(appointment_from >= '".$from."' AND appointment_from <= '".$to."')";
		$this->db->where($where_condition);
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('appointment_from as date,count(appointment_id) as att');
		$this->db->from("tbl_appointments");
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function referalchart_list() {
		$to = date('Y-m-d');
		$from = date('Y-m-d', strtotime("-30 days"));
		$where_condition = "(appoint_date >= '".$from."' AND appoint_date <= '".$to."')";
		$this->db->where($where_condition);			
		$this->db->where('referal_type_id !=',0);
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('appoint_date as date,COUNT(patient_id) as total');
		$this->db->from("tbl_patient_info");
		$this->db->group_by('appoint_date');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function appointmentchart_list() {
		$to = date('Y-m-d');
		$from = date('Y-m-d', strtotime("-30 days"));
		$where_condition = "(appointment_from >= '".$from."' AND appointment_from <= '".$to."')";
		$this->db->where($where_condition);			
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('appointment_from as date,COUNT(appointment_id) as total');
		$this->db->from("tbl_appointments");
		$this->db->group_by('appointment_from');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function todays_advance($client_id){
		$this->db->where('ai.client_id',$client_id);
		$this->db->where('ai.advance_date',date('Y-m-d'));
		$this->db->select('pi.patient_id,pi.patient_code,pi.first_name,pi.last_name,ai.advance_date,ai.payment_mode,ai.advance_amount')->from('tbl_patient_advance ai');
		$this->db->join('tbl_patient_info pi','pi.patient_id=ai.patient_id');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	
	}
	
	public function today_birthday(){
		
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('MONTH(dob)=MONTH(NOW()) AND DAY(dob) = DAY(NOW())');
		$this->db->select('first_name,dob,mobile_no');
		$this->db->from("tbl_patient_info");
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array()  : false;
	}
	public function getotherItems() {
		$this->db->select('*');
		$this->db->from("tbl_other_treatment");
		$this->db->order_by('item_id','desc');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function get_name($patient_id) {
		$this->db->where('patient_id',$patient_id);
		$this->db->select('first_name,age,last_name,patient_id,patient_code')->from('tbl_patient_info');
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->row_array() : false;
		
	}
	public function getletter()
	{
		$this->db->select('title,letter_id,client_id');
		$this->db->from("tbl_letter");
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->order_by('letter_id','desc');
		$query = $this->db->get();
	    return ($query->num_rows() > 0) ? $query->result_array():0;
	}
	public function get_help() {
		$this->db->select('*');
		$this->db->from("tbl_help");
		$query = $this->db->get();
	    return ($query->num_rows() > 0) ? $query->result_array():0;
	}
	public function count_birth(){
		
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('MONTH(dob)=MONTH(NOW()) AND DAY(dob) = DAY(NOW())');
		$this->db->select('count(patient_id) as id');
		$this->db->from("tbl_patient_info");
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->id : false;
	}  
	public function add_request()
	{
		
		$name = $this->input->post('name');
		$mobile = $this->input->post('mobile');
		$email = $this->input->post('email');
		$clinic = $this->input->post('clinic_name');
		$therapist = $this->input->post('therapist');
		$role = $this->input->post('role');
		$city = $this->input->post('city');
		$time = $this->input->post('time');
		$type = $this->input->post('type');
		$date1 = $this->input->post('date');
		$date =  date("Y/m/d");
		
		if($name != false && $mobile != false && $email != false && $clinic != false && $therapist != false && $role != false && $city != false && $time != false && $type != false && $date1 != false){
		
		$data = array(
			'name' => $name,
			'email' => $email,
			'mobile' => $mobile,
			'city' => $city,
			'clinicname' => $clinic,
			'no_therapist' => $therapist,
			'role' => $role,
			'date' =>$date,
			'demo_type' =>$type,
            'time'	=>	$time,
            'skype_id' => $this->input->post('skype_id')			
		);
		$this->db->insert('tbl_demorequest',$data);
		
		
		$admin_logo = "http://physioplustech.in/images/logo.png";
			
		$template = '
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="570px" align="center">
									<tr>
										<td align="center">
											<img style="float:left;" src=" '.$admin_logo.' ">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
													<td>
														<h1 style=" font-size:24px; color:#666; padding-left:25px;">Hello Admin,</h1>
														<p style=" color:#666; padding-left:25px;"><span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$name.'</span> has registered on '.$date.'.</p>
													</td>
									 			</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">Name : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;"> '.$name.'</span></p>
														<p style="color:#666;padding-left:25px;font-size:120%">Clinic Name : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$clinic.'</span></p>
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">City : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;"> '.$city.'</span></p>
														<p style="color:#666;padding-left:25px;font-size:120%">Demo Type : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;"> '.$type.'</span></p>
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">Demo Date : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;"> '.$date1.'</span></p>
														<p style="color:#666;padding-left:25px;font-size:120%">Demo Time : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$time.'</span></p>
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">Email : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$email.'</span></p>
														<p style="color:#666;padding-left:25px;font-size:120%">Mobile : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$mobile.'</span></p>
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">Number Of Therapists : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$therapist.' therapists</span></p>
														<p style="color:#666;padding-left:25px;font-size:120%">Role : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$role.'</span></p>
													</td>
												</tr>
												
												
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://physioplustech.com/"> www.physioplustech.com</a></p>
					<p style="text-align:center; color:#CCC;">World`s Best Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>
		';
		 $this->load->library('email');
		 $this->email->initialize(array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'smtp.sendgrid.net',
		  'smtp_user' => 'physiotechasia',
		  'smtp_pass' => 'Physioasia@2019',
		  'smtp_port' => 587,
		  'crlf' => "\r\n",
		  'newline' => "\r\n",
		  'mailtype' => 'html'
		));
		$this->email->from('no-reply@physioplustech.com', 'Physio Plus Tech');
		
	    $this->email->to('contact@physioplusnetwork.com'); 
		$this->email->subject('Free Demo Request'); 
		$this->email->message($template);
		$this->email->send();
	 	return $template; 
	  } 
	}
	
	public function contact_add()
	{
		
		$name = $this->input->post('name');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$message = $this->input->post('message');
		 
		$date =  date("Y/m/d");
		
		if($name != false && $phone != false && $email != false && $message != false){
		
		 
		
		
		$admin_logo = "http://physioplustech.in/images/logo.png";
			
		$template = '
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="570px" align="center">
									<tr>
										<td align="center">
											<img style="float:left;" src=" '.$admin_logo.' ">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
													<td>
														<h1 style=" font-size:24px; color:#666; padding-left:25px;">Hello Admin,</h1>
														 
													</td>
									 			</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">Name : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;"> '.$name.'</span></p>
														<p style="color:#666;padding-left:25px;font-size:120%">Phone : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$phone.'</span></p>
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">Email : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;"> '.$email.'</span></p>
														<p style="color:#666;padding-left:25px;font-size:120%">Message : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;"> '.$message.'</span></p>
													</td>
												</tr>
												 
												
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://physioplustech.com/"> www.physioplustech.com</a></p>
					<p style="text-align:center; color:#CCC;">World`s Best Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>
		';
		 $this->load->library('email');
		 $this->email->initialize(array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'smtp.sendgrid.net',
		  'smtp_user' => 'physiotechasia',
		  'smtp_pass' => 'Physioasia@2019',
		  'smtp_port' => 587,
		  'crlf' => "\r\n",
		  'newline' => "\r\n",
		  'mailtype' => 'html'
		));
		$this->email->from('no-reply@physioplustech.com', 'Physio Plus Tech');
		
	    $this->email->to('contact@physioplusnetwork.com'); 
		$this->email->subject('Contact Info'); 
		$this->email->message($template);
		$this->email->send();
	 	return $template; 
	  } 
	}
} 