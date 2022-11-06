<?php

class Animal 
{
    public function getName():string
    {
        return $this->name;
    }

    public function isBird():bool
    {
        return false;
    }
}


class Bird extends Animal
{
    public function isBird():bool
    {
        return true;
    }
}


class Farm
{
    public array $animals = [];

    public function addAnimal(Animal $animal):object
    {
        return $this->animals[] = $animal;
    }

    public function rollCall():string
    {
        $info = '';
        foreach ($this->animals as $value) {
            $info .= "На ферме обитает: " . $value->getName() . '<br>';
        }
        return $info;
    }
}

class BirdFarm extends Farm
{
    public function rollCall():string
    {
        $quantityBirds = 0;
        foreach ($this->animals as $value) {
            if ($value->isBird() === true) {
                $quantityBirds++;
            }
        }
        return 'Птиц на птицеферме: ' . $quantityBirds . '<br>' . parent::rollCall();
    }
}

class Farmer
{
    public function addAnimal(Farm $farm, Animal $animal):object
    {
        if ($animal->isBird() === false) {
            return $farm->addAnimal($animal);
        } else {
            return $farm->addAnimal($animal);
        }
    }

    public function rollCall(Farm $farm):string
    {
       return $farm->rollCall();
    }
}

// Животные


class Elephant extends Animal
{
    public $name = 'Слон';

}

class Horse extends Animal
{
    public $name = 'Лошадь';

}

class Dog extends Animal
{
    public $name = 'Собака';
}

class Gull extends Bird
{
    public $name = 'Чайка';
}

class Crow extends Bird
{
    public $name = 'Ворона';
}

class Pigeon extends Bird
{
    public $name = 'Голубь';
}

class Sparrow extends Bird
{
    public $name = 'Воробей';
}




$farm = new Farm();
$birdFarm = new BirdFarm();
$farmer = new Farmer();

$elephant = new Elephant();
$horse = new Horse();
$dog = new Dog();
$gull = new Gull();
$crow = new Crow();
$pigeon = new Pigeon();
$sparrow = new Sparrow();

$homelessAnimal = [$elephant, $dog, $crow, $sparrow, $horse, $gull, $pigeon];

foreach ($homelessAnimal as $value) {
    if ($value->isBird() === false) {
        $farmer->addAnimal($farm, $value);
    } else {
        $farmer->addAnimal($birdFarm, $value);
    }
}


echo $farm->rollCall();
echo '<br>';
echo $farmer->rollCall($birdFarm);

