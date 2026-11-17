<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "gry_db";

$conn = mysqli_connect($host, $username, $password);

if (!$conn) {
    die("Połączenie nie powiodło się.");
}

$dbExists = false;

$sql = "SHOW DATABASES LIKE '$database'";
$wynik = mysqli_query($conn, $sql);

if ($wynik && mysqli_fetch_assoc($wynik)) {
    $dbExists = true;

    $sql = "USE $database";
    mysqli_query($conn, $sql);
}
?>
