<?php
// Zadanie 1
for ($i = 0; $i <= 1000; $i++) {
    if ($i % 3 == 0 && $i % 7 == 0) {
        echo $i . " ";
    }
}
echo "<br>";
echo "<br>";

// Zadanie 2 
for ($i = 0; $i <= 100; $i++) {
    if ($i % 3 != 0) {
        echo $i . " ";
    }
}
echo "<br>";
echo "<br>";

// Zadanie 3 
$liczba = 5; 
$dzielnik = 3; 
$count = 0;
while ($count < 20) {
    if ($liczba % $dzielnik == 0) {
        echo $liczba . " ";
        $count++;
    }
    $liczba++;
}
echo "<br>";
echo "<br>";

// Zadanie 4
$tablica = [1, 4, 3, 6, 8, 9, 2];
$max = $tablica[0];
for ($i = 1; $i < count($tablica); $i++) {
    if ($tablica[$i] > $max) {
        $max = $tablica[$i];
    }
}
echo "Maksimum to: " . $max;

echo "<br>";
echo "<br>";
echo "<br>";

// Zadanie 5
$rozmiar = 8;
for ($i = 0; $i < $rozmiar; $i++) {
    for ($j = 0; $j < $rozmiar; $j++) {
        if (($i + $j) % 2 == 0) {
            echo "X ";
        } else {
            echo "O ";
        }
    }
    echo "<br>";
}
?>