<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baja látnivalók</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="ajanlatok.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body id="latnivalok_hatter">


    <?php  include("felgomb.html");?>


    <header>
    <?php  include("header.html");?>
  </header>



  <main id="latnivalokAl_main">
    <div id="fobox">
      <div class="container">
        <div id="ajanlatokAl_content">
          <a href="http://localhost/Bajahonlap/BHmain/ajanlatok.php"><h5 class="bi bi-box-arrow-left logout-icon"></h5></a>
          <div class="row">
            <div class="col-12">
              <h1 class="text-center mb-4" id="placeTitle">Cím</h1>
              
            </div>
          </div>

        
          <div class="row align-items-center mb-5">

            
              <div class="col-12 col-lg-8">
                  <p id="p1">
                      
                  </p>
              </div>

              <div class="col-12 col-lg-4">
                  <div class="img-stack img-stack--parallel" data-stack>
                      <img id="img1" src="" alt="" class="img-stack-img is-front">
                      <img id="img2" src="" alt="" class="img-stack-img">

                      <button class="stack-btn prev" type="button" aria-label="Előző kép">‹</button>
                      <button class="stack-btn next" type="button" aria-label="Következő kép">›</button>
                  </div>
              </div>

          </div>

          <div class="row align-items-center mb-5">
            <div class="col-12 col-lg-5 order-lg-1 order-2">
              <div class="img-stack" data-stack>
                <img id="img3" src="" class="img-stack-img is-front">
                <img id="img4" src="" class="img-stack-img">

                <button class="stack-btn prev">‹</button>
                <button class="stack-btn next">›</button>
              </div>
            </div>

            <div class="col-12 col-lg-7 order-lg-2 order-1">
              <p id="p2">
              
              </p>
            </div>
          </div>

          <div class="row align-items-center mb-4">
            <div class="col-12 col-lg-7">
              <p id="p3">
                
              </p>
            </div>

            <div class="col-12 col-lg-5">
              <div class="img-stack" data-stack>
                <img id="img5" src="" class="img-stack-img is-front">
                <img id="img6" src="" class="img-stack-img">

                <button class="stack-btn prev">‹</button>
                <button class="stack-btn next">›</button>
              </div>
            </div>
          </div>

          <div class="row align-items-center mb-4">
            <div class="col-12 col-lg-7">
              <a id="a1" href=""><p id="p4"></p></a>
                
              </p>
            </div>
          </div>

        </div>
      </div>
    </div>

    
  </main>








  <?php  include("footer.html");?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/felgomb.js"></script>
  <script src="js/detailsAjanlatok.js"></script>
  <script src="js/stack.js"></script>

</body>
</html>