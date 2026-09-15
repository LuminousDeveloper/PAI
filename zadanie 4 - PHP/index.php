<?php
// Zad 1
$liczba1 = 5;
if ($liczba1 % 2 == 0) {
    echo "Liczba jest parzysta";
} else {
    echo "Liczba jest nieparzysta";
}

// Zad 2
$liczba2 = 5;
if ($liczba1 % $liczba2 == 0) {
    echo "Pierwsza liczba jest podzielna przez drugą";
} else {
    echo "Pierwsza liczba nie jest podzielna przez drugą";
}

// Zad 3
if ($liczba1 > 1 && $liczba1 < 10){
    echo "Liczba należy do przedziału <1,10>";
} else if ($liczba1 > 17  && $liczba1 < 21){
    echo "Liczba należy do przedziału <17,21>";
} else {
    echo "Liczba nie należy do żadnego przedziału";
}

// Zad 4

?>