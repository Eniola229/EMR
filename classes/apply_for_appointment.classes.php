<?php
include "dbh.classes.php";
class Posts extends Dbh
{
    private $pdo;

    // Constructor receives an existing PDO instance
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getUserById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM doctor WHERE user_id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
}
// Establish a database connection
$pdo = new PDO("mysql:host=localhost;dbname=appointment", 'root', '');

// Create an instance of the post class
$viewPost = new Posts($pdo);

// Get the post ID from the URL parameter
$post_id = $_GET['id'];

// Retrieve post details by ID
$post = $viewPost->getUserById($post_id);