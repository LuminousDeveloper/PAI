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
</head>
<body>
    <?php include 'nav.php'; ?>

    <h1>Utwórz bazę danych</h1>

    <p>Kliknij przycisk, aby utworzyć bazę gry_db oraz tabelę gry.</p>

    <?php if ($komunikat != ''): ?>
        <p><?= htmlspecialchars($komunikat) ?></p>
    <?php endif; ?>

    <form method="POST" action="<?= basename($_SERVER['PHP_SELF']) ?>">
        <button type="submit" name="utworz">Utwórz bazę i tabelę</button>
    </form>

    <?php include 'footer.php'; ?>
