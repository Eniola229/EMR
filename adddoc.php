<?php
session_start();
  // include "classes/view_bookings.classes.php";
  // include "classes/search.classes.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>RHC | Add Doctor</title>
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<script type="text/javascript" src="js/home.js"></script>
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>

	<div class="app-container">
  <div class="app-left">
    <button class="close-menu">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
    </button>
    <div class="app-logo">
      
      <span>RHC DASHBOARD</span>
    </div>
       <ul class="nav-list">
      <li class="nav-list-item">
        <a class="nav-list-link" href="dashboard.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"/></svg>
          Dashboard
        </a>
      </li>
      <li class="nav-list-item active">
        <a class="nav-list-link" href="adddoc.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
          Add Doctors
        </a>
      </li>
      <li class="nav-list-item">
        <a class="nav-list-link" href="viewdoc.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"/><polyline points="13 2 13 9 20 9"/></svg>
          View All Doctors
        </a>
      </li>
      <li class="nav-list-item">
        <a class="nav-list-link" href="patient.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"/><polyline points="13 2 13 9 20 9"/></svg>
          View All Patients
        </a>
      </li>
      <li class="nav-list-item">
        <a class="nav-list-link" href="patient.php">
          <svg xmlns=
          "http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            Complains
        </a>
      </li>
        <li class="nav-list-item">
        <a class="nav-list-link" href="Ecounter.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"/><polyline points="13 2 13 9 20 9"/></svg>
            Ecounter Note
        </a>
      </li>
      <li class="nav-list-item">
        <a class="nav-list-link" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"/><path d="M22 12A10 10 0 0 0 12 2v10z"/></svg>
          Reports
        </a>
      </li>

      <li class="nav-list-item">
        <a class="nav-list-link" style="color: red;" href="includes/logout.inc.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"/><path d="M22 12A10 10 0 0 0 12 2v10z"/></svg>
          Logout
        </a>
      </li>
    </ul>
  </div>
  <!----------------------sidenav end------------->

  <div class="app-main">
    
     <div class="main-header-line">
      <h1 style="color: black;">Add Doctors and Nurse here</h1>
      <div class="action-buttons">
        <button class="open-right-area">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
      </button>
      <button class="menu-button">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
      </button>
      </div>
  
    </div>
    <div class="chart-row two">
      <div class="chart-container-wrapper big">
        <div class="chart-container">
          <div class="chart-container-header">
            <h2>Add New Doctors or Nurse</h2>
            <span>
        <?php
        if (isset($_GET['status'])) {
            $errorCode = htmlspecialchars($_GET['status']); // Sanitize input
            switch ($errorCode) {
                case 'stmtfailed':
                    echo '<p style="color: red; text-align: center;">An unexpected error occurred!</p>';
                    break;
                case 'emptyInput':
                    echo '<p style="color: red; text-align: center;">All fields are required!</p>';
                    break;
                case 'loginfailed':
                    echo '<p style="color: red; text-align: center;">Invalid Email or Password</p>';
                    break;
                case 'emailsent':
                    echo '<p style="color:white; text-align:center">Successful! Kindly Check your Email and Login</p>';
                    break; 
                case 'invalidfiletype':
                    echo '<p style="color:red; text-align:center">Invalid Image Uploaded</p>';
                    break;
                case 'invalidAttempit':
                     echo '<p style="color:red; text-align:center">Invalid Attempt</p>';
                    break;
                case 'useroremailtaken':
                     echo '<p style="color:red; font-weight:bold; text-align:center">Already Registered</p>';
                    break;
                default:
                    // Log unrecognized error codes for debugging
                    error_log("Unrecognized error code: $errorCode");
                    echo '<p style="color: red; text-align: center;">An unexpected error occurred! Please try again later.</p>';
                    break;
            }
        } else {
            echo '<p style="color: red; text-align: center;">Kindly fill in your details correctly!</p>';
        }
        ?>
        </span>
          </div>
          <form action="includes/register.inc.php" method="POST" enctype="multipart/form-data">
        <div class="row justify-content-between text-left">
          <div class="form-group col-sm-6 d-flex flex-column">
            <label for="doctor_img_path" class="form-label" style="align-self: flex-start; color: white;">Doctor Img*</label>
            <input 
              type="file" 
              name="doctor_img_path" 
              class="form-control" 
              id="" 
              required 
              aria-required="true"
              aria-describedby="snameHelp"
            >
          </div>

          <div class="form-group col-sm-6 flex-column d-flex text-left">
            <label for="fname" class="form-label" style="align-self: flex-start; color: white;">Surname*</label>
            <input type="text" name="sname" class="form-control" id="sname" required onblur="validate(2)">
          </div>

          <div class="form-group col-sm-6 flex-column d-flex text-left">
            <label for="fname" class="form-label" style="align-self: flex-start; color: white;">First Name*</label>
            <input type="text" name="fname" class="form-control" id="fname" required onblur="validate(2)">
          </div>


          <div class="form-group col-sm-6 flex-column d-flex text-left">
            <label for="fname" class="form-label" style="align-self: flex-start; color: white;">Other Name*</label>
            <input type="text" name="oname" class="form-control" id="fname" required onblur="validate(2)">
          </div>

          <div class="form-group col-sm-6 flex-column d-flex col-md-6 text-left">
            <label for="email" class="form-label" style="align-self: flex-start; color: white;">Email</label>
            <input type="email" name="email" class="form-control" id="email" required onblur="validate(3)">
          </div>

          <div class="form-group col-sm-6 flex-column d-flex col-md-6 text-left">
            <label for="email" class="form-label" style="align-self: flex-start; color: white;">Phone Number</label>
            <input type="number" name="phone" class="form-control" id="email" required onblur="validate(3)">
          </div>

           <div class="form-group col-sm-6 flex-column d-flex col-md-6 text-left">
            <label for="email" class="form-label" style="align-self: flex-start; color: white;">State*</label>
            <input type="text" name="state" class="form-control" id="email" required onblur="validate(3)">
          </div>

           <div class="form-group col-sm-6 flex-column d-flex col-md-6 text-left">
            <label for="email" class="form-label" style="align-self: flex-start; color: white;">Address*</label>
            <input type="text" name="address" class="form-control" id="email" required onblur="validate(3)">
          </div>
          
          <div class="form-group col-sm-6 flex-column d-flex col-md-6 text-left">
            <label for="marital_status" class="form-label" style="align-self: flex-start; color: white;">Gender*</label>
            <select id="gender" name="gender" class="form-select" required>
              <option value="" disabled selected>Select Gender</option>
              <option>Male</option>
              <option>Female</option>
            </select>
          </div>

          <div class="form-group col-sm-6 flex-column d-flex col-md-6 text-left">
            <label for="street_add" class="form-label" style="align-self: flex-start; color: white;">Date Of Birth*</label>
            <input type="date" name="dob" class="form-control" id="street_add" required onblur="validate(4)">
          </div>
          
          <hr style="border: 1px solid white; margin-top: 2%;">

          <div class="form-group col-sm-12 flex-column d-flex text-left">
            <label for="unit" class="form-label" style="align-self: flex-start; color: white;">Spcialties*</label>
            <input type="text" name="special" class="form-control" id="unit" required onblur="validate(2)">
          </div>
        

         <div class="form-group col-sm-12 flex-column d-flex text-left">
            <label for="unit" class="form-label" style="align-self: flex-start; color: white;">Qualification*</label>
            <input type="text" name="qua" class="form-control" id="unit" required onblur="validate(2)">
          </div>
           <div class="form-group col-sm-12 flex-column d-flex text-left">
            <label for="unit" class="form-label" style="align-self: flex-start; color: white;">Password*</label>
            <input type="password" name="pass_word" class="form-control" id="unit" required onblur="validate(2)">
          </div>
        </div>
        <br>
         <button class="btn btn-primary btn-lg" style="background-color: darkblue; border-color: darkblue;">
           Submit
         </button>
        </form>
      </form>
        </div>
      </div>
      </div>
    </div>

  </div>

  </div>
  <div class="app-right">
    <button class="close-right">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
    </button>
    <div class="profile-box">
      <div class="profile-photo-wrapper">
        <img src="https://th.bing.com/th/id/OIP.hCfHyL8u8XAbreXuaiTMQgHaHZ?rs=1&pid=ImgDetMain" alt="profile">
      </div>
      <p class="profile-text">Adeyemi Joshua</p>
       <p class="profile-subtext">Software Engineer</p>
    </div>
    <div class="app-right-content">
      <div class="app-right-section">
      <div class="app-right-section-header">
        <h2>Notifications</h2>
        <span class="notification-active">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        </span>
      </div>
      <div class="message-line">
        <img src="https://images.unsplash.com/photo-1562159278-1253a58da141?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MzB8fHBvcnRyYWl0JTIwbWFufGVufDB8MHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="profile">
        <div class="message-text-wrapper">
          <p class="message-text">Eric Clampton</p>
          <p class="message-subtext">Have you planned any deadline for this?</p>
        </div>
      </div>
     
    </div>
    <div class="app-right-section">
      <div class="app-right-section-header">
        <h2>Recent Records</h2>
        <span class="notification-active">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
        </span>
      </div>
      <div class="activity-line">
        <span class="activity-icon draft">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-minus"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="9" y1="15" x2="15" y2="15"/></svg>
        </span>
        <div class="activity-text-wrapper">
          <p class="activity-text">You have drafted a job post for <strong>HR Specialist</strong></p>
          <a href="#" class="activity-link">Complete Now</a>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>