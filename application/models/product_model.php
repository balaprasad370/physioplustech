<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {

	
 public function myproductcategories() {
	 $this->db->select('*')->from('tbl_product_category');
	 $query = $this->db->get();
	 return ($query->num_rows() > 0 ) ? $query->result_array() : false;
 }
 public function mycategory_info() {
	 $this->db->select('product_code,category_id,products_name')->from('tbl_product_category');
	 $query = $this->db->get();
	 return ($query->num_rows() > 0 ) ? $query->result_array() : false;
 }
 public function mycategories_product() {
	 $this->db->where('product_code',$this->uri->segment(4));
	 $this->db->select('*')->from('tbl_products');
	 $query = $this->db->get();
	 return ($query->num_rows() > 0 ) ? $query->result_array() : false;
 }
 public function selected_product() {
	 $this->db->where('client_id',$this->session->userdata('client_id'));
	 $this->db->select('pi.qty,pt.image,pi.product_id,pt.product_name,pt.price')->from('tbl_chooseproduct pi');
	 $this->db->join('tbl_products pt','pt.product_id=pi.product_id');
	 $query = $this->db->get();
	 return ($query->num_rows() > 0 ) ? $query->result_array() : false;
 }
 public function product_view() {
	 $this->db->where('pt.product_id',$this->uri->segment(4));
	 $this->db->select('ci.first_name,ci.clinic_name,pt.description,pt.image,pt.product_id,pt.product_name,pt.price')->from('tbl_products pt');
	 $this->db->join('tbl_client ci','ci.client_id = pt.clientid');
	 $query = $this->db->get();
	 return ($query->num_rows() > 0 ) ? $query->row_array() : false;
 }
 public function similar_products() {
	 $this->db->where('product_id',$this->uri->segment(4));
	 $this->db->select('product_code')->from('tbl_products');
	 $val = $this->db->get();
	 $category = $val->row()->product_code;
	 
	 $this->db->where('product_code',$category);  
	 $this->db->where('product_id !=',$this->uri->segment(4));
	 $this->db->select('description,image,product_id,product_name,price')->from('tbl_products');
	 $query = $this->db->get();
	 return ($query->num_rows() > 0 ) ? $query->result_array() : false; 
 }
 public function client_info() {
	 $this->db->where('client_id',$this->session->userdata('client_id'));
	 $this->db->select('zipcode,state,email,first_name,address,city,mobile')->from('tbl_client');
     $query = $this->db->get();
	 return ($query->num_rows() > 0 ) ? $query->row_array() : false;
 }
 public function update_qty() {
	 $id = $_POST['product_id'];
	 $qty = $_POST['qty'];
	 $totinv=count($_POST['product_id']);
	 for($i=0; $i<$totinv; $i++)
	 {
		 $this->db->where('client_id',$this->session->userdata('client_id'));
	     $this->db->where('product_id',$id[$i]);
		 $this->db->set('qty',$qty[$i]);
		 $this->db->update('tbl_chooseproduct');
	}
	return $totinv;
 }
 public function edit_clientinfo() {
	 $data = array(
		 'first_name' => $this->input->post('name'),
		 'city' => $this->input->post('city'),
		 'address' => $this->input->post('address'),
		 'state' => $this->input->post('state'),
		 'mobile' => $this->input->post('mobile'),
		 'zipcode' => $this->input->post('zipcode'),
		 'country' => $this->input->post('country')
	 );
	$this->db->where('client_id',$this->session->userdata('client_id'));
	$this->db->update('tbl_client',$data);
	return $this->session->userdata('client_id');	
 }
 public function add_rate() {
	 $data = array(
	   'rate' => $this->input->post('ratings'),
	   'product_id' => $this->uri->segment(4),
	   'rate_summary' => $this->input->post('summary'),
	   'review' => $this->input->post('review'),
	   'client_id' => $this->session->userdata('client_id'),
	   'pdt_rate' => $this->input->post('ratings1'),
	   'service_rate' => $this->input->post('Service'),
	   'date'=>date('Y-m-d')
	 );
	 $this->db->insert('tbl_productrate',$data);
	 return $this->db->insert_id();
 }
 public function add_whishlist($appointment_id) {
	 $this->db->where('product_id',$appointment_id);
	 $this->db->where('client_id',$this->session->userdata('client_id'));
	 $this->db->select('id')->from('tbl_whishlist');
	 $res = $this->db->get();
	 if($res->result_array() != false){
		 $this->db->where('id',$res->row()->id);
		 $this->db->delete('tbl_whishlist');
	     return $res->row()->id;
	 } else {
		 $data = array(
		   'product_id' => $appointment_id,
		   'client_id' => $this->session->userdata('client_id'),
		   'date'=>date('Y-m-d')
		 );
	    $this->db->insert('tbl_whishlist',$data);
	    return $this->db->insert_id();
	 }
 }
 public function get_whishlist(){
	 $val = array();
	 $this->db->where('client_id',$this->session->userdata('client_id'));
	 $this->db->select('*')->from('tbl_whishlist');
	 $query = $this->db->get();
	 if($query->result_array() != false){
		 foreach($query->result_array() as $row) {
			 array_push($val,$row['product_id']);
		 }
	 }
	 return $val;
  }
 public function reviews_view($id){
	 $this->db->where('product_id',$id);
	 $this->db->select('ci.first_name,pi.rate,pi.rate_summary,pi.review,pi.date')->from('tbl_productrate pi');
	 $this->db->join('tbl_client ci','ci.client_id=pi.client_id');
	 $query = $this->db->get();
	 return ($query->num_rows() > 0 ) ? $query->result_array() : false;
 }
 public function add_product() {
	 $cat = explode('/',$this->input->post('category'));
	  if($this->input->post('description') != ''){
	  $data = array(
	  'category' => $cat[0],
	  'product_name'=>$this->input->post('pdtname'),
	  'product_code'=> $cat[1],
	  'description'=> $this->input->post('description'),
	  'price'=>$this->input->post('price'),
	  'image'=>$this->generate_image(),
	  'warrent'=>$this->input->post('warrenty'),
	  'availability'=>$this->input->post('availability'),
	  'weight'=>$this->input->post('weight'),
	  'dimension'=>$this->input->post('dimension'),
	  'brand'=>$this->input->post('brand'),
	  'color'=> $this->input->post('color'),
	  'date' => date('Y-m-d'),
	  'clientid'=> $this->session->userdata('client_id')
	  );
	    $this->db->insert('tbl_products',$data);
	    return $this->db->insert_id();
	  } else {
	  }
  }
  public function generate_image() {
		$data = $this->input->post('image_crop');
        $data = str_replace('data:image/png;base64,', '', $data);
		$data = str_replace(' ', '+', $data);
        $data = base64_decode($data);
        $file = 'shopping_assets/products/'.rand() . '.png';
		$success = file_put_contents($file, $data);
    	$data = base64_decode($data); 
		$source_img = imagecreatefromstring($data);
		$rotated_img = imagerotate($source_img, 90, 0); 
		$file1 = './uploads/'. rand(). '.png';
		$imageSave = imagejpeg($rotated_img, $file1, 10);
		imagedestroy($source_img); 
        return $file;	
  }
  public function myproduct_lists() {
	 $this->db->where('clientid',$this->session->userdata('client_id'));
	 $this->db->select('*')->from('tbl_products');
	 $query = $this->db->get();
	 return ($query->num_rows() > 0 ) ? $query->result_array() : false;
  }
   public function add_compare($appointment_id) {
	 $this->db->where('product_id',$appointment_id);
	 $this->db->where('client_id',$this->session->userdata('client_id'));
	 $this->db->where('date',date('Y-m-d'));
	 $this->db->select('id')->from('tbl_productcompare');
	 $res = $this->db->get();
	 if($res->result_array() != false){
		 $this->db->where('id',$res->row()->id);
		 $this->db->delete('tbl_productcompare');
	     return $res->row()->id;
	 } else {
		 $data = array(  
		   'product_id' => $appointment_id,
		   'client_id' => $this->session->userdata('client_id'),
		   'date'=>date('Y-m-d')
		 );
		 $this->db->insert('tbl_productcompare',$data);
		 return $this->db->insert_id();
	 }  
  }
  public function get_comparelist() {
	 $val = array();
	 $this->db->where('client_id',$this->session->userdata('client_id'));
	 $this->db->select('product_id')->from('tbl_productcompare');
	 $query = $this->db->get();
	 if($query->result_array() != false){
		 foreach($query->result_array() as $row) {
			 array_push($val,$row['product_id']);
		 }
	 }
	 return $val;
  }
  public function mycompare_lists() {
	  $this->db->where('pc.client_id',$this->session->userdata('client_id'));
	  $this->db->where('pc.date',date('Y-m-d'));
	  $this->db->select('pc.product_id,pi.product_name,pi.description,pi.image,pi.price,pi.warrent,pi.weight,pi.dimension,pi.brand,pi.color,pi.availability')->from('tbl_productcompare pc');
	  $this->db->join('tbl_products pi','pc.product_id = pi.product_id');
	  $query = $this->db->get();
	  return ($query->num_rows() > 0 ) ? $query->result_array() : false;
  }
  public function remove_compare($appointment_id) {
	  $this->db->where('client_id',$this->session->userdata('client_id'));
	  $this->db->where('product_id',$appointment_id);
	  $this->db->delete('tbl_productcompare');
	  return $appointment_id;
  }
  public function mywish_lists() {
	  $this->db->where('pc.client_id',$this->session->userdata('client_id'));
	  $this->db->select('pc.product_id,pi.product_name,pi.description,pi.image,pi.price,pi.warrent,pi.weight,pi.dimension,pi.brand,pi.color,pi.availability')->from('tbl_whishlist pc');
	  $this->db->join('tbl_products pi','pc.product_id = pi.product_id');
	  $query = $this->db->get();
	  return ($query->num_rows() > 0 ) ? $query->result_array() : false;
  }
   public function add_settings() {
	    $data = array(
		      'client_id' => $this->session->userdata('client_id'),
			  'company_name' => $this->input->post('company_name'),
			  'desc' => $this->input->post('desc') ,
			  'experience' => $this->input->post('experience'),
			  'date' => date('Y-m-d')
		  );
	  if($this->input->post('company_id') != ''){
		  $this->db->where('c_id',$this->input->post('company_id'));
		  $this->db->update('tbl_pdtcompany',$data);
		  return $this->input->post('company_id');
		  
	  } else {
		  $this->db->insert('tbl_pdtcompany',$data);
		  return $this->db->insert_id();
	  }
  }
  public function mydetails() {
	  $this->db->where('client_id',$this->session->userdata('client_id'));
	  $this->db->select('*')->from('tbl_pdtcompany');
	  $query = $this->db->get();
	  return ($query->num_rows() > 0 ) ? $query->row_array() : false;
  }
  public function mycompany_details1() {
	  $this->db->where('pi.product_id',$this->uri->segment(4));
	  $this->db->select('ci.company_name,ci.desc,ci.experience')->from('tbl_products pi');
	  $this->db->join('tbl_pdtcompany ci','pi.clientid = ci.client_id');
	  $query = $this->db->get();
	  return ($query->num_rows() > 0 ) ? $query->row_array() : false;
 
  }
 



} ?>