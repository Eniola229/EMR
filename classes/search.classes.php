<?php

class Database {
    private $host = "localhost";
    private $db_name = "appointment";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
            if ($this->conn->connect_error) {
                throw new Exception("Connection failed: " . $this->conn->connect_error);
            }
        } catch (Exception $e) {
            echo "Connection error: " . $e->getMessage();
        }

        return $this->conn;
    }
}

class User {
    private $conn;
    private $table_name = "doctor";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function search($first_name) {
        $sql = $this->conn->prepare("SELECT * FROM " . $this->table_name . " WHERE fname LIKE ?");
        $like_first_name = "%$first_name%";
        $sql->bind_param("s", $like_first_name);
        if (!$sql->execute()) {
            // Handle SQL execution error
            echo "Error executing query: " . $this->conn->error;
            return false;
        }
        return $sql->get_result();
    }
}

// Create database connection
$database = new Database();
$db = $database->getConnection();

// Create User object
$user = new User($db);

// Process search request
if (isset($_GET['first_name'])) {
    $first_name = $_GET['first_name'];
    $result = $user->search($first_name);

    if ($result && $result->num_rows > 0) {
        echo '
        <div class="container mt-5">
            <h5 class="mb-4">Result </h5>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Profile</th>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">State</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>';
        
        while ($row = $result->fetch_assoc()) {
            echo '
            <tr class="table-primary">
                <td><img style="width: 200px; height: 20vh;" src="doctors_images/' . htmlspecialchars($row['doctor_img_path']) . '" class="img-thumbnail" alt="Profile Image"></td>
                <td>' . htmlspecialchars($row['sname']) . '</td>
                <td>' . htmlspecialchars($row['fname']) . '</td>
                <td>' . htmlspecialchars($row['oname']) . '</td>
                <td>' . htmlspecialchars($row['email']) . '</td>
                <td>' . htmlspecialchars($row['state']) . '</td>
                <td>
                    <button type="button" class="btn btn-info btn-sm">View</button>
                </td>
            </tr>';
        }
        
        echo '
                </tbody>
            </table>
        </div>';
    } else {
        echo "No results found";
    }
}
?>
