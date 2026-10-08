<?php

// Metody HTTP:
// $_GET; -> Pobieranie (Odczytywanie) Danych Z Serwera
// $_POST; -> Przesyłanie danych do serwera 
// $_PUT; -> Aktualizacja istniejącego zasobu
// $_DELETE; -> Usuwanie istniejącego zasobu

// $_POST['imie'] = "Gracjan";

// //Zmienne superglobalne:
// $_GET;
// $_POST;
// $_SESSION;


// echo $_GET["name"];
// GET: localhost:8080/index.php?name=Gracjan&surname=Kowalski


// GET używany gdy informacja nie musi być poufna i może być przechowywana w historii przeglądarki. Informacja jest w linku
// POST używany gdy informacja jest poufna i nie powinna być przechowywana w historii przeglądarki. Informacja jest w request body przesyłana jako JSON


// Request -> zapytanie
// Response -> odpowiedź

// Architektura RESTful API

// Dwie Skrzynki W Bazie Danych Jedna Students Druga Grades Relacja Jeden Do Wielu
// Students: Id, Imie
// Grades: Id, Grade, StudentId

// 1. SELECT * FROM STUDENTS
// 2. Wywołać zapytanie do Bazy Danych
// 3. Dowolna manipulacja danymi
// 4. Zwrócenie danych

// createStudent (student) {        student -> obiekt -> dodawanie -> Metoda HTTP POST
//   
// }

// showStudents () {                pobieranie -> Metoda HTTP GET
//  
// }

// updateStudent (student) {        student -> obiekt -> aktualizacja -> Metoda HTTP PUT lub PATCH
//   
//}

// deleteStudent (studentId) {      studentId -> id studenta -> usuwanie -> Metoda HTTP DELETE
//
//}

// Formularz -> PHP Backend -> Baza Danych
//           |
//           V
//        Request  (Header np. Auth, Body np. w JSON {id: "1" "name": "Bartek";})

// GET localhost:8080/index.php?name=Bartek$id=1
// POST localhost:8080/index.php
//                         |
//                         V
//                    Request Body

// $_GET["name"];
// $_POST["name"];
?>