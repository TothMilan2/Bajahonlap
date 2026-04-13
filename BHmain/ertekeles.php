<?php
session_start();
require "database.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $szoveg = trim($_POST['szoveg']);
    $csillag = $_POST['csillag'] ?? 5; 

    if (!empty($szoveg)) {
        $stmt = $conn->prepare("INSERT INTO ertekelesek (felhasznalo_id, szoveg, csillag) VALUES (?, ?, ?)");
        $stmt->bind_param("isi", $user_id, $szoveg, $csillag);
        if ($stmt->execute()) {
            header("Location: index.php?success=1");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Értékelés</title>
    <link rel="stylesheet" href="main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
    <?php  include("felgomb.html");?>
    <header><?php  include("header.php");?></header>
  
    <main id="ertekelesForm-hatter" class="py-5">
        <div class="container d-flex justify-content-center">          
            <form method="POST" class="p-5 card shadow w-50 rounded">
                <h1 class="mb-4 text-center">Vélemény írása</h1>
                
                <div class="mb-3">
                    <label class="form-label d-block">Értékelés (1-5)</label>
                    <div class="btn-group" role="group">
                        <?php for($i=1; $i<=5; $i++): ?>
                            <input type="radio" class="btn-check" name="csillag" id="star<?php echo $i; ?>" value="<?php echo $i; ?>" <?php echo $i==5 ? 'checked' : ''; ?>>
                            <label class="btn btn-outline-warning" for="star<?php echo $i; ?>"><?php echo $i; ?></label>
                        <?php endfor; ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="comments" class="form-label">Üzeneted</label>
                    <textarea class="form-control" name="szoveg" rows="4" placeholder="Írd ide a tapasztalataidat..." required></textarea>
                </div>
                <button type="submit" class="btn btn-warning w-100 fw-bold">Küldés</button>
            </form>
        </div>

    </main>

    <?php  include("footer.html");?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/felgomb.js"></script>
</body>
</html>