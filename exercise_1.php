<?php

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
            $this->addData();
        } else {
            $user = $this->getById($id)->fetch(PDO::FETCH_ASSOC);
            $this->name = $user['name'];
            $this->surname = $user['surname'];
            $this->birthday = $user['birthday'];
            $this->gender = $user['gender'];
            $this->birthplace = $user['birthplace'];            
        }
    }

    private function getById($id)
    {
        $pdo = new PDO('mysql:host=localhost;dbname=mydb', 'root', 'root');
                $result = $pdo->prepare("SELECT * FROM `users` WHERE id = :id");
                $result->execute([':id' => $id]);
                $pdo = null;
                return $result;
    }

    private function connectToDb(string $field, array $value)
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

    private function deleteData()
    {
        return $this->connectToDb("DELETE FROM `users` WHERE id = :id", [':id' => $this->id]);
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



$x = new Database(null, 'Pet', 'Petov', '1995-09-10', 1, 'London');

$x = new Database(6);

var_dump($x->returnFormatted());


?>