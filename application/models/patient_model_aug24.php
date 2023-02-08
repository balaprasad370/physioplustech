<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Patient_model extends CI_Model 
{
	
	public function __construct() 
	{
		parent::__construct();
		$this->load->model(array('mail_model','registration_model','staff_model','referal_model','common_model','settings_model'));
		  // $this->load->library( 'nativesession' );	
	}
	public function getpatient1()
	{
		$this->db->select('pi.gender,pi.client_id,pi.episode_status,pi.patient_id,pi.patient_code,pi.appoint_date,pi.first_name,pi.last_name,pi.mobile_no,pi.email,pi.address_line1,pi.photo,pi.gender,pi.ref_no');
		$this->db->from("tbl_patient_info pi");
		$this->db->where('pi.app_approve !=',1);  
		$this->db->where('pi.home_visit !=',2);
		$this->db->where('pi.client_id',$this->session->userdata('client_id'));
		$this->db->order_by('pi.appoint_date', 'desc');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : 0;
	
	}
	public function getreqpatient()
	{
		$this->db->select('pi.gender,pi.client_id,pi.episode_status,pi.patient_id,pi.patient_code,pi.appoint_date,pi.first_name,pi.last_name,pi.mobile_no,pi.email,pi.address_line1,pi.photo,pi.gender');
		$this->db->from("tbl_patient_info pi");
		$this->db->where('pi.app_approve',1);  
		$this->db->where('pi.client_id',$this->session->userdata('client_id'));
		$this->db->order_by('pi.appoint_date', 'desc');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : 0;
	
	}
	public function gethomepatient1()
	{
		$this->db->select('pi.gender,pi.client_id,pi.episode_status,pi.patient_id,pi.patient_code,pi.appoint_date,pi.first_name,pi.last_name,pi.mobile_no,pi.email,pi.address_line1,pi.photo,pi.gender,pi.ref_no');
		$this->db->from("tbl_patient_info pi");
		$this->db->where('pi.app_approve !=',1);
		$this->db->where('pi.home_visit',2);
		$this->db->where('pi.client_id',$this->session->userdata('client_id'));
		$this->db->order_by('pi.appoint_date', 'desc');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : 0;
	
	}
	public function add_visit($appointment_id){
		$this->db->where('appointment_id',$appointment_id);
		$this->db->select("ai.patient_id,ai.appointment_from,ai.appointment_id,ai.title,ai.item_id,ai.staff_id")->from('tbl_appointments ai');
		$res = $this->db->get();
		if($res->result_array() != false){
			$this->db->where('item_id',$res->row()->item_id);
			$this->db->select("item_name")->from('tbl_item');
			$q = $this->db->get();
			if($q->result_array() != false){
				$item = $q->row()->item_name;
			} else {
				$item = '';
			}
			$session_det = array(					
			    'client_id' => $this->session->userdata('client_id'),
					'patient_id' => $res->row()->patient_id,					'staff_id' => $res->row()->staff_id,
					'sn_date' => date('Y-m-d',strtotime($res->row()->appointment_from)),
					'Session_count' => 1,
				    'item_id' => $res->row()->item_id,					'item_name' => $item,
				    'repot_by' =>  $res->row()->staff_id,					'Comment_sess' => '',
					'fpatient_name' => $res->row()->title,
				    'created_by' => $this->session->userdata('username'),
					'created_date' => date('Y-m-d H:i:s'),
				    'modify_by' => $this->session->userdata('username'),
					'modify_date' => date('Y-m-d H:i:s'),
				
				);
				$this->db->insert('tbl_session_det',$session_det);
		}
		$this->db->where('appointment_id',$appointment_id);
		$this->db->set('visit','1');
		$this->db->update('tbl_appointments');
		return $appointment_id; 
	}
	public function patient_info($sms_count,$sms_limit,$welcome_sms_notify)
	{
		$referal_type_id = $this->input->post('referal_type_id');
		$referal_id = $this->input->post('referal_id');
		$email = $this->input->post('email');
		$mobile_no = $this->input->post('mobile_no');
		if($this->input->post('dob') != '')
		{
			$dob = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('dob'))));
		}
		else
		{
			$dob = '';
		}
		if($email != '')
		{
			$this->sendmail($email);
		}
	 
		$val = $this->input->post('category');
		if($val == '1')
		{
			$home = '1';
		} 
		else {
			$home = '2';
		 }
		 
		$patient_info = array(
			'referal_type_id' => $referal_type_id,
			'referal_id' => $referal_id,
			'referal_name' => $this->input->post('referal_id'),
			'client_id' => $this->session->userdata('client_id'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'appoint_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('appoint_date')))),
			'home_visit' => $home,
			'gender' => $this->input->post('gender'),
			'dob' => $dob,
			'age' => $this->input->post('age'),
			'ref_no' => $this->input->post('ref_no'),
			'dominance' => $this->input->post('dominance'),
			'concess_group_id' => $this->input->post('concess_group_id'),
			'aadhar_id' => $this->input->post('aadhar_id'),
			'occupation' => $this->input->post('occupation'),
			'food_habits' => $this->input->post('food_habits'),
			'marital_status' => $this->input->post('marital_status'),
			'height' => $this->input->post('height'),
			'weight' => $this->input->post('weight'),
			'bmi' => $this->input->post('bmi'),
			'consan_marriage' => $this->input->post('consan_marriage'),
			'address_line1' => $this->input->post('address_line1'),
			'address_line2' => $this->input->post('address_line2'),
			'city' => $this->input->post('city'),
			'pincode' => $this->input->post('pincode'),
			'mobile_no' => $this->input->post('mobile_no'),
			'phone_no' => $this->input->post('phone_no'),
			'email' => $this->input->post('email'),
			'contact_person_name' => $this->input->post('contact_person_name'),
			'contact_person_mobile' => $this->input->post('contact_person_mobile'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
			'patient_code' => $this->generate_code()
		);
		
		$this->db->insert('tbl_patient_info', $patient_info);
		$patient_id = $this->db->insert_id();
		 if($mobile_no != ''){
			if($sms_limit > $sms_count || $this->session->userdata('client_id') == '1636' || $this->session->userdata('client_id') == '1809' ){
				if($welcome_sms_notify == 1) {
				 $this->smsNotify($mobile_no,$patient_id);
				}
			} else {
			}
		 }
         
		if($this->session->userdata('client_id') == '2047'){
				   $title = $this->input->post('first_name').' '.$this->input->post('last_name');

					$this->db->select('clinic_name,logo')->from('tbl_client')->where('client_id',2047);
					$res = $this->db->get();
					$clinic_name = $res->row()->clinic_name;
					$info = $res->row()->logo;
					$admin_logo = base_url().'uploads/logo/'.$info;
					 
					$date = date('d-m-y');
					$this->load->helper('path');
					$this->load->helper('directory'); 
					$this->load->library('email');
					  $config = Array(
						  'protocol' => 'smtp',
						  'smtp_host' => 'smtp.sendgrid.net',
						  'smtp_port' => 465,
						  'smtp_user' => 'physiotechasia', // change it to yours
						  'smtp_pass' => 'Physioasia@2019', // change it to yours
						  'mailtype' => 'html',
						  'charset' => 'iso-8859-1',
						  'wordwrap' => TRUE
						);
					  $this->load->library('email', $config);
					  $this->email->set_newline("\r\n");
					  $this->email->from('no-reply@physioplustech.in.',$clinic_name); 
					  $path = set_realpath('uploads/mail/');
					  $file_names = directory_map($path);
					  $template='<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
					  
					<tr>
					<td align="center">
					<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
						<tr>
							<td class="actions text-center">
								<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
									<tr>
										<td class="actions text-center">
											<table width="450px" align="center">
												<tr>
													<td align="center">
															<img style="float:left; width:150px; height:120px;"  src=" '.$admin_logo.' ">
													</td>
												 </tr>
												<tr>
													<td class="actions text-center">
														<table width="570px" align="center" bgcolor="#FFFFFF">
															<tr>
																<td colspan = "2">
																<p style="color:#666;padding-left:25px;font-size:120%">Dear '.$title.',</p>
																</td>
																
															</tr>
															<tr>
															<td  colspan = "2">
																<p style="color:#666;padding-left:25px;font-size:120%">We are pleased to welcome you to the PHYSIOFIT Physiotherapy clinic.   </p>
															</td>
															</tr><tr>
															<td  colspan = "2">
																<p style="color:#666;padding-left:25px;font-size:120%">
															Providing you the best physiotherapy treatment along with counseling to keep you functional and to relieve your symptoms is our top priority.
															</p></td>
															</tr><tr>
																<td  colspan = "2">
																	<p style="color:#666;padding-left:25px;font-size:120%">We look forward to a continued relationship with you.</p>
																</td>
															</tr>
															<tr>
																<td  colspan = "2">
																	<p style="color:#666;padding-left:25px;font-size:120%">You can stay connected with us and get health tips through,</br>
																			<a href="https://www.facebook.com/PHYSIOFITsurat-534743370212354/?ti=as" >https://www.facebook.com/PHYSIOFITsurat-534743370212354/?ti=as</a></p>
																</td>
															</tr>
															
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://physioplus.pk/"> www.physioplustech.in</a></p>
								<p style="text-align:center; color:#CCC;">World`s Best Web-based Clinic Management Software for Physiotherapists</p>
							</td>
						</tr>
					</table>
					</td>
					</tr>
					</table>';
					
					$this->email->to($email);
					$this->email->subject('Congratulations! Welcome to PHYSIOFIT');
					$this->email->message($template);
					$this->email->send(); 

			}

		 
		return $patient_id;		
	}
	function delete_medical($patient_id,$medi_id){
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$where = array('patient_id' => $patient_id,'medi_id' => $medi_id);
		$this->db->where($where);
		$this->db->delete('tbl_patient_medi_info');
		return  $medi_id;
	}
	function delete_plan($patient_id,$soap_plan_id){
		$where = array('patient_id' => $patient_id,'soap_plan_id' => $soap_plan_id);
		$this->db->where($where);
		$this->db->delete('tbl_soap_plan');
		return  $soap_plan_id;
	}
	public function updateReferalInfo($patient_id) 
	{
		$referal_type_id = $this->input->post('referal_type_id');
		$referal_id = $this->input->post('referal_id');
		if($referal_type_id != '' && $referal_id != '')
		{
			$edit_patient_info['referal_type_id'] = $referal_type_id;
			$edit_patient_info['referal_name'] = $this->input->post('referal_name');
			if($referal_type_id == 5) 
			{
				$edit_patient_info['patient_referal_id'] = $referal_id;
				$edit_patient_info['referal_id'] = 0;
			} 
			else 
			{
				$edit_patient_info['patient_referal_id'] = 0;
				$edit_patient_info['referal_id'] = $referal_id;
			}
		}
		
		// update datas
		$where = array('patient_id' => $patient_id);
		$this->db->where($where);
		$this->db->update('tbl_patient_info',$edit_patient_info);
		if($this->input->post('referal_send_email'))
		{
			
			$this->emailNotification($patient_id);
		}
		if(($this->input->post('referal_send_sms'))) 
		{
			$sms = $this->smsNotification($patient_id);
		}
		else 
		{
			$sms = '';
		}
		if($sms != '') 
		{
			return array('sms' => true, 'referalUrl' => $sms,'patient_id' => $patient_id);	
		} 
		else 
		{
			return array('sms' => false, 'referalUrl' => '','patient_id' => $patient_id);
		}
	}
	
	
	public function deletebody_chart($patient_id,$img_id)
	{
	    $where = array('patient_id' => $patient_id,'img_id' => $img_id);
		$this->db->where($where);
		$this->db->delete('tbl_body_chart');
	    return $img_id;
	}
	public function paediatric_info($patient_id) {
		$count = $this->patient_model->getPatientPaediatric($patient_id);
		$paediatric_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'paediatric_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('paediatric_date')))),
			'milestone' => $this->input->post('milestone'),
			'language' => $this->input->post('language'),
			'social' => $this->input->post('social'),
			'finemotor' => $this->input->post('finemotor'),
			'grossmotor' => $this->input->post('grossmotor'),
			'reflexes' => $this->input->post('reflexes'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
				
		$this->db->insert('tbl_patient_paediatric', $paediatric_info);
		$data['patient_id']=$patient_id;
		$id=$this->db->insert_id();
		$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('paediatric_date'))));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
				
		$paediatric = $this->editPaediatric($patient_id,$id);
			$enteredBy = $paediatric['modify_by'];
				$profileInfo = $this->registration_model->getProfileInfo($enteredBy);
				$staffInfo = $this->staff_model->getStaffInfo($enteredBy);
				
				if($profileInfo != false)
					$clientName = $profileInfo['first_name'];
				else if($staffInfo != false)
					$clientName = $staffInfo['first_name'].' '.$staffInfo['last_name'];
				 $url=base_url().'client/patient/edit_assessment_paediatric/'.$patient_id.'/'.$id;
				$html = '
					 <tr>
					  <td class="actions text-center">'.date('d/m/Y', strtotime($paediatric['paediatric_date'])).'</td>
					  <td class="actions text-center">'. $paediatric['milestone'].'</td>
					  <td class="actions text-center">'.$clientName.'</td>
					  <td class="actions text-center"><a class="edit" href="'.$url.'"><button type="submit" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="DeleteCaseNotes" href="#'.$patient_id.'#'.$id.'"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fa fa-trash-alt"></i>  </button></a></td>
					</tr>
					 
				';
			return $html;
		
	}
	public function getPatientPaediatric($patient_id)
	{
		$where = array('patient_id' => $patient_id);
		$this->db->select('count(paediatric_id) as totalcount')->from('tbl_patient_paediatric')->where($where);
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function getAllGlasgow($nuero_id){
		$where = array('nuero_id' => $nuero_id);
		$this->db->select('eyeopening,verbalresponse,motorresponse')->from('tbl_patient_nuero_glasgow')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function getAllVerbal($nuero_id){
		$where = array('nuero_id' => $nuero_id);
		$this->db->select('f1,f2,f3,a1,a2,a3,h1,h2,h3')->from('tbl_patient_nuero_verbal')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getAllGait($nuero_id){
		$where = array('nuero_id' => $nuero_id);
		$this->db->select('surface,speed,horizontal,vertical,pivot,obstacle,obstacles,steps,balance')->from('tbl_patient_nuero_gait')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getAllFunctional($nuero_id){
		$where = array('nuero_id' => $nuero_id);
		$this->db->select('bowels,bladder,grooming,toilet,feeding,transfer,mobility,dressing,stairs,bathing')->from('tbl_patient_nuero_functional')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function edit_paediatric_info($patient_id,$paediatric_id) {
		
		$paediatric_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'paediatric_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('paediatric_date')))),
			'milestone' => $this->input->post('milestone'),
			'language' => $this->input->post('language'),
			'social' => $this->input->post('social'),
			'finemotor' => $this->input->post('finemotor'),
			'grossmotor' => $this->input->post('grossmotor'),
			'reflexes' => $this->input->post('reflexes'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
				
		$where = array('patient_id' => $patient_id, 'paediatric_id' => $paediatric_id);
		$this->db->where($where);
		$this->db->update('tbl_patient_paediatric',$paediatric_info);
		$data['patient_id']=$patient_id;
		$data['paediatric_id']=$paediatric_id;
		$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('paediatric_date'))));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		return $data;
		
	}
	public function editPaediatric($patient_id,$paediatric_id)
	{
		$where = array('patient_id' => $patient_id, 'paediatric_id' => $paediatric_id);
		$this->db->select('*')->from('tbl_patient_paediatric')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	
	public function emailNotification($patient_id) {
		
		$registration_info = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$clinic_name = $registration_info['clinic_name'];
		$first_name = $registration_info['first_name'];
		$last_name = $registration_info['last_name'];
		$address1 = $registration_info['address'];
		$city = $registration_info['city'];
		$zipcode = $registration_info['zipcode'];
		$mobile = $registration_info['mobile'];
		$email = $registration_info['email'];
		$logo = $registration_info['logo'];
		
		$this->db->select('pi.first_name,pi.last_name,pi.age,pi.gender,pi.appoint_date,re.referal_name,re.email')->from('tbl_patient_info pi');
		$this->db->join('tbl_referal re', 'pi.referal_id = re.referal_id');
		$where = array('pi.patient_id' => $patient_id);
		$this->db->where($where);
		$query1 = $this->db->get();
		
		
		
		// if data exist for appointmentid
		if($query1->num_rows() > 0){
			$data1=$query1->row();
			$patient_first_name=$data1->first_name;
			$patient_last_name=$data1->last_name;
			$age=$data1->age;
			$gender=ucfirst(substr($data1->gender,0,1));
			if($data1->gender == 'male'){
				$title = 'Mr.';
			}else{
				$title = 'Ms.';
			}
			$referred_date=date("F j, Y",strtotime($data1->appoint_date));
			$referal_name = ($data1->referal_name != '') ? $data1->referal_name : '';
			$referal_email = ($data1->email != '') ? $data1->email : '';
			// if patient has email address
			if($referal_email != '') {
				// patient details for mail template
				$patient = array(
					'ClinicName' => ucfirst($clinic_name),
					'ClientFirstName' => ucfirst($first_name),
					'ClientLastName' => ucfirst($last_name),
					'Address1' => $address1,
					'City' => $city,
					'Zipcode' => $zipcode,
					'Mobile' => $mobile,
					'Email' => $email,
					'Date' => $referred_date,
					'PatientFirstName' => $patient_first_name,
					'PatientLastName' => $patient_last_name,
					'Age' => $age,
					'Gender' => $gender,
					'ReferalName' => $referal_name,
					'Title' => $title,
					'Logo' => $logo
				);
				
				if($this->session->userdata('client_id') != '1809' ){
				   $patientMessage = $this->mail_model->referalThanksTemplate($patient);
				} else {
					$patientMessage = $this->mail_model->referalThanksTemplate1($patient);
				
				}// mail config  
				$patientMailConfig = array('to' => $referal_email, 'subject' => 'Thanks for your reference', 'message' => $patientMessage);
				// send mail
				$this->mail_model->sendEmail($patientMailConfig);
			}
		}
	}
	public function viewPaediatric($patient_id,$from_date='',$to_date='')
	{
		if($from_date == '' && $to_date == ''){
			$where = array('patient_id' => $patient_id);
		}else{
			$where = array('patient_id' => $patient_id, 'paediatric_date >=' => $from_date, 'paediatric_date <=' => $to_date);
		}
		$this->db->select('*')->from('tbl_patient_paediatric')->where($where);
		$this->db->order_by("paediatric_date", "asc");
		$query=$this->db->get();
		//echo $query->num_rows().'hi';
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getPatientNueroCount($patient_id)
	{
		$where = array('patient_id' => $patient_id);
		$this->db->select('count(nuero_id) as totalcount')->from('tbl_patient_nuero')->where($where);
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function getPatientMedicalCount($patient_id)
	{
		$where = array('patient_id' => $patient_id);
		$this->db->select('count(medi_id) as totalcount')->from('tbl_patient_medi_info')->where($where);
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function editNuero($patient_id,$nuero_id)
	{
		$where = array('patient_id' => $patient_id, 'nuero_id' => $nuero_id);
		$this->db->select('*')->from('tbl_patient_nuero')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function editNuerodynamic($patient_id,$nuero_id)
	{
		$where = array('patient_id' => $patient_id, 'nuero_id' => $nuero_id);
		$this->db->select('*')->from('tbl_patient_nuero_dynamic')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function editNuerotissue($patient_id,$nuero_id)
	{
		$where = array('patient_id' => $patient_id, 'nuero_id' => $nuero_id);
		$this->db->select('*')->from('tbl_patient_nuero_tissue')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function editSubject($patient_id,$subject_id)
	{
		$where = array('patient_id' => $patient_id, 'soap_subject_id' => $subject_id);
		$this->db->select('*')->from('tbl_soap_subject')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function editObject($patient_id,$object_id)
	{
		$where = array('patient_id' => $patient_id, 'soap_object_id' => $object_id);
		$this->db->select('*')->from('tbl_soap_object')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function editAssess($patient_id,$assess_id)
	{
		$where = array('patient_id' => $patient_id, 'assess_id' => $assess_id);
		$this->db->select('*')->from('tbl_soap_assess')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function editPlan($patient_id,$plan_id)
	{
		$where = array('patient_id' => $patient_id, 'soap_plan_id' => $plan_id);
		$this->db->select('*')->from('tbl_soap_plan')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function editNueroadl($patient_id,$nuero_id)
	{
		$where = array('patient_id' => $patient_id, 'nuero_id' => $nuero_id);
		$this->db->select('*')->from('tbl_patient_nuero_adl')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	public function editNuerospl($patient_id,$nuero_id)
	{
		$where = array('patient_id' => $patient_id, 'nuero_id' => $nuero_id);
		$this->db->select('*')->from('tbl_patient_nuero_special')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function viewNuero($patient_id,$from_date='',$to_date='')
	{
		if($from_date == '' && $to_date == ''){
			$where = array('patient_id' => $patient_id);
		}else{
			$where = array('patient_id' => $patient_id, 'nuero_date >=' => $from_date, 'nuero_date <=' => $to_date);
		}
		$this->db->select('*')->from('tbl_patient_nuero')->where($where);
		$this->db->order_by("nuero_date", "asc");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function nuero_info($patient_id){
		$count = $this->patient_model->getPatientNueroCount($patient_id);
		$nuero_id = rand();
		$ulnar_left = $this->input->post('ulnar_left');
		$ulnar_right = $this->input->post('ulnar_right');
		$radial_left = $this->input->post('Radial_left');
		$radial_right = $this->input->post('Radial_right');
		$median_left = $this->input->post('Median_left');
		$median_right = $this->input->post('Median_right');
		$musculocutaneous_left = $this->input->post('Musculocutaneous_left');
		$musculocutaneous_right = $this->input->post('Musculocutaneous_right');
		$sciatic_left = $this->input->post('Sciatic_left');
		$sciatic_right = $this->input->post('Sciatic_right');
		$tibial_left = $this->input->post('Tibial_left');
		$tibial_right = $this->input->post('Tibial_right');
		$commanperonial_left = $this->input->post('Commanperonial_left');
		$commanperonial_right = $this->input->post('Commanperonial_right');
		$femoral_left = $this->input->post('Femoral_left');
		$femoral_right = $this->input->post('Femoral_right');
		$lateralcutaneous_left = $this->input->post('Lateralcutaneous_left');
		$lateralcutaneous_right = $this->input->post('Lateralcutaneous_right');
		$obturator_left = $this->input->post('Obturator_left');
		$obturator_right = $this->input->post('Obturator_right');
		$sural_left = $this->input->post('Sural_left');
		$sural_right = $this->input->post('Sural_right');
		if($ulnar_left != '' || $ulnar_right != '' || $radial_left != '' || $radial_right != '' || $median_left != '' || $median_right != '' || $musculocutaneous_left != '' || $musculocutaneous_right != '' || $sciatic_left != '' || $sciatic_right != '' || $tibial_left != '' || $tibial_right != '' || $commanperonial_left != '' || $commanperonial_right != '' || $femoral_left != '' || $femoral_right != '' || $lateralcutaneous_left != '' || $lateralcutaneous_right != '' || $obturator_left != '' || $obturator_right != '' || $sural_left != '' || $sural_right != '')
		{
			
		$glasgow_info = array(
				'client_id' => $this->session->userdata('client_id'),
				//'nuero_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('nuero_date')))),
				'patient_id' => $patient_id,
				'nuero_id' => $nuero_id,
				'ulnar_left' => $ulnar_left,
				'ulnar_right' => $ulnar_right,
				'radial_left' => $radial_left,
				'radial_right' => $radial_right,
				'median_left' => $median_left,
				'median_right' => $median_right,
				'musculocutaneous_left' => $musculocutaneous_left,
				'musculocutaneous_right' => $musculocutaneous_right,
				'sciatic_left' => $sciatic_left,
				'sciatic_right' => $sciatic_right,
				'tibial_left' => $tibial_left,
				'tibial_right' => $tibial_right,
				'commanperonial_left' => $commanperonial_left,
				'commanperonial_right' => $commanperonial_right,
				'femoral_left' => $femoral_left,
				'femoral_right' => $femoral_right,
				'lateralcutaneous_left' => $lateralcutaneous_left,
				'lateralcutaneous_right' => $lateralcutaneous_right,
				'obturator_left' => $obturator_left,
				'obturator_right' => $obturator_right,
				'sural_left' => $sural_left,
				'sural_right' => $sural_right
			);
			$this->db->insert('tbl_patient_nuero_dynamic', $glasgow_info);
		}
		$scar=$this->input->post('scar');
		$adhere=$this->input->post('adhere');
		if($scar != '' || $adhere != '')
		{
		$glasgow_info = array(
				'client_id' => $this->session->userdata('client_id'),
				'patient_id' => $patient_id,
				'nuero_id' => $nuero_id,
				'scartype' => $scar,
				'adhereto' => $adhere
				
			);
			$this->db->insert('tbl_patient_nuero_special', $glasgow_info);
		}
		$name=$this->input->post('name');
		$description=$this->input->post('description');
		
		if($name != '' || $description != '')
		{
			
		$glasgow_info = array(
				'client_id' => $this->session->userdata('client_id'),
				'patient_id' => $patient_id,
				'nuero_id' => $nuero_id,
				'name' => $name,
				'description' => $description
				
			);
			$this->db->insert('tbl_patient_nuero_adl', $glasgow_info);
		}
		$ulnar_left1 = $this->input->post('ulnar_left1');
		$ulnar_right1 = $this->input->post('ulnar_right1');
		$Radial_left1 = $this->input->post('Radial_left1');
		$Radial_right1 = $this->input->post('Radial_right1');
		$Median_left1 = $this->input->post('Median_left1');
		$Median_right1 = $this->input->post('Median_right1');
		$Sciatic_left1 = $this->input->post('Sciatic_left1');
		$Sciatic_right1 = $this->input->post('Sciatic_right1');
		$Tibial_left1 = $this->input->post('Tibial_left1');
		$Tibial_right1 = $this->input->post('Tibial_right1');
		$Commanperonial_left1 = $this->input->post('peronial_left1');
		$Commanperonial_right1 = $this->input->post('peronial_right1');
		$Femoral_left1 = $this->input->post('Femoral_left1');
		$Femoral_right1 = $this->input->post('Femoral_right1');
		$Saphenous_left1 = $this->input->post('Saphenous_left1');
		$Saphenous_right1 = $this->input->post('Saphenous_right1');
		
		$Sural_left1 = $this->input->post('Sural_left1');
		$Sural_right1 = $this->input->post('Sural_right1');
		if($ulnar_left1 != '' || $ulnar_right1 != '' || $Radial_left1 != '' || $Radial_right1 != '' || $Median_left1 != '' || $Median_right1 != '' || $Sciatic_left1 != '' || $Sciatic_right1 != '' || $Tibial_left1 != '' || $Tibial_right1 != '' || $Commanperonial_left1 != '' || $Commanperonial_right1 != '' || $Femoral_left1 != '' || $Femoral_right1 != '' || $Sural_left1 != '' || $Sural_right1 != '' || $Saphenous_left1 != '' || $Saphenous_right1 != '')
		{
		
		$glasgow_info = array(
				'client_id' => $this->session->userdata('client_id'),
				'patient_id' => $patient_id,
				'nuero_id' => $nuero_id,
				'ulnar_left' => $ulnar_left1,
				'ulnar_right' => $ulnar_right1,
				'Radial_left' => $Radial_left1,
				'Radial_right' => $Radial_right1,
				'Median_left' => $Median_left1,
				'Median_right' => $Median_right1,
				'Sciatic_left' => $Sciatic_left1,
				'Sciatic_right' => $Sciatic_right1,
				'Tibial_left' => $Tibial_left1,
				'Tibial_right' => $Tibial_right1,
				'peronial_left' => $Commanperonial_left1,
				'peronial_right' => $Commanperonial_right1,
				'Femoral_left' => $Femoral_left1,
				'Femoral_right' => $Femoral_right1,
				'Saphenous_left' => $Saphenous_left1,
				'Saphenous_right' => $Saphenous_right1,
    			'Sural_left' => $Sural_left1,
				'Sural_right' => $Sural_right1
			);
			$this->db->insert('tbl_patient_nuero_tissue', $glasgow_info);
		}
		$eyeopenin = $this->input->post('eyeopen');
		$verbal = $this->input->post('verbal');
		$motor = $this->input->post('motor');
		if(($eyeopenin != '') || ($verbal != '') || ($motor != '')){
			$glasgow_total = $eyeopenin + $verbal + $motor;
			$glasgow_info = array(
				'client_id' => $this->session->userdata('client_id'),
				'patient_id' => $patient_id,
				'nuero_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('nuero_date')))),
				'nuero_id' => $nuero_id,
				'eyeopening' => isset($eyeopenin)?$eyeopenin:' ',
				'verbalresponse' => isset($verbal)?$verbal:' ',
				'motorresponse' => isset($motor)?$motor:' ',
				'total' => $glasgow_total
			);
			$this->db->insert('tbl_patient_nuero_glasgow', $glasgow_info);
		}
		
		$h1	= $this->input->post('h1');
		$h2	= $this->input->post('h2');
		$h3	= $this->input->post('h3');
		$a1	= $this->input->post('a1');
		$a2	= $this->input->post('a2');
		$a3	= $this->input->post('a3');
		$f1	= $this->input->post('f1');
		$f2	= $this->input->post('f2');
		$f3	= $this->input->post('f3');
		if(($f1 != '') || ($f2 != '') || ($f3 != '')||($a1 != '')||($a2 != '')||($a3 != '')||($h1 != '')||($h2 != '')||($h3 != '')){
			$verbal_info = array(
				'client_id' => $this->session->userdata('client_id'),
				'patient_id' => $patient_id,
				'nuero_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('nuero_date')))),
				'nuero_id' => $nuero_id,
				'f1' => $f1,
				'f2' => $f2,
				'f3' => $f3,
				'a1' => $a1,
				'a2' => $a2,
				'a3' => $a3,
				'h1' => $h1,
				'h2' => $h2,
				'h3' => $h3,
			);
			$this->db->insert('tbl_patient_nuero_verbal', $verbal_info);
		}
		
		$gait = $this->input->post('gait');
		$speed = $this->input->post('speed');
		$horizontal = $this->input->post('horizontal');
		$vertical = $this->input->post('vertical');
		$pivot = $this->input->post('pivot');
		$obstacle = $this->input->post('obstacle');
		$obstacles = $this->input->post('obstacles');
		$steps = $this->input->post('steps');
		$balance = $this->input->post('balance');
		
		if(($gait != '') ||($speed != '') ||($horizontal != '') ||($vertical != '') ||($pivot != '') ||($obstacle != '') ||($obstacles != '') ||($steps != '') ||($balance != '')){
		$gait_total = $gait+$speed+$horizontal +$vertical+$pivot+$obstacle+$obstacles+$steps;
			$gait_info = array(
				'client_id' => $this->session->userdata('client_id'),
				'patient_id' => $patient_id,
				'nuero_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('nuero_date')))),
				'nuero_id' => $nuero_id,
				'surface' => $gait,
				'speed' => $speed,
				'horizontal' => $horizontal,
				'vertical' => $vertical,
				'pivot' => $pivot,
				'obstacle' => $obstacle,
				'obstacles' => $obstacles,
				'steps' => $steps,
				'balance' => $balance,
				'total' => $gait_total
			);
			$this->db->insert('tbl_patient_nuero_gait', $gait_info);
		}
		
		$bowels = $this->input->post('bowels');
		$bladder = $this->input->post('bladder');
		$grooming = $this->input->post('grooming');
		$toilet = $this->input->post('toilet');
		$feeding = $this->input->post('feeding');
		$transfer = $this->input->post('transfer');
		$mobility = $this->input->post('mobility');
		$dressing = $this->input->post('dressing');
		$stairs = $this->input->post('stairs');
		$bathing = $this->input->post('bathing');
		
		if(($bowels != '') ||($bladder != '') ||($grooming != '') ||($toilet != '') ||($feeding != '') ||($transfer != '') ||($mobility != '') ||($dressing != '') ||($stairs != '') ||($bathing != '')){
			$function_total = $bowels+$bladder+$grooming+$toilet+$feeding+$transfer+$mobility +$dressing+$stairs+$bathing;
			$function_info = array(
				'client_id' => $this->session->userdata('client_id'),
				'patient_id' => $patient_id,
				'nuero_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('nuero_date')))),
				'nuero_id' => $nuero_id,
				'bowels'=> $bowels,
				'bladder'=> $bladder,
				'grooming'=> $grooming,
				'toilet'=> $toilet,
				'feeding'=> $feeding,
				'transfer'=> $transfer,
				'mobility'=> $mobility,
				'dressing'=> $dressing,
				'stairs'=> $stairs,
				'bathing'=> $bathing,
				'total' => $function_total
			);
			$this->db->insert('tbl_patient_nuero_functional',$function_info);
		}
		
		if($scar != '' || $adhere != '' || $eyeopenin != '' || ($verbal != '') || $name != '' || $description != '' || ($motor != '')||($f1 != '') || ($f2 != '') || ($f3 != '')||($a1 != '')||($a2 != '')||($a3 != '')||($h1 != '')||($h2 != '')||($h3 != '')||($gait != '') ||($speed != '') ||($horizontal != '') ||($vertical != '') ||($pivot != '') ||($obstacle != '') ||($obstacles != '') ||($steps != '') ||($balance != '')||($bowels != '') ||($bladder != '') ||($grooming != '') ||($toilet != '') ||($feeding != '') ||($transfer != '') ||($mobility != '') ||($dressing != '') ||($stairs != '') ||($bathing != '')||$ulnar_left != '' || $ulnar_right != '' || $Radial_left != '' || $Radial_right != '' || $Median_left != '' || $Median_right != '' || $Musculocutaneous_left != '' || $Musculocutaneous_right != '' || $Sciatic_left != '' || $Sciatic_right != '' || $Tibial_left != '' || $Tibial_right != '' || $Commanperonial_left != '' || $Commanperonial_right != '' || $Femoral_left != '' || $Femoral_right != '' || $Lateralcutaneous_left != '' || $Lateralcutaneous_right != '' || $Obturator_left != '' || $Obturator_right != '' || $Sural_left != '' || $Sural_right != '' || $ulnar_left1 != '' || $ulnar_right1 != '' || $Radial_left1 != '' || $Radial_right1 != '' || $Median_left1 != '' || $Median_right1 != '' || $Sciatic_left1 != '' || $Sciatic_right1 != '' || $Tibial_left1 != '' || $Tibial_right1 != '' || $Commanperonial_left1 != '' || $Commanperonial_right1 != '' || $Femoral_left1 != '' || $Femoral_right1 != '' || $Sural_left1 != '' || $Sural_right1 != '' || $Saphenous_left1 != '' || $Saphenous_right1 != '')
		{
			$nuero_info = array(
				'nuero_id' => $nuero_id,
				'patient_id' => $patient_id,
				'nuero_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('nuero_date')))),
				'glasgow_total' => isset($glasgow_total)?$glasgow_total:0,
				'dynamic_total' => isset($gait_total)?$gait_total:0,
				'functional_total' => isset($function_total)?$function_total:0
			);
			$this->db->insert('tbl_patient_nuero',$nuero_info);
			$data['patient_id']=$patient_id;
			$id = $nuero_id;
			$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('nuero_date'))));
			$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
			if($visit_date_value == false){
				$visit_info = array('patient_id' => $patient_id,
				'client_id' => $this->session->userdata('client_id'),
				'visit_date' => $visit_date);
				$this->db->insert('tbl_patient_visits', $visit_info);
			}
		}
		
		$nuero = $this->editNuero($patient_id,$id);
			$url=base_url().'client/patient/edit_assessment_nuero/'.$patient_id.'/'.$id;
				$html = '
					  <tr>
					  <td class="actions text-center">'.date('d/m/Y', strtotime($nuero['nuero_date'])).'</td>
					  <td class="actions text-center">'.$nuero['glasgow_total'].'</td>
					  <td class="actions text-center">'.$nuero['dynamic_total'].'</td>
					  <td class="actions text-center">'.$nuero['functional_total'].'</td>
					   <td class="actions text-center"><a class="edit" href="'.$url.'"><button type="submit" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="DeleteCaseNotes" href="#'.$patient_id.'#'.$id.'"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fa fa-trash-alt"></i>  </button></a></td>
				
					</tr>
				';
			return $html;
	}
	public function edit_nuero_info($patient_id,$nuero_id){
		$where = array('patient_id' => $patient_id, 'nuero_id' => $nuero_id);
		$this->db->where($where);
		
		
		$eyeopenin = $this->input->post('eyeopen');
		$verbal = $this->input->post('verbal');
		$motor = $this->input->post('motor');
		
		
			$glasgow_total = $eyeopenin + $verbal + $motor;
			$glasgow_info = array(
				'nuero_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('nuero_date')))),
				'eyeopening' => isset($eyeopenin)?$eyeopenin:' ',
				'verbalresponse' => isset($verbal)?$verbal:' ',
				'motorresponse' => isset($motor)?$motor:' ',
				'total' => $glasgow_total
			);
			
			$this->db->update('tbl_patient_nuero_glasgow',$glasgow_info);
		
		$h1	= $this->input->post('h1');
		$h2	= $this->input->post('h2');
		$h3	= $this->input->post('h3');
		$a1	= $this->input->post('a1');
		$a2	= $this->input->post('a2');
		$a3	= $this->input->post('a3');
		$f1	= $this->input->post('f1');
		$f2	= $this->input->post('f2');
		$f3	= $this->input->post('f3');
		
			$verbal_info = array(
				'f1' => $f1,
				'f2' => $f2,
				'f3' => $f3,
				'a1' => $a1,
				'a2' => $a2,
				'a3' => $a3,
				'h1' => $h1,
				'h2' => $h2,
				'h3' => $h3,
			);
			$this->db->update('tbl_patient_nuero_verbal',$verbal_info);
		
		
		$gait = $this->input->post('gait');
		$speed = $this->input->post('speed');
		$horizontal = $this->input->post('horizontal');
		$vertical = $this->input->post('vertical');
		$pivot = $this->input->post('pivot');
		$obstacle = $this->input->post('obstacle');
		$obstacles = $this->input->post('obstacles');
		$steps = $this->input->post('steps');
		$balance = $this->input->post('balance');
		
		
		$gait_total = $gait+$speed+$horizontal +$vertical+$pivot+$obstacle+$obstacles+$steps;
			$gait_info = array(
				
				'surface' => $gait,
				'speed' => $speed,
				'horizontal' => $horizontal,
				'vertical' => $vertical,
				'pivot' => $pivot,
				'obstacle' => $obstacle,
				'obstacles' => $obstacles,
				'steps' => $steps,
				'balance' => $balance,
				'total' => $gait_total
			);
			$this->db->update('tbl_patient_nuero_gait',$gait_info);
		
		$bowels = $this->input->post('bowels');
		$bladder = $this->input->post('bladder');
		$grooming = $this->input->post('grooming');
		$toilet = $this->input->post('toilet');
		$feeding = $this->input->post('feeding');
		$transfer = $this->input->post('transfer');
		$mobility = $this->input->post('mobility');
		$dressing = $this->input->post('dressing');
		$stairs = $this->input->post('stairs');
		$bathing = $this->input->post('bathing');
		
		
			$function_total = $bowels+$bladder+$grooming+$toilet+$feeding+$transfer+$mobility +$dressing+$stairs+$bathing;
			$function_info = array(
				'client_id' => $this->session->userdata('client_id'),
				'patient_id' => $patient_id,
				'nuero_id' => $nuero_id,
				'bowels'=> $bowels,
				'bladder'=> $bladder,
				'grooming'=> $grooming,
				'toilet'=> $toilet,
				'feeding'=> $feeding,
				'transfer'=> $transfer,
				'mobility'=> $mobility,
				'dressing'=> $dressing,
				'stairs'=> $stairs,
				'bathing'=> $bathing,
				'total' => $function_total
			);
			$this->db->update('tbl_patient_nuero_functional',$function_info);
			
			
			
		$ulnar_left = $this->input->post('ulnar_left');
		$ulnar_right = $this->input->post('ulnar_right');
		$Radial_left = $this->input->post('Radial_left');
		$Radial_right = $this->input->post('Radial_right');
		$Median_left = $this->input->post('Median_left');
		$Median_right = $this->input->post('Median_right');
		$Musculocutaneous_left = $this->input->post('Musculocutaneous_left');
		$Musculocutaneous_right = $this->input->post('Musculocutaneous_right');
		$Sciatic_left = $this->input->post('Sciatic_left');
		$Sciatic_right = $this->input->post('Sciatic_right');
		$Tibial_left = $this->input->post('Tibial_left');
		$Tibial_right = $this->input->post('Tibial_right');
		$Commanperonial_left = $this->input->post('Commanperonial_left');
		$Commanperonial_right = $this->input->post('Commanperonial_right');
		$Femoral_left = $this->input->post('Femoral_left');
		$Femoral_right = $this->input->post('Femoral_right');
		$Lateralcutaneous_left = $this->input->post('Lateralcutaneous_left');
		$Lateralcutaneous_right = $this->input->post('Lateralcutaneous_right');
		$Obturator_left = $this->input->post('Obturator_left');
		$Obturator_right = $this->input->post('Obturator_right');
		$Sural_left = $this->input->post('Sural_left');
		$Sural_right = $this->input->post('Sural_right');
			$d_value=$this->input->post('d_value');
			$where = array('dynamic_id' => $d_value);
			$glasgow_info = array(
				'client_id' => $this->session->userdata('client_id'),
				'patient_id' => $patient_id,
				'nuero_id' => $nuero_id,
				'ulnar_left' => $ulnar_left,
				'ulnar_right' => $ulnar_right,
				'radial_left' => $Radial_left,
				'radial_right' => $Radial_right,
				'median_left' => $Median_left,
				'median_right' => $Median_right,
				'musculocutaneous_left' => $Musculocutaneous_left,
				'musculocutaneous_right' => $Musculocutaneous_right,
				'sciatic_left' => $Sciatic_left,
				'sciatic_right' => $Sciatic_right,
				'tibial_left' => $Tibial_left,
				'tibial_right' => $Tibial_right,
				'commanperonial_left' => $Commanperonial_left,
				'commanperonial_right' => $Commanperonial_right,
				'femoral_left' => $Femoral_left,
				'femoral_right' => $Femoral_right,
				'lateralcutaneous_left' => $Lateralcutaneous_left,
				'lateralcutaneous_right' => $Lateralcutaneous_right,
				'obturator_left' => $Obturator_left,
				'obturator_right' => $Obturator_right,
				'sural_left' => $Sural_left,
				'sural_right' => $Sural_right
			);
			$this->db->where($where);
			$this->db->update('tbl_patient_nuero_dynamic', $glasgow_info);
			
			
			
			
		$ulnar_left1 = $this->input->post('ulnar_left1');
		$ulnar_right1 = $this->input->post('ulnar_right1');
		$Radial_left1 = $this->input->post('Radial_left1');
		$Radial_right1 = $this->input->post('Radial_right1');
		$Median_left1 = $this->input->post('Median_left1');
		$Median_right1 = $this->input->post('Median_right1');
		$Sciatic_left1 = $this->input->post('Sciatic_left1');
		$Sciatic_right1 = $this->input->post('Sciatic_right1');
		$Tibial_left1 = $this->input->post('Tibial_left1');
		$Tibial_right1 = $this->input->post('Tibial_right1');
		$Commanperonial_left1 = $this->input->post('peronial_left1');
		$Commanperonial_right1 = $this->input->post('peronial_right1');
		$Femoral_left1 = $this->input->post('Femoral_left1');
		$Femoral_right1 = $this->input->post('Femoral_right1');
		$Saphenous_left1 = $this->input->post('Saphenous_left1');
		$Saphenous_right1 = $this->input->post('Saphenous_right1');
		
		$Sural_left1 = $this->input->post('Sural_left1');
		$Sural_right1 = $this->input->post('Sural_right1');
		
		$d_value=$this->input->post('tissue');
			$where = array('tissue_id' => $d_value);
		$glasgow_info = array(
				
				'client_id' => $this->session->userdata('client_id'),
				'patient_id' => $patient_id,
				'nuero_id' => $nuero_id,
				'ulnar_left' => $ulnar_left1,
				'ulnar_right' => $ulnar_right1,
				'radial_left' => $Radial_left1,
				'radial_right' => $Radial_right1,
				'median_left' => $Median_left1,
				'median_right' => $Median_right1,
				'sciatic_left' => $Sciatic_left1,
				'sciatic_right' => $Sciatic_right1,
				'tibial_left' => $Tibial_left1,
				'tibial_right' => $Tibial_right1,
				'peronial_left' => $Commanperonial_left1,
				'peronial_right' => $Commanperonial_right1,
				'femoral_left' => $Femoral_left1,
				'femoral_right' => $Femoral_right1,
				'saphenous_left' => $Saphenous_left1,
				'saphenous_right' => $Saphenous_right1,
				'sural_left' => $Sural_left1,
				'sural_right' => $Sural_right1
			);
			$this->db->where($where);
			$this->db->update('tbl_patient_nuero_tissue', $glasgow_info);
		
		
			$d_value=$this->input->post('adl');
			$where = array('adl_id' => $d_value);
			$name=$this->input->post('name');
		$description=$this->input->post('description');
		$glasgow_info = array(
				'client_id' => $this->session->userdata('client_id'),
				'patient_id' => $patient_id,
				'nuero_id' => $nuero_id,
				'name' => $name,
				'description' => $description
				
			);
			$this->db->update('tbl_patient_nuero_adl', $glasgow_info);
			
			$d_value=$this->input->post('special');
			$where = array('special_id' => $d_value);

			
			$scar=$this->input->post('scar');
		$adhere=$this->input->post('adhere');
		$glasgow_info = array(
				'client_id' => $this->session->userdata('client_id'),
				'patient_id' => $patient_id,
				'nuero_id' => $nuero_id,
				'scartype' => $scar,
				'adhereto' => $adhere
				
			);
			$this->db->where($where);
			$this->db->update('tbl_patient_nuero_special', $glasgow_info);
			$nuero_info = array(
				'glasgow_total' => isset($glasgow_total)?$glasgow_total:0,
				'dynamic_total' => isset($gait_total)?$gait_total:0,
				'functional_total' => isset($function_total)?$function_total:0
			);
			$this->db->update('tbl_patient_nuero',$nuero_info);
			$data['patient_id']=$patient_id;
			$data['nuero_id']=$nuero_id;
		return $data;
	}
	public function deletepaediatric($patient_id,$paediatric_id){
		
		$where = array('patient_id' => $patient_id,'paediatric_id' => $paediatric_id);
		$this->db->where($where);
		$this->db->delete('tbl_patient_paediatric');
	}
	
	public function deletenuero($patient_id,$nuero_id){
		
		$where = array('patient_id' => $patient_id,'nuero_id' => $nuero_id);
		$this->db->where($where);
		$this->db->delete('tbl_patient_nuero');
		$this->db->where($where);
		$this->db->delete('tbl_patient_nuero_functional');
		$this->db->where($where);
		$this->db->delete('tbl_patient_nuero_gait');
		$this->db->where($where);
		$this->db->delete('tbl_patient_nuero_glasgow');
		$this->db->where($where);
		$this->db->delete('tbl_patient_nuero_verbal');
		$this->db->where($where);
		$this->db->delete('tbl_patient_nuero_adl');
		$this->db->where($where);
		$this->db->delete('tbl_patient_nuero_dynamic');
		$this->db->where($where);
		$this->db->delete('tbl_patient_nuero_dyanmic1');
		$this->db->where($where);
		$this->db->delete('tbl_patient_nuero_special');
		$this->db->where($where);
		$this->db->delete('tbl_patient_nuero_tissue');
		return $nuero_id;
	}
	
	public function smsNotification($patient_id) {
		// join query to get all details for notification
		$this->db->select('pi.first_name,pi.last_name,pi.gender,pi.age,re.referal_name,re.mobile_no')->from('tbl_patient_info pi');
		$this->db->join('tbl_referal re', 'pi.referal_id = re.referal_id');
		$where = array('pi.patient_id' => $patient_id);
		$this->db->where($where);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$data = $query->row();
			$first_name = ($data->first_name != '') ? $data->first_name : '';
			$last_name = ($data->last_name != '') ? $data->last_name : '';
			$gender=ucfirst(substr($data->gender,0,1));
			$age = ($data->age != '') ? $data->age : '';
			$referal_name = ($data->referal_name != '') ? $data->referal_name : '';
			$mobile_no = ($data->mobile_no != '') ? $data->mobile_no : '';
			
			$profile_info = $this->registration_model->editProfile($this->session->userdata('client_id'));
			$sms_count = $profile_info['sms_count'];
			$clinic_name = $profile_info['clinic_name'];
			$country = $profile_info['country'];
			if($data->gender == 'male'){
				$title = 'Mr.';
			}else{
				$title = 'Ms.';
			}
			if($mobile_no != '') {      
						if($this->session->userdata('client_id') == '1948') {
							$clinic_name1 = 'SUNSHINE SUPER SPECIALITY PHYSIOTHERAPY CLINIC';
						    $message_doctor = 'Dear Dr.'.ucfirst($referal_name).', Thank you for referring '.$title.ucfirst($first_name).'-'.$age.'-'.$gender.' to '.$clinic_name1.'. We assure good care by our physiotherapists and we will update you on patient’s progress.';
							$smsUrl = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=FISIYO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$mobile_no.'&duplicateCheck=true&format=json&msg='.urlencode($message_doctor);
						} else {
							$message_doctor = 'Dear Dr.'.ucfirst($referal_name).', Thank you for referring '.$title.ucfirst($first_name).'-'.$age.'-'.$gender.' to '.$clinic_name.'. We assure good care by our physiotherapists and we will update you on patient’s progress.';
							$smsUrl = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=FISIYO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$mobile_no.'&duplicateCheck=true&format=json&msg='.urlencode($message_doctor);
						}
						$sms['doctor'] = 'Done';
						$sms_count+=1;
						$churl = @fopen($smsUrl,'r');
						fclose($churl); 
						$length = strlen($message_doctor);
						$cost = ceil($length/160);
						if(!$churl){ }else{
							$this->db->query('update tbl_client set sms_count = sms_count + '.$cost.' where status = 1 and client_id ='.$this->session->userdata('client_id'));
						}  
			}
					
			
			$this->db->where('client_id', $this->session->userdata('client_id'));
			$this->db->update('tbl_client', array('sms_count' => $sms_count));
			return $sms;
		}
	}
	
	public function quick_patient_add() {
		
		// generate patient code and submit
		if($this->input->post('dob') != ''){
			$dob = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('dob'))));
		}else{
			$dob = '';
		}
		$patient_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'first_name' => $this->input->post('first_name'),
			'appoint_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('appoint_date')))),
			'gender' => $this->input->post('gender'),
			'city' => $this->input->post('city'),
			'mobile_no' => $this->input->post('mobile_no'),
			'email' => $this->input->post('email'),
			'dob' => $dob,
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
			'patient_code' => $this->generate_code()
		);
		// insert datas
		$this->db->insert('tbl_patient_info', $patient_info);
		$data = array('patient_id' => $this->db->insert_id(), 'first_name' => $this->input->post('first_name'));
		if($this->db->insert_id()){
			return $data;	
		} else {
			return false;	
		}
	}
	
	public function edit_patient_info($patient_id,$edit_pinfo,$edit_pcinfo) {
		
		if($this->input->post('dateob') != '')
		{
			$dob = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('dateob'))));
		}
		else
		{
			$dob = '';
		}
		
		$val = $this->input->post('category');
		if($val == '1')
		{
			$home = '1';
		} 
		else {
			$home = '2';
		 }
		
		
		echo $dob;
		echo $home;
		echo $this->input->post('gender');
		
		if($edit_pinfo=='Y'){
			$edit_patient_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'appoint_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('appoint_date')))),
			'gender' => $this->input->post('gender'),
			'ref_no' => $this->input->post('ref_no'),
			'dob' => $dob,
			'home_visit' => $home,
			'age' => $this->input->post('age'),
			'mobile_no' => $this->input->post('mobile_no'),
			'dominance' => $this->input->post('dominance'),
			'concess_group_id' => $this->input->post('concess_group_id'),
			'marital_status' => $this->input->post('marital_status'),
			'height' => $this->input->post('height'),
			'weight' => $this->input->post('weight'),
			'bmi' => $this->input->post('bmi'),
			'consan_marriage' => $this->input->post('consan_marriage'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
			);
			// generate patient code and submit
			$referal_type_id = $this->input->post('referal_type_id');
			$referal_id = $this->input->post('referal_id');
			if($referal_type_id != '' && $referal_id != '') {
				$edit_patient_info['referal_type_id'] = $referal_type_id;
				$edit_patient_info['referal_name'] = $this->input->post('referal_name');
				if($referal_type_id == 5) {
					$edit_patient_info['patient_referal_id'] = $referal_id;
					$edit_patient_info['referal_id'] = 0;
				} else {
					$edit_patient_info['patient_referal_id'] = 0;
					$edit_patient_info['referal_id'] = $referal_id;
				}
			}
			
		}
		elseif($edit_pcinfo=='Y'){
			$edit_patient_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'aadhar_id' => $this->input->post('aadhar_id'),
			'occupation' => $this->input->post('occupation'),
			'food_habits' => $this->input->post('food_habits'),
			'address_line1' => $this->input->post('address_line1'),
			'address_line2' => $this->input->post('address_line2'),
			'city' => $this->input->post('city'),
			'pincode' => $this->input->post('pincode'),
			'phone_no' => $this->input->post('phone_no'),
			'email' => $this->input->post('email'),
			'contact_person_name' => $this->input->post('contact_person_name'),
			'contact_person_mobile' => $this->input->post('contact_person_mobile'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
		}
		
		// update datas
		$where = array('patient_id' => $patient_id);
		$this->db->where($where);
		$this->db->update('tbl_patient_info',$edit_patient_info);
		return $patient_id;
	}
	
	//fetch records from patient
	public function editPatientinfo($patient_id = '')
	{	
		$where=array('patient_id' => $patient_id);
		$this->db->select('*')->from('tbl_patient_info')->where($where);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	// edit patient photo
	public function edit_photo($photo, $patient_id) {
		$patient = $this->editPatientinfo($patient_id);
		if($patient['photo'] != '') @unlink(UPLOADPATH."uploads/patient/".$patient['photo']);
		$update = array('photo' => $photo);
		$where=array('patient_id' => $patient_id);
		$this->db->where($where);
		$this->db->update('tbl_patient_info', $update);
	}
	function req_confirm($patient_id)
	{
		$this->db->where('patient_id',$patient_id);
		$this->db->set('app_approve',0);
		$this->db->update('tbl_patient_info');
	    return $patient_id;
	}
	// Delete patient
	function delete_patient($patient_id){
		
		$where = array('patient_id' => $patient_id);
		$this->db->select('photo')->from('tbl_patient_info')->where($where);
		$query = $this->db->get();
		$details = $query->row();

		@unlink(UPLOADPATH .'uploads/patient/'.$details->photo);
		
		$this->db->where($where);
		$this->db->delete('tbl_patient_info');
		
		$this->db->where($where);
		$this->db->delete('tbl_patient_history');
		
		$this->db->where($where);
		$this->db->delete('tbl_patient_chief_complaints');
		
		$this->db->where($where);
		$this->db->delete('tbl_patient_pain');
		
		$this->db->where($where);
		$this->db->delete('tbl_patient_examination');
		
		$this->db->where($where);
		$this->db->delete('tbl_patient_motor_examination');
		
		$this->db->where($where);
		$this->db->delete('tbl_patient_sensory_examination');
		
		$this->db->where($where);
		$this->db->delete('tbl_appointments');
		
		$this->db->where($where);
		$this->db->delete('tbl_patient_advance');
		
		$this->db->where($where);
		$this->db->delete('save_chart');
		
		$this->db->where($where);
		$this->db->delete('prescription_detail');
		
		$this->db->where($where);
		$this->db->delete('save_privatechart');
		
		$this->db->where($where);
		$this->db->delete('chart_details');
	
		$this->db->where($where);
		$this->db->delete('feedback');
		
		
		$this->db->select('x_ray,scan,blood_reports')->from('tbl_patient_investigation')->where($where);
		$query1 = $this->db->get();
		$details1 = $query1->row();

		@unlink(UPLOADPATH .'uploads/patient/investigation/'.$details1->x_ray);
		@unlink(UPLOADPATH .'uploads/patient/investigation/'.$details1->scan);
		@unlink(UPLOADPATH .'uploads/patient/investigation/'.$details1->blood_reports);
		$this->db->where($where);
		$this->db->delete('tbl_patient_investigation');
		
		$this->db->where($where);
		$this->db->delete('tbl_patient_prov_diagnosis');
		
		$this->db->where($where);
		$this->db->delete('tbl_patient_goals');
		return $patient_id;
	}
	
	// Delete history
	function delete_history($patient_id,$his_id){
		$where = array('patient_id' => $patient_id,'his_id' => $his_id);
		$this->db->where($where);
		$this->db->delete('tbl_patient_history');
		return $his_id;
	}
	
	
	 public function delete_body_chart($patient_id,$img_id)
	{
		$where = array('patient_id' => $patient_id,'img_id' => $img_id);
		$this->db->where($where);
		$this->db->delete('tbl_body_chart');
		return $img_id;
	}
	 
	function delete_chiefcomp($patient_id,$cc_id){
		
		$where = array('patient_id' => $patient_id,'cc_id' => $cc_id);
		$this->db->where($where);
		$this->db->delete('tbl_patient_chief_complaints');
		return $cc_id;
	}
	
	function delete_pain($patient_id,$pain_id){
		
		$where = array('patient_id' => $patient_id,'pain_id' => $pain_id);
		$this->db->where($where);
		$this->db->delete('tbl_patient_pain');
		return $pain_id;
	}
	
	function delete_examn($patient_id,$examn_id){
		
		$where = array('patient_id' => $patient_id,'examn_id' => $examn_id);
		$this->db->where($where);
		$this->db->delete('tbl_patient_examination');
		return $examn_id;
	}
	
	function delete_mexamn($patient_id,$mexamn_id){
		
		$where = array('patient_id' => $patient_id,'mexamn_id' => $mexamn_id);
		$this->db->where($where);
		$this->db->delete('tbl_patient_motor_examination');
		return $mexamn_id;
	}
	
	function delete_sexamn($patient_id,$sexamn_id){
		
		$where = array('patient_id' => $patient_id,'sexamn_id' => $sexamn_id);
		$this->db->where($where);
		$this->db->delete('tbl_patient_sensory_examination');
		return $sexamn_id;
	}
	
	function delete_inves($patient_id,$inves_id){
		
		$where = array('patient_id' => $patient_id,'inves_id' => $inves_id);
		$this->db->select('document')->from('tbl_investigation')->where($where);
		$query1 = $this->db->get();
		$details1 = $query1->row();

		//@unlink(UPLOADPATH .'uploads/patient/investigation/'.$details1->x_ray);
		@unlink(UPLOADPATH .'uploads/patient/investigation/'.$details1->document);
		//@unlink(UPLOADPATH .'uploads/patient/investigation/'.$details1->blood_reports);
		$this->db->where($where);
		$this->db->delete('tbl_investigation');
		return $inves_id;
	}
	
	function update_inves($patient_id,$inves_id,$method){
		
		$where = array('patient_id' => $patient_id,'inves_id' => $inves_id);
		$this->db->select('x_ray,scan,blood_reports')->from('tbl_patient_investigation')->where($where);
		$query1 = $this->db->get();
		$details1 = $query1->row();
		if($method == 'x-ray'){
			@unlink(UPLOADPATH .'uploads/patient/investigation/'.$details1->x_ray);
		}else if($method == 'scan'){
			@unlink(UPLOADPATH .'uploads/patient/investigation/'.$details1->scan);
		}else if($method == 'blood-reports'){
			@unlink(UPLOADPATH .'uploads/patient/investigation/'.$details1->blood_reports);
		}
		
		$update_xray = array('x_ray' => '');
		$update_scan = array('scan' => '');
		$update_br = array('blood_reports' => '');
		$this->db->where($where);
		if($method == 'x-ray'){
			$this->db->update('tbl_patient_investigation',$update_xray);
		}else if($method == 'scan'){
			$this->db->update('tbl_patient_investigation',$update_scan);
		}else if($method == 'blood-reports'){
			$this->db->update('tbl_patient_investigation',$update_br);
		}
		$data['patient_id'] = $patient_id;
		$data['inves_id'] = $inves_id;
		return $data;
	}
	
	
	function delete_provdiag($patient_id,$pd_id){
		
		$where = array('patient_id' => $patient_id,'pd_id' => $pd_id);
		$this->db->where($where);
		$this->db->delete('tbl_patient_prov_diagnosis');
		return $pd_id;
	}	
	
	function delete_goal($patient_id,$goal_id){
		
		$where = array('patient_id' => $patient_id,'goal_id' => $goal_id);
		$this->db->where($where);
		$this->db->delete('tbl_patient_goals');
		return $goal_id;
	}
	
	function deleteCaseNotes($patient_id,$cn_id){
		
		$where = array('patient_id' => $patient_id,'cn_id' => $cn_id);
		$this->db->where($where);
		$this->db->delete('tbl_patient_case_notes');
		return $cn_id;
	}
	
	function deleteProgNotes($patient_id,$pn_id){
		
		$where = array('patient_id' => $patient_id,'pn_id' => $pn_id);
		$this->db->where($where);
		$this->db->delete('tbl_patient_prog_notes');
		return $pn_id;
	}
	
	function deleteRemarks($patient_id,$remark_id){
		
		$where = array('patient_id' => $patient_id,'remark_id' => $remark_id);
		$this->db->where($where);
		$this->db->delete('tbl_patient_remarks');
		return $remark_id;
	}
	
	function deleteTreatmentTechnique($patient_id,$treatmentGroupId){
		
		$where = array('patient_id' => $patient_id,'treatment_group_id' => $treatmentGroupId);
		$this->db->where($where);
		$this->db->select('bill_id')->from('tbl_patient_treatment_techniques');
		$res = $this->db->get();
		$bill_id = $res->row()->bill_id;
		
		$this->db->where('bill_id',$bill_id);
		$this->db->select('patient_id')->from('tbl_invoice_header');
		$res = $this->db->get();
		if($res->result_array() != false){
		} else {
			$where = array('patient_id' => $patient_id,'treatment_group_id' => $treatmentGroupId);
		    $this->db->where($where);
			$this->db->delete('tbl_patient_treatment_techniques');
		    return $treatmentGroupId;
		}
	   return $bill_id;
	}
	//related records count
	public function hasInvoice($patient_id)
	{
		$where=array('patient_id' => $patient_id);
		$this->db->select('patient_id')->from('tbl_invoice_header')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	//related records count
	public function hasTreatmentInvoice($patient_id,$treatmentGroupId)
	{
		$where=array('patient_id' => $patient_id,'treatment_group_id' => $treatmentGroupId,'bill_status' => 1);
		$this->db->select('patient_id')->from('tbl_patient_treatment_techniques')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	public function history_info($patient_id)
	{
		    $count = $this->patient_model->getPatientHisCount($patient_id);
			$history_info = array(
			'patient_id' => $patient_id,
			'client_id' => $this->session->userdata('client_id'),
			'his_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('his_date')))),
			'his_other_disease' => $this->input->post('his_other_disease'),
			'medical' => $this->input->post('medical'),
			'surgical' => $this->input->post('surgical'),
			'dermat' => $this->input->post('dermat'),
			'fracture' => $this->input->post('fracture'),
			'addiction' => $this->input->post('addiction'),
			'diabetes' => $this->input->post('diabetes'),
			'blood_pressure' => $this->input->post('blood_pressure'),
			'medicine_used_prev' => $this->input->post('medicineusedpreviously'),
			'surgery_dtl' => $this->input->post('Surgery'),
			'smoking' => $this->input->post('smoking'),
			'drinking' => $this->input->post('drinking'),
			'Fever' => $this->input->post('Fever'),
			'Heart' => $this->input->post('Heart'),
			'Disorder' => $this->input->post('Disorder'),
			'Infection' => $this->input->post('Infection'),
			'Pregnancy' => $this->input->post('Pregnancy'),
			'HTN' => $this->input->post('HTN'),
			'TB' => $this->input->post('TB'),
			'Cancer' => $this->input->post('Cancer'),
			'AIDS' => $this->input->post('AIDS'),
			'Surgery' => $this->input->post('Surgery'),
			'Allergies' => $this->input->post('Allergies'),
			'Osteoporotic' => $this->input->post('Osteoporotic'),
			'Depression' => $this->input->post('Depression'),
			'Hepatitis' => $this->input->post('Hepatitis'),
			'Implants' => $this->input->post('Implants'),
			'hereditary_disease' => $this->input->post('hereditary_disease'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
				
		$this->db->insert('tbl_patient_history', $history_info);
		$data['patient_id']=$patient_id;
		$id = $this->db->insert_id();
		$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('his_date'))));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false)
		{
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		$history = $this->editHistory($patient_id,$id);
			$enteredBy = $history['modify_by'];
				$profileInfo = $this->registration_model->getProfileInfo($enteredBy);
				$staffInfo = $this->staff_model->getStaffInfo($enteredBy);
				
				if($profileInfo != false)
					$clientName = $profileInfo['first_name'];
				else if($staffInfo != false)
					$clientName = $staffInfo['first_name'].' '.$staffInfo['last_name'];
				$url=base_url().'client/patient/edit_assessment_history/'.$patient_id.'/'.$id;
				$html = '
					 <tr>
						<td class="actions text-center">'. date('d-m-Y',strtotime($history['his_date'])).'</td>
							<td class="actions text-center">'. $history['medical'].'</td>
							<td class="actions text-center"><a class="edit" href="'.$url.'"><button type="submit" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="DeleteCaseNotes" href="#'.$history['patient_id'].'#'.$history['his_id'].'"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fa fa-trash-alt"></i>  </button></a></td>
					</tr>  
				';
			return $html;
		
	}
	
	public function edit_history_info($patient_id,$his_id) {
		
		$history_info = array(
			'patient_id' => $patient_id,
			'client_id' => $this->session->userdata('client_id'),
			'his_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('his_date')))),
			'his_other_disease' => $this->input->post('his_other_disease'),
			'medical' => $this->input->post('medical'),
			'surgical' => $this->input->post('surgical'),
			'dermat' => $this->input->post('dermat'),
			'fracture' => $this->input->post('fracture'),
			'addiction' => $this->input->post('addiction'),
			'diabetes' => $this->input->post('diabetes'),
			'blood_pressure' => $this->input->post('blood_pressure'),
			'medicine_used_prev' => $this->input->post('medicineusedpreviously'),
			'surgery_dtl' => $this->input->post('Surgery'),
			'smoking' => $this->input->post('smoking'),
			'drinking' => $this->input->post('drinking'),
			'Fever' => $this->input->post('Fever'),
			'Heart' => $this->input->post('Heart'),
			'Disorder' => $this->input->post('Disorder'),
			'Infection' => $this->input->post('Infection'),
			'Pregnancy' => $this->input->post('Pregnancy'),
			'HTN' => $this->input->post('HTN'),
			'TB' => $this->input->post('TB'),
			'Cancer' => $this->input->post('Cancer'),
			'AIDS' => $this->input->post('AIDS'),
			'Surgery' => $this->input->post('Surgery'),
			'Allergies' => $this->input->post('Allergies'),
			'Osteoporotic' => $this->input->post('Osteoporotic'),
			'Depression' => $this->input->post('Depression'),
			'Hepatitis' => $this->input->post('Hepatitis'),
			'Implants' => $this->input->post('Implants'),
			'hereditary_disease' => $this->input->post('hereditary_disease'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
				
		$where = array('patient_id' => $patient_id, 'his_id' => $his_id);
		$this->db->where($where);
		$this->db->update('tbl_patient_history',$history_info);
		$data['patient_id']=$patient_id;
		$data['his_id']=$his_id;
		$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('his_date'))));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		return $data;
		
	}
	/* public function edit_medi_info($patient_id,$medi_id) {
		
		$medi_info = array(
			'patient_id' => $patient_id,
			'bio' => $this->input->post('bio')
			
		);
				
		$where = array('patient_id' => $patient_id, 'medi_id' => $medi_id);
		$this->db->where($where);
		$this->db->update('tbl_patient_medi_info',$medi_info);
		return $data;
		
	} */
	
	public function editHistory($patient_id,$his_id)
	{
		$where = array('patient_id' => $patient_id, 'his_id' => $his_id);
		$this->db->select('*')->from('tbl_patient_history')->where($where);
		$query=$this->db->get();
		
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function edit_medi($patient_id,$medi_id)
	{
		$where = array('patient_id' => $patient_id, 'medi_id' => $medi_id);
		$this->db->select('*')->from('tbl_patient_medi_info')->where($where);
		$query=$this->db->get();
		
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	public function complaint_info($patient_id) {
		$count = $this->patient_model->getPatientCcCount($patient_id);
		$complaint_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'cc_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('cc_date')))),
			'chief_complaints_dtl' => $this->input->post('chief_complaints_dtl'),
			'how_long_you_had_this_prob' => $this->input->post('how_long_you_had_this_prob'),
			'had_this_problem_before' => $this->input->post('had_this_problem_before'),
			'what_treatment_you_had' => $this->input->post('what_treatment_you_had'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
		
		$this->db->insert('tbl_patient_chief_complaints', $complaint_info);
		$data['patient_id']=$patient_id;
		$id=$this->db->insert_id();
		$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('cc_date'))));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		$chiefcomp = $this->editChiefcomp($patient_id,$id);
			$enteredBy = $chiefcomp['modify_by'];
				$profileInfo = $this->registration_model->getProfileInfo($enteredBy);
				$staffInfo = $this->staff_model->getStaffInfo($enteredBy);
				
				if($profileInfo != false)
					$clientName = $profileInfo['first_name'];
				else if($staffInfo != false)
					$clientName = $staffInfo['first_name'].' '.$staffInfo['last_name'];
				$url=base_url().'client/patient/edit_assessment_chiefcomp/'.$patient_id.'/'.$id;
				$html = '
					 <tr>
						<td class="actions text-center">'. date('d-m-Y',strtotime($chiefcomp['cc_date'])).'</td>
							<td class="actions text-center">'. $chiefcomp['chief_complaints_dtl'].'</td>
							<td class="actions text-center"><a class="edit" href="'.$url.'"><button type="submit" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="DeleteCaseNotes" href="#'.$chiefcomp['patient_id'].'#'.$chiefcomp['cc_id'].'"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fa fa-trash-alt"></i>  </button></a></td>
					</tr>  
				';
			return $html;
		
	}
	
	public function edit_complaint_info($patient_id,$cc_id) {
		
		$complaint_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'cc_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('cc_date')))),
			'chief_complaints_dtl' => $this->input->post('chief_complaints_dtl'),
			'how_long_you_had_this_prob' => $this->input->post('how_long_you_had_this_prob'),
			'had_this_problem_before' => $this->input->post('had_this_problem_before'),
			'what_treatment_you_had' => $this->input->post('what_treatment_you_had'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
		
		$where = array('patient_id' => $patient_id, 'cc_id' => $cc_id);
		$this->db->where($where);
		$this->db->update('tbl_patient_chief_complaints',$complaint_info);
		$data['patient_id']=$patient_id;
		$id=$cc_id;
		$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('cc_date'))));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		return $id;
		
	}
	
	public function editChiefcomp($patient_id,$cc_id)
	{
		$where = array('patient_id' => $patient_id, 'cc_id' => $cc_id);
		$this->db->select('*')->from('tbl_patient_chief_complaints')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	public function pain_info($patient_id) {
		$count = $this->patient_model->getPatientPainCount($patient_id);
		$var = implode(',', $_POST['diurnal_variations']); 
		$pain_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'pain_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('pain_date')))),
			'severity_of_pain' => $this->input->post('severity_of_pain'),
			'Threshold' => $this->input->post('Threshold'),
			
			'pain_site' => $this->input->post('pain_site'),
			'pain_nature' => $this->input->post('pain_nature'),
			'pain_onset' => $this->input->post('pain_onset'),
			'pain_duration' => $this->input->post('pain_duration'),
			'side_or_location' => $this->input->post('side_or_location'),
			'diurnal_variations' => $var,
			'trigger_point' => $this->input->post('trigger_point'),
			'adl_affect' => $this->input->post('adl_affect'),
			'aggravating_factors' => $this->input->post('aggravating_factors'),
			'releaving_factors' => $this->input->post('releaving_factors'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
				
		$this->db->insert('tbl_patient_pain', $pain_info);
		$data['patient_id']=$patient_id;
		$id = $this->db->insert_id();
		$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('pain_date'))));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		$pain = $this->editPain($patient_id,$id);
			$enteredBy = $pain['modify_by'];
				$profileInfo = $this->registration_model->getProfileInfo($enteredBy);
				$staffInfo = $this->staff_model->getStaffInfo($enteredBy);
				
				if($profileInfo != false)
					$clientName = $profileInfo['first_name'];
				else if($staffInfo != false)
					$clientName = $staffInfo['first_name'].' '.$staffInfo['last_name'];
				$url=base_url().'client/patient/edit_assessment_pain/'.$patient_id.'/'.$id;
				$html = '
					 <tr>
						<td class="actions text-center">'. date('d-m-Y',strtotime($pain['pain_date'])).'</td>
							<td class="actions text-center">'. $pain['pain_site'].'</td>
							<td class="actions text-center">'. $pain['severity_of_pain'].'</td>
							<td class="actions text-center"><a class="edit" href="'.$url.'"><button type="submit" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="DeleteCaseNotes" href="#'.$pain['patient_id'].'#'.$pain['pain_id'].'"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fa fa-trash-alt"></i>  </button></a></td>
					</tr>  
				';
			return $html;
	}
	
	public function edit_pain_info($patient_id,$pain_id) {
		
		$var = implode(',', $_POST['diurnal_variations']); 
		$pain_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'pain_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('pain_date')))),
			'severity_of_pain' => $this->input->post('severity_of_pain'),
			'Threshold' => $this->input->post('Threshold'),
			'pain_site' => $this->input->post('pain_site'),
			'pain_nature' => $this->input->post('pain_nature'),
			'pain_onset' => $this->input->post('pain_onset'),
			'pain_duration' => $this->input->post('pain_duration'),
			'side_or_location' => $this->input->post('side_or_location'),
			'diurnal_variations' =>$var,
			'trigger_point' => $this->input->post('trigger_point'),
			'adl_affect' => $this->input->post('adl_affect'),
 			'aggravating_factors' => $this->input->post('aggravating_factors'),
			'releaving_factors' => $this->input->post('releaving_factors'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
				
		$where = array('patient_id' => $patient_id, 'pain_id' => $pain_id);
		$this->db->where($where);
		$this->db->update('tbl_patient_pain',$pain_info);
		$data['patient_id']=$patient_id;
		$data['pain_id']=$pain_id;
		$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('pain_date'))));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		return $data;
	}
	
	public function editPain($patient_id,$pain_id)
	{
		$where = array('patient_id' => $patient_id, 'pain_id' => $pain_id);
		$this->db->select('*')->from('tbl_patient_pain')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	public function examination_info($patient_id) {
		$count = $this->patient_model->getPatientExamnCount($patient_id);
		$examination_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'examn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('examn_date')))),
			'bp_systolic_diastolic' => $this->input->post('bp_systolic_diastolic'),
			'temperature' => $this->input->post('temperature'),
			'heart_rate' => $this->input->post('heart_rate'),
			'respiratory_rate' => $this->input->post('respiratory_rate'),
			'built_of_patient' => $this->input->post('built_of_patient'),
			'posture' => $this->input->post('posture'),
			'gait' => $this->input->post('gait'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
			'scar' => $this->input->post('scaretype'), 
			'desc' => $this->input->post('Description')
		);
				
		$this->db->insert('tbl_patient_examination', $examination_info);
		$data['patient_id']=$patient_id;
		$id = $this->db->insert_id();
		$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('examn_date'))));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		$examn = $this->editExamn($patient_id,$id);
			$enteredBy = $examn['modify_by'];
				$profileInfo = $this->registration_model->getProfileInfo($enteredBy);
				$staffInfo = $this->staff_model->getStaffInfo($enteredBy);
				
				if($profileInfo != false)
					$clientName = $profileInfo['first_name'];
				else if($staffInfo != false)
					$clientName = $staffInfo['first_name'].' '.$staffInfo['last_name'];
				$url=base_url().'client/patient/edit_assessment_exam/'.$patient_id.'/'.$id;
				$html = '
					  <tr>
					  <td class="actions text-center">'.date('d/m/Y', strtotime($examn['examn_date'])).'</td>
					  <td class="actions text-center">'. $examn['bp_systolic_diastolic'].'</td>
					  <td class="actions text-center">'.$examn['temperature'].'</td>
					  <td class="actions text-center"><a class="edit" href="'.$url.'"><button type="submit" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="DeleteCaseNotes" href="#'.$patient_id.'#'.$id.'"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fa fa-trash-alt"></i>  </button></a></td>
				
					</tr>
				';
			return $html;
		
	}
	
	public function editExamn($patient_id,$examn_id)
	{
		$where = array('patient_id' => $patient_id, 'examn_id' => $examn_id);
		$this->db->select('*')->from('tbl_patient_examination')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	public function edit_examination_info($patient_id,$examn_id)
	{
			$examination_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'examn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('examn_date')))),
			'bp_systolic_diastolic' => $this->input->post('bp_systolic_diastolic'),
			'temperature' => $this->input->post('temperature'),
			'heart_rate' => $this->input->post('heart_rate'),
			'respiratory_rate' => $this->input->post('respiratory_rate'),
			'built_of_patient' => $this->input->post('built_of_patient'),
			'posture' => $this->input->post('posture'),
			'gait' => $this->input->post('gait'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
			'scar' => $this->input->post('scartype'),
			'desc' => $this->input->post('Description'),
		);
				
		$where = array('patient_id' => $patient_id, 'examn_id' => $examn_id);
		$this->db->where($where);
		$this->db->update('tbl_patient_examination',$examination_info);
		$data['patient_id']=$patient_id;
		$data['examn_id']=$examn_id;
		$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('examn_date'))));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		return $data;
		
	}
	
	public function getHipMuscles() {
        $data = array();
		$this->db->select('*')->from('tbl_hip_muscles')->order_by('hip_muscle_id');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	public function getMediDiag($patient_id) {
        $data = array();
		$this->db->where('patient_id',$patient_id);
		$this->db->select('*')->from('tbl_patient_medi_info');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	
	public function getKneeMuscles() {
        $data = array();
		$this->db->select('*')->from('tbl_knee_muscles')->order_by('knee_muscle_id');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	public function getMotorexamn() {
        $data = array();
		$this->db->select('*')->from('tbl_patient_motor_examination');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	
	public function getAnkleMuscles() {
        $data = array();
		$this->db->select('*')->from('tbl_ankle_muscles')->order_by('ankle_muscle_id');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	
	public function getToesMuscles() {
        $data = array();
		$this->db->select('*')->from('tbl_toes_muscles')->order_by('toes_muscle_id');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	
	public function getHalluxMuscles() {
        $data = array();
		$this->db->select('*')->from('tbl_hallux_muscles')->order_by('hallux_muscle_id');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	
	public function getScapulaMuscles() {
        $data = array();
		$this->db->select('*')->from('tbl_scapula_muscles')->order_by('scapula_muscle_id');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	
	public function getShoulderMuscles() {
        $data = array();
		$this->db->select('*')->from('tbl_shoulder_muscles')->order_by('shoulder_muscle_id');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	
	public function getElbowMuscles() {
        $data = array();
		$this->db->select('*')->from('tbl_elbow_muscles')->order_by('elbow_muscle_id');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	
	public function getForearmMuscles() {
        $data = array();
		$this->db->select('*')->from('tbl_forearm_muscles')->order_by('forearm_muscle_id');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	
	public function getWristMuscles() {
        $data = array();
		$this->db->select('*')->from('tbl_wrist_muscles')->order_by('wrist_muscle_id');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	
	public function getFingersMuscles() {
        $data = array();
		$this->db->select('*')->from('tbl_fingers_muscles')->order_by('fingers_muscle_id');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	
	public function getThumbMuscles() {
        $data = array();
		$this->db->select('*')->from('tbl_thumb_muscles')->order_by('thumb_muscle_id');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	
	public function getHeadneckMuscles() {
        $data = array();
		$this->db->select('*')->from('tbl_headneck_muscles')->order_by('headneck_muscle_id');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	
	public function getRespirationMuscles() {
        $data = array();
		$this->db->select('*')->from('tbl_respiration_muscles')->order_by('respiration_muscle_id');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	
	public function mexamination_info($patient_id) {
		 $count = $this->patient_model->getPatientMexamnCount($patient_id);
		$mexamination_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
			'ant_spine_to_inmal' => $this->input->post('ant_spine_to_inmal'),
			'app_leg_shoet' => $this->input->post('app_leg_shoet'),
			'mid_thigh_circum' => $this->input->post('mid_thigh_circum'),
			'mid_calf_circum' => $this->input->post('mid_calf_circum'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
				
		$this->db->insert('tbl_patient_motor_examination', $mexamination_info);
		$data['patient_id']=$patient_id;
		$id = $this->db->insert_id();
		$mexamn_id = $id;
		$flexion1=$this->input->post('flexion1');
		$Extension1=$this->input->post('Extension1');
		$SideFlexion_left1=$this->input->post('SideFlexion_left1');
		$SideFlexion_right1=$this->input->post('SideFlexion_right1');
		$Rotation_left1=$this->input->post('Rotation_left1');
		$Rotation_right1=$this->input->post('Rotation_right1');
		if($flexion1 != '' || $Extension1 != '' || $SideFlexion_left1 != '' || $SideFlexion_right1 != '' || $Rotation_left1 != '' || $Rotation_right1 != '')
		{
		$cervical = array(
			'client_id' => $this->session->userdata('client_id'),
			'mexamn_id' => $mexamn_id,
			'flexion1' => $this->input->post('flexion1'),
			'patient_id' => $patient_id,
			'Extension1' => $this->input->post('Extension1'),
			'SideFlexion_left1' => $this->input->post('SideFlexion_left1'),
			'SideFlexion_right1' => $this->input->post('SideFlexion_right1'),
			'Rotation_left1' => $this->input->post('Rotation_left1'),
			'Rotation_right1' => $this->input->post('Rotation_right1'),
		);
				
		$this->db->insert('tbl_patient_motor_cervical', $cervical);
		}
		$ankle = array();
		$leftAnkleTone=$_POST['left_ankle_tone'];
		$leftAnklePower=$_POST['left_ankle_power'];
		$leftAnkleRom=$_POST['left_ankle_rom'];
		$rightAnkleTone=$_POST['right_ankle_tone'];
		$rightAnklePower=$_POST['right_ankle_power'];
		$rightAnkleRom=$_POST['right_ankle_rom'];
		$ankleMuscleId=$_POST['ankle_muscle_id'];
		$totAnkleMuscle=count($_POST['ankle_muscle_id']);
		for($i=0; $i<$totAnkleMuscle; $i++)
		{
				if($leftAnkleTone[$i]!='' || $leftAnklePower[$i]!='' || $leftAnkleRom[$i]!='' || $rightAnkleTone[$i]!='' || $rightAnklePower[$i]!='' || $rightAnkleRom[$i]!='' )
				{
					$ankle[$i] = array(
					'client_id' => $this->session->userdata('client_id'),
					'patient_id' => $patient_id,
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'ankle_muscle_id' => $ankleMuscleId[$i],
					'left_ankle_tone' => $leftAnkleTone[$i],
					'left_ankle_power' => $leftAnklePower[$i],
					'left_ankle_rom' => $leftAnkleRom[$i],
					'right_ankle_tone' => $rightAnkleTone[$i],
					'right_ankle_power' => $rightAnklePower[$i],
					'right_ankle_rom' => $rightAnkleRom[$i],
				);
			}
		}
		if(!empty($ankle)){
			$this->db->insert_batch('tbl_patient_mexamination_ankle', $ankle);
		}
		
		$elbow = array();
		$leftElbowTone=$_POST['left_elbow_tone'];
		$leftElbowPower=$_POST['left_elbow_power'];
		$leftElbowRom=$_POST['left_elbow_rom'];
		$rightElbowTone=$_POST['right_elbow_tone'];
		$rightElbowPower=$_POST['right_elbow_power'];
		$rightElbowRom=$_POST['right_elbow_rom'];
		$elbowMuscleId=$_POST['elbow_muscle_id'];
		$totElbowMuscle=count($_POST['elbow_muscle_id']);
		for($j=0; $j<$totElbowMuscle; $j++)
		{
				if($leftElbowTone[$j]!='' || $leftElbowPower[$j]!='' || $leftElbowRom[$j]!='' || $rightElbowTone[$j]!='' || $rightElbowPower[$j]!='' || $rightElbowRom[$j]!='' )
				{
					$elbow[$j] = array(
					'client_id' => $this->session->userdata('client_id'),
					'patient_id' => $patient_id,
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'elbow_muscle_id' => $elbowMuscleId[$j],
					'left_elbow_tone' => $leftElbowTone[$j],
					'left_elbow_power' => $leftElbowPower[$j],
					'left_elbow_rom' => $leftElbowRom[$j],
					'right_elbow_tone' => $rightElbowTone[$j],
					'right_elbow_power' => $rightElbowPower[$j],
					'right_elbow_rom' => $rightElbowRom[$j],
				);
			}
		}
		if(!empty($elbow))
		{
			$this->db->insert_batch('tbl_patient_mexamination_elbow', $elbow);
		}
		$cervical=$this->input->post('cervical');
		$thoracic=$this->input->post('thoracic');
		$lumbar=$this->input->post('lumbar');
		if($cervical != '' || $thoracic != '' || $lumbar != '')
		{
		$combined = array(
			'client_id' => $this->session->userdata('client_id'),
			'cervical' => $this->input->post('cervical'),
			'mexamn_id' => $mexamn_id,
			'patient_id' => $patient_id,
			'thoracic' => $this->input->post('thoracic'),
			'lumbar' => $this->input->post('lumbar'),
			
		);
				
		$this->db->insert('tbl_patient_motor_Combined', $combined);
		}
		$flexion2=$this->input->post('flexion2');
		$Extension2=$this->input->post('Extension2');
		$SideFlexion_left2=$this->input->post('SideFlexion_left2');
		$SideFlexion_right2=$this->input->post('SideFlexion_right2');
		$Rotation_left2=$this->input->post('Rotation_left2');
		$Rotation_right2=$this->input->post('Rotation_right2');
		

		if($flexion2 != '' || $Extension2 != '' || $SideFlexion_left2 != '' || $SideFlexion_right2 != '' || $Rotation_left2 != '' || $Rotation_right2 != '')
		{
		
		$tho = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'mexamn_id' => $mexamn_id,
			'flexion2' => $this->input->post('flexion2'),
			'Extension2' => $this->input->post('Extension2'),
			'SideFlexion_left2' => $this->input->post('SideFlexion_left2'),
			'SideFlexion_right2' => $this->input->post('SideFlexion_right2'),
			'rotation_left2' => $this->input->post('rotation_left2'),
			'rotation_right2' => $this->input->post('rotation_right2')
		);
		$this->db->insert('tbl_patient_motor_thoraccic',$tho);
		}
		
		$thoraccic=$this->input->post('thoraccic');
		$flexion3=$this->input->post('flexion3');
		$Extension3=$this->input->post('Extension3');
		$SideFlexion_left3=$this->input->post('SideFlexion_left3');
		$SideFlexion_right3=$this->input->post('SideFlexion_right3');
		$Rotation_left3=$this->input->post('Rotation_left3');
		$Rotation_right3=$this->input->post('Rotation_right3');
		

		if($flexion3 != '' || $Extension3 != '' || $SideFlexion_left3 != '' || $SideFlexion_right3 != '' || $Rotation_left3 != '' || $Rotation_right3 != '')
		{
		
		$lum = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'mexamn_id' => $mexamn_id,
			'flexion3' => $this->input->post('flexion3'),
			'Extension3' => $this->input->post('Extension3'),
			'SideFlexion_left3' => $this->input->post('SideFlexion_left3'),
			'SideFlexion_right3' => $this->input->post('SideFlexion_right3'),
			'rotation_left3' => $this->input->post('rotation_left3'),
			'rotation_right3' => $this->input->post('rotation_right3')
		);
		$this->db->insert('tbl_patient_motor_lumber',$lum);
		}
		
		$fingers = array();
		$leftFingersTone=$_POST['left_fingers_tone'];
		$leftFingersPower=$_POST['left_fingers_power'];
		$leftFingersRom=$_POST['left_fingers_rom'];
		$rightFingersTone=$_POST['right_fingers_tone'];
		$rightFingersPower=$_POST['right_fingers_power'];
		$rightFingersRom=$_POST['right_fingers_rom'];
		$fingersMuscleId=$_POST['fingers_muscle_id'];
		$totFingersMuscle=count($_POST['fingers_muscle_id']);
		for($k=0; $k<$totFingersMuscle; $k++)
		{
				if($leftFingersTone[$k]!='' || $leftFingersPower[$k]!='' || $leftFingersRom[$k]!='' || $rightFingersTone[$k]!='' || $rightFingersPower[$k]!='' || $rightFingersRom[$k]!='' )
				{
					$fingers[$k] = array(
					'client_id' => $this->session->userdata('client_id'),
					'patient_id' => $patient_id,
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'fingers_muscle_id' => $fingersMuscleId[$k],
					'left_fingers_tone' => $leftFingersTone[$k],
					'left_fingers_power' => $leftFingersPower[$k],
					'left_fingers_rom' => $leftFingersRom[$k],
					'right_fingers_tone' => $rightFingersTone[$k],
					'right_fingers_power' => $rightFingersPower[$k],
					'right_fingers_rom' => $rightFingersRom[$k],
				);
			}
		}
		if(!empty($fingers)){
			$this->db->insert_batch('tbl_patient_mexamination_fingers', $fingers);
		}
		
		$forearm = array();
		$leftForearmTone=$_POST['left_forearm_tone'];
		$leftForearmPower=$_POST['left_forearm_power'];
		$leftForearmRom=$_POST['left_forearm_rom'];
		$rightForearmTone=$_POST['right_forearm_tone'];
		$rightForearmPower=$_POST['right_forearm_power'];
		$rightForearmRom=$_POST['right_forearm_rom'];
		$forearmMuscleId=$_POST['forearm_muscle_id'];
		$totForearmMuscle=count($_POST['forearm_muscle_id']);
		for($l=0; $l<$totForearmMuscle; $l++)
		{
				if($leftForearmTone[$l]!='' || $leftForearmPower[$l]!='' || $leftForearmRom[$l]!='' || $rightForearmTone[$l]!='' || $rightForearmPower[$l]!='' || $rightForearmRom[$l]!='' )
				{
					$forearm[$l] = array(
					'client_id' => $this->session->userdata('client_id'),
					'patient_id' => $patient_id,
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'forearm_muscle_id' => $forearmMuscleId[$l],
					'left_forearm_tone' => $leftForearmTone[$l],
					'left_forearm_power' => $leftForearmPower[$l],
					'left_forearm_rom' => $leftForearmRom[$l],
					'right_forearm_tone' => $rightForearmTone[$l],
					'right_forearm_power' => $rightForearmPower[$l],
					'right_forearm_rom' => $rightForearmRom[$l],
				);
			}
		}
		if(!empty($forearm)){
			$this->db->insert_batch('tbl_patient_mexamination_forearm', $forearm);
		}
		
		$hallux = array();
		$leftHalluxTone=$_POST['left_hallux_tone'];
		$leftHalluxPower=$_POST['left_hallux_power'];
		$leftHalluxRom=$_POST['left_hallux_rom'];
		$rightHalluxTone=$_POST['right_hallux_tone'];
		$rightHalluxPower=$_POST['right_hallux_power'];
		$rightHalluxRom=$_POST['right_hallux_rom'];
		$halluxMuscleId=$_POST['hallux_muscle_id'];
		$totHalluxMuscle=count($_POST['hallux_muscle_id']);
		for($m=0; $m<$totHalluxMuscle; $m++)
		{
				if($leftHalluxTone[$m]!='' || $leftHalluxPower[$m]!='' || $leftHalluxRom[$m]!='' || $rightHalluxTone[$m]!='' || $rightHalluxPower[$m]!='' || $rightHalluxRom[$m]!='' )
				{
					$hallux[$m] = array(
					'client_id' => $this->session->userdata('client_id'),
					'patient_id' => $patient_id,
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'hallux_muscle_id' => $halluxMuscleId[$m],
					'left_hallux_tone' => $leftHalluxTone[$m],
					'left_hallux_power' => $leftHalluxPower[$m],
					'left_hallux_rom' => $leftHalluxRom[$m],
					'right_hallux_tone' => $rightHalluxTone[$m],
					'right_hallux_power' => $rightHalluxPower[$m],
					'right_hallux_rom' => $rightHalluxRom[$m],
				);
			}
		}
		if(!empty($hallux)){
			$this->db->insert_batch('tbl_patient_mexamination_hallux', $hallux);
		}
		
		$headneck = array();
		$leftHeadneckTone=$_POST['left_headneck_tone'];
		$leftHeadneckPower=$_POST['left_headneck_power'];
		$leftHeadneckRom=$_POST['left_headneck_rom'];
		$rightHeadneckTone=$_POST['right_headneck_tone'];
		$rightHeadneckPower=$_POST['right_headneck_power'];
		$rightHeadneckRom=$_POST['right_headneck_rom'];
		$headneckMuscleId=$_POST['headneck_muscle_id'];
		$totHeadneckMuscle=count($_POST['headneck_muscle_id']);
		for($n=0; $n<$totHeadneckMuscle; $n++)
		{
				if($leftHeadneckTone[$n]!='' || $leftHeadneckPower[$n]!='' || $leftHeadneckRom[$n]!='' || $rightHeadneckTone[$n]!='' || $rightHeadneckPower[$n]!='' || $rightHeadneckRom[$n]!='' )
				{
					$headneck[$n] = array(
					'client_id' => $this->session->userdata('client_id'),
					'patient_id' => $patient_id,
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'headneck_muscle_id' => $headneckMuscleId[$n],
					'left_headneck_tone' => $leftHeadneckTone[$n],
					'left_headneck_power' => $leftHeadneckPower[$n],
					'left_headneck_rom' => $leftHeadneckRom[$n],
					'right_headneck_tone' => $rightHeadneckTone[$n],
					'right_headneck_power' => $rightHeadneckPower[$n],
					'right_headneck_rom' => $rightHeadneckRom[$n],
				);
			}
		}
		if(!empty($headneck)){
			$this->db->insert_batch('tbl_patient_mexamination_headneck', $headneck);
		}
		
		$hip = array();
		$leftHipTone=$_POST['left_hip_tone'];
		$leftHipPower=$_POST['left_hip_power'];
		$leftHipRom=$_POST['left_hip_rom'];
		$rightHipTone=$_POST['right_hip_tone'];
		$rightHipPower=$_POST['right_hip_power'];
		$rightHipRom=$_POST['right_hip_rom'];
		$hipMuscleId=$_POST['hip_muscle_id'];
		$totHipMuscle=count($_POST['hip_muscle_id']);
		for($o=0; $o<$totHipMuscle; $o++)
		{
				if($leftHipTone[$o]!='' || $leftHipPower[$o]!='' || $leftHipRom[$o]!='' || $rightHipTone[$o]!='' || $rightHipPower[$o]!='' || $rightHipRom[$o]!='' )
				{
					$hip[$o] = array(
					'client_id' => $this->session->userdata('client_id'),
					'patient_id' => $patient_id,
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'hip_muscle_id' => $hipMuscleId[$o],
					'left_hip_tone' => $leftHipTone[$o],
					'left_hip_power' => $leftHipPower[$o],
					'left_hip_rom' => $leftHipRom[$o],
					'right_hip_tone' => $rightHipTone[$o],
					'right_hip_power' => $rightHipPower[$o],
					'right_hip_rom' => $rightHipRom[$o],
				);
			}
		}
		if(!empty($hip)){
			$this->db->insert_batch('tbl_patient_mexamination_hip', $hip);
		}
		
		$knee = array();
		$leftKneeTone=$_POST['left_knee_tone'];
		$leftKneePower=$_POST['left_knee_power'];
		$leftKneeRom=$_POST['left_knee_rom'];
		$rightKneeTone=$_POST['right_knee_tone'];
		$rightKneePower=$_POST['right_knee_power'];
		$rightKneeRom=$_POST['right_knee_rom'];
		$kneeMuscleId=$_POST['knee_muscle_id'];
		$totKneeMuscle=count($_POST['knee_muscle_id']);
		for($p=0; $p<$totKneeMuscle; $p++)
		{
				if($leftKneeTone[$p]!='' || $leftKneePower[$p]!='' || $leftKneeRom[$p]!='' || $rightKneeTone[$p]!='' || $rightKneePower[$p]!='' || $rightKneeRom[$p]!='' )
				{
					$knee[$p] = array(
					'client_id' => $this->session->userdata('client_id'),
					'patient_id' => $patient_id,
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'knee_muscle_id' => $kneeMuscleId[$p],
					'left_knee_tone' => $leftKneeTone[$p],
					'left_knee_power' => $leftKneePower[$p],
					'left_knee_rom' => $leftKneeRom[$p],
					'right_knee_tone' => $rightKneeTone[$p],
					'right_knee_power' => $rightKneePower[$p],
					'right_knee_rom' => $rightKneeRom[$p],
				);
			}
		}
		if(!empty($knee)){
			$this->db->insert_batch('tbl_patient_mexamination_knee', $knee);
		}
		
		$respiration = array();
		$respirationApex=$_POST['respiration_apex'];
		$respirationBase=$_POST['respiration_base'];
		$respirationMuscleId=$_POST['respiration_muscle_id'];
		$totRespirationMuscle=count($_POST['respiration_muscle_id']);
		for($q=0; $q<$totRespirationMuscle; $q++)
		{
				if($respirationApex[$q]!='' || $respirationBase[$q]!='' )
				{
					$respiration[$q] = array(
					'client_id' => $this->session->userdata('client_id'),
					'patient_id' => $patient_id,
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'respiration_muscle_id' => $respirationMuscleId[$q],
					'respiration_apex' => $respirationApex[$q],
					'respiration_base' => $respirationBase[$q],
				);
			}
		}
		if(!empty($respiration)){
			$this->db->insert_batch('tbl_patient_mexamination_respiration', $respiration);
		}
		
		$scapula = array();
		$leftScapulaTone=$_POST['left_scapula_tone'];
		$leftScapulaPower=$_POST['left_scapula_power'];
		$leftScapulaRom=$_POST['left_scapula_rom'];
		$rightScapulaTone=$_POST['right_scapula_tone'];
		$rightScapulaPower=$_POST['right_scapula_power'];
		$rightScapulaRom=$_POST['right_scapula_rom'];
		$scapulaMuscleId=$_POST['scapula_muscle_id'];
		$totScapulaMuscle=count($_POST['scapula_muscle_id']);
		for($r=0; $r<$totScapulaMuscle; $r++)
		{
				if($leftScapulaTone[$r]!='' || $leftScapulaPower[$r]!='' || $leftScapulaRom[$r]!='' || $rightScapulaTone[$r]!='' || $rightScapulaPower[$r]!='' || $rightScapulaRom[$r]!='' )
				{
					$scapula[$r] = array(
					'client_id' => $this->session->userdata('client_id'),
					'patient_id' => $patient_id,
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'scapula_muscle_id' => $scapulaMuscleId[$r],
					'left_scapula_tone' => $leftScapulaTone[$r],
					'left_scapula_power' => $leftScapulaPower[$r],
					'left_scapula_rom' => $leftScapulaRom[$r],
					'right_scapula_tone' => $rightScapulaTone[$r],
					'right_scapula_power' => $rightScapulaPower[$r],
					'right_scapula_rom' => $rightScapulaRom[$r],
				);
			}
		}
		if(!empty($scapula)){
			$this->db->insert_batch('tbl_patient_mexamination_scapula', $scapula);
		}
		
		$shoulder = array();
		$leftShoulderTone=$_POST['left_shoulder_tone'];
		$leftShoulderPower=$_POST['left_shoulder_power'];
		$leftShoulderRom=$_POST['left_shoulder_rom'];
		$rightShoulderTone=$_POST['right_shoulder_tone'];
		$rightShoulderPower=$_POST['right_shoulder_power'];
		$rightShoulderRom=$_POST['right_shoulder_rom'];
		$shoulderMuscleId=$_POST['shoulder_muscle_id'];
		$totShoulderMuscle=count($_POST['shoulder_muscle_id']);
		for($s=0; $s<$totShoulderMuscle; $s++)
		{
				if($leftShoulderTone[$s]!='' || $leftShoulderPower[$s]!='' || $leftShoulderRom[$s]!='' || $rightShoulderTone[$s]!='' || $rightShoulderPower[$s]!='' || $rightShoulderRom[$s]='' )
				{
					$shoulder[$s] = array(
					'client_id' => $this->session->userdata('client_id'),
					'patient_id' => $patient_id,
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'shoulder_muscle_id' => $shoulderMuscleId[$s],
					'left_shoulder_tone' => $leftShoulderTone[$s],
					'left_shoulder_power' => $leftShoulderPower[$s],
					'left_shoulder_rom' => $leftShoulderRom[$s],
					'right_shoulder_tone' => $rightShoulderTone[$s],
					'right_shoulder_power' => $rightShoulderPower[$s],
					'right_shoulder_rom' => $rightShoulderRom[$s],
				);
			}
		}
		if(!empty($shoulder)){
			$this->db->insert_batch('tbl_patient_mexamination_shoulder', $shoulder);
		}
		
		$thumb = array();
		$leftThumbTone=$_POST['left_thumb_tone'];
		$leftThumbPower=$_POST['left_thumb_power'];
		$leftThumbRom=$_POST['left_thumb_rom'];
		$rightThumbTone=$_POST['right_thumb_tone'];
		$rightThumbPower=$_POST['right_thumb_power'];
		$rightThumbRom=$_POST['right_thumb_rom'];
		$thumbMuscleId=$_POST['thumb_muscle_id'];
		$totThumbMuscle=count($_POST['thumb_muscle_id']);
		for($t=0; $t<$totThumbMuscle; $t++)
		{
				if($leftThumbTone[$t]!='' || $leftThumbPower[$t]!='' || $leftThumbRom[$t]!='' || $rightThumbTone[$t]!='' || $rightThumbPower[$t]!='' || $rightThumbRom[$t]='' )
				{
					$thumb[$t] = array(
					'client_id' => $this->session->userdata('client_id'),
					'patient_id' => $patient_id,
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'thumb_muscle_id' => $thumbMuscleId[$t],
					'left_thumb_tone' => $leftThumbTone[$t],
					'left_thumb_power' => $leftThumbPower[$t],
					'left_thumb_rom' => $leftThumbRom[$t],
					'right_thumb_tone' => $rightThumbTone[$t],
					'right_thumb_power' => $rightThumbPower[$t],
					'right_thumb_rom' => $rightThumbRom[$t],
				);
			}
		}
		if(!empty($thumb)){
			$this->db->insert_batch('tbl_patient_mexamination_thumb', $thumb);
		}
		
		$toes = array();
		$leftToesTone=$_POST['left_toes_tone'];
		$leftToesPower=$_POST['left_toes_power'];
		$leftToesRom=$_POST['left_toes_rom'];
		$rightToesTone=$_POST['right_toes_tone'];
		$rightToesPower=$_POST['right_toes_power'];
		$rightToesRom=$_POST['right_toes_rom'];
		$toesMuscleId=$_POST['toes_muscle_id'];
		$totToesMuscle=count($_POST['toes_muscle_id']);
		for($u=0; $u<$totToesMuscle; $u++)
		{
				if($leftToesTone[$u]!='' || $leftToesPower[$u]!='' || $leftToesRom[$u]!='' || $rightToesTone[$u]!='' || $rightToesPower[$u]!='' || $rightToesRom[$u]='' )
				{
					$toes[$u] = array(
					'client_id' => $this->session->userdata('client_id'),
					'patient_id' => $patient_id,
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'toes_muscle_id' => $toesMuscleId[$u],
					'left_toes_tone' => $leftToesTone[$u],
					'left_toes_power' => $leftToesPower[$u],
					'left_toes_rom' => $leftToesRom[$u],
					'right_toes_tone' => $rightToesTone[$u],
					'right_toes_power' => $rightToesPower[$u],
					'right_toes_rom' => $rightToesRom[$u],
				);
			}
		}
		if(!empty($toes)){
			$this->db->insert_batch('tbl_patient_mexamination_toes', $toes);
		}
		
		$wrist = array();
		$leftWristTone=$_POST['left_wrist_tone'];
		$leftWristPower=$_POST['left_wrist_power'];
		$leftWristRom=$_POST['left_wrist_rom'];
		$rightWristTone=$_POST['right_wrist_tone'];
		$rightWristPower=$_POST['right_wrist_power'];
		$rightWristRom=$_POST['right_wrist_rom'];
		$wristMuscleId=$_POST['wrist_muscle_id'];
		$totWristMuscle=count($_POST['wrist_muscle_id']);
		for($v=0; $v<$totWristMuscle; $v++)
		{
				if($leftWristTone[$v]!='' || $leftWristPower[$v]!='' || $leftWristRom[$v]!='' || $rightWristTone[$v]!='' || $rightWristPower[$v]!='' || $rightWristRom[$v]='' )
				{
					$wrist[$v] = array(
					'client_id' => $this->session->userdata('client_id'),
					'patient_id' => $patient_id,
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'wrist_muscle_id' => $wristMuscleId[$v],
					'left_wrist_tone' => $leftWristTone[$v],
					'left_wrist_power' => $leftWristPower[$v],
					'left_wrist_rom' => $leftWristRom[$v],
					'right_wrist_tone' => $rightWristTone[$v],
					'right_wrist_power' => $rightWristPower[$v],
					'right_wrist_rom' => $rightWristRom[$v],
				);
			}
		}
		if(!empty($wrist)){
			$this->db->insert_batch('tbl_patient_mexamination_wrist', $wrist);
		}
		
		$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date'))));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		$mexamn = $this->editMexamn($patient_id,$id);
		$url=base_url().'client/patient/edit_assessment_mexam/'.$patient_id.'/'.$id;
		$html = '
					 <tr>
					   <td class="actions text-center">'.date('d/m/Y', strtotime($mexamn['mexamn_date'])).'</td>
					   <td class="actions text-center"><a class="edit" href="'.$url.'"><button type="submit" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="DeleteCaseNotes" href="#'.$patient_id.'#'.$id.'"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fa fa-trash-alt"></i>  </button></a></td>
					</tr>
				';
		return $html;
		
	}
	
	public function editMexamn($patient_id,$mexamn_id)
	{
		$where = array('patient_id' => $patient_id, 'mexamn_id' => $mexamn_id);
		$this->db->select('*')->from('tbl_patient_motor_examination')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function editMexamnHeadneck($headneck_muscle_id,$mexamn_id)
	{
		$where = array('headneck_muscle_id' => $headneck_muscle_id, 'mexamn_id' => $mexamn_id);
		$this->db->select('*')->from('tbl_patient_mexamination_headneck')->where($where)->order_by('headneck_muscle_id');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function editMexamnHip($hip_muscle_id,$mexamn_id)
	{
		$where = array('hip_muscle_id' => $hip_muscle_id, 'mexamn_id' => $mexamn_id);
		$this->db->select('*')->from('tbl_patient_mexamination_hip')->where($where)->order_by('hip_muscle_id');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function editMexamnKnee($knee_muscle_id,$mexamn_id)
	{
		$where = array('knee_muscle_id' => $knee_muscle_id, 'mexamn_id' => $mexamn_id);
		$this->db->select('*')->from('tbl_patient_mexamination_knee')->where($where)->order_by('knee_id');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function editMexamnAnkle($ankle_muscle_id,$mexamn_id)
	{
		$where = array('ankle_muscle_id' => $ankle_muscle_id, 'mexamn_id' => $mexamn_id);
		$this->db->select('*')->from('tbl_patient_mexamination_ankle')->where($where)->order_by('ankle_muscle_id');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function editMexamnToes($toes_muscle_id,$mexamn_id)
	{
		$where = array('toes_muscle_id' => $toes_muscle_id, 'mexamn_id' => $mexamn_id);
		$this->db->select('*')->from('tbl_patient_mexamination_toes')->where($where)->order_by('toes_muscle_id');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function editMexamnHallux($hallux_muscle_id,$mexamn_id)
	{
		$where = array('hallux_muscle_id' => $hallux_muscle_id, 'mexamn_id' => $mexamn_id);
		$this->db->select('*')->from('tbl_patient_mexamination_hallux')->where($where)->order_by('hallux_muscle_id');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function editMexamnScapula($scapula_muscle_id,$mexamn_id)
	{
		$where = array('scapula_muscle_id' => $scapula_muscle_id, 'mexamn_id' => $mexamn_id);
		$this->db->select('*')->from('tbl_patient_mexamination_scapula')->where($where)->order_by('scapula_muscle_id');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function editMexamnShoulder($shoulder_muscle_id,$mexamn_id)
	{
		$where = array('shoulder_muscle_id' => $shoulder_muscle_id, 'mexamn_id' => $mexamn_id);
		$this->db->select('*')->from('tbl_patient_mexamination_shoulder')->where($where)->order_by('shoulder_muscle_id');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function editMexamnElbow($elbow_muscle_id,$mexamn_id)
	{
		$where = array('elbow_muscle_id' => $elbow_muscle_id, 'mexamn_id' => $mexamn_id);
		$this->db->select('*')->from('tbl_patient_mexamination_elbow')->where($where)->order_by('elbow_muscle_id');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function editMexamnForearm($forearm_muscle_id,$mexamn_id)
	{
		$where = array('forearm_muscle_id' => $forearm_muscle_id, 'mexamn_id' => $mexamn_id);
		$this->db->select('*')->from('tbl_patient_mexamination_forearm')->where($where)->order_by('forearm_muscle_id');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function editMexamnWrist($wrist_muscle_id,$mexamn_id)
	{
		$where = array('wrist_muscle_id' => $wrist_muscle_id, 'mexamn_id' => $mexamn_id);
		$this->db->select('*')->from('tbl_patient_mexamination_wrist')->where($where)->order_by('wrist_muscle_id');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function editMexamnFingers($fingers_muscle_id,$mexamn_id)
	{
		$where = array('fingers_muscle_id' => $fingers_muscle_id, 'mexamn_id' => $mexamn_id);
		$this->db->select('*')->from('tbl_patient_mexamination_fingers')->where($where)->order_by('fingers_muscle_id');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function editMexamnThumb($thumb_muscle_id,$mexamn_id)
	{
		$where = array('thumb_muscle_id' => $thumb_muscle_id, 'mexamn_id' => $mexamn_id);
		$this->db->select('*')->from('tbl_patient_mexamination_thumb')->where($where)->order_by('thumb_muscle_id');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function editMexamnRespiration($respiration_muscle_id,$mexamn_id)
	{
		$where = array('respiration_muscle_id' => $respiration_muscle_id, 'mexamn_id' => $mexamn_id);
		$this->db->select('*')->from('tbl_patient_mexamination_respiration')->where($where)->order_by('respiration_muscle_id');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	public function edit_mexamination_info($patient_id,$mexamn_id) {
		$cer=$this->input->post('cervical');
		$tho=$this->input->post('thoracic');
		$lum=$this->input->post('lumbar');
		$combine=$this->input->post('combine1');
		$this->db->where('mexamn_id', $mexamn_id);
		$this->db->delete('tbl_patient_motor_Combined'); 

		if($cer != '' || $tho != '' || $lum != '' )
		{
		$data = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'mexamn_id' => $mexamn_id,
			'cervical' => $this->input->post('cervical'),
			'thoracic' => $this->input->post('thoracic'),
			'lumbar' => $this->input->post('lumbar')
		);
		$this->db->insert('tbl_patient_motor_Combined',$data);
		}
		
		$cervial=$this->input->post('cervial');
		$flexion1=$this->input->post('flexion1');
		$Extension1=$this->input->post('Extension1');
		$SideFlexion_left1=$this->input->post('SideFlexion_left1');
		$SideFlexion_right1=$this->input->post('SideFlexion_right1');
		$Rotation_left1=$this->input->post('Rotation_left1');
		$Rotation_right1=$this->input->post('Rotation_right1');
		

		if($flexion1 != '' || $Extension1 != '' || $SideFlexion_left1 != '' || $SideFlexion_right1 != '' || $Rotation_left1 != '' || $Rotation_right1 != '')
		{
		$this->db->where('cervial_id', $cervial);
		$this->db->where('mexamn_id', $mexamn_id);
		$this->db->delete('tbl_patient_motor_cervical'); 
		$data = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'mexamn_id' => $mexamn_id,
			'flexion1' => $this->input->post('flexion1'),
			'Extension1' => $this->input->post('Extension1'),
			'SideFlexion_left1' => $this->input->post('SideFlexion_left1'),
			'SideFlexion_right1' => $this->input->post('SideFlexion_right1'),
			'Rotation_left1' => $this->input->post('Rotation_left1'),
			'Rotation_right1' => $this->input->post('Rotation_right1')
		);
		$this->db->insert('tbl_patient_motor_cervical',$data);
		}
		
		$thoraccic=$this->input->post('thoraccic');
		$flexion2=$this->input->post('flexion2');
		$Extension2=$this->input->post('Extension2');
		$SideFlexion_left2=$this->input->post('SideFlexion_left2');
		$SideFlexion_right2=$this->input->post('SideFlexion_right2');
		$Rotation_left2=$this->input->post('Rotation_left2');
		$Rotation_right2=$this->input->post('Rotation_right2');
		

		if($flexion2 != '' || $Extension2 != '' || $SideFlexion_left2 != '' || $SideFlexion_right2 != '' || $Rotation_left2 != '' || $Rotation_right2 != '')
		{
		$this->db->where('thoraccic_id', $thoraccic);
		$this->db->where('mexamn_id', $mexamn_id);
		$this->db->delete('tbl_patient_motor_thoraccic'); 
		$data = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'mexamn_id' => $mexamn_id,
			'flexion2' => $this->input->post('flexion2'),
			'Extension2' => $this->input->post('Extension2'),
			'SideFlexion_left2' => $this->input->post('SideFlexion_left2'),
			'SideFlexion_right2' => $this->input->post('SideFlexion_right2'),
			'rotation_left2' => $this->input->post('rotation_left2'),
			'rotation_right2' => $this->input->post('rotation_right2')
		);
		$this->db->insert('tbl_patient_motor_thoraccic',$data);
		}
		
		$lumber=$this->input->post('lumber');
		$flexion3=$this->input->post('flexion3');
		$Extension3=$this->input->post('Extension3');
		$SideFlexion_left3=$this->input->post('SideFlexion_left3');
		$SideFlexion_right3=$this->input->post('SideFlexion_right3');
		$Rotation_left3=$this->input->post('rotation_left3');
		$Rotation_right3=$this->input->post('rotation_right3');
		

		if($flexion3 != '' || $Extension3 != '' || $SideFlexion_left3 != '' || $SideFlexion_right3 != '' || $Rotation_left3 != '' || $Rotation_right3 != '')
		{
		$this->db->where('lumber_id', $lumber);
		$this->db->where('mexamn_id', $mexamn_id);
		$this->db->delete('tbl_patient_motor_lumber'); 
		$data = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'mexamn_id' => $mexamn_id,
			'flexion3' => $this->input->post('flexion3'),
			'Extension3' => $this->input->post('Extension3'),
			'SideFlexion_left3' => $this->input->post('SideFlexion_left3'),
			'SideFlexion_right3' => $this->input->post('SideFlexion_right3'),
			'rotation_left3' => $this->input->post('rotation_left3'),
			'rotation_right3' => $this->input->post('rotation_right3')
		);
		$this->db->insert('tbl_patient_motor_lumber',$data);
		}
		
		
		
		$mexamination_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
			'ant_spine_to_inmal' => $this->input->post('ant_spine_to_inmal'),
			'app_leg_shoet' => $this->input->post('app_leg_shoet'),
			'mid_thigh_circum' => $this->input->post('mid_thigh_circum'),
			'mid_calf_circum' => $this->input->post('mid_calf_circum'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
		
		$where = array('patient_id' => $patient_id, 'mexamn_id' => $mexamn_id);
		$this->db->where($where);
		$this->db->update('tbl_patient_motor_examination',$mexamination_info);
		
		
		
		$this->db->where($where);
		$this->db->delete('tbl_patient_mexamination_ankle');
		$ankle = array();
		$leftAnkleTone=$_POST['left_ankle_tone'];
		$leftAnklePower=$_POST['left_ankle_power'];
		$leftAnkleRom=$_POST['left_ankle_rom'];
		$rightAnkleTone=$_POST['right_ankle_tone'];
		$rightAnklePower=$_POST['right_ankle_power'];
		$rightAnkleRom=$_POST['right_ankle_rom'];
		$ankleMuscleId=$_POST['ankle_muscle_id'];
		$totAnkleMuscle=count($_POST['ankle_muscle_id']);
		for($i=0; $i<$totAnkleMuscle; $i++)
		{
				if($leftAnkleTone[$i]!='' || $leftAnklePower[$i]!='' || $leftAnkleRom[$i]!='' || $rightAnkleTone[$i]!='' || $rightAnklePower[$i]!='' || $rightAnkleRom[$i]!='' )
				{
					$ankle[$i] = array(
					'client_id' => $this->session->userdata('client_id'),
					'patient_id' => $patient_id,
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'ankle_muscle_id' => $ankleMuscleId[$i],
					'left_ankle_tone' => $leftAnkleTone[$i],
					'left_ankle_power' => $leftAnklePower[$i],
					'left_ankle_rom' => $leftAnkleRom[$i],
					'right_ankle_tone' => $rightAnkleTone[$i],
					'right_ankle_power' => $rightAnklePower[$i],
					'right_ankle_rom' => $rightAnkleRom[$i],
				);
			}
		}
		if(!empty($ankle)){
			$this->db->insert_batch('tbl_patient_mexamination_ankle', $ankle);
		}
		$this->db->where($where);
		$this->db->delete('tbl_patient_mexamination_elbow');
		$elbow = array();
		$leftElbowTone=$_POST['left_elbow_tone'];
		$leftElbowPower=$_POST['left_elbow_power'];
		$leftElbowRom=$_POST['left_elbow_rom'];
		$rightElbowTone=$_POST['right_elbow_tone'];
		$rightElbowPower=$_POST['right_elbow_power'];
		$rightElbowRom=$_POST['right_elbow_rom'];
		$elbowMuscleId=$_POST['elbow_muscle_id'];
		$totElbowMuscle=count($_POST['elbow_muscle_id']);
		for($j=0; $j<$totElbowMuscle; $j++)
		{
				if($leftElbowTone[$j]!='' || $leftElbowPower[$j]!='' || $leftElbowRom[$j]!='' || $rightElbowTone[$j]!='' || $rightElbowPower[$j]!='' || $rightElbowRom[$j]!='' )
				{
					$elbow[$j] = array(
					'client_id' => $this->session->userdata('client_id'),
					'patient_id' => $patient_id,
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'elbow_muscle_id' => $elbowMuscleId[$j],
					'left_elbow_tone' => $leftElbowTone[$j],
					'left_elbow_power' => $leftElbowPower[$j],
					'left_elbow_rom' => $leftElbowRom[$j],
					'right_elbow_tone' => $rightElbowTone[$j],
					'right_elbow_power' => $rightElbowPower[$j],
					'right_elbow_rom' => $rightElbowRom[$j],
				);
			}
		}
		if(!empty($elbow)){
			$this->db->insert_batch('tbl_patient_mexamination_elbow', $elbow);
		}
		
		$this->db->where($where);
		$this->db->delete('tbl_patient_mexamination_fingers');
		$fingers = array();
		$leftFingersTone=$_POST['left_fingers_tone'];
		$leftFingersPower=$_POST['left_fingers_power'];
		$leftFingersRom=$_POST['left_fingers_rom'];
		$rightFingersTone=$_POST['right_fingers_tone'];
		$rightFingersPower=$_POST['right_fingers_power'];
		$rightFingersRom=$_POST['right_fingers_rom'];
		$fingersMuscleId=$_POST['fingers_muscle_id'];
		$totFingersMuscle=count($_POST['fingers_muscle_id']);
		for($k=0; $k<$totFingersMuscle; $k++)
		{
				if($leftFingersTone[$k]!='' || $leftFingersPower[$k]!='' || $leftFingersRom[$k]!='' || $rightFingersTone[$k]!='' || $rightFingersPower[$k]!='' || $rightFingersRom[$k]!='' )
				{
					$fingers[$k] = array(
					'client_id' => $this->session->userdata('client_id'),
					'patient_id' => $patient_id,
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'fingers_muscle_id' => $fingersMuscleId[$k],
					'left_fingers_tone' => $leftFingersTone[$k],
					'left_fingers_power' => $leftFingersPower[$k],
					'left_fingers_rom' => $leftFingersRom[$k],
					'right_fingers_tone' => $rightFingersTone[$k],
					'right_fingers_power' => $rightFingersPower[$k],
					'right_fingers_rom' => $rightFingersRom[$k],
				);
			}
		}
		if(!empty($fingers)){
			$this->db->insert_batch('tbl_patient_mexamination_fingers', $fingers);
		}
		
		$this->db->where($where);
		$this->db->delete('tbl_patient_mexamination_forearm');
		$forearm = array();
		$leftForearmTone=$_POST['left_forearm_tone'];
		$leftForearmPower=$_POST['left_forearm_power'];
		$leftForearmRom=$_POST['left_forearm_rom'];
		$rightForearmTone=$_POST['right_forearm_tone'];
		$rightForearmPower=$_POST['right_forearm_power'];
		$rightForearmRom=$_POST['right_forearm_rom'];
		$forearmMuscleId=$_POST['forearm_muscle_id'];
		$totForearmMuscle=count($_POST['forearm_muscle_id']);
		for($l=0; $l<$totForearmMuscle; $l++)
		{
				if($leftForearmTone[$l]!='' || $leftForearmPower[$l]!='' || $leftForearmRom[$l]!='' || $rightForearmTone[$l]!='' || $rightForearmPower[$l]!='' || $rightForearmRom[$l]!='' )
				{
					$forearm[$l] = array(
					'client_id' => $this->session->userdata('client_id'),
					'patient_id' => $patient_id,
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'forearm_muscle_id' => $forearmMuscleId[$l],
					'left_forearm_tone' => $leftForearmTone[$l],
					'left_forearm_power' => $leftForearmPower[$l],
					'left_forearm_rom' => $leftForearmRom[$l],
					'right_forearm_tone' => $rightForearmTone[$l],
					'right_forearm_power' => $rightForearmPower[$l],
					'right_forearm_rom' => $rightForearmRom[$l],
				);
			}
		}
		if(!empty($forearm)){
			$this->db->insert_batch('tbl_patient_mexamination_forearm', $forearm);
		}
		
		$this->db->where($where);
		$this->db->delete('tbl_patient_mexamination_hallux');
		$hallux = array();
		$leftHalluxTone=$_POST['left_hallux_tone'];
		$leftHalluxPower=$_POST['left_hallux_power'];
		$leftHalluxRom=$_POST['left_hallux_rom'];
		$rightHalluxTone=$_POST['right_hallux_tone'];
		$rightHalluxPower=$_POST['right_hallux_power'];
		$rightHalluxRom=$_POST['right_hallux_rom'];
		$halluxMuscleId=$_POST['hallux_muscle_id'];
		$totHalluxMuscle=count($_POST['hallux_muscle_id']);
		for($m=0; $m<$totHalluxMuscle; $m++)
		{
				if($leftHalluxTone[$m]!='' || $leftHalluxPower[$m]!='' || $leftHalluxRom[$m]!='' || $rightHalluxTone[$m]!='' || $rightHalluxPower[$m]!='' || $rightHalluxRom[$m]!='' )
				{
					$hallux[$m] = array(
					'client_id' => $this->session->userdata('client_id'),
					'patient_id' => $patient_id,
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'hallux_muscle_id' => $halluxMuscleId[$m],
					'left_hallux_tone' => $leftHalluxTone[$m],
					'left_hallux_power' => $leftHalluxPower[$m],
					'left_hallux_rom' => $leftHalluxRom[$m],
					'right_hallux_tone' => $rightHalluxTone[$m],
					'right_hallux_power' => $rightHalluxPower[$m],
					'right_hallux_rom' => $rightHalluxRom[$m],
				);
			}
		}
		if(!empty($hallux)){
			$this->db->insert_batch('tbl_patient_mexamination_hallux', $hallux);
		}
		
		$this->db->where($where);
		$this->db->delete('tbl_patient_mexamination_headneck');
		$headneck = array();
		$leftHeadneckTone=$_POST['left_headneck_tone'];
		$leftHeadneckPower=$_POST['left_headneck_power'];
		$leftHeadneckRom=$_POST['left_headneck_rom'];
		$rightHeadneckTone=$_POST['right_headneck_tone'];
		$rightHeadneckPower=$_POST['right_headneck_power'];
		$rightHeadneckRom=$_POST['right_headneck_rom'];
		$headneckMuscleId=$_POST['headneck_muscle_id'];
		$totHeadneckMuscle=count($_POST['headneck_muscle_id']);
		for($n=0; $n<$totHeadneckMuscle; $n++)
		{
				if($leftHeadneckTone[$n]!='' || $leftHeadneckPower[$n]!='' || $leftHeadneckRom[$n]!='' || $rightHeadneckTone[$n]!='' || $rightHeadneckPower[$n]!='' || $rightHeadneckRom[$n]!='' )
				{
					$headneck[$n] = array(
					'client_id' => $this->session->userdata('client_id'),
					'patient_id' => $patient_id,
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'headneck_muscle_id' => $headneckMuscleId[$n],
					'left_headneck_tone' => $leftHeadneckTone[$n],
					'left_headneck_power' => $leftHeadneckPower[$n],
					'left_headneck_rom' => $leftHeadneckRom[$n],
					'right_headneck_tone' => $rightHeadneckTone[$n],
					'right_headneck_power' => $rightHeadneckPower[$n],
					'right_headneck_rom' => $rightHeadneckRom[$n],
				);
			}
		}
		if(!empty($headneck)){
			$this->db->insert_batch('tbl_patient_mexamination_headneck', $headneck);
		}
		
		$this->db->where($where);
		$this->db->delete('tbl_patient_mexamination_hip');
		$hip = array();
		$leftHipTone=$_POST['left_hip_tone'];
		$leftHipPower=$_POST['left_hip_power'];
		$leftHipRom=$_POST['left_hip_rom'];
		$rightHipTone=$_POST['right_hip_tone'];
		$rightHipPower=$_POST['right_hip_power'];
		$rightHipRom=$_POST['right_hip_rom'];
		$hipMuscleId=$_POST['hip_muscle_id'];
		$totHipMuscle=count($_POST['hip_muscle_id']);
		for($o=0; $o<$totHipMuscle; $o++)
		{
				if($leftHipTone[$o]!='' || $leftHipPower[$o]!='' || $leftHipRom[$o]!='' || $rightHipTone[$o]!='' || $rightHipPower[$o]!='' || $rightHipRom[$o]!='' )
				{
					$hip[$o] = array(
					'client_id' => $this->session->userdata('client_id'),
					'patient_id' => $patient_id,
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'hip_muscle_id' => $hipMuscleId[$o],
					'left_hip_tone' => $leftHipTone[$o],
					'left_hip_power' => $leftHipPower[$o],
					'left_hip_rom' => $leftHipRom[$o],
					'right_hip_tone' => $rightHipTone[$o],
					'right_hip_power' => $rightHipPower[$o],
					'right_hip_rom' => $rightHipRom[$o],
				);
			}
		}
		if(!empty($hip)){
			$this->db->insert_batch('tbl_patient_mexamination_hip', $hip);
		}
		
		$this->db->where($where);
		$this->db->delete('tbl_patient_mexamination_knee');
		$knee = array();
		$leftKneeTone=$_POST['left_knee_tone'];
		$leftKneePower=$_POST['left_knee_power'];
		$leftKneeRom=$_POST['left_knee_rom'];
		$rightKneeTone=$_POST['right_knee_tone'];
		$rightKneePower=$_POST['right_knee_power'];
		$rightKneeRom=$_POST['right_knee_rom'];
		$kneeMuscleId=$_POST['knee_muscle_id'];
		$totKneeMuscle=count($_POST['knee_muscle_id']);
		for($p=0; $p<$totKneeMuscle; $p++)
		{
				if($leftKneeTone[$p]!='' || $leftKneePower[$p]!='' || $leftKneeRom[$p]!='' || $rightKneeTone[$p]!='' || $rightKneePower[$p]!='' || $rightKneeRom[$p]!='' )
				{
					$knee[$p] = array(
					'client_id' => $this->session->userdata('client_id'),
					'patient_id' => $patient_id,
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'knee_muscle_id' => $kneeMuscleId[$p],
					'left_knee_tone' => $leftKneeTone[$p],
					'left_knee_power' => $leftKneePower[$p],
					'left_knee_rom' => $leftKneeRom[$p],
					'right_knee_tone' => $rightKneeTone[$p],
					'right_knee_power' => $rightKneePower[$p],
					'right_knee_rom' => $rightKneeRom[$p],
				);
			}
		}
		if(!empty($knee)){
			$this->db->insert_batch('tbl_patient_mexamination_knee', $knee);
		}
		
		$this->db->where($where);
		$this->db->delete('tbl_patient_mexamination_respiration');
		$respiration = array();
		$respirationApex=$_POST['respiration_apex'];
		$respirationBase=$_POST['respiration_base'];
		$respirationMuscleId=$_POST['respiration_muscle_id'];
		$totRespirationMuscle=count($_POST['respiration_muscle_id']);
		for($q=0; $q<$totRespirationMuscle; $q++)
		{
				if($respirationApex[$q]!='' || $respirationBase[$q]!='' )
				{
					$respiration[$q] = array(
					'client_id' => $this->session->userdata('client_id'),
					'patient_id' => $patient_id,
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'respiration_muscle_id' => $respirationMuscleId[$q],
					'respiration_apex' => $respirationApex[$q],
					'respiration_base' => $respirationBase[$q],
				);
			}
		}
		if(!empty($respiration)){
			$this->db->insert_batch('tbl_patient_mexamination_respiration', $respiration);
		}
		
		$this->db->where($where);
		$this->db->delete('tbl_patient_mexamination_scapula');
		$scapula = array();
		$leftScapulaTone=$_POST['left_scapula_tone'];
		$leftScapulaPower=$_POST['left_scapula_power'];
		$leftScapulaRom=$_POST['left_scapula_rom'];
		$rightScapulaTone=$_POST['right_scapula_tone'];
		$rightScapulaPower=$_POST['right_scapula_power'];
		$rightScapulaRom=$_POST['right_scapula_rom'];
		$scapulaMuscleId=$_POST['scapula_muscle_id'];
		$totScapulaMuscle=count($_POST['scapula_muscle_id']);
		for($r=0; $r<$totScapulaMuscle; $r++)
		{
				if($leftScapulaTone[$r]!='' || $leftScapulaPower[$r]!='' || $leftScapulaRom[$r]!='' || $rightScapulaTone[$r]!='' || $rightScapulaPower[$r]!='' || $rightScapulaRom[$r]!='' )
				{
					$scapula[$r] = array(
					'client_id' => $this->session->userdata('client_id'),
					'patient_id' => $patient_id,
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'scapula_muscle_id' => $scapulaMuscleId[$r],
					'left_scapula_tone' => $leftScapulaTone[$r],
					'left_scapula_power' => $leftScapulaPower[$r],
					'left_scapula_rom' => $leftScapulaRom[$r],
					'right_scapula_tone' => $rightScapulaTone[$r],
					'right_scapula_power' => $rightScapulaPower[$r],
					'right_scapula_rom' => $rightScapulaRom[$r],
				);
			}
		}
		if(!empty($scapula)){
			$this->db->insert_batch('tbl_patient_mexamination_scapula', $scapula);
		}
		
		$this->db->where($where);
		$this->db->delete('tbl_patient_mexamination_shoulder');
		$shoulder = array();
		$leftShoulderTone=$_POST['left_shoulder_tone'];
		$leftShoulderPower=$_POST['left_shoulder_power'];
		$leftShoulderRom=$_POST['left_shoulder_rom'];
		$rightShoulderTone=$_POST['right_shoulder_tone'];
		$rightShoulderPower=$_POST['right_shoulder_power'];
		$rightShoulderRom=$_POST['right_shoulder_rom'];
		$shoulderMuscleId=$_POST['shoulder_muscle_id'];
		$totShoulderMuscle=count($_POST['shoulder_muscle_id']);
		for($s=0; $s<$totShoulderMuscle; $s++)
		{
				if($leftShoulderTone[$s]!='' || $leftShoulderPower[$s]!='' || $leftShoulderRom[$s]!='' || $rightShoulderTone[$s]!='' || $rightShoulderPower[$s]!='' || $rightShoulderRom[$s]='' )
				{
					$shoulder[$s] = array(
					'client_id' => $this->session->userdata('client_id'),
					'patient_id' => $patient_id,
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'shoulder_muscle_id' => $shoulderMuscleId[$s],
					'left_shoulder_tone' => $leftShoulderTone[$s],
					'left_shoulder_power' => $leftShoulderPower[$s],
					'left_shoulder_rom' => $leftShoulderRom[$s],
					'right_shoulder_tone' => $rightShoulderTone[$s],
					'right_shoulder_power' => $rightShoulderPower[$s],
					'right_shoulder_rom' => $rightShoulderRom[$s],
				);
			}
		}
		if(!empty($shoulder)){
			$this->db->insert_batch('tbl_patient_mexamination_shoulder', $shoulder);
		}
		
		$this->db->where($where);
		$this->db->delete('tbl_patient_mexamination_thumb');
		$thumb = array();
		$leftThumbTone=$_POST['left_thumb_tone'];
		$leftThumbPower=$_POST['left_thumb_power'];
		$leftThumbRom=$_POST['left_thumb_rom'];
		$rightThumbTone=$_POST['right_thumb_tone'];
		$rightThumbPower=$_POST['right_thumb_power'];
		$rightThumbRom=$_POST['right_thumb_rom'];
		$thumbMuscleId=$_POST['thumb_muscle_id'];
		$totThumbMuscle=count($_POST['thumb_muscle_id']);
		for($t=0; $t<$totThumbMuscle; $t++)
		{
				if($leftThumbTone[$t]!='' || $leftThumbPower[$t]!='' || $leftThumbRom[$t]!='' || $rightThumbTone[$t]!='' || $rightThumbPower[$t]!='' || $rightThumbRom[$t]='' )
				{
					$thumb[$t] = array(
					'client_id' => $this->session->userdata('client_id'),
					'patient_id' => $patient_id,
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'thumb_muscle_id' => $thumbMuscleId[$t],
					'left_thumb_tone' => $leftThumbTone[$t],
					'left_thumb_power' => $leftThumbPower[$t],
					'left_thumb_rom' => $leftThumbRom[$t],
					'right_thumb_tone' => $rightThumbTone[$t],
					'right_thumb_power' => $rightThumbPower[$t],
					'right_thumb_rom' => $rightThumbRom[$t],
				);
			}
		}
		if(!empty($thumb)){
			$this->db->insert_batch('tbl_patient_mexamination_thumb', $thumb);
		}
		
		$this->db->where($where);
		$this->db->delete('tbl_patient_mexamination_toes');
		$toes = array();
		$leftToesTone=$_POST['left_toes_tone'];
		$leftToesPower=$_POST['left_toes_power'];
		$leftToesRom=$_POST['left_toes_rom'];
		$rightToesTone=$_POST['right_toes_tone'];
		$rightToesPower=$_POST['right_toes_power'];
		$rightToesRom=$_POST['right_toes_rom'];
		$toesMuscleId=$_POST['toes_muscle_id'];
		$totToesMuscle=count($_POST['toes_muscle_id']);
		for($u=0; $u<$totToesMuscle; $u++)
		{
				if($leftToesTone[$u]!='' || $leftToesPower[$u]!='' || $leftToesRom[$u]!='' || $rightToesTone[$u]!='' || $rightToesPower[$u]!='' || $rightToesRom[$u]='' )
				{
					$toes[$u] = array(
					'client_id' => $this->session->userdata('client_id'),
					'patient_id' => $patient_id,
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'toes_muscle_id' => $toesMuscleId[$u],
					'left_toes_tone' => $leftToesTone[$u],
					'left_toes_power' => $leftToesPower[$u],
					'left_toes_rom' => $leftToesRom[$u],
					'right_toes_tone' => $rightToesTone[$u],
					'right_toes_power' => $rightToesPower[$u],
					'right_toes_rom' => $rightToesRom[$u],
				);
			}
		}
		if(!empty($toes)){
			$this->db->insert_batch('tbl_patient_mexamination_toes', $toes);
		}
		
		$this->db->where($where);
		$this->db->delete('tbl_patient_mexamination_wrist');
		$wrist = array();
		$leftWristTone=$_POST['left_wrist_tone'];
		$leftWristPower=$_POST['left_wrist_power'];
		$leftWristRom=$_POST['left_wrist_rom'];
		$rightWristTone=$_POST['right_wrist_tone'];
		$rightWristPower=$_POST['right_wrist_power'];
		$rightWristRom=$_POST['right_wrist_rom'];
		$wristMuscleId=$_POST['wrist_muscle_id'];
		$totWristMuscle=count($_POST['wrist_muscle_id']);
		for($v=0; $v<$totWristMuscle; $v++)
		{
				if($leftWristTone[$v]!='' || $leftWristPower[$v]!='' || $leftWristRom[$v]!='' || $rightWristTone[$v]!='' || $rightWristPower[$v]!='' || $rightWristRom[$v]='' )
				{
					$wrist[$v] = array(
					'client_id' => $this->session->userdata('client_id'),
					'patient_id' => $patient_id,
					'mexamn_id' => $mexamn_id,
					'mexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date')))),
					'wrist_muscle_id' => $wristMuscleId[$v],
					'left_wrist_tone' => $leftWristTone[$v],
					'left_wrist_power' => $leftWristPower[$v],
					'left_wrist_rom' => $leftWristRom[$v],
					'right_wrist_tone' => $rightWristTone[$v],
					'right_wrist_power' => $rightWristPower[$v],
					'right_wrist_rom' => $rightWristRom[$v],
				);
			}
		}
		if(!empty($wrist)){
			$this->db->insert_batch('tbl_patient_mexamination_wrist', $wrist);
		}
		
		$data['patient_id']=$patient_id;
		$data['mexamn_id']=$mexamn_id;
		$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('mexamn_date'))));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		return $data;
		
	}
	
	public function sexamination_info($patient_id) {
		
		$sexamination_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'sexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('sexamn_date')))),
			'c2_occipital_protuberance' => $this->input->post('c2_occipital_protuberance'),
			'c2_neck_flexion_extension' => $this->input->post('c2_neck_flexion_extension'),
			'c3_supraclavicular_fossa' => $this->input->post('c3_supraclavicular_fossa'),
			'c3_neck_lateral_flexionlar_joint' => $this->input->post('c3_neck_lateral_flexionlar_joint'),
			'c4_acromioclavicular_joint' => $this->input->post('c4_acromioclavicular_joint'),
			'c4_shoulder_elevation' => $this->input->post('c4_shoulder_elevation'),
			'c5_antecubital_fossa' => $this->input->post('c5_antecubital_fossa'),
			'c5_shoulder_abduction' => $this->input->post('c5_shoulder_abduction'),
			'c5_biceps_brachioradialis' => $this->input->post('c5_biceps_brachioradialis'),
			'c6_thumb' => $this->input->post('c6_thumb'),
			'c6_biceps_wristextensors' => $this->input->post('c6_biceps_wristextensors'),
			'c6_biceps_brachioradialis' => $this->input->post('c6_biceps_brachioradialis'),
			'c7_middle_finger' => $this->input->post('c7_middle_finger'),
			'c7_wristflexors_triceps' => $this->input->post('c7_wristflexors_triceps'),
			'c7_triceps' => $this->input->post('c7_triceps'),
			'c8_little_finger' => $this->input->post('c8_little_finger'),
			'c8_thumb_extensor_adductors' => $this->input->post('c8_thumb_extensor_adductors'),
			'c8_triceps' => $this->input->post('c8_triceps'),
			't1_medialside_antecubital' => $this->input->post('t1_medialside_antecubital'),
			't2_apexof_axilla' => $this->input->post('t2_apexof_axilla'),
			't4_nipples' => $this->input->post('t4_nipples'),
			't6_xiphisternum' => $this->input->post('t6_xiphisternum'),
			't10_umbilicus' => $this->input->post('t10_umbilicus'),
			't12_midpoint_ofthe_inguinal_ligament' => $this->input->post('t12_midpoint_ofthe_inguinal_ligament'),
			'l2_midanterior_thigh' => $this->input->post('l2_midanterior_thigh'),
			'l2_hip_flexion' => $this->input->post('l2_hip_flexion'),
			'l2_patellar' => $this->input->post('patellar'),
			
			'l3_medial_epicondyle_ofthe_femur' => $this->input->post('l3_medial_epicondyle_ofthe_femur'),
			'l3_knee_extension' => $this->input->post('l3_knee_extension'),
			'l3_pain_with_slr' => $this->input->post('l3_pain_with_slr'),
			'l4_medial_malleolus' => $this->input->post('l4_medial_malleolus'),
			'l4_ankle_dorsi_flexion' => $this->input->post('l4_ankle_dorsi_flexion'),
			'l5_dorsumof_root' => $this->input->post('l5_dorsumof_root'),
			'l5_great_toe_extension' => $this->input->post('l5_great_toe_extension'),
			's1_lateral_heel' => $this->input->post('s1_lateral_heel'),
			's1_ankle_plantar_flexion' => $this->input->post('s1_ankle_plantar_flexion'),
			's1_limitedslr_achillesreflex' => $this->input->post('s1_limitedslr_achillesreflex'),
			's2_popliteal_fossa' => $this->input->post('s2_popliteal_fossa'),
			's2_knee_flexion' => $this->input->post('s2_knee_flexion'),
			's2_limitedslr_achillesreflex' => $this->input->post('s2_limitedslr_achillesreflex'),
			's5_perianal' => $this->input->post('s5_perianal'),
			's5_bladder_rectum' => $this->input->post('s5_bladder_rectum'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
			
		);
				
		$this->db->insert('tbl_patient_sensory_examination', $sexamination_info);
		$data['patient_id']=$patient_id;
		$data['sexamn_id']=$this->db->insert_id();
		$id=$this->db->insert_id();
		$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('sexamn_date'))));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		
		$sexamn = $this->editSexamn($patient_id,$id);
			$url=base_url().'client/patient/edit_assessment_sexam/'.$patient_id.'/'.$id;
			$html = '
					<tr>
					  <td class="actions text-center" id="sexamnDate_'.$id.'" >Examination on' .date('d/m/Y', strtotime($sexamn['sexamn_date'])).'</td>
					  <td class="actions text-center"><a class="edit" href="'.$url.'"><button type="submit" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="DeleteCaseNotes" href="#'.$patient_id.'#'.$id.'"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"></i></button></a></td>
				    </tr>
				';
			return $html;
		
		
	}
	
	public function edit_sexamination_info($patient_id,$sexamn_id) {
		
		$sexamination_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'sexamn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('sexamn_date')))),
			'c2_occipital_protuberance' => $this->input->post('c2_occipital_protuberance'),
			'c2_neck_flexion_extension' => $this->input->post('c2_neck_flexion_extension'),
			'c3_supraclavicular_fossa' => $this->input->post('c3_supraclavicular_fossa'),
			'c3_neck_lateral_flexionlar_joint' => $this->input->post('c3_neck_lateral_flexionlar_joint'),
			'c4_acromioclavicular_joint' => $this->input->post('c4_acromioclavicular_joint'),
			'c4_shoulder_elevation' => $this->input->post('c4_shoulder_elevation'),
			'c5_antecubital_fossa' => $this->input->post('c5_antecubital_fossa'),
			'c5_shoulder_abduction' => $this->input->post('c5_shoulder_abduction'),
			'c5_biceps_brachioradialis' => $this->input->post('c5_biceps_brachioradialis'),
			'c6_thumb' => $this->input->post('c6_thumb'),
			'c6_biceps_wristextensors' => $this->input->post('c6_biceps_wristextensors'),
			'c6_biceps_brachioradialis' => $this->input->post('c6_biceps_brachioradialis'),
			'c7_middle_finger' => $this->input->post('c7_middle_finger'),
			'c7_wristflexors_triceps' => $this->input->post('c7_wristflexors_triceps'),
			'c7_triceps' => $this->input->post('c7_triceps'),
			'c8_little_finger' => $this->input->post('c8_little_finger'),
			'c8_thumb_extensor_adductors' => $this->input->post('c8_thumb_extensor_adductors'),
			'c8_triceps' => $this->input->post('c8_triceps'),
			't1_medialside_antecubital' => $this->input->post('t1_medialside_antecubital'),
			't2_apexof_axilla' => $this->input->post('t2_apexof_axilla'),
			't4_nipples' => $this->input->post('t4_nipples'),
			't6_xiphisternum' => $this->input->post('t6_xiphisternum'),
			't10_umbilicus' => $this->input->post('t10_umbilicus'),
			't12_midpoint_ofthe_inguinal_ligament' => $this->input->post('t12_midpoint_ofthe_inguinal_ligament'),
			'l2_midanterior_thigh' => $this->input->post('l2_midanterior_thigh'),
			'l2_hip_flexion' => $this->input->post('l2_hip_flexion'),
			'l3_medial_epicondyle_ofthe_femur' => $this->input->post('l3_medial_epicondyle_ofthe_femur'),
			'l3_knee_extension' => $this->input->post('l3_knee_extension'),
			'l3_pain_with_slr' => $this->input->post('l3_pain_with_slr'),
			'l4_medial_malleolus' => $this->input->post('l4_medial_malleolus'),
			'l4_ankle_dorsi_flexion' => $this->input->post('l4_ankle_dorsi_flexion'),
			'l5_dorsumof_root' => $this->input->post('l5_dorsumof_root'),
			'l5_great_toe_extension' => $this->input->post('l5_great_toe_extension'),
			's1_lateral_heel' => $this->input->post('s1_lateral_heel'),
			's1_ankle_plantar_flexion' => $this->input->post('s1_ankle_plantar_flexion'),
			's1_limitedslr_achillesreflex' => $this->input->post('s1_limitedslr_achillesreflex'),
			's2_popliteal_fossa' => $this->input->post('s2_popliteal_fossa'),
			's2_knee_flexion' => $this->input->post('s2_knee_flexion'),
			's2_limitedslr_achillesreflex' => $this->input->post('s2_limitedslr_achillesreflex'),
			's5_perianal' => $this->input->post('s5_perianal'),
			's5_bladder_rectum' => $this->input->post('s5_bladder_rectum'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
			
		);
				
		$where = array('patient_id' => $patient_id, 'sexamn_id' => $sexamn_id);
		$this->db->where($where);
		$this->db->update('tbl_patient_sensory_examination',$sexamination_info);
		$data['patient_id']=$patient_id;
		$data['sexamn_id']=$sexamn_id;
		$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('sexamn_date'))));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		return $data;
		
	}
	
	public function editSexamn($patient_id,$sexamn_id)
	{
		$where = array('patient_id' => $patient_id, 'sexamn_id' => $sexamn_id);
		$this->db->select('*')->from('tbl_patient_sensory_examination')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function editmedi($patient_id,$id)
	{
		$where = array('patient_id' => $patient_id, 'medi_id' => $medi_id);
		$this->db->select('*')->from('tbl_patient_medi_info')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	public function investigation_info($patient_id) {
		
		$investigation_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'inves_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('inves_date')))),
			'report_type' => $this->input->post('report_type'),
			//'x_ray' => $this->input->post('x-ray_hidden'),
			'document' => $this->input->post('scan_hidden'),
			'description' => $this->input->post('descr'),
			//'blood_reports' => $this->input->post('blood-reports_hidden'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
				
		$this->db->insert('tbl_investigation', $investigation_info);
		$data['patient_id']=$patient_id;
		$id = $this->db->insert_id();
		$count = $this->patient_model->getPatientInvesCount($patient_id);
		$investigations = $this->editInvestigation($patient_id,$id);
			$url=base_url().'client/patient/edit_investigation/'.$patient_id.'/'.$id;
			$url1=base_url().'uploads/inves/'.$investigations['document'];
				$html = '
				<tr>
					  <td class="actions text-center">'.date('d/m/Y', strtotime($investigations['inves_date'])).'</td>
					  <td class="actions text-center"><a href="'.$url1.'">'. $investigations['document'].'</a></td>
					  <td class="actions text-center">'. $investigations['description'].'</td>
					  <td class="actions text-center"><a class="edit" href="'.$url.'"><button type="submit" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="DeleteInves" href="#'.$patient_id.'#'.$id.'"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fa fa-trash-alt"></i>  </button></a></td>
					</tr>
					  
				';
			
			return $html;
		
	}
	
	public function edit_investigation_info($patient_id,$inves_id) {
		
		$investigation_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'inves_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('inves_date')))),
			'report_type' => $this->input->post('report_type'),
			//'x_ray' => $this->input->post('x-ray_hidden'),
			'document' => $this->input->post('scan_hidden'),
			'description' => $this->input->post('descr'),
			//'blood_reports' => $this->input->post('blood-reports_hidden'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
				
		$where = array('patient_id' => $patient_id, 'inves_id' => $inves_id);
		$this->db->where($where);
		$this->db->update('tbl_investigation',$investigation_info);
		$data['patient_id']=$patient_id;
		$data['inves_id']=$inves_id;
		return $data;
		
	}
	
	public function editInvestigation($patient_id,$inves_id)
	{
		$where = array('patient_id' => $patient_id, 'inves_id' => $inves_id);
		$this->db->select('*')->from('tbl_investigation')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function editMedicals($patient_id,$medi_id)
	{
		$where = array('patient_id' => $patient_id, 'medi_id' => $medi_id);
		$this->db->select('*')->from('tbl_patient_medi_info')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function editPlans($patient_id,$soap_plan_id)
	{
		$where = array('patient_id' => $patient_id, 'soap_plan_id' => $soap_plan_id);
		$this->db->select('*')->from('tbl_soap_plan')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	public function add_uploaded_investigations($file_name) {
		
		$insert = array(
			'client_id' => $this->session->userdata('client_id'),
			'file_name' => $file_name,
		);
				
		$this->db->insert('tbl_uploaded_investigation', $insert);
		return $this->db->insert_id();
		
	}
	public function medical_info($patient_id,$bio)
	{
		$medi_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'pd_date' => date('Y-m-d'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
				
		$this->db->insert('tbl_patient_medi_info_notes', $medi_info);
		
	$medi_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'date' => date('Y-m-d'),
			'bio' => $bio
		);	
		$this->db->insert('tbl_patient_medi_info', $medi_info);
	}
	

	public function provdiag_info($patient_id) {
		
		$prov_diagnosis = $this->input->post('prov_diagnosis');
		 $provDiagnosis = implode(",",$prov_diagnosis);
		  $val  = array();
		  $id = explode(',',$provDiagnosis);
		  for($i = 0; $i< sizeof($id); $i++){
		    $this->db->where('pd_list_id',$id[$i]);
			$this->db->select('pd_list_name')->from('tbl_prov_diagnosis_list');
			$res = $this->db->get();
			array_push($val,$res->row()->pd_list_name);
		  }
		  $ar = implode(',',$val);
		   $provdiag_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'pd_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('pd_date')))),
			'prov_diagnosis' => $ar,
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
				
		$this->db->insert('tbl_patient_prov_diagnosis', $provdiag_info);
		$data['patient_id']=$patient_id;
		$id=$this->db->insert_id();
		$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('pd_date'))));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		$count = $this->getPatientProvisionalCount($patient_id);
		$provdiag = $this->editProvdiag($patient_id,$id);
			$url=base_url().'client/patient/edit_treatment_provdiag/'.$patient_id.'/'.$id;
				$html = '
					  <tr>
					  <td class="actions text-center">'.date('d/m/Y', strtotime($provdiag['pd_date'])).'</td>
					  <td class="actions text-center">'. $provdiag['prov_diagnosis'].'</td>
					  <td class="actions text-center"><a class="edit" href="'.$url.'"><button type="submit" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="DeleteProvdiag" href="#'.$patient_id.'#'.$id.'"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fa fa-trash-alt"></i>  </button></a></td>
				
					</tr>
				';
			return $html;
		
	}
	
	public function edit_provdiag_info($patient_id,$pd_id) {
		
		$prov_diagnosis = $this->input->post('prov_diagnosis');
		$provDiagnosis = implode(",",$prov_diagnosis);
		$provdiag_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'pd_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('pd_date')))),
			'prov_diagnosis' => $provDiagnosis,
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
				
		$where = array('patient_id' => $patient_id, 'pd_id' => $pd_id);
		$this->db->where($where);
		$this->db->update('tbl_patient_prov_diagnosis',$provdiag_info);
		$data['patient_id']=$patient_id;
		$data['pd_id']=$pd_id;
		$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('pd_date'))));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		return $data;
	}
	
	public function editProvdiag($patient_id,$pd_id)
	{
		$where = array('patient_id' => $patient_id, 'pd_id' => $pd_id);
		$this->db->select('*')->from('tbl_patient_prov_diagnosis')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function editMeddiag($patient_id,$medi_id)
	{
		$where = array('patient_id' => $patient_id, 'medi_id' => $medi_id);
		$this->db->select('*')->from('tbl_patient_medi_info')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function editassessment_medi($patient_id,$medi_id)
	{
		$where = array('patient_id' => $patient_id, 'medi_id' => $medi_id);
		$this->db->select('*')->from('tbl_patient_medi_info')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function goal_info($patient_id) {
		
		$goal_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'goal_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('goal_date')))),
			'short_term_goals1' => $this->input->post('short_term_goals1'),
			'short_term_goals2' => $this->input->post('short_term_goals2'),
			'short_term_goals3' => $this->input->post('short_term_goals3'),
			'long_term_goals1' => $this->input->post('long_term_goals1'),
			'long_term_goals2' => $this->input->post('long_term_goals2'),
			'long_term_goals3' => $this->input->post('long_term_goals3'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
				
		$this->db->insert('tbl_patient_goals', $goal_info);
		$data['patient_id']=$patient_id;
		$id = $this->db->insert_id();
		$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('goal_date'))));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		$count = $this->patient_model->getPatientGoalCount($patient_id);
		$goals = $this->editGoals($patient_id,$id);
			$url=base_url().'client/patient/edit_treatment_goals/'.$patient_id.'/'.$id;
				$html = '
				<tr>
					  <td class="actions text-center">'.date('d/m/Y', strtotime($goals['goal_date'])).'</td>
					  <td class="actions text-center">'. $goals['short_term_goals1'].'</td>
					  <td class="actions text-center">'. $goals['long_term_goals1'].'</td>
					  <td class="actions text-center"><a class="edit" href="'.$url.'"><button type="submit" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="DeleteGoal" href="#'.$patient_id.'#'.$id.'"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fa fa-trash-alt"></i>  </button></a></td>
					</tr>
					  
				';
			return $html;
		
	}
	
	public function edit_goal_info($patient_id,$goal_id) {
		
		$goal_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'goal_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('goal_date')))),
			'short_term_goals1' => $this->input->post('short_term_goals1'),
			'short_term_goals2' => $this->input->post('short_term_goals2'),
			'short_term_goals3' => $this->input->post('short_term_goals3'),
			'long_term_goals1' => $this->input->post('long_term_goals1'),
			'long_term_goals2' => $this->input->post('long_term_goals2'),
			'long_term_goals3' => $this->input->post('long_term_goals3'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
				
		$where = array('patient_id' => $patient_id, 'goal_id' => $goal_id);
		$this->db->where($where);
		$this->db->update('tbl_patient_goals',$goal_info);
		$data['patient_id']=$patient_id;
		$data['goal_id']=$goal_id;
		$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('goal_date'))));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		return $data;
		
	}
	
	public function editGoals($patient_id,$goal_id)
	{
		$where = array('patient_id' => $patient_id, 'goal_id' => $goal_id);
		$this->db->select('*')->from('tbl_patient_goals')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	public function add_object($patient_id) {
		
		$casenotes_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'object_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('object_date')))),
			'description' => $this->input->post('description'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
				
		$this->db->insert('tbl_soap_object', $casenotes_info);
		$data['patient_id']=$patient_id;
		$data['object_id']=$this->db->insert_id();
		$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('cn_date'))));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		return $data;
		
	}
	public function addsoap_subject($patient_id) {
		
		$casenotes_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'subject_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('subject_date')))),
			'description' => $this->input->post('description'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
				
		$this->db->insert('tbl_soap_subject', $casenotes_info);
		$data['patient_id']=$patient_id;
		$data['sub_id']=$this->db->insert_id();
		$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('cn_date'))));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		return $data;
		
	}
	public function add_assess($patient_id) {
		
		$casenotes_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'assess_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))),
			'description' => $this->input->post('description'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
				
		$this->db->insert('tbl_soap_assess', $casenotes_info);
		$data['patient_id']=$patient_id;
		$data['assess_id']=$this->db->insert_id();
		$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('cn_date'))));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		return $data;
		
	}
	public function addsoap_plan($patient_id) {
		
		$casenotes_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'plan_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('plan_date')))),
			'description' => $this->input->post('description'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
				
		$this->db->insert('tbl_soap_plan', $casenotes_info);
		$data['patient_id']=$patient_id;
		$id=$this->db->insert_id();
		$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('cn_date'))));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		$count = $this->getPatientPlanCount($patient_id);
		$plans = $this->editPlans($patient_id,$id);
			$enteredBy = $plans['modify_by'];
				$profileInfo = $this->registration_model->getProfileInfo($enteredBy);
				$staffInfo = $this->staff_model->getStaffInfo($enteredBy);
				
				if($profileInfo != false)
					$clientName = $profileInfo['first_name'];
				else if($staffInfo != false)
					$clientName = $staffInfo['first_name'].' '.$staffInfo['last_name'];
				 
			$url=base_url().'client/patient/edit_plan/'.$patient_id.'/'.$id;
			$html = '
				<tr>
					 <td class="actions text-center">'.date('d/m/Y', strtotime($plans['plan_date'])).'</td>
					  <td class="actions text-center">'. $plans['description'].'</td>
					   <td class="actions text-center">'. $clientName.'</td>
					  <td class="actions text-center"><a class="edit" href="'.$url.'"><button type="submit" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="DeletePlan" href="#'.$patient_id.'#'.$id.'"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fa fa-trash-alt"></i>  </button></a></td>
				</tr>';
			
			return $html;
		
	}
	public function addCaseNotes($patient_id) {
		
		$casenotes_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'cn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('cn_date')))),
			'case_notes' => $this->input->post('case_notes'),
			'initial_hypothesis' => $this->input->post('initial_hypothesis'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
				
		$this->db->insert('tbl_patient_case_notes', $casenotes_info);
		$data['patient_id']=$patient_id;
		$id = $this->db->insert_id();
		$data['cn_id']=$this->db->insert_id();
		$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('cn_date'))));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		
		$casenotes = $this->editCaseNotes($patient_id,$id);
		$enteredBy = $casenotes['modify_by'];
		$profileInfo = $this->registration_model->getProfileInfo($enteredBy);
		$staffInfo = $this->staff_model->getStaffInfo($enteredBy);
			if($profileInfo != false)
				$clientName = $profileInfo['first_name'].' '.$profileInfo['last_name'];
			else if($staffInfo != false)
			$clientName = $staffInfo['first_name'].' '.$staffInfo['last_name'];
			$url = base_url().'client/patient/edit_case_notes/'.$id.'/'.$patient_id;
			$html = '
					   <tr>
							<td class="actions text-center">'. date('d-m-Y',strtotime($casenotes['cn_date'])).'</td>
							<td class="actions text-center">'. $casenotes['case_notes'].'</td>
							<td class="actions text-center">'. $clientName.'</td>
							<td class="actions text-center"><a class="edit" href="'.$url.'"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="DeleteCaseNotes" href="#'.$patient_id.'#'.$id.'"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"> </i></button></a></td>
						</tr> 
				';
			
		return $html;
		
		
	}
	
	public function edit_caseNotes($patient_id,$cn_id) {
		
		$casenotes_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'cn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('cn_date')))),
			'case_notes' => $this->input->post('case_notes'),
			'initial_hypothesis' => $this->input->post('initial_hypothesis'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
				
		$where = array('patient_id' => $patient_id, 'cn_id' => $cn_id);
		$this->db->where($where);
		$this->db->update('tbl_patient_case_notes',$casenotes_info);
		$data['patient_id']=$patient_id;
		$data['cn_id']=$cn_id;
		$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('cn_date'))));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		return $data;
	}
	
	public function editsoap_assess($patient_id,$assess_id) {
		
		$casenotes_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'assess_date' => date('Y-m-d',strtotime($this->input->post('assess_date'))),
			'description' => $this->input->post('description'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
				
		$where = array('patient_id' => $patient_id, 'assess_id' => $assess_id);
		$this->db->where($where);
		$this->db->update('tbl_soap_assess',$casenotes_info);
		$data['patient_id']=$patient_id;
		$data['assess_id']=$assess_id;
		$visit_date = date('Y-m-d',strtotime($this->input->post('cn_date')));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		return $data;
	}
	public function editsoap_object($patient_id,$object_id) {
		
		$casenotes_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'object_date' => date('Y-m-d',strtotime($this->input->post('object_date'))),
			'description' => $this->input->post('description'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
				
		$where = array('patient_id' => $patient_id, 'cn_id' => $object_id);
		$this->db->where($where);
		$this->db->update('tbl_soap_object',$casenotes_info);
		$data['patient_id']=$patient_id;
		$data['object_id']=$object_id;
		$visit_date = date('Y-m-d',strtotime($this->input->post('object_date')));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		return $data;
	}
	public function editsoap_plan($patient_id,$plan_id) {
		
		$casenotes_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'plan_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('plan_date')))),
			'description' => $this->input->post('description'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
				
		$where = array('patient_id' => $patient_id, 'soap_plan_id' => $plan_id);
		$this->db->where($where);
		$this->db->update('tbl_soap_plan',$casenotes_info);
		$data['patient_id']=$patient_id;
		$data['plan_id']=$plan_id;
		$visit_date = date('Y-m-d',strtotime($this->input->post('plan_date')));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		return $data;
	}
	public function editsoap_subject($patient_id,$subject_id) {
		
		$casenotes_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'subject_date' => date('Y-m-d',strtotime($this->input->post('subject_date'))),
			'description' => $this->input->post('description'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
				
		$where = array('patient_id' => $patient_id, 'soap_subject_id' => $subject_id);
		$this->db->where($where);
		$this->db->update('tbl_soap_subject',$casenotes_info);
		$data['patient_id']=$patient_id;
		$data['subject_id']=$subject_id;
		$visit_date = date('Y-m-d',strtotime($this->input->post('cn_date')));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		return $data;
	}
	
	public function edit_progNotes($patient_id,$pn_id) {
		
		$prognotes_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'pn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('pn_date')))),
			'prog_notes' => $this->input->post('prog_notes'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
				
		$where = array('patient_id' => $patient_id, 'pn_id' => $pn_id);
		$this->db->where($where);
		$this->db->update('tbl_patient_prog_notes',$prognotes_info);
		$data['patient_id']=$patient_id;
		$data['pn_id']=$pn_id;
		$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('pn_date'))));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		return $data;
	}
	
	public function editProgNotes($patient_id,$pn_id)
	{
		$where = array('patient_id' => $patient_id, 'pn_id' => $pn_id);
		$this->db->select('*')->from('tbl_patient_prog_notes')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	public function addRemarks($patient_id) {
		
		$remarks_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'remark_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('remark_date')))),
			'remarks' => $this->input->post('remarks'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
				
		$this->db->insert('tbl_patient_remarks', $remarks_info);
		$data['patient_id']=$patient_id;
		$id =$this->db->insert_id();
		$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('remark_date'))));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		
		$count = $this->patient_model->getPatientRemarkCount($patient_id);
		$remark = $this->editRemarks($patient_id,$id);
			$enteredBy = $remark['modify_by'];
				$profileInfo = $this->registration_model->getProfileInfo($enteredBy);
				$staffInfo = $this->staff_model->getStaffInfo($enteredBy);
				
				if($profileInfo != false)
					$clientName = $profileInfo['first_name'];
				else if($staffInfo != false)
					$clientName = $staffInfo['first_name'].' '.$staffInfo['last_name'];
				$url=base_url().'client/patient/edit_cnotes_remarks/'.$patient_id.'/'.$id;
				$html = '
					 <tr>
						<td class="actions text-center">'. date('d-m-Y',strtotime($remark['remark_date'])).'</td>
							<td class="actions text-center">'. $remark['remarks'].'</td>
							<td class="actions text-center">'. $clientName.'</td>
							<td class="actions text-center"><a class="edit" href="'.$url.'"><button type="submit" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="DeleteRemarks" href="#'.$patient_id.'#'.$id.'"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fa fa-trash-alt"></i>  </button></a></td>
					</tr>  
				';
			
			return $html;
		
	}
	
	public function edit_remarks($patient_id,$remark_id) {
		
		$remarks_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'remark_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('remark_date')))),
			'remarks' => $this->input->post('remarks'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
				
		$where = array('patient_id' => $patient_id, 'remark_id' => $remark_id);
		$this->db->where($where);
		$this->db->update('tbl_patient_remarks',$remarks_info);
		$data['patient_id']=$patient_id;
		$data['remark_id']=$remark_id;
		$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('remark_date'))));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		return $data;
	}
	
	public function editRemarks($patient_id,$remark_id)
	{
		$where = array('patient_id' => $patient_id, 'remark_id' => $remark_id);
		$this->db->select('*')->from('tbl_patient_remarks')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	// generate patient code
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
	
	
	
	//fetch records history
	public function viewHistory($patient_id,$from_date='',$to_date='')
	{
		if($from_date == '' && $to_date == ''){
			$where = array('patient_id' => $patient_id);
		}else{
			$where = array('patient_id' => $patient_id, 'his_date >=' => $from_date, 'his_date <=' => $to_date);
		}
		$this->db->select('*')->from('tbl_patient_history')->where($where);
		$this->db->order_by("his_date", "asc");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	//fetch records chief complaints
	public function viewChiefcomp($patient_id,$from_date='',$to_date='')
	{
		if($from_date == '' && $to_date == ''){
			$where = array('patient_id' => $patient_id);
		}else{
			$where = array('patient_id' => $patient_id, 'cc_date >=' => $from_date, 'cc_date <=' => $to_date);
		}
		$this->db->select('*')->from('tbl_patient_chief_complaints')->where($where);
		$this->db->order_by("cc_date", "asc");
		$query=$this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	//fetch records pain
	public function viewPain($patient_id,$from_date='',$to_date='')
	{
		if($from_date == '' && $to_date == ''){
			$where = array('patient_id' => $patient_id);
		}else{
			$where = array('patient_id' => $patient_id, 'pain_date >=' => $from_date, 'pain_date <=' => $to_date);
		}
		$this->db->select('*')->from('tbl_patient_pain')->where($where);
		$this->db->order_by("pain_date", "asc");
		$query=$this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	//fetch records examination
	public function viewExamn($patient_id,$from_date='',$to_date='')
	{
		if($from_date == '' && $to_date == ''){
			$where = array('patient_id' => $patient_id);
		}else{
			$where = array('patient_id' => $patient_id, 'examn_date >=' => $from_date, 'examn_date <=' => $to_date);
		}
		$this->db->select('*')->from('tbl_patient_examination')->where($where);
		$this->db->order_by("examn_date", "asc");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	//fetch records motor motor examination
	public function viewMexamn($patient_id,$from_date='',$to_date='')
	{
		if($from_date == '' && $to_date == ''){
			$where = array('patient_id' => $patient_id);
		}else{
			$where = array('patient_id' => $patient_id, 'mexamn_date >=' => $from_date, 'mexamn_date <=' => $to_date);
		}
		$this->db->select('*')->from('tbl_patient_motor_examination')->where($where);
		$this->db->order_by("mexamn_date", "asc");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function viewcombined($patient_id)
	{
		
		$this->db->select('*')->from('tbl_patient_motor_Combined')->where('patient_id',$patient_id);
		//$this->db->order_by("mexamn_date", "asc");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	
	//fetch records motor examination
	public function viewMexamnData($mexamn_id,$mexamn_date,$motorExamnTable,$motorExamnSubTable,$join_condition,$display_cols)
	{
		$client_id = $motorExamnTable.'.client_id';
		$where = array('mexamn_id' => $mexamn_id,'mexamn_date' => $mexamn_date);
		$this->db->distinct();
		$this->db->select($display_cols)->from($motorExamnTable)->where($where);
		$this->db->join($motorExamnSubTable, $join_condition);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	//fetch records motor sensory examination
	public function viewSexamn($patient_id,$from_date='',$to_date='')
	{
		if($from_date == '' && $to_date == ''){
			$where = array('patient_id' => $patient_id);
		}else{
			$where = array('patient_id' => $patient_id, 'sexamn_date >=' => $from_date, 'sexamn_date <=' => $to_date);
		}
		$this->db->select('*')->from('tbl_patient_sensory_examination')->where($where);
		$this->db->order_by("sexamn_date", "asc");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	//fetch records investigation
	public function viewInvestigation($patient_id)
	{
		$where = array('patient_id' => $patient_id);
		$this->db->select('*')->from('tbl_investigation')->where($where);
		$this->db->order_by("inves_date", "asc");
		$query=$this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function viewmediinfo($patient_id)
	{
		$where = array('patient_id' => $patient_id);
		$this->db->select('*')->from('tbl_patient_medi_info')->where($where);
		$this->db->order_by("date", "asc");
		$query=$this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	//fetch records provisional diagnosis
	public function viewProvdiag($patient_id,$from_date='',$to_date='')
	{
		if($from_date == '' && $to_date == ''){
			$where = array('patient_id' => $patient_id);
		}else{
			$where = array('patient_id' => $patient_id, 'pd_date >=' => $from_date, 'pd_date <=' => $to_date);
		}
		$this->db->select('*')->from('tbl_patient_prov_diagnosis')->where($where);
		$this->db->order_by("pd_date", "asc");
		$query=$this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	//fetch records goals
	public function viewGoals($patient_id,$from_date='',$to_date='')
	{
		if($from_date == '' && $to_date == ''){
			$where = array('patient_id' => $patient_id);
		}else{
			$where = array('patient_id' => $patient_id, 'goal_date >=' => $from_date, 'goal_date <=' => $to_date);
		}
		$this->db->select('*')->from('tbl_patient_goals')->where($where);
		$this->db->order_by("goal_date", "asc");
		$query=$this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function viewGoals1($patient_id,$from_date='',$to_date='')
	{
		$this->db->where('patient_id',$patient_id);
		$this->db->where('goal_date',date('Y-m-d',strtotime($from_date)));
		$this->db->select('*')->from('tbl_patient_goals');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	//fetch records case notes
	public function viewCaseNotes($patient_id,$from_date='',$to_date='')
	{
		if($from_date == '' && $to_date == ''){
			$where = array('patient_id' => $patient_id);
		}else{
			$where = array('patient_id' => $patient_id, 'cn_date >=' => $from_date, 'cn_date <=' => $to_date);
		}
		$this->db->select('*')->from('tbl_patient_case_notes')->where($where);
		$this->db->order_by("cn_date", "asc");
		$query=$this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function plans($patient_id,$from_date='',$to_date='')
	{
		if($from_date == '' && $to_date == ''){
			$where = array('patient_id' => $patient_id);
		}else{
			$where = array('patient_id' => $patient_id, 'plan_date >=' => $from_date, 'plan_date <=' => $to_date);
		}
		$this->db->select('*')->from('tbl_soap_plan')->where($where);
		$this->db->order_by("plan_date", "asc");
		$query=$this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function viewSubjects($patient_id,$from_date='',$to_date='')
	{
		if($from_date == '' && $to_date == ''){
			$where = array('patient_id' => $patient_id);
		}else{
			$where = array('patient_id' => $patient_id, 'subject_date >=' => $from_date, 'subject_date <=' => $to_date);
		}
		$this->db->select('*')->from('tbl_soap_subject')->where($where);
		$this->db->order_by("subject_date", "asc");
		$query=$this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function viewObjects($patient_id,$from_date='',$to_date='')
	{
		if($from_date == '' && $to_date == ''){
			$where = array('patient_id' => $patient_id);
		}else{
			$where = array('patient_id' => $patient_id, 'object_date >=' => $from_date, 'object_date <=' => $to_date);
		}
		$this->db->select('*')->from('tbl_soap_object')->where($where);
		$this->db->order_by("object_date", "asc");
		$query=$this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function viewPlans($patient_id,$from_date='',$to_date='')
	{
		if($from_date == '' && $to_date == ''){
			$where = array('patient_id' => $patient_id);
		}else{
			$where = array('patient_id' => $patient_id, 'plan_date >=' => $from_date, 'plan_date <=' => $to_date);
		}
		$this->db->select('*')->from('tbl_soap_plan')->where($where);
		$this->db->order_by("plan_date", "asc");
		$query=$this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function viewAssess($patient_id,$from_date='',$to_date='')
	{
		if($from_date == '' && $to_date == ''){
			$where = array('patient_id' => $patient_id);
		}else{
			$where = array('patient_id' => $patient_id, 'assess_date >=' => $from_date, 'assess_date <=' => $to_date);
		}
		$this->db->select('*')->from('tbl_soap_assess')->where($where);
		$this->db->order_by("assess_date", "asc");
		$query=$this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	//fetch records progress notes
	public function viewProgNotes($patient_id,$from_date='',$to_date='')
	{
		if($from_date == '' && $to_date == ''){
			$where = array('patient_id' => $patient_id);
		}else{
			$where = array('patient_id' => $patient_id, 'pn_date >=' => $from_date, 'pn_date <=' => $to_date);
		}
		$this->db->select('*')->from('tbl_patient_prog_notes')->where($where);
		$this->db->order_by("pn_date", "asc");
		$query=$this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	//fetch records remarks
	public function viewRemarks($patient_id,$from_date='',$to_date='')
	{
		if($from_date == '' && $to_date == ''){
			$where = array('patient_id' => $patient_id);
		}else{
			$where = array('patient_id' => $patient_id, 'remark_date >=' => $from_date, 'remark_date <=' => $to_date);
		}
		$this->db->select('*')->from('tbl_patient_remarks')->where($where);
		$this->db->order_by("remark_date", "asc");
		$query=$this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	
	
	public function editMexamncombine($patient_id,$mexamn_id)
	{
		$where = array('client_id' => $this->session->userdata('client_id'),'patient_id' => $patient_id,'mexamn_id' => $mexamn_id);
		$this->db->select('*')->from('tbl_patient_motor_Combined')->where($where);
		$query=$this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function editMexamncervical($patient_id,$mexamn_id)
	{
			$where = array('client_id' => $this->session->userdata('client_id'),'patient_id' => $patient_id,'mexamn_id' => $mexamn_id);
		$this->db->select('*')->from('tbl_patient_motor_cervical')->where($where);
		$query=$this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function editMexamnthoraccic($patient_id,$mexamn_id)
	{
			$where = array('client_id' => $this->session->userdata('client_id'),'patient_id' => $patient_id,'mexamn_id' => $mexamn_id);
		$this->db->select('*')->from('tbl_patient_motor_thoraccic')->where($where);
		$query=$this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function editMexamnlumber($patient_id,$mexamn_id)
	{
			$where = array('client_id' => $this->session->userdata('client_id'),'patient_id' => $patient_id,'mexamn_id' => $mexamn_id);
		$this->db->select('*')->from('tbl_patient_motor_lumber')->where($where);
		$query=$this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	
	//fetch records treatment
	public function viewTreatments($patient_id,$from_date='',$to_date='')
	{
		if($from_date == '' && $to_date == ''){
			$where = array('tt.patient_id' => $patient_id, 'tt.client_id' => $this->session->userdata('client_id'));
		}else{
			$where = array('patient_id' => $patient_id, 'tt.client_id' => $this->session->userdata('client_id'), 'tt.treatment_date >=' => $from_date, 'tt.treatment_date <=' => $to_date);
		}
		$this->db->distinct();
		$this->db->select('GROUP_CONCAT(tt.staff_id SEPARATOR " - ") AS staff_id,tt.client_id,tt.treatment_id,tt.patient_id,tt.treatment_date,tt.treatments,tt.treatment_quantity,tt.treatment_price,tt.treatment_group_id,tt.bill_status,GROUP_CONCAT(it.item_name SEPARATOR " - ") AS itemName,GROUP_CONCAT(tt.treatment_quantity SEPARATOR " - ") AS treatmentQuantity,GROUP_CONCAT(tt.treatment_price SEPARATOR " - ") AS treatmentPrice')->from('tbl_patient_treatment_techniques tt')->where($where)->group_by("tt.treatment_date");
		$this->db->join("tbl_item it", "tt.treatments=it.item_id");
		$this->db->order_by("tt.treatment_date", "asc");
		$query=$this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function viewTreatments1($bill_id)
	{
		$where = array('bill_id' => $bill_id);
		$this->db->distinct();
		$this->db->select('GROUP_CONCAT(tt.staff_id SEPARATOR " - ") AS staff_id,tt.client_id,tt.treatment_id,tt.patient_id,tt.treatment_date,tt.treatments,tt.treatment_quantity,tt.treatment_price,tt.treatment_group_id,tt.bill_status,it.item_name,GROUP_CONCAT(it.item_name SEPARATOR " - ") AS itemName,GROUP_CONCAT(tt.treatment_quantity SEPARATOR " - ") AS treatmentQuantity,GROUP_CONCAT(tt.treatment_price SEPARATOR " - ") AS treatmentPrice')->from('tbl_patient_treatment_techniques tt')->where($where)->group_by("tt.treatment_date");
		$this->db->join("tbl_item it", "tt.treatments=it.item_id");
		$this->db->order_by("tt.treatment_date", "asc");
		$query=$this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	// generate Basic Info HTML
	public function basicInfoHTML($patient_id) {
		$patient = $this->editPatientinfo($patient_id);
		$html = '
				<tbody>
                    <tr>
                      <td class="actions text-center">First name</td>
                      <td class="actions text-center">'. ucwords($patient['first_name']). '</td>
                    </tr>
                    <tr>
                      <td class="actions text-center">Last name</td>
                      <td class="actions text-center">'. ucwords($patient['last_name']). '</td>
                    </tr>
                    <tr>
                      <td class="actions text-center">Gender</td>
                      <td class="actions text-center">'. ucwords($patient['gender']). '</td>
                    </tr>
                    <tr>
                      <td class="actions text-center">Age</td>
                      <td class="actions text-center">'. $patient['age']. '</td>
                    </tr>
                    <tr>
                      <td class="actions text-center">Martial status</td>
                      <td class="actions text-center">'. ucwords($patient['marital_status']). '</td>
                    </tr>
                    <tr>
                      <td class="actions text-center">Height</td>
                      <td class="actions text-center">'. $patient['height']. 'cm</td>
                    </tr>
                    <tr>
                      <td class="actions text-center">Weight</td>
                      <td class="actions text-center">'. $patient['weight']. 'kg</td>
                    </tr>
                    <tr>
                      <td class="actions text-center">BMI</td>
                      <td class="actions text-center">'. $patient['bmi']. '</td>
                    </tr>
                  </tbody>
		';
		return $html;
	}
	
	// generate Basic Info HTML
	public function pInfoHTML($patient_id) {
		$patient = $this->editPatientinfo($patient_id);
		if($patient['dob'] != "0000-00-00"){
			$dob = '<span style="text-align:left">Dob  :<strong>'.date("F j, Y",strtotime($patient['dob'])).'</strong><br></span>';
		}else{
			$dob = '';
		}
		$html = '
				<h3><i class="icon-user"></i>'.ucwords($patient['first_name']).'</h3>
                <span style="text-align:left">Id  :<strong>   '.ucwords($patient['patient_code']).'</strong>, <br></span>'.$dob.'<span</span>'
		;
		return $html;
	}
	
	// generate Contact Info HTML
	public function contactInfoHTML($patient_id) {
		$patient = $this->editPatientinfo($patient_id);
		$html = '
				<tbody>
					<tr>
                      <td class="actions text-center">Food habits</td>
                      <td class="actions text-center">'. ucwords($patient['food_habits']). '</td>
                    </tr>
					<tr>
                      <td class="actions text-center">Occupation</td>
                      <td class="actions text-center">'. ucwords($patient['occupation']). '</td>
                    </tr>
                    <tr>
                      <td class="actions text-center">Aadhar Id</td>
                      <td class="actions text-center">'. $patient['aadhar_id']. '</td>
                    </tr>
                    <tr>
                      <td class="actions text-center">Address1</td>
                      <td class="actions text-center">'. $patient['address_line1']. '</td>
                    </tr>
					<tr>
                      <td class="actions text-center">Address2</td>
                      <td class="actions text-center">'. $patient['address_line2']. '</td>
                    </tr>
                    <tr>
                      <td class="actions text-center">City</td>
                      <td class="actions text-center">'. $patient['city']. '</td>
                    </tr>
                    <tr>
                      <td class="actions text-center">Pincode</td>
                      <td class="actions text-center">'. $patient['pincode']. '</td>
                    </tr>
                    <tr>
                      <td class="actions text-center">Mobile</td>
                      <td class="actions text-center">'. $patient['mobile_no']. '</td>
                    </tr>
                    <tr>
                      <td class="actions text-center">Phone</td>
                      <td class="actions text-center">'. $patient['phone_no']. '</td>
                    </tr>
                    <tr>
                      <td class="actions text-center">Email</td>
                      <td class="actions text-center">'. $patient['email']. '</td>
                    </tr>
                  </tbody>
		';
		return $html;
	}
	
	
	// get all patients
	function getPatients($datas = '') {
		if($datas == '') {
			$this->db->select('*');
		} else {
			$this->db->select($datas);
		}
		$this->db->from('tbl_patient_info')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function getPatientCount()
	{
		$this->db->select('count(patient_id) as totalcount')->from('tbl_patient_info')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	
	public function getPatientHisCount($patient_id)
	{
		$where = array('patient_id' => $patient_id);
		$this->db->select('count(his_id) as totalcount')->from('tbl_patient_history')->where($where);
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	
	public function getPatientCcCount($patient_id)
	{
		$where = array('patient_id' => $patient_id);
		$this->db->select('count(cc_id) as totalcount')->from('tbl_patient_chief_complaints')->where($where);
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	
	public function getPatientPainCount($patient_id)
	{
		$where = array('patient_id' => $patient_id);
		$this->db->select('count(pain_id) as totalcount')->from('tbl_patient_pain')->where($where);
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	
	public function getPatientExamnCount($patient_id)
	{
		$where = array('patient_id' => $patient_id);
		$this->db->select('count(examn_id) as totalcount')->from('tbl_patient_examination')->where($where);
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	
	public function getPatientMexamnCount($patient_id)
	{
		$where = array('patient_id' => $patient_id);
		$this->db->select('count(mexamn_id) as totalcount')->from('tbl_patient_motor_examination')->where($where);
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	
	public function getPatientSexamnCount($patient_id)
	{
		$where = array('patient_id' => $patient_id);
		$this->db->select('count(sexamn_id) as totalcount')->from('tbl_patient_sensory_examination')->where($where);
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	
	public function getPatientInvesCount($patient_id)
	{
		$where = array('patient_id' => $patient_id);
		$this->db->select('count(inves_id) as totalcount')->from('tbl_investigation')->where($where);
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	
	public function getPatientPdCount($patient_id)
	{
		$where = array('patient_id' => $patient_id);
		$this->db->select('count(pd_id) as totalcount')->from('tbl_patient_prov_diagnosis')->where($where);
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	
	
	public function getPatientGoalCount($patient_id)
	{
		$where = array('patient_id' => $patient_id);
		$this->db->select('count(goal_id) as totalcount')->from('tbl_patient_goals')->where($where);
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	
	public function getPatientCnCount($patient_id)
	{
		$where = array('patient_id' => $patient_id);
		$this->db->select('count(cn_id) as totalcount')->from('tbl_patient_case_notes')->where($where);
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	
	public function getPatientPnCount($patient_id)
	{
		$where = array('patient_id' => $patient_id);
		$this->db->select('count(pn_id) as totalcount')->from('tbl_patient_prog_notes')->where($where);
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	
	public function getPatientRemarkCount($patient_id)
	{
		$where = array('patient_id' => $patient_id);
		$this->db->select('count(remark_id) as totalcount')->from('tbl_patient_remarks')->where($where);
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function getPatientProvisionalCount($patient_id)
	{
		$where = array('patient_id' => $patient_id);
		$this->db->select('count(pd_id) as totalcount')->from('tbl_patient_prov_diagnosis')->where($where);
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function getPatientPlanCount($patient_id)
	{
		$where = array('patient_id' => $patient_id);
		$this->db->select('count(soap_plan_id) as totalcount')->from('tbl_soap_plan')->where($where);
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	
	public function addProvList() {
		$provInfo = array(
			'client_id' => $this->session->userdata('client_id'),
			'pd_list_name' => $this->input->post('provDiag'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
		
		$this->db->insert('tbl_prov_diagnosis_list', $provInfo);
		$data = array('pd_list_id' => $this->db->insert_id(), 'pd_list_name' => $this->input->post('provDiag'));
		if($this->db->insert_id()){
			return $data;	
		} else {
			return false;	
		}
	}
	public function add_treatment($prov){
		$pt = explode('/',$prov);	
		$info=array(
		'client_id'=>$this->session->userdata('client_id'),
		'item_name'=>$pt[0],
		'item_desc'=>$pt[1],
		'item_price'=>$pt[2],
		'created_by' => $this->session->userdata('username'),
		'created_date' => date('Y-m-d H:i:s'),
		'modify_by' => $this->session->userdata('username'),
		'modify_date' => date('Y-m-d H:i:s'),
		'status' => 1,  
		);
	
		$this->db->insert('tbl_item',$info);	
		$data = array('item_id' => $this->db->insert_id(),
		'item_price' => $pt[2],
		'item_name' => $pt[0]);
		return $data;
		
	}
	
	public function addTreatmentTechniques($patient_id) {
		$arrTreatmentDates = explode(",",$this->input->post('treatment_date'));
		$staff_id=$_POST['staff_id'];
		for($i=0; $i  < count($arrTreatmentDates); $i++)
		{
			if($arrTreatmentDates[$i]!='')
			{
				$treat = implode(',',$_POST['treatments']);
				$t1=explode(',',$treat);
				for($j=0; $j  < count($t1); $j++)
				{
						$data=explode('|',$t1[$j]); 
						$treatments = $data[0];
						$treatment_quantity = $_POST['treatment_quantity'];
						$treatment_price = explode(',',$this->input->post('treatment_price'));
						$this->db->where('treatment_date',date('Y-m-d',strtotime($arrTreatmentDates[$i])));
						$this->db->select('treatment_group_id')->from('tbl_patient_treatment_techniques');
						$res = $this->db->get();
						if($res->result_array() != false){
							$treatmentInfo = array(
								'client_id' => $this->session->userdata('client_id'),
								'patient_id' => $patient_id,
								'bill_id' => 0,
								'treatment_date' => date('Y-m-d',strtotime(str_replace('/','-',$arrTreatmentDates[$i]))),
								'treatments' => $treatments,
								'treatment_quantity' => $treatment_quantity,
								'treatment_price' => $treatment_price[$j],
								'staff_id' => $staff_id,
								'bill_status' => 0,
								'treatment_group_id' => $res->row()->treatment_group_id,
								'created_by' => $this->session->userdata('username'),
								'created_date' => date('Y-m-d H:i:s'),
								'modify_by' => $this->session->userdata('username'),
								'modify_date' => date('Y-m-d H:i:s')
							);
						  $this->db->insert('tbl_patient_treatment_techniques', $treatmentInfo);
						} else {
							$treatment_price = explode(',',$this->input->post('treatment_price'));
						     $treatmentInfo = array(
								'client_id' => $this->session->userdata('client_id'),
								'patient_id' => $patient_id,
								'bill_id' => 0,
								'treatment_date' => date('Y-m-d',strtotime(str_replace('/','-',$arrTreatmentDates[$i]))),
								'treatments' => $treatments,
								'treatment_quantity' => $treatment_quantity,
								'treatment_price' => $treatment_price[$j],
								'staff_id' => $staff_id,
								'bill_status' => 0,
								'treatment_group_id' => $this->treatmentGroupCode(),
								'created_by' => $this->session->userdata('username'),
								'created_date' => date('Y-m-d H:i:s'),
								'modify_by' => $this->session->userdata('username'),
								'modify_date' => date('Y-m-d H:i:s')
							);
						$this->db->insert('tbl_patient_treatment_techniques', $treatmentInfo);
					}
				}
			}
			$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$arrTreatmentDates[$i])));
				$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
				if($visit_date_value == false){
					$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
					$this->db->insert('tbl_patient_visits', $visit_info);
		    }
		}
		
		return $treatment_id;
		
	}
	
	public function edit_TreatmentTechniques($patient_id) {
		$this->db->where('patient_id',$patient_id);
		$this->db->where('treatment_date',$this->input->post('re_date'));
		$this->db->delete('tbl_patient_treatment_techniques');
		
		$arrTreatmentDates = explode(",",$this->input->post('treatment_date'));
		$staff_id=$_POST['staff_id'];
		for($i=0; $i  < count($arrTreatmentDates); $i++)
		{
			if($arrTreatmentDates[$i]!='')
			{
				$treat = implode(',',$_POST['treatments']);
				$t1=explode(',',$treat);
				for($j=0; $j  < count($t1); $j++)
				{
						$data=explode('|',$t1[$j]); 
						$treatments = $data[0];
						$treatment_quantity = $_POST['treatment_quantity'];
						$treatment_price = explode(',',$this->input->post('treatment_price'));
						$this->db->where('treatment_date',date('Y-m-d',strtotime($arrTreatmentDates[$i])));
						$this->db->select('treatment_group_id')->from('tbl_patient_treatment_techniques');
						$res = $this->db->get();
						if($res->result_array() != false){
							$treatmentInfo = array(
								'client_id' => $this->session->userdata('client_id'),
								'patient_id' => $patient_id,
								'bill_id' => 0,
								'treatment_date' => date('Y-m-d',strtotime(str_replace('/','-',$arrTreatmentDates[$i]))),
								'treatments' => $treatments,
								'treatment_quantity' => $treatment_quantity,
								'treatment_price' => $treatment_price[$j],
								'staff_id' => $staff_id,
								'bill_status' => 0,
								'treatment_group_id' => $res->row()->treatment_group_id,
								'created_by' => $this->session->userdata('username'),
								'created_date' => date('Y-m-d H:i:s'),
								'modify_by' => $this->session->userdata('username'),
								'modify_date' => date('Y-m-d H:i:s')
							);
						  $this->db->insert('tbl_patient_treatment_techniques', $treatmentInfo);
						} else {
							$treatment_price = explode(',',$this->input->post('treatment_price'));
						     $treatmentInfo = array(
								'client_id' => $this->session->userdata('client_id'),
								'patient_id' => $patient_id,
								'bill_id' => 0,
								'treatment_date' => date('Y-m-d',strtotime(str_replace('/','-',$arrTreatmentDates[$i]))),
								'treatments' => $treatments,
								'treatment_quantity' => $treatment_quantity,
								'treatment_price' => $treatment_price[$j],
								'staff_id' => $staff_id,
								'bill_status' => 0,
								'treatment_group_id' => $this->treatmentGroupCode(),
								'created_by' => $this->session->userdata('username'),
								'created_date' => date('Y-m-d H:i:s'),
								'modify_by' => $this->session->userdata('username'),
								'modify_date' => date('Y-m-d H:i:s')
							);
						$this->db->insert('tbl_patient_treatment_techniques', $treatmentInfo);
					}
				}
			}
			$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$arrTreatmentDates[$i])));
				$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
				if($visit_date_value == false){
					$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
					$this->db->insert('tbl_patient_visits', $visit_info);
		    }
		}
		
	}
	
	// generate staff code
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
	
	public function getTreatmentTechniques($treatment_date,$patient_id)
	{
		$where = array('patient_id' => $patient_id,'treatment_date' => $treatment_date,'client_id' => $this->session->userdata('client_id'));
		$this->db->select('*')->from('tbl_patient_treatment_techniques')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	
	public function viewSession()
	{
		$this->db->select('*')->from('tbl_session_det');
		$this->db->where('client_id', $this->session->userdata('client_id'));
		$this->db->order_by("sn_date", "asc");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	
	public function addSession($patient_id)
	{
		$this->db->where('patient_id',$this->input->post('patient_id'));
		$this->db->select('patient_code,first_name,last_name,concess_group_id')->from('tbl_patient_info');
		$res  = $this->db->get();
		$code  = $res->row()->patient_code;
		$first  = $res->row()->first_name;
		$last  = $res->row()->last_name;
		$concession_group_id  = $res->row()->concess_group_id;

		$staff = $this->input->post('staff_id');
		if($staff != false) {
			$staff_id = $this->input->post('staff_id');
		} else {
			$staff_id = $this->input->post('staff_ids');
		}
		
		
		if($staff != false) {
			$item_name = $this->input->post('treatment');
			$item_id = $this->input->post('treat');
			
			$itemname = $this->input->post('treatment');
			$treat = $this->input->post('treat');
			$session_cont = $this->input->post('session_cont');
			
		} else {
			$t= explode('/',$this->input->post('treatment_id'));
		    $itemname = $t[1];
			$treat = $t[0];
			$session_cont = $this->input->post('session_cont');
		}
		
		$id = explode('-',$treat);
		$item = explode(' - ',$itemname);
		$treatment_quantity = explode(' - ',$session_cont);
		for($i=0; $i < sizeof($id); $i++){
			$session_det = array(
				'client_id' => $this->session->userdata('client_id'),
				'patient_id' => $this->input->post('patient_id'),
				'staff_id' => $staff_id,
				'patient_code' => $code,
				'sn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('sn_date')))),
				'Session_count' => $this->input->post('session_cont'),
				'item_id' => $id[$i],
				'item_name' => $item[$i],
				'repot_by' =>  $staff_id,
				'Comment_sess' => $this->input->post('sess_comment'),
				'fpatient_name' => $first,
				'lpatient_name' => $last,
				'created_by' => $this->session->userdata('username'),
				'created_date' => date('Y-m-d H:i:s'),
				'modify_by' => $this->session->userdata('username'),
				'modify_date' => date('Y-m-d H:i:s'),
				'bill_gen' => $this->input->post('bill_gen'),
				  
			);
			$this->db->insert('tbl_session_det',$session_det);
		    $reg_id = $this->db->insert_id();
		}
		
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('appointment_from',date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('sn_date')))));
		$this->db->where('patient_id',$this->input->post('patient_id'));
		$this->db->set('visit',1);
		$this->db->update('tbl_appointments');
				
		
		$bill = $this->input->post('bill_gen');
		$bill_no=$this->generate_code_bill();
		$profileInfo = $this->registration_model->getProfileInfo($this->session->userdata('username'));
		$staffInfo = $this->staff_model->getStaffInfo($this->session->userdata('username'));
		if($profileInfo != false)
			$clientName = $profileInfo['first_name'].' '.$profileInfo['last_name'];
		else if($staffInfo != false)	
			$clientName = $staffInfo['first_name'].' '.$staffInfo['last_name'];
				
			
		if($bill != '') {
			$price = 0;
			for($i=0; $i< sizeof($id); $i++){
				$this->db->where('item_id',$id[$i]);
				$this->db->select('item_price,item_desc')->from('tbl_item');
				$res = $this->db->get();
				$price += $res->row()->item_price * $treatment_quantity[$i];
							
			}
			$tot = $price;
			if($concession_group_id  != '0'){
				$this->db->where('concess_group_id',$concession_group_id);
				$this->db->select('tax_perc,discount_perc')->from('tbl_concess_group');
				$res = $this->db->get();
				$tax = $res->row()->tax_perc;
				$discount = $res->row()->discount_perc;
				$tax_perce = ($tax/100) * $tot; 
				$discount_perce = ($discount/100) * $tot;
				$tot_amt = ($tot + $tax_perce ) - $discount_perce;
			} else{
				$tax = '0';
				$discount = '0';
				$tot_amt = $tot;
			}
			$invoice_info = array(
				'client_id' => $this->session->userdata('client_id'),
				'bill_no' => $bill_no,
				'patient_id' => $this->input->post('patient_id'),
				'treatment_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('sn_date')))),
				'due_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('sn_date')))),
				'total_amt' => $tot,
				'net_amt' => $tot_amt,
				'bill_status' => 0,
				'generated_by' => $clientName,
				'created_by' => $this->session->userdata('username'),
				'created_date' => date('Y-m-d H:i:s'),
				'modify_by' => $this->session->userdata('username'),
				'tax_perc' => $tax,
				'discount_perc' => $discount,
				'modify_date' => date('Y-m-d H:i:s'),
			);
			$this->db->insert('tbl_invoice_header', $invoice_info);
			$bill_id=$this->db->insert_id();
			
			
			for($i=0; $i< sizeof($id); $i++){
				$this->db->where('item_id',$id[$i]);
				$this->db->select('item_price,item_desc')->from('tbl_item');
				$res = $this->db->get();
				$price = $res->row()->item_price;
				$item_desc = $res->row()->item_desc;
				$item_amt = $price * $treatment_quantity[$i];
				$dat = array(
				    'treatment_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('sn_date')))),
			        'client_id' => $this->session->userdata('client_id'),
					'bill_id' => $bill_id,
					's_no' => '1',
					'item_id' => $id[$i],
					'item_desc' => $item_desc,
					'item_quantity' => $treatment_quantity[$i],
					'item_price' => $price,
					'item_amount' => $item_amt,
					'created_by' => $this->session->userdata('username'),
					'created_date' => date('Y-m-d H:i:s'),
					'modify_by' => $this->session->userdata('username'),
					'modify_date' => date('Y-m-d H:i:s'),
				);
			   $this->db->insert('tbl_invoice_detail', $dat);
				
			}
			
			$this->db->where('patient_id',$this->input->post('patient_id'));
		    $this->db->where('treatment_date',$session_det['sn_date']);
		    $this->db->set('bill_status','1');
			$this->db->set('bill_id',$bill_id);
			$this->db->update('tbl_patient_treatment_techniques');
		} else {
			$bill_id = 0;
		}
		return true;
	}   
	
	
	public function sessPatient($patient_id)
	{
		$where = array('patient_id' => $patient_id);
		$this->db->select('patient_id,first_name, last_name,patient_code')->from('tbl_patient_info')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	
	public function showSessionHtml($staffid)
	{
		if($this->session->userdata('is_client') != true){
		
			$data = $this->common_model->getAllsessclient($staffid);
			
			foreach($data as $sessinfo)
			{
				$html = '
					 <tr class="odd gradeX">
						  <td  style="vertical-align: middle">'. date('d/m/Y', strtotime( $sessinfo['sn_date'])) .'</td>
						  <td  style="vertical-align: middle"><span class="badge badge-success">'. $sessinfo['patient_code'].'</td>
						  <td  style="vertical-align: middle">'. $sessinfo['fpatient_name'] . $sessinfo['lpatient_name'].' </td>
						  <td  style="vertical-align: middle">'. $sessinfo['Session_count'] .'</td>
						  <td  style="vertical-align: middle">'. $sessinfo['repot_by'] .'</td>
						  <td style="text-align: center; vertical-align: middle">'.$sessinfo['Comment_sess'].' </td>
								
						</tr>
				';
			}}else {

				$data = $this->common_model->getAllsessclient();
				
				foreach($data as $sessinfo){
				
				$html = '
				
						
			
					  <tr class="odd gradeX">
						  <td  style="vertical-align: middle">'. date('d/m/Y', strtotime( $sessinfo['sn_date'])) .'</td>
						  <td  style="vertical-align: middle"><span class="badge badge-success">'. $sessinfo['patient_code'].'</td>
						  <td  style="vertical-align: middle">'. $sessinfo['fpatient_name'] . $sessinfo['lpatient_name'].' </td>
						  <td  style="vertical-align: middle">'. $sessinfo['Session_count'] .'</td>
						  <td  style="vertical-align: middle">'. $sessinfo['repot_by'] .'</td>
						  <td style="text-align: center; vertical-align: middle">'.$sessinfo['Comment_sess'].' </td>
								
						</tr>
						
						
				';
				}}
	
		return $html;
	}

	
	public function sendmail($email){
		
		$this->db->select('*')->from('tbl_client')->where('client_id',$this->session->userdata('client_id'));
	    $res = $this->db->get();
	    $clinic_name = $res->row()->clinic_name;
		$url = base_url().'patient/patient/setpassword/'.$email;
		$pdfMessage = $this->mail_model->patienttemplate($url);
		$adminMailConfig = array('to' => $email, 'subject' => ''.$clinic_name.'(Activate Your Account)', 'message' => $pdfMessage);
		$this->mail_model->sendPatientMail($adminMailConfig);
	}
		// Delete patient
	public function export($patient_id,$token){
	echo $token;
	echo $token1 = $this->nativesession->get("token");
		 $where = array('patient_id' => $patient_id);
		 $xml = '<Leads>';
		 echo 'hello';

		$this->db->select('first_name,client_id,patient_code,photo,gender,last_name,patient_id,address_line1,address_line2,city,pincode,mobile_no,phone_no,email')->from('tbl_patient_info')->where($where);
		$query=$this->db->get(); 

		//$sql = 'select first_name,client_id,patient_code,photo,gender,last_name,patient_id,address_line1,address_line2,city,pincode,mobile_no,phone_no,email from tbl_patient_info where patient_id IN (' . implode(',', array_map('intval', $plist)) . ')'; */

		/* $XML = '<Leads>'; */
		if ($query->num_rows > 0) {
		$rows = $query->result_array();
		foreach($rows as $row) {
			if(isset($row["first_name"])){$first=$row["first_name"];}
			if(isset($row["last_name"])){$last=$row["last_name"];}
			if(isset($row["email"])){$mail=$row["email"];}
			if(isset($row["phone_no"])){$phone=$row["phone_no"];}
			$xml .= '<row no="1">';
			$xml .= '<FL val="First Name">'.$first.'</FL>';
			$xml .= '<FL val="Last Name">'.$last.'</FL>';
			$xml .= '<FL val="Email">'.$mail.'</FL>';
			$xml .= '<FL val="Lead Source">Physio Plus Tech</FL>';
			$xml .= '<FL val="Phone">'.$phone.'</FL>';
			$xml .= '</row>';

			}
			$xml .= '</Leads>';
			header ("Content-Type:text/xml"); 
			echo $xml;
			$url ="https://crm.zoho.com/crm/private/xml/Leads/insertRecords";
			$query="authtoken=".$token."&scope=crmapi&newFormat=1&xmlData=".$xml;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_TIMEOUT, 30);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $query);// Set the request as a POST FIELD for curl.

			//Execute cUrl session
			$response = curl_exec($ch);
			curl_close($ch);
			var_dump( $response );

		
		} 
		
	
	
}
	public function patientaccess()
	{
		$arr=array();
		
		$emr=$this->input->post('Emr');
		$treat=$this->input->post('Treatment');
		$invoice=$this->input->post('Invoice');
		$feedback=$this->input->post('Feedback');
		$appointment=$this->input->post('Appointment');
		$exersice=$this->input->post('Exercise');
		array_push($arr,"0");
		
		
		if ($emr==1)
		{
			array_push($arr,$emr);
		}
		if($treat==2)
		{
			array_push($arr,$treat);
		}
		if ($invoice==3)
		{
			array_push($arr,$invoice);
		}
		if($feedback==4)
		{
			array_push($arr,$feedback);
		}
		if ($appointment==5)
		{
			array_push($arr,$appointment);
		}
		if($exersice==6)
		{
			array_push($arr,$exersice);
		}
		
		$str=implode(",",$arr);
		$data=array('privilege'=>$str);
		$this->db->where('patient_id', $this->input->post('patient_id'));
		$this->db->update('tbl_patient_info',$data); 
		
		if($this->session->userdata('client_id')  == 1809){
		   $registration_info = $this->registration_model->editProfile($this->session->userdata('client_id'));
		   $clinic_name = $registration_info['clinic_name'];
		   $first_name = $registration_info['first_name'];
		   $last_name = $registration_info['last_name'];
			$address1 = $registration_info['address'];
			$city = $registration_info['city'];
			$zipcode = $registration_info['zipcode'];
			$mobile = $registration_info['mobile'];
			$email = $registration_info['email'];
			$logo = $registration_info['logo'];
			
		   $this->db->where('patient_id',$this->input->post('patient_id')) ;
		   $this->db->select('first_name,gender,last_name,email')->from('tbl_patient_info');
		   $res = $this->db->get();
		   $name = $res->row()->first_name.' '.$res->row()->last_name;
		   $mail = $res->row()->email;
		   $gender=$res->row()->gender;
				if($res->row()->gender == 'male'){
					$title = 'Mr.';
				} else {
					$title = 'Ms.';
				}
				$patient = array(
					'ClinicName' => ucfirst($clinic_name),
					'ClientFirstName' => ucfirst($first_name),
					'ClientLastName' => ucfirst($last_name),
					'Address1' => $address1,
					'City' => $city,
					'Zipcode' => $zipcode,
					'Mobile' => $mobile,
					'Email' => $email,
					'Patientname' => $name,
					'Title' => $title,
					'Patientmail' => $mail,
					'Logo' => $logo
		   );
           $patientMessage = $this->mail_model->patient_access($patient);
		}  
		return $this->input->post('patient_id');

	}
	
	public function report_model($patient_id,$from_date='',$to_date='')
	{
	   $this->db->select('*');
		$this->db->from("tbl_session_det");
		$this->db->where("patient_id",$patient_id);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function viewMexamncervical($patient_id)
	{
		
		$where = array('patient_id' => $patient_id);
		$this->db->select('*')->from('tbl_patient_motor_cervical')->where($where);
		//$this->db->order_by("mexamn_date", "asc");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function viewMexamnthoraccic($patient_id)
	{
		
		$where = array('patient_id' => $patient_id);
		$this->db->select('*')->from('tbl_patient_motor_thoraccic')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function glascow($patient_id)
	{
		
		$where = array('patient_id' => $patient_id);
		$this->db->select('*')->from('tbl_patient_nuero_glasgow')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function testsinfo($patient_id)
	{
		
		$where = array('patient_id' => $patient_id);
		$this->db->select('*')->from('tbl_patient_nuero_dynamic')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function adlscore($patient_id)
	{
		
		$where = array('patient_id' => $patient_id);
		$this->db->select('*')->from('tbl_patient_nuero_adl')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function gait($patient_id)
	{
		
		$where = array('patient_id' => $patient_id);
		$this->db->select('*')->from('tbl_patient_nuero_gait')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function functional($patient_id)
	{
		
		$where = array('patient_id' => $patient_id);
		$this->db->select('*')->from('tbl_patient_nuero_functional')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function special($patient_id)
	{
		
		$where = array('patient_id' => $patient_id);
		$this->db->select('*')->from('tbl_patient_nuero_special')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function neural($patient_id)
	{
		
		$where = array('patient_id' => $patient_id);
		$this->db->select('*')->from('tbl_patient_nuero_tissue')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function verbal($patient_id)
	{
		
		$where = array('patient_id' => $patient_id);
		$this->db->select('*')->from('tbl_patient_nuero_verbal')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function measure($patient_id)
	{
		
		$where = array('patient_id' => $patient_id);
		$this->db->select('*')->from('tbl_patient_motor_examination')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function  medical($patient_id)
	{
		$where = array('patient_id' => $patient_id);
		$this->db->select('*')->from('tbl_patient_medi_info')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function lumber($patient_id)
	{
		$where = array('patient_id' => $patient_id);
		$this->db->select('*')->from('tbl_patient_motor_lumber')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function add_med_diagnosis($patient_id,$biomechanical) {
		$provInfo = array(
			'patient_id' => $patient_id,
			'bio' => $biomechanical,
			'client_id' => $this->session->userdata('client_id'),
			'date' => date('Y-m-d')
		);
		
		$this->db->insert('tbl_patient_medi_info', $provInfo);
		return true;
	}
	public function app_book($name,$email,$formated_date,$mobile,$date1,$date2,$c_id)
	{	
		
		  $data = array(
			'title' => $name,
			'har_email' => $email,
			'har_mob_no' => $mobile,
			'start' => $date1,
			'end' => $date2,
			'appointment_from'=>$formated_date,
			'client_id'=>$c_id
		);
		
		$this->db->insert('tbl_appointments', $data);
		return true; 
	}
	public function treatment_protocol($patient_id)
	{
		
		$where = array('patient_id' => $patient_id, 'tt.client_id' => $this->session->userdata('client_id'));
		$this->db->select('tt.client_id,tt.treatment_id,tt.patient_id,tt.treatment_date,tt.treatments,tt.treatment_quantity,tt.treatment_price,it.item_name')->from('tbl_patient_treatment_techniques tt')->where($where)->order_by("tt.treatment_id", "asc");
		$this->db->join("tbl_item it", "tt.treatments=it.item_id");
		$this->db->order_by("tt.treatment_date", "asc");
		$query=$this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	
	}
	/* public function nummessage($mobile,$date1)
	{
		date_default_timezone_set("Asia/Kolkata"); 
		$mobile = $mobile;
		$message = 'We are pleased to confirm your appointment at Physio Plus Clinic.On '.$date1.'.For details 9894604603.';
			$doctorSmsURL = 'http://bulk.smsinfo.in/api/sendmsg.php?user=physioplus&pass=goodluck&sender=Test&phone='.$mobile.'&text='.urlencode($message).'&priority=dnd&stype=normal';
					$doctor_churl = @fopen($doctorSmsURL,'r');
					fclose($doctor_churl); 
			$this->db->query('update tbl_validity set psms_count = 	psms_count + 1 where client_id ='. $this->session->userdata('client_id'));
			$deliveryinfo = array(
					
						'client_id' => $this->session->userdata('client_id'),
						'delivery_date' => date('Y-m-d'),
						'status' => 'Success',
						'message' => $message,
						'delivery_time' => date("h:i:s A")
					
					);
			$this->db->insert('sms_delivery_report',$deliveryinfo);
			
		return true; 
	}  */
	public function patient_det($name,$email,$formated_date,$mobile) {
		
		// generate patient code and submit
		$patient_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'first_name' => $name,
			'appoint_date' => $formated_date,
			'mobile_no' => $mobile,
			'email' => $email,
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
			'patient_code' => $this->generate_code()
		);
		// insert datas
		$this->db->insert('tbl_patient_info', $patient_info);
		$data = array('patient_id' => $this->db->insert_id(), 'first_name' => $this->input->post('first_name'));
		if($this->db->insert_id()){
			return $data;	
		} else {
			return false;	
		}
	}	
	
	public function add_chart($pat_name,$chart_no,$chartname)
	{
		$sunday = $this->input->post('sunday');
		$monday = $this->input->post('monday');
		$tuesday = $this->input->post('tuesday');
		$wednesday = $this->input->post('wednesday');
		$thursday = $this->input->post('thursday');
		$friday = $this->input->post('friday');
		$saturday = $this->input->post('saturday');
		
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('chard_no',$chart_no);
		$this->db->where('chart_name',$chartname);
		   $patient_info = array(
				'patient_name' => $pat_name[0],
				'patient_id' => $pat_name[1],
				'email' => $pat_name[2],
				'time' => $this->input->post('time'),
				'day_view' => $sunday.','.$monday.','.$tuesday.','.$wednesday.','.$thursday.','.$friday.','.$saturday,
				
			);
			$this->db->update('save_chart', $patient_info); 
			$patient_info1 = array(
				'patient_name' => $pat_name[0],
				'patient_id' => $pat_name[1],
				'email' => $pat_name[2],
				'chartname'=>$chartname,
				'chart_no'=>$chart_no
			);
			$this->db->insert('chart_details', $patient_info1); 
			return $chartname;
	}
	
	public function dadd_chart($pat_name,$chart_no,$chartname)
	{
		$sunday = $this->input->post('sunday');
		$monday = $this->input->post('monday');
		$tuesday = $this->input->post('tuesday');
		$wednesday = $this->input->post('wednesday');
		$thursday = $this->input->post('thursday');
		$friday = $this->input->post('friday');
		$saturday = $this->input->post('saturday');
		
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('chard_no',$chart_no);
		$this->db->where('chart_name',$chartname);
		   $patient_info = array(
				'patient_name' => $pat_name[0],
				'patient_id' => $pat_name[1],
				'email' => $pat_name[2],
				'time' => $this->input->post('time'),
				'day_view' => $sunday.','.$monday.','.$tuesday.','.$wednesday.','.$thursday.','.$friday.','.$saturday,
				
			);
			$this->db->update('default_chart', $patient_info); 
			$patient_info1 = array(
				'patient_name' => $pat_name[0],
				'patient_id' => $pat_name[1],
				'email' => $pat_name[2],
				'chartname'=>$chartname,
				'chart_no'=>$chart_no
			);
			$this->db->insert('defaultchart_detail', $patient_info1); 
			return $chartname;
	}
	
   public function new_add_chart(){
		
		$pieces=explode('/',$this->input->post('name'));
		$pieces1=explode('/',$this->input->post('name'));
		$data=array(
        'patient_name'=>$pieces[0],
		'patient_id'=>$pieces1[1],
		'email'=>$this->input->post('email'),
		'chart_name'=>$this->input->post('chartname'),
		
		);
	
     $this->db->insert('save_chart_new',$data);
		return true;
		
	}
	
	public function select_chart(){
		$this->db->select('*')->from('save_chart_new');
        $query = $this->db->get();
		return $query->result_array();
	}
	public function cancel_appointments() {
		$this->db->select('*')->from('tbl_appointments');
		$this->db->where('status','1');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
		
	}
	public function provi_add($client_id) {
		$provdiag_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'pd_list_name' => $this->input->post('pd_list_name'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
				
		$this->db->insert('tbl_prov_diagnosis_list', $provdiag_info);
		return $client_id;
	}
	public function edit_provi($pd_id,$client_id) {
		$provdiag_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'pd_list_name' => $this->input->post('pd_list_name'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
		$this->db->where('pd_list_id',$pd_id);	
		$this->db->update('tbl_prov_diagnosis_list', $provdiag_info);
		return $client_id;
	}
	public function addMedicalDiag($patient_id) {
		
		$provdiag_info = array(
			'patient_id' => $patient_id,
			'client_id' => $this->session->userdata('client_id'),
			'bio' => $this->input->post('biomechanical'),
			'date' => date('Y-m-d')
		);
		$this->db->insert('tbl_patient_medi_info', $provdiag_info);
		$data['patient_id']=$patient_id;
		$data['medi_id']=$this->db->insert_id();
		$id = $this->db->insert_id();
		$visit_date = date('Y-m-d');
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		$count = $this->patient_model->getPatientMedicalCount($patient_id);
		$medicals = $this->editMedicals($patient_id,$id);
			$url=base_url().'client/patient/edit_treatment_medicaldiag/'.$patient_id.'/'.$id;
				$html = '
				<tr>
					 <td class="actions text-center">'.date('d/m/Y', strtotime($medicals['date'])).'</td>
					  <td class="actions text-center">'. $medicals['bio'].'</td>
					  <td class="actions text-center"><a class="edit" href="'.$url.'"><button type="submit" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="DeleteTreatment_medical" href="#'.$patient_id.'#'.$id.'"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fa fa-trash-alt"></i>  </button></a></td>
				</tr>
					  
				';
			return $html;
	}
	public function editMedicalDiag($patient_id,$medi_id) {
		
		$provdiag_info = array(
			'patient_id' => $patient_id,
			'client_id' => $this->session->userdata('client_id'),
			'bio' => $this->input->post('bio'),
			'date' => date('Y-m-d')
		);
		$this->db->where('medi_id',$medi_id);
		$this->db->update('tbl_patient_medi_info', $provdiag_info);
		return $patient_id;
	}
	public function edit_report(){
		$item = $this->input->post('item_name');
		$it = explode('|',$item);
		$sn_id = $this->input->post('sn_id');
		$info=array(
		'client_id'=>$this->session->userdata('client_id'),
		'item_id'=> $it[0],
		'session_count'=> $this->input->post('no_session'),
		'comment_sess'=>$this->input->post('commands'),
		'created_by' => $this->session->userdata('username'),
		'created_date' => date('Y-m-d H:i:s'),
		'modify_by' => $this->session->userdata('username'),
		'modify_date' => date('Y-m-d H:i:s'),
		'sn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('sn_date')))),
		);
	 
        $this->db->where('sn_id',$this->input->post('sn_id'));
		$this->db->update('tbl_session_det',$info);	
		
		$info=array(
		'client_id'=>$this->session->userdata('client_id'),
		'treatments'=> $it[0],
		'treatment_quantity'=>$this->input->post('no_session'),
		'created_by' => $this->session->userdata('username'),
		'created_date' => date('Y-m-d H:i:s'),
		'modify_by' => $this->session->userdata('username'),
		'modify_date' => date('Y-m-d H:i:s'),
		);
		
		$this->db->where('patient_id',$this->input->post('p_id'));
		$this->db->update('tbl_patient_treatment_techniques',$info);

		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('appointment_from',date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('sn_date')))));
		$this->db->where('patient_id',$this->input->post('p_id'));
		$this->db->set('visit',1);
		$this->db->update('tbl_appointments');
		
		
		return $sn_id;
	}
	
	public function addProgNotes($patient_id) {
		
		$prognotes_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $patient_id,
			'pn_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('pn_date')))),
			'prog_notes' => $this->input->post('prog_notes'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
				
		$this->db->insert('tbl_patient_prog_notes', $prognotes_info);
		$data['patient_id']=$patient_id;
		$id=$this->db->insert_id();
		$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('pn_date'))));
		$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
		if($visit_date_value == false){
			$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
			$this->db->insert('tbl_patient_visits', $visit_info);
		}
		$prognotes = $this->editProgNotes($patient_id,$id);
			$enteredBy = $prognotes['modify_by'];
				$profileInfo = $this->registration_model->getProfileInfo($enteredBy);
				$staffInfo = $this->staff_model->getStaffInfo($enteredBy);
				
				if($profileInfo != false)
					$clientName = $profileInfo['first_name'];
				else if($staffInfo != false)
					$clientName = $staffInfo['first_name'].' '.$staffInfo['last_name'];
				$url=base_url().'client/patient/edit_cnotes_prognotes/'.$patient_id.'/'.$id;
				$html = '
					 <tr>
						<td class="actions text-center">'. date('d-m-Y',strtotime($prognotes['pn_date'])).'</td>
							<td class="actions text-center">'. $prognotes['prog_notes'].'</td>
							<td class="actions text-center">'. $clientName.'</td>
							<td class="actions text-center"><a class="edit" href="'.$url.'"><button type="submit" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="DeleteProgNotes" href="#'.$prognotes['patient_id'].'#'.$prognotes['pn_id'].'"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fa fa-trash-alt"></i></button></a></td>
					</tr>  
				';
		return $html;
		
	}
	public function editCaseNotes($patient_id,$cn_id)
	{
		$where = array('patient_id' => $patient_id, 'cn_id' => $cn_id);
		$this->db->select('*')->from('tbl_patient_case_notes')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	 public function body_save($image_name,$name)
	{
		$c_id = $this->session->userdata('client_id');
		/* $this -> db -> where('patient_id' , $name);
        $this -> db -> delete('tbl_body_chart'); */
		
		$data = array(
			'img_name'=>$image_name,
			'patient_id'=>$name,
			'client_id'=>$c_id
		);
		$this->db->insert('tbl_body_chart',$data);
		return true;
	} 
	public function getPatient(){
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('patient_name,patient_id')->from('prescription_detail');
        $this->db->group_by('patient_id');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getchart(){
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('chartname')->from('prescription_detail');
        $query = $this->db->get();
		return $query->result_array();
	}
	public function add_privatechart($pat_name,$chart_no,$chartname)
	{
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('chard_no',$chart_no);
		$this->db->where('chart_name',$chartname);
		$patient_info = array(
				'patient_name' => $pat_name[0],
				'patient_id' => $pat_name[1],
				'email' => $pat_name[2],
				
			);
			$this->db->update('save_privatechart', $patient_info); 
			
			$patient_info1 = array(
				'patient_name' => $pat_name[0],
				'patient_id' => $pat_name[1],
				'email' => $pat_name[2],
				'chartname'=>$chartname,
				'chart_no'=>$chart_no
				
			);
			$this->db->insert('chart_details', $patient_info1); 
			return $chartname;
	}
	
	public function add_chart_detail($pat_name,$chart_no,$chartname,$status,$amt,$pay) 
	{
		$c_id=$this->session->userdata('client_id');
		$today = date('Y-m-d');
			$data = array(
				'patient_name' => $pat_name[0],
				'patient_id' => $pat_name[1],
				'email' => $pat_name[2],
				'ex_date'=>date('Y-m-d'),
				'chartname'=>$chartname,
				'chart_no'=>$chart_no, 
				'client_id'=>$c_id, 
				'pay'=>$pay, 
				'notify'=>'1', 
				'amount'=>$amt,
				'status'=>$status,
			);
			
			$this->db->insert('prescription_detail',$data); 
			return $c_id;
	}
	public function default_add_chart($pat_name,$chart_no,$chartname,$status,$amt,$pay) 
	{
		$c_id=$this->session->userdata('client_id');
		$today = date('Y-m-d');
			$data = array(
				'patient_name' => $pat_name[0],
				'patient_id' => $pat_name[1],
				'email' => $pat_name[2],
				'ex_date'=>date('Y-m-d'),
				'chartname'=>$chartname,
				'chart_no'=>$chart_no, 
				'client_id'=>$c_id, 
				'pay'=>$pay, 
				'notify'=>'1', 
				'amount'=>$amt,
				'status'=>$status,
			);
			
			$this->db->insert('defaultchart_detail',$data); 
			return $c_id;
	}
	
	public function viewBodychart($patient_id)
	{
		$where = array('patient_id' => $patient_id);
		$this->db->select('*')->from('tbl_body_chart')->where($where);
		$this->db->order_by("date", "asc");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function add_concess(){
		$this->db->where('patient_id',$this->input->post('patient_id'));
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->set('concess_group_id',$this->input->post('concess_group_id'));
		$this->db->update('tbl_patient_info');
		return $this->input->post('patient_id');
	}
	public function get_concess_det($prov) 
	{
		$this->db->where('patient_id',$prov);
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('concess_group_id,first_name')->from('tbl_patient_info');
		$val = $this->db->get();
		if($val->result_array() != false){
		$c_id  = $val->row()->concess_group_id;
		if($c_id == '' || $c_id == 0){
			$this->db->where('client_id',$this->session->userdata('client_id'));
			$this->db->select('tax,discount')->from('tbl_settings');
			$val1 = $this->db->get();
			if($val1->result_array() != false){
			$tax  = $val1->row()->tax;
			$discount  = $val1->row()->discount; 
			} else {
				$tax  = '0.00';
				$discount  = '0.00'; 
			}
		} else  {
			$this->db->where('concess_group_id',$c_id);
			$this->db->where('client_id',$this->session->userdata('client_id'));
			$this->db->select('tax_perc,discount_perc')->from('tbl_concess_group');
			$val1 = $this->db->get();
			$tax  = $val1->row()->tax_perc;
			$discount  = $val1->row()->discount_perc; 
		} } else{
			$this->db->where('client_id',$this->session->userdata('client_id'));
			$this->db->select('tax,discount')->from('tbl_settings');
			$val1 = $this->db->get();
			if($val1->result_array() != false){
			$tax  = $val1->row()->tax;
			$discount  = $val1->row()->discount; 
			} else {
				$tax  = '0.00';
				$discount  = '0.00'; 
			}
		}
		$data = array('tax' => $tax, 'discount' => $discount);
		if($data != false){
			return $data;	
		} else {
			return false;	
		}
		
	}
	
	public function viewchart_detail($patient_id) {
		$this->db->where('patient_id',$patient_id);
		$this->db->select('chartname,patient_name,date,patient_id')->from('chart_details');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	 
	public function smsNotify($mobile_no,$patient_id) {
		$this->db->select('pi.first_name,pi.last_name,pi.gender,pi.age,ci.clinic_name,pi.mobile_no')->from('tbl_patient_info pi');
		$this->db->join('tbl_client ci',"pi.client_id = ci.client_id");
		$where = array('patient_id' => $patient_id);
		$this->db->where($where);
		$query = $this->db->get();
		$profile_info = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$sms_count = $profile_info['sms_count'];
		$sms_limit = $profile_info['total_sms_limit'];
		if($query->num_rows() > 0){
			$data = $query->row();
			$first_name = ($data->first_name != '') ? $data->first_name : '';
			$last_name = ($data->last_name != '') ? $data->last_name : '';
			$gender=ucfirst(substr($data->gender,0,1));
			$age = ($data->age != '') ? $data->age : '';
			$mobile_no = ($data->mobile_no != '') ? $data->mobile_no : '';
			$clinic_name = ($data->clinic_name != '') ? $data->clinic_name : '';;
			if($data->gender == 'male'){
				$title = 'Mr.';
			}else{
				$title = 'Ms.';
			}
			if($mobile_no != '') {
				if($this->session->userdata('client_id') == '1948')  {
					$clinic_name1 = 'SUNSHINE SUPER SPECIALITY PHYSIOTHERAPY CLINIC';
					$message_doctor = 'Dear '.$title. ucfirst($first_name).','.ucfirst($clinic_name1). ' Welcomes You and we wish you speedy recovery. ';
					$smsUrl = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=FISIYO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$mobile_no.'&duplicateCheck=true&format=json&msg='.urlencode($message_doctor);
				} else {
					$message_doctor = 'Dear '.$title. ucfirst($first_name).','.ucfirst($clinic_name). ' Welcomes You and we wish you speedy recovery. ';
					$smsUrl = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=FISIYO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$mobile_no.'&duplicateCheck=true&format=json&msg='.urlencode($message_doctor);
				}
				$sms['doctor'] = 'Done';
					$sms_count+=1;
					$churl = @fopen($smsUrl,'r');
					fclose($churl); 
					$length = strlen($message_doctor);
					$cost = ceil($length/160);
					if(!$churl){ }else{
						$this->db->query('update tbl_client set sms_count = sms_count + '.$cost.' where status = 1 and client_id ='.$this->session->userdata('client_id'));
					}
			} 
			$this->db->where('client_id', $this->session->userdata('client_id'));
			$this->db->update('tbl_client', array('sms_count' => $sms_count));
			return $sms;
			
		}
	}
	public function get_patient_det($p_id) {
		$id = explode(',',$p_id);
		for($i=0;$i<count($id);$i++){
			$this->db->select('patient_id',$id[$i]);
			$this->db->select('first_name,last_name');
			$query = $this->db->get();
		}
	}
	public function sms_add($patient_id) {
		
		$this->db->where('patient_id',$patient_id);
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
		$sms = $this->smsNotify_reminder($patient_id);
		print_r($sms);
		return $sms;
		
	}
	public function add_group(){
		$c_id=$this->session->userdata('client_id');
		$data = array(
				'group_name' => $this->input->post('group_name'),
				'client_id' => $c_id,
		);
		$this->db->insert('tbl_group',$data); 
		$group_id = $this->db->insert_id();
		
		$data = array(
				'member_id' => $this->input->post('group_members'),
				'group_id' => $group_id,
				'client_id' => $c_id,
		);
		$this->db->insert('tbl_group_members',$data); 
		$group_id = $this->db->insert_id();
		return $c_id;
	}
	
	public function smsNotify_reminder($patient_id) {
		$this->db->select('first_name,last_name,gender,age,mobile_no')->from('tbl_patient_info ');
		$where = array('patient_id' => $patient_id);
		$this->db->where($where);
		$query = $this->db->get();
			
		 if($query->num_rows() > 0){
			$data = $query->row();
			$first_name = ($data->first_name != '') ? $data->first_name : '';
			$last_name = ($data->last_name != '') ? $data->last_name : '';
			$gender=ucfirst(substr($data->gender,0,1));
			$age = ($data->age != '') ? $data->age : '';
			$mobile_no = ($data->mobile_no != '') ? $data->mobile_no : '';
			
			$profile_info = $this->registration_model->editProfile($this->session->userdata('client_id'));
			$sms_count = $profile_info['sms_count'];
			$sms_limit = $profile_info['total_sms_limit'];
			$clinic_name = $profile_info['clinic_name'];
			$country = $profile_info['country'];
			if($data->gender == 'male'){
				$title = 'Mr.';
			}else{
				$title = 'Ms.';
			}
			 if($mobile_no != '') {
				
					if($sms_limit > $sms_count) {  
					if($this->session->userdata('client_id') == '1948') {
					  $clinic_name1 = 'SUNSHINE SUPER SPECIALITY PHYSIOTHERAPY CLINIC';
					  $message_doctor = 'Dear '. ucfirst($first_name).','.ucfirst($clinic_name1). '.reminds You that your treatment sessions are yet to be completed so please do come regularly.';
					  $smsUrl = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=FISIYO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$mobile_no.'&duplicateCheck=true&format=json&msg='.urlencode($message_doctor);
					} else {
					 $message_doctor = 'Dear '. ucfirst($first_name).','.ucfirst($clinic_name). '.reminds You that your treatment sessions are yet to be completed so please do come regularly.';
					 $smsUrl = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=FISIYO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$mobile_no.'&duplicateCheck=true&format=json&msg='.urlencode($message_doctor);
					}
					$sms['doctor'] = 'Done';
					$sms_count+=1;
					$churl = @fopen($smsUrl,'r');
					fclose($churl); 
					$length = strlen($message_doctor); 
					$cost = ceil($length/160);
					if(!$churl){ }else{
						$this->db->query('update tbl_client set sms_count = sms_count + '.$cost.' where status = 1 and client_id ='.$this->session->userdata('client_id'));
					} 
					
				  } else {
					 
				  } 
				
			}
			return $sms;
		}
	}
	public function close_episode() {
		$this->db->where('patient_id',$this->uri->segment(4));
		$this->db->set('episode_status',$this->uri->segment(5));
		$this->db->update('tbl_patient_info');
		return $this->uri->segment(4);
	}
	public function change_status($p_id) {
		$this->db->where('patient_id',$p_id);
		$this->db->select('episode_status')->from('tbl_patient_info');
		$res = $this->db->get();
		$status = $res->row()->episode_status;
		
		$this->db->where('patient_id',$p_id);
		if($status == '1') {
		    $this->db->set('episode_status','0');
		} else {
			$this->db->set('episode_status','1');
		}
		$this->db->update('tbl_patient_info');
		
		$this->db->where('patient_id',$p_id);
		$this->db->select('episode_status')->from('tbl_patient_info');
		$res = $this->db->get();
		$status = $res->row()->episode_status;
		return $status;
	}
	public function selectpatient($patient_id)
	{
		$where = array('patient_id' => $patient_id);
		$this->db->select('*')->from('tbl_patient_info')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	 public function sign_save()
	{
		$c_id = $this->session->userdata('client_id');
		
		
		$data = array(
			'img_name'=>$this->generate_Newimage(),
			'patient_id'=>$this->input->post('patient_id'),
			'date' => date('Y-m-d'),
			'client_id'=>$c_id
		);
		$this->db->insert('tbl_consent_sign',$data);
		return true;
	}  
	public function viewsign_detail($patient_id) {
		$this->db->where('patient_id',$patient_id);
		$this->db->select('*')->from('tbl_consent_sign');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function viewsign_detail1($patient_id,$consent_id) {
		$where = array('patient_id' => $patient_id,'consent_id' => $consent_id);
		$this->db->where($where);
		$this->db->select('*')->from('tbl_consent_sign');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function guard_save1()
	{
		$this->db->where('consent_id',$this->input->post('consent_id'));
		$this->db->set('img_name1',$this->input->post('contractdata1'));
		$this->db->update('tbl_consent_sign',$data);
		return true;
	} 
	public function guard_save()
	{
		$c_id = $this->session->userdata('client_id');
		
		 $this->db->limit(1);
		 $this->db->order_by("consent_id", "desc"); 
		 
		$data = array(
			'img_name1'=>$this->generate_image(),
			//'patient_id'=>$this->input->post('patient_id'),
			'client_id'=>$c_id
		);
		$this->db->update('tbl_consent_sign',$data);
		return true;
	}  
	public function consent_formadd1($provD)
	{
		$val = explode('/',$provD);
		$c_id = $this->session->userdata('client_id');
		$data = array(
			'img_name'=>$val[0],
			'patient_id'=>$val[1],
			'date' => date('Y-m-d'),
			'client_id'=>$c_id
		);
		$this->db->insert('tbl_consent_sign',$data);
		$id = $this->db->insert_id();
		$data = array('consent_id' => $id); 
		if($id != false){
			return $data;
		} else {
			return false;
		}
	} 
	public function generate_Newimage() {
		
		$data = $this->input->post('contractdata');
 
        $data = str_replace('data:image/png;base64,', '', $data);

		$data = str_replace(' ', '+', $data);
       
	    $data = base64_decode($data);
       
	    $file = 'sign/'.rand() . '.png';
		
		$success = file_put_contents($file, $data);

		$data = base64_decode($data); 

		$source_img = imagecreatefromstring($data);

		$rotated_img = imagerotate($source_img, 90, 0); 

		$file1 = 'sign/'. rand(). '.png';

		$imageSave = imagejpeg($rotated_img, $file1, 10);

		imagedestroy($source_img); 
    
        return $file;	
		  
	}
      public function generate_image() {
		
		$data = $this->input->post('contractdata1');
 
        $data = str_replace('data:image/png;base64,', '', $data);

		$data = str_replace(' ', '+', $data);
       
	    $data = base64_decode($data);
       
	    $file = 'sign/'.rand() . '.png';
		
		$success = file_put_contents($file, $data);

		$data = base64_decode($data); 

		$source_img = imagecreatefromstring($data);

		$rotated_img = imagerotate($source_img, 90, 0); 

		$file1 = 'sign/'. rand(). '.png';

		$imageSave = imagejpeg($rotated_img, $file1, 10);

		imagedestroy($source_img); 
    
        return $file;	
		  
	}
	public function guardian_save()
	{
		$c_id = $this->session->userdata('client_id');
		
		
		$data = array(
			'img_name1'=>$this->generate_image(),
			'patient_id'=>$this->input->post('patient_id'),
			'client_id'=>$c_id,
			'date' =>date('Y-m-d')
		);
		$this->db->insert('tbl_guard_sign',$data);
		return true;
	}  
	 public function viewguard_detail($patient_id,$guard_id) {
		$where = array('patient_id' => $patient_id,'guard_id' => $guard_id);
		$this->db->where($where);
		$this->db->select('*')->from('tbl_guard_sign');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function treatment_details() {
		//$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('patient_id',$this->input->post('patient_id'));
		$this->db->where('treatment_group_id',str_replace('_','/',$this->input->post('t_groupid')));
		$this->db->set('treatment_date',date('Y-m-d',strtotime($this->input->post('treatment_date'))));
		$this->db->update('tbl_patient_treatment_techniques');
		return str_replace('_','/',$this->input->post('t_groupid'));
	}
	public function	approve_patient() {
		$this->db->where('patient_id',$this->uri->segment(4));
		$this->db->set('app_approve',0);
		$this->db->update('tbl_patient_info');
		return $this->uri->segment(4);
	}
	 public function mobile_check($mobile){
		$this->db->where('client_id', $this->session->userdata('client_id'));
	    $this->db->where('mobile_no',$mobile);
		$this->db->select('first_name,last_name,patient_id')->from('tbl_patient_info');
		$res = $this->db->get();
		if($res->result_array() != false){
			$data = array( 'patient_id' => $res->row()->patient_id, 'name' => $res->row()->first_name.' '.$res->row()->last_name);
		}else {
			$data ='';
		}
		return $data;
	}
	
	public function patient_painchart($patient_id){
		$arr = array();
		$this->db->where('patient_id',$patient_id);
		$this->db->select('pain_date')->from('tbl_patient_pain');
		 $res = $this->db->get();
		 foreach($res->result_array() as $row){
			$where = array('pain_date' => $row['pain_date']); //it contains within date for table
			$this->db->select('severity_of_pain')->from('tbl_patient_pain')->where($where);
			$query1 = $this->db->get();
			$patientQuery = $query1->row_array();
			
			$count = $patientQuery['severity_of_pain'];
			$prefix = '';
			$data = array(
				'y' =>$row['pain_date'],
				'a' =>$count,
			);
			
			array_push($arr,$data);
		}
		return $arr;
		//print_r($arr);
	}
	public function viewPain1($patient_id,$from_date='',$to_date='')
	{
		if($from_date == '' && $to_date == ''){
			$where = array('patient_id' => $patient_id);
		}else{
			$where = array('patient_id' => $patient_id, 'pain_date >=' => $from_date, 'pain_date <=' => $to_date);
		}
		$this->db->select('*')->from('tbl_patient_pain')->where($where);
		$this->db->order_by("pain_date", "asc");
		$query=$this->db->get();
		
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function update_exe($patient_id) {
		$this->db->where('patient_id',$patient_id);
		$this->db->set('app_approve','3');
		$this->db->update('tbl_patient_info');
		return true;
	}
	public function get_patient_info($pat_id) {
		$id = explode(',',$pat_id);
		$arr  = array();
		for($i =0; $i < count($id); $i++){
			$this->db->where('patient_id',$id[$i]);
			$this->db->select('*')->from('tbl_patient_info');
			$query = $this->db->get();
			array_push($arr,$query->result_array());
		} 
		return $arr;
	}
	public function generate_code_bill() {
		$string  = 'B' ;
		$this->db->select('bill_no')->from('tbl_invoice_header')->where('client_id',$this->session->userdata('client_id'))->like('bill_no'); 
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $string . ($query->num_rows() + 1);
		} else {
			return $string . '1';
		}
	}
	public function get_todayPatientCount()
	{
		$this->db->select('count(patient_id) as totalcount')->from('tbl_patient_info')->where('client_id', $this->session->userdata('client_id'));
		$this->db->where('appoint_date',date('Y-m-d'));
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function patientcount(){
		$this->db->distinct();
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('appoint_date',date('Y-m-d'));
		$this->db->select('count(patient_id) as totalcount')->from('tbl_patient_info');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	
	public function patient_count(){
		$this->db->select('*');
		$this->db->from("tbl_patient_treatment_techniques");
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('treatment_date',date('Y-m-d'));
		$this->db->group_by('patient_id');
		$query = $this->db->get();
		return $query->num_rows();
		
		/* $this->db->distinct();
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('treatment_date',date('Y-m-d'));
		$this->db->select('count(patient_id) as totalcount')->from('tbl_patient_treatment_techniques');
		$this->db->group_by('patient_id');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false; */
	}
	public function protocolappointmentcount(){
		$this->db->distinct();
		$this->db->where('ai.client_id',$this->session->userdata('client_id'));
		$this->db->where('ai.appointment_from',date('Y-m-d'));
		$this->db->where('pi.treatment_date',date('Y-m-d'));
		$this->db->select('count(ai.patient_id) as totalcount')->from('tbl_appointments ai');
		$this->db->join('tbl_patient_treatment_techniques pi','pi.patient_id = ai.patient_id');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function appointmentcount(){
		$this->db->distinct();
		$this->db->where('ai.client_id',$this->session->userdata('client_id'));
		$this->db->where('ai.appointment_from',date('Y-m-d'));
		$this->db->where('ai.status',0);
		$this->db->select('count(ai.patient_id) as totalcount')->from('tbl_appointments ai');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function patientcount1(){
		
		$this->db->distinct();
			$this->db->where('tp.client_id',$this->session->userdata('client_id'));
			$this->db->where('ta.appointment_from',date('Y-m-d'));
			$this->db->where('ta.status',0);
			$this->db->select('count(tp.patient_id) as totalcount')->from('tbl_appointments ta');
		    $this->db->join("tbl_patient_info tp", "tp.patient_id=ta.patient_id");
			$this->db->join("tbl_staff_info si","ta.staff_id=si.staff_id");
			$query= $this->db->get();
			if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
     }
	
	public function get_today_list(){
			 
	    $this->db->distinct();
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('appoint_date',date('Y-m-d'));
		$this->db->select('gender,first_name,last_name,patient_code,patient_id,mobile_no,email')->from('tbl_patient_info');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
			 
		}  
		
		public function get_today_pat_list(){
			 
	    $this->db->distinct();
		$this->db->where('tt.client_id',$this->session->userdata('client_id'));
		$this->db->where('tt.treatment_date',date('Y-m-d'));
		$this->db->select('tt.client_id,tt.treatment_id,tt.patient_id,tt.treatment_date,tt.treatments,tt.treatment_quantity,tt.treatment_price,tt.treatment_group_id,tt.bill_status,tt.staff_id,tp.first_name,tp.last_name,tp.gender,tp.patient_code,it.item_name,si.staff_id,it.item_id')->from('tbl_patient_treatment_techniques tt');
		$this->db->join("tbl_patient_info tp", "tt.patient_id=tp.patient_id");
		$this->db->join("tbl_item it", "tt.treatments=it.item_id");
		$this->db->join("tbl_staff_info si", "tt.staff_id=si.staff_id");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
			 
		} 
		public function get_list(){
			$this->db->distinct();
			$this->db->where('tp.client_id',$this->session->userdata('client_id'));
			$this->db->where('ta.appointment_from',date('Y-m-d'));
			$this->db->where('ta.status',0);
			$this->db->select('tp.client_id,tp.first_name,tp.patient_code,tp.patient_id,ta.appointment_id,ta.appointment_from,ta.start,ta.patient_id,ta.staff_id,si.staff_id')->from('tbl_appointments ta');
		    $this->db->join("tbl_patient_info tp", "tp.patient_id=ta.patient_id");
			$this->db->join("tbl_staff_info si","ta.staff_id=si.staff_id");
			$query= $this->db->get();
			return ($query->num_rows() > 0) ? $query->result_array() :false;
		}
		public function exercise_details($patient_id){
			$this->db->select('si.chart_name,si.repet,si.hold,si.complete,si.time,ta.ex_date')->from('prescription_detail ta');
			$this->db->join("save_chart si","ta.chart_no = si.chard_no");
			$this->db->where('ta.patient_id',$patient_id);
			$this->db->where('si.client_id',$this->session->userdata('client_id'));
			$this->db->group_by('si.chart_name');
			$query= $this->db->get();
			return ($query->num_rows() > 0) ? $query->result_array() :false;
		}
		public function get_patientdetails() {
			$this->db->where('client_id',$this->session->userdata('client_id'));
			$this->db->where('token !=','');
			$this->db->select('first_name,last_name,patient_id')->from('tbl_patient_info');
			$query= $this->db->get();
			return ($query->num_rows() > 0) ? $query->result_array() :false;
		}
		public function viewex_protocols($patient_id,$from_date='',$to_date='') {
		  if($from_date == '' && $to_date == ''){
				$where = array('patient_id' => $patient_id);
			}else{
				$where = array('patient_id' => $patient_id, 'date >=' => $from_date, 'date <=' => $to_date);
			}
		   
		   $this->db->select('*')->from('tbl_exercise');
		   $this->db->where($where);
		   $res = $this->db->get();
		   return ($res->num_rows() > 0) ? $res->result_array() : false;
		}
		public function edit_exercise_details($ex_id) {
			   $this->db->where('ex_id',$ex_id);
			   $this->db->select('*')->from('tbl_exercise');
			   $res = $this->db->get();
			   return ($res->num_rows() > 0) ? $res->row_array() : false;
		}
		public function edit_exprotocol($patient_id,$id) {
		   $this->db->where('patient_id',$patient_id);
		   $this->db->where('ex_id',$id);
			$this->db->select('*')->from('tbl_exercise');
			$res = $this->db->get();
		   return ($res->num_rows() > 0) ? $res->row_array() : false;
	   }
	   public function add_exercise_protocol() {
		$patient_id = $this->input->post('patient_id');
	    $data = array(
		   'client_id' => $this->session->userdata('client_id'),
		   'patient_id' => $patient_id ,
		   'ex_name' => $this->input->post('ex_name'),
		   'date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('md_date')))),
		   
        );
	   $this->db->insert('tbl_exercise',$data);
	   $id = $this->db->insert_id();
       $count = $this->patient_model->getPatientEPCount($patient_id);
	   $provdiag = $this->edit_exprotocol($patient_id,$id);
			$url=base_url().'client/patient/edit_exercise_protocol/'.$patient_id.'/'.$id;
				$html = '
					  <tr>
					  <td class="actions text-center">'.date('d/m/Y', strtotime($provdiag['date'])).'</td>
					  <td class="actions text-center">'. $provdiag['ex_name'].'</td>
					  <td class="actions text-center"><a class="edit" href="'.$url.'"><button type="submit" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="Deleteexercise_protocol" href="#'.$patient_id.'#'.$id.'"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fa fa-trash-alt"></i>  </button></a></td>
				
					</tr>
				';
			return $html;
   }
   public function getPatientEPCount($patient_id)
	{
		$where = array('patient_id' => $patient_id);
		$this->db->select('count(ex_id) as totalcount')->from('tbl_exercise')->where($where);
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
   
	   public function edit_exercise_protocol($prov) {
		   $data = array(
			   'client_id' => $this->session->userdata('client_id'),
			   'patient_id' => $this->input->post('patient_id'),
			   'ex_name' => $this->input->post('ex_name'),
			   'date' =>  date('Y-m-d',strtotime($this->input->post('remark_date'))),
		   );
		   $this->db->where('ex_id',$prov);
		   $id = $this->db->update('tbl_exercise',$data);
		  return $id;
	   }
	   public function Deleteexercise_protocol($ex_id) {
			   $this->db->where('ex_id',$ex_id);
			   $this->db->delete('tbl_exercise');
			    return $ex_id;
		}
		public function viewfactors($patient_id,$from_date='',$to_date='')
		{
			$this->db->where('patient_id',$patient_id);
			$this->db->where('c_date',date('Y-m-d',strtotime($from_date)));
			$this->db->select('*')->from('tbl_contributefactor');
			$this->db->order_by("c_date", "asc");
			$query=$this->db->get();
			return ($query->num_rows() > 0) ? $query->row_array() : false;
		}
		public function viewex_protocols1($patient_id,$from_date='',$to_date='') {
		   $this->db->where('patient_id',$patient_id);
		   $this->db->where('date',date('Y-m-d',strtotime($from_date)));
		   $this->db->select('*')->from('tbl_exercise');
		   $res = $this->db->get();
		   return ($res->num_rows() > 0) ? $res->row_array() : false;
		}
		public function viewrplan($patient_id,$from_date='',$to_date='')
		{
			if($from_date == '' && $to_date == ''){
				$where = array('patient_id' => $patient_id);
			}else{
				$where = array('patient_id' => $patient_id, 'plan_date' => $from_date);
			}
			$this->db->select('*')->from('tbl_rplan')->where($where);
			$this->db->order_by("plan_date", "asc");
			$query=$this->db->get();
			return ($query->num_rows() > 0) ? $query->result_array() : false;
		}
		public function viewcontribute_factor($patient_id)
		{
				$where = array('patient_id' => $patient_id);
				$this->db->select('*')->from('tbl_contributefactor')->where($where);
				$query = $this->db->get();
				return ($query->num_rows() > 0) ? $query->result_array() : false;
		}
		public function viewrplans($patient_id,$from_date='',$to_date='')
		{
			if($from_date == '' && $to_date == ''){
				$where = array('patient_id' => $patient_id);
			}else{
				$where = array('patient_id' => $patient_id, 'plan_date >=' => $from_date, 'plan_date <=' => $to_date);
			}
			$this->db->select('*')->from('tbl_rplan')->where($where);
			$this->db->order_by("plan_date", "asc");
			$query=$this->db->get();
			return ($query->num_rows() > 0) ? $query->result_array() : false;
		}
		public function getPatientcontributeCount($patient_id)
		{
				$where = array('patient_id' => $patient_id);
				$this->db->select('count(c_id) as totalcount')->from('tbl_contributefactor')->where($where);
				$query = $this->db->get();
				if($query->num_rows()>0)
				return ($query->num_rows()>0) ? $query->row()->totalcount : false;
		}
		public function contribute_info($patient_id) {
			$data= array(
				'c_date'=> date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('cd_date')))),
				'factors1' =>$this->input->post('factors1'),
				'factors2' =>$this->input->post('factors2'),
				'factors3' =>$this->input->post('factors3'),
				'patient_id'=>$patient_id
			);
			$this->db->insert('tbl_contributefactor',$data);
			$id = $this->db->insert_id();
			$visit_date = date('Y-m-d');
				$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
				if($visit_date_value == false){
					$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
					$this->db->insert('tbl_patient_visits', $visit_info);
				}
			$count = $this->patient_model->getPatientcontributeCount($patient_id);
			$medicals = $this->editcontribute($patient_id,$id);
			$url=base_url().'client/patient/edit_contribute/'.$patient_id.'/'.$id;
				$html = '
				<tr>
					 <td class="actions text-center">'.date('d/m/Y', strtotime($medicals['c_date'])).'</td>
					  <td class="actions text-center">'. $medicals['factors1'].'</td>
					  <td class="actions text-center"><a class="edit" href="'.$url.'"><button type="submit" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="DeleteTreatment_medical" href="#'.$patient_id.'#'.$id.'"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fa fa-trash-alt"></i>  </button></a></td>
				</tr>
					  
				';
			return $html;
		}
		public function edit_contributeinfo($patient_id,$contribute_id) {
			$data= array(
				'c_date'=> date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('c_date')))),
				'factors1' =>$this->input->post('factors1'),
				'factors2' =>$this->input->post('factors2'),
				'factors3' =>$this->input->post('factors3'),
			);
			$this->db->where('c_id',$contribute_id);
			$this->db->where('patient_id',$patient_id);
			$this->db->update('tbl_contributefactor',$data);
			$visit_date = date('Y-m-d');
				$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
				if($visit_date_value == false){
					$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
					$this->db->insert('tbl_patient_visits', $visit_info);
				}
			return $id;
		}
		function editcontribute($patient_id,$c_id){
				$this->db->where('patient_id',$patient_id);
				$this->db->where('c_id',$c_id);
				$this->db->select('*')->from('tbl_contributefactor');
				$query = $this->db->get();
				return ($query->num_rows() > 0) ? $query->row_array() : false;
		}
		function assessment_contribute_delete($patient_id,$c_id){
				$where = array('patient_id' => $patient_id,'c_id' => $c_id);
				$this->db->where($where);
				$this->db->delete('tbl_contributefactor');
				return $c_id;
		}
		public function getPatientrplanCount($patient_id)
		{
			$where = array('patient_id' => $patient_id);
			$this->db->select('count(rplan_id) as totalcount')->from('tbl_rplan')->where($where);
			$query = $this->db->get();
			if($query->num_rows()>0)
			return ($query->num_rows()>0) ? $query->row()->totalcount : false;
		}
		public function addr_plan($patient_id) {
		
			$casenotes_info = array(
				'client_id' => $this->session->userdata('client_id'),
				'patient_id' => $patient_id,
				'plan_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('rplan_date')))),
				'description' => $this->input->post('description'),
				'created_by' => $this->session->userdata('username'),
				'created_date' => date('Y-m-d H:i:s'),
				'modify_by' => $this->session->userdata('username'),
				'modify_date' => date('Y-m-d H:i:s'),
			);
					
			$this->db->insert('tbl_rplan', $casenotes_info);
			$data['patient_id']=$patient_id;
			$rplan_id=$this->db->insert_id();
			$visit_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('cn_date'))));
			$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
			if($visit_date_value == false){
				$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
				$this->db->insert('tbl_patient_visits', $visit_info);
			}
			$count = $this->getPatientrplanCount($patient_id);
			$plans = $this->editrplan($patient_id,$rplan_id);
				$enteredBy = $plans['modify_by'];
					$profileInfo = $this->registration_model->getProfileInfo($enteredBy);
					$staffInfo = $this->staff_model->getStaffInfo($enteredBy);
					
					if($profileInfo != false)
						$clientName = $profileInfo['first_name'];
					else if($staffInfo != false)
						$clientName = $staffInfo['first_name'].' '.$staffInfo['last_name'];
					 
				$url=base_url().'client/patient/edit_rplan/'.$patient_id.'/'.$rplan_id;
				$url1=base_url().'client/renewal/re_plan/'.$patient_id.'/'.$plans['plan_date'];
					$html = '
					<tr>
						 <td class="actions text-center">'.date('d/m/Y', strtotime($plans['plan_date'])).'</td>
						  <td class="actions text-center">'. $plans['description'].'</td>
						  <td class="actions text-center"><a class="edit" href="'.$url.'"><button type="submit" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a><a class="DeletePlan" href="#'.$patient_id.'#'.$rplan_id.'"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fa fa-trash-alt"></i>  </button></a><a target="_blank" href="'.$url1.'" class="btn btn-success btn-sm" style="color:white;"><i class="fa fa-print"></i>&nbsp;&nbsp;RCP Print </a></td>
					</tr>
						  
					';
				return $html;
			
		}
		public function editr_plan($patient_id,$plan_id) {
		
			$casenotes_info = array(
				'client_id' => $this->session->userdata('client_id'),
				'patient_id' => $patient_id,
				'plan_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('plan_date')))),
				'description' => $this->input->post('description'),
				'created_by' => $this->session->userdata('username'),
				'created_date' => date('Y-m-d H:i:s'),
				'modify_by' => $this->session->userdata('username'),
				'modify_date' => date('Y-m-d H:i:s'),
			);
					
			$where = array('patient_id' => $patient_id, 'rplan_id' => $plan_id);
			$this->db->where($where);
			$this->db->update('tbl_rplan',$casenotes_info);
			$data['patient_id']=$patient_id;
			$data['plan_id']=$plan_id;
			$visit_date = date('Y-m-d',strtotime($this->input->post('plan_date')));
			$visit_date_value = $this->common_model->alreadyExistsVisitdate($patient_id,$visit_date);
			if($visit_date_value == false){
				$visit_info = array('patient_id' => $patient_id, 'client_id' => $this->session->userdata('client_id'),'visit_date' => $visit_date);
				$this->db->insert('tbl_patient_visits', $visit_info);
			}
			return $data;
		}
		public function editrplan($patient_id,$plan_id)
		{
			$where = array('patient_id' => $patient_id, 'rplan_id' => $plan_id);
			$this->db->select('*')->from('tbl_rplan')->where($where);
			$query=$this->db->get();
			return ($query->num_rows() > 0) ? $query->row_array() : false;
		}
		function delete_rplan($patient_id,$rplan_id){
			$where = array('patient_id' => $patient_id,'rplan_id' => $rplan_id);
			$this->db->where($where);
			$this->db->delete('tbl_rplan');
			return  $rplan_id;
		}
		public function otherupdate($patient_id)
	   {
	
	 $data=array(
	    'dominance' => $this->input->post('dominance'),
	    'consan_marriage' => $this->input->post('consan_marriage'),
	    'food_habits' => $this->input->post('food_habits'),
        'contact_person_name' => $this->input->post('contact_person_name'),
	    'contact_person_mobile' => $this->input->post('contact_person_mobile'),
	);
	$this->db->where('patient_id',$patient_id);
	$this->db->update('tbl_patient_info',$data);
	return true;
	
	}
	public function getreportprint_details($client_id) {
		$this->db->where('client_id',$client_id);
		$this->db->select('*')->from('tbl_reports');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function cancel_apt(){
		$this->db->where('appointment_id',$this->uri->segment(4));
		$this->db->set('status','1');
		$this->db->set('cancel_date',date('Y-m-d'));
		$this->db->update('tbl_appointments');
		return $this->uri->segment(4);    
	}
	
	public function consent_delete($consent_id){
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$where = array('consent_id' => $consent_id);
		
		$this->db->select('*')->from('tbl_consent_sign')->where($where);
		$query = $this->db->get();
		$img_name = $query->row()->img_name;
		$img_name1 = $query->row()->img_name1;
		
		 $val = explode('/',$img_name);
		 $val1 = explode('/',$img_name1);
		 unlink("sign/".$val[1]);
		 unlink("sign/".$val1[1]);
		 
		
		$this->db->where($where);
		$this->db->delete('tbl_consent_sign');
		return $consent_id;
	}
	public function get_tot_list(){
		$this->db->distinct();
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('appoint_date',date('Y-m-d'));
		$this->db->where('home_visit',1);
		$this->db->select('patient_id,first_name,mobile_no,patient_code,last_name,email,address_line1')->from('tbl_patient_info');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function get_tot_home_list(){
		$this->db->distinct();
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('appoint_date',date('Y-m-d'));
		$this->db->where('home_visit',2);
		$this->db->select('patient_id,first_name,mobile_no,patient_code,last_name,email,address_line1')->from('tbl_patient_info');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function get_rcount() {
		$this->db->select('*');
		$this->db->from("tbl_session_det si");
		$this->db->join('tbl_patient_treatment_techniques pi','pi.patient_id = si.patient_id');
		$this->db->where('si.client_id',$this->session->userdata('client_id'));
		$this->db->where('si.sn_date',date('Y-m-d'));
		$this->db->where('pi.treatment_date',date('Y-m-d'));
		$this->db->group_by('si.patient_id');  
		$query = $this->db->get();
		return $query->num_rows();
	
	}
	public function get_tot_count(){
		$this->db->distinct();
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('appoint_date',date('Y-m-d'));
		$this->db->select('count(patient_id) as totalcount')->from('tbl_patient_info');
		$this->db->group_by('patient_id');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	
	public function get_tot_sess_count(){
		$this->db->select('*');
		$this->db->from("tbl_session_det");
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('sn_date',date('Y-m-d'));
		$this->db->group_by('patient_id');
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function send_otp($patient_id,$otp,$appoint_id) {  
		// join query to get all details for notification
		$this->db->select('pi.first_name,pi.last_name,pi.gender,pi.email,pi.age,pi.mobile_no')->from('tbl_patient_info pi');
		$where = array('pi.patient_id' => $patient_id);
		$this->db->where($where);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$data = $query->row();
			$first_name = ($data->first_name != '') ? $data->first_name : '';
			$last_name = ($data->last_name != '') ? $data->last_name : '';
			$email = ($data->email != '') ? $data->email : '';
			$gender=ucfirst(substr($data->gender,0,1));
			$age = ($data->age != '') ? $data->age : '';
			//$referal_name = ($data->referal_name != '') ? $data->referal_name : '';
			$mobile_no = ($data->mobile_no != '') ? $data->mobile_no : '';
			
			$profile_info = $this->registration_model->editProfile($this->session->userdata('client_id'));
			$sms_count = $profile_info['sms_count'];
			$clinic_name = $profile_info['clinic_name'];
			$dr_name = $profile_info['first_name']; 
			$country = $profile_info['country'];
			if($data->gender == 'male'){
				$title = 'Mr.';
			}else{
				$title = 'Ms.';
			}
			if($mobile_no != '') {    
						$message_doctor = 'Hi '.$title.ucfirst($first_name).', We made your medical session ready!! Please join now.. '." ".base_url().'pages/otp_verification/'.$appoint_id." ". 'Your OTP :'.$otp ;
						$smsUrl = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=FISIYO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$mobile_no.'&duplicateCheck=true&format=json&msg='.urlencode($message_doctor);
						$sms['patient'] = 'Done';
						$sms_count+=1;
						$churl = @fopen($smsUrl,'r');
						fclose($churl); 
						$length = strlen($message_doctor);
						$cost = ceil($length/160);
						if(!$churl){ }else{
							$this->db->query('update tbl_client set sms_count = sms_count + '.$cost.' where status = 1 and client_id ='.$this->session->userdata('client_id'));
						}  
			}
					
			
		    $this->db->select('*')->from('tbl_client')->where('client_id',$this->session->userdata('client_id'));
	        $res = $this->db->get();
	        $clinic_name = $res->row()->clinic_name; 
			$link = base_url().'pages/otp_verification/'.$appoint_id;
			$temp ='<body class="body" style="padding:0 !important; margin:0 auto !important; display:block !important; min-width:100% !important; width:100% !important; background:#f4ecfa; -webkit-text-size-adjust:none;">
	<center>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin: 0; padding: 0; width: 100%; height: 100%;" bgcolor="#f4ecfa" class="gwfw">
			<tr>
				<td style="margin: 0; padding: 0; width: 100%; height: 100%;" align="center" valign="top">
					<table width="600" border="0" cellspacing="0" cellpadding="0" class="m-shell">
						<tr>
							<td class="td" style="width:600px; min-width:600px; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td class="mpx-10">
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
												 
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td class="text-12 c-grey l-grey a-right py-20" style="font-size:12px; line-height:16px; font-family:Arial, sans-serif; min-width:auto !important; color:#6e6e6e; text-align:right; padding-top: 20px; padding-bottom: 20px;">
															<a href="#" target="_blank" class="link c-grey" style="text-decoration:none; color:#6e6e6e;"><span class="link c-grey" style="text-decoration:none; color:#6e6e6e;"> </span></a>
														</td>
													</tr>
												</table>												 

												  
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td class="gradient pt-10" style="border-radius: 10px 10px 0 0; padding-top: 10px;" bgcolor="#f3189e">
															<table width="100%" border="0" cellspacing="0" cellpadding="0">
																<tr>
																	<td style="border-radius: 10px 10px 0 0;" bgcolor="#ffffff">
																		 
																		<table width="100%" border="0" cellspacing="0" cellpadding="0">
																			<tr>
																				<td class="img-center p-30 px-15" style="font-size:0pt; line-height:0pt; text-align:center; padding: 30px; padding-left: 15px; padding-right: 15px;">
																					<a href="#" target="_blank"><img src="https://physioplustech.in/frontend_assets/img/New%20Purple%20243x68px%20beta.png" border="0" alt="" /></a>
																				</td>
																			</tr>
																		</table>
																		 
																		<table width="100%" border="0" cellspacing="0" cellpadding="0">
																			<tr>
																				<td class="px-50 mpx-15" style="padding-left: 50px; padding-right: 50px;">
																					 
																					<table width="100%" border="0" cellspacing="0" cellpadding="0">
																						<tr>
																							<td class="pb-50" style="padding-bottom: 50px;">
																								<table width="100%" border="0" cellspacing="0" cellpadding="0">
																									 
																									<tr>
																										<td class="title-36 a-center pb-15" style="font-size:36px; line-height:40px; color:#282828; font-family:Arial, sans-serif; min-width:auto !important; text-align:center; padding-bottom: 15px;">
																											<strong>Appointment Invitation</strong>
																										</td>
																									</tr>
																									<tr>
																										<td class="text-16 lh-26 a-center pb-25" style="font-size:16px; color:#6e6e6e; font-family:Arial, sans-serif; min-width:auto !important; line-height: 26px; text-align:center; padding-bottom: 25px;">
																											"Hi "'.$first_name.'", We made your Telehealth session with '.$dr_name.' from the '.$clinic_name.' Please join now
																										</td>
																									</tr>
																									<tr>
																										<td class="pb-30" style="padding-bottom: 30px;">
																											<table width="100%" border="0" cellspacing="0" cellpadding="0">
																												<tr>
																													<td class="title-22 a-center py-20 px-50 mpx-15" style="border-radius: 10px; border: 1px dashed #b4b4d4; font-size:22px; line-height:26px; color:#282828; font-family:Arial, sans-serif; min-width:auto !important; text-align:center; padding-top: 20px; padding-bottom: 20px; padding-left: 50px; padding-right: 50px;" bgcolor="#f4ecfa">
																														<strong>Your OTP : <span class="c-purple" style="color:#9128df;">'.$otp.'</span></strong>
																													</td>
																												</tr>
																											</table>
																										</td>
																									</tr>
																									<tr>
																										<td align="center" class="pb-15" style="padding-bottom: 15px;">
																										 
																											<table border="0" cellspacing="0" cellpadding="0" style="min-width: 200px;">
																												<tr>
																													<td class="btn-16 c-white l-white" bgcolor="#f3189e" style="font-size:16px; line-height:20px; mso-padding-alt:15px 35px; font-family:Arial, sans-serif; text-align:center; font-weight:bold; text-transform:uppercase; border-radius:25px; min-width:auto !important; color:#ffffff;">
																														<a href="'.$link.'" target="_blank" class="link c-white" style="display: block; padding: 15px 35px; text-decoration:none; color:#ffffff;">
																															<span class="link c-white" style="text-decoration:none; color:#ffffff;">Verification Link</span>
																														</a>
																													</td>
																												</tr>
																											</table>
																											 
																										</td>
																									</tr>
																									 
																								</table>
																							</td>
																						</tr>
																					</table>
																					 
																				</td>
																			</tr>
																		</table>
																		 
																	</td>
																</tr>
															</table>
														</td>
													</tr>
												</table>
												 
												 
												 
												 											 
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</center>
</body>';
		    $Message = "Hi ".$first_name.", We made your medical session ready!! Please join now. Your OTP: ".$otp." ".base_url().'pages/otp_verification/'.$appoint_id;    
		    $adminMailConfig = array('to' => $email, 'subject' => ''.$clinic_name.'(Online appointment-OTP)', 'message' => $temp);
		    $this->mail_model->sendPatientMail($adminMailConfig);
			return $first_name;

		}
	}
}  