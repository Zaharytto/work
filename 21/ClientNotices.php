<?php
class User 
{
    public string $name;
    public string $email;
    public int $phone;
    public int $age;

    public function  __construct($name, $email, $phone = 0, $age = 0)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->age = $age;
    }

    public function getName():string
    {
        return $this->name;
    }

    public function getEmail():string
    {
        return $this->email;
    }

    public function getPhone():int
    {
        return $this->phone;
    }

    public function isAdult():bool
    {
        return $this->age >= 18 ?? true;
    }
}

class Censor 
{
    public function censor($message):string
    {
        return substr_replace($message, '***', 0,);
    }
}

class Notification
{
    public const EMAIL_CHANNEL = 'email';
    public const PHONE_CHANNEL = 'phone';
    public const AVAIABLE_CHANNEL = [
    self::EMAIL_CHANNEL,
    self::PHONE_CHANNEL
    ];
    
    public function  __construct($notificationChannel)
    {
        if (in_array ($notificationChannel, Notification::AVAIABLE_CHANNEL)) {
            $this->notificationChannel = $notificationChannel;
            }
    }

    public function sendTo($name, $contact, $message)
    {
        echo "Уведомление клиенту: $name на $this->notificationChannel ($contact): $message";
    }

}


$petya = new User('Петя', 'petya@gmail.com', +375257845168, 20);
 $dima = new User('Дима', 'dima@mail.ru');


function notify(User $user, $message)
{
    if ($user->isAdult()) {
        return $message;
    } else {
        $censor = new Censor();
        $messageNew = $censor->censor($message);

        if ($user->phone != 0) {
            $notif = new Notification(Notification::PHONE_CHANNEL);
            return $notif->sendTo($user->name, $user->phone, $messageNew);
        } else {
            $notif = new Notification(Notification::EMAIL_CHANNEL);
            return $notif->sendTo($user->name, $user->email, $messageNew);
        }
    }
}

$messageFromPetya = 'Привет, как дела?';
$messageFromDima = 'Привет, когда приедешь в гости?';
var_dump(notify($petya, $messageFromPetya));
var_dump(notify($dima, $messageFromDima));

