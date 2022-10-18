<?php

$host = 'localhost';
$user = 'root';
$password = 'root';
$dbname = 'mydb';


$connect = mysqli_connect ($host, $user, $password, $dbname); 

// 1 Выбрать всех животных, принадлежащих классу млекопитающие (по ID класса животных)

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect, 
        "select name from animals where class_id = 'Млекопитающие'");
        while ($row = mysqli_fetch_assoc($result)) {
            var_export($row);
        }
}


// 2 Выбрать все города России (по ID страны)

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect, 
        "select name from cities where country_id = 'Россия'");
        while ($row = mysqli_fetch_assoc($result)) {
            var_export($row);
        }
}


// 3 Выбрать только те классы животных, у которых не бывает летающих видов

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect, 
        "select name from animal_classes where can_flying = '0'");
        while ($row = mysqli_fetch_assoc($result)) {
            var_export($row);
        }
}


// 4 Выбрать все страны, код которых начинается с символа R

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect, 
        "select name from countries where code like 'R%'");
        while ($row = mysqli_fetch_assoc($result)) {
            var_export($row);
        }
}


// 5 Выбрать летающих животных, принадлежащих классу птицы (по ID класса животных), у которых в названии есть буква а

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect, 
        "select name from animals where class_id = 'Птицы' and name like '%а%'");
        while ($row = mysqli_fetch_assoc($result)) {
            var_export($row);
        }
}

mysqli_close($connect);
