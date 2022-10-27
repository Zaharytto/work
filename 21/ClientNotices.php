<?php
class User 
{
    public $name;
    public $email;
    public $contact;
    public $age;

    public function  __construct($name, $email, $contact = '', $age =  '')
    {
        $this->name = $name;
        $this->email = $email;
        $this->contact = $contact;
        $this->age = $age;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPhone()
    {
        return $this->contact;
    }

    public function isAdult()
    {
        return true ? $this->age >= 18 : $this->age < 18;
    }
}

class Censor 
{
    public function censor($message)
    {
        return substr_replace($message, '***', 0,);
    }
}

class Notification
{
    public $notificationChannel;
    
    public function  __construct($notificationChannel)
    {
        $this->notificationChannel = $notificationChannel;
    }

    public function sendTo($name, $contact, $message)
    {
        echo "Уведомление клиенту: $name на $this->notificationChannel ($contact): $message";
    }

}


$Petya = new User('Петя', 'petya@gmail.com', '+375257845168', '25');
$Dima = new User('Дима', 'dima@mail.ru');


function notify(User $user, $message)
{
    if ($user->isAdult()) {
        return $message;
    } else {
        $censor = new Censor();
        $messageNew = $censor->censor($message);
        $userNew = new Notification($user->getEmail());
        if (!empty($user->contact)) {
            return $userNew->sendTo($user->name, $user->contact, $messageNew);
        } else {
            return $userNew->sendTo($user->name, $user->contact, $messageNew);
        }
    }
}

$messageFromPetya = 'Привет, как дела?';
$messageFromDima = 'Привет, когда приедешь в гости?';
var_dump(notify($Petya, $messageFromPetya));
var_dump(notify($Dima, $messageFromDima));

