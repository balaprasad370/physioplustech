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
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="icon" type="image/ico" href="<?php  echo base_url();  ?>assets/favicon.ico" />
    <link href="<?php echo base_url()?>my_assets/main.css" rel="stylesheet">
 
 
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
                                                       EXERCISE PRESCRIPTION
                                                </li>
                                                <li class="breadcrumb-item">
                                                    <a href="<?php echo base_url().'client/private_exercise/private_exercise' ?>" >PRIVATE EXERCISE VIEW</a>
                                                </li>
                                                <li class="active breadcrumb-item" aria-current="page">
                                                    CERVICAL
                                                </li>
                                            </ol>
                                        </nav>
                                    </div>
                                    <div class="card-body"><h5 class="card-title">Cervical</h5>
                                     <div class="table-responsive">
					 <table  class="table table-datatable table-custom" id="basicDataTable">
					  <tr> <td> Search Type
					   <select class="sample chosen-select chosen-transparent form-control" name="searchType" id="searchType" placeholder="Position" >
				         <option>Select One</option>
				         <option value="1">Arom</option>
						 <option value="2">Ball</option>
						 <option value="3">Bosu</option>
						 <option value="4">Elastic Band</option>
						 <option value="5">Isometric</option>
						 <option value="6">Miscellaneous</option>
						 <option value="7">Mobilization</option>
						 <option value="8">Prom</option>
						 <option value="9">Stabilization</option>
						 <option value="10">Stretches</option>
						</select> </td>
					  <td> Position
					    <select class="chosen-select chosen-transparent form-control" name="position" id="position" placeholder="Select Position">
						<option value="0" >All</option>
						<option value="1" >Kneeling</option>
						<option value="2" >Prone</option>
						<option value="3" >Quadruped</option>
						<option value="4" >Side Lying</option>
						<option value="5" >Sitting</option>
						<option value="6" >Standing</option>
						<option value="7" >Supine</option>
					    </select> </td>
				       <td></br><input type="text" name="keyword"  Placeholder="Please Enter Value"  class="form-control" id="keyword">  </td>
					   <td></br><button class="btn btn-shadow btn-danger" id="SearchMe" > Go</button> </td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					   </tr>
						</table>
						</div>
									 <div class="card-body">
											<div class="main-card mb-3">
													<div class="grid-menu grid-menu-4col">
														<div class="no-gutters row">
														
														   <?php $site="uploads/exercise/";
													if($images != false ) {foreach($images as $img){
					?>								<div class="col-sm-3 container superbox-list img-view" >
																<a href="<?php echo base_url().'client/private_exercise/private_ankle' ?>"> <div class="widget-chart widget-chart-hover">
																		<img src="<?php echo base_url().$site.$img['path'] ?>" style="width: 150px; height: 150px" id="<?php echo 'imgid'.$img['id']; ?>" data-img="<?php echo $site.$img['path'] ?>" class="superbox-img" alt>
																		<div class="widget-subheading"></br><strong><?php echo $img['title'] ?></strong></div>    
																</div></a>
															</div>
														<?php } ?>
														
														<nav class="pagination-rounded" aria-label="Page navigation example" style="text-align:center;">
														  <br/><br/> <center><ul class="pagination" >
															  <?php foreach ($links as $link) { ?>
																<li>
																	<?php echo $link; ?>
																</li>
																<?php } ?>
															 </ul></center>
														  </nav>
														  <?php } else { echo 'No Records Found'; }  ?>
														</div>
													</div>
											</div>
										</div>   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					
					<div class="tabs-animation">
                        <div class="row">
                          <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Selected Images</h5>
                                      <div class="card-body"> 
										<a href="<?php echo base_url().'client/private_exercise/editorchart' ?>"><button class="mb-2 mr-2 btn btn-pill btn-primary" style="float:right;">Editor
												</button></a>
										<div id="cookie" class="row"> </div>
									  </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					
					
					<div class="tabs-animation superbox">
                        <div class="col-md-12">
                                 
                               </div>    
                    </div>
					
					
                </div>
                    </div>
    </div>
</div>
 
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script src="<?php  echo base_url();  ?>assets/js/code.jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>my_assets/assets/scripts/main.js"></script>

