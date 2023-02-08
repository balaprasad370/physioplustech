<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {
     public function __construct() {
		header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
		parent::__construct();
		$this->app_access->client();
		$this->load->model(array('common_model','staff_model','registration_model'));
	 }
	 
	 public function _remap($method, $params = array())
			{
			if($this->session->userdata('duration') == 0 ||  $this->session->userdata('plan') < 0 ){
				$controller = mb_strtolower(get_class($this));
				  
				if ($controller = mb_strtolower($this->uri->segment(1))) {
					$data['page_name'] = 'dashboard';
					$data['account_info'] = $this->registration_model->myaccount($this->session->userdata('client_id'));
					$data['sch_settings_inf']= $this->registration_model->editsettings($this->session->userdata('client_id')); 
					$data['profile']= $this->registration_model->editProfile($this->session->userdata('client_id'));
					$this->load->view('client/account', $data);
				} elseif (method_exists($this, $method))
				{	$data['page_name'] = 'dashboard';
						$data['account_info'] = $this->registration_model->myaccount($this->session->userdata('client_id'));
					$data['sch_settings_inf']= $this->registration_model->editsettings($this->session->userdata('client_id')); 
					$data['profile']= $this->registration_model->editProfile($this->session->userdata('client_id'));
					$this->load->view('client/account', $data); 
					return call_user_func_array(array($this, $method), $params);
				} else {
					$data['page_name'] = 'dashboard';
						$data['account_info'] = $this->registration_model->myaccount($this->session->userdata('client_id'));
					$data['sch_settings_inf']= $this->registration_model->editsettings($this->session->userdata('client_id')); 
					$data['profile']= $this->registration_model->editProfile($this->session->userdata('client_id'));
					$this->load->view('client/account', $data);
				}
			}
			else{
			  return call_user_func_array(array($this, $method), $params);
			}
		}
	public function add()
	{
		$data['page_name'] = 'staff';
		$this->load->view('client/staff_add',$data);
	}
	
	
	public function staff_add(){
	
	  $data['page_name'] = 'staff';
	  $staff_id = $this->input->post('staff_id');
	 
	 
   	  if($staff_id==''){
				if($staffData = $this->staff_model->staff_info())
				{
					//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Staff has been added successfully.';
					$response['staffData'] = $staffData;
				}
			}else {
				if($staffData = $this->staff_model->edit_staff_info($staff_id))
				{
					$response['status'] = 'success';
					$response['message'] = 'Staff has been updated successfully.';
					
				}
			}
			
		echo json_encode($response);
	 }
	
	
	 
	public function view(){
		
		$data['page_name'] = 'staff';
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$this->load->view('client/staff_view',$data); 
	} 
	public function getstaff() {
		$concessionData = $this->staff_model->getstaff1();
		echo json_encode($concessionData);
	}
	public function edit(){
		$data['page_name'] = 'staff';
		$staff_id = $this->uri->segment(4);
		$this->load->model('staff_model');
		$data['staff'] = $this->staff_model->editStaff($staff_id);
		$data['qstaff'] = $this->staff_model->editStaff1($staff_id);
		$data['estaff']=$this->staff_model->editStaff2($staff_id);
		$this->load->view('client/staff_edit',$data);
	}
	public function staffpro1()
	{
		$data['page_name'] = 'practitioners';
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('staff_id,first_name,last_name')->from('tbl_staff_info');
		if($this->uri->segment(4) == 'both')	{
			$this->db->where('staff_id',$this->uri->segment(7));
		} else {
            $this->db->order_by('staff_id','ASC');
		}
		$res = $this->db->get();
		if($res -> result_array() != false){
			$data['id']  = $res->row()->staff_id;
			$id  = $res->row()->staff_id;
			$data['name'] = $res->row()->first_name.' '.$res->row()->last_name;
			
			$data['staff'] = $this->common_model->rsstaff_list($id);
			$data['result'] = $this->common_model->paid_chart($id);
			$data['re_list'] = $this->common_model->paid_inv($id);
			$data['tr_list'] = $this->common_model->cre_inv($id);
		} else { 
			$data['result'] = '';
			$data['re_list'] = '';
			$data['tr_list'] = '';
			$data['name'] = '';
		}
		$data['result4'] = $this->staffpiechart();   
		$data['result1'] = $this->common_model->staffincomechart_value();
		$this->load->view('client/staffpro',$data);
	}
	public function staffpiechart()
	{
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
		$appointQuery = $query->result_array();
		$arr = array();
		foreach($appointQuery as $counts) {
			array_push($arr,$counts['total']);
		}
		return $arr;
	}
	public function print_paidchart() {
		$c_id = $this->session->userdata('client_id');
		$data['clientDetails'] = $this->registration_model->editProfile($c_id);
	    
		if($this->uri->segment(4) != ''){
			$data['from'] = 'Date : '.$this->uri->segment(5);
			$data['to'] = ' to '.$this->uri->segment(6);
		} else {
			$data['from'] = 'Date : '.date('Y-m-d', strtotime("-30 days"));
			$data['to'] = ' to '.date('Y-m-d');
		}
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('staff_id,first_name,last_name')->from('tbl_staff_info');
		if($this->uri->segment(4) == 'both')	{
			$this->db->where('staff_id',$this->uri->segment(7));
		} else {
            $this->db->order_by('staff_id','ASC');
		}
		$res = $this->db->get();
		if($res -> result_array() != false){
		$data['id']  = $res->row()->staff_id;
		$id  = $res->row()->staff_id;
		$data['name'] = $res->row()->first_name.' '.$res->row()->last_name;
		
		    $data['result'] = $this->common_model->paid_chart($id);
			$data['re_list'] = $this->common_model->paid_inv($id);
		} else {
			$data['name'] = '';
			$data['result'] = '';
			$data['re_list'] = '';
			
		}
		$this->load->view('client/print_paidchart',$data);
	}
	public function print_invchart() {
		$c_id = $this->session->userdata('client_id');
		$data['clientDetails'] = $this->registration_model->editProfile($c_id);
	    
		if($this->uri->segment(4) != ''){
			$data['from'] = 'Date : '.$this->uri->segment(5);
			$data['to'] = ' to '.$this->uri->segment(6);
		} else {
			$data['from'] = 'Date : '.date('Y-m-d', strtotime("-30 days"));
			$data['to'] = ' to '.date('Y-m-d');
		}
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('staff_id,first_name,last_name')->from('tbl_staff_info');
		if($this->uri->segment(4) == 'both')	{
			$this->db->where('staff_id',$this->uri->segment(7));
		} else {
            $this->db->order_by('staff_id','ASC');
		}
		$res = $this->db->get();
		if($res -> result_array() != false){
		$data['id']  = $res->row()->staff_id;
		$id  = $res->row()->staff_id;
		    $data['name'] = $res->row()->first_name.' '.$res->row()->last_name;
		 	$data['tr_list'] = $this->common_model->cre_inv($id);
		} else {
			$data['name'] = '';  
			$data['tr_list'] = '';
		}
		$this->load->view('client/print_invchart',$data);
	}
	
	public function staff_report()
	{	
		$data['page_name'] = 'practitioners';
		$data['result']=$this->staff_model->search_sessionwise();
		$data['info']=$this->staff_model->staffinfo();
		$this->load->view('client/staff_report', $data);
	}
	
	public function delete(){
		$data['page_name'] = 'patient';
		$this->load->model('staff_model');
		$staff_id = $this->uri->segment(4);
		$response=array();
		$result = $this->staff_model->delete_staff($_POST['p_id']);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		}
		echo json_encode($response);
		}
	public function export_staff(){
		$this->load->library('export');
		$data['page_name'] = 'staff';
		$segment_array = $this->uri->segment_array();
		
		$search=str_replace('%20',' ',$this->uri->segment(4));
		$search1=str_replace('%20',' ',$this->uri->segment(5));
		$search2=str_replace('%20',' ',$this->uri->segment(6));
		if($search == 'date'){
			//$data['dateFilter'] = true;
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment(5))));
			//echo $from;
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment(6))));
			//echo $to;
			$where_condition = "(date_of_joining >= '".$from."' AND date_of_joining <='".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
			$this->db->where($where_condition);
			$this->db->where('client_id',$this->session->userdata('client_id'));
		    $this->db->select('staff_code,date_of_joining,first_name,last_name,designation_name,mobile_no,email,address_line1');
			$this->db->from("tbl_staff_info");
			$this->db->order_by("staff_id", "desc");
			
		}
			else {
		     $this->db->where('client_id',$this->session->userdata('client_id'));
		     $this->db->select('staff_code,date_of_joining,first_name,last_name,designation_name,mobile_no,email,address_line1');
			 $this->db->from("tbl_staff_info");
			 $this->db->order_by("staff_id", "desc");
			}
		
		
		$query=$this->db->get();
		$this->export->to_excel($query, 'staff_report');
		} 
	public function export(){
		$this->load->library('export');
		
		$from=$this->uri->segment(4);
		$to=$this->uri->segment(5);
		$Therapist=$this->uri->segment(6);
	    
		$this->db->where('iv.client_id',$this->session->userdata('client_id'));
		$this->db->select('iv.treatment_date,ts.first_name,ts.last_name,tp.first_name as fname,tp.last_name as lname,iv.payment_mode,it.item_amount')->from('tbl_invoice_header iv')->where('iv.client_id',$this->session->userdata('client_id'));
		$this->db->join('tbl_invoice_detail it','iv.bill_id = it.bill_id');
		$this->db->join('tbl_staff_info ts','it.staff_id = ts.staff_id');
		$this->db->join('tbl_patient_info tp','iv.patient_id = tp.patient_id');
		$this->db->where('iv.treatment_date >= ',date('Y-m-d',strtotime($from)));
		$this->db->where('iv.treatment_date <= ',date('Y-m-d',strtotime($to)));
		$this->db->where('it.staff_id',$Therapist);
		$this->db->order_by("iv.treatment_date", "asc");
		$sql = $this->db->get();
		$this->export->to_excel($sql, 'staff_productivity_list');
	}
	public function staff_revenue() { 
		$data['page_name'] = 'dashboard';
		$search = $this->uri->segment(4);
		if($search == 'search'){
		   $data['result'] = $this->registration_model->staff_revenue();
		   $data['result1'] = $this->registration_model->treatment_amt();
		} else {
			$data['result'] ='';
			 $data['result1'] = '';
		}
		$this->load->view('client/staff_revenue',$data);
	}
	public function treatment_revenue() {
		$data['page_name'] = 'staff';
		$search = $this->uri->segment(4);
		if($search == 'search'){
		   $data['result'] = $this->registration_model->treatment_revenue();
		   $data['result1'] = $this->registration_model->treatment_amt();
		} else {
			$data['result'] ='';
			 $data['result1'] = '';
		}
		$this->load->view('client/treatment_revenue',$data);
	}
	public function pdt_revenue() {
		$data['page_name'] = 'staff';
		$search = $this->uri->segment(4);
		if($search == 'search'){
		   $data['result'] = $this->registration_model->product_revenue();
		   $data['result1'] = $this->registration_model->treatment_amt();
		} else {
			$data['result'] ='';
			 $data['result1'] = '';
		}
		$this->load->view('client/product_revenue',$data);
	}
	public function edit_time(){
		$data['page_name'] = 'staff';
		$staff_id = $this->uri->segment(4);
		$this->load->model('registration_model');
		$data['sch_settings_inf']= $this->registration_model->get_time($staff_id);
		$this->load->view('client/time_edit',$data); 
	}
	public function export_staffpro(){
		$this->load->library('export');
		$from=$this->uri->segment(5);
		$m = explode('-',$from);
		$to=$this->uri->segment(6);
		$Therapist=$this->uri->segment(7);
		if($m[2] == '2019' && $m[1] <= 5){
			$this->db->select('it.treatment_date,ts.first_name as StaffName,tp.first_name,iv.payment_mode,it.item_amount,iv.net_amt,iv.paid_amt')->from('tbl_invoice_header iv')->where('iv.client_id',$this->session->userdata('client_id'));
			$this->db->join('tbl_invoice_detail it','iv.bill_id = it.bill_id');
			$this->db->join('tbl_staff_info ts','ts.staff_id = it.staff_id');
			$this->db->join('tbl_patient_info tp','tp.patient_id = iv.patient_id');
			$this->db->where('it.treatment_date >= ',date('Y-m-d',strtotime($from)));
			$this->db->where('it.treatment_date <= ',date('Y-m-d',strtotime($to)));
			if($Therapist != 'null'){
			   $this->db->where('it.staff_id',$Therapist);
			}
			$this->db->group_by('iv.bill_id');
			$this->db->order_by('it.treatment_date','ASC');  
			$sql=$this->db->get();
		} else {
			$this->db->select('it.treatment_date,ts.first_name as StaffName,tp.first_name,iv.payment_mode,it.item_amount,iv.net_amt,iv.paid_amt')->from('tbl_invoice_header iv')->where('iv.client_id',$this->session->userdata('client_id'));
			$this->db->join('tbl_invoice_detail it','iv.bill_id = it.bill_id');
			$this->db->join('tbl_staff_info ts','ts.staff_id = it.staff_id');
			$this->db->join('tbl_patient_info tp','tp.patient_id = iv.patient_id');
			$this->db->where('iv.treatment_date >= ',date('Y-m-d',strtotime($from)));
			$this->db->where('iv.treatment_date <= ',date('Y-m-d',strtotime($to)));
			if($Therapist != 'null'){
			   $this->db->where('it.staff_id',$Therapist);
			}
			$this->db->group_by('iv.bill_id');
			$this->db->order_by('iv.treatment_date','ASC'); 
			$sql=$this->db->get();
		}
		$this->export->to_excel($sql, 'staff_productivity_list');
	}
	public function export_staffpro_treatment(){
		$this->load->library('export');
		$item_id = $this->uri->segment(7);
		$this->db->distinct();
		$this->db->where('ih.client_id',$this->session->userdata('client_id'));
		$this->db->select('ih.bill_no,ih.bill_id,ih.treatment_date,ih.patient_id,pi.patient_code,pi.first_name,pi.last_name,ih.bill_status,idtl.item_amount,ih.payment_mode,it.item_name');
		$this->db->from("tbl_invoice_header ih");
		$this->db->join("tbl_patient_info pi", "ih.patient_id=pi.patient_id");
		$this->db->join("tbl_invoice_detail idtl", "idtl.bill_id=ih.bill_id");
		$this->db->join("tbl_item it", "it.item_id=idtl.item_id");
		$this->db->where('ih.client_id',$this->session->userdata('client_id'));
		$this->db->where('ih.treatment_date >=',date('Y-m-d',strtotime($this->uri->segment(5))));
		$this->db->where('ih.treatment_date <=',date('Y-m-d',strtotime($this->uri->segment(6))));
		$this->db->where('ih.staff_id',$item_id);
		$this->db->order_by('idtl.bill_id', 'asc');
		$sql=$this->db->get();
		$this->export->to_excel($sql, 'staff_productivity_list');
	}
}