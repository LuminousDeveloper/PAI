<?php
    echo "Test";

$zmienna = 7;

if($zmienna > 5) {
    echo "Zmienna większa od 5";
} else if ($zmienna == 5){
    echo "Zmienna równa 5";
} else {
    echo "Zmienna mniejsza od 5";
}

$kolor = "red";

switch ($kolor) {
    case "red":
    echo "czerwony";
    break;
        case "blue":
        echo "niebieski";
        break;
        case "yellow":
        echo "żółty";
        break;
        default:
            echo "kolor nierozpoznany";
}


//Zadanie 1
$a = 1;
$b = -5;
$c = 6;

$delta = $b**2 - 4 * $a * $c;

if($delta > 0){
    echo "Dwa miejsca zerowe";
} else if($delta = 0){
    echo "Jedno miejsce zerowe";
} else {
    echo "Brak miejsc zerowych";
}

?>