<?php
session_start();
require "database.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM felhasznalo WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
</head>
<body>

<h1>Üdv, <?php echo $user['keresztnev']; ?>!</h1>

<ul>
    <li>Név: <?php echo $user['keresztnev'] . " " . $user['vezeteknev']; ?></li>
    <li>Email: <?php echo $user['email']; ?></li>
    <li>Telefonszám: <?php echo $user['telefonszam']; ?></li>
</ul>

<a href="logout.php">Kijelentkezés</a>

</body>
</html>

