<?php


<?php
include "searchdbh.classes.php";


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
       ';
        
        while ($row = $result->fetch_assoc()) {
            echo '
            <p>Results for ' . htmlspecialchars($row['fname']) . ' </p>
           <div class="doctor_card">
                    <div class="doctor_img">
                        <img src="http://localhost/appointment/doctors_images/' . htmlspecialchars($row['doctor_img_path']) . '" alt="Doctor Image">
                    </div>
                    <div class="doctor_details">
                        <h2>' . htmlspecialchars($row['sname']) . " " . htmlspecialchars($row['fname']) . '</h2>
                        <h4>' . htmlspecialchars($row['special']) . '</h4>
                        <h4>' . htmlspecialchars($row['state']) . '</h4>
                        <p>Call: ' . htmlspecialchars($row['phone']) . '</p>
                        <p>Email: ' . htmlspecialchars($row['email']) . '</p>
                        <button>Book An Appointment</button>
                    </div>
                </div>
          ';
        }
        
        echo '
                </tbody>
            </table>
        </div>';
    } else {
        echo "No results found";
    } 
} 


class Location {
    private $conn;
    private $table_name = "doctor";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function search($location) {
        $sql = $this->conn->prepare("SELECT * FROM " . $this->table_name . " WHERE fname LIKE ?");
        $like_location = "%$location%";
        $sql->bind_param("s", $like_location);
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
$loc = new Location($db);

// Process search request
if (isset($_GET['location'])) {
    $location = $_GET['location'];
    $result = $loc->search($location);

    if ($result && $result->num_rows > 0) {
        echo '
       ';
        
        while ($row = $result->fetch_assoc()) {
            echo '
            <p>Results for ' . htmlspecialchars($row['state']) . ' </p>
           <div class="doctor_card">
                    <div class="doctor_img">
                        <img src="http://localhost/appointment/doctors_images/' . htmlspecialchars($row['doctor_img_path']) . '" alt="Doctor Image">
                    </div>
                    <div class="doctor_details">
                        <h2>' . htmlspecialchars($row['sname'])  . " " .  htmlspecialchars($row['fname']) . '</h2>
                        <h4>' . htmlspecialchars($row['special']) . '</h4>
                        <h4>' . htmlspecialchars($row['state']) . '</h4>
                        <p>Call: ' . htmlspecialchars($row['phone']) . '</p>
                        <p>Email: ' . htmlspecialchars($row['email']) . '</p>
                        <button>Book An Appointment</button>
                    </div>
                </div>
          ';
        }
        
        echo '
                </tbody>
            </table>
        </div>';
    } else {
        echo "No results found";
    } 
} 