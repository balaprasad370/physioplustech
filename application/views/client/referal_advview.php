<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Referral Advertisement - Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
    
  <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
    <meta name="msapplication-tap-highlight" content="no">
 

<link href="<?php echo base_url()?>asset_list/main.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>my_assets/jquery-confirm.css" />
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
                                    <div class="page-title-subheading opacity-10">
                                        <nav class="" aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item">
                                                    <a href="<?php echo base_url().'client/dashboard/home' ?>">
                                                        <i aria-hidden="true" class="fa fa-home"></i>
                                                    </a>
                                                </li>
												<li class="breadcrumb-item">
                                                       REFERRAL
                                                </li>
                                                <li class="breadcrumb-item">
                                                    <a href="<?php echo base_url().'client/referal/view_referal' ?>" >REFERRAL VIEW</a>
                                                </li>
                                                <li class="active breadcrumb-item" aria-current="page">
                                                    ADVERTISEMENT  REFERRALS VIEW
                                                </li>
                                            </ol>
                                        </nav>
                                    </div><div class="card-header">Advertisement Referrals Views
                                         
                                    </div>
									<div class="card-body">
									<?php if($referals != false){  ?>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Advertisement Name</th>
												 
												<th class="text-center">Description</th>
												 
												<th class="text-center">Action</th>
                                                 
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php  
						                   foreach ($referals as $referal) {
						                   ?>
                                            <tr id="<?php echo $referal['referal_id']; ?>">
                                                 
                                                 <td class="text-center"><?php echo $referal['adv_name']; ?></td>
												 
												<td class="text-center"><?php echo $referal['location_of_adv']; ?></td>
											 <td class="text-center">
												  <a class="edit" href="<?php echo base_url().'client/referal/edit_other/'.$referal['referal_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
												<a href="<?php echo '#'.$referal['referal_id']; ?>" class="delete"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"> </i></button></a>
												</td>
                                            </tr>
                                             <?php } ?>
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
						<?php } else { echo '</br><center><h5 class="card-title" style="text-transform:capitalize;">No Records Found</h5></center>'; }  ?>
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
$(document).ready(function() {
		$('.delete').on('click', function () {
			 var referal_id = $(this).attr('href').split('#')[1];
			 url ='<?php echo base_url().'client/referal/delete/' ?>'+ referal_id; 
			 swal({
			  title: "Confirmation",
			  text: "Are you sure you want to Delete this Referral?",
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
					data : {r_id:referal_id},
					dataType: 'json', 
					success:function(data, textStatus, jqXHR,form) 
					{ 
					 	if(data.status == 'success') { 
						  swal("Success!", "Your records has been Deleted!", "success");
						}
						 $('#'+referal_id).remove(); 
							
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
