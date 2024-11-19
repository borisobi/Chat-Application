// server.js
const express = require('express');
const app = express();
const http = require('http').createServer(app);
const io = require('socket.io')(http);

app.use(express.static('public'));
app.get('/', (req, res) => {
    res.sendFile(__dirname + '/chat.php');
});

// Store connected users
const users = new Map();

io.on('connection', (socket) => {
    console.log('A user connected');

    // Handle user joining
    socket.on('user_join', (userData) => {
        users.set(socket.id, userData);
        io.emit('user_connected', userData);
    });

    // Handle new messages
    socket.on('send_message', (messageData) => {
        const user = users.get(socket.id);
        io.emit('new_message', {
            content: messageData.content,
            sender: user,
            timestamp: new Date()
        });
    });

    // Handle disconnection
    socket.on('disconnect', () => {
        const user = users.get(socket.id);
        users.delete(socket.id);
        io.emit('user_disconnected', user);
        console.log('User disconnected');
    });
});

const PORT = process.env.PORT || 3000;
http.listen(PORT, () => {
    console.log(`Server running on port ${PORT}`);
});