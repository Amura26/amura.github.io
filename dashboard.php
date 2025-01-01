<?php
session_start();
include 'koneksi.php'; // Pastikan koneksi ke database sudah benar

// Pastikan admin sudah login
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

// Ambil semua pengguna dari database
try {
    $users = $pdo->query("SELECT id, username FROM users WHERE role = 'user' ORDER BY username ASC")->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching user data."); // Hindari menampilkan pesan error mentah
}

// Ambil pesan pengguna jika ada ID pengguna yang dipilih
$selected_user_id = isset($_GET['user_id']) && is_numeric($_GET['user_id']) ? intval($_GET['user_id']) : null;
$chats = [];
$current_user = null;

if ($selected_user_id) {
    try {
        // Ambil data pesan
        $stmt = $pdo->prepare("SELECT chats.*, users.username FROM chats 
                               JOIN users ON chats.user_id = users.id 
                               WHERE chats.user_id = :user_id
                               ORDER BY created_at ASC");
        $stmt->bindParam(':user_id', $selected_user_id);
        $stmt->execute();
        $chats = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Ambil data pengguna saat ini
        foreach ($users as $user) {
            if ($user['id'] == $selected_user_id) {
                $current_user = $user;
                break;
            }
        }
    } catch (PDOException $e) {
        die("Error fetching chat data."); // Hindari menampilkan pesan error mentah
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Chat</title>
    <style>
:root {
    --primary-color: #007bff;
    --primary-hover: #0056b3;
    --secondary-color: #ffffff;
    --border-color: #ddd;
    --background-color: #f8f9fa;
    --message-user: #d1e7dd;
    --message-admin: #f8d7da;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    height: 100vh;
    background-color: var(--background-color);
    color: #333;
}

.sidebar {
    width: 30%;
    background-color: var(--secondary-color);
    border-right: 1px solid var(--border-color);
    overflow-y: auto;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
}

.sidebar h2 {
    text-align: center;
    padding: 15px;
    background-color: var(--primary-color);
    color: var(--secondary-color);
    margin: 0;
    font-size: 1.5rem;
}

.user-list {
    list-style: none;
    margin: 0;
    padding: 0;
}

.user-list li {
    padding: 15px;
    border-bottom: 1px solid #eee;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
}

.user-list li:hover {
    background-color: var(--primary-color);
    color: var(--secondary-color);
}

.user-list li.active {
    background-color: var(--primary-hover);
    color: var(--secondary-color);
}

.chat-container {
    flex: 1;
    display: flex;
    flex-direction: column;
    background-color: var(--secondary-color);
    box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
}

.chat-header {
    padding: 15px;
    background-color: var(--primary-color);
    color: var(--secondary-color);
    text-align: center;
    border-bottom: 1px solid var(--border-color);
    font-size: 1.25rem;
    font-weight: bold;
}

.chat-box {
    flex: 1;
    padding: 20px;
    background: #f1f1f1;
    overflow-y: auto;
}

.message {
    margin-bottom: 15px;
    padding: 15px;
    border-radius: 10px;
    font-size: 1rem;
    line-height: 1.5;
    position: relative;
}

.user-message {
    background-color: var(--message-user);
    text-align: left;
    align-self: flex-start;
    max-width: 70%;
}

.admin-message {
    background-color: var(--message-admin);
    text-align: right;
    align-self: flex-end;
    max-width: 70%;
}

.message small {
    display: block;
    font-size: 0.8rem;
    color: #555;
    margin-top: 5px;
}

.chat-input {
    display: flex;
    padding: 15px;
    border-top: 1px solid var(--border-color);
    background-color: var(--secondary-color);
    gap: 10px;
}

textarea {
    flex: 1;
    padding: 10px;
    font-size: 1rem;
    border: 1px solid var(--border-color);
    border-radius: 5px;
    resize: none;
}

textarea:focus {
    outline: none;
    border-color: var(--primary-color);
}

button {
    padding: 10px 15px;
    background-color: var(--primary-color);
    color: var(--secondary-color);
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: var(--primary-hover);
}
.sidebar {
    width: 30%;
    background-color: var(--secondary-color);
    border-right: 1px solid var(--border-color);
    overflow-y: auto;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100vh; /* Pastikan sidebar menutupi seluruh tinggi layar */
}

.cta {
    background-color:rgb(233, 3, 3);
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    text-align: center;
    margin-top: 20px;
}

.cta:hover {
    background-color:rgb(73, 9, 9);
}

/* Sidebar content (list) styling */
.user-list {
    list-style: none;
    margin: 0;
    padding: 0;
    flex-grow: 1;
}


    </style>
</head>
<body>
<div class="sidebar">
    <h2>Daftar Pengguna</h2>
    <ul class="user-list">
        <?php foreach ($users as $user): ?>
            <li class="<?= $user['id'] == $selected_user_id ? 'active' : '' ?>">
                <a href="?user_id=<?= htmlspecialchars($user['id']) ?>" style="text-decoration: none; color: inherit;">
                    <?= htmlspecialchars($user['username']) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <a href="logout.php" class="cta">Logout</a> <!-- Tombol logout sekarang terletak di bawah -->
</div>


<div class="chat-container">
    <div class="chat-header">
        <?php if ($current_user): ?>
            Chat dengan <?= htmlspecialchars($current_user['username']) ?>
        <?php else: ?>
            Pilih pengguna
        <?php endif; ?>
    </div>

    <div class="chat-box">
        <?php if (!empty($chats)): ?>
            <?php foreach ($chats as $chat): ?>
                <div class="message <?= $chat['sender'] === 'user' ? 'user-message' : 'admin-message' ?>">
                    <?= htmlspecialchars($chat['message']) ?>
                    <small><?= htmlspecialchars($chat['created_at']) ?></small>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Belum ada pesan.</p>
        <?php endif; ?>
    </div>

    <?php if ($selected_user_id): ?>
    <form method="POST" action="admin_reply.php" class="chat-input">
        <textarea name="message" placeholder="Ketik balasan..." required></textarea>
        <input type="hidden" name="user_id" value="<?= htmlspecialchars($selected_user_id) ?>">
        <button type="submit">Kirim</button>
    </form>
<?php endif; ?>
</div>

</body>
</html>
