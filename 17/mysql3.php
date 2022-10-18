<?php

$host = 'localhost';
$user = 'root';
$password = 'root';
$dbname = 'mydb';


$connect = mysqli_connect ($host, $user, $password, $dbname); 

// 1 Запрос, который укажет, что животные в классе «Насекомые» могут летать

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect, 
        "update animal_classes set can_flying = 1 where id = 1");
}





// 2 Запрос, который установит стране Уругвай код URY

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect, 
        "update countries set code = 'URY' where id = 1");
}





// 3 Запрос, который переименует «Пернатого дракона-утконоса» в «Пернатого голубокрылого дракона-утконоса»

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect, 
        "update animals set name = 'Пернатый голубокрый дракон-утконос' where id = 3");
}





// 4 Запрос, который сделает «Пернатого голубокрылого дракона-утконоса» нелетающим

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect, 
        "update animals set can_flying = 0 where id = 3");
}

mysqli_close($connect);
