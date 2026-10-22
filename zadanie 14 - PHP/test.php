<?php
    session_start();


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
if(isset($_SESSION["favcolor"])){
    echo $_SESSION["favcolor"];
} else {
    echo "Nie znaleziono takiej informacji.";
}

echo"<br>";
print_r($_SESSION);
echo "<br>";
$_SESSION["favcolor"] = "red";
echo "<br>";
print_r($_SESSION);

echo "<br>";
session_unset();
session_destroy();

?>
</body>
</html>