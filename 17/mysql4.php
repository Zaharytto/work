<?php

$host = 'localhost';
$user = 'root';
$password = 'root';
$dbname = 'mydb';


$connect = mysqli_connect ($host, $user, $password, $dbname); 

// 1 Запрос, который удалит «Пернатого голубокрылого дракона-утконоса»

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect, 
        "delete from animals where name = 'Пернатый голубокрый дракон-утконос'");
}





// 2 Запрос, который удалит все города

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect, 
        "delete from cities");
}




// 3 Запрос, который удалит страну с кодом URY

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect, 
        "delete from countries where code = 'URY'");
}

mysqli_close($connect);
