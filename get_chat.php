<?php
session_start();
include 'koneksi.php';

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Anda harus login terlebih dahulu.']);
    exit;
}

$user_id = $_SESSION['user_id'];

try {
    // Ambil semua pesan yang terkait dengan pengguna ini
    $stmt = $pdo->prepare("SELECT c.message, c.sender, c.created_at, u.username
                           FROM chats c
                           LEFT JOIN users u ON c.user_id = u.id
                           WHERE c.user_id = :user_id
                           ORDER BY c.created_at ASC");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Modifikasi nama pengirim jika diperlukan
    foreach ($messages as &$message) {
        if ($message['username'] === 'adit' && $message['sender'] === 'admin') {
            $message['username'] = 'dokter'; // Ganti "adit" menjadi "dokter"
        }
    }

    // Kirimkan pesan dalam bentuk JSON
    echo json_encode(['status' => 'success', 'messages' => $messages]);
} catch (Exception $e) {
    // Tangani error jika terjadi
    echo json_encode(['status' => 'error', 'message' => 'Terjadi kesalahan: ' . $e->getMessage()]);
}
exit;
