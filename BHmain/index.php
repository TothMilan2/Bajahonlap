<?php
session_start();
require "database.php";


$sql = "SELECT e.*, f.keresztnev FROM ertekelesek e 
        JOIN felhasznalok f ON e.felhasznalo_id = f.id 
        ORDER BY e.id DESC LIMIT 10";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

  <?php  include("felgomb.html");?>
  <header>
    <?php  include("header.php");?>
    <section class="fooldal_hatter">
      <h1 id="Baja_cim">Baja</h1>
    </section>
  </header>


      <main id="fooldal-main">
       
        <section id="fooldal-ismerteto" class="py-5 bg-light">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-8 mb-4 mb-lg-0" id="Ismerteto_szoveg">
                <h2 class="display-4 fw-bold  mb-3">Baja</h2>
                <p class="lead text-dark shadow-text">
                  Fedezze fel Baját, a Duna-parti ékszerdobozt, ahol a mediterrán hangulat és a vízi élet találkozik! 
                  A város szíve, a <strong>Szentháromság tér</strong>, Európa egyik legszebb folyóparti főtere, 
                  amely kaput nyit a Sugovica-öbölre és a Petőfi-szigetre. 
                </p>
                <p class="text-secondary">
                  Baja nemcsak a világhírű, bográcsban főtt halászlé otthona, hanem a Gemenci-erdő kapuja is, 
                  így a gasztronómia szerelmesei és a természetjárók számára is tökéletes úti cél. 
                  Ismerje meg vendégszeretetünket, élvezze a part menti naplementét!
                </p>
              </div>

              <div class="col-lg-4 text-center">
                <div class="img-stack-container">
                  <div class="img-stack" data-stack>
                    <img id="img5" src="img/ertekelesFormHatter.jpg" alt="Baja látkép 1" class="img-stack-img is-front shadow-lg">
                    <img id="img6" src="img/ertekelesFormHatter2.jpg" alt="Baja látkép 2" class="img-stack-img shadow-lg">
                    
                    <div class="stack-controls mt-3">
                      <button class="stack-btn prev  btn-sm rounded-circle">‹</button>
                      <button class="stack-btn next  btn-sm rounded-circle">›</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>              
          </div>
        </section>
          
     

        <section id="fooldal-latnivalok" class="py-5">
          <div class="container">
            <div class="row g-4"> 
              <h2 class="text-center fs-1">Fedezze fel Baját</h2>
              <div class="col-12 col-md-4">
                <div class="latnivalok-box h-100 shadow-sm p-3">
                  <img src="img/image 72.png" alt="Türr István-kilátó Baján" class="img-fluid rounded mb-3"> 
                  <h5>Türr István-kilátó</h5>
                  <p>A Türr István-kilátó Baján található egy szemet gyönyörködtető környezetben, a Duna és Sugovica összefolyásánál. Egy igazán egyedi helyszínt kapott a kilátó a két folyó találkozásánál.</p>
                </div>                
              </div>

              <div class="col-12 col-md-4">
                <div class="latnivalok-box h-100 shadow-sm p-3">
                  <img src="img/image 70.png" alt="Petőfi Sándor szobra Baján" class="img-fluid rounded mb-3"> 
                  <h5>Petőfi szobor</h5>
                  <p>A Petőfi-szobor a bajai Petőfi-szigeten áll, a híres magyar költő, Petőfi Sándor emlékére. A szobor a költőt ábrázolja, és a város egyik jelképe. A látogatók gyakran megállnak itt tiszteletet adni és fényképezkedni.</p>
                </div>
              </div>

              <div class="col-12 col-md-4">
                <div class="latnivalok-box h-100 shadow-sm p-3">
                  <img src="img/image 73.png" alt="Bajai Szentháromság tér" class="img-fluid rounded mb-3"> 
                  <h5>Szentháromság tér</h5>
                  <p>A bajai Szentháromság tér a város történelmi és közösségi központja, amely elegáns, mégis barátságos hangulatával azonnal magával ragadja a látogatókat.</p>               
                </div>
              </div>

            </div>
          </div>
        </section>
        

        <section id="fooldal-latnivalok2">
          <div class="container-fluid">

            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6" >
                <img class="mx-auto d-block img-fluid p-2" id="fooldal-latnivalok2Kep" src="img/image 78.png" onmouseover="Hover()" alt="">
                
                  <p class="textonimage_1">Petőfi sziget</p>
              
              </div>
             
              
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                <img class="mx-auto d-block img-fluid p-2" id="fooldal-latnivalok2Kep" src="img/image 77.png" onmouseover="Hover1()" alt="">
                <p class="textonimage_2"> sziget</p>
              </div>
            </div>
              
            <div class="row"> 
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4" >
                <img class="mx-auto d-block img-fluid p-2" id="fooldal-latnivalok2Kep"  src="img/image 71.png" onmouseover="Hover2()" alt="" >
                <p class="textonimage_3">Petőfi sziget</p>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                <img class="mx-auto d-block img-fluid p-2" id="fooldal-latnivalok2Kep" src="img/image 74.png"  onmouseover="Hover3()"alt="">
                <p class="textonimage_4"> sziget</p>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                <img class="mx-auto d-block img-fluid p-2" id="fooldal-latnivalok2Kep" src="img/image 76.png" onmouseover="Hover4()" alt="" >
                <p class="textonimage_5"> sziget</p>
              </div>
             </div> 
  
             <div class="text-center p-5">
              <a href="latnivalok.php">
                <button class="ertekeles-gomb">
                  <span class="kor" aria-hidden="true">
                  <span class="icon arrow"></span>
                  </span>
                  <span class="gomb-szoveg">Felfedezés</span>
                </button>
              </a>
            </div>  
            
          </div>
        </section>
        
        <section id="fooldal-ertekeles">
          <div class="container py-5">
            <h1 class="text-center text-white mb-5">Vélemények</h1>
            
            <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <?php 
                $active = "active";
                if ($result->num_rows > 0):
                  while($row = $result->fetch_assoc()): 
                ?>
                  <div class="carousel-item <?php echo $active; $active = ""; ?>">
                    <div class="review_card mx-auto bg-light p-4 rounded shadow-lg" >
                      <div class="review_header d-flex justify-content-between">
                        <div class="stars text-warning">
                          <?php for($i=0; $i<$row['csillag']; $i++) echo '<i class="bi bi-star-fill"></i>'; ?>
                        </div>
                        <span class="badge bg-warning text-dark"><?php echo number_format($row['csillag'], 1); ?></span>
                      </div>
                      <p class="review_text mt-3 italic text-dark">"<?php echo htmlspecialchars($row['szoveg']); ?>"</p>
                      <div class="review_footer mt-3">
                        <div class="user_info">
                          <span class="name fw-bold"><?php echo htmlspecialchars($row['keresztnev']); ?></span>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php 
                  endwhile; 
                else:
                ?>
                  <div class="carousel-item active">
                    <p class="text-center text-white">Még nem érkezett vélemény.</p>
                  </div>
                <?php endif; ?>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
              </button>
            </div>

            <div class="text-center p-5">
              <a href="ertekeles.php">
                <button class="ertekeles-gomb">
                  <span class="kor" aria-hidden="true">
                  <span class="icon arrow"></span>
                  </span>
                  <span class="gomb-szoveg">Felfedezés</span>
                </button>
              </a>
            </div>


          </div>
        </section>


      </main>

  <?php include("footer.html");?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/felgomb.js"></script>
  <script src="js/stack.js"></script>
  <script src="js/keresomotor_index.js"></script>
  <script src="js/sutik.js"></script>
  <script src="js/hoveroverimg.js"></script>
</body>
</html>