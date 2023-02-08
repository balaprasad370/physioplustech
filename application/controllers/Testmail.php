<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Testmail extends CI_Controller{
	
	public function __construct() {
		parent::__construct();  
		
	   }
	   function index()
	   {
		
		$this->load->library('email');
		 
		/*  $config1=array(
			'useragent'   => 'Physio Plus Tech',
			'protocol'    => 'smtp',
			'smtp_host'   => 'mail.physioplustech.com',
			'smtp_user'   => 'no-reply@physioplustech.com',
			'smtp_pass'   => 'EvM.D]ITkxJs',
			'mailtype'    => 'html',
			'smtp_crypto' => 'tsl',
			'_smtp_auth'  => TRUE
		);
		 $config = array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'smtp-relay.sendinblue.com',  
		  'smtp_user' => 'info@physioplustech.asia',
		  'smtp_pass' => 'ZYIU5EJ2rMC6d7XO',
		  'smtp_port' => 587,
		  'crlf' => "\r\n",
		  'newline' => "\r\n"
		); 
		 
		 $this->email->initialize($config); */
		
		$this->email->from('no-reply@physioplustech.com', 'Physio Plus Tech'); // from no-reply@physioplustech.com
		$this->email->to('utkhedeatul@gmail.com');
		$this->email->subject("Test-mail_check");
		$this->email->message("Testing");
		$this->email->send();
		//echo $this->email->print_debugger();
		
			 if (!$this->email->send())
			{
				echo "not send";	
				echo $this->email->print_debugger();
			} else{
				/*echo 'Sent';
				echo $this->email->print_debugger();*/
			} 
	   } 
} 