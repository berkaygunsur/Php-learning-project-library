
function yazarArama() {

 formdataFun();

  $.ajax({

    url:"arama/yazarAramaPhp.php",
    type:"post",
    data:formdata,
    contentType: false,
    processData: false,
    success: function(sonuc){
         $("#phpSonuc").html(sonuc);
    }

  });
}

function kitapArama() {

 formdataFun();

  $.ajax({

    url:"arama/kitapAramaPhp.php",
    type:"post",
    data:formdata,
    contentType: false,
    processData: false,
    success: function(sonuc){
         $("#phpSonuc").html(sonuc);
    }

  });
}
function formdataFun() {

  var formdataElement = document.getElementById("arama-form");

  formdata = new FormData(formdataElement);

}


function notlarKaydet() {

  var notlarId = document.getElementById("notlar").className;
  var not = document.getElementById("notlarInput").value;


  $.ajax({
    url: "notEkleme/notEklemePhp.php",
    type: "post",
    data: {"notlarId":notlarId,"not":not},
    success: function(sonuc){
         $("#phpSonucNotlar").html(sonuc);
    }
  });

}

 function favoriEkle(){

  var notlarId = document.getElementById("notlar").className;

   $.ajax({
    url: "notEkleme/favoriEklemePhp.php" ,
    type: "post",
    data: {"notlarId":notlarId},
    success: function(sonuc){
      $("#phpSonucFavori").html(sonuc);
    }
  });
 }

// Favori Listeleme
 var favoriTablosuDurumu = 0;

 function favoriListele(){

  if(favoriTablosuDurumu == 0){
   $.ajax({
     url: "notEkleme/favoriListelemePhp.php",
     type: "post",
     success: function(sonuc){
       $("#phpSonucFavoriListeleme").html(sonuc);
       favoriTablosuDurumu = 1;
     }
   });
}else{
  $("#phpSonucFavoriListeleme").html("");
  favoriTablosuDurumu = 0;
}
 }
