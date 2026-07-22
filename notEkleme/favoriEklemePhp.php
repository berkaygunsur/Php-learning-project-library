<?php
error_reporting(0);
 include($_SERVER['DOCUMENT_ROOT'].'/baglan.php');

  $notId = $_POST["notlarId"];

  $favoriKontrolSql = "SELECT * FROM kitaplar WHERE id = '$notId'";
  $favoriKontrol = $db->prepare($favoriKontrolSql);
  $favoriKontrol->execute();

  foreach ($favoriKontrol as $bilgi) {
    $favoriDurumu = $bilgi["favori"];
  }

  if($favoriDurumu == "0"){
    $favoriEkleSql = "UPDATE kitaplar SET favori='1' WHERE id = '$notId'";
    $favoriEkle = $db->prepare($favoriEkleSql);
    $favoriEkle->execute();
  echo "<script>

  document.getElementById('favori-btn').className = '';
  document.getElementById('favori-btn').classList.add('favori1');

  </script>";
  }
  if($favoriDurumu == "1"){
    $favoriEkleSql = "UPDATE kitaplar SET favori='0' WHERE id = '$notId'";
    $favoriEkle = $db->prepare($favoriEkleSql);
    $favoriEkle->execute();
    echo "<script>

    document.getElementById('favori-btn').className = '';
    document.getElementById('favori-btn').classList.add('favori0');

    </script>";
  }









 ?>
