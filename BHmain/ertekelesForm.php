<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Értékelés</title>
    <link rel="stylesheet" href="main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body>
    <?php  include("felgomb.html");?>
    <header><?php  include("header.html");?></header>
  
    <main id="ertekelesForm-hatter">

        <div class="container-fluid d-flex flex-column align-items-center justify-content-center">          
            <form class="w-100" id="ertekeles-form">
                <h1 class="mb-4 text-center">Értékelés</h1>
                
                <div class="mb-3">
                    <label for="rating" class="form-label">Értékelés</label>
                    <!--<select class="form-select" id="rating">
                        <option value="" disabled selected>Válassz egy értékelést...</option>
                        <option value="1">1 - Nagyon rossz</option>
                        <option value="2">2 - Rossz</option>
                        <option value="3">3 - Közepes</option>
                        <option value="4">4 - Jó</option>
                        <option value="5">5 - Nagyon jó</option>
                    </select>-->
                    <div class="rating-options">
                      <fieldset data-role="controlgroup">
                        <legend></legend>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="status" id="inlineCheckbox1" value="option1">
                          <label class="form-check-label" for="inlineCheckbox1">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="status" id="inlineCheckbox2" value="option2">
                          <label class="form-check-label" for="inlineCheckbox2">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="status" id="inlineCheckbox1" value="option1">
                          <label class="form-check-label" for="inlineCheckbox1">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="status" id="inlineCheckbox2" value="option2">
                          <label class="form-check-label" for="inlineCheckbox2">4</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="status" id="inlineCheckbox1" value="option1">
                          <label class="form-check-label" for="inlineCheckbox1">5</label>
                        </div>  
                      </fieldset>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="comments" class="form-label">Megjegyzések</label>
                    <textarea class="form-control" id="comments" rows="4" placeholder="Írd ide a megjegyzéseidet..."></textarea>
                </div>
                <button type="submit" id="ertekelesKuldes-gomb">Küldés</button>
            </form>
        </div>

            
    </main>

    <?php  include("footer.html");?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/felgomb.js"></script>
</body>
</html>