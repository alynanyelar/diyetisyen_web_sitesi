<?php
// MySQL veritabanı bağlantısı için gerekli bilgileri girin
$servername = "localhost";  // Sunucu adı veya IP adresi
$username = "root";         // Veritabanı kullanıcı adı
$password = "";     // Veritabanı şifresi
$dbname = "dyt";            // Veritabanı adı

// MySQL veritabanına bağlanma
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantı hatasını kontrol etme
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// POST verilerini alın
$enteredUsername = $_POST['username1'];
$enteredPassword = $_POST['password2'];

// Kullanıcı adı ve şifreyi veritabanında kontrol etme
$sql = "SELECT * FROM yntlogin WHERE yntusername = '$enteredUsername' AND yntpassword = '$enteredPassword'";
$result = $conn->query($sql);

// Eğer sonuç döndüyse ve kullanıcı doğru ise form1.html sayfasına yönlendir
if ($result->num_rows == 1) {
    header("Location: dashboard.html"); //buraya yöntici dashboard sayfası bağlanıcak
    exit;
}else {
    echo "Hatalı kullanıcı adı veya şifre";
}

// Veritabanı bağlantısını kapatma
$conn->close();
?>