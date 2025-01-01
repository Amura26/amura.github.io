<?php
session_start();
include 'koneksi.php'; // Pastikan koneksi ke database berjalan

$error = ""; // Variabel untuk menyimpan pesan error

// Jika pengguna sudah login, redirect ke halaman sesuai role
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['role'] === 'admin') {
        header("Location: dashboard.php");
        exit();
    } elseif ($_SESSION['role'] === 'user') {
        header("Location: home.php");
        exit();
    }
}

// Proses login
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $username = trim(htmlspecialchars($_POST['username']));
    $password = trim(htmlspecialchars($_POST['password']));

    if (!empty($username) && !empty($password)) {
        // Query ke database untuk mendapatkan user
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Set sesi dan redirect sesuai role
            session_regenerate_id(true); // Keamanan sesi
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] === 'admin') {
                header("Location: dashboard.php");
            } elseif ($user['role'] === 'user') {
                header("Location: home.php");
            }
            exit();
        } else {
            $error = "Username atau password salah!";
        }
    } else {
        $error = "Harap isi semua field!";
    }
}

// Proses registrasi
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $username = trim(htmlspecialchars($_POST['username']));
    $password = trim(htmlspecialchars($_POST['password']));
    $confirm_password = trim(htmlspecialchars($_POST['confirm_password']));

    if (!empty($username) && !empty($password) && !empty($confirm_password)) {
        if ($password === $confirm_password) {
            // Periksa apakah username sudah digunakan
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $count = $stmt->fetchColumn();

            if ($count > 0) {
                $error = "Username sudah digunakan, silakan pilih username lain.";
            } else {
                // Hash password dan simpan data
                $password_hash = password_hash($password, PASSWORD_BCRYPT);

                $stmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (:username, :password, 'user')");
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $password_hash);

                if ($stmt->execute()) {
                    header("Location: login.php");
                    exit();
                } else {
                    $error = "Pendaftaran gagal, coba lagi.";
                }
            }
        } else {
            $error = "Password dan konfirmasi password tidak cocok!";
        }
    } else {
        $error = "Harap isi semua field!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login dan Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="form-container">
        <!-- Menampilkan error jika ada -->
        <?php if (!empty($error)): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <!-- Form Login -->
        <form method="POST" class="form-section" id="login-form">
            <h2>Login</h2>
            <p>Masuk untuk mulai konsultasi</p>
            <div class="input-group">
                <i class="fa fa-user"></i>
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <i class="fa fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="button-group">
                <a href="#" onclick="showRegister()">Daftar</a>
                <button type="submit" name="login">Masuk</button>
            </div>
        </form>

        <!-- Form Register -->
        <form method="POST" class="form-section hidden" id="register-form">
            <h2>Register</h2>
            <p>Buat akun untuk mulai konsultasi</p>
            <div class="input-group">
                <i class="fa fa-user"></i>
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <i class="fa fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="input-group">
                <i class="fa fa-lock"></i>
                <input type="password" name="confirm_password" placeholder="Konfirmasi Password" required>
            </div>
            <div class="button-group">
                <a href="#" onclick="showLogin()">Login</a>
                <button type="submit" name="register">Daftar</button>
            </div>
        </form>
    </div>

    <script>
        function showLogin() {
            document.getElementById('login-form').classList.remove('hidden');
            document.getElementById('register-form').classList.add('hidden');
        }

        function showRegister() {
            document.getElementById('login-form').classList.add('hidden');
            document.getElementById('register-form').classList.remove('hidden');
        }
    </script>
</body>
</html>
