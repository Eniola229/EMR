<?php
class RegisterContr extends Register
{
    private $user_id;
    private $sname;
    private $fname;
    private $email;
    private $phone;
    private $state;
    private $lga;
    private $gender;
    private $dob;
    private $date;
    private $ward;
    private $msg;
    private $patientid;
    private $pass_word;

    public function __construct($user_id, $sname, $fname, $email, $phone, $state, $gender, $lga, $dob, $date, $ward, $msg, $patientid, $pass_word
    ) {
        $this->user_id = $user_id;
        $this->sname = $sname;
        $this->fname = $fname;
        $this->email = $email;
        $this->phone = $phone;
        $this->state = $state;
        $this->lga = $lga;
        $this->gender = $gender;
        $this->dob = $dob;
        $this->date = $date;
        $this->ward = $ward;
        $this->msg = $msg;
        $this->patientid = $patientid;
        $this->pass_word = $pass_word;
    }

    public function registerUser() {
           if (!$this->emptyInput()) {
            header('Location: ../view_complains.php?status=emptyInput&id=' . urlencode($this->user_id));
            exit();
        }
        if (!$this->invalidEmail()) {
            header('Location: ../view_complains.php?status=invalidEmail&id=' . urlencode($this->user_id));
            exit();
        }
        if (!$this->idTakenCheck()) {
            header('Location: ../view_complains.php?status=useroremailtaken&id=' . urlencode($this->user_id));
            exit();
        }
        // If all checks pass, proceed with user registration
        $this->setUser(
            $this->user_id,
            $this->sname,
            $this->fname,
            $this->email,
            $this->phone,
            $this->state,
            $this->lga,
            $this->gender,
            $this->dob,
            $this->date,
            $this->ward,
            $this->msg,
            $this->patientid,
            $this->pass_word
        );

        // Send confirmation email
        $this->sendEmail( $this->$fname, $this->email, $this->date, $this->ward, $this->msg, $this->pass_word);
    }

    private function emptyInput() {
        // Check for empty inputs
        return !(
            empty($this->sname) ||
            empty($this->fname) ||
            empty($this->email) ||
            empty($this->phone) ||
            empty($this->state) ||
            empty($this->gender) ||
            empty($this->ward) ||
            empty($this->msg) ||
            empty($this->date) 
            
            
        );
    }

    private function invalidEmail() {
        // Validate email format
        return filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    private function idTakenCheck() {
        // Check if username or email is already taken
        return $this->checkUser($this->email);
    }
}
