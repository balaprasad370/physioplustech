<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedback extends CI_Controller {
	public function __construct() {
		header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
		parent::__construct();
		$this->app_access->client(); // check access permission for owner
		$this->load->model(array('common_model'));
		
	}
	/* public function _remap($method, $params = array())
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
	} */
	public function feedback_add(){
		$data['page_name'] = 'feedback';
		$data['patient_name']=$this->common_model->getPatientname();
		$data['consultants'] = $this->common_model->getDoctorname();
		$this->load->view('client/feedback_add',$data);
	}
	public function views1() {
		// load default view
		$data['page_name'] = 'feedback';
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$data['patient_name']=$this->common_model->getPatientname();
		$data['consultants'] = $this->common_model->getDoctorname();
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
			'PatientName' => 'patient_id',
			'StaffName' => 'staff_id'
		);
		
		//do searchby
		$do_searchby = array_search("searchby",$segment_array);
		if($do_searchby != false) {
			$searchType = $this->uri->segment($do_searchby+1);
			$searchby = $this->uri->segment($do_searchby+2);
			$keyword = urldecode($this->uri->segment($do_searchby+3));
			if($searchType == 'patient') {
				$keyword = str_replace('_', '/', $keyword);
				$where_condition = "(fb.".$info_search[$searchby]."=".$keyword.")";
				$data['searchBy'] = $searchby;
				$data['keyword'] = $keyword;
			}else if($searchType == 'staff') {
				$keyword = str_replace('_', '/', $keyword);
				$where_condition = "(fb.".$info_search[$searchby]."=".$keyword.")";
				$data['searchBy'] = $searchby;
				$data['keyword'] = $keyword;
			}else if($searchType == 'info'){
				$keyword = str_replace('_', '/', $keyword);
				$where_condition = "(fb.total_rate=".$keyword.")";
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
			$where_condition = "(fb.visit_date >= '".$from."' AND fb.visit_date <= '".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
		} 
		
		//Count
		$where_condition = ($where_condition != '') ? $where_condition : '';
		$this->db->select('count(*) as totalrows')->from('feedback fb');
		$this->db->where('fb.client_id',$this->session->userdata('client_id'));
		if($where_condition!='') $this->db->where($where_condition);
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->select('fb.feedback_id,fb.client_id,si.first_name as sfirst,si.last_name as slast,pi.first_name as pfirst,pi.last_name as plast,fb.visit_date,fb.your_apoinment1,fb.your_apoinment2,fb.your_apoinment3,fb.your_apoinment4,fb.our_staff1,fb.our_staff2,fb.our_staff3,fb.our_staff4,fb.our_comun1,fb.our_comun2,fb.our_comun3,fb.our_comun4,fb.our_comun5,fb.our_comun6,fb.our_comun7,fb.our_comun8,fb.our_comun9,fb.our_facility1,fb.our_facility2,fb.our_facility3,fb.satisfaction1,fb.satisfaction2,fb.satisfaction3,fb.total_rate,fb.recommend');
		$this->db->from("feedback fb");
		$this->db->join("tbl_patient_info pi", "fb.patient_id=pi.patient_id");
		$this->db->join("tbl_staff_info si", "fb.staff_id=si.staff_id");
		$this->db->where('fb.client_id',$this->session->userdata('client_id'));
		//do where
		if($where_condition!='') $this->db->where($where_condition);
		//do orderby
		$this->db->order_by('fb.feedback_id', 'desc');
		
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
		$data['fb_record'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		if($data['fb_record'] == false && (isset($data['searchBy']) || isset($data['dateFilter']))) {
			$data['showTable'] = true;
		} else if($data['fb_record'] != false) {
			$data['showTable'] = true;
		} else { 
			$data['showTable'] = false;
		}
		
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
		$str_links = $this->pagination->create_links();	
		$data["links"] = explode('<li>',$str_links);
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$data['patient_name']=$this->common_model->getPatientname();
		$data['mobile']=$this->common_model->getmobileno();
		$data['patient_code']=$this->common_model->getpatientid();
		$data['name']=$this->common_model->getreferal_name();
		$this->load->view('client/feedback_view1',$data);
	}
	
	 public function views(){
		
		$data['page_name'] = 'feedback';
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		$config['per_page'] = 10;
		$current_page ='';
		$search=str_replace('%20',' ',$this->uri->segment(4));
		$search1=str_replace('%20',' ',$this->uri->segment(5));
		$search2=str_replace('%20',' ',$this->uri->segment(6));
		if($search == 'date'){
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment(5))));
		    $to = date('Y-m-d',  strtotime(urldecode($this->uri->segment(6))));
			$where_condition = "(visit_date >= '".$from."' AND visit_date <='".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
			$this->db->where($where_condition);
			$this->db->where('fb.client_id',$this->session->userdata('client_id'));
			$this->db->select('fb.feedback_id,fb.client_id,pi.first_name as pfirst,pi.last_name as plast,fb.visit_date,fb.your_apoinment1,fb.your_apoinment2,fb.your_apoinment3,fb.your_apoinment4,fb.our_staff1,fb.our_staff2,fb.our_staff3,fb.our_staff4,fb.our_comun1,fb.our_comun2,fb.our_comun3,fb.our_comun4,fb.our_comun5,fb.our_comun6,fb.our_comun7,fb.our_comun8,fb.our_comun9,fb.our_facility1,fb.our_facility2,fb.our_facility3,fb.satisfaction1,fb.satisfaction2,fb.satisfaction3,fb.total_rate,fb.recommend');
		    $this->db->from("feedback fb");
		    $this->db->join("tbl_patient_info pi", "fb.patient_id=pi.patient_id");
		}
		else if($search1 == 'PatientName') {
			$this->db->where('pi.first_name',$search2);
			$this->db->where('fb.client_id',$this->session->userdata('client_id'));
			$this->db->select('fb.feedback_id,fb.client_id,pi.first_name as pfirst,pi.last_name as plast,fb.visit_date,fb.your_apoinment1,fb.your_apoinment2,fb.your_apoinment3,fb.your_apoinment4,fb.our_staff1,fb.our_staff2,fb.our_staff3,fb.our_staff4,fb.our_comun1,fb.our_comun2,fb.our_comun3,fb.our_comun4,fb.our_comun5,fb.our_comun6,fb.our_comun7,fb.our_comun8,fb.our_comun9,fb.our_facility1,fb.our_facility2,fb.our_facility3,fb.satisfaction1,fb.satisfaction2,fb.satisfaction3,fb.total_rate,fb.recommend');
		    $this->db->from("feedback fb");
		    $this->db->join("tbl_patient_info pi", "fb.patient_id=pi.patient_id");
		 }
		else if($search1 == 'MobileNo') {
			$this->db->where('pi.mobile_no',$search2);
			$this->db->where('fb.client_id',$this->session->userdata('client_id'));
			$this->db->select('pi.mobile_no,fb.feedback_id,fb.client_id,pi.first_name as pfirst,pi.last_name as plast,fb.visit_date,fb.your_apoinment1,fb.your_apoinment2,fb.your_apoinment3,fb.your_apoinment4,fb.our_staff1,fb.our_staff2,fb.our_staff3,fb.our_staff4,fb.our_comun1,fb.our_comun2,fb.our_comun3,fb.our_comun4,fb.our_comun5,fb.our_comun6,fb.our_comun7,fb.our_comun8,fb.our_comun9,fb.our_facility1,fb.our_facility2,fb.our_facility3,fb.satisfaction1,fb.satisfaction2,fb.satisfaction3,fb.total_rate,fb.recommend');
		    $this->db->from("feedback fb");
		    $this->db->join("tbl_patient_info pi", "fb.patient_id=pi.patient_id");
		  }
		else if($search1 == 'PatientId') {
			$this->db->where('pi.patient_id',$search2);
			$this->db->where('fb.client_id',$this->session->userdata('client_id'));
			$this->db->select('pi.patient_id,fb.feedback_id,fb.client_id,pi.first_name as pfirst,pi.last_name as plast,fb.visit_date,fb.your_apoinment1,fb.your_apoinment2,fb.your_apoinment3,fb.your_apoinment4,fb.our_staff1,fb.our_staff2,fb.our_staff3,fb.our_staff4,fb.our_comun1,fb.our_comun2,fb.our_comun3,fb.our_comun4,fb.our_comun5,fb.our_comun6,fb.our_comun7,fb.our_comun8,fb.our_comun9,fb.our_facility1,fb.our_facility2,fb.our_facility3,fb.satisfaction1,fb.satisfaction2,fb.satisfaction3,fb.total_rate,fb.recommend');
		    $this->db->from("feedback fb");
		    $this->db->join("tbl_patient_info pi", "fb.patient_id=pi.patient_id");
		 }
		else if($search1 == 'ReferedBy') {
			$this->db->where('pi.referal_name',$search2);
			$this->db->where('fb.client_id',$this->session->userdata('client_id'));
			$this->db->select('fb.feedback_id,fb.client_id,pi.referal_name,pi.first_name as pfirst,pi.last_name as plast,fb.visit_date,fb.your_apoinment1,fb.your_apoinment2,fb.your_apoinment3,fb.your_apoinment4,fb.our_staff1,fb.our_staff2,fb.our_staff3,fb.our_staff4,fb.our_comun1,fb.our_comun2,fb.our_comun3,fb.our_comun4,fb.our_comun5,fb.our_comun6,fb.our_comun7,fb.our_comun8,fb.our_comun9,fb.our_facility1,fb.our_facility2,fb.our_facility3,fb.satisfaction1,fb.satisfaction2,fb.satisfaction3,fb.total_rate,fb.recommend');
		    $this->db->from("feedback fb");
		    $this->db->join("tbl_patient_info pi", "fb.patient_id=pi.patient_id");
		 }
		else if($search1 == 'ProvisionalDiagnosis') {
			$this->db->where('pd.prov_diagnosis',$search2);
			$this->db->where('fb.client_id',$this->session->userdata('client_id'));
			$this->db->select('fb.feedback_id,fb.client_id,pi.referal_name,pd.prov_diagnosis,pd.patient_id,pi.first_name as pfirst,pi.last_name as plast,fb.visit_date,fb.your_apoinment1,fb.your_apoinment2,fb.your_apoinment3,fb.your_apoinment4,fb.our_staff1,fb.our_staff2,fb.our_staff3,fb.our_staff4,fb.our_comun1,fb.our_comun2,fb.our_comun3,fb.our_comun4,fb.our_comun5,fb.our_comun6,fb.our_comun7,fb.our_comun8,fb.our_comun9,fb.our_facility1,fb.our_facility2,fb.our_facility3,fb.satisfaction1,fb.satisfaction2,fb.satisfaction3,fb.total_rate,fb.recommend');
		    $this->db->from("feedback fb");
		    $this->db->join("tbl_patient_info pi", "fb.patient_id=pi.patient_id");
		    $this->db->join("tbl_patient_prov_diagnosis pd", "pi.patient_id=pd.patient_id");
		}
		else {
			$this->db->where('fb.client_id',$this->session->userdata('client_id'));
			$this->db->select('pi.patient_id,pi.patient_code,pi.mobile_no,pi.referal_name,fb.feedback_id,fb.client_id,pi.first_name as pfirst,pi.last_name as plast,fb.visit_date,fb.your_apoinment1,fb.your_apoinment2,fb.your_apoinment3,fb.your_apoinment4,fb.our_staff1,fb.our_staff2,fb.our_staff3,fb.our_staff4,fb.our_comun1,fb.our_comun2,fb.our_comun3,fb.our_comun4,fb.our_comun5,fb.our_comun6,fb.our_comun7,fb.our_comun8,fb.our_comun9,fb.our_facility1,fb.our_facility2,fb.our_facility3,fb.satisfaction1,fb.satisfaction2,fb.satisfaction3,fb.total_rate,fb.recommend');
		    $this->db->from("feedback fb");
		    $this->db->join("tbl_patient_info pi", "fb.patient_id=pi.patient_id");
		}
		$query = $this->db->get();
		$config['total_rows'] = $query->num_rows();
		
		$search=str_replace('%20',' ',$this->uri->segment(4));
		$search1=str_replace('%20',' ',$this->uri->segment(5));
		$search2=str_replace('%20',' ',$this->uri->segment(6));
		if($search == 'date'){
			//$data['dateFilter'] = true;
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment(5))));
		   //echo $from;
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment(6))));
			//echo $to;
			$where_condition = "(visit_date >= '".$from."' AND visit_date <='".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
			$this->db->where($where_condition);
			$this->db->where('fb.client_id',$this->session->userdata('client_id'));
			$this->db->select('fb.feedback_id,fb.client_id,pi.first_name as pfirst,pi.last_name as plast,fb.visit_date,fb.your_apoinment1,fb.your_apoinment2,fb.your_apoinment3,fb.your_apoinment4,fb.our_staff1,fb.our_staff2,fb.our_staff3,fb.our_staff4,fb.our_comun1,fb.our_comun2,fb.our_comun3,fb.our_comun4,fb.our_comun5,fb.our_comun6,fb.our_comun7,fb.our_comun8,fb.our_comun9,fb.our_facility1,fb.our_facility2,fb.our_facility3,fb.satisfaction1,fb.satisfaction2,fb.satisfaction3,fb.total_rate,fb.recommend');
		    $this->db->from("feedback fb");
		  $this->db->join("tbl_patient_info pi", "fb.patient_id=pi.patient_id");
		  //$this->db->join("tbl_staff_info si", "fb.staff_id=si.staff_id");
		}
		else if($search1 == 'PatientName') {
			$this->db->where('pi.first_name',$search2);
			$this->db->where('fb.client_id',$this->session->userdata('client_id'));
			$this->db->select('fb.feedback_id,fb.client_id,pi.first_name as pfirst,pi.last_name as plast,fb.visit_date,fb.your_apoinment1,fb.your_apoinment2,fb.your_apoinment3,fb.your_apoinment4,fb.our_staff1,fb.our_staff2,fb.our_staff3,fb.our_staff4,fb.our_comun1,fb.our_comun2,fb.our_comun3,fb.our_comun4,fb.our_comun5,fb.our_comun6,fb.our_comun7,fb.our_comun8,fb.our_comun9,fb.our_facility1,fb.our_facility2,fb.our_facility3,fb.satisfaction1,fb.satisfaction2,fb.satisfaction3,fb.total_rate,fb.recommend');
		    $this->db->from("feedback fb");
		  $this->db->join("tbl_patient_info pi", "fb.patient_id=pi.patient_id");
		  //$this->db->join("tbl_staff_info si", "fb.staff_id=si.staff_id");
		
		}
		else if($search1 == 'MobileNo') {
			$this->db->where('pi.mobile_no',$search2);
			$this->db->where('fb.client_id',$this->session->userdata('client_id'));
			$this->db->select('pi.mobile_no,fb.feedback_id,fb.client_id,pi.first_name as pfirst,pi.last_name as plast,fb.visit_date,fb.your_apoinment1,fb.your_apoinment2,fb.your_apoinment3,fb.your_apoinment4,fb.our_staff1,fb.our_staff2,fb.our_staff3,fb.our_staff4,fb.our_comun1,fb.our_comun2,fb.our_comun3,fb.our_comun4,fb.our_comun5,fb.our_comun6,fb.our_comun7,fb.our_comun8,fb.our_comun9,fb.our_facility1,fb.our_facility2,fb.our_facility3,fb.satisfaction1,fb.satisfaction2,fb.satisfaction3,fb.total_rate,fb.recommend');
		    $this->db->from("feedback fb");
		  $this->db->join("tbl_patient_info pi", "fb.patient_id=pi.patient_id");
		  //$this->db->join("tbl_staff_info si", "fb.staff_id=si.staff_id");
		
		}
		else if($search1 == 'PatientId') {
			$this->db->where('pi.patient_id',$search2);
			$this->db->where('fb.client_id',$this->session->userdata('client_id'));
			$this->db->select('pi.patient_id,fb.feedback_id,fb.client_id,pi.first_name as pfirst,pi.last_name as plast,fb.visit_date,fb.your_apoinment1,fb.your_apoinment2,fb.your_apoinment3,fb.your_apoinment4,fb.our_staff1,fb.our_staff2,fb.our_staff3,fb.our_staff4,fb.our_comun1,fb.our_comun2,fb.our_comun3,fb.our_comun4,fb.our_comun5,fb.our_comun6,fb.our_comun7,fb.our_comun8,fb.our_comun9,fb.our_facility1,fb.our_facility2,fb.our_facility3,fb.satisfaction1,fb.satisfaction2,fb.satisfaction3,fb.total_rate,fb.recommend');
		    $this->db->from("feedback fb");
		  $this->db->join("tbl_patient_info pi", "fb.patient_id=pi.patient_id");
		  //$this->db->join("tbl_staff_info si", "fb.staff_id=si.staff_id");
		
		}
		else if($search1 == 'ReferedBy') {
			$this->db->where('pi.referal_name',$search2);
			$this->db->where('fb.client_id',$this->session->userdata('client_id'));
			$this->db->select('fb.feedback_id,fb.client_id,pi.referal_name,pi.first_name as pfirst,pi.last_name as plast,fb.visit_date,fb.your_apoinment1,fb.your_apoinment2,fb.your_apoinment3,fb.your_apoinment4,fb.our_staff1,fb.our_staff2,fb.our_staff3,fb.our_staff4,fb.our_comun1,fb.our_comun2,fb.our_comun3,fb.our_comun4,fb.our_comun5,fb.our_comun6,fb.our_comun7,fb.our_comun8,fb.our_comun9,fb.our_facility1,fb.our_facility2,fb.our_facility3,fb.satisfaction1,fb.satisfaction2,fb.satisfaction3,fb.total_rate,fb.recommend');
		    $this->db->from("feedback fb");
		  $this->db->join("tbl_patient_info pi", "fb.patient_id=pi.patient_id");
		  //$this->db->join("tbl_staff_info si", "fb.staff_id=si.staff_id");
		
		}
		else if($search1 == 'ProvisionalDiagnosis') {
			$this->db->where('pd.prov_diagnosis',$search2);
			$this->db->where('fb.client_id',$this->session->userdata('client_id'));
			$this->db->select('fb.feedback_id,fb.client_id,pi.referal_name,pd.prov_diagnosis,pd.patient_id,pi.first_name as pfirst,pi.last_name as plast,fb.visit_date,fb.your_apoinment1,fb.your_apoinment2,fb.your_apoinment3,fb.your_apoinment4,fb.our_staff1,fb.our_staff2,fb.our_staff3,fb.our_staff4,fb.our_comun1,fb.our_comun2,fb.our_comun3,fb.our_comun4,fb.our_comun5,fb.our_comun6,fb.our_comun7,fb.our_comun8,fb.our_comun9,fb.our_facility1,fb.our_facility2,fb.our_facility3,fb.satisfaction1,fb.satisfaction2,fb.satisfaction3,fb.total_rate,fb.recommend');
		    $this->db->from("feedback fb");
		  $this->db->join("tbl_patient_info pi", "fb.patient_id=pi.patient_id");
		  //$this->db->join("tbl_staff_info si", "fb.staff_id=si.staff_id");
		 $this->db->join("tbl_patient_prov_diagnosis pd", "pi.patient_id=pd.patient_id");
		}
		else {
			$this->db->where('fb.client_id',$this->session->userdata('client_id'));
			$this->db->select('pi.patient_id,pi.patient_code,pi.mobile_no,pi.referal_name,fb.feedback_id,fb.client_id,pi.first_name as pfirst,pi.last_name as plast,fb.visit_date,fb.your_apoinment1,fb.your_apoinment2,fb.your_apoinment3,fb.your_apoinment4,fb.our_staff1,fb.our_staff2,fb.our_staff3,fb.our_staff4,fb.our_comun1,fb.our_comun2,fb.our_comun3,fb.our_comun4,fb.our_comun5,fb.our_comun6,fb.our_comun7,fb.our_comun8,fb.our_comun9,fb.our_facility1,fb.our_facility2,fb.our_facility3,fb.satisfaction1,fb.satisfaction2,fb.satisfaction3,fb.total_rate,fb.recommend');
		    $this->db->from("feedback fb");
		  $this->db->join("tbl_patient_info pi", "fb.patient_id=pi.patient_id");
		  //$this->db->join("tbl_staff_info si", "fb.staff_id=si.staff_id");
		
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
	    $this->db->order_by('feedback_id','desc');
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
		$data['fb_record']=$query->result_array();
	   /*  $data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$data['patient_name']=$this->common_model->getPatientname();
		$data['mobile']=$this->common_model->get_mobile();
		$data['patient_code']=$this->common_model->getpatientid();
		$data['provDiagList']=$this->common_model->getProvdiagList();
		$data['name']=$this->common_model->get_referral(); */
		
	   //$data['invoice_record']=$this->common_model->getPatientname2();
		$this->load->view('client/feedback_view',$data); 
	} 
	
	
	public function add_feedback(){
		$data['page_name'] = 'feedback';
		if($query = $this->common_model->feedback_add())
				{
					$response['status']= 'success';
					$response['message'] = 'Feedback has been add successfully.';
				}
		 
		else{
			$response['status'] = 'failure';
			$response['message'] = 'Feedback Has Not Been Added successfully.';
		}
		
		echo json_encode($response);

	}
	 public function feedback_pr(){
		 $data['page_name'] = 'feedback';
		 $feedback_id = $this->uri->segment(4);
		 $data['feedbackinfo'] = $this->common_model->feedbackview($feedback_id);
		 $this->load->view('client/view_feedback',$data);	
	}
	public function export_feedback(){
		
		$this->load->library('export');
		$data['page_name'] = 'feedback';
		$segment_array = $this->uri->segment_array();
		
		//print_r($segment_array);
		$search=str_replace('%20',' ',$this->uri->segment(4));
		$search1=str_replace('%20',' ',$this->uri->segment(5));
		$search2=str_replace('%20',' ',$this->uri->segment(6));
		if($search == 'date'){
			//$data['dateFilter'] = true;
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment(5))));
		   //echo $from;
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment(6))));
			//echo $to;
			$where_condition = "(visit_date >= '".$from."' AND visit_date <='".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
			$this->db->where($where_condition);
			$this->db->where('pi.client_id',$this->session->userdata('client_id'));
			
			$this->db->select('si.first_name as sfirst,si.last_name as slast,pi.first_name as pfirst,pi.last_name as plast,fb.visit_date,fb.your_apoinment1,fb.your_apoinment2,fb.your_apoinment3,fb.your_apoinment4,fb.our_staff1,fb.our_staff2,fb.our_staff3,fb.our_staff4,fb.our_comun1,fb.our_comun2,fb.our_comun3,fb.our_comun4,fb.our_comun5,fb.our_comun6,fb.our_comun7,fb.our_comun8,fb.our_comun9,fb.our_facility1,fb.our_facility2,fb.our_facility3,fb.satisfaction1,fb.satisfaction2,fb.satisfaction3,fb.total_rate,fb.recommend');
		    $this->db->from("feedback fb");
		   $this->db->join("tbl_patient_info pi", "fb.patient_id=pi.patient_id");
		   $this->db->join("tbl_staff_info si", "fb.staff_id=si.staff_id");
		}
			else {
		    $this->db->select('si.first_name as sfirst,si.last_name as slast,pi.first_name as pfirst,pi.last_name as plast,fb.visit_date,fb.your_apoinment1,fb.your_apoinment2,fb.your_apoinment3,fb.your_apoinment4,fb.our_staff1,fb.our_staff2,fb.our_staff3,fb.our_staff4,fb.our_comun1,fb.our_comun2,fb.our_comun3,fb.our_comun4,fb.our_comun5,fb.our_comun6,fb.our_comun7,fb.our_comun8,fb.our_comun9,fb.our_facility1,fb.our_facility2,fb.our_facility3,fb.satisfaction1,fb.satisfaction2,fb.satisfaction3,fb.total_rate,fb.recommend');
		    $this->db->from("feedback fb");
		    $this->db->join("tbl_patient_info pi", "fb.patient_id=pi.patient_id");
		    $this->db->join("tbl_staff_info si", "fb.staff_id=si.staff_id");
		
		}
		
		$query=$this->db->get();
		$this->export->to_excel($query, 'feedback_report');
		
	} 
	public function feedback1(){
		$data['page_name'] = 'feedback';
		$data['patient_name']=$this->common_model->getPatientname();
		$this->load->view('client/new_feedback',$data);	
	}
	public function add_mobifeedback(){
		$data['page_name'] = 'feedback';
		if($query = $this->common_model->add_mobifeedback())
				{
					$response['status']= 'success';
					$response['message'] = 'Feedback has been add successfully.';
				}
		else{
			$response['status'] = 'failure';
			$response['message'] = 'Feedback Has Not Been Added successfully.';
		}
		
		echo json_encode($response);
	}  
	public function feedback_view1(){
		$data['page_name'] = 'feedback';
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		$config['per_page'] = 10;
		$current_page ='';
		$this->db->select('*')->from('tbl_mobifeedback');
		$this->db->distinct();
		$query = $this->db->get();
		$config['total_rows'] = $query->num_rows();
			$this->db->select('fb.date,pi.patient_id,pi.patient_code,pi.mobile_no,fb.feedback_id,pi.first_name as pfirst,pi.last_name as plast,fb.touch,fb.satisfactory,fb.reception');
		    $this->db->from("tbl_mobifeedback fb");
		    $this->db->join("tbl_patient_info pi", "fb.patient_id=pi.patient_id");
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
	    $this->db->order_by('feedback_id','desc');
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
		$data['fb_record']=$query->result_array();
	    $data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$data['patient_name']=$this->common_model->getPatientname();
		$data['mobile']=$this->common_model->get_mobile();
		$data['patient_code']=$this->common_model->getpatientid();
		$data['provDiagList']=$this->common_model->getProvdiagList();
		$data['name']=$this->common_model->get_referral();
		$this->load->view('client/mobifeedback_view',$data); 
	} 
	public function print_feedback(){
		 $data['page_name'] = 'feedback';
		 $feedback_id = $this->uri->segment(4);
		 $data['feedbackinfo'] = $this->common_model->mobi_feedbackview($feedback_id);
		 $this->load->view('client/print_feedback',$data);	
	}
	public function delete(){
		$data['page_name'] = 'feedback';
	   $result = $this->common_model->deletefeedback($_POST['p_id']);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		}
		echo json_encode($response);
		
	}
	
}