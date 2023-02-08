 <?php
$pri=$this->session->userdata('privilege');
?>
 <header class="header white-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            
            <a href="<?php echo base_url().'patient/patient/home' ?>" class="logo">Physio Plus <span> Tech</span></a>
            
            <div class="nav notify-row" id="top_menu">
                
            </div>
            <div class="top-nav ">
                
                <ul class="nav pull-right top-menu">
                    <li>
                        <div id="fb-root"></div>
						
 

<?php
$title=urlencode('sdkuhgjkg jkhf kjdfgkjfg ');
$url=urlencode('http://www.facebook.com/sorna2u');
$summary=urlencode('Custom message that summarizes what your tab is about, or just a simple message to tell people to check out your tab.');
$image=urlencode('http://physioplustech.com/images/Graph.png');
?>

<a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title;?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;p[images][0]=<?php echo $image;?>','sharer','toolbar=0,status=0,width=548,height=325');" href="javascript: void(0)">Face book Share.</a>





                    </li>
                     <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="<?php echo base_url() ?>patient/img/small_male.png">
                            <span class="username"><?php echo $this->session->userdata('first_name') ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
							<li><a href="#">Please Logout here</a></li>
                            <!--<li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                            <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li>-->
                            <li><a href="<?php echo base_url().'patient/patient/logout' ?>"><i class="fa fa-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                  
                </ul>
                
            </div>
        </header>
		
		<aside>
          <div id="sidebar"  class="nav-collapse ">
              
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a class="<?php if($main_menu == 'dashboard') echo 'active'  ?>" href="<?php echo base_url().'patient/patient/home' ?>">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
				  
                  <li class="sub-menu">
                      <a href="javascript:;" class="<?php if($main_menu == 'report') echo 'active'  ?>">
                          <i class="fa fa-laptop"></i>
                          <span>Reports</span>
                      </a>
                      <ul class="sub">
                          <li class="<?php if($sub_menu == 'case report') echo 'active'  ?>"><a  href="<?php echo base_url().'patient/patient/case_report' ?>">Case Report</a></li>
                          <!--<li class="<?php if($sub_menu == 'bill report') echo 'active'  ?>"><a  href="<?php echo base_url().'patient/patient/bill_report' ?>">Billing Report</a></li>-->
                      </ul>
                  </li>
					
					<?php
					if (strpos($pri,"4")){ ?>
					<li>
					
                      <a class="<?php if($main_menu == 'feed back') echo 'active'  ?>" href="<?php echo base_url().'patient/patient/feedback' ?>">
                          <i class="fa fa-dashboard"></i>
                          <span>Feedback</span>
                      </a>
					 
					</li>
					<?php }$arr =strrchr($pri,"6");  
					if (strpos($pri,"6")){ ?>
				  <li>
				  
                      <a class="<?php if($main_menu == 'Exercise') echo 'active'  ?>" href="<?php echo base_url().'patient/patient/exercise' ?>">
                          <i class="fa fa-tasks"></i>
                          <span>Exercise prescriptions</span>
                      </a>
                  </li>
				 
				   
				  <?php }
				  if (strpos($pri,"3")){ ?>
				   <li>
                      <a class="<?php if($main_menu == 'Invoice') echo 'active'  ?>" href="<?php echo base_url().'patient/patient/bill_report' ?>">
                          <i class="fa fa-tasks"></i>
                          <span>Invoice</span>
                      </a>
                  </li>
				  <?php }
				  if (strpos($pri,"5")){ ?>
				  <!-- <li class="sub-menu">
                      <a href="javascript:;" class="<?php if($main_menu == 'appointment') echo 'active'  ?>">
                          <i class="fa fa-calendar"></i>
                          <span>Appointment</span>
                      </a>
                      <ul class="sub">
                          <li class="<?php if($sub_menu == 'book Appointment') echo 'active'  ?>"><a  href="<?php echo base_url().'patient/patient/appointment' ?>">Book Appointment</a></li>
                          <li class="<?php if($sub_menu == 'Appointment View') echo 'active'  ?>"><a  href="<?php echo base_url().'patient/patient/appointment_details' ?>">Appointment View</a></li>
                      </ul>
                  </li>-->
				 
				  <?php }  ?>
              </ul>
             
          </div>
      </aside>