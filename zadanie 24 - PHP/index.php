<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baza gier komputerowych - start</title>
</head>
<body>
    <?php include 'nav.php'; ?>

    <main>
        <h1>Baza gier komputerowych</h1>

        <p>
            Prosta aplikacja internetowa do zarządzania kolekcją gier komputerowych.
            Umożliwia dodawanie, przeglądanie, edytowanie oraz usuwanie gier zapisanych
            w bazie danych MySQL. Wszystkie operacje CRUD wykonujemy za pomocą
            rozszerzenia <strong>mysqli</strong>.
        </p>

        <h2>Dostępne operacje</h2>

        <ul>
            <li><a href="utworz.php">Utwórz bazę i tabelę</a></li>
            <li><a href="dodaj.php">Dodaj grę</a></li>
            <li><a href="lista.php">Lista gier</a></li>
            <li><a href="edytuj.php">Edytuj grę</a></li>
            <li><a href="usun.php">Usuń grę</a></li>
        </ul>
    </main>

    <?php include 'footer.php'; ?>
