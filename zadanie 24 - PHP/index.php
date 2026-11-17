<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baza gier komputerowych - start</title>
</head>
<body>
    <?php include 'nav.php'; ?>

    <h1>Baza gier komputerowych</h1>

    <p>
        Prosta aplikacja do zarządzania kolekcją gier komputerowych.
        Umożliwia dodawanie, wyświetlanie, edytowanie oraz usuwanie gier
        zapisanych w bazie danych MySQL.
    </p>

    <p><a href="utworz.php">Utwórz bazę i tabelę</a></p>
    <p><a href="dodaj.php">Dodaj grę</a></p>
    <p><a href="lista.php">Lista gier</a></p>
    <p><a href="edytuj.php">Edytuj grę</a></p>
    <p><a href="usun.php">Usuń grę</a></p>

    <?php include 'footer.php'; ?>
