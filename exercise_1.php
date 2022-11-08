<?php

class Database
{
    public $id;
    public $name;
    public $surname;
    public static $birthday;
    public static $gender;
    public $birthplace;

    public function addData()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=mydb', 'root', 'root');  
        $result = $pdo->prepare("INSERT INTO `users` (id, name, surname, birthday, gender, birthplace)
        values (:id, :name, :surname, :birthday, :gender, :birthplace)");
        $result->execute([':id' => $this->id, ':name' => $this->name, ':surname' => $this->surname, ':birthday' => $this->birthday, ':gender' => $this->gender, ':birthplace' => $this->birthplace]);
        $pdo = null;
        return $result;
    }

    public function deleteData()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=mydb', 'root', 'root');
        $result = $pdo->prepare("DELETE FROM `users` WHERE id = :id");
        $result->execute([':id' => $this->id]);
        $pdo = null;
        return $result;
    }

    public static function getAge($birthday)
    {
        $diff = date( 'Ymd' ) - date('Ymd', strtotime($birthday));   
        return substr( $diff, 0, -4 );
    }

    public static function convert(int $gender)
    {
     return $gender ? 'male' : 'female';
    }

    public function __construct($id, $name, $surname, $birthday, $gender, $birthplace)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->birthday = $birthday;
        $this->gender = $gender;
        $this->birthplace = $birthplace;

        // if (empty($id)) {
        //     return $this->addData();
        // } else {
        //     if (find(int $id)) {                                                         //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        //         $pdo = new PDO('mysql:host=localhost;dbname=mydb', 'root', 'root');
        //         $result = $pdo->prepare("SELECT * FROM 'users' WHERE id = :id");
        //         $result->execute([':id' => $id]);
        //         $pdo = null;
        //     }
        // }
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



$x = new Database(1, 'Pet', 'Petov', '1995-09-10', 1, 'London');


var_dump(Database::getAge('1995-09-10'));

var_dump(Database::convert(0));


?>