<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
  
class Register extends Dbh
{
    protected function sendEmail($email, $did)
    {
        // Load Composer's autoloader
        require '../vendor/autoload.php';

        $mail = new PHPMailer(true);
        
            try {
               
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'rhcwebmailer@gmail.com';
                $mail->Password   = 'yrkddeezyduwkodd';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;
        
                $mail->setFrom('rhcwebmailer@gmail.com', 'RHC HEALTH MANAGEMENT');
                $mail->addAddress($email);
        
                $mail->isHTML(true);
                $mail->Subject = 'RHC HEALTH MANAGEMENT Doctors Appointment';
                $email_template  = "<strong>Your Complain has been sent!</strong><br/><p>"
                                 . "<p>We will contact you very soon!</p>"
                                 . "<br/><b>RHC HEALTH TEAM</b>";
                $mail->Body = $email_template;

            // Attempt to send the email
            if ($mail->send()) {
               header("Location: ../success.php?status=success");
                exit(); 
            } else {
                header('Location: ../appointment.php?status=sentemailfailed&id=' . $did);
                exit();
            }
        } catch (Exception $e) {
             header('Location: ../appointment.php?status=sentemailfailed&id=' . $did);
            exit();
        }
        
    }

    protected function setUser($sname, $fname, $mname, $email, $phone, $title, $dob, $gender, $marital_status, $lga, $state, $chronic_pc, $dname, $demail, $did)
    {
       // Prepare the SQL statement
        $stmt = $this->connect()->prepare('INSERT INTO hmo_registrations (sname, fname, mname, email, phone, title, dob, gender, marital_status, lga, state, chronic_pc, dname, demail, did) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);');

        // Bind the parameters and execute the statement
        if (!$stmt->execute(array($sname, $fname, $mname, $email, $phone, $title, $dob, $gender, $marital_status, $lga, $state, $chronic_pc, $dname, $demail, $did))) {
            $stmt = null;
            header('Location: ../appointment.php?status=stmtfailed&id=' . $did);
            exit();
        }
    }


    // protected function checkUser($email)
    // {
    //     $stmt = $this->connect()->prepare('SELECT user_id FROM hmo_registrations WHERE email = ?');

    //     if (!$stmt->execute(array($email))) 
    //     {
    //         $stmt = null;
    //         header("location: ../appointment.php?status=usertaken");
    //         exit();
    //     }

    //     $resultCheck = $stmt->rowCount() > 0 ? false : true;
    //     return $resultCheck;
    // }

    // protected function getUserId($email)
    // {
    //     $stmt = $this->connect()->prepare('SELECT user_id FROM hmo_registrations WHERE email = ?;');

    //     $stmt->execute([$email]); // Execute the prepared statement

    //     if ($stmt->rowCount() == 0) {
    //         // If no user is found, redirect with an appropriate status
    //         header("location: ../appointment.php?status=stmtfailed");
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

    public function registerUser($sname, $fname, $mname, $email, $phone, $title, $dob, $gender, $marital_status, $lga, $state, $chronic_pc,  $dname, $demail, $did)
    {
        // Check if user already exists
        // if (!$this->checkUser($email)) {
        //     header("Location: ../appointment.php?status=usertaken");
        //     exit();
        // }

        // Insert user into database
        $this->setUser($sname, $fname, $mname, $email, $phone, $title, $dob, $gender, $marital_status, $lga, $state, $chronic_pc, $dname, $demail, $did);

        // // Create session for the user
        // $this->createSession($email);
    }
}



