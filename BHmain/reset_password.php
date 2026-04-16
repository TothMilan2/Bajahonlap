<?php
session_start();
require "database.php";

$errors = [];
$success = false;

if (isset($_GET['token'])) {
    $_SESSION['reset_token'] = $_GET['token'];
}

if (!isset($_SESSION['reset_token'])) {
    die("Érvénytelen vagy hiányzó biztonsági token!");
}

$token = $_SESSION['reset_token'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST['form_token'] !== $token) {
        die("Biztonsági hiba: Token mismatch.");
    }

    $jelszo = $_POST["ujJelszo"];
    $megerosites = $_POST["megerosites"];

    if (strlen($jelszo) < 8) {
        $errors[] = "A jelszónak legalább 8 karakternek kell lennie!";
    } elseif (!preg_match('/[A-Z]/', $jelszo) || !preg_match('/\d/', $jelszo)) {
        $errors[] = "A jelszónak tartalmaznia kell nagybetűt és számot!";
    }

    if ($jelszo !== $megerosites) {
        $errors[] = "A két jelszó nem egyezik meg!";
    }

    if (empty($errors)) {
        $hashedPassword = password_hash($jelszo, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("UPDATE felhasznalok SET jelszo = ?, reset_token = NULL WHERE reset_token = ?");
        $stmt->bind_param("ss", $hashedPassword, $token);
        
        if ($stmt->execute() && $stmt->affected_rows > 0) {
            unset($_SESSION['reset_token']);
            $success = true;
        } else {
            $errors[] = "A link már lejárt vagy érvénytelen.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Új jelszó megadása</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #11252C;">
    <main class="d-flex flex-column align-items-center justify-content-center" style="min-height: 80vh;">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card p-4 shadow">
                        <h3 class="text-center">Új jelszó megadása</h3>
                        
                        <?php if ($success): ?>
                            <div class="alert alert-success">Sikeres jelszócsere! Most már bejelentkezhetsz.</div>
                            <a href="login.php" class="btn btn-primary w-100">Ugrás a bejelentkezéshez</a>
                        <?php else: ?>
                            
                            <?php foreach($errors as $error): ?>
                                <div class="alert alert-danger"><?php echo $error; ?></div>
                            <?php endforeach; ?>

                            <form method="POST">
                                <input type="hidden" name="form_token" value="<?php echo htmlspecialchars($token); ?>">
                                <div class="mb-3">
                                    <label class="form-label">Új jelszó</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="ujJelszo" placeholder="Írd ide a jelszavadat..."  name="ujJelszo" required>
                                        <span class="input-group-text" style="cursor:pointer;"
                                            onclick="togglePassword('ujJelszo', this.querySelector('i'))">
                                            <i class="bi bi-eye"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Új jelszó megerősítése</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="megerosites" placeholder="Írd ide a jelszavadat..."  name="megerosites" required>
                                        <span class="input-group-text" style="cursor:pointer;"
                                            onclick="togglePassword('megerosites', this.querySelector('i'))">
                                            <i class="bi bi-eye"></i>
                                        </span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success w-100">Jelszó frissítése</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="js/loginRegister.js"></script>
</body>
</html>