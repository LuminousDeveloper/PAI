<?php
for($i = 0; $i < 10; $i++) {
    echo $i;
}

// While
$i = 0;
while($i < 5) {
    echo $i;
    $i++;
}

// Do While
$i = 1;
do {
    echo $i;
    $i++;
} while ($i <= 5);

//For Each
$tablica = [1,2,3,4,5];
foreach($tablica as $wartosc) {
    echo $wartosc;
}

$owoce = [
    "a" => "jabłko",
    "b" => "banan",
    "c" => "gruszka"
];

foreach($tablica as $klucz => $wartosc){
    echo "klucz: ".$klucz." Wartość: ".$wartosc;
}

$array = [1,2,3];
$assoc_table = ['imie'=>"Ania", "wiek"=>30];
$empty_array = [];
$array2 = array(1,2,3);

$arrayOfNumbers = [1.2.3];
for($i = 0; $i < count($arrayOfNumbers); $i++) {
    echo $arrayOfNumbers[$i];
}

//Wstawianie jednego elementu
$number = 10;
$insertArray = [1,2,3];
$insertArray[1] = $number;

//Wstawianie elementu do całej tablicy
$number = 10;
$insertArray = [1,2,3];

for($i = 0; $i < count($insertArray); $i++){
    $insertArray[$i] = $number;
}
echo "<br>";
echo var_dump($insertArray);

//Wstawianie elementu pod wybrany index
$number = 10;
$index = 0;
$insertArray = [1,2,3];

$insertArray[$index] = $number;




?>