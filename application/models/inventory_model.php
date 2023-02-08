<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventory_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		$this->load->model(array('settings_model','client','location_model','registration_model'));
	}
	public function inventory_add(){
		
		$not_applicable = $this->input->post('not_applicable');
		if($not_applicable =='Yes'){
			$expire_date='';  
		}
		else{
			$expire_date=date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('expire_date'))));
		}
		
		$code = $this->generate_code1();
		$data = array(
		'client_id' => $this->session->userdata('client_id'),
		'date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('product_date')))),
		'pro_name' => $this->input->post('product_name'),
		'pro_category' => $this->input->post('product_type'),
		'brand_name' => $this->input->post('brand_name'),
		'pro_img' => $this->input->post('scan_hidden'),
		'pro_description' => $this->input->post('product_description'),
		'initial_cost' => $this->input->post('initial_cost'),
		'buy_price' => $this->input->post('buy_price'),
		'wholesale_price' => $this->input->post('wholesale_price'),
		'retail_price' => $this->input->post('retail_price'),
		'initial_stock' => $this->input->post('initial_stock'),
		'product' => $this->input->post('product'),
		'pack_option' => $this->input->post('pack_option'),
		'pack_quantity' => $this->input->post('pack_quantity'),
		'expire_date' => $expire_date,
		'code' =>$code,
		'not_applicable' =>$this->input->post('not_applicable'),
		'created_by' => $this->session->userdata('username'),
		'created_date' => date('Y-m-d H:i:s'),
		'modify_by' => $this->session->userdata('username'),
		'modify_date' => date('Y-m-d H:i:s'),
		'sale_order' => $this->input->post('sale_order'),
		);
			
	     $insert = $this->db->insert('tbl_inventory',$data);
		 $inven_id = $this->db->insert_id();
		 $val = explode(",",$this->input->post('tags_2')); 
		  for($i=0;$i<count($val);$i++) {
			 $val1 = explode(",",$this->input->post('tags_1')); 
			 for($j=0;$j<count($val1);$j++) {
				 $data = array(
					 'inventory_id' => $inven_id,
					 'client_id' => $this->session->userdata('client_id'),
					 'variant_option' => $this->input->post('variant_color'),
					 'variant_value' => $val[$i],
					 'initial_cost' => $this->input->post('initial_cost'),
					 'buy_price' => $this->input->post('buy_price'),
					 'wholesale_price' => $this->input->post('wholesale_price'),
					 'retail_price' => $this->input->post('retail_price'),
					 'initial_stock' => $this->input->post('initial_stock'),
					 'size' => $val1[$j],
					 'color_code' => 'CO'.ucfirst(substr($val[$i],0,3)).$inven_id.$val1[$j] 
				);
			  $insert = $this->db->insert('tbl_inventory_color',$data);
		  }
		}
		
		return $inven_id;
	}
	public function generate_code1() { 

    $chars = "ABC0123456789DEFGHIJKLMNOPQRSTUVWXYZ"; 
    srand((double)microtime()*1000000); 
    $i = 0; 
    $pass = '' ; 

    while ($i <= 7) { 
        $num = rand() % 47; 
        $tmp = substr($chars, $num, 1); 
        $pass = $pass . $tmp; 
        $i++; 
    } 
     //print_r($pass);
    return $pass; 

  } 
  
   public function view_inventory(){
	   $this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('*')->from('tbl_inventory');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false; 
	}
	
	public function edit_list1($inventory_id){
		$this->db->where('fb.inventory_id',$inventory_id);
		$this->db->select('pi.color_code,pi.color_id,fb.inventory_id,fb.client_id,pi.variant_value,pi.initial_cost,pi.buy_price,pi.wholesale_price,pi.retail_price,pi.initial_stock,pi.size');
		$this->db->from("tbl_inventory fb");
		$this->db->join("tbl_inventory_color pi", "fb.inventory_id=pi.inventory_id");
		//$this->db->group_by('pi.variant_value');
		$query = $this->db->get();
		return ($query->num_rows()>0) ? $query->result_array()  : false;
	}
	/* public function delete_inventory($color_id){
		
		$where = array('color_id' => $color_id);
		$this->db->where($where);
		$this->db->delete('tbl_inventory_color');
		
		
		return $color_id;
	} */
	public function edi_inventory($color_id)
	{	
		$where=array('color_id' => $color_id);
		$this->db->select('*')->from('tbl_inventory_color')->where($where);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function stock_value() {
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('color_code,inventory_id,color_id,SUM((initial_stock * retail_price)) as price,SUM(initial_stock) as stock')->from('tbl_inventory_color');
		$this->db->group_by('inventory_id');
		$this->db->order_by('inventory_id', 'desc');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}
	 public function inventory_update()
		{
		   $id = $this->input->post('color_id');
			$this->db->where('color_id',$id);
			$data=array(
				'initial_cost' => $this->input->post('initial_cost'),
			    'buy_price' => $this->input->post('buy_price'),
			    'wholesale_price' => $this->input->post('wholesale_price'),
                'retail_price' => $this->input->post('retail_price'),
                'initial_stock' => $this->input->post('initial_stock'),
			);
			$this->db->update('tbl_inventory_color',$data);
			return true;
		}
		public function deleteexpense($bill_no){
			$where = array('inventory_id' => $bill_no);
			$this->db->where($where);
			$this->db->delete('tbl_inventory');
	    }
	public function inventory_detail($inventory_id) {
		$this->db->where('inventory_id',$inventory_id);
		$this->db->select('*')->from('tbl_inventory');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	public function search_inventory() {
		$data = $this->uri->segment(4);
		$search1 =  $this->uri->segment(5);
		$search2 =  $this->uri->segment(6);
		if($data == 'date'){
			$this->db->where('ih.treatment_date >',  date('Y-m-d',strtotime($search1)));
			$this->db->where('ih.treatment_date <',  date('Y-m-d',strtotime($search2)));
		}
		else if($data == 'search_type'){
			$this->db->where('id.item_id',str_replace('-','/',$search1));
		}
		$this->db->where('pi.client_id',$this->session->userdata('client_id'));
		$this->db->select('id.item_id,ip.payment_mode,pi.first_name,pi.last_name,ih.bill_id,pi.patient_code,ih.patient_id,ih.treatment_date,ih.bill_no,ih.net_amt,ih.paid_amt')->from('tbl_invoice_detail id');
		$this->db->join('tbl_invoice_header ih','ih.bill_id = id.bill_id');
		$this->db->join('tbl_invoice_payments ip','ih.bill_id = ip.bill_id');
		$this->db->join('tbl_patient_info pi','ih.patient_id = pi.patient_id');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false; 
	}
	
	function deleteinventory($inventory_id){
		
		$where = array('inventory_id' => $inventory_id);
		$this->db->where($where);
		$this->db->delete('tbl_inventory');
		
		$this->db->where($where);
		$this->db->delete('tbl_inventory_color');
		
		
		return $inventory_id;
	}
	public function product_name(){
		$this->db->select('pro_name,inventory_id,pro_category')->from('tbl_inventory')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : false;
   }
    public function edit_inventory($inventory_id){
		$where = array('inventory_id' => $inventory_id);
		$this->db->select('*')->from('tbl_inventory')->where($where);
		$query=$this->db->get();
        return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	public function update_inventory($inventory_id){
		$not_applicable = $this->input->post('not_applicable');
		if($not_applicable =='Yes'){
			$expire_date='';  
		}
		else{
			$expire_date=date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('expire_date'))));
		}
		
		$data = array(
		'client_id' => $this->session->userdata('client_id'),
		'date' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('product_date')))),
		'pro_name' => $this->input->post('product_name'),
		'pro_category' => $this->input->post('product_type'),
		'brand_name' => $this->input->post('brand_name'),
		'pro_img' => $this->input->post('scan_hidden'),
		'pro_description' => $this->input->post('product_description'),
		'product' => $this->input->post('product'),
		'pack_option' => $this->input->post('pack_option'),
		'pack_quantity' => $this->input->post('pack_quantity'),
		'expire_date' => $expire_date,
		'not_applicable' =>$this->input->post('not_applicable'),
		'created_by' => $this->session->userdata('username'),
		'created_date' => date('Y-m-d H:i:s'),
		'modify_by' => $this->session->userdata('username'),
		'modify_date' => date('Y-m-d H:i:s'),
		'sale_order' => $this->input->post('sale_order'),
		);
		
		$this->db->where('inventory_id',$inventory_id);
	    $this->db->update('tbl_inventory',$data);
	    return true;
	}
	public function stock_inven($id){
		
		$this->db->where('inventory_id',$id);
		$this->db->where('client_id',$this->session->userdata('client_id'));
		$this->db->select('color_code,inventory_id,color_id,SUM((initial_stock * retail_price)) as price,SUM(initial_stock) as stock')->from('tbl_inventory_color');
		$this->db->group_by('inventory_id');
		$this->db->order_by('inventory_id', 'desc');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;

	}
	public function product_inven($id){
		$this->db->where('inventory_id',$id);
		$this->db->select('pro_name,buy_price,initial_stock,inventory_id,pro_category')->from('tbl_inventory')->where('client_id', $this->session->userdata('client_id'));
		$query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->row_array() : false;
  
	}
}