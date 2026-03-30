<?php
session_start();
require "database.php";

if (isset($_POST['save_event'])) {
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $event_id = $_POST['event_id'];

        $check = $conn->prepare("SELECT id FROM mentett_esemenyek WHERE felhasznalo_id = ? AND esemeny_id = ?");
        $check->bind_param("ii", $user_id, $event_id);
        $check->execute();
        $res = $check->get_result();

        if ($res->num_rows == 0) {
            $stmt = $conn->prepare("INSERT INTO mentett_esemenyek (felhasznalo_id, esemeny_id) VALUES (?, ?)");
            $stmt->bind_param("ii", $user_id, $event_id);
            $stmt->execute();
            $msg = "Esemény elmentve!";
        } else {
            $msg = "Ezt már elmentetted korábban.";
        }
    } else {
        header("Location: login.php"); 
        exit();
    }
}

$result = $conn->query("SELECT * FROM esemenyek ORDER BY datum ASC");
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="esemenyek.css">
    <title>Események</title>
</head>
<body>
    <?php include("felgomb.html"); ?>
    <header><?php include("header.html"); ?></header>

    <main class="fooldal_hatter">
        <div class="container py-5 mt-5 text-white">
            <h1 class="text-center mb-5">Események és Programok</h1>
            
            <?php if(isset($msg)) echo "<div class='alert alert-info text-center'>$msg</div>"; ?>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <?php while($row = $result->fetch_assoc()): ?>
                    <div class="row align-items-center mb-4 p-3 border rounded border-secondary shadow-sm bg-dark bg-opacity-50">
                        <div class="col-md-2 text-center">
                            <img src="img/Calendar.png" alt="Naptár" style="width: 50px;">
                            <div class="small mt-1"><?php echo date("Y.m.d", strtotime($row['datum'])); ?></div>
                        </div>
                        <div class="col-md-7">
                            <h5 class="mb-1 text-info"><?php echo htmlspecialchars($row['cim']); ?></h5>
                            <p class="mb-0 text-light small"><?php echo htmlspecialchars($row['leiras']); ?></p>
                            <small class="text-secondary">Helyszín: <?php echo htmlspecialchars($row['helyszin']); ?></small>
                        </div>
                        <div class="col-md-3 text-end">
                            <form method="POST">
                                <input type="hidden" name="event_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="save_event" class="btn btn-outline-info w-100">
                                    <i class="bi bi-bookmark-plus"></i> Érdekel
                                </button>
                            </form>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </main>

    <?php include("footer.html"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/felgomb.js"></script>
</body>
</html>