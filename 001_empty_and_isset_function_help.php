
<pre>
<?php
// Функции empty и isset
// Результат каждой проверки выведите с помощью функции var_dump()

// 1. Проверьте существует ли переменная $a и не пустая ли она $a
$a = 0;
var_dump(isset($a));
var_dump(empty($a));
echo '<br>';


// 2. Проверьте существует ли переменная $b и не пустая ли она $b
$b = false;
var_dump(empty($b));
var_dump(isset($b));
echo '<br>';

// 3. Проверьте существует ли переменная $c и не пустая ли она $c
$c = null;
var_dump(isset($c));
var_dump(empty($c));
echo '<br>';

// 4. Проверьте существует ли переменная $d и не пустая ли она $d
$d = [];
var_dump(empty($d));
var_dump(isset($d));
echo '<br>';
echo '<hr>';

// 5. Проверьте каждый элемент массива $items существует ли он и не пустой ли он
// # Примените функцию foreach
$items = [
    [],
    1,
    null,
    'Привет',
    ''
];

foreach($items as $val){
    var_dump(isset($val));
    var_dump(empty($val));
    echo '<br>';
}

?>
</pre>

