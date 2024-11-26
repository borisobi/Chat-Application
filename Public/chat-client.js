const socket = io('http://localhost:3000');  // Connect to the Node.js WebSocket server

const inputBox = document.querySelector('.chat-input input');
const chatContent = document.querySelector('.chat-content');

inputBox.addEventListener('keypress', (event) => {
    if (event.key === 'Enter' && inputBox.value.trim() !== '') {
        const message = inputBox.value.trim();
        sendMessage(message);
        inputBox.value = ''; // Clear input after sending
    }
});

function sendMessage(message) {
    const data = {
        sender: 'User1',  // Replace with the actual logged-in user's name
        recipient: 'User2',  // Replace with the recipient's name
        message: message
    };

    // Emit message to the Node.js WebSocket server
    socket.emit('sendMessage', data);
}

// Listen for messages from the Node.js WebSocket server
socket.on('receiveMessage', (data) => {
    const messageDiv = document.createElement('div');
    messageDiv.classList.add(data.sender === 'User1' ? 'sent' : 'received');
    messageDiv.innerHTML = `
        <div class="message-avatar"></div>
        <div class="message-content">${data.message}</div>
    `;
    chatContent.appendChild(messageDiv);
    chatContent.scrollTop = chatContent.scrollHeight; // Scroll to the latest message
});
