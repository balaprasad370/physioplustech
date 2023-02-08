<?php 
/** File name   : dashboard.php
*	Author      : Muthukumar
*	Date        : 27th Mar 2013
*	Description : Controller for physioplus client dashboard.
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Confirmation extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model(array('common_model','appoinment_model','patient_model','invoice_model','registration_model','staff_model','advance_model','anotherdb_model'));
	}
	public function upgrade_plan() {
		$c_id = $this->uri->segment('3');
		$data['val'] = $this->uri->segment('4');
		$data['duration'] = $this->uri->segment('4');
		$data['user'] = $this->uri->segment('5');
		$data['num_location'] = $this->uri->segment('6');
		$data['plan'] = $this->uri->segment('8');
		$data['total_sms_limit'] = $this->uri->segment('7');  
		$data['clientDetails'] = $this->registration_model->editProfile($c_id);
		//$this->load->view('client/upgrade',$data);	
		$html = $this->load->view('client/upgrade',$data,true);	
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
	public function upgrade_user() {
		$c_id = $this->uri->segment('3');
		$data['clientDetails'] = $this->registration_model->editProfile($c_id);
		$data['user'] = $this->uri->segment('4');
		$html = $this->load->view('client/upgrade_user',$data,true);
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
	public function upgrade_domainreg() {
		$c_id = $this->uri->segment('3');
		$data['clientDetails'] = $this->registration_model->editProfile($c_id);
		$this->db->where('client_id',$c_id);
		$this->db->select('duration,price')->from('tbl_domains');
		$res = $this->db->get();
		$data['duration'] = $res->row()->duration;
		$data['price'] = $res->row()->price;
		$html = $this->load->view('client/upgrade_user',$data,true);
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
	public function upgrade_location() {
		$c_id = $this->uri->segment('3');
		$data['clientDetails'] = $this->registration_model->editProfile($c_id);
		$this->db->where('client_id',$c_id);
		$data['num_location'] = $this->uri->segment('4');
		$html = $this->load->view('client/upgrade_loc',$data,true);
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
	public function upgrade_transaction() {    
		$c_id = $this->uri->segment('3');
		$data['clientDetails'] = $this->registration_model->editProfile($c_id);
		$data['total_sms_limit'] = $this->uri->segment('4');
		$html = $this->load->view('client/upgrade_transaction',$data,true);
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
	public function upgrade_promotion() {
		$c_id = $this->uri->segment('3');
		$data['clientDetails'] = $this->registration_model->editProfile($c_id);
		$this->db->where('client_id',$c_id);
		$this->db->select('psms_limit')->from('tbl_validity');
		$res = $this->db->get();
		$data['psms_limit'] = $this->uri->segment('4');
		$html = $this->load->view('client/upgrade_promotion',$data,true);
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
	 public function upgrade_domain() {
		$c_id = $this->uri->segment('3');
		$data['clientDetails'] = $this->registration_model->editProfile($c_id);
		$data['price'] =  $this->uri->segment('5');
		$data['duration'] =  $this->uri->segment('4');
		$html = $this->load->view('client/upgrade_domain',$data,true);
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
	public function upgrade_exercise() {
		$c_id = $this->uri->segment('3');
		$data['amount'] = $this->uri->segment('4');
		$data['order'] = $this->uri->segment('5');
		$data['clientDetails'] = $this->registration_model->editProfile($c_id);
		$this->db->where('client_id',$c_id);
		$html = $this->load->view('client/upgrade_exercise',$data,true);
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
	public function events_invoice(){
		$c_id = $this->uri->segment(3);
		$ticket_no = $this->uri->segment(4);
		$event_id = $this->uri->segment(5);
		$price_id = $this->uri->segment(6);
		$delegate1 = $this->uri->segment(7);
		$delegate2 = $this->uri->segment(8); 
		$this->legacy_db = $this->load->database('second', true);
		if($delegate1 == '' &&  $delegate2 == '') {
			$this->legacy_db->where('event_id',$event_id);
			$this->legacy_db->where('price_id',$price_id);
			$this->legacy_db->select('price,ticket_name')->from('tbl_price');
			$query=$this->legacy_db->get();
			$amount = $query->row()->price;
			$ticket_name = $query->row()->ticket_name;
		} else if($delegate1 == '' ) {
			$this->legacy_db->where('event_id',$event_id);
			$this->legacy_db->where('conference','PostConference');
			$this->legacy_db->where('topic',str_replace('%20',' ',$delegate2));
			$this->legacy_db->select('price')->from('tbl-preconference');
			$query=$this->legacy_db->get();
			$amount = $query->row()->price;
		} else {
			$this->legacy_db->where('event_id',$event_id);
			$this->legacy_db->where('conference','Preconference');
			$this->legacy_db->where('topic',str_replace('%20',' ',$delegate1));
			$this->legacy_db->select('price')->from('tbl-preconference');
			$query=$this->legacy_db->get();
			$amount = $query->row()->price;
		}
		if($delegate1 != '' ||  $delegate2 != '') {
			$this->legacy_db->where('event_id',$event_id);
			$this->legacy_db->where('delegate_name',str_replace('%20',' ',$delegate));
			$this->legacy_db->where('date >=',date('Y-m-d'));
			$this->legacy_db->select('price')->from('tbl-pricelist');
			$query=$this->legacy_db->get();
			$value = $query->row()->price;
		} else {
			$value = '0';
		}
		 
		$price = $amount + $value; 
		 
		$this->legacy_db->where('ei.event_id',$event_id);
		$this->legacy_db->select('ei.start_date,vi.venue_name')->from('tbl_event ei');
		$this->legacy_db->join('tbl_venue vi','ei.venue_id = vi.venue_id');
		$query = $this->legacy_db->get();
		$data['s_date'] = $query->row()->start_date;
		$data['venue'] = $query->row()->venue_name;
		$data['delegatename'] = $ticket_name;
		$amount = $price * $ticket_no;
		
		$delegate = $ticket_name;
		
		$this->legacy_db->where('ei.event_id',$event_id);
		$this->legacy_db->select('oi.name,oi.website,oi.email')->from('tbl_organizer oi');
		$this->legacy_db->join('tbl_event_organizer ei','oi.org_id = ei.org_id');
		$query=$this->legacy_db->get();
		if($query->result_array() != false){
		$data['website'] = $query->row()->website;
		$data['e_id'] = $query->row()->email;
		$data['name'] = $query->row()->name;
		$email = $query->row()->email;
		$name = $query->row()->name;
		} else {
			$this->legacy_db->where('event_id',$event_id);
			$this->legacy_db->select('ui.website,ui.first_name,ui.last_name,ui.email')->from('tbl_event ei');
			$this->legacy_db->join('tbl_user ui','ei.client_id = ui.client_id');
		    $query=$this->legacy_db->get();
			$data['website'] = $query->row()->website;
			$data['e_id'] = $query->row()->email;
			$data['name'] = $query->row()->first_name.' '.$query->row()->last_name;
			$email = $query->row()->email;
			$name = $query->row()->first_name.' '.$query->row()->last_name;
		}			
		$data=array(
		'paid_date' => date('Y-m-d'),
		'event_id' => $event_id,
		'user_id' => $c_id,
		'ticket_per_rate' => $price,
		'delegate_type' => $delegate,
		'pre_conference' => $delegate1,
		'post_conference' => $delegate2,
		'no_tickets' => $ticket_no
		);
		$this->legacy_db->insert('tbl_tickets',$data);
			
		$this->legacy_db = $this->load->database('second', true);
		$this->legacy_db->where('event_id',$event_id);
		$this->legacy_db->select('event_name')->from('tbl_event');
		$query=$this->legacy_db->get();
		$eventname = $query->row()->event_name;
		
		$this->mail_model->sentpaypal_events($c_id,$amount,$eventname,$ticket_no,$event_id,$name,$email,$delegate);  
		$data = array('last_login_date' => 0,'last_login_ip' => 0,'username' => 0,'first_name' => 0,'last_name' => 0,'client_id' => 0,'plan_id' => 0,'client_login' => false,'clinic_name' => 0,'is_parent' => 0,'is_client' => false);
		$this->session->sess_destroy();
		$this->session->unset_userdata($data);
		redirect(base_url()."client/dashboard/login"); 
	  }
	public function upgrade_events() {
		$data['admit'] = $this->uri->segment('6');
		$data['event_id'] = $this->uri->segment('7');
		$event_id = $this->uri->segment('7');
		$c_id = $this->uri->segment('3');
		$data['eventname'] = $this->uri->segment('5');
		$data['delegatename'] = $this->uri->segment('8');
		$data['amount'] = $this->uri->segment('4');
		$this->legacy_db = $this->load->database('second', true);
		
		$this->legacy_db->where('event_id',$event_id);
		$this->legacy_db->select('ei.start_date,ei.start_time,ei.client_id,vi.venue_name')->from('tbl_event ei');
		$this->legacy_db->join('tbl_venue vi','ei.venue_id = vi.venue_id');
		$query=$this->legacy_db->get();
		$data['s_date'] = $query->row()->start_date;
		$data['time'] = $query->row()->start_time;
		$client_id = $query->row()->client_id;
		$data['venue'] = $query->row()->venue_name;
		$this->legacy_db->where('client_id',$client_id);
		$this->legacy_db->select('email,first_name,mobile')->from('tbl_user');
		$query=$this->legacy_db->get();
		$data['email'] = $query->row()->email;
		$data['name'] = $query->row()->first_name;
		$data['mobile'] = $query->row()->mobile;
		
		 $this->legacy_db->where('event_id',$event_id);
		$this->legacy_db->select('name,website,email')->from('tbl_organizer');
		$query=$this->legacy_db->get();
		if($query->result_array() != false){
		    $data['website'] = $query->row()->website;
		    $data['e_id'] = $query->row()->email;
		} else {
			$this->legacy_db->where('client_id',$client_id);
			$this->legacy_db->select('first_name,email,logo,website')->from('tbl_user');
			$query=$this->legacy_db->get();
			$data['name'] = $query->row()->first_name;
			$data['logo'] = $query->row()->logo;
			 $data['e_id'] = $query->row()->email;
			$data['website'] = $query->row()->website;
		}
		$html =$this->load->view('client/upgrade_events',$data,true);
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
	public function print_tickets() {
		$c_id = $this->uri->segment(3);
		$ticket_no = $this->uri->segment(4);
		$event_id = $this->uri->segment(5);
		$data['delegatename'] = $this->uri->segment(6);
		
		$this->legacy_db = $this->load->database('second', true);
		$this->legacy_db->where('event_id',$event_id);
		$this->legacy_db->select('name,email,website,organizer_logo')->from('organizer_det');
		$query=$this->legacy_db->get();
		$data['website'] = $query->row()->website;
		$data['e_id'] = $query->row()->email;
		$data['logo'] = $query->row()->organizer_logo;
		
		$this->legacy_db->where('userid',$c_id);
		$this->legacy_db->select('*')->from('users');
		$query=$this->legacy_db->get();
		$data['name'] = $query->row()->first_name;
		$data['email'] = $query->row()->email;
		$data['mobile'] = $query->row()->mobile;
			
		$this->legacy_db->select('*')->from('eventinfo');
		$query=$this->legacy_db->get();
		$price = $query->row()->price;
		$data['venue'] = $query->row()->venue;
		$eventname = $query->row()->eventname;
		$data['s_date'] = $query->row()->startdate;
		$data['time'] = $query->row()->starttime;
		$amount = $price * $ticket_no;
		$data['admit'] = $ticket_no;
		$data['amount'] = $amount;
		$data['eventname'] = $eventname;
		
		$this->legacy_db->where('event_id',$event_id);
		$this->legacy_db->where('user_id',$c_id);
		$this->legacy_db->select('currency,date,delegate_name')->from('tbl-pricelist');
		$res=$this->legacy_db->get();
		$data['currency'] = $res->row()->currency;
		$data['date'] = $res->row()->date;
		$data['clientDetails'] = $this->registration_model->editProfile($c_id);
		/* $html = $this->load->view('client/upgrade_events',$data,true);
		$this->load->library('mpdf53/mpdf');
		$this->mpdf=new mPDF('','A4','11','Calibri(Body)',15,15,16,16,9,9);
		$this->mpdf->SetDisplayMode('fullpage');
		$this->mpdf->list_indent_first_level = 0; 
		$stylesheet = file_get_contents('mpdfstyletables.css');
		$this->mpdf->WriteHTML($stylesheet,0);
		$this->mpdf->WriteHTML($html,2);
		$this->mpdf->SetFooter('Powerd By : PhysioPlustech.com');
		$this->mpdf->Output('invoice.pdf','I');  
		 *///$this->load->view('client/upgrade_events',$data);
	}
	public function print_tickets1() {
		$c_id = $this->uri->segment(3);
		$ticket_no = $this->uri->segment(4);
		$event_id = $this->uri->segment(5);
		$this->legacy_db = $this->load->database('second', true);
		$this->legacy_db->where('ei.event_id',$event_id);
		$this->legacy_db->select('ei.client_id,ei.event_name,ei.start_date,ei.start_time,vi.venue_name')->from('tbl_event ei');
		$this->legacy_db->join('tbl_venue vi','ei.venue_id = vi.venue_id');
		$query=$this->legacy_db->get();
		$data['venue'] = $query->row()->venue_name;
		$data['eventname'] = $query->row()->event_name;
		$data['s_date'] = $query->row()->start_date;
		$data['time'] = $query->row()->start_time;
		$client_id = $query->row()->client_id;
		
		$this->legacy_db = $this->load->database('second', true);
		$this->legacy_db->where('eoi.event_id',$event_id);
		$this->legacy_db->select('oi.mobile,oi.name,oi.website,oi.email')->from('tbl_organizer oi');
		$this->legacy_db->join('tbl_event_organizer eoi','oi.org_id = eoi.org_id');
		$query=$this->legacy_db->get();
		if($query -> result_array() != false){
			$data['website'] = $query->row()->website;
			$data['e_id'] = $query->row()->email;
			$data['name'] = $query->row()->name;
		} else {
			$this->legacy_db->where('client_id',$client_id);
			$this->legacy_db->select('*')->from('tbl_user');
			$query=$this->legacy_db->get();
			$data['name'] = $query->row()->first_name;
			$data['e_id'] = $query->row()->email;
			$data['website'] = $query->row()->website;
		}
		
		$this->legacy_db->where('client_id',$c_id);
		$this->legacy_db->select('email,mobile')->from('tbl_user');
		$res = $this->legacy_db->get();
		$data['email'] = $res->row()->email;
		$data['mobile'] = $res->row()->mobile;
		
		$this->legacy_db->where('user_id',$c_id);
		$this->legacy_db->select('delegate_type,paid_date,ticket_per_rate')->from('tbl_tickets');
		$res=$this->legacy_db->get();
		$price = $res->row()->ticket_per_rate;
		$data['date'] = $res->row()->paid_date;
		$data['delegatename'] = $res->row()->delegate_type;
		$amount = $price * $ticket_no;
		$data['admit'] = $ticket_no;
		$data['amount'] = $amount;
		
		$this->load->view('client/upgrade_events',$data,true);
		$html = $this->load->view('client/upgrade_events',$data,true);
		$this->load->library('mpdf53/mpdf');
		$this->mpdf=new mPDF('','A4','11','Calibri(Body)',15,15,16,16,9,9);
		$this->mpdf->SetDisplayMode('fullpage');
		$this->mpdf->list_indent_first_level = 0; 
		$stylesheet = file_get_contents('mpdfstyletables.css');
		$this->mpdf->WriteHTML($stylesheet,0);
		$this->mpdf->WriteHTML($html,2);
		$this->mpdf->SetFooter('Powerd By : PhysioPlustech.com');
		$this->mpdf->Output('invoice.pdf','I'); 
		//$this->load->view('client/upgrade_events',$data);
	}
	
}