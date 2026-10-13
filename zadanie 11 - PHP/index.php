<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./" method="GET"> 
        <label for="name">Imię: </label>
        <input type="text" id="name" name="name"> <br>

        <label for="age">Wiek: </label>
        <input type="number" id="age" name="age"> <br>

        <label for="ticket">Typ biletu: </label> <br>
        <select name="ticket" id="ticket">
            <option value="normal">Normalny</option>
            <option value="ulgowy">Ulgowy</option>
        </select><br>
        <input type="submit" value="Oblicz cenę">
    </form> 
</body>
</html>


<?php
 $ticket = $_GET['ticket'];
 $wiek = $_GET['age'];
 $name = $_GET['name'];
$ticketPrice = 0;
 if($ticket == 'normal' && $wiek > 7){
     $ticketPrice = 30;
 } else if($ticket == 'ulgowy' && $wiek > 7){
     $ticketPrice = 15;
 } else if($wiek <= 7){
    $ticketPrice = 0;
 }

 echo "Cześć " . $name;
 echo "<br>";
 echo "Twój wiek: " . $wiek;
 echo "<br>";
 echo "Wybrany rodzaj biletu: " . $ticket;
echo "<br>";
 echo "Cena biletu: " . $ticketPrice . " zł";
?>