<?php

class Database
{
    public $id;
    public $name;
    public $surname;
    public static $dateOfBirth;
    public static $gender;
    public $cityOfBirth;

    public function addData()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=mydb', 'root', 'root');
        $result = $pdo->prepare("INSERT INTO 'users' (id, name, surname, date_of_birth, gender, city_of_birth) 
        values (:id, :name, :surname, :date_of_birth, :gender, :city_of_birth)");
        $result->execute([':id' => $id, ':name' => $name, ':surname' => $surname, ':date_of_birth' => $dateOfBirth, ':gender' => $gender, ':city_of_birth' => $cityOfBirth]);
        $pdo = null;
        return $result;
    }

    public function deleteData()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=mydb', 'root', 'root');
        $result = $pdo->prepare("DELETE FROM 'users' WHERE id = :id");
        $result->execute([':id' => $id]);
        $pdo = null;
        return $result;
    }

    public static function getAge($dateOfBirth)
    {
        $diff = date( 'Ymd' ) - date('Ymd', strtotime($dateOfBirth));   
        return substr( $diff, 0, -4 );
    }

    public static function convert(int $gender)
    {
     return $gender ? 'male' : 'female';
    }

    public function __construct($id, $name, $surname, $dateOfBirth, $gender, $cityOfBirth)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->dateOfBirth = $dateOfBirth;
        $this->gender = $gender;
        $this->cityOfBirth = $cityOfBirth;

        if (empty($id)) {
            return $this->addData();
        } else {
            if (find(int $id)) {                                                         //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                $pdo = new PDO('mysql:host=localhost;dbname=mydb', 'root', 'root');
                $result = $pdo->prepare("SELECT * FROM 'users' WHERE id = :id");
                $result->execute([':id' => $id]);
                $pdo = null;
            }
        }
    }

    public function returnFormatted()
    {
        $class =  new StdClass();
        $class->id = $this->id;
        $class->name = $this->name;
        $class->surname = $this->surname;
        $class->birthday = self::getAge($this->dateOfBirth);
        $class->gender = self::convert($this->gender);
        $class->cityOfBirth = $this->cityOfBirth;
        return $class;        
    }
}

?>