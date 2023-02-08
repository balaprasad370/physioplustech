<?php 
/** File name   : dashboard.php
*	Author      : Muthukumar
*	Date        : 27th Mar 2013
*	Description : Controller for physioplus client dashboard.
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		// load required models
		//$this->load->model(array('advance_model','common_model'));
	}
	
	// redirect index method to home
	public function index() {
		
		echo 'aasasas';
			
	}
	
	
	public function sendsms() {
		//$clientIds = array('16','103');
		$this->db->distinct();
		$where = array('daily_sms_notify' => 1, 'status' => 1);
		$this->db->select('client_id,clinic_name,branch_name,mobile,sms_count,total_sms_limit')->from('tbl_client')->where($where);
		//$this->db->where_in('client_id', $clientIds);
		$clientQuery = $this->db->get();
		$clientData = ($clientQuery->num_rows() > 0) ? $clientQuery->result_array() : false;
		if($clientData != false){
			foreach($clientData as $clientDatas) {
				$curDate = date('Y-m-d');
				$where = array('AT.client_id' => $clientDatas['client_id'], 'DATE_FORMAT(AT.start,"%Y-%m-%d")' => $curDate);
				$this->db->distinct();
				$this->db->select('AT.start as Time,ST.first_name as DoctorName,PT.first_name as PatientName')->from('tbl_appointments AT')->where($where)->order_by('AT.appointment_id');
				$this->db->join('tbl_staff_info ST', 'AT.staff_id = ST.staff_id');
				$this->db->join('tbl_patient_info PT', 'AT.patient_id = PT.patient_id');
				$this->db->where($where);
				$appQuery = $this->db->get();
				$appData = ($appQuery->num_rows() > 0) ? $appQuery->result_array() : false;
				$count = 0;
				if($appData != false){
					$smsArr = array();
					foreach($appData as $appDatas) {
						$time = date('h:i A', strtotime($appDatas['Time']));
						$doctorName1 = ucfirst($appDatas['DoctorName']);
						$doctorName = str_replace("Dr.","",$doctorName1);
						$patientName = ucfirst($appDatas['PatientName']);
						array_push($smsArr, $time.' - '.$patientName.' (Dr.'.$doctorName.')');
						$count++;
					}
					$smsString = implode(",",$smsArr);
				}
				if($clientDatas['sms_count'] < $clientDatas['total_sms_limit'] || $clientDatas['client_id'] == '1636' || $clientDatas['client_id'] == '1809'){
					if($clientDatas['mobile'] != ''){
						if($count > 0){
							$message_doctor = 'You have '.$count.' appointments at '.ucfirst($clientDatas['clinic_name']).' : '.$smsString.' - Physio Plus Tech';
							$length = strlen($message_doctor);
							if($clientDatas['client_id'] == '1636'){
								$doctorSmsURL = 'http://smsindia.techmartonline.com/api/sendhttp.php?authkey=136791ASgfUVtgugG15874a756&mobiles='.$clientDatas['mobile'].'&message='.urlencode($message_doctor).'&sender=PHPLUS&route=4&country=0';
							    $doctor_churl = @fopen($doctorSmsURL,'r');
							    fclose($doctor_churl);
								$cost = ceil($length/160);
								if(!$doctor_churl){ }else{
									$this->db->query('update tbl_client set sms_count = sms_count + '.$cost.' where status = 1 and 	daily_sms_notify = 1 and client_id ='.$clientDatas['client_id']);
								}
							} else if($clientDatas['client_id'] == '1809'){
							$doctorSmsURL = 'http://smsserver9.creativepoint.in/api.php?username=mobiphysio&password=935251&to='.$clientDatas['mobile'].'&from=PHYSIO&message='.urlencode($message_doctor);
							$doctor_churl = @fopen($doctorSmsURL,'r');
							fclose($doctor_churl);
							$cost = ceil($length/160);
							if(!$doctor_churl){ }else{
								$this->db->query('update tbl_client set sms_count = sms_count + '.$cost.' where status = 1 and 	daily_sms_notify = 1 and client_id ='.$clientDatas['client_id']);
							}
							} else {
								if($clientDatas['client_id'] == '1948') {
									$clinic_name1 = 'SUNSHINE SUPER SPECIALITY PHYSIOTHERAPY CLINIC';
									$message_doctor1 = 'You have '.$count.' appointments at '.ucfirst($clinic_name1).' : '.$smsString.' - Physio Plus Tech';
									$doctorSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smspwd@2016&senderId=PHYSIO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$clientDatas['mobile'].'&duplicateCheck=true&format=json&msg='.urlencode($message_doctor1);
									$doctor_churl = @fopen($doctorSmsURL,'r');
									fclose($doctor_churl);
									$cost = ceil($length/160);
									if(!$doctor_churl){ }else{
										$this->db->query('update tbl_client set sms_count = sms_count + '.$cost.' where status = 1 and 	daily_sms_notify = 1 and client_id ='.$clientDatas['client_id']);
									}
								} else {
									$doctorSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smspwd@2016&senderId=PHYSIO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$clientDatas['mobile'].'&duplicateCheck=true&format=json&msg='.urlencode($message_doctor);
									$doctor_churl = @fopen($doctorSmsURL,'r');
									fclose($doctor_churl);
									$cost = ceil($length/160);
									if(!$doctor_churl){ }else{
										$this->db->query('update tbl_client set sms_count = sms_count + '.$cost.' where status = 1 and 	daily_sms_notify = 1 and client_id ='.$clientDatas['client_id']);
									}
								}
							}
						} else {
							$no_patient_message = 'Today you have no advance appointments with your patients - Physio Plus Tech';
							$length = strlen($no_patient_message);
							if($clientDatas['client_id'] != '1636' && $clientDatas['client_id'] != '1809'){
							$doctorSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smspwd@2016&senderId=PHYSIO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$clientDatas['mobile'].'&duplicateCheck=true&format=json&msg='.urlencode($no_patient_message);
							$doctor_churl = @fopen($doctorSmsURL,'r');
							fclose($doctor_churl);
							$cost = ceil($length/160);
							if(!$doctor_churl){ }else{
								$this->db->query('update tbl_client set sms_count = sms_count + '.$cost.' where status = 1 and 	daily_sms_notify = 1 and client_id ='.$clientDatas['client_id']);
							}
							} else if($clientDatas['client_id'] == '1809'){
							$doctorSmsURL = 'http://smsserver9.creativepoint.in/api.php?username=mobiphysio&password=935251&to='.$clientDatas['mobile'].'&from=PHYSIO&message='.urlencode($no_patient_message);
							$doctor_churl = @fopen($doctorSmsURL,'r');
							fclose($doctor_churl);
							$cost = ceil($length/160);
							if(!$doctor_churl){ }else{
								$this->db->query('update tbl_client set sms_count = sms_count + '.$cost.' where status = 1 and 	daily_sms_notify = 1 and client_id ='.$clientDatas['client_id']);
							}
							} else if($clientDatas['client_id'] == '1636'){
								$doctorSmsURL = 'http://smsindia.techmartonline.com/api/sendhttp.php?authkey=136791ASgfUVtgugG15874a756&mobiles='.$clientDatas['mobile'].'&message='.urlencode($no_patient_message).'&sender=PHPLUS&route=4&country=0';
							    $doctor_churl = @fopen($doctorSmsURL,'r');
							    fclose($doctor_churl);
								$cost = ceil($length/160);
								if(!$doctor_churl){ }else{
									$this->db->query('update tbl_client set sms_count = sms_count + '.$cost.' where status = 1 and 	daily_sms_notify = 1 and client_id ='.$clientDatas['client_id']);
								}
							} else {
							}
						} 
					}
				}
			}
		}
	}
	
	
	// sms send to patient daily
	public function sendsmspatient() {
		$curDate = date('Y-m-d');
		$where = array('AT.notify_sms' => 2, 'DATE_FORMAT(AT.start,"%Y-%m-%d")' => $curDate);
		$this->db->distinct();
		$this->db->select('AT.client_id as Clientid,AT.start as Time,ST.first_name as DoctorName,PT.first_name as PatientName,CT.clinic_name as ClinicName,PT.mobile_no as Mobile,CT.sms_count as smscount,CT.total_sms_limit as smslimit')->from('tbl_appointments AT');
		$this->db->join('tbl_staff_info ST', 'AT.staff_id = ST.staff_id');
		$this->db->join('tbl_patient_info PT', 'AT.patient_id = PT.patient_id');
		$this->db->join('tbl_client CT', 'AT.client_id = CT.client_id');
		$this->db->where($where);
		$appQuery = $this->db->get();
		$appData = ($appQuery->num_rows() > 0) ? $appQuery->result_array() : false;
		if($appData != false){
			foreach($appData as $appDatas) {
				$time = date('h:i A', strtotime($appDatas['Time']));
				$doctorName1 = ucfirst($appDatas['DoctorName']);
				$doctorName = str_replace("Dr.","",$doctorName1);
				$patientName = ucfirst($appDatas['PatientName']);
				$clinic_name = ucfirst($appDatas['ClinicName']);
				$Mobile = ucfirst($appDatas['Mobile']);
				$client_id = ucfirst($appDatas['Clientid']);
				$smscount = ucfirst($appDatas['smscount']);
				$smslimit = ucfirst($appDatas['smslimit']);
										
				if($smscount < $smslimit || $client_id == '1636' || $client_id == '1809' ){ 
					if($Mobile != ''){
						$message_doctor = 'Hi '.$patientName.'Today you have appointment on '.$time.' at '.$clinic_name.'('.$Mobile.')  - Physio Plus Tech';
						$length = strlen($message_doctor);
						if($client_id == '1636'){
							$doctorSmsURL = 'http://smsindia.techmartonline.com/api/sendhttp.php?authkey=136791ASgfUVtgugG15874a756&mobiles='.$Mobile.'&message='.urlencode($message_doctor).'&sender=PHPLUS&route=4&country=0';
						    $doctor_churl = @fopen($doctorSmsURL,'r');
						    fclose($doctor_churl);
							$cost = ceil($length/160); 
							if(!$doctor_churl){ } else {
								$this->db->query('update tbl_client set sms_count = sms_count + '.$cost.' where status = 1 and client_id ='. $client_id);
							}
						} else if($client_id == '1809'){
						$doctorSmsURL = 'http://smsserver9.creativepoint.in/api.php?username=mobiphysio&password=935251&to='.$Mobile.'&from=PHYSIO&message='.urlencode($message_doctor);
						$doctor_churl = @fopen($doctorSmsURL,'r');
						fclose($doctor_churl);   
						$cost = ceil($length/160); 
						if(!$doctor_churl){ } else {
							$this->db->query('update tbl_client set sms_count = sms_count + '.$cost.' where status = 1 and client_id ='. $client_id);
						}
						} else {
							if($client_id == '1948') {
								$clinic_name1 = 'SUNSHINE SUPER SPECIALITY PHYSIOTHERAPY CLINIC';
								$message_doctor1 = 'Hi '.$patientName.'Today you have appointment on '.$time.' at '.$clinic_name1.'('.$Mobile.')  - Physio Plus Tech';
								$doctorSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smspwd@2016&senderId=PHYSIO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$Mobile.'&duplicateCheck=true&format=json&msg='.urlencode($message_doctor1);
								$doctor_churl = @fopen($doctorSmsURL,'r');
								fclose($doctor_churl);   
								$cost = ceil($length/160); 
								if(!$doctor_churl){ } else {
									$this->db->query('update tbl_client set sms_count = sms_count + '.$cost.' where status = 1 and client_id ='. $client_id);
								}
							} else {
								$doctorSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smspwd@2016&senderId=PHYSIO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$Mobile.'&duplicateCheck=true&format=json&msg='.urlencode($message_doctor);
								$doctor_churl = @fopen($doctorSmsURL,'r');
								fclose($doctor_churl);   
								$cost = ceil($length/160); 
								if(!$doctor_churl){ } else {
									$this->db->query('update tbl_client set sms_count = sms_count + '.$cost.' where status = 1 and client_id ='. $client_id);
								}
							}
						}
					}
				}
			}
		}
	}
	
	
	public function updatefees() {
	
		           $this->db->query('update tbl_protocol_advance t1, tbl_protocol t2 set 
					    t1.bal_advance = (t1.bal_advance - (select sum((t2.advance + t2.tax)- t2.discount) from tbl_protocol t2 where t2.bill_status=1 and t1.protocal_id = t2.protocal_id )),
						t1.paid_advc = (t1.paid_advc  + (select sum((t2.advance+ t2.tax)-t2.discount) from tbl_protocol t2 where t2.bill_status=1 and t1.protocal_id = t2.protocal_id))
						where t1.date_discharge >= CURDATE()  and t1.bal_advance >= (select sum((t2.advance + t2.tax)-t2.discount) from tbl_protocol t2 where t2.bill_status=1 and t1.protocal_id = t2.protocal_id )');
				
				
		            $this->db->query('update tbl_protocol_advance t1, tbl_protocol t2
					set t1.pending_amount = (t1.pending_amount + (select sum((t2.advance + t2.tax)-t2.discount) from tbl_protocol t2 where t2.bill_status=1 and t1.protocal_id = t2.protocal_id ))
					where t1.date_discharge >= CURDATE()  and t1.bal_advance < (select sum((t2.advance+t2.tax)-t2.discount) from tbl_protocol t2 where t2.bill_status=1 and t1.protocal_id = t2.protocal_id )');
		            return true;
	}
	
	public function updatefees1() {
	
				
		$this->db->query('update tbl_protocol_advance t1, tbl_protocol t2 set 
					t1.bal_advance = (t1.bal_advance - (select sum((t2.advance + t2.tax)- t2.discount) from tbl_protocol t2 where t2.bill_status=2 and t1.protocal_id = t2.protocal_id and (SELECT MOD((DATEDIFF(CURDATE(),t2.date_admit)+1 ),7 )  FROM dual ) = 0 )),
					t1.paid_advc = (t1.paid_advc  + (select sum((t2.advance+ t2.tax)-t2.discount) from tbl_protocol t2 where t2.bill_status=2 and t1.protocal_id = t2.protocal_id and (SELECT MOD((DATEDIFF(CURDATE(),t2.date_admit)+1 ),7 )  FROM dual) = 0))
					where t1.date_discharge >= CURDATE()  and t1.bal_advance >= (select sum((t2.advance + t2.tax)-t2.discount) from tbl_protocol t2 where t2.bill_status=2 and t1.protocal_id = t2.protocal_id)');
				
				
		$this->db->query('update tbl_protocol_advance t1, tbl_protocol t2 set 
					t1.pending_amount = (t1.pending_amount + (select sum((t2.advance + t2.tax)-t2.discount) from tbl_protocol t2 where t2.bill_status=2 and t1.protocal_id = t2.protocal_id and (SELECT MOD((DATEDIFF(CURDATE(),t2.date_admit)+1 ),7 )  FROM dual) = 0 ))
					where t1.date_discharge >= CURDATE()  and t1.bal_advance < (select sum((t2.advance+t2.tax)-t2.discount) from tbl_protocol t2 where t2.bill_status=2 and t1.protocal_id = t2.protocal_id )');
		
		return true;
	}
	
	public function updatefees2() {				
		$this->db->query('update tbl_protocol_advance t1, tbl_protocol t2 set 
					t1.bal_advance = (t1.bal_advance - (select sum((t2.advance + t2.tax)- t2.discount) from tbl_protocol t2 where t2.bill_status=3 and t1.protocal_id = t2.protocal_id and (SELECT MOD((DATEDIFF(CURDATE(),t2.date_admit)+1 ),31 )  FROM dual ) = 0 )),
					t1.paid_advc = (t1.paid_advc  + (select sum((t2.advance+ t2.tax)-t2.discount) from tbl_protocol t2 where t2.bill_status=3 and t1.protocal_id = t2.protocal_id and (SELECT MOD((DATEDIFF(CURDATE(),t2.date_admit)+1 ),31 )  FROM dual) = 0))
					where t1.date_discharge >= CURDATE()  and t1.bal_advance >= (select sum((t2.advance + t2.tax)-t2.discount) from tbl_protocol t2 where t2.bill_status=3 and t1.protocal_id = t2.protocal_id)');
				
				
		$this->db->query('update tbl_protocol_advance t1, tbl_protocol t2 set 
					t1.pending_amount = (t1.pending_amount + (select sum((t2.advance + t2.tax)-t2.discount) from tbl_protocol t2 where t2.bill_status=3 and t1.protocal_id = t2.protocal_id and (SELECT MOD((DATEDIFF(CURDATE(),t2.date_admit)+1 ),31 )  FROM dual) = 0 ))
					where t1.date_discharge >= CURDATE()  and t1.bal_advance < (select sum((t2.advance+t2.tax)-t2.discount) from tbl_protocol t2 where t2.bill_status=31 and t1.protocal_id = t2.protocal_id )');
		
		return true;
	}
	
	public function decrement()
	{
		$this->db->query('update tbl_validity set duration = duration - 1 where duration > 0 and plan_type != 5');
	}
	
	public function changefreeversion()
	{
        /* $this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->set('plan', $this->session->userdata('plan'));
		$this->db->update('tbl_client_history');
	 */
		$this->db->query('update tbl_validity t1, tbl_client t2 set t2.plan = 0 where t1.duration = 0 and t1.client_id = t2.client_id');
		return true;
	}
	

	/* public function delivery_report()
	{
		$today = date('Y-m-d');
		$url="http://www.smsgatewaycenter.com/library/deliveryreport.php?UserName=klakshman&Password=Smspwd@2016&DateFrom=".$today."&DateTo=".$today;
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);				
		$html1 = curl_exec($curl);
		curl_close ($curl);
		$exe = explode('<br>',$html1);
		for($i=1;$i<count($exe);$i++){
			$res = explode(',',$exe[$i]);
			if(count($res) >= 5 ){
				$data =array(
					'mobile' => $res[0],
					'Sendername' => $res[1],
					'Date' => $res[2],
					'Status' => $res[3],
					'Message' => $res[5],
					'generated_date' => date('Y-m-d'),
				 );
				$this->db->insert('delivery_reports',$data);
			} else {
				
			}
		}
		return true;
	} */  
	public function sendsms1() {
		$this->db->distinct();
		$where = array('sms_notify' => 1, 'status' => 1);
		$this->db->select('client_id,clinic_name,branch_name,mobile,sms_count,total_sms_limit')->from('tbl_client')->where($where);
		$clientQuery = $this->db->get();
		$clientData = ($clientQuery->num_rows() > 0) ? $clientQuery->result_array() : false;
		if($clientData != false){
			foreach($clientData as $clientDatas) {
				$curDate = date('Y-m-d');
				$where = array('AT.client_id' => $clientDatas['client_id'], 'DATE_FORMAT(AT.start,"%Y-%m-%d")' => $curDate);
				$this->db->distinct();
				$this->db->select('AT.start as Time,ST.first_name as DoctorName,PT.first_name as PatientName,PT.mobile_no')->from('tbl_appointments AT')->where($where)->order_by('AT.appointment_id');
				$this->db->join('tbl_staff_info ST', 'AT.staff_id = ST.staff_id');
				$this->db->join('tbl_patient_info PT', 'AT.patient_id = PT.patient_id');
				$this->db->where($where);
				$appQuery = $this->db->get();
				$appData = ($appQuery->num_rows() > 0) ? $appQuery->result_array() : false;
				$count = 0;
				if($appData != false){
					$smsArr = array();
					foreach($appData as $appDatas) {
						$time = date('h:i A', strtotime($appDatas['Time']));
						$doctorName1 = ucfirst($appDatas['DoctorName']);
						$doctorName = str_replace("Dr.","",$doctorName1);
						$patientName = ucfirst($appDatas['PatientName']);
						$patient_mob = ucfirst($appDatas['mobile_no']);
						array_push($smsArr,$time.'-'.$patientName.'/'.$patient_mob);
						
					}
					$smsString = implode(",",$smsArr);
				}
			if($clientDatas['sms_count'] < $clientDatas['total_sms_limit'] || $clientDatas['client_id'] == '1636' || $clientDatas['client_id'] == '1809' ){
					$var = explode(',',$smsString);
					for($i = 0; $i < count($var);$i++){
						$mobile = explode('/',$var[$i]);
						if($mobile[1] != false){
							$name = explode('-',$mobile[0]);
							$message_doctor = 'Dear '.ucfirst($name[1]).', We are pleased to confirm your appointment at '.ucfirst($clientDatas['clinic_name']).' on '.$name[0].' For details ' . ucfirst($clientDatas['mobile']);
							$length = strlen($message_doctor);
							if($clientDatas['client_id'] != '1948' || $clientDatas['client_id'] != '1636' && $clientDatas['client_id'] != '1809'){
								$doctorSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smspwd@2016&senderId=PHYSIO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$mobile[1].'&duplicateCheck=true&format=json&msg='.urlencode($message_doctor);
								$doctor_churl = @fopen($doctorSmsURL,'r');
								fclose($doctor_churl);
								$cost = ceil($length/160);
								if(!$doctor_churl){ }else{
									$this->db->query('update tbl_client set sms_count = sms_count + '.$cost.' where status = 1 and 	daily_sms_notify = 1 and client_id ='.$clientDatas['client_id']);
								}
							} else if($clientDatas['client_id'] == '1948'){
								$clinic_name1 = 'SUNSHINE SUPER SPECIALITY PHYSIOTHERAPY CLINIC';
								$message_doctor1 = 'Dear '.ucfirst($name[1]).', We are pleased to confirm your appointment at '.ucfirst($clinic_name1).' on '.$name[0].' For details ' . ucfirst($clientDatas['mobile']);
								$doctorSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smspwd@2016&senderId=PHYSIO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$mobile[1].'&duplicateCheck=true&format=json&msg='.urlencode($message_doctor1);
								$doctor_churl = @fopen($doctorSmsURL,'r');
								fclose($doctor_churl);
								$cost = ceil($length/160);
								if(!$doctor_churl){ }else{
									$this->db->query('update tbl_client set sms_count = sms_count + '.$cost.' where status = 1 and 	daily_sms_notify = 1 and client_id ='.$clientDatas['client_id']);
								}
							}else if($clientDatas['client_id'] == '1809') {
							   $doctorSmsURL = 'http://smsserver9.creativepoint.in/api.php?username=mobiphysio&password=935251&to='.$mobile[1].'&from=PHYSIO&message='.urlencode($message_doctor);
							   $doctor_churl = @fopen($doctorSmsURL,'r');
							   fclose($doctor_churl);
							   $cost = ceil($length/160);
							   if(!$doctor_churl){ }else{
									$this->db->query('update tbl_client set sms_count = sms_count + '.$cost.' where status = 1 and 	daily_sms_notify = 1 and client_id ='.$clientDatas['client_id']);
							   }
							} else if($clientDatas['client_id'] == '1636') {
							   $doctorSmsURL = 'http://smsindia.techmartonline.com/api/sendhttp.php?authkey=136791ASgfUVtgugG15874a756&mobiles='.$mobile[1].'&message='.urlencode($message_doctor).'&sender=PHPLUS&route=4&country=0';
							   $doctor_churl = @fopen($doctorSmsURL,'r');
							   fclose($doctor_churl);
							   $cost = ceil($length/160);
							   if(!$doctor_churl){ }else{
									$this->db->query('update tbl_client set sms_count = sms_count + '.$cost.' where status = 1 and 	daily_sms_notify = 1 and client_id ='.$clientDatas['client_id']);
							   }
							} else {
							}
						} 
						
					}
				}
			}
		}
	}
	public function reminder_sms() {
		$this->db->where('date',date('Y-m-d'));
		$this->db->select('patient_id,client_id,status,ex_time')->from('tbl_ex_time');
		$res = $this->db->get();
		if($res->result_array() != false){
			foreach($res->result_array() as $row){
				$client_id = $row['client_id'];
				$status = $row['status'];
				$livetime = date('H:i:s', time() + 3600);
				if($status == '0'){
					$val = explode(':',$row['ex_time']);
					$t1 = $val[0].':'.$val[1].' '.$val[2];
					if(date('H:i:s',strtotime($t1)) == date('H:i:s',strtotime($livetime))){
						$this->db->where('patient_id',$row['patient_id']);
						$this->db->select('token,first_name,mobile_no')->from('tbl_patient_info');
						$res1 = $this->db->get();
						$name = $res1->row()->first_name;
						$mobile = $res1->row()->mobile_no;
						$token = $res->row()->token;  
						
						$this->db->where('client_id',$row['client_id']);
						$this->db->select('clinic_name')->from('tbl_client');
						$res = $this->db->get();
						$clinic = $res->row()->clinic_name;
						
						define( 'API_ACCESS_KEY', 'AAAAHhxim7Y:APA91bGeFWJJ6ZHdYqoxNwl7e8C7A-AvjlaDCAg43hfEhNzPVqfn1tR-Bg8y6vB0SKDaqgqnx07JyLaZiigDcJ482Tkk_nPBEhsqkX88sYHTRYLZnunznnU-Mexyj7VnDbgOn_oAaXc7' );
						$msg = 'Dear '.$name.', '.$clinic.' reminds you about your exercise schedule. kindly start your exercise without fail by '.$row['ex_time'];
						$data = array("to" => $token , "priority"=>"high",
									  "notification" => array( "title" => "Patient Registration", "body" => $msg,"icon" => "icon.png","vibrate"   => 1,"sound" => "bingbong.aiff"));                                                                    
						$data_string = json_encode($data); 

						echo "The Json Data : ".$data_string; 

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
					}
				}
			}
		}
	}
	public function exfail_sms() {
		$today  = date('Y-m-d');
		$this->db->where('date',date('Y-m-d'));
		$this->db->select('patient_id,client_id,status,ex_time')->from('tbl_ex_time');
		$res = $this->db->get();
		if($res->result_array() != false){
			foreach($res->result_array() as $row){
				$client_id = $row['client_id'];
				$status = $row['status'];
				$livetime = date('H:i:s', time() - 3600);
				if($status == '0'){
					$val = explode(':',$row['ex_time']);
					$t1 = $val[0].':'.$val[1].' '.$val[2];
					//echo date('H:i:s',strtotime($t1)).' '.date('H:i:s',strtotime($livetime));
					if(date('H:i:s',strtotime($t1)) == date('H:i:s',strtotime($livetime))){
						$this->db->where('patient_id',$row['patient_id']);
						$this->db->select('token,first_name,mobile_no')->from('tbl_patient_info');
						$res1 = $this->db->get();
						$name = $res1->row()->first_name;
						$mobile = $res1->row()->mobile_no;
						$token = $res->row()->token;
						
						$this->db->where('client_id',$row['client_id']);
						$this->db->select('clinic_name')->from('tbl_client');
						$res = $this->db->get();
						$clinic = $res->row()->clinic_name;
						
						define( 'API_ACCESS_KEY', 'AAAAHhxim7Y:APA91bGeFWJJ6ZHdYqoxNwl7e8C7A-AvjlaDCAg43hfEhNzPVqfn1tR-Bg8y6vB0SKDaqgqnx07JyLaZiigDcJ482Tkk_nPBEhsqkX88sYHTRYLZnunznnU-Mexyj7VnDbgOn_oAaXc7' );
						$msg = 'Dear '.$name.', '.$clinic.' reminds you about your exercise schedule. kindly start your exercise without fail by '.$row['ex_time'];
						$data = array("to" => $token , "priority"=>"high",
									  "notification" => array( "title" => "Patient Registration", "body" => $msg,"icon" => "icon.png","vibrate"   => 1,"sound" => "bingbong.aiff"));                                                                    
						$data_string = json_encode($data); 

						echo "The Json Data : ".$data_string; 

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
						
					}
				}
			}  
		}
	} 
	public function pending_bills() {  
		$msg = array();	
		$today  = date('Y-m-d');
		$this->db->where('due_date',date('Y-m-d'));
		$this->db->where('bill_status !=',1);
		$this->db->select('client_id,SUM(net_amt) as total,SUM(paid_amt) as paid')->from('tbl_invoice_header');
		$res = $this->db->get();
		if($res->result_array() != false){
			foreach($res->result_array() as $row){
				$amt = $row['total'] - $row['paid'];
				define( 'API_ACCESS_KEY', 'AAAAHhxim7Y:APA91bGeFWJJ6ZHdYqoxNwl7e8C7A-AvjlaDCAg43hfEhNzPVqfn1tR-Bg8y6vB0SKDaqgqnx07JyLaZiigDcJ482Tkk_nPBEhsqkX88sYHTRYLZnunznnU-Mexyj7VnDbgOn_oAaXc7' );
						$msg = 'Dear Admin your total today`s receivable income amount is'.$amt;
						$data = array("to" => $token , "priority"=>"high",
									  "notification" => array( "title" => "Patient Registration", "body" => $msg,"icon" => "icon.png","vibrate"   => 1,"sound" => "bingbong.aiff"));                                                                    
						$data_string = json_encode($data); 

						echo "The Json Data : ".$data_string; 

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
				 
			}  
		}
	}
	public function holidaysms() {  
		$this->db->where('leave_date',date('Y-m-d'));
		$this->db->select('*')->from('announce_holiday');
		$res1 = $this->db->get();
		if($res1->result_array() != false){
			foreach($res1->result_array() as $row1){
				$reason = $row1['reason'];
				$client_id = $row1['client_id'];
				$date = $row1['leave_date'];
				$patient_id = $row1['patient_id'];
				$sms = $row1['NotifySmsPatientsm'];
				$this->load->model('registration_model');
				$profile_info = $this->registration_model->editProfile($client_id);
				$sms_count = $profile_info['sms_count'];
				$sms_limit = $profile_info['total_sms_limit'];
				if($this->session->userdata('client_id') != '1948'){
					$clinic_name = $profile_info['clinic_name'];
				} else {
					$clinic_name = 'SUNSHINE SUPER SPECIALITY PHYSIOTHERAPY CLINIC';
				}
				
				if($sms != '0'){
					if($patient_id != ''){
						$var = explode(',',$patient_id);
						$id = sizeof($var);
						if($id > 0 && $sms_limit  > $sms_count+$id){
							for($i=0; $i < sizeof($var); $i++){
								$this->db->where('patient_id',$var[$i]);
							   $this->db->select('first_name,mobile_no')->from('tbl_patient_info');
							   $res = $this->db->get();  
							     	$name = $res->row()->first_name;
									$mobile_no = $res->row()->mobile_no;
									$message_patient = 'Dear valued '.$name.', our '.$clinic_name.' will be closed on '.date('d-m-Y',strtotime($date)).' , in observance of '.$reason.'. Normal hours will be resume as usual on '.date('d-m-Y',strtotime($date . "+1 days")).'. We apologize for any inconvenience this may cause. Best wishes for a happy and healthy holiday season.';
									$sms['patient'] = 'DONE';
									$patientSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=PHYSIO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$mobile_no.'&duplicateCheck=true&format=json&msg='.urlencode($message_patient);
									$patient_churl = @fopen($patientSmsURL,'r');
									$length = strlen($message_patient);
									$cost = ceil($length/160);
									fclose($patient_churl); 
									if (!$patient_churl) {
									}else{
										$sms_count += $cost;  
									} 
									$this->db->where('client_id', $this->session->userdata('client_id'));
									$this->db->update('tbl_client', array('sms_count' => $sms_count));
							}
						}
					} else {
					$this->db->where('appointment_from',date('Y-m-d',strtotime($date)));
					$this->db->where('ai.client_id',$client_id);
					$this->db->select('pi.first_name,pi.last_name,pi.mobile_no')->from('tbl_appointments ai');
					$this->db->join('tbl_patient_info pi','ai.patient_id=pi.patient_id');
					$res = $this->db->get();
					$id = $res->num_rows();  
					if($id > 0 && $sms_limit  > $sms_count+$id){
						foreach($res->result_array() as $row){
							$date1=date('Y-m-d',strtotime($date));
							$name = $row['first_name'].' '.$row['last_name'];
							$mobile_no = $row['mobile_no'];
							$message_patient = 'Dear valued '.$name.', our '.$clinic_name.' will be closed on '.date('Y-m-d',strtotime($date1)).' , in observance of '.$reason.'. Normal hours will be resume as usual on '.date('d-m-Y',strtotime($date1 . "+1 days")).'. We apologize for any inconvenience this may cause. Best wishes for a happy and healthy holiday season.';
							$patientSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=PHYSIO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$mobile_no.'&duplicateCheck=true&format=json&msg='.urlencode($message_patient);
							$patient_churl = @fopen($patientSmsURL,'r');
							$length = strlen($message_patient);
							$cost = ceil($length/160);
							fclose($patient_churl);
							if (!$patient_churl) {
							}else{
								$sms_count += $cost;  
							} 
							$this->db->where('client_id', $this->session->userdata('client_id'));
							$this->db->update('tbl_client', array('sms_count' => $sms_count)); 
							
						}
						
					}
				  } 
				}
			}
		}
		return true;  
	}
    
    public function holidaymail() {
		$today = date('Y-m-d');		
        $to = date('Y-m-d',strtotime($today . "+1 days"));
		$this->db->where('leave_date',$to);
		$this->db->select('*')->from('announce_holiday');
		$res1 = $this->db->get();
		if($res1->result_array() != false){
			foreach($res1->result_array() as $row1){
				$reason = $row1['reason'];
				$client_id = $row1['client_id'];
				$date = $row1['leave_date'];
				$sms = $row1['NotifySmsPatientm'];
				$patient_id = $row1['patient_id'];
				$this->load->model('registration_model');
				$profile_info = $this->registration_model->editProfile($client_id);
				$sms_count = $profile_info['sms_count'];
				$sms_limit = $profile_info['total_sms_limit'];
				if($client_id != '1948'){
					$clinic_name = $profile_info['clinic_name'];
				} else {
					$clinic_name = 'SUNSHINE SUPER SPECIALITY PHYSIOTHERAPY CLINIC';
				}
				if($sms != '0'){
					if($patient_id != ''){
						$var = explode(',',$patient_id);
						$id = sizeof($var);
						for($i=0; $i < sizeof($var); $i++){
							   $this->db->where('patient_id',$var[$i]);
							   $this->db->select('first_name,mobile_no,email')->from('tbl_patient_info');
							   $res = $this->db->get();
							   $date1=date('Y-m-d',strtotime($date));
									$name = $res->row()->first_name;
									$mobile_no = $res->row()->mobile_no;
									$email = $res->row()->email;
									if($id > 0 && $sms_limit  > $sms_count+$id){
										$message_patient = 'Dear valued '.$name.', our '.$clinic_name.' will be closed on '.date('d-m-Y',strtotime($date)).' , in observance of '.$reason.'. Normal hours will be resume as usual on '.date('d-m-Y',strtotime($date . "+1 days")).'. We apologize for any inconvenience this may cause. Best wishes for a happy and healthy holiday season.';
									    $sms['patient'] = 'DONE';
										$patientSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=PHYSIO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$mobile_no.'&duplicateCheck=true&format=json&msg='.urlencode($message_patient);
										$patient_churl = @fopen($patientSmsURL,'r');
										$length = strlen($message_patient);
										$cost = ceil($length/160);
										fclose($patient_churl); 
										if (!$patient_churl) {
										}else{
											$sms_count += $cost;  
										} 
										$this->db->where('client_id', $this->session->userdata('client_id'));
										$this->db->update('tbl_client', array('sms_count' => $sms_count));
							        }
									if($email != '' ){
										$this->load->library('email');
										$this->load->helper('path');
										$this->load->helper('directory'); 
										$this->email->initialize(array(
												  'protocol' => 'smtp',
												  'smtp_host' => 'smtp.sendgrid.net',
												  'smtp_user' => 'pavithravarthini',
												  'smtp_pass' => 'physioplus@2017',
												  'smtp_port' => 587,
												  'crlf' => "\r\n",
												  'mailtype' => 'html',
												  'newline' => "\r\n"
										  ));
										$path = set_realpath('uploads/mail/');
										$file_names = directory_map($path);
										$this->email->from('no-reply@physioplustech.com',$clinic_name);
										$html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="background-color: #e4e7e0;"> <tbody><tr> <td width="100%"> <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: 0 auto; padding: 0;" class="mobile"> <tbody><tr> <td width="100%"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 5px 0; color: #000000; font-family: Arial,Helvetica,sans-serif; font-size: 11px; font-weight: light; line-height: 15px;"></td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="45%" style="padding: 7px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="font: 26px impact; color: #fff;">'.$clinic_name.'<!--<img width="174" height="34" border="0" style="display: block;" alt="Logo" src="logo.png" class="imageScale">--></td> </tr> </tbody></table> </td> <td width="55%" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 2px 15px; background-color: #23a6bd; color: #ffffff; font-family: Impact; font-size: 25px; line-height: 29px;">NOTIFICATION OF HOLIDAY</td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff; padding: 20px 0 10px 0;"> <tbody><tr> <td class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding: 15px 0 0 0;"> <tbody><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"> <div style="color: #130f0e; font-size: 14px; font-weight: bold; line-height: 21px; text-align: left;"> Dear valued '.$name.', our '.$clinic_name.' will be closed on '.date('Y-m-d',strtotime($date1)).' , in observance of '.$reason.'. Normal hours will be resume as usual on '.date('d-m-Y',strtotime($date1 . "+1 days")).'. We apologize for any inconvenience this may cause. Best wishes for a happy and healthy holiday season.</div></td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="100%" style="font-size: 10px;">&nbsp;</td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding-bottom: 14px;"> <tbody><tr> <td width="30%" style="padding: 10px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Facebook" src="'. base_url() .'img/facebook.png"></a></td> <td align="center"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Twitter" src="'. base_url() .'img/twitter.png"></a></td> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img border="0" style="display: block;" alt="Envelope" src="'. base_url() .'img/envelope.png"></a></td> <td align="center" style="padding-right: 7px;"></td> </tr> </tbody></table> </td> <td width="70%" style="padding: 10px 0; background-color: #343135;" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding-right: 10px; padding-left: 7px; color: #ffffff; font-family: Arial,Helvetica,sans-serif; font-size: 10px; line-height: 14px; text-align: left;">You have received this email cause you have subscribed to '. $info['ClinicName'] .'.<br> &copy; 2013 Your Company</td> </tr> </tbody></table> </td> </tr> </tbody></table> </td> </tr> </tbody></table></td> </tr> </tbody></table>';	
										$this->email->to($email);
										$this->email->subject($clinic_name.' | Notification of Holiday');
										$this->email->message($html);
										$this->email->send();
									}
						}
				    } else {
					$this->db->where('appointment_from',date('Y-m-d',strtotime($date)));
					$this->db->where('ai.client_id',$client_id);
					$this->db->select('pi.email,pi.first_name,pi.last_name,pi.mobile_no')->from('tbl_appointments ai');
					$this->db->join('tbl_patient_info pi','ai.patient_id=pi.patient_id');
					$res = $this->db->get();
					$id = $res->num_rows();  
					if($id > 0 ){
						foreach($res->result_array() as $row){
							$date1=date('Y-m-d',strtotime($date));
							$name = $row['first_name'].' '.$row['last_name'];
							$mobile_no = $row['mobile_no'];
							$email = $row['email'];
							if($sms_limit  > $sms_count+$id){
								$message_patient = 'Dear valued '.$name.', our '.$clinic_name.' will be closed on '.date('Y-m-d',strtotime($date1)).' , in observance of '.$reason.'. Normal hours will be resume as usual on '.date('d-m-Y',strtotime($date1 . "+1 days")).'. We apologize for any inconvenience this may cause. Best wishes for a happy and healthy holiday season.';
								$patientSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=PHYSIO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$mobile_no.'&duplicateCheck=true&format=json&msg='.urlencode($message_patient);
								$patient_churl = @fopen($patientSmsURL,'r');
								$length = strlen($message_patient);
								$cost = ceil($length/160);
								fclose($patient_churl);
								if (!$patient_churl) {
								}else{
									$sms_count += $cost;  
								} 
								$this->db->where('client_id', $this->session->userdata('client_id'));
								$this->db->update('tbl_client', array('sms_count' => $sms_count)); 
							}
							if($email != ''){
								$this->load->library('email');
								$this->load->helper('path');
								$this->load->helper('directory'); 
								$this->email->initialize(array(
										  'protocol' => 'smtp',
										  'smtp_host' => 'smtp.sendgrid.net',
										  'smtp_user' => 'pavithravarthini',
										  'smtp_pass' => 'physioplus@2017',
										  'smtp_port' => 587,
										  'crlf' => "\r\n",
										  'mailtype' => 'html',
										  'newline' => "\r\n"
								  ));
								$path = set_realpath('uploads/mail/');
								$file_names = directory_map($path);
								$this->email->from('no-reply@physioplustech.com',$clinic_name);
								$html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="background-color: #e4e7e0;"> <tbody><tr> <td width="100%"> <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: 0 auto; padding: 0;" class="mobile"> <tbody><tr> <td width="100%"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 5px 0; color: #000000; font-family: Arial,Helvetica,sans-serif; font-size: 11px; font-weight: light; line-height: 15px;"></td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="45%" style="padding: 7px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="font: 26px impact; color: #fff;">'.$clinic_name.'<!--<img width="174" height="34" border="0" style="display: block;" alt="Logo" src="logo.png" class="imageScale">--></td> </tr> </tbody></table> </td> <td width="55%" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding: 2px 15px; background-color: #23a6bd; color: #ffffff; font-family: Impact; font-size: 25px; line-height: 29px;">NOTIFICATION OF HOLIDAY</td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff; padding: 20px 0 10px 0;"> <tbody><tr> <td class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding: 15px 0 0 0;"> <tbody><tr> <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;"> <div style="color: #130f0e; font-size: 14px; font-weight: bold; line-height: 21px; text-align: left;"> Dear valued '.$name.', our '.$clinic_name.' will be closed on '.date('Y-m-d',strtotime($date1)).' , in observance of '.$reason.'. Normal hours will be resume as usual on '.date('d-m-Y',strtotime($date1 . "+1 days")).'. We apologize for any inconvenience this may cause. Best wishes for a happy and healthy holiday season.</div></td> </tr> </tbody></table> </td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td width="100%" style="font-size: 10px;">&nbsp;</td> </tr> </tbody></table> <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding-bottom: 14px;"> <tbody><tr> <td width="30%" style="padding: 10px 0; background-color: #343135;" class="mobile"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Facebook" src="'. base_url() .'img/facebook.png"></a></td> <td align="center"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Twitter" src="'. base_url() .'img/twitter.png"></a></td> <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img border="0" style="display: block;" alt="Envelope" src="'. base_url() .'img/envelope.png"></a></td> <td align="center" style="padding-right: 7px;"></td> </tr> </tbody></table> </td> <td width="70%" style="padding: 10px 0; background-color: #343135;" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding-right: 10px; padding-left: 7px; color: #ffffff; font-family: Arial,Helvetica,sans-serif; font-size: 10px; line-height: 14px; text-align: left;">You have received this email cause you have subscribed to '. $info['ClinicName'] .'.<br> &copy; 2013 Your Company</td> </tr> </tbody></table> </td> </tr> </tbody></table> </td> </tr> </tbody></table></td> </tr> </tbody></table>';	
								$this->email->to($email);
								$this->email->subject($clinic_name.' |Notification of Holiday');
								$this->email->message($html);
								$this->email->send();
							}
						}
						
					}
				  }
				}
			}
		}
		return true; 
	}
    public function day() {    
		$today = date('Y-m-d');		
        $to = date('Y-m-d',strtotime($today . "+1 days"));
		echo $today;
	}
    	
	
		
	
	
	
		
}