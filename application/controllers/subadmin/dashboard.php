<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
     public function __construct() {
		parent::__construct();
		
		$this->load->model(array('subadmin_model'));
	 }
	 
	  public function client_list(){
       header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	  if($this->session->userdata('username') != false) {
		
		$data['page_name'] = 'home';
		
		
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 15;
		$where_condition = '';
		
		
		//do searchby
		
		 
		//Count
		
		$this->db->select('count(*) as totalrows')->from('tbl_client');
		
		
		if($this->uri->segment(4) == 'search'){
			$this->db->where('client_id',$this->uri->segment(5));
		}
		
		if($this->uri->segment(4) == 'city'){
			$this->db->like('city',$this->uri->segment(5));
		}
		
		
		
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		 
		
		$this->db->select('client_id,username,password,email_verified,first_name,last_name,clinic_name,address,city,state,mobile,phone,last_login_date,plan,plan_id');
		$this->db->from("tbl_client");
		
		
		if($this->uri->segment(4) == 'search'){
			$this->db->where('client_id',$this->uri->segment(5));
		}
		if($this->uri->segment(4) == 'city'){
			$this->db->like('city',$this->uri->segment(5));
		}
		
		
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
		$this->db->order_by('client_id','desc');
		$query = $this->db->get();
		$data['client'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		if($data['client'] != false) {
			$data['showTable'] = true;
		} else { 
			$data['showTable'] = false;
		}
		
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
		$data["pagination"] = $this->pagination->create_links();
		$str_links = $this->pagination->create_links();	
		$data["links"] = explode('<li>',$str_links);
				
		$data['current_page_segment'] = $current_page_segment;
		$status = "home";
		$data['client_name']=$this->subadmin_model->getClients();	
		$this->load->view('subadmin/client_list',$data);
	  }
	  else{
			redirect(base_url()."subadmin/login", "refresh"); 
		 }
	 }
	 
	 public function index(){
       header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	  if($this->session->userdata('username') != false) {
		
		$data['page_name'] = 'home';
		
		
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 15;
		$where_condition = '';
		
		
		//do searchby
		
		 
		//Count
		
		$this->db->select('count(*) as totalrows')->from('tbl_client t1');
			$this->db->join("tbl_validity t2", "t1.client_id=t2.client_id");
			$this->db->where('t2.duration !=',0);
			$this->db->where('t1.plan !=',0);
			$this->db->where('t1.plan !=',5);
		
		if($this->uri->segment(4) == 'search'){
			$this->db->where('t1.client_id',$this->uri->segment(5));
		}
		if($this->uri->segment(4) == 'city'){
			$this->db->like('t1.city',$this->uri->segment(5));
		}
		
		
		
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		 
		$this->db->select('t1.client_id,t1.created_on,t1.username,t1.password,t1.first_name,t1.last_name,t1.email_verified,t1.clinic_name,t1.address,t1.city,t1.state,t1.mobile,t1.phone')->from("tbl_client t1");
			$this->db->join("tbl_validity t2", "t1.client_id=t2.client_id");
		
		if($this->uri->segment(4) == 'search'){
			$this->db->where('t1.client_id',$this->uri->segment(5));
		}
		if($this->uri->segment(4) == 'city'){
			$this->db->like('t1.city',$this->uri->segment(5));
		}
		
		$this->db->where('t2.duration !=',0);
			$this->db->where('t1.plan !=',0);
			$this->db->where('t1.plan !=',5);
		
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
		$this->db->order_by('t2.client_id','desc');
		$query = $this->db->get();
		$data['client'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		if($data['client'] != false) {
			$data['showTable'] = true;
		} else { 
			$data['showTable'] = false;
		}
		
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
		$data["pagination"] = $this->pagination->create_links();
		$str_links = $this->pagination->create_links();	
		$data["links"] = explode('<li>',$str_links);
				
		$data['current_page_segment'] = $current_page_segment;
		$status = "home";
		$data['client_name']=$this->subadmin_model->getClientname();	
		$this->load->view('subadmin/index',$data);
	  }
	  else{
			redirect(base_url()."subadmin/login", "refresh"); 
		 }
	 }
	 
	 
	 public function activate($client_id)
	 {  header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	  if($this->session->userdata('username') != false) {
	  
		$this->db->select('client_id,username,first_name,last_name');
		$this->db->from("tbl_client");
		$this->db->where("client_id",$client_id);
		$query = $this->db->get();
		$data['team_cname'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		
		$this->db->select('client_id,duration,num_users,num_location');
		$this->db->from("tbl_validity");
		$this->db->where("client_id",$client_id);
		$query = $this->db->get();
		$data['team_det'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		
		$this->db->select('client_id,sms_count,total_sms_limit,first_name,email_verified');
		$this->db->from("tbl_client")/* ->where('status',1) */;
		$this->db->where("client_id",$client_id);
		$query = $this->db->get();
		$data['sms_det'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		
		$this->load->view('subadmin/index_edit',$data);
	  }else{
			redirect(base_url()."subadmin/login", "refresh"); 
		 }
	}
	
	
	public function account_activation(){
		header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	  if($this->session->userdata('user_name') != false) {
		$client_id = $this->input->post('client_id');
		
		
		$this->db->select('client_id,duration');
		$this->db->from("tbl_validity");
		$this->db->where("client_id",$client_id);
		$query = $this->db->get();
		$dur = $query->row()->duration;
		
		$plan = $this->input->post('plan_type');
		$duration = $this->input->post('duration');
		$dura1 =$dur + $duration;
		$date = date('Y-m-d', strtotime("+".$dura1  ."days"));
			$data=array(
			'plan_id' => $plan,
			'plan' => $plan
			);
			$this->db->where('client_id',$client_id);
			$this->db->update("tbl_client",$data);
		
		$data=array(
		'duration' => $dura1,
		'plan_type' => $plan,
		'expire_date' => $date 
		);
		$this->db->where('client_id',$client_id);
		$this->db->update("tbl_validity",$data);
		
		$this->db->where('client_id',$client_id);
		$this->db->select('plan')->from('tbl_client_history');
		$res = $this->db->get();
		if($res->result_array() != false){
		$data1=array(
			'create_date' => date('Y-m-d'),
			'plan' => $plan,
			'expire_date' => $date 
		);
		$this->db->where('client_id',$client_id);
		$this->db->update("tbl_client_history",$data1);
		} else {
			$data1=array(
			'client_id' => $client_id,
			'users' => 1,
			'locations' => 1,
			'create_date' => date('Y-m-d'),
			'plan' => $plan,
			'expire_date' => $date 
			);
			$this->db->insert("tbl_client_history",$data1);
		}
		
		
		$this->db->select('*')->from('tbl_client');
		$this->db->where('client_id',$client_id);
		$query = $this->db->get();
		//$name = $query->row()->first_name;
		$clinic_name = $query->row()->clinic_name;
		$city = $query->row()->city;
		$mobile = $query->row()->mobile;
		$email = $query->row()->username;
		$name = $query->row()->first_name;
		
		$user = $this->session->userdata('mail');
		//echo $user;

		 if($plan == 1){
			 $plan_det = 'Professional Plan';
		 }
		 else if($plan == 2){
			$plan_det = 'Monetary Plan';
		 }
		 else if($plan == 3){
			$plan_det ='Enterprize Plan';
		 }
		 else if($plan == 4){
			$plan_det = 'Ultimateprescriber Plan';
		 }
		 else if($plan == 5){
			 $plan_det = 'Institute plan';
		 }
		  $this->load->library('email');
		 $this->email->initialize(array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'smtp.sendgrid.net',
		  'smtp_user' => 'physiotechasia',
		  'smtp_pass' => 'Physioasia@2019',
		  'smtp_port' => 587,
		  'crlf' => "\r\n",
		  'newline' => "\r\n",
		  'mailtype'=> 'html'
		));
		$this->email->from('no-reply@physioplustech.com', 'Physio Plus Tech');
		$template='
		<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="background-color: #e4e7e0;"> 
<tbody>
<tr> 
<td width="100%"> 
<table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: 0 auto; padding: 0;" class="mobile">
 <tbody>
 <tr>
 <td width="100%"> 
 <table width="100%" cellspacing="0" cellpadding="0" border="0">
 <tbody>
 <tr>
 <td style="padding: 5px 0; color: #000000; font-family: Arial,Helvetica,sans-serif; font-size: 11px; font-weight: light; line-height: 15px;">
 Account Activation </td> 
 </tr> 
 </tbody>
 </table> 
 <table width="100%" cellspacing="0" cellpadding="0" border="0"> 
 <tbody>
 <tr> 
 <td width="45%" style="padding: 7px 0; background-color: #343135;" class="mobile"> 
 <table width="100%" cellspacing="0" cellpadding="0" border="0"> 
 <tbody>
 <tr> 
 <td align="center" style="font: 26px impact; color: #fff;">Physio Plus Tech
 <!--<img width="174" height="34" border="0" style="display: block;" alt="Logo" src="logo.png" class="imageScale">-->
 </td>
 </tr> 
 </tbody>
 </table>
 </td>
 <td width="55%" class="mobile_hide"> 
 <table width="100%" cellspacing="0" cellpadding="0" border="0">
 <tbody>
 <tr>
<td style="padding: 2px 15px; background-color: #23a6bd; color: #ffffff; font-family: Impact; font-size: 25px; line-height: 29px;">WELCOME</td>
 </tr> 
 </tbody>
 </table> 
 </td>
 </tr> 
 </tbody>
 </table> 
 <table width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff; padding: 20px 0 10px 0;"> 
 <tbody>
 <tr> 
 <td class="mobile"> 
 <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding: 15px 0 0 0;">
 <tbody>
 <tr>
 <td style="padding: 0 20px; font-family: Arial,Helvetica,sans-serif;">
 <div style="color: #130f0e; font-size: 14px; font-weight: bold; line-height: 21px; text-align: left;">Dear '. $name .',</div>
 <br> <div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;"></div><br> 
 <div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">Your Account Has Been Activated for '.$duration.' Days</div><br> 
 <div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;">Kindly, check it. </div><br> <div style="color: #130f0e; font-size: 14px; line-height: 20px; text-align: left;"> </div><br> 
 </td>
 </tr> </tbody></table>
 </td> </tr>
 </tbody>
 </table> 
 <table width="100%" cellspacing="0" cellpadding="0" border="0"> 
 <tbody><tr> <td width="100%" style="font-size: 10px;">&nbsp;</td> </tr> 
 </tbody></table> 
 <table width="100%" cellspacing="0" cellpadding="0" border="0" style="padding-bottom: 14px;"> 
 <tbody><tr> <td width="30%" style="padding: 10px 0; background-color: #343135;" class="mobile"> 
 <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> 
 <td align="center" style="padding: 0 7px;"><a target="_blank" href="#">
 <img width="29" height="30" border="0" style="display: block;" alt="Facebook" src="'. base_url() .'img/facebook.png"></a></td> 
 <td align="center"><a target="_blank" href="#"><img width="29" height="30" border="0" style="display: block;" alt="Twitter" src="'. base_url() .'img/twitter.png"></a></td> 
 <td align="center" style="padding: 0 7px;"><a target="_blank" href="#"><img border="0" style="display: block;" alt="Envelope" src="'. base_url() .'img/envelope.png"></a></td> <td align="center" style="padding-right: 7px;"></td> </tr> </tbody></table> </td> 
 <td width="70%" style="padding: 10px 0; background-color: #343135;" class="mobile_hide"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="padding-right: 10px; padding-left: 7px; color: #ffffff; font-family: Arial,Helvetica,sans-serif; font-size: 10px; line-height: 14px; text-align: left;">
 You have received this email cause you have subscribed to Physio plus tech<br> &copy; 2013 Your Company</td> </tr> </tbody></table> </td> </tr> </tbody></table> </td> </tr> </tbody></table></td> </tr> </tbody></table>
		';
		$this->email->to($email);
		$this->email->subject('Account Activation');
		$this->email->message($template);
		$this->email->send();
		
         $this->load->library('email');
		 $this->email->initialize(array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'smtp.sendgrid.net',
		  'smtp_user' => 'physiotechasia',
		  'smtp_pass' => 'Physioasia@2019',
		  'smtp_port' => 587,
		  'crlf' => "\r\n",
		  'newline' => "\r\n",
		  'mailtype'=> 'html'
		));
		$this->email->from('no-reply@physioplustech.com', 'Physio Admin Sub Admin');
		$template='
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="570px" align="center">
									<tr>
										<td align="center">
											<img style="float:left;style:width:282px;height:180px;" src="https://www.physioplustech.in/images/physio-tech.png" >
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
													<td>
														<h1 style=" font-size:24px; color:#666; padding-left:25px;">Hello Admin,</h1>
														
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">Account Activated By : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;"> '.$user.'</span></p>
														
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">Client Name : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;"> '.$name.'</span></p>
														<p style="color:#666;padding-left:25px;font-size:120%">Clinic Name  : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$clinic_name.'</span></p>
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">Plan name  : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$plan_det.'</span></p>
														<p style="color:#666;padding-left:25px;font-size:120%">Duration:  <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$duration.'</span></p>
													</td>
												</tr>
												
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">City : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$city.'</span></p>
														<p style="color:#666;padding-left:25px;font-size:120%">Mobile  : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$mobile.'</span></p>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://physioplustech.com/"> www.physioplustech.com</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>
		';
		$this->email->to('contact@physioplusnetwork.com');
		$this->email->subject('Physio Admin Account Activated from Subadmin');
		$this->email->message($template);
		$this->email->send();
		
		
	  }
	   else{
			redirect(base_url()."subadmin/login", "refresh"); 
		 }
	}
	
	public function sms_activation()
	{
		header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	  if($this->session->userdata('username') != false) {
		$client_id = $this->input->post('client_id');	
		$this->db->select('t2.client_id,t2.total_sms_limit');
		$this->db->from("tbl_client t2");
		$this->db->where('client_id',$client_id);
		$query = $this->db->get();
		$limit = $query->row()->total_sms_limit;
		$sms = $this->input->post('sms_count');
		$val = $limit + $this->input->post('sms_count');
		$this->db->where('client_id',$client_id);
		$this->db->set('total_sms_limit', $val);
		$this->db->update('tbl_client');
		
		$this->db->select('*')->from('tbl_client');
		$this->db->where('client_id',$client_id);
		$query = $this->db->get();
		$name = $query->row()->username;
		$clinic_name = $query->row()->clinic_name;
		$city = $query->row()->city;
		$mobile = $query->row()->mobile;
		
		$user = $this->session->userdata('mail');
		
		 $this->load->library('email');
		 $this->email->initialize(array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'smtp.sendgrid.net',
		  'smtp_user' => 'physiotechasia',
		  'smtp_pass' => 'Physioasia@2019',
		  'smtp_port' => 587,
		  'crlf' => "\r\n",
		  'newline' => "\r\n",
		  'mailtype'=> 'html'
		));
		$this->email->from('no-reply@physioplustech.com', 'Physio Sub Admin');
		$template='
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="570px" align="center">
									<tr>
										<td align="center">
											<img style="float:left;" src="http://physioplustech.com/img/logo.png">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
													<td>
														<h1 style=" font-size:24px; color:#666; padding-left:25px;">Hello Admin,</h1>
														
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">Account Activated By : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;"> '.$user.'</span></p>
														
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">Client Name : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;"> '.$name.'</span></p>
														<p style="color:#666;padding-left:25px;font-size:120%">Clinic Name  : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$clinic_name.'</span></p>
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">SMS Limit : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;"> '.$sms.'</span></p>
													
													</td>
												</tr>
												
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">City : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$city.'</span></p>
														<p style="color:#666;padding-left:25px;font-size:120%">Mobile  : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$mobile.'</span></p>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://physioplustech.com/"> www.physioplustech.com</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>
		';
		 $this->email->to('contact@physioplusnetwork.com');
		$this->email->subject('Physio Sub Admin SMS Activate');
		$this->email->message($template);
		$this->email->send(); 
		
		
		$response = array();
		if($client_id != false)
		{
			$response['status'] = 'success';
			$response['message'] = 'Invoice details has been added successfully.';
		} else {
			$response['status'] = 'failure';
			$response['message'] = 'Invoice details has been added successfully.';
		}
		echo json_encode($response);
		
	  }
	  else{
			redirect(base_url()."subadmin/login", "refresh"); 
		 }
	 }
	
	
	public function client_print(){
		 header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	   
		if($this->session->userdata('username') != false) {
		$id = $this->uri->segment(4);
		$data['page_name'] = 'home';
		$data['result'] = $this->subadmin_model->getclient($id);
		$this->load->view('subadmin/index_print',$data);
		}
	  else{
			redirect(base_url()."subadmin/login", "refresh"); 
		 } 
	}
	
	public function usage_list(){
		header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
	      if($this->session->userdata('username') != false) {
	        $data['pagename'] = 'home';
		   	$data['count'] = $this->subadmin_model->admin_count();
			$data['count1'] = $this->subadmin_model->staff_count();
			$data['count2'] = $this->subadmin_model->patient_count();
			$data['count3'] = $this->subadmin_model->appointment_count();
			$data['count4'] = $this->subadmin_model->billing_count();
			$data['count5'] = $this->subadmin_model->referral_count();
			$data['count6'] = $this->subadmin_model->exercise_count();
		    $this->load->view('subadmin/usage_list',$data);
		  } else {
			  redirect(base_url()."subadmin/login", "refresh"); 
		  }
	}
	
	
	public function logout(){
		$data = array('username' => 0,'password' => 0);
		$this->session->sess_destroy();
		$this->session->unset_userdata($data);
		redirect(base_url()."subadmin/login");
	}
	
	public function send_mail(){
		 $client_id = $this->uri->segment(4);
		 $this->subadmin_model->send_mail($_POST['p_id']);
		 //redirect(base_url().'subadmin/dashboard/client_list', 'refresh');
	 }
	 
}

	 
	 