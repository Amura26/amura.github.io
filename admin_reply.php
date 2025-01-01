<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = isset($_POST['user_id']) ? intval($_POST['user_id']) : null;
    $message = isset($_POST['message']) ? trim($_POST['message']) : null;

    if ($user_id && $message) {
        try {
            $stmt = $pdo->prepare("INSERT INTO chats (user_id, message, sender, created_at) 
                                   VALUES (:user_id, :message, 'admin', NOW())");
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':message', $message, PDO::PARAM_STR);

            if ($stmt->execute()) {
                header("Location: dashboard.php?user_id=" . $user_id);
                exit;
            } else {
                echo "Terjadi kesalahan saat menyimpan pesan.";
            }
        } catch (PDOException $e) {
            echo "Error: " . htmlspecialchars($e->getMessage());
        }
    } else {
        echo "User ID dan pesan wajib diisi!";
    }
} else {
    header("Location: dashboard.php");
    exit;
}
?>
