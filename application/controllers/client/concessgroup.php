<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Concessgroup extends CI_Controller {
         
		 public function __construct() {
		 header("cache-Control: no-store, no-cache, must-revalidate");
	     header("cache-Control: post-check=0, pre-check=0", false);
	     header("Pragma: no-cache");
		 parent::__construct();
		 $this->app_access->client();
		 $this->load->model(array('concessgroup_model','registration_model'));
	}
	public function add()
	{
		$data['page_name'] = 'concession_group';
		$this->load->view('client/concessgroup_add',$data);
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
	public function add_concess_group(){
		
		$data['page_name'] = 'concession_group';
	
	  $concessGroupId = $this->input->post('concess_group_id');
	 
	 
   	  if($concessGroupId==''){
				if($concessionData = $this->concessgroup_model->concessGroupAdd())
				{
					//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Concession group has been added successfully.';
					$response['concessionData'] = $concessionData;
				}
			}else {
				if($concessionData = $this->concessgroup_model->concessGroupEdit($concessGroupId))
				{
					$response['status'] = 'success';
					$response['message'] = 'Concession group has been updated successfully.';
					
				}
			}
			
		echo json_encode($response);
	 }
	public function view() {
		
		// load default view
		$data['page_name'] = 'concession_group';
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
		$this->db->select('count(*) as totalrows')->from('tbl_concess_group cg')->where('cg.client_id = "'.$this->session->userdata('client_id').'"');
		//do where
		if($this->uri->segment(4) != ''){
			if($this->uri->segment(4) != 'page'){
				$this->db->where('concess_group_id',$this->uri->segment(4));
			} else {
				
			}
		}
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->where('cg.client_id',$this->session->userdata('client_id'));
		$this->db->select('cg.client_id,cg.concess_group_id,cg.concess_group_name,cg.age,cg.tax_perc,cg.discount_perc');
		$this->db->from("tbl_concess_group cg");
		//do where
		if($this->uri->segment(4) != ''){
			if($this->uri->segment(4) != 'page'){
				$this->db->where('concess_group_id',$this->uri->segment(4));
			} else {
				
			}
		}
		//do orderby
		$this->db->order_by('cg.concess_group_id', 'desc');
		
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
		$this->db->order_by('concess_group_id','desc');
		$query = $this->db->get();
		$data['concessGroup'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		
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
		$data['concessGroup_name'] = $this->concessgroup_model->get_concession();
		$this->load->view('client/concessgroup_view',$data);
	}
	public function edit($concess_group_id) {
		$data['page_name'] = 'concession_group';
		// load default view
		$data['concessGroup']=$this->concessgroup_model->editConcessGroup($concess_group_id);
		$this->load->view('client/concessgroup_edit',$data);
	}	
	public function delete(){
		$data['page_name'] = 'concession_group';
		
		 $result = $this->concessgroup_model->deleteConcessionGroup($_POST['p_id']);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		}
		echo json_encode($response);
		
		 
	}
	public function concession_list() {
		$data['page_name'] = 'concession_group';
		if($this->uri->segment(4) != ''){
		    $data['result'] = $this->concessgroup_model->search_concession();
		}
		else {
			$data['result'] = '';
		}
		$data['concession_lists'] = $this->concessgroup_model->get_concession();
		$this->load->view('client/concess_list',$data);
	}
	public function export_concessgroup() {
		$this->load->library('export');
		// load default view
		$data['page_name'] = 'concession_group';
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
		$this->db->select('count(*) as totalrows')->from('tbl_concess_group cg')->where('cg.client_id = "'.$this->session->userdata('client_id').'"');
		if($where_condition!='') $this->db->where($where_condition);
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->select('cg.concess_group_name,cg.age,cg.tax_perc,cg.discount_perc');
		$this->db->from("tbl_concess_group cg");
		$this->db->where('cg.client_id',$this->session->userdata('client_id'));
		//do where
		if($where_condition!='') $this->db->where($where_condition);
		//do orderby
		$this->db->order_by('cg.concess_group_id', 'desc');
		
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
		//$data['concessGroup'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		$this->export->to_excel($query, 'concess_report');
		
		}
		
	public function remove_con($patient_id){
			
		$this->db->where('patient_id',$patient_id);
		$this->db->set('concess_group_id',0);
		$this->db->update('tbl_patient_info');
		}
	
}