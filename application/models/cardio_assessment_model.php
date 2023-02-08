<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Cardio_assessment_model extends CI_Model {
		
	public function add_cardio()
	{		
	       $this->db->where('patient_id',$this->input->post('patient_id'));
		   $this->db->where('date',date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))));
		   $this->db->limit(1);
		   $this->db->select('img_name')->from('tbl_ass_body_chart');
		   $this->db->order_by('img_id','desc');
		   $res = $this->db->get();
		   if($res->result_array() != false){
		     $image = 'https://www.physioplustech.in/wpaintone/test/uploads/'.$res->row()->img_name;
           } else {
			   $image = '';
		   }			
	  $course = array(
		   'name' => $this->input->post('name'),
		    'assess_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))),
			'chart' => $image,
			'patient_id' => $this->input->post('patient_id'),
			'client_id' => $this->session->userdata('client_id'),
			'staff_id' => $this->input->post('staff_id'),
			'age' => $this->input->post('age'),
			'sex' => $this->input->post('gender'),
			'occupation' => $this->input->post('occupation'),
			'uhid_no' => $this->input->post('uhid_no'),
			'date_admission' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('date_admission')))),
			'date_assessment' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('date_assessment')))),
			'ward' => $this->input->post('ward'),
			'address' => $this->input->post('address'),
			'chief_complaint' => $this->input->post('chief_complaint'),
			'present_history' => $this->input->post('present_history'),
			'past_history' => $this->input->post('past_history'),
			'personal_history' => $this->input->post('personal_history'),
			'smoking' => $this->input->post('smoking'),
			'alcoholism' => $this->input->post('alcoholism'),
			'tobacco' => $this->input->post('tobacco'),
			'diet' => $this->input->post('diet'),
			'allergens' => $this->input->post('allergens'),
			'medical_history' => $this->input->post('medical_history'),
			'family_history' => $this->input->post('family_history'),
			'occupational_history' => $this->input->post('occupational_history'),
			'social_history' => $this->input->post('social_history'),
			'vital_signs' => $this->input->post('vital_signs'),
			'body_temperature' => $this->input->post('body_temperature'),
			'heart_rate' => $this->input->post('heart_rate'),
			'blood_pressure' => $this->input->post('blood_pressure'),
			'respiratory_rate' => $this->input->post('respiratory_rate'),
			'spo2' => $this->input->post('spo2'),
			'consciousness' => $this->input->post('consciousness'),
			'body_built' => $this->input->post('body_built'),
			'external_app' => $this->input->post('external_app'),
			'color_limb' => $this->input->post('color_limb'),
			'clubbing' => $this->input->post('clubbing'),
			'edema' => $this->input->post('edema'),
			'communication' => $this->input->post('communication'),
			'speech' => $this->input->post('speech'),
			'cyanosis' => $this->input->post('cyanosis'),
			'dyspnoea' => $this->input->post('dyspnoea'),
			'jaundice' => $this->input->post('jaundice'),
			'facial' => $this->input->post('facial'),
			'eva_head' => $this->input->post('eva_head'),
			'jugular_vein' => $this->input->post('jugular_vein'),
			'respiratory' => $this->input->post('respiratory'),
			'nasal' => $this->input->post('nasal'),
			'accesory' => $this->input->post('accesory'),
			'vein' => $this->input->post('vein'),
			'shoulder' => $this->input->post('shoulder'),
			'clavicular' => $this->input->post('clavicular'),
			'trapezius' => $this->input->post('trapezius'),
			'serratus' => $this->input->post('serratus'),
			'thoracic' => $this->input->post('thoracic'),
			'spacing' => $this->input->post('spacing'),
			'trachea' => $this->input->post('trachea'),
			'chest' => $this->input->post('chest'),
			'unmove_chest' => $this->input->post('unmove_chest'),
			'move_chest' => $this->input->post('move_chest'),
			'breathing' => $this->input->post('breathing'),
			'type' => $this->input->post('type'),
			'depth' => $this->input->post('depth'),
			'symmetry' => $this->input->post('symmetry'),
			'rate' => $this->input->post('rate'),
			'palpation' => $this->input->post('palpation'),
			'anterior_thoracic' => $this->input->post('anterior_thoracic'),
			'posterior_thoracic' => $this->input->post('posterior_thoracic'),
			'upper_lobe' => $this->input->post('upper_lobe'),
			'middle_lobe' => $this->input->post('middle_lobe'),
			'lower_lobe' => $this->input->post('lower_lobe'),
			'heart_position' => $this->input->post('heart_position'),
			'tracheal' => $this->input->post('tracheal'),
			'mediastinal' => $this->input->post('mediastinal'),
			'muscles_palpation' => $this->input->post('muscles_palpation'),
			'diaphragmatic' => $this->input->post('diaphragmatic'),
			'tenderness' => $this->input->post('tenderness'),
			'fremitus' => $this->input->post('fremitus'),
			'chest_expansion' => $this->input->post('chest_expansion'),
			'axillary_level' => $this->input->post('axillary_level'),
			'nipple_level' => $this->input->post('nipple_level'),
			'xiphoid_level' => $this->input->post('xiphoid_level'),
			'percussion' => $this->input->post('percussion'),
			'auscultation' => $this->input->post('auscultation'),
			'breath_sounds' => $this->input->post('breath_sounds'),
			'abnormal_breath' => $this->input->post('abnormal_breath'),
			'voice_sounds' => $this->input->post('voice_sounds'),
			'heart_sounds' => $this->input->post('heart_sounds'),
			'other_systems' => $this->input->post('other_systems'),
			'integumentary' => $this->input->post('integumentary'),
			'scars' => $this->input->post('scars'),
			'incisions' => $this->input->post('incisions'),
			'ulcers' => $this->input->post('ulcers'),
			'musculo_ske' => $this->input->post('musculo_ske'),
			'deformities' => $this->input->post('deformities'),
			'asymmetrical' => $this->input->post('asymmetrical'),
			'postural' => $this->input->post('postural'),
			'range_motion' => $this->input->post('range_motion'),
			'muscle_wasting' => $this->input->post('muscle_wasting'),
			'neurological' => $this->input->post('neurological'),
			'co_ordinated' => $this->input->post('co_ordinated'),
			'balance' => $this->input->post('balance'),
			'equilibrium' => $this->input->post('equilibrium'),
			'investigation' => $this->input->post('investigation'),
			'cough' => $this->input->post('cough'),
			'type1' => $this->input->post('type1'),
			'time' => $this->input->post('time'),
			'aggravating_factor' => $this->input->post('aggravating_factor'),
			'sputum_exam' => $this->input->post('sputum_exam'),
			'blood_exam' => $this->input->post('blood_exam'),
			'chest_xray' => $this->input->post('chest_xray'),
			'ecg' => $this->input->post('ecg'),
			'abg' => $this->input->post('abg'),
			'pft' => $this->input->post('pft'),
			'stress' => $this->input->post('stress'),
			'2d_echo' => $this->input->post('2d_echo'),
			'ct_scan' => $this->input->post('ct_scan'),
			'angiogram' => $this->input->post('angiogram'),
			'ultrasound_scan' => $this->input->post('ultrasound_scan'),
			'mri_scan' => $this->input->post('mri_scan'),
			'prov_diagnosis' => $this->input->post('prov_diagnosis'),
			'diff_diagnosis' => $this->input->post('diff_diagnosis'),
			'physio_treatment' => $this->input->post('physio_treatment'),
			'problem_list' => $this->input->post('problem_list'),
			'aims' => $this->input->post('aims'),
			'means' => $this->input->post('means'),
			
			);
		
		$this->db->insert('tbl_cardio_assessment', $course);
		return true;
	}
	public function cardio_edit($cardio_id)
	{	
		$where=array('cardio_id' => $cardio_id);
		$this->db->select('*')->from('tbl_cardio_assessment')->where($where);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
   public function update_cardio($cardio_id)
	{		
	       $this->db->where('patient_id',$this->input->post('patient_id'));
		   $this->db->where('date',$this->input->post('assess_date'));
		   $this->db->limit(1);
		   $this->db->select('img_name')->from('tbl_ass_body_chart');
		   $this->db->order_by('img_id','DESC');
		   $res = $this->db->get();
		   if($res->result_array() != false){
		     $image = 'https://www.physioplustech.in/wpaintone/test/uploads/'.$res->row()->img_name;
           } else {
			   $image = '';
		   }
		   
	  $data = array(
		   'name' => $this->input->post('name'),
			'age' => $this->input->post('age'),
			'sex' => $this->input->post('gender'),
			'occupation' => $this->input->post('occupation'),
			'uhid_no' => $this->input->post('uhid_no'),
			'date_admission' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('date_admission')))),
			'date_assessment' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('date_assessment')))),
			'chart' => $image,
			'ward' => $this->input->post('ward'),
			'address' => $this->input->post('address'),
			'chief_complaint' => $this->input->post('chief_complaint'),
			'present_history' => $this->input->post('present_history'),
			'past_history' => $this->input->post('past_history'),
			'personal_history' => $this->input->post('personal_history'),
			'smoking' => $this->input->post('smoking'),
			'alcoholism' => $this->input->post('alcoholism'),
			'tobacco' => $this->input->post('tobacco'),
			'diet' => $this->input->post('diet'),
			'allergens' => $this->input->post('allergens'),
			'medical_history' => $this->input->post('medical_history'),
			'family_history' => $this->input->post('family_history'),
			'occupational_history' => $this->input->post('occupational_history'),
			'social_history' => $this->input->post('social_history'),
			'vital_signs' => $this->input->post('vital_signs'),
			'body_temperature' => $this->input->post('body_temperature'),
			'heart_rate' => $this->input->post('heart_rate'),
			'blood_pressure' => $this->input->post('blood_pressure'),
			'respiratory_rate' => $this->input->post('respiratory_rate'),
			'spo2' => $this->input->post('spo2'),
			'consciousness' => $this->input->post('consciousness'),
			'body_built' => $this->input->post('body_built'),
			'external_app' => $this->input->post('external_app'),
			'color_limb' => $this->input->post('color_limb'),
			'clubbing' => $this->input->post('clubbing'),
			'edema' => $this->input->post('edema'),
			'communication' => $this->input->post('communication'),
			'speech' => $this->input->post('speech'),
			'cyanosis' => $this->input->post('cyanosis'),
			'dyspnoea' => $this->input->post('dyspnoea'),
			'jaundice' => $this->input->post('jaundice'),
			'facial' => $this->input->post('facial'),
			'eva_head' => $this->input->post('eva_head'),
			'jugular_vein' => $this->input->post('jugular_vein'),
			'respiratory' => $this->input->post('respiratory'),
			'nasal' => $this->input->post('nasal'),
			'accesory' => $this->input->post('accesory'),
			'vein' => $this->input->post('vein'),
			'shoulder' => $this->input->post('shoulder'),
			'clavicular' => $this->input->post('clavicular'),
			'trapezius' => $this->input->post('trapezius'),
			'serratus' => $this->input->post('serratus'),
			'thoracic' => $this->input->post('thoracic'),
			'spacing' => $this->input->post('spacing'),
			'trachea' => $this->input->post('trachea'),
			'chest' => $this->input->post('chest'),
			'unmove_chest' => $this->input->post('unmove_chest'),
			'move_chest' => $this->input->post('move_chest'),
			'breathing' => $this->input->post('breathing'),
			'type' => $this->input->post('type'),
			'depth' => $this->input->post('depth'),
			'symmetry' => $this->input->post('symmetry'),
			'rate' => $this->input->post('rate'),
			'palpation' => $this->input->post('palpation'),
			'anterior_thoracic' => $this->input->post('anterior_thoracic'),
			'posterior_thoracic' => $this->input->post('posterior_thoracic'),
			'upper_lobe' => $this->input->post('upper_lobe'),
			'middle_lobe' => $this->input->post('middle_lobe'),
			'lower_lobe' => $this->input->post('lower_lobe'),
			'heart_position' => $this->input->post('heart_position'),
			'tracheal' => $this->input->post('tracheal'),
			'mediastinal' => $this->input->post('mediastinal'),
			'muscles_palpation' => $this->input->post('muscles_palpation'),
			'diaphragmatic' => $this->input->post('diaphragmatic'),
			'tenderness' => $this->input->post('tenderness'),
			'fremitus' => $this->input->post('fremitus'),
			'chest_expansion' => $this->input->post('chest_expansion'),
			'axillary_level' => $this->input->post('axillary_level'),
			'nipple_level' => $this->input->post('nipple_level'),
			'xiphoid_level' => $this->input->post('xiphoid_level'),
			'percussion' => $this->input->post('percussion'),
			'auscultation' => $this->input->post('auscultation'),
			'breath_sounds' => $this->input->post('breath_sounds'),
			'abnormal_breath' => $this->input->post('abnormal_breath'),
			'voice_sounds' => $this->input->post('voice_sounds'),
			'heart_sounds' => $this->input->post('heart_sounds'),
			'other_systems' => $this->input->post('other_systems'),
			'integumentary' => $this->input->post('integumentary'),
			'scars' => $this->input->post('scars'),
			'incisions' => $this->input->post('incisions'),
			'ulcers' => $this->input->post('ulcers'),
			'musculo_ske' => $this->input->post('musculo_ske'),
			'deformities' => $this->input->post('deformities'),
			'asymmetrical' => $this->input->post('asymmetrical'),
			'postural' => $this->input->post('postural'),
			'range_motion' => $this->input->post('range_motion'),
			'muscle_wasting' => $this->input->post('muscle_wasting'),
			'neurological' => $this->input->post('neurological'),
			'co_ordinated' => $this->input->post('co_ordinated'),
			'balance' => $this->input->post('balance'),
			'equilibrium' => $this->input->post('equilibrium'),
			'investigation' => $this->input->post('investigation'),
			'cough' => $this->input->post('cough'),
			'type1' => $this->input->post('type1'),
			'time' => $this->input->post('time'),
			'aggravating_factor' => $this->input->post('aggravating_factor'),
			'sputum_exam' => $this->input->post('sputum_exam'),
			'blood_exam' => $this->input->post('blood_exam'),
			'chest_xray' => $this->input->post('chest_xray'),
			'ecg' => $this->input->post('ecg'),
			'abg' => $this->input->post('abg'),
			'pft' => $this->input->post('pft'),
			'stress' => $this->input->post('stress'),
			'2d_echo' => $this->input->post('2d_echo'),
			'ct_scan' => $this->input->post('ct_scan'),
			'angiogram' => $this->input->post('angiogram'),
			'ultrasound_scan' => $this->input->post('ultrasound_scan'),
			'mri_scan' => $this->input->post('mri_scan'),
			'prov_diagnosis' => $this->input->post('prov_diagnosis'),
			'diff_diagnosis' => $this->input->post('diff_diagnosis'),
			'physio_treatment' => $this->input->post('physio_treatment'),
			'problem_list' => $this->input->post('problem_list'),
			'aims' => $this->input->post('aims'),
			'means' => $this->input->post('means'),
			
			);
		
		$where = array('cardio_id' => $cardio_id);
		$this->db->where($where);
		$this->db->update('tbl_cardio_assessment',$data);
		return $cardio_id;
	}

	
	 public function cardio_assessment_info($val,$patient_id) {
		  $this->db->where('assess_date',date('Y-m-d',strtotime($val)));
		  $this->db->where('patient_id',$patient_id);
		  $this->db->select('cardio_id')->from('tbl_cardio_assessment');
		  $res = $this->db->get();
		  if($res->result_array() != false){
			  $id = $res->row()->cardio_id;
		  } else {
			 $id = 0; 
		  }
		  return $id;
	  }
	  
	  
	  public function add_postnatal()
	{		
	
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
		   
	     $data = array(
		    'name' => $this->input->post('name'),
		    'patient_id' => $this->input->post('patient_id'),
			'client_id' => $this->session->userdata('client_id'),
			'staff_id' => $this->input->post('staff_id'),
			'assess_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))),
			'age' => $this->input->post('age'),
			'chart' => $image,
			'code' => $code,
			'occupation' => $this->input->post('occupation'),
			'uhid_no' => $this->input->post('uhid_no'),
			'marital' => $this->input->post('marital'),
			'height' => $this->input->post('height'),
			'weight' => $this->input->post('weight'),
			'bmi' => $this->input->post('bmi'),
			'address' => $this->input->post('address'),
			'vomitting' => $this->input->post('vomitting'),
			'musculoske' => $this->input->post('musculoske'),
			'headache' => $this->input->post('headache'),
			'swelling' => $this->input->post('swelling'),
			'malaise' => $this->input->post('malaise'),
			'present_history' => $this->input->post('present_history'),
			'past_history' => $this->input->post('past_history'),
			'birth' => $this->input->post('birth'),
			'date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('date')))),
			'gravida' => $this->input->post('gravida'),
			'para' => $this->input->post('para'),
			'complications' => $this->input->post('complications'),
			'blood_group' => $this->input->post('blood_group'),
			'feeding' => $this->input->post('feeding'),
			'gastro' => $this->input->post('gastro'),
			'appetite' => $this->input->post('appetite'),
			'constipation' => $this->input->post('constipation'),
			'genitourinary' => $this->input->post('genitourinary'),
			'incontinence' => $this->input->post('incontinence'),
			'prolapse' => $this->input->post('prolapse'),
			'polyuria' => $this->input->post('polyuria'),
			'micturition' => $this->input->post('micturition'),
			'constipation1' => $this->input->post('constipation1'),
			'tb' => $this->input->post('tb'),
			'seizures' => $this->input->post('seizures'),
			'BP' => $this->input->post('BP'),
			'anaemia' => $this->input->post('anaemia'),
			'p_musculoskeletal' => $this->input->post('p_musculoskeletal'),
			'rh_incompatibility' => $this->input->post('rh_incompatibility'),
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
			'NO_DELIVERIES5' => $this->input->post('NO_DELIVERIES5'),
			'MODE_DELIVERY5' => $this->input->post('MODE_DELIVERY5'),
			'COMPLICATIONS5' => $this->input->post('COMPLICATIONS5'),
			'1ST_LABOUR5' => $this->input->post('1ST_LABOUR5'),
			'2ND_LABOUR5' => $this->input->post('2ND_LABOUR5'),
			'SEX5' => $this->input->post('SEX5'),
			'BABY_WEIGHT5' => $this->input->post('BABY_WEIGHT5'),
			'NO_DELIVERIES6' => $this->input->post('NO_DELIVERIES6'),
			'MODE_DELIVERY6' => $this->input->post('MODE_DELIVERY6'),
			'COMPLICATIONS6' => $this->input->post('COMPLICATIONS6'),
			'1ST_LABOUR6' => $this->input->post('1ST_LABOUR6'),
			'2ND_LABOUR6' => $this->input->post('2ND_LABOUR6'),
			'SEX6' => $this->input->post('SEX6'),
			'BABY_WEIGHT6' => $this->input->post('BABY_WEIGHT6'),
			'cardiac' => $this->input->post('cardiac'),
			'hypothyroidism' => $this->input->post('hypothyroidism'),
			'immune' => $this->input->post('immune'),
			'bronchial' => $this->input->post('bronchial'),
			'surgical' => $this->input->post('surgical'),
			'family' => $this->input->post('family'),
			'twins' => $this->input->post('twins'),
			'congenital' => $this->input->post('congenital'),
			'diabetes' => $this->input->post('diabetes'),
			'personal' => $this->input->post('personal'),
			'smoking' => $this->input->post('smoking'),
			'sleeping' => $this->input->post('sleeping'),
			'economic' => $this->input->post('economic'),
			'occupation1' => $this->input->post('occupation1'),
			'members' => $this->input->post('members'),
			'outcome' => $this->input->post('outcome'),
			'lifestyle' => $this->input->post('lifestyle'),
			'postpartum' => $this->input->post('postpartum'),
			'psychological' => $this->input->post('psychological'),
			'emotional' => $this->input->post('emotional'),
			'anxiety' => $this->input->post('anxiety'),
			'onset' => $this->input->post('onset'),
			'duration' => $this->input->post('duration'),
			'type_pain' => $this->input->post('type_pain'),
			'location' => $this->input->post('location'),
			'aggravating' => $this->input->post('aggravating'),
			'relieving' => $this->input->post('relieving'),
			'night' => $this->input->post('night'),
			'irritability' => $this->input->post('irritability'),
			'VAS' => $this->input->post('VAS'),
			'observation' => $this->input->post('observation'),
			'general' => $this->input->post('general'),
			'edema' => $this->input->post('edema'),
			'trophic' => $this->input->post('trophic'),
			'posture' => $this->input->post('posture'),
			'anterior' => $this->input->post('anterior'),
			'posterior' => $this->input->post('posterior'),
			'lateral' => $this->input->post('lateral'),
			'gait' => $this->input->post('gait'),
			'perineum' => $this->input->post('perineum'),
			'discolouration' => $this->input->post('discolouration'),
			'oedema' => $this->input->post('oedema'),
			'hemorroids' => $this->input->post('hemorroids'),
			'episiotomy' => $this->input->post('episiotomy'),
			'urine' => $this->input->post('urine'),
			'pain' => $this->input->post('pain'),
			'lochia' => $this->input->post('lochia'),
			'vulvar' => $this->input->post('vulvar'),
			'tenderness' => $this->input->post('tenderness'),
			'temperature' => $this->input->post('temperature'),
			'swelling1' => $this->input->post('swelling1'),
			'vital' => $this->input->post('vital'),
			'BP1' => $this->input->post('BP1'),
			'pulse' => $this->input->post('pulse'),
			'respiratory' => $this->input->post('respiratory'),
			'abdomen' => $this->input->post('abdomen'),
			'chest' => $this->input->post('chest'),
			'auscultation' => $this->input->post('auscultation'),
			'chest_expansion' => $this->input->post('chest_expansion'),
			'breathing' => $this->input->post('breathing'),
			'range_motion' => $this->input->post('range_motion'),
			'edema1' => $this->input->post('edema1'),
			'girth' => $this->input->post('girth'),
			'volumetric' => $this->input->post('volumetric'),
			'manual' => $this->input->post('manual'),
			'DTR' => $this->input->post('DTR'),
			'diastasis' => $this->input->post('diastasis'),
			'breast_exam' => $this->input->post('breast_exam'),
			'size' => $this->input->post('size'),
			'nipple' => $this->input->post('nipple'),
			'areola' => $this->input->post('areola'),
			'infant' => $this->input->post('infant'),
			'type' => $this->input->post('type'),
			'frequency' => $this->input->post('frequency'),
			'engorgement' => $this->input->post('engorgement'),
			'cracked' => $this->input->post('cracked'),
			'sensations' => $this->input->post('sensations'),
			'varicose' => $this->input->post('varicose'),
			'suture' => $this->input->post('suture'),
			'special_test' => $this->input->post('special_test'),
			'functional' => $this->input->post('functional'),
			);
		
		$this->db->insert('tbl_postnatal_assessment', $data);
		return true;
	}
	
	
	public function postnatal_assessment_info($val,$patient_id) {
		  $this->db->where('assess_date',date('Y-m-d',strtotime($val)));
		  $this->db->where('patient_id',$patient_id);
		  $this->db->select('postnata_id')->from('tbl_postnatal_assessment');
		  $res = $this->db->get();
		  if($res->result_array() != false){
			  $id = $res->row()->postnata_id;
		  } else {
			 $id = 0; 
		  }
		  return $id;
	  }
	  
  public function edit_postnatal($postnata_id)
	{	
		$where=array('postnata_id' => $postnata_id);
		$this->db->select('*')->from('tbl_postnatal_assessment')->where($where);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
  public function update_postnatal()
	{		
	  
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
		    
		$data = array(
		   'name' => $this->input->post('name'),
		   'patient_id' => $this->input->post('patient_id'),
		   'client_id' => $this->session->userdata('client_id'),
		   'staff_id' => $this->input->post('staff_id'),
		   'assess_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('assess_date')))),
			'age' => $this->input->post('age'),
			'chart' => $image,
			'code' => $code,	
			'occupation' => $this->input->post('occupation'),
			'uhid_no' => $this->input->post('uhid_no'),
			'marital' => $this->input->post('marital'),
			'height' => $this->input->post('height'),
			'weight' => $this->input->post('weight'),
			'bmi' => $this->input->post('bmi'),
			'address' => $this->input->post('address'),
			'vomitting' => $this->input->post('vomitting'),
			'musculoske' => $this->input->post('musculoske'),
			'headache' => $this->input->post('headache'),
			'swelling' => $this->input->post('swelling'),
			'malaise' => $this->input->post('malaise'),
			'present_history' => $this->input->post('present_history'),
			'past_history' => $this->input->post('past_history'),
			'birth' => $this->input->post('birth'),
			'date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('date')))),
			'gravida' => $this->input->post('gravida'),
			'para' => $this->input->post('para'),
			'complications' => $this->input->post('complications'),
			'blood_group' => $this->input->post('blood_group'),
			'feeding' => $this->input->post('feeding'),
			'gastro' => $this->input->post('gastro'),
			'appetite' => $this->input->post('appetite'),
			'constipation' => $this->input->post('constipation'),
			'genitourinary' => $this->input->post('genitourinary'),
			'incontinence' => $this->input->post('incontinence'),
			'prolapse' => $this->input->post('prolapse'),
			'polyuria' => $this->input->post('polyuria'),
			'micturition' => $this->input->post('micturition'),
			'constipation1' => $this->input->post('constipation1'),
			'tb' => $this->input->post('tb'),
			'seizures' => $this->input->post('seizures'),
			'BP' => $this->input->post('BP'),
			'anaemia' => $this->input->post('anaemia'),
			'p_musculoskeletal' => $this->input->post('p_musculoskeletal'),
			'rh_incompatibility' => $this->input->post('rh_incompatibility'),
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
			'NO_DELIVERIES5' => $this->input->post('NO_DELIVERIES5'),
			'MODE_DELIVERY5' => $this->input->post('MODE_DELIVERY5'),
			'COMPLICATIONS5' => $this->input->post('COMPLICATIONS5'),
			'1ST_LABOUR5' => $this->input->post('1ST_LABOUR5'),
			'2ND_LABOUR5' => $this->input->post('2ND_LABOUR5'),
			'SEX5' => $this->input->post('SEX5'),
			'BABY_WEIGHT5' => $this->input->post('BABY_WEIGHT5'),
			'NO_DELIVERIES6' => $this->input->post('NO_DELIVERIES6'),
			'MODE_DELIVERY6' => $this->input->post('MODE_DELIVERY6'),
			'COMPLICATIONS6' => $this->input->post('COMPLICATIONS6'),
			'1ST_LABOUR6' => $this->input->post('1ST_LABOUR6'),
			'2ND_LABOUR6' => $this->input->post('2ND_LABOUR6'),
			'SEX6' => $this->input->post('SEX6'),
			'BABY_WEIGHT6' => $this->input->post('BABY_WEIGHT6'),
			'cardiac' => $this->input->post('cardiac'),
			'hypothyroidism' => $this->input->post('hypothyroidism'),
			'immune' => $this->input->post('immune'),
			'bronchial' => $this->input->post('bronchial'),
			'surgical' => $this->input->post('surgical'),
			'family' => $this->input->post('family'),
			'twins' => $this->input->post('twins'),
			'congenital' => $this->input->post('congenital'),
			'diabetes' => $this->input->post('diabetes'),
			'personal' => $this->input->post('personal'),
			'smoking' => $this->input->post('smoking'),
			'sleeping' => $this->input->post('sleeping'),
			'economic' => $this->input->post('economic'),
			'occupation1' => $this->input->post('occupation1'),
			'members' => $this->input->post('members'),
			'outcome' => $this->input->post('outcome'),
			'lifestyle' => $this->input->post('lifestyle'),
			'postpartum' => $this->input->post('postpartum'),
			'psychological' => $this->input->post('psychological'),
			'emotional' => $this->input->post('emotional'),
			'anxiety' => $this->input->post('anxiety'),
			'onset' => $this->input->post('onset'),
			'duration' => $this->input->post('duration'),
			'type_pain' => $this->input->post('type_pain'),
			'location' => $this->input->post('location'),
			'aggravating' => $this->input->post('aggravating'),
			'relieving' => $this->input->post('relieving'),
			'night' => $this->input->post('night'),
			'irritability' => $this->input->post('irritability'),
			'VAS' => $this->input->post('VAS'),
			'observation' => $this->input->post('observation'),
			'general' => $this->input->post('general'),
			'edema' => $this->input->post('edema'),
			'trophic' => $this->input->post('trophic'),
			'posture' => $this->input->post('posture'),
			'anterior' => $this->input->post('anterior'),
			'posterior' => $this->input->post('posterior'),
			'lateral' => $this->input->post('lateral'),
			'gait' => $this->input->post('gait'),
			'perineum' => $this->input->post('perineum'),
			'discolouration' => $this->input->post('discolouration'),
			'oedema' => $this->input->post('oedema'),
			'hemorroids' => $this->input->post('hemorroids'),
			'episiotomy' => $this->input->post('episiotomy'),
			'urine' => $this->input->post('urine'),
			'pain' => $this->input->post('pain'),
			'lochia' => $this->input->post('lochia'),
			'vulvar' => $this->input->post('vulvar'),
			'tenderness' => $this->input->post('tenderness'),
			'temperature' => $this->input->post('temperature'),
			'swelling1' => $this->input->post('swelling1'),
			'vital' => $this->input->post('vital'),
			'BP1' => $this->input->post('BP1'),
			'pulse' => $this->input->post('pulse'),
			'respiratory' => $this->input->post('respiratory'),
			'abdomen' => $this->input->post('abdomen'),
			'chest' => $this->input->post('chest'),
			'auscultation' => $this->input->post('auscultation'),
			'chest_expansion' => $this->input->post('chest_expansion'),
			'breathing' => $this->input->post('breathing'),
			'range_motion' => $this->input->post('range_motion'),
			'edema1' => $this->input->post('edema1'),
			'girth' => $this->input->post('girth'),
			'volumetric' => $this->input->post('volumetric'),
			'manual' => $this->input->post('manual'),
			'DTR' => $this->input->post('DTR'),
			'diastasis' => $this->input->post('diastasis'),
			'breast_exam' => $this->input->post('breast_exam'),
			'size' => $this->input->post('size'),
			'nipple' => $this->input->post('nipple'),
			'areola' => $this->input->post('areola'),
			'infant' => $this->input->post('infant'),
			'type' => $this->input->post('type'),
			'frequency' => $this->input->post('frequency'),
			'engorgement' => $this->input->post('engorgement'),
			'cracked' => $this->input->post('cracked'),
			'sensations' => $this->input->post('sensations'),
			'varicose' => $this->input->post('varicose'),
			'suture' => $this->input->post('suture'),
			'special_test' => $this->input->post('special_test'),
			'functional' => $this->input->post('functional'),
			);
		
		$this->db->where('postnata_id',$this->input->post('postnata_id'));
	    $this->db->update('tbl_postnatal_assessment',$data);
	}
	
	public function cardio_detail($patient_id,$from_date,$to_date) {
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('patient_id',$patient_id);
		if($from_date == '' && $to_date == ''){ } else {
			$this->db->where('assess_date >=',date('Y-m-d',strtotime($from_date)));
			$this->db->where('assess_date <=',date('Y-m-d',strtotime($to_date)));
			}$this->db->select('*')->from('tbl_cardio_assessment');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function post_detail($patient_id,$from_date,$to_date) {
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('patient_id',$patient_id);
		if($from_date == '' && $to_date == ''){ } else {
			$this->db->where('assess_date >=',date('Y-m-d',strtotime($from_date)));
			$this->db->where('assess_date <=',date('Y-m-d',strtotime($to_date)));
			}$this->db->select('*')->from('tbl_postnatal_assessment');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
}


	
		