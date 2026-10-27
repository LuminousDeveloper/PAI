<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method="GET" action="">
        <label for="imie">Imię:</label>
        <input type="text" id="imie" name="imie">
        <button type="submit">Wyślij</button>
    </form>
    <hr>

    <form method="POST" action="">
        <label for="wiek">Wiek:</label>
        <input type="number" id="wiek" name="wiek">
        <button type="submit">Wyślij</button>
    </form>
    <hr>

    <form method="POST" action="">
        <label for="nazwa_produktu">Nazwa produktu:</label>
        <input type="text" id="nazwa_produktu" name="nazwa_produktu">

        <label for="cena_jednego_produktu">Cena jednego produktu:</label>
        <input type="number" id="cena_jednego_produktu" name="cena_jednego_produktu">

        <label for="liczba_zakupionych_sztuk">Liczba zakupionych sztuk:</label>
        <input type="number" id="liczba_zakupionych_sztuk" name="Liczba_zakupionych_sztuk">

        <button type="submit">Oblicz</button>
    </form>
    <hr>

    <?php
    if (isset($_GET['imie'])) {
        echo $_GET['imie'];
    }

    if (isset($_POST['wiek'])) {
        echo $_POST['wiek'];
    }

    if (
        isset($_POST['nazwa_produktu']) &&
        isset($_POST['cena_jednego_produktu']) &&
        isset($_POST['Liczba_zakupionych_sztuk'])
    ) {
        $nazwa_produktu = $_POST['nazwa_produktu'];
        $cena_jednego_produktu = (int) $_POST['cena_jednego_produktu'];
        $liczba_zakupionych_sztuk = (int) $_POST['Liczba_zakupionych_sztuk'];

        $calkowity_koszt = $cena_jednego_produktu * $liczba_zakupionych_sztuk;

        echo "Nazwa produktu: " . $nazwa_produktu . "<br>";
        echo "Cena jednego produktu: " . $cena_jednego_produktu . "<br>";
        echo "Liczba zakupionych sztuk: " . $liczba_zakupionych_sztuk . "<br>";
        echo "Całkowity koszt: " . $calkowity_koszt;
    }
    ?>
</body>
</html>

<?php
session_start();

// Jeśli koszyk nie istnieje, tworzymy pustą tablicę
if (!isset($_SESSION['koszyk'])) {
    $_SESSION['koszyk'] = array();
}

// Czyszczenie koszyka
if (isset($_POST['wyczysc'])) {
    $_SESSION['koszyk'] = array();
}

// Dodawanie produktu do koszyka
if (isset($_POST['dodaj'])) {
    $nazwa = $_POST['nazwa'];
    $cena = $_POST['cena'];
    $sztuki = $_POST['sztuki'];

    // Prosta walidacja (czy pola nie są puste i są większe od zera)
    if ($nazwa != "" && $cena > 0 && $sztuki > 0) {
        $_SESSION['koszyk'][] = array(
            'nazwa' => $nazwa,
            'cena' => $cena,
            'sztuki' => $sztuki
        );
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sklep</title>
</head>
<body>

    <h2>Formularz dodawania produktu</h2>
    <form method="POST">
        Nazwa produktu: <input type="text" name="nazwa"><br><br>
        Cena jednostkowa: <input type="number" name="cena"><br><br>
        Liczba sztuk: <input type="number" name="sztuki"><br><br>
        <input type="submit" name="dodaj" value="Dodaj do koszyka">
    </form>

    <h2>Twój koszyk</h2>
    <table border="1">
        <tr>
            <th>Nazwa produktu</th>
            <th>Cena jednostkowa</th>
            <th>Liczba sztuk</th>
            <th>Wartość pozycji</th>
        </tr>
        <?php
        $suma = 0;
        foreach ($_SESSION['koszyk'] as $produkt) {
            $wartosc = $produkt['cena'] * $produkt['sztuki'];
            $suma = $suma + $wartosc;

            echo "<tr>";
            echo "<td>" . $produkt['nazwa'] . "</td>";
            echo "<td>" . $produkt['cena'] . " zł</td>";
            echo "<td>" . $produkt['sztuki'] . "</td>";
            echo "<td>" . $wartosc . " zł</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <?php
    // Obliczanie rabatu
    $rabat = 0;
    if ($suma > 500) {
        $rabat = $suma * 0.10;
    }
    $do_zaplaty = $suma - $rabat;
    ?>

    <h3>Podsumowanie</h3>
    <p>Wartość przed rabatem: <?php echo $suma; ?> zł</p>
    <p>Rabat: <?php echo $rabat; ?> zł</p>
    <p><strong>Do zapłaty: <?php echo $do_zaplaty; ?> zł</strong></p>

    <form method="POST">
        <input type="submit" name="wyczysc" value="Wyczyść koszyk">
    </form>

</body>
</html>
