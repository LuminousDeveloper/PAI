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
    <input type="number" name="id" id="id"> <br>
    <input type="submit" value="Wyślij"> <br>
</form>
    <?php
        if(isset($_POST['id'])) {

            $id = $_POST['id'];

            $sql = "DELETE FROM Products WHERE id='$id'";

            $result = mysqli_query($conn, $sql);
            
            if ($result) {
                echo "Usunięto rekord o ID: $id";
            } else {
                echo "Błąd usuwania: " . mysqli_error($conn);
            }

            mysqli_close($conn);
        }
    ?>
</body>
</html>