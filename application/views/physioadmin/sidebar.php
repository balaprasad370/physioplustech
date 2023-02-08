<header class="main-header">
					<a href="#" class="logo"> 
						Physio Plus Tech
					</a>
					<nav class="navbar navbar-static-top ">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <!-- Sidebar toggle button-->
                    <span class="sr-only">Toggle navigation</span>
                    <span class="fa fa-tasks"></span>
                </a>
                <div class="navbar-custom-menu">
                   
                                </div>
                            </nav>
                </header><aside class="main-sidebar">
                            <div class="sidebar">
                                <div class="user-panel">
                                    <div class="image pull-left">
                                        <img src="<?php echo base_url() ?>admin_assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
                                    </div>
                                    <div class="info">
                                        <h4>Welcome</h4>
                                        <p>Mr. Admin</p>
                                    </div>
                                </div>
                                
                                <!-- sidebar menu -->
                                <ul class="sidebar-menu">
                                    <li class="treeview">
                                        <a href="#">
                                            <i class="fa fa-user-md"></i><span>Client</span>
                                            <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="<?php echo base_url().'physioadmin/dashboard/home'; ?>">Total Clients List</a></li>
                                            <li><a href="<?php echo base_url().'physioadmin/client_det/view'; ?>">Support Clients</a></li>
                                        </ul>
                                    </li>
                                    <li class="treeview">
                                        <a href="#">
                                            <i class="fa fa-user"></i><span> Plan Client List</span>
                                            <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="<?php echo base_url().'physioadmin/client_det/free_plan'; ?>">Free Plan Client List</a></li>
                                            <li><a href="<?php echo base_url().'physioadmin/client_det/professional_plan'; ?>">Professional Plan</a></li>
                                            <li><a href="<?php echo base_url().'physioadmin/client_det/monetary_plan'; ?>">Monetary Plan Client</a></li>
                                            <li><a href="<?php echo base_url().'physioadmin/client_det/enterprise_plan'; ?>">Enterprise Plan Client</a></li>
                                            <li><a href="<?php echo base_url().'physioadmin/client_det/ultimate_plan'; ?>">Ultimate Plan Client</a></li>
                                            <li><a href="<?php echo base_url().'physioadmin/client_det/institute_plan'; ?>">Institute Plan Client</a></li>
                                        </ul>
                                    </li>
                                    <li class="treeview">
                                        <a href="<?php echo base_url().'physioadmin/client_det/sms_count'; ?>">
                                            <i class="fa fa-sitemap"></i><span>SMS Count</span>
                                            
                                        </a>
                                    </li>
                                    <li class="treeview">
                                        <a href="<?php echo base_url().'physioadmin/client_det/renewal'; ?>">
                                            <i class="fa fa-list-alt"></i> <span>Renewal Clients</span>
                                           
                                        </a>
                                        
                                    </li>
                                    <li class="treeview">
                                        <a href="<?php echo base_url().'physioadmin/client_det/expired'; ?>">
                                            <i class="fa fa-check-square-o"></i><span>Expired Clients</span>
                                        </a>
                                    </li>
                                    <li class="treeview">
                                        <a href="<?php echo base_url().'physioadmin/dashboard/invoice_gen'  ?>">
                                            <i class="fa fa-credit-card-alt"></i><span>Generate Invoice</span>
                                        </a>
                                    </li>
									 <li class="treeview">
                                        <a href="<?php echo base_url().'physioadmin/dashboard/item_add'  ?>">
                                            <i class="fa fa-credit-card-alt"></i><span>Add Invoice Items </span>
                                        </a>
                                    </li>
									<?php //if($this->session->userdata('user_id')== '1'){ ?>
					                 <li class="treeview">
                                        <a href="<?php echo base_url().'physioadmin/dashboard/freedemo_request' ?>">
                                            <i class="fa fa-calendar"></i><span>Free demo Request</span>
                                        </a>
                                    </li>
									
									 <li class="treeview">
                                        <a href="<?php echo base_url().'physioadmin/dashboard/request_quotation' ?>">
                                            <i class="fa fa-envelope"></i><span>Request Quotation</span>
                                        </a>
                                    </li>
									
									
									<li class="treeview">
                                        <a href="#">
                                            <i class="fa fa-user-circle"></i><span> Quotation</span>
                                            <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="<?php echo base_url().'physioadmin/quotation/'; ?>">Add Quotation</a></li>
                                            <li><a href="<?php echo base_url().'physioadmin/quotation/quotation_view'; ?>">View Quotation</a></li>
                                             
                                        </ul>
                                    </li>
									
									 <?php //} ?>
					<li class="treeview">
                                        <a href="<?php echo base_url().'physioadmin/client_det/wallet_list'  ?>">
                                            <i class="fa fa-money"></i><span>Physio Wallet</span>
                                        </a>
                                    </li>
									 <li class="treeview">
                                        <a href="<?php echo base_url().'physioadmin/dashboard/logout'  ?>">
                                            <i class="fa fa-power-off"></i><span>Logout</span>
                                        </a>
                                    </li>
                                    
                                              
                    </ul>
                </div> <!-- /.sidebar -->
            </aside>