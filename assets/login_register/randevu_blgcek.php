<?php
// Veritabanı bağlantısı
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dyt";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Veritabanına bağlanılamadı: " . $conn->connect_error);
}

// Sorgu
$sql = "SELECT email FROM dytlogin";
$result = $conn->query($sql);

$veri = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $veri[] = $row["email"];
    }
}

// JSON verisini döndürme
header("Content-type: application/json");
echo json_encode($veri);

$conn->close();
?>