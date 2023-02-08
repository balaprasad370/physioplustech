<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Patient extends CI_Controller {
	public function __construct() {
	    header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");

		parent::__construct();  
		$this->app_access->client();
		$this->load->model(array('invoice_model','referal_model','common_model','patient_model','concessgroup_model','settings_model'));
		
	}
	
	public function index()
	{
		$data['page_name'] = 'patient';
		$data['specialists']=$this->common_model->getReferalspecialist();
		$data['referal_type']=$this->common_model->getReferaltype();
		$data['concessGroup']=$this->common_model->getConcessGroups();
		$this->load->view('client/patient_add',$data);
	}
	public function patient_add(){
		$patient_id=$this->input->post('patient_id');
		$edit_pinfo=$this->input->post('edit_pinfo');
		$edit_pcinfo=$this->input->post('edit_pcinfo');
		$referal_id=$this->input->post('referal_id');
		$referal_type_id=$this->input->post('referal_type_id');
		
		$profile_info = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$sms_count = $profile_info['sms_count'];
		$sms_limit = $profile_info['total_sms_limit'];
		$welcome_sms_notify = $profile_info['welcome_sms_notify'];
		$response = array();
		
		if($patient_id==''){
				if($patient = $this->patient_model->patient_info($sms_count,$sms_limit,$welcome_sms_notify)) {
					$response['pid'] = $patient;
					$response['status'] = 'success';
					$response['message'] = 'Patient info has been added successfully.';
				}
			}else{
				if($patient = $this->patient_model->edit_patient_info($patient_id,$edit_pinfo,$edit_pcinfo)) {
					$response['status'] = 'success';
					$response['message'] = 'Patient info has been updated successfully.';
					if($edit_pinfo == 'Y') {
						$response['responseHTML'] = $this->patient_model->basicInfoHTML($patient_id);
						$response['pInfoHTML'] = $this->patient_model->pInfoHTML($patient_id); 						
					} elseif($edit_pcinfo=='Y'){
						$response['responseHTML'] = $this->patient_model->contactInfoHTML($patient_id);
					}
				}
			}
		echo json_encode($response);
	}
	public function addProvDiagList() {
		$data['page_name'] = 'patient';
		$pdListName = $this->input->post('provDiag');
		$response = array();
		$alreadyExist = '';
		$where = array('pd_list_name' => $pdListName, 'client_id' => $this->session->userdata('client_id'));
		$this->db->select('pd_list_name')->from('tbl_prov_diagnosis_list')->where($where);
		$result=$this->db->get();
		if($result->num_rows()>0)
		{
			$alreadyExist = true;
		}else{
			$alreadyExist = false;
		}
		if($alreadyExist == true){
				$response['status'] = 'alreayExist';
				$response['warning'] = "Provisional diagnosis already exits";
		}else if($listData = $this->patient_model->addProvList()) {
				$response['status'] = 'success';
				$response['message'] = 'Provisional diagnosis list has been added successfully.';
				$response['listData'] = $listData;
		}
		echo json_encode($response);
	}
	public function add_concess_group() {
		$prov = $this->input->post('provDiag');
		$concessGroupId = $this->input->post('concess_group_id');
		if($concessGroupId == ''){
					if($concessionData = $this->concessgroup_model->concessGroupAdd_pat($prov)){
						$response['status'] = 'success';
						$response['message'] = 'Concession group has been added successfully.';
						$response['concessionData'] = $concessionData;
					}
			} else if($concessGroupId != '') {
					if($locationData = $this->concessgroup_model->concessGroupEdit($concessGroupId)) {
						$response['status'] = 'success';
						$response['message'] = 'Concession group has been updated successfully.';
					}
				} else { 
						$response['status'] = 'Failure';
						$response['message'] = 'Concession group has been updated successfully.';
						$response['concessionData'] = $this->input->post('provDiag');
				}
		echo json_encode($response);
	}
	public function group() {
		$data['page_name'] = 'patient';
		$p_id = $this->uri->segment(4);
		$this->load->view('client/add_group',$data);
	}
	public function patient_view(){
		$data['page_name'] = 'patient';
		$this->load->view('client/patient_views',$data);
	}
	public function getpatient() 
	{
		$concessionData = $this->patient_model->getpatient1();
		echo json_encode($concessionData);  
	}
	public function getreqpatient() 
	{
		$concessionData = $this->patient_model->getreqpatient();
		echo json_encode($concessionData);
	}
	public function gethomepatient() 
	{
		$concessionData = $this->patient_model->gethomepatient1();
		echo json_encode($concessionData);
	}
	public function edit_assessment_mexam($patient_id,$mexamn_id) {
		$data['page_name'] = 'patient';
		$data['patient_id']=$patient_id;
		$data['mexamn_id']=$mexamn_id;
		$data['patient']=$this->patient_model->editPatientinfo($patient_id);
		$data['mexamn']=$this->patient_model->getMotorexamn($patient_id,$mexamn_id);
		$data['hip']=$this->patient_model->getHipMuscles();
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
		$data['combine']=$this->patient_model->editMexamncombine($patient_id,$mexamn_id);
		$data['cervical']=$this->patient_model->editMexamncervical($patient_id,$mexamn_id);
		$data['thoraccic']=$this->patient_model->editMexamnthoraccic($patient_id,$mexamn_id);
		$data['lumber']=$this->patient_model->editMexamnlumber($patient_id,$mexamn_id);
		$data['respiration']=$this->patient_model->getRespirationMuscles();
		//print_r($data['mexamn']);
		$this->load->view('client/assessment_edit_mexam',$data);	
	}
	
	
	public function view() { 
		$data['page_name'] = 'patient';
		$id = $this->uri->segment(4);
		$patient_id = $this->uri->segment(4);
		$data['patient_id'] = $id;
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
		$this->db->where('patient_id',$id);
		$this->db->select('*')->from('tbl_patient_info');
		$query = $this->db->get();
		$data['patient_info'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		$data['session_report']=$this->registration_model->getsession_report($patient_id);
		$data['concessGroup']=$this->common_model->getConcessGroups();
		$data['sign_detail'] = $this->patient_model->viewsign_detail($patient_id);
		
		$from_date = '';
		$to_date = '';
		
		$this->load->model('assessment_model');
		$data['shoulder_assess'] = $this->assessment_model->viewshoulder_detail($patient_id,$from_date,$to_date);
		$data['elbow_assess'] = $this->assessment_model->viewelbow_detail($patient_id,$from_date,$to_date);
		$data['foot_assess'] = $this->assessment_model->viewfoot_detail($patient_id,$from_date,$to_date);
		$data['knee_assess'] = $this->assessment_model->viewknee_detail($patient_id,$from_date,$to_date);
		$data['hip_assess'] = $this->assessment_model->viewhip_detail($patient_id,$from_date,$to_date);
		
		$this->load->model('appoinment_model');
		$data['apt_details'] = $this->appoinment_model->viewupappointment_detail($patient_id);
		$data['apt_details1'] = $this->appoinment_model->viewpreviousappointment_detail($patient_id);
		$data['invoice_details'] = $this->appoinment_model->viewinvoice_detail($patient_id);
		$data['daily_reg'] = $this->appoinment_model->viewregister_detail($patient_id);
		$data['item'] = $this->common_model->getItemNames();
		$data['consultants'] =$this->common_model->getstaff();
		
		$this->load->model('cardio_assessment_model');
		$data['cardio_detail'] = $this->cardio_assessment_model->cardio_detail($patient_id,$from_date,$to_date);
		$data['post_detail'] = $this->cardio_assessment_model->post_detail($patient_id,$from_date,$to_date);
		$data['antenatal_detail'] = $this->assessment_model->antenatal_detail($patient_id,$from_date,$to_date);
		$data['neuro_detail'] = $this->assessment_model->neuro_detail($patient_id,$from_date,$to_date);
		$data['paediatric_detail'] = $this->assessment_model->paediatric_detail($patient_id,$from_date,$to_date);
		$data['ortho_detail'] = $this->assessment_model->ortho_detail($patient_id,$from_date,$to_date);
		$data['sports_detail'] = $this->assessment_model->sports_detail($patient_id,$from_date,$to_date);
		
		$this->load->view('client/patient_view',$data);
	}
	public function groupinvoice()
	{
		$data['page_name'] = 'patient';
		$this->load->helper(array('form'));
		$segment_array = $this->uri->segment_array();
		
		
		/* $do_date = array_search("date",$segment_array);
		if ($do_date !== FALSE)
		{
			$data['dateFilter'] = true;
			$patient_id = $this->uri->segment($do_date+1);
			$group_id = $this->uri->segment($do_date+2);
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+3))));
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+4))));
			$where_condition = "(treatment_date >= '".$from."' AND treatment_date = '".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
		}  */
		$patient_id = $this->input->post('patient_id');
		$group_id = $this->input->post('group_id');
		$from = date('Y-m-d',  strtotime(urldecode($this->input->post('fromdate'))));
		$to = date('Y-m-d',  strtotime(urldecode($this->input->post('todate'))));
		$where_condition = "(treatment_date >= '".$from."' AND treatment_date = '".$to."')";
		$data['from_date'] = date('d/m/Y', strtotime($from));
		$data['to_date'] = date('d/m/Y', strtotime($to));
		//$data['dateFilter'] = true;
		
		if($query = $this->invoice_model->groupInvoice($from,$to,$patient_id,$group_id))
		{
			
			$this->session->set_flashdata('message1', 'Invoice has been generated successfully.');
			echo 1;
			//redirect(base_url().'client/patient/view/'.$patient_id, 'refresh');
		}
		else
		{
			echo 0;
			//echo "<script>alert('Invalid Date Selected');</script>";
			//redirect(base_url().'client/patient/view/'.$patient_id, 'refresh');
		}
		
	}
	public function invoice_new()
	{
		$data['page_name'] = 'patient';
		$this->load->helper(array('form'));
		//$segment_array = $this->uri->segment_array();
		
		
		/* $do_date = array_search("date",$segment_array);
		if ($do_date !== FALSE)
		{
			$data['dateFilter'] = true;
			$patient_id = $this->uri->segment($do_date+1);
			$group_id = $this->uri->segment($do_date+2);
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+3))));
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+4))));
			$where_condition = "(treatment_date >= '".$from."' AND treatment_date = '".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
		} */ 
		$patient_id = $this->input->post('patient_id');
		$group_id = $this->input->post('group_id');
		$from = date('Y-m-d',  strtotime(urldecode($this->input->post('fromdate'))));
		$to = date('Y-m-d',  strtotime(urldecode($this->input->post('todate'))));
		$where_condition = "(treatment_date >= '".$from."' AND treatment_date = '".$to."')";
		$data['from_date'] = date('d/m/Y', strtotime($from));
		$data['to_date'] = date('d/m/Y', strtotime($to));
		$data['dateFilter'] = true;
		if($query = $this->invoice_model->groupInvoice($from,$to,$patient_id,$group_id))
		{
			
			$this->session->set_flashdata('message1', 'Invoice has been generated successfully.');
			echo 1;
			//redirect(base_url().'client/patient/view/'.$patient_id, 'refresh');
			
		}
		else
		{
			//echo "<script>alert('Invalid Date Selected');</script>";
			echo 0;
			//redirect(base_url().'client/patient/view/'.$patient_id, 'refresh');
		}
		
	}
	public function groupinvoice2()
	{
		$data['page_name'] = 'patient';
		$this->load->helper(array('form'));
		$patient_id = $this->uri->segment(5);
		$from = $this->uri->segment(6);
		$to = $this->uri->segment(7);
				
		if($query = $this->invoice_model->groupInvoice2($from,$to,$patient_id))
		{
			$this->session->set_flashdata('message1', 'Invoice has been generated successfully.');
			redirect(base_url().'client/patient/view/'.$patient_id, 'refresh');
		}
		else
		{
			echo "<script>alert('Invalid Date Selected');</script>";
			redirect(base_url().'client/patient/view/'.$patient_id, 'refresh');
		}
		
	}
	public function groupinvoice1()
	{  
		$data['page_name'] = 'patient';
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		
		$do_date = array_search("date",$segment_array);
		if ($do_date !== FALSE)
		{
			$data['dateFilter'] = true;
			$patient_id = $this->uri->segment($do_date+1);
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+2))));
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+3))));
			$where_condition = "(treatment_date >= '".$from."' AND treatment_date = '".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
		} 
		
		if($query = $this->invoice_model->groupInvoice1($from,$to,$patient_id))
		{
			$this->session->set_flashdata('message1', 'Invoice has been generated successfully.');
			redirect(base_url().'client/patient/view/'.$patient_id, 'refresh');
		}
		else
		{
			echo "<script>alert('Invalid Date Selected');</script>";
			redirect(base_url().'client/patient/view/'.$patient_id, 'refresh');
		}
		
	}
	public function edit_patient()
	{
		$patient_id = $this->input->post('patient_id');
		$edit_pinfo = $this->input->post('edit_pinfo');
		$edit_pcinfo = $this->input->post('edit_pcinfo');
		$result = $this->patient_model->edit_patient_info($patient_id,$edit_pinfo,$edit_pcinfo);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Body chart deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Body chart deleted successfully.';
		}
		echo json_encode($response);
	}
	public function edit_assessment_sexam($patient_id,$sexamn_id) {
		$data['page_name'] = 'patient';
		$data['patient_id']=$patient_id;
		$data['sexamn_id']=$sexamn_id;
		$data['patient']=$this->patient_model->editPatientinfo($patient_id);
		$data['sexamn']=$this->patient_model->editSexamn($patient_id,$sexamn_id);
		$this->load->view('client/assessment_edit_sexam',$data);	
	}
	public function add_case_notes() {
		$patient_id=$this->input->post('patient_id');
		$cn_id=$this->input->post('cn_id');
		$response = array();
		if($cn_id==''){
			$count = $this->patient_model->getPatientCnCount($patient_id);
			$query = $this->patient_model->addCaseNotes($patient_id);
			$response['status'] = $count;
			$response['responseHTML'] = $query;
		} else {
			if($query = $this->patient_model->edit_caseNotes($patient_id,$cn_id))
				{
					$response['status'] = 'success';
					$response['message'] = 'Doctor`s advice has been updated successfully.';
					
				}
		}
		echo json_encode($response);
	}
	public function add_object() {
		$patient_id=$this->input->post('patient_id');
		$object_id=$this->input->post('object_id');
		$response = array();
			if($object_id==''){
				if($query = $this->patient_model->add_object($patient_id))
				{
					//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Doctor`s advice has been added successfully.';
					
				}
			}else {
				if($query = $this->patient_model->editsoap_object($patient_id,$object_id))
				{
					$response['status'] = 'success';
					$response['message'] = 'Doctor`s advice has been updated successfully.';
					
				}
			}
			
		echo json_encode($response);
	}
	public function add_subject() {
		$patient_id=$this->input->post('patient_id');
		$subject_id=$this->input->post('subject_id');
		$response = array();
			if($subject_id==''){
				if($query = $this->patient_model->addsoap_subject($patient_id))
				{
					//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Doctor`s advice has been added successfully.';
					
				}
			}else {
				if($query = $this->patient_model->editsoap_subject($patient_id,$cn_id))
				{
					$response['status'] = 'success';
					$response['message'] = 'Doctor`s advice has been updated successfully.';
					
				}
			}
			
		echo json_encode($response);
	}
	public function add_assess() {
		$patient_id=$this->input->post('patient_id');
		$assess_id=$this->input->post('assess_id');
		$response = array();
			if($assess_id==''){
				if($query = $this->patient_model->add_assess($patient_id))
				{
					//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Doctor`s advice has been added successfully.';
					
				}
			}else {
				if($query = $this->patient_model->editsoap_assess($patient_id,$assess_id))
				{
					$response['status'] = 'success';
					$response['message'] = 'Doctor`s advice has been updated successfully.';
					
				}
			}
			
		echo json_encode($response);
	}
	public function add_plan() {
		$patient_id=$this->input->post('patient_id');
		$plan_id=$this->input->post('plan_id');
		$response = array();
			if($plan_id==''){
				$count = $this->patient_model->getPatientPlanCount($patient_id);
				$query = $this->patient_model->addsoap_plan($patient_id);
				$response['status'] = $count;
			    $response['responseHTML'] = $query;
			}else {
				if($query = $this->patient_model->editsoap_plan($patient_id,$plan_id))
				{
					$response['status'] = 'success';
					$response['message'] = 'Doctor`s advice has been updated successfully.';
					
				}
			}
			
		echo json_encode($response);
	}
	public function add_medical_diag() {
		$patient_id=$this->input->post('patient_id');
		$medi_id = $this->input->post('medi_id');
		$response = array();
			if($medi_id==''){
				$count = $this->patient_model->getPatientMedicalCount($patient_id);
				$query = $this->patient_model->addMedicalDiag($patient_id);
				$response['status'] = $count;
			    $response['responseHTML'] = $query;
			}else {
				if($query = $this->patient_model->editMedicalDiag($patient_id,$medi_id))
				{
					$response['status'] = 'success';
					$response['message'] = 'Doctor`s advice has been updated successfully.';
					
				}
			}
			
		echo json_encode($response);
	}
	public function edit_treatment_goals($patient_id,$goal_id) {
		$data['page_name'] = 'patient';
		$data['patient_id']=$patient_id;
		$data['goal_id']=$goal_id;
		$data['patient']=$this->patient_model->editPatientinfo($patient_id);
		$data['goals']=$this->patient_model->editGoals($patient_id,$goal_id);
		$this->load->view('client/treatment_edit_goals',$data);	
	}
	public function add_investigations() {
		
		$patient_id=$this->input->post('patient_id');
		$inves_id=$this->input->post('inves_id');
		// declare response array
		$response = array();
		// Form validation action
		
			if($inves_id==''){
				$count = $this->patient_model->getPatientInvesCount($patient_id);
				$query = $this->patient_model->investigation_info($patient_id);
				$response['status'] = $count;
			    $response['responseHTML'] = $query;
			}else{
				if($query = $this->patient_model->edit_investigation_info($patient_id,$inves_id))
				{
					//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Patient investigations has been added successfully.';
					$patient_id = $query['patient_id'];
					$id = $query['inves_id'];
					$response['responseData'] = $this->patient_model->editInvestigation($patient_id,$id);
					$response['responseData']['inves_date'] = date('d/m/Y', strtotime($response['responseData']['inves_date']));
				}
			}
			
		echo json_encode($response);
		
	}
	
	public function add_prog_notes() {
		$patient_id = $this->input->post('patient_id');
		$pn_id = $this->input->post('pn_id');
		$response = array();
		  if($pn_id == ''){
				$count = $this->patient_model->getPatientPnCount($patient_id);
				$query = $this->patient_model->addProgNotes($patient_id);
				$response['status'] = $count;
				$response['responseHTML'] = $query;
			} else {
				if($query = $this->patient_model->edit_progNotes($patient_id,$pn_id))
				{
					$response['status'] = 'success';
					$response['message'] = 'Doctor`s follow up has been updated successfully.';
				}
			}
			
		echo json_encode($response);
	}
	public function edit_treatment_provdiag($patient_id,$pd_id) {
		$data['page_name'] = 'patient';
		$patient_id = $data['patient_id']=$patient_id;
		$data['pd_id']=$pd_id;
		$data['provDiagList']=$this->common_model->getProvdiagList();
		$data['patient']=$this->patient_model->editPatientinfo($patient_id);
		$data['provdiag']=$this->patient_model->editProvdiag($patient_id,$pd_id);
		$this->load->view('client/treatment_edit_provdiag',$data);	
	}
	public function edit_treatment_medicaldiag($patient_id,$medi_id) {
		$data['page_name'] = 'patient';
		$patient_id = $data['patient_id']=$patient_id;
		$data['medi_id']=$medi_id;
		$data['medicalList']=$this->patient_model->editMeddiag($patient_id,$medi_id);
		$this->load->view('client/treatment_edit_medicaldiag',$data);	
	}
	
	public function add_prov_diag() {
		$patient_id = $this->input->post('patient_id');
		$pd_id = $this->input->post('pd_id');
		$response = array();
		
			if($pd_id == ''){
				$count = $this->patient_model->getPatientProvisionalCount($patient_id);
				$query = $this->patient_model->provdiag_info($patient_id);
				$response['status'] = $count;
			    $response['responseHTML'] = $query;
			} else {
				if($query = $this->patient_model->edit_provdiag_info($patient_id,$pd_id))
				{
					$response['status'] = 'success';
					$response['message'] = 'Doctor`s follow up has been updated successfully.';
				}
			}
			
		echo json_encode($response);
	}
	public function add_remarks() {
		$patient_id=$this->input->post('patient_id');
		$remark_id=$this->input->post('remark_id');
		// declare response array
		$response = array();
		// Form validation action
		
			if($remark_id==''){
				$count = $this->patient_model->getPatientRemarkCount($patient_id);
				$query = $query = $this->patient_model->addRemarks($patient_id);
				$response['status'] = $count;
				$response['responseHTML'] = $query;
			}else {
				if($query = $this->patient_model->edit_remarks($patient_id,$remark_id))
				{
					$response['status'] = 'success';
					$response['message'] = 'Remarks has been updated successfully.';
				
				}
			}
			
		// print json response
		echo json_encode($response);
	}
	public function add_history() {
		$patient_id=$this->input->post('patient_id');
		$his_id=$this->input->post('his_id');
		$patient_id=$this->input->post('patient_id');
		// declare response array
		$response = array();
			if($his_id==''){
				$count = $this->patient_model->getPatientHisCount($patient_id);
				$query = $this->patient_model->history_info($patient_id);
				$response['status'] = $count;
				$response['responseHTML'] = $query;
			}else {
				if($query = $this->patient_model->edit_history_info($patient_id,$his_id))
				{
					//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Patient history has been updated successfully.';
					$patient_id = $query['patient_id'];
					$id = $query['his_id'];
					$response['responseData'] = $this->patient_model->editHistory($patient_id,$id);
					$response['responseData']['his_date'] = date('d/m/Y', strtotime($response['responseData']['his_date']));
				}
			}
		
		echo json_encode($response);
		
	}
	public function edit_assessment_chiefcomp($patient_id,$cc_id) {
		$data['page_name'] = 'patient';
		$data['patient_id']=$patient_id;
		$data['cc_id']=$cc_id;
		$data['patient']=$this->patient_model->editPatientinfo($patient_id);
		$data['chiefcomp']=$this->patient_model->editChiefcomp($patient_id,$cc_id);
		$this->load->view('client/assessment_edit_chief',$data);	
	}
	public function edit_assessment_pain($patient_id,$pain_id) {
		$data['page_name'] = 'patient';
		$data['patient_id']=$patient_id;
		$data['pain_id']=$pain_id;
		$data['patient']=$this->patient_model->editPatientinfo($patient_id);
		$data['pain']=$this->patient_model->editPain($patient_id,$pain_id);
		$this->load->view('client/assessment_edit_pain',$data);	
	}
	public function edit_assessment_exam($patient_id,$examn_id) {
		$data['page_name'] = 'patient';
		$data['patient_id']=$patient_id;
		$data['examn_id']=$examn_id;
		$data['patient']=$this->patient_model->editPatientinfo($patient_id);
		$data['examn']=$this->patient_model->editExamn($patient_id,$examn_id);
		$this->load->view('client/assessment_edit_exam',$data);	
	}
	public function edit_investigation($patient_id,$inves_id) {
		$data['page_name'] = 'patient';
		$data['patient_id']=$patient_id;
		$data['inves_id']=$inves_id;
		$data['patient']=$this->patient_model->editPatientinfo($patient_id);
		$data['investigation']=$this->patient_model->editInvestigation($patient_id,$inves_id);
		$this->load->view('client/investigation_edit',$data);	
	}
	public function add_complaints() {
		$patient_id=$this->input->post('patient_id');
		$cc_id=$this->input->post('cc_id');
		$response = array();
		
		
			if($cc_id==''){
				$count = $this->patient_model->getPatientCcCount($patient_id);
				$query = $this->patient_model->complaint_info($patient_id);
				$response['status'] = $count;
				$response['responseHTML'] = $query;
			}else {
				if($query = $this->patient_model->edit_complaint_info($patient_id,$cc_id))
				{
					//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Patient complaints has been updated successfully.';
					$patient_id = $query['patient_id'];
					$id = $query['cc_id'];
					$response['responseData'] = $this->patient_model->editChiefcomp($patient_id,$id);
					$response['responseData']['cc_date'] = date('d/m/Y', strtotime($response['responseData']['cc_date']));
				}
			}
		
		// print json response
		echo json_encode($response);
		
	}
	public function add_goals() {
		$patient_id=$this->input->post('patient_id');
		$goal_id=$this->input->post('goal_id');
		$response = array();
		if($goal_id==''){
			    $count = $this->patient_model->getPatientGoalCount($patient_id);
				$query = $this->patient_model->goal_info($patient_id);
				$response['status'] = $count;
			    $response['responseHTML'] = $query;
			}else {
				if($query = $this->patient_model->edit_goal_info($patient_id,$goal_id))
				{
					//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Patient goals has been updated successfully.';
					$patient_id = $query['patient_id'];
					$id = $query['goal_id'];
					$response['responseData'] = $this->patient_model->editGoals($patient_id,$id);
					$response['responseData']['goal_date'] = date('d/m/Y', strtotime($response['responseData']['goal_date']));
				}
			}
		
		echo json_encode($response);
		
	}
	public function add_pain() {
		$patient_id=$this->input->post('patient_id');
		$pain_id=$this->input->post('pain_id');
		// declare response array
		$response = array();
		// Form validation action
			if($pain_id==''){
				$count = $this->patient_model->getPatientPainCount($patient_id);
				$query = $this->patient_model->pain_info($patient_id);
				$response['status'] = $count;
				$response['responseHTML'] = $query;
			}else{
				if($query = $this->patient_model->edit_pain_info($patient_id,$pain_id))
				{
					//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Patient pain has been updated successfully.';
					$patient_id = $query['patient_id'];
					$id = $query['pain_id'];
					$response['responseData'] = $this->patient_model->editPain($patient_id,$id);
					$response['responseData']['pain_date'] = date('d/m/Y', strtotime($response['responseData']['pain_date']));
				}
			}
			
		// print json response
		echo json_encode($response);
		
	}
	public function add_examination() {
		$patient_id=$this->input->post('patient_id');
		$examn_id=$this->input->post('examn_id');
		// declare response array
		$response = array();
		// Form validation action
		
			if($examn_id==''){
				$count = $this->patient_model->getPatientExamnCount($patient_id);
				$query = $this->patient_model->examination_info($patient_id);
				$response['status'] = $count;
				$response['responseHTML'] = $query;
			}else {
				if($query = $this->patient_model->edit_examination_info($patient_id,$examn_id))
				{
					//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Patient examination has been updated successfully.';
					$patient_id = $query['patient_id'];
					$id = $query['examn_id'];
					$response['responseData'] = $this->patient_model->editExamn($patient_id,$id);
					$response['responseData']['examn_date'] = date('d/m/Y', strtotime($response['responseData']['examn_date']));
				}
			}
		
		// print json response
		echo json_encode($response);
		
	}
	public function add_sexamination() {
		$patient_id=$this->input->post('patient_id');
		$sexamn_id=$this->input->post('sexamn_id');
		$response = array();
		   if($sexamn_id==''){
				$query = $this->patient_model->sexamination_info($patient_id);
				$response['status'] = 'success';
				$response['responseHTML'] = $query;
				
			}else{
				if($query = $this->patient_model->edit_sexamination_info($patient_id,$sexamn_id))
				{
					//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Patient motor examination has been updated successfully.';
					$patient_id = $query['patient_id'];
					$id = $query['sexamn_id'];
					$response['responseData'] = $this->patient_model->editSexamn($patient_id,$id);
					$response['responseData']['sexamn_date'] = date('d/m/Y', strtotime($response['responseData']['sexamn_date']));
				}
			}
		
		echo json_encode($response);
		
	}
	public function edit_assessment_paediatric($patient_id,$paediatric_id) {
		$data['page_name'] = 'patient';
		$data['patient_id']=$patient_id;
		$data['paediatric_id']=$paediatric_id;
		$data['patient']=$this->patient_model->editPatientinfo($patient_id);
		$data['paediatric']=$this->patient_model->editPaediatric($patient_id,$paediatric_id);
		$this->load->view('client/assessment_edit_paediatric',$data);	
	}
	public function edit_assessment_nuero($patient_id,$nuero_id) {
		$data['page_name'] = 'patient';
		$data['patient_id']=$patient_id;
		$data['nuero_id']=$nuero_id;
		$data['patient']=$this->patient_model->editPatientinfo($patient_id);
		$data['nuero']=$this->patient_model->editNuero($patient_id,$nuero_id);
		$this->load->view('client/assessment_edit_nuero',$data);	
	}
	public function add_paediatric() {
		$patient_id=$this->input->post('patient_id');
		$paediatric_id=$this->input->post('paediatric_id');
		$response = array();
			if($paediatric_id == ''){
				$count = $this->patient_model->getPatientPaediatric($patient_id);
				$query = $this->patient_model->paediatric_info($patient_id);
				$response['status'] = $count;
				$response['responseHTML'] = $query;
			}else {
				if($query = $this->patient_model->edit_paediatric_info($patient_id,$paediatric_id))
				{
					//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Paediatric examination has been updated successfully.';
					$patient_id = $query['patient_id'];
					$id = $query['paediatric_id'];
					$response['responseData'] = $this->patient_model->editPaediatric($patient_id,$id);
					$response['responseData']['paediatric_date'] = date('d/m/Y', strtotime($response['responseData']['paediatric_date']));
				}
			}
		// print json response
		echo json_encode($response);
		
	}
	public function add_nuero() {
		$patient_id=$this->input->post('patient_id');
		$nuero_id=$this->input->post('nuero_id');
		$response = array();
		if($nuero_id==''){
			   $count = $this->patient_model->getPatientNueroCount($patient_id);
			   $query = $this->patient_model->nuero_info($patient_id);
			   $response['status'] = $count;
			   $response['responseHTML'] = $query;
			}else {
				if($query = $this->patient_model->edit_nuero_info($patient_id,$nuero_id))
				{
					//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Patient Nuero examination has been updated successfully.';
					//$response['datas'] = $query['hip_tested'].'-'.$query['left_illiopeoas_tone'].'-'.$query['left_illiopeoas_power'].'-'.$query['left_illiopeoas_rom'];
					$patient_id = $query['patient_id'];
					$id = $query['nuero_id'];
					$response['responseData'] = $this->patient_model->editNuero($patient_id,$id);
					$response['responseData']['nuero_date'] = date('d/m/Y', strtotime($response['responseData']['nuero_date']));
				}
			}
			
		echo json_encode($response);
		
	}
	public function add_mexamination() {
		
		$patient_id=$this->input->post('patient_id');
		$mexamn_id=$this->input->post('mexamn_id');
		$response = array();
		if($mexamn_id==''){
			     $count = $this->patient_model->getPatientMexamnCount($patient_id);
				 $query = $this->patient_model->mexamination_info($patient_id);
				 $response['status'] = $count;
				 $response['responseHTML'] = $query;
			}else {
				if($query = $this->patient_model->edit_mexamination_info($patient_id,$mexamn_id))
				{
					//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Patient motor examination has been updated successfully.';
					//$response['datas'] = $query['hip_tested'].'-'.$query['left_illiopeoas_tone'].'-'.$query['left_illiopeoas_power'].'-'.$query['left_illiopeoas_rom'];
					$patient_id = $query['patient_id'];
					$id = $query['mexamn_id'];
					$response['responseData'] = $this->patient_model->editMexamn($patient_id,$id);
					$response['responseData']['mexamn_date'] = date('d/m/Y', strtotime($response['responseData']['mexamn_date']));
				}
			} 
			
		// print json response
		echo json_encode($response); 
		
	}
	public function edit_cnotes_prognotes($patient_id,$pn_id) {
		$data['page_name'] = 'patient';
		$data['patient_id']=$patient_id;
		$data['pn_id']=$pn_id;
		$data['patient']=$this->patient_model->editPatientinfo($patient_id);
		$data['prognotes']=$this->patient_model->editProgNotes($patient_id,$pn_id);
		$this->load->view('client/edit_prog_notes',$data);	
	}
	public function edit_cnotes_remarks($patient_id,$remark_id) {
		$data['page_name'] = 'patient';
		$data['patient_id']=$patient_id;
		$data['remark_id']=$remark_id;
		$data['patient']=$this->patient_model->editPatientinfo($patient_id);
		$data['remark']=$this->patient_model->editRemarks($patient_id,$remark_id);
		$this->load->view('client/edit_remarks',$data);	
	}
	public function edit_assessment_history($patient_id,$his_id) {
		$data['page_name'] = 'patient';
		$data['patient_id']=$patient_id;
		$data['his_id']=$his_id;
		$data['patient']=$this->patient_model->editPatientinfo($patient_id);
		$data['history']=$this->patient_model->editHistory($patient_id,$his_id);
		$this->load->view('client/edit_histry',$data);	
	}
	public function add_treatment_techniques($patient_id) {
		$data['page_name'] = 'patient';
		$data['patient']=$this->patient_model->editPatientinfo($patient_id);
		$data['patient_id'] = $patient_id;
		$data['item'] = $this->common_model->getItemNames();
		$data['consultants'] = $this->staff_model->getDoctors('staff_code, first_name, last_name, staff_id');
		$this->load->view('client/treatment_techniques_add',$data);	
	}
	public function edit_case_notes() {
		$data['page_name'] = 'patient';
		$data['cn_id'] = $this->uri->segment(4);
		$cn_id = $this->uri->segment(4);
		$patient_id = $this->uri->segment(5);
		$data['patient_id'] = $this->uri->segment(5);
		$data['patient']=$this->patient_model->editPatientinfo($patient_id);
		$data['casenotes']=$this->patient_model->editCaseNotes($patient_id,$cn_id);
		$this->load->view('client/edit_case_notes',$data);	
	}
	public function edit_subject() {
		$data['page_name'] = 'patient';
		$data['subject_id'] = $this->uri->segment(5);
		$subject_id = $this->uri->segment(5);
		$patient_id = $this->uri->segment(4);
		$data['patient_id'] = $this->uri->segment(4);
		$data['patient']=$this->patient_model->editPatientinfo($patient_id);
		$data['subjects']=$this->patient_model->editSubject($patient_id,$subject_id);
		$this->load->view('client/edit_soap_subject',$data);	
	}
	public function edit_object() {
		$data['page_name'] = 'patient';
		$data['object_id'] = $this->uri->segment(5);
		$object_id = $this->uri->segment(5);
		$patient_id = $this->uri->segment(4);
		$data['patient_id'] = $this->uri->segment(4);
		$data['patient']=$this->patient_model->editPatientinfo($patient_id);
		$data['objects']=$this->patient_model->editObject($patient_id,$object_id);
		$this->load->view('client/edit_soap_object',$data);	
	}
	public function edit_plan() {
		$data['page_name'] = 'patient';
		$data['plan_id'] = $this->uri->segment(5);
		$plan_id = $this->uri->segment(5);
		$patient_id = $this->uri->segment(4);
		$data['patient_id'] = $this->uri->segment(4);
		$data['patient']=$this->patient_model->editPatientinfo($patient_id);
		$data['plans']=$this->patient_model->editPlan($patient_id,$plan_id);
		$this->load->view('client/edit_soap_plan',$data);	
	}
	public function edit_assess() {
		$data['page_name'] = 'patient';
		$data['assess_id'] = $this->uri->segment(5);
		$assess_id = $this->uri->segment(5);
		$patient_id = $this->uri->segment(4);
		$data['patient_id'] = $this->uri->segment(4);
		$data['patient']=$this->patient_model->editPatientinfo($patient_id);
		$data['assess']=$this->patient_model->editAssess($patient_id,$assess_id);
		$this->load->view('client/edit_soap_assess',$data);	
	}
	
	public function caseNotesDelete($cn_id,$patient_id){
		$data['page_name'] = 'patient';
		$result = $this->patient_model->deleteCaseNotes($patient_id,$cn_id);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	}
	public function edit_assessment_medi($patient_id,$medi_id) {
		$data['page_name'] = 'patient';
		$data['patient_id']=$patient_id;
		$data['medi_info']=$medi_id;
		$data['medi']=$this->patient_model->edit_medi($patient_id,$medi_id);
		$this->load->view('client/iframe/edit_assessment_medi',$data);	
	}
	
	public function assessment_history_delete($patient_id,$his_id){
		$data['page_name'] = 'patient';
		$result = $this->patient_model->delete_history($patient_id,$his_id);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	}
	
	public function paediatricDelete($patient_id,$paediatric_id){
		$data['page_name'] = 'patient';
		$result = $this->patient_model->deletepaediatric($patient_id,$paediatric_id);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	}
	public function nueroDelete($patient_id,$nuero_id){
		$data['page_name'] = 'patient';
		$result = $this->patient_model->deletenuero($patient_id,$nuero_id);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	}
	public function body_delete($patient_id,$img_id){
		$data['page_name'] = 'patient';
		$result  = $this->patient_model->deletebody_chart($patient_id,$img_id);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	}
	
	
	public function assessment_chiefcomp_delete($patient_id,$cc_id){
		$result = $this->patient_model->delete_chiefcomp($patient_id,$cc_id);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	}
	
	public function assessment_pain_delete($patient_id,$pain_id){
		$data['page_name'] = 'patient';
		$result = $this->patient_model->delete_pain($patient_id,$pain_id);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	}
	
	public function assessment_examn_delete($patient_id,$examn_id){
		$data['page_name'] = 'patient';
		$result = $this->patient_model->delete_examn($patient_id,$examn_id);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	}
	
	public function assessment_mexamn_delete($patient_id,$mexamn_id){
		$data['page_name'] = 'patient';
		$result = $this->patient_model->delete_mexamn($patient_id,$mexamn_id);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	}
	
	public function assessment_sexamn_delete($patient_id,$sexamn_id){
		$data['page_name'] = 'patient';
		$result = $this->patient_model->delete_sexamn($patient_id,$sexamn_id);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	}
	public function DeleteTreatment_medical($patient_id,$medi_id){
		$data['page_name'] = 'patient';
		$result = $this->patient_model->delete_medical($patient_id,$medi_id);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	}
	
	
	public function inves_delete($patient_id,$inves_id){
		$data['page_name'] = 'patient';
		$result = $this->patient_model->delete_inves($patient_id,$inves_id);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	}
	
	
	public function assessment_provdiag_delete($patient_id,$pd_id){
		$data['page_name'] = 'patient';
		$result = $this->patient_model->delete_provdiag($patient_id,$pd_id);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	}
	
	
	public function assessment_goal_delete($patient_id,$goal_id){
		$data['page_name'] = 'patient';
		$result = $this->patient_model->delete_goal($patient_id,$goal_id);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	}
	
	
	
	public function progNotesDelete($patient_id,$pn_id){
		$data['page_name'] = 'patient';
		$result = $this->patient_model->deleteProgNotes($patient_id,$pn_id);
		 
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	}
	
	public function remarksDelete($patient_id,$remark_id){
		$data['page_name'] = 'patient';
		$result = $this->patient_model->deleteRemarks($patient_id,$remark_id);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	}
	
	public function treatmentTechniqueDelete($patient_id,$treatment_group_id){
		$treatmentGroupId = str_replace('_','/',$treatment_group_id);
		$result = $this->patient_model->deleteTreatmentTechnique($patient_id,$treatmentGroupId);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	}
	public function file_upload(){
		
		$result =array();
		$config['upload_path'] = './uploads/inves/';
		$config['allowed_types'] = "*";
		$config['max_size'] = '10000000M';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('file'))
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
	public function add_treatment()
	{
		$response=array();
		$prov = $this->input->post('provDiag');
		$result = $this->patient_model->add_treatment($_POST['prov']);
		if($result != '')
		{	
			$response['Treatment'] = $result;
			$response['status'] = 'Success';
			$response['message'] = 'Notes Has Been Added successfully.';
		}
		else{
			$response['status'] = 'failure';
			$response['message'] = 'Notes Has Been Added successfully.';
		}
		echo json_encode($response);
		
	}
	public function addTreatmentTechniques() {
		$patient_id=$this->input->post('patient_id');
		$re_date=$this->input->post('re_date');
		// declare response array
		$response = array();
		// Form validation action
		
			if($re_date == ''){
				if($query = $this->patient_model->addTreatmentTechniques($patient_id))
				{
					$response['status'] = 'success';
					$response['message'] = 'Treatment techniques has been added successfully.';
					$response['result'] = $query['patient_id'];
				} 
			} else {
				echo $re_date;
				if($query = $this->patient_model->edit_TreatmentTechniques($patient_id))
				{
					$response['status'] = 'success';
					$response['message'] = 'Doctor`s advice has been updated successfully.';
					$patient_id = $query['patient_id'];
					$id = $query['cn_id'];
					$response['responseData'] = $this->patient_model->editCaseNotes($patient_id,$id);
					$enteredBy = $response['responseData']['modify_by'];
					$profileInfo = $this->registration_model->getProfileInfo($enteredBy);
					$staffInfo = $this->staff_model->getStaffInfo($enteredBy);
					
					if($profileInfo != false)
						$clientName = $profileInfo['first_name'];
					else if($staffInfo != false)
						$clientName = $staffInfo['first_name'];
					
					$response['responseData']['cn_date'] = date('d/m/Y', strtotime($response['responseData']['cn_date']));
					$response['responseData']['entered_by'] = $clientName;
				}
			}
			
		echo json_encode($response);
	}
	public function delete(){
		$response=array();
		$this->patient_model->hasInvoice($_POST['p_id']);
		$result = $this->patient_model->delete_patient($_POST['p_id']);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		}
		echo json_encode($response);
	}
	public function req_confirm(){
		$response=array();
		$result = $this->patient_model->req_confirm($_POST['p_id']);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		}
		echo json_encode($response);
	}
	
	
	public function body_Chart_delete(){
		$response=array();
		$result = $this->patient_model->delete_body_chart($patient_id,$img_id);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Body chart deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Body chart deleted successfully.';
		}
		echo json_encode($response);
	}
	 public function body_chart(){
		$image = imagecreatefrompng($_POST['image']);
		$name =$_POST['id'];
		$id = uniqid();
		imagealphablending($image, false);
		imagesavealpha($image, true);
		imagepng($image, 'body_chart/test/uploads/wPaint-' . $id . '.png');
		echo '{"img": "/test/uploads/wPaint-' . $id . '.png"}';
		$image_name = 'wPaint-'.$id.'.png';
		$this->patient_model->body_save($image_name,$name);  
	 }
	 public function add_ref_Pat() {
		$prov = $this->input->post('provDiag');
		if($concessionData = $this->referal_model->add_patient($prov)){
			$response['status'] = 'success';
			$response['message'] = 'Referal  has been added successfully.';
			$response['PatientData'] = $concessionData;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
			
		}
		echo json_encode($response);
	}
	public function add_ref_Other() {
		$prov = $this->input->post('provDiag');
		if($concessionData = $this->referal_model->add_other($prov)){
			$response['status'] = 'success';
			$response['message'] = 'Referal  has been added successfully.';
			$response['OtherData'] = $concessionData;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
			
		}
		echo json_encode($response);
	}
	public function add_ref_Adv() {
		$prov = $this->input->post('provDiag');
		if($concessionData = $this->referal_model->add_Adv($prov)){
			$response['status'] = 'success';
			$response['message'] = 'Referal  has been added successfully.';
			$response['AdvData'] = $concessionData;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
			
		}
		echo json_encode($response);
	}
	public function add_ref_Web() {
		$prov = $this->input->post('provDiag');
		if($concessionData = $this->referal_model->add_Web($prov)){
			$response['status'] = 'success';
			$response['message'] = 'Referal  has been added successfully.';
			$response['WebData'] = $concessionData;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
			
		}
		echo json_encode($response);
	}
	public function add_ref_Insurance() {
		$prov = $this->input->post('provDiag');
		if($concessionData = $this->referal_model->add_Insurance($prov)){
			$response['status'] = 'success';
			$response['message'] = 'Referal  has been added successfully.';
			$response['InsuranceData'] = $concessionData;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
			
		}
		echo json_encode($response);
	}
	public function add_ref_Doctor() {
		$prov = $this->input->post('provDiag');
		if($concessionData = $this->referal_model->add_Doctor($prov)){
			$response['status'] = 'success';
			$response['message'] = 'Referal  has been added successfully.';
			$response['DoctorData'] = $concessionData;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
			
		}
		echo json_encode($response);
	}
	public function update_referal_info() {
		$patient_id=$this->input->post('patient_id');
		$referal_id=$this->input->post('referal_id');
		$referal_type_id=$this->input->post('referal_type_id');
		
		$this->db->where('patient_id',$patient_id);
		$this->db->set('referal_id',$referal_id);
		$this->db->set('referal_id',$referal_id);
		$this->db->update('tbl_patient_info');
		
		$profile_info = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$this->patient_model->emailNotification($patient_id);
		$sms_count = $profile_info['sms_count'];
		$sms_limit = $profile_info['total_sms_limit'];
	   $response = array();
		if($sms_count < $sms_limit)
			{
				if($query = $this->patient_model->updateReferalInfo($patient_id))
				{
					if($query['sms'] == true) {
						$response['sms'] = true;
						$response['referalUrl'] = $query['referalUrl'];
					} else {
						$response['sms'] = false;
					}
					$response['status'] = 'success';
					$response['message'] = 'Referal notification has been sent successfully.';
				}
			} else if($this->session->userdata('client_id') == '1636')  {
				if($query = $this->patient_model->updateReferalInfo($patient_id))
				{
					if($query['sms'] == true) {
						$response['sms'] = true;
						$response['referalUrl'] = $query['referalUrl'];
					} else {
						$response['sms'] = false;
					}
					$response['status'] = 'success';
					$response['message'] = 'Referal notification has been sent successfully.';
				}
			} else if($this->session->userdata('client_id') == '1809')  {
				if($query = $this->patient_model->updateReferalInfo($patient_id))
				{
					if($query['sms'] == true) {
						$response['sms'] = true;
						$response['referalUrl'] = $query['referalUrl'];
					} else {
						$response['sms'] = false;
					}
					$response['status'] = 'success';
					$response['message'] = 'Referal notification has been sent successfully.';
				}
			} 
			else {
				$response['status'] = 'failure';
				$response['flashData'] = 'You have reached the limits of your sms credits. please subscribe to www.physioplustech.com/smssubscribtion';
			
			}
		echo json_encode($response); 
	}
	public function change_status() {    
		$response=array();
		$result = $this->patient_model->change_status($_POST['p_id']);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		}
		echo json_encode($response);
	}
	public function body()
	{
		$this->load->view('client/body_chart');
	}
	public function body_chart_list(){
		$data['page_name'] = 'patient';
		$this->load->view('client/body_chartlist',$data);
	}
	public function DeletePlan($patient_id,$soap_plan_id){
		$data['page_name'] = 'patient';
		$result = $this->patient_model->delete_plan($patient_id,$soap_plan_id);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	}
	public function add_concess() {
		if($concessionData = $this->patient_model->add_concess()){
			$response['status'] = 'success';
			$response['message'] = 'Referal  has been added successfully.';
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
			
		}
		echo json_encode($response);
	}
	public function get_concess_det() {
		$prov = $this->input->post('provDiag');
		if($concessionData = $this->patient_model->get_concess_det($prov)){
			$response['status'] = 'success';
			$response['message'] = 'Referal  has been added successfully.';
			$response['tax_detail'] = $concessionData;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
			
		} 
		echo json_encode($response);
	}
	 
	public function reminder_sms() {
		$patient_id=$this->input->post('patient_id');
		$response = array();
			if($patient_id!==''){
				if($query = $this->patient_model->sms_add($patient_id))
				{
					//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Reminder Sms sent successfully.';
					
				}
			}else {
					$response['status'] = 'Failure';
					$response['message'] = 'Reminder Sms not sent successfully.';
					
				
			}
			
		echo json_encode($response);
	}
	public function add_group() {
		if($result = $this->patient_model->add_group()){
			$response['status'] = 'success';
			$response['message'] = 'Referal  has been added successfully.';
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	}
	public function close_episode() {
		$patient_id = $this->uri->segment(4);
		$result = $this->patient_model->close_episode();
        if($result != false){
			$response['status'] = 'success';
			$response['message'] = 'Episode info has been updated successfully.';
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Episode info has not been updated successfully.';
		} 
		//echo json_encode($response);
		redirect(base_url().'client/patient/view/'.$patient_id, 'refresh');
	} 
	public function add_patientaccess() { 
   	if($result = $this->patient_model->patientaccess()){
			$response['status'] = 'success';
			$response['message'] = 'Referal  has been added successfully.';
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	}
	public function consent_form($patient_id){
		$data['page_name'] = 'patient';
		$data['patient_info'] = $this->patient_model->selectpatient($patient_id);
		$data['consent_form'] = $this->settings_model->list_consent($this->session->userdata('client_id'));
		$this->load->view('client/consent_form',$data);
	}
	 public function consent_formadd(){
		 $this->patient_model->sign_save(); 
     } 
	public function consent_formadd1(){
		$provD = $this->input->post('provDiag');
		if($result = $this->patient_model->consent_formadd1($provD)){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
		
    }
	public function view_consent($patient_id,$consent_id) {
		$data['page_name'] = 'patient';
		$data['patient_id']=$patient_id;
		$data['consent_id']=$consent_id;
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$data['patient_info'] = $this->patient_model->selectpatient($patient_id);
		$data['sign_detail'] = $this->patient_model->viewsign_detail1($patient_id,$consent_id);
		$this->load->view('client/consent_view',$data);	
	}
	

	public function guard_form($patient_id){
		 $data['page_name'] = 'patient';
		 $data['patient_info'] = $this->patient_model->selectpatient($patient_id);
		 $this->load->view('client/consent_form1',$data);
	}
	public function guard_formadd(){
		 $this->patient_model->guard_save(); 
	} 
		
	public function photo_upload(){
		$patient_id = $this->uri->segment(4);
		$result =array();
		$config['upload_path'] = './uploads/patient/';
		$config['allowed_types'] = "*";
		$config['max_size'] = '10000000M';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('file'))
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
			
			$this->db->where('patient_id',$patient_id);
			$this->db->set('photo',$data['upload_data']['file_name']);
			$this->db->update('tbl_patient_info');
			
			$result['msg'] ='File Upload Successfully';
			$result['file_name'] = $data['upload_data']['file_name'];
		}
		echo json_encode($result);		
	}		
	public function treatmentTechniquereschedule(){
		$data['page_name'] = 'patient';
		$date =  date('Y-m-d',strtotime($this->uri->segment(5)));
		$patient_id =  $this->uri->segment(4);
		$this->db->where('patient_id',$patient_id);
		$this->db->where('treatment_date',$date);
		$this->db->select('ti.staff_id,ti.treatment_quantity,ti.treatment_price,ti.treatments,it.item_name')->from('tbl_patient_treatment_techniques ti');
		$this->db->join('tbl_item it','it.item_id=ti.treatments');
		$res = $this->db->get();
		$arr = array();
		$arr1 = array();
		$arr2 = array();
		$arr3 = array();
		$data['staff_id']=$res->row()->staff_id;
		foreach($res->result_array() as $row){
			array_push($arr,$row['item_name']);
			array_push($arr1,$row['treatment_price']);
			array_push($arr2,$row['treatments']);
			array_push($arr3,$row['treatment_quantity']);
		}
		$data['quantity'] = implode(',',$arr3);
		$data['treatments'] = implode(',',$arr);
		$data['price'] = implode(',',$arr1);
		$data['id'] = implode(',',$arr2);
		$data['item'] = $this->common_model->getItemNames();
		$data['consultants'] = $this->staff_model->getDoctors('staff_code, first_name, last_name, staff_id');
		$this->load->view('client/treatmentprotocols_reschedule',$data);
	
	}
	public function reschedule_protocols(){
		$patient_id = $this->input->post('patient_id');
		$result = $this->patient_model->treatment_details();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	
	}
	public function mobileapppatient_view(){
		$data['page_name'] = 'patient';
		$data['provDiagList']=$this->common_model->getProvdiagList();
		/*$data['back'] = base64_encode(end(explode("/index.php/",$_SERVER['PHP_SELF'])));*/
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 10;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
		
		$do_date = array_search("date",$segment_array);
		if ($do_date !== FALSE)
		{
			$data['dateFilter'] = true;
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+1))));
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+2))));
			$where_condition = "(pi.appoint_date >= '".$from."' AND pi.appoint_date <= '".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
			$this->db->where($where_condition);
		}
		$do_id = array_search("PatientId",$segment_array);
		if ($do_id !== FALSE)
		{
			$this->db->where('pi.patient_id',$this->uri->segment($do_id+1));
		}
		$do_mob = array_search("MobileNo",$segment_array);
		if ($do_mob !== FALSE)
		{
			$this->db->where('pi.mobile_no',$this->uri->segment($do_mob+1));
		}
		$do_ref = array_search("ReferedBy",$segment_array);
		if ($do_ref !== FALSE)
		{
			$this->db->where('pi.referal_name',$this->uri->segment($do_ref+1));
		}
		$do_diag = array_search("diagnosis",$segment_array);
		if ($do_diag !== FALSE)
		{
			$keyword = str_replace('_', '/', $this->uri->segment($do_diag+1));
			$this->db->where('pd.prov_diagnosis',$keyword);
			$this->db->join("tbl_patient_prov_diagnosis pd", "pd.patient_id=pi.patient_id");
				
		}
		
		$this->db->distinct();
		$this->db->select('count(*) as totalrows')->from('tbl_patient_info pi');
		$this->db->where('pi.app_approve',1);
		$this->db->where('pi.client_id',$this->session->userdata('client_id'));
		if($this->session->userdata('all_locations') == true)
		{
			$this->db->where_in('pi.client_id',$this->session->userdata('clientIds'));
		}else{
			$this->db->where('pi.client_id',$this->session->userdata('client_id'));
		}
		
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		
		//prepare active record for new query (with limit/offeset/orderby)
		$do_date = array_search("date",$segment_array);
		if ($do_date !== FALSE)
		{
			$data['dateFilter'] = true;
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+1))));
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment($do_date+2))));
			$where_condition = "(pi.appoint_date >= '".$from."' AND pi.appoint_date <= '".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
			$this->db->where($where_condition);
		} 
		$do_id = array_search("PatientId",$segment_array);
		if ($do_id !== FALSE)
		{
			$this->db->where('pi.patient_id',$this->uri->segment($do_id+1));
		}
		$do_mob = array_search("MobileNo",$segment_array);
		if ($do_mob !== FALSE)
		{
			$this->db->where('pi.mobile_no',$this->uri->segment($do_mob+1));
		}
		$do_ref = array_search("ReferedBy",$segment_array);
		if ($do_ref !== FALSE)
		{
			$this->db->where('pi.referal_name',$this->uri->segment($do_ref+1));
		}
		$do_diag = array_search("diagnosis",$segment_array);
		if ($do_diag !== FALSE)
		{
			$keyword = str_replace('_', '/', $this->uri->segment($do_diag+1));
			$this->db->where('pd.prov_diagnosis',$keyword);
			$this->db->join("tbl_patient_prov_diagnosis pd", "pd.patient_id=pi.patient_id");
				
		}     
		$this->db->distinct();
		$this->db->select('pi.patient_id,pi.patient_code,pi.appoint_date,pi.first_name,pi.last_name,pi.mobile_no,pi.email,pi.address_line1,pi.photo,pi.gender');
		$this->db->from("tbl_patient_info pi");
		$this->db->where('pi.app_approve',1);
		$this->db->where('pi.client_id',$this->session->userdata('client_id'));
		if($this->session->userdata('all_locations') == true)
		{
			$this->db->where_in('pi.client_id',$this->session->userdata('clientIds'));
		}else{
			$this->db->where('pi.client_id',$this->session->userdata('client_id'));
		}
		
		$this->db->order_by('pi.patient_id', 'desc');
		
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
		$data['patients'] = ($query->num_rows() > 0) ? $query->result_array() : false;
	
		
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
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$data['patient_name']=$this->common_model->getPatientname_app();
		$data['mobile']=$this->common_model->getmobileno();
		$data['patient_code']=$this->common_model->getpatientid();
		$data['name']=$this->common_model->getreferal_name();
		$this->load->view('client/approve_patients',$data);
	}
	public function approve_patient() {
		$response=array();
		$result = $this->patient_model->approve_patient();
		if($result != '')
		{			
			$response['status'] = 'Success';
			$response['message'] = 'Patient Has Been Approved successfully.';
		}
		else{
			$response['status'] = 'failure';
			$response['message'] = 'Patient Has Not Been Approved successfully.';
		}
		echo json_encode($response);
	}
	public function mobile_check() {
		$response=array();
		$mobile=$this->uri->segment(4);
		$result = $this->patient_model->mobile_check($mobile);
		if($result == '')
		{			
			$response['status'] = 'success';
			$response['message'] = 'Notes Has Been Added successfully.';
		}
		else{
			$response['status'] = 'error';
			$response['message'] = $result;
		}
		// print json response
		echo json_encode($response);
	}
	public function add_sexamn() {
		$data['page_name'] = 'patient';
		$pat_id = $this->uri->segment(4);
		$data['patient_info'] = $this->patient_model->get_patient_info($pat_id);
		$this->load->view('client/add_sexamn',$data);
	}
	public function today_patient_view(){
			$data['page_name'] = 'Dashboard';
			$data['result'] = $this->patient_model->get_today_list();
		    //$data['list'] = $this->patient_model->get_list();
			$data['T_patientCount'] = $this->patient_model->patientcount();
		    //$data['T_patcnt'] = $this->patient_model->patientcount1();
		    $this->load->view('client/today_patient_view',$data);
   }  
   public function add_exercise_protocol() {
		$prov = $this->input->post('exercise_id');
		$patient_id = $this->input->post('patient_id');
		if($prov == ''){
				$count = $this->patient_model->getPatientEPCount($patient_id);
				$query = $this->patient_model->add_exercise_protocol($prov);
				$response['status'] = $count;
			    $response['responseHTML'] = $query;
					
			} else if($prov != '') {
					if($locationData = $this->patient_model->edit_exercise_protocol($prov)) {
						$response['status'] = 'success';
						$response['message'] = 'Concession group has been updated successfully.';
					}
				} else { 
						$response['status'] = 'Failure';
						$response['message'] = 'Concession group has been updated successfully.';
						$response['concessionData'] = $this->input->post('provDiag');
				}
		echo json_encode($response);
	}
	public function edit_exercise_protocol($ex_id)
	{
		 $data['page_name'] = 'patient';
		 $data['ex_id'] = $ex_id;
		 $ex_id = $this->uri->segment('5');
		 $data['remark'] = $this->patient_model->edit_exercise_details($ex_id);
		 $this->load->view('client/editexercise_protocols',$data);
	}
	public function Deleteexercise_protocol($ex_id){
		$response=array();
		$result = $this->patient_model->Deleteexercise_protocol($ex_id);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Body chart deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Body chart deleted successfully.';
		}
		echo json_encode($response);
	}
	 public function split_item() {
		 
		$name = $_POST['s_name'];
		$val =  explode(',',$name);
		$arr = array();
		for($i = 0; $i < sizeof($val);$i++){
			$amount = explode('|',$val[$i]);
			array_push($arr,$amount[1]);
		}
		$res = implode(',',$arr);
		if($res != ''){
			$response['status'] = 'success';
			$response['message'] = $res;
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Body chart deleted successfully.';
		}
		echo json_encode($response);
		
	}
	public function add_contribute() {
		$patient_id=$this->input->post('patient_id');
		$contribute_id=$this->input->post('contribute_id');
		$response = array();
		if($contribute_id == ''){
			    $count = $this->patient_model->getPatientcontributeCount($patient_id);
				$query = $this->patient_model->contribute_info($patient_id);
				$response['status'] = $count;
			    $response['responseHTML'] = $query;
			}else {
				if($query = $this->patient_model->edit_contributeinfo($patient_id,$contribute_id))
				{
					//$this->session->set_flashdata('SucessMsg', '<div class="alert alert-success"> Patient info has been added successfully. </div>');
					$response['status'] = 'success';
					$response['message'] = 'Patient goals has been updated successfully.';
					$patient_id = $query['patient_id'];
					$id = $query['goal_id'];
					$response['responseData'] = $this->patient_model->editcontribute($patient_id,$id);
					$response['responseData']['goal_date'] = date('d/m/Y', strtotime($response['responseData']['goal_date']));
				}
			}
		
		echo json_encode($response);
		
	}
	public function edit_contribute() {
		$data['page_name'] = 'patient';
		$data['cn_id'] = $this->uri->segment(5);
		$cn_id = $this->uri->segment(5);
		$patient_id = $this->uri->segment(4);
		$data['patient_id'] = $this->uri->segment(4);
		$data['patient']=$this->patient_model->editPatientinfo($patient_id);
		$data['factors']=$this->patient_model->editcontribute($patient_id,$cn_id);
		$this->load->view('client/edit_contributes',$data);	
	}
	public function assessment_contribute_delete($patient_id,$c_id){
		$data['page_name'] = 'patient';
		$result = $this->patient_model->assessment_contribute_delete($patient_id,$c_id);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);  
	}
	public function add_rplan() {
		$patient_id=$this->input->post('patient_id');
		$plan_id=$this->input->post('plan_id');
		$response = array();
			if($plan_id==''){
				$count = $this->patient_model->getPatientrplanCount($patient_id);
				$query = $this->patient_model->addr_plan($patient_id);
				$response['status'] = $count;
			    $response['responseHTML'] = $query;
			}else {
				if($query = $this->patient_model->editr_plan($patient_id,$plan_id))
				{
					$response['status'] = 'success';
					$response['message'] = 'Doctor`s advice has been updated successfully.';
					
				}
			}
			
		echo json_encode($response);
	}
	public function edit_rplan() {
		$data['page_name'] = 'patient';
		$data['plan_id'] = $this->uri->segment(5);
		$plan_id = $this->uri->segment(5);
		$patient_id = $this->uri->segment(4);
		$data['patient_id'] = $this->uri->segment(4);
		$data['patient']=$this->patient_model->editPatientinfo($patient_id);
		$data['plans']=$this->patient_model->editrplan($patient_id,$plan_id);
		$this->load->view('client/edit_rplan',$data);	
	}
	public function Deleterplan($patient_id,$rplan_id){
		$data['page_name'] = 'patient';
		$result = $this->patient_model->delete_rplan($patient_id,$rplan_id);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	}
	
	public function otherupdate(){
		
		$data['page_name'] = 'patient';
		$patient_id = $this->input->post('patient_id');
		$result=$this->patient_model->otherupdate($patient_id); 
		if($result == 'True') {
			$response['status'] = 'success';
			$response['message'] = 'patient info Has Been Updated successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'patient info Has Been Updated failure.';
		}
		echo json_encode($response);  
	}
	public function hai() {
		$this->db->where('patient_id','187');
		$this->db->where('appointment_from >',date('Y-m-d'));
		$this->db->limit(1);
		$this->db->order_by('appointment_id','ASC');
		$this->db->select('appointment_id')->from('tbl_appointments');
		$res = $this->db->get();
		if($res->result_array() != false){
			$appointment_id = $res->row()->appointment_id;
			$this->db->where('appointment_id',$appointment_id);
			$this->db->set('remind',1);
			$this->db->update('tbl_appointments');
		}
	}
	
	
	public function consent_delete(){
		$data['page_name'] = 'patient';
		 $consent_id = $this->uri->segment(4);
		$response=array();
		$result = $this->patient_model->consent_delete($consent_id);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Consent deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Consent deleted successfully.';
		}
		echo json_encode($response);
		}

}

