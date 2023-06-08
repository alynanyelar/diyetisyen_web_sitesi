<?php
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

// Veriyi çekme sorgusu
$sql = "SELECT * FROM dytlogin";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Sonuçları JSON formatına dönüştürme
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    $json_data = json_encode($rows);

    // JSON verisini çıktı olarak döndürme
    header('Content-Type: application/json');
    echo $json_data;
} else {
    echo "Veri bulunamadı.";
}

// Veritabanı bağlantısını kapat
$conn->close();
?>