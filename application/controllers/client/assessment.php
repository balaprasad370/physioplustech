<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assessment extends CI_Controller {
	public function __construct() {
	    header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");

		parent::__construct();  
		$this->app_access->client();
		$this->load->model(array('assessment_model'));
		
	}
	public function shoulder_assessment() {
		$data['page_name'] = 'patient';
		$patient_id = $this->uri->segment(4);
		$data['patient']=$this->assessment_model->editPatientinfo($patient_id);
		$this->load->view('client/shoulder_assessment',$data);	
	}
	public function elbowwrist_assessment() {
		$data['page_name'] = 'patient';
		$patient_id = $this->uri->segment(4);
		$data['patient']=$this->assessment_model->editPatientinfo($patient_id);
		$this->load->view('client/elbowwrist_assessment.php',$data);
	}
	public function footankle_assessment() {
		$data['page_name'] = 'patient';
		$patient_id = $this->uri->segment(4);
		$data['patient']=$this->assessment_model->editPatientinfo($patient_id);
		$this->load->view('client/footankle_assessment.php',$data);
	}
	public function hip_assessment() {
		$data['page_name'] = 'patient';
		$patient_id = $this->uri->segment(4);
		$data['patient']=$this->assessment_model->editPatientinfo($patient_id);
		$this->load->view('client/hip_assessment.php',$data);
	}
	public function kneejoint_assessment() {
		$data['page_name'] = 'patient';
		$patient_id = $this->uri->segment(4);
		$data['patient']=$this->assessment_model->editPatientinfo($patient_id);
		$this->load->view('client/kneejoint_assessment.php',$data);
	}
	public function addshoulder_assessment(){
		$response=array();
		$result = $this->assessment_model->addshoulder_assessment();
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Body chart deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Body chart deleted successfully.';
		}
		echo json_encode($response);
	}
	
	public function addelbow_assessment(){
		$response=array();
		$result = $this->assessment_model->addelbow_assessment();
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Body chart deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Body chart deleted successfully.';
		}
		echo json_encode($response);
	}
	public function addfoot_assessment(){  
		$response=array();
		$result = $this->assessment_model->addfoot_assessment();
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Body chart deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Body chart deleted successfully.';
		}
		echo json_encode($response);
	}
	public function addhip_assessment(){
		$response=array();
		$result = $this->assessment_model->addhip_assessment();
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Body chart deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Body chart deleted successfully.';
		}
		echo json_encode($response);
	}
	public function addknee_assessment(){
		$response=array();
		$result = $this->assessment_model->addknee_assessment();
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Body chart deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Body chart deleted successfully.';
		}
		echo json_encode($response);
	}
	public function DeleteHipassess($patient_id,$h_id){
		//$response=array();
		$result = $this->assessment_model->DeleteHipassess($patient_id,$h_id);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Deleted successfully.';
		}
		echo json_encode($response); 
	}
        
        public function DeletePaediatricAssess($patient_id,$p_id,$access){
		//$response=array();
		$result = $this->assessment_model->DeletePaediatricAssess($patient_id,$p_id,$access);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'Failure';
			$response['message'] = 'Deleted successfully.';
		}
		echo json_encode($response); 
	}

	public function DeleteElbowassess($patient_id,$e_id){
		$response=array();
		$result = $this->assessment_model->DeleteElbowassess($patient_id,$e_id);  
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Body chart deleted successfully.';
		}
		echo json_encode($response);
	}
	public function Deletekneeassess($patient_id,$k_id){
		$response=array();
		$result = $this->assessment_model->Deletekneeassess($patient_id,$k_id);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Body chart deleted successfully.';
		}
		echo json_encode($response);
	}
	public function DeleteFootassess($patient_id,$f_id){
		$response=array();
		$result = $this->assessment_model->DeleteFootassess($patient_id,$f_id);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Body chart deleted successfully.';
		}
		echo json_encode($response);
	}
	public function DeleteShoulderassess($patient_id,$s_id){
		$response=array();
		$result = $this->assessment_model->DeleteShoulderassess($patient_id,$s_id);
		if($result != false){
			$response['status'] = 'success';
			$response['message'] = $result;
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Body chart deleted successfully.';
		}
		echo json_encode($response);
	}
	public function editshoulder_assessment() {
		$data['page_name'] = 'patient';
		$patient_id = $this->uri->segment(4);
		$s_id = $this->uri->segment(5);
		$data['patient']=$this->assessment_model->editPatientinfo($patient_id);
		$data['details']=$this->assessment_model->editshoulder_assessment($s_id);
		$this->load->view('client/editshoulder_assessment',$data);	
	}
	public function editelbowwrist_assessment() {  
		$data['page_name'] = 'patient';
		$patient_id = $this->uri->segment(4);
		$e_id = $this->uri->segment(5);
		$data['patient']=$this->assessment_model->editPatientinfo($patient_id);
		$data['details']=$this->assessment_model->editelbowwrist_assessment($e_id);
		$this->load->view('client/editelbowwrist_assessment.php',$data);
	}
	public function editfootankle_assessment() {
		$data['page_name'] = 'patient';
		$patient_id = $this->uri->segment(4);
		$f_id = $this->uri->segment(5);
		$data['patient']=$this->assessment_model->editPatientinfo($patient_id);
		$data['details']=$this->assessment_model->editfootankle_assessment($f_id);
		$this->load->view('client/editfootankle_assessment.php',$data);
	}
	public function edithip_assessment() {
		$data['page_name'] = 'patient';
		$patient_id = $this->uri->segment(4);
		$h_id = $this->uri->segment(5);
		$data['patient']=$this->assessment_model->editPatientinfo($patient_id);
		$data['details']=$this->assessment_model->edithip_assessment($h_id);
		$this->load->view('client/edithip_assessment.php',$data);
	}
	public function editkneejoint_assessment() {
		$data['page_name'] = 'patient';
		$patient_id = $this->uri->segment(4);
		$k_id = $this->uri->segment(5);
		$data['patient']=$this->assessment_model->editPatientinfo($patient_id);
		$data['details']=$this->assessment_model->editkneejoint_assessment($k_id);
		$this->load->view('client/editkneejoint_assessment.php',$data);
	}
		public function updateshoulder_assessment(){
		$response=array();
		$result = $this->assessment_model->updateshoulder_assessment();
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Body chart deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Body chart deleted successfully.';
		}
		echo json_encode($response);
	}
	
	public function updateelbow_assessment(){
		$response=array();
		$result = $this->assessment_model->updateelbow_assessment();
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Body chart deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Body chart deleted successfully.';
		}
		echo json_encode($response);
	}
	public function updatefoot_assessment(){  
		$response=array();
		$result = $this->assessment_model->updatefoot_assessment();
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Body chart deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Body chart deleted successfully.';
		}
		echo json_encode($response);
	}
	public function updatehip_assessment(){
		$response=array();
		$result = $this->assessment_model->updatehip_assessment();
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Body chart deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Body chart deleted successfully.';
		}
		echo json_encode($response);
	}
	public function updateknee_assessment(){
		$response=array();
		$result = $this->assessment_model->updateknee_assessment();
		if($result != ''){
			$response['status'] = 'success';
			$response['message'] = 'Body chart deleted successfully.';
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Body chart deleted successfully.';
		}
		echo json_encode($response);
	}
	public function printshoulder_assessment() {
		$data['page_name'] = 'patient';
		$patient_id = $this->uri->segment(4);
		$s_id = $this->uri->segment(5);
		$data['patient']=$this->assessment_model->editPatientinfo($patient_id);
		$data['details']=$this->assessment_model->editshoulder_assessment($s_id);
		//$this->load->view('client/printshoulder_assessment',$data);
		$html = $this->load->view('client/printshoulder_assessment',$data,true);
		$this->load->library('mpdf53/mpdf');
		$this->mpdf=new mPDF('','A4','11','Calibri (Body)',15,15,16,16,9,9);
		$this->mpdf->SetDisplayMode('fullpage');
		$this->mpdf->list_indent_first_level = 0; 
		$stylesheet = file_get_contents('mpdfstyletables.css');
		$this->mpdf->WriteHTML($stylesheet,0);
		$this->mpdf->WriteHTML($html,2);
		$this->mpdf->SetFooter('Powerd By : PhysioPlustech.com');
		$this->mpdf->Output('printshoulder_assessment.pdf','I');		
	}
	public function printelbowwrist_assessment() {  
		$data['page_name'] = 'patient';
		$patient_id = $this->uri->segment(4);
		$e_id = $this->uri->segment(5);
		$data['patient']=$this->assessment_model->editPatientinfo($patient_id);
		$data['details']=$this->assessment_model->editelbowwrist_assessment($e_id);
		//$this->load->view('client/printelbowwrist_assessment.php',$data);
		$html = $this->load->view('client/printelbowwrist_assessment',$data,true);
		$this->load->library('mpdf53/mpdf');
		$this->mpdf=new mPDF('','A4','11','Calibri (Body)',15,15,16,16,9,9);
		$this->mpdf->SetDisplayMode('fullpage');
		$this->mpdf->list_indent_first_level = 0; 
		$stylesheet = file_get_contents('mpdfstyletables.css');
		$this->mpdf->WriteHTML($stylesheet,0);
		$this->mpdf->WriteHTML($html,2);
		$this->mpdf->SetFooter('Powerd By : PhysioPlustech.com');
		$this->mpdf->Output('printelbowwrist_assessment.pdf','I');
	}
	public function printfootankle_assessment() {
		$data['page_name'] = 'patient';
		$patient_id = $this->uri->segment(4);
		$f_id = $this->uri->segment(5);
		$data['patient']=$this->assessment_model->editPatientinfo($patient_id);
		$data['details']=$this->assessment_model->editfootankle_assessment($f_id);
		//$this->load->view('client/printfootankle_assessment.php',$data);
		$html = $this->load->view('client/printfootankle_assessment',$data,true);
		$this->load->library('mpdf53/mpdf');
		$this->mpdf=new mPDF('','A4','11','Calibri (Body)',15,15,16,16,9,9);
		$this->mpdf->SetDisplayMode('fullpage');
		$this->mpdf->list_indent_first_level = 0; 
		$stylesheet = file_get_contents('mpdfstyletables.css');
		$this->mpdf->WriteHTML($stylesheet,0);
		$this->mpdf->WriteHTML($html,2);
		$this->mpdf->SetFooter('Powerd By : PhysioPlustech.com');
		$this->mpdf->Output('printfootankle_assessment.pdf','I');
	}
	public function printhip_assessment() {
		$data['page_name'] = 'patient';
		$patient_id = $this->uri->segment(4);
		$h_id = $this->uri->segment(5);
		$data['patient']=$this->assessment_model->editPatientinfo($patient_id);
		$data['details']=$this->assessment_model->edithip_assessment($h_id);
		//$this->load->view('client/printhip_assessment',$data);
		$html = $this->load->view('client/printhip_assessment',$data,true);
		$this->load->library('mpdf53/mpdf');
		$this->mpdf=new mPDF('','A4','11','Calibri (Body)',15,15,16,16,9,9);
		$this->mpdf->SetDisplayMode('fullpage');
		$this->mpdf->list_indent_first_level = 0; 
		$stylesheet = file_get_contents('mpdfstyletables.css');
		$this->mpdf->WriteHTML($stylesheet,0);
		$this->mpdf->WriteHTML($html,2);
		$this->mpdf->SetFooter('Powerd By : PhysioPlustech.com');
		$this->mpdf->Output('printhip_assessment.pdf','I');
		}
	public function printkneejoint_assessment() {
		$data['page_name'] = 'patient';
		$patient_id = $this->uri->segment(4);
		$k_id = $this->uri->segment(5);
		$data['patient']=$this->assessment_model->editPatientinfo($patient_id);
		$data['details']=$this->assessment_model->editkneejoint_assessment($k_id);
		//$this->load->view('client/printkneejoint_assessment.php',$data);
		$html = $this->load->view('client/printkneejoint_assessment',$data,true);
		$this->load->library('mpdf53/mpdf');
		$this->mpdf=new mPDF('','A4','11','Calibri (Body)',15,15,16,16,9,9);
		$this->mpdf->SetDisplayMode('fullpage');
		$this->mpdf->list_indent_first_level = 0; 
		$stylesheet = file_get_contents('mpdfstyletables.css');
		$this->mpdf->WriteHTML($stylesheet,0);
		$this->mpdf->WriteHTML($html,2);
		$this->mpdf->SetFooter('Powerd By : PhysioPlustech.com');
		$this->mpdf->Output('printkneejoint_assessment.pdf','I');
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
	
	public function printhipreport_assessment() {
		$data['page_name'] = 'patient';
		$patient_id = $this->uri->segment(4);
		$from_date = $this->uri->segment(5);
		$to_date = $this->uri->segment(6);
		$data['patient']=$this->assessment_model->editPatientinfo($patient_id);  
		$data['details1']=$this->assessment_model->viewhip_detail($patient_id,$from_date,$to_date);
		//$this->load->view('client/printhipreport_assessment',$data);
		$html = $this->load->view('client/printhipreport_assessment',$data,true);
		$this->load->library('mpdf53/mpdf');
		$this->mpdf=new mPDF('','A4','11','Calibri (Body)',15,15,16,16,9,9);
		$this->mpdf->SetDisplayMode('fullpage');
		$this->mpdf->list_indent_first_level = 0; 
		$stylesheet = file_get_contents('mpdfstyletables.css');
		$this->mpdf->WriteHTML($stylesheet,0);
		$this->mpdf->WriteHTML($html,2);
		$this->mpdf->SetFooter('Powerd By : PhysioPlustech.com');
		$this->mpdf->Output('printhipreport_assessment.pdf','I');
	}
	public function printkneereport_assessment() {
		$data['page_name'] = 'patient';
		$patient_id = $this->uri->segment(4);
		$from_date = $this->uri->segment(5);
		$to_date = $this->uri->segment(6);
		$data['patient']=$this->assessment_model->editPatientinfo($patient_id);  
		$data['details1']=$this->assessment_model->viewknee_detail($patient_id,$from_date,$to_date);
		//$this->load->view('client/printhipreport_assessment',$data);
		$html = $this->load->view('client/printkneereport_assessment',$data,true);
		$this->load->library('mpdf53/mpdf');
		$this->mpdf=new mPDF('','A4','11','Calibri (Body)',15,15,16,16,9,9);
		$this->mpdf->SetDisplayMode('fullpage');
		$this->mpdf->list_indent_first_level = 0; 
		$stylesheet = file_get_contents('mpdfstyletables.css');
		$this->mpdf->WriteHTML($stylesheet,0);
		$this->mpdf->WriteHTML($html,2);
		$this->mpdf->SetFooter('Powerd By : PhysioPlustech.com');
		$this->mpdf->Output('printkneereport_assessment.pdf','I');
	}
	public function printelbowreport_assessment() {
		$data['page_name'] = 'patient';
		$patient_id = $this->uri->segment(4);
		$from_date = $this->uri->segment(5);
		$to_date = $this->uri->segment(6);
		$data['patient']=$this->assessment_model->editPatientinfo($patient_id);  
		$data['details1']=$this->assessment_model->viewelbow_detail($patient_id,$from_date,$to_date);
		//$this->load->view('client/printhipreport_assessment',$data);
		$html = $this->load->view('client/printelbowreport_assessment',$data,true);
		$this->load->library('mpdf53/mpdf');
		$this->mpdf=new mPDF('','A4','11','Calibri (Body)',15,15,16,16,9,9);
		$this->mpdf->SetDisplayMode('fullpage');
		$this->mpdf->list_indent_first_level = 0; 
		$stylesheet = file_get_contents('mpdfstyletables.css');
		$this->mpdf->WriteHTML($stylesheet,0);
		$this->mpdf->WriteHTML($html,2);
		$this->mpdf->SetFooter('Powerd By : PhysioPlustech.com');
		$this->mpdf->Output('printelbowreport_assessment.pdf','I');
	}
	public function printshoulderreport_assessment() {
		$data['page_name'] = 'patient';
		$patient_id = $this->uri->segment(4);
		$from_date = $this->uri->segment(5);
		$to_date = $this->uri->segment(6);
		$data['patient']=$this->assessment_model->editPatientinfo($patient_id);  
		$data['details1']=$this->assessment_model->viewshoulder_detail($patient_id,$from_date,$to_date);
		//$this->load->view('client/printhipreport_assessment',$data);
		$html = $this->load->view('client/printshoulderreport_assessment',$data,true);
		$this->load->library('mpdf53/mpdf');
		$this->mpdf=new mPDF('','A4','11','Calibri (Body)',15,15,16,16,9,9);
		$this->mpdf->SetDisplayMode('fullpage');
		$this->mpdf->list_indent_first_level = 0; 
		$stylesheet = file_get_contents('mpdfstyletables.css');
		$this->mpdf->WriteHTML($stylesheet,0);
		$this->mpdf->WriteHTML($html,2);
		$this->mpdf->SetFooter('Powerd By : PhysioPlustech.com');
		$this->mpdf->Output('printelbowreport_assessment.pdf','I');
	}
	public function printfootreport_assessment() {
		$data['page_name'] = 'patient';
		$patient_id = $this->uri->segment(4);
		$from_date = $this->uri->segment(5);
		$to_date = $this->uri->segment(6);
		$data['patient']=$this->assessment_model->editPatientinfo($patient_id);  
		$data['details1']=$this->assessment_model->viewfoot_detail($patient_id,$from_date,$to_date);
		//$this->load->view('client/printhipreport_assessment',$data);
		$html = $this->load->view('client/printfootreport_assessment',$data,true);
		$this->load->library('mpdf53/mpdf');
		$this->mpdf=new mPDF('','A4','11','Calibri (Body)',15,15,16,16,9,9);
		$this->mpdf->SetDisplayMode('fullpage');
		$this->mpdf->list_indent_first_level = 0; 
		$stylesheet = file_get_contents('mpdfstyletables.css');
		$this->mpdf->WriteHTML($stylesheet,0);
		$this->mpdf->WriteHTML($html,2);
		$this->mpdf->SetFooter('Powerd By : PhysioPlustech.com');
		$this->mpdf->Output('printfootreport_assessment.pdf','I');
	}
	
	
	
	
}