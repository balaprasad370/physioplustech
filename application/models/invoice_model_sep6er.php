<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoice_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		$this->load->model(array('patient_model','registration_model','staff_model'));
	}
	public function getExpenseCount()
	{
		$this->db->select('count(bill_id) as totalcount')->from('tbl_expanse')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	public function invoice_info() {  
		$bill_no=$this->generate_code();
		if($this->input->post('net_amt')==$this->input->post('paid_amt'))
		{
			$bill_status=1;
		}else{
			$bill_status=0;
		}
		$profileInfo = $this->registration_model->getProfileInfo($this->session->userdata('username'));
		$staffInfo = $this->staff_model->getStaffInfo($this->session->userdata('username'));
		
		if($profileInfo != false)
			$clientName = $profileInfo['first_name'].' '.$profileInfo['last_name'];
		else if($staffInfo != false)
			$clientName = $staffInfo['first_name'].' '.$staffInfo['last_name'];
		
		if($this->input->post('cheque_date') != ''){
			$cheque_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('cheque_date'))));
		}else{
			$cheque_date = '';
		}
		if(isset($_POST['is_discount_perc']) && $_POST['is_discount_perc'] == '1') 
		{
		   $discount = ($this->input->post('total_amt')* $this->input->post('discount_perc'))/100;
		} else
		{
			$discount = $this->input->post('discount_perc');
		}
		
		$invoice_info = array(
			 'client_id' => $this->session->userdata('client_id'),
			 'bill_no' => $bill_no,
			 'patient_id' => $this->input->post('patient_id'),
			 'staff_id' => $this->input->post('staff_id'),
			 'treatment_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('bill_date')))),
			 'due_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('due_date')))),
			 'inv_footer' => $this->input->post('inv_footer'),
			 'subheading' => $this->input->post('subheading'),
			 'notes' => $this->input->post('notes'),
			 'total_amt' => $this->input->post('total_amt'),
			 'tax_perc' => $this->input->post('tax_perc'),
			 'discount_perc' => $discount,
			 'net_amt' => $this->input->post('net_amt'),
			 'payment_mode' => $this->input->post('payment_mode'),
			 'paid_amt' => $this->input->post('paid_amt'),
			 'cheque_no' => $this->input->post('cheque_no'),
			 'bank' => $this->input->post('bank'),
			 'card_no' => $this->input->post('card_no'),
			 'card_name' => $this->input->post('card_name'),
			 'bank' => $this->input->post('bank'),
			 'cheque_date' => $cheque_date,
			 'bill_status' => $bill_status,
			 'generated_by' => $clientName,
			 'created_by' => $this->session->userdata('username'),
			 'created_date' => date('Y-m-d H:i:s'),
			 'modify_by' => $this->session->userdata('username'),
			 'modify_date' => date('Y-m-d H:i:s'),
		);
		
		 $this->db->insert('tbl_invoice_header', $invoice_info);
		 $bill_id=$this->db->insert_id();
		
		 if($this->input->post('appointment_id') != '0'){
			  $this->db->where('appointment_id',$this->input->post('appointment_id'));
			  $this->db->set('bill_id',$bill_id);
			  $this->db->set('bill','1');
			  $this->db->set('bill_status',$bill_status);
			  $this->db->update('tbl_appointments');
		}
		
		 if($this->input->post('payInvoice') == 1){
			 $payment_info = array(
				 'client_id' => $this->session->userdata('client_id'),
				 'bill_id' => $bill_id,
				 'payment_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('payment_date')))),
				 'payment_mode' => $this->input->post('payment_mode'),
				 'paid_amt' => $this->input->post('paid_amt'),
				 'cheque_no' => $this->input->post('cheque_no'),
				 'bank' => $this->input->post('bank'),
				 'card_no' => $this->input->post('card_no'),
				 'card_name' => $this->input->post('card_name'),
				 'cheque_date' => $cheque_date,
				 'created_by' => $this->session->userdata('username'),
				 'created_date' => date('Y-m-d H:i:s'),
				 'modify_by' => $this->session->userdata('username'),
				 'modify_date' => date('Y-m-d H:i:s'),
			 );
			
			 $this->db->insert('tbl_invoice_payments', $payment_info);
		 }
		
		
		
		 $totinv=count($_POST['item_id']);
		 $item_id=$_POST['item_id'];
		 $staff_id=$_POST['staff_id'];
		 $item_desc=$_POST['item_desc'];
		 $item_quantity=$_POST['item_quantity'];
		 $item_price=$_POST['item_price'];
		 $item_amount=$_POST['item_amount'];
		 $sno=1;
		 for($i=0; $i<$totinv; $i++)
		 {
			 $val = explode('/',$item_id[$i]);
			 if($val[0] == 'PR'){
				 $this->db->where('product_id',$val[1]);
				 $this->db->select('stack_items')->from('tbl_product_info');
				 $res = $this->db->get();
				 $c = $res->row()->stack_items;
				
				 $va = $c - $item_quantity[$i];
				 $this->db->where('product_id',$val[1]);
				 $this->db->set('stack_items',$va);
				 $this->db->update('tbl_product_info');
				
			} else {
			 }
			
			 if($item_id[$i]!='')
			 {
				 $invdtl[$i] = array(
					 'treatment_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('bill_date')))),
			         'client_id' => $this->session->userdata('client_id'),
					 'bill_id' => $bill_id,
					 's_no' => $sno,
					 'item_id' => $item_id[$i],
					 'staff_id' => $staff_id[$i],
					 'item_desc' => $item_desc[$i],
					 'item_quantity' => $item_quantity[$i],
					 'item_price' => $item_price[$i],
					 'item_amount' => $item_amount[$i],
					 'created_by' => $this->session->userdata('username'),
					 'created_date' => date('Y-m-d H:i:s'),
					 'modify_by' => $this->session->userdata('username'),
					 'modify_date' => date('Y-m-d H:i:s'),
				 );
				 $sno++;
			}
		 }
		$this->db->insert_batch('tbl_invoice_detail', $invdtl);
		
		
	}
	
	public function edit_invoice_info($bill_id) {
		$this->db->where('bill_id',$bill_id);
		$this->db->select('item_id,item_quantity')->from('tbl_invoice_detail');
		$res = $this->db->get();
		foreach($res->result_array() as $row){
			$v = explode('/',$row['item_id']);
			if($v[0] == 'PR'){
				$this->db->where('product_id',$v[1]);
				$this->db->select('stack_items')->from('tbl_product_info');
				$res = $this->db->get();
				$c = $res->row()->stack_items;
				
				$va = $c + intval($row['item_quantity']);
				$this->db->where('product_id',$v[1]);
				$this->db->set('stack_items',$va);
				$this->db->update('tbl_product_info');
				
			} else {
			}			
		}
		
		$profileInfo = $this->registration_model->getProfileInfo($this->session->userdata('username'));
		$staffInfo = $this->staff_model->getStaffInfo($this->session->userdata('username'));
		
		if($profileInfo != false)
			$clientName = $profileInfo['first_name'].' '.$profileInfo['last_name'];
		else if($staffInfo != false)
			$clientName = $staffInfo['first_name'].' '.$staffInfo['last_name'];
		
		if($this->input->post('cheque_date') != ''){
			$cheque_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('cheque_date'))));
		}else{
			$cheque_date = '';
		}
		if(isset($_POST['is_discount_perc']) && $_POST['is_discount_perc'] == '1') 
		{
		   $discount = ($this->input->post('total_amt')* $this->input->post('discount_perc'))/100;
		} else
		{
			$discount = $this->input->post('discount_perc');
		}
		$edit_invoice_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'patient_id' => $this->input->post('patient_id'),
			'staff_id' => $this->input->post('staff_id'),
			'treatment_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('bill_date')))),
			'due_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('due_date')))),
			'inv_footer' => $this->input->post('inv_footer'),
			'subheading' => $this->input->post('subheading'),
			'notes' => $this->input->post('notes'),
			'total_amt' => $this->input->post('total_amt'),
			'tax_perc' => $this->input->post('tax_perc'),
			'discount_perc' => $discount,
			'net_amt' => $this->input->post('net_amt'),
			'generated_by' => $clientName,
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);

		$where = array('bill_id' => $bill_id);
		$this->db->where($where);
		$update = $this->db->update('tbl_invoice_header',$edit_invoice_info);
		
		if($this->input->post('appointment_id') != '0'){
			 $this->db->where('appointment_id',$this->input->post('appointment_id'));
			 $this->db->set('bill_id',$bill_id);
			 $this->db->set('bill','1');
			 $this->db->update('tbl_appointments');
		}
		
		
		$this->db->where($where);
		$this->db->delete('tbl_invoice_detail');
		$totinv=count($_POST['item_id']);
		$item_id=$_POST['item_id'];
		$staff_id=$_POST['staff_id'];
		$item_desc=$_POST['item_desc'];
		$item_quantity=$_POST['item_quantity'];
		$item_price=$_POST['item_price'];
		$item_amount=$_POST['item_amount'];
		$sno=1;
		for($i=0; $i<$totinv; $i++)
		{
			$val = explode('/',$item_id[$i]);
			if($val[0] == 'PR'){
				$this->db->where('product_id',$val[1]);
				$this->db->select('stack_items')->from('tbl_product_info');
				$res = $this->db->get();
				$c = $res->row()->stack_items;
				
				$va = $c - $item_quantity[$i];
				$this->db->where('product_id',$val[1]);
				$this->db->set('stack_items',$va);
				$this->db->update('tbl_product_info');
				
			} else {
			}
			
			if($item_id[$i]!='')
			{
				$invdtl[$i] = array(
					'client_id' => $this->session->userdata('client_id'),
					's_no' => $sno,
					'bill_id' => $bill_id,
					'item_id' => $item_id[$i],
					'staff_id' => $staff_id[$i],
					'item_desc' => $item_desc[$i],
					'item_quantity' => $item_quantity[$i],
					'item_price' => $item_price[$i],
					'item_amount' => $item_amount[$i],
					'created_by' => $this->session->userdata('username'),
					'created_date' => date('Y-m-d H:i:s'),
					'modify_by' => $this->session->userdata('username'),
					'modify_date' => date('Y-m-d H:i:s'),
				);
				$sno++;
			}
		}
		$this->db->insert_batch('tbl_invoice_detail', $invdtl);
		
	}
	
	public function item_info() {
		//$img = 'http://physioplustech.com/uploads/tp_image/'.$this->input->post('tp_img');
		$img = $this->input->post('tp_img');
		$item_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'item_name' => $this->input->post('item_name'),
			'item_desc' => $this->input->post('item_desc'),
			'item_price' => $this->input->post('item_price'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
			'image' => $img,
			'image_name' => $img,
			'status'=>'1'
		);
		
		$this->db->insert('tbl_item', $item_info);
		if($this->db->insert_id()){
			$insert_id = $this->db->insert_id();
			$item_info['item_id'] = $insert_id;
			return $item_info;	
		} else {
			return false;	
		}
	}
	
	public function item_expense_info() {
		$item_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'item_name' => $this->input->post('item_name'),
			'item_desc' => $this->input->post('item_desc'),
			'item_price' => $this->input->post('item_price'),
		);
		
		$this->db->insert('tbl_expanse_client_item', $item_info);
		if($this->db->insert_id()){
			$insert_id = $this->db->insert_id();
			$item_info['item_id'] = $insert_id;
			return $item_info;	
		} else {
			return false;	
		}
	}
	
	public function fees_info() {
		$item_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'fees_name' => $this->input->post('bill_name'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
		
		$this->db->insert('tlb_bill_type', $item_info);
		if($this->db->insert_id()){
			$insert_id = $this->db->insert_id();
			$item_info['fees_id'] = $insert_id;
			return $item_info;	
		} else {
			return false;	
		}
	}
	
	public function edit_expenseitem_info($item_id) {
		$item_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'item_name' => $this->input->post('item_name'),
			'item_desc' => $this->input->post('item_desc'),
			'item_price' => $this->input->post('item_price'),
			
		);
		
		$where = array('item_id' => $item_id);
		$this->db->where($where);
		$this->db->update('tbl_expanse_client_item',$item_info);
		$data['item_id']=$item_id;
		return $data;
	}
	
	// generate patient code
	public function generate_code() {
		$string  = 'B' ;
		//$this->db->select('bill_no')->from('tbl_invoice_header')->where('client_id',$this->session->userdata('client_id'))->like('bill_no', $string, 'after'); 
		$this->db->select('bill_no')->from('tbl_invoice_header')->where('client_id',$this->session->userdata('client_id'))->like('bill_no'); 
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $string . ($query->num_rows() + 1);
		} else {
			return $string . '1';
		}
	}
	
	//edit info of invoice
	public function editInvoice($bill_id)
	{
		$where=array('bill_id' => $bill_id);
		$this->db->select('*')->from('tbl_invoice_header')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	//edit info of fees
	public function editFeesInfo($protocol_id)
	{
		$where=array('protocal_id' => $protocol_id);
		$this->db->select('*')->from('tbl_protocol_advance')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	public function editInvoiceDetail($bill_id)
	{
		 $where=array('id.bill_id' => $bill_id);
		$this->db->select('id.bill_id,id.item_desc,id.item_id,id.staff_id,id.item_quantity,id.item_price,id.item_amount');
		$this->db->from("tbl_invoice_detail id");
		$this->db->where($where);	
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	 
	   /*  $this->db->distinct();
		$where=array('tt.bill_id' => $bill_id);
		$this->db->select('it.item_id,tt.client_id,tt.treatment_id,tt.patient_id,tt.treatment_date,tt.treatments,tt.treatment_quantity,tt.treatment_price,tt.treatment_group_id,tt.bill_status,tt.staff_id,si.first_name,si.last_name,it.item_name,SUM(tt.treatment_quantity * tt.treatment_price) as item_amount,GROUP_CONCAT(it.item_name SEPARATOR " - ") AS itemName,GROUP_CONCAT(tt.treatment_quantity SEPARATOR " - ") AS item_quantity,GROUP_CONCAT(tt.treatment_price SEPARATOR " - ") AS item_price,GROUP_CONCAT(si.first_name SEPARATOR " - ") AS staffName')->from('tbl_patient_treatment_techniques tt')->where($where)->group_by("tt.treatment_group_id");
		$this->db->join("tbl_staff_info si", "tt.staff_id=si.staff_id");
		$this->db->join("tbl_item it", "tt.treatments=it.item_id");
		$this->db->order_by("tt.treatment_date", "asc");
		$this->db->group_by("tt.treatment_date");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false; */

	 
	 }
	 public function editprintDetail($bill_id)
	{
		 $where=array('id.bill_id' => $bill_id);
		$this->db->select('id.treatment_date,id.bill_id,id.item_desc,id.item_id,id.staff_id,id.item_quantity,id.item_price,id.item_amount');
		$this->db->from("tbl_invoice_detail id");
		$this->db->where($where);	
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	 
	   /*  $this->db->distinct();
		$where=array('tt.bill_id' => $bill_id);
		$this->db->select('it.item_id,tt.client_id,tt.treatment_id,tt.patient_id,tt.treatment_date,tt.treatments,tt.treatment_quantity,tt.treatment_price,tt.treatment_group_id,tt.bill_status,tt.staff_id,si.first_name,si.last_name,it.item_name,SUM(tt.treatment_quantity * tt.treatment_price) as item_amount,GROUP_CONCAT(it.item_name SEPARATOR " - ") AS itemName,GROUP_CONCAT(tt.treatment_quantity SEPARATOR " - ") AS item_quantity,GROUP_CONCAT(tt.treatment_price SEPARATOR " - ") AS item_price,GROUP_CONCAT(si.first_name SEPARATOR " - ") AS staffName')->from('tbl_patient_treatment_techniques tt')->where($where)->group_by("tt.treatment_group_id");
		$this->db->join("tbl_staff_info si", "tt.staff_id=si.staff_id");
		$this->db->join("tbl_item it", "tt.treatments=it.item_id");
		$this->db->order_by("tt.treatment_date", "asc");
		$this->db->group_by("tt.treatment_date");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false; */

	 
	 }
	
	public function editFeesDetail($protocol_id)
	{
		$where=array('protocal_id' => $protocol_id);
		$this->db->select('*')->from('tbl_protocol')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	
	
	// Delete referal
	public function delete_invoice($bill_id){
		
		$this->db->where('bill_id',$bill_id);
		$this->db->select('item_id,item_quantity')->from('tbl_invoice_detail');
		$res = $this->db->get();
		foreach($res->result_array() as $row){
			$v = explode('/',$row['item_id']);
			if($v[0] == 'PR'){
				$this->db->where('product_id',$v[1]);
				$this->db->select('stack_items')->from('tbl_product_info');
				$res = $this->db->get();
				$c = $res->row()->stack_items;
				
				$va = $c + intval($row['item_quantity']);
				$this->db->where('product_id',$v[1]);
				$this->db->set('stack_items',$va);
				$this->db->update('tbl_product_info');
				
			} else {
			}			
		}
		
		$where = array('bill_id' => $bill_id);
		
		$this->db->where($where);  
		$this->db->set('bill_id','');
		$this->db->set('bill_status','0');
		$this->db->update('tbl_patient_treatment_techniques');
		
		$this->db->where($where);
		$this->db->delete('tbl_invoice_header');
		
		$this->db->where($where);
		$this->db->delete('tbl_invoice_detail');
		
		$this->db->where($where);
		$this->db->delete('tbl_invoice_payments');
		return $bill_id;
	}
	
	//update status of invoice
	public function status_update($bill_id)
	{
		$invoiceData = $this->editInvoice($bill_id);
		$paid_amt = $invoiceData['paid_amt'];
		$final_paid_amt = $paid_amt + $this->input->post('paid_amt');
		  if($invoiceData['discount_perc'] > 0 && $this->input->post('discount_perc') > 0){
		       echo 'dssd';
			   if(isset($_POST['is_discount_perc']) && $_POST['is_discount_perc'] == '1') 
				{
				   $discount = ($invoiceData['total_amt']* $this->input->post('discount_perc'))/100;
				}
				else
				{
					$discount = $this->input->post('discount_perc');
				} 
				$discountPerc = $invoiceData['discount_perc'] + $discount;
			    $netAmt = $invoiceData['total_amt'] - $discountPerc;
		  } else if($invoiceData['discount_perc'] <= 0 && $this->input->post('discount_perc') > 0){
			   
			   if(isset($_POST['is_discount_perc']) && $_POST['is_discount_perc'] == '1') 
				{
				    $discount = ($invoiceData['total_amt']* $this->input->post('discount_perc'))/100;
				}
				else
				{
					$discount = $this->input->post('discount_perc');
				} 
               $discountPerc =  $discount;
			   $netAmt = $invoiceData['total_amt'] - $discountPerc;
		  } else {
			   $discountPerc = $invoiceData['discount_perc'];
			   $netAmt = $invoiceData['net_amt'];
		  }
		  if($this->input->post('cheque_date') != ''){
				$cheque_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('cheque_date'))));
		  } else{
				$cheque_date = '';
		  }
		   $invoice_info = array(
			'paid_amt' => $final_paid_amt,
			'net_amt' => $netAmt,
			'discount_perc' => $discountPerc,
			'payment_mode' => $this->input->post('payment_mode'),
			'cheque_no' => $this->input->post('cheque_no'),
			'bank' => $this->input->post('bank'),
			'cheque_date' => $cheque_date,
			'card_no' => $this->input->post('card_no'),
			'card_name' => $this->input->post('card_name'),
		);
		$where = array('bill_id' => $bill_id);
		$this->db->where($where);
		$this->db->update('tbl_invoice_header',$invoice_info); 
		
		
		
		$invoiceData1 = $this->editInvoice($bill_id);
		$net_amt = $invoiceData1['net_amt'];
		if($net_amt == $final_paid_amt)
		{
			$bill_status=1;
		}else{
			$bill_status=0;
		}
		
		$where = array('bill_id' => $bill_id);
		$this->db->where($where);
		$this->db->update('tbl_invoice_header',array('bill_status' => $bill_status));
		
		$this->db->where($where);
		$this->db->update('tbl_appointments',array('bill_status' => $bill_status));
		
		
		if($this->input->post('cheque_date') != ''){
			$cheque_date = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('cheque_date'))));
		}else{
			$cheque_date = '';
		}
		$payment_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'bill_id' => $bill_id,
			'payment_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('payment_date')))),
			'payment_mode' => $this->input->post('payment_mode'),
			'paid_amt' => $this->input->post('paid_amt'),
			'cheque_no' => $this->input->post('cheque_no'),
			'bank' => $this->input->post('bank'),
			'cheque_date' => $cheque_date,
			'card_no' => $this->input->post('card_no'),
			'card_name' => $this->input->post('card_name'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
		
		$this->db->insert('tbl_invoice_payments', $payment_info);
		$data['bill_id']=$bill_id;
		return $data; 
	}
	
	public function getInvoicePayments($bill_id)
	{
		$where=array('bill_id' => $bill_id);  
		$this->db->select('*')->from('tbl_invoice_payments')->where($where)->order_by('payment_date','asc');
		$query=$this->db->get();

		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function datedetail($bill_id)
	{
		$where=array('bill_id' => $bill_id);
		$this->db->select('treatment_date')->from('tbl_patient_treatment_techniques')->where($where);
		//$this->db->group_by('treatment_date');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
		
	}
		public function datedetail1($bill_id)
	{
		$where=array('bill_id' => $bill_id);
		$this->db->select('created_date')->from('tbl_invoice_detail')->where($where);
		//$this->db->group_by('created_date');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
		
	}
	public function getAdvancePayments($patient_id)
	{
		$payments = array();
		$where=array('patient_id' => $patient_id,'payment_mode' => 'Advance');
		$this->db->select('bill_id')->from('tbl_invoice_header');
		$billIds=$this->db->get();
		if($billIds != false){
			foreach($billIds as $billId){
				$data[] = $billId['bill_id'];
			}
			$Ids = implode(",",$data); 
			$this->db->select('*')->from('tbl_invoice_payments')->order_by('payment_date','asc');
			$this->db->where_in('bill_id',$Ids);
			$paymentQuery=$this->db->get();
			$payments = $paymentQuery->result_array();
		
		}
		
		return $payments; 
	}
	
	public function getInvoiceCount()
	{
		$this->db->select('count(bill_id) as totalcount')->from('tbl_invoice_header')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
		if($query->num_rows()>0)
		return ($query->num_rows()>0) ? $query->row()->totalcount : false;
	}
	
	//Invoice sent to patient email
	public function sendEmailPatient($bill_id,$client_id) {
		
		$registration_info = $this->registration_model->editProfile($client_id);
		$clinic_name = $registration_info['clinic_name'];
		$email = $registration_info['email'];
		$logo = $registration_info['logo'];
		
		$invoiceData = $this->editInvoice($bill_id);
		$patientData = $this->patient_model->editPatientinfo($invoiceData['patient_id']);
		$firstName = $patientData['first_name'];
		$lastName = $patientData['last_name'];
		$patientEmail = $patientData['email'];
		$patientName = $firstName.' '.$lastName;
		$dueDate = $invoiceData['due_date'];
		$billId = $invoiceData['bill_id'];
		$netAmt = number_format($invoiceData['net_amt'],2,'.','');
		$paidAmt = number_format($invoiceData['paid_amt'],2,'.','');
		$pendingAmt = number_format($netAmt - $paidAmt,2,'.','');
		
		$patient = array(
					'ClinicName' => ucfirst($clinic_name),
					'patientName' => ucfirst($patientName),
					'dueDate' => $dueDate,
					'billId' => $billId,
					'clientId' => $client_id,
					'netAmt' => $netAmt,
					'paidAmt' => $paidAmt,
					'pendingAmt' => $pendingAmt,
					'Logo' => $logo
				);
				// create email template
				$patientMessage = $this->mail_model->patientInvoiceTemplate($patient);
				// mail config
				$patientMailConfig = array('clinic'=> $clinic_name, 'to' => $patientEmail, 'subject' => 'Invoice From '.ucfirst($clinic_name), 'message' => $patientMessage);
				// send mail
				$this->mail_model->sendEmail($patientMailConfig);
		return $bill_id;
	}
	public function sendEmailPatient1($patient_id) {
		
		$registration_info = $this->registration_model->editProfile($patient_id);
		$clinic_name = $registration_info['clinic_name'];
		$email = $registration_info['email'];
		$logo = $registration_info['logo'];
		
		$invoiceData = $this->editInvoice($patient_id);
		$firstName = $patientData['first_name'];
		$lastName = $patientData['last_name'];
		$patientEmail = $patientData['email'];
		$patientName = $firstName.' '.$lastName;
		
		
		$patient = array(
					'ClinicName' => ucfirst($clinic_name),
					'patientName' => ucfirst($patientName),
					
					'Logo' => $logo
				);
				// create email template
				$patientMessage = $this->mail_model->patientInvoiceTemplate1($patient);
				// mail config
				$patientMailConfig = array('clinic' => $clinic_name, 'to' => $patientEmail, 'subject' => 'Report From '.ucfirst($clinic_name), 'message' => $patientMessage);
				// send mail
				$this->mail_model->sendEmail($patientMailConfig);
		return $patient_id;
	}
	
	public function addTreatmentInv($patient_id,$treatment_group_id,$treatment_date) {
		$treatmentGroupId = str_replace("_","/",$treatment_group_id);
		$where = array('tt.patient_id' => $patient_id, 'tt.treatment_group_id' => $treatmentGroupId);
		$this->db->select('*')->from('tbl_patient_treatment_techniques tt')->where($where);
		$this->db->join("tbl_item it", "it.item_id = tt.treatments");
		$treatmentQuery = $this->db->get();
		$treatmentData = ($treatmentQuery->num_rows() > 0) ? $treatmentQuery->result_array() : false;
		
		if($treatmentData != false){
			$bill_no=$this->generate_code();
			$profileInfo = $this->registration_model->getProfileInfo($this->session->userdata('username'));
			$staffInfo = $this->staff_model->getStaffInfo($this->session->userdata('username'));
			
			if($profileInfo != false)
				$clientName = $profileInfo['first_name'].' '.$profileInfo['last_name'];
			else if($staffInfo != false)
				$clientName = $staffInfo['first_name'].' '.$staffInfo['last_name'];
		$invoice_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'bill_no' => $bill_no,
			'patient_id' => $patient_id,
			'treatment_date' => $treatment_date,
			'due_date' => $treatment_date,
			'total_amt' => $this->input->post('total_amt'),
			'bill_status' => 0,
			'generated_by' => $clientName,
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
		
		$this->db->insert('tbl_invoice_header', $invoice_info);
		$bill_id=$this->db->insert_id();
				
		$sno=1;
		$i = 0;
		$itemAmount = 0;
		$totItemAmount = 0;
		foreach($treatmentData as $treatmentDatas)
		{
			if($treatmentDatas['treatment_id']!='')
			{
				$itemAmount = $treatmentDatas['treatment_quantity'] * $treatmentDatas['treatment_price'];
				$totItemAmount += $itemAmount;
				$invdtl[$i] = array(
					'client_id' => $this->session->userdata('client_id'),
					'bill_id' => $bill_id,
					's_no' => $sno,
					'item_id' => $treatmentDatas['treatments'],
					'item_desc' => $treatmentDatas['item_desc'],
					'item_quantity' => $treatmentDatas['treatment_quantity'],
					'item_price' => $treatmentDatas['treatment_price'],
					'item_amount' => $itemAmount,
					'created_by' => $this->session->userdata('username'),
					'created_date' => date('Y-m-d H:i:s'),
					'modify_by' => $this->session->userdata('username'),
					'modify_date' => date('Y-m-d H:i:s'),
				);
				$sno++;
				$i++;
			}
		}
		$this->db->insert_batch('tbl_invoice_detail', $invdtl);
		$headerWhere = array('bill_id' => $bill_id);
		$this->db->where($headerWhere);
		$this->db->update("tbl_invoice_header",array('net_amt' => $totItemAmount, 'total_amt' => $totItemAmount));
		
		$treatmentWhere = array('treatment_group_id' => $treatmentGroupId);
		$this->db->where($treatmentWhere);
		$this->db->update("tbl_patient_treatment_techniques",array('bill_status' => 1,'bill_id'=>$bill_id));
		
		return $patient_id;
		}
		
	}
	
	public function fees_info1($package)
	{
		if($package == ''){
	
			$totrow=count($_POST['fees_id']);
			$patient_id = $_POST['patient_id'];
			$admit = date('Y-m-d',strtotime(str_replace('/','-',$_POST['admit_date'])));
			$discharge =date('Y-m-d',strtotime(str_replace('/','-',$_POST['discharge_date'])));
			$totadvc=$_POST['a_amount'];
			$fees_type = $_POST['fees_id'];
			$bill_status = $_POST['bill_status'];
			$advance = $_POST['bill_amount'];
			$tot_amount = $_POST['tot_fees'];
			$package_name = $_POST['package_name'];
			$pay_mode = $_POST['payment_mode'];
			$c_no = ($_POST['card_no'] != '') ? $_POST['card_no'] : $_POST['cheque_no'] ;
			$bank_name = ($_POST['card_name'] != '')?$_POST['card_name'] : $_POST['bank'];
			$bill_no = $this->generate_ip_code();
			$tdays = $_POST['tot_date'];
			$tax = $_POST['tax'];
			$discount = $_POST['discount'];
			
			$protocol_id = mt_rand(1,200);
		
			for($i=0;$i<$totrow;$i++)
			{
				$t = ($tax/100) * $advance[$i];
				$d = ($discount/100) * $advance[$i];
				
				$fedet[$i] = array (
					'client_id' => $this->session->userdata('client_id'),
					'protocal_id'=> $protocol_id,
					'patient_id' => $patient_id,
					'fees_id' => $fees_type[$i],
					'bill_no' => $bill_no,
					'date_admit' => $admit,
					'date_discharge' => $discharge,
					'package_name' => $package_name,
					'pay_mode' => $pay_mode,
					'card_no' => $c_no,
					'bank_name' => $bank_name,
					'tot_advance' => $totadvc,
					'bill_status' => $bill_status[$i],
					'advance' => $advance[$i],
					'tax' => $t,
					'discount' => $d,
					'main_tax' => $tax,
					'main_disc' => $discount,
					'created_by' => $this->session->userdata('username'),
					'created_date' => date('Y-m-d H:i:s'),
					'modify_by' => $this->session->userdata('username'),
					'modify_date' => date('Y-m-d H:i:s'),
					
				);
				
			}
			
			$fedet1 = array(
					'client_id' => $this->session->userdata('client_id'),
					'protocal_id' => $protocol_id,
					'patient_id' => $patient_id,
					'bill_no' => $bill_no,
					'date_admit' =>  $admit,
					'date_discharge' => $discharge,
					'tot_amount' => $tot_amount,
					'tot_advance' => $totadvc,
					'bal_advance' => $totadvc,
			);
		
		
		}else{
		
			$totrow=count($_POST['p_fees']);
			$patient_id = $_POST['patient_id'];
			$admit = date('Y-m-d',strtotime(str_replace('/','-',$_POST['admit_date'])));
			$discharge =date('Y-m-d',strtotime(str_replace('/','-',$_POST['discharge_date'])));
			$totadvc=$_POST['a_amount'];
			$fees_type = $_POST['p_fees'];
			$bill_status = $_POST['p_status'];
			$advance = $_POST['p_advance'];
			$tot_amount = $_POST['tot_fees'];
			$pay_mode = $_POST['payment_mode'];
			$c_no = ($_POST['card_no'] != '') ? $_POST['card_no'] : $_POST['cheque_no'] ;
			$bank_name = ($_POST['card_name'] != '')?$_POST['card_name'] : $_POST['bank'];
			$bill_no = $this->generate_ip_code();
			$tdays = $_POST['tot_date'];
			$tax = $_POST['tax'];
			$discount = $_POST['discount'];
			
			$protocol_id = mt_rand(1,200);
			
			for($i=0;$i<$totrow;$i++)
			{
				$t = ($tax/100) * $advance[$i];
				$d = ($discount/100) * $advance[$i];
				
				$fedet[$i] = array (
					'client_id' => $this->session->userdata('client_id'),
					'protocal_id'=> $protocol_id,
					'patient_id' => $patient_id,
					'fees_id' => $fees_type[$i],
					'bill_no' => $bill_no,
					'date_admit' => $admit,
					'date_discharge' => $discharge,
					'pay_mode' => $pay_mode,
					'card_no' => $c_no,
					'bank_name' => $bank_name,
					'tot_advance' => $totadvc,
					'bill_status' => $bill_status[$i],
					'advance' => $advance[$i],
					'tax' => $t,
					'discount' => $d,
					'main_tax' => $tax,
					'main_disc' => $discount,
					'created_by' => $this->session->userdata('username'),
					'created_date' => date('Y-m-d H:i:s'),
					'modify_by' => $this->session->userdata('username'),
					'modify_date' => date('Y-m-d H:i:s'),
					
				);
				
			}
			
			
			$fedet1 = array(
					'client_id' => $this->session->userdata('client_id'),
					'protocal_id' => $protocol_id,
					'patient_id' => $patient_id,
					'bill_no' => $bill_no,
					'date_admit' =>  $admit,
					'date_discharge' => $discharge,
					'tot_amount' => $tot_amount,
					'tot_advance' => $totadvc,
					'bal_advance' => $totadvc,
			);
		
		
		} 
		
		$this->db->insert_batch('tbl_protocol', $fedet);
		
		$this->db->insert('tbl_protocol_advance', $fedet1);
	}
	
	public function fees_infoedit($protocol_id)
	{
		$p_id = $_POST['protocol_id'];
		$d_date = date('Y-m-d',strtotime(str_replace('/','-',$_POST['d_date'])));
		
		$add_advc = $_POST['add_advc'];
		$tot_amount = $_POST['tot_fees'];
		
		$this->db->select('tot_advance,bal_advance')->from('tbl_protocol_advance')->where('protocal_id',$protocol_id);
		$data = $this->db->get();
		$result = $data->result_array();
		foreach($result as $results)
		{
			$tbl_amount = $results['tot_advance'];
			$tbl_balance = $results['bal_advance'];
		}
		$data = array(
					'date_discharge' => $d_date,
					'tot_advance' => $tbl_amount + $add_advc,
					'bal_advance' => $tbl_balance + $add_advc,
					'tot_amount' => $tot_amount
						
					);
		
		$this->db->where('protocal_id',$protocol_id);
		
		$this->db->update("tbl_protocol_advance",$data);
		
		
		
		return $protocol_id;
		
		
	}
	
	// Delete referal
	public function delete_fees($pro_id){
		
		$where = array('protocal_id' => $pro_id);
		$this->db->where($where);
		$this->db->delete('tbl_protocol_advance');
		
	}
	
	public function getPackage() {
		$this->db->select('protocal_id,bill_status,package_name,advance')->from('tbl_protocol');
		$this->db->group_by('protocal_id');
		$this->db->where('package_name !=','');
		if($this->session->userdata('all_locations') == true)
		{
			$this->db->where_in('client_id',$this->session->userdata('clientIds'));
		}else{
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
    }
	
	public function getPackageInfo()
	{
		
		
		$this->db->select('protocal_id,fees_type,bill_status,package_name,advance')->from('tbl_protocol');
		
		if($this->session->userdata('all_locations') == true)
		{
			$this->db->where_in('client_id',$this->session->userdata('clientIds'));
		}else{
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	
	public function groupInvoice($from,$to,$patient_id,$group_id)
	{
        $this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('note')->from('tbl_client');
		$res = $this->db->get();
		$notes = $res->row()->note;
		
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('note')->from('tbl_client');
		$res = $this->db->get();
		$notes = $res->row()->note;
		$treatmentGroupId = str_replace("_","/",$group_id);
		$where = array('tt.patient_id' => $patient_id);
		$this->db->select('*')->from('tbl_patient_treatment_techniques tt')->where($where);
		$this->db->where('tt.treatment_date >= ',$from);
		$this->db->where('tt.treatment_date <= ',$to);
		$this->db->where('bill_status !=',1);
		$this->db->join("tbl_item it", "it.item_id = tt.treatments");
		$treatmentQuery = $this->db->get();
		$treatmentData = ($treatmentQuery->num_rows() > 0) ? $treatmentQuery->result_array() : false;
		
		$this->db->select_sum('treatment_price','tot_amt')->from('tbl_patient_treatment_techniques');
		$this->db->where('patient_id',$patient_id);
		$this->db->where('treatment_date >= ',$from);
		$this->db->where('treatment_date <= ',$to);
		$this->db->where('bill_status !=',1);
		$query = $this->db->get();
		$tot_amt =  $query->row()->tot_amt;
		
		if($treatmentData != false)
	{
			
			$profileInfo = $this->registration_model->getProfileInfo($this->session->userdata('username'));
			$staffInfo = $this->staff_model->getStaffInfo($this->session->userdata('username'));
			$bill_no=$this->generate_code();
			if($profileInfo != false)
				$clientName = $profileInfo['first_name'].' '.$profileInfo['last_name'];
			else if($staffInfo != false)	
				$clientName = $staffInfo['first_name'].' '.$staffInfo['last_name'];
				
			
			$invoice_info = array(
				'client_id' => $this->session->userdata('client_id'),
				'bill_no' => $bill_no,
				'patient_id' => $patient_id,
				'treatment_date' => date('Y-m-d'),
				'due_date' => date('Y-m-d'),
				'total_amt' => $tot_amt,
				'bill_status' => 0,
				'notes' => $notes,
				'generated_by' => $clientName,
				'created_by' => $this->session->userdata('username'),
				'created_date' => date('Y-m-d H:i:s'),
				'modify_by' => $this->session->userdata('username'),
				'modify_date' => date('Y-m-d H:i:s'),
			);
		
			$this->db->insert('tbl_invoice_header', $invoice_info);
			$bill_id=$this->db->insert_id();
		
				
		$sno=1;
		$i = 0;
		$itemAmount = 0;
		$totItemAmount = 0;
		foreach($treatmentData as $treatmentDatas)
		{
			if($treatmentDatas['treatment_id']!='')
			{
				$itemAmount = $treatmentDatas['treatment_quantity'] * $treatmentDatas['treatment_price'];
				$totItemAmount += $itemAmount;
				$invdtl[$i] = array(
					'treatment_date' => $treatmentDatas['treatment_date'],
					'client_id' => $this->session->userdata('client_id'),
					'bill_id' => $bill_id,
					'staff_id' => $treatmentDatas['staff_id'],
					's_no' => $sno,
					'item_id' => $treatmentDatas['treatments'],
					'item_desc' => $treatmentDatas['item_desc'],
					'item_quantity' => $treatmentDatas['treatment_quantity'],
					'item_price' => $treatmentDatas['treatment_price'],
					'item_amount' => $itemAmount,
					'created_by' => $this->session->userdata('username'),
					'created_date' => date('Y-m-d H:i:s'),
					'modify_by' => $this->session->userdata('username'),
					'modify_date' => date('Y-m-d H:i:s'),
				);
				$sno++;
				$i++;
			}
		}
		$this->db->insert_batch('tbl_invoice_detail', $invdtl);
		$headerWhere = array('bill_id' => $bill_id);
		$this->db->where($headerWhere);
		$this->db->update("tbl_invoice_header",array('net_amt' => $totItemAmount, 'total_amt' => $totItemAmount));
		
		
		$this->db->where('treatment_date >= ',$from);
		$this->db->where('treatment_date <= ',$to);
		$this->db->where('patient_id',$patient_id);
		$this->db->update("tbl_patient_treatment_techniques",array('bill_status' => 1,'bill_id' => $bill_id));
		return $patient_id;
	}else{
	
		return false;
	}
	}
	public function groupInvoice2($from,$to,$patient_id){
		$this->db->where('patient_id',$patient_id);
		$this->db->select('patient_code,first_name,last_name,concess_group_id')->from('tbl_patient_info');
		$res  = $this->db->get();
		$code  = $res->row()->patient_code;
		$first  = $res->row()->first_name;
		$last  = $res->row()->last_name;
		$concession_group_id  = $res->row()->concess_group_id;
		
		$this->db->select('*')->from('tbl_patient_treatment_techniques tt');
		$this->db->where('patient_id',$patient_id);
		$this->db->where('tt.treatment_date >= ',date('Y-m-d',strtotime(str_replace('/','-',$from))));
		$this->db->where('tt.treatment_date <= ',date('Y-m-d',strtotime(str_replace('/','-',$to))));
		$this->db->where('bill_status !=',1);
		$treatmentQuery = $this->db->get();
		$treatmentData = ($treatmentQuery->num_rows() > 0) ? $treatmentQuery->result_array() : false;
		if($treatmentData != false)
	    {
			       $this->db->select_sum('treatment_price','tot_amt')->from('tbl_patient_treatment_techniques');
					$this->db->where('patient_id',$patient_id);
					$this->db->where('treatment_date >= ',date('Y-m-d',strtotime(str_replace('/','-',$from))));
					$this->db->where('treatment_date <= ',date('Y-m-d',strtotime(str_replace('/','-',$to))));
					$this->db->where('bill_status !=',1);
					$query = $this->db->get();
					
					$tot_amt =  $query->row()->tot_amt;
									
					$bill_no=$this->generate_code();
					$profileInfo = $this->registration_model->getProfileInfo($this->session->userdata('username'));
					$staffInfo = $this->staff_model->getStaffInfo($this->session->userdata('username'));
					if($profileInfo != false)
						$clientName = $profileInfo['first_name'].' '.$profileInfo['last_name'];
					else if($staffInfo != false)	
						$clientName = $staffInfo['first_name'].' '.$staffInfo['last_name'];
						
					
					$invoice_info = array(
						'client_id' => $this->session->userdata('client_id'),
						'bill_no' => $bill_no,
						'patient_id' => $patient_id,
						'treatment_date' => date('Y-m-d'),
						'due_date' => date('Y-m-d'),
						'total_amt' => $tot_amt,
						'bill_status' => 0,
						'generated_by' => $clientName,
						'created_by' => $this->session->userdata('username'),
						'created_date' => date('Y-m-d H:i:s'),
						'modify_by' => $this->session->userdata('username'),
						'modify_date' => date('Y-m-d H:i:s'),
					);
				
					$this->db->insert('tbl_invoice_header', $invoice_info);
					$bill_id=$this->db->insert_id();
				
						
				$sno=1;
				$i = 0;
				$itemAmount = 0;
				$totItemAmount = 0;
				foreach($treatmentData as $treatmentDatas)
				{
					if($treatmentDatas['treatment_id']!='')
					{
						$itemAmount = $treatmentDatas['treatment_quantity'] * $treatmentDatas['treatment_price'];
						$totItemAmount += $itemAmount;
						$invdtl[$i] = array(
							'client_id' => $this->session->userdata('client_id'),
							'bill_id' => $bill_id,
							's_no' => $sno,
							'item_id' => $treatmentDatas['treatments'],
							'item_quantity' => $treatmentDatas['treatment_quantity'],
							'item_price' => $treatmentDatas['treatment_price'],
							'item_amount' => $itemAmount,
							'created_by' => $this->session->userdata('username'),
							'created_date' => date('Y-m-d H:i:s'),
							'modify_by' => $this->session->userdata('username'),
							'modify_date' => date('Y-m-d H:i:s'),
						);
						$sno++;
						$i++;
					}
				}
				$this->db->insert_batch('tbl_invoice_detail', $invdtl);
				$headerWhere = array('bill_id' => $bill_id);
				$this->db->where($headerWhere);
				$this->db->update("tbl_invoice_header",array('net_amt' => $totItemAmount, 'total_amt' => $totItemAmount));
				
				
				$this->db->where('treatment_date >= ',date('Y-m-d',strtotime(str_replace('/','-',$from))));
				$this->db->where('treatment_date <= ',date('Y-m-d',strtotime(str_replace('/','-',$to))));
				$this->db->where('patient_id',$patient_id);
				$this->db->update("tbl_patient_treatment_techniques",array('bill_status' => 1,'bill_id' => $bill_id));
				
		} else {
			$this->db->where('si.sn_date >=',date('Y-m-d',strtotime(str_replace('/','-',$from))));
			$this->db->where('si.sn_date <=',date('Y-m-d',strtotime(str_replace('/','-',$to))));
			$this->db->select('si.sn_date,si.staff_id,si.Session_count,si.item_id,si.item_name')->from('tbl_session_det si');
			$result  = $this->db->get();
			foreach($result->result_array() as $row ) {
			$sn_date  = $row['sn_date'];
			$staff_id  = $row['staff_id'];
			$Session_count  = $row['Session_count'];
			$item_id  = $row['item_id'];
			$item_name  = $row['item_name'];
			
			$session_det = array(
				'client_id' => $this->session->userdata('client_id'),
				'patient_id' => $patient_id,
				'staff_id' => $staff_id,
				'patient_code' => $code,
				'sn_date' => $sn_date,
				'Session_count' => $Session_count,
				'item_id' => $item_id,
				'item_name' => $item_name,
				'repot_by' =>  $staff_id,
				'fpatient_name' => $first,
				'lpatient_name' => $last,
				'created_by' => $this->session->userdata('username'),
				'created_date' => date('Y-m-d H:i:s'),
				'modify_by' => $this->session->userdata('username'),
				'modify_date' => date('Y-m-d H:i:s'),
			  
		    );
			$this->db->insert('tbl_session_det',$session_det);
		    $data['sn_id']=$this->db->insert_id();
			$this->db->where('item_id',$item_id);
		    $this->db->select('item_price,item_desc')->from('tbl_item');
			$res = $this->db->get();
			$price = $res->row()->item_price;
			$treatment_id = $item_id;
			$item_desc = $res->row()->item_desc;
			
			$tot = $price * $session_det['Session_count'];
			if($concession_group_id  !=  '0'){
				$this->db->where('concess_group_id',$concession_group_id);
				$this->db->select('tax_perc,discount_perc')->from('tbl_concess_group');
				$res = $this->db->get();
				$tax = $res->row()->tax_perc;
				$discount = $res->row()->discount_perc;
				$tax_perce = ($tax/100) * $tot; 
				$discount_perce = ($discount/100) * $tot;
				$tot_amt = ($tot + $tax_perce ) - $discount_perce;
			} else{
				$tax = '0';
				$discount = '0';
				$tot_amt = $tot;
			}
		    $bill_no=$this->generate_code();
			$profileInfo = $this->registration_model->getProfileInfo($this->session->userdata('username'));
			$staffInfo = $this->staff_model->getStaffInfo($this->session->userdata('username'));
			
			if($profileInfo != false)
				$clientName = $profileInfo['first_name'].' '.$profileInfo['last_name'];
			else if($staffInfo != false)	
				$clientName = $staffInfo['first_name'].' '.$staffInfo['last_name'];
				
			$invoice_info = array(
				'client_id' => $this->session->userdata('client_id'),
				'bill_no' => $bill_no,
				'patient_id' => $patient_id,
				'treatment_date' => $session_det['sn_date'],
				'due_date' => $session_det['sn_date'],
				'total_amt' => $tot,
				'net_amt' => $tot_amt,
				'bill_status' => 0,
				'generated_by' => $clientName,
				'created_by' => $this->session->userdata('username'),
				'created_date' => date('Y-m-d H:i:s'),
				'modify_by' => $this->session->userdata('username'),
				'tax_perc' => $tax,
				'discount_perc' => $discount,
				'modify_date' => date('Y-m-d H:i:s'),
			);
		
			$this->db->insert('tbl_invoice_header', $invoice_info);
			$bill_id=$this->db->insert_id();
			
			$dat = array(
			        'client_id' => $this->session->userdata('client_id'),
					'bill_id' => $bill_id,
					's_no' => '1',
					'item_id' => $treatment_id,
					'item_desc' => $item_desc,
					'item_quantity' => $session_det['Session_count'],
					'item_price' => $price,
					'item_amount' => $tot,
					'created_by' => $this->session->userdata('username'),
					'created_date' => date('Y-m-d H:i:s'),
					'modify_by' => $this->session->userdata('username'),
					'modify_date' => date('Y-m-d H:i:s'),
				);
			$this->db->insert('tbl_invoice_detail', $dat);
			
	  }  
			
	}
		
	return true;		
		
		
		
		
	}
	public function groupInvoice1($from,$to,$patient_id)
	{

		
		$where = array('tt.patient_id' => $patient_id);
		$this->db->select('*')->from('tbl_patient_treatment_techniques tt')->where($where);
		$this->db->where('tt.treatment_date >= ',$from);
		$this->db->where('tt.treatment_date <= ',$to);
		$this->db->where('bill_status !=',1);
		$this->db->join("tbl_item it", "it.item_id = tt.treatments");
		$treatmentQuery = $this->db->get();
		$treatmentData = ($treatmentQuery->num_rows() > 0) ? $treatmentQuery->result_array() : false;
		
		$this->db->select_sum('treatment_price','tot_amt')->from('tbl_patient_treatment_techniques');
		$this->db->where('patient_id',$patient_id);
		$this->db->where('treatment_date >= ',$from);
		$this->db->where('treatment_date <= ',$to);
		$this->db->where('bill_status !=',1);
		$query = $this->db->get();
		$tot_amt =  $query->row()->tot_amt;
		
		if($treatmentData != false)
	{
			
			$profileInfo = $this->registration_model->getProfileInfo($this->session->userdata('username'));
			$staffInfo = $this->staff_model->getStaffInfo($this->session->userdata('username'));
			$bill_no=$this->generate_code();
			if($profileInfo != false)
				$clientName = $profileInfo['first_name'].' '.$profileInfo['last_name'];
			else if($staffInfo != false)	
				$clientName = $staffInfo['first_name'].' '.$staffInfo['last_name'];
				
			
			$invoice_info = array(
				'client_id' => $this->session->userdata('client_id'),
				'bill_no' => $bill_no,
				'patient_id' => $patient_id,
				'treatment_date' => date('Y-m-d'),
				'due_date' => date('Y-m-d'),
				'total_amt' => $tot_amt,
				'bill_status' => 0,
				'generated_by' => $clientName,
				'created_by' => $this->session->userdata('username'),
				'created_date' => date('Y-m-d H:i:s'),
				'modify_by' => $this->session->userdata('username'),
				'modify_date' => date('Y-m-d H:i:s'),
			);
		
			$this->db->insert('tbl_invoice_header', $invoice_info);
			$bill_id=$this->db->insert_id();
		
				
		$sno=1;
		$i = 0;
		$itemAmount = 0;
		$totItemAmount = 0;
		foreach($treatmentData as $treatmentDatas)
		{
			if($treatmentDatas['treatment_id']!='')
			{
				$itemAmount = $treatmentDatas['treatment_quantity'] * $treatmentDatas['treatment_price'];
				$totItemAmount += $itemAmount;
				$invdtl[$i] = array(
					'client_id' => $this->session->userdata('client_id'),
					'bill_id' => $bill_id,
					's_no' => $sno,
					'item_id' => $treatmentDatas['treatments'],
					'item_desc' => $treatmentDatas['item_desc'],
					'item_quantity' => $treatmentDatas['treatment_quantity'],
					'item_price' => $treatmentDatas['treatment_price'],
					'item_amount' => $itemAmount,
					'created_by' => $this->session->userdata('username'),
					'created_date' => date('Y-m-d H:i:s'),
					'modify_by' => $this->session->userdata('username'),
					'modify_date' => date('Y-m-d H:i:s'),
				);
				$sno++;
				$i++;
			}
		}
		$this->db->insert_batch('tbl_invoice_detail', $invdtl);
		$headerWhere = array('bill_id' => $bill_id);
		$this->db->where($headerWhere);
		$this->db->update("tbl_invoice_header",array('net_amt' => $totItemAmount, 'total_amt' => $totItemAmount));
		
		
		$this->db->where('treatment_date >= ',$from);
		$this->db->where('treatment_date <= ',$to);
		$this->db->where('patient_id',$patient_id);
		$this->db->update("tbl_patient_treatment_techniques",array('bill_status' => 1,'bill_id' => $bill_id));
		return $patient_id;
	}else{
	
		return false;
	}
	}  
	
	public function getbillstatus($from,$to,$patient_id)
	{
		$where = array('patient_id' => $patient_id);
		$this->db->select('*')->from('tbl_patient_treatment_techniques')->where($where);
		$this->db->where('treatment_date >= ',$from);
		$this->db->where('treatment_date <= ',$to);
		$this->db->where('bill_status',1);
		$treatmentQuery = $this->db->get();
		$treatmentData = ($treatmentQuery->num_rows() > 0) ? true : false ;
		return $treatmentData;
		
	}
	
	
	public function getTreatmentInfo($bill_id)
	{
		$this->db->select('treatment_date')->from('tbl_patient_treatment_techniques');
		$this->db->where('bill_id',$bill_id);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function getBill($protocol_id)
	{
		$where=array('protocal_id' => $protocol_id);
		$this->db->select('*')->from('tbl_protocol')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	
	public function fees_info2()
	{
		$protocol_id = $_POST['protocol_id'];
		$patient_id = $_POST['patient_id'];
		$fees_id = $_POST['fees_id'];
		$bill_status = $_POST['bill_status'];
		$amount = $_POST['amount'];
		$tot_amt = $_POST['tot_add'];
		$d_date = $_POST['d_date'];
		$package = $_POST['package'];
		$bill_no = $_POST['bill_no'];
		$pay_mode = $_POST['pay_mode'];
		$tax = $_POST['tax'];
		$discount = $_POST['discount'];
		$main_tax = $_POST['main_tax'];
		$main_discount = $_POST['main_discount'];
		$card_no = $_POST['card_no'];
		$bank_name = $_POST['bank_name'];
		$days = $_POST['days'];
		
		
		$add_fees = array(
		'client_id' => $this->session->userdata('client_id'),
		'patient_id' => $patient_id,
		'protocal_id' => $protocol_id,
		'fees_id' =>$fees_id,
		'date_admit' => date('Y-m-d'),
		'bill_status' => $bill_status,
		'bill_no' => $bill_no,
		'date_discharge' => $d_date,
		'tot_advance' => $tot_amt,
		'package_name' => $package,
		'pay_mode' => $pay_mode,
		'card_no' => $card_no,
		'bank_name' => $bank_name,
		'tax' => $tax,
		'discount' =>$discount,
		'main_tax' => $main_tax,
		'main_disc' => $main_discount,
		'advance' => $amount,
		'created_by' => $this->session->userdata('username'),
		'created_date' => date('Y-m-d H:i:s'),
		'modify_by' => $this->session->userdata('username'),
		'modify_date' => date('Y-m-d H:i:s'),
		);
		$this->db->insert('tbl_protocol', $add_fees);
		
		if($bill_status == 1)
		{
			$t_amount = $days * $amount;
		}
		else if($bill_status == 2)
		{
			$week = ceil($days/7);
			$t_amount = $week * $amount;
		}
		else
		{
			$month = ceil($days/31);
			$t_amount = $month * $amount;
		}
		$this->db->where('protocal_id',$protocol_id);
		$this->db->set('tot_amount','tot_amount +'.$t_amount,FALSE);
		$this->db->update("tbl_protocol_advance");
		
		return $protocol_id ;
	}
	
	public function generate_ip_code() {
		//$this->db->select('first_name, gender')->from('tbl_patient_info')->where('patient_id', $patient_id);
		//$patient = $this->db->get()->row();
		$string  = 'FPB' ;
		$this->db->select('bill_no')->from('tbl_protocol_advance')->where('client_id',$this->session->userdata('client_id'))->like('bill_no', $string, 'after'); 
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $string . ($query->num_rows() + 1);
		} else {
			return $string . '1';
		}
	}
	
	
	//edit info of IP invoice
	public function ip_editInvoice($p_id)
	{
		$where=array('protocal_id' => $p_id);
		$this->db->select('*')->from('tbl_protocol_advance')->where($where);
		$query=$this->db->get();

		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	//edit info of IP invoice
	public function ip_editInvoice2($p_id)
	{
		
		$where=array('protocal_id' => $p_id);
		$this->db->select('*')->from('tbl_protocol_advance')->where($where);
		$query=$this->db->get();

		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function ip_editInvoice1($p_id)
	{
		
		$this->db->select('t1.client_id,t1.protocal_id,t1.patient_id,t1.fees_id,t1.bill_no,t1.date_admit,t1.date_discharge,t1.bill_status,t1.advance,t1.modify_by,t2.fees_name');
		$this->db->from("tbl_protocol t1");
		$this->db->join("tlb_bill_type t2","t1.fees_id = t2.fees_id");
		$this->db->where("t1.protocal_id",$p_id);
		$query=$this->db->get();

		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function package_info($p_id)
	{
		
		$this->db->select('t1.fees_id,t1.bill_status,t1.advance,t2.fees_name')->from('tbl_protocol t1');
		$this->db->join('tlb_bill_type t2','t1.fees_id = t2.fees_id');
		$this->db->where('t1.protocal_id',$p_id);
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array() : false;
	}
	
	public function searchBill($bill_id)
	{
		$where=array('bill_id' => $bill_id);
		$this->db->select('*')->from('tbl_patient_treatment_techniques')->where($where);
		$query = $this->db->get();
		return ($query->num_rows()>0) ? true : false;
	}
	
	public function editInvoiceDetail1($bill_id)
	{
		$where=array('id.bill_id' => $bill_id);
		$this->db->select('id.bill_id,id.item_id,id.staff_id,id.item_desc,id.item_quantity,id.item_price,id.item_amount,bl.subheading,bl.treatment_date');
		$this->db->from("tbl_invoice_detail id");
		//$this->db->join("tbl_item it", "id.item_id=it.item_id");
		$this->db->join("tbl_invoice_header bl", "id.bill_id=bl.bill_id AND bl.client_id=id.client_id");
		$this->db->where($where);	
		//$this->db->group_by('bl.treatment_date');
		$query=$this->db->get();
		 $this->db->where('bill_id',$this->input->post('id.bill_id'));
			 
			 $this->db->set('treatment_date',date('Y-m-d'));
			 $this->db->update('tbl_invoice_detail');
			 
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function editprintDetail1($bill_id)
	{
		$where=array('id.bill_id' => $bill_id);
		$this->db->select('id.bill_id,id.item_id,id.staff_id,id.item_desc,id.item_quantity,id.item_price,id.item_amount,bl.subheading,id.treatment_date');
		$this->db->from("tbl_invoice_detail id");
		//$this->db->join("tbl_item it", "id.item_id=it.item_id");
		$this->db->join("tbl_invoice_header bl", "id.bill_id=bl.bill_id AND bl.client_id=id.client_id");
		$this->db->where($where);	
		//$this->db->group_by('bl.treatment_date');
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	
	public function edit_dia_info($item_id) {
		$item_info = array(
			'client_id' => $this->session->userdata('client_id'),
			'pd_list_name' => $this->input->post('item_name'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
		
		$where = array('pd_list_id' => $item_id);
		$this->db->where($where);
		$this->db->update('tbl_prov_diagnosis_list',$item_info);
		$data['item_id']=$item_id;
		return $data;
	}
	public function edit_medi_info($medi_id) {
		$item_info = array(
			'patient_id' => $this->session->userdata('patient_id'),
			'bio' => $this->input->post('biomechanical'),
			
		);
		
		$where = array('medi_id' => $medi_id);
		$this->db->where($where);
		$this->db->update('tbl_patient_medi_info',$item_info);
		$data['medi_id']=$medi_id;
		return $data;
	}
	
	public function getItems() {
		$this->db->select('*');
		$this->db->from("tbl_expanse_item");
		$this->db->order_by('item_id','desc');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function getclientItems() {
		$this->db->select('*');
		$this->db->where('item_hide','0');
		$this->db->from("tbl_expanse_client_item");
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
		
	public function editExpanse($bill_no){
		$this->db->select('*');
		$this->db->from("tbl_expanse");
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->where('bill_no',$bill_no);
		$this->db->group_by('bill_no');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function editExpansedet($bill_no){
		$this->db->select('ex.bill_id,ex.client_id,ex.item_id,ex.item_desc,ex.item_quantity,ex.item_price,ex.item_amount,ex.total_amt');
		$this->db->from("tbl_expanse ex");
		$this->db->where('ex.client_id',$this->session->userdata('client_id'));
		$this->db->where('ex.bill_no',$bill_no);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	
	public function expanse_info() {
		$totinv=count($_POST['item_id']);
		$item_id=$_POST['item_id'];
		$item_desc=$_POST['item_desc'];
		$item_quantity=$_POST['item_quantity'];
		$item_price=$_POST['item_price'];
		$item_amount=$_POST['item_amount'];
		for($i=0; $i<$totinv; $i++)
		{
			if($item_id[$i]!='')
			{
				$expanse_info = array(
					'client_id' => $this->session->userdata('client_id'),
					'bill_no' => $this->input->post('bill_no'),
					'ventor' => $this->input->post('vendor'),
					'bill_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('bill_date')))),
					'due_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('due_date')))),
					'notes' => $this->input->post('notes'),
					'POSO' => $this->input->post('po'),
					'total_amt' => $this->input->post('amount1'),
					'item_id' => $item_id[$i],
					'item_desc' => $item_desc[$i],
					'item_quantity' => $item_quantity[$i],
					'item_price' => $item_price[$i],
					'item_amount' => $item_amount[$i],
					'amount' => $this->input->post('total_amt'),
					'tax_perc' => $this->input->post('tax_perc'),
					'purchase' => $this->input->post('Purchase'),
					
				);
				print_r($expanse_info);
				//$this->db->insert('tbl_expanse', $expanse_info);
			}
		}
	}
	
	public function expanse_edit_info($bill_no) {
		$this->db->where('bill_no',$bill_no);
		$this->db->delete('tbl_expanse');
		
		$totinv=count($_POST['item_id']);
		$item_id=$_POST['item_id'];
		$item_desc=$_POST['item_desc'];
		$item_quantity=$_POST['item_quantity'];
		$item_price=$_POST['item_price'];
		$item_amount=$_POST['item_amount'];
		for($i=0; $i<$totinv; $i++)
		{
			if($item_id[$i]!='')
			{
				$expanse_info = array(
					'client_id' => $this->session->userdata('client_id'),
					'bill_no' => $this->input->post('bill_no'),
					'ventor' => $this->input->post('vendor'),
					'bill_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('bill_date')))),
					'due_date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('due_date')))),
					'notes' => $this->input->post('notes'),
					'POSO' => $this->input->post('po'),
					'total_amt' => $this->input->post('amount1'),
					'item_id' => $item_id[$i],
					'item_desc' => $item_desc[$i],
					'item_quantity' => $item_quantity[$i],
					'item_price' => $item_price[$i],
					'item_amount' => $item_amount[$i],
					'amount' => $this->input->post('total_amt'),
					'tax_perc' => $this->input->post('tax_perc'),
					'purchase' => $this->input->post('Purchase'),
	
				);
				$this->db->insert('tbl_expanse', $expanse_info);
				
			}
		}
	}
	
	
	public function addpatient($prov) {
		$provi = explode('/',$prov);
		//print_r($provi);
		$concessionInfo = array(
			'client_id' => $this->session->userdata('client_id'),
			'first_name' => $provi[0],
			'appoint_date' =>date('Y-m-d',strtotime($provi[1])),
			'mobile_no' => $provi[2],
			'email' => $provi[3],
			//'status'=>1,
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
		
		
		$this->db->insert('tbl_patient_info', $concessionInfo);
		$data = array('patient_id' => $this->db->insert_id(), 'first_name' => $this->input->post('first_name'));
		if($this->db->insert_id()){
			return $data;	
		} else {
			return false;	
		}
	}
	
	public function editpatient($patient_id) {
		
		$concessionInfo = array(
			'client_id' => $this->session->userdata('client_id'),
			'first_name' => $this->input->post('first_name'),
			'appoint_date' => $this->input->post('appoint_date'),
			'mobile_no' => $this->input->post('mobile_no'),
			'email' => $this->input->post('email'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
		
		$where = array('patient_id' => $patient_id);
		$this->db->where($where);
		$this->db->update('tbl_patient_info',$concessionInfo);
		return $patient_id;
	}
	public function add_item($prov) {
		$provi = explode('/',$prov);
		//print_r($provi);
		$concessionInfo = array(
			'client_id' => $this->session->userdata('client_id'),
			'item_name' => $provi[0],
			'item_desc' => $provi[1],
			'item_price' => $provi[2],
			'status'=>1,
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
		);
		
		
		$this->db->insert('tbl_item', $concessionInfo);
		$data = array('item_id' => $this->db->insert_id(), 'item_name' => $provi[0],'item_desc' => $provi[1],'item_price' => $provi[2]);
		if($this->db->insert_id()){
			return $data;	
		} else {
			return false;	
		}
	}
	
	public function edit_item($item_id) {
		
		$img = $this->input->post('tp_img');
		$concessionInfo = array(
			'client_id' => $this->session->userdata('client_id'),
			'item_name' => $this->input->post('item_name'),
			'item_desc' => $this->input->post('item_desc'),
			'item_price' => $this->input->post('item_price'),
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
			'image' => $img,
			'status'=>'1'
		);
		
		$where = array('item_id' => $item_id);
		$this->db->where($where);
		$this->db->update('tbl_item',$concessionInfo);
		return $item_id;
	}
	public function add_patient($prov){
		$test = explode('/',$prov);
		if($test[1] != ''){
			$this->sendmail($prov);
		}
		$info = array(
		    'client_id' => $this->session->userdata('client_id'),
			'first_name' => $test[0],
			'home_visit' => $test[4],
			'gender' => $test[3],
			'mobile_no' => $test[2],
			'email' => $test[1],
			'created_by' => $this->session->userdata('username'),
			'created_date' => date('Y-m-d H:i:s'),
			'modify_by' => $this->session->userdata('username'),
			'modify_date' => date('Y-m-d H:i:s'),
			'patient_code' => $this->generate_code1($prov),
			'appoint_date' =>date('Y-m-d')
		);
		$this->db->insert('tbl_patient_info', $info);
		$data = array('patient_id' => $this->db->insert_id(), 'first_name' => $test[0] , 'patient_code' => $this->generate_code());
		if($this->db->insert_id()){
			return $data;	
		} else {
			return false;	
		}
			
		}
	public function generate_code1($prov) {
		$test = explode('/',$prov);
		$string  = 'P' . ucfirst(substr($test[3],0,1)) . ucfirst(substr($test[0],0,1)) . '/' . date('my') . '/';
		$this->db->select('patient_code')->from('tbl_patient_info'); 
		if($this->session->userdata('all_locations') == true)
		{
			$this->db->where_in('client_id',$this->session->userdata('clientIds'));
		}else{
			$this->db->where('client_id',$this->session->userdata('client_id'));
		}
		$this->db->like('patient_code', $string, 'after');
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $string . ($query->num_rows() + 1);
		} else {
			return $string . '1';
		}
	}
	public function sendmail($prov){
		$test = explode('/',$prov);
		$url = base_url().'patient/patient/setpassword/'.$test[1];
		$pdfMessage = $this->mail_model->patienttemplate($url);
		$adminMailConfig = array('to' => $test[1], 'subject' => '[Physio Plus Tech]Active Your Account', 'message' => $pdfMessage);
		$this->mail_model->sendPatientMail($adminMailConfig);
	}
	// Delete concession group
	public function deleteexpense($bill_no){
		
		$where = array('bill_no' => $bill_no);
		$this->db->where($where);
		$this->db->delete('tbl_expanse');
		
	}
	public function getinventoryItems($client_id) {
		$this->db->where('id.client_id',$client_id);
		$this->db->select('id.pro_name,ci.color_code,ci.color_id,id.inventory_id,ci.variant_value,ci.size');
		$this->db->from("tbl_inventory id");
		$this->db->join("tbl_inventory_color ci", "id.inventory_id=ci.inventory_id");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getItems_list() {
		$result = array();
		$result['arrayData'] = array();
		$result['jsonData'] = array();
		// get items
		$this->db->select('*')->from('tbl_inventory_color')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$result['status'] = 'success';
			foreach($query->result_array() as $item) {
				$item['inven'] = $item['color_code'];
				array_push($result['arrayData'], $item);
				$result['jsonData'][ $item['color_code'] ] = $item;
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
	public function getinventory() {
		$result = array();
		$result['arrayData'] = array();
		$result['jsonData'] = array();
		// get items
		$this->db->select('*')->from('tbl_inventory')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$result['status'] = 'success';
			foreach($query->result_array() as $item) {
				$item['inven'] = $item['inventory_id'];
				array_push($result['arrayData'], $item);
				$result['jsonData'][ $item['inventory_id'] ] = $item;
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
	public function check_bill($prov) {
		$provi = explode('/',$prov);  
		$this->db->where('pt.patient_id',$provi[0]);
		$this->db->where('pt.treatment_date',date('y-m-d',strtotime($provi[1])));
		$this->db->select('si.first_name,si.last_name,pt.bill_status,pt.treatments,GROUP_CONCAT(pt.treatments SEPARATOR " - ") AS itemId,it.item_name,GROUP_CONCAT(it.item_name SEPARATOR " - ") AS itemName,pt.treatment_quantity,GROUP_CONCAT(pt.treatment_quantity SEPARATOR " - ") AS treatmentQuantity,pt.staff_id')->from('tbl_patient_treatment_techniques pt');
		$this->db->join('tbl_item it','pt.treatments = it.item_id');
		$this->db->join('tbl_staff_info si','si.staff_id = pt.staff_id');
		$query = $this->db->get();
		if($query->result_array() != false){
			$item = $query->row()->itemName;
			if($item != ''){
				$bill = $query->row()->bill_status.'/'.$query->row()->itemName.'/'.$query->row()->itemId.'/'.$query->row()->treatmentQuantity.'/'.$query->row()->staff_id.'/'.$query->row()->first_name.' '.$query->row()->last_name;
			} else {
				$bill = '0';
			}
		} else {
			$bill = '0';
		}
		return $bill;
	}
public function getproductItems($client_id) {
		$this->db->where('client_id',$client_id);
		$this->db->where('stack_items !=',0);
		$this->db->select('product_id,item_name,item_code,total,stack_items');
		$this->db->from("tbl_product_info");
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getproduct_list() {
		$result = array();
		$result['arrayData'] = array();
		$result['jsonData'] = array();
		// get items
		$this->db->select('*')->from('tbl_product_info')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$result['status'] = 'success';
			foreach($query->result_array() as $item) {
				$item['inven'] = $item['product_id'];
				array_push($result['arrayData'], $item);
				$result['jsonData'][ $item['product_id'] ] = $item;
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
    public function getproduct() {
		$result = array();
		$result['arrayData'] = array();
		$result['jsonData'] = array();
		// get items
		$this->db->select('*')->from('tbl_product_info')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$result['status'] = 'success';
			foreach($query->result_array() as $item) {
				$item['inven'] = $item['product_id'];
				array_push($result['arrayData'], $item);
				$result['jsonData'][ $item['product_id']] = $item;
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
    public function getInvoice_staff($bill_id) {
		$this->db->where('iv.bill_id',$bill_id);
		$this->db->select('iv.staff_id,si.first_name,si.last_name')->from('tbl_invoice_detail iv');
		$this->db->join('tbl_staff_info si','si.staff_id = iv.staff_id');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function add_product() {
		$prov="Item3/IT3244/20/200/50/150";
		$provi = explode('/',$prov);
		$data = array(
		   'client_id'=>$this->session->userdata('client_id'),
		   'item_date'=>date('Y-m-d'),
		   'item_name'=>$provi[0],
		   'item_code'=>$provi[1],
		   'amount'=>$provi[3],
		   'discount'=>$provi[4],
		   'stack_items'=>$provi[2],
		   'total'=>$provi[5],
		);
		$this->db->insert('tbl_product_info',$data);
		$id = $this->db->insert_id();
		return $id;
	}
	public function getapts($id)
	{
		$where=array('patient_id' => $id);
		$this->db->select('start,appointment_id,bill_id')->from('tbl_appointments')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
		
	}
	public function setapts($bill_id)
	{
		$where=array('bill_id' => $bill_id);
		$this->db->select('start,appointment_id')->from('tbl_appointments')->where($where);
		$query=$this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function getdaily_payments(){
		if($this->uri->segment(4) == 'date'){
			$search = date('Y-m-d',strtotime($this->uri->segment(5)));
			$search1 = date('Y-m-d',strtotime($this->uri->segment(6)));
		} else {
			$search = date('Y-m-d', strtotime('-30 days'));
			$search1 = date('Y-m-d');
		}
		$this->db->where('payment_date >=',$search);
		$this->db->where('payment_date <=',$search1);
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('SUM(paid_amt) as paid,payment_mode')->from('tbl_invoice_payments');
		$this->db->group_by('payment_mode');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	public function getpayments_list(){
		if($this->uri->segment(4) == 'date'){
			$search = date('Y-m-d',strtotime($this->uri->segment(5)));
			$search1 = date('Y-m-d',strtotime($this->uri->segment(6)));
		} else {
			$search = date('Y-m-d', strtotime('-30 days'));
			$search1 = date('Y-m-d');
		}
		$this->db->where('ih.cheque_date >=',$search);
		$this->db->where('ih.cheque_date <=',$search1);
		$this->db->where('ih.paid_amt !=','');
		$this->db->where('ih.client_id',$this->session->userdata('client_id'));
		$this->db->select('ih.bill_no,pi.patient_code,pi.patient_id,pi.first_name,pi.last_name,ih.net_amt,pt.paid_amt,pt.payment_mode,ih.cheque_date')->from('tbl_invoice_header ih');
		$this->db->join('tbl_invoice_payments pt','pt.bill_id=ih.bill_id');
		$this->db->join('tbl_patient_info pi','pi.patient_id=ih.patient_id');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
} 