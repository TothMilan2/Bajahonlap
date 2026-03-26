<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baja látnivalók</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="latnivalok.css">
</head>
<body id="latnivalok_hatter">



  <button onclick="oldalTetejere()" id="felGomb" title="Fel">
    <svg class="svgIcon" viewBox="0 0 384 512">
      <path
        d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"
      ></path>
    </svg>
  </button>


  <header>
  <?php  include("header.html");?>
</header>


<main id="latnivalok_main">



  <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <h1>Látnivalók</h1>
          </div>
      </div>
  </div>
  <div class="container">
      <div class="row">



          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
              <div class="latnivalok_card">
                <div id="latnivalok_box1">
                  <h3>Türr István-kilátó</h3>
                </div>
                <div id="latnivalok_box2">
                  <img src="img/turrkilato.jfif" alt="" id="latnivalok_kep2">
                  <button class="megtekitentesGomb" data-id="0">Megtekintés <span style="font-size: 15px;">&#129034;</span></button>
                </div>
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
              <div class="latnivalok_card">
                <div id="latnivalok_box1">
                  <h3>Petőfi-sziget</h3>
                </div>
                <div id="latnivalok_box2">
                  <img src="img/petofisziget.jpg" alt="" id="latnivalok_kep2">
                  <button class="megtekitentesGomb" data-id="1">Megtekintés <span style="font-size: 15px;">&#129034;</span></button>
                </div>
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
              <div class="latnivalok_card">
                <div id="latnivalok_box1">
                  <h3>Szentháromság tér</h3>
                </div>
                <div id="latnivalok_box2">
                  <img src="img/szentharomsagter.jfif" alt="" id="latnivalok_kep2">
                  <button class="megtekitentesGomb" data-id="2">Megtekintés <span style="font-size: 15px;">&#129034;</span></button>
                </div> 
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
            <div class="latnivalok_card">
              <div id="latnivalok_box1">
                <h3>Jelky András tér</h3>
              </div>
              <div id="latnivalok_box2">
                <img src="img/jelkyter.jfif" alt="" id="latnivalok_kep2">
                <button class="megtekitentesGomb" data-id="3">Megtekintés <span style="font-size: 15px;">&#129034;</span></button>
              </div> 
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
          <div class="latnivalok_card">
            <div id="latnivalok_box1">
              <h3>Türr István Múzeum</h3>
            </div>
            <div id="latnivalok_box2">
              <img src="img/turrmuzeum.jpg" alt="" id="latnivalok_kep2">
              <button class="megtekitentesGomb" data-id="4">Megtekintés <span style="font-size: 15px;">&#129034;</span></button>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
          <div class="latnivalok_card">
            <div id="latnivalok_box1">
              <h3>Bagolyvár</h3>
            </div>
            <div id="latnivalok_box2">
              <img src="img/bagolyvar.jpg" alt="" id="latnivalok_kep2">
              <button class="megtekitentesGomb" data-id="5">Megtekintés <span style="font-size: 15px;">&#129034;</span></button>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
          <div class="latnivalok_card">
            <div id="latnivalok_box1">
              <h3>Nagy István Képtár</h3>
            </div>
            <div id="latnivalok_box2">
              <img src="img/nagyistvankeptar2.jfif" alt="" id="latnivalok_kep2">
              <button class="megtekitentesGomb" data-id="6">Megtekintés <span style="font-size: 15px;">&#129034;</span></button>
            </div> 
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
          <div class="latnivalok_card">
            <div id="latnivalok_box1">
              <h3>Tóth Kálmán tér</h3>
            </div>
            <div id="latnivalok_box2">
              <img src="img/tothkalmanter2.jfif" alt="" id="latnivalok_kep2">
              <button class="megtekitentesGomb" data-id="7">Megtekintés <span style="font-size: 15px;">&#129034;</span></button>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
          <div class="latnivalok_card">
            <div id="latnivalok_box1">
              <h3>Pandúr Ökopark</h3>
            </div>
            <div id="latnivalok_box2">
              <img src="img/pandurokopark2.jfif" alt="" id="latnivalok_kep2">
              <button class="megtekitentesGomb" data-id="8">Megtekintés <span style="font-size: 15px;">&#129034;</span></button>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
          <div class="latnivalok_card">
            <div id="latnivalok_box1">
              <h3>Sugovica part - sétány</h3>
            </div>
            <div id="latnivalok_box2">
              <img src="img/sugovicasetany.jpg" alt="" id="latnivalok_kep2">
              <button class="megtekitentesGomb" data-id="9">Megtekintés <span style="font-size: 15px;">&#129034;</span></button>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
          <div class="latnivalok_card">
            <div id="latnivalok_box1">
              <h3>Neptun szökőkút</h3>
            </div>
            <div id="latnivalok_box2">
              <img src="img/neptunszobor.jpg" alt="" id="latnivalok_kep2">
              <button class="megtekitentesGomb" data-id="10">Megtekintés <span style="font-size: 15px;">&#129034;</span></button>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
          <div class="latnivalok_card">
            <div id="latnivalok_box1">
              <h3>Déri-Kert</h3>
            </div>
            <div id="latnivalok_box2">
              <img src="img/derikert.jpg" alt="" id="latnivalok_kep2">
              <button class="megtekitentesGomb" data-id="11">Megtekintés <span style="font-size: 15px;">&#129034;</span></button>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
          <div class="latnivalok_card">
            <div id="latnivalok_box1">
              <h3>Pörbölyi Ökoturisztikai Központ</h3>
            </div>
            <div id="latnivalok_box2">
              <img src="img/porbolyiokoturisztika.jpg" alt="" id="latnivalok_kep2">
              <button class="megtekitentesGomb" data-id="12">Megtekintés <span style="font-size: 15px;">&#129034;</span></button>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
          <div class="latnivalok_card">
            <div id="latnivalok_box1">
              <h3>Halászati Mini Skanzen</h3>
            </div>
            <div id="latnivalok_box2">
              <img src="img/halaszpartmini.jfif" alt="" id="latnivalok_kep2">
              <button class="megtekitentesGomb" data-id="13">Megtekintés <span style="font-size: 15px;">&#129034;</span></button>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
          <div class="latnivalok_card">
            <div id="latnivalok_box1">
              <h3>Városi Könyvtár</h3>
            </div>
            <div id="latnivalok_box2">
              <img src="img/varosikonyvtar.jpg" alt="" id="latnivalok_kep2">
              <button class="megtekitentesGomb" data-id="14">Megtekintés <span style="font-size: 15px;">&#129034;</span></button>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
          <div class="latnivalok_card">
            <div id="latnivalok_box1">
              <h3>Bácskai Kultúrpalota</h3>
            </div>
            <div id="latnivalok_box2">
              <img src="img/bacskaikulturpalota.jpg" alt="" id="latnivalok_kep2">
              <button class="megtekitentesGomb" data-id="15">Megtekintés <span style="font-size: 15px;">&#129034;</span></button>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
          <div class="latnivalok_card">
            <div id="latnivalok_box1">
              <h3>Eötvös utca</h3>
            </div>
            <div id="latnivalok_box2">
              <img src="img/eotvosutca.jpg" alt="" id="latnivalok_kep2">
              <button class="megtekitentesGomb" data-id="16">Megtekintés <span style="font-size: 15px;">&#129034;</span></button>
            </div>
          </div>
        </div>
        
      </div>
    </div>



</main>


<?php  include("footer.html");?>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/felgomb.js"></script> 
    <script src="js/listLatnivalok.js"></script>  
    <script src="js/keresomotor.js"></script>
    
</body>
</html>
  