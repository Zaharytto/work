<?php

namespace App\HungryCat;

class HungryCat
{
    private string $name;
    private string $color;
    private string $favoriteFood;

    public function __construct($name, $color, $favoriteFood)
    {
        $this->name = $name;
        $this->color = $color;
        $this->favoriteFood = $favoriteFood;
    }

    public function eat($food)
    {
        if ($food === $this->favoriteFood) {
            echo "Голодный кот " . $this->name . ", особые приметы: цвет - " . $this->color . ", съел $food и замурчал 'мррррр' от своей любимой еды" . '<br>';
        } else {
            echo "Голодный кот " . $this->name . ", особые приметы: цвет - " . $this->color . ", съел $food" . '<br>';
        }
    }
}


$hungryCat1 = new HungryCat ('Барсик', 'Рыжий', 'Рыбу');
$hungryCat2 = new HungryCat ('Федя', 'Серый', 'Паштет');

$hungryCat1->eat('Корм со вкусом Рыбы');
$hungryCat1->eat('Рыбу');
$hungryCat1->eat('Паштет');

$hungryCat2->eat('Корм со вкусом Рыбы');
$hungryCat2->eat('Рыбу');
$hungryCat2->eat('Паштет');
