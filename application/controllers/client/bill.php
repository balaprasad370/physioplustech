<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bill extends CI_Controller {
   public function __construct() {
	   header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
		parent::__construct();
		$this->app_access->client();
		if($this->session->userdata('user_login')) $this->app_access->user_privileges('Invoice');
		$this->load->model(array('common_model','invoice_model','settings_model','registration_model','patient_model'));
	}
	public function _remap($method, $params = array())
		{
		if($this->session->userdata('duration') == 0 ||  $this->session->userdata('plan') <= 3 ){  
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
	public function expanse(){
		$data['page_name'] = 'expanse';
		$data['items'] = $this->invoice_model->getItems();
		$data['client_items'] = $this->invoice_model->getclientItems();
		$this->load->view('client/expense_add',$data);
	}
	public function getadvanse() {
		$concessionData = $this->common_model->getadvanse();
		echo json_encode($concessionData);
	}
	public function add_expanse() {
		$bill_no=$this->input->post('bill_no');
		echo $this->input->post('total_amt');
		$response = array();
			if($bill_no==''){
				if($query = $this->invoice_model->expanse_info())
				{
					//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Invoice has been added successfully.';
				}
			}else{
					if($query = $this->invoice_model->expanse_edit_info($bill_no))
					{
						//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
						$response['status'] = 'success';
						$response['message'] = 'Invoice has been updated successfully.';
					}
			}
			echo json_encode($response); 
	}
	public function expanse_view(){
		$data['page_name'] = 'expanse';
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$this->db->select('ventor')->from('tbl_expanse');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->group_by('bill_no'); 
		$res = $this->db->get();
		$data['patient_name']= ($res->num_rows() > 0) ? $res->result_array() : false;
		$this->load->model('inventory_model');
		$data['inventory'] = $this->inventory_model->view_inventory();
	    $this->load->view('client/expense_view',$data);
	}
	public function expanse_edit() {
		$data['page_name'] = 'expanse';
		// load default view
		$bill_no=$this->uri->segment(4);
		$data['client_items'] = $this->invoice_model->getclientItems();
		$data['expanseinfo'] = $this->invoice_model->editExpanse($bill_no);
		$data['expansedet'] = $this->invoice_model->editExpansedet($bill_no);
		$data['items'] = $this->invoice_model->getItems();
		$this->load->view('client/expense_edit',$data);
	}
	public function getexpense() {
		$concessionData = $this->common_model->getexpense();
		echo json_encode($concessionData);
	}
   public function delete(){
		$data['page_name'] = 'expanse';
		$bill_no = $this->uri->segment(4);
		$result = $this->invoice_model->deleteexpense($_POST['p_id']);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Expense deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Expense deleted successfully.';
		}
		echo json_encode($response);
		//$this->session->set_flashdata('message', 'Advance has been deleted successfully.');
		
	} 
	public function expense_print() {
		$data['page_name'] = 'expanse';
		// load default view
		$bill_no=$this->uri->segment(4);
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$this->db->select('*');
		$this->db->from("tbl_expanse");
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('bill_no',$bill_no);
		$this->db->group_by('bill_no');
		$query = $this->db->get();
		$data['expinfo']=$query->row_array();
		
		
		$this->db->select('ex.bill_no,ex.bill_id,ex.client_id,ex.item_id,ex.item_desc,ex.item_quantity,ex.item_price,ex.item_amount,ex.total_amt');
		$this->db->from("tbl_expanse ex");
		$this->db->where('ex.client_id',$this->session->userdata('client_id'));
		$this->db->where('ex.bill_no',$bill_no);
		$res = $this->db->get();
		$data['expansedet']=$res->result_array();
		
		$this->load->view('client/expense_print',$data);
	}
	public function apt_details(){
		$response=array();
		$result = $this->registration_model->apt_details($_POST['ref_id']);
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

} ?>