<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "bajahonlap";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
      die("Kapcsolódási hiba: " . $conn->connect_error);
  }
  echo "Sikeres csarlakozás!";
  $conn->set_charset("utf8");
?>