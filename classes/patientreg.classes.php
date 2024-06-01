<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Register extends Dbh
{
    protected function sendEmail($fname, $email, $date, $ward, $msg, $pass_word)
    {
        // Load Composer's autoloader
        require '../vendor/autoload.php';

        try {
            $mail = new PHPMailer(true);
            $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
            $mail->isSMTP(); // Send using SMTP
            $mail->Host       = 'smtp.gmail.com'; // Set the SMTP server to send through
            $mail->SMTPAuth   = true; // Enable SMTP authentication
            $mail->Username   = 'rhcwebmailer@gmail.com'; // SMTP username
            $mail->Password   = 'yrkddeezyduwkodd'; // App-specific password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable implicit TLS encryption
            $mail->Port       = 465; // TCP port to connect to

            //Recipients
            $mail->setFrom('rhcwebmailer@gmail.com', 'RCCG Health Centre'); // Fixed sender name
            $mail->addAddress($email);

            //Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Your Login Cridentials to see the Doctors';
            $email_template  = "<strong>Good Day ". $fname ."!</strong><br/>"
                             . "<p>". $msg ."</p>"
                             . "<p>Ward: ". $ward ."</p>"
                             . "<p>Date of Appointment: ". $date ."</p>"
                             . "<a href='https://www.rhc.org/doclogin/'>Click here to Login</a>"
                             . "<br/><b>RHC Team</b>";
            $mail->Body = $email_template;

            // Attempt to send the email
            if ($mail->send()) {
                header("location: ../allpatients.php?status=emailsent");
                exit(); // Added exit after header redirect
            } else {
                header("location: ../view_complains.php?status=sentemailfailed&error=" . urlencode($this->user_id));
                exit(); // Added exit after header redirect
            }
        } catch (Exception $e) {
            header("location: ../view_complains.php?status=sentemailfailed&error=" . urlencode($this->user_id));
            exit(); // Added exit after header redirect
        }
    }

   protected function setUser($user_id, $sname, $fname, $email, $phone, $state, $gender, $lga, $dob, $date, $ward, $msg, $patientid, $pass_word)
{
    // Hash the password
    $hashedPwd = password_hash($pass_word, PASSWORD_DEFAULT);

   // $uploadStatus = ""; // To store debug messages

    // Check if a file was uploaded
    // if (isset($_FILES['doctor_img_path']) && $_FILES['doctor_img_path']['size'] > 0) {
    //     $file_name = $_FILES['doctor_img_path']['name'];
    //     $file_tmp = $_FILES['doctor_img_path']['tmp_name'];
    //     $file_type = $_FILES['doctor_img_path']['type'];
    //     $file_size = $_FILES['doctor_img_path']['size']; // Get the file size

    //     // Array of allowed image file types
    //     $allowed_image_types = array('image/jpeg', 'image/png', 'image/gif');
    //     $max_file_size = 2 * 1024 * 1024; // 2MB in bytes

        // Check if the uploaded file type is allowed
    //     if (in_array($file_type, $allowed_image_types)) {
    //         // Resize the image if it exceeds the max file size
    //         if ($file_size > $max_file_size) {
    //             try {
    //                 $doctor_img_path = new Imagick($file_tmp);
    //                 $doctor_img_path->setImageCompressionQuality(80); // Adjust the quality 
    //                 $doctor_img_path->writeImage($file_tmp);
    //             } catch (ImagickException $e) {
    //                 header("location: ../view_complains.php?status=imageerror");
    //                 exit();
    //             }
    //         }

    //         // File is an image
    //         $uploadDirectory = '../doctors_images/';
    //         // Generate a unique name for the file
    //         $uniqueFileName = uniqid() . '_' . $file_name;
    //         // Move the uploaded file to the server
    //         $uploadPath = $uploadDirectory . $uniqueFileName;

    //         if (move_uploaded_file($file_tmp, $uploadPath)) {
    //             $uploadStatus = "File uploaded successfully.";
    //         } else {
    //             // Error in moving the file
    //             header("location: ../view_complains.php?status=fileuploaderror");
    //             exit();
    //         }
    //     } else {
    //         // File type is not allowed
    //         header("location: ../view_complains.php?status=invalidfiletype");
    //         exit();
    //     }
    // } else {
    //     // Handle the case where no file was uploaded
    //     $uniqueFileName = "no_file_uploaded";
    // }

    // Debug output for file upload status
    // echo "Debug: $uploadStatus";

    // Prepare the SQL statement
    $stmt = $this->connect()->prepare('INSERT INTO patients (user_id, sname, fname, email, phone, state, gender, lga, dob, date, ward, msg, patientid, pass_word) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);');

    // Bind the parameters and execute the statement
    if (!$stmt->execute(array($user_id, $sname, $fname, $email, $phone, $state, $gender, $lga, $dob, $date, $ward, $msg, $patientid, $hashedPwd))) {
        $stmt = null;
        header("location: ../view_complains.php?status=stmtfailed");
        exit();
    }
    $stmt = null;
}

    protected function checkUser($email)
    {
        $stmt = $this->connect()->prepare('SELECT id FROM patients WHERE email = ?');

        if (!$stmt->execute(array($email))) 
        {
            $stmt = null;
            header("location: ../view_complains.php?status=usertakenid=" . urlencode($this->user_id));
            exit();
        }

        $resultCheck = $stmt->rowCount() > 0 ? false : true;
        return $resultCheck;
    }

    protected function getUserId($email)
    {
        $stmt = $this->connect()->prepare('SELECT id FROM patients WHERE email = ?;');

        $stmt->execute([$email]); // Execute the prepared statement

        if ($stmt->rowCount() == 0) {
            // If no user is found, redirect with an appropriate status
            header("location: ../view_complains.php?status=stmtfailedid=" . urlencode($this->user_id));
            exit();
        }

        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        return $userData['email'];
    }
}
