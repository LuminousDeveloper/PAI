<?php
require_once 'db_connect.php'; // Jeśli już załączono plik to nie będzie ponownie załączać
// require 'db_connect.php'; // W przypadku gdy dany plik np. nie istnieje require wyświetli fatal error
// include 'db_connect.php'; // W przypadku gdy dany plik np. nie istnieje include wyświetli warning
// include_once 'db_connect.php'; 
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista produktów</h1>
    <table border='1'>
        <tr>
            <th>ID</th>
            <th>Nazwa</th>
            <th>Cena</th>
            <th>Ilość</th>
        </tr>
    <?php
    $sql = "SELECT * FROM Products";
    $result = mysqli_query($conn, $sql);

    
    while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['price']."</td>";
        echo "<td>".$row['amount']."</td>";
        echo "</tr>";
    }

    mysqli_close($conn);
    ?>
    </table>
</body>
</html>