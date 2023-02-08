<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {
	public function __construct() {
		header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
		parent::__construct();
		$this->app_access->client(); // check access permission for owner
		$this->load->model(array('blog_model','registration_model'));
		
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
	public function blog_add(){
		$data['page_name'] = 'blog';
		$this->load->view('client/blog_add',$data);
	}
	
	public function add_bloginfo() {
		
		$result = $this->blog_model->blogAdd();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response); 
	 
	}
	public function logo_upload(){
		
		$result =array();
		$config['upload_path'] = './uploads/blog';
		$config['allowed_types'] = "*";
		$config['max_size'] = '10000000M';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('logo'))
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
	
	public function blog_view() {
		
		// load default view
		$data['page_name'] = 'blog';
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
		$this->db->where('cg.client_id',$this->session->userdata('client_id'));
		$this->db->select('count(*) as totalrows')->from('tbl_blog cg')->where('cg.client_id = "'.$this->session->userdata('client_id').'"');
		if($where_condition!='') $this->db->where($where_condition);
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->where('cg.client_id',$this->session->userdata('client_id'));
		$this->db->select('cg.client_id,cg.blog_id,cg.name,cg.title,cg.date,cg.description');
		$this->db->from("tbl_blog cg");
		//$this->db->where('cg.client_id',$this->session->userdata('client_id'));
		//do where
		if($where_condition!='') $this->db->where($where_condition);
		//do orderby
		$this->db->order_by('cg.blog_id', 'desc');
		
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
		$this->db->order_by('blog_id','desc');
		$query = $this->db->get();
		$data['bloggroup'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		
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
		$this->load->view('client/blog_view',$data);
	}
	public function delete(){
		$data['page_name'] = 'blog';
		$this->blog_model->deleteblog($_POST['p_id']);
		redirect(base_url().'client/blog/blog_view', 'refresh');
	}
	
	public function edit(){
		$data['page_name'] = 'blog';
		$blog_id = $this->uri->segment(4);
		$data['blog_info']=$this->blog_model->getbloginfo($blog_id);
		$this->load->view('client/blog_edit',$data);
	}
	public function edit_bloginfo(){
		$blog_id=$this->input->post('blog_id');
		$this->blog_model->edit_bloginfo($blog_id);
		
	}
}