<?php
require_once 'db_connect.php';

$komunikat = '';
$typKomunikatu = '';

$id = 0;
$edycja = false;
$gra = [
    'id' => 0,
    'tytul' => '',
    'gatunek' => '',
    'platforma' => '',
    'rok_wydania' => '',
    'ocena' => ''
];

if ($dbExists) {
    // Krok 1: wczytanie gry po ID przekazanym metodą GET
    if (isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] !== 'POST') {
        $id = (int) $_GET['id'];

        if ($id <= 0) {
            $komunikat = "Podaj poprawne ID gry.";
            $typKomunikatu = "blad";
        } else {
            $sql = "SELECT * FROM gry WHERE id = $id";
            $wynik = mysqli_query($conn, $sql);

            if (!$wynik) {
                $komunikat = "Błąd pobierania gry: " . mysqli_error($conn);
                $typKomunikatu = "blad";
            } elseif (mysqli_num_rows($wynik) === 0) {
                $komunikat = "Gra o ID " . $id . " nie istnieje.";
                $typKomunikatu = "blad";
            } else {
                $gra = mysqli_fetch_assoc($wynik);
                $edycja = true;
            }
        }
    }

    // Krok 2: zapis zmian przesłanych metodą POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = (int) ($_POST['id'] ?? 0);

        $gra['id'] = $id;
        $gra['tytul'] = trim($_POST['tytul'] ?? '');
        $gra['gatunek'] = trim($_POST['gatunek'] ?? '');
        $gra['platforma'] = trim($_POST['platforma'] ?? '');
        $gra['rok_wydania'] = trim($_POST['rok_wydania'] ?? '');
        $gra['ocena'] = trim($_POST['ocena'] ?? '');

        $rokLiczba = (int) $gra['rok_wydania'];
        $ocenaLiczba = (float) str_replace(',', '.', $gra['ocena']);

        if ($id <= 0) {
            $komunikat = "Podaj poprawne ID gry.";
            $typKomunikatu = "blad";
        } elseif ($gra['tytul'] === '' || $gra['gatunek'] === '' || $gra['platforma'] === '' || $gra['rok_wydania'] === '' || $gra['ocena'] === '') {
            $komunikat = "Wypełnij wszystkie pola formularza.";
            $typKomunikatu = "blad";
        } elseif ($rokLiczba < 1901 || $rokLiczba > 2155) {
            $komunikat = "Rok wydania musi być liczbą z zakresu od 1901 do 2155.";
            $typKomunikatu = "blad";
        } elseif (!is_numeric(str_replace(',', '.', $gra['ocena'])) || $ocenaLiczba < 0 || $ocenaLiczba > 10) {
            $komunikat = "Ocena musi być liczbą z zakresu od 0 do 10.";
            $typKomunikatu = "blad";
        } else {
            // Sprawdzenie, czy rekord nadal istnieje
            $sql = "SELECT id FROM gry WHERE id = $id";
            $sprawdzenie = mysqli_query($conn, $sql);

            if (!$sprawdzenie || mysqli_num_rows($sprawdzenie) === 0) {
                $komunikat = "Gra o ID " . $id . " nie istnieje.";
                $typKomunikatu = "blad";
            } else {
                $tytulSql = mysqli_real_escape_string($conn, $gra['tytul']);
                $gatunekSql = mysqli_real_escape_string($conn, $gra['gatunek']);
                $platformaSql = mysqli_real_escape_string($conn, $gra['platforma']);
                $ocenaSql = number_format($ocenaLiczba, 1, '.', '');

                $sql = "UPDATE gry SET
                            tytul = '$tytulSql',
                            gatunek = '$gatunekSql',
                            platforma = '$platformaSql',
                            rok_wydania = $rokLiczba,
                            ocena = $ocenaSql
                        WHERE id = $id";

                if (mysqli_query($conn, $sql)) {
                    $komunikat = "Dane gry o ID " . $id . " zostały zaktualizowane.";
                    $typKomunikatu = "sukces";

                    $sql = "SELECT * FROM gry WHERE id = $id";
                    $wynik = mysqli_query($conn, $sql);

                    if ($wynik && mysqli_num_rows($wynik) > 0) {
                        $gra = mysqli_fetch_assoc($wynik);
                    }

                    $edycja = true;
                } else {
                    $komunikat = "Błąd aktualizacji gry: " . mysqli_error($conn);
                    $typKomunikatu = "blad";
                    $edycja = true;
                }
            }
        }

        // Przy błędach walidacji również pokazujemy formularz edycji
        if ($komunikat !== '' && $typKomunikatu === "blad" && $id > 0) {
            $edycja = true;
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

    <main>
        <h1>Edytuj grę</h1>

        <?php if (!$dbExists): ?>
            <p>
                Baza danych jeszcze nie istnieje. Najpierw
                <a href="utworz.php">utwórz bazę i tabelę</a>.
            </p>
        <?php else: ?>
            <?php if ($komunikat !== ''): ?>
                <p>
                    <?= htmlspecialchars($komunikat) ?>
                </p>
            <?php endif; ?>

            <h2>Krok 1: wybierz grę</h2>

            <form method="GET" action="<?= basename($_SERVER['PHP_SELF']) ?>">
                <label for="id">ID gry:</label>
                <input type="number" id="id" name="id" min="1" required>

                <button type="submit">Wczytaj grę</button>
            </form>

            <?php if ($edycja): ?>
                <h2>Krok 2: zmień dane gry</h2>

                <form method="POST" action="<?= basename($_SERVER['PHP_SELF']) ?>">
                    <input type="hidden" name="id" value="<?= (int) $gra['id'] ?>">

                    <label for="tytul">Tytuł gry:</label>
                    <input type="text" id="tytul" name="tytul" maxlength="100"
                           value="<?= htmlspecialchars($gra['tytul']) ?>" required>

                    <label for="gatunek">Gatunek:</label>
                    <input type="text" id="gatunek" name="gatunek" maxlength="50"
                           value="<?= htmlspecialchars($gra['gatunek']) ?>" required>

                    <label for="platforma">Platforma:</label>
                    <input type="text" id="platforma" name="platforma" maxlength="50"
                           value="<?= htmlspecialchars($gra['platforma']) ?>" required>

                    <label for="rok_wydania">Rok wydania:</label>
                    <input type="number" id="rok_wydania" name="rok_wydania"
                           min="1901" max="2155" value="<?= htmlspecialchars($gra['rok_wydania']) ?>" required>

                    <label for="ocena">Ocena (0 - 10):</label>
                    <input type="number" id="ocena" name="ocena" step="0.1"
                           min="0" max="10" value="<?= htmlspecialchars($gra['ocena']) ?>" required>

                    <button type="submit" name="zapisz" value="1">Zapisz zmiany</button>
                </form>
            <?php endif; ?>

            <p><a href="lista.php">Powrót do listy gier</a></p>
        <?php endif; ?>
    </main>

    <?php include 'footer.php'; ?>
