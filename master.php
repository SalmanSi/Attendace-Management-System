<?php
// Start the session if needed for authentication or user data
session_start();

// Include the necessary header and navigation (this can be included at the top of the master page)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- Header or Navigation Bar -->
<div id="header">
    <h1>NUST Attendance System</h1>
    <nav>
        <ul>
            <li><a href="xinde.php">Home</a></li>
            <li><a href="attendance.php">Attendance</a></li>
            <li><a href="student_attendance.php">My Attendance</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</div>

<!-- Main content of the page -->
<div id="main-content">
    <?php
    // This is where the content will be injected from other pages
    if (isset($content)) {
        echo $content;
    } else {
        echo "<p>Welcome to the Attendance System</p>";
    }
    ?>
</div>

<!-- Footer -->
<div id="footer">
    <p>&copy; 2024 NUST. All rights reserved.</p>
</div>

</body>
</html>
