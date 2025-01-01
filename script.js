// script.js

// Smooth scrolling for navigation links
document.querySelectorAll('.navbar a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Chat functionality
function sendMessage(event) {
    event.preventDefault();
    const userMessage = document.getElementById('user-message').value.trim();
    const chatMessages = document.getElementById('chat-messages');

    if (userMessage) {
        // Add user message to chat
        const userMessageElement = document.createElement('div');
        userMessageElement.className = 'message user-message';
        userMessageElement.textContent = userMessage;
        chatMessages.appendChild(userMessageElement);

        // Simulate bot response
        const botMessageElement = document.createElement('div');
        botMessageElement.className = 'message bot-message';
        botMessageElement.textContent = 'Terima kasih atas pertanyaannya. Kami akan segera membantu Anda.';
        chatMessages.appendChild(botMessageElement);

        // Clear input field
        document.getElementById('user-message').value = '';

        // Scroll to the bottom of chat
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
}

// Example chat box styling to enhance visuals
const chatBoxStyles = `
    .chat-box {
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 10px;
        max-width: 600px;
        margin: 20px auto;
    }
    .chat-header {
        font-weight: bold;
        text-align: center;
        margin-bottom: 10px;
    }
    .chat-messages {
        height: 300px;
        overflow-y: auto;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #f9f9f9;
        margin-bottom: 10px;
    }
    .message {
        margin: 5px 0;
        padding: 10px;
        border-radius: 10px;
    }
    .user-message {
        background-color: #d4edda;
        text-align: right;
    }
    .bot-message {
        background-color: #f8d7da;
        text-align: left;
    }
    .chat-input {
        display: flex;
    }
    .chat-input input {
        flex-grow: 1;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px 0 0 5px;
    }
    .chat-input button {
        padding: 10px;
        background-color: #007bff;
        border: none;
        color: #fff;
        cursor: pointer;
        border-radius: 0 5px 5px 0;
    }
    .chat-input button:hover {
        background-color: #0056b3;
    }
`;

// Add chat styles dynamically
const styleSheet = document.createElement('style');
styleSheet.type = 'text/css';
styleSheet.innerText = chatBoxStyles;
document.head.appendChild(styleSheet);
