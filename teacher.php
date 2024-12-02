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

<h2>Your Classes</h2>
<ul>
    <?php while ($class = mysqli_fetch_assoc($classes)): ?>
        <li>
            Class ID: <?= $class['id'] ?> | 
            Start Time: <?= $class['starttime'] ?> | 
            End Time: <?= $class['endtime'] ?>
            <a href="mark_attendance.php?classid=<?= $class['id'] ?>">Mark Attendance</a>
        </li>
    <?php endwhile; ?>
</ul>
