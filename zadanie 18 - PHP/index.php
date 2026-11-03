<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "Warehouse";

//Tworzenie połączenia
$conn = mysqli_connect($host, $username, $password, $database);

if(!$conn){
    die("Połączenie nie powiodło się.");
} else {
    echo "Połączono z bazą danych.";
}
?>



<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="POST" action="">
    <label for="name">Nazwa:</label>
    <input type="text" id="name" name="name"> <br>
    <label for="price">Cena:</label>
    <input type="number" id="price" name="price"> <br>
    <label for="amount">Ilość:</label>
    <input type="number" id="amount" name="amount"> <br>
    <input type="submit" value="Wyślij"> <br>
</form>
    <?php
        if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['amount'])) {
            echo "Nazwa: " . $_POST['name'] . "<br>";
            echo "Cena: " . $_POST['price'] . "<br>";
            echo "Ilość: " . $_POST['amount'] . "<br>";

            $name = $_POST['name'];
            $price = $_POST['price'];
            $amount = $_POST['amount'];
            //Tabela Products
            // Pola: id, name, price, amount

            $sql = "INSERT INTO Products (name, amount, price) VALUES ('$name', '$amount', '$price')";
            //wykonuje zapytanie na bazie danych na podstawie podanego SQLa oraz połączenia z Bazą Danych
            if (mysqli_query($conn, $sql)) {
                echo "Nowy rekord został dodany pomyślnie.";
            } else {
                //mysqli_error - wyciąga błąd z połączenia
                echo "Błąd: Bluescreen Panie Heniu" . mysqli_error($conn);
            }

            mysqli_close($conn);
        }
    ?>
</body>
</html>