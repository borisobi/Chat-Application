<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../Chat-Application/css/signup.css">
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
        <div class="signup-form">
            <h1>Sign up and chat</h1>
            
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

            <form id="signup-form" method="POST" action="process_signup.php" enctype="multipart/form-data" onsubmit="return validateForm()">
                <div class="avatar-upload" onclick="document.getElementById('avatar-input').click()">
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'%3E%3Cpath d='M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z'/%3E%3C/svg%3E" alt="Avatar upload" id="avatar-preview">
                    <input type="file" name="avatar" id="avatar-input" hidden accept="image/*">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="@mail.com" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <input type="password" id="password" name="password" placeholder="password" required>
                        <span class="toggle-password" onclick="togglePassword('password')">👁️</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="retype-password">Retype password</label>
                    <div class="input-group">
                        <input type="password" id="retype-password" name="retype-password" placeholder="retype-password" required>
                        <span class="toggle-password" onclick="togglePassword('retype-password')">👁️</span>
                    </div>
                </div>
                <button type="submit">Sign Up</button>
            </form>
            <div class="signin-link">
                Already have an account? <a href="../Chat-Application/login.php">Sign in</a>
            </div>
        </div>
        <div class="image-section">

        </div>
    </div>

    <script>
        // Preview avatar image before upload
        document.getElementById('avatar-input').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('avatar-preview').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });

        // Toggle password visibility
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            input.type = input.type === 'password' ? 'text' : 'password';
        }

        // Form validation
        function validateForm() {
            const password = document.getElementById('password').value;
            const retypePassword = document.getElementById('retype-password').value;
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;

            // Check if passwords match
            if (password !== retypePassword) {
                alert('Passwords do not match!');
                return false;
            }

            // Check password length
            if (password.length < 6) {
                alert('Password must be at least 6 characters long!');
                return false;
            }

            // Basic email validation
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert('Please enter a valid email address!');
                return false;
            }

            // Check name length
            if (name.length < 2) {
                alert('Name must be at least 2 characters long!');
                return false;
            }

            return true;
        }
    </script>
</body>
</html>