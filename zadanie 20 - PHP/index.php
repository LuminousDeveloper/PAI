<?php
require_once 'db_connect.php';
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
    <label for="id">ID:</label>
    <input type="number" name="id"> <br>
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
            

            $name = $_POST['name'];
            $price = $_POST['price'];
            $amount = $_POST['amount'];
            $id = $_POST['id'];
            
            $sql = "UPDATE Products SET 
            name='$name', 
            price='$price', 
            amount='$amount' 
            WHERE id='$id'";

            $result = mysqli_query($conn, $sql);
            
            if ($result) {
                echo "Zaktualizowano rekord o ID: $id";
            } else {
                echo "Błąd aktualizacji: " . mysqli_error($conn);
            }

            mysqli_close($conn);
        }
    ?>
</body>
</html>