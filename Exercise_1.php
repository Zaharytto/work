<?php

/**
 * Автор: Захар Кравченко
 * 
 * Дата реализации: 08. 11. 2022 14:00
 * 
 * Дата изменения: 09. 11. 2022 13:00
 * 
 * Работа с БД: MySQL Workbanch 8.0 CE
 */

/**
 * class: Database
 * Класс для работы с базой данных.
 * connectToDb() - подключение к БД.
 * getById() - возвращает информацию о человеке по id.
 * addData() - Сохранение полей экземпляра класса в БД.
 * deleteData() -  Удаление человека из БД в соответствии с id объекта.
 * getAge() -  преобразование даты рождения в возраст. 
 * convert() - преобразование пола из двоичной системы в текстовую. 
 * __construct() - либо создает человека в БД с заданной информацией, либо берет информацию из БД по id. 
 * returnFormatted() - Форматирование человека с преобразованием возраста и пола
 */

class Database
{
    public ?int $id;
    public ?string $name;
    public ?string $surname;
    public ?string $birthday;
    public ?int $gender;
    public ?string $birthplace;

    public function __construct(?int $id, $name = null, $surname = null, $birthday = null, $gender = null, $birthplace = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->birthday = $birthday;
        $this->gender = $gender;
        $this->birthplace = $birthplace;

        if ($id === null) {
            if ($this->validate($this->name, $this->surname, $this->birthday, $this->gender, $this->birthplace)) {
            $this->addData();
            }            
        } else {
            $user = $this->getById($id)->fetch(PDO::FETCH_ASSOC);
            $this->name = $user['name'];
            $this->surname = $user['surname'];
            $this->birthday = $user['birthday'];
            $this->gender = $user['gender'];
            $this->birthplace = $user['birthplace']; 
        }            
    }

    private function validate($name, $surname, $birthday, $gender, $birthplace)
    {
        if (empty($name) || empty($surname) || empty($birthday) || empty($gender) || empty($birthplace)) {
            return true;
        } else {
            return false;
        }
    }

    private function getById($id)
    {
        return $this->connectToDb("SELECT * FROM `users` WHERE `id` = :id", [':id' => $id]);
    }

    public function connectToDb(string $field, array $value)
    {
        $pdo = new PDO('mysql:host=localhost;dbname=mydb', 'root', 'root');  
        $result = $pdo->prepare($field);
        $result->execute($value);
        $pdo = null;
        return $result;
    }

    private function addData()
    {
        return $this->connectToDb("INSERT INTO `users` (id, name, surname, birthday, gender, birthplace)
        values (:id, :name, :surname, :birthday, :gender, :birthplace)", [':id' => $this->id, ':name' => $this->name, ':surname' => $this->surname, ':birthday' => $this->birthday, ':gender' => $this->gender, ':birthplace' => $this->birthplace]);
    }

    public function deleteData()
    {
        return $this->connectToDb("DELETE FROM `users` WHERE `id` = :id", [':id' => $this->id]);
    }

    private static function getAge(?string $birthday):int
    {
        $diff = date('Ymd') - date('Ymd', strtotime($birthday));   
        return (int) substr( $diff, 0, -4 );
    }

    private static function convert(?int $gender)
    {
     return $gender ? 'male' : 'female';
    }

    public function returnFormatted()
    {
        $class =  new StdClass();
        $class->id = $this->id;
        $class->name = $this->name;
        $class->surname = $this->surname;
        $class->birthday = self::getAge($this->birthday);
        $class->gender = self::convert($this->gender);
        $class->birthplace = $this->birthplace;
        return $class;        
    }
}




$x = new Database(16);
var_dump($x->returnFormatted());
?>
