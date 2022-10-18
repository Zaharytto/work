<?php

$host = 'localhost';
$user = 'root';
$password = 'root';
$dbname = 'mydb';


$connect = mysqli_connect ($host, $user, $password, $dbname); 

// 1 Выбрать все данные из таблиц с животными

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect, 
        "select * from animals;");
        while ($row = mysqli_fetch_assoc($result)) {
            var_export($row);
        }
}





// 2 Выбрать все данные из таблиц с городами

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect, 
        "select * from cities;");
        while ($row = mysqli_fetch_assoc($result)) {
            var_export($row);
        }
}





// 3 Выбрать только названия всех стран

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect, 
        "select * from countries;");
        while ($row = mysqli_fetch_assoc($result)) {
            var_export($row);
        }
}





// 4 Выбрать уникальные значения кодов всех стран

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect, 
        "select country_id from cities;");
        while ($row = mysqli_fetch_assoc($result)) {
            var_export($row);
        }
}




// 5 Выбрать только название и значение признака (бывают ли среди них летающие) из таблицы с классами животных

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect, 
        "select name, can_flying from animal_classes;");
        while ($row = mysqli_fetch_assoc($result)) {
            var_export($row);
        }
}

mysqli_close($connect);

