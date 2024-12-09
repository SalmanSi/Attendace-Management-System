<?php
// db.php: Database connection file

// Database credentials
$servername = "localhost";  // Host
$username = "root";         // MySQL username (default is 'root' in XAMPP)
$password = "";             // MySQL password (default is empty in XAMPP)
$dbname = "attendance_system";     // Name of your database (change to your database name)

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
