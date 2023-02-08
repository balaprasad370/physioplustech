<?php 
ob_start(); 
session_start();  
$ebits = ini_get('error_reporting'); 
error_reporting(0); 
$local = $_SERVER['HTTP_HOST'];


	$host_name = "localhost";
	$host_user = "root";
	$host_pass = "U1loHbU0BZgP";
	$host_db = "App_physioplus";
	
/*	$host_name = "localhost";
	$host_user = "root";
	$host_pass = "U1loHbU0BZgP";
	$host_db = "App_physioplus";*/

 
$conn=mysqli_connect($host_name,$host_user,$host_pass,$host_db);
if(!$conn)
{
	//echo "Connection error".mysqli_connect_error();
}	
else
{
	//echo "Connection Successfull";
}
?>
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
      <link rel="icon" type="image/ico" href="https://physioplustech.in/assets/favicon.ico" />
      <link href="https://physioplustech.in/asset_list/main.css" rel="stylesheet">
      <style>
         .username { 
         text-transform: lowercase;
         }
         ::-webkit-input-placeholder { /* WebKit browsers */
         text-transform: none;
         }
         :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
         text-transform: none;
         }
         ::-moz-placeholder { /* Mozilla Firefox 19+ */
         text-transform: none;
         }
         :-ms-input-placeholder { /* Internet Explorer 10+ */
         text-transform: none;
         }
      </style>
   </head>
   <body>
      <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar closed-sidebar-mobile closed-sidebar">
         <style>
            .menu_list:hover { background-color: #3f6ad8; color:white; }
            @media (max-width: 768px) {
            a.btn-shadow.btn-wide.float-right.btn-hover-shine.btn {
            padding: 0;
            }
            ul.header-megamenu.nav li {
            padding: 0 !important;
            font-size: 13px !important;
            }
            .rounded-circle {
            border-radius: 50% !important;
            width: 40px !important;
            }
            ul.header-megamenu.nav {
            width: 20% !important;
            display: flex;
            align-items: center;
            justify-content: center;
            }
            .app-header-right .btn-group {
            width: 20% !important;
            display: flex;
            align-items: center;
            justify-content: center;
            }
            /* .dropdown.nav-item a.nav-link.btn.btn-shadow.btn-warning {
            margin-bottom: 0 !important;
            padding: 0 !important;
            line-height: 0.8 !important;
            background: transparent !important;
            } */
            .app-header .app-header__content .app-header-right {
            margin: 0 !important;
            width: 100% !important;
            }
            .app-header-right .btn-group a {
            border: none !important;
            }
            .header-megamenu.nav.one {
            display: none;
            }
            ul.header-megamenu.nav li a {
            padding: 0 !important;
            }
            .app-header .app-header__content.header-mobile-open {
            top: 60px;
            width: 100%;
            left: 0;
            right: 0;
            }
            .app-header .app-header__content .header-btn-lg {
            margin-left: 0;
            padding: 0;
            width: 20% !important;
            display: flex;
            align-items: center;
            justify-content: center;
            }
            }
         </style>
         <div class="app-header header-shadow bg-plum-plate header-text-light">
            <div class="app-header__logo">
               <h4 style="color:white;font-size:16px;"><b>Physio Plus Tech</b></h4>
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
            <div class="app-header__content">
               <div class="app-header-right">
                  <div class="btn-group">  
                     <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow btn-wide float-right btn-hover-shine btn" style="background-color: Transparent; border: 1px solid gray; color:white;">
                     <span class="badge badge-pill badge-danger ml-0 mr-1">329</span><font color="white"> Days Remaining</font>
                     </a>
                  </div>
                  &nbsp;&nbsp;  
                  <div class="btn-group">  
                     <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow btn-wide float-right btn-hover-shine btn" style="background-color: Transparent; border: 1px solid gray; color:white;">
                     <span class="badge badge-pill badge-danger ml-0 mr-1">799</span><font color="white">  SMS Left</font>
                     </a>
                  </div>
                  <ul class="header-megamenu nav">
                  </ul>
                  <ul class="header-megamenu nav one">
                     <li class="btn-group nav-item">
                        <a href="https://physioplustech.in/client/group/single_sent">
                        <img src="https://physioplustech.in/iconsforreportsection/m5.png" width="30px;" height="30px;" alt="">					   
                        </a>   
                     </li>
                  </ul>
                  &nbsp;&nbsp; 
                  <ul class="header-megamenu nav one">
                     <li class="dropdown nav-item">
                        <a aria-haspopup="true" data-toggle="dropdown" class="nav-link" aria-expanded="false" style="font-weight:bold;color:black;">
                        <strong> <img src="https://physioplustech.in/img/purse_icon.png" width="25px;" height="25px;" alt=""><span style="color:white;">&nbsp;&nbsp;Rs : 0.00</span></strong>
                        <i class="fa fa-angle-down ml-2 opacity-5" style="color:white;"></i></a>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu" style="min-width:5rem;height:9.5rem;">
                           <div class="scroll-area-xs">
                              <div class="scrollbar-container ps">
                                 <button type="button" tabindex="0" class="dropdown-item menu_list" onClick="window.location.href = 'https://physioplustech.in/client/dashboard/invite_earn';">&nbsp;&nbsp;Invite &amp; Earn</button>
                                 <button type="button" tabindex="0" class="dropdown-item menu_list" onClick="window.location.href = 'https://physioplustech.in/client/dashboard/mypassbook/';">&nbsp;&nbsp;My Passbook</button>
                                 <button type="button" tabindex="0" class="dropdown-item menu_list" onClick="window.location.href = 'https://physioplustech.in/client/dashboard/order_list/';">&nbsp;&nbsp;My Sales</button>
                                 <button type="button" tabindex="0" class="dropdown-item menu_list" onClick="window.location.href = 'https://physioplustech.in/client/dashboard/pendingorder_list/';">&nbsp;&nbsp;Pending Orders</button>
                                 <button type="button" tabindex="0" class="dropdown-item menu_list" onClick="window.location.href = 'https://physioplustech.in/client/dashboard/payout_summary/';">&nbsp;&nbsp;Payout Summary</button>
                                 <br>
                                 <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                 </div>
                                 <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                  </ul>
                  <ul class="header-megamenu nav addnew">
                     <li class="dropdown nav-item">
                        <a aria-haspopup="true" data-toggle="dropdown" class="nav-link btn btn-shadow btn-warning" aria-expanded="false" style="font-weight:bold;color:black;">
                        Add New
                        <i class="fa fa-angle-down ml-2 opacity-5"></i>
                        </a>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu" style="min-width:5rem;">
                           <div class="scroll-area-xs">
                              <div class="scrollbar-container ps">
                                 <button type="button" tabindex="0" class="dropdown-item menu_list" onClick="window.location.href = 'https://physioplustech.in/client/patient/index';">Patient</button>
                                 <button type="button" tabindex="0" class="dropdown-item menu_list" onClick="window.location.href = 'https://physioplustech.in/client/invoice/add';">Invoice</button>
                                 <button type="button" tabindex="0" class="dropdown-item menu_list" onClick="window.location.href = 'https://physioplustech.in/client/bill/expanse';">Expense</button>
                                 <button type="button" tabindex="0" class="dropdown-item menu_list" onClick="window.location.href = 'https://physioplustech.in/client/schedule/appointment';">Appointment</button>
                                 <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                 </div>
                                 <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                 </div>
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
                                 <img width="52px;" height="42px;" class="rounded-circle" src="https://physioplustech.in/uploads/logo/rosarylogo111_copy4.jpg" alt="">
                                 <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                 </a>
                                 <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-menu-header">
                                       <div class="dropdown-menu-header-inner bg-info">
                                          <div class="menu-header-image opacity-2" style="background-image: url('https://physioplustech.in/my_assets/assets/images/dropdown-header/city3.jpg')');"></div>
                                          <div class="menu-header-content text-left">
                                             <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                   <div class="widget-content-left mr-3">
                                                      <img width="52px;" height="42px;" class="rounded-circle" src="https://physioplustech.in/uploads/logo/rosarylogo111_copy4.jpg" alt="">
                                                   </div>
                                                   <div class="widget-content-left">
                                                      <div class="widget-heading">Dr. Deepshikha                                                                </div>
                                                      <div class="widget-subheading opacity-8">Dr. D's                                                                </div>
                                                   </div>
                                                   <div class="widget-content-right mr-2">
                                                      <button class="btn-pill btn-shadow btn-shine btn btn-focus" onClick="window.location.href = 'https://physioplustech.in/client/dashboard/logout';">Logout
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
                                             <button class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-alternate" onClick="window.location.href = 'https://physioplustech.in/client/account/index';">
                                             <img style="width:32px; height:32px;" src="https://physioplustech.in/iconsforreportsection/My Account.png" alt=""><br>
                                             My Account
                                             </button>
                                          </div>
                                          <div class="col-sm-6">
                                             <button class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-success" onClick="window.location.href = 'https://physioplustech.in/client/reports/report_session';">
                                             <img style="width:32px; height:32px;" src="https://physioplustech.in/img/reporting.png" alt=""><br>
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
                                             <button class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-warning" onClick="window.location.href = 'https://physioplustech.in/client/dashboard/change_pwd';">
                                             <img style="width:32px; height:32px;" src="https://physioplustech.in/iconsforreportsection/Change password.png" alt=""><br>
                                             Change Password
                                             </button>
                                          </div>
                                          <div class="col-sm-6">
                                             <button class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-danger" onClick="window.location.href = 'https://physioplustech.in/client/settings/index';">
                                             <img style="width:32px; height:32px;" src="https://physioplustech.in/iconsforreportsection/Settings.png">
                                             <br><b>Settings</b>
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
                                 <strong>Dr. Deepshikha</strong>
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
               </div>
               <div class="scrollbar-sidebar ps">
                  <div class="app-sidebar__inner">
                     <ul class="vertical-nav-menu metismenu">
                        <li>
                           <a href="https://physioplustech.in/client/dashboard/home" class="mm-active">
                           <img src="https://physioplustech.in/img/dashboard.png" style="left:20px; position: fixed; height:32px; width:32px;"> Dashboard  
                           </a>
                        </li>
                        <li>
                           <a href="#">
                           <img src="https://physioplustech.in/img/patient.png" style="left:20px; position: fixed; height:32px; width:32px;"> EMR Management<i class="metismenu-state-icon fa fa-angle-down caret-left"></i>&nbsp;&nbsp;&nbsp;
                           </a>
                           <ul class="mm-collapse">
                              <li class=" ">
                                 <a href="https://physioplustech.in/client/patient/patient_view">
                                 Patients
                                 </a>
                              </li>
                              <li>
                                 <a href="https://physioplustech.in/client/reports/patient_summary">
                                 Case Report
                                 </a>
                              </li>
                              <li>
                                 <a href="https://physioplustech.in/client/exercise/chartlist">
                                 <i class="metismenu-icon"></i>
                                 Exercise prescription
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <li>
                           <a href="https://physioplustech.in/client/schedule/appointment_list">
                           <img src="https://physioplustech.in/img/calendar.png" style="left:20px; position: fixed; height:32px; width:32px;">
                           Schedule Management&nbsp;&nbsp;&nbsp;
                           </a>
                        </li>
                        <li>
                           <a href="#">
                           <img src="https://physioplustech.in/img/staff.png" style="left:20px; position: fixed; height:32px; width:32px;">
                           Practice Management
                           <i class="metismenu-state-icon fa fa-angle-down caret-left"></i>
                           </a>
                           <ul class="mm-collapse">
                              <li>
                                 <a href="https://physioplustech.in/client/staff/view">
                                 <i class="metismenu-icon">
                                 </i> Staff &amp; User
                                 </a>
                              </li>
                              <li>
                                 <a href="https://physioplustech.in/client/referal/view_referal">
                                 Referral
                                 </a>
                              </li>
                              <li>
                                 <a href="https://physioplustech.in/client/letter/letter_view">
                                 Communication
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <li>
                           <a href="https://physioplustech.in/client/invoice/views">
                           <img src="https://physioplustech.in/img/bills.png" style="left:20px; position: fixed; height:32px; width:32px;">
                           Financial Management
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <img src="https://physioplustech.in/img/reports.png" style="left:20px; position: fixed; height:32px; width:32px;">                                    Business Review <!--Reports-->
                              <i class="metismenu-state-icon fa fa-angle-down caret-left"></i>
                           </a>
                           <ul class="mm-collapse">
                              <li>
                                 <a href="https://physioplustech.in/client/reports/bill_amt">
                                 Financial Reports
                                 </a>
                              </li>
                              <li>
                                 <a href="https://physioplustech.in/client/reports/practitioners">Practitioners
                                 </a>
                              </li>
                              <li>
                                 <a href="https://physioplustech.in/client/reports/marketing">Marketing reports
                                 </a>
                              </li>
                              <li>
                                 <a href="https://physioplustech.in/client/reports/export_data">
                                 <i class="metismenu-icon"></i>
                                 Export Data
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <li>  
                           <a href="https://physioplustech.in/client/settings/index">
                           <img src="https://physioplustech.in/iconsforreportsection/Settings.png" style="left:20px; position: fixed; height:30px; width:32px;"> Settings  
                           </a>
                        </li>
                     </ul>
                  </div>
                  <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                     <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                  </div>
                  <div class="ps__rail-y" style="top: 0px; right: 0px;">
                     <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                  </div>
               </div>
            </div>
            <div class="app-main__outer">
               <div class="app-main__inner">
                   <div class="main-card mb-3 card">
                        <div class="view_patient">
                            <div class="card-title mt-3 text-center" style="text-transform:capitalize;">Deepshikha's Appointment Details</div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered mb-0">
                                    <thead>
                                       <?php  $id = $_REQUEST["id"];
									   
									$select="select * from tbl_appointments where appointment_id='$id'";
									$select1=mysqli_query($conn,$select);
									$fetch=mysqli_fetch_array($select1);   
                                    $select_patient="select * from tbl_patient_info where patient_id='".$fetch['patient_id']."'";
									$select_patient1=mysqli_query($conn,$select_patient);
									$fetch_patient=mysqli_fetch_array($select_patient1);							   
																   												
																	 																					
																											
?>

                                    <th>Patient Name</th>
                                      <td><?php echo $fetch_patient['first_name'].' '.$fetch_patient['last_name'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Time </th>

                                            <td class="text-muted"> <div><?php 
                                             echo date('H:i',strtotime($fetch['start'])).' - ' .date('H:i',strtotime($fetch['end']));
                                                  /* print_r($start);
                                                   print_r($end);
                              exit;*/
                                              
                                             ?></div></td>
                                        </tr>
                                        <tr>
                                            <th>Visit Status</th>
                                            <td>
                                                <div class="badge badge-pill badge-danger"></div><?php if($fetch['visit'] != '1'){ ?>
																																<div class="badge badge-pill badge-danger">Not Visited</div>
																																<?php } else { ?><div class="badge badge-pill badge-success">Visited</div> <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Bill Status</th>
                                            <td>
                                                	<?php 
													$select_invoice="select bill_status from tbl_invoice_header where bill_id='".$fetch['bill_id']."' ";
													$select_invoice1=mysqli_query($select_invloce);
													$fetch_invoice=mysqli_fetch_array($select_invoice1);												 
													$num_row=mysqli_num_rows($select_invoice1);
													 
													 																	if($num_rows>0){
																															if($fetch['bill_status'] != '1'){
																																$url = base_url().'client/invoice/invoice_status_update/'.$fetch['bill_id'].'/'.$fetch['patient_id'].'/'.$fetch['appointment_id'];
																																$val = '<div class="badge badge-pill badge-secondary">Make Payment</div>';  
																															} else {
																																$url = '';
																																$val = '<div class="badge badge-pill badge-alternate">Paid</div>';
																															}
																														}  else {
														//$url = base_url().'client/invoice/add/Pt/'.$row['patient_id'].'/'.$row['appointment_id'];
																															if($fetch['item_id'] != '' && $fetch['item_id'] != '0'){
																																$url ='#'.$fetch['appointment_id'];
																																$val = '<div class="badge badge-pill badge-primary make_bill" id="make_bill">Make Bill</div></a>';
																															}else{
																																$url = base_url().'client/invoice/add/Pt/'.$fetch['patient_id'].'/'.$fetch['appointment_id'];
																																$val = '<div class="badge badge-pill badge-primary new_make_bill" id="new_make_bill">Make Bill</div></a>';
																															}
																														}
																														
																														?>												
																											
													  <a href="<?php echo $url ?>"><?php echo $val; ?></a></td>

                                        </tr>
                                        <tr>
                                            <th>Consultant Name</th>
                                             

                                            <td>  <?php  $select_staff="select * from tbl_staff_info where staff_id='".$fetch['staff_id']."'";
											       $select_staff1=mysqli_query($conn,$select_staff);
												   $fetch_staff=mysqli_fetch_array($select_staff1);
											  ?> <?php echo $fetch_staff['first_name'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Action</th>
                                            <td> 
                                                <a href="<?php echo base_url().'client/schedule/reschedule1/'.$fetch['appointment_id']; ?>">
                                                    <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn
                                                        btn-outline-primary" data-toggle="tooltip" data-placement="top"
                                                        title="" data-original-title="Reschedule"><i class="fa fa-edit">
                                                        </i>
                                                    </button>
                                                </a>
                                                	<?php if($fetch['visit'] != '1'){ 
													if($fetch['item_id']!=0){
														?>
														<a class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success daily_reg" data-toggle="tooltip" data-placement="top" title="Change Visit Status" href="<?php echo '#'.$fetch['appointment_id'].'#'.$fetch['pname'].' '.$row['pl_name']; ?>"><i class="fa fa-check"></i></a>
													<?php }else{ ?>
														<a class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="Change Visit Status" href="<?php echo base_url().'client/reports/report_session/'.$fetch['patient_id'].'/'.$row['staff_id'];?>"><i class="fa fa-check"></i></a>
													<?php }}?>
													<?php if($row['link']!=''){?>
														<a  href="<?=$row['link'];?>" target="_blank" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="Google Meet"><img style="width:23px; height:23px;" src="<?php echo base_url().'img/googleMeet.png' ?>" > </img></a>
													<?php } ?>
                                                <a href="#" target="_blank" class="mb-2 mr-2 btn-icon btn-icon-only
                                                    btn-shadow btn-dashed btn btn-outline-success" data-toggle="tooltip"
                                                    data-placement="top" title="" data-original-title="Google Meet">
                                                    <img style="width:23px; height:23px;" src="https://physioplustech.in/img/googleMeet.png"> 
                                                </a>
                                            </td>
                                        </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
         <script type="text/javascript" src="https://physioplustech.in/my_assets/assets/scripts/main.js"></script>
         <script src="https://physioplustech.in/assets/js/bootstrap.min.js"></script>
         <script type="text/javascript" src="https://physioplustech.in/assets/js/jquery.sparkline.min.js"></script>
         <script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
         <script type="text/javascript" src="https://rawgit.com/simeydotme/jQuery-ui-Slider-Pips/master/src/js/jquery-ui-slider-pips.js"></script>
         <script>
            $('#date_filter').trigger('change');
            /*  		$.gritter.add({title:	'Activate Search Physio Account',text:	'Go to settings to join the national online directory for physiotherapistd and enjoy the premium listing for free'});
            */
            $('.daily_reg').click(function() {
            var appointment_id = $(this).attr('href').split('#')[1];  
            var name = $(this).attr('href').split('#')[2];  
            var utl= 'https://physioplustech.in/client/schedule/add_visit';
            swal({
            	title: "Are you sure?",
            	text: name + " has Been Arrived",
            	type: "warning",
            	showCancelButton: true,
            	confirmButtonClass: 'btn-info',
            	confirmButtonText: 'Yes',
            	closeOnConfirm: false,
            },
            function(){
            	
            	$.ajax({
            		type: 'post',
            		url: utl,
            		data : {p_id:appointment_id},
            		dataType: 'json', 
            		success:function(data, textStatus, jqXHR,form) 
            		{ 
            			if(data.status == 'success') {
            				swal("Success!", name + " status has been changed!", "success");
            			}
            			setTimeout(function(){ 
            				window.location.reload();
            			}, 1000); 
            		},
            		error: function(jqXHR, textStatus, errorThrown) 
            		{
            			setTimeout(function(){ 
            				window.location.reload();
            			}, 1000); 
            		}
            	});
            }); 
            });
            
            $('.make_bill').click(function() {  
            
            var utl= 'https://physioplustech.in/client/dashboard/make_bill';
            swal({
            	title: "Are you sure?",
            	text: " Do you want to make a bill for this patient?",
            	type: "warning",
            	showCancelButton: true,
            	confirmButtonClass: 'btn-info',
            	confirmButtonText: 'Yes',
            	closeOnConfirm: false,
            },
            function(){
            	var appointment_id = window.location.hash.substr(1);
            	$.ajax({
            		type: 'post',
            		url: utl,
            		data : {p_id:appointment_id},
            		dataType: 'json', 
            		success:function(data, textStatus, jqXHR,form) 
            		{ 
            			if(data.status == 'success') {
            				swal("Success!", "Your bill has been made", "success");
            			}
            			setTimeout(function(){ 
            				window.location.reload();
            			}, 1000); 
            		},
            		error: function(jqXHR, textStatus, errorThrown) 
            		{
            			setTimeout(function(){ 
            				window.location.reload();
            			}, 1000); 
            		}
            	});
            });
            });
            
            $('.print_tab').click(function(){
            $('#print').show();
            });
            $('.clinic_tab').click(function(){
            $('#print').hide();
            });
            $(function() {
            $("#pips-slider")
            
            .slider({
            	
            	range: true,
            	min: 0,
            	max: 10,
            	values: [0,],
            	step: 2,
            	disabled: true
            	
            })
            
            .slider("pips", {
            	
            	first: "label",
            	last: "label",
            	rest: "label",
            	step: 1,
            	labels: false,
            	prefix: "",
            	suffix: ""
            	
            })
            
            .slider("float", {
            	
            	handle: false,
            	pips: false,
            	labels: false,
            	prefix: "",
            	suffix: ""
            	
            });
            
            
            $('.ui-slider-handle:first').hide();
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
      </div>
      <div class="app-drawer-overlay d-none animated fadeIn"></div>
      <script type="text/javascript" src="https://physioplustech.in/asset_list/assets/scripts/main.js"></script>
   </body>
   <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
   <script src="https://physioplustech.in/asset/js/parsley.min.js"></script>
   <script>
      $(document).ready(function() {
       $('.hide-show').show();
          $('.hide-show').addClass('show');
      
       $('.hide-show').click(function(){
      if( $(this).hasClass('show') ) {
        $(this).text('Hide').css('color', 'black');
        $('input[name="password"]').attr('type','text');
        $(this).removeClass('show');
      } else {
         $(this).text('Show').css('color', 'black');
         $('input[name="password"]').attr('type','password');
         $(this).addClass('show');
      }
       });
       
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