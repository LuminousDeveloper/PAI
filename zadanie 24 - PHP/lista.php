<?php
require_once 'db_connect.php';

$komunikat = '';
$liczbaGier = 0;
$wynik = false;

if ($dbExists) {
    $sql = "SELECT * FROM gry";
    $wynik = mysqli_query($conn, $sql);

    if (!$wynik) {
        $komunikat = "Błąd pobierania gier: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista gier - Baza gier komputerowych</title>
</head>
<body>
    <?php include 'nav.php'; ?>

    <h1>Lista gier</h1>

    <?php if (!$dbExists): ?>
        <p>Baza danych jeszcze nie istnieje. Najpierw <a href="utworz.php">utwórz bazę i tabelę</a>.</p>
    <?php elseif ($komunikat != ''): ?>
        <p><?= htmlspecialchars($komunikat) ?></p>
    <?php else: ?>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Tytuł</th>
                <th>Gatunek</th>
                <th>Platforma</th>
                <th>Rok wydania</th>
                <th>Ocena</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($wynik)): ?>
                <?php $liczbaGier++; ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['tytul']) ?></td>
                    <td><?= htmlspecialchars($row['gatunek']) ?></td>
                    <td><?= htmlspecialchars($row['platforma']) ?></td>
                    <td><?= htmlspecialchars($row['rok_wydania']) ?></td>
                    <td><?= htmlspecialchars($row['ocena']) ?></td>
                </tr>
            <?php endwhile; ?>
        </table>

        <p>Liczba gier: <?= $liczbaGier ?></p>
    <?php endif; ?>

    <?php include 'footer.php'; ?>
