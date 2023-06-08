<?php
// Veritabanı bağlantısı
$servername = "localhost"; // Sunucu adı veya IP adresi
$username = "root"; // Veritabanı kullanıcı adı
$password = ""; // Veritabanı şifresi
$dbname = "dyt"; // Veritabanı adı
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol etme
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}

// Tüm verileri seçme sorgusu
$query = "SELECT * FROM diyet_formu";

// Sorguyu çalıştırma
$result = $conn->query($query);

// Sonuçları işleme
$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = array(            
            'ad' => $row['ad'],
            'eposta' => $row['eposta'],
            'telefon' => $row['telefon'],
            'yas' => $row['yas'],
            'cinsiyet' => $row['cinsiyet'],
            'kilo' => $row['kilo'],
            'boy' => $row['boy'],
            'hedef_kilo' => $row['hedef_kilo'],
            'aktivite' => $row['aktivite'],
            'saglik_durumu' => $row['saglik_durumu'],
            'ogun_sayisi' => $row['ogun_sayisi'],
            'notlar' => $row['notlar']
        );
    }
}

// Veritabanı bağlantısını kapatma
$conn->close();

// JSON olarak veriyi döndürme
header('Content-Type: application/json');
echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>
