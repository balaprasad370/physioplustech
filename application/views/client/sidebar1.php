

<div class="app-header app-header header-shadow bg-plum-plate header-text-light">
        <div class="app-header__logo">
            <h4 style="color:white;" ><b>Physio Plus Tech</b></h4>
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
		<?Php $c_id = $this->session->userdata('client_id');
				$this->db->select('logo,first_name')->from('tbl_client');
				$this->db->where('client_id',$c_id);
				$res = $this->db->get();
				$first_name = $res->row()->first_name;				
				$logo = $res->row()->logo;	?>
		<div class="app-header__content">
            <div class="app-header-right">
                <div class="header-dots">
                    <div class="dropdown">
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                <span class="icon-wrapper-bg bg-primary"></span>
                                <i class="fa fa-ellipsis-v icon text-primary"></i>
                            </span>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header">
                                <div class="dropdown-menu-header-inner bg-plum-plate">
                                    <div class="menu-header-image" style="background-image: url('assets/images/dropdown-header/abstract4.jpg');"></div>
                                    <div class="menu-header-content text-white">
                                        <h5 class="menu-header-title">Welcome</h5>
                                        <h6 class="menu-header-subtitle"><?php echo $first_name; ?></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-menu grid-menu-xl grid-menu-3col">
                                <div class="no-gutters row">
                                    <div class="col-sm-6 col-xl-4">
                                        <a href="<?php echo base_url().'client/account/index' ?>"><button class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                            <img src="<?php echo base_url() ?>img/My_Account.png" alt /></br>
                                            My Account
                                        </button></a>
                                    </div>
                                    <div class="col-sm-6 col-xl-4">
                                        <a href="<?php echo base_url().'client/reports/report_session' ?>"><button class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                            <img src="<?php echo base_url() ?>img/reporting.png" alt /></br>
                                            Daily register
                                        </button></a>
                                    </div>
                                    <div class="col-sm-6 col-xl-4">
                                       <a href="<?php echo base_url().'client/dashboard/change_pwd' ?>"> <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                            <img src="<?php echo base_url() ?>img/change_password.png" alt /></br>
                                            Change Password
                                        </button></a>
                                    </div>
                                    <div class="col-sm-6 col-xl-4">
                                        <a href="<?php echo base_url().'client/group/single_sent' ?>"><button class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                            <img src="<?php echo base_url() ?>img/reporting.png" alt /></br>
                                            Wish Birthday
                                        </button></a>
                                    </div>
                                    <div class="col-sm-6 col-xl-4">
									<a href="<?php echo base_url().'client/settings/index' ?>">
                                        <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                            <img src="<?php echo base_url().'img/settings.png' ?>" ></img>
                                          </br> Settings 
                                        </button> </a>
                                    </div>
                                    <div class="col-sm-6 col-xl-4">
                                       <a href="<?php echo base_url().'user/dashboard/logout' ?>"> <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                            <img src="<?php echo base_url() ?>img/logout.png"></br>
                                            Logout
                                        </button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
               </div>
           
        </div>
    </div> 
	
	<div class="app-main">
	
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
                            <li>
                                <a href="<?php echo base_url().'client/dashboard/home' ?>">
                                  <img src="<?php echo base_url(); ?>img/dashboard.png" style="left:20px; position: fixed; height:32px; width:32px;"> 
                                    Dashboard
                                     
                                </a>
                                 
                            </li>
                            <li>
                                <a href="#">
                                    <img src="<?php echo base_url(); ?>img/patient.png" style="left:20px; position: fixed; height:32px; width:32px;">
                                    EMR Management
                                    <i class="metismenu-state-icon fa fa-angle-down caret-left"></i>&nbsp;&nbsp;&nbsp;
                                </a>
                                <ul>
                                    <li>
                                        <a href="#">
                                            Patients
                                            <i class="metismenu-state-icon fa fa-angle-down caret-left"></i>
                                        </a>
                                         <ul>
											<li>
												<a href="<?php echo base_url().'client/patient/index' ?>">
													<i class="metismenu-icon"></i>
													Add Patients
												</a>
											</li>
											<li>
												<a href="<?php echo base_url().'client/patient/patient_view' ?>">
													<i class="metismenu-icon">
													</i>View Patients
												</a>
											</li>
											 
											<li>
												<a href="<?php echo base_url().'client/patient/mobileapppatient_view' ?>">
													<i class="metismenu-icon">
													</i>Approve Patients
												</a>
											</li>
										</ul>
                                    </li>
									
									<li> <a href="<?php echo base_url().'client/reports/patient_summary' ?>">
                                    
                                    Case Report
                                   
                                </a>
								</li>
                                    <li>
                                <a href="#">
                                   <i class="metismenu-icon"></i>
                                    Exercise prescription
                                    <i class="metismenu-state-icon fa fa-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?php echo base_url().'client/exercise/chartlist' ?>">
                                            <i class="metismenu-icon">
                                            </i>Exercise Charts
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url().'client/exercise/exercise_chartlist'?>">
                                            <i class="metismenu-icon">
                                            </i>View Sent Exercise Prescription
                                        </a>
                                    </li>
									<li>
                                        <a href="<?php echo base_url().'client/exercise/public_exercise' ?>">
                                            <i class="metismenu-icon">
                                            </i>Make Exercise Chart
                                        </a>
                                    </li>
									 
                                     
                                </ul>
                            </li>
									
									
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                   <img src="<?php echo base_url(); ?>img/calendar.png" style="left:20px; position: fixed; height:32px; width:32px;">
                                    Schedule Management&nbsp;&nbsp;&nbsp;
                                    <i class="metismenu-state-icon fa fa-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?php echo base_url().'client/schedule/appointment' ?>">
                                            <i class="metismenu-icon">
                                            </i>Manage Appointments
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url().'client/schedule/appointment_list' ?>">
                                            <i class="metismenu-icon">
                                            </i>Appointments List
                                        </a>
                                    </li>
                                   <li>
                                        <a href="<?php echo base_url().'client/schedule/cancel_appointment' ?>">
                                            <i class="metismenu-icon"></i>
                                            Cancelled Appointments
                                           
                                        </a>
                                          
                                    </li>
                                </ul>
                            </li>
                           	<li>
                                <a href="#">
                                    <img src="<?php echo base_url(); ?>img/staff.png" style="left:20px; position: fixed; height:32px; width:32px;">
                                    Practice Management
                                    <i class="metismenu-state-icon fa fa-angle-down caret-left"></i>
                                </a>
                                <ul>
                                   <li>
                                        <a href="#">
                                            Staff
                                            <i class="metismenu-state-icon fa fa-angle-down caret-left"></i>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="<?php echo base_url().'client/staff/view'?>">
                                                    <i class="metismenu-icon">
                                                    </i>View Staff
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url().'client/staff/add' ?>">
                                                    <i class="metismenu-icon">
                                                    </i>New Staff
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">
                                             
                                            Referral
                                            <i class="metismenu-state-icon fa fa-angle-down caret-left"></i>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="<?php echo base_url().'client/referal/view_referal'?>">
                                                    <i class="metismenu-icon">
                                                    </i>View Referral Source
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url().'client/referal/index' ?>">
                                                    <i class="metismenu-icon">
                                                    </i>Add Referral Source
                                                </a>
                                            </li>
											
											<li>
                                                <a href="<?php echo base_url().'client/reports/referal_reports' ?>">
                                                    <i class="metismenu-icon">
                                                    </i>Referral Report
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
									<li>
                                        <a href="#">
                                           
                                            User
                                            <i class="metismenu-state-icon fa fa-angle-down caret-left"></i>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="<?php echo base_url().'client/user/view' ?>">
                                                    <i class="metismenu-icon">
                                                    </i>View User
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url().'client/user/add' ?>">
                                                    <i class="metismenu-icon">
                                                    </i>New User
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
									<li>
                                        <a href="#">
                                           
                                            Communication
                                            <i class="metismenu-state-icon fa fa-angle-down caret-left"></i>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="<?php echo base_url().'client/letter/letter_view'?>">
                                                    <i class="metismenu-icon">
                                                    </i>View All
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url().'client/letter/letter_format'?>">
                                                    <i class="metismenu-icon">
                                                    </i>Add New
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
							 
							<li>
                                <a href="#">
                                    <img src="<?php echo base_url(); ?>img/bills.png" style="left:20px; position: fixed; height:32px; width:32px;">
                                    Financial Management
                                    <i class="metismenu-state-icon fa fa-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    
                                    <li>
                                        <a href="#">
                                          
                                            Invoice
                                            <i class="metismenu-state-icon fa fa-angle-down caret-left"></i>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="<?php echo base_url().'client/invoice/views' ?>">
                                                    <i class="metismenu-icon">
                                                    </i>View Invoice
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url().'client/invoice/add' ?>">
                                                    <i class="metismenu-icon">
                                                    </i>New Invoice
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">
                                           
                                            Expense
                                            <i class="metismenu-state-icon fa fa-angle-down caret-left"></i>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="<?php echo base_url().'client/bill/expanse_view'?>">
                                                    <i class="metismenu-icon">
                                                    </i>View Expenses
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url().'client/bill/expanse' ?>">
                                                    <i class="metismenu-icon">
                                                    </i>Add Expense
                                                </a>
                                            </li>
											<li>
                                                <a href="<?php echo base_url().'client/reports/expansereport' ?>">
                                                    <i class="metismenu-icon">
                                                    </i>Expense Reports
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
									<li>
                                        <a href="#">
                                            <i class="metismenu-icon"></i>
                                            Advance
                                            <i class="metismenu-state-icon fa fa-angle-down caret-left"></i>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="<?php echo base_url().'client/advance/view' ?>">
                                                    <i class="metismenu-icon">
                                                    </i>View OP Advance
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url().'client/advance/add' ?>">
                                                    <i class="metismenu-icon">
                                                    </i>New OP Advance
                                                </a>
                                            </li>
											
											<li>
                                                <a href="<?php echo base_url().'client/reports/advance' ?>">
                                                    <i class="metismenu-icon">
                                                    </i>Advance Reports
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
									<li>
                                        <a href="#">
                                            <i class="metismenu-icon"></i>
                                            Inventory
                                            <i class="metismenu-state-icon fa fa-angle-down caret-left"></i>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="<?php echo base_url().'client/inventory/stock_value'?>">
                                                    <i class="metismenu-icon">
                                                    </i>View Product
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url().'client/inventory/index'?>">
                                                    <i class="metismenu-icon">
                                                    </i>Add Product
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
							
							<li>
                                <a href="#">
                                    <img src="<?php echo base_url(); ?>img/reports.png" style="left:20px; position: fixed; height:32px; width:32px;" >                                    Reports
                                    <i class="metismenu-state-icon fa fa-angle-down caret-left"></i>
                                </a>
                                <ul>
                                   <li>
                                        <a href="#">
                                            Transactions
                                            <i class="metismenu-state-icon fa fa-angle-down caret-left"></i>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="<?php echo base_url().'client/reports/bill_amt' ?>">
                                                    <i class="metismenu-icon">
                                                    </i>Daily payments
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url().'client/reports/daily_payments' ?>">
                                                    <i class="metismenu-icon">
                                                    </i>Summary of Payments by Type
                                                </a>
                                            </li>
											<li>
                                                <a href="<?php echo base_url().'client/reports/income_charts' ?>">
                                                    <i class="metismenu-icon">
                                                    </i>Payment summary
                                                </a>
                                            </li><li>
                                                <a href="<?php echo base_url().'client/reports/outstand' ?>">
                                                    <i class="metismenu-icon">
                                                    </i>Outstanding invoices
                                                </a>
                                            </li> <li>
                                                <a href="<?php echo base_url().'client/reports/income_statement' ?>">
                                                    <i class="metismenu-icon">
                                                    </i>Income Statement
                                                </a>
                                            </li><li>
                                                <a href="<?php echo base_url().'client/reports/income_treatmentwise' ?>">
                                                    <i class="metismenu-icon">
                                                    </i>Income (Treatmentwise)
                                                </a>
                                            </li><li>
                                                <a href="<?php echo base_url().'client/reports/balance' ?>">
                                                    <i class="metismenu-icon">
                                                    </i>Balance Sheet
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Practitioners
                                            <i class="metismenu-state-icon fa fa-angle-down caret-left"></i>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="<?php echo base_url().'client/reports/performance_charts'?>">
                                                    <i class="metismenu-icon">
                                                    </i>Practitioners Performance (Invoice Wise)
                                                </a>
                                            </li>
											<li>
                                                <a href="<?php echo base_url().'client/staff/staff_report'?>">
                                                    <i class="metismenu-icon">
                                                    </i>Practitioners Performance (Treatment Wise)
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url().'client/invoice/views' ?>">
                                                    <i class="metismenu-icon">
                                                    </i>Revenue by created invoices
                                                </a>
                                            </li>
											<li>
                                                <a href="<?php echo base_url().'client/staff/staffpro1' ?>">
                                                    <i class="metismenu-icon">
                                                    </i>Revenue by paid invoices
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
									<li>
                                        <a href="#">
                                            <i class="metismenu-icon"></i>
                                            Marketing reports
                                            <i class="metismenu-state-icon fa fa-angle-down caret-left"></i>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="<?php echo base_url().'client/reports/referal_src' ?>">
                                                    <i class="metismenu-icon">
                                                    </i>Referral sources
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url().'client/reports/patient_src' ?>">
                                                    <i class="metismenu-icon">
                                                    </i>Patients Statisics
                                                </a>
                                            </li>
											<li>
                                                <a href="<?php echo base_url().'client/reports/apt_src' ?>">
                                                    <i class="metismenu-icon">
                                                    </i>Appointments Statistics 
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
									
                                </ul>
                            </li>
							<li>
                                <a href="#">
                                     <img src="<?php echo base_url(); ?>img/icon-pin.png" style="left:20px; position: fixed; height:30px; width:32px;" >
                                    Multi-location
                                    <i class="metismenu-state-icon fa fa-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?php echo base_url().'client/location/view' ?>">
                                            <i class="metismenu-icon">
                                            </i>View Location
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url().'client/referal/location_one' ?>">
                                            <i class="metismenu-icon">
                                            </i>New Location
                                        </a>
                                    </li>
                                     
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>  