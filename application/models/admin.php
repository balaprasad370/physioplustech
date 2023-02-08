<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function active_user()
	{
		$this->db->select('t2.client_id,t2.created_on,t2.username,t2.password,t2.email_verified,t2.status,t1.client_id');
		$this->db->from("tbl_client t2");
		$this->db->join("tbl_validity t1", "t1.client_id=t2.client_id");
		$result = $this->db->get();
		return ($result->num_rows() > 0 ) ? $result->result_array() : false;
	}
	
	public function plan_change($client_id)
	{
		$paln_type = $_POST['plan_type'];
		$duration = $_POST['duration'];
				
		 switch ($duration)
		{
			case 30:
					$expire_date = $this->db->query('SELECT DATE_ADD(curdate(),INTERVAL 30 DAY) as expire from dual');
					break;
			case 90:
					$expire_date = $this->db->query('SELECT DATE_ADD(curdate(),INTERVAL 90 DAY) as expire from dual');
					break;
			case 180:
					$expire_date = $this->db->query('SELECT DATE_ADD(curdate(),INTERVAL 180 DAY) as expire from dual');
					break;
			case 365:
					$expire_date = $this->db->query('SELECT DATE_ADD(curdate(),INTERVAL 365 DAY) as expire from dual');
					break;
		} 
	
		foreach($expire_date->result() as $days)
		{
			$ex_date = $days->expire;
		} 
		
		$where = array('client_id' => $client_id);
		$this->db->where($where);
		$update = array('plan_type' => $paln_type, 'create_date' => date('Y-m-d'), 'duration' => $duration,'expire_date' => $ex_date);
		$this->db->update('tbl_validity',$update);
		
		$where = array('client_id' => $client_id);
		$this->db->where($where);
		$active = array('status' => 1,'plan_id' => $paln_type);
		$this->db->update('tbl_client',$active);
		//return true;
	}
	
	public function sms_change($client_id)
	{
		$sms_count = $_POST['sms_count'];
		$payment = $_POST['payment'];
		
		$where = array('client_id' => $client_id);
		$this->db->where($where);
		//$sms = array('total_sms_limit' => $sms_count );
		$this->db->set('total_sms_limit','total_sms_limit +'.$sms_count,FALSE);
		$this->db->update('tbl_client',$sms);
		
		
		$this->db->where('client_id',$client_id);
		$this->db->set('tot_pay_amount','tot_pay_amount +'.$payment,FALSE);
		$this->db->set('pay_amount','pay_amount +'.$payment,FALSE);
		$this->db->update("tbl_validity");
		//return true;
	}
	
	public function solo_change($client_id)
	{
		$plan_type = $_POST['plan_type'];
		$duration = $_POST['duration'];
		
		switch ($duration)
		{
			case 30:
					$expire_date = $this->db->query('SELECT DATE_ADD(curdate(),INTERVAL 30 DAY) as expire from dual');
					break;
			case 90:
					$expire_date = $this->db->query('SELECT DATE_ADD(curdate(),INTERVAL 90 DAY) as expire from dual');
					break;
			case 180:
					$expire_date = $this->db->query('SELECT DATE_ADD(curdate(),INTERVAL 180 DAY) as expire from dual');
					break;
			case 365:
					$expire_date = $this->db->query('SELECT DATE_ADD(curdate(),INTERVAL 365 DAY) as expire from dual');
					break;
		} 
	
		foreach($expire_date->result() as $days)
		{
			$ex_date = $days->expire;
		} 
		
		$where = array('client_id' => $client_id);
		$this->db->where($where);
		$solo_plan = array('plan_type' => $plan_type,'duration' => $duration,'create_date' => date('Y-m-d'),'expire_date' => $ex_date);
		$this->db->update('tbl_validity',$solo_plan);
		
		$plan_change = array('plan_id' => $plan_type);
		$this->db->where($where);
		$this->db->update('tbl_client',$plan_change);
	
	}
	
	public function team_change($client_id)
	{
		$plan_type = $_POST['plan_type'];
		$duration = $_POST['duration'];
		
		switch ($duration)
		{
			case 30:
					$expire_date = $this->db->query('SELECT DATE_ADD(curdate(),INTERVAL 30 DAY) as expire from dual');
					break;
			case 90:
					$expire_date = $this->db->query('SELECT DATE_ADD(curdate(),INTERVAL 90 DAY) as expire from dual');
					break;
			case 180:
					$expire_date = $this->db->query('SELECT DATE_ADD(curdate(),INTERVAL 180 DAY) as expire from dual');
					break;
			case 365:
					$expire_date = $this->db->query('SELECT DATE_ADD(curdate(),INTERVAL 365 DAY) as expire from dual');
					break;
		} 
	
		foreach($expire_date->result() as $days)
		{
			$ex_date = $days->expire;
		} 
			
		$where = array('client_id' => $client_id);
		$this->db->where($where);
		$solo_plan = array('plan_type' => $plan_type,'duration' => $duration ,'create_date' => date('Y-m-d'),'expire_date' => $ex_date);
		$this->db->update('tbl_validity',$solo_plan);
		
		$plan_change = array('plan_id' => $plan_type);
		$this->db->where($where);
		$this->db->update('tbl_client',$plan_change);
		
	}
	
	public function cluster_change($client_id)
	{
		$plan_type = $_POST['plan_type'];
		$duration = $_POST['duration'];
		$user = $_POST['users'];
		$location = $_POST['location'];
		
		$where = array('client_id' => $client_id);
		$this->db->where($where);
		$solo_plan = array('plan_type' => $plan_type,'duration' => $duration, 'num_users' => $user,'num_location'=>$location );
		$this->db->update('tbl_validity',$solo_plan);
		
		$plan_change = array('plan_id' => $plan_type);
		$this->db->where($where);
		$this->db->update('tbl_client',$plan_change);
		
		
		//return true;
	}
	
	public function chain_change($client_id)
	{
		$plan_type = $_POST['plan_type'];
		$duration = $_POST['duration'];
		$user = $_POST['users'];
		$location = $_POST['location'];
		
		$where = array('client_id' => $client_id);
		$this->db->where($where);
		$solo_plan = array('plan_type' => $plan_type,'duration' => $duration, 'num_users' => $user,'num_location'=>$location );
		$this->db->update('tbl_validity',$solo_plan);
		
		$plan_change = array('plan_id' => $plan_type);
		$this->db->where($where);
		$this->db->update('tbl_client',$plan_change);
		
		
		//return true;
	}
	
	public function institute_change($client_id)
	{
		$plan_type = $_POST['plan_type'];
		$duration = $_POST['duration'];
		$user = $_POST['users'];
		$location = $_POST['location'];
		
		$where = array('client_id' => $client_id);
		$this->db->where($where);
		$solo_plan = array('plan_type' => $plan_type,'duration' => $duration, 'num_users' => $user,'num_location'=>$location );
		$this->db->update('tbl_validity',$solo_plan);
		
		$plan_change = array('plan_id' => $plan_type);
		$this->db->where($where);
		$this->db->update('tbl_client',$plan_change);
		
		
		//return true;
	}
	
	public function rural_change($client_id)
	{
		$plan_type = $_POST['plan_type'];
		$duration = $_POST['duration'];
		$user = $_POST['users'];
		$location = $_POST['location'];
		
		
		
		$where = array('client_id' => $client_id);
		$this->db->where($where);
		$solo_plan = array('plan_type' => $plan_type,'duration' => $duration, 'num_users' => $user,'num_location'=>$location);
		$this->db->update('tbl_validity',$solo_plan);
		
		$plan_change = array('plan_id' => $plan_type);
		$this->db->where($where);
		$this->db->update('tbl_client',$plan_change);
		
		
		//return true;
	}
	
	public function payment_save($client_id)
	{
		$amount = $_POST['amount'];
		$tax = $_POST['tax'];
		$discount = $_POST['discount'];
		
		$tax1 = ($tax/100); $dicxount1 = ($discount/100);
		$tax2 = ($tax1 * $amount); $discount2 = ($discount1 * $amount);
		$tot_amount = ($amount + $tax2) - $discount2;
		
		$where = array('client_id' => $client_id);
		$this->db->where($where);
		//$pay_det = array('pay_amount' => $amount,'tax' => $tax, 'discount' => $discount,'tot_pay_amount'=>$tot_amount );
		$this->db->set('tot_pay_amount','tot_pay_amount +'.$tot_amount,FALSE);
		$this->db->set('pay_amount','pay_amount +'.$amount,FALSE);
		$this->db->set('tax',$tax);
		$this->db->set('discount',$discount);
		$this->db->update('tbl_validity');
	}
	public function add_invoicedet() {
		$id = implode(',',$_POST['item_id']);
		$qu = implode(',',$_POST['item_quantity']);
		$data = array(
			'item_id' => $id,
			'item_quantity' => $qu,
			'client_id' => $this->input->post('client_id'),
			'client_name' => $this->input->post('c_name'),
			'plan' => $this->input->post('plan_type'),
			'duration' => $this->input->post('duration'),
			'users' => $this->input->post('users'),
			'location' => $this->input->post('location'),
			'sms' => $this->input->post('t_sms'),
			'tax' => $this->input->post('tax'),
			'status' => $this->input->post('status'),
			'date' => date('Y-m-d',strtotime($this->input->post('invoice_date'))),
			'due_date' => date('Y-m-d',strtotime($this->input->post('due_date'))),
			'notes' => $this->input->post('notes'),
			'amt_type' => $this->input->post('amt_type'),
			'total_amount'=> $this->input->post('total'),
			'discount' => $this->input->post('discount'),
			'unit_priceloc' => $this->input->post('location_amt'),
			'unit_priceuse' => $this->input->post('users_amt'),
			'unit_price' => $this->input->post('unit_price')
		);
		$this->db->insert('tbl_client_invoice',$data);
		return $this->db->insert_id();
	}
	public function add_paydet() {
		$invoice_id = $this->input->post('invoice_id');
		$this->db->set('status','0');
		$this->db->where('invoice_id',$invoice_id);
		$this->db->update('tbl_client_invoice');
		
		$data = array(
			'client_id' => $this->input->post('client_id'),
			'invoice_id' => $this->input->post('invoice_id'),
			'pay_mode' => $this->input->post('pay'),
			'card_no' => $this->input->post('card_no'),
			'card_name' => $this->input->post('card_name'),
			'cheque_no' => $this->input->post('che_no'),
			'cheque_date' => date('Y-m-d'),
			'bank' => $this->input->post('bank'),
			'discount' => $this->input->post('discount'),
			'paid_amount' => $this->input->post('amount')
		);
		$this->db->insert('tbl_client_pay',$data);
		return $this->db->insert_id();
	}
	public function invoice_details($invoice_id){
		$this->db->where('invoice_id',$invoice_id);
		$this->db->select('*')->from('tbl_client_invoice');
		$result = $this->db->get();
		return ($result->num_rows() > 0 ) ? $result->row_array() : false;
	}
	
