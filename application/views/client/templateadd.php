<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Add Letter - Physio Plus Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
     
	<meta name="msapplication-tap-highlight" content="no">
	<link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
	<link href="<?php echo base_url()?>asset_list/main.css" rel="stylesheet">
	
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="<?php echo base_url()?>asset/css/summernote.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asset/css/summernote-bs3.css">
	
	<style>
.note-editor { border: 0; }
.note-editor .note-editable { overflow: auto; background-color: white; }
.note-editor .note-toolbar { border-bottom: 0; background-color: #f2f2f2; -webkit-border-radius: 4px 4px 0 0; -moz-border-radius: 4px 4px 0 0; -ms-border-radius: 4px 4px 0 0; -o-border-radius: 4px 4px 0 0; border-radius: 4px 4px 0 0; }
.note-editor .note-statusbar { background-color: #f2f2f2; -webkit-border-radius: 0 0 4px 4px; -moz-border-radius: 0 0 4px 4px; -ms-border-radius: 0 0 4px 4px; -o-border-radius: 0 0 4px 4px; border-radius: 0 0 4px 4px; }
.note-editor .note-statusbar .note-resizebar { border-top: 1px solid transparent; }

.transparent-editor .note-editor .note-editable { background-color:rgba(192,192,192,0.3); }
.transparent-editor .note-editor .note-toolbar { background-color:rgba(192,192,192,0.3); }
.transparent-editor .note-editor .note-toolbar button { background-color: white; color: #717171; }
.transparent-editor .note-editor .note-toolbar button:hover { background-color: rgba(255, 255, 255, 0.95); color: #717171; }
.transparent-editor .note-editor .note-toolbar button:hover .caret { border-top-color: #717171; }
.transparent-editor .note-editor .note-toolbar .dropdown-menu { color: #717171; }
.transparent-editor .note-editor .note-statusbar { background-color: rgba(0, 0, 0, 0.5); }
.transparent-editor .note-editor .caret { border-top-color: #717171; }
 
</style>

	<style>
.parsley-error-list{
	color:red;
	list-style-type:none;
}
label, th, .td{
	font-weight:bold;
	color:#3f6ad8;

}
.table td{
	border-top : 0px;
}

 
</style>
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    
				<?php include("sidebar.php");?>
            <div class="app-main__outer">
                <div class="app-main__inner">
                               
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title"> LETTER CREATION
                            
								</h5>
                                    <form class="" action="<?php echo base_url().'client/letter/add_group'?>" method="post"  role="form" parsley-validate id="signupForm">
                                         
										<div class="form-row">
                                            <div class="col-md-6" id="selectbox">
                                                <div class="position-relative form-group"><label for="tittle" class="">Enter Your Title *</label> 
												 <input name="tittle" id="tittle"  type="text" class="form-control" parsley-trigger="change" parsley-required="true" autocomplete="off">
												</div>
                                            </div>
											 
                                            <div class="col-md-6 transparent-editor">
                                                <div class="position-relative form-group"><label for="letter" class="">Enter Your Description *</label>
												  <textarea class="form-control" id="input06" name="letter" autocomplete="off"></textarea>
												</div>
                                            </div>
                                        </div>
										
										
										 <div class="divider"></div>
                                            <div class="clearfix">
                                                <center>
                                                <button type="submit" class="mb-2 mr-2 btn btn-pill btn-primary submit" id="save">Submit</button>
												<button type="reset" class="mb-2 mr-2 btn btn-pill btn-danger">Cancel</button>
												</center>
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
				   
    <div id="toast-container"  style="display:none;" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">Success!</br>Letter Has Been Added Successfully</div></div></div>
    <div id="toast-container1" style="display:none;" class="toast-top-right"><div class="toast toast-error" aria-live="polite" style=""><div class="toast-error">error!</br>Letter Has not Been Added Successfully</div></div></div>

	
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script type="text/javascript" src="<?php echo base_url()?>asset_list/assets/scripts/main.js"></script></body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url();?>asset/js/parsley.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> 		
<script src="<?php echo base_url()?>asset/js/summernote.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
$('select').select2();
 

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
				$('#toast-container').show();
				setTimeout(function(){ 
				window.location.href="<?php echo base_url().'client/letter/letter_view/'?>"
				}, 1000);
				 
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$('#toast-container1').delay(5000).fadeOut(400);
				setTimeout(function(){ 
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

<script>
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
</html>
