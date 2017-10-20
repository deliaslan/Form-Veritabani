<?php
/**
 * Created by PhpStorm.
 * User: deliaslan
 * Date: 20.10.2017
 * Time: 00:00
 * Project Name: Form-PDO
 * File Name: form.php
 */
include_once 'baglan.php';
?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h1>Veritabanına PDO İle Kayıt İşlemleri</h1>
<form action="islem.php" method="post">
    Adınız: <input type="text" name="ad" placeholder="Adınızı Yazınız">
    <br>
    Soyadınız: <input type="text" name="soyad" placeholder="Soyadınızı Yazınız">
    <br>
    Yaşınız: <input type="number" name="yas" placeholder="Yaşınızı Giriniz">
    <br>
    Cinsiyetiniz: <input type="text" name="cinsiyet" placeholder="Cinsiyetinizi Giriniz">
    <br>
    Medeni Durumunuz: <input type="text" name="medeni_durum" placeholder="Medeni Durumunuzu Giriniz">
    <br>
    <input type="submit" name="kaydet" value="Kaydet">
</form>
<br>
<?php
if($_GET['durum']=="true"){
    echo "Kayıt işlemi başarılı";
}
elseif($_GET['durum']=="false"){
    echo "Kayıt Gerçekleştirilemedi";
}
?>

<!--SELECT İŞLEMİ PDO çoğul -->
<?php
$sorgu= $db->prepare("SELECT * FROM banaozel");
$sorgu->execute();
while($veriAl=$sorgu->fetch(PDO::FETCH_ASSOC)){
    echo "<pre>";
    print_r($veriAl);
    echo "</pre>";
}


?>

<!--SELECT İŞLEMİ PDO istenilen alanların seçimi -->
<?php
$sorgu= $db->prepare("SELECT * FROM banaozel");
$sorgu->execute();
while($veriAl=$sorgu->fetch(PDO::FETCH_ASSOC)){

    echo $veriAl['ad']." ".$veriAl['soyad'];
    echo "<br>";
}


?>
</body>
</html>
