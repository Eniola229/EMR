<?php
session_start();
include "../classes/dbh.classes.php";
include "../classes/register.classes.php";
include "../classes/register-contr.classes.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate and sanitize input data
    $doctor_img_path = isset($_POST['doctor_img_path']) ? htmlspecialchars($_POST['doctor_img_path']) : "";
    $sname = isset($_POST['sname']) ? htmlspecialchars($_POST['sname']) : "";
    $fname = isset($_POST['fname']) ? htmlspecialchars($_POST['fname']) : "";
    $oname = isset($_POST['oname']) ? htmlspecialchars($_POST['oname']) : "";
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : "";
    $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : "";
    $address = isset($_POST['address']) ? htmlspecialchars($_POST['address']) : "";
    $state = isset($_POST['state']) ? htmlspecialchars($_POST['state']) : "";
    $gender = isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : "";
    $dob = isset($_POST['dob']) ? htmlspecialchars($_POST['dob']) : "";
    $special = isset($_POST['special']) ? htmlspecialchars($_POST['special']) : "";
    $qua = isset($_POST['qua']) ? htmlspecialchars($_POST['qua']) : "";
    $pass_word = isset($_POST['pass_word']) ? htmlspecialchars($_POST['pass_word']) : "";
    
    


    // Instantiate RegisterContr class
    $register = new RegisterContr(
        $doctor_img_path, $sname, $fname, $oname, $email, $phone, $address, $state, $gender, $dob, $special, $qua, $pass_word
       
    );

    // Call the RegisterUser method with the required arguments
    if ($register->registerUser(
        $doctor_img_path, $sname, $fname, $oname, $email, $phone, $address, $state, $gender, $dob, $special, $qua, $pass_word
        )) {
        // Registration successful
        header("Location: ../adddoc.php?status=sucess");
        exit(); 
    }
} else {
    header("location: ../adddoc.php?status=invalidAttempit");
    exit;
}