<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {
    public function __construct() {
		header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
		parent::__construct();
		$this->app_access->client();
		$this->load->model(array('referal_model','schedule_model','common_model','invoice_model','settings_model','registration_model','patient_model','advance_model'));
		
	}
	public function index(){
		$data['page_name'] = 'account';
		$data['account_info'] = $this->registration_model->myaccount($this->session->userdata('client_id'));
		$data['sch_settings_inf']= $this->registration_model->editsettings($this->session->userdata('client_id')); 
		$data['profile']= $this->registration_model->editProfile($this->session->userdata('client_id'));
		$this->load->view('client/account',$data);
	}
        public function order_history(){
		$data['page_name'] = 'account';
		$data['account_info'] = $this->registration_model->myaccount($this->session->userdata('client_id'));
		$data['sch_settings_inf']= $this->registration_model->editsettings($this->session->userdata('client_id')); 
		$data['profile']= $this->registration_model->editProfile($this->session->userdata('client_id'));
		
		$data['orderHistory']=$this->registration_model->orderHistory($this->session->userdata('client_id'));
		$this->load->view('client/order_history',$data);
	}
	public function order_details(){
		$data['page_name'] = 'account';
		$data['account_info'] = $this->registration_model->myaccount($this->session->userdata('client_id'));
		$data['sch_settings_inf']= $this->registration_model->editsettings($this->session->userdata('client_id')); 
		$data['profile']= $this->registration_model->editProfile($this->session->userdata('client_id'));
		
		//$data['orderHistory']=$this->registration_model->orderHistory($this->session->userdata('client_id'));
		$data['order_details']=$this->registration_model->orderDetails();
		$this->load->view('client/order_details',$data);
	}
        public function order_invoice(){
		    //$data['page_name'] = 'account';
		$data['account_info'] = $this->registration_model->myaccount($this->session->userdata('client_id'));
		$data['sch_settings_inf']= $this->registration_model->editsettings($this->session->userdata('client_id')); 
		$data['profile']= $this->registration_model->editProfile($this->session->userdata('client_id'));
		$data['bill_client']=$this->registration_model->bill_client();
		
		    $data['order_details']=$this->registration_model->orderDetails();
			/*
			if($order_details['plan_type']==1)
			{
				$data['plan_name']="Professional Plan";
			    $data['plan_amt']="300"
			}
			else if($order_details['plan_type']==2)
			{
				$data['plan_name']="";
			    $data['plan_amt']="500"
			}
			else if($order_details['plan_type']==3)
			{
				$data['plan_name']="";
			    $data['plan_amt']="600"
			}
			else if($order_details['plan_type']==4)
			{
				$data['plan_name']="";
			    $data['plan_amt']="1000"
			}*/
			$html=$this->load->view("client/order_invoice",$data,TRUE);
			$this->load->library('mpdf53/mpdf');
			$this->mpdf=new mPDF('','A4','16','Calibri (Body)',15,15,16,16,9,9);
			$this->mpdf->SetDisplayMode('fullpage');
			$this->mpdf->list_indent_first_level = 0; 
			$stylesheet = file_get_contents('mpdfstyletables.css');
			$this->mpdf->WriteHTML($stylesheet,0);
			$this->mpdf->WriteHTML($html,2);
			$this->mpdf->SetFooter('Powered By : Physio Plus Tech');
			$this->mpdf->Output('OrderInvoice.pdf','I');  
	}




} ?>