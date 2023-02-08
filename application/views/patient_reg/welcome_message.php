<!DOCTYPE html>
<html>
  <head>
    <title>Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8" />

    <link rel="icon" type="image/ico" href="<?php echo base_url()?>assets/images/favicon.ico" />
    
    <link href="<?php echo base_url()?>assets/css/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/vendor/animate/animate.css">
    <link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url()?>assets/js/vendor/mmenu/css/jquery.mmenu.all.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/js/vendor/videobackground/css/jquery.videobackground.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/vendor/bootstrap-checkbox.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/vendor/bootstrap/bootstrap-dropdown-multilevel.css">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/js/vendor/summernote/css/summernote.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/js/vendor/summernote/css/summernote-bs3.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/js/vendor/chosen/css/chosen.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/js/vendor/chosen/css/chosen-bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/js/vendor/datepicker/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/js/vendor/colorpicker/css/bootstrap-colorpicker.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/js/vendor/colorpalette/bootstrap-colorpalette.css">

    <link href="<?php echo base_url()?>assets/css/minimal.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/vendor/jgrowl/css/jquery.jgrowl.min.css">
  </head>
  <body class="bg-1">

    <div id="wrap">

      


       
      <div class="row">
        





        
        <div >
          


          
          <div class="navbar-collapse">
                        
            

             
            <ul class="nav navbar-nav side-nav" id="sidebar">
              
             

              
            </ul>
            


          </div>
           


        </div>



        
         
        <div id="content" class="col-md-12">
          

 
          <div class="pageheader">
            <?php $client_id = $this->uri->segment(4);
	                                  $this->db->select('clinic_name,logo'); 
	                                  $this->db->from('tbl_client');
                  					  $this->db->where('client_id', $client_id);
									  $query = $this->db->get();
									  $name = $query->row()->clinic_name;
									  $logo = $query->row()->logo;
									  ?>
             <?php if($logo != '' ){ ?>
			  <img src="<?php echo base_url().'uploads/logo/'.$logo; ?>" alt="" width="250px" height="175px"></br>
			  <?php } 
			  else { ?>
				  <img src="<?php echo base_url().'uploads/logo/default.png' ?>" alt="" width="164px" height="62px"></br>
			<?php  } ?>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		   <h2>Register To <span class="label label-greensea"><?php echo $name;?></span> </h2>
            
           <h2>Powered by&nbsp;&nbsp;
		   <img src="<?php echo base_url()?>img/NEW LOGO1.png" height="60px;" width="100px;"></h2>
            


          </div>
          


           
          <div class="main">


		
             
            <div class="row">

              
              <div class="col-md-9">



                 
                <section class="tile color transparent-black">



                   
                  <div class="tile-header">
                    <h1><strong>Registration : </strong> Fill out the form below</h1>
                    
                  </div>
                   
                  <div class="tile-body">
                    
                    <form class="form-horizontal" action="<?php echo base_url().'patient_reg/welcome/form_list' ?>" method="post" role="form" parsley-validate id="basicvalidations">
                      
                      <div class="form-group">
                        <label for="input01" class="col-sm-4 control-label">First Name</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="firstname" id="input01" placeholder="Your First Name" parsley-trigger="change" parsley-required="true">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="input02" class="col-sm-4 control-label">Last Name</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="lastname" id="input02" placeholder="Your Last Name" parsley-trigger="change" parsley-required="true">
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="col-sm-4 control-label">Patient Type :</label>
                        <div class="col-sm-8">
                          <div class="radio radio-transparent">
                            <input type="radio" name="category" id="optionsRadios1" value="1" parsley-trigger="change" parsley-required="true">
                            <label for="optionsRadios1">Clinic Visit</label>
                          </div>
                          <div class="radio radio-transparent">
                            <input type="radio" name="category" id="optionsRadios2" value="2" parsley-trigger="change" parsley-required="true">
                            <label for="optionsRadios2">Home Patient</label>
                          </div>
                          
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="col-sm-4 control-label">Gender</label>
                        <div class="col-sm-8">
                          <div class="radio radio-transparent">
                            <input type="radio" name="gender" id="optionsRadios3" value="male" parsley-trigger="change" parsley-required="true" >
                            <label for="optionsRadios3">Male</label>
                          </div>
                          <div class="radio radio-transparent">
                            <input type="radio" name="gender" id="optionsRadios4" value="female" parsley-trigger="change" parsley-required="true">
                            <label for="optionsRadios4">Female</label>
                          </div>
                          
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="input03" class="col-sm-4 control-label">Age</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="age" id="input03" placeholder="Your Age" parsley-trigger="change" parsley-required="true">
                          
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="input04" class="col-sm-4 control-label">Mobile</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="mobile" id="input04" placeholder="Your Mobile No" parsley-type="number" parsley-trigger="change" parsley-required="true">
                        </div>
                      </div>
                      
					  <div class="form-group">
                        <label for="input04" class="col-sm-4 control-label">Email Id</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="email" id="input04" placeholder="Your Email Id">
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label for="input05" class="col-sm-4 control-label">Address</label>
                        <div class="col-sm-8">
                          <textarea class="form-control" id="input05" name="address" rows="6" placeholder="Enter Your Address"></textarea>
                        </div>
                      </div>

                      <input type="hidden" name="client_id" id="client_id" value="<?php echo $this->uri->segment(4); ?>">

                      <div class="form-group form-footer">
                        <div class="col-sm-offset-4 col-sm-8">
                          <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                          <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                      </div>

                    </form>

                  </div>
                  

                </section>
                 


              </div>
              

              
            </div>
            
			<p><center><font color="white">Designed By Physio Plus Tech </font></center></p>


            
            <div class="row">
              

              
          


          </div>
          



        </div>
        
        




      </div>
      




    </div>
   


  



    
    <script src="https://code.jquery.com/jquery.js"></script>
    
    <script src="<?php echo base_url()?>assets/js/vendor/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/bootstrap/bootstrap-dropdown-multilevel.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/vendor/mmenu/js/jquery.mmenu.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/vendor/nicescroll/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/vendor/animate-numbers/jquery.animateNumbers.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/vendor/videobackground/jquery.videobackground.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/vendor/blockui/jquery.blockUI.js"></script>

    <script src="<?php echo base_url()?>assets/js/vendor/summernote/summernote.min.js"></script>

    <script src="<?php echo base_url()?>assets/js/vendor/chosen/chosen.jquery.min.js"></script>

    <script src="<?php echo base_url()?>assets/js/vendor/momentjs/moment-with-langs.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/datepicker/bootstrap-datetimepicker.min.js"></script>

    <script src="<?php echo base_url()?>assets/js/vendor/colorpicker/bootstrap-colorpicker.min.js"></script>

    <script src="<?php echo base_url()?>assets/js/vendor/colorpalette/bootstrap-colorpalette.js"></script>

    <script src="<?php echo base_url()?>assets/js/minimal.min.js"></script>
	<script src="<?php  echo base_url();  ?>assets/js/vendor/jgrowl/jquery.jgrowl.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/vendor/parsley/parsley.min.js"></script>
    <script>
$(document).ready(function(){    
    $('form').on('submit', function (event) {
			 event.preventDefault();
			 var $form = $(this);
			 
			 if ( $(this).parsley().isValid() ) {
			 var  formID = $(this).attr("id");
			 var  formURL = $(this).attr("action");
			 var button = $('#submit');
			 var id = $('#client_id').val();
			 button.prop('disabled', true);
			$.ajax({
				type: 'post',
				url: $(this).attr('action'),
				data:$(this).serialize(),
				success:function(data, textStatus, jqXHR,form) 
				{
					
					$.jGrowl("Patient Has Been Added Successfully!");
					setTimeout(function(){ 
						window.location.href="<?php echo base_url().'patient_reg/welcome/success'?>" + '/' + id;
					}, 1000);
					
				},
				error: function(jqXHR, textStatus, errorThrown) 
				{
					$.jGrowl("Patient Has Been Added Successfully!");
					setTimeout(function(){ 
						window.location.href="<?php echo base_url().'patient_reg/welcome/success'?>" + '/' + id;
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
      