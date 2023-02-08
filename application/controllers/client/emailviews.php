<?php 
/** File name   : dashboard.php
*	Author      : Muthukumar
*	Date        : 27th Mar 2013
*	Description : Controller for physioplus client dashboard.
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Emailviews extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model(array('patient_model','invoice_model','registration_model'));
	}
	
	// redirect index method to home
	public function index() {
		//$this->load->view('client/patient_information');
	}
	
	// Client login method
	public function invoice($bill_id,$client_id) {
		$this->db->where('bill_id',$bill_id);
		$this->db->select('patient_id')->from('tbl_invoice_header');
		$res = $this->db->get();
		$data['patient_id'] = $res->row()->patient_id;
		 $invoice_header = $this->invoice_model->editInvoice($bill_id);
		$data['clientDetails'] = $this->registration_model->editProfile($client_id);
		$data['invoice_hdr'] = $invoice_header;
		$bill_present = $this->invoice_model->searchBill($bill_id);
		if($bill_present){
			$data['invoice_dtl'] = $this->invoice_model->editprintDetail($bill_id);
		}else{
			$data['invoice_dtl'] = $this->invoice_model->editprintDetail1($bill_id);
		}$data['invoice_payment'] = $this->invoice_model->getInvoicePayments($bill_id);
		$data['patient'] = $this->patient_model->editPatientinfo($invoice_header['patient_id']);
	    $data['bill_id'] = $bill_id;
		//$data['treatment'] = $this->patient_model->viewTreatments1($bill_id);
		$this->load->view('client/invoice_email_view',$data);
	}
	
	public function invoices($bill_id,$client_id) {
		$invoice_header = $this->invoice_model->editInvoice($bill_id);
		$data['clientDetails'] = $this->registration_model->editProfile($client_id);
		$data['invoice_hdr'] = $invoice_header;
		$bill_present = $this->invoice_model->searchBill($bill_id);
		if($bill_present){
			$data['invoice_dtl'] = $this->invoice_model->editprintDetail($bill_id);
		}else{
			$data['invoice_dtl'] = $this->invoice_model->editprintDetail1($bill_id);
		}$data['invoice_payment'] = $this->invoice_model->getInvoicePayments($bill_id);
		$data['patient'] = $this->patient_model->editPatientinfo($invoice_header['patient_id']);
		$data['bill_id'] = $bill_id;
		//$data['treatment'] = $this->patient_model->viewTreatments1($bill_id);
		$this->load->view('client/invoice_email',$data);
	
	}
	
}