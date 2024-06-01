<?php
try {
    // Establish a database connection
    $pdo = new PDO("mysql:host=localhost;dbname=appointment", 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    // Initialize an empty array for users
    $users = [];
    $error = "";

    // Get the user patientid from the URL parameter
    if (isset($_GET['patientid'])) {
        $user_id = $_GET['patientid'];
        
        // Debugging: Print the patient ID received
       // echo "Received patient ID: " . htmlspecialchars($user_id) . "<br>";

        // Validate user_id (ensure it's a non-empty string)
        if (!empty($user_id)) {
            // Prepare and execute the query to retrieve user details
            $stmt = $pdo->prepare("SELECT * FROM patients WHERE patientid = :patientid ORDER BY created_at DESC");
            $stmt->execute(['patientid' => $user_id]);
            $users = $stmt->fetchAll();

            // Debugging: Print the number of users fetched
          //  echo "Number of users fetched: " . count($users) . "<br>";
        } else {
            $error = "Invalid patient ID.";
        }
    } else {
        $error = "No patient ID provided.";
    }
} catch (PDOException $e) {
    // Handle any connection errors
    $error = "Connection failed: " . $e->getMessage();
}
?>
