<?php
  session_start();
?>


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
      <title>Jasons | Dashboard</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <link rel="stylesheet" href="css/bootstrap-grid.min.css" />
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
                     <li class="active">
                        <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class=""><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
                       
                     </li>
                     <li><a href="outreaches.php"><i class="fa fa-clock-o orange_color"></i> <span>Outreaches</span></a></li>
      
            
                    
                     <li class="active">
                        <a href="#additional_page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-clone yellow_color"></i> <span>Additional Pages</span></a>
                        <ul class="collapse list-unstyled" id="additional_page">
                           <li>
                              <a href="profile.php"> <span>> Profile</span></a>
                           </li>
                           <li>
                              <a href="#"> <span>> Outreaches Attended</span></a>
                           </li>
                           <li>
                              <a href="help.php"> <span>>Support</span></a>
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
                           <a href="index.php"><img class="" src="images/logo.png" alt="#" /></a>
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
                                       <a class="dropdown-item" href="help.php">Help</a>
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
                              <h2>Welcome <?php echo $_SESSION['first_name'];?></h2>
                           </div>
                        </div>
                     </div>
                     <!-- end welcome -->
                      <?php
        if (isset($_GET['status'])) {
            $errorCode = htmlspecialchars($_GET['status']); // Sanitize input
            switch ($errorCode) {
                case 'stmtfailed':
                    echo '<p style="color: red; text-align: center;">An unexpected error occurred!</p>';
                    break;
                case 'allfieldrequired':
                    echo '<p style="color: red; text-align: center;">Message Box cant be left empty</p>';
                    break;
                case 'errora':
                    echo '<p style="color: red; text-align: center;">Error! Could no approved user</p>';
                    break;
                case 'msg_deleted':
                    echo '<p style="color: red; text-align: center;">Message Deleted Succesfully!!!</p>';
                    break;
                case 'msgsuccess':
                    echo '<p style="color: green; text-align: center;">Message Sent Succesfully!!!</p>';
                    break;
                case 'filesizetolarge':
                      echo '<p style="color: red; text-align: center;">File size exceeds the maximum limit (2MB). Please upload a smaller file!!!</p>';
                    break;
                case 'filenotsupported':
                      echo '<p style="color: red; text-align: center;">File type is not supported!!!</p>';
                    break;
                default:
                    // Log unrecognized error codes for debugging
                    error_log("Unrecognized error code: $errorCode");
                    echo '<p style="color: red; text-align: center;">An unexpected error occurred! Please try again later.</p>';
                    break;
            }
        } else {
            echo '<p style="color: green; text-align: center;">Home!!!</p>';
        }
        ?>
          
                     <div class="row column3">
                     </div>
                     <div class="row column4 graph">
                        <div class="col-md-6 margin_bottom_30">
                           <div class="dash_blog">
                              <div class="dash_blog_inner">
                                 <div class="dash_head">
                                    <h3><span><i class="fa fa-calendar"></i>Outreaches</span><span class="plus_green_bt"></span></h3>
                                 </div>
                                 <div class="list_cont">
                                    <p>List of All Outreaches</p>
                                 </div>
                                 <div class="task_list_main">
                                    <ul class="task_list">
                                    <?php foreach ($outreaches as $outreache): ?>
                                       <li><a href="#"><strong><?php echo $outreache['title'] ?></strong></a><br>
                                       <p><?php echo $outreache['body'] ?></p>
                                       <strong><?php echo $outreache['date_time'] ?></strong></li>
                                    <?php endforeach; ?>
                                    </ul>
                                 </div>
                                  <?php
                                     if (!empty($outreache) && $outreache > 2) {
                                       echo ' <div class="read_more">
                                                <div class="center"><a class="main_bt read_bt" href="outreaches.php">Read More</a></div>
                                             </div>';
                                     }
                                     ?>
                                
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="dash_blog">
                              <div class="dash_blog_inner">
                                 <div class="dash_head">
                                    <h3><span><i class="fa fa-comments-o"></i>Updates</span><span class="plus_green_bt"><a href="#"></a></span></h3>
                                 </div>
                                 <div class="list_cont">
                                    <p>General Notifications/Messages</p>
                                 </div>
                                 <div class="msg_list_main">
                                    <ul class="msg_list">
                                       <?php foreach ($messages_views as $index => $messages_view): ?>
                                       <li>
                                          <span><img style="height: 70px; width: 70px;" src="https://jasonsinternational.org/app/avatar_uploads/<?php echo $messages_view['user_avatar_path'] ?>" class="img-responsive" alt="#" /></span>
                                          <span>
                                          <span class="name_user"><?php echo $messages_view['user_name'] ?></span>
                                          <span class="msg_user"><?php echo $messages_view['message'] ?></span>
                                          <span class="time_ago"><?php 
                                          $created_at = strtotime($messages_view['created_at']);
                                          echo date("d M Y H:i", $created_at); ?></span>
                                          </span>

                                       </li>
                                       <div class="col-sm-4 col-md-3 margin_bottom_30">
                                      <li>
                                          <a data-fancybox=""  href="images/layout_img/g8.jpg"><img class="" src="https://www.jasonsinternational.org/app/msg_img_uploads/<?php echo $messages_view['msg_img_video'] ?>" style="height: 20vh;" alt="#" /></a>
                                       </li>
                                        <div class="full progress_bar_inner">
                                       <button type="button" class="model_bt btn btn-primary" data-toggle="modal" data-target="#myModal">Reply</button>
                              </div>
                                    </div>
                                        <?php endforeach; ?>
                                    </ul>
                                 </div>
                                 <div class="read_more">
                                    <div class="center"><a class="main_bt read_bt" href="#">Read More</a></div>
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
          <!-- The Modal -->
         <div class="modal fade" id="myModal">
            <div class="modal-dialog">
               <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                     <h4 class="modal-title">Reply</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                     <form class="send_member_form" method="POST" action="../includes/send_message_mem_inc.php">
                        <input type="hidden" name="user_name" value="<?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name']?>">
                        <input type="hidden" name="user_email" value="<?php echo $_SESSION['email']?>">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']?>">
                        <input type="hidden" name="user_avatar_path" value="<?php echo $_SESSION['avatar_add']?>">
                        <input type="hidden" name="role" value="<?php echo $_SESSION['role']?>">
                        <input type="hidden" name="reply_to" value="<?php echo $messages_view['msg_id'] ?>">
                        <input type="text" style="width: 80%; height: 10vh; border:1px solid blue;" name="message" placeholder=" Reply to this message.....">
                          <div style="position: relative; display: inline-block; background-color: darkblue; padding: 10px; border-radius: 5px; color: white; width: 10%;">

                         <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                             <g fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke-dasharray="66" stroke-dashoffset="66" stroke-width="2" d="M3 14V5H21V19H3V14">
                                     <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="66;0"/>
                                 </path>
                                 <path stroke-dasharray="26" stroke-dashoffset="26" d="M3 16L7 13L10 15L16 10L21 14">
                                     <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.6s" dur="0.4s" values="26;0"/>
                                 </path>
                             </g>
                             <circle cx="7.5" cy="9.5" r="1.5" fill="white" fill-opacity="0">
                                 <animate fill="freeze" attributeName="fill-opacity" begin="1s" dur="0.4s" values="0;1"/>
                             </circle>
                         </svg>
                          <input type="file" name="image" style="width: 100%;">
                     </div>

                         <button style="background: darkblue; color: white; border: none; height: 10vh; width: 100%">Reply</button>
                      </form>
                  </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
               </div>
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