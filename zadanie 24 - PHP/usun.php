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

    <header>
        <h1>Usuń grę</h1>
        <p>Usuwanie gry z tabeli <strong>gry</strong> na podstawie numeru ID.</p>
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
        <?php else: ?>
            <section>
                <h2>Formularz usuwania</h2>

                <?php if ($komunikat != ''): ?>
                    <p><?= htmlspecialchars($komunikat) ?></p>
                <?php endif; ?>

                <p>
                    <strong>Uwaga:</strong> usunięcie gry jest nieodwracalne.
                    Numer ID możesz sprawdzić na stronie
                    <a href="lista.php">listy gier</a>.
                </p>

                <form method="POST" action="<?= basename($_SERVER['PHP_SELF']) ?>">
                    <fieldset>
                        <legend>Dane gry do usunięcia</legend>

                        <p>
                            <label for="id">ID gry:</label><br>
                            <input type="number" id="id" name="id">
                        </p>

                        <button type="submit" name="usun">Usuń grę</button>
                    </fieldset>
                </form>
            </section>
        <?php endif; ?>
    </main>

    <?php include 'footer.php'; ?>
