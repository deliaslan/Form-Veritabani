<?php
/**
 * Created by PhpStorm.
 * User: deliaslan
 * Date: 20.10.2017
 * Time: 00:08
 * Project Name: Form-PDO
 * File Name: islem.php
 */
include_once 'baglan.php';

if(isset($_POST['kaydet'])){


    $kaydet = $db->prepare("INSERT INTO banaozel SET  
    ad=:ad,
    soyad=:soyad,
    yas=:yas,
    cinsiyet=:cinsiyet,
    medeni_durum=:medeni_durum
    ");

    $insert =$kaydet->execute(array(

        'ad'=>$_POST['ad'],
        'soyad'=>$_POST['soyad'],
        'yas'=>$_POST['yas'],
        'cinsiyet'=>$_POST['cinsiyet'],
        'medeni_durum'=>$_POST['medeni_durum']

    ));

    if($insert){
        echo "Kayıt Başarılı";
        echo "<br>";
        echo "<hr>";
        echo "<a href='form.php'>Forma Dön</a>";
        //Yönlendirme Fonksiyonu header()

        //header("Location:form.php");
        header("Location:form.php?durum=true"); //get ile geribildirim alabiliyoruz.
    }
    else{
        echo "İşlem gerçekleştirilemedi";
        echo "<br>";
        echo "<a href='form.php'>Forma Dön</a>";
        header("Location:form.php?durum=false");//get ile geribildirim alabiliyoruz.
    }
}
?>