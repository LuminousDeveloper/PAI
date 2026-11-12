<?php
include 'db_connect.php';
if (!$conn) {
    die("Najpierw utwórz bazę danych!");
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $tytul = $_POST['tytul'];
    $gatunek = $_POST['gatunek'];
    $platforma = $_POST['platforma'];
    $rok_wydania = (int)$_POST['rok_wydania'];
    $ocena = (float)$_POST['ocena'];

    $sql = "INSERT INTO gry (tytul, gatunek, platforma, rok_wydania, ocena) VALUES ('$tytul', '$gatunek', '$platforma', $rok_wydania, $ocena)";
    if (mysqli_query($conn, $sql)) {
        echo "Nowa gra została dodana!";
    } else {
        echo "Błąd: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj grę</title>
</head>
<body>
    <?php include 'nav.php'; ?>
    <h1>Dodaj nową grę</h1>
    <form method="POST" action="<?php echo htmlspecialchars(basename($_SERVER['PHP_SELF'])); ?>">
        <label>Tytuł: <input type="text" name="tytul" required></label><br><br>
        <label>Gatunek: <input type="text" name="gatunek" required></label><br><br>
        <label>Platforma: <input type="text" name="platforma" required></label><br><br>
        <label>Rok wydania: <input type="number" name="rok_wydania" required></label><br><br>
        <label>Ocena: <input type="number" step="0.1" name="ocena" required></label><br><br>
        <button type="submit">Dodaj grę</button>
    </form>
    <?php include 'footer.php'; ?>
    
</body>
</html>