<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Edit Inventory - Physio Plus Tech</title>
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
                                    <div class="card-header"> Stock Details
                                         
                                    </div>
									<div class="card-body">
									<form action="<?php echo base_url().'client/inventory/edit/' ?>" method="POST" >
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="text-center">No</th>
												 <th class="text-center">Name</th>
												 <th class="text-center">Size</th>
												<th class="text-center">Wholesale Price</th>
												 <th class="text-center">Retail Price</th>
                                                  <th class="text-center">Buy price</th>
                                                  <th class="text-center">Initial Cost</th>
                                                  <th class="text-center">Initial Stock</th>
                                                 
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php $cnt=1; ?>
                                      <?php if($inventory != false){ foreach ($inventory as $row) { ?>
                                            <tr>
                                                <td class="text-center text-muted"> 
												<?php echo $cnt; $cnt++;?>
												
												</td>
                                                
                                                 <td class="text-center"><?php echo $row['variant_value']?></td>
												 
												<td class="text-center"><?php echo $row['size']; ?></td>
											 <input type="hidden" class="form-control" name="variant_value[]" id="variant_value" value="<?php echo $row['variant_value'] ?>" />
						  <input type="hidden" class="form-control" name="inventory_id[]" id="inventory_id" value="<?php echo $row['inventory_id'] ?>" />
						  <input type="hidden" class="form-control" name="size[]" id="size" value="<?php echo $row['size'] ?>" />
						  <input type="hidden" class="form-control" name="color_id[]" id="color_id" value="<?php echo $row['color_id'] ?>" />
						 
						 
						    <td class="text-center"><input type="text" class="form-control" name="wholesale_price[]" id="wholesale_price" value="<?php echo $row['wholesale_price'] ?>" /></td>
							<td class="text-center"><input type="text" class="form-control" name="retail_price[]" id="retail_price" value="<?php echo $row['retail_price']?>" /></td>
							<td class="text-center"><input type="text" class="form-control" name="buy_price[]" id="buy_price"  value="<?php echo $row['buy_price'] ?>" /></td>
							<td class="text-center"><input type="text" class="form-control" name="initial_cost[]" id="initial_cost" value="<?php echo $row['initial_cost'] ?>" /></td>
							<td class="text-center"><input type="text" class="form-control" name="initial_stock[]" id="initial_stock" value="<?php echo $row['initial_stock'] ?>" /></td>
                                            </tr>
                                             <?php } ?>
											 
											 <tr colspan="8">&nbsp;</tr>
						<tr ><td colspan="8" class="text-center"><button class="mb-2 mr-2 btn btn-pill btn-primary btn-pill btn-sm" type="submit" id="save_pdt"> Edit </button></td></tr>
						
                                            </tbody>
                                        </table>
										 
										 
								  
						<?php } else { echo '</br><center>No Records Found</center>'; }  ?>
                                    </div>
									</form>
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
 $(function(){
		var val = '<?php echo $this->uri->segment(5); ?>';
		if(val != false){
		    alert('changes your Quantity Details of the Product else  Save It.');
		} 
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
