<?php
    session_start(); // rozpoczęcie sesji
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    $_SESSION['favcolor'] = "green";
    $_SESSION['favanimal'] = "cat";
    echo "Zmienne sesyjne ustawione:" . $_SESSION['favcolor'] . " " . $_SESSION['favanimal'];
?>


</body>
</html>