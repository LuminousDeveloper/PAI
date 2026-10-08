<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <form action="./" method="POST"> 
        <label for="name">Imię: </label>
        <input type="text" id="name" name="name"><br>
        <label for="age">Wiek: </label>
        <input type="number" id="age" name="age"><br>
        <label for="sex">Płeć: </label>
        <input type="radio" name="sex" value="k"> Kobieta
        <input type="radio" name="sex" value="m"> Mężczyzna 
        <br>
        <label for="game">Ulubiona seria gier: </label> <br>
        <input type="checkbox" name="game1" value="GTA"> GTA <br>
        <input type="checkbox" name="game2" value="FIFA"> FIFA <br>
        <input type="checkbox" name="game3" value="CS"> CS <br>
        <input type="checkbox" name="game4" value="COD"> Call Of Duty <br>
        <br>
        <input type="submit">
    </form> 
</body>
</html>


<?php
if(isset($_POST['name']) &&    //sprawdza, czy klucz name istnieje
isset($_POST['age']) &&       //sprawdza, czy klucz age istnieje
!empty($_POST['name']) &&    //sprawdza, czy jest wartość
!empty($_POST['age'])) {    //sprawdza, czy jest wartość
    echo $_POST['name'];    
    echo $_POST['age'];
} else {
    echo "Proszę wypełnić wszystkie pola";
}

if(isset($_POST['sex'])){
    if($_POST['sex'] == 'm'){
        echo "<br>";
        echo "Mężczyzna";
    } else {
        echo "<br>";
        echo "Kobieta";
    }
}

//Weryfikacja wybranej gry
if(isset($_POST['game1']) && $_POST['game1'] == "GTA"){
    echo "<br>";
    echo "Wybrano GTA";
}

// Wypisywanie wszystkich zaznaczonych gier
for($i = 1; $i <= 4; $i++){
    if(isset($_POST['game'.$i])){
        echo "<br>";
        echo $_POST['game'.$i];
    } else if(isset($_POST['game'.$i])){
        echo "<br>";
        echo $_POST['game'.$i];
    } else if(isset($_POST['game'.$i])){
        echo "<br>";
        echo $_POST['game'.$i];
    } else if(isset($_POST['game'.$i])){
        echo "<br>";
        echo $_POST['game'.$i];;
    }
}
?>