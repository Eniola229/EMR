<?php
class RegisterContr extends Register
{
    private $sname;
    private $fname;
    private $mname;
    private $email;
    private $phone;
    private $title;
    private $dob;
    private $gender;
    private $marital_status;
    private $lga;
    private $state;
    private $chronic_pc;
    private $dname;
    private $demail;
    private $did;

    public function __construct(
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
        $did
    ) {
        $this->sname = $sname;
        $this->fname = $fname;
        $this->mname = $mname;
        $this->email = $email;
        $this->phone = $phone;
        $this->title = $title;
        $this->dob = $dob;
        $this->gender = $gender;
        $this->marital_status = $marital_status;
        $this->lga = $lga;
        $this->state = $state;
        $this->chronic_pc = $chronic_pc;
        $this->dname = $dname;
        $this->demail = $demail;
        $this->did = $did;
    }

    public function registerUser(
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
        $did
    ) {
        // Assign the parameters to the properties
        $this->sname = $sname;
        $this->fname = $fname;
        $this->mname = $mname;
        $this->email = $email;
        $this->phone = $phone;
        $this->title = $title;
        $this->dob = $dob;
        $this->gender = $gender;
        $this->marital_status = $marital_status;
        $this->lga = $lga;
        $this->state = $state;
        $this->chronic_pc = $chronic_pc;
        $this->dname = $dname;
        $this->demail = $demail;
        $this->did = $did;

        if ($this->emptyInput() == false) {
             header('Location: ../appointment.php?status=emptyInput&id=' . $this->did);
            exit();
        }
        if ($this->invalidEmail() == false) {
            header('Location: ../appointment.php?status=invalidEmail&id=' . $this->did);
            exit();
        }

        // If all checks pass, proceed with user registration
        $this->setUser(
            $this->sname,
            $this->fname,
            $this->mname,
            $this->email,
            $this->phone,
            $this->title,
            $this->dob,
            $this->gender,
            $this->marital_status,
            $this->lga,
            $this->state,
            $this->chronic_pc,
            $this->dname,
            $this->demail,
            $this->did
        );

        // Send confirmation email
        $this->sendEmail($this->email, $this->did);
    }

    private function emptyInput() {
        // Check for empty inputs
        return !empty($this->fname) && !empty($this->sname) && !empty($this->mname) && !empty($this->email) && !empty($this->phone) && !empty($this->title) && !empty($this->dob) && !empty($this->gender) && !empty($this->marital_status) && !empty($this->lga) && !empty($this->state) && !empty($this->chronic_pc);
    }

    private function invalidEmail() {
        // Validate email format
        return filter_var($this->email, FILTER_VALIDATE_EMAIL) !== false;
    }

    // private function idTakenCheck()
    // {
    //     // Check if username or email is already taken
    //     return $this->checkUser($this->email);
    // }
}
?>
