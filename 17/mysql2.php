<?php

$host = 'localhost';
$user = 'root';
$password = 'root';
$dbname = 'mydb';


$connect = mysqli_connect ($host, $user, $password, $dbname); 

// 1 Запрос, добавляющий Уругвай в таблицу со странами

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect, 
        "insert into countries set name = 'Уругвай', code = '1'");
}

mysqli_close($connect);


// 2 Запрос, добавляющий класс животных «Насекомые»

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect, 
        "insert into animal_classes set name = 'Насекомые'");
}

mysqli_close($connect);



// 3 Запрос, добавляющий вымышленный класс животных «Несуществующие», среди них точно бывают летающие

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect, 
        "insert into animal_classes set name = 'Несуществующие'");
}

mysqli_close($connect);



// 4 Запрос, добавляющий несуществующее летающее животное «Пернатый дракон-утконос»

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect, 
        "insert into animals set name = 'Пернатый дракон-утконос', can_flying = 1, class_id = 1");
}

mysqli_close($connect);



// 5 Запрос, добавляющий город Лас-Вегас

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect, 
        "insert into cities set name = 'Лас-Вегас', country_id = 1");
}

mysqli_close($connect);

