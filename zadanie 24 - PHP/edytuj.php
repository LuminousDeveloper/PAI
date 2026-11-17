<?php
require_once 'db_connect.php';

$komunikat = '';
$edycja = false;
$gra = array(
    'id' => '',
    'tytul' => '',
    'gatunek' => '',
    'platforma' => '',
    'rok_wydania' => '',
    'ocena' => ''
);

if ($dbExists) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM gry WHERE id = $id";
        $wynik = mysqli_query($conn, $sql);

        if ($wynik) {
            $gra = mysqli_fetch_assoc($wynik);

            if ($gra) {
                $edycja = true;
            } else {
                $komunikat = "Gra o ID $id nie istnieje.";
            }
        } else {
            $komunikat = "Błąd pobierania gry: " . mysqli_error($conn);
        }
    }

    if (isset($_POST['zapisz'])) {
        $id = $_POST['id'];
        $tytul = $_POST['tytul'];
        $gatunek = $_POST['gatunek'];
        $platforma = $_POST['platforma'];
        $rok_wydania = $_POST['rok_wydania'];
        $ocena = $_POST['ocena'];

        $sql = "UPDATE gry SET
                    tytul = '$tytul',
                    gatunek = '$gatunek',
                    platforma = '$platforma',
                    rok_wydania = '$rok_wydania',
                    ocena = '$ocena'
                WHERE id = $id";

        if (mysqli_query($conn, $sql)) {
            $komunikat = "Dane gry o ID $id zostały zaktualizowane.";
        } else {
            $komunikat = "Błąd aktualizacji gry: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj grę - Baza gier komputerowych</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <?php include 'nav.php'; ?>

    <header>
        <h1>Edytuj grę</h1>
        <p>
            Edycja przebiega w dwóch krokach: najpierw wczytujesz grę po ID,
            a następnie zmieniasz jej dane i zapisujesz zmiany.
        </p>
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
            <?php if ($komunikat != ''): ?>
                <p><?= htmlspecialchars($komunikat) ?></p>
            <?php endif; ?>

            <section>
                <h2>Krok 1: wybierz grę</h2>

                <form method="GET" action="<?= basename($_SERVER['PHP_SELF']) ?>">
                    <fieldset>
                        <legend>Wczytanie gry po ID</legend>

                        <p>
                            <label for="id">ID gry:</label><br>
                            <input type="number" id="id" name="id">
                        </p>

                        <button type="submit">Wczytaj grę</button>
                    </fieldset>
                </form>
            </section>

            <?php if ($edycja): ?>
                <section>
                    <h2>Krok 2: zmień dane gry</h2>

                    <form method="POST" action="<?= basename($_SERVER['PHP_SELF']) ?>">
                        <fieldset>
                            <legend>Dane gry o ID <?= htmlspecialchars($gra['id']) ?></legend>

                            <input type="hidden" name="id" value="<?= htmlspecialchars($gra['id']) ?>">

                            <p>
                                <label for="tytul">Tytuł gry:</label><br>
                                <input type="text" id="tytul" name="tytul" value="<?= htmlspecialchars($gra['tytul']) ?>" size="50">
                            </p>

                            <p>
                                <label for="gatunek">Gatunek:</label><br>
                                <input type="text" id="gatunek" name="gatunek" value="<?= htmlspecialchars($gra['gatunek']) ?>" size="30">
                            </p>

                            <p>
                                <label for="platforma">Platforma:</label><br>
                                <input type="text" id="platforma" name="platforma" value="<?= htmlspecialchars($gra['platforma']) ?>" size="30">
                            </p>

                            <p>
                                <label for="rok_wydania">Rok wydania:</label><br>
                                <input type="number" id="rok_wydania" name="rok_wydania" value="<?= htmlspecialchars($gra['rok_wydania']) ?>">
                            </p>

                            <p>
                                <label for="ocena">Ocena:</label><br>
                                <input type="text" id="ocena" name="ocena" value="<?= htmlspecialchars($gra['ocena']) ?>" size="10">
                            </p>

                            <button type="submit" name="zapisz">Zapisz zmiany</button>
                        </fieldset>
                    </form>
                </section>
            <?php endif; ?>

            <p><a href="lista.php">Powrót do listy gier</a></p>
        <?php endif; ?>
    </main>

    <?php include 'footer.php'; ?>
