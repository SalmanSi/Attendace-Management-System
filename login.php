<?php
session_start();

// Include the database connection
include('db.php');

// Initialize content variable
$content = "";

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $query = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        // Verify the password
        if ($password==$user['password']) {
            // Set the user session
            $_SESSION['user'] = $user;

            // Redirect based on user role
            if ($user['role'] == 'teacher') {
                header('Location: teacher.php');
                exit;
            } elseif ($user['role'] == 'student') {
                header('Location: student.php');
                exit;
            } elseif ($user['role']=='admin'){
                header('Location: create_teacher_student_class.php');
            }
        } else {
            $error = "Invalid credentials! Please check your email or password.";
        }
    } else {
        $error = "User not found! Please check your email.";
    }

    // Close the statement
    $stmt->close();
}

// Create the form
$content = '
<form method="post">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>';

// Display error if exists
if (isset($error)) {
    $content .= "<p style='color: red;'>$error</p>";
}

?>

<?php
// Include the master template
include('master.php');
?>
