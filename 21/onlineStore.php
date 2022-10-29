<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/21/ClientNotices.php';


class Order
{
    public $basket;
    public $costOfDelivery;

    public function __construct($basket, $costOfDelivery)
    {
        $this->basket = $basket;
        $this->costOfDelivery = $costOfDelivery;
    }

    public function getBasket()
    {
        return $this->basket;                                           
    }

    public function getPrice()
    {
        return array_sum($this->basket) + $this->costOfDelivery;
    }
}


class Basket
{
    public $goodsPositions = [];

    public function addProduct(Product $product)
    {
        return $this->goodsPositions += [$product->getName() => $product->getPrice()];
    }

    public function getPrice()
    {
        return array_sum($this->goodsPositions);   
    }

    public function describe()
    { 
        foreach ($this->goodsPositions as $key => $values) {      
            return "$key - $values ";
        }
    }
}


class BasketPosition
{
    public $product;
    public $quantity;

    public function __construct($product, $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getPrice()
    {
        //return new Product $product->getPrice();            //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!                             
    }
}


class Product 
{
    public $name;
    public $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }
}



//создаём продукты
$iceCream = new Product('Мороженное', '100');
$spinach = new Product('Шпинат', '50');

//берём карзину
$newBasket = new Basket();

//положили эти 2 продукта в корзину
$product = $newBasket->addProduct($iceCream);
$product = $newBasket->addProduct($spinach);

//оформляем заказ с доставкой
$order = new Order($product, '25');

echo "Заказ, на сумму: " . $order->getPrice() . " Состав: " . $newBasket->describe();




//создаём клиетна 
$client = new User('Николай Николаевич', 'kolya@gmail.com', +375295648795, 42);

//отправляем уведомление клиенту

function notify(User $user, $message)
{
    if ($user->isAdult()) {
        return $message;
    } else {
        $censor = new Censor();
        $messageNew = $censor->censor($message);

        if (!empty($user->email) && $user->phone !== 0) {
            $notifEmail = new Notification(Notification::EMAIL_CHANNEL);
            $notifPhone = new Notification(Notification::PHONE_CHANNEL);
            return $notifPhone->sendTo($user->name, $user->phone, $messageNew) . $notifEmail->sendTo($user->name, $user->email, $messageNew);
        }             
        $notif = new Notification(Notification::EMAIL_CHANNEL);
        return$notif->sendTo($user->name, $user->email, $messageNew);
    }
}

$messageFromClient = "Для вас создан заказ, на сумму: " . $order->getPrice() . " Состав: " . $newBasket->describe();
var_dump(notify($client, $messageFromClient));
