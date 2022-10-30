<?php

namespace App\OnlineStore;

require_once $_SERVER['DOCUMENT_ROOT'].'/21/clientNotices.php';


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
        $info = '';
        foreach ($this->goodsPositions as $key => $values) {      
            $info .= "$key - $values ";
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
namespace App\ClientNotices;

$client = new User('Николай Николаевич', 'kolya@gmail.com', +375295648795, 15);

//отправляем уведомление клиенту
$messageFromClient = "Для вас создан заказ, на сумму: " . $order->getPrice() . " Состав: " . $newBasket->describe();
var_dump(notify($client, $messageFromClient));
