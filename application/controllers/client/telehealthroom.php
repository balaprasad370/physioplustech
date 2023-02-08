<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Telehealthroom extends CI_Controller {


		public function __construct() {
		header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
		parent::__construct();
		$this->app_access->client();
		$this->load->model(array('service_model','common_model','patient_model', 'staff_model', 'schedule_model', 'settings_model','appoinment_model','assessment_model','registration_model'));
	}


	public function join()
	{
		$data['page_name'] = 'chatroom';
		$id = $this->uri->segment(4);
		$appoint_id = $this->uri->segment(4);
		$patient_id=$this->uri->segment(5);
		$data['patient_id']=$patient_id;
		$chat_room=$this->uri->segment(6);
		$otp=$this->generateNumericOTP(6);
		$this->appoinment_model->update_otp($appoint_id,$otp);  
		$this->patient_model->send_otp($patient_id,$otp,$appoint_id);
		$data['appoint_id'] = $appoint_id;
		$data['chatroom']=$chat_room;
		$this->db->where('patient_id',$patient_id);
		$this->db->select('*')->from('tbl_patient_info');
		$query = $this->db->get();
		$data['patient_info'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		
		$data['prov']=$this->common_model->getProvdiag($patient_id);
		$data['provDiagList']=$this->common_model->getProvdiagList();
		$data['patient']=$this->patient_model->editPatientinfo($patient_id);
		$data['referal_type']=$this->common_model->getReferaltype();
		$data['hip']=$this->patient_model->getHipMuscles();
		$data['medi_diag']=$this->patient_model->getMediDiag($patient_id);
		$data['knee']=$this->patient_model->getKneeMuscles();
		$data['ankle']=$this->patient_model->getAnkleMuscles();
		$data['toes']=$this->patient_model->getToesMuscles();
		$data['hallux']=$this->patient_model->getHalluxMuscles();
		$data['scapula']=$this->patient_model->getScapulaMuscles();
		$data['shoulder']=$this->patient_model->getShoulderMuscles();
		$data['elbow']=$this->patient_model->getElbowMuscles();
		$data['forearm']=$this->patient_model->getForearmMuscles();
		$data['wrist']=$this->patient_model->getWristMuscles();
		$data['fingers']=$this->patient_model->getFingersMuscles();
		$data['thumb']=$this->patient_model->getThumbMuscles();
		$data['headneck']=$this->patient_model->getHeadneckMuscles();
		$data['respiration']=$this->patient_model->getRespirationMuscles();
		$data['patient'] = $this->patient_model->editPatientinfo($patient_id);
		$data['history'] = $this->patient_model->viewHistory($patient_id);
		$data['chief_comp'] = $this->patient_model->viewChiefcomp($patient_id);
		$data['pain'] = $this->patient_model->viewPain($patient_id);
		$data['examn'] = $this->patient_model->viewExamn($patient_id);
		$data['mexamn'] = $this->patient_model->viewMexamn($patient_id);
		$data['sexamn'] = $this->patient_model->viewSexamn($patient_id);
		$data['medi_info'] = $this->patient_model->viewmediinfo($patient_id);
		$data['investigation'] = $this->patient_model->viewInvestigation($patient_id);
		$data['contribute_factor'] = $this->patient_model->viewcontribute_factor($patient_id);
		$data['rplans'] = $this->patient_model->viewrplans($patient_id);
		$data['ex_protocols'] = $this->patient_model->viewex_protocols($patient_id);  
		$data['prov_diag'] = $this->patient_model->viewProvdiag($patient_id);
		$data['goal'] = $this->patient_model->viewGoals($patient_id);
		$data['chart']=$this->patient_model->viewBodychart($patient_id);
		$data['case_notes'] = $this->patient_model->viewCaseNotes($patient_id);
		$data['assess'] = $this->patient_model->viewAssess($patient_id);
		$data['objects'] = $this->patient_model->viewObjects($patient_id);
		$data['subjects'] = $this->patient_model->viewSubjects($patient_id);
		$data['plans'] = $this->patient_model->viewPlans($patient_id);
		$data['prog_notes'] = $this->patient_model->viewProgNotes($patient_id);
		$data['remarks'] = $this->patient_model->viewRemarks($patient_id);
		$data['treatment'] = $this->patient_model->viewTreatments($patient_id);
		$data['paediatric_info'] = $this->patient_model->viewPaediatric($patient_id);
		$data['chart_detail'] = $this->patient_model->viewchart_detail($patient_id);
		$data['nuero_info'] = $this->patient_model->viewNuero($patient_id);
		$data['consent_form'] = $this->settings_model->list_consent($this->session->userdata('client_id'));
		$data['session_report']=$this->registration_model->getsession_report($patient_id);
		$data['concessGroup']=$this->common_model->getConcessGroups();
		$data['sign_detail'] = $this->patient_model->viewsign_detail($patient_id);
		
		$this->load->model('assessment_model');
		$data['shoulder_assess'] = $this->assessment_model->viewshoulder_detail($patient_id);
		$data['elbow_assess'] = $this->assessment_model->viewelbow_detail($patient_id);
		$data['foot_assess'] = $this->assessment_model->viewfoot_detail($patient_id);
		$data['knee_assess'] = $this->assessment_model->viewknee_detail($patient_id);
		$data['hip_assess'] = $this->assessment_model->viewhip_detail($patient_id);
		
		
		$this->load->model('appoinment_model');
		$data['apt_details'] = $this->appoinment_model->viewupappointment_detail($patient_id);
		$data['apt_details1'] = $this->appoinment_model->viewpreviousappointment_detail($patient_id);
		$data['invoice_details'] = $this->appoinment_model->viewinvoice_detail($patient_id);
		$data['daily_reg'] = $this->appoinment_model->viewregister_detail($patient_id);
		$data['item'] = $this->common_model->getItemNames();
		$data['consultants'] =$this->common_model->getstaff();
		$this->load->view('client/chat_room',$data);

     }



		public function addparticipant()
	{
 
		$email = $_POST['email'];
		$consult_name = $_POST['consult_name'];
		$appoint_id = $_POST['appoint_id']; 
		
		/* $email = 'contact@physioplusnetwork.com';  
		$consult_name ='Raj';
		$appoint_id = '72355'; */
	   $res=$this->patient_model->send_otp_invites($email,$consult_name,$appoint_id);
		if($res == true){
			$response['status'] = 'success';
			$response['message'] = "Invite sent successfully!!";
		} else {
			$response['status'] = 'error';
			$response['message'] = 'There is some error!!. Please Try again';
		}
		echo json_encode($response);

	}
// Function to generate OTP 
function generateNumericOTP($n) { 

    $generator = "1357902468"; 
  
    $result = ""; 
  
    for ($i = 1; $i <= $n; $i++) { 
        $result .= substr($generator, (rand()%(strlen($generator))), 1); 
    } 
  
    // Return result 
    return $result; 
} 
}