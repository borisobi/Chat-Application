<?php
session_start();
require_once 'server.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $retype_password = mysqli_real_escape_string($db, $_POST['retype-password']);

    // Initialize errors array
    $errors = array();

    // Validate inputs
    if (empty($name)) array_push($errors, "Name is required");
    if (empty($email)) array_push($errors, "Email is required");
    if (empty($password)) array_push($errors, "Password is required");
    if ($password != $retype_password) array_push($errors, "Passwords do not match");

    // Handle avatar upload
    $avatar_path = null;
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
        $allowed = array('jpg', 'jpeg', 'png', 'gif');
        $filename = $_FILES['avatar']['name'];
        $filetype = pathinfo($filename, PATHINFO_EXTENSION);

        if (in_array(strtolower($filetype), $allowed)) {
            $avatar_path = 'uploads/' . time() . '_' . $filename;
            
            // Create uploads directory if it doesn't exist
            if (!file_exists('uploads')) {
                mkdir('uploads', 0777, true);
            }
            
            move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar_path);
        } else {
            array_push($errors, "Invalid file type. Only JPG, JPEG, PNG & GIF files are allowed.");
        }
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

    // If no errors, proceed with registration
    if (count($errors) == 0) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        // Prepare the SQL query based on whether an avatar was uploaded
        if ($avatar_path) {
            $query = "INSERT INTO users (name, email, password, avatar, status) 
                     VALUES ('$name', '$email', '$password', '$avatar_path', 'Offline')";
        } else {
            $query = "INSERT INTO users (name, email, password, status) 
                     VALUES ('$name', '$email', '$password', 'Offline')";
        }

        if (mysqli_query($db, $query)) {
            $user_id = mysqli_insert_id($db);
            $_SESSION['user_id'] = $user_id;
            $_SESSION['name'] = $name;
            $_SESSION['success'] = "Registration successful! You are now logged in.";
            
            // Update user status to Online
            $update_status = "UPDATE users SET status='Online' WHERE id=$user_id";
            mysqli_query($db, $update_status);
            
            header('location: index.php');
            exit();
        } else {
            $_SESSION['error'] = "Registration failed. Please try again.";
            header('location: signup.php');
            exit();
        }
    } else {
        $_SESSION['error'] = implode("<br>", $errors);
        header('location: signup.php');
        exit();
    }
} else {
    header('location: signup.php');
    exit();
}
?>