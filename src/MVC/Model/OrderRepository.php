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
        $this->ordeId = $this->connection->lastInsertId(); 

        $this->order = new OrderModel($username, $this->ordeId, "pending");

        if (!empty($checklist)) {

            foreach ($checklist as $check) {

                $sth = $this->connection->prepare('SELECT price, product_id FROM menu WHERE product = ?');
                $sth->execute([$check]);
                $result = $sth->fetch(PDO::FETCH_ASSOC);
                
                $q = (int)$quantity[$check];

                $sth = $this->connection->prepare('INSERT INTO ordered_products(order_id, product, price, product_id, quantity) VALUES(?, ?, ?, ?, ?)');
                $sth->execute([$this->ordeId, $check, $result['price'], $result['product_id'], $q]); 
                
                $this->order->setProducts($check);
                $this->sum = $this->sum + ($result['price'] * $q);

                $sth = $this->connection->prepare('UPDATE orders SET summa = ? WHERE order_id = ?');
                $sth->execute([$this->sum, $this->ordeId]);
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
            
            $sth = $this->connection->prepare('SELECT product FROM ordered_products WHERE order_id = ? AND product = ?');
            $sth->execute([$id, $check]);
            $r = $sth->fetch(PDO::FETCH_ASSOC);
            
            $q = (int)$quantity[$check];

            if ($r == false) {

                $sth = $this->connection->prepare('INSERT INTO ordered_products(order_id, product, price, product_id, quantity) VALUES(?, ?, ?, ?, ?)');
                $sth->execute([$id, $check, $result['price'], $result['product_id'], $q]);

            } else {
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

    public function cancelOrder($username)
    {
        $sth = $this->connection->prepare('UPDATE orders SET status = ? WHERE order_id = ?');
        $sth->execute(["canceled", $id]);

        return $this->render('/../View/home_tpl.php', ['loggedin' => $loggedin, 'username' => $this->getSession('username')]);
    }

    public function confirmOrder($id)
    {
        $sth = $this->connection->prepare('UPDATE orders SET status = ? WHERE order_id = ?');
        $sth->execute(["completed", $id]);
    }

    public function getOrderItems($username, $id)
    {
        $order = $this->getOrder($username);
        $sth = $this->connection->prepare('SELECT product, price, quantity FROM ordered_products WHERE order_id = ?');
        $sth->execute([$id]);
        $result = $sth->fetchAll();

        return $result;
    }

    public function __construct()
    {
        $this->connection = (new Database())->getConnection();
    }
}