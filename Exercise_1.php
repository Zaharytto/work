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
 * Класс для работы с базой данных.
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
            } else {
                throw new Exception;
            }            
        } else {
            $user = $this->getById($id);
            $this->name = $user['name'];
            $this->surname = $user['surname'];
            $this->birthday = $user['birthday'];
            $this->gender = $user['gender'];
            $this->birthplace = $user['birthplace']; 
        }            
    }

    private function validate($name, $surname, $birthday, $gender, $birthplace):bool
    {
        return !empty($name) && !empty($surname) && !empty($birthday) && !empty($gender) && !empty($birthplace);
    }

    private function getById(int $id):array
    {
        $user =  $this->connectToDb("SELECT * FROM users WHERE id = :id", [':id' => $id]);
        $user = $user->fetch(PDO::FETCH_ASSOC);

        if($user){
            return $user;
            }

        throw new Exception ('user with id' . $id . 'not found');
    }

    public function connectToDb(string $field, array $value):object
    {
        $pdo = new PDO('mysql:host=localhost;dbname=mydb', 'root', 'root');  
        $result = $pdo->prepare($field);
        $result->execute($value);
        $pdo = null;
        return $result;
    }

    private function addData():object
    {
        return $this->connectToDb("INSERT INTO `users` (id, name, surname, birthday, gender, birthplace)
        values (:id, :name, :surname, :birthday, :gender, :birthplace)", [':id' => $this->id, ':name' => $this->name, ':surname' => $this->surname, ':birthday' => $this->birthday, ':gender' => $this->gender, ':birthplace' => $this->birthplace]);
    }

    public function deleteData():object
    {
        return $this->connectToDb("DELETE FROM `users` WHERE `id` = :id", [':id' => $this->id]);
    }

    private static function getAge(?string $birthday):int
    {
        $diff = date('Ymd') - date('Ymd', strtotime($birthday));   
        return (int) substr( $diff, 0, -4 );
    }

    private static function convert(?int $gender): string
    {
     return $gender ? 'male' : 'female';
    }

    public function returnFormatted():object
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

?>
