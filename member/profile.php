<?php
  session_start();
  require_once '../includes/security.inc.php';
  include "../classes/dbh.classes.php";
  include "../classes/view_outreaches.classes.php";
  include '../classes/resive_msg_gen.classes.php';
  if ($_SESSION['approved'] == '' || $_SESSION == '0') {
    // code...
    header('Location ../index.php');
    exit();
  } ?>
  


<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Jasons | Profile</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="index.php"><img class="logo_icon img-responsive" src="images/logo.png" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="https://jasonsinternational.org/app/avatar_uploads/<?php echo $_SESSION['avatar_add']; ?>" alt="#" /></div>
                        <div class="user_info">
                           <h6><?php echo $_SESSION['first_name']; ?> <?php echo $_SESSION['last_name']; ?></h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>General</h4>
                  <ul class="list-unstyled components">
                     <li >
                        <a href="index.php"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
                       
                     </li >
                     <li class="active"><a href="outreaches.php"><i class="fa fa-clock-o orange_color"></i> <span>Outreaches</span></a></li>
      
            
                    
                     <li class="active">
                        <a href="#additional_page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-clone yellow_color"></i> <span>Additional Pages</span></a>
                        <ul class="collapse list-unstyled" id="additional_page">
                           <li>
                              <a href="profile.php">> <span>Profile</span></a>
                           </li>
                           <li>
                              <a href="#">> <span>Outreaches Attended</span></a>
                           </li>
                          
                        </ul>
                     </li>
                     <!-- <li><a href="settings.html"><i class="fa fa-cog yellow_color"></i> <span>Main Site</span></a></li> -->
                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           <a href="index.php"><img class="logo_icon img-responsive" src="images/logo.png" alt="#" /></a>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                              <ul>
                                 <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">.</span></a></li>
                                 <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                                 <!-- <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li> -->
                              </ul>
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="https://jasonsinternational.org/app/avatar_uploads/<?php echo $_SESSION['avatar_add']; ?>" alt="#" /><span class="name_user"><?php echo $_SESSION['first_name']; ?> <?php echo $_SESSION['last_name']; ?></span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="profile.php">My Profile</a>
                                       <a class="dropdown-item" href="help.html">Help</a>
                                       <a class="dropdown-item" href="../includes/logout.inc.php"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Your profile <?php echo $_SESSION['first_name'];?></h2>
                           </div>
                        </div>
                     </div>
                     <!-- end welcome -->
                     
                     <!-- dashboard inner -->
               
                     <!-- row -->
                     <div class="row column1">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>User profile</h2>
                                 </div>
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <!-- user profile section --> 
                                    <!-- profile image -->
                                    <div class="col-lg-12">
                                       <div class="full dis_flex center_text">
                                          <div class="profile_img"><img width="180" class="rounded-circle" src="https://jasonsinternational.org/app/avatar_uploads/<?php echo $_SESSION['avatar_add']; ?>" alt="#" /></div>
                                          <div class="profile_contant">
                                             <div class="contact_inner">
                                                <h3><?php echo $_SESSION['first_name']; ?> <?php echo $_SESSION['last_name']; ?></h3>
                                                <p><strong>Occupation: </strong><?php echo $_SESSION['job_pro']; ?></p>
                                                <ul class="list-unstyled">
                                                   <li><i class="fa fa-envelope-o"></i> <?php echo $_SESSION['email']; ?></li>
                                                   <li> <?php echo $_SESSION['unix_id']; ?></li>
                                                   <li> <?php echo $_SESSION['birthday']; ?></li>
                                                   <li><i class="fa fa-phone"></i><?php echo $_SESSION['phone']; ?></li>
                                                </ul>
                                             </div>
                                             <div class="user_progress_bar">
                                                <div class="progress_bar">
                                                   <!-- Skill Bars -->
                                                   <span class="skill" style="width:85%;">Applications Status<span class="info_valume">85%</span></span>                   
                                                   <div class="progress skill-bar ">
                                                      <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
                                                      </div>
                                                   </div>
                                                   <!-- profile contant section -->
                                       <div class="full inner_elements margin_top_30">
                                          <div class="tab_style2">
                                             <div class="tabbar">
                                                <nav>
                                                   <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#recent_activity" role="tab" aria-selected="true">Document Uploaded</a>
                                                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#project_worked" role="tab" aria-selected="false">Payment Status</a>
                                                      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#profile_section" role="tab" aria-selected="false">Friends</a>
                                                   </div>
                                                </nav>
                                                <div class="tab-content" id="nav-tabContent">
                                                   <div class="tab-pane fade show active" id="recent_activity" role="tabpanel" aria-labelledby="nav-home-tab">
                                                      <div class="msg_list_main">
                                                         <ul class="msg_list">
                                                            <li>
                                                               <span><img src="https://jasonsinternational.org/app/qualification_uploads/<?php echo $_SESSION['attach_qualification_add']; ?>" class="img-responsive" alt="#"></span>
                                                               <span>
                                                               <span class="name_user">Qualification 1</span>
                                                              
                                                            </li>
                                                              <li>
                                                               <span><img src="https://jasonsinternational.org/app/sec_qualification_uploads/<?php echo $_SESSION['sec_attach_qualification_add']; ?>" class="img-responsive" alt="#"></span>
                                                               <span>
                                                               <span class="name_user">Qualification 2</span>
                                                              
                                                            </li>
                                                            <li>
                                                               <span><img src="https://jasonsinternational.org/app/other_qualification_uploads/<?php echo $_SESSION['qua_1_add']; ?>" class="img-responsive" alt="#"></span>
                                                               <span>
                                                               <span class="name_user">Other Qualification 1</span>
                                                            </li>
                                                            <li>
                                                               <span><img src="https://jasonsinternational.org/app/other_qualification_uploads/<?php echo $_SESSION['qua_2_add']; ?>" class="img-responsive" alt="#"></span>
                                                               <span>
                                                               <span class="name_user">Other Qualification 2</span>
                                                            </li>

                                                            <li>
                                                               <span><img src="https://jasonsinternational.org/app/other_qualification_uploads/<?php echo $_SESSION['qua_3_add']; ?>" class="img-responsive" alt="#"></span>
                                                               <span>
                                                               <span class="name_user">Other Qualification 2</span>
                                                            </li>
                                                           
                                                         </ul>
                                                      </div>
                                                   </div>
                                                   <div class="tab-pane fade" id="project_worked" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                      <p>
                                                         NULL
                                                      </p>
                                                   </div>
                                                   <div class="tab-pane fade" id="profile_section" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                      <p>
                                                         NULL
                                                      </p>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                     
                  <!-- footer -->
                  <div class="container-fluid">
                     <div class="footer">
                        <p>Copyright © 2024 Developed by Azriel Technologies All rights reserved.<br>
                        </p>
                     </div>
                  </div>
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <script src="js/chart_custom_style1.js"></script>
   </body>
</html>