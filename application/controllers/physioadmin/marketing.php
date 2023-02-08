<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Marketing extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model(array('marketing_model','registration_model','user_model'));
		
	}
	
	public function index(){
		
	   header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	   
		if($this->session->userdata('user_name') != false) {
			
			
		$data['page_name'] = 'marketing';
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
		 
		$this->db->select('count(*) as totalrows')->from('tbl_client');
		if($where_condition!='') $this->db->where($where_condition);
		$this->db->where('parent_client_id','0');
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		//prepare active record for new query (with limit/offeset/orderby)
		
		$do_client = array_search("search_client",$segment_array);
		if ($do_client !== FALSE)
		{
			  $this->db->like('first_name',$this->uri->segment($do_client+1));
			 
		}	

		$do_client1 = array_search("search_mob",$segment_array);
		if ($do_client1 !== FALSE)
		{
			  $this->db->like('mobile',$this->uri->segment($do_client1+1));
			 
		}			
		 
		$this->db->select('plan,client_id,username,password,email_verified,first_name,last_name,clinic_name,address,city,state,mobile,phone,last_login_date');
		$this->db->from("tbl_client");
		$this->db->where('parent_client_id','0');
		if($where_condition!='') $this->db->where($where_condition);
		if($this->uri->segment(4) == 'search'){
			$this->db->where('client_id',$this->uri->segment(5));
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
        $this->load->view('physioadmin/marketing_list',$data);
		 }
	  else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 } 
		
	}
	
	public function marketing_print(){
		 header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	   
		if($this->session->userdata('user_name') != false) {
		$id = $this->uri->segment(4);
		$data['page_name'] = 'marketing';
		$data['result'] = $this->marketing_model->getclient($id);
		$this->load->view('physioadmin/marketing_print',$data);
		}
	  else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 } 
	}
	
	public function preview(){
		 $id = $this->uri->segment(4);
		 $data['result'] = $this->marketing_model->getclient($id);
		 $this->load->view('physioadmin/email_preview',$data);
	 }
	 
	public function send_mail(){
		 $client_id = $this->uri->segment(4);
		 $this->marketing_model->send_mail($_POST['p_id']);
		 redirect(base_url().'physioadmin/marketing/index', 'refresh');
	 }
}?>
	
	