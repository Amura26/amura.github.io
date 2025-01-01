<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Kami</title>
    <style>
        /* CSS untuk layanan kami */

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
        }

        .header {
            background-color: rgb(14, 4, 50);
            color: white;
            padding: 20px 10px;
            text-align: center;
            position: relative;
        }

        .nav-back {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            background-color: white;
            color: rgb(14, 4, 50);
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
        }

        .nav-back:hover {
            background-color: rgba(255, 255, 255, 0.9);
            color: #007BFF;
        }

        .content {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .article h2 {
            color: rgb(0, 42, 255);
            margin-top: 20px;
        }

        .article ul {
            margin: 10px 0;
            padding-left: 20px;
        }

        .article ul li {
            margin-bottom: 10px;
        }

        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header class="header">
        <!-- Tautan navigasi untuk kembali -->
        <a href="javascript:history.back()" class="nav-back">Kembali</a>
        <h1>Layanan Kami</h1>
    </header>

    <main class="content">
        <article class="article">
            <h2>Layanan Unggulan</h2>
            <p>Kami menyediakan berbagai layanan kesehatan yang dirancang untuk memenuhi kebutuhan Anda, termasuk:</p>
            <ul>
                <li>Pemeriksaan kesehatan rutin.</li>
                <li>Konsultasi dengan spesialis.</li>
                <li>Layanan diagnostik seperti tes laboratorium dan pencitraan medis.</li>
                <li>Tindakan medis darurat dan non-darurat.</li>
            </ul>

            <h2>Layanan Khusus</h2>
            <p>Selain layanan umum, kami juga memiliki layanan khusus seperti:</p>
            <ul>
                <li>Perawatan kesehatan ibu dan anak.</li>
                <li>Rehabilitasi medis.</li>
                <li>Program manajemen penyakit kronis.</li>
                <li>Kesehatan mental dan psikoterapi.</li>
            </ul>

            <p>Kami berkomitmen untuk memberikan layanan terbaik dengan dukungan tim medis profesional dan peralatan modern.</p>
        </article>
    </main>

    <footer class="footer">
        <p>&copy; 2024 KonsultasiYuk. Semua Hak Dilindungi.</p>
    </footer>
</body>
</html>
