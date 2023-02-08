<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advance extends CI_Controller {
	
	public function __construct() {
		header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
		parent::__construct();
		$this->app_access->client();
		$this->load->model(array('advance_model','common_model','registration_model'));
	}
	 public function _remap($method, $params = array())
			{
			if($this->session->userdata('duration') == 0 ||  $this->session->userdata('plan') < 2 ){
				// get controller name
				$controller = mb_strtolower(get_class($this));
				  
				if ($controller = mb_strtolower($this->uri->segment(1))) {
					// if requested controller and this controller have the same name
					// show 404 error
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
					// if method exists
					// call method and pass any parameters we recieved onto it.
					return call_user_func_array(array($this, $method), $params);
				} else {
					// method doesn't exist, show error
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
	public function add() {
		$data['page_name'] = 'advance';
		// load default view
		$data['patient_name']=$this->common_model->getPatientname();	
        $data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));		
		$this->load->view('client/advance_add',$data);
	}
	
	public function addAdvance(){
		$data['page_name'] = 'invoice';
		$advance_id=$this->input->post('advance_id');
		
		
		if($advance_id==''){
				if($query = $this->advance_model->addAdvance())
				{
					//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Advance has been added successfully.';
				}
				}else{
					if($query = $this->advance_model->advanceEdit($advance_id))
					{
						//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
						$response['status'] = 'success';
						$response['message'] = 'Advance has been updated successfully.';
					}
				}
			} 
		
	public function view1() {
		
		// load default view
		$data['page_name'] = 'invoice';
		/*$data['back'] = base64_encode(end(explode("/index.php/",$_SERVER['PHP_SELF'])));*/
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 10;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
		
		//Count
		$where_condition = ($where_condition != '') ? $where_condition : '';
		$this->db->select('count(*) as totalrows')->from('tbl_patient_advance pa')->where('pa.client_id = "'.$this->session->userdata('client_id').'"');
		$this->db->join("tbl_patient_info pi", "pa.patient_id=pi.patient_id");
		if($where_condition!='') $this->db->where($where_condition);
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->select('pa.client_id,pa.advance_id,pa.patient_id,pi.patient_code,pi.first_name,pi.last_name,pa.advance_date,pa.advance_amount');
		$this->db->from("tbl_patient_advance pa");
		$this->db->join("tbl_patient_info pi", "pa.patient_id=pi.patient_id");
		$this->db->where('pa.client_id',$this->session->userdata('client_id'));
		//do where
		if($where_condition!='') $this->db->where($where_condition);
		//do orderby
		$this->db->order_by('pa.advance_id', 'desc');
		
		//do page
		$do_page = array_search("page",$segment_array);
		if ($do_page !== FALSE)
		{
			$current_page_segment = $do_page+1;
			$current_page = (int) $this->uri->segment($current_page_segment,0);
			$this->db->limit($config['per_page'], $current_page);
			if($current_page) array_pop($segment_array);
		} 
		else 
		{
			$current_page_segment = 0;
			$this->db->limit($config['per_page']);
			array_push($segment_array, 'page');
		}
		// data subset
		$query = $this->db->get();
		$data['advance'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		
		//Pagination
		$config['full_tag_open'] = '<div class="pagination alternate"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['first_link'] = '&lt;&lt; First';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$config['last_link'] = 'Last &gt;&gt;';
		
		$config['base_url'] = site_url(join("/",$segment_array));
		$config['uri_segment'] = $current_page_segment;
		$this->pagination->initialize($config);
		$data["pagination"] = $this->pagination->create_links();	
		$data['current_page_segment'] = $current_page_segment;
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$this->load->view('client/advance_view1',$data);
	}
	
	public function view(){
		$data['page_name'] = 'advance';
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		$config['per_page'] =10;
		$current_page ='';
		$this->db->select('*')->from('tbl_patient_advance')->where('client_id',$this->session->userdata('client_id'));
		$this->db->distinct();
		$query = $this->db->get();
		$config['total_rows'] = $query->num_rows();
		
		$search=str_replace('%20',' ',$this->uri->segment(4));
		$search1=str_replace('%20',' ',$this->uri->segment(5));
		$search2=str_replace('%20',' ',$this->uri->segment(6));
		if($search == 'date'){
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment(5))));
		 	$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment(6))));
			$where_condition = "(advance_date >= '".$from."' AND advance_date <='".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
			$this->db->where($where_condition);
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			$this->db->select('pi.patient_id,pi.patient_code,pv.bill_no,pi.first_name,pi.last_name,pv.advance_amount,pv.advance_date,pv.advance_id');
		    $this->db->from("tbl_patient_info pi");
		    $this->db->join("tbl_patient_advance pv", "pi.patient_id=pv.patient_id");
		    }
		else if($search1 == 'PatientName'){
			$this->db->where('pi.first_name',$search2);
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			$this->db->select('pi.patient_id,pi.patient_code,pv.bill_no,pi.first_name,pi.last_name,pv.advance_amount,pv.advance_date,pv.advance_id');
			$this->db->from("tbl_patient_info pi");
			$this->db->join("tbl_patient_advance pv", "pi.patient_id=pv.patient_id");
			
		}
		else if($search1 == 'MobileNo'){
			$this->db->where('pi.mobile_no',$search2);
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			$this->db->select('pi.patient_id,pi.patient_code,pv.bill_no,pi.first_name,pi.last_name,pi.mobile_no,pv.advance_amount,pv.advance_date,pv.advance_id');
			$this->db->from("tbl_patient_info pi");
			$this->db->join("tbl_patient_advance pv", "pi.patient_id=pv.patient_id");
			
		}
		else if($search1 == 'ReferedBy'){
			$this->db->where('pi.referal_name',$search2);
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			$this->db->select('pi.patient_id,pi.patient_code,pv.bill_no,pi.referal_name,pi.first_name,pi.last_name,pi.mobile_no,pv.advance_amount,pv.advance_date,pv.advance_id');
			$this->db->from("tbl_patient_info pi");
			$this->db->join("tbl_patient_advance pv", "pi.patient_id=pv.patient_id");
			}
		else if($search1 == 'PatientId'){
			$this->db->where('pi.patient_id',$search2);
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			$this->db->select('pi.patient_id,pi.patient_code,pv.bill_no,pi.referal_name,pi.first_name,pi.last_name,pi.mobile_no,pv.advance_amount,pv.advance_date,pv.advance_id');
			$this->db->from("tbl_patient_info pi");
			$this->db->join("tbl_patient_advance pv", "pi.patient_id=pv.patient_id");
			}
			else if($search1 == 'ProvisionalDiagnosis') {
			$this->db->where('pd.prov_diagnosis',$search2);
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			$this->db->select('pi.patient_id,pd.prov_diagnosis,pv.bill_no,pi.patient_code,pi.referal_name,pi.first_name,pi.last_name,pi.mobile_no,pv.advance_amount,pv.advance_date,pv.advance_id');
			$this->db->from("tbl_patient_info pi");
			$this->db->join("tbl_patient_advance pv", "pi.patient_id=pv.patient_id");
			$this->db->join("tbl_patient_prov_diagnosis pd", "pi.patient_id=pd.patient_id");
		
	}
		else if($search1 == 'PaymentMode') {
			$this->db->where('pv.payment_mode',$search2);
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			$this->db->select('pi.patient_id,pv.bill_no,pi.patient_code,pi.referal_name,pi.first_name,pi.last_name,pi.mobile_no,pv.advance_amount,pv.advance_date,pv.advance_id,pv.payment_mode');
			$this->db->from("tbl_patient_info pi");
			$this->db->join("tbl_patient_advance pv", "pi.patient_id=pv.patient_id");
			
	}
		else {
		$this->db->select('pi.patient_id,pi.patient_code,pv.bill_no,pi.first_name,pi.last_name,pi.referal_name,pi.mobile_no,pv.advance_amount,pv.advance_date,pv.advance_id');
		$this->db->from("tbl_patient_info pi");
		$this->db->join("tbl_patient_advance pv", "pi.patient_id=pv.patient_id");
		$this->db->where('pv.client_id',$this->session->userdata('client_id'));
		
		}  
		
		$do_page = array_search("page",$segment_array);
		if ($do_page !== FALSE)
		{
			$current_page_segment = $do_page+1;
			$current_page = (int) $this->uri->segment($current_page_segment,0);
			$this->db->limit($config['per_page'], $current_page);
			if($current_page) array_pop($segment_array);
		} 
		else 
		{
			$current_page_segment = 0;
			$this->db->limit($config['per_page']);
			array_push($segment_array, 'page');
		}
			
		$this->db->order_by('pv.advance_id','desc');
		$query=$this->db->get();
		$config['full_tag_open'] = '<div class="pagination alternate"><ul class="pagination">';
		$config['full_tag_close'] = '</ul></div>';
		$config['cur_tag_open'] = '<li class="page-item active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['first_link'] = '&lt;&lt; First';
		$config['next_link'] = 'Next &gt;';
		$config['prev_link'] = '&lt Previous';
		$config['last_link'] = 'Last &gt;&gt;';
		
		$config['base_url'] = site_url(join("/",$segment_array));
		$config['uri_segment'] = $current_page_segment;
		$this->pagination->initialize($config);
		$data["pagination"] = $this->pagination->create_links();
		$str_links = $this->pagination->create_links();	
		$data["links"] = explode('<li>',$str_links);
		$data['current_page_segment'] = $current_page_segment;
		$data["pagination"] = $this->pagination->create_links();
		$data['advance']= ($query->num_rows() > 0) ? $query->result_array() : false;
	    $data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$data['patient_name']=$this->common_model->getPatientname();
		$data['mobile']=$this->common_model->get_mobile();
		$data['patient_code']=$this->common_model->getpatientid();
		$data['name']=$this->common_model->getreferal_name();
	    $data['provDiagList']=$this->common_model->getProvdiagList();
		$this->load->view('client/advance_view',$data); 
	} 
	
	public function delete(){
		$data['page_name'] = 'invoice';
		$advance_id = $this->uri->segment(4);
		$result = $this->advance_model->deleteAdvance($_POST['p_id']);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Invoice deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Invoice deleted successfully.';
		}
		echo json_encode($response);
		//$this->session->set_flashdata('message', 'Advance has been deleted successfully.');
		
	} 
	
	public function edit($advance_id) {
		$data['page_name'] = 'invoice';
		// load default view
		$data['advance']=$this->advance_model->editAdvance($advance_id);
		$data['patient_name']=$this->common_model->getPatientname();
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$this->load->view('client/advance_edit',$data);
	}
	public function view_advance($advance_id) {
		$data['page_name'] = 'invoice';
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$data['advance'] = $this->advance_model->Advancepri($advance_id);
	/* print_r($data['advance_payment']);
		exit; */
		$this->load->view('client/view_advance',$data);	
	}
	public function getAdvanceBalance($patient_id){
		$data['page_name'] = 'invoice';
		$response = array();
		$response['advanceAmount'] = $this->advance_model->advanceBalance($patient_id);
		echo json_encode($response);
	}
	
	public function export_advance(){
		$this->load->library('export');
		$data['page_name'] = 'invoice';
		$segment_array = $this->uri->segment_array();
		
		$search=str_replace('%20',' ',$this->uri->segment(4));
		$search1=str_replace('%20',' ',$this->uri->segment(5));
		$search2=str_replace('%20',' ',$this->uri->segment(6));
		if($search == 'date'){
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment(5))));
		 	$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment(6))));
			$where_condition = "(advance_date >= '".$from."' AND advance_date <='".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
			$this->db->where($where_condition);
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			$this->db->select('pv.advance_date,pv.bill_no,pi.patient_code,pi.first_name,pi.last_name,pv.advance_amount');
		    $this->db->from("tbl_patient_info pi");
		    $this->db->join("tbl_patient_advance pv", "pi.patient_id=pv.patient_id");
		    }
		else if($search1 == 'PatientName'){
			$this->db->where('pi.first_name',$search2);
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			$this->db->select('pv.advance_date,pv.bill_no,pi.patient_code,pi.first_name,pi.last_name,pv.advance_amount');
			$this->db->from("tbl_patient_info pi");
			$this->db->join("tbl_patient_advance pv", "pi.patient_id=pv.patient_id");
			
		}
		else if($search1 == 'MobileNo'){
			$this->db->where('pi.mobile_no',$search2);
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			$this->db->select('pi.patient_code,pi.first_name,pi.last_name,pi.mobile_no,pv.advance_amount,pv.advance_date,pv.advance_id');
			$this->db->from("tbl_patient_info pi");
			$this->db->join("tbl_patient_advance pv", "pi.patient_id=pv.patient_id");
			
		}
		else if($search1 == 'ReferedBy'){
			$this->db->where('pi.referal_name',$search2);
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			$this->db->select('pi.patient_code,pi.referal_name,pi.first_name,pi.last_name,pi.mobile_no,pv.advance_amount,pv.advance_date,pv.advance_id');
			$this->db->from("tbl_patient_info pi");
			$this->db->join("tbl_patient_advance pv", "pi.patient_id=pv.patient_id");
			}
		else if($search1 == 'PatientId'){
			$this->db->where('pi.patient_id',$search2);
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			$this->db->select('pi.patient_code,pi.referal_name,pi.first_name,pi.last_name,pi.mobile_no,pv.advance_amount,pv.advance_date,pv.advance_id');
			$this->db->from("tbl_patient_info pi");
			$this->db->join("tbl_patient_advance pv", "pi.patient_id=pv.patient_id");
			}
			else if($search1 == 'ProvisionalDiagnosis') {
			$this->db->where('pd.prov_diagnosis',$search2);
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			$this->db->select('pd.prov_diagnosis,pi.patient_code,pi.referal_name,pi.first_name,pi.last_name,pi.mobile_no,pv.advance_amount,pv.advance_date,pv.advance_id');
			$this->db->from("tbl_patient_info pi");
			$this->db->join("tbl_patient_advance pv", "pi.patient_id=pv.patient_id");
			$this->db->join("tbl_patient_prov_diagnosis pd", "pi.patient_id=pd.patient_id");
		
	}
		else {
		$this->db->select('pv.advance_date,pv.bill_no,pi.patient_code,pi.first_name,pi.last_name,pv.advance_amount');
		$this->db->from("tbl_patient_info pi");
		$this->db->join("tbl_patient_advance pv", "pi.patient_id=pv.patient_id");
		$this->db->where('pv.client_id',$this->session->userdata('client_id'));
		
		}
		
		
		$this->db->order_by('pv.advance_id','desc');
		$query=$this->db->get();
		$this->export->to_excel($query, 'advance_report');
	}
		
	
}