<?php
    session_start();
    require "database.php";

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    $user_id = $_SESSION['user_id'];

    // felhasználói adatok 
    $sql = "SELECT * FROM felhasznalok WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();


    // mentett események lekérése
    $sql_saved = "SELECT e.cim, e.datum, e.helyszin FROM mentett_esemenyek me 
                  JOIN esemenyek e ON me.esemeny_id = e.id 
                  WHERE me.felhasznalo_id = ? 
                  ORDER BY e.datum ASC";
    $stmt_saved = $conn->prepare($sql_saved);
    $stmt_saved->bind_param("i", $user_id);
    $stmt_saved->execute();
    $saved_events = $stmt_saved->get_result();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Profilom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
</head>
<body>

    <header class="text-white"><?php  include("header.html");?></header>
    <div class="container mt-5" style="height: 80vh">
        <div class="row">
            <div class="card p-4 shadow">
                <h1>Üdvözöllek, <?php echo htmlspecialchars($user['keresztnev']); ?>!</h1>
                <hr>
                <p><strong>Teljes név:</strong> <?php echo htmlspecialchars($user['vezeteknev'] . " " . $user['keresztnev']); ?></p>
                <p><strong>Email cím:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                <p><strong>Telefonszám:</strong> <?php echo htmlspecialchars($user['telefonszam'] ?? 'Nincs megadva'); ?></p>
                <p><strong>Regisztráció ideje:</strong> <?php echo $user['regisztracio_ideje']; ?></p>
                
                <div class="mt-4">
                    <a href="logout.php" class="btn btn-danger">Kijelentkezés</a>
                    <a href="index.php" class="btn btn-secondary">Vissza a főoldalra</a>
                </div>
            </div>
        </div>

        <div class="row">
           <div class="card p-4 shadow h-100 mt-5">
                    <h3>Mentett eseményeim</h3>
                    <hr>
                    <?php if ($saved_events->num_rows > 0): ?>
                        <ul class="list-group list-group-flush">
                            <?php while($event = $saved_events->fetch_assoc()): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong><?php echo htmlspecialchars($event['cim']); ?></strong><br>
                                        <small class="text-muted"><?php echo $event['datum']; ?> - <?php echo htmlspecialchars($event['helyszin']); ?></small>
                                    </div>
                                    <span class="badge bg-info rounded-pill">Mentve</span>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php else: ?>
                        <p class="text-muted">Még nem mentettél el egyetlen eseményt sem.</p>
                    <?php endif; ?>
            </div>
        </div>
    </div>



    <footer>
        <?php  include("footer.html");?>
    </footer>
</body>
</html>