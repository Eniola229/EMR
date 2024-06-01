<?php
session_start();
include "../classes/dbh.classes.php";
include "../classes/ecounter.classes.php";
include "../classes/ecounter-contr.classes.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate and sanitize input data
    $sname = isset($_POST['sname']) ? htmlspecialchars($_POST['sname']) : "";
    $fname = isset($_POST['fname']) ? htmlspecialchars($_POST['fname']) : "";
    $oname = isset($_POST['oname']) ? htmlspecialchars($_POST['oname']) : "";
    $gender = isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : "";
    $age = isset($_POST['age']) ? htmlspecialchars($_POST['age']) : "";
    $unit = isset($_POST['unit']) ? htmlspecialchars($_POST['unit']) : "";
    $ward = isset($_POST['ward']) ? htmlspecialchars($_POST['ward']) : "";
    $consultant = isset($_POST['consultant']) ? htmlspecialchars($_POST['consultant']) : "";
    $medical_officer = isset($_POST['medical_officer']) ? htmlspecialchars($_POST['medical_officer']) : "";
    $presenting_complaint = isset($_POST['presenting_complaint']) ? htmlspecialchars($_POST['presenting_complaint']) : "";
    $physical_examination = isset($_POST['physical_examination']) ? htmlspecialchars($_POST['physical_examination']) : "";
    $clinic_diagnosis = isset($_POST['clinic_diagnosis']) ? htmlspecialchars($_POST['clinic_diagnosis']) : "";
    $history_presenting_complaint = isset($_POST['history_presenting_complaint']) ? htmlspecialchars($_POST['history_presenting_complaint']) : "";
    $plan = isset($_POST['plan']) ? htmlspecialchars($_POST['plan']) : "";
    $patientid = isset($_POST['patientid']) ? htmlspecialchars($_POST['patientid']) : "";


    


    // Instantiate RegisterContr class
    $register = new RegisterContr(
        $sname,
        $fname,
        $oname,
        $gender,
        $age,
        $unit,
        $ward,
        $consultant,
        $medical_officer,
        $presenting_complaint,
        $physical_examination,
        $clinic_diagnosis,
        $history_presenting_complaint,
        $plan,
        $patientid,
    );

    // Call the RegisterUser method with the required arguments
    if ($register->registerUser(
        $sname,
        $fname,
        $oname,   
        $gender,
        $age,
        $unit,
        $ward,
        $consultant,
        $medical_officer,
        $presenting_complaint,
        $physical_examination,
        $clinic_diagnosis,
        $history_presenting_complaint,
        $plan,
        $patientid,
    )) {


        $_SESSION['email'] = $email;
        $_SESSION['user_id'] = $user_id;


        // Registration successful
        header("Location: ../success.php?status=success");
        exit(); 
    }
}