<!DOCTYPE html>
<html lang="en">
<!-- Update the head section -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Interface</title>
    <link rel="stylesheet" href="../Chat-Application/css/chat.css">
    <script src="/socket.io/socket.io.js"></script>
    <script src="http://localhost:3000/socket.io/socket.io.js"></script>
    <script src="Public/chat-client.js"></script>


</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="profile">
                <div class="profile-img"></div>
                <div class="profile-name">Ashu Boris</div>
                <div class="profile-title">UI-UX Designer</div>
            </div>

            <div class="menu-item">General Settings</div>
            <div class="menu-item">Notifications</div>
            <div class="menu-item">Privacy and Security</div>
            <div class="menu-item">Language</div>
            <div class="menu-item">Dark Mode</div>

            <div class="premium-box">
                <h3 class="premium-title">Mychats Premium</h3>
                <p class="premium-desc">Experience enhanced features and improved accessibility.</p>
                <button class="premium-button">Buy Now</button>
            </div>
        </div>

        <!-- Main Chat Area -->
        <div class="main-content">
        <div class="chat-header">
    <div class="menu-toggle">☰</div>
    <div class="chat-title">Mr Jovi</div>
    <div class="chat-actions">
        <span>🎥</span>
        <span>📞</span>
        <span>⋮</span>
    </div>
</div>

            <div class="chat-content">
                <div class="message received">
                    <div class="message-avatar"></div>
                    <div class="message-content">
                        Mr Jovi, we do how.
                    </div>
                </div>

                <div class="message sent">
                    <div class="message-avatar"></div>
                    <div class="message-content">
                        Talk i hear you!
                    </div>
                </div>
            </div>

            <div class="chat-input">
                <div class="input-box">
                    <input type="text" placeholder="Type a message">
                    <span>🎤</span>
                </div>
            </div>
        </div>
    </div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const sidebar = document.querySelector('.sidebar');
    
    menuToggle.addEventListener('click', function() {
        sidebar.classList.toggle('active');
    });

    // Close sidebar when clicking outside
    document.addEventListener('click', function(e) {
        if (!sidebar.contains(e.target) && !menuToggle.contains(e.target)) {
            sidebar.classList.remove('active');
        }
    });
});
</script>
<script src="/socket.io/socket.io.js"></script>
<script src="../Chat-Application/Public/chat-client.js"></script>
</body>
</html>