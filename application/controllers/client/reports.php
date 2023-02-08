<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends CI_Controller {
	
	public function __construct() {
		header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
		parent::__construct();
		$this->app_access->client();
		if($this->session->userdata('user_login')) $this->app_access->user_privileges('Invoice');
		$this->load->model(array('schedule_model','common_model','invoice_model','settings_model','registration_model','patient_model','advance_model'));
	}
	
	 public function _remap($method, $params = array())
			{
			if($this->session->userdata('duration') == 0 ||  $this->session->userdata('plan') < 3 ){
				// get controller name
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
	public function export_data() {
	 $data['page_name'] ='export';
	 $this->load->view('client/export_data',$data);
	}	
	public function balance()
	{
		$data['page_name'] = 'transaction';
		$segment_array = $this->uri->segment_array();
		$do_date = array_search("date",$segment_array);
		if ($do_date !== FALSE)
		{
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+1))));
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+2))));
		} else {
			$to = date('Y-m-d');
			$from = date('Y-m-d', strtotime("-30 days"));
		}
		$this->db->select('sum(ih.net_amt) as income');  
		$this->db->from("tbl_invoice_header ih");
		$this->db->join("tbl_patient_info pi", "ih.patient_id=pi.patient_id");
		$this->db->where('ih.client_id',$this->session->userdata('client_id'));
		if($from == $to){
			$this->db->where('ih.treatment_date',$from);
		
		} else {
			$this->db->where('ih.treatment_date >=',$from);
		    $this->db->where('ih.treatment_date <=',$to);
		}
		$query = $this->db->get();
		$qrow = $query->row();
		$data['balance_income'] = ($query->num_rows() > 0) ? $qrow->income : false;
		
		$this->db->select('sum(ih.paid_amt) as income');  
		$this->db->from("tbl_invoice_header ih");
		$this->db->join("tbl_patient_info pi", "ih.patient_id=pi.patient_id");
		$this->db->where('ih.client_id',$this->session->userdata('client_id'));
		if($from == $to){
			$this->db->where('ih.treatment_date',$from);
		} else {
			$this->db->where('ih.treatment_date >=',$from);
		    $this->db->where('ih.treatment_date <=',$to);
		}
		$query = $this->db->get();
		$qrow = $query->row();
		$data['balance_income_pay'] = ($query->num_rows() > 0) ? $qrow->income : false;
		
		$this->db->select('sum(item_amount) as expanse');
		$this->db->from("tbl_expanse");
		if($from == $to){
			$this->db->where('bill_date',$from);
		} else {
			$this->db->where('bill_date >=',$from);
		    $this->db->where('bill_date <=',$to);
		}
			$this->db->where('client_id',$this->session->userdata('client_id'));
			$query1 = $this->db->get();
			$qrow1 = $query1->row();
			$data['balance_expanse'] = ($query1->num_rows() > 0) ? $qrow1->expanse : false;
			$data['balance'] = true;
		
		$this->load->view('client/balance_view', $data);
	}
	
	public function expansereport(){
		$data['page_name'] = 'transaction';
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 10;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
		
		// search fields
		$info_search = array(
			'PatientName' => 'first_name',
			'PaymentMode' => 'payment_mode'
		);
		
		//do searchby
		$do_searchby = array_search("searchby",$segment_array);
		if($do_searchby != false) {
			$searchType = $this->uri->segment($do_searchby+1);
			$searchby = $this->uri->segment($do_searchby+2);
			$keyword = urldecode($this->uri->segment($do_searchby+3));
			if($searchType == 'info') {
				$keyword = str_replace('_', '/', $keyword);
				$where_condition = "(pi.".$info_search[$searchby]." LIKE '%".$keyword."%')";
				$data['searchBy'] = $searchby;
				$data['keyword'] = $keyword;
			}else if($searchType == 'mode') {
				$keyword = str_replace('_', '/', $keyword);
				$where_condition = "(ih.".$info_search[$searchby]." LIKE '%".$keyword."%')";
				$data['searchBy'] = $searchby;
				$data['keyword'] = $keyword;
			}
		}
		 
		// do date filter
		$do_date = array_search("date",$segment_array);
		if ($do_date !== FALSE)
		{
			$data['dateFilter'] = true;
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+1))));
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+2))));
			$where_condition = "(bill_date >= '".$from."' AND bill_date <= '".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
		} 
		
		//Count
		$where_condition = ($where_condition != '') ? $where_condition : '';
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('count(*) as totalrows')->from('tbl_expanse')->where('client_id = "'.$this->session->userdata('client_id').'"');
		if($where_condition!='') $this->db->where($where_condition);
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('bill_id,client_id,bill_no,total_amt,bill_date,ventor,due_date');
		$this->db->from("tbl_expanse");
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->group_by('bill_no'); 
		$this->db->order_by('bill_date','desc');
		//do where
		if($where_condition!='') $this->db->where($where_condition);
				
				
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
		$data['expanse'] = ($query->num_rows() > 0) ? $query->result_array() : false;
				
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
		$str_links = $this->pagination->create_links();	
		$data["links"] = explode('&nbsp;',$str_links );
		
		$data['current_page_segment'] = $current_page_segment;
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$data['patient_name']=$this->common_model->getPatientname();
		$this->load->view('client/expense_report',$data);
	}

	public function index() {
	}
	
	public function report_session() {
		$data['page_name'] = 'reports';
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 10;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
		
		$do_searchby = array_search("PatientName",$segment_array);
		if($do_searchby != false) {
			   $searchType = $this->uri->segment($do_searchby+1);
			   $where_condition = "(sd.patient_id LIKE '%".$searchType."%')";
		}
		
		// do date filter
		$do_date = array_search("date",$segment_array);
		if ($do_date !== FALSE)
		{
			$from = date('Y-m-d',  strtotime($this->uri->segment(5)));
			$to = date('Y-m-d',  strtotime($this->uri->segment(6)));
			$where_condition = "(sn_date >= '".$from."' AND sn_date <= '".$to."')";
		} 
		
		//Count
		$where_condition = ($where_condition != '') ? $where_condition : '';
		$this->db->distinct();
		$this->db->select('count(*) as totalrows')->from('tbl_session_det sd');
		$this->db->join("tbl_patient_info pi", "sd.patient_id=pi.patient_id");
		$this->db->where('sd.client_id',$this->session->userdata('client_id'));
		if($where_condition!='') {
			$this->db->where($where_condition);
		}
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->distinct();
		$this->db->select('*');
		$this->db->from("tbl_session_det sd");
		$this->db->join("tbl_patient_info pi", "sd.patient_id=pi.patient_id");
		$this->db->where('sd.client_id',$this->session->userdata('client_id'));
		
		//do where
		if($where_condition!='') {
			$this->db->where($where_condition);
		}
		$this->db->order_by('sd.sn_date','desc');
		
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
		$data['session_report'] = ($query->num_rows() > 0) ? $query->result_array() : false;
	
		
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
		$str_links = $this->pagination->create_links();	
		$data["links"] = explode('&nbsp;',$str_links );
		$data['current_page_segment'] = $current_page_segment;
		$data['treatment_tech']=$this->common_model->getsessiondet();
		$data['patient_name']=$this->common_model->getPatientname();
		$data['doctor_name']=$this->common_model->getDoctorname();
		$data['treatment']=$this->common_model->getItemNames();
		$this->load->view('client/report1',$data);
	}  
	public function export_incomestmt(){
		$this->load->library('export');
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form')); 
		
		if($this->uri->segment(4) == 'date'){
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
		$sql = $this->db->get();
		$this->export->to_excel($sql, 'income_statement');
			
		
	}
	
	public function export_treatmentwise(){
		$this->load->library('export');
		$item_id = $this->uri->segment(7);  
		$this->db->distinct();
		$this->db->where('ih.client_id',$this->session->userdata('client_id'));
		$this->db->select('pi.first_name,pi.last_name,ih.treatment_date,ih.bill_no,it.item_name,ih.payment_mode,idtl.item_amount');
		$this->db->from("tbl_invoice_header ih");
		$this->db->join("tbl_patient_info pi", "ih.patient_id=pi.patient_id");
		$this->db->join("tbl_invoice_detail idtl", "idtl.bill_id=ih.bill_id");
		$this->db->join("tbl_item it", "it.item_id=idtl.item_id");
		$this->db->where('ih.client_id',$this->session->userdata('client_id'));
		$this->db->where('ih.treatment_date >=',date('Y-m-d',strtotime($this->uri->segment(5))));
		$this->db->where('ih.treatment_date <=',date('Y-m-d',strtotime($this->uri->segment(6))));
		$this->db->where('idtl.item_id',$item_id);
		$this->db->order_by('idtl.bill_id', 'asc');
		$sql = $this->db->get();
		$this->export->to_excel($sql, 'treatmentwise_income');
	}
	public function income_treatmentwise(){
		$data['page_name'] = 'transaction';
		if($this->uri->segment(7) != 'null' && $this->uri->segment(7) != ''){
			$item_id=$this->uri->segment(7);
			$this->db->where('item_id',$item_id);
			$this->db->select('item_name')->from('tbl_item');
			$q = $this->db->get();
			$data['item'] = $q->row()->item_name;
			$data['item_id'] = $item_id;
			$data['itemList']=$this->common_model->rsgetItemNames($item_id);
		} else {
			$data['item'] = '';
			$data['item_id'] = '';
			$data['itemList']=$this->common_model->getItemNames();
		
		}
		$data['patient_name']=$this->common_model->getPatientname();
		$data['invoices']=$this->common_model->search_incometreat();
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$this->load->view('client/treatment_income_view',$data);
	}
	public function income_statement() {
		$data['page_name'] = 'transaction';
		$data['invoices'] = $this->common_model->search_incomestat();
		$data['advances'] = $this->common_model->search_incomeadvance();
		$data['patient_name']=$this->common_model->getPatientname();
		$data['consultants'] = $this->common_model->getDoctorname();
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$data['provDiagList']=$this->common_model->getProvdiagList();
		$this->load->view('client/income_statement_view', $data); 
	}
	
	public function add_session()
	{
		$data['page_name'] = 'reports';
		$patient_id = $this->input->post('patient_id');
		$sn_id = $this->input->post('sn_id');
                //changes
               
                  $patient_info=$this->send_review($patient_id);
		
		$clinic_name=$this->session->userdata('clinic_name');
                $review_link=$this->session->userdata('review');	
		
		if($patient_info['review']==0 && $patient_info['email']!= '' && $review_link!= '')
		{
		$this->mail_review($patient_info,$clinic_name,$review_link);
		
		$this->db->where('patient_id',$patient_id);
		$rev=1;
	    $this->db->update('tbl_patient_info', array('google_review' => $rev));
		
		}


               

		$p_name = $this->patient_model->sessPatient($patient_id);
		$response = array();
		if($sn_id == '') {
			if($query = $this->patient_model->addSession($patient_id,$p_name))
				{
					$response['status']= 'success';
					$response['message'] = 'Session has been add successfully.';
                                        
                                           $response['name']=$patient_info['name'];
					   $response['mobile']=$patient_info['mobile'];
				           $response['review']=$patient_info['review'];
					   $response['review_link']=$review_link;
					   $response['patient_id']=$patient_id;
                                        
                                       
				}
		} else {
			$result = $this->patient_model->edit_report();
			if($result != '')
		{	
			$response['listData'] = $result;
			$response['status'] = 'Success';
			$response['message'] = 'Notes Has Been Added successfully.';
		}
		else{
			$response['status'] = 'failure';
			$response['message'] = 'Notes Has Been Added successfully.';
		}
		}
		echo json_encode($response);
	}
  
        
             
          public function mail_review($patient_info,$clinic_name,$review_link)
	{
		
		if($patient_info['review']==0 && $patient_info['email']!= '' && $review_link!= '')
		{
			$patient = array(
					
					'ClinicName' => ucfirst($clinic_name),
					'PersonName' => ucfirst($patient_info['name']),
					'ReviewLink' => ucfirst($review_link)
		   );
		   
		        $patientMessage = $this->mail_model->ReviewTemplate($patient);
				
				$patientMailConfig = array('clinic' => $clinic_name, 'to' => $patient_info['email'], 'subject' => 'Rate Our Service at Google Reviews', 'message' => $patientMessage);
				$this->mail_model->sendEmail($patientMailConfig);
			
		}
	}
	
	public function send_review($patient_id)
	{
		$where = array('patient_id' => $patient_id);
		$this->db->select('patient_id,first_name, last_name,patient_code,mobile_no,email,google_review')->from('tbl_patient_info')->where($where);
		$query=$this->db->get();
		$name=($query->row()->first_name).' '.($query->row()->last_name);
		$code=$query->row()->patient_code;
		$review = $query->row()->google_review;
		$mobile=$query->row()->mobile_no;
		$email=$query->row()->email;
		return array('mobile'=> $mobile,'name'=> $name,'email'=> $email,'review' => $review);
		
	}

        



	public function edit_report() {
		$data['page_name'] = 'reports';
		$p_id = $this->uri->segment('4');
		$sn_id = $this->uri->segment('5');
		$data['treatment_tech']=$this->common_model->getsessiondet();
		$data['items']=$this->common_model->getItemNames();
		$data['sess_no']= $this->patient_model->viewSession();
		$data['report_det']=$this->common_model->edit_report_details($sn_id);
		$this->load->view('client/edit_report',$data);
		
	}
	public function delete(){
		$result = $this->common_model->delete_session($_POST['s_id']);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		}
		echo json_encode($response);
	}
	public function patient_summary() {
		$data['page_name'] = 'case';
		$data['provDiagList']=$this->common_model->getProvdiagList();
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
		
		// search fields
		$info_search = array(
			'PatientName' => 'first_name',
			'MobileNo' => 'mobile_no',
			'PatientId' => 'patient_id',
			'ReferedBy' => 'referal_name',
			'ProvisionalDiagnosis' => 'prov_diagnosis',
		);
		
		//do searchby
		$do_searchby = array_search("searchby",$segment_array);
		if($do_searchby != false) {
			$searchType = $this->uri->segment($do_searchby+1);
			$searchby = $this->uri->segment($do_searchby+2);
			$keyword = urldecode($this->uri->segment($do_searchby+3));
			if($searchType == 'info') {
				$keyword = str_replace('_', '/', $keyword);
				$where_condition = "(pi.".$info_search[$searchby]." LIKE '%".$keyword."%')";
				$data['searchBy'] = $searchby;
				$data['keyword'] = $keyword;
			} else if($searchType == 'diagnosis') {
				$keyword = str_replace('_', '/', $keyword);
				$where_condition = "(pd.".$info_search[$searchby]." LIKE '%".$keyword."%')";
				$data['searchBy'] = $searchby;
				$data['keyword'] = $keyword;
			}
		}
		
		// do date filter
		$do_date = array_search("date",$segment_array);
		if ($do_date !== FALSE)
		{
			$data['dateFilter'] = true;
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+1))));
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+2))));
			$where_condition = "(pv.visit_date >= '".$from."' AND pv.visit_date <= '".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
		} 
		
		//Count
		$where_condition = ($where_condition != '') ? $where_condition : '';
		
		$this->db->distinct();
		$this->db->select('count(*) as totalrows')->from('tbl_patient_info pi');
		if($this->session->userdata('all_locations') == true)
		{
			$this->db->where_in('pi.client_id',$this->session->userdata('clientIds'));
		}else{
			$this->db->where('pi.client_id',$this->session->userdata('client_id'));
		}
		if($where_condition!='') {
			if ($do_date != FALSE){
				$this->db->join("tbl_patient_visits pv", "pi.patient_id=pv.patient_id");
			}
			if($do_searchby != false) {
				if($searchType == 'diagnosis') {
					$this->db->join("tbl_patient_prov_diagnosis pd", "pd.patient_id=pi.patient_id");
				}
			}
			$this->db->where($where_condition);
		}
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->distinct();
		$this->db->select('pi.patient_id,pi.patient_code,pi.appoint_date,pi.first_name,pi.last_name,pi.mobile_no,pi.email,pi.address_line1,pi.photo,pi.gender');
		$this->db->from("tbl_patient_info pi");
		if($this->session->userdata('all_locations') == true)
		{
			$this->db->where_in('pi.client_id',$this->session->userdata('clientIds'));
		}else{
			$this->db->where('pi.client_id',$this->session->userdata('client_id'));
		}
		//do where
		if($where_condition!=''){
			if ($do_date != FALSE){
				$this->db->join("tbl_patient_visits pv", "pi.patient_id=pv.patient_id");
			}
			if($do_searchby != false) {
				if($searchType == 'diagnosis') {
					$this->db->join("tbl_patient_prov_diagnosis pd", "pd.patient_id=pi.patient_id");
				}
			}
			$this->db->where($where_condition); 
		}
		//do orderby
		$this->db->order_by('pi.patient_id', 'desc');
		
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
		$data['patient_list'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		if($data['patient_list'] == false && (isset($data['searchBy']) || isset($data['dateFilter']))) {
			$data['showTable'] = true;
		} else if($data['patient_list'] != false) {
			$data['showTable'] = true;
		} else { 
			$data['showTable'] = false;
		}
		//$data['referalTypes'] = $this->referal_model->getTypes();
		
		//Pagination
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
		$str_links = $this->pagination->create_links();	
		$data["links"] = explode('<li>',$str_links);
		$data['current_page_segment'] = $current_page_segment;
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$data['patient_name']=$this->common_model->getPatientname();
		$data['mobile']=$this->common_model->getmobileno();
		$data['patient_code']=$this->common_model->getpatientid();
		$data['name']=$this->common_model->getreferal_name();
		$this->load->view('client/patient_summary',$data);
	}
	public function patient_summary_report($patient_id,$from='',$to='')
	{  
		$data['page_name'] = 'reports';
		$client_id = $this->session->userdata('client_id');$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$data['patient'] = $this->patient_model->editPatientinfo($patient_id);
		$data['pain_list'] = $this->patient_model->patient_painchart($patient_id);
		$data['pain1'] = $this->patient_model->viewPain1($patient_id);
		$data['report'] = $this->settings_model->edit_report($client_id);
		$data['exercises'] = $this->patient_model->exercise_details($patient_id);
		$data['plan'] = $this->patient_model->plans($patient_id);
		$var = explode('-',$from);
		if($from == '' && $to == '' || $from == 'info' || sizeof($var) <= 1){
		    $data['bodychart']=$this->patient_model->viewbodychart($patient_id);
		    $data['pediatric']=$this->patient_model->viewPaediatric($patient_id);
		    $data['history'] = $this->patient_model->viewHistory($patient_id);
			$data['chief_comp'] = $this->patient_model->viewChiefcomp($patient_id);
			$data['pain'] = $this->patient_model->viewPain($patient_id);
			$data['examn'] = $this->patient_model->viewExamn($patient_id);
			$data['mexamn'] = $this->patient_model->viewMexamn($patient_id);
			$data['sexamn'] = $this->patient_model->viewSexamn($patient_id);
			$data['investigation'] = $this->patient_model->viewInvestigation($patient_id);
			$data['prov_diag'] = $this->patient_model->viewProvdiag($patient_id);
			$data['goal'] = $this->patient_model->viewGoals($patient_id);
			$data['caseNote'] = $this->patient_model->viewCaseNotes($patient_id);
			$data['progNote'] = $this->patient_model->viewProgNotes($patient_id);
			$data['remark'] = $this->patient_model->viewRemarks($patient_id);
			$data['treatment'] = $this->patient_model->viewTreatments($patient_id);
			$data['session_report']=$this->patient_model->report_model($patient_id);
			$data['thoraccic']=$this->patient_model->viewMexamnthoraccic($patient_id);
			$data['cervical']=$this->patient_model->viewMexamncervical($patient_id);
			$data['glascow']=$this->patient_model->glascow($patient_id);
			$data['tests']=$this->patient_model->testsinfo($patient_id);
			$data['chart']=$this->patient_model->viewBodychart($patient_id);
			$data['adlscore']=$this->patient_model->adlscore($patient_id);
			$data['gait']=$this->patient_model->gait($patient_id);
			$data['function']=$this->patient_model->functional($patient_id);
			$data['special']=$this->patient_model->special($patient_id);
			$data['neural']=$this->patient_model->neural($patient_id);
			$data['verbal']=$this->patient_model->verbal($patient_id);
			$data['masure']=$this->patient_model->measure($patient_id);
			$data['medic']=$this->patient_model->medical($patient_id);
			$data['lumber']=$this->patient_model->lumber($patient_id);
			$data['combine']=$this->patient_model->viewcombined($patient_id);
			$data['protocols']=$this->patient_model->treatment_protocol($patient_id);
			$data['plans'] = $this->patient_model->plans($patient_id);
			$data['ex_protocols'] = $this->patient_model->viewex_protocols($patient_id);
			
				
		}else{
			$from_date = date('Y-m-d',  strtotime(urldecode($from)));
			$to_date = date('Y-m-d',  strtotime(urldecode($to)));
			$data['bodychart']=$this->patient_model->viewbodychart($patient_id,$from_date,$to_date);
		    $data['pediatric']=$this->patient_model->viewPaediatric($patient_id,$from_date,$to_date);
		    $data['cervical']=$this->patient_model->viewMexamncervical($patient_id,$from_date,$to_date);
			$data['history'] = $this->patient_model->viewHistory($patient_id,$from_date,$to_date);
			$data['chief_comp'] = $this->patient_model->viewChiefcomp($patient_id,$from_date,$to_date);
			$data['pain'] = $this->patient_model->viewPain($patient_id,$from_date,$to_date);
			$data['examn'] = $this->patient_model->viewExamn($patient_id,$from_date,$to_date);
			$data['mexamn'] = $this->patient_model->viewMexamn($patient_id,$from_date,$to_date);
			$data['combine'] = $this->patient_model->viewcombined($patient_id,$from_date,$to_date);
			$data['adlscore']=$this->patient_model->adlscore($patient_id,$from_date,$to_date);
			$data['gait']=$this->patient_model->gait($patient_id,$from_date,$to_date);
			$data['ex_protocols'] = $this->patient_model->viewex_protocols($patient_id,$from_date,$to_date);
			$data['sexamn'] = $this->patient_model->viewSexamn($patient_id,$from_date,$to_date);
			$data['investigation'] = $this->patient_model->viewInvestigation($patient_id,$from_date,$to_date);
			$data['prov_diag'] = $this->patient_model->viewProvdiag($patient_id,$from_date,$to_date);
			$data['goal'] = $this->patient_model->viewGoals($patient_id,$from_date,$to_date);
			$data['caseNote'] = $this->patient_model->viewCaseNotes($patient_id,$from_date,$to_date);
			$data['progNote'] = $this->patient_model->viewProgNotes($patient_id,$from_date,$to_date);
			$data['remark'] = $this->patient_model->viewRemarks($patient_id,$from_date,$to_date);
			$data['treatment'] = $this->patient_model->viewTreatments($patient_id,$from_date,$to_date);
			$data['session_report']=$this->patient_model->report_model($patient_id,$from_date,$to_date);
			$data['thoraccic']=$this->patient_model->viewMexamnthoraccic($patient_id,$from_date,$to_date);
			$data['glascow']=$this->patient_model->glascow($patient_id,$from_date,$to_date);
			$data['tests']=$this->patient_model->testsinfo($patient_id,$from_date,$to_date);
			$data['function']=$this->patient_model->functional($patient_id,$from_date,$to_date);
			$data['special']=$this->patient_model->special($patient_id,$from_date,$to_date);
			$data['neural']=$this->patient_model->neural($patient_id,$from_date,$to_date);
			$data['masure']=$this->patient_model->measure($patient_id,$from_date,$to_date);
			$data['verbal']=$this->patient_model->verbal($patient_id,$from_date,$to_date);
			$data['medic']=$this->patient_model->medical($patient_id,$from_date,$to_date);
			$data['lumber']=$this->patient_model->lumber($patient_id,$from_date,$to_date);
			$data['protocols']=$this->patient_model->treatment_protocol($patient_id,$from_date,$to_date);
			$data['plans'] = $this->patient_model->plans($patient_id,$from_date,$to_date);
		}  
		$this->load->view('client/patient_summary1',$data);
	}
	public function export_advance(){
		 $this->load->library('export');
		//$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		 $this->load->helper(array('form'));
		$search=str_replace('%20',' ',$this->uri->segment(4));
		$search1=str_replace('%20',' ',$this->uri->segment(5));
		$search2=str_replace('%20',' ',$this->uri->segment(6));
		if($search == 'date'){
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment(5))));
		   	$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment(6))));
			$where_condition = "(advance_date >= '".$from."' AND advance_date <='".$to."')";
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
			$this->db->where($where_condition);
			}
		else if($search1 == 'PatientName'){
			$this->db->where('pi.first_name',$search2);
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			
		}
		else if($search1 == 'MobileNo'){
			$this->db->where('pi.mobile_no',$search2);
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			
		}
		else if($search1 == 'ReferedBy'){
			$this->db->where('pi.referal_name',$search2);
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			}
		else if($search1 == 'PatientId'){
			$this->db->where('pi.patient_id',$search2);
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
		}
		else if($search1 == 'ProvisionalDiagnosis'){
			$this->db->where('pd.prov_diagnosis',$search2);
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			$this->db->join("tbl_patient_prov_diagnosis pd", "pi.patient_id=pd.patient_id");
		
		} 
		else {
				$this->db->where('pv.client_id',$this->session->userdata('client_id'));
		
		}
		$this->db->where('pi.client_id',$this->session->userdata('client_id'));
		$this->db->select('pv.advance_date,pi.patient_code,pi.first_name,pi.last_name,pi.mobile_no,pv.advance_amount');
		$this->db->from("tbl_patient_info pi");
		$this->db->join("tbl_patient_advance pv", "pi.patient_id=pv.patient_id");
		$query = $this->db->get();
		$this->export->to_excel($query,'expense_advance');
	}
	public function advance() {
		$data['page_name'] = 'transaction';
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		$config['per_page'] =10;
		$current_page ='';
		$search=str_replace('%20',' ',$this->uri->segment(4));
		$search1=str_replace('%20',' ',$this->uri->segment(5));
		$search2=str_replace('%20',' ',$this->uri->segment(6));
		if($search == 'date'){
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment(5))));
		   	$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment(6))));
			$where_condition = "(advance_date >= '".$from."' AND advance_date <='".$to."')";
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
			$this->db->where($where_condition);
			}
		else if($search1 == 'PatientName'){
			$this->db->where('pi.first_name',$search2);
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			
		}
		else if($search1 == 'MobileNo'){
			$this->db->where('pi.mobile_no',$search2);
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			
		}
		else if($search1 == 'ReferedBy'){
			$this->db->where('pi.referal_name',$search2);
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			}
		else if($search1 == 'PatientId'){
			$this->db->where('pi.patient_id',$search2);
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
		}
		else if($search1 == 'ProvisionalDiagnosis'){
			$this->db->where('pd.prov_diagnosis',$search2);
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			$this->db->join("tbl_patient_prov_diagnosis pd", "pi.patient_id=pd.patient_id");
		
		} 
		else {
				$from = date('d-m-Y', strtotime('-30 days'));
				$to = date('d-m-Y');
				$this->db->where('pv.advance_date >= ',date('Y-m-d',strtotime($from)));
				$this->db->where('pv.advance_date <= ',date('Y-m-d',strtotime($to)));
				$this->db->where('pv.client_id',$this->session->userdata('client_id'));
		
		}
		$this->db->where('pi.client_id',$this->session->userdata('client_id'));
		$this->db->select('pi.patient_id,pi.mobile_no,pi.patient_code,pi.address_line1,pi.first_name,pi.last_name,pi.referal_name,pi.mobile_no,pv.advance_amount,pv.advance_date,pv.advance_id');
		$this->db->from("tbl_patient_info pi");
		$this->db->join("tbl_patient_advance pv", "pi.patient_id=pv.patient_id");
		$query = $this->db->get();
		$config['total_rows'] = $query->num_rows();
		
		
		$search=str_replace('%20',' ',$this->uri->segment(4));
		$search1=str_replace('%20',' ',$this->uri->segment(5));
		$search2=str_replace('%20',' ',$this->uri->segment(6));
		if($search == 'date'){
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment(5))));
		   	$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment(6))));
			$where_condition = "(advance_date >= '".$from."' AND advance_date <='".$to."')";
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
			$this->db->where($where_condition);
			}
		else if($search1 == 'PatientName'){
			$this->db->where('pi.first_name',$search2);
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			
		}
		else if($search1 == 'MobileNo'){
			$this->db->where('pi.mobile_no',$search2);
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			
		}
		else if($search1 == 'ReferedBy'){
			$this->db->where('pi.referal_name',$search2);
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			}
		else if($search1 == 'PatientId'){
			$this->db->where('pi.patient_id',$search2);
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
		}
		else if($search1 == 'ProvisionalDiagnosis'){
			$this->db->where('pd.prov_diagnosis',$search2);
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			$this->db->join("tbl_patient_prov_diagnosis pd", "pi.patient_id=pd.patient_id");
		
		} 
		else {
				$from = date('d-m-Y', strtotime('-30 days'));
				$to = date('d-m-Y');
				$this->db->where('pv.advance_date >= ',date('Y-m-d',strtotime($from)));
				$this->db->where('pv.advance_date <= ',date('Y-m-d',strtotime($to)));
				$this->db->where('pv.client_id',$this->session->userdata('client_id'));
		
		}
		$this->db->where('pi.client_id',$this->session->userdata('client_id'));
		$this->db->select('pi.patient_id,pi.mobile_no,pi.patient_code,pi.address_line1,pi.first_name,pi.last_name,pi.referal_name,pi.mobile_no,pv.advance_amount,pv.advance_date,pv.advance_id');
		$this->db->from("tbl_patient_info pi");
		$this->db->join("tbl_patient_advance pv", "pi.patient_id=pv.patient_id");
		$this->db->group_by('pi.patient_id');
		$this->db->order_by('pv.advance_date','DESC');  
		//$this->db->join("tbl_patient_prov_diagnosis pd", "pi.patient_id=pd.patient_id");
		
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
        $query=$this->db->get();
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
		$config['next_link'] = 'Next &gt;';
		$config['prev_link'] = '&lt Previous';
		$config['last_link'] = 'Last &gt;&gt;';
		
		$config['base_url'] = site_url(join("/",$segment_array));
		$config['uri_segment'] = $current_page_segment;
		$this->pagination->initialize($config);
		$data["pagination"] = $this->pagination->create_links();
		$str_links = $this->pagination->create_links();	
		$data["links"] = explode('<li>',$str_links);
		$data["pagination"] = $this->pagination->create_links();
		$data['advance']=$query->result_array();
	    $data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$data['patient_name']=$this->common_model->getPatientname();
		$data['mobile']=$this->common_model->get_mobile();
		$data['patient_code']=$this->common_model->getpatientid();
		$data['name']=$this->common_model->getreferal_name();
		$data['provDiagList']=$this->common_model->getProvdiagList();
		$this->load->view('client/advance_reports',$data);
	
	}
	public function referal_reports() {
		$data['page_name'] = 'referal';
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		if($this->uri->segment(4) != false ){
			$data['from'] = $this->uri->segment(5);
			$data['to'] = $this->uri->segment(6);			
			$data['referals'] = $this->common_model->search_referalreport1();
			$data['patients'] = $this->common_model->search_referalreport();
		}
		else {
			$data['from'] = '';
			$data['to'] = '';
			$data['patients'] = '';
			$data['referals']="";
		}
		$data['referal_type']=$this->common_model->getReferaltype();
		$this->load->view('client/referal_reports',$data);
	}
	public function export_patient(){
		$this->load->library('export');
		$segment_array = $this->uri->segment_array();
		$do_date = array_search("date",$segment_array);
		if ($do_date !== FALSE)
		{
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+1))));
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+2))));
			$this->db->where('pi.appoint_date >=', $from);
			$this->db->where('pi.appoint_date <=', $to);
		}
		$this->db->distinct();
		$this->db->select('pi.patient_code,pi.first_name,pi.last_name,pi.appoint_date,pi.mobile_no,pi.email,pi.address_line1');
		$this->db->where('pi.home_visit !=',2);
		$this->db->from("tbl_patient_info pi");
		$this->db->where('pi.client_id',$this->session->userdata('client_id'));
		$this->db->order_by('pi.patient_id', 'desc');
		$sql = $this->db->get();
		$this->export->to_excel($sql, 'patient_list');
	}
	public function export_homepatient(){
		$this->load->library('export');
		$segment_array = $this->uri->segment_array();
		$do_date = array_search("date",$segment_array);
		if ($do_date !== FALSE)
		{
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+1))));
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+2))));
			$this->db->where('pi.appoint_date >=', $from);
			$this->db->where('pi.appoint_date <=', $to);
		}
		$this->db->distinct();
		$this->db->select('pi.patient_code,pi.first_name,pi.last_name,pi.appoint_date,pi.mobile_no,pi.email,pi.address_line1');
		$this->db->where('pi.home_visit',2);
		$this->db->from("tbl_patient_info pi");
		$this->db->where('pi.client_id',$this->session->userdata('client_id'));
		$this->db->order_by('pi.patient_id', 'desc');
		$sql = $this->db->get();
		$this->export->to_excel($sql, 'Homepatient_list');
	}
	public function export_appointment(){
		$this->load->library('export');
		$segment_array = $this->uri->segment_array();
		$do_date = array_search("date",$segment_array);
		if ($do_date !== FALSE)
		{
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+1))));
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+2))));
			$this->db->where('ai.appointment_from >=', $from);
			$this->db->where('ai.appointment_from <=', $to);
		}
		$this->db->distinct();
		$this->db->select('pi.patient_code,pi.first_name,pi.last_name,pi.mobile_no,ai.start,ai.end,ai.notes,si.first_name as staff_name,ai.visit');
		$this->db->where('ai.status !=',1);
		$this->db->from("tbl_appointments ai");
		$this->db->join("tbl_patient_info pi",'pi.patient_id = ai.patient_id');
		$this->db->join("tbl_staff_info si",'si.staff_id = ai.staff_id');
		$this->db->where('ai.client_id',$this->session->userdata('client_id'));
		$this->db->order_by('pi.patient_id', 'desc');
		$sql = $this->db->get();
		$this->export->to_excel($sql, 'Appointment_list');
	}
	public function export_cancelappointment(){
		$this->load->library('export');
		$segment_array = $this->uri->segment_array();
		$do_date = array_search("date",$segment_array);
		if ($do_date !== FALSE)
		{
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+1))));
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+2))));
			$this->db->where('ai.appointment_from >=', $from);
			$this->db->where('ai.appointment_from <=', $to);
		}
		$this->db->distinct();
		$this->db->select('pi.patient_code,pi.first_name,pi.last_name,pi.mobile_no,ai.start,ai.end,ai.notes,si.first_name as staff_name');
		$this->db->where('ai.status',1);
		$this->db->from("tbl_appointments ai");
		$this->db->join("tbl_patient_info pi",'pi.patient_id = ai.patient_id');
		$this->db->join("tbl_staff_info si",'si.staff_id = ai.staff_id');
		$this->db->where('ai.client_id',$this->session->userdata('client_id'));
		$this->db->order_by('pi.patient_id', 'desc');
		$sql = $this->db->get();
		$this->export->to_excel($sql, 'Cancelappointment_list');
	}
	
	public function export_expense(){
		$this->load->library('export');
		$data['page_name'] = 'staff';
		$segment_array = $this->uri->segment_array();
		
		$search=str_replace('%20',' ',$this->uri->segment(4));
		$search1=str_replace('%20',' ',$this->uri->segment(5));
		$search2=str_replace('%20',' ',$this->uri->segment(6));
		if($search == 'date'){
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment(5))));
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment(6))));
			$where_condition = "(bill_date >= '".$from."' AND bill_date <='".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
			$this->db->where($where_condition);
			$this->db->where('client_id',$this->session->userdata('client_id'));
		    $this->db->select('bill_no,ventor,bill_date,total_amt');
			$this->db->from("tbl_expanse");
			$this->db->group_by('bill_no'); 
			$this->db->order_by('bill_date','desc');
			
		}
			else {
		     $this->db->where('client_id',$this->session->userdata('client_id'));
		     $this->db->select('bill_no,ventor,bill_date,total_amt');
			 $this->db->from("tbl_expanse");
			 $this->db->group_by('bill_no'); 
			 $this->db->order_by('bill_date','desc');
			}
		 $query=$this->db->get();
		 $this->export->to_excel($query, 'expense_report');
	}
	
	public function advance_view($patient_id) {
		$data['page_name'] = 'reports';
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$data['patient'] = $this->patient_model->editPatientinfo($patient_id);
		$data['advance'] = $this->advance_model->invWithAdvanceBal($patient_id);
		//$data['advance_payment'] = $this->invoice_model->getAdvancePayments($patient_id); 
		$this->load->view('client/advance_view_rep',$data);	
	}
	public function get_treatments() {
		 $prov = $this->input->post('provDiag');
		if($concessionData = $this->settings_model->get_treatments_det($prov)){
			$response['status'] = 'success';
			$response['message'] = 'Referal  has been added successfully.';
			$response['treatmentData'] = $concessionData;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
			
		} 
		echo json_encode($response); 
		
		/*$provi = explode('/',$prov);
		$p_id = '9067';
		$date = '07-06-2016';
		$this->db->where('ti.patient_id',$p_id);
		$this->db->where('ti.treatment_date >=',$date);
		$this->db->select('ti.treatment_quantity,it.item_name')->from('tbl_patient_treatment_techniques ti');
		$this->db->join('tbl_patient_info pi',"ti.patient_id=pi.patient_id");	
		$this->db->join('tbl_item it',"ti.treatments=it.item_id");		
		$result = $this->db->get();
		//return ($query->num_rows() > 0) ? $query->row_array() : false;
		echo $result->row()->treatment_quantity;*/
	}
	public function pat_visit() {
		$data['page_name'] = 'reports';
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		$config['per_page'] =10;
		$current_page ='';
		
		if($this->uri->segment(4) != false) {
			$val =  $this->uri->segment(6);
			$val1 = $this->uri->segment(7);
		 if($this->uri->segment(5) == 'PatientName') {
			  $this->db->where('ti.patient_id',$val);
		  } else if($this->uri->segment(5) == 'date') {
			$this->db->where('ti.visit_date >=',date('Y-m-d',strtotime($val)));
			$this->db->where('ti.visit_date <',date('Y-m-d',strtotime($val1)));
		  } else {
			  $this->db->where('ti.visit_date',date('Y-m-d'));
		  }
		} else {
			$this->db->where('ti.visit_date',date('Y-m-d'));
		}
		$this->db->select('*')->from('tbl_patient_visits ti')->where('ti.client_id',$this->session->userdata('client_id'));
		$this->db->join('tbl_patient_info pi', 'ti.patient_id = pi.patient_id');
		$this->db->distinct();
		$query = $this->db->get();
		$config['total_rows'] = $query->num_rows();
		$data['total_rows'] = $query->num_rows();		
		if($this->uri->segment(4) != false) {
			$val =  $this->uri->segment(6);
			$val1 = $this->uri->segment(7);
		 if($this->uri->segment(5) == 'PatientName') {
			  $this->db->where('ti.patient_id',$val);
		  } else if($this->uri->segment(5) == 'date') {
			$this->db->where('ti.visit_date >=',date('Y-m-d',strtotime($val)));
			$this->db->where('ti.visit_date <',date('Y-m-d',strtotime($val1)));
		  } else {
			  $this->db->where('ti.visit_date',date('Y-m-d'));
		  }
		} else {
			$this->db->where('ti.visit_date',date('Y-m-d'));
		}
		$this->db->select('pi.patient_code,ti.patient_id,pi.first_name,pi.last_name,pi.mobile_no,pi.email,pi.address_line1')->from('tbl_patient_visits ti')->where('ti.client_id',$this->session->userdata('client_id'));
		$this->db->join('tbl_patient_info pi', 'ti.patient_id = pi.patient_id');
				
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
		$query=$this->db->get();
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
		$config['next_link'] = 'Next &gt;';
		$config['prev_link'] = '&lt Previous';
		$config['last_link'] = 'Last &gt;&gt;';
		
		$config['base_url'] = site_url(join("/",$segment_array));
		$config['uri_segment'] = $current_page_segment;
		$this->pagination->initialize($config);
		$str_links = $this->pagination->create_links();	
		$data["links"] = explode('<li>',$str_links);
		$data['result']=$query->result_array();
	    $data['patient_name']=$this->common_model->getPatientname2();
		$data['item'] = $this->common_model->getItemNames();
		$this->load->view('client/patient_visit',$data); 
	}
	
	public function bill_amt() {
		$data['page_name'] = 'transaction';
		$search=str_replace('%20',' ',$this->uri->segment(4));
		$search1=str_replace('%20',' ',$this->uri->segment(5));
		if($search == 'PaymentMode') {
			//$this->db->where('pv.cheque_date',date('Y-m-d'));
			$this->db->where('pv.payment_mode',$search1);
			$this->db->select('pi.patient_id,pi.patient_code,pi.client_id,pi.first_name,pi.last_name,pv.bill_no,pv.net_amt,pv.paid_amt,pv.treatment_date,pv.bill_status,pv.due_date,pv.bill_id,pv.payment_mode');
			$this->db->from("tbl_patient_info pi");
			$this->db->join("tbl_invoice_header pv", "pi.patient_id=pv.patient_id");
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
		} else if($search1 == 'status') {
			$this->db->where('pv.treatment_date',date('Y-m-d'));  
			$this->db->where('pv.payment_mode',$search2);
			$this->db->select('pi.patient_id,pi.patient_code,pi.client_id,pi.first_name,pi.last_name,pv.bill_no,pv.net_amt,pv.paid_amt,pv.treatment_date,pv.bill_status,pv.due_date,pv.bill_id,pv.payment_mode');
			$this->db->from("tbl_patient_info pi");
			$this->db->join("tbl_invoice_header pv", "pi.patient_id=pv.patient_id");
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
		} 
		else { 
			$this->db->select('pi.patient_id,pi.patient_code,pi.client_id,pi.first_name,pi.last_name,pv.bill_no,pv.net_amt,pv.paid_amt,pv.treatment_date,pv.bill_status,pv.due_date,pv.bill_id,pv.payment_mode');
			$this->db->from("tbl_patient_info pi");
			$this->db->join("tbl_invoice_header pv", "pi.patient_id=pv.patient_id");
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			$this->db->where('pv.treatment_date',date('Y-m-d'));
		}
		$query = $this->db->get();
		$data['invoice_record']= $query->result_array();
	    $data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
	    $data['todays_advance'] = $this->common_model->todays_advance($this->session->userdata('client_id'));
		$this->load->view('client/bill_amount',$data); 
	}
	
	public function print_bill_amt() {
		$data['page_name'] = 'Invoice';
		$search=str_replace('%20',' ',$this->uri->segment(4));
		$search1=str_replace('%20',' ',$this->uri->segment(5));
		if($search == 'PaymentMode') {
			//$this->db->where('pv.cheque_date',date('Y-m-d'));
			$this->db->where('pv.payment_mode',$search1);
			$this->db->select('pi.patient_id,pi.patient_code,pi.client_id,pi.first_name,pi.last_name,pv.bill_no,pv.net_amt,pv.paid_amt,pv.treatment_date,pv.bill_status,pv.due_date,pv.bill_id,pv.payment_mode');
			$this->db->from("tbl_patient_info pi");
			$this->db->join("tbl_invoice_header pv", "pi.patient_id=pv.patient_id");
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
		} else if($search == 'status') {
			$this->db->where('pv.treatment_date',date('Y-m-d'));  
			$this->db->where('pv.payment_mode',$search1);
			$this->db->select('pi.patient_id,pi.patient_code,pi.client_id,pi.first_name,pi.last_name,pv.bill_no,pv.net_amt,pv.paid_amt,pv.treatment_date,pv.bill_status,pv.due_date,pv.bill_id,pv.payment_mode');
			$this->db->from("tbl_patient_info pi");
			$this->db->join("tbl_invoice_header pv", "pi.patient_id=pv.patient_id");
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
		} 
		else { 
			$this->db->select('pi.patient_id,pi.patient_code,pi.client_id,pi.first_name,pi.last_name,pv.bill_no,pv.net_amt,pv.paid_amt,pv.treatment_date,pv.bill_status,pv.due_date,pv.bill_id,pv.payment_mode');
			$this->db->from("tbl_patient_info pi");
			$this->db->join("tbl_invoice_header pv", "pi.patient_id=pv.patient_id");
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			$this->db->where('pv.treatment_date',date('Y-m-d'));
		}
		$query = $this->db->get();
		$data['invoice_record']= $query->result_array();
	    $data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
	    $data['todays_advance'] = $this->common_model->todays_advance($this->session->userdata('client_id'));
		$this->load->view('client/print_bill_amt',$data); 
	}
	
	public function todays_appointment() {
		$data['page_name'] = 'reports';
		$data['name'] =$this->common_model->getstaff();
		$data['item'] = $this->common_model->getItemNames();
		$data['patient_name']=$this->common_model->getPatientname2();
	   	$data['result'] = $this->schedule_model->appointment_thatday();
		$this->load->view('client/todays_appointments',$data);
		
	}
	public function list_treatments(){  
		$response=array();
		$d1 = $_POST['ref_id'];
		$result = $this->common_model->list_treatments($d1);
		if($result != '')
		{			
			$response['status'] = 'success';
			$response['message'] = 'Referal Has Been Added successfully.';
			$response['referalData'] = $result;
		}
		else{
			$response['status'] = 'Failure';
			$response['message'] = 'Referal Has Been Added successfully.';
		}
		echo json_encode($response);
	}
	public function inventory_balance()
	{
		$data['page_name'] = 'inventory';
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		
		$segment_array = $this->uri->segment_array();
		$current_page ='';
		$data['mode'] = 'view';
		$data['balance'] =  false;

		// do date filter
		$do_date = array_search("date",$segment_array);
		if ($do_date !== FALSE)
		{
			$data['dateFilter'] = true;
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+1))));
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+2))));
			$where_condition1 = "(ih.treatment_date >= '".$from."' AND ih.treatment_date <= '".$to."')";
			$where_condition2 = "(ih.bill_date >= '".$from."' AND ih.bill_date <= '".$to."')";
			$where_condition3 = "(date >= '".$from."' AND date <= '".$to."')";
			
				$this->db->select('sum(ih.net_amt) as  income,sum(ih.paid_amt) as  paid,count(id.item_id) as cnt,id.item_id');
				$this->db->from("tbl_invoice_header ih");
				$this->db->join('tbl_invoice_detail id','id.bill_id = ih.bill_id');
				$this->db->join('tbl_item it','it.item_id != id.item_id');
				$this->db->group_by('id.item_id');
				$where=array('ih.client_id' => $this->session->userdata('client_id'));
				$this->db->where($where);
				$this->db->where($where_condition1);
				$query = $this->db->get();
				$amount = 0;
				$amount1 = 0;
				$pro = 0;
				foreach($query->result_array() as $row){
					$this->db->where('item_id',$row['item_id']);
					$this->db->select('item_id')->from('tbl_item');
					$res = $this->db->get();
					if($res->result_array() != false){
						$amount = 0;
						$pro = 0;
					} else {
						$val = explode('/',$row['item_id']);
						$this->db->where('color_code',$val[0]);
						$this->db->select('initial_cost,buy_price')->from('tbl_inventory_color');
						$res = $this->db->get();
						$price = ($res->row()->buy_price)-($res->row()->initial_cost);
						$amount += $row['income'];
						$amount1 += $row['paid'];
						$pro += $row['cnt'] * $price; 
					}
				}
				$data['balance_income'] = $amount;
				$data['balance_income_pay'] = $amount1;
				$data['profit'] = $pro;
				
				
				$this->db->select('sum(initial_stock  * initial_cost) as expanse');
				$this->db->from("tbl_inventory");
				$this->db->where($where_condition3);
				$this->db->where('client_id',$this->session->userdata('client_id'));
				$query1 = $this->db->get();
				$qrow1 = $query1->row();
				$data['balance_expanse'] = ($query1->num_rows() > 0) ? $qrow1->expanse : false;
				$data['balance'] = true;
		} 
		$this->load->view('client/inventory_balance', $data);  

	}	
	
	public function check_bill() {  
		$prov = $this->input->post('provDiag');
		$concessionData = $this->invoice_model->check_bill($prov);
			$response['status'] = 'success';
			$response['message'] = 'Concession group has been added successfully.';
			$response['concessionData'] = $concessionData;
		
		echo json_encode($response);
	}
	public function queries_list(){
		$data['page_name'] = 'feedback';
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 10;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
		
		$where_condition = ($where_condition != '') ? $where_condition : '';
		$this->db->distinct();
		$this->db->select('count(*) as totalrows')->from('tbl_query');
		if($this->session->userdata('all_locations') == true)
		{
			$this->db->where_in('client_id',$this->session->userdata('clientIds'));
		}else{
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->distinct();
		$this->db->select('*');
		$this->db->from("tbl_query");
		if($this->session->userdata('all_locations') == true)
		{
			$this->db->where_in('client_id',$this->session->userdata('clientIds'));
		}else{
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
		//do where
		$this->db->order_by('query_id', 'desc');
		
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
		$data['patients'] = ($query->num_rows() > 0) ? $query->result_array() : false;
	
		
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
		$config['next_link'] = 'Next &gt;';
		$config['prev_link'] = '&lt Previous';
		$config['last_link'] = 'Last &gt;&gt;';
		
		$config['base_url'] = site_url(join("/",$segment_array));
		$config['uri_segment'] = $current_page_segment;
		$this->pagination->initialize($config);
		$str_links = $this->pagination->create_links();	
		$data["links"] = explode('&nbsp;',$str_links );
		$data['current_page_segment'] = $current_page_segment;
		$this->load->view('client/query_list',$data);  
	}
	public function print_referal() {
		$c_id = $this->session->userdata('client_id');
		$data['clientDetails'] = $this->registration_model->editProfile($c_id);
		$data['patients'] = $this->common_model->search_referalreport();
		$data['from'] = $this->uri->segment(5);
		$data['to'] = $this->uri->segment(6);			
		$this->load->view('client/print_referal',$data);
		/* $html =$this->load->view('client/print_referal',$data,true);
		$this->load->library('mpdf53/mpdf');
		$this->mpdf=new mPDF('','A4','11','Calibri (Body)',15,15,16,16,9,9);
		$this->mpdf->SetDisplayMode('fullpage');
		$this->mpdf->list_indent_first_level = 0; 
		$stylesheet = file_get_contents('mpdfstyletables.css');
		$this->mpdf->WriteHTML($stylesheet,0);
		$this->mpdf->WriteHTML($html,2);
		$this->mpdf->SetFooter('Powerd By : PhysioPlustech.com');
		$this->mpdf->Output('invoice.pdf','I');  */ 
	}
	public function export_casereport(){
		$this->load->library('export');
		$data['page_name'] = 'patient';
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
			$where_condition = "(pv.visit_date >= '".$from."' AND pv.visit_date <='".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
			$this->db->where($where_condition);
			$this->db->where('pi.client_id',$this->session->userdata('client_id'));
		    $this->db->select('pi.patient_code,pi.first_name,pi.appoint_date,pi.mobile_no,pi.email,pi.address_line1');
			$this->db->join("tbl_patient_visits pv", "pi.patient_id=pv.patient_id");
			$this->db->from("tbl_patient_info pi");
			$this->db->order_by("pi.patient_id", "desc");
			$this->db->group_by("pi.patient_id");
		}
			else {
		     $this->db->where('pi.client_id',$this->session->userdata('client_id'));
		     $this->db->select('pi.patient_code,pi.first_name,pi.appoint_date,pi.mobile_no,pi.email,pi.address_line1');
			 $this->db->from("tbl_patient_info pi");
			 $this->db->order_by("pi.patient_id", "desc");
			
			}
		
		
		$query=$this->db->get();
		$this->export->to_excel($query, 'patient_list');
	} 
	
	public function print_income() {
		$c_id = $this->session->userdata('client_id');
		$data['clientDetails'] = $this->registration_model->editProfile($c_id);
		$data['invoices'] = $this->common_model->search_incomestat();
		$data['patients'] = $this->common_model->search_referalreport();
		$data['advances'] = $this->common_model->search_incomeadvance();
		$this->load->view('client/print_income',$data);
	}
	public function print_incomechart() {  
		$c_id = $this->session->userdata('client_id');
		$data['clientDetails'] = $this->registration_model->editProfile($c_id);
		$data['result'] = $this->common_model->incomechart_value();
		$data['result1'] = $this->common_model->staffincomechart_value();
		$data['result2'] = $this->common_model->pdtincomechart_value();
		$data['result4'] = $this->staffpiechart();   
		$data['result3'] = $this->itempiechart(); 
		if($this->uri->segment(4) != ''){
			$data['from'] = 'Date : '.$this->uri->segment(5);
			$data['to'] = ' to '.$this->uri->segment(6);
		} else {
			$data['from'] = '';
			$data['to'] ='';
		}
		if($this->uri->segment(4) == 'both'){
			$this->db->where('staff_id',$this->uri->segment(7));
			$this->db->select('first_name,last_name')->from('tbl_staff_info');
			$res = $this->db->get();
			$data['name'] = $res->row()->first_name.' '.$res->row()->last_name;
		} else {
			$data['name'] = '';
		}
		$this->load->view('client/print_incomechart',$data);
	}
	
	
	
	public function email_income() {
		$data['page_name'] = 'patient';
		$p_id =$this->uri->segment(5);
		$data['patients'] = $this->common_model->search_patientinfo($p_id);
		$this->load->view('client/income_patient_email_send',$data);
		
	}
	
	public function report_patientsend_email(){
		
		$data['page_name'] = 'patient';
	    $response = array();
		$patient_id = $this->input->post('patient_id');
		$client_id = $this->input->post('client_id');
		
		if($invoiceEmail = $this->common_model->report_patientsend_email($patient_id,$client_id))
		{
			$response['status'] = 'success';
			$response['message'] = 'Invoice has been sent successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Invoice has not been sent successfully.';
		}
		echo json_encode($response);
		
	}
	public function export_invoice(){
		$this->load->library('export');
		$data['page_name'] = 'invoice';
		$segment_array = $this->uri->segment_array();
			
		$search=str_replace('%20',' ',$this->uri->segment(4));
		$search1=str_replace('%20',' ',$this->uri->segment(5));
		$search2=str_replace('%20',' ',$this->uri->segment(6));
		if($search == 'date'){
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment(5))));
		    $to = date('Y-m-d',  strtotime(urldecode($this->uri->segment(6))));
			$where_condition = "(treatment_date >= '".$from."' AND treatment_date <='".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
			$this->db->where($where_condition);
			$this->db->where('pi.client_id',$this->session->userdata('client_id'));
			$this->db->select('pv.treatment_date,pv.bill_no,pi.patient_code,pi.first_name,pi.last_name,pv.payment_mode,pv.net_amt,pv.paid_amt');
		    $this->db->from("tbl_patient_info pi");
		    $this->db->join("tbl_invoice_header pv", "pi.patient_id=pv.patient_id");
		    $this->db->order_by("bill_id", "desc");
		}
		else {
		$this->db->select('pv.treatment_date,pv.bill_no,pi.patient_code,pi.first_name,pi.last_name,pv.payment_mode,pv.net_amt,pv.paid_amt');
		$this->db->from("tbl_patient_info pi");
		$this->db->join("tbl_invoice_header pv", "pi.patient_id=pv.patient_id");
		$this->db->where('pv.client_id',$this->session->userdata('client_id'));
		
		}
		
		$query=$this->db->get();
		$this->export->to_excel($query, 'invoice_report');
	} 
	
	public function export_report(){
		$this->load->library('export');
		$data['page_name'] = 'invoice';
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
			$where_condition = "(pt.payment_date >= '".$from."' AND pt.payment_date <= '".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
			$this->db->where($where_condition);
			$this->db->where('pi.episode_status !=','1');
			$this->db->select('pv.treatment_date,pv.bill_no,pi.patient_code,pi.first_name,pi.last_name,pv.payment_mode,pv.net_amt,pv.paid_amt');
		    $this->db->from("tbl_patient_info pi");
		    $this->db->join("tbl_invoice_header pv", "pi.patient_id=pv.patient_id");
		    $this->db->join("tbl_invoice_payments pt", "pv.bill_id=pt.bill_id");
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			
			}
		else {
		    $this->db->select();
			$this->db->from("tbl_patient_info pi");
			$this->db->join("tbl_invoice_header pv", "pi.patient_id=pv.patient_id");
			$this->db->join("tbl_invoice_payments pt", "pv.bill_id=pt.bill_id");
			$this->db->where('pv.client_id',$this->session->userdata('client_id'));
			$this->db->where('pt.payment_date',date('Y-m-d'));
		
		}
		
		$query=$this->db->get();
		$this->export->to_excel($query, 'invoice_report');
	} 
	public function report_send() {
		 $data['page_name'] = "patient";
		 $data['detail'] = $this->common_model->getmail($this->uri->segment(4));
		 $this->load->view('client/send_mailreports',$data);
   }
	public function send_mail(){
		$data['page_name'] = "patient";
		$result = $this->common_model->send_mail();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'concession group has not been added successfully.';
		} 
		echo json_encode($response);
	}
	public function income_charts()  {
		$data['page_name'] = "transaction";
		$data['result'] = $this->common_model->incomechart_value();
		$data['result1'] = $this->common_model->staffincomechart_value();
		$data['result2'] = $this->common_model->pdtincomechart_value();
		$data['result4'] = $this->staffpiechart();
		$data['result5'] = $this->staffpiechartname();    
		$data['result3'] = $this->itempiechart();   
		$data['staff'] = $this->common_model->staff_list();
		$this->load->view('client/income_charts',$data);
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
	public function staffpiechartname()
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
			array_push($arr,$counts['first_name']);
		}
		return $arr;
	}
	public function itempiechart()
	{
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
		$appointQuery = $query->result_array();
		$arr = array();
		foreach($appointQuery as $counts) {
			array_push($arr,$counts['total']);
		}
		return $arr;
	}
	public function performance_charts()  {
		$data['page_name'] = "practitioners";
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
		
		$data['result'] = $this->common_model->performance_charts($id);
		$data['re_list'] = $this->common_model->performance_lists($id);
		$data['tr_list'] = $this->common_model->performance_treatmentlists($id);
		} else {
			$data['result'] = '';
			$data['re_list'] = '';
			$data['tr_list'] = '';
			$data['name'] = '';
		}
		$this->load->view('client/performance_charts',$data);
	}
	public function print_performancechart() {
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
		$data['result'] = $this->common_model->performance_charts($id);
		$data['re_list'] = $this->common_model->performance_lists($id);
		$data['tr_list'] = $this->common_model->performance_treatmentlists($id);
		} else {
			$data['name'] = '';
			$data['result'] = '';
			$data['re_list'] = '';
			$data['tr_list'] = '';
		}
		$this->load->view('client/print_performancechart',$data);
	}
	public function print_treatmentchart() {  
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
		$data['name']  = $res->row()->first_name;
		$name  = $res->row()->first_name;
		$data['tr_list'] = $this->common_model->performance_treatmentlists($id);
		
		} else {
			$data['name'] = '';
			$data['tr_list'] = '';
		}
		$c_id = $this->session->userdata('client_id');
		$data['clientDetails'] = $this->registration_model->editProfile($c_id);
	    if($this->uri->segment(4) != ''){
			$data['from'] = 'Date : '.$this->uri->segment(5);
			$data['to'] = ' to '.$this->uri->segment(6);
		} else {
			$data['from'] = 'Date : '.date('Y-m-d', strtotime("-30 days"));
			$data['to'] = ' to '.date('Y-m-d');
		}
		$this->load->view('client/print_treatmentchart',$data);
	}
	public function reports_charts()  {
		$data['page_name'] = "reports";
	    $data['result'] = $this->common_model->incomechart_value();
		$data['patients'] = $this->common_model->dailypatientchart_list();
		$data['staffs'] = $this->common_model->staffchart_list();
		$data['referral'] = $this->common_model->referalchart_list();
		$data['appointments'] = $this->common_model->appointmentchart_list();
		$this->load->view('client/reports_chart',$data);
	}
	public function referal_src(){
		$data['page_name'] = "marketing";
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		if($this->uri->segment(4) != false){
		$data['from'] = $this->uri->segment(5);
		$data['to'] = $this->uri->segment(6);
		} else {
			$data['from'] = date('Y-m-d', strtotime("-30 days"));
			$data['to'] = date('Y-m-d');
		}			
		$data['referals'] = $this->common_model->search_referalreport1();
		$data['patients'] = $this->common_model->search_referalreport();
		$data['referal_type']=$this->common_model->getReferaltype();
		$this->load->view('client/referal_src',$data);
	}
	public function patient_src(){
		$data['page_name'] = "marketing";
		$this->load->view('client/patient_src',$data);
	}
	public function apt_src(){
		$data['page_name'] = "marketing";
		$this->load->view('client/apt_src',$data);
	}
	public function daily_payments() {
		$data['page_name'] = 'transaction';
		$date = $this->uri->segment(4);
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$data['invoice_record'] = $this->invoice_model->getdaily_payments();
		$data['invoices'] = $this->invoice_model->getpayments_list();
		$this->load->view('client/daily_payments',$data);
	}
	public function print_daily_payments() {
		$data['page_name'] = 'transaction';
		$date = $this->uri->segment(4);
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		
		if($date != ''){
			$data['invoice_record'] = $this->invoice_model->getdaily_payments();
			$data['invoices'] = $this->invoice_model->getpayments_list();
		} else {
			$data['invoice_record'] ='';
			$data['invoices'] ='';
		}
		$this->load->view('client/print_daily_payments',$data);
	}
	public function print_balance_sheet(){
		$data['page_name'] = 'reports';
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$c_id = $this->session->userdata('client_id');
		$data['clientDetails'] = $this->registration_model->editProfile($c_id);
		$data['page_name'] = 'transaction';
		$segment_array = $this->uri->segment_array();
		$do_date = array_search("date",$segment_array);
		if ($do_date !== FALSE)
		{
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+1))));
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+2))));
		} else {
			$to = date('Y-m-d');
			$from = date('Y-m-d', strtotime("-30 days"));
		}
		$this->db->select('sum(ih.net_amt) as income');  
		$this->db->from("tbl_invoice_header ih");
		$this->db->join("tbl_patient_info pi", "ih.patient_id=pi.patient_id");
		$this->db->where('ih.client_id',$this->session->userdata('client_id'));
		if($from == $to){
			$this->db->where('ih.treatment_date',$from);
		
		} else {
			$this->db->where('ih.treatment_date >=',$from);
		    $this->db->where('ih.treatment_date <=',$to);
		}
		$query = $this->db->get();
		$qrow = $query->row();
		$data['balance_income'] = ($query->num_rows() > 0) ? $qrow->income : false;
		
		$this->db->select('sum(ih.paid_amt) as income');  
		$this->db->from("tbl_invoice_header ih");
		$this->db->join("tbl_patient_info pi", "ih.patient_id=pi.patient_id");
		$this->db->where('ih.client_id',$this->session->userdata('client_id'));
		if($from == $to){
			$this->db->where('ih.treatment_date',$from);
		} else {
			$this->db->where('ih.treatment_date >=',$from);
		    $this->db->where('ih.treatment_date <=',$to);
		}
		$query = $this->db->get();
		$qrow = $query->row();
		$data['balance_income_pay'] = ($query->num_rows() > 0) ? $qrow->income : false;
		
		$this->db->select('sum(item_amount) as expanse');
		$this->db->from("tbl_expanse");
		if($from == $to){
			$this->db->where('bill_date',$from);
		} else {
			$this->db->where('bill_date >=',$from);
		    $this->db->where('bill_date <=',$to);
		}
			$this->db->where('client_id',$this->session->userdata('client_id'));
			$query1 = $this->db->get();
			$qrow1 = $query1->row();
			$data['balance_expanse'] = ($query1->num_rows() > 0) ? $qrow1->expanse : false;
			$data['balance'] = true;
		
		$this->load->view('client/print_balance_view', $data);
	}
	public function outstand()
	{
		$data['page_name'] = 'transaction';
		$this->load->model('staff_model');
		$data['result']=$this->common_model->outstand_invoice();
		$data['sumresult']=$this->common_model->outstandSum_invoice();
		if($this->uri->segment(7) != 'null' && $this->uri->segment(7) != ''){
			$staff_id=$this->uri->segment(7);
			$this->db->where('staff_id',$staff_id);
			$this->db->select('first_name,last_name,staff_id')->from('tbl_staff_info');
			$q = $this->db->get();
			$data['staff'] = $q->row()->first_name.' '.$q->row()->last_name;
			$data['staff_id'] = $staff_id;
			$data['info']=$this->common_model->rsstaff_list($staff_id);
		} else {
			$data['staff'] = '';
			$data['staff_id'] = '';
			$data['info']=$this->staff_model->staffinfo();
		}
		$this->load->view('client/outstand_invoice',$data);
	}
	
	public function print_session() {
		$c_id = $this->session->userdata('client_id');
		$data['clientDetails'] = $this->registration_model->editProfile($c_id);
		
		
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->distinct();
		$this->db->select('*');
		$this->db->from("tbl_session_det sd");
		$this->db->join("tbl_patient_info pi", "sd.patient_id=pi.patient_id");
		$this->db->where('sd.client_id',$this->session->userdata('client_id'));
		$from = date('Y-m-d',  strtotime($this->uri->segment(5)));
		$to = date('Y-m-d',  strtotime($this->uri->segment(6)));
		$where_condition2 = "(sn_date >= '".$from."' AND sn_date <= '".$to."')";
		$this->db->where($where_condition2);
		 
		
		$query = $this->db->get();
		$data['session_report'] = ($query->num_rows() > 0) ? $query->result_array() : false;
	
		 
		$data['treatment_tech']=$this->common_model->getsessiondet();
		$data['patient_name']=$this->common_model->getPatientname();
		$data['doctor_name']=$this->common_model->getDoctorname();
		$data['treatment']=$this->common_model->getItemNames();
		$this->load->view('client/print_session',$data);
	}
	public function practitioners() {
	    $data['page_name'] = 'practitioners';
		$this->load->view('client/practitioners',$data);
	}
	public function marketing() {
	    $data['page_name'] = 'marketing';
		$this->load->view('client/marketing',$data);
	}
	public function sendfeedbackLink()
	{
		$feedbacktype = $this->input->post("feedbacktype");
		$p_id = $this->input->post("p_id");
		$d_id = $this->input->post("d_id");
		$p_mobile = $this->input->post("p_mobile");
		$p_name = $this->input->post("p_name");
		
		$patientQ = $this->db->select("mobile_no,email,first_name")->from('tbl_patient_info')->where('patient_id',$p_id)->get();
		$patentData = $patientQ->row_array();
		
		$staffQ = $this->db->select("S.first_name,S.email,S.mobile_no,C.clinic_name")->from('tbl_staff_info AS S')->join("tbl_client AS C","S.client_id = C.client_id","inner")->where('S.staff_id',$d_id)->get();
		$staffData = $staffQ->row_array();
		
		$this->load->model('mail_model');
		
		if($feedbacktype == 'email' && $patentData['email']!='' && $d_id != '')
		{
			
			$info['patient_id'] = $p_id;
			$info['staff_id'] = $d_id;
			$info['patient_name'] = $patentData['first_name'];
			$info['clinic_name'] = $staffData['clinic_name'];
			$clientMessage = $this->mail_model->feedbackpatientTemplate($info);
			$adminMailConfig = array('clinic'=> 'Physio Plus Tech','to' => $patentData['email'], 'subject' => 'Feedback Link', 'message' => $clientMessage);
			$emailstatus = $this->mail_model->sendEmail($adminMailConfig);
			if($emailstatus){
				$response['status'] = 'success';
				$response['message'] = "email Sent";
			} else { 
				$response['status'] = 'success';
				$response['message'] = 'email send failed !';
			} 
			echo json_encode($response);
		}else if($feedbacktype == 'SMS' && $p_mobile!='' && $d_id != '')
		{
			$url = base_url().'frontend/patient_survey/'.$p_id.'/'.$d_id;
			$sms_count = 0;
			$message_patient = 'Dear '.ucfirst($patentData['first_name']).', Hope you had a good Physiotherapy session at '.ucfirst($staffData['clinic_name']).'%0aWe wish you a speedy recovery!%0a If you are happy with our service, Kindly click below to leave a review.%0a'.$url;
			 $patientSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=FISIYO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$p_mobile.'&duplicateCheck=true&format=json&msg='.urlencode($message_patient); 
			
			$sms['patient'] = 'DONE';
			$patient_churl = @fopen($patientSmsURL,'r');
			fclose($patient_churl);
			if (!$patient_churl) {
							
			} else {
			$sms_count+=1;
			}
			$this->db->where('client_id', $this->session->userdata('client_id'));  
			$this->db->update('tbl_client', array('sms_count' => $sms_count));
			if($patient_churl != false){
				$response['status'] = 'success';
				$response['message'] = "email Sent";
			} else { 
				$response['status'] = 'success';
				$response['message'] = 'email send failed !';
			} 
			echo json_encode($response);
		} 
	}
}
?>