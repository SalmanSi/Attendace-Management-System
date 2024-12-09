<?php
session_start();
include('db.php');
if ($_SESSION['user']['role'] != 'teacher') {
    header('Location: login.php');
    exit;
}

$teacher_id = $_SESSION['user']['id'];
$query = "SELECT * FROM class WHERE teacherid = $teacher_id";
$classes = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Classes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="header">
        <!-- Copy header from master.php -->
        <h1>NUST Attendance System</h1>
        <nav>
            <ul>
                <li><a href="master.php">Home</a></li>
                <li><a href="teacher.php">Attendance</a></li>
                <li><a href="student.php">My Attendance</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>

    <div class="container">
        <h2>Your Classes</h2>
        <table class="attendance-table">
            <thead>
                <tr>
                    <th>Class ID</th>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($class = mysqli_fetch_assoc($classes)): ?>
                    <tr>
                        <td><?= $class['id'] ?></td>
                        <td><?= $class['date'] ?></td>
                        <td><?= $class['starttime'] ?></td>
                        <td><?= $class['endtime'] ?></td>
                        <td>
                            <a href="mark_attendance.php?classid=<?= $class['id'] ?>" class="btn">Mark Attendance</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <div id="footer">
        <p>&copy; 2024 NUST. All rights reserved.</p>
    </div>
</body>
</html>