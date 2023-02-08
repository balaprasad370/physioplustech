<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Marketing_model extends CI_Model {
	
	
	public function getclient($id)
	{
		$where=array('client_id' => $id);
		$this->db->select('*')->from('tbl_client')->where($where);
		$query=$this->db->get();

		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}
	
	public function send_mail($client_id)
   {	    
	   
		$this->db->where('client_id',$client_id);
		$this->db->select('email,first_name,mobile,address,username')->from('tbl_client');
		$res = $this->db->get();
		$username = $res->row()->username;
		$first_name = $res->row()->first_name;
		$email = $res->row()->email;
		$mobile = $res->row()->mobile;
		$address = $res->row()->address; 
		$digits = 5;
		$quote_no =  rand(pow(10, $digits-1), pow(10, $digits)-1);
		$date = date('d-m-y');
		$this->load->library('email');
		$this->load->helper('path');
        $this->load->helper('directory'); 
		$this->email->initialize(array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'smtp.sendgrid.net',
				  'smtp_user' => 'physiotechasia',
				  'smtp_pass' => 'Physioasia@2019',
				  'smtp_port' => 587,
				  'crlf' => "\r\n",
				  'mailtype' => 'html',
				  'newline' => "\r\n"
		  ));
          $path = set_realpath('uploads/mail/');
          $file_names = directory_map($path);
		  $this->email->from('no-reply@physioplustech.com','Physio Plus Tech');
		  	
		  $template='
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
      <tr>
        <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
          
          <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:100%;">
            <tr>
              <td align="center" height="6" ></td>
            </tr>
          </table>
          <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:800px;">
            <tr>
              <td align="center" valign="top" style="background-color: #ffffff; font-size:0; padding: 35px 35px 0;" bgcolor="#ffffff">
                
                <div class="align-center" style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;">
                  <table class="align-center" align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:800px;">
                    <tr>
                      <td align="left" height="48" valign="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size:48px; font-weight: 800; line-height: 48px;" class="mobile-center">
                        <h1 style="font-size: 0; line-height: 0; font-weight: 600;  margin: 0; color: #ffffff;"><img src="https://www.physioplustech.in/images/physio-tech.png" width="250" height="150" style="display: block; border: 0px;" alt="" /><span></span></h1>
                      </td>
                    </tr>
                  </table>
                </div>
               
                <div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;" class="mobile-hide">
                  <table align="right" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                    <tr>
                      <td align="right" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;">
                        <table cellspacing="0" cellpadding="0" border="0" align="right">
                          <tr>
                            <td style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400;">
                              <p style="font-size: 16px; font-weight: 400; margin: 0;line-height:1.6;"></br>180, Gnanagiri Road, Palaniandavarpuram Colony,</br>Sivakasi - 626123, Tamil nadu
							  </br> www.physioplustech.com</br> contact@physioplusnetwork.com</p>
							  <p style="font-size: 16px; font-weight: 400; margin: 0;line-height:1.6;">9894604603,</br> 04562222603</p>
                            </td>
                            
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
                 
              </td>
            </tr>
			
			 <tr>
              <td align="center" valign="top" style="background-color: #ffffff; font-size:0; padding: 35px 35px 0;" bgcolor="#ffffff">
                
                <div class="align-center" style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;">
                  <table class="align-center" align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:800px;">
                    <tr>
                      <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 0 10px;">
                            <p style="font-weight: 800;">To</p>
                              <p>'.$first_name.'<br>'.$email.'<br>'.$mobile.'</p>
  
                            </td>
                    </tr>
                  </table>
                </div>
               
                <div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;" class="mobile-hide">
                  <table align="right" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                    <tr>
                      <td align="right" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;">
                        <table cellspacing="0" cellpadding="0" border="0" align="right">
                          <tr>
                           <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 0 10px;">
                              <p style="font-weight: 800;">Invoice</p>
                              <p>Date : '.$date.'<br>Invoice No : '.$quote_no.' </p>

                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
                 
              </td>
            </tr>
			
            <tr>
              <td align="center" style="padding: 0 15px 20px 15px; background-color: #ffffff;" bgcolor="#ffffff">
                 
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                  
                  <tr>
                    <td align="right" style="padding-top: 20px;">
                      <table cellspacing="0" cellpadding="0" border="0" width="100%">
                        <tr>
                          <td width="25%" align="right" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                           Description
                          </td>
                          <td width="25%" align="right" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                            Rate 
                          </td>
						 
                        </tr>
                        <tr>
                          <td width="25%" align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                             Software Subscription (2019 - 2020)
                          </td>
                          <td width="25%" align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                            Rs.8,000 /-	
                          </td>
						  
                        </tr>
						 
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td align="right" style="padding-top: 20px;">
                      <table cellspacing="0" cellpadding="0" border="0" width="100%">
                        <tr>
                          <td width="75%" align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 10px; border-top: 2px solid #eeeeee; border-bottom: 2px solid #eeeeee;">
                            Subtotal
                          </td>
                          <td width="25%" align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 10px; border-top: 2px solid #eeeeee; border-bottom: 2px solid #eeeeee;">
                            Rs.8,000 /-
                          </td>
                        </tr>
						<tr>
                          <td width="75%" align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 10px; border-top: 2px solid #eeeeee; border-bottom: 2px solid #eeeeee;">
                            Discount
                          </td>
                          <td width="25%" align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 10px; border-top: 2px solid #eeeeee; border-bottom: 2px solid #eeeeee;">
                            Rs.2,000 /-
                          </td>
                        </tr>
						<tr>
                          <td width="75%" align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 2px solid #eeeeee; border-bottom: 2px solid #eeeeee;">
                            Total
                          </td>
                          <td width="25%" align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 2px solid #eeeeee; border-bottom: 2px solid #eeeeee;">
                            Rs.6,000 /-
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
                 
              </td>
            </tr>
            <tr>
              <td align="center" height="100%" valign="top" width="100%" style="padding: 0 15px 5px 15px; background-color: #ffffff;" bgcolor="#ffffff">
                 
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                  <tr>
                    <td align="center" valign="top" style="font-size:0;">
                      
                      <div class="mw-50" style="display:inline-block; padding-bottom: 15px; vertical-align:top; width:100%;">

                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                          <tr>
                            <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 0 10px;">
                              <p style="font-weight: 800;">Invoice generated by,</p>
                              <p>PHYSIO PLUS TECH</p>
                            </td>
                          </tr>
                        </table>
                      </div>
                      
                      
                      
                    </td>
                  </tr>
                </table>
                
              </td>
            </tr>
            
            <tr>
              <td align="center" style="padding: 0 15px 20px 15px; background-color: #ffffff;" bgcolor="#ffffff">
               
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                  <tr>
                    <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                      
                      <h5 style="font-size: 16px; font-weight: 600; line-height: 26px; color: #333333; margin: 0;">
                             *** This is computer generated invoice no signature required. ***
                            </h5>
                    </td>
                  </tr>
                  
                 
                </table>
                
              </td>
            </tr>

          </table>
          
        </td>
      </tr>
    </table>

';
		
		$this->email->to($username);
		$this->email->subject('Physio Plus Tech - Invoice');
		$this->email->message($template);
		$this->email->send();
		//print_r($template);
   }
	
	
}?>

