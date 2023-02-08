<!DOCTYPE html>
<html>
  <head>
    <title>Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8" />

    <link rel="icon" type="image/ico" href="<?php echo base_url() ?>assets/images/favicon.ico" />
    
	
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
    
	
	

  </head>
  <body class="bg-1">
   
   <div id="wrap">
     <div class="row">
		<?php $this->load->view('subadmin/sidebar'); ?>
           <div id="content" class="col-md-12">
           <div class="pageheader">
		   <h2><i class="fa fa-check-square" style="line-height: 48px;padding-left: 1px;"></i>Client Information<span></span></h2>
            
          <div class="breadcrumbs">
             
            </div>


          </div>
          <div class="main">




            
            <div class="row">
            <div class="col-md-12">
			 <div class="col-md-6">



                
                <section class="tile color transparent-black">



                  
                  <div class="tile-header">
                    <h1><strong>Client Information</strong> </h1>
                    <div class="controls">
                      <a href="#" class="minimize"><i class="fa fa-chevron-down"></i></a>
                      <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
                      <a href="#" class="remove"><i class="fa fa-times"></i></a>
                    </div>
                  </div>
                  
                  <div class="tile-body">
                    
                    <?php if($team_cname != false && $team_det != false){ ?>
					<?php foreach($team_cname as $cname){ 
				$clint_id =  $cname['client_id'];
			
			?>
                      <div class="form-group">
                        <label for="input01" class="col-sm-4 control-label">Client Name:</label>
                         <span class="btn btn-success bottommargin">
                          <?php echo $cname['first_name'] ?>
                        </span>
                      </div>
            <?php } 
				foreach($team_det as $team_dets){
				?>
                     <div class="form-group">
                        <label for="input01" class="col-sm-4 control-label">Duration:</label>
                        
                         <span class="btn btn-success bottommargin"><?php echo $team_dets['duration'] ?></span>
						<?php $duration = $team_dets['duration']; ?>
                        
                      </div>

                      <div class="form-group">
                        <label for="input01" class="col-sm-4 control-label">No.of Users</label>
                        
                         <span class="btn btn-success bottommargin"><?php echo $team_dets['num_users'] ?></span>
						<?php $num_user = $team_dets['num_users']; ?>
					  
                      </div>

                      <div class="form-group">
                        <label for="input01" class="col-sm-4 control-label">No.of Location</label>
                        
                          <span class="btn btn-success bottommargin"><?php echo $team_dets['num_location'] ?></span>
						<?php $num_location = $team_dets['num_location']; ?>
				 
                      </div>
					  
					  
                     
                     <?php } ?>
                    
                     

                    </form>

                  </div>
                <?php }?>
             </div>
			 
			 <div class="col-md-6">



                
                <section class="tile color transparent-black">



                 
                  <div class="tile-header">
                    <h1><strong>Add Plan</strong> </h1>
                    <div class="controls">
                      <a href="#" class="minimize"><i class="fa fa-chevron-down"></i></a>
                      <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
                      <a href="#" class="remove"><i class="fa fa-times"></i></a>
                    </div>
                  </div>
                  
                  <div class="tile-body">
                    
                    <form action="<?php echo base_url().'subadmin/dashboard/account_activation' ?>" method="post" class="form-horizontal" role="form"  parsley-validate id="basicvalidations">
                      <div class="form-group">
                        <label for="input01" class="col-sm-4 control-label">Plan : </label>
                        <div class="col-sm-8" id="selectbox">
                         <input type="hidden" value="<?php echo $clint_id; ?>" name="client_id" id="client_id">
							<select class="chosen-select chosen-transparent form-control" name="plan_type" id="plan_type" parsley-trigger="change" parsley-required="true" parsley-error-container="#selectbox">
							 <option value="4">Full Package</option>
							
						   </select>
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="input01" class="col-sm-4 control-label">Duration : </label>
                        <div class="col-sm-8" id="selectbox1">
                         	<select class="chosen-select chosen-transparent form-control" name="duration" id="duration" parsley-trigger="change" parsley-required="true" parsley-error-container="#selectbox1">
								<option selected="true" disabled="disabled"></option>
							<option value="3">3 DAYS</option>
							<option value="7">7 DAYS</option>
							
						   </select>
                        </div>
                      </div>
                        <div class="form-group form-footer">
                        <div class="col-sm-offset-4 col-sm-8">
                          <button type="submit" class="btn btn-success" id="save">save</button>
						 
                           </div>
                      </div>

                    

                  </div>
				  </form>
                
             </div>
			 
			 </div>
			 
			 
           </div>
         </div>
		 
		 
		  <div class="main">




            
            <div class="row">
            <div class="col-md-12">
			 <div class="col-md-6">



               
                <section class="tile color transparent-black">



                 
                  <div class="tile-header">
                    <h1><strong>Plan Settings</strong> </h1>
                    <div class="controls">
                      <a href="#" class="minimize"><i class="fa fa-chevron-down"></i></a>
                      <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
                      <a href="#" class="remove"><i class="fa fa-times"></i></a>
                    </div>
                  </div>
                  
                  <div class="tile-body">
                    
                   <?php if($sms_det != false){ ?>
				   <?php foreach($sms_det as $sms_dets){ 
				$clint_id =  $sms_dets['client_id'];
			
			?>
                      <div class="form-group">
                        <label for="input01" class="col-sm-4 control-label">Client Name :</label>
                         <span class="label label-success">
                          <?php echo $sms_dets['first_name'] ?>
                        </span>
                      </div>
           
                     <div class="form-group">
                        <label for="input01" class="col-sm-4 control-label">Total Sms limit :</label>
                        
                         <span class="label label-success"><?php echo $sms_dets['total_sms_limit'] ?></span>
						
                      </div>

                      <div class="form-group">
                        <label for="input01" class="col-sm-4 control-label">SMS count :</label>
                        
                         <span class="label label-success"><?php echo $sms_dets['sms_count'] ?></span>
						
					   </div>
					   
					   <div class="form-group">
                        <label for="input01" class="col-sm-4 control-label">Email Verified :</label>
                        
                          <span class="label label-success"><?php echo $sms_dets['email_verified'] ?></span>
						
                      </div>

                     
                     
                     <?php } ?>
                    
                     

                    </form>

                  </div>
                <?php }?>
             </div>
			 
			 <div class="col-md-6">



                
                <section class="tile color transparent-black">



                 
                  <div class="tile-header">
                    <h1><strong>Add SMS</strong> </h1>
                    <div class="controls">
                      <a href="#" class="minimize"><i class="fa fa-chevron-down"></i></a>
                      <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
                      <a href="#" class="remove"><i class="fa fa-times"></i></a>
                    </div>
                  </div>
                  
                  <div class="tile-body">
                    
                    <form action="<?php echo base_url().'subadmin/dashboard/sms_activation' ?>" method="post" class="form-horizontal" role="form" parsley-validate>
                      <div class="form-group">
                        <label for="input01" class="col-sm-4 control-label">SMS Limit :</label>
                        <div class="col-sm-8" id="selectbox2">
						<input type="hidden" value="<?php echo $this->uri->segment(4); ?>" name="client_id" id="client_id">
					   <!--<input type="text" class="form-control" name="sms_count" id="sms_count" parsley-required="true">-->
					   <select class="chosen-select chosen-transparent form-control" name="sms_count" id="sms_count" parsley-trigger="change" parsley-required="true" parsley-error-container="#selectbox2">
								<option selected="true" disabled="disabled"></option>
							<option value="25">25 Sms</option>
							
						   </select>
                        </div>
                      </div>
					  
                        <div class="form-group form-footer">
                        <div class="col-sm-offset-4 col-sm-8">
                          <button type="submit" class="btn btn-success" id="save">save</button>
						  
                           </div>
                      </div>

                    

                  </div>
				  </form>
                
             </div>
			 
			 </div>
			 
			 
           </div>
         </div>
		 
		 </div>
		 </div>
		 </div>
        








    <script type="text/javascript" src="<?php  echo base_url();  ?>assets/js/jquery.min.js"></script>
    <section class="videocontent" id="video"></section>
   <script src="<?php  echo base_url();  ?>assets/js/code.jquery.js"></script>
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
    <script src="<?php echo base_url()?>js/vendor/datatables/ColReorderWithResize.js"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datatables/colvis/dataTables.colVis.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datatables/tabletools/ZeroClipboard.js"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datatables/tabletools/dataTables.tableTools.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datatables/dataTables.bootstrap.js"></script>
    <script src="<?php  echo base_url();  ?>assets/js/vendor/jgrowl/jquery.jgrowl.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/vendor/parsley/parsley.min.js"></script>
	<script>

	$(document).ready(function() {
  $('form').on('submit', function (event) {
	      event.preventDefault();
		 var $form = $(this);
		if ( $(this).parsley().isValid() ) {
		 var  formID = $(this).attr("id");
		 var  formURL = $(this).attr("action");
		 var button = $('#save');
		 button.prop('disabled',true);
		$.ajax({
            type: 'post',
            url: formURL,
            data:$(this).serialize(),
            success:function(data, textStatus, jqXHR,form) 
			{
				
				$.jGrowl("Account Has Been Activated Successfully!");
				setTimeout(function(){ 
				$('.md-close btn btn-default').click();
				window.location.reload();
				}, 1000);
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$.jGrowl("Account Has Not Been Activated Successfully!");
				setTimeout(function(){ 
				$('.md-close btn btn-default').click();
				window.location.reload();
				}, 1000);
			}
      }); 
		}
		else{

		}
		
});  
});
 

    </script>
  </body>
</html>
      