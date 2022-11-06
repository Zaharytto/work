<?php
class Forge
{
    public $flame = '';

    public function whatFlame()
    {
        $flame = ['горит синим пламенем', 'ярко горит', 'лишь задымился'];
        $rand = rand(0, count($flame) - 1);
        return $flame[$rand];
    }

    public function burn($object)
    {
        switch ($this->whatFlame()) {
            case 'горит синим пламенем' :
                return $object->burnWith(new BlueFlame);
            case 'ярко горит' :
                return $object->burnWith(new RedFlame);
            case 'лишь задымился' :
                return $object->burnWith(new Smoke);
        }
    }
}

class BlueFlame extends Forge
{
    public $name;
    
    public function getFlame()
    {
        return $this->name = 'горит синим пламенем';
    }

    public function burn($object)
    {
        return $object->burnWith($this->getFlame());
    }
}

class RedFlame extends Forge
{
    public $name;

    public function getFlame()
    {
        return $this->name = 'ярко горит';
    }

    public function burn($object)
    {
        return $object->burnWith($this->getFlame());
    }
}

class Smoke extends Forge
{
    public $name;

    public function getFlame()
    {
        return $this->name = 'лишь задымился';
    }

    public function burn($object)
    {
        return $object->burnWith($this->getFlame());
    }
}





class Phone
{
    public $name = 'Телефон';

    public function burnWith($flame)
    {
        return $this->name . ' ' . $flame->getFlame();
    }
}

class Dawn
{
    public $name = 'Рассвет';
    
    public function burnWith($flame)
    {
        return $this->name . ' ' . $flame->getFlame();
    }

}

class Taste
{
    public $name = 'Вкус';

    public function burnWith($flame)
    {
        return $this->name . ' ' . $flame->getFlame();
    }

}



$phone = new Phone();
$dawn = new Dawn();
$taste = new Taste();

$array = [$phone, $dawn, $taste];

$forge = new Forge();

foreach ($array as $value) {
    echo $forge->burn($value) . '<br>';
}
