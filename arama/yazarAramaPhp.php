<?php
error_reporting(0);
include($_SERVER['DOCUMENT_ROOT'].'/baglan.php');

 $yazar = $_POST["yazarAra"];

 $aramaSql = "SELECT * FROM kitaplar WHERE yazar LIKE '%$yazar%'";
 $arama = $db->prepare($aramaSql);
 $arama->execute();

 echo "<div id='kitapTablosu'>
 <table id='kitapTable'>
<tr id='baslik-tr'>
  <th style='width:200px;'>Yazar</th>
  <th style='width:230px;'>Kitap</th>
  <th style='width:60px;'>Raf</th>
  <th>Konum</th>
</tr>
</table>
</div>";

 foreach ($arama as $bilgi) {
   $yazarAdi = $bilgi["yazar"];
   $kitapAdi = $bilgi["kitap"];
   $rafNum = $bilgi["raf"];
   $konumNum = $bilgi["konum"];
   $kitapId = $bilgi["id"];
   $favoriDurumu = $bilgi["favori"];

   echo "<script>
   var table = document.getElementById('kitapTable');
   var row = table.insertRow();
   var cell1 = row.insertCell();
   var cell2 = row.insertCell();
   var cell3 = row.insertCell();
   var cell4 = row.insertCell();
   cell1.innerHTML = \"$yazarAdi\";
   cell2.innerHTML = \"$kitapAdi\";
   cell3.innerHTML = '$rafNum';
   cell4.innerHTML = '$konumNum';

   cell2.classList.add('redClass');
   cell2.classList.add('$kitapId');
   cell2.addEventListener('click',function(){
   document.getElementById('notlar').style.display = 'block';
   var cellId = this.classList.item(1);
   document.getElementById('notlar').className = '';
   document.getElementById('notlar').classList.add(cellId);

    var notlarId = document.getElementById('notlar').className;

   $.ajax({
    url: 'notEkleme/favoriDurumuKontrolPhp.php' ,
    type: 'post',
    data: {'notlarId':notlarId},
    success: function(sonuc){
      $('#phpSonucFavori').html(sonuc);
    }
  });

  if(sekmeSayisi < 9){
   var yeniSekme = document.createElement('div');
   yeniSekme.classList.add('sekme');
   yeniSekme.classList.add(cellId);
   $('.sekme').css('background-color','rgb(125, 75, 0)');
   yeniSekme.style.backgroundColor = 'rgb(70, 37, 0)';
   var sekmeIsmı = document.createElement('p');
   sekmeIsmı.classList.add('sekmeIsmı');
   sekmeIsmı.innerHTML = \"$kitapAdi\";
   yeniSekme.appendChild(sekmeIsmı);
   document.getElementById('sekmeler').appendChild(yeniSekme);
   yeniSekme.addEventListener('click',function(){
     if(x == false){
     var sekmeId = this.classList.item(1);
     document.getElementById('notlar').className = '';
     document.getElementById('notlar').classList.add(sekmeId);
       var notlarId = document.getElementById('notlar').className;

       $.ajax({
        url: 'notEkleme/favoriDurumuKontrolPhp.php' ,
        type: 'post',
        data: {'notlarId':notlarId},
        success: function(sonuc){
          $('#phpSonucFavori').html(sonuc);
        }
      });

     $.ajax({
       url: 'notEkleme/notGetirmePhp.php',
       type: 'post',
       data: {'notlarId':notlarId},
       success: function(sonuc){
            $('#phpSonucNotlar').html(sonuc);
       }
     });
     $('.sekme').css('background-color','rgb(125, 75, 0)');
    this.style.backgroundColor = 'rgb(70, 37, 0)';
   }
   });

  $('.sekme').hover(function(){
    if(!(this.classList.item(1) == document.getElementById('notlar').className)){
    this.style.backgroundColor = 'rgb(98, 59, 1)';
  }
  },function(){
    if(!(this.classList.item(1) == document.getElementById('notlar').className)){
    this.style.backgroundColor = 'rgb(125, 75, 0)';
  }
  });

   var sekmeRengi = false;
   var x = false;
   var sekmeKapama = document.createElement('p');
   sekmeKapama.classList.add('sekmeKapa');
   sekmeKapama.innerHTML = 'X';
   yeniSekme.appendChild(sekmeKapama);
   sekmeSayisi++;

   sekmeKapama.addEventListener('mouseenter',function(){
     x = true;
   });
   sekmeKapama.addEventListener('mouseleave',function(){
     x = false;
   });

   sekmeKapama.addEventListener('click',function(){
     if(!(this.parentElement.previousElementSibling == null)){
     if(this.parentElement.nextElementSibling == null || this.parentElement.previousElementSibling.nextElementSibling.style.backgroundColor == 'rgb(70, 37, 0)'){
     $('.sekme').css('background-color','rgb(125, 75, 0)');
     this.parentElement.previousElementSibling.style.backgroundColor = 'rgb(70, 37, 0)';
     var oncekiSekme = this.parentElement.previousElementSibling.classList.item(1);
     document.getElementById('notlar').className = '';
     document.getElementById('notlar').classList.add(oncekiSekme);
       var notlarId = document.getElementById('notlar').className;

       $.ajax({
        url: 'notEkleme/favoriDurumuKontrolPhp.php' ,
        type: 'post',
        data: {'notlarId':notlarId},
        success: function(sonuc){
          $('#phpSonucFavori').html(sonuc);
        }
      });

     $.ajax({
       url: 'notEkleme/notGetirmePhp.php',
       type: 'post',
       data: {'notlarId':notlarId},
       success: function(sonuc){
            $('#phpSonucNotlar').html(sonuc);
       }
     });
 }
 }else{
   if(!(this.parentElement.nextElementSibling == null )){
   $('.sekme').css('background-color','rgb(125, 75, 0)');
   this.parentElement.nextElementSibling.style.backgroundColor = 'rgb(70, 37, 0)';
   var oncekiSekme = this.parentElement.nextElementSibling.classList.item(1);
   document.getElementById('notlar').className = '';
   document.getElementById('notlar').classList.add(oncekiSekme);
     var notlarId = document.getElementById('notlar').className;
   $.ajax({
     url: 'notEkleme/notGetirmePhp.php',
     type: 'post',
     data: {'notlarId':notlarId},
     success: function(sonuc){
          $('#phpSonucNotlar').html(sonuc);
     }
   });

   var notlarId = document.getElementById('notlar').className;

   $.ajax({
    url: 'notEkleme/favoriDurumuKontrolPhp.php' ,
    type: 'post',
    data: {'notlarId':notlarId},
    success: function(sonuc){
      $('#phpSonucFavori').html(sonuc);
    }
  });
 }else{
   document.getElementById('sekmeler').innerHTML = '';
   document.getElementById('notlar').style.display = 'none';
 }
 }
     this.parentElement.remove();
     sekmeSayisi--;
     if(sekmeSayisi > 3){
      if(sekmeSayisi > 6){
        sekmeGenisligi = sekmeGenisligi+15;
        sekmeKapaUzakligi = sekmeKapaUzakligi+15;
        sekmeIsmıGenisligi = sekmeIsmıGenisligi+15;
        $('.sekme').css('width',sekmeGenisligi);
        $('.sekmeKapa').css('margin-left',sekmeKapaUzakligi);
        $('.sekmeIsmı').css('width',sekmeIsmıGenisligi);
      }else{
        sekmeGenisligi = sekmeGenisligi+25;
        sekmeKapaUzakligi = sekmeKapaUzakligi+25;
        sekmeIsmıGenisligi = sekmeIsmıGenisligi+25;
        $('.sekme').css('width',sekmeGenisligi);
        $('.sekmeKapa').css('margin-left',sekmeKapaUzakligi);
        $('.sekmeIsmı').css('width',sekmeIsmıGenisligi);
      }
     }

   });

   if(sekmeSayisi > 4){
    if(sekmeSayisi > 7){
      sekmeGenisligi = sekmeGenisligi-15;
      sekmeKapaUzakligi = sekmeKapaUzakligi-15;
      sekmeIsmıGenisligi = sekmeIsmıGenisligi-15;
      $('.sekme').css('width',sekmeGenisligi);
      $('.sekmeKapa').css('margin-left',sekmeKapaUzakligi);
      $('.sekmeIsmı').css('width',sekmeIsmıGenisligi);
    }else{
      sekmeGenisligi = sekmeGenisligi-25;
      sekmeKapaUzakligi = sekmeKapaUzakligi-25;
      sekmeIsmıGenisligi = sekmeIsmıGenisligi-25;
      $('.sekme').css('width',sekmeGenisligi);
      $('.sekmeKapa').css('margin-left',sekmeKapaUzakligi);
      $('.sekmeIsmı').css('width',sekmeIsmıGenisligi);
    }
   }
 }

     var notlarId = document.getElementById('notlar').className;

     $.ajax({
       url: 'notEkleme/notGetirmePhp.php',
       type: 'post',
       data: {'notlarId':notlarId},
       success: function(sonuc){
            $('#phpSonucNotlar').html(sonuc);
       }
     });
   });

   </script>";

}


 ?>
