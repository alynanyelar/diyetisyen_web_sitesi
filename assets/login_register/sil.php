<?php
session_start();
// MySQL veritabanı bağlantısı için gerekli bilgileri girin
$servername = "localhost";  // Sunucu adı veya IP adresi
$username = "root";         // Veritabanı kullanıcı adı
$password = "";     // Veritabanı şifresi
$dbname = "dyt";            // Veritabanı adı

$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantı kontrolü
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}

// POST isteğiyle gelen e-posta adresi
$email = $_POST["email"];

// E-posta adresiyle eşleşen satırı silme sorgusu
$sql = "DELETE FROM diyet_formu WHERE eposta = '$email'";

if ($conn->query($sql) === TRUE) {
    // Randevu başarıyla silindi
    $_SESSION['notification'] = "Veri başarıyla silindi.";
} else {
    $_SESSION['notification'] = "Hata: " . $conn->error;
}

// Veritabanı bağlantısını kapat
$conn->close();

// Yönlendirme yap
header("Location: dashboard.html");
exit();
?>