<?php

declare (strict_types = 1);

namespace MVC\Model;

class ProductModel
{
    private $id;
    private $name;
    private $price;
    private $type;   

    public function __construct($id, $name, $price, $type)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->type = $type;
    }

    public function getId()
    {
        return $this->id;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getPrice()
    {
        return $this->price;
    }
    
    public function getType()
    {
        return $this->type;
    }
}