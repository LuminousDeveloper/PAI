<?php
require_once 'db_connect.php';

$komunikat = '';
$typKomunikatu = '';
$id = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $dbExists) {
    $id = (int) ($_POST['id'] ?? 0);

    if ($id <= 0) {
        $komunikat = "Podaj poprawne ID gry.";
        $typKomunikatu = "blad";
    } else {
        // Sprawdzenie, czy gra o podanym ID istnieje
        $sql = "SELECT id, tytul FROM gry WHERE id = $id";
        $wynik = mysqli_query($conn, $sql);

        if (!$wynik) {
            $komunikat = "Błąd pobierania gry: " . mysqli_error($conn);
            $typKomunikatu = "blad";
        } elseif (mysqli_num_rows($wynik) === 0) {
            $komunikat = "Gra o ID " . $id . " nie istnieje.";
            $typKomunikatu = "blad";
        } else {
            $row = mysqli_fetch_assoc($wynik);

            $sql = "DELETE FROM gry WHERE id = $id";

            if (mysqli_query($conn, $sql) && mysqli_affected_rows($conn) > 0) {
                $komunikat = "Gra \"" . $row['tytul'] . "\" (ID: " . $id . ") została usunięta.";
                $typKomunikatu = "sukces";
            } else {
                $komunikat = "Błąd usuwania gry: " . mysqli_error($conn);
                $typKomunikatu = "blad";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuń grę - Baza gier komputerowych</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'nav.php'; ?>

    <main>
        <h1>Usuń grę</h1>

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

            <p>Podaj ID gry, którą chcesz usunąć z bazy danych.</p>

            <form method="POST" action="<?= basename($_SERVER['PHP_SELF']) ?>">
                <label for="id">ID gry:</label>
                <input type="number" id="id" name="id" min="1" required>

                <button class="przycisk przycisk-usun" type="submit">Usuń grę</button>
            </form>

            <p><a href="lista.php">Zobacz listę gier i ich ID</a></p>
        <?php endif; ?>
    </main>

    <?php include 'footer.php'; ?>
