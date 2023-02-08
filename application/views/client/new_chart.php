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
    
  <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
    <meta name="msapplication-tap-highlight" content="no">
 

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
                                    <div class="card-header">View Sent Exercise Prescription
                                         
                                    </div>
									<div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Date</th>
												 
												<th class="text-center">Patient Name</th>
												 
												<th class="text-center">Email</th>
												<th class="text-center">Chart Name</th>
												 
												<th class="text-center">Payment Method</th>
                                                 
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php if($result != false){  ?>
											 <?php foreach($result as $row){ 
			     ?>
				 <?php
				$this->db->select('patient_code')->from('tbl_patient_info')->where('patient_id',$row['patient_id']);
		        $query=$this->db->get();
				if($query->result_array() != false){
				$code=$query->row()->patient_code; } else { $code =''; }
             ?>
                                            <tr>
											 <td class="text-center"><?php echo date('d-m-Y',strtotime($row['ex_date'])); ?></td>
												<td class="text-center"><?php echo $row['patient_name']?></td> 
												<td class="text-center"><?php echo $row['email'] ?></td>
                                                <td class="text-center text-muted"> 
												<div class="badge badge-pill badge-info"><?php echo $row['chartname']; ?></div>
												
												</td>
                                                <td class="text-center"><?php echo $row['pay'] ?></td>
                                            </tr>
                                             <?php } ?>
											 <?php } else { echo '<tr><td class="text-center"  colspan="5">No More Records</td></tr>'; }  ?>
                            
                                            </tbody>
                                        </table>
										 
										 <nav class="pagination-rounded" aria-label="Page navigation example" style="text-align:center;">
                                    <ul class="pagination" >
									  <?php foreach ($links as $link) { ?>
										<li>
											<?php echo $link; ?>
										</li>
										<?php } ?>
                                     </ul>
								  </nav>
								  
						 
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
