const express = require('express');
const http = require('http');
const socketIo = require('socket.io');
const mysql = require('mysql');

const app = express();
const server = http.createServer(app);
const io = socketIo(server);

// MySQL Database Setup
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'chatapplication' // Adjust to your database name
});

db.connect((err) => {
    if (err) {
        console.error('Database connection failed:', err);
    } else {
        console.log('Connected to the database');
    }
});

// Serve static files (Optional: if you want static files like JS/CSS here too)
app.use(express.static('public'));  // Use 'public' or another folder for static files

// Socket.io connection handler
io.on('connection', (socket) => {
    console.log('A user connected');
    
    // Listen for incoming messages from clients
    socket.on('sendMessage', (data) => {
        // Save message to MySQL database
        const { sender, recipient, message } = data;
        const query = 'INSERT INTO messages (sender, recipient, message) VALUES (?, ?, ?)';
        db.query(query, [sender, recipient, message], (err) => {
            if (err) {
                console.error('Error saving message:', err);
            }
        });

        // Broadcast the message to other clients
        io.emit('receiveMessage', data);
    });

    // Disconnect handler
    socket.on('disconnect', () => {
        console.log('User disconnected');
    });
});

// Start the server
const port = 3000; // Use a different port than Apache (default 80)
server.listen(port, () => {
    console.log(`Node.js server is running on http://localhost:${port}`);
});
