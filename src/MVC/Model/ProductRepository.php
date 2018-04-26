<?php

declare (strict_types = 1);

namespace MVC\Model;

class Productrepository
{
    private $connection;

    public function __construct()
    {
        $this->connection = (new Database())->getConnection();
    }

    public function getProducts($type)
    {
        $sth = $this->connection->prepare('SELECT product_id AS id, product AS name, price, type FROM menu WHERE type = ?');
        $sth->execute([$type]);
        $products = $sth->fetchAll();
/*         print_r($products);die; */
        return array_map(function($product)
        {
            return new ProductModel($product['id'], $product['name'], $product['price'], $product['type']);
        }
        ,$products);
    }

    public function getMenu()
    {
        $sth = $this->connection->prepare('SELECT product, type, price FROM menu');
        $sth->execute();
        $menu = $sth->fetchAll();

        return $menu;
    }
}