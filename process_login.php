<?php
session_start();

// Database connection
$db = mysqli_connect('localhost', 'root', '', 'chatapplication');

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
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

    // Prepare the query to prevent SQL injection
    $query = "SELECT * FROM users WHERE email = ?";
    if ($stmt = mysqli_prepare($db, $query)) {
        mysqli_stmt_bind_param($stmt, "s", $email); // Bind email parameter
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Check if user exists
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);

            // Verify password
            if (password_verify($password, $user['password'])) {
                // Password is correct, start a new session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['success'] = "You are now logged in";

                // Update user status to Online
                $user_id = $user['id'];
                $update_status = "UPDATE users SET status = 'Online' WHERE id = ?";
                if ($stmt_update = mysqli_prepare($db, $update_status)) {
                    mysqli_stmt_bind_param($stmt_update, "i", $user_id);
                    mysqli_stmt_execute($stmt_update);
                }

                // Redirect to chat page
                header('Location: chat.php');
                exit();
            } else {
                $_SESSION['error'] = "Invalid email or password";
                header("Location: login.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "Invalid email or password";
            header("Location: login.php");
            exit();
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['error'] = "Database error. Please try again later.";
        header("Location: login.php");
        exit();
    }
}

mysqli_close($db);
?>
