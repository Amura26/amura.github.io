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
            line-height: 1.6;
        }

        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: #ffffff;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
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
            margin: 0 10px;
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
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
        }

        .navbar .cta:hover {
            background-color: #0056b3;
        }

        .hero {
            position: relative;
            background: url('img/banneranyar.jpg') no-repeat center center/cover;
            height: 400px;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding: 20px;
            margin-top: 60px;
        }

        .hero h1 {
            font-size: 2.2rem;
            margin: 20px 0;
            color: black;
        }

        .hero p {
            font-size: 1rem;
            max-width: 600px;
            color: darkslateblue;
        }

        .containerlayanan {
            padding: 20px;
            text-align: center;
        }

        .containerlayanan h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .sectionlyn {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            text-align: center;
            gap: 15px;
        }

        .sectionlyn div {
            flex: 1 1 100%;
            max-width: 300px;
            padding: 20px;
        }

        .sectionlyn i {
            font-size: 40px;
            color: #800020;
            margin-bottom: 10px;
        }

        .sectionlyn h2 {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .containertentang {
            padding: 20px;
            background-color: #f0f8ff;
            text-align: center;
        }

        .containertentang h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            font-weight: bold;
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
            width: 100%;
            max-width: 280px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .chat-dokter-container {
            padding: 20px;
            background-color: #f9f9f9;
            text-align: center;
        }

        .chat-dokter-container h1 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .chat-box {
            max-width: 100%;
            width: 90%;
            margin: 0 auto;
        }

        @media (min-width: 768px) {
            .hero {
                height: 500px;
            }

            .hero h1 {
                font-size: 3rem;
            }

            .hero p {
                font-size: 1.2rem;
            }

            .sectionlyn div {
                flex: 1 1 30%;
            }

            .sectiontentang div {
                width: 280px;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <img src="img/logo.png" alt="Logo">
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#layanan">Layanan</a></li>
            <li><a href="#tentang-tht">Tentang</a></li>
            <li><a href="#chat-dokter">Chat Dokter</a></li>
        </ul>
        <a class="cta" href="login.php">Masuk/Daftar</a>
    </div>

    <div id="home" class="hero">
        
        <p>Nikmati layanan konsultasi online gratis tanpa ribet, dan sesuai kebutuhan Anda. Dokter profesional kami siap memberikan solusi.</p>
    </div>

    <div class="containerlayanan" id="layanan">
        <h1>Layanan Kami</h1>
        <div class="sectionlyn">
            <div>
                <i class="fas fa-ear-listen"></i>
                <h2>Konsultasi Telinga</h2>
                <p>Dokter spesialis THT akan membantu Anda mengatasi gangguan pendengaran, infeksi, dan kondisi lainnya.</p>
            </div>
            <div>
                <i class="fas fa-head-side-mask"></i>
                <h2>Konsultasi Hidung</h2>
                <p>Dokter spesialis akan memberikan solusi terbaik untuk gangguan hidung seperti alergi, sinusitis, atau lainnya.</p>
            </div>
            <div>
                <i class="fas fa-head-side-cough"></i>
                <h2>Konsultasi Tenggorokan</h2>
                <p>Mencakup diagnosis dan pengobatan penyakit pada tenggorokan seperti radang atau infeksi.</p>
            </div>
        </div>
    </div>

    <div class="containertentang" id="tentang-tht">
        <h1>Tentang Kami</h1>
        <div class="sectiontentang">
            <div>
                <i class="fas fa-user-md"></i>
                <h2>Spesialis THT</h2>
                <p>Kami adalah tim dokter spesialis THT yang berpengalaman menangani berbagai masalah kesehatan.</p>
            </div>
            <div>
                <i class="fas fa-handshake"></i>
                <h2>Komitmen Kami</h2>
                <p>Kami berkomitmen memberikan layanan terbaik dengan pendekatan profesional dan empati.</p>
            </div>
            <div>
                <i class="fas fa-comments"></i>
                <h2>Layanan Konsultasi</h2>
                <p>Kami menyediakan konsultasi langsung maupun daring untuk membantu Anda mendapatkan solusi.</p>
            </div>
        </div>
    </div>

    <div class="chat-dokter-container" id="chat-dokter">
        <h1>Chat dengan Dokter</h1>
        <div class="chat-box">
            <div class="chat-header">
                <h2>Chat dengan Dokter Spesialis</h2>
            </div>
            <div class="chat-messages">
                <div class="message bot-message">Halo! Saya dokter virtual Anda. Bagaimana saya bisa membantu?</div>
            </div>
        </div>
    </div>
</body>
</html>
