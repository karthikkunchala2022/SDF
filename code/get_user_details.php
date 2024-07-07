<?php
// Replace the database connection details with your own
$servername = "localhost";
$username = "";
$password = "";
$dbname = "user";

// Create a new MySQLi instance
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have a users table with columns `username` and `email`
// Replace `your_users_table` with the actual table name in your database
$sql = "SELECT username, email FROM users";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Create an array to hold the user details
    $userDetails = array(
        'username' => $row["username"],
        'email' => $row["email"]
    );

    // Convert the array to JSON and return it
    echo json_encode($userDetails);
} else {
    // Handle the case when no user details are found
    echo json_encode(array('error' => 'No user details found'));
}

$conn->close();
?>
