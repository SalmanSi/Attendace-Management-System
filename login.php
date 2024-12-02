<?php

include('db.php');
$content="";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password']; // Add proper password security if required
    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $_SESSION['user'] = $user;
        if ($user['role'] == 'teacher') {
            header('Location: teacher.php');
        } elseif ($user['role'] == 'student') {
            header('Location: student.php');
        }
    } else {
        echo "Invalid credentials!";
    }
}
$content ='<form method="post">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>';
?>


<?php
include('master.php');
?>