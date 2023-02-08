<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once ($_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php');
class Schedule_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		$this->load->model(array('mail_model','registration_model','patient_model','settings_model'));
		$this->load->helper('date');
	}
	public function bulk_cancel($appointment_id) {
			$this->db->where('appointment_id',$appointment_id);
			$this->db->set('status',1);
			$this->db->update('tbl_appointments');
		return $appointment_id; 
	}
	public function delete_appointment($appointment_id){
		$this->db->where('appointment_id',$appointment_id);
		$this->db->set('cancel_reson',$this->input->post('event-reason'));
		$this->db->set('status','1');
		$this->db->set('cancel_date',date('Y-m-d'));
		$this->db->update('tbl_appointments');
		$clinic_name = $this->session->userdata('clinic_name');
		$this->db->select("P.first_name AS pname,P.mobile_no,S.first_name AS dname,T.start AS appint_date");
		$this->db->from("tbl_appointments AS T");
		$this->db->join("tbl_patient_info AS P","T.patient_id=P.patient_id","INNER");
		$this->db->join("tbl_staff_info AS S","T.staff_id=S.staff_id","INNER");
		$this->db->where("T.appointment_id",$appointment_id);
		$query = $this->db->get();
		 if($query->num_rows() > 0) { 
			$this->smsAppCancelNotify($appointment_id,'patient');
		 return $query->row_array(); 
		 
		 }else{ false; };
	}
	public function getcancelappointment(){
		$this->db->distinct();
		$this->db->where('ai.client_id',$this->session->userdata('client_id'));
		$this->db->select('ai.order_id,ai.bill_status,ai.appointment_from,ai.appointment_id,ai.patient_id,ai.visit,ai.bill_id,ai.title,ai.start,ai.end,si.first_name as staff_name,si.last_name as staff_lname')->from('tbl_appointments ai');
	    $this->db->join('tbl_staff_info si','si.staff_id = ai.staff_id');
		$this->db->order_by('appointment_from','DESC');
		$this->db->where('ai.status',1);
		$query = $this->db->get();
	    return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getappointment(){
		$this->db->distinct();
		$this->db->where('ai.client_id',$this->session->userdata('client_id'));  
		$this->db->where('ai.status !=',1);
		$this->db->where('ai.t_status !=',1);
		$this->db->select('pi.mobile_no,ai.encounter_type,ai.chat_room,ai.order_id,ai.bill_status,ai.appointment_from,ai.appointment_id,ai.patient_id,ai.visit,ai.bill_id,ai.title,ai.start, ai.end,ai.googleMeet_link as link,si.first_name as staff_name,si.last_name as staff_lname')->from('tbl_appointments ai');
	    $this->db->join('tbl_patient_info pi','pi.patient_id = ai.patient_id');
	    $this->db->join('tbl_staff_info si','si.staff_id = ai.staff_id');
		$this->db->order_by('appointment_from','DESC');
		$query = $this->db->get();
	    return ($query->num_rows() > 0) ? $query->result_array() : false;

	}
	public function getrequestappointment(){  
		$this->db->distinct();
		$this->db->where('ai.client_id',$this->session->userdata('client_id'));
		$this->db->where('ai.t_status',1);
		$this->db->select('ai.order_id,ai.bill_status,ai.appointment_from,ai.appointment_id,ai.patient_id,ai.visit,ai.bill_id,ai.title,ai.start,ai.end')->from('tbl_appointments ai');
	    $this->db->join('tbl_patient_info si','si.mobile_no = ai.har_mob_no');  
		$this->db->order_by('appointment_from','DESC');
		$query = $this->db->get();
	    return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function add() {
		$pat = $this->input->post('Patient');
		$fname = explode(',',$pat);
		$patientData = $this->patient_model->editPatientinfo($this->input->post('Patient'));
		$patientName = $patientData['first_name'];
		$first = $patientData['first_name'];
		$last = $patientData['last_name'];
		$code = $patientData['patient_code'];
		$mobile = $patientData['mobile_no'];
		
		$staff_id=$_POST['Consultant'];
		$arrTreatmentDates = explode(",",$this->input->post('treatment_date'));
		
		$this->db->select('first_name, dr_color')->from('tbl_staff_info')->where('staff_id', $this->input->post('Consultant'));
		$staff = $this->db->get()->row();
		$staff_name = $staff->first_name;
		$clinic_name = $this->session->userdata('clinic_name');
		
		$settingsData = $this->settings_model->editSettings($this->session->userdata('client_id'));
		
		
		$notify_sms = $this->input->post('NotifySmsPatient');
		$notify_sms_morn = $this->input->post('NotifySmsPatientm');
		
		if($notify_sms == 1){
			$sms = 1;
		}else if($notify_sms_morn == 2){
			$sms = 2;
		}else{
			$sms = 0;
		}
		$var = date('H:i:s',strtotime($this->input->post('from')));
		$var1 = date('H:i:s',strtotime($this->input->post('to')));
		$date = explode(',',$this->input->post('treatment_date'));
		$val = $this->input->post('bill_gen'); //TP
		$val1 = $this->input->post('bill_gen2'); //DR
		$val2 = $this->input->post('bill_gen1'); //Invoice  
		
		$time =date('d-m-Y',strtotime($date[0])).' at '.date('h:i a',strtotime($this->input->post('from')));
		
		
		$treatments = $_POST['treatments'];
		$treatment_quantity = 1;
		$this->db->where('item_id',$_POST['treatments']);
		$this->db->select('*')->from('tbl_item');
		$v = $this->db->get();
		if($v->result_array() != false){
			$treatment_name = $v->row()->item_name;
			$treatment_desc = $v->row()->item_desc;
			$treatment_price = $v->row()->item_price;
		}
		
		//Invoice
		if($val2 == 1){
			$profileInfo = $this->registration_model->getProfileInfo($this->session->userdata('username'));
			if($profileInfo != false)
				$clientName = $profileInfo['first_name'].' '.$profileInfo['last_name'];
			else if($staffInfo != false)
				$clientName = $staffInfo['first_name'].' '.$staffInfo['last_name'];
			
			$total = $treatment_price * count($arrTreatmentDates);
			
			$bill_no= $this->generate_code_invoice();
			$cheque_date = '';
			$discount = '';
			
			$invoice_info = array(
				 'client_id' => $this->session->userdata('client_id'),
				 'bill_no' => $bill_no,
				 'patient_id' => $fname[0],
				 'staff_id' => $staff_id,
				 'treatment_date' => date('Y-m-d',strtotime(str_replace('/','-',$arrTreatmentDates[0]))),
				 'due_date' => date('Y-m-d',strtotime(str_replace('/','-',$arrTreatmentDates[0]))),
				 'notes' => $this->input->post('notes'),
				 'total_amt' => $total,
				 'tax_perc' => '',
				 'discount_perc' => '',
				 'net_amt' => $total,
				 'bill_status' => 0,
				 'generated_by' => $clientName,
				 'created_by' => $this->session->userdata('username'),
				 'created_date' => date('Y-m-d H:i:s'),
				 'modify_by' => $this->session->userdata('username'),
				 'modify_date' => date('Y-m-d H:i:s'),
			);
			
			$this->db->insert('tbl_invoice_header', $invoice_info);
			$bill_id=$this->db->insert_id();
			
			for($i=0; $i  < count($arrTreatmentDates); $i++)
			{
					$invdtl = array(
						 'treatment_date' => date('Y-m-d',strtotime(str_replace('/','-',$arrTreatmentDates[$i]))),
						 'client_id' => $this->session->userdata('client_id'),
						 'bill_id' => $bill_id,
						 's_no' => 1,
						 'item_id' => $treatments,
						 'staff_id' => $staff_id,
						 'item_desc' => $treatment_desc,
						 'item_quantity' => 1,
						 'item_price' => $treatment_price,
						 'item_amount' => $treatment_price,
						 'created_by' => $this->session->userdata('username'),
						 'created_date' => date('Y-m-d H:i:s'),
						 'modify_by' => $this->session->userdata('username'),
						 'modify_date' => date('Y-m-d H:i:s'),
					 );
					 $this->db->insert('tbl_invoice_detail', $invdtl);
			}
		} else {
			$bill_id = 0;
		} 
		//treatment Protocol
		if($val == '1'){
			if($bill_id != 0){
				$sta = 1;
			} else {
				$sta = 0;
			}
			for($i=0; $i  < count($arrTreatmentDates); $i++)
			{
				if($arrTreatmentDates[$i]!='')
				{   
							
							$this->db->where('treatment_date',date('Y-m-d',strtotime($arrTreatmentDates[$i])));
							$this->db->select('treatment_group_id')->from('tbl_patient_treatment_techniques');
							$res = $this->db->get();
							if($res->result_array() != false){
								$treatmentInfo = array(
									'client_id' => $this->session->userdata('client_id'),
									'patient_id' => $fname[0],
									'bill_id' => $bill_id,
									'treatment_date' => date('Y-m-d',strtotime(str_replace('/','-',$arrTreatmentDates[$i]))),
									'treatments' => $treatments,
									'treatment_quantity' => $treatment_quantity,
									'treatment_price' => $treatment_price,
									'staff_id' => $staff_id,
									'bill_status' => $sta,
									'treatment_group_id' => $res->row()->treatment_group_id,
									'created_by' => $this->session->userdata('username'),
									'created_date' => date('Y-m-d H:i:s'),
									'modify_by' => $this->session->userdata('username'),
									'modify_date' => date('Y-m-d H:i:s')
								);
							  $this->db->insert('tbl_patient_treatment_techniques', $treatmentInfo);
							  $treatment_id = $this->db->insert_id();
							} else {
								 $treatmentInfo = array(
									'client_id' => $this->session->userdata('client_id'),
									'patient_id' => $fname[0],
									'bill_id' => $bill_id,
									'treatment_date' => date('Y-m-d',strtotime(str_replace('/','-',$arrTreatmentDates[$i]))),
									'treatments' => $treatments,
									'treatment_quantity' => $treatment_quantity,
									'treatment_price' => $treatment_price,
									'staff_id' => $staff_id,
									'bill_status' => $sta,
									'treatment_group_id' => $this->treatmentGroupCode(),
									'created_by' => $this->session->userdata('username'),
									'created_date' => date('Y-m-d H:i:s'),
									'modify_by' => $this->session->userdata('username'),
									'modify_date' => date('Y-m-d H:i:s')
								);
								$this->db->insert('tbl_patient_treatment_techniques', $treatmentInfo);
						        $treatment_id = $this->db->insert_id(); 
						}
					
				}
				
			}
		} else {
			$treatment_id = 0;
		}
		// Daily Register
		if($val1 == 1){
			for($i=0; $i  < count($arrTreatmentDates); $i++)
			{
				if(date('Y-m-d',strtotime(str_replace('/','-',$arrTreatmentDates[$i]))) < date('Y-m-d') || date('Y-m-d',strtotime(str_replace('/','-',$arrTreatmentDates[$i]))) == date('Y-m-d')){
					$session_det = array(
						'client_id' => $this->session->userdata('client_id'),
						'patient_id' => $fname[0],
						'staff_id' => $staff_id,
						'patient_code' => $code,
						'sn_date' => date('Y-m-d',strtotime(str_replace('/','-',$arrTreatmentDates[$i]))),
						'Session_count' => 1,
						'item_id' => $treatments,
						'item_name' => $treatment_name,
						'repot_by' =>  $staff_id,
						'Comment_sess' => '',
						'fpatient_name' => $first,
						'lpatient_name' => $last,
						'created_by' => $this->session->userdata('username'),
						'created_date' => date('Y-m-d H:i:s'),
						'modify_by' => $this->session->userdata('username'),
						'modify_date' => date('Y-m-d H:i:s'),
						  
					);
					$this->db->insert('tbl_session_det',$session_det);
					$reg_id = $this->db->insert_id();
				} else {}
			}
		} else {
			$reg_id = 0;
		}
		$Chat_room="";
		if($this->input->post('e_type') == 2){
			$Chat_room=$fname[1]."-".$this->input->post('Consultant')."-".$this->session->userdata('client_id')."-".time();
		}
		for( $i = 0; $i < count($date); $i++){
			$insert[$i] = array(
					'staff_id' => $this->input->post('Consultant'),
					'client_id' => $this->session->userdata('client_id'),
					'notes' => $this->input->post('notes'),
					'start' =>date('Y-m-d',strtotime($date[$i])).' '.$var,
					'end' => date('Y-m-d',strtotime($date[$i])).' '.$var1,
					'appointment_from' => date('Y-m-d',strtotime($date[$i])),
					'appointment_to' => date('Y-m-d',strtotime($date[$i])),
					'patient_id' => $fname[0] ,
					'title' => $fname[1] ,
					'bill_id' =>$bill_id,
					'notify_email' => ($this->input->post('NotifyEmailPatient')) ? $this->input->post('NotifyEmailPatient') : 0,
					'notify_sms' => $sms,
					'item_id' => $this->input->post('treatments'),
					'firstvisit_followup' => $this->input->post('firstvisit_followup'),
					'encounter_type' => $this->input->post('e_type'),
					'chat_room'=>$Chat_room,
			);
			  
			
		}
		$this->db->insert_batch('tbl_appointments', $insert);
		$appointment_id = $this->db->insert_id();
		//sms  
                
                if($this->session->userdata('client_id')==1637)
                {

                $status=$this->calendarNotification($appointment_id);
                }  

		if(($this->input->post('NotifyEmailPatient'))) $this->emailNotification($appointment_id, 'patient');
		if(($this->input->post('NotifyEmailDoctor'))) $this->emailNotification($appointment_id, 'doctor');
		
		if(($this->input->post('NotifySmsPatient'))==1) {
			$profile_info = $this->registration_model->editProfile($this->session->userdata('client_id'));
				$sms_count = $profile_info['sms_count'];
				$totalsms_count = $profile_info['total_sms_limit'];
				if($totalsms_count > $sms_count ){
					$PatientSms = $this->smsNotification($appointment_id, 'patient');
				}
			
		} else {
			$PatientSms = '';
		}
		if(($this->input->post('NotifySmsDoctor'))==1) {
				$profile_info = $this->registration_model->editProfile($this->session->userdata('client_id'));
				$sms_count = $profile_info['sms_count'];
				$totalsms_count = $profile_info['total_sms_limit'];
				if($totalsms_count > $sms_count){
					$DoctorSms = $this->smsNotification($appointment_id, 'doctor');
				}
			
			} else {
				$DoctorSms = '';
			}
		
		//$str = 'Dear '.$patientName.', You have an appointment with '.$staff_name.' at '.$clinic_name.' on '.$time;
		$str = 'Dear '.$patientName.', Your appointment with '.$staff_name.' at '.$clinic_name.' has been booked successfully for '.$time;
		
		if($PatientSms != '' || $DoctorSms != '') {
			return array('sms' => true,'mobile'=> $mobile, 'Message'=> $str,'PatientUrl' => $PatientSms, 'DoctorUrl' => $DoctorSms);	
		} else {
			return array('sms' => false,'mobile'=> $mobile, 'Message'=> $str,'PatientUrl' => '', 'DoctorUrl' => '');
		}
	} 

     public function calendarNotification($appointment_id){
		
		$this->db->select('AT.start as startTime,AT.end as endTime, CT.clinic_name, CT.city, CT.state, CT.zipcode, CT.mobile, ST.first_name as DoctorName, ST.email as StaffEmail,PT.last_name as PatientlName, PT.first_name as PatientfName, PT.email as PatientEmail')->from('tbl_appointments AT');
		$this->db->join('tbl_staff_info ST', 'AT.staff_id = ST.staff_id');
		$this->db->join('tbl_patient_info PT', 'AT.patient_id = PT.patient_id');
		$this->db->join('tbl_client CT', 'AT.client_id = CT.client_id');
		$this->db->where('AT.appointment_id', $appointment_id);
		$query = $this->db->get();
		//echo $query->num_rows();
                $start="";
                $end="";
                $pat_email="";
                $doc_name="";
                $pat_name="";
		if($query->num_rows() > 0){
			$data = $query->row();
                        $start=$data->startTime;
                        $end=$data->endTime;
                        $pat_email=$data->PatientEmail;
                        $doc_email=$data->StaffEmail;
                        $doc_name=$data->DoctorName;
                        $pat_name=$data->PatientfName;
		}
                if($pat_email!='' && $doc_email!='')
                 {
                $startTime=(str_replace(" ","T",$start)).'+05:30';
                $endTime=(str_replace(" ","T",$end)).'+05:30';
                $patientemail=array('email' => $pat_email);
                $doctoremail=array('email' => $doc_email);
                $clinic=$this->session->userdata('clinic_name');
                $calHeader='Appointment At '.$clinic;
                $calDesc='Physiotheraphy Appointment of '.$pat_name.' with '.$doc_name;

                $client = new Google_Client();
            $client->setAuthConfig($_SERVER['DOCUMENT_ROOT'].'/vendor/OAuth_Credentials.json');
            $client->setAccessType('offline');
            $client->setPrompt('select_account consent');
	    $client->setApprovalPrompt('force');

             $client->setScopes(Google_Service_Calendar::CALENDAR);
          // $client->setRedirectUri('https://physioplustech.in/client/settings');
            //$client->setRedirectUri('https://physioplustech.in/client/dashboard/home');

            session_start();
           // $_SESSION['access_token'] =$accessToken;
                    $client->setAccessToken($_SESSION['access_token']);
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
   // echo "<script>alert('$calendarId')</script>";

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
}            */
         $service1 = new Google_Service_Calendar($client);
            $event = new Google_Service_Calendar_Event(array(
  'summary' => $calHeader,
  'description' => $calDesc,
  'start' => array(
    'dateTime' => $startTime
  ),
  'end' => array(
    'dateTime' => $endTime
  ),
  'attendees' => array(
    $doctoremail,
    $patientemail
  ),
  'conferenceData' => [
        'createRequest' => [
            'requestId' => 'sample123',
            'conferenceSolutionKey' => ['type' => 'hangoutsMeet']
        ]
    ]
  
));
     $calendarId ='primary';
     $event1 = $service1->events->insert($calendarId, $event,array('conferenceDataVersion' => 1,'sendUpdates' => 'all'));

      //echo "<script>alert('$event1->hangoutLink')</script>";
      $link=$event1->hangoutLink;
     $this->db->where('appointment_id', $appointment_id);
     $this->db->update('tbl_appointments', array('googleMeet_link' => $link));



           }//if email available
          return 1;
	}	


    public function generate_code_invoice() {
		$string  = 'B' ;
		//$this->db->select('bill_no')->from('tbl_invoice_header')->where('client_id',$this->session->userdata('client_id'))->like('bill_no', $string, 'after'); 
		$this->db->select('bill_no')->from('tbl_invoice_header')->where('client_id',$this->session->userdata('client_id'))->like('bill_no'); 
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $string . ($query->num_rows() + 1);
		} else {
			return $string . '1';
		}
	}
	public function treatmentGroupCode() {
		$string  = 'GRP/' ;
		$this->db->select('treatment_group_id')->from('tbl_patient_treatment_techniques')->where('client_id',$this->session->userdata('client_id'))->like('treatment_group_id', $string, 'after'); 
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $string . ($query->num_rows() + 1);
		} else {
			return $string . '1';
		}
	}	
	
	public function addAppointment1() {
		$pat = $this->input->post('pat_id1');
		$pat1 = $this->input->post('event-title1');
		$patientData = $this->patient_model->editPatientinfo($this->input->post('Patient'));
		$patientName = $patientData['first_name'];
		$this->db->select('first_name, dr_color')->from('tbl_staff_info')->where('staff_id', $this->input->post('Consultant'));
		$staff = $this->db->get()->row();
		
		$settingsData = $this->settings_model->editSettings($this->session->userdata('client_id'));
		$followupColor = $settingsData['followup_color'];
		
		if($this->input->post('firstvisit_followup')){
			$color = $followupColor;
		}else{
			$color = $staff->dr_color;
		}
		
		$notify_sms = $this->input->post('NotifySmsPatient');
		$notify_sms_morn = $this->input->post('NotifySmsPatientm');
		
		if($notify_sms == 1){
			$sms = 1;
		}else if($notify_sms_morn == 2){
			$sms = 2;
		}else{
			$sms = 0;
		}
		$var = date('H:i:s',strtotime($this->input->post('start_time')));
		$var1 = date('H:i:s',strtotime($this->input->post('end_time')));
	
		$date = explode(',',$this->input->post('apt_date'));
		for( $i = 0; $i < count($date); $i++){
		$insert = array(
				'color' => $color,
				'staff_id' => $this->input->post('Consultant'),
				'client_id' => $this->session->userdata('client_id'),
				'start' =>date('Y-m-d',strtotime($date[$i])).' '.$var,
				'end' => date('Y-m-d',strtotime($date[$i])).' '.$var1,
				'appointment_from' => date('Y-m-d',strtotime($date[$i])),
				'appointment_to' => date('Y-m-d',strtotime($date[$i])),
				'patient_id' => $pat,
				'title' => $pat1,
				'notify_email' => ($this->input->post('NotifyEmailPatient')) ? $this->input->post('NotifyEmailPatient') : 0,
				'notify_sms' => $sms,
				'item_id' => $this->input->post('treatments'),
				'firstvisit_followup' => $this->input->post('firstvisit_followup'),
		);
			$this->db->insert('tbl_appointments', $insert);
		}
		$appointment_id = $this->db->insert_id();
		if(($this->input->post('NotifyEmailPatient'))) $this->emailNotification($appointment_id, 'patient');
		if(($this->input->post('NotifyEmailDoctor'))) $this->emailNotification($appointment_id, 'doctor');
		
		if(($this->input->post('NotifySmsPatient'))==1) {
				$profile_info = $this->registration_model->editProfile($this->session->userdata('client_id'));
				$sms_count = $profile_info['sms_count'];
				$totalsms_count = $profile_info['total_sms_limit'];
				if($totalsms_count > $sms_count){
					$PatientSms = $this->smsNotification($appointment_id, 'patient');
				}
			
		} else {
			$PatientSms = '';
		}
		if(($this->input->post('NotifySmsDoctor'))==1) {
				$profile_info = $this->registration_model->editProfile($this->session->userdata('client_id'));
				$sms_count = $profile_info['sms_count'];
				$totalsms_count = $profile_info['total_sms_limit'];
				if($totalsms_count > $sms_count){
					$DoctorSms = $this->smsNotification($appointment_id, 'doctor');
				}
			
			} else {
				$DoctorSms = '';
			}
		if($PatientSms != '' || $DoctorSms != '') {
			return array('sms' => true, 'PatientUrl' => $PatientSms, 'DoctorUrl' => $DoctorSms);	
		} else {
			return array('sms' => false, 'PatientUrl' => '', 'DoctorUrl' => '');
		}
	} 
	
	public function getAll() {
		$this->db->distinct();
		$this->db->select('*')->from('tbl_appointments');
	    $query = $this->db->get();
	    return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function getCurrMonth() {
		$this->db->distinct();
		$curDate = date('m');
		$where = array('client_id' => $this->session->userdata('client_id'), 'DATE_FORMAT(start,"%m")' => $curDate,'status !=' => 2);
		$this->db->select('*')->from('tbl_appointments');
		$this->db->where($where);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function smsNotification($appointment_id, $notify_to) {
		$this->db->select('AT.start as Time, CT.clinic_name, CT.city,CT.mobile,CT.state, CT.zipcode, CT.mobile, ST.first_name as DoctorName, ST.email as StaffEmail, ST.mobile_no as StaffMobile, PT.mobile_no as PatientMobile, PT.first_name as PatientName, PT.email as PatientEmail')->from('tbl_appointments AT');
		$this->db->join('tbl_staff_info ST', 'AT.staff_id = ST.staff_id');
		$this->db->join('tbl_patient_info PT', 'AT.patient_id = PT.patient_id');
		$this->db->join('tbl_client CT', 'AT.client_id = CT.client_id');
		$this->db->where('AT.appointment_id', $appointment_id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$data = $query->row();
			$city = ($data->city != '') ? $data->city.'' : '';
			$mobile = ($data->mobile != '') ? $data->mobile.'' : '';
			$state = ($data->state != '') ? $data->state : '';
			$zip = ($data->zipcode != '') ? ' - '.$data->zipcode : '';
			$time = date('h:i a', strtotime($data->Time));
			$time1 = date('D jS M', strtotime($data->Time));
			$location = $city.$state.$zip;
			$profile_info = $this->registration_model->editProfile($this->session->userdata('client_id'));
			$sms_count = $profile_info['sms_count'];
			$sms_limit = $profile_info['total_sms_limit'];    
			$country = $profile_info['country']; 
			// if patient has mobile 
			if($data->PatientMobile != '' && $notify_to == 'patient') { 
				if($this->session->userdata('client_id') == '1948'){
				  $clinic_name1 = 'SUNSHINE SUPER SPECIALITY PHYSIOTHERAPY CLINIC';					
				 // $message_patient = 'Dear '.ucfirst($data->PatientName).', Your appointment with '.ucfirst($data->DoctorName).' at '.ucfirst($clinic_name1).' is confirmed at '.$time.' and '.$time1.', Any change/cancellation kindly inform us at least 12 hours in advance to avoid CHARGES('.$mobile.').';
				  
				   $message_patient = 'Dear '.ucfirst($data->PatientName).', Your appointment with '.ucfirst($data->DoctorName).' at '.ucfirst($clinic_name1).' is confirmed at '.$time.' and '.$time1.',For Any change/cancellation kindly inform us at least 12 hours in advance to avoid EXTRA CHARGES('.$mobile.')\n Thank You \n Physio Plus Tech';
				  
				  $patientSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=FISIYO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$data->PatientMobile.'&duplicateCheck=true&format=json&msg='.urlencode($message_patient);
				} else {
					 //$message_patient = 'Dear '.ucfirst($data->PatientName).', Your appointment with '.ucfirst($data->DoctorName).' at '.ucfirst($data->clinic_name).' is confirmed at '.$time.' and '.$time1.', Any change/cancellation kindly inform us at least 12 hours in advance to avoid CHARGES('.$mobile.').';
						
					$message_patient = 'Dear '.ucfirst($data->PatientName).', Your appointment with '.ucfirst($data->DoctorName).' at '.ucfirst($data->clinic_name).' is confirmed at '.$time.' and '.$time1.',For Any change/cancellation kindly inform us at least 12 hours in advance to avoid EXTRA CHARGES('.$mobile.') \n Thank You \n Physio Plus Tech.';
				  	

 				   $patientSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=FISIYO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$data->PatientMobile.'&duplicateCheck=true&format=json&msg='.urlencode($message_patient);
				}
				$sms['patient'] = 'DONE';
				  $patient_churl = @fopen($patientSmsURL,'r');
				  fclose($patient_churl);
				  if (!$patient_churl) {
						
				  } else {
						$sms_count+=1;
				  } 				
				
			}
			// if doctor has mobile 
			if($data->StaffMobile != '' && $notify_to == 'doctor') {
				if($this->session->userdata('client_id') == '1948'){
					 $clinic_name1 = 'SUNSHINE SUPER SPECIALITY PHYSIOTHERAPY CLINIC';	
					$message_doctor = 'Dear '.ucfirst($data->DoctorName).', You have an appointment with '.ucfirst($data->PatientName).' at '.ucfirst($clinic_name1).' on '.$time.' at ' . $location .'\n\n Thank You \n Physio Plus Tech';				
					$doctorSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=FISIYO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$data->StaffMobile.'&duplicateCheck=true&format=json&msg='.urlencode($message_doctor);
					$message_doctor = 'Dear '.ucfirst($data->DoctorName).', You have an appointment with '.ucfirst($data->PatientName).' at '.ucfirst($data->clinic_name).' on '.$time.' at ' . $location.'\n\nThank You\nPhysio Plus Tech';				
				} else{
					$doctorSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=FISIYO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$data->StaffMobile.'&duplicateCheck=true&format=json&msg='.urlencode($message_doctor);
				}  $sms['doctor'] = 'DONE';
				  $doctor_churl = @fopen($doctorSmsURL,'r');
				  fclose($doctor_churl);
				  if (!$doctor_churl) {
						
				  } else {
						$sms_count+=1;  
				  } 	
			}
			$this->db->where('client_id', $this->session->userdata('client_id'));  
			$this->db->update('tbl_client', array('sms_count' => $sms_count));
			return $sms;
		}
		
	}
	
	public function emailNotification($appointment_id, $notify_to) {
		$this->db->select('AT.start as Time, CT.clinic_name, CT.city, CT.state, CT.zipcode, CT.mobile, ST.first_name as DoctorName, ST.email as StaffEmail,PT.last_name as PatientlName, PT.first_name as PatientfName, PT.email as PatientEmail')->from('tbl_appointments AT');
		$this->db->join('tbl_staff_info ST', 'AT.staff_id = ST.staff_id');
		$this->db->join('tbl_patient_info PT', 'AT.patient_id = PT.patient_id');
		$this->db->join('tbl_client CT', 'AT.client_id = CT.client_id');
		$this->db->where('AT.appointment_id', $appointment_id);
		$query = $this->db->get();
		echo $query->num_rows();
		if($query->num_rows() > 0){
			$data = $query->row();
			$city = ($data->city != '') ? $data->city.', ' : '';
			$state = ($data->state != '') ? $data->state : '';
			$zip = ($data->zipcode != '') ? ' - '.$data->zipcode : '';
			$time = date('h:i A', strtotime($data->Time));
			$time1 = date('D jS M', strtotime($data->Time));
			$location = $city.$state.$zip;
			if($data->PatientEmail != '' && $notify_to == 'patient') {
				$patient = array(
					'Time' => $time,
					'Date' => $time1,
					'ClinicName' => ucfirst($data->clinic_name),
					'PersonName' => ucfirst($data->PatientfName).' '.ucfirst($data->PatientlName),
					'DoctorName' => ucfirst($data->DoctorName),
					'Location' => $location,
					'ClinicMobile' => $data->mobile
				);
				
				$patientMessage = $this->mail_model->patientAppointmentTemplate($patient);
				
				$patientMailConfig = array('clinic' => $data->clinic_name, 'to' => $data->PatientEmail, 'subject' => 'Email reminders for appointments', 'message' => $patientMessage);
				$this->mail_model->sendEmail($patientMailConfig);
			}
			
			// if doctor has email address
			if($data->StaffEmail != '' && $notify_to == 'doctor') {
				// doctor details for mail template
				$doctor = array(
					'Time' => $time,
					'ClinicName' => ucfirst($data->clinic_name),
					'DoctorName' => ucfirst($data->DoctorName),
					'PatientName' => ucfirst($data->PatientName),
					'Location' => $location,
					'ClinicMobile' => $data->mobile
				);
				// create email template
				$doctorMessage = $this->mail_model->doctorAppointmentTemplate($doctor);
				// mail config
				$doctorMailConfig = array('clinic' => $data->clinic_name, 'to' => $data->StaffEmail, 'subject' => $time.' @ '.$data->clinic_name, 'message' => $doctorMessage);
				// send mail
				$this->mail_model->sendEmail($doctorMailConfig);
			}
		}
		
	}
	
	public function delete($appointment_id)
	{
		$where = array('appointment_id' => $appointment_id);
		$this->db->where($where);
		$this->db->delete('tbl_appointments');
	}
	
	public function checkout($appointment_id)
	{
		$where = array('appointment_id' => $appointment_id);
		$this->db->where($where);
		$update = array('color' => '#2A0A0A', 'status' => 1);
		$this->db->update('tbl_appointments',$update);
	}
	
	public function cancelappoi($appointment_id,$Reson_cancel)
	{
		$where = array('appointment_id' => $appointment_id);
		$this->db->where($where);
		$update = array('status' => 2,'cancel_reson' => $Reson_cancel,'cancel_date' => date("Y-m-d"));
		$this->db->update('tbl_appointments',$update);
	}
	
	
	
	public function getTodaysScheduledCount()
	{
	
		$curDate = date('Y-m-d');
		$where = array('date_format(start,"%Y-%m-%d")' => $curDate,'status' => 0,'client_id' => $this->session->userdata('client_id'));
		$this->db->select('count(appointment_id) as totalcount')->from('tbl_appointments')->where($where);
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : 0; 
			

	}
	
	public function getTodaysCheckedCount()
	{
		$curDate = date('Y-m-d');
		$where = array('date_format(start,"%Y-%m-%d")' => $curDate,'status' => 1,'client_id' => $this->session->userdata('client_id'));
		$this->db->select('count(appointment_id) as totalcount')->from('tbl_appointments')->where($where);
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : 0;
	}
	
	public function getScheduleCount()
	{
		$this->db->where('status !=','2');
		$this->db->select('count(appointment_id) as totalcount')->from('tbl_appointments')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function getScheduleCount_status()
	{
		$this->db->where('status','0');
		$this->db->select('count(appointment_id) as totalcount')->from('tbl_appointments')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
    public function getcancelScheduleCount()
	{
		$this->db->where('status','2');
		$this->db->where('patient_id !=','');
		$this->db->select('count(appointment_id) as totalcount')->from('tbl_appointments')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}	
	
	public function createDateRangeArray($strDateFrom,$strDateTo) {
	  // takes two dates formatted as YYYY-MM-DD and creates an
	  // inclusive array of the dates between the from and to dates.

	  // could test validity of dates here but I'm already doing
	  // that in the main script

	  $aryRange=array();

	  $iDateFrom=mktime(1,0,0,substr($strDateFrom,5,2),     substr($strDateFrom,8,2),substr($strDateFrom,0,4));
	  $iDateTo=mktime(1,0,0,substr($strDateTo,5,2),     substr($strDateTo,8,2),substr($strDateTo,0,4));

	  if ($iDateTo>=$iDateFrom) {
		array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry

		while ($iDateFrom<$iDateTo) {
		  $iDateFrom+=86400; // add 24 hours
		  array_push($aryRange,date('Y-m-d',$iDateFrom));  
		}
	  }
	  return $aryRange;
	}	
	
	
	public function getcancelList()
	{
		$this->db->select('*')->from('tbl_appointments')->where('client_id', $this->session->userdata('client_id'),'status',2);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function smsNotify($app_id, $notify_to) {
		$this->db->select('AT.start as Time, CT.clinic_name, CT.city,CT.mobile,CT.state, CT.zipcode, CT.mobile,PT.mobile_no as PatientMobile, PT.first_name as PatientName, PT.email as PatientEmail')->from('tbl_appointments AT');
		$this->db->join('tbl_patient_info PT', 'AT.patient_id = PT.patient_id');
		$this->db->join('tbl_client CT', 'AT.client_id = CT.client_id');
		$this->db->where('AT.appointment_id', $app_id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$data = $query->row();
			$city = ($data->city != '') ? $data->city.', ' : '';
			$mobile = ($data->mobile != '') ? $data->mobile.', ' : '';
			$state = ($data->state != '') ? $data->state : '';
			$zip = ($data->zipcode != '') ? ' - '.$data->zipcode : '';
			$time = date('D jS M h:i a', strtotime($data->Time));
			$location = $city.$state.$zip;
			$profile_info = $this->registration_model->editProfile($this->session->userdata('client_id'));
			$sms_count = $profile_info['sms_count'];
			$country = $profile_info['country'];
			if($data->PatientMobile != '' && $notify_to == 'patient') {
				if($this->session->userdata('client_id') == '1948') {
					$clinic_name1 = 'SUNSHINE SUPER SPECIALITY PHYSIOTHERAPY CLINIC';
					//$message_patient = 'Dear '.ucfirst($data->PatientName).', We are pleased to confirm your appointment at '.ucfirst($clinic_name1).' on '.$time.'. For Details ' . $mobile;
					 
					$message_patient = 'Dear '.ucfirst($data->PatientName).', We are pleased to confirm your appointment at '.ucfirst($clinic_name1).' on '.$time.'. For Details contact ' . $mobile .'\n\n Thank You \n Physio Plus Tech';
					$patientSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=FISIYO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$data->PatientMobile.'&duplicateCheck=true&format=json&msg='.urlencode($message_patient);
			    } else {
					$message_patient = 'Dear '.ucfirst($data->PatientName).', We are pleased to confirm your appointment at '.ucfirst($data->clinic_name).' on '.$time.'. For Details contact ' . $mobile .'\n\n Thank You \n Physio Plus Tech';
					$patientSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=FISIYO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$data->PatientMobile.'&duplicateCheck=true&format=json&msg='.urlencode($message_patient);
				}
				$sms['patient'] = 'DONE';
				$patient_churl = @fopen($patientSmsURL,'r');
				fclose($patient_churl);
				$sms_count+=1;
				$this->db->where('client_id', $this->session->userdata('client_id'));
			    $this->db->update('tbl_client', array('sms_count' => $sms_count));
			    return $sms['patient'];
			}
			// if doctor has mobile 
			 
		}
		
	}
	public function smsAppCancelNotify($app_id, $notify_to) {
		$this->db->select('AT.start as Time, CT.clinic_name, CT.city,CT.mobile,CT.state, CT.zipcode, CT.mobile,PT.mobile_no as PatientMobile, PT.first_name as PatientName, PT.email as PatientEmail')->from('tbl_appointments AT');
		$this->db->join('tbl_patient_info PT', 'AT.patient_id = PT.patient_id');
		$this->db->join('tbl_client CT', 'AT.client_id = CT.client_id');
		$this->db->where('AT.appointment_id', $app_id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$data = $query->row();
			$city = ($data->city != '') ? $data->city.', ' : '';
			$mobile = ($data->mobile != '') ? $data->mobile.', ' : '';
			$state = ($data->state != '') ? $data->state : '';
			$zip = ($data->zipcode != '') ? ' - '.$data->zipcode : '';
			$time = date('D jS M h:i a', strtotime($data->Time));
			$location = $city.$state.$zip;
			$profile_info = $this->registration_model->editProfile($this->session->userdata('client_id'));
			$sms_count = $profile_info['sms_count'];
			$country = $profile_info['country'];
			if($data->PatientMobile != '' && $notify_to == 'patient') {
				if($this->session->userdata('client_id') == '1948') {
					$clinic_name1 = 'SUNSHINE SUPER SPECIALITY PHYSIOTHERAPY CLINIC';
					//$message_patient = 'Dear '.ucfirst($data->PatientName).', We are pleased to confirm your appointment at '.ucfirst($clinic_name1).' on '.$time.'. For Details ' . $mobile;
					
					$message_patient = 'Dear '.ucfirst($data->PatientName).', Your appointment at '.ucfirst($clinic_name1).' on '.$time.'. has been cancelled. For any queries kindly call ' . $mobile .'\n\n Thank You \n Physio Plus Tech';
					$patientSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=FISIYO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$data->PatientMobile.'&duplicateCheck=true&format=json&msg='.urlencode($message_patient);
			    } else {
					$message_patient = 'Dear '.ucfirst($data->PatientName).', Your appointment at '.ucfirst($data->clinic_name).' on '.$time.'. has been cancelled. For any queries kindly call ' . $mobile .'\n\n Thank You \n Physio Plus Tech';
					
					echo $patientSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=FISIYO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$data->PatientMobile.'&duplicateCheck=true&format=json&msg='.urlencode($message_patient);
					
				}
				$sms['patient'] = 'DONE';
				$patient_churl = @fopen($patientSmsURL,'r');
				fclose($patient_churl);
				$sms_count+=1;
				$this->db->where('client_id', $this->session->userdata('client_id'));
			    $this->db->update('tbl_client', array('sms_count' => $sms_count));
			    return $sms['patient'];
			}
			
			 
		}
	}	
	
	public function smsNotify_doc($app_id,$notify_to,$con_id) {
		$this->db->where('staff_id',$con_id);
		$this->db->select('first_name,email,mobile_no')->from('tbl_staff_info');
		$res=$this->db->get();
		$StaffMobile=$res->row()->mobile_no;
		$DoctorName = $res->row()->first_name;
		$this->db->select('AT.start as Time, CT.clinic_name, CT.city, CT.state, CT.zipcode, CT.mobile, AT.title as PatientName,AT.har_email as PatientEmail')->from('tbl_appointments AT');
		$this->db->join('tbl_client CT', 'AT.client_id = CT.client_id');
		$this->db->where('AT.appointment_id', $app_id);
		$query = $this->db->get();
		// if data exist for appointmentid
		if($query->num_rows() > 0){
			$data = $query->row();
			$city = ($data->city != '') ? $data->city.', ' : '';
			$state = ($data->state != '') ? $data->state : '';
			$zip = ($data->zipcode != '') ? ' - '.$data->zipcode : '';
			$time = date('D jS M h:i a', strtotime($data->Time));
			$location = $city.$state.$zip;
			$profile_info = $this->registration_model->editProfile($this->session->userdata('client_id'));
			$sms_count = $profile_info['sms_count'];
			$country = $profile_info['country'];
			if($StaffMobile != '') {
				if($this->session->userdata('client_id') == '1948') {
					$clinic_name1 = 'SUNSHINE SUPER SPECIALITY PHYSIOTHERAPY CLINIC';
				$message_doctor = 'Dear '.ucfirst($DoctorName).', You have an appointment with '.ucfirst($data->PatientName).' at '.ucfirst($clinic_name1).' on '.$time.' at ' . $location .'\n\n Thank You \n Physio Plus Tech';				
				$doctorSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=FISIYO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$mobile_no.'&duplicateCheck=true&format=json&msg='.urlencode($message_doctor);
					} else {
				$message_doctor = 'Dear '.ucfirst($DoctorName).', You have an appointment with '.ucfirst($data->PatientName).' at '.ucfirst($data->clinic_name).' on '.$time.' at ' . $location .'\n\n Thank You \n Physio Plus Tech';				
				$doctorSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=FISIYO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$mobile_no.'&duplicateCheck=true&format=json&msg='.urlencode($message_doctor);
						
				}
				$sms['doctor'] = 'DONE';
				$doctor_churl = @fopen($doctorSmsURL,'r');
				fclose($doctor_churl);
				$sms_count+=1;
			}
			$this->db->where('client_id', $this->session->userdata('client_id'));
			$this->db->update('tbl_client', array('sms_count' => $sms_count));
			return $sms;
			
		}
	
	}
	public function select_det(){
		
		$this->db->select('*')->from('tbl_appointments')->where('t_status','1');
	    $query = $this->db->get();
		return $query->result_array();
	}
	public function form_edit($id)
		{
			$this->db->where('appointment_id',$id);
			$this->db->set('t_status',0);
			$this->db->update('tbl_appointments');
			return true;
		}
		public function form_update($app_id)
		{
			
			$var = date('H:i:s',strtotime($this->input->post('time')));
			$var1 = date('H:i:s',strtotime($this->input->post('end_time')));
			$date =  str_replace('/','-',$this->input->post('appointment_from'));
		
			$data = array(
			'start' => date('Y-m-d',strtotime($date)).' '.$var,
			'end' => date('Y-m-d',strtotime($date)).' '.$var1,
			'appointment_from' => date('Y-m-d',strtotime($date)),
			'appointment_to' => date('Y-m-d',strtotime($date)),
			'notes' => $this->input->post('notes'),  
			);
			$this->db->where('appointment_id',$app_id);
			$this->db->update('tbl_appointments',$data); 
			
			$profile_info = $this->registration_model->editProfile($this->session->userdata('client_id'));
			$sms_count = $profile_info['sms_count'];
			$totalsms_count = $profile_info['total_sms_limit'];
			$country = $profile_info['country'];
			if($totalsms_count > $sms_count){
			$this->db->select('AT.start as Time, CT.clinic_name, CT.city,CT.mobile,CT.state, CT.zipcode, CT.mobile, ST.first_name as DoctorName, ST.email as StaffEmail, ST.mobile_no as StaffMobile, PT.mobile_no as PatientMobile, PT.first_name as PatientName, PT.email as PatientEmail')->from('tbl_appointments AT');
		    $this->db->join('tbl_staff_info ST', 'AT.staff_id = ST.staff_id');
		    $this->db->join('tbl_patient_info PT', 'AT.patient_id = PT.patient_id');
		    $this->db->join('tbl_client CT', 'AT.client_id = CT.client_id');
		    $this->db->where('AT.appointment_id', $app_id);
		    $query = $this->db->get();
				if($query->num_rows() > 0){
				   $data = $query->row();
				   $city = ($data->city != '') ? $data->city.'' : '';
				   $mobile = ($data->mobile != '') ? $data->mobile.'' : '';
				   $state = ($data->state != '') ? $data->state : '';
				   $zip = ($data->zipcode != '') ? ' - '.$data->zipcode : '';
				   $time = date('h:i a', strtotime($data->Time));
				   $time1 = date('D jS M', strtotime($data->Time));
				   $location = $city.$state.$zip;
				   if($this->session->userdata('client_id') == '1948'){
					$clinic_name1 = 'SUNSHINE SUPER SPECIALITY PHYSIOTHERAPY CLINIC';
				    $message_patient = 'Dear '.ucfirst($data->PatientName).', Your appointment request at '.ucfirst($data->clinic_name).' is rescheduled to '.$time.' on '.$time1.', if you want to change it, kindly call '.$mobile.'\n\n Thank You \n Physio Plus Tech';
				    $patientSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=FISIYO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$data->PatientMobile.'&duplicateCheck=true&format=json&msg='.urlencode($message_patient);
				   } else {
					   $clinic_name1 = 'SUNSHINE SUPER SPECIALITY PHYSIOTHERAPY CLINIC';
				       $message_patient = 'Dear '.ucfirst($data->PatientName).', Your appointment request at '.ucfirst($data->clinic_name).' is rescheduled to '.$time.' on '.$time1.', if you want to change it, kindly call '.$mobile.' \n\n Thank You \n Physio Plus Tech';
				        $patientSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=FISIYO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$data->PatientMobile.'&duplicateCheck=true&format=json&msg='.urlencode($message_patient);
				   }  $sms['patient'] = 'DONE';
				     $patient_churl = @fopen($patientSmsURL,'r');
					  fclose($patient_churl);
					  if (!$patient_churl) {
							
					  } else {
							$sms_count+=1;
					  }
					$this->db->where('client_id', $this->session->userdata('client_id'));  
					$this->db->update('tbl_client', array('sms_count' => $sms_count));					  
				}
			}
			return true;
				
		}
		public function form_update1()
		{
			$app_id = $this->input->post('appointment_id');
			$slot1 = $this->input->post('slot');
			$iDateFrom = $this->input->post('appointment_from');
			$str = str_replace('/','-',$iDateFrom);
			$date = date('Y-m-d', strtotime($str));
			$t1 = date('H:i:s',strtotime($this->input->post('time')));
			echo $t1;
			$app_start = $date.' '.$t1;
			$slot ='+'.$slot1.' minutes';
			$t2 =  date("H:i:s", strtotime($t1)+($slot1*60));
			$app_end = $date.' '.$t2;
			$data = array(
			'start' => $app_start,
			'end' => $app_end,
			'appointment_from' => $date,
			'appointment_to' => $date,
			);
			$this->db->where('appointment_id',$app_id);
			$this->db->update('tbl_appointments',$data);
			return true;
			
		}
		
		public function app() {
			$this->db->where('client_id',$this->session->userdata('client_id'));
			$this->db->select('days_display,days_display_after')->from('tbl_settings');
			$res = $this->db->get();
			$days = $res ->row()->days_display;
			$days1 = $res ->row()->days_display_after;
			if($days == '') {
				
			}
			else { 
				$date = date('Y-m-d');
				$day1 ='-'.$days.' day';
				$to = date('Y-m-d',strtotime($day1));
				$day2 ='+'.$days1.'day';
				$to1 = date('Y-m-d',strtotime($day2)); 
				if($to == false ) {
					$to == $date;
				} if($to1 == false ) {
					$to1 == $date;
				}  
				$where_condition = "(appointment_from >= '".$to."' AND appointment_from <='".$to1."')";
				$this->db->where($where_condition);
				//$this->db->where($where_condition1);
			} 
			$this->db->where('client_id',$this->session->userdata('client_id'));
			$this->db->where('status !=',2);
			$this->db->select('*')->from('tbl_appointments');
			$query = $this->db->get();
			return ($query->num_rows() > 0) ? $query->row_array() : false;
		}
		public function patient_det($title,$email,$start,$mobile) {
		$patient_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'first_name' => $title,
			'appoint_date' => date('Y-m-d',strtotime($start)),
			'mobile_no' => $mobile,
			'email' => $email,
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
			'patient_code' => $this->generate_code()
		);
		$this->db->insert('tbl_patient_info', $patient_info);
		
		$id = $this->db->insert_id();
		$app_id = $this->input->post('appointment_id');
			$slot1 = $this->input->post('slot');
			$iDateFrom = $this->input->post('appointment_from');
			$str = str_replace('/','-',$iDateFrom);
			$date = date('Y-m-d', strtotime($str));
			$t1 = date('H:i:s',strtotime($this->input->post('time')));
			echo $t1;
			$app_start = $date.' '.$t1;
			$slot ='+'.$slot1.' minutes';
			$t2 =  date("H:i:s", strtotime($t1)+($slot1*60));
			$app_end = $date.' '.$t2;
			$data = array(
			'start' => $app_start,
			'end' => $app_end,
			'appointment_from' => $date,
			'appointment_to' => $date,
			'patient_id' => $id,
		);
		$this->db->where('appointment_id',$app_id);
		$this->db->update('tbl_appointments',$data);
		$data = array('patient_id' => $this->db->insert_id(), 'first_name' => $this->input->post('first_name'));
		if($this->db->insert_id()){
			return $data;	
		} else {
			return false;	
		}
	}
	public function getpatient($id) 
	 {
		 $this->db->where('appointment_id',$id);
		 $this->db->select('*')->from('tbl_appointments');
		 $res = $this->db->get();
		 $title = $res->row()->title;
		 $data = array(
		 'first_name' => $res->row()->title,
			'first_name' => $res->row()->title,
			'email' => $res->row()->har_email,
			'mobile_no' => $res->row()->har_mob_no,
			'phone_no' => $res->row()->har_mob_no,
			'client_id' => $this->session->userdata('client_id'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'patient_code' => $this->generate_code1($title)	
		);
		 $this->db->insert('tbl_patient_info',$data);
		return true;
	 }
	public function generate_code() {
		$string  = 'P' . ucfirst(substr($this->input->post('gender'),0,1)) . ucfirst(substr($this->input->post('first_name'),0,1)) . '/' . date('my') . '/';
		$this->db->select('patient_code')->from('tbl_patient_info'); 
		if($this->session->userdata('all_locations') == true)
		{
			$this->db->where_in('client_id',$this->session->userdata('clientIds'));
		}else{
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
		$this->db->like('patient_code', $string, 'after');
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $string . ($query->num_rows() + 1);
		} else {
			return $string . '1';
		}
	}
	public function generate_code1($title) {
		$string  = 'PG' . ucfirst(substr($title,0,1)) . '/' . date('my') . '/';
		$this->db->select('patient_code')->from('tbl_patient_info'); 
		if($this->session->userdata('all_locations') == true)
		{
			$this->db->where_in('client_id',$this->session->userdata('clientIds'));
		}else{
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
		$this->db->like('patient_code', $string, 'after');
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $string . ($query->num_rows() + 1);
		} else {
			return $string . '1';
		}
	}
	public function bulk_delete($selected) {
		$val = explode(',',$selected);
		for( $i = 0; $i < count($val); $i++){
			$where = array('appointment_id' => $val[$i]);
			$this->db->where($where);
			$this->db->delete('tbl_appointments');
		}  
		return $selected; 
	}
	public function appointment_thatday() {
		$client_id = $this->session->userdata('client_id');
		if($this->uri->segment(4) == 'searchby'){
			$val = $this->uri->segment(6);
		  if($this->uri->segment(5) == 'PatientName') {
			  $this->db->where('pi.patient_id',$val);
		  } else if($this->uri->segment(5) == 'StaffName') {
			 $this->db->where('ai.staff_id',$val);
		  } else if($this->uri->segment(5) == 'Treatment') {
			$this->db->where('ai.item_id',$val);
		  } else {
		  }
		}
		$this->db->where('ai.status','0');
		$this->db->where('ai.client_id',$client_id);
		$this->db->where('ai.appointment_from',date('Y-m-d'));
		$this->db->select('ai.chat_room,ai.encounter_type,ai.order_id,ai.visit,ai.bill_id,ai.appointment_id,pi.first_name as pname,pi.last_name as pl_name,ai.start,ai.end,si.first_name as sname,si.last_name as sl_name,ai.staff_id,ai.item_id,pi.patient_code,pi.gender,pi.patient_id')->from('tbl_appointments ai');
		$this->db->join('tbl_patient_info pi','pi.patient_id=ai.patient_id');
		$this->db->join('tbl_staff_info si','si.staff_id=ai.staff_id');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function del_appointment($appointment_id){
		$where = array('appointment_id' => $appointment_id);
		$this->db->where($where);
		$this->db->delete('tbl_appointments');
		return $appointment_id;
	}
	public function add_consultant() {
		$this->db->where('staff_id',$this->input->post('consultantList'));
		$this->db->select('dr_color')->from('tbl_staff_info');
		$res = $this->db->get();
		$color = $res->row()->dr_color;
		$this->db->where('appointment_id',$this->input->post('appointment_id'));
		$this->db->set('staff_id',$this->input->post('consultantList'));
		$this->db->set('color',$color);
		$this->db->update('tbl_appointments');
	}
	public function get_todayappointment()
	{
		$this->db->where('status','0');
		$this->db->select('count(appointment_id) as totalcount')->from('tbl_appointments')->where('client_id', $this->session->userdata('client_id'));
		$this->db->where('appointment_from',date('Y-m-d'));
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function patient_list($id){
		
		$this->db->distinct();
		$this->db->where('tt.client_id',$this->session->userdata('client_id'));
		$this->db->where('tt.treatment_date',date('Y-m-d'));
		$this->db->where('tp.patient_id',$id);
		$this->db->select('tt.client_id,tt.treatment_id,tt.patient_id,tt.treatment_date,tt.treatments,tt.treatment_quantity,tt.treatment_price,tt.treatment_group_id,tt.bill_status,tt.staff_id,tp.first_name,tp.patient_code,it.item_name,si.dr_color,si.first_name,si.staff_id,it.item_id')->from('tbl_patient_treatment_techniques tt');
		$this->db->join("tbl_patient_info tp", "tt.patient_id=tp.patient_id");
		$this->db->join("tbl_item it", "tt.treatments=it.item_id");
		$this->db->join("tbl_staff_info si", "tt.staff_id=si.staff_id");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
		
		
	}
   public function T_addAppointment1() {
		
		$pat = $this->input->post('Patient');
		$fname = explode(',',$pat);
		$patientData = $this->patient_model->editPatientinfo($this->input->post('Patient'));
		$patientName = $patientData['first_name'];
		$this->db->select('first_name, dr_color')->from('tbl_staff_info')->where('staff_id', $this->input->post('Consultant'));
		$staff = $this->db->get()->row();
		$color = $this->input->post('dr_color');
		$var = date('H:i:s',strtotime($this->input->post('from')));
		$var1 = date('H:i:s',strtotime($this->input->post('end_time')));
		$treatment = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('treatment_date'))));
		
		$notify_sms = $this->input->post('NotifySmsPatient');
		$notify_sms_morn = $this->input->post('NotifySmsPatientm');
		
		if($notify_sms == 1){
			$sms = 1;
		}else if($notify_sms_morn == 2){
			$sms = 2;
		}else{
			$sms = 0;
		}
		
		$insert = array(
		        'color' => $color,
				'staff_id' => $this->input->post('Consultant'),
				'client_id' => $this->session->userdata('client_id'),
				'patient_id' => $fname[0] ,
				'appointment_from' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('treatment_date')))),
				'start' => $treatment .' '. $var,
				'end' => $treatment .' '. $var1,
 				'patient_id' => $this->input->post('patient_id'),
				'item_id' => $this->input->post('item_id'),
				'title' => $this->input->post('Patient')
		
		);
		$this->db->insert('tbl_appointments', $insert);
		
		
		$appointment_id = $this->db->insert_id();
		if(($this->input->post('NotifyEmailPatient'))) $this->emailNotification($appointment_id, 'patient');
		if(($this->input->post('NotifyEmailDoctor'))) $this->emailNotification($appointment_id, 'doctor');
		
		if(($this->input->post('NotifySmsPatient'))==1) {
			$PatientSms = $this->smsNotification($appointment_id, 'patient');
		} else {
			$PatientSms = '';
		}
		if(($this->input->post('NotifySmsDoctor'))==1) {
			$DoctorSms = $this->smsNotification($appointment_id, 'doctor');
		} else {
			$DoctorSms = '';
		}
		if($PatientSms != '' || $DoctorSms != '') {
			return array('sms' => true, 'PatientUrl' => $PatientSms, 'DoctorUrl' => $DoctorSms);	
		} else {
			return array('sms' => false, 'PatientUrl' => '', 'DoctorUrl' => '');
		}
		
		}
    public function app_can_appointment($appointment_id){
		
		$where = array('appointment_id' => $appointment_id);
		$this->db->where($where);
		$update = array('status' => 1,'cancel_date' => date("Y-m-d"));
		$this->db->update('tbl_appointments',$update);
	}			
}