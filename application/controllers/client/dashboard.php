<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once ($_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php');
class Dashboard extends CI_Controller {

	public function __construct()   {
	    header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
		parent::__construct();
		$this->load->model(array('registration_model','appoinment_model','common_model','patient_model','invoice_model','user_model','schedule_model'));
		//$this->legacy_db = $this->load->database('second', true);

	}
	public function home() {
		
		$this->app_access->client();
		$data['page_name'] = 'dashboard';
		$this->load->model('admin');
		$data['admin'] = $this->admin->get_addadmin();
	    
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('SUM(total_amt) AS amount')->from('tbl_expanse')->where('client_id', $this->session->userdata('client_id'));
		$this->db->where('bill_date',date('Y-m-d'));
		$query = $this->db->get();
		$data['T_expenseAmt'] = $query->row()->amount;
		
		$this->db->where('pv.client_id',$this->session->userdata('client_id'));
		$this->db->where('pv.treatment_date',date('Y-m-d'));
		$this->db->select('SUM(pv.paid_amt) as pamount');
		$this->db->from("tbl_patient_info pi");
		$this->db->join("tbl_invoice_header pv", "pi.patient_id=pv.patient_id");
		$query = $this->db->get();
		$data['T_incomeAmt'] = $query->row()->pamount;
		$data['count3'] = $this->patient_model->patientcount();
		$data['today_schedule'] = $this->schedule_model->get_todayappointment();
		
		// Todays Patient View
		$data['result'] = $this->patient_model->get_today_pat_list();
		
		$T_patientCount = $this->patient_model->patient_count();
		
		$t1 = $this->patient_model->get_tot_count();
		$t2 = $this->patient_model->get_tot_sess_count();
		$t3 = $this->patient_model->get_rcount();
		
		
		if( $t1 == 0 && $t1 == ''){
			$data['t1'] = '';
		} else {
			$data['t1'] = '+'.$t1;
		}
		$data['t2'] = $t2;
		$data['t3'] = $t3;
		$data['T_patientCount'] = $T_patientCount;
		
		$data['t4'] = $t2  + $T_patientCount - $t3;  
		
		
		$this->db->where('pi.client_id',$this->session->userdata('client_id'));
		$this->db->where('pp.treatment_date',date('Y-m-d'));
		$this->db->where('pi.appoint_date !=',date('Y-m-d'));
		$this->db->select('pi.email,pi.mobile_no,pi.gender,pp.patient_id,pi.first_name,pi.last_name,pi.patient_code')->from('tbl_patient_treatment_techniques pp');
		$this->db->join('tbl_patient_info pi','pi.patient_id = pp.patient_id');
		$res = $this->db->get();
		$data['count1'] = $res->num_rows();
		
		$data['t_patient'] = $res->result_array();
		// Todays Appointment View
		$data['result1'] = $this->schedule_model->appointment_thatday();
		// Todays Invoice View
		$this->db->where('pv.client_id',$this->session->userdata('client_id'));
		$this->db->where('pv.treatment_date',date('Y-m-d'));
		$this->db->select('pi.gender,pi.patient_id,pi.patient_code,pi.client_id,pi.first_name,pi.last_name,pv.bill_no,pv.net_amt,pv.paid_amt,pv.treatment_date,pv.bill_status,pv.due_date,pv.bill_id,pv.payment_mode');
		$this->db->from("tbl_patient_info pi");
		$this->db->join("tbl_invoice_header pv", "pi.patient_id=pv.patient_id");
		$query = $this->db->get();
		$data['invoice_record']= $query->result_array();
	    $data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
	    $data['todays_advance'] = $this->common_model->todays_advance($this->session->userdata('client_id')); 
		
		$this->db->where('ai.client_id',$this->session->userdata('client_id'));
		$this->db->where('ai.advance_date',date('Y-m-d'));
		$this->db->select('SUM(ai.advance_amount) as advance_amount')->from('tbl_patient_advance ai');
		$this->db->join('tbl_patient_info pi','pi.patient_id=ai.patient_id');
		$query = $this->db->get();
		if($query->result_array() != false){
			$data['adv']= $query->row()->advance_amount;
		} else {
			$data['adv']= 0;
		}
		
		// Todays Expense View
		$where_condition = "(bill_date >= '".date('Y-m-d')."' AND bill_date <='".date('Y-m-d')."')";
		$this->db->where($where_condition);
		$this->db->select('amount,tax_perc,bill_id,client_id,bill_no,total_amt,bill_date,ventor,due_date');
		$this->db->from("tbl_expanse");
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->group_by('bill_no');
		$this->db->order_by('bill_id','desc');
		$query = $this->db->get();
		$data['expanse'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		
		
		
		$data['invoiceCount'] = $this->invoice_model->getInvoiceCount();
		$data['staffCount'] = $this->staff_model->getStaffCount();
		 
		$data['cancelscheduleCount'] = $this->schedule_model->getcancelScheduleCount();
		
		  
		
		$this->db->select('*');
		$this->db->from("tbl_session_det");
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('sn_date',date('Y-m-d'));  
		$result = $this->db->get();
		$data['session']=$result->result_array();
		
		$data['tot_list'] = $this->patient_model->get_tot_list();
		$data['tot_list_home'] = $this->patient_model->get_tot_home_list();
        
		$npscore = 0;
		 $nps_scoreQ = $this->db->select("ROUND(AVG(P.nps_score)) AS nps_score",FALSE)->from("tbl_nps_score AS P")
		->join("tbl_staff_info S","P.staff_id=S.staff_id","join")
		->join("tbl_client AS C","C.client_id=S.client_id","join")->WHERE(array("C.client_id"=>$this->session->userdata('client_id')))->get();
		 
		
		if($nps_scoreQ->num_rows()>0)
		{
			$totlnpsR = $nps_scoreQ->row_array();
			$npscore = $totlnpsR['nps_score'];
			
		}
		$data['npscore'] = $npscore;
		
		$this->load->view('client/clinicstatistics',$data);
                // $this->getCalendarAuthCode();
                
                //if($this->session->userdata('client_id')==1637)
                //{

		$this->getCalendarAuthCode();
                //}
		
	}

     /*
        public function getCalendarAuthCode() { 
             session_start();
             $client = new Google_Client();
              $client->setAuthConfig($_SERVER['DOCUMENT_ROOT'].'/vendor/credentials.json');
              $client->addScope(Google_Service_Calendar::CALENDAR);

               if (isset($_GET['code'])) {
                $authcode=$_GET['code'];
                //echo "<script>alert('$authcode')</script>";
                $client->authenticate($_GET['code']);
                $_SESSION['access_token'] = $client->getAccessToken();
                $token=$client->getAccessToken();
                // echo "<script>alert('$token')</script>";

                 $this->session->set_userdata('token',$token);
               }
               if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
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
//echo "<script>alert('$start')</script>";


    }
}



            
   $event = new Google_Service_Calendar_Event(array(
  'summary' => 'Calender check Test Event Notification',
  'description' => 'Test Event',
  'start' => array(
    'dateTime' => '2021-02-26T09:00:00-07:00'
  ),
  'end' => array(
    'dateTime' => '2021-02-26T09:00:00-07:00'
  ),
  'attendees' => array(
    array('email' => 'rahinimurugesan@gmail.com'),
    array('email' => 'jayaselvaamurugesan@gmail.com')
  ),
  'conferenceData' => [
        'createRequest' => [
            'requestId' => 'sample123',
            'conferenceSolutionKey' => ['type' => 'hangoutsMeet']
        ]
    ]
  
));
     $calendarId ='primary';
     $event1 = $service->events->insert($calendarId, $event,array('conferenceDataVersion' => 1,'sendUpdates' => 'all'));
    
}
        }

*/
       
        public function getCalendarAuthCode() { 
            $clientId=$this->session->userdata('client_id');
            $tokenPath = $_SERVER['DOCUMENT_ROOT'].'/tokens/'.$clientId.'_token.json';
            session_start();
 /*           if (file_exists($tokenPath) && isset($_SESSION['access_token']) && $_SESSION['access_token']) 
              {
               //redirect(base_url()."client/dashboard/home");

              }*/

           // else{
             $client = new Google_Client();
              $client->setAuthConfig($_SERVER['DOCUMENT_ROOT'].'/vendor/OAuth_Credentials.json');
             $client->setAccessType('offline');
            $client->setPrompt('select_account consent');
	    $client->setApprovalPrompt('force');

              $client->addScope(Google_Service_Calendar::CALENDAR);
              
              
              
              
               
              
                
              // $_SESSION['access_token']='';
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
 /*
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
      // echo "<script>alert('$start')</script>";


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
*/
      /*echo "<script>alert('$event1->htmlLink')</script>"; */
      $this->db->where('client_id',$this->session->userdata('client_id'));
      $cal=1;
      $this->db->update('tbl_client', array('googleCalendar' => $cal));
      //$this->session->set_userdata('googleCalendar',$cal);            
                   }//issetAccessToken
               
                 }//issetCode


            // }//if token file not available --else

       }

	public function home1() {  
		$this->app_access->client();
		$data['page_name'] = 'dashboard';
		$this->load->model('admin');
		$data['admin'] = $this->admin->get_addadmin();
	    
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('SUM(total_amt) AS amount')->from('tbl_expanse')->where('client_id', $this->session->userdata('client_id'));
		$this->db->where('bill_date',date('Y-m-d'));
		$query = $this->db->get();
		$data['T_expenseAmt'] = $query->row()->amount;
		
		$this->db->select('SUM(paid_amt) AS pamount')->from('tbl_invoice_header')->where('client_id', $this->session->userdata('client_id'));
		$this->db->where('cheque_date',date('Y-m-d'));
		$query = $this->db->get();
		$data['T_incomeAmt'] = $query->row()->pamount;
		$data['count3'] = $this->patient_model->patientcount();
		$data['today_schedule'] = $this->schedule_model->get_todayappointment();
		
		// Todays Patient View
		$data['result'] = $this->patient_model->get_today_pat_list();
		$data['T_patientCount'] = $this->patient_model->patient_count();
		$this->db->where('pi.client_id',$this->session->userdata('client_id'));
		$this->db->where('pp.treatment_date',date('Y-m-d'));
		$this->db->where('pi.appoint_date !=',date('Y-m-d'));
		$this->db->select('pi.email,pi.mobile_no,pi.gender,pp.patient_id,pi.first_name,pi.last_name,pi.patient_code')->from('tbl_patient_treatment_techniques pp');
		$this->db->join('tbl_patient_info pi','pi.patient_id = pp.patient_id');
		$res = $this->db->get();
		$data['count1'] = $res->num_rows();
		
		$data['t_patient'] = $res->result_array();
		// Todays Appointment View
		$data['result1'] = $this->schedule_model->appointment_thatday();
		// Todays Invoice View
		$this->db->where('pv.client_id',$this->session->userdata('client_id'));
		$this->db->where('pv.cheque_date',date('Y-m-d'));
		$this->db->where('pv.paid_amt !=','0.00');
		$this->db->select('pi.gender,pi.patient_id,pi.patient_code,pi.client_id,pi.first_name,pi.last_name,pv.bill_no,pv.net_amt,pv.paid_amt,pv.treatment_date,pv.bill_status,pv.due_date,pv.bill_id,pv.payment_mode');
		$this->db->from("tbl_patient_info pi");
		$this->db->join("tbl_invoice_header pv", "pi.patient_id=pv.patient_id");
		$query = $this->db->get();
		$data['invoice_record']= $query->result_array();
	    $data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
	    $data['todays_advance'] = $this->common_model->todays_advance($this->session->userdata('client_id')); 
		
		$this->db->where('ai.client_id',$this->session->userdata('client_id'));
		$this->db->where('ai.advance_date',date('Y-m-d'));
		$this->db->select('SUM(ai.advance_amount) as advance_amount')->from('tbl_patient_advance ai');
		$this->db->join('tbl_patient_info pi','pi.patient_id=ai.patient_id');
		$query = $this->db->get();
		if($query->result_array() != false){
			$data['adv']= $query->row()->advance_amount;
		} else {
			$data['adv']= 0;
		}
		
		// Todays Expense View
		$where_condition = "(bill_date >= '".date('Y-m-d')."' AND bill_date <='".date('Y-m-d')."')";
		$this->db->where($where_condition);
		$this->db->select('amount,tax_perc,bill_id,client_id,bill_no,total_amt,bill_date,ventor,due_date');
		$this->db->from("tbl_expanse");
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->group_by('bill_no');
		$this->db->order_by('bill_id','desc');
		$query = $this->db->get();
		$data['expanse'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		
		
		$data['patientCount'] = $this->patient_model->getPatientCount();
		$data['referalCount'] = $this->referal_model->getReferalCount();
		$data['invoiceCount'] = $this->invoice_model->getInvoiceCount();
		$data['staffCount'] = $this->staff_model->getStaffCount();
		$data['userCount'] = $this->user_model->getUserCount();
		$data['scheduleCount'] = $this->schedule_model->getScheduleCount_status();
		$data['cancelscheduleCount'] = $this->schedule_model->getcancelScheduleCount();
		
		$this->db->distinct(); 
		$this->db->where('client_id',$this->session->userdata('client_id'));		
		$this->db->select('SUM(paid_amt) AS amount')->from('tbl_invoice_header')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
		$data['incomeAmt'] = $query->row()->amount;
		
		$this->db->distinct(); 
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('SUM(total_amt) AS amount')->from('tbl_expanse')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
		$data['expenseAmt'] = $query->row()->amount;
		
		$this->load->view('client/dashboard',$data);  
	
	}
	public function forget_password()
	{
		$data['page_name'] = 'dashboard';
		// loading libraries and helpers
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form'));
		// validation rules
		$this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
		// Error deliminators
		$this->form_validation->set_error_delimiters('<div class="NewError">', '</div>');
		// Form validation action
		if( $this->form_validation->run() == TRUE ) {
			$this->client->recover_password();
			$this->session->set_flashdata('password_recover_sucess', '<div class="NewError2"><strong>Sucess!</strong> Password has been sent to your email address .  </div>');
			redirect(base_url()."client/dashboard/forget_password", "refresh");
		}
		$this->load->view('client/forget_password', $data);
	}
	public function registration(){
		
		$this->load->view('client/registration');
	}
	 public function alreadyExists_email()
	{
		$response=array();
		$result = $this->registration_model->email_check($_POST['e_id']);
		if($result == '')
		{			
			$response['status'] = 'success';
			$response['message'] = 'Notes Has Been Added successfully.';
		}
		else{
			$response['status'] = 'success';
			$response['message'] = 'Notes Has Been Added successfully.';
		}
		// print json response
		echo json_encode($response);
		
	}
	public function login() {
		// If user already login redirect to dashboard
		if( $this->app_access->is_client_logged_in() == true ) 
               {
               //$this->calendarClientAccess();
                // $this->client->checkAccessToken();

                redirect( base_url() . 'client/dashboard/home' );
               }
		// loading libraries and helpers
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form'));
		// validation rules
		$this->form_validation->set_rules('username', 'username', '');
		$this->form_validation->set_rules('password', 'password', '');
		// Error deliminators
		$this->form_validation->set_error_delimiters('<div class="NewError">', '</div>');
		// Form validation action
		if( $this->form_validation->run() == TRUE ) {
			$this->client->check_login();  
		}
		// load default view
		
		$this->load->view('client/login');
	}
        
        public function calendarClientAccess()
	{
           session_start();

           $client = new Google_Client();
           //$client->setApplicationName('Google Calendar API PHP Quickstart');
         //$client->setScopes(Google_Service_Calendar::CALENDAR_READONLY);
          /*

	   $client->setScopes(Google_Service_Calendar::CALENDAR);
           
           $client->setAccessType('offline');
           $client->setPrompt('select_account consent');
	   $client->setApprovalPrompt('force');*/
           $client->setRedirectUri('https://physioplustech.in/client/dashboard/home');
           $client->setAuthConfig($_SERVER['DOCUMENT_ROOT'].'/vendor/credentials.json');
           $client->addScope(Google_Service_Calendar::CALENDAR);
              //if (! isset($_GET['code'])) {
           $auth_url = $client->createAuthUrl();
           header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
                   //header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
                //}

        }  
	
	public function add_register() {
		$response=array();
		$result = $this->registration_model->add_registration();
		if($result != '')
		{			
			$this->session->set_flashdata('message', 'verification link has been sent to your FUCK address. if not received email in 5 minutes check your spam folder');
			redirect(base_url().'client/dashboard/registration/', 'refresh');
		}
		else{
			$this->session->set_flashdata('message', 'verification link has been sent to your email address. if not received email in 5 minutes check your spam folder');
			redirect(base_url().'registration/', 'refresh');
		}
	}
	public function logout()
	{
	 $data['page_name'] = 'dashboard';
	   $status = $this->uri->segment(4);
	   if($status != false){
		   if($status == '1'){
			   $plan = $this->uri->segment(5);
			   $duration = $this->uri->segment(6);
			   $user = $this->uri->segment(7);
			   $num_location = $this->uri->segment(8);
			   $total_sms_limit = $this->uri->segment(10);
			   $c_id = $this->uri->segment(9);
			   	$val1 = $user * 100;
				if($plan == '4') { $val2 = $num_location * 500; } elseif($plan == '3') { $val2 = $num_location * 300; } elseif($plan == '2') { $val2 = $num_location * 200; } elseif($plan == '1') { $val2 = $num_location * 100; } else { $val2 = $num_location * 100; } 
					$amt = $val1 + $val2; 
					if($total_sms_limit == '50') { $val3 = '25'; } else if($total_sms_limit == '100'){ $val3 = '50'; } else if($total_sms_limit == '200') {
					$val3 = '125'; } elseif($total_sms_limit == '400') { $val3 = '220';  } elseif($total_sms_limit == '500') { $val3 = '250';  }
					elseif($total_sms_limit == '1000') { $val3 = '500';  } elseif($total_sms_limit == '2000') { $val3 = '900';  } 
					elseif($total_sms_limit == '5000') { $val3 = '2250';  }  elseif($total_sms_limit == '10000') { $val3 = '4500';  }else { $val3 = '0';  }			
					$total = $amt + $val3;
					$total = $amt + $val3;
					$this->mail_model->upgrade_reports_Plan($c_id,$val,$total,$duration,$user,$num_location,$total_sms_limit,$plan);	
					$data = array('last_login_date' => 0,'last_login_ip' => 0,'username' => 0,'first_name' => 0,'last_name' => 0,'client_id' => 0,'plan_id' => 0,'client_login' => false,'clinic_name' => 0,'is_parent' => 0,'is_client' => false);
					$this->session->sess_destroy();
					$this->session->unset_userdata($data);
			        redirect(base_url()."client/dashboard/login"); 
		   }
		   elseif($status == '2'){
					$c_id = $this->uri->segment(6);
					$user = $this->uri->segment(5);
				   	$val = $user * 100;
					$total = $val;
					$this->mail_model->upgrade_reports_user($c_id,$val,$total,$user);
					$data = array('last_login_date' => 0,'last_login_ip' => 0,'username' => 0,'first_name' => 0,'last_name' => 0,'client_id' => 0,'plan_id' => 0,'client_login' => false,'clinic_name' => 0,'is_parent' => 0,'is_client' => false);
				    $this->session->sess_destroy();
				    $this->session->unset_userdata($data);
				    redirect(base_url()."client/dashboard/login");  
		   }
		   elseif($status == '3') {
			    $c_id = $this->uri->segment(6);
				$num_location = $this->uri->segment(5);
				$val = $num_location * 500;
				$total = $val;
				$this->mail_model->upgrade_reports_location($c_id,$val,$total,$num_location); 
				$data = array('last_login_date' => 0,'last_login_ip' => 0,'username' => 0,'first_name' => 0,'last_name' => 0,'client_id' => 0,'plan_id' => 0,'client_login' => false,'clinic_name' => 0,'is_parent' => 0,'is_client' => false);
			    $this->session->sess_destroy();
			    $this->session->unset_userdata($data);
			   redirect(base_url()."client/dashboard/login");  
		   }
		   elseif($status == '4') {
			  $c_id = $this->uri->segment(6);
			  $total_sms_limit = $this->uri->segment(5);
			  if($total_sms_limit == '200') {
			  $val = '125'; } elseif($total_sms_limit == '400') { $val = '220';  }
			  elseif($total_sms_limit == '1000') { $val = '500';  } elseif($total_sms_limit == '2000') { $val = '900';  } 
			  elseif($total_sms_limit == '5000') { $val = '2250';  }  elseif($total_sms_limit == '10000') { $val = '4500';  } else { $val = '0';  }
			  $total =$val;
			  $this->mail_model->upgrade_reports_transactional($c_id,$val,$total,$total_sms_limit);
			  $data = array('last_login_date' => 0,'last_login_ip' => 0,'username' => 0,'first_name' => 0,'last_name' => 0,'client_id' => 0,'plan_id' => 0,'client_login' => false,'clinic_name' => 0,'is_parent' => 0,'is_client' => false);
			  $this->session->sess_destroy();
			  $this->session->unset_userdata($data);
			  redirect(base_url()."client/dashboard/login");  
		   }
		   elseif($status == '6') {  
			  $c_id = $this->session->userdata('client_id');
			  $this->common_model->promotional_update($c_id);
			  $psms_limit = $this->uri->segment(5);
			  if($psms_limit == '1000') { 
			  $val = '400'; } elseif($psms_limit == '2000') { $val = '600';  }
			  else { $val = '1250';  }
			  $total = $val;
			  $this->mail_model->upgrade_reports_promotional($c_id,$val,$total,$psms_limit);
			  $data = array('last_login_date' => 0,'last_login_ip' => 0,'username' => 0,'first_name' => 0,'last_name' => 0,'client_id' => 0,'plan_id' => 0,'client_login' => false,'clinic_name' => 0,'is_parent' => 0,'is_client' => false);
			  $this->session->sess_destroy();
			  $this->session->unset_userdata($data);
			  redirect(base_url()."client/dashboard/login");  
		   }
		   else if($status == '6') {
				  $c_id = $this->session->userdata('client_id');
				  $this->db->where('client_id',$c_id);
				  $this->db->select('*')->from('tbl_client');
				  $res = $this->db->get();
				  $fname = $res->row()->first_name;
				  $lname = $res->row()->last_name;
				  $add = $res->row()->address;
				  $email = $res->row()->email;
				  $city = $res->row()->city;
				  $code = $res->row()->zipcode;
				  $state = $res->row()->state;
				  $country = 'india';
				  $phone = $res->row()->phone;
				  $mobile = $res->row()->mobile;
				  $org = $res->row()->clinic_name;
				  $fax = $res->row()->fax;
				  $domain_name = 'suryaphysio.com';
				  $val=explode('.',$domain_name);
				  $url1="https://resellertest.enom.com/interface.asp?command=Purchase&uid=physioplus&pw=10june2015&sld=".$val[0]."&tld=".$val[1]."&RegistrantOrganizationName=Reseller%20Documents%20Inc.&RegistrantFirstName=".$fname."&RegistrantLastName=".$lname."&RegistrantAddress1=".$add."RegistrantCity=".$city."&RegistrantStateProvince=".$state."&RegistrantStateProvinceChoice=TN&RegistrantPostalCode=".$code."&RegistrantCountry=".$country."&RegistrantEmailAddress=".$email."&RegistrantPhone=".$phone."&RegistrantFax=".$fax."&ResponseType=XML";
				  $curl = curl_init();
				  curl_setopt($curl, CURLOPT_URL, $url1);
				  curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);				
				  $html = curl_exec($curl);
				  curl_close ($curl);
				  echo $html;
				   $url2="https://resellertest.enom.com/interface.asp?command=GetDomainInfo&uid=physioplus&pw=10june2015&sld=".$val[0]."&tld=".$val[1]."&ResponseType=XML";				  
				  $curl = curl_init();
				  curl_setopt($curl, CURLOPT_URL, $url2);
				  curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);				
				  $html2 = curl_exec($curl);
				  curl_close ($curl);
				  echo $html2;
		   }
		   
	   }
	   else {
				if(!empty($this->session->userdata('staff_id')) && $this->session->userdata('staff_id')>0)
				{
					$data = array('last_login_date' => 0,'last_login_ip' => 0,'username' => 0,'first_name' => 0,'last_name' => 0,'client_id' => 0,'plan_id' => 0,'client_login' => false,'clinic_name' => 0,'is_parent' => 0,'is_client' => false);
					$this->session->sess_destroy();
					$this->session->unset_userdata($data);
					redirect(base_url()."user/dashboard/login");  		
				}else{
					$data = array('last_login_date' => 0,'last_login_ip' => 0,'username' => 0,'first_name' => 0,'last_name' => 0,'client_id' => 0,'plan_id' => 0,'client_login' => false,'clinic_name' => 0,'is_parent' => 0,'is_client' => false);
					$this->session->sess_destroy();
					$this->session->unset_userdata($data);
					redirect(base_url()."client/dashboard/login");  
				}  
		}	
	      
	}
	public function location() {
		$data['page_name'] = 'Location';
		$data['profile_info'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$this->load->view('client/location_add',$data);
	}
	
	
	public function applogo_upload(){
		
		$result =array();
		$config['upload_path'] = './uploads/app_logo/';
		$config['allowed_types'] = "*";
		$config['max_size'] = '10000000M';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('logo'))
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
	public function logo_upload(){
		
		$result =array();
		$config['upload_path'] = './uploads/logo/';
		$config['allowed_types'] = "*";
		$config['max_size'] = '10000000M';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('logo'))
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
	public function img_upload(){
		
		$result =array();
		$config['upload_path'] = './uploads/app/';
		$config['allowed_types'] = "*";
		$config['max_size'] = '10000000M';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('logo'))
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
	public function photo_upload(){
		
		$result =array();
		$config['upload_path'] = './uploads/doc_photo';
		$config['allowed_types'] = "*";
		$config['max_size'] = '10000000M';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('photo'))
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
	public function change_pwd() {
		$this->app_access->client();
		$data['page_name'] = 'dashboard';
		$this->db->select('password')->from('tbl_client');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$res = $this->db->get();
		$data['pwd'] = $res->row()->password;
		$this->load->view('client/change_password',$data);
	}
	public function change_password() {
		$old_password = $this->input->post('old_password');
		$new_password = $this->input->post('new_password');
		$response = array();
		$this->client->change_password($old_password,$new_password);
			if($query != false)
			{
				$response['status'] = 'success';
				$response['message'] = 'password has been changed successfully.';
			}
		echo json_encode($response);
	}
	public function child($client_id)
	{
		$this->db->select('*')->from('tbl_client')->where('client_id',$client_id);
		$result=$this->db->get();
		// if user avail 
		if($result->num_rows()>0 && $result->row()->status == 1)
		{
			if($result->row()->parent_client_id == 0){
				$is_parent = true;
			}else{
				$is_parent = false;
			}
			// set session
			$user_data=array(
				'client_login' => true,
				'last_login_date' => $result->row()->last_login_date,
				'last_login_ip' => $result->row()->last_login_ip,
				'username' => $result->row()->username,
				'first_name' => $result->row()->first_name,
				'last_name' => $result->row()->last_name,
				'clinic_name' => $result->row()->clinic_name,
				'client_id' => $result->row()->client_id,
				'plan_id' => $result->row()->plan_id,
				'is_parent' => $is_parent,
				'is_child' => true,
				'is_client' => true
			);
			$this->session->set_userdata($user_data);
			// update new values
			$update=array('last_login_date' => date('Y-m-d H:i:s'), 'last_login_ip' => $_SERVER['REMOTE_ADDR']);
			$this->db->where('client_id', $client_id);
			$this->db->update('tbl_client',$update);
			// redirect to home
			redirect(base_url()."client/dashboard/home", "refresh");
		} 
	}
	public function getSpecialities($speciality_name)
	{
		$response = array();
		$response['speciality'] = $this->common_model->getSpecialities($speciality_name);
		echo json_encode($response);
	}
	
	public function patientchart($date_filter)
	{
		$dateFilterArr = explode("and", $date_filter);
		$from = $dateFilterArr[0];
		$to = $dateFilterArr[1];
		$where_condition = "(appoint_date >= '".$from."' AND appoint_date <= '".$to."')";
		$this->db->distinct();
		$this->db->select('appoint_date')->from('tbl_patient_info')->where('client_id', $this->session->userdata('client_id'))->order_by('appoint_date');
		$this->db->where($where_condition);
		$query = $this->db->get();
		$appointQuery = $query->result_array();
		// Print out rows
		$prefix = '';
		echo "[\n";
		foreach($appointQuery as $counts) {
			$where = array('appoint_date' => $counts['appoint_date'],'client_id' => $this->session->userdata('client_id'));
			$this->db->select('count(patient_id) as patient_count')->from('tbl_patient_info')->where($where);
			$query1 = $this->db->get();
			$patientQuery = $query1->row_array();
			echo $prefix . " {\n";
		    echo '  "category": "' . $counts['appoint_date'] . '",' . "\n";
		    echo '  "value1": ' . $patientQuery['patient_count'] . ',' . "\n";
		    echo '  "color": "#007bff",' . "\n";
		    echo " }";
		    $prefix = ",\n";
		}
		echo "\n]";
	}
	public function appointmentchart($date_filter)
	{
		$dateFilterArr = explode("and", $date_filter);
		$from = $dateFilterArr[0];
		$to = $dateFilterArr[1];
		$where_condition = "(appointment_from >= '".$from."' AND appointment_from <= '".$to."')";
		$this->db->distinct();
		$this->db->select('appointment_from')->from('tbl_appointments')->where('client_id', $this->session->userdata('client_id'))->order_by('appointment_from');
		$this->db->where($where_condition);
		$query = $this->db->get();
		$appointQuery = $query->result_array();
		// Print out rows
		$prefix = '';
		echo "[\n";
		foreach($appointQuery as $counts) {
			$where = array('appointment_from' => $counts['appointment_from'],'client_id' => $this->session->userdata('client_id'));
			$this->db->select('count(appointment_id) as patient_count')->from('tbl_appointments')->where($where);
			$query1 = $this->db->get();
			$patientQuery = $query1->row_array();
			echo $prefix . " {\n";
		    echo '  "category": "' . $counts['appointment_from'] . '",' . "\n";
		    echo '  "value1": ' . $patientQuery['patient_count'] . ',' . "\n";
		    echo '  "color": "#007bff",' . "\n";
		    echo " }";
		    $prefix = ",\n";
		}
		echo "\n]";
	}
	public function provdiagchart($date_filter)
	{
		//$date_filter = ('2016-05-24and2016-07-22');
		$dateFilterArr = explode("and", $date_filter);
		$from = $dateFilterArr[0];
		$to = $dateFilterArr[1];
		$where_condition = "(ppd.pd_date >= '".$from."' AND ppd.pd_date <= '".$to."')";
		$this->db->distinct();
		$this->db->select('pdl.pd_list_name')->from('tbl_prov_diagnosis_list pdl')->where('pdl.client_id', $this->session->userdata('client_id'))->order_by("pdl.pd_list_name", "desc");
		$this->db->join("tbl_patient_prov_diagnosis ppd", "pdl.pd_list_name=ppd.prov_diagnosis");
		$this->db->where($where_condition);
		$query = $this->db->get();
		$provDiagQuery = $query->result_array();
		$provDiagData = array();
		// Print out rows
		$prefix = '';
		echo "[\n";
		foreach($provDiagQuery as $provDiagCounts) {
			//$where = array('prov_diagnosis' => $provDiagCounts['prov_diagnosis'],'client_id' => $this->session->userdata('client_id'));
			$this->db->select('count(patient_id) as patient_count')->from('tbl_patient_prov_diagnosis')->where('client_id', $this->session->userdata('client_id'))->like('prov_diagnosis',$provDiagCounts['pd_list_name']);
			$provDiagQuery1 = $this->db->get();
			$provDiagQuery2 = $provDiagQuery1->row_array();
			$searchArray = array("'", ",","?","+");
			$replaceArray = array("`", "&","","");
			$provDiagnosis1 = $provDiagCounts['pd_list_name'];
			$provDiagnosis = str_replace($searchArray,$replaceArray,$provDiagnosis1);
			echo $prefix . " {\n";
		    echo '  "provdiag": "' . $provDiagnosis . '",' . "\n";
		    echo '  "count1": ' . $provDiagQuery2['patient_count'] . ',' . "\n";
		    echo " }";
		    $prefix = ",\n";
		}
		echo "\n]";
	}
	
	public function incomechart()
	{   
	    $to = date('Y-m-d');
        $from = date('Y-m-d', strtotime("-330 days"));
		$where_condition = "(ih.treatment_date >= '".$from."' AND ih.treatment_date <= '".$to."')";
	    $this->db->distinct();
			$this->db->where($where_condition);			
			$this->db->where('ih.client_id',$this->session->userdata('client_id'));
			$this->db->select('MONTHNAME(ih.treatment_date) as BILL_MONTH');
			$this->db->from("tbl_invoice_header ih");
			//$this->db->join("tbl_invoice_payments pt", "ih.bill_id=pt.bill_id");
			$this->db->join("tbl_patient_info pi", "ih.patient_id=pi.patient_id");
			$this->db->order_by('ih.treatment_date');
			$query = $this->db->get();
			$monthQuery = $query->result_array();
			$incomeData = array();
			// Print out rows
			$prefix = '';
			echo "[\n";
		    foreach($monthQuery as $incomes) {
				$this->db->where($where_condition);
				$income_where = array('MONTHNAME(ih.treatment_date)' => $incomes['BILL_MONTH'], 'ih.client_id' => $this->session->userdata('client_id'));
				$this->db->where($income_where);
				$this->db->where('ih.client_id',$this->session->userdata('client_id'));
				$this->db->select('sum(ih.paid_amt) as paidamt');
				$this->db->from("tbl_invoice_header ih");
				//$this->db->join("tbl_invoice_payments pt", "ih.bill_id=pt.bill_id");
				$this->db->join("tbl_patient_info pi", "ih.patient_id=pi.patient_id");
				$incomeQuery1 = $this->db->get();
				$incomeQuery2 = $incomeQuery1->row_array();
				echo $prefix . " {\n";
				echo '  "month": "' . $incomes['BILL_MONTH'] . '",' . "\n";
				echo '  "total": ' . $incomeQuery2['paidamt'] . ',' . "\n";
				echo '  "color": "#007bff",' . "\n";
				echo " }";
				$prefix = ",\n";
			}
			echo "\n]";
	}
	
	public function incomereport($date_filter)
	{
		$dateFilterArr = explode("and", $date_filter);
		$from = $dateFilterArr[0];
		$to = $dateFilterArr[1];
		$where_condition = "(treatment_date >= '".$from."' AND treatment_date <= '".$to."')";
		$this->db->distinct();
		$this->db->select('sum(paid_amt) as paidamt')->from('tbl_invoice_header')->where('client_id', $this->session->userdata('client_id'));
		$this->db->where($where_condition);
		$query = $this->db->get();
		$incomeQuery = $query->row_array();
		$html = '
				<thead>
					<tr>
					  <th>Description</th>
					  <th>Amount</th>
					</tr>
				</thead>
				<tbody>
					<tr>
					  <td>Income</td>
					  <td style="text-align:right">'. number_format($incomeQuery['paidamt'],2,'.',''). '</td>
					</tr>
                </tbody>
		';
		$fromToDate = 'From '.date("M j, y",strtotime($from)).' to '.date("M j, y",strtotime($to));
		$response = array();
		$response['incomeHtml'] = $html;
		$response['fromToDate'] = $fromToDate;
		echo json_encode($response);
	}
	
	public function sessionChart($date_filter)
	{
		$dateFilterArr = explode("and", $date_filter);
		$from = $dateFilterArr[0];
		$to = $dateFilterArr[1];
		$where_condition = "(sn_date >= '".$from."' AND sn_date <= '".$to."')";
		$this->db->distinct();
		$this->db->select('sn_date')->from('tbl_session_det')->where('client_id', $this->session->userdata('client_id'))->order_by('sn_date');
		$this->db->where($where_condition);
		$query = $this->db->get();
		$appointQuery = $query->result_array();
		// Print out rows
		$prefix = '';
		echo "[\n";
		foreach($appointQuery as $counts) {
			$where = array('sn_date' => $counts['sn_date'],'client_id' => $this->session->userdata('client_id'));
			$this->db->select('count(sn_id) as sn_count')->from('tbl_session_det')->where($where);
			$query1 = $this->db->get();
			$patientQuery = $query1->row_array();
			echo $prefix . " {\n";
		    echo '  "category": "' . $counts['sn_date'] . '",' . "\n";
		    echo '  "value1": ' . $patientQuery['sn_count'] . ',' . "\n";
		    echo '  "color": "#007bff",' . "\n";
		    echo " }";
		    $prefix = ",\n";
		}
		echo "\n]";
	}
	
	
	public function delete(){
		$pro_id = $this->uri->segment(4);
		$this->common_model->delete_session($pro_id);
		$this->session->set_flashdata('message', 'Session details has been deleted successfully.');
		redirect(base_url().'client/dashboard/report_session', 'refresh');	
	}
	
	public function expire()
	{
		$this->load->view('expire');
	}
	
	public function expire1()
	{
		$this->load->view('expire1');
	}
	
	public function expire2()
	{
		$this->load->view('expire2');
	}
	
	public function expire3()
	{
		$this->load->view('expire3');
	}
	
	public function buy()
	{
		$this->load->view('changeplan2');
	}
	
	//Client logout 
	public function logout1()
	{
		$data = array('firstname' => 0,'lastname' => 0,'client_id' => 0,'logo' => 0,'last_login_date' => 0,'last_login_ip' => 0,'username' => 0,'first_name' => 0,'last_name' => 0,'client_id' => 0,'plan_id' => 0,'client_login' => false,'clinic_name' => 0,'is_parent' => 0,'is_client' => false);
		$this->session->sess_destroy();
		$this->session->unset_userdata($data);
		redirect(base_url()."client/dashboard/home");
	}
	
	public function newsletter(){
		$this->db->where('client_id', $this->session->userdata('client_id'));
		$this->db->update("tbl_client",array('newsletter' => 1));
		return true;
	}
	
	public function newsletter_view(){
		$data['page_name'] = 'newsletter';
		$this->load->view('client/newsletter_view',$data);
	}
	public function app_det()
	{
		$response = array();
		$title = $this->uri->segment(4);
		$app_id = $this->uri->segment(5);
		$con_id = $this->uri->segment(6);
		$stat = $this->uri->segment(7);
		$date = $this->uri->segment(9);
		$client_id = $this->session->userdata('client_id');
		$app_date = date('Y-m-d',strtotime($date));
		$this->db->where('appointment_id',$app_id);
		$this->db->select('start,end,har_email,har_mob_no')->from('tbl_appointments');
		$res=$this->db->get();
		$start=$res->row()->start;
		$end=$res->row()->end;
		$har_email=$res->row()->har_email;
		$har_mob_no=$res->row()->har_mob_no;
		$mobile = $har_mob_no;
		$email = $har_email;
		$date1 = $app_date;
		$notify_to = $this->uri->segment(11);
		echo $this->uri->segment(12);
		if($this->uri->segment(12) == 'new'){
			$result = $this->appoinment_model->patient_det($title,$email,$start,$mobile);
		}
		$result = $this->common_model->set_appto($app_id,$title,$app_date,$start,$end,$har_email,$har_mob_no,$client_id,$con_id); 
		$result = $this->common_model->set_updateto($app_id,$title,$app_date,$con_id);
		$result = $this->mail_model->app_det($app_id,$title,$app_date); 
		$result = $this->mail_model->app_det1($con_id,$title,$start);   
		$result = $this->schedule_model->smsNotify($app_id,$notify_to);  
		$result = $this->schedule_model->smsNotify_doc($app_id,$notify_to,$con_id); 
		if($result)
		{
			$response['status'] = 'success';
			$response['message'] = 'Referal notification has been sent successfully.';
		}
		else
		{
			$response['status'] = 'failure';
			$response['flashData'] = 'Privileges does not save';
		}
		echo json_encode($response); 
		redirect(base_url()."client/schedule"); 
	} 
	public function del_report(){
		$title = $this->uri->segment(3);
		$data['page_name'] = 'delivery_reports';
		if($title != 'total'){
			$data['delivery_list'] = $this->schedule_model->del_report_total();
			$this->load->view('client/delivery_report',$data);
		}
		else if($title != 'today'){
			$data['delivery_list'] = $this->schedule_model->del_report_today();
			$this->load->view('client/delivery_report',$data);
		}
	}
	public function add_domain()
	{
		$response = array();
		$domain = $this->input->post('domain_name');
		$val=explode('.',$domain);
		$host_name1 = $this->input->post('host_name1');
		$rec_type1=$this->input->post('rec_type1');
		$add1=$this->input->post('add1');
		$host_name2 = $this->input->post('host_name2');
		$rec_type2=$this->input->post('rec_type2');
		$add2=$this->input->post('add2');
		$host_name3 = $this->input->post('host_name3');
		$rec_type3=$this->input->post('rec_type3');
		$add3=$this->input->post('add3');
		$host_name4 = $this->input->post('host_name4');
		$rec_type4=$this->input->post('rec_type4');
		$add4=$this->input->post('add4');
		$url2="https://reseller.enom.com/interface.asp?command=sethosts&uid=physioplus&pw=10june2015&sld=".$val[0]."&tld=".$val[1]."&HostName1=".$host_name1."&RecordType1=".$rec_type1."&Address1=".$add1."&HostName2=".$host_name2."&RecordType2=".$rec_type2."&Address2=".$add2."&HostName3=".$host_name3."&RecordType3=".$rec_type3."&Address3=".$add3."&HostName4=".$host_name4."&RecordType4=".$rec_type4."&Address4=".$add4."&responsetype=xml";
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url2);
		curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);				
		$html2 = curl_exec($curl);
		curl_close ($curl); 
		$xml = new SimpleXMLElement($html2); 
		$doe = $xml->Done;
		if($doe == 'true'){
			$response['status'] = 'success';
			$response['message'] = 'Host Records Has Been Updated successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Host Records Has Been Updated successfully.';
		}
		echo json_encode($response);   
	}
	public function domain_setting() {
		$data['page_name'] = 'dashboard';
		$data['domain_det']=$this->common_model->domain_det();
		$this->load->view('client/domain_settings',$data);
	}  
	/* public function d_settings() {
		$data['page_name'] = 'dashboard';
			$data['domain_name'] = $this->uri->segment(4);
			$data['date']= $this->uri->segment(5);
			$c_id = $this->session->userdata('client_id');
			$val=explode('.',$this->uri->segment(4));
			$url1 ="https://reseller.enom.com/interface.asp?command=GetDNS&uid=physioplus&pw=10june2015&sld=".$val[0]."&tld=".$val[1]."&ResponseType=XML";
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url1);
			curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);				
			$html = curl_exec($curl);
			curl_close ($curl);
			$xml = new SimpleXMLElement($html); 
			$rhymes = $xml->dns[0];
			$data['rhymes']=$xml->dns[0];
			$data['rhymes1']=$xml->dns[1];
			$data['rhymes2']=$xml->dns[2];
			$data['rhymes3']=$xml->dns[3];
			$data['rhymes4']=$xml->dns[4];
			$url2 ="https://reseller.enom.com/interface.asp?command=getreglock&uid=physioplus&pw=10june2015&sld=".$val[0]."&tld=".$val[1]."&responsetype=xml";
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url2);
			curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);				
			$html1 = curl_exec($curl);
			curl_close ($curl);  
			$xml = new SimpleXMLElement($html1); 
			$data['r_lock']=$xml->reg-'.lock.';
			$url2="https://reseller.enom.com/interface.asp?command=gethosts&uid=physioplus&pw=10june2015&sld=".$val[0]."&tld=".$val[1]."&responsetype=xml";
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url2);
			curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);				
			$html2 = curl_exec($curl);
			curl_close ($curl);
			$xml = new SimpleXMLElement($html2); 
			$data['host_id1']=$xml->host[0]->hostid;
			$data['host_name1']=$xml->host[0]->name;
			$data['host_type1']=$xml->host[0]->type;
			$data['host_add1']=$xml->host[0]->address;
			if($xml->host[1] != false){
			$data['host_id2']=$xml->host[1]->hostid;
			$data['host_name2']=$xml->host[1]->name;
			$data['host_type2']=$xml->host[1]->type;
			$data['host_add2']=$xml->host[1]->address;
			} else { 
			$data['host_id2']='';
			$data['host_name2']='';
			$data['host_type2']='';
			$data['host_add2']='';
			}
			if($xml->host[2] != false){
			$data['host_id3']=$xml->host[2]->hostid;
			$data['host_name3']=$xml->host[2]->name;
			$data['host_type3']=$xml->host[2]->type;
			$data['host_add3']=$xml->host[2]->address;
			} else {
				$data['host_id3']='';
				$data['host_name3']='';
				$data['host_type3']='';
				$data['host_add3']='';
			}
			if($xml->host[3] != false){
			$data['host_id4']=$xml->host[3]->hostid;
			$data['host_name4']=$xml->host[3]->name;
			$data['host_type4']=$xml->host[3]->type;
			$data['host_add4']=$xml->host[3]->address;
			} else {
				$data['host_id4']='';
				$data['host_name4']='';
				$data['host_type4']='';
				$data['host_add4']='';
			}
			$url1 ="https://reseller.enom.com/interface.asp?command=getcontacts&uid=physioplus&pw=10june2015&sld=".$val[0]."&tld=".$val[1]."&responsetype=xml";
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url1);
			curl_setopt ($curl, CURLOPT_RETURNTRANSFER,1);				
			$html = curl_exec($curl);
			curl_close ($curl);
			$xml = new SimpleXMLElement($html); 
			$data['r_name']=$xml->GetContacts->Registrant->RegistrantFirstName;
			$data['r_lname']=$xml->GetContacts->Registrant->RegistrantLastName;
			$data['r_addr']=$xml->GetContacts->Registrant->RegistrantAddress1;
			$data['r_city']=$xml->GetContacts->Registrant->RegistrantCity;
			$data['r_country']=$xml->GetContacts->Registrant->RegistrantCountry;
			$data['r_state']=$xml->GetContacts->Registrant->RegistrantStateProvince;
			$data['r_post']=$xml->GetContacts->Registrant->RegistrantPostalCode;
			$data['r_email']=$xml->GetContacts->Registrant->RegistrantEmailAddress;
			$data['r_phone']=$xml->GetContacts->Registrant->RegistrantPhone;
			
			$data['b_name']=$xml->GetContacts->Billing->BillingFirstName;
			$data['b_lname']=$xml->GetContacts->Billing->BillingLastName;
			$data['b_addr']=$xml->GetContacts->Billing->BillingAddress1;
			$data['b_city']=$xml->GetContacts->Billing->BillingCity;
			$data['b_country']=$xml->GetContacts->Billing->BillingCountry;
			$data['b_state']=$xml->GetContacts->Billing->BillingStateProvince;
			$data['b_post']=$xml->GetContacts->Billing->BillingPostalCode;
			$data['b_email']=$xml->GetContacts->Billing->BillingEmailAddress;
			$data['b_phone']=$xml->GetContacts->Billing->BillingPhone;
			
			$data['t_name']=$xml->GetContacts->Tech->TechFirstName;
			$data['t_lname']=$xml->GetContacts->Tech->TechLastName;
			$data['t_addr']=$xml->GetContacts->Tech->TechAddress1;
			$data['t_city']=$xml->GetContacts->Tech->TechCity;
			$data['t_country']=$xml->GetContacts->Tech->TechCountry;
			$data['t_state']=$xml->GetContacts->Tech->TechStateProvince;
			$data['t_post']=$xml->GetContacts->Tech->TechPostalCode;
			$data['t_email']=$xml->GetContacts->Tech->TechEmailAddress;
			$data['t_phone']=$xml->GetContacts->Tech->TechPhone;
			
			$data['a_name']=$xml->GetContacts->Admin->AdminFirstName;
			$data['a_lname']=$xml->GetContacts->Admin->AdminLastName;
			$data['a_addr']=$xml->GetContacts->Admin->AdminAddress1;
			$data['a_city']=$xml->GetContacts->Admin->AdminCity;
			$data['a_country']=$xml->GetContacts->Admin->AdminCountry;
			$data['a_state']=$xml->GetContacts->Admin->AdminStateProvince;
			$data['a_post']=$xml->GetContacts->Admin->AdminPostalCode;
			$data['a_email']=$xml->GetContacts->Admin->AdminEmailAddress;
			$data['a_phone']=$xml->GetContacts->Admin->AdminPhone;
			$url3="https://reseller.enom.com/interface.asp?command=getmailhosts&uid=physioplus&pw=10june2015&sld=".$val[0]."&tld=".$val[1]."&responsetype=xml";
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url3);
			curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);				
			$html3 = curl_exec($curl);
			curl_close ($curl); 
			$xml = new SimpleXMLElement($html3);
			$data['mail_id1']=$xml->mailhosts->host[0]->hostID;			
			$data['mail_name1']=$xml->mailhosts->host[0]->HostName;
			$data['mailrec_type1']=$xml->mailhosts->host[0]->RecordType;
			$data['mailadd1']=$xml->mailhosts->host[0]->Address;
			$data['mailpref1']=$xml->mailhosts->host[0]->MXPref;
			$data['mail_id2']=$xml->mailhosts->host[1]->hostID;
			$data['mail_name2']=$xml->mailhosts->host[1]->HostName;
			$data['mailrec_type2']=$xml->mailhosts->host[1]->RecordType;
			$data['mailadd2']=$xml->mailhosts->host[1]->Address;
			$data['mailpref2']=$xml->mailhosts->host[1]->MXPref;
			$data['mail_id3']=$xml->mailhosts->host[2]->hostID;
			$data['mailadd3']=$xml->mailhosts->host[2]->Address;
			$data['mail_name3']=$xml->mailhosts->host[2]->HostName;
			$data['mailrec_type3']=$xml->mailhosts->host[2]->RecordType;
			$data['mailpref3']=$xml->mailhosts->host[2]->MXPref;
			$data['mail_id4']=$xml->mailhosts->host[3]->hostID;
			$data['mailadd4']=$xml->mailhosts->host[3]->Address;
			$data['mail_name4']=$xml->mailhosts->host[3]->HostName;
			$data['mailrec_type4']=$xml->mailhosts->host[3]->RecordType;
			$data['mailpref4']=$xml->mailhosts->host[3]->MXPref;
			$this->load->view('client/d_settings',$data);
	} */
	public function transfer() {
		$domain_name='devidphysio.com';
		$val=explode('.',$domain_name);
		$data['page_name'] = 'dashboard';
		$url2="https://reseller.enom.com/interface.asp?Command=XXX_GETMEMBERID&UID=physioplus&PW=10june2015&ResponseType=xml&sld=".$val[0]."&tld=".$val[1];
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url2);
		curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);				
		$html2 = curl_exec($curl);
		curl_close ($curl); 
		$xml = new SimpleXMLElement($html2); 
		$doe = $xml->DomainNameID;
		echo $html2;
		echo $doe;
	}
	public function add_mail()
	{
		$response = array();
		$domain = $this->input->post('domain_name');
		$val=explode('.',$domain);
		$host_name1 = $this->input->post('host_name1');
		$rec_type1=$this->input->post('mail_1');
		$add1=$this->input->post('add1');
		if($add1 == ''){
			$add1="test.record.com";
		}
		else {
			$add1=$add1;
		}
		$pref1=$this->input->post('pref1');
		$host_name2 = $this->input->post('host_name2');
		$rec_type2=$this->input->post('mail_2');
		$add2=$this->input->post('add2');
		if($add2 == ''){
			$add2="test.record.com";
		}
		else {
			$add2=$add2;
		}
		$pref2=$this->input->post('pref2');
		$host_name3 = $this->input->post('host_name3');
		$rec_type3=$this->input->post('mail_3');
		$add3=$this->input->post('add3');
		if($add3 == ''){
			$add3="test.record.com";
		}
		else {
			$add3=$add3;
		}
		$pref3=$this->input->post('pref3');
		$host_name4 = $this->input->post('host_name4');
		$rec_type4=$this->input->post('mail_4');
		$add4=$this->input->post('add4');
		$pref4=$this->input->post('pref4');
		if($add4 == ''){
			$add4="test.record.com";
		}
		else {
			$add4=$add4;
		}
		$url2="https://reseller.enom.com/interface.asp?command=sethosts&uid=physioplus&pw=10june2015&sld=".$val[0]."&tld=".$val[1]."&HostName1=@&RecordType1=MX&Address1=".$add1."&MXPrefX1=".$pref1."&HostName2=@&RecordType2=MX&Address2=".$add2."&MXPrefX2=".$pref2."&HostName3=@RecordType3=MX&Address3=".$add3."&MXPrefX3=".$pref3."&HostName4=@&RecordType4=MX&Address4=".$add4."&MXPrefX4=".$pref4."&responsetype=xml";
		//$url2="https://reseller.enom.com/interface.asp?command=sethosts&uid=physioplus&pw=10june2015&sld=".$val[0]."&tld=".$val[1]."&HostName1=".$host_name1."&RecordType1=MX&Address1=".$add1."&MXPrefX1=".$pref1."&HostName2=".$host_name2."&RecordType2=MX&Address2=".$add2."MXPrefX2=".$pref2."&HostName3=".$host_name3."&RecordType3=MX&Address3=".$add3."&MXPrefX3=".$pref3."&HostName4=".$host_name4."&RecordType4=MX&Address4=".$add4."&MXPrefX4=".$pref4."&responsetype=xml";
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url2);
		curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);				
		$html2 = curl_exec($curl);
		curl_close ($curl); 
		echo $html2;
		 $xml = new SimpleXMLElement($html2); 
		$doe = $xml->Done; 
		if($doe == 'true'){
			$response['status'] = 'success';
			$response['message'] = 'Host Records Has Been Updated successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Host Records Has Been Updated successfully.';
		}
		echo json_encode($response); 
	}
	public function Clinic_details() {
		$this->app_access->client();
		$data['page_name'] = 'clinics';
		
		$this->db->distinct(); 
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('SUM(total_amt) AS amount')->from('tbl_expanse')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
		$data['expenseAmt'] = $query->row()->amount;
		
		$this->db->distinct(); 
		$this->db->where('client_id',$this->session->userdata('client_id'));		
		$this->db->select('SUM(paid_amt) AS amount')->from('tbl_invoice_header')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
		$data['incomeAmt'] = $query->row()->amount;
		
		$data['patientCount'] = $this->patient_model->getPatientCount();
		$data['referalCount'] = $this->referal_model->getReferalCount();
		$data['invoiceCount'] = $this->invoice_model->getInvoiceCount();
		$data['staffCount'] = $this->staff_model->getStaffCount();
		$data['userCount'] = $this->user_model->getUserCount();
		$data['scheduleCount'] = $this->schedule_model->getScheduleCount_status();
		$data['cancelscheduleCount'] = $this->schedule_model->getcancelScheduleCount();
		$this->load->view('client/dashboard',$data);
	
	}
	public function view_event() {
		$this->app_access->client();
		$data['page_name'] = 'dashboard';
		$eventid=$this->uri->segment(4);
		$data['events'] = $this->anotherdb_model->getevent_det($eventid);
		$this->load->view('client/event_view',$data);
	 
	}
	
	public function speaker() {
		
		$this->app_access->client();
		$data['page_name'] = 'dashboard';
		$from = date('Y-m-d');
		$first_date = strtotime($from);
		$second_date = strtotime('-59 day', $first_date);
		$to = date('Y-m-d', $second_date);
		$where_condition = "(bill_date >= '".$to."' AND bill_date <= '".$from."')";
		 
		$this->db->distinct(); 
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('SUM(total_amt) AS amount')->from('tbl_expanse')->where('client_id', $this->session->userdata('client_id'));
		//$this->db->where($where_condition);
		$query = $this->db->get();
		$data['expenseAmt'] = $query->row()->amount;
		
		$from = date('Y-m-d');
		$first_date = strtotime($from);
		$second_date = strtotime('-59 day', $first_date);
		$to = date('Y-m-d', $second_date);
		$where_condition = "(treatment_date >= '".$to."' AND treatment_date <= '".$from."')";
		 $this->db->distinct(); 
		$this->db->where('client_id',$this->session->userdata('client_id'));		
		$this->db->select('SUM(paid_amt) AS amount')->from('tbl_invoice_header')->where('client_id', $this->session->userdata('client_id'));
		//$this->db->where($where_condition);
		$query = $this->db->get();
		$data['incomeAmt'] = $query->row()->amount;
		$data['patientCount'] = $this->patient_model->getPatientCount();
		$data['referalCount'] = $this->referal_model->getReferalCount();
		$data['invoiceCount'] = $this->invoice_model->getInvoiceCount();
		 $data['staffCount'] = $this->staff_model->getStaffCount();
		$data['userCount'] = $this->user_model->getUserCount();
		$data['scheduleCount'] = $this->schedule_model->getScheduleCount();
		$data['cancelscheduleCount'] = $this->schedule_model->getcancelScheduleCount();
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
				
		$config['per_page'] = 5;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
		
		$search = urldecode($this->uri->segment(4));
		$search1 = urldecode($this->uri->segment(5));
		$search2 = urldecode($this->uri->segment(6));
		if($search == 'event'){
			$this->legacy_db->where('speakername',$search1);
		}
		if($search == 'topic'){
			$this->legacy_db->where('break_tittle',$search1);
		}
		if($search == 'both'){
			$this->legacy_db->where('break_tittle',$search2);
			$this->legacy_db->where('speakername',$search1);
		}
		//Count
		$this->legacy_db->distinct();
		$this->legacy_db->select('count(*) as totalrows')->from('session_break');
		$this->legacy_db->where('eventtype',2);
		//$this->legacy_db->group_by('user_id,break_tittle');
		$q = $this->legacy_db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		 
		$search = urldecode($this->uri->segment(4));
		$search1 = urldecode($this->uri->segment(5));
		$search2 = urldecode($this->uri->segment(6));
		if($search == 'event'){
			$this->legacy_db->where('speakername',$search1);
		}
		if($search == 'topic'){
			$this->legacy_db->where('break_tittle',$search1);
		}
		if($search == 'both'){
			$this->legacy_db->where('break_tittle',$search2);
			$this->legacy_db->where('speakername',$search1);
		}
		//prepare active record for new query (with limit/offeset/orderby)
		$this->legacy_db->distinct();
		$this->legacy_db->select('speakername,speakerimage,event_id')->from('session_break');
		$this->legacy_db->where('eventtype',2);
		$do_page = array_search("page",$segment_array);
		if ($do_page !== FALSE)
		{
			$current_page_segment = $do_page+1;
			$current_page = (int) $this->uri->segment($current_page_segment,0);
			$this->legacy_db->limit($config['per_page'], $current_page);
			if($current_page) array_pop($segment_array);
		} 
		else 
		{
			$current_page_segment = 0;
			$this->legacy_db->limit($config['per_page']);
			array_push($segment_array, 'page');
		}
		// data subset
		$query = $this->legacy_db->get();
		$data['speakers_det'] = ($query->num_rows() > 0) ? $query->result_array() : false;
	
		
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
		$this->load->view('client/speaker_list',$data);
	} 
	public function events_email(){
		$data['event_id'] = $this->uri->segment(4);
		$this->app_access->client();
		$data['page_name'] = 'dashboard';
		$data['groups'] = $this->common_model->getgroup();
		$data['patients'] = $this->common_model->getPatientname();
		//$data['event_details'] = $this->anotherdb_model->getevent_details($event_id);
		$this->load->view('client/events_email',$data);
		//print_r($data['groups']);
	}
	public function eventSendEmail(){
		$response = array();
		$event_id = $this->input->post('event_id');
		$value = $this->input->post('email');
		$value1 = $this->input->post('group_id');
		if($value != ''){
			$val = explode(',',$value);
		} else if($value1 != false) {
			$this->db->where('group_id',$value1);
			$this->db->select('email_id')->from('tbl_events_group');
			$res = $this->db->get();
			$emails = $res ->row()->email_id;
			$val = explode(',',$emails);
		} else {
			
		}
		for($i = 0; $i < count($val); $i++){
			$email = $val[$i];
			echo $email;
			$this->mail_model->event_mail($event_id,$email);
		}
		if($val != false )
			{
				$response['status'] = 'success';
				$response['message'] = 'password has been changed successfully.';
			}
		echo json_encode($response);
	}
	public function mypassbook() {
		$this->app_access->client();
		$data['page_name'] = 'settings';
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		
		$segment_array = $this->uri->segment_array();
		$config['per_page'] =10;
		$current_page ='';
		$client_id=$this->session->userdata('client_id');
		
		$this->db->select('*')->from('tbl_balance')->where('client_id',$client_id);
		$query = $this->db->get();
		$config['total_rows'] = $query->num_rows();
		
		$this->db->select('*');
		$this->db->from("tbl_balance");    
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
		$query=$this->db->get();
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
		$data['result']=$query->result_array();
		$data['invoice'] = $this->registration_model->invoice_det($this->session->userdata('clinic_name'));		
		$data['i_friends'] = $this->registration_model->i_friends($this->session->userdata('client_id'));		
		$data['invoice'] = $this->registration_model->invoice_det($this->session->userdata('clinic_name'));		
		$data['exercise'] = $this->registration_model->exercise_det($this->session->userdata('clinic_name'));		
		$this->load->view('client/mypassbook',$data);
	}
	public function invite_earn() {
		$this->app_access->client();
		$data['page_name'] = 'settings';
		$data['invoice'] = $this->registration_model->invoice_det($this->session->userdata('client_id'));		
		$data['i_friends'] = $this->registration_model->i_friends($this->session->userdata('client_id'));		
		$this->load->view('client/invite_earn',$data);
	}    
	public function order_list() {
		$this->app_access->client();
		$data['page_name'] = 'settings';
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		
		$segment_array = $this->uri->segment_array();
		$config['per_page'] =10;
		$current_page ='';
		$client_id=$this->session->userdata('client_id');
		$this->db->where('t_status','2');
		$this->db->where('pay !=','free');
		$this->db->select('*')->from('prescription_detail')->where('client_id',$client_id);
		$this->db->order_by("chart_id", "desc");
		$query = $this->db->get();
		$config['total_rows'] = $query->num_rows();
		$this->db->select('*');
		$this->db->where('t_status','2');
		$this->db->from("prescription_detail");
		$this->db->order_by("chart_id", "desc");
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
		$this->db->where('pay !=','free');		
		$query=$this->db->get();
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
		$data['result']=$query->result_array();
		$data['invoice'] = $this->registration_model->invoice_det($this->session->userdata('clinic_name'));		
		$this->load->view('client/new_orders',$data);
	}
	public function pendingorder_list() {  
		$this->app_access->client();
		$data['page_name'] = 'settings';
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		$config['per_page'] =10;
		$current_page ='';
		$client_id=$this->session->userdata('client_id');
		$this->db->where('t_status','2');
		$this->db->select('*')->from('prescription_detail')->where('client_id',$client_id);
		$this->db->order_by("chart_id", "desc");
		$query = $this->db->get();
		$config['total_rows'] = $query->num_rows();
		$search=str_replace('%20',' ',$this->uri->segment(4));
		$search1=str_replace('%20',' ',$this->uri->segment(5));
		$search2=str_replace('%20',' ',$this->uri->segment(6));
		if($search == 'date'){
			$data['dateFilter'] = true;
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment(5))));
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment(6))));
			$where_condition = "(ex_date >= '".$from."' AND ex_date <= '".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
			$this->db->where($where_condition);
			$this->db->select('*');
			$this->db->from("prescription_detail");
			$this->db->order_by("chart_id", "desc");
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
		else if($search1 == 'ChartName') {
			$this->db->where('chartname',$search2);
			$this->db->select('*');
			$this->db->from("prescription_detail");
			$this->db->order_by("chart_id", "desc");
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
		else if($search1 == 'PatientName') {
			$this->db->where('patient_id',$search2);
			$this->db->select('*');
			$this->db->from("prescription_detail");
			$this->db->order_by("chart_id", "desc");
			$this->db->where('client_id',$this->session->userdata('client_id'));
		} else {
			$this->db->select('*');
			$this->db->from("prescription_detail");
			$this->db->order_by("chart_id", "desc");
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
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
		$this->db->where('t_status','2');
		$query=$this->db->get();
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
		$data['result']=$query->result_array();
		$data['current_page_segment'] = $current_page_segment;
		$data['invoice'] = $this->registration_model->invoice_det($this->session->userdata('clinic_name'));		
		$this->load->view('client/pending_order',$data);
		
	}
	public function payout_summary() {
		$this->app_access->client();
		$data['page_name'] = 'settings';
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		$config['per_page'] =10;
		$current_page ='';
		$client_id=$this->session->userdata('client_id');
		$this->db->where('t_status','1');
		$this->db->select('*')->from('prescription_detail')->where('client_id',$client_id);
		$this->db->order_by("chart_id", "desc");
		$query = $this->db->get();
		$config['total_rows'] = $query->num_rows();
		$search=str_replace('%20',' ',$this->uri->segment(4));
		$search1=str_replace('%20',' ',$this->uri->segment(5));
		$search2=str_replace('%20',' ',$this->uri->segment(6));
		if($search == 'date'){
			$data['dateFilter'] = true;
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment(5))));
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment(6))));
			$where_condition = "(ex_date >= '".$from."' AND ex_date <= '".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
			$this->db->where($where_condition);
			$this->db->where('t_status','1');
			$this->db->select('*');
			$this->db->from("prescription_detail");
			$this->db->order_by("chart_id", "desc");
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
		else if($search1 == 'ChartName') {
			$this->db->where('t_status','1');
			$this->db->where('chartname',$search2);
			$this->db->select('*');
			$this->db->from("prescription_detail");
			$this->db->order_by("chart_id", "desc");
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
		else if($search1 == 'PatientName') {
			$this->db->where('t_status','1');
			$this->db->where('patient_id',$search2);
			$this->db->select('*');
			$this->db->from("prescription_detail");
			$this->db->order_by("chart_id", "desc");
			$this->db->where('client_id',$this->session->userdata('client_id'));
		} else {
			$this->db->select('*');
			$this->db->where('t_status','1');
			$this->db->from("prescription_detail");
			$this->db->order_by("chart_id", "desc");
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
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
		$query=$this->db->get();
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
		$data["pagination"] = $this->pagination->create_links();
		$data['result']=$query->result_array();
		$this->load->view('client/payout',$data);
		
	}
	public function tickets() {
		$this->app_access->client();
		$data['page_name'] = 'settings';
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$this->legacy_db = $this->load->database('second', true);
 		$segment_array = $this->uri->segment_array();
		$config['per_page'] =10;
		$current_page ='';
		
		$this->legacy_db->select("*")->from('tbl_tickets');
		$this->legacy_db->where('user_id',$this->session->userdata('client_id'));
		$query = $this->legacy_db->get();
		$config['total_rows'] = $query->num_rows();
		
		$this->legacy_db->select("*")->from('tbl_tickets');
		$this->legacy_db->where('user_id',$this->session->userdata('client_id'));
		$query=$this->legacy_db->get();
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
		$this->pagination->initialize($config);
		$data["pagination"] = $this->pagination->create_links();
		$data['result']=$query->result_array();
		$this->load->view('client/ticket_details',$data);
		
	}
	public function edit_app() {
		$this->app_access->client();
		$data['page_name'] = 'settings';
		$data['profile'] = $this->registration_model->editappProfile($this->session->userdata('clinic_name'));		
		$data['doc_det'] = $this->registration_model->doctor_det($this->session->userdata('client_id'));
        $data['name'] = $this->registration_model->editProfile($this->session->userdata('client_id'));		
		$this->load->view('client/appdetails_edit',$data);
	}
	
	
	public function preconference_price() {
	   
	    /* $event_id=$this->input->post('event_id');
		$topic=$this->input->post('topic'); */
	    $result=$this->anotherdb_model->preconference_pricedetails($_POST['value']); 
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Referal  has been added successfully.';
			$response['value'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	
	
	
	
	}
	
	public function postconference_price() {
	   
	    /* $event_id=$this->input->post('event_id');
		$topic=$this->input->post('topic'); */
	    $result=$this->anotherdb_model->postconference_pricedetails($_POST['value']); 
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Referal  has been added successfully.';
			$response['value'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	}
	
	
	
	public function edit_appdetails() {
		$result = $this->registration_model->edit_app(); 
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Referal  has been added successfully.';
		}else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);  
	}
	public function test123() {
		$this->legacy_db->where('event_id','12');
		$this->legacy_db->where('topic',urlencode('Visceral Manipulation'));
		$this->legacy_db->select('price')->from('tbl-preconference');
		$query = $this->legacy_db->get();
		print_r($query);
	}
	public function notification_app() {
		$this->app_access->client();
		$data['page_name'] = 'settings';
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 10;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
		
		
		
		// do date filter
		$do_date = array_search("date",$segment_array);
		if ($do_date !== FALSE)
		{
			$from = date('Y-m-d',  strtotime($this->uri->segment(5)));
			$to = date('Y-m-d',  strtotime($this->uri->segment(6)));
			$where_condition = "(not_date >= '".$from."' AND not_date <= '".$to."')";
		}  
		
		//Count
		$where_condition = ($where_condition != '') ? $where_condition : '';
		$this->db->distinct();
		$this->db->select('count(*) as totalrows')->from('tbl_notifications');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->distinct();
		$this->db->select('*');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->from("tbl_notifications");
		
		//do where
		if($where_condition!='') {
			$this->db->where($where_condition);
		} 
		$this->db->order_by('date','desc');
		
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
		$data['notification_report'] = ($query->num_rows() > 0) ? $query->result_array() : false;
	
		
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
		$data["links"] = explode('&nbsp;',$str_links );
		$data['patientname'] = $this->patient_model->get_patientdetails();
		$this->load->view('client/notification_app',$data);
	}
	public function send_notification() {
		 $result = $this->registration_model->add_notification(); 
		 $msg = $this->input->post('short_desc');    
		 $summary = $this->input->post('message');
		 $pic = 'https://physioplustech.in/uploads/app/'.$this->input->post('upload_img');
		 $title=$this->input->post('title');  
		 $patient_id = implode(',',$this->input->post('patient_id'));
		 $id =  explode(',',$patient_id);
		 for($i=0; $i < sizeof($id); $i++){
			$this->db->where('patient_id',$id[$i]);
            $this->db->select('token')->from('tbl_patient_info');
            $res = $this->db->get();			
			$token = $res->row()->token;
			    define( 'API_ACCESS_KEY', 'AAAAHhxim7Y:APA91bGeFWJJ6ZHdYqoxNwl7e8C7A-AvjlaDCAg43hfEhNzPVqfn1tR-Bg8y6vB0SKDaqgqnx07JyLaZiigDcJ482Tkk_nPBEhsqkX88sYHTRYLZnunznnU-Mexyj7VnDbgOn_oAaXc7' );
				$fcmUrl ='https://fcm.googleapis.com/fcm/send';
				//$token = 'cBWmWc1LUto:APA91bGeUPtor8xnDnR-ebXYktNUT6lbsPKH5QIm9XPHCMh_6_KGrx2jz6tSCmZR28-k5xIXUhYJz_JKY3eJQhaTjDwxhN2Qe60tar3pieGnNOEwNs0OIQ3aLluDf8j4Kk_8j0JJQTRP';
				$notification = array(  'title' => $title,
					'body' => $msg,
					'icon' =>'myIcon', 
					'sound' => 'mySound',
					'image' => 'https://physioplustech.in/uploads/app/'.$this->input->post('upload_img'),
				);
				$extraNotificationData = array(
						"message" => $notification,
						"moredata" =>'dd',
						"picture" =>'http://www.physioevents.com/uploads/1511157756.png'
						);
				$fcmNotification = array(
					'to'        => $token, //single token
					'notification' => $notification,
					'data' => $extraNotificationData
				);
				 
				$headers = array(
					'Authorization: key=' . API_ACCESS_KEY,
					'Content-Type: application/json'
				);
				 
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,$fcmUrl);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
				$result = curl_exec($ch);
				curl_close($ch);
				echo $result;  
			
		 }  
		
	} 
	public function send_notification123() {
	    define("GOOGLE_API_KEY", "AIzaSyAlJG58U6R2oYP-f772Is3_x46AJupoUjY");
		define("GOOGLE_GCM_URL", "https://fcm.googleapis.com/fcm/send");
		$reg_id = 'deeuRvfzeCU:APA91bGVauLDHXMkojIM_O5OL0W_q2epEwZvrNS4NBXKwZrpiAVL5UuAAlgrBVa1Snh6IExJhDbv6QyT5ZUzm0aRb9zle4Ib0OS-Wl47-Li4eCJN-fF09ycA6B15Vwdwx7LUn9j1wzhk';
		$msg = array( 
		              'message' => 'fdjghdhbf dbfjdhjfd fdjfhdjfhjd',
					  'title' => 'fdvfhdvf',
					  "icon"  => "ic_launcher",
					  "main_picture" => 'http://physioplustech.com/uploads/test/images.jpg' 
					  //'largeIcon' => 'https://firebase.google.com/_static/573047c9a6/images/firebase/lockup.png',
        
		);
		$fields = array(
             'to'  						=> $reg_id ,
			'priority'					=> "high",
            'notification'              => array("title" => 'Title', "body" => 'Test message',"vibrate"   => 1,"sound" => "bingbong.aiff"),
			'data'						=> $msg
        ); 
		$headers = array(
			GOOGLE_GCM_URL,
			'Content-Type: application/json',
            'Authorization: key=' . GOOGLE_API_KEY 
        );
		
		echo "<br>";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, GOOGLE_GCM_URL);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Problem occurred: ' . curl_error($ch));
        }
		curl_close($ch);
		echo $result; 
	}  
	public function sakra() {
		$result = $this->mail_model->sakra(); 
	}

     public function physio_jobs(){
		 
		$this->app_access->client();
		$data['page_name'] = 'dashboard';
		$this->db->distinct(); 
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('SUM(total_amt) AS amount')->from('tbl_expanse')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
		$data['expenseAmt'] = $query->row()->amount;
		$this->db->distinct(); 
		$this->db->where('client_id',$this->session->userdata('client_id'));		
		$this->db->select('SUM(paid_amt) AS amount')->from('tbl_invoice_header')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
		$data['incomeAmt'] = $query->row()->amount;
		$data['patientCount'] = $this->patient_model->getPatientCount();
		$data['referalCount'] = $this->referal_model->getReferalCount();
		$data['invoiceCount'] = $this->invoice_model->getInvoiceCount();
		$data['staffCount'] = $this->staff_model->getStaffCount();
		$data['userCount'] = $this->user_model->getUserCount();
		$data['scheduleCount'] = $this->schedule_model->getScheduleCount();
		$data['cancelscheduleCount'] = $this->schedule_model->getcancelScheduleCount();
	    $this->load->view('client/physio_joblist',$data);
		 
	 }

      public function physio_file(){
		 
		$this->app_access->client();
		$data['page_name'] = 'dashboard';
		$this->db->distinct(); 
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('SUM(total_amt) AS amount')->from('tbl_expanse')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
		$data['expenseAmt'] = $query->row()->amount;
		$this->db->distinct(); 
		$this->db->where('client_id',$this->session->userdata('client_id'));		
		$this->db->select('SUM(paid_amt) AS amount')->from('tbl_invoice_header')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
		$data['incomeAmt'] = $query->row()->amount;
		$data['patientCount'] = $this->patient_model->getPatientCount();
		$data['referalCount'] = $this->referal_model->getReferalCount();
		$data['invoiceCount'] = $this->invoice_model->getInvoiceCount();
		$data['staffCount'] = $this->staff_model->getStaffCount();
		$data['userCount'] = $this->user_model->getUserCount();
		$data['scheduleCount'] = $this->schedule_model->getScheduleCount();
		$data['cancelscheduleCount'] = $this->schedule_model->getcancelScheduleCount();
	    $data['profile'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		
		$this->load->view('client/physio_filejob',$data);
		 
	 }
	 public function add_physiojob() {
		
		$result = $this->registration_model->add_physiojob(); 
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Referal  has been added successfully.';
		}else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	 }  
	 public function jobs_desc_add() {  
		 	$this->app_access->client();
		    $data['page_name'] = 'dashboard';
			$this->db->where('client_id',$this->session->userdata('client_id'));
			$this->db->select('SUM(total_amt) AS amount')->from('tbl_expanse')->where('client_id', $this->session->userdata('client_id'));
			$query = $this->db->get();
			$data['expenseAmt'] = $query->row()->amount;
			$this->db->distinct(); 
			$this->db->where('client_id',$this->session->userdata('client_id'));		
			$this->db->select('SUM(paid_amt) AS amount')->from('tbl_invoice_header')->where('client_id', $this->session->userdata('client_id'));
			$query = $this->db->get();
			$data['incomeAmt'] = $query->row()->amount;
			$data['jobs'] = $this->anotherdb_model->getjobs();
			$data['patientCount'] = $this->patient_model->getPatientCount();
			$data['referalCount'] = $this->referal_model->getReferalCount();
			$data['invoiceCount'] = $this->invoice_model->getInvoiceCount();
			$data['staffCount'] = $this->staff_model->getStaffCount();
			$data['userCount'] = $this->user_model->getUserCount();
			$data['scheduleCount'] = $this->schedule_model->getScheduleCount();
			$data['cancelscheduleCount'] = $this->schedule_model->getcancelScheduleCount();
	    
			$this->load->view('client/physio_jobs',$data);
	
	 }
	  public function add_physiojobdesc() {
			$result = $this->registration_model->add_physiojobdesc(); 
			if($result != ''){
				$response['status'] = 'success';
				$response['message'] = 'Referal  has been added successfully.';
			}else { 
				$response['status'] = 'Failure';
				$response['message'] = 'Referal has not been added successfully.';
			} 
			echo json_encode($response);
		}
		public function hjhf() {
			$this->load->view('test');
	
		}
		
       public function news_letter(){
		   $query = $this->db->query('SELECT * FROM tbl_client');
          echo $query->num_rows();
	   }
       public function physio_Newsletter(){
		 $this->db->select('*')->from('tbl_client');
		 $this->db->where('email_verified','1');
		 $query = $this->db->get();
		 if($query->result_array() != false){
		 foreach($query->result_array() as $row){
			 $email = $row['email'];
			 //echo $email;
			 //$this->mail_model->newsletter($email);
		 }
		 }
		
	 }
	 /* public function test_url() {  
		$message_doctor = <a href="https://play.google.com/store/apps/details?id=com.physioplusnetwork.physioplus&hl=en">https://pgm/apps?id=com.physioplusnetwork.physioplus&hl=en</a>';
		$smsUrl = 'http://smsindia.techmartonline.com/api/sendhttp.php?authkey=136791ASgfUVtgugG15874a756&mobiles=9944641914&message='.urlencode($message_doctor).'&sender=PHPLUS&route=4&country=0';
		$doctor_churl = @fopen($smsUrl,'r');
		fclose($doctor_churl);
	}  */
	public function delete_notification() {
		$result = $this->registration_model->delete_notification($_POST['n_id']); 
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Notification  has been added successfully.';
		}else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Notification has not been added successfully.';
		} 
		echo json_encode($response);
	 } 
	 public function edit_notification() {
		$data['page_name'] = 'dashboard';
		$data['result'] = $this->registration_model->edit_notification(); 
		$this->load->view('client/edit_notify',$data);
	 } 
	 public function update_notification() {
		 $result = $this->registration_model->update_notification(); 
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Notification  has been added successfully.';
		}else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Notification has not been added successfully.';
		} 
		echo json_encode($response);
	 }
	 public function doctor_det() {
		$result = $this->registration_model->doc_add(); 
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Notification  has been added successfully.';
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Notification has not been added successfully.';
		} 
		echo json_encode($response);
	 }
	 public function delete_doc() {
		$result = $this->registration_model->delete_doctor($_POST['n_id']); 
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Notification  has been added successfully.';
		}else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Notification has not been added successfully.';
		} 
		echo json_encode($response);
	 }
	 public function edit_doc() {
		 $data['page_name'] = 'dashboard';
		 $data['result'] = $this->registration_model->edit_doc(); 
		 $this->load->view('client/edit_doc',$data);
	
	 }
	  public function update_doctordetails() {
		$result = $this->registration_model->update_doctordetails(); 
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Notification  has been added successfully.';
		}else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Notification has not been added successfully.';
		} 
		echo json_encode($response);
	 }
   /* public function getlat_lan1() {
		 $this->legacy_db->select('event_id,city')->from('eventinfo');
		$res = $this->legacy_db->get();
		foreach($res->result_array() as $row){
			$address = $row['city'];
			$prepAddr = str_replace(' ','+',$address);
			$geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false');
			if ($geo['status'] == 'OK') {
				  // Get Lat & Long
				  $latitude = $geo['results'][0]['geometry']['location']['lat'];
				  $longitude = $geo['results'][0]['geometry']['location']['lng'];
			}
			
		} 
			$address = 'Mumbai';
			$prepAddr = str_replace(' ','+',$address);
			$geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false');
			if ($geo['status'] == 'OK') {
				  $latitude = $geo['results'][0]['geometry']['location']['lat'];
				  $longitude = $geo['results'][0]['geometry']['location']['lng'];
				echo $latitude;
			}
			
   } */
	public function dash_summary() {
		$data['page_name'] = 'dashboard';
		$this->load->view('test',$data);
	}
	public function notify_app() {
		$data['page_name'] = 'settings';
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 10;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
		
		
		
		// do date filter
		$do_date = array_search("date",$segment_array);
		if ($do_date !== FALSE)
		{
			$from = date('Y-m-d',  strtotime($this->uri->segment(5)));
			$to = date('Y-m-d',  strtotime($this->uri->segment(6)));
			$where_condition = "(not_date >= '".$from."' AND not_date <= '".$to."')";
		}  
		
		//Count
		$where_condition = ($where_condition != '') ? $where_condition : '';
		$this->db->distinct();
		$this->db->select('count(*) as totalrows')->from('tbl_notify');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->distinct();
		$this->db->select('*');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->from("tbl_notify");
		
		//do where
		if($where_condition!='') {
			$this->db->where($where_condition);
		} 
		$this->db->order_by('date','desc');
		
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
		$data['notification_report'] = ($query->num_rows() > 0) ? $query->result_array() : false;
	
		
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
		$data["links"] = explode('&nbsp;',$str_links );
		$this->load->view('client/notify_app',$data);
	
	}

    public function send_notify() {
		$result = $this->registration_model->add_notify(); 
		$msg = $this->input->post('short_desc');    
		$summary = $this->input->post('message');
		$pic = 'http://physioplustech.com/uploads/app/'.$this->input->post('upload_img');
		$title=$this->input->post('title');  
	     
		 if($this->session->userdata('client_id') == '1091') {
			$res1 = "{\r\n  \"send_to_all\":1 ,\r\n  \"profile\": \"kindkinetics\",\r\n  \"notification\": {\r\n  \t\"android\":{\r\n  \t\"title\": \"$title\",\r\n     \"message\": \"$msg\",\r\n      \"data\": {\r\n        \"title\": \"$title\",\r\n        \"message\": \"$msg\",\r\n        \"style\": \"picture\",\r\n        \"picture\": \"$pic\",\r\n        \"summaryText\": \"$summary\"\r\n    }\r\n  \t}\r\n  \r\n  }\r\n}";
		 } elseif($this->session->userdata('client_id') == '1339') {
		  	$res1 = "{\r\n  \"send_to_all\":1 ,\r\n  \"profile\": \"yeswecare\",\r\n  \"notification\": {\r\n  \t\"android\":{\r\n  \t\"title\": \"$title\",\r\n     \"message\": \"$msg\",\r\n      \"data\": {\r\n        \"title\": \"$title\",\r\n        \"message\": \"$msg\",\r\n        \"style\": \"picture\",\r\n        \"picture\": \"$pic\",\r\n        \"summaryText\": \"$summary\"\r\n    }\r\n  \t}\r\n  \r\n  }\r\n}";
		 } elseif($this->session->userdata('client_id') == '1298') {
			$res1 = "{\r\n  \"send_to_all\":1 ,\r\n  \"profile\": \"choithani\",\r\n  \"notification\": {\r\n  \t\"android\":{\r\n  \t\"title\": \"$title\",\r\n     \"message\": \"$msg\",\r\n      \"data\": {\r\n        \"title\": \"$title\",\r\n        \"message\": \"$msg\",\r\n        \"style\": \"picture\",\r\n        \"picture\": \"$pic\",\r\n        \"summaryText\": \"$summary\"\r\n    }\r\n  \t}\r\n  \r\n  }\r\n}";
		 }elseif($this->session->userdata('client_id') == '1601') {
			$res1 = "{\r\n  \"send_to_all\":1 ,\r\n  \"profile\": \"aprc\",\r\n  \"notification\": {\r\n  \t\"android\":{\r\n  \t\"title\": \"$title\",\r\n     \"message\": \"$msg\",\r\n      \"data\": {\r\n        \"title\": \"$title\",\r\n        \"message\": \"$msg\",\r\n        \"style\": \"picture\",\r\n        \"picture\": \"$pic\",\r\n        \"summaryText\": \"$summary\"\r\n    }\r\n  \t}\r\n  \r\n  }\r\n}";
		 } else {
			$res1 = "{\r\n  \"send_to_all\":1 ,\r\n  \"profile\": \"Physioplus\",\r\n  \"notification\": {\r\n  \t\"android\":{\r\n  \t\"title\": \"$title\",\r\n     \"message\": \"$msg\",\r\n      \"data\": {\r\n        \"title\": \"$title\",\r\n        \"message\": \"$msg\",\r\n        \"style\": \"picture\",\r\n        \"picture\": \"$pic\",\r\n        \"summaryText\": \"$summary\"\r\n    }\r\n  \t}\r\n  \r\n  }\r\n}";
		 }
		
		$curl = curl_init();        
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.ionic.io/push/notifications",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,  
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  //CURLOPT_POSTFIELDS => "{\r\n  \"send_to_all\":1 ,\r\n  \"profile\": \"kindkinetics\",\r\n  \"notification\": {\r\n  \t\"android\":{\r\n  \t\"title\": \"Welcome to kindkinetics\",\r\n     \"message\": \"Book Your Appointment here\",\r\n      \"data\": {\r\n        \"title\": \"Welcome to kindkinetics\",\r\n        \"message\": \"Book Your Appointment here\",\r\n        \"style\": \"picture\",\r\n        \"picture\": \"http://36.media.tumblr.com/c066cc2238103856c9ac506faa6f3bc2/tumblr_nmstmqtuo81tssmyno1_1280.jpg\",\r\n        \"summaryText\": \"Book Your Appointment here\"\r\n    }\r\n  \t}\r\n  \r\n  }\r\n}",
			CURLOPT_POSTFIELDS => $res1,
		 CURLOPT_HTTPHEADER => array(
			"authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiI4MGVhODllNy1jYzMwLTQzZGQtYjQxZC1mNGIyODNhZDZhYTMifQ.qe_8Qyt5DhdWMuLj2rB-7izOst9xEvA_tOTATFp4uv4",
			"cache-control: no-cache",
			"content-type: application/json",
			"postman-token: 69ce88e2-0991-752f-2bb5-1677a920e0f4"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo $response;
		}  
	}
    public function edit_notify() {
		$data['page_name'] = 'dashboard';
		$data['result'] = $this->registration_model->edit_notify(); 
		$this->load->view('client/edit_notification',$data);
	 } 
   public function delete_notify() {
		$result = $this->registration_model->delete_notify($_POST['n_id']); 
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Notification  has been added successfully.';
		}else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Notification has not been added successfully.';
		} 
		echo json_encode($response);
	 }
	 public function test_protocols() {
		 $this->db->where('patient_id','21601');
		 $this->db->set('bill_status','0');  
		 $this->db->update('tbl_patient_treatment_techniques');
		 return true;
	 }  
	public function expensereport($date_filter)
	{
		$to = date('Y-m-d');
        $from = date('Y-m-d', strtotime("-330 days"));
		$where_condition = "(bill_date >= '".$from."' AND due_date <= '".$to."')";
		$this->db->distinct();
		$this->db->select('MONTHNAME(bill_date) as BILL_MONTH')->from('tbl_expanse');
		$this->db->where($where_condition);
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		$monthQuery = $query->result_array();
		$incomeData = array();
		// Print out rows
		$prefix = '';
		echo "[\n";
		foreach($monthQuery as $incomes) {
			$where_condition = "(bill_date >= '".$from."' AND due_date <= '".$to."')";
			$income_where = array('MONTHNAME(bill_date)' => $incomes['BILL_MONTH'], 'client_id' => $this->session->userdata('client_id'));
			$this->db->where($income_where);  
			$this->db->where($where_condition);
			$this->db->select('SUM(item_price) as paidamt')->from('tbl_expanse');
			$incomeQuery1 = $this->db->get();
			$incomeQuery2 = $incomeQuery1->row_array();
			echo $prefix . " {\n";
		    echo '  "month": "' . $incomes['BILL_MONTH'] . '",' . "\n";
		    echo '  "total": ' . $incomeQuery2['paidamt'] . ',' . "\n";
		    echo '  "color": "#007bff",' . "\n";
			echo " }";
		    $prefix = ",\n";
		}
		echo "\n]";
		
	}
     public function medidiagchart($date_filter)
	{
		$dateFilterArr = explode("and", $date_filter);
		$from = $dateFilterArr[0];
		$to = $dateFilterArr[1];
		$where_condition = "(pdl.date >= '".$from."' AND pdl.date <= '".$to."')";
		$this->db->distinct();
		$this->db->select('pdl.bio')->from('tbl_patient_medi_info pdl')->where('pdl.client_id', $this->session->userdata('client_id'));
        $this->db->where($where_condition);
		$query = $this->db->get();
		$provDiagQuery = $query->result_array();
		$provDiagData = array();
		// Print out rows
		$prefix = '';
		echo "[\n";
		foreach($provDiagQuery as $provDiagCounts) {
			//$where = array('prov_diagnosis' => $provDiagCounts['prov_diagnosis'],'client_id' => $this->session->userdata('client_id'));
			$this->db->select('count(patient_id) as patient_count')->from('tbl_patient_medi_info')->where('client_id', $this->session->userdata('client_id'))->like('bio',$provDiagCounts['bio']);
			$provDiagQuery1 = $this->db->get();
			$provDiagQuery2 = $provDiagQuery1->row_array();
			$searchArray = array("'", ",","?","+");
			$replaceArray = array("`", "&","","");
			$provDiagnosis1 = $provDiagCounts['bio'];
			$provDiagnosis = str_replace($searchArray,$replaceArray,$provDiagnosis1);
			echo $prefix . " {\n";
		    echo '  "provdiag": "' . $provDiagnosis . '",' . "\n";
		    echo '  "count1": ' . $provDiagQuery2['patient_count'] . ',' . "\n";
		    echo " }";
		    $prefix = ",\n";
		}
		echo "\n]";
		
	}

      public function test_client() {
		 $content = array(
			"en" => 'English Message'
			);
		
		$fields = array(
			'app_id' => "554d6574-9b96-4106-b3ad-4083c4f30a6e",
			'include_player_ids' => array("fw3_debSnfQ:APA91bESB1tOBdBjzndDhz5ruKzFY-vVQVsGejQsSufiyie9Ez7ucl3y4lvUkj1izP7MIQdoL5ZVRiVM67AepM9chOK4d7r1dqTENwMzj8f3x34QANd6NeClTinkZkFlzsRhQDTk1IYA","ffjHIhF2o8o:APA91bHyPHzwGbYkspUJEMZI2z3E7pnut-ChtTsKgxoTSFtvApyNm8ql7pdg1XbmL5VWmqLshAv8ElMi8iQH3RzbC0ri317xLk8dChyPWfMVDnh0hvPqtGEovBXzJGzWt-b8F_TF4kWT"),
			'data' => array("foo" => "bar"),
			'contents' => $content
		);
		
		$fields = json_encode($fields);
    	print("\nJSON sent:\n");
    	print($fields);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = curl_exec($ch);
		curl_close($ch);
		
		return $response;
	}
	
	
	public function test_notify(){
		$this->db->select('token')->from('tbl_client');
		$this->db->where('client_id','103');
		$rse = $this->db->get();
		$token = $rse->row()->token;
		echo $token;
		$title = 'Patient Registration';
			$name = 'Nandy';
			$mobile = "8605869850";
			define( 'API_ACCESS_KEY', 'AAAAHhxim7Y:APA91bGeFWJJ6ZHdYqoxNwl7e8C7A-AvjlaDCAg43hfEhNzPVqfn1tR-Bg8y6vB0SKDaqgqnx07JyLaZiigDcJ482Tkk_nPBEhsqkX88sYHTRYLZnunznnU-Mexyj7VnDbgOn_oAaXc7' );
			$msg = 'Patient Name :'.$name.'
			Mobile No : '.$mobile;
			//$token = "fNqoyf0akfg:APA91bGYLSoHkpAbGEWH2ZwTyPkRX_1Vc67UBVAp9Ws30ydjgpqdIlXSM5J-uy91s4PU-gmTWepPVKs0QbG5k6DVmfCCT004b_IhlIBpqfGDWsgtA_qHCyi7U0t1XIfnNxvzM3BgIih4";
			$data = array("to" => $token , "priority"=>"high",
						  "notification" => array( "title" => $title , "body" => $msg,"icon" => "icon.png","vibrate"   => 1,"sound" => "bingbong.aiff"));                                                                    
			$data_string = json_encode($data); 
            // echo "The Json Data : ".$data_string; 

			$headers = array
			(
				 'Authorization: key=' . API_ACCESS_KEY, 
				 'Content-Type: application/json'
			);                                                                                 
																																 
			$ch = curl_init();  

			curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );                                                                  
			curl_setopt( $ch,CURLOPT_POST, true );  
			curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
			curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $ch,CURLOPT_POSTFIELDS, $data_string);                                                                  
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);																													 
			$result = curl_exec($ch);
			 if ($result === FALSE) {
				die('Curl failed: ' . curl_error($ch));
			}
			curl_close ($ch); 
			echo $result;
	}
	public function test_mail() {  
		 $this->load->library('email');
		$this->email->initialize(array(
				 'protocol' => 'smtp',
		  'smtp_host' => 'smtp-relay.sendinblue.com',  
		  'smtp_user' => 'info@physioplustech.asia',
		  'smtp_pass' => 'ZYIU5EJ2rMC6d7XO',
		  'smtp_port' => 587,
		  'crlf' => "\r\n",
		  'newline' => "\r\n"
		  ));
         
		  $this->email->from('no-reply@physioplustech.com','Physio Plus Tech - Singapore');
		  
		$this->email->to('nandinipavithra2017@gmail.com');
		$this->email->subject('PPT Test mail');  
		$this->email->message('Hi');
		$this->email->send();
		echo $this->email->print_debugger();		
	}
	public function verify_clientmobile() {
		$code = $this->input->post('verify');
		$this->db->where('verify_code',$code);
		$this->db->select('*')->from('tbl_client');
		$result=$this->db->get();
		foreach($result->result_array() as $row){
		   if($row['account_type'] == 1 || $row['account_type'] == 2)
					{
						if($row['status'] == 1){
							if($row['parent_client_id'] == 0){
								$is_parent = true;
							}else{
								$is_parent = false;
							}
							$profileInfoSetting = $this->registration_model->editProfile($row['client_id']);
							$locationCount = $this->location_model->getLocationCount($row['client_id']);
							$parentClientId = $this->location_model->getParentClientId($row['client_id']);
							if($parentClientId == 0 && $locationCount != false){
								$sp_client_id = $row['client_id'];
							}else{
								$sp_client_id = $profileInfoSetting['parent_client_id'];
							}
							$settingsData = $this->settings_model->editSettings($sp_client_id);
							$clientIds = '';
							$all_locations = '';
							$clientIds1 = array();
							if($settingsData['all_locations_details'] == 1){
								$all_locations = true;
								$clientIds1 = $this->location_model->getLocationsIds($row['client_id']);
								$clientIds = implode(",",$clientIds1);
							}
							$this->db->select('*')->from('tbl_validity')->where('client_id = "'. $row['client_id'] .'"');
							$results=$this->db->get();
							if($results->num_rows()>0){
							$duration=$results->row()->duration;
							$users=$results->row()->num_users;
							
							}
							// set session
							$user_data=array(
								'client_login' => true,
								'user_login' => false,
								'last_login_date' => $row['last_login_date'],
								'last_login_ip' => $row['last_login_ip'],
								'username' => $row['username'],
								'clinic_name' =>$row['clinic_name'],
								'client_id' => $row['client_id'],
								'user_id' => 0,
								'plan' => $row['plan'],
								'newsletter' => $row['newsletter'],
								'duration'=>$duration,
								'plan_id' => $row['plan_id'],
								'is_parent' => $is_parent,
								'firstname' => $row['first_name'],
								'lastname' => $row['last_name'],
								'mobile' => $row['mobile'],
								'city' => $row['city'],
								'is_child' => false,
								'is_location' => $row['is_location'],
								'is_client' => true,
								'users' => $users,
								'all_locations' => $all_locations
							);
							$user_data['clientIds'] = $clientIds1;
							$this->session->set_userdata($user_data);
							// update new values
							$update=array('last_login_date' => date('Y-m-d H:i:s'), 'last_login_ip' => $_SERVER['REMOTE_ADDR']);
							$this->db->where('client_id',$row['client_id']);
							$this->db->update('tbl_client',$update);
							redirect(base_url()."client/dashboard/home");
						
						}
						else {
							if($row['status'] == 0)
							{
								$this->session->set_flashdata('client_login_error', '<div class="NewError1"><strong>Error!</strong> Your Email Not verified. Please check You email inbox or spam </div>');
								redirect(base_url()."client/dashboard/login", "refresh");
							} else {
								$user_data=array(
								'client_id' => $row['client_id'],
								'firstname' => $row['first_name'],
								'lastname' => $row['last_name'],
								'logo' => $row['logo']
								);
								$this->session->set_userdata($user_data);
								$this->session->set_flashdata('client_login_error', '<div class="NewError1"><strong>Error!</strong> Your account deactivated. Please contact the support team or go to contact us call to admin </div>');
								redirect(base_url()."client/dashboard/expire");
							}
						}
					}
		}
		$this->session->set_flashdata('client_login_error', '<div class="NewError1"><strong>Error!</strong> Verification code has been wrong!  </div>');
		redirect(base_url()."client/dashboard/login", "refresh");		
	}
	public function mac() {
	   $smsUrl = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=PHYSIO&sendMethod=simpleMsg&msgType=TEXT&mobile=8989898&duplicateCheck=true&format=json&msg=hello';
		$ch = curl_init();
			// set URL and other appropriate options
		curl_setopt($ch, CURLOPT_URL, "https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=PHYSIO&sendMethod=simpleMsg&msgType=TEXT&mobile=8989898&duplicateCheck=true&format=json&msg=hello");
		curl_setopt($ch, CURLOPT_HEADER, 0);

		// grab URL and pass it to the browser
		$result = curl_exec($ch);
       curl_close($ch);
	   print_r($result);
	}
	public function education() {
	   $this->db->where('client_id','2301');
	   $this->db->select('title,chart_id')->from('save_chart');
	   $res = $this->db->get();
	   foreach($res->result_array() as $row){
		   $chart =  $row['chart_id'];
		   $this->db->where('title',$row['title']);
		   $this->db->select('path')->from('private_hip');
		   $res1 = $this->db->get();
		   if($res1->result_array() != false){
		      $this->db->where('chart_id',$chart);
			  $this->db->set('img_path',$res1->row()->path);
			  $this->db->update('save_chart');
		   }
	   }
	}
	
	public function education1() {
	    $this->db->select('chart_id,title,img_description')->from('save_chart');
		$res = $this->db->get();
		foreach($res->result_array() as $row) {
			$title = $row['title'];
			$this->db->where('title',$row['title']);
			$this->db->select('path')->from('physio_special');
			$res1 = $this->db->get();
			if($res1->result_array() != false){
				echo $res1->row()->path;
				$this->db->where('title',$title);
				$this->db->set('img_path',$res1->row()->path);
				$this->db->update('save_chart');
			} else{
				 
			}
			
		}
	}
	
	public function notify1() {
		define( 'API_ACCESS_KEY', 'AAAAHhxim7Y:APA91bGeFWJJ6ZHdYqoxNwl7e8C7A-AvjlaDCAg43hfEhNzPVqfn1tR-Bg8y6vB0SKDaqgqnx07JyLaZiigDcJ482Tkk_nPBEhsqkX88sYHTRYLZnunznnU-Mexyj7VnDbgOn_oAaXc7' );
	    $fcmUrl ='https://fcm.googleapis.com/fcm/send';
		$token = 'cPqk_6-C1Ho:APA91bFuVOA_TFEGh_nGErl0kU-ivWI3DuGxy_o5Sjwd23pJN3Uwif7hxyJH3j-KCYm-3AE-lNzcd_qZgr-nDS2G97rWZ4KCeqRgIiSbkVAze7zkCVISynPvfrc19v0_Vu1ovzoth_wJ';
		$extraNotificationData1 = array(
				"icon" => "default",
                "title" => "do something!",
                "callback" => "firstAction",
                "foreground" => true
		);
		$notification = array('title' =>'Physiotherapy Needs',
            'body' => 'Physiotherapy is the use of touch and equipment to help people overcome movement problems.',
            'icon' =>'myIcon', 
            'sound' => 'mySound',
			'image' => 'https://physioplustech.in/uploads/app/download.jpg',
			'actions' => $extraNotificationData1
		);
		$extraNotificationData = array(
				"message" => $notification,
				"moredata" =>'dd',
				"picture" =>'http://www.physioevents.com/uploads/1511157756.png'
		);
		
		$fcmNotification = array(
			'to'        => $token, //single token
            'notification' => $notification,
            'actions' => $extraNotificationData1
		);
		 
		$headers = array(
			'Authorization: key=' . API_ACCESS_KEY,
			'Content-Type: application/json'
		);
		 
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);
		echo $result; 
	}
	public function fb() {
		$data['page_name'] = 'dashboard';
		$id = $this->uri->segment(4);
		$data['id'] = $this->uri->segment(4); 
		$data['result'] = $this->registration_model->edit_notification1($id);
		$this->load->view('client/fbshare.php',$data);
	}
	public function test_bill() { 
		
		$this->db->where('pt.treatment_date >','2019-03-31');
		$this->db->where('pt.treatment_date <','2019-04-03');
		$this->db->select('pt.client_id,pt.bill_id,pt.treatments,pt.treatment_date')->from('tbl_patient_treatment_techniques pt');
		$this->db->join('tbl_invoice_detail it','pt.bill_id = it.bill_id');
		$res = $this->db->get();
		if($res->result_array() != false){
			foreach($res->result_array() as $row)
		    {
				$this->db->where('bill_id',$row['bill_id']);
				$this->db->where('item_id',$row['treatments']);
				$this->db->set('treatment_date',$row['treatment_date']);
				$this->db->update('tbl_invoice_detail'); 
			}
		}
	}
	public function refdiagchart($date_filter)
	{
		$dateFilterArr = explode("and", $date_filter);
		$from = $dateFilterArr[0];
		$to = $dateFilterArr[1];
		$where_condition = "(pdl.appoint_date >= '".$from."' AND pdl.appoint_date <= '".$to."')";
		$this->db->distinct();
		$this->db->select('pdl.patient_id,pdl.referal_id,it.referal_type_id')->from('tbl_patient_info pdl')->where('pdl.client_id', $this->session->userdata('client_id'));
        $this->db->join('tbl_referal it','it.referal_id=pdl.referal_id');
		$this->db->where('pdl.referal_id !=','');
        $this->db->where($where_condition);
		$query = $this->db->get();
		$provDiagQuery = $query->result_array();
		$provDiagData = array();
		$prefix = '';
		echo "[\n";
		$th = 0;
		$th1 = 0;
		$th2 = 0;
		$th3 = 0;
		$th4 = 0;
		$th5 = 0;
		
			foreach($provDiagQuery as $provDiagCounts) {
				  if($provDiagCounts['referal_type_id'] == '1'){
					   $th += 1;
				  } else if($provDiagCounts['referal_type_id'] == '2') {
					   $th1 += 1;
				  } else if($provDiagCounts['referal_type_id'] == '3') {
					   $th2 += 1;
				  } else if($provDiagCounts['referal_type_id'] == '4') {
					   $th3 += 1;
				  } else if($provDiagCounts['referal_type_id'] == '5') {
					   $th4 += 1;
				  } else {
					   $th5 += 1;
				  }
			}
			
			echo $prefix . " {\n";
		    echo '  "Referal": "Website",' . "\n";
		    echo '  "count": ' . $th1 .',' .  "\n";
		    echo " },";
			echo $prefix . " {\n";
		    echo '  "Referal": "Doctor",' . "\n";
		    echo '  "count": ' . $th . ',' . "\n";
		    echo " },";
			echo $prefix . " {\n";
		    echo '  "Referal": "Advertisement",' . "\n";
		    echo '  "count": ' . $th2 . ',' . "\n";
		    echo " },";
			echo $prefix . " {\n";
		    echo '  "Referal": "Others",' . "\n";
		    echo '  "count": ' . $th3 .',' .  "\n";
		    echo " },";
		    echo $prefix . " {\n";
		    echo '  "Referal": "Patient",' . "\n";
		    echo '  "count": ' . $th4 . ',' . "\n";
		    echo " },";
			echo $prefix . " {\n";
		    echo '  "Referal": "Insurance",' . "\n";
		    echo '  "count": ' . $th5 .',' . "\n";
		    echo " }";
		    $prefix = ",\n";
			echo "\n]";
		
	}
	public function aptdiagchart($date_filter)
	{
		$dateFilterArr = explode("and", $date_filter);
		$from = $dateFilterArr[0];
		$to = $dateFilterArr[1];
		$where_condition = "(pdl.appointment_from >= '".$from."' AND pdl.appointment_from <= '".$to."')";
		$this->db->distinct();
		$this->db->select('pdl.start,pdl.end,pdl.appointment_from')->from('tbl_appointments pdl')->where('pdl.client_id', $this->session->userdata('client_id'));
        $this->db->where($where_condition);
		$query = $this->db->get();
		$provDiagQuery = $query->result_array();
		$provDiagData = array();
		// Print out rows
		$prefix = '';
		echo "[\n";
		$th = 0;
		$th1 = 0;
		$th2 = 0;
		$th3 = 0;
		$th5 = 0;
		$th10 = 0;
		
			foreach($provDiagQuery as $provDiagCounts) {
				  $datetime1 = strtotime($provDiagCounts['start']);
				  $datetime2 = strtotime($provDiagCounts['end']);
				  $interval  = abs($datetime2 - $datetime1);
				  $minutes   = round($interval / 60);
				  if($minutes == '30'){
					  $th += 1;
				  } else if($minutes == '15') {
					   $th1 += 1;
				  } else if($minutes == '5') {
					   $th5 += 1;
				  } else if($minutes == '10') {
					   $th10 += 1;
				  } else if($minutes == '45') {
					   $th2 += 1;
				  } else {
					   $th3 += 1;
				  }
			}
		   
			echo $prefix . " {\n";
		    echo '  "Time": "10 minutes",' . "\n";
		    echo '  "count": ' . $th10 . ',' . "\n";
		    echo " },";
			echo $prefix . " {\n";
		    echo '  "Time": "15 minutes",' . "\n";
		    echo '  "count": ' . $th1 .',' .  "\n";
		    echo " },";
			echo $prefix . " {\n";
		    echo '  "Time": "30 minutes",' . "\n";
		    echo '  "count": ' . $th . ',' . "\n";
		    echo " },";
			echo $prefix . " {\n";
		    echo '  "Time": "45 minutes",' . "\n";
		    echo '  "count": ' . $th2 .',' .  "\n";
		    echo " },";
		    echo $prefix . " {\n";
		    echo '  "Time": "5 minutes",' . "\n";
		    echo '  "count": ' . $th5 . ',' . "\n";
		    echo " },";
			echo $prefix . " {\n";
		    echo '  "Time": "60 minutes",' . "\n";
		    echo '  "count": ' . $th3 .',' . "\n";
		    echo " }";
		    $prefix = ",\n";
		echo "\n]";
	}
	public function help(){
		$data['page_name'] = 'dashboard';
		$this->load->view('client/help',$data);  
	}
	public function get_help() 
	{
		$concessionData = $this->common_model->get_help();
		echo json_encode($concessionData); 
	}
	public function make_bill() {  
		 $result = $this->appoinment_model->make_bill($_POST['p_id']);   
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Notification  has been added successfully.';
		}else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Notification has not been added successfully.';
		} 
		echo json_encode($response);
	}
	public function add_balance() {
		$data['page_name'] = 'dashboard';
		$this->load->view('client/add_balance',$data); 
	}		
    public function invite_friends() {
		$result = $this->registration_model->invite_friends(); 
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Notification  has been added successfully.';
		}else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Notification has not been added successfully.';
		} 
		echo json_encode($response);
	 } 	
	public function test_si(){
		$date = date('Y-m-d');
		echo date('Y-m-d', strtotime($date. ' + 90 day'));
		/* $this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('patient_id','39360');
		$this->db->where('treatment_date','2020-08-27');
		$this->db->select('treatments')->from('tbl_patient_treatment_techniques');
		$res = $this->db->get();
		echo $res->num_rows();
		if($res->result_array() != false){
			$val = $res->row()->treatments;
			echo $val;
		} */
	}
	public function staff_nps()
	{
		
		$nps_scoreQ = $this->db->select("P.*,S.first_name")->from("tbl_nps_score AS P")
		->join("tbl_staff_info S","P.staff_id=S.staff_id","join")
		->join("tbl_client AS C","C.client_id=S.client_id","join")->WHERE(array("C.client_id"=>$this->session->userdata('client_id')))->group_by('S.staff_id')->get();
		$data['staff_details'] = ($nps_scoreQ->num_rows()>0) ? $nps_scoreQ->result_array() : array();
		$data['page_name'] = 'dashboard';
		$this->load->view('client/staff_nps_view',$data);
	}
	public function staff_npsdata()
	{
		$staff_id = $this->input->get('staff_id');
		$pramotor_score = 0;
		$passives_score = 0;
		$detractors_score = 0;
		$nps_scoreQ = $this->db->select("P.*,S.first_name")->from("tbl_nps_score AS P")
		->join("tbl_staff_info S","P.staff_id=S.staff_id","join")
		->join("tbl_client AS C","C.client_id=S.client_id","join")->WHERE(array("C.client_id"=>$this->session->userdata('client_id'),"S.staff_id"=>$staff_id))->get();
		$totalscore = $nps_scoreQ->num_rows();
		
		if($totalscore >0)
		{
			$nps_pramotor = $this->db->select("P.*,S.first_name")->from("tbl_nps_score AS P")
			->join("tbl_staff_info S","P.staff_id=S.staff_id","join")
			->join("tbl_client AS C","C.client_id=S.client_id","join")->WHERE(array("C.client_id"=>$this->session->userdata('client_id'),"S.staff_id"=>$staff_id))->where("P.nps_score between 9 and 10")->get();	
			$pramotor_score = $nps_pramotor->num_rows(); 
			
			$nps_passives  = $this->db->select("P.*,S.first_name")->from("tbl_nps_score AS P")
			->join("tbl_staff_info S","P.staff_id=S.staff_id","join")
			->join("tbl_client AS C","C.client_id=S.client_id","join")->WHERE(array("C.client_id"=>$this->session->userdata('client_id'),"S.staff_id"=>$staff_id))->where("P.nps_score between 7 and 8")->get();	
			$passives_score = $nps_passives->num_rows();
			
			$nps_detractors   = $this->db->select("P.*,S.first_name")->from("tbl_nps_score AS P")
			->join("tbl_staff_info S","P.staff_id=S.staff_id","join")
			->join("tbl_client AS C","C.client_id=S.client_id","join")->WHERE(array("C.client_id"=>$this->session->userdata('client_id'),"S.staff_id"=>$staff_id))->where("P.nps_score between 0 and 6")->get();	
			$detractors_score = $nps_detractors->num_rows();	
			
			/*promotor percent calculation*/
			$prmotor_percent = (($totalscore-($detractors_score+$passives_score))/$totalscore)*100;
			
			$detractors_percent = (($totalscore-($pramotor_score+$passives_score))/$totalscore)*100;
			
			$passives_percent = (($totalscore-($pramotor_score+$detractors_score))/$totalscore)*100;
			//$scorearray = array();
			/* $scorearray['type'] =  'pie';
			$scorearray['name'] = 'NPS';
			$scorearray['innerSize']= '50%';
        */
			/* $scorearray['datass'] = array(array(
										'name'=>'detractors',
										"Y"=>round($detractors_percent),
										'color' => '#b90f17'		
									 ),array(
										'name'=>'passives',
										"Y"=>round($passives_percent),
										"color" => '#f0f714'		
									 )
									 ,array(
										'name'=>'Promoters',
										"Y"=>round($prmotor_percent),
										"color" => '#4ff35e'		
									 )
									 
									 );	 */
		}
		 /* echo "<pre>";
		print_r($scorearray);	
		echo "</pre>"; */ 
		$detractors['name'] = 'Detractors';
		$detractors['y'] = round($detractors_percent);
		$detractors['color'] = '#b90f17';
		
		$passives['name'] = 'Passives';
		$passives['y'] = round($passives_percent);
		$passives['color'] = '#f0f714';
		
		$promoters['name'] = 'Promoters';
		$promoters['y'] = round($prmotor_percent);
		$promoters['color'] = '#4ff35e';
		
		$serial = array();
		
		array_push($serial,$detractors);
		array_push($serial,$passives);
		array_push($serial,$promoters);
			
		//echo preg_replace('/"([a-zA-Z_]+[a-zA-Z0-9_]*)":/','$1:',json_encode(array($scorearray)));
		echo json_encode(array('data'=>$serial));
	}
















	
	
}

