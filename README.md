<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KonsultasiYuk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
    margin: 0;
    font-family: 'Roboto', sans-serif;
}

.navbar {
    position: fixed; /* Tetap di atas saat scroll */
    top: 0; /* Melekat di bagian atas */
    width: 100%; /* Memenuhi lebar layar */
    background-color: #ffffff; /* Warna background navbar */
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Tambahkan bayangan untuk efek floating */
    z-index: 1000; /* Pastikan navbar berada di atas elemen lain */
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 20px; /* Jarak dalam navbar */
    transition: background-color 0.3s ease;
}

.navbar img {
    height: 40px;
}

.navbar ul {
    list-style: none;
    display: flex;
    margin: 0;
    padding: 0;
}

.navbar ul li {
    margin: 0 15px;
}

.navbar ul li a {
    text-decoration: none;
    color: #333;
    font-weight: 500;
}

.navbar ul li a:hover {
    color: #007bff;
}

.navbar .cta {
    background-color: #6A5ACD;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
}

.navbar .cta:hover {
    background-color: #0056b3;
}

.hero {
    position: relative;
    background: url('img/banneranyar.jpg') no-repeat center center/cover;
    background-position: center 20%;
    height: 500px;
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    padding: 0 20px;
    margin-top: 60px; /* Sesuaikan dengan tinggi navbar */
}



.hero .badge {
    background-color: #28a745;
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
    font-size: 14px;
    margin-top: 10px;
}

.hero h1 {
    font-size: 48px;
    margin: 50px 0;
    color: black;
    font-family: 'Times New Roman', Times, serif;
}

.hero p {
    font-size: 18px;
    max-width: 600px;
    color: darkslateblue;
}
.containerlayanan {
    padding: 50px;
    text-align: center; 
}

.containerlayanan h1 {
    font-size: 2.5em; 
    margin-bottom: 30px; 
    font-weight: bold; 
}


.sectionlyn {
    display: flex;
    justify-content: space-around;
    text-align: center;
}

.sectionlyn div {
    width: 30%;
}

.sectionlyn i {
    font-size: 50px;
    color: #800020;
    margin-bottom: 20px;
}

.sectionlyn h2 {
    font-size: 24px;
    margin-bottom: 20px;
}

.sectionlyn p {
    font-size: 16px;
    line-height: 1.5;
}
.sectionlyn i {
    font-size: 40px;
    color: white;
    margin-bottom: 10px;
}

.containertentang {
    padding: 40px 20px;
    background-color: #f0f8ff;
    text-align: center;
}

