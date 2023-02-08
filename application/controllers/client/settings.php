<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once ($_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php');
class Settings extends CI_Controller {
	public function __construct() {
		header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
		parent::__construct();
		$this->app_access->client();
		$this->load->model(array('settings_model','client','common_model','registration_model','invoice_model'));
		
	}
	public function settings1() {
		 $query = $this->settings_model->edit_settings1($this->session->userdata('client_id'));
			if($query != '') 
			{
				//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
				$response['status'] = 'success';
				$response['message'] = 'settings has been changed successfully.';
			}
			 else {
				 $response['status'] = 'Failure';
				$response['message'] = 'settings has not been changed successfully.';
			}
		echo json_encode($response);
	}
	public function index()
	{
		$data['page_name'] = 'settings';
		
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		$config['per_page'] = 10;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
		$this->db->select('count(*) as totalrows')->from('tbl_item');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('status',1);
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		$this->db->distinct();
		$this->db->select('item_id,item_name,item_desc,item_price,item_hide');
		$this->db->from("tbl_item");
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('status',1);
		
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
		$data['item'] = ($query->num_rows() > 0) ? $query->result_array() : false;
	
		
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
		
		$config['per_page'] = 10;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
		//Count
		$this->db->select('count(*) as totalrows')->from('tbl_prov_diagnosis_list');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
			
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->distinct();
		$this->db->select('pd_list_name,pd_list_id,created_date');
		$this->db->from("tbl_prov_diagnosis_list");
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->order_by('pd_list_id','desc');
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
		$data['diag_det'] = ($query->num_rows() > 0) ? $query->result_array() : false;
	
		
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
		$data["links1"] = explode('<li>',$str_links);
		
		
		$data['page_name'] = 'settings';
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		$config['per_page'] = 10;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
		//Count
		$this->db->select('count(*) as totalrows')->from('tbl_expanse_client_item');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
			
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->distinct();
		$this->db->select('item_id,item_name,item_desc,item_price,item_hide');
		$this->db->from("tbl_expanse_client_item");
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
		// data subset
		$query = $this->db->get();
		
		
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
		$data["links2"] = explode('<li>',$str_links);
		$data['current_page_segment'] = $current_page_segment;
		$data['expense_item'] = ($query->num_rows() > 0) ? $query->result_array() : false;
	
		$data['profile'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$data['clinics'] = $this->registration_model->editappProfile($this->session->userdata('clinic_name'));		
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$data['settings'] = $this->settings_model->editSettings($this->session->userdata('client_id'));
		$data['sch_settings'] = $this->settings_model->editSchSettings($this->session->userdata('client_id'));
		$data['sch_settings_inf']= $this->registration_model->editsettings($this->session->userdata('client_id'));
		$data['report'] = $this->settings_model->edit_report($this->session->userdata('client_id'));
		
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		$config['per_page'] = 10;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
		$this->db->select('count(*) as totalrows')->from('tbl_product_info');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		$this->db->distinct();
		$this->db->select('product_id,stack_items,item_date,discount,total,item_name,item_code,amount');
		$this->db->from("tbl_product_info");
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
		// data subset
		$query = $this->db->get();
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
		$data["links3"] = explode('<li>',$str_links);
		$data['current_page_segment'] = $current_page_segment;
		$data['query_item'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		$data['patient_name']=$this->common_model->getPatientname();
		/* $this->db->select('*')->from('tbl_product_info');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query_item = $this->db->get();
		$data['query_item'] = ($query_item->num_rows() > 0) ? $query_item->result_array() : false; */
		$this->load->view('client/settings',$data); 
                if($this->session->userdata('client_id')==1637)
                {

		$this->getCalendarAuthCode();
                }

	}
	public function change_profile() {
		//print_r($this->session->userdata('client_id')); exit;
		if($query = $this->registration_model->profile_edit($this->session->userdata('client_id')))
			{
				$response['status'] = 'success';
				$response['message'] = 'profile has been changed successfully.';
			}
			 else {
				$response['status'] = 'failure';
				$response['message'] = 'profile has been changed successfully.';
			}
		
		echo json_encode($response);
	}
	public function notes_det()
	{
		$response = array();
		
		$result = $this->settings_model->notes_add($this->session->userdata('client_id'));
		if($result!=false)
		{
			$response['status'] = 'success';
			$response['message'] = 'Notes Has Been Added successfully.';
		}
		else{
			$response['status'] = 'success';
			$response['message'] = 'Notes Has Been Added successfully.';
		}
		echo json_encode($response);
	}
	public function settings_invoice() {
			if($query = $this->settings_model->edit_invoicesettings($this->session->userdata('client_id')))
			{
				$response['status'] = 'success';
				$response['message'] = 'settings has been changed successfully.';
			}
			 else {
				$response['status'] = 'failure';
				$response['message'] = 'settings has been changed successfully.';
			}
		// print json response
		echo json_encode($response);
	}
	public function change_sms() {
		$response = array();
		$result = $this->registration_model->profile_edit2($this->session->userdata('client_id'));
			if($result != ''){
				
				$response['status'] = 'success';
				$response['message'] = 'profile has been changed successfully.';
			}
			else {
				$response['status'] = 'failure';
				$response['message'] = 'profile has been changed successfully.';
			}
		echo json_encode($response);
	}
	public function change_profile_address() {
		if($query = $this->registration_model->profile_edit1($this->session->userdata('client_id')))
			{
				//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
				$response['status'] = 'success';
				$response['message'] = 'profile has been changed successfully.';
			}
			else {
				$response['status'] = 'failure';
				$response['message'] = 'profile has been changed successfully.';
			}
		
		echo json_encode($response);
	}
	public function google_details() {
		if($query = $this->registration_model->update_googleDetails($this->session->userdata('client_id')))
			{
				//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
				$response['status'] = 'success';
				$response['message'] = 'profile has been changed successfully.';
			}
			else {
				$response['status'] = 'failure';
				$response['message'] = 'profile has been changed successfully.';
			}
		
		echo json_encode($response);
	}
	
	public function removebranding() {
		$response = array();
		if($query = $this->settings_model->removebranding($this->session->userdata('client_id')))
		{
			//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
			$response['status'] = 'success';
			$response['message'] = 'Branding Has Been Removed successfully.';
		}
		// print json response
		echo json_encode($response);
		
	}
	public function removebranding1() {
		
		$response = array();
		if($query = $this->settings_model->social_share_insert($this->session->userdata('client_id')))
		{
			$response['status'] = 'success';
			$response['message'] = 'Branding Has Been Removed successfully.';
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Branding Has Been Removed successfully.';
		}
		// print json response
		echo json_encode($response);
		
	}
	public function add_item() {
		$item_id=$this->input->post('item_id');
		if($item_id == '')
			{
				$itemData = $this->invoice_model->item_info();
				if($itemData)
				{
					
					$response['status'] = 'success';
					$response['message'] = 'Item has been added successfully.';
					$response['itemData'] = $itemData;
				}
			}else{
				if($itemData = $this->invoice_model->edit_item($item_id))
				{
					//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Item has been updated successfully.';
				}
			}
			
		// print json response
		echo json_encode($response);
	}
	public function edit_item()
	{
		$data['page_name'] = 'settings';
		$item_id=$this->uri->segment(4);
		$data['item'] = $this->settings_model->editItem($item_id);
		$data['item_id'] = $item_id;
		$this->load->view('client/item_edit',$data); 
	}
	public function edit_prov_diag()
	{
		$data['page_name'] = 'settings';
		$item_id=$this->uri->segment(4);
		$data['item'] = $this->settings_model->edit_prov_diag($item_id);
		$data['item_id'] = $item_id;
		$this->load->view('client/edit_prov_diag',$data); 
	}
	public function edit_expenseitem()
	{
		$data['page_name'] = 'settings';
		$item_id=$this->uri->segment(4);
		$data['item'] = $this->settings_model->editexpenseItem($item_id);
		$data['item_id'] = $item_id;
		$this->load->view('client/expenseitem_edit',$data); 
	}
	public function item_delete() {
		$item_id=$this->uri->segment(4);
		 
		$response=array();
		$result = $this->settings_model->item_delete($_POST['p_id']);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		}
		echo json_encode($response);
		
	}
	public function expenseitem_delete() {
		$data['page_name'] = 'settings';
		
		$response=array();
		$result = $this->settings_model->expenseitem_delete($_POST['p_id']);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		}
		echo json_encode($response);
		
  }
	public function del_diag() {
		
		$response=array();
		$result = $this->settings_model->del_diag($_POST['p_id']);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		}
		echo json_encode($response);
		
		 
	}
	public function schedule_setting() {
		$query = $this->settings_model->edit_settings($this->session->userdata('client_id'));
		if($query != false)
			{  
				$response['status'] = 'success';
				$response['message'] =  'settings has been changed successfully.';
			}
			 else {
				$response['status'] = 'failure';
				$response['message'] =  'settings has been changed successfully.';
			}
		
		echo json_encode($response); 
	}
	public function sch_settings_edit() {
		
			if($query = $this->settings_model->edit_sch_settings($this->session->userdata('client_id')))
			{
				$response['status'] = 'success';
				$response['message'] = 'schedule settings has been changed successfully.';
			}
			 else {
				$response['status'] = 'failure';
				$response['message'] = 'schedule settings has been changed successfully.';
			}
		// print json response
		echo json_encode($response);
	}
	public function add_expense_item() {
		$item_id=$this->input->post('item_id');
			if($item_id == '')
			{
				$itemData = $this->invoice_model->item_expense_info();
				if($itemData)
				{
					//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Item has been added successfully.';
					$response['itemData'] = $itemData;
				}
			}else{
				if($itemData = $this->invoice_model->edit_expenseitem_info($item_id))
				{
					//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Item has been updated successfully.';
				}
			}
			
		echo json_encode($response);
	}
	public function add_prov_diagnosis() {
		$pd_id = $this->input->post('pd_id');
		$response = array();
			if($pd_id == ''){
				if($query = $this->patient_model->provi_add($this->session->userdata('client_id')))
				{
					//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Provisional diagnosis has been added successfully.';
					
				}
			} else {
				echo $pd_id;
				if($query = $this->patient_model->edit_provi($pd_id,$this->session->userdata('client_id')))
				{
					//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Provisional diagnosis has been updated successfully.';
					
				}
			}
			
		
		echo json_encode($response);
		
	}
	public function logo_upload(){
		
		$result =array();
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = "*";
		$config['max_size'] = 1024 * 8;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('cpd_file'))
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
	
	public function add_logo() {
		$upload_img=$this->input->post('upload_img');
		$response = array();
			if($query = $this->settings_model->add_logo($this->session->userdata('client_id'),$upload_img))
			{
				//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Provisional diagnosis has been added successfully.';
					
			}
			else {
				    $response['status'] = 'Failure';
					$response['message'] = 'Provisional diagnosis has been added successfully.';
					
			}
			
			
		
		echo json_encode($response); 
		
	}
	public function app_profile() {
		$response = array();
			if($query = $this->settings_model->edit_app())
			{
				//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Provisional diagnosis has been added successfully.';
					
			}
			else {
				    $response['status'] = 'Failure';
					$response['message'] = 'Provisional diagnosis has been added successfully.';
					
			}
		echo json_encode($response); 
	}
	public function file_upload(){
		
		$result =array();
		$config['upload_path'] = './uploads/tp_image';
		$config['allowed_types'] = "*";
		$config['max_size'] = '10000000M';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('file'))
		{
			$error = array('error' => $this->upload->display_errors());
			print_r($error);  
			/* $result['status'] ='fail';
			$result['msg'] ='File Upload Error';
			$result['file_name'] = ""; */
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
	   public function consent_formlist() {
		$response = array();
		if($query = $this->settings_model->consent_form($this->session->userdata('client_id')));
		{
			$response['status'] = 'success';
			$response['message'] = 'Branding Has Been Removed successfully.';
		}
		//print_r($response); exit;
		echo json_encode($response);
		
	}
	
	public function report_form() {
		 $query = $this->settings_model->report_form($this->session->userdata('client_id'));
			if($query != '') 
			{
				//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
				$response['status'] = 'success';
				$response['message'] = 'settings has been changed successfully.';
			}
			 else {
				 $response['status'] = 'Failure';
				$response['message'] = 'settings has not been changed successfully.';
			}
		echo json_encode($response);  
	}
	public function item_hide() {
		$item_id=$this->uri->segment(4);
		$data['item'] = $this->settings_model->item_hide($item_id);
		$this->session->set_flashdata('message', 'Your item has been deleted Successfully');
		redirect(base_url().'client/settings/index','refresh');
	}
	public function item_show() {
		$item_id=$this->uri->segment(4);
		$data['item'] = $this->settings_model->item_show($item_id);
		$this->session->set_flashdata('message', 'Your item has been deleted Successfully');
		redirect(base_url().'client/settings/index','refresh');
	}
	public function expenseitem_hide() {
		$item_id=$this->uri->segment(4);
		$data['item'] = $this->settings_model->expenseitem_hide($item_id);
		$this->session->set_flashdata('message', 'Your item has been deleted Successfully');
		redirect(base_url().'client/settings/index','refresh');
	}
	public function expenseitem_show() {
		$item_id=$this->uri->segment(4);
		$data['item'] = $this->settings_model->expenseitem_show($item_id);
		$this->session->set_flashdata('message', 'Your item has been deleted Successfully');
		redirect(base_url().'client/settings/index','refresh');
	}
	public function add_product() {
		$data['page_name'] = 'settings';
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		$config['per_page'] = 10;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
		$this->db->select('count(*) as totalrows')->from('tbl_product_info');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		$this->db->distinct();
		$this->db->select('product_id,stack_items,item_date,discount,total,item_name,item_code,amount');
		$this->db->from("tbl_product_info");
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
		// data subset
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
		$str_links = $this->pagination->create_links();	
		$data["links"] = explode('<li>',$str_links);
		$data['current_page_segment'] = $current_page_segment;
		$data['item'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		$this->load->view('client/add_product',$data); 
	}
	public function product_add() {
		 $query = $this->settings_model->product_add($this->session->userdata('client_id'));
			if($query != '') 
			{
				//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
				$response['status'] = 'success';
				$response['message'] = 'settings has been changed successfully.';
			}
			 else {
				 $response['status'] = 'Failure';
				$response['message'] = 'settings has not been changed successfully.';
			}
		echo json_encode($response);  
	}
	public function product_edit() {
		$data['page_name'] = 'settings';
		$item_id=$this->uri->segment(4);
		$data['details'] = $this->settings_model->product_details($item_id);
		$this->load->view('client/edit_product',$data);
	}
	public function update_product() {
		 $query = $this->settings_model->update_product($this->session->userdata('client_id'));
			if($query != '') 
			{
				//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
				$response['status'] = 'success';
				$response['message'] = 'settings has been changed successfully.';
			}
			 else {
				 $response['status'] = 'Failure';
				$response['message'] = 'settings has not been changed successfully.';
			}
		echo json_encode($response);  
	}
	public function sch_time_edit() {
		if($query = $this->settings_model->sch_time_edit())
			{
				$response['status'] = 'success';
				$response['message'] = 'profile has been changed successfully.';
			}
			 else {
				$response['status'] = 'failure';
				$response['message'] = 'profile has been changed successfully.';
			}
		
		echo json_encode($response);
	}
	public function delete_product(){
		$response=array();
		$result = $this->settings_model->delete_product($_POST['p_id']);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		}
		echo json_encode($response);
	}
	
	public function logo_delete() {
		$client_id=$this->uri->segment(4);
		$data['item'] = $this->settings_model->logo_delete($client_id);
		$this->session->set_flashdata('message', 'Your Logo has been Removed Successfully');
		redirect(base_url().'client/settings/index','refresh');
	}
	
	public function announce_holiday() {
		 $query = $this->settings_model->announce_holiday($this->session->userdata('client_id'));
			if($query != '') 
			{
				//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
				$response['status'] = 'success';
				$response['message'] = 'settings has been changed successfully.';
			}
			 else {
				 $response['status'] = 'Failure';
				$response['message'] = 'settings has not been changed successfully.';
			}
		echo json_encode($response);
	}
	
	public function announce_holiday1() {
		 $query = $this->settings_model->announce_holiday1($this->session->userdata('client_id'));
			if($query != '') 
			{
				//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
				$response['status'] = 'success';
				$response['message'] = 'settings has been changed successfully.';
			}
			 else {
				 $response['status'] = 'Failure';
				$response['message'] = 'settings has not been changed successfully.';
			}
		echo json_encode($response);
	}
	public function clinic_open_add() {
		 $query = $this->settings_model->clinic_open_add($this->session->userdata('client_id'));
			if($query != '') 
			{
				//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
				$response['status'] = 'success';
				$response['message'] = 'settings has been changed successfully.';
			}
			 else {
				 $response['status'] = 'Failure';
				$response['message'] = 'settings has not been changed successfully.';
			}
		echo json_encode($response);
	}

        public function integrateCalendar(){
   
              /*   if($this->session->userdata('client_id')==1637)
                 { */
                  $this->client->calendarClientAccess();
                 /* }
               else
               {
               } */


       }

       public function getCalendarAuthCode() { 
            $clientId=$this->session->userdata('client_id');
            $tokenPath = $_SERVER['DOCUMENT_ROOT'].'/tokens/'.$clientId.'_token.json';
            session_start();
            if (file_exists($tokenPath) && isset($_SESSION['access_token']) && $_SESSION['access_token']) 
              {
               //redirect(base_url()."client/dashboard/home");

              }
             else{
             $client = new Google_Client();
              $client->setAuthConfig($_SERVER['DOCUMENT_ROOT'].'/vendor/OAuth_Credentials.json');
             $client->setAccessType('offline');
            $client->setPrompt('select_account consent');
	    $client->setApprovalPrompt('force');

              $client->addScope(Google_Service_Calendar::CALENDAR);
              
              
              
              
               
              
                
               $_SESSION['access_token']='';
              if (isset($_GET['code'])) 
              {

                 $authcode=$_GET['code'];
                $client->authenticate($authcode);
              $_SESSION['access_token'] = $client->getAccessToken();
               $token=$client->getAccessToken();
                 $this->session->set_userdata('token',$token);
                 
              if (!file_exists(dirname($tokenPath))) {
            mkdir(dirname($tokenPath), 0700, true);
        }

        file_put_contents($tokenPath, json_encode($client->getAccessToken()));

                   if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
                     echo "<script>Session</script>";
                    $client->setAccessToken($_SESSION['access_token']);
                     
                     $service = new Google_Service_Calendar($client);
             
           $calendarId = 'primary';
$optParams = array(
  'maxResults' => 10,
  'orderBy' => 'startTime',
  'singleEvents' => true,
  'timeMin' => date('c'),
);
//echo "<script>alert('$calendarId')</script>";
$results = $service->events->listEvents($calendarId, $optParams);
$events = $results->getItems();

if (empty($events)) {
   // print "No upcoming events found.\n";
    echo "<script>alert('$calendarId')</script>";

} else {
   // print "Upcoming events:\n";
    foreach ($events as $event) {
        $start = $event->start->dateTime;
        if (empty($start)) {
            $start = $event->start->date;
        }
       // printf("%s (%s)\n", $event->getSummary(), $start);
      echo "<script>alert('$start')</script>";


    }
}

            $service1 = new Google_Service_Calendar($client);
            $event = new Google_Service_Calendar_Event(array(
  'summary' => 'Calender check Test Event Notification',
  'description' => 'Test Event',
  'start' => array(
    'dateTime' => '2021-03-30T17:30:00+05:30'
  ),
  'end' => array(
    'dateTime' => '2021-03-30T18:00:00+05:30'
  ),
  'attendees' => array(
    array('email' => 'rahinimurugesan@gmail.com')
  ),
  'conferenceData' => [
        'createRequest' => [
            'requestId' => 'sample123',
            'conferenceSolutionKey' => ['type' => 'hangoutsMeet']
        ]
    ]
  
));
     $calendarId ='primary';
     $event1 = $service1->events->insert('info@physioplusnetwork.com', $event,array('conferenceDataVersion' => 1,'sendUpdates' => 'all'));
      echo "<script>alert('$event1->htmlLink')</script>";
                  
                   }//issetAccessToken
               
                 }//issetCode


             }//if token file not available --else

       }

}

