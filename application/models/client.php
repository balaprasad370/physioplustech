<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once ($_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php');
class Client extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		//$this->load->model(array('mail_model','settings_model','registration_model','location_model'));
	}
	
	public function check_login() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->db->select('*')->from('tbl_client')->where(array('username'=>trim($username),'password'=>$password));
		$result=$this->db->get();
		$count = $result->num_rows();
		$c = 0;
		if($count>0){
		foreach($result->result_array() as $row){
			$var = strcasecmp($row['username'],$username);
			if($var == 0 && $row['password'] == $password){
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
							if($row['parent_client_id'] == 0){
								$this->db->select('*')->from('tbl_validity')->where('client_id = "'. $row['client_id'] .'"');
								$results=$this->db->get();
								if($results->num_rows()>0){
									$duration=$results->row()->duration;
									$users=$results->row()->num_users;
								}
								$this->db->select('plan')->from('tbl_client')->where('client_id = "'. $row['client_id'] .'"');
								$results=$this->db->get();
								if($results->num_rows()>0){
									$plan=$results->row()->plan;
								}
							}else{
								$this->db->select('*')->from('tbl_validity')->where('client_id = "'. $row['parent_client_id'] .'"');
								$results=$this->db->get();
								if($results->num_rows()>0){
									$duration=$results->row()->duration;
									$users=$results->row()->num_users;
								}
								$this->db->select('plan')->from('tbl_client')->where('client_id = "'. $row['parent_client_id'] .'"');
								$results=$this->db->get();
                                                            
								if($results->num_rows()>0){
									$plan=$results->row()->plan;
								}
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
								'plan' => $plan,
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
								'all_locations' => $all_locations,
								'map' => $row['map'],
                                                                'googleCalendar'=> $row['googleCalendar'],
                                                                'token'=>'',
								'review'=>$row['googleRevew_link']
							);
							$user_data['clientIds'] = $clientIds1;
							$this->session->set_userdata($user_data);
							// update new values
							$update=array('last_login_date' => date('Y-m-d H:i:s'), 'last_login_ip' => $_SERVER['REMOTE_ADDR']);
							$this->db->where('client_id',$row['client_id']);
							$this->db->update('tbl_client',$update);
							if($this->session->userdata('client_id') == '2' ) {
							redirect(base_url()."client/schedule/appointment");
							}
							else{
                                                                //$this->calendarClientAccess();
                                                               $this->db->select('googleCalendar')->from('tbl_client')->where('client_id = "'. $this->session->userdata('client_id').'"');
								                                          $results=$this->db->get();
                                                                                                          $cal = $results->row()->googleCalendar;
                                                               if($cal==1){

                                                               //if($this->session->userdata('googleCalendar')==1)
                                                                //{
                                                                 //echo "<script>alert('$cal')</script>";
                                                                $this->checkAccessToken();
                                                                 redirect(base_url()."client/dashboard/home");

                                                                }
                                                                else
                                                                {  
                                                                 echo "<script>alert('$cal')</script>";
								redirect(base_url()."client/dashboard/home");
                                                                }
							}
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
					} else {
						$this->session->set_flashdata('client_login_error', '<div class="NewError1"><strong>Error!</strong> Access denied! Unauthorized User.  </div>');
						redirect(base_url()."client/dashboard/login", "refresh");
					}
			
			}
			else {
				$c = $c+1;
				if($c == $count) {
					$this->session->set_flashdata('client_login_error', '<div class="NewError1"><strong>Error!</strong> Invalid Username (or) Password  </div>');
					redirect(base_url()."client/dashboard/login", "refresh");
					break;
				}
		    }
	}}else{
			$this->session->set_flashdata('client_login_error', '<div class="NewError1"><strong>Error!</strong> Invalid Username (or) Password  </div>');
			redirect(base_url()."client/dashboard/login", "refresh");
		}
	}

