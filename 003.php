<pre>
<?php


$numbers = [];
$size = rand(3, 20);

for($i = 0; $i < $size; $i++){
    $numbers[$i] = rand(0, 10);
}

var_dump($numbers);

$sum = 0;

foreach($numbers as $i => $value){
    if($i % 2 == 1){
        $sum += $value;
    }
}

var_dump($sum);


?>
</pre>