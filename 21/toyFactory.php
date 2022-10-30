<?php

namespace App\ToyFactory;

class ToyFactory
{
    public function createToy(string $name): Toy
    {
        return new Toy($name, rand (0,9999));
    }

}

class Toy
{
     public string $name;  
     public int $price;   
    
    public function __construct(string $name, int $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}


$toysName = ['Юла', 'Мишка', 'Робот', 'Машинка', 'Кукла'];
$count = rand(5, 20);
$allPrice = 0;

for ($i = 0; $i < $count; $i++) {
    $toys[] = $toysName[rand(0,4)];
}

$toyFactory = new ToyFactory();

foreach($toys as $value) {
    $toy = $toyFactory->createToy($value);
    echo $toy->name . " - " . $toy->price . '$' . '<br>';
    $allPrice += $toy->price;
}

echo 'Итого - ' . $allPrice . '$';


