
<pre>
<?php



$line = 'Hi, how are you?';
$data = [];

for($i = 0; $i < strlen($line); $i++){
    $data[substr($line, $i, 1)] = 0;
    
}

foreach(str_split($line) as $i => $value){
    $data[$value]++;
}


var_dump($data);


?>
</pre>