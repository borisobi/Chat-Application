<?php
// session_start();

// Variable declaration
$errors = array();
$_SESSION['success'] = "";

// Connect to database
$db = mysqli_connect('localhost', 'root', '', 'chatapplication');

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // Receive all input values from the form
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    
    // Form validation
    if (empty($name)) {
        array_push($errors, "Name is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // Check if email already exists
    $email_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($db, $email_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) {
        if ($user['email'] === $email) {
            array_push($errors, "Email already exists");
        }
    }

    // Register user if there are no errors
    if (count($errors) == 0) {
        // Use PASSWORD_HASH instead of MD5 for better security
        $password = password_hash($password_1, PASSWORD_DEFAULT);
        
        $query = "INSERT INTO users (name, email, password, status) 
                  VALUES('$name', '$email', '$password', 'Offline')";
        mysqli_query($db, $query);

        $user_id = mysqli_insert_id($db);
        $_SESSION['user_id'] = $user_id;
        $_SESSION['name'] = $name;
        $_SESSION['success'] = "You are now logged in";
        
        // Update user status to Online
        $update_status = "UPDATE users SET status='Online' WHERE id=$user_id";
        mysqli_query($db, $update_status);
        
        header('location: index.php');
    }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $query = "SELECT * FROM users WHERE email='$email'";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) {
            $user = mysqli_fetch_assoc($results);
            if (password_verify($password, $user['password'])) {
                // $_SESSION['user_id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['success'] = "You are now logged in";
                
                // Update user status to Online
                $user_id = $user['id'];
                $update_status = "UPDATE users SET status='Online' WHERE id=$user_id";
                mysqli_query($db, $update_status);
                
                header('location: login.php');
            } else {
                array_push($errors, "Wrong email/password combination");
            }
        } else {
            array_push($errors, "Wrong email/password combination");
        }
    }
}

// LOGOUT USER (Add this new section)
if (isset($_GET['logout'])) {
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        // Update user status to Offline
        $update_status = "UPDATE users SET status='Offline' WHERE id=$user_id";
        mysqli_query($db, $update_status);
    }
    
    session_destroy();
    unset($_SESSION['user_id']);
    unset($_SESSION['name']);
    header("location: login.php");
}