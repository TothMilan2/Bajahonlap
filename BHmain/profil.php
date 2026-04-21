<?php
    session_start();
    require "database.php";

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    $user_id = $_SESSION['user_id'];

    //1.Felhasználói adatok lekérése
    $sql = "SELECT * FROM felhasznalok WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    // Fiók törlése
    if (isset($_POST['fiok_torles'])) {
        $conn->prepare("DELETE FROM mentett_esemenyek WHERE felhasznalo_id = ?")->execute([$user_id]);
        $conn->prepare("DELETE FROM ertekelesek WHERE felhasznalo_id = ?")->execute([$user_id]);
        
        $del_acc = $conn->prepare("DELETE FROM felhasznalok WHERE id = ?");
        $del_acc->bind_param("i", $user_id);
        $del_acc->execute();
        
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit(); 
    }

    //2. Mentett események lekérése
    $sql_saved = "SELECT e.cim, e.datum, e.helyszin, me.esemeny_id FROM mentett_esemenyek me 
                  JOIN esemenyek e ON me.esemeny_id = e.id 
                  WHERE me.felhasznalo_id = ? 
                  ORDER BY e.datum ASC";
    $stmt_saved = $conn->prepare($sql_saved);
    $stmt_saved->bind_param("i", $user_id);
    $stmt_saved->execute();
    $saved_events = $stmt_saved->get_result();

    // Mentett esemény törlése
    if (isset($_POST['esemeny_torles'])) {
        $esemeny_id = $_POST['esemeny_id'];
        $del = $conn->prepare("DELETE FROM mentett_esemenyek WHERE esemeny_id = ? AND felhasznalo_id = ?");
        $del->bind_param("ii", $esemeny_id, $user_id);
        if ($del->execute()) {
            header("Location: profil.php");
            exit();
        } else {
            echo "Hiba történt: " . $conn->error;
        }
    }

    //3. Értékelések lekérése
    $my_reviews = $conn->prepare("SELECT * FROM ertekelesek WHERE felhasznalo_id = ?");
    $my_reviews->bind_param("i", $user_id);
    $my_reviews->execute();
    $reviews_res = $my_reviews->get_result();

    // Értékelés törlése
    if (isset($_POST['ertekeles_torles'])) {
        $ertekeles_id = $_POST['ertekeles_id'];
        $del = $conn->prepare("DELETE FROM ertekelesek WHERE id = ? AND felhasznalo_id = ?");
        $del->bind_param("ii", $ertekeles_id, $user_id);
        $del->execute();
        header("Location: profil.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Profilom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <?php include("felgomb.html"); ?>
    <header class="text-white"><?php include("header.php"); ?></header>
    <div class="container mt-5" style="height: 100vh">
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
                    <form method="POST" onsubmit="return confirm('Biztosan törlöd?')" class="d-inline">
                        <button type="submit" name="fiok_torles" class="btn btn-danger">Törlés</button>
                    </form>
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
                        <?php while ($event = $saved_events->fetch_assoc()): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong><?php echo htmlspecialchars($event['cim']); ?></strong><br>
                                    <small class="text-muted"><?php echo $event['datum']; ?> - <?php echo htmlspecialchars($event['helyszin']); ?></small>
                                </div>
                                <span class="badge bg-info rounded-pill">Mentve</span>
                                <form method="POST" onsubmit="return confirm('Biztosan törlöd?')">
                                    <input type="hidden" name="esemeny_id" value="<?php echo $event['esemeny_id']; ?>">
                                    <button type="submit" name="esemeny_torles" class="btn btn-sm btn-outline-danger">Törlés</button>
                                </form>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php else: ?>
                    <p class="text-muted">Még nem mentettél el egyetlen eseményt sem.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="card p-4 shadow h-100 mt-5 mb-5">
                <h3>Saját értékeléseim</h3>
                <hr>
                <?php if ($reviews_res->num_rows > 0): ?>
                    <?php while ($rev = $reviews_res->fetch_assoc()): ?>
                        <div class="alert alert-secondary d-flex justify-content-between align-items-center">
                            <div>
                                <strong><?php echo $rev['csillag']; ?> csillag:</strong> 
                                <span><?php echo htmlspecialchars($rev['szoveg']); ?></span>
                            </div>
                            <form method="POST" onsubmit="return confirm('Biztosan törlöd?')">
                                <input type="hidden" name="ertekeles_id" value="<?php echo $rev['id']; ?>">
                                <button type="submit" name="ertekeles_torles" class="btn btn-sm btn-outline-danger">Törlés</button>
                            </form>
                        </div> 
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>Még nem írtál véleményt.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php include("footer.html"); ?>
</body>
</html>