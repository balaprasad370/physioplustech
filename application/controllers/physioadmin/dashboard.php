<?php 
/** File name   : dashboard.js
*	Author      : Karuna
*	Date        : 25th Mar 2013
*	Description : Controller for physioplus admin dashboard.
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		// load required models
		$this->load->model(array('owner','registration_model','user_model','admin'));
	}
	
	// redirect index method to home
	public function index() {
		echo 'dsdsd';
		//redirect( base_url() .'physioadmin/dashboard/home' );	
	}
	
	// Owner login method
	public function login() {
		if($this->input->post('username') != false){
			$this->db->select('*')->from('admin')->where('user_name = "'. $this->input->post('username') .'" and password = "'. $this->input->post('password') .'"');
			$result = $this->db->get();
			if( $result->num_rows() > 0 ) {
				$user_data=array(
				'user_id' =>  $result->row()->user_id,
				'password' =>  $result->row()->password,
				'user_name' =>  $result->row()->user_name,
				'mail' => $result->row()->mail,
			);
			$this->session->set_userdata($user_data);
			redirect(base_url()."physioadmin/dashboard/home");
			}
			else {
			// set flashdata for error msg
			$this->session->set_flashdata('owner_login_error', '<div class="alert alert-error"><strong>Error!</strong> Invalid Username (or) Password  </div>');
			redirect(base_url()."physioadmin/dashboard/login", "refresh");
		}
			
		}
		
		// load default view
		$this->load->view('physioadmin/login');
	}
	
	// dashboard home
	public function home() {
	   
	   header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	  if($this->session->userdata('user_name') != false) {
		
		$data['page_name'] = 'home';
		// load default view
		$data['pagename'] = 'home';
		/*$data['back'] = base64_encode(end(explode("/index.php/",$_SERVER['PHP_SELF'])));*/
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 15;
		$where_condition = '';
		
		
		//do searchby
		
		 
		//Count
		
		$this->db->select('count(*) as totalrows')->from('tbl_client');
		/* if($this->session->userdata('user_id')=='2'){
			$this->db->where('city','New Delhi');
		}
		if($this->session->userdata('user_id')=='3'){
			$this->db->where('city','mumbai');
		}
		if($this->session->userdata('user_id')=='4'){
			$this->db->where('city','jaipur');
			$this->db->or_where('city','udaipur');
			$this->db->or_where('city','jodhpur');
		}
		if($this->session->userdata('user_id')=='5'){
			$this->db->where('state','Telangana');
		}  */
		if($this->uri->segment(4) == 'search'){
			$this->db->where('client_id',$this->uri->segment(5));
		}
		if($this->uri->segment(4) == 'city'){
			$this->db->like('city',$this->uri->segment(5));
		}
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		//prepare active record for new query (with limit/offeset/orderby)
		 
		$this->db->select('client_id,username,password,email_verified,first_name,last_name,clinic_name,address,city,state,mobile,phone,last_login_date,plan,plan_id,status');
		$this->db->from("tbl_client");
		/* if($this->session->userdata('user_id')=='2'){
			$this->db->where('city','New Delhi');
		}
		if($this->session->userdata('user_id')=='3'){
			$this->db->where('city','mumbai');
		}
		if($this->session->userdata('user_id')=='4'){
			$this->db->where('city','jaipur');
			$this->db->or_where('city','udaipur');
			$this->db->or_where('city','jodhpur');
		}
		if($this->session->userdata('user_id')=='5'){
			$this->db->where('state','Telangana');
		} */
		if($this->uri->segment(4) == 'search'){
			$this->db->where('client_id',$this->uri->segment(5));
		}
		if($this->uri->segment(4) == 'city'){
			$this->db->like('city',$this->uri->segment(5));
		}
		
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
		$this->db->order_by('client_id','desc');
		$query = $this->db->get();
		$data['client'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		if($data['client'] != false) {
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
		$str_links = $this->pagination->create_links();	
		$data["links"] = explode('<li>',$str_links);
				
		$data['current_page_segment'] = $current_page_segment;
		$status = "home";
		$data['client_name']=$this->user_model->getClientname($status);	
		$this->load->view('physioadmin/index',$data);
	  }
	  else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	/* public function search()
	{
		$this->load->library("pagination");
		$name = str_replace('%20'," ",$this-> uri->segment(4));
		$email = $this-> uri->segment(5);
		$mobile = $this-> uri->segment(6);
		$config['per_page'] =10;
		$current_page ='';
		$totalrows =10;
		$config["total_rows"] = $totalrows;
		$this->db->select('*')->from('tbl_client');
		if($name != false && $mobile!= false){
			$this->db->where('first_name',$name[0]);
			$this->db->where('last_name',$name[1]);
			$this->db->where('mobile',$mobile);
			
		} 
		elseif($name != false && $email!= false){
			$this->db->where('first_name',$name[0]);
			$this->db->where('last_name',$name[1]);
			$this->db->where('email',$email);
			
		}
		elseif($email != false && $mobile!= false){
			$this->db->where('email',$email);
			$this->db->where('mobile',$mobile);
			$this->db->select('*')->from('tbl_client');
		}
		elseif($name != false){
			$this->db->where('first_name',$name[0]);
			$this->db->where('last_name',$name[1]);
			
		}
		elseif($mobile != false){
			$this->db->where('mobile',$mobile);
			
		}
		elseif($email != false){
			$this->db->where('email',$email);
			
		}
		else {
			
		}
		$query = $this->db->get();
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
		$data['client']=$query->result_array();
		$this->load->view('physioadmin/index',$data); 
	} */
	public function logout(){
		$data = array('user_name' => 0,'password' => 0);
		$this->session->sess_destroy();
		$this->session->unset_userdata($data);
		redirect(base_url()."physioadmin/dashboard/login");
	}
	public function invoice_gen(){
       header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	   if($this->session->userdata('user_name') != false) {
		$data['page_name'] = 'settings';
		$data['clients'] = $this->user_model->client_det();
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 30;
		$where_condition = '';
		
		
		//do searchby
		$do_searchby = array_search("searchby",$segment_array);
		if($do_searchby != false) {
			$data['searchFilter']=true;
			$keyword = urldecode($this->uri->segment($do_searchby+1));
			$keyword = str_replace('_', '/', $keyword);
			$where_condition = "(username LIKE '%".$keyword."%')";
			$data['keyword'] = $keyword;
		}  
		 
		//Count
		
		$this->db->select('count(*) as totalrows')->from('tbl_client_invoice ci');
		$this->db->join('tbl_client_invoice iv',"ci.client_id = iv.client_id");
		/* if($this->session->userdata('user_id')=='2'){
			$this->db->where('city','New Delhi');
		}
		if($this->session->userdata('user_id')=='3'){
			$this->db->where('city','mumbai');
		}
		if($this->session->userdata('user_id')=='4'){
			$this->db->where('city','jaipur');
			$this->db->or_where('city','udaipur');
			$this->db->or_where('city','jodhpur');
		}
		if($this->session->userdata('user_id')=='5'){
			$this->db->where('state','Telangana');
		}
		
		if($where_condition!='') $this->db->where($where_condition); */
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		//prepare active record for new query (with limit/offeset/orderby)
		
		$this->db->select('*');
		$this->db->from("tbl_client_invoice ci");
		$this->db->order_by('ci.invoice_id','DESC');
		
		$this->db->join('tbl_client_invoice iv',"ci.client_id = iv.client_id");
		
		/* if($this->session->userdata('user_id')=='2'){
			$this->db->where('city','New Delhi');
		}
		if($this->session->userdata('user_id')=='3'){
			$this->db->where('city','mumbai');
		}
		if($this->session->userdata('user_id')=='4'){
			$this->db->where('city','jaipur');
			$this->db->or_where('city','udaipur');
			$this->db->or_where('city','jodhpur');
		}
		if($this->session->userdata('user_id')=='5'){
			$this->db->where('state','Telangana');
		}
		if($where_condition!='') $this->db->where($where_condition);
		if($this->uri->segment(4) == 'search'){
			$this->db->where('client_id',$this->uri->segment(5));
		} */
		
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
		//$this->db->order_by('iv.date','desc');
		$query = $this->db->get();
		$data['invoice'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		if($data['invoice'] != false) {
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
		$str_links = $this->pagination->create_links();	
		$data["links"] = explode('<li>',$str_links);
		
		$data['current_page_segment'] = $current_page_segment;
		$data['item_name']= $this->admin->inv_items();
		$this->load->view('physioadmin/invoice_gen',$data);
		 }
	  else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	public function invoice_email(){
		$client_id = $this->uri->segment(5);
		$invoice_id = $this->uri->segment(4);
		$this->admin->email_invoice($invoice_id,$client_id);
		if($this->session->userdata('user_id') == 5){
		   $this->admin->email_invoice1($invoice_id,$client_id);
		
		}
		redirect(base_url()."physioadmin/dashboard/invoice_gen/",$data);
	}
	public function invoice_add() {
		$data['client_id']= $this->uri->segment(5);
		$data['invoice_id'] = $this->uri->segment(4);
		$this->load->view('physioadmin/add_pay',$data);
	}
	public function invoice_delete() {
	
	}
	public function test(){
		 echo $this->session->userdata('mail');
	}
	
	public function export_client() {
		$this->load->library('export');
		// load default view
		$data['page_name'] = 'concession_group';
		/*$data['back'] = base64_encode(end(explode("/index.php/",$_SERVER['PHP_SELF'])));*/
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		
		//Count
		//$where_condition = ($where_condition != '') ? $where_condition : '';
		$this->db->select('count(*) as totalrows')->from('tbl_client');
		//if($where_condition!='') $this->db->where($where_condition);
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->select('client_id,username,password,email_verified,first_name,clinic_name,address,city,state,mobile,phone,last_login_date,plan,plan_id');
		$this->db->from("tbl_client");
		//$this->db->where('cg.client_id',$this->session->userdata('client_id'));
		//do where
		//if($where_condition!='') $this->db->where($where_condition);
		//do orderby
		$this->db->order_by('client_id', 'desc');
		
		
		// data subset
		$query = $this->db->get();
		//$data['concessGroup'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		$this->export->to_excel($query, 'client_report');
		
	}
	public function export_freeclient() {
		$this->load->library('export');
		// load default view
		$data['page_name'] = 'concession_group';
		/*$data['back'] = base64_encode(end(explode("/index.php/",$_SERVER['PHP_SELF'])));*/
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		
		//Count
		//$where_condition = ($where_condition != '') ? $where_condition : '';
		$this->db->select('count(*) as totalrows')->from('tbl_client');
		//if($where_condition!='') $this->db->where($where_condition);
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->select('client_id,username,password,email_verified,first_name,clinic_name,address,city,state,mobile,phone,last_login_date,plan,plan_id');
		$this->db->from("tbl_client");
		$this->db->where('plan_id !=', 4);
		$this->db->where('plan !=', 4);
		//$this->db->where('cg.client_id',$this->session->userdata('client_id'));
		//do where
		//if($where_condition!='') $this->db->where($where_condition);
		//do orderby
		$this->db->order_by('client_id', 'desc');
		
		
		// data subset
		$query = $this->db->get();
		//$data['concessGroup'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		$this->export->to_excel($query, 'client_report');
		
	}
	public function export_demorequest() {
		$this->load->library('export');
		$data['page_name'] = 'concession_group';
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		$this->db->select('count(*) as totalrows')->from('tbl_demorequest');
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		$this->db->select('demo_id,name,email,clinicname,city,no_therapist,role,date,mobile');
		$this->db->from("tbl_demorequest");
		$this->db->order_by('demo_id', 'desc');
		$query = $this->db->get();
		$this->export->to_excel($query, 'demo_report');
		
	}
	public function freedemo_request() {
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 15;
		$where_condition = '';
		
		
		//do searchby
		$do_searchby = array_search("searchby",$segment_array);
		if($do_searchby != false) {
			$data['searchFilter']=true;
			$keyword = urldecode($this->uri->segment($do_searchby+1));
			$keyword = str_replace('_', '/', $keyword);
			$where_condition = "(username LIKE '%".$keyword."%')";
			$data['keyword'] = $keyword;
		}
		 
		//Count
		
		$this->db->select('count(*) as totalrows')->from('tbl_demorequest');
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		//prepare active record for new query (with limit/offeset/orderby)
		
		$this->db->select('*');
		$this->db->from("tbl_demorequest");
		$this->db->order_by('demo_id','desc');
		$this->db->group_by("email");

		
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
		$this->db->order_by('date','desc');
		$query = $this->db->get();
		$data['client'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		if($data['client'] != false) {     
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
		$str_links = $this->pagination->create_links();	
		$data["links"] = explode('<li>',$str_links);
				
		$data['current_page_segment'] = $current_page_segment;
		$status = "home";
		$data['client_name']=$this->user_model->getClientname($status);	
		$this->load->view('physioadmin/request',$data);
		
	}
	public function notification() {
		$data['page_name'] = 'settings';
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 10;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
		
		
		
		// do date filter
		$do_date = array_search("date",$segment_array);
		if ($do_date !== FALSE)
		{
			$from = date('Y-m-d',  strtotime($this->uri->segment(5)));
			$to = date('Y-m-d',  strtotime($this->uri->segment(6)));
			$where_condition = "(not_date >= '".$from."' AND not_date <= '".$to."')";
		}  
		
		//Count
		$where_condition = ($where_condition != '') ? $where_condition : '';
		$this->db->distinct();
		$this->db->where('patient_name','');
		$this->db->select('count(*) as totalrows')->from('tbl_client_notification');
		
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->distinct();
		$this->db->where('patient_name','');
		$this->db->select('*');
		$this->db->from("tbl_client_notification");
		
		//do where
		if($where_condition!='') {
			$this->db->where($where_condition);
		} 
		$this->db->order_by('date','desc');
		
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
		$data['notification_report'] = ($query->num_rows() > 0) ? $query->result_array() : false;
	
		
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
		$this->load->view('physioadmin/notification',$data);
	}
	 public function send_notification() {
		    $result = $this->user_model->add_notification(); 
		    $title =$this->input->post('title');
			$msg =$this->input->post('short_desc');
			$long_desc =$this->input->post('message');
			$img = 'http://www.physioplustech.in/uploads/app/'.$this->input->post('upload_img');
			
			$this->db->where('token !=','');
			$this->db->where('client_id',103);
			$this->db->select('token')->from('tbl_client');
			$query = $this->db->get();
			foreach($query->result_array() as $row){
				$token = $row['token']; 
				define( 'API_ACCESS_KEY', 'AAAAHhxim7Y:APA91bGeFWJJ6ZHdYqoxNwl7e8C7A-AvjlaDCAg43hfEhNzPVqfn1tR-Bg8y6vB0SKDaqgqnx07JyLaZiigDcJ482Tkk_nPBEhsqkX88sYHTRYLZnunznnU-Mexyj7VnDbgOn_oAaXc7' );
				$data = array("to" => $token , "priority"=>"high",
							  "notification" => array( "title" => $title , "body" => $msg,"image" => "http://gintonico.com/content/uploads/2015/03/fontenova.jpg",  "icon" => "icon.png","vibrate"   => 1,"sound" => "bingbong.aiff"));                                                                    
				$data_string = json_encode($data); 
				$headers = array
				(
					 'Authorization: key=' . API_ACCESS_KEY, 
					 'Content-Type: application/json'
				);                                                                                 
																																	 
				$ch = curl_init();  

				curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );                                                                  
				curl_setopt( $ch,CURLOPT_POST, true );  
				curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
				curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
				curl_setopt( $ch,CURLOPT_POSTFIELDS, $data_string);                                                                  
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);																													 
				$result = curl_exec($ch);
				 if ($result === FALSE) {
					die('Curl failed: ' . curl_error($ch));
				}
				curl_close ($ch); 
			}
	}
    public function delete_notification() {
		$result = $this->user_model->delete_notification($_POST['n_id']); 
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Notification  has been added successfully.';
		}else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Notification has not been added successfully.';
		} 
		echo json_encode($response);
	 }
	 public function client_list() {
		header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
	  if($this->session->userdata('user_name') != false) {
	    $data['page_name'] = 'home';
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 15;
		$where_condition = '';
		//Count
		 
		$this->db->select('count(*) as totalrows')->from('tbl_client');
		$this->db->where('parent_client_id','0');
		$this->db->where('plan','0');
		
		/* if($this->session->userdata('user_id')=='2'){
			$this->db->where('city','New Delhi');
		}
		if($this->session->userdata('user_id')=='3'){
			$this->db->where('city','mumbai');
		}
		if($this->session->userdata('user_id')=='4'){
			$this->db->where('city','jaipur');
			$this->db->or_where('city','udaipur');
			$this->db->or_where('city','jodhpur');
		}
		if($this->session->userdata('user_id')=='5'){
			$this->db->where('state','Telangana');
		} */
		if($this->uri->segment(4) == 'search'){
			$this->db->where('client_id',$this->uri->segment(5));
		}
		if($this->uri->segment(4) == 'city'){
			$this->db->like('city',$this->uri->segment(5));
		}
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		//prepare active record for new query (with limit/offeset/orderby)
		 
		$this->db->select('plan,client_id,username,password,email_verified,first_name,last_name,clinic_name,address,city,state,mobile,phone,last_login_date,status');
		$this->db->from("tbl_client");
		$this->db->where('parent_client_id','0');
		$this->db->where('plan','0');
		if($this->uri->segment(4) == 'search'){
			$this->db->where('client_id',$this->uri->segment(5));
		}
		if($this->uri->segment(4) == 'city'){
			$this->db->like('city',$this->uri->segment(5));
		}
		
		
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
		$this->db->order_by('client_id','desc');
		$query = $this->db->get();
		$data['client'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		if($data['client'] != false) {
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
		$str_links = $this->pagination->create_links();	
		$data["links"] = explode('<li>',$str_links);
		$data["pagination"] = $this->pagination->create_links();	
		$data['current_page_segment'] = $current_page_segment;
		$status = "home";
		$data['client_name']=$this->user_model->getClientname($status);
        
		$this->load->view('physioadmin/client_list',$data);
		
		}
	  else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	
	public function request_quotation(){
		 if($this->session->userdata('user_name') != false) {
		$data['page_name'] = 'home';
		
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		$config['per_page'] = 15;
		$where_condition = '';
		$this->db->select('count(*) as totalrows');
		$this->db->from("tbl_req_quotation");
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		$qrow = $query->row();
		
		$config['total_rows'] = $qrow->totalrows;
		
		$this->db->select('*');
		$this->db->from("tbl_req_quotation");
		$this->db->order_by('id','desc');
		
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
			
			$query = $this->db->get();
			$data['client_list'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		
			
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
			$str_links = $this->pagination->create_links();	
			$data["links"] = explode('<li>',$str_links);
					
			$data['current_page_segment'] = $current_page_segment;
		    $this->load->view('physioadmin/quotation_list',$data);
		}
	  else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	public function quotation_print(){
		 if($this->session->userdata('user_name') != false) {
		$id = $this->uri->segment(4);
		$data['page_name'] = 'home';
		$data['client'] = $this->user_model->getquoteclient($id);
		$this->load->view('physioadmin/quotation_print',$data);
		}
	  else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	
	public function quotationprint(){
		 if($this->session->userdata('user_name') != false) {
		$data['page_name'] = 'home';
		$this->load->view('physioadmin/quotationprint',$data);
		}
	  else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	
	public function account_verify(){
		$response=array();
		
		$result = $this->admin->account_verify($_POST['p_id']);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		}
		echo json_encode($response);
	}
	public function item_add(){
		header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
	    $data['page_name'] = 'settings';
		$data['items'] = $this->admin->getitems();
		$this->load->view('physioadmin/items_add',$data);
	    
	}
	public function add_invoiceitem() {
		$result = $this->admin->add_invoiceitem();
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Patient deleted successfully.';
		}
		echo json_encode($response);
	}
	public function items_delete() {
		$result = $this->admin->items_delete($_POST['id']);
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