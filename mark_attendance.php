<?php
session_start();
include('db.php');
include('master.php');
// Ensure the user is logged in and is a teacher
if ($_SESSION['user']['role'] !== 'teacher') {
    header('Location: login.php');
    exit;
}

$class_id = $_GET['classid'];
$students_query = "SELECT * FROM user WHERE role = 'student'";
$students = mysqli_query($conn, $students_query);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($_POST['attendance'] as $student_id => $isPresent) {
        $comments = $_POST['comments'][$student_id];
        $query = "INSERT INTO attendance (classid, studentid, isPresent, comments) VALUES ($class_id, $student_id, $isPresent, '$comments')";
        mysqli_query($conn, $query);
    }
    header("Location: teacher.php");
}
?>

<div class="attendance-container">
    <h2 class="attendance-title">Mark Attendance for Class #<?= $class_id ?></h2>
    <form method="post" class="attendance-form">
        <div class="students-list">
            <?php while ($student = mysqli_fetch_assoc($students)): ?>
                <div class="student-row">
                    <span class="student-name"><?= $student['fullname'] ?></span>
                    <div class="student-attendance-controls">
                        <label class="present-checkbox">
                            <input type="checkbox" name="attendance[<?= $student['id'] ?>]" value="1"> 
                            Present
                        </label>
                        <input type="text" name="comments[<?= $student['id'] ?>]" placeholder="Comments" class="comments-input">
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <button type="submit" class="submit-attendance-btn">Submit Attendance</button>
    </form>
</div>