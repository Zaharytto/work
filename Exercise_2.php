<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Exercise_1.php';

/**
 * произвести проверку на наличие первого класса
 */


class People extends Database
{
    public array $people = [];

    public function __construct(int $id, string $idOperator, string $name, string $nameOperator, 
        string $surname, string $surnameOperator, string $birthday, string $birthdayOperator,
        int $gender, string $genderOperator, string $birthplace, string $birthplaceOperator)  
    {            
        $sql = "SELECT id FROM users WHERE";
        $execute = null;
        if ($id && $idOperator) {
            $sql .= "id $idOperator :id";
            $execute = [':id' => $id];
        }
        if ($name && $nameOperator) {
            $sql .= "name $nameOperator :name";
            $execute = [':name' => $name];
        }
        if ($surname && $surnameOperator) {
            $sql .= "surname $surnameOperator :surname";
            $execute = [':surname' => $surname];
        }
        if ($birthday && $birthdayOperator) {
            $sql .= "birthday $birthdayOperator :birthday";
            $execute = [':birthday' => $birthday];
        }
        if ($gender && $genderOperator) {
            $sql .= "gender $genderOperator :gender";
            $execute = [':gender' => $gender];
        }
        if ($birthplace && $birthplaceOperator) {
            $sql .= "birthplace $birthplaceOperator :birthplace";
            $execute = [':birthplace' => $birthplace];
        }

        $result = $this->connectToDb($sql, $execute);
    }

    public function getPeople($idPerson, $operator)                   //Получение массива экземпляров класса 1 из массива с id людей 
                                                                        //полученного в конструкторе; 
    {
        $result = $this->connectToDb("SELECT * FROM users WHERE id $operator :id", [':id' => $idPerson]);
        $result = $result->fetch(PDO::FETCH_ASSOC);
        return $result;

       
    }

    public function deletePeople()                        //Удаление людей из БД с помощью экземпляров класса 1 в
                                                           //соответствии с массивом, полученным в конструкторе.
    {
        $this->peolpe = $people;
        foreach($people as $value) { //$this->people or $people ????  
            $this->connectToDb("DELETE * FROM users WHERE id = :id",[':id' => $value]);
        }
    }   
}





$people = new People(15, '=', 'Pet', '=', 'Petov', '=', '1995-09-10', '=', 1, '=', 'London', '=');


// $peopleGet = $people->getPeople(15, '=');



// var_dump($peopleGet);










/*

$id[] .= $this->connectToDb("SELECT id FROM users WHERE id = :id",[':id' => $value]);
            $id->fetch(PDO::FETCH_ASSOC);
            $people[] .= $id;






 $this->idPerson = $idPerson;
        foreach($this->people as $value) { //$this->people or $people ???? 
            $result = $this->connectToDb("SELECT id FROM users WHERE id $operator :id",[':id' => $idPerson]);
            $result = $result->fetch(PDO::FETCH_ASSOC);
            $people[] .= $result;
        } 




  $result = [];
        foreach($this->people as $key => $value) {
            $result[] .= $this->getById($people[$key]);
        }
        return $result;




*/
?>