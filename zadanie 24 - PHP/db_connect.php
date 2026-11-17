<?php
// db_connect.php - połączenie z serwerem MySQL przez mysqli

$host = "localhost";
$username = "root";
$password = "";
$database = "gry_db";

// Wyłączenie automatycznych wyjątków mysqli - błędy obsługujemy komunikatami
mysqli_report(MYSQLI_REPORT_OFF);

// Połączenie z serwerem MySQL
$conn = @mysqli_connect($host, $username, $password);

if (!$conn) {
    die("Połączenie z serwerem MySQL nie powiodło się: " . mysqli_connect_error());
}

// Wybranie bazy gry_db (jeżeli jeszcze nie istnieje, $dbExists ma wartość false)
$dbExists = false;

if (mysqli_select_db($conn, $database)) {
    $dbExists = true;
    mysqli_set_charset($conn, "utf8mb4");
}
?>
