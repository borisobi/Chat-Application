function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    input.type = input.type === 'password' ? 'text' : 'password';
}

function validateForm(event) {
    event.preventDefault();
    
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const retypePassword = document.getElementById('retype-password').value;

    // Basic validation
    if (password.length < 8) {
        alert('Password must be at least 8 characters long');
        return false;
    }

    if (password !== retypePassword) {
        alert('Passwords do not match');
        return false;
    }

    // Email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Please enter a valid email address');
        return false;
    }

    // If validation passes, you can submit the form
    console.log('Form submitted:', { name, email, password });
    // Add your API call or form submission logic here
    
    return false; // Prevent actual form submission for this example
}

// Handle avatar upload
document.getElementById('avatar-input').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const avatarUpload = document.querySelector('.avatar-upload');
            avatarUpload.style.backgroundImage = `url(${e.target.result})`;
            avatarUpload.style.backgroundSize = 'cover';
            avatarUpload.querySelector('img').style.display = 'none';
        }
        reader.readAsDataURL(file);
    }
});