// First, we set up the required dependencies
const express = require('express');  // Web framework for Node.js
const app = express();
const http = require('http').createServer(app);  // Create HTTP server
const io = require('socket.io')(http);  // Initialize Socket.IO

// Serve static files from 'public' directory
app.use(express.static('public'));

// Serve the chat.php file when someone visits the root URL
app.get('/', (req, res) => {
    res.sendFile(__dirname + '/chat.php');
});

// Track connected users using a Map
const users = new Map();

// Handle Socket.IO connections
io.on('connection', (socket) => {
    // When a user connects
    console.log('A user connected');

    // When a user joins the chat
    socket.on('user_join', (userData) => {
        users.set(socket.id, userData);  // Store user data
        io.emit('user_connected', userData);  // Notify all clients
    });

    // When a user sends a message
    socket.on('send_message', (messageData) => {
        const user = users.get(socket.id);
        // Broadcast message to all connected clients
        io.emit('new_message', {
            content: messageData.content,
            sender: user,
            timestamp: new Date()
        });
    });

    // When a user disconnects
    socket.on('disconnect', () => {
        const user = users.get(socket.id);
        users.delete(socket.id);
        io.emit('user_disconnected', user);  // Notify others
        console.log('User disconnected');
    });
});

// Start server on port 3000 or environment port
const PORT = process.env.PORT || 3000;
http.listen(PORT, () => {
    console.log(`Server running on port ${PORT}`);
});