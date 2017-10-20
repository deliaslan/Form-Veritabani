<?php
/**
 * Created by PhpStorm.
 * User: deliaslan
 * Date: 20.10.2017
 * Time: 00:18
 * Project Name: Form-PDO
 * File Name: baglan.php
 */

try{
    $db = new PDO("mysql:host=localhost;dbname=bilgilerim;charset=utf8mb4",'root','');
   // echo "Bağlantı var";
}
catch (PDOException $e){
    echo $e->getMessage();
}

?>




