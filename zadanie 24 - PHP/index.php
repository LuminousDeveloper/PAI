<?php
require_once 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baza gier komputerowych - start</title>
    <link rel="stylesheet" href="style.css">
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

        <?php if ($dbExists): ?>
            <p class="komunikat komunikat-sukces">
                Baza <strong>gry_db</strong> jest gotowa do pracy.
            </p>
        <?php else: ?>
            <p class="komunikat komunikat-info">
                Baza <strong>gry_db</strong> jeszcze nie istnieje.
                <a href="utworz.php">Utwórz bazę i tabelę</a>, aby rozpocząć.
            </p>
        <?php endif; ?>

        <h2>Dostępne operacje</h2>

        <div class="karty">
            <div class="karta">
                <h3>Dodaj grę</h3>
                <p>Dodaj nową grę do bazy za pomocą formularza (INSERT).</p>
                <a class="przycisk" href="dodaj.php">Przejdź</a>
            </div>

            <div class="karta">
                <h3>Lista gier</h3>
                <p>Zobacz wszystkie gry zapisane w bazie (SELECT).</p>
                <a class="przycisk" href="lista.php">Przejdź</a>
            </div>

            <div class="karta">
                <h3>Edytuj grę</h3>
                <p>Wczytaj grę po ID i zmień jej dane (UPDATE).</p>
                <a class="przycisk" href="edytuj.php">Przejdź</a>
            </div>

            <div class="karta">
                <h3>Usuń grę</h3>
                <p>Usuń wybraną grę z bazy po numerze ID (DELETE).</p>
                <a class="przycisk" href="usun.php">Przejdź</a>
            </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>
