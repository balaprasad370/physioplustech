<!DOCTYPE html>
<html lang="en">
<head>
  <title>Physio Plus Tech</title>
  <meta charset="utf-8">
  <link rel="icon" type="image/ico" href="<?php echo base_url()?>assets/images/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.button {
    background-color: #008CBA; 
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
  </head>
<body>
<?php $client_id = $this->uri->segment(4);
	                                  $this->db->select('clinic_name,logo,website'); 
	                                  $this->db->from('tbl_client');
                  					  $this->db->where('client_id', $client_id);
									  $query = $this->db->get();
									  $name = $query->row()->clinic_name;
									  $logo = $query->row()->logo;
									  $website=$query->row()->website;
									  
									  ?>
<div class="container">
  <h2>Registration Confirmation</h2>
  <div class="alert alert-success">
    <h3>Success!</h3> <h4>Thank you for registering with "<?php echo $name; ?>" We Will contact you Very Soon !!!</h4>
	
  </div>
  
</div>
<center><button class="button" id="button"> Back To home</button></center>
<script>
$(document).ready(function(){    
      $('#button').click(function(){
		  window.location.href='<?php echo $website;?>';
	  });
	});
</script>
</body>
</html>
