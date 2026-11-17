<?php
require_once 'db_connect.php';

$komunikat = '';

if (isset($_POST['dodaj']) && $dbExists) {
    $tytul = $_POST['tytul'];
    $gatunek = $_POST['gatunek'];
    $platforma = $_POST['platforma'];
    $rok_wydania = $_POST['rok_wydania'];
    $ocena = $_POST['ocena'];

    $sql = "INSERT INTO gry (tytul, gatunek, platforma, rok_wydania, ocena)
            VALUES ('$tytul', '$gatunek', '$platforma', '$rok_wydania', '$ocena')";

    if (mysqli_query($conn, $sql)) {
        $komunikat = "Gra została dodana.";
    } else {
        $komunikat = "Błąd dodawania gry: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj grę - Baza gier komputerowych</title>
</head>
<body>
    <?php include 'nav.php'; ?>

    <h1>Dodaj grę</h1>

    <?php if (!$dbExists): ?>
        <p>Baza danych jeszcze nie istnieje. Najpierw <a href="utworz.php">utwórz bazę i tabelę</a>.</p>
    <?php else: ?>
        <?php if ($komunikat != ''): ?>
            <p><?= htmlspecialchars($komunikat) ?></p>
        <?php endif; ?>

        <form method="POST" action="<?= basename($_SERVER['PHP_SELF']) ?>">
            <label for="tytul">Tytuł gry:</label>
            <input type="text" id="tytul" name="tytul"><br>

            <label for="gatunek">Gatunek:</label>
            <input type="text" id="gatunek" name="gatunek"><br>

            <label for="platforma">Platforma:</label>
            <input type="text" id="platforma" name="platforma"><br>

            <label for="rok_wydania">Rok wydania:</label>
            <input type="number" id="rok_wydania" name="rok_wydania"><br>

            <label for="ocena">Ocena:</label>
            <input type="text" id="ocena" name="ocena"><br>

            <button type="submit" name="dodaj">Dodaj grę</button>
        </form>
    <?php endif; ?>

    <?php include 'footer.php'; ?>
