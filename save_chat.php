<?php
session_start();
include 'koneksi.php';  // Pastikan koneksi ke database sudah ada

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    echo "Anda perlu login terlebih dahulu.";
    exit;
}

if (isset($_POST['message']) && !empty($_POST['message'])) {
    $user_id = $_SESSION['user_id'];
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    // Simpan pesan ke database
    $stmt = $pdo->prepare("INSERT INTO chat_messages (user_id, message, sender) VALUES (:user_id, :message, 'user')");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':message', $message);
    $stmt->execute();

    echo "Pesan berhasil dikirim!";
}
?>
