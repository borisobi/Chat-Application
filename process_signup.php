<?php
session_start();

// Database connection
$db = mysqli_connect('localhost', 'root', '', 'chatapplication');

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = $_POST['password'];
    $retypePassword = $_POST['retype-password'];

    // Validation
    $errors = array();

    // Check if email already exists
    $email_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($db, $email_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) {
        header("Location: signup.php?error=Email already exists");
        exit();
    }

    // Password validation
    if ($password !== $retypePassword) {
        header("Location: signup.php?error=Passwords do not match");
        exit();
    }

    if (strlen($password) < 6) {
        header("Location: signup.php?error=Password must be at least 6 characters");
        exit();
    }

    // Handle image upload
    $image_path = null;
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $file_type = $_FILES['avatar']['type'];
        
        if (!in_array($file_type, $allowed_types)) {
            header("Location: signup.php?error=Invalid file type. Please upload an image");
            exit();
        }

        $upload_dir = 'uploads/avatars/';
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $file_extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        $file_name = uniqid() . '.' . $file_extension;
        $target_path = $upload_dir . $file_name;

        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $target_path)) {
            $image_path = $target_path;
        }
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into database
    $query = "INSERT INTO users (name, email, password, image, status) 
              VALUES ('$name', '$email', '$hashed_password', " . 
              ($image_path ? "'$image_path'" : "NULL") . ", 'Offline')";

    if (mysqli_query($db, $query)) {
        $user_id = mysqli_insert_id($db);
        
        // Set session variables
        $_SESSION['user_id'] = $user_id;
        $_SESSION['name'] = $name;
        $_SESSION['success'] = "Registration successful";

        // Update user status to Online
        $update_status = "UPDATE users SET status='Online' WHERE id=$user_id";
        mysqli_query($db, $update_status);

        header("Location: index.php");
        exit();
    } else {
        header("Location: signup.php?error=Registration failed. Please try again");
        exit();
    }
}
?>