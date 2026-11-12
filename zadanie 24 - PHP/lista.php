<?php 
include 'db_connect.php'; 
$db_check = @mysqli_select_db($conn, 'gry_db');
$wynik = null;
$liczba_gier = 0;

if ($db_check) {
    $sql = "SELECT * FROM gry";
    $wynik = mysqli_query($conn, $sql);
    if ($wynik) {
        $liczba_gier = mysqli_num_rows($wynik);
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Lista gier</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <?php include 'nav.php'; ?>

    <h1>Lista gier w bazie</h1>

    <?php if (!$db_check): ?>
        <p style="color: red;">Najpierw musisz utworzyć bazę danych! Przejdź do zakładki <a href="utworz.php">Utwórz bazę</a>.</p>
    <?php else: ?>
        <p>Liczba gier w bazie: <strong><?= $liczba_gier ?></strong></p>
        
        <?php if ($liczba_gier > 0): ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Tytuł</th>
                    <th>Gatunek</th>
                    <th>Platforma</th>
                    <th>Rok wydania</th>
                    <th>Ocena</th>
                </tr>
                <?php while($row = mysqli_fetch_assoc($wynik)): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['tytul']) ?></td>
                    <td><?= htmlspecialchars($row['gatunek']) ?></td>
                    <td><?= htmlspecialchars($row['platforma']) ?></td>
                    <td><?= htmlspecialchars($row['rok_wydania']) ?></td>
                    <td><?= htmlspecialchars($row['ocena']) ?></td>
                </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>Brak gier w bazie danych.</p>
        <?php endif; ?>
    <?php endif; ?>

<?php include 'footer.php'; ?>