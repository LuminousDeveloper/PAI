<?php
require_once 'db_connect.php';

$komunikat = '';

if (isset($_POST['dodaj']) && $dbExists) {
    $tytul = $_POST['tytul'];
    $gatunek = $_POST['gatunek'];
    $platforma = $_POST['platforma'];
    $rok_wydania = $_POST['rok_wydania'];
    $ocena = $_POST['ocena'];

    $sql = "INSERT INTO gry (tytul, gatunek, platforma, rok_wydania, ocena)
            VALUES ('$tytul', '$gatunek', '$platforma', '$rok_wydania', '$ocena')";

    if (mysqli_query($conn, $sql)) {
        $komunikat = "Gra została dodana.";
    } else {
        $komunikat = "Błąd dodawania gry: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj grę - Baza gier komputerowych</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <?php include 'nav.php'; ?>

    <header>
        <h1>Dodaj grę</h1>
        <p>Wypełnij formularz, aby dodać nową grę do tabeli <strong>gry</strong>.</p>
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
                <h2>Formularz nowej gry</h2>

                <?php if ($komunikat != ''): ?>
                    <p><?= htmlspecialchars($komunikat) ?></p>
                <?php endif; ?>

                <form method="POST" action="<?= basename($_SERVER['PHP_SELF']) ?>">
                    <fieldset>
                        <legend>Dane gry</legend>

                        <p>
                            <label for="tytul">Tytuł gry:</label><br>
                            <input type="text" id="tytul" name="tytul" size="50">
                        </p>

                        <p>
                            <label for="gatunek">Gatunek:</label><br>
                            <input type="text" id="gatunek" name="gatunek" size="30">
                            <small>np. RPG, FPS, Strategia</small>
                        </p>

                        <p>
                            <label for="platforma">Platforma:</label><br>
                            <input type="text" id="platforma" name="platforma" size="30">
                            <small>np. PC, PlayStation 5, Xbox</small>
                        </p>

                        <p>
                            <label for="rok_wydania">Rok wydania:</label><br>
                            <input type="number" id="rok_wydania" name="rok_wydania">
                        </p>

                        <p>
                            <label for="ocena">Ocena:</label><br>
                            <input type="text" id="ocena" name="ocena" size="10">
                            <small>ocena od 0 do 10, np. 9.5</small>
                        </p>

                        <button type="submit" name="dodaj">Dodaj grę</button>
                    </fieldset>
                </form>
            </section>
        <?php endif; ?>
    </main>

    <?php include 'footer.php'; ?>
