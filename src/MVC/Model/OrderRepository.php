<?php

declare (strict_types = 1);

namespace MVC\Model;

use MVC\Model\Database;
use PDO;

class OrderRepository
{
    private $connection;
    private $order;
    private $sum;
    private $orderId;

    public function getAllOrders($username)
    {
        $sth = $this->connection->prepare('SELECT username, summa, order_id, order_date, order_time, status FROM orders WHERE username = ?');
        $sth->execute([$username]);
        $result = $sth->fetchAll();
        return $result;
    }

    public function getOrder($username)
    {
        $sth = $this->connection->prepare('SELECT username, summa, order_id, status FROM orders WHERE status = "pending" AND username = ?');
        $sth->execute([$username]);
        $result = $sth->fetch();

        return $result;
    }

    public function createOrder($username, $checklist, $quantity)
    {
        date_default_timezone_set('Europe/Athens');
        $date = date("Y-m-d");
        $time = date("H:i:s");
        $sth = $this->connection->prepare('INSERT INTO orders(username, status, order_date, order_time) VALUES (?, ?, ?, ?)');
        $sth->execute([$username, "pending", $date, $time]);
        $this->orderId = $this->connection->lastInsertId(); 
        $this->order = new OrderModel($username, $this->orderId, "pending", $sum);
        if (!empty($checklist)) {

            foreach ($checklist as $check) {

                $sth = $this->connection->prepare('SELECT price, product_id FROM menu WHERE product = ?');
                $sth->execute([$check]);
                $result = $sth->fetch(PDO::FETCH_ASSOC);
                
                $q = (int)$quantity[$check];

                $sth = $this->connection->prepare('INSERT INTO ordered_products(order_id, product, price, product_id, quantity) VALUES(?, ?, ?, ?, ?)');
                $sth->execute([$this->orderId, $check, $result['price'], $result['product_id'], $q]); 
                
                $this->order->setProducts($check);
                $this->sum = $this->sum + ($result['price'] * $q);

                $sth = $this->connection->prepare('UPDATE orders SET summa = ? WHERE order_id = ?');
                $sth->execute([$this->sum, $this->orderId]);
            }
            
            $this->order->setSum($this->sum);
            
        } else {
            header ("Location: /products");
        }
    }

    public function updateOrder($id, $checklist, $quantity)
    {
        foreach ($checklist as $check) {

            $sth = $this->connection->prepare('SELECT price, product_id FROM menu WHERE product = ?');
            $sth->execute([$check]);
            $result = $sth->fetch(PDO::FETCH_ASSOC);
            
            $sth = $this->connection->prepare('SELECT product, quantity FROM ordered_products WHERE order_id = ? AND product = ?');
            $sth->execute([$id, $check]);
            $product = $sth->fetchAll();
        
            $q = (int)$quantity[$check];
            
            if ($product == false) {

                $sth = $this->connection->prepare('INSERT INTO ordered_products(order_id, product, price, product_id, quantity) VALUES(?, ?, ?, ?, ?)');
                $sth->execute([$id, $check, $result['price'], $result['product_id'], $q]);

            } else {                
                $q = $q + $product[0]['quantity'];
                $sth = $this->connection->prepare('UPDATE ordered_products SET quantity = ? WHERE order_id = ? AND product = ?');
                $sth->execute([$q, $id, $check]);
            }

        }

        $sth = $this->connection->prepare('SELECT price, quantity FROM ordered_products WHERE order_id = ?');
        $sth->execute([$id]);
        $result = $sth->fetchAll();

        foreach ($result as $r) {
            $this->sum = $this->sum + ($r['price'] * $r['quantity']);
        }

        $sth = $this->connection->prepare('UPDATE orders SET summa = ? WHERE order_id = ?');
        $sth->execute([$this->sum, $id]);
    }

    public function cancelOrder($id)
    {
        $sth = $this->connection->prepare('UPDATE orders SET status = ? WHERE order_id = ?');
        $sth->execute(["canceled", $id]);


    }

    public function confirmOrder($id)
    {
        $sth = $this->connection->prepare('UPDATE orders SET status = ? WHERE order_id = ?');
        $sth->execute(["completed", $id]);
    }

    public function getOrderItems($username, $id)
    {/* 
        $order = $this->getOrder($username); */
        $sth = $this->connection->prepare('SELECT product, price, quantity FROM ordered_products WHERE order_id = ?');
        $sth->execute([$id]);
        $result = $sth->fetchAll();

        return $result;
    }

    public function deleteOrderItem() {
        $sth = $this->connection->prepare('SELECT order_id, status FROM orders WHERE status = "pending" AND username = ?');
        $sth->execute([$_SESSION['username'] ]);
        $result = $sth->fetch();

        $sth = $this->connection->prepare('DELETE FROM ordered_products WHERE order_id=? AND product=?');
        $sth->execute([$result['order_id'], $_POST['product'] ]);

        $sth = $this->connection->prepare('SELECT price, quantity FROM ordered_products WHERE order_id = ?');
        $sth->execute([$result['order_id']]);
        $products = $sth->fetchAll();

        $sum = 0;
        foreach ($products as $product) {
            $sum = $sum + ($product['price'] * $product['quantity']);
        }
        
        $sth = $this->connection->prepare('UPDATE orders SET summa = ? WHERE order_id = ?');
        $sth->execute([$sum, $result['order_id']]);

        echo json_encode($sum);


    }

    public function __construct()
    {
        $this->connection = (new Database())->getConnection();
    }
}