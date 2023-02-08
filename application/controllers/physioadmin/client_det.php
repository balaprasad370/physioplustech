<?php 
/** File name   : dashboard.php
*	Author      : Muthukumar
*	Date        : 27th Mar 2013
*	Description : Controller for physioplus client dashboard.
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_det extends CI_Controller {  
	
	public function __construct() {
		parent::__construct();
		$this->load->model(array('admin','user_model','physioadmin_model'));
	}
	
	// redirect index method to home
	public function index() {
		$this->load->view('client/patient_information');
	}
	
	//referal view
	public function view()
	{  header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	   if($this->session->userdata('user_name') != false) {
	        $data['page_name'] = 'home';
		    $data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
			$this->load->helper(array('form'));
			$this->load->library("pagination");
			$segment_array = $this->uri->segment_array();
			
			//Pagination
			$config['per_page'] = 15;
			$where_condition = '';
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
			
			$this->db->select('t1.mobile,t1.status,t1.client_id,t1.created_on,t1.username,t1.password,t1.first_name,t1.last_name,t2.expire_date,t1.last_login_date')->from("tbl_client t1");
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
			$data['active_user'] = ($query->num_rows() > 0) ? $query->result_array() : false;
			
			
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
			$status="view";
			$data['client_name']=$this->user_model->getClientname($status);
			
			$this->load->view('physioadmin/active_user',$data);
	  
	   } else {
		   redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		
	   }
		
	}
	
	public function sms_count()
	{
		
		header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	  if($this->session->userdata('user_name') != false) {
		$data['page_name'] = 'home';
		// load default view
		$data['pagename'] = 'home';
		/*$data['back'] = base64_encode(end(explode("/index.php/",$_SERVER['PHP_SELF'])));*/
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 15;
		$where_condition = '';
		
		
		//do searchby
		$do_searchby = array_search("searchby",$segment_array);
		if($do_searchby != false) {
			$data['searchFilter']=true;
			$keyword = urldecode($this->uri->segment($do_searchby+1));
			$keyword = str_replace('_', '/', $keyword);
			$where_condition = "(username LIKE '%".$keyword."%')";
			$data['keyword'] = $keyword;
		}
		 
		//Count
		$where_condition = ($where_condition != '') ? $where_condition : '';
		$this->db->select('count(*) as totalrows')->from('tbl_client');
		$this->db->where("status",1);
		if($this->session->userdata('user_id')=='2'){
			$this->db->where('city','New Delhi');
		}
		if($this->session->userdata('user_id')=='3'){
			$this->db->where('city','mumbai');
		}
		if($this->session->userdata('user_id')=='4'){
			$this->db->where('city','jaipur');
			$this->db->or_where('city','udaipur');
			$this->db->or_where('city','jodhpur');
		}
		if($this->session->userdata('user_id')=='5'){
			$this->db->where('state','Telangana');
		}
		$this->db->where('plan_id !=',5);
		if($where_condition!='') $this->db->where($where_condition);
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->select('client_id,created_on,username,sms_count,total_sms_limit');
		$this->db->from("tbl_client")->where('status',1);
		if($this->session->userdata('user_id')=='2'){
			$this->db->where('city','New Delhi');
		}
		if($this->session->userdata('user_id')=='3'){
			$this->db->where('city','mumbai');
		}
		if($this->session->userdata('user_id')=='4'){
			$this->db->where('city','jaipur');
			$this->db->or_where('city','udaipur');
			$this->db->or_where('city','jodhpur');
		}
		if($this->session->userdata('user_id')=='5'){
			$this->db->where('state','Telangana');
		}
		$this->db->where('plan_id !=',5);
		if($this->uri->segment(4) == 'search'){
			$this->db->where('client_id',$this->uri->segment(5));
		}
		if($where_condition!='') $this->db->where($where_condition);
						
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
		$data['sms_count'] = ($query->num_rows() > 0) ? $query->result_array() : false;
				
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
		$status='home';	
		$data['client_name']=$this->user_model->getClientname($status);	
		$this->load->view('physioadmin/sms_count',$data);
	  }
	  else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	
	public function deactive_user()
	{
		header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	  if($this->session->userdata('user_name') != false) {
	  
		$data['page_name'] = 'home';
		// load default view
		$data['pagename'] = 'home';
		/*$data['back'] = base64_encode(end(explode("/index.php/",$_SERVER['PHP_SELF'])));*/
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		$config['per_page'] = 15;
		$where_condition = '';
		$do_searchby = array_search("searchby",$segment_array);
		if($do_searchby != false) {
			$data['searchFilter']=true;
			$keyword = urldecode($this->uri->segment($do_searchby+1));
			$keyword = str_replace('_', '/', $keyword);
			$where_condition = "(t2.username LIKE '%".$keyword."%')";
			$data['keyword'] = $keyword;
		}
		
		//Count
		$where_condition = ($where_condition != '') ? $where_condition : '';
		$this->db->select('count(*) as totalrows')->from('tbl_client t2');
		$this->db->where('t2.status',0);
		if($where_condition!='') $this->db->where($where_condition);
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->select('t2.client_id,t2.username,t2.status,t1.expire_date');
		$this->db->from("tbl_client t2");
		$this->db->join("tbl_validity t1", "t1.client_id=t2.client_id");
		$this->db->where('t2.status',0);
		//$this->db->where('t1.duration', 'NULL');
		if($where_condition!='') $this->db->where($where_condition);
						
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
		$this->db->order_by('t2.client_id','dsesc');
		$query = $this->db->get();
		$data['deactive_user'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		
		
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
				
		
			
		$this->load->view('physioadmin/plan',$data);
	  }
	  else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	
	public function plan_edit($client_id)
	{
		header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	  if($this->session->userdata('user_name') != false) {
		//$this->load->helper('url');
		//$client_id = $this->uri->segment(2);
		$this->db->select('t2.client_id,t2.created_on,t2.username,t2.first_name,t2.last_name,t1.client_id,t1.expire_date');
		$this->db->from("tbl_client t2");
		$this->db->join("tbl_validity t1", "t1.client_id=t2.client_id");
		$this->db->where("t2.client_id",$client_id);
		$query = $this->db->get();
		$data['plan_det'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		$this->load->view('physioadmin/plan_edit',$data);
	  }
	   else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	
	public function sms_update()
	{
		header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	  if($this->session->userdata('user_name') != false) {
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
		

                //changed for order history
		$this->db->where('client_id',$client_id);
		$this->db->select('*')->from('tbl_validity');
		$res = $this->db->get();
		$dur = $res->row()->duration;
		$plan_ty=$res->row()->plan_type;
		$created=$res->row()->created_date;
		$expire=$res->row()->expire_date;
		
		$smsamt=0;
		if($sms=="10000")
		{
			$smsamt=3100;
		}
		else if($sms=="5000")
		{
			$smsamt=1750;
		}
		else if($sms=="2000")
		{
			$smsamt=780;
		}
		else if($sms=="1000")
		{
			$smsamt=430;
		}
		else if($sms=="400")
		{
			$smsamt=188;
		}
		else if($sms=="200")
		{
			$smsamt=102;
		}
		
		$data_order_det=array(
		'client_id' => $client_id,
		'plan_type'=>$plan_ty,
		'duration'=>$dur,
		'created_date'=>$created,
		'expire_date'=>$expire,
		'sms'=>$smsamt,
		'pay_amount'=>$smsamt,
		'tot_pay_amount'=>$smsamt,
		'order_description'=>"SMS Upgrade"
		);
		
		$this->db->insert("tbl_order_details",$data_order_det);



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
		$this->email->from('no-reply@physioplustech.com', 'Physio Admin');
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
		$this->email->subject('Physio Admin SMS Activate');
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
		redirect(base_url().'physioadmin/client_det/sms_count/search/'.$client_id);
	  }
	  else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	 }
	
	public function paln_save()
	{
		$response = array();
		$client_id = $this->input->post('client_id');
		if($query = $this->admin->plan_change($client_id))
		{
			$response['status'] = 'success';
			$response['message'] = 'Plan has been added successfully.';
		}else{
			$response['status'] = 'failure';
			$response['message'] = 'Plan has been added successfully.';
		}
		//echo json_encode($response);
		return $response;
	}
	
	public function sms_edit($client_id)
	{ 
	  header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	  if($this->session->userdata('user_name') != false) {
		$this->db->select('client_id,created_on,username,sms_count,total_sms_limit,first_name,last_name');
		$this->db->from("tbl_client")->where('status',1);
		$this->db->where("client_id",$client_id);
		$query = $this->db->get();
		$data['sms_det'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		$this->load->view('physioadmin/sms_edit',$data);
	}
	else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	
	public function sms_save()
	{
		$response = array();
		$client_id = $this->input->post('client_id');
		if($query = $this->admin->sms_change($client_id))
		{
			$response['status'] = 'success';
			$response['message'] = 'Plan has been added successfully.';
		}else{
			$response['status'] = 'failure';
			$response['message'] = 'Plan has been added successfully.';
		}
		//echo json_encode($response);
		return $response;
	}
	
	
	public function professional_plan()
	{
		header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	  if($this->session->userdata('user_name') != false) {
		$data['page_name'] = 'home';
		// load default view
		$data['pagename'] = 'home';
		/*$data['back'] = base64_encode(end(explode("/index.php/",$_SERVER['PHP_SELF'])));*/
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 15;
		$where_condition = '';
		
		//Count
		$this->db->select('count(*) as totalrows')->from('tbl_client t2');
		$this->db->join("tbl_validity t1","t1.client_id = t2.client_id");
		$this->db->where("t2.plan",1);
		if($this->uri->segment(4) == 'search') {
			$this->db->where("t2.client_id",$this->uri->segment(5));
		}
		$this->db->where("t1.duration !=",0);
		if($this->session->userdata('user_id')=='2'){
			$this->db->where('city','New Delhi');
		}
		if($this->session->userdata('user_id')=='3'){
			$this->db->where('city','mumbai');
		}
		if($this->session->userdata('user_id')=='4'){
			$this->db->where('city','jaipur');
			$this->db->or_where('city','udaipur');
			$this->db->or_where('city','jodhpur');
		}
		if($this->session->userdata('user_id')=='5'){
			$this->db->where('state','Telangana');
		}
		if($where_condition!='') $this->db->where($where_condition);
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->select('t2.mobile,t2.client_id,t2.username,t1.expire_date,t1.tot_pay_amount,t1.duration,t2.status');
		$this->db->from("tbl_client t2");
		$this->db->join("tbl_validity t1","t1.client_id = t2.client_id");
		$this->db->where("t2.plan",1);
		$this->db->where("t1.duration !=",0);
		if($this->uri->segment(4) == 'search') {
			$this->db->where("t2.client_id",$this->uri->segment(5));
		}
		if($this->session->userdata('user_id')=='2'){
			$this->db->where('city','New Delhi');
		}
		if($this->session->userdata('user_id')=='3'){
			$this->db->where('city','mumbai');
		}
		if($this->session->userdata('user_id')=='4'){
			$this->db->where('city','jaipur');
			$this->db->or_where('city','udaipur');
			$this->db->or_where('city','jodhpur');
		}
		if($this->session->userdata('user_id')=='5'){
			$this->db->where('state','Telangana');
		}
		if($this->uri->segment(4) == 'search'){
			$this->db->where('t2.client_id',$this->uri->segment(5));
		}
		if($where_condition!='') $this->db->where($where_condition);
						
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
		$this->db->order_by('t2.client_id','dsesc');
		$query = $this->db->get();
		$data['solo_list'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		
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
		$status = "professional";
		$data['client_name']=$this->user_model->getClientname($status);	
		$this->load->view('physioadmin/solo_plan',$data);
	  }
	  else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	
	
	public function monetary_plan()
	{
		header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
	    if($this->session->userdata('user_name') != false) {
		$data['pagename'] = 'home';
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 15;
		$where_condition = '';
		
		
		//Count
		$this->db->select('count(*) as totalrows')->from('tbl_client t2');
		$this->db->join("tbl_validity t1", "t1.client_id=t2.client_id");
		$this->db->where("t2.plan",2);
		$this->db->where("t1.duration !=",0);
		if($this->session->userdata('user_id')=='2'){
			$this->db->where('city','New Delhi');
		}
		if($this->session->userdata('user_id')=='3'){
			$this->db->where('city','mumbai');
		}
		if($this->session->userdata('user_id')=='4'){
			$this->db->where('city','jaipur');
			$this->db->or_where('city','udaipur');
			$this->db->or_where('city','jodhpur');
		}
		if($this->session->userdata('user_id')=='5'){
			$this->db->where('state','Telangana');
		}
		if($this->uri->segment(4) == 'search'){
			$this->db->where('t2.client_id',$this->uri->segment(5));
		}
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->select('t2.mobile,t2.client_id,t2.username,t1.expire_date,t1.tot_pay_amount,t1.duration,t2.status');
		$this->db->from("tbl_client t2");
		$this->db->join("tbl_validity t1", "t1.client_id=t2.client_id");
		$this->db->where("t2.plan",2);
		$this->db->where("t1.duration !=",0);
		if($this->session->userdata('user_id')=='2'){
			$this->db->where('city','New Delhi');
		}
		if($this->session->userdata('user_id')=='3'){
			$this->db->where('city','mumbai');
		}
		if($this->session->userdata('user_id')=='4'){
			$this->db->where('city','jaipur');
			$this->db->or_where('city','udaipur');
			$this->db->or_where('city','jodhpur');
		}
		if($this->session->userdata('user_id')=='5'){
			$this->db->where('state','Telangana');
		}
		if($this->uri->segment(4) == 'search') {
			$this->db->where("t2.client_id",$this->uri->segment(5));
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
		$this->db->order_by('t2.client_id','desc');
		$query = $this->db->get();
		$data['client_list'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		
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
		$status = "monetary";
		$data['client_name']=$this->user_model->getClientname($status);	
		$this->load->view('physioadmin/team_plan',$data);
	  }
	  else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	
	public function enterprise_plan()
	{ 
	   header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	   if($this->session->userdata('user_name') != false) {
		$data['pagename'] = 'home';
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 15;
		$where_condition = '';
				
		//Count
		$this->db->select('count(*) as totalrows');
		$this->db->from("tbl_client t2");
		$this->db->join("tbl_validity t1", "t1.client_id=t2.client_id");
		$this->db->where("t2.plan",3);
		$this->db->where("t1.duration !=",0);
		if($this->session->userdata('user_id')=='2'){
			$this->db->where('city','New Delhi');
		}
		if($this->session->userdata('user_id')=='3'){
			$this->db->where('city','mumbai');
		}
		if($this->session->userdata('user_id')=='4'){
			$this->db->where('city','jaipur');
			$this->db->or_where('city','udaipur');
			$this->db->or_where('city','jodhpur');
		}
		if($this->session->userdata('user_id')=='5'){
			$this->db->where('state','Telangana');
		}
		if($this->uri->segment(4) == 'search') {
			$this->db->where("t2.client_id",$this->uri->segment(5));
		}
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->select('t2.mobile,t2.client_id,t2.username,t1.expire_date,t1.tot_pay_amount,t1.duration,t2.status');
		$this->db->from("tbl_client t2");
		$this->db->join("tbl_validity t1", "t1.client_id=t2.client_id");
		$this->db->where("t2.plan",3);
		$this->db->where("t1.duration !=",0);
		if($this->session->userdata('user_id')=='2'){
			$this->db->where('city','New Delhi');
		}
		if($this->session->userdata('user_id')=='3'){
			$this->db->where('city','mumbai');
		}
		if($this->session->userdata('user_id')=='4'){
			$this->db->where('city','jaipur');
			$this->db->or_where('city','udaipur');
			$this->db->or_where('city','jodhpur');
		}
		if($this->session->userdata('user_id')=='5'){
			$this->db->where('state','Telangana');
		}
		if($this->uri->segment(4) == 'search'){
			$this->db->where('t2.client_id',$this->uri->segment(5));
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
		$this->db->order_by('t2.client_id','desc');
		$query = $this->db->get();
		$data['client_list'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		
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
		$data['current_page_segment'] = $current_page_segment;
		$str_links = $this->pagination->create_links();	
		$data["links"] = explode('<li>',$str_links);
		
		$status = "enterprise";
		$data['client_name']=$this->user_model->getClientname($status);		
		$this->load->view('physioadmin/cluster_plan',$data);
	  }
	  else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	
	public function ultimate_plan()
	{
	   header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	   if($this->session->userdata('user_name') != false) {
		$data['pagename'] = 'home';
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 15;
		$where_condition = '';
		
		//Count
		$this->db->select('count(*) as totalrows');
		$this->db->from("tbl_client t2");
		$this->db->join("tbl_validity t1", "t1.client_id=t2.client_id");
		$this->db->where("t2.plan",4);
		$this->db->where("t1.duration !=",0);
		if($this->session->userdata('user_id')=='2'){
			$this->db->where('city','New Delhi');
		}
		if($this->session->userdata('user_id')=='3'){
			$this->db->where('city','mumbai');
		}
		if($this->session->userdata('user_id')=='4'){
			$this->db->where('city','jaipur');
			$this->db->or_where('city','udaipur');
			$this->db->or_where('city','jodhpur');
		}
		if($this->session->userdata('user_id')=='5'){
			$this->db->where('state','Telangana');
		}
		if($this->uri->segment(4) == 'search') {
			$this->db->where("t2.client_id",$this->uri->segment(5));
		}
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->select('t2.mobile,t2.client_id,t2.username,t1.expire_date,t1.tot_pay_amount,t1.duration,t2.status');
		$this->db->from("tbl_client t2");
		$this->db->join("tbl_validity t1", "t1.client_id=t2.client_id");
		$this->db->where("t2.plan",4);
		if($this->session->userdata('user_id')=='2'){
			$this->db->where('city','New Delhi');
		}
		if($this->session->userdata('user_id')=='3'){
			$this->db->where('city','mumbai');
		}
		if($this->session->userdata('user_id')=='4'){
			$this->db->where('city','jaipur');
			$this->db->or_where('city','udaipur');
			$this->db->or_where('city','jodhpur');
		}
		if($this->session->userdata('user_id')=='5'){
			$this->db->where('state','Telangana');
		}
		if($this->uri->segment(4) == 'search'){
			$this->db->where('t2.client_id',$this->uri->segment(5));
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
		$this->db->where("t1.duration !=",0);
		$this->db->order_by('t2.client_id','dsesc');
		$query = $this->db->get();
		$data['client_list'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		
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
		$status = "ultimate";
		$data['client_name']=$this->user_model->getClientname($status);	
		$this->load->view('physioadmin/chain_plan',$data);
	  }
	   else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	
	public function institute_plan()
	{
		 header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	  if($this->session->userdata('user_name') != false) {
		$data['page_name'] = 'home';
		// load default view
		$data['pagename'] = 'home';
		/*$data['back'] = base64_encode(end(explode("/index.php/",$_SERVER['PHP_SELF'])));*/
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 15;
		$where_condition = '';
		
		//do searchby
		$do_searchby = array_search("searchby",$segment_array);
		if($do_searchby != false) {
			$data['searchFilter']=true;
			$keyword = urldecode($this->uri->segment($do_searchby+1));
			$keyword = str_replace('_', '/', $keyword);
			$where_condition = "(t2.username LIKE '%".$keyword."%')";
			$data['keyword'] = $keyword;
		}
		
		//Count
		$where_condition = ($where_condition != '') ? $where_condition : '';
		$this->db->select('count(*) as totalrows');
		$this->db->from("tbl_client t2");
		$this->db->join("tbl_validity t1", "t1.client_id=t2.client_id");
		$this->db->where("t2.plan_id",5);
		$this->db->where("t1.duration !=",0);
		if($this->session->userdata('user_id')=='2'){
			$this->db->where('city','New Delhi');
		}
		if($this->session->userdata('user_id')=='3'){
			$this->db->where('city','mumbai');
		}
		if($this->session->userdata('user_id')=='4'){
			$this->db->where('city','jaipur');
			$this->db->or_where('city','udaipur');
			$this->db->or_where('city','jodhpur');
		}
		if($this->session->userdata('user_id')=='5'){
			$this->db->where('state','Telangana');
		}
		if($where_condition!='') $this->db->where($where_condition);
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->select('t2.mobile,t2.client_id,t2.username,t1.duration,t1.expire_date,t1.tot_pay_amount,t2.status');
		$this->db->from("tbl_client t2");
		$this->db->join("tbl_validity t1", "t1.client_id=t2.client_id");
		$this->db->where("t2.plan_id",5);
		$this->db->where("t1.duration !=",0);
		if($this->session->userdata('user_id')=='2'){
			$this->db->where('city','New Delhi');
		}
		if($this->session->userdata('user_id')=='3'){
			$this->db->where('city','mumbai');
		}
		if($this->session->userdata('user_id')=='4'){
			$this->db->where('city','jaipur');
			$this->db->or_where('city','udaipur');
			$this->db->or_where('city','jodhpur');
		}
		if($this->session->userdata('user_id')=='5'){
			$this->db->where('state','Telangana');
		}
		if($this->uri->segment(4) == 'search'){
			$this->db->where('t2.client_id',$this->uri->segment(5));
		}
		if($where_condition!='') $this->db->where($where_condition);
						
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
		$this->db->order_by('t2.client_id','dsesc');
		$query = $this->db->get();
		$data['client_list'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		
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
		$status = "institute";
		$data['client_name']=$this->user_model->getClientname($status);		
		$this->load->view('physioadmin/institute_plan',$data);
	  }
	  else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	
	
	public function free_plan()
	{
		header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
	  if($this->session->userdata('user_name') != false) {
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
		 
		$this->db->select('count(*) as totalrows');
		$this->db->from("tbl_client t2");
		$this->db->join("tbl_validity t1", "t1.client_id=t2.client_id");
		$this->db->where("t1.duration",0);
	    if($this->uri->segment(4) == 'search'){
			$this->db->where('t2.client_id',$this->uri->segment(5));
		}
		if($this->session->userdata('user_id')=='2'){
			$this->db->where('city','New Delhi');
		}
		if($this->session->userdata('user_id')=='3'){
			$this->db->where('city','mumbai');
		}
		if($this->session->userdata('user_id')=='4'){
			$this->db->where('city','jaipur');
			$this->db->or_where('city','udaipur');
			$this->db->or_where('city','jodhpur');
		}
		if($this->session->userdata('user_id')=='5'){
			$this->db->where('state','Telangana');
		}
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->group_by("email");
		$this->db->select('t2.mobile,t2.client_id,t2.username,t1.duration,t1.expire_date,t1.tot_pay_amount,t2.status');
		$this->db->from("tbl_client t2");
		$this->db->join("tbl_validity t1", "t1.client_id=t2.client_id");
		$this->db->where("t1.duration",0);
		if($this->uri->segment(4) == 'search'){
			$this->db->where('t2.client_id',$this->uri->segment(5));
		}
		if($this->session->userdata('user_id')=='2'){
			$this->db->where('city','New Delhi');
		}
		if($this->session->userdata('user_id')=='3'){
			$this->db->where('city','mumbai');
		}
		if($this->session->userdata('user_id')=='4'){
			$this->db->where('city','jaipur');
			$this->db->or_where('city','udaipur');
			$this->db->or_where('city','jodhpur');
		}
		if($this->session->userdata('user_id')=='5'){
			$this->db->where('state','Telangana');
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
		$this->db->order_by('t2.client_id','desc');
		$query = $this->db->get();
		$data['client_list'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		
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
		$status = "free";
		$data['client_name']=$this->user_model->getClientname($status);		
		$this->load->view('physioadmin/rural_plan',$data);
	  }
	  else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	
	public function professional_edit($client_id)
	{
		header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	  if($this->session->userdata('user_name') != false) {
		$this->db->select('client_id,username,first_name,last_name');
		$this->db->from("tbl_client");
		$this->db->where("client_id",$client_id);
		$query = $this->db->get();
		$data['solo_cname'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		$this->db->select('client_id,duration,num_users,num_location');
		$this->db->from("tbl_validity");
		$this->db->where("client_id",$client_id);
		$query = $this->db->get();
		$data['solo_det'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		$this->load->view('physioadmin/solo_edit',$data);
	  }
	  else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	public function edit_plan(){
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

                //sms count update
                $this->db->select('t2.client_id,t2.total_sms_limit');
		$this->db->from("tbl_client t2");
		$this->db->where('client_id',$client_id);
		$query = $this->db->get();
		$limit = $query->row()->total_sms_limit;
		$sms = $this->input->post('plan_sms');
		$smsNo=0;
		if($sms=="3100")
		{
			$smsNo=10000;
		}
		else if($sms=="1750")
		{
			$smsNo=5000;
		}
		else if($sms=="780")
		{
			$smsNo=2000;
		}
		else if($sms=="430")
		{
			$smsNo=1000;
		}
		else if($sms=="188")
		{
			$smsNo=400;
		}
		else if($sms=="102")
		{
			$smsNo=200;
		}
		$val = $limit + $smsNo;
		$this->db->where('client_id',$client_id);
		$this->db->set('total_sms_limit', $val);
		$this->db->update('tbl_client');


                $plan = $this->input->post('plan_type');
		$users=$this->input->post('users');
                $location=$this->input->post('location');
                $users1=$this->input->post('plan_user');
                $location1=$this->input->post('plan_loc');
                $users2=0;
                $location2=0;
                if($users1=="")
                {
                  $users2=$users;
                }
                else
                {
                   $users2=$users1;

                }
                if($location1=="")
                {
                  $location2=$location;
                }
                else
                {
                  $location2=$location1;
                }

		$data=array(
			'duration' => $dura1,
			'plan_type' => $plan,
			'expire_date' => $date,
			'trial' => $this->input->post('trial'),
                        'num_users' => $users2,
			'num_location' => $location2,
			'created_date' => date('Y-m-d') 
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
		

                $discount = $this->input->post('disc_per');
		$discount_desc = $this->input->post('disc_desc');
		$plan = $this->input->post('plan_type');
                $users=$this->input->post('users');
                $location=$this->input->post('location');
                $users1=$this->input->post('plan_user');
                $location1=$this->input->post('plan_loc');
                $users2=0;
                $location2=0;
                $newuser=0;
                $newloc=0;
		if($users1=="")
		{
                  $users2=$users;
		}
		else{
			$users2=$users1;
                        $newuser=$users1-$users;
		}
		if($location1=="")
		{
		       $location2=$location;
		}
		else{
			$location2=$location1;
                        $newloc=$location1-$location;
		}
           

                $sms = $this->input->post('plan_sms');
		$smsamt=0;
		if($sms=="")
		{
			$smsamt=0;
		}
		else
		{
		$smsamt=$sms;
		}
		
		$plan_amt=0;
		if($plan==1)
		{
			$plan_amt=300;
		}
		else if($plan==2)
		{
			$plan_amt=500;
		}
		else if($plan==3)
		{
			$plan_amt=600;
		}
		else{
		
			$plan_amt=1000;
		
		}

                $total_amt=0;
		$discounted_amt=0;
		$amtUser=100;
		$amtLoc=7000;
		$duration1;
		if($duration==30 || $duration==31)
		{
			$total_amt=$plan_amt;
			$duration1=1;
		}
		else if($duration==90)
		{
			if($plan==4)
			{
				$total_amt=2700;
			}
			else{
			$total_amt=$plan_amt*3;
			}
			$duration1=3;
		}
		else if($duration==180)
		{
			if($plan==4)
			{
				$total_amt=5100;
			}
			else{
			$total_amt=$plan_amt*6;
			}
			$duration1=6;
		}
		else if($duration==365)
		{
			if($plan==4)
			{
				$total_amt=8400;
			}
			else if($plan==3)
			{
				$total_amt=5040;
			}
			else if($plan==2)
			{
				$total_amt=4200;
			}
			else if($plan==1)
			{
				$total_amt=2520;
			}			
                        $duration1=12;
		}
		else
		{
			$total_amt=0;
		}
		if($total_amt!=0)
		{
			if($plan==4 && $duration1!=1)
			{
				 $total_amt=$total_amt+($amtLoc*($location2-1))+($amtUser*($users2-1))*$duration1+$smsamt;
			}
			else{
		     $total_amt=$total_amt+($amtUser*($users2-1))*$duration1+($amtLoc*($location2-1))+$smsamt;
			}
		}
		if($discount!=0){
			
			$discounted_amt=$total_amt-(($total_amt*$discount)/100);
		}
		else
		{
			$discounted_amt=$total_amt;
		}
                
                			 
                        //$newuser=$users-$this->input->post('users');
                        //$newloc=$location-$this->input->post('location');

			$order_det=array(
			'client_id' => $client_id,
			'created_date' => date('Y-m-d'),
			'expire_date' => $date,
			'plan_type' => $plan,
			'duration' => $duration,
			'num_users' => $users2,
			'num_location' => $location2,
			'users'=> $newuser,
			'location'=>$newloc,
                        'sms' => $smsamt,
			'pay_amount' => $total_amt,
			'discount'=> $discount,
			'discount_description'=> $discount_desc,
			'tot_pay_amount'=> $discounted_amt,
			'order_description'=>"Plan Upgrade"
			 );
			 $this->db->insert("tbl_order_details",$order_det);


                /*
                $data=array(
			'plan_type' => $plan,
			'expire_date' => $date,
			'trial' => $this->input->post('trial'),
			'duration' => $dura1,
			'num_users' => $users2,
			'num_location' => $location2,
			'created_date' => date('Y-m-d') 
		);
		$this->db->where('client_id',$client_id);
		$this->db->update("tbl_validity",$data);*/

		
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
		  'smtp_user' => 'atlanticshong',
		  'smtp_pass' => 'atlantics123',
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
		  'smtp_user' => 'atlanticshong',
		  'smtp_pass' => 'atlantics123',
		  'smtp_port' => 587,
		  'crlf' => "\r\n",
		  'newline' => "\r\n",
		  'mailtype'=> 'html'
		));
		$this->email->from('no-reply@physioplustech.com', 'Physio Admin');
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
													    <p style="color:#666;padding-left:25px;font-size:120%">Email : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;"> '.$email.'</span></p>
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
		$this->email->subject('Physio Admin Account Activated');
		$this->email->message($template);
		$this->email->send();
		
		if($plan == '0'){
			redirect(base_url().'physioadmin/client_det/rural_edit/'.$client_id);
		}
		 if($plan == '1'){
			redirect(base_url().'physioadmin/client_det/professional_edit/'.$client_id);
		}
		if($plan == '2'){
			redirect(base_url().'physioadmin/client_det/monetary_edit/'.$client_id);
		}
		if($plan == '3'){
			redirect(base_url().'physioadmin/client_det/enterprise_edit/'.$client_id);
		}
		if($plan == '4'){
			redirect(base_url().'physioadmin/client_det/ultimate_edit/'.$client_id);
		}  
		if($plan == '5'){
			redirect(base_url().'physioadmin/client_det/institute_edit/'.$client_id);
		}  
	  }
	   else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	public function edit_user() {
		header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	  if($this->session->userdata('user_name') != false) {
		$client_id = $this->input->post('client_id');
		$this->db->where('client_id',$client_id);
		$this->db->select('plan,plan_id')->from('tbl_client');
		$res = $this->db->get();
		$plan = $res->row()->plan;
		echo $plan;
		$num_users = $this->input->post('num_users');
		$data=array(
		'num_users' => $num_users,
		);
		$this->db->where('client_id',$client_id);
		$this->db->update("tbl_validity",$data);
		
		$this->db->where('client_id',$client_id);
		$this->db->select('plan')->from('tbl_client_history');
		$res = $this->db->get();
		if($res->result_array() != false){
		$data1=array(
			'users' => $num_users,
		);
		$this->db->where('client_id',$client_id);
		$this->db->update("tbl_client_history",$data1);
		} else {
			$data1=array(
			'client_id' => $client_id,
			'locations' => 1,
			'create_date' => date('Y-m-d'),
			'users' => $num_users
			);
			$this->db->insert("tbl_client_history",$data1);
		}
		

                $this->db->where('client_id',$client_id);
		$this->db->select('duration','num_users')->from('tbl_validity');
		$res1 = $this->db->get();
		$duration = $res1->row()->duration;
		$validUsers=$res1->row()->num_users;
		$rem=$duration%30;
		$months=intval($duration/30);
		if($rem>15 || $rem==15)
		{
			$months=$months+1;
		}
                
                /*
                $this->db->order_by("order_id", "desc");
		$this->db->where('client_id',$client_id);
		$this->db->select('*')->from('tbl_order_details');
		$res = $this->db->get();
		$dur = $res->row()->duration;
		$plan_ty=$res->row()->plan_type;
		$user_num=$res->row()->num_users;
		$created=$res->row()->created_date;
		$expire=$res->row()->expire_date;
		$loc_num=$res->row()->num_location;
		$dur_month=1;*/

                $this->db->order_by("order_id", "desc");
		$this->db->limit(1);
		$this->db->where('client_id',$client_id);
		$this->db->where('order_description',"Plan Upgrade");
		$this->db->select('*')->from('tbl_order_details');
		$res = $this->db->get();
		$dur = $res->row()->duration;
		$plan_ty=$res->row()->plan_type;
		$user_num=$res->row()->num_users;
		//$created=$res->row()->created_date;
		$expire=$res->row()->expire_date;
		//$loc_num=$res->row()->num_location;
		$dur_month=1;
		
		$num_users = $this->input->post('num_users');
		$users_validity=$this->input->post('edit_users');                
                $newUser=$num_users-$users_validity;
                $user_amt=100*$newUser*$months;
                  
               /*
               $newUser=$num_users-$user_num;
		$user_amt=100*$newUser;
		if($dur==90 && $newUser>0)
		{
			$user_amt=3*100*$newUser;
			
		}
		else if($dur==180 && $newUser>0)
		{
			$user_amt=6*100*$newUser;
		}
		else if($dur==365 && $newUser>0){
			$user_amt=12*100*$newUser;
		}*/

                $data_order_det=array(
		'client_id' => $client_id,
		'num_users' => $num_users,
		'users'=>$newUser,
		'plan_type'=>$plan_ty,
		'duration'=>$duration,
		'created_date'=>date('Y-m-d'),
		'expire_date'=>$expire,
		'pay_amount'=>$user_amt,
		'tot_pay_amount'=>$user_amt,
		'order_description'=>"New User Upgrade"
		);
		
		$this->db->insert("tbl_order_details",$data_order_det);


		$this->db->select('*')->from('tbl_client');
		$this->db->where('client_id',$client_id);
		$query = $this->db->get();
		$name = $query->row()->username;
		$clinic_name = $query->row()->clinic_name;
		$city = $query->row()->city;
		$mobile = $query->row()->mobile;
        $email = $query->row()->username;
		$name1 = $query->row()->first_name;
		
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
 <div style="color: #130f0e; font-size: 14px; font-weight: bold; line-height: 21px; text-align: left;">Dear '. $name1 .',</div>
 <br> <div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;"></div><br> 
 <div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;"><b> '.$num_users.'</b> No Of Users Added</div><br> 
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
		$this->email->subject('Account Activation - Users');
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
		$this->email->from('no-reply@physioplustech.com', 'Physio Admin');
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
														<p style="color:#666;padding-left:25px;font-size:120%">No.Of.Users  : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$num_users.'</span></p>
														
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
		$this->email->subject('Physio Admin User Activated');
		$this->email->message($template);
		$this->email->send();
		
		if($plan == '0'){
			redirect(base_url().'physioadmin/client_det/rural_edit/'.$client_id);
		}
		if($plan == '1'){
			redirect(base_url().'physioadmin/client_det/professional_edit/'.$client_id);
		}
		if($plan == '2'){
			redirect(base_url().'physioadmin/client_det/monetary_edit/'.$client_id);
		}
		if($plan == '3'){
			redirect(base_url().'physioadmin/client_det/enterprise_edit/'.$client_id);
		}
		if($plan == '4'){
			redirect(base_url().'physioadmin/client_det/ultimate_edit/'.$client_id);
		}
		if($plan == '5'){
			redirect(base_url().'physioadmin/client_det/institute_edit/'.$client_id);
		} 
	  }
	  else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	public function edit_location(){
		header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	  if($this->session->userdata('user_name') != false) {
		$num_location = $this->input->post('num_location');
		$client_id = $this->input->post('client_id');
		$this->db->where('client_id',$client_id);
		$this->db->select('plan,plan_id')->from('tbl_client');
		$res = $this->db->get();
		$plan = $res->row()->plan;
                /*
		$data=array(
			'num_location' => $num_location,
		);
		$this->db->where('client_id',$client_id);
		$this->db->update("tbl_validity",$data);
                */

                //order details update
                $this->db->where('client_id',$client_id);
		$this->db->select('*')->from('tbl_validity');
		$res = $this->db->get();
		$dur = 365;
		$plan_ty=$res->row()->plan_type;
		$loc_num=$res->row()->num_location;
		$created=$res->row()->created_date;
		$expire=$res->row()->expire_date;
		$user=$res->row()->num_users;
		$dur_month=1;
		$discount=$this->input->post('disc_location');
		$newLoc=$num_location-$loc_num;
		$discounted_amt=0;
		$loc_amt=7000*$newLoc;
		
		if($discount==0 || $discount==""){
			$discounted_amt=$loc_amt;
			
		}
		else
		{
			$discounted_amt=$loc_amt-(($loc_amt*$discount)/100);
		}

                $data=array(
			'num_location' => $num_location,
		);
		$this->db->where('client_id',$client_id);
		$this->db->update("tbl_validity",$data);
		
		$data_order_det=array(
		'client_id' => $client_id,
		'num_users' => $user,
		'num_location' => $num_location,
		'location'=> $newLoc,
		'plan_type'=>$plan_ty,
		'duration'=>$dur,
		'created_date'=>$created,
		'expire_date'=>$expire,
		'pay_amount'=>$loc_amt,
		'discount'=>$discount,
		'tot_pay_amount'=>$discounted_amt,
		'order_description'=>"New Location Upgrade"
		);
		
		$this->db->insert("tbl_order_details",$data_order_det);


		
		$this->db->where('client_id',$client_id);
		$this->db->set('is_location',1);
		$this->db->update("tbl_client");
		
		$this->db->where('client_id',$client_id);
		$this->db->select('plan')->from('tbl_client_history');
		$res = $this->db->get();
		if($res->result_array() != false){
			$data1=array(
				'locations' => $num_location,
			);
			$this->db->where('client_id',$client_id);
			$this->db->update("tbl_client_history",$data1);
		} else {
			$data1=array(
				'client_id' => $client_id,
				'locations' => $num_location,
				'users' => 1,
				'create_date' => date('Y-m-d')
		    );
			$this->db->insert("tbl_client_history",$data1);
		}
		
		$this->db->select('*')->from('tbl_client');
		$this->db->where('client_id',$client_id);
		$query = $this->db->get();
		$name = $query->row()->username;
		$clinic_name = $query->row()->clinic_name;
		$city = $query->row()->city;
		$mobile = $query->row()->mobile;
		$user = $this->session->userdata('mail');
		$name1 = $query->row()->first_name;
		$email = $query->row()->username;
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
 <div style="color: #130f0e; font-size: 14px; font-weight: bold; line-height: 21px; text-align: left;">Dear '. $name1 .',</div>
 <br> <div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;"></div><br> 
 <div style="color: #130f0e; font-size: 14px; line-height: 21px; text-align: left;"> <b>'.$num_location.'</b> No Of Locations Added</div><br> 
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
		$this->email->subject('Account Activation - Location');
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
		$this->email->from('no-reply@physioplustech.com', 'Physio Admin');
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
														<p style="color:#666;padding-left:25px;font-size:120%">No.Of.Location  : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$num_location.'</span></p>
														
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
		$this->email->subject('Physio Admin Location Activated');
		$this->email->message($template);
		$this->email->send();  
		
		if($plan == '0'){
			redirect(base_url().'physioadmin/client_det/rural_edit/'.$client_id);
		}
		if($plan == '1'){
			redirect(base_url().'physioadmin/client_det/professional_edit/'.$client_id);
		}
		if($plan == '2'){
			redirect(base_url().'physioadmin/client_det/monetary_edit/'.$client_id);
		}
		if($plan == '3'){
			redirect(base_url().'physioadmin/client_det/enterprise_edit/'.$client_id);
		}
		if($plan == '4'){
			redirect(base_url().'physioadmin/client_det/ultimate_edit/'.$client_id);
		}
		if($plan == '5'){
			redirect(base_url().'physioadmin/client_det/institute_edit/'.$client_id);
		} 
	  }
	  else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 } 
	}

	public function solo_save()
	{
		$response = array();
		$client_id = $this->input->post('client_id');
		if($query = $this->admin->solo_change($client_id))
		{
			$response['status'] = 'success';
			$response['message'] = 'Plan has been added successfully.';
		}else{
			$response['status'] = 'failure';
			$response['message'] = 'Plan has been added successfully.';
		}
		//echo json_encode($response);
		return $response;
	}
	
	public function monetary_edit($client_id)
	{
		header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	  if($this->session->userdata('user_name') != false) {
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
		$this->load->view('physioadmin/team_edit',$data);
	  }else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	
	public function team_save()
	{
		$response = array();
		$client_id = $this->input->post('client_id');
		if($query = $this->admin->team_change($client_id))
		{
			$response['status'] = 'success';
			$response['message'] = 'Plan has been added successfully.';
		}else{
			$response['status'] = 'failure';
			$response['message'] = 'Plan has been added successfully.';
		}
		//echo json_encode($response);
		return $response;
	}
	
	public function enterprise_edit($client_id)
	{
		 header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	  if($this->session->userdata('user_name') != false) {
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
		$this->load->view('physioadmin/cluster_edit',$data);
	  }
	   else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	
	public function cluster_save()
	{
		$response = array();
		$client_id = $this->input->post('client_id');
		if($query = $this->admin->team_change($client_id))
		{
			$response['status'] = 'success';
			$response['message'] = 'Plan has been added successfully.';
		}else{
			$response['status'] = 'failure';
			$response['message'] = 'Plan has been added successfully.';
		}
		//echo json_encode($response);
		return $response;
	}
	
	public function ultimate_edit($client_id)
	{  header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	  if($this->session->userdata('user_name') != false) {
	  
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
		
		$this->db->where('client_id',$client_id);
		$this->db->select('price')->from('tbl_balance');
		$res1 = $this->db->get();
		if($res1->result_array() != false){
		$data['wallet_balance'] = $res1->row()->price;} else { $data['wallet_balance'] = '0';}

		$this->load->view('physioadmin/chain_edit',$data);
	  }else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	
	public function chain_save()
	{
		$response = array();
		$client_id = $this->input->post('client_id');
		if($query = $this->admin->team_change($client_id))
		{
			$response['status'] = 'success';
			$response['message'] = 'Plan has been added successfully.';
		}else{
			$response['status'] = 'failure';
			$response['message'] = 'Plan has been added successfully.';
		}
		//echo json_encode($response);
		return $response;
	}
	
	public function institute_edit($client_id)
	{
		header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	  if($this->session->userdata('user_name') != false) {
	  
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
		$this->load->view('physioadmin/institute_edit',$data);
	  }
	   else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	
	public function institute_save()
	{
		$response = array();
		$client_id = $this->input->post('client_id');
		if($query = $this->admin->team_change($client_id))
		{
			$response['status'] = 'success';
			$response['message'] = 'Plan has been added successfully.';
		}else{
			$response['status'] = 'failure';
			$response['message'] = 'Plan has been added successfully.';
		}
		//echo json_encode($response);
		return $response;
	}
	
	public function rural_edit($client_id)
	{
		header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	  if($this->session->userdata('user_name') != false) {
	  
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
		$this->load->view('physioadmin/rural_edit',$data);
	  }else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	
	public function rural_save()
	{
		$response = array();
		$client_id = $this->input->post('client_id');
		if($query = $this->admin->team_change($client_id))
		{
			$response['status'] = 'success';
			$response['message'] = 'Plan has been added successfully.';
		}else{
			$response['status'] = 'failure';
			$response['message'] = 'Plan has been added successfully.';
		}
		//echo json_encode($response);
		return $response;
	}
	
	public function payments()
	{
		header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	  if($this->session->userdata('user_name') != false) {
	  
		
		$status = "home";
		$data['client_name']=$this->user_model->getClientname($status);	
		$this->load->view('physioadmin/payments_view');
	  }
	  else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	
	public function payment_save()
	{
		header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	  if($this->session->userdata('user_name') != false) {
	  
		$client_id= $this->input->post('client_id');
		$this->admin->payment_save($client_id);
		return true;
	  }
	  else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	
	public function insert()
	{
		for($i=1;$i<=591;$i++)
		{
			$this->db->query('insert into tbl_validity (client_id) values ('.$i.')');
		}
		echo 'sucess';
	}
	
	public function renewal()
	{
		header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	  if($this->session->userdata('user_name') != false) {
		  $this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 10;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
	    
        $where_condition = "(t1.duration != '0')";
		if($where_condition!='') $this->db->where($where_condition);
		$this->db->select('t2.client_id,t2.username,t2.mobile,t2.phone,t1.expire_date,t1.tot_pay_amount,t1.duration');
		$this->db->from("tbl_validity t1");
		$this->db->join("tbl_client t2", "t2.client_id=t1.client_id");
		$this->db->where('t1.duration <','31');
		$query = $this->db->get();
		$config['total_rows'] = $query->num_rows();

        //prepare active record for new query (with limit/offeset/orderby)
		$where_condition = "(t1.duration != '0')";
		if($where_condition!='') $this->db->where($where_condition);
		$this->db->select('t2.mobile,t2.client_id,t2.username,t2.mobile,t2.phone,t1.expire_date,t1.tot_pay_amount,t1.duration');
		$this->db->from("tbl_validity t1");
		$this->db->join("tbl_client t2", "t2.client_id=t1.client_id");
		$this->db->where('t1.duration <','31');
		//do where
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
		$this->db->order_by('t2.client_id', 'desc'); 
		$query = $this->db->get();
		$data['renewal_list'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		
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
	    $this->load->view('physioadmin/renewal',$data);
	  }
	  else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	  

	public function expired(){
		header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	  if($this->session->userdata('user_name') != false) {
		$data['page_name'] = 'home';
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 15;
		$where_condition = '';
		//Count
		$where_condition = ($where_condition != '') ? $where_condition : '';
		$this->db->select('count(*) as totalrows')->from('tbl_validity t1');
		$this->db->join("tbl_client t2", "t2.client_id=t1.client_id");
		$this->db->join("tbl_client_history t3", "t3.client_id=t1.client_id");
		
		//$this->db->where('DATE_FORMAT(t1.expire_date,"%m")',$curent_month);
		$this->db->where('t1.duration','0');
		if($this->session->userdata('user_id')=='2'){
			$this->db->where('city','New Delhi');
		}
		if($this->session->userdata('user_id')=='3'){
			$this->db->where('city','mumbai');
		}
		if($this->session->userdata('user_id')=='4'){
			$this->db->where('city','jaipur');
			$this->db->or_where('city','udaipur');
			$this->db->or_where('city','jodhpur');
		}
		if($this->session->userdata('user_id')=='5'){
			$this->db->where('state','Telangana');
		}
		$q = $this->db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		//prepare active record for new query (with limit/offeset/orderby)
		$this->db->select('t2.client_id,t2.username,t2.mobile,t2.phone,t1.expire_date,t1.tot_pay_amount,t1.duration');
		$this->db->from("tbl_validity t1");
		$this->db->join("tbl_client t2", "t2.client_id=t1.client_id");
		$this->db->join("tbl_client_history t3", "t3.client_id=t1.client_id");
		if($this->session->userdata('user_id')=='2'){
			$this->db->where('city','New Delhi');
		}
		if($this->session->userdata('user_id')=='3'){
			$this->db->where('city','mumbai');
		}
		if($this->session->userdata('user_id')=='4'){
			$this->db->where('city','jaipur');
			$this->db->or_where('city','udaipur');
			$this->db->or_where('city','jodhpur');
		}
		if($this->session->userdata('user_id')=='5'){
			$this->db->where('state','Telangana');
		}
		//$this->db->where('DATE_FORMAT(t1.expire_date,"%m")',$curent_month);
		//$where_condition = "(t1.duration <= '15' AND t1.duration  != '0')";
		$this->db->where('t1.duration','0');
						
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
		$data['renewal_list'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		
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
		$this->load->view('physioadmin/expired',$data);
	  }
	  else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	
	public function deactive_client($client_id)
	{
		header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	  if($this->session->userdata('user_name') != false) {
		$this->db->where('client_id',$client_id);
		$this->db->select('plan')->from('tbl_client');
		$res = $this->db->get();
		$plan = $res->row()->plan;
		$this->db->where('client_id',$client_id);
		$this->db->set('status',0);
		$this->db->update('tbl_client'); 
		if($plan == '0'){
			redirect(base_url().'physioadmin/client_det/rural_plan/');
		}
		 if($plan == '1'){
			redirect(base_url().'physioadmin/client_det/professional_plan/');
		}
		if($plan == '2'){
			redirect(base_url().'physioadmin/client_det/monetary_plan/');
		}
		if($plan == '3'){
			redirect(base_url().'physioadmin/client_det/enterprise_plan/');
		}
		if($plan == '4'){
			redirect(base_url().'physioadmin/client_det/ultimate_plan/');
		}  
		if($plan == '5'){
			redirect(base_url().'physioadmin/client_det/institute_plan/');
		}  
	  }
	  else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 } 
	}
	public function activate_client($client_id)
	{
		header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	  if($this->session->userdata('user_name') != false) {
	  
		$this->db->where('client_id',$client_id);
		$this->db->select('plan')->from('tbl_client');
		$res = $this->db->get();
		$plan = $res->row()->plan;
		
		$this->db->where('client_id',$client_id);
		$this->db->set('status','1');
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
		$this->email->from('no-reply@physioplustech.com', 'Physio Admin');
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
														<p style="color:#666;padding-left:25px;font-size:120%">This Account has been successfully Activated.</p>
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
		$this->email->subject('Physio Admin Account Activate');
		$this->email->message($template);
		$this->email->send(); 
	
		if($plan == '0'){
			redirect(base_url().'physioadmin/client_det/free_plan/');
		}
		 if($plan == '1'){
			redirect(base_url().'physioadmin/client_det/professional_plan/');
		}
		if($plan == '2'){
			redirect(base_url().'physioadmin/client_det/monetary_plan/');
		}
		if($plan == '3'){
			redirect(base_url().'physioadmin/client_det/enterprise_plan/');
		}
		if($plan == '4'){
			redirect(base_url().'physioadmin/client_det/ultimate_plan/');
		}  
		if($plan == '5'){
			redirect(base_url().'physioadmin/client_det/institute_plan/');
		}
	  }
	  else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	
	public function user_add()
	{
	  header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	  if($this->session->userdata('user_name') != false) {
		$client_id = $_POST['client_id'];
		$num_user = $_POST['num_users'];
		$this->db->set('num_users','num_users +'.$num_user,FALSE);
		$this->db->where('client_id',$client_id);
		$this->db->update('tbl_validity');
	  }else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	public function location_add()
	{
		$num_location = $_POST['num_location'];
		$this->db->set('num_location','num_location +'.$num_location,FALSE);
		$this->db->update('tbl_validity');
	}
	public function active_client($client_id)
	{
		$this->db->where('client_id',$client_id);
		$deactive = array('status'=> 1);
		$this->db->update('tbl_client',$deactive);
		redirect(base_url().'physioadmin/client_det/view', 'refresh');
	}
	public function payout() {
		$data['pagename'] = 'home';
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		$config['per_page'] = 15;
		$where_condition = '';
		$this->db->where("pay",'paid');
		$this->db->where('t_status','2');
		$this->db->select('SUM(amount) AS amount,ex_date,t_status,client_id');
		$this->db->from("prescription_detail");
		$this->db->group_by('client_id');
		if($where_condition!='') $this->db->where($where_condition);
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
		$query = $this->db->get();
		$data['client_list'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		
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
		$this->load->view('physioadmin/payout_summary',$data);
	}
	public function payout_summary() {
		$data['page_name'] = 'settings';
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$this->legacy_db = $this->load->database('second', true);
 		$segment_array = $this->uri->segment_array();
		
		//Pagination
		$config['per_page'] = 10;
		$current_page ='';
		$where_condition = '';
		$data['mode'] = 'view';
		
		//Count
		$this->legacy_db->distinct();
		$this->legacy_db->select('count(*) as totalrows')->from('tbl_tickets');
		$q = $this->legacy_db->get();
		$qrow = $q->row();
		$config['total_rows'] = $qrow->totalrows;
		
		
		//prepare active record for new query (with limit/offeset/orderby)
		$this->legacy_db->distinct();
		$this->legacy_db->where('ti.status','0');
		$this->legacy_db->select('sum(ticket_per_rate * no_tickets) as amount,ti.status,ti.paid_date,ti.date,ti.ticket_id,ti.event_id,ti.user_id,ti.ticket_per_rate,ti.no_tickets,ei.eventname,ui.userid');
		$this->legacy_db->from("tbl_tickets ti");
		$this->legacy_db->join("eventinfo ei", "ti.event_id = ei.event_id");
		$this->legacy_db->group_by('ti.event_id');
		$this->legacy_db->join("users ui", "ti.user_id = ui.userid");
		$do_page = array_search("page",$segment_array);
		if ($do_page !== FALSE)
		{
			$current_page_segment = $do_page+1;
			$current_page = (int) $this->uri->segment($current_page_segment,0);
			$this->legacy_db->limit($config['per_page'], $current_page);
			if($current_page) array_pop($segment_array);
		} 
		else 
		{
			$current_page_segment = 0;
			$this->legacy_db->limit($config['per_page']);
			array_push($segment_array, 'page');
		}
		// data subset
		$query = $this->legacy_db->get();
		$data['client_list'] = ($query->num_rows() > 0) ? $query->result_array() : false;
	
		
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
        $str_links = $this->pagination->create_links();	
		$data["links"] = explode('<li>',$str_links);
				
		$data['current_page_segment'] = $current_page_segment;
		$this->load->view('physioadmin/eventspayout',$data);
		
	}
	public function payout_paid()
	{
		$client_id = $this->uri->segment(4);
		$this->admin->edit_payout($client_id);
		redirect(base_url().'physioadmin/client_det/payout', 'refresh'); 
	}
	public function send_mail() {
		$this->load->model('mail_model');
		$client_id = $this->uri->segment(4);
		$duration = $this->uri->segment(5);
		$this->mail_model->renewalsend_mail($client_id,$duration);
		redirect(base_url().'physioadmin/client_det/renewal', 'refresh'); 
	}
	public function add_invoicedet() {
		$response = array();
		if($query = $this->admin->add_invoicedet())
		{
			$response['status'] = 'success';
			$response['message'] = 'Invoice details has been added successfully.';
		}else{
			$response['status'] = 'failure';
			$response['message'] = 'Invoice details has been added successfully.';
		}
		echo json_encode($response);
		//redirect(base_url().'physioadmin/dashboard/invoice_gen', 'refresh');
	}	
	public function invoices() {
		$client_id = $this->uri->segment(5);
		$invoice_id = $this->uri->segment(4);
		$data['clientDetails'] = $this->registration_model->editProfile($client_id);
		$data['invoiceDetails'] = $this->admin->invoice_details($invoice_id);
		$this->load->view('physioadmin/invoice_email',$data);
	
	}
	public function add_paydet() {
		$response = array();
		if($query = $this->admin->add_paydet())
		{
			$response['status'] = 'success';
			$response['message'] = 'Invoice details has been added successfully.';
		}else{
			$response['status'] = 'failure';
			$response['message'] = 'Invoice details has been added successfully.';
		}
		//echo json_encode($response);
		redirect(base_url().'physioadmin/dashboard/invoice_gen', 'refresh');
	}
	
	public function deactive_client1(){
		$response=array();
		$this->admin->deactive1($_POST['p_id']);
		$result = $this->admin->deactive_account1($_POST['p_id']);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		}
		echo json_encode($response);
	}
	public function invoice_delete() {
		$response=array();
		$result = $this->admin->invoice_delete($_POST['i_id']);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		}
		echo json_encode($response);
		
	}
	public function deactive_client2($client_id)
	{
		$this->db->where('client_id',$client_id);
		$this->db->select('plan')->from('tbl_client');
		$res = $this->db->get();
		$plan = $res->row()->plan;
		echo $plan;
		$this->db->where('client_id',$client_id);
		$this->db->set('status',0);
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
		$this->email->from('no-reply@physioplustech.com', 'Physio Admin');
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
														<p style="color:#666;padding-left:25px;font-size:120%">This Account has been successfully Deactivated</p>
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
		$this->email->subject('Physio Admin Deactivate Account');
		$this->email->message($template);
		$this->email->send(); 
		if($plan == '0'){
			redirect(base_url().'physioadmin/client_det/free_plan/');
		}
		 if($plan == '1'){
			redirect(base_url().'physioadmin/client_det/professional_plan/');
		}
		if($plan == '2'){
			redirect(base_url().'physioadmin/client_det/monetary_plan/');
		}
		if($plan == '3'){
			redirect(base_url().'physioadmin/client_det/enterprise_plan/');
		}
		if($plan == '4'){
			redirect(base_url().'physioadmin/client_det/ultimate_plan/');
		}  
		if($plan == '5'){
			redirect(base_url().'physioadmin/client_det/institute_plan/');
		}  
	}
	public function export_free() {
		$this->load->library('export');
		
		$data['page_name'] = 'concession_group';
		
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		
		$this->db->select('t2.client_id,t2.username,t2.mobile,t1.duration,t1.expire_date,t1.tot_pay_amount,t2.status');
		$this->db->from("tbl_client t2");
		$this->db->join("tbl_validity t1", "t1.client_id=t2.client_id");
		$this->db->where("t1.duration",0);
		$this->db->order_by('t2.client_id', 'desc');
		$q = $this->db->get();
		$qrow = $q->row();
		
		
		
		$this->db->select('t2.client_id,t2.username,t2.mobile,t1.duration,t1.expire_date,t1.tot_pay_amount,t2.status');
		$this->db->from("tbl_client t2");
		$this->db->join("tbl_validity t1", "t1.client_id=t2.client_id");
		$this->db->where("t1.duration",0);
		$this->db->order_by('t2.client_id', 'desc');
		
		$query = $this->db->get();
		$this->export->to_excel($query, 'FreeClient_report');
		
		}
	 public function export_professional() {
		$this->load->library('export');
		
		$data['page_name'] = 'concession_group';
		
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		
		$this->db->select('t2.client_id,t2.username,t2.mobile,t1.expire_date,t1.tot_pay_amount,t1.duration,t2.status');
		$this->db->from("tbl_client t2");
		$this->db->join("tbl_validity t1","t1.client_id = t2.client_id");
		$this->db->where("t2.plan",1);
		$this->db->where("t1.duration !=",0);
		$this->db->order_by('t2.client_id', 'desc');
		$q = $this->db->get();
		$qrow = $q->row();
		
		
		$this->db->select('t2.client_id,t2.username,t2.mobile,t1.expire_date,t1.tot_pay_amount,t1.duration,t2.status');
		$this->db->from("tbl_client t2");
		$this->db->join("tbl_validity t1","t1.client_id = t2.client_id");
		$this->db->where("t2.plan",1);
		$this->db->where("t1.duration !=",0);
		$this->db->order_by('t2.client_id', 'desc');
		
		$query = $this->db->get();
		$this->export->to_excel($query, 'Professional_plan_report');
		
		}
	public function export_institute() {
		$this->load->library('export');
		
		$data['page_name'] = 'concession_group';
		
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		
		$this->db->select('t2.client_id,t2.username,t2.mobile,t1.duration,t1.expire_date,t1.tot_pay_amount,t2.status');
		$this->db->from("tbl_client t2");
		$this->db->join("tbl_validity t1", "t1.client_id=t2.client_id");
		$this->db->where("t2.plan_id",5);
		$this->db->where("t1.duration !=",0);
		$this->db->order_by('t2.client_id', 'desc');
		$q = $this->db->get();
		$qrow = $q->row();
		
		
		
		$this->db->select('t2.client_id,t2.username,t2.mobile,t1.duration,t1.expire_date,t1.tot_pay_amount,t2.status');
		$this->db->from("tbl_client t2");
		$this->db->join("tbl_validity t1", "t1.client_id=t2.client_id");
		$this->db->where("t2.plan_id",5);
		$this->db->where("t1.duration !=",0);
		$this->db->order_by('t2.client_id', 'desc');
		
		$query = $this->db->get();
		$this->export->to_excel($query, 'Institute_report');
		
		}
	public function export_ultimate() {
		$this->load->library('export');
		
		$data['page_name'] = 'concession_group';
		
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		
		$this->db->select('t2.client_id,t2.username,t2.mobile,t1.expire_date,t1.tot_pay_amount,t1.duration,t2.status');
		$this->db->from("tbl_client t2");
		$this->db->join("tbl_validity t1", "t1.client_id=t2.client_id");
		$this->db->where("t2.plan",4);
		$this->db->order_by('t2.client_id', 'desc');
		$q = $this->db->get();
		$qrow = $q->row();
		
		
		
		$this->db->select('t2.client_id,t2.username,t2.mobile,t1.expire_date,t1.tot_pay_amount,t1.duration,t2.status');
		$this->db->from("tbl_client t2");
		$this->db->join("tbl_validity t1", "t1.client_id=t2.client_id");
		$this->db->where("t2.plan",4);
		$this->db->order_by('t2.client_id', 'desc');
		
		$query = $this->db->get();
		$this->export->to_excel($query, 'Ultimate_Report');
	}
	
	public function export_enterprize() {
		$this->load->library('export');
		
		$data['page_name'] = 'concession_group';
		
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		
		$this->db->select('t2.client_id,t2.username,t2.mobile,t1.expire_date,t1.tot_pay_amount,t1.duration,t2.status');
		$this->db->from("tbl_client t2");
		$this->db->join("tbl_validity t1", "t1.client_id=t2.client_id");
		$this->db->where("t2.plan",3);
		$this->db->order_by('t2.client_id', 'desc');
		$q = $this->db->get();
		$qrow = $q->row();
		
		
		
		$this->db->select('t2.client_id,t2.username,t2.mobile,t1.expire_date,t1.tot_pay_amount,t1.duration,t2.status');
		$this->db->from("tbl_client t2");
		$this->db->join("tbl_validity t1", "t1.client_id=t2.client_id");
		$this->db->where("t2.plan",3);
		$this->db->order_by('t2.client_id', 'desc');
		
		$query = $this->db->get();
		$this->export->to_excel($query, 'enterprize_Report');
	}
	
	
	public function export_monetary() {
		$this->load->library('export');
		
		$data['page_name'] = 'concession_group';
		
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		
		$this->db->select('t2.client_id,t2.username,t2.mobile,t1.expire_date,t1.tot_pay_amount,t1.duration,t2.status');
		$this->db->from("tbl_client t2");
		$this->db->join("tbl_validity t1", "t1.client_id=t2.client_id");
		$this->db->where("t2.plan",2);
		$this->db->order_by('t2.client_id', 'desc');
		$q = $this->db->get();
		$qrow = $q->row();
		
		
		
		$this->db->select('t2.client_id,t2.username,t2.mobile,t1.expire_date,t1.tot_pay_amount,t1.duration,t2.status');
		$this->db->from("tbl_client t2");
		$this->db->join("tbl_validity t1", "t1.client_id=t2.client_id");
		$this->db->where("t2.plan",2);
		$this->db->order_by('t2.client_id', 'desc');
		
		$query = $this->db->get();
		$this->export->to_excel($query, 'Monetary_Report');
	}
	
	public function export_activeuser() {
		$this->load->library('export');
		
		$data['page_name'] = 'concession_group';
		
		$data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
		$this->load->helper(array('form'));
		$this->load->library("pagination");
		$segment_array = $this->uri->segment_array();
		
		
		$this->db->select('t2.client_id,t2.first_name,t2.username,t2.mobile,t1.expire_date,t1.tot_pay_amount,t1.duration,t2.status');
		$this->db->from("tbl_client t2");
		$this->db->join("tbl_validity t1", "t1.client_id=t2.client_id");
		$this->db->where("t2.plan",4);
		$this->db->order_by('t2.client_id', 'desc');
		$q = $this->db->get();
		$qrow = $q->row();
		
		
		
		$this->db->select('t2.client_id,t2.first_name,t2.username,t2.mobile,t1.expire_date,t1.tot_pay_amount,t1.duration,t2.status');
		$this->db->from("tbl_client t2");
		$this->db->join("tbl_validity t1", "t1.client_id=t2.client_id");
		$this->db->where("t2.plan",4);
		$this->db->order_by('t2.client_id', 'desc');
		
		$query = $this->db->get();
		$this->export->to_excel($query, 'Activeuser_Report');
	}
	
	public function view_history($client_id) {
		$data['invoiceDetails'] = $this->admin->view_history($client_id);
		$this->load->view('physioadmin/view_history',$data);
	}
	
	public function deactive_clientlist(){
		$response=array();
		$this->admin->deactive2($_POST['p_id']);
		$result = $this->admin->deactive_account2($_POST['p_id']);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Patient deleted successfully.';
		}
		echo json_encode($response);
	}
	
	public function dashboard(){
		header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
	    if($this->session->userdata('user_name') != false) {
	    $data['pagename'] = 'home';
		if($this->session->userdata('user_id') == 1) {
		   	$data['count'] = $this->admin->admin_count();
			$data['count1'] = $this->admin->staff_count();
			$data['count2'] = $this->admin->patient_count();
			$data['count3'] = $this->admin->appointment_count();
			$data['count4'] = $this->admin->billing_count();
			$data['count5'] = $this->admin->referral_count();
			$data['count6'] = $this->admin->exercise_count();
		    $this->load->view('physioadmin/dashboard',$data);
		 } else {
			   $data['back'] = base64_encode(substr($_SERVER['REQUEST_URI'], 1));
				$this->load->helper(array('form'));
				$this->load->library("pagination");
				$segment_array = $this->uri->segment_array();
				
				//Pagination
				$config['per_page'] = 15;
				$where_condition = '';
				
				
				//do searchby
				$do_searchby = array_search("searchby",$segment_array);
				if($do_searchby != false) {
					$data['searchFilter']=true;
					$keyword = urldecode($this->uri->segment($do_searchby+1));
					$keyword = str_replace('_', '/', $keyword);
					$where_condition = "(username LIKE '%".$keyword."%')";
					$data['keyword'] = $keyword;
				}
				 
				//Count
				
				$this->db->select('count(*) as totalrows')->from('tbl_client');
				if($this->session->userdata('user_id')=='2'){
					$this->db->where('city','New Delhi');
				}
				if($this->session->userdata('user_id')=='3'){
					$this->db->where('city','mumbai');
				}
				if($this->session->userdata('user_id')=='4'){
					$this->db->where('city','jaipur');
					$this->db->or_where('city','udaipur');
					$this->db->or_where('city','jodhpur');
				}
				if($this->session->userdata('user_id')=='5'){
					$this->db->where('state','Telangana');
				}
				if($where_condition!='') $this->db->where($where_condition);
				$q = $this->db->get();
				$qrow = $q->row();
				$config['total_rows'] = $qrow->totalrows;
				
				//prepare active record for new query (with limit/offeset/orderby)
				
				$this->db->select('client_id,username,password,email_verified,first_name,last_name,clinic_name,address,city,state,mobile,phone,last_login_date,plan,plan_id');
				$this->db->from("tbl_client");
				if($this->session->userdata('user_id')=='2'){
					$this->db->where('city','New Delhi');
				}
				if($this->session->userdata('user_id')=='3'){
					$this->db->where('city','mumbai');
				}
				if($this->session->userdata('user_id')=='4'){
					$this->db->where('city','jaipur');
					$this->db->or_where('city','udaipur');
					$this->db->or_where('city','jodhpur');
				}
				if($this->session->userdata('user_id')=='5'){
					$this->db->where('state','Telangana');
				}
				if($where_condition!='') $this->db->where($where_condition);
				if($this->uri->segment(4) == 'search'){
					$this->db->where('client_id',$this->uri->segment(5));
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
				$data['client_name']=$this->user_model->getClientname($status);	
				$this->load->view('physioadmin/usage_list',$data);
	      }
	  }
	  else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	public function usage_list(){
		header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
	      if($this->session->userdata('user_name') != false) {
	        $data['pagename'] = 'home';
		   	$data['count'] = $this->admin->admin_count();
			$data['count1'] = $this->admin->staff_count();
			$data['count2'] = $this->admin->patient_count();
			$data['app1'] = $this->admin->app_patient_count();
			$data['count3'] = $this->admin->appointment_count();
			$data['app2'] = $this->admin->app_appointment_count();
			$data['count4'] = $this->admin->billing_count();
			$data['app3'] = $this->admin->app_billing_count();
			$data['count5'] = $this->admin->referral_count();
			$data['count6'] = $this->admin->exercise_count();
			$data['app_update'] = $this->admin->app_last_update();
			$data['patient_update'] = $this->admin->patient_last_update();
			$data['inv_update'] = $this->admin->inv_last_update();
			$data['exe_update'] = $this->admin->exe_last_update();
			$data['user'] = $this->admin->user_count();
			$data['bodychart'] = $this->admin->bodychart_count();
			$data['consent'] = $this->admin->consent_count();
			$data['expense'] = $this->admin->expense_count();
			$data['app4'] = $this->admin->app_expense_count();
			$data['case_notes'] = $this->physioadmin_model->case_notes();
			$data['prog_notes'] = $this->physioadmin_model->prog_notes();
			$data['remark'] = $this->physioadmin_model->remark();
			$data['plan_list'] = $this->physioadmin_model->plan();
			$data['history'] = $this->physioadmin_model->history();
			$data['chief_comp'] = $this->physioadmin_model->chief_comp();
			$data['pain'] = $this->physioadmin_model->pain();
			$data['examn'] = $this->physioadmin_model->examn();
			$data['mexamn'] = $this->physioadmin_model->mexamn();
			$data['sexamn'] = $this->physioadmin_model->sexamn();
			$data['paediatric'] = $this->physioadmin_model->paediatric();
			$data['neuro_exam'] = $this->physioadmin_model->neuro_exam();
			$data['investigation'] = $this->physioadmin_model->investigation();
			$data['prov_diag'] = $this->physioadmin_model->prov_diag();
			$data['medical'] = $this->physioadmin_model->medical();
			$data['goal'] = $this->physioadmin_model->goal();
			$data['session_report'] = $this->physioadmin_model->session_report();
			$data['hip'] = $this->physioadmin_model->hip_report();
			$data['knee'] = $this->physioadmin_model->knee_report();
			$data['elbow'] = $this->physioadmin_model->elbow_report();
			$data['shoulder'] = $this->physioadmin_model->shoulder_report();
			$data['foot'] = $this->physioadmin_model->foot_report();
			$this->load->view('physioadmin/dashboard',$data);
		  } else {
			  redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		  }
	} 
	
	public function export_smscount(){
		header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
	      if($this->session->userdata('user_name') != false) {
		$this->load->library('export');
		$this->db->select('client_id,created_on,username,sms_count,total_sms_limit');
		$this->db->from("tbl_client")->where('status',1);
		$query = $this->db->get();
		$this->export->to_excel($query, 'sms_count_list');
		 } else {
			  redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		  }
	}
	public function edit_client_balance()
	{
		header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	  if($this->session->userdata('user_name') != false) {
		  $current_balance = $this->input->post('curr_wallet_balance'); 
		  $add_balance = ($this->input->post('wallet_balance_add') > 0) ? $this->input->post('wallet_balance_add') : 0; 
		  $minus_balance = ($this->input->post('wallet_balance_minus')>0) ? $this->input->post('wallet_balance_minus'): 0;
		  $new_wallet_bal = ($current_balance+$add_balance)- $minus_balance; 
		  if($new_wallet_bal >= 0)
		  {
			 $client_id = $this->input->post('client_id'); 
			 $this->db->where('client_id',$client_id);
			 $this->db->set('price',$new_wallet_bal);
			 $result = $this->db->update('tbl_balance'); 
			 if($result != ''){
				$response['status'] = 'success';
				$response['message'] = 'Wallet update successfully';
			} else {
				$response['status'] = 'fail';
				$response['message'] = 'Wallet update failed.';
			}
			echo json_encode($response);	
		}
	  }
	  else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
	public function wallet_list()
	{
		header("cache-Control: no-store, no-cache, must-revalidate");
	   header("cache-Control: post-check=0, pre-check=0", false);
	   header("Pragma: no-cache");
	  if($this->session->userdata('user_name') != false) {
		$balance_qery = $this->db->select('WB.name,WB.price,WB.client_id')->from('tbl_balance AS WB')->where(array('WB.price >'=>0))->get();
		$data['wallet_balance'] = ($balance_qery->num_rows()>0) ? $balance_qery->result_array() : array();
			
		$this->load->view('physioadmin/client_wallet_list',$data);
	  }
	  else{
			redirect(base_url()."physioadmin/dashboard/login", "refresh"); 
		 }
	}
}