<?Php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assessment extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->app_access->client(); // check access permission for owner
		$this->load->model(array('patient_model','assessment_model','cardio_assessment_model','registration_model'));
	}
	public function sports_assessment() {
		$data['page_name'] ='patient';
		$patient_id = $this->uri->segment(3);
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
	    $data['patient'] = $this->patient_model->editPatientinfo($patient_id);
		$this->load->view('assessment/sports_assessment',$data);
   }
   public function add_assessment() {
	    if($result = $this->assessment_model->add_sportsassess()){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'concession group has not been added successfully.';
		} 
		echo json_encode($response);
   }
    public function assessment_info() {
		$result = $this->assessment_model->assessment_info($_POST['val'],$_POST['patient_id']);
		if($result != 0){
 		   $response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = $result;
		} 
		echo json_encode($response);
   }
   public function antenatal_assessment_info() {
		$result = $this->assessment_model->antenatal_assessment_info($_POST['val'],$_POST['patient_id']);
		if($result != 0){
 		   $response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = $result;
		} 
		echo json_encode($response);
   }
    public function peadiatric_assessment_info() {
		$result = $this->assessment_model->peadiatric_assessment_info($_POST['val'],$_POST['patient_id']);
		if($result != 0){
 		   $response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = $result;
		} 
		echo json_encode($response);    
   }
   public function update_assessment() {
	   if($result = $this->assessment_model->update_assessment()){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'concession group has not been added successfully.';
		} 
		echo json_encode($response);
   }
   public function print_assessment() {
	   $patient_id = $this->uri->segment(3);
	   $assess_id = $this->uri->segment(4);
	   $data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
	   $data['patient'] = $this->patient_model->editPatientinfo($patient_id);
	   $data['assess'] = $this->assessment_model->edit_assessment_info($assess_id);
	   $this->db->where('assesssment_id',$assess_id);
	   $this->db->select('client_id,staff_id')->from('saaessment_details');
	   $res = $this->db->get();
	   $client_id = $res->row()->client_id;
	   $staff_id = $res->row()->staff_id;
	   $data['staff_info'] = $this->assessment_model->staff_info($staff_id,$client_id);
      // $this->load->view('assessment/print_sports_assessment',$data);
	    $html = $this->load->view('assessment/print_sports_assessment',$data,true);
		$this->load->library('mpdf53/mpdf');
		$this->mpdf=new mPDF('','A4','11','Calibri (Body)',15,15,16,16,9,9);
		$this->mpdf->SetDisplayMode('fullpage');
		$this->mpdf->list_indent_first_level = 0; 
		$stylesheet = file_get_contents('mpdfstyletables.css');
		$this->mpdf->WriteHTML($stylesheet,0);
		$this->mpdf->WriteHTML($html,2);
		$this->mpdf->SetFooter('Powerd By : PhysioPlustech.com');
		$this->mpdf->Output('invoice.pdf','I'); 
  }
   public function edit_assessment() {
	   $patient_id = $this->uri->segment(3);
	   $assess_id = $this->uri->segment(4);
	   $data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
	   $data['patient'] = $this->patient_model->editPatientinfo($patient_id);
	   $data['assess'] = $this->assessment_model->edit_assessment_info($assess_id);
	   $this->load->view('assessment/edit_sports_assessment',$data);
	}
    public function antenatal() {
	   $data['page_name'] ='patient';
	   $patient_id = $this->uri->segment(3);
	   $data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
	   $data['patient'] = $this->patient_model->editPatientinfo($patient_id);
	   $this->load->view('assessment/antenatal',$data);
	}
	
	 public function add_antenatal() {
	    if($result = $this->assessment_model->add_antenatal()){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'concession group has not been added successfully.';
		} 
		echo json_encode($response);
    }
	public function update_antenatal() {
	    if($result = $this->assessment_model->update_antenatal()){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'concession group has not been added successfully.';
		} 
		echo json_encode($response);
    }
	public function edit_antenatal() {
		$patient_id = $this->uri->segment(3);
	    $assess_id = $this->uri->segment(4);
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
	    $data['patient'] = $this->patient_model->editPatientinfo($patient_id);
	    $data['assess'] = $this->assessment_model->edit_antenatal($assess_id);
	    $this->load->view('assessment/edit_antenatal',$data);
	}
	public function paediatric() {
	   $patient_id = $this->uri->segment(3);
	   $data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
	   $data['patient'] = $this->patient_model->editPatientinfo($patient_id);
	   $this->load->view('assessment/paediatric',$data);
	}
	 public function add_paediatric() {
	    if($result = $this->assessment_model->add_paediatric()){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'concession group has not been added successfully.';
		} 
		echo json_encode($response);
    }
	public function update_paediatric() {
		$paediatric_id =$this->input->post('paediatric_id');
	    if($result = $this->assessment_model->update_paediatric($paediatric_id)){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'concession group has not been added successfully.';
		} 
		echo json_encode($response);
    }
	
	public function edit_paediatric() {
		$patient_id = $this->uri->segment(3);
	    $assess_id = $this->uri->segment(4);
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
	    $data['patient'] = $this->patient_model->editPatientinfo($patient_id);
	    $data['assess'] = $this->assessment_model->edit_paediatric($assess_id);
	    $this->load->view('assessment/edit_paediatric',$data);
	}
	public function print_paediatric() {
	   $patient_id = $this->uri->segment(3);
	   $paediatric_id = $this->uri->segment(4);
	   $data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
	   $data['patient'] = $this->patient_model->editPatientinfo($patient_id);
	   $data['assess'] = $this->assessment_model->edit_paediatric($paediatric_id);
	   /* $this->db->where('paediatric_id',$paediatric_id);
	   $this->db->select('client_id,staff_id')->from('tbl_paediatric');
	   $res = $this->db->get();
	   $client_id = $res->row()->client_id;
	   $staff_id = $res->row()->staff_id; 
	   $data['staff_info'] = $this->assessment_model->staff_info($staff_id,$client_id);
     */ // $this->load->view('assessment/print_paediatric',$data);
	    $html = $this->load->view('assessment/print_paediatric',$data,true);
		$this->load->library('mpdf53/mpdf');
		$this->mpdf=new mPDF('','A4','11','Calibri (Body)',15,15,16,16,9,9);
		$this->mpdf->SetDisplayMode('fullpage');
		$this->mpdf->list_indent_first_level = 0; 
		$stylesheet = file_get_contents('mpdfstyletables.css');
		$this->mpdf->WriteHTML($stylesheet,0);
		$this->mpdf->WriteHTML($html,2);
		$this->mpdf->SetFooter('Powerd By : PhysioPlustech.com');
		$this->mpdf->Output('invoice.pdf','I');  
    }
	public function print_paediatricreport() {
	   $patient_id = $this->uri->segment(3);
	   $from_date = $this->uri->segment(4);
	   $to_date = $this->uri->segment(5);
	   $data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
	   $data['patient'] = $this->patient_model->editPatientinfo($patient_id);
	   $data['assess1'] = $this->assessment_model->paediatric_detail($patient_id,$from_date,$to_date);
	   /* $this->db->where('paediatric_id',$paediatric_id);
	   $this->db->select('client_id,staff_id')->from('tbl_paediatric');
	   $res = $this->db->get();
	   $client_id = $res->row()->client_id;
	   $staff_id = $res->row()->staff_id; 
	   $data['staff_info'] = $this->assessment_model->staff_info($staff_id,$client_id);
     */ // $this->load->view('assessment/print_paediatric',$data);
	    $html = $this->load->view('assessment/print_paediatricreport',$data,true);
		$this->load->library('mpdf53/mpdf');
		$this->mpdf=new mPDF('','A4','11','Calibri (Body)',15,15,16,16,9,9);
		$this->mpdf->SetDisplayMode('fullpage');
		$this->mpdf->list_indent_first_level = 0; 
		$stylesheet = file_get_contents('mpdfstyletables.css');
		$this->mpdf->WriteHTML($stylesheet,0);
		$this->mpdf->WriteHTML($html,2);
		$this->mpdf->SetFooter('Powerd By : PhysioPlustech.com');
		$this->mpdf->Output('print_paediatricreport.pdf','I');  
    }
	public function ortho() {
	    $data['page_name'] ='patient';
		$patient_id = $this->uri->segment(3);
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
	    $data['patient']=$this->patient_model->editPatientinfo($patient_id);
		$this->load->view('assessment/ortho',$data);
	}
	public function add_ortho() {
	    if($result = $this->assessment_model->add_ortho()){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'concession group has not been added successfully.';
		} 
		echo json_encode($response);
    }
	public function update_ortho() {
		$ortho_id = $this->input->post('ortho_id');
	    if($result = $this->assessment_model->update_ortho($ortho_id)){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'concession group has not been added successfully.';
		} 
		echo json_encode($response);
    }
	public function edit_ortho() {
		$patient_id = $this->uri->segment(3);
	    $assess_id = $this->uri->segment(4);
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
	    $data['patient'] = $this->patient_model->editPatientinfo($patient_id);
	    $data['assess'] = $this->assessment_model->edit_ortho($assess_id);
	    $this->load->view('assessment/edit_ortho',$data);
	}
	public function print_ortho() {  
	   $patient_id = $this->uri->segment(3);
	   $assess_id = $this->uri->segment(4);
	   $data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
	   $data['patient'] = $this->patient_model->editPatientinfo($patient_id);
	   $data['assess'] = $this->assessment_model->edit_ortho($assess_id);
	   /* $this->db->where('ortho_id',$assess_id);
	   $this->db->select('client_id,staff_id')->from('tbl_ortho');
	   $res = $this->db->get();
	   $client_id = $res->row()->client_id;
	   $staff_id = $res->row()->staff_id;
	   $data['staff_info'] = $this->assessment_model->staff_info($staff_id,$client_id);
       */// $this->load->view('assessment/print_ortho',$data);
	    $html = $this->load->view('assessment/print_ortho',$data,true);
		$this->load->library('mpdf53/mpdf');
		$this->mpdf=new mPDF('','A4','11','Calibri (Body)',15,15,16,16,9,9);
		$this->mpdf->SetDisplayMode('fullpage');
		$this->mpdf->list_indent_first_level = 0; 
		$stylesheet = file_get_contents('mpdfstyletables.css');
		$this->mpdf->WriteHTML($stylesheet,0);
		$this->mpdf->WriteHTML($html,2);
		$this->mpdf->SetFooter('Powerd By : PhysioPlustech.com');
		$this->mpdf->Output('invoice.pdf','I');  
  }
  public function ortho_assessment_info() {
		$result = $this->assessment_model->ortho_assessment_info($_POST['val'],$_POST['patient_id']);
		if($result != 0){
 		   $response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = $result;
		} 
		echo json_encode($response);    
   }
   public function body_chart(){
		$image = imagecreatefrompng($_POST['image']);
		$name =$_POST['id'];
		$date = $_POST['date'];
		$id = rand(10000 , 99999);
		imagealphablending($image, false);
		imagesavealpha($image, true);
		imagepng($image, 'wpaintone/test/uploads/wPaint-' . $id . '.png');
		echo '{"img": "wpaintone/test/uploads/wPaint-' . $id . '.png"}';
		$image_name = 'wPaint-'.$id.'.png';
		
		$seed = str_split('abcdefghijklmnopqrstuvwxyz1234567890');
		shuffle($seed); 
		$rand = '';
		foreach (array_rand($seed, 5) as $k) $rand .= $seed[$k];
		
		$c_id = $this->session->userdata('client_id');
		$data = array(
			'img_name'=>$image_name,
			'patient_id'=>$name,
			'client_id'=>$c_id,
			'date' => date('Y-m-d',strtotime(str_replace('/','-',$date))),
			'code' => $rand,
			
		);
		$this->db->insert('tbl_ass_body_chart',$data);
		return true;
    }
	public function print_antental_assessment() {
	   $patient_id = $this->uri->segment(3);
	   $assess_id = $this->uri->segment(4);
	   $data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
	   $data['patient'] = $this->patient_model->editPatientinfo($patient_id);
	   $data['assess'] = $this->assessment_model->edit_antenatal($assess_id);
	   /* $this->db->where('assess_id',$assess_id);
	   $this->db->select('client_id,staff_id')->from('tbl_antenatal');
	   $res = $this->db->get();
	   $client_id = $res->row()->client_id;
	   $staff_id = $res->row()->staff_id;
	   $data['staff_info'] = $this->assessment_model->staff_info($staff_id,$client_id);
       */ $html = $this->load->view('assessment/print_antental_assessment',$data,true);
	   $this->load->library('mpdf53/mpdf');
	   $this->mpdf=new mPDF('','A4','11','Calibri (Body)',15,15,16,16,9,9);
	   $this->mpdf->SetDisplayMode('fullpage');
	   $this->mpdf->list_indent_first_level = 0; 
	   $stylesheet = file_get_contents('mpdfstyletables.css');
	   $this->mpdf->WriteHTML($stylesheet,0);
	   $this->mpdf->WriteHTML($html,2);
	   $this->mpdf->SetFooter('Powerd By : PhysioPlustech.com');
	   $this->mpdf->Output('antental_assessment.pdf','I');
  }
  public function print_antentalreport_assessment() {
	   $patient_id = $this->uri->segment(3);
	   $from_date = $this->uri->segment(4);
	   $to_date = $this->uri->segment(5);
	   $data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
	   $data['patient'] = $this->patient_model->editPatientinfo($patient_id);
	   $data['assess1'] = $this->assessment_model->antenatal_detail($patient_id,$from_date,$to_date);
	   /* $this->db->where('assess_id',$assess_id);
	   $this->db->select('client_id,staff_id')->from('tbl_antenatal');
	   $res = $this->db->get();
	   $client_id = $res->row()->client_id;
	   $staff_id = $res->row()->staff_id;
	   $data['staff_info'] = $this->assessment_model->staff_info($staff_id,$client_id);
       */ $html = $this->load->view('assessment/print_antenatalreport_assessment',$data,true);
	   $this->load->library('mpdf53/mpdf');
	   $this->mpdf=new mPDF('','A4','11','Calibri (Body)',15,15,16,16,9,9);
	   $this->mpdf->SetDisplayMode('fullpage');
	   $this->mpdf->list_indent_first_level = 0; 
	   $stylesheet = file_get_contents('mpdfstyletables.css');
	   $this->mpdf->WriteHTML($stylesheet,0);
	   $this->mpdf->WriteHTML($html,2);
	   $this->mpdf->SetFooter('Powerd By : PhysioPlustech.com');
	   $this->mpdf->Output('antental_assessment.pdf','I');
  }
  public function neuro() {
		$data['page_name'] ='patient';
		$patient_id = $this->uri->segment(3);
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
	    $data['patient']=$this->patient_model->editPatientinfo($patient_id);
		$this->load->view('assessment/add_neuro',$data);
	}
	public function add_neuro() {
	    if($result = $this->assessment_model->add_neuro()){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'concession group has not been added successfully.';
		} 
		echo json_encode($response);
    }
	public function neuro_assessment_info() {  
		$result = $this->assessment_model->neuro_assessment_info($_POST['val'],$_POST['patient_id']);
		if($result != 0){
 		   $response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = $result;
		} 
		echo json_encode($response);    
   }
   public function edit_neuro() {
		$patient_id = $this->uri->segment(3);
	    $assess_id = $this->uri->segment(4);
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
	    $data['patient'] = $this->patient_model->editPatientinfo($patient_id);
	    $data['assess'] = $this->assessment_model->edit_neuro($assess_id);
	    $this->load->view('assessment/edit_neuro',$data);
	}
	
	public function update_neuro() {
		$data['page_name'] = 'patient';
		$neuro_id = $this->input->post('neuro_id');
		if($result = $this->assessment_model->update_neuro($neuro_id)){
			$response['status'] = 'success';
			$response['message'] = 'Cardio has been Updated successfully.';
			
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Cardio has not been Updated successfully.';
			
		} 
		echo json_encode($response); 
	}
   public function print_neuro() {
	   $patient_id = $this->uri->segment(3);
	   $assess_id = $this->uri->segment(4);
	   $data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
	   $data['patient'] = $this->patient_model->editPatientinfo($patient_id);
	   $data['assess'] = $this->assessment_model->edit_neuro($assess_id);
	  /*  $this->db->where('neuro_id',$assess_id);
	   $this->db->select('client_id,staff_id')->from('tbl_neuro');
	   $res = $this->db->get();
	   $client_id = $res->row()->client_id;
	   $staff_id = $res->row()->staff_id;
	   $data['staff_info'] = $this->assessment_model->staff_info($staff_id,$client_id);
       */// $this->load->view('assessment/print_neuro',$data);
	    $html = $this->load->view('assessment/print_neuro',$data,true);
		$this->load->library('mpdf53/mpdf');
		$this->mpdf=new mPDF('','A4','11','Calibri (Body)',15,15,16,16,9,9);
		$this->mpdf->SetDisplayMode('fullpage');
		$this->mpdf->list_indent_first_level = 0; 
		$stylesheet = file_get_contents('mpdfstyletables.css');
		$this->mpdf->WriteHTML($stylesheet,0);
		$this->mpdf->WriteHTML($html,2);
		$this->mpdf->SetFooter('Powerd By : PhysioPlustech.com');
		$this->mpdf->Output('invoice.pdf','I'); 
  }
  public function print_neuroreport() {
	   $patient_id = $this->uri->segment(3);
	   $from_date = $this->uri->segment(4);
	   $to_date = $this->uri->segment(5);
	   $data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
	   $data['patient'] = $this->patient_model->editPatientinfo($patient_id);
	   $data['assess1'] = $this->assessment_model->neuro_detail($patient_id,$from_date,$to_date);
	  /*  $this->db->where('neuro_id',$assess_id);
	   $this->db->select('client_id,staff_id')->from('tbl_neuro');
	   $res = $this->db->get();
	   $client_id = $res->row()->client_id;
	   $staff_id = $res->row()->staff_id;
	   $data['staff_info'] = $this->assessment_model->staff_info($staff_id,$client_id);
       */// $this->load->view('assessment/print_neuro',$data);
	    $html = $this->load->view('assessment/print_neuroreport',$data,true);
		$this->load->library('mpdf53/mpdf');
		$this->mpdf=new mPDF('','A4','11','Calibri (Body)',15,15,16,16,9,9);
		$this->mpdf->SetDisplayMode('fullpage');
		$this->mpdf->list_indent_first_level = 0; 
		$stylesheet = file_get_contents('mpdfstyletables.css');
		$this->mpdf->WriteHTML($stylesheet,0);
		$this->mpdf->WriteHTML($html,2);
		$this->mpdf->SetFooter('Powerd By : PhysioPlustech.com');
		$this->mpdf->Output('invoice.pdf','I'); 
  }
	
	public function index(){
	   $data['page_name'] ='patient';
	   $patient_id = $this->uri->segment(3);
	   $this->db->where('patient_id',$patient_id);
	   $this->db->select('*')->from('tbl_patient_info');
		$query = $this->db->get();
		$data['patient_info'] = ($query->num_rows() > 0) ? $query->result_array() : false;
		$data['cardio_detail'] = $this->cardio_assessment_model->cardio_detail($patient_id);
		$data['post_detail'] = $this->cardio_assessment_model->post_detail($patient_id);
		$data['antenatal_detail'] = $this->assessment_model->antenatal_detail($patient_id);
		$data['neuro_detail'] = $this->assessment_model->neuro_detail($patient_id);
		$data['paediatric_detail'] = $this->assessment_model->paediatric_detail($patient_id);
		$data['ortho_detail'] = $this->assessment_model->ortho_detail($patient_id);
		$data['sports_detail'] = $this->assessment_model->sports_detail($patient_id);
       $this->load->view('assessment/index',$data);	   
		
	}
	
	public function cardio(){
		$data['page_name'] ='patient';
		$patient_id = $this->uri->segment(3);
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
	    $data['patient_info']=$this->patient_model->editPatientinfo($patient_id);
		$this->load->view('assessment/cardio',$data);
	}
	public function add_cardio() {
		$this->load->model('cardio_assessment_model');
		if($result = $this->cardio_assessment_model->add_cardio()){
			$response['status'] = 'success';
			$response['message'] = 'Referal  has been added successfully.';
			
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
			
		} 
		echo json_encode($response);
	}
	
	public function cardio_edit() {
		$data['page_name'] = 'patient';
		$patient_id = $this->uri->segment(3);
		$this->db->where('patient_id',$patient_id);
	    $this->db->select('first_name,age,gender,address_line1,occupation,patient_code')->from('tbl_patient_info');
	    $query = $this->db->get();
		$data['patient_info'] = ($query->num_rows() > 0) ? $query->row_array() : false;
	    $cardio_id = $this->uri->segment(4);
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$data['patient'] = $this->patient_model->editPatientinfo($patient_id);
		$data['cardio_ass']=$this->cardio_assessment_model->cardio_edit($cardio_id);
		$this->load->view('assessment/edit_cardio',$data);
	}
	
	
	public function update_cardio() {
		$data['page_name'] = 'patient';
		$cardio_id = $this->input->post('cardio_id');
		if($result = $this->cardio_assessment_model->update_cardio($cardio_id)){
			$response['status'] = 'success'; 
			$response['message'] = 'Cardio has been Updated successfully.';
			
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Cardio has not been Updated successfully.';
			
		} 
		echo json_encode($response);
	}
	public function cardio_assessment_info() {
		$this->load->model('cardio_assessment_model');
		$result = $this->cardio_assessment_model->cardio_assessment_info($_POST['val'],$_POST['patient_id']);
		if($result != 0){
 		   $response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = $result;
		} 
		echo json_encode($response);
   }
   public function postnatal(){
		$data['page_name'] ='patient';
		$patient_id = $this->uri->segment(3);
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
	    $data['patient_info']=$this->patient_model->editPatientinfo($patient_id);
		$this->load->view('assessment/postnatal',$data);
	}
	
	public function add_postnatal() {
		if($result = $this->cardio_assessment_model->add_postnatal()){
			$response['status'] = 'success';
			$response['message'] = 'Referal  has been added successfully.';
			
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
			
		} 
		echo json_encode($response);
	}
	
	public function postnatal_assessment_info() {
		$result = $this->cardio_assessment_model->postnatal_assessment_info($_POST['val'],$_POST['patient_id']);
		if($result != 0){
 		   $response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = $result;
		} 
		echo json_encode($response);
   }
   
   public function edit_postnatal() {
		$data['page_name'] = 'patient';
		$patient_id = $this->uri->segment(3);
	    $postnata_id = $this->uri->segment(4);
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$data['patient'] = $this->patient_model->editPatientinfo($patient_id);
		$data['postnata_ass']=$this->cardio_assessment_model->edit_postnatal($postnata_id);
		$this->load->view('assessment/edit_postnatal',$data);
	}
	
	public function update_postnatal() {
		if($result = $this->cardio_assessment_model->update_postnatal()){
			$response['status'] = 'success';
			$response['message'] = 'Cardio has been Updated successfully.';
			
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Cardio has not been Updated successfully.';
			
		} 
		echo json_encode($response);
	}
	public function print_cardio() {
	   $patient_id = $this->uri->segment(3);
	   $cardio_id = $this->uri->segment(4);
	   $data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
	   $data['patient'] = $this->patient_model->editPatientinfo($patient_id);
	   $data['assess'] = $this->cardio_assessment_model->cardio_edit($cardio_id);
	   // $this->load->view('print_sports_assessment',$data);
	   $html = $this->load->view('assessment/print_cardio_assessment',$data,true);
		$this->load->library('mpdf53/mpdf');
		$this->mpdf=new mPDF('','A4','11','Calibri (Body)',15,15,16,16,9,9);
		$this->mpdf->SetDisplayMode('fullpage');
		$this->mpdf->list_indent_first_level = 0; 
		$stylesheet = file_get_contents('mpdfstyletables.css');
		$this->mpdf->WriteHTML($stylesheet,0);
		$this->mpdf->WriteHTML($html,2);
		$this->mpdf->SetFooter('Powerd By : PhysioPlustech.com');
		$this->mpdf->Output('cardio_assessment.pdf','I');
  }
  public function print_cardioreport() {
	   $patient_id = $this->uri->segment(3);
	   $from_date = $this->uri->segment(4);
	   $to_date = $this->uri->segment(5);
	   $data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
	   $data['patient'] = $this->patient_model->editPatientinfo($patient_id);
	   $data['assess1'] = $this->cardio_assessment_model->cardio_detail($patient_id,$from_date,$to_date);
	   // $this->load->view('print_sports_assessment',$data);
	   $html = $this->load->view('assessment/print_cardioreport_assessment',$data,true);
		$this->load->library('mpdf53/mpdf');
		$this->mpdf=new mPDF('','A4','11','Calibri (Body)',15,15,16,16,9,9);
		$this->mpdf->SetDisplayMode('fullpage');
		$this->mpdf->list_indent_first_level = 0; 
		$stylesheet = file_get_contents('mpdfstyletables.css');
		$this->mpdf->WriteHTML($stylesheet,0);
		$this->mpdf->WriteHTML($html,2);
		$this->mpdf->SetFooter('Powerd By : PhysioPlustech.com');
		$this->mpdf->Output('cardio_assessment.pdf','I');
  }
  public function print_postnatal() {
	   $patient_id = $this->uri->segment(3);
	   $postnata_id = $this->uri->segment(4);
	   $data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
	   $data['patient'] = $this->patient_model->editPatientinfo($patient_id);
	   $data['assess'] = $this->cardio_assessment_model->edit_postnatal($postnata_id);
	   $this->db->where('postnata_id',$postnata_id);
	   $html = $this->load->view('assessment/print_postnatal_assessment',$data,true);
		$this->load->library('mpdf53/mpdf');
		$this->mpdf=new mPDF('','A4','11','Calibri (Body)',15,15,16,16,9,9);
		$this->mpdf->SetDisplayMode('fullpage');
		$this->mpdf->list_indent_first_level = 0; 
		$stylesheet = file_get_contents('mpdfstyletables.css');
		$this->mpdf->WriteHTML($stylesheet,0);
		$this->mpdf->WriteHTML($html,2);
		$this->mpdf->SetFooter('Powerd By : PhysioPlustech.com');
		$this->mpdf->Output('postnatal_assessment.pdf','I');
  }
    public function print_postnatalreport() {
	   $patient_id = $this->uri->segment(3);
	   $from_date = $this->uri->segment(4);
	   $to_date = $this->uri->segment(5);
	   $data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
	   $data['patient'] = $this->patient_model->editPatientinfo($patient_id);
	   $data['assess1'] = $this->cardio_assessment_model->post_detail($patient_id,$from_date,$to_date);
	   $this->db->where('postnata_id',$postnata_id);
	   $html = $this->load->view('assessment/print_postnatalreport_assessment',$data,true);
		$this->load->library('mpdf53/mpdf');
		$this->mpdf=new mPDF('','A4','11','Calibri (Body)',15,15,16,16,9,9);
		$this->mpdf->SetDisplayMode('fullpage');
		$this->mpdf->list_indent_first_level = 0; 
		$stylesheet = file_get_contents('mpdfstyletables.css');
		$this->mpdf->WriteHTML($stylesheet,0);
		$this->mpdf->WriteHTML($html,2);
		$this->mpdf->SetFooter('Powerd By : PhysioPlustech.com');
		$this->mpdf->Output('postnatal_assessment.pdf','I');
  }
	
	public function delete_cardio($cn_id,$patient_id){
		$data['page_name'] = 'patient';
		$result = $this->assessment_model->delete_cardio($patient_id,$cn_id);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	}
	
	public function delete_postnatal($cn_id,$patient_id){
		$data['page_name'] = 'patient';
		$result = $this->assessment_model->delete_postnatal($cn_id,$patient_id);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	}
	
	public function delete_anate($cn_id,$patient_id){
		$data['page_name'] = 'patient';
		$result = $this->assessment_model->delete_anate($cn_id,$patient_id);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	}
	
	public function delete_neuro($cn_id,$patient_id){
		$data['page_name'] = 'patient';
		$result = $this->assessment_model->delete_neuro($patient_id,$cn_id);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	}
	
	public function delete_paedia($cn_id,$patient_id){
		$data['page_name'] = 'patient';
		$result = $this->assessment_model->delete_paedia($patient_id,$cn_id);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	}
	public function delete_ortho($cn_id,$patient_id){
		$data['page_name'] = 'patient';
		$result = $this->assessment_model->delete_ortho($cn_id,$patient_id);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	}
	public function delete_sports($cn_id,$patient_id){
		$data['page_name'] = 'patient';
		$result = $this->assessment_model->delete_sports($patient_id,$cn_id);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'Referal has not been added successfully.';
		} 
		echo json_encode($response);
	}
        
        public function paediatricGMFM() {
	   $patient_id = $this->uri->segment(3);
	   $data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
	   $data['patient'] = $this->patient_model->editPatientinfo($patient_id);
	   $this->load->view('assessment/paediatricGMFM',$data);
	}
        
        public function add_paediatric_GMFM_LR() {
		$result = $this->assessment_model->add_paediatric_GMFM_LR();
		$resultSit = $this->assessment_model->add_paediatric_GMFM_SIT();
		$resultCK = $this->assessment_model->add_paediatric_GMFM_CK();
		$resultStand = $this->assessment_model->add_paediatric_GMFM_STAND();
		$resultWalk = $this->assessment_model->add_paediatric_GMFM_WALK();
		//echo($result);
	    if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
			
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'concession group has not been added successfully.';
		} 
		echo json_encode($response);
	  
    }

    public function edit_paediatricGMFM() {
		$patient_id = $this->uri->segment(3);
	    $assess_id = $this->uri->segment(4);
		$assess_date = $this->uri->segment(5);
		$data['clientDetails'] = $this->registration_model->editProfile($this->session->userdata('client_id'));
	    $data['patient'] = $this->patient_model->editPatientinfo($patient_id);
	    $data['assess'] = $this->assessment_model->edit_paediatric($assess_id);
		$data['gmfm_lr'] = $this->assessment_model->edit_paediatricGMFM_LR($patient_id,$assess_date);
		$data['gmfm_sit'] = $this->assessment_model->edit_paediatricGMFM_SIT($patient_id,$assess_date);
		$data['gmfm_ck'] = $this->assessment_model->edit_paediatricGMFM_CK($patient_id,$assess_date);
		$data['gmfm_stand'] = $this->assessment_model->edit_paediatricGMFM_STAND($patient_id,$assess_date);
		$data['gmfm_walk'] = $this->assessment_model->edit_paediatricGMFM_WALK($patient_id,$assess_date);
		if($data['gmfm_lr']==false)
		{
			$this->load->view('assessment/paediatricGMFM',$data);
		}
		else{
	    $this->load->view('assessment/edit_paediatricGMFM',$data);
		}
	}
	 
        public function update_paediatric_GMFM_LR() {
		$patient_id = $this->uri->segment(3);
	    $assess_id = $this->uri->segment(4);
		$assess_date = $this->uri->segment(5);
		//echo $assess_date;
		$result = $this->assessment_model->update_paediatric_GMFM_LR($patient_id,$assess_id,$assess_date);
		$resultSit = $this->assessment_model->update_paediatric_GMFM_SIT($patient_id,$assess_id,$assess_date);
		$resultCK = $this->assessment_model->update_paediatric_GMFM_CK($patient_id,$assess_id,$assess_date);
		$resultStand = $this->assessment_model->update_paediatric_GMFM_STAND($patient_id,$assess_id,$assess_date);
		$resultWalk = $this->assessment_model->update_paediatric_GMFM_WALK($patient_id,$assess_id,$assess_date);
		echo($result);
	    if($result){
			$response['status'] = 'success';
			$response['message'] = $result;
			
		} else { 
			$response['status'] = 'Failure';
			$response['message'] = 'concession group has not been added successfully.';
		} 
		echo json_encode($response);
           }
	  
	 
}
?>