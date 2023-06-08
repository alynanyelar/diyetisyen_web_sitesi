<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Online Diyet Formu</title>
    <link rel="stylesheet" href="css\dytform.css" />
    <link rel="stylesheet" href="css\dashboard.css">
</head>
<body>
<?php
    // Get the value of the "kullanici" parameter from the URL
    $kullanici = $_GET['kullanici'];
?>
<script>
    // JavaScript code to retrieve and display the GET parameter
    document.addEventListener("DOMContentLoaded", function() {
        // Update the HTML content with the retrieved value
        const kullaniciElement = document.getElementById("kullanici");
        kullaniciElement.textContent = "<?php echo $kullanici; ?>";
    });
</script>
<h1>RANDEVU OLUŞTUR -  <?php echo $kullanici; ?></h1>
<form action="btn">
    <nav>
        <ul>
            <li onclick="window.location.href='danismangoster.php?kullanici=<?php echo $kullanici; ?>';" style="cursor: pointer;" class="no-underline">Randevu sayfasına dön</li>
        </ul>
    </nav>
</form><br>
<div class="form-wrapper">
    <form action="diyet_programi.php" method="POST">
        <label for="ad">Adınız:</label>
        <input type="text" id="ad" name="ad" required /><br /><br />

        <label for="eposta">E-posta adresiniz:</label>
        <input type="email" id="eposta" name="eposta" required /><br /><br />

        <label for="telefon">Telefon numaranız:</label>
        <input type="tel" id="telefon" name="telefon" required /><br /><br />

        <label for="yas">Yaşınız:</label>
        <input type="number" id="yas" name="yas" required /><br /><br />

        <label for="cinsiyet">Cinsiyetiniz:</label>
        <select id="cinsiyet" name="cinsiyet" required>
            <option value="">Seçiniz</option>
            <option value="erkek">Erkek</option>
            <option value="kadın">Kadın</option>
        </select><br /><br />

        <label for="kilo">Kilo:</label>
        <input type="number" id="kilo" name="kilo" required /><br /><br />

        <label for="boy">Boy:</label>
        <input type="number" id="boy" name="boy" required /><br /><br />

        <label for="hedef_kilo">Hedeflenen Kilo:</label>
        <input type="number" id="hedef_kilo" name="hedef_kilo" required /><br /><br />

        <label for="aktivite">Fiziksel Aktivite Seviyesi:</label>
        <select id="aktivite" name="aktivite" required>
            <option value="">Seçiniz</option>
            <option value="1">Oturarak çalışma, egzersiz yapmıyorum.</option>
            <option value="2">Hafif egzersiz yapıyorum (haftada 1-3 kez).</option>
            <option value="3">Orta düzeyde egzersiz yapıyorum (haftada 3-5 kez).</option>
            <option value="4">Ağır egzersiz yapıyorum (haftada 6-7 kez).</option>
        </select><br /><br />

        <label for="saglik_durumu">Sağlık Durumu:</label>
        <select id="saglik_durumu" name="saglik_durumu" required>
            <option value="">Seçiniz</option>
            <option value="1">Herhangi bir sağlık sorunu yok.</option>
            <option value="2">Diyabet hastasıyım.</option>
            <option value="3">Kalp hastalığına sahibim.</option>
            <option value="4">Tiroid sorunlarım var.</option>
            <option value="5">Diğer</option>
        </select><br /><br />

        <label for="ogun_sayisi">Günlük Öğün Sayısı:</label>
        <select id="ogun_sayisi" name="ogun_sayisi" required>
            <option value="">Seçiniz</option>
            <option value="1">3 öğün (kahvaltı, öğle, akşam)</option>
            <option value="2">4 öğün (kahvaltı, ara öğün, öğle, akşam)</option>
            <option value="3">5 öğün (kahvaltı, ara öğün, öğle, ara öğün, akşam)</option>
        </select><br /><br />

        <label for="notlar">Notlar:</label><br />
        <textarea id="notlar" name="notlar" rows="4" cols="50"></textarea><br /><br />

        <input type="submit" value="Formu Gönder" />
    </form>
</div>
</body>
</html>
