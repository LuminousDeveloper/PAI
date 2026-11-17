<?php
require_once 'db_connect.php';

$komunikat = '';
$edycja = false;
$gra = array(
    'id' => '',
    'tytul' => '',
    'gatunek' => '',
    'platforma' => '',
    'rok_wydania' => '',
    'ocena' => ''
);

if ($dbExists) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM gry WHERE id = $id";
        $wynik = mysqli_query($conn, $sql);

        if ($wynik) {
            $gra = mysqli_fetch_assoc($wynik);

            if ($gra) {
                $edycja = true;
            } else {
                $komunikat = "Gra o ID $id nie istnieje.";
            }
        } else {
            $komunikat = "Błąd pobierania gry: " . mysqli_error($conn);
        }
    }

    if (isset($_POST['zapisz'])) {
        $id = $_POST['id'];
        $tytul = $_POST['tytul'];
        $gatunek = $_POST['gatunek'];
        $platforma = $_POST['platforma'];
        $rok_wydania = $_POST['rok_wydania'];
        $ocena = $_POST['ocena'];

        $sql = "UPDATE gry SET
                    tytul = '$tytul',
                    gatunek = '$gatunek',
                    platforma = '$platforma',
                    rok_wydania = '$rok_wydania',
                    ocena = '$ocena'
                WHERE id = $id";

        if (mysqli_query($conn, $sql)) {
            $komunikat = "Dane gry o ID $id zostały zaktualizowane.";
        } else {
            $komunikat = "Błąd aktualizacji gry: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj grę - Baza gier komputerowych</title>
</head>
<body>
    <?php include 'nav.php'; ?>

    <h1>Edytuj grę</h1>

    <?php if (!$dbExists): ?>
        <p>Baza danych jeszcze nie istnieje. Najpierw <a href="utworz.php">utwórz bazę i tabelę</a>.</p>
    <?php else: ?>
        <?php if ($komunikat != ''): ?>
            <p><?= htmlspecialchars($komunikat) ?></p>
        <?php endif; ?>

        <h2>Krok 1: wybierz grę</h2>

        <form method="GET" action="<?= basename($_SERVER['PHP_SELF']) ?>">
            <label for="id">ID gry:</label>
            <input type="number" id="id" name="id"><br>

            <button type="submit">Wczytaj grę</button>
        </form>

        <?php if ($edycja): ?>
            <h2>Krok 2: zmień dane gry</h2>

            <form method="POST" action="<?= basename($_SERVER['PHP_SELF']) ?>">
                <input type="hidden" name="id" value="<?= htmlspecialchars($gra['id']) ?>">

                <label for="tytul">Tytuł gry:</label>
                <input type="text" id="tytul" name="tytul" value="<?= htmlspecialchars($gra['tytul']) ?>"><br>

                <label for="gatunek">Gatunek:</label>
                <input type="text" id="gatunek" name="gatunek" value="<?= htmlspecialchars($gra['gatunek']) ?>"><br>

                <label for="platforma">Platforma:</label>
                <input type="text" id="platforma" name="platforma" value="<?= htmlspecialchars($gra['platforma']) ?>"><br>

                <label for="rok_wydania">Rok wydania:</label>
                <input type="number" id="rok_wydania" name="rok_wydania" value="<?= htmlspecialchars($gra['rok_wydania']) ?>"><br>

                <label for="ocena">Ocena:</label>
                <input type="text" id="ocena" name="ocena" value="<?= htmlspecialchars($gra['ocena']) ?>"><br>

                <button type="submit" name="zapisz">Zapisz zmiany</button>
            </form>
        <?php endif; ?>
    <?php endif; ?>

    <?php include 'footer.php'; ?>
