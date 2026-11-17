<?php
require_once 'db_connect.php';

$komunikat = '';

if (isset($_POST['utworz'])) {
    $sql = "CREATE DATABASE IF NOT EXISTS $database";

    if (mysqli_query($conn, $sql)) {
        $dbExists = true;

        $sql = "USE $database";
        mysqli_query($conn, $sql);

        $sql = "CREATE TABLE IF NOT EXISTS gry (
            id INT AUTO_INCREMENT PRIMARY KEY,
            tytul VARCHAR(100),
            gatunek VARCHAR(50),
            platforma VARCHAR(50),
            rok_wydania YEAR,
            ocena DECIMAL(3,1)
        )";

        if (mysqli_query($conn, $sql)) {
            $komunikat = "Baza gry_db oraz tabela gry zostały utworzone.";
        } else {
            $komunikat = "Błąd tworzenia tabeli: " . mysqli_error($conn);
        }
    } else {
        $komunikat = "Błąd tworzenia bazy: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utwórz bazę - Baza gier komputerowych</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <?php include 'nav.php'; ?>

    <header>
        <h1>Utwórz bazę danych</h1>
        <p>
            Ta strona tworzy bazę <strong>gry_db</strong> oraz tabelę
            <strong>gry</strong>. Jeżeli baza lub tabela już istnieją,
            nie zostaną nadpisane.
        </p>
    </header>

    <main>
        <section>
            <h2>Tworzenie bazy i tabeli</h2>

            <?php if ($komunikat != ''): ?>
                <p><?= htmlspecialchars($komunikat) ?></p>
            <?php endif; ?>

            <form method="POST" action="<?= basename($_SERVER['PHP_SELF']) ?>">
                <fieldset>
                    <legend>Utwórz strukturę bazy danych</legend>
                    <p>Kliknij przycisk, aby wykonać polecenia CREATE DATABASE i CREATE TABLE.</p>
                    <button type="submit" name="utworz">Utwórz bazę i tabelę</button>
                </fieldset>
            </form>
        </section>

        <section>
            <h2>Struktura tabeli gry</h2>

            <table border="1">
                <caption>Kolumny tabeli gry</caption>
                <thead>
                    <tr>
                        <th>Kolumna</th>
                        <th>Typ</th>
                        <th>Opis</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>id</td>
                        <td>INT, AUTO_INCREMENT, PK</td>
                        <td>identyfikator gry</td>
                    </tr>
                    <tr>
                        <td>tytul</td>
                        <td>VARCHAR(100)</td>
                        <td>tytuł gry, np. Wiedźmin 3</td>
                    </tr>
                    <tr>
                        <td>gatunek</td>
                        <td>VARCHAR(50)</td>
                        <td>RPG, FPS, Strategia itp.</td>
                    </tr>
                    <tr>
                        <td>platforma</td>
                        <td>VARCHAR(50)</td>
                        <td>PC, PlayStation 5, Xbox itp.</td>
                    </tr>
                    <tr>
                        <td>rok_wydania</td>
                        <td>YEAR</td>
                        <td>rok premiery gry</td>
                    </tr>
                    <tr>
                        <td>ocena</td>
                        <td>DECIMAL(3,1)</td>
                        <td>ocena od 0 do 10, np. 9.5</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>

    <?php include 'footer.php'; ?>
