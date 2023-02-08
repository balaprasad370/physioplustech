 <div class="navbar navbar-default navbar-fixed-top navbar-transparent-black mm-fixed-top" role="navigation" id="navbar">
      <div class="navbar-header col-md-2">
            <a class="navbar-brand" href="<?php echo base_url().'client/dashboard/home' ?>">
              <strong>Physio Plus</strong>Tech
           </a>
            <div class="sidebar-collapse">
              <a href="#">
                <i class="fa fa-bars"></i>
              </a>
            </div>
          </div>
           <div class="navbar-collapse">
          	
		
		   
            <ul class="nav navbar-nav side-nav" id="sidebar">
              
              <li class="collapsed-content"> 
                <ul>
                  <li class="search"></li>
                </ul>
              </li>

              <li class="navigation" id="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="#navigation"> <i class="fa fa-angle-up"></i></a>
                <ul class="menu">
                  <?php if($this->session->userdata('user_name') == 'username' ) { ?>
				  <li class="">
                    <a href="<?php echo base_url().'physioadmin/client_det/dashboard'?>">
                      <i class="fa fa-dashboard"></i> Dashboard
                    </a>
                  </li>
				  <?php } ?>
                  <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                       <i class="fa fa-user"></i> Client <b class="fa fa-plus dropdown-plus"></b>
                    </a>
                    <ul class="dropdown-menu">
					 
					  <li class="">
                        <a href="<?php echo base_url().'subadmin/dashboard/client_list' ?>">
                          <i class="fa fa-caret-right"></i> Total Client List
                        </a>
                      </li>
					  
					 <li class="">
                        <a href="<?php echo base_url().'subadmin/dashboard/index' ?>">
                          <i class="fa fa-caret-right"></i> Support Clients
                        </a>
                      </li>
                     
                    </ul>
                  </li>
				   
                 
                
					  <li class="dropdown ">
                    <a href="<?php echo base_url().'subadmin/dashboard/logout' ?>">
                      <i class="fa fa-sign-out" aria-hidden="true"></i>  Logout
                    </a>
                    
					  </li>
                  
                 
				   
	              <li class="dropdown">
                   <ul class="dropdown-menu">
				   </ul>
                  </li>
					</ul>
              </li>
			</ul>
            </div>
         </div>