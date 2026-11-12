<?php
// db_connect.php - Połączenie z serwerem MySQL przez mysqli
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gry_db";

// Nawiązanie połączenia z serwerem MySQL oraz wybór bazy danych
$conn = mysqli_connect($servername, $username, $password, $dbname);
?>