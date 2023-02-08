<?php 
/** File name   : dashboard.php
*	Author      : Muthukumar
*	Date        : 27th Mar 2013
*	Description : Controller for physioplus client dashboard.
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Location extends CI_Controller {
	public function __construct() {
		header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
		parent::__construct();
		$this->load->model(array('location_model','common_model'));
	}
	 public function _remap($method, $params = array())
		{
		if($this->session->userdata('duration') == 0 ){
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
		}
	/* public function add() {
		$data['page_name'] = 'location';
		$this->load->view('location_add');  
	} */
	public function edit($client_id) {
		$data['page_name'] = 'location';
		$data['client_id'] = $client_id;
		$data['locationInfo']=$this->location_model->editLocation($client_id);
		$this->load->view('client/location_edit',$data);
	}
	public function add_location() {
		$data['page_name'] = 'location';
		$client_id=$this->input->post('client_id');
		echo $client_id;
		$locationCount = $this->location_model->getLocationCount();
		$noOfLocations = $this->common_model->noOfLocationsPlan1();
		$response = array();
		if($client_id == ''){
			if($locationCount < $noOfLocations)
			{
				if($locationData = $this->location_model->locationAdd()) {
						$response['status'] = 'success';
						$response['message'] = 'Location has been added successfully.';
				}
				
			} else {
				$response['status'] = 'failure';
				$response['flashData'] = 'Locations exceeds for your plan';
			}
			} else {
					if($locationData = $this->location_model->locationEdit($client_id)) {
						$response['status'] = 'success';
						$response['message'] = 'Location has been updated successfully.';
					}
			}
		
		echo json_encode($response);
	}
	public function view() {
		$data['page_name'] = 'location';
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
		$this->db->select('count(*) as totalrows')->from('tbl_client loc')->where('loc.parent_client_id = "'.$this->session->userdata('client_id').'"');
		if($where_condition!='') $this->db->where($where_condition);
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->select('loc.client_id,loc.first_name,loc.email,loc.clinic_name,loc.branch_name,loc.city,loc.state,loc.mobile,loc.status');
		$this->db->from("tbl_client loc");
		$this->db->where('loc.parent_client_id',$this->session->userdata('client_id'));
		//do where
		if($where_condition!='') $this->db->where($where_condition);
		//do orderby
		$this->db->order_by('client_id', 'asc');
		
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
		$data['location'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		
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
		$str_links  = $this->pagination->create_links();	
		$data["links"] = explode('<li>',$str_links);
		$data['current_page_segment'] = $current_page_segment;
		$this->load->view('client/location_view',$data);
	}
	public function update(){
		$data['page_name'] = 'location';
		$result = $this->location_model->updateLocation($_POST['c_id']);
		
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Invoice deleted successfully.';
		}
		echo json_encode($response);
		
		$this->session->set_flashdata('message1', 'Location has been updated successfully.');
		//redirect(base_url().'client/location/view', 'refresh');
	}
	





} 
?>