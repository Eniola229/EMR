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
      <title>Jasons | Outreaches</title>
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
                              <h2>View all our Outreaches <?php echo $_SESSION['first_name'];?></h2>
                           </div>
                        </div>
                     </div>
                     <!-- end welcome -->
                    
                      <div class="full progress_bar_inner">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="msg_section">
                                          <div class="msg_list_main">
                                             <ul class="msg_list">
                                                 <?php foreach ($outreaches as $outreache): ?>
                                                <li>
                                                   <span><img style="height: 100px; width: 100px;" src="https://jasonsinternational.org/app/post_image_uploads/<?php echo $outreache['imgvid_part'] ?>" class="img-responsive" alt="outreaches image" /></span>
                                                   <span>
                                                   <span class="name_user"><?php echo $outreache['title'] ?></span>
                                                   <span class="msg_user"><?php echo $outreache['body'] ?></span>
                                                   <span class="time_ago"><?php echo $outreache['date_time'] ?></span>
                                                   </span>
                                                   <span> <a class="main_bt read_bt" href="read_more.php?id=<?php echo $outreache['outreach_id']; ?>"><div class="center">Apply</div></a></span>
                                                </li>
                                                <?php endforeach; ?>
                                             </ul>
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