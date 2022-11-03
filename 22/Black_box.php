<?php

class BlackBox 
{
    private array $data = [];

    public function addLog(string $message)
    {
            return $this->data[] = $message;
    }

    public function getData(int $accessLevel): array
    {
        $info = [];
        if ($accessLevel <= 1) {
            return $info[] = [$this->data[0], 'Доступ запрещен'];
        } else if ($accessLevel <= 3) {  
            return $info[] = [$this->data[0], $this->data[1], 'Ваш уровень доступа не позволяет получить больше данных'];   
        } else {
            foreach ($this->data as $value) {
                $info[] = $value;
            }
            return $info;
        }
    }
}

class Plane 
{
    private BlackBox $blackBox;

    public function __construct(BlackBox $blackBox)
    {
        $this->blackBox = $blackBox;
    }




    public function flyAndCrush()
    {
        $log = [
            'Полёт нормальный',
            'Погода за бортом отличная',
            'Замечено странное движение на 47 градусе',
            'Попадание огромного птеродактиля в двигатель',
            'Отказ одного двигателя, переход на резервный',
            'Отказ всех двигателей',
            'Оторвало крыло',
            'Мы падаем!'
        ];

        foreach($log as $value) {
            $this->blackBox->addLog($value);
        } 
        return $this->blackBox;

    }

    private function addLog(string $message)
    {
        $this->blackBox->addLog(date("Y.m.d H:i:s") . $message);  //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    }


    public function getBlackBox(): BlackBox
    {
        return $this->blackBox;
    }
}

class Engineer 
{
    private int $accessLevel;

    public function __construct($accessLevel)
    {
        $this->accessLevel = $accessLevel;
    }

    public function decodeBox(BlackBox $blackBox)
    {
        return $blackBox->getData($this->accessLevel);
    }
}



//Создали чёрный ящик
$blackBoxAirplane = new BlackBox();

//Создали Самолёт
$airplane = new Plane($blackBoxAirplane);

// Полетал и разбился 
// $airplane->flyAndCrush();

var_dump($airplane->flyAndCrush());

//Берём из Самолёта чёрный ящик. $getBox - повидимому обьект чёрного ящика
// $getBox = $airplane->getBlackBox();









/*

public function flyAndCrush()
    {
        $message = [
            'Полёт нормальный',
            'Погода за бортом отличная',
            'Замечено странное движение на 47 градусе',
            'Попадание огромного птеродактиля в двигатель',
            'Отказ одного двигателя, переход на резервный',
            'Отказ всех двигателей',
            'Оторвало крыло',
            'Мы падаем!'
        ];

        return $message;
    }

    private function addLog(string $message)
    {
        $info = $this->flyAndCrush();

        foreach($info as $value) {
            $message .= $this->blackBox->addLog(date("Y.m.d H:i:s") . $value);
        }

        return $message;
    }

*/