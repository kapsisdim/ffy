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

    public function getOrder($username)
    {
        $sth = $this->connection->prepare('SELECT username, summa, order_id FROM orders WHERE status = "pending" AND username = ?');
        $sth->execute([$username]);
        $result = $sth->fetchAll();

        return $result;
    }

    public function createOrder($username, $checklist)
    {        
        if (!empty($checklist)) {

            $sth = $this->connection->prepare('INSERT INTO orders(username, status) VALUES (?, ?)');
            $sth->execute([$username, "pending"]);
            $this->ordeId = $this->connection->lastInsertId();

            $this->order = new OrderModel($username, $this->ordeId, "pending");

            foreach ($checklist as $check) {

                $sth = $this->connection->prepare('SELECT price, product_id FROM menu WHERE product = ?');
                $sth->execute([$check]);
                $result = $sth->fetch(PDO::FETCH_ASSOC); 

                $sth = $this->connection->prepare('INSERT INTO ordered_products(order_id, product, price, product_id) VALUES(?, ?, ?, ?)');
                $sth->execute([$this->ordeId, $check, $result['price'], $result['product_id']]); 
                
                $this->order->setProducts($check);
                $this->sum += $result['price'];

                $sth = $this->connection->prepare('UPDATE orders SET summa = ? WHERE order_id = ?');
                $sth->execute([$this->sum, $this->ordeId]);
            }
            $this->order->setSum($this->sum);
        }
    }

    public function updateOrder($id, $checklist)
    {
        $sth = $this->connection->prepare('SELECT price, product_id FROM menu WHERE product = ?');

        foreach ($checklist as $check) {
                       
            $sth->execute([$check]);
            $result = $sth->fetch(PDO::FETCH_ASSOC);
            
            $sth = $this->connection->prepare('INSERT INTO ordered_products(order_id, product, price, product_id) VALUES(?, ?, ?, ?)');
            $sth->execute([$id, $check, $result['price'], $result['product_id']]);
        }

        $sth = $this->connection->prepare('SELECT price FROM ordered_products WHERE order_id = ?');
        $sth->execute([$id]);
        $result = $sth->fetchAll();

        foreach ($result as $r) {
            $this->sum += $r['price'];
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
        $sth = $this->connection->prepare('SELECT product, price FROM ordered_products WHERE order_id = ?');
        $sth->execute([$id]);
        $result = $sth->fetchAll();

        return $result;
    }

    public function __construct()
    {
        $this->connection = (new Database())->getConnection();
    }
}