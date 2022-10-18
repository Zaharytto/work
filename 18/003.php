<?php

$host = 'localhost';
$user = 'root';
$password = 'root';
$dbname = 'mydb';


$connect = mysqli_connect ($host, $user, $password, $dbname); 

// 1 Запрос, который выберет названия всех животных и названия их классов

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect, 
        "select animals.name, animal_classes.name from animals left join animal_classes on class_id = animal_classes.id");
        while ($row = mysqli_fetch_assoc($result)) {
            var_export($row);
        }
}


// 2 Запрос, который выберет названия всех городов, а также названия и коды их стран

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect, 
        "select cities.name, countries.name, countries.code from cities left join countries on country_id = countries.id");
        while ($row = mysqli_fetch_assoc($result)) {
            var_export($row);
        }
}


// 3 Запрос, который выберет классы животных, в которых есть и летающие, и нелетающие животные, и среди животных этих классов выберет только тех, которые не летают.
// На выходе в результате одного общего запроса должны быть названия одновременно и животного, и его класса.
// Например: Класс, Животное — Птица, Страус; Насекомое, Муравей

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect, 
        "select animal_classes.name as 'Класс', animals.name as 'Животное' from animal_classes left join animals on class_id = animal_classes.id where animal_classes.can_flying = '0'");
        while ($row = mysqli_fetch_assoc($result)) {
            var_export($row);
        }
}
