<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KonsultasiYuk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <img src="img/logo.png" alt="Logo" height="40" width="40">
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#layanan">Layanan</a></li>
            <li><a href="#tentang-tht">Tentang</a></li>
            <li><a href="chat_dokter.php">Chat Dokter</a></li>
        </ul>
        <a class="cta" href="logout.php" class="logout-btn">Logout</a>
    </div>

    <div id="home" class="hero">
        <span class="badge">Jaminan Kerahasiaan Data</span>
        <span class="badge">100% Aman</span>
        <h1>Konsultasi Kesehatan Diri Anda</h1>
        <p>
            Nikmati layanan konsultasi online gratis tanpa ribet, dan sesuai kebutuhan Anda. 
            Dokter profesional kami siap memberikan solusi 
        </p>
    </div>

    <div class="containerlayanan" id="layanan">
    <h1 allign="">Layanan Kami</h1>
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

     <section id="main" align="center">
    <div>
        <h1>Welcome to KonsultasiYuk</h1>
    </div>
</section>
    <footer id="#chat-dokter">
        <?php include 'footer.php'; ?>
    </footer>
    <script src="script.js">ss</script>
</body>
</html>