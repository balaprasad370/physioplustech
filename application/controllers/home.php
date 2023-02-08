<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {  
		parent::__construct();
		
		$this->load->model(array('common_model'));
		
	}
	public function index()
	{
		 
		$data['page_name']='home';  
		$this->load->view('home/index',$data); 
	}
	
	public function about()
	{
		$data['page_name']='about';
		$this->load->view('home/about',$data);
	
	}
	public function pt_focused()
	{
		$data['page_name']='why physioplus';
		$this->load->view('home/pt_focused',$data);
		
	}
	public function access_anywhere()
	{
		$data['page_name']='why physioplus';
		$this->load->view('home/access_anywhere',$data);
		
	}
	public function emr_security()
	{
		$data['page_name']='why physioplus';
		$this->load->view('home/emr_security',$data);
		
	}
	public function easytouse()
	{
		$data['page_name']='why physioplus';
		$this->load->view('home/easytouse',$data);
		
	}
	public function features()
	{
	$data['page_name']='features';
		$this->load->view('home/features',$data);
	
	}
	public function privacy()
	{
		$data['page_name']='';
		$this->load->view('home/privacy',$data);
		
	}
	public function terms()
	{
		$data['page_name']='';
		$this->load->view('home/terms',$data);
		
	}
	public function contact()
	{
		$data['page_name']='contact';
		$this->load->view('home/contact',$data);
		
	}
	public function pricing()
	{
		$data['page_name']='pricing';
		$this->load->view('home/pricing',$data);
	}
	
	public function request_quote()
    {
	
	    $data['page_name']='contact';
		$this->load->view('home/request_quote',$data);
	   
	}
	public function request_demo(){
		$data['page_name']='contact';
		$this->load->view('home/request_demo',$data);
	   
	}
	
	
	public function launch() {
	
	    
		 $this->load->library('email');
		 $this->email->initialize(array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'smtp.sendgrid.net', 
		  'smtp_user' => 'AtulSinghpt', 
		  'smtp_pass' => 'atulsingh123', 
		  'smtp_port' => 587,
		  'crlf' => "\r\n", 
		  'newline' => "\r\n" 
		));
		$body = '<p style="font-size:20px;font-family:Arial, Helvetica, sans-serif;">We have launched our new version 3.0 : <a href="https://physioplustech.in/">Click here</a> to access and start using complementary free features now.</p>';
		$image = '<img src="https://www.physioplustech.in/launch_2.jpg" style="width:500px;height:600px">';
		$this->db->select('username,email,client_id')->from('tbl_client');
		$this->db->where('client_id <','1150');
		$this->db->where('client_id >=','1100');   
		/* $this->db->where('plan_id !=' , '4');
		$this->db->where('plan !=' , '4'); */
		$res=$this->db->get();
		echo $res->num_rows();
		if($res->result_array() != false){
			foreach($res->result_array() as $row){ 
			$email = $row['username'];
			$client_id = $row['client_id']; 
			echo $email;
		    echo $client_id;
           $temp = $body.$image;
		$this->email->from('no-reply@physioplustech.com', 'Physio Plus Tech');
		/* $this->email->to($email);
		$this->email->subject("New Beta Version 3.0 is now launched");
		$this->email->message($temp);
		$this->email->send(); */
		 
  		print_r($temp); 
		   }} 
	 
	 
	}
	
	public function test_mail(){
	 $temp ='
<body class="body" style="padding:0 !important; margin:0 auto !important; display:block !important; min-width:100% !important; width:100% !important; background:#f4ecfa; -webkit-text-size-adjust:none;">
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
												<tr>
													<td class="gradient pt-10" style="border-radius: 10px 10px 0 0; padding-top: 10px;" bgcolor="#361F9F">
														<table width="100%" border="0" cellspacing="0" cellpadding="0">
															<tr>
																<td style="border-radius: 10px 10px 0 0;" bgcolor="#ffffff">
																	 
																	<table width="100%" border="0" cellspacing="0" cellpadding="0">
																		<tr>
																			<td class="img-center p-30 px-15" style="font-size:0pt; line-height:0pt; text-align:center; padding: 30px; padding-left: 15px; padding-right: 15px;">
																				<a href="#" target="_blank"><img src="https://physioplustech.in/frontend_assets/img/New%20Purple%20243x68px%20beta.png"  border="0" alt="" /></a>
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
																									<td class="fluid-img img-center pb-50" style="font-size:0pt; line-height:0pt; text-align:center; padding-bottom: 50px;">
																										<img src="https://www.psd2newsletters.com/templates/purple/images/img_intro_2.png" width="253" height="300" border="0" alt="" />
																									</td>
																								</tr>																							<tr>
																									<td class="title-36 a-center pb-15" style="font-size:22px; line-height:40px; color:#282828; font-family:Arial, sans-serif; min-width:auto !important; text-align:center; padding-bottom: 15px;">
																										<strong>Dear '. $info['ClientName'] .',</strong>
																									</td>
																								</tr>
																								<tr>
																									<td class="text-16 lh-26 a-center pb-25" style="font-size:16px; color:#6e6e6e; font-family:Arial, sans-serif; min-width:auto !important; line-height: 26px; text-align:center; padding-bottom: 25px;">
Thanks for registering with Physio Plus Tech. </br>To verify your email address, please follow the below link
																									</td>
																								</tr>
																								<tr>
																									<td align="center">
																										 
																										<table border="0" cellspacing="0" cellpadding="0" style="min-width: 200px;">
																											<tr>
																												<td class="btn-16 c-white l-white" bgcolor="#361F9F" style="font-size:16px; line-height:20px; mso-padding-alt:15px 35px; font-family:Arial, sans-serif; text-align:center; font-weight:bold; text-transform:uppercase; border-radius:25px; min-width:auto !important; color:#ffffff;">
																													<a href="'.$url.'" target="_blank" class="link c-white" style="display: block; padding: 15px 35px; text-decoration:none; color:#ffffff;">
																														<span class="link c-white" style="text-decoration:none; color:#ffffff;">Click this link</span>
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
											 
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td class="p-50 mpx-15" bgcolor="#9EB3F0" style="border-radius: 0 0 10px 10px; padding: 50px;">
															<table width="100%" border="0" cellspacing="0" cellpadding="0">
																
																<tr>
																	<td class="text-14 lh-24 a-center c-white l-white pb-20" style="font-size:14px; font-family:Arial, sans-serif; min-width:auto !important; line-height: 24px; text-align:center; color:#ffffff; padding-bottom: 20px;">
																		 
																		<a href=""  class="link c-white" style="text-decoration:none; color:#ffffff;"><span class="link c-white" style="text-decoration:none; color:#ffffff;">contact@physioplusnetwork.com</span></a> 
																		<br />
																		<a href="" class="link c-white" style="text-decoration:none; color:#ffffff;"><span class="link c-white" style="text-decoration:none; color:#ffffff;">www.physioplustech.in </span></a> 
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
	</center>
	</body>
 ';
print_r($temp);
	}
	
}