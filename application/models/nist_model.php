<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Nist_model extends CI_Model {
		
		
		public function __construct() {
		parent::__construct();
	}
	public function check_login() {
		$this->db->select('*')->from('tbl_nist')->where('email = "'. $this->input->post('email') .'" and password = "'. $this->input->post('password') .'" and status ="'. 1 .'"');
		$result=$this->db->get();
		if($result->result_array() != false){
			   $user_data=array(
						'nist_login' => true,
						'last_login_date' => $result->row()->last_login_date,
						'last_login_ip' => $result->row()->last_login_ip,
						'email' => $result->row()->email,
						'name' => $result->row()->name,
						'id' => $result->row()->id,
						 
				);
			$this->session->set_userdata($user_data);
			$update=array('last_login_date' => date('Y-m-d H:i:s'), 'last_login_ip' => $_SERVER['REMOTE_ADDR']);
			$this->db->where('email = "'. $this->input->post('email') .'" and password = "'. $this->input->post('password') .'" and status ="'. 1 .'"');
			$this->db->update('tbl_nist',$update);
		    return $result->row()->id;
		} else {
			return false;
		}
		
	}
	public function patient_comment(){
		$data =array(
		's_id' => $this->session->userdata('id'),
		'srate1' =>  $this->input->post('srate1'),
	    'srate2' =>  $this->input->post('srate2'),
		'srate3' =>  $this->input->post('srate3'),
        'srate4' =>  $this->input->post('srate4'),
        'srate5' =>  $this->input->post('srate5'),
        'srate6' =>  $this->input->post('srate6'),
        'srate7' =>  $this->input->post('srate7'),
        'srate8' =>  $this->input->post('srate8'),
        'srate9' =>  $this->input->post('srate9'),
        'a1_comment' => $this->input->post('a1_comment'),
        'a2_comment' => $this->input->post('a2_comment'),
		'a3_comment' => $this->input->post('a3_comment'),
		'a4_comment' => $this->input->post('a4_comment'),
		'a5_comment' => $this->input->post('a5_comment'),
		'a6_comment' => $this->input->post('a6_comment'),
		'a7_comment' => $this->input->post('a7_comment'),
		'a8_comment' => $this->input->post('a8_comment'),
		'a9_comment' => $this->input->post('a9_comment'),		
		);
	   $this->db->insert('tbl_patient_comment',$data);
	   return true;
	}
	
	public function mode_comment(){
		$data =array(
		's_id' => $this->session->userdata('id'),
		'srate10' =>  $this->input->post('srate10'),
	    'srate11' =>  $this->input->post('srate11'),
		'srate12' =>  $this->input->post('srate12'),
        'srate13' =>  $this->input->post('srate13'),
        'srate14' =>  $this->input->post('srate14'),
        'srate15' =>  $this->input->post('srate15'),
        'srate16' =>  $this->input->post('srate16'),
        'srate17' =>  $this->input->post('srate17'),
        'b1_comment' => $this->input->post('b1_comment'),
        'b2_comment' => $this->input->post('b2_comment'),
		'b3_comment' => $this->input->post('b3_comment'),
		'b4_comment' => $this->input->post('b4_comment'),
		'b5_comment' => $this->input->post('b5_comment'),
		'b6_comment' => $this->input->post('b6_comment'),
		'b7_comment' => $this->input->post('b7_comment'),
		'b8_comment' => $this->input->post('b8_comment'),
		 		
		);
	   $this->db->insert('tbl_mode_comment',$data);
	   return true;
	}
	
	public function accuracy_comment(){
		$data =array(
		's_id' => $this->session->userdata('id'),
		'srate18' =>  $this->input->post('srate18'),
	    'srate19' =>  $this->input->post('srate19'),
		'srate20' =>  $this->input->post('srate20'),
        'srate21' =>  $this->input->post('srate21'),
        'srate22' =>  $this->input->post('srate22'),
        'srate23' =>  $this->input->post('srate23'),
        'srate24' =>  $this->input->post('srate24'),
        'srate25' =>  $this->input->post('srate25'),
		'srate26' =>  $this->input->post('srate26'),
		'srate27' =>  $this->input->post('srate27'),
		'srate28' =>  $this->input->post('srate28'),
        'c1_comment' => $this->input->post('c1_comment'),
        'c2_comment' => $this->input->post('c2_comment'),
		'c3_comment' => $this->input->post('c3_comment'),
		'c4_comment' => $this->input->post('c4_comment'),
		'c5_comment' => $this->input->post('c5_comment'),
		'c6_comment' => $this->input->post('c6_comment'),
		'c7_comment' => $this->input->post('c7_comment'),
		'c8_comment' => $this->input->post('c8_comment'),
		'c9_comment' => $this->input->post('c9_comment'),
		'c10_comment' => $this->input->post('c10_comment'),
		'c11_comment' => $this->input->post('c11_comment'),		
		);
	   $this->db->insert('tbl_accuracy_comment',$data);
	   return true;
	}
	
	public function availability_comment(){
		$data =array(
		's_id' => $this->session->userdata('id'),
		'd1_name' =>  $this->input->post('d1_name'),
	    'd2_name' =>  $this->input->post('d2_name'),
		'd3_name' =>  $this->input->post('d3_name'),
        'd4_name' =>  $this->input->post('d4_name'),
        'd1_comment' => $this->input->post('d1_comment'),
        'd2_comment' => $this->input->post('d2_comment'),
		'd3_comment' => $this->input->post('d3_comment'),
		'd4_comment' => $this->input->post('d4_comment'),
		 	
		);
	   $this->db->insert('tbl_availability_comment',$data);
	   return true;
	}
	
	public function inter_comment(){
		$data =array(
		's_id' => $this->session->userdata('id'),
		'e1_name' =>  $this->input->post('e1_name'),
	    'e2_name' =>  $this->input->post('e2_name'),
		'e3_name' =>  $this->input->post('e3_name'),
        'e4_name' =>  $this->input->post('e4_name'),
        'e5_name' =>  $this->input->post('e5_name'),
        'e6_name' =>  $this->input->post('e6_name'),
        'e7_name' =>  $this->input->post('e7_name'),
        'e1_comment' => $this->input->post('e1_comment'),
        'e2_comment' => $this->input->post('e2_comment'),
		'e3_comment' => $this->input->post('e3_comment'),
		'e4_comment' => $this->input->post('e4_comment'),
		'e5_comment' => $this->input->post('e5_comment'),
		'e6_comment' => $this->input->post('e6_comment'),
		'e7_comment' => $this->input->post('e7_comment'),
		 		
		);
	   $this->db->insert('tbl_inter_comment',$data);
	   return true;
	}
	
	public function recall_comment(){
		$data =array(
		's_id' => $this->session->userdata('id'),
		'f1_name' =>  $this->input->post('f1_name'),
	    'f2_name' =>  $this->input->post('f2_name'),
		'f3_name' =>  $this->input->post('f3_name'),
        'f4_name' =>  $this->input->post('f4_name'),
        'f5_name' =>  $this->input->post('f5_name'),
        'f6_name' =>  $this->input->post('f6_name'),
        'f1_comment' => $this->input->post('f1_comment'),
        'f2_comment' => $this->input->post('f2_comment'),
		'f3_comment' => $this->input->post('f3_comment'),
		'f4_comment' => $this->input->post('f4_comment'),
		'f5_comment' => $this->input->post('f5_comment'),
		'f6_comment' => $this->input->post('f6_comment'),
		  		
		);
	   $this->db->insert('tbl_recall_comment',$data);
	   return true;
	}
	
	public function feedback_comment(){
		$data =array(
		's_id' => $this->session->userdata('id'),
		'g1_name' =>  $this->input->post('g1_name'),
	    'g2_name' =>  $this->input->post('g2_name'),
		'g3_name' =>  $this->input->post('g3_name'),
        'g1_comment' => $this->input->post('g1_comment'),
        'g2_comment' => $this->input->post('g2_comment'),
		'g3_comment' => $this->input->post('g3_comment'),
		 		
		);
	   $this->db->insert('tbl_feedback_comment',$data);
	   return true;
	}
	
	public function integrity_comment(){
		$data =array(
		's_id' => $this->session->userdata('id'),
		'h1_name' =>  $this->input->post('h1_name'),
	    'h2_name' =>  $this->input->post('h2_name'),
		'h3_name' =>  $this->input->post('h3_name'),
		'h4_name' =>  $this->input->post('h4_name'),
		'h5_name' =>  $this->input->post('h5_name'),
		'h6_name' =>  $this->input->post('h6_name'),
		'h7_name' =>  $this->input->post('h7_name'),
        'h1_comment' => $this->input->post('h1_comment'),
        'h2_comment' => $this->input->post('h2_comment'),
		'h3_comment' => $this->input->post('h3_comment'),
		'h4_comment' => $this->input->post('h4_comment'),	
        'h5_comment' => $this->input->post('h5_comment'),	
        'h6_comment' => $this->input->post('h6_comment'),	
        'h7_comment' => $this->input->post('h7_comment'),			
		);
	   $this->db->insert('tbl_integrity_comment',$data);
	   return true;
	}
	
	public function visible_comment(){
		$data =array(
		's_id' => $this->session->userdata('id'),
		'i1_name' =>  $this->input->post('i1_name'),
	    'i2_name' =>  $this->input->post('i2_name'),
		'i3_name' =>  $this->input->post('i3_name'),
        'i4_name' =>  $this->input->post('i4_name'),
        'i5_name' =>  $this->input->post('i5_name'),
        'i6_name' =>  $this->input->post('i6_name'),
        'i7_name' =>  $this->input->post('i7_name'),
        'i8_name' =>  $this->input->post('i8_name'),
		'i9_name' =>  $this->input->post('i9_name'),
		'i10_name' =>  $this->input->post('i10_name'),
		'i11_name' =>  $this->input->post('i11_name'),
		'i12_name' =>  $this->input->post('i12_name'),
		'i13_name' =>  $this->input->post('i13_name'),
		'i14_name' =>  $this->input->post('i14_name'),
        'i1_comment' => $this->input->post('i1_comment'),
        'i2_comment' => $this->input->post('i2_comment'),
		'i3_comment' => $this->input->post('i3_comment'),
		'i4_comment' => $this->input->post('i4_comment'),
		'i5_comment' => $this->input->post('i5_comment'),
		'i6_comment' => $this->input->post('i6_comment'),
		'i7_comment' => $this->input->post('i7_comment'),
		'i8_comment' => $this->input->post('i8_comment'),
		'i9_comment' => $this->input->post('i9_comment'),
		'i10_comment' => $this->input->post('i10_comment'),
		'i11_comment' => $this->input->post('i11_comment'),	
        'i12_comment' => $this->input->post('i12_comment'),	
        'i13_comment' => $this->input->post('i13_comment'),	
        'i14_comment' => $this->input->post('i14_comment'),	
		 		
		);
	   $this->db->insert('tbl_visible_comment',$data);
	   return true;
	}
	
	public function form10(){
		$data =array(
		's_id' => $this->session->userdata('id'),
		'j1_name' =>  $this->input->post('j1_name'),
	    'j2_name' =>  $this->input->post('j2_name'),
		'j3_name' =>  $this->input->post('j3_name'),
        'j4_name' =>  $this->input->post('j4_name'),
        'j5_name' =>  $this->input->post('j5_name'),
        'j6_name' =>  $this->input->post('j6_name'),
        'j7_name' =>  $this->input->post('j7_name'),
        'j8_name' =>  $this->input->post('j8_name'),
		'j9_name' =>  $this->input->post('j9_name'),
		'j10_name' =>  $this->input->post('j10_name'),
		'j11_name' =>  $this->input->post('j11_name'),
		'j1_comment' => $this->input->post('j1_comment'),
        'j2_comment' => $this->input->post('j2_comment'),
		'j3_comment' => $this->input->post('j3_comment'),
		'j4_comment' => $this->input->post('j4_comment'),
		'j5_comment' => $this->input->post('j5_comment'),
		'j6_comment' => $this->input->post('j6_comment'),
		'j7_comment' => $this->input->post('j7_comment'),
		'j8_comment' => $this->input->post('j8_comment'),
		'j9_comment' => $this->input->post('j9_comment'),
		'j10_comment' => $this->input->post('j10_comment'),
		'j11_comment' => $this->input->post('j11_comment'),	
         		
		);
	   $this->db->insert('tbl_form10',$data);
	   return true;
	}
	public function form11(){
		$data =array(
		's_id' => $this->session->userdata('id'),
		'k1_name' =>  $this->input->post('k1_name'),
	    'k2_name' =>  $this->input->post('k2_name'),
		'k3_name' =>  $this->input->post('k3_name'),
        'k4_name' =>  $this->input->post('k4_name'),
        'k5_name' =>  $this->input->post('k5_name'),
        'k6_name' =>  $this->input->post('k6_name'),
        'k7_name' =>  $this->input->post('k7_name'),
        'k8_name' =>  $this->input->post('k8_name'),
		'k9_name' =>  $this->input->post('k9_name'),
		'k10_name' =>  $this->input->post('k10_name'),
		'k11_name' =>  $this->input->post('k11_name'),
		'k12_name' =>  $this->input->post('k12_name'),
		'k1_comment' => $this->input->post('k1_comment'),
        'k2_comment' => $this->input->post('k2_comment'),
		'k3_comment' => $this->input->post('k3_comment'),
		'k4_comment' => $this->input->post('k4_comment'),
		'k5_comment' => $this->input->post('k5_comment'),
		'k6_comment' => $this->input->post('k6_comment'),
		'k7_comment' => $this->input->post('k7_comment'),
		'k8_comment' => $this->input->post('k8_comment'),
		'k9_comment' => $this->input->post('k9_comment'),
		'k10_comment' => $this->input->post('k10_comment'),
		'k11_comment' => $this->input->post('k11_comment'),	
        'k12_comment' => $this->input->post('k12_comment'),		
		);
	   $this->db->insert('tbl_form11',$data);
	   return true;
	}
	public function form12(){
		$data =array(
		's_id' => $this->session->userdata('id'),
		'l1_name' =>  $this->input->post('l1_name'),
	    'l2_name' =>  $this->input->post('l2_name'),
		'l3_name' =>  $this->input->post('l3_name'),
        'l4_name' =>  $this->input->post('l4_name'),
        'l5_name' =>  $this->input->post('l5_name'),
        'l6_name' =>  $this->input->post('l6_name'),
        'l7_name' =>  $this->input->post('l7_name'),
        'l8_name' =>  $this->input->post('l8_name'),
		'l9_name' =>  $this->input->post('l9_name'),
		'l10_name' =>  $this->input->post('l10_name'),
		'l11_name' =>  $this->input->post('l11_name'),
		'l1_comment' => $this->input->post('l1_comment'),
        'l2_comment' => $this->input->post('l2_comment'),
		'l3_comment' => $this->input->post('l3_comment'),
		'l4_comment' => $this->input->post('l4_comment'),
		'l5_comment' => $this->input->post('l5_comment'),
		'l6_comment' => $this->input->post('l6_comment'),
		'l7_comment' => $this->input->post('l7_comment'),
		'l8_comment' => $this->input->post('l8_comment'),
		'l9_comment' => $this->input->post('l9_comment'),
		'l10_comment' => $this->input->post('l10_comment'),
		'l11_comment' => $this->input->post('l11_comment'),	
        
		);
	   $this->db->insert('tbl_form12',$data);
	   return true;
	}
	
	public function form13(){
		$data =array(
		's_id' => $this->session->userdata('id'),
		'm1_name' =>  $this->input->post('m1_name'),
	    'm2_name' =>  $this->input->post('m2_name'),
		'm3_name' =>  $this->input->post('m3_name'),
        'm4_name' =>  $this->input->post('m4_name'),
        'm5_name' =>  $this->input->post('m5_name'),
        'm6_name' =>  $this->input->post('m6_name'),
        'm7_name' =>  $this->input->post('m7_name'),
        'm8_name' =>  $this->input->post('m8_name'),
		'm9_name' =>  $this->input->post('m9_name'),
		'm10_name' =>  $this->input->post('m10_name'),
		'm1_comment' => $this->input->post('m1_comment'),
        'm2_comment' => $this->input->post('m2_comment'),
		'm3_comment' => $this->input->post('m3_comment'),
		'm4_comment' => $this->input->post('m4_comment'),
		'm5_comment' => $this->input->post('m5_comment'),
		'm6_comment' => $this->input->post('m6_comment'),
		'm7_comment' => $this->input->post('m7_comment'),
		'm8_comment' => $this->input->post('m8_comment'),
		'm9_comment' => $this->input->post('m9_comment'),
		'm10_comment' => $this->input->post('m10_comment'),
		 
		);
	   $this->db->insert('tbl_form13',$data);
	   return true;
	}
	
	public function form14(){
		$data =array(
		's_id' => $this->session->userdata('id'),
		'n1_name' =>  $this->input->post('n1_name'),
	    'n2_name' =>  $this->input->post('n2_name'),
		'n3_name' =>  $this->input->post('n3_name'),
        'n4_name' =>  $this->input->post('n4_name'),
        'n5_name' =>  $this->input->post('n5_name'),
        'n6_name' =>  $this->input->post('n6_name'),
        'n7_name' =>  $this->input->post('n7_name'),
        'n1_comment' => $this->input->post('n1_comment'),
        'n2_comment' => $this->input->post('n2_comment'),
		'n3_comment' => $this->input->post('n3_comment'),
		'n4_comment' => $this->input->post('n4_comment'),
		'n5_comment' => $this->input->post('n5_comment'),
		'n6_comment' => $this->input->post('n6_comment'),
		'n7_comment' => $this->input->post('n7_comment'),
		 
		);
	   $this->db->insert('tbl_form14',$data);
	   return true;
	}
	public function form15(){
		$data =array(
		's_id' => $this->session->userdata('id'),
		'o1_name' =>  $this->input->post('o1_name'),
	    'o2_name' =>  $this->input->post('o2_name'),
		'o3_name' =>  $this->input->post('o3_name'),
        'o4_name' =>  $this->input->post('o4_name'),
        'o5_name' =>  $this->input->post('o5_name'),
        'o6_name' =>  $this->input->post('o6_name'),
        'o7_name' =>  $this->input->post('o7_name'),
		'o8_name' =>  $this->input->post('o8_name'),
		'o9_name' =>  $this->input->post('o9_name'),
		'o10_name' =>  $this->input->post('o10_name'),
		'o11_name' =>  $this->input->post('o11_name'),
		'o12_name' =>  $this->input->post('o12_name'),
		'o13_name' =>  $this->input->post('o13_name'),
		'o14_name' =>  $this->input->post('o14_name'),
        'o1_comment' => $this->input->post('o1_comment'),
        'o2_comment' => $this->input->post('o2_comment'),
		'o3_comment' => $this->input->post('o3_comment'),
		'o4_comment' => $this->input->post('o4_comment'),
		'o5_comment' => $this->input->post('o5_comment'),
		'o6_comment' => $this->input->post('o6_comment'),
		'o7_comment' => $this->input->post('o7_comment'),
		'o8_comment' => $this->input->post('o8_comment'),
        'o9_comment' => $this->input->post('o9_comment'),
        'o10_comment' => $this->input->post('o10_comment'),
		'o11_comment' => $this->input->post('o11_comment'),
		'o12_comment' => $this->input->post('o12_comment'),
		'o13_comment' => $this->input->post('o13_comment'),
		'o14_comment' => $this->input->post('o14_comment'),
		);
	   $this->db->insert('tbl_form15',$data);
	   return true;
	}
	public function form16(){
		$data =array(
		's_id' => $this->session->userdata('id'),
		'p1_name' =>  $this->input->post('p1_name'),
	    'p2_name' =>  $this->input->post('p2_name'),
		'p3_name' =>  $this->input->post('p3_name'),
        'p4_name' =>  $this->input->post('p4_name'),
        'p5_name' =>  $this->input->post('p5_name'),
        'p6_name' =>  $this->input->post('p6_name'),
        'p7_name' =>  $this->input->post('p7_name'),
		'p8_name' =>  $this->input->post('p8_name'),
		'p9_name' =>  $this->input->post('p9_name'),
		'p1_comment' => $this->input->post('p1_comment'),
        'p2_comment' => $this->input->post('p2_comment'),
		'p3_comment' => $this->input->post('p3_comment'),
		'p4_comment' => $this->input->post('p4_comment'),
		'p5_comment' => $this->input->post('p5_comment'),
		'p6_comment' => $this->input->post('p6_comment'),
		'p7_comment' => $this->input->post('p7_comment'),
		'p8_comment' => $this->input->post('p8_comment'),
        'p9_comment' => $this->input->post('p9_comment'),
         
		);
	   $this->db->insert('tbl_form16',$data);
	   return true;
	}
	public function form17(){
		$data =array(
		's_id' => $this->session->userdata('id'),
		'q1_name' =>  $this->input->post('q1_name'),
	    'q2_name' =>  $this->input->post('q2_name'),
		'q3_name' =>  $this->input->post('q3_name'),
        'q4_name' =>  $this->input->post('q4_name'),
        'q5_name' =>  $this->input->post('q5_name'),
        'q6_name' =>  $this->input->post('q6_name'),
        'q7_name' =>  $this->input->post('q7_name'),
		'q8_name' =>  $this->input->post('q8_name'),
		'q9_name' =>  $this->input->post('q9_name'),
		'q10_name' =>  $this->input->post('q10_name'),
		'q11_name' =>  $this->input->post('q11_name'),
		'q12_name' =>  $this->input->post('q12_name'),
		'q1_comment' => $this->input->post('q1_comment'),
        'q2_comment' => $this->input->post('q2_comment'),
		'q3_comment' => $this->input->post('q3_comment'),
		'q4_comment' => $this->input->post('q4_comment'),
		'q5_comment' => $this->input->post('q5_comment'),
		'q6_comment' => $this->input->post('q6_comment'),
		'q7_comment' => $this->input->post('q7_comment'),
		'q8_comment' => $this->input->post('q8_comment'),
        'q9_comment' => $this->input->post('q9_comment'),
        'q10_comment' => $this->input->post('q10_comment'),
		'q11_comment' => $this->input->post('q11_comment'),
		'q12_comment' => $this->input->post('q12_comment'),
		);
	   $this->db->insert('tbl_form17',$data);
	   return true;
	}
	
	public function form18(){
		$data =array(
		's_id' => $this->session->userdata('id'),
		'r1_name' =>  $this->input->post('r1_name'),
	    'r2_name' =>  $this->input->post('r2_name'),
		'r3_name' =>  $this->input->post('r3_name'),
        'r4_name' =>  $this->input->post('r4_name'),
        'r5_name' =>  $this->input->post('r5_name'),
        'r6_name' =>  $this->input->post('r6_name'),
        'r7_name' =>  $this->input->post('r7_name'),
		'r8_name' =>  $this->input->post('r8_name'),
		'r9_name' =>  $this->input->post('r9_name'),
		'r10_name' =>  $this->input->post('r10_name'),
		'r11_name' =>  $this->input->post('r11_name'),
		'r1_comment' => $this->input->post('r1_comment'),
        'r2_comment' => $this->input->post('r2_comment'),
		'r3_comment' => $this->input->post('r3_comment'),
		'r4_comment' => $this->input->post('r4_comment'),
		'r5_comment' => $this->input->post('r5_comment'),
		'r6_comment' => $this->input->post('r6_comment'),
		'r7_comment' => $this->input->post('r7_comment'),
		'r8_comment' => $this->input->post('r8_comment'),
        'r9_comment' => $this->input->post('r9_comment'),
        'r10_comment' => $this->input->post('r10_comment'),
		'r11_comment' => $this->input->post('r11_comment'),
		
		);
	   $this->db->insert('tbl_form18',$data);
	   return true;
	}
	
	
	public function form19(){
		$data =array(
		's_id' => $this->session->userdata('id'),
		's1_name' =>  $this->input->post('s1_name'),
	    's2_name' =>  $this->input->post('s2_name'),
		's3_name' =>  $this->input->post('s3_name'),
        's4_name' =>  $this->input->post('s4_name'),
        's5_name' =>  $this->input->post('s5_name'),
        's6_name' =>  $this->input->post('s6_name'),
        's7_name' =>  $this->input->post('s7_name'),
		's1_comment' => $this->input->post('s1_comment'),
        's2_comment' => $this->input->post('s2_comment'),
		's3_comment' => $this->input->post('s3_comment'),
		's4_comment' => $this->input->post('s4_comment'),
		's5_comment' => $this->input->post('s5_comment'),
		's6_comment' => $this->input->post('s6_comment'),
		's7_comment' => $this->input->post('s7_comment'),
		
		);
	   $this->db->insert('tbl_form19',$data);
	   return true;
	}
	
	
	public function form20(){
		$data =array(
		's_id' => $this->session->userdata('id'),
		't1_name' =>  $this->input->post('t1_name'),
	    't2_name' =>  $this->input->post('t2_name'),
		't1_comment' => $this->input->post('t1_comment'),
        't2_comment' => $this->input->post('t2_comment'),
		);
	   $this->db->insert('tbl_form20',$data);
	   return true;
	}
	
	
	public function sign_add(){
		$data =array(
		'img_name' =>  $this->input->post('img_name'),
	    'id' =>  $this->session->userdata('id'),
		'date' =>date('Y-m-d')
		 
		);
	   $this->db->insert('tbl_nist_sign',$data);
	   return true;
	}
	
	}
	
	
