<?php
session_start();
require "database.php";

$uzenet = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    
    $stmt = $conn->prepare("SELECT id FROM felhasznalok WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        
        $token = bin2hex(random_bytes(32));

        
        $update = $conn->prepare("UPDATE felhasznalok SET reset_token = ? WHERE email = ?");
        $update->bind_param("ss", $token, $email);
        
        if ($update->execute()) {
            $reset_link = "reset_password.php?token=" . $token;
            $uzenet = "<div class='alert alert-success'> 
                            A jelszóvisszaállító link elkészült!<br>
                            <a href='$reset_link' class='alert-link'>Kattints ide az új jelszó megadásához</a>
                        </div>";
        }
    } else {
        $uzenet = "<div class='alert alert-danger'>Ezzel az e-mail címmel nem találtunk felhasználót.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Elfelejtett jelszó</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
</head>
<body style="background-color: #11252C;">

    <main class="d-flex flex-column align-items-center justify-content-center" style="min-height: 80vh;">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card p-4 shadow">
                        <h3 class="text-center">Jelszó emlékeztető</h3>
                        <p class="text-muted small">Add meg az e-mail címed, és küldünk egy linket a jelszó módosításához.</p>
                        
                        <?php echo $uzenet; ?>

                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">E-mail cím</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Link generálása</button>
                        </form>
                        <div class="text-center mt-3">
                            <a href="login.php">Vissza a bejelentkezéshez</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>