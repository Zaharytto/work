<?php

$host = 'localhost';
$user = 'root';
$password = 'root';
$dbname = 'mydb';


$connect = mysqli_connect ($host, $user, $password, $dbname); 

// 1 Выбрать всех животных по алфавиту

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect, 
        "select name from animals order by name asc");
        while ($row = mysqli_fetch_assoc($result)) {
            var_export($row);
        }
}


// 2 Выбрать только последний город по алфавиту

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect, 
        "select name from cities order by name desc limit 1");
        while ($row = mysqli_fetch_assoc($result)) {
            var_export($row);
        }
}


// 3 Выбрать последний добавленный класс животного (с наибольшим ID)

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect, 
        "select name from animal_classes order by id desc limit 1");
        while ($row = mysqli_fetch_assoc($result)) {
            var_export($row);
        }
}


// 4 Выбрать первую пару (первое и второе животное) летающих животных, отсортированных по возрастанию ID

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect, 
        "select name from animals where can_flying = 1 order by id asc limit 2");
        while ($row = mysqli_fetch_assoc($result)) {
            var_export($row);
        }
}


// 5 Выбрать вторую пару (третье и четвёртое животное) летающих животных, отсортированных по возрастанию ID

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect, 
        "select name from animals where can_flying = 1 and id > 2 order by id asc limit 2");
        while ($row = mysqli_fetch_assoc($result)) {
            var_export($row);
        }
}

mysqli_close($connect);
