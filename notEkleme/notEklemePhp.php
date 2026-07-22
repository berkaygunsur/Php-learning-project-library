<?php
error_reporting(0);
 include($_SERVER['DOCUMENT_ROOT'].'/baglan.php');

 $notId = $_POST["notlarId"];
 $notlar = $_POST["not"];

 $notKaydetSql = "UPDATE kitaplar SET notlar = ? WHERE id = '$notId' ";
 $notKaydetPrepare = $db->prepare($notKaydetSql);
 $notKayit = $notKaydetPrepare->execute([
   "$notlar"
 ]);


 ?>