.containertentang h1 {
    font-size: 2.5em;
    color: #333;
    margin-bottom: 30px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.sectiontentang {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

.sectiontentang div {
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    width: 280px;
}

.sectiontentang div:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
}

.sectiontentang div i {
    font-size: 50px;
    color: black;
    margin-bottom: 10px;
    display: block;
}

.sectiontentang h2 {
    font-size: 1.5em;
    color: #222;
    margin: 15px 0 10px;
    font-weight: bold;
}

.sectiontentang p {
    font-size: 1em;
    color: #666;
    line-height: 1.6;
    margin: 0;
}

@media (max-width: 768px) {
    .sectiontentang {
        flex-direction: column;
        align-items: center;
    }

    .sectiontentang div {
        width: 90%;
    }
}

.chat-dokter-container {
    padding: 40px 20px;
    background-color: #f9f9f9;
    min-height: 100vh;
    text-align: center;
}

.chat-dokter-container h1 {
    font-size: 2.5em;
    color: #333;
    margin-bottom: 30px;
} 
.loginchat {
    text-align: center; /* Pusatkan teks */
    background-color: #f9f9f9; /* Warna latar belakang */
    border: 1px solid #ddd; /* Garis tepi */
    padding: 20px; /* Spasi dalam */
    margin: 20px auto; /* Margin luar */
    border-radius: 8px; /* Sudut melengkung */
    max-width: 400px; /* Lebar maksimal */
    font-family: 'Roboto', sans-serif; /* Font yang konsisten */
    color: #333; /* Warna teks */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Bayangan lembut */
}

.loginchat a {
    color: #007bff; /* Warna biru untuk tautan */
    text-decoration: none; /* Hilangkan garis bawah */
    font-weight: bold; /* Tebalkan teks tautan */
}

.loginchat a:hover {
    text-decoration: underline; /* Garis bawah saat hover */
    color: #0056b3; /* Warna biru lebih gelap saat hover */
}

.chat-box {
    max-width: 600px;
    margin: 0 auto;
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.chat-header {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    font-size: 1.2em;
    font-weight: bold;
    text-align: center;
}

.chat-messages {
    max-height: 400px;
    overflow-y: auto;
    padding: 20px;
    background-color: #f5f5f5;
}

.message {
    margin: 10px 0;
    padding: 10px 15px;
    border-radius: 10px;
    max-width: 70%;
}

.bot-message {
    background-color: #007bff;
    color: #fff;
    align-self: flex-start;
}

.user-message {
    background-color: #28a745;
    color: #fff;
    align-self: flex-end;
    margin-left: auto;
}

.chat-input {
    display: flex;
    padding: 10px;
    border-top: 1px solid #ddd;
}

.chat-input input {
    flex: 1;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-right: 10px;
}

.chat-input button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.chat-input button:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    <div class="navbar">
        <img src="img/logo.png" alt="Logo" height="40" width="40">
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#layanan">Layanan</a></li>
            <li><a href="#tentang-tht">Tentang</a></li>
            <li><a href="#chat-dokter">Chat Dokter</a></li>
        </ul>
        <a class="cta" href="login.php">Masuk/Daftar</a>
    </div>

    <div id="home" class="hero">
        <span class="badge">Jaminan Kerahasiaan Data</span>
        <span class="badge">100% Aman</span>
        <h1>Konsultasi Kesehatan Diri Anda</h1>
        <p>
            Nikmati layanan konsultasi online gratis tanpa ribet, dan sesuai kebutuhan Anda. 
            Dokter profesional kami siap memberikan solusi.
        </p>
    </div>

    <div class="containerlayanan" id="layanan">
        <h1 align="center">Layanan Kami</h1>
        <div class="sectionlyn">
            <div>
                <i class="fas fa-ear-listen"></i>
                <h2>Konsultasi Telinga</h2>
                <p>Dokter spesialis THT akan membantu Anda mengatasi gangguan pendengaran, infeksi, dan kondisi lainnya yang memengaruhi telinga, serta menjaga kesehatan pendengaran secara keseluruhan.</p>
            </div>
            <div>
                <i class="fas fa-head-side-mask"></i>
                <h2>Konsultasi Hidung</h2>
                <p>Konsultasi Hidung berfokus pada kesehatan saluran pernapasan dan hidung. Dokter spesialis THT akan memberikan solusi terbaik untuk gangguan hidung seperti alergi, sinusitis, atau lainnya.</p>
            </div>
            <div>
                <i class="fas fa-head-side-cough"></i>
                <h2>Konsultasi Tenggorokan</h2>
                <p>Konsultasi Tenggorokan mencakup diagnosis dan pengobatan penyakit pada tenggorokan seperti radang, infeksi, atau gangguan suara, demi kesehatan optimal Anda.</p>
            </div>
        </div>
    </div>

    <div class="containertentang" id="tentang-tht">
        <h1>Tentang Kami</h1>
        <div class="sectiontentang">
        <a href="spesialis.php" style="text-decoration: none; color: inherit;">
        <div>
            <i class="fas fa-user-md"></i>
            <h2>Spesialis THT</h2>
            <p>Kami adalah tim dokter spesialis THT yang berpengalaman dalam menangani berbagai masalah kesehatan telinga, hidung, dan tenggorokan.</p>
        </div>
        </a>
        <a href="komitmen.php" style="text-decoration: none; color: inherit;">    
        <div>
                <i class="fas fa-handshake"></i>
                <h2>Komitmen Kami</h2>
                <p>Kami berkomitmen untuk memberikan layanan terbaik dengan pendekatan profesional dan empati kepada setiap pasien.</p>
            </div>
        </a>
        <a href="layanan.php" style="text-decoration: none; color: inherit;">    
            <div>
                <i class="fas fa-comments"></i>
                <h2>Layanan Konsultasi</h2>
                <p>Kami menyediakan konsultasi langsung maupun daring untuk membantu Anda dengan mudah mendapatkan solusi kesehatan.</p>
            </div>
        </a>
        </div>
    </div>

    <div class="chat-dokter-container" id="chat-dokter">
        <h1>Chat dengan Dokter</h1>
        <?php if (isset($isLoggedIn) && $isLoggedIn): ?>
            <div class="chat-box">
                <div class="chat-header">
                    <h2>Chat dengan Dokter Spesialis</h2>
                </div>
                <div class="chat-messages" id="chat-messages">
                    <div class="message bot-message">Halo! Saya dokter virtual Anda. Bagaimana saya bisa membantu?</div>
                </div>
                <form class="chat-input" onsubmit="sendMessage(event)">
                    <input type="text" id="user-message" placeholder="Tulis pesan Anda..." required>
                    <button type="submit"><i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
        <?php else: ?>
            <div class="loginchat">
            <p>Silakan <a href="login.php">login</a> untuk menggunakan layanan chat dengan dokter.</p>
            </div>
        <?php endif; ?>
    </div>

    <script src="script.js"></script>

    <footer id="footer">
        <?php include 'footer.php'; ?>
    </footer>
    <script src="script.js"></script>

</body>
</html>
