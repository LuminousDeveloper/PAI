<?php
    $array = [1, 2, 3, 4, 5];
    $array2 = [6, 7, 8, 9, 10];
    
    printArray($array);
    printArray($array2);
    echo sumNumbers(6);
    echo "<br>";
    echo multiplyNumbers(9, 10);
    echo "<br>";
    echo multiplyNumbers(9);

    //Funkcja do wypisywania tablicy
    function printArray($array){
        for($i = 0; $i < count ($array); $i++){
            echo $array[$i];
        }
        echo "<br>";    
    }

    //Zmienna liczba argumentów
    function sumNumbers(...$array){
        $sum = 0;
        for($i = 0; $i < count($array); $i++){
            $sum = $sum + $array[$i];
        }
        return $sum;
    }

    //Wartość domyślna
    //Int w parametrach - jakiego typu są przyjmowane parametry
    //Int po dwukropku (na końcu sygnatury funkcji) oznacza jaki typ danych jest zwracany przez funkcję
    function multiplyNumbers(int $a, int $b = 9): int {
        return $a * $b;
    }

    //Funkcja zamienNaWielkie(string $tekst): string, która zwraca tekst wielkimi literami.
    function zamienNaWielkie(string $tekst): string {
        return strtoupper($tekst);
    }

    function czyPierwsza(int $n): bool{
        if ($n <= 1) {
            return false;
        }
        for ($i = 2; $i <= sqrt($n); $i++) {
            if ($n % $i === 0) {
                return false;
            }
        }
        return true;
    }

    var_dump(czyPierwsza(2));
 
    function WypisywanieLiczbPierwszychZZakresu($początek, $koniec){
        for($i = $początek; $i <= $koniec; $i++){
            if (czyPierwsza($i)) {
                echo $i;
                echo "<br>";
            }
        }
    }

    //Funkcja obliczStatystyki(array $liczby): array - zwraca tablicę asocjacyjną z kluczami min, max, srednia, suma. Każda z tych opcji to osobna funkcja.
    function obliczStatystyki(array $liczby): array {
        $min = $liczby[0];
        $max = $liczby[0];
        $suma = 0;

        for ($i = 0; $i < count($liczby); $i++) {
            if ($liczby[$i] < $min) {
                $min = $liczby[$i];
            }
            if ($liczby[$i] > $max) {
                $max = $liczby[$i];
            }
            $suma += $liczby[$i];
        }

        $srednia = $suma / count($liczby);

        return [
            'min' => $min,
            'max' => $max,
            'srednia' => $srednia,
            'suma' => $suma
        ];
    }

?>