/*
        public function calendarClientAccess()
	{
           session_start();

           $client = new Google_Client();
          // $client->setApplicationName('Google Calendar API PHP Quickstart');
         //$client->setScopes(Google_Service_Calendar::CALENDAR_READONLY);
	 //  $client->setScopes(Google_Service_Calendar::CALENDAR);

           $client->setAuthConfig($_SERVER['DOCUMENT_ROOT'].'/vendor/credentials.json');

         //  $client->setAccessType('offline');
         //  $client->setPrompt('select_account consent');
	  // $client->setApprovalPrompt('force');

          $client->setRedirectUri('https://physioplustech.in/client/dashboard/home');

           //  $client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php');
              $client->addScope(Google_Service_Calendar::CALENDAR);

              if (! isset($_GET['code'])) {
                  $auth_url = $client->createAuthUrl();
                   header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
               }
              else
              {
                $client->authenticate($_GET['code']);
                $_SESSION['access_token'] = $client->getAccessToken();
              }

        }  
        
*/


        public function calendarClientAccess()
	{

            $clientId=$this->session->userdata('client_id');
              $tokenPath= $_SERVER['DOCUMENT_ROOT'].'/tokens/'.$clientId.'_token.json';
              //echo "<script>alert('$tokenPath')</script>";

              session_start();

           $client = new Google_Client();
            $client->setAuthConfig($_SERVER['DOCUMENT_ROOT'].'/vendor/OAuth_Credentials.json');
            $client->setAccessType('offline');
            $client->setPrompt('select_account consent');
	    $client->setApprovalPrompt('force');

             $client->setScopes(Google_Service_Calendar::CALENDAR);
             $client->setRedirectUri('https://physioplustech.in/client/dashboard/home');
             //$client->setRedirectUri('https://physioplustech.in/client/settings');


              if (file_exists($tokenPath)) 
              {
                    $accessToken = json_decode(file_get_contents($tokenPath), true);
                    $_SESSION['access_token'] =$accessToken;
                    $client->setAccessToken($accessToken);
  /*
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
       echo "<script>alert('$start')</script>";


    }
}      */

                redirect(base_url()."client/dashboard/home");

               }//if token file available

           


            if ($client->isAccessTokenExpired()) {

             if ($client->getRefreshToken()) {
                   $_SESSION['access_token'] =$client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
               
             if (!file_exists(dirname($tokenPath))) {
                    mkdir(dirname($tokenPath), 0700, true);
             }

             file_put_contents($tokenPath, json_encode($client->getAccessToken()));



             } 

            
         else{
            if (! isset($_GET['code'])) {
                  $hi='hi';
                  echo "<script>alert('$hi')</script>";
                  $_SESSION['access_token'] ='';
                  $auth_url = $client->createAuthUrl();
                   header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
       
               }
             /*
              else
              {
                $client->authenticate($_GET['code']);
                $_SESSION['access_token'] = $client->getAccessToken();
              }*/
           }//if refreh token not available

          }//if token expired

        }


	public function checkAccessToken()
	{

            $clientId=$this->session->userdata('client_id');
              $tokenPath= $_SERVER['DOCUMENT_ROOT'].'/tokens/'.$clientId.'_token.json';
             // echo "<script>alert('$tokenPath')</script>";

              session_start();

           $client = new Google_Client();
            $client->setAuthConfig($_SERVER['DOCUMENT_ROOT'].'/vendor/OAuth_Credentials.json');
            $client->setAccessType('offline');
            $client->setPrompt('select_account consent');
	    $client->setApprovalPrompt('force');

             $client->setScopes(Google_Service_Calendar::CALENDAR);
           $client->setRedirectUri('https://physioplustech.in/client/dashboard/home');


              if (file_exists($tokenPath)) 
              {
                    $accessToken = json_decode(file_get_contents($tokenPath), true);
                    $_SESSION['access_token'] =$accessToken;
                    $client->setAccessToken($accessToken);
  /*
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
    //echo "<script>alert('$calendarId')</script>";

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
*/
               

           


            if ($client->isAccessTokenExpired()) {

             if ($client->getRefreshToken()) {
                   $_SESSION['access_token'] =$client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
               
             if (!file_exists(dirname($tokenPath))) {
                    mkdir(dirname($tokenPath), 0700, true);
             }

             file_put_contents($tokenPath, json_encode($client->getAccessToken()));

               //redirect(base_url()."client/dashboard/home");

             } 

            
         else{
            if (! isset($_GET['code'])) {
                  //$hi='hi';
                 // echo "<script>alert('$hi')</script>";
                  $_SESSION['access_token'] ='';
                  $auth_url = $client->createAuthUrl();
                   header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
       
               }
             /*
              else
              {
                $client->authenticate($_GET['code']);
                $_SESSION['access_token'] = $client->getAccessToken();
              }*/
           }//if refreh token not available

          }//if token expired'


             //redirect(base_url()."client/dashboard/home");


               }//if token file available
           // redirect(base_url()."client/dashboard/home");


        }


	//change password
	public function change_password($old_password,$new_password)
	{
		$where = array('password' => $old_password, 'client_id' => $this->session->userdata('client_id'));
		$this->db->where($where);
		$this->db->update('tbl_client', array('password' => $new_password));
	}
	
	//forget_password
	public function recover_password()
	{
		$this->db->select('*')->from('tbl_client')->where('username = "'. $this->input->post('username') .'" ');
		$result=$this->db->get();
		if($result->num_rows()>0 && $result->row()->status == 1)
		{
			// patient details for mail template
			$login_url = base_url().'client/dashboard/login';
			$client = array(
				'ClientName' => ucfirst($result->row()->first_name),
				'Password' => $result->row()->password,
				'LoginUrl' => $login_url
			);
			// create email template
			$clientMessage = $this->mail_model->forgetPasswordTemplate($client);
			// mail config
			$clientMailConfig = array('to' => $result->row()->email, 'subject' => 'Congratulations! Password Recovery Successful', 'message' => $clientMessage);
			// send mail
			$this->mail_model->sendEmail_pwd($clientMailConfig);
		}else if($result->num_rows()>0 && $result->row()->status == 0) {
			$this->session->set_flashdata('password_recover_failure', '<div class="NewError1"><strong>Error!</strong> Access denied! Unauthorized User.  </div>');
			redirect(base_url()."client/dashboard/forget_password", "refresh");
		} else {
			// set flashdata for error msg
			$this->session->set_flashdata('password_recover_failure', '<div class="NewError1"><strong>Error!</strong> Email address does not exists.  </div>');
			redirect(base_url()."client/dashboard/forget_password", "refresh");
		}
	}
	
} 