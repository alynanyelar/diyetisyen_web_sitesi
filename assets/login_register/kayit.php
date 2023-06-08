<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dyt";

try {
    // PDO bağlantısı oluşturma
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Formdan gelen verileri alalım
    $username = $_POST['kyusername'];
    $password = $_POST['kypassword'];
    $email = $_POST['kyemail'];

    // Kullanıcıyı veritabanına ekleme
    $stmt = $conn->prepare("INSERT INTO dytlogin (kullanicilar, sifre, email) VALUES (:username, :password, :email)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Kayıt başarılı ise giriş sayfasına yönlendirme
    header("Location: kayitbasarili.html");
    exit;
} catch (PDOException $e) {
    // Hata durumunda hata mesajını gösterme
    echo "Hata: " . $e->getMessage();
}

// Veritabanı bağlantısını kapatma
$conn = null;
?>
