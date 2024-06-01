<?php
class RegisterContr extends Register
{
    private $sname;
    private $fname;
    private $oname;
    private $gender;
    private $age;
    private $unit;
    private $ward;
    private $consultant;
    private $medical_officer;
    private $presenting_complaint;
    private $physical_examination;
    private $clinic_diagnosis;
    private $history_presenting_complaint;
    private $plan;
    private $patientid;

    public function __construct(
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
        $patientid
    ) {
        $this->sname = $sname;
        $this->fname = $fname;
        $this->oname = $oname;
        $this->gender = $gender;
        $this->age = $age;
        $this->unit = $unit;
        $this->ward = $ward;
        $this->consultant = $consultant;
        $this->medical_officer = $medical_officer;
        $this->presenting_complaint = $presenting_complaint;
        $this->physical_examination = $physical_examination;
        $this->clinic_diagnosis = $clinic_diagnosis;
        $this->history_presenting_complaint = $history_presenting_complaint;
        $this->plan = $plan;
        $this->patientid = $patientid;
    }

    public function registerUser(
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
        $patientid

    ) {
        // Assign the parameters to the properties
        $this->sname = $sname;
        $this->fname = $fname;
        $this->oname = $oname;
        $this->gender = $gender;
        $this->age = $age;
        $this->unit = $unit;
        $this->ward = $ward;
        $this->consultant = $consultant;
        $this->medical_officer = $medical_officer;
        $this->presenting_complaint = $presenting_complaint;
        $this->physical_examination = $physical_examination;
        $this->clinic_diagnosis = $clinic_diagnosis;
        $this->history_presenting_complaint = $history_presenting_complaint;
        $this->plan = $plan;
        $this->patientid = $patientid;

        if ($this->emptyInput() == false) {
             header('Location: ../ecounter_p.php?status=emptyInput&id=' . $this->patientid);
            exit();
        }
        // if ($this->invalidEmail() == false) {
        //     header('Location: ../ecounter_p.php?status=invalidEmail&id=' . $this->patientid);
        //     exit();
        // }

        // If all checks pass, proceed with user registration
        $this->setUser(
            $this->sname,
            $this->fname,
            $this->oname,
            $this->gender,
            $this->age,
            $this->unit,
            $this->ward,
            $this->consultant,
            $this->medical_officer,
            $this->presenting_complaint,
            $this->physical_examination,
            $this->clinic_diagnosis,
            $this->history_presenting_complaint,
            $this->plan,
            $this->patientid
        );

        // Send confirmation email
        $this->sendEmail($this->email, $this->did);
    }

    private function emptyInput() {
        // Check for empty inputs
        return !empty($this->fname) && !empty($this->sname) && !empty($this->oname) && !empty($this->gender) && !empty($this->age) && !empty($this->unit) && !empty($this->ward) && !empty($this->consultant) && !empty($this->medical_officer) && !empty($this->presenting_complaint) && !empty($this->physical_examination) && !empty($this->patientid);
    }

    // private function invalidEmail() {
    //     // Validate email format
    //     return filter_var($this->email, FILTER_VALIDATE_EMAIL) !== false;
    // }

    // private function idTakenCheck()
    // {
    //     // Check if username or email is already taken
    //     return $this->checkUser($this->email);
    // }
}
?>
