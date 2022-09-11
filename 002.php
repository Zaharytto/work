<pre>
<?php

$values = [];

for($i = 0; $i < 10; $i++){
    $values[] = rand(0, 100);
}
var_dump($values);

$index = 0;
$min = $values[0];
foreach($values as $i => $item){
    if($item < $min){
        $min = $item;
        $index =$i;
    }
}

var_dump($min, $index);






?>
</pre>