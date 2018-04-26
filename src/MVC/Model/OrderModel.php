<?php

declare (strict_types = 1);

namespace MVC\Model;

class OrderModel
{
    private $username;

    private $id;

    private $status;

    private $summ;

    private $products;

    public function __construct($username, $id, $status)
    {
        $this->$username = $username;
        $this->id = $id;
        $this->status = $status;
        $this->products = [];
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setSum($sum)
    {
        $this->sum = $sum;
    }

    public function getSum()
    {
        return $this->sum;
    }

    public function setProducts($product)
    {
        $this->products[$product] = $product;
    }

    public function getProducts()
    {                
        return $this->products;
    }
}