<?php
include 'db_connect.php';
if (!$conn) {
    die("Najpierw utwórz bazę danych!");
}
$gra = null;
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['akcja']) && $_POST['akcja'] == 'aktualizuj') {
    $id = (int)$_POST['id'];
    $tytul = $_POST['tytul'];
    $gatunek = $_POST['gatunek'];
    $platforma = $_POST['platforma'];
    $rok = (int)$_POST['rok_wydania'];
    $ocena = (float)$_POST['ocena'];
    $sql = "UPDATE gry SET tytul='$tytul', gatunek='$gatunek', platforma='$platforma', rok_wydania=$rok, ocena=$ocena WHERE id=$id";
    mysqli_query($conn, $sql);
    echo "Zaktualizowano.";
}
$id_edycji = isset($_GET['id']) ? (int)$_GET['id'] : (isset($_POST['id_pobierz']) ? (int)$_POST['id_pobierz'] : 0);
if ($id_edycji > 0){
    $res = mysqli_query($conn, "SELECT * FROM gry WHERE id = $id_edycji");
    if ($res && mysqli_query($conn, "SELECT * FROM gry WHERE id = $id_edycji")) {
        $gra = mysqli_fetch_assoc($res);
        if ($gra) {
            $id = $gra['id'];
            $tytul = $gra['tytul'];
            $gatunek = $gra['gatunek'];
            $platforma = $gra['platforma'];
            $rok_wydania = $gra['rok_wydania'];
            $ocena = $gra['ocena'];
        } else {
            echo "<p style='color: red;'>Nie znaleziono gry o podanym ID.</p>";
        }
    } else {
        echo "<p style='color: red;'>Błąd podczas pobierania danych: " . mysqli_error($conn) . "</p>";
    }
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
    <?php include 'nav.php'; ?>
    <?php if (!$gra): ?>
        <form method="POST" action="<?php echo htmlspecialchars(basename($_SERVER['PHP_SELF'])); ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label>Tytuł: <input type="text" name="tytul" value="<?php echo $tytul; ?>" required></label><br><br>
            <label>Gatunek: <input type="text" name="gatunek" value="<?php echo $gatunek; ?>" required></label><br><br>
            <label>Platforma: <input type="text" name="platforma" value="<?php echo $platforma; ?>" required></label><br><br>
            <label>Rok wydania: <input type="number" name="rok_wydania" value="<?php echo $rok_wydania; ?>" required></label><br><br>
            <label>Ocena: <input type="number" step="0.1" name="ocena" value="<?php echo $ocena; ?>" required></label><br><br>
            <button type="submit">Zaktualizuj grę</button>
        </form>
    <?php endif; ?>
    <?php include 'footer.php'; ?>
</body>
</html>