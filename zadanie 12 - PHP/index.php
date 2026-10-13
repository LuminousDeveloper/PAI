<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./" method="POST"> 
        <label for="login">Login: </label>
        <input type="text" id="login" name="login"> <br>
        <label for="E-mail">E-mail: </label>
        <input type="email" id="email" name="email"> <br>
        <label for="haslo">Hasło: </label>
        <input type="password" id="haslo" name="haslo"> <br>
        <label for="wiek">Wiek: </label>
        <input type="number" id="wiek" name="wiek"> <br>
        <label for="checkbox">Akceptacja Regulaminu: </label>
        <input type="checkbox" id="checkbox" name="checkbox"> <br>
        <input type="submit" value="Zarejestruj się">
    </form> 
</body>
</html>


<?php
 if (isset($_POST['login'])) {
        
        
        $login = $_POST['login'];
        $email = $_POST['email'];
        $haslo = $_POST['haslo'];
        $wiek = $_POST['wiek'];

        
        if (strlen($login) < 3) {
            echo "Login musi mieć minimum 3 znaki.<br>";
        }

        
        if (!str_contains($email, "@")) {
            echo "Podaj poprawny adres e-mail.<br>";
        }

        
        if (strlen($haslo) < 8) {
            echo "Hasło musi mieć minimum 8 znaków.<br>";
        }

        
        if ($wiek < 18 || $wiek > 100) {
            echo "Musisz mieć od 18 do 100 lat.<br>";
        }

        
        if (!isset($_POST['checkbox'])) {
            echo "Musisz zaakceptować regulamin.<br>";
        }
    }
?>