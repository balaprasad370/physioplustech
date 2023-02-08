<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Webservice_clinic extends CI_Controller
{
	public function __construct() { 
		parent::__construct();
		$this->load->library(array('upload', 'image_transform'));
		$this->load->model(array('patient_model','service_model','mail_model','clinicapp_model'));
		parent::__construct();  
        $this->output->set_header('Access-Control-Allow-Origin: *');
   }
	
	public function hospital_details(){
	    $client_id = $this->uri->segment(3);
		$result = $this->service_model->getLocations($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
		 
   }
   public function client_details(){
	   error_reporting(0);
	    $client_id = $this->uri->segment(3);
		//$this->service_model->getLocations_lat($client_id);
		$result = $this->service_model->client_details($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result; 
   }
   public function patient_list(){
	    $client_id = $_GET["client_id"];
		$result = $this->clinicapp_model->oppatient_details($client_id);
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function user_login() {
		$result = $this->clinicapp_model->user_login();
		$response = array();
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Login successfully.';
			$response['ClientData'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Email or Mobile Number is invalid';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function admin_login() {  
		$result = $this->clinicapp_model->admin_login();
		$response = array();
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Login successfully.';
			$response['ClientData'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Email or Mobile Number is invalid';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function prescription_details() {
		$result = $this->clinicapp_model->prescription_details();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function invest_document() {
		$result = $this->clinicapp_model->invest_document();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function clinical_notes() {
		$result = $this->clinicapp_model->clinical_notes();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function notes_add() {
		 $response = array();
		 if($_GET['notes'] != ''){
		 $data = array(
			 'case_notes' => $_GET['notes'],
			 'client_id' => $_GET['branch'],
			 'patient_id' => $_GET['patient_id'],
			 'cn_date' => date('Y-m-d')
		 );
		 $this->db->insert('tbl_patient_case_notes',$data);
	  	 } else {} 
		 if($_GET['assessment'] != ''){
		  $data1 = array(
			 'remarks' => $_GET['assessment'],
			 'client_id' => $_GET['branch'],
			 'patient_id' => $_GET['patient_id'],
			 'remark_date' => date('Y-m-d')
		 );
		 $this->db->insert('tbl_patient_remarks',$data1);
	  	  } else {} 
		  if($_GET['object'] != ''){
		  $data2 = array(
			 'prog_notes' => $_GET['object'],
			 'client_id' => $_GET['branch'],
			 'patient_id' => $_GET['patient_id'],
			 'pn_date' => date('Y-m-d')
		 );
		 $this->db->insert('tbl_patient_prog_notes',$data2);
	  	  } else {} 
		  if($_GET['plan'] != ''){
		  $data3 = array(
			 'description' => $_GET['plan'],
			 'client_id' => $_GET['branch'],
			 'patient_id' => $_GET['patient_id'],
			 'plan_date' => date('Y-m-d')
		 );
		 $this->db->insert('tbl_soap_plan',$data3);
		 } else {} 
	  	 $id = $_GET['patient_id'];
		 if($id != false){
			 $response['status'] = 'success';
			 $response['message'] = 'Patient already Exist.';
		 } else {
			$response['status'] = 'Failure';
			$response['message'] = 'Patient has been Registered successfully';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	 }

	 public function patient_details() {
		 $result = $this->clinicapp_model->patient_details();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	 }
	 public function appointment_list(){
	    $result = $this->clinicapp_model->appointment_list();
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
  	 public function appointment_details() {
		$result = $this->clinicapp_model->appointment_details();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	 public function cancelappointment_list(){
	    $result = $this->clinicapp_model->cancelappointment_list();
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
  
   public function appointment_order(){
	    $result = $this->clinicapp_model->appointment_order();
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function bill_list() {
	   $result = $this->clinicapp_model->bill_list();
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function expense_list() {
	   $result = $this->clinicapp_model->expense_list();
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
    public function bill_order(){  
	    $result = $this->clinicapp_model->bill_order();
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function item_details(){  
	    $result = $this->clinicapp_model->item_details();
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   } 
   public function expenseitem_details(){  
	    $result = $this->clinicapp_model->expenseitem_details();
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   } 
   public function expenseclientitem_details(){  
	    $result = $this->clinicapp_model->expenseclientitem_details();
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   } 
   public function add_invoice() {
	   $id = $_GET['patient_id'];
	   if($id != false){
	     $result = $this->clinicapp_model->add_invoice();
		 $response = array();
				if($result != false){
					$response['status'] = 'Success';
					$response['message'] = 'Invoice added Successfully';
				} else {
					$response['status'] = 'Failure';
					$response['message'] = 'No Data Found';
					
				}
	    } else {
		   $response = array();
		   $response['status'] = 'Failure';
		   $response['message'] = 'No Data Found';
		
	    }
	   
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function edit_item() {
	    $bill_id = $_GET['bill_id'];
	    $patient_id = $this->uri->segment(4);
	    $result = $this->clinicapp_model->edit_item($bill_id);
		$json_result = json_encode($result);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   } 
   public function edit_invoice(){
	    $bill_id = $_GET['bill_id'];
	    $patient_id = $this->uri->segment(4);
	    $result = $this->clinicapp_model->edit_invoice($bill_id);
		$json_result = json_encode($result);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function update_invoice() {
	    $result = $this->clinicapp_model->update_invoice();
		$response = array();
		if($result == false){
			$response['status'] = 'Success';
			$response['message'] = 'Invoice added Successfully';
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function item_device() {
	     $this->db->where('created_date','2017-05-18');
		 $this->db->select('*')->from('tbl_invoice_detail');
		 $res = $this->db->get();
		 print_r($res->result_array());			
   }
    public function homepatient_list(){
	    $client_id = $_GET["client_id"];
		$result = $this->clinicapp_model->homepatient_details($client_id);
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
public function check_version() {
		$client_id = $_GET["client_id"];
		$result = $this->clinicapp_model->check_version($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'Success';
			$response['message'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	
}
   
public function todays_appt() {
		$client_id = $_GET["client_id"];
		$result = $this->clinicapp_model->todays_appt($client_id);
		$response = array();
		if($result != false){
		$json_result = json_encode($result);
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
			
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	
}
public function todays_bills() {
		$client_id = $_GET["client_id"];
		$result = $this->clinicapp_model->todays_bills($client_id);
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	
   }

public function todays_newpat() {
		$client_id = $_GET["client_id"];
		$result = $this->clinicapp_model->todays_newpat($client_id);
		$response = array();
		if($result != false){
		  $json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
			
		}
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	
}
public function todays_DRpat() {    
		$client_id = $_GET["client_id"];
		$result = $this->clinicapp_model->todays_DRpat($client_id);
		$response = array();
		if($result != false){
		  $json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
			
		}
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	
}
public function todays_pat() {
		$client_id = $_GET["client_id"];
		$result = $this->clinicapp_model->todays_pat($client_id);
		$response = array();
		if($result != false){
		$json_result = json_encode($result);
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
			
		}
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	
}
public function todays_income() {
		$client_id = $_GET["client_id"];
		$result = $this->clinicapp_model->todays_income($client_id);
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	
   }
  public function todays_expense() {
		$client_id = $_GET["client_id"];
		$result = $this->clinicapp_model->todays_expense($client_id);
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	
}
public function todays_expense_items() {
		$client_id = $_GET["client_id"];
		$result = $this->clinicapp_model->todays_expense_items($client_id);
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	
}
 public function bill_details() {
		$client_id = $_GET["client_id"];
		$result = $this->clinicapp_model->bill_details($client_id);
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	
} 
    public function advanceBalance() {  
		$patient_id = $_GET["patient_id"];
		$result = $this->clinicapp_model->advanceBalance($patient_id);
		$response = array();
		if($result != false){
			$response['status'] = 'sucess';
			$response['message'] = $result;
			$json_result = json_encode($response);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	
}    
 public function add_pay() {
		$result = $this->clinicapp_model->add_pay();
		$response = array();
		if($result != false){
			$response['status'] = 'Success';
			$response['message'] = 'Amount has been added';
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Amount has not been added';
			
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	
 }  
 public function add_advance() {
		$result = $this->clinicapp_model->add_advance();
		$response = array();
		if($result != false){
			$response['status'] = 'Success';
			$response['message'] = 'Amount has been added';
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Amount has not been added';
			
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	
 } 
public function expense_additem() {
		$result = $this->clinicapp_model->expense_additem();
		$response = array();
		if($result == false){
			$response['status'] = 'Success';
			$response['message'] = 'Amount has been added';
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Amount has not been added';
			
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	
 } 
 public function edit_expense() {
	 $result = $this->clinicapp_model->edit_expense();
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Amount has not been added';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	 
 }
 public function edit_expense_item() {
	 $result = $this->clinicapp_model->edit_expense_item();
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Amount has not been added';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	 
 }
 public function consultant_details() {
	 $result = $this->clinicapp_model->consultant_details();
		$response = array();
		if($result != false){
			$response['status'] = 'Success';
			$response['message'] = $result;
			
		
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Amount has not been added';
			
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	 
 }
 public function update_expense() {
		$result = $this->clinicapp_model->update_expense();
		$response = array();
		if($result == false){
			$response['status'] = 'Success';
			$response['message'] = 'Amount has been added';
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Amount has not been added';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	
 }
 public function add_treatment() {
		$result = $this->clinicapp_model->add_treatment();
		$response = array();
		if($result != false){
			$response['status'] = 'Success';
			$response['message'] = 'Amount has been added';
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Amount has not been added';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	
 }
 public function add_expense() {
		$result = $this->clinicapp_model->add_expense();
		$response = array();
		if($result != false){
			$response['status'] = 'Success';
			$response['message'] = 'Amount has been added';
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Amount has not been added';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	
 }
 public function invoice_terms() {  
		$result = $this->clinicapp_model->invoice_terms();
		$response = array();
		if($result != false){
			$response['status'] = 'Success';
			$response['message'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Amount has not been added';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
 }
 public function edit_terms() {  
		$result = $this->clinicapp_model->edit_terms();
		$response = array();
		if($result != false){
			$response['status'] = 'Success';
			$response['message'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Amount has not been added';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
 }
 public function profile_details() {  
		$result = $this->clinicapp_model->profile_details();
		$response = array();
		if($result != false){
			$response['status'] = 'Success';
			$response['message'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Amount has not been added';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
 }
  public function edit_profile() {      
		$result = $this->clinicapp_model->edit_profile();
		$response = array();
		if($result != false){
			$response['status'] = 'Success';
			$response['message'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Amount has not been added';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
 }
  public function edit_clinicdetails() {  
		$result = $this->clinicapp_model->edit_clinicdetails();
		$response = array();
		if($result != false){
			$response['status'] = 'Success';
			$response['message'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Amount has not been added';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
 }
 public function change_password() {  
		$result = $this->clinicapp_model->change_password();
		$response = array();
		if($result != false){
			$response['status'] = 'Success';
			$response['message'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Amount has not been added';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
 }
 public function calendar_details() {  
		$result = $this->clinicapp_model->calendar_details();
		$response = array();
		if($result != false){
			$response['status'] = 'Success';
			$response['message'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Amount has not been added';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
 }
 public function slot_details() {  
		$result = $this->clinicapp_model->slot_details();
		$response = array();
		if($result != false){
			$response['status'] = 'Success';
			$response['message'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Amount has not been added';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
 }
 public function edit_calendardetails() {  
		$result = $this->clinicapp_model->edit_calendardetails();
		$response = array();
		if($result != false){
			$response['status'] = 'Success';
			$response['message'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Amount has not been added';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
 }
 public function get_id(){
	    $result = $this->clinicapp_model->get_id();
		$response = array();
		if($result != false){
			$response['status'] = 'Success';
			$response['message'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Amount has not been added';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
 }
 public function search_patientname(){
	   $branch = $_GET['branch'];
		    $this->db->where('client_id',$branch);
			$this->db->select('patient_id,first_name,last_name,age,patient_code')->from('tbl_patient_info');
			$query = $this->db->get();
			$prefix = '';
		echo "[\n";
		foreach($query->result_array() as $row){
			echo $prefix . "{\n";
			echo '  "patient_id" : "' . $row['patient_id'] . '",' . "\n";
			echo '  "first_name" : "' .$row['first_name'].' '.$row['last_name'].'('.$row['patient_code'].')'.' ('.$row['age'].')'.'"'. "\n";
			 echo "}";
			$prefix = ",\n";
		}  
		echo "\n]";
 }
 public function notify_patientname(){
	   $branch = $_GET['branch'];
		    $this->db->where('client_id',$branch);
			$this->db->where('token !=','');
			$this->db->select('patient_id,first_name,last_name,age,patient_code')->from('tbl_patient_info');
			$query = $this->db->get();
			if($query->result_array() != false){ 
			$prefix = '';
			echo "[\n";
			foreach($query->result_array() as $row){
				echo $prefix . "{\n";
				echo '  "patient_id" : "' . $row['patient_id'] . '",' . "\n";
				echo '  "first_name" : "' .$row['first_name'].' '.$row['last_name'].'('.$row['patient_code'].')'.' ('.$row['age'].')'.'"'. "\n";
				 echo "}";
				$prefix = ",\n";
			}  
			echo "\n]";
	 } else {
		 echo 'False';
	 }
 }
 public function notifysend_patientname(){
	   $branch = $_GET['branch'];
		    $this->db->where('client_id',$branch);
			$this->db->where('token !=','');
			$this->db->select('patient_id,first_name,last_name,age')->from('tbl_patient_info');
			$query = $this->db->get();
			$prefix = '';
		echo "[\n";
		foreach($query->result_array() as $row){
			echo $prefix . "{\n";
			echo '  "id" : "' . $row['patient_id'] . '",' . "\n";
			echo '  "title" : "' .$row['first_name'].' '.$row['last_name'].'('.$row['age'].')'.'"'. "\n";
			 echo "}";
			$prefix = ",\n";
		}  
		echo "\n]";
 }
  public function session_patientname(){
	   $branch = $_GET['branch'];
		    $this->db->where('pi.client_id',$branch);
			$this->db->select('pi.patient_id,pi.first_name,pi.last_name,pi.age')->from('tbl_patient_info pi');
			$this->db->join('tbl_session_det si','si.patient_id = pi.patient_id');
			$query = $this->db->get();
			$prefix = '';
		echo "[\n";
		foreach($query->result_array() as $row){
			echo $prefix . "{\n";
			echo '  "patient_id" : "' . $row['patient_id'] . '",' . "\n";
			echo '  "first_name" : "' .$row['first_name'].' '.$row['last_name'].'('.$row['age'].')'.'"'. "\n";
			 echo "}";
			$prefix = ",\n";
		}  
		echo "\n]";
 }
 public function treatment_patientname(){
	   $branch = $_GET['branch'];
		    $this->db->where('pi.client_id',$branch);
			$this->db->select('pi.patient_id,pi.first_name,pi.last_name,pi.age')->from('tbl_patient_info pi');
			$this->db->join('tbl_session_det si','si.patient_id = pi.patient_id');
			$query = $this->db->get();
			$prefix = '';
		echo "[\n";
		foreach($query->result_array() as $row){
			echo $prefix . "{\n";
			echo '  "patient_id" : "' . $row['patient_id'] . '",' . "\n";
			echo '  "first_name" : "' .$row['first_name'].' '.$row['last_name'].'('.$row['age'].')'.'"'. "\n";
			 echo "}";
			$prefix = ",\n";
		}  
		echo "\n]";
 }
 public function approvepatient_list(){
	    $client_id = $_GET["client_id"];
		$result = $this->clinicapp_model->approvepatient_list($client_id);
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function approveappointment_list(){
	    $result = $this->clinicapp_model->approveappointment_list();
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
    public function staffuser_login() {
		$result = $this->clinicapp_model->staffuser_login();
		$response = array();
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Login successfully.';
			$response['ClientData'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Email or Mobile Number is invalid';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}  
    public function treatment_datedetails(){
	    $result = $this->clinicapp_model->treatment_datedetails();
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
    public function cancelappointment_order(){
	    $result = $this->clinicapp_model->cancelappointment_order();
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function approve_appointments(){
		$appointment_id = $_GET["appointment_id"];
		$result = $this->clinicapp_model->approve_appointments($appointment_id);
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Appointment has been deleted successfully.';
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Appointment has not been deleted successfully.';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;  
	}
	public function approve_patients(){
		$result = $this->clinicapp_model->approve_patients();
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Appointment has been deleted successfully.';
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Appointment has not been deleted successfully.';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;  
	}
	public function settings_terms() {  
		$result = $this->clinicapp_model->settings_terms();
		$response = array();
		if($result != false){
			$response['status'] = 'Success';
			$response['message'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Amount has not been added';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
 }
 public function compliants_add() {
		$result = $this->clinicapp_model->compliants_add();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	 public function pain_add() {
		$result = $this->clinicapp_model->pain_add();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	 public function treatment_session() {
		$result = $this->clinicapp_model->treatment_session();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function add_session() {
		$result = $this->clinicapp_model->add_session();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
		
		
	}
	public function add_protocolsession() {
		$result = $this->clinicapp_model->add_protocolsession();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function add_treatmentprotocol() {
		$result = $this->clinicapp_model->add_treatmentprotocol();
		$response = array();
		if($result != ''){
			$response['status'] = 'Success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
		
		
	}
	
	
	public function approve_patientscount() {
		$client_id = $_GET['branch'];
		$result = $this->clinicapp_model->approve_patientscount($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function approve_appointmentscount() {
		$client_id = $_GET['branch'];
		$result = $this->clinicapp_model->approve_appointmentscount($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function edit_appointment() {
	   $client_id = $_GET["mainbranch"];
	   $this->db->select('sch_slot,sch_time')->from('tbl_settings')->where('client_id',$client_id);
	   $query = $this->db->get();
	   if($query->result_array() != false){
	     $slot = $query->row()->sch_slot;
	   } else { 
	     $slot = '30';
	   }
	   $To = date("H:i:s", strtotime($_GET["time"]));
	   $To1 = date("H:i:s", strtotime($_GET["time"])+($slot*60));
	   
	    $insert = array(
				'client_id' => $_GET["branch"],
				'start' =>date('Y-m-d',strtotime($_GET["date"])).' '.$To,
				'end' => date('Y-m-d',strtotime($_GET["date"])).' '.$To1,
				'appointment_from' => date('Y-m-d',strtotime($_GET["date"])),
				'appointment_to' => date('Y-m-d',strtotime($_GET["date"])),
				'title' => $_GET["name"],
				'har_mob_no' => $_GET["mobile"],
				'har_email' => $_GET["email"],
		        't_status' =>'0',
	      );
	   
		$this->db->where('appointment_id',$_GET["appointment_id"]);
		$this->db->update('tbl_appointments', $insert);
		
		$response = array();
		if($_GET["appointment_id"] != ''){
			$response['status'] = 'success';
			$response['message'] = 'Appointment has been  edited successfully.';
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Appointment has not been edited successfully.';
		}
	    
	    $json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result; 
    } 
	public function chief_compliants_list() {
		$client_id = $_GET['branch'];
		$patient_id = $_GET['patient_id'];
		$result = $this->clinicapp_model->chief_compliants_list($client_id,$patient_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function pain_list() {
		$client_id = $_GET['branch'];
		$patient_id = $_GET['patient_id'];
		$result = $this->clinicapp_model->pain_list($client_id,$patient_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
		
	}
	public function treatment_protocolslist() {
		$client_id = $_GET['branch'];
		$patient_id = $_GET['patient_id'];
		$result = $this->clinicapp_model->treatment_protocolslist($client_id,$patient_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function patient_register() {
	   $this->db->where('mobile_no',$_GET["mobile"]);
	   $this->db->where('client_id',$_GET["branch"]);
	   $this->db->select('patient_id')->from('tbl_patient_info')->where('client_id',$_GET["branch"]);
	   $query = $this->db->get();
		   if($query->result_array() != false){
						$patient_id = $query->row()->patient_id;
						$status = '0';
		   } else {
			  $patient_info=array(
		        'client_id' => $_GET["branch"],
				'first_name' => $_GET["name"],
				'appoint_date' => date('Y-m-d'),
				'gender' => $_GET["gender"],
				'mobile_no' => $_GET["mobile"],
				'email' => $_GET["email"],
				'home_visit' => $_GET["patient_type"],
				'register_by' => 'app',
				'referrer_id' => $_GET["referrer"],
				'patient_code' => $this->generate_code()
			);
			$this->db->insert('tbl_patient_info', $patient_info);
			$patient_id = $this->db->insert_id();
			
			
			$status = '1';
		}
		$response = array();
		if($status != 1){
			$response['status'] = 'Failure';
			$response['message'] = 'Patient already Exist.';
			$response['patient_id'] = $patient_id;
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Patient has been Registered successfully';
			$response['patient_id'] = $patient_id;
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result; 
		
	}
	public function generate_code() {
		$gender = 'Gender';
		$string  = 'P' . ucfirst(substr($gender,0,1)) . ucfirst(substr($_GET["name"],0,1)) . '/' . date('my') . '/';
		$this->db->select('patient_code')->from('tbl_patient_info'); 
		if($this->session->userdata('all_locations') == true)
		{
			$this->db->where_in('client_id',$_GET["branch"]);
		}else{
			$this->db->where('client_id',$_GET["branch"]);
		}
		$this->db->like('patient_code', $string, 'after');
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $string . ($query->num_rows() + 1);
		} else {
			return $string . '1';
		}
	}
	public function book_appointment() {
	   $client_id = $_GET["mainbranch"];
	   $patient_id = $_GET["name"];
	   
	   $this->db->where('staff_id',$_GET['staff']);
	   $this->db->select('dr_color')->from('tbl_staff_info');
	   $query1 = $this->db->get();
	   $color = $query1->row()->dr_color;
	   
	   $this->db->where('patient_id',$patient_id);
	   $this->db->select('first_name,last_name,email,mobile_no')->from('tbl_patient_info');
	   $query1 = $this->db->get();
	   $name = $query1->row()->first_name.' '.$query1->row()->last_name;
	   $email = $query1->row()->email;
	   $mobile_no = $query1->row()->mobile_no;
	   
	   $this->db->select('sch_slot,sch_time')->from('tbl_settings')->where('client_id',$client_id);
	   $query = $this->db->get();
	   if($query->result_array() != false){
			$slot = $query->row()->sch_slot;
	   } else {
		   $slot = '30';
	   }
	   $To = date("H:i:s", strtotime($_GET["time"]));
	   $To1 = date("H:i:s", strtotime($_GET["time"])+($slot*60));
	   
	    $insert = array(
				'patient_id' => $patient_id,
				'client_id' => $_GET["branch"],
				'staff_id' => $_GET["staff"],
				'start' =>date('Y-m-d',strtotime($_GET["date"])).' '.$To,
				'end' => date('Y-m-d',strtotime($_GET["date"])).' '.$To1,
				'appointment_from' => date('Y-m-d',strtotime($_GET["date"])),
				'appointment_to' => date('Y-m-d',strtotime($_GET["date"])),
				'title' => $name,
				'har_mob_no' => $mobile_no,
				'har_email' => $email,
				'color'=>$color
				
	      );
		$this->db->insert('tbl_appointments', $insert);
		$appointment_id = $this->db->insert_id();
		$response = array();   
		if($appointment_id != ''){  
			$response['status'] = 'success';
			$response['message'] = 'Appointment has been added successfully.';
			$response['patient_id'] = $patient_id;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Appointment has not been added successfully.';
		}
	   
	   
	    $json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result; 
   }
   public function balance_sheet(){
		$client_id = $_GET['branch'];
		$result = $this->clinicapp_model->balance();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
		
	}
	public function myaccounts(){
	    $client_id = $_GET['branch'];
		$result = $this->clinicapp_model->myaccounts($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
		 
   }
   public function myaccount()
	{
		$client_id = $_GET['branch'];
		$result = $this->clinicapp_model->myaccount();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function admin_token_update() {  
	    $result = $this->clinicapp_model->admin_token_update();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function patient_token_update() {  
	    $result = $this->clinicapp_model->patient_token_update();
		$json_result = json_encode($result);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function staff_token_update() {
	    $result = $this->clinicapp_model->staff_token_update();
		$json_result = json_encode($result);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function client_notification() {
	   $result = $this->clinicapp_model->client_notification();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function unread_patreg() {
	   $result = $this->clinicapp_model->unread_patreg();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = '0';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function unread_aptreq() {
	   $result = $this->clinicapp_model->unread_aptreq();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = '0';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function unread_exereq() {
	   $result = $this->clinicapp_model->unread_exereq();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = '0';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function unread_exesend() {
	   $result = $this->clinicapp_model->unread_exesend();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = '0';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   
   public function read_patreg() {
	   $result = $this->clinicapp_model->read_patreg();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = '0';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function read_aptreq() {
	   $result = $this->clinicapp_model->read_aptreq();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = '0';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function read_exereq() {
	   $result = $this->clinicapp_model->read_exereq();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = '0';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function read_exesend() {
	   $result = $this->clinicapp_model->read_exesend();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = '0';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function client_notification1() {
	   $result = $this->clinicapp_model->client_notification1();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function accept_notification() {  
	   
		$result = $this->clinicapp_model->accept_notification();
		$json_result = json_encode($result);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function get_notifications() {
		$result = $this->clinicapp_model->all_notifications();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function clientnotify(){
		$result = $this->clinicapp_model->clientnotify();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function get_notify() {
		$result = $this->clinicapp_model->get_notify();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function notify_details() {
		$result = $this->clinicapp_model->notify_details();
		$response = array();
		if($result != false){
			$response['status'] = 'success';  
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function client_register()
	{
		$result = $this->clinicapp_model->client_register();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function check_mail()
	{
		$result = $this->clinicapp_model->check_mail();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function plan() {
		$client_id = $this->uri->segment(3);
		$data['profileInfo'] = $this->clinicapp_model->getcheckdet($client_id);
		$this->load->view('changeplan_app',$data);
	}
	public function delete_notification()
	{
		$notification_id = $_GET['notification_id'];
		$result = $this->clinicapp_model->delete_notification($notification_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function clinic_details() {
		$result = $this->clinicapp_model->clinic_details();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function session_details() {
		$result = $this->clinicapp_model->session_details();
		$response = array();
		if($result != ''){
			$response['status'] = 'Success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
		
		
	}
	public function objects() {
		$result = $this->clinicapp_model->objects();
		$response = array();
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function assess() {
		$result = $this->clinicapp_model->assess();
		$response = array();
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function plan_details() {
		$result = $this->clinicapp_model->plan();
		$response = array();
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;  
	}
	public function session_list() {
		$result = $this->clinicapp_model->session_list();
		$response = array();
		if($result != ''){
			$response['status'] = 'Success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function staff_register() {
		$result = $this->clinicapp_model->staff_register();
		$response = array();
		if($result != ''){
			$response['status'] = 'Success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function staff_list() {
		$result = $this->clinicapp_model->staff_list();
		$response = array();
		if($result != ''){
			$response['status'] = 'Success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function sign_details() {
		$result = $this->clinicapp_model->sign_details();
		$response = array();
		if($result != ''){
			$response['status'] = 'Success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function events_list() {  
		$result = $this->clinicapp_model->events_list();
		$response = array();
		if($result != ''){
			$response['status'] = 'Success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function cityevents_list() {  
		$result = $this->clinicapp_model->cityevents_list();
		$response = array();
		if($result != ''){
			$response['status'] = 'Success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function event_details() {  
		$events_id = $_GET['events_id'];
		$result = $this->clinicapp_model->event_deatils($events_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
    public function add_physiotimes() {
		$client_id = $_GET['branch'];
		$result = $this->clinicapp_model->add_physiotimes($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function view_physiotimes() {  
		$result = $this->clinicapp_model->view_physiotimes();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	} 
    public function add_likes() {
		$times_id = $_GET['times_id'];
		$result = $this->clinicapp_model->add_likes($times_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}	
	public function search_ankle(){
		$result = $this->clinicapp_model->search_ankle();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function search_cervical(){
		$result = $this->clinicapp_model->search_cervical();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function search_education(){
		$result = $this->clinicapp_model->search_education();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function search_elbow(){
		$result = $this->clinicapp_model->search_elbow();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function search_hip(){
		$result = $this->clinicapp_model->search_hip();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function search_lumber(){
		$result = $this->clinicapp_model->search_lumber();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function search_shoulder(){
		$result = $this->clinicapp_model->search_shoulder();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function search_special(){
		$result = $this->clinicapp_model->search_special();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
   public function add_exercise() {
		$result = $this->clinicapp_model->add_exercise();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
    public function exercise_list() {
		$client_id = $_GET['branch'];
		$result = $this->clinicapp_model->exercise_list($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function default_exercise() {
		$client_id = $_GET['branch'];
		$result = $this->clinicapp_model->default_exercise($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
    public function exercisedetail(){
	    $result = $this->clinicapp_model->exercisedetail();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
    public function edit_exercise(){
	    $result = $this->clinicapp_model->edit_exercise();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	 
   }
   public function ex_detail(){
	    $result = $this->clinicapp_model->ex_detail();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
  }	
  public function send_exercise(){
	    $result = $this->clinicapp_model->send_exercise();
		$response = array();
		if($result != 0){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
  }
  public function add_investigation() {
       $base = file_get_contents("php://input");
	   if ($base != '') {
			$dat=explode(',',$base);
			$dat_name=explode('/',$dat[0]);
			$dat_name1=explode(';',$dat_name[1]); 
			$data = str_replace($dat[0], '', $base);
			$data = str_replace(' ', '+', $data);
			$data = base64_decode($data);
			chdir('uploads/inves/');
			$file = date("YmdHis") . ".". $dat_name1[0];
			if(file_put_contents($file, $data))
			if ( ! preg_match("/^[a-z0-9:_\/-]+$/i", $file))
			{
				$data = array(
				  'client_id' => $_GET['branch'],
				  'patient_id' => $_GET['patient_id'],
				  'description' => $_GET['desc'],
				  'report_type' => $_GET['type'],
				  'inves_date' => date('Y-m-d'),
				  'document' => $file
				);
				$this->db->insert('tbl_investigation',$data);
				$id = $this->db->insert_id();  
			
			} else {  
				$data = array(
				  'client_id' => $_GET['branch'],
				  'patient_id' => $_GET['patient_id'],
				  'description' => $_GET['desc'],
				  'report_type' => $_GET['type'],
				  'inves_date' => date('Y-m-d'),
				  'document' => $file
				);
				$this->db->insert('tbl_investigation',$data);
				$id = $this->db->insert_id();
			}				
			
		  }
		  else{
			  $data = array(
				  'client_id' => $_GET['branch'],
				  'patient_id' => $_GET['patient_id'],
				  'description' => $_GET['desc'],
				  'report_type' => $_GET['type'],
				  'inves_date' => date('Y-m-d')
				);
				$this->db->insert('tbl_investigation',$data);
				$id = $this->db->insert_id();
		  }
         $response = array();
     	 if($id != ''){  
		    $response['status'] = 'success';
	     	$response['message'] = 'Patient has been Updated successfully.';
		 } else {
				$response['status'] = 'Failure';
				$response['message'] = 'Patient has not been Updated.';
		 }
		 $json_result = json_encode($response);
		 header('Content-type: application/json');
		 header('Access-Control-Allow-Origin: *');
		 header('Access-Control-Allow-Methods: GET,POST');
		 echo $json_result; 	  
  }
  public function view_investigation(){
	    $result = $this->clinicapp_model->invest_document();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
  }
  public function roeveruser_login() {
		$result = $this->clinicapp_model->roeveruser_login();
		$response = array();
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Login successfully.';
			$response['ClientData'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Email or Mobile Number is invalid';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result; 
  }
  public function roeverstaffuser_login() {
		$result = $this->clinicapp_model->roeverstaffuser_login();
		$response = array();
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Login successfully.';
			$response['ClientData'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Email or Mobile Number is invalid';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
  } 
   public function add_notification() {
	        define( 'API_ACCESS_KEY', 'AAAAHhxim7Y:APA91bGeFWJJ6ZHdYqoxNwl7e8C7A-AvjlaDCAg43hfEhNzPVqfn1tR-Bg8y6vB0SKDaqgqnx07JyLaZiigDcJ482Tkk_nPBEhsqkX88sYHTRYLZnunznnU-Mexyj7VnDbgOn_oAaXc7' );
			$msg = $_GET['desc']
				.$_GET['message'];
            $title = $_GET['title']; 
			$client_id = $_GET['client_id']; 
            $base = file_get_contents("php://input");
		      if ($base != '') {
				$dat=explode(',',$base);
				$dat_name=explode('/',$dat[0]);
				$dat_name1=explode(';',$dat_name[1]); 
				$data = str_replace($dat[0], '', $base);
				$data = str_replace(' ', '+', $data);
				$data = base64_decode($data);
				chdir('uploads/notification/');
				$file = date("YmdHis") . ".". $dat_name1[0];
				if(file_put_contents($file, $data))
				if ( ! preg_match("/^[a-z0-9:_\/-]+$/i", $file))
				{
					$image = $file;
				} else {  
					$image = '';
				}				
					
			  }
			  else{
				 $image = '';
			  }			 
			if($_GET['patient_id'] != 'all'){
			$id = str_replace('%20','',$_GET['patient_id']);
	        $val = explode(',',$id);
		   	   for($i = 0; $i < count($val); $i++){
				  $this->db->where('patient_id',$val[$i]);
				  $this->db->select('token')->from('tbl_patient_info');
				  $res = $this->db->get();
				  $token = $res->row()->token;
					
				//$to = "cBNA0ppuMGI:APA91bEX4--kgrkVw2tY-cLdL97j0g5gGoQiQOBSP2Qd0V9a4ZpwWDsRQxQ3V6YJj-lZAk_rdHAESGYR9431e8lmleCg2Js_YVO7AZ7iJoqPxtYPkZLG7QcYaqi7MyVr-kyosp7w1gzG";
				$data = array("to" => $token , "priority"=>"high",
							  "notification" => array( "title" => $title , "body" => $msg,"icon" => "icon.png","vibrate"   => 1,"sound" => "bingbong.aiff"));                                                                    
				$data_string = json_encode($data); 
				// echo "The Json Data : ".$data_string; 

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
				
				$data = array(
					  'client_id' => $_GET['client_id'],
					  'patient_id' => $val[$i],
					  'message' => $_GET['message'],
					  'short_desc' => $_GET['desc'],
					  'title' => $_GET['title'],
					  'date' => date('Y-m-d'),
					  'image' => 'https://physioplustech.in/uploads/notification/'.$image
					);
					$this->db->insert('tbl_notifications',$data);
					
			 }
		  } else {
			  $id = 'all';
			      $this->db->where('client_id',$client_id);
				  $this->db->where('token !=','');
				  $this->db->select('patient_id,token')->from('tbl_patient_info');
				  $res = $this->db->get();
				  foreach($res->result_array() as $row){
				  $token = $row['token'];
				//$to = "cBNA0ppuMGI:APA91bEX4--kgrkVw2tY-cLdL97j0g5gGoQiQOBSP2Qd0V9a4ZpwWDsRQxQ3V6YJj-lZAk_rdHAESGYR9431e8lmleCg2Js_YVO7AZ7iJoqPxtYPkZLG7QcYaqi7MyVr-kyosp7w1gzG";
				$data = array("to" => $token , "priority"=>"high",
							  "notification" => array( "title" => $title , "body" => $msg,"icon" => "icon.png","vibrate"   => 1,"sound" => "bingbong.aiff"));                                                                    
				$data_string = json_encode($data); 
				// echo "The Json Data : ".$data_string; 

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
				
				$data = array(
					  'client_id' => $_GET['client_id'],
					  'patient_id' => $row['patient_id'],
					  'message' => $_GET['message'],
					  'short_desc' => $_GET['desc'],
					  'title' => $_GET['title'],
					  'date' => date('Y-m-d'),
					  'image' => 'https://physioplustech.in/uploads/notification/'.$image
					);
					$this->db->insert('tbl_notifications',$data);
					
			 }
		  }
        $response = array();
     	 if($id != ''){  
		    $response['status'] = 'success';
	     	$response['message'] = 'Patient has been Updated successfully.';
		 } else {
				$response['status'] = 'Failure';
				$response['message'] = 'Patient has not been Updated.';
		 }
		 $json_result = json_encode($response);
		 header('Content-type: application/json');
		 header('Access-Control-Allow-Origin: *');
		 header('Access-Control-Allow-Methods: GET,POST');
		 echo $json_result;		 
  }
   public function sentnotifications() {   
		$result = $this->clinicapp_model->sentnotifications();
		$response = array();
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Login successfully.';
			$response['ClientData'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Email or Mobile Number is invalid';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
  } 
  public function event_register(){
        $this->load->model('anotherdb_model');
	    $result = $this->anotherdb_model->event_register();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	 
 }
  public function price_details1(){
        $this->load->model('anotherdb_model');
	    $result = $this->anotherdb_model->price_details1();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	 
 }
 public function forgot_adminpwd(){
	    $client_id = $_GET['email'];
		$result = $this->clinicapp_model->forgot_adminpwd($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
		 
   }
   public function forgot_staffpwd(){
	    $client_id = $_GET['email'];
		$result = $this->clinicapp_model->forgot_staffpwd($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
			
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
		 
   }
   public function getHeadneckMuscles() {
	    $result = $this->patient_model->getHeadneckMuscles();
		$response = array();
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function getRespirationMuscles() {
	    $result = $this->patient_model->getRespirationMuscles();
		$response = array();
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function getFingersMuscles() {
	    $result = $this->patient_model->getFingersMuscles();
		$response = array();
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function getThumbMuscles() {
	    $result = $this->patient_model->getThumbMuscles();
		$response = array();
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function getWristMuscles() {
	    $result = $this->patient_model->getWristMuscles();
		$response = array();
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function getForearmMuscles() {
	    $result = $this->patient_model->getForearmMuscles();
		$response = array();
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function getElbowMuscles() {
	    $result = $this->patient_model->getElbowMuscles();
		$response = array();
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function getScapulaMuscles() {
	    $result = $this->patient_model->getScapulaMuscles();
		$response = array();
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function getShoulderMuscles() {
	    $result = $this->patient_model->getShoulderMuscles();
		$response = array();
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }public function getHalluxMuscles() {
	    $result = $this->patient_model->getHalluxMuscles();
		$response = array();
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function getToesMuscles() {
	    $result = $this->patient_model->getToesMuscles();
		$response = array();
		$response = array();
		if($result != false){  
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function getAnkleMuscles() {
	    $result = $this->patient_model->getAnkleMuscles();
		$response = array();
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function getKneeMuscles() {
	    $result = $this->patient_model->getKneeMuscles();
		$response = array();
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function getHipMuscles() {
	    $result = $this->patient_model->getHipMuscles();
		$response = array();
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function add_sexamn() {
		$result = $this->clinicapp_model->add_sexamn();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function add_nuero() {
		$result = $this->clinicapp_model->add_nuero();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
    public function exam_det() {
	    $result = $this->clinicapp_model->exam_det();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
    public function pexam_det() {
	   $result = $this->clinicapp_model->pexam_det();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
    public function medical() {
	   $result = $this->clinicapp_model->medical();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function mexam_det() {
	   $result = $this->clinicapp_model->mexam_det();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function provisional() {
	   $result = $this->clinicapp_model->provisional();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function add_examination() {
		$result = $this->clinicapp_model->add_examination();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function add_pediatricexam() {
		$result = $this->clinicapp_model->add_pediatricexam();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function add_provisionaldiag() {
		$result = $this->clinicapp_model->add_provisionaldiag();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function add_medicaldiag() {
		$result = $this->clinicapp_model->add_medicaldiag();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
    
	public function get_provisional(){
		$result = $this->clinicapp_model->get_provisional();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function sexam_det() {
	    $result = $this->clinicapp_model->sexam_det();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
public function nexam_det() {
	    $result = $this->clinicapp_model->nexam_det();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
 public function get_treatment(){
		$result = $this->clinicapp_model->get_treatment();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function get_expense(){
		$result = $this->clinicapp_model->get_expense();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function edit_treatmentitem(){
		$result = $this->clinicapp_model->edit_treatmentitem();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function edit_expenseitem(){
		$result = $this->clinicapp_model->edit_expenseitem();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function deletetreatmentitem(){
		$result = $this->clinicapp_model->deletetreatmentitem();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function deleteexpenseitem(){
		$result = $this->clinicapp_model->deleteexpenseitem();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }  
	public function get_treatmentdet(){  
		$result = $this->clinicapp_model->get_treatmentdet();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function get_expensedet(){
		$result = $this->clinicapp_model->get_expensedet();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function add_motor() {
		$result = $this->clinicapp_model->add_motor();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function insert_exercise() {
		$result = $this->clinicapp_model->insert_exercise();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function search_ankle1(){
		$result = $this->clinicapp_model->search_ankle1();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function search_cervical1(){
		$result = $this->clinicapp_model->search_cervical1();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function search_education1(){
		$result = $this->clinicapp_model->search_education1();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function search_elbow1(){
		$result = $this->clinicapp_model->search_elbow1();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function search_elbow2(){
		$result = $this->clinicapp_model->search_elbow2();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function search_hip1(){
		$result = $this->clinicapp_model->search_hip1();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function search_hip2(){
		$result = $this->clinicapp_model->search_hip2();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function search_lumber1(){
		$result = $this->clinicapp_model->search_lumber1();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function search_lumber2(){
		$result = $this->clinicapp_model->search_lumber2();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function search_shoulder1(){
		$result = $this->clinicapp_model->search_shoulder1();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function search_shoulder2(){
		$result = $this->clinicapp_model->search_shoulder2();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function search_special1(){
		$result = $this->clinicapp_model->search_special1();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function search_special2(){
		$result = $this->clinicapp_model->search_special2();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function create_chart() {
		$result = $this->clinicapp_model->create_chart();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function datewisepatient_list(){
	    $client_id = $_GET["client_id"];
	    $date = $_GET["date"];
		$result = $this->clinicapp_model->datewisepatient_list($client_id,$date);
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function datewisehomepatient_list(){
	    $client_id = $_GET["client_id"];
	    $date = $_GET["date"];
		$result = $this->clinicapp_model->datewisehomepatient_list($client_id,$date);
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function datewiseappointment_list(){
	    $result = $this->clinicapp_model->datewiseappointment_list();
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function datewisebill_list() {
	   $result = $this->clinicapp_model->datewisebill_list();
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function add_invoicediscount() {
	   $id = $_GET['patient_id'];
	   if($id != false){
	     $result = $this->clinicapp_model->add_invoicediscount();
		 $response = array();
				if($result != false){
					$response['status'] = 'Success';
					$response['message'] = 'Invoice added Successfully';
				} else {
					$response['status'] = 'Failure';
					$response['message'] = 'No Data Found';
					
				}
	    } else {
		   $response = array();
		   $response['status'] = 'Failure';
		   $response['message'] = 'No Data Found';
		
	    }
	   
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function invoice_sales(){
	    $client_id = $_GET['branch'];
		$result = $this->clinicapp_model->invoice_orders($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	 public function mypassbook(){
	    $client_id = $_GET['branch'];
		$result = $this->clinicapp_model->mypassbook($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function chart_sales(){
		$client_id = $_GET['branch'];
		$result = $this->clinicapp_model->chart_orders($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function unsettled_chart(){
	    $client_id = $_GET['branch'];
		$result = $this->clinicapp_model->unsettled_chart($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function unsettled_invoice(){
	    $client_id = $_GET['branch'];
		$result = $this->clinicapp_model->unsettled_invoice($client_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
    }
	public function staff_details() {
		$client_id = $_GET['branch'];
		$staff_id = $_GET['staff_id'];
		$result = $this->clinicapp_model->staff_details($client_id,$staff_id);
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function staff_update() {
		$result = $this->clinicapp_model->staff_update();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function s_time() {
	   $client_id = $this->uri->segment(3);
	   $branch = $this->uri->segment(3);
	   $date = date('d-m-Y',strtotime($this->uri->segment(4)));
	   $this->db->select('sch_slot,sch_time')->from('tbl_settings')->where('client_id',$client_id);
	   $query = $this->db->get();
	  
	   if($query->result_array() != false) {
	   $slot = $query->row()->sch_slot;
	   $sch_time = $query->row()->sch_time;
	   $this->db->select('client_id,monday_fn_from,monday_an_to,tuesday_fn_from,tuesday_an_to,wednesday_fn_from,wednesday_an_to,thursday_fn_from,thursday_an_to,friday_fn_from,friday_an_to,saturday_fn_from,saturday_an_to,sunday_fn_from,sunday_an_to')->from('tbl_schedule_settings')->where('client_id',$client_id);
	   $query = $this->db->get();
	   if($query->result_array() != false) {
	   $day =  date('D', strtotime($date));
	   if($day == 'Mon'){
		      $time = $query->row()->monday_fn_from;
	          $time1 = $query->row()->monday_an_to;
		} elseif($day == 'Tue'){
	          $time = $query->row()->tuesday_fn_from;
		      $time1 = $query->row()->tuesday_an_to;
		} elseif($day == 'Wed'){  
		    $time = $query->row()->wednesday_fn_from;
		    $time1 = $query->row()->wednesday_an_to;
		} elseif($day == 'Thu'){
		   $time = $query->row()->thursday_fn_from;
		   $time1 = $query->row()->thursday_an_to;
		} elseif($day == 'Fri'){
			$time = $query->row()->friday_fn_from;
		    $time1 = $query->row()->friday_an_to;
		} elseif($day == 'Sat'){
			$time = $query->row()->saturday_fn_from;
		    $time1 = $query->row()->saturday_an_to;
		} elseif($day == 'Sun'){
		    $time = $query->row()->sunday_fn_from;
		    $time1 = $query->row()->sunday_an_to;	   
		}
		   $startTime = $time.':'.'00'.' '.'AM';
		   $endTime = $time1.':'.'00'.' '.'PM';
		   if($slot == '15'){
				$val = '4';
			}
		   if($slot == '30'){
				$val = '2';
			}
			if($slot == '60'){
				$val = '1';
			}
			if($slot == '45'){
				$val = '1.5';
			}
			if($slot == '5'){
				$val = '12';
			}
			
			$start = date('H:i:s',strtotime($startTime));
			$end = date('H:i:s',strtotime($endTime));
			$diff = ($end - $start)* $val;
			$arr = array();
			for($loop = 1; $loop <= $diff;$loop++)
			{
				$event_length = $slot * $loop;
				$timestamp = strtotime("$startTime");
				$etime = strtotime("+$event_length minutes", $timestamp);
				array_push($arr,$next_time = date('h:i A', $etime));
			}
	   } else {
		   if($slot == '15'){
				$val = '4';
			}
		     if($slot == '30'){
				$val = '2';
			}
			if($slot == '60'){
				$val = '1';
			}
			if($slot == '45'){
				$val = '1.5';
			}
			if($slot == '5'){
				$val = '12';
			}
			
		    $startTime = '07'.':'.'00'.' '.'AM';  
		    $endTime = '10'.':'.'00'.' '.'PM';
		    $start = date('H:i:s',strtotime($startTime));
			$end = date('H:i:s',strtotime($endTime));
			$diff = ($end - $start)* $val;
			$arr = array();
			for($loop = 1; $loop <= $diff;$loop++)
			{
				$event_length = $slot * $loop;
				$timestamp = strtotime("$startTime");
				$etime = strtotime("+$event_length minutes", $timestamp);
				array_push($arr,$next_time = date('H:i A', $etime));
			}
	   }
	   } else {
		   $slot = '30';
		   $val ='2';
		   $sch_time ='1';
		   $startTime = '07'.':'.'00'.' '.'AM';
		   $endTime = '10'.':'.'00'.' '.'PM';
		   $start = date('H:i:s',strtotime($startTime));
			$end = date('H:i:s',strtotime($endTime));
			$diff = ($end - $start)* $val;
			$arr = array();
			for($loop = 1; $loop <= $diff;$loop++)
			{
				$event_length = $slot * $loop;
				$timestamp = strtotime("$startTime");
				$etime = strtotime("+$event_length minutes", $timestamp);
				array_push($arr,$next_time = date('h:i A', $etime));
			}
		   
	   }
			$arr2 = array();
			$todate = date('d-m-Y');
			if($date == $todate) {
				for($loop = 1; $loop <= $diff;$loop++)
				{
					$event_length = 30 * $loop;
					$timestamp = strtotime("$startTime");
					$etime = strtotime("+$event_length minutes", $timestamp);
					if(date('H:i') >= date('H:i', $etime)){
					     array_push($arr2,$next_time = date('h:i A', $etime));
					}
				}
			}
			$this->db->where('client_id',$branch);
			$this->db->where('appointment_from',date('Y-m-d',strtotime($date)));
			$this->db->distinct();
			$this->db->select('start,end')->from('tbl_appointments');
			$query = $this->db->get();
			$arr1 = array();  
			foreach($query->result_array() as $row){
				$start = date('h:i A', strtotime($row['start']));
				$end = date('h:i A', strtotime($row['end']));
				array_push($arr1,$start,$end);
			}
			$counts = array_count_values($arr1);
			$arr4 = array();
			if($sch_time == '' || $sch_time == '0'){
				$sch_time = '0';
			}
			for($i=0;$i < count($arr1); $i++){
				if($counts[$arr1[$i]] >= $sch_time){
					array_push($arr4,$arr1[$i]);
				}
			}
			$value = array_unique($arr4);
			$val = count($value);
			if($val > 0) {
				  $res1 = array_diff($arr, $value);
				  $res = array_values($res1);
			} 
			else {
				$res = array_values($arr);
			}
			if($date == $todate){
				$result = array_diff($res, $arr2);
			}
			else {
				$result = $res;
			}
			$response = array();
			if($result != ''){
				$response['status'] = 'success';
				$response['message'] = $result;
				
			} else {
				$response['status'] = 'Failure';
				$response['message'] = 'No Data Found';
			}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result; 
	}
	public function user_details() {
		$result = $this->service_model->user_details();
		$response = array();
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function particularappointment_details(){
	    $app_id = $_GET["appointmentid"];
		$result = $this->service_model->appointment_view($app_id);
		$json_result = json_encode($result);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }
   public function user_details1() {
		$result = $this->service_model->user_details();
		$json_result = json_encode($result);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function particular_invoicedetails() {
		$patient_id = $_GET['patient_id'];
		$client_id = $_GET['client_id'];
		$bill_id = $_GET['bill_id'];
		$result = $this->service_model->particular_invoicedetails($patient_id,$client_id,$bill_id);
		$json_result = json_encode($result);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
		
	}
	public function paid_amount() {
		$client_id = $_GET['client_id'];
		$patient_id = $_GET['patient_id'];
		$bill_id = $_GET['bill_id'];
		$result = $this->service_model->paid_amount($client_id,$patient_id,$bill_id);
		$json_result = json_encode($result);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function check_invoice() {
		$client_id = $_GET['client_id'];
		$patient_id = $_GET['patient_id'];
		$bill_id = $_GET['bill_id'];
		$result = $this->service_model->check_invoice($client_id,$patient_id,$bill_id);
		if($result != false){
				$response['status'] = 'success';
				$response['message'] = $result;
		} else {
				$response['status'] = 'Failure';
				$response['message'] = 'Invalid Username or Password';
		}
		$json_result = json_encode($response);
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
	}
	public function expense_order(){  
	    $result = $this->clinicapp_model->expense_order();
		$response = array();
		if($result != false){
			$json_result = json_encode($result);
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'No Data Found';
			$json_result = json_encode($response);
		}
		
		header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET,POST');
		echo $json_result;
   }

}
?>