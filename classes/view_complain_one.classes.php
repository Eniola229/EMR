<?php
class Patients
{
    private $pdo;

    // Constructor receives an existing PDO instance
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getUserById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM hmo_registrations WHERE user_id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
}

// Establish a database connection
$pdo = new PDO("mysql:host=localhost;dbname=appointment", 'root', '');

// Create an instance of the user class
$viewUser = new Patients($pdo);

// Get the user ID from the URL parameter
$user_id = $_GET['id'];

// Retrieve user details by ID
$user = $viewUser->getUserById($user_id);