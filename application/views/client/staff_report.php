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
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
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
                                    <div class="card-header"> Staff Productivity (Treatment Wise)
                                       
                                    </div>
									 <div class="card-body">
                                    <div class="table-responsive">
									  
									   <table class="table table-striped" style="">
                                             
                                                <tr>

											<td>
											<select class="therapist" name="therapist" id="therapist">
												<option selected="true" disabled="disabled">Please Select</option>
												 <?php foreach($info as $row) { ?>
								<option value="<?php echo $row['staff_id'] ?>"><?php echo $row['first_name'].' '.$row['last_name'] ?></option>
						    <?php } ?>
										  </select>
												</td>
												
											    <td>   <input type="text" style="width: " autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="From" id="from" data-toggle="datepicker"/>
                                                </td>
												<td>   <input type="text" style="width: " autocomplete="off;" data-date-format='D-M-YYYY' class="form-control datepicker" placeholder="To" id="to" data-toggle="datepicker"/>
                                                </td>
												<td><button class="btn btn-pill btn-success" id="dateFilter" > Go</button>
                                                 &nbsp;&nbsp;<button class="btn btn-pill btn-info" id="export"><i class="fa fa-download"></i></button>
												</td>
												
												 
												</tr>
											  
                                        </table>
                                        </br>
									
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                               <th class="text-center">S.No</th>
												<th class="text-center">Date</th>
												<th class="text-center">Patient Name</th>
												<th class="text-center">Treatment Name</th>
												<th class="text-center">Total Amount</th>
												 
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php  if($result != false){ ?>
									 
											<?php $c = 1; $amt=0; foreach($result as $row){ ?>
                                            <tr>
                                                <td class="text-center"><?php echo $c ?></td>
						                        <td class="text-center"><?php echo $row['treatment_date'] ?></td>
						                       <td class="text-center"><?php echo $row['first_name'].' '.$row['last_name'] ?></td>
											   <td class="text-center"><?php echo $row['item_name'] ?></td>
											   <td class="text-center"><?php echo $row['item_amount']; ?></td>
											    </tr>
                                             
						 <?php $c=$c+1; $amt += $row['item_amount'];?>
							<?php } ?>
						<tr>
						<td class="text-center"></td>
						<td class="text-center"></td>
						<td class="text-center"></td>
						<td class="text-center"><strong>Total</strong></td>
						<td class="text-center"><strong><?php echo $amt; ?></strong></td>
						 </tr>
					  
					    <?php } else { echo '<tr><td class="text-center"  colspan="6">No More Records</td></tr>'; }  ?>
                                            
                                            </tbody>
                                        </table>
							 
							</br>
							
							 
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> 		
<script>
$('select').select2();

$('#dateFilter').click(function(e){
		e.preventDefault();
		var	
		from = $('#from').val();
		to = $('#to').val();
		var date_app=$('#from').val();
		var date = date_app.split('/'); 
		var start_date=date[0]+'-'+date[1]+'-'+date[2];
		var date_app1=$('#to').val();
		var date1 = date_app1.split('/'); 
		var to_date=date1[0]+'-'+date1[1]+'-'+date1[2];
		var therapist=$('#therapist').val();
		if(from == '' || to == '') {
			alert('Please select start date or end date.', 'Date Filter error');
		} else {
			window.location = '<?php echo base_url(); ?>client/staff/staff_report/search/'+ start_date + '/' + to_date + '/' + therapist;
		}
	});
	
	var myDate = new Date();
	var prettyDate =(myDate.getDate()) + '/' + (myDate.getMonth()+1) + '/' +
	myDate.getFullYear();
	$(".datepicker").val(prettyDate);
	
 
   $('#export').click(function(e){
		e.preventDefault();
		var value = '<?php echo $this->uri->segment(4); ?>'; 
		if( value == 'search'){
			var	 ty = '<?php echo $this->uri->segment(5); ?>';
			var type = '<?php echo $this->uri->segment(6); ?>';
			var val = '<?php echo $this->uri->segment(7); ?>';
			if(from == '' || to == '')
			{
				alert('Please select start date or end date.', 'Date Filter error');
			} 
			else
			{
				window.location = '<?php echo base_url(); ?>client/staff/export_staffpro_treatment/date/' + ty+'/'+type+'/'+val;
			}
		}
		else {
			 alert('Please select start date or end date.', 'Date Filter error');
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
