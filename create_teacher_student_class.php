<?php
session_start();
include('db.php');

// Ensure the user is logged in and is an admin
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: login.php');
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Insert Teacher or Student
    if (isset($_POST['create_user'])) {
        $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $role = $_POST['role'];
        $password = $_POST['password'];
        $class = mysqli_real_escape_string($conn, $_POST['class']);

        $query = "INSERT INTO user (fullname, email, role, password, class) 
                  VALUES ('$fullname', '$email', '$role', '$password', '$class')";
        mysqli_query($conn, $query);
        echo "User created successfully!";
    }

    // Insert Class
    if (isset($_POST['create_class'])) {
        $teacherid = $_POST['teacherid'];
        $starttime = $_POST['starttime'];
        $endtime = $_POST['endtime'];
        $credit_hours = $_POST['credit_hours'];
        $date = $_POST['date'];

        $query = "INSERT INTO class (teacherid, starttime, endtime, credit_hours, date) 
                  VALUES ($teacherid, '$starttime', '$endtime', $credit_hours, '$date')";
        mysqli_query($conn, $query);
        echo "Class created successfully!";
    }
}

?>
<?php
// Include the master template
include('master.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Teacher, Student, and Class</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h2>Create Teacher or Student</h2>
    <form method="post">
        <h3>Create User (Teacher/Student)</h3>
        <input type="text" name="fullname" placeholder="Full Name" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <select name="role" required>
            <option value="teacher">Teacher</option>
            <option value="student">Student</option>
        </select><br>
        <input type="text" name="class" placeholder="Class" required><br>
        <button type="submit" name="create_user">Create User</button>
    </form>

    <h2>Create Class</h2>
    <form method="post">
        <h3>Create Class</h3>
        <input type="number" name="teacherid" placeholder="Teacher ID" required><br>
        <input type="time" name="starttime" required><br>
        <input type="time" name="endtime" required><br>
        <input type="number" name="credit_hours" placeholder="Credit Hours" required><br>
        <input type="date" name="date" required><br>
        <button type="submit" name="create_class">Create Class</button>
    </form>
</body>
</html>
