<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Renewal extends CI_Controller {
	
	public function __construct() {
		header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
		parent::__construct();
		// load required models
		//$this->load->model(array('client'));
		 // check access permission for owner
		//if( $this->app_access->is_client_logged_in() == true ) redirect( base_url() . 'client/patient/add_patient_info' );
		// user access
		if($this->session->userdata('user_login')) $this->app_access->user_privileges('Invoice');
		$this->load->model(array('advance_model','common_model', 'settings_model','patient_model'));
	}
	public function index() {
		//$this->load->view('client/patient_information');
	}
	
public function upgrate()
	{
		$this->app_access->client();
		$this->load->view('renewal1');
	}
	
	public function adduser()
	{
		$this->app_access->client();
		$this->load->view('adduser1');
	}
	
	public function addlocation()
	{
		$this->app_access->client();
		$this->load->view('addlocation1');
	}
	
	public function addsms()
	{
		$this->app_access->client();
		$this->load->view('addsms1');
	}
	
	public function addsmsp()
	{
		$this->app_access->client();
		$this->load->view('promotional');
	}
	
	public function showMessage()
	{
		$this->load->view('showmessage');
	}
	
	public function changeplan()
	{
		$this->app_access->client();
		$this->load->view('changeplan');
	}
	
	public function changeplan2()
	{
		$this->app_access->client();
		$this->load->view('changeplan2');
	}
	public function buy_ticket()
	{
		$event_id=$this->uri->segment(4);
		$data['client_id']=$this->uri->segment(5);
		$data['event_id']=$this->uri->segment(4);
		$this->legacy_db = $this->load->database('second', true);
		$data['delegate_name'] = $this->anotherdb_model->delegate_type($event_id);
		
		$this->legacy_db = $this->load->database('second', true);
		$this->legacy_db->where('event_id',$event_id);
		$this->legacy_db->select('event_name')->from('tbl_event');
		$query=$this->legacy_db->get();
		$data['eventname'] = $query->row()->event_name;
		$this->load->view('changeplan',$data);
	}
	public function delegate_price() {
		
		$this->load->model('anotherdb_model');
		$result = $this->anotherdb_model->price_details();
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = $result;
			
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function pay_invoice() {
		$data['client_id'] = $this->uri->segment(4);
		$data['bill_id'] = $this->uri->segment(5);
		$data['amount'] = $this->uri->segment(6);
		$this->load->view('invoice_pay',$data);
	}
	public function print_reports($client_id,$patient_id) {
		$this->load->model('patient_model');
		$this->load->model('registration_model');
		if($client_id != false){
			$client_id = $client_id;
		} else {
			$client_id = $this->session->userdata('client_id');
		}
		$data['exercises'] = $this->patient_model->exercise_details($patient_id);
		$data['clientDetails'] = $this->registration_model->editProfile($client_id);
		$data['report'] = $this->settings_model->edit_report($client_id);
		$data['patient'] = $this->patient_model->editPatientinfo($patient_id);
		$data['history'] = $this->patient_model->viewHistory($patient_id);
		$data['chief_comp'] = $this->patient_model->viewChiefcomp($patient_id);
		$data['pain'] = $this->patient_model->viewPain($patient_id);
		$data['examn'] = $this->patient_model->viewExamn($patient_id);
		$data['mexamn'] = $this->patient_model->viewMexamn($patient_id);
		$data['sexamn'] = $this->patient_model->viewSexamn($patient_id);
		$data['investigation'] = $this->patient_model->viewInvestigation($patient_id);
		$data['prov_diag'] = $this->patient_model->viewProvdiag($patient_id);
		$data['goal'] = $this->patient_model->viewGoals($patient_id);
		$data['caseNote'] = $this->patient_model->viewCaseNotes($patient_id);
		$data['plan'] = $this->patient_model->plans($patient_id);
		$data['progNote'] = $this->patient_model->viewProgNotes($patient_id);
		$data['remark'] = $this->patient_model->viewRemarks($patient_id);
		$data['treatment'] = $this->patient_model->viewTreatments($patient_id);
		$data['session_report']=$this->patient_model->report_model($patient_id);
		$data['thoraccic']=$this->patient_model->viewMexamnthoraccic($patient_id);
		$data['cervical']=$this->patient_model->viewMexamncervical($patient_id);
		$data['glascow']=$this->patient_model->glascow($patient_id);
		$data['tests']=$this->patient_model->testsinfo($patient_id);
		$data['adlscore']=$this->patient_model->adlscore($patient_id);
		$data['gait']=$this->patient_model->gait($patient_id);
		$data['function']=$this->patient_model->functional($patient_id);
		$data['special']=$this->patient_model->special($patient_id);
		$data['neural']=$this->patient_model->neural($patient_id);
		$data['verbal']=$this->patient_model->verbal($patient_id);
		$data['masure']=$this->patient_model->measure($patient_id);
		$data['medic']=$this->patient_model->medical($patient_id);
		$data['lumber']=$this->patient_model->lumber($patient_id);
		$data['combine']=$this->patient_model->viewcombined($patient_id);
		$data['bodychart']=$this->patient_model->viewbodychart($patient_id);
		$data['pediatric']=$this->patient_model->viewPaediatric($patient_id);
		$data['ex_protocols'] = $this->patient_model->viewex_protocols($patient_id);
		$this->load->view('client/patient_summary1',$data);  
	
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
	public function invoice_view_print($bill_id,$client_id) {
		$this->load->model('invoice_model');
		$data['page_name'] = 'invoice';
		$data['bill']=$bill_id;
		$where=array('bill_id' => $bill_id);
		$this->db->where($where);
		$this->db->select('subheading')->from('tbl_invoice_header');
		$res = $this->db->get();
		$data['subheading'] = $res->row()->subheading;		
		$data['clientDetails'] = $this->registration_model->editProfile($client_id);
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
		$this->load->view('client/invoice_view_print',$data);
	
	}
    public function re_plan() {
		$patient_id = $this->uri->segment('4');
		$from_date = $this->uri->segment('5');
		$to_date = date('d-m-Y', strtotime('+1 day', strtotime($from_date)));
		$data['factors'] = $this->patient_model->viewfactors($patient_id,$from_date,$to_date);
		$data['plan'] = $this->patient_model->viewrplan($patient_id,$from_date,$to_date);
		$data['patient'] = $this->patient_model->editPatientinfo($patient_id);
		$data['prov_diag'] = $this->patient_model->viewProvdiag($patient_id,$from_date,$to_date);
		$data['goal'] = $this->patient_model->viewGoals1($patient_id,$from_date,$to_date);
		$data['ex_protocols'] = $this->patient_model->viewex_protocols1($patient_id,$from_date,$to_date);
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		//$this->load->view('client/re_plann',$data);
		$html = $this->load->view('client/re_plan',$data,true);	
		$this->load->library('mpdf53/mpdf');
		$this->mpdf=new mPDF('','A4','11','Calibri (Body)',15,15,16,16,9,9);
		$this->mpdf->SetDisplayMode('fullpage');
		$this->mpdf->list_indent_first_level = 0; 
		$stylesheet = file_get_contents('mpdfstyletables.css');
		$this->mpdf->WriteHTML($stylesheet,0);
		$this->mpdf->WriteHTML($html,2);
		$this->mpdf->SetFooter('Powerd By : PhysioPlustech.com');
		$this->mpdf->Output('RCP.pdf','I');
	}
	
	
	
	}?>