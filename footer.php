<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #00008B;
        color: #FFFFFF;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .container {
        display: flex;
        justify-content: space-between;
        padding: 50px;
        flex-wrap: wrap;
    }

    .left-section {
        max-width: 50%;
        padding-right: 30px;
    }

    .left-section h1 {
        font-size: 36px;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .left-section p {
        font-size: 18px;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .button {
        display: inline-block;
        padding: 15px 30px;
        background-color: #00C853;
        color: #FFFFFF;
        font-size: 18px;
        font-weight: bold;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .button:hover {
        background-color: #007F34; 
    }

    .right-section {
        max-width: 40%;
        padding-left: 30px;
    }

    .right-section div {
        margin-bottom: 20px;
    }

    .right-section div span {
        display: block;
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .right-section div a {
        color: #00A8E8;
        font-size: 18px;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .right-section div a:hover {
        color: #007F6C; 
    }

    .right-section .social-icons a {
        color: #FFFFFF;
        font-size: 24px;
        margin-right: 15px;
        transition: color 0.3s ease;
    }

    .right-section .social-icons a:hover {
        color: #00A8E8; 
    }

    @media (max-width: 768px) {
        .container {
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 30px;
        
    }
        .left-section, .right-section {
            max-width: 100%;
            padding-right: 0;
            padding-left: 0;
        }

        .left-section h1 {
            font-size: 28px;
        }

        .left-section p {
            font-size: 16px;

        .button {
            padding: 12px 24px; 
            font-size: 16px; 
        }

        .right-section .social-icons a {
            font-size: 20px
            margin-right: 10px; 
        }
    }
    </style>
</head>
<body>
    <?php
        $contactInfo = [
            'email' => 'hello@google.com',
            'phone' => '+628141321341',
            'address' => [
                'line1' => 'Jl Veteran 53A, Jetis',
                'line2' => 'Jawa Timur',
                'city' => 'Lamongan, 62211',
            ],
            'socials' => [
                    'facebook' => 'https://www.facebook.com/Adit Eka Putra',
                    'instagram' => 'https://www.instagram.com/aditpptr_',
                ],
            ];
    ?>
    <div class="container">
        <div class="left-section">
            <h1>Mari Berbicara</h1>
            <p>Semua Hak Dilindungi. Temukan solusi kesehatan terbaik bersama dokter terpercaya kami, kapan saja dan di mana saja. Kami berkomitmen untuk memberikan layanan konsultasi yang aman, nyaman, dan mudah diakses untuk mendukung kesehatan Anda. Privasi Anda adalah prioritas utama kami, dan semua informasi dijamin kerahasiaannya sesuai kebijakan privasi kami."</p>
            <a href="#" class="button">Tell us about your project</a>
        </div>
        <div class="right-section">
            <div>
                <span>Email</span>
                <a href="mailto:<?= $contactInfo['email']; ?>"><?= $contactInfo['email']; ?></a>
            </div>
            <div>
                <span>Phone</span>
                <a href="tel:<?= $contactInfo['phone']; ?>">(<?= $contactInfo['phone']; ?>)</a>
            </div>
            <div>
                <span>Address</span>
                <p>
                    <?= $contactInfo['address']['line1']; ?><br>
                    <?= $contactInfo['address']['line2']; ?><br>
                    <?= $contactInfo['address']['city']; ?>
                </p>
            </div>
            <div class="social-icons">
                <a href="<?= $contactInfo['socials']['facebook']; ?>"><i class="fab fa-facebook-f"></i></a>
                <a href="<?= $contactInfo['socials']['instagram']; ?>"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</body>
</html>
