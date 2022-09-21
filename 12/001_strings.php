<pre>
<?php

// require __DIR__ . '/cut_string.php';
$data = [
    'short line',
    'what the fox say?',
    'very very very long line',
    'i dont know what to write here)',
    'QSOFT is great',
    'teacher is crazy',
    'qwertyqwertyqwertyqwerty',
];

$result = [];
// Ваш код здесь

function cutString($line, $length = 12, $appends = '...'): string

{
    return mb_strimwidth($line, 0, $length,) . $appends;
}
   

foreach ($data as $value) {
        $result[] = cutString($value, 14);       
}


var_dump($result);
