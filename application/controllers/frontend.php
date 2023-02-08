<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  Frontend extends CI_Controller {

	public function __construct() {  
		parent::__construct();
		
		$this->load->model(array('common_model'));
		
	}

	public function index()
	{
		/* $this->load->helper('captcha');
		$this->load->helper('url');
		 $vals = array(
				  'img_path'  => './captcha/',
				 'img_url'  => base_url().'/captcha/',
				 'img_width' => 150,
				 'img_height' => '50',
				 'expiration' => 7200
				 );

		$cap = create_captcha($vals);
		$this->session->set_userdata('captchaWord', $cap['word']);
		$data['word'] = $cap['word'];
		$data['captcha'] = $cap['image']; */    
		/* header('Content-type: text/html; charset=utf-8');*/
		$data['page_name']='home';  
		$this->load->view('frontend/index',$data); 
	}
	public function about()
	{
		$data['page_name']='about';
		$this->load->view('frontend/about',$data);
	
	}
	public function pt_focused()
	{
	$data['page_name']='why physioplus';
		$this->load->view('frontend/pt_focused',$data);
	
	}
	public function access_anywhere()
	{
	$data['page_name']='why physioplus';
		$this->load->view('frontend/access_anywhere',$data);
	
	}
	public function emr_security()
	{
	$data['page_name']='why physioplus';
		$this->load->view('frontend/emr_security',$data);
	
	}
	public function easytouse()
	{
	$data['page_name']='why physioplus';
		$this->load->view('frontend/easytouse',$data);
	
	}
	public function features()
	{
	$data['page_name']='features';
		$this->load->view('frontend/features',$data);
	
	}
	public function privacy()
	{
		$data['page_name']='';
		$this->load->view('frontend/privacy',$data);
		
	}
	public function terms()
	{
		$data['page_name']='';
		$this->load->view('frontend/terms',$data);
		
	}
	public function blog()
	{
	$data['page_name']='blog';
		$this->load->view('frontend/blog',$data);
	
	}
	public function pricing()
	{
	$data['page_name']='pricing';
		$this->load->view('frontend/pricing',$data);
	
	}
	public function contact()
    {
	
	    $data['page_name']='contact';
		 
	 	$this->load->view('frontend/contact',$data);
	   
	}
	public function test()
	{
		$this->load->view('frontend/test1');
	}
	public function test1()
	{
		$this->load->view('send_sms');
	}
	public function request_quote()
    {
	
	    $data['page_name']='contact';
		$this->load->view('frontend/request_quote',$data);
	   
	}
	public function request_quote_add(){
		
	   $data =  $this->common_model->request_quote_add();
		$response = array();
		 if($data == ''){
				$this->session->set_flashdata('Error', 'Contact Details Has not Been Stored.');	
			} else {
				$this->session->set_flashdata('Message', '<h3>Thanks for being awesome!</h3>We have received your message and would like to thank you for writing to us.  we will reply by email as soon as possible.');
			}
			redirect(base_url().'frontend/request_quote', 'refresh');   
			
  }
  public function gpay(){
		 $data['page_name'] ='gpay';
		 $this->load->view('frontend/gpay',$data);
	 }
	 
	  public function add_request() {
			
		    $data =  $this->common_model->add_request();
			$response = array();
		 if($data == ''){
				$this->session->set_flashdata('Error', 'Contact Details Has not Been Stored.');	
			} else {
				$this->session->set_flashdata('Message', '<h3>Thanks for being awesome!</h3>We have received your message and would like to thank you for writing to us.  we will reply by email as soon as possible.');
			}
			redirect(base_url().'frontend/request_demo', 'refresh');  
		  
	}
		
	public function contact_add(){
		
	   $data =  $this->common_model->contact_add();
		$response = array();
		 if($data == ''){
				$this->session->set_flashdata('Error', 'Contact Details Has not Been Stored.');	
			} else {
				$this->session->set_flashdata('Message', '<h3>Thanks for being awesome!</h3>We have received your message and would like to thank you for writing to us.  we will reply by email as soon as possible.');
			}
			redirect(base_url().'frontend/contact', 'refresh');   
			
  }
  public function request_demo(){
		$data['page_name']='contact';
		$this->load->view('frontend/request_demo',$data);
	   
	}
	
   public function testimonials(){
		$data['page_name']='testimonials';
		$this->load->view('frontend/testimonials',$data);
	   
	}
	public function patient_survey($patient_id,$staff_id)
	{
		$staffQ = $this->db->select("S.first_name,S.email,S.mobile_no,C.clinic_name")->from('tbl_staff_info AS S')->join("tbl_client AS C","S.client_id = C.client_id","inner")->where('S.staff_id',$staff_id)->get();
		$staffData = $staffQ->row_array();
		$data['clinic_name'] = $staffData['clinic_name'];
		$data['staff_name'] = $staffData['first_name'];
		$data['patient_id'] = $patient_id;
		$data['staff_id'] = $staff_id;
		$this->load->view('frontend/patient_servy',$data);
	}
	public function save_nps_score()
	{
		$this->load->model("npsdata_model");
		$status = $this->npsdata_model->saveNps_data($this->input->post());
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */