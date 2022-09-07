<?php
// Функции по работе со строками

// 1. Уберите слеши "/" в начале и в конце строки, если они есть
// # Функция trim(): https://www.php.net/manual/ru/function.trim
$url = '/some/path/to/page/';


// 2. Уберите из строки все запятые и точки, а пробелы замените на тире
// # Функция str_replace(): https://www.php.net/manual/ru/function.str-replace
$line = 'Good news, everyone.';


// 3. Посчитайте и выведите длину строки переменной $line
// # Функция strlen(): https://www.php.net/manual/ru/function.strlen
$length = 0;
var_dump($length);


// 4. Найдите на какой позиции находится запятая в строке $line и выведите это значение
// # Функция strpos(): https://www.php.net/manual/ru/function.strpos
$position = 0;
var_dump($position);


// 5. Вырежьте из строки $line подстроку после запятой до предпоследнего символа с конца
// # Функция substr(): https://www.php.net/manual/ru/function.substr
$resultLine = '';
var_dump($resultLine);

