<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "Warehouse";

//Tworzenie połączenia
$conn = mysqli_connect($host, $username, $password, $database);

if(!$conn){
    die("Połączenie nie powiodło się.");
}




?>