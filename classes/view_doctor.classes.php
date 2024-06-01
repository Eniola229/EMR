<?php
include_once "dbh.classes.php";

class Users_all extends Dbh
{
    private $pdo;

    // Constructor receives an existing PDO instance
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getUsers() {
        $stmt = $this->pdo->prepare("SELECT * FROM doctor ORDER BY created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

// Establish a database connection
$pdo = new PDO("mysql:host=localhost;dbname=appointment", 'root', '');

// Create an instance of the Users_all class
$users_all_obj = new Users_all($pdo);

// Retrieve users
$users_all = $users_all_obj->getUsers();
?>
