<?php 
/** File name   : dashboard.php
*	Author      : Muthukumar
*	Date        : 27th Mar 2013
*	Description : Controller for physioplus client dashboard.
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoice extends CI_Controller {
	
	public function __construct() {
		header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");

		parent::__construct();
		$this->app_access->client();
		if($this->session->userdata('user_login')) $this->app_access->user_privileges('Invoice');
		$this->load->model(array('common_model','inventory_model','invoice_model','settings_model','registration_model','patient_model','advance_model'));
	}
	
	// redirect index method to home
	public function index() {
		//$this->load->view('client/patient_information');
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
	public function getinvoice() {
		$concessionData = $this->common_model->getinvoice();
		echo json_encode($concessionData);
	}
	// Referal add method
	public function add() {
		$data['page_name'] = 'invoice';
		$this->db->select('notes')->from('tbl_client');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		$data['notes']=$query->row()->notes;  
		$data['page_name'] = 'invoice';
		// load default view
		if($this->uri->segment(6) == ''){
			$data['item_det'] = '';
		} else {
			$app_id = $this->uri->segment(6);
			$data['item_det'] =  $this->common_model->item_details($app_id);
		}
		$data['patient_name'] = $this->common_model->getPatientname_invoice();
		$data['items'] = $this->common_model->getItems();
		$data['consultants'] = $this->common_model->getDoctorname();
		$data['settings'] = $this->settings_model->editSettings($this->session->userdata('client_id'));		
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$data['inventory'] = $this->invoice_model->getinventoryItems($this->session->userdata('client_id'));
		$data['inven_items'] = $this->invoice_model->getItems_list();
		$data['inven'] = $this->invoice_model->getinventory();
		$data['products'] = $this->invoice_model->getproductItems($this->session->userdata('client_id'));
		$data['product_items'] = $this->invoice_model->getproduct_list();
		$data['prod'] = $this->invoice_model->getproduct();
		$data['note'] = $this->common_model->item_detail();
		$id = $this->uri->segment(5);
		if($id != false) { 
		  $data['apts'] = $this->invoice_model->getapts($id);
		} else {
			$data['apts'] =  '';
		}
		$this->load->view('client/invoice_add',$data);
	}
	public function add_invoice1(){
	  $data['page_name'] = 'invoice';
	  $bill_id = $this->input->post('bill_id');
	  $response = array();
	 
   	  if($bill_id==''){
				if($billData = $this->invoice_model->invoice_info())
				{
					//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Staff has been added successfully.';
					$response['billData'] = $billData;
				}
			} else {
				if($billData = $this->invoice_model->edit_invoice_info($bill_id))
				{
					$response['status'] = 'success';
					$response['message'] = 'Staff has been updated successfully.';
					
				}
			}
			
		echo json_encode($response);
	 }
	 
	// Referal add method
	public function views1() {
		
		// load default view
		$data['page_name'] = 'invoice';
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
		
		// search fields
		$info_search = array(
			'PatientName' => 'first_name',
			'PaymentMode' => 'payment_mode'
		);
		
		//do searchby
		$do_searchby = array_search("searchby",$segment_array);
		if($do_searchby != false) {
			$searchType = $this->uri->segment($do_searchby+1);
			$searchby = $this->uri->segment($do_searchby+2);
			$keyword = urldecode($this->uri->segment($do_searchby+3));
			if($searchType == 'info') {
				$keyword = str_replace('_', '/', $keyword);
				$where_condition = "(pi.".$info_search[$searchby]." LIKE '%".$keyword."%')";
				$data['searchBy'] = $searchby;
				$data['keyword'] = $keyword;
			}else if($searchType == 'mode') {
				$keyword = str_replace('_', '/', $keyword);
				$where_condition = "(ih.".$info_search[$searchby]." LIKE '%".$keyword."%')";
				$data['searchBy'] = $searchby;
				$data['keyword'] = $keyword;
			}
		}
		 
		// do date filter
		$do_date = array_search("date",$segment_array);
		if ($do_date !== FALSE)
		{
			$data['dateFilter'] = true;
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+1))));
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+2))));
			$where_condition = "(ih.treatment_date >= '".$from."' AND ih.treatment_date <= '".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
		} 
		
		//Count
		$where_condition = ($where_condition != '') ? $where_condition : '';
		$this->db->select('count(*) as totalrows')->from('tbl_invoice_header ih');
		$this->db->join("tbl_patient_info pi", "ih.patient_id=pi.patient_id");
		$this->db->where('ih.client_id',$this->session->userdata('client_id'));
		$this->db->where('pi.episode_status !=','1');
		if($where_condition!='') $this->db->where($where_condition);
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->select('ih.client_id,ih.treatment_date,ih.due_date,ih.bill_no,ih.bill_id,ih.patient_id,pi.patient_code,pi.first_name,pi.last_name,ih.net_amt,ih.bill_status,ih.paid_amt,ih.payment_mode');
		$this->db->from("tbl_invoice_header ih");
		$this->db->join("tbl_patient_info pi", "ih.patient_id=pi.patient_id");
		$this->db->where('ih.client_id',$this->session->userdata('client_id'));
		$this->db->where('pi.episode_status !=','1');
		
		//do where
		if($where_condition!='') $this->db->where($where_condition);
		//do orderby
		$this->db->order_by('ih.bill_id', 'desc');
		
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
		$data['invoice_record'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		if($data['invoice_record'] == false && (isset($data['searchBy']) || isset($data['dateFilter']))) {
			$data['showTable'] = true;
		} else if($data['invoice_record'] != false) {
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
		$data["pagination"] = $this->pagination->create_links();	
		$data['current_page_segment'] = $current_page_segment;
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$data['patient_name']=$this->common_model->getPatientname();
		$this->load->view('client/invoice_views1',$data);
	}
	public function views(){
		$data['page_name'] = 'invoice';
		$data['inventory'] = $this->inventory_model->stock_value();
		$data['pro_name'] = $this->inventory_model->product_name();
		$this->load->view('client/invoice_views',$data); 
	} 
	// Invoice edit method
	public function edit() {
		$data['page_name'] = 'invoice';
		// load default view
		$bill_id = $this->uri->segment(4);
		$this->db->where('bill_id',$bill_id);
		$this->db->select('patient_id')->from('tbl_invoice_header');
		$val = $this->db->get();
		$id = $val->row()->patient_id;
		
		$data['items'] = $this->common_model->getItems();
		$data['consultants'] = $this->common_model->getDoctorname();
		$data['invoice_hdr'] = $this->invoice_model->editInvoice($bill_id);
		$bill_present = $this->invoice_model->searchBill($bill_id);
		if($bill_present){
			$data['invoice_dtl'] = $this->invoice_model->editInvoiceDetail($bill_id);
		}else{
			$data['invoice_dtl'] = $this->invoice_model->editInvoiceDetail1($bill_id);
		}
		$data['settings'] = $this->settings_model->editSettings($this->session->userdata('client_id'));
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$data['inventory'] = $this->invoice_model->getinventoryItems($this->session->userdata('client_id'));
		$data['inven_items'] = $this->invoice_model->getItems_list();
		$data['products'] = $this->invoice_model->getproductItems($this->session->userdata('client_id'));
		$data['product_items'] = $this->invoice_model->getproduct_list();
		$data['prod'] = $this->invoice_model->getproduct();
		$data['get_staff'] = $this->invoice_model->getInvoice_staff($bill_id);
		$data['apts'] = $this->invoice_model->getapts($id);
		$data['set_apts'] = $this->invoice_model->setapts($bill_id);
		$this->load->view('client/invoice_edit',$data);
	}
	
	public function delete(){
		$data['page_name'] = 'invoice';
		$bill_id = $this->uri->segment(4);
		$result = $this->invoice_model->delete_invoice($_POST['p_id']);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Invoice deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Invoice deleted successfully.';
		}
		echo json_encode($response);
	} 
	
	public function invoice_status_update($bill_id,$patient_id) {
		$data['page_name'] = 'invoice';
		$this->db->where('patient_id',$patient_id);
		$this->db->select('first_name,last_name')->from('tbl_patient_info');
		$res = $this->db->get();
	    $data['name'] = $res->row()->first_name.' '.$res->row()->last_name;	
		$data['invoiceData'] = $this->invoice_model->editInvoice($bill_id);
		$data['settings'] = $this->settings_model->editSettings($this->session->userdata('client_id'));
		$this->load->view('client/invoice_status_change',$data);	
	}
	public function invoiceSendPatientEmail($bill_id,$client_id) {
		$data['page_name'] = 'invoice';
		$invoiceData = $this->invoice_model->editInvoice($bill_id);
		$patientData = $this->patient_model->editPatientinfo($invoiceData['patient_id']);
		$firstName = $patientData['first_name'];
		$lastName = $patientData['last_name'];
		$mobile = $patientData['mobile_no'];
		$data['pat_mobile'] = $mobile;
		$patientName = $firstName.' '.$lastName.' '.$mobile;
		$data['patientName'] = $patientName;
		$data['patientEmail'] = $patientData['email'];
		$data['bill_status'] = $invoiceData['bill_status'];
		$amount = number_format($invoiceData['net_amt'] - $invoiceData['paid_amt']);
		$data['url'] = base_url().'client/emailviews/invoices/'.$bill_id.'/'.$this->session->userdata('client_id');
		$data['url1'] = base_url().'client/renewal/pay_invoice/'.$this->session->userdata('client_id').'/'.$bill_id.'/'.$amount;
		$data['bill_id'] = $bill_id;
		$data['client_id'] = $client_id;
		$this->load->view('client/invoice_email_send',$data);	
	}
	public function product_add1() {  
		$response=array();
		$prov = $this->input->post('provDiag');
		$itemData = $this->invoice_model->add_product();
		if($itemData != false){
			$data['items_det']=$itemData;
			$response['status'] = 'success';
			$response['message'] = 'Item has been added successfully.';
			$response['itemData'] = $itemData;
		}
		else {
			$response['status'] = 'Failure';
			$response['message'] = 'Item  has been updated successfully.';
			$response['itemData'] = $this->input->post('provDiag');
		}
		echo json_encode($response);
	}
	public function invoiceSendPatientEmail_new() {
		$data['page_name'] = 'invoice';
	// declare response array
		$response = array();
		$bill_id = $this->input->post('bill_id');
		$client_id = $this->input->post('client_id');
		
		// Form validation action
		if($invoiceEmail = $this->invoice_model->sendEmailPatient($bill_id,$client_id))
		{
			$response['status'] = 'success';
			$response['message'] = 'Invoice has been sent successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Invoice has not been sent successfully.';
		}
	     echo json_encode($response);
		 //redirect(base_url().'client/invoice/views'); 
		}
	 public function invoice_view($bill_id) {
		$data['page_name'] = 'invoice';
		$data['bill']=$bill_id;
		$where=array('bill_id' => $bill_id);
		$this->db->where($where);
		$this->db->select('subheading')->from('tbl_invoice_header');
		$res = $this->db->get();
		$data['subheading'] = $res->row()->subheading;		
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$invoice_header = $this->invoice_model->editInvoice($bill_id);
		$data['invoice_hdr'] = $invoice_header;
		$bill_present = $this->invoice_model->searchBill($bill_id);
		$data['datedet'] = $this->invoice_model->datedetail($bill_id);
		$data['datedet1'] = $this->invoice_model->datedetail1($bill_id);
		if($bill_present){
			$data['invoice_dtl'] = $this->invoice_model->editInvoiceDetail($bill_id);
		}else{
			$data['invoice_dtl'] = $this->invoice_model->editInvoiceDetail1($bill_id);
		}
		$data['invoice_payment'] = $this->invoice_model->getInvoicePayments($bill_id);
		$data['patient'] = $this->patient_model->editPatientinfo($invoice_header['patient_id']);
		$data['advanceBalance'] = $this->advance_model->advanceBalance($invoice_header['patient_id']);
		$this->load->view('client/invoice_view',$data);
	}
	public function invoice_view_print($bill_id) {
		$data['page_name'] = 'invoice';
		$data['bill']=$bill_id;
		$where=array('bill_id' => $bill_id);
		$this->db->where($where);
		$this->db->select('subheading')->from('tbl_invoice_header');
		$res = $this->db->get();
		$data['subheading'] = $res->row()->subheading;		
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$invoice_header = $this->invoice_model->editInvoice($bill_id);
		$data['invoice_hdr'] = $invoice_header;
		$bill_present = $this->invoice_model->searchBill($bill_id);
		if($bill_present){
			$data['invoice_dtl'] = $this->invoice_model->editprintDetail($bill_id);
		}else{
			$data['invoice_dtl'] = $this->invoice_model->editprintDetail1($bill_id);
		}
		$data['invoice_payment'] = $this->invoice_model->getInvoicePayments($bill_id);
		$data['patient'] = $this->patient_model->editPatientinfo($invoice_header['patient_id']);
		$data['advanceBalance'] = $this->advance_model->advanceBalance($invoice_header['patient_id']);
		$data['treatment'] = $this->patient_model->viewTreatments1($bill_id);
		$this->load->view('client/invoice_view_print',$data);
	}
	public function update_invoice_status() {
		$data['page_name'] = 'invoice';
		// declare response array
		
		$bill_id=$this->input->post('bill_id');
		
		// Form validation action
		if($invoiceEmail = $this->invoice_model->status_update($bill_id))
		{
			$response['status'] = 'success';
			$response['message'] = 'Invoice has been sent successfully.';
		    $response['responseData'] = $this->invoice_model->editInvoice($bill_id);
			} else {
			$response['status'] = 'failure';
			$response['message'] = 'Invoice has not been sent successfully.';
		}
		//echo json_encode($response);
		echo json_encode($response);
	}
	
		public function item_add($selectBoxId) {
		$data['selectBoxId'] = $selectBoxId;
		$data['items'] = $this->common_model->getItems();
		$this->load->view('client/iframe/item_add',$data);	
	}
	
	
	public function add_patient() {
		$prov = $this->input->post('provDiag');
		$PatientId = $this->input->post('patient_id');
		if($PatientId == ''){
					if($patientData = $this->invoice_model->addpatient($prov)){
						$response['status'] = 'success';
						$response['message'] = 'Patient has been added successfully.';
						$response['patientData'] = $patientData;
					}
			} else if($PatientId != '') {
					if($locationData = $this->invoice_model->editpatient($PatientId)) {
						$response['status'] = 'success';
						$response['message'] = 'Patient has been updated successfully.';
					}
				} else { 
						$response['status'] = 'Failure';
						$response['message'] = 'Patient group has been updated successfully.';
						$response['patientData'] = $this->input->post('provDiag');
				}
		echo json_encode($response);
	}
	
	public function item_add1() {
		$prov = $this->input->post('provDiag');
		$itemId = $this->input->post('item_id');
		$response=array();
		if($itemId == ''){
					if($itemData = $this->invoice_model->add_item($prov)){
						$data['items_det']=$itemData;
						$response['status'] = 'success';
						$response['message'] = 'Item has been added successfully.';
						$response['itemData'] = $itemData;
						
					}
			} else if($itemId != '') {
					if($locationData = $this->invoice_model->edit_item($itemId)) {
						$response['status'] = 'success';
						$response['message'] = 'Item has been updated successfully.';
					}
				} else { 
						$response['status'] = 'Failure';
						$response['message'] = 'Item  has been updated successfully.';
						$response['itemData'] = $this->input->post('provDiag');
				}
		echo json_encode($response);
	}
	public function export_invoice(){
		$this->load->library('export');
		$data['page_name'] = 'invoice';
		$segment_array = $this->uri->segment_array();
			
		$search=str_replace('%20',' ',$this->uri->segment(4));
		$search1=str_replace('%20',' ',$this->uri->segment(5));
		$search2=str_replace('%20',' ',$this->uri->segment(6));
		if($search == 'date'){
			//$data['dateFilter'] = true;
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment(5))));
		   //echo $from;
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment(6))));
			//echo $to;
			$where_condition = "(treatment_date >= '".$from."' AND treatment_date <='".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
			$this->db->where($where_condition);
			$this->db->where('pi.client_id',$this->session->userdata('client_id'));
			$this->db->select('pv.treatment_date,pv.bill_no,pi.patient_code,pi.first_name,pi.last_name,pv.net_amt,pv.paid_amt,pv.payment_mode');
		    $this->db->from("tbl_patient_info pi");
		    $this->db->join("tbl_invoice_header pv", "pi.patient_id=pv.patient_id");
		    $this->db->order_by('pv.treatment_date','DESC');
			}
		else {
		$this->db->select('pv.treatment_date,pv.bill_no,pi.patient_code,pi.first_name,pi.last_name,pv.net_amt,pv.paid_amt,pv.payment_mode');
		$this->db->from("tbl_patient_info pi");
		$this->db->join("tbl_invoice_header pv", "pi.patient_id=pv.patient_id");
		$this->db->where('pv.client_id',$this->session->userdata('client_id'));
		
		}
		
		$query=$this->db->get();
		$this->export->to_excel($query, 'invoice_report');
	} 
		
  public function add_Pat() {
		$prov = $this->input->post('provDiag');
		if($concessionData = $this->invoice_model->add_patient($prov)){
			$response['status'] = 'success';
			$response['message'] = 'Referal  has been added successfully.';
			$response['PatientData'] = $concessionData;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
			
		}
		echo json_encode($response);
	}
	public function confirm_invoice(){
		$c_id = $this->uri->segment(4);
		$p_id = $this->uri->segment(5);
		$amount = $this->uri->segment(6);
		$this->db->where('patient_id',$p_id);
		$this->db->set('paid_amt',$amount);
		$this->db->set('bill_status','1');
		$this->db->update('tbl_invoice_header');
		
		$this->db->where('patient_id',$p_id);
		$this->db->select('bill_id')->from('tbl_invoice_header');
		$res = $this->db->get();
		$bill_id = $res->row()->bill_id;
		$this->registration_model->app_add1($c_id,$amount,$p_id);
		$order = "Invoice";
		$this->mail_model->sentpaypal($c_id,$amount,$order);  
		$this->mail_model->sentapp_paypal_patient1($c_id,$amount,$p_id,$order);
		redirect(base_url().'client/emailviews/invoices/'.$bill_id.'/'.$c_id); 
	}
	public function confirmapp_invoice(){
		$c_id = $this->uri->segment(4);
		$bill_id = $this->uri->segment(5);
		$this->db->where('bill_id',$bill_id);
		$this->db->select('paid_amt,total_amt,patient_id')->from('tbl_invoice_header');
		$res = $this->db->get();
		$p_amt = $res->row()->paid_amt;
		$t_amt = $res->row()->total_amt;
		$patient_id = $res->row()->patient_id;
		
		$amt = $t_amt - $p_amt;
		
		$data = array(
			 'client_id' => $c_id,
			 'bill_id' => $bill_id,
			 'payment_mode' => 'Card Payment',
			 'payment_date' => date('Y-m-d'),
			 'paid_amt' => $amt,
			 'cheque_date' => date('Y-m-d'),
		);
		$this->db->insert('tbl_invoice_payments',$data);
		$id = $this->db->insert_id();
		
		$this->db->where('bill_id',$bill_id);
		$this->db->set('bill_status',1);
		$this->db->set('paid_amt',$t_amt);
		$this->db->update('tbl_invoice_header');
		
		$data = array(
			 'client_id' => $c_id,
			 'bill_id' => $bill_id,
			 'payment_date' => date('Y-m-d'),
			 'patient_id' => $patient_id,
			 'amount' => $amt,
		);
		$this->db->insert('invoice_wallet',$data);
		redirect(base_url().'client/emailviews/invoices/'.$bill_id.'/'.$c_id); 
	}
	public function invoiceSendPatientSms() {
		 $bill_id =  $this->uri->segment(4);
		 $client_id =  $this->uri->segment(5);
		 $profile_info = $this->registration_model->editProfile($this->session->userdata('client_id'));
		 $sms_count = $profile_info['sms_count'];
		 $sms_limit = $profile_info['total_sms_limit'];
		 $clinic_name = $profile_info['clinic_name'];
		 if($sms_limit > $sms_count){
			    $this->db->where('bi.bill_id',$bill_id);
				$this->db->select('pi.first_name,pi.mobile_no,bi.due_date')->from('tbl_invoice_header bi');
				$this->db->join('tbl_patient_info pi','bi.patient_id=pi.patient_id');
				$res = $this->db->get();
				$title = $res->row()->first_name;
				$mobile_no = $res->row()->mobile_no;
				$date = date('d-m-Y',strtotime($res->row()->due_date));
			    $message_doctor = 'Dear '.$title.', You have received a bill dated on '.$date.' from '.$clinic_name.' to view the bill in the app Link https://play.google.com/store/apps/developer?id=PHYSIO%20PLUS&hl=en';
				$smsUrl = 'http://www.smsgatewaycenter.com/library/send_sms_2.php?UserName=klakshman&Password=Smspwd@2016&Type=Individual&To='.$mobile_no.'&Mask=PHYSIO&Message='.urlencode($message_doctor);
				$sms['doctor'] = 'Done';
				$sms_count+=1;
				$churl = @fopen($smsUrl,'r');
				fclose($churl); 
				$length = strlen($message_doctor);
				$cost = ceil($length/160);
				if(!$churl){ }else{
					$this->db->query('update tbl_client set sms_count = sms_count + '.$cost.' where status = 1 and client_id ='.$this->session->userdata('client_id'));
				} 
		  }
		  redirect(base_url().'clien/invoice/views');
	}
	
}