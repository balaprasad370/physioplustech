<!DOCTYPE html>
<html>
  <head>
    <title>Physio Plus Tech</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8" />
	<link rel="shortcut icon" href="<?php echo base_url() ?>admin_assets/dist/img/ico/favicon.png" type="image/x-icon" /> 
	<link href="<?php echo base_url() ?>assets/css/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/vendor/animate/animate.css">
    <link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url() ?>assets/js/vendor/mmenu/css/jquery.mmenu.all.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/videobackground/css/jquery.videobackground.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/vendor/bootstrap-checkbox.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/vendor/bootstrap/bootstrap-dropdown-multilevel.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/summernote/css/summernote.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/summernote/css/summernote-bs3.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/chosen/css/chosen.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/chosen/css/chosen-bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/datepicker/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/colorpicker/css/bootstrap-colorpicker.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/colorpalette/bootstrap-colorpalette.css">
	<link rel="stylesheet" href="<?php  echo base_url();  ?>assets/js/vendor/modals/css/component.css">
	<link href="<?php echo base_url() ?>assets/css/minimal.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/js/vendor/datatables/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/js/vendor/datatables/css/ColVis.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/js/vendor/datatables/css/TableTools.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/jgrowl/css/jquery.jgrowl.min.css">
	<link href="<?php  echo base_url();  ?>assets/css/minimal.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/jquery-confirm.css" /> 
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/sticky.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-confirm.js"></script>
 
	</head>
  
  <body class="bg-1">

   
    
    <div id="wrap">
     <div class="row">
	<?php $this->load->view('physioadmin/sidebar');  ?>
       <div id="content" class="col-md-12">
          <div class="pageheader">
          <h2><i class="fa fa-lightbulb-o" style="line-height: 48px;padding-left: 0;"></i> Notification Details <span></span></h2>
           <div class="breadcrumbs">
              <ol class="breadcrumb">
                <li>You are here</li>
                <li><a href="">Physio Plus</a></li>
                <li class="active">Notification Details</li>
              </ol>
            </div>
         </div>
         <div class="main">
          <div class="row">
            <div class="col-md-12">
               <section class="tile transparent">
					
				  <div class="row">
              
              <div class="col-md-6">
               
                <section class="tile color transparent-black">
                  
                  <div class="tile-header">
                    <h1><strong>Push Notification to all devices</strong></h1>
                    <div class="controls">
                      <a href="#" class="minimize"><i class="fa fa-chevron-down"></i></a>
                      <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
                      <a href="#" class="remove"><i class="fa fa-times"></i></a>
                    </div>
                  </div>
                   <div class="tile-body">
				  
                   <form class="form-horizontal" action ="<?php echo base_url().'physioadmin/dashboard/send_notification' ?>"  method="post" role="form" parsley-validate id="basicvalidations">
                     <div class="form-group">
                        <label for="input01" class="col-sm-4 control-label">Title</label>
                        <div class="col-sm-8">
                          <input type="text" name="title" maxlength="30" class="form-control" id="title">
                             <span id="title_count" style="color:red;font-weight:bold title_count"></span>
						</div>
                      </div>
					  <div class="form-group">
                        <label for="input01" class="col-sm-4 control-label">Short description</label>
                        <div class="col-sm-8">
                           <textarea class="form-control" maxlength="80" rows="2" parsley-trigger="change" parsley-required="true" id="short_desc" name="short_desc" rows="4"></textarea>
							  <span id="count" style="color:red;font-weight:bold title_count"></span>
					    </div>
                      </div>
					  <div class="form-group transparent-editor">
                        <label for="fullname" class="col-sm-4 control-label">Message :</label>
                        <div class="col-sm-8">
                         <textarea  id="input06" rows="6" name="message" placeholder="">
						   </textarea>
                        </div>
                      </div>
                      
					  
					  <div class="form-group">
                        <label for="fullname" class="col-sm-4 control-label"><h4>Image : </h4></label>
                        </br><input type='file' id='logo_upload' name='logo_upload'>
                        <input type="hidden" name="upload_img" id="upload_img" />
					   <div style="display:none" id="dvloader"><p>Uploding Please Wait...</p><img src="<?php echo base_url().'img/loader.gif'; ?>" /></div>
						 <input type="hidden" name="time" id="time" />
					   
					  </div> 
					  <div class="form-group form-footer">
                        <div class="col-sm-offset-4 col-sm-8">
                          <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                          <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                      </div>
                    </form>
				   <?php  ?>
                  </div>
                </section>
               </div>
             </div>
			 </br></br>
                  <div class="tile-body color transparent-black rounded-corners">
                     <div class="table-responsive">
					<table  class="table table-datatable table-custom" id="basicDataTable">
					   <tr><td> <input type="text" name="from" Placeholder="From date" data-date-format='D-M-YYYY' value="<?php if(isset($dateFilter)) echo $from_date; ?>" class="form-control datepicker"  id="from"> </td>
					   <td>  <input type="text" name="to"  Placeholder="To date" data-date-format='D-M-YYYY' class="form-control datepicker" value="<?php if(isset($dateFilter)) echo $to_date; ?>"  id="to">  </td>
					    <td> <button class="btn btn-redbrown" id="dateFilter" > Go</button> </td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						
					   </tr>
					   </table>
					 <?php if($notification_report != false) { ?>
                      <table  class="table table-datatable table-custom" id="basicDataTable">
                        <thead>
                          <tr>
                            <th><center><h4>S.No</h4></center></th>
                            <th><center><h4>Date</h4></center></th>
							<th><center><h4>Title</h4></center></th>
							<th><center><h4>Short Description</h4></center></th>
							<th><center><h4>Action</h4></center></th>
                          </tr>
                        </thead>
                        <tbody>
						<?php $i=1;  foreach($notification_report as $row) {
								?>
								<tr>
						 <td><h4> <?php echo $i; ?></h4> </td>
						 <td> <h4><?php echo date('d-m-Y',strtotime($row['date'])); ?> </h4></td>
						 <td><h4> <?php echo $row['title']; ?></h4> </td>
						  <td> <h4><?php echo $row['short_desc']; ?> </h4></td>
						 <td class="actions text-center"><a class="delete" href="<?php echo '#'.$row['notification_id']; ?>"><i class="fa fa-trash-o" style="font-size:20px;color:white;text-shadow:1px 1px 1px color:white;"></i>  </a></td>
						 </tr>
						<?php $i++; } ?>
						
                        </tbody></font>
                      </table>
					   </div>
                  
					 <ul class="pager">
						<?php foreach ($links as $link) {
						 ?>
							<li>
							<?php echo $link; ?>
							</li>
						<?php } ?>
					  </ul>
						<?php } else { echo 'No Records Found'; }  ?>
                   
					</div>
                    </div>
					
                  </div>
                </section>
               </div>
              </div>
            </div>
      </div>
    
		
	
    <script src="<?php echo base_url() ?>assets/js/vendor/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/bootstrap/bootstrap-dropdown-multilevel.js"></script>
    <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?lang=css&amp;skin=sons-of-obsidian"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/vendor/mmenu/js/jquery.mmenu.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/vendor/nicescroll/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/vendor/animate-numbers/jquery.animateNumbers.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/vendor/videobackground/jquery.videobackground.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/vendor/blockui/jquery.blockUI.js"></script>
	<script src="<?php  echo base_url();  ?>assets/js/vendor/modals/classie.js"></script>
    <script src="<?php  echo base_url();  ?>assets/js/vendor/modals/modalEffects.js"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/summernote/summernote.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/chosen/chosen.jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/momentjs/moment-with-langs.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/datepicker/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/colorpicker/bootstrap-colorpicker.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/colorpalette/bootstrap-colorpalette.js"></script>
    <script src="<?php echo base_url() ?>assets/js/minimal.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>/js/vendor/datatables/ColReorderWithResize.js"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datatables/colvis/dataTables.colVis.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datatables/tabletools/ZeroClipboard.js"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datatables/tabletools/dataTables.tableTools.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datatables/dataTables.bootstrap.js"></script>
    <script src="<?php  echo base_url();  ?>assets/js/vendor/jgrowl/jquery.jgrowl.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/vendor/parsley/parsley.min.js"></script>
	<script>
	
