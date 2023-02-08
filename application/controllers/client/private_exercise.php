<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Private_exercise extends CI_Controller {
	public function __construct() {
		header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
		parent::__construct();
		// load required models
		$this->load->model(array('client'));
		$this->app_access->client(); // check access permission for owner
		//if( $this->app_access->is_client_logged_in() == true ) redirect( base_url() . 'client/patient/add_patient_info' );
		// user access
		if($this->session->userdata('user_login')) $this->app_access->user_privileges('Exercise');
		$this->load->model(array('exercise_model','mail_model','registration_model','patient_model'));
	}

 	public function _remap($method, $params = array())
	{
		if($this->session->userdata('duration') == 0 ||  $this->session->userdata('plan') < 3 ){
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
		{
			$data['page_name'] = 'dashboard';
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
		$data['page_name'] = 'exercises';
		$this->load->view('client/private_exercise',$data);
	}
	public function ex_upload(){
	  $data['page_name'] = 'exercises';
	  $this->load->view('client/private_exercise_up',$data);
    }
    public function ex_save(){
		   $this->load->model('common_model');
		  $success=$this->common_model->ex_save(); 
	   if($success == '') {
			$response['status'] = 'success';
			$response['message'] = 'Exercise  Has Been Added successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Exercise Has not Been Added successfully.';
		}
		echo json_encode($response);  
		
	  }
	public function private_ankle(){
		$data['page_name'] = 'exercises';
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 12;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
		
		$this->db->distinct();
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('count(*) as totalrows')->from('private_ankle');
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0'){
			   $this->db->where('t_position',str_replace('%20',' ',$this->uri->segment(6)));
			} if($this->uri->segment(7) != ''){
				$this->db->where('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		$this->db->distinct();
		
		$this->db->select('*');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0' && $this->uri->segment(6) != 'page'){
			   $this->db->where('t_position',str_replace('%20',' ',$this->uri->segment(6)));
			} if($this->uri->segment(7) != '' && $this->uri->segment(7) != 'page'){
				$this->db->like('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$this->db->from("private_ankle");
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
		$data['images'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		if($data['images'] == false && (isset($data['position']) || isset($data['dateFilter']))) {
			$data['showTable'] = true;
		} else if($data['images'] != false) {
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
		$config['next_link'] = 'Next &gt;';
		$config['prev_link'] = '&lt Previous';
		$config['last_link'] = 'Last &gt;&gt;';
		
		$config['base_url'] = site_url(join("/",$segment_array));
		$config['uri_segment'] = $current_page_segment;
		$this->pagination->initialize($config);
		$str_links = $this->pagination->create_links();	
		$data["links"] = explode('<li>',$str_links);
		$data['current_page_segment'] = $current_page_segment;
		$data['position'] = $this->exercise_model->ankle_position();
		$this->load->view('client/private_ankle',$data);
		
	}
	public function private_cervical(){
		$data['page_name'] = 'exercises';
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 12;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
		
		$this->db->distinct();
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('count(*) as totalrows')->from('private_cervical');
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0'){
			   $this->db->where('t_position',str_replace('%20',' ',$this->uri->segment(6)));;
			} if($this->uri->segment(7) != ''){
				$this->db->where('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		$this->db->distinct();
		
		$this->db->select('*');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0' && $this->uri->segment(6) != 'page'){
			   $this->db->where('t_position',str_replace('%20',' ',$this->uri->segment(6)));
			} if($this->uri->segment(7) != '' && $this->uri->segment(7) != 'page'){
				$this->db->like('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$this->db->from("private_cervical");
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
		$data['images'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		if($data['images'] == false && (isset($data['position']) || isset($data['dateFilter']))) {
			$data['showTable'] = true;
		} else if($data['images'] != false) {
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
		$config['next_link'] = 'Next &gt;';
		$config['prev_link'] = '&lt Previous';
		$config['last_link'] = 'Last &gt;&gt;';
		
		$config['base_url'] = site_url(join("/",$segment_array));
		$config['uri_segment'] = $current_page_segment;
		$this->pagination->initialize($config);
		$str_links = $this->pagination->create_links();	
		$data["links"] = explode('<li>',$str_links);
		$data['current_page_segment'] = $current_page_segment;
		$data['position'] = $this->exercise_model->cervical_position();
		$this->load->view('client/private_cervical',$data);
	}
	
	public function private_education(){
		$data['page_name'] = 'exercises';
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 12;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
		
		$this->db->distinct();
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('count(*) as totalrows')->from('private_education');
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0'){
			   $this->db->where('t_position',str_replace('%20',' ',$this->uri->segment(6)));
			} if($this->uri->segment(7) != ''){
				$this->db->where('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		$this->db->distinct();
		
		$this->db->select('*');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0' && $this->uri->segment(6) != 'page'){
			   $this->db->where('t_position',str_replace('%20',' ',$this->uri->segment(6)));
			} if($this->uri->segment(7) != '' && $this->uri->segment(7) != 'page'){
				$this->db->like('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$this->db->from("private_education");
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
		$data['images'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		if($data['images'] == false && (isset($data['position']) || isset($data['dateFilter']))) {
			$data['showTable'] = true;
		} else if($data['images'] != false) {
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
		$config['next_link'] = 'Next &gt;';
		$config['prev_link'] = '&lt Previous';
		$config['last_link'] = 'Last &gt;&gt;';
		
		$config['base_url'] = site_url(join("/",$segment_array));
		$config['uri_segment'] = $current_page_segment;
		$this->pagination->initialize($config);
		$str_links = $this->pagination->create_links();	
		$data["links"] = explode('<li>',$str_links);
		$data['current_page_segment'] = $current_page_segment;
		$data['position'] = $this->exercise_model->education_position();
		$this->load->view('client/private_education',$data);
	}
	
	public function private_elbow(){
		$data['page_name'] = 'exercises';
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 12;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
		
		$this->db->distinct();
		$this->db->select('count(*) as totalrows')->from('private_elbow');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0'){
			   $this->db->where('t_position',str_replace('%20',' ',$this->uri->segment(6)));
			} if($this->uri->segment(7) != ''){
				$this->db->where('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		$this->db->distinct();
		
		$this->db->select('*');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0' && $this->uri->segment(6) != 'page'){
			   $this->db->where('t_position',str_replace('%20',' ',$this->uri->segment(6)));
			} if($this->uri->segment(7) != '' && $this->uri->segment(7) != 'page'){
				$this->db->like('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$this->db->from("private_elbow");
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
		$data['images'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		if($data['images'] == false && (isset($data['position']) || isset($data['dateFilter']))) {
			$data['showTable'] = true;
		} else if($data['images'] != false) {
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
		$config['next_link'] = 'Next &gt;';
		$config['prev_link'] = '&lt Previous';
		$config['last_link'] = 'Last &gt;&gt;';
		
		$config['base_url'] = site_url(join("/",$segment_array));
		$config['uri_segment'] = $current_page_segment;
		$this->pagination->initialize($config);
		$str_links = $this->pagination->create_links();	
		$data["links"] = explode('<li>',$str_links);
		$data['current_page_segment'] = $current_page_segment;
		$data['position'] = $this->exercise_model->elbow_position();
		$this->load->view('client/private_elbow',$data);
	}
	public function private_hipknee(){
		$data['page_name'] = 'exercises';
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 12;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
		
		$this->db->distinct();
		$this->db->select('count(*) as totalrows')->from('private_hip');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0'){
			   $this->db->where('t_position',str_replace('%20',' ',$this->uri->segment(6)));
			} if($this->uri->segment(7) != ''){
				$this->db->where('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		$this->db->distinct();
		
		$this->db->select('*');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0' && $this->uri->segment(6) != 'page'){
			   $this->db->where('t_position',str_replace('%20',' ',$this->uri->segment(6)));
			} if($this->uri->segment(7) != '' && $this->uri->segment(7) != 'page'){
				$this->db->like('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$this->db->from("private_hip");
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
		$data['images'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		if($data['images'] == false && (isset($data['position']) || isset($data['dateFilter']))) {
			$data['showTable'] = true;
		} else if($data['images'] != false) {
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
		$config['next_link'] = 'Next &gt;';
		$config['prev_link'] = '&lt Previous';
		$config['last_link'] = 'Last &gt;&gt;';
		
		$config['base_url'] = site_url(join("/",$segment_array));
		$config['uri_segment'] = $current_page_segment;
		$this->pagination->initialize($config);
		$str_links = $this->pagination->create_links();	
		$data["links"] = explode('<li>',$str_links);
		$data['current_page_segment'] = $current_page_segment;
		$data['position'] = $this->exercise_model->hip_position();
		$this->load->view('client/private_hip',$data);
	}
	public function private_lumbar(){
		$data['page_name'] = 'exercises';
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 12;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
		
		$this->db->distinct();
		$this->db->select('count(*) as totalrows')->from('private_lumbar');
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0'){
			   $this->db->where('t_position',str_replace('%20',' ',$this->uri->segment(6)));
			} if($this->uri->segment(7) != ''){
				$this->db->where('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		$this->db->distinct();
		
		$this->db->select('*');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0' && $this->uri->segment(6) != 'page'){
			   $this->db->where('t_position',str_replace('%20',' ',$this->uri->segment(6)));
			} if($this->uri->segment(7) != '' && $this->uri->segment(7) != 'page'){
				$this->db->like('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$this->db->from("private_lumbar");
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
		$data['images'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		if($data['images'] == false && (isset($data['position']) || isset($data['dateFilter']))) {
			$data['showTable'] = true;
		} else if($data['images'] != false) {
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
		$config['next_link'] = 'Next &gt;';
		$config['prev_link'] = '&lt Previous';
		$config['last_link'] = 'Last &gt;&gt;';
		
		$config['base_url'] = site_url(join("/",$segment_array));
		$config['uri_segment'] = $current_page_segment;
		$this->pagination->initialize($config);
		$str_links = $this->pagination->create_links();	
		$data["links"] = explode('<li>',$str_links);
		$data['current_page_segment'] = $current_page_segment;
		$data['position'] = $this->exercise_model->lumbar_position();
		$this->load->view('client/private_lumbar',$data);
	}
	
	public function private_shoulder(){
		
		$data['page_name'] = 'exercises';
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 12;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
		
		$this->db->distinct();
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('count(*) as totalrows')->from('private_shoulder');
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0'){
			   $this->db->where('t_position',str_replace('%20',' ',$this->uri->segment(6)));
			} if($this->uri->segment(7) != ''){
				$this->db->where('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		$this->db->distinct();
		
		$this->db->select('*');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0' && $this->uri->segment(6) != 'page'){
			   $this->db->like('t_position',str_replace('%20',' ',$this->uri->segment(6)));
			} if($this->uri->segment(7) != '' && $this->uri->segment(7) != 'page'){
				$this->db->like('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$this->db->from("private_shoulder");
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
		$data['images'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		if($data['images'] == false && (isset($data['position']) || isset($data['dateFilter']))) {
			$data['showTable'] = true;
		} else if($data['images'] != false) {
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
		$config['next_link'] = 'Next &gt;';
		$config['prev_link'] = '&lt Previous';
		$config['last_link'] = 'Last &gt;&gt;';
		
		$config['base_url'] = site_url(join("/",$segment_array));
		$config['uri_segment'] = $current_page_segment;
		$this->pagination->initialize($config);
		$str_links = $this->pagination->create_links();	
		$data["links"] = explode('<li>',$str_links);
		$data['current_page_segment'] = $current_page_segment;
		$data['position'] = $this->exercise_model->shoulder_position();
		$this->load->view('client/private_shoulder',$data);
	}
	public function private_special(){
		$data['page_name'] = 'exercises';
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 12;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
		
		$this->db->distinct();
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('count(*) as totalrows')->from('private_special');
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0'){
			   $this->db->where('t_position',str_replace('%20',' ',$this->uri->segment(6)));
			} if($this->uri->segment(7) != ''){
				$this->db->where('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		$this->db->distinct();
		
		$this->db->select('*');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0' && $this->uri->segment(6) != 'page'){
			   $this->db->where('t_position',str_replace('%20',' ',$this->uri->segment(6)));
			} if($this->uri->segment(7) != '' && $this->uri->segment(7) != 'page'){
				$this->db->like('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$this->db->from("private_special");
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
		$data['images'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		if($data['images'] == false && (isset($data['position']) || isset($data['dateFilter']))) {
			$data['showTable'] = true;
		} else if($data['images'] != false) {
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
		$config['next_link'] = 'Next &gt;';
		$config['prev_link'] = '&lt Previous';
		$config['last_link'] = 'Last &gt;&gt;';
		
		$config['base_url'] = site_url(join("/",$segment_array));
		$config['uri_segment'] = $current_page_segment;
		$this->pagination->initialize($config);
		$str_links = $this->pagination->create_links();	
		$data["links"] = explode('<li>',$str_links);
		$data['current_page_segment'] = $current_page_segment;
		$data['position'] = $this->exercise_model->special_position();
		$this->load->view('client/private_special',$data);
	}
	

	public function editorchart()
	{
		//$data['page_name'] = 'Chart List';
		$data['page_name'] = 'exercises';
		$this->load->view('client/charteditor',$data);
	}
	
	public function save_privatechart() {
		$data['page_name']='exercises';
		$data['chard_no'] = $this->uri->segment(4);
		$data['chartname']= $this->uri->segment(5);
		$data['verifycode']= $this->uri->segment(6);
		$data['status']= 'private';
		$client_id = $this->session->userdata('client_id');
		$data['patient_name']=$this->common_model->getPatientname();
		$this->load->view('client/save_chart',$data);	
	}
	public function add_chart()
	{
		$chartname = $this->input->post('chartname');
		$chart_no = $this->input->post('chard_no');
		$pay = $this->input->post('pay');
		$amt = $this->input->post('amt');
		$name = $this->input->post('name');
		$status = $this->input->post('status');
		$pat_name = explode('/',$name);
		$client_id = $this->session->userdata('client_id');
		$clinic_name = $this->session->userdata('clinic_name');
		$patient_id = $pat_name[1];
		$patient_name = $pat_name[0];
		$client_mail = $pat_name[2]; 
		$verifycode = $this->input->post('verify');
		$url = base_url().'pages/pdf_verification/'.$pay.'/'.$client_id.'/'.$patient_id.'/'.$status.'-'.$verifycode;
		$pdfMessage = $this->mail_model->exespdftemplate($url,$verifycode,$status);
		$adminMailConfig = array('to' => $client_mail, 'subject' => 'Exercise Chart From' .' '.$clinic_name , 'message' => $pdfMessage);
		$result = $this->mail_model->sendPDF($adminMailConfig); 
		if($status == 'public'){
		    $result = $this->patient_model->add_chart($pat_name,$chart_no,$chartname);		
		} else {
			$result = $this->patient_model->add_privatechart($pat_name,$chart_no,$chartname);		
		}
		$exe = $this->input->post('ex_sta');
		if($exe == 1)  
		{
			$result = $this->patient_model->update_exe($patient_id);
		
		}
		$result = $this->patient_model->add_chart_detail($pat_name,$chart_no,$chartname,$status,$amt,$pay);
			
		$profile_info = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$sms_count = $profile_info['sms_count'];
		$sms_limit = $profile_info['total_sms_limit'];
		if($sms_count < $sms_limit || $client_id == '1636')
	    {
			$this->exercise_model->send_sms($patient_name,$chartname,$patient_id,$client_id);
		}
		if($result)
		{
			$response['status'] = 'success';
			$response['message'] = 'Referal notification has been sent successfully.';
		}
		else
		{
			$response['status'] = 'failure';
			$response['flashData'] = 'Referal notification has been sent successfully.';
		}
	  
		echo json_encode($response);  
	
	}
	public function editchart(){
		$data['page_name']='exercises';
		$chart_no = $this->uri->segment(4);
		$data['chart_det']=$this->exercise_model->getcharts($chart_no);
		$data['privatechart_det']=$this->exercise_model->get_privatecharts($chart_no);
		$this->load->view('client/editchart',$data);
	}
	public function saveeditchart1(){
		$chart_no = $this->input->post('chartno');
		$this->exercise_model->savechage1($chart_no);
	}
	
	public function ex_list(){  
		$data['page_name'] = 'exercises';
		$data['ankle']=$this->exercise_model->getprivate_ankle();
		$data['cervical']=$this->exercise_model->getprivate_cervical();
		$data['education']=$this->exercise_model->getprivate_education();
		$data['elbow']=$this->exercise_model->getprivate_elbow();
		$data['hip']=$this->exercise_model->getprivate_hip();
		$data['lumbar']=$this->exercise_model->getprivate_lumbar();
		$data['shoulder']=$this->exercise_model->getprivate_shoulder();
		$data['special']=$this->exercise_model->getprivate_special();
		$this->load->view('client/ex_list',$data);
	}
	public function ankle_delete(){
		$data['page_name'] = 'exercises';
		$this->exercise_model->ankle_delete($_POST['p_id']);
		
	}
	public function cervical_delete(){
		$data['page_name'] ='exercises';
		$this->exercise_model->cervical_delete($_POST['p_id']);
	}
	
	public function education_delete(){
		$data['page_name'] ='exercises';
		$this->exercise_model->education_delete($_POST['p_id']);
	}
	public function elbow_delete(){
		$data['page_name'] ='exercises';
		$this->exercise_model->elbow_delete($_POST['p_id']);
	}
	public function hip_delete(){
		$data['page_name'] ='exercises';
		$this->exercise_model->hip_delete($_POST['p_id']);
	}
	public function lumbar_delete(){
		$data['page_name'] ='exercises';
		$this->exercise_model->lumbar_delete($_POST['p_id']);
	}
	public function shoulder_delete(){
		$data['page_name'] ='exercises';
		$this->exercise_model->shoulder_delete($_POST['p_id']);
	}
	public function special_delete(){
		$data['page_name'] ='exercises';
		$this->exercise_model->special_delete($_POST['p_id']);
	}
	
	
} 
?>