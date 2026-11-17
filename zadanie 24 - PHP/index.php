<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baza gier komputerowych - start</title>
</head>
<body>
    <?php include 'nav.php'; ?>

    <header>
        <h1>Baza gier komputerowych</h1>
        <p>
            Prosta aplikacja internetowa do zarządzania kolekcją gier komputerowych.
            Umożliwia wykonywanie wszystkich operacji CRUD na rekordach zapisanych
            w bazie danych MySQL.
        </p>
    </header>

    <main>
        <section>
            <h2>Opis aplikacji</h2>
            <p>
                Aplikacja korzysta z bazy <strong>gry_db</strong> oraz tabeli
                <strong>gry</strong>. Każda operacja znajduje się na osobnej
                podstronie, a poruszanie się między nimi umożliwia wspólne menu
                nawigacyjne.
            </p>
            <p>
                Komunikacja z bazą danych odbywa się wyłącznie za pomocą
                rozszerzenia <strong>mysqli</strong>.
            </p>
        </section>

        <section>
            <h2>Dostępne operacje</h2>

            <table border="1">
                <caption>Operacje CRUD dostępne w aplikacji</caption>
                <thead>
                    <tr>
                        <th>Operacja</th>
                        <th>Opis</th>
                        <th>Strona</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Create</td>
                        <td>Dodanie nowej gry do bazy danych.</td>
                        <td><a href="dodaj.php">Dodaj grę</a></td>
                    </tr>
                    <tr>
                        <td>Read</td>
                        <td>Wyświetlenie wszystkich gier oraz ich liczby.</td>
                        <td><a href="lista.php">Lista gier</a></td>
                    </tr>
                    <tr>
                        <td>Update</td>
                        <td>Wczytanie gry po ID i zmiana jej danych.</td>
                        <td><a href="edytuj.php">Edytuj grę</a></td>
                    </tr>
                    <tr>
                        <td>Delete</td>
                        <td>Usunięcie gry o podanym ID.</td>
                        <td><a href="usun.php">Usuń grę</a></td>
                    </tr>
                </tbody>
            </table>

            <p>
                Przed rozpoczęciem pracy należy utworzyć bazę danych i tabelę:
                <a href="utworz.php">przejdź do strony tworzenia bazy</a>.
            </p>
        </section>
    </main>

    <?php include 'footer.php'; ?>
