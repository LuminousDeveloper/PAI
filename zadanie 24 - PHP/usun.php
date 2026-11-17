<?php
require_once 'db_connect.php';

$komunikat = '';

if (isset($_POST['usun']) && $dbExists) {
    $id = $_POST['id'];

    $sql = "DELETE FROM gry WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        if (mysqli_affected_rows($conn) > 0) {
            $komunikat = "Gra o ID $id została usunięta.";
        } else {
            $komunikat = "Gra o ID $id nie istnieje.";
        }
    } else {
        $komunikat = "Błąd usuwania gry: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuń grę - Baza gier komputerowych</title>
</head>
<body>
    <?php include 'nav.php'; ?>

    <h1>Usuń grę</h1>

    <?php if (!$dbExists): ?>
        <p>Baza danych jeszcze nie istnieje. Najpierw <a href="utworz.php">utwórz bazę i tabelę</a>.</p>
    <?php else: ?>
        <?php if ($komunikat != ''): ?>
            <p><?= htmlspecialchars($komunikat) ?></p>
        <?php endif; ?>

        <form method="POST" action="<?= basename($_SERVER['PHP_SELF']) ?>">
            <label for="id">ID gry:</label>
            <input type="number" id="id" name="id"><br>

            <button type="submit" name="usun">Usuń grę</button>
        </form>
    <?php endif; ?>

    <?php include 'footer.php'; ?>
