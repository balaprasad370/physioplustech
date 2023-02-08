<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Inventory List - Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
    
 
    <meta name="msapplication-tap-highlight" content="no">
 
<link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
<link href="<?php echo base_url()?>asset_list/main.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>my_assets/jquery-confirm.css" />
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
                                    <div class="card-header">Stock Details
                                         
                                    </div> 
											 <div class="card-body">
                                    <div class="table-responsive">
									<a style="float:right;" href="<?php echo base_url().'client/inventory/edit_list/'.$this->uri->segment(4); ?>"> <button style="align:'right';" type="submit" class="mb-2 mr-2 btn btn-primary"> Edit </button></a>
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
											<tr><td colspan="9"> <input style="width:100%;" type="text" name="search" placeholder="Search All Fields" class="form-control search" id="search"/> </td>
										</tr>
                                                <th class="text-center">No</th>
												 <th class="text-center">Name</th>
												 <th class="text-center">Size</th>
												 <th class="text-center">Wholesale Price</th>
												 <th class="text-center">Retail Price</th>
												 <th class="text-center">Buy price</th>
												 <th class="text-center">Initial Cost</th>
												 <th class="text-center">Initial Stock</th>
												 <th class="text-center">Current Stock</th>
                                            </tr>
                                            </thead>
                                            <tbody id="myTable">
											 <?php $cnt=1; ?>
											<?php if($inventory != false){ 
										foreach ($inventory as $row) {
										  $item_id = $row['color_code'].'/'.$row['inventory_id'];
										  $this->db->where('item_id',$item_id);
										  $this->db->select('SUM(item_quantity) as quantity')->from('tbl_invoice_detail');
										  $res = $this->db->get();
										  if($res ->result_array() != false){
											  $quan = $res->row()->quantity;
										  } else {
											  $quan = 0;
										  }
										?>
												<tr>
                                                <td class="text-center text-muted"> 
												<?php echo $cnt; $cnt++;?>
												</td>
                                                
                                                 <td class="text-center"><?php echo $row['variant_value']?></td>
												 
												<td class="text-center"> <?php echo $row['size']; ?></td>
											   <td class="text-center"><?php echo $row['wholesale_price'] ?></td>
											 
                                                <td class="text-center">
												 <?php echo $row['retail_price']?>
                                                </td>
												
												<td class="text-center">
												 <?php echo $row['buy_price'] ?>
                                                </td>
												
												<td class="text-center">
												<?php echo $row['initial_cost'] ?>
                                                </td>
												
												<td class="text-center">
												<?php echo $row['initial_stock'] ?>
                                                </td>
												
												<td class="text-center">
												<?php $current = $row['initial_stock'] - $quan; echo $current; ?>
                                                </td>
												
                                            </tr>
                                             <?php } ?>
                                            </tbody>
                                        </table>
										 
										 
								  
						<?php } else { echo '</br><center>No Records Found</center>'; }  ?>
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
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-confirm.js"></script>	
 
<script>
 $(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
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
