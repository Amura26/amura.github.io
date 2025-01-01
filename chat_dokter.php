<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat dengan Dokter</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<a href="home.php" class="back-button"><i class="fas fa-arrow-left"></i> Kembali</a>

    <div class="chat-box">
        <div class="chat-header">
            <h2>Chat dengan Dokter Spesialis</h2>
        </div>
        <div class="chat-messages" id="chat-messages">
            <!-- Pesan akan ditampilkan di sini -->
        </div>
        <form class="chat-input" onsubmit="sendMessage(event)">
            <input type="text" id="user-message" placeholder="Tulis pesan Anda..." required>
            <button type="submit"><i class="fas fa-paper-plane"></i></button>
        </form>
    </div>

    <script>
        const chatMessages = document.getElementById("chat-messages");
        const userMessageInput = document.getElementById("user-message");

        // Fungsi untuk mengambil pesan chat terbaru
        async function fetchMessages() {
            const response = await fetch("get_chat.php");
            const data = await response.json();
            chatMessages.innerHTML = ""; // Kosongkan pesan sebelumnya
            data.messages.forEach(msg => {
                const messageElement = document.createElement("div");
                messageElement.classList.add("message", msg.sender === 'user' ? 'user-message' : 'admin-message');
                messageElement.innerHTML = `<strong>${msg.username}:</strong> ${msg.message}<br><small>${msg.created_at}</small>`;
                chatMessages.appendChild(messageElement);
            });
            chatMessages.scrollTop = chatMessages.scrollHeight; // Scroll otomatis
        }

        // Kirim pesan
        async function sendMessage(event) {
            event.preventDefault();
            const userMessage = userMessageInput.value.trim();

            if (userMessage === "") return;

            // Tambahkan pesan pengguna secara lokal
            addMessage(userMessage, "user-message");

            // Kirim pesan ke server
            const response = await fetch("chat_handler.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ message: userMessage }),
            });

            const result = await response.json();
            if (result.status === "success") {
                // Ambil pesan terbaru setelah kirim pesan
                fetchMessages();
            } else {
                console.error(result.message);
            }

            userMessageInput.value = ""; // Kosongkan input setelah kirim
        }

        // Tambahkan pesan ke tampilan obrolan
        function addMessage(message, className) {
            const messageElement = document.createElement("div");
            messageElement.classList.add("message", className);
            messageElement.textContent = message;
            chatMessages.appendChild(messageElement);

            // Scroll otomatis ke bawah
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        // Ambil pesan chat saat halaman dimuat
        window.onload = fetchMessages;
    </script>

</body>
</html>
