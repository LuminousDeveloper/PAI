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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <?php include 'nav.php'; ?>

    <header>
        <h1>Lista gier</h1>
        <p>Wszystkie gry zapisane w tabeli <strong>gry</strong> wraz z liczbą rekordów.</p>
    </header>

    <main>
        <?php if (!$dbExists): ?>
            <section>
                <h2>Baza danych nie istnieje</h2>
                <p>
                    Baza danych jeszcze nie istnieje. Najpierw
                    <a href="utworz.php">utwórz bazę i tabelę</a>.
                </p>
            </section>
        <?php elseif ($komunikat != ''): ?>
            <section>
                <h2>Błąd odczytu danych</h2>
                <p><?= htmlspecialchars($komunikat) ?></p>
            </section>
        <?php else: ?>
            <section>
                <h2>Kolekcja gier</h2>

                <table border="1">
                    <caption>Lista gier komputerowych</caption>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tytuł</th>
                            <th>Gatunek</th>
                            <th>Platforma</th>
                            <th>Rok wydania</th>
                            <th>Ocena</th>
                        </tr>
                    </thead>
                    <tbody>
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
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6">Liczba gier: <?= $liczbaGier ?></td>
                        </tr>
                    </tfoot>
                </table>

                <?php if ($liczbaGier == 0): ?>
                    <p>Baza jest pusta. <a href="dodaj.php">Dodaj pierwszą grę</a>.</p>
                <?php endif; ?>
            </section>
        <?php endif; ?>
    </main>

    <?php include 'footer.php'; ?>
