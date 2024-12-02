<?php
session_start();
include('db.php');
if ($_SESSION['user']['role'] != 'student') {
    header('Location: login.php');
    exit;
}

$student_id = $_SESSION['user']['id'];
$query = "SELECT * FROM attendance WHERE studentid = $student_id";
$attendances = mysqli_query($conn, $query);
?>

<h2>Your Attendance</h2>
<table>
    <tr>
        <th>Class ID</th>
        <th>Attendance</th>
        <th>Comments</th>
    </tr>
    <?php while ($attendance = mysqli_fetch_assoc($attendances)): ?>
        <tr style="color: <?= $attendance['isPresent'] < 0.75 ? 'red' : ($attendance['isPresent'] < 0.85 ? 'yellow' : 'green') ?>;">
            <td><?= $attendance['classid'] ?></td>
            <td><?= $attendance['isPresent'] ? 'Present' : 'Absent' ?></td>
            <td><?= $attendance['comments'] ?></td>
        </tr>
    <?php endwhile; ?>
</table>
