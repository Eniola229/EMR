<?php
session_start();
include "../classes/dbh.classes.php";
include "../classes/appointment.classes.php";
include "../classes/appointment-contr.classes.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate and sanitize input data
    $sname = isset($_POST['sname']) ? htmlspecialchars($_POST['sname']) : "";
    $fname = isset($_POST['fname']) ? htmlspecialchars($_POST['fname']) : "";
    $mname = isset($_POST['mname']) ? htmlspecialchars($_POST['mname']) : "";
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : "";
    $title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : "";
    $dob = isset($_POST['dob']) ? htmlspecialchars($_POST['dob']) : "";
    $gender = isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : "";
    $marital_status = isset($_POST['marital_status']) ? htmlspecialchars($_POST['marital_status']) : "";
    $lga = isset($_POST['lga']) ? htmlspecialchars($_POST['lga']) : "";
    $state = isset($_POST['state']) ? htmlspecialchars($_POST['state']) : "";
    $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : "";
    $chronic_pc = isset($_POST['chronic_pc']) ? htmlspecialchars($_POST['chronic_pc']) : "";
    $dname = isset($_POST['dname']) ? htmlspecialchars($_POST['dname']) : "";
    $demail = isset($_POST['demail']) ? htmlspecialchars($_POST['demail']) : "";
    $did = isset($_POST['did']) ? htmlspecialchars($_POST['did']) : "";


    


    // Instantiate RegisterContr class
    $register = new RegisterContr(
        $sname,
        $fname,
        $mname,
        $email,
        $phone,
        $title,
        $dob,
        $gender,
        $marital_status,
        $lga,
        $state,
        $chronic_pc,
        $dname,
        $demail,
        $did,
    );

    // Call the RegisterUser method with the required arguments
    if ($register->registerUser(
        $sname,
        $fname,
        $mname,   
        $email,
        $phone,
        $title,
        $dob,
        $gender,
        $marital_status,
        $lga,
        $state,
        $chronic_pc,
        $dname,
        $demail,
        $did,
    )) {


        $_SESSION['email'] = $email;
        $_SESSION['user_id'] = $user_id;


        // Registration successful
        header("Location: ../success.php?status=success");
        exit(); 
    }
}