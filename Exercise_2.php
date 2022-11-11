<?php

/**
 * Автор: Захар Кравченко
 * 
 * Дата реализации: 11. 11. 2022 12:00
 *  
 * Работа с БД: MySQL Workbanch 8.0 CE
 */


/**
 * TODO:
 * [+] Создать Конструктор, который ведет поиск id людей по всем полям БД (поддержка выражений больше, меньше, не равно).
 * [+] Создать метод, который возвращает массива экземпляров класса 1 из массива с id людей полученного в конструкторе.
 * [+] Создать метод, который удаляет людей из БД с помощью экземпляров класса 1 в соответствии с массивом, полученным в конструкторе.
 * [+] Создать проверка на наличие первого класса.
 */

require_once $_SERVER['DOCUMENT_ROOT'].'/Exercise_1.php';


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
            $sql .= " id $idOperator :id";
            $executeId = [':id' => $id];
        }
        if ($name && $nameOperator) {
            $sql .= " name $nameOperator :name";
            $executeName = array_merge($executeId, [':name' => $name]);
        }
        if ($surname && $surnameOperator) {
            $sql .= " surname $surnameOperator :surname";
            $executeSurname = array_merge($executeName, [':surname' => $surname]);
        }
        if ($birthday && $birthdayOperator) {
            $sql .= " birthday $birthdayOperator :birthday";
            $executeBirthday = array_merge($executeSurname, [':birthday' => $birthday]);
        }
        if ($gender && $genderOperator) {
            $sql .= " gender $genderOperator :gender";
            $executeGender = array_merge($executeBirthday, [':gender' => $gender]);
        }
        if ($birthplace && $birthplaceOperator) {
            $sql .= " birthplace $birthplaceOperator :birthplace";
            $executeBirthplace = array_merge($executeGender, [':birthplace' => $birthplace]);
        }

        $result1 = $this->connectToDb($sql, $executeBirthplace);
    }
    
    public function getPeople($idPerson, $operator)                                                                                        
    {
        $result = $this->connectToDb("SELECT * FROM users WHERE id $operator :id", [':id' => $idPerson]);
        $result = $result->fetch(PDO::FETCH_ASSOC);
        return $result;       
    }

    public function deletePeople()                        
    {
        $this->peolpe = $people;
        foreach($people as $value) {   
            $this->connectToDb("DELETE * FROM users WHERE id = :id",[':id' => $value]);
        }
    }   
}




$people = new People(15, '=', 'Pet', '=', 'Petov', '=', '1995-09-10', '=', 1, '=', 'London', '=');

?>