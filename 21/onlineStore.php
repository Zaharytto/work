<?php

namespace App\OnlineStore;

require_once $_SERVER['DOCUMENT_ROOT'].'/21/clientNotices.php';


class Order
{
    public $basket;
    public $costOfDelivery;

    public function __construct(Basket $basket, $costOfDelivery)
    {
        $this->basket = $basket;
        $this->costOfDelivery = $costOfDelivery;
    }

    public function getBasket():object
    {
        return $this->basket;                                           
    }

    public function getPrice():int
    {
        return $this->basket->getPrice() + $this->costOfDelivery;
    }
}


class Basket
{
    public $goodsPositions = [];

    public function addProduct(Product $product):array
    {
        return $this->goodsPositions[] = ['product' => $product];
    }

    public function getPrice():int
    {
        $priceAll = 0;
        foreach ($this->goodsPositions as $value) {
            $priceAll += $value['product']->getPrice();
        }
        return $priceAll;

    }
            
    public function describe():string
    { 
        $info = '';
        foreach ($this->goodsPositions as $value) {      
            $info .= $value['product']->getName() . ' - ' . $value['product']->getPrice() . ' ';
        }
        return $info;
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

    public function getName():string
    {
        return $this->name;
    }

    public function getPrice():int
    {
        return $this->price;
    }
}


//создаём продукты
$iceCream = new Product('Мороженное', '100');
$spinach = new Product('Шпинат', '50');

//берём корзину
$newBasket = new Basket();

//положили эти 2 продукта в корзину
$newBasket->addProduct($iceCream);
$newBasket->addProduct($spinach);

//оформляем заказ с доставкой
$order = new Order($newBasket, '25');
echo "Заказ, на сумму: " . $order->getPrice() . " Состав: " . $newBasket->describe();


//создаём клиетна 
namespace App\ClientNotices;

$client = new User('Николай Николаевич', 'kolya@gmail.com', +375295648795, 15);

//отправляем уведомление клиенту
$messageFromClient = "Для вас создан заказ, на сумму: " . $order->getPrice() . " Состав: " . $newBasket->describe();
var_dump(notify($client, $messageFromClient));
