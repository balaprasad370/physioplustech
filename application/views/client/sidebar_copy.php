<style>
 .menu_list:hover { background-color: #3f6ad8; color:white; }
 </style>
 
 <div class="app-header header-shadow bg-plum-plate header-text-light">
        <div class="app-header__logo">
            <h4 style="color:white;font-size:16px;" ><b>Physio Plus Tech</b></h4>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
            <span>
                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                    <span class="btn-icon-wrapper">
                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                    </span>
                </button>
            </span>
        </div>   
		<?php /* $c_id = $this->session->userdata('client_id');
				$this->db->select('logo,first_name')->from('tbl_client');
				$this->db->where('client_id',$c_id);
				$res = $this->db->get();
				$first_name = $res->row()->first_name;				
				$logo = $res->row()->logo; */
				 
				if(!$this->session->userdata('staff_id'))
				{
					$c_id = $this->session->userdata('client_id');
					$this->db->select('logo,first_name')->from('tbl_client');
					$this->db->where('client_id',$c_id);
					$res = $this->db->get();
					$first_name = $res->row()->first_name;				
					$logo = $res->row()->logo;
				}else{
					$c_id = $this->session->userdata('client_id');
					$this->db->select('logo,first_name')->from('tbl_client');
					$this->db->where('client_id',$c_id);
					$res = $this->db->get();
					//$first_name = $res->row()->first_name;				
					$logo = $res->row()->logo;
					
					$this->db->select('first_name,last_name')->from('tbl_staff_info');
												$this->db->where('staff_id',$this->session->userdata('staff_id'));
												$res = $this->db->get();
												if($res->result_array() != false){
												if($res->row()->last_name != ''){
												$first_name =  $res->row()->first_name.' '.$res->row()->last_name;
												} else {
													$first_name =  $res->row()->first_name;
												}
												}
				}
				?>
			
		<div class="app-header__content">
          <div class="app-header-right">
					     <?php
								$CI =& get_instance();
								$CI->load->model(array('client','location_model','registration_model'));
								if($this->session->userdata('is_parent') == 1){
									$validity = $CI->registration_model->get_valitidy();				
									foreach($validity as $days){			
										$total_days = $days['duration'];
										$plan = $days['plan_type'];
									}
								} else if($this->session->userdata('staff_id') != '') {
									$validity = $CI->registration_model->get_valitidy();  				
									foreach($validity as $days){			
										$total_days = $days['duration'];
										$plan = $days['plan_type'];
									}
								} else {
									$this->db->select('parent_client_id')->from('tbl_client');
									$this->db->where('client_id',$this->session->userdata('client_id'));
									$query = $this->db->get();
									 if($query->result_array() != false){
										$this->db->select('vi.duration,vi.plan_type,vi.num_users,vi.psms_count,vi.psms_limit')->from('tbl_validity vi');
										$this->db->join('tbl_client ci','ci.client_id = vi.client_id');
										$this->db->where('ci.client_id',$query->row()->parent_client_id);
										$query1 = $this->db->get();
										$total_days = $query1->row()->duration;
										$plan = $query1->row()->plan_type;
									}  
									 
								}
											 
								if($plan != 5){ ?>
						        <div class="btn-group">  
                                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow btn-wide float-right btn-hover-shine btn" style="background-color: Transparent; border: 1px solid gray; color:white;">
                                       <span class="badge badge-pill badge-danger ml-0 mr-1"><?php echo $this->session->userdata('duration'); ?></span><font color="white"> Days Remaining</font>
										</span>
                                    </a>
								</div>&nbsp;&nbsp;  
								<?php } 
								$CI =& get_instance();
							$CI->load->model(array('client','location_model','registration_model'));
							$validity = $CI->registration_model->get_valitidy();				
							$sms_count = $CI->registration_model->get_totalsms();				
							$childProfileInfo = $CI->registration_model->editProfile($this->session->userdata('client_id'));
							$parentProfileInfo = $CI->registration_model->editProfile($childProfileInfo['parent_client_id']);
							//print_r($parentProfileInfo['client_id']);
							foreach($validity as $days){			
								$total_days = $days['duration'];
								$plan = $days['plan_type'];
							}
								$location =$parentProfileInfo['is_location'];
								$plan_id =$parentProfileInfo['plan_id'];
								$sms_limit = $sms_count['total_sms_limit'];
								$sms_balance = $sms_count['sms_count'];
								$current_sms = $sms_limit - $sms_balance;
								
							if($plan != 5){     ?>
		  	 				  <?php if($current_sms > 0){
								?>
								<div class="btn-group">  
													<a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow btn-wide float-right btn-hover-shine btn" style="background-color: Transparent; border: 1px solid gray; color:white;">
													   <span class="badge badge-pill badge-danger ml-0 mr-1"><?php print ($current_sms); ?></span><font color="white">  SMS Left</font>
														</span>
													</a>
												</div>
								<?php }  ?>
				
			</li>
			<?php } ?>
								
                      <?php
				$CI =& get_instance();
				$CI->load->model(array('client','location_model','registration_model'));
				$locationCount = $CI->location_model->getLocationCount();
				$location = $CI->location_model->getLocations();
				$parentClientId = $CI->location_model->getParentClientId();
				$profileInfo = $CI->registration_model->editProfile($this->session->userdata('client_id'));
				if($this->session->userdata('user_login') != true){
				?>
				<ul class="header-megamenu nav">
				<?php if($parentClientId == 0 && $locationCount != false){ ?>
				    <li class="dropdown nav-item">
                           <a aria-haspopup="true"  data-toggle="dropdown" class="nav-link" aria-expanded="false" style="font-weight:bold;color:black;" >
								<strong > <img src="<?php echo base_url().'img/icon-pin.png' ?>" width="25px;" height="25px;" alt /><span style="color:white;" >&nbsp;&nbsp;<?php if($profileInfo['branch_name']) echo ucfirst($profileInfo['branch_name']); else echo ucfirst($profileInfo['city']); ?></span></strong>
						  <i class="fa fa-angle-down ml-2 opacity-5" style="color:white;"></i></a>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu" style="min-width:5rem;height:6rem;">
                           <div class="scroll-area-xs">
                                <div class="scrollbar-container">
								<?php
								if($location != false){
								foreach($location as $locations){ ?>
                                     <button type="button" tabindex="0" class="dropdown-item menu_list"  onclick="window.location.href = '<?php echo base_url().'client/dashboard/child/'.$locations['client_id']; ?>';"><img src="<?php echo base_url() ?>img/sub_location.png" alt />&nbsp;&nbsp;<?php echo $locations['branch_name']; ?></button>
								<?php } } ?>
							   </div>
                            </div>
                       </div>
                    </li>
					<?php } else if($this->session->userdata('is_child') == true && $this->session->userdata('is_parent') == false){ ?>
					 <li class="dropdown nav-item">
                            <a aria-haspopup="true"  data-toggle="dropdown" class="nav-link" aria-expanded="false" style="font-weight:bold;color:black;" >
								<strong > <img src="<?php echo base_url().'img/icon-pin.png' ?>" width="25px;" height="25px;" alt /><span style="color:white;" >&nbsp;&nbsp;<?php if($profileInfo['branch_name']) echo ucfirst($profileInfo['branch_name']); else echo ucfirst($profileInfo['city']); ?></span></strong>
						         <i class="fa fa-angle-down ml-2 opacity-5" style="color:white;"></i></a>
                     
							  <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu" style="min-width:5rem;height:6rem;">
                           <div class="scroll-area-xs">
                                <div class="scrollbar-container">
								<?php
								if($location != false){
								foreach($location as $locations){ ?>
                                     <button type="button" tabindex="0" class="dropdown-item menu_list"  onclick="window.location.href = '<?php echo base_url().'client/dashboard/child/'.$locations['client_id']; ?>';"><img src="<?php echo base_url() ?>img/sub_location.png" alt />&nbsp;&nbsp;<?php echo $locations['branch_name']; ?></button>
								<?php } } 
								     $childProfileInfo = $CI->registration_model->editProfile($this->session->userdata('client_id'));
								     $parentProfileInfo = $CI->registration_model->editProfile($childProfileInfo['parent_client_id']);
								?>  
								     <button type="button" tabindex="0" class="dropdown-item menu_list"  onclick="window.location.href = '<?php echo base_url().'client/dashboard/child/'.$childProfileInfo['parent_client_id']; ?>';"><img src="<?php echo base_url() ?>img/sub_location.png" alt />&nbsp;&nbsp;<?php echo $parentProfileInfo['branch_name']; ?></button>
								
							   </div>   
                            </div>
                       </div>
                    </li>
					<?php  }  ?>
				  </ul><?php  }  ?>
				
				<ul class="header-megamenu nav">
                    <li class="btn-group nav-item">
					<a href="<?php echo base_url() ?>client/group/single_sent">
						<img src="<?php echo base_url().'iconsforreportsection/m5.png' ?>" width="30px;" height="30px;"  alt />					   
					 </a>   
                        
                    </li>
					</ul>&nbsp;&nbsp; 
					<ul class="header-megamenu nav">
					<li class="dropdown nav-item">
					<?php $this->db->where('client_id',$this->session->userdata('client_id'));
					$this->db->select('price')->from('tbl_balance');
					$res1 = $this->db->get();
					if($res1->result_array() != false){
						$ba = number_format($res1->row()->price,2);
					} else {
						$ba = '0.00';      
					}
					 ?>
                            <a aria-haspopup="true"  data-toggle="dropdown" class="nav-link" aria-expanded="false" style="font-weight:bold;color:black;" >
						      <strong > <img src="<?php echo base_url().'img/purse_icon.png' ?>" width="25px;" height="25px;" alt /><span style="color:white;" >&nbsp;&nbsp;<?php echo 'Rs : '.$ba;  ?></span></strong>
						      <i class="fa fa-angle-down ml-2 opacity-5" style="color:white;"></i></a>
                     		  <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu" style="min-width:5rem;height:9.5rem;">
                              <div class="scroll-area-xs">
                                <div class="scrollbar-container">
								     <button type="button" tabindex="0" class="dropdown-item menu_list"  onclick="window.location.href = '<?php echo base_url().'client/dashboard/invite_earn'; ?>';">&nbsp;&nbsp;Invite & Earn</button>
								     <button type="button" tabindex="0" class="dropdown-item menu_list"  onclick="window.location.href = '<?php echo base_url().'client/dashboard/mypassbook/'; ?>';">&nbsp;&nbsp;My Passbook</button>
								     <button type="button" tabindex="0" class="dropdown-item menu_list"  onclick="window.location.href = '<?php echo base_url().'client/dashboard/order_list/'; ?>';">&nbsp;&nbsp;My Sales</button>
								     <button type="button" tabindex="0" class="dropdown-item menu_list"  onclick="window.location.href = '<?php echo base_url().'client/dashboard/pendingorder_list/'; ?>';">&nbsp;&nbsp;Pending Orders</button>
								     <button type="button" tabindex="0" class="dropdown-item menu_list"  onclick="window.location.href = '<?php echo base_url().'client/dashboard/payout_summary/'; ?>';">&nbsp;&nbsp;Payout Summary</button>
								</br>
								</div>   
                            </div>
                       </div>
                    </li>
					</ul>
				  <ul class="header-megamenu nav">
				 
                    <li class="dropdown nav-item">
                        <a aria-haspopup="true"  data-toggle="dropdown" class="nav-link btn btn-shadow btn-warning" aria-expanded="false" style="font-weight:bold;color:black;">
                             
                            Add New
                            <i class="fa fa-angle-down ml-2 opacity-5"></i>
                        </a>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu" style="min-width:5rem;">
                            
                            <div class="scroll-area-xs">
                                <div class="scrollbar-container">
                                     <button type="button" tabindex="0" class="dropdown-item menu_list"  onclick="window.location.href = '<?php echo base_url().'client/patient/index' ?>';">Patient</button>
                                       <button type="button" tabindex="0" class="dropdown-item menu_list"  onclick="window.location.href = '<?php echo base_url().'client/invoice/add' ?>';">Invoice</button>
                                       <button type="button" tabindex="0" class="dropdown-item menu_list"  onclick="window.location.href = '<?php echo base_url().'client/bill/expanse' ?>';">Expense</button>
									   <button type="button" tabindex="0" class="dropdown-item menu_list"  onclick="window.location.href = '<?php echo base_url().'client/schedule/appointment' ?>';">Appointment</button>
                                       
                                </div>
                            </div>
                            
                        </div>
                    </li>
				  </ul>
				 
											
								<div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="btn-group">
                                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                        <img width="52px;" height="42px;" class="rounded-circle" src="<?php echo base_url().'uploads/logo/'.$logo; ?>" alt="">
                                        <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                    </a>
                                    <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                        <div class="dropdown-menu-header">
                                            <div class="dropdown-menu-header-inner bg-info">
                                                <div class="menu-header-image opacity-2" style="background-image: url('<?php echo base_url() ?>my_assets/assets/images/dropdown-header/city3.jpg')');"></div>
                                                <div class="menu-header-content text-left">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <img width="52px;" height="42px;" class="rounded-circle" src="<?php echo base_url().'uploads/logo/'.$logo; ?>" alt="">
                                                            </div>
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading"><?php echo $first_name; ?>
                                                                </div>
                                                                <div class="widget-subheading opacity-8"><?php echo $this->session->userdata('clinic_name'); ?>
                                                                </div>
                                                            </div>
                                                             <div class="widget-content-right mr-2">
                                                              <button class="btn-pill btn-shadow btn-shine btn btn-focus" onclick="window.location.href = '<?php echo base_url().'client/dashboard/logout' ?>';">Logout
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="grid-menu grid-menu-2col">
                                            <div class="no-gutters row">
                                                <div class="col-sm-6">  
                                                   	<button class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-alternate" onclick="window.location.href = '<?php echo base_url().'client/account/index' ?>';">
                                                        <img style="width:32px; height:32px;" src="<?php echo base_url() ?>iconsforreportsection/My Account.png" alt /></br>
															My Account
                                                    </button>
                                                </div>
                                                <div class="col-sm-6">
                                                   	<button class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-success" onclick="window.location.href = '<?php echo base_url().'client/reports/report_session' ?>';">
                                                       <img style="width:32px; height:32px;" src="<?php echo base_url() ?>img/reporting.png" alt /></br>
													   <b>Daily Register</b>
                                                    </button>
                                                </div>
                                            </div>
										</div>
                                        <ul class="nav flex-column">
                                            <li class="nav-item-divider nav-item">
                                            </li>
                                        </ul>
										<div class="grid-menu grid-menu-2col">
                                            <div class="no-gutters row">
                                                <div class="col-sm-6">
                                                   	<button class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-warning" onclick="window.location.href = '<?php echo base_url().'client/dashboard/change_pwd' ?>';">
                                                         <img style="width:32px; height:32px;" src="<?php echo base_url() ?>iconsforreportsection/Change password.png" alt /></br>
														Change Password
                                                    </button>
                                                </div>
                                                <div class="col-sm-6">
                                                    <button class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-danger" onclick="window.location.href = '<?php echo base_url().'client/settings/index' ?>';">
                                                        <img style="width:32px; height:32px;" src="<?php echo base_url().'iconsforreportsection/Settings.png' ?>" ></img>
													</br><b>Settings</b>
                                                    </button>
                                                </div>
                                            </div>
											
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content-left  ml-3 header-user-info">
                                <div class="widget-heading">
                                    Welcome  
                                </div>
                                <div class="widget-subheading">
                                   <strong><?php echo $first_name; ?></strong>
                                </div>
                            </div>
                             
                        </div>
                    </div>
                </div>
								
						   </div>
        </div>
    </div>     <div class="app-main">
            <div class="app-sidebar sidebar-shadow bg-plum-plate sidebar-text-light">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>    <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <?php $CI =& get_instance();
							$CI->load->model(array('registration_model'));
							$validity = $CI->registration_model->get_valitidy();	
							foreach($validity as $days){			
								$total_days = $days['duration'];
								$users=$days['num_users'];
							}
							$Plans=$this->session->userdata('plan');
							$getcreate = explode(",",$this->session->userdata('create'));
							$getview = explode(",",$this->session->userdata('view'));
							if($this->session->userdata('user_login') == 1){
							$this->db->where('staff_id',$this->session->userdata('staff_id'));
							$this->db->select('create,privileges')->from('tbl_user');
							$res = $this->db->get();
							$val = $res->row()->create;
							$val1=$res->row()->privileges;
							} else {
								$val = '0,0,0,0,0,0,0,0,0';
								$val1 = '0,0,0,0,0,0,0,0,0';
							}
							$q = explode(',',$val);
							$q1 = explode(',',$val1);
					  ?>
					  <li>
						<a href="<?php echo base_url().'client/dashboard/home' ?>" <?php if($page_name == 'dashboard') echo 'class="mm-active"'; ?>>
						 <img src="<?php echo base_url(); ?>img/dashboard.png" style="left:20px; position: fixed; height:32px; width:32px;"> Dashboard  
						 </a>
					  </li>
					  <?php if($this->app_access->check_user_privileges('Patients') || $this->app_access->check_user_privileges('Exercises')){ ?>
					  
					  <li <?php if($page_name == 'patient' || $page_name == 'case' || $page_name == 'exercises'){ echo 'class="mm-active"'; } ?>>  
						<a href="#" <?php if($page_name == 'patient' || $page_name == 'case' || $page_name == 'exercises'){ echo 'class="mm-active"'; } ?>>
						   <img src="<?php echo base_url(); ?>img/patient.png" style="left:20px; position: fixed; height:32px; width:32px;"> EMR Management<i class="metismenu-state-icon fa fa-angle-down caret-left"></i>&nbsp;&nbsp;&nbsp;
						</a>
						<ul>
						<?php if($this->app_access->check_user_privileges('Patients')){
							  ?>
						   <li class=" <?php if($page_name == 'patient') echo 'class="mm-active"'; ?>">
							<a href="<?php echo base_url().'client/patient/patient_view' ?>" <?php if($page_name == 'patient'){ echo 'class="mm-active"'; } ?> >
							   Patients
                          </a>
							
						   </li>
						   <?php  } ?>
						    <?php if($this->app_access->check_user_privileges('Case Reports') ){ ?>
							 <li <?php if($page_name == 'case') echo 'class="mm-active"'; ?>>
								<a href="<?php echo base_url().'client/reports/patient_summary' ?>" <?php if($page_name == 'case') echo 'class="mm-active"'; ?> >
								 Case Report
                                   
								 </a>
							  </li>
							<?php } ?> 
						
						<?Php  $getview = explode(",",$this->session->userdata('view'));
							 	if($this->app_access->check_user_privileges('Exercises') || in_array("9",$getview) ){
						     ?>
						   <li <?php if($page_name == 'exercises') echo 'class="mm-active"'; ?> >
							<a href="<?php echo base_url().'client/exercise/chartlist' ?>" <?php if($page_name == 'exercises') echo 'class="mm-active"'; ?>>
							 <i class="metismenu-icon"></i>
                                    Exercise prescription
                            </a>
							</li>
						   <?php } ?>  
						</ul>
                      </li>
					  <?php } if($this->app_access->check_user_privileges('Schedule')){
					?>
					<?php $this->db->where('client_id',$this->session->userdata('client_id'));
					$this->db->where('t_status','1');
					$this->db->select('appointment_id')->from('tbl_appointments');
					$res = $this->db->count_all_results(); 
					if($res > 0) {
						 $count= $res;
					} else { 
						$count = '';  
					} ?>
					  <li <?php if($page_name == 'schedule') echo 'class="mm-active"'; ?>>
						<a href="<?php echo base_url().'client/schedule/appointment_list' ?>" <?php if($page_name == 'schedule') echo 'class="mm-active"'; ?>>
						  <img src="<?php echo base_url(); ?>img/calendar.png" style="left:20px; position: fixed; height:32px; width:32px;">
                                    Schedule Management&nbsp;&nbsp;&nbsp;
                        </a>
					  </li>
					<?php }
					 ?>
					  <li <?php if($page_name == 'staff' || $page_name == 'referal' || $page_name == 'user' || $page_name == 'letter' ) echo 'class="mm-active"'; ?>>
						<a href="#" <?php if($page_name == 'staff' || $page_name == 'referal' || $page_name == 'user' || $page_name == 'letter' ) echo 'class="mm-active"'; ?>>
						            <img src="<?php echo base_url(); ?>img/staff.png" style="left:20px; position: fixed; height:32px; width:32px;">
									Practice Management
                                    <i class="metismenu-state-icon fa fa-angle-down caret-left"></i>
						</a>
						<ul>
						<?php if($this->app_access->check_user_privileges('Staff')){
							 ?>
						   <li  <?php if($page_name == 'staff'  || $page_name == 'user') echo 'class="mm-active"'; ?>>
							<a href="<?php echo base_url().'client/staff/view'?>" <?php if($page_name == 'staff' || $page_name == 'user') echo 'class="mm-active"'; ?>>
							   <i class="metismenu-icon">
                                                    </i> Staff & User
							</a>
							
						   </li>
						<?php  } ?>
						<?php  if($this->app_access->check_user_privileges('Referal')){ 
						 ?>
						   <li <?php if($page_name == 'referal') echo 'class="mm-active"'; ?>>
							<a href="<?php echo base_url().'client/referal/view_referal' ?>" <?php if($page_name == 'referal') echo 'class="mm-active"'; ?>>
							  Referral
                             </a>
						 </li>
						<?php  }  ?>
						   <li <?php if($page_name == 'letter') echo 'class="mm-active"'; ?>>
							<a href="<?php echo base_url().'client/letter/letter_view'?>" <?php if($page_name == 'letter') echo 'class="mm-active"'; ?>>
							 Communication
                           </a>
							</li>
						 </ul>
                      </li>
					   <?php if($this->app_access->check_user_privileges('Invoice') || $this->app_access->check_user_privileges('Expanse') || $this->app_access->check_user_privileges('inventory')){ ?>
					 
					  <li <?php if($page_name == 'invoice' || $page_name == 'expanse' || $page_name == 'advance' || $page_name == 'inventory') echo 'class="mm-active"'; ?>>
						<a href="<?php echo base_url().'client/invoice/views'; ?>" <?php if($page_name == 'invoice' || $page_name == 'expanse' || $page_name == 'advance' || $page_name == 'inventory') echo 'class="mm-active"'; ?>>
						  <img src="<?php echo base_url(); ?>img/bills.png" style="left:20px; position: fixed; height:32px; width:32px;">
                                    Financial Management
                                    
						</a>
						
                      </li>
					  <?php } ?>
					 <?php if($this->app_access->check_user_privileges('Reports')){
						 ?>
							<li <?php if($page_name == 'reports' || $page_name == 'transaction' || $page_name == 'practitioners' || $page_name == 'export' || $page_name == 'marketing' ) echo 'class="mm-active"'; ?>>
							<a href="#" <?php  if($page_name == 'reports' || $page_name == 'export' || $page_name == 'transaction' || $page_name == 'practitioners' || $page_name == 'marketing' ) echo 'class="mm-active"'; ?>>
							   <img src="<?php echo base_url(); ?>img/reports.png" style="left:20px; position: fixed; height:32px; width:32px;" >                                    Business Review <!--Reports-->
                                    <i class="metismenu-state-icon fa fa-angle-down caret-left"></i>
							</a>
							<ul>
								  <li <?php if($page_name == 'transaction') echo 'class="mm-active"'; ?>>
									<a href="<?php echo base_url().'client/reports/bill_amt' ?>" <?php if($page_name == 'transaction') echo 'class="mm-active"'; ?>>
									    Financial Reports
                                   </a>
								 </li>
								 <?php if($this->app_access->check_user_privileges('Practitioners Performance')){ ?>
								  <li <?php if($page_name == 'practitioners') echo 'class="mm-active"'; ?>>
									<a href="<?php echo base_url().'client/reports/practitioners' ?>" <?php if($page_name == 'practitioners') echo 'class="mm-active"'; ?>>Practitioners
									</a>
								  </li>
								 <?php } if($this->app_access->check_user_privileges('Marketing reports')){ ?>
								   <li <?php if($page_name == 'marketing') echo 'class="mm-active"'; ?>>
									<a href="<?php echo base_url().'client/reports/marketing' ?>" <?php if($page_name == 'marketing') echo 'class="mm-active"'; ?>>Marketing reports
									</a>
								  </li>
								 <?php } ?>
								  <li <?php if($page_name == 'export') echo 'class="mm-active"'; ?>>
									<a href="<?php echo base_url().'client/reports/export_data' ?>" <?php if($page_name == 'export') echo 'class="mm-active"'; ?>>
									  <i class="metismenu-icon"></i>
                                            Export Data
                                            
									</a>
								  </li>
								 </ul>
							</li>
					  
					 <?php } $CI =& get_instance();
						$CI->load->model(array('client','location_model'));
						$locationCount = $CI->location_model->getLocationCount();
						$parentClientId = $CI->location_model->getParentClientId();
						if($parentClientId == 0 && $this->session->userdata('is_location') == 1){
						if($this->app_access->check_user_privileges('unknowntwxt')){
					?>
                    <li <?php if($page_name == 'location') echo 'class="mm-active"'; ?>>
                    <a href="<?php echo base_url().'client/location/view' ?>" <?php if($page_name == 'location') echo 'class="mm-active"'; ?>>
                       <img src="<?php echo base_url(); ?>img/icon-pin.png" style="left:20px; position: fixed; height:30px; width:32px;" >
                                    Multi-location
                    </a>
                  </li>
					 <?php
						} } if($this->session->userdata('staff_id') == false){ ?>
					<li <?php if($page_name == 'settings') echo 'class="mm-active"'; ?>>  
						<a href="<?php echo base_url().'client/settings/index' ?>" <?php if($page_name == 'settings') echo 'class="mm-active"'; ?>>
						 <img src="<?php echo base_url().'iconsforreportsection/Settings.png' ?>" style="left:20px; position: fixed; height:30px; width:32px;"> Settings  
						 </a>
					</li>	
				  <?php } else { ?>
				  <li <?php if($page_name == 'settings') echo 'class="mm-active"'; ?>>  
						<a href="<?php echo base_url().'client/staff/edit_time/'.$this->session->userdata('staff_id'); ?>" <?php if($page_name == 'settings') echo 'class="mm-active"'; ?>>
						 <img src="<?php echo base_url().'iconsforreportsection/Settings.png' ?>" style="left:20px; position: fixed; height:30px; width:32px;"> Settings  
						 </a>
					</li>	
				  <?php } ?>
				</ul>
                    </div>
                </div>
            </div>   