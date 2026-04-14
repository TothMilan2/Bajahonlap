<?php
session_start();
require "database.php"; 

$login_error = "";
$register_error = "";
$success = "";

// REGISZTRÁCIÓ
if (isset($_POST['register'])) {
    $vezeteknev = trim($_POST['vezeteknev']);
    $keresztnev = trim($_POST['keresztnev']);
    $email      = trim($_POST['email']); 
    $telefonszam = trim($_POST['telefonszam']);
    $jelszo     = $_POST['jelszo'];
    $megerosites = $_POST['megerosites'];

    
    if (empty($vezeteknev) || empty($keresztnev) || empty($email) || empty($jelszo)) {
        $register_error = "Minden kötelező mezőt tölts ki!";
    } 
    
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $register_error = "Érvénytelen e-mail cím formátum!";
    }
   
    elseif (strlen($jelszo) < 8) {
        $register_error = "A jelszónak legalább 8 karakternek kell lennie!";
    } elseif (!preg_match('/[A-Z]/', $jelszo)) {
        $register_error = "A jelszónak tartalmaznia kell legalább egy nagybetűt!";
    } elseif (!preg_match('/[a-z]/', $jelszo)) {
        $register_error = "A jelszónak tartalmaznia kell legalább egy kisbetűt!";
    } elseif (!preg_match('/\d/', $jelszo)) {
        $register_error = "A jelszónak tartalmaznia kell legalább egy számot!";
    } elseif (!preg_match('/[\W_]/', $jelszo)) {
        $register_error = "A jelszónak tartalmaznia kell legalább egy speciális karaktert!";
    }
  
    elseif ($jelszo !== $megerosites) {
        $register_error = "A két jelszó nem egyezik meg!";
    } else {
       
        $check = $conn->prepare("SELECT id FROM felhasznalok WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $register_error = "Ez az e-mail cím már regisztrálva van!";
        } else {
           
            $hashed = password_hash($jelszo, PASSWORD_DEFAULT);
            $sql = "INSERT INTO felhasznalok (vezeteknev, keresztnev, email, telefonszam, jelszo) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $vezeteknev, $keresztnev, $email, $telefonszam, $hashed);

            if ($stmt->execute()) {
                $success = "Sikeres regisztráció! Most már bejelentkezhetsz.";
            } else {
                $register_error = "Hiba történt a mentés során!";
            }
        }
    }
}

// BEJELENTKEZÉS
if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $jelszo = $_POST['jelszo'];

    $sql = "SELECT id, keresztnev, jelszo FROM felhasznalok WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        if (password_verify($jelszo, $user['jelszo'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['keresztnev']; 
            header("Location: profil.php");
            exit();
        }
    }

    $login_error = "Hibás e-mail cím vagy jelszó!";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    
</head>
<body>
    <?php  include("felgomb.html");?>
    <header><?php  include("header.php");?></header>
  
    <main id="loginForm-hatter" class="d-flex flex-column align-items-center justify-content-center" style="min-height: 80vh;">

        <!--Regisztráció-->
        <div class="container-fluid d-flex flex-column align-items-center justify-content-center">          
          <form class="w-100" id="register-form"  method="POST" action="">

          <?php if ($register_error) echo "<div class='alert alert-danger'>$register_error</div>"; ?>
          <?php if ($success) echo "<div class='alert alert-success'>$success</div>"; ?>

              <h1 class="mb-4 text-center">Regisztráció</h1>

              <div class="mb-3">
                <label class="form-label">Név</label>
                <div class="row">
                    <div class="col-12 col-md-6 mb-2 mb-md-0">
                        <input type="text" class="form-control" id="keresztnev" placeholder="Keresztnév" name="keresztnev">
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="text" class="form-control" id="vezeteknev" placeholder="Vezetéknév" name="vezeteknev">
                    </div>
                </div>
              </div>
              <div class="mb-3">
                  <label for="email" class="form-label">Email cím</label>
                  <input type="email" class="form-control" id="email" placeholder=" Írd ide az email címed..." name="email">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Telefonszám</label>
                <input type="text" class="form-control" id="telefonszam" placeholder=" Írd ide a telefonszámod..."  name="telefonszam">
              </div>
   
              <div class="mb-3">
                <label class="form-label">Jelszó</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="registerPassword" name="jelszo" placeholder="Írd ide a jelszavadat..." required>
                    <span class="input-group-text" style="cursor:pointer;"
                        onclick="togglePassword('registerPassword', this.querySelector('i'))">
                        <i class="bi bi-eye"></i>
                    </span>
                </div>
            </div>

            <div class="mb-3">
            <label class="form-label">Jelszó megerősítése</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="confirmPassword" name="megerosites" placeholder="Írd még egyszer a jelszavadat..." required>
                    <span class="input-group-text" style="cursor:pointer;"
                        onclick="togglePassword('confirmPassword', this.querySelector('i'))">
                        <i class="bi bi-eye"></i>
                    </span>
                </div>
            </div>
            <button type="submit" name="register" id="ertekelesKuldes-gomb" class="d-block w-100">Regisztráció</button>
            <div class="text-center mt-3">
                <p>Már van fiókod? <a href="#" id="register-btn">Bejelentkezés</a>.</p>
            </div>
          </form>
        </div>


        <!--Bejelentkezés-->
        <div class="container-fluid d-flex flex-column align-items-center justify-content-center">          
          <form class="w-100" id="login-form" method="POST" action="">

          <?php if ($login_error) echo "<div class='alert alert-danger'>$login_error</div>"; ?>


              <h1 class="mb-4 text-center">Bejelentkezés</h1>
              <div class="mb-3">
                  <label for="email" class="form-label">Email cím</label>
                  <input type="email" class="form-control" id="email" placeholder="Írd ide az email címed..." name="email" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Jelszó</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="loginPassword" placeholder="Írd ide a jelszavadat..."  name="jelszo" required>
                    <span class="input-group-text" style="cursor:pointer;"
                        onclick="togglePassword('loginPassword', this.querySelector('i'))">
                        <i class="bi bi-eye"></i>
                    </span>
                </div>
              </div> 
              <div class="col-12 text-end mb-3">
                    <a href="forgot_password.php">Elfelejtett jelszó?</a>
              </div>
              <button type="submit" id="ertekelesKuldes-gomb" name="login" class="d-block w-100">Bejelentkezés</button>
              <div class="text-center mt-3">
                    <p>Még nincs fiókod? <a href="#" id="login-btn">Regisztráció</a>.</p>
              </div>
          </form>
        </div>
    </main>

    <?php  include("footer.html");?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/felgomb.js"></script>
<script src="js/loginRegister.js"></script>

</body>
</html>