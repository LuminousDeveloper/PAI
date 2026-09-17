<?php
    $array = [1,2,3,4,5];
    $index_to_remove = 2;

    unset($array[$index_to_remove]); //Usuwanie elementu z tablicy
    var_dump($array);

    for($i = 0; $i < count($array); $i++) {
    $array[$i] = 0;
}
echo "<br>";
var_dump($array);

echo "<h1>Tablice dwuwymiarowe</h1>";

$array2D = [
    [1,2,3],
    [4,5,6],
    [7,8,9]
];

echo "<br>";
echo $array2D[0][0];
echo "<br>";
for($i = 0; $i < count($array2D); $i++){
    for($j = 0; $j < count($array2D[$i]); $j++){
        echo $array2D[$i][$j];
        echo " ";
    }
    echo "<br>";
}

echo "<br>";

$osoby = [
    ["imie" => "Jan", "wiek" => 20],
    ["imie" => "Anna", "wiek" => 25],   //Tablica tablic asocjacyjnych
    ["imie" => "Piotr", "wiek" => 30]
];

foreach($osoby as $wiersz){
    foreach($wiersz as $element){
        echo $element . " ";
    }
        echo "<br>";
    }

    for($i = 0; $i < count($osoby); $i++){
        foreach($osoby[$i] as $element){
            echo $element . " ";
        }
        echo "<br>";
    }

    $array4x4 = [
        [1,2,3,4],
        [5,6,7,8],
        [9,10,11,12],
        [13,14,15,16],
    ];

    // Zsumować wszystkie wartości w ramach jednej kolumny czyli 1,5,9,13 a jej rezultat ma być zapisany w tablicy jednowymiarowej
    $suma_kolumny = [];
    for($i = 0; $i < count($array4x4); $i++){
        $suma_kolumny[] = $array4x4[$i][0];
    }
    var_dump($suma_kolumny);

    // Diagonalna = przekątna
    // Za pomocą dwóch pętli for dodać na diagonalnych wartość 0.

    for($i = 0; $i < count($array4x4); $i++){
        for($j = 0; $j < count($array4x4[$i]); $j++){
            if($i == $j){
                $array4x4[$i][$j] = 0;
            }
        }
        echo "<br>";
    }

    printArray($array4x4);


    // Zsumować ilość elementów w tablicy
    $suma = 0;
    for($i = 0; $i < count($array4x4); $i++){
        for($j = 0; $j < count($array4x4[$i]); $j++){
            $suma += $array4x4[$i][$j];
        }
    }
    echo "Suma elementów w tablicy: " . $suma;

    function printArray($array2D){
        for($i = 0; $i < count($array2D); $i++){
            for($j = 0; $j < count($array2D[$i]); $j++){
                echo $array2D[$i][$j];
                echo " ";
            }
            echo "<br>";
        }
    }

    
?>