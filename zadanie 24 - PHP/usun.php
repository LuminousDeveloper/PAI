<?php 
include 'db_connect.php'; 
$db_check = @mysqli_select_db($conn, 'gry_db');
$komunikat = "";

if ($db_check && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = trim($_POST['id']);

    if (!empty($id) && is_numeric($id)) {
        $id_clean = mysqli_real_escape_string($conn, $id);
        
        // Sprawdzenie czy rekord istnieje przed usunięciem
        $sql_check = "SELECT * FROM gry WHERE id = $id_clean";
        $res_check = mysqli_query($conn, $sql_check);

        if (mysqli_num_rows($res_check) > 0) {
            $sql = "DELETE FROM gry WHERE id = $id_clean";
            if (mysqli_query($conn, $sql)) {
                $komunikat = "<p style='color: green;'>Gra o ID $id została pomyślnie usunięta.</p>";
            } else {
                $komunikat = "<p style='color: red;'>Błąd podczas usuwania: " . mysqli_error($conn) . "</p>";
            }
        } else {
            $komunikat = "<p style='color: red;'>Rekord o podanym ID ($id) nie istnieje w bazie!</p>";
        }
    } else {
        $komunikat = "<p style='color: red;'>Podaj poprawne, numeryczne ID.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Usuń grę</title>
</head>
<body>
    <?php include 'nav.php'; ?>

    <h1>Usuń grę z bazy</h1>

    <?php if (!$db_check): ?>
        <p style="color: red;">Najpierw musisz utworzyć bazę danych! Przejdź do zakładki <a href="utworz.php">Utwórz bazę</a>.</p>
    <?php else: ?>
        <?= $komunikat ?>
        <form action="<?= htmlspecialchars(basename($_SERVER['PHP_SELF'])) ?>" method="POST">
            <label>Podaj ID gry do usunięcia: <input type="number" name="id" required></label><br><br>
            <button type="submit" onclick="return confirm('Czy na pewno chcesz usunąć tę grę?');">Usuń grę</button>
        </form>
    <?php endif; ?>

<?php include 'footer.php'; ?>