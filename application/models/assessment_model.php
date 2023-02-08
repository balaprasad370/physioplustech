<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assessment_model extends CI_Model 
{
	
	public function __construct() 
	{
		
	}
	public function editPatientinfo($patient_id = '')
	{	
		$where=array('patient_id' => $patient_id);
		$this->db->select('*')->from('tbl_patient_info')->where($where);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function addshoulder_assessment() {
		
		$this->db->where('patient_id',$this->input->post('patient_id'));
		$this->db->where('date',date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))));
		$this->db->limit(1);
		$this->db->select('img_name,code')->from('tbl_ass_body_chart');
		$this->db->order_by('img_id','DESC');
		$res = $this->db->get();
		if($res->result_array() != false){
		  $image = base_url().'wpaintone/test/uploads/'.$res->row()->img_name;
		  $code = $res->row()->code;
         } else {
			   $image = '';
			   $code = '';
		   }
		   
			 $data = array(
				'patient_id' =>$this->input->post('patient_id'),
				'assess_date' =>date('Y-m-d',strtotime($this->input->post('assess_date'))),
				'chart' => $image,
				'code' => $code,
				'social' =>$this->input->post('social'),
				'injury' =>$this->input->post('injury'),
				'investigations' =>$this->input->post('investigations'),
				'surgery' =>$this->input->post('surgery'),
				'ant_left' =>$this->input->post('ant_left'),
				'ant_right' =>$this->input->post('ant_right'),
				'post_left' =>$this->input->post('post_left'),
				'post_right' =>$this->input->post('post_right'),
				'med_left' =>$this->input->post('med_left'),
				'med_right' =>$this->input->post('med_right'),
				'lat_left' =>$this->input->post('lat_left'),
				'lat_right' =>$this->input->post('lat_right'),
				'bic_left' =>$this->input->post('bic_left'),
				'bic_right' =>$this->input->post('bic_right'),
				'clicking_left' =>$this->input->post('clicking_left'),
				'clicking_right' =>$this->input->post('clicking_right'),
				'stiffness_left' =>$this->input->post('stiffness_left'),
				'stiffness_right' =>$this->input->post('stiffness_right'),
				'alignment_left' =>$this->input->post('alignment_left'),
				'alignment_right' =>$this->input->post('alignment_right'),
				'swelling_left' =>$this->input->post('swelling_left'),
				'swelling_right' =>$this->input->post('swelling_right'),
				'warmth_left' =>$this->input->post('warmth_left'),
				'warmth_right' =>$this->input->post('warmth_right'),
				'winging_left' =>$this->input->post('winging_left'),
				'winging_right' =>$this->input->post('winging_right'),
				'atrophy_left' =>$this->input->post('atrophy_left'),
				'atrophy_right' =>$this->input->post('atrophy_right'),
				'tightness_left' =>$this->input->post('tightness_left'),
				'tightness_right' =>$this->input->post('tightness_right'),
				'deformities_left' =>$this->input->post('deformities_left'),
				'deformities_right' =>$this->input->post('deformities_right'),
				'pain_scale' =>$this->input->post('pain_scale'),
				'duration' =>$this->input->post('duration'),
				'category' =>$this->input->post('categories'),
				'worse' =>$this->input->post('worse'),
				'aggrevating' =>$this->input->post('aggrevating'),
				'relieving' =>$this->input->post('relieving'),
				'n_pain' =>$this->input->post('n_pain'),
				'n_stiffness' =>$this->input->post('n_stiffness'),
				'n_radiation' =>$this->input->post('n_radiation'),
				'flexion_active' =>$this->input->post('flexion_active'),
				'flexion_active1' =>$this->input->post('flexion_active1'),
				'flexion_passive' =>$this->input->post('flexion_passive'),
				'flexion_passive1' =>$this->input->post('flexion_passive1'),
				'flexion_mmt' =>$this->input->post('flexion_mmt'),
				'flexion_mmt1' =>$this->input->post('flexion_mmt1'),
				'extension_active' =>$this->input->post('extension_active'),
				'extension_active1' =>$this->input->post('extension_active1'),
				'extension_passive' =>$this->input->post('extension_passive'),
				'extension_passive1' =>$this->input->post('extension_passive1'),
				'extension_mmt' =>$this->input->post('extension_mmt'),
				'extension_mmt1' =>$this->input->post('extension_mmt1'),
				'abduction_active' =>$this->input->post('abduction_active'),
				'abduction_active1' =>$this->input->post('abduction_active1'),
				'abduction_passive' =>$this->input->post('abduction_passive'),
				'abduction_passive1' =>$this->input->post('abduction_passive1'),
				'abduction_mmt' =>$this->input->post('abduction_mmt'),
				'abduction_mmt1' =>$this->input->post('abduction_mmt1'),
				'adduction_active' =>$this->input->post('adduction_active'),
				'adduction_active1' =>$this->input->post('adduction_active1'),
				'adduction_passive' =>$this->input->post('adduction_passive'),
				'adduction_passive1' =>$this->input->post('adduction_passive1'),
				'adduction_mmt' =>$this->input->post('adduction_mmt'),
				'adduction_mmt1' =>$this->input->post('adduction_mmt1'),
				'internalrot_active' =>$this->input->post('internalrot_active'),
				'internalrot_active1' =>$this->input->post('internalrot_active1'),
				'internalerot_passive' =>$this->input->post('internalerot_passive'),
				'internalerot_passive1' =>$this->input->post('internalerot_passive1'),
				'internalerot_mmt' =>$this->input->post('internalerot_mmt'),
				'internalerot_mmt1' =>$this->input->post('internalerot_mmt1'),
				'externalrot_active' =>$this->input->post('externalrot_active'),
				'externalrot_active1' =>$this->input->post('externalrot_active1'),
				'externalrot_passive' =>$this->input->post('externalrot_passive'),
				'externalrot_passive1' =>$this->input->post('externalrot_passive1'),
				'externalrot_mmt' =>$this->input->post('externalrot_mmt'),
				'externalrot_mmt1' =>$this->input->post('externalrot_mmt1'),
				'painful_left' =>$this->input->post('painful_left'),
				'painful_right' =>$this->input->post('painful_right'),
				'supraspinatus_left' =>$this->input->post('supraspinatus_left'),
				'supraspinatus_right' =>$this->input->post('supraspinatus_right'),
				'Hawkins_left' =>$this->input->post('Hawkins_left'),
				'Hawkins_right' =>$this->input->post('Hawkins_right'),
				'Stability_left' =>$this->input->post('Stability_left'),
				'Stability_right' =>$this->input->post('Stability_right'),
				'Apprehension_left' =>$this->input->post('Apprehension_left'),
				'Apprehension_right' =>$this->input->post('Apprehension_right'),
				'Drop_left' =>$this->input->post('Drop_left'),
				'Drop_right' =>$this->input->post('Drop_right'),
				'Sulcus_left' =>$this->input->post('Sulcus_left'),
				'Sulcus_right' =>$this->input->post('Sulcus_right'),
				'left2' =>$this->input->post('left2'),
				'right2' =>$this->input->post('right2'),
				'Diagnosis' =>$this->input->post('Diagnosis'),
				'Treatment' =>$this->input->post('Treatment'),
				'Therapist' =>$this->input->post('Therapist'),
				'client_id' => $this->session->userdata('client_id'),
				'Infraspinatus_left' =>$this->input->post('Infraspinatus_left'),
				'Infraspinatus_right' =>$this->input->post('Infraspinatus_right'),
				'Subscapularis_left' =>$this->input->post('Subscapularis_left'),
				'Subscapularis_right' =>$this->input->post('Subscapularis_right'),
			 );
			 $this->db->insert('tbl_shoulderassessment',$data);
		}
		
		public function addelbow_assessment() {
			
			
		   $this->db->where('patient_id',$this->input->post('patient_id'));
		   $this->db->where('date',date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))));
		   $this->db->limit(1);
		   $this->db->select('img_name,code')->from('tbl_ass_body_chart');
		   $this->db->order_by('img_id','DESC');
		   $res = $this->db->get();
		   if($res->result_array() != false){
		     $image = base_url().'wpaintone/test/uploads/'.$res->row()->img_name;
			  $code = $res->row()->code;
           } else {
			   $image = '';
			   $code = '';
		   }
		   
			 $data = array(
				'patient_id' =>$this->input->post('patient_id'),
				'assess_date' =>date('Y-m-d',strtotime($this->input->post('assess_date'))),
				'chart' => $image,
				'code' => $code,
				'Limitation' =>$this->input->post('Limitation'),
				'injury' =>$this->input->post('injury'),
				'Investigations' =>$this->input->post('Investigations'),
				'Surgery' =>$this->input->post('Surgery'),
				'ant_left' =>$this->input->post('ant_left'),
				'ant_right' =>$this->input->post('ant_right'),
				'post_left' =>$this->input->post('post_left'),
				'post_right' =>$this->input->post('post_right'),
				'med_left' =>$this->input->post('med_left'),
				'med_right' =>$this->input->post('med_right'),
				'lat_left' =>$this->input->post('lat_left'),
				'lat_right' =>$this->input->post('lat_right'),
				'bic_left' =>$this->input->post('bic_left'),
				'bic_right' =>$this->input->post('bic_right'),
				'clicking_left' =>$this->input->post('clicking_left'),
				'clicking_right' =>$this->input->post('clicking_right'),
				'stiffness_left' =>$this->input->post('stiffness_left'),
				'stiffness_right' =>$this->input->post('stiffness_right'),
				'Alignment_left' =>$this->input->post('Alignment_left'),
				'Alignment_right' =>$this->input->post('Alignment_right'),
				'Swelling_left' =>$this->input->post('Swelling_left'),
				'Swelling_right' =>$this->input->post('Swelling_right'),
				'Warmth_left' =>$this->input->post('Warmth_left'),
				'Warmth_right' =>$this->input->post('Warmth_right'),
				'Winging_left' =>$this->input->post('Winging_left'),
				'Winging_right' =>$this->input->post('Winging_right'),
				'atrophy_left' =>$this->input->post('atrophy_left'),
				'atrophy_right' =>$this->input->post('atrophy_right'),
				'tightness_left' =>$this->input->post('tightness_left'),
				'tightness_right' =>$this->input->post('tightness_right'),
				'deformities_left' =>$this->input->post('deformities_left'),
				'deformities_right' =>$this->input->post('deformities_right'),
				'rate' =>$this->input->post('rate'),
				'pain_worst' =>$this->input->post('pain_worst'),
				'at_rest' =>$this->input->post('at_rest'),
				'heavy' =>$this->input->post('heavy'),
				'mvt' =>$this->input->post('mvt'),
				'at_night' =>$this->input->post('at_night'),
				'pain_type1' =>$this->input->post('pain_type1'),
				'aggrevating' =>$this->input->post('aggrevating'),
				'relieving' =>$this->input->post('relieving'),
				'n_pain' =>$this->input->post('n_pain'),
				'n_stiffness' =>$this->input->post('n_stiffness'),
				'n_radiation' =>$this->input->post('n_radiation'),
				'Tingling' =>$this->input->post('Tingling'),
				'flexion_active' =>$this->input->post('flexion_active'),
				'flexion_active1' =>$this->input->post('flexion_active1'),
				'flexion_passive' =>$this->input->post('flexion_passive'),
				'flexion_passive1' =>$this->input->post('flexion_passive1'),
				'flexion_mmt' =>$this->input->post('flexion_mmt'),
				'flexion_mmt1' =>$this->input->post('flexion_mmt1'),
				'extension_active' =>$this->input->post('extension_active'),
				'extension_active1' =>$this->input->post('extension_active1'),
				'extension_passive' =>$this->input->post('extension_passive'),
				'extension_passive1' =>$this->input->post('extension_passive1'),
				'extension_mmt' =>$this->input->post('extension_mmt'),
				'extension_mmt1' =>$this->input->post('extension_mmt1'),
				'Pronation_active' =>$this->input->post('Pronation_active'),
				'Pronation_active1' =>$this->input->post('Pronation_active1'),
				'Pronation_passive' =>$this->input->post('Pronation_passive'),
				'Pronation_passive1' =>$this->input->post('Pronation_passive1'),
				'Pronation_mmt' =>$this->input->post('Pronation_mmt'),
				'Pronation_mmt1' =>$this->input->post('Pronation_mmt1'),
				'Supination_active' =>$this->input->post('Supination_active'),
				'Supination_passive' =>$this->input->post('Supination_passive'),
				'Supination_mmt' =>$this->input->post('Supination_mmt'),
				'Supination_active1' =>$this->input->post('Supination_active1'),
				'Supination_passive1' =>$this->input->post('Supination_passive1'),
				'Supination_mmt1' =>$this->input->post('Supination_mmt1'),
				'Elbow_left' =>$this->input->post('Elbow_left'),
				'Elbow_right' =>$this->input->post('Elbow_right'),
				'Varuslcl_left' =>$this->input->post('Varuslcl_left'),
				'Varuslcl_right' =>$this->input->post('Varuslcl_right'),
				'Valgusmcl_left' =>$this->input->post('Valgusmcl_left'),
				'Valgusmcl_right' =>$this->input->post('Valgusmcl_right'),
				'Irritated_left' =>$this->input->post('Irritated_left'),
				'Irritated_right' =>$this->input->post('Irritated_right'),
				'pronation_left' =>$this->input->post('pronation_left'),
				'pronation_right' =>$this->input->post('pronation_right'),
				'Golfers_left' =>$this->input->post('Golfers_left'),
				'Golfers_right' =>$this->input->post('Golfers_right'),
				'Wrist_left' =>$this->input->post('Wrist_left'),
				'Wrist_right' =>$this->input->post('Wrist_right'),
				'Carpal_left' =>$this->input->post('Carpal_left'),
				'Carpal_right' =>$this->input->post('Carpal_right'),
				'Tinel_left' =>$this->input->post('Tinel_left'),
				'Tinel_right' =>$this->input->post('Tinel_right'),
				'Finkelstein_left' =>$this->input->post('Finkelstein_left'),
				'Finkelstein_right' =>$this->input->post('Finkelstein_right'),
				'category' =>$this->input->post('categories'),
				'Diagnosis' =>$this->input->post('Diagnosis'),
				'Treatment' =>$this->input->post('Treatment'),
				'Therapist' =>$this->input->post('Therapist'),
				'client_id' => $this->session->userdata('client_id')
			 );
			 $this->db->insert('tbl_elbowassessment',$data);
		}
		
		public function addfoot_assessment() {
			
		   $this->db->where('patient_id',$this->input->post('patient_id'));
		   $this->db->where('date',date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))));
		   $this->db->limit(1);
		   $this->db->select('img_name,code')->from('tbl_ass_body_chart');
		   $this->db->order_by('img_id','DESC');
		   $res = $this->db->get();
		   if($res->result_array() != false){
		     $image = base_url().'wpaintone/test/uploads/'.$res->row()->img_name;
			  $code = $res->row()->code;
           } else {
			   $image = '';
			   $code = '';
		   }
		   
			 $data = array(
				'patient_id' =>$this->input->post('patient_id'),
				'client_id' =>$this->session->userdata('client_id'),
				'assess_date' =>date('Y-m-d',strtotime($this->input->post('assess_date'))),
				'chart' => $image,
				'code' => $code,
				'social' =>$this->input->post('social'),
				'injury' =>$this->input->post('injury'),
				'procedures' =>$this->input->post('procedures'),
				'tenderness' =>$this->input->post('tenderness'),
				'Swelling' =>$this->input->post('swelling'),
				'bruises' =>$this->input->post('bruises'),
				'Warmth' =>$this->input->post('Warmth'),
				'sensation' =>$this->input->post('sensation'),
				'limb' =>$this->input->post('limb'),
				'High' =>$this->input->post('High'),
				'Antalgic' =>$this->input->post('Antalgic'),
				'propulsive' =>$this->input->post('propulsive'),
				'Balance' =>$this->input->post('Balance'),
				'Contracture' =>$this->input->post('Contracture'),
				'pain_scale' =>$this->input->post('pain_scale'),
				'duration' =>$this->input->post('duration'),
				'category' =>$this->input->post('categories'),
				'Aggravating' =>$this->input->post('Aggravating_factors'),
				'Relieving' =>$this->input->post('Relieving_factors'),
				'Dorsiflexion_active' =>$this->input->post('Dorsiflexion_active'),
				'Dorsiflexion_passive' =>$this->input->post('Dorsiflexion_passive'),
				'Dorsiflexion_active1' =>$this->input->post('Dorsiflexion_active1'),
				'Dorsiflexion_passive1' =>$this->input->post('Dorsiflexion_passive1'),
				'Plantar_active' =>$this->input->post('Plantar_active'),
				'Plantar_passive' =>$this->input->post('Plantar_passive'),
				'Plantar_active1' =>$this->input->post('Plantar_active1'),
				'Plantar_passive1' =>$this->input->post('Plantar_passive1'),
				'Inversion_active' =>$this->input->post('Inversion_active'),
				'Inversion_passive' =>$this->input->post('Inversion_passive'),
				'Inversion_active1' =>$this->input->post('Inversion_active1'),
				'Inversion_passive1' =>$this->input->post('Inversion_passive1'),
				'Eversion_active' =>$this->input->post('Eversion_active'),
				'Eversion_passive' =>$this->input->post('Eversion_passive'),
				'Eversion_active1' =>$this->input->post('Eversion_active1'),
				'Eversion_passive1' =>$this->input->post('Eversion_passive1'),
				'toef_active' =>$this->input->post('toef_active'),
				'toef_passive' =>$this->input->post('toef_passive'),
				'toef_active1' =>$this->input->post('toef_active1'),
				'toef_passive1' =>$this->input->post('toef_passive1'),
				'toee_active' =>$this->input->post('toee_active'),
				'toee_passive' =>$this->input->post('toee_passive'),
				'toee_active1' =>$this->input->post('toee_active1'),
				'toee_passive1' =>$this->input->post('toee_passive1'),
				'big_active' =>$this->input->post('big_active'),
				'big_passive' =>$this->input->post('big_passive'),
				'big_passive1' =>$this->input->post('big_passive1'),
				'big_active1' =>$this->input->post('big_active1'),
				'ant_passive1' =>$this->input->post('ant_passive1'),
				'Movements_left' =>$this->input->post('Movements_left'),
				'Invertors_left' =>$this->input->post('Invertors_left'),
				'Evertors_left' =>$this->input->post('Evertors_left'),
				'Dorsi_left' =>$this->input->post('Dorsi_left'),
				'Plantar_left' =>$this->input->post('Plantar_left'),
				'EHL_left' =>$this->input->post('EHL_left'),
				'Extensor_left' =>$this->input->post('Extensor_left'),
				'Flexor_left' =>$this->input->post('Flexor_left'),
				'Flexor_right' =>$this->input->post('Flexor_right'),
				'Extensor_right' =>$this->input->post('Extensor_right'),
				'EHL_right' =>$this->input->post('EHL_right'),
				'Plantar_right' =>$this->input->post('Plantar_right'),
				'Dorsi_right' =>$this->input->post('Dorsi_right'),
				'Evertors_right' =>$this->input->post('Evertors_right'),
				'Invertors_right' =>$this->input->post('Invertors_right'),
				'Movements_right' =>$this->input->post('Movements_right'),
				'ATFLAnterior_left' =>$this->input->post('ATFLAnterior_left'),
				'ATFLAnterior_right' =>$this->input->post('ATFLAnterior_right'),
				'ATFLSqueeze_left' =>$this->input->post('ATFLSqueeze_left'),
				'ATFLSqueeze_right' =>$this->input->post('ATFLSqueeze_right'),
				'Inversiontalar_left' =>$this->input->post('Inversiontalar_left'),
				'Inversiontalar_right' =>$this->input->post('Inversiontalar_right'),
				'Eversiontalar_left' =>$this->input->post('Eversiontalar_left'),
				'Eversiontalar_right' =>$this->input->post('Eversiontalar_right'),
				'Thompson_right' =>$this->input->post('Thompson_right'),
				'Valgus_left' =>$this->input->post('Valgus_left'),
				'Valgus_right' =>$this->input->post('Valgus_right'),
				'Diagnosis' =>$this->input->post('Diagnosis'),
				'Treatment' =>$this->input->post('Treatment'),
				'Therapist' =>$this->input->post('Therapist'),
				'Thompson_left' =>$this->input->post('Thompson_left'),
				
			 );
			 $this->db->insert('tbl_footassessment',$data);  
		}
		public function addhip_assessment() {
			
			$this->db->where('patient_id',$this->input->post('patient_id'));
		   $this->db->where('date',date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))));
		   $this->db->limit(1);
		   $this->db->select('img_name,code')->from('tbl_ass_body_chart');
		   $this->db->order_by('img_id','DESC');
		   $res = $this->db->get();
		   if($res->result_array() != false){
		     $image = base_url().'wpaintone/test/uploads/'.$res->row()->img_name;
			  $code = $res->row()->code;
           } else {
			   $image = '';
			   $code = '';
		   }
		   
			 $data = array(
				'patient_id' =>$this->input->post('patient_id'),
				'client_id' =>$this->session->userdata('client_id'),
				'assess_date' =>date('Y-m-d',strtotime($this->input->post('assess_date'))),
				'chart' => $image,
				'code' => $code,
				'social' =>$this->input->post('social'),
				'Investigations' =>$this->input->post('Investigations'),
				'Surgery' =>$this->input->post('Surgery'),
				'injury' =>$this->input->post('injury'),
				'Warmth' =>$this->input->post('Warmth'),
				'Edema' =>$this->input->post('Edema'),
				'Skin' =>$this->input->post('Skin'),
				'm_atrophy' =>$this->input->post('m_atrophy'),
				'Tightness' =>$this->input->post('Tightness'),
				'Snapping' =>$this->input->post('Snapping'),
				'Deformities' =>$this->input->post('Deformities'),
				'Limb' =>$this->input->post('Limb'),
				'Stance' =>$this->input->post('Stance'),
				'Swing' =>$this->input->post('Swing'),
				'Walking' =>$this->input->post('Walking'),
				'Weight' =>$this->input->post('Weight'),
				'pain_scale' =>$this->input->post('pain_scale'),
				'duration' =>$this->input->post('duration'),
				'category' =>$this->input->post('categories'),
				'worse' =>$this->input->post('worse'),
				'Aggravating' =>$this->input->post('Aggravating_factors'),
				'Relieving' =>$this->input->post('Relieving_factors'),
				'flexl_active' =>$this->input->post('flexl_active'),
				'flexl_passive' =>$this->input->post('flexl_passive'),
				'flexl_mmt' =>$this->input->post('flexl_mmt'),
				'flexr_active' =>$this->input->post('flexr_active'),
				'flexr_passive' =>$this->input->post('flexr_passive'),
				'flexr_mmt' =>$this->input->post('flexr_mmt'),
				'exl_active' =>$this->input->post('exl_active'),
				'exl_passive' =>$this->input->post('exl_passive'),
				'exl_mmt' =>$this->input->post('exl_mmt'),
				'exr_active' =>$this->input->post('exr_active'),
				'exr_passive' =>$this->input->post('exr_passive'),
				'exr_mmt' =>$this->input->post('exr_mmt'),
				'abduction1_active' =>$this->input->post('abduction1_active'),
				'abduction1_passive' =>$this->input->post('abduction1_passive'),
				'abduction1_mmt' =>$this->input->post('abduction1_mmt'),
				'abductionr_mmt' =>$this->input->post('abductionr_mmt'),
				'abductionr_passive' =>$this->input->post('abductionr_passive'),
				'abductionr_active' =>$this->input->post('abductionr_active'),
				'adductionl_active' =>$this->input->post('adductionl_active'),
				'adductionl_passive' =>$this->input->post('adductionl_passive'),
				'adductionl_mmt' =>$this->input->post('adductionl_mmt'),
				'adductionr_mmt' =>$this->input->post('adductionr_mmt'),
				'adductionr_passive' =>$this->input->post('adductionr_passive'),
				'adductionr_active' =>$this->input->post('adductionr_active'),
				'irotl_active' =>$this->input->post('irotl_active'),
				'irotl_passive' =>$this->input->post('irotl_passive'),
				'irotl_mmt' =>$this->input->post('irotl_mmt'),
				'irotr_mmt' =>$this->input->post('irotr_mmt'),
				'irotr_passive' =>$this->input->post('irotr_passive'),
				'irotr_active' =>$this->input->post('irotr_active'),
				'erotl_active' =>$this->input->post('erotl_active'),
				'erotl_passive' =>$this->input->post('erotl_passive'),
				'erotl_mmt' =>$this->input->post('erotl_mmt'),
				'erotr_mmt' =>$this->input->post('erotr_mmt'),
				'erotr_passive' =>$this->input->post('erotr_passive'),
				'erotr_active' =>$this->input->post('erotr_active'),
				'Trendelenburg_left' =>$this->input->post('Trendelenburg_left'),
				'Trendelenburg_right' =>$this->input->post('Trendelenburg_right'),
				'Fabers_left' =>$this->input->post('Fabers_left'),
				'Fabers_right' =>$this->input->post('Fabers_right'),
				'Bursitis_left' =>$this->input->post('Bursitis_left'),
				'Bursitis_right' =>$this->input->post('Bursitis_right'),
				'Piriformis_left' =>$this->input->post('Piriformis_left'),
				'Piriformis_right' =>$this->input->post('Piriformis_right'),
				'Thomas_left' =>$this->input->post('Thomas_left'),
				'Thomas_right' =>$this->input->post('Thomas_right'),
				'Ober_left' =>$this->input->post('Ober_left'),
				'Ober_right' =>$this->input->post('Ober_right'),
				'Leg_left' =>$this->input->post('Leg_left'),
				'Leg_right' =>$this->input->post('Leg_right'),
				'Diagnosis' =>$this->input->post('Diagnosis'),
				'Treatment' =>$this->input->post('Treatment'),
				'Therapist' =>$this->input->post('Therapist'),
				
			 );
			 $this->db->insert('tbl_hipassessment',$data);
		}
		
		public function addknee_assessment() {
			
			$this->db->where('patient_id',$this->input->post('patient_id'));
		   $this->db->where('date',date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))));
		   $this->db->limit(1);
		   $this->db->select('img_name,code')->from('tbl_ass_body_chart');
		   $this->db->order_by('img_id','DESC');
		   $res = $this->db->get();
		   if($res->result_array() != false){
		     $image = base_url().'wpaintone/test/uploads/'.$res->row()->img_name;
			  $code = $res->row()->code;
           } else {
			   $image = '';
			   $code = '';
		   }
		   
			 $data = array(
				'patient_id' =>$this->input->post('patient_id'),
				'client_id' =>$this->session->userdata('client_id'),
				'assess_date' =>date('Y-m-d',strtotime($this->input->post('assess_date'))),
				'social' =>$this->input->post('social'),
				'chart' => $image,
				'code' => $code,
				'Investigations' =>$this->input->post('Investigations'),
				'procedures' =>$this->input->post('procedures'),
				'injury' =>$this->input->post('injury'),
				'antl_active' =>$this->input->post('antl_active'),
				'antl_passive' =>$this->input->post('antl_passive'),
				'antr_active' =>$this->input->post('antr_active'),
				'antr_passive' =>$this->input->post('antr_passive'),
				'postl_active' =>$this->input->post('postl_active'),
				'postl_passive' =>$this->input->post('postl_passive'),
				'postr_active' =>$this->input->post('postr_active'),
				'postr_passive' =>$this->input->post('postr_passive'),
				'medl_active' =>$this->input->post('medl_active'),
				'medl_passive' =>$this->input->post('medl_passive'),
				'medr_active' =>$this->input->post('medr_active'),
				'medr_passive' =>$this->input->post('medr_passive'),
				'latl_active' =>$this->input->post('latl_active'),
				'latl_passive' =>$this->input->post('latl_passive'),
				'latr_active' =>$this->input->post('latr_active'),
				'latr_passive' =>$this->input->post('latr_passive'),
				'clickingl_active' =>$this->input->post('clickingl_active'),
				'clickingl_passive' =>$this->input->post('clickingl_passive'),
				'clickingr_active' =>$this->input->post('clickingr_active'),
				'clickingr_passive' =>$this->input->post('clickingr_passive'),
				'wayl_active' =>$this->input->post('wayl_active'),
				'wayl_passive' =>$this->input->post('wayl_passive'),
				'wayr_active' =>$this->input->post('wayr_active'),
				'wayr_passive' =>$this->input->post('wayr_passive'),
				'lockingl_active' =>$this->input->post('lockingl_active'),
				'lockingl_passive' =>$this->input->post('lockingl_passive'),
				'lockingr_active' =>$this->input->post('lockingr_active'),
				'lockingr_passive' =>$this->input->post('lockingr_passive'),
				'gratingl_active' =>$this->input->post('gratingl_active'),
				'gratingl_passive' =>$this->input->post('gratingl_passive'),
				'gratingr_active' =>$this->input->post('gratingr_active'),
				'gratingr_passive' =>$this->input->post('gratingr_passive'),
				'stiffl_active' =>$this->input->post('stiffl_active'),
				'stiffl_passive' =>$this->input->post('stiffl_passive'),
				'stiffr_active' =>$this->input->post('stiffr_active'),
				'stiffr_passive' =>$this->input->post('stiffr_passive'),
				'warml_active' =>$this->input->post('warml_active'),
				'warml_passive' =>$this->input->post('warml_passive'),
				'warmr_active' =>$this->input->post('warmr_active'),
				'warmr_passive' =>$this->input->post('warmr_passive'),
				'swell_active' =>$this->input->post('swell_active'),
				'swell_passive' =>$this->input->post('swell_passive'),
				'swellr_active' =>$this->input->post('swellr_active'),
				'swellr_passive' =>$this->input->post('swellr_passive'),
				'skinl_active' =>$this->input->post('skinl_active'),
				'skinl_passive' =>$this->input->post('skinl_passive'),
				'skinr_active' =>$this->input->post('skinr_active'),
				'skinr_passive' =>$this->input->post('skinr_passive'),
				'atrophyl_active' =>$this->input->post('atrophyl_active'),
				'atrophyl_passive' =>$this->input->post('atrophyl_passive'),
				'atrophyr_active' =>$this->input->post('atrophyr_active'),
				'atrophyr_passive' =>$this->input->post('atrophyr_passive'),
				'tightnessl_active' =>$this->input->post('tightnessl_active'),
				'tightnessl_passive' =>$this->input->post('tightnessl_passive'),
				'tightnessr_active' =>$this->input->post('tightnessr_active'),
				'tightnessr_passive' =>$this->input->post('tightnessr_passive'),
				'trackingl_active' =>$this->input->post('trackingl_active'),
				'trackingl_passive' =>$this->input->post('trackingl_passive'),
				'trackingr_active' =>$this->input->post('trackingr_active'),
				'trackingr_passive' =>$this->input->post('trackingr_passive'),
				'categories' =>$this->input->post('categories'),
				'worse' =>$this->input->post('worse'),
				'Aggravating_factors' =>$this->input->post('Aggravating_factors'),
				'Relieving_factors' =>$this->input->post('Relieving_factors'),
				'posture' =>$this->input->post('posture'),
				'Walking' =>$this->input->post('Walking'),
				'bearing' =>$this->input->post('bearing'),
				'flexl_active' =>$this->input->post('flexl_active'),
				'flexl_passive' =>$this->input->post('flexl_passive'),
				'flexl_mmt' =>$this->input->post('flexl_mmt'),
				'flexr_active' =>$this->input->post('flexr_active'),
				'flexr_passive' =>$this->input->post('flexr_passive'),
				'flexr_mmt' =>$this->input->post('flexr_mmt'),
				'exl_active' =>$this->input->post('exl_active'),
				'exl_passive' =>$this->input->post('exl_passive'),
				'exl_mmt' =>$this->input->post('exl_mmt'),
				'exr_active' =>$this->input->post('exr_active'),
				'exr_passive' =>$this->input->post('exr_passive'),
				'exr_mmt' =>$this->input->post('exr_mmt'),
				'anklel_active' =>$this->input->post('anklel_active'),
				'anklel_passive' =>$this->input->post('anklel_passive'),
				'anklel_mmt' =>$this->input->post('anklel_mmt'),
				'ankler_active' =>$this->input->post('ankler_active'),
				'ankler_passive' =>$this->input->post('ankler_passive'),
				'ankler_mmt' =>$this->input->post('ankler_mmt'),
				'hipl_active' =>$this->input->post('hipl_active'),
				'hipl_passive' =>$this->input->post('hipl_passive'),
				'hipl_mmt' =>$this->input->post('hipl_mmt'),
				'hipr_active' =>$this->input->post('hipr_active'),
				'hipr_passive' =>$this->input->post('hipr_passive'),
				'hipr_mmt' =>$this->input->post('hipr_mmt'),
				'ant_left' =>$this->input->post('ant_left'),
				'ant_right' =>$this->input->post('ant_right'),
				'post_left' =>$this->input->post('post_left'),
				'post_right' =>$this->input->post('post_right'),
				'McMurrays_left' =>$this->input->post('McMurrays_left'),
				'McMurrays_right' =>$this->input->post('McMurrays_right'),
				'Pivot_left' =>$this->input->post('Pivot_left'),
				'Pivot_right' =>$this->input->post('Pivot_right'),
				'Patellar_left' =>$this->input->post('Patellar_left'),
				'Patellar_right' =>$this->input->post('Patellar_right'),
				'Varusmcl_left' =>$this->input->post('Varusmcl_left'),
				'Varusmcl_right' =>$this->input->post('Varusmcl_right'),
				'Varuslcl_left' =>$this->input->post('Varuslcl_left'),
				'Varuslcl_right' =>$this->input->post('Varuslcl_right'),
				'Lachman_left' =>$this->input->post('Lachman_left'),
				'Lachman_right' =>$this->input->post('Lachman_right'),
				'Popliteal_left' =>$this->input->post('Popliteal_left'),
				'Popliteal_right' =>$this->input->post('Popliteal_right'),
				'Valgus_left' =>$this->input->post('Valgus_left'),
				'Valgus_right' =>$this->input->post('Valgus_right'),
				'Diagnosis' =>$this->input->post('Diagnosis'),
				'Treatment' =>$this->input->post('Treatment'),
				'Therapist' =>$this->input->post('Therapist'),
				'pain_scale' =>$this->input->post('pain_scale')
			 );
			 $this->db->insert('tbl_kneeassessment',$data);
		}
		public function viewshoulder_detail($patient_id,$from_date,$to_date) {
			$this->db->where('patient_id',$patient_id);
			if($from_date == '' && $to_date == ''){ } else {
			$this->db->where('assess_date >=',date('Y-m-d',strtotime($from_date)));
			$this->db->where('assess_date <=',date('Y-m-d',strtotime($to_date)));
			}
			$this->db->select('*')->from('tbl_shoulderassessment');
			$query=$this->db->get();
			return ($query->num_rows() > 0) ? $query->result_array() : false;
		}
		public function viewknee_detail($patient_id,$from_date,$to_date) {
			$this->db->where('patient_id',$patient_id);
			if($from_date == '' && $to_date == ''){ } else {
			$this->db->where('assess_date >=',date('Y-m-d',strtotime($from_date)));
			$this->db->where('assess_date <=',date('Y-m-d',strtotime($to_date)));
			}
			$this->db->select('*')->from('tbl_kneeassessment');
			$query=$this->db->get();
			return ($query->num_rows() > 0) ? $query->result_array() : false;
		}
		public function viewhip_detail($patient_id,$from_date,$to_date) {
			$this->db->where('patient_id',$patient_id);
			if($from_date == '' && $to_date == ''){ } else {
			$this->db->where('assess_date >=',date('Y-m-d',strtotime($from_date)));
			$this->db->where('assess_date <=',date('Y-m-d',strtotime($to_date)));
			}$this->db->select('*')->from('tbl_hipassessment');
			$query=$this->db->get();
			return ($query->num_rows() > 0) ? $query->result_array() : false;
		}
		public function viewfoot_detail($patient_id,$from_date,$to_date) {
			$this->db->where('patient_id',$patient_id);
			if($from_date == '' && $to_date == ''){ } else {
			$this->db->where('assess_date >=',date('Y-m-d',strtotime($from_date)));
			$this->db->where('assess_date <=',date('Y-m-d',strtotime($to_date)));
			}$this->db->select('*')->from('tbl_footassessment');
			$query=$this->db->get();
			return ($query->num_rows() > 0) ? $query->result_array() : false;
		}
		public function viewelbow_detail($patient_id,$from_date,$to_date) {
			$this->db->where('patient_id',$patient_id);
			if($from_date == '' && $to_date == ''){ } else {
			$this->db->where('assess_date >=',date('Y-m-d',strtotime($from_date)));
			$this->db->where('assess_date <=',date('Y-m-d',strtotime($to_date)));
			}$this->db->select('*')->from('tbl_elbowassessment');
			$query=$this->db->get();
			return ($query->num_rows() > 0) ? $query->result_array() : false;
		}
		public function DeleteHipassess($patient_id,$h_id) {
			
			/* $where = array('patient_id' => $patient_id,'h_id' => $h_id);
			$this->db->where($where); 
			$this->db->select('code')->from('tbl_hipassessment');
			$query = $this->db->get();
			if($query->result_array() != false){
			$code = $query->row()->code;
			
			$this->db->select('*')->from('tbl_ass_body_chart');
			$this->db->where('code',$code);
			$res = $this->db->get();
			$img_name = $res->row()->img_name;
		
			unlink("wpaintone/test/uploads/".$img_name);
			$this->db->where('code',$code);
			$this->db->delete('tbl_ass_body_chart');
			
			}
			else{
				
			} */
			$where1 = array('patient_id' => $patient_id,'h_id' => $h_id);
			$this->db->where($where1); 
			$this->db->delete('tbl_hipassessment');
			return $h_id;
		   // return $ex_id;
		}
                
                public function DeletePaediatricAssess($patient_id,$p_id,$access) {
			
			/* $where = array('patient_id' => $patient_id,'h_id' => $h_id);
			$this->db->where($where); 
			$this->db->select('code')->from('tbl_hipassessment');
			$query = $this->db->get();
			if($query->result_array() != false){
			$code = $query->row()->code;
			
			$this->db->select('*')->from('tbl_ass_body_chart');
			$this->db->where('code',$code);
			$res = $this->db->get();
			$img_name = $res->row()->img_name;
		
			unlink("wpaintone/test/uploads/".$img_name);
			$this->db->where('code',$code);
			$this->db->delete('tbl_ass_body_chart');
			
			}
			else{
				
			} */
			$where1 = array('patient_id' => $patient_id,'paediatric_id' => $p_id);
			$this->db->where($where1); 
			$this->db->delete('tbl_paediatric');
			
			$where2= array('patient_id' => $patient_id,'assess_date' => $access);
			$this->db->where($where2); 
			$this->db->delete('tbl_paediatric_gmfm_lr');
                        $where2= array('patient_id' => $patient_id,'assess_date' => $access);
			$this->db->where($where2);
			$this->db->delete('tbl_paediatric_gmfm_sit');
                        $where2= array('patient_id' => $patient_id,'assess_date' => $access);
			$this->db->where($where2);
			$this->db->delete('tbl_paediatric_gmfm_ck');
                        $where2= array('patient_id' => $patient_id,'assess_date' => $access);
			$this->db->where($where2);
			$this->db->delete('tbl_paediatric_gmfm_stand');
                        $where2= array('patient_id' => $patient_id,'assess_date' => $access);
			$this->db->where($where2);
			$this->db->delete('tbl_paediatric_gmfm_walk');
			return $p_id;
		   // return $ex_id;
		}
                
		public function DeleteElbowassess($patient_id,$e_id) {
			/* $where = array('patient_id' => $patient_id,'e_id' => $e_id);
			$this->db->where($where); 
			$this->db->select('code')->from('tbl_elbowassessment');
			$query = $this->db->get();
			$code = $query->row()->code;
			
			$this->db->select('*')->from('tbl_ass_body_chart');
			$this->db->where('code',$code);
			$res = $this->db->get();
			$img_name = $res->row()->img_name;
		
			unlink("wpaintone/test/uploads/".$img_name);
			$this->db->where('code',$code);
			$this->db->delete('tbl_ass_body_chart');
			 */
			$where1 = array('patient_id' => $patient_id,'e_id' => $e_id);
			$this->db->where($where1); 
			$this->db->delete('tbl_elbowassessment');
			    return $e_id;
		}
		public function Deletekneeassess($patient_id,$k_id) {
			   
			/* $where = array('patient_id' => $patient_id,'k_id' => $k_id);
			$this->db->where($where); 
			$this->db->select('code')->from('tbl_kneeassessment');
			$query = $this->db->get();
			$code = $query->row()->code;
			
			$this->db->select('*')->from('tbl_ass_body_chart');
			$this->db->where('code',$code);
			$res = $this->db->get();
			$img_name = $res->row()->img_name;
		
			unlink("wpaintone/test/uploads/".$img_name);
			$this->db->where('code',$code);
			$this->db->delete('tbl_ass_body_chart'); */
			
			$where1 = array('patient_id' => $patient_id,'k_id' => $k_id);
			$this->db->where($where1); 
			$this->db->delete('tbl_kneeassessment');
			return $k_id;
		}
		public function DeleteFootassess($patient_id,$f_id) {
			/* $where = array('patient_id' => $patient_id,'f_id' => $f_id);
			$this->db->where($where); 
			$this->db->select('code')->from('tbl_footassessment');
			$query = $this->db->get();
			$code = $query->row()->code;
			
			$this->db->select('*')->from('tbl_ass_body_chart');
			$this->db->where('code',$code);
			$res = $this->db->get();
			$img_name = $res->row()->img_name;
		
			unlink("wpaintone/test/uploads/".$img_name);
			$this->db->where('code',$code);
			$this->db->delete('tbl_ass_body_chart');
			 */
			$where1 = array('patient_id' => $patient_id,'f_id' => $f_id);
			$this->db->where($where1); 
			$this->db->delete('tbl_footassessment');
			return $f_id;
		}
		public function DeleteShoulderassess($patient_id,$s_id) {
			/* 
			$where = array('patient_id' => $patient_id,'s_id' => $s_id);
			$this->db->where($where); 
			$this->db->select('code')->from('tbl_shoulderassessment');
			$query = $this->db->get();
			$code = $query->row()->code;
			
			$this->db->select('*')->from('tbl_ass_body_chart');
			$this->db->where('code',$code);
			$res = $this->db->get();
			$img_name = $res->row()->img_name;
		
			unlink("wpaintone/test/uploads/".$img_name);
			$this->db->where('code',$code);
			$this->db->delete('tbl_ass_body_chart');
			 */
			$where1 = array('patient_id' => $patient_id,'s_id' => $s_id);
			$this->db->where($where1); 
			$this->db->delete('tbl_shoulderassessment');
			    return $s_id;
		}
		public function editshoulder_assessment($s_id) {
			$this->db->where('s_id',$s_id);
			$this->db->select('*')->from('tbl_shoulderassessment');
			$query=$this->db->get();
			return ($query->num_rows() > 0) ? $query->row_array() : false;
		}
		public function editkneejoint_assessment($k_id) {
			$this->db->where('k_id',$k_id);
			$this->db->select('*')->from('tbl_kneeassessment');
			$query=$this->db->get();
			return ($query->num_rows() > 0) ? $query->row_array() : false;
		}
		public function edithip_assessment($h_id) {
			$this->db->where('h_id',$h_id);
			$this->db->select('*')->from('tbl_hipassessment');
			$query=$this->db->get();
			return ($query->num_rows() > 0) ? $query->row_array() : false;
		}
		public function editfootankle_assessment($f_id) {
			$this->db->where('f_id',$f_id);
			$this->db->select('*')->from('tbl_footassessment');
			$query=$this->db->get();
			return ($query->num_rows() > 0) ? $query->row_array() : false;
		}
		public function editelbowwrist_assessment($e_id) {
			$this->db->where('e_id',$e_id);
			$this->db->select('*')->from('tbl_elbowassessment');
			$query=$this->db->get();
			return ($query->num_rows() > 0) ? $query->row_array() : false;
		}
		public function updateshoulder_assessment() {
			
		   $this->db->where('patient_id',$this->input->post('patient_id'));
		   $this->db->where('date',date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))));
		   $this->db->limit(1);
		   $this->db->select('img_name,code')->from('tbl_ass_body_chart');
		   $this->db->order_by('img_id','DESC');
		   $res = $this->db->get();
		   if($res->result_array() != false){
		     $image = base_url().'wpaintone/test/uploads/'.$res->row()->img_name;
			  $code = $res->row()->code;
           } else {
			   $image = '';
			   $code = '';
		   }
			$s_id = $this->input->post('s_id');
			 $data = array(
				'assess_date' =>date('Y-m-d',strtotime($this->input->post('assess_date'))),
				'chart' => $image,
				'code' => $code,
				'social' =>$this->input->post('social'),
				'injury' =>$this->input->post('injury'),
				'investigations' =>$this->input->post('investigations'),
				'surgery' =>$this->input->post('surgery'),
				'ant_left' =>$this->input->post('ant_left'),
				'ant_right' =>$this->input->post('ant_right'),
				'post_left' =>$this->input->post('post_left'),
				'post_right' =>$this->input->post('post_right'),
				'med_left' =>$this->input->post('med_left'),
				'med_right' =>$this->input->post('med_right'),
				'lat_left' =>$this->input->post('lat_left'),
				'lat_right' =>$this->input->post('lat_right'),
				'bic_left' =>$this->input->post('bic_left'),
				'bic_right' =>$this->input->post('bic_right'),
				'clicking_left' =>$this->input->post('clicking_left'),
				'clicking_right' =>$this->input->post('clicking_right'),
				'stiffness_left' =>$this->input->post('stiffness_left'),
				'stiffness_right' =>$this->input->post('stiffness_right'),
				'alignment_left' =>$this->input->post('alignment_left'),
				'alignment_right' =>$this->input->post('alignment_right'),
				'swelling_left' =>$this->input->post('swelling_left'),
				'swelling_right' =>$this->input->post('swelling_right'),
				'warmth_left' =>$this->input->post('warmth_left'),
				'warmth_right' =>$this->input->post('warmth_right'),
				'winging_left' =>$this->input->post('winging_left'),
				'winging_right' =>$this->input->post('winging_right'),
				'atrophy_left' =>$this->input->post('atrophy_left'),
				'atrophy_right' =>$this->input->post('atrophy_right'),
				'tightness_left' =>$this->input->post('tightness_left'),
				'tightness_right' =>$this->input->post('tightness_right'),
				'deformities_left' =>$this->input->post('deformities_left'),
				'deformities_right' =>$this->input->post('deformities_right'),
				'pain_scale' =>$this->input->post('pain_scale'),
				'duration' =>$this->input->post('duration'),
				'category' =>$this->input->post('categories'),
				'worse' =>$this->input->post('worse'),
				'aggrevating' =>$this->input->post('aggrevating'),
				'relieving' =>$this->input->post('relieving'),
				'n_pain' =>$this->input->post('n_pain'),
				'n_stiffness' =>$this->input->post('n_stiffness'),
				'n_radiation' =>$this->input->post('n_radiation'),
				'flexion_active' =>$this->input->post('flexion_active'),
				'flexion_active1' =>$this->input->post('flexion_active1'),
				'flexion_passive' =>$this->input->post('flexion_passive'),
				'flexion_passive1' =>$this->input->post('flexion_passive1'),
				'flexion_mmt' =>$this->input->post('flexion_mmt'),
				'flexion_mmt1' =>$this->input->post('flexion_mmt1'),
				'extension_active' =>$this->input->post('extension_active'),
				'extension_active1' =>$this->input->post('extension_active1'),
				'extension_passive' =>$this->input->post('extension_passive'),
				'extension_passive1' =>$this->input->post('extension_passive1'),
				'extension_mmt' =>$this->input->post('extension_mmt'),
				'extension_mmt1' =>$this->input->post('extension_mmt1'),
				'abduction_active' =>$this->input->post('abduction_active'),
				'abduction_active1' =>$this->input->post('abduction_active1'),
				'abduction_passive' =>$this->input->post('abduction_passive'),
				'abduction_passive1' =>$this->input->post('abduction_passive1'),
				'abduction_mmt' =>$this->input->post('abduction_mmt'),
				'abduction_mmt1' =>$this->input->post('abduction_mmt1'),
				'adduction_active' =>$this->input->post('adduction_active'),
				'adduction_active1' =>$this->input->post('adduction_active1'),
				'adduction_passive' =>$this->input->post('adduction_passive'),
				'adduction_passive1' =>$this->input->post('adduction_passive1'),
				'adduction_mmt' =>$this->input->post('adduction_mmt'),
				'adduction_mmt1' =>$this->input->post('adduction_mmt1'),
				'internalrot_active' =>$this->input->post('internalrot_active'),
				'internalrot_active1' =>$this->input->post('internalrot_active1'),
				'internalerot_passive' =>$this->input->post('internalerot_passive'),
				'internalerot_passive1' =>$this->input->post('internalerot_passive1'),
				'internalerot_mmt' =>$this->input->post('internalerot_mmt'),
				'internalerot_mmt1' =>$this->input->post('internalerot_mmt1'),
				'externalrot_active' =>$this->input->post('externalrot_active'),
				'externalrot_active1' =>$this->input->post('externalrot_active1'),
				'externalrot_passive' =>$this->input->post('externalrot_passive'),
				'externalrot_passive1' =>$this->input->post('externalrot_passive1'),
				'externalrot_mmt' =>$this->input->post('externalrot_mmt'),
				'externalrot_mmt1' =>$this->input->post('externalrot_mmt1'),
				'painful_left' =>$this->input->post('painful_left'),
				'painful_right' =>$this->input->post('painful_right'),
				'supraspinatus_left' =>$this->input->post('supraspinatus_left'),
				'supraspinatus_right' =>$this->input->post('supraspinatus_right'),
				'Hawkins_left' =>$this->input->post('Hawkins_left'),
				'Hawkins_right' =>$this->input->post('Hawkins_right'),
				'Stability_left' =>$this->input->post('Stability_left'),
				'Stability_right' =>$this->input->post('Stability_right'),
				'Apprehension_left' =>$this->input->post('Apprehension_left'),
				'Apprehension_right' =>$this->input->post('Apprehension_right'),
				'Drop_left' =>$this->input->post('Drop_left'),
				'Drop_right' =>$this->input->post('Drop_right'),
				'Sulcus_left' =>$this->input->post('Sulcus_left'),
				'Sulcus_right' =>$this->input->post('Sulcus_right'),
				'left2' =>$this->input->post('left2'),
				'right2' =>$this->input->post('right2'),
				'Diagnosis' =>$this->input->post('Diagnosis'),
				'Treatment' =>$this->input->post('Treatment'),
				'Therapist' =>$this->input->post('Therapist'),
				'client_id' => $this->session->userdata('client_id'),
				'Infraspinatus_left' =>$this->input->post('Infraspinatus_left'),
				'Infraspinatus_right' =>$this->input->post('Infraspinatus_right'),
				'Subscapularis_left' =>$this->input->post('Subscapularis_left'),
				'Subscapularis_right' =>$this->input->post('Subscapularis_right')
				
			 );
			 $this->db->where('s_id',$s_id);
			 $this->db->update('tbl_shoulderassessment',$data);
			 return $s_id;
		}
		
		public function updateelbow_assessment() {
			
			
		   $this->db->where('patient_id',$this->input->post('patient_id'));
		   $this->db->where('date',date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))));
		   $this->db->limit(1);
		   $this->db->select('img_name,code')->from('tbl_ass_body_chart');
		   $this->db->order_by('img_id','DESC');
		   $res = $this->db->get();
		   if($res->result_array() != false){
		     $image = base_url().'wpaintone/test/uploads/'.$res->row()->img_name;
			  $code = $res->row()->code;
           } else {
			   $image = '';
			   $code = '';
		   }
		   
		$e_id = $this->input->post('e_id');
			 $data = array(
				'patient_id' =>$this->input->post('patient_id'),
				'assess_date' =>date('Y-m-d',strtotime($this->input->post('assess_date'))),
				'chart' => $image,
				'code' => $code,
				'Limitation' =>$this->input->post('Limitation'),
				'injury' =>$this->input->post('injury'),
				'Investigations' =>$this->input->post('Investigations'),
				'Surgery' =>$this->input->post('Surgery'),
				'ant_left' =>$this->input->post('ant_left'),
				'ant_right' =>$this->input->post('ant_right'),
				'post_left' =>$this->input->post('post_left'),
				'post_right' =>$this->input->post('post_right'),
				'med_left' =>$this->input->post('med_left'),
				'med_right' =>$this->input->post('med_right'),
				'lat_left' =>$this->input->post('lat_left'),
				'lat_right' =>$this->input->post('lat_right'),
				'bic_left' =>$this->input->post('bic_left'),
				'bic_right' =>$this->input->post('bic_right'),
				'clicking_left' =>$this->input->post('clicking_left'),
				'clicking_right' =>$this->input->post('clicking_right'),
				'stiffness_left' =>$this->input->post('stiffness_left'),
				'stiffness_right' =>$this->input->post('stiffness_right'),
				'Alignment_left' =>$this->input->post('Alignment_left'),
				'Alignment_right' =>$this->input->post('Alignment_right'),
				'Swelling_left' =>$this->input->post('Swelling_left'),
				'Swelling_right' =>$this->input->post('Swelling_right'),
				'Warmth_left' =>$this->input->post('Warmth_left'),
				'Warmth_right' =>$this->input->post('Warmth_right'),
				'Winging_left' =>$this->input->post('Winging_left'),
				'Winging_right' =>$this->input->post('Winging_right'),
				'atrophy_left' =>$this->input->post('atrophy_left'),
				'atrophy_right' =>$this->input->post('atrophy_right'),
				'tightness_left' =>$this->input->post('tightness_left'),
				'tightness_right' =>$this->input->post('tightness_right'),
				'deformities_left' =>$this->input->post('deformities_left'),
				'deformities_right' =>$this->input->post('deformities_right'),
				'rate' =>$this->input->post('rate'),
				'pain_worst' =>$this->input->post('pain_worst'),
				'at_rest' =>$this->input->post('at_rest'),
				'heavy' =>$this->input->post('heavy'),
				'mvt' =>$this->input->post('mvt'),
				'at_night' =>$this->input->post('at_night'),
				'pain_type1' =>$this->input->post('pain_type1'),
				'aggrevating' =>$this->input->post('aggrevating'),
				'relieving' =>$this->input->post('relieving'),
				'n_pain' =>$this->input->post('n_pain'),
				'n_stiffness' =>$this->input->post('n_stiffness'),
				'n_radiation' =>$this->input->post('n_radiation'),
				'Tingling' =>$this->input->post('Tingling'),
				'flexion_active' =>$this->input->post('flexion_active'),
				'flexion_active1' =>$this->input->post('flexion_active1'),
				'flexion_passive' =>$this->input->post('flexion_passive'),
				'flexion_passive1' =>$this->input->post('flexion_passive1'),
				'flexion_mmt' =>$this->input->post('flexion_mmt'),
				'flexion_mmt1' =>$this->input->post('flexion_mmt1'),
				'extension_active' =>$this->input->post('extension_active'),
				'extension_active1' =>$this->input->post('extension_active1'),
				'extension_passive' =>$this->input->post('extension_passive'),
				'extension_passive1' =>$this->input->post('extension_passive1'),
				'extension_mmt' =>$this->input->post('extension_mmt'),
				'extension_mmt1' =>$this->input->post('extension_mmt1'),
				'Pronation_active' =>$this->input->post('Pronation_active'),
				'Pronation_active1' =>$this->input->post('Pronation_active1'),
				'Pronation_passive' =>$this->input->post('Pronation_passive'),
				'Pronation_passive1' =>$this->input->post('Pronation_passive1'),
				'Pronation_mmt' =>$this->input->post('Pronation_mmt'),
				'Pronation_mmt1' =>$this->input->post('Pronation_mmt1'),
				'Supination_active' =>$this->input->post('Supination_active'),
				'Supination_passive' =>$this->input->post('Supination_passive'),
				'Supination_mmt' =>$this->input->post('Supination_mmt'),
				'Supination_active1' =>$this->input->post('Supination_active1'),
				'Supination_passive1' =>$this->input->post('Supination_passive1'),
				'Supination_mmt1' =>$this->input->post('Supination_mmt1'),
				'Elbow_left' =>$this->input->post('Elbow_left'),
				'Elbow_right' =>$this->input->post('Elbow_right'),
				'Varuslcl_left' =>$this->input->post('Varuslcl_left'),
				'Varuslcl_right' =>$this->input->post('Varuslcl_right'),
				'Valgusmcl_left' =>$this->input->post('Valgusmcl_left'),
				'Valgusmcl_right' =>$this->input->post('Valgusmcl_right'),
				'Irritated_left' =>$this->input->post('Irritated_left'),
				'Irritated_right' =>$this->input->post('Irritated_right'),
				'pronation_left' =>$this->input->post('pronation_left'),
				'pronation_right' =>$this->input->post('pronation_right'),
				'Golfers_left' =>$this->input->post('Golfers_left'),
				'Golfers_right' =>$this->input->post('Golfers_right'),
				'Wrist_left' =>$this->input->post('Wrist_left'),
				'Wrist_right' =>$this->input->post('Wrist_right'),
				'Carpal_left' =>$this->input->post('Carpal_left'),
				'Carpal_right' =>$this->input->post('Carpal_right'),
				'Tinel_left' =>$this->input->post('Tinel_left'),
				'Tinel_right' =>$this->input->post('Tinel_right'),
				'Finkelstein_left' =>$this->input->post('Finkelstein_left'),
				'Finkelstein_right' =>$this->input->post('Finkelstein_right'),
				'category' =>$this->input->post('categories'),
				'Diagnosis' =>$this->input->post('Diagnosis'),
				'Treatment' =>$this->input->post('Treatment'),
				'Therapist' =>$this->input->post('Therapist'),
				'client_id' => $this->session->userdata('client_id')
			 );
			 $this->db->where('e_id',$e_id);
			 $this->db->update('tbl_elbowassessment',$data);
			 return $e_id;
		}
		
		public function updatefoot_assessment() {
			
		   $this->db->where('patient_id',$this->input->post('patient_id'));
		   $this->db->where('date',date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))));
		   $this->db->limit(1);
		   $this->db->select('img_name,code')->from('tbl_ass_body_chart');
		   $this->db->order_by('img_id','DESC');
		   $res = $this->db->get();
		   if($res->result_array() != false){
		     $image = base_url().'wpaintone/test/uploads/'.$res->row()->img_name;
			  $code = $res->row()->code;
           } else {
			   $image = '';
			   $code = '';
		   }
		   
		  $f_id = $this->input->post('f_id'); 
			 $data = array(
				'patient_id' =>$this->input->post('patient_id'),
				'client_id' =>$this->session->userdata('client_id'),
				'assess_date' =>date('Y-m-d',strtotime($this->input->post('assess_date'))),
				'chart' => $image,
				'code' => $code,
				'social' =>$this->input->post('social'),
				'injury' =>$this->input->post('injury'),
				'procedures' =>$this->input->post('procedures'),
				'tenderness' =>$this->input->post('tenderness'),
				'Swelling' =>$this->input->post('swelling'),
				'bruises' =>$this->input->post('bruises'),
				'Warmth' =>$this->input->post('Warmth'),
				'sensation' =>$this->input->post('sensation'),
				'limb' =>$this->input->post('limb'),
				'High' =>$this->input->post('High'),
				'Antalgic' =>$this->input->post('Antalgic'),
				'propulsive' =>$this->input->post('propulsive'),
				'Balance' =>$this->input->post('Balance'),
				'Contracture' =>$this->input->post('Contracture'),
				'pain_scale' =>$this->input->post('pain_scale'),
				'duration' =>$this->input->post('duration'),
				'category' =>$this->input->post('categories'),
				'Aggravating' =>$this->input->post('Aggravating_factors'),
				'Relieving' =>$this->input->post('Relieving_factors'),
				'Dorsiflexion_active' =>$this->input->post('Dorsiflexion_active'),
				'Dorsiflexion_passive' =>$this->input->post('Dorsiflexion_passive'),
				'Dorsiflexion_active1' =>$this->input->post('Dorsiflexion_active1'),
				'Dorsiflexion_passive1' =>$this->input->post('Dorsiflexion_passive1'),
				'Plantar_active' =>$this->input->post('Plantar_active'),
				'Plantar_passive' =>$this->input->post('Plantar_passive'),
				'Plantar_active1' =>$this->input->post('Plantar_active1'),
				'Plantar_passive1' =>$this->input->post('Plantar_passive1'),
				'Inversion_active' =>$this->input->post('Inversion_active'),
				'Inversion_passive' =>$this->input->post('Inversion_passive'),
				'Inversion_active1' =>$this->input->post('Inversion_active1'),
				'Inversion_passive1' =>$this->input->post('Inversion_passive1'),
				'Eversion_active' =>$this->input->post('Eversion_active'),
				'Eversion_passive' =>$this->input->post('Eversion_passive'),
				'Eversion_active1' =>$this->input->post('Eversion_active1'),
				'Eversion_passive1' =>$this->input->post('Eversion_passive1'),
				'toef_active' =>$this->input->post('toef_active'),
				'toef_passive' =>$this->input->post('toef_passive'),
				'toef_active1' =>$this->input->post('toef_active1'),
				'toef_passive1' =>$this->input->post('toef_passive1'),
				'toee_active' =>$this->input->post('toee_active'),
				'toee_passive' =>$this->input->post('toee_passive'),
				'toee_active1' =>$this->input->post('toee_active1'),
				'toee_passive1' =>$this->input->post('toee_passive1'),
				'big_active' =>$this->input->post('big_active'),
				'big_passive' =>$this->input->post('big_passive'),
				'big_active1' =>$this->input->post('big_active1'),
				'big_passive1' =>$this->input->post('big_passive1'),
				'ant_passive1' =>$this->input->post('ant_passive1'),
				'Movements_left' =>$this->input->post('Movements_left'),
				'Invertors_left' =>$this->input->post('Invertors_left'),
				'Evertors_left' =>$this->input->post('Evertors_left'),
				'Dorsi_left' =>$this->input->post('Dorsi_left'),
				'Plantar_left' =>$this->input->post('Plantar_left'),
				'EHL_left' =>$this->input->post('EHL_left'),
				'Extensor_left' =>$this->input->post('Extensor_left'),
				'Flexor_left' =>$this->input->post('Flexor_left'),
				'Flexor_right' =>$this->input->post('Flexor_right'),
				'Extensor_right' =>$this->input->post('Extensor_right'),
				'EHL_right' =>$this->input->post('EHL_right'),
				'Plantar_right' =>$this->input->post('Plantar_right'),
				'Dorsi_right' =>$this->input->post('Dorsi_right'),
				'Evertors_right' =>$this->input->post('Evertors_right'),
				'Invertors_right' =>$this->input->post('Invertors_right'),
				'Movements_right' =>$this->input->post('Movements_right'),
				'ATFLAnterior_left' =>$this->input->post('ATFLAnterior_left'),
				'ATFLAnterior_right' =>$this->input->post('ATFLAnterior_right'),
				'ATFLSqueeze_left' =>$this->input->post('ATFLSqueeze_left'),
				'ATFLSqueeze_right' =>$this->input->post('ATFLSqueeze_right'),
				'Inversiontalar_left' =>$this->input->post('Inversiontalar_left'),
				'Inversiontalar_right' =>$this->input->post('Inversiontalar_right'),
				'Eversiontalar_left' =>$this->input->post('Eversiontalar_left'),
				'Eversiontalar_right' =>$this->input->post('Eversiontalar_right'),
				'Thompson_right' =>$this->input->post('Thompson_right'),
				'Valgus_left' =>$this->input->post('Valgus_left'),
				'Valgus_right' =>$this->input->post('Valgus_right'),
				'Diagnosis' =>$this->input->post('Diagnosis'),
				'Treatment' =>$this->input->post('Treatment'),
				'Therapist' =>$this->input->post('Therapist'),
				'Thompson_left' =>$this->input->post('Thompson_left'),
				
			 );
			 $this->db->where('f_id',$f_id);
			 $this->db->update('tbl_footassessment',$data);
			 return $f_id;
		}
		public function updatehip_assessment() {
			
		   $this->db->where('patient_id',$this->input->post('patient_id'));
		   $this->db->where('date',date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))));
		   $this->db->limit(1);
		   $this->db->select('img_name,code')->from('tbl_ass_body_chart');
		   $this->db->order_by('img_id','DESC');
		   $res = $this->db->get();
		   if($res->result_array() != false){
		     $image = base_url().'wpaintone/test/uploads/'.$res->row()->img_name;
			  $code = $res->row()->code;
           } else {
			   $image = '';
			   $code = '';
		   }
		   
		   
		   
		$h_id = $this->input->post('h_id'); 
			 $data = array(
				'patient_id' =>$this->input->post('patient_id'),
				'client_id' =>$this->session->userdata('client_id'),
				'assess_date' =>date('Y-m-d',strtotime($this->input->post('assess_date'))),
				'chart' => $image,
				'code' => $code,
				'social' =>$this->input->post('social'),
				'Investigations' =>$this->input->post('Investigations'),
				'Surgery' =>$this->input->post('Surgery'),
				'injury' =>$this->input->post('injury'),
				'Warmth' =>$this->input->post('Warmth'),
				'Edema' =>$this->input->post('Edema'),
				'Skin' =>$this->input->post('Skin'),
				'm_atrophy' =>$this->input->post('m_atrophy'),
				'Tightness' =>$this->input->post('Tightness'),
				'Snapping' =>$this->input->post('Snapping'),
				'Deformities' =>$this->input->post('Deformities'),
				'Limb' =>$this->input->post('Limb'),
				'Stance' =>$this->input->post('Stance'),
				'Swing' =>$this->input->post('Swing'),
				'Walking' =>$this->input->post('Walking'),
				'Weight' =>$this->input->post('Weight'),
				'pain_scale' =>$this->input->post('pain_scale'),
				'duration' =>$this->input->post('duration'),
				'category' =>$this->input->post('categories'),
				'worse' =>$this->input->post('worse'),
				'Aggravating' =>$this->input->post('Aggravating_factors'),
				'Relieving' =>$this->input->post('Relieving_factors'),
				'flexl_active' =>$this->input->post('flexl_active'),
				'flexl_passive' =>$this->input->post('flexl_passive'),
				'flexl_mmt' =>$this->input->post('flexl_mmt'),
				'flexr_active' =>$this->input->post('flexr_active'),
				'flexr_passive' =>$this->input->post('flexr_passive'),
				'flexr_mmt' =>$this->input->post('flexr_mmt'),
				'exl_active' =>$this->input->post('exl_active'),
				'exl_passive' =>$this->input->post('exl_passive'),
				'exl_mmt' =>$this->input->post('exl_mmt'),
				'exr_active' =>$this->input->post('exr_active'),
				'exr_passive' =>$this->input->post('exr_passive'),
				'exr_mmt' =>$this->input->post('exr_mmt'),
				'abduction1_active' =>$this->input->post('abduction1_active'),
				'abduction1_passive' =>$this->input->post('abduction1_passive'),
				'abduction1_mmt' =>$this->input->post('abduction1_mmt'),
				'abductionr_mmt' =>$this->input->post('abductionr_mmt'),
				'abductionr_passive' =>$this->input->post('abductionr_passive'),
				'abductionr_active' =>$this->input->post('abductionr_active'),
				'adductionl_active' =>$this->input->post('adductionl_active'),
				'adductionl_passive' =>$this->input->post('adductionl_passive'),
				'adductionl_mmt' =>$this->input->post('adductionl_mmt'),
				'adductionr_mmt' =>$this->input->post('adductionr_mmt'),
				'adductionr_passive' =>$this->input->post('adductionr_passive'),
				'adductionr_active' =>$this->input->post('adductionr_active'),
				'irotl_active' =>$this->input->post('irotl_active'),
				'irotl_passive' =>$this->input->post('irotl_passive'),
				'irotl_mmt' =>$this->input->post('irotl_mmt'),
				'irotr_mmt' =>$this->input->post('irotr_mmt'),
				'irotr_passive' =>$this->input->post('irotr_passive'),
				'irotr_active' =>$this->input->post('irotr_active'),
				'erotl_active' =>$this->input->post('erotl_active'),
				'erotl_passive' =>$this->input->post('erotl_passive'),
				'erotl_mmt' =>$this->input->post('erotl_mmt'),
				'erotr_mmt' =>$this->input->post('erotr_mmt'),
				'erotr_passive' =>$this->input->post('erotr_passive'),
				'erotr_active' =>$this->input->post('erotr_active'),
				'Trendelenburg_left' =>$this->input->post('Trendelenburg_left'),
				'Trendelenburg_right' =>$this->input->post('Trendelenburg_right'),
				'Fabers_left' =>$this->input->post('Fabers_left'),
				'Fabers_right' =>$this->input->post('Fabers_right'),
				'Bursitis_left' =>$this->input->post('Bursitis_left'),
				'Bursitis_right' =>$this->input->post('Bursitis_right'),
				'Piriformis_left' =>$this->input->post('Piriformis_left'),
				'Piriformis_right' =>$this->input->post('Piriformis_right'),
				'Thomas_left' =>$this->input->post('Thomas_left'),
				'Thomas_right' =>$this->input->post('Thomas_right'),
				'Ober_left' =>$this->input->post('Ober_left'),
				'Ober_right' =>$this->input->post('Ober_right'),
				'Leg_left' =>$this->input->post('Leg_left'),
				'Leg_right' =>$this->input->post('Leg_right'),
				'Diagnosis' =>$this->input->post('Diagnosis'),
				'Treatment' =>$this->input->post('Treatment'),
				'Therapist' =>$this->input->post('Therapist'),
				
			 );
			 $this->db->where('h_id',$h_id);
			 $this->db->update('tbl_hipassessment',$data);
			 return $h_id;
		}
		
		public function updateknee_assessment() {
			
		   $this->db->where('patient_id',$this->input->post('patient_id'));
		   $this->db->where('date',date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))));
		   $this->db->limit(1);
		   $this->db->select('img_name,code')->from('tbl_ass_body_chart');
		   $this->db->order_by('img_id','DESC');
		   $res = $this->db->get();
		   if($res->result_array() != false){
		     $image = base_url().'wpaintone/test/uploads/'.$res->row()->img_name;
			  $code = $res->row()->code;
           } else {
			   $image = '';
			   $code = '';
		   }
		   
		$k_id = $this->input->post('k_id'); 
			 $data = array(
				'patient_id' =>$this->input->post('patient_id'),
				'client_id' =>$this->session->userdata('client_id'),
				'assess_date' =>date('Y-m-d',strtotime($this->input->post('assess_date'))),
				'social' =>$this->input->post('social'),
				 'chart' => $image,
				'code' => $code,
				'Investigations' =>$this->input->post('Investigations'),
				'procedures' =>$this->input->post('procedures'),
				'injury' =>$this->input->post('injury'),
				'antl_active' =>$this->input->post('antl_active'),
				'antl_passive' =>$this->input->post('antl_passive'),
				'antr_active' =>$this->input->post('antr_active'),
				'antr_passive' =>$this->input->post('antr_passive'),
				'postl_active' =>$this->input->post('postl_active'),
				'postl_passive' =>$this->input->post('postl_passive'),
				'postr_active' =>$this->input->post('postr_active'),
				'postr_passive' =>$this->input->post('postr_passive'),
				'medl_active' =>$this->input->post('medl_active'),
				'medl_passive' =>$this->input->post('medl_passive'),
				'medr_active' =>$this->input->post('medr_active'),
				'medr_passive' =>$this->input->post('medr_passive'),
				'latl_active' =>$this->input->post('latl_active'),
				'latl_passive' =>$this->input->post('latl_passive'),
				'latr_active' =>$this->input->post('latr_active'),
				'latr_passive' =>$this->input->post('latr_passive'),
				'clickingl_active' =>$this->input->post('clickingl_active'),
				'clickingl_passive' =>$this->input->post('clickingl_passive'),
				'clickingr_active' =>$this->input->post('clickingr_active'),
				'clickingr_passive' =>$this->input->post('clickingr_passive'),
				'wayl_active' =>$this->input->post('wayl_active'),
				'wayl_passive' =>$this->input->post('wayl_passive'),
				'wayr_active' =>$this->input->post('wayr_active'),
				'wayr_passive' =>$this->input->post('wayr_passive'),
				'lockingl_active' =>$this->input->post('lockingl_active'),
				'lockingl_passive' =>$this->input->post('lockingl_passive'),
				'lockingr_active' =>$this->input->post('lockingr_active'),
				'lockingr_passive' =>$this->input->post('lockingr_passive'),
				'gratingl_active' =>$this->input->post('gratingl_active'),
				'gratingl_passive' =>$this->input->post('gratingl_passive'),
				'gratingr_active' =>$this->input->post('gratingr_active'),
				'gratingr_passive' =>$this->input->post('gratingr_passive'),
				'stiffl_active' =>$this->input->post('stiffl_active'),
				'stiffl_passive' =>$this->input->post('stiffl_passive'),
				'stiffr_active' =>$this->input->post('stiffr_active'),
				'stiffr_passive' =>$this->input->post('stiffr_passive'),
				'warml_active' =>$this->input->post('warml_active'),
				'warml_passive' =>$this->input->post('warml_passive'),
				'warmr_active' =>$this->input->post('warmr_active'),
				'warmr_passive' =>$this->input->post('warmr_passive'),
				'swell_active' =>$this->input->post('swell_active'),
				'swell_passive' =>$this->input->post('swell_passive'),
				'swellr_active' =>$this->input->post('swellr_active'),
				'swellr_passive' =>$this->input->post('swellr_passive'),
				'skinl_active' =>$this->input->post('skinl_active'),
				'skinl_passive' =>$this->input->post('skinl_passive'),
				'skinr_active' =>$this->input->post('skinr_active'),
				'skinr_passive' =>$this->input->post('skinr_passive'),
				'atrophyl_active' =>$this->input->post('atrophyl_active'),
				'atrophyl_passive' =>$this->input->post('atrophyl_passive'),
				'atrophyr_active' =>$this->input->post('atrophyr_active'),
				'atrophyr_passive' =>$this->input->post('atrophyr_passive'),
				'tightnessl_active' =>$this->input->post('tightnessl_active'),
				'tightnessl_passive' =>$this->input->post('tightnessl_passive'),
				'tightnessr_active' =>$this->input->post('tightnessr_active'),
				'tightnessr_passive' =>$this->input->post('tightnessr_passive'),
				'trackingl_active' =>$this->input->post('trackingl_active'),
				'trackingl_passive' =>$this->input->post('trackingl_passive'),
				'trackingr_active' =>$this->input->post('trackingr_active'),
				'trackingr_passive' =>$this->input->post('trackingr_passive'),
				'categories' =>$this->input->post('categories'),
				'worse' =>$this->input->post('worse'),
				'Aggravating_factors' =>$this->input->post('Aggravating_factors'),
				'Relieving_factors' =>$this->input->post('Relieving_factors'),
				'posture' =>$this->input->post('posture'),
				'Walking' =>$this->input->post('Walking'),
				'bearing' =>$this->input->post('bearing'),
				'flexl_active' =>$this->input->post('flexl_active'),
				'flexl_passive' =>$this->input->post('flexl_passive'),
				'flexl_mmt' =>$this->input->post('flexl_mmt'),
				'flexr_active' =>$this->input->post('flexr_active'),
				'flexr_passive' =>$this->input->post('flexr_passive'),
				'flexr_mmt' =>$this->input->post('flexr_mmt'),
				'exl_active' =>$this->input->post('exl_active'),
				'exl_passive' =>$this->input->post('exl_passive'),
				'exl_mmt' =>$this->input->post('exl_mmt'),
				'exr_active' =>$this->input->post('exr_active'),
				'exr_passive' =>$this->input->post('exr_passive'),
				'exr_mmt' =>$this->input->post('exr_mmt'),
				'anklel_active' =>$this->input->post('anklel_active'),
				'anklel_passive' =>$this->input->post('anklel_passive'),
				'anklel_mmt' =>$this->input->post('anklel_mmt'),
				'ankler_active' =>$this->input->post('ankler_active'),
				'ankler_passive' =>$this->input->post('ankler_passive'),
				'ankler_mmt' =>$this->input->post('ankler_mmt'),
				'hipl_active' =>$this->input->post('hipl_active'),
				'hipl_passive' =>$this->input->post('hipl_passive'),
				'hipl_mmt' =>$this->input->post('hipl_mmt'),
				'hipr_active' =>$this->input->post('hipr_active'),
				'hipr_passive' =>$this->input->post('hipr_passive'),
				'hipr_mmt' =>$this->input->post('hipr_mmt'),
				'ant_left' =>$this->input->post('ant_left'),
				'ant_right' =>$this->input->post('ant_right'),
				'post_left' =>$this->input->post('post_left'),
				'post_right' =>$this->input->post('post_right'),
				'McMurrays_left' =>$this->input->post('McMurrays_left'),
				'McMurrays_right' =>$this->input->post('McMurrays_right'),
				'Pivot_left' =>$this->input->post('Pivot_left'),
				'Pivot_right' =>$this->input->post('Pivot_right'),
				'Patellar_left' =>$this->input->post('Patellar_left'),
				'Patellar_right' =>$this->input->post('Patellar_right'),
				'Varusmcl_left' =>$this->input->post('Varusmcl_left'),
				'Varusmcl_right' =>$this->input->post('Varusmcl_right'),
				'Varuslcl_left' =>$this->input->post('Varuslcl_left'),
				'Varuslcl_right' =>$this->input->post('Varuslcl_right'),
				'Lachman_left' =>$this->input->post('Lachman_left'),
				'Lachman_right' =>$this->input->post('Lachman_right'),
				'Popliteal_left' =>$this->input->post('Popliteal_left'),
				'Popliteal_right' =>$this->input->post('Popliteal_right'),
				'Valgus_left' =>$this->input->post('Valgus_left'),
				'Valgus_right' =>$this->input->post('Valgus_right'),
				'Diagnosis' =>$this->input->post('Diagnosis'),
				'Treatment' =>$this->input->post('Treatment'),
				'Therapist' =>$this->input->post('Therapist'),
				'pain_scale' =>$this->input->post('pain_scale')
			 );
			 $this->db->where('k_id',$k_id);
			 $this->db->update('tbl_kneeassessment',$data);
			 return $k_id;
		}
		public function antenatal_detail($patient_id,$from_date,$to_date) {
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('patient_id',$patient_id);
		if($from_date == '' && $to_date == ''){ } else {
			$this->db->where('assess_date >=',date('Y-m-d',strtotime($from_date)));
			$this->db->where('assess_date <=',date('Y-m-d',strtotime($to_date)));
			}$this->db->select('*')->from('tbl_antenatal');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	 public function neuro_detail($patient_id,$from_date,$to_date) {
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('patient_id',$patient_id);
		if($from_date == '' && $to_date == ''){ } else {
			$this->db->where('assess_date >=',date('Y-m-d',strtotime($from_date)));
			$this->db->where('assess_date <=',date('Y-m-d',strtotime($to_date)));
			}$this->db->select('*')->from('tbl_neuro');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	 public function paediatric_detail($patient_id,$from_date,$to_date) {
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('patient_id',$patient_id);
		if($from_date == '' && $to_date == ''){ } else {
			$this->db->where('assess_date >=',date('Y-m-d',strtotime($from_date)));
			$this->db->where('assess_date <=',date('Y-m-d',strtotime($to_date)));
			}$this->db->select('*')->from('tbl_paediatric');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function ortho_detail($patient_id,$from_date,$to_date) {
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('patient_id',$patient_id);
		if($from_date == '' && $to_date == ''){ } else {
			$this->db->where('assess_date >=',date('Y-m-d',strtotime($from_date)));
			$this->db->where('assess_date <',date('Y-m-d',strtotime($to_date)));
			}$this->db->select('*')->from('tbl_ortho');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function sports_detail($patient_id,$from_date,$to_date) {
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('patient_id',$patient_id);
		if($from_date == '' && $to_date == ''){ } else {
			$this->db->where('assess_date >=',date('Y-m-d',strtotime($from_date)));
			$this->db->where('assess_date <',date('Y-m-d',strtotime($to_date)));
			}$this->db->select('*')->from('saaessment_details');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	 public function add_antenatal() {
		  $data1=array(
		    'age'=> $this->input->post('AGE'),
			'marital_status'=> $this->input->post('MARITAL'),
		    'occupation'=> $this->input->post('OCCUPATION'),
		    'height'=> $this->input->post('HEIGHT'),
		    'weight'=> $this->input->post('WEIGHT'),
		    'bmi'=> $this->input->post('BMI'),
		    'address_line1'=> $this->input->post('ADDRESS'),
		  );
		  $this->db->where('patient_id',$this->input->post('patient_id'));
		  $this->db->update('tbl_patient_info',$data1);
		  
		  $this->db->where('patient_id',$this->input->post('patient_id'));
		   $this->db->where('date',date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))));
		   $this->db->limit(1);
		   $this->db->select('img_name,code')->from('tbl_ass_body_chart');
		   $this->db->order_by('img_id','DESC');
		   $res = $this->db->get();
		   if($res->result_array() != false){
		     $image = 'https://www.physioplustech.in/wpaintone/test/uploads/'.$res->row()->img_name;
			 $code = $res->row()->code;
           } else {
			   $image = '';
			   $code = '';
		   }
		   
		  
		  $dat = str_replace('/','-',$this->input->post('assess_date'));
		  $data = array(
			   'patient_id' => $this->input->post('patient_id'),
			   'client_id' => $this->session->userdata('client_id'),
			   'staff_id' => $this->input->post('staff_id'),
			   'assess_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))),
			    'chart' => $image,
				'code' => $code,
			   'NAME' => $this->input->post('NAME'),
			   'LMP' => $this->input->post('LMP'),
			   'AGE' => $this->input->post('AGE'),
			   'EDD' => $this->input->post('EDD'),
			   'OCCUPATION' => $this->input->post('OCCUPATION'),
			   'MARITAL' => $this->input->post('MARITAL'),
			   'HEIGHT' => $this->input->post('HEIGHT'),
			   'WEIGHT' => $this->input->post('WEIGHT'),
			   'BMI' => $this->input->post('BMI'),
			   'ADDRESS' => $this->input->post('ADDRESS'),
			   'AMENORRHOEA' => $this->input->post('AMENORRHOEA'),
			   'VOMITTING' => $this->input->post('VOMITTING'),
			   'MUSCULOSKELETAL' => $this->input->post('MUSCULOSKELETAL'),
			   'CRAMPS' => $this->input->post('CRAMPS'),
			   'MICTURATION' => $this->input->post('MICTURATION'),
			   'HEADACHE' => $this->input->post('HEADACHE'),
			   'SWELLING' => $this->input->post('SWELLING'),
			   'MALAISE' => $this->input->post('MALAISE'),
			   'PRESENT' => $this->input->post('PRESENT'),
			   'GPAL' => $this->input->post('GPAL'),
			   'APPETITE' => $this->input->post('APPETITE'),
			   'LOSS_WEIGHT' => $this->input->post('LOSS_WEIGHT'),
			   'HEART' => $this->input->post('HEART'),
			   'CONSTIPATION' => $this->input->post('CONSTIPATION'),
			   'INCONTINENCE' => $this->input->post('INCONTINENCE'),
			   'PROLAPSE' => $this->input->post('PROLAPSE'),
			   'POLYURIA' => $this->input->post('POLYURIA'),
			   'MICTURITION' => $this->input->post('MICTURITION'),
			   'CARDIOVASCULAR' => $this->input->post('CARDIOVASCULAR'),
			   'TB' => $this->input->post('TB'),
			   'SEIZURES' => $this->input->post('SEIZURES'),
			   'BP' => $this->input->post('BP'),
			   'ANAEMIA' => $this->input->post('ANAEMIA'),
			   'MUSCULOSKELETAL_his' => $this->input->post('MUSCULOSKELETAL_his'),
			   'INCOMPATIBILITY' => $this->input->post('INCOMPATIBILITY'),
			   'NO_DELIVERIES1' => $this->input->post('NO_DELIVERIES1'),
			   'MODE_DELIVERY1' => $this->input->post('MODE_DELIVERY1'),
			   'COMPLICATIONS1' => $this->input->post('COMPLICATIONS1'),
			   '1ST_LABOUR1' => $this->input->post('1ST_LABOUR1'),
			   '2ND_LABOUR1' => $this->input->post('2ND_LABOUR1'),
			   'SEX1' => $this->input->post('SEX1'),
			   'BABY_WEIGHT1' => $this->input->post('BABY_WEIGHT1'),
			   'NO_DELIVERIES2' => $this->input->post('NO_DELIVERIES2'),
			   'MODE_DELIVERY2' => $this->input->post('MODE_DELIVERY2'),
			   'COMPLICATIONS2' => $this->input->post('COMPLICATIONS2'),
			   '1ST_LABOUR2' => $this->input->post('1ST_LABOUR2'),
			   '2ND_LABOUR2' => $this->input->post('2ND_LABOUR2'),
			   'SEX2' => $this->input->post('SEX2'),
			   'BABY_WEIGHT2' => $this->input->post('BABY_WEIGHT2'),
			   'NO_DELIVERIES3' => $this->input->post('NO_DELIVERIES3'),
			   'MODE_DELIVERY3' => $this->input->post('MODE_DELIVERY3'),
			   'COMPLICATIONS3' => $this->input->post('COMPLICATIONS3'),
			   '1ST_LABOUR3' => $this->input->post('1ST_LABOUR3'),
			   '2ND_LABOUR3' => $this->input->post('2ND_LABOUR3'),
			   'SEX3' => $this->input->post('SEX3'),
			   'BABY_WEIGHT3' => $this->input->post('BABY_WEIGHT3'),
			   'NO_DELIVERIES4' => $this->input->post('NO_DELIVERIES4'),
			   'MODE_DELIVERY4' => $this->input->post('MODE_DELIVERY4'),
			   'COMPLICATIONS4' => $this->input->post('COMPLICATIONS4'),
			   '1ST_LABOUR4' => $this->input->post('1ST_LABOUR4'),
			   '2ND_LABOUR4' => $this->input->post('2ND_LABOUR4'),
			   'SEX4' => $this->input->post('SEX4'),
			   'BABY_WEIGHT4' => $this->input->post('BABY_WEIGHT4'),
			   'CARDIAC' => $this->input->post('CARDIAC'),
			   'HYPOTHYROIDISM' => $this->input->post('HYPOTHYROIDISM'),
			   'IMMUNE' => $this->input->post('IMMUNE'),
			   'BRONCHIAL' => $this->input->post('BRONCHIAL'),
			   'DRUG' => $this->input->post('DRUG'),
			   'SURGICAL' => $this->input->post('SURGICAL'),
			   'FAMILY' => $this->input->post('FAMILY'),
			   'TWINS' => $this->input->post('TWINS'),
			   'CONGENITAL' => $this->input->post('CONGENITAL'),
			   'DIABETES' => $this->input->post('DIABETES'),
			   'PERSONAL' => $this->input->post('PERSONAL'),
			   'SMOKING' => $this->input->post('SMOKING'),
			   'SLEEPING' => $this->input->post('SLEEPING'),
			   'ECONOMIC' => $this->input->post('ECONOMIC'),
			   'OCCUPATION' => $this->input->post('OCCUPATION'),
			   'OUTCOME' => $this->input->post('OUTCOME'),
			   'LIFESTYLE' => $this->input->post('LIFESTYLE'),
			   'PSYCHOLOGICAL' => $this->input->post('PSYCHOLOGICAL'),
			   'EMOTIONAL' => $this->input->post('EMOTIONAL'),
			   'ANXIETY' => $this->input->post('ANXIETY'),
			   'ONSET' => $this->input->post('ONSET'),
			   'DURATION' => $this->input->post('DURATION'),
			   'TYPE_PAIN' => $this->input->post('TYPE_PAIN'),
			   'LOCATION' => $this->input->post('LOCATION'),
			   'AGGRAVATING' => $this->input->post('AGGRAVATING'),
			   'RELIEVING' => $this->input->post('RELIEVING'),
			   'NIGHT' => $this->input->post('NIGHT'),
			   'IRRITABILITY' => $this->input->post('IRRITABILITY'),
			   'VAS' => $this->input->post('VAS'),
			   'OBSERVATION' => $this->input->post('OBSERVATION'),
			   'GENERAL' => $this->input->post('GENERAL'),
			   'EDEMA' => $this->input->post('EDEMA'),
			   'EDEMA1' => $this->input->post('EDEMA1'),
			   'TROPHIC' => $this->input->post('TROPHIC'),
			   'CHOLASMA' => $this->input->post('CHOLASMA'),
			   'LINEA' => $this->input->post('LINEA'),
			   'STRAIE' => $this->input->post('STRAIE'),
			   'NAIL' => $this->input->post('NAIL'),
			   'CONJUCTIVA' => $this->input->post('CONJUCTIVA'),
			   'POSTURE' => $this->input->post('POSTURE'),
			   'ANTERIOR' => $this->input->post('ANTERIOR'),
			   'POSTERIOR' => $this->input->post('POSTERIOR'),
			   'LATERAL' => $this->input->post('LATERAL'),
			   'GAIT' => $this->input->post('GAIT'),
			   'TENDERNESS' => $this->input->post('TENDERNESS'),
			   'TEMPERATURE' => $this->input->post('TEMPERATURE'),
			   'SWELLING' => $this->input->post('SWELLING'),
			   'VITAL' => $this->input->post('VITAL'),
			   'BP1' => $this->input->post('BP1'),
			   'RESPIRATORY' => $this->input->post('RESPIRATORY'),
			   'ABDOMINAL' => $this->input->post('ABDOMINAL'),
			   'MOTION' => $this->input->post('MOTION'),
			   'EDEMA' => $this->input->post('EDEMA'),
			   'GIRTH' => $this->input->post('GIRTH'),
			   'VOLUMETRIC' => $this->input->post('VOLUMETRIC'),
			   'MANUAL' => $this->input->post('MANUAL'),
			   'DTR' => $this->input->post('DTR'),
			   'DIASTASIS' => $this->input->post('DIASTASIS'),
			   'BREAST' => $this->input->post('BREAST'),
			   'SIZE' => $this->input->post('SIZE'),
			   'NIPPLE' => $this->input->post('NIPPLE'),
			   'AREOLA' => $this->input->post('AREOLA'),
			   'VARICOSE' => $this->input->post('VARICOSE'),
			   'INCONTINENCE' => $this->input->post('INCONTINENCE'),
			   'EXERCISE' => $this->input->post('EXERCISE'),
			   'WALK' => $this->input->post('WALK'),
			   'STEP' => $this->input->post('STEP'),
			   'SPECIAL' => $this->input->post('SPECIAL'),
			   'FUNCTIONAL' => $this->input->post('FUNCTIONAL'),
			   'INVESTIGATIONS' => $this->input->post('INVESTIGATIONS'),
			   'LIE' => $this->input->post('LIE'),
			   'OCCUPATION1' => $this->input->post('LIE'),
			   'LOSS_APPETITE' => $this->input->post('LIE'),
			   'PULSE' => $this->input->post('LIE'),
			   'MEMBERS' => $this->input->post('LIE'),
			   'patient_id' => $this->input->post('patient_id'),
		       'INCONTINENCE1' => $this->input->post('INCONTINENCE1'),
			   'SWELLING1'=>$this->input->post('SWELLING1'),
			);
			$this->db->insert('tbl_antenatal',$data); 
	  }
	   public function antenatal_assessment_info($val,$patient_id) {
		  $this->db->where('assess_date',date('Y-m-d',strtotime($val)));
		  $this->db->where('patient_id',$patient_id);
		  $this->db->select('assess_id')->from('tbl_antenatal');
		  $res = $this->db->get();
		  if($res->result_array() != false){
			  $id = $res->row()->assess_id;
		  } else {
			 $id = 0; 
		  }
		  return $id;
	  }
	  public function update_antenatal() {
		  $data1=array(
		    'marital_status'=> $this->input->post('MARITAL'),
		    'occupation'=> $this->input->post('OCCUPATION'),
		    'height'=> $this->input->post('HEIGHT'),
		    'weight'=> $this->input->post('WEIGHT'),
		    'bmi'=> $this->input->post('BMI'),
		    'age'=> $this->input->post('AGE'),
		    'address_line1'=> $this->input->post('ADDRESS'),
		  );
		  $this->db->where('patient_id',$this->input->post('patient_id'));
		  $this->db->update('tbl_patient_info',$data1);
		  
		  $this->db->where('patient_id',$this->input->post('patient_id'));
		   $this->db->where('date',date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))));
		   $this->db->limit(1);
		   $this->db->select('img_name,code')->from('tbl_ass_body_chart');
		   $this->db->order_by('img_id','DESC');
		   $res = $this->db->get();
		   if($res->result_array() != false){
		     $image = 'https://www.physioplustech.in/wpaintone/test/uploads/'.$res->row()->img_name;
			 $code = $res->row()->code;
           } else {
			   $image = '';
			   $code = '';
		   }
		   
		   
		  $dat = str_replace('/','-',$this->input->post('assess_date'));
		    $data = array(
		  	   'NAME' => $this->input->post('NAME'),
			   'LMP' => $this->input->post('LMP'),
			   'AGE' => $this->input->post('AGE'),
			   'EDD' => $this->input->post('EDD'),
			   'chart' => $image,
			   'code' => $code,
			   'AMENORRHOEA' => $this->input->post('AMENORRHOEA'),
			   'VOMITTING' => $this->input->post('VOMITTING'),
			   'MUSCULOSKELETAL' => $this->input->post('MUSCULOSKELETAL'),
			   'CRAMPS' => $this->input->post('CRAMPS'),
			   'MICTURATION' => $this->input->post('MICTURATION'),
			   'HEADACHE' => $this->input->post('HEADACHE'),
			   'SWELLING' => $this->input->post('SWELLING'),
			   'MALAISE' => $this->input->post('MALAISE'),
			   'PRESENT' => $this->input->post('PRESENT'),
			   'GPAL' => $this->input->post('GPAL'),
			   'APPETITE' => $this->input->post('APPETITE'),
			   'LOSS_WEIGHT' => $this->input->post('LOSS_WEIGHT'),
			   'HEART' => $this->input->post('HEART'),
			   'CONSTIPATION' => $this->input->post('CONSTIPATION'),
			   'INCONTINENCE' => $this->input->post('INCONTINENCE'),
			   'PROLAPSE' => $this->input->post('PROLAPSE'),
			   'POLYURIA' => $this->input->post('POLYURIA'),
			   'MICTURITION' => $this->input->post('MICTURITION'),
			   'CARDIOVASCULAR' => $this->input->post('CARDIOVASCULAR'),
			   'TB' => $this->input->post('TB'),
			   'SEIZURES' => $this->input->post('SEIZURES'),
			   'BP' => $this->input->post('BP'),
			   'ANAEMIA' => $this->input->post('ANAEMIA'),
			   'MUSCULOSKELETAL_his' => $this->input->post('MUSCULOSKELETAL_his'),
			   'INCOMPATIBILITY' => $this->input->post('INCOMPATIBILITY'),
			   'NO_DELIVERIES1' => $this->input->post('NO_DELIVERIES1'),
			   'MODE_DELIVERY1' => $this->input->post('MODE_DELIVERY1'),
			   'COMPLICATIONS1' => $this->input->post('COMPLICATIONS1'),
			   '1ST_LABOUR1' => $this->input->post('1ST_LABOUR1'),
			   '2ND_LABOUR1' => $this->input->post('2ND_LABOUR1'),
			   'SEX1' => $this->input->post('SEX1'),
			   'BABY_WEIGHT1' => $this->input->post('BABY_WEIGHT1'),
			   'NO_DELIVERIES2' => $this->input->post('NO_DELIVERIES2'),
			   'MODE_DELIVERY2' => $this->input->post('MODE_DELIVERY2'),
			   'COMPLICATIONS2' => $this->input->post('COMPLICATIONS2'),
			   '1ST_LABOUR2' => $this->input->post('1ST_LABOUR2'),
			   '2ND_LABOUR2' => $this->input->post('2ND_LABOUR2'),
			   'SEX2' => $this->input->post('SEX2'),
			   'BABY_WEIGHT2' => $this->input->post('BABY_WEIGHT2'),
			   'NO_DELIVERIES3' => $this->input->post('NO_DELIVERIES3'),
			   'MODE_DELIVERY3' => $this->input->post('MODE_DELIVERY3'),
			   'COMPLICATIONS3' => $this->input->post('COMPLICATIONS3'),
			   '1ST_LABOUR3' => $this->input->post('1ST_LABOUR3'),
			   '2ND_LABOUR3' => $this->input->post('2ND_LABOUR3'),
			   'SEX3' => $this->input->post('SEX3'),
			   'BABY_WEIGHT3' => $this->input->post('BABY_WEIGHT3'),
			   'NO_DELIVERIES4' => $this->input->post('NO_DELIVERIES4'),
			   'MODE_DELIVERY4' => $this->input->post('MODE_DELIVERY4'),
			   'COMPLICATIONS4' => $this->input->post('COMPLICATIONS4'),
			   '1ST_LABOUR4' => $this->input->post('1ST_LABOUR4'),
			   '2ND_LABOUR4' => $this->input->post('2ND_LABOUR4'),
			   'SEX4' => $this->input->post('SEX4'),
			   'BABY_WEIGHT4' => $this->input->post('BABY_WEIGHT4'),
			   'CARDIAC' => $this->input->post('CARDIAC'),
			   'HYPOTHYROIDISM' => $this->input->post('HYPOTHYROIDISM'),
			   'IMMUNE' => $this->input->post('IMMUNE'),
			   'BRONCHIAL' => $this->input->post('BRONCHIAL'),
			   'DRUG' => $this->input->post('DRUG'),
			   'SURGICAL' => $this->input->post('SURGICAL'),
			   'FAMILY' => $this->input->post('FAMILY'),
			   'TWINS' => $this->input->post('TWINS'),
			   'CONGENITAL' => $this->input->post('CONGENITAL'),
			   'DIABETES' => $this->input->post('DIABETES'),
			   'PERSONAL' => $this->input->post('PERSONAL'),
			   'SMOKING' => $this->input->post('SMOKING'),
			   'SLEEPING' => $this->input->post('SLEEPING'),
			   'ECONOMIC' => $this->input->post('ECONOMIC'),
			   'OCCUPATION' => $this->input->post('OCCUPATION'),
			   'OUTCOME' => $this->input->post('OUTCOME'),
			   'LIFESTYLE' => $this->input->post('LIFESTYLE'),
			   'PSYCHOLOGICAL' => $this->input->post('PSYCHOLOGICAL'),
			   'EMOTIONAL' => $this->input->post('EMOTIONAL'),
			   'ANXIETY' => $this->input->post('ANXIETY'),
			   'ONSET' => $this->input->post('ONSET'),
			   'DURATION' => $this->input->post('DURATION'),
			   'TYPE_PAIN' => $this->input->post('TYPE_PAIN'),
			   'LOCATION' => $this->input->post('LOCATION'),
			   'AGGRAVATING' => $this->input->post('AGGRAVATING'),
			   'RELIEVING' => $this->input->post('RELIEVING'),
			   'NIGHT' => $this->input->post('NIGHT'),
			   'IRRITABILITY' => $this->input->post('IRRITABILITY'),
			   'VAS' => $this->input->post('VAS'),
			   'OBSERVATION' => $this->input->post('OBSERVATION'),
			   'GENERAL' => $this->input->post('GENERAL'),
			   'EDEMA' => $this->input->post('EDEMA'),
			   'EDEMA1' => $this->input->post('EDEMA1'),
			   'TROPHIC' => $this->input->post('TROPHIC'),
			   'CHOLASMA' => $this->input->post('CHOLASMA'),
			   'LINEA' => $this->input->post('LINEA'),
			   'STRAIE' => $this->input->post('STRAIE'),
			   'NAIL' => $this->input->post('NAIL'),
			   'CONJUCTIVA' => $this->input->post('CONJUCTIVA'),
			   'POSTURE' => $this->input->post('POSTURE'),
			   'ANTERIOR' => $this->input->post('ANTERIOR'),
			   'POSTERIOR' => $this->input->post('POSTERIOR'),
			   'LATERAL' => $this->input->post('LATERAL'),
			   'GAIT' => $this->input->post('GAIT'),
			   'TENDERNESS' => $this->input->post('TENDERNESS'),
			   'TEMPERATURE' => $this->input->post('TEMPERATURE'),
			   'SWELLING' => $this->input->post('SWELLING'),
			   'VITAL' => $this->input->post('VITAL'),
			   'BP1' => $this->input->post('BP1'),
			   'RESPIRATORY' => $this->input->post('RESPIRATORY'),
			   'ABDOMINAL' => $this->input->post('ABDOMINAL'),
			   'MOTION' => $this->input->post('MOTION'),
			   'EDEMA' => $this->input->post('EDEMA'),
			   'GIRTH' => $this->input->post('GIRTH'),
			   'VOLUMETRIC' => $this->input->post('VOLUMETRIC'),
			   'MANUAL' => $this->input->post('MANUAL'),
			   'DTR' => $this->input->post('DTR'),
			   'DIASTASIS' => $this->input->post('DIASTASIS'),
			   'BREAST' => $this->input->post('BREAST'),
			   'SIZE' => $this->input->post('SIZE'),
			   'NIPPLE' => $this->input->post('NIPPLE'),
			   'AREOLA' => $this->input->post('AREOLA'),
			   'VARICOSE' => $this->input->post('VARICOSE'),
			   'INCONTINENCE' => $this->input->post('INCONTINENCE'),
			   'EXERCISE' => $this->input->post('EXERCISE'),
			   'WALK' => $this->input->post('WALK'),
			   'STEP' => $this->input->post('STEP'),
			   'SPECIAL' => $this->input->post('SPECIAL'),
			   'FUNCTIONAL' => $this->input->post('FUNCTIONAL'),
			   'INVESTIGATIONS' => $this->input->post('INVESTIGATIONS'),
			   'LIE' => $this->input->post('LIE'),
			   'OCCUPATION1' => $this->input->post('OCCUPATION1'),
			   'LOSS_APPETITE' => $this->input->post('LOSS_APPETITE'),
			   'PULSE' => $this->input->post('PULSE'),
			   'MEMBERS' => $this->input->post('MEMBERS'),
			   'INCONTINENCE1' => $this->input->post('INCONTINENCE1'),
			   'SWELLING1'=>$this->input->post('SWELLING1'),
			);
			 $this->db->where('assess_id',$this->input->post('assess_id'));
			$this->db->update('tbl_antenatal',$data);
	  }
	   public function edit_antenatal() {
		  $this->db->where('assess_id',$this->uri->segment(4));
		  $this->db->select('*')->from('tbl_antenatal');
		  $query=$this->db->get();
		  return ($query->num_rows() > 0) ? $query->row_array() : false;
	  }
	   public function add_neuro() {
		  $data  = array(
			   'assess_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))),
			   'Ip' => $this->input->post('Ip'),
			   'Op' => $this->input->post('Op'),
			   'Complaints' => $this->input->post('Complaints'),
			   'Onset' => $this->input->post('Present'),
			   'Mental' => $this->input->post('Mental'),
			   'Loc' => $this->input->post('Loc'),
			   'Convulsions' => $this->input->post('Convulsions'),
			   'Headache' => $this->input->post('Headache'),
			   'Sleep' => $this->input->post('Sleep'),
			   'Speech' => $this->input->post('Speech'),
			   'Sensation' => $this->input->post('Sensation'),
			   'Spincter' => $this->input->post('Spincter'),
			   'Past_illness' => $this->input->post('Past_illness'),
			   'Mode' => $this->input->post('Mode'),
			   'Medical' => $this->input->post('Medical'),
			   'Developmental' => $this->input->post('Developmental'),
			   'Birth' => $this->input->post('Birth'),
			   'Family' => $this->input->post('Family'),
			   'Personal' => $this->input->post('Personal'),
			   'Pain' => $this->input->post('Pain'),
			   'observation1' => $this->input->post('observation1'),
			   'Built' => $this->input->post('Built'),
			   'Posture' => $this->input->post('Posture'),
			   'Attitude' => $this->input->post('Attitude'),
			   'External' => $this->input->post('External'),
			   'Involuntary' => $this->input->post('Involuntary'),
			   'Ambulation' => $this->input->post('Ambulation'),
			   'Tropical' => $this->input->post('Tropical'),
			   'Breathing' => $this->input->post('Breathing'),
			   'observation' => $this->input->post('observation'),
			   'Muscle_tone' => $this->input->post('Muscle_tone'),
			   'Symmetry' => $this->input->post('Symmetry'),
			   'Skin_temperature' => $this->input->post('Skin_temperature'),
			   'Swelling' => $this->input->post('Swelling'),
			   'Tone' => $this->input->post('Tone'),
			   'Pain_site' => $this->input->post('Pain_site'),
			   'Trigger_point' => $this->input->post('Trigger_point'),
			   'Glascow' => $this->input->post('Glascow'),
			   'site' => $this->input->post('site'),
			   'Spontaneous' => $this->input->post('Spontaneous'),
			   'Speech1' => $this->input->post('Speech1'),
			   'Painful' => $this->input->post('Painful'),
			   'No_response1' => $this->input->post('No_response1'),
			   'Follows' => $this->input->post('Follows'),
			   'Localizes' => $this->input->post('Localizes'),
			   'Withdraws' => $this->input->post('Withdraws'),
			   'Abnormal' => $this->input->post('Abnormal'),
			   'Extensor' => $this->input->post('Extensor'),
			   'No_response2' => $this->input->post('No_response2'),
			   'Oriented' => $this->input->post('Oriented'),
			   'Confused' => $this->input->post('Confused'),
			   'Inappropriate' => $this->input->post('Inappropriate'),
			   'Incomprehensible' => $this->input->post('Incomprehensible'),
			   'No_response3' => $this->input->post('No_response3'),
			   'Memory' => $this->input->post('Memory'),
			   'Orientation' => $this->input->post('Orientation'),
			   'Attention' => $this->input->post('Attention'),
			   'Abstract' => $this->input->post('Abstract'),
			   'Judgment' => $this->input->post('Judgment'),
			   'Calculation' => $this->input->post('Calculation'),
			   'Olfactory' => $this->input->post('Olfactory'),
			   'Optic' => $this->input->post('Optic'),
			   'Occulomotor' => $this->input->post('Occulomotor'),
			   'Trochlear' => $this->input->post('Trochlear'),
			   'Abducens' => $this->input->post('Abducens'),
			   'Trigeminal' => $this->input->post('Trigeminal'),
			   'Facial' => $this->input->post('Facial'),
			   'Vestibule' => $this->input->post('Vestibule'),
			   'Glossopharyngeal' => $this->input->post('Glossopharyngeal'),
			   'Vagus' => $this->input->post('Vagus'),
			   'Spinal_accessory' => $this->input->post('Spinal_accessory'),
			   'Hypoglossal' => $this->input->post('Hypoglossal'),
			   'Superficial_touch' => $this->input->post('Superficial_touch'),
			   'Deep_joint' => $this->input->post('Deep_joint'),
			   'Cortical_tactile' => $this->input->post('Cortical_tactile'),
			   'Intact_normal' => $this->input->post('Intact_normal'),
			   'Decreased_delay' => $this->input->post('Decreased_delay'),
			   'Exaggerated' => $this->input->post('Exaggerated'),
			   'Inaccurate' => $this->input->post('Inaccurate'),
			   'Absent' => $this->input->post('Absent'),
			   'Inconsistent' => $this->input->post('Inconsistent'),
			   'M_power' => $this->input->post('M_power'),
			   'ROM' => $this->input->post('ROM'),
			   'LMN' => $this->input->post('LMN'),
			   'Deep_tendon' => $this->input->post('Deep_tendon'),
			   'Biceps' => $this->input->post('Biceps'),
			   'Triceps' => $this->input->post('Triceps'),
			   'Patellar' => $this->input->post('Patellar'),
			   'Hamstrings' => $this->input->post('Hamstrings'),
			   'Ankle' => $this->input->post('Ankle'),
			   'Superficial_reflexes' => $this->input->post('Superficial_reflexes'),
			   'Babinski' => $this->input->post('Babinski'),
			   'Involuntary1' => $this->input->post('Involuntary1'),
			   'Voluntary' => $this->input->post('Voluntary'),
			   'Co_ordination' => $this->input->post('Co_ordination'),
			   'Non_equilibrium' => $this->input->post('Non_equilibrium'),
			   'Finger_to_nose' => $this->input->post('Finger_to_nose'),
			   'Finger_to_therapist' => $this->input->post('Finger_to_therapist'),
			   'Finger_to_finger' => $this->input->post('Finger_to_finger'),
			   'Alternate_nose' => $this->input->post('Alternate_nose'),
			   'Finger_opposition' => $this->input->post('Finger_opposition'),
			   'Mass' => $this->input->post('Mass'),
			   'Pronation' => $this->input->post('Pronation'),
			   'Rebound' => $this->input->post('Rebound'),
			   'Tapping' => $this->input->post('Tapping'),
			   'Pointing' => $this->input->post('Pointing'),
			   'Alternate_heel' => $this->input->post('Alternate_heel'),
			   'Toe' => $this->input->post('Toe'),
			   'Heel_on_shin' => $this->input->post('Heel_on_shin'),
			   'Drawing' => $this->input->post('Drawing'),
			   'Fixation' => $this->input->post('Fixation'),
			   'Static' => $this->input->post('Static'),
			   'Dynamic' => $this->input->post('Dynamic'),
			   'Berg' => $this->input->post('Berg'),
			   'Functional_grades' => $this->input->post('Functional_grades'),
			   'R_type' => $this->input->post('R_type'),
			   'R_chest' => $this->input->post('R_chest'),
			   'R_ventilation' => $this->input->post('R_ventilation'),
			   'R_auscultation' => $this->input->post('R_auscultation'),
			   'R_percussion' => $this->input->post('R_percussion'),
			   'R_pft' => $this->input->post('R_pft'),
			   'Anterior' => $this->input->post('Anterior'),
			   'Posterior' => $this->input->post('Posterior'),
			   'Lateral' => $this->input->post('Lateral'),
			   'Qualitative' => $this->input->post('Qualitative'),
			   'Quantitative' => $this->input->post('Quantitative'),
			   'patient_id'=>$this->input->post('patient_id'),
			   'staff_id' => $this->input->post('staff_id'),
			   'Reflexes' => $this->input->post('Reflexes'),
			   'client_id'=>$this->session->userdata('client_id'),
			   'Reflex' => $this->input->post('Reflex'),
		
			);
			$this->db->insert('tbl_neuro',$data);
			return $this->db->insert_id();
	  }
	  public function update_neuro($neuro_id) {
		  $data  = array(
			   'assess_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))),
			   'Ip' => $this->input->post('Ip'),
			   'Op' => $this->input->post('Op'),
			   'Complaints' => $this->input->post('Complaints'),
			   'Onset' => $this->input->post('Present'),
			   'Mental' => $this->input->post('Mental'),
			   'Loc' => $this->input->post('Loc'),
			   'Convulsions' => $this->input->post('Convulsions'),
			   'Headache' => $this->input->post('Headache'),
			   'Sleep' => $this->input->post('Sleep'),
			   'Speech' => $this->input->post('Speech'),
			   'Sensation' => $this->input->post('Sensation'),
			   'Spincter' => $this->input->post('Spincter'),
			   'Past_illness' => $this->input->post('Past_illness'),
			   'Mode' => $this->input->post('Mode'),
			   'Medical' => $this->input->post('Medical'),
			   'Developmental' => $this->input->post('Developmental'),
			   'Birth' => $this->input->post('Birth'),
			   'Family' => $this->input->post('Family'),
			   'Personal' => $this->input->post('Personal'),
			   'Pain' => $this->input->post('Pain'),
			   'observation1' => $this->input->post('observation1'),
			   'Built' => $this->input->post('Built'),
			   'Posture' => $this->input->post('Posture'),
			   'Attitude' => $this->input->post('Attitude'),
			   'External' => $this->input->post('External'),
			   'Involuntary' => $this->input->post('Involuntary'),
			   'Ambulation' => $this->input->post('Ambulation'),
			   'Tropical' => $this->input->post('Tropical'),
			   'Breathing' => $this->input->post('Breathing'),
			   'observation' => $this->input->post('observation'),
			   'Muscle_tone' => $this->input->post('Muscle_tone'),
			   'Symmetry' => $this->input->post('Symmetry'),
			   'Skin_temperature' => $this->input->post('Skin_temperature'),
			   'Swelling' => $this->input->post('Swelling'),
			   'Tone' => $this->input->post('Tone'),
			   'Pain_site' => $this->input->post('Pain_site'),
			   'Trigger_point' => $this->input->post('Trigger_point'),
			   'Glascow' => $this->input->post('Glascow'),
			   'site' => $this->input->post('site'),
			   'Spontaneous' => $this->input->post('Spontaneous'),
			   'Speech1' => $this->input->post('Speech1'),
			   'Painful' => $this->input->post('Painful'),
			   'No_response1' => $this->input->post('No_response1'),
			   'Follows' => $this->input->post('Follows'),
			   'Localizes' => $this->input->post('Localizes'),
			   'Withdraws' => $this->input->post('Withdraws'),
			   'Abnormal' => $this->input->post('Abnormal'),
			   'Extensor' => $this->input->post('Extensor'),
			   'No_response2' => $this->input->post('No_response2'),
			   'Oriented' => $this->input->post('Oriented'),
			   'Confused' => $this->input->post('Confused'),
			   'Inappropriate' => $this->input->post('Inappropriate'),
			   'Incomprehensible' => $this->input->post('Incomprehensible'),
			   'No_response3' => $this->input->post('No_response3'),
			   'Memory' => $this->input->post('Memory'),
			   'Orientation' => $this->input->post('Orientation'),
			   'Attention' => $this->input->post('Attention'),
			   'Abstract' => $this->input->post('Abstract'),
			   'Judgment' => $this->input->post('Judgment'),
			   'Calculation' => $this->input->post('Calculation'),
			   'Olfactory' => $this->input->post('Olfactory'),
			   'Optic' => $this->input->post('Optic'),
			   'Occulomotor' => $this->input->post('Occulomotor'),
			   'Trochlear' => $this->input->post('Trochlear'),
			   'Abducens' => $this->input->post('Abducens'),
			   'Trigeminal' => $this->input->post('Trigeminal'),
			   'Facial' => $this->input->post('Facial'),
			   'Vestibule' => $this->input->post('Vestibule'),
			   'Glossopharyngeal' => $this->input->post('Glossopharyngeal'),
			   'Vagus' => $this->input->post('Vagus'),
			   'Spinal_accessory' => $this->input->post('Spinal_accessory'),
			   'Hypoglossal' => $this->input->post('Hypoglossal'),
			   'Superficial_touch' => $this->input->post('Superficial_touch'),
			   'Deep_joint' => $this->input->post('Deep_joint'),
			   'Cortical_tactile' => $this->input->post('Cortical_tactile'),
			   'Intact_normal' => $this->input->post('Intact_normal'),
			   'Decreased_delay' => $this->input->post('Decreased_delay'),
			   'Exaggerated' => $this->input->post('Exaggerated'),
			   'Inaccurate' => $this->input->post('Inaccurate'),
			   'Absent' => $this->input->post('Absent'),
			   'Inconsistent' => $this->input->post('Inconsistent'),
			   'M_power' => $this->input->post('M_power'),
			   'ROM' => $this->input->post('ROM'),
			   'LMN' => $this->input->post('LMN'),
			   'Reflexes' => $this->input->post('Reflexes'),
			   'Deep_tendon' => $this->input->post('Deep_tendon'),
			   'Biceps' => $this->input->post('Biceps'),
			   'Triceps' => $this->input->post('Triceps'),
			   'Patellar' => $this->input->post('Patellar'),
			   'Hamstrings' => $this->input->post('Hamstrings'),
			   'Ankle' => $this->input->post('Ankle'),
			   'Superficial_reflexes' => $this->input->post('Superficial_reflexes'),
			   'Babinski' => $this->input->post('Babinski'),
			   'Involuntary1' => $this->input->post('Involuntary1'),
			   'Voluntary' => $this->input->post('Voluntary'),
			   'Co_ordination' => $this->input->post('Co_ordination'),
			   'Non_equilibrium' => $this->input->post('Non_equilibrium'),
			   'Finger_to_nose' => $this->input->post('Finger_to_nose'),
			   'Finger_to_therapist' => $this->input->post('Finger_to_therapist'),
			   'Finger_to_finger' => $this->input->post('Finger_to_finger'),
			   'Alternate_nose' => $this->input->post('Alternate_nose'),
			   'Finger_opposition' => $this->input->post('Finger_opposition'),
			   'Mass' => $this->input->post('Mass'),
			   'Pronation' => $this->input->post('Pronation'),
			   'Rebound' => $this->input->post('Rebound'),
			   'Tapping' => $this->input->post('Tapping'),
			   'Pointing' => $this->input->post('Pointing'),
			   'Alternate_heel' => $this->input->post('Alternate_heel'),
			   'Toe' => $this->input->post('Toe'),
			   'Heel_on_shin' => $this->input->post('Heel_on_shin'),
			   'Drawing' => $this->input->post('Drawing'),
			   'Fixation' => $this->input->post('Fixation'),
			   'Static' => $this->input->post('Static'),
			   'Dynamic' => $this->input->post('Dynamic'),
			   'Berg' => $this->input->post('Berg'),
			   'Functional_grades' => $this->input->post('Functional_grades'),
			   'R_type' => $this->input->post('R_type'),
			   'R_chest' => $this->input->post('R_chest'),
			   'R_ventilation' => $this->input->post('R_ventilation'),
			   'R_auscultation' => $this->input->post('R_auscultation'),
			   'R_percussion' => $this->input->post('R_percussion'),
			   'R_pft' => $this->input->post('R_pft'),
			   'Anterior' => $this->input->post('Anterior'),
			   'Posterior' => $this->input->post('Posterior'),
			   'Lateral' => $this->input->post('Lateral'),
			   'Qualitative' => $this->input->post('Qualitative'),
			   'Quantitative' => $this->input->post('Quantitative'),
			   'patient_id'=>$this->input->post('patient_id'),
			   'staff_id' => $this->input->post('staff_id'),
			   'client_id'=>$this->session->userdata('client_id'),
			   'Reflex' => $this->input->post('Reflex'),
		
			);
			$where = array('neuro_id' => $neuro_id);
			$this->db->where($where);
			$this->db->update('tbl_neuro',$data);
			return $neuro_id;
			
	  }
	  public function edit_neuro($assess_id) {
		  $this->db->where('neuro_id',$assess_id);
		  $this->db->select('*')->from('tbl_neuro');
		  $query=$this->db->get();
		  return ($query->num_rows() > 0) ? $query->row_array() : false;
	  }
	  public function neuro_assessment_info($val,$patient_id) {
	      $this->db->where('assess_date',date('Y-m-d',strtotime($val)));
		  $this->db->where('patient_id',$patient_id);
		  $this->db->select('neuro_id')->from('tbl_neuro');
		  $res = $this->db->get();
		  if($res->result_array() != false){
			  $id = $res->row()->neuro_id;
		  } else {
			 $id = 0; 
		  }
		  return $id;
	  }
	  public function add_paediatric() {
		  $data1=array(
		    'dob'=> $this->input->post('dob'),
		    'age'=> $this->input->post('age'),
		    'address_line1'=> $this->input->post('address'),
		  );
		  $this->db->where('patient_id',$this->input->post('patient_id'));
		  $this->db->update('tbl_patient_info',$data1);
		
		  $data = array(
			   "assess_date"=> date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))),
			   "b_weight"=>$this->input->post('b_weight'),
			   "circumference"=>$this->input->post('circumference'),
			   "uhid"=>$this->input->post('uhid'),
			   "op"=>$this->input->post('op'),
			   "complaints"=>$this->input->post('complaints'),
			   "prenatal"=>$this->input->post('prenatal'),
			   "natal"=>$this->input->post('natal'),
			   "postnatal"=>$this->input->post('postnatal'),
			   "family"=>$this->input->post('family'),
			   "supine"=>$this->input->post('supine'),
			   "stone"=>$this->input->post('stone'),
			   "sitting"=>$this->input->post('sitting'),
			   "milestone"=>$this->input->post('milestone'),
			   "follow"=>$this->input->post('follow'),
			   "head_holding"=>$this->input->post('head_holding'),
			   "rolling_over"=>$this->input->post('rolling_over'),
			   "sitwith"=>$this->input->post('sitwith'),
			   "sittingwith"=>$this->input->post('sittingwith'),
			   "crawing"=>$this->input->post('crawing'),
			   "stand"=>$this->input->post('stand'),
			   "walkwith"=>$this->input->post('walkwith'),
			   "walkwithout"=>$this->input->post('walkwithout'),
			   "suck"=>$this->input->post('suck'),
			   "root"=>$this->input->post('root'),
			   "swallowing"=>$this->input->post('swallowing'),
			   "u_limb"=>$this->input->post('u_limb'),
			   "sucking1"=>$this->input->post('sucking1'),
			   "sucking2"=>$this->input->post('sucking2'),
			   "rooting1"=>$this->input->post('rooting1'),
			   "rooting2"=>$this->input->post('rooting2'),
			   "grasp1"=>$this->input->post('grasp1'),
			   "grasp2"=>$this->input->post('grasp2'),
			   "foot1"=>$this->input->post('foot1'),
			   "foot2"=>$this->input->post('foot2'),
			   "remains1"=>$this->input->post('remains1'),
			   "remains2"=>$this->input->post('remains2'),
			   "startle1"=>$this->input->post('startle1'),
			   "startle2"=>$this->input->post('startle2'),
			   "hamd1"=>$this->input->post('hamd1'),
			   "hamd2"=>$this->input->post('hamd2'),
			   "flexor1"=>$this->input->post('flexor1'),
			   "flexor2"=>$this->input->post('flexor2'),
			   "extensor1"=>$this->input->post('extensor1'),
			   "extensor2"=>$this->input->post('extensor2'),
			   "cross1"=>$this->input->post('cross1'),
			   "cross2"=>$this->input->post('cross2'),
			   "pathological1"=>$this->input->post('pathological1'),
			   "pathological2"=>$this->input->post('pathological2'),
			   "rare1"=>$this->input->post('rare1'),
			   "rare2"=>$this->input->post('rare2'),
			   "supine1"=>$this->input->post('supine1'),
			   "supine2"=>$this->input->post('supine2'),
			   "tonic1"=>$this->input->post('tonic1'),
			   "tonic2"=>$this->input->post('tonic2'),
			   "positive1"=>$this->input->post('positive1'),
			   "positive2"=>$this->input->post('positive2'),
			   "negative1"=>$this->input->post('negative1'),
			   "negative2"=>$this->input->post('negative2'),
			   "optical1"=>$this->input->post('optical1'),
			   "optical2"=>$this->input->post('optical2'),
			   "labrythine1"=>$this->input->post('labrythine1'),
			   "labrythine2"=>$this->input->post('labrythine2'),
			   "labrythine3"=>$this->input->post('labrythine3'),
			   "n_righting1"=>$this->input->post('n_righting1'),
			   "n_righting2"=>$this->input->post('n_righting2'),
			   "atnr1"=>$this->input->post('atnr1'),
			   "atnr2"=>$this->input->post('atnr2'),
			   "rising1"=>$this->input->post('rising1'),
			   "rising2"=>$this->input->post('rising2'),
			   "b_righting1"=>$this->input->post('b_righting1'),
			   "b_righting2"=>$this->input->post('b_righting2'),
			   "amphibian1"=>$this->input->post('amphibian1'),
			   "amphibian2"=>$this->input->post('amphibian2'),
			   "rotation1"=>$this->input->post('rotation1'),
			   "rotation2"=>$this->input->post('rotation2'),
			   "Supine_prone1"=>$this->input->post('Supine_prone1'),
			   "Supine_prone2"=>$this->input->post('Supine_prone2'),
			   "kneeling1"=>$this->input->post('kneeling1'),
			   "kneeling2"=>$this->input->post('kneeling2'),
			   "sitting1"=>$this->input->post('sitting1'),
			   "sitting2"=>$this->input->post('sitting2'),
			   "K_standing1"=>$this->input->post('K_standing1'),
			   "K_standing2"=>$this->input->post('K_standing2'),
			   "standing1"=>$this->input->post('standing1'),
			   "standing2"=>$this->input->post('standing2'),
			   "s_reaction1"=>$this->input->post('s_reaction1'),
			   "s_reaction2"=>$this->input->post('s_reaction2'),
			   "s_fall1"=>$this->input->post('s_fall1'),
			   "s_fall2"=>$this->input->post('s_fall2'),
			   "h_cortical"=>$this->input->post('h_cortical'),
			   "examiner"=>$this->input->post('examiner'),
			   "surroundings"=>$this->input->post('surroundings'),
			   "activity"=>$this->input->post('activity'),
			   "Speech"=>$this->input->post('Speech'),
			   "Vision"=>$this->input->post('Vision'),
			   "Hearing"=>$this->input->post('Hearing'),
			   "function"=>$this->input->post('function'),
			   "Orientation"=>$this->input->post('Orientation'),
			   "Handedness"=>$this->input->post('Handedness'),
			   "Head"=>$this->input->post('Head'),
			   "Chest"=>$this->input->post('Chest'),
			   "Height"=>$this->input->post('Height'),
			   "Weight"=>$this->input->post('Weight'),
			   "Biceps"=>$this->input->post('Biceps'),
			   "Triceps"=>$this->input->post('Triceps'),
			   "Knee"=>$this->input->post('Knee'),
			   "Ankle"=>$this->input->post('Ankle'),
			   "Abdomen"=>$this->input->post('Abdomen'),
			   "breathing"=>$this->input->post('breathing'),
			   "Endurance"=>$this->input->post('Endurance'),
			   "Superficial"=>$this->input->post('Superficial'),
			   "Deep"=>$this->input->post('Deep'),
			   "cortical"=>$this->input->post('cortical'),
			   "tone"=>$this->input->post('tone'),
			   "power"=>$this->input->post('power'),
			   "Arom"=>$this->input->post('Arom'),
			   "Prom"=>$this->input->post('Prom'),
			   "Deformities"=>$this->input->post('Deformities'),
			   "true1"=>$this->input->post('true1'),
			   "true2"=>$this->input->post('true2'),
			   "Apparent1"=>$this->input->post('Apparent1'),
			   "Apparent2"=>$this->input->post('Apparent2'),
			   "thigh1"=>$this->input->post('thigh1'),
			   "thigh2"=>$this->input->post('thigh2'),
			   "calf1"=>$this->input->post('calf1'),
			   "calf2"=>$this->input->post('calf2'),
			   "arm1"=>$this->input->post('arm1'),
			   "arm2"=>$this->input->post('arm2'),
			   "forearm1"=>$this->input->post('forearm1'),
			   "forearm2"=>$this->input->post('forearm2'),
			   "Posture"=>$this->input->post('Posture'),
			   "Co-ordination"=>$this->input->post('Co-ordination'),
			   "Gait"=>$this->input->post('Gait'),
			   "bal_assessment"=>$this->input->post('bal_assessment'),
			   "sit_Static"=>$this->input->post('sit_Static'),
			   "sit_Dynamic"=>$this->input->post('sit_Dynamic'),
			   "stand_Static"=>$this->input->post('stand_Static'),
			   "stand_Balance"=>$this->input->post('stand_Balance'),
			   "Bladder"=>$this->input->post('Bladder'),
			   "Eating"=>$this->input->post('Eating'),
			   "Grooming"=>$this->input->post('Grooming'),
			   "Bathing"=>$this->input->post('Bathing'),
			   "Dressing-Upper"=>$this->input->post('Dressing-Upper'),
			   "Dressing-Lower"=>$this->input->post('Dressing-Lower'),
			   "Toileting"=>$this->input->post('Toileting'),
			   "Bladder_manage"=>$this->input->post('Bladder_manage'),
			   "Bowel"=>$this->input->post('Bowel'),
			   "Chair"=>$this->input->post('Chair'),
			   "Toilet"=>$this->input->post('Toilet'),
			   "Tub"=>$this->input->post('Tub'),
			   "Crawls"=>$this->input->post('Crawls'),
			   "stairs"=>$this->input->post('stairs'),
			   "comprehension"=>$this->input->post('comprehension'),
			   "expression"=>$this->input->post('expression'),
			   "social"=>$this->input->post('social'),
			   "pbm"=>$this->input->post('pbm'),
			   "memory"=>$this->input->post('memory'),
			   "medication"=>$this->input->post('medication'),
			   "investigation"=>$this->input->post('investigation'),
			   "impression"=>$this->input->post('impression'),
			   "diagnosis"=>$this->input->post('diagnosis'),
			   "pbm_list"=>$this->input->post('pbm_list'),
			   "goal"=>$this->input->post('goal'),
			   "short_term"=>$this->input->post('short_term'),
			   "long_term"=>$this->input->post('long_term'),
			   "created_by"=>$this->session->userdata('username'),
			   'patient_id' => $this->input->post('patient_id'),
		       'client_id' => $this->session->userdata('client_id'),
		       'staff_id' => $this->input->post('staff_id'),
	       	);
		$this->db->insert('tbl_paediatric',$data);
		return $this->db->insert_id();
	  }
	   public function update_paediatric($paediatric_id) {
		  $data1=array(
		    'dob'=> $this->input->post('dob'),
		    'age'=> $this->input->post('age'),
		    'address_line1'=> $this->input->post('address'),
		  );
		  $this->db->where('patient_id',$this->input->post('patient_id'));
		  $this->db->update('tbl_patient_info',$data1);
		  
		  $data = array(
			   "assess_date"=> date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))),
			   "b_weight"=>$this->input->post('b_weight'),
			   "circumference"=>$this->input->post('circumference'),
			   "uhid"=>$this->input->post('uhid'),
			   "op"=>$this->input->post('op'),
			   "complaints"=>$this->input->post('complaints'),
			   "prenatal"=>$this->input->post('prenatal'),
			   "natal"=>$this->input->post('natal'),
			   "postnatal"=>$this->input->post('postnatal'),
			   "family"=>$this->input->post('family'),
			   "supine"=>$this->input->post('supine'),
			   "stone"=>$this->input->post('stone'),
			   "sitting"=>$this->input->post('sitting'),
			   "milestone"=>$this->input->post('milestone'),
			   "follow"=>$this->input->post('follow'),
			   "head_holding"=>$this->input->post('head_holding'),
			   "rolling_over"=>$this->input->post('rolling_over'),
			   "sitwith"=>$this->input->post('sitwith'),
			   "sittingwith"=>$this->input->post('sittingwith'),
			   "crawing"=>$this->input->post('crawing'),
			   "stand"=>$this->input->post('stand'),
			   "walkwith"=>$this->input->post('walkwith'),
			   "walkwithout"=>$this->input->post('walkwithout'),
			   "suck"=>$this->input->post('suck'),
			   "root"=>$this->input->post('root'),
			   "swallowing"=>$this->input->post('swallowing'),
			   "u_limb"=>$this->input->post('u_limb'),
			   "sucking1"=>$this->input->post('sucking1'),
			   "sucking2"=>$this->input->post('sucking2'),
			   "rooting1"=>$this->input->post('rooting1'),
			   "rooting2"=>$this->input->post('rooting2'),
			   "grasp1"=>$this->input->post('grasp1'),
			   "grasp2"=>$this->input->post('grasp2'),
			   "foot1"=>$this->input->post('foot1'),
			   "foot2"=>$this->input->post('foot2'),
			   "remains1"=>$this->input->post('remains1'),
			   "remains2"=>$this->input->post('remains2'),
			   "startle1"=>$this->input->post('startle1'),
			   "startle2"=>$this->input->post('startle2'),
			   "hamd1"=>$this->input->post('hamd1'),
			   "hamd2"=>$this->input->post('hamd2'),
			   "flexor1"=>$this->input->post('flexor1'),
			   "flexor2"=>$this->input->post('flexor2'),
			   "extensor1"=>$this->input->post('extensor1'),
			   "extensor2"=>$this->input->post('extensor2'),
			   "cross1"=>$this->input->post('cross1'),
			   "cross2"=>$this->input->post('cross2'),
			   "pathological1"=>$this->input->post('pathological1'),
			   "pathological2"=>$this->input->post('pathological2'),
			   "rare1"=>$this->input->post('rare1'),
			   "rare2"=>$this->input->post('rare2'),
			   "supine1"=>$this->input->post('supine1'),
			   "supine2"=>$this->input->post('supine2'),
			   "tonic1"=>$this->input->post('tonic1'),
			   "tonic2"=>$this->input->post('tonic2'),
			   "positive1"=>$this->input->post('positive1'),
			   "positive2"=>$this->input->post('positive2'),
			   "negative1"=>$this->input->post('negative1'),
			   "negative2"=>$this->input->post('negative2'),
			   "optical1"=>$this->input->post('optical1'),
			   "optical2"=>$this->input->post('optical2'),
			   "labrythine1"=>$this->input->post('labrythine1'),
			   "labrythine2"=>$this->input->post('labrythine2'),
			   "labrythine3"=>$this->input->post('labrythine3'),
			   "n_righting1"=>$this->input->post('n_righting1'),
			   "n_righting2"=>$this->input->post('n_righting2'),
			   "atnr1"=>$this->input->post('atnr1'),
			   "atnr2"=>$this->input->post('atnr2'),
			   "rising1"=>$this->input->post('rising1'),
			   "rising2"=>$this->input->post('rising2'),
			   "b_righting1"=>$this->input->post('b_righting1'),
			   "b_righting2"=>$this->input->post('b_righting2'),
			   "amphibian1"=>$this->input->post('amphibian1'),
			   "amphibian2"=>$this->input->post('amphibian2'),
			   "rotation1"=>$this->input->post('rotation1'),
			   "rotation2"=>$this->input->post('rotation2'),
			   "Supine_prone1"=>$this->input->post('Supine_prone1'),
			   "Supine_prone2"=>$this->input->post('Supine_prone2'),
			   "kneeling1"=>$this->input->post('kneeling1'),
			   "kneeling2"=>$this->input->post('kneeling2'),
			   "sitting1"=>$this->input->post('sitting1'),
			   "sitting2"=>$this->input->post('sitting2'),
			   "K_standing1"=>$this->input->post('K_standing1'),
			   "K_standing2"=>$this->input->post('K_standing2'),
			   "standing1"=>$this->input->post('standing1'),
			   "standing2"=>$this->input->post('standing2'),
			   "s_reaction1"=>$this->input->post('s_reaction1'),
			   "s_reaction2"=>$this->input->post('s_reaction2'),
			   "s_fall1"=>$this->input->post('s_fall1'),
			   "s_fall2"=>$this->input->post('s_fall2'),
			   "h_cortical"=>$this->input->post('h_cortical'),
			   "examiner"=>$this->input->post('examiner'),
			   "surroundings"=>$this->input->post('surroundings'),
			   "activity"=>$this->input->post('activity'),
			   "Speech"=>$this->input->post('Speech'),
			   "Vision"=>$this->input->post('Vision'),
			   "Hearing"=>$this->input->post('Hearing'),
			   "function"=>$this->input->post('function'),
			   "Orientation"=>$this->input->post('Orientation'),
			   "Handedness"=>$this->input->post('Handedness'),
			   "Head"=>$this->input->post('Head'),
			   "Chest"=>$this->input->post('Chest'),
			   "Height"=>$this->input->post('Height'),
			   "Weight"=>$this->input->post('Weight'),
			   "Biceps"=>$this->input->post('Biceps'),
			   "Triceps"=>$this->input->post('Triceps'),
			   "Knee"=>$this->input->post('Knee'),
			   "Ankle"=>$this->input->post('Ankle'),
			   "Abdomen"=>$this->input->post('Abdomen'),
			   "breathing"=>$this->input->post('breathing'),
			   "Endurance"=>$this->input->post('Endurance'),
			   "Superficial"=>$this->input->post('Superficial'),
			   "Deep"=>$this->input->post('Deep'),
			   "cortical"=>$this->input->post('cortical'),
			   "tone"=>$this->input->post('tone'),
			   "power"=>$this->input->post('power'),
			   "Arom"=>$this->input->post('Arom'),
			   "Prom"=>$this->input->post('Prom'),
			   "Deformities"=>$this->input->post('Deformities'),
			   "true1"=>$this->input->post('true1'),
			   "true2"=>$this->input->post('true2'),
			   "Apparent1"=>$this->input->post('Apparent1'),
			   "Apparent2"=>$this->input->post('Apparent2'),
			   "thigh1"=>$this->input->post('thigh1'),
			   "thigh2"=>$this->input->post('thigh2'),
			   "calf1"=>$this->input->post('calf1'),
			   "calf2"=>$this->input->post('calf2'),
			   "arm1"=>$this->input->post('arm1'),
			   "arm2"=>$this->input->post('arm2'),
			   "forearm1"=>$this->input->post('forearm1'),
			   "forearm2"=>$this->input->post('forearm2'),
			   "Posture"=>$this->input->post('Posture'),
			   "Co-ordination"=>$this->input->post('Co-ordination'),
			   "Gait"=>$this->input->post('Gait'),
			   "bal_assessment"=>$this->input->post('bal_assessment'),
			   "sit_Static"=>$this->input->post('sit_Static'),
			   "sit_Dynamic"=>$this->input->post('sit_Dynamic'),
			   "stand_Static"=>$this->input->post('stand_Static'),
			   "stand_Balance"=>$this->input->post('stand_Balance'),
			   "Bladder"=>$this->input->post('Bladder'),
			   "Eating"=>$this->input->post('Eating'),
			   "Grooming"=>$this->input->post('Grooming'),
			   "Bathing"=>$this->input->post('Bathing'),
			   "Dressing-Upper"=>$this->input->post('Dressing-Upper'),
			   "Dressing-Lower"=>$this->input->post('Dressing-Lower'),
			   "Toileting"=>$this->input->post('Toileting'),
			   "Bladder_manage"=>$this->input->post('Bladder_manage'),
			   "Bowel"=>$this->input->post('Bowel'),
			   "Chair"=>$this->input->post('Chair'),
			   "Toilet"=>$this->input->post('Toilet'),
			   "Tub"=>$this->input->post('Tub'),
			   "Crawls"=>$this->input->post('Crawls'),
			   "stairs"=>$this->input->post('stairs'),
			   "comprehension"=>$this->input->post('comprehension'),
			   "expression"=>$this->input->post('expression'),
			   "social"=>$this->input->post('social'),
			   "pbm"=>$this->input->post('pbm'),
			   "memory"=>$this->input->post('memory'),
			   "medication"=>$this->input->post('medication'),
			   "investigation"=>$this->input->post('investigation'),
			   "impression"=>$this->input->post('impression'),
			   "diagnosis"=>$this->input->post('diagnosis'),
			   "pbm_list"=>$this->input->post('pbm_list'),
			   "goal"=>$this->input->post('goal'),
			   "short_term"=>$this->input->post('short_term'),
			   "long_term"=>$this->input->post('long_term'),
			   "created_by"=>$this->session->userdata('username'),
			 );
		$this->db->where('paediatric_id',$paediatric_id);
		$this->db->update('tbl_paediatric',$data);
		return $this->input->post('assess_id');
	  }
	  public function edit_paediatric($paediatric_id) {
		  $this->db->where('paediatric_id',$paediatric_id);
		  $this->db->select('*')->from('tbl_paediatric');
		  $query=$this->db->get();
		  return ($query->num_rows() > 0) ? $query->row_array() : false;
	  }
	  public function peadiatric_assessment_info($val,$patient_id) {
	      $this->db->where('assess_date',date('Y-m-d',strtotime($val)));
		  $this->db->where('patient_id',$patient_id);
		  $this->db->select('paediatric_id')->from('tbl_paediatric');
		  $res = $this->db->get();
		  if($res->result_array() != false){
			  $id = $res->row()->paediatric_id;
		  } else {
			 $id = 0; 
		  }
		  return $id;
	  }
         
         public function add_paediatric_GMFM_LR() {
		  
		 
		  $data = array(
			   'patient_id' => $this->input->post('patient_id'),
		       'client_id' => $this->session->userdata('client_id'),
			   "assess_date"=> date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))),
			   "LR1"=>$this->input->post('LR-1'),
			   "LR2"=>$this->input->post('LR-2'),
			   "LR3"=>$this->input->post('LR-3'),
			   "LR4"=>$this->input->post('LR-4'),
			   "LR5"=>$this->input->post('LR-5'),
			   "LR6"=>$this->input->post('LR-6'),
			   "LR7"=>$this->input->post('LR-7'),
			   "LR8"=>$this->input->post('LR-8'),
			   "LR9"=>$this->input->post('LR-9'),
			   "LR10"=>$this->input->post('LR-10'),
			   "LR11"=>$this->input->post('LR-11'),
			   "LR12"=>$this->input->post('LR-12'),
			   "LR13"=>$this->input->post('LR-13'),
			   "LR14"=>$this->input->post('LR-14'),
			   "LR15"=>$this->input->post('LR-15'),
			   "LR16"=>$this->input->post('LR-16'),
			   "LR17"=>$this->input->post('LR-17'),
			   'total'=>$this->input->post('dimensionA'),
			   'perDimA'=>$this->input->post('percentageA'),
			   'Evaluator'=>$this->input->post('evaluator'),
	       	);
		$this->db->insert('tbl_paediatric_gmfm_lr',$data);
		return $this->db->insert_id();
	  }
	  
	  public function add_paediatric_GMFM_SIT() {
		  
		 
		  $data = array(
			   'patient_id' => $this->input->post('patient_id'),
		       'client_id' => $this->session->userdata('client_id'),
			   "assess_date"=> date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))),
			   "SI18"=>$this->input->post('SI-18'),
			   "SI19"=>$this->input->post('SI-19'),
			   "SI20"=>$this->input->post('SI-20'),
			   "SI21"=>$this->input->post('SI-21'),
			   "SI22"=>$this->input->post('SI-22'),
			   "SI23"=>$this->input->post('SI-23'),
			   "SI24"=>$this->input->post('SI-24'),
			   "SI25"=>$this->input->post('SI-25'),
			   "SI26"=>$this->input->post('SI-26'),
			   "SI27"=>$this->input->post('SI-27'),
			   "SI28"=>$this->input->post('SI-28'),
			   "SI29"=>$this->input->post('SI-29'),
			   "SI30"=>$this->input->post('SI-30'),
			   "SI31"=>$this->input->post('SI-31'),
			   "SI32"=>$this->input->post('SI-32'),
			   "SI33"=>$this->input->post('SI-33'),
			   "SI34"=>$this->input->post('SI-34'),
			   "SI35"=>$this->input->post('SI-35'),
			   "SI36"=>$this->input->post('SI-36'),
			   "SI37"=>$this->input->post('SI-37'),
			   'totalDimB'=>$this->input->post('dimensionB'),
			   'perDimB '=>$this->input->post('percentageB'),
	       	);
		$this->db->insert('tbl_paediatric_gmfm_sit',$data);
		return $this->db->insert_id();
	  }
	  
	  public function add_paediatric_GMFM_CK() {
		  
		 
		  $data = array(
			   'patient_id' => $this->input->post('patient_id'),
		       'client_id' => $this->session->userdata('client_id'),
			   "assess_date"=> date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))),
			   "CK38"=>$this->input->post('CK-38'),
			   "CK39"=>$this->input->post('CK-39'),
			   "CK40"=>$this->input->post('CK-40'),
			   "CK41"=>$this->input->post('CK-41'),
			   "CK42"=>$this->input->post('CK-42'),
			   "CK43"=>$this->input->post('CK-43'),
			   "CK44"=>$this->input->post('CK-44'),
			   "CK45"=>$this->input->post('CK-45'),
			   "CK46"=>$this->input->post('CK-46'),
			   "CK47"=>$this->input->post('CK-47'),
			   "CK48"=>$this->input->post('CK-48'),
			   "CK49"=>$this->input->post('CK-49'),
			   "CK50"=>$this->input->post('CK-50'),
			   "CK51"=>$this->input->post('CK-51'),
			
			   'totalDimC'=>$this->input->post('dimensionC'),
			   'perDimC'=>$this->input->post('percentageC'),
	       	);
		$this->db->insert('tbl_paediatric_gmfm_ck',$data);
		return $this->db->insert_id();
	  }
	  
		public function add_paediatric_GMFM_STAND() {
		  
		 
		  $data = array(
			   'patient_id' => $this->input->post('patient_id'),
		       'client_id' => $this->session->userdata('client_id'),
			   "assess_date"=> date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))),
			   "ST52"=>$this->input->post('ST-52'),
			   "ST53"=>$this->input->post('ST-53'),
			   "ST54"=>$this->input->post('ST-54'),
			   "ST55"=>$this->input->post('ST-55'),
			   "ST56"=>$this->input->post('ST-56'),
			   "ST57"=>$this->input->post('ST-57'),
			   "ST58"=>$this->input->post('ST-58'),
			   "ST59"=>$this->input->post('ST-59'),
			   "ST60"=>$this->input->post('ST-60'),
			   "ST61"=>$this->input->post('ST-61'),
			   "ST62"=>$this->input->post('ST-62'),
			   "ST63"=>$this->input->post('ST-63'),
			   "ST64"=>$this->input->post('ST-64'),
			   'totalDimD'=>$this->input->post('dimensionD'),
			   'perDimD'=>$this->input->post('percentageD'),
	       	);
		$this->db->insert('tbl_paediatric_gmfm_stand',$data);
		return $this->db->insert_id();
	  }
	  public function add_paediatric_GMFM_WALK() {
		  
		 
		  $data = array(
			   'patient_id' => $this->input->post('patient_id'),
		       'client_id' => $this->session->userdata('client_id'),
			   "assess_date"=> date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))),
			   "WRJ65"=>$this->input->post('WRJ-65'),
			   "WRJ66"=>$this->input->post('WRJ-66'),
			   "WRJ67"=>$this->input->post('WRJ-67'),
			   "WRJ68"=>$this->input->post('WRJ-68'),
			   "WRJ69"=>$this->input->post('WRJ-69'),
			   "WRJ70"=>$this->input->post('WRJ-70'),
			   "WRJ71"=>$this->input->post('WRJ-71'),
			   "WRJ72"=>$this->input->post('WRJ-72'),
			   "WRJ73"=>$this->input->post('WRJ-73'),
			   "WRJ74"=>$this->input->post('WRJ-74'),
			   "WRJ75"=>$this->input->post('WRJ-75'),
			   "WRJ76"=>$this->input->post('WRJ-76'),
			   "WRJ77"=>$this->input->post('WRJ-77'),
			   "WRJ78"=>$this->input->post('WRJ-78'),
			   "WRJ79"=>$this->input->post('WRJ-79'),
			   "WRJ80"=>$this->input->post('WRJ-80'),
			   "WRJ81"=>$this->input->post('WRJ-81'),
			   "WRJ82"=>$this->input->post('WRJ-82'),
			   "WRJ83"=>$this->input->post('WRJ-83'),
			   "WRJ84"=>$this->input->post('WRJ-84'),
			   "WRJ85"=>$this->input->post('WRJ-85'),
			   "WRJ86"=>$this->input->post('WRJ-86'),
			   "WRJ87"=>$this->input->post('WRJ-87'),
			   "WRJ88"=>$this->input->post('WRJ-88'),
			   
			   
			   'totalDimE'=>$this->input->post('dimensionE'),
			   'perDimE '=>$this->input->post('percentageE'),
			   'gmfm '=>$this->input->post('gmfm'),
	       	);
		$this->db->insert('tbl_paediatric_gmfm_walk',$data);
		return $this->db->insert_id();
	  }

          public function edit_paediatricGMFM_LR($patient_id,$access_date) {
		  $this->db->where('patient_id',$patient_id);
		  $this->db->where('assess_date',$access_date);
		  $this->db->select('*')->from('tbl_paediatric_gmfm_lr');
		  $query=$this->db->get();
		  return ($query->num_rows() > 0) ? $query->row_array() : false;
	  }
	  
	  public function edit_paediatricGMFM_SIT($patient_id,$access_date) {
		  $this->db->where('patient_id',$patient_id);
		  $this->db->where('assess_date',$access_date);
		  $this->db->select('*')->from('tbl_paediatric_gmfm_sit');
		  $query=$this->db->get();
		  return ($query->num_rows() > 0) ? $query->row_array() : false;
	  }
	  public function edit_paediatricGMFM_CK($patient_id,$access_date) {
		  $this->db->where('patient_id',$patient_id);
		  $this->db->where('assess_date',$access_date);
		  $this->db->select('*')->from('tbl_paediatric_gmfm_ck');
		  $query=$this->db->get();
		  return ($query->num_rows() > 0) ? $query->row_array() : false;
	  }
	  public function edit_paediatricGMFM_STAND($patient_id,$access_date) {
		  $this->db->where('patient_id',$patient_id);
		  $this->db->where('assess_date',$access_date);
		  $this->db->select('*')->from('tbl_paediatric_gmfm_stand');
		  $query=$this->db->get();
		  return ($query->num_rows() > 0) ? $query->row_array() : false;
	  }
	  public function edit_paediatricGMFM_WALK($patient_id,$access_date) {
		  $this->db->where('patient_id',$patient_id);
		  $this->db->where('assess_date',$access_date);
		  $this->db->select('*')->from('tbl_paediatric_gmfm_walk');
		  $query=$this->db->get();
		  return ($query->num_rows() > 0) ? $query->row_array() : false;
	  }
	  
	  
	  public function update_paediatric_GMFM_LR($patient_id,$assess_id,$assess_date) {
		  
		 
		  $data = array(
			   'patient_id' => $this->input->post('patient_id'),
		       'client_id' => $this->session->userdata('client_id'),
			   "assess_date"=> date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))),
			   "LR1"=>$this->input->post('LR-1'),
			   "LR2"=>$this->input->post('LR-2'),
			   "LR3"=>$this->input->post('LR-3'),
			   "LR4"=>$this->input->post('LR-4'),
			   "LR5"=>$this->input->post('LR-5'),
			   "LR6"=>$this->input->post('LR-6'),
			   "LR7"=>$this->input->post('LR-7'),
			   "LR8"=>$this->input->post('LR-8'),
			   "LR9"=>$this->input->post('LR-9'),
			   "LR10"=>$this->input->post('LR-10'),
			   "LR11"=>$this->input->post('LR-11'),
			   "LR12"=>$this->input->post('LR-12'),
			   "LR13"=>$this->input->post('LR-13'),
			   "LR14"=>$this->input->post('LR-14'),
			   "LR15"=>$this->input->post('LR-15'),
			   "LR16"=>$this->input->post('LR-16'),
			   "LR17"=>$this->input->post('LR-17'),
			   'total'=>$this->input->post('dimensionA'),
			   'perDimA'=>$this->input->post('percentageA'),
			   'Evaluator'=>$this->input->post('evaluator'),
	       	);
			$this->db->where('patient_id',$patient_id);
		  $this->db->where('assess_date',$assess_date);
		$this->db->update('tbl_paediatric_gmfm_lr',$data);
		return $this->input->post('patient_id');
	  }
	  
	   public function update_paediatric_GMFM_SIT($patient_id,$assess_id,$assess_date) {
		  
		 
		  $data = array(
			   'patient_id' => $this->input->post('patient_id'),
		       'client_id' => $this->session->userdata('client_id'),
			   "assess_date"=> date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))),
			   "SI18"=>$this->input->post('SI-18'),
			   "SI19"=>$this->input->post('SI-19'),
			   "SI20"=>$this->input->post('SI-20'),
			   "SI21"=>$this->input->post('SI-21'),
			   "SI22"=>$this->input->post('SI-22'),
			   "SI23"=>$this->input->post('SI-23'),
			   "SI24"=>$this->input->post('SI-24'),
			   "SI25"=>$this->input->post('SI-25'),
			   "SI26"=>$this->input->post('SI-26'),
			   "SI27"=>$this->input->post('SI-27'),
			   "SI28"=>$this->input->post('SI-28'),
			   "SI29"=>$this->input->post('SI-29'),
			   "SI30"=>$this->input->post('SI-30'),
			   "SI31"=>$this->input->post('SI-31'),
			   "SI32"=>$this->input->post('SI-32'),
			   "SI33"=>$this->input->post('SI-33'),
			   "SI34"=>$this->input->post('SI-34'),
			   "SI35"=>$this->input->post('SI-35'),
			   "SI36"=>$this->input->post('SI-36'),
			   "SI37"=>$this->input->post('SI-37'),
			   'totalDimB'=>$this->input->post('dimensionB'),
			   'perDimB '=>$this->input->post('percentageB'),
	       	);
		//$this->db->insert('tbl_paediatric_gmfm_sit',$data);
		$this->db->where('patient_id',$patient_id);
		  $this->db->where('assess_date',$assess_date);
		$this->db->update('tbl_paediatric_gmfm_sit',$data);
		return $this->input->post('patient_id');
	  }
	  
	  public function update_paediatric_GMFM_CK($patient_id,$assess_id,$assess_date) {
		  
		 
		  $data = array(
			   'patient_id' => $this->input->post('patient_id'),
		       'client_id' => $this->session->userdata('client_id'),
			   "assess_date"=> date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))),
			   "CK38"=>$this->input->post('CK-38'),
			   "CK39"=>$this->input->post('CK-39'),
			   "CK40"=>$this->input->post('CK-40'),
			   "CK41"=>$this->input->post('CK-41'),
			   "CK42"=>$this->input->post('CK-42'),
			   "CK43"=>$this->input->post('CK-43'),
			   "CK44"=>$this->input->post('CK-44'),
			   "CK45"=>$this->input->post('CK-45'),
			   "CK46"=>$this->input->post('CK-46'),
			   "CK47"=>$this->input->post('CK-47'),
			   "CK48"=>$this->input->post('CK-48'),
			   "CK49"=>$this->input->post('CK-49'),
			   "CK50"=>$this->input->post('CK-50'),
			   "CK51"=>$this->input->post('CK-51'),
			
			   'totalDimC'=>$this->input->post('dimensionC'),
			   'perDimC'=>$this->input->post('percentageC'),
	       	);
		//$this->db->insert('tbl_paediatric_gmfm_ck',$data);
		//return $this->db->insert_id();
		$this->db->where('patient_id',$patient_id);
		  $this->db->where('assess_date',$assess_date);
		$this->db->update('tbl_paediatric_gmfm_ck',$data);
		return $this->input->post('patient_id');
	  }
	  
		public function update_paediatric_GMFM_STAND($patient_id,$assess_id,$assess_date) {
		  
		 
		  $data = array(
			   'patient_id' => $this->input->post('patient_id'),
		       'client_id' => $this->session->userdata('client_id'),
			   "assess_date"=> date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))),
			   "ST52"=>$this->input->post('ST-52'),
			   "ST53"=>$this->input->post('ST-53'),
			   "ST54"=>$this->input->post('ST-54'),
			   "ST55"=>$this->input->post('ST-55'),
			   "ST56"=>$this->input->post('ST-56'),
			   "ST57"=>$this->input->post('ST-57'),
			   "ST58"=>$this->input->post('ST-58'),
			   "ST59"=>$this->input->post('ST-59'),
			   "ST60"=>$this->input->post('ST-60'),
			   "ST61"=>$this->input->post('ST-61'),
			   "ST62"=>$this->input->post('ST-62'),
			   "ST63"=>$this->input->post('ST-63'),
			   "ST64"=>$this->input->post('ST-64'),
			   'totalDimD'=>$this->input->post('dimensionD'),
			   'perDimD'=>$this->input->post('percentageD'),
	       	);
		//$this->db->insert('tbl_paediatric_gmfm_stand',$data);
		//return $this->db->insert_id();
		$this->db->where('patient_id',$patient_id);
		  $this->db->where('assess_date',$assess_date);
		$this->db->update('tbl_paediatric_gmfm_stand',$data);
		return $this->input->post('patient_id');
	  }
	  public function update_paediatric_GMFM_WALK($patient_id,$assess_id,$assess_date) {
		  
		 
		  $data = array(
			   'patient_id' => $this->input->post('patient_id'),
		       'client_id' => $this->session->userdata('client_id'),
			   "assess_date"=> date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))),
			   "WRJ65"=>$this->input->post('WRJ-65'),
			   "WRJ66"=>$this->input->post('WRJ-66'),
			   "WRJ67"=>$this->input->post('WRJ-67'),
			   "WRJ68"=>$this->input->post('WRJ-68'),
			   "WRJ69"=>$this->input->post('WRJ-69'),
			   "WRJ70"=>$this->input->post('WRJ-70'),
			   "WRJ71"=>$this->input->post('WRJ-71'),
			   "WRJ72"=>$this->input->post('WRJ-72'),
			   "WRJ73"=>$this->input->post('WRJ-73'),
			   "WRJ74"=>$this->input->post('WRJ-74'),
			   "WRJ75"=>$this->input->post('WRJ-75'),
			   "WRJ76"=>$this->input->post('WRJ-76'),
			   "WRJ77"=>$this->input->post('WRJ-77'),
			   "WRJ78"=>$this->input->post('WRJ-78'),
			   "WRJ79"=>$this->input->post('WRJ-79'),
			   "WRJ80"=>$this->input->post('WRJ-80'),
			   "WRJ81"=>$this->input->post('WRJ-81'),
			   "WRJ82"=>$this->input->post('WRJ-82'),
			   "WRJ83"=>$this->input->post('WRJ-83'),
			   "WRJ84"=>$this->input->post('WRJ-84'),
			   "WRJ85"=>$this->input->post('WRJ-85'),
			   "WRJ86"=>$this->input->post('WRJ-86'),
			   "WRJ87"=>$this->input->post('WRJ-87'),
			   "WRJ88"=>$this->input->post('WRJ-88'),
			   
			   
			   'totalDimE'=>$this->input->post('dimensionE'),
			   'perDimE '=>$this->input->post('percentageE'),
			   'gmfm '=>$this->input->post('gmfm'),
	       	);
		//$this->db->insert('tbl_paediatric_gmfm_walk',$data);
		//return $this->db->insert_id();
		$this->db->where('patient_id',$patient_id);
		  $this->db->where('assess_date',$assess_date);
		$this->db->update('tbl_paediatric_gmfm_walk',$data);
		return $this->input->post('patient_id');
	  }
		
		
}