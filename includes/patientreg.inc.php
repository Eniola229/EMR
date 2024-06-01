 <?php
session_start();
include "../classes/dbh.classes.php";
include "../classes/patientreg.classes.php";
include "../classes/patientreg-contr.classes.php";

function generateUniqueId() {
    $year = date('Y'); // Current year
     $randomNumber = mt_rand(1000, 9999); //random number
    $patientid = 'PAT' . "/". $year . "/" . $randomNumber; // Combine to form the unique ID
    return $patientid;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate and sanitize input data
    $user_id = isset($_POST['user_id']) ? htmlspecialchars($_POST['user_id']) : "";
    $sname = isset($_POST['sname']) ? htmlspecialchars($_POST['sname']) : "";
    $fname = isset($_POST['fname']) ? htmlspecialchars($_POST['fname']) : "";
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : "";
    $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : "";
    $state = isset($_POST['state']) ? htmlspecialchars($_POST['state']) : "";
    $gender = isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : "";
    $lga = isset($_POST['lga']) ? htmlspecialchars($_POST['lga']) : "";
    $dob = isset($_POST['dob']) ? htmlspecialchars($_POST['dob']) : "";
    $date = isset($_POST['date']) ? htmlspecialchars($_POST['date']) : "";
    $ward = isset($_POST['ward']) ? htmlspecialchars($_POST['ward']) : "";
    $msg = isset($_POST['msg']) ? htmlspecialchars($_POST['msg']) : "";


    $pass_word = isset($_POST['pass_word']) ? htmlspecialchars($_POST['pass_word']) : "";
    
    $patientid = generateUniqueId();


    // Instantiate RegisterContr class
    $register = new RegisterContr(
      $user_id, $sname, $fname, $email, $phone, $state, $gender, $lga, $dob, $date, $ward, $msg, $patientid, $pass_word
       
    );

    // Call the RegisterUser method with the required arguments
    if ($register->registerUser(
      $user_id, $sname, $fname, $email, $phone, $state, $gender, $lga, $dob, $date, $ward, $msg, $patientid, $pass_word
        )) {
        // Registration successful
        header("Location: ../allpatients.php?status=sucess&id=" .$user_id);
        exit(); 
    }
} else {
    header("location: ../view_complains.php?status=invalidAttempit&id=" .$user_id);
    exit;
}