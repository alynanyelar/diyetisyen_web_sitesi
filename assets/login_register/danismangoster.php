<?php
session_start();
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

if (isset($_GET['kullanici'])) {
    $kullanici = $_GET['kullanici'];

    // Kullanıcıya ait verileri seçme sorgusu
    $query = "SELECT dadi, demail, dnot, dsaati, dphone FROM dytlogin WHERE kullanicilar = '$kullanici'";

    // Sorguyu çalıştırma
    $result = $conn->query($query);

    // Sonuçları işleme
    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = array(
                'dadi' => $row['dadi'],
                'demail' => $row['demail'],
                'dnot' => $row['dnot'],
                'dsaati' => $row['dsaati'],
                'dphone' => $row['dphone']
            );
        }
    } else {
        echo 'Danışman bilgisi bulunamadı.';
    }
} else {
    $kullanici = "Bilinmeyen Kullanıcı"; // Varsayılan değer
    echo "Kullanıcı parametresi bulunamadı.";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>RANDEVULAR</title>
  <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
  <h1>RANDEVULAR  -  <?php echo $kullanici; ?></h1>
  <nav>
    <ul>
      <li onclick="window.location.href='diyetform.php?kullanici=<?php echo $_GET['kullanici'];?>';" style="cursor: pointer;" class="no-underline">Randevu oluştur</li>
    </ul>
        <ul>
      <li onclick="window.location.href='login.html';" style="cursor: pointer;" class="no-underline">Giriş sayfasına dön</li>
    </ul>
  </nav>
  <br>
  <table id="data-table">
    <tr>
      <th>Danışman Adı</th>
      <th>Danışman Mail</th>
      <th>Danışman Not</th>
      <th>Randevu Saati</th>
      <th>Danışman Telefon</th>
    </tr>
    <tr>
      <?php if (!empty($data) && is_array($data)) : ?>
          <?php foreach ($data as $danisman) : ?>
              <td><?php echo $danisman['dadi']; ?></td>
              <td><?php echo $danisman['demail']; ?></td>
              <td><?php echo $danisman['dnot']; ?></td>
              <td><?php echo $danisman['dsaati']; ?></td>
              <td><?php echo $danisman['dphone']; ?></td>
          <?php endforeach; ?>
      <?php endif; ?>
    </tr>
  </table>
</body>
</html>
