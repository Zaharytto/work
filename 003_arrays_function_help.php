<?php
// Функции по работе с массивами дан уже знакомый вам массив авторов и книг

$library = [
    'authors' => [
        'john_makkormik@example.com' => [
            'name' => 'Джон Маккормик',
            'email' => 'john_makkormik@example.com',
            'birthYear' => 1972,
        ],
        'martin_robert@example.com' => [
            'name' => 'Мартин Роберт',
            'email' => 'martin_robert@example.com',
            'birthYear' => 1952,
        ],
        'martin_fauler@example.com' => [
            'name' => 'Мартин Фаулер',
            'email' => 'martin_fauler@example.com',
            'birthYear' => 1963,
        ],
    ],
    'books' => [
        [
            'title' => 'Чистый код: создание, анализ и рефакторинг',
            'author' => 'martin_robert@example.com',
            'year' => 2013,
        ],
        [
            'title' => 'Девять алгоритмов, которые изменили будущее',
            'author' => 'john_makkormik@example.com',
            'year' => 2011,
        ],
        [
            'title' => 'Идеальный программист',
            'author' => 'martin_robert@example.com',
            'year' => 2011,
        ],
        [
            'title' => 'Шаблоны корпоративных приложений',
            'author' => 'martin_fauler@example.com',
            'year' => 2002,
        ],
    ],
];


// 1. Используя подходящую встроенную функцию, извлеките из массива и выведите первого автора в библиотеке
// # Функция array_shift(): https://www.php.net/manual/ru/function.array-shift.php
// $firstAuthor = ...;
var_dump($firstAuthor);


// 2. Используя подходящую встроенную функцию, выберите и выведите последнюю книгу
// # Функция array_pop(): https://www.php.net/manual/ru/function.array-pop.php
// $lastBook = ...;
var_dump($lastBook);


// 3. Используя подходящую встроенную функцию, получите массив содержащий список email всех авторов
// # Функция array_keys(): https://www.php.net/manual/ru/function.array-keys.php
$emails = [];


// 3. Используя подходящую встроенную функцию, определите, есть ли среди этих email 'martin_fauler@example.com'
// # Функция in_array(): https://www.php.net/manual/ru/function.in-array.php
$hasMartinFauler = false;
var_dump($hasMartinFauler);


// 4. Используя подходящую встроенную функцию, определите, есть ли среди этих email 'vasya@example.com'
// # Функция in_array(): https://www.php.net/manual/ru/function.in-array.php
$hasVasyaPupkin = false;
var_dump($hasVasyaPupkin);


// 5. Используя подходящую встроенную функцию, добавьте в библиотеку еще одну книгу Мартина Фаулера
// # Функция array_push(): https://www.php.net/manual/ru/function.array-push.php
var_dump($library);


// 6. Используя подходящую встроенную функцию, добавьте в библиотеку на первую полку еще одну книгу Мартина Фаулера
// # Функция array_unshift(): https://www.php.net/manual/ru/function.array-unshift.php
var_dump($library);

