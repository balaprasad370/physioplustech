<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
    
 
    <meta name="msapplication-tap-highlight" content="no">
 
<link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
<link href="<?php echo base_url()?>asset_list/main.css" rel="stylesheet">
<script src="<?php echo base_url() ?>assets/sweet-alert/sweetalert.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/sweet-alert/sweetalert.css">
<style>
.pagination {
  display: inline-block;
}

.pagination li {
  color: black;
  float: left;
  text-decoration: none;
}
</style>
 <style>

  img.resize{
   max-width:25%;
   max-height:25%;
}
</style>
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
                          
				<?php include("sidebar.php");?>
             <div class="app-main__outer">
                <div class="app-main__inner">
                             
                    <div class="tabs-animation">
                         
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Stock Value
                                         
                                    </div>
									<div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                 <th class="text-center">No</th>
												 <th class="text-center">Product Name</th>
												 <th class="text-center">Available</th>
												 <th class="text-center">Total Buy Price</th>
												 <th class="text-center">Sold</th>
												 <th class="text-center">Sales Amount</th>
                                                 
                                            </tr>
                                            </thead>
                                            <tbody>
											<tr>
											<?Php $amount = 0;
											$quantity = 0;
											$total = 0; 
											$cnt = 1;
											$CI =& get_instance();
												$CI->load->model(array('inventory_model'));	
												$info = $CI->inventory_model->inventory_detail($inventory['inventory_id']);
												$this->db->where('inventory_id',$inventory['inventory_id']);
												$this->db->select('color_code')->from('tbl_inventory_color');
												$res = $this->db->get();
												foreach($res->result_array() as $row1){
													$value = $row1['color_code'].'/'.$inventory['inventory_id'];
													$this->db->where('item_id',$value);
													$this->db->select('item_amount,item_quantity')->from('tbl_invoice_detail');
													$res = $this->db->get();
													if($res->result_array() != false) {
														$amount += $res->row()->item_amount;
														$quantity += $res->row()->item_quantity;
													} else {
														
													}
												} ?>
                                                <td class="text-center text-muted"> 
												<?php echo $cnt; $cnt++;?>
												
												</td>
                                                <td class="text-center"><?php echo $pro_name['pro_name'] ?></td>
                                                <td class="text-center"><?php echo $inventory['stock'] - $quantity; ?></td>
                                                <td class="text-center"><?php echo $pro_name['buy_price'] * $pro_name['initial_stock']; ?></td>
                                                <td class="text-center"><?php echo $quantity; ?></td>
											    <td class="text-center">
												 <?php  $total += $amount; echo $total; ?>
                                                </td>
												
												
												
												
												
                                            </tr>
											</tbody>
                                        </table>
										 
										 
                                    </div>
									</div>
                                     
                                </div>
                            </div>
                        </div>
                         
                         
                    </div>
                </div>
                    </div>
    </div>
  
 
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script>
 
 
<script>
 $(document).ready(function() {
		$('.delete').on('click', function () {
			 var inventory_id = $(this).attr('href').split('#')[1];
			 url ='<?php echo base_url().'client/inventory/delete/' ?>'+ inventory_id; 
			 swal({
			  title: "Confirmation",
			  text: "Are you sure you want to Delete this Stock?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: 'btn-info',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false,
			},
			function(){
				$.ajax({
					type: 'post',
					url: url,
					data : {p_id:inventory_id},
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
					 	if(data.status == 'success') { 
						  swal("Success!", "Your records has been Deleted!", "success");
						}
						 window.location.reload();
							
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						  swal("Failure!", "Your records has not been Deleted!", "success");
						// window.location.reload(); 
					}
				  });
			}); 
	}); 
	
});
</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5eceda798ee2956d73a53d09/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>
