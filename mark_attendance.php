<?php
include('db.php');
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

<form method="post">
    <?php while ($student = mysqli_fetch_assoc($students)): ?>
        <p>
            <?= $student['fullname'] ?>
            <input type="checkbox" name="attendance[<?= $student['id'] ?>]" value="1"> Present
            <input type="text" name="comments[<?= $student['id'] ?>]" placeholder="Comments">
        </p>
    <?php endwhile; ?>
    <button type="submit">Submit Attendance</button>
</form>
