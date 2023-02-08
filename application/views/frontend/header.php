<style type='text/css'>
.header-item .header-menu nav.primary-menu .main-menu-area ul.main-menu li.menu-holder ul.mega-menu li ul li a{
	background-color: #D4D2FF;
 border: none;
  color: white;
  padding: 10px 26px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  width:100%;
	
}
 
</style>
	<div class="mobile-menu">
		<nav class="mobile-header primary-menu d-lg-none">
			<div class="header-logo">
				<a href="<?php echo base_url()?>" class="logo style-1">
					<img src="<?php echo base_url()?>frontend_assets/img/Physio+Logo_New.png" alt="logo" > 
				</a>
			</div>
			<div class="header-bar">
				<span></span> 
				<span></span>
				<span></span>
			</div> 
		</nav>
		<nav class="menu">
			<div class="mobile-menu-area d-lg-none">
				<div class="mobile-menu-area-inner" id="scrollbar">
					
					<ul class="m-menu">
						<li>
							<a href="<?php echo base_url()?>frontend" class="active">Home</a>
							 
						</li>
						<li>
								<a href="<?php echo base_url()?>frontend/about">About</a>
						</li>
						<!--<li>
							<a href="#">Why PhysioPlus</a>
							<ul class="m-submenu">
								<li>
									<a href="<?php echo base_url()?>home/pt_focused">PT focused</a>
								</li>
								<li>
									<a href="<?php echo base_url()?>home/access_anywhere">Access anywhere</a>
								</li>
								<li>
									<a href="<?php echo base_url()?>home/emr_security">EMR security</a>
								</li>
								<li>
									<a href="<?php echo base_url()?>home/easytouse">Easy to use</a>
								</li>
								 
							</ul>
						</li>-->
						<li>
						<a href="<?php echo base_url()?>frontend/pricing">Pricing</a></li>
						<li>
							<a href="<?php echo base_url()?>frontend/features">Benefits</a>
							 
						</li>
						<!--<li>
							<a href="http://physioplustech.com/blog/" target="_blank">Blog</a>
							 
						</li>-->
						 
						<li>
							<a href="<?php echo base_url()?>frontend/contact">Contact Us</a> 
						</li>
						
						<li>
							<a href="#">Sign In</a>
							<ul class="m-submenu">
								
								<li>
									<!--<a href="<?php echo base_url() ?>registration">Create My Account</a>-->
									<a href="<?php echo base_url() ?>sign_up">Create My Account</a>
								</li>
								<li>
									<a href="<?php echo base_url().'client/dashboard/login' ?>">Admin Login</a>
								</li>
								<li>
									<a href="<?php echo base_url().'user/dashboard/login' ?>">Staff Login</a>
								</li>
								<li>
									<a href="<?php echo base_url()?>frontend/request_quote">Request Quote</a>
								</li>
								<li>
									<a href="<?php echo base_url()?>frontend/request_demo">Free Online Demo</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
	 
	<header class="d-none d-lg-block">
		<div class="bg-white">
			<div class="container-fluid">
				<div class="header-item">
					<div class="header-logo">
						<a href="<?php echo base_url()?>"><img src="<?php echo base_url()?>frontend_assets/img/Physio+Logo_New.png" alt="logo" style="padding-bottom: 30px;"></a>
					</div>
					<div class="header-menu">
							<nav class="primary-menu">
								<div class="main-menu-area">
									<ul class="main-menu">
										<li>
											<a href="<?php echo base_url()?>frontend/">Home</a>
											 
										</li>
										<li>
											<a href="<?php echo base_url()?>frontend/about">About</a>
											 
										</li>
										<!--<li>
											<a href="#">Why Physioplus</a>
											<ul class="submenu">
												<li>
													<a href="<?php echo base_url()?>home/pt_focused">PT focused</a>
												</li>
												<li>
													<a href="<?php echo base_url()?>home/access_anywhere">Access anywhere</a>
												</li>
												<li>
													<a href="<?php echo base_url()?>home/emr_security">EMR security</a>
												</li>
												<li>
													<a href="<?php echo base_url()?>home/easytouse">Easy to use</a>
												</li>
												 
											</ul>
										</li>-->
										<li><a href="<?php echo base_url()?>frontend/pricing">Pricing</a></li>
										<li>
											<a href="<?php echo base_url()?>frontend/features">Benefits</a>
											 
										</li>
										<!--<li>
											<a href="http://physioplustech.com/blog/" target="_blank">Blog</a>
											 
										</li>-->
										 
										<li <?php if($page_name == 'contact') echo 'class="active"'; ?>>
											<a href="<?php echo base_url()?>frontend/contact">Contact Us</a>
										</li> 
										 <li class="menu-holder">
											<a href="#">Sign In</a>
											<ul class="mega-menu">
												<li>
													<span class="submenu-title">Upgrade</span>
													<p>For Premium Account </p>
													<p>If you are a single clinic owner </br>looking to digitalize our practise ?</p>
													<ul>
														<li><a href="<?php echo base_url()?>frontend/request_quote">Request Quote</a></li>
														 
													</ul>
													</br>
													<span class="submenu-title">For Corporate Account</span>
													<p>If you are a multiple clinic owner and </br>want to grow your business ?</p>
													<ul>
														<li><a href="<?php echo base_url()?>frontend/contact">Contact Us</a></li>
														 
													</ul></br>
												</li>
												<li>
													<span class="submenu-title">Product Tour</span>
													<p>Want to have a first look at our </br>Product & plan your order ?</p>
													<ul>
														<li><a href="<?php echo base_url()?>frontend/request_demo">Free Online Demo</a></li>
														 
													</ul></br>
													 
													<p>Do you like us to train you or </br>your staff for better efficiency ?</p>
													<ul>
														<li><a href="#">Book Online Training</a></li>
														 
													</ul></br>
													
												</li>
												<li>
													<span class="submenu-title">New Customer</span>
													<p>New to Physio Plus Tech? Create </br> an account to get started today.</p>

													<ul>
														<!--<li><a href="<?php echo base_url()?>registration" style="background-color:#ff9200;">Create My Account</a></li>-->
														<li><a href="<?php echo base_url()?>sign_up" style="background-color:#ff9200;">Create My Account</a></li>														 
													</ul>
												</li>
												<li>
													<span class="submenu-title">Registered Users</span>
													<p>Have an account? Sign in now</p>
													<ul>
														<li><a href="<?php echo base_url().'client/dashboard/login' ?>" >Admin Login</a></li>
														</br>
														<li><a href="<?php echo base_url().'user/dashboard/login' ?>">Staff Login</a>
														</li>
														 
														 
													</ul>
												</li>
												
											</ul>
										</li>
									 
										
									</ul>
								</div>
							</nav>
					</div>
					<div class="herder-icon">
						 
					</div>
				</div>
			</div>
		</div>
	</header>