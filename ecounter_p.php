<?php  
  session_start();
    
      if ($_SESSION['role'] == "" || $_SESSION['role'] == "0") {
            header("Location: ../index.php?status=invalid_attempt");
            exit;  
      } 
    include 'classes/view_ecounter_one.classes.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ecounter Note</title>
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<script type="text/javascript" src="js/home.js"></script>
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style type="text/css">
   body {
      color: white;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
    }
    .record-container {
      background-color: #333;
      padding: 20px;
      border-radius: 10px;
      width: 100%;
        margin-bottom: 20px;
    }
    .record-header {
      margin-bottom: 20px;
    }
    .record-header h2 {
      margin-bottom: 10px;
      border-bottom: 2px solid white;
      padding-bottom: 5px;
    }
    .record-section {
      display: flex;
      flex-wrap: wrap;
      margin-bottom: 20px;
    }
    .record-section h3 {
      width: 100%;
      margin-bottom: 10px;
      border-bottom: 1px solid white;
      padding-bottom: 5px;
    }
    .record-item {
      width: 50%;
      padding: 10px;
      box-sizing: border-box;
    }
    .record-label {
      font-weight: bold;
    }
    .full-width {
      width: 100%;
    }
</style>
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
      <li class="nav-list-item">
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
        <a class="nav-list-link" href="allpatients.php">
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
        <li class="nav-list-item active">
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
  <div class="app-main">
    <div class="main-header-line">
      <h1 style="color: black;">Patient Ecounter Note!</h1>
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
            <h2>Add New Records</h2>
            <span>Kindly fill all details correctly</span>
          </div>
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
                case 'success':
                     echo '<p style="color:white; text-align:center; font-weight: bold;" >Record Uploaded Successfully</p>';
                    break;
                default:
                    // Log unrecognized error codes for debugging
                    error_log("Unrecognized error code: $errorCode");
                    echo '<p style="color: red; text-align: center;">An unexpected error occurred! Please try again later.</p>';
                    break;
            }
        } else {
            echo '<p style="color: red; text-align: center; font-weight: bold;">Kindly fill in all details correctly!</p>';
        }
        ?>
          <form action="includes/ecounter.inc.php" method="POST">
        <div class="row justify-content-between text-left">

          <div class="form-group col-sm-6 flex-column d-flex text-left">
            <label for="patientid" class="form-label" style="align-self: flex-start; color: white;">Patient ID*</label>
            <input type="text" name="patientid" value="<?php echo htmlspecialchars($patient['patientid']); ?>" class="form-control" id="patientid"  required onblur="validate(2)">
          </div>

          <div class="form-group col-sm-6 d-flex flex-column">
            <label for="sname" class="form-label" style="align-self: flex-start; color: white;">Surname*</label>
            <input 
              type="text" 
              name="sname" 
              class="form-control" 
              id="sname" 
              required 
              aria-required="true"
              aria-describedby="snameHelp"
              value="<?php echo htmlspecialchars($patient['sname']); ?>"
            >
          </div>

          <div class="form-group col-sm-6 flex-column d-flex text-left">
            <label for="fname" class="form-label" style="align-self: flex-start; color: white;">Frist Name*</label>
            <input type="text" name="fname" class="form-control" value="<?php echo htmlspecialchars($patient['fname']); ?>" id="fname" required onblur="validate(2)">
          </div>

          <div class="form-group col-sm-6 flex-column d-flex col-md-6 text-left">
            <label for="email" class="form-label" style="align-self: flex-start; color: white;">Other Names*</label>
            <input type="text" name="oname" class="form-control" id="oname" value="<?php echo htmlspecialchars($patient['fname']); ?>" required onblur="validate(3)">
          </div>
          
          <div class="form-group col-sm-6 flex-column d-flex col-md-6 text-left">
            <label for="gender" class="form-label" style="align-self: flex-start; color: white;">Gender*</label>
            <select id="gender" name="gender" value="<?php echo htmlspecialchars($patient['gender']); ?>" class="form-select" required>
              <option value="" disabled selected>Select your Gender</option>
              <option>Male</option>
              <option>Female</option>
            </select>
          </div>

          <div class="form-group col-sm-6 flex-column d-flex col-md-6 text-left">
            <label for="age" class="form-label" style="align-self: flex-start; color: white;">Full Age*</label>
            <input type="text" name="age" class="form-control" id="age" required onblur="validate(4)" value="<?php echo htmlspecialchars($patient['dob']); ?>">
          </div>
          
          <hr style="border: 1px solid white; margin-top: 2%;">

          <div class="form-group col-sm-6 flex-column d-flex text-left">
            <label for="unit" class="form-label" style="align-self: flex-start; color: white;">Unit*</label>
            <input type="text" name="unit" class="form-control" id="unit" required onblur="validate(2)">
          </div>

          <div class="form-group col-sm-6 flex-column d-flex text-left">
            <label for="ward" class="form-label" style="align-self: flex-start; color: white;">Ward*</label>
            <input type="text" name="ward" class="form-control" id="ward" required onblur="validate(2)">
          </div>

          <div class="form-group col-sm-6 flex-column d-flex text-left">
            <label for="consultant" class="form-label" style="align-self: flex-start; color: white;">Consultant*</label>
            <input type="text" name="consultant" class="form-control" id="consultant" required onblur="validate(2)">
          </div>

          <div class="form-group col-sm-6 flex-column d-flex text-left">
            <label for="medical_officer" class="form-label" style="align-self: flex-start; color: white;">Medical Officer*</label>
            <input type="text" name="medical_officer" class="form-control" id="medical_officer" required onblur="validate(2)">
          </div>
          
          <hr style="border: 1px solid white; margin-top: 2%;">

          <div class="form-group col-sm-6 flex-column d-flex col-md-12 text-left">
            <label for="presenting_complaint" class="form-label" style="align-self: flex-start; color: white;">Presenting Complaint*</label>
            <textarea class="form-control" name="presenting_complaint" id="presenting_complaint" aria-label="With textarea" required onblur="validate(6)" rows="10"></textarea>
          </div>

          <div class="form-group col-sm-6 flex-column d-flex col-md-12 text-left">
            <label for="physical_examination" class="form-label" style="align-self: flex-start; color: white;">Physical Examination</label>
            <textarea class="form-control" name="physical_examination" id="physical_examination" aria-label="With textarea" required onblur="validate(6)" rows="7"></textarea>
          </div>
          
          <div class="form-group col-sm-6 flex-column d-flex col-md-12 text-left">
            <label for="clinic_diagnosis" class="form-label" style="align-self: flex-start; color: white;">Clinic Diagnosis (ICD Tool)</label>
            <textarea class="form-control" name="clinic_diagnosis" id="clinic_diagnosis" aria-label="With textarea" required onblur="validate(6)" rows="5"></textarea>
          </div>

          <div class="form-group col-sm-6 flex-column d-flex col-md-12 text-left">
            <label for="history_presenting_complaint" class="form-label" style="align-self: flex-start; color: white;">History of Presenting Complaint*</label>
            <textarea class="form-control" name="history_presenting_complaint" id="history_presenting_complaint" aria-label="With textarea" required onblur="validate(6)" rows="12"></textarea>
          </div>

          <div class="form-group col-sm-6 flex-column d-flex col-md-12 text-left">
            <label for="plan" class="form-label" style="align-self: flex-start; color: white;">Plan</label>
            <textarea class="form-control" name="plan" id="plan" aria-label="With textarea" required onblur="validate(6)" rows="12"></textarea>
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
<div class="record-container">

   <?php foreach ($ecounters as $ecounter): ?>
  <div class="record-section">

    <h3>Patient Information</h3>
    
    <div class="record-item">
      <span class="record-label">Patient ID:</span>
      <span id="patientid"><?php echo htmlspecialchars($ecounter['patientid']); ?></span>
    </div>
    <div class="record-item">
      <span class="record-label">Surname:</span>
      <span id="sname"><?php echo htmlspecialchars($ecounter['sname']); ?></span>
    </div>
    <div class="record-item">
      <span class="record-label">First Name:</span>
      <span id="fname"><?php echo htmlspecialchars($ecounter['fname']); ?></span>
    </div>
    <div class="record-item">
      <span class="record-label">Other Names:</span>
      <span id="oname"><?php echo htmlspecialchars($ecounter['oname']); ?></span>
    </div>
    <div class="record-item">
      <span class="record-label">Gender:</span>
      <span id="gender"><?php echo htmlspecialchars($ecounter['gender']); ?></span>
    </div>
    <div class="record-item">
      <span class="record-label">Full Age:</span>
      <span id="age"><?php echo htmlspecialchars($ecounter['age']); ?></span>
    </div>
  </div>

  <div class="record-section">
    <h3>Hospital Information</h3>
    <div class="record-item">
      <span class="record-label">Unit:</span>
      <span id="unit"><?php echo htmlspecialchars($ecounter['unit']); ?></span>
    </div>
    <div class="record-item">
      <span class="record-label">Ward:</span>
      <span id="ward"><?php echo htmlspecialchars($ecounter['ward']); ?></span>
    </div>
    <div class="record-item">
      <span class="record-label">Consultant:</span>
      <span id="consultant"><?php echo htmlspecialchars($ecounter['consultant']); ?></span>
    </div>
    <div class="record-item">
      <span class="record-label">Medical Officer:</span>
      <span id="medical_officer"><?php echo htmlspecialchars($ecounter['medical_officer']); ?></span>
    </div>
  </div>

  <div class="record-section">
    <h3>Medical Details</h3>
    <div class="record-item full-width">
      <span class="record-label">Presenting Complaint:</span>
      <div id="presenting_complaint"><?php echo htmlspecialchars($ecounter['presenting_complaint']); ?></div>
    </div>
    <div class="record-item full-width">
      <span class="record-label">Physical Examination:</span>
      <div id="physical_examination"><?php echo htmlspecialchars($ecounter['physical_examination']); ?></div>
    </div>
    <div class="record-item full-width">
      <span class="record-label">Clinic Diagnosis (ICD Tool):</span>
      <div id="clinic_diagnosis"><?php echo htmlspecialchars($ecounter['clinic_diagnosis']); ?></div>
    </div>
    <div class="record-item full-width">
      <span class="record-label">History of Presenting Complaint:</span>
      <div id="history_presenting_complaint"><?php echo htmlspecialchars($ecounter['history_presenting_complaint']); ?></div>
    </div>
    <div class="record-item full-width">
      <span class="record-label">Plan: </span><?php echo htmlspecialchars($ecounter['plan']); ?></div>
    </div>
    <hr>
         <?php endforeach; ?>
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
        <img src="doctors_images/<?php echo $_SESSION['doctor_img_path']?>" alt="profile">
      </div>
      <p class="profile-text"><?php echo $_SESSION['fname'] ." " . $_SESSION['sname'] ?></p>
       <p class="profile-subtext"><?php echo $_SESSION['qua'] ?></p>
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