<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Kitaplık</title>
    <link rel="stylesheet" href="css/anasayfaCss.css">
    <link rel="stylesheet" href="css/tabloCss.css">
    <link rel="stylesheet" href="css/notlarCss.css">
    <link rel="stylesheet" href="css/favoriTablosuCss.css">
    <link rel="stylesheet" href="jquery-ui.css">
    <link rel="icon" href="book.png">
    <script src="jquery.js" charset="utf-8"></script>
    <script src="jquery-ui.js" charset="utf-8"></script>
    <script type="text/javascript">
    function notlarKapa() {
      document.getElementById('sekmeler').innerHTML = '';
      document.getElementById('notlar').style.display = 'none';
    }
    </script>
  </head>
  <body background="arkaplanlar/yeni.jpg">

<?php include 'kayit/kayitPhp.php'; ?>

<form id="arama-form" action="" method="post">

    <input type="text" name="yazarAra" placeholder="Yazar İsmi Ara..." id="yazarAra" class="aramaInput">

    <button type="button" name="yazarBtn" id="yazarBtn" class="aramaBtn" onclick="yazarArama()">Ara</button>

    <input type="text" name="kitapAra" placeholder="Kitap İsmi Ara..." id="KitapAra" class="aramaInput">

    <button type="button" name="kitapBtn" id="kitapBtn" class="aramaBtn" onclick="kitapArama()">Ara</button>

</form>

<form action="" method="post">

    <div id="yazarIsmıLabel" class="label">Yazar:</div>
    <input type="text" name="yazarIsmı" id="yazarIsmıEkle" class="aramaInput" placeholder="Yazar...">

    <div id="kitapIsmıLabel" class="label">Kitap İsmi:</div>
    <input type="text" name="kitapIsmı" id="kitapIsmıEkle" class="aramaInput" placeholder="Kitap...">

    <div id="rafNumarasıLabel" class="label">Raf Numarası:</div>
    <input type="text" name="rafNumarası" id="rafNumarasıEkle" class="aramaInput" placeholder="Raf Numarası...">

    <div id="konumNumarasıLabel" class="label">Konum Numarası:</div>
    <input type="text" name="konumNumarası" id="konumNumarasıEkle" class="aramaInput" placeholder="Konum Numarası...">

    <button type="submit" name="kayitBtn" id="kayitBtn">Ekle</button>

</form>

<div id="kitapSayisi">Kayıtlı kitap sayısı: <?PHP echo $kitapSayisi; ?></div>

 <div name="favoriListeleBtn" id="favoriListeleBtn" onclick="favoriListele();"></div>


 <div id="notlar">

   <div id="sekmeler">

   </div>

   <div id="notlarKapa" onclick="notlarKapa()">X</div>

   <div id="notlarBasligi">NOTLAR</div>

   <textarea name="notlarInput" id="notlarInput" rows="8" cols="80"></textarea>
   <div name="notlarBtn" id="notlarBtn" onclick="notlarKaydet()"></div>

   <div id="favori-btn" class="favori0" onclick="favoriEkle()"></div>


 </div>

<div id="phpSonuc">
<script type="text/javascript">
  var sekmeSayisi = 0;
  var sekmeGenisligi = 200;
  var sekmeKapaUzakligi = 165;
  var sekmeIsmıGenisligi = 150;
</script>
</div>


<p id="version">v1.2.2</p>

<script src="anasayfaJs.js" charset="utf-8"></script>
<div id="phpSonucNotlar"></div>
<div id="phpSonucFavori"></div>
<div id="phpSonucFavoriListeleme"></div>
  </body>
</html>
