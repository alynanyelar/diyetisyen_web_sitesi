<?php
$servername = "localhost"; // Sunucu adı veya IP adresi
$username = "root"; // Veritabanı kullanıcı adı
$password = ""; // Veritabanı şifresi
$dbname = "dyt"; // Veritabanı adı

try {
    // PDO bağlantısı oluşturma
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Hata modunu ayarlama
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Formdan gelen verileri alalım
    $ad = $_POST['ad'];
    $eposta = $_POST['eposta'];
    $telefon = $_POST['telefon'];
    $yas = $_POST['yas'];
    $cinsiyet = $_POST['cinsiyet'];
    $kilo = $_POST['kilo'];
    $boy = $_POST['boy'];
    $hedef_kilo = $_POST['hedef_kilo'];
    $aktivite = $_POST['aktivite'];
    $saglik_durumu = $_POST['saglik_durumu'];
    $ogun_sayisi = $_POST['ogun_sayisi'];
    $notlar = $_POST['notlar'];

    // SQL sorgusu oluşturma
    $sql = "INSERT INTO diyet_formu (ad, eposta, telefon, yas, cinsiyet, kilo, boy, hedef_kilo, aktivite, saglik_durumu, ogun_sayisi,  notlar)
            VALUES ('$ad', '$eposta', '$telefon', '$yas', '$cinsiyet', '$kilo', '$boy', '$hedef_kilo', '$aktivite', '$saglik_durumu', '$ogun_sayisi', '$notlar')";

    // Sorguyu veritabanına gönderme
    $conn->exec($sql);

    // Başarılı sayfasına yönlendirme
    header("Location: basarili.html");
    exit;

} catch(PDOException $e) {
    echo "Hata: " . $e->getMessage();
}

// Veritabanı bağlantısını kapatma
$conn = null;
?>
