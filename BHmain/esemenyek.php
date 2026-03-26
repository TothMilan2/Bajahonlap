<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    
    <title>Document</title>
    <link rel="stylesheet" href="esemenyek.css">
</head>
<body>

  <?php  include("felgomb.html");?>
  <header>
    <?php  include("header.html");?>
  </header>



  <main class="fooldal_hatter" >  
     <div class="row board-container"  style="justify-content: center; padding-top: 180px;  width: 80%; color: white; margin: auto;">
      
      <div class="center-box" >

        <div class="row">
            <div class="col-12"><h1>Események és Programok</h1> </div>
        </div>
        <div class="row"  id="masodiksor" style="display: flex; justify-content: center;">

            <div class="row" style="justify-content: center; align-items: center;" >
              <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2" id="esemenyek"><img src="img/Calendar.png" alt="" id="esemenykep" ></div>
              <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4"><p  id="esemeny_neve">A városi könyvtárban  író-olvasó találkozókat és irodalmi estek</p></div> 
              <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4"><button id="esemenygomb">Érdekel</button></div>
            </div>
            <div class="row" style="justify-content: center; align-items: center;">
              <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2" id="esemenyek"><img src="img/Calendar.png" alt="" id="esemenykep" ></div>
              <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4"><p  id="esemeny_neve"> A helyi művelődési házban táncházakat és kézműves foglalkozások</p></div> 
              <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4"><button id="esemenygomb">Érdekel</button></div>
            </div>
            <div class="row" style="justify-content: center; align-items: center;">
              <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2" id="esemenyek"><img src="img/Calendar.png" alt="" id="esemenykep" ></div>
              <div class="col-xs-2 col-sm-4  col-md-4 col-lg-4 col-xl-4 col-xxl-4"><p  id="esemeny_neve">A helyi galériák időről időre kiállításokat rendeznek bajai vagy környékbeli művészek alkotásaiból</p></div> 
              <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4"><button id="esemenygomb">Érdekel</button></div>
            </div>
            <div class="row" style="justify-content: center; align-items: center;">
              <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2" id="esemenyek"><img src="img/Calendar.png" alt="" id="esemenykep" ></div>
              <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4"><p  id="esemeny_neve">Piknikezés és sportolás a városi parkokban </p></div> 
              <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4"><button id="esemenygomb">Érdekel</button></div>
            </div>
            <div class="row" style="justify-content: center; align-items: center;">
              <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2" id="esemenyek"><img src="img/Calendar.png" alt="" id="esemenykep" ></div>
              <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4"><p  id="esemeny_neve">A Halfőző fesztiválkor zenei programok mellett sok más egyéb esemény.</p></div> 
              <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4"><button id="esemenygomb">Érdekel</button></div>
            </div>
             
                
               
              
            
            

            </div>
        </div>
          
      
            
        
           
            
        
        </div>
       

        
         
      
    </div>
  </main>
   

  <?php  include("footer.html");?>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
      <script src="js/felgomb.js"></script>
</body>
</html>