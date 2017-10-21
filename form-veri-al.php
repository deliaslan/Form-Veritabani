<?php
/**
 * Created by PhpStorm.
 * User: deliaslan
 * Date: 21.10.2017
 * Time: 17:36
 * Project Name: Form-PDO
 * File Name: form-veri-al.php
 */
include_once 'baglan.php';
?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Veritabanından bilgileri çekme/ Düzenleme yani edit amaçlı kullanım</title>
</head>
<body>
<h1>Veritabanına PDO İle Güncelleme İşlemi</h1>
<?php
$id=5;
//id'ye ya da belirtilen alan adına göre veri seçme işlemi
$sorgu= $db->prepare("SELECT * FROM banaozel where id=:id");
$sorgu->execute(array('id'=> $id));
$veriAl=$sorgu->fetch(PDO::FETCH_ASSOC);
?>
<form action="islem.php" method="post">
    Adınız: <input type="text" name="ad" value="<?php echo $veriAl['ad']; ?>" placeholder="Adınızı Yazınız">
    <br>
    Soyadınız: <input type="text" name="soyad" value="<?php echo $veriAl['soyad']; ?>" placeholder="Soyadınızı Yazınız">
    <br>
    Yaşınız: <input type="number" name="yas" value="<?php echo $veriAl['yas']; ?>" placeholder="Yaşınızı Giriniz">
    <br>
    Cinsiyetiniz: <input type="text" name="cinsiyet" value="<?php echo $veriAl['cinsiyet']; ?>" placeholder="Cinsiyetinizi Giriniz">
    <br>
    Medeni Durumunuz: <input type="text" name="medeni_durum" value="<?php echo $veriAl['medeni_durum']; ?>" placeholder="Medeni Durumunuzu Giriniz">
    <br>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="submit" name="guncelle" value="Güncelle">
</form>
<br>

<?php
//get ile işlemin güncellenip güncellenmediğinin anlaşımlasını sağlama
if($_GET['durum']=="true"){
    echo "Güncelleme işlemi başarılı";
}
elseif($_GET['durum']=="false"){
    echo "Güncelleme Gerçekleştirilemedi";
}
?>

<!--SELECT İŞLEMİ PDO çoğul -->
<?php /*
$sorgu= $db->prepare("SELECT * FROM banaozel");
$sorgu->execute();
while($veriAl=$sorgu->fetch(PDO::FETCH_ASSOC)){
    echo "<pre>";
    print_r($veriAl);
    echo "</pre>";
}


*/ ?>

<!--SELECT İŞLEMİ PDO istenilen alanların seçimi -->

<?php /*
$sorgu= $db->prepare("SELECT * FROM banaozel");
$sorgu->execute();
while($veriAl=$sorgu->fetch(PDO::FETCH_ASSOC)){

    echo $veriAl['ad']." ".$veriAl['soyad'];
    echo "<br>";
}


*/ ?>

</body>
</html>

