<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		$this->load->model(array('registration_model','location_model'));
	}
	
	// edit client logo
	public function edit_logo($logo) {
		$client = $this->registration_model->editProfile($this->session->userdata('client_id'));
		if($client['logo'] != '') @unlink(UPLOADPATH."uploads/logo/".$client['logo']);
		$update = array('logo' => $logo);
		$this->db->where('client_id', $this->session->userdata('client_id'));
		$this->db->update('tbl_client', $update);
	}
	public function notes_add($client_id)
	{
		$settings_info = array(
			'notes' => $this->input->post('notes'),		
			'note' => $this->input->post('note'),
			'footer' => $this->input->post('footer'),
		);
		$this->db->where('client_id',$client_id);
		$this->db->update('tbl_client', $settings_info);
		return $client_id;
	}
	
	//edit settings
	public function editSettings($client_id)
	{	
		$this->db->select('*')->from('tbl_settings');
		$this->db->where('client_id',$client_id);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	//edit settings
	public function editItem($item_id)
	{	
		$this->db->select('image,item_name,item_desc,item_price,item_id')->from('tbl_item')->where('item_id',$item_id);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function editexpenseItem($item_id)
	{	
		$this->db->select('item_name,item_desc,item_price,item_id')->from('tbl_expanse_client_item')->where('item_id',$item_id);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function edit_prov_diag($pd_id)
	{	
		$this->db->select('pd_list_id,created_date,pd_list_name')->from('tbl_prov_diagnosis_list')->where('pd_list_id',$pd_id);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	//related records count
	public function hasInvoice($item_id)
	{
		$where=array('item_id' => $item_id);
		$this->db->select('item_id')->from('tbl_invoice_detail')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	function item_delete($item_id){
		
		$where = array('item_id' => $item_id);
		$this->db->where($where);
		$this->db->set('status','0');
		$this->db->update('tbl_item');
		//$this->db->delete('tbl_item');
		return $item_id;
	}
	function expenseitem_delete($item_id){
		$where = array('item_id' => $item_id);
		$this->db->where($where);
		$this->db->delete('tbl_expanse_client_item');
		return $item_id;
	}
	function del_diag($pd_list_id){
		$where = array('pd_list_id' => $pd_list_id);
		$this->db->where($where);
		$this->db->delete('tbl_prov_diagnosis_list');
		return $pd_list_id;
	}
	
	//edit schedule settings
	public function editSchSettings($client_id)
	{	
		$this->db->select('*')->from('tbl_schedule_settings')->where('client_id',$client_id);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	
	//update settings
	public function edit_invoicesettings($client_id) {
		
		$settings_info = array(
			'client_id' => $client_id,
			'discount' => $this->input->post('discount'),
			'tax' => $this->input->post('tax'),
			
		);
		
		$data = $this->editSettings($client_id);
		if($data != false){
			$this->db->where('client_id', $client_id);
			$this->db->update('tbl_settings',$settings_info);
		}else{
			$this->db->insert('tbl_settings', $settings_info);
		}
		
		if($this->input->post('all_locations_details') == 1){
			$clientId = $this->session->userdata('client_id');
			$profileInfoSetting = $this->registration_model->editProfile($clientId);
			$locationCount = $this->location_model->getLocationCount($clientId);
			$parentClientId = $this->location_model->getParentClientId($clientId);
			if($parentClientId == 0 && $locationCount != false){
				$sp_client_id = $clientId;
			}else{
				$sp_client_id = $profileInfoSetting['parent_client_id'];
			}
			$settingsData = $this->editSettings($sp_client_id);
			$clientIds = '';
			$all_locations = '';
			$clientIds1 = array();
			if($settingsData['all_locations_details'] == 1){
				$all_locations = true;
				$clientIds1 = $this->location_model->getLocationsIds($clientId);
				$clientIds = implode(",",$clientIds1);
			}
			$sessionData = array('all_locations' => $all_locations,'clientIds' => $clientIds1);
			$this->session->set_userdata($sessionData);
		}else{
			$sessionData = array('all_locations' => false,'clientIds' => '');
			$this->session->set_userdata($sessionData);
		}
	}
	
	
	public function edit_settings($client_id) {
		
		$settings_info = array(
			'client_id' => $client_id,
			'sch_time' => $this->input->post('sch_time'),
			'sch_slot' => $this->input->post('sch_slot'),
			'days_display' => $this->input->post('sch_day'),
			'display_view' => $this->input->post('sch_view'),
			'days_display_after' => $this->input->post('sch_day1'),
			'all_locations_details' => $this->input->post('all_locations_details'),
			'all_appointments' => $this->input->post('all_appointments'),
			'followup_color' => $this->input->post('followup_color')
			
		);
		
		$data = $this->editSettings($client_id);
		if($data != false){
			$this->db->where('client_id', $client_id);
			$this->db->update('tbl_settings',$settings_info);
		}else{
			$this->db->insert('tbl_settings', $settings_info);
		}
		
		if($this->input->post('all_locations_details') == 1){
			$clientId = $this->session->userdata('client_id');
			$profileInfoSetting = $this->registration_model->editProfile($clientId);
			$locationCount = $this->location_model->getLocationCount($clientId);
			$parentClientId = $this->location_model->getParentClientId($clientId);
			if($parentClientId == 0 && $locationCount != false){
				$sp_client_id = $clientId;
			}else{
				$sp_client_id = $profileInfoSetting['parent_client_id'];
			}
			$settingsData = $this->editSettings($sp_client_id);
			$clientIds = '';
			$all_locations = '';
			$clientIds1 = array();
			if($settingsData['all_locations_details'] == 1){
				$all_locations = true;
				$clientIds1 = $this->location_model->getLocationsIds($clientId);
				$clientIds = implode(",",$clientIds1);
			}
			$sessionData = array('all_locations' => $all_locations,'clientIds' => $clientIds1);
			$this->session->set_userdata($sessionData);
		} else {
			$sessionData = array('all_locations' => false,'clientIds' => '');
			$this->session->set_userdata($sessionData);
		}
		return $client_id;
	}
	
	public function editSettings1($client_id)
	{	
		$this->db->select('sch_slot,display_view')->from('tbl_settings');
		$this->db->where('client_id',$client_id);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function edit_sch_settings($client_id) {
		
		$sch_settings_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'sch_slot' => $this->input->post('sch_slot'),
			'monday_fn_from' => $this->input->post('monday_fn_from'),
			'monday_fn_to' => $this->input->post('monday_fn_to'),
			'monday_an_from' => $this->input->post('monday_an_from'),
			'monday_an_to' => $this->input->post('monday_an_to'),
			'tuesday_fn_from' => $this->input->post('tuesday_fn_from'),
			'tuesday_fn_to' => $this->input->post('tuesday_fn_to'),
			'tuesday_an_from' => $this->input->post('tuesday_an_from'),
			'tuesday_an_to' => $this->input->post('tuesday_an_to'),
			'wednesday_fn_from' => $this->input->post('wednesday_fn_from'),
			'wednesday_fn_to' => $this->input->post('wednesday_fn_to'),
			'wednesday_an_from' => $this->input->post('wednesday_an_from'),
			'wednesday_an_to' => $this->input->post('wednesday_an_to'),
			'thursday_fn_from' => $this->input->post('thursday_fn_from'),
			'thursday_fn_to' => $this->input->post('thursday_fn_to'),
			'thursday_an_from' => $this->input->post('thursday_an_from'),
			'thursday_an_to' => $this->input->post('thursday_an_to'),
			'friday_fn_from' => $this->input->post('friday_fn_from'),
			'friday_fn_to' => $this->input->post('friday_fn_to'),
			'friday_an_from' => $this->input->post('friday_an_from'),
			'friday_an_to' => $this->input->post('friday_an_to'),
			'saturday_fn_from' => $this->input->post('saturday_fn_from'),
			'saturday_fn_to' => $this->input->post('saturday_fn_to'),
			'saturday_an_from' => $this->input->post('saturday_an_from'),
			'saturday_an_to' => $this->input->post('saturday_an_to'),
			'sunday_fn_from' => $this->input->post('sunday_fn_from'),
			'sunday_fn_to' => $this->input->post('sunday_fn_to'),
			'sunday_an_from' => $this->input->post('sunday_an_from'),
			'sunday_an_to' => $this->input->post('sunday_an_to'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
			'monday_break_from' => $this->input->post('monday_break_from'),
			'monday_break_to' => $this->input->post('monday_break_to'),
			'tuesday_break_from' => $this->input->post('tuesday_break_from'),
			'tuesday_break_to' => $this->input->post('tuesday_break_to'),
			'wednesday_break_from' => $this->input->post('wednesday_break_from'),
			'wednesday_break_to' => $this->input->post('wednesday_break_to'),
			'thursday_break_from' => $this->input->post('thursday_break_from'),
			'thursday_break_to' => $this->input->post('thursday_break_to'),
			'friday_break_from' => $this->input->post('friday_break_from'),
			'friday_break_to' => $this->input->post('friday_break_to'),
			'saturday_break_from' => $this->input->post('saturday_break_from'),
			'saturday_break_to' => $this->input->post('saturday_break_to'),
			'sunday_break_from' => $this->input->post('sunday_break_from'),
			'sunday_break_to' => $this->input->post('sunday_break_to'),
		);
		$data = $this->editSchSettings($client_id);
		if($data != false){
			$this->db->where('client_id', $client_id);
			$this->db->update('tbl_schedule_settings',$sch_settings_info);
		}else{
			$this->db->insert('tbl_schedule_settings', $sch_settings_info);
		}
		
	}
	public function removebranding($client_id) {
		if($this->input->post('remove_branding')){
			$removebranding = 1;
		}else{
			$removebranding = 0;
		}
		$this->db->where('client_id', $client_id);
		$this->db->update('tbl_client',array('removebranding' => $removebranding));
		return $client_id;
		
	}
	public function social_share_insert($client_id) {
		$registration_info = array(
			
			'facebook' => $this->input->post('facebook'),
			'twitter' => $this->input->post('twitter'),
			'youtube' => $this->input->post('youtube'),
			'instagarm' => $this->input->post('instagarm'),
		);
			
		$this->db->where('client_id', $client_id);
		$this->db->update('tbl_client',$registration_info);
		return $client_id;
	}
	
	//activate or deactivate acc.
	public function activateSearchPhysio($client_id) {
		if($this->input->post('activate_account')){
		$account_type = 2;
		}else{
			$account_type = 1;
		}
		if($this->input->post('holidays1') || $this->input->post('holidays2')||$this->input->post('holidays3')||$this->input->post('holidays4')||$this->input->post('holidays5')||$this->input->post('holidays6')||$this->input->post('holidays7')){
	$holiday= $this->input->post('holidays1').$this->input->post('holidays2').$this->input->post('holidays3').$this->input->post('holidays4').$this->input->post('holidays5').$this->input->post('holidays6').$this->input->post('holidays7') ;
	$arr = str_split($holiday, "1"); 
    $holidays = implode(",", $arr);  
		 }else{
			$holidays = '';
		}
		$this->db->where('client_id', $client_id);
		$this->db->update('tbl_client',array('account_type' => $account_type));
		$this->db->where('client_id', $client_id);
		$this->db->update('tbl_settings',array('holidays' => $holidays));
		return $client_id;
	}
	
	public function editdia($item_id)
	{	
		$where = array('pd_list_id' => $item_id);
		$this->db->select('*')->from('tbl_prov_diagnosis_list')->where($where);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	function dia_delete($item_id){
		$where = array('pd_list_id' => $item_id);
		$this->db->where($where);
		$this->db->delete('tbl_prov_diagnosis_list');
	}

	public function itemhide(){
		
		$itemhide = $_POST['myJson'];
		$d = json_decode($itemhide,true);	
		$length = count($d);
		for($i=0;$i<$length;$i++){
			echo $d[$i]['itemshide'].'<br>';
			
			$data = array('item_hide' => 1);
			$this->db->where('client_id',$this->session->userdata('client_id'));
			$this->db->where('item_id',$d[$i]['itemshide']);
			$this->db->update('tbl_item',$data);  
		}
		
		
	}
	
	public function itemshow(){
		
		$itemhide = $_POST['myJson'];
		$d = json_decode($itemhide,true);	
		$length = count($d);
		for($i=0;$i<$length;$i++){
			$data = array('item_hide' => 0);
			$this->db->where('client_id',$this->session->userdata('client_id'));
			$this->db->where('item_id',$d[$i]['itemsshow']);
			$this->db->update('tbl_item',$data);  
		}
	}
	public function add_logo($client_id,$upload_img) {
			echo $this->session->userdata('client_id');
			$this->db->where('client_id',$client_id);
			$this->db->set('logo',$upload_img);
			$this->db->update('tbl_client');
			return $client_id;
	}
	public function edit_settings1($client_id) {
		$apt = $this->input->post('appointment');
		$arr1 = $this->input->post('staff_id');
		$peak_from = implode(',',$arr1);
		$arr2 = $this->input->post('item_id');
		$peak_to = implode(',',$arr2);
		
		$peak_amt = $this->input->post('item_price');
		$arr4 = $this->input->post('happy_from');
		$happy_from = implode(',',$arr4);
		$arr5 = $this->input->post('happy_to');
		$happy_to = implode(',',$arr5);
		$happy_amt = $this->input->post('price');
		$settings_info = array(
			'client_id' => $client_id,
			'peak_from' => $peak_from,
			'peak_to' => $peak_to,
			'happy_from' => $happy_from,
			'happy_to' => $happy_to,
			'peak_amount' => $peak_amt,
			'apt_settings' => $apt,
			'cost_settings' => $this->input->post('app_setting'),
			'app_charge' => $this->input->post('amount'),
			'happy_amount'=>$happy_amt
		);
		
		$data = $this->editSettings($client_id);
		if($data != false){
			$this->db->where('client_id', $client_id);
			$this->db->update('tbl_settings',$settings_info);
		}else{
			$this->db->insert('tbl_settings', $settings_info);
		}
		return true;
	}
	public function get_treatments_det($prov)
	{
		$provi = explode('/',$prov);
		$p_id = $provi[0];
		//$date = date('Y-m-d',strtotime($provi[1]));
		$this->db->where('ti.patient_id',$p_id);
		$this->db->where('ti.treatment_date >=',$date);
		$this->db->select('ti.treatment_quantity,it.item_name')->from('tbl_patient_treatment_techniques ti');
		$this->db->join('tbl_patient_info pi',"ti.patient_id=pi.patient_id");	
		$this->db->join('tbl_item it',"ti.treatments=it.item_id");		
		$result = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;

	}
	public function edit_app() {
		$data = array(
			'name' =>$this->input->post('name'),
			'specialities' =>$this->input->post('specialities'),
			'experience' =>$this->input->post('experience'),
			'education' =>$this->input->post('education'),
			'clinic_name' =>$this->input->post('clinic_name'),
			'email' =>$this->input->post('email'),
			'mobile' =>$this->input->post('mobile'),
	   );
		
		$this->db-where('clinic_name',$this->input->post('clinic_name'));
		$this->db->update('tbl_app_det',$data);
		return true;
	}
	public function consent_form($client_id) {
		
		//echo $this->input->post('consent_form'); exit;
		
		$registration_info = array(
			
			'consent_form' => $this->input->post('consent_form')
			
		);
			
		$this->db->where('client_id', $client_id);
		$this->db->update('tbl_client',$registration_info);
		return $client_id;
	}
	public function list_consent()
	{	
		$this->db->select('consent_form')->from('tbl_client');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function edit_report($client_id)
	{
		$this->db->select('*')->from('tbl_reports')->where('client_id', $client_id);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function report_form($client_id) {
		$settings_info = array(
			'client_id' => $client_id,
			'case_notes' => $this->input->post('case_notes'),
			'prog_notes' => $this->input->post('prog_notes'),
			'remarks' => $this->input->post('remarks'),
			'chief_complain' => $this->input->post('chief_complain'),
			'history' => $this->input->post('history'),
			'pain' => $this->input->post('pain'),
			'examination' => $this->input->post('examination'),
			'motor_exam' => $this->input->post('motor_exam'),
			'neuro_exam' => $this->input->post('neuro_exam'),
			'sensory_exam' => $this->input->post('sensory_exam'),
			'investigation' => $this->input->post('investigation'),
			'treatment' => $this->input->post('treatment'),
			'diagnosis' => $this->input->post('diagnosis'),
			'goal' => $this->input->post('goal'),
			'body_chart' => $this->input->post('body_chart'),
			'plan' => $this->input->post('plan'),
			'pediatric_exam' => $this->input->post('pediatric_exam'),
			'provisional' => $this->input->post('provisional'),
			'exercise' => $this->input->post('exercise'),
			'encounter' => $this->input->post('encounter'),  
			'created_on' => date('Y-m-d H:i:s'),
			'last_login_date' => date('Y-m-d H:i:s')
		);
		
		$data = $this->edit_report($client_id);
		if($data != false){
			$this->db->where('client_id', $client_id);
			$this->db->update('tbl_reports',$settings_info);
		}else{
			$this->db->insert('tbl_reports', $settings_info);
		}
		return true;
	}
	public function item_hide($item_id){
		$where = array('item_id' => $item_id);
		$this->db->where($where);
		$this->db->set('item_hide','1');
		$this->db->update('tbl_item');
	}
	public function expenseitem_hide($item_id){
		$where = array('item_id' => $item_id);
		$this->db->where($where);
		$this->db->set('item_hide','1');
		$this->db->update('tbl_expanse_client_item');
	}
	public function expenseitem_show($item_id){
		$where = array('item_id' => $item_id);
		$this->db->where($where);
		$this->db->set('item_hide','0');
		$this->db->update('tbl_expanse_client_item');
	}
	public function item_show($item_id){
		$where = array('item_id' => $item_id);
		$this->db->where($where);
		$this->db->set('item_hide','0');
		$this->db->update('tbl_item');
	}
	public function product_add($client_id) {  
		$data = array(
		   'client_id'=>$client_id,
		   'item_date'=>date('Y-m-d'),
		   'item_name'=>$this->input->post('item_name'),
		   'item_code'=>$this->input->post('item_code'),
		   'amount'=>$this->input->post('amount'),
		   'discount'=>$this->input->post('discount'),
		   'stack_items'=>$this->input->post('stack_items'),
		   'total'=>$this->input->post('total'),
		   'total_items'=>$this->input->post('stack_items'),
		);
		$this->db->insert('tbl_product_info',$data);
		$id = $this->db->insert_id();
		return $id;
	}
	public function product_details($item_id) {
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('product_id',$item_id);
		$this->db->select('*')->from('tbl_product_info');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function update_product($client_id) {
		$data = array(
		   'item_date'=>date('Y-m-d'),
		   'item_name'=>$this->input->post('item_name'),
		   'item_code'=>$this->input->post('item_code'),
		   'amount'=>$this->input->post('amount'),
		   'discount'=>$this->input->post('discount'),
		   'stack_items'=>$this->input->post('stack_items'),
		   'total'=>$this->input->post('total'),
		);
		$this->db->where('product_id',$this->input->post('item_id'));
		$this->db->update('tbl_product_info',$data);
		$id = $this->db->insert_id();
		return $id;
	}
	public function delete_product($patient_id){
		$this->db->where('product_id',$patient_id);
		$this->db->delete('tbl_product_info');
		return $patient_id;
	}
	public function sch_time_edit(){
	    $this->db->where('staff_id',$this->input->post('staff_id'));
		$this->db->delete('tbl_time'); 
		
		$this->db->where('staff_id',$this->input->post('staff_id'));
		$this->db->delete('tbl_daywise');
		
		
		
		$data3 = array(
		  'start' => '04:00',
		  'end' => $this->input->post('monday_fn_from').':00',
		  'staff_id' => $this->input->post('staff_id'),
		  'client_id' => $this->session->userdata('client_id'),
		  'date' => date('Y-m-d'),
		  'rendering' => 'background',
		  'color' => '#9f9f9f',
		  'dow' => '[1]',
		);
		$this->db->insert('tbl_time',$data3);
		
		$data4 = array(
		  'start' => $this->input->post('monday_an_to').':00',
		  'end' => '24:00',
		  'staff_id' => $this->input->post('staff_id'),
		  'client_id' => $this->session->userdata('client_id'),
		  'date' => date('Y-m-d'),
		  'rendering' => 'background',
		  'color' => '#9f9f9f',
		  'dow' =>'[1]',
		);
		$this->db->insert('tbl_time',$data4);
		
		$data5 = array(
		  'start' => '04:00',
		  'end' => $this->input->post('tuesday_fn_from').':00',
		  'staff_id' => $this->input->post('staff_id'),
		  'client_id' => $this->session->userdata('client_id'),
		  'date' => date('Y-m-d'),
		  'rendering' => 'background',
		  'color' => '#9f9f9f',
		  'dow' => '[2]',
		);
		$this->db->insert('tbl_time',$data5);
		
		$data6 = array(
		  'start' => $this->input->post('tuesday_an_to').':00',
		  'end' => '24:00',
		  'staff_id' => $this->input->post('staff_id'),
		  'client_id' => $this->session->userdata('client_id'),
		  'date' => date('Y-m-d'),
		  'rendering' => 'background',
		  'color' => '#9f9f9f',
		  'dow' => '[2]',
		);
		$this->db->insert('tbl_time',$data6);
		
		$data7 = array(
		  'start' => '04:00',
		  'end' => $this->input->post('wednesday_fn_from').':00',
		  'staff_id' => $this->input->post('staff_id'),
		  'client_id' => $this->session->userdata('client_id'),
		  'date' => date('Y-m-d'),
		  'rendering' => 'background',
		  'color' => '#9f9f9f',
		  'dow' => '[3]',
		);
		$this->db->insert('tbl_time',$data7);
		
		$data8 = array(
		  'start' => $this->input->post('wednesday_an_to').':00',
		  'end' => '24:00',
		  'staff_id' => $this->input->post('staff_id'),
		  'client_id' => $this->session->userdata('client_id'),
		  'date' => date('Y-m-d'),
		  'rendering' => 'background',
		  'color' => '#9f9f9f',
		  'dow' => '[3]',
		);
		$this->db->insert('tbl_time',$data8);
		
		$data9 = array(
		  'start' => '04:00',
		  'end' => $this->input->post('thursday_fn_from').':00',
		  'staff_id' => $this->input->post('staff_id'),
		  'client_id' => $this->session->userdata('client_id'),
		  'date' => date('Y-m-d'),
		  'rendering' => 'background',
		  'color' => '#9f9f9f',
		  'dow' => '[4]',
		);
		$this->db->insert('tbl_time',$data9);
		
		$data10 = array(
		  'start' => $this->input->post('thursday_an_to').':00',
		  'end' => '24:00',
		  'staff_id' => $this->input->post('staff_id'),
		  'client_id' => $this->session->userdata('client_id'),
		  'date' => date('Y-m-d'),
		  'rendering' => 'background',
		  'color' => '#9f9f9f',
		  'dow' => '[4]',
		);
		$this->db->insert('tbl_time',$data10);
		
		$data11 = array(
		  'start' => '04:00',
		  'end' => $this->input->post('friday_fn_from').':00',
		  'staff_id' => $this->input->post('staff_id'),
		  'client_id' => $this->session->userdata('client_id'),
		  'date' => date('Y-m-d'),
		  'rendering' => 'background',
		  'color' => '#9f9f9f',
		  'dow' => '[5]',
		);
		$this->db->insert('tbl_time',$data11);
		
		$data12 = array(
		  'start' => $this->input->post('friday_an_to').':00',
		  'end' => '24:00',
		  'staff_id' => $this->input->post('staff_id'),
		  'client_id' => $this->session->userdata('client_id'),
		  'date' => date('Y-m-d'),
		  'rendering' => 'background',
		  'color' => '#9f9f9f',
		  'dow' => '[5]',
		);
		$this->db->insert('tbl_time',$data12);
		
		$data13 = array(
		  'start' => '04:00',
		  'end' => $this->input->post('saturday_fn_from').':00',
		  'staff_id' => $this->input->post('staff_id'),
		  'client_id' => $this->session->userdata('client_id'),
		  'date' => date('Y-m-d'),
		  'rendering' => 'background',
		  'color' => '#9f9f9f',
		  'dow' => '[6]',
		);
		$this->db->insert('tbl_time',$data13);
		
		$data14 = array(
		  'start' => $this->input->post('saturday_an_to').':00',
		  'end' => '24:00',
		  'staff_id' => $this->input->post('staff_id'),
		  'client_id' => $this->session->userdata('client_id'),
		  'date' => date('Y-m-d'),
		  'rendering' => 'background',
		  'color' => '#9f9f9f',
		  'dow' => '[6]',
		);
		$this->db->insert('tbl_time',$data14);
		
		$data15 = array(
		  'start' => '04:00',
		  'end' => $this->input->post('saturday_fn_from').':00',
		  'staff_id' => $this->input->post('staff_id'),
		  'client_id' => $this->session->userdata('client_id'),
		  'date' => date('Y-m-d'),
		  'rendering' => 'background',
		  'color' => '#9f9f9f',
		  'dow' => '[0]',
		);
		$this->db->insert('tbl_time',$data15);
		
		$data16 = array(
		  'start' => $this->input->post('saturday_an_to').':00',
		  'end' => '24:00',
		  'staff_id' => $this->input->post('staff_id'),
		  'client_id' => $this->session->userdata('client_id'),
		  'date' => date('Y-m-d'),
		  'rendering' => 'background',
		  'color' => '#9f9f9f',
		  'dow' => '[0]',
		);
		$this->db->insert('tbl_time',$data16);

		$data27 = array(
		  'start' => $this->input->post('monday_fn_from').':00',
		  'end' => $this->input->post('monday_an_to').':00',
		  'staff_id' => $this->input->post('staff_id'),
		  'client_id' => $this->session->userdata('client_id'),
		  'date' => date('Y-m-d'),
		  'day'=> 'Monday'
		);
		$this->db->insert('tbl_daywise',$data27);
		
		$data21 = array(
		  'start' => $this->input->post('tuesday_fn_from').':00',
		  'end' => $this->input->post('tuesday_an_to').':00',
		  'staff_id' => $this->input->post('staff_id'),
		  'client_id' => $this->session->userdata('client_id'),
		  'date' => date('Y-m-d'),
		  'day'=> 'Tuesday'
		 );
		$this->db->insert('tbl_daywise',$data21);
		
		$data22 = array(
		  'start' => $this->input->post('wednesday_fn_from').':00',
		  'end' => $this->input->post('wednesday_an_to').':00',
		  'staff_id' => $this->input->post('staff_id'),
		  'client_id' => $this->session->userdata('client_id'),
		  'date' => date('Y-m-d'),
		  'day'=> 'Wednesday'
		);
		$this->db->insert('tbl_daywise',$data22); 
		
		$data23 = array(
		  'start' => $this->input->post('thursday_fn_from').':00',
		  'end' => $this->input->post('thursday_an_to').':00',
		  'staff_id' => $this->input->post('staff_id'),
		  'client_id' => $this->session->userdata('client_id'),
		  'date' => date('Y-m-d'),
		  'day'=> 'Thursday'
		);
		$this->db->insert('tbl_daywise',$data23);
		
		$data24 = array(
		 'start' => $this->input->post('friday_fn_from').':00',
		  'end' => $this->input->post('friday_an_to').':00',
		  'staff_id' => $this->input->post('staff_id'),
		  'client_id' => $this->session->userdata('client_id'),
		  'date' => date('Y-m-d'),
		  'day'=> 'Friday'
		 );
		$this->db->insert('tbl_daywise',$data24);
		
		$data25 = array(
		  'start' => $this->input->post('saturday_fn_from').':00',
		  'end' => $this->input->post('saturday_an_to').':00',
		  'staff_id' => $this->input->post('staff_id'),
		  'client_id' => $this->session->userdata('client_id'),
		  'date' => date('Y-m-d'),
		  'day'=> 'Saturday'
		);
		$this->db->insert('tbl_daywise',$data25);
		
		$data26 = array(
		  'start' => $this->input->post('sunday_fn_from').':00',
		  'end' => $this->input->post('sunday_an_to').':00',
		  'staff_id' => $this->input->post('staff_id'),
		  'client_id' => $this->session->userdata('client_id'),
		  'date' => date('Y-m-d'),
		  'day'=> 'Sunday'
		);
		$this->db->insert('tbl_daywise',$data26);
		return $this->db->insert_id();  
	}
	
	function logo_delete($client_id){
		
		$where = array('client_id' => $client_id);
		
		$this->db->select('*')->from('tbl_client')->where($where);
		$query = $this->db->get();
		$logo = $query->row()->logo;
		unlink("uploads/logo/".$logo);
		
		$this->db->set('logo','');
		$this->db->update('tbl_client');
		return true;
		 
	}
	
	public function announce_holiday($client_id) {
		$val =  str_replace('/','-',$this->input->post('appoint_date'));
		$registration_info = array(
			'leave_date' => date('Y-m-d',strtotime($val)),
			'reason' => $this->input->post('reason'),
			'NotifyEmailPatient' => '1',
			'NotifySmsPatient' => $this->input->post('NotifySmsPatient'),
			'NotifySmsPatientsm' => $this->input->post('NotifySmsPatientsm'),
			'NotifySmsPatientm' => $this->input->post('NotifySmsPatientm'),
			'client_id' => $this->session->userdata('client_id'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s')
		);
			
		$this->db->insert('announce_holiday',$registration_info);
		$profile_info = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$sms_count = $profile_info['sms_count'];
		$sms_limit = $profile_info['total_sms_limit'];
		if($this->session->userdata('client_id') != '1948'){
			$clinic_name = $profile_info['clinic_name'];
		} else {
			$clinic_name = 'SUNSHINE SUPER SPECIALITY PHYSIOTHERAPY CLINIC';
		}
		if($this->input->post('NotifySmsPatient') != ''){
				$this->db->where('appointment_from',date('Y-m-d',strtotime($this->input->post('appoint_date'))));
				$this->db->where('ai.client_id',$this->session->userdata('client_id'));
				$this->db->select('pi.first_name,pi.last_name,pi.mobile_no')->from('tbl_appointments ai');
				$this->db->join('tbl_patient_info pi','ai.patient_id=pi.patient_id');
				$res = $this->db->get();
				$id = $res->num_rows();  
				if($id > 0 && $sms_limit  > $sms_count+$id){
					foreach($res->result_array() as $row){
						$date=date('Y-m-d',strtotime($this->input->post('appoint_date')));
						$reason = $this->input->post('reason');  
						$name = $row['first_name'].' '.$row['last_name'];
						$mobile_no = $row['mobile_no'];
						$message_patient = 'Dear valued '.$name.', our '.$clinic_name.' will be closed on '.date('Y-m-d',strtotime($date)).' , in observance of '.$reason.'. Normal hours will be resume as usual on '.date('d-m-Y',strtotime($date . "+1 days")).'. We apologize for any inconvenience this may cause. Best wishes for a happy and healthy holiday season.';
				        $sms['patient'] = 'DONE';
						$patientSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=PHYSIO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$mobile_no.'&duplicateCheck=true&format=json&msg='.urlencode($message_patient);
						$patient_churl = @fopen($patientSmsURL,'r');
						$length = strlen($message_patient);
						$cost = ceil($length/160);
						fclose($patient_churl);
						if (!$patient_churl) {
						}else{
							$sms_count += $cost;  
						} 
						$this->db->where('client_id', $this->session->userdata('client_id'));
						$this->db->update('tbl_client', array('sms_count' => $sms_count));
						
					}
					
				}
			}
           		 
		
		return $this->session->userdata('client_id'); 
	}
	public function announce_holiday1($client_id) {  
		$val = implode(',',$this->input->post('patients'));
		$var = explode(',',$val);  
		$val1 =  str_replace('/','-',$this->input->post('appoint_date'));
		$registration_info = array(
			'leave_date' => date('Y-m-d',strtotime($val1)),
			'reason' => $this->input->post('reason'),
			'patient_id' =>  $val,
			'NotifyEmailPatient' => '1',
			'NotifySmsPatient' => $this->input->post('NotifySmsPatient'),
			'NotifySmsPatientsm' => $this->input->post('NotifySmsPatientsm'),
			'NotifySmsPatientm' => $this->input->post('NotifySmsPatientm'),
			'client_id' => $this->session->userdata('client_id'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s')
		);
			
		$this->db->insert('announce_holiday',$registration_info);
		$profile_info = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$sms_count = $profile_info['sms_count'];
		$sms_limit = $profile_info['total_sms_limit'];
		if($this->session->userdata('client_id') != '1948'){
			$clinic_name = $profile_info['clinic_name'];
		} else {
			$clinic_name = 'SUNSHINE SUPER SPECIALITY PHYSIOTHERAPY CLINIC';
		}
		$id = sizeof($var);
		if($this->input->post('NotifySmsPatient') != ''){
			if($id > 0 && $sms_limit  > $sms_count+$id){
				for($i=0; $i < sizeof($var); $i++){
					$this->db->where('patient_id',$var[$i]);
				   $this->db->select('first_name,mobile_no')->from('tbl_patient_info');
				   $res = $this->db->get();
				   $date=date('d-m-Y',strtotime($val1));
						$reason = $this->input->post('reason');  
						$name = $res->row()->first_name;
						$mobile_no = $res->row()->mobile_no;
						$message_patient = 'Dear valued '.$name.', our '.$clinic_name.' will be closed on '.date('d-m-Y',strtotime($date)).' , in observance of '.$reason.'. Normal hours will be resume as usual on '.date('d-m-Y',strtotime($date . "+1 days")).'. We apologize for any inconvenience this may cause. Best wishes for a happy and healthy holiday season.';
				        $sms['patient'] = 'DONE';
						$patientSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=PHYSIO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$mobile_no.'&duplicateCheck=true&format=json&msg='.urlencode($message_patient);
						 $patient_churl = @fopen($patientSmsURL,'r');
						$length = strlen($message_patient);
						$cost = ceil($length/160);
						fclose($patient_churl); 
						if (!$patient_churl) {
						}else{
							$sms_count += $cost;  
						} 
						$this->db->where('client_id', $this->session->userdata('client_id'));
						$this->db->update('tbl_client', array('sms_count' => $sms_count)); 
			    }
			}
		}
	}
	
	public function clinic_open_add($client_id) {  
		$val = implode(',',$this->input->post('patients'));
		$var = explode(',',$val);  
		$val1 =  str_replace('/','-',$this->input->post('appoint_date'));
		$registration_info = array(
			'leave_date' => date('Y-m-d',strtotime($val1)),
			'reason' => $this->input->post('reason'),
			'patient_id' =>  $val,
			'NotifyEmailPatient' => '1',
			'NotifySmsPatient' => $this->input->post('NotifySmsPatient'),
			'client_id' => $this->session->userdata('client_id'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s')
		);
			
		$this->db->insert('announce_open',$registration_info);
		$profile_info = $this->registration_model->editProfile($this->session->userdata('client_id'));
		$sms_count = $profile_info['sms_count'];
		$sms_limit = $profile_info['total_sms_limit'];
		if($this->session->userdata('client_id') != '1948'){
			$clinic_name = $profile_info['clinic_name'];
		} else {
			$clinic_name = 'SUNSHINE SUPER SPECIALITY PHYSIOTHERAPY CLINIC';
		}
		$id = sizeof($var);
		if($this->input->post('NotifySmsPatient') != ''){
			if($id > 0 && $sms_limit  > $sms_count+$id){
				for($i=0; $i < sizeof($var); $i++){
					$this->db->where('patient_id',$var[$i]);
				   $this->db->select('first_name,mobile_no')->from('tbl_patient_info');
				   $res = $this->db->get();
				   $date=date('d-m-Y',strtotime($val1));
						$reason = $this->input->post('reason');  
						$name = $res->row()->first_name;
						$mobile_no = $res->row()->mobile_no;
						//$message_patient = 'Dear valued '.$name.', our '.$clinic_name.' will be closed on '.date('d-m-Y',strtotime($date)).' , in observance of '.$reason.'. Normal hours will be resume as usual on '.date('d-m-Y',strtotime($date . "+1 days")).'. We apologize for any inconvenience this may cause. Best wishes for a happy and healthy holiday season.';
						$message_patient = 'Dear '.$name.'  '.$reason.' from '.date('d-m-Y',strtotime($date));
				        $sms['patient'] = 'DONE';
						$patientSmsURL = 'https://www.smsgateway.center/SMSApi/rest/send?userId=klakshman&password=Smsgateway@2018&senderId=PHYSIO&sendMethod=simpleMsg&msgType=TEXT&mobile='.$mobile_no.'&duplicateCheck=true&format=json&msg='.urlencode($message_patient);
						 $patient_churl = @fopen($patientSmsURL,'r');
						$length = strlen($message_patient);
						$cost = ceil($length/160);
						fclose($patient_churl); 
						if (!$patient_churl) {
						}else{
							$sms_count += $cost;  
						} 
						$this->db->where('client_id', $this->session->userdata('client_id'));
						$this->db->update('tbl_client', array('sms_count' => $sms_count)); 
			    }
			}
		}
	}
} 