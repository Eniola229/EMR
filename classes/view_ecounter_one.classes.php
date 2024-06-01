<?php
class Patient
{
    private $pdo;

    // Constructor receives an existing PDO instance
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getUserById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM ecounter WHERE patientid = :patientid");
        $stmt->execute(['patientid' => $id]);
        return $stmt->fetch();
    }
}

class UserList
{
    private $pdo;

    // Constructor receives an existing PDO instance
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getUserDetails($user_id) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM patients WHERE patientid = :patientid");
            $stmt->execute(['patientid' => $user_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle exception
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    public function getEcounterNotes($user_id) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM ecounter WHERE patientid = :patientid ORDER BY created_at DESC");
            $stmt->execute(['patientid' => $user_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle exception
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
}

try {
    // Establish a database connection
    $pdo = new PDO("mysql:host=localhost;dbname=appointment", 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
    ]);

    // Get the user patientid from the URL parameter
    $user_id = $_GET['patientid'];

    // Create an instance of the UserList class
    $viewUser = new UserList($pdo);

    // Retrieve patient details
    $patient = $viewUser->getUserDetails($user_id);

    // Retrieve ecounter notes
    $ecounters = $viewUser->getEcounterNotes($user_id);

} catch (PDOException $e) {
    // Handle any connection errors
    echo "Connection failed: " . $e->getMessage();
}
?>