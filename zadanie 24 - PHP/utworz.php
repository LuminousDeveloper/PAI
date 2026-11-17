<?php
require_once 'db_connect.php';

$komunikat = '';
$typKomunikatu = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tworzenie bazy danych gry_db
    $sql = "CREATE DATABASE IF NOT EXISTS $database CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";

    if (mysqli_query($conn, $sql)) {
        // Wybranie utworzonej bazy
        if (mysqli_select_db($conn, $database)) {
            $dbExists = true;
            mysqli_set_charset($conn, "utf8mb4");

            // Tworzenie tabeli gry
            $sql = "CREATE TABLE IF NOT EXISTS gry (
                id INT AUTO_INCREMENT PRIMARY KEY,
                tytul VARCHAR(100) NOT NULL,
                gatunek VARCHAR(50) NOT NULL,
                platforma VARCHAR(50) NOT NULL,
                rok_wydania YEAR NOT NULL,
                ocena DECIMAL(3,1) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

            if (mysqli_query($conn, $sql)) {
                $komunikat = "Baza gry_db oraz tabela gry zostały utworzone.";
                $typKomunikatu = "sukces";
            } else {
                $komunikat = "Błąd tworzenia tabeli gry: " . mysqli_error($conn);
                $typKomunikatu = "blad";
            }
        } else {
            $komunikat = "Błąd wybierania bazy gry_db: " . mysqli_error($conn);
            $typKomunikatu = "blad";
        }
    } else {
        $komunikat = "Błąd tworzenia bazy gry_db: " . mysqli_error($conn);
        $typKomunikatu = "blad";
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utwórz bazę - Baza gier komputerowych</title>
</head>
<body>
    <?php include 'nav.php'; ?>

    <main>
        <h1>Utwórz bazę danych</h1>

        <p>
            Kliknij przycisk poniżej, aby utworzyć bazę <strong>gry_db</strong>
            oraz tabelę <strong>gry</strong>. Jeśli baza i tabela już istnieją,
            nic nie zostanie nadpisane.
        </p>

        <?php if ($komunikat !== ''): ?>
            <p>
                <?= htmlspecialchars($komunikat) ?>
            </p>
        <?php endif; ?>

        <form method="POST" action="<?= basename($_SERVER['PHP_SELF']) ?>">
            <button type="submit">Utwórz bazę i tabelę</button>
        </form>

        <h2>Struktura tabeli gry</h2>

        <table>
            <tr>
                <th>Kolumna</th>
                <th>Typ</th>
                <th>Opis</th>
            </tr>
            <tr>
                <td>id</td>
                <td>INT, AUTO_INCREMENT, PK</td>
                <td>identyfikator gry</td>
            </tr>
            <tr>
                <td>tytul</td>
                <td>VARCHAR(100)</td>
                <td>tytuł gry</td>
            </tr>
            <tr>
                <td>gatunek</td>
                <td>VARCHAR(50)</td>
                <td>RPG, FPS, Strategia...</td>
            </tr>
            <tr>
                <td>platforma</td>
                <td>VARCHAR(50)</td>
                <td>PC, PlayStation 5, Xbox...</td>
            </tr>
            <tr>
                <td>rok_wydania</td>
                <td>YEAR</td>
                <td>rok premiery</td>
            </tr>
            <tr>
                <td>ocena</td>
                <td>DECIMAL(3,1)</td>
                <td>ocena od 0 do 10</td>
            </tr>
        </table>
    </main>

    <?php include 'footer.php'; ?>
