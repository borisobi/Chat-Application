<?php
session_start();

// Database connection
$db = mysqli_connect('localhost', 'root', '', 'chatapplication');

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = $_POST['password'];

    // Validation
    if (empty($email)) {
        $_SESSION['error'] = "Email is required";
        header("Location: login.php");
        exit();
    }
    if (empty($password)) {
        $_SESSION['error'] = "Password is required";
        header("Location: login.php");
        exit();
    }

    // Check if user exists
    $query = "SELECT * FROM users WHERE email='$email'";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1) {
        $user = mysqli_fetch_assoc($results);
        
        if (password_verify($password, $user['password'])) {
            // Password is correct, start a new session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['success'] = "You are now logged in";

            // Update user status to Online
            $user_id = $user['id'];
            $update_status = "UPDATE users SET status='Online' WHERE id=$user_id";
            mysqli_query($db, $update_status);

            header('location: index.php');
            exit();
        } else {
            $_SESSION['error'] = "Wrong email/password combination";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Wrong email/password combination";
        header("Location: login.php");
        exit();
    }
}
?>