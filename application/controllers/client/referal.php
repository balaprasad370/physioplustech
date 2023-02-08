<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Referal extends CI_Controller {

	public function __construct() {
		header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
		parent::__construct();
		$this->app_access->client();
		$this->load->model(array('referal_model','common_model'));
		
	}
	public function _remap($method, $params = array())
			{
			if($this->session->userdata('duration') == 0 ||  $this->session->userdata('plan') < 0 ){  
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
	public function index(){
		$data['page_name'] = 'referal';
		$data['referal_type']=$this->common_model->getReferaltype();
		$data['specialists']=$this->common_model->getReferalspecialist();
		$this->load->view('client/referal_add',$data);
	}
	
	
	
	public function location_one()
	{
		$data['page_name'] = 'location';
		$locationCount = $this->location_model->getLocationCount();
		$noOfLocations = $this->common_model->noOfLocationsPlan1();
		if($locationCount < $noOfLocations)
		{
 		   $data['page_name'] = 'location';
           $this->load->view('client/location_add',$data);
		} else {
			redirect(base_url().'/client/account/index', 'refresh');
		}
	}
	public function add_referal(){
		$response=array();
		$result = $this->referal_model->referal_info();
		if($result != '')
		{			
			$response['status'] = 'success';
			$response['message'] = 'Referal Has Been Added successfully.';
		}
		else{
			$response['status'] = 'error';
			$response['message'] = 'Referal Has Been Added successfully.';
		}
		echo json_encode($response); 
	}
	public function add_specialist(){
		$response=array();
		$result = $this->referal_model->referal_specialist_info($_POST['s_name']);
		if($result != '')
		{			
			$response['status'] = 'success';
			$response['message'] = 'Referal Has Been Added successfully.';
			$response['specialData'] = $result;
		}
		else{
			$response['status'] = 'Failure';
			$response['message'] = 'Referal Has Been Added successfully.';
		}
		echo json_encode($response);
	}
	public function view_referal() {
		$data['page_name'] = 'referal';
		$data['patients'] = $this->referal_model->patientsCount();
		$data['others'] = $this->referal_model->othersCount();
		$data['adv'] = $this->referal_model->advCount();
		$data['website'] = $this->referal_model->websiteCount();
		$data['insurance'] = $this->referal_model->insuranceCount();
		$data['doctors'] = $this->referal_model->doctorsCount();
		$this->load->view('client/referal_view',$data); 
	}
	public function doctor_referalview() {
		$data['page_name'] = 'referal';
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 10;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
		//Count
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('count(*) as totalrows')->from('tbl_referal');
		$this->db->where('referal_type_id','1');
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
			
		//prepare active record for new query (with limit/offeset/orderby)
		
		$this->db->distinct();
		$this->db->where('ti.client_id',$this->session->userdata('client_id'));
		$this->db->select('ti.address_line1,ti.referal_name,ti.org_name,ti.referal_id,si.specialist_name');
		$this->db->from("tbl_referal ti");
		$this->db->join("tbl_referal_specialist si", "ti.specialist_id = si.specialist_id");
		$this->db->where('ti.referal_type_id','1');
		$this->db->order_by('ti.referal_id','desc');
		
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
		$this->db->where('ti.client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		$data['referals'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		
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
		
		$this->db->select('*')->from('tbl_referal_specialist');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->order_by('specialist_id','desc');
		$res=$this->db->get();
		$data['result'] = ($res->num_rows() > 0) ? $res->result_array() : false;
		
		$this->load->view('client/referal_doctorview',$data);
		
	}
	public function insurnce_referalview() {
		$data['page_name'] = 'referal';
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 10;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
		//Count
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('count(*) as totalrows')->from('tbl_referal');
		$this->db->where('referal_type_id','6');
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
			
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->distinct();
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('address_line1,referal_name,org_name,referal_id');
		$this->db->from("tbl_referal");
		$this->db->where('referal_type_id','6');
		$this->db->order_by('referal_id','desc');
		
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
		$data['referals'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		
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
		$this->load->view('client/referal_insuranceview',$data); 
	}
	public function patients_referalview() {
		$data['page_name'] = 'referal';
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 10;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
		//Count
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('count(*) as totalrows')->from('tbl_referal');
		$this->db->where('referal_type_id','5');
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
			
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->distinct();
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('referal_id,referal_name');
		$this->db->from("tbl_referal");
		$this->db->where('referal_type_id','5');
		//$this->db->group_by('referal_type_id');
		
		
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
		$data['referals'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		
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
		$this->load->view('client/referal_patientview',$data);
		
	}
	public function Others_referalview() {
		$data['page_name'] = 'referal';
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 10;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
		//Count
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('count(*) as totalrows')->from('tbl_referal');
		$this->db->where('referal_type_id','4');
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
			
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->distinct();
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('referal_oth_name,referal_id');
		$this->db->from("tbl_referal");
		$this->db->where('referal_type_id','4');
		$this->db->order_by('referal_id','desc');
		
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
		$data['referals'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		
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
		$this->load->view('client/referal_otherview',$data); 
	}
	public function adv_referalview() {
		$data['page_name'] = 'referal';
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 10;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
		//Count
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('count(*) as totalrows')->from('tbl_referal');
		$this->db->where('referal_type_id','3');
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
			
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->distinct();
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('location_of_adv,adv_name,referal_id');
		$this->db->from("tbl_referal");
		$this->db->where('referal_type_id','3');
		$this->db->order_by('referal_id','desc');
		
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
		$data['referals'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		
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
		$this->load->view('client/referal_advview',$data);
	}
	public function website_referalview() {
		$data['page_name'] = 'referal';
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 10;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
		//Count
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('count(*) as totalrows')->from('tbl_referal');
		$this->db->where('referal_type_id','2');
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
			
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->distinct();
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('website_name,referal_id');
		$this->db->from("tbl_referal");
		$this->db->where('referal_type_id','2');
		$this->db->order_by('referal_id','desc');
		
		
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
		$data['referals'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		
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
		$this->load->view('client/referal_websiteview',$data); 
	}
	public function edit_other() {
		$data['page_name'] = 'referal';
		$seg = $this->uri->segment(4);
		$data['seg'] = $this->uri->segment(4);
		$data['specialists']=$this->common_model->getReferalspecialist();
		$data['result'] = $this->referal_model->edit_referal($seg);
		$this->load->view('client/edit_referal',$data);
	}
	public function edit_referal() {
		
		$response=array();
		
		$result = $this->referal_model->update();
		if($result == '')
		{			
			$response['status'] = 'success';
			$response['message'] = 'Referal Has Been Added successfully.';
		}
		else{
			$response['status'] = 'success';
			$response['message'] = 'Referal Has Been Added successfully.';
		}
		echo json_encode($response);
	}
	public function delete()
	{
		$result = $this->referal_model->delete_referal($_POST['r_id']);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		}
		echo json_encode($response);
	}
	public function referal_details(){
		$response=array();
		$result = $this->referal_model->referal_details($_POST['ref_id']);
		$data['referalData'] = $result; 
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
	public function referal_reports(){
		$this->load->view('client/referal_reports');
	}
	public function add_group(){
		$response=array();
		$result = $this->referal_model->add_group($_POST['value']);
		if($result != '')
		{			
			$response['status'] = 'success';
			$response['message'] = 'Referal Has Been Added successfully.';
			$response['specialData'] = $result;
		}
		else{
			$response['status'] = 'Failure';
			$response['message'] = 'Referal Has Been Added successfully.';
		}
		echo json_encode($response);
	}



     public function edit_specialist() {
		$data['page_name'] = 'referal';
		$id = $this->uri->segment(4);
		$data['result'] = $this->referal_model->edit_specialist($id);
		$this->load->view('client/edit_specialist',$data);
	}

    public function specialist_update() {
		
		$response=array();
		
		$result = $this->referal_model->specialist_update();
		if($result == '')
		{			
			$response['status'] = 'success';
			$response['message'] = 'Referal Has Been Added successfully.';
		}
		else{
			$response['status'] = 'success';
			$response['message'] = 'Referal Has Been Added successfully.';
		}
		echo json_encode($response);
	}
	public function specialist_delete() {
		
		$response=array();
		
		$result = $this->referal_model->specialist_delete();
		if($result == '')
		{			
			$response['status'] = 'success';
			$response['message'] = 'Speciality Has Been deleted successfully.';
		}
		else{
			$response['status'] = 'success';
			$response['message'] = 'Speciality Has Been deleted successfully.';
		}
		echo json_encode($response);
	}




























	
	
}

