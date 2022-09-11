<?php


$city1 = 348;
$city1Radius = 20;
$city2 = 774;
$city2Radius = 35;


for($i = 1; $i <= 10; $i++){
    $dist = rand(0, 1000);
    $inCity = ($dist > ($city1 - $city1Radius) && $dist < ($city1 + $city1Radius)) ||
    ($dist > ($city2 - $city2Radius) && $dist < ($city2 + $city2Radius));
    $speed = $inCity ? 70: 90;
    $place = $inCity ? 'по городу': 'за городом';
    echo "<p>Машина $i едет $place на $dist км со скоростью $speed км/ч</p>";

}
