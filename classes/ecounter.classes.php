<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
  
class Register extends Dbh
{
   
    protected function setUser($sname, $fname, $oname, $gender, $age, $unit, $ward, $consultant, $medical_officer, $presenting_complaint, $physical_examination, $clinic_diagnosis, $history_presenting_complaint, $plan, $patientid)
    {
       // Prepare the SQL statement
        $stmt = $this->connect()->prepare('INSERT INTO ecounter (sname, fname, oname, gender, age, unit, ward, consultant, medical_officer, presenting_complaint, physical_examination, clinic_diagnosis, history_presenting_complaint, plan, patientid) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);');

        // Bind the parameters and execute the statement
        if (!$stmt->execute(array($sname, $fname, $oname, $gender, $age, $unit, $ward, $consultant, $medical_officer, $presenting_complaint, $physical_examination, $clinic_diagnosis, $history_presenting_complaint, $plan, $patientid))) {
            $stmt = null;
            header('Location: ../ecounter_p.php?status=stmtfailed&id=' . $patientid);
            exit();
        } else {
            header('Location: ../ecounter_p.php?status=success&patientid=' . $patientid);
            exit();
        }
    }


    // protected function checkUser($email)
    // {
    //     $stmt = $this->connect()->prepare('SELECT user_id FROM ecounter WHERE email = ?');

    //     if (!$stmt->execute(array($email))) 
    //     {
    //         $stmt = null;
    //         header("location: ../ecounter_p.php?status=usertaken");
    //         exit();
    //     }

    //     $resultCheck = $stmt->rowCount() > 0 ? false : true;
    //     return $resultCheck;
    // }

    // protected function getUserId($email)
    // {
    //     $stmt = $this->connect()->prepare('SELECT user_id FROM ecounter WHERE email = ?;');

    //     $stmt->execute([$email]); // Execute the prepared statement

    //     if ($stmt->rowCount() == 0) {
    //         // If no user is found, redirect with an appropriate status
    //         header("location: ../ecounter_p.php?status=stmtfailed");
    //         exit();
    //     }

    //     $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    //     return $userData['email'];
    // }

    // protected function createSession($email)
    // {
    //     // Start session
    //     session_start();

    //     $user_id = $this->getUserId($email);
        
    //     // Set session variables
    //     $_SESSION['email'] = $email;
    //     $_SESSION['user_id'] = $user_id;

        

    //     // Redirect to logged-in area
    //     header("Location: ../add_dep.php");
    //     exit();
    // }

    public function registerUser($sname, $fname, $oname, $gender, $age, $unit, $ward, $consultant, $medical_officer, $presenting_complaint, $physical_examination, $clinic_diagnosis, $history_presenting_complaint, $plan, $patientid)
    {
        // Check if user already exists
        // if (!$this->checkUser($email)) {
        //     header("Location: ../ecounter_p.php?status=usertaken");
        //     exit();
        // }

        // Insert user into database
        $this->setUser($sname, $fname, $oname, $gender, $age, $unit, $ward, $consultant, $medical_officer, $presenting_complaint, $clinic_diagnosis, $history_presenting_complaint, $plan, $patientid);

        // // Create session for the user
        // $this->createSession($email);
    }
}



