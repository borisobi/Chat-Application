<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Interface</title>
    <link rel="stylesheet" href="../css/chat.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="profile">
                <div class="profile-img"></div>
                <div class="profile-name">Savannah Nguyen</div>
                <div class="profile-title">Product Designer</div>
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
                <div class="chat-title">Jenny Wilson</div>
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
                        Hi there, nice to meet you! My name is Jenny Wilson, and I'm from Jakarta.
                    </div>
                </div>

                <div class="message sent">
                    <div class="message-avatar"></div>
                    <div class="message-content">
                        Hi there, nice to meet you too. I'm Savannah Nguyen from Bandung, please to meet you!
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
</body>
</html>