<script src="<?php echo base_url() ?>assets/js/dough.js"></script>
<script>
 		
	;(function($) {
	if (document.cookie) {
	var cookies = document.cookie.split('; ');
	var count=1;
	$.each(cookies, function(index, cookie) {
		cookie = cookie.split('=');
		str = cookie[0];
	if(str.indexOf("imgid") >= 0){
		var imgpath = decodeURIComponent(cookie[1]);
		$('<div/>', {
			id: cookie[0],
			html: $('<p/>', {
				html: '<div class="col-md-2" id="cook'+count+'"><img src="'+imgpath+'" style="width:100px; height:100px;" alt="" ><div class=""> <a title="" id="" class="remove_time" href="javascript:void(0)" data-content="'+cookie[0]+'" data-placement="cook'+count+'"><i class="fa fa-times" aria-hidden="true" style="color:red;" ></i></a> </div></div>'     
			})
		}).appendTo('#cookie');
		$("html, body").animate({ scrollTop: $(document).height() }, 1000);
		count++;
		$(".remove_time" ).click(function() {
					var cookname = $(this).attr( "data-placement" );
					var removecook = $(this).attr('data-content');
					$('#' + cookname).fadeOut(100,function(){
					$('#' + cookname).remove();
				}); 
			
			$.dough( removecook, 'remove');
		});
		
	}
		
	});
}	
	$.fn.SuperBox = function(options) {
		var superbox      = $('<div class="superbox-show"></div>');
		var superboximg   = $('<img src="" class="superbox-current-img">');
		var superboxclose = $('<div class="superbox-close"></div>');
		superbox.append(superboximg).append(superboxclose);
		return this.each(function() {
		$('.superbox-list').click(function() {
				var currentimg = $(this).find('.superbox-img');
				var path = currentimg.attr("src");
				var cookname = currentimg.attr( "id" );
				var status = true;
				var count = 1;
				var cookies = document.cookie.split(/;\s*/);
				for (var i = 0; i < cookies.length; i++) {
					parts = cookies[i].split('=');
					if(parts[0] == cookname ){
						status = false;
					}
					count++;
				}
				if(status){
					$("html, body").animate({ scrollTop: $(document).height() }, 1000);
					$('#cookie').append('<div class="col-md-3 demo-image-bg" id="cook'+count+'"> <a title="" id="remove" class="remove" href="javascript:void(0)" data-content="'+cookname+'" data-placement="cook'+count+'"><img src="'+path+'" width="100px;" height="100px;" alt="" ><div class=""><i class="fa fa-times" aria-hidden="true" style="color:red;"></i></a></div></p>');
				}else{
					alert('Error 1: This exercise already loaded');
				}
				$("html, body").animate({ scrollTop: $(document).height() }, 1000);
				$.dough(cookname, path);
				$(".remove" ).click(function() {
					var cookname = $(this).attr( "data-placement" );
					var removecook = $(this).attr('data-content');
					$('#' + cookname).fadeOut(100,function(){
						$('#' + cookname).remove();
					}); 
					$.dough( removecook, 'remove');
					
				});
				if (document.cookie) {
				var cookies = document.cookie.split('; ');
				var count=1;
					$.each(cookies, function(index, cookie) {
						cookie = cookie.split('=');
						str = cookie[0];
						if(str.indexOf("imgid") >= 0){
							
						}
					});
				}
			});
			$("#remove" ).live( "click", function() {
			
			var cookname = $(this).attr( "data-placement" );
			var removecook = $(this).attr('data-content');
			$('#' + cookname).fadeOut(100,function(){
			$('#' + cookname).remove();
			}); 
			$.dough( removecook, 'remove' );
			$.dough( cookname, 'remove' );

			if (document.cookie) {
				var cookies = document.cookie.split('; ');
				var count=1;
				$.each(cookies, function(index, cookie) {
					cookie = cookie.split('=');
					str = cookie[0];
					if(str.indexOf("imgid") >= 0){
						
					}
				});
			}
			});			
			$('.superbox').on('click', '.superbox-close', function() {
				$('.superbox-current-img').animate({opacity: 0}, 100, function() {
					$('.superbox-show').slideUp();
				});
			});
		
		});
	};
})(jQuery);

  $(function(){
	$('#SearchMe').click(function () {
		 var searchType =$('#searchType').val();
		 var position =$('#position').val();
		 var key =$('#keyword').val();
		 if(searchType != '' && position != '' && key != '' ){
			window.location = '<?php echo base_url(); ?>client/private_exercise/private_cervical/search/'+searchType+'/'+position+'/'+key;
		 } else if(searchType != '' && position != '' && key == '' ){
			 window.location = '<?php echo base_url(); ?>client/private_exercise/private_cervical/search/'+searchType+'/'+position;
		 } else {
			 alert('Select All The Details');  
		 }
	});  
    $('.superbox').SuperBox();
        var checkSuperboxSelected = function(){
        $('#superbox-gallery .img-view .checkbox :checkbox').each(function() {
        var el = $(this);
        if(!el.is(':checked')) {
            enableToolsSuperbox(false);
          } else {
            el.parents('.img-view').addClass('selected');
            enableToolsSuperbox(true);
          }
       });
    };
    $('#superbox-gallery .img-view .checkbox').click(function(){
        var el = $(this);
        if(!el.find(':checkbox').is(':checked')) {
          el.parents('.img-view').removeClass('selected');
          enableToolsSuperbox(false);
        } else {
          el.parents('.img-view').addClass('selected');
          enableToolsSuperbox(true);
        }
      });

      $('#superbox-gallery #selectall').click(function(){
        if($(this).prop('checked')) {
          $(this).parents('.tile').each(function(){
            $(this).find('.img-view .checkbox :checkbox').prop('checked',true);
            $(this).find('.img-view').addClass('selected');
          });
          enableToolsSuperbox(true);
        } else {
          $(this).parents('.tile').each(function(){
            $(this).find('.img-view .checkbox :checkbox').prop('checked',false);
            $(this).find('.img-view').removeClass('selected');
          });
          enableToolsSuperbox(false);
        }
      });

      var enableToolsSuperbox = function(enable) {
        
        if (enable) {

          $('#superbox-gallery .gallery-tool').removeClass('disabled');

        } else {

          var selected = false;

          $('#superbox-gallery .superbox .img-view').each(function(){
            if($(this).hasClass('selected')) {
              selected = true;
            }
          });
          
          if(!selected) {
            $('#superbox-gallery .gallery-tool').addClass('disabled');
          }
        }
      }

      checkSuperboxSelected();

      
      /* initialize colorbox */

      $('.colorbox .colorbox-list .overlay').colorbox({
        photo: true,
        opacity: .9, 
        rel:'group1',
        scalePhotos:true,
        scrolling:false,
        maxWidth:'100%',
        maxHeight:'100%',
        transition: 'elastic',
        href: function(){
          var url = $(this).prev().data('img');
          return url;
        },
      });

      //colorbox image selecting

      var checkColorboxSelected = function(){
        $('#colorbox-gallery .img-view .checkbox :checkbox').each(function() {
          var el = $(this);

          if(!el.is(':checked')) {
            enableToolsColorbox(false);
          } else {
            el.parents('.img-view').addClass('selected');
            enableToolsColorbox(true);
          }
     
        });
      };

      $('#colorbox-gallery .img-view .checkbox').click(function(){
        var el = $(this);
        if(!el.find(':checkbox').is(':checked')) {
          el.parents('.img-view').removeClass('selected');
          enableToolsColorbox(false);
        } else {
          el.parents('.img-view').addClass('selected');
          enableToolsColorbox(true);
        }
      });

      $('#colorbox-gallery #selectall2').click(function(){
        if($(this).prop('checked')) {
          $(this).parents('.tile').each(function(){
            $(this).find('.img-view .checkbox :checkbox').prop('checked',true);
            $(this).find('.img-view').addClass('selected');
          });
          enableToolsColorbox(true);
        } else {
          $(this).parents('.tile').each(function(){
            $(this).find('.img-view .checkbox :checkbox').prop('checked',false);
            $(this).find('.img-view').removeClass('selected');
          });
          enableToolsColorbox(false);
        }
      });

      var enableToolsColorbox = function(enable) {
        
        if (enable) {

          $('#colorbox-gallery .gallery-tool').removeClass('disabled');

        } else {

          var selected = false;

          $('#colorbox-gallery .colorbox .img-view').each(function(){
            if($(this).hasClass('selected')) {
              selected = true;
            }
          });
          
          if(!selected) {
            $('#colorbox-gallery .gallery-tool').addClass('disabled');
          }
        }
      }

      checkColorboxSelected();

      $('.img-view .media-info .btn.dropdown-toggle').on('click', function(e){
        $(this).next().toggle();
        e.stopPropagation();
      });

      $('.img-view .media-info .dropdown-menu').on('click', function(e){
        e.stopPropagation();
        $(this).toggle();
      });

      $('.img-view .media-info .checkbox').on('click', function(e){
        e.stopPropagation();
      });
	  
	$('#editor').live( "click", function() {
	window.location = '<?php echo base_url(); ?>client/exercise/editorchart/';

	});
      
    })
</script>

</body>
</html>
 