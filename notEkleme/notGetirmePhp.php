<?php
error_reporting(0);

include($_SERVER['DOCUMENT_ROOT'].'/baglan.php');

$notId = $_POST["notlarId"];

$notGetirSql = "SELECT * FROM kitaplar WHERE id = '$notId'";
$notGetir = $db->prepare($notGetirSql);
$notGetir->execute();

foreach ($notGetir as $bilgiler) {
  $notlar = $bilgiler["notlar"];
}

echo "<script>
 document.getElementById('notlarInput').value = `$notlar`;
</script>";

 ?>
