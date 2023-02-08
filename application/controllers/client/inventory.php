<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventory extends CI_Controller {
	public function __construct() {
		header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
		parent::__construct();
		$this->app_access->client(); // check access permission for owner
		$this->load->model(array('common_model','inventory_model'));
		
	}
	 public function _remap($method, $params = array())
			{
			if($this->session->userdata('duration') == 0 ||  $this->session->userdata('plan') < 3 ){
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
		$data['page_name'] = 'inventory';
		$this->load->view('client/inventory_add',$data);
	}
	public function file_upload(){
		
		$result =array();
		$config['upload_path'] = './uploads/inventory';
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
			$this->resize($data['upload_data']['full_path'],$data['upload_data']['file_name']);
		}
		echo json_encode($result);	
	}
	function resize($path,$file)
	{
		$config['image_library']='gd2';
		$config['source_image']=$path;
		$config['create_thumb']=false;
		$config['maintain_ratio']=false;	
		$config['width']=120;
		$config['height']=120;
		$config['new_image']='./uploads/inventory/'.$file;
		$this->load->library('image_lib',$config);
		$this->image_lib->resize();		
	}
	public function inventory_add(){
		  $success=$this->inventory_model->inventory_add(); 
				if($success != '') {
					$response['status'] = 'success';
					$response['inven_id'] = $success;
					$response['message'] = 'Exercise  Has Been Added successfully.';
				} else {
					$response['status'] = 'failure';
					$response['message'] = 'Exercise Has not Been Added successfully.';
				}
		echo json_encode($response);  
		     
	}
   public function view(){
		$data['page_name'] = 'inventory';
		$search=$this->uri->segment(4);
		$search1=$this->uri->segment(5);
		if($search == 'productname') {
			$this->db->where('inventory_id',$search1);
			$this->db->select('*');
			$this->db->from("tbl_inventory");
			$this->db->where('client_id',$this->session->userdata('client_id'));
			 
		}
		else if($search == 'producttype') {
			$this->db->where('inventory_id',$search1);
			$this->db->select('*');
			$this->db->from("tbl_inventory");
			$this->db->where('client_id',$this->session->userdata('client_id'));
			 
		}
		else {
			$this->db->select('*');
			$this->db->from("tbl_inventory");
			$this->db->where('client_id',$this->session->userdata('client_id'));
			
			 
		} 
		$query = $this->db->get();
		$data['inventory']=$query->result_array();
		//$data['inventory'] = $this->inventory_model->view_inventory();
		$this->load->view('client/inventory_views',$data); 
	}
   	public function edit_list(){
		$data['page_name'] = 'inventory';
		$inventory_id = $this->uri->segment(4);
		$data['inventory'] = $this->inventory_model->edit_list1($inventory_id);
		//print_r($data['inventory']);
		$this->load->view('client/inventory_product_list',$data);
	}
   
	public function inv_product_edit(){
		$data['page_name'] = 'inventory';
		$color_id = $this->uri->segment(4);
		$data['inventory'] = $this->inventory_model->edi_inventory($color_id);
		//print_r($data['inventory']);
		$this->load->view('client/inv_product_edit',$data);
	}
	public function inv_product_update(){
		$data['page_name'] = 'inventory';
		$data['result'] = $this->inventory_model->inventory_update();
	}
	public function stock_value() {
		$data['page_name'] = 'inventory';
		$id = $this->uri->segment(4);
		$data['inventory'] = $this->inventory_model->stock_inven($id);
		$data['pro_name'] = $this->inventory_model->product_inven($id);
		$this->load->view('client/stock_value',$data);
	}
	public function delete() {
		$result = $this->inventory_model->deleteinventory($_POST['p_id']);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Expense deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Expense deleted successfully.';
		}
		echo json_encode($response);
	}
	public function edit() {
		$var = 0;
		$price2 = $this->input->post('wholesale_price');
		$price1 = $this->input->post('retail_price');
		$price = $this->input->post('buy_price');
		$cost = $this->input->post('initial_cost');
		$stock = $this->input->post('initial_stock');
		$color_id = $this->input->post('color_id');
		$inventory_id = $this->input->post('inventory_id');
		for($i = 0; $i < count($price); $i++){
			$data = array(
					 'initial_cost' => $cost[$i],
					 'buy_price' => $price[$i],
					 'wholesale_price' => $price2[$i],
					 'retail_price' => $price1[$i],
					 'initial_stock' => $stock[$i]
			);
			$this->db->where('color_id',$color_id[$i]);
			$this->db->update('tbl_inventory_color',$data);
		    $var  += $stock[$i];
		}
		
		$this->db->where('inventory_id',$inventory_id[0]);
		$this->db->set('initial_stock',$var);
		$this->db->update('tbl_inventory');
		redirect(base_url().'client/invoice/views','refresh');
	}
    public function sales_report() {
		$data['page_name'] = 'inventory';
		$this->load->model('invoice_model');
		if($this->uri->segment(4) != false ){ 
			$data['invoices'] = $this->inventory_model->search_inventory();
		}
		else {
			$data['invoices']="";
		} 
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$data['inventory'] = $this->invoice_model->getinventoryItems($this->session->userdata('client_id'));
		$this->load->view('client/stock_reports',$data);
	}
	public function inventory_view(){
		$data['page_name'] = 'inventory';
		$inventory_id = $this->uri->segment(4);
		$data['inventory'] = $this->inventory_model->edit_list1($inventory_id);
		$this->load->view('client/inventory_view',$data);
	}
	
	public function inventory_edit(){
		$data['page_name'] = 'inventory';
		$inventory_id = $this->uri->segment(4);
		$data['inv']=$this->inventory_model->edit_inventory($inventory_id);
		$this->load->view('client/inventory_edit',$data);
	}
	 public function update_inventory() {
		$data['page_name'] = 'inventory';
	    $inventory_id = $this->input->post('inventory_id');
	    $success=$this->inventory_model->update_inventory($inventory_id); 
	    if($success == 'True') {
			$response['status'] = 'success';
			$response['message'] = 'Letter  Has Been Updated successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Letter Has Been Updated failure.';
		}
		echo json_encode($response);   
	  }
}