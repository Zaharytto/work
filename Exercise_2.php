<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Exercise_1.php';

/**
 * произвести проверку на наличие первого класса
 */


class People extends Database
{
    public array $people = [];

    public function __construct($idPerson)
    {
        $this->idPerson = $idPerson;
        foreach($this->people as $value) { //$this->people or $people ???? 
            $x = $this->connectToDb("SELECT id FROM users WHERE id = :id",[':id' => $idPerson]);
            $x = $x->fetch(PDO::FETCH_ASSOC);
            $people[] .= $x;
        }
        //(поддержка выражений больше, меньше, не равно)  ????
    }

    public function getPeople()
    {
        $result = [];
        foreach($this->people as $key => $value) {
            $result[] .= $this->getById($people[$key]);
        }
        return $result;
    }

    public function deletePeople()
    {
        $this->peolpe = $people;
        foreach($people as $value) { //$this->people or $people ????  
            $this->connectToDb("DELETE * FROM users WHERE id = :id",[':id' => $value]);
        }
    }   
}


$array = [1];

$f = new People($array);
var_dump($f);










/*

$id[] .= $this->connectToDb("SELECT id FROM users WHERE id = :id",[':id' => $value]);
            $id->fetch(PDO::FETCH_ASSOC);
            $people[] .= $id;

*/
?>