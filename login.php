<?php
session_start();

// If user is already logged in, redirect to index.php
if(isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Chat Application</title>
    <link rel="stylesheet" href="../Chat-Application/css/login.css">
    <style>
        .error-message {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            text-align: center;
        }
        .success-message {
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="image-section">
            <img src="/images/cheerful-man-using-laptop-while-posing.jpg" alt="Workspace setup with MacBook and monitor">
        </div>
        <div class="login-section">
            <h1>Login</h1>
            <p class="welcome-text">Welcome back, log in to start chatting</p>
            
            <!-- Display error/success messages -->
            <?php 
            if(isset($_SESSION['error'])) { 
                echo "<div class='error-message'>" . htmlspecialchars($_SESSION['error']) . "</div>";
                unset($_SESSION['error']);
            }
            if(isset($_SESSION['success'])) { 
                echo "<div class='success-message'>" . htmlspecialchars($_SESSION['success']) . "</div>";
                unset($_SESSION['success']);
            }
            ?>

            <form id="loginForm" method="POST" action="process_login.php" onsubmit="return validateForm(event)">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="password-container">
                        <input type="password" id="password" name="password" required placeholder="Password">
                        <span class="toggle-password" onclick="togglePassword()">👁️</span>
                    </div>
                </div>
                <button type="submit" class="login-button" name="login_user">Log in</button>
                <p class="signup-link">
                    Don't have an account? <a href="../Chat-Application/signup.php">Sign Up</a>
                </p>
            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type');
            passwordInput.setAttribute(
                'type',
                type === 'password' ? 'text' : 'password'
            );
        }

        function validateForm(event) {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            // Basic email validation
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert('Please enter a valid email address!');
                return false;
            }

            // Check password length
            if (password.length < 1) {
                alert('Please enter your password!');
                return false;
            }

            return true;
        }
    </script>
</body>
</html>