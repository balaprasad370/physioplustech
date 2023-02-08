<header class="row main-navigation">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="large-3 columns">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
			<a href="<?php echo base_url()?>"><img src="<?php echo base_url().'images/physio-tech.png' ?>" width="200" height="60" alt="Medico Logo" /></a>
			
		</div></br></br>
		<div class="large-9 columns">			
			<nav class="top-bar">
				<ul class="title-area">
				  
				  <li class="name"></li>
				   
				  <li class="toggle-topbar menu-icon"><a href="<?php echo base_url() ?>"><span>Main Menu</span></a></li>
				</ul>
    
				<section class="top-bar-section">
					 
					  <ul class="right">
						<li ><a href="<?php echo base_url()?>" <?php if($page_name == 'home') echo 'class="active"'; ?>>Home</a>
						
						  
						</li>
						<li><a href="<?php echo base_url().'frontend/about'?>" <?php if($page_name == 'about') echo 'class="active"'; ?>>About</a>
						  
						</li>
						
						<li class="has-dropdown"><a href="#" <?php if($page_name == 'why physioplus') echo 'class="active"'; ?>>WHY PHYSIOPLUS</a>
						  <ul class="dropdown">
                          	<li><a href="<?php echo base_url().'frontend/pt_focused'?>">PT focused</a></li>
							<li><a href="<?php echo base_url().'frontend/access_anywhere'?>">Access anywhere</a></li>
							<li><a href="<?php echo base_url().'frontend/emr_security'?>">EMR security</a></li>
							<li><a href="<?php echo base_url().'frontend/easytouse'?>">Easy to use</a></li>
							
							
						  </ul>
						</li>                    
						<li><a href="<?php echo base_url().'frontend/features'?>" <?php if($page_name == 'features') echo 'class="active"'; ?>>features</a>                                       
						  
						</li>
						<!--<li><a href="<?php echo base_url().'frontend/pricing'?>" <?php if($page_name == 'pricing') echo 'class="active"'; ?>>PRICING</a>
						 
						</li>-->
						<li><a href="http://physioplustech.com/blog/" <?php if($page_name == 'blog') echo 'class="active"'; ?> target="_blank">Blog</a>                    
						  
						</li>
						<li><a href="<?php echo base_url().'frontend/contact'?>" <?php if($page_name == 'contact') echo 'class="active"'; ?>>Contact</a></li>
						
					  </ul>
					 		 
				</section>
			</nav>
		</div>
	</header>