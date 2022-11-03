<?php

class BlackBox 
{
    private array $data = [];

    public function addLog(string $message)
    {
        $i = count($this->data);
        return $this->data[] = $i . '-' . $message;
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
        
    }

    private function addLog(string $message) //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    {
        return date("Y.m.d H:i:s") . $message;  //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
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
$log = $airplane->flyAndCrush();

//Берём из Самолёта чёрный ящик.
$getBox = $airplane->getBlackBox();

//Создаём инженера
$engineer = new Engineer(rand(0, 5));

//Расшифровываем чёрный ящик из разбившегося самолёта
$decode = $engineer->decodeBox($getBox);

foreach ($decode as $value) {
    echo $value . '<br>';
}

