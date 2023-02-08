<?php 
/** File name   : dashboard.php
*	Author      : Muthukumar
*	Date        : 27th Mar 2013
*	Description : Controller for physioplus client dashboard.
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Patient extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		// load required models
		$this->load->model(array('appoinment_model','patientmodel','mail_model','registration_model','invoice_model','advance_model'));
	}
	
	// redirect index method to home
	public function index() {
		redirect( base_url() . 'client/dashboard/home' );	
	}
	
	// Client login method
	public function login() {
		if( $this->app_access->is_patient_logged_in() == true ) redirect( base_url() . 'patient/patient/login' );
		// load default view
		$this->load->view('patient/login');
	}
	
	public function setpassword($email){
		$data['email']=$email;
		$this->load->view('patient/password',$data);
	}
	
	public function success(){
		$data['page_name'] ="success";
		$this->load->view('patient/success',$data);
	}
	
	public function psetpassword(){
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form'));
		$email = $this->input->post('email');
		$password = $this->input->post('password2');
		$this->db->select('*')->from('tbl_patient_info')->where('email',$email);
		$result=$this->db->get();
		if($result->num_rows()>0 && $result->row()->email == $email){
			$result = $this->patientmodel->PPassword($email,$password);
			echo 'Password Set Successfully';
		}else{
			$this->session->set_flashdata('client_login_error', '<div class="NewError1" align="center"><font color="red"><strong>Error!</strong> Access denied! Unauthorized User.  </font></div>');
			redirect( base_url() . 'patient/patient/setpassword/'.$email );
		}
	}
	
	public function plogin(){
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form'));
		// validation rules
		$this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'trim|required|max_length[25]|alpha_dash|xss_clean');
		// Error deliminators
		$this->form_validation->set_error_delimiters('<div class="NewError">', '</div>');
		// Form validation action
		if( $this->form_validation->run() == TRUE ) {
			$this->patientmodel->check_login();
		}else{
		// load default view
			$this->load->view('patient/login');
		}
	}
	public function appointment_details() {  
		$data['main_menu'] = 'appointment';
		$data['sub_menu'] = 'Appointment View';
		$this->db->where('patient_id',$this->session->userdata('patient_id'));		
		$this->db->select('*')->from('tbl_patient_info');
		$result=$this->db->get();
		$client_id=$result->row()->client_id;
		$patient_id = $this->session->userdata('patient_id');
		$data['appointments'] = $this->patientmodel->appointment_details($client_id,$patient_id);
	    $this->load->view('patient/appointment_view',$data);
		
	}
	public function home(){
		$this->app_access->patient();
		$data['main_menu'] = 'dashboard';
		$data['sub_menu'] = '';
		$data['numvisit'] = $this->patientmodel->getnumVisit();
		$data['duevisit'] = $this->patientmodel->getnumDueVisit();
		$data['cancelappoin'] = $this->patientmodel->getCancel();
		$result1 = $this->db->query('SELECT DATE_SUB( CURDATE( ) , INTERVAL 7 DAY ) as start_date FROM dual');
		$result2 = $this->db->query('SELECT DATE_ADD( CURDATE( ) , INTERVAL 7 DAY ) as end_date FROM dual');
		foreach($result1->result() as $date)
		{
			$from_date = $date->start_date;
		}
		
		foreach($result2->result() as $date)
		{
			$to_date = $date->end_date;
		}
		$data['timeline'] = $this->patientmodel->getTimeline($from_date,$to_date);
		$this->load->view('patient/index',$data);
	}
	
	public function logout(){
		$data=array(
				'patient_login' => false,
				'first_name' => 0,
				'last_name' => 0,
				'client_id' => 0,
				'patient_id' => 0,
				'patient_code' => 0,
				'gender' => 0,
				'dob' => 0,
				'age' => 0,
				'marital_status' => 0,
				'height' => 0,
				'weight' => 0,
				'bmi' =>0,
				'occupation' => 0,
				'address_line1' =>0,
				'address_line2' => 0,
				'city' => 0,
				'pincode' => 0,
				'mobile_no' => 0,
				'email' => 0,
			);
		$this->session->sess_destroy();
		$this->session->unset_userdata($data);
		redirect(base_url()."patient/patient/home");
	}
	
	 public function case_report(){
		$data['main_menu'] = 'report';
		$data['sub_menu'] = 'case report';
		$data['case_notes'] = $this->patientmodel->getCaseNotes();
		$data['progress_notes'] = $this->patientmodel->getProgressNotes();
		$data['remark'] = $this->patientmodel->getRemark();
		$data['history'] = $this->patientmodel->getHostory();
		$data['chiefcom'] = $this->patientmodel->getChef();
		$data['pain'] = $this->patientmodel->getPain();
		$data['exam'] = $this->patientmodel->getExam();
		$data['motor'] = $this->patientmodel->getMotor();
		$data['sexam'] = $this->patientmodel->getSexam();
		$data['investigation'] = $this->patientmodel->getInvestigation();
		$data['provisional'] = $this->patientmodel->getProvisional();
		$data['goal'] = $this->patientmodel->getGoal();
		$data['treatment'] = $this->patientmodel->getTreatment();
		$this->load->view('patient/case_report', $data);
	} 
	public function bill_report(){
		$data['main_menu'] = 'report';
		$data['sub_menu'] = 'bill report';
		$data['invoice'] = $this->patientmodel->getInvoiceBill();
		$this->load->view('patient/bill_report', $data);
	}
	public function feedback(){
		$data['main_menu'] = 'feed back';
		$data['sub_menu'] = ' ';
		$data['consultants'] = $this->patientmodel->getDoctorname();
		$this->load->view('patient/feedback',$data);
	}
	
	public function add_feedback(){
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form'));
		$this->form_validation->set_rules('Consultant', 'consultant', 'trim|required|xss_clean');
		$this->form_validation->set_rules('visitdate', 'appoinment date', 'trim|required|xss_clean');
		
		if( $this->form_validation->run() == TRUE ) {
			if($this->patientmodel->feedback_add()){
				$response['status'] = 'success';
				$response['message'] = 'Feed Back has been added successfully.';
			}else{
				$response['status'] = 'failure';
				$response['message'] = 'Feed Back added Failure.';
			}		}else{
			$response['status'] = 'failure';
			$response['message'] = $this->form_validation->error_array();
		}
		echo json_encode($response);
	}
	
	public function exercise(){
		$data['main_menu'] = 'Exercise';
		$data['sub_menu'] = ' ';
		$data['Exe_list'] = $this->patientmodel->getExecriseList();
		$this->load->view('patient/exercise_view',$data);
	}
	
	public function exercise_view($chard_no){
		$data['main_menu'] = 'Exercise';
		$data['sub_menu'] = ' ';
		$data['Exe_list'] = $this->patientmodel->getExecrise($chard_no);
		$this->load->view('patient/exercise',$data);
	}
	
	public function forgetpassword(){
		$email =$_POST['email'];
		$this->load->helper('email');
		if (valid_email($email))
		{
			$response['status'] = 'success';
			$response['message'] = 'Email Sent successfully.';
		}
		else
		{
			$response['status'] = 'failure';
			$response['message'] = 'Invalid Email Id.';
		}
		$url = base_url().'patient/patient/setpassword/'.$email;
		$Message = $this->mail_model->forgettemplate($url);
		$adminMailConfig = array('to' => $email, 'subject' => '[Physio Plus Tech]Reset Your Account', 'message' => $Message);
		$this->mail_model->sendForgetPass($adminMailConfig);
		echo json_encode($response);
	}
	 public function invoice_view()
	{
		$this->db->where('patient_id',$this->session->userdata('patient_id'));		
		$this->db->select('*')->from('tbl_patient_info');
		$result=$this->db->get();
		$client_id=$result->row()->client_id;
		$this->db->where('patient_id',$this->session->userdata('patient_id'));
		$this->db->select('bill_id')->from('tbl_invoice_header');
		$result=$this->db->get();	
		$bill_id=$result->row()->bill_id;		
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
		$this->load->view('patient/invoice_view',$data);
		
	} 
	public function appointment(){
		$data['main_menu'] = 'appointment';
		$data['sub_menu'] = 'book Appointment';
		$this->db->where('patient_id',$this->session->userdata('patient_id'));		
		$this->db->select('client_id')->from('tbl_patient_info');
		$res = $this->db->get();
		$client_id = $res->row()->client_id;
		$data['sch_slot'] = $this->appoinment_model->sch_slot($client_id);
		$data['sch_times'] = $this->appoinment_model->sch_times($client_id);
		$this->load->view('patient/book_appointment',$data);
	}
	
	public function add_appointment(){
		$data['main_menu'] = 'appointment';
		$response = array();
		$result = $this->appoinment_model->add();
	}
}