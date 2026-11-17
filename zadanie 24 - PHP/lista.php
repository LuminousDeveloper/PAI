<?php
require_once 'db_connect.php';

$komunikat = '';
$typKomunikatu = '';
$liczbaGier = 0;
$wynik = false;

if ($dbExists) {
    $sql = "SELECT * FROM gry ORDER BY id";
    $wynik = mysqli_query($conn, $sql);

    if ($wynik) {
        $liczbaGier = mysqli_num_rows($wynik);
    } else {
        $komunikat = "Błąd pobierania listy gier: " . mysqli_error($conn);
        $typKomunikatu = "blad";
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista gier - Baza gier komputerowych</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'nav.php'; ?>

    <main>
        <h1>Lista gier</h1>

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
            <?php else: ?>
                <p class="komunikat komunikat-info">
                    Liczba gier w bazie: <strong><?= $liczbaGier ?></strong>
                </p>

                <?php if ($liczbaGier === 0): ?>
                    <p>Baza jest pusta. <a href="dodaj.php">Dodaj pierwszą grę</a>.</p>
                <?php else: ?>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Tytuł</th>
                            <th>Gatunek</th>
                            <th>Platforma</th>
                            <th>Rok wydania</th>
                            <th>Ocena</th>
                            <th>Akcja</th>
                        </tr>

                        <?php while ($row = mysqli_fetch_assoc($wynik)): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['id']) ?></td>
                                <td><?= htmlspecialchars($row['tytul']) ?></td>
                                <td><?= htmlspecialchars($row['gatunek']) ?></td>
                                <td><?= htmlspecialchars($row['platforma']) ?></td>
                                <td><?= htmlspecialchars($row['rok_wydania']) ?></td>
                                <td><?= htmlspecialchars($row['ocena']) ?></td>
                                <td><a href="edytuj.php?id=<?= (int) $row['id'] ?>">Edytuj</a></td>
                            </tr>
                        <?php endwhile; ?>
                    </table>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
    </main>

    <?php include 'footer.php'; ?>
