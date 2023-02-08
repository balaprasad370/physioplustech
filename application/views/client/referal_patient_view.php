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
                                    <div class="card-header">Patient Referals
                                         
                                    </div>
									 <?php if($referals != false){ ?>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Referal name</th>
												 
												<th class="text-center">Organisation</th>
												 
												 <th class="text-center">Address</th>
												 
												<th class="text-center">Action</th>
                                                 
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php  
						                   foreach ($referals as $referal) {
						                   ?>
                                            <tr>
                                                 
                                                 <td class="text-center"><?php echo $referal['referal_name']; ?></td>
												 
												<td class="text-center"><?php echo $referal['org_name']; ?></td>
											   <td class="text-center"><?php echo $referal['address_line1']; ?></td>
											 <td class="text-center">
												  <a class="edit" href="<?php echo base_url().'client/referal/edit_other/'.$referal['referal_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>
												<a href="<?php echo '#'.$referal['referal_id']; ?>"><button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-alt"> </i></button></a>
												</td>
                                            </tr>
                                             <?php } ?>
                                            </tbody>
                                        </table>
										 
						<?php } else { echo '</br><center><h5 class="card-title" style="text-transform:capitalize;">No Records Found</h5></center>'; }  ?>
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
		
		$('#delete').on('click', function () {
			 var concess_group_id = $(this).attr('href').split('#')[1];
			 $.confirm({
             title: 'Confirmation',
             content: 'Are you sure you want to delete this concession group?',
             confirmButton: 'Proceed',
             confirmButtonClass: 'btn-info',
             icon: 'fa fa-question-circle',
             animation: 'scale',
             animationClose: 'top',
             opacity: 0.5,
             confirm: function () {
				 
				 $.ajax({
						url : '<?php echo base_url().'client/concessgroup/delete' ?>',
						type: "POST",
						data : {p_id:concess_group_id},
						dataType: 'json', 
						success:function(data, textStatus, jqXHR,form) 
						{
							$.alert('concessgroup record has been deleted successfully!');
							$('#'+concess_group_id).remove();
						},
						 error: function(jqXHR, textStatus, errorThrown) 
						{
							$.alert('Concessgroup record has been deleted successfully!');
							$('#'+concess_group_id).remove();
						} 
				});
			 }
         });
    }); 
	
	
	$('.delete').on("click", function () {
		         var concess_group_id = $(this).attr('href').split('#')[1];
					swal({
                        title: "Are you sure?",
                        text: "you want to delete this concession group?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes",
                        cancelButtonText: "No",
                        closeOnConfirm: false,
                        closeOnCancel: false},
                        function (isConfirm) {
                            if (isConfirm) {
								$.ajax({
											url : '<?php echo base_url().'client/concessgroup/delete' ?>',
											type: "POST",
											data : {p_id:concess_group_id},
											dataType: 'json', 
											success:function(data, textStatus, jqXHR,form) 
											{
												swal("Deleted!", "concessgroup record has been deleted successfully.", "success");
												setTimeout(function(){ 
													window.location.reload();
												}, 1000);
											},
											error: function(jqXHR, textStatus, errorThrown) 
											{
												swal("Failure!", "concessgroup record not has been deleted successfully", "Failure");
												setTimeout(function(){ 
													window.location.reload();
												}, 1000);
											}
									});
                            } else {
                                swal("Cancelled", "Delete Option Cancelled", "error");
                            }
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
