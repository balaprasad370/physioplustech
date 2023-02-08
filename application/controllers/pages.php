<?php 
/** File name   : dashboard.php
*	Author      : Muthukumar
*	Date        : 27th Mar 2013
*	Description : Controller for physioplus client dashboard.
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		//$this->app_access->client(); // check access permission for owner
		$this->load->model(array('registration_model','newsletter_model'));
	}
	
	// redirect index method to home
	public function index() {
		//$this->load->view('client/patient_information');
	}
	
	//email verification
	public function email_verification() {
		$data['page_name']='';
		$verification_code = $this->uri->segment(3);
		$email_verification = $this->registration_model->emailVerificationCheck($verification_code);
		if($email_verification['email_verified'] == 1){
			$data['confirmation'] = 'Your email has been already verified';
		}else if($email_verification['email_verified'] == 0){
			$this->registration_model->emailStatusChange($verification_code);
			$data['confirmation'] = 'Email has been verified successfully. Now login to your account by clicking the link below.';
		}else{
			$data['confirmation'] = 'Wrong verification code';
		}
		$this->load->view('frontend/registrationconfirmation1',$data);
	}
	
	//home page
	public function home() {
		// loading libraries and helpers
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form'));
		
		// validation rules
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|callback_alreadyExists_email|max_length[100]|xss_clean');
		
		$this->form_validation->set_error_delimiters('<div class="error"><p>', '</p></div>');
		
		// Form validation action
		if($this->form_validation->run() == TRUE){
			$this->newsletter_model->add_newsletter();
			$this->session->set_flashdata('message', 'Thank you for signing up for the newsletter.');
			redirect(base_url().'pages/home', 'refresh');	
		}
		$this->load->view('index');
	}
	
	//callback checking for email exists
	public function alreadyExists_email()
	{
		$email=$this->input->post('email');
		$this->db->select('email')->from('tbl_newsletter_subscription')->where('email = "'. $email.'" ');
		$result=$this->db->get();
		if($result->num_rows()>0)
		{
			$this->form_validation->set_message('alreadyExists_email', 'email already exists');
			return false;
		} else 	{
			return true;
		}
	}
	public function app_reg() {
		$this->load->view('frontend/app');
	}
	//features page
	public function features() {
		$this->load->view('features');
	}
	
	//documentation page
	public function documentation() {
		$this->load->view('documentation');
	}
	
	//scheduling page
	public function scheduling() {
		$this->load->view('scheduling');
	}
	
	//practice_management page
	public function practice_management() {
		$this->load->view('practice_management');
	}
	
	//billing page
	public function billing() {
		$this->load->view('billing');
	}
	
	//why_physioplus page
	public function why_physioplus() {
		$this->load->view('why_physioplus');
	}
	
	//pt_focused page
	public function pt_focused() {
		$this->load->view('pt_focused');
	}
	
	//access_anywhere page
	public function access_anywhere() {
		$this->load->view('access_anywhere');
	}
	
	//no_it page
	public function no_it() {
		$this->load->view('no_it');
	}
	
	//easy_use page
	public function easy_use() {
		$this->load->view('easy_use');
	}
	
	//faq page
	public function faq() {
		$this->load->view('faq');
	}
	
	//upgrade_pricing page
	public function upgrade_pricing() {
		$this->load->view('upgrade_pricing');
	}
	
	//about_us page
	public function about_us() {
		$this->load->view('about_us');
	}
	
	//our_team page
	public function our_team() {
		$this->load->view('our_team');
	}
	
	//career page
	public function career() {
		$this->load->view('career');
	}
	
	//terms page
	public function terms() {
		$this->load->view('terms');
	}
   
   public function user_agreement() {
		$this->load->view('user_agreement');
	}
	//privacy page
	public function privacy() {
		$this->load->view('privacy');
	}
	
	//contact_us page
	public function contact_us() {
		// loading libraries and helpers
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form'));
		
		// validation rules
		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required|callback_phone|xss_clean');
		$this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');
		$this->form_validation->set_rules('captcha', 'captcha', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<div class="error-contact"><p>', '</p></div>');
		
		// Form validation action
		if($this->form_validation->run() == TRUE){
			$this->session->set_flashdata('message', 'Your details has been submitted successfully.');
			$message = $this->mail_model->mail_template($this->input->post('name'),$this->input->post('email'),$this->input->post('phone'),$this->input->post('message'));
			$contactMessage = array('to' => 'contact@physioplusnetwork.com', 'subject' => 'Contact message - physioplustech.in', 'message' => $message);
			//$this->mail_model->sendEmail($contactMessage);
			redirect(base_url().'frontend/contact', 'refresh');	
		}
		$this->load->view('contact_us');
	}
	
	public function phone($data){
		if($data!=''){
			if(!preg_match('/^[0-9\+\-]+$/',$data)){
				$this->form_validation->set_message('phone', "Valid Phone number please.");
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}	
	}
	
	
	public function uptime()
	{
		$this->load->view('physioadmin/uptimerobot');
	}
	
	public function changeplan()
	{
		$this->load->view('changeplan');
	}
	
	public function recoup()
	{
		$this->load->view('recoup_view');
	}
	
	public function deactive()
	{
		$dateStart =date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('start'))));
		$expire_date = $this->db->query("SELECT DATE_ADD('".$dateStart."',INTERVAL 365 DAY) as expire from dual");
		
		foreach($expire_date->result() as $days)
		{
			$ex_date = $days->expire;
		} 
		
		$recoup_info = array(
			'reg_date' => $dateStart,
			'expire_date' => $ex_date,
			'duration' => 365
		);
		
		$this->db->update('valitity',$recoup_info);
	}
	
	public function user_available()
	{
		$username = $_POST['username'];
		$this->db->select('username')->from('tbl_client')->where('username',$username);
		$result = $this->db->get();
		if ($result->num_rows()>0) { 
			echo '<font color="#cc0000"><STRONG>'.$username.'</STRONG> is already in use.</font>'; 
		} else{ echo 'OK'; }
	}
	
	public function contest()
	{
		$this->load->view('contest');
	}
	
	
	public function pdf()
	{
			$code = $this->input->post('code');
			$ex = explode('-',$code);
			$data['code']=$ex[1];
			$where = array('verifycode' => $ex[1] );
			$this->db->where('client_id',$ex[2]);
			$this->db->select('*')->from('save_chart');
			$this->db->where($where);
			$query = $this->db->get();
			$data['status'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		    $data['sta'] = $ex[0];
			$html=$this->load->view("client_pdf",$data,TRUE);
			$this->load->library('mpdf53/mpdf');
			$this->mpdf=new mPDF('','A4','16','Calibri (Body)',15,15,16,16,9,9);
			$this->mpdf->SetDisplayMode('fullpage');
			$this->mpdf->list_indent_first_level = 0; 
			$stylesheet = file_get_contents('mpdfstyletables.css');
			$this->mpdf->WriteHTML($stylesheet,0);
			$this->mpdf->WriteHTML($html,2);
			$this->mpdf->SetFooter('Powerd By : Physio Plus Tech');
			$this->mpdf->Output('Physiocontest.pdf','I');    
		//$this->load->view('client_pdf',$data);
	}
	public function default_pdf()
	{
			//$code = $this->input->post('code');
			$code = $this->input->get('code');
			$ex = explode('-',$code);
			$data['code']=$ex[1];
			$where = array('verifycode' => $ex[1] );
			//$this->db->where('client_id',$ex[2]);
			$data['cid'] =$ex[2];
			$this->db->select('*')->from('default_chart');
			$this->db->where($where);
			$query = $this->db->get();
			$data['status'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		    $data['sta'] = $ex[0];
			$html=$this->load->view("chart_client_pdf",$data,TRUE);
			$this->load->library('mpdf53/mpdf');
			$this->mpdf=new mPDF('','A4','16','Calibri (Body)',15,15,16,16,9,9);
			$this->mpdf->SetDisplayMode('fullpage');
			$this->mpdf->list_indent_first_level = 0; 
			$stylesheet = file_get_contents('mpdfstyletables.css');
			$this->mpdf->WriteHTML($stylesheet,0);
			$this->mpdf->WriteHTML($html,2);
			$this->mpdf->SetFooter('Powerd By : Physio Plus Tech');
			$this->mpdf->Output('Physiocontest.pdf','I');    
		//$this->load->view('client_pdf',$data);
	}
	
/*
	public function pdf_verification()
	{
		$data['pay'] = $this->uri->segment(3);
		if($this->uri->segment(3) == 'free' || $this->uri->segment(3) == 'Free' || $this->uri->segment(3) == 'Paid' || $this->uri->segment(3) == 'paid'){
			$data['c_id'] = $this->uri->segment(4);
			$p_id = $this->uri->segment(5);
			$data['p_id'] = $this->uri->segment(5);
			$data['code'] = $this->uri->segment(6);
			    $code_id = $this->uri->segment(6);
				$status = explode('-',$code_id);
				$this->db->where('verifycode',$status[1]);
				$this->db->where('client_id',$this->uri->segment(4));
				$this->db->select('chard_no')->from('save_chart');
				$res = $this->db->get();
				$chart_id = $res ->row()->chard_no;
								
				$this->db->where('chart_no',$chart_id);
				$this->db->where('client_id',$this->uri->segment(4));
				$this->db->select('t_status,amount,chartname,chart_no')->from('prescription_detail')->where('patient_id',$p_id);
				$res1 = $this->db->get();
					$data['chart'] = $res1 ->row()->chartname;
				    $data['chart_no'] = $res1 ->row()->chart_no;
				   	$data['amount'] = $res1->row()->amount;
				if($res1->row()->amount != 0){
					if($res1->row()->t_status != 0){
						$data['pay'] = 'free';
					} else {
					    $data['pay'] = 'paid';
					}
				}  else {
						$data['pay'] = 'free';
					}
			
		} else {
			$data['c_id'] = $this->uri->segment(3);
			$p_id = $this->uri->segment(4);
			$data['p_id'] = $this->uri->segment(4);
			$data['code'] = $this->uri->segment(5);
			$code_id = $this->uri->segment(5);
			$data['pay'] = 'free';
		}
		
		$this->load->view('pdfverify',$data);  
	}
	
	public function default_pdf_verification()
	{
		$data['pay'] = $this->uri->segment(3);
		if($this->uri->segment(3) == 'free' || $this->uri->segment(3) == 'paid'){
			$data['c_id'] = $this->uri->segment(4);
			$p_id = $this->uri->segment(5);
			$data['p_id'] = $this->uri->segment(5);
			$data['code'] = $this->uri->segment(6);
			$code_id = $this->uri->segment(6);
			if($this->uri->segment(3) != 'free'){
				$status = explode('-',$code_id);
				if($status[0] == 'public'){
					$this->db->where('verifycode',$status[1]);
					$this->db->where('client_id',$this->uri->segment(4));
					$this->db->select('chard_no')->from('save_chart');
					$res = $this->db->get();
					$chart_id = $res ->row()->chard_no;
				} else {
					$this->db->where('verifycode',$status[1]);
					$this->db->select('chard_no')->from('save_privatechart');
					$res = $this->db->get();
					$chart_id = $res ->row()->chard_no;
				}
				$this->db->where('chart_no',$chart_id);
				$this->db->where('pay','paid');
				$this->db->where('t_status','0');
				$this->db->select('amount')->from('prescription_detail')->where('patient_id',$p_id);
				$res = $this->db->get();
				if($res->result_array() != false){
					$data['amount'] = $res->row()->amount;
				}  else {
						$data['pay'] = 'free';
					}
				} else {
					$data['pay'] = 'free';
				}
		} else {
			$data['c_id'] = $this->uri->segment(3);
			$p_id = $this->uri->segment(4);
			$data['p_id'] = $this->uri->segment(4);
			$data['code'] = $this->uri->segment(5);
			$code_id = $this->uri->segment(5);
			$data['pay'] = 'free';
		}
		
		$this->load->view('pdfverify',$data);  
	}   */

        // altered exercise chart view

        
        public function pdf_verification()
	{
		$data['pay'] = $this->uri->segment(3);
		if($this->uri->segment(3) == 'free' || $this->uri->segment(3) == 'Free' || $this->uri->segment(3) == 'Paid' || $this->uri->segment(3) == 'paid'){
			$data['c_id'] = $this->uri->segment(4);
			$p_id = $this->uri->segment(5);
			$data['p_id'] = $this->uri->segment(5);
			$data['code'] = $this->uri->segment(6);
			    $code_id = $this->uri->segment(6);
				$status = explode('-',$code_id);
				
				if($status[0] == 'public'){
					$this->db->where('verifycode',$status[1]);
					$this->db->where('client_id',$this->uri->segment(4));
					$this->db->select('chard_no')->from('save_chart');
					$res = $this->db->get();
					$chart_id = $res ->row()->chard_no;
				} else {
					$this->db->where('verifycode',$status[1]);
					$this->db->select('chard_no')->from('save_privatechart');
					$res = $this->db->get();
					$chart_id = $res ->row()->chard_no;
				}
				
				
				/*
				$this->db->where('verifycode',$status[1]);
				$this->db->where('client_id',$this->uri->segment(4));
				$this->db->select('chard_no')->from('save_chart');
				$res = $this->db->get();
				$chart_id = $res ->row()->chard_no;*/
								
				$this->db->where('chart_no',$chart_id);
				$this->db->where('client_id',$this->uri->segment(4));
				$this->db->select('t_status,amount,chartname,chart_no')->from('prescription_detail')->where('patient_id',$p_id);
				$res1 = $this->db->get();
					$data['chart'] = $res1 ->row()->chartname;
				    $data['chart_no'] = $res1 ->row()->chart_no;
				   	$data['amount'] = $res1->row()->amount;
				if($res1->row()->amount != 0){
					if($res1->row()->t_status != 0){
						$data['pay'] = 'free';
					} else {
					    $data['pay'] = 'paid';
					}
				}  else {
						$data['pay'] = 'free';
					}
			
		} else {
			$data['c_id'] = $this->uri->segment(3);
			$p_id = $this->uri->segment(4);
			$data['p_id'] = $this->uri->segment(4);
			$data['code'] = $this->uri->segment(5);
			$code_id = $this->uri->segment(5);
			$data['pay'] = 'free';
		}
		
		$this->load->view('pdfverify',$data);  
	}
	
	public function default_pdf_verification()
	{
		$data['pay'] = $this->uri->segment(3);
		if($this->uri->segment(3) == 'free' || $this->uri->segment(3) == 'paid'){
			$data['c_id'] = $this->uri->segment(4);
			$p_id = $this->uri->segment(5);
			$data['p_id'] = $this->uri->segment(5);
			$data['code'] = $this->uri->segment(6);
			$code_id = $this->uri->segment(6);
			if($this->uri->segment(3) != 'free'){
				$status = explode('-',$code_id);
				
				/*
				if($status[0] == 'public'){
					$this->db->where('verifycode',$status[1]);
					$this->db->where('client_id',$this->uri->segment(4));
					$this->db->select('chard_no')->from('save_chart');
					$res = $this->db->get();
					$chart_id = $res ->row()->chard_no;
				} else {
					$this->db->where('verifycode',$status[1]);
					$this->db->select('chard_no')->from('save_privatechart');
					$res = $this->db->get();
					$chart_id = $res ->row()->chard_no;
				}*/
				
				$this->db->where('verifycode',$status[1]);
				$this->db->where('client_id',$this->uri->segment(4));
				$this->db->select('chard_no')->from('default_chart');
				$res = $this->db->get();
				$chart_id = $res ->row()->chard_no;
				
				
				$this->db->where('chart_no',$chart_id);
				$this->db->where('pay','paid');
				$this->db->where('t_status','0');
				$this->db->select('amount')->from('prescription_detail')->where('patient_id',$p_id);
				$res = $this->db->get();
				if($res->result_array() != false){
					$data['amount'] = $res->row()->amount;
				}  else {
						$data['pay'] = 'free';
					}
				} else {
					$data['pay'] = 'free';
				}
		} else {
			$data['c_id'] = $this->uri->segment(3);
			$p_id = $this->uri->segment(4);
			$data['p_id'] = $this->uri->segment(4);
			$data['code'] = $this->uri->segment(5);
			$code_id = $this->uri->segment(5);
			$data['pay'] = 'free';
		}
		
		$this->load->view('defaultchart_pdfverify',$data);  
	}






	
	public function pdf_verify(){
		$c_id = $this->uri->segment(4);
		$p_id = $this->uri->segment(5);
		$chart_id = $this->uri->segment(6);
		
		$this->db->where('chard_no',$chart_id);
		$this->db->select('verifycode')->from('save_chart');
		$res = $this->db->get();
		if($res->result_array() != false){
			$status = 'public';
			$verifycode = $res ->row()->verifycode;
		} else {
			$this->db->where('chard_no',$chart_id);
			$this->db->select('verifycode')->from('save_privatechart');
			$res = $this->db->get();
			$verifycode = $res ->row()->verifycode;
			$status = 'private';
		}
		
		
		$this->db->where('chart_no',$chart_id);
		$this->db->where('patient_id',$p_id);
		$this->db->where('client_id',$c_id);
		$this->db->select('amount')->from('prescription_detail')->where('patient_id',$p_id);
		$res = $this->db->get();
		if($res->result_array() != false){
			$amount = $res->row()->amount;
		} else {
			$amount = '';
		}
		$code = $status.'-'.$verifycode;
			
		$order="Exercise Prescription";
		$this->registration_model->pay_det($c_id,$p_id);
		$this->mail_model->sentpaypal($c_id,$amount,$order);
		$this->mail_model->sentpaypal_patient($c_id,$amount,$p_id,$order);
		$this->load->view('pdfverify',$data);
		redirect(base_url().'pages/pdf_verification/paid/'.$c_id.'/'.$p_id.'/'.$code);		
	}
	
	public function facebook(){
		$this->load->view('facebook');
	}
	
	public function fb_status(){
		$page_id = 'physiosoftware';
		$access_token = '887396347983977|ONe5dS-Sz9BVI2IeEQGRrHbVKQw';
		//Get the JSON
		$json_object = @file_get_contents('https://graph.facebook.com/' . $page_id . 
		'/posts?access_token=' . $access_token);
		//Interpret data
		//$fbdata = json_decode($json_object);
		$fbdata = $json_object->result_array();
		
		//$new_array = $this->objectToArray($json_object);
		
		
		
		
		
		foreach ($fbdata as $post )
		{
			$posts .= '<p><a href="' . $post->link . '">' . $post->story . '</a></p>';
			$posts .= '<p><a href="' . $post->link . '">' . $post->message . '</a></p>';
			$posts .= '<p>' . $post->description . '</p>';
			$posts .= '<br />';
		}  
		
		
		/* foreach ($fbdata->data as $post )
		{
			$posts .= '<p><a href="' . $post->link . '">' . $post->story . '</a></p>';
			$posts .= '<p><a href="' . $post->link . '">' . $post->message . '</a></p>';
			$posts .= '<p>' . $post->description . '</p>';
			$posts .= '<br/>';
		}   */
		
		
		//echo $posts;
		
	}
	
	function objectToArray($d) 
{
    if (is_object($d)) {
        // Gets the properties of the given object
        // with get_object_vars function
        $d = get_object_vars($d);
    }

    if (is_array($d)) {
        /*
        * Return array converted to object
        * Using __FUNCTION__ (Magic constant)
        * for recursive call
        */
        return array_map(__FUNCTION__, $d);
    } else {
        // Return array
        return $d;
    }
}
public function test() {
	$this->load->view('test');
}
        public function contest_details() {
			$this->load->view('clinicdetails');
		}
		public function add_clinicdetails() {
			
			$data =  $this->registration_model->add_clinicdetails();
			$response = array();
			if($data == ''){
				$this->session->set_flashdata('Error', 'Details Has not Been Stored.');	
			} else {
				$this->session->set_flashdata('Message', 'Details Has Been Stored Successfully!.');
			}
			redirect(base_url().'pages/contest_details', 'refresh');
			
		}	
		
		
	public function report_print() {
	   $this->load->model('patient_model');
		$this->load->model('registration_model');
		$str =  $this->uri->segment(3);
		$this->db->where('verify_code',$str);
		$this->db->select('client_id,from_date,to_date,patient_id')->from('send_patientreport');
		$res = $this->db->get();
		/* $from = $res->row()->from_date; */
		$patient_id = $res->row()->patient_id;
		$client_id = $res->row()->client_id;
		/* $to = $res->row()->to_date; */
		$data['clientDetails'] = $this->registration_model->editProfile($client_id);
		$data['patient'] = $this->patient_model->editPatientinfo($patient_id);
		$data['report'] = $this->patient_model->getreportprint_details($client_id);
		$data['bodychart']=$this->patient_model->viewBodychart($patient_id);
		//$data['pain_list'] = $this->patient_model->patient_painchart($patient_id);
		//$data['pain1'] = $this->patient_model->viewPain1($patient_id);
		
		    $data['history'] = $this->patient_model->viewHistory($patient_id);
			$data['chief_comp'] = $this->patient_model->viewChiefcomp($patient_id);
			$data['pain'] = $this->patient_model->viewPain($patient_id);
			$data['examn'] = $this->patient_model->viewExamn($patient_id);
			$data['mexamn'] = $this->patient_model->viewMexamn($patient_id);
			$data['sexamn'] = $this->patient_model->viewSexamn($patient_id);
			$data['investigation'] = $this->patient_model->viewInvestigation($patient_id);
			$data['prov_diag'] = $this->patient_model->viewProvdiag($patient_id);
			$data['pediatric'] = $this->patient_model->viewPaediatric($patient_id);
			$data['goal'] = $this->patient_model->viewGoals($patient_id);
			$data['caseNote'] = $this->patient_model->viewCaseNotes($patient_id);
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
			//$data['protocols']=$this->patient_model->treatment_protocol($patient_id);
			$data['plans'] = $this->patient_model->plans($patient_id);
			//$data['ex_protocols'] = $this->patient_model->viewex_protocols($patient_id);
			
		
	   $this->load->view('client/patient_summary_report_list',$data);
	}	
    public function otp_verification() {
		$appoint_id=$this->uri->segment(3);
		if($this->uri->segment(4) && $this->uri->segment(4) == "invite") {
          $data["invite"] = true;
         }else{
         $data["invite"] = false;
         }
        $data["appoint_id"]=$appoint_id;
        $data["error_msg"]="";
		$this->load->view('frontend/verify_otp',$data);
	}
	public function consent_formadd(){  
		$result = $this->registration_model->sign_save();
		if($result != false){
			$data["appoint_id"]=$this->input->post('appoint_id');
			$data['detail']=$this->registration_model->get_patient_name($appoint_id);
			$this->load->view('frontend/chat_room',$data);
		} else {
			$this->load->model('appoinment_model');
			$data["appoint_id"]=$this->input->post('appoint_id');
			$data['detail']=$this->appoinment_model->get_patient_name($appoint_id);
			$this->load->view('frontend/add_sign',$data);
		}
		 
     }
	public function join()
	{       
	        $appoint_id = $this->uri->segment(3);
		    $data['chatroom']=  $this->uri->segment(4);
		    $data["appoint_id"]=$this->uri->segment(3);
			$data['patient_name']=$this->registration_model->get_patient_name($appoint_id);
			$this->load->view('frontend/chat_room',$data);
	}
	public function rec1() {
		$this->db->select('*')->from('tbl_invoice_detail11');
		$res = $this->db->get();
		foreach($res->result_array() as $row){
			$this->db->where('detail_id',$row['detail_id']);
			$this->db->where('client_id',$row['client_id']);
			$this->db->set('bill_id',$row['bill_id']);
			//$this->db->set('client_id',$row['client_id']);
			$this->db->update('tbl_invoice_detail');
			  
		}
		/* $this->db->select('*')->from('tbl_invoice_payments1 ih');
		$res = $this->db->get();
		$i =0;
		foreach($res->result_array() as $row){
		   $this->db->where('bill_id',$row['bill_id']);
		$this->db->where('client_id',$row['client_id']);
		$this->db->select('payment_id')->from('tbl_invoice_payments');
		$res1 = $this->db->get();
			if($res1->result_array() == false){
				 $data = array(
					"client_id"=>$row['client_id'],
					"payment_mode"=>$row['payment_mode'],
					"bill_id"=>$row['bill_id'],
					"payment_date"=>$row['payment_date'],
					"paid_amt"=>$row['paid_amt'],
					"cheque_no"=>$row['cheque_no'],
					"created_by"=>$row['created_by'],
					"created_date"=>$row['created_date'],
					"modify_by"=>$row['modify_by'],
					"modify_date"=>$row['modify_date']
				 );
			  $this->db->insert('tbl_invoice_payments',$data);
			} else{
			} 
		}*/
	}
	public function invite() {
		$data['page_name'] = 'settings';
		$client_id = $_GET['branch'];
		$data['client_id'] = $_GET['branch'];
		$this->db->where('client_id',$client_id);
		$this->db->select('first_name')->from('tbl_client');
		$res = $this->db->get();
		$data['name'] = $res->row()->first_name;
		$data['invoice'] = $this->registration_model->invoice_det($client_id);		
		$data['i_friends'] = $this->registration_model->i_friends($client_id);		
		$this->load->view('client/invite_earn1',$data);
	}
	public function letter_print()
	{
		$data['page_name'] = 'letter'; 
		$data['clientDetails'] = $this->registration_model->editProfile($this->uri->segment(3));
		$data['result']=$this->registration_model->letter_edit();
		$data['client']=$this->registration_model->client_details();
		$this->load->view('client/letter_support',$data);
	} 
	
	
}