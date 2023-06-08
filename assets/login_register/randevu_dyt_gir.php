<?php
// Veritabanı bağlantısı yapılacak bilgileri buraya girin
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dyt";

// Veritabanı bağlantısını oluştur
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantayı kontrol et
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}

// POST verilerini al
$diyetisyenAdi = $_POST['ad'];
$diyetisyenEposta = $_POST['eposta'];
$diyetisyenTelefon = $_POST['telefon'];
$saat = $_POST['datetime'];
$notlar = $_POST['notlar'];
$gln_email = $_POST['gln_email'];

// Veritabanına ekleme sorgusu
$sql = "UPDATE dytlogin
        SET dadi = '$diyetisyenAdi',
            demail = '$diyetisyenEposta',
            dnot = '$notlar',
            dsaati = '$saat',
            dphone = '$diyetisyenTelefon'
        WHERE email = '$gln_email'";



if ($conn->query($sql) === TRUE) {
    header("Location: basarili2.html");
    exit;
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}

// Veritabanı bağlantısını kapat
$conn->close();
