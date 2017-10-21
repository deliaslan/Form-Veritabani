<?php
/**
 * Created by PhpStorm.
 * User: deliaslan
 * Date: 21.10.2017
 * Time: 23:40
 * Project Name: Form-PDO
 * File Name: form-veri-sil.php
 */
include_once 'baglan.php';
?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Veritabanından bilgileri silme</title>
</head>
<body>
<h1>Veritabanına PDO İle Silme İşlemi</h1>
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

<!-- Silme sonucu mesaj verme işlemi-->
<?php
//get ile işlemin güncellenip güncellenmediğinin anlaşımlasını sağlama
if($_GET['silme']=="true"){
    echo "Silme işlemi başarılı";
}
elseif($_GET['silme']=="false"){
    echo "Silme Gerçekleştirilemedi";
}
?>



<!--SELECT İŞLEMİ PDO istenilen alanların seçimi -->
<?php
$sorgu= $db->prepare("SELECT * FROM banaozel");
$sorgu->execute();
while($veriAl=$sorgu->fetch(PDO::FETCH_ASSOC)){
    echo "<hr>";
    echo $veriAl['id']." - ";
    echo $veriAl['ad']." ".$veriAl['soyad'];
    echo "<br>";
    ?>
<a style="font-size: 12px;font-weight: bold" href="islem.php?id=<?php echo $veriAl['id']?>&silme=true">Sil</a>
<?php



}


?>
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
