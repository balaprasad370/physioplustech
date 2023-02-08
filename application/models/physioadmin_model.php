<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Physioadmin_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function case_notes(){
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->select('count(cn_id) as totalcount')->from('tbl_patient_case_notes');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function prog_notes(){
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->select('count(pn_id) as totalcount')->from('tbl_patient_prog_notes');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function remark(){
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->select('count(remark_id) as totalcount')->from('tbl_patient_remarks');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	
	public function plan(){
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->select('count(soap_plan_id) as totalcount')->from('tbl_soap_plan');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	
	public function history(){
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->select('count(his_id) as totalcount')->from('tbl_patient_history');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function chief_comp(){
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->select('count(cc_id) as totalcount')->from('tbl_patient_chief_complaints');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function pain(){
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->select('count(pain_id) as totalcount')->from('tbl_patient_pain');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	
	public function examn(){
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->select('count(examn_id) as totalcount')->from('tbl_patient_examination');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function mexamn(){
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->select('count(mexamn_id) as totalcount')->from('tbl_patient_motor_examination');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function sexamn(){
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->select('count(sexamn_id) as totalcount')->from('tbl_patient_sensory_examination');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function paediatric(){
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->select('count(paediatric_id) as totalcount')->from('tbl_patient_paediatric');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function neuro_exam(){
		$this->db->distinct();
		$this->db->select('count(nuero_id) as totalcount')->from('tbl_patient_nuero');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function investigation(){
		
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->select('count(inves_id) as totalcount')->from('tbl_investigation');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
		
	}
	public function prov_diag(){
		
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->select('count(pd_id) as totalcount')->from('tbl_patient_prov_diagnosis');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
		
	}
	
	public function medical(){
		
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->select('count(medi_id) as totalcount')->from('tbl_patient_medi_info');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
		
	}
	public function goal(){
		
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->select('count(goal_id) as totalcount')->from('tbl_patient_goals');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
		
	}
	
	
	public function session_report(){
		
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->select('count(sn_id) as totalcount')->from('tbl_session_det');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
		
	}
	
	public function hip_report(){
		
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->select('count(h_id) as totalcount')->from('tbl_hipassessment');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
		
	}
	public function knee_report(){
		
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->select('count(k_id) as totalcount')->from('tbl_kneeassessment');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
		
	}
	public function elbow_report(){
		
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->select('count(e_id) as totalcount')->from('tbl_elbowassessment');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
		
	}
	public function shoulder_report(){
		
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->select('count(s_id) as totalcount')->from('tbl_shoulderassessment');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
		
	}
	public function foot_report(){
		
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->select('count(f_id) as totalcount')->from('tbl_footassessment');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
		
	}
	
	
}