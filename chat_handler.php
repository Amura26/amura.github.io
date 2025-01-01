<?php
session_start();
include 'koneksi.php'; // Pastikan file koneksi database benar

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Anda harus login terlebih dahulu.']);
    exit;
}

$user_id = $_SESSION['user_id'];
$data = json_decode(file_get_contents("php://input"), true);
$message = $data['message'] ?? '';

// Cek jika pesan kosong
if (trim($message) === '') {
    echo json_encode(['status' => 'error', 'message' => 'Pesan tidak boleh kosong']);
    exit;
}

// Masukkan pesan pengguna ke dalam database
$stmt = $pdo->prepare("INSERT INTO chats (user_id, message, sender) VALUES (:user_id, :message, 'user')");
$stmt->bindParam(':user_id', $user_id);
$stmt->bindParam(':message', $message);
$stmt->execute();

$faq = [
    [
        'question' => 'apa itu radang tenggorokan?',
        'response' => 'Radang tenggorokan adalah peradangan pada bagian tenggorokan yang menyebabkan rasa sakit, perih, atau gatal. Penyebabnya bisa berupa infeksi virus atau bakteri.',
        'keywords' => ['radang', 'tenggorokan'],
    ],
    [
        'question' => 'bagaimana cara merawat telinga?',
        'response' => 'Untuk merawat telinga, hindari penggunaan cotton bud, bersihkan telinga dengan hati-hati menggunakan kain lembut, dan jangan memasukkan benda asing ke dalam telinga.',
        'keywords' => ['merawat', 'telinga'],
    ],
    [
        'question' => 'kenapa hidung tersumbat?',
        'response' => 'Hidung tersumbat bisa disebabkan oleh pilek, alergi, atau infeksi sinus. Jika berlanjut lebih dari seminggu, sebaiknya konsultasikan dengan dokter.',
        'keywords' => ['hidung', 'tersumbat'],
    ],
    [
        'question' => 'bagaimana cara mencegah pilek?',
        'response' => 'Untuk mencegah pilek, jaga kebersihan tangan, hindari kontak dengan orang yang sedang sakit, dan konsumsi makanan bergizi untuk meningkatkan daya tahan tubuh.',
        'keywords' => ['mencegah', 'pilek'],
    ],
    [
        'question' => 'tips menjaga kesehatan tenggorokan',
        'response' => 'Minum banyak air, hindari merokok, konsumsi makanan hangat, dan jaga kelembapan udara di sekitar Anda.',
        'keywords' => ['kesehatan', 'tenggorokan'],
    ],
    [
        'question' => 'kapan perlu konsultasi ke dokter THT?',
        'response' => 'Anda perlu konsultasi ke dokter THT jika mengalami gejala seperti sakit tenggorokan berkepanjangan, gangguan pendengaran, hidung tersumbat kronis, atau gangguan pada saluran pernapasan bagian atas.',
        'keywords' => ['konsultasi', 'dokter', 'THT'],
    ],
    [
        'question' => 'apa yang dilakukan dokter THT?',
        'response' => 'Dokter THT adalah spesialis yang menangani masalah pada telinga, hidung, dan tenggorokan. Mereka juga menangani gangguan terkait kepala dan leher, seperti alergi atau infeksi.',
        'keywords' => ['dokter', 'THT'],
    ],
    [
        'question' => 'bagaimana persiapan sebelum konsultasi ke dokter THT?',
        'response' => 'Sebelum konsultasi ke dokter THT, siapkan riwayat medis Anda, catat gejala yang dirasakan, dan buat daftar pertanyaan untuk dokter.',
        'keywords' => ['persiapan', 'konsultasi', 'dokter', 'THT'],
    ],
];
// Sistem probabilitas untuk menentukan respons terbaik
$response = '';
$highest_probability = 0; // Nilai awal probabilitas tertinggi

foreach ($faq as $entry) {
    $keywords = $entry['keywords'];
    $matches = 0;

    // Hitung jumlah kata kunci yang cocok
    foreach ($keywords as $keyword) {
        if (stripos($message, $keyword) !== false) {
            $matches++;
        }
    }

    // Hitung probabilitas
    $probability = $matches / count($keywords);

    // Simpan respons dengan probabilitas tertinggi
    if ($probability > $highest_probability) {
        $highest_probability = $probability;
        $response = $entry['response'];
    }
}

// Jika tidak ada kecocokan, gunakan respons default
if ($highest_probability == 0) {
    $response = 'Maaf, saya tidak mengerti pertanyaan Anda. Coba tanyakan tentang kesehatan telinga, hidung, atau tenggorokan. Tunggu sampai dokter membalas permasalahan anda.';
}

// Masukkan jawaban chatbot ke dalam database
$stmt = $pdo->prepare("INSERT INTO chats (user_id, message, sender) VALUES (:user_id, :message, 'admin')");
$stmt->bindParam(':user_id', $user_id);
$stmt->bindParam(':message', $response);
$stmt->execute();

// Kirimkan respons chatbot
echo json_encode(['status' => 'success', 'message' => $response]);
exit;
?>
