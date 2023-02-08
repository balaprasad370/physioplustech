<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once ($_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php');
class  Schedule extends CI_Controller {
	public function __construct() {
		 header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
		parent::__construct();
		$this->app_access->client();
		$this->load->model(array('service_model','client','common_model','patient_model', 'staff_model', 'schedule_model', 'settings_model','appoinment_model'));
	}
	public function index()
	{
		$data['page_name'] = 'schedule';
		$data['app_list'] = $this->appoinment_model->get_appoinments();
		//$data['app_break'] = $this->appoinment_model->get_appoinments_break();
		$data['consultants'] = $this->common_model->getDoctorname();
		$data['doctor'] = $this->common_model->getLocDoctorname();
		$data['patients'] = $this->common_model->getPatientname();
		$data['scheduledCount'] = $this->schedule_model->getTodaysScheduledCount();
		$data['checkedCount'] = $this->schedule_model->getTodaysCheckedCount();
		$data['item'] = $this->common_model->getItemNames();
		$data['settings'] = $this->settings_model->editSettings1($this->session->userdata('client_id'));
		$this->db->select('*')->from('tbl_schedule_settings')->where('client_id', $this->session->userdata('client_id'));
		$query=$this->db->get();
		if($query->result_array() != false ) {
		$wednesday_break_to = $query->row()->wednesday_break_to;
		$wednesday_break_from = $query->row()->wednesday_break_from;
		$thursday_break_to = $query->row()->thursday_break_to;
		$thursday_break_from = $query->row()->thursday_break_from;
		$friday_break_from = $query->row()->friday_break_from;
		$friday_break_to = $query->row()->friday_break_to;
		$saturday_break_from = $query->row()->saturday_break_from;
		$saturday_break_to = $query->row()->saturday_break_to;
		$sunday_break_from = $query->row()->sunday_break_from;
		$sunday_break_to = $query->row()->sunday_break_to;
		$monday_break_from = $query->row()->monday_break_from;
		$monday_break_to = $query->row()->monday_break_to;
		$tuesday_break_from = $query->row()->tuesday_break_from;
		$tuesday_break_to = $query->row()->	tuesday_break_to;
		
		$m_to = $query->row()->monday_an_to;
		$tu_to = $query->row()->tuesday_an_to;
		$w_to = $query->row()->wednesday_an_to;
		$th_to = $query->row()->thursday_an_to;
		$f_to = $query->row()->friday_an_to;
		$sa_to = $query->row()->saturday_an_to;
		$sun_to = $query->row()->sunday_an_to;
		$max=max($m_to,$tu_to,$w_to,$th_to,$f_to,$sa_to,$sun_to);
		$m_to1 = $query->row()->monday_fn_from;
		$tu_to1 = $query->row()->tuesday_fn_from;
		$w_to1 = $query->row()->wednesday_fn_from;
		$th_to1 = $query->row()->thursday_fn_from;
		$f_to1 = $query->row()->friday_fn_from;
		$sa_to1 = $query->row()->saturday_fn_from;
		$sun_to1 = $query->row()->sunday_fn_from;
		
		$min=min($m_to1,$tu_to1,$w_to1,$th_to1,$f_to1,$sa_to1,$sun_to1);
		} else {
			$wednesday_break_to = '';
			$wednesday_break_from = '';
			$thursday_break_to = '';
			$thursday_break_from = '';
			$friday_break_from = '';
			$friday_break_to = '';
			$saturday_break_from = '';
			$saturday_break_to = '';
			$sunday_break_from = '';
			$sunday_break_to = '';
			$monday_break_from = '';
			$monday_break_to = '';
			$tuesday_break_from = '';
			$tuesday_break_to = '';
			$max = '10';
			$min ='7';
		}
		$data['max'] = $max;
		$data['min'] = $min;
		$date =date('Y-m-d');
		$end_date = date('Y-m-d', strtotime('+1 months'));
		$arr=array();
		$rat=array(0);
		while (strtotime($date) <= strtotime($end_date)) {
			 array_push($arr,$date);           
		  $date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
		}
		$date = implode(',',$arr);
		for($i=0;$i<count($arr);$i++){
			$timestamp = strtotime($arr[$i]);
			$day = date('D', $timestamp);
			if($day == 'Mon'){
				if($monday_break_from == '' || $sunday_break_from == '1:00 am'){
				} else {
					$ran1 = array(
						'title'=>'lunch',
						'start'=>$arr[$i].' '.date('H:i:s',strtotime($monday_break_from)),
						'end'=>$arr[$i].' '.date('H:i:s',strtotime($monday_break_to)),
						'backgroundColor'=>'#3f4e62'
					);
					array_push($rat,$ran1);
			  }
			}
			if($day == 'Tue'){
				if($tuesday_break_from == '' || $sunday_break_from == '1:00 am'){
				} else {
					$ran2 = array(
						'title'=>'lunch',
						'start'=>$arr[$i].' '.date('H:i:s',strtotime($tuesday_break_from)),
						'end'=>$arr[$i].' '.date('H:i:s',strtotime($tuesday_break_to)),
						'backgroundColor'=>'#3f4e62'
					);
					array_push($rat,$ran2);
				}
			}
			if($day == 'Wed'){
				if($wednesday_break_from == '' || $sunday_break_from == '1:00 am'){
				} else {
					$ran3 = array(
						'title'=>'lunch',
						'start'=>$arr[$i].' '.date('H:i:s',strtotime($wednesday_break_from)),
						'end'=>$arr[$i].' '.date('H:i:s',strtotime($wednesday_break_to)),
						'backgroundColor'=>'#3f4e62'
					);
					array_push($rat,$ran3);
				}
			}
			if($day == 'Thu'){
				if($thursday_break_from == '' || $sunday_break_from == '1:00 am'){
				} else {
					$ran4 = array(
						'title'=>'lunch',
						'start'=>$arr[$i].' '.date('H:i:s',strtotime($thursday_break_from)),
						'end'=>$arr[$i].' '.date('H:i:s',strtotime($thursday_break_to)),
						'backgroundColor'=>'#3f4e62'
					);
					array_push($rat,$ran4);
				}
			}
			if($day == 'Fri'){
				if($friday_break_from == '' || $sunday_break_from == '1:00 am' ){
				} else {
					$ran5 = array(
						'title'=>'lunch',
						'start'=>$arr[$i].' '.date('H:i:s',strtotime($friday_break_from)),
						'end'=>$arr[$i].' '.date('H:i:s',strtotime($friday_break_to)),
						'backgroundColor'=>'#3f4e62'
					);
					array_push($rat,$ran5);
				}
			}
			if($day == 'Sat'){
				if($saturday_break_from == '' || $sunday_break_from == '1:00 am' ){
				} else {
					$ran6 = array(
						'title'=>'lunch',
						'start'=>$arr[$i].' '.date('H:i:s',strtotime($saturday_break_from)),
						'end'=>$arr[$i].' '.date('H:i:s',strtotime($saturday_break_to)),
						'backgroundColor'=>'#3f4e62'
					);
					array_push($rat,$ran6);
				}
			}
			if($day == 'Sun'){
				if($sunday_break_from == '' || $sunday_break_from == '1:00 am'){
				
				} else {
					
					$ran7 = array(
						'title'=>'lunch',
						'start'=>$arr[$i].' '.date('H:i:s',strtotime($sunday_break_from)),
						'end'=>$arr[$i].' '.date('H:i:s',strtotime($sunday_break_to)),
						'backgroundColor'=>'#3f4e62'
					);
					array_push($rat,$ran7);
				}
			}
		}
		
		$this->load->view('client/schedule',$data);
		 
	}
	public function add_visit() {
		$query = $this->patient_model->add_visit($_POST['p_id']);
		if($query != '')
		
			{
				$response['status'] = 'success';
				$response['message'] = $query;
			}
			 else {
				$response['status'] = 'failure';
				$response['message'] =  'profile has been changed successfully.';
			}
			echo json_encode($response);
	}
	public function getappointment() {
		$concessionData = $this->schedule_model->getappointment();
		echo json_encode($concessionData);
	}
	public function getcancelappointment() {
		$concessionData = $this->schedule_model->getcancelappointment();
		echo json_encode($concessionData);
	}
	public function getrequestappointment() {
		$concessionData = $this->schedule_model->getrequestappointment();
		echo json_encode($concessionData);
	}
	public function addAppointment() {
		$profile_info = $this->registration_model->editProfile($this->session->userdata('client_id'));
                //$this->client->checkAccessToken();
		$sms_count = $profile_info['sms_count'];
		$response = array();
		$result = $this->schedule_model->add();
				if($result['sms'] == true) {
					$response['sms'] = true;
					$response['message'] = $result['Message'];
					$response['mobile'] = $result['mobile'];
					$response['PatientUrl'] = $result['PatientUrl'];
					$response['DoctorUrl'] = $result['DoctorUrl'];
				} else {
					$response['sms'] = false; 
					$response['message'] = $result['Message'];
					$response['mobile'] = $result['mobile'];
										
				}
				$response['status'] = 'success';
				$response['message'] = $result['Message'];
				$response['mobile'] = $result['mobile'];
				$response['scheduledCount'] = $this->schedule_model->getTodaysScheduledCount();
				$response['checkedCount'] = $this->schedule_model->getTodaysCheckedCount();
			
		echo json_encode($response); 
	}
	public function addAppointment1() {
		$profile_info = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$sms_count = $profile_info['sms_count'];
		$response = array();
		$result = $this->schedule_model->addAppointment1();
				if($result['sms'] == true) {
					$response['sms'] = true;
					$response['PatientUrl'] = $result['PatientUrl'];
					$response['DoctorUrl'] = $result['DoctorUrl'];
				} else {
					$response['sms'] = false;
				}
				$response['status'] = 'success';
				$response['message'] = 'Appointment has been added successfully.';
				$response['scheduledCount'] = $this->schedule_model->getTodaysScheduledCount();
				$response['checkedCount'] = $this->schedule_model->getTodaysCheckedCount();
			
		echo json_encode($response);
		
	}
	public function reschedule1() {
		$data['page_name'] = 'schedule';
		$id = $this->uri->segment(4);
		
		$this->db->where('appointment_id',$id);
		$this->db->select('staff_id')->from('tbl_appointments');
		$rse = $this->db->get();
		$staff_id = $rse->row()->staff_id;
		
		if($this->uri->segment(5) != false){
			$data['patient_id'] = $this->uri->segment(5);
		} else {
			$this->db->where('appointment_id',$id);
			$this->db->select('patient_id')->from('tbl_appointments');
			$rse = $this->db->get();
			$patient_id = $rse->row()->patient_id;
			$data['patient_id'] = $patient_id;
        }			
		$data['query'] = $this->common_model->reschedule($id);
		$data['sch_slot1'] = $this->appoinment_model->staff_slot($staff_id);
		$data['sch_slot'] = $this->appoinment_model->sch_slot($this->session->userdata('client_id'));
		$data['sch_times'] = $this->appoinment_model->sch_times($this->session->userdata('client_id'));
		$this->load->view('client/reschedule_appointments',$data);	 
	}
	public function add_appointment() {
		$this->load->model('patient_model');
		$query = $this->patient_model->add();
		if($query != '')
		
			{
				$response['status'] = 'success';
				$response['message'] = 'profile has been changed successfully.';
			}
			 else {
				$response['status'] = 'failure';
				$response['message'] =  'profile has been changed successfully.';
			}
			echo json_encode($response);
	}
	public function getAppointments() {
		$data['page_name'] = 'schedule';
		$this->load->model('schedule_model');
		$appointments = $this->schedule_model->getAll();
		$events = array();
		foreach($appointments as $appointment){
			$startString = strtotime($appointment['start']);
			$endString = strtotime($appointment['end']);
			$appointment['start'] = date('Y,m,d,H:i', $startString);
			$appointment['end'] = date('Y,m,d,H:i', $endString);
			$appointment['id'] = $appointment['appointment_id'];
			$appointment['allDay'] = false;
			array_push($events, $appointment);
		}
		echo json_encode($events);
	}
	public function cancel_appointments() {
		$response=array();
		$appointment_id = $this->input->post('event-id'); 
		$result = $this->schedule_model->delete_appointment($appointment_id);
		if($result != ''){
			$clinic_name = $this->session->userdata('clinic_name');
			$time = ($result['appint_date']!='') ? date('d-m-Y h:i a',strtotime($result['appint_date'])) : "";
			$str = 'Dear '.$result['pname'].', Your appointment with '.$result['dname'].' at '.$clinic_name.' On '.$time.' has been cancelled';
			$response['status'] = 'success';
			//$response['message'] = 'Patient deleted successfully.';
			$response['message'] = $str;
			$response['mobile'] = $result['mobile_no'];
			echo $response['message']; die;
			
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
			
		}
		echo json_encode($response);
	}
	public function del_appointment() {
		$response=array();
		$result = $this->schedule_model->del_appointment($_POST['p_id']);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		}
		echo json_encode($response);
	}
	public function cancel_appointment(){
		
		$data['page_name'] = 'schedule';
		$this->load->view('client/cancel_appointment',$data); 
	} 
	public function approve_appointments() {
		$data['page_name'] = 'schedule';
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 10;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
		//Count
		$this->db->select('count(*) as totalrows')->from('tbl_appointments');
		$this->db->where('t_status',1);
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
			
		$this->db->select('ti.start,ti.staff_id,pi.first_name,pi.last_name,pi.patient_code,ti.har_mob_no,ti.har_email,ti.appointment_id');
		$this->db->from("tbl_appointments ti");
		$this->db->join("tbl_patient_info pi", "ti.patient_id = pi.patient_id");
		$this->db->where('t_status',1);
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
		$data['result'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		
		//$data['referalTypes'] = $this->referal_model->getTypes();
		
		//Pagination
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
		$data['current_page_segment'] = $current_page_segment;
		$this->load->view('client/approve_appointments',$data);
		
	}
	public function demo() {
		$this->load->view('client/upload');
	}
	public function appointment_list(){
		$data['page_name'] = 'schedule';
	$this->load->view('client/appointment_list',$data);
	}
	public function add_Pat() {
		$prov = $this->input->post('provDiag');
		if($concessionData = $this->appoinment_model->add_patient($prov)){
			$response['status'] = 'success';
			$response['message'] = 'Referal  has been added successfully.';
			$response['PatientData'] = $concessionData;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
			
		}
		echo json_encode($response);
	}
	public function quick_add_consult() {
		$prov = $this->input->post('provDiag');
		$response = array();
		if($consultData = $this->staff_model->quick_consult_add($prov)) {
				$response['status'] = 'success';
				$response['message'] = 'consultant info has been added successfully.';
				$response['consultData']=$consultData;
		}
		else {
			$response['status'] = 'failure';
			$response['message'] = $this->form_validation->error_array();
		}
		echo json_encode($response);
	}
	public function approve()
	{
		$id = $this->uri->segment(4);
		$this->db->where('appointment_id',$id);
		$this->db->set('t_status','0');
		$data['result'] = $this->db->update('tbl_appointments');
		redirect(base_url().'client/schedule/approve_schedule');
	}
	public function approve_schedule() {
		$data['page_name'] = 'schedule';
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
		
		//Count
		$searchtype = $this->uri->segment(4);
		$search1 = $this->uri->segment(5);
		$search2 = $this->uri->segment(6);
		$search3 = $this->uri->segment(7);
		
		$this->db->where('t_status !=','0');
		if($searchtype == 'patient'){
			$this->db->where('patient_id',$search1);
		} elseif($searchtype == 'date') {
			$this->db->where('appointment_from >=',date('Y-m-d',strtotime($search1)));
			$this->db->where('appointment_from <=',date('Y-m-d',strtotime($search2)));
		} else {
		}
		$this->db->select('count(*) as totalrows')->from('tbl_appointments')->where('client_id = "'.$this->session->userdata('client_id').'"');
		$q = $this->db->get();
		$qrow = $q->row();  
		$config['total_rows'] = $qrow->totalrows;
		
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->select('app,appointment_id,start,title,har_mob_no,har_email,t_status');
		$this->db->from("tbl_appointments");
		$this->db->where('t_status !=','0');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		//do where
		
		
		if($searchtype == 'patient'){
			$this->db->where('patient_id',$search1);
		} elseif($searchtype == 'date') {
			$this->db->where('appointment_from >=',date('Y-m-d',strtotime($search1)));
			$this->db->where('appointment_from <=',date('Y-m-d',strtotime($search2)));
		} else {
		}
		//do orderby
		$this->db->order_by('appointment_id', 'desc');
		
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
		$data['result'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		
		//Pagination
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
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$config['last_link'] = 'Last &gt;&gt;';
		
		$config['base_url'] = site_url(join("/",$segment_array));
		$config['uri_segment'] = $current_page_segment;
		$this->pagination->initialize($config);
		$str_links = $this->pagination->create_links();	
		$data["links"] = explode('<li>',$str_links);
		$data['result']=$query->result_array();	
		$data['current_page_segment'] = $current_page_segment;
		$data['patient_name']=$this->common_model->getPatientname2();
		$this->load->view('client/approve_appointment',$data);
	}
	public function reschedule() {
		$data['page_name'] = 'schedule';
		$id = $this->uri->segment(4);
		$data['app_id'] = $this->uri->segment(5);
		$client_id = $this->session->userdata('client_id');
		$data['query'] = $this->common_model->reschedule($id);
		$data['sch_slot'] = $this->appoinment_model->sch_slot($client_id);
		$data['sch_times'] = $this->appoinment_model->sch_times($client_id);
		$this->load->view('client/reschedule_appointments',$data);	 
	}
	public function T_reschedule() {
		$data['page_name'] = 'schedule';
		$id = $this->uri->segment(4);
		$data['query'] = $this->common_model->reschedule($id);
		$data['sch_slot'] = $this->appoinment_model->sch_slot($this->session->userdata('client_id'));
		$data['sch_times'] = $this->appoinment_model->sch_times($this->session->userdata('client_id'));
		$this->load->view('client/t_reschedule_appointments',$data);	 
	}
	public function reschedule_app()
	{
		$response = array();
		$app_id = $this->input->post('appointment_id');
		$app_from = $this->input->post('appointment_from');
		$slot = $this->input->post('slot');
		$time = $this->input->post('time');
		$pat_email = $this->input->post('NotifyEmailPatient');
		$pat_sms = $this->input->post('NotifySmsPatient');
		$client_id = $this->session->userdata('client_id');
		$app_date = date('Y-m-d',strtotime($app_from));
		$this->db->where('appointment_id',$app_id);
		$this->db->select('start,title,end,har_email,har_mob_no')->from('tbl_appointments');
		$res=$this->db->get();
		$start=$res->row()->start;
		$end=$res->row()->end;
		$har_email=$res->row()->har_email;
		$title=$res->row()->title;
		$har_mob_no=$res->row()->har_mob_no;
		$mobile = $har_mob_no;
		$email = $har_email;
		$date1 = $app_date; 
		$pat_sms = $this->input->post('NotifySmsPatient');
		$app_id = $this->input->post('appointment_id');
		
		
		$c_id = $this->session->userdata('client_id');
		$this->db->where('client_id',$c_id);
		$this->db->select('sms_count,total_sms_limit')->from('tbl_client');
		$res = $this->db->get();
		$total_sms_limit = $res->row()->total_sms_limit;
		$sms_count = $res->row()->sms_count;
		if( $total_sms_limit - $sms_count > 0  || $c_id == '1636' || $c_id == '1809') {
			if($pat_sms != false) {
				$PatientSms = $this->service_model->smsNotification_reschedule($app_id,$start,$app_from,$time);
		  	}
		}	
		if($pat_email != false) {
			$result = $this->mail_model->app_det($app_id); 
		} 
		  if($this->input->post('category') == '1'){
			$result = $this->schedule_model->patient_det($title,$email,$app_date,$mobile);
			//$result = $this->schedule_model->form_edit($app_id);
		  } else {
			
		 // $result = $this->schedule_model->form_edit($app_id);
		   $result = $this->schedule_model->form_update($app_id,$slot); 
		}
		if($result != false)
		{
			$response['status'] = 'success';
			$response['message'] = 'Appointment Has Been Added successfully.';
		}
		else{
			$response['status'] = 'failure';
			$response['message'] = 'Appointment Has Been Added successfully.';
		}
		echo json_encode($response); 
	   
	}
	public function T_reschedule_app()
	{
		$response = array();
		$app_id = $this->input->post('appointment_id');
		$app_from = $this->input->post('appointment_from');
		$slot = $this->input->post('slot');
		$time = $this->input->post('time');
		$pat_email = $this->input->post('NotifyEmailPatient');
		$pat_sms = $this->input->post('NotifySmsPatient');
		$pat_sms1 = $this->input->post('NotifySmsPatientm');
		$client_id = $this->session->userdata('client_id');
		$app_date = date('Y-m-d',strtotime($app_from));
		$this->db->where('appointment_id',$app_id);
		$this->db->select('start,title,end,har_email,har_mob_no')->from('tbl_appointments');
		$res=$this->db->get();
		$start=$res->row()->start;
		$end=$res->row()->end;
		$har_email=$res->row()->har_email;
		$title=$res->row()->title;
		$har_mob_no=$res->row()->har_mob_no;
		$mobile = $har_mob_no;
		$email = $har_email;
		$date1 = $app_date;
		if($pat_sms != false) {
			$notify_to = $pat_sms;
			$result = $this->schedule_model->smsNotify($app_id,$notify_to);  
		}
		if($pat_email != false) {
			$result = $this->mail_model->app_det($app_id); 
		} 
		if($this->input->post('category') == '1'){
			$result = $this->schedule_model->patient_det($title,$email,$app_date,$mobile);
			//$result = $this->schedule_model->form_edit($app_id);
		} else {
		//$result = $this->schedule_model->form_edit($app_id);
		$result = $this->schedule_model->form_update1($slot); 
		}
		if($result != false)
		{
			$response['status'] = 'success';
			$response['message'] = 'Appointment Has Been Added successfully.';
		}
		else{
			$response['status'] = 'failure';
			$response['message'] = 'Appointment Has Been Added successfully.';
		}
		echo json_encode($response); 
	   
	}
	
	public function approve1() {
		$id = $this->uri->segment(5);
		$sta = $this->uri->segment(4);
		
		/* $c_id = $this->session->userdata('client_id');
		$this->db->where('client_id',$c_id);
		$this->db->select('sms_count,total_sms_limit')->from('tbl_client');
		$res = $this->db->get();
		$total_sms_limit = $res->row()->total_sms_limit;
		$sms_count = $res->row()->sms_count;
		if( $total_sms_limit >  $sms_count || $c_id == '1636' || $c_id == '1809' ) {
			 $appointment_id = $id;
			 $PatientSms = $this->service_model->smsNotification_approve($appointment_id, 'patient');
		} */
		//if($sta == 'new' || $sta == 'exist' ){
			  
			$this->db->where('appointment_id',$id);
			$this->db->set('t_status','0');
			$this->db->set('status','0');
			$this->db->update('tbl_appointments');
			 
				/* if($sta == 'new'){
					   $result = $this->schedule_model->getpatient($id);
					} else {
					} */
				/* } 
			  else { 
		}  */  
		$data['page_name'] = 'schedule';
		$data['consultants'] = $this->common_model->getDoctorname();
		$data['appointment_id'] = $this->uri->segment(5);
		$this->load->view('client/add_consultant',$data);  
	}
	public function update_status(){
		$data['page_name'] = 'schediule';
		$appointment_id = $this->uri->segment(4);
		$where = array('appointment_id' => $appointment_id);
		$this->db->where($where);
		$this->db->set('status',1);
		$this->db->update('tbl_appointments');
		
		echo json_encode($where);
	}
	public function bulk_cancel() {
		$response=array();
		$result = $this->schedule_model->bulk_cancel($_POST['p_id']);
		if($result != ''){
			$response['status'] = 'success';
			$response['id'] = $result;
			$response['message'] = 'Patient deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		}
		echo json_encode($response); 
	}
	public function bulk_delete() {
		$response=array();
		$result = $this->schedule_model->bulk_delete($_POST['p_id']);
		if($result != ''){
			$response['status'] = 'success';
			$response['id'] = $result;
			$response['message'] = 'Patient deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		}
		echo json_encode($response); 
	}
	public function delete_appointment(){
		$response=array();
		$result = $this->schedule_model->bulk_cancel($_POST['p_id']);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = $_POST['p_id'];
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		}
		echo json_encode($response);
	}  
	public function add_consultant() {
		$response=array();
		$result = $this->schedule_model->add_consultant();
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		}
		echo json_encode($response);
	}
	public function cancel(){
		$data['page_name'] = 'schedule';
		$id = $this->uri->segment(4);
		$appointment_id = $this->uri->segment(5);
		$this->load->view('client/appointment_cancel',$data);
	}
	public function today_add_appointment(){
	   $data['page_name'] = 'schedule';
	   $id = $this->uri->segment(4);
		
		$data['sch_slot'] = $this->appoinment_model->sch_slot($this->session->userdata('client_id'));
		$data['sch_times'] = $this->appoinment_model->sch_times($this->session->userdata('client_id'));
		$data['settings'] = $this->settings_model->editSettings1($this->session->userdata('client_id'));
		$data['consultants'] = $this->common_model->getDoctorname();
        $data['item'] = $this->common_model->getItemNames();
		$this->load->view('client/add_appointment',$data);
   }
  public function T_addAppointment1() {
		$profile_info = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$sms_count = $profile_info['sms_count'];
		$response = array();
		
		 $result = $this->schedule_model->T_addAppointment1();
				if($result['sms'] == true) {
					$response['sms'] = true;
					$response['PatientUrl'] = $result['PatientUrl'];
					$response['DoctorUrl'] = $result['DoctorUrl'];
				} else {
					$response['sms'] = false;
				}
				$response['status'] = 'success';
				$response['message'] = 'Appointment has been added successfully.';
				$response['scheduledCount'] = $this->schedule_model->getTodaysScheduledCount();
				$response['checkedCount'] = $this->schedule_model->getTodaysCheckedCount();
			
		echo json_encode($response);
		  
	}
   public function todays_appointment() {
		$data['page_name'] = 'report';
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		$config['per_page'] =10;
		$current_page ='';
		
		if($this->uri->segment(4) != false) {
			$val =  $this->uri->segment(6);
			$val1 = $this->uri->segment(7);
		 if($this->uri->segment(5) == 'PatientName') {
			  $this->db->where('ti.patient_id',$val);
		  } else if($this->uri->segment(5) == 'date') {
			$this->db->where('ti.visit_date >=',date('Y-m-d',strtotime($val)));
			$this->db->where('ti.visit_date <',date('Y-m-d',strtotime($val1)));
		  } else {
			  $this->db->where('ti.visit_date',date('Y-m-d'));
		  }
		} else {
			$this->db->where('ti.visit_date',date('Y-m-d'));
		}
		$this->db->select('*')->from('tbl_patient_visits ti')->where('ti.client_id',$this->session->userdata('client_id'));
		$this->db->join('tbl_patient_info pi', 'ti.patient_id = pi.patient_id');
		$this->db->distinct();
		$query = $this->db->get();
		$config['total_rows'] = $query->num_rows();
		$data['total_rows'] = $query->num_rows();		
		if($this->uri->segment(4) != false) {
			$val =  $this->uri->segment(6);
			$val1 = $this->uri->segment(7);
		 if($this->uri->segment(5) == 'PatientName') {
			  $this->db->where('ti.patient_id',$val);
		  } else if($this->uri->segment(5) == 'date') {
			$this->db->where('ti.visit_date >=',date('Y-m-d',strtotime($val)));
			$this->db->where('ti.visit_date <',date('Y-m-d',strtotime($val1)));
		  } else {
			  $this->db->where('ti.visit_date',date('Y-m-d'));
		  }
		} else {
			$this->db->where('ti.visit_date',date('Y-m-d'));
		}
		$this->db->select('pi.patient_code,ti.patient_id,pi.first_name,pi.last_name,pi.mobile_no,pi.email,pi.address_line1')->from('tbl_patient_visits ti')->where('ti.client_id',$this->session->userdata('client_id'));
		$this->db->join('tbl_patient_info pi', 'ti.patient_id = pi.patient_id');
				
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
		$data['result']=$query->result_array();
	    $data['patient_name']=$this->common_model->getPatientname2();
		$data['item'] = $this->common_model->getItemNames();
		$this->load->view('client/todays_appointments',$data); 
	}
	
	public function export_app(){
		$this->load->library('export');
		$data['page_name'] = 'schedule';
		$segment_array = $this->uri->segment_array();
		
		$search=str_replace('%20',' ',$this->uri->segment(4));
		$search1=str_replace('%20',' ',$this->uri->segment(5));
		$search2=str_replace('%20',' ',$this->uri->segment(6));
		if($search == 'date'){
			$from = date('Y-m-d',  strtotime(urldecode($this->uri->segment(5))));
			$to = date('Y-m-d',  strtotime(urldecode($this->uri->segment(6))));
			$where_condition = "(appointment_from >= '".$from."' AND appointment_from <='".$to."')";
			$data['from_date'] = date('d/m/Y', strtotime($from));
			$data['to_date'] = date('d/m/Y', strtotime($to));
			$this->db->where($where_condition);
			$this->db->where('ap.client_id',$this->session->userdata('client_id'));
		    $this->db->select('ap.appointment_from,ap.title,ap.start,ap.end,ts.first_name,it.item_name');
			$this->db->join('tbl_item it','it.item_id=ap.item_id');
			$this->db->join('tbl_staff_info ts','ts.staff_id=ap.staff_id');
			$this->db->from("tbl_appointments ap");
			$this->db->where('ap.status','0');
			$this->db->where('ap.t_status',0);  
			$this->db->order_by("ap.appointment_id", "desc");
			
		}
			else {
		     $this->db->where('ap.client_id',$this->session->userdata('client_id'));
		     $this->db->select('ap.appointment_from,ap.title,ap.start,ap.end,ts.first_name,it.item_name');
			 $this->db->join('tbl_item it','it.item_id=ap.item_id');
			 $this->db->join('tbl_staff_info ts','ts.staff_id=ap.staff_id');
             $this->db->from("tbl_appointments ap");
			 $this->db->where('ap.status','0');
			 $this->db->where('ap.t_status',0);  
			 $this->db->order_by("ap.appointment_id", "desc");
			}
		
		
		$query=$this->db->get();
		$this->export->to_excel($query, 'appointment_list');
		}
	public function app_can_appointment(){
		$data['page_name'] = 'schedule';
		$this->schedule_model->app_can_appointment($_POST['p_id']);
	}
	public function appointment(){  
	
		$data['page_name'] = 'schedule';
		if($this->uri->segment(4) != 'pat'){
			$data['patients'] = $this->common_model->getPatientname();
			$data['patients_name'] = '';
		} else {
			$patient_id = $this->uri->segment(5);
			$data['patients_name'] = $this->common_model->get_name($patient_id);
			$data['patients'] = $this->common_model->getPatientname();
		}			
		$dat1 = $this->appoinment_model->get_time();
		$dat2 = $this->appoinment_model->get_event();
		$dat = $this->appoinment_model->get_appoinments1();
		if($dat !=false && $dat1 != false && $dat2 != false){ $data['app_list'] = array_merge($dat1,$dat,$dat2); }
		else if($dat !=false && $dat1 == false && $dat2 == false){ $data['app_list'] = array_merge($dat); }
		else if($dat !=false && $dat1 != false && $dat2 == false){ $data['app_list'] = array_merge($dat1,$dat);}
		else if($dat !=false && $dat1 == false && $dat2 != false){ $data['app_list'] = array_merge($dat,$dat2);}
		
		else if($dat ==false && $dat1 != false && $dat2 != false){ $data['app_list'] = array_merge($dat1,$dat2); }
		else if($dat !=false && $dat1 != false && $dat2 == false){ $data['app_list'] = array_merge($dat1,$dat); }
		else if($dat ==false && $dat1 != false && $dat2 == false){ $data['app_list'] = array_merge($dat1); }
		
		else if($dat !=false && $dat1 == false && $dat2 != false){ $data['app_list'] = array_merge($dat,$dat2); }
		else if($dat ==false && $dat1 != false && $dat2 != false){ $data['app_list'] = array_merge($dat1,$dat2); }
		else if($dat ==false && $dat1 == false && $dat2 != false){ $data['app_list'] = array_merge($dat2); }
		else {
			$data['app_list'] = '';
		}
		$data['consultants'] = $this->common_model->getDoctorname();
		$data['staffs'] = $this->appoinment_model->get_staffs();
		$data['doctor'] = $this->common_model->getLocDoctorname();
		$data['patients'] = $this->common_model->getPatientname();
		$data['scheduledCount'] = $this->schedule_model->getTodaysScheduledCount();
		$data['checkedCount'] = $this->schedule_model->getTodaysCheckedCount();
		$data['item'] = $this->common_model->getItemNames();
		
	    $settings = $this->settings_model->editSettings1($this->session->userdata('client_id'));
		if($settings != false){
			$data['settings'] = $settings;
		} else {
			$data['settings'] = array(
			'sch_slot' => '15',
			'display_view'=> ''
			);
		}
		$data['max'] = '22';  
		$data['min'] = '7';  
		$data['other_items'] = $this->common_model->getotherItems();
		
		$this->load->view('client/appointment',$data); 
	}
	public function add_event() {
		$response=array();
		$result = $this->appoinment_model->add_event();
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		}
		echo json_encode($response);
	}
	public function add_notes() {
		$response=array();
		$result = $this->appoinment_model->add_notes($_POST['notes']);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		}
		echo json_encode($response);
	}
	public function get_notes() {
		$response=array();
		$id = $_POST['a_id'];
		$result1 = $this->appoinment_model->get_apt($id);
		$result = $this->appoinment_model->get_notes($id);
		$result2 = $this->appoinment_model->get_consu($id);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = $result;
			$response['apt'] = $result1;
			$response['consu'] = $result2;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = '';
			$response['apt'] = $result1;
			$response['consu'] = $result2;
		}
		echo json_encode($response);
	}
	public function update_appointment()
	{
		$response = array();
		$app_id = $this->input->post('appointment_id');
                $start=$this->input->post('time');
		$date=$this->input->post('appointment_from');

		$result = $this->schedule_model->form_update($app_id); 
		if($result != false)
		{
                        $info=$this->getAppointmentDetails($app_id);
			$response['status'] = 'success';
			$response['message'] = 'Appointment Has Been Added successfully.';
                        $response['mobile']=$info['mobile'];
		        $response['staffname']=$info['sname'];
			$response['patientname']=$info['name'];
			$response['time'] =$start;
			$response['date'] =$date;
			//header("Location:https://physioplustech.in/client/schedule/appointment");
		}
		else{
			$response['status'] = 'failure';
			$response['message'] = 'Appointment Has Been Added successfully.';
		}
		echo json_encode($response); 
	}

        public function getAppointmentDetails($app_id)
	{
		$this->db->where('appointment_id',$app_id);
		$this->db->select('pi.mobile_no as mobile_no,pi.first_name as first_name,pi.last_name as last_name,ai.chat_room,ai.order_id,ai.bill_status,ai.appointment_from,ai.appointment_id,ai.patient_id,ai.visit,ai.bill_id,ai.title,ai.start, ai.end,ai.googleMeet_link,si.first_name as staff_name,si.last_name as staff_lname,si.email as staff_email,pi.email as patient_email')->from('tbl_appointments ai');
	        $this->db->join('tbl_patient_info pi','pi.patient_id = ai.patient_id');
	        $this->db->join('tbl_staff_info si','si.staff_id = ai.staff_id');
		$query = $this->db->get();
		$mobile=$query->row()->mobile_no;
		$staffname=$query->row()->staff_name.' '.$query->row()->staff_lname;
		$patientname=$query->row()->first_name.' '.$query->row()->last_name;
		return array('mobile'=> $mobile,'name'=> $patientname,'sname'=> $staffname);
		/*
		$code=$query->row()->patient_code;
		$review = $query->row()->google_review;
		$mobile=$query->row()->mobile_no;
		$email=$query->row()->email;
		return array('mobile'=> $mobile,'name'=> $name,'email'=> $email,'review' => $review);*/
		
	}

	public function cancel_apt() {
		$this->load->model('patient_model');
		$query = $this->patient_model->cancel_apt();
		redirect(base_url().'client/schedule/appointment');
	}
	public function search_event() {
		$response=array();
		$result = $this->appoinment_model->search_event($_POST['search']);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Patient deleted successfully.';
		}
		echo json_encode($response);
	}
	public function delete_event() {
		$response=array();
		$result = $this->appoinment_model->delete_event();
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Patient deleted successfully.';
		}
		echo json_encode($response);
	}
	public function edit_apt() {
		$response=array();
		$result = $this->appoinment_model->edit_apt($_POST['provisional']);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Patient deleted successfully.';
		}
		echo json_encode($response);
	}
	public function color() {
		$this->db->where('appointment_from >=',date('Y-m-d', strtotime('-20 day', strtotime(date('Y-m-d')))));
		$this->db->where('appointment_from <=',date('Y-m-d'));
		$this->db->select('appointment_from')->from('tbl_appointments');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$q = $this->db->get();
		if($q->result_array() != false){
			foreach($q->result_array() as $r1){
				echo $r1['appointment_from'];
			}	
	    } 
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */