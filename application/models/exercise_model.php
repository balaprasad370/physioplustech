<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exercise_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	} 
	
	public function getImages(){
		$this->db->select('*')->from('physio_ankle');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function savechart($cname){
		$pname=array();
		$imgid = array();
		foreach ($_COOKIE as $key=>$val)
		{
			if(stristr($key,'imgid') ){
				$imgid[]=$key;
				$pname[]= $val;
			}
		}
		for($i=0;$i<sizeof($pname);$i++){
			$chartInfo = array(
					'client_id' => $this->session->userdata('client_id'),
					'chart_name' => $cname,
					'img_path' => $pname[$i],
					'img_name' => $imgid[$i],
				);
				$this->db->insert('exs_chart', $chartInfo);
		} 
	}
	public function get_model()
	{

	}
	public function getChart(){
		$this->db->select('*')->from('exs_chart');
		$this->db->group_by('chart_name');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getchartname1(){
		$this->db->select('chart_name,chard_no')->from('save_privatechart');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function loadchart($cname){
		$this->load->helper('cookie');
		$this->db->select('*')->from('exs_chart');
		$this->db->where('chart_name',$cname);
		$query = $this->db->get();
		$result=($query->num_rows() > 0) ? $query->result_array() : false;
		
		foreach($result as $totcook){
			setcookie($totcook['img_name'],$totcook['img_path'],time()+3600,'/');
		}
	}
	
	public function getimage_ankle($id)
	{
		$where = array('path' => $id );
		$this->db->select('*')->from('physio_ankle');
		$this->db->where($where);
		$this->db->group_by('path');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getimage_lumber($id)
	{
		$where = array('path' => $id );
		$this->db->select('*')->from('physio_lumbar');
		$this->db->where($where);
		$this->db->group_by('path');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getimage_shoulder($id)
	{
		$where = array('path' => $id );
		$this->db->select('*')->from('physio_shoulder');
		$this->db->where($where);
		$this->db->group_by('path');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getimage_special($id)
	{
		$where = array('path' => $id );
		$this->db->select('*')->from('physio_special');
		$this->db->where($where);
		$this->db->group_by('path');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function getimage_cervical($id)
	{
		$where = array('path' => $id );
		$this->db->select('*')->from('physio_cervical');
		$this->db->where($where);
		$this->db->group_by('path');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function getimage_education($id)
	{
		$where = array('path' => $id );
		$this->db->select('*')->from('physio_education');
		$this->db->where($where);
		$this->db->group_by('path');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function getimage_elbow($id)
	{
		$where = array('path' => $id );
		$this->db->select('*')->from('physio_elbow');
		$this->db->where($where);
		$this->db->group_by('path');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function getimage_hip($id)
	{
		$where = array('path' => $id );
		$this->db->select('*')->from('physio_hipknee');
		$this->db->where($where);
		$this->db->group_by('path');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function saveloadchart()
	{
		if($this->input->post('chartno') != false){
			$chart_name = $this->input->post('chart_name');
			$chart_no = $this->input->post('chartno');
			$chid = $this->input->post('chart_id');
			$verifycode = $this->input->post('verifycode');
			$descr1 = $this->input->post('descr1');
			$repeat1 = $this->input->post('repeat1');
			$hold1 = $this->input->post('hold1');
			$complete1 = $this->input->post('complete1');
			for($i=0;$i<sizeof($chid);$i++){
				$chartInfo = array(
						'arrange_no' => $i+1,
						'img_description' => $descr1[$i],
						'repet' => $repeat1[$i],
						'hold' => $hold1[$i],
						'complete' => $complete1[$i],
						
					);
					$where = array('chard_no' => $chart_no,'client_id' => $this->session->userdata('client_id'),'chart_id'=> $chid[$i]);
					$this->db->where($where);
					$this->db->update('save_chart', $chartInfo);
			 }
			
			
			$path = $this->input->post('path');
			$title = $this->input->post('title');
			$descr = $this->input->post('descr');
			$repeat = $this->input->post('repeat');
			$hold = $this->input->post('hold');
			$complete = $this->input->post('complete');
			for($i=0;$i<sizeof($descr);$i++){
			$val = intval($i+1) + intval(sizeof($chid));
			$chartInfo = array(
					'arrange_no' => $val,
					'client_id' => $this->session->userdata('client_id'),
					'chart_name' => $chart_name,
					'chard_no' => $chart_no,
					'verifycode'=> $verifycode,
					'img_path' => $path[$i],
					'title' => $title[$i],
					'img_description' => $descr[$i],
					'repet' => $repeat[$i],
					'hold' => $hold[$i],
					'complete' => $complete[$i],
				
			);
			$this->db->insert('save_chart', $chartInfo);
		  }
		  $data = array(
			 'chart_name' => $chart_no,
		  );
		  $this->session->unset_userdata($data);
			 
		
		} else {
		$chart_no = $this->generate_code();
		$cname=$this->input->post('cname');
		$path = $this->input->post('path');
		$title = $this->input->post('title');
		$descr = $this->input->post('descr');
		$repeat = $this->input->post('repeat');
		$hold = $this->input->post('hold');
		$complete = $this->input->post('complete');
		
		$exes_code = $this->exes_code();
		for($i=0;$i<sizeof($path);$i++){
			$chartInfo = array(
			        'arrange_no' => $i+1,
					'client_id' => $this->session->userdata('client_id'),
					'chart_name' => $cname,
					'chard_no' => $chart_no,
					'verifycode'=> $exes_code,
					'img_path' => $path[$i],
					'title' => $title[$i],
					'img_description' => $descr[$i],
					'repet' => $repeat[$i],
					'hold' => $hold[$i],
					'complete' => $complete[$i],
				
			);
			$this->db->insert('save_chart', $chartInfo);
		} 
	  }		
	}
	public function generate_code() {
		$string  = 'C' ;
		$this->db->select('chard_no')->from('save_chart')->like('chard_no', $string, 'after'); 
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $string . ($query->num_rows() + 1);
		} else {
			return $string . '1';
		}
	}
	
	public function getalllist(){
		$this->db->select('*')->from('save_chart');
		$this->db->group_by('chart_name');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function get_list(){
		$this->db->select('*')->from('exs_chart');
		$this->db->group_by('chart_name');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	
	public function getcharts($cno){
		$this->db->select('*')->from('save_chart');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('chard_no',$cno);
		$this->db->order_by('arrange_no','asc');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function getdefault_chart($cno){
		$this->db->select('*')->from('default_chart');
		//$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('chard_no',$cno);
		$this->db->order_by('arrange_no','asc');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function get_privatecharts($cno){
		$this->db->select('*')->from('save_privatechart');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('chard_no',$cno);
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function savechage($chart_no){
		$chid = $this->input->post('chart_id');
		$descr = $this->input->post('descr');
		$repeat = $this->input->post('repeat');
		$hold = $this->input->post('hold');
		$complete = $this->input->post('complete');
		$perform = $this->input->post('perform');
		$path = $this->input->post('path');
		$time = $this->input->post('time');
		for($i=0;$i<sizeof($descr);$i++){
			$where = array('chard_no' => $chart_no,'client_id' => $this->session->userdata('client_id'),'chart_id'=> $chid[$i]);
			$chartInfo = array(
			        'chart_name'=>$this->input->post('chart_name'),
					'img_description' => $descr[$i],
					'repet' => $repeat[$i],
					'hold' => $hold[$i],
					'complete' => $complete[$i],
					'img_path' => $path[$i],
					
			);
			$this->db->where($where);
			$this->db->update('save_chart', $chartInfo);
		}
	}
	public function countlist()
	{
		$this->db->group_by("chard_no"); 
		$this->db->select('*')->from('save_chart')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->result_array(): false;
	}
	
	public function exexstatus(){
		$this->db->select('*')->from('tbl_client');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('exes_chart',1);
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function exes_code() {
		$query=$this->db->query("select IFNULL(max(substr(verifycode,1,6))+1,1) EMAIL_VERIFICATION_CODE from save_chart");
		$row = $query->row_array();
		$string  = date('Y-m-d H:i:s').$row['EMAIL_VERIFICATION_CODE'];
		
		return md5($string);
	}
	public function save_charts($cname){
		$this->db->select('*')->from('exs_chart');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('chart_name',$cname);
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getimage_privateankle($id)
	{
		
		$where = array('path' => $id);
		$this->db->select('*')->from('private_ankle');
		$this->db->where($where);
		$this->db->group_by('path');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getimage_privatecervical($id)
	{
		$where = array('path' => $id );
		$this->db->select('*')->from('private_cervical');
		$this->db->where($where);
		$this->db->group_by('path');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getimage_privateeducation($id)
	{
		$where = array('path' => $id );
		$this->db->select('*')->from('private_education');
		$this->db->where($where);
		$this->db->group_by('path');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getimage_privateelbow($id)
	{
		$where = array('path' => $id );
		$this->db->select('*')->from('private_elbow');
		$this->db->where($where);
		$this->db->group_by('path');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getimage_privatehip($id)
	{
		$where = array('path' => $id );
		$this->db->select('*')->from('private_hip');
		$this->db->where($where);
		$this->db->group_by('path');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getimage_privatelumbar($id)
	{
		$where = array('path' => $id );
		$this->db->select('*')->from('private_lumbar');
		$this->db->where($where);
		$this->db->group_by('path');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getimage_privatespecial($id)
	{
		$where = array('path' => $id );
		$this->db->select('*')->from('private_special');
		$this->db->where($where);
		$this->db->group_by('path');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getimage_privateshoulder($id)
	{
		$where = array('path' => $id );
		$this->db->select('*')->from('private_shoulder');
		$this->db->where($where);
		$this->db->group_by('path');
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function save_privatechart()
	{
		$chart_no = $this->generate_code1();
		$cname=$this->input->post('cname');
		$path = $this->input->post('path');
		$title = $this->input->post('title');
		$descr = $this->input->post('descr');
		$repeat = $this->input->post('repeat');
		$hold = $this->input->post('hold');
		$complete = $this->input->post('complete');
		$perform = $this->input->post('perform');
		$time = $this->input->post('time');
		$exes_code = $this->exes_code();
		for($i=0;$i<sizeof($path);$i++){
			$chartInfo = array(
					'client_id' => $this->session->userdata('client_id'),
					'chart_name' => $cname,
					'chard_no' => $chart_no,
					'verifycode'=> $exes_code,
					'img_path' => $path[$i],
					'title' => $title[$i],
					'img_description' => $descr[$i],
					'repet' => $repeat[$i],
					'hold' => $hold[$i],
					'complete' => $complete[$i],
					'perform' => $perform[$i],
					'time' => $time[$i],
			);
			$this->db->insert('save_privatechart', $chartInfo);
		}   
	}
	public function generate_code1() {
		$string  = 'C' ;
		$this->db->select('chard_no')->from('save_privatechart')->where('client_id',$this->session->userdata('client_id'))->like('chard_no', $string, 'after'); 
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $string . ($query->num_rows() + 1);
		} else {
			return $string . '1';
		}
	}
	public function delete_privatechart($chartno){
		$where = array('client_id' => $this->session->userdata('client_id'),'chard_no' => $chartno);
		$this->db->where($where);
		$this->db->delete('save_privatechart');
	}
	public function delete_chart($chartno){
		$where = array('client_id' => $this->session->userdata('client_id'),'chard_no' => $chartno);
		$this->db->where($where);
		$this->db->delete('save_chart');
		
		$where = array('client_id' => $this->session->userdata('client_id'),'chart_no' => $chartno);  
		$this->db->where($where);
		$this->db->delete('prescription_detail');
	}
	public function countlist1()
	{
		$this->db->group_by("chard_no"); 
		$this->db->select('*')->from('save_privatechart')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->result_array(): false;
	}
	 
	public function getchartname(){
		$this->db->where('client_id', $this->session->userdata('client_id'));
		$this->db->select('chart_name,verifycode,chard_no')->from('save_chart');
		$this->db->distinct();
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array(): false;

	}
    public function delete_exercise($chart_id) {
		$this->db->where('chart_id',$chart_id);
		$this->db->delete('save_chart');
		return true;
	}
	public function send_sms($patient_name,$chartname,$patient_id,$client_id) {
		$this->db->where('client_id',$client_id);
		$this->db->select('first_name,total_sms_limit,sms_count,clinic_name')->from('tbl_client');		
		$res = $this->db->get();
		$name = $res->row()->clinic_name;
		$doc_name = $res->row()->first_name;
		$sms_count = $res->row()->sms_count;
		$this->db->where('patient_id',$patient_id);
		$this->db->select('mobile_no')->from('tbl_patient_info');		
		$res1 = $this->db->get();
		$mobile_no = $res1->row()->mobile_no;
		$date = date('d-m-Y');
		$url = "https://play.google.com/store/apps/developer?id=PHYSIO%20PLUS&hl=en";
			$message_patient = 'Dear '.$patient_name.',You have received Exercise Prescription from '.$doc_name.' of '.$name.' on '.$date;
			$sms['patient'] = 'DONE';
			if($client_id != '1636'){
				$patientSmsURL = 'http://www.smsgatewaycenter.com/library/send_sms_2.php?UserName=klakshman&Password=Smspwd@2016&Type=Individual&To='.$mobile_no.'&Mask=PHYSIO&Message='.urlencode($message_patient);
				$patient_churl = @fopen($patientSmsURL,'r');
			//	fclose($patient_churl);
				if (!$patient_churl) {
					// do nothing
				} else {
					$sms_count += 1;
				}
				} else {
				$patientSmsURL = 'http://smsindia.techmartonline.com/api/sendhttp.php?authkey=136791ASgfUVtgugG15874a756&mobiles='.$mobile.'&message='.urlencode($message_patient).'&sender=PHPLUS&route=4&country=0';
				$patient_churl = @fopen($patientSmsURL,'r');
				//fclose($patient_churl);
				$sms_count += 1;
			}
			$this->db->where('client_id', $client_id);
			$this->db->update('tbl_client', array('sms_count' => $sms_count));
		
	}	
	public function ankle_position(){
		$this->db->select('t_position,id')->from('private_ankle');
		$this->db->where('t_position IS NOT NULL', null, false);
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array(): false;
	}
	public function cervical_position(){
		$this->db->select('t_position,id')->from('private_cervical');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('t_position IS NOT NULL', null, false);
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array(): false;
	}
	public function education_position(){
		$this->db->select('t_position,id')->from('private_education');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('t_position IS NOT NULL', null, false);
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array(): false;
	}
	public function special_position(){
		$this->db->select('t_position,id')->from('private_special');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('t_position IS NOT NULL', null, false);
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array(): false;
	}
	public function elbow_position(){
		$this->db->select('t_position,id')->from('private_elbow');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('t_position IS NOT NULL', null, false);
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array(): false;
	}
	public function hip_position(){
		$this->db->select('t_position,id')->from('private_hip');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('t_position IS NOT NULL', null, false);
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array(): false;
	}
	public function lumbar_position(){
		$this->db->select('t_position,id')->from('private_lumbar');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('t_position IS NOT NULL', null, false);
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array(): false;
	}
	public function shoulder_position(){
		$this->db->select('t_position,id')->from('private_shoulder');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('t_position IS NOT NULL', null, false);
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array(): false;
	}
	public function public_delete($patient_id){
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('chard_no',$patient_id);
		$this->db->delete('save_chart');
		
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('chart_no',$patient_id);
		$this->db->delete('prescription_detail');
		return $patient_id;
	}
	public function private_delete($patient_id){  
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('chard_no',$patient_id);
		$this->db->delete('save_privatechart');
		
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('status','private');
		$this->db->where('chart_no',$patient_id);
		$this->db->delete('prescription_detail');
		return $patient_id;
	}
	public function getprivate_ankle(){
		$this->db->select('*')->from('private_ankle');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getprivate_cervical(){
		$this->db->select('*')->from('private_cervical');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getprivate_education(){
		$this->db->select('*')->from('private_education');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getprivate_elbow(){
		$this->db->select('*')->from('private_elbow');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getprivate_hip(){
		$this->db->select('*')->from('private_hip');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getprivate_lumbar(){
		$this->db->select('*')->from('private_lumbar');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getprivate_shoulder(){
		$this->db->select('*')->from('private_shoulder');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getprivate_special(){
		$this->db->select('*')->from('private_special');
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function ankle_delete($id){
		
		$where = array('id' => $id);
		
		$this->db->select('*')->from('private_ankle')->where($where);
		$query = $this->db->get();
		$img = $query->row()->path;
		
		unlink("uploads/exercise/".$img);
		
		$this->db->where($where);
		$this->db->delete('private_ankle');
	}
	public function cervical_delete($id){
		$where = array('id' => $id);
		
		$this->db->select('*')->from('private_cervical')->where($where);
		$query = $this->db->get();
		$img = $query->row()->path;
		
		unlink("uploads/exercise/".$img);
		
		$this->db->where($where);
		$this->db->delete('private_cervical');
	}
	public function education_delete($id){
		$where = array('id' => $id);
		
		$this->db->select('*')->from('private_education')->where($where);
		$query = $this->db->get();
		$img = $query->row()->path;
		
		unlink("uploads/exercise/".$img);
		
		$this->db->where($where);
		$this->db->delete('private_education');
	}
	public function elbow_delete($id){
		$where = array('id' => $id);
		
		$this->db->select('*')->from('private_elbow')->where($where);
		$query = $this->db->get();
		$img = $query->row()->path;
		
		unlink("uploads/exercise/".$img);
		
		$this->db->where($where);
		$this->db->delete('private_elbow');
	}
	public function hip_delete($id){
		$where = array('id' => $id);
		
		$this->db->select('*')->from('private_hip')->where($where);
		$query = $this->db->get();
		$img = $query->row()->path;
		
		unlink("uploads/exercise/".$img);
		
		$this->db->where($where);
		$this->db->delete('private_hip');
	}
	public function lumbar_delete($id){
		$where = array('id' => $id);
		
		$this->db->select('*')->from('private_lumbar')->where($where);
		$query = $this->db->get();
		$img = $query->row()->path;
		
		unlink("uploads/exercise/".$img);
		
		$this->db->where($where);
		$this->db->delete('private_lumbar');
	}
	public function shoulder_delete($id){
		$where = array('id' => $id);
		
		$this->db->select('*')->from('private_shoulder')->where($where);
		$query = $this->db->get();
		$img = $query->row()->path;
		
		unlink("uploads/exercise/".$img);
		
		$this->db->where($where);
		$this->db->delete('private_shoulder');
	}
	public function special_delete($id){
		$where = array('id' => $id);
		
		$this->db->select('*')->from('private_special')->where($where);
		$query = $this->db->get();
		$img = $query->row()->path;
		
		unlink("uploads/exercise/".$img);
		
		$this->db->where($where);
		$this->db->delete('private_special');
	}
}
	