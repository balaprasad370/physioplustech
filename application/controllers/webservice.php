<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Webservice extends CI_Controller
{
	public function __construct() { 
		parent::__construct();
		$this->load->library(array('upload', 'image_transform'));
		$this->load->model(array('service_model','mail_model','clinicapp_model'));
		parent::__construct();  
        $this->output->set_header('Access-Control-Allow-Origin: Access-Control-Allow-Origin : *');
   }
    public function hospital_details(){
	    $client_id = $this->uri->segment(3);
		$result = $this->service_model->getLocations($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
		 
   }
   public function client_details(){
	    $client_id = $this->uri->segment(3);
		$result = $this->service_model->client_details($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result; 
   }
   /*setting functions*/
   public function setting_brand()
   {
	   $client_id = $_GET["branch"];
		$result = $this->service_model->brand_view($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function update_branding()
   {
	    $client_id = $_GET["branch"];
		//print_r($_POST);exit;
		$result = $this->service_model->update_branding($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'Data updated';
			$response['message'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function setting_googleAcc()
   {
	   $client_id = $_GET["branch"];
		$result = $this->service_model->setting_google_view($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function setting_googleAccupdate()
   {
	   $client_id = $_GET["branch"];
		$result = $this->service_model->setting_google_update($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function setting_invoice()
   {
	   $client_id = $_GET["branch"];
	   $result = $this->service_model->setting_invoice_view($client_id);
	    $response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function general_setting()
   {
	   $client_id = $_GET["branch"];
	   $result = $this->service_model->setting_general_view($client_id);
	    $response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function general_setting_save()
   {
	   $client_id = $_GET["branch"];
	   $result = $this->service_model->general_setting_save($client_id);
	    $response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function setting_invoice_save()
   {
	   $client_id = $_GET["branch"];
	   $result = $this->service_model->setting_invoice_save($client_id);
	    $response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   
   /*setting function end*/
    public function patient_register() {
	   $this->load->helper('string');
	   $rand = random_string('numeric',6);	
	   $this->db->where('mobile_no',$_POST["mobile"]);
	   $this->db->where('client_id',$_POST["branch"]);
	   $this->db->select('patient_id')->from('tbl_patient_info')->where('client_id',$_POST["branch"]);
	   $query = $this->db->get();
		   if($query->result_array() != false){
						$patient_id = $query->row()->patient_id;
						$status = '0';
		   } else {
			  $patient_info=array(
		        'client_id' => $_POST["branch"],
				'first_name' => $_POST["name"],
				'appoint_date' => date('Y-m-d'),
				'gender' => $_POST["gender"],
				'mobile_no' => $_POST["mobile"],
				'email' => $_POST["email"],
				'home_visit' => $_POST["patient_type"],
				'verify_code' => $rand,
				'status' => 'Inactive',
				'app_approve' => '1',
				'register_by' => 'app',
				'referrer_id' => $_POST["referrer"],
				'patient_code' => $this->generate_code()
			);
			$this->db->insert('tbl_patient_info', $patient_info);
			$patient_id = $this->db->insert_id();
			$mobile = $_POST["mobile"];
			$email = $_POST["email"];
			$branch = $_POST["branch"];
			$name = $_POST["name"];
			$p_type = $_POST["patient_type"];
			if($p_type == '2'){
				$type = 'Clinic Visit';
			} else {
				$type = 'Home Visit';  
			}
			$this->mail_model->pat_register($name,$mobile,$email,$branch,$type);
			$client_id = $_POST["branch"];
			$title = 'Patient Registration';
			$name = $_POST["name"];
			$mobile = $_POST["mobile"];
			/* $client_id = $_GET["branch"];
			$this->db->where('client_id',$client_id);
			$this->db->select('token')->from('tbl_client');
			$query = $this->db->get();
			$token = $query->row()->token;  
			
			$title = 'Patient Registration';
			$name = $_GET["name"];
			$mobile = $_GET["mobile"];
			define( 'API_ACCESS_KEY', 'AAAAHhxim7Y:APA91bGeFWJJ6ZHdYqoxNwl7e8C7A-AvjlaDCAg43hfEhNzPVqfn1tR-Bg8y6vB0SKDaqgqnx07JyLaZiigDcJ482Tkk_nPBEhsqkX88sYHTRYLZnunznnU-Mexyj7VnDbgOn_oAaXc7' );
			$msg = 'Patient Name :'.$name.'
Mobile No : '.$mobile;
			//$to = "cBNA0ppuMGI:APA91bEX4--kgrkVw2tY-cLdL97j0g5gGoQiQOBSP2Qd0V9a4ZpwWDsRQxQ3V6YJj-lZAk_rdHAESGYR9431e8lmleCg2Js_YVO7AZ7iJoqPxtYPkZLG7QcYaqi7MyVr-kyosp7w1gzG";
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
			curl_close ($ch); */ 
			
			$result = $this->service_model->add_regnotification($client_id,$title,$name,$mobile); 
			$this->service_model->verify_code($name,$mobile,$rand,$branch);
			$status = '1';
		}
		$response = array();
		if($status != 1){
			$response['status'] = 'Failure';
			$response['message'] = 'Patient already Exist.';
			$response['data'] = $patient_id;
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Patient has been Registered successfully';
			$response['data'] = $patient_id;
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: POST,POST');
		echo $json_result;
   }
   public function profile_update() {
	    $base = file_get_contents("php://input");
		$this->db->where('patient_id',$_POST['patient_id']);
		$this->db->select('mobile_no')->from('tbl_patient_info');
		$res = $this->db->get();
		$mobile = $res->row()->mobile_no;
		if($mobile == $_POST['mobile']){
			$status = 'Active';
		}
		else {
			  $status = 'Inactive';
			  $this->load->helper('string');
			  $rand = random_string('numeric',6);	
			  $mobile = $_POST["mobile"];
			  $email = $_POST["email"];
			  $branch = $_POST["branch"];
			  $name = $_POST["name"];
			  $this->db->where('patient_id',$_POST['patient_id']);
			  $this->db->set('verify_code',$rand);
			  $this->db->set('status',$status);
			  $this->db->update('tbl_patient_info');
			  $result = $this->service_model->verify_code($name,$mobile,$rand,$branch);
		  }
			if ($base != '') {
			$dat=explode(',',$base);
			$dat_name=explode('/',$dat[0]);
			$dat_name1=explode(';',$dat_name[1]); 
			$data = str_replace($dat[0], '', $base);
			$data = str_replace(' ', '+', $data);
			$data = base64_decode($data);
			chdir('uploads/patient/');
			$file = date("YmdHis") . ".". $dat_name1[0];
			if(file_put_contents($file, $data))
			if ( ! preg_match("/^[a-z0-9:_\/-]+$/i", $file))
			{
				$this->db->where('client_id',$_POST["branch"]);
			    $this->db->where('patient_id',$_POST["patient_id"]);
				$this->db->set('photo',$file);
			    $this->db->update('tbl_patient_info');
			
			} else {
				$this->db->where('client_id',$_POST["branch"]);
			    $this->db->where('patient_id',$_POST["patient_id"]);
				$this->db->set('photo',$file);
			    $this->db->update('tbl_patient_info');
			}				
			else $value = '';
		  } 
	  
		    $patient_info=array(
		  	    'first_name' => $_POST["name"],
				'appoint_date' => date('Y-m-d'),
				'gender' => $_POST["gender"],  
				'mobile_no' => $_POST["mobile"],
				'email' => $_POST["email"],
				'home_visit' => $_POST["patient_type"],
				'referrer_id' => $_POST["referrer"],
				'status' => $status,
				'register_by' => 'app',
				'occupation' => $_POST["occupation"],
				'food_habits' => $_POST["food_habits"],
				'marital_status' => urldecode($_POST["marital_status"]),
				'height' => $_POST["height"],
				'weight' => $_POST["weight"],
				'bmi' => $_POST["bmi"],
				'aadhar_id' => $_POST["aadhar_id"],
				'address_line1' => $_POST["address_line"],
				'address_line2' => $_POST["location"],
				'city' => $_POST["city"],
				'pincode' => $_POST["pincode"],
				'phone_no' => $_POST["phone"],
				'contact_person_name' => $_POST["contact_name"],
				'contact_person_mobile' => $_POST["contact_mobile"]
				
			);    
			$this->db->where('client_id',$_POST["branch"]);
			$this->db->where('patient_id',$_POST["patient_id"]);
			$this->db->update('tbl_patient_info', $patient_info);
			
			$patient_id = $_POST["patient_id"];
			$response = array();
		    if($patient_id != ''){  
			$response['status'] = 'success';
	     	$response['message'] = 'Patient has been Updated successfully.';
			 } else {
				$response['status'] = 'Failure';
				$response['message'] = 'Patient has not been Updated.';
			}
			$json_result = json_encode($response);
			header('Content-type: application/json');
			header('Access-Control-Allow-Origin: *');
			header('Access-Control-Allow-Methods: GET,POST');
			echo $json_result; 
	}
   public function slot_time(){
	    $client_id = $_POST['branch'];
	    $result = $this->service_model->sch_slot($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['data'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   
   public function appointment_details(){
	    $client_id = $_POST["mainbranch"];
		$email = $_POST["email"];
	   	$result = $this->service_model->appointment_details($client_id,$email);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['data'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function s_time() {
	   $client_id = $this->uri->segment(3);
	   $branch = $this->uri->segment(3);
	   $date = date('d-m-Y',strtotime($this->uri->segment(4)));
	   $this->db->select('sch_slot,sch_time')->from('tbl_settings')->where('client_id',$client_id);
	   $query = $this->db->get();
	  
	   if($query->result_array() != false) {
	   $slot = $query->row()->sch_slot;
	   $sch_time = $query->row()->sch_time;
	   $this->db->select('client_id,monday_fn_from,monday_an_to,tuesday_fn_from,tuesday_an_to,wednesday_fn_from,wednesday_an_to,thursday_fn_from,thursday_an_to,friday_fn_from,friday_an_to,saturday_fn_from,saturday_an_to,sunday_fn_from,sunday_an_to')->from('tbl_schedule_settings')->where('client_id',$client_id);
	   $query = $this->db->get();
	   if($query->result_array() != false) {
	   $day =  date('D', strtotime($date));
	   if($day == 'Mon'){
		      $time = $query->row()->monday_fn_from;
	          $time1 = $query->row()->monday_an_to;
		} elseif($day == 'Tue'){
	          $time = $query->row()->tuesday_fn_from;
		      $time1 = $query->row()->tuesday_an_to;
		} elseif($day == 'Wed'){  
		    $time = $query->row()->wednesday_fn_from;
		    $time1 = $query->row()->wednesday_an_to;
		} elseif($day == 'Thu'){
		   $time = $query->row()->thursday_fn_from;
		   $time1 = $query->row()->thursday_an_to;
		} elseif($day == 'Fri'){
			$time = $query->row()->friday_fn_from;
		    $time1 = $query->row()->friday_an_to;
		} elseif($day == 'Sat'){
			$time = $query->row()->saturday_fn_from;
		    $time1 = $query->row()->saturday_an_to;
		} elseif($day == 'Sun'){
		    $time = $query->row()->sunday_fn_from;
		    $time1 = $query->row()->sunday_an_to;	   
		}
		   $startTime = $time.':'.'00'.' '.'AM';
		   $endTime = $time1.':'.'00'.' '.'PM';
		   if($slot == '15'){
				$val = '4';
			}
		   if($slot == '30'){
				$val = '2';
			}
			if($slot == '60'){
				$val = '1';
			}
			if($slot == '45'){
				$val = '1.5';
			}
			if($slot == '5'){
				$val = '12';
			}
			
			$start = date('H:i:s',strtotime($startTime));
			$end = date('H:i:s',strtotime($endTime));
			$diff = ($end - $start)* $val;
			$arr = array();
			for($loop = 1; $loop <= $diff;$loop++)
			{
				$event_length = $slot * $loop;
				$timestamp = strtotime("$startTime");
				$etime = strtotime("+$event_length minutes", $timestamp);
				array_push($arr,$next_time = date('h:i A', $etime));
			}
	   } else {
		   if($slot == '15'){
				$val = '4';
			}
		     if($slot == '30'){
				$val = '2';
			}
			if($slot == '60'){
				$val = '1';
			}
			if($slot == '45'){
				$val = '1.5';
			}
			if($slot == '5'){
				$val = '12';
			}
			
		    $startTime = '12'.':'.'00'.' '.'AM';
		    $endTime = '11'.':'.'30'.' '.'PM';
		    $start = date('H:i:s',strtotime($startTime));
			$end = date('H:i:s',strtotime($endTime));
			$diff = ($end - $start)* $val;
			$arr = array();
			for($loop = 1; $loop <= $diff;$loop++)
			{
				$event_length = $slot * $loop;
				$timestamp = strtotime("$startTime");
				$etime = strtotime("+$event_length minutes", $timestamp);
				array_push($arr,$next_time = date('H:i A', $etime));
			}
	   }
	   } else {
		   $slot = '30';
		   $val ='2';
		   $sch_time ='1';
		   $startTime = '12'.':'.'00'.' '.'AM';
		   $endTime = '11'.':'.'30'.' '.'PM';
		   $start = date('H:i:s',strtotime($startTime));
			$end = date('H:i:s',strtotime($endTime));
			$diff = ($end - $start)* $val;
			$arr = array();
			for($loop = 1; $loop <= $diff;$loop++)
			{
				$event_length = $slot * $loop;
				$timestamp = strtotime("$startTime");
				$etime = strtotime("+$event_length minutes", $timestamp);
				array_push($arr,$next_time = date('h:i A', $etime));
			}
		   
	   }
			$arr2 = array();
			$todate = date('d-m-Y');
			if($date == $todate) {
				for($loop = 1; $loop <= $diff;$loop++)
				{
					$event_length = 30 * $loop;
					$timestamp = strtotime("$startTime");
					$etime = strtotime("+$event_length minutes", $timestamp);
					if(date('H:i') >= date('H:i', $etime)){
					     array_push($arr2,$next_time = date('h:i A', $etime));
					}
				}
			}
			$this->db->where('client_id',$branch);
			$this->db->where('appointment_from',date('Y-m-d',strtotime($date)));
			$this->db->distinct();
			$this->db->select('start,end')->from('tbl_appointments');
			$query = $this->db->get();
			$arr1 = array();  
			foreach($query->result_array() as $row){
				$start = date('h:i A', strtotime($row['start']));
				$end = date('h:i A', strtotime($row['end']));
				array_push($arr1,$start,$end);
			}
			$counts = array_count_values($arr1);
			$arr4 = array();
			if($sch_time == '' || $sch_time == '0'){
				$sch_time = '0';
			}
			for($i=0;$i < count($arr1); $i++){
				if($counts[$arr1[$i]] >= $sch_time){
					array_push($arr4,$arr1[$i]);
				}
			}
			$value = array_unique($arr4);
			$val = count($value);
			if($val > 0) {
				  $res1 = array_diff($arr, $value);
				  $res = array_values($res1);
			} 
			else {
				$res = array_values($arr);
			}
			if($date == $todate){
				$result = array_diff($res, $arr2);
			}
			else {
				$result = $res;
			}
			$response = array();
			if($result != ''){
				$response['status'] = 'success';
				$response['message'] = $result;
				
			} else {
				$response['status'] = 'Failure';
				$response['message'] = 'No Data Found';
			}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result; 
	}
	public function viewappointment(){    
	    $client_id = $this->uri->segment(3);
		$app_id = $this->uri->segment(4);
	   	$result = $this->service_model->appointment_view($client_id,$app_id);
		$response = array();
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function book_appointment() {
	   $client_id = $_POST["mainbranch"];
	   $this->db->select('sch_slot,sch_time')->from('tbl_settings')->where('client_id',$client_id);
	   $query = $this->db->get();
	   if($query->result_array() != false){
			$slot = $query->row()->sch_slot;
	   } else {
		   $slot = '30';
	   }
	   $To = date("H:i:s", strtotime($_POST["time"]));
	   $To1 = date("H:i:s", strtotime($_POST["time"])+($slot*60));
	   
	   $this->db->where('mobile_no',$_POST["mobile"]);
	   $this->db->where('client_id',$client_id);
	   $this->db->select('patient_id')->from('tbl_patient_info');
	   $query = $this->db->get();
	   if($query->result_array() != false){
				$patient_id = $query->row()->patient_id;
	   } else {
		   $patient_info = array(
				'first_name' => $_POST["name"],
			//	'email' => $_POST["email"],
				'appoint_date' => date('Y-m-d'),
				'mobile_no' => $_POST["mobile"],
				'patient_code' => $this->generate_code(),
				'client_id' => $_POST["mainbranch"]
			);
			$this->db->insert('tbl_patient_info', $patient_info);
			$patient_id = $this->db->insert_id();
		   
	   } 
	    $insert = array(
				'patient_id' => $patient_id,
				'client_id' => $_POST["branch"],
				'start' =>date('Y-m-d',strtotime($_POST["date"])).' '.$To,
				'end' => date('Y-m-d',strtotime($_POST["date"])).' '.$To1,
				'appointment_from' => date('Y-m-d',strtotime($_POST["date"])),
				'appointment_to' => date('Y-m-d',strtotime($_POST["date"])),
				'title' => $_POST["name"],
				'har_mob_no' => $_POST["mobile"],
				//'har_email' => $_POST["email"],
				'app' => '1',
		        't_status' =>'1',
				'staff_id'=>$_POST["staff_id"]
	   );
	   
	   
		$this->db->insert('tbl_appointments', $insert);
		$appointment_id = $this->db->insert_id();
		$this->service_model->notify_client($appointment_id);	  	
		
		/* $client_id = $_GET["mainbranch"];
		$this->db->where('client_id',$client_id);
		$this->db->select('token')->from('tbl_client');
		$query = $this->db->get();
		$token = $query->row()->token;
		define( 'API_ACCESS_KEY', 'AAAAHhxim7Y:APA91bGeFWJJ6ZHdYqoxNwl7e8C7A-AvjlaDCAg43hfEhNzPVqfn1tR-Bg8y6vB0SKDaqgqnx07JyLaZiigDcJ482Tkk_nPBEhsqkX88sYHTRYLZnunznnU-Mexyj7VnDbgOn_oAaXc7' );
		*/$start = date('Y-m-d',strtotime($_POST["date"])).' '.$To;
		$title = 'Appointment Request';
		$name = $_POST["name"];
		$mobile = $_POST["mobile"];
		/* $msg = 'Patient Name :'.$name.'
Mobile No : '.$mobile;
		$data = array("to" => $token , "priority"=>"high",
						  "notification" => array( "title" => $title , "body" => $msg,"icon" => "icon.png","vibrate"   => 1,"sound" => "bingbong.aiff"));                                                                    
		$data_string = json_encode($data); 
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
		curl_close ($ch); */
		
		$result = $this->service_model->add_aptnotification($client_id,$title,$name,$mobile,$start); 
		
		
		$response = array();   
		if($this->db->insert_id() != ''){  
			$response['status'] = 'success';
			$response['message'] = 'Appointment has been  added successfully.';
			$response['data'] = $patient_id;
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'Appointment has not been added successfully.';
		}
	   
	    $json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;  
   }
   public function generate_code() {
		$gender = 'Gender';
		$string  = 'P' . ucfirst(substr($gender,0,1)) . ucfirst(substr($_GET["name"],0,1)) . '/' . date('my') . '/';
		$this->db->select('patient_code')->from('tbl_patient_info'); 
		if($this->session->userdata('all_locations') == true)
		{
			$this->db->where_in('client_id',$_GET["branch"]);
		}else{
			$this->db->where('client_id',$_GET["branch"]);
		}
		$this->db->like('patient_code', $string, 'after');
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $string . ($query->num_rows() + 1);
		} else {
			return $string . '1';
		}
	}
	
	 public function particularappointment_details(){
	    $app_id = $_GET["appointmentid"];
		$result = $this->service_model->appointment_view($app_id);
		$json_result = json_encode($result);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function frontpage_details()
   {
	    $id = $_GET["id"];
		$result = $this->service_model->frontpage_details($id);
		$json_result = json_encode($result);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result; 
	   
   }
   public function edit_appointment() {
	   $client_id = $_POST["mainbranch"];
	   $this->db->select('sch_slot,sch_time')->from('tbl_settings')->where('client_id',$client_id);
	   $query = $this->db->get();
	   if($query->result_array() != false){
	     $slot = $query->row()->sch_slot;
	   } else { 
	     $slot = '30';
	   }
	   $To = date("H:i:s", strtotime($_POST["time"]));
	   $To1 = date("H:i:s", strtotime($_POST["time"])+($slot*60));
	   
	    $insert = array(
				'client_id' => $_POST["mainbranch"],
				'start' =>date('Y-m-d',strtotime($_POST["date"])).' '.$To,
				'end' => date('Y-m-d',strtotime($_POST["date"])).' '.$To1,
				'appointment_from' => date('Y-m-d',strtotime($_POST["date"])),
				'appointment_to' => date('Y-m-d',strtotime($_POST["date"])),
				'title' => $_POST["name"],
				'har_mob_no' => $_POST["mobile"],
				//'har_email' => $_POST["email"],
		        't_status' =>'1',
	      );
	   
		$this->db->where('appointment_id',$_POST["appointment_id"]);
		$this->db->update('tbl_appointments', $insert);
		
		$response = array();
		if($_POST["appointment_id"] != ''){
			$response['status'] = 'success';
			$response['message'] = 'Appointment has been  edited successfully.';
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'Appointment has not been edited successfully.';
		}
	    
	    $json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result; 
    } 
	public function cancel_appointments(){
		$appointment_id = $_POST["appointment_id"];
		$result = $this->service_model->cancel_appointments($appointment_id);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Appointment has been deleted successfully.';
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Appointment has not been deleted successfully.';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: POST,GET');
		echo $json_result;  
	}
	public function feedback_app(){
		$response = array();
		$branch = $_GET["mainbranch"];
		$name = $_GET["name"];
		$email = $_GET["email"];
		$mobile = $_GET["mobile"];
		$message = str_replace('%20',' ',$_GET["message"]);
		$this->db->select('clinic_name')->from('tbl_client');
		$this->db->where('client_id',$branch);
		$res = $this->db->get();
		$clinic = $res->row()->clinic_name;
		$result = $this->mail_model->feedback_app($branch,$name,$email,$message,$mobile,$clinic);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Email has been Sent successfully.';
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Email has been Sent successfully.';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;   
	}
	public function feedback_clinic(){
		$branch = $_GET["mainbranch"];
		$name = $_GET["name"];
		$email = $_GET["email"];
		$message = $_GET["message"];
		$mobile = $_GET["mobile"];
		$message = str_replace('%20',' ',$_GET["message"]);
		$this->db->select('clinic_name,email')->from('tbl_client');
		$this->db->where('client_id',$branch);
		$res = $this->db->get();
		$clinic = $res->row()->clinic_name;
		$clinic_email = $res->row()->email;
		
		$result = $this->mail_model->feedback_clinic($branch,$name,$email,$message,$mobile,$clinic_email);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Email has been Sent successfully.';
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Email has been Sent successfully.';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;  
	}
	 public function test() {
	   $this->db->where('email',$_GET["email"]);
	   $this->db->select('patient_id')->from('tbl_patient_info')->where('client_id',$_GET["branch"]);
	   $query = $this->db->get();
			   if($query->result_array() != false){
						$patient_id = $query->row()->patient_id;
						$status = '0';
			   } else {
			   $this->db->where('mobile_no',$_GET["referrer"]);
			   $this->db->select('patient_id')->from('tbl_patient_info');
			   $res = $this->db->get();
				 if($res->result_array() != false){
					  $ref = $res->row()->patient_id;
				 } else {
				 }
			$this->load->helper('string');
			
			$patient_info=array(
		        'client_id' => $_GET["branch"],
				'first_name' => $_GET["name"],
				'appoint_date' => date('Y-m-d'),
				'gender' => $_GET["gender"],
				'mobile_no' => $_GET["mobile"],
				'email' => $_GET["email"],
				'home_visit' => $_GET["patient_type"],
				'verify_code' => $rand,
				'status' => 'Active',
				'register_by' => 'app',
				'referal_id' => $ref,
				'occupation' => $_GET["occupation"],
				'food_habits' => $_GET["food_habits"],
				'marital_status' => $_GET["marital_status"],
				'height' => $_GET["height"],
				'weight' => $_GET["weight"],
				'bmi' => $_GET["bmi"],
				'address_line1' => $_GET["address_line"],
				'address_line2' => $_GET["location"],
				'city' => $_GET["city"],
				'pincode' => $_GET["pincode"],
				'phone_no' => $_GET["phone"],
				'contact_person_name' => $_GET["contact_name"],
				'contact_person_mobile' => $_GET["contact_mobile"],
				'created_date' => date('Y-m-d H:i:s'),
				'modify_date' => date('Y-m-d H:i:s'),
				'patient_code' => $this->generate_code()
			);
			$this->db->insert('tbl_patient_info', $patient_info);
			$patient_id = $this->db->insert_id();
			$email = $_GET["email"];
			$branch = $_GET["branch"];
			$rand = random_string('numeric',6);
			$name = $_GET["name"];
			$result = $this->service_model->verify_code($name,$email,$rand,$branch);
			$status = '1';
		 }
		$response = array();
		if($status == '1'){
			$response['status'] = 'success';
			$response['message'] = 'Patient has been Registered successfully.';
			$response['patient_id'] = $patient_id;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Patient already Exist.';
			$response['patient_id'] = $patient_id;
		}
		
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;  
	}
	 
	/*public function user_login() {
		$result = $this->service_model->user_login();
		$response = array();
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Login successfully.';
			$response['PatientData'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Email or Mobile Number is invalid';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}*/
	
	public function user_login() {
		//print_r($_POST);exit;
		//
		
		$result = $this->service_model->user_login();
		$response = array();
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Login successfully.';
			$response['data'] = $result;
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'Email or password is invalid';
		}
		$json_result = json_encode($response);
		
        //header('Access-Control-Allow-Origin: *');
		//header('Access-Control-Allow-Methods:POST');
		
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
		echo $json_result;
	}
	public function forget_password() {
		$result = $this->service_model->forget_password();
		$response = array();
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Your Password has been Sent in email.';
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Your Email ID is Incorrect.';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function user_details() {
		$result = $this->service_model->user_details();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['data'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: POST,GET');
		echo $json_result;
	}
	public function resend_verify_code(){
		$patient_id = $_GET['patient_id'];
		$this->db->where('patient_id',$patient_id);
		$this->db->select('first_name,last_name,email,mobile_no,client_id,verify_code')->from('tbl_patient_info');
		$res = $this->db->get();
		$name = $res->row()->first_name.' '.$res->row()->last_name;
		$patient_name = $res->row()->first_name.' '.$res->row()->last_name;
		$email = $res->row()->email;
		$branch = $res->row()->client_id;
		$rand = $res->row()->verify_code;
		$mobile = $_GET['mobile'];
		$client_id = $branch;
		$this->load->model('appoinment_model');
		$profile_info = $this->appoinment_model->editProfile($branch);
			$sms_count = $profile_info['sms_count'];
			$sms_limit= $profile_info['total_sms_limit'];
			if($sms_limit > $sms_count || $client_id == '1636' || $client_id == '1809' ) {
		      $result = $this->service_model->resend_verify_code($name,$mobile,$rand,$branch);  
			} else {
				$result = $this->service_model->verify_email($patient_name,$email,$rand,$clinic,$branch,$mobile);
			}
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
			$response['mobile_no'] = $mobile;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		} 
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function verify_api(){
		$id = $_GET['patient_id'];
		$code = $_GET['verify_code'];
		$branch = $_GET['branch'];
		
		if($id == ''){
			$this->db->limit(1);
			$this->db->order_by('patient_id','desc');
			$this->db->select('patient_id')->from('tbl_patient_info');
			$res = $this->db->get();
			$id1= $res->row()->patient_id;
			echo $id1;
			/* $this->db->where('verify_code',$code);
			$this->db->set('status','Active');
			$this->db->update('tbl_patient_info'); */
		} else {
			$this->db->where('patient_id',$id);
			$this->db->where('verify_code',$code);
			$this->db->set('status','Active');
			$this->db->update('tbl_patient_info');
		}   
		$result = $this->service_model->pat_details($id,$branch);
		
		$this->db->where('patient_id',$id);
		$this->db->select('status,verify_code')->from('tbl_patient_info');
		$res = $this->db->get();
		if($res->result_array() != false){
		$status = $res->row()->status;
		$verify_code = $res->row()->verify_code;
		} else {
			$status = 'Inactive';
		    $verify_code = '01';
		}
		$response = array();
		if($verify_code != $code ){
			 $response['status'] = 'Failure';
			 $response['message'] = 'Verification Code Has Been Wrong!';
			  
		} else {
			if($status == 'Active'){
			    $response['status'] = 'success';
			    $response['message'] = 'Account has been  activated Successfully!';
				$response['patientdata'] = $result;
			} else {
				 $response['status'] = 'Failure';
			     $response['message'] = 'Account has not been activated Successfully!';
			}
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result; 
	}
	public function clinic_details() {
		$result = $this->service_model->clinic_details();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = '';
			$response['data'] = $result;
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
		echo $json_result;
	}
	public function updatedevicetoken() {
		if($_GET["token"] != '' || $_GET["token"] != 'null'){
		$patient_info=array(
		        'client_id' => $_GET["client_id"],
				'token' => $_GET["token"],
				'os' => $_GET["os"],
		);
		$this->db->insert('tbl_device', $patient_info);
		$app_id = $this->db->insert_id();
		$result = $this->service_model->get_token($app_id);
		} else { //$data = array('token_id'=> $app_id , 'token' => $_GET["token"]);
		   $app_id = '';
		   $result = '';
		} $response = array();
		if($app_id != false){
			$response['status'] = 'success';
			$response['message'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function token_update() {
		$this->db->where('client_id',$_GET['client_id']);
		$this->db->where('token',$_GET['token']);
		$this->db->set('patient_id',$_GET['patient_id']);
		$this->db->update('tbl_device');
		$response = array();
		if($_GET['client_id'] != false){
			$response['status'] = 'success';
			$response['message'] = 'Token has been updated successfully!';
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Token has not been updated';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function token_details() {  
		$result = $this->service_model->token_details();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);  
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function all_token_details() {
		$result = $this->service_model->all_token_details();
		$json_result = json_encode($result);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function notification_sms() {
		//$img_url = ''.$this->input->post('upload_image');
		$fields = array(
             'to'  						=> $reg_id ,
			'priority'					=> "high",
            'notification'              => array( "title" => 'Test', "body" => 'Test Message'),
			'data'						=> array("message" =>'Test Message'),
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
	public function tokens() {  
		$result = $this->service_model->all_tokens();
		$json_result = json_encode($result);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function get_notifications() {
		$result = $this->service_model->all_notifications();
		$json_result = json_encode($result);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function notifications_details() {
		$result = $this->service_model->notifications_details();
		$json_result = json_encode($result);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function treatment_protocol() {
		$patient_id = $_GET['patient_id'];
		$client_id = $_GET['client_id'];
		$result = $this->service_model->treatment_protocol($patient_id,$client_id);
		$json_result = json_encode($result);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
		
	}
	public function invoice_view() {
		$patient_id = $_POST['patient_id'];
		$client_id = $_POST['client_id'];
		$result = $this->service_model->invoice_view($patient_id,$client_id);
		if($result != false){
				$response['status'] = 'success';
				$response['data'] = $result;
		} else {
				$response['status'] = 'Failed';
				$response['message'] = 'Data Not Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: POST,GET');
		echo $json_result;
		
	}
	public function particular_invoicedetails() {
		$patient_id = $_GET['patient_id'];
		$client_id = $_GET['client_id'];
		$bill_id = $_GET['bill_id'];
		$result = $this->service_model->particular_invoicedetails($patient_id,$client_id,$bill_id);
		$json_result = json_encode($result);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
		
	}
	public function viewchart_detail() {
		$patient_id = $_GET['patient_id'];
		$client_id = $_GET['client_id'];
		$result = $this->service_model->viewchart_detail($patient_id,$client_id);
		$json_result = json_encode($result);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;   
		
	}
	public function particularchart_detail() {
		$client_id = $_POST['client_id'];
		$chart_no = $_POST['chart_no'];
		$result = $this->service_model->particularchart_detail($client_id,$chart_no);
		$response = array();
		if($result != ''){
			$response['status'] = 'success';
			$response['data'] = $result;
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'Data Not Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: POST,GET');
		echo $json_result;
	}
	public function store_exercise() {
		$client_id = $_GET['client_id'];
		$chart_id = $_GET['chart_id'];
		$patient_id = $_GET['patient_id'];
		   $patient_info=array(
		        'client_id' => $_GET["client_id"],
				'chart_id' => $_GET["chart_id"],
				'exercise_name' => $_GET["exercise_name"],
				'date' =>date('Y-m-d',strtotime($_GET["date"])),
				'patient_id' => $_GET["patient_id"],
				'time' => $_GET["time"],
				'duration' => $_GET["duration"],
				'feedback' => $_GET["feedback"],
				
			);  
			$this->db->insert('tbl_saveexerciseduration', $patient_info);
			$id = $this->db->insert_id();
			if($id != false){
				$response['status'] = 'success';
				$response['message'] = $id;
			} else {
				$response['status'] = 'Failure';
				$response['message'] = 'No Data Found';
			}
			$json_result = json_encode($response);  
			header('Content-type: application/json');
			header('Access-Control-Allow-Origin: *');
			header('Access-Control-Allow-Methods: GET,POST');
			echo $json_result;
	}
	public function exercise_view() {
		$client_id = $_GET['client_id'];
		$chart_id = $_GET['chart_id'];
		$result = $this->service_model->particularexercise($client_id,$chart_id);
		$json_result = json_encode($result);  
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function physiojob_users() {
		$result = $this->service_model->physiojob_users();
		$json_result = json_encode($result);  
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function physiojob_userslogin() {
		$result = $this->service_model->physiojob_userslogin();
		if($result != false){
				$response['status'] = 'success';
				$response['message'] = $result;
		} else {
				$response['status'] = 'Failure';
				$response['message'] = 'Invalid Username or Password';
		}
		$json_result = json_encode($response);  
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	} 
	public function physiojob_details() {
		$result = $this->service_model->physiojob_details();
		$json_result = json_encode($result);  
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
		
	}
	public function particularchart_detail1() {
		$client_id = $_GET['client_id'];
		$chart_id = $_GET['chart_id'];
		$result = $this->service_model->particularchart_details1($client_id,$chart_id);
		$json_result = json_encode($result);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function check_invoice() {
		$client_id = $_POST['client_id'];
		$patient_id = $_POST['patient_id'];
		$bill_id = $_POST['bill_id'];
		$result = $this->service_model->check_invoice($client_id,$patient_id,$bill_id);
		if($result != false){
				$response['status'] = 'success';
				$response['data'] = $result;
		} else {
				$response['status'] = 'Failed';
				$response['message'] = 'Data Not Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: POST,GET');
		echo $json_result;
	}
	public function paid_amount() {
		$client_id = $_GET['client_id'];
		$patient_id = $_GET['patient_id'];
		$bill_id = $_GET['bill_id'];
		$result = $this->service_model->paid_amount($client_id,$patient_id,$bill_id);
		/* if($result != false){
				$response['status'] = 'success';
				$response['message'] = $result;
		} else {
				$response['status'] = 'Failure';
				$response['message'] = 'Invalid Username or Password';
		} */
		$json_result = json_encode($result);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function case_reports() {
		$patient_id = $_GET['patient_id'];
		$client_id = $_GET['client_id'];
		$result = $this->service_model->case_reports($patient_id,$client_id);
		$json_result = json_encode($result);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function exercise_feedback() {
		$livetime = date('H:i:s', time() - 7200);
		$time = date('H:i:s', time() + 3600);
		$chart = $_GET['chart_id'];
		$this->db->where('chart_id',$chart);
		$this->db->where('date',date('Y-m-d'));
		$this->db->select('ex_time,ex_id')->from('tbl_ex_time');
		$res = $this->db->get();
		foreach($res->result_array() as $row){
			$val = explode(':',$row['ex_time']);
			$t1 = $val[0].':'.$val[1].' '.$val[2];
			if(date('H:i:s',strtotime($t1)) < $time && date('H:i:s',strtotime($t1)) > $livetime) {
		       $this->db->where('ex_id',$row['ex_id']);
			   $this->db->set('status','1');
		       $this->db->update('tbl_ex_time');
		    }
		}
		$this->db->where('chart_id',$_GET['chart_id']);
		$this->db->select('chard_no')->from('save_chart');
		$res = $this->db->get();
		$chart_no = $res->row()->chard_no;
		$data = array(
			'pain' => $_GET['pain'],
			'client_id' => $_GET['client_id'],
			'patient_id' => $_GET['patient_id'],
			'complexity' => $_GET['complex'],
			'chart_no' => $chart_no,
		);
		$this->db->insert('ex_feedback',$data);
		$status = $this->db->insert_id();
		
		$client_id  = $_GET['client_id'];
		$patient_id  = $_GET['patient_id'];
		$pain = $_GET['pain'];
		$complex = $_GET['complex'];
		$result = $this->mail_model->exercise_feedback($patient_id,$client_id,$pain,$complex);
		
		$client_id = $_GET['client_id'];
		$this->db->where('client_id',$client_id);
		$this->db->select('token')->from('tbl_client');
		$query = $this->db->get();
		$token = $query->row()->token;  
		
		$this->db->where('patient_id',$_GET['patient_id']);
		$this->db->select('first_name,last_name,mobile_no')->from('tbl_patient_info');
		$query = $this->db->get();
		$name = $query->row()->first_name.' '.$query->row()->last_name;
		$mobile_no = $query->row()->mobile_no;
		define( 'API_ACCESS_KEY', 'AAAAHhxim7Y:APA91bGeFWJJ6ZHdYqoxNwl7e8C7A-AvjlaDCAg43hfEhNzPVqfn1tR-Bg8y6vB0SKDaqgqnx07JyLaZiigDcJ482Tkk_nPBEhsqkX88sYHTRYLZnunznnU-Mexyj7VnDbgOn_oAaXc7' );
		
		$title = 'Exercise Feedback';
		$name = $name;
		$mobile = $mobile_no;
		$msg = 'Patient Name :'.$name.'
Mobile No : '.$mobile;
		$data = array("to" => $token , "priority"=>"high",
						  "notification" => array( "title" => $title , "body" => $msg,"icon" => "icon.png","vibrate"   => 1,"sound" => "bingbong.aiff"));                                                                    
		$data_string = json_encode($data); 
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
		$result = $this->service_model->add_exfeedbacknotification($client_id,$title,$patient_id); 
		
		
		if($status != false){
			$response['status'] = 'success';
			$response['message'] = 'Patient already Exist.';
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Patient has been Registered successfully';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result; 
	}
	public function workout() {
		$client_id = $_GET['branch'];
		$chart_id = $_GET['chart_id'];
		$result = $this->service_model->workout($client_id,$chart_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function chart_details() {
		$client_id = $_GET['client_id'];
	 	$id = $_GET['chart_id'];
		$this->db->where('chart_id',$id); 
		$this->db->select('chard_no')->from('save_chart');
		$res = $this->db->get();
		$chart_no = $res->row()->chard_no;
		$result = $this->service_model->chart_details($id,$chart_no);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;  
	}
	public function repeat_time() {
		$client_id = $_GET['client_id'];
		$chart_id = $_GET['chart_id'];
		$count = $_GET['repet'];
		$patient_id = $_GET['patient_id'];
		$this->db->where('client_id',$client_id);
		$this->db->where('chart_id',$chart_id);
		$this->db->where('patient_id',$patient_id);
		$this->db->set('count',$count);
		$this->db->update('save_chart');
		$response = array();
		if($count != '0'){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function admin_details() {
		$client_id = $_GET['branch'];
		$result = $this->service_model->admin_details($client_id);
		$json_result = json_encode($result);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function ex_time(){
		$id = $_GET['patient_id'];
		$time = $_GET['time'];
		$client_id = $_GET['client_id'];
		$chart_id = $_GET['chart_id'];
		$val = explode(',',$time);
		for($i = 0; $i < count($val); $i++) {
			$data = array(
				'patient_id' => $id,
				'ex_time' => str_replace(' ','',$val[$i]),
				'chart_id' => $chart_id,
				'client_id' => $client_id,
				'date' => date('Y-m-d'),
			);
			$this->db->insert('tbl_ex_time',$data);
		}
		$response = array();
		$response['status'] = 'success';
		$response['message'] = 'Patient has been Registered successfully';
		$json_result = json_encode($response);	
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function check_ex_time(){ 
		$id = $_GET['patient_id'];
		$chart_id = $_GET['chart_id'];
		$result = $this->service_model->sel_time($id,$chart_id);
		$this->db->where('patient_id',$id);
		$this->db->where('date',date('Y-m-d'));
		$this->db->where('chart_id',$chart_id);
		$this->db->select('status')->from('tbl_ex_time');
		$res = $this->db->get();
		$response = array();
		if($res->result_array() != false){
			$response['status'] = 'success';
			$response['message'] = $res->row()->status;
		} else {
			$response['status'] = 'Failure';
			$response['message'] =$result;  
		}
		$json_result = json_encode($response);	
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function doc_list() {
		$client_id = $_GET['branch'];
		$result = $this->service_model->doc_list($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function offers_request()	
	{	 $client_id = $_GET["branch"];
	
	if ($client_id == '2022'){
		$client_id = $_GET["branch"];
		$email = $_GET["email"];
		$mobile = $_GET["mobile"];
		$name = $_GET["name"];
		$message = $_GET["message"];
		
		$data  = array(
			'client_id' => $client_id,
			'patient_name' => $name,
			'mobile' => $mobile,
			'email' => $email,
			'message' => $message,
			'date' => date('d-m-Y')
		);
		
		$this->db->insert('tbl_query',$data);
		$id = $this->db->insert_id();
		
		if($id != false){
			$response['status'] = 'success';
			$response['message'] = $id;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	} else {
		$type = $_GET["type"];  
		if($type == '1'){
			 $ex_type = 'Arms Exercise';
		} else if($type == '2'){
			 $ex_type = 'Knee Pain Exercise';
		}
		else if($type == '3'){ 
		   $ex_type = 'Abdomen/Abs Exercise';
		}
		else if($type == '4'){ 
			$ex_type = 'Back Pain Exercise';
		}
		else{
			$ex_type = 'Neck Pain Exercise';
		}
	    $client_id = $_GET["branch"];
		$name = $_GET["name"];
		$email = $_GET["email"];
		$mobile = $_GET["mobile"];
		$message = $_GET["message"];
		    $this->db->where('client_id',$client_id);
		    $this->db->where('mobile_no',$mobile);
			$this->db->select('patient_id')->from('tbl_patient_info');
			$res = $this->db->get();
			$patient_id = $res->row()->patient_id;
			if($patient_id != ''){
			} else {
				$patient_id = $_GET["patient_id"];
			
			}
			$this->db->where('patient_id',$patient_id);
			$this->db->set('app_approve','2');
			$this->db->set('req',$message);
			$this->db->set('ex_type',$type);
			$this->db->update('tbl_patient_info');
		
		$branch = $_GET["branch"];
		$name = $_GET["name"];
		$email = $_GET["email"];
		$mobile = $_GET["mobile"];
		
		$message = str_replace('%20',' ',$_GET["message"]);
		$this->db->select('clinic_name,email')->from('tbl_client');
		$this->db->where('client_id',$branch);
		$res = $this->db->get();
		$clinic = $res->row()->clinic_name;
		$clinic_email = $res->row()->email;
		$result = $this->mail_model->offer_request($branch,$name,$email,$message,$mobile,$clinic_email,$ex_type);
		
		$title = 'Exercise Request';
		$client_id = $branch;
		$this->db->where('client_id',$client_id);
		$this->db->select('token')->from('tbl_client');
		$query = $this->db->get();
		$token = $query->row()->token;
		define( 'API_ACCESS_KEY', 'AAAAHhxim7Y:APA91bGeFWJJ6ZHdYqoxNwl7e8C7A-AvjlaDCAg43hfEhNzPVqfn1tR-Bg8y6vB0SKDaqgqnx07JyLaZiigDcJ482Tkk_nPBEhsqkX88sYHTRYLZnunznnU-Mexyj7VnDbgOn_oAaXc7' );
		
		$name = $_GET["name"];
		$mobile = $_GET["mobile"];
		$title = 'Exercise Request';
		$msg = 'Patient Name :'.$name.'
Mobile No : '.$mobile;
		$data = array("to" => $token , "priority"=>"high",
						  "notification" => array( "title" => $title , "body" => $msg,"icon" => "icon.png","vibrate"   => 1,"sound" => "bingbong.aiff"));                                                                    
		$data_string = json_encode($data); 
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
		
		$result = $this->service_model->add_exreqnotification($client_id,$title,$name,$mobile,$ex_type); 
		
		
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	  }		
	} 
   public function doc_list1() {
		$client_id = $_GET['branch'];
		$result = $this->service_model->doc_list($client_id);
		$json_result = json_encode($result);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function user_login1() {
		$this->load->helper('string');
	    $rand = random_string('numeric',6);	
		$email = $_GET['email'];
		$mobile = $_GET['mobile'];
		$branch = $_GET['branch'];
		$name = 'Patient';
		$this->db->where('client_id',$branch);  
		$this->db->where('email',$email);  
		$this->db->where('mobile_no',$mobile);
		$this->db->set('status','Inactive');
		$this->db->set('verify_code',$rand);
		$this->db->update('tbl_patient_info');
		$this->load->model('appoinment_model');
		$client_id  = $branch;
		$result = $this->service_model->user_login1();
		$response = array();
		$profile_info = $this->appoinment_model->editProfile($client_id);
		$sms_count = $profile_info['sms_count'];
		$sms_limit= $profile_info['total_sms_limit'];
		if($result != false){
			if($sms_limit > $sms_count && $sms_limit != 0){
				$this->service_model->resend_verify_code($name,$mobile,$rand,$branch);
				$response['status'] = 'success';
				$response['message'] = 'Login successfully.';
				$response['PatientData'] = $result;
			
			} else {
				$response['status'] = 'success';
				$response['message'] = '1';
				$response['PatientData'] = $result;
			}
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Email or Mobile Number is invalid';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function resend_verify_code1(){
		$this->load->model('appoinment_model');
		$client_id = $_GET['branch'];
		$patient_id = $_GET['patient_id'];
		$this->db->where('client_id',$client_id);  
		$this->db->where('patient_id',$patient_id);
		$this->db->select('verify_code,mobile_no')->from('tbl_patient_info');
		$query = $this->db->get();
		$rand = $query->row()->verify_code;
		$mobile = $query->row()->mobile_no;
		$profile_info = $this->appoinment_model->editProfile($client_id);
			$sms_count = $profile_info['sms_count'];
			$sms_limit= $profile_info['total_sms_limit'];
			if($mobile != '') {
				$message_patient = 'Mobile Verification Code is '.$rand.'';
				$sms['patient'] = 'DONE';
				if($client_id != '1636'){
					if($sms_limit > $sms_count) {
						$patient_churl = @fopen($patientSmsURL,'r');
						fclose($patient_churl);
						if (!$patient_churl) {
							
						}else{
							$sms_count += 1;
						}
						
					} else { }
				} else {
					$patient_churl = @fopen($patientSmsURL,'r');
				    fclose($patient_churl);
					$sms_count += 1;
				}
 				$this->db->where('client_id', $client_id);
			    $this->db->update('tbl_client', array('sms_count' => $sms_count));
			    return $sms;
			}
			   
	}
	
	public function basic_exercise() {
		$patient_id = $_GET['patient_id'];
		$result = $this->service_model->basic_exercise($patient_id);
		$json_result = json_encode($result);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;  
	}
	public function user_login2() {
		$this->load->helper('string');
	    $rand = random_string('numeric',6);	
		$email = $_GET['email'];
		$branch = $_GET['branch'];
		$mobile = $_GET['mobile'];
		$name = 'Patient';
		$this->db->where('client_id',$branch);  
		$this->db->where('email',$email); 
		$this->db->where('mobile_no',$mobile); 		
		$this->db->set('status','Inactive');
		$this->db->set('verify_code',$rand);
		$this->db->update('tbl_patient_info');
		$this->load->model('appoinment_model');
		
		$client_id  = $branch;
		$this->db->where('client_id',$branch);  
		$this->db->where('email',$email);
		$this->db->where('mobile_no',$mobile);  		
		$this->db->select('first_name,last_name')->from('tbl_patient_info');
		$query = $this->db->get();
		if($query->result_array() != false){
		$patient_name = $query->row()->first_name.' '.$query->row()->last_name; 
		$result = $this->service_model->user_login2();
		
		$profile_info = $this->appoinment_model->editProfile($branch);
		$sms_count = $profile_info['sms_count'];
		$sms_limit= $profile_info['total_sms_limit'];
		
		$message_patient = 'Mobile Verification Code is '.$rand.'';
		$sms['patient'] = 'DONE';
				
		if($sms_limit > $sms_count) {
			$patientSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=PHYSIO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$mobile.'&duplicateCheck=true&format=json&msg='.urlencode($message_patient);
			$patient_churl = @fopen($patientSmsURL,'r');
			fclose($patient_churl);
			if (!$patient_churl) {
			}else{
				$sms_count += 1;
			}
		} else { }		
		$this->db->where('client_id',$branch);  
		$this->db->select('clinic_name')->from('tbl_client');
		$query = $this->db->get();
		$clinic = $query->row()->clinic_name;
		$this->service_model->verify_email($patient_name,$email,$rand,$clinic,$branch,$mobile);
				
		} else {
			$clinic = '';
		}
		$response = array();
		
		if($clinic != false){
			$response['status'] = 'success';
			$response['message'] = 'Login successfully.';
			$response['PatientData'] = $result;	
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Email or Mobile Number is invalid';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result; 
				
	}
	public function patient_register1() {
	   $this->load->helper('string');
	   $rand = random_string('numeric',6);	
	   $this->db->where('mobile_no',$_GET["mobile"]);
	   $this->db->where('client_id',$_GET["branch"]);
	   $this->db->select('patient_id')->from('tbl_patient_info')->where('client_id',$_GET["branch"]);
	   $query = $this->db->get();
		   if($query->result_array() != false){
						$patient_id = $query->row()->patient_id;
						$status = '0';
		   } else {
			  $patient_info=array(
		        'client_id' => $_GET["branch"],
				'first_name' => $_GET["name"],
				'appoint_date' => date('Y-m-d'),
				'gender' => $_GET["gender"],
				'mobile_no' => $_GET["mobile"],
				'email' => $_GET["email"],
				'home_visit' => $_GET["patient_type"],
				'verify_code' => $rand,
				'status' => 'Inactive',
				'app_approve' => '1',
				'register_by' => 'app',
				'referrer_id' => $_GET["referrer"],
				'patient_code' => $this->generate_code()
			);
			$this->db->insert('tbl_patient_info', $patient_info);
			$patient_id = $this->db->insert_id();
			$mobile = $_GET["mobile"];
			$email = $_GET["email"];
			$branch = $_GET["branch"];
			$name = $_GET["name"];
			$patient_name = $_GET["name"];
			$p_type = $_GET["patient_type"];
			if($p_type == '2'){
				$type = 'Clinic Visit';
			} else {
				$type = 'Home Visit';  
			}
			
			$this->db->where('client_id',$branch);  
		    $this->db->select('clinic_name')->from('tbl_client');
		    $query = $this->db->get();
		    $clinic = $query->row()->clinic_name; 
			
            if($branch == '1809') {
				$this->db->where('client_id','1809');
				$this->db->select('sms_count,mobile')->from('tbl_client');
				$res = $this->db->get();
				$sms_count = $res->row()->sms_count;
				$mobile = $res->row()->mobile;
				$message_patient = 'Dear Admin, New patient has been registered through Mobile App';
				$sms['doctor'] = 'DONE';			
				$patientSmsURL = 'http://smsserver9.creativepoint.in/api.php?username=mobiphysio&password=935251&to='.$mobile.'&from=PHYSIO&message='.urlencode($message_patient);
				$patient_churl = @fopen($patientSmsURL,'r');
				fclose($patient_churl);
				$sms_count += 1;
				$this->db->where('client_id', $branch);
				$this->db->update('tbl_client', array('sms_count' => $sms_count));
			} else if($branch == '103'){
				$this->db->where('client_id','103');
				$this->db->select('sms_count,mobile')->from('tbl_client');
				$res = $this->db->get();
				$sms_count = $res->row()->sms_count;
				$mobile = $res->row()->mobile;
				$message_patient = 'Dear Admin, New patient has been registered through Mobile App';
				$sms['doctor'] = 'DONE';			
				$patientSmsURL = 'http://www.smsgatewaycenter.com/library/send_sms_2.php?UserName=klakshman&Password=Smspwd@2016&Type=Individual&To='.$mobile.'&Mask=PHYSIO&Message='.urlencode($message_patient);
				$patient_churl = @fopen($patientSmsURL,'r');
				fclose($patient_churl);
				$sms_count += 1;
				$this->db->where('client_id', $branch);
				$this->db->update('tbl_client', array('sms_count' => $sms_count));
			}
			$client_id = $_GET["branch"];
			 $this->db->where('client_id',$client_id);
			$this->db->select('token')->from('tbl_client');
			$query = $this->db->get();
			$token = $query->row()->token;
			
			$title = 'Patient Registration';
			/*$name = $_GET["name"];
			$mobile = $_GET["mobile"];
			define( 'API_ACCESS_KEY', 'AAAAHhxim7Y:APA91bGeFWJJ6ZHdYqoxNwl7e8C7A-AvjlaDCAg43hfEhNzPVqfn1tR-Bg8y6vB0SKDaqgqnx07JyLaZiigDcJ482Tkk_nPBEhsqkX88sYHTRYLZnunznnU-Mexyj7VnDbgOn_oAaXc7' );
			$msg = 'Patient Name :'.$name.'
Mobile No : '.$mobile;
			//$to = "cBNA0ppuMGI:APA91bEX4--kgrkVw2tY-cLdL97j0g5gGoQiQOBSP2Qd0V9a4ZpwWDsRQxQ3V6YJj-lZAk_rdHAESGYR9431e8lmleCg2Js_YVO7AZ7iJoqPxtYPkZLG7QcYaqi7MyVr-kyosp7w1gzG";
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
			curl_close ($ch); */ 
			
			$result = $this->service_model->add_regnotification($client_id,$title,$name,$mobile); 
		
			
			$this->mail_model->pat_register($name,$mobile,$email,$branch,$type);
			$this->service_model->verify_email($patient_name,$email,$rand,$clinic,$branch,$mobile);
			$status = '1';
		}
		$response = array();
		if($status != 1){
			$response['status'] = 'Failure';
			$response['message'] = 'Patient already Exist.';
			$response['patient_id'] = $patient_id;
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Patient has been Registered successfully';
			$response['patient_id'] = $patient_id;
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function treatment_order() {
	     $result = $this->service_model->treatment_order();
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
    public function consent_details() {  
	     $result = $this->service_model->consent_details();
		$response = array();
		if($result != false){
			$response['status'] = 'Success';
			$response['message'] = $result;
			$json_result = json_encode($response);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function consent_update() {
	    $base = file_get_contents("php://input");
		if ($base != '') {
			$dat=explode(',',$base);
			$dat_name=explode('/',$dat[0]);
			$dat_name1=explode(';',$dat_name[1]); 
			$data = str_replace($dat[0], '', $base);
			$data = str_replace(' ', '+', $data);
			$data = base64_decode($data);
			chdir('uploads/consent/');
			$file = date("YmdHis") . ".". $dat_name1[0];
			if(file_put_contents($file, $data))
			if ( ! preg_match("/^[a-z0-9:_\/-]+$/i", $file))
			{
				$data = array(
				   'client_id' => $_GET['branch'],
				   'patient_id' => $_GET['patient_id'],
				   'date'=> date('Y-m-d'),
				   'img_name' => 'uploads/consent/'.$file 
				);
				$this->db->insert('tbl_consent_sign',$data);
				$response['status'] = 'success';
	     	    $response['message'] = 'Patient has been Updated successfully.';
			} else {
				$data = array(
				   'client_id' => $_GET['branch'],
				   'patient_id' => $_GET['patient_id'],
				   'date'=> date('Y-m-d'),
				   'img_name' => 'uploads/consent/'.$file  
				);
				$this->db->insert('tbl_consent_sign',$data);
			    $response['status'] = 'success';
	     	    $response['message'] = 'Patient has been Updated successfully.';
			} 
		} else {
	         	$response['status'] = 'Failure';
				$response['message'] = 'Patient has not been Updated.';
			}
			$json_result = json_encode($response);
			header('Content-type: application/json');
			header('Access-Control-Allow-Origin: *');
			header('Access-Control-Allow-Methods: GET,POST');
			echo $json_result; 
	}
	public function test_notification() {
		$summary = 'Text Message';
		$title = 'Test';
		$msg = 'Test MSG';
        $pic = '';		
	    $res1 = "{\r\n  \"send_to_all\":1 ,\r\n  \"profile\": \"physioplustech\",\r\n  \"notification\": {\r\n  \t\"android\":{\r\n  \t\"title\": \"$title\",\r\n     \"message\": \"$msg\",\r\n      \"data\": {\r\n        \"title\": \"$title\",\r\n        \"message\": \"$msg\",\r\n        \"style\": \"picture\",\r\n        \"picture\": \"$pic\",\r\n        \"summaryText\": \"$summary\"\r\n    }\r\n  \t}\r\n  \r\n  }\r\n}";
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
	public function query()	
	{	
	    $client_id = $_GET["branch"];
		$email = $_GET["email"];
		$mobile = $_GET["mobile"];
		$name = $_GET["name"];
		$patient_id = $_GET["patient_id"];
		$message = $_GET["message"];
		
		$data  = array(
			'client_id' => $client_id,
			'patient_name' => $name,
			'mobile' => $mobile,
			'email' => $email,
			'message' => $message,
			'patient_id' => $patient_id,
		    'date' => date('Y-m-d')
		);
		
		$this->db->insert('tbl_query',$data);
		$id = $this->db->insert_id();
		
		if($id != false){
			$response['status'] = 'success';
			$response['message'] = $id;  
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function verify_apis(){
		$id = $_GET['patient_id'];
		$code = $_GET['verify_code'];
		$token = $_GET['token'];
		$branch = $_GET['branch'];
		$this->db->where('patient_id',$id);
		$this->db->where('verify_code',$code);
		$this->db->set('status','Active');
		$this->db->set('token',$token);
		$this->db->update('tbl_patient_info');
		$result = $this->service_model->pat_details($id,$branch);
		$this->db->where('patient_id',$id);
		$this->db->select('status,verify_code')->from('tbl_patient_info');
		$res = $this->db->get();
		if($res->result_array() != false){
		  $status = $res->row()->status;
		  $verify_code = $res->row()->verify_code;
		} else {
			$status = 'Inactive';
		    $verify_code = '01';
		}
		$response = array();
		if($verify_code != $code ){
			 $response['status'] = 'Failure';
			 $response['message'] = 'Verification Code Has Been Wrong!';
			  
		} else {
			if($status == 'Active'){
			    $response['status'] = 'success';
			    $response['message'] = 'Account has been activated Successfully!';
				$response['patientdata'] = $result;
			} else {
				 $response['status'] = 'Failure';
			     $response['message'] = 'Account has not been activated Successfully!';
			}
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result; 
	}
	public function approve()
	{
		$appointment_id = $_GET['appointment_id'];
		$result = $this->service_model->approve($appointment_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function getLocations_count()
	{    
		$client_id = $_GET['branch'];
		$result = $this->service_model->getLocations_count($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function revents_clientdetails(){
	    $client_id = $this->uri->segment(3);
		$result = $this->service_model->revents_clientdetails($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result; 
   }
   public function notify() {  
	   $android = array();
		$android['audience'] = "all";
		$android['notification'] = array('alert'=>'Hello !');
		$android['device_types'] = array("android");

		// convert the dictionary to a json string
		$data = json_encode($android);

		// open connection
		$ch = curl_init();

		// the url and credentials for posting to urban airship
		$url = 'https://go.urbanairship.com/api/push/';
		$username = "hF1O5Q8hQt6wc2U6GvDsNA";
		$password = "nWa6STw2TE2DvLqTf9WTWw";

		// set the url, number of POST vars, POST data
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Accept: application/vnd.urbanairship+json; version=3;'));
		curl_setopt($ch, CURLOPT_USERPWD, $username . ':' . $password);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// execute post
		$result = curl_exec($ch);
		$arrayResult=json_decode($result);

		// close connection
		$res = curl_close($ch);

		if($arrayResult->ok == 1){
				print "Success";
		} else {
				print "Error";

		}
   }
   public function sign_update() {    
	   $val = explode('-',$_GET['value']);
	   if($val[0] == 'Cln')
	   {
		   $client_id = $val[1];
		   $staff_id = '';
	   } 
	   else {
		   $client_id = '';
		   $staff_id = $val[1];
	   }
	    $base = file_get_contents("php://input");
		if ($base != '') {
			$dat=explode(',',$base);
			$dat_name=explode('/',$dat[0]);
			$dat_name1=explode(';',$dat_name[1]); 
			$data = str_replace($dat[0], '', $base);
			$data = str_replace(' ', '+', $data);
			$data = base64_decode($data);
			chdir('uploads/sign/');
			$file = date("YmdHis") . ".". $dat_name1[0];
			if(file_put_contents($file, $data))
			if ( ! preg_match("/^[a-z0-9:_\/-]+$/i", $file))
			{
				$data = array(
				   'client_id' => $client_id,
				   'staff_id' => $staff_id,
				   'date'=> date('Y-m-d'),
				   'img_name' => 'uploads/sign/'.$file 
				);
				$this->db->insert('tbl_sign',$data);
				$response['status'] = 'success';
	     	    $response['message'] = 'Staff Signature has been Added successfully.';
			} else {
				$data = array(
				   'client_id' => $client_id,
				   'staff_id' => $staff_id,
				   'date'=> date('Y-m-d'),
				   'img_name' => 'uploads/sign/'.$file
				);
				$this->db->insert('tbl_sign',$data);
			    $response['status'] = 'success';
	     	    $response['message'] = 'Staff Signature has been Added successfully.';
			} 
		   } else {
	         	$response['status'] = 'Failure';
				$response['message'] = 'Staff Signature has not been Added.';
			}
			$json_result = json_encode($response);
			header('Content-type: application/json');
			header('Access-Control-Allow-Origin: *');
			header('Access-Control-Allow-Methods: GET,POST');
			echo $json_result; 
	}
   public function test1542() {
	    $this->db->where('created_by','koursukhveer@gmail.com');
		$this->db->where('staff_id',0);
		$this->db->where('treatment_date >','2019-12-30');
		$this->db->where('treatment_date <','2020-07-30');
		$this->db->select('bill_id')->from('tbl_invoice_header');
		$res = $this->db->get();
		foreach($res->result_array() as $row){
			 $this->db->where('client_id','2565');
			 $this->db->where('bill_id',$row['bill_id']);
			 $this->db->set('staff_id','798');
			 $this->db->update('tbl_invoice_header');
		}
   }
   public function staff_register() {
		$result = $this->service_model->staff_register();
		$response = array();
		if($result != ''){
			$response['status'] = 'Success';
			$response['data'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function staff_list() {
		$result = $this->service_model->staff_list();
		$response = array();
		if($result != ''){
			$response['status'] = 'Success';
			$response['data'] = $result;
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: POST,GET');
		echo $json_result;
	}
	public function staff_update() {
		$result = $this->service_model->staff_update();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['data'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function add_protocolsession() {
		$result = $this->service_model->add_protocolsession();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['data'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function session_list() {
		$result = $this->service_model->session_list();
		$response = array();
		if($result != ''){
			$response['status'] = 'Success';
			$response['data'] = $result;
		} else {
			$response['status'] = 'failed';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: POST,GET');
		echo $json_result;
	}	
	public function todays_appt() {
		$client_id = $_POST["client_id"];
		$result = $this->service_model->todays_appt($client_id);
		$response = array();
		if(count($result) >0){
			$response['status'] = 'Success';
			$response['data'] = $result;
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	
	}
	
	public function todays_bills() {
		$client_id = $_GET["client_id"];
		$result = $this->service_model->todays_bills($client_id);
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	
   }
   public function todays_income() {
		$client_id = $_GET["client_id"];
		$result = $this->clinicapp_model->todays_income($client_id);
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	
   }
	public function todays_pat() {
		$client_id = $_GET["client_id"];
		$result = $this->clinicapp_model->todays_pat($client_id);
		$response = array();
		if($result != false){
		$json_result = json_encode($result);
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
			
		}
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	
}
public function patient_list(){
	    $client_id = $_GET["client_id"];
		$result = $this->service_model->oppatient_details($client_id);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = '';
			$response['data'] = $result;
			
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function bill_list(){
	   // $client_id = $_GET["client_id"];
		$result = $this->service_model->bill_list();
		if($result != false){
			$response['status'] = 'success';
			$response['data'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
     public function add_invoice() {
	   $id = $_POST['patient_id'];
	   if($id != false){
	     $result = $this->service_model->add_invoice();
		 $response = array();
				if($result != false){
					$response['status'] = 'Success';
					$response['message'] = 'Invoice added Successfully';
				} else {
					$response['status'] = 'Failed';
					$response['message'] = 'No Data Found';
					
				}
	    } else {
		   $response = array();
		   $response['status'] = 'Failed';
		   $response['message'] = 'No Data Found';
		
	    }
	   
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: POST,GET');
		echo $json_result;
   }
     public function edit_invoice(){
	    $bill_id = $_GET['bill_id'];
	    $patient_id = $_GET['patient_id'];
	    $result = $this->service_model->edit_invoice($bill_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['data'] = $result;
			
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   
   public function update_invoice() {
	    $result = $this->service_model->update_invoice();
		$response = array();
		if($result != false){
			$response['status'] = 'Success';
			$response['message'] = 'Invoice updated Successfully';
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'No Data Found';
			
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: POST,GET');
		echo $json_result;
   }
   public function add_exercise() {
		$result = $this->service_model->add_exercise();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['data'] = $result;
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: POST,GET');
		echo $json_result;
	}
	public function exercise_list() {
		$client_id = $_GET['branch'];
		$result = $this->service_model->exercise_list($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['data'] = $result;
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function exercisedetail(){
	    $result = $this->service_model->exercisedetail();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['data'] = $result;
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	 public function edit_exercise(){
	    $result = $this->service_model->edit_exercise();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['data'] = $result;
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: POST,GET');
		echo $json_result;
	 
   }
     public function profile_details() {  
		$result = $this->service_model->profile_details();
		$response = array();
		if($result != false){
			$response['status'] = 'Success';
			$response['data'] = $result;
			
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'Amount has not been added';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
 }
 public function edit_clinicdetails() {  
		$result = $this->service_model->edit_profile();
		$response = array();
		if($result != false){
			$response['status'] = 'Success';
			$response['message'] = 'Profile updated';
			$response['data'] = $result;
			
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'Profile Not updated';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
 }
 public function item_details(){  
	    $result = $this->service_model->item_details();
		$response = array();
		if($result != false){
			
			$response['status'] = 'Success';
			//$response['message'] = 'Profile updated';
			$response['data'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			//$json_result = json_encode($response);
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
 public function add_treatment() {
		$result = $this->service_model->add_treatment();
		$response = array();
		if($result != false){
			$response['status'] = 'Success';
			$response['message'] = 'Treatment item added';
			
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'failed to add';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	
 }
  public function edit_item() {
	    $item_id = $_GET['item_id'];
	    $client_id = $_GET['client_id'];
	    $result = $this->service_model->edit_item($item_id,$client_id);
		$response = array();
		if($result != false){
			
			$response['status'] = 'Success';
			//$response['message'] = 'Profile updated';
			$response['data'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			//$json_result = json_encode($response);
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   
   public function edit_treatmentitem(){
		$result = $this->service_model->edit_treatmentitem();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = "item updated";
			$response['data'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: POST,GET');
		echo $json_result;
    }
	public function get_expense(){
		$result = $this->service_model->get_expense();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['data'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function add_expense() {
		$result = $this->service_model->add_expense();
		$response = array();
		if($result != false){
			$response['status'] = 'Success';
			$response['message'] = 'Expense item added';			
			$response['data'] = $result;			
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'Failed added';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	
	}
	public function get_expensedet(){
		$result = $this->service_model->get_expensedet();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['data'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function edit_expenseitem(){
		$result = $this->service_model->edit_expenseitem();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = 'Item Updated';
			$response['data'] = $result;
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: POST,GET');
		echo $json_result;
    }
	public function get_provisional(){
		$result = $this->service_model->get_provisional();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['data'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function add_provisional(){
		$result = $this->service_model->provi_add();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = 'Item Updated';
			$response['data'] = $result;
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function get_provisional_details(){
		$result = $this->service_model->get_provisional_details();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['data'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function edit_provisional(){
		$result = $this->service_model->edit_provisional();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = 'Item Updated';
			$response['data'] = $result;
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: POST,GET');
		echo $json_result;
    }
	public function calendar_details() {  
		$result = $this->service_model->calendar_details();
		$response = array();
		if($result != false){
			$response['status'] = 'Success';
			$response['data'] = $result;
			
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
 }
 public function slot_details() {  
		$result = $this->service_model->slot_details();
		$response = array();
		if($result != false){
			$response['status'] = 'Success';
			$response['data'] = $result;
			
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'Amount has not been added';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
 }
 public function edit_calendardetails() {  
		$result = $this->service_model->edit_calendardetails();
		$response = array();
		if($result != false){
			$response['status'] = 'Success';
			$response['message'] = "Calender Updated";
			
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: POST,GET');
		echo $json_result;
 }
   public function client_register()
	{
			$result = $this->service_model->client_register();
			$response = array();
			if($result != false){
				$response['status'] = 'success';
				$response['message'] = 'Client added successly';
				$response['data'] = $result;
			} else {
				$response['status'] = 'Failed';
				$response['message'] = 'Email Id already Exit';
			}
			$json_result = json_encode($response);
			header('Content-type: application/json');
			header('Access-Control-Allow-Origin: *');
			header('Access-Control-Allow-Methods: GET,POST');
			echo $json_result;

	}
	public function forgot_adminpwd(){
	    $client_id = $_POST['email'];
		$result = $this->service_model->forgot_adminpwd($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['data'] = "Password Recovery mail send";
			
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'Mail Id is not valid';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: POST,GET');
		echo $json_result;
		 
   }
   public function session_details(){
	   $result = $this->service_model->session_details();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['data'] = $result;
			
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'data not found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: POST,GET');
		echo $json_result;
		 
   }
   public function update_session() {
		$result = $this->service_model->update_session();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = "session updated";
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	
	public function product_add() {
		$client_id = $_POST['client_id'];
		$result = $this->service_model->product_add($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = "product added";
			$response['data'] = $result;
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function product_details() {
		$client_id = $_GET['client_id'];
		$item_id = $_GET['item_id'];
		$result = $this->service_model->product_details($client_id,$item_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = "product added";
			$response['data'] = $result;
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function update_product() {
		$client_id = $_POST['client_id'];
		$item_id = $_POST['item_id'];
		$result = $this->service_model->update_product($client_id,$item_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = "product updated";
			$response['data'] = $result;
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function product_list() {
		$client_id = $_GET['client_id'];
		$result = $this->service_model->product_list($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['data'] = $result;
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function sms_notification_update() {
		$client_id = $_POST['client_id'];
		$result = $this->service_model->sms_notification_update($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = 'notification updated';
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function sms_notification_view() {
		$client_id = $_GET['client_id'];
		$result = $this->service_model->sms_notification_view($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['data'] = $result;
		} else {
			$response['status'] = 'Failed';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */