<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clinical_summary extends CI_Controller {
	public function __construct() {
		header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
		parent::__construct();
		$this->app_access->client();
		$this->load->model(array('service_model','common_model','patient_model', 'staff_model', 'schedule_model', 'settings_model','appoinment_model'));
	}
	public function _remap($method, $params = array())
			{
				if($this->session->userdata('duration') == 0 ||  $this->session->userdata('plan') < 2 ){
				// get controller name
				$controller = mb_strtolower(get_class($this));
				  
				if ($controller = mb_strtolower($this->uri->segment(1))) {
					// if requested controller and this controller have the same name
					// show 404 error
						$data['page_name'] = 'dashboard';
						$data['account_info'] = $this->registration_model->myaccount($this->session->userdata('client_id'));
					$data['sch_settings_inf']= $this->registration_model->editsettings($this->session->userdata('client_id')); 
					$data['profile']= $this->registration_model->editProfile($this->session->userdata('client_id'));
					$this->load->view('client/account', $data);
				} elseif (method_exists($this, $method))
				{	$data['page_name'] = 'dashboard';
						$data['account_info'] = $this->registration_model->myaccount($this->session->userdata('client_id'));
					$data['sch_settings_inf']= $this->registration_model->editsettings($this->session->userdata('client_id')); 
					$data['profile']= $this->registration_model->editProfile($this->session->userdata('client_id'));
					$this->load->view('client/account', $data); 
					// if method exists
					// call method and pass any parameters we recieved onto it.
					return call_user_func_array(array($this, $method), $params);
				} else {
					// method doesn't exist, show error
					$data['page_name'] = 'dashboard';
						$data['account_info'] = $this->registration_model->myaccount($this->session->userdata('client_id'));
					$data['sch_settings_inf']= $this->registration_model->editsettings($this->session->userdata('client_id')); 
					$data['profile']= $this->registration_model->editProfile($this->session->userdata('client_id'));
					$this->load->view('client/account', $data);
				}
			}
			else{
			  return call_user_func_array(array($this, $method), $params);
			}
		}
	
	public function index(){
		
		$fname = array();
		$lname = array();
		$patient_code = array();
		$mobile = array();
		$email = array();
		$address = array();
		 
		$this->db->where('ti.visit_date',date('Y-m-d'));
		$this->db->select('*')->from('tbl_patient_visits ti')->where('ti.client_id',$this->session->userdata('client_id'));
		$this->db->join('tbl_patient_info pi', 'ti.patient_id = pi.patient_id');
		$this->db->distinct();
		$query = $this->db->get();
		 
		
		if($query->result_array() != false){
			 foreach($query->result_array() as $row){
				 
				 array_push($fname,$row['first_name']);
				 
				  array_push($lname,$row['last_name']);
				   array_push($patient_code,$row['patient_code']);
				 array_push($mobile,$row['mobile_no']);
				 array_push($email,$row['email']);
				  array_push($address,$row['address_line1']);
				 
			 }
		}
		echo count($fname);
		 $str ='';
			 		
			 
		for( $i = 0; $i < count($fname); $i++ ) {
			
			$str .= '<tr>
			<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$fname[$i]. ' '.$lname[$i].'</td>
			<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$patient_code[$i].'</td>
			<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$mobile[$i].'</td>
			<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$email[$i].'</td>
			<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$address[$i].'</td>
		  </tr>
			';
		}
			$header ='
			<table style="font-family: arial, sans-serif;border-collapse: collapse;width: 100%;"> 
			<tr>
				<th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Full name</th>
				<th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Patient Code</th> 
				<th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Mobile</th>
				 <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Email</th>
				  <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Address</th>
			  </tr>';
			  $footer='  
			</table>';
			  $middle = $str;
			  $template = $header.$middle.$footer;
						

		$data['total_rows'] = $query->num_rows();		
		
		print_r($template);
		$this->load->helper('path');
        $this->load->helper('directory'); 
		  $config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.sendgrid.net',
			'smtp_port' => 587,
			'smtp_user' => 'Pavithrakavi', 
			'smtp_pass' => 'trialsendgrid2017', 
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
        );
		
		$this->load->library('email', $config);
        $this->email->set_newline("\r\n");
		 /* $this->email->from('no-reply@physioplustech.com','Physio Plus Tech');
		 $this->email->to('nandinipavithra2017@gmail.com');
	    $this->email->subject('Today Patient Visit - Physio Plus Tech');
		$this->email->message($template);
		$this->email->send(); */
		  
		  
		
	}
	
	public function appointment(){
		
		$email_id = $this->input->post('email');
		
		$data = array(
		'client_id' => $this->session->userdata('client_id'),
		'email' => $this->input->post('email'),
		'date' =>date('Y-m-d H:i:s'),
		);
		$this->db->insert('tbl_clinical_summary',$data);
		
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('clinic_name')->from('tbl_client');
		$req=$this->db->get();
		$clinic_name=$req->row()->clinic_name;
		
		
		$fname = array();
		$lname = array();
		$patient_code = array();
		$mobile = array();
		$email = array();
		$address = array();
		 
		$this->db->select('*')->from('tbl_patient_visits ti')->where('ti.client_id',$this->session->userdata('client_id'));
		$this->db->join('tbl_patient_info pi', 'ti.patient_id = pi.patient_id');
		$this->db->join('tbl_patient_treatment_techniques pt', 'pt.patient_id = pi.patient_id');
		$this->db->where('pt.treatment_date',date('Y-m-d'));
		$this->db->where('ti.visit_date',date('Y-m-d'));
		
		$this->db->distinct();
		$query = $this->db->get();
		 
		
		if($query->result_array() != false){
			 foreach($query->result_array() as $row){
				 
				 array_push($fname,$row['first_name']);
				 
				  array_push($lname,$row['last_name']);
				   array_push($patient_code,$row['patient_code']);
				 array_push($mobile,$row['mobile_no']);
				 array_push($email,$row['email']);
				  array_push($address,$row['address_line1']);
				 
			 }
		}
		
		 $pat ='';
			 		
			 
		for( $i = 0; $i < count($fname); $i++ ) {
			
			$pat .= '<tr>
				<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$fname[$i]. ' '.$lname[$i].'</td>
				<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$patient_code[$i].'</td>
				<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$mobile[$i].'</td>
				<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$email[$i].'</td>
				<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$address[$i].'</td>
			  </tr>
			';
			}
			$pat_header ='<h3>Today\'s Patient List</h3><table style="font-family: arial, sans-serif;border-collapse: collapse;width: 100%;"> 
			<tr>
				<th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Full name</th>
				<th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Patient Code</th> 
				<th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Mobile</th>
				 <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Email</th>
				  <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Address</th>
			  </tr>';
			  $pat_footer='  <tr><td colspan="5"></td></tr>
					<tr> <td></td><td></td><td></td><td></td><td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Total: <b>'.count($fname).' patients</b></td> 
					</tr>   
			</table></br>';
		  $pat_middle = $pat;
		  $pat_template = $pat_header.$pat_middle.$pat_footer;
					
				
		$first_name = array();
		$patient_code = array();
		$start = array();
		$start_date = array();
		$end = array();
		$fname = array();
		$item_name = array();
		
		$client_id = $this->session->userdata('client_id');
		$this->db->where('ai.status','0');
		$this->db->where('ai.client_id',$client_id);
		$this->db->where('appointment_from',date('Y-m-d'));
		$this->db->select('ai.title,ai.start,ai.end,ai.staff_id,ai.item_id,pi.patient_code,pi.patient_id,ti.item_name,st.first_name')->from('tbl_appointments ai');
		$this->db->join('tbl_patient_info pi','pi.patient_id=ai.patient_id');
		$this->db->join('tbl_item ti','ti.item_id=ai.item_id');
		$this->db->join('tbl_staff_info st','st.staff_id=ai.staff_id');
		$res = $this->db->get();
		
		
		if($res->result_array() != false){
			 foreach($res->result_array() as $row){
				 
				 array_push($first_name,$row['title']);
				 array_push($patient_code,$row['patient_code']);
				 array_push($start,date('H:i:s',strtotime($row['start'])));
				 array_push($start_date,date('d-m-Y',strtotime($row['start'])));
				 array_push($end,date('H:i:s',strtotime($row['end'])));
				 array_push($fname,$row['first_name']);
				 array_push($item_name,$row['item_name']);
			 }
		}
		count($first_name);
		
		$str ='';
			 		
			 
		for( $i = 0; $i < count($first_name); $i++ ) {
			
			$str .= '<tr>
    <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$start_date[$i].'</td>
	<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$patient_code[$i].'</td>
	<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$first_name[$i].'</td>
	<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$start[$i].'</td>
	<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$end[$i].'</td>
	<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$fname[$i].'</td>
	<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$item_name[$i].'</td>
	
  </tr>
  
';
}

$header ='<h3>Today\'s Appointment List</h3><table style="font-family: arial, sans-serif;border-collapse: collapse;width: 100%;"> 
<tr>
    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Appointment Date</th>
    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Patient Code</th> 
    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Patient Name</th>
	<th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Start Time</th>
	<th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">End Time</th>
	 <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Consultant Name</th>
	  <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Treatement Item</th>
  </tr>';
  $footer='
  <tr><td colspan="7">&nbsp;</td></tr>
 <tr><td></td><td></td><td></td><td></td><td></td><td></td><td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Total: <b>'.count($first_name).' appointments</b></td> 
        </tr>   
  
</table></br>';
  $middle = $str;
  $template = $header.$middle.$footer;
  
        $date = array();
		$bill_no = array();
		$code = array();
		$name = array();
		$p_mode = array();
		$net_amt = array();
		$paid_amt = array();
		
        $this->db->select('*');
		$this->db->from("tbl_patient_info pi");
		$this->db->join("tbl_invoice_header pv", "pi.patient_id=pv.patient_id");
		$this->db->join("tbl_invoice_payments pt", "pv.bill_id=pt.bill_id");
		$this->db->where('pv.client_id',$this->session->userdata('client_id'));
		$this->db->where('pt.payment_date',date('Y-m-d'));
		$query1 = $this->db->get();
		
		if($query1->result_array() != false){
			 foreach($query1->result_array() as $row){
				 
				 array_push($date,$row['treatment_date']);
				 array_push($bill_no,$row['bill_no']);
				 array_push($code,$row['patient_code']);
				 array_push($name,$row['first_name']);
				 array_push($p_mode,$row['payment_mode']);
				 array_push($net_amt,number_format($row['net_amt'],2,'.',''));
				 array_push($paid_amt,number_format($row['paid_amt'],2,'.',''));
			 }
		}
		$str1 ='';
			 		
			 
		for( $i = 0; $i < count($date); $i++ ) {
			
			$str1 .= '<tr>
    <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$date[$i].'</td>
	<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$bill_no[$i].'</td>
	<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$code[$i].'</td>
	<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$name[$i].'</td>
	<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$p_mode[$i].'</td>
	<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$net_amt[$i].'</td>
	<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$paid_amt[$i].'</td>
  </tr>
';
}
$middle1 = $str1;
$header1 ='<h3>Today\'s Invoice List</h3><table style="font-family: arial, sans-serif;border-collapse: collapse;width: 100%;"> 
<tr>
    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Date</th>
    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Bill no.</th> 
    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Patient Id</th>
	<th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Patient name</th>
	<th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Payment mode</th>
	 <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Bill amount</th>
	  <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Paid amount</th>
  </tr>';
  $footer1='<tr><td colspan="8">&nbsp;</td></tr>
<tr> 
            
          <td></td><td></td><td></td><td></td><td></td><td></td><td  style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Total: <b>'.count($date).' invoices</b></td> 
        </tr>   
</table>';
		$template1 = $header1.$middle1.$footer1;
		
				$date1 = array();
		$bill_no1 = array();
		$vendor = array();
		$tot_amt = array();
		
		
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('*')->from('tbl_expanse')->where('client_id', $this->session->userdata('client_id'));
		$this->db->group_by('bill_no');
		$this->db->where('bill_date',date('Y-m-d'));
		$expense = $this->db->get();
		
		
		if($expense->result_array() != false){
			 foreach($expense->result_array() as $row){
				 
				 array_push($date1,$row['bill_date']);
				 array_push($bill_no1,$row['bill_no']);
				 array_push($vendor,$row['ventor']);
				 array_push($tot_amt,$row['total_amt']);
				 
			 }
		}
 
       $expe1 ='';
			 		
			 
		for( $i = 0; $i < count($date1); $i++ ) {
			
			$expe1 .= '<tr>
    <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$date1[$i].'</td>
	<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$bill_no1[$i].'</td>
	<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$vendor[$i].'</td>
	<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$tot_amt[$i].'</td>

  </tr>
';
}
 
 
 $exp_middle = $expe1;
$exp_middle_h ='<h3>Today\'s Expense List</h3><table style="font-family: arial, sans-serif;border-collapse: collapse;width: 100%;"> 
<tr>
    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Date</th>
    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Bill no.</th> 
    <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Vendor</th>
	<th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Total Amount</th>

  </tr>';
  $exp_middle_f='<tr><td colspan="4">&nbsp;</td></tr>
<tr> 
            
          <td></td><td></td><td></td><td  style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Total: <b>'.count($date1).' expenses</b></td> 
        </tr>   
</table>';

 		$template2 = $exp_middle_h.$exp_middle.$exp_middle_f;
		
		$message = $pat_template.$template.$template1.$template2;
	  print_r($message);
	  
	  $this->load->helper('path');
        $this->load->helper('directory'); 
		  $config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.sendgrid.net',
			'smtp_port' => 587,
			'smtp_user' => 'Pavithrakavi', 
			'smtp_pass' => 'trialsendgrid2017', 
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
        );
		
		$this->load->library('email', $config);
        $this->email->set_newline("\r\n");
		$this->email->from('no-reply@physioplustech.com','Physio Plus Tech');
		$this->email->to($email_id);
	    $this->email->subject($clinic_name.' '.'Today List');
		$this->email->message($message);
		$this->email->send();
		  
	}
	
	public function report(){
		$data['page_name'] ='reports';
		
		if($this->uri->segment(4) != false ){ 
			$data['invoices'] = $this->common_model->search_incomestat1();
		    $data['advances'] = $this->common_model->search_incomeadvance();
		}
		else {
			$data['invoices']="";
			$data['advances'] ="";
		}
		$data['patient_name']=$this->common_model->getPatientname();
		$data['consultants'] = $this->common_model->getDoctorname();
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$data['provDiagList']=$this->common_model->getProvdiagList();
		
		
		/* $this->db->select('*')->from('tbl_patient_visits ti')->where('ti.client_id',$this->session->userdata('client_id'));
		$this->db->join('tbl_patient_info pi', 'ti.patient_id = pi.patient_id');
		$this->db->join('tbl_patient_treatment_techniques pt', 'pt.patient_id = pi.patient_id');
		$this->db->where('pt.treatment_date',date('Y-m-d'));
		$this->db->where('ti.visit_date',date('Y-m-d')); */
		$this->db->select('*')->from('tbl_patient_info')->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('appoint_date',date('Y-m-d'));
		$this->db->distinct();
		$query = $this->db->get();
		$config['total_rows'] = $query->num_rows();
		$data['pat_rows'] = $query->num_rows();	
		$data['result']=$query->result_array();
		
		$this->db->select('*');
		$this->db->from("tbl_session_det");
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('sn_date',date('Y-m-d'));
		$result = $this->db->get();
		$data['session']=$result->result_array();
		
		$client_id = $this->session->userdata('client_id');
		$this->db->where('ai.status','0');
		$this->db->where('ai.client_id',$client_id);
		$this->db->where('appointment_from',date('Y-m-d'));
		$this->db->select('ai.title,ai.start,ai.end,ai.staff_id,ai.item_id,pi.patient_code,pi.patient_id,ti.item_name,st.first_name')->from('tbl_appointments ai');
		$this->db->join('tbl_patient_info pi','pi.patient_id=ai.patient_id');
		$this->db->join('tbl_item ti','ti.item_id=ai.item_id');
		$this->db->join('tbl_staff_info st','st.staff_id=ai.staff_id');
		$res = $this->db->get();
		$config['total_rows'] = $res->num_rows();
		$data['app_rows'] = $res->num_rows();	
		$data['app']=$res->result_array();
		
		
		$this->db->select('*');
		$this->db->from("tbl_patient_info pi");
		$this->db->join("tbl_invoice_header pv", "pi.patient_id=pv.patient_id");
		$this->db->join("tbl_invoice_payments pt", "pv.bill_id=pt.bill_id");
		$this->db->where('pv.client_id',$this->session->userdata('client_id'));
		$this->db->where('pt.payment_date',date('Y-m-d'));
		$this->db->order_by("pv.bill_id", "desc");
		$query1 = $this->db->get();
		$config['total_rows'] = $query1->num_rows();
		$data['inv_rows'] = $query1->num_rows();	
		$data['invoice']=$query1->result_array();
			
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('*')->from('tbl_expanse')->where('client_id', $this->session->userdata('client_id'));
		$this->db->where('bill_date',date('Y-m-d'));
		$this->db->group_by('bill_no');
		$expense = $this->db->get();
		$data['exp_rows'] = $expense->num_rows();	
		$data['T_expense'] = $expense->result_array();
		
		
		$this->db->select('SUM(pv.paid_amt) AS pamount');
		$this->db->from("tbl_patient_info pi");
		$this->db->join("tbl_invoice_header pv", "pi.patient_id=pv.patient_id");
		$this->db->join("tbl_invoice_payments pt", "pv.bill_id=pt.bill_id");
		$this->db->where('pv.client_id',$this->session->userdata('client_id'));
		$this->db->where('pt.payment_date',date('Y-m-d'));
		$query2 = $this->db->get();
		$data['T_incomeAmt'] = $query2->row()->pamount;
		
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('SUM(item_amount) AS amount')->from('tbl_expanse')->where('client_id', $this->session->userdata('client_id'));
		$this->db->where('bill_date',date('Y-m-d'));
		$query = $this->db->get();
		$data['T_expenseAmt'] = $query->row()->amount;
		
		$this->load->view('client/clinical_summary',$data); 
		
	}
	public function email(){
		$data['page_name'] ='reports';
		$this->load->view('client/clinical_summary_email',$data);
		
	}
	public function report_print(){
		$data['page_name'] ='reports';
		$c_id = $this->session->userdata('client_id');
		$data['clientDetails'] = $this->registration_model->editProfile($c_id);
		/* $this->db->select('*')->from('tbl_patient_visits ti')->where('ti.client_id',$this->session->userdata('client_id'));
		$this->db->join('tbl_patient_info pi', 'ti.patient_id = pi.patient_id');
		$this->db->join('tbl_patient_treatment_techniques pt', 'pt.patient_id = pi.patient_id');
		$this->db->where('pt.treatment_date',date('Y-m-d'));
		$this->db->where('ti.visit_date',date('Y-m-d')); */
		$this->db->select('*')->from('tbl_patient_info')->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('appoint_date',date('Y-m-d'));
		$this->db->where('home_visit',1);
		$this->db->distinct();
		$query = $this->db->get();
		$config['total_rows'] = $query->num_rows();
		$data['pat_rows'] = $query->num_rows();	
		$data['result']=$query->result_array();
		
		$client_id = $this->session->userdata('client_id');
		$this->db->where('ai.status','0');
		$this->db->where('ai.client_id',$client_id);
		$this->db->where('appointment_from',date('Y-m-d'));
		$this->db->select('ai.title,ai.start,ai.end,ai.staff_id,ai.item_id,pi.patient_code,pi.patient_id,ti.item_name,st.first_name')->from('tbl_appointments ai');
		$this->db->join('tbl_patient_info pi','pi.patient_id=ai.patient_id');
		$this->db->join('tbl_item ti','ti.item_id=ai.item_id');
		$this->db->join('tbl_staff_info st','st.staff_id=ai.staff_id');
		$res = $this->db->get();
		$config['total_rows'] = $res->num_rows();
		$data['app_rows'] = $res->num_rows();	
		$data['app']=$res->result_array();
		
		$this->db->select('*');
		$this->db->from("tbl_session_det");
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('sn_date',date('Y-m-d'));
		$result = $this->db->get();
		$data['session']=$result->result_array();
		
		$this->db->select('*');
		$this->db->from("tbl_patient_info pi");
		$this->db->join("tbl_invoice_header pv", "pi.patient_id=pv.patient_id");
		$this->db->join("tbl_invoice_payments pt", "pv.bill_id=pt.bill_id");
		$this->db->where('pv.client_id',$this->session->userdata('client_id'));
		$this->db->where('pt.payment_date',date('Y-m-d'));
		$query1 = $this->db->get();
		$config['total_rows'] = $query1->num_rows();
		$data['inv_rows'] = $query1->num_rows();	
		$data['invoice']=$query1->result_array();
			
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('*')->from('tbl_expanse')->where('client_id', $this->session->userdata('client_id'));
		$this->db->where('bill_date',date('Y-m-d'));
		$this->db->group_by('bill_no');
		$expense = $this->db->get();
		$data['exp_rows'] = $expense->num_rows();	
		$data['T_expense'] = $expense->result_array();
		
		$this->db->select('SUM(pv.paid_amt) AS pamount');
		$this->db->from("tbl_patient_info pi");
		$this->db->join("tbl_invoice_header pv", "pi.patient_id=pv.patient_id");
		$this->db->join("tbl_invoice_payments pt", "pv.bill_id=pt.bill_id");
		$this->db->where('pv.client_id',$this->session->userdata('client_id'));
		$this->db->where('pt.payment_date',date('Y-m-d'));
		$query2 = $this->db->get();
		$data['T_incomeAmt'] = $query2->row()->pamount;
		
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('SUM(item_amount) AS amount')->from('tbl_expanse')->where('client_id', $this->session->userdata('client_id'));
		$this->db->where('bill_date',date('Y-m-d'));
		$query = $this->db->get();
		$data['T_expenseAmt'] = $query->row()->amount;
		$data['T_patientCount'] = $this->patient_model->patient_count();
		$data['T_result'] = $this->patient_model->get_today_pat_list();
		$data['tot_list_home'] = $this->patient_model->get_tot_home_list();
		$this->load->view('client/clinical_summary_print',$data);
	}
	
	public function export_summary(){
		$this->load->library('export');
		$data['page_name'] = 'staff';
		$segment_array = $this->uri->segment_array();
		
		$search=str_replace('%20',' ',$this->uri->segment(4));
		$search1=str_replace('%20',' ',$this->uri->segment(5));
		$search2=str_replace('%20',' ',$this->uri->segment(6));
		if($search == 'date'){
			$this->db->where('payment_date >=',date('Y-m-d',strtotime($search1)));
			$this->db->where('payment_date <=',date('Y-m-d',strtotime($search2)));
			$this->db->where('client_id',$this->session->userdata('client_id'));
		    $this->db->select('payment_mode,SUM(paid_amt)as total')->from('tbl_invoice_payments');
			$this->db->group_by('payment_mode');
		}
			else {
		     
			}
		
		$query=$this->db->get();
		$this->export->to_excel($query, 'summary_report');
		} 
}