<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exercise extends CI_Controller {
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
	public function public_edit(){
		$data['page_name']='exercises';
		$chart_no = $this->uri->segment(4);
		$data['chart_det']=$this->exercise_model->getcharts($chart_no);
		$this->load->view('client/chart_edit',$data);
	}
	public function ankle(){
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
		$this->db->select('count(*) as totalrows')->from('physio_ankle');
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0'){
			   $this->db->where('position',$this->uri->segment(6));
			} if($this->uri->segment(7) != ''){
				$this->db->where('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		$this->db->distinct();
		
		$this->db->select('*');
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0' && $this->uri->segment(6) != 'page'){
			   $this->db->where('position',$this->uri->segment(6));
			} if($this->uri->segment(7) != '' && $this->uri->segment(7) != 'page'){
				$this->db->like('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$this->db->from("physio_ankle");
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
		$this->load->view('client/ankle',$data);
		
	}
	public function cervical(){
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
		$this->db->select('count(*) as totalrows')->from('physio_cervical');
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0'){
			   $this->db->where('position',$this->uri->segment(6));
			} if($this->uri->segment(7) != ''){
				$this->db->where('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		$this->db->distinct();
		
		$this->db->select('*');
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0' && $this->uri->segment(6) != 'page'){
			   $this->db->where('position',$this->uri->segment(6));
			} if($this->uri->segment(7) != '' && $this->uri->segment(7) != 'page'){
				$this->db->like('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$this->db->from("physio_cervical");
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
		$this->load->view('client/cervical',$data);
	}
	
	public function education(){
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
		$this->db->select('count(*) as totalrows')->from('physio_education');
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0'){
			   $this->db->where('position',$this->uri->segment(6));
			} if($this->uri->segment(7) != ''){
				$this->db->where('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		$this->db->distinct();
		
		$this->db->select('*');
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0' && $this->uri->segment(6) != 'page'){
			   $this->db->where('position',$this->uri->segment(6));
			} if($this->uri->segment(7) != '' && $this->uri->segment(7) != 'page'){
				$this->db->like('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$this->db->from("physio_education");
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
		$this->load->view('client/education',$data);
	}
	
	public function elbow(){
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
		$this->db->select('count(*) as totalrows')->from('physio_elbow');
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0'){
			   $this->db->where('position',$this->uri->segment(6));
			} if($this->uri->segment(7) != ''){
				$this->db->where('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		$this->db->distinct();
		
		$this->db->select('*');
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0' && $this->uri->segment(6) != 'page'){
			   $this->db->where('position',$this->uri->segment(6));
			} if($this->uri->segment(7) != '' && $this->uri->segment(7) != 'page'){
				$this->db->like('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$this->db->from("physio_elbow");
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
		$this->load->view('client/elbow',$data);
	}
	public function hipknee(){
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
		$this->db->select('count(*) as totalrows')->from('physio_hipknee');
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0'){
			   $this->db->where('position',$this->uri->segment(6));
			} if($this->uri->segment(7) != ''){
				$this->db->where('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		$this->db->distinct();
		
		$this->db->select('*');
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0' && $this->uri->segment(6) != 'page'){
			   $this->db->where('position',$this->uri->segment(6));
			} if($this->uri->segment(7) != '' && $this->uri->segment(7) != 'page'){
				$this->db->like('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$this->db->from("physio_hipknee");
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
		$this->load->view('client/hipknee',$data);
	}
	public function lumbarthoracic(){
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
		$this->db->select('count(*) as totalrows')->from('physio_lumbar');
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0'){
			   $this->db->where('position',$this->uri->segment(6));
			} if($this->uri->segment(7) != ''){
				$this->db->where('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		$this->db->distinct();
		
		$this->db->select('*');
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0' && $this->uri->segment(6) != 'page'){
			   $this->db->where('position',$this->uri->segment(6));
			} if($this->uri->segment(7) != '' && $this->uri->segment(7) != 'page'){
				$this->db->like('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$this->db->from("physio_lumbar");
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
		$this->load->view('client/lumbar',$data);
	}
	
	public function shoulder(){
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
		$this->db->select('count(*) as totalrows')->from('physio_shoulder');
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0'){
			   $this->db->where('position',$this->uri->segment(6));
			} if($this->uri->segment(7) != ''){
				$this->db->where('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		$this->db->distinct();
		
		$this->db->select('*');
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0' && $this->uri->segment(6) != 'page'){
			   $this->db->where('position',$this->uri->segment(6));
			} if($this->uri->segment(7) != '' && $this->uri->segment(7) != 'page'){
				$this->db->like('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$this->db->from("physio_shoulder");
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
		$this->load->view('client/shoulder',$data);
	}
	
	public function special(){
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
		$this->db->select('count(*) as totalrows')->from('physio_special');
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0'){
			   $this->db->where('position',$this->uri->segment(6));
			} if($this->uri->segment(7) != ''){
				$this->db->where('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		$this->db->distinct();
		
		$this->db->select('*');
		if($this->uri->segment(4)== 'search'){
			if($this->uri->segment(5) != '0'){
			   $this->db->where('category',$this->uri->segment(5));
			} if($this->uri->segment(6) != '0' && $this->uri->segment(6) != 'page'){
			   $this->db->where('position',$this->uri->segment(6));
			} if($this->uri->segment(7) != '' && $this->uri->segment(7) != 'page'){
				$this->db->like('title',str_replace('%20',' ',$this->uri->segment(7)));
			}
		}
		$this->db->from("physio_special");
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
		$this->load->view('client/special',$data);
	}
	public function public_exercise(){
		if($this->uri->segment(4) != false){
			$data = array(
			'chart_name' => $this->uri->segment(4),
			);
			$this->session->set_userdata($data);
		} 
		$data['page_name'] = 'exercises';
		$this->load->view('client/public_exercise',$data);
	}
   public function private_exercise(){
		$data['page_name'] = 'exercises';
		$this->load->view('client/private_exercise',$data);
	}

	public function editorchart()
	{
		//$data['page_name'] = 'Chart List';
		$data['page_name'] = 'exercises';
		$this->load->view('client/charteditor',$data);
	}
	public function chartlist() {
		$data['page_name'] = 'exercises';
		$this->load->library("pagination");
		
		$segment_array = $this->uri->segment_array();
		$config['per_page'] =10;
		$current_page ='';
		$search=str_replace('%20',' ',$this->uri->segment(4));
		$search1=str_replace('%20',' ',$this->uri->segment(5));
		$search2=str_replace('%20',' ',$this->uri->segment(6));
		if($search == 'date'){
			$data['dateFilter'] = true;
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment(5))));
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment(6))));
			$where_condition = "(ex_date >= '".$from."' AND ex_date <= '".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
			$this->db->where($where_condition);
			$this->db->select('*');
			$this->db->from("prescription_detail");
			$this->db->order_by("chart_id", "desc");
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
		else if($search1 == 'ChartName') {
			$this->db->where('chartname',$search2);
			$this->db->select('*');
			$this->db->from("prescription_detail");
			$this->db->order_by("chart_id", "desc");
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
		else if($search1 == 'PatientName') {
			$this->db->where('patient_id',$search2);
			$this->db->select('*');
			$this->db->from("prescription_detail");
			$this->db->order_by("chart_id", "desc");
			$this->db->where('client_id',$this->session->userdata('client_id'));
		} else {
			$this->db->select('*');
			$this->db->from("prescription_detail");
			$this->db->order_by("chart_id", "desc");
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
		$query = $this->db->get();
		$config['total_rows'] = $query->num_rows();
		$search=str_replace('%20',' ',$this->uri->segment(4));
		$search1=str_replace('%20',' ',$this->uri->segment(5));
		$search2=str_replace('%20',' ',$this->uri->segment(6));
		if($search == 'date'){
			$data['dateFilter'] = true;
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment(5))));
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment(6))));
			$where_condition = "(ex_date >= '".$from."' AND ex_date <= '".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
			$this->db->where($where_condition);
			$this->db->select('*');
			$this->db->from("prescription_detail");
			$this->db->order_by("chart_id", "desc");
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
		else if($search1 == 'ChartName') {
			$this->db->where('chartname',$search2);
			$this->db->select('*');
			$this->db->from("prescription_detail");
			$this->db->order_by("chart_id", "desc");
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
		else if($search1 == 'PatientName') {
			$this->db->where('patient_id',$search2);
			$this->db->select('*');
			$this->db->from("prescription_detail");
			$this->db->order_by("chart_id", "desc");
			$this->db->where('client_id',$this->session->userdata('client_id'));
		} else {
			$this->db->select('*');
			$this->db->from("prescription_detail");
			$this->db->order_by("chart_id", "desc");
			$this->db->where('client_id',$this->session->userdata('client_id'));
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
		$this->db->where('client_id',$this->session->userdata('client_id'));		
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
		$data['result']=$query->result_array();
		
		$segment_array = $this->uri->segment_array();  
		$config['per_page'] =10;
		$current_page ='';
		$info_search = array(
			'Public_chart' => 'chard_no',
			
		);
		
		$this->db->select('chard_no')->from('save_chart')->where('client_id',$this->session->userdata('client_id'));
		$this->db->distinct();
		$this->db->order_by("chart_id", "desc");
		$query = $this->db->get();
		$config['total_rows'] = $query->num_rows();
		$this->db->select('chard_no,verifycode,chart_name');
		$this->db->from("save_chart");
		$this->db->order_by("chart_id", "desc");
		$this->db->distinct();
		$this->db->where('client_id',$this->session->userdata('client_id'));
		
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
		$data['chartlist']=$query->result_array();
		$data['ex_chart'] = $this->exercise_model->get_list();
		
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		$config['per_page'] =10;
		$current_page ='';
		$this->db->select('chard_no')->from('save_privatechart')->where('client_id',$this->session->userdata('client_id'));
		$this->db->distinct();
		$this->db->order_by("chart_id", "desc");
		$query = $this->db->get();
		$config['total_rows'] = $query->num_rows();
		$this->db->select('chard_no,verifycode,chart_name');
		$this->db->from("save_privatechart");
		$this->db->order_by("chart_id", "desc");
		$this->db->distinct();
		
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
		$this->db->where('client_id',$this->session->userdata('client_id'));
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
				
		$this->db->select('chard_no,chart_name');
		$this->db->from("default_chart");
		$this->db->order_by("chart_id", "desc");
		$this->db->distinct();
		$query=$this->db->get();
		$data['default_chart']=$query->result_array();
		$this->load->view('client/chartlist',$data);
	}
	public function saveloadchart(){
		$result = $this->exercise_model->saveloadchart();
		if($result == ''){
			$response['status'] = 'Success';
			$response['message'] = 'Chart has been added successfully.';
		
		}else {
			$response['status'] = 'failure';
			$response['message'] = 'chart has not been added successfully.';
		}
		echo json_encode($response);
		redirect(base_url().'client/exercise/chartlist', 'refresh'); 
	}
	
	public function exercise_delete() {
		$this->exercise_model->delete_chart($_POST['p_id']);
		redirect(base_url().'client/exercise/chartlist', 'refresh'); 
	}
	public function exportPdf(){
			$data['page_name']='exercises';
			$html = $this->load->view("client/chart_pdf",$data,TRUE);
			$this->load->library('mpdf53/mpdf');
			 $this->mpdf=new mPDF('','A4','16','Calibri (Body)',15,15,16,16,9,9);
			$this->mpdf->SetDisplayMode('fullpage');
			$this->mpdf->list_indent_first_level = 0; 
			$stylesheet = file_get_contents('mpdfstyletables.css');
			$this->mpdf->WriteHTML($stylesheet,0);
			$this->mpdf->WriteHTML($html,2);
			$this->mpdf->SetFooter('Disclaimer:  This chart is not transferable,we do not hold any responsibility for consequences.  Powerd By : Physio Plus Tech.com');
			$this->mpdf->Output('Physioexexercise.pdf','I');   
		    //$this->load->view('client/chart_pdf',$data);
    }
	public function default_exportPdf(){
			$data['page_name']='exercises';
			$html=$this->load->view("client/default_chart_pdf",$data,TRUE);
			$this->load->library('mpdf53/mpdf');
			$this->mpdf=new mPDF('','A4','16','Calibri (Body)',15,15,16,16,9,9);
			$this->mpdf->SetDisplayMode('fullpage');
			$this->mpdf->list_indent_first_level = 0; 
			$stylesheet = file_get_contents('mpdfstyletables.css');
			$this->mpdf->WriteHTML($stylesheet,0);
			$this->mpdf->WriteHTML($html,2);
			$this->mpdf->SetFooter('Disclaimer:  This chart is not transferable,we do not hold any responsibility for consequences.  Powerd By : Physio Plus Tech.com');
			$this->mpdf->Output('Physioexexercise.pdf','I');  
		$this->load->view('client/default_chart_pdf',$data);
    }
	public function save_chart() {
		 $data['page_name']='exercises';
		$data['chard_no'] = $this->uri->segment(4);
		$data['chartname']= $this->uri->segment(5);
		$data['verifycode']= $this->uri->segment(6);
		$data['status']= 'public';
		
		$client_id = $this->session->userdata('client_id');
		$data['patient_name']=$this->common_model->getPatientname();
		$this->load->view('client/save_chart',$data);	
	 }
	 
	 public function default_savechart() {
		 $data['page_name']='exercises';
		$data['chard_no'] = $this->uri->segment(4);
		$data['chartname']= $this->uri->segment(5);
		$data['verifycode']= $this->uri->segment(6);
		$data['status']= 'public';
		
		$client_id = $this->session->userdata('client_id');
		$data['patient_name']=$this->common_model->getPatientname();
		$this->load->view('client/default_savechart',$data);	
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
		$info = base_url().'pages/pdf_verification/'.$pay.'/'.$client_id.'/'.$patient_id.'/'.$status.'-'.$verifycode;
		$pdfMessage = $this->mail_model->exespdftemplate($info,$verifycode,$status,$client_id);
		$adminMailConfig = array('clinic'=>$clinic_name, 'to' => $client_mail, 'subject' => 'Exercise Chart From' .' '.$clinic_name , 'message' => $pdfMessage);
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
	
	public function default_add_chart()
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
		$url = base_url().'pages/default_pdf_verification/'.$pay.'/'.$client_id.'/'.$patient_id.'/'.$status.'-'.$verifycode;
		$pdfMessage = $this->mail_model->exespdftemplate_default($url,$verifycode,$status,$client_id);
		$adminMailConfig = array('clinic'=>$clinic_name, 'to' => $client_mail, 'subject' => 'Exercise Chart From' .' '.$clinic_name , 'message' => $pdfMessage);
		$result = $this->mail_model->sendPDF($adminMailConfig); 
		if($status == 'public'){
		    $result = $this->patient_model->dadd_chart($pat_name,$chart_no,$chartname);		
		} else {
			$result = $this->patient_model->dadd_chart($pat_name,$chart_no,$chartname);		
		}
		
		$exe = $this->input->post('ex_sta');
		if($exe == 1)  
		{
			$result = $this->patient_model->update_exe($patient_id);
		
		}
		$result = $this->patient_model->default_add_chart($pat_name,$chart_no,$chartname,$status,$amt,$pay);
			
		
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
		$this->load->view('client/publiceditchart',$data);
	}
	public function saveeditchart(){
		$chart_no = $this->input->post('chartno');
		$this->exercise_model->savechage($chart_no);
	}
	public function exercise_chartlist(){
		$data['page_name'] = 'exercises';
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		$config['per_page'] =10;
		$current_page ='';
		$search=str_replace('%20',' ',$this->uri->segment(4));
		$search1=str_replace('%20',' ',$this->uri->segment(5));
		$search2=str_replace('%20',' ',$this->uri->segment(6));
		if($search == 'date'){
			$data['dateFilter'] = true;
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment(5))));
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment(6))));
			$where_condition = "(ex_date >= '".$from."' AND ex_date <= '".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
			$this->db->where($where_condition);
			$this->db->select('*');
			$this->db->from("prescription_detail");
			$this->db->order_by("chart_id", "desc");
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
		else if($search1 == 'ChartName') {
			$this->db->where('chartname',$search2);
			$this->db->select('*');
			$this->db->from("prescription_detail");
			$this->db->order_by("chart_id", "desc");
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
		else if($search1 == 'PatientName') {
			$this->db->where('patient_id',$search2);
			$this->db->select('*');
			$this->db->from("prescription_detail");
			$this->db->order_by("chart_id", "desc");
			$this->db->where('client_id',$this->session->userdata('client_id'));
		} else {
			$this->db->select('*');
			$this->db->from("prescription_detail");
			$this->db->order_by("chart_id", "desc");
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
		$query = $this->db->get();
		$config['total_rows'] = $query->num_rows();
		$search=str_replace('%20',' ',$this->uri->segment(4));
		$search1=str_replace('%20',' ',$this->uri->segment(5));
		$search2=str_replace('%20',' ',$this->uri->segment(6));
		if($search == 'date'){
			$data['dateFilter'] = true;
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment(5))));
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment(6))));
			$where_condition = "(ex_date >= '".$from."' AND ex_date <= '".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
			$this->db->where($where_condition);
			$this->db->select('*');
			$this->db->from("prescription_detail");
			$this->db->order_by("chart_id", "desc");
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
		else if($search1 == 'ChartName') {
			$this->db->where('chartname',$search2);
			$this->db->select('*');
			$this->db->from("prescription_detail");
			$this->db->order_by("chart_id", "desc");
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
		else if($search1 == 'PatientName') {
			$this->db->where('patient_id',$search2);
			$this->db->select('*');
			$this->db->from("prescription_detail");
			$this->db->order_by("chart_id", "desc");
			$this->db->where('client_id',$this->session->userdata('client_id'));
		} else {
			$this->db->select('*');
			$this->db->from("prescription_detail");
			$this->db->order_by("chart_id", "desc");
			$this->db->where('client_id',$this->session->userdata('client_id'));
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
		$this->db->where('client_id',$this->session->userdata('client_id'));		
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
		
		$data['result']=$query->result_array();
		
		$this->db->select('*')->from('defaultchart_detail')->where('client_id',$this->session->userdata('client_id'));
		$this->db->distinct();
		$this->db->order_by("chart_id", "desc");
		$query = $this->db->get();
		$this->db->where('client_id',$this->session->userdata('client_id'));		
		$data['chart_result']=$query->result_array();
		
		$data['ex_chart'] = $this->exercise_model->get_list();
		$data['patient_name']=$this->patient_model->getPatient();
		$data['chart_name']=$this->patient_model->getchart();
		$data['chartlist']=$this->exercise_model->getalllist();
        $this->load->view('client/new_chart',$data);
	}
	public function export_exercise(){
		$this->load->library('export');
		$data['page_name'] = 'exercises';
		$segment_array = $this->uri->segment_array();
		
		$search=str_replace('%20',' ',$this->uri->segment(4));
		$search1=str_replace('%20',' ',$this->uri->segment(5));
		$search2=str_replace('%20',' ',$this->uri->segment(6));
		if($search == 'date'){
			$data['dateFilter'] = true;
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment(5))));
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment(6))));
			$where_condition = "(ex_date >= '".$from."' AND ex_date <= '".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
			$this->db->where($where_condition);
			$this->db->where('pi.client_id',$this->session->userdata('client_id'));
			$this->db->select('pd.ex_date,pi.patient_code,pd.patient_name,pd.email,pd.chartname,pd.pay');
			$this->db->from("prescription_detail pd");
			$this->db->join("tbl_patient_info pi", "pd.patient_id=pi.patient_id");
		    }
		 else if($search1 == 'ChartName') {
			$this->db->where('chartname',$search2);
			$this->db->select('*');
			$this->db->from("prescription_detail");
			$this->db->order_by("chart_id", "desc");
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
		else if($search1 == 'PatientName') {
			$this->db->where('patient_id',$search2);
			$this->db->select('*');
			$this->db->from("prescription_detail");
			$this->db->order_by("chart_id", "desc");
			$this->db->where('client_id',$this->session->userdata('client_id'));
		} else {
			$this->db->select('*');
			$this->db->from("prescription_detail");
			$this->db->order_by("chart_id", "desc");
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
		
		$query=$this->db->get();
		$this->export->to_excel($query, 'exercise_report');
	  }
		public function req_exercise(){
		$data['page_name'] = 'exercises';
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
		
		$do_date = array_search("date",$segment_array);
		if ($do_date !== FALSE)
		{
			$data['dateFilter'] = true;
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+1))));
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+2))));
			$where_condition = "(pi.appoint_date >= '".$from."' AND pi.appoint_date <= '".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
			$this->db->where($where_condition);
		}
		$do_id = array_search("PatientId",$segment_array);
		if ($do_id !== FALSE)
		{
			$this->db->where('pi.patient_id',$this->uri->segment($do_id+1));
		}
		$do_mob = array_search("MobileNo",$segment_array);
		if ($do_mob !== FALSE)
		{
			$this->db->where('pi.mobile_no',$this->uri->segment($do_mob+1));
		}
		$do_ref = array_search("ReferedBy",$segment_array);
		if ($do_ref !== FALSE)
		{
			$this->db->where('pi.referal_name',$this->uri->segment($do_ref+1));
		}
		$do_diag = array_search("diagnosis",$segment_array);
		if ($do_diag !== FALSE)
		{
			$keyword = str_replace('_', '/', $this->uri->segment($do_diag+1));
			$this->db->where('pd.prov_diagnosis',$keyword);
			$this->db->join("tbl_patient_prov_diagnosis pd", "pd.patient_id=pi.patient_id");
				
		}
		
		$this->db->distinct();
		$this->db->select('count(*) as totalrows')->from('tbl_patient_info pi');
		$this->db->where('pi.app_approve >=',2);
		$this->db->where('pi.client_id',$this->session->userdata('client_id'));
		if($this->session->userdata('all_locations') == true)
		{
			$this->db->where_in('pi.client_id',$this->session->userdata('clientIds'));
		}else{
			$this->db->where('pi.client_id',$this->session->userdata('client_id'));
		}
		
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		
		//prepare active record for new query (with limit/offeset/orderby)
		$do_date = array_search("date",$segment_array);
		if ($do_date !== FALSE)
		{
			$data['dateFilter'] = true;
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+1))));
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+2))));
			$where_condition = "(pi.appoint_date >= '".$from."' AND pi.appoint_date <= '".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
			$this->db->where($where_condition);
		} 
		$do_id = array_search("PatientId",$segment_array);
		if ($do_id !== FALSE)
		{
			$this->db->where('pi.patient_id',$this->uri->segment($do_id+1));
		}
		$do_mob = array_search("MobileNo",$segment_array);
		if ($do_mob !== FALSE)
		{
			$this->db->where('pi.mobile_no',$this->uri->segment($do_mob+1));
		}
		$do_ref = array_search("ReferedBy",$segment_array);
		if ($do_ref !== FALSE)
		{
			$this->db->where('pi.referal_name',$this->uri->segment($do_ref+1));
		}
		$do_diag = array_search("diagnosis",$segment_array);
		if ($do_diag !== FALSE)
		{
			$keyword = str_replace('_', '/', $this->uri->segment($do_diag+1));
			$this->db->where('pd.prov_diagnosis',$keyword);
			$this->db->join("tbl_patient_prov_diagnosis pd", "pd.patient_id=pi.patient_id");
				
		}     
		$this->db->distinct();
		$this->db->select('pi.ex_type,pi.req,pi.app_approve,pi.patient_id,pi.patient_code,pi.appoint_date,pi.first_name,pi.last_name,pi.mobile_no,pi.email,pi.address_line1,pi.photo,pi.gender');
		$this->db->from("tbl_patient_info pi");
		$this->db->where('pi.app_approve >=',2);
		$this->db->where('pi.client_id',$this->session->userdata('client_id'));
		if($this->session->userdata('all_locations') == true)
		{
			$this->db->where_in('pi.client_id',$this->session->userdata('clientIds'));
		}else{
			$this->db->where('pi.client_id',$this->session->userdata('client_id'));
		}
		
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
		$data["links"] = explode('<li>',$str_links);
		$data['current_page_segment'] = $current_page_segment;
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$data['patient_name']=$this->common_model->getPatientname();
		$data['mobile']=$this->common_model->getmobileno();
		$data['patient_code']=$this->common_model->getpatientid();
		$data['name']=$this->common_model->getreferal_name();
		$this->load->view('client/req_exercise',$data);
	}
	public function save_chart1() {
		 $data['page_name']='exercises';
		$data['patient_id'] = $this->uri->segment(4);
		$this->db->where('patient_id',$this->uri->segment(4));
		$this->db->select('first_name,last_name,email,patient_id')->from('tbl_patient_info');
		$query = $this->db->get();
		$data['name'] = $query->row()->first_name;
		$data['email'] = $query->row()->email;
		$data['val'] = $query->row()->first_name.'/'.$query->row()->patient_id.'/'.$query->row()->email;
		$client_id = $this->session->userdata('client_id');
		$data['charts']=$this->exercise_model->getchartname();
		$this->load->view('client/save_chart1',$data);	
	 }
	 public function delete_exercise(){
		$result = $this->exercise_model->delete_exercise($_POST['c_id']);
		if($result == ''){
			$response['status'] = 'Success';
			$response['message'] = 'Chart has been added successfully.';
		
		}else {
			$response['status'] = 'failure';
			$response['message'] = 'chart has not been added successfully.';
		}
		echo json_encode($response); 
	}
	public function move_up() {
		$chart_id = $this->uri->segment(4);
		$this->db->where('chart_id',$chart_id);
		$this->db->select('arrange_no')->from('save_chart');
		$res = $this->db->get();
		$current = $res->row()->arrange_no;
		
		$chard_no = $this->uri->segment(5);
		$this->db->where('chard_no',$chard_no);
		$this->db->where('arrange_no',($current-1));
		$this->db->select('chart_id')->from('save_chart');
		$res = $this->db->get();
		$chart_id1 = $res->row()->chart_id;
		
		$x = $current;
		$y = $current-1;
		$x = $x+$y;
		$y = $x-$y;
		$x = $x-$y;
		
		
		$this->db->where('chard_no',$chard_no);
		$this->db->where('chart_id',$chart_id1);
		$this->db->set('arrange_no',$y);
		$this->db->update('save_chart');
		
		
		$this->db->where('chard_no',$chard_no);
		$this->db->where('chart_id',$chart_id);
		$this->db->set('arrange_no',$x);
		$this->db->update('save_chart');
		
		if($current != ''){
			$response['status'] = 'Success';
			$response['message'] = 'Chart has been added successfully.';
		
		}else {
			$response['status'] = 'failure';
			$response['message'] = 'chart has not been added successfully.';
		}
		echo json_encode($response); 
		
	}
	public function move_down() {
		$chart_id = $this->uri->segment(4);
		$this->db->where('chart_id',$chart_id);
		$this->db->select('arrange_no')->from('save_chart');
		$res = $this->db->get();
		$current = $res->row()->arrange_no;
		
		$chard_no = $this->uri->segment(5);
		$this->db->where('chard_no',$chard_no);
		$this->db->where('arrange_no',($current+1));
		$this->db->select('chart_id')->from('save_chart');
		$res = $this->db->get();
		$chart_id1 = $res->row()->chart_id;
		$x = $current;
		$y = $current+1;
		$x = $x+$y;
		$y = $x-$y;
		$x = $x-$y;
		$this->db->where('chard_no',$chard_no);
		$this->db->where('chart_id',$chart_id1);
		$this->db->set('arrange_no',$y);
		$this->db->update('save_chart');
		
		
		$this->db->where('chard_no',$chard_no);
		$this->db->where('chart_id',$chart_id);
		$this->db->set('arrange_no',$x);
		$this->db->update('save_chart');
		
		if($current != ''){
			$response['status'] = 'Success';
			$response['message'] = 'Chart has been added successfully.';
		
		}else {
			$response['status'] = 'failure';
			$response['message'] = 'chart has not been added successfully.';
		}
		echo json_encode($response); 
		
	}
	public function file_upload(){
		
		$result =array();
		$config['upload_path'] = './uploads/exercise';
		$config['allowed_types'] = "*";
		$config['max_size'] = '10000000M';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('file'))
		{
			$error = array('error' => $this->upload->display_errors());
			$result['status'] ='fail';
			$result['msg'] ='File Upload Error';
			$result['file_name'] = "";
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$result['status'] ='success';
			$result['msg'] ='File Upload Successfully';
			$result['file_name'] = $data['upload_data']['file_name'];
		}
		echo json_encode($result);	
	}
} 
?>