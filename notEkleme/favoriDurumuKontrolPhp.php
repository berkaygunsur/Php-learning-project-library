<?php
error_reporting(0);
include($_SERVER['DOCUMENT_ROOT'].'/baglan.php');

 $notId = $_POST["notlarId"];

 $favoriKontrolSql = "SELECT * FROM kitaplar WHERE id = '$notId'";
 $favoriKontrol = $db->prepare($favoriKontrolSql);
 $favoriKontrol->execute();

 foreach ($favoriKontrol as $bilgi) {
   $favoriDurumu = $bilgi["favori"];

   if($favoriDurumu == "0"){
     echo "<script>

     document.getElementById('favori-btn').className = '';
     document.getElementById('favori-btn').classList.add('favori0');

     </script>";
   }

   if($favoriDurumu == "1"){
     echo "<script>

     document.getElementById('favori-btn').className = '';
     document.getElementById('favori-btn').classList.add('favori1');

     </script>";
   }

 }



 ?>
