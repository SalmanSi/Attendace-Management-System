<?php
session_start();
include('db.php');
include('master.php');  // Include master template for consistent layout

if ($_SESSION['user']['role'] != 'student') {
    header('Location: login.php');
    exit;
}

$student_id = $_SESSION['user']['id'];

// Fetch all unique classes this student has attendance records for
$classes_query = "SELECT DISTINCT c.id, c.date, c.starttime, c.endtime 
                  FROM class c
                  JOIN attendance a ON a.classid = c.id
                  WHERE a.studentid = $student_id
                  ORDER BY c.date";
$classes_result = mysqli_query($conn, $classes_query);


?>

<div class="student-attendance-container">
    <h2 class="attendance-header">Your Attendance Records</h2>

    <?php if (mysqli_num_rows($classes_result) == 0): ?>
        <div class="no-attendance-message">
            <p>No attendance records found.</p>
        </div>
    <?php else: ?>
        <?php while ($class = mysqli_fetch_assoc($classes_result)): ?>
            <?php 
            // Fetch attendance for this specific class
            $class_id = $class['id'];
            $attendance_query = "SELECT * FROM attendance 
                                 WHERE studentid = $student_id AND classid = $class_id";
            $attendance_result = mysqli_query($conn, $attendance_query);
            $attendance = mysqli_fetch_assoc($attendance_result);
            ?>

            <div class="class-attendance-card">
                <div class="class-info">
                    <h3>Class #<?= $class['id'] ?></h3>
                    <p>
                        Date: <?= date('F j, Y', strtotime($class['date'])) ?><br>
                        Time: <?= date('h:i A', strtotime($class['starttime'])) ?> - 
                               <?= date('h:i A', strtotime($class['endtime'])) ?>
                    </p>
                </div>

                <table class="attendance-table">
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>Comments</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="<?= $attendance['isPresent'] ? 'attendance-present' : 'attendance-absent' ?>">
                            <td>
                                <?= $attendance['isPresent'] ? 'Present' : 'Absent' ?>
                            </td>
                            <td><?= htmlspecialchars($attendance['comments'] ?? 'No comments') ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>

<?php

?>