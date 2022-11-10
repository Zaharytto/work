<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Exercise_1.php';

/**
 * произвести проверку на наличие первого класса
 */


class People extends Database
{
    public array $people = [];

    public function __construct($people, $operator)//Конструктор ведет поиск id людей по всем полям БД 
                                                    //(поддержка выражений больше, меньше, не равно);  
    {

        $this->getPeople($people, $operator);
        
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





$people = new People(15, '=');


$peopleGet = $people->getPeople(15, '=');



var_dump($peopleGet);










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