$(document).ready(function() {
	 var text_max = 30;
     $('#title_count').html(text_max + ' characters remaining');
     $('#title').keyup(function() {
		var text_length = $('#title').val().length;
        var text_remaining = text_max - text_length;

        $('#title_count').html(text_remaining + ' characters remaining');
     });
	 var text_max1 = 80;
     $('#count').html(text_max1 + ' characters remaining');
     $('#short_desc').keyup(function() {
		var text_length = $('#short_desc').val().length;
        var text_remaining = text_max1 - text_length;
        $('#count').html(text_remaining + ' characters remaining');
     });
	 $('#input06').summernote({
        toolbar: [
         
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['height', ['height']],
          
        ],
        height: 137   
      });
});
	$(function(){
		
		var dt = new Date();
		 var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
		 $('#time').val(time);
		$(document).on('change', '#logo_upload', function(e){
				var data = new FormData();
				data.append('logo', $('#logo_upload').prop('files')[0]);
				$('#dvloader').show();
				$.ajax(
				{
					url : '<?php echo base_url().'client/dashboard/img_upload' ?>',            
					processData: false, 
					contentType: false, 
					data : data,
					type: "POST",
					dataType : 'json',  
					
					success:function(data, textStatus, jqXHR,form) 
					{
						if(data.status == 'success'){
							
							$('#upload_img').val(data.file_name);
							$.jGrowl("Image Has Been uploaded Successfully!");
								$('#dvloader').hide();
						} else {
							$.jGrowl("Image Has Been uploaded Successfully!");
								
						}
						
					},
					
				});
		
			});	
		$('.delete').on('click', function () {
			 var sn_id = $(this).attr('href').split('#')[1];
			 $.confirm({
             title: 'Confirmation',
             content: 'Are you sure you want to delete this patient?',
             confirmButton: 'Proceed',
             confirmButtonClass: 'btn-info',
             icon: 'fa fa-question-circle',
             animation: 'scale',
             animationClose: 'top',
             opacity: 0.5,
             confirm: function () {
				 
				 $.ajax({
						url : '<?php echo base_url().'physioadmin/dashboard/delete_notification' ?>',
						type: "POST",
						data : {n_id:sn_id},
						dataType: 'json', 
						success:function(data, textStatus, jqXHR,form) 
						{
							$.alert('Patient record has been deleted successfully!');
							setTimeout(function(){ 
								window.location.reload();
							}, 1000);
						},
						error: function(jqXHR, textStatus, errorThrown) 
						{
							$.alert('Patient record has been deleted successfully!');
							setTimeout(function(){ 
								window.location.reload();
							}, 1000);
						}
				});
			 }
         });
    });
	  $('form').on('submit', function (event) {
			
			 event.preventDefault();
			 var $form = $(this);
			if ( $(this).parsley().isValid() ) {
			 var  formID = $(this).attr("id");
			 var  formURL = $(this).attr("action");
			 var id = $('#patient_id').val();
			 $("#submit").attr("disabled",true);
			$.ajax({ 
				type: 'post',
				url: $(this).attr('action'),
				data:$(this).serialize(),
				success:function(data, textStatus, jqXHR,form) 
				{
					$.jGrowl("Notification Has Been Sent Successfully!");
					setTimeout(function(){ 
						window.location.reload();
					}, 1000);
				},
				error: function(jqXHR, textStatus, errorThrown) 
				{
					$.jGrowl("Notification Has not Been Sent Successfully!");
					setTimeout(function(){ 
						window.location.reload();
					}, 1000);
				}
		  });
			}
			else{
				alert('Fill All Field');
			}
				  
	});
	var myDate = new Date();
		var prettyDate =(myDate.getDate()) + '-' + (myDate.getMonth()+1) + '-' +
		myDate.getFullYear();
		$(".datepicker").val(prettyDate);
		$('.datepicker').datetimepicker({
           dateFormat: 'D-M-YYYY' 
	  });
	  $(".chosen-select").chosen({disable_search_threshold: 10});
      $(".datepicker").on("dp.show",function (e) {
        var newtop = $('.bootstrap-datetimepicker-widget').position().top - 45;      
        $('.bootstrap-datetimepicker-widget').css('top', newtop + 'px');
      });
	  
   })
     
$('#dateFilter').click(function(e){
		e.preventDefault();
		var	
		from = $('#from').val(),
		to = $('#to').val();
		
		if(from == '' || to == '') {
			jAlert('Please select start date or end date.', 'Date Filter error');
		} else {
			window.location = '<?php echo base_url(); ?>client/dashboard/notification_app/date/'+ from + '/' + to ;
		}
	});	 
    </script>
  </body>
</html>
      
	  