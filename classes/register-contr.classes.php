<?php
class RegisterContr extends Register
{
    private $doctor_img_path;
    private $sname;
    private $fname;
    private $oname;
    private $email;
    private $phone;
    private $address;
    private $state;
    private $gender;
    private $dob;
    private $special;
    private $qua;
    private $pass_word;

    public function __construct(
        $doctor_img_path, $sname, $fname, $oname, $email, $phone, $address, $state, $gender, $dob, $special, $qua, $pass_word
    ) {
        $this->doctor_img_path = $doctor_img_path;
        $this->sname = $sname;
        $this->fname = $fname;
        $this->oname = $oname;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->state = $state;
        $this->gender = $gender;
        $this->dob = $dob;
        $this->special = $special;
        $this->qua = $qua;
        $this->pass_word = $pass_word;
    }

    public function registerUser() {
        if (!$this->emptyInput()) {
            header('location: ../adddoc.php?status=emptyInput');
            exit();
        }
        if (!$this->invalidEmail()) {
            header('location: ../adddoc.php?status=invalidEmail');
            exit();
        }
        if (!$this->idTakenCheck()) {
            header('location: ../adddoc.php?status=useroremailtaken');
            exit();
        }

        // If all checks pass, proceed with user registration
        $this->setUser(
            $this->doctor_img_path,
            $this->sname,
            $this->fname,
            $this->oname,
            $this->email,
            $this->phone,
            $this->address,
            $this->state,
            $this->gender,
            $this->dob,
            $this->special,
            $this->qua,
            $this->pass_word
        );

        // Send confirmation email
        $this->sendEmail( $this->$fname, $this->email);
    }

    private function emptyInput() {
        // Check for empty inputs
        return !(
            empty($this->sname) ||
            empty($this->fname) ||
            empty($this->oname) ||
            empty($this->email) ||
            empty($this->phone) ||
            empty($this->address) ||
            empty($this->state) ||
            empty($this->gender) ||
            empty($this->dob) ||
            empty($this->special) ||
            empty($this->qua) ||
            empty($this->pass_word)
            
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
