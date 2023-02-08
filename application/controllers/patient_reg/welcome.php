<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class welcome extends CI_Controller {
	  public function __construct()
        {
            parent::__construct();
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
		}
	  public function index()
	  {
        $this->load->view('patient_reg/welcome_message');
	  }
      public function form_list()
    	{
			$this->load->model('form_model');
			/* $this->db->where('client_id',$this->input->post('client_id'));
			$this->db->where('mobile_no',$this->input->post('mobile'));
			$this->db->select('patient_id')->from('tbl_patient_info');
			$res = $this->db->get();
			if($res ->result_array() != false){
				$result = '';
			} else { */
			$result = $this->form_model->form_insert();
			//}
		    $response = array();
				if($result != false){
					$response['status'] = 'success';
					$response['message'] = $result;
					
				} else {
					$response['status'] = 'Failure';
					$response['message'] = 'No Data Found';
				}
				echo json_encode($response);
				
	    }
	 
	 public function success(){
		 $this->load->view('patient_reg/success');
	}
    
	
    
	
	
	
	
	
	
	


	
		
	
	
	
	
	
	
	
	
	
	
	
		 
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */