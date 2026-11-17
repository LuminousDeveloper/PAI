<?php
require_once 'db_connect.php';

$komunikat = '';
$typKomunikatu = '';

$tytul = '';
$gatunek = '';
$platforma = '';
$rok_wydania = '';
$ocena = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $dbExists) {
    $tytul = trim($_POST['tytul'] ?? '');
    $gatunek = trim($_POST['gatunek'] ?? '');
    $platforma = trim($_POST['platforma'] ?? '');
    $rok_wydania = trim($_POST['rok_wydania'] ?? '');
    $ocena = trim($_POST['ocena'] ?? '');

    $rokLiczba = (int) $rok_wydania;
    $ocenaLiczba = (float) str_replace(',', '.', $ocena);

    if ($tytul === '' || $gatunek === '' || $platforma === '' || $rok_wydania === '' || $ocena === '') {
        $komunikat = "Wypełnij wszystkie pola formularza.";
        $typKomunikatu = "blad";
    } elseif ($rokLiczba < 1901 || $rokLiczba > 2155) {
        $komunikat = "Rok wydania musi być liczbą z zakresu od 1901 do 2155.";
        $typKomunikatu = "blad";
    } elseif (!is_numeric(str_replace(',', '.', $ocena)) || $ocenaLiczba < 0 || $ocenaLiczba > 10) {
        $komunikat = "Ocena musi być liczbą z zakresu od 0 do 10.";
        $typKomunikatu = "blad";
    } else {
        $tytulSql = mysqli_real_escape_string($conn, $tytul);
        $gatunekSql = mysqli_real_escape_string($conn, $gatunek);
        $platformaSql = mysqli_real_escape_string($conn, $platforma);
        $ocenaSql = number_format($ocenaLiczba, 1, '.', '');

        $sql = "INSERT INTO gry (tytul, gatunek, platforma, rok_wydania, ocena)
                VALUES ('$tytulSql', '$gatunekSql', '$platformaSql', $rokLiczba, $ocenaSql)";

        if (mysqli_query($conn, $sql)) {
            $komunikat = "Gra \"" . $tytul . "\" została dodana do bazy.";
            $typKomunikatu = "sukces";

            $tytul = '';
            $gatunek = '';
            $platforma = '';
            $rok_wydania = '';
            $ocena = '';
        } else {
            $komunikat = "Błąd dodawania gry: " . mysqli_error($conn);
            $typKomunikatu = "blad";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj grę - Baza gier komputerowych</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'nav.php'; ?>

    <main>
        <h1>Dodaj grę</h1>

        <?php if (!$dbExists): ?>
            <p class="komunikat komunikat-info">
                Baza danych jeszcze nie istnieje. Najpierw
                <a href="utworz.php">utwórz bazę i tabelę</a>.
            </p>
        <?php else: ?>
            <?php if ($komunikat !== ''): ?>
                <p class="komunikat komunikat-<?= $typKomunikatu ?>">
                    <?= htmlspecialchars($komunikat) ?>
                </p>
            <?php endif; ?>

            <form method="POST" action="<?= basename($_SERVER['PHP_SELF']) ?>">
                <label for="tytul">Tytuł gry:</label>
                <input type="text" id="tytul" name="tytul" maxlength="100"
                       value="<?= htmlspecialchars($tytul) ?>" required>

                <label for="gatunek">Gatunek:</label>
                <input type="text" id="gatunek" name="gatunek" maxlength="50"
                       placeholder="np. RPG" value="<?= htmlspecialchars($gatunek) ?>" required>

                <label for="platforma">Platforma:</label>
                <input type="text" id="platforma" name="platforma" maxlength="50"
                       placeholder="np. PC" value="<?= htmlspecialchars($platforma) ?>" required>

                <label for="rok_wydania">Rok wydania:</label>
                <input type="number" id="rok_wydania" name="rok_wydania"
                       min="1901" max="2155" value="<?= htmlspecialchars($rok_wydania) ?>" required>

                <label for="ocena">Ocena (0 - 10):</label>
                <input type="number" id="ocena" name="ocena" step="0.1"
                       min="0" max="10" value="<?= htmlspecialchars($ocena) ?>" required>

                <button class="przycisk" type="submit">Dodaj grę</button>
            </form>
        <?php endif; ?>
    </main>

    <?php include 'footer.php'; ?>
