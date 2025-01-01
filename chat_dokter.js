const chatMessages = document.getElementById("chat-messages");
const userMessageInput = document.getElementById("user-message");

// Simulasi respons bot
function generateBotResponse(userMessage) {
    const responses = {
        "halo": "Halo! Apa yang bisa saya bantu?",
        "apa kabar": "Saya baik, terima kasih! Bagaimana kabar Anda?",
        "dokter tht": "Kami memiliki dokter spesialis THT yang siap membantu Anda.",
        "terima kasih": "Sama-sama! Jangan ragu untuk bertanya lagi.",
    };

    return responses[userMessage.toLowerCase()] || "Maaf, saya tidak mengerti. Bisa Anda jelaskan lebih detail?";
}

// Kirim pesan
function sendMessage(event) {
    event.preventDefault();
    const userMessage = userMessageInput.value.trim();

    if (userMessage === "") return;

    // Tambahkan pesan pengguna
    addMessage(userMessage, "user-message");

    // Dapatkan respons bot setelah jeda
    setTimeout(() => {
        const botResponse = generateBotResponse(userMessage);
        addMessage(botResponse, "bot-message");
    }, 1000);

    // Kosongkan input
    userMessageInput.value = "";
}

// Tambahkan pesan ke tampilan obrolan
function saveMessageToDatabase(sender, message) {
    fetch("save_chat.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ sender, message }),
    })
    .then((response) => response.json())
    .then((data) => {
        if (!data.success) {
            console.error("Error saving message:", data.error);
        }
    })
    .catch((error) => console.error("Network error:", error));
}
function addMessage(message, className) {
    const messageElement = document.createElement("div");
    messageElement.classList.add("message", className);
    messageElement.textContent = message;
    chatMessages.appendChild(messageElement);

    // Scroll otomatis ke bawah
    chatMessages.scrollTop = chatMessages.scrollHeight;

    // Simpan pesan ke database
    const sender = className === "user-message" ? "user" : "bot";
    saveMessageToDatabase(sender, message);
}
document.querySelector('.chat-input').addEventListener('submit', async (event) => {
    event.preventDefault(); // Mencegah form submit biasa

    const userMessage = document.getElementById("user-message").value; // Ambil pesan dari input

    if (userMessage.trim() !== "") {
        // Kirim pesan menggunakan fetch (AJAX)
        const response = await fetch("chat_handler.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ message: userMessage }),
        });

        const result = await response.json();
        if (result.status === "success") {
            // Jika berhasil, tampilkan pesan di chat
            addMessage(userMessage, "user-message");
        } else {
            console.error(result.message); // Jika gagal, tampilkan pesan error di console
        }

        document.getElementById("user-message").value = ""; // Kosongkan input setelah kirim
    }
});
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
        // Ambil pesan terbaru (termasuk balasan dari chatbot)
        fetchMessages();
    } else {
        console.error(result.message);
    }

    userMessageInput.value = ""; // Kosongkan input setelah kirim
}

