<?php

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
        //return $this->totalCost = new Product $product->getPrice() + $this->costOfDelivery;  //!!!!!!!!!!!!!!!!!!!!

    }
}


class Basket
{
    public $goodsPositions = [];

    public function addProduct(Product $product)
    {
        return $this->goodsPositions[] = $product->name;
    }

    public function getPrice()
    {
        return $this->allPositions = $product->getPrice() * count($goodsPositions);   //!!!!!!!!!!!!!!!!!!!
    }

    public function describe()
    {
        return $product->name . ' - ' . $product->getPrice();              //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
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



