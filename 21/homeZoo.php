<?php

namespace App\HomeZoo;

class Cat
{
    public function __construct($name)
    {
        $this -> name = $name;
    }
}

class Dog
{
    public function __construct($name)
    {
        $this -> name = $name;
    }
}

class Fish
{
    public function __construct($name)
    {
        $this -> name = $name;
    }
}


$catMurzik = new Cat('Мурзик');

$catbel = new Cat('Белка');

$dogShar = new Dog ('Шарик');
$dogPina = new Dog ('Пиня');

$fishGold = new Fish('Золотая рыбка');


$homeZoo = [$catMurzik -> name, $catbel -> name, $dogShar -> name, $dogPina -> name, $fishGold -> name];

foreach ($homeZoo as $value) {
    echo $value . '<br>';
}


