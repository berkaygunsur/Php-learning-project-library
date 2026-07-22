<?php
error_reporting(0);
include($_SERVER['DOCUMENT_ROOT'].'/baglan.php');

if (isset($_POST["yazarIsmı"])) {

 $yazar = $_POST["yazarIsmı"];
 $kitap = $_POST["kitapIsmı"];
 $raf = $_POST["rafNumarası"];
 $konum = $_POST["konumNumarası"];

 $kayitSql = "INSERT INTO kitaplar SET yazar=?,kitap=?,raf=?,konum=?";
 $kayitEkle = $db->prepare($kayitSql);
 $kayit = $kayitEkle->execute([
   "$yazar",
   "$kitap",
   "$raf",
   "$konum"
 ]);

if($kayit){
  echo "<script>alert('Başarılı bir şekilde eklendi')</script>";
}else {
  echo "<script>alert('Bir hata oluştu, tekrar deneyin')</script>";
}

}


 $kitapSayisiSql = "SELECT * FROM kitaplar";
 $kitapSayisiBul = $db->prepare($kitapSayisiSql);
 $kitapSayisiBul->execute();
 $kitapSayisi = $kitapSayisiBul->rowCount();


 ?>