public function  email_invoice($invoice_id,$client_id) 
{
	    $this->email->from('no-reply@physioplustech.com', 'Physio Plus Tech');
		$this->db->select('first_name,email')->from('tbl_client')->where('client_id',$client_id);
		$res = $this->db->get();
		$email = $res->row()->email;
		$first_name = $res->row()->first_name;
		$this->db->select('total_amount')->from('tbl_client_invoice')->where('invoice_id',$invoice_id);
		$res = $this->db->get();
		$total = $res->row()->total_amount;
		$date = date('d/m/Y');
		$url = base_url().'physioadmin/client_det/invoices/'.$invoice_id.'/'.$client_id;
		$template = '
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="450px" align="center">
									<tr>
										<td align="center">
												<img style="float:left; width:120px; height:100px;"  src="http://physioplustech.com/front_design/color%20background%20logo.png">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Dear '.$first_name.'</p>
												</td>
												</tr>
												<tr>
												<td width="275px">
													<p style="color:#666;padding-left:25px;font-size:120%">This is a payment receipt for Invoice sent on '.$date.'.</p>
												</td>
												</tr>
												<tr>
												<td width="275px">
													<p style="color:#666;padding-left:25px;font-size:120%">Amount  : Rs '.$total.'</p>
												</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">You may review your invoice history at any time by logging in to your client area.</p>
														<p style="color:#666;padding-left:25px;font-size:120%">This is a no-reply email address. Please do not reply to this email. The sender email address is contact@physioplusnetwork.com</p>
													</td>
												</tr>
												<tr>
												<td>
												<a class="iframePopup" data-width="700" data-height="1000" id="viewReport" style="display:block;text-decoration:none;background-color:#095E9A;border:3px solid#d4d4d4;border-radius:3px;color:#fff;text-align:center; padding-top:7px;font-size:17px;margin-left:25px; width:300px; height:30px;" href=" '.$url.' ">Download the Invoice</a>
												</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://physioplustech.com/"> www.physioplustech.com</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>  
		</td>
		</tr>
		</table>
		';
		$this->email->to($email);
		$this->email->subject('Invoice has been Generated');
		$this->email->message($template);
		$this->email->send();
		
		
		$this->email->from('no-reply@physioplustech.com', 'Physio Plus Tech');
		$this->db->select('first_name,email')->from('tbl_client')->where('client_id',$client_id);
		$res = $this->db->get();
		$email = $res->row()->email;
		$first_name = $res->row()->first_name;
		$this->db->select('total_amount')->from('tbl_client_invoice')->where('invoice_id',$invoice_id);
		$res = $this->db->get();
		$total = $res->row()->total_amount;
		$date = date('d/m/Y');
		$url = base_url().'physioadmin/client_det/invoices/'.$invoice_id.'/'.$client_id;
		$template = '
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="450px" align="center">
									<tr>
										<td align="center">
												<img style="float:left; width:120px; height:100px;"  src="http://physioplustech.com/front_design/color%20background%20logo.png">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Dear '.$first_name.'</p>
												</td>
												</tr>
												<tr>
												<td width="275px">
													<p style="color:#666;padding-left:25px;font-size:120%">This is a payment receipt for Invoice sent on '.$date.'.</p>
												</td>
												</tr>
												<tr>
												<td width="275px">
													<p style="color:#666;padding-left:25px;font-size:120%">Amount  : Rs '.$total.'</p>
												</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">You may review your invoice history at any time by logging in to your client area.</p>
														<p style="color:#666;padding-left:25px;font-size:120%">This is a no-reply email address. Please do not reply to this email. The sender email address is contact@physioplusnetwork.com</p>
													</td>
												</tr>
												<tr>
												<td>
												<a class="iframePopup" data-width="700" data-height="1000" id="viewReport" style="display:block;text-decoration:none;background-color:#095E9A;border:3px solid#d4d4d4;border-radius:3px;color:#fff;text-align:center; padding-top:7px;font-size:17px;margin-left:25px; width:300px; height:30px;" href=" '.$url.' ">Download the Invoice</a>
												</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://physioplustech.com/"> www.physioplustech.com</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>  
		</td>
		</tr>
		</table>
		';
		$this->email->to('contact@physioplusnetwork.com');
		$this->email->subject('Invoice has been Generated');
		$this->email->message($template);
		$this->email->send();
    }
    public function  email_invoice1($invoice_id,$client_id) 
    {
	    $this->email->from('no-reply@physioplustech.com', 'Physio Plus Tech');
		$this->db->select('first_name,email')->from('tbl_client')->where('client_id',$client_id);
		$res = $this->db->get();
		$email = $res->row()->email;
		$first_name = $res->row()->first_name;
		$this->db->select('total_amount')->from('tbl_client_invoice')->where('invoice_id',$invoice_id);
		$res = $this->db->get();
		$total = $res->row()->total_amount;
		$date = date('d/m/Y');
		$url = base_url().'physioadmin/client_det/invoices/'.$invoice_id.'/'.$client_id;
		$this->email->from('no-reply@physioplustech.com', 'Physio Plus Tech');
		$this->db->select('first_name,email')->from('tbl_client')->where('client_id',$client_id);
		$res = $this->db->get();
		$email = $res->row()->email;
		$first_name = $res->row()->first_name;
		$this->db->select('total_amount')->from('tbl_client_invoice')->where('invoice_id',$invoice_id);
		$res = $this->db->get();
		$total = $res->row()->total_amount;
		$date = date('d/m/Y');
		$url = base_url().'physioadmin/client_det/invoices/'.$invoice_id.'/'.$client_id;
		$template = '
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="450px" align="center">
									<tr>
										<td align="center">
												<img style="float:left; width:120px; height:100px;"  src="http://physioplustech.com/front_design/color%20background%20logo.png">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
												<td width="275px">
												<p style="color:#666;padding-left:25px;font-size:120%">Dear '.$first_name.'</p>
												</td>
												</tr>
												<tr>
												<td width="275px">
													<p style="color:#666;padding-left:25px;font-size:120%">This is a payment receipt for Invoice sent on '.$date.'.</p>
												</td>
												</tr>
												
												<tr>
												<td width="275px">
													<p style="color:#666;padding-left:25px;font-size:120%">Amount  : Rs '.$total.'</p>
												</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">You may review your invoice history at any time by logging in to your client area.</p>
														<p style="color:#666;padding-left:25px;font-size:120%">This is a no-reply email address. Please do not reply to this email. The sender email address is contact@physioplusnetwork.com</p>
													</td>
												</tr>
												<tr>
												<td>
												<a class="iframePopup" data-width="700" data-height="1000" id="viewReport" style="display:block;text-decoration:none;background-color:#095E9A;border:3px solid#d4d4d4;border-radius:3px;color:#fff;text-align:center; padding-top:7px;font-size:17px;margin-left:25px; width:300px; height:30px;" href=" '.$url.' ">Download the Invoice</a>
												</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://physioplustech.com/"> www.physioplustech.com</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>  
		</td>
		</tr>
		</table>
		';
		$this->email->to('mpremkishan999@gmail.com');
		$this->email->subject('Invoice has been Generated');
		$this->email->message($template);
		$this->email->send();
	}		
	public function get_det($invoice_id) {
		$this->db->select('SUM(paid_amount) as paid_amount,pay_mode')->from('tbl_client_pay');
		$this->db->where('invoice_id',$invoice_id);
		$result = $this->db->get();
		return ($result->num_rows() > 0 ) ? $result->row_array() : false;
	}
	public function edit_payout($client_id) {
		$this->db->where('client_id',$client_id);
		$this->db->set('t_status','0');
		$this->db->update('prescription_detail');
		return true;
	}	 
	public function deactive1($client_id)
	{
		$where=array('client_id' => $client_id);
		$this->db->select('client_id')->from('tbl_client')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function deactive_account1($client_id)
	{
		$this->db->where('client_id',$client_id);
		$this->db->select('plan')->from('tbl_client');
		$res = $this->db->get();
		$plan = $res->row()->plan;
		//echo $plan;
		$this->db->where('client_id',$client_id);
		$this->db->set('status',0);
		$this->db->update('tbl_client'); 
		
		
		$this->db->select('*')->from('tbl_client');
		$this->db->where('client_id',$client_id);
		$query = $this->db->get();
		$name = $query->row()->username;
		$clinic_name = $query->row()->clinic_name;
		$city = $query->row()->city;
		$mobile = $query->row()->mobile;
		
		$this->load->library('email');
		 $this->email->initialize(array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'smtp.sendgrid.net',
		  'smtp_user' => 'physiotechasia',
		  'smtp_pass' => 'Physioasia@2019',
		  'smtp_port' => 587,
		  'crlf' => "\r\n",
		  'newline' => "\r\n",
		  'mailtype'=> 'html'
		));
		$this->email->from('no-reply@physioplustech.com', 'Physio Admin');
		$template='
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="570px" align="center">
									<tr>
										<td align="center">
											<img style="float:left;" src="http://physioplustech.com/img/logo.png">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
													<td>
														<h1 style=" font-size:24px; color:#666; padding-left:25px;">Hello Admin,</h1>
														<p style="color:#666;padding-left:25px;font-size:120%">This Account has been successfully Deactivated</p>
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">Client Name : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;"> '.$name.'</span></p>
														<p style="color:#666;padding-left:25px;font-size:120%">Clinic Name  : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$clinic_name.'</span></p>
													</td>
												</tr>
												
												
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">City : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$city.'</span></p>
														<p style="color:#666;padding-left:25px;font-size:120%">Mobile  : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$mobile.'</span></p>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://physioplustech.com/"> www.physioplustech.com</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>
		';
		 $this->email->to('contact@physioplusnetwork.com');
		$this->email->subject('Physio Admin Deactivate Account');
		$this->email->message($template);
		$this->email->send(); 
		 if($plan == '0'){
			redirect(base_url().'physioadmin/client_det/free_plan/');
		}
		 if($plan == '1'){
			redirect(base_url().'physioadmin/client_det/professional_plan/');
		}
		if($plan == '2'){
			redirect(base_url().'physioadmin/client_det/monetary_plan/');
		}
		if($plan == '3'){
			redirect(base_url().'physioadmin/client_det/enterprise_plan/');
		}
		if($plan == '4'){
			redirect(base_url().'physioadmin/client_det/ultimate_plan/');
		}  
		if($plan == '5'){
			redirect(base_url().'physioadmin/client_det/institute_plan/');
		}   
	}
	public function invoice_delete($invoice_id) {
		$this->db->where('invoice_id',$invoice_id);
		$this->db->delete('tbl_client_invoice');
		return true;
	}
	public function view_history($client_id) {
		$this->db->where('client_id',$client_id);
		$this->db->select('*')->from('tbl_client_history');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	public function deactive2($client_id)
	{
		$where=array('client_id' => $client_id);
		$this->db->select('client_id')->from('tbl_client')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function deactive_account2($client_id)
	{
		$this->db->where('client_id',$client_id);
		$this->db->select('plan')->from('tbl_client');
		$res = $this->db->get();
		$plan = $res->row()->plan;
		//echo $plan;
		$this->db->where('client_id',$client_id);
		$this->db->set('status',0);
		$this->db->update('tbl_client'); 
		
		
		$this->db->select('*')->from('tbl_client');
		$this->db->where('client_id',$client_id);
		$query = $this->db->get();
		$name = $query->row()->username;
		$clinic_name = $query->row()->clinic_name;
		$city = $query->row()->city;
		$mobile = $query->row()->mobile;
		
		$this->load->library('email');
		 $this->email->initialize(array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'smtp.sendgrid.net',
		  'smtp_user' => 'physiotechasia',
		  'smtp_pass' => 'Physioasia@2019',
		  'smtp_port' => 587,
		  'crlf' => "\r\n",
		  'newline' => "\r\n",
		  'mailtype'=> 'html'
		));
		$this->email->from('no-reply@physioplustech.com', 'Physio Admin');
		$template='
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#0099DC;">
		<tr>
		<td align="center">
		<table border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:13px; background:#0099DC;">
			<tr>
				<td>
					<table width="570px" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="570px" align="center">
									<tr>
										<td align="center">
											<img style="float:left;" src="http://physioplustech.com/img/logo.png">
										</td>
									 </tr>
									<tr>
										<td>
											<table width="570px" align="center" bgcolor="#FFFFFF">
												<tr>
													<td>
														<h1 style=" font-size:24px; color:#666; padding-left:25px;">Hello Admin,</h1>
														<p style="color:#666;padding-left:25px;font-size:120%">This Account has been successfully Deactivated</p>
													</td>
												</tr>
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">Client Name : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;"> '.$name.'</span></p>
														<p style="color:#666;padding-left:25px;font-size:120%">Clinic Name  : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$clinic_name.'</span></p>
													</td>
												</tr>
												
												
												<tr>
													<td width="275px">
														<p style="color:#666;padding-left:25px;font-size:120%">City : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$city.'</span></p>
														<p style="color:#666;padding-left:25px;font-size:120%">Mobile  : <span style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; font-size: 15px;	font-weight: bold; color: #333333;">'.$mobile.'</span></p>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<p style="text-align:center; color:#CCC;"> Powered by Physio Plus Tech, <a style="color: #ccc;" href="http://physioplustech.com/"> www.physioplustech.com</a></p>
					<p style="text-align:center; color:#CCC;">India`s First Web-based Clinic Management Software for Physiotherapists</p>
				</td>
			</tr>
		</table>
		</td>
		</tr>
		</table>
		';
		 $this->email->to('contact@physioplusnetwork.com');
		$this->email->subject('Physio Admin Deactivate Account');
		$this->email->message($template);
		$this->email->send(); 
		 /* if($plan == '0'){
			redirect(base_url().'physioadmin/client_det/free_plan/');
		}
		 if($plan == '1'){
			redirect(base_url().'physioadmin/client_det/professional_plan/');
		}
		if($plan == '2'){
			redirect(base_url().'physioadmin/client_det/monetary_plan/');
		}
		if($plan == '3'){
			redirect(base_url().'physioadmin/client_det/enterprise_plan/');
		}
		if($plan == '4'){
			redirect(base_url().'physioadmin/client_det/ultimate_plan/');
		}  
		if($plan == '5'){
			redirect(base_url().'physioadmin/client_det/institute_plan/');
		}    */
	}
	
	public function admin_count(){
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->select('num_location')->from('tbl_validity');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row()->num_location : false;
	}
	
	public function staff_count(){
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->select('count(email) as totalcount')->from('tbl_staff_info');
		$this->db->where('is_doctor','1');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function patient_count(){
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->where('app !=',1);
		$this->db->select('count(first_name) as totalcount')->from('tbl_patient_info');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function app_patient_count(){
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->where('app',1);
		$this->db->select('count(first_name) as totalcount')->from('tbl_patient_info');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function appointment_count(){
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->where('app !=',1);
		$this->db->select('count(appointment_id) as totalcount')->from('tbl_appointments');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function app_appointment_count(){
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->where('app',1);
		$this->db->select('count(appointment_id) as totalcount')->from('tbl_appointments');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function billing_count(){
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->where('app !=',1);
		$this->db->select('count(bill_id) as totalcount')->from('tbl_invoice_header');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function app_billing_count(){
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->where('app',1);
		$this->db->select('count(bill_id) as totalcount')->from('tbl_invoice_header');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function referral_count(){
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->select('count(referal_type_id) as totalcount')->from('tbl_referal');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function exercise_count(){
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->select('count(chard_no) as totalcount')->from('save_chart');
		$this->db->group_by('chard_no');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	
	public function account_verify($p_id)
	{
		$this->db->where('client_id',$p_id);
		$this->db->select('email_verified,status')->from('tbl_client');
		$res = $this->db->get();
		$email_verified = $res->row()->email_verified;
		$status = $res->row()->status;
		
		$this->db->where('client_id',$p_id);
	    if($status != '1' && $email_verified !='1') {
		$this->db->set('email_verified','1');
		$this->db->set('status','1');
		$this->db->update('tbl_client');
		}
		else {
			$this->db->set('email_verified','0');
		    $this->db->set('status','0');
		    $this->db->update('tbl_client');
		}
		
	}
	public function app_last_update(){
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->order_by('appointment_id',"desc");
		$this->db->limit(1);
		$this->db->select('gen_date')->from('tbl_appointments');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	public function patient_last_update(){
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->order_by('patient_id',"desc");
		$this->db->limit(1);
		$this->db->select('created_date')->from('tbl_patient_info');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	public function inv_last_update(){
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->order_by('bill_id',"desc");
		$this->db->limit(1);
		$this->db->select('created_date')->from('tbl_invoice_header');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	public function exe_last_update(){
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->order_by('chart_id',"desc");
		$this->db->limit(1);
		$this->db->select('date')->from('save_chart');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	public function bodychart_count(){
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->select('count(img_id) as totalcount')->from('tbl_body_chart');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function consent_count(){
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->select('count(consent_id) as totalcount')->from('tbl_consent_sign');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function user_count(){
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->select('count(user_id) as totalcount')->from('tbl_user');
		$this->db->where('status','1');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	
	public function expense_count(){
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->where('app !=',1);
		$this->db->select('bill_no,count(bill_id) as totalcount')->from('tbl_expanse');
		//$this->db->group_by('bill_no');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function app_expense_count(){
		$this->db->distinct();
		if($this->uri->segment(4) != ''){
			$this->db->where('client_id',$this->uri->segment(4));
		}
		$this->db->where('app',1);
		$this->db->select('bill_no,count(bill_id) as totalcount')->from('tbl_expanse');
		//$this->db->group_by('bill_no');
		$query=$this->db->get();
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function get_addadmin(){
		  $c_id = $this->session->userdata('client_id');
		  $this->db->where('parent_client_id',$c_id);
		  $this->db->where('status !=',0);
		  $this->db->select('client_id,branch_name')->from('tbl_client');
		  $query = $this->db->get();
		  return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getitems(){
		  $this->db->select('*')->from('admin_inv_item');
		  $query = $this->db->get();
		  return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function inv_items()
	{
		$result = array();
		$result['arrayData'] = array();
		$result['jsonData'] = array();
		// get items
		$this->db->select('*')->from('admin_inv_item');
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$result['status'] = 'success';
			foreach($query->result_array() as $item) {
				$item['id'] = $item['item_id'];
				$item['text'] = $item['item_name'];
				array_push($result['arrayData'], $item);
				$result['jsonData'][ $item['item_id'] ] = $item;
			}
			$result['message'] = 'Items has been fetched successfully';
		} else if($query->num_rows() == 0) {
			$result['status'] = 'No data';
			$result['message'] = 'No items found';
		} else {
			$result['status'] = 'failure';
			$result['message'] = 'Server error. Please try again later.';
		}
		
		return $result;
	}
	public function add_invoiceitem() {
		$data = array(
			'item_name' => $this->input->post('item_name'),
			'item_price'=>$this->input->post('item_price'),
			'created_date'=>date('Y-m-d')
		);
		$this->db->insert('admin_inv_item',$data);
		return $this->db->insert_id();
	}
	public function items_delete($invoice_id){
	  $this->db->where('item_id',$invoice_id);
	  $this->db->delete('admin_inv_item');
	}
